<!-- application/modules/User/views/Investments/index.php -->
<?php
if ($userAssessment['account_activated'] == 1) {
    $account_activated              = 'Yes';  
}
$account_information                = $userAssessment['account_information']; 
if ($account_information === 'Yes') {
    $account_informationStatus      = 'Completed'; 
} elseif ($account_information === 'No') {
    $account_informationStatus      = 'Pending'; 
}
$kyc_verified                       = $userAssessment['kyc_verified']; 
if ($kyc_verified === 'Yes') {
    $kyc_verifiedStatus             = 'Completed'; 
} elseif ($kyc_verified === 'No') {
    $kyc_verifiedStatus             = 'Pending'; 
}
$features_activated                 = $userAssessment['features_activated']; 
if ($features_activated === 'Yes') {
    $features_activatedStatus       = 'Completed'; 
} elseif ($features_activated === 'No') {
    $features_activatedStatus       = 'Pending'; 
}
$financial_assessment               = $userAssessment['financial_assessment']; 
if ($financial_assessment === 'Yes') {
    $financial_assessmentStatus     = 'Completed'; 
} elseif ($financial_assessment === 'No') {
    $financial_assessmentStatus     = 'Pending'; 
}
// Banking Information
$banking_accounts                   = $userAssessment['banking_accounts']; 
if ($banking_accounts === 'Yes') {
    $banking_accountsStatus         = 'Completed'; 
} elseif ($banking_accounts === 'No') {
    $banking_accountsStatus         = 'Pending'; 
}
$banking_wallets                    = $userAssessment['banking_wallets']; 
if ($banking_wallets === 'Yes') {
    $banking_walletsStatus          = 'Completed'; 
} elseif ($banking_wallets === 'No') {
    $banking_walletsStatus          = 'Pending'; 
}
$last_banking_update                = $userAssessment['last_banking_update']; 
if ($last_banking_update === 'Yes') {
    $last_banking_updateStatus          = 'Completed'; 
} elseif ($last_banking_update === 'No') {
    $last_banking_updateStatus          = 'Pending'; 
}
$banking_integration                = $userAssessment['banking_integration'];
if ($banking_integration === 'Yes') {
    $banking_integrationStatus          = 'Completed'; 
} elseif ($banking_integration === 'No') {
    $banking_integrationStatus          = 'Pending'; 
}
// Credit / Debt Information
$credit_summary                     = $userAssessment['credit_summary'];
if ($credit_summary === 'Yes') {
    $credit_summaryStatus           = 'Completed'; 
} elseif ($credit_summary === 'No') {
    $credit_summaryStatus           = 'Pending'; 
}
$credit_wallets                     = $userAssessment['credit_wallets']; 
if ($credit_wallets === 'Yes') {
    $credit_walletsStatus           = 'Completed'; 
} elseif ($credit_wallets === 'No') {
    $credit_walletsStatus           = 'Pending'; 
}
$last_credit_update                 = $userAssessment['last_credit_update']; 
if ($last_credit_update === 'Yes') {
    $last_credit_updateStatus       = 'Completed'; 
} elseif ($last_credit_update === 'No') {
    $last_credit_updateStatus       = 'Pending'; 
}
$credit_integration                 = $userAssessment['credit_integration']; 
if ($credit_integration === 'Yes') {
    $credit_integrationStatus       = 'Completed'; 
} elseif ($credit_integration === 'No') {
    $credit_integrationStatus       = 'Pending'; 
}
$debt_summary                       = $userAssessment['debt_summary'];
if ($debt_summary === 'Yes') {
    $debt_summaryStatus             = 'Completed'; 
} elseif ($debt_summary === 'No') {
    $debt_summaryStatus             = 'Pending'; 
}
$debt_wallets                       = $userAssessment['debt_wallets']; 
if ($debt_wallets === 'Yes') {
    $debt_walletsStatus             = 'Completed'; 
} elseif ($debt_wallets === 'No') {
    $debt_walletsStatus             = 'Pending'; 
}
$last_debt_update                   = $userAssessment['last_debt_update']; 
if ($last_debt_update === 'Yes') {
    $last_debt_updateStatus         = 'Completed'; 
} elseif ($last_debt_update === 'No') {
    $last_debt_updateStatus         = 'Pending'; 
}
$debt_integration                   = $userAssessment['debt_integration']; 
if ($debt_integration === 'Yes') {
    $debt_integrationStatus         = 'Completed'; 
} elseif ($debt_integration === 'No') {
    $debt_integrationStatus         = 'Pending'; 
}

