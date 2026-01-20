<?php
/** @var array $nonce */
$styleNonce = $nonce['style'] ?? '';
?>

<style <?= $styleNonce; ?>>
    .account-help-card {
        border-radius: 1rem;
        border: 1px solid var(--bs-border-color);
        background: var(--bs-body-bg);
        box-shadow: var(--bs-box-shadow-sm);
    }
    .account-help-list li + li {
        margin-top: 0.35rem;
    }
    .account-help-section + .account-help-section {
        margin-top: 1.5rem;
    }
</style>

<div class="nk-block-head nk-block-head-sm">
    <div class="nk-block-between">
        <div class="nk-block-head-content">
            <h3 class="nk-block-title page-title">Account Help Center</h3>
            <div class="nk-block-des text-soft">
                <p>Resolve activation, access, and password issues without logging in.</p>
            </div>
        </div>
    </div>
</div>

<div class="nk-block">
    <div class="row justify-content-center">
        <div class="col-xl-10">
            <?= view('App\Views\partials\auth_flash') ?>

            <div class="card account-help-card mb-4">
                <div class="card-body">
                    <h5 class="card-title">Email delivery tips</h5>
                    <ul class="list-unstyled text-soft account-help-list">
                        <li>Check your spam or promotions folders.</li>
                        <li>Search for the subject line: <strong>Activate</strong>.</li>
                        <li>Add <strong>support@mymiwallet.com</strong> to your contacts.</li>
                        <li>If you use Gmail, check the Promotions tab.</li>
                    </ul>
                </div>
            </div>

            <form method="post" action="<?= site_url('Support/resendActivation') ?>">
                <?= csrf_field() ?>
                <div class="card account-help-card mb-4">
                    <div class="card-body">
                        <div class="row align-items-end g-3">
                            <div class="col-md-8">
                                <label class="form-label" for="support-email">Email address</label>
                                <input type="email" id="support-email" name="email" class="form-control" placeholder="you@example.com" required>
                                <div class="form-text">Delivery can take up to 10 minutes depending on your provider.</div>
                            </div>
                            <div class="col-md-4 text-md-end">
                                <button type="submit" class="btn btn-primary w-100">Resend Activation Email</button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card account-help-card account-help-section">
                    <div class="card-body">
                        <h5 class="card-title">I didn’t get my activation email</h5>
                        <p class="text-soft">Use the same email you registered with. We will resend your activation email.</p>
                        <ul class="list-unstyled text-soft account-help-list">
                            <li>Check spam or promotions folders.</li>
                            <li>Whitelist <strong>support@mymiwallet.com</strong> and <strong>noreply@mymiwallet.com</strong>.</li>
                            <li>Allow up to 10 minutes for delivery.</li>
                        </ul>
                        <div class="mt-3">
                            <button type="submit" class="btn btn-outline-primary">Resend Activation Email</button>
                        </div>
                    </div>
                </div>

                <div class="card account-help-card account-help-section">
                    <div class="card-body">
                        <h5 class="card-title">My activation link says invalid/expired</h5>
                        <p class="text-soft">We can send you a fresh activation link.</p>
                        <button type="submit" class="btn btn-outline-primary">Send a fresh activation link</button>
                    </div>
                </div>

                <div class="card account-help-card account-help-section">
                    <div class="card-body">
                        <h5 class="card-title">I forgot my password</h5>
                        <p class="text-soft">We will email a password reset link if an account exists.</p>
                        <button type="submit" class="btn btn-outline-primary" formaction="<?= site_url('Support/sendPasswordReset') ?>">Send password reset email</button>
                    </div>
                </div>
            </form>

            <div class="card account-help-card account-help-section">
                <div class="card-body">
                    <h5 class="card-title">I used the wrong email</h5>
                    <p class="text-soft mb-0">If you registered with a typo, you can register again or contact support for help.</p>
                    <div class="mt-3">
                        <a class="btn btn-outline-secondary" href="mailto:support@mymiwallet.com">Contact support</a>
                        <a class="btn btn-outline-secondary" href="<?= site_url('register') ?>">Re-register</a>
                    </div>
                </div>
            </div>

            <div class="card account-help-card account-help-section">
                <div class="card-body">
                    <h5 class="card-title">Status guidance</h5>
                    <p class="text-soft mb-0">If an account exists for that email, we sent instructions. If your account is inactive, use the activation resend options above.</p>
                </div>
            </div>
        </div>
    </div>
</div>
