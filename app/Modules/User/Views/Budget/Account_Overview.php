<?php if ($uri->getSegment(2) === 'Expense') {echo view('App\Views\errors\html\under_construction');} ?>
<?php
// !! Get Total Account Summary based on Budget Type
// !! Make alternations based on wheteher Account View is Income | Expense
// $managementActionItems           = $siteSettings->managementActionItems;
// log_message('info', 'Budget/Account_Overview L5 - $userBudget: ' . print_r($userBudget, true));

$userBudgetRecords              = $userBudget['userBudgetRecords'];
$totalIncome                    = $userBudget['totalIncome'] ?? 0;
$totalExpenses                  = $userBudget['totalExpense'] ?? 0;
$totalInvestmentsFMT            = $userBudget['totalInvestmentsFMT'] ?? 'N/A';
$thisMonthsIncome               = $userBudget['thisMonthsIncome'] ?? 0;
$thisMonthsIncomeFMT            = $userBudget['thisMonthsIncomeFMT'] ?? 'N/A';
$thisMonthsExpense              = $userBudget['thisMonthsExpense'] ?? 0;
$thisMonthsExpenseFMT           = $userBudget['thisMonthsExpenseFMT'] ?? 'N/A';
$thisMonthsSurplus              = $userBudget['thisMonthsSurplus'] ?? 0;
$thisMonthsSurplusFMT           = $userBudget['thisMonthsSurplusFMT'] ?? 'N/A';
$thisMonthsInvestments          = $userBudget['thisMonthsInvestments'] ?? 0;
$thisMonthsInvestmentsFMT       = $userBudget['thisMonthsInvestmentsFMT'] ?? 'N/A';
$thisMonthsInvestmentsSplitFMT  = $userBudget['thisMonthsInvestmentsSplitFMT'] ?? 'N/A';
$lastMonthsIncome               = $userBudget['lastMonthsIncome'] ?? 0;
$lastMonthsIncomeFMT            = $userBudget['lastMonthsIncomeFMT'] ?? 'N/A';
$lastMonthsExpense              = $userBudget['lastMonthsExpense'] ?? 0;
$lastMonthsExpenseFMT           = $userBudget['lastMonthsExpenseFMT'] ?? 'N/A';
$lastMonthsSurplus              = $userBudget['lastMonthsSurplus'] ?? 0;
$lastMonthsSurplusFMT           = $userBudget['lastMonthsSurplusFMT'] ?? 'N/A';
$lastMonthsInvestments          = $userBudget['lastMonthsInvestments'] ?? 0;
$lastMonthsInvestmentsFMT       = $userBudget['lastMonthsInvestmentsFMT'] ?? 'N/A';
$lastYTDTotalIncome             = $userAccount['lastYTDTotalIncome'] ?? 0;
$lastYTDTotalIncomeFMT          = $userBudget['lastYTDTotalIncomeFMT'] ?? 'N/A';
$lastYTDTotalExpense            = $userBudget['lastYTDTotalExpense'] ?? 0;
$lastYTDTotalExpenseFMT         = $userBudget['lastYTDTotalExpenseFMT'] ?? 'N/A';
$lastYTDTotalSurplus            = $userBudget['lastYTDTotalSurplus'] ?? 0;
$lastYTDTotalSurplusFMT         = $userBudget['lastYTDTotalSurplusFMT'] ?? 'N/A';
$lastYTDTotalInvestments        = $userBudget['lastYTDTotalInvestments'] ?? 0;
$lastYTDTotalInvestmentsFMT     = $userBudget['lastYTDTotalInvestmentsFMT'] ?? 'N/A';
$incomeYTDSummary               = $userBudget['incomeYTDSummary'] ?? 'N/A';
$incomeYTDSummaryFMT            = $userBudget['incomeYTDSummaryFMT'] ?? 'N/A';
$expenseYTDSummary              = $userBudget['expenseYTDSummary'] ?? 'N/A';
$expenseYTDSummaryFMT           = $userBudget['expenseYTDSummaryFMT'] ?? 'N/A';
$startOfCurrentPeriod           = date('Y-m-d H:i:s', strtotime(date('Y-m-01')));
$threeMonthExpenses             = $totalExpenses * 3;
$sixMonthExpenses               = $totalExpenses * 6;
$twelveMonthExpenses            = $totalExpenses * 12;
$totalSurplus                   = $userBudget['totalSurplus'] ?? 0;
$totalSurplusFMT                = $userBudget['totalSurplusFMT'] ?? 'N/A';
$totalInvestPercentage          = 0.2;
$totalInvestments               = $userBudget['totalInvestments'] ?? 0;
$totalInvestmentsFMT            = $userBudget['totalInvestmentsFMT'] ?? 'N/A';