// Investment Information
$investment_assessment              = $userAssessment['investment_assessment'];
if ($investment_assessment === 'Yes') {
    $investment_assessmentStatus    = 'Completed'; 
} elseif ($investment_assessment === 'No') {
    $investment_assessmentStatus    = 'Pending'; 
}
$investment_wallets                 = $userAssessment['investment_wallets'];
if ($investment_wallets === 'Yes') {
    $investment_walletsStatus       = 'Completed'; 
} elseif ($investment_wallets === 'No') {
    $investment_walletsStatus       = 'Pending'; 
}
$last_investment_update             = $userAssessment['last_investment_update']; 
if ($last_investment_update === 'Yes') {
    $last_investment_updateStatus       = 'Completed'; 
} elseif ($last_investment_update === 'No') {
    $last_investment_updateStatus       = 'Pending'; 
}
$brokerage_integration              = $userAssessment['brokerage_integration']; 
if ($brokerage_integration === 'Yes') {
    $brokerage_integrationStatus       = 'Completed'; 
} elseif ($brokerage_integration === 'No') {
    $brokerage_integrationStatus       = 'Pending'; 
}

// Risk Assessment
$risk_assessment                    = $userAssessment['risk_assessment']; 
if ($risk_assessment === 'Yes') {
    $risk_assessmentStatus       = 'Completed'; 
} elseif ($risk_assessment === 'No') {
    $risk_assessmentStatus       = 'Pending'; 
}
$financial_goals                    = $userAssessment['financial_goals']; 
if ($financial_goals === 'Yes') {
    $financial_goalsStatus       = 'Completed'; 
} elseif ($financial_goals === 'No') {
    $financial_goalsStatus       = 'Pending'; 
}
$time_horizon                       = $userAssessment['time_horizon']; 
if ($time_horizon === 'Yes') {
    $time_horizonStatus       = 'Completed'; 
} elseif ($time_horizon === 'No') {
    $time_horizonStatus       = 'Pending'; 
}
$financial_rating                   = $userAssessment['financial_rating']; 
if ($financial_rating === 'Yes') {
    $financial_ratingStatus       = 'Completed'; 
} elseif ($financial_rating === 'No') {
    $financial_ratingStatus       = 'Pending'; 
}

// Experience / Knowledge
$investment_experience              = $userAssessment['investment_experience']; 
if ($investment_experience === 'Yes') {
    $investment_experienceStatus       = 'Completed'; 
} elseif ($investment_experience === 'No') {
    $investment_experienceStatus       = 'Pending'; 
}
$investment_knowledge               = $userAssessment['investment_knowledge']; 
if ($investment_knowledge === 'Yes') {
    $investment_knowledgeStatus       = 'Completed'; 
} elseif ($investment_knowledge === 'No') {
    $investment_knowledgeStatus       = 'Pending'; 
}
$market_sentiment                   = $userAssessment['market_sentiment']; 
if ($market_sentiment === 'Yes') {
    $market_sentimentStatus       = 'Completed'; 
} elseif ($market_sentiment === 'No') {
    $market_sentimentStatus       = 'Pending'; 
}
$investment_availability            = $userAssessment['investment_availability']; 
if ($investment_availability === 'Yes') {
    $investment_availabilityStatus       = 'Completed'; 
} elseif ($investment_availability === 'No') {
    $investment_availabilityStatus       = 'Pending'; 
}
// echo $cuRole; 
// Time Configurations
$current_year                       = date('Y');
$thisMonth                          = strtotime(date("m/1/Y"));
$sixMonthsAgo                       = date($thisMonth, strtotime("-6 months"));
$sixMonthsAhead                     = date($thisMonth, strtotime("-6 months"));
$last_year                          = date('Y') - 1;
$next_year                          = date('Y') + 1;
$current_date                       = date('m/d/Y');
$last_year_date                     = date('m/d' . $last_year);
$next_year_date                     = date('m/d' . $next_year);
$end_of_year                        = date('m/d/Y', strtotime('12/31'));
$daysLeft                           = date('dd', strtotime($end_of_year)) - date('dd', strtotime($current_date));
$weeksLeft                          = date('W', strtotime($end_of_year)) - date('W', strtotime($current_date));
$monthsLeft                         = date('m', strtotime($end_of_year)) - date('m', strtotime($current_date));
// Management Configurations
// $managementActionItems              = $this->config->item('managementActionItems');

