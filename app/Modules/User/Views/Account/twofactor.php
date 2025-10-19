<?php
// PATCH: 2FA management view
?>
<?php if (! empty($row) && (int) $row['is_enabled'] === 1): ?>
    <p>Two-factor authentication is <strong>enabled</strong>.</p>
    <form method="post" action="/Account/2fa/disable">
        <?= csrf_field() ?>
        <button class="btn btn-danger">Disable 2FA</button>
    </form>
    <form method="post" action="/Account/2fa/backup/regenerate" class="mt-3">
        <?= csrf_field() ?>
        <button class="btn btn-secondary">Regenerate Backup Codes</button>
    </form>
<?php else: ?>
    <p>Scan this QR code with your authenticator app:</p>
    <img src="https://api.qrserver.com/v1/create-qr-code/?data=<?= urlencode($otpauth) ?>&size=150x150" alt="QR Code" />
    <p class="mt-3">Enter the 6-digit code to enable:</p>
    <form method="post" action="/Account/2fa/enable">
        <?= csrf_field() ?>
        <input type="hidden" name="secret" value="<?= esc($proposedSecret) ?>" />
        <input type="text" name="code" class="form-control w-25" maxlength="6" />
        <button class="btn btn-primary mt-2">Enable 2FA</button>
    </form>
<?php endif; ?>
