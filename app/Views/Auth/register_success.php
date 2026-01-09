<?php
$this->config = config('Auth');
$config = $this->config;
$message = $message ?? session('message');
?>
<?= $this->extend($config->viewLayout) ?>
<?= $this->section('main') ?>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h2 class="card-title mb-3">You're registered 🎉</h2>
                    <p class="text-muted">Thanks for joining MyMI Wallet. Follow these steps to finish your setup.</p>

                    <?php if (! empty($message)): ?>
                        <div class="alert alert-info"><?= esc($message) ?></div>
                    <?php endif; ?>

                    <ol class="list-group list-group-numbered mb-4">
                        <li class="list-group-item">
                            <strong>Check your inbox.</strong> We sent a verification email so you can activate your account.
                        </li>
                        <li class="list-group-item">
                            <strong>Click the activation link.</strong> This verifies your email and unlocks your dashboard.
                        </li>
                        <li class="list-group-item">
                            <strong>Log in and complete onboarding.</strong> We'll guide you through your profile, budget, and watchlist setup.
                        </li>
                    </ol>

                    <div class="row g-3">
                        <div class="col-md-6">
                            <a class="btn btn-primary w-100" href="<?= site_url('login') ?>">Go to login</a>
                        </div>
                        <div class="col-md-6">
                            <form method="post" action="<?= site_url('register/resend-activation') ?>" class="card card-bordered">
                                <?= csrf_field() ?>
                                <div class="card-body">
                                    <h6 class="card-title">Resend verification email</h6>
                                    <p class="text-muted small mb-2">If you can't find the email, we can resend it.</p>
                                    <input type="email" class="form-control mb-2" name="email" placeholder="Email address" required>
                                    <button type="submit" class="btn btn-outline-primary w-100">Resend verification email</button>
                                </div>
                            </form>
                        </div>
                    </div>

                    <p class="text-muted small mt-4">Need help? Reach out to <a href="mailto:support@mymiwallet.com">support@mymiwallet.com</a>.</p>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>
