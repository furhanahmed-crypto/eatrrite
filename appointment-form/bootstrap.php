<?php

declare(strict_types=1);

if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}

require_once __DIR__ . '/config.php';
require_once __DIR__ . '/lib/Http.php';
require_once __DIR__ . '/lib/SlotService.php';
require_once __DIR__ . '/lib/HoldService.php';
require_once __DIR__ . '/lib/RazorpayService.php';
require_once __DIR__ . '/lib/GoogleAppsScriptClient.php';
require_once __DIR__ . '/lib/BookingStore.php';
require_once __DIR__ . '/lib/AppointmentService.php';

date_default_timezone_set(appointment_config()['timezone']);

function appointment_service(): AppointmentService
{
    static $service = null;
    if ($service === null) {
        $service = new AppointmentService(appointment_config());
    }

    return $service;
}
