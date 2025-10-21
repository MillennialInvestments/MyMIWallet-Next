<?php
// Management Configurations
$managementActionItems   = $siteSettings->managementActionItems;
$today                   = $siteSettings->today;
$month                   = $siteSettings->month;
$day                     = $siteSettings->day;
$year                    = $siteSettings->year;
$last_month              = strtotime($month . ' - 1 month');

// Dashboard Routing
$department              = $uri->getSegment(2);

// View Data Setup
$topKeywords             = $reporting['topKeywords'] ?? [];
$totalKeywordsTracked    = $reporting['totalKeywordsTracked'] ?? 0;

$viewFileData = array(
    'topKeywords'         => $topKeywords,
    'totalKeywordsTracked'=> $totalKeywordsTracked,
);
?>

<div class="nk-block">
    <div class="row gy-gs">
        <div class="col-lg-12 col-xl-12">
            <div class="nk-block">
                <div class="nk-block-head-xs">
                    <div class="nk-block-head-content">
                        <h1 class="nk-block-title title">MyMI Management - <?= esc($department); ?> Keywords</h1>
                        <a href="<?= site_url('/Management/Marketing'); ?>">Back to Marketing Dashboard</a>
                    </div>
                </div>
            </div>

            <div class="nk-block">
                <div class="row mb-4">
                    <!-- Keyword Metrics Summary -->
                    <div class="col-md-4">
                        <div class="card card-bordered text-center">
                            <div class="card-inner">
                                <h6 class="title">Total Keywords Tracked</h6>
                                <h3 class="nk-block-title"><?= number_format($totalKeywordsTracked); ?></h3>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row mb-1">
                    <!-- Keywords Analytics Table -->
                    <div class="col-12">
                        <?= view('Marketing/Keywords/keyword_analytics_table', $viewFileData); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
