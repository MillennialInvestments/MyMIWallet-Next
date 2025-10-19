<?php
// Time Configurations
$current_year = date('Y');
// FIX these:
$thisMonth = strtotime(date("m/1/Y"));
$sixMonthsAgo   = date('m/1/Y', strtotime('-6 months', $thisMonth));
$sixMonthsAhead = date('m/1/Y', strtotime('+6 months', $thisMonth));

// 'dd' is not valid; use DateTime diff for days left in year:
$daysLeft  = (new DateTime($end_of_year))->diff(new DateTime($current_date))->days;
$weeksLeft = ceil($daysLeft / 7);
$monthsLeft = 12 - date('m');
$last_year = date('Y') - 1;
$next_year = date('Y') + 1;
$current_date = date('m/d/Y');
$last_year_date = date('m/d' . $last_year);
$next_year_date = date('m/d' . $next_year);
$end_of_year = date('m/d/Y', strtotime('12/31'));
$start_of_year = date('m/d/Y', strtotime('1/1'));
$start_of_last_year = date('m/d/Y', strtotime('1/1/' . $last_year));
$start_of_next_year = date('m/d/Y', strtotime('1/1/' . $next_year));
$start_of_month = date('m/1/Y');
$end_of_month = date('m/t/Y');
$start_of_last_month = date('m/1/Y', strtotime('-1 month', $thisMonth));
$end_of_last_month = date('m/t/Y', strtotime('-1 month', $thisMonth));
$start_of_next_month = date('m/1/Y', strtotime('+1 month', $thisMonth));
$end_of_next_month = date('m/t/Y', strtotime('+1 month', $thisMonth));
$start_of_six_months_ago = date('m/1/Y', strtotime('-6 months', $thisMonth));
$end_of_six_months_ago = date('m/t/Y', strtotime('-1 month', strtotime($start_of_six_months_ago)));
$start_of_six_months_ahead = date('m/1/Y', strtotime('+1 month', $thisMonth));
$end_of_six_months_ahead = date('m/t/Y', strtotime('+6 months', $thisMonth));
$start_of_three_months_ago = date('m/1/Y', strtotime('-3 months', $thisMonth));
$end_of_three_months_ago = date('m/t/Y', strtotime('-1 month', strtotime($start_of_three_months_ago)));
$start_of_three_months_ahead = date('m/1/Y', strtotime('+1 month', $thisMonth));
$end_of_three_months_ahead = date('m/t/Y', strtotime('+3 months', $thisMonth));

// Get User Investor Profile Savings Percentage
$monthlySavingsPercentage = 0.3;
$monthlySavingsPercentageFMT = number_format($monthlySavingsPercentage * 100, 0) . '%';

