<?php
// Management Configurations
$managementActionItems              = $siteSettings->managementActionItems; 
$today                              = $siteSettings->today; 
$month                              = $siteSettings->month; 
$day                                = $siteSettings->day;
$year                               = $siteSettings->year; 
$last_month                         = strtotime($month . ' - 1 month');
$pageURIB                           = $uri->getSegment(2);
$department                         = $pageURIB;
?>
<div class="nk-block">
    <div class="row gy-gs">
        <div class="col-lg-12 col-xl-12">
            <div class="nk-block">
                <div class="nk-block-head-xs">
                    <div class="nk-block-head-content">
                        <h1 class="nk-block-title title">MyMI Management - <?php echo $pageURIB; ?></h1>
                        <p id="private_key"></p>
                        <p id="address"></p>
                        <a href="<?php echo site_url('/Management'); ?>">Back to Management Dashboard</a>
                    </div>
                </div>
            </div>
            <div class="nk-block">
                <div class="row">
                    <!-- Action Center -->
                    <div class="col-12 col-xxl-4">
                        <?php echo view('Marketing/Exchanges/includes/action_center', $viewFileData); ?>
                        <?php //echo view('Marketing/index/action_center', $viewFileData); ?>
                    </div>
                    <!-- Month-to-Month Overview -->
                    <div class="col-12 col-xxl-8">
                        <?php echo view('Marketing/Exchanges/includes/facebook', $viewFileData); ?>
                    </div>
                </div>
            </div>
            <div class="nk-block">
                <div class="row">
                    <!-- Month-to-Month Overview -->
                    <!-- <div class="col-12 col-xxl-4">
                        <?php //echo view('Marketing/index/exchange_action_center', $viewFileData); ?>
                        <?php // echo view('Marketing/resources/standaloneAnalytics', $viewFileData); ?>
                    </div> -->
                    <!-- Month-to-Month Overview -->
                    <!-- <div class="col-lg-4">
                        <?php //echo view('Marketing/index/monthly_overview', $viewFileData); ?>
                    </div> -->
                </div>
            </div>
            <div class="nk-block">
                <div class="row">
                    <!-- Month-to-Month Overview -->
                    <div class="col-lg-12">
                        <?php // echo view('Marketing/resources/standaloneCalendar', $viewFileData); ?>
                    </div>
                    <!-- Month-to-Month Overview -->
                    <!-- <div class="col-lg-4">
                        <?php //echo view('Marketing/index/monthly_overview', $viewFileData); ?>
                    </div> -->
                </div>
            </div>
            <div class="nk-block">
                <div class="row">
                    <!-- Analytics & KPIs -->
                    <div class="col-12 col-md-6">
                        <?php //echo view('Marketing/index/analytics_kpis', $viewFileData); ?>
                    </div>
                    <div class="col-12 col-lg-6">
                        <?php //echo view('Marketing/User/MyMIGold-Tasks', $viewFileData); ?>
                    </div>
                </div>
            </div>
            <div class="nk-block">
                <div class="row">
                    <!-- Campaigns Management -->
                    <div class="col-12 col-lg-6">
                        <?php //echo view('Marketing/Campaigns/Listing-Table', $viewFileData); ?>
                    </div>
                    <!-- Blog and User Tasks -->
                    <div class="col-12 col-lg-6">
                        <?php //echo view('Marketing/Blog/Listing-Table', $viewFileData); ?>
                    </div>
                </div>
            </div>
            <div class="nk-block">
                <div class="row">
                    <!-- SEO Tasks -->
                    <div class="col-12">
                        <?php //echo view('Marketing/SEO/Listing-Table', $viewFileData); ?>
                    </div>
                </div>
            </div>
            <div class="nk-block">
                <div class="row">
                    <!-- News and Updates -->
                    <div class="col-12">
                        <?php //echo view('Marketing/News/Listing-Table', $viewFileData); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
