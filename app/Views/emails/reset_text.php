<?php
$name = $name ?? 'there';
$actionUrl = $actionUrl ?? '';
$supportEmail = $supportEmail ?? 'support@mymiwallet.com';
?>
Reset your MyMI Wallet password

Hi <?= esc($name) ?>,

We received a request to reset your password. Use this link to choose a new password:

<?= esc($actionUrl) ?>

If you didn’t request this, please ignore this email or contact <?= esc($supportEmail) ?>.
