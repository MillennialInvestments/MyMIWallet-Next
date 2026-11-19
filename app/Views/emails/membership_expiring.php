<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Your MyMI Wallet membership ends soon</title>
</head>
<body style="font-family: Arial, sans-serif; line-height: 1.6; color: #333;">
    <h2>Your <?= esc($label) ?> membership ends on <?= esc($expires_on) ?></h2>
    <p>Your membership does not renew by itself. To keep your member features, renew before that date. Renewing early adds 30 days to the time you already have.</p>
    <p style="margin: 24px 0;">
        <a href="<?= esc($renew_url) ?>" style="background-color: #007bff; color: #ffffff; padding: 12px 24px; text-decoration: none; border-radius: 4px; display: inline-block;">Renew my membership</a>
    </p>
    <p>If you do nothing, your account stays open on the free plan and nothing is charged.</p>
    <p>Best regards,<br>The MyMI Wallet Team</p>
</body>
</html>
