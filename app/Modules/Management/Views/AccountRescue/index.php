<?php
/** @var array $lookupUser */
$lookupUser = $lookupUser ?? null;
$lookupEmail = $lookupEmail ?? '';
?>

<div class="nk-block-head nk-block-head-sm">
    <div class="nk-block-between">
        <div class="nk-block-head-content">
            <h3 class="nk-block-title page-title">Account Rescue</h3>
            <div class="nk-block-des text-soft">
                <p>Admin-only tools to look up accounts and resolve activation or access issues.</p>
            </div>
        </div>
    </div>
</div>

<div class="nk-block">
    <?= view('App\Views\partials\auth_flash') ?>

    <div class="card card-bordered">
        <div class="card-inner">
            <form method="post" action="<?= site_url('Management/AccountRescue/lookup') ?>" class="row g-3 align-items-end">
                <?= csrf_field() ?>
                <div class="col-md-8">
                    <label class="form-label" for="rescue-email">Lookup by email</label>
                    <input type="email" id="rescue-email" name="email" class="form-control" value="<?= esc($lookupEmail) ?>" placeholder="user@example.com" required>
                </div>
                <div class="col-md-4 text-md-end">
                    <button type="submit" class="btn btn-primary w-100">Find account</button>
                </div>
            </form>
        </div>
    </div>

    <?php if ($lookupUser) : ?>
        <div class="card card-bordered mt-4">
            <div class="card-inner">
                <h5 class="card-title">Account details</h5>
                <div class="row g-3">
                    <div class="col-md-6">
                        <ul class="list-unstyled mb-0">
                            <li><strong>User ID:</strong> <?= esc((string) $lookupUser['id']) ?></li>
                            <li><strong>Email:</strong> <?= esc($lookupUser['email']) ?></li>
                            <li><strong>Active:</strong> <?= $lookupUser['active'] ? 'Yes' : 'No' ?></li>
                            <li><strong>Email verified:</strong> <?= $lookupUser['email_verified'] ? 'Yes' : 'No' ?></li>
                        </ul>
                    </div>
                    <div class="col-md-6">
                        <ul class="list-unstyled mb-0">
                            <li><strong>Created:</strong> <?= esc((string) ($lookupUser['created_at'] ?? '')) ?></li>
                            <li><strong>Referral code:</strong> <?= esc((string) ($lookupUser['referral_code'] ?? '')) ?></li>
                            <li><strong>Last login:</strong> <?= esc((string) ($lookupUser['last_login'] ?? '')) ?></li>
                        </ul>
                    </div>
                </div>
                <hr class="my-4">
                <div class="d-flex flex-wrap gap-2">
                    <form method="post" action="<?= site_url('Management/AccountRescue/resend-activation') ?>">
                        <?= csrf_field() ?>
                        <input type="hidden" name="email" value="<?= esc($lookupUser['email'], 'attr') ?>">
                        <input type="hidden" name="user_id" value="<?= esc((string) $lookupUser['id'], 'attr') ?>">
                        <button type="submit" class="btn btn-outline-primary">Resend activation</button>
                    </form>
                    <form method="post" action="<?= site_url('Management/AccountRescue/manual-activate') ?>" onsubmit="return confirm('Activate this account now?');">
                        <?= csrf_field() ?>
                        <input type="hidden" name="email" value="<?= esc($lookupUser['email'], 'attr') ?>">
                        <input type="hidden" name="user_id" value="<?= esc((string) $lookupUser['id'], 'attr') ?>">
                        <button type="submit" class="btn btn-outline-success">Manually activate</button>
                    </form>
                    <form method="post" action="<?= site_url('Management/AccountRescue/force-password-reset') ?>">
                        <?= csrf_field() ?>
                        <input type="hidden" name="email" value="<?= esc($lookupUser['email'], 'attr') ?>">
                        <input type="hidden" name="user_id" value="<?= esc((string) $lookupUser['id'], 'attr') ?>">
                        <button type="submit" class="btn btn-outline-warning">Force password reset email</button>
                    </form>
                    <form method="post" action="<?= site_url('Management/AccountRescue/unlock-account') ?>">
                        <?= csrf_field() ?>
                        <input type="hidden" name="email" value="<?= esc($lookupUser['email'], 'attr') ?>">
                        <input type="hidden" name="user_id" value="<?= esc((string) $lookupUser['id'], 'attr') ?>">
                        <button type="submit" class="btn btn-outline-secondary">Unlock account</button>
                    </form>
                </div>
            </div>
        </div>
    <?php endif; ?>
</div>
