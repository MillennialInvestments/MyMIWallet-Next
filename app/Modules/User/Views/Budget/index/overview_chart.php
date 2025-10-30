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
<div class="h-100 card card-bordered">
    <div class="card-inner">
        <div class="align-start card-title-group mb-3">
            <div class="card-title">
                <h6 class="title">Month-to-Month Overview</h6>
                <p>View Your Month-to-Month Financial Growth</p>
            </div>
            <div class="card-tools mt-n1 me-n1">
                <div class="drodown">
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
                    <div class="nk-order-ovwg-ck" style="height:100%">
                        <!-- <div id='budget-data' hidden><?php // echo json_encode($userBudgetRecords, JSON_HEX_TAG); ?></div>
                        <div id='credit-data' hidden><?php // echo json_encode($currentBalances, JSON_HEX_TAG); ?></div>
                        <div id='available-data' hidden><?php // echo json_encode($availableBalances, JSON_HEX_TAG); ?></div>
                        <div id='repayment-summary' hidden><?php // echo json_encode($repaymentSummary, JSON_HEX_TAG); ?></div> -->
                        <div class="h-100">
                            <canvas class="h-100" id="report-chart"></canvas>
                        </div>
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
<script <?= $nonce['script'] ?? '' ?>>
document.addEventListener('DOMContentLoaded', function () {
  // Ensure Chart.js is available (layout should include it; this is a fallback)
  function ensureChart(cb) {
    if (window.Chart) return cb();
    var s = document.createElement('script');
    s.src = 'https://cdn.jsdelivr.net/npm/chart.js@4.4.1/dist/chart.umd.min.js';
    s.defer = true;
    s.onload = cb;
    document.head.appendChild(s);
  }

  ensureChart(function () {
    // ====== YOUR ORIGINAL CODE STARTS HERE ======
    // Shared state object
    const state = { budgetData: [], creditData: [], availableData: [], repaymentSummary: [] };

    const fetchAndStore = async (url, key) => {
      try {
        const res  = await fetch(url);
        const json = await res.json();
        if (json.status === 'success') { state[key] = json.data; }
      } catch (err) { console.error(`⚠️ Error fetching ${key}:`, err); }
    };

    const fetchAllBudgetData = async () => {
      await Promise.all([
        fetchAndStore('/index.php/API/Budget/getUserBudgetRecords', 'budgetData'),
        fetchAndStore('/index.php/API/Budget/getUserCreditBalances', 'creditData'),
        fetchAndStore('/index.php/API/Budget/getUserAvailableBalances', 'availableData'),
        fetchAndStore('/index.php/API/Budget/getUserRepaymentSummary', 'repaymentSummary')
      ]);
      updateChartData();
    };

    const isValidRecord = (r) =>
      r && r.account_type && r.year && r.month && r.day && r.net_amount !== undefined;

    const getMonthLabels = (start, end, showYears = true) => {
      const MONTHS = ['JAN','FEB','MAR','APR','MAY','JUN','JUL','AUG','SEP','OCT','NOV','DEC'];
      let labels = [], m = start.month, y = start.year;
      while (y < end.year || (y === end.year && m <= end.month)) {
        labels.push(showYears ? `${MONTHS[m-1]} ${y}` : MONTHS[m-1]);
        m++; if (m > 12) { m = 1; y++; }
      }
      return labels;
    };

    const extractData = (type, data, start, end) => {
      const result = new Array(getMonthLabels(start, end, false).length).fill(0);
      data.forEach(record => {
        const recordDate = new Date(record.year, record.month - 1, record.day);
        if (record.account_type === type &&
            recordDate >= new Date(start.year, start.month - 1) &&
            recordDate <= new Date(end.year, end.month - 1)) {
          const idx = (record.year - start.year) * 12 + (record.month - start.month);
          if (idx >= 0 && idx < result.length) result[idx] += parseFloat(record.net_amount) || 0;
        }
      });
      return result;
    };

    const calculateSurplus           = (expenses, incomes) => incomes.map((v,i)=>(v||0)-(expenses[i]||0));
    const calculateCumulativeSurplus = (surpluses) => {
      const cumulative = []; surpluses.reduce((a,v) => { const c=a+v; cumulative.push(c); return c; }, 0); return cumulative;
    };
    const calculateSurplusColors     = (surpluses) => surpluses.map(v => (v >= 0 ? '#1ee0ac' : '#e85347'));

    const adjustMonths = (date, months) => { const d=new Date(date); d.setMonth(d.getMonth()+months); return d; };
    const formatDate   = (date) => ({ year: date.getFullYear(), month: date.getMonth() + 1 });

    const getSelectedValue = (selector) => {
      const el = document.querySelector(`${selector} .option.active`);
      return el ? parseInt(el.dataset.value, 10) : null;
    };

    const canvas = document.getElementById('report-chart');
    if (!canvas) return;
    const ctx = canvas.getContext('2d');

    const chart = new Chart(ctx, {
      type: 'bar',
      data: {
        labels: [],
        datasets: [
          { type: 'line', label: 'Overall', data: [], borderColor: '#3E61BC', borderWidth: 3 },
          { type: 'bar',  label: 'Income',  data: [], backgroundColor: '#1ee0ac', borderWidth: 1 },
          { type: 'bar',  label: 'Expenses',data: [], backgroundColor: '#e85347', borderWidth: 1 },
          {
            type: 'line',
            label: 'Cumulative Surplus',
            data: [],
            borderColor: [],
            borderWidth: 3,
            pointBackgroundColor: [],
            pointBorderColor: '#000',
            pointBorderWidth: 2,
            tension: 0.4,
            fill: false
          }
        ]
      },
      options: {
        responsive: true,
        plugins: {
          legend: {
            display: true,
            position: 'bottom',
            onClick: function (e, legendItem) {
              const idx = legendItem.datasetIndex, ci = e.chart, meta = ci.getDatasetMeta(idx);
              meta.hidden = meta.hidden === null ? !ci.data.datasets[idx].hidden : null; ci.update();
            }
          }
        },
        scales: {
          y: {
            beginAtZero: true,
            ticks: { callback: (value) => '$' + Number(value).toLocaleString() }
          }
        }
      }
    });

    const updateChartData = () => {
      const cleanData   = state.budgetData.filter(isValidRecord);
      const lowerAmount = getSelectedValue('#chart-lower-options') || -1;
      const upperAmount = getSelectedValue('#chart-upper-options') || 12;

      const startDate = formatDate(adjustMonths(new Date(), lowerAmount));
      const endDate   = formatDate(adjustMonths(new Date(), upperAmount));

      const incomes   = extractData('Income',  cleanData, startDate, endDate);
      const expenses  = extractData('Expense', cleanData, startDate, endDate);
      const surplus   = calculateSurplus(expenses, incomes);
      const cum       = calculateCumulativeSurplus(surplus);
      const colors    = calculateSurplusColors(cum);

      chart.data.labels                 = getMonthLabels(startDate, endDate, true);
      chart.data.datasets[0].data       = surplus;
      chart.data.datasets[1].data       = incomes;
      chart.data.datasets[2].data       = expenses;
      chart.data.datasets[3].data       = cum;
      chart.data.datasets[3].borderColor= colors;
      chart.data.datasets[3].pointBackgroundColor = colors;
      chart.update();
    };

    const initializeDropdown = (selector, callback) => {
      const options = document.querySelectorAll(`${selector} .option`);
      options.forEach(option => {
        option.addEventListener('click', function () {
          options.forEach(opt => opt.classList.remove('active'));
          this.classList.add('active');
          callback();
        }, { passive: true });
      });
    };

    const setDefaultDropdown = () => {
      document.querySelectorAll('#chart-lower-options .option').forEach(o => {
        o.classList.remove('active'); if (parseInt(o.dataset.value, 10) === -1) o.classList.add('active');
      });
      document.querySelectorAll('#chart-upper-options .option').forEach(o => {
        o.classList.remove('active'); if (parseInt(o.dataset.value, 10) === 0)  o.classList.add('active');
      });
    };

    initializeDropdown('#chart-lower-options', updateChartData);
    initializeDropdown('#chart-upper-options', updateChartData);
    setDefaultDropdown();
    fetchAllBudgetData();
    // ====== YOUR ORIGINAL CODE ENDS HERE ======
  });
});
</script>


