<?php
// Two-factor management (GTM-020). The QR code is rendered on our server, so the
// secret never goes to a third-party service.
?>
<?php if (! empty($row) && (int) $row['is_enabled'] === 1): ?>
    <p>Two-factor authentication is <strong>on</strong>. You'll be asked for a code each time you sign in.</p>
    <form method="post" action="<?= site_url('Account/2fa/disable') ?>">
        <?= csrf_field() ?>
        <label for="disable-code">Current code or backup code</label>
        <input type="text" id="disable-code" name="code" class="form-control w-25" maxlength="8" autocomplete="one-time-code" required />
        <button class="btn btn-danger mt-2">Turn off two-factor</button>
    </form>
    <form method="post" action="<?= site_url('Account/2fa/backup/regenerate') ?>" class="mt-3">
        <?= csrf_field() ?>
        <button class="btn btn-secondary">Make new backup codes</button>
    </form>
<?php else: ?>
    <p>Scan this QR code with your authenticator app:</p>
    <img src="<?= esc($qrDataUri, 'attr') ?>" width="180" height="180" alt="Two-factor QR code" />
    <p class="mt-2 small">Can't scan it? Enter this key instead: <code><?= esc(trim(chunk_split($proposedSecret, 4, ' '))) ?></code></p>
    <p class="mt-3">Then enter the 6-digit code to turn it on:</p>
    <form method="post" action="<?= site_url('Account/2fa/enable') ?>">
        <?= csrf_field() ?>
        <input type="text" name="code" class="form-control w-25" maxlength="6" inputmode="numeric" autocomplete="one-time-code" required />
        <button class="btn btn-primary mt-2">Turn on two-factor</button>
    </form>
<?php endif; ?>
