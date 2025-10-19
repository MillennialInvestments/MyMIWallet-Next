<?php 
// URI Settings
$pageURIA                           = $uri->getSegment(1); 
$pageURIB                           = $uri->getSegment(2); 
// Site Settings 
$beta                               = $siteSettings->beta;
$investmentOperations               = $siteSettings->investmentOperations;
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
// !! MyMI Budget Variable Configuration (applications/libraries/MyMIBudget.php -> Function: all_user_budget_info($cuID)
$userBudgetRecords                  = $userBudget['userBudgetRecords'];
$thisMonthsIncome                   = $userBudget['thisMonthsIncome'];
$thisMonthsIncomeFMT                = $userBudget['thisMonthsIncomeFMT'];
$thisMonthsExpense                  = $userBudget['thisMonthsExpense'];
$thisMonthsExpenseFMT               = $userBudget['thisMonthsExpenseFMT'];
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
    'userAgent'                     => $userAgent,
    'cuID'                          => $cuID,
    'userBudgetRecords'             => $userBudgetRecords,
    'monthlySavingsPercentageFMT'   => $monthlySavingsPercentageFMT,
    'checkingSummaryFMT'            => $checkingSummaryFMT,
    'incomeYTDSummaryFMT'           => $incomeYTDSummaryFMT,
    'expenseYTDSummaryFMT'          => $expenseYTDSummaryFMT,
    'thisMonthsIncomeFMT'           => $thisMonthsIncomeFMT,
    'thisMonthsExpenseFMT'          => $thisMonthsExpenseFMT,
    'thisMonthsSurplusFMT'          => $thisMonthsSurplusFMT,
    'thisMonthsInvestmentsFMT'      => $thisMonthsInvestmentsFMT,
    'thisMonthsInvestmentsSplitFMT' => $thisMonthsInvestmentsSplitFMT,
    'lastMonthsIncomeFMT'           => $lastMonthsIncomeFMT,
    'lastMonthsExpenseFMT'          => $lastMonthsExpenseFMT,
    'lastMonthsSurplusFMT'          => $lastMonthsSurplusFMT,
    'lastMonthsInvestmentsFMT'      => $lastMonthsInvestmentsFMT,
    'totalIncomeFMT'                => $totalIncomeFMT,
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
// if ($userAgent->isBrowser()) {
// echo '
// <div class="nk-block d-none d-sm-block">
//     <div class="row">
//         <div class="d-lg-none d-xl-block col-md-12 col-xl-3 my-sm-3">';
//             echo view('UserModule/Budget/index/control_center', $allViewData);
//         echo '
//         </div><!-- .col -->
//         <div class="d-none d-sm-block col-md-12 col-xl-9 my-sm-3">';
//             echo view('UserModule/Budget/index/overview_chart', $allViewData);
//         echo '
//         </div>
//     </div>
// </div>
// ';
// }
?>
<div id="budgeting-monthly-financial-overview"></div>
<div class="nk-block">
    <div class="row">
        <div class="col-sm-12 col-md-12 my-sm-3">
            <?php
            if ($userAgent->isMobile()) {
                echo '<div class="card h-100">';
            } elseif ($userAgent->isBrowser()) {
                if ($pageURIB === 'Transaction-Modal') {
                    echo '<div class="card h-100">';
                } else {
                    echo '<div class="card card-bordered h-100">';
                }
            };
            ?>
                <div class="card-inner px-2 px-lg-4">
                    <div class="nk-order-ovwg">
                        <?php 
                        if ($userAgent->isBrowser()) {
                            echo '
                        <div class="row g-4 align-end">
                            <div class="col-12">
                                <div class="card-title-group align-start mb-3">
                                    <div class="card-title">
                                        <h6 class="title">Financial History &amp; Overview</h6>
                                        <p>View All Transactions with a <strong>Paid</strong> / <strong>Received</strong> Status.</p>
                                    </div>
                                </div>
                                <div class="card-title-group align-start mb-3">
                                    <div class="card-tools mt-n1 me-n1">
                                        <a class="btn btn-success btn-sm text-white" href="' . site_url('/Budget/Add/Income') . '"><i class="icon ni ni-plus"></i> Income</a>
                                        <a class="btn btn-danger btn-sm text-white" href="' . site_url('/Budget/Add/Expense') . '"><i class="icon ni ni-plus"></i> Expense</a>
                                        <a class="btn btn-outline-secondary btn-sm" href="' . site_url('/Budget') . '"><i class="icon ni ni-history"></i> Current</a>
                                    </div>
                                </div>
                                <!-- <div class="card-title-group align-start mb-3">
                                    <div class="card-tools mt-n1 me-n1">
                                        <ul class="nav nav-pills p-lg-3">
                                            <li class="nav-item">
                                                <a class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">Current</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="true">History</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div> -->
                                <div class="tab-content">
                                    <div class="tab-pane active" id="home" role="tabpanel" aria-labelledby="home-tab">';
                                         echo view('Budget\index\historical_table', $allViewData);
                                        echo '
                                    </div>
                                    <div class="tab-pane" id="profile" role="tabpanel" aria-labelledby="profile-tab">';
                                    //echo view('UserModule/Budget/index/historical_table', $allViewData);
                                    echo '
                                    </div>
                                </div>
                            </div>
                        </div>
                            ';
                        } elseif ($userAgent->isMobile()) {
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
                                                    <a class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="true">History</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div> -->
                                    <div class="tab-content">
                                        <div class="tab-pane active" id="home" role="tabpanel" aria-labelledby="home-tab">';
                                            echo view('UserModule/Budget/index/historical_table', $allViewData);
                                            echo '
                                        </div>
                                        <div class="tab-pane" id="profile" role="tabpanel" aria-labelledby="profile-tab">';
                                        //echo view('UserModule/Budget/index/historical_table', $allViewData);
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
