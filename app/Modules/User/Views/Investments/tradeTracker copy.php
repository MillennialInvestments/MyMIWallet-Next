<?php echo view('App/Views/errors/html/under_construction'); ?>
<!-- app/Modules/User/Views/Investments/tradeTracker.php -->
<?php
// echo '<script <?= $nonce['script'] ?? '' ?>>
//     console.log("userInvestment Array: " + ' . (print_r($userInvestments, true)) . '
// </script>'; 
// log_message('debug', 'Investments\index L2 - $investDashboard Array: ' . (print_r($investDashboard, true)));
// $account_activated = $userAssessment['account_activated'] == 1 ? 'Yes' : 'No';
// $account_informationStatus = $userAssessment['account_information'] == 'Yes' ? 'Completed' : 'Pending';
// $kyc_verifiedStatus = $userAssessment['kyc_verified'] == 'Yes' ? 'Completed' : 'Pending';
// $features_activatedStatus = $userAssessment['features_activated'] == 'Yes' ? 'Completed' : 'Pending';
// $financial_assessmentStatus = $userAssessment['financial_assessment'] == 'Yes' ? 'Completed' : 'Pending';
// $banking_accountsStatus = $userAssessment['banking_accounts'] == 'Yes' ? 'Completed' : 'Pending';
// $banking_walletsStatus = $userAssessment['banking_wallets'] == 'Yes' ? 'Completed' : 'Pending';
// $last_banking_updateStatus = $userAssessment['last_banking_update'] == 'Yes' ? 'Completed' : 'Pending';
// $banking_integrationStatus = $userAssessment['banking_integration'] == 'Yes' ? 'Completed' : 'Pending';
// $credit_summaryStatus = $userAssessment['credit_summary'] == 'Yes' ? 'Completed' : 'Pending';
// $credit_walletsStatus = $userAssessment['credit_wallets'] == 'Yes' ? 'Completed' : 'Pending';
// $last_credit_updateStatus = $userAssessment['last_credit_update'] == 'Yes' ? 'Completed' : 'Pending';
// $credit_integrationStatus = $userAssessment['credit_integration'] == 'Yes' ? 'Completed' : 'Pending';
// $debt_summaryStatus = $userAssessment['debt_summary'] == 'Yes' ? 'Completed' : 'Pending';
// $debt_walletsStatus = $userAssessment['debt_wallets'] == 'Yes' ? 'Completed' : 'Pending';
// $last_debt_updateStatus = $userAssessment['last_debt_update'] == 'Yes' ? 'Completed' : 'Pending';
// $debt_integrationStatus = $userAssessment['debt_integration'] == 'Yes' ? 'Completed' : 'Pending';
// $investment_assessmentStatus = $userAssessment['investment_assessment'] == 'Yes' ? 'Completed' : 'Pending';
// $investment_walletsStatus = $userAssessment['investment_wallets'] == 'Yes' ? 'Completed' : 'Pending';
// $last_investment_updateStatus = $userAssessment['last_investment_update'] == 'Yes' ? 'Completed' : 'Pending';
// $brokerage_integrationStatus = $userAssessment['brokerage_integration'] == 'Yes' ? 'Completed' : 'Pending';
// $risk_assessmentStatus = $userAssessment['risk_assessment'] == 'Yes' ? 'Completed' : 'Pending';
// $financial_goalsStatus = $userAssessment['financial_goals'] == 'Yes' ? 'Completed' : 'Pending';
// $time_horizonStatus = $userAssessment['time_horizon'] == 'Yes' ? 'Completed' : 'Pending';
// $financial_ratingStatus = $userAssessment['financial_rating'] == 'Yes' ? 'Completed' : 'Pending';
// $investment_experienceStatus = $userAssessment['investment_experience'] == 'Yes' ? 'Completed' : 'Pending';
// $investment_knowledgeStatus = $userAssessment['investment_knowledge'] == 'Yes' ? 'Completed' : 'Pending';
// $market_sentimentStatus = $userAssessment['market_sentiment'] == 'Yes' ? 'Completed' : 'Pending';
// $investment_availabilityStatus = $userAssessment['investment_availability'] == 'Yes' ? 'Completed' : 'Pending';
// // log_message('debug', 'Investments\index L31 - $userInvestments Array: ' . (print_r($userInvestments, true)));
$investmentOverview = $userInvestments['investmentOverview'] ?? []; 
// log_message('debug', 'Investments\index L33 - $investmentOverview Array: ' . (print_r($investmentOverview, true)));
$subViewData = [
    'beta' => $beta,
    'assetOperations' => $siteSettings->assetOperations ?? 0,
    'investmentOperations' => $siteSettings->investmentOperations ?? 0,
    'cuID' => $cuID,
    'cuEmail' => $cuEmail,
    'cuUsername' => $cuUsername,
    // 'userAssessment' => $userAssessment,
    // 'account_informationStatus' => $account_informationStatus,
    // 'kyc_verifiedStatus' => $kyc_verifiedStatus,
    // 'features_activatedStatus' => $features_activatedStatus,
    // 'financial_assessmentStatus' => $financial_assessmentStatus,
    // 'banking_accountsStatus' => $banking_accountsStatus,
    // 'banking_walletsStatus' => $banking_walletsStatus,
    // 'last_banking_updateStatus' => $last_banking_updateStatus,
    // 'banking_integrationStatus' => $banking_integrationStatus,
    // 'credit_summaryStatus' => $credit_summaryStatus,
    // 'credit_walletsStatus' => $credit_walletsStatus,
    // 'last_credit_updateStatus' => $last_credit_updateStatus,
    // 'credit_integrationStatus' => $credit_integrationStatus,
    // 'debt_summaryStatus' => $debt_summaryStatus,
    // 'debt_walletsStatus' => $debt_walletsStatus,
    // 'last_debt_updateStatus' => $last_debt_updateStatus,
    // 'debt_integrationStatus' => $debt_integrationStatus,
    // 'investment_assessmentStatus' => $investment_assessmentStatus,
    // 'investment_walletsStatus' => $investment_walletsStatus,
    // 'last_investment_updateStatus' => $last_investment_updateStatus,
    // 'brokerage_integrationStatus' => $brokerage_integrationStatus,
    // 'risk_assessmentStatus' => $risk_assessmentStatus,
    // 'financial_goalsStatus' => $financial_goalsStatus,
    // 'time_horizonStatus' => $time_horizonStatus,
    // 'financial_ratingStatus' => $financial_ratingStatus,
    // 'investment_experienceStatus' => $investment_experienceStatus,
    // 'investment_knowledgeStatus' => $investment_knowledgeStatus,
    // 'market_sentimentStatus' => $market_sentimentStatus,
    // 'investment_availabilityStatus' => $investment_availabilityStatus,
    'investDashboard' => $investDashboard,
    'investmentOverview' => $userInvestments['investmentOverview'] ?? [],
    'userInvestmentRecords' => $userInvestments['userInvestmentRecords'] ?? [],
    'activeInvestments' => $userInvestments['activeInvestments'] ?? [],
    'totalUserInvestments' => $userInvestments['totalUserInvestments'] ?? [],
    'totalTradeValue' => $userInvestments['totalTradeValue'] ?? [],
    'totalTradeValueSum' => $userInvestments['totalTradeValueSum'] ?? [],
    'totalAssetValueSum' => $userInvestments['totalAssetValueSum'] ?? [],
    'totalLastTradeValueSum' => $userInvestments['totalLastTradeValueSum'] ?? [],
    'totalAnnualTradeValueSum' => $userInvestments['totalAnnualTradeValueSum'] ?? [],
    'totalAnnualTradePerformance' => $userInvestments['totalAnnualTradePerformance'] ?? [],
    'thisMonthTradePerformance' => $userInvestments['thisMonthTradePerformance'] ?? [],
    'lastMonthTradePerformance' => $userInvestments['lastMonthTradePerformance'] ?? [],
    'totalTradeCount' => $userInvestments['totalTradeCount'] ?? [],
    'totalActiveTradeCount' => $userInvestments['totalActiveTradeCount'] ?? [],
    'totalUserAssetsValue' => $userInvestments['totalUserAssetsValue'] ?? [],
    'totalUserAssetsCount' => $userInvestments['totalUserAssetsCount'] ?? [],
    'totalUserAssetPerformance' => $userInvestments['totalUserAssetPerformance'] ?? [],
    'totalMonthlyTradesCount' => $userInvestments['totalMonthlyTradesCount'] ?? [],
    'totalAssetCount' => $userInvestments['totalAssetCount'] ?? [],
    'totalGrowth' => $userInvestments['totalGrowth'] ?? [],
    'topPerformers' => $userInvestments['investmentOverview']['topInvestmentPerformers'] ?? [],
    'topLosers' => $userInvestments['investmentOverview']['topInvestmentLosers'] ?? [],
    'userCurrentAnnualValue' => $userInvestments['userCurrentAnnualValue'] ?? [],
    'userCurrentAnnualPerformance' => $userInvestments['userCurrentAnnualPerformance'] ?? [],
    'userCurrentAnnualTarget' => $userInvestments['userCurrentAnnualTarget'] ?? [],
    'userTopGainers' => $userInvestments['userTopGainers'] ?? [],
    'userTopGainer' => $userInvestments['userTopGainer'] ?? [],
    'userTopLosers' => $userInvestments['userTopLosers'] ?? [],
    'userTopLoser' => $userInvestments['userTopLoser'] ?? [],
    'userWatchlist' => $userInvestments['userWatchlist'] ?? [],
    'economicData' => $investDashboard['economicData'] ?? [],
];
?>

