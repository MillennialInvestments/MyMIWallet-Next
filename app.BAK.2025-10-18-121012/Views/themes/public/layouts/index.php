<?php
// app/Views/themes/public/layouts/index.php
log_message('info', 'themesMemory usage: ' . memory_get_usage(true));
use Config\Services;
$auth = service('authentication');
$session = service('session');
$request = service('request');
// // log_message('info', 'public\layouts\index L2: $pageTitle: ' . $pageTitle
// $subViewData                = [
//     'siteSettings'          => $siteSettings,
//     'request'               => $request,
//     'session'               => $session,
//     'userAgent'             => $userAgent,
//     'uri'                   => $uri,
//     'pageTitle'             => $pageTitle ?? 'MyMI Wallet | The Future of Finance | Budgeting | Investments',
// ];
$subViewData['siteSettings']        = $siteSettings;
$subViewData['request']             = $request;
$subViewData['session']             = $session;
$subViewData['siteSettings']        = $siteSettings;
$subViewData['uri']                 = $uri;
$subViewData['userAgent']           = $userAgent;

// log_message('debug', 'SubView Data before including header.php: ' . print_r($subViewData, true));
// Assume $viewFileData is passed from the controller
echo view('themes/public/layouts/header', $subViewData); 
?>
    <body class="nk-body npc-landing bg-white intro" data-base-url="<?= esc(rtrim(site_url('/'), '/') . '/', 'attr') ?>">
        <?php //echo view('themes/public/layouts/data_distribution', $subViewData); ?>
        <div class="nk-app-root">
            <div class="nk-main">
                <div class="nk-wrap ml-0">
                    <?php echo view('themes/public/layouts/_sitenav', $subViewData); ?>
                    <div class="nk-content content-wrapper mt-0 p-0">
                        <div class="pt-5 pt-lg-5 mb-3">
                            <div class="row justify-content-center pt-4 pt-xl-3">
                                <div class="col-12 pr-md-0 pt-4 pt-xl-0">
                                    <?php
                                    // // Display messages and content
                                    //echo session()->getFlashdata('message');
                                    echo isset($content) ? $content : ''; // Ensure $content is passed from the controller
                                    // $this->renderSection('content');
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                    // Assume $viewFileData is passed from the controller
                    echo view('themes/public/layouts/footer', $subViewData); ?>
                </div>
            </div>
        </div>
    </body>
</html>