<?php
$name = $name ?? 'there';
$actionUrl = $actionUrl ?? '';
$supportEmail = $supportEmail ?? 'support@mymiwallet.com';
?>
Activate your MyMI Wallet account

Hi <?= esc($name) ?>,

Thanks for joining MyMI Wallet. Please confirm your email address to activate your account:

<?= esc($actionUrl) ?>

If you didn’t create this account, please contact <?= esc($supportEmail) ?>.
