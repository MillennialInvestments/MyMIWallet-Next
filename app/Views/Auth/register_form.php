<?php helper('form'); ?>
<div class="card">
    <img class="mb-3" src="<?= base_url('assets/images/MyMI-Wallet-Logo-Black.png'); ?>" alt="MyMI Wallet">
    <h1 class="mbr-section-title mbr-bold mb-1 pb-3 mbr-fonts-style card-title display-7 text-center">Create Your Free Account!</h1>
    <?php if (! empty($registrationSourceContent['headline'])) : ?>
        <p class="text-center text-muted mb-2"><?= esc($registrationSourceContent['headline']) ?></p>
    <?php endif; ?>
    <div class="card-body">
        <?php if (session()->has('errors')) : foreach ((array) session('errors') as $error) : ?>
            <div class="alert alert-danger"><?= esc((string) $error) ?></div>
        <?php endforeach; endif; ?>

        <form class="form-horizontal" id="user_register_form" action="<?= site_url('register') ?>" method="post" accept-charset="utf-8" novalidate>
            <?= csrf_field() ?>
            <?php $registrationAttribution = is_array($registrationAttribution ?? null) ? $registrationAttribution : []; ?>
            <input type="hidden" name="referralCode" value="<?= esc($referralCode ?? set_value('referralCode')) ?>">
            <input type="hidden" id="referral" name="referral" value="<?= esc($registrationAttribution['referral_slug'] ?? $referralCode ?? '') ?>">
            <input type="hidden" id="referral_link" name="referral_link" value="<?= esc($referralLink ?? 'Default') ?>">
            <input type="hidden" id="source_channel" name="source_channel" value="<?= esc($registrationAttribution['source_channel'] ?? 'direct') ?>">
            <input type="hidden" id="source_slug" name="source_slug" value="<?= esc($registrationAttribution['source_slug'] ?? '') ?>">
            <input type="hidden" id="campaign_code" name="campaign_code" value="<?= esc($registrationAttribution['campaign_code'] ?? '') ?>">
            <input type="hidden" id="utm_source" name="utm_source" value="<?= esc($registrationAttribution['utm']['utm_source'] ?? '') ?>">
            <input type="hidden" id="utm_medium" name="utm_medium" value="<?= esc($registrationAttribution['utm']['utm_medium'] ?? '') ?>">
            <input type="hidden" id="utm_campaign" name="utm_campaign" value="<?= esc($registrationAttribution['utm']['utm_campaign'] ?? '') ?>">
            <input type="hidden" id="landing_path" name="landing_path" value="<?= esc($registrationAttribution['landing_path'] ?? $registrationAttribution['route'] ?? '') ?>">

            <div class="form-group">
                <label for="account_type">Account Type </label>
                <select class="form-control" id="account_type" name="account_type" required>
                    <?php foreach (['Personal' => 'Personal', 'Business' => 'Business'] as $value => $display_text) : ?>
                        <option value="<?= esc($value) ?>"<?= old('account_type') === $value ? ' selected="selected"' : '' ?>><?= esc($display_text) ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="form-group">
                <label for="email">Email Address</label>
                <input type="email" class="form-control" id="email" name="email" value="<?= esc(set_value('email')) ?>" required>
            </div>

            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" class="form-control" id="username" name="username" value="<?= esc(set_value('username')) ?>" required>
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>

            <div class="form-group">
                <label for="pass_confirm">Confirm Password</label>
                <input type="password" class="form-control" id="pass_confirm" name="pass_confirm" required>
            </div>

            <div class="form-group">
                <label for="referral_edit">Referral Code</label>
                <input type="text" class="form-control" id="referral_edit" name="referral" value="<?= esc($referralCode ?? set_value('referral')) ?>">
            </div>

            <button type="submit" class="btn btn-primary">Create Account</button>

            <div class="control-group form-row pt-3">
                <div class="controls col-12 pl-0 ms-0">
                    <div class="accordion-item">
                        <a href="#" class="accordion-head border-bottom collapsed" data-bs-toggle="collapse" data-bs-target="#accordion-item-2-2">
                            <strong>Service Disclosure</strong>
                            <span class="accordion-icon"></span>
                        </a>
                        <div class="accordion-body collapse" id="accordion-item-2-2" data-bs-parent="#accordion-2">
                            <div class="accordion-inner">
                                <small class="text-muted">We are committed to complying with all U.S. regulations and safety requirements relevant to our services.</small>
                            </div>
                        </div>
                        <div class="accordian-footer py-2 pl-4">
                            <small>By registering an account, you agree to our <a href="<?= site_url('/Legal/Terms-And-Conditions'); ?>">Terms &amp; Conditions</a> and <a href="<?= site_url('/Legal/Privacy-Policy'); ?>">Privacy Policy</a>.</small>
                        </div>
                    </div>
                </div>
            </div>
        <?= form_close(); ?>
    </div>
</div>
