<?php

declare(strict_types=1);

final class SlotService
{
    private DateTimeZone $tz;
    private int $duration;
    private int $daysAhead;
    private string $dayStart;
    private string $dayEnd;

    public function __construct(array $config)
    {
        $this->tz = new DateTimeZone($config['timezone']);
        $this->duration = (int) $config['slot_duration_minutes'];
        $this->daysAhead = (int) $config['booking_days_ahead'];
        $this->dayStart = $config['day_start'];
        $this->dayEnd = $config['day_end'];
    }

    /**
     * @return list<string> Times in 24h H:i, e.g. 10:00
     */
    public function times(): array
    {
        $times = [];
        $cursor = DateTimeImmutable::createFromFormat('H:i', $this->dayStart, $this->tz);
        $end = DateTimeImmutable::createFromFormat('H:i', $this->dayEnd, $this->tz);

        if ($cursor === false || $end === false) {
            throw new RuntimeException('Invalid clinic hours in config.');
        }

        while ($cursor < $end) {
            $slotEnd = $cursor->modify('+' . $this->duration . ' minutes');
            if ($slotEnd > $end) {
                break;
            }
            $times[] = $cursor->format('H:i');
            $cursor = $slotEnd;
        }

        return $times;
    }

    public function today(): DateTimeImmutable
    {
        return new DateTimeImmutable('now', $this->tz);
    }

    public function lastBookableDate(): DateTimeImmutable
    {
        return $this->today()->setTime(0, 0, 0)->modify('+' . $this->daysAhead . ' days');
    }

    public function parseDate(string $date): DateTimeImmutable
    {
        $parsed = DateTimeImmutable::createFromFormat('!Y-m-d', $date, $this->tz);

        if ($parsed === false || $parsed->format('Y-m-d') !== $date) {
            throw new InvalidArgumentException('Choose a valid appointment date.');
        }

        return $parsed;
    }

    public function isValidTime(string $time): bool
    {
        return in_array($time, $this->times(), true);
    }

    public function assertBookable(string $date, string $time, array $taken): void
    {
        if (!$this->isValidTime($time)) {
            throw new InvalidArgumentException('That time slot is not offered.');
        }

        $day = $this->parseDate($date);
        $today = $this->today()->setTime(0, 0, 0);

        if ($day < $today) {
            throw new InvalidArgumentException('Please choose a future date.');
        }

        if ($day > $this->lastBookableDate()) {
            throw new InvalidArgumentException('Please choose a date within the next ' . $this->daysAhead . ' days.');
        }

        $start = $this->slotStart($date, $time);
        if ($start <= $this->today()) {
            throw new InvalidArgumentException('That time has already passed. Pick another slot.');
        }

        $key = $this->slotKey($date, $time);
        if (in_array($key, $taken, true)) {
            throw new InvalidArgumentException('That slot was just booked. Please pick another time.');
        }
    }

    public function slotStart(string $date, string $time): DateTimeImmutable
    {
        $start = DateTimeImmutable::createFromFormat('Y-m-d H:i', $date . ' ' . $time, $this->tz);

        if ($start === false) {
            throw new InvalidArgumentException('Invalid date or time.');
        }

        return $start;
    }

    public function slotEnd(string $date, string $time): DateTimeImmutable
    {
        return $this->slotStart($date, $time)->modify('+' . $this->duration . ' minutes');
    }

    public function slotKey(string $date, string $time): string
    {
        return $date . '|' . $time;
    }

    public function displayTime(string $time): string
    {
        $parsed = DateTimeImmutable::createFromFormat('H:i', $time, $this->tz);

        return $parsed ? $parsed->format('g:i A') : $time;
    }

    public function displayDate(string $date): string
    {
        return $this->parseDate($date)->format('D, j M Y');
    }

    /**
     * @param list<array{date:string,time:string}> $booked
     * @return list<string>
     */
    public function takenKeys(array $booked, array $held): array
    {
        $keys = [];

        foreach ($booked as $row) {
            if (!empty($row['date']) && !empty($row['time'])) {
                $keys[] = $this->slotKey((string) $row['date'], (string) $row['time']);
            }
        }

        foreach ($held as $row) {
            if (!empty($row['date']) && !empty($row['time'])) {
                $keys[] = $this->slotKey((string) $row['date'], (string) $row['time']);
            }
        }

        return array_values(array_unique($keys));
    }
}
