<style <?= $nonce['style'] ?? '' ?>>
    ul.link-list-opt.no-bdr {
        list-style: none;
        padding: 0;
        margin: 0;
    }

    ul.link-list-opt li.option {
        cursor: pointer;
        padding: 0.5rem 1rem;
        transition: background-color 0.2s;
    }

    ul.link-list-opt li.option:hover {
        background-color: #f5f5f5;
    }

    ul.link-list-opt li.option.active {
        background-color: #ddd;
        font-weight: bold;
    }

</style>
<div class="card card-bordered h-100">
    <div class="card-inner">
        <div class="card-title-group align-start mb-3">
            <div class="card-title">
                <h6 class="title">Month-to-Month Overview</h6>
                <p>Last 12 Months of Total Monthly Spend &amp; Total Transaction Fees.</p>
            </div>
            <div class="card-tools mt-n1 me-n1">
                <div class="drodown">
                    <a href="#" class="dropdown-toggle btn btn-trigger full-width" data-bs-toggle="dropdown">
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
        </div><!-- .card-title-group -->
        <div class="nk-order-ovwg">
            <div class="row g-4 align-end">
                <div class="col-12">                    
                    <div class="nk-order-ovwg-ck" style="height:100%">
                        <?php log_message('debug', 'Budget\Account_Overview\monthly_overview L73 - $userBudgetRecords Array: ' . (print_r(json_encode($userBudgetRecords, JSON_HEX_TAG), true); ?>
                        <?php
                        // Get the segment to determine account type
                        $accountType = $uri->getSegment(2) === 'Income' ? 'Income' : 'Expense';

                        $filteredBudgetRecords = array_filter($userBudgetRecords, function($record) use ($accountType) {
                            return isset($record['account_type']) && $record['account_type'] === $accountType;
                        });
                        
                        // Re-index the array to ensure it is passed as an array in JSON
                        $filteredBudgetRecords = array_values($filteredBudgetRecords);
                        
                        log_message('debug', 'Filtered Budget Records: ' . json_encode($filteredBudgetRecords, JSON_HEX_TAG));
                        ?>
                        <div id='budget-data' hidden><?php echo json_encode($filteredBudgetRecords ?? [], JSON_HEX_TAG); ?></div>
                        <div id='credit-data' hidden><?php echo json_encode($currentBalances, JSON_HEX_TAG); ?></div>
                        <div id='available-data' hidden><?php echo json_encode($availableBalances, JSON_HEX_TAG); ?></div>
                        <div id='repayment-summary' hidden><?php echo json_encode($repaymentSummary, JSON_HEX_TAG); ?></div>
                        <div class="h-100">
                            <canvas class="h-100" id="report-chart"></canvas>
                        </div>
                    </div>
                </div><!-- .col -->
                <div class="col-12">
                    <div class="row g-4">
                        <div class="col-12 col-sm-3 col-md-6 col-xxl-3">
                            <a href="<?php echo site_url('/Budget'); ?>">
                                <div class="nk-order-ovwg-data surplus">
                                    <div class="amount"><?php echo $totalSurplusFMT; ?> <small class="currenct currency-usd">USD</small></div>
                                    <div class="info">Last year <strong><?php echo $lastYTDTotalSurplusFMT; ?> <span class="currenct currency-usd">USD</span></strong></div>
                                    <div class="title"><em class="icon ni ni-arrow-down-left"></em> YTD Summary</div>
                                </div>
                            </a>
                        </div>
                        <div class="col-12 col-sm-3 col-md-6 col-xxl-3">
                            <a href="<?php echo site_url('Budget/' . $budgetType); ?>">
                                <div class="nk-order-ovwg-data surplus">
                                    <div class="amount"><?php echo $thisMonthsTotal; ?> <small class="currenct currency-usd">USD</small></div>
                                    <div class="info">Last month <strong><?php echo $lastMonthsTotal; ?> <span class="currenct currency-usd">USD</span></strong></div>
                                    <div class="title"><em class="icon ni ni-arrow-up-left"></em> Monthly <?= $accountType; ?></div>
                                </div>
                            </a>
                        </div>
                        <div class="col-12 col-sm-3 col-md-6 col-xxl-3">
                            <a href="<?php echo site_url('/Budget/' . $oppBudgetType); ?>">
                                <div class="nk-order-ovwg-data surplus">
                                    <div class="amount"><?php echo $thisMonthsOppTotal; ?> <small class="currenct currency-usd">USD</small></div>
                                    <div class="info">Last month <strong><?php echo $lastMonthsOptTotal; ?> <span class="currenct currency-usd">USD</span></strong></div>
                                    <div class="title"><em class="icon ni ni-arrow-down-left"></em> Monthly <?= $oppBudgetType; ?></div>
                                </div>
                            </a>
                        </div>
                        <div class="col-12 col-sm-3 col-md-6 col-xxl-3">
                            <a href="<?php echo site_url('/Budget'); ?>">
                                <div class="nk-order-ovwg-data surplus">
                                    <div class="amount"><?php echo $totalInvestmentsFMT; ?> <small class="currenct currency-usd">USD</small></div>
                                    <div class="info">Last month <strong><?php echo $lastYTDTotalInvestmentsFMT; ?> <span class="currenct currency-usd">USD</span></strong></div>
                                    <div class="title"><em class="icon ni ni-arrow-up-left"></em>Monthly Savings</div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div><!-- .col -->
            </div>
        </div><!-- .nk-order-ovwg -->
    </div><!-- .card-inner -->
</div><!-- .card -->
<script <?= $nonce['script'] ?? '' ?>>
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
        options: { scales: { y: { beginAtZero: true } } }
    });

    const updateChartData = () => {
        const lowerAmount = getSelectedValue('#chart-lower-options') || -6;
        const upperAmount = getSelectedValue('#chart-upper-options') || 12;

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

    initializeDropdown('#chart-lower-options', updateChartData);
    initializeDropdown('#chart-upper-options', updateChartData);

    updateChartData();
});
</script>

