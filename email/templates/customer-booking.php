<h2 style="margin:0 0 12px;font-size:22px;color:#38640e;">Your appointment is confirmed</h2>
<p style="margin:0 0 20px;font-size:15px;line-height:1.6;color:#4b5c4e;">
    Hello <?php echo htmlspecialchars((string) $data['name'], ENT_QUOTES, 'UTF-8'); ?>,
    thank you for booking with Eat Rrite. Your consultation has been confirmed and payment received.
</p>

<table role="presentation" width="100%" cellspacing="0" cellpadding="0" style="background:#f7fbf3;border:1px solid #dbe8cf;border-radius:12px;">
    <tr>
        <td style="padding:20px 22px;">
            <p style="margin:0 0 10px;font-size:14px;"><strong>Service:</strong> <?php echo htmlspecialchars((string) $data['service'], ENT_QUOTES, 'UTF-8'); ?></p>
            <p style="margin:0 0 10px;font-size:14px;"><strong>Date:</strong> <?php echo htmlspecialchars((string) $data['display_date'], ENT_QUOTES, 'UTF-8'); ?></p>
            <p style="margin:0;font-size:14px;"><strong>Time:</strong> <?php echo htmlspecialchars((string) $data['display_time'], ENT_QUOTES, 'UTF-8'); ?> IST</p>
        </td>
    </tr>
</table>

<p style="margin:24px 0 12px;font-size:15px;color:#1d2b1f;">
    Please join your consultation using the Google Meet link below at the scheduled time.
</p>

<p style="margin:0;">
    <a href="<?php echo htmlspecialchars((string) $data['meet_link'], ENT_QUOTES, 'UTF-8'); ?>"
       style="display:inline-block;background:#38640e;color:#ffffff;text-decoration:none;padding:14px 22px;border-radius:10px;font-weight:600;">
        Join Google Meet
    </a>
</p>

<p style="margin:16px 0 0;font-size:13px;color:#6b7a6c;word-break:break-all;">
    <?php echo htmlspecialchars((string) $data['meet_link'], ENT_QUOTES, 'UTF-8'); ?>
</p>

<p style="margin:24px 0 0;font-size:14px;line-height:1.6;color:#4b5c4e;">
    If you need to reschedule, reply to this email or contact us at +91 96398 77483.
    We look forward to supporting your wellness journey.
</p>
