<?php
$name = $name ?? 'there';
$actionUrl = $actionUrl ?? '#';
$ctaLabel = $ctaLabel ?? 'Reset My Password';
$supportEmail = $supportEmail ?? 'support@mymiwallet.com';
?>
<h2 style="margin:0 0 12px; font-size:22px; color:#111827;">Reset your MyMI Wallet password</h2>
<p style="margin:0 0 16px; font-size:15px; color:#374151;">Hi <?= esc($name) ?>,</p>
<p style="margin:0 0 24px; font-size:15px; color:#374151;">We received a request to reset your password. Use the button below to choose a new password.</p>
<p style="margin:0 0 24px;">
    <a href="<?= esc($actionUrl) ?>" target="_blank" rel="noopener" style="display:inline-block; background-color:#0f766e; color:#ffffff; text-decoration:none; padding:12px 20px; border-radius:6px; font-weight:bold;">
        <?= esc($ctaLabel) ?>
    </a>
</p>
<p style="margin:0 0 16px; font-size:13px; color:#6b7280;">If the button doesn’t work, copy and paste this link into your browser:</p>
<p style="margin:0 0 24px; font-size:13px; word-break:break-all; color:#0f766e;"><?= esc($actionUrl) ?></p>
<p style="margin:0; font-size:13px; color:#6b7280;">If you didn’t request this, please ignore this email or contact <?= esc($supportEmail) ?>.</p>
