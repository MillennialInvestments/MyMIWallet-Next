<?php
echo '<script ' . ($nonce['script'] ?? '') . '>';
echo 'console.log("userInvestments Array:", ' . json_encode($userInvestments) . ');';
echo '</script>';
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
                            <?php echo view('Investments\index\Investment_Tools', $subViewData); ?>
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
// // var userAssessment = <?php //echo json_encode($userAssessment); ?>;

// // console.log("User Assessment:", userAssessment);

// // function checkAndDisplay(key) {
// //     if (userAssessment[key] === 'Yes') {
// //         return 'Completed';
// //     } else if (userAssessment[key] === 'No') {
// //         return 'Pending';
// //     } else {
// //         return 'Not Set';
// //     }
// // }

// // var accountActivatedStatus = checkAndDisplay('account_activated');
// // var accountInformationStatus = checkAndDisplay('account_information');
// // var kycVerifiedStatus = checkAndDisplay('kyc_verified');
// // var featuresActivatedStatus = checkAndDisplay('features_activated');
// // var financialAssessmentStatus = checkAndDisplay('financial_assessment');
// // var bankingAccountsStatus = checkAndDisplay('banking_accounts');
// // var bankingWalletsStatus = checkAndDisplay('banking_wallets');
// // var lastBankingUpdateStatus = checkAndDisplay('last_banking_update');
// // var bankingIntegrationStatus = checkAndDisplay('banking_integration');
// // var creditSummaryStatus = checkAndDisplay('credit_summary');
// // var creditWalletsStatus = checkAndDisplay('credit_wallets');
// // var lastCreditUpdateStatus = checkAndDisplay('last_credit_update');
// // var creditIntegrationStatus = checkAndDisplay('credit_integration');
// // var debtSummaryStatus = checkAndDisplay('debt_summary');
// // var debtWalletsStatus = checkAndDisplay('debt_wallets');
// // var lastDebtUpdateStatus = checkAndDisplay('last_debt_update');
// // var debtIntegrationStatus = checkAndDisplay('debt_integration');
// // var investmentAssessmentStatus = checkAndDisplay('investment_assessment');
// // var investmentWalletsStatus = checkAndDisplay('investment_wallets');
// // var lastInvestmentUpdateStatus = checkAndDisplay('last_investment_update');
// // var brokerageIntegrationStatus = checkAndDisplay('brokerage_integration');
// // var riskAssessmentStatus = checkAndDisplay('risk_assessment');
// // var financialGoalsStatus = checkAndDisplay('financial_goals');
// // var timeHorizonStatus = checkAndDisplay('time_horizon');
// // var financialRatingStatus = checkAndDisplay('financial_rating');
// // var investmentExperienceStatus = checkAndDisplay('investment_experience');
// // var investmentKnowledgeStatus = checkAndDisplay('investment_knowledge');
// // var marketSentimentStatus = checkAndDisplay('market_sentiment');
// // var investmentAvailabilityStatus = checkAndDisplay('investment_availability');

// // console.log("Account Activated Status:", accountActivatedStatus);
// // console.log("KYC Verified Status:", kycVerifiedStatus);
// // console.log("Features Activated Status:", featuresActivatedStatus);

// const cache = new Map();

