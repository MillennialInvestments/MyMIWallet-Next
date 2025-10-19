<!-- User/views/Investments/index/Month_to_Month.php -->
<div class="card card-bordered h-100">
    <div class="card-inner">
        <div class="align-start card-title-group mb-3">
            <div class="card-title">
                <h6 class="title">Month-to-Month Overview</h6>
                <p>View Your Month-to-Month Investment Growth</p>
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
            <div class="row g-4 align-end">
                <div class="col-12">
                    <div class="nk-order-ovwg-ck" style="height:100%;">
                        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.1.2/Chart.min.js"></script>
                        <?php
                        // log_message('debug', 'Investments\index\Month_to_Month L52 - $userInvestmentRecords Array: ' . (print_r($userInvestmentRecords, true)));
                        // $monthToMonthData = $allViewData['investmentOverview']['monthToMonthData'] ?? [];
                        $monthToMonthData = $userInvestmentRecords ?? [];
                        echo '<div id="investment-data" hidden>' . json_encode($monthToMonthData, true) . '</div>';
                        ?>
                        <div class="h-100">
                            <canvas class="h-100" id="investment-report-chart"></canvas>
                        </div>  
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script <?= $nonce['script'] ?? '' ?>>
document.addEventListener('DOMContentLoaded', function () {
    const cache = new Map();

    // Initialize last 12 months
    function initializeLast12Months() {
        const monthlyData = {};
        const date = new Date();
        for (let i = 0; i < 12; i++) {
            const monthYear = `${date.getFullYear()}-${String(date.getMonth() + 1).padStart(2, "0")}`;
            monthlyData[monthYear] = 0; // Start with 0 for each month
            date.setMonth(date.getMonth() - 1); // Go back one month
        }
        return monthlyData;
    }

    // Get JSON content from DOM
    const getJsonContent = (selector, defaultValue = '[]') => {
        const element = document.querySelector(selector);
        try {
            return element ? JSON.parse(element.textContent || defaultValue) : JSON.parse(defaultValue);
        } catch (error) {
            console.error(`Error parsing JSON from selector ${selector}:`, error);
            return JSON.parse(defaultValue);
        }
    };

    const investmentData = getJsonContent("#investment-data");
    console.log("Loaded Investment Data:", investmentData);

    const tradeTypeMappings = {
        'equity': 'Stocks',
        'Stock': 'Stocks',
        'option_buy': 'Options',
        'option_sell': 'Options',
        'crypto': 'Cryptocurrencies',
        'mymi_asset': 'MyMI Crypto',
        'mymi_projects': 'MyMI Projects',
    };

    async function initInvestmentChart() {
        const monthlyNetGains = initializeLast12Months();
        const categoryGains = {
            'Stocks': initializeLast12Months(),
            'Options': initializeLast12Months(),
            'Cryptocurrencies': initializeLast12Months(),
            'MyMI Crypto': initializeLast12Months(),
            'MyMI Projects': initializeLast12Months(),
        };

        investmentData.forEach(item => {
            if (!item || !item.category || !item.close_date || !item.net_gains) {
                console.warn('Skipping invalid investment item:', item);
                return;
            }

            const mappedCategory = tradeTypeMappings[item.category];
            if (!mappedCategory) {
                console.warn(`Skipping unsupported trade type: ${item.category}`);
                return;
            }

            const closeDate = new Date(item.close_date);
            const monthYear = `${closeDate.getFullYear()}-${String(closeDate.getMonth() + 1).padStart(2, "0")}`;
            const netGain = parseFloat(item.net_gains) || 0;

            // Aggregate net gains into monthly data
            monthlyNetGains[monthYear] = (monthlyNetGains[monthYear] || 0) + netGain;
            categoryGains[mappedCategory][monthYear] = (categoryGains[mappedCategory][monthYear] || 0) + netGain;
        });

        const sortedKeys = Object.keys(monthlyNetGains).sort();
        const last12MonthsKeys = sortedKeys.slice(-12);

        const chartData = {
            labels: last12MonthsKeys.map(monthYear => {
                const date = new Date(`${monthYear}-01`);
                return date.toLocaleString('default', { month: 'short', year: '2-digit' });
            }),
            datasets: [
                {
                    label: "Total Portfolio",
                    data: last12MonthsKeys.map(key => monthlyNetGains[key]),
                    borderColor: "#007bff",
                    fill: false,
                    type: "line",
                },
                ...Object.keys(categoryGains).map(category => ({
                    label: category,
                    data: last12MonthsKeys.map(key => categoryGains[category][key] || 0),
                    backgroundColor: "#" + Math.floor(Math.random() * 16777215).toString(16),
                    type: "bar",
                })),
            ],
        };

        const ctx = document.getElementById("investment-report-chart");
        if (!ctx) {
            console.error("Chart canvas element not found.");
            return;
        }

        new Chart(ctx.getContext("2d"), {
            type: "bar",
            data: chartData,
            options: {
                scales: {
                    y: { beginAtZero: true },
                    x: { stacked: true },
                },
                plugins: { legend: { position: "bottom" } },
            },
        });
    }

    initInvestmentChart().catch(error => {
        console.error(`Error initializing investment chart: ${error}`);
    });
});

</script>