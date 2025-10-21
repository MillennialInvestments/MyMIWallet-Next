<!-- app/Modules/Management/Views/Alerts/batchEmailAudit.php -->
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
// print_r($_SESSION['allSessionData']); 
// echo '<br><br>'; 
if ($siteSettings->debug === 1) {
// log_message('debug', print_r($reporting, true)); 
}
// print_r($reporting, true); 
// // Get Approved Reports
// $getApprovedAssets                  = $reporting['getApprovedAssets']; 
// $totalApprovedAssets                = $reporting['totalApprovedAssets']; 
// $getPendingSupport                  = $reporting['getPendingSupport'];
$totalPendingSupport                = $reporting['totalPendingSupport']; 
// $totalPendingUsers                  = $reporting['totalPendingUsers'];
// $totalPendingPartners               = $reporting['totalPendingPartners'];
// // Get Pending Reports 
// $getPendingAssets                   = $reporting['getPendingAssets']; 
// $totalPendingAssets                 = $reporting['totalPendingAssets']; 
// $getCompleteSupport                 = $reporting['getCompleteSupport'];
$totalCompleteSupport               = $reporting['totalCompleteSupport'];
// // Get Percentage Reports
// $assetPercentage                    = $reporting['assetPercentage'];
// $transactionPercentage              = $reporting['transactionPercentage'];
// $tradesPercentage                   = $reporting['tradesPercentage'];
// $partnerPercentage                  = $reporting['partnerPercentage'];
// $usersPercentage                    = $reporting['usersPercentage'];
// $walletsPercentage                  = $reporting['walletsPercentage'];
// $transAmountPercentage              = $reporting['transAmountPercentage'];
// $transFeesPercentage                = $reporting['transFeesPercentage'];
// Get Targets
// $targetAssets                       = $reporting['targetAssets'];
// $targetTransactions                 = $reporting['targetTransactions'];
// $targetTransAmount                  = $reporting['targetTransAmount'];
// $targetTransFees                    = $reporting['targetTransFees'];
// $targetTrades                       = $reporting['targetTrades'];
// $targetWallets                      = $reporting['targetWallets'];
// $targetUsers                        = $reporting['targetUsers'];
// $targetPartners                     = $reporting['targetPartners'];
// // Get Totals Reports
// $getTotalTrans                      = $reporting['getTotalTrans'];
// $totalTransactions                  = $reporting['totalTransactions'];
// $getTotalAmounts                    = $reporting['getTotalAmounts'];
// $totalTransFees                     = $reporting['totalTransFees'];
// $totalTransFeesPlain                = $reporting['totalTransFeesPlain'];
// $totalTransTotalsPlain              = $reporting['totalTransTotalsPlain'];
// $totalTransTotals                   = $reporting['totalTransTotals'];
// $getLastTotalAmounts                = $reporting['getLastTotalAmounts'];
// $totalLastTransFees                 = $reporting['totalLastTransFees'];
// $totalLastTransTotals               = $reporting['totalLastTransTotals'];
// $totalTradesTracked                 = $reporting['totalTradesTracked'];
// $totalWalletsCreated                = $reporting['totalWalletsCreated']; 
// $totalActiveUsers                   = $reporting['totalActiveUsers'];
// $totalActivePartners                = $reporting['totalActivePartners'];

$pendingTradeAlerts                 = $alertsInfo['pendingTradeAlerts'];
// log_message('debug', 'Management/Alerts/index - L65: ' . print_r($pendingTradeAlerts, true));
$pendingTradeAlertsCount            = $alertsInfo['pendingTradeAlertsCount']; // Placeholder count for pending alerts
$resolvedAlertsCount = 3; // Placeholder count for resolved alerts
$totalAlertsCount = $pendingTradeAlertsCount + $resolvedAlertsCount;
$timeToResolve = "3 hrs 30 mins"; // Example of average resolution time
$alertTrends = [10, 20, 15, 5, 25, 30, 20]; // Placeholder data for alert trends
$alertsBySource = ['User' => 15, 'System' => 20]; // Example data for alert sources
// Detect Device Type
$userAgent = service('request')->getUserAgent();
$isMobile = $userAgent->isMobile(); // Detect if the user is on mobile
// Get User Activity
// $userActivity                       = $reporting['userActivity'];
$subViewData                        = [
    'cuID'                          => $cuID,
    'advisorUserId'                 => $cuID,
    'totalPendingSupport'           => $totalPendingSupport,
    'totalCompleteSupport'          => $totalCompleteSupport,
    'pendingTradeAlertsCount'       => $pendingTradeAlertsCount,
    'resolvedAlertsCount'           => $resolvedAlertsCount,
    'advisorMedia'                  => $advisorMedia,
    'advisorPick'                   => $advisorPick,
    'advisorSummary'                => $advisorSummary,
    'advisorScript'                 => $advisorScript,
    'advisorAudio'                  => $advisorAudio,
    'advisorCapcutUrl'              => $advisorCapcutUrl,
    'advisorZipUrl'                 => $advisorZipUrl,
]; 
?>
<div class="nk-block d-none d-md-block">
    <div class="row">
        <!-- Action Center Card -->
        <div class="col-lg-4">
            <?= view('Alerts/resources/action-center', $subViewData) ?>
        </div><!-- .col -->

        <!-- Alert Analytics Card -->
        <div class="col-lg-8">
            <?= view('Alerts/resources/market-data', $subViewData) ?>
        </div>
    </div><!-- .row -->
</div><!-- .nk-block -->
<div class="nk-block">
  <div class="card card-bordered">
    <div class="card-inner">
      <div class="project">
        <div class="project-head">
          <div class="project-title">
            <h5 class="title">🕵️ Audit of Last <?= count($emails); ?> Scraped Emails</h5>
          </div>
        </div>
        <div class="project-details">
          <div class="table-responsive">
            <table class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>Email ID</th>
                  <th>Subject</th>
                  <th>Received</th>
                  <th>Status</th>
                  <th>Extracted Tickers</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($emails as $email): ?>
                  <tr>
                    <td><?= esc($email['email_identifier'] ?? 'N/A'); ?></td>
                    <td><?= esc($email['decoded_subject']) ?></td>
                    <td><?= esc($email['email_date'] ?? ''); ?></td>
                    <td><?= esc($email['status'] ?? ''); ?></td>
                    <td><?= esc($email['extracted_tickers']) ?></td>

                  </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
