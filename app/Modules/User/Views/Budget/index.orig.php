<?php
// Site Settings 
$beta                               = $siteSettings->beta;
$investmentOperations               = $siteSettings->investmentOperations;
// User Account Information



// print_r($userBudget); 
// echo '<br><br>';
// print_r($userAccount);
$cuID                               = $userAccount['cuID'];
$getIncomeYTDSummary                    = $this->budget_model->get_income_ytd_summary($cuID);
// print_r($getIncomeYTDSummary);
$cuEmail                            = $userAccount['cuEmail'];
$cuUsername                         = $userAccount['cuUsername'];
$cuDisplayName                      = $userAccount['cuDisplayName'];
$cuFirstName                        = $userAccount['cuFirstName'];
$cuMiddleName                       = $userAccount['cuMiddleName'];
$cuLastName                         = $userAccount['cuLastName'];
$cuNameSuffix                       = $userAccount['cuNameSuffix'];
$cuDOB                              = $userAccount['cuDOB'];
$cuSSN                              = $userAccount['cuSSN'];
$cuPhone                            = $userAccount['cuPhone'];
$cuAddress                          = $userAccount['cuAddress'];
$cuCity                             = $userAccount['cuCity'];
$cuState                            = $userAccount['cuState'];
$cuCountry                          = $userAccount['cuCountry'];
$cuZipCode                          = $userAccount['cuZipCode'];
$cuMailingAddress                   = $userAccount['cuMailingAddress'];
$cuEmployment                       = $userAccount['cuEmployment'];
$cuOccupation                       = $userAccount['cuOccupation']; 
$cuSalary                           = $userAccount['cuSalary']; 
$cuProofIdentity                    = $userAccount['cuProofIdentity'];
$cuProofAddress                     = $userAccount['cuProofAddress'];
$cuPublicKey                        = $userAccount['cuPublicKey'];
$cuPrivateKey                       = $userAccount['cuPrivateKey'];

// MyMI Features & Services
$cuPFBT                             = 'N/A'; 

$userAssessment                     = $_SESSION['allSessionData']['userAssessment'];
// print_r($userAssessment); 
// Account Information
// echo '<br><br>';
// echo $userAssessment['account_activated']; 
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
    $debt_summaryStatus       = 'Completed'; 
} elseif ($debt_summary === 'No') {
    $debt_summaryStatus       = 'Pending'; 
}
$debt_wallets                       = $userAssessment['debt_wallets']; 
if ($debt_wallets === 'Yes') {
    $debt_walletsStatus       = 'Completed'; 
} elseif ($debt_wallets === 'No') {
    $debt_walletsStatus       = 'Pending'; 
}
$last_debt_update                   = $userAssessment['last_debt_update']; 
if ($last_debt_update === 'Yes') {
    $last_debt_updateStatus       = 'Completed'; 
} elseif ($last_debt_update === 'No') {
    $last_debt_updateStatus       = 'Pending'; 
}
$debt_integration                   = $userAssessment['debt_integration']; 
if ($debt_integration === 'Yes') {
    $debt_integrationStatus       = 'Completed'; 
} elseif ($debt_integration === 'No') {
    $debt_integrationStatus       = 'Pending'; 
}

// Investment Information
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
$managementActionItems              = $this->config->item('managementActionItems');

