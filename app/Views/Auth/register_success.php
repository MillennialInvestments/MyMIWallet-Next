<?= $this->extend('App\Views\Auth\layout') ?>
<?= $this->section('main') ?>

<?php
$user  = function_exists('user') ? user() : null;
$role  = $user->role ?? session('role') ?? 'guest';
$social = $socialMedia ?? [];
?>

<div class="container py-5">

    <!-- FLASH MESSAGE -->
    <?php if (session()->has('auth_message')) : ?>
        <?php $msg = session('auth_message'); ?>
        <div class="alert alert-<?= esc($msg['type']) ?> text-center shadow-sm">
            <?= esc($msg['text']) ?>
        </div>
    <?php endif; ?>

    <div class="row justify-content-center">
        <div class="col-lg-8">

            <!-- SUCCESS HERO -->
            <div class="card border-0 shadow-lg text-center mb-4">
                <div class="card-body p-5">

                    <div class="mb-3">
                        <i class="bi bi-check-circle-fill text-success" style="font-size: 3rem;"></i>
                    </div>

                    <h2 class="fw-bold mb-2">Registration Successful</h2>

                    <p class="text-muted mb-3">
                        Your account has been created successfully.
                    </p>

                    <?php if (!empty($activationRequired)): ?>
                        <div class="alert alert-warning">
                            📩 Please check your email to activate your account.
                        </div>

                        <!-- RESEND ACTIVATION -->
                        <form method="post" action="<?= site_url('register/resend-activation') ?>" class="mt-3">
                            <?= csrf_field() ?>
                            <input type="hidden" name="email" value="<?= esc(old('email') ?? '') ?>">
                            <button type="submit" class="btn btn-outline-warning btn-sm">
                                Resend Activation Email
                            </button>
                        </form>
                    <?php endif; ?>

                    <a href="<?= site_url('login') ?>" class="btn btn-primary btn-lg mt-3 px-4">
                        Continue to Login
                    </a>

                </div>
            </div>

            <!-- PLATFORM FEATURES -->
            <div class="card shadow-sm mb-4">
                <div class="card-body">

                    <h5 class="fw-bold mb-3">🚀 What You Can Do</h5>

                    <div class="row g-3 text-center">

                        <div class="col-md-4">
                            <div class="p-3 border rounded h-100">
                                <i class="bi bi-wallet2 fs-4 mb-2"></i>
                                <h6>Budgeting</h6>
                                <small class="text-muted">Track income and expenses</small>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="p-3 border rounded h-100">
                                <i class="bi bi-graph-up fs-4 mb-2"></i>
                                <h6>Investments</h6>
                                <small class="text-muted">Grow your portfolio</small>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="p-3 border rounded h-100">
                                <i class="bi bi-bell fs-4 mb-2"></i>
                                <h6>Alerts</h6>
                                <small class="text-muted">Stay ahead of the market</small>
                            </div>
                        </div>

                    </div>

                </div>
            </div>

            <!-- ROLE-BASED NEXT STEPS -->
            <div class="card shadow-sm mb-4">
                <div class="card-body">

                    <h5 class="fw-bold mb-3">🎯 Recommended Next Steps</h5>

                    <?php if ($role === 'admin'): ?>

                        <ul class="mb-3">
                            <li>Manage users and permissions</li>
                            <li>Monitor system activity</li>
                            <li>Configure platform settings</li>
                        </ul>

                        <a href="<?= site_url('Management') ?>" class="btn btn-outline-dark">
                            Admin Dashboard
                        </a>

                    <?php elseif ($role === 'driver'): ?>

                        <ul class="mb-3">
                            <li>Start accepting gigs</li>
                            <li>Track your earnings</li>
                            <li>Enable driver mode</li>
                        </ul>

                        <a href="<?= site_url('driver/dashboard') ?>" class="btn btn-outline-dark">
                            Driver Dashboard
                        </a>

                    <?php elseif ($role === 'advertiser'): ?>

                        <ul class="mb-3">
                            <li>Create ad campaigns</li>
                            <li>Target your audience</li>
                            <li>Track ROI</li>
                        </ul>

                        <a href="<?= site_url('advertiser/dashboard') ?>" class="btn btn-outline-dark">
                            Advertiser Panel
                        </a>

                    <?php else: ?>

                        <ul class="mb-3">
                            <li>Create your first budget</li>
                            <li>Explore investment tools</li>
                            <li>Build your watchlist</li>
                        </ul>

                        <a href="<?= site_url('dashboard') ?>" class="btn btn-outline-primary">
                            Go to Dashboard
                        </a>

                    <?php endif; ?>

                </div>
            </div>

            <!-- SOCIAL COMMUNITY -->
            <div class="card border-0 bg-light shadow-sm mb-4">
                <div class="card-body text-center">

                    <h5 class="fw-bold mb-3">🌐 Join Our Community</h5>

                    <p class="text-muted mb-3">
                        Stay connected and get real-time updates across all platforms.
                    </p>

                    <div class="d-flex justify-content-center flex-wrap gap-2">

                        <?php foreach ($social as $platform => $url): ?>
                            <?php if (!empty($url)): ?>
                                <a href="<?= esc($url) ?>" target="_blank" class="btn btn-outline-secondary btn-sm">
                                    <i class="bi bi-<?= esc($platform) ?>"></i>
                                    <?= ucfirst($platform) ?>
                                </a>
                            <?php endif; ?>
                        <?php endforeach; ?>

                    </div>

                </div>
            </div>

            <!-- REFERRAL CTA -->
            <div class="text-center">
                <h6 class="mb-2">🔥 Invite Others & Grow Together</h6>
                <a href="<?= site_url('register') ?>" class="btn btn-success">
                    Invite a Friend
                </a>
            </div>

        </div>
    </div>
</div>

<?= $this->endSection() ?>