<?php
log_message('info', 'themesMemory usage: ' . memory_get_usage(true));
$completedGoals                                     = is_array($completedGoals ?? null) ? $completedGoals : [];
$promotionalBanners                                 = is_array($promotionalBanners ?? null) ? $promotionalBanners : [];
$totalAccountBalance                                = (float)($totalAccountBalance ?? 0.0);
$totalAccountBalanceFMT                             = (string)($totalAccountBalanceFMT ?? number_format($totalAccountBalance, 2));
// app/Views/themes/dashboard/layouts/index.php
$subViewData['uri']                                 = isset($uri) ? $uri ?? $request->getUri() : ''; // Fallback if $uri is not set
$subViewData['siteSettings']                        = isset($siteSettings) ? $siteSettings : '';
$subViewData['pageTitle']                           = $pageTitle ?? "My Dashboard | MyMI Wallet | The Future of Finance";
$subViewData['cuID']                                = $cuID;
$subViewData['totalAccountBalance']                 = $totalAccountBalance;
$subViewData['totalAccountBalanceFMT']              = $totalAccountBalanceFMT;
$subViewData['promotionalBanners']                  = $promotionalBanners;
if ($siteSettings->solanaExchange === 1) {
    $subViewData['cuSolanaDW']                      = $cuSolanaDW; 
}
$completedGoals                                     = array_column($completedGoals, 'goal_id');
$nextGoal                                           = null;

// Find the next goal that hasn't been completed
foreach ($pendingGoals as $goals) { // Assuming $userDashboard['goals'] holds the goals
    if (!in_array($goals['id'], $completedGoals)) {
        $nextGoal                                   = $goals;
        break;
    }
}

if ($nextGoal) { 
    $subViewData['userNextGoal']                    = $nextGoal; 
} else {
    $subViewData['userNextGoal']['gold_reward']     = 0; 
}
// log_message('info', 'layouts/index - L8: siteSettings: ' . print_r($siteSettings, true));
// log_message('debug', 'SubView Data before including header.php: ' . print_r($subViewData, true));
// Assume $viewFileData is passed from the controller
echo view('themes/dashboard/layouts/header', $subViewData); 
?>
    <body class="nk-body npc-landing bg-white intro" data-base-url="<?= esc(rtrim(site_url('/'), '/') . '/', 'attr') ?>">
        <?php //echo view('themes/dashboard/layouts/data_distribution', $subViewData); ?>
        <div class="nk-app-root">
            <div class="nk-main">
                <?php echo view('themes/dashboard/layouts/sidebar', $subViewData); ?>
                <div class="nk-wrap db-nk-wrap px-3 px-md-1 pl-xxl-3">
                    <?php echo view('themes/dashboard/layouts/_sitenav', $subViewData); ?>
                    <div class="nk-content content-wrapper pt-3 pt-xxl-5 ml-xxl-3 px-xxl-3 pl-xxl-3">
                        <div class="mb-3 pl-md-5 ml-xl-5 pl-xl-3">
                            <?= view('Auth/_message_block') ?>
                            <div class="row justify-content-center pt-md-0 pt-md-0 pl-md-5 pr-md-3 px-xxl-0 pb-md-3">
                                <div class="col-12 pl-md-2 pl-xxl-3 pr-xl-0 pr-md-0 pt-5 pt-md-3 pt-xxl-0">
                                    <?php
                                    // // Display messages and content
                                    // echo session()->getFlashdata('message');
                                    echo isset($content) ? $content : ''; // Ensure $content is passed from the controller
                                    // $this->renderSection('content');
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                    // Assume $viewFileData is passed from the controller
                    echo view('themes/dashboard/layouts/footer', $subViewData); 
                    //echo view('Dashboard/index/transaction-modal', $subViewData);
                    ?>
                </div>
            </div>
        </div>
    </body>
</html>