// ***New Library Configurations***
// Get User Investor Profile Savings Percentage
// Temporary Selection of 30%
$monthlySavingsPercentage           = 0.3;
$monthlySavingsPercentageFMT        = number_format($monthlySavingsPercentage * 100,0) . '%';
// $totalAssetsValue                   = $userInvestments['totalAssetsValue'];
$userInvestmentRecords              = $userInvestments['userInvestmentRecords'];
log_message('info', 'Investments\index.php L207: $userInvestmentRecords: ' . print_r($userInvestmentRecords, true));
$investmentOverview                 = $userInvestments['investmentOverview'];
$activeInvestments                  = $userInvestments['activeInvestments'];
$totalUserInvestments               = $userInvestments['totalUserInvestments'];
$totalTradeValue                    = $userInvestments['totalTradeValue'];
$totalTradeValueSum                 = $userInvestments['totalTradeValueSum'];
$totalAssetValueSum                 = $userInvestments['totalAssetValueSum'];
$totalLastTradeValueSum             = $userInvestments['totalLastTradeValueSum'];
$totalAnnualTradeValueSum           = $userInvestments['totalAnnualTradeValueSum'];
$totalAnnualTradePerformance        = $userInvestments['totalAnnualTradePerformance'];
$thisMonthTradePerformance          = $userInvestments['thisMonthTradePerformance'];
$lastMonthTradePerformance          = $userInvestments['lastMonthTradePerformance'];
$totalTradeCount                    = $userInvestments['totalTradeCount'];
$totalActiveTradeCount              = $userInvestments['totalActiveTradeCount'];
$userTopGainers                     = $userInvestments['userTopGainers'];
$userTopGainer                      = $userInvestments['userTopGainer'];
$userTopLosers                      = $userInvestments['userTopLosers'];
$userTopLoser                       = $userInvestments['userTopLoser'];
$userWatchlist                      = $userInvestments['userWatchlist'];
$userCurrentAnnualValue             = $userInvestments['userCurrentAnnualValue'];
$userCurrentAnnualPerformance       = $userInvestments['userCurrentAnnualPerformance'];
$userCurrentAnnualTarget            = $userInvestments['userCurrentAnnualTarget'];
$totalUserAssetsValue               = $userInvestments['totalUserAssetsValue'];
$totalUserAssetsCount               = $userInvestments['totalUserAssetsCount'];
$totalUserAssetPerformance          = $userInvestments['totalUserAssetPerformance'];

// Economic Data & Financial News
$economicData                       = $userInvestments['economicData'];
// $economicData                       = $this->mymiinvestments->getEconomicData();



$topPerformers                      = $investmentOverview['topInvestmentPerformers'];
$topLosers                          = $investmentOverview['topInvestmentLosers'];

// !! Not Used
$totalMonthlyTradesCount            = $userInvestments['totalMonthlyTradesCount'];
$totalAssetCount                    = $userInvestments['totalAssetCount'];
$totalGrowth                        = $userInvestments['totalGrowth'];
// !! Not Used

