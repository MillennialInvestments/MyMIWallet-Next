<!-- app/Modules/User/Views/Wallets/Purchase/Memberships.php -->
<?php
// Safe presentation default; never fabricate paid-plan capabilities.
$getFeatures = isset($getFeatures) && is_array($getFeatures) ? $getFeatures : [];
$host = (string) (service('request')->getUri()->getHost() ?? $_SERVER['HTTP_HOST'] ?? '');
$isStagingContext = str_contains($host, 'staging') || str_contains($host, 'localhost') || str_contains($host, '127.0.0.1')
    || (config('SiteSettings')->beta ?? 0) === 1
    || ENVIRONMENT !== 'production'
    || ((int) (session('cuRole') ?? 4) <= 2);
?>
<style <?= $nonce['style'] ?? '' ?>>
    .membership-hero-banner {
        background: linear-gradient(135deg, rgba(20, 28, 48, 0.92) 0%, rgba(35, 45, 75, 0.95) 100%), url('<?= base_url('assets/images/MyMI-Walllet-Background.jpeg'); ?>');
        background-size: cover;
        background-position: center;
        border-radius: 12px;
        position: relative;
        overflow: hidden;
    }
    .tier-card {
        border-radius: 12px;
        transition: transform 0.2s ease, box-shadow 0.2s ease;
        display: flex;
        flex-direction: column;
        height: 100%;
    }
    .tier-card:hover {
        transform: translateY(-4px);
        box-shadow: 0 10px 25px rgba(0,0,0,0.08);
    }
    .tier-card.tier-starter { border-top: 4px solid #0dcaf0; }
    .tier-card.tier-basic   { border-top: 4px solid #0d6efd; }
    .tier-card.tier-pro     { border-top: 4px solid #6f42c1; box-shadow: 0 4px 18px rgba(111,66,193,0.15); }
    .tier-card.tier-premium { border-top: 4px solid #f5a623; box-shadow: 0 4px 18px rgba(245,166,35,0.15); }
    .gold-image {
        filter: sepia(1) saturate(5) hue-rotate(10deg) brightness(1.2);
    }
</style>

<div class="nk-block">
    <div class="row">
        <div class="col-12 my-sm-3">            
            <div class="nk-block nk-block-lg">
                <!-- Header -->
                <div class="nk-block-head text-center mb-4">
                    <span class="badge bg-primary-dim text-primary px-3 py-1 mb-2">TIERED FINANCIAL INTELLIGENCE</span>
                    <h2 class="nk-block-title page-title">MyMI Membership Bundles</h2>
                    <div class="nk-block-des text-soft mx-auto" style="max-width: 680px;">
                        <p class="lead">Unlock institutional-grade budgeting, real-time alert webhooks, AI Copilot analytics, and multi-asset wealth management designed for your financial trajectory.</p>
                    </div>
                </div>

                <!-- Cross-Promotional Customizable Hero Banner -->
                <?php if ($siteSettings->customizableMemberships === 1) : ?>
                <div class="col-12 mb-4">
                    <div class="card membership-hero-banner text-white p-4 shadow-sm border-0">
                        <div class="row align-items-center">
                            <div class="col-lg-8">
                                <span class="badge bg-warning text-dark fw-bold mb-2"><em class="icon ni ni-spark"></em> BUILD &amp; SAVE</span>
                                <h3 class="text-white mb-2">Customize Your Membership Suite</h3>
                                <p class="text-white-50 mb-3" style="max-width: 620px;">
                                    Why pay for tools you don't use? Hand-pick your alerts, crypto staking modules, automated budget connectors, and community perks to create a plan that fits your exact portfolio needs.
                                </p>
                                <div class="d-flex flex-wrap gap-2 mb-3">
                                    <span class="badge bg-dark text-white border border-secondary"><em class="icon ni ni-bell"></em> TradingView Webhooks</span>
                                    <span class="badge bg-dark text-white border border-secondary"><em class="icon ni ni-bulb"></em> AI Market Advisor</span>
                                    <span class="badge bg-dark text-white border border-secondary"><em class="icon ni ni-wallet"></em> Solana &amp; Coin Vault</span>
                                    <span class="badge bg-dark text-white border border-secondary"><em class="icon ni ni-file-docs"></em> Annual Tax Preparation</span>
                                </div>
                            </div>
                            <div class="col-lg-4 text-lg-end mt-3 mt-lg-0">
                                <a href="<?= site_url('Wallets/Purchase/Memberships/Customize'); ?>" class="btn btn-warning btn-lg text-dark fw-bold shadow">
                                    <em class="icon ni ni-setting"></em> Customize Your Plan
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endif; ?>

                <!-- Tier Pricing Cards (Color Palette Layout) -->
                <div class="row g-gs mb-5">
                    <!-- Starter Plan (Teal/Cyan) -->
                    <div class="col-md-6 col-xxl-3">
                        <div class="card card-bordered tier-card tier-starter text-center">
                            <div class="card-inner d-flex flex-column h-100">
                                <div class="mb-3">
                                    <span class="badge bg-info-dim text-info">Beginner Suite</span>
                                </div>
                                <div class="pricing-media mb-2">
                                    <img src="<?= base_url('assets/images/icons/plan-s1.svg'); ?>" alt="Starter" style="height: 56px;">
                                </div>
                                <h4 class="title mb-1 text-dark">Starter</h4>
                                <span class="text-soft small mb-3">Ideal for individuals starting their investment journey.</span>
                                
                                <div class="pricing-amount my-3">
                                    <div class="amount h2 mb-0 text-info">$<?= (float)$membershipStarterFee; ?> <span class="text-muted fs-6">/ mo</span></div>
                                    <span class="text-muted small">Billed Monthly (30 Days)</span>
                                </div>
                                
                                <ul class="list list-sm text-start mb-4 flex-grow-1">
                                    <li class="d-flex align-items-center gap-2 mb-2"><em class="icon ni ni-check text-info"></em> <span>Personal Budgeting Tool</span></li>
                                    <li class="d-flex align-items-center gap-2 mb-2"><em class="icon ni ni-check text-info"></em> <span>Manual Trade Tracker</span></li>
                                    <li class="d-flex align-items-center gap-2 mb-2"><em class="icon ni ni-check text-info"></em> <span>Crypto Asset Creator</span></li>
                                    <li class="d-flex align-items-center gap-2 mb-2"><em class="icon ni ni-check text-info"></em> <span>Up to 5 Inbound Alert Webhooks</span></li>
                                    <li class="d-flex align-items-center gap-2 mb-2 text-muted"><em class="icon ni ni-cross text-light"></em> <span>Real-Time Market Feeds</span></li>
                                </ul>
                                
                                <a href="<?= site_url('Wallets/Purchase/Memberships/Starter'); ?>" class="btn btn-outline-info w-100 mt-auto">
                                    Select Starter Plan
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- Basic Plan (Indigo/Blue) -->
                    <div class="col-md-6 col-xxl-3">
                        <div class="card card-bordered tier-card tier-basic text-center">
                            <div class="card-inner d-flex flex-column h-100">
                                <div class="mb-3">
                                    <span class="badge bg-primary-dim text-primary">Automation &amp; Feeds</span>
                                </div>
                                <div class="pricing-media mb-2">
                                    <img src="<?= base_url('assets/images/icons/plan-s2.svg'); ?>" alt="Basic" style="height: 56px;">
                                </div>
                                <h4 class="title mb-1 text-dark">Basic</h4>
                                <span class="text-soft small mb-3">More automation, broker integration, and live market intelligence.</span>
                                
                                <div class="pricing-amount my-3">
                                    <div class="amount h2 mb-0 text-primary">$<?= (float)$membershipBasicFee; ?> <span class="text-muted fs-6">/ mo</span></div>
                                    <span class="text-muted small">Billed Monthly (30 Days)</span>
                                </div>
                                
                                <ul class="list list-sm text-start mb-4 flex-grow-1">
                                    <li class="d-flex align-items-center gap-2 mb-2"><em class="icon ni ni-check text-primary"></em> <span>All Starter Features</span></li>
                                    <li class="d-flex align-items-center gap-2 mb-2"><em class="icon ni ni-check text-primary"></em> <span>MyMI Account Integration</span></li>
                                    <li class="d-flex align-items-center gap-2 mb-2"><em class="icon ni ni-check text-primary"></em> <span>Curated Financial News &amp; Sentiment</span></li>
                                    <li class="d-flex align-items-center gap-2 mb-2"><em class="icon ni ni-check text-primary"></em> <span>Real-Time Market Data Feeds</span></li>
                                    <li class="d-flex align-items-center gap-2 mb-2"><em class="icon ni ni-check text-primary"></em> <span>MyMI Trade Alerts Ingestion</span></li>
                                </ul>
                                
                                <a href="<?= site_url('Wallets/Purchase/Memberships/Basic'); ?>" class="btn btn-primary w-100 mt-auto">
                                    Select Basic Plan
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- Pro Plan (Royal Purple - Most Popular) -->
                    <div class="col-md-6 col-xxl-3">
                        <div class="card card-bordered tier-card tier-pro text-center position-relative">
                            <div class="position-absolute top-0 start-50 translate-middle">
                                <span class="badge bg-primary px-3 py-1 shadow-sm"><em class="icon ni ni-spark"></em> MOST POPULAR</span>
                            </div>
                            <div class="card-inner d-flex flex-column h-100 pt-4">
                                <div class="mb-3">
                                    <span class="badge bg-purple-dim text-purple">Advanced Active Investor</span>
                                </div>
                                <div class="pricing-media mb-2">
                                    <img src="<?= base_url('assets/images/icons/plan-s3.svg'); ?>" alt="Pro" style="height: 56px;">
                                </div>
                                <h4 class="title mb-1 text-dark">Pro</h4>
                                <span class="text-soft small mb-3">Extensive tools, exclusive groups, and full webhook alert engine.</span>
                                
                                <div class="pricing-amount my-3">
                                    <div class="amount h2 mb-0" style="color: #6f42c1;">$<?= (float)$membershipProFee; ?> <span class="text-muted fs-6">/ mo</span></div>
                                    <span class="text-muted small">Billed Monthly (30 Days)</span>
                                </div>
                                
                                <ul class="list list-sm text-start mb-4 flex-grow-1">
                                    <li class="d-flex align-items-center gap-2 mb-2"><em class="icon ni ni-check" style="color: #6f42c1;"></em> <span>All Basic Features</span></li>
                                    <li class="d-flex align-items-center gap-2 mb-2"><em class="icon ni ni-check" style="color: #6f42c1;"></em> <span>Unlimited Webhook Trade Alerts</span></li>
                                    <li class="d-flex align-items-center gap-2 mb-2"><em class="icon ni ni-check" style="color: #6f42c1;"></em> <span>TradingView &amp; TrendSpider Integration</span></li>
                                    <li class="d-flex align-items-center gap-2 mb-2"><em class="icon ni ni-check" style="color: #6f42c1;"></em> <span>AI Advisor Predictive Risk Insights</span></li>
                                    <li class="d-flex align-items-center gap-2 mb-2"><em class="icon ni ni-check" style="color: #6f42c1;"></em> <span>Exclusive Discord Trade Room Access</span></li>
                                </ul>
                                
                                <a href="<?= site_url('Wallets/Purchase/Memberships/Pro'); ?>" class="btn btn-primary w-100 mt-auto" style="background-color: #6f42c1; border-color: #6f42c1;">
                                    Select Pro Plan
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- Premium Plan (Luxe Gold/Amber - Executive VIP) -->
                    <div class="col-md-6 col-xxl-3">
                        <div class="card card-bordered tier-card tier-premium text-center position-relative">
                            <div class="position-absolute top-0 start-50 translate-middle">
                                <span class="badge bg-warning text-dark px-3 py-1 shadow-sm fw-bold"><em class="icon ni ni-crown"></em> VIP EXECUTIVE</span>
                            </div>
                            <div class="card-inner d-flex flex-column h-100 pt-4">
                                <div class="mb-3">
                                    <span class="badge bg-warning-dim text-warning">Full Ecosystem Suite</span>
                                </div>
                                <div class="pricing-media mb-2">
                                    <img src="<?= base_url('assets/images/icons/plan-s1.svg'); ?>" class="gold-image" alt="Premium" style="height: 56px;">
                                </div>
                                <h4 class="title mb-1 text-dark">Premium</h4>
                                <span class="text-soft small mb-3">Comprehensive wealth management, tax prep, and VIP perks.</span>
                                
                                <div class="pricing-amount my-3">
                                    <div class="amount h2 mb-0 text-warning">$<?= (float)$membershipPremiumFee; ?> <span class="text-muted fs-6">/ mo</span></div>
                                    <span class="text-muted small">Billed Monthly (30 Days)</span>
                                </div>
                                
                                <ul class="list list-sm text-start mb-4 flex-grow-1">
                                    <li class="d-flex align-items-center gap-2 mb-2"><em class="icon ni ni-check text-warning"></em> <span>All Pro Features</span></li>
                                    <li class="d-flex align-items-center gap-2 mb-2"><em class="icon ni ni-check text-warning"></em> <span>Annual Tax Preparation Service</span></li>
                                    <li class="d-flex align-items-center gap-2 mb-2"><em class="icon ni ni-check text-warning"></em> <span>Retirement &amp; Wealth Planner Tool</span></li>
                                    <li class="d-flex align-items-center gap-2 mb-2"><em class="icon ni ni-check text-warning"></em> <span>Private Syndicate Project Allocation</span></li>
                                    <li class="d-flex align-items-center gap-2 mb-2"><em class="icon ni ni-check text-warning"></em> <span>Real-Time SMS &amp; Webhook Broadcasts</span></li>
                                </ul>
                                
                                <a href="<?= site_url('Wallets/Purchase/Memberships/Premium'); ?>" class="btn btn-warning text-dark fw-bold w-100 mt-auto">
                                    Select Premium Plan
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Cross-Promotional Pillars Section -->
                <div class="row g-gs mb-5">
                    <div class="col-12">
                        <div class="card card-bordered bg-light">
                            <div class="card-inner">
                                <h4 class="card-title text-center mb-4">Why Investors Upgrade to MyMI Wallet Premium</h4>
                                <div class="row g-gs">
                                    <div class="col-md-6 col-lg-3">
                                        <div class="d-flex align-items-start gap-3">
                                            <div class="p-2 bg-primary-dim text-primary rounded-circle"><em class="icon ni ni-bell fs-3"></em></div>
                                            <div>
                                                <h6 class="mb-1">Centralized Alert Hub</h6>
                                                <p class="small text-muted">Generate instant webhooks for TradingView and TrendSpider. Aggregate all your external signals in one dashboard.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-3">
                                        <div class="d-flex align-items-start gap-3">
                                            <div class="p-2 bg-info-dim text-info rounded-circle"><em class="icon ni ni-bulb fs-3"></em></div>
                                            <div>
                                                <h6 class="mb-1">AI Financial Copilot</h6>
                                                <p class="small text-muted">Interactive portfolio diagnostics, sentiment scoring, and ticker intelligence built right into your workflow.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-3">
                                        <div class="d-flex align-items-start gap-3">
                                            <div class="p-2 bg-purple-dim text-purple rounded-circle"><em class="icon ni ni-wallet fs-3"></em></div>
                                            <div>
                                                <h6 class="mb-1">Coin Vault &amp; Web3</h6>
                                                <p class="small text-muted">Manage custodial and non-custodial Solana assets, staking accounting, and tokenized project participations.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-3">
                                        <div class="d-flex align-items-start gap-3">
                                            <div class="p-2 bg-warning-dim text-warning rounded-circle"><em class="icon ni ni-shield-check fs-3"></em></div>
                                            <div>
                                                <h6 class="mb-1">Institutional Security</h6>
                                                <p class="small text-muted">Bank-grade encryption, audit-trailed transaction ledgers, and zero hidden contracts or automatic renewals unless opted in.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Feature Comparison Matrix Table -->
                <div class="row g-gs d-none d-md-block mb-5">
                    <div class="col-12">
                        <div class="card card-bordered">
                            <div class="card-inner">
                                <div class="nk-block-head">
                                    <h4 class="nk-block-title">Detailed Feature Comparison</h4>
                                    <div class="nk-block-des text-soft">
                                        <p>Transparent feature availability across all membership tiers.</p>
                                    </div>
                                </div>
                                <div class="table-responsive">
                                    <table class="table table-bordered text-center align-middle">
                                        <thead class="table-light">
                                            <tr>
                                                <th class="text-start w-40">Capability &amp; Service</th>
                                                <th class="w-15 text-info">Starter ($<?= (float)$membershipStarterFee; ?>)</th>
                                                <th class="w-15 text-primary">Basic ($<?= (float)$membershipBasicFee; ?>)</th>
                                                <th class="w-15" style="color: #6f42c1;">Pro ($<?= (float)$membershipProFee; ?>)</th>
                                                <th class="w-15 text-warning">Premium ($<?= (float)$membershipPremiumFee; ?>)</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php if ($getFeatures === []) : ?>
                                            <tr><td colspan="5" class="text-muted">Membership feature comparisons are currently unavailable.</td></tr>
                                            <?php endif; ?>
                                            <?php foreach ($getFeatures as $features) : ?>
                                            <tr>
                                                <td class="text-start" data-bs-toggle="tooltip" title="<?= esc($features['feature_description'] ?? '') ?>">
                                                    <span class="fw-bold text-dark"><?= esc($features['feature_name'] ?? '') ?></span>
                                                    <div class="small text-muted"><?= esc($features['feature_description'] ?? '') ?></div>
                                                </td>
                                                <?php if (($features['feature_level'] ?? 0) < 1) : ?>
                                                <td><em class="icon ni ni-check-circle-fill text-info fs-5"></em></td>
                                                <td><em class="icon ni ni-check-circle-fill text-primary fs-5"></em></td>
                                                <td><em class="icon ni ni-check-circle-fill fs-5" style="color: #6f42c1;"></em></td>
                                                <td><em class="icon ni ni-check-circle-fill text-warning fs-5"></em></td>
                                                <?php elseif (($features['feature_level'] ?? 0) < 2) : ?>
                                                <td><span class="text-muted">—</span></td>
                                                <td><em class="icon ni ni-check-circle-fill text-primary fs-5"></em></td>
                                                <td><em class="icon ni ni-check-circle-fill fs-5" style="color: #6f42c1;"></em></td>
                                                <td><em class="icon ni ni-check-circle-fill text-warning fs-5"></em></td>
                                                <?php elseif (($features['feature_level'] ?? 0) < 3) : ?>
                                                <td><span class="text-muted">—</span></td>
                                                <td><span class="text-muted">—</span></td>
                                                <td><em class="icon ni ni-check-circle-fill fs-5" style="color: #6f42c1;"></em></td>
                                                <td><em class="icon ni ni-check-circle-fill text-warning fs-5"></em></td>
                                                <?php else : ?>
                                                <td><span class="text-muted">—</span></td>
                                                <td><span class="text-muted">—</span></td>
                                                <td><span class="text-muted">—</span></td>
                                                <td><em class="icon ni ni-check-circle-fill text-warning fs-5"></em></td>
                                                <?php endif; ?>
                                            </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <td></td>
                                                <td><a href="<?= site_url('Wallets/Purchase/Memberships/Starter'); ?>" class="btn btn-sm btn-outline-info">Select Starter</a></td>
                                                <td><a href="<?= site_url('Wallets/Purchase/Memberships/Basic'); ?>" class="btn btn-sm btn-primary">Select Basic</a></td>
                                                <td><a href="<?= site_url('Wallets/Purchase/Memberships/Pro'); ?>" class="btn btn-sm btn-primary" style="background-color: #6f42c1; border-color: #6f42c1;">Select Pro</a></td>
                                                <td><a href="<?= site_url('Wallets/Purchase/Memberships/Premium'); ?>" class="btn btn-sm btn-warning text-dark fw-bold">Select Premium</a></td>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Features Breakdown Detail Cards -->
                <div class="row g-gs d-none d-md-block mb-5" id="features-breakdown">
                    <div class="col-12">
                        <div class="card card-bordered">
                            <div class="card-inner">
                                <div class="nk-block-head">
                                    <div class="nk-block-between g-3">
                                        <div class="nk-block-head-content">
                                            <h4 class="nk-block-title">Features Breakdown</h4>
                                        </div>
                                    </div>
                                    <div class="nk-block-des text-soft">
                                        <p>Learn more about what each feature offers to enhance your financial management experience.</p>
                                    </div>
                                </div>
                                <div class="card-inner pt-3">
                                    <div class="row g-gs">
                                        <?php if ($getFeatures === []) : ?>
                                        <p>Membership feature details are currently unavailable.</p>
                                        <?php endif; ?>
                                        <?php foreach ($getFeatures as $features) : ?>
                                        <?php
                                            $featurePrice = $features['feature_cost'] ?? '0.00';
                                            if ($featurePrice === '0.00') {
                                                $formattedPrice = '<strong>FREE</strong>';
                                            } elseif ($featurePrice === 'QUOTE') {
                                                $formattedPrice = '<a href="#">Request Quote</a>';
                                            } else {
                                                $formattedPrice = '$' . number_format((float)$featurePrice, 2);
                                            }
                                        ?>
                                        <div class="col-md-6 col-lg-4">
                                            <div class="card card-bordered h-100">
                                                <div class="card-inner">
                                                    <h5 class="card-title"><?= esc($features['feature_name'] ?? '') ?></h5>
                                                    <h6 class="card-subtitle mb-2 text-muted"><?= $formattedPrice ?></h6>
                                                    <p class="card-text text-soft small"><?= esc($features['feature_description'] ?? '') ?></p>
                                                </div>
                                            </div>
                                        </div>
                                        <?php endforeach; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Staging Diagnostic Smoke Suite (Rendered only on Staging / Beta / Admin Context) -->
                <?php if ($isStagingContext): ?>
                <div class="row g-gs">
                    <div class="col-12">
                        <div class="card card-bordered bg-light border-warning shadow-sm">
                            <div class="card-inner">
                                <div class="d-flex justify-content-between align-items-center mb-2">
                                    <span class="badge bg-warning text-dark"><em class="icon ni ni-shield-check"></em> STAGING PAYPAL SMOKE TEST SUITE</span>
                                    <span class="small text-muted">Staging / Tester Mode</span>
                                </div>
                                <p class="small text-muted mb-3">
                                    Operator diagnostic tool for checking PayPal REST environment switches, probing live OAuth handshake, and verifying fulfillment database records.
                                </p>
                                <div class="d-flex flex-wrap gap-2 mb-3">
                                    <button type="button" class="btn btn-sm btn-outline-primary" id="btn-page-audit">
                                        <em class="icon ni ni-file-text"></em> Run PayPal Config &amp; Table Audit
                                    </button>
                                    <button type="button" class="btn btn-sm btn-outline-info" id="btn-page-probe">
                                        <em class="icon ni ni-activity-round"></em> Probe PayPal REST OAuth Handshake
                                    </button>
                                </div>
                                <div id="page-smoke-results" class="small p-3 bg-white rounded border d-none" style="max-height: 280px; overflow-y: auto; font-family: monospace;"></div>
                            </div>
                        </div>
                    </div>
                </div>

                <script<?= script_nonce_attr() ?>>
                document.addEventListener('DOMContentLoaded', function () {
                    var out = document.getElementById('page-smoke-results');
                    var btnAudit = document.getElementById('btn-page-audit');
                    var btnProbe = document.getElementById('btn-page-probe');

                    function log(title, data, isError) {
                        if (!out) return;
                        out.classList.remove('d-none');
                        var time = new Date().toLocaleTimeString();
                        var color = isError ? 'text-danger' : 'text-success';
                        var html = '<div class="border-bottom pb-2 mb-2">'
                            + '<div class="fw-bold ' + color + '">[' + time + '] ' + title + '</div>'
                            + '<pre class="mb-0 text-dark" style="white-space: pre-wrap; word-break: break-all;">'
                            + JSON.stringify(data, null, 2)
                            + '</pre></div>';
                        out.innerHTML = html + out.innerHTML;
                    }

                    if (btnAudit) {
                        btnAudit.addEventListener('click', function () {
                            btnAudit.disabled = true;
                            btnAudit.innerHTML = '<span class="spinner-border spinner-border-sm"></span> Auditing...';
                            var form = new FormData();
                            form.append(<?= json_encode(csrf_token()) ?>, <?= json_encode(csrf_hash()) ?>);

                            fetch(<?= json_encode(site_url('API/Admin/PayPalSmokeTest/audit')) ?>, {
                                method: 'POST', body: form, credentials: 'same-origin', headers: { 'X-Requested-With': 'XMLHttpRequest' }
                            }).then(function (res) {
                                return res.json().then(function (data) {
                                    log('Audit Configuration Report', data, !data.ok);
                                });
                            }).catch(function (err) {
                                log('Audit Request Failed', { error: err.message }, true);
                            }).finally(function () {
                                btnAudit.disabled = false;
                                btnAudit.innerHTML = '<em class="icon ni ni-file-text"></em> Run PayPal Config &amp; Table Audit';
                            });
                        });
                    }

                    if (btnProbe) {
                        btnProbe.addEventListener('click', function () {
                            btnProbe.disabled = true;
                            btnProbe.innerHTML = '<span class="spinner-border spinner-border-sm"></span> Probing PayPal...';
                            var form = new FormData();
                            form.append(<?= json_encode(csrf_token()) ?>, <?= json_encode(csrf_hash()) ?>);

                            fetch(<?= json_encode(site_url('API/Admin/PayPalSmokeTest/probe')) ?>, {
                                method: 'POST', body: form, credentials: 'same-origin', headers: { 'X-Requested-With': 'XMLHttpRequest' }
                            }).then(function (res) {
                                return res.json().then(function (data) {
                                    log('PayPal OAuth Handshake Probe (Status: ' + res.status + ')', data, !res.ok);
                                });
                            }).catch(function (err) {
                                log('Probe Request Failed', { error: err.message }, true);
                            }).finally(function () {
                                btnProbe.disabled = false;
                                btnProbe.innerHTML = '<em class="icon ni ni-activity-round"></em> Probe PayPal REST OAuth Handshake';
                            });
                        });
                    }
                });
                </script>
                <?php endif; ?>

            </div><!-- .nk-block -->
        </div>
    </div>
</div>
