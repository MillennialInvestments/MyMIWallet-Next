<?php
// print_r($totalUserInvestments);
//print_r("totalTradeValueSum: " . $totalTradeValueSum);
// $this->db->select('shares, net_gains, category, symbol, closed');
// $this->db->from('bf_users_trades');
// $this->db->where('active', 1);
// $this->db->where('closed', 'false');
// $this->db->where('user_id', $cuID);
// $query = $this->db->get();
// print_r($query->result_array());
?>
<div class="card card-bordered h-100">
    <div class="card-inner">
        <div class="card-title-group align-start mb-3">
            <div class="card-title">
                <h6 class="title">Month-to-Month Overview</h6>
                <p>Click on the legend below to hide or show parts of the chart and edit the timeframe at the bottom of it</p>
            </div>
            <div class="card-tools mt-n1 me-n1">
                <div class="dropdown text-white d-sm-none d-md-block">
                    <a href="#" class="btn btn-primary btn-md text-white" data-bs-toggle="dropdown" aria-expanded="false"><span>Chart Settings</span><em class="icon ni ni-setting"></em></a>
                    <div class="dropdown-menu dropdown-menu-end dropdown-menu-auto mt-1" style="">
                        <ul class="link-list-opt no-bdr">
                            <li class="p-1">
                                <h7>Start Date?</h7>
                                <input type="date" name="start-date" id="start-date">   
                            </li>
                            <li class="divider"></li>
                            <li class="p-1">
                                <h7>Historical Timeline?</h7>
                                <select class="form-select form-control link-list-opt no-bdr" id="chart-lower" aria-label="Default select ">
                                    <option value="-12">-12 months</option>
                                    <option value="-6">-6 months</option>
                                    <option value="-3">-3 months</option>
                                    <option value="-1" selected>-1 month</option>
                                    <option value="0">Only Forward</option>
                                </select>                                                              
                            </li>
                            <li class="divider"></li>
                            <li class="p-1">             
                                <h7>Forward-Looking?</h7>
                                <select class="form-select form-control" id="chart-upper" aria-label="Default select ">
                                    <option value="12" selected>12 months</option>
                                    <option value="6">6 months</option>
                                    <option value="3">3 months</option>
                                    <option value="1">1 month</option>
                                    <option value="0">Only Backward</option>
                                </select> 
                            </li>
                        </ul>         
                    </div>
                </div>
            </div>
        </div><!-- .card-title-group -->
        <div class="nk-order-ovwg">
            <div class="row g-4 align-end">
                <div class="col-12">
                    <div class="nk-order-ovwg-ck" style="height:100%;">
                        <?php //print_r($totalUserInvestments); ?>
                        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.1.2/Chart.min.js"></script>
                        <?php echo '<div id="investment-data" hidden>' .json_encode($totalUserInvestments,true) . '</div>'; //print_r(json_encode($userInvestmentRecords));?>
                        <div class="h-100">
                            <canvas class="h-100" id="investment-report-chart"></canvas>
                        </div>  
                        <!-- <canvas id="myChart" width="400" height="400"></canvas>
                        <script <?= $nonce['script'] ?? '' ?>>
                            var ctx = document.getElementById('myChart').getContext('2d');
                            var myChart = new Chart(ctx, {
                            type: 'bar',
                            data: {
                                labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
                                datasets: [{
                                label: '# of Votes',
                                data: [12, 19, 3, 5, 2, 3],
                                backgroundColor: 'rgba(255, 99, 132, 0.2)'
                                }]
                            }
                            });
                        </script>                             -->
                    </div>
                </div><!-- .col -->
            </div>
        </div><!-- .nk-order-ovwg -->
        <!-- <div class="nk-order-ovwg">
            <div class="row g-4 align-end">
                <div class="col-12">
                    <h6>This month's performance</h6>
                    <p>A quick visual summary of your incomes and expenses this month</p>
                </div>
            </div>
        </div>
        <?php //print_r($totalTradeValueSum); ?>
        <div class="nk-order-ovwg py-5">
            <div class="row g-4 align-end">
                <div class="col-12 col-sm-3 col-md-6 col-xxl-3">
                    <a href="<?php echo site_url('Budget/Income'); ?>">
                        <div class="nk-order-ovwg-data surplus">
                            <div class="title"><em class="icon ni ni-arrow-down-left"></em> <small>Net Worth</small></div>
                            <div class="amount"><?php echo $totalTradeValueSum . ' <small>(' . $totalAnnualTradePerformance .'% P&L)</small>'; ?></div>
                            <div class="amount"><?php //echo $totalTradeValueSum . ' <small>(' . $totalAnnualTradePerformance .'% P&L)</small>'; ?></div>
                            <div class="info row">
                                <span class="col-6 p-0">Total Assets</span><span class="col-6 p-0 text-right"><strong><?php echo $totalAssetValueSum; ?></strong></span>
                                <span class="col-6 p-0">Total Investments</span><span class="col-6 p-0 text-right"><strong><?php echo $lastMonthTradePerformance; ?></strong></span>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-12 col-sm-3 col-md-6 col-xxl-3">
                    <a href="<?php echo site_url('Budget/Expenses'); ?>">
                        <div class="nk-order-ovwg-data surplus">
                            <div class="title"><em class="icon ni ni-arrow-up-left"></em> <small>Annual Performance</small></div>
                            <div class="amount"><?php echo $totalActiveTradeCount; ?></div> <?php // !! Link to list of active trades. Trade-Tracker?? ?>
                            <div class="info row">
                                <span class="col-6 p-0">Monthly Performance</span><span class="col-6 p-0 text-right"><strong><?php echo $userTopGainer; ?></strong></span>
                                <span class="col-6 p-0">Investment Milestones</span><span class="col-6 p-0 text-right"><strong><?php echo $userTopLoser; ?></strong></span>
                                <span class="col-12"></span>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-12 col-sm-3 col-md-6 col-xxl-3">
                    <a href="">
                        <div class="nk-order-ovwg-data surplus">
                            <div class="title"><em class="icon ni ni-arrow-down-left"></em> <small>Annual Performance</small></div>
                            <div class="amount"><?php echo $userCurrentAnnualValue; ?></div>
                            <div class="info row">
                                <span class="col-6 p-0">Annual P&L</span><span class="col-6 p-0 text-right"><strong><?php echo $userCurrentAnnualPerformance; ?></strong></span>
                                <span class="col-6 p-0">Annual Target</span><span class="col-6 p-0 text-right"><strong><?php echo $userCurrentAnnualTarget; ?></strong></span>
                                <span class="col-12"></span>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-12 col-sm-3 col-md-6 col-xxl-3">
                    <a href="">
                        <div class="nk-order-ovwg-data surplus">
                            <div class="title"><em class="icon ni ni-arrow-up-left"></em> <small>Total Assets</small></div>
                            <div class="amount"><?php echo $totalUserAssetsValue; ?></div>
                            <div class="info row">
                                <span class="col-6 p-0">Total Assets</span><span class="col-6 p-0 text-right"><strong><?php echo $totalUserAssetsCount; ?></strong></span>
                                <span class="col-6 p-0">Annual P&L</span><span class="col-6 p-0 text-right"><strong><?php echo $totalUserAssetPerformance; ?></strong></span>
                                <span class="col-12"></span>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div> -->
    </div><!-- .card-inner -->