$allViewData                        = array(
    'beta'                          => $beta,
    'assetOperations'               => $assetOperations,
    'investmentOperations'          => $investmentOperations,
    'cuID'                          => $cuID,
    'cuEmail'                       => $cuEmail,
    'cuUsername'                    => $cuUsername,
    'userAssessment'                => $userAssessment,
    'account_information'           => $account_information,
    'account_informationStatus'     => $account_informationStatus,
    'kyc_verified'                  => $kyc_verified,
    'kyc_verifiedStatus'            => $kyc_verifiedStatus,
    'features_activated'            => $features_activated,
    'features_activatedStatus'      => $features_activatedStatus,
    'financial_assessment'          => $financial_assessment,
    'financial_assessmentStatus'    => $financial_assessmentStatus,
    'banking_accounts'              => $banking_accounts,
    'banking_accountsStatus'        => $banking_accountsStatus,
    'banking_wallets'               => $banking_wallets,
    'banking_walletsStatus'         => $banking_walletsStatus,
    'last_banking_update'           => $last_banking_update,
    'last_banking_updateStatus'     => $last_banking_updateStatus,
    'banking_integration'           => $banking_integration,
    'banking_integrationStatus'     => $banking_integrationStatus,
    'credit_summary'                => $credit_summary,
    'credit_summaryStatus'          => $credit_summaryStatus,
    'credit_wallets'                => $credit_wallets,
    'credit_walletsStatus'          => $credit_walletsStatus,
    'last_credit_update'            => $last_credit_update,
    'last_credit_updateStatus'      => $last_credit_updateStatus,
    'credit_integration'            => $credit_integration,
    'credit_integrationStatus'      => $credit_integrationStatus,
    'debt_summary'                  => $debt_summary,
    'debt_summaryStatus'            => $debt_summaryStatus,
    'debt_wallets'                  => $debt_wallets,
    'debt_walletsStatus'            => $debt_walletsStatus,
    'last_debt_update'              => $last_debt_update,
    'last_debt_updateStatus'        => $last_debt_updateStatus,
    'debt_integration'              => $debt_integration,
    'debt_integrationStatus'        => $debt_integrationStatus,
    'investment_assessment'         => $investment_assessment,
    'investment_assessmentStatus'   => $investment_assessmentStatus,
    'investment_wallets'            => $investment_wallets,
    'investment_walletsStatus'      => $investment_walletsStatus,
    'last_investment_update'        => $last_investment_update,
    'last_investment_updateStatus'  => $last_investment_updateStatus,
    'brokerage_integration'         => $brokerage_integration,
    'brokerage_integrationStatus'   => $brokerage_integrationStatus,
    'risk_assessment'               => $risk_assessment,
    'risk_assessmentStatus'         => $risk_assessmentStatus,
    'financial_goals'               => $financial_goals,
    'financial_goalsStatus'         => $financial_goalsStatus,
    'time_horizon'                  => $time_horizon,
    'time_horizonStatus'            => $time_horizonStatus,
    'financial_rating'              => $financial_rating,
    'financial_ratingStatus'        => $financial_ratingStatus,
    'investment_experience'         => $investment_experience,
    'investment_experienceStatus'   => $investment_experienceStatus,
    'investment_knowledge'          => $investment_knowledge,
    'investment_knowledgeStatus'    => $investment_knowledgeStatus,
    'market_sentiment'              => $market_sentiment,
    'market_sentimentStatus'        => $market_sentimentStatus,
    'investment_availability'       => $investment_availability,
    'investment_availabilityStatus' => $investment_availabilityStatus,
    'investmentOverview'            => $investmentOverview, 
    'userInvestmentRecords'         => $userInvestmentRecords,
    'activeInvestments'             => $activeInvestments,
    'totalUserInvestments'          => $totalUserInvestments,
    'totalTradeValue'               => $totalTradeValue,
    'totalTradeValueSum'            => $totalTradeValueSum,
    'totalAssetValueSum'            => $totalAssetValueSum,
    'totalLastTradeValueSum'        => $totalLastTradeValueSum,
    'totalAnnualTradeValueSum'      => $totalAnnualTradeValueSum,
    'totalAnnualTradePerformance'   => $totalAnnualTradePerformance,
    'thisMonthTradePerformance'     => $thisMonthTradePerformance,
    'lastMonthTradePerformance'     => $lastMonthTradePerformance,
    'totalTradeCount'               => $totalTradeCount,
    'totalActiveTradeCount'         => $totalActiveTradeCount,
    'totalUserAssetsValue'          => $totalUserAssetsValue,
    'totalUserAssetsCount'          => $totalUserAssetsCount,
    'totalUserAssetPerformance'     => $totalUserAssetPerformance,
    'totalMonthlyTradesCount'       => $totalMonthlyTradesCount,
    'totalAssetCount'               => $totalAssetCount,
    'totalGrowth'                   => $totalGrowth,
    'topPerformers'                 => $topPerformers,
    'topLosers'                     => $topLosers,
    'userCurrentAnnualValue'        => $userCurrentAnnualValue,
    'userCurrentAnnualPerformance'  => $userCurrentAnnualPerformance,
    'userCurrentAnnualTarget'       => $userCurrentAnnualTarget,
    'userTopGainers'                => $userTopGainers,
    'userTopGainer'                 => $userTopGainer,
    'userTopLosers'                 => $userTopLosers,
    'userTopLoser'                  => $userTopLoser,
    'userWatchlist'                 => $userWatchlist,
    // Economic Data & Financial News
    'economicData'                  => $economicData, 
);
// print_r($allViewData);
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
<?php 
// if ($agent->isBrowser()) {
    // !! Activate this to enable the 
    // if ($investment_assessment === 'No') {
    //     echo view('UserModule/Investments/Assessment', $allViewData); 
    // } elseif ($investment_assessment === 'Yes') {
    //     echo view('UserModule/Investments/Dashboard', $allViewData);
    // }
    //echo view('UserModule/Investments/Dashboard', $allViewData);
