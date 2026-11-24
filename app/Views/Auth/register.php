<?php
$req = service('request');
$uri = $uri ?? ($req ? $req->getUri() : null);
$config = config(\App\Legacy\Auth\Config\Auth::class);
$referralLink = isset($_SERVER['HTTP_REFERER']) ? (string) $_SERVER['HTTP_REFERER'] : site_url('register');
$referralParts = parse_url($referralLink);
if (is_array($referralParts) && ! empty($referralParts['query'])) {
    $referralQuery = [];
    parse_str((string) $referralParts['query'], $referralQuery);
    foreach (array_keys($referralQuery) as $queryKey) {
        if (
            in_array($queryKey, ['_gl', '_ga', 'gclid', 'fbclid', 'utm_source', 'utm_medium', 'utm_campaign', 'utm_term', 'utm_content'], true)
            || str_starts_with((string) $queryKey, '_ga_')
        ) {
            unset($referralQuery[$queryKey]);
        }
    }

    $referralLink = (string) ($referralParts['path'] ?? $referralLink);
    if ($referralQuery !== []) {
        $referralLink .= '?' . http_build_query($referralQuery);
    }
}
$registrationAttribution = is_array($registrationAttribution ?? null) ? $registrationAttribution : [];
$registrationSourceContent = is_array($registrationSourceContent ?? null) ? $registrationSourceContent : [];
$referralPlatform = (string) ($registrationAttribution['view_slug'] ?? 'Free');
$registerFormat = (($registrationSourceContent['layout'] ?? 'single') === 'split') ? 'Split-Form' : 'Single-Form';
$subViewData = [
    'uri' => $uri,
    'siteSettings' => $siteSettings,
    'socialMedia' => $socialMedia,
    'referralPlatform' => $referralPlatform,
    'referralLink' => $referralLink,
    'referralCode' => $referralCode,
    'registrationAttribution' => $registrationAttribution,
    'registrationSourceContent' => $registrationSourceContent,
];

$safeRenderView = static function ($candidate, array $candidateData = [], ?string $fallback = null): string {
    if (is_string($candidate) && trim($candidate) !== '') {
        return view(trim($candidate), $candidateData);
    }

    if (is_string($fallback) && trim($fallback) !== '') {
        return view(trim($fallback), $candidateData);
    }

    log_message('warning', 'Auth register render skipped null/empty partial view', [
        'candidate_type' => gettype($candidate),
        'fallback' => $fallback,
    ]);

    return '';
};

$resolvedIntroView = null;
if (isset($introView) && is_string($introView) && trim($introView) !== '') {
    $resolvedIntroView = trim($introView, "/\\ \t\n\r\0\x0B");
} elseif (
    isset($registrationSourceContent)
    && is_array($registrationSourceContent)
    && isset($registrationSourceContent['intro_view'])
    && is_string($registrationSourceContent['intro_view'])
    && trim($registrationSourceContent['intro_view']) !== ''
) {
    $resolvedIntroView = trim($registrationSourceContent['intro_view'], "/\\ \t\n\r\0\x0B");
}
log_message('debug', '[AUTH_REGISTER_VIEW] intro partial', ['resolvedIntroView' => $resolvedIntroView]);
?>
<?= $this->extend($config->viewLayout) ?>
<?= $this->section('main') ?>

