<?php
$name = $name ?? 'there';
$actionUrl = $actionUrl ?? '#';
$ctaLabel = $ctaLabel ?? 'Activate My Account';
$supportEmail = $supportEmail ?? 'support@mymiwallet.com';
?>
<h2 style="margin:0 0 12px; font-size:22px; color:#111827;">Activate your MyMI Wallet account</h2>
<p style="margin:0 0 16px; font-size:15px; color:#374151;">Hi <?= esc($name) ?>,</p>
<p style="margin:0 0 24px; font-size:15px; color:#374151;">Thanks for joining MyMI Wallet. Please confirm your email address to activate your account.</p>
<p style="margin:0 0 24px;">
    <a href="<?= esc($actionUrl) ?>" target="_blank" rel="noopener" style="display:inline-block; background-color:#2563eb; color:#ffffff; text-decoration:none; padding:12px 20px; border-radius:6px; font-weight:bold;">
        <?= esc($ctaLabel) ?>
    </a>
</p>
<p style="margin:0 0 16px; font-size:13px; color:#6b7280;">If the button doesn’t work, copy and paste this link into your browser:</p>
<p style="margin:0 0 24px; font-size:13px; word-break:break-all; color:#2563eb;"><?= esc($actionUrl) ?></p>
<p style="margin:0; font-size:13px; color:#6b7280;">If you didn’t create this account, please contact <?= esc($supportEmail) ?>.</p>
