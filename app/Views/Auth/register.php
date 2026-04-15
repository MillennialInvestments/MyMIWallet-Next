<?php
$req = service('request');
$uri = $uri ?? ($req ? $req->getUri() : null);
$this->config = config('Auth');
$config = $this->config;
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
    <div class="row bg-white rounded shadow-sm p-3 mt-5">
        <?php if ($registerFormat === 'Split-Form' && $resolvedIntroView !== null) : ?>
            <div class="col-sm-6 border-right pr-3">
                <?php echo $safeRenderView($resolvedIntroView, $subViewData); ?>
            </div>
            <div class="col-sm-6">
                <?php echo $safeRenderView('Auth/register_form', $subViewData); ?>
                <?php echo $safeRenderView('themes/public/resources/needSupport', $subViewData); ?>
            </div>
        <?php else: ?>
        <div class="col-sm-6 offset-sm-3">
            <?php echo $safeRenderView('Auth/register_form', $subViewData); ?>
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
