<?php

declare(strict_types=1);

/** @var string $template */
/** @var array<string, mixed> $data */

$bodyTemplate = __DIR__ . '/' . $template . '.php';
$brand = 'Eat Rrite';
$primary = '#38640e';
$soft = '#e5fad1';
$year = date('Y');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($brand, ENT_QUOTES, 'UTF-8'); ?></title>
</head>
<body style="margin:0;padding:0;background:#f4f7f2;font-family:'Segoe UI',Arial,sans-serif;color:#1d2b1f;">
    <table role="presentation" width="100%" cellspacing="0" cellpadding="0" style="background:#f4f7f2;padding:24px 12px;">
        <tr>
            <td align="center">
                <table role="presentation" width="600" cellspacing="0" cellpadding="0" style="max-width:600px;width:100%;background:#ffffff;border-radius:16px;overflow:hidden;box-shadow:0 12px 30px rgba(29,43,31,0.08);">
                    <tr>
                        <td style="background:<?php echo $primary; ?>;padding:28px 32px;">
                            <p style="margin:0;font-size:13px;letter-spacing:0.08em;text-transform:uppercase;color:#e5fad1;">Nutrition &amp; Wellness</p>
                            <h1 style="margin:8px 0 0;font-size:28px;line-height:1.2;color:#ffffff;font-weight:700;"><?php echo htmlspecialchars($brand, ENT_QUOTES, 'UTF-8'); ?></h1>
                        </td>
                    </tr>
                    <tr>
                        <td style="padding:32px;">
                            <?php include $bodyTemplate; ?>
                        </td>
                    </tr>
                    <tr>
                        <td style="background:<?php echo $soft; ?>;padding:20px 32px;border-top:1px solid #d7e8c8;">
                            <p style="margin:0 0 8px;font-size:13px;color:#4b5c4e;">Opening hours: Mon – Sun, 10:00 AM – 7:00 PM IST</p>
                            <p style="margin:0;font-size:13px;color:#4b5c4e;">Phone: +91 96398 77483 · Email: info@eatrrite.com</p>
                        </td>
                    </tr>
                </table>
                <p style="margin:16px 0 0;font-size:12px;color:#7a877c;">&copy; <?php echo $year; ?> <?php echo htmlspecialchars($brand, ENT_QUOTES, 'UTF-8'); ?>. All rights reserved.</p>
            </td>
        </tr>
    </table>
</body>
</html>
