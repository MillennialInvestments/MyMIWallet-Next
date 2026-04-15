<?php
$req = service('request');
$uri = $uri ?? ($req ? $req->getUri() : null);
$this->config = config('Auth');
$config = $this->config;
$currentURL = current_url();
$referralLink = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : $currentURL;
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
?>
<?= $this->extend($config->viewLayout) ?>
<?= $this->section('main') ?>

<?php if (session()->has('auth_message')) : ?>
    <?php $msg = session('auth_message'); ?>
    <div class="alert alert-<?= esc($msg['type']) ?>">
        <?= esc($msg['text']) ?>
    </div>
<?php endif; ?>

<div class="mt-5">
    <div class="row bg-white rounded shadow-sm p-3 mt-5">
        <?php if ($registerFormat === 'Split-Form' && ! empty($registrationSourceContent['intro_view'])) : ?>
            <div class="col-sm-6 border-right pr-3">
                <?php echo $safeRenderView($registrationSourceContent['intro_view'], $subViewData); ?>
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
