<?php

declare(strict_types=1);

/**
 * Slot times fallback — used when the Google Sheet tab `slot-times-config`
 * is missing or cannot be read. Live hours should be edited in that sheet tab.
 * This file stays as the local backup and as the shape SlotService expects.
 *
 * How a booking occupies time:
 * - The customer meeting is CUSTOMER_MEETING_MINUTES long.
 * - The consultant also needs CONSULTANT_PREP_MINUTES after that
 *   (notes, details, settlement). That block is not offered to the next client.
 * - So each booking occupies CUSTOMER_MEETING_MINUTES + CONSULTANT_PREP_MINUTES
 *   on the consultant's calendar (45 minutes with the defaults below).
 *
 * How start times are offered:
 * - With no bookings, list every FALLBACK_INTERVAL_MINUTES start in the window
 *   (15-minute grid: 3:30, 3:45, 4:00, 4:15, …).
 * - The latest start is CUSTOMER_MEETING_MINUTES before the window end,
 *   so the meeting finishes on time and prep may run up to CONSULTANT_PREP_MINUTES
 *   past the stated end. Do not offer 1:45 PM in an 11:30–2:00 window.
 * - After a booking, that start occupies 45 minutes. The next open start is
 *   45 minutes later (4:00 booked → next is 4:45). Any 15-minute start whose
 *   45-minute block would overlap the booking is hidden.
 * - If a late/fallback start is booked, the next open time is still 45 minutes
 *   later (5:15 booked → next is 6:00).
 *
 * weekly_hours keys: monday … sunday. Use 24-hour HH:MM.
 * An empty list means the consultant is unavailable that day.
 */
$weekdayHours = [
    ['start' => '11:30', 'end' => '14:00'],
    ['start' => '15:30', 'end' => '17:30'],
    ['start' => '20:30', 'end' => '21:30'],
];

return [
    'customer_meeting_minutes' => 30,
    'consultant_prep_minutes' => 15,
    'fallback_interval_minutes' => 15,

    'weekly_hours' => [
        'monday' => $weekdayHours,
        'tuesday' => $weekdayHours,
        'wednesday' => $weekdayHours,
        'thursday' => $weekdayHours,
        'friday' => [],
        'saturday' => [
            ['start' => '11:30', 'end' => '14:30'],
        ],
        'sunday' => [
            ['start' => '11:30', 'end' => '13:00'],
        ],
    ],
];