// $getSources                     = $userBudget; // Ensure $getSources is correctly populated with source data
$userSourceRecords              = $getSourceRecords; // Ensure this is your source records data
$sources                        = [];
$lastSources                    = []; // Populate this with your last period source data if available
$totalSourceBreakdown           = 0;
$totalSourceAccount             = 0;

if ($budgetType === 'Income') {
    $oppBudgetType              = 'Expenses';
    $thisMonthsTotal            = $thisMonthsIncomeFMT;
    $lastMonthsTotal            = $lastMonthsIncomeFMT;
    $thisMonthsOppTotal         = $thisMonthsExpenseFMT;
    $lastMonthsOptTotal         = $lastMonthsExpenseFMT;
    // $ytdTotal                   = $totalIncome;
    // $lastMonthsTotal            = 
} elseif ($budgetType === 'Expenses') {
    $budgetType                 = 'Expenses';
    $oppBudgetType              = 'Income';
    $thisMonthsTotal            = $thisMonthsExpenseFMT;
    $lastMonthsTotal            = $lastMonthsExpenseFMT;
    $thisMonthsOppTotal         = $thisMonthsIncomeFMT;
    $lastMonthsOptTotal         = $lastMonthsIncomeFMT;
}
function calculateChange($current, $last) {
    if ($last == 0) {
        return $current * 100;
    }
    return (($current - $last) / $last) * 100;
}

$colors = ["#798bff", "#baaeff", "#7de1f8"];
$colorIndex = 0;
$uniqueSources = [];

foreach ($userSourceRecords as $source) {
    $sourceType = $source['source_type'];
    $amount = $source['net_amount'];
    $totalSourceAccount += $amount;
    if (!array_key_exists($sourceType, $sources)) {
        $sources[$sourceType] = 0;
    }
    $sources[$sourceType] += $amount;
}

$sourceBreakdown = [];

foreach ($sources as $sourceType => $amount) {
    $lastAmount = array_key_exists($sourceType, $lastSources) ? $lastSources[$sourceType] : 0;
    $change = calculateChange($amount, $lastAmount);
    $percentage = ($amount / $totalSourceAccount) * 100;
    $sourceBreakdown[] = [
        'source_type' => $sourceType,
        'percentage' => number_format($percentage, 2),
        'color' => $colors[$colorIndex],
        'change' => number_format($change, 2)
    ];
    $colorIndex = ($colorIndex + 1) % count($colors);
}

// log_message('info', 'Budget/Account_Overview L87 - $sourceBreakdown: ' . print_r($sourceBreakdown, true));

