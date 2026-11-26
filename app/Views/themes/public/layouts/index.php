<?php
// app/Views/themes/public/layouts/index.php
log_message('info', 'themesMemory usage: ' . memory_get_usage(true));

use Config\Services;

$auth = null;
$isLoggedIn = false;
$authUser = null;
$authUserId = null;

$session = service('session');
$request = service('request');

$subViewData['siteSettings'] = $siteSettings;
$subViewData['request'] = $request;
$subViewData['session'] = $session;
$subViewData['siteSettings'] = $siteSettings;
$subViewData['uri'] = $uri;
$subViewData['userAgent'] = $userAgent;

echo view('themes/public/layouts/header', $subViewData);
?>
    <body class="nk-body npc-landing bg-white intro" data-base-url="<?= esc(rtrim(site_url('/'), '/') . '/', 'attr') ?>">
        <a href="#main-content" class="skip-link">Skip to main content</a>
        <?php //echo view('themes/public/layouts/data_distribution', $subViewData); ?>
        <div class="nk-app-root">
            <div class="nk-main">
                <div class="nk-wrap ml-0">
                    <?php echo view('themes/public/layouts/_sitenav', $subViewData); ?>
                    <main id="main-content" class="nk-content content-wrapper mt-0 p-0" role="main">
                        <div class="pt-3 pt-lg-1 mb-3">
                            <div class="row justify-content-center">
                                <div class="col-12 pr-md-0 pt-xl-0">
                                    <?php
                                    // // Display messages and content
                                    //echo session()->getFlashdata('message');
                                    echo isset($content) ? $content : ''; // Ensure $content is passed from the controller
                                    // $this->renderSection('content');
                                    ?>
                                </div>
                            </div>
                        </div>
                    </main>
                    <?php
                    // Assume $viewFileData is passed from the controller
                    echo view('themes/public/layouts/footer', $subViewData); ?>
                </div>
            </div>
        </div>
    </body>
</html>