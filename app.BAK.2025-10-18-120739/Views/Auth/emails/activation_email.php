<!DOCTYPE html>
<html>
<head>
    <title>Activate Your Account</title>
</head>
<body>
    <p>Dear <?= esc($user->username) ?>,</p>
    <p>Thank you for registering at <?= esc($siteSettings->siteName) ?>.</p>
    <p>Please click the link below to activate your account:</p>
    <p>
        <a href="<?= site_url('activate-account/' . $user->activate_hash) ?>">
            <?= site_url('activate-account/' . $user->activate_hash) ?>
        </a>
    </p>
    <p>If you did not request this, you can safely ignore this email.</p>
    <p>Best regards,</p>
    <p>The <?= esc($siteSettings->siteName) ?> Team</p>
</body>
</html>