// ***New Library Configurations***
// Get User Investor Profile Savings Percentage
// Temporary Selection of 30%
$monthlySavingsPercentage           = 0.3;
$monthlySavingsPercentageFMT        = number_format($monthlySavingsPercentage * 100,0) . '%';
// !! MyMI Budget Variable Configuration (applications/libraries/MyMIBudget.php -> Function: all_user_budget_info($cuID)
$userBudgetRecords                  = $userBudget['userBudgetRecords'];
$thisMonthsIncome                   = $userBudget['thisMonthsIncome'];
$thisMonthsIncomeFMT                = $userBudget['thisMonthsIncomeFMT'];
$thisMonthsExpense                  = $userBudget['thisMonthsExpense'];
$thisMonthsExpenseFMT               = $userBudget['thisMonthsExpenseFMT'];
$thisMonthsSurplus                  = $userBudget['thisMonthsSurplus'];
$thisMonthsSurplusFMT               = $userBudget['thisMonthsSurplusFMT'];
$thisMonthsInvestments              = $userBudget['thisMonthsInvestments'];
$thisMonthsInvestmentsFMT           = $userBudget['thisMonthsInvestmentsFMT'];
$thisMonthsInvestmentsSplitFMT      = $userBudget['thisMonthsInvestmentsSplitFMT'];
$lastMonthsIncome                   = $userBudget['lastMonthsIncome'];
$lastMonthsIncomeFMT                = $userBudget['lastMonthsIncomeFMT'];
$lastMonthsExpense                  = $userBudget['lastMonthsExpense'];
$lastMonthsExpenseFMT               = $userBudget['lastMonthsExpenseFMT'];
$lastMonthsSurplus                  = $userBudget['lastMonthsSurplus'];
$lastMonthsSurplusFMT               = $userBudget['lastMonthsSurplusFMT'];
$lastMonthsInvestments              = $userBudget['lastMonthsInvestments'];
$lastMonthsInvestmentsFMT           = $userBudget['lastMonthsInvestmentsFMT'];
$nextMonthsIncome                   = $userBudget['nextMonthsIncome'];
$nextMonthsIncomeFMT                = $userBudget['nextMonthsIncomeFMT'];
$nextMonthsExpense                  = $userBudget['nextMonthsExpense'];
$nextMonthsExpenseFMT               = $userBudget['nextMonthsExpenseFMT'];
$nextMonthsSurplus                  = $userBudget['nextMonthsSurplus'];
$nextMonthsSurplusFMT               = $userBudget['nextMonthsSurplusFMT'];
$nextMonthsInvestments              = $userBudget['nextMonthsInvestments'];
$nextMonthsInvestmentsFMT           = $userBudget['nextMonthsInvestmentsFMT'];
$totalIncome                        = $userBudget['totalIncome'];
$totalIncomeFMT                     = $userBudget['totalIncomeFMT'];
$totalExpense                       = $userBudget['totalExpense'];
$totalExpenseFMT                    = $userBudget['totalExpenseFMT'];
$totalSurplus                       = $userBudget['totalSurplus'];
$totalSurplusFMT                    = $userBudget['totalSurplusFMT'];
$totalInvestments                   = $userBudget['totalInvestments'];
$totalInvestmentsFMT                = $userBudget['totalInvestmentsFMT'];
$checkingSummary                    = $userBudget['checkingSummary'];
$checkingSummaryFMT                 = $userBudget['checkingSummaryFMT'];
$incomeYTDSummary                   = $userBudget['incomeYTDSummary'];
$incomeYTDSummaryFMT                = $userBudget['incomeYTDSummaryFMT'];
$expenseYTDSummary                  = $userBudget['expenseYTDSummary'];
$expenseYTDSummaryFMT               = $userBudget['expenseYTDSummaryFMT'];
$creditLimit                        = $userBudget['creditLimit'];
$creditLimitFMT                     = $userBudget['creditLimitFMT'];
$creditAvailable                    = $userBudget['creditAvailable'];
$creditAvailableFMT                 = $userBudget['creditAvailableFMT'];
$debtSummary                        = $userBudget['debtSummary'];
$debtSummaryFMT                     = $userBudget['debtSummaryFMT'];
$totalAccountBalance                = $userBudget['totalAccountBalance'];
$totalAccountBalanceFMT             = $userBudget['totalAccountBalanceFMT'];
$allViewData                        = array(
    'beta'                          => $beta,
    'investmentOperations'          => $investmentOperations,
    'cuID'                          => $cuID,
    'cuEmail'                       => $cuEmail,
    'cuUsername'                    => $cuUsername,
    'cuDisplayName'                 => $cuDisplayName,
    'cuFirstName'                   => $cuFirstName,
    'cuMiddleName'                  => $cuMiddleName,
    'cuLastName'                    => $cuLastName,
    'cuNameSuffix'                  => $cuNameSuffix,
    'cuDOB'                         => $cuDOB,
    'cuSSN'                         => $cuSSN,
    'cuPhone'                       => $cuPhone,
    'cuAddress'                     => $cuAddress,
    'cuCity'                        => $cuCity,
    'cuState'                       => $cuState,
    'cuCountry'                     => $cuCountry,
    'cuZipCode'                     => $cuZipCode,
    'cuMailingAddress'              => $cuMailingAddress,
    'cuEmployment'                  => $cuEmployment,
    'cuOccupation'                  => $cuOccupation,
    'cuSalary'                      => $cuSalary,
    'cuProofIdentity'               => $cuProofIdentity,
    'cuProofAddress'                => $cuProofAddress,
    'cuPublicKey'                   => $cuPublicKey,
    'cuPrivateKey'                  => $cuPrivateKey,
    'cuPFBT'                        => $cuPFBT,
    'userAssessment'                => $userAssessment,
    'account_information'           => $account_information,
    'account_informationStatus'     => $account_informationStatus,
    'kyc_verified'                  => $kyc_verified,
    'kyc_verifiedStatus'            => $kyc_verifiedStatus,
    'features_activated'            => $features_activated,
    'features_activatedStatus'      => $features_activatedStatus,
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
    'investment_wallets'            => $investment_wallets,
    'investment_walletsStatus'      => $investment_walletsStatus,
    'last_investment_update'        => $last_investment_update,
    'last_investment_updateStatus'  => $last_investment_updateStatus,
    'brokerage_integration'         => $brokerage_integration,
    'brokerage_integrationStatus'   => $brokerage_integrationStatus,
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
    'userBudgetRecords'             => $userBudgetRecords,
    'userWallets'                   => $userWallets,
    'monthlySavingsPercentageFMT'   => $monthlySavingsPercentageFMT,
    'checkingSummaryFMT'            => $checkingSummaryFMT,
    'incomeYTDSummaryFMT'           => $incomeYTDSummaryFMT,
    'expenseYTDSummaryFMT'          => $expenseYTDSummaryFMT,
    'thisMonthsIncomeFMT'           => $thisMonthsIncomeFMT,
    'thisMonthsExpense'             => $thisMonthsExpense,
    'thisMonthsExpenseFMT'          => $thisMonthsExpenseFMT,
    'thisMonthsSurplusFMT'          => $thisMonthsSurplusFMT,
    'thisMonthsInvestmentsFMT'      => $thisMonthsInvestmentsFMT,
    'thisMonthsInvestmentsSplitFMT' => $thisMonthsInvestmentsSplitFMT,
    'lastMonthsIncomeFMT'           => $lastMonthsIncomeFMT,
    'lastMonthsExpense'             => $lastMonthsExpense,
    'lastMonthsExpenseFMT'          => $lastMonthsExpenseFMT,
    'lastMonthsSurplusFMT'          => $lastMonthsSurplusFMT,
    'lastMonthsInvestmentsFMT'      => $lastMonthsInvestmentsFMT,
    'nextMonthsIncomeFMT'           => $nextMonthsIncomeFMT,
    'nextMonthsExpense'             => $nextMonthsExpense,
    'nextMonthsExpenseFMT'          => $nextMonthsExpenseFMT,
    'nextMonthsSurplusFMT'          => $nextMonthsSurplusFMT,
    'nextMonthsInvestmentsFMT'      => $nextMonthsInvestmentsFMT,
    'totalIncomeFMT'                => $totalIncomeFMT,
    'totalExpense'                  => $totalExpense,
    'totalExpenseFMT'               => $totalExpenseFMT,
    'totalSurplusFMT'               => $totalSurplusFMT,
    'totalInvestmentsFMT'           => $totalInvestmentsFMT,
    'creditLimit'                   => $creditLimit,
    'creditLimitFMT'                => $creditLimitFMT,
    'creditAvailable'               => $creditAvailable,
    'creditAvailableFMT'            => $creditAvailableFMT,
    'debtSummary'                   => $debtSummary,
    'debtSummaryFMT'                => $debtSummaryFMT,
    'totalAccountBalance'           => $totalAccountBalance,
    'totalAccountBalanceFMT'        => $totalAccountBalanceFMT,
);
$ytd_totals                         = $this->budget_model->get_ytd_totals($cuID);
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
if ($this->agent->is_browser()) {
// echo '
// <div class="nk-block d-none d-sm-block">
//     <div class="row">
//         <div class="d-lg-none d-xl-block col-md-12 col-xl-3 my-sm-3">';
//             echo view('User/Budget/index/Investor_Assessment/assessment_center', $allViewData);
//             // echo view('User/Budget/index/control_center', $allViewData);
//         echo '
//         </div><!-- .col -->
//         <div class="d-none d-sm-block col-md-12 col-xl-9 my-sm-3">';
//             echo view('User/Budget/index/Investor_Assessment/assessment_content', $allViewData);
//             // echo view('User/Budget/index/overview_chart', $allViewData);
//         echo '
//         </div>
//     </div>
// </div>';
echo '
<div class="nk-block d-none d-sm-block">
    <div class="row">
        <div class="d-none d-md-block col-md-12 col-xl-3 my-sm-3">';
            // echo view('User/Budget/index/assessment_center', $allViewData);
            echo view('User/Budget/index/control_center', $allViewData);
        echo '
        </div><!-- .col -->
        <div class="d-none d-sm-block col-md-12 col-xl-9 my-sm-3">';
            // echo view('User/Budget/index/assessment_content', $allViewData);
            echo view('User/Budget/index/overview_chart', $allViewData);
        echo '
        </div>
    </div>
</div>
';
}
?>
<div id="budgeting-monthly-financial-overview"></div>
<div class="nk-block">
    <div class="row">
        <div class="col-sm-12 col-md-12 my-sm-3">
            <?php
            if ($this->agent->is_mobile()) {
                echo '<div class="card h-100">';
            } elseif ($this->agent->is_browser()) {
                echo '<div class="card card-bordered h-100">';
            };
            ?>
                <div class="card-inner px-2 px-lg-4">
                    <div class="nk-order-ovwg">
                        <?php 
                        if ($this->agent->is_browser()) {
                            echo '
                        <div class="row g-4 align-end">
                            <div class="col-12">
                                <div class="card-title-group align-start mb-3">
                                    <div class="card-title">
                                        <h6 class="title">Monthly Financial Overview</h6>
                                        <p class="d-none d-md-block">Last 12 Months of Total Monthly ßFinancial Growth.</p>
                                    </div>
                                    <div class="card-tools mt-n1 me-n1">
                                        <a class="btn btn-success btn-sm text-white" href="' . site_url('/Budget/Add/Income') . '"><i class="icon ni ni-plus"></i> Income</a>
                                        <a class="btn btn-danger btn-sm text-white" href="' . site_url('/Budget/Add/Expense') . '"><i class="icon ni ni-plus"></i> Expense</a>
                                        <a class="btn btn-primary btn-sm text-white" data-bs-toggle="modal" data-bs-target="#bulkActionModal"><i class="icon ni ni-pencil"></i> Edit All</a>
                                        <a class="btn btn-outline-secondary btn-sm" href="' . site_url('/Budget/History') . '"><i class="icon ni ni-history"></i> History</a>
                                        <div class="dropdown">
                                            <a href="#" class="btn btn-outline-secondary btn-sm" data-bs-toggle="dropdown" aria-expanded="false"><span>Chart Settings</span><em class="icon ni ni-setting"></em></a>
                                            <div class="dropdown-menu dropdown-menu-end mt-1" style="">
                                                <ul class="link-check link-list-opt no-bdr">
                                                    <li><span>Include Credit?</span></li>
                                                        <li class="p-1">
                                                            <a class="" href="' . site_url('/Budget/Add/Income') . '">On</a>
                                                        </li>
                                                        <li class="p-1 active">
                                                            <a class="" href="' . site_url('/Budget/Add/Income') . '">Off</a>
                                                        </li>
                                                    <li><span>Include Investments?</span></li>
                                                        <li class="p-1">
                                                            <a class="" href="' . site_url('/Budget/Add/Income') . '">On</a>
                                                        </li>
                                                        <li class="p-1 active">
                                                            <a class="" href="' . site_url('/Budget/Add/Income') . '">Off</a>
                                                        </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="card-tools mt-1 me-n1">
                                            <span class="mr-3">
                                                Include Credit Accounts: <a class="" href="' . site_url('/Budget/Add/Income') . '"><i class="icon ni ni-toggle-off"></i></a>
                                            </span>
                                            <span>
                                                Include Investment Accounts: <a class="" href="' . site_url('/Budget/Add/Income') . '"><i class="icon ni ni-toggle-off"></i></a>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <!-- <div class="card-title-group align-start mb-3">
                                    <div class="card-tools mt-n1 me-n1">
                                        Include Credit Accounts: <a class="" href="' . site_url('/Budget/Add/Income') . '"><i class="icon ni ni-toggle-off"></i></a>
                                        Include Investment Accounts: <a class="" href="' . site_url('/Budget/Add/Income') . '"><i class="icon ni ni-toggle-off"></i></a>
                                    </div>
                                </div>
                                <div class="card-title-group align-start mb-3">
                                    <div class="card-tools mt-n1 me-n1">
                                        <ul class="nav nav-pills p-lg-3">
                                            <li class="nav-item">
                                                <a class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">Current</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" id="home-tab" type="button" role="tab" data-bs-toggle="modal" data-bs-target="#bulkActionModal" aria-controls="home" aria-selected="true">Edit All</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="true">History</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div> -->
                                <div class="tab-content">
                                    <div class="tab-pane active" id="home" role="tabpanel" aria-labelledby="home-tab">';
                                        echo view('User/Budget/index/active_table', $allViewData);
                                        echo '
                                    </div>
                                    <div class="tab-pane" id="profile" role="tabpanel" aria-labelledby="profile-tab">';
                                    //echo view('User/Budget/index/historical_table', $allViewData);
                                    echo '
                                    </div>
                                </div>
                            </div>
                        </div>
                            ';
                        } elseif ($this->agent->is_mobile()) {
                            echo '
                        <div class="row g-4 align-end">
                            <div class="col-12 pr-3">
                                <div class="card-title-group align-start mb-3">
                                    <div class="card-title">
                                        <h6 class="title">Monthly Financial Overview</h6>
                                        <p class="d-none d-md-block">Last 12 Months of Total Monthly ßFinancial Growth.</p>
                                    </div>
                                    <div class="card-tools mt-n1 me-n1">
                                        <a class="btn btn-success btn-xs text-white" href="' . site_url('/Budget/Add/Income') . '"><i class="icon ni ni-plus"></i> Income</a>
                                        <a class="btn btn-danger btn-xs text-white" href="' . site_url('/Budget/Add/Expense') . '"><i class="icon ni ni-plus"></i> Expense</a>
                                    </div>
                                </div>
                                <!-- <div class="card-title-group align-start mb-3">
                                    <div class="card-tools mt-n1 me-n1">
                                        <ul class="nav nav-pills p-lg-3">
                                            <li class="nav-item">
                                                <a class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">Current</a>
                                            </li> 
                                            <li class="nav-item">
                                                <a class="nav-link" id="home-tab" type="button" role="tab" data-bs-toggle="modal" data-bs-target="#bulkActionModal" aria-controls="home" aria-selected="true">Edit All</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="true">History</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div> -->
                                <div class="tab-content">
                                    <div class="tab-pane active" id="home" role="tabpanel" aria-labelledby="home-tab">';
                                            echo view('User/Budget/index/active_table', $allViewData);
                                            echo '
                                        </div>
                                        <div class="tab-pane" id="profile" role="tabpanel" aria-labelledby="profile-tab">';
                                        //echo view('User/Budget/index/historical_table', $allViewData);
                                        echo '
                                        </div>
                                    </div>
                                </div>
                            </div>
                            ';
                        }
                        ?>
                    </div><!-- .nk-order-ovwg -->
                </div><!-- .card-inner -->
            </div><!-- .card -->
        </div>
    </div>