// Budget Variables
if($debug === 1) {
    log_message('debug', 'Budget\index L23 - $userBudget Array: ' . (print_r($userBudget, true))); 
}
$userBudgetRecords = $userBudget['userBudgetRecords'];
$userActiveBudgetRecords = $userBudget['userActiveBudgetRecords'];
$thisMonthsIncome = $userBudget['thisMonthsIncome'];
$thisMonthsIncomeFMT = $userBudget['thisMonthsIncomeFMT'];
$thisMonthsExpense = $userBudget['thisMonthsExpense'];
$thisMonthsExpenseFMT = $userBudget['thisMonthsExpenseFMT'];
$thisMonthsSurplus = $userBudget['thisMonthsSurplus'];
$thisMonthsSurplusFMT = $userBudget['thisMonthsSurplusFMT'];
$thisMonthsInvestments = $userBudget['thisMonthsInvestments'];
$thisMonthsInvestmentsFMT = $userBudget['thisMonthsInvestmentsFMT'];
$thisMonthsInvestmentsSplitFMT = $userBudget['thisMonthsInvestmentsSplitFMT'];
$lastMonthsIncome = $userBudget['lastMonthsIncome'];
$lastMonthsIncomeFMT = $userBudget['lastMonthsIncomeFMT'];
$lastMonthsExpense = $userBudget['lastMonthsExpense'];
$lastMonthsExpenseFMT = $userBudget['lastMonthsExpenseFMT'];
$lastMonthsSurplus = $userBudget['lastMonthsSurplus'];
$lastMonthsSurplusFMT = $userBudget['lastMonthsSurplusFMT'];
$lastMonthsInvestments = $userBudget['lastMonthsInvestments'];
$lastMonthsInvestmentsFMT = $userBudget['lastMonthsInvestmentsFMT'];
$nextMonthsIncome = $userBudget['nextMonthsIncome'];
$nextMonthsIncomeFMT = $userBudget['nextMonthsIncomeFMT'];
$nextMonthsExpense = $userBudget['nextMonthsExpense'];
$nextMonthsExpenseFMT = $userBudget['nextMonthsExpenseFMT'];
$nextMonthsSurplus = $userBudget['nextMonthsSurplus'];
$nextMonthsSurplusFMT = $userBudget['nextMonthsSurplusFMT'];
$nextMonthsInvestments = $userBudget['nextMonthsInvestments'];
$nextMonthsInvestmentsFMT = $userBudget['nextMonthsInvestmentsFMT'];
$totalIncome = $userBudget['totalIncome'];
$totalIncomeFMT = $userBudget['totalIncomeFMT'];
$totalExpense = $userBudget['totalExpense'];
$totalExpenseFMT = $userBudget['totalExpenseFMT'];
$totalSurplus = $userBudget['totalSurplus'];
$totalSurplusFMT = $userBudget['totalSurplusFMT'];
$totalInvestments = $userBudget['totalInvestments'];
$totalInvestmentsFMT = $userBudget['totalInvestmentsFMT'];
$checkingSummary = $userBudget['checkingSummary'];
$checkingSummaryFMT = $userBudget['checkingSummaryFMT'];
$incomeYTDSummary = $userBudget['incomeYTDSummary'];
$incomeYTDSummaryFMT = $userBudget['incomeYTDSummaryFMT'];
$expenseYTDSummary = $userBudget['expenseYTDSummary'];
$expenseYTDSummaryFMT = $userBudget['expenseYTDSummaryFMT'];
$creditLimit = $userBudget['creditLimit'];
$creditLimitFMT = $userBudget['creditLimitFMT'];
$creditAvailable = $userBudget['creditAvailable'];
$creditAvailableFMT = $userBudget['creditAvailableFMT'];
$debtSummary = $userBudget['debtSummary'];
$debtSummaryFMT = $userBudget['debtSummaryFMT'];
$investSummary = $userBudget['investSummary'];
$investSummaryFMT = $userBudget['investSummaryFMT'];
$totalAccountBalance = $userBudget['totalAccountBalance'];
$totalAccountBalanceFMT = $userBudget['totalAccountBalanceFMT'];