// const alphaVantageConfig = {
//     'getGlobalQuote': 'TIME_SERIES_INTRADAY',
//     'getBalanceSheet': 'BALANCE_SHEET',
//     'getBatchStockQuotes': 'BATCH_STOCK_QUOTES',
//     'getCompanyOverview': 'OVERVIEW',
//     'getCryptoDaily': 'DIGITAL_CURRENCY_DAILY',
//     'getCryptoMonthly': 'DIGITAL_CURRENCY_MONTHLY',
//     'getCryptoWeekly': 'DIGITAL_CURRENCY_WEEKLY',
//     'getCryptoRating': 'CRYPTO_RATING',
//     'getBondInfo': 'BOND_INFO',
//     'getMutualFundDaily': 'TIME_SERIES_DAILY',
//     'getETFDaily': 'TIME_SERIES_DAILY',
//     'getFXIntraday': 'FX_INTRADAY',
//     'getFXRate': 'CURRENCY_EXCHANGE_RATE',
//     'getFXMonthly': 'FX_MONTHLY',
//     'getFXWeekly': 'FX_WEEKLY',
//     'getCommodityData': 'GLOBAL_QUOTE',
//     'getPreciousMetalInfo': 'PRECIOUS_METAL_INFO',
//     'getEarningsCalendar': 'EARNINGS_CALENDAR',
//     'getEconomicIndicator': 'ECONOMIC_INDICATOR',
//     'getNewsSentiment': 'NEWS_SENTIMENT',
//     'getSectorPerformance': 'SECTOR',
//     'getTechnicalIndicator': 'TECHNICAL_INDICATOR',
//     'getSymbolSearch': 'SYMBOL_SEARCH',
//     'getListingDelistingStatus': 'LISTING_DELISTING_STATUS',
//     'getInternationalExchanges': 'INTERNATIONAL_EXCHANGES',
//     'getIPOCalendar': 'IPO_CALENDAR',
//     'scanLowerHighsHigherLows': 'TIME_SERIES_INTRADAY'
// };

// window.alphaVantageConfig = alphaVantageConfig;

// const tradeTypeToEndpointKey = {
//     'Stock': 'getGlobalQuote',
//     'Cryptocurrency': 'getCryptoDaily',
//     'Crypto Asset': 'getCryptoDaily',
//     'Bond': 'getBondInfo',
//     'Forex': 'getFXIntraday',
//     'Options': undefined,
//     'Mutual Fund': 'getMutualFundDaily',
//     'Exchange-Traded Fund (ETF)': 'getETFDaily',
//     'Real Estate': 'getRealEstateInfo',
//     'Commodity': 'getCommodityData',
//     'Foreign Stock': undefined,
//     'Precious Metal': 'getPreciousMetalInfo',
//     'International Bond': undefined
// };

// async function fetchFromApi(url) {
//     try {
//         const response = await fetch(url, { headers: { "X-Requested-With": "XMLHttpRequest" } });
//         const data = await response.json();
//         return data;
//     } catch (error) {
//         console.error(`Error fetching from API: ${error}`);
//         return null;
//     }
// }

// async function getConfig(symbol, category) {
//     const apiKey = '70BOHXX3E6JX9H88';
//     const endpointKey = tradeTypeToEndpointKey[category];
    
//     if (!window.alphaVantageConfig || !window.alphaVantageConfig[endpointKey]) {
//         console.error(`Unsupported or missing configuration for trade type: ${category}`);
//         return null;
//     }
    
//     const endpointPattern = window.alphaVantageConfig[endpointKey];
//     const url = endpointPattern.replace("{symbol}", symbol).replace("{api_key}", apiKey);
    
//     return {
//         url: url
//     };
// }

// async function fetchLiveUpdates(symbol, shares) {
//     const cacheKey = `currentPrice:${symbol}`;
//     if (cache.has(cacheKey)) {
//         return cache.get(cacheKey) * shares;
//     }

//     const url = `https://www.alphavantage.co/query?function=TIME_SERIES_INTRADAY&symbol=${symbol}&interval=5min&apikey=70BOHXX3E6JX9H88`;
//     const data = await fetchFromApi(url);

//     if (data && data['Time Series (5min)']) {
//         const latestData = data['Time Series (5min)'][Object.keys(data['Time Series (5min)'])[0]];
//         const currentPrice = parseFloat(latestData['4. close']);
//         cache.set(cacheKey, currentPrice);
//         setTimeout(() => cache.delete(cacheKey), 60000);
//         return currentPrice * shares;
//     }

//     return 0;
// }

// function initializeLast12Months() {
//     const monthlyNetGains = {};
//     const date = new Date();
//     for (let i = 0; i < 12; i++) {
//         const monthYear = `${date.getFullYear()}-${String(date.getMonth() + 1).padStart(2, "0")}`;
//         monthlyNetGains[monthYear] = 0;
//         date.setMonth(date.getMonth() - 1);
//     }
//     return monthlyNetGains;
// }

