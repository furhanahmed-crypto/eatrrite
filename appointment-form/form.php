<?php

declare(strict_types=1);

require_once __DIR__ . '/bootstrap.php';

$config = appointment_config();
$csrf = appointment_csrf_token();
$assetBase = appointment_public_path('assets');
$apiBase = appointment_public_path('api');
?>
<link rel="stylesheet" href="<?php echo htmlspecialchars($assetBase, ENT_QUOTES, 'UTF-8'); ?>/appointment.css">

<form
    id="er-appointment-form"
    class="er-form"
    novalidate
    data-api="<?php echo htmlspecialchars($apiBase, ENT_QUOTES, 'UTF-8'); ?>"
    data-csrf="<?php echo htmlspecialchars($csrf, ENT_QUOTES, 'UTF-8'); ?>"
>
    <div class="er-alert" data-er-alert hidden></div>

    <div class="er-success" data-er-success hidden>
        <div class="er-success__icon" aria-hidden="true">✓</div>
        <h3>Appointment confirmed</h3>
        <p data-er-success-copy></p>
        <a class="er-meet-link" data-er-meet-link target="_blank" rel="noopener noreferrer"></a>
        <p class="er-success__hint">Save the Google Meet link. A WhatsApp reminder will follow in the next update.</p>
    </div>

    <div class="er-fields" data-er-fields>
        <label class="er-field">
            <span>Service</span>
            <select name="programname" required>
                <option value="">Select a service</option>
                <?php foreach ($config['services'] as $service): ?>
                    <option value="<?php echo htmlspecialchars($service, ENT_QUOTES, 'UTF-8'); ?>">
                        <?php echo htmlspecialchars($service, ENT_QUOTES, 'UTF-8'); ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </label>

        <div class="er-grid">
            <label class="er-field">
                <span>Full name</span>
                <input type="text" name="name" autocomplete="name" maxlength="80" required placeholder="Your name">
            </label>
            <label class="er-field">
                <span>Mobile number</span>
                <input type="tel" name="mobilenumber" inputmode="numeric" maxlength="13" required placeholder="10-digit number">
            </label>
        </div>

        <input type="hidden" name="date" data-er-date>
        <input type="hidden" name="time" data-er-time>

        <button type="button" class="er-slot-trigger" data-er-open-slots>
            <span class="er-slot-trigger__label">Appointment slot</span>
            <span class="er-slot-trigger__value" data-er-slot-label>Select date and time</span>
        </button>

        <p class="er-fee-note">A ₹1 confirmation fee holds your slot. Clinic hours: 10:00 AM – 7:00 PM IST.</p>

        <button type="submit" class="er-submit" data-er-submit>
            Pay ₹1 and book
        </button>
    </div>
</form>

<?php include __DIR__ . '/calendar-modal.php'; ?>
<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
<script src="<?php echo htmlspecialchars($assetBase, ENT_QUOTES, 'UTF-8'); ?>/appointment.js" defer></script>