</div>
<!-- Add this modal HTML in your view -->
<div class="modal" id="bulkActionModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Bulk Actions</h5>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <button onclick="handleBulkAction('updateStatus')" class="btn btn-primary">Mark as Paid</button>
                <button onclick="handleBulkAction('delete')" class="btn btn-danger">Delete</button>
            </div>
        </div>
    </div>
</div>

<script <?= $nonce['script'] ?? '' ?>>
const data = JSON.parse(document.querySelector("#budget-data").innerText); 
console.log(data);
const getMonthLabels = (start = { year: 0, month: 0, day: 0 }, end = { year: 0, month: 0, day: 0 }, showYears) => {
    const MONTHS = [
        'JAN',
        'FEB',
        'MAR',
        'APR',
        'MAY',
        'JUN',
        'JUL',
        'AUG',
        'SEP',
        'OCT',
        'NOV',
        'DEC'
    ];



    const yearsBetween = end.year - start.year + 1;
    const monthsBetween = end.month  - start.month +1 + 12 * (yearsBetween-1);;

    //We use these months as labels
    const myNames = [];

    for (let index = 0; index < monthsBetween; index++) {
        const currentMonth = start.month + index;
        const currentYear = showYears ? start.year + Math.floor((currentMonth - 1) / 12) : "";
        const element = MONTHS[(currentMonth - 1) % 12];
        myNames.push(`${element} ${currentYear}`);
    }

    return myNames;
}
/**
 * type: Expense, Income

 */

