<?php

declare(strict_types=1);

/** @var string $template */
/** @var array<string, mixed> $data */

$bodyTemplate = __DIR__ . '/' . $template . '.php';
$brand = 'Eat Rrite';
$primary = '#38640e';
$soft = '#e5fad1';
$year = date('Y');
$logoSrc = $logoSrc ?? 'cid:eatrrite-logo';
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
                        <td style="background:<?php echo $primary; ?>;padding:22px 32px;">
                            <table role="presentation" cellspacing="0" cellpadding="0">
                                <tr>
                                    <td valign="middle" style="padding-right:16px;">
                                        <img src="<?php echo htmlspecialchars($logoSrc, ENT_QUOTES, 'UTF-8'); ?>"
                                             alt="<?php echo htmlspecialchars($brand, ENT_QUOTES, 'UTF-8'); ?>"
                                             width="64"
                                             height="64"
                                             style="display:block;width:64px;height:64px;border-radius:50%;border:2px solid #e5fad1;background:#ffffff;">
                                    </td>
                                    <td valign="middle">
                                        <p style="margin:0;font-size:13px;letter-spacing:0.08em;text-transform:uppercase;color:#e5fad1;">Nutrition &amp; Wellness</p>
                                        <h1 style="margin:8px 0 0;font-size:28px;line-height:1.2;color:#ffffff;font-weight:700;"><?php echo htmlspecialchars($brand, ENT_QUOTES, 'UTF-8'); ?></h1>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td style="padding:32px;">
                            <?php include $bodyTemplate; ?>
                        </td>
                    </tr>
                    <tr>
                        <td style="background:<?php echo $soft; ?>;padding:20px 32px;border-top:1px solid #d7e8c8;">
                            <p style="margin:0 0 8px;font-size:13px;color:#4b5c4e;">Consultations are 30 minutes. Please join Google Meet at your booked time (IST).</p>
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
