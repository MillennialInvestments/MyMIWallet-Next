<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Join MyMI Wallet</title>
</head>
<body style="font-family: Arial, sans-serif; line-height: 1.6; color: #333;">
    <h2>Join MyMI Wallet Today!</h2>
    <p>Hi there,</p>
    <p><strong><?= esc($referrer_name ?? 'A friend'); ?></strong> has invited you to experience <strong>MyMI Wallet</strong>, the future of finance, budgeting, and investment tracking.</p>
    <p style="margin: 24px 0;">
        <a href="<?= esc($referral_link); ?>" style="background-color: #007bff; color: #ffffff; padding: 12px 24px; text-decoration: none; border-radius: 4px; display: inline-block;">
            Get Started Now
        </a>
    </p>
    <p>Or visit: <a href="<?= esc($referral_link); ?>"><?= esc($referral_link); ?></a></p>
    <p>Best regards,<br>The MyMI Wallet Team</p>
</body>
</html>
