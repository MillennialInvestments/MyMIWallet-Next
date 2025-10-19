<?php 
$this->config               = config('Auth');
$config                     = $this->config;
$currentURL                 = current_url(); // Capture the current URL
$referralLink               = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : $currentURL; 
if ($uri->getTotalSegments() >= 2) {
    if ($uri->getSegment(2) === 'register') {
        $registerFormat     = 'Split-Form'; 
        $referralPlatform   = $uri->getSegment(1); 
    } else { 
        $registerFormat     = 'Single-Form';
        $referralPlatform   = 'MyMI';
    }
} else {
    $registerFormat         = 'Single-Form';
    $referralPlatform       = 'MyMI';
}
$subViewData                = [
    'uri'                   => $uri,
    'siteSettings'          => $siteSettings,
    'socialMedia'           => $socialMedia,
    'referralPlatform'      => $referralPlatform,
    'referralLink'          => $referralLink,
    'referralCode'          => $referralCode,
];
?>
<?= $this->extend($config->viewLayout) ?>
<?= $this->section('main') ?>

<div class="container">
    <div class="row">
        <?php if ($registerFormat === 'Split-Form') : ?>
            <div class="col-sm-6">
                <?php echo view('App\Views\Auth\register\\' . $referralPlatform, $subViewData); ?>
            </div>
            <div class="col-sm-6">
                <?php echo view('App/Views/Auth\register_form', $subViewData); ?>
                <?php echo view('themes/public/resources/needSupport', $subViewData); ?>
            </div>
        <?php else: ?>
        <div class="col-sm-6 offset-sm-3">

            <?php echo view('App/Views/Auth\register_form', $subViewData); ?>

        </div>
        <?php endif; ?>
    </div>
    <?php 
    if ($uri->getSegment(1) === 'Apex') {
        echo view('Auth/register/resources/apexHowItWorks');
    } else {
        echo '<hr>';
    }
    ?>
    <?php echo view('themes/public/resources/stayConnected', $subViewData); ?>    
</div>

<?= $this->endSection() ?>