const expensesOrIncomes = (type, budgetData,start = {year:0, month:0, day:0},end = {year:0,month:0,day:0} ) =>{
    const result = new Map([]);

    budgetData
    .filter((element) =>{
        const elementNumericalDate= parseInt(element.year)*10000+parseInt(element.month)*100+parseInt(element.day);
        const startNumericalDate= start.year*10000+start.month*100+start.day;
        const endNumericalDate=end.year*10000+end.month*100+end.day;

        return (element.account_type == type &&
        elementNumericalDate >= startNumericalDate&&
        elementNumericalDate<= endNumericalDate)
    })
    //We don't need to sort, -1 operation
    // .sort((first, second) =>{
    //      const firstNumericalDate= parseInt(first.year)*10000+parseInt(first.month)*100+parseInt(first.day);
    //      const secondNumericalDate= parseInt(second.year)*10000+parseInt(second.month)*100+parseInt(second.day);
        
    //      return firstNumericalDate - secondNumericalDate
        
    //     })
    .forEach(cleanElement => {
        if(result.has(`${cleanElement.year}${cleanElement.month}`)){
            let currentTotal = parseFloat(result.get(`${cleanElement.year}${cleanElement.month}`));
            currentTotal += parseFloat(cleanElement.net_amount);
            result.set(`${cleanElement.year}${cleanElement.month}`, currentTotal.toFixed(2));
        } else {
            result.set(`${cleanElement.year}${cleanElement.month}`, parseFloat(cleanElement.net_amount).toFixed(2));
        }
    })


    const yearsBetween = end.year - start.year + 1;
    const monthsBetween = end.month  - start.month +1 + 12 * (yearsBetween-1);;

    const resultArray = [];
    
    for (let index = 0; index < monthsBetween; index++) {
        let amount = 0;
        const currentMonth = start.month+index;
        const currentYear =start.year + Math.floor((currentMonth-1)/12);

        if(result.has(currentYear.toString() + ((currentMonth-1)%12+1).toString())){
            amount = result.get(currentYear.toString() + ((currentMonth-1)%12+1).toString())
        }

        resultArray.push(amount);
    }

    return resultArray.map(amount => parseFloat(amount).toFixed(2));
}

