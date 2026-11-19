<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Your MyMI Wallet membership</title>
</head>
<body style="font-family: Arial, sans-serif; line-height: 1.6; color: #333;">
    <h2>Your <?= esc($label) ?> membership is active</h2>
    <p>Thank you for your purchase. Here is your receipt.</p>
    <table cellpadding="6" style="border-collapse: collapse;">
        <tr><td>Plan</td><td><strong><?= esc($label) ?> Membership</strong></td></tr>
        <tr><td>Amount paid</td><td><strong>$<?= esc($amount) ?> USD</strong></td></tr>
        <tr><td>Access until</td><td><strong><?= esc($expires_on) ?></strong></td></tr>
        <tr><td>PayPal order</td><td><?= esc($order_id) ?></td></tr>
    </table>
    <p>This is a one-time payment. It does not renew by itself, and we will email you before it ends.</p>
    <p style="margin: 24px 0;">
        <a href="<?= esc($dashboard) ?>" style="background-color: #007bff; color: #ffffff; padding: 12px 24px; text-decoration: none; border-radius: 4px; display: inline-block;">Go to my dashboard</a>
    </p>
    <p>Best regards,<br>The MyMI Wallet Team</p>
</body>
</html>
