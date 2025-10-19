<?php
// Site Settings 
$beta                               = $siteSettings->beta;
$investmentOperations               = $siteSettings->investmentOperations;
// User Account Information



// print_r($userBudget); 
// echo '<br><br>';
// print_r($userAccount);
$cuID                               = $userAccount['cuID'];
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
echo '
<div class="nk-block d-none d-sm-block">
    <div class="row">
        <div class="d-lg-none d-xl-block col-md-12 col-xl-3 my-sm-3">';
            echo view('UserModule/Investments/Assessment/assessment_center', $allViewData);
            // echo view('UserModule/Investments/control_center', $allViewData);
        echo '
        </div><!-- .col -->
        <div class="d-none d-sm-block col-md-12 col-xl-9 my-sm-3">';
            echo view('UserModule/Investments/Assessment/assessment_content', $allViewData);
            // echo view('UserModule/Investments/overview_chart', $allViewData);
        echo '
        </div>
    </div>
</div>';
}
?>