const overall = (expenseArray, incomeArray) => {
    const result = [];
    let total = 0;
    for (let i = 0; i < expenseArray.length; i++) {
        const expense = parseFloat(expenseArray[i]);
        const income = parseFloat(incomeArray[i]);
        total += income - expense;
        result.push(total.toFixed(2));
    }
    return result;
}
//This double parsing is not needed because the JS api is very well made, but it works so there is no problem in using it.
function newDateFromMonths(date,amount){
    const variableDate = new Date(date);
    return new Date(date.setMonth(date.getMonth()+amount));
}
function dateInFormat(date){
    return {year: date.getFullYear(), month: date.getMonth()+1, day: date.getDate()};
}
const upperSelector = document.querySelector("#chart-upper");
const lowerSelector = document.querySelector("#chart-lower");

const defUpperAmount = parseInt(upperSelector.value);
const defLowerAmount = parseInt(lowerSelector.value);

const startingDate = new Date();

let globUpper = dateInFormat(newDateFromMonths(new Date(), defUpperAmount));
globUpper.day = 31;

let globLower = dateInFormat(newDateFromMonths(new Date(), defLowerAmount));
globLower.day = 1;


 const ctx = document.getElementById('report-chart');
 const chart = new Chart(ctx, {
    type: 'bar',
    data: {
      labels: getMonthLabels(globLower,globUpper,true),
      datasets: [
        {
            type: "line",
            label: 'Overall',
            data: overall(expensesOrIncomes("Expense", data, globLower, globUpper), expensesOrIncomes("Income", data, globLower, globUpper)),
            borderColor: '#3E61BC', // Change the color of the line
            borderWidth: 3, // Increase the width of the line
            pointBackgroundColor: '#3E61BC', // Change the color of the points
            pointRadius: 7.5, // Increase the size of the points on the line
            fill: true // Set to false to not fill under the line
        },
        {
            type:"bar",
            label: 'Income',
            data: expensesOrIncomes("Income",data,globLower,globUpper),
            borderWidth: 1,
            borderColor: '#1ee0ac',
            backgroundColor: '#1ee0ac',
        },
        {
            type:"bar",
            label: 'Expenses',
            data: expensesOrIncomes("Expense",data,globLower,globUpper),
            borderWidth: 1,
            borderColor: '#e85347',
            backgroundColor: '#e85347', 
        },
      ]
    },
    options: {
        scales: {
        y: {
            beginAtZero: true,
            ticks: {
            callback: function(value, index, values) {
                return (value < 0 ? '-$' : '$') + Math.abs(value).toLocaleString(undefined, {
                minimumFractionDigits: 2, 
                maximumFractionDigits: 2
                });
            }
            }
        }
      },
      tooltips: {
        callbacks: {
          label: function(tooltipItem, data) {
            let value = tooltipItem.yLabel;
            return (value < 0 ? '-$' : '$') + Math.abs(value).toLocaleString(undefined, {
                minimumFractionDigits: 2, 
                maximumFractionDigits: 2
              });
          }
        }
      },
      
      annotation: {
        annotations: [{
        type: 'line',
        mode: 'horizontal',
        scaleID: 'y-axis-0',
        value: '10', // Example value where you want the annotation
        borderColor: 'red',
        borderWidth: 2,
        label: {
            enabled: true,
            content: 'Annotation'
        }
        }]
      }
    }
});