$viewFileData = [
    'cuID' => $cuID,
    'accountType' => $accountType,
    'budgetType' => $budgetType, 
    'oppBudgetType' => $oppBudgetType,
    'userBudgetRecords' => $userBudgetRecords,
    'thisMonthsIncome' => $thisMonthsIncome,
    'thisMonthsExpense' => $thisMonthsExpense,
    'thisMonthsExpenseFMT' => $thisMonthsExpenseFMT,
    'thisMonthsSurplus' => $thisMonthsSurplus,
    'thisMonthsSurplusFMT' => $thisMonthsSurplusFMT,
    'thisMonthsInvestments' => $thisMonthsInvestments,
    'thisMonthsInvestmentsFMT' => $thisMonthsInvestmentsFMT,
    'thisMonthsInvestmentsSplitFMT' => $thisMonthsInvestmentsSplitFMT,
    'lastMonthsIncome' => $lastMonthsIncome,
    'lastMonthsIncomeFMT' => $lastMonthsIncomeFMT,
    'lastMonthsExpense' => $lastMonthsExpense,
    'lastMonthsExpenseFMT' => $lastMonthsExpenseFMT,
    'lastMonthsSurplus' => $lastMonthsSurplus,
    'lastMonthsSurplusFMT' => $lastMonthsSurplusFMT,
    'lastMonthsInvestments' => $lastMonthsInvestments,
    'lastMonthsInvestmentsFMT' => $lastMonthsInvestmentsFMT,
    'lastYTDTotalIncome' => $lastYTDTotalIncome,
    'lastYTDTotalIncomeFMT' => $lastYTDTotalIncomeFMT,
    'lastYTDTotalExpense' => $lastYTDTotalExpense,
    'lastYTDTotalExpenseFMT' => $lastYTDTotalExpenseFMT,
    'lastYTDTotalSurplus' => $lastYTDTotalSurplus,
    'lastYTDTotalSurplusFMT' => $lastYTDTotalSurplusFMT,
    'lastYTDTotalInvestments' => $lastYTDTotalInvestments,
    'lastYTDTotalInvestmentsFMT' => $lastYTDTotalInvestmentsFMT,
    'thisMonthsTotal' => $thisMonthsTotal,
    'lastMonthsTotal' => $lastMonthsTotal,
    'thisMonthsOppTotal' => $thisMonthsOppTotal,
    'lastMonthsOptTotal' => $lastMonthsOptTotal,
    'totalIncome' => $totalIncome,
    'totalExpenses' => $totalExpenses,
    'totalSurplus' => $totalSurplus,
    'totalSurplusFMT' => $totalSurplusFMT,
    'totalInvestments' => $totalInvestments,
    'totalInvestmentsFMT' => $totalInvestmentsFMT,
    'incomeYTDSummary' => $incomeYTDSummary,
    'incomeYTDSummaryFMT' => $incomeYTDSummaryFMT,
    'expenseYTDSummary' => $expenseYTDSummary,
    'expenseYTDSummaryFMT' => $expenseYTDSummaryFMT,
    // 'getSources' => $getSources,
    'sourceBreakdown' => $sourceBreakdown,
    'userSourceRecords' => $userSourceRecords,
];

// log_message('info', 'Budget/Account_Overview L148 - $viewFileData: ' . print_r($viewFileData, true));

?><style <?= $nonce['style'] ?? '' ?>>.nk-order-ovwg-data.income{border-color:#8ff0d6}.nk-order-ovwg-data.expenses{border-color:#e85347}.nk-order-ovwg-data.surplus{border-color:#84b8ff}.nk-order-ovwg-data.investments{border-color:#f4bd0e}</style>
<div class="nk-block">
    <div class="row">
        <div class="col-lg-4">
            <?php echo view('UserModule\Views\Budget\Account_Overview\action_center', $viewFileData); ?>
        </div>
        <div class="col-lg-8">
            <?php echo view('UserModule\Views\Budget\Account_Overview\monthly_overview', $viewFileData); ?>
        </div>
    </div>
</div>
<div class="nk-block">
    <div class="row">
        <div class="col-lg-4 col-sm-6">
            <?php echo view('UserModule\Views\Budget\Account_Overview\source_breakdown', $viewFileData); ?>
        </div>
        <div class="col-lg-8 col-sm-6">
            <?php echo view('UserModule\Views\Budget\Account_Overview\history_overview', $viewFileData); ?>
        </div>
    </div>
</div>