// } else {

// }
?>
<div class="nk-block">
    <div class="row g-gs">
        <!-- Portfolio Manager Section -->
        <div class="col-md-12 col-xl-3">
            <!-- Portfolio Manager Content -->
            <?php echo view('Investments/index/Action_Center', $allViewData); ?>
        </div>

        <!-- Investment Overview Section -->
        <div class="col-md-12 col-xl-9">
            <!-- Month-to-Month Overview -->
            <?php echo view('Investments/index/Month_to_Month', $allViewData); ?>
        </div>

        <!-- Investment Overview Section -->
        <div class="col-md-12 col-xl-3">
            <!-- Economic Data Section -->
            <div class="economic-data">
                <?php echo view('Investments/index/Economic_Data', $allViewData); ?>
            </div>

            <!-- Additional sections as needed -->
        </div>
        <!-- Investment Overview Section -->
        <div class="col-md-12 col-xl-9">
            <!-- Insights Section -->
            <div class="investment-insights">
                <?php echo view('Investments/index/Insights', $allViewData); ?>
            </div>
        </div>
    </div>
</div>
<script <?= $nonce['script'] ?? '' ?>>
    // Example of safely embedding PHP variables into JavaScript using json_encode
    var userAssessment = <?php echo json_encode($userAssessment); ?>;

    // Use variables in JavaScript
    console.log("User Assessment:", userAssessment);

    // Check if specific keys exist and handling them
    function checkAndDisplay(key) {
        if (userAssessment[key] === 'Yes') {
            return 'Completed';
        } else if (userAssessment[key] === 'No') {
            return 'Pending';
        } else {
            return 'Not Set'; // Default case
        }
    }

    // Applying the function to various assessment keys
    var accountActivatedStatus = checkAndDisplay('account_activated');
    var accountInformationStatus = checkAndDisplay('account_information');
    var kycVerifiedStatus = checkAndDisplay('kyc_verified');
    var featuresActivatedStatus = checkAndDisplay('features_activated');
    var financialAssessmentStatus = checkAndDisplay('financial_assessment');
    var bankingAccountsStatus = checkAndDisplay('banking_accounts');
    var bankingWalletsStatus = checkAndDisplay('banking_wallets');
    var lastBankingUpdateStatus = checkAndDisplay('last_banking_update');
    var bankingIntegrationStatus = checkAndDisplay('banking_integration');
    var creditSummaryStatus = checkAndDisplay('credit_summary');
    var creditWalletsStatus = checkAndDisplay('credit_wallets');
    var lastCreditUpdateStatus = checkAndDisplay('last_credit_update');
    var creditIntegrationStatus = checkAndDisplay('credit_integration');
    var debtSummaryStatus = checkAndDisplay('debt_summary');
    var debtWalletsStatus = checkAndDisplay('debt_wallets');
    var lastDebtUpdateStatus = checkAndDisplay('last_debt_update');
    var debtIntegrationStatus = checkAndDisplay('debt_integration');
    var investmentAssessmentStatus = checkAndDisplay('investment_assessment');
    var investmentWalletsStatus = checkAndDisplay('investment_wallets');
    var lastInvestmentUpdateStatus = checkAndDisplay('last_investment_update');
    var brokerageIntegrationStatus = checkAndDisplay('brokerage_integration');
    var riskAssessmentStatus = checkAndDisplay('risk_assessment');
    var financialGoalsStatus = checkAndDisplay('financial_goals');
    var timeHorizonStatus = checkAndDisplay('time_horizon');
    var financialRatingStatus = checkAndDisplay('financial_rating');
    var investmentExperienceStatus = checkAndDisplay('investment_experience');
    var investmentKnowledgeStatus = checkAndDisplay('investment_knowledge');
    var marketSentimentStatus = checkAndDisplay('market_sentiment');
    var investmentAvailabilityStatus = checkAndDisplay('investment_availability');

    // Outputs for debugging
    console.log("Account Activated Status:", accountActivatedStatus);
    console.log("KYC Verified Status:", kycVerifiedStatus);
    console.log("Features Activated Status:", featuresActivatedStatus);
    
    // Initialize cache for storing API responses
    // Using Map for simplicity, consider Redis for a more scalable solution
    const cache = new Map();

    const alphaVantageConfig = {
    // Stocks
    'getGlobalQuote': 'TIME_SERIES_INTRADAY', // endpoint for fetching real-time stock data
    'getBalanceSheet': 'BALANCE_SHEET',
    'getBatchStockQuotes': 'BATCH_STOCK_QUOTES',
    'getCompanyOverview': 'OVERVIEW',

    // Cryptocurrency
    'getCryptoDaily': 'DIGITAL_CURRENCY_DAILY',
    'getCryptoMonthly': 'DIGITAL_CURRENCY_MONTHLY',
    'getCryptoWeekly': 'DIGITAL_CURRENCY_WEEKLY',
    'getCryptoRating': 'CRYPTO_RATING',
    
    // Bonds, Mutual Funds, ETFs
    'getBondInfo': 'BOND_INFO',
    'getMutualFundDaily': 'TIME_SERIES_DAILY', // assuming daily time series
    'getETFDaily': 'TIME_SERIES_DAILY', // assuming daily time series
    
    // Forex
    'getFXIntraday': 'FX_INTRADAY',
    'getFXRate': 'CURRENCY_EXCHANGE_RATE',
    'getFXMonthly': 'FX_MONTHLY',
    'getFXWeekly': 'FX_WEEKLY',

    // Commodities, Real Estate, Precious Metal
    'getCommodityData': 'GLOBAL_QUOTE', // assuming global quote for commodities
    // 'getRealEstateInfo': 'REAL_ESTATE_INFO', // custom endpoint
    'getPreciousMetalInfo': 'PRECIOUS_METAL_INFO', // custom endpoint

    // Others
    'getEarningsCalendar': 'EARNINGS_CALENDAR',
    'getEconomicIndicator': 'ECONOMIC_INDICATOR',
    'getNewsSentiment': 'NEWS_SENTIMENT',
    'getSectorPerformance': 'SECTOR',
    'getTechnicalIndicator': 'TECHNICAL_INDICATOR',
    'getSymbolSearch': 'SYMBOL_SEARCH',

    // Custom methods
    'getListingDelistingStatus': 'LISTING_DELISTING_STATUS',
    'getInternationalExchanges': 'INTERNATIONAL_EXCHANGES',
    'getIPOCalendar': 'IPO_CALENDAR',
    'scanLowerHighsHigherLows': 'TIME_SERIES_INTRADAY' // assuming intraday time series
    
    // ... add more as required
    };

    // Make it globally accessible if needed
    window.alphaVantageConfig = alphaVantageConfig;


    const tradeTypeToEndpointKey  = {
        'Stock': 'getGlobalQuote',
        'Cryptocurrency': 'getCryptoDaily',
        'Crypto Asset': 'getCryptoDaily',
        'Bond': 'getBondInfo',
        'Forex': 'getFXIntraday',
        'Options': undefined, // No direct mapping found in alphaVantageConfig
        'Mutual Fund': 'getMutualFundDaily',
        'Exchange-Traded Fund (ETF)': 'getETFDaily',
        'Real Estate': 'getRealEstateInfo',
        'Commodity': 'getCommodityData',
        'Foreign Stock': undefined, // No direct mapping found in alphaVantageConfig
        'Precious Metal': 'getPreciousMetalInfo',
        'International Bond': undefined // No direct mapping found in alphaVantageConfig
    };


    // Helper function to fetch data from API
    async function fetchFromApi(url) {
        try {
            const response = await fetch(url, { headers: { "X-Requested-With": "XMLHttpRequest" } });
            const data = await response.json();
            return data;
        } catch (error) {
            console.error(`Error fetching from API: ${error}`);
            return null;
        }
    }


    // Function to get API config for a symbol based on trade type
    async function getConfig(symbol, category) {
        const apiKey = '70BOHXX3E6JX9H88'; // Replace with your actual API key

        // Debugging lines
        console.log('alphaVantageConfig:', window.alphaVantageConfig);
        
        // Get the appropriate endpoint key based on the trade type
        const endpointKey = tradeTypeToEndpointKey[category];
        
        // Debugging lines
        console.log('endpointKey:', endpointKey);
        
        // Check if alphaVantageConfig exists and contains the expected keys
        if (!window.alphaVantageConfig || !window.alphaVantageConfig[endpointKey]) {
            console.error(`Unsupported or missing configuration for trade type: ${category}`);
            return null;
        }
        
        // Fetch the endpoint pattern from the server-defined configurations
        const endpointPattern = window.alphaVantageConfig[endpointKey];
        
        // Replace placeholders in the pattern
        const url = endpointPattern.replace("{symbol}", symbol).replace("{api_key}", apiKey);
        
        return {
            url: url
        };
    }



    // Fetch live updates and calculate net gains
    async function fetchLiveUpdates(symbol, shares) {
        const cacheKey = `currentPrice:${symbol}`;
        if (cache.has(cacheKey)) {
            return cache.get(cacheKey) * shares;
        }

        const url = `https://www.alphavantage.co/query?function=TIME_SERIES_INTRADAY&symbol=${symbol}&interval=5min&apikey=70BOHXX3E6JX9H88`;
        const data = await fetchFromApi(url);

        if (data && data['Time Series (5min)']) {
            const latestData = data['Time Series (5min)'][Object.keys(data['Time Series (5min)'])[0]];
            const currentPrice = parseFloat(latestData['4. close']);
            cache.set(cacheKey, currentPrice);
            setTimeout(() => cache.delete(cacheKey), 60000); // Invalidate cache after 1 minute
            return currentPrice * shares;
        }

        return 0;
    }

    // Initialize the last 12 months with zeros
    // New Function to handle months with no records
    function initializeLast12Months() {
        const monthlyNetGains = {};
        const date = new Date();
        for (let i = 0; i < 12; i++) {
            const monthYear = `${date.getFullYear()}-${String(date.getMonth() + 1).padStart(2, "0")}`;
            monthlyNetGains[monthYear] = 0;
            date.setMonth(date.getMonth() - 1);
        }
        return monthlyNetGains;
    }

    // Initialize the chart
    initInvestmentChart().catch(error => {
        console.error(`Error initializing investment chart: ${error}`);
        // TODO: Add real-time alert for immediate issue resolution
        sendRealTimeAlert(`Error initializing investment chart: ${error}`);
    });

    // Hypothetical third-party service for real-time alerts
    function sendRealTimeAlert(message) {
        // Implementation details for sending real-time alerts.
        // You could use a service like Sentry, Twilio, etc.
        console.log(`Sending real-time alert: ${message}`);
    }

    // Helper function to reformat month-year strings
    function reformatMonthYear(monthYearStr) {
    const date = new Date(`${monthYearStr}-01`);
    const monthNames = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sept", "Oct", "Nov", "Dec"];
    const month = monthNames[date.getMonth()];
    const year = date.getFullYear().toString().substr(-2);
    return `${month} '${year}`;
    }

    // Main function to initialize the ChartJS chart
    async function initInvestmentChart() {
        const rawDataStr = document.querySelector("#investment-data").innerText;
        if (!rawDataStr) {
            throw new Error("Raw data string is empty or undefined.");
        }
        const rawData = JSON.parse(rawDataStr);
        if (!rawData || !Array.isArray(rawData)) {
            throw new Error("Parsed raw data is invalid.");
        }
        const monthlyNetGains = initializeLast12Months();  // Initialize with zeros

        const fetchPromises = rawData.map(async (item, index) => {
            let isValid = true;

            // Detailed validation logic
            if (!item) {
                console.warn(`Skipping item at index ${index} because it is null or undefined.`);
                isValid = false;
            }
            
            if (!item.symbol) {
                console.warn(`Skipping item at index ${index} because 'symbol' is missing or invalid.`);
                isValid = false;
            }

            if (!item.category) {
                console.warn(`Skipping item at index ${index} because 'tradeType' is missing or invalid.`);
                isValid = false;
            }

            if (!item.shares) {
                console.warn(`Skipping item at index ${index} because 'shares' is missing or invalid.`);
                isValid = false;
            }

            if (!item.category) {
                console.warn(`Skipping item at index ${index} because 'category' is missing or invalid.`);
                isValid = false;
            }

            if (!isValid) {
                return;  // Skip this iteration if any validation failed
            }
            const closeDate = item.close_date ? new Date(item.close_date) : new Date();
            const monthYear = `${closeDate.getFullYear()}-${String(closeDate.getMonth() + 1).padStart(2, "0")}`;
            
            const config = await getConfig(item.symbol, item.category); // use item.category instead of item.tradeType
            const gain = await fetchLiveUpdates(item.symbol, item.shares);
            monthlyNetGains[monthYear] = (monthlyNetGains[monthYear] || 0) + gain;
        });

        // Wait for all fetches to complete
        await Promise.all(fetchPromises);

        // Sort the monthlyNetGains keys (month-year strings)
        const sortedKeys = Object.keys(monthlyNetGains).sort();

        // Limit to the last 12 months
        const last12MonthsKeys = sortedKeys.slice(-12);

        // Extract the corresponding values
        const last12MonthsValues = last12MonthsKeys.map(key => monthlyNetGains[key]);

        // Initialize the chart
        const ctx = document.getElementById("investment-report-chart").getContext("2d");
        const formattedLabels = last12MonthsKeys.map(reformatMonthYear);  // New line to format labels
        new Chart(ctx, {
            type: "line",
            data: {
                labels: formattedLabels,
                datasets: [{
                    label: "Monthly Portfolio Performance",
                    data: last12MonthsValues,
                    borderColor: "rgb(75, 192, 192)",
                    fill: false
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    }

    // // Configuration for Alpha Vantage API endpoints
    // const alphaVantageConfig = {
    //     // Configuration for various financial data types
    //     // ... (include all the configurations as per your requirements)
    // };

    // // Mapping trade types to their respective API endpoint keys
    // const tradeTypeToEndpointKey = {
    //     // Mapping definitions
    //     // ...
    // };

    // Helper function to fetch data from API
    async function fetchFromApi(url) {
        try {
            const response = await fetch(url, { headers: { "X-Requested-With": "XMLHttpRequest" } });
            const data = await response.json();
            return data;
        } catch (error) {
            console.error(`Error fetching from API: ${error}`);
            return null;
        }
    }

    // Function to get API config for a symbol based on trade type
    async function getConfig(symbol, category) {
        // Define your Alpha Vantage API key
        const apiKey = 'YOUR_API_KEY';

        const endpointKey = tradeTypeToEndpointKey[category];
        if (!alphaVantageConfig || !alphaVantageConfig[endpointKey]) {
            console.error(`Unsupported or missing configuration for trade type: ${category}`);
            return null;
        }

        const endpointPattern = alphaVantageConfig[endpointKey];
        const url = endpointPattern.replace("{symbol}", symbol).replace("{api_key}", apiKey);
        return { url: url };
    }

    // Function to fetch live updates and calculate net gains
    async function fetchLiveUpdates(symbol, shares) {
        const cacheKey = `currentPrice:${symbol}`;
        if (cache.has(cacheKey)) {
            return cache.get(cacheKey) * shares;
        }

        const url = `https://www.alphavantage.co/query?function=TIME_SERIES_INTRADAY&symbol=${symbol}&interval=5min&apikey=YOUR_API_KEY`;
        const data = await fetchFromApi(url);

        if (data && data['Time Series (5min)']) {
            const latestData = data['Time Series (5min)'][Object.keys(data['Time Series (5min)'])[0]];
            const currentPrice = parseFloat(latestData['4. close']);
            cache.set(cacheKey, currentPrice);
            setTimeout(() => cache.delete(cacheKey), 60000); // Invalidate cache after 1 minute
            return currentPrice * shares;
        }

        return 0;
    }

    // Initialize the last 12 months with zeros
    function initializeLast12Months() {
        const monthlyNetGains = {};
        const date = new Date();
        for (let i = 0; i < 12; i++) {
            const monthYear = `${date.getFullYear()}-${String(date.getMonth() + 1).padStart(2, "0")}`;
            monthlyNetGains[monthYear] = 0;
            date.setMonth(date.getMonth() - 1);
        }
        return monthlyNetGains;
    }

    // Main function to initialize the ChartJS chart
    async function initInvestmentChart() {
        const rawDataStr = document.querySelector("#investment-data").innerText;
        if (!rawDataStr) {
            throw new Error("Raw data string is empty or undefined.");
        }
        const rawData = JSON.parse(rawDataStr);
        if (!Array.isArray(rawData)) {
            throw new Error("Parsed raw data is invalid.");
        }

        const labels = rawData.map(item => item.month);
        const dataValues = rawData.map(item => item.value);

        // Initialize the chart
        const ctx = document.getElementById("investment-report-chart").getContext("2d");
        new Chart(ctx, {
            type: "line",
            data: {
                labels: labels,
                datasets: [{
                    label: "Monthly Portfolio Performance",
                    data: dataValues,
                    borderColor: "rgb(75, 192, 192)",
                    fill: false
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    }

    // Call the function to initialize the chart
    initInvestmentChart().catch(error => console.error(`Error initializing investment chart: ${error}`));
</script>