<style <?= $nonce['style'] ?? '' ?>>
@media only screen and (max-width: 768px) {
    #userBudgetingDatatable_filter {
        padding-top: 1rem;
        text-align: left;
    }
}
.nk-order-ovwg-data.income {
    border-color: #8ff0d6;
}
.nk-order-ovwg-data.expenses {
    border-color: #e85347;
}
.nk-order-ovwg-data.surplus {
    border-color: #84b8ff;
}
.nk-order-ovwg-data.investments {
    border-color: #f4bd0e;
}
.nk-order-ovwg-data .amount {
    font-size: 1.25rem;
    font-weight: 700;
}
</style>
<!-- <div id="investment-dashboard">
    <div id="action-center">Loading Action Center...</div>
    <div id="month-to-month">Loading Month-to-Month Performance...</div>
    <div id="investment-tools">Loading Investment Tools...</div>
    <div id="investment-insights">Loading Insights...</div>
</div> -->

<!-- Original Trade Tracker Controls -->
<div class="container">
    <div class="tt-new-trade">
        <button class="tt-spawn">New Trade +</button>
        <ul class="tt-type-selector">
            <li data-category="equity" data-type="long">Equity: Long</li>
            <li data-category="equity" data-type="short">Equity: Short</li>
            <li data-category="option_buy" data-type="call">Buy Option: Call</li>
            <li data-category="option_buy" data-type="put">Buy Option: Put</li>
            <li data-category="option_sell" data-type="call">Sell Option: Call</li>
            <li data-category="option_sell" data-type="put">Sell Option: Put</li>
        </ul>
    </div>

    <div class="handsontable-container" id="trade-tracker-table"></div>
