<?php
// ---------------------------------------------
// Time Configurations (fixed & safe)
// ---------------------------------------------
$current_year = (int) date('Y');
$today = new DateTime('today');

$thisMonthStart = new DateTime($today->format('Y-m-01'));
$sixMonthsAgoDT = (clone $thisMonthStart)->modify('-6 months');
$sixMonthsAheadDT = (clone $thisMonthStart)->modify('+6 months');

$last_year = $current_year - 1;
$next_year = $current_year + 1;

$current_date = $today->format('m/d/Y');
$last_year_date = $today->format("m/d/{$last_year}");
$next_year_date = $today->format("m/d/{$next_year}");

$end_of_year_dt = new DateTime("{$current_year}-12-31");
$interval = $today->diff($end_of_year_dt);
$daysLeft = (int) $interval->format('%a');
$weeksLeft = (int) floor($daysLeft / 7);
$monthsLeft = ((int)$interval->y * 12) + (int)$interval->m;

// ---------------------------------------------
// Budget Variables
// ---------------------------------------------
if (isset($debug) && (int)$debug === 1) {
    log_message('debug', 'Budget\index L23 - $userBudget Array: ' . (print_r($userBudget ?? [], true)));
}

$userBudgetRecords              = $userBudget['userBudgetRecords']           ?? [];
$userActiveBudgetRecords        = $userBudget['userActiveBudgetRecords']     ?? [];
$thisMonthsIncome               = $userBudget['thisMonthsIncome']            ?? 0;
$thisMonthsIncomeFMT            = $userBudget['thisMonthsIncomeFMT']         ?? '$0.00';
$thisMonthsExpense              = $userBudget['thisMonthsExpense']           ?? 0;
$thisMonthsExpenseFMT           = $userBudget['thisMonthsExpenseFMT']        ?? '$0.00';
$thisMonthsSurplus              = $userBudget['thisMonthsSurplus']           ?? 0;
$thisMonthsSurplusFMT           = $userBudget['thisMonthsSurplusFMT']        ?? '$0.00';
$thisMonthsInvestments          = $userBudget['thisMonthsInvestments']       ?? 0;
$thisMonthsInvestmentsFMT       = $userBudget['thisMonthsInvestmentsFMT']    ?? '$0.00';
$thisMonthsInvestmentsSplitFMT  = $userBudget['thisMonthsInvestmentsSplitFMT'] ?? [];

$lastMonthsIncomeFMT            = $userBudget['lastMonthsIncomeFMT']         ?? '$0.00';
$lastMonthsExpense              = $userBudget['lastMonthsExpense']           ?? 0;
$lastMonthsExpenseFMT           = $userBudget['lastMonthsExpenseFMT']        ?? '$0.00';
$lastMonthsSurplusFMT           = $userBudget['lastMonthsSurplusFMT']        ?? '$0.00';
$lastMonthsInvestmentsFMT       = $userBudget['lastMonthsInvestmentsFMT']    ?? '$0.00';

$nextMonthsIncomeFMT            = $userBudget['nextMonthsIncomeFMT']         ?? '$0.00';
$nextMonthsExpense              = $userBudget['nextMonthsExpense']           ?? 0;
$nextMonthsExpenseFMT           = $userBudget['nextMonthsExpenseFMT']        ?? '$0.00';
$nextMonthsSurplusFMT           = $userBudget['nextMonthsSurplusFMT']        ?? '$0.00';
$nextMonthsInvestmentsFMT       = $userBudget['nextMonthsInvestmentsFMT']    ?? '$0.00';

$totalIncomeFMT                 = $userBudget['totalIncomeFMT']              ?? '$0.00';
$totalExpense                   = $userBudget['totalExpense']                ?? 0;
$totalExpenseFMT                = $userBudget['totalExpenseFMT']             ?? '$0.00';
$totalSurplusFMT                = $userBudget['totalSurplusFMT']             ?? '$0.00';
$totalInvestmentsFMT            = $userBudget['totalInvestmentsFMT']         ?? '$0.00';

