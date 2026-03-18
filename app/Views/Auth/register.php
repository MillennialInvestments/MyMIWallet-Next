<?php 
$req = service('request');
$uri = $uri ?? ($req ? $req->getUri() : null);
$this->config = config('Auth');
$config = $this->config;
$currentURL = current_url();
$referralLink = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : $currentURL;
$registrationAttribution = is_array($registrationAttribution ?? null) ? $registrationAttribution : [];
$referralPlatform = (string) ($registrationAttribution['view_slug'] ?? 'Free');
$hasCustomRegistrationView = (bool) ($registrationAttribution['view_exists'] ?? false);
$registerFormat = $hasCustomRegistrationView && ! in_array($referralPlatform, ['Free', 'MyMI'], true) ? 'Split-Form' : 'Single-Form';
$subViewData = [
    'uri' => $uri,
    'siteSettings' => $siteSettings,
    'socialMedia' => $socialMedia,
    'referralPlatform' => $referralPlatform,
    'referralLink' => $referralLink,
    'referralCode' => $referralCode,
    'registrationAttribution' => $registrationAttribution,
];
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
        <?php if ($registerFormat === 'Split-Form') : ?>
            <div class="col-sm-6 border-right pr-3">
                <?php echo view('Auth/register/' . $referralPlatform, $subViewData); ?>
            </div>
            <div class="col-sm-6">
                <?php echo view('Auth/register_form', $subViewData); ?>
                <?php echo view('themes/public/resources/needSupport', $subViewData); ?>
            </div>
        <?php else: ?>
        <div class="col-sm-6 offset-sm-3">

            <?php echo view('Auth/register_form', $subViewData); ?>

        </div>
        <?php endif; ?>
    </div>
    <?php 
    if (($registrationAttribution['view_slug'] ?? null) === 'Apex') {
        echo view('Auth/register/resources/apexHowItWorks');
    } else {
        echo '<hr>';
    }
    ?>
    <?php echo view('themes/public/resources/stayConnected', $subViewData); ?>    
</div>

<?= $this->endSection() ?>