</div>

<!-- Include Dependencies -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/handsontable@12.0.1/dist/handsontable.min.css">
<script src="https://cdn.jsdelivr.net/npm/hyperformula@1.2.0/dist/hyperformula.full.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/handsontable@12.0.1/dist/handsontable.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/handsontable@12.0.1/dist/languages/all.min.js"></script>

<script <?= $nonce['script'] ?? '' ?>>
    document.addEventListener("DOMContentLoaded", function () {
        const container = document.getElementById("trade-tracker-table");
        if (!container) {
            console.error("Trade Tracker: Missing table container.");
            return;
        }

        // Sample data
        const predefinedAnalytics = [
            { symbol: "AAPL", shares: 10, entry_price: 150, current_price: 170, custom1: "" },
            { symbol: "GOOGL", shares: 5, entry_price: 2500, current_price: 2800, custom1: "" },
        ];

        const stockTickers = ["AAPL", "GOOGL", "TSLA", "AMZN", "MSFT"];

        // Fallback for languages if missing
        if (!Handsontable.languages) {
            Handsontable.languages = { "en-US": {} }; // Default fallback
        }

        // Handsontable Initialization
        const hot = new Handsontable(container, {
            data: predefinedAnalytics,
            colHeaders: ["Symbol", "Shares", "Entry Price", "Current Price", "Custom Column"],
            columns: [
                { data: "symbol", type: "dropdown", source: stockTickers },
                { data: "shares", type: "numeric" },
                { data: "entry_price", type: "numeric" },
                { data: "current_price", type: "numeric" },
                { data: "custom1", type: "text" },
            ],
            language: "en-US", // Ensure this matches the included language pack
            contextMenu: true,
            licenseKey: "non-commercial-and-evaluation",
            height: "auto",
            rowHeaders: true,
            manualColumnResize: true,
            manualRowResize: true,
        });
    });
</script>