$allViewData = array(
    'beta' => $siteSettings->beta,
    'debug' => $siteSettings->debug,
    'investmentOperations' => $siteSettings->investmentOperations,
    'stage' => $siteSettings->stage, 
    'cuID' => $cuID,
    'userBudgetRecords' => $userBudgetRecords,
    'userActiveBudgetRecords' => $userActiveBudgetRecords,
    'monthlySavingsPercentageFMT' => $monthlySavingsPercentageFMT,
    'checkingSummaryFMT' => $checkingSummaryFMT,
    'incomeYTDSummaryFMT' => $incomeYTDSummaryFMT,
    'expenseYTDSummaryFMT' => $expenseYTDSummaryFMT,
    'thisMonthsIncomeFMT' => $thisMonthsIncomeFMT,
    'thisMonthsExpense' => $thisMonthsExpense,
    'thisMonthsExpenseFMT' => $thisMonthsExpenseFMT,
    'thisMonthsSurplusFMT' => $thisMonthsSurplusFMT,
    'thisMonthsInvestmentsFMT' => $thisMonthsInvestmentsFMT,
    'thisMonthsInvestmentsSplitFMT' => $thisMonthsInvestmentsSplitFMT,
    'lastMonthsIncomeFMT' => $lastMonthsIncomeFMT,
    'lastMonthsExpense' => $lastMonthsExpense,
    'lastMonthsExpenseFMT' => $lastMonthsExpenseFMT,
    'lastMonthsSurplusFMT' => $lastMonthsSurplusFMT,
    'lastMonthsInvestmentsFMT' => $lastMonthsInvestmentsFMT,
    'nextMonthsIncomeFMT' => $nextMonthsIncomeFMT,
    'nextMonthsExpense' => $nextMonthsExpense,
    'nextMonthsExpenseFMT' => $nextMonthsExpenseFMT,
    'nextMonthsSurplusFMT' => $nextMonthsSurplusFMT,
    'nextMonthsInvestmentsFMT' => $nextMonthsInvestmentsFMT,
    'totalIncomeFMT' => $totalIncomeFMT,
    'totalExpense' => $totalExpense,
    'totalExpenseFMT' => $totalExpenseFMT,
    'totalSurplusFMT' => $totalSurplusFMT,
    'totalInvestmentsFMT' => $totalInvestmentsFMT,
    'checkingSummary' => $checkingSummary,
    'checkingSummaryFMT' => $checkingSummaryFMT,
    'creditLimit' => $creditLimit,
    'creditLimitFMT' => $creditLimitFMT,
    'creditAvailable' => $creditAvailable,
    'creditAvailableFMT' => $creditAvailableFMT,
    'debtSummary' => $debtSummary,
    'debtSummaryFMT' => $debtSummaryFMT,
    'investSummary' => $investSummary,
    'investSummaryFMT' => $investSummaryFMT,
    'currentBalances' => $currentBalances,
    'availableBalances' => $availableBalances,
    'repaymentSchedules' => $repaymentSchedules,
    'repaymentSummary' => $repaymentSummary,
    'totalAccountBalance' => $totalAccountBalance,
    'totalAccountBalanceFMT' => $totalAccountBalanceFMT,
    'userAgent' => $userAgent,
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
$debug = 1;
$segment3 = (isset($uri) && count($uri->getSegments()) >= 3) ? $uri->getSegment(3) : null;
$searchQuery = $segment3;

if ($debug === 1) {
    log_message('debug', 'Budget\\index View - Search Segment: ' . var_export($segment3, true));
    log_message('debug', 'Budget\\index View - Initial userActiveBudgetRecords Count: ' . count($userActiveBudgetRecords));
}

if (!empty($searchQuery)) {
    $searchQueryLower = strtolower($searchQuery);
    $monthMap = [
        'january' => 1, 'february' => 2, 'march' => 3,
        'april' => 4, 'may' => 5, 'june' => 6,
        'july' => 7, 'august' => 8, 'september' => 9,
        'october' => 10, 'november' => 11, 'december' => 12
    ];

    $searchQueryLower = strtolower($searchQuery);
    $searchMonthNumber = $monthMap[$searchQueryLower] ?? null;
    $userActiveBudgetRecords = array_filter($userActiveBudgetRecords, function($record) use ($searchQueryLower, $searchMonthNumber) {
        return (
            stripos($record['name'] ?? '', $searchQueryLower) !== false ||
            stripos($record['source_type'] ?? '', $searchQueryLower) !== false ||
            stripos($record['designated_date'] ?? '', $searchQueryLower) !== false ||
            (isset($record['month']) && (int)$record['month'] === $searchMonthNumber)
        );
    });


    if ($debug === 1) {
        log_message('debug', 'Budget\\index View - Enhanced Filtered Count: ' . count($userActiveBudgetRecords));
        log_message('debug', 'Budget\\index View - Enhanced Filtered Records: ' . print_r(array_slice($userActiveBudgetRecords, 0, 5), true));
    }
}


?>

<?php if (!empty($searchQuery)): ?>
    <!-- SEARCH MODE ONLY VIEW -->
    <div class="card card-bordered">
        <div class="card-inner">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h6 class="title">Search Budget Records</h6>
                <div class="input-group" style="max-width: 300px;">
                    <input type="text" class="form-control" id="searchInputField" value="<?= esc($searchQuery) ?>" placeholder="Search budget..." />
                    <button class="btn btn-primary" id="redirectSearchBtn">Search</button>
                </div>
            </div>

            <div class="table-responsive">
                <table class="table table-striped" id="userBudgetingDatatable">
                    <thead>
                        <tr>
                            <th>Due Date</th>
                            <th>Account</th>
                            <th>Source</th>
                            <th>Amount</th>
                            <th>Subtotal</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($userActiveBudgetRecords as $account): 
                            $accountDate = DateTime::createFromFormat('m/d/Y', $account['designated_date']);
                            $formattedDate = $accountDate ? $accountDate->format('F jS, Y') : 'Invalid Date';
                            $sum += $account['net_amount'] ?? 0;
                            $displaySum = $sum >= 0 ? '$' . number_format($sum, 2) : '<span class="statusRed">$' . number_format(-$sum, 2) . '</span>';
                            $accountPaidStatus = $account['paid'] ? '' : '<a href="' . site_url('Budget/Status/Paid/' . $account['id']) . '"><i class="icon ni ni-check-thick"></i></a>';
                        ?>
                            <tr>
                                <td data-order="<?= date('Y-m-d', strtotime($account['designated_date'])) ?>">
                                    <?= $formattedDate ?>
                                </td>
                                <td><a href="<?= site_url('Budget/Details/' . $account['id']) ?>"><?= $account['name'] ?></a></td>
                                <td><?= $account['source_type'] ?></td>
                                <td>$<?= number_format($account['net_amount'], 2) ?></td>
                                <td><?= $displaySum ?></td>
                                <td>
                                    <?= $accountPaidStatus ?>
                                    <a href="<?= site_url('Budget/Edit/' . $account['id']) ?>"><i class="icon ni ni-edit"></i></a>
                                    <a href="<?= site_url('Budget/Copy/' . $account['id']) ?>"><i class="icon ni ni-copy"></i></a>
                                    <a href="<?= site_url('Budget/Delete-Account/' . $account['id']) ?>" class="text-red"><i class="icon ni ni-trash"></i></a>
                                </td>
                            </tr>
                        <?php endforeach; ?>

                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- After your search redirect script -->
    <script <?= $nonce['script'] ?? '' ?>>
        $('#redirectSearchBtn').on('click', function () {
            const val = $('#searchInputField').val().trim();
            if (val !== '') {
                window.location.href = `<?=site_url('Budget/Search/')?>${encodeURIComponent(val)}`;
            }
        });

        // $(document).ready(function () {
        //     $('#userBudgetingDatatable').DataTable({
        //         paging: true,
        //         searching: true,
        //         ordering: [[0,'asc']],
        //         lengthMenu: [[25, 50, 100, 500, -1], [25, 50, 100, 500, "All"]],
        //         info: true
        //     });
        // });
    </script>

<?php else: ?>
    <!-- DEFAULT FULL PAGE VIEW -->
    <?php 
    if ($userAgent->isBrowser()) {
    ?>
    <div class="nk-block d-none d-sm-block">
        <div class="row">
            <div class="d-none d-md-block col-md-12 col-xl-3 my-sm-3">
                <?php echo view('Budget\index\control_center', $allViewData); ?>
            </div>
            <div class="d-none d-sm-block col-md-12 col-xl-9 my-sm-3">
                <?php echo view('Budget\index\overview_chart', $allViewData); ?>
            </div>
        </div>
    </div>
    <?php
    }
    ?>
    <div id="budgeting-monthly-financial-overview"></div>
    <div class="nk-block">
        <div class="row">
            <div class="col-sm-12 col-md-12 my-sm-3">
                <?php
                if ($userAgent->isMobile()) {
                    echo view('UserModule/Budget/index\mobile_table', $allViewData);
                } elseif ($userAgent->isBrowser()) {
                    echo view('UserModule/Budget/index\browser_table', $allViewData);
                };
                ?>
            </div>
        </div>
    </div>
    <!-- Keep all your original Monthly Overview content here -->
<?php endif; ?>


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
<!-- <script <?= $nonce['script'] ?? '' ?>>
document.addEventListener('DOMContentLoaded', function () {
    // Safely parse the JSON data from hidden divs
    const budgetData = JSON.parse(document.querySelector("#budget-data").textContent || '[]');
    const creditData = JSON.parse(document.querySelector("#credit-data").textContent || '{}');
    const availableData = JSON.parse(document.querySelector("#available-data").textContent || '[]');
    const repaymentSummary = JSON.parse(document.querySelector("#repayment-summary").textContent || '{}');

    // Helper function to generate month labels
    const getMonthLabels = (start, end, showYears) => {
        const MONTHS = ['JAN', 'FEB', 'MAR', 'APR', 'MAY', 'JUN', 'JUL', 'AUG', 'SEP', 'OCT', 'NOV', 'DEC'];
        let labels = [];
        let currentMonth = start.month;
        let currentYear = start.year;

        while (currentYear < end.year || (currentYear === end.year && currentMonth <= end.month)) {
            labels.push(showYears ? `${MONTHS[currentMonth - 1]} ${currentYear}` : MONTHS[currentMonth - 1]);
            currentMonth++;
            if (currentMonth > 12) {
                currentMonth = 1;
                currentYear++;
            }
        }
        return labels;
    };

    // Extract incomes or expenses data based on type
    const extractData = (type, data, start, end) => {
        const result = new Array(getMonthLabels(start, end, false).length).fill(0);

        data.forEach(record => {
            const recordDate = new Date(record.year, record.month - 1, record.day);
            if (record.account_type === type && recordDate >= new Date(start.year, start.month - 1) && recordDate <= new Date(end.year, end.month - 1)) {
                const index = (record.year - start.year) * 12 + (record.month - start.month);
                result[index] += parseFloat(record.net_amount);
            }
        });
        return result;
    };

    // Function to calculate overall (net) performance
    const calculateOverall = (expenses, incomes) => incomes.map((income, i) => (income - expenses[i]).toFixed(2));

    // Get balances for credit and available data
    const getBalances = (data, start, end) => {
        const result = new Map();
        
        // Check if data is an object or array and iterate accordingly
        if (Array.isArray(data)) {
            data.forEach(cleanElement => {
                const yearMonth = cleanElement.date.replace('-', '');
                if (result.has(yearMonth)) {
                    let currentTotal = parseFloat(result.get(yearMonth));
                    currentTotal += parseFloat(cleanElement.balance);
                    result.set(yearMonth, currentTotal.toFixed(2));
                } else {
                    result.set(yearMonth, parseFloat(cleanElement.balance).toFixed(2));
                }
            });
        } else if (typeof data === 'object' && data !== null) {
            // Iterate over object keys if data is an object
            for (const [key, value] of Object.entries(data)) {
                const yearMonth = key.replace('-', '');
                result.set(yearMonth, parseFloat(value).toFixed(2));
            }
        }

        const yearsBetween = end.year - start.year + 1;
        const monthsBetween = end.month - start.month + 1 + 12 * (yearsBetween - 1);
        const resultArray = [];
        
        for (let index = 0; index < monthsBetween; index++) {
            let amount = 0;
            const currentMonth = start.month + index;
            const currentYear = start.year + Math.floor((currentMonth - 1) / 12);
            const yearMonth = currentYear.toString() + ((currentMonth - 1) % 12 + 1).toString();
            
            if (result.has(yearMonth)) {
                amount = result.get(yearMonth);
            }
            resultArray.push(amount);
        }
        return resultArray.map(amount => parseFloat(amount).toFixed(2));
    };


    // Date helper functions
    const adjustMonths = (date, months) => new Date(date.setMonth(date.getMonth() + months));
    const formatDate = (date) => ({ year: date.getFullYear(), month: date.getMonth() + 1 });

    // Set the initial range based on the selectors
    const upperSelector = document.querySelector("#chart-upper");
    const lowerSelector = document.querySelector("#chart-lower");

    const upperAmount = parseInt(upperSelector.value);
    const lowerAmount = parseInt(lowerSelector.value);

    let startDate = formatDate(adjustMonths(new Date(), lowerAmount));
    let endDate = formatDate(adjustMonths(new Date(), upperAmount));

    // Initialize Chart.js
    const ctx = document.getElementById('report-chart').getContext('2d');
    const chart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: getMonthLabels(startDate, endDate, true),
            datasets: [
                {
                    type: 'line',
                    label: 'Overall',
                    data: calculateOverall(extractData('Expense', budgetData, startDate, endDate), extractData('Income', budgetData, startDate, endDate)),
                    borderColor: '#3E61BC',
                    borderWidth: 3,
                    pointBackgroundColor: '#3E61BC',
                    fill: true
                },
                {
                    type: 'bar',
                    label: 'Income',
                    data: extractData('Income', budgetData, startDate, endDate),
                    backgroundColor: '#1ee0ac',
                    borderColor: '#1ee0ac',
                    borderWidth: 1
                },
                {
                    type: 'bar',
                    label: 'Expenses',
                    data: extractData('Expense', budgetData, startDate, endDate),
                    backgroundColor: '#e85347',
                    borderColor: '#e85347',
                    borderWidth: 1
                },
                {
                    type: 'bar',
                    label: 'Credit Available',
                    data: getBalances(creditData, startDate, endDate),
                    backgroundColor: '#7f8c8d',
                    borderColor: '#7f8c8d',
                    borderWidth: 1,
                    stack: 'credit'
                },
                {
                    type: 'bar',
                    label: 'Available Balance',
                    data: getBalances(availableData, startDate, endDate),
                    backgroundColor: '#3498db',
                    borderColor: '#3498db',
                    borderWidth: 1,
                    stack: 'credit'
                },
                {
                    type: 'bar',
                    label: 'Repayment Summary',
                    data: getBalances(repaymentSummary, startDate, endDate),
                    backgroundColor: '#f39c12',
                    borderColor: '#f39c12',
                    borderWidth: 1,
                    stack: 'credit'
                }
            ]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: {
                        callback: (value) => `$${value.toLocaleString()}`
                    }
                }
            }
        }
    });

    // Function to update chart data
    const updateChartData = () => {
        startDate = formatDate(adjustMonths(new Date(), parseInt(lowerSelector.value)));
        endDate = formatDate(adjustMonths(new Date(), parseInt(upperSelector.value)));

        chart.data.labels = getMonthLabels(startDate, endDate, true);
        chart.data.datasets[0].data = calculateOverall(extractData('Expense', budgetData, startDate, endDate), extractData('Income', budgetData, startDate, endDate));
        chart.data.datasets[1].data = extractData('Income', budgetData, startDate, endDate);
        chart.data.datasets[2].data = extractData('Expense', budgetData, startDate, endDate);
        chart.data.datasets[3].data = getBalances(creditData, startDate, endDate);
        chart.data.datasets[4].data = getBalances(availableData, startDate, endDate);
        chart.data.datasets[5].data = getBalances(repaymentSummary, startDate, endDate);

        chart.update();
    };

    // Add event listeners to the date range selectors
    upperSelector.addEventListener('change', updateChartData);
    lowerSelector.addEventListener('change', updateChartData);
});
</script> -->
