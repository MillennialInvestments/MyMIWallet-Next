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

<div class="nk-block">
    <div class="g-gs row">
        <div class="col-md-12 col-xl-3">
            <?php echo view('Investments\index\Action_Center', $subViewData); ?>
        </div>
        <div class="col-md-12 col-xl-9">
            <?php echo view('Investments\index\Month_to_Month', $subViewData); ?>
        </div>
        <div class="col-md-12 col-xl-3">
            <div class="nk-block nk-block-lg">
                <div class="row g-gs">
                    <!-- Active Trades Section -->
                    <div class="col-lg-12">
                        <div class="economic-data">
                            <?php echo view('Investments\index\Investment_Calendar', $subViewData); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-12 col-xl-9">
            <div class="investment-insights">
                <?php echo view('Investments\index\Insights', $subViewData); ?>
            </div>
        </div>
        <?php if ($cuRole <= 2) { ?>
        <div class="col-md-12">
            <div class="investment-insights">
                <?php // echo view('Investments\index\Insights', $subViewData); ?>
            </div>
        </div>
        <?php }; ?>
        <?php if ($siteSettings->stage > 5) : ?>
        <div class="col-md-12 col-xl-3">
            <div class="nk-block nk-block-lg">
                <div class="row g-gs">
                    <!-- Active Trades Section -->
                    <div class="col-lg-12">
                        <div class="investment-insights">
                            <?php echo view('Investments\index\MyMI_News', $subViewData); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-12 col-xl-9">
            <div class="nk-block nk-block-lg">
                <div class="row g-gs">
                    <!-- Active Trades Section -->
                    <div class="col-lg-6">
                        <div class="investment-insights">
                            <?php echo view('Investments\index\My_Performance', $subViewData); ?>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="investment-insights">
                            <?php echo view('Investments\index\My_Alerts', $subViewData); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-12 col-xl-3">
            <div class="nk-block nk-block-lg">
                <div class="row g-gs">
                    <!-- Active Trades Section -->
                    <div class="col-lg-12">
                        <div class="investment-insights">
                            <?php echo view('Investments\index\Economic_Data', $subViewData); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-12 col-xl-9">
            <div class="nk-block nk-block-lg">
                <div class="row g-gs">
                    <!-- Active Trades Section -->
                    <div class="col-lg-6">
                        <div class="investment-insights">
                            <?php echo view('Investments\index\Stock_Overview', $subViewData); ?>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="investment-insights">
                            <?php echo view('Investments\index\Crypto_Overview', $subViewData); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php endif; ?>
    </div>
</div>

<script <?= $nonce['script'] ?? '' ?>>
document.addEventListener('DOMContentLoaded', () => {
    async function fetchInvestmentData() {
        try {
            const response = await fetch(<?= site_url('/API/getUserInvestmentData/' . $cuID)?>); // Replace with your API endpoint
            const data = await response.json();

            if (response.ok) {
                populateDashboard(data);
            } else {
                console.error('Failed to fetch data:', data.message);
            }
        } catch (error) {
            console.error('Error fetching investment data:', error);
        }
    }

    function populateDashboard(data) {
        document.getElementById('action-center').innerHTML = renderActionCenter(data.actionCenter);
        document.getElementById('month-to-month').innerHTML = renderMonthToMonth(data.monthToMonth);
        document.getElementById('investment-tools').innerHTML = renderInvestmentTools(data.tools);
        document.getElementById('investment-insights').innerHTML = renderInvestmentInsights(data.insights);
    }

    fetchInvestmentData();
});
</script>
<script <?= $nonce['script'] ?? '' ?>>
document.addEventListener('DOMContentLoaded', function () {
    const cache = new Map();

    // Initialize last 12 months
    function initializeLast12Months() {
        const monthlyData = {};
        const date = new Date();
        for (let i = 0; i < 12; i++) {
            const monthYear = `${date.getFullYear()}-${String(date.getMonth() + 1).padStart(2, "0")}`;
            monthlyData[monthYear] = 0; // Start with 0 for each month
            date.setMonth(date.getMonth() - 1); // Go back one month
        }
        return monthlyData;
    }

    // Get JSON content from DOM
    const getJsonContent = (selector, defaultValue = '[]') => {
        const element = document.querySelector(selector);
        try {
            return element ? JSON.parse(element.textContent || defaultValue) : JSON.parse(defaultValue);
        } catch (error) {
            console.error(`Error parsing JSON from selector ${selector}:`, error);
            return JSON.parse(defaultValue);
        }
    };

    const investmentData = getJsonContent("#investment-data");
    console.log("Loaded Investment Data:", investmentData);

    const tradeTypeMappings = {
        'equity': 'Stocks',
        'Stock': 'Stocks',
        'option_buy': 'Options',
        'option_sell': 'Options',
        'crypto': 'Cryptocurrencies',
        'mymi_asset': 'MyMI Crypto',
        'mymi_projects': 'MyMI Projects',
    };

    async function initInvestmentChart() {
        const monthlyNetGains = initializeLast12Months();
        const categoryGains = {
            'Stocks': initializeLast12Months(),
            'Options': initializeLast12Months(),
            'Cryptocurrencies': initializeLast12Months(),
            'MyMI Crypto': initializeLast12Months(),
            'MyMI Projects': initializeLast12Months(),
        };

        investmentData.forEach(item => {
            if (!item || !item.category || !item.close_date || !item.net_gains) {
                console.warn('Skipping invalid investment item:', item);
                return;
            }

            const mappedCategory = tradeTypeMappings[item.category];
            if (!mappedCategory) {
                console.warn(`Skipping unsupported trade type: ${item.category}`);
                return;
            }

            const closeDate = new Date(item.close_date);
            const monthYear = `${closeDate.getFullYear()}-${String(closeDate.getMonth() + 1).padStart(2, "0")}`;
            const netGain = parseFloat(item.net_gains) || 0;

            // Aggregate net gains into monthly data
            monthlyNetGains[monthYear] = (monthlyNetGains[monthYear] || 0) + netGain;
            categoryGains[mappedCategory][monthYear] = (categoryGains[mappedCategory][monthYear] || 0) + netGain;
        });

        const sortedKeys = Object.keys(monthlyNetGains).sort();
        const last12MonthsKeys = sortedKeys.slice(-12);

        const chartData = {
            labels: last12MonthsKeys.map(monthYear => {
                const date = new Date(`${monthYear}-01`);
                return date.toLocaleString('default', { month: 'short', year: '2-digit' });
            }),
            datasets: [
                {
                    label: "Total Portfolio",
                    data: last12MonthsKeys.map(key => monthlyNetGains[key]),
                    borderColor: "#007bff",
                    fill: false,
                    type: "line",
                },
                ...Object.keys(categoryGains).map(category => ({
                    label: category,
                    data: last12MonthsKeys.map(key => categoryGains[category][key] || 0),
                    backgroundColor: "#" + Math.floor(Math.random() * 16777215).toString(16),
                    type: "bar",
                })),
            ],
        };

        const ctx = document.getElementById("investment-report-chart");
        if (!ctx) {
            console.error("Chart canvas element not found.");
            return;
        }

        new Chart(ctx.getContext("2d"), {
            type: "bar",
            data: chartData,
            options: {
                scales: {
                    y: { beginAtZero: true },
                    x: { stacked: true },
                },
                plugins: { legend: { position: "bottom" } },
            },
        });
    }

    initInvestmentChart().catch(error => {
        console.error(`Error initializing investment chart: ${error}`);
    });
});

</script>
       