function changeData(lower, upper, chart){
    lower.day = 1;
    upper.day = 31;

    chart.data.datasets[0].data = expensesOrIncomes("Income", data,lower, upper);
    chart.data.datasets[1].data = expensesOrIncomes("Expense", data,lower, upper);
    chart.data.datasets[2].data = overall(expensesOrIncomes("Expense", data,lower, upper),expensesOrIncomes("Income", data,lower, upper));
    
    chart.data.labels = getMonthLabels(lower,upper,true);

    chart.update();

    globLower = lower;
    globUpper = upper;
}

upperSelector.addEventListener("input", () =>{
    changeData(
        globLower,
        dateInFormat(newDateFromMonths(new Date(), parseInt(upperSelector.value))),
        chart
        )
});
lowerSelector.addEventListener("input", () =>{
    console.log(dateInFormat(newDateFromMonths(new Date(), parseInt(lowerSelector.value))),new Date(), parseInt(lowerSelector.value))
    changeData(
        dateInFormat(newDateFromMonths(new Date(), parseInt(lowerSelector.value))),
        globUpper,
       
        chart
        )
});
document.addEventListener('DOMContentLoaded', function () {
    const ytdTotals = <?php echo json_encode($ytd_totals); ?>;
    console.log(ytdTotals); // Debugging

    function findYtdTotal(accountName) {
        const record = ytdTotals.find(item => item.name === accountName);
        return record && !isNaN(parseFloat(record.ytd_total)) ? parseFloat(record.ytd_total) : 0;
    }

    let tables = document.querySelectorAll('.budgeting-table');
    tables.forEach(table => {
        let rows = table.querySelectorAll('tbody tr');
        rows.forEach(row => {
            let nameCell = row.querySelector('td[data-name]');
            if (!nameCell) return;

            let ytdCell = row.querySelector('td.ytd-total-cell'); // Identify the existing YTD cell
            if (!ytdCell) return; // If there's no YTD cell, skip the row

            let accountName = nameCell.dataset.name;
            let ytdTotal = findYtdTotal(accountName);

            ytdCell.innerHTML = '$' + ytdTotal.toLocaleString(undefined, { minimumFractionDigits: 2, maximumFractionDigits: 2 });
        });
    });
});