// function reformatMonthYear(monthYearStr) {
//     const date = new Date(`${monthYearStr}-01`);
//     const monthNames = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sept", "Oct", "Nov", "Dec"];
//     const month = monthNames[date.getMonth()];
//     const year = date.getFullYear().toString().substr(-2);
//     return `${month} '${year}`;
// }

// async function initInvestmentChart() {
//     const rawDataStr = document.querySelector("#investment-data").innerText;
//     if (!rawDataStr) {
//         throw new Error("Raw data string is empty or undefined.");
//     }
//     const rawData = JSON.parse(rawDataStr);
//     if (!rawData || !Array.isArray(rawData)) {
//         throw new Error("Parsed raw data is invalid.");
//     }
//     const monthlyNetGains = initializeLast12Months();

//     const fetchPromises = rawData.map(async (item, index) => {
//         let isValid = true;

//         if (!item) {
//             console.warn(`Skipping item at index ${index} because it is null or undefined.`);
//             isValid = false;
//         }
        
//         if (!item.symbol) {
//             console.warn(`Skipping item at index ${index} because 'symbol' is missing or invalid.`);
//             isValid = false;
//         }

//         if (!item.category) {
//             console.warn(`Skipping item at index ${index} because 'tradeType' is missing or invalid.`);
//             isValid = false;
//         }

//         if (!item.shares) {
//             console.warn(`Skipping item at index ${index} because 'shares' is missing or invalid.`);
//             isValid = false;
//         }

//         if (!item.category) {
//             console.warn(`Skipping item at index ${index} because 'category' is missing or invalid.`);
//             isValid = false;
//         }

//         if (!isValid) {
//             return;
//         }
//         const closeDate = item.close_date ? new Date(item.close_date) : new Date();
//         const monthYear = `${closeDate.getFullYear()}-${String(closeDate.getMonth() + 1).padStart(2, "0")}`;
        
//         const config = await getConfig(item.symbol, item.category);
//         if (!config || !config.url) {
//             console.warn(`Skipping item at index ${index} because config is missing or invalid.`);
//             return;
//         }
//         const gain = await fetchLiveUpdates(item.symbol, item.shares);
//         monthlyNetGains[monthYear] = (monthlyNetGains[monthYear] || 0) + gain;
//     });

//     // Wait for all fetches to complete
//     await Promise.all(fetchPromises);

//     // Sort the monthlyNetGains keys (month-year strings)
//     const sortedKeys = Object.keys(monthlyNetGains).sort();

//     // Limit to the last 12 months
//     const last12MonthsKeys = sortedKeys.slice(-12);

//     // Extract the corresponding values
//     const last12MonthsValues = last12MonthsKeys.map(key => monthlyNetGains[key]);

//     // Initialize the chart
//     const ctx = document.getElementById("investment-report-chart").getContext("2d");
//     const formattedLabels = last12MonthsKeys.map(reformatMonthYear);
//     new Chart(ctx, {
//         type: "line",
//         data: {
//             labels: formattedLabels,
//             datasets: [{
//                 label: "Monthly Portfolio Performance",
//                 data: last12MonthsValues,
//                 borderColor: "rgb(75, 192, 192)",
//                 fill: false
//             }]
//         },
//         options: {
//             scales: {
//                 y: {
//                     beginAtZero: true
//                 }
//             }
//         }
//     });
// }

// // Call the function to initialize the chart
// initInvestmentChart().catch(error => {
//     console.error(`Error initializing investment chart: ${error}`);
//     // TODO: Add real-time alert for immediate issue resolution
//     sendRealTimeAlert(`Error initializing investment chart: ${error}`);
// });

// // Hypothetical third-party service for real-time alerts
// function sendRealTimeAlert(message) {
//     // Implementation details for sending real-time alerts.
//     // You could use a service like Sentry, Twilio, etc.
//     console.log(`Sending real-time alert: ${message}`);
// }
</script>

       
