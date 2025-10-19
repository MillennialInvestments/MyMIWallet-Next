<?php 
// app/Views/themes/public/layouts/footer.php
$nonce = $nonce ?? ['style' => '', 'script' => ''];
// Prepare data for views
$viewFileData = [
    'siteSettings'          => $siteSettings,
    'uri'                   => $uri,
    'pageTitle'             => $pageTitle,
    // 'currentUser'           => $currentUser,
    'cuID'                  => $cuID ?? '',
    'theme'                 => $theme ?? 'public',
    'bodyClass'             => $bodyClass ?? '',
    'bodyData'              => $bodyData ?? [],
    'nonce'                 => $nonce,
    'csp'                   => $csp ?? [],
]; 
?>
<div class="intro-section intro-footer text-start mt-auto">
    <div class="container container-ld">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <ul class="intro-menu text-center">
                    <li><a href="https://brandfetch.com/mymiwallet.com" class="link-to"></a></li>
                </ul>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-12">
                <ul class="intro-menu text-center">
                    <li><a href="<?= site_url('/'); ?>#features" class="link-to">Features</a></li>
                    <li><a href="<?= site_url('Knowledgebase'); ?>" target="_blank">Doc</a></li>
                    <li><a href="<?= site_url('Privacy-Policy'); ?>" target="_blank">Privacy Policy</a></li>
                    <li><a href="<?= site_url('Terms-Of-Service'); ?>" target="_blank">Terms of Service</a></li>
                    <li><a href="<?= site_url('Support'); ?>" target="_blank">Need Help?</a></li>
                </ul>
            </div>
            <div class="col-md-12 mt-3">
                <div class="intro-copyright text-center">
                    <p>&copy; <?= date("Y"); ?>, MyMI Wallet. Operated By My Millennial Investments, LLC.<br>Developed &amp; Powered by <a href="https://timothyburks.com" target="_blank">Timothy Burks Incorporated</a></p>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
echo view('themes/public/layouts/js-links', $viewFileData);
echo view('themes/public/layouts/custom-js', $viewFileData);
?>
