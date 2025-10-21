<?php
// Site Settings 
$beta                               = $siteSettings->beta;
$investmentOperations               = $siteSettings->investmentOperations;
// User Account Information


$userInvestment                     = $_SESSION['allSessionData']['userInvestments'];
$userInvestmentWallets              = $_SESSION['allSessionData']['userWallets']['getUserWallets']['getUserInvestmentWallets'];
// print_r($userInvestment);
// print_r($userBudget); 
// echo '<br><br>';
// print_r($userAccount);
$cuID                               = $userAccount['cuID'];
$cuRole                             = $userAccount['cuRole'];
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
$userInvestmentRecords              = $userInvestment['userInvestmentRecords'];

// print_r('index.php $userInvestmentRecords: ' . $userInvestmentRecords);
$allViewData                        = array(
    'beta'                          => $beta,
    'assetOperations'               => $assetOperations,
    'investmentOperations'          => $investmentOperations,
    'cuID'                          => $cuID,
    'userInvestmentRecords'         => $userInvestmentRecords,
    'userInvestmentWallets'         => $userInvestmentWallets,
    'activeInvestments'             => $activeInvestments,
    'totalUserInvestments'          => $totalUserInvestments,
    'totalTradeValueSum'            => $totalTradeValueSum,
    'totalAssetValueSum'            => $totalAssetValueSum,
    'totalLastTradeValueSum'        => $totalLastTradeValueSum,
    'totalAnnualTradeValueSum'      => $totalAnnualTradeValueSum,
    'totalAnnualTradePerformance'   => $totalAnnualTradePerformance,
    'thisMonthTradePerformance'     => $thisMonthTradePerformance,
    'lastMonthTradePerformance'     => $lastMonthTradePerformance,
    'totalTradeCount'               => $totalTradeCount,
    'totalActiveTradeCount'         => $totalActiveTradeCount,
    'userTopGainers'                => $userTopGainers,
    'userTopGainer'                 => $userTopGainer,
    'userTopLosers'                 => $userTopLosers,
    'userTopLoser'                  => $userTopLoser,
    'userCurrentAnnualValue'        => $userCurrentAnnualValue,
    'userCurrentAnnualPerformance'  => $userCurrentAnnualPerformance,
    'userCurrentAnnualTarget'       => $userCurrentAnnualTarget,
    'totalUserAssetsValue'          => $totalUserAssetsValue,
    'totalUserAssetsCount'          => $totalUserAssetsCount,
    'totalUserAssetPerformance'     => $totalUserAssetPerformance,
    'totalMonthlyTradesCount'       => $totalMonthlyTradesCount,
    'totalAssetCount'               => $totalAssetCount,
    'totalGrowth'                   => $totalGrowth,
);
// print_r($userInvestmentRecords);
// print_r($userInvestmentRecords[0]);
// print_r($userInvestmentRecords[2]);
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

// <div class="nk-block">
//     <div class="row g-gs">
//         <div class="d-lg-none d-xl-block col-md-12 col-xl-3 my-sm-3">';
//         echo view('User/Investments/index/Action_Center', $allViewData);
//         echo '
//         </div><!-- .col -->
//         <div class="d-none d-sm-block col-md-12 col-xl-9 my-sm-3">';
//         echo view('User/Investments/index/Performance_Overview', $allViewData);
//         echo '
//         </div><!-- .col -->
//         <div class="col-xl-7 col-xxl-8">';
//             echo view('User/Investments/index/Recent_Trades', $allViewData);
//         echo '
//         </div><!-- .col -->
//         <div class="col-xl-5 col-xxl-4">
//             <div class="row g-gs">
//                 <div class="col-md-6 col-lg-12">';
//                 // Uncomment This: echo view('User/Investments/index/Top_Trades', $allViewData);
//                 echo '
//                 </div><!-- .col -->
//                 <div class="col-md-6 col-lg-12">';
//                     echo view('User/Investments/index/Custom_Watchlist', $allViewData);
//                 echo '
//                 </div><!-- .col -->
//             </div><!-- .row -->
//         </div><!-- .col -->
//     </div><!-- .row -->
// </div><!-- .nk-block -->
// ';
echo '

<div class="nk-block">
    <div class="row g-gs">
        <div class="d-none d-lg-block col-md-12 col-xl-3 my-sm-3">';
        echo view('User/Investments/index/Action_Center', $allViewData);
        echo '
        </div><!-- .col -->
        <div class="d-none d-sm-block col-md-12 col-xl-9 my-sm-3">';
        echo view('User/Investments/index/Performance_Overview', $allViewData);
        echo '
        </div><!-- .col -->
    </div>
    <div class="row g-gs">
        <div class="col-12">';
            echo view('User/Investments/index/Recent_Trades', $allViewData);
        echo '
        </div><!-- .col -->
    </div><!-- .row -->
</div><!-- .nk-block -->
';
}
?>
<div id="budgeting-monthly-financial-overview"></div>
