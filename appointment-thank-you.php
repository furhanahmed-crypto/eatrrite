<?php

declare(strict_types=1);

require_once __DIR__ . '/appointment-form/bootstrap.php';

$bookingSession = appointment_verified_booking();
if ($bookingSession === null) {
    header('Location: appointment.php');
    exit;
}

$pageTitle = 'Appointment Confirmed | Eat Rrite';
$pageDescription = 'Thank you for booking your nutrition consultation with Eat Rrite. Your appointment is confirmed and your Google Meet link will appear shortly.';
$pageKeywords = 'Eat Rrite appointment confirmed, nutrition consultation booking, online dietitian appointment';

$csrf = appointment_csrf_token();
$assetBase = appointment_public_path('assets');
$apiBase = appointment_public_path('api');
$verified = $bookingSession['verified'];
?>
<!DOCTYPE html>
<html lang="en">
<?php include 'header.php'; ?>
<!-- Hero Start -->
<div class="container-fluid bg-primary py-5 hero-header mb-5">
    <div class="row py-3">
        <div class="col-12 text-center">
            <h1 class="display-3 text-white animated zoomIn">Appointment Confirmed</h1>
            <a href="index.php" class="h4 text-white">Home</a>
            <i class="far fa-circle text-white px-2"></i>
            <a href="appointment.php" class="h4 text-white">Appointment</a>
            <i class="far fa-circle text-white px-2"></i>
            <span class="h4 text-white">Thank You</span>
        </div>
    </div>
</div>
<!-- Hero End -->

<!-- Thank You Start -->
<div class="container-fluid bg-primary bg-appointment my-5 wow fadeInUp" data-wow-delay="0.1s">
    <div class="container">
        <div class="row gx-5 justify-content-center">
            <div class="col-lg-8">
                <div class="appointment-form text-center p-5 wow zoomIn" data-wow-delay="0.6s">
                    <div
                        id="er-appointment-thankyou"
                        class="er-form"
                        data-api="<?php echo htmlspecialchars($apiBase, ENT_QUOTES, 'UTF-8'); ?>"
                        data-csrf="<?php echo htmlspecialchars($csrf, ENT_QUOTES, 'UTF-8'); ?>"
                    >
                        <?php include __DIR__ . '/appointment-form/success-panel.php'; ?>
                    </div>
                </div>
            </div>
            <div class="col-lg-10 mx-auto pb-5">
                <div class="bg-white rounded p-4 p-lg-5 shadow-sm">
                    <h2 class="h4 text-dark mb-3">What happens next?</h2>
                    <p class="mb-3">Your payment has been received and your consultation slot is reserved with Eat Rrite. We are creating your Google Meet link and adding your appointment to our schedule.</p>
                    <p class="mb-0">You will receive a confirmation email with your appointment details and Meet link. For any questions, reach us at <a href="mailto:eatrrite@gmail.com">eatrrite@gmail.com</a> or call <a href="tel:+919639877483">+91 96398 77483</a>.</p>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Thank You End -->

<script type="application/json" id="er-booking-data"><?php
    echo json_encode([
        'payment' => $bookingSession['payment'],
        'verified' => $verified,
    ], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);
?></script>
<link rel="stylesheet" href="<?php echo htmlspecialchars($assetBase, ENT_QUOTES, 'UTF-8'); ?>/appointment.css">
<script src="<?php echo htmlspecialchars($assetBase, ENT_QUOTES, 'UTF-8'); ?>/appointment-thankyou.js" defer></script>

<?php include 'footer.php'; ?>
</body>
</html>