// JavaScript for handling 'Select All' and row checkboxes
document.getElementById('selectAll').addEventListener('click', function(e) {
    var checkboxes = document.querySelectorAll('.rowCheckbox');
    for (var i = 0; i < checkboxes.length; i++) {
        checkboxes[i].checked = e.target.checked;
    }
});

function getSelectedIds() {
    var checkboxes = document.querySelectorAll('.rowCheckbox:checked');
    var ids = [];
    checkboxes.forEach(function(checkbox) {
        ids.push(checkbox.value);
    });
    return ids;
}

function handleBulkAction() {
    var selectedIds = getSelectedIds();
    var newFieldData = 'new value'; // Example of new data to update

    // AJAX call to send the data to the server
    $.ajax({
        url: 'path_to_your_controller_method', // Replace with the actual path
        type: 'POST',
        data: {
            ids: selectedIds,
            newFieldData: newFieldData
        },
        success: function(response) {
            // Handle the response
            console.log(response);
            // Optionally, refresh the page or update the UI
        },
        error: function(xhr, status, error) {
            // Handle errors
            console.error(error);
        }
    });
}

function updateStatus(ids, status) {
    $.ajax({
        url: 'Budget/bulkUpdateStatus', // Replace with the actual URL
        type: 'POST',
        data: { ids: ids, status: status },
        dataType: 'json',
        success: function(response) {
            if (response.status === 'success') {
                alert(response.message);
                // Optionally, refresh the table or page
            } else {
                alert(response.message);
            }
        },
        error: function(xhr, status, error) {
            alert('An error occurred: ' + error);
        }
    });
}

function deleteRecords(ids) {
    $.ajax({
        url: 'Budget/bulkDelete', // Replace with the actual URL
        type: 'POST',
        data: { ids: ids },
        dataType: 'json',
        success: function(response) {
            if (response.status === 'success') {
                alert(response.message);
                // Optionally, refresh the table or page
            } else {
                alert(response.message);
            }
        },
        error: function(xhr, status, error) {
            alert('An error occurred: ' + error);
        }
    });
}

</script>