<div class="mt-5">
    <?= view('App\Views\Auth\_message_block') ?>
    <?php $forcedAlert = session('forced_alert'); ?>
    <?php if (is_array($forcedAlert)) : ?>
        <div class="alert alert-<?= esc($forcedAlert['type'] ?? 'danger') ?> mb-3" role="alert">
            <h5 class="mb-1"><?= esc($forcedAlert['title'] ?? 'There was a problem') ?></h5>
            <p class="mb-2"><?= esc($forcedAlert['message'] ?? 'An unexpected issue occurred.') ?></p>

            <?php if (! empty($forcedAlert['error_code'])) : ?>
                <div class="small mb-2">
                    <strong>Error Code:</strong> <?= esc($forcedAlert['error_code']) ?>
                    <?php if (! empty($forcedAlert['request_id'])) : ?>
                        | <strong>Request ID:</strong> <?= esc($forcedAlert['request_id']) ?>
                    <?php endif; ?>
                </div>
            <?php endif; ?>

            <a
                href="<?= esc($forcedAlert['support_url'] ?? site_url('Support')) ?>"
                target="_blank"
                rel="noopener"
                class="btn btn-outline-dark btn-sm"
            >
                Open Support Ticket
            </a>

            <?php if (ENVIRONMENT !== 'production' && ! empty($forcedAlert['debug_message'])) : ?>
                <div class="mt-2 small text-break">
                    <strong>PHP:</strong> <?= esc($forcedAlert['debug_message']) ?>
                </div>
            <?php endif; ?>
        </div>
    <?php endif; ?>
    <div class="row bg-white rounded shadow-sm p-3 mt-5 g-4 align-items-start">
        <?php if ($registerFormat === 'Split-Form' && $resolvedIntroView !== null) : ?>
            <div class="col-sm-6 border-right pr-3">
                <?php echo $safeRenderView($resolvedIntroView, $subViewData); ?>
            </div>
            <div class="col-sm-6">
                <?php echo $safeRenderView('Auth/register_form', $subViewData); ?>
                <?php echo $safeRenderView('themes/public/resources/needSupport', $subViewData); ?>
            </div>
        <?php else: ?>
        <div class="col-lg-5 col-xl-5 mb-4 mb-lg-0">
            <?php echo $safeRenderView('Auth/register_form', $subViewData); ?>
        </div>
        <div class="col-lg-7 col-xl-7">
            <!-- What Getting a Membership Provides -->
            <div class="card border-0 shadow-sm rounded-4 p-4 p-md-5 h-100" style="background: linear-gradient(135deg, #061540 0%, #0d2157 60%, #08163b 100%); color: #ffffff;">
                <div class="d-inline-flex align-items-center gap-2 px-3 py-1 rounded-pill mb-3" style="background: rgba(56, 207, 194, 0.15); border: 1px solid rgba(56, 207, 194, 0.35); width: fit-content;">
                    <em class="icon ni ni-spark" style="color: #38cfc2;"></em>
                    <span class="small fw-bold text-uppercase" style="color: #38cfc2; letter-spacing: 0.08em; font-size: 0.75rem;">Membership Unlocks</span>
                </div>

                <h2 class="h3 fw-bold text-white mb-2">Start Free. Scale With a Membership When You're Ready.</h2>
                <p class="text-white-50 small mb-4">
                    Every free account gives you full access to personal budgeting, income/expense tracking, and manual portfolio logs. Here is what upgrading to a <strong>MyMI Membership</strong> (or using <strong>MyMI Gold</strong>) unlocks along your wealth journey:
                </p>

                <div class="row g-3">
                    <div class="col-md-6">
                        <div class="p-3 rounded-3 h-100" style="background: rgba(255, 255, 255, 0.06); border: 1px solid rgba(255, 255, 255, 0.1);">
                            <div class="d-flex align-items-center gap-2 mb-2">
                                <span class="badge" style="background: #366bfa; color: #ffffff;"><em class="icon ni ni-activity"></em> Live Sync</span>
                            </div>
                            <h5 class="h6 text-white fw-bold mb-1">Automated Portfolio Sync</h5>
                            <p class="small text-white-50 mb-0">Aggregate equities, ETFs, crypto, and bank balances without tedious manual data entry.</p>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="p-3 rounded-3 h-100" style="background: rgba(255, 255, 255, 0.06); border: 1px solid rgba(255, 255, 255, 0.1);">
                            <div class="d-flex align-items-center gap-2 mb-2">
                                <span class="badge" style="background: #38cfc2; color: #061540;"><em class="icon ni ni-bulb"></em> Advisor</span>
                            </div>
                            <h5 class="h6 text-white fw-bold mb-1">AI-Assisted Insights</h5>
                            <p class="small text-white-50 mb-0">Receive automated audits on asset allocation drift, cash flow leaks, and rebalance opportunities.</p>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="p-3 rounded-3 h-100" style="background: rgba(255, 255, 255, 0.06); border: 1px solid rgba(255, 255, 255, 0.1);">
                            <div class="d-flex align-items-center gap-2 mb-2">
                                <span class="badge" style="background: #20c997; color: #ffffff;"><em class="icon ni ni-swap"></em> Web3</span>
                            </div>
                            <h5 class="h6 text-white fw-bold mb-1">Solana Swap &amp; Fee Reclaims</h5>
                            <p class="small text-white-50 mb-0">Execute decentralized asset swaps with lowest platform margins and atomic fee reclaims.</p>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="p-3 rounded-3 h-100" style="background: rgba(255, 255, 255, 0.06); border: 1px solid rgba(255, 255, 255, 0.1);">
                            <div class="d-flex align-items-center gap-2 mb-2">
                                <span class="badge" style="background: #f4bd0e; color: #1f2b3a;"><em class="icon ni ni-bell"></em> Real-Time</span>
                            </div>
                            <h5 class="h6 text-white fw-bold mb-1">Custom Volatility Alerts</h5>
                            <p class="small text-white-50 mb-0">Set multi-condition alerts for budget ceilings, market moves, earnings dates, and payment alarms.</p>
                        </div>
                    </div>
                </div>

                <div class="p-3 rounded-3 mt-4" style="background: rgba(56, 207, 194, 0.08); border-left: 4px solid #38cfc2;">
                    <div class="small text-white">
                        <strong><em class="icon ni ni-shield-check me-1"></em> 100% Risk-Free Commitment:</strong> Start with a free account today—no credit card required. You can upgrade, downgrade, or unlock tiers with MyMI Gold anytime from your dashboard.
                    </div>
                </div>

                <div class="mt-4 pt-3 border-top border-light border-opacity-10 d-flex justify-content-between align-items-center flex-wrap gap-2">
                    <span class="small text-white-50">Already have an account? <a href="<?= site_url('login') ?>" class="text-white text-decoration-underline fw-bold">Sign in here</a></span>
                    <a href="<?= site_url('How-It-Works') ?>" class="btn btn-sm btn-outline-light px-3">
                        <span>How MyMI Works</span> <em class="icon ni ni-arrow-right ms-1"></em>
                    </a>
                </div>
            </div>
        </div>
        <?php endif; ?>
    </div>

    <?php if (($registrationAttribution['view_slug'] ?? null) === 'Apex') : ?>
        <?= $safeRenderView('Auth/register/resources/apexHowItWorks') ?>
    <?php else : ?>
        <hr>
    <?php endif; ?>

    <?php
    // Placement comment: reusable source-driven promotional sections beneath registration.
    echo $safeRenderView('Auth/partials/registration_promo_sections', $subViewData);
    ?>

    <?php echo $safeRenderView('themes/public/resources/stayConnected', $subViewData); ?>
</div>

<?= $this->endSection() ?>
