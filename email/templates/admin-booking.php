<h2 style="margin:0 0 12px;font-size:22px;color:#38640e;">New paid appointment booked</h2>
<p style="margin:0 0 24px;font-size:15px;line-height:1.6;color:#4b5c4e;">
    A client has completed payment and confirmed an online consultation slot.
</p>

<table role="presentation" width="100%" cellspacing="0" cellpadding="0" style="background:#f7fbf3;border:1px solid #dbe8cf;border-radius:12px;">
    <tr>
        <td style="padding:20px 22px;">
            <p style="margin:0 0 10px;font-size:14px;"><strong>Name:</strong> <?php echo htmlspecialchars((string) $data['name'], ENT_QUOTES, 'UTF-8'); ?></p>
            <p style="margin:0 0 10px;font-size:14px;"><strong>Email:</strong> <?php echo htmlspecialchars((string) $data['email'], ENT_QUOTES, 'UTF-8'); ?></p>
            <p style="margin:0 0 10px;font-size:14px;"><strong>Phone:</strong> <?php echo htmlspecialchars((string) $data['phone'], ENT_QUOTES, 'UTF-8'); ?></p>
            <p style="margin:0 0 10px;font-size:14px;"><strong>Service:</strong> <?php echo htmlspecialchars((string) $data['service'], ENT_QUOTES, 'UTF-8'); ?></p>
            <p style="margin:0 0 10px;font-size:14px;"><strong>Date:</strong> <?php echo htmlspecialchars((string) $data['display_date'], ENT_QUOTES, 'UTF-8'); ?></p>
            <p style="margin:0 0 10px;font-size:14px;"><strong>Time:</strong> <?php echo htmlspecialchars((string) $data['display_time'], ENT_QUOTES, 'UTF-8'); ?></p>
            <?php if (!empty($data['payment_id'])): ?>
                <p style="margin:0 0 10px;font-size:14px;"><strong>Payment ID:</strong> <?php echo htmlspecialchars((string) $data['payment_id'], ENT_QUOTES, 'UTF-8'); ?></p>
            <?php endif; ?>
            <?php if (!empty($data['booked_at'])): ?>
                <p style="margin:0;font-size:14px;"><strong>Booked at:</strong> <?php echo htmlspecialchars((string) $data['booked_at'], ENT_QUOTES, 'UTF-8'); ?></p>
            <?php endif; ?>
        </td>
    </tr>
</table>

<?php if (!empty($data['meet_link'])): ?>
    <p style="margin:24px 0 12px;font-size:15px;color:#1d2b1f;"><strong>Google Meet link</strong></p>
    <p style="margin:0;">
        <a href="<?php echo htmlspecialchars((string) $data['meet_link'], ENT_QUOTES, 'UTF-8'); ?>"
           style="display:inline-block;background:#38640e;color:#ffffff;text-decoration:none;padding:12px 18px;border-radius:10px;font-weight:600;">
            Open Google Meet
        </a>
    </p>
    <p style="margin:12px 0 0;font-size:13px;color:#6b7a6c;word-break:break-all;">
        <?php echo htmlspecialchars((string) $data['meet_link'], ENT_QUOTES, 'UTF-8'); ?>
    </p>
<?php endif; ?>