<!-- <script <?= $nonce['script'] ?? '' ?>>
document.addEventListener('DOMContentLoaded', function () {
    // Utility to safely parse JSON from DOM elements
    const getJsonContent = (selector, defaultValue = '[]') => {
        const element = document.querySelector(selector);
        if (element) {
            try {
                return JSON.parse(element.textContent || defaultValue);
            } catch (error) {
                console.error(`Error parsing JSON from selector ${selector}:`, error);
                return JSON.parse(defaultValue);
            }
        }
        return JSON.parse(defaultValue);
    };

    const budgetData = getJsonContent("#budget-data");
    console.log("Loaded Budget Data:", budgetData);

    // Helper function to generate month labels
    const getMonthLabels = (start, end, showYears = true) => {
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

    const extractData = (type, data, start, end) => {
        if (!Array.isArray(data)) {
            console.error('Error: extractData expects an array but received:', data);
            return new Array(getMonthLabels(start, end, false).length).fill(0);
        }

        const result = new Array(getMonthLabels(start, end, false).length).fill(0);

        data.forEach(record => {
            if (!record || !record.account_type || !record.year || !record.month || !record.day) {
                console.warn('Skipping invalid record:', record);
                return;
            }

            const recordDate = new Date(record.year, record.month - 1, record.day);
            if (record.account_type === type && recordDate >= new Date(start.year, start.month - 1) && recordDate <= new Date(end.year, end.month - 1)) {
                const index = (record.year - start.year) * 12 + (record.month - start.month);
                if (index >= 0 && index < result.length) {
                    result[index] += parseFloat(record.net_amount) || 0;
                }
            }
        });

        return result;
    };

    const calculateOverall = (expenses, incomes) => {
        const length = Math.max(expenses.length, incomes.length);
        return Array.from({ length }, (_, i) => (incomes[i] || 0) - (expenses[i] || 0));
    };

    const adjustMonths = (date, months) => {
        const newDate = new Date(date);
        newDate.setMonth(newDate.getMonth() + months);
        return newDate;
    };

    const formatDate = (date) => ({
        year: date.getFullYear(),
        month: date.getMonth() + 1
    });

    const getSelectedValue = (selector) => {
        const activeElement = document.querySelector(`${selector} .option.active`);
        return activeElement ? parseInt(activeElement.dataset.value, 10) : null;
    };

    const ctx = document.getElementById('report-chart').getContext('2d');
    const chart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: [],
            datasets: [
                { type: 'line', label: 'Overall', data: [], borderColor: '#3E61BC', borderWidth: 3 },
                { type: 'bar', label: 'Income', data: [], backgroundColor: '#1ee0ac', borderWidth: 1 },
                { type: 'bar', label: 'Expenses', data: [], backgroundColor: '#e85347', borderWidth: 1 }
            ]
        },
        options: { 
            responsive: true,
            plugins: {
                legend: {
                    display: true,
                    position: 'bottom',
                    onClick: function (e, legendItem) {
                        const index = legendItem.datasetIndex;
                        const ci = e.chart;
                        const meta = ci.getDatasetMeta(index);
                        meta.hidden = meta.hidden === null ? !ci.data.datasets[index].hidden : null;
                        ci.update();
                    }
                }
            },
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

    const updateChartData = () => {
        const lowerAmount = getSelectedValue('#chart-lower-options') || -1; // Default to last month (-1)
        const upperAmount = getSelectedValue('#chart-upper-options') || 12;  // Default to 0 (current month)

        const startDate = formatDate(adjustMonths(new Date(), lowerAmount));
        const endDate = formatDate(adjustMonths(new Date(), upperAmount));

        console.log('Chart Range:', { startDate, endDate });

        chart.data.labels = getMonthLabels(startDate, endDate, true);
        chart.data.datasets[0].data = calculateOverall(
            extractData('Expense', budgetData, startDate, endDate),
            extractData('Income', budgetData, startDate, endDate)
        );
        chart.data.datasets[1].data = extractData('Income', budgetData, startDate, endDate);
        chart.data.datasets[2].data = extractData('Expense', budgetData, startDate, endDate);
        chart.update();
    };

    const initializeDropdown = (selector, callback) => {
        const options = document.querySelectorAll(`${selector} .option`);
        options.forEach(option => {
            option.addEventListener('click', function () {
                options.forEach(opt => opt.classList.remove('active'));
                this.classList.add('active');
                callback();
            });
        });
    };

    // Set default to "Past 1 Month"
    const setDefaultDropdown = () => {
        document.querySelectorAll('#chart-lower-options .option').forEach(option => {
            option.classList.remove('active');
            if (parseInt(option.dataset.value, 10) === -1) {
                option.classList.add('active');
            }
        });
        document.querySelectorAll('#chart-upper-options .option').forEach(option => {
            option.classList.remove('active');
            if (parseInt(option.dataset.value, 10) === 0) {
                option.classList.add('active');
            }
        });
    };

    // Initialize dropdowns and set defaults
    initializeDropdown('#chart-lower-options', updateChartData);
    initializeDropdown('#chart-upper-options', updateChartData);
    setDefaultDropdown();

    // Initial chart rendering with default settings
    updateChartData();
});
</script> -->