$checkingSummary                = $userBudget['checkingSummary']             ?? 0;
$checkingSummaryFMT             = $userBudget['checkingSummaryFMT']          ?? '$0.00';
$incomeYTDSummaryFMT            = $userBudget['incomeYTDSummaryFMT']         ?? '$0.00';
$expenseYTDSummaryFMT           = $userBudget['expenseYTDSummaryFMT']        ?? '$0.00';

$creditLimit                    = $userBudget['creditLimit']                 ?? 0;
$creditLimitFMT                 = $userBudget['creditLimitFMT']              ?? '$0.00';
$creditAvailable                = $userBudget['creditAvailable']             ?? 0;
$creditAvailableFMT             = $userBudget['creditAvailableFMT']          ?? '$0.00';

$debtSummary                    = $userBudget['debtSummary']                 ?? 0;
$debtSummaryFMT                 = $userBudget['debtSummaryFMT']              ?? '$0.00';
$investSummary                  = $userBudget['investSummary']               ?? 0;
$investSummaryFMT               = $userBudget['investSummaryFMT']            ?? '$0.00';

$totalAccountBalance            = $userBudget['totalAccountBalance']         ?? 0;
$totalAccountBalanceFMT         = $userBudget['totalAccountBalanceFMT']      ?? '$0.00';

$initialBankBalance             = $initialBankBalance ?? ($userBudget['initialBankBalance'] ?? $totalAccountBalance);
$initialBankBalanceFMT          = $initialBankBalanceFMT ?? ($userBudget['initialBankBalanceFMT'] ?? '$0.00');
$initialBankBalanceAsOf         = $initialBankBalanceAsOf ?? ($asOf ?? date('Y-m-d'));

$monthlySavingsPercentage       = 0.3;
$monthlySavingsPercentageFMT    = number_format($monthlySavingsPercentage * 100, 0) . '%';

$allViewData = array(
    'beta' => $siteSettings->beta ?? 0,
    'debug' => $siteSettings->debug ?? 0,
    'investmentOperations' => $siteSettings->investmentOperations ?? 0,
    'stage' => $siteSettings->stage ?? '',
    'cuID' => $cuID ?? null,
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
    'currentBalances' => $currentBalances ?? [],
    'availableBalances' => $availableBalances ?? [],
    'repaymentSchedules' => $repaymentSchedules ?? [],
    'repaymentSummary' => $repaymentSummary ?? [],
    'initialBankBalance' => $initialBankBalance,
    'initialBankBalanceFMT' => $initialBankBalanceFMT,
    'initialBankBalanceAsOf' => $initialBankBalanceAsOf,
    'asOf' => $asOf ?? null,
    'totalAccountBalance' => $totalAccountBalance,
    'totalAccountBalanceFMT' => $totalAccountBalanceFMT,
    'userAgent' => $userAgent ?? null,
    'creditAvailableFMT' => $creditAvailableFMT,
);
?>
<div data-budget-dashboard hidden></div>
<div class="alert alert-info mt-3" data-budget-session-note>Budget data requires a logged-in session. If you're in Incognito or blocked third-party cookies, sign in again in a normal window.</div>
<style <?= $nonce['style'] ?? '' ?>>
    @media only screen and (max-width: 768px) {
        #userBudgetingDatatable_filter { padding-top: 1rem; text-align: left; }
    }
    .nk-order-ovwg-data.income { border-color: #8ff0d6; }
    .nk-order-ovwg-data.expenses { border-color: #e85347; }
    .nk-order-ovwg-data.surplus { border-color: #84b8ff; }
    .nk-order-ovwg-data.investments { border-color: #f4bd0e; }
    .nk-order-ovwg-data .amount { font-size: 1.25rem; font-weight: 700; }
    .statusRed { color: #e85347; font-weight: 600; }
</style>
<?php
$debug = (int) ($siteSettings->debug ?? 0);

$segment3 = (isset($uri) && count($uri->getSegments()) >= 3) ? $uri->getSegment(3) : null;
$searchQuery = $segment3;

if ($debug === 1) {
    log_message('debug', 'Budget\\index View - Search Segment: ' . var_export($segment3, true));
    log_message('debug', 'Budget\\index View - Initial userActiveBudgetRecords Count: ' . count($userActiveBudgetRecords));
}

// Optional search filter by text/month name
if (!empty($searchQuery)) {
    $searchQueryLower = strtolower($searchQuery);
    $monthMap = [
        'january' => 1, 'february' => 2, 'march' => 3,
        'april' => 4, 'may' => 5, 'june' => 6,
        'july' => 7, 'august' => 8, 'september' => 9,
        'october' => 10, 'november' => 11, 'december' => 12
    ];
    $searchMonthNumber = $monthMap[$searchQueryLower] ?? null;

    $userActiveBudgetRecords = array_values(array_filter($userActiveBudgetRecords, function($record) use ($searchQueryLower, $searchMonthNumber) {
        return (
            stripos($record['name'] ?? '', $searchQueryLower) !== false ||
            stripos($record['source_type'] ?? '', $searchQueryLower) !== false ||
            stripos($record['designated_date'] ?? '', $searchQueryLower) !== false ||
            (isset($record['month']) && (int)$record['month'] === $searchMonthNumber)
        );
    }));

    if ($debug === 1) {
        log_message('debug', 'Budget\\index View - Enhanced Filtered Count: ' . count($userActiveBudgetRecords));
        log_message('debug', 'Budget\\index View - Enhanced Filtered Records: ' . print_r(array_slice($userActiveBudgetRecords, 0, 5), true));
    }
}

// Helper for signed math (income vs expense)
if (!function_exists('miw_is_outflow')) {
    function miw_is_outflow(array $record): bool {
        $type = strtolower(trim($record['account_type'] ?? ($record['type'] ?? '')));
        if ($type !== '') {
            $outflowTypes = ['expense','debt','loan','liability','bill','payment'];
            if (in_array($type, $outflowTypes, true)) { return true; }
            $inflowTypes = ['income','salary','wages','paycheck','bonus','deposit','refund','rebate','self-employment'];
            if (in_array($type, $inflowTypes, true)) { return false; }
        }
        $src = strtolower($record['source_type'] ?? '');
        if (preg_match('/salary|income|wage|paycheck|bonus|deposit|refund|rebate|self-?employment/', $src)) {
            return false;
        }
        return true;
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
                        <?php
                        $sum = 0.0;
                        foreach ($userActiveBudgetRecords as $account):
                            $accountDate = DateTime::createFromFormat('m/d/Y', $account['designated_date'] ?? '');
                            $formattedDate = $accountDate ? $accountDate->format('F jS, Y') : 'Invalid Date';

                            $amount = (float) ($account['net_amount'] ?? 0);
                            $delta = miw_is_outflow($account) ? -$amount : $amount;
                            $sum += $delta;

                            $displaySum = $sum >= 0
                                ? '$' . number_format($sum, 2)
                                : '<span class="statusRed">-$' . number_format(abs($sum), 2) . '</span>';

                            $accountPaidStatus = !empty($account['paid'])
                                ? ''
                                : '<a href="' . site_url('Budget/Status/Paid/' . $account['id']) . '"><i class="icon ni ni-check-thick"></i></a>';
                        ?>
                            <tr>
                                <td data-order="<?= $accountDate ? $accountDate->format('Y-m-d') : '' ?>">
                                    <?= $formattedDate ?>
                                </td>
                                <td><a href="<?= site_url('Budget/Details/' . $account['id']) ?>"><?= esc($account['name'] ?? '') ?></a></td>
                                <td><?= esc($account['source_type'] ?? '') ?></td>
                                <td>$<?= number_format($amount, 2) ?></td>
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

    <script <?= $nonce['script'] ?? '' ?>>
    // jQuery-safe redirect
    document.getElementById('redirectSearchBtn').addEventListener('click', function () {
      var input = document.getElementById('searchInputField');
      var val = (input && input.value ? input.value : '').trim();
      if (val !== '') {
        window.location.href = "<?= site_url('Budget/Search/') ?>" + encodeURIComponent(val);
      }
    });

    // Safe DataTables init for search table
    document.addEventListener('DOMContentLoaded', function () {
      var el = document.getElementById('userBudgetingDatatable');
      if (!el) return;

      var options = {
        paging: true,
        searching: true,
        ordering: true,
        order: [[0,'asc']],
        lengthMenu: [[25, 50, 100, 500, -1], [25, 50, 100, 500, "All"]],
        info: true
      };

      if (window.jQuery && jQuery.fn && jQuery.fn.DataTable) {
        if (!jQuery.fn.dataTable.isDataTable(el)) {
          jQuery(el).DataTable(options);
        }
      } else if (typeof window.DataTable === 'function') {
        if (!el.classList.contains('dt-initialized')) {
          new DataTable(el, options);
          el.classList.add('dt-initialized');
        }
      } else {
        console.warn('DataTables (jQuery or 2.x) is not loaded on this page.');
      }
    });
    </script>

<?php else: ?>
    <!-- DEFAULT FULL PAGE VIEW -->
    <div class="d-flex flex-wrap gap-2 mb-5">
        <div class="btn-group" role="group" aria-label="This month quick links">
            <a class="btn btn-primary" href="<?= site_url('Budget/This-Month'); ?>">This Month (All)</a>
            <a class="btn btn-outline-success" href="<?= site_url('Budget/This-Month/Income'); ?>">Income</a>
            <a class="btn btn-outline-danger" href="<?= site_url('Budget/This-Month/Expense'); ?>">Expenses</a>
        </div>
        <div class="btn-group" role="group" aria-label="Forecast quick links">
            <a class="btn btn-outline-primary" href="<?= site_url('Budget/Forecast'); ?>">Forecast</a>
        </div>
        <div class="btn-group" role="group" aria-label="Last month quick links">
            <a class="btn btn-outline-primary" href="<?= site_url('Budget/Last-Month'); ?>">Last Month (All)</a>
            <a class="btn btn-outline-success" href="<?= site_url('Budget/Last-Month/Income'); ?>">Income</a>
            <a class="btn btn-outline-danger" href="<?= site_url('Budget/Last-Month/Expense'); ?>">Expenses</a>
        </div>
        <div class="btn-group" role="group" aria-label="Next month quick links">
            <a class="btn btn-outline-primary" href="<?= site_url('Budget/Next-Month'); ?>">Next Month (All)</a>
            <a class="btn btn-outline-success" href="<?= site_url('Budget/Next-Month/Income'); ?>">Income</a>
            <a class="btn btn-outline-danger" href="<?= site_url('Budget/Next-Month/Expense'); ?>">Expenses</a>
        </div>
    </div>
    <?php if (!empty($userAgent) && method_exists($userAgent, 'isBrowser') && $userAgent->isBrowser()): ?>
    <div class="nk-block d-none d-sm-block">
        <div class="row">
            <div class="d-none d-md-block col-md-12 col-xl-3 my-sm-3">
                <?= view('UserModule\Views\Budget\index\control_center', $allViewData); ?>
            </div>
            <div class="d-none d-sm-block col-md-12 col-xl-9 my-sm-3">
                <?= view('UserModule\Views\Budget\index\overview_chart', $allViewData); ?>
            </div>
        </div>
    </div>
    <?php endif; ?>

    <div id="budgeting-monthly-financial-overview"></div>

    <div class="nk-block">
        <div class="row">
            <div class="col-sm-12 col-md-12 my-sm-3">
                <?php
                if (!empty($userAgent) && method_exists($userAgent, 'isMobile') && $userAgent->isMobile()) {
                    echo view('UserModule\Budget\index\mobile_table', $allViewData);
                } elseif (!empty($userAgent) && method_exists($userAgent, 'isBrowser') && $userAgent->isBrowser()) {
                    echo view('UserModule\Budget\index\browser_table', $allViewData);
                } else {
                    echo view('UserModule\Budget\index\browser_table', $allViewData);
                }
                ?>
            </div>
        </div>
    </div>
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
<div class="modal" id="addAccountModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add New Budget Account</h5>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <a href="<?= site_url('Budget/Add/Income'); ?>" class="btn btn-success mb-2">Add Income</a>
                <a href="<?= site_url('Budget/Add/Expense'); ?>" class="btn btn-danger mb-2">Add Expense</a>
                <a href="<?= site_url('Budget/Add/Debt'); ?>" class="btn btn-warning mb-2">Add Debt</a>
                <a href="<?= site_url('Budget/Add/Investment'); ?>" class="btn btn-info mb-2">Add Investment</a>
            </div>
        </div>
    </div>
</div>
