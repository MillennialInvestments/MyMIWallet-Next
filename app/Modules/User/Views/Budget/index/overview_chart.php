<?php
$needsMarketCharts   = true; // ask the layout to include Chart.js too
$daysInThisMonth     = cal_days_in_month(CAL_GREGORIAN, date('n'), date('Y'));
$daysLastMonth       = cal_days_in_month(CAL_GREGORIAN, date('n') - 1 <= 0 ? 12 : date('n') - 1, date('n') - 1 <= 0 ? date('Y') - 1 : date('Y'));
$daysNextMonth       = cal_days_in_month(CAL_GREGORIAN, date('n') + 1 > 12 ? 1 : date('n') + 1, date('n') + 1 > 12 ? date('Y') + 1 : date('Y'));

$thisMonthDaily      = $thisMonthsExpense / $daysInThisMonth;
$lastMonthDaily      = $lastMonthsExpense / $daysLastMonth;
$nextMonthDaily      = $nextMonthsExpense / $daysNextMonth;

$thisMonthWeekly     = $thisMonthDaily * 7;
$lastMonthWeekly     = $lastMonthDaily * 7;
$nextMonthWeekly     = $nextMonthDaily * 7;

$thisMonthBiWeekly   = $thisMonthDaily * 14;
$lastMonthBiWeekly   = $lastMonthDaily * 14;
$nextMonthBiWeekly   = $nextMonthDaily * 14;

$thisMonthMonthly    = $thisMonthsExpense;
$lastMonthMonthly    = $lastMonthsExpense;
$nextMonthMonthly    = $nextMonthsExpense;
?>
<!-- app/Modules/User/Views/Budget/index/overview_chart.php -->
<div
    class="h-100 card card-bordered"
    data-budget-dashboard
    data-endpoint-budget-data="<?= site_url('API/Budget/getUserBudgetRecords'); ?>"
    data-endpoint-credit-data="<?= site_url('API/Budget/getUserCreditBalances'); ?>"
    data-endpoint-available-data="<?= site_url('API/Budget/getUserAvailableBalances'); ?>"
    data-endpoint-repayment-summary="<?= site_url('API/Budget/getUserRepaymentSummary'); ?>"
>
    <div class="card-inner">
        <div class="align-start card-title-group mb-3">
            <div class="card-title">
                <h6 class="title">Month-to-Month Overview</h6>
                <p>View Your Month-to-Month Financial Growth</p>
            </div>
            <div class="card-tools mt-n1 me-n1">
                <div class="dropdown">
                    <a href="#" class="dropdown-toggle btn btn-primary full-width" data-bs-toggle="dropdown">
                        Chart Settings
                    </a>
                    <div class="dropdown-menu dropdown-menu-md dropdown-menu-end p-3">
                        <ul class="link-list-opt no-bdr">
                            <li class="p-1">
                                <h7>Start Date?</h7>
                                <input type="date" id="start-date" class="form-control">
                            </li>
                            <li class="divider"></li>
                            <li class="p-1">
                                <h7>Historical Timeline?</h7>
                                <ul class="link-list-opt no-bdr" id="chart-lower-options">
                                    <li data-value="-12" class="option active">Past 12 Months</li>
                                    <li data-value="-6" class="option">Past 6 Months</li>
                                    <li data-value="-3" class="option">Past 3 Months</li>
                                    <li data-value="-1" class="option">Past 1 Month</li>
                                    <li data-value="0" class="option">Only Forward</li>
                                </ul>
                            </li>
                            <li class="divider"></li>
                            <li class="p-1">
                                <h7>Forward-Looking?</h7>
                                <ul class="link-list-opt no-bdr" id="chart-upper-options">
                                    <li data-value="12" class="option active">12 Months</li>
                                    <li data-value="6" class="option">6 Months</li>
                                    <li data-value="3" class="option">3 Months</li>
                                    <li data-value="1" class="option">1 Month</li>
                                    <li data-value="0" class="option">Only Backward</li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="nk-order-ovwg">
            <div class="row align-end g-4">
                <div class="col-12">
                    <div class="nk-order-ovwg-ck" style="min-height: 300px; height: 320px; position: relative;">
                        <canvas id="report-chart" style="width: 100%; height: 300px;"></canvas>
                    </div>
                </div>
            </div>
        </div>
        <div class="nk-order-ovwg">
            <div class="row align-end g-4">
                <div class="col-12">
                    <h6>This month's performance</h6>
                    <p>A quick visual summary of your incomes and expenses this month</p>
                </div>
            </div>
        </div>
        <div class="nk-order-ovwg py-5">
            <div class="row g-4 align-end">
                <!-- Income -->
                <div class="col-12 col-sm-3 col-md-6 col-xxl-3">
                    <a href="<?= site_url('Budget/Income'); ?>">
                        <div class="nk-order-ovwg-data surplus">
                            <div class="title"><em class="icon ni ni-arrow-down-left"></em> <small>Income</small></div>
                            <div class="amount"><?= $thisMonthsIncomeFMT; ?></div>
                            <div class="info row">
                                <span class="col-6 p-0">Last Month</span><span class="col-6 p-0 text-right"><strong><?= $lastMonthsIncomeFMT; ?></strong></span>
                                <span class="col-6 p-0">Next Month</span><span class="col-6 p-0 text-right"><strong><?= $nextMonthsIncomeFMT; ?></strong></span>
                            </div>
                        </div>
                    </a>
                </div>

                <!-- Expenses -->
                <div class="col-12 col-sm-3 col-md-6 col-xxl-3">
                    <a href="<?= site_url('Budget/Expenses'); ?>">
                        <div class="nk-order-ovwg-data surplus">
                            <div class="title"><em class="icon ni ni-arrow-up-left"></em> <small>Expenses</small></div>
                            <div class="amount"><?= $thisMonthsExpenseFMT; ?></div>
                            <div class="info row">
                                <span class="col-6 p-0">Last Month</span><span class="col-6 p-0 text-right"><strong><?= $lastMonthsExpenseFMT; ?></strong></span>
                                <span class="col-6 p-0">Next Month</span><span class="col-6 p-0 text-right"><strong><?= $nextMonthsExpenseFMT; ?></strong></span>
                            </div>
                        </div>
                    </a>
                </div>

                <!-- Savings (Surplus) -->
                <div class="col-12 col-sm-3 col-md-6 col-xxl-3">
                    <a href="#">
                        <div class="nk-order-ovwg-data surplus">
                            <div class="title"><em class="icon ni ni-arrow-down-left"></em> <small>Savings</small></div>
                            <div class="amount"><?= $thisMonthsSurplusFMT; ?></div>
                            <div class="info row">
                                <span class="col-6 p-0">Last Month</span><span class="col-6 p-0 text-right"><strong><?= $lastMonthsSurplusFMT; ?></strong></span>
                                <span class="col-6 p-0">Next Month</span><span class="col-6 p-0 text-right"><strong><?= $nextMonthsSurplusFMT; ?></strong></span>
                            </div>
                        </div>
                    </a>
                </div>

                <!-- Investments -->
                <div class="col-12 col-sm-3 col-md-6 col-xxl-3">
                    <a href="#">
                        <div class="nk-order-ovwg-data surplus">
                            <div class="title"><em class="icon ni ni-arrow-up-left"></em> <small>Investments (<?= $monthlySavingsPercentageFMT; ?>)</small></div>
                            <div class="amount"><?= $thisMonthsInvestmentsFMT; ?> <small style="font-size:0.75rem;"> / <?= $thisMonthsInvestmentsSplitFMT; ?></small></div>
                            <div class="info row">
                                <span class="col-6 p-0">Last Month</span><span class="col-6 p-0 text-right"><strong><?= $lastMonthsInvestmentsFMT; ?></strong></span>
                                <span class="col-6 p-0">Next Month</span><span class="col-6 p-0 text-right"><strong><?= $nextMonthsInvestmentsFMT; ?></strong></span>
                            </div>
                        </div>
                    </a>
                </div>

                <!-- Daily Requirement -->
                <div class="col-12 col-sm-3 col-md-6 col-xxl-3">
                    <a href="<?= site_url('Budget/Income'); ?>">
                        <div class="nk-order-ovwg-data surplus">
                            <div class="title"><em class="icon ni ni-arrow-down-left"></em> <small>Daily Income Req.</small></div>
                            <div class="amount"><?= '$' . number_format($thisMonthDaily, 2); ?> <small style="font-size:0.75rem;">/ Day</small></div>
                            <div class="info row">
                                <span class="col-6 p-0">Last Month</span><span class="col-6 p-0 text-right"><strong><?= '$' . number_format($lastMonthDaily, 2); ?></strong></span>
                                <span class="col-6 p-0">Next Month</span><span class="col-6 p-0 text-right"><strong><?= '$' . number_format($nextMonthDaily, 2); ?></strong></span>
                            </div>
                        </div>
                    </a>
                </div>

                <!-- Weekly Requirement -->
                <div class="col-12 col-sm-3 col-md-6 col-xxl-3">
                    <a href="<?= site_url('Budget/Expenses'); ?>">
                        <div class="nk-order-ovwg-data surplus">
                            <div class="title"><em class="icon ni ni-arrow-down-left"></em> <small>Weekly Req.</small></div>
                            <div class="amount"><?= '$' . number_format($thisMonthWeekly, 2); ?> <small style="font-size:0.75rem;">/ Week</small></div>
                            <div class="info row">
                                <span class="col-6 p-0">Last Month</span><span class="col-6 p-0 text-right"><strong><?= '$' . number_format($lastMonthWeekly, 2); ?></strong></span>
                                <span class="col-6 p-0">Next Month</span><span class="col-6 p-0 text-right"><strong><?= '$' . number_format($nextMonthWeekly, 2); ?></strong></span>
                            </div>
                        </div>
                    </a>
                </div>

                <!-- Bi-Weekly Requirement -->
                <div class="col-12 col-sm-3 col-md-6 col-xxl-3">
                    <a href="#">
                        <div class="nk-order-ovwg-data surplus">
                            <div class="title"><em class="icon ni ni-arrow-down-left"></em> <small>Bi-Weekly Req.</small></div>
                            <div class="amount"><?= '$' . number_format($thisMonthBiWeekly, 2); ?> <small style="font-size:0.75rem;">/ Bi-Weekly</small></div>
                            <div class="info row">
                                <span class="col-6 p-0">Last Month</span><span class="col-6 p-0 text-right"><strong><?= '$' . number_format($lastMonthBiWeekly, 2); ?></strong></span>
                                <span class="col-6 p-0">Next Month</span><span class="col-6 p-0 text-right"><strong><?= '$' . number_format($nextMonthBiWeekly, 2); ?></strong></span>
                            </div>
                        </div>
                    </a>
                </div>

                <!-- Monthly Requirement -->
                <div class="col-12 col-sm-3 col-md-6 col-xxl-3">
                    <a href="#">
                        <div class="nk-order-ovwg-data surplus">
                            <div class="title"><em class="icon ni ni-arrow-down-left"></em> <small>Monthly Req.</small></div>
                            <div class="amount"><?= '$' . number_format($thisMonthMonthly, 2); ?> <small style="font-size:0.75rem;">/ Month</small></div>
                            <div class="info row">
                                <span class="col-6 p-0">Last Month</span><span class="col-6 p-0 text-right"><strong><?= '$' . number_format($lastMonthMonthly, 2); ?></strong></span>
                                <span class="col-6 p-0">Next Month</span><span class="col-6 p-0 text-right"><strong><?= '$' . number_format($nextMonthMonthly, 2); ?></strong></span>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
// legacy_budget_chart_payload_fix: expose server-rendered budget records to the chart bootstrap.
$budgetChartPayload = [
    'budgetData' => is_array($userBudgetRecords ?? null) ? array_values($userBudgetRecords) : [],
    'creditData' => is_array($currentBalances ?? null) ? array_values($currentBalances) : [],
    'availableData' => is_array($availableBalances ?? null) ? array_values($availableBalances) : [],
    'repaymentSummary' => is_array($repaymentSummary ?? null) ? array_values($repaymentSummary) : [],
];
?>
<script <?= $nonce['script'] ?? '' ?>>
window.budgetDashboardData = <?= json_encode($budgetChartPayload, JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_AMP | JSON_HEX_QUOT); ?>;
</script>

<script <?= $nonce['script'] ?? '' ?>>
document.addEventListener('DOMContentLoaded', function () {
  function ensureChart(cb) {
    if (window.Chart) return cb();
    var s = document.createElement('script');
    s.src = 'https://cdn.jsdelivr.net/npm/chart.js@4.4.1/dist/chart.umd.min.js';
    s.defer = true;
    s.onload = cb;
    document.head.appendChild(s);
  }

  ensureChart(function () {
    const canvas = document.getElementById('report-chart');
    if (!canvas) return;
    const ctx = canvas.getContext('2d');

    const state = {
        budgetData: [],
        creditData: [],
        availableData: [],
        repaymentSummary: []
    };

    function extractRecords(data) {
        if (Array.isArray(data)) return data;
        if (data && Array.isArray(data.records)) return data.records;
        return [];
    }

    const parseRecord = (r) => {
        if (!r) return null;
        let year = parseInt(r.year, 10);
        let month = parseInt(r.month, 10);
        let day = parseInt(r.day || 1, 10);

        if (isNaN(year) || isNaN(month)) {
            const dateStr = r.designated_date || r.paid_date || r.date || r.due_date || r.submitted_on;
            if (dateStr) {
                const parts = String(dateStr).split(/[-/]/);
                if (parts.length >= 2) {
                    year = parseInt(parts[0], 10);
                    month = parseInt(parts[1], 10);
                    day = parts[2] ? parseInt(parts[2], 10) : 1;
                }
            }
        }

        if (isNaN(year) || isNaN(month)) return null;

        const rawType = (r.account_type || r.type || '').toString().toLowerCase();
        const type = rawType.includes('income') ? 'income' : 'expense';
        const amount = parseFloat(r.net_amount ?? r.gross_amount ?? r.amount ?? 0);

        return {
            year,
            month,
            day: isNaN(day) ? 1 : day,
            type,
            amount: isNaN(amount) ? 0 : amount,
            name: r.name || ''
        };
    };

    const getMonthLabels = (start, end, showYears = true) => {
        const MONTHS = ['JAN','FEB','MAR','APR','MAY','JUN','JUL','AUG','SEP','OCT','NOV','DEC'];
        let labels = [], m = start.month, y = start.year;
        while (y < end.year || (y === end.year && m <= end.month)) {
            labels.push(showYears ? `${MONTHS[m-1]} ${y}` : MONTHS[m-1]);
            m++;
            if (m > 12) { m = 1; y++; }
        }
        return labels;
    };

    const extractData = (targetType, rawRecords, start, end) => {
        const monthLabels = getMonthLabels(start, end, false);
        const result = new Array(monthLabels.length).fill(0);
        const target = targetType.toLowerCase();

        rawRecords.forEach(r => {
            const parsed = parseRecord(r);
            if (!parsed) return;

            if (parsed.type === target) {
                const recordDate = new Date(parsed.year, parsed.month - 1, parsed.day);
                const startDate = new Date(start.year, start.month - 1, 1, 0, 0, 0);
                const endDate = new Date(end.year, end.month, 0, 23, 59, 59, 999);

                if (recordDate >= startDate && recordDate <= endDate) {
                    const idx = (parsed.year - start.year) * 12 + (parsed.month - start.month);
                    if (idx >= 0 && idx < result.length) {
                        result[idx] += parsed.amount;
                    }
                }
            }
        });

        return result;
    };

    const calculateOverall = (expenses, incomes) => incomes.map((v, i) => Math.round(((v || 0) - (expenses[i] || 0)) * 100) / 100);
    const calculateCumulativeSurplus = (surpluses) => {
        const cumulative = [];
        surpluses.reduce((a, v) => {
            const c = Math.round((a + v) * 100) / 100;
            cumulative.push(c);
            return c;
        }, 0);
        return cumulative;
    };

    const adjustMonths = (date, months) => {
        const d = new Date(date);
        d.setMonth(d.getMonth() + months);
        return d;
    };
    const formatDate = (date) => ({ year: date.getFullYear(), month: date.getMonth() + 1 });

    const getSelectedValue = (selector) => {
        const el = document.querySelector(`${selector} .option.active`);
        return el ? parseInt(el.dataset.value, 10) : null;
    };

    const chart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: [],
            datasets: [
                {
                    type: 'line',
                    label: 'Overall Net',
                    data: [],
                    borderColor: '#3E61BC',
                    backgroundColor: 'rgba(62, 97, 188, 0.1)',
                    borderWidth: 3,
                    fill: false,
                    tension: 0.3,
                    order: 1
                },
                {
                    type: 'bar',
                    label: 'Income',
                    data: [],
                    backgroundColor: 'rgba(30, 224, 172, 0.85)',
                    borderColor: '#1ee0ac',
                    borderWidth: 1,
                    order: 2
                },
                {
                    type: 'bar',
                    label: 'Expenses',
                    data: [],
                    backgroundColor: 'rgba(232, 83, 71, 0.85)',
                    borderColor: '#e85347',
                    borderWidth: 1,
                    order: 3
                },
                {
                    type: 'line',
                    label: 'Cumulative Growth',
                    data: [],
                    borderColor: '#f5a623',
                    borderWidth: 2,
                    borderDash: [5, 5],
                    pointBackgroundColor: '#f5a623',
                    pointRadius: 4,
                    fill: false,
                    tension: 0.2,
                    order: 0
                }
            ]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            interaction: {
                mode: 'index',
                intersect: false
            },
            plugins: {
                legend: {
                    display: true,
                    position: 'bottom',
                    labels: {
                        boxWidth: 14,
                        padding: 16
                    }
                },
                tooltip: {
                    callbacks: {
                        label: function (context) {
                            var label = context.dataset.label || '';
                            var val = context.parsed.y !== null ? context.parsed.y : 0;
                            var prefix = val < 0 ? '-$' : '$';
                            return label + ': ' + prefix + Math.abs(val).toLocaleString(undefined, { minimumFractionDigits: 2, maximumFractionDigits: 2 });
                        }
                    }
                }
            },
            scales: {
                x: {
                    grid: { display: false }
                },
                y: {
                    beginAtZero: true,
                    ticks: {
                        callback: (value) => '$' + Number(value).toLocaleString()
                    }
                }
            }
        }
    });

    function updateChartData() {
        const rawBudget = state.budgetData && state.budgetData.length > 0
            ? state.budgetData
            : extractRecords(window.budgetDashboardData?.budgetData);

        const lowerVal = getSelectedValue('#chart-lower-options');
        const upperVal = getSelectedValue('#chart-upper-options');
        const lowerAmount = lowerVal !== null ? lowerVal : -6;
        const upperAmount = upperVal !== null ? upperVal : 12;

        const startDate = formatDate(adjustMonths(new Date(), lowerAmount));
        const endDate   = formatDate(adjustMonths(new Date(), upperAmount));

        const incomes   = extractData('income',  rawBudget, startDate, endDate);
        const expenses  = extractData('expense', rawBudget, startDate, endDate);
        const overall   = calculateOverall(expenses, incomes);
        const cum       = calculateCumulativeSurplus(overall);

        chart.data.labels           = getMonthLabels(startDate, endDate, true);
        chart.data.datasets[0].data = overall;
        chart.data.datasets[1].data = incomes;
        chart.data.datasets[2].data = expenses;
        chart.data.datasets[3].data = cum;

        chart.update();
    }

    const initializeDropdown = (selector) => {
        const options = document.querySelectorAll(`${selector} .option`);
        options.forEach(option => {
            option.addEventListener('click', function () {
                options.forEach(opt => opt.classList.remove('active'));
                this.classList.add('active');
                updateChartData();
            }, { passive: true });
        });
    };

    initializeDropdown('#chart-lower-options');
    initializeDropdown('#chart-upper-options');

    // Default dropdown configuration: 6 months backward, 12 months forward
    document.querySelectorAll('#chart-lower-options .option').forEach(o => {
        o.classList.remove('active');
        if (parseInt(o.dataset.value, 10) === -6) o.classList.add('active');
    });
    document.querySelectorAll('#chart-upper-options .option').forEach(o => {
        o.classList.remove('active');
        if (parseInt(o.dataset.value, 10) === 12) o.classList.add('active');
    });

    document.addEventListener('budget:data-loaded', function (event) {
        const payload = event.detail || window.budgetDashboardData || {};
        state.budgetData = extractRecords(payload.budgetData);
        state.creditData = extractRecords(payload.creditData);
        state.availableData = extractRecords(payload.availableData);
        state.repaymentSummary = extractRecords(payload.repaymentSummary);
        updateChartData();
    });

    // Initial render with server-injected payload
    if (window.budgetDashboardData) {
        state.budgetData = extractRecords(window.budgetDashboardData.budgetData);
        state.creditData = extractRecords(window.budgetDashboardData.creditData);
        state.availableData = extractRecords(window.budgetDashboardData.availableData);
        state.repaymentSummary = extractRecords(window.budgetDashboardData.repaymentSummary);
        updateChartData();
    }
  });
});
</script>