</div><!-- .card -->
<script <?= $nonce['script'] ?? '' ?>>
    // Initialize cache for storing API responses
    // Using Map for simplicity, consider Redis for a more scalable solution
    const cache = new Map();

    const alphaVantageConfig = {
    // Stocks
    'getGlobalQuote': 'TIME_SERIES_INTRADAY', // endpoint for fetching real-time stock data
    'getBalanceSheet': 'BALANCE_SHEET',
    'getBatchStockQuotes': 'GLOBAL_QUOTE',
    // 'getBatchStockQuotes': 'BATCH_STOCK_QUOTES',
    'getCompanyOverview': 'OVERVIEW',
    'getIncomeStatement': 'INCOME_STATEMENT',
    'getIPOCalendar': 'IPO_CALENDAR',
    'getListingDelistingStatus': 'LISTING_STATUS',
    'getEarnings': 'EARNINGS',
    'getTimeSeriesDaily': 'TIME_SERIES_DAILY',
    'getTimeSeriesIntraday': 'TIME_SERIES_INTRADAY',
    'getTimeSeriesIntradayExtended': 'TIME_SERIES_INTRADAY_EXTENDED',
    'getTimeSeriesWeekly': 'TIME_SERIES_WEEKLY',
    'getTimeSeriesMonthly': 'TIME_SERIES_MONTHLY',
    'getTimeSeriesWeeklyAdjusted': 'TIME_SERIES_WEEKLY_ADJUSTED',
    'getTimeSeriesMonthlyAdjusted': 'TIME_SERIES_MONTHLY_ADJUSTED',
    'getEarningsCalendar': 'EARNINGS_CALENDAR',


    // Cryptocurrency
    'getCryptoDaily': 'DIGITAL_CURRENCY_DAILY',
    'getCryptoMonthly': 'DIGITAL_CURRENCY_MONTHLY',
    'getCryptoWeekly': 'DIGITAL_CURRENCY_WEEKLY',
    'getCryptoRating': 'CRYPTO_RATING',
    'getCryptoExchangeRate': 'CURRENCY_EXCHANGE_RATE',
    'getCryptoIntraday': 'CRYPTO_INTRADAY', // custom endpoint
    
    // Bonds, Mutual Funds, ETFs
    'getBondInfo': 'BOND_INFO',
    'getMutualFundDaily': 'TIME_SERIES_DAILY', // assuming daily time series
    'getETFDaily': 'TIME_SERIES_DAILY', // assuming daily time series
    
    // Forex
    'getFXIntraday': 'FX_INTRADAY',
    'getFXRate': 'CURRENCY_EXCHANGE_RATE',
    'getFXMonthly': 'FX_MONTHLY',
    'getFXWeekly': 'FX_WEEKLY',

    // Commodities, Real Estate, Precious Metal
    'getCommodityData': 'GLOBAL_QUOTE', // assuming global quote for commodities
    'getRealEstateInfo': 'REAL_ESTATE_INFO', // custom endpoint
    'getPreciousMetalInfo': 'PRECIOUS_METAL_INFO', // custom endpoint

    // Others
    'getEarningsCalendar': 'EARNINGS_CALENDAR',
    'getEconomicIndicator': 'ECONOMIC_INDICATOR',
    'getNewsSentiment': 'NEWS_SENTIMENT',
    'getSectorPerformance': 'SECTOR',
    'getTechnicalIndicator': 'TECHNICAL_INDICATOR',
    'getSymbolSearch': 'SYMBOL_SEARCH',
    'getTimeSeriesIntraday': 'TIME_SERIES_INTRADAY',
    'getTimeSeriesIntradayExtended': 'TIME_SERIES_INTRADAY_EXTENDED',
    

    // Custom methods
    'getListingDelistingStatus': 'LISTING_DELISTING_STATUS',
    'getInternationalExchanges': 'INTERNATIONAL_EXCHANGES',
    'getIPOCalendar': 'IPO_CALENDAR',
    'scanLowerHighsHigherLows': 'TIME_SERIES_INTRADAY' // assuming intraday time series
    
    // ... add more as required
    };

    // Make it globally accessible if needed
    window.alphaVantageConfig = alphaVantageConfig;


    const tradeTypeToEndpointKey  = {
        'Stock': 'getGlobalQuote',
        'Cryptocurrency': 'getCryptoDaily',
        'Crypto Asset': 'getCryptoDaily',
        'Bond': 'getBondInfo',
        'Forex': 'getFXIntraday',
        'Options': undefined, // No direct mapping found in alphaVantageConfig
        'Mutual Fund': 'getMutualFundDaily',
        'Exchange-Traded Fund (ETF)': 'getETFDaily',
        'Real Estate': 'getRealEstateInfo',
        'Commodity': 'getCommodityData',
        'Foreign Stock': undefined, // No direct mapping found in alphaVantageConfig
        'Precious Metal': 'getPreciousMetalInfo',
        'International Bond': undefined // No direct mapping found in alphaVantageConfig
    };


    // Helper function to fetch data from API
    async function fetchFromApi(url) {
        try {
            const response = await fetch(url, { headers: { "X-Requested-With": "XMLHttpRequest" } });
            const data = await response.json();
            return data;
        } catch (error) {
            console.error(`Error fetching from API: ${error}`);
            return null;
        }
    }


    // Function to get API config for a symbol based on trade type
    async function getConfig(symbol, category) {
        const apiKey = '70BOHXX3E6JX9H88'; // Replace with your actual API key

        // Debugging lines
        console.log('alphaVantageConfig:', window.alphaVantageConfig);
        
        // Get the appropriate endpoint key based on the trade type
        const endpointKey = tradeTypeToEndpointKey[category];
        
        // Debugging lines
        console.log('endpointKey:', endpointKey);
        
        // Check if alphaVantageConfig exists and contains the expected keys
        if (!window.alphaVantageConfig || !window.alphaVantageConfig[endpointKey]) {
            console.error(`Unsupported or missing configuration for trade type: ${category}`);
            return null;
        }
        
        // Fetch the endpoint pattern from the server-defined configurations
        const endpointPattern = window.alphaVantageConfig[endpointKey];
        
        // Replace placeholders in the pattern
        const url = endpointPattern.replace("{symbol}", symbol).replace("{api_key}", apiKey);
        
        return {
            url: url
        };
    }



    // Fetch live updates and calculate net gains
    async function fetchLiveUpdates(symbol, shares) {
        const cacheKey = `currentPrice:${symbol}`;
        if (cache.has(cacheKey)) {
            return cache.get(cacheKey) * shares;
        }

        const url = `https://www.alphavantage.co/query?function=TIME_SERIES_INTRADAY&symbol=${symbol}&interval=5min&apikey=70BOHXX3E6JX9H88`;
        const data = await fetchFromApi(url);

        if (data && data['Time Series (5min)']) {
            const latestData = data['Time Series (5min)'][Object.keys(data['Time Series (5min)'])[0]];
            const currentPrice = parseFloat(latestData['4. close']);
            cache.set(cacheKey, currentPrice);
            setTimeout(() => cache.delete(cacheKey), 60000); // Invalidate cache after 1 minute
            return currentPrice * shares;
        }

        return 0;
    }

    // Initialize the last 12 months with zeros
    // New Function to handle months with no records
    function initializeLast12Months() {
        const monthlyNetGains = {};
        const date = new Date();
        for (let i = 0; i < 12; i++) {
            const monthYear = `${date.getFullYear()}-${String(date.getMonth() + 1).padStart(2, "0")}`;
            monthlyNetGains[monthYear] = 0;
            date.setMonth(date.getMonth() - 1);
        }
        return monthlyNetGains;
    }

    // Initialize the chart
    initInvestmentChart().catch(error => {
        console.error(`Error initializing investment chart: ${error}`);
        // TODO: Add real-time alert for immediate issue resolution
        sendRealTimeAlert(`Error initializing investment chart: ${error}`);
    });

    // Hypothetical third-party service for real-time alerts
    function sendRealTimeAlert(message) {
        // Implementation details for sending real-time alerts.
        // You could use a service like Sentry, Twilio, etc.
        console.log(`Sending real-time alert: ${message}`);
    }

    // Helper function to reformat month-year strings
    function reformatMonthYear(monthYearStr) {
    const date = new Date(`${monthYearStr}-01`);
    const monthNames = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sept", "Oct", "Nov", "Dec"];
    const month = monthNames[date.getMonth()];
    const year = date.getFullYear().toString().substr(-2);
    return `${month} '${year}`;
    }

    // Main function to initialize the ChartJS chart
    async function initInvestmentChart() {
        const rawDataStr = document.querySelector("#investment-data").innerText;
        if (!rawDataStr) {
            throw new Error("Raw data string is empty or undefined.");
        }
        const rawData = JSON.parse(rawDataStr);
        if (!rawData || !Array.isArray(rawData)) {
            throw new Error("Parsed raw data is invalid.");
        }
        const monthlyNetGains = initializeLast12Months();  // Initialize with zeros

        const fetchPromises = rawData.map(async (item, index) => {
            let isValid = true;

            // Detailed validation logic
            if (!item) {
                console.warn(`Skipping item at index ${index} because it is null or undefined.`);
                isValid = false;
            }
            
            if (!item.symbol) {
                console.warn(`Skipping item at index ${index} because 'symbol' is missing or invalid.`);
                isValid = false;
            }

            if (!item.category) {
                console.warn(`Skipping item at index ${index} because 'tradeType' is missing or invalid.`);
                isValid = false;
            }

            if (!item.shares) {
                console.warn(`Skipping item at index ${index} because 'shares' is missing or invalid.`);
                isValid = false;
            }

            if (!item.category) {
                console.warn(`Skipping item at index ${index} because 'category' is missing or invalid.`);
                isValid = false;
            }

            if (!isValid) {
                return;  // Skip this iteration if any validation failed
            }
            const closeDate = item.close_date ? new Date(item.close_date) : new Date();
            const monthYear = `${closeDate.getFullYear()}-${String(closeDate.getMonth() + 1).padStart(2, "0")}`;
            
            const config = await getConfig(item.symbol, item.category); // use item.category instead of item.tradeType
            const gain = await fetchLiveUpdates(item.symbol, item.shares);
            monthlyNetGains[monthYear] = (monthlyNetGains[monthYear] || 0) + gain;
        });

        // Wait for all fetches to complete
        await Promise.all(fetchPromises);

        // Sort the monthlyNetGains keys (month-year strings)
        const sortedKeys = Object.keys(monthlyNetGains).sort();

        // Limit to the last 12 months
        const last12MonthsKeys = sortedKeys.slice(-12);

        // Extract the corresponding values
        const last12MonthsValues = last12MonthsKeys.map(key => monthlyNetGains[key]);

        // Initialize the chart
        const ctx = document.getElementById("investment-report-chart").getContext("2d");
        const formattedLabels = last12MonthsKeys.map(reformatMonthYear);  // New line to format labels
        new Chart(ctx, {
            type: "line",
            data: {
                labels: formattedLabels,
                datasets: [{
                    label: "Monthly Portfolio Performance",
                    data: last12MonthsValues,
                    borderColor: "rgb(75, 192, 192)",
                    fill: false
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    }
</script>