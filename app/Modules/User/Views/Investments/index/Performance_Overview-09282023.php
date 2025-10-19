<?php
print_r($totalTradeValueSum);
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
        <div class="nk-order-ovwg">
            <div class="row g-4 align-end">
                <div class="col-12">
                    <h6>This month's performance</h6>
                    <p>A quick visual summary of your incomes and expenses this month</p>
                </div>
            </div>
        </div>
        <div class="nk-order-ovwg py-5">
            <div class="row g-4 align-end">
                <div class="col-12 col-sm-3 col-md-6 col-xxl-3">
                    <a href="<?php echo site_url('Budget/Income'); ?>">
                        <div class="nk-order-ovwg-data surplus">
                            <div class="title"><em class="icon ni ni-arrow-down-left"></em> <small>Net Worth</small></div>
                            <div class="amount"><?php echo $totalTradeValueSum . ' <small>(' . $totalAnnualTradePerformance .'% P&L)</small>'; ?></div>
                            <div class="info row">
                                <span class="col-6 p-0">This Month</span><span class="col-6 p-0 text-right"><strong><?php echo $thisMonthTradePerformance; ?></strong></span>
                                <span class="col-6 p-0">Last Month</span><span class="col-6 p-0 text-right"><strong><?php echo $lastMonthTradePerformance; ?></strong></span>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-12 col-sm-3 col-md-6 col-xxl-3">
                    <a href="<?php echo site_url('Budget/Expenses'); ?>">
                        <div class="nk-order-ovwg-data surplus">
                            <div class="title"><em class="icon ni ni-arrow-up-left"></em> <small>Active Investments</small></div>
                            <div class="amount"><?php echo $totalActiveTradeCount; ?></div> <?php // !! Link to list of active trades. Trade-Tracker?? ?>
                            <div class="info row">
                                <span class="col-6 p-0">Top Gainer</span><span class="col-6 p-0 text-right"><strong><?php echo $userTopGainer; ?></strong></span>
                                <span class="col-6 p-0">Top Loser</span><span class="col-6 p-0 text-right"><strong><?php echo $userTopLoser; ?></strong></span>
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
        </div>
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
  'getBatchStockQuotes': 'BATCH_STOCK_QUOTES',
  'getCompanyOverview': 'OVERVIEW',

  // Cryptocurrency
  'getCryptoDaily': 'DIGITAL_CURRENCY_DAILY',
  'getCryptoMonthly': 'DIGITAL_CURRENCY_MONTHLY',
  'getCryptoWeekly': 'DIGITAL_CURRENCY_WEEKLY',
  'getCryptoRating': 'CRYPTO_RATING',
  
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

// const cache = new Map();

// // Helper function to fetch data from API
// async function fetchFromApi(url) {
//     try {
//         const response = await fetch(url, { headers: { "X-Requested-With": "XMLHttpRequest" } });
//         const data = await response.json();
//         return data;
//     } catch (error) {
//         console.error(`Error fetching from API: ${error}`);
//         return null;
//     }
// }

// // Fetch live updates and calculate net gains
// async function fetchLiveUpdates(symbol, shares) {
//     const cacheKey = `currentPrice:${symbol}`;
//     if (cache.has(cacheKey)) {
//         return cache.get(cacheKey) * shares;
//     }

//     const url = `https://www.alphavantage.co/query?function=TIME_SERIES_INTRADAY&symbol=${symbol}&interval=5min&apikey=70BOHXX3E6JX9H88`;
//     const data = await fetchFromApi(url);

//     if (data && data['Time Series (5min)']) {
//         const latestData = data['Time Series (5min)'][Object.keys(data['Time Series (5min)'])[0]];
//         const currentPrice = parseFloat(latestData['4. close']);
//         cache.set(cacheKey, currentPrice);
//         setTimeout(() => cache.delete(cacheKey), 60000); // Invalidate cache after 1 minute
//         return currentPrice * shares;
//     }

//     return 0;
// }

// // Main function to initialize the ChartJS chart
// async function initInvestmentChart() {
//     const rawDataStr = document.querySelector("#investment-data").innerText;
//     const rawData = JSON.parse(rawDataStr);
//     const monthlyNetGains = {};

//     for (const item of rawData) {
//         const closeDate = item.close_date ? new Date(item.close_date) : new Date();
//         const monthYear = `${closeDate.getFullYear()}-${String(closeDate.getMonth() + 1).padStart(2, "0")}`;
//         monthlyNetGains[monthYear] = (monthlyNetGains[monthYear] || 0) + await fetchLiveUpdates(item.symbol, item.shares);
//     }

//     const ctx = document.getElementById("investment-report-chart").getContext("2d");
//     new Chart(ctx, {
//         type: "line",
//         data: {
//             labels: Object.keys(monthlyNetGains),
//             datasets: [{
//                 label: "Net gains per month",
//                 data: Object.values(monthlyNetGains),
//                 borderColor: "rgb(75, 192, 192)",
//                 fill: false
//             }]
//         },
//         options: {
//             scales: {
//                 y: {
//                     beginAtZero: true
//                 }
//             }
//         }
//     });
// }

// // Initialize the chart
// initInvestmentChart().catch(error => {
//     console.error(`Error initializing investment chart: ${error}`);
//     // TODO: Add real-time alert for immediate issue resolution
// });



    // console.log("Starting script...");
    // const cache = new Map();

    // // Helper function to format date to YYYY-MM
    // function formatDateToMonthYear(date) {
    //     return `${date.getFullYear()}-${String(date.getMonth() + 1).padStart(2, '0')}`;
    // }
    // // Common function to get month labels
    // const getMonthLabels = (startDate, endDate) => {
    // const months = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
    // let labels = [];
    // let currentMonth = startDate.getMonth();
    // let currentYear = startDate.getFullYear();

    // while (currentYear < endDate.getFullYear() || (currentYear === endDate.getFullYear() && currentMonth <= endDate.getMonth())) {
    //     labels.push(`${months[currentMonth]} ${currentYear}`);
    //     currentMonth++;
    //     if (currentMonth > 11) {
    //     currentMonth = 0;
    //     currentYear++;
    //     }
    // }
    // return labels;
    // };

    // // Function to fetch and prepare investment data
    // const fetchAndPrepareInvestmentData = async (startDate, endDate, rawDataStr) => {
    //     console.log("Fetching and preparing investment data...");
    //     // Initialize an empty object to store aggregated data
    //     let aggregatedData = {};

    //     // Your existing fetchLiveUpdates and calculateMonthlyNetGains logic here
    //     // Helper function to fetch data from API
    //     async function fetchFromApi(url) {
    //         console.log(`Fetching from API: ${url}`);
    //         const response = await fetch(url, {
    //             headers: { "X-Requested-With": "XMLHttpRequest" }
    //         });
    //         const textResponse = await response.text();
    //         console.log(`API Response: ${textResponse}`);
    //         return textResponse;
    //     }

    //     // Helper function to parse AlphaVantage API response
    //     async function parseAlphaVantageResponse(e){
    //         console.log("Parsing AlphaVantage API response...");
    //         let jsonResponse = JSON.parse(e);
    //         if(jsonResponse && jsonResponse["Time Series (5min)"]) {
    //             let t = jsonResponse["Time Series (5min)"];
    //             let a = parseFloat(t[Object.keys(t)[0]]["4. close"]);
    //             console.log(`Parsed Data: ${a}`);
    //             return a;
    //         } else {
    //             console.log("Unexpected API response:", e);
    //             throw new Error("Unexpected API response");
    //         }
    //     }

    //     // Function to fetch live updates
    //     async function fetchLiveUpdates(symbol, shares, category) {
    //         console.log(`Fetching live updates for ${symbol} of category ${category}`);
            
    //         // Check cache first
    //         if (cache.has(`currentPrice:${symbol}`)) {
    //             console.log(`Cache hit for ${symbol}`);
    //             return cache.get(`currentPrice:${symbol}`) * shares;
    //         }

    //         const apiKey = "70BOHXX3E6JX9H88"; // Consider storing this in a config file
    //         const url = `https://www.alphavantage.co/query?function=TIME_SERIES_INTRADAY&symbol=${symbol}&interval=5min&apikey=${apiKey}`;
            
    //         try {
    //             const apiResponse = await fetchFromApi(url);
    //             console.log(`API Response for ${symbol}:`, apiResponse);
    //             const currentPrice = await parseAlphaVantageResponse(apiResponse);
                
    //             // Cache the result using Redis or similar advanced systems
    //             console.log(`Caching current price for ${symbol}`);
    //             cache.set(`currentPrice:${symbol}`, currentPrice);
                
    //             // Remove from cache after 1 minute
    //             setTimeout(() => {
    //             console.log(`Removing ${symbol} from cache`);
    //             cache.delete(`currentPrice:${symbol}`);
    //             }, 60000);
                
    //             return currentPrice * shares;
    //         } catch (error) {
    //             console.error(`Error fetching live updates for ${symbol}:`, error);
    //             // Implement real-time alerts for immediate issue resolution
    //             return 0;
    //         }
    //     }

    //     // Function to calculate monthly net gains
    //     async function calculateMonthlyNetGains(investments) {
    //         console.log("Calculating monthly net gains...");
    //         console.log("Investments data:", investments);  // Log the data

    //         if (!investments || !Array.isArray(investments)) {  // Check if data is valid
    //             console.error("Invalid investments data");
    //             return {};
    //         }
    //         let monthlyNetGains = {};
    //         const last12Months = Array.from({ length: 12 }, (_, i) => {
    //             const d = new Date();
    //             d.setMonth(d.getMonth() - i);
    //             return formatDateToMonthYear(d);
    //         }).reverse();

    //         for (const investment of investments) {
    //             if (!investment) {
    //                 console.log("Skipping invalid record:", investment);
    //                 continue;
    //             }
    //             const closeDate = investment.close_date ? new Date(investment.close_date) : new Date();
    //             const formattedCloseDate = formatDateToMonthYear(closeDate);

    //             if (last12Months.includes(formattedCloseDate)) {
    //                 monthlyNetGains[formattedCloseDate] = monthlyNetGains[formattedCloseDate] || 0;
    //                 const netGains = await fetchLiveUpdates(investment.symbol, investment.shares, investment.category);
    //                 console.log(`Net gains for ${investment.symbol}: ${netGains}`);
    //                 monthlyNetGains[formattedCloseDate] += netGains;
    //             }
    //         }

    //         // Using Promise.all to run async calls in parallel
    //         const netGainsPromises = investments.map(async (investment) => {
    //             if (!investment) {
    //                 console.log("Skipping invalid record:", investment);
    //                 return;
    //             }
    //             const closeDate = investment.close_date ? new Date(investment.close_date) : new Date();
    //             const formattedCloseDate = formatDateToMonthYear(closeDate);
    //             if (last12Months.includes(formattedCloseDate)) {
    //                 monthlyNetGains[formattedCloseDate] = monthlyNetGains[formattedCloseDate] || 0;
    //                 const netGains = await fetchLiveUpdates(investment.symbol, investment.shares, investment.category);
    //                 console.log(`Net gains for ${investment.symbol}: ${netGains}`);
    //                 monthlyNetGains[formattedCloseDate] += netGains;
    //             }
    //         });

    //         await Promise.all(netGainsPromises).catch(e => console.error("Error in netGainsPromises:", e)); // Wait for all promises to resolve

    //         console.log("Final monthlyNetGains:", monthlyNetGains);
    //         return monthlyNetGains;
    //     }

    //     // Debug: Log the rawDataStr to inspect its format
    //     console.log("Raw Data String:", rawDataStr);
        
    //     // Assume it returns an array of investment data
    //     const rawData = JSON.parse(rawDataStr);
    //     console.log("Parsed Raw Data:", rawData);
        
    //     // Check if rawData is an array
    //     if (Array.isArray(rawData)) {
    //         rawData.forEach(record => {
    //             const recordDate = new Date(record.date);
    //             console.log("Record Date:", recordDate);
    //             if (recordDate >= startDate && recordDate <= endDate) {
    //                 const monthYear = formatDateToMonthYear(recordDate);
    //                 aggregatedData[monthYear] = (aggregatedData[monthYear] || 0) + record.amount;
    //             }
    //             // Inside the forEach loop
    //             console.log("Processing record:", record);  
    //             console.log("Aggregated Data so far:", aggregatedData);

    //         });
    //         console.log("Processed Data:", aggregatedData);
    //         return Object.values(aggregatedData);
    //     } else {
    //         console.error("Invalid rawData type. Expected an array.");
    //         return;
    //     }

    //     return Object.values(aggregatedData); // Returning the populated aggregatedData
    // };

    // // Initialize chart
    // const initInvestmentChart = async () => {
    //     console.log("Initializing investment chart...");

    //     // Read the user's selections for historical timeline and forward-looking months
    //     const historicalTimeline = parseInt(document.getElementById("chart-lower").value, 10);
    //     const forwardLooking = parseInt(document.getElementById("chart-upper").value, 10);

    //     // Initialize start and end dates
    //     let startDate = new Date();
    //     startDate.setMonth(startDate.getMonth() + historicalTimeline);

    //     // Check for a custom start date and update startDate if it exists
    //     const customStartDate = document.getElementById("start-date").value;
    //     if (customStartDate) {
    //         startDate = new Date(customStartDate);
    //     }

    //     let endDate = new Date();
    //     endDate.setMonth(endDate.getMonth() + forwardLooking);

    //     // Fetch and prepare the investment data
    //     const rawDataStr = document.querySelector("#investment-data").innerText;
    //     if (rawDataStr) {
    //         const investmentData = await fetchAndPrepareInvestmentData(startDate, endDate, rawDataStr);
    //         console.log("Data for chart:", investmentData);

    //         // Check if data is null or empty
    //         if (!investmentData || investmentData.length === 0) {
    //             console.error('Data for chart is empty or null');
    //             return;  // This should be fine if it's inside the function
    //         }

    //         // Initialize the Chart.js chart
    //         const ctx = document.getElementById("investment-report-chart");
    //         const chart = new Chart(ctx, {
    //             type: "line",
    //             data: {
    //                 labels: getMonthLabels(startDate, endDate),
    //                 datasets: [
    //                     {
    //                         label: "Investment",
    //                         data: investmentData,
    //                         borderColor: "rgb(75, 192, 192)",
    //                         fill: false,
    //                     },
    //                 ],
    //             },
    //             options: {
    //                 scales: {
    //                     y: { beginAtZero: true },
    //                 },
    //             },
    //         });

    //         // Add event listener to update the chart when the date range changes
    //         document.getElementById("date-range").addEventListener("change", async () => {
    //             const newStartDate = new Date(document.getElementById("start-date").value);
    //             const newEndDate = new Date(document.getElementById("end-date").value);
    //             const newInvestmentData = await fetchAndPrepareInvestmentData(newStartDate, newEndDate);
    //             chart.data.labels = getMonthLabels(newStartDate, newEndDate);
    //             chart.data.datasets[0].data = newInvestmentData;
    //             chart.update();
    //         });
    //     }
    // };




    // console.log("Starting script...");

    // // Initialize Redis or similar caching system
    // const cache = new Map();

    // // Helper function to format date to YYYY-MM
    // function formatDateToMonthYear(date) {
    // return `${date.getFullYear()}-${String(date.getMonth() + 1).padStart(2, '0')}`;
    // }

    // // Helper function to fetch data from API
    // async function fetchFromApi(url) {
    // console.log(`Fetching from API: ${url}`);
    // const response = await fetch(url, {
    //     headers: { "X-Requested-With": "XMLHttpRequest" }
    // });
    // const textResponse = await response.text();
    // console.log(`API Response: ${textResponse}`);
    // return textResponse;
    // }

    // // Helper function to parse AlphaVantage API response
    // async function parseAlphaVantageResponse(e){
    // console.log("Parsing AlphaVantage API response...");
    // let jsonResponse = JSON.parse(e);
    // if(jsonResponse && jsonResponse["Time Series (5min)"]) {
    //     let t = jsonResponse["Time Series (5min)"];
    //     let a = parseFloat(t[Object.keys(t)[0]]["4. close"]);
    //     console.log(`Parsed Data: ${a}`);
    //     return a;
    // } else {
    //     console.log("Unexpected API response:", e);
    //     throw new Error("Unexpected API response");
    // }
    // }

    // // Function to fetch live updates
    // async function fetchLiveUpdates(symbol, shares, category) {
    // console.log(`Fetching live updates for ${symbol} of category ${category}`);
    
    // // Check cache first
    // if (cache.has(`currentPrice:${symbol}`)) {
    //     console.log(`Cache hit for ${symbol}`);
    //     return cache.get(`currentPrice:${symbol}`) * shares;
    // }

    // const apiKey = "70BOHXX3E6JX9H88"; // Consider storing this in a config file
    // const url = `https://www.alphavantage.co/query?function=TIME_SERIES_INTRADAY&symbol=${symbol}&interval=5min&apikey=${apiKey}`;
    
    // try {
    //     const apiResponse = await fetchFromApi(url);
    //     const currentPrice = await parseAlphaVantageResponse(apiResponse);
        
    //     // Cache the result using Redis or similar advanced systems
    //     console.log(`Caching current price for ${symbol}`);
    //     cache.set(`currentPrice:${symbol}`, currentPrice);
        
    //     // Remove from cache after 1 minute
    //     setTimeout(() => {
    //     console.log(`Removing ${symbol} from cache`);
    //     cache.delete(`currentPrice:${symbol}`);
    //     }, 60000);
        
    //     return currentPrice * shares;
    // } catch (error) {
    //     console.error(`Error fetching live updates for ${symbol}:`, error);
    //     // Implement real-time alerts for immediate issue resolution
    //     return 0;
    // }
    // }

    // // Function to calculate monthly net gains
    // async function calculateMonthlyNetGains(investments) {
    // console.log("Calculating monthly net gains...");
    // let monthlyNetGains = {};
    // const last12Months = Array.from({ length: 12 }, (_, i) => {
    //     const d = new Date();
    //     d.setMonth(d.getMonth() - i);
    //     return formatDateToMonthYear(d);
    // }).reverse();

    // for (const investment of investments) {
    //     if (!investment) {
    //     console.log("Skipping invalid record:", investment);
    //     continue;
    //     }
    //     const closeDate = investment.close_date ? new Date(investment.close_date) : new Date();
    //     const formattedCloseDate = formatDateToMonthYear(closeDate);

    //     if (last12Months.includes(formattedCloseDate)) {
    //     monthlyNetGains[formattedCloseDate] = monthlyNetGains[formattedCloseDate] || 0;
    //     const netGains = await fetchLiveUpdates(investment.symbol, investment.shares, investment.category);
    //     console.log(`Net gains for ${investment.symbol}: ${netGains}`);
    //     monthlyNetGains[formattedCloseDate] += netGains;
    //     }
    // }

    // console.log("Final monthlyNetGains:", monthlyNetGains);
    // return monthlyNetGains;
    // }


    // // Main function
    // async function main() {
    // console.log("Main function started...");
    // const investmentData = document.querySelector("#investment-data").innerText;
    // let userInvestmentRecords;
    
    // try {
    //     console.log("Parsing investment data...");
    //     userInvestmentRecords = JSON.parse(investmentData);
    //     console.log("Parsed User Investment Records:", userInvestmentRecords);
    // } catch (error) {
    //     console.error("Error parsing JSON:", error);
    //     return;
    // }
    
    // const monthlyNetGains = await calculateMonthlyNetGains(userInvestmentRecords);
    
    // let n = await calculateMonthlyNetGains(t);

    // // Validate that we have data for the last 12 months
    // if(Object.keys(n).length < 12) {
    //     console.log("Insufficient data for the last 12 months");
    //     return;
    // }
    
    // const ctx = document.getElementById("report-chart").getContext("2d");
    // new Chart(ctx, {
    //     type: "line",
    //     data: {
    //     labels: Object.keys(monthlyNetGains),
    //     datasets: [{
    //         label: "Net gains per month",
    //         data: Object.values(monthlyNetGains),
    //         fill: false,
    //         borderColor: "rgb(75, 192, 192)",
    //         tension: 0.1
    //     }]
    //     },
    //     options: {
    //     scales: {
    //         x: { title: { display: true, text: "Month" } },
    //         y: { title: { display: true, text: "Net gains" } }
    //     }
    //     }
    // });
    // console.log("Chart rendered.");
    // }

    // // Run the main function
    // main();

    // console.log("Starting script...");
    // let investmentData = document.querySelector("#investment-data").innerText,
    //     userInvestmentRecords;
    // console.log("Investment Data:", investmentData);

    // try {
    //     userInvestmentRecords = JSON.parse(investmentData);
    //     console.log("Parsed User Investment Records:", userInvestmentRecords);
    // } catch (e) {
    //     console.error("Error parsing JSON:", e);
    // }

    // function validateRecord(e) {
    //     return !!e && (!!e.hasOwnProperty("close_date") || "Open" === e.status);
    // }

    // async function fetchFromApi(e) {
    //     return await (await fetch(e, { headers: { "X-Requested-With": "XMLHttpRequest" } })).text();
    // }

    // async function parseAlphaVantageResponse(e) {
    //     let t = JSON.parse(e)["Time Series (5min)"];
    //     return t[Object.keys(t)[0]]["4. close"];
    // }

    // async function fetchLiveUpdates(e, t, a, n) {
    //     console.log(`Fetching live updates for ${e} of category ${n}`);  // Changed 'type' to 'category'
        
    //     let r, s = localStorage.getItem(`currentPrice:${e}`), o, i;

    //     switch (n) {
    //         case 'Stock':
    //             o = 'TIME_SERIES_INTRADAY';
    //             break;
    //         case 'Cryptocurrency':
    //         case 'Crypto Asset':
    //             o = 'DIGITAL_CURRENCY_DAILY';
    //             break;
    //         case 'Bond':
    //             o = 'BOND_FUNCTION'; // Replace with actual AlphaVantage function for bonds
    //             break;
    //         case 'Forex':
    //             o = 'FX_INTRADAY';
    //             break;
    //         case 'Options':
    //             o = 'OPTIONS_FUNCTION'; // Replace with actual AlphaVantage function for options
    //             break;
    //         case 'Mutual Fund':
    //             o = 'MUTUAL_FUND_FUNCTION'; // Replace with actual AlphaVantage function for mutual funds
    //             break;
    //         case 'Exchange-Traded Fund (ETF)':
    //             o = 'ETF_FUNCTION'; // Replace with actual AlphaVantage function for ETFs
    //             break;
    //         case 'Real Estate':
    //             o = 'REAL_ESTATE_FUNCTION'; // Replace with actual AlphaVantage function for real estate
    //             break;
    //         case 'Commodity':
    //             o = 'COMMODITY_FUNCTION'; // Replace with actual AlphaVantage function for commodities
    //             break;
    //         case 'Foreign Stock':
    //             o = 'FOREIGN_STOCK_FUNCTION'; // Replace with actual AlphaVantage function for foreign stocks
    //             break;
    //         case 'Precious Metal':
    //             o = 'PRECIOUS_METAL_FUNCTION'; // Replace with actual AlphaVantage function for precious metals
    //             break;
    //         case 'International Bond':
    //             o = 'INTERNATIONAL_BOND_FUNCTION'; // Replace with actual AlphaVantage function for international bonds
    //             break;
    //         default:
    //             o = "UNSUPPORTED";
    //     }

    //     if ("UNSUPPORTED" === o) {
    //         console.log("Unsupported trade type. Skipping API call.");
    //         return;
    //     }

    //     i = `https://www.alphavantage.co/query?function=${o}&symbol=${e}&interval=5min&apikey=70BOHXX3E6JX9H88`;
    //     console.log("Fetching URL:", i);

    //     if (s) {
    //         r = parseFloat(s);
    //     } else {
    //         try {
    //             let c = await fetchFromApi(i);
    //             console.log("Raw API Response:", c);
    //             try {
    //                 r = await parseAlphaVantageResponse(c);
    //             } catch (l) {
    //                 console.error("Invalid JSON response:", l);
    //             }
    //             localStorage.setItem(`currentPrice:${e}`, r);
    //             setTimeout(() => localStorage.removeItem(`currentPrice:${e}`), 60000);
    //         } catch (N) {
    //             console.error(`Error fetching live updates for ${e}:`, N);
    //         }
    //     }

    //     return r * t;
    // }

    // async function updateWallet(e) {
    //     try {
    //         e.net_gains = await fetchLiveUpdates(e.symbol, e.shares, e.category, e.category);  // Changed e.type to e.category
    //     } catch (t) {
    //         console.error(`Error updating wallet for ${e.symbol}:`, t);
    //     }
    // }

    // let monthlyNetGains = {};

    // async function calculateMonthlyNetGains() {
    //     for (let record of userInvestmentRecords) {
    //         if (!validateRecord(record)) continue;

    //         let category = record.category;
    //         let closeDate = record.close_date ? new Date(record.close_date).toISOString().slice(0, 7) : "Open Trades";

    //         monthlyNetGains[closeDate] = monthlyNetGains[closeDate] || 0;

    //         if (record.close_date) {
    //         monthlyNetGains[closeDate] += parseFloat(record.net_gains);
    //         } else {
    //         let liveNetGains = await fetchLiveUpdates(record.symbol, record.shares, category, category);
    //         monthlyNetGains[closeDate] += liveNetGains;
    //         }
    //     }
    //     console.log("Final monthlyNetGains:", monthlyNetGains);
    // }

    // async function main() {
    //     await calculateMonthlyNetGains();

    //     let labels = Object.keys(monthlyNetGains);
    //     let data = Object.values(monthlyNetGains);

    //     let ctx = document.getElementById("report-chart").getContext("2d");
    //     new Chart(ctx, {
    //         type: "line",
    //         data: {
    //         labels: labels,
    //         datasets: [{
    //             label: "Net gains per month",
    //             data: data,
    //             fill: false,
    //             borderColor: "rgb(75, 192, 192)",
    //             tension: 0.1
    //         }]
    //         },
    //         options: {
    //         scales: {
    //             x: { title: { display: true, text: "Month" } },
    //             y: { title: { display: true, text: "Net gains" } }
    //         }
    //         }
    //     });
    // }

    // main();


    // let investmentData = document.querySelector("#investment-data").innerText;
    // let userInvestmentRecords;

    // try {
    //     userInvestmentRecords = JSON.parse(investmentData);
    // } catch (e) {
    //     console.error("Error parsing JSON:", e);
    // }

    // function validateRecord(record) {
    //     return !!record && (!!record.hasOwnProperty("close_date") || "Open" === record.status);
    // }

    // async function fetchFromApi(url) {
    //     return await (await fetch(url, { headers: { "X-Requested-With": "XMLHttpRequest" } })).text();
    // }

    // async function parseAlphaVantageResponse(response) {
    //     let parsedData = JSON.parse(response)["Time Series (5min)"];
    //     return parsedData[Object.keys(parsedData)[0]]["4. close"];
    // }

    // async function fetchLiveUpdates(symbol, shares, category, type) {
    //     let currentPrice, cachedPrice = localStorage.getItem(`currentPrice:${symbol}`);
    //     let apiFunction, apiUrl;
    //     switch (type) {
    //             case 'Stock':
    //                 apiFunction = 'TIME_SERIES_INTRADAY';
    //                 break;
    //             case 'Cryptocurrency':
    //             case 'Crypto Asset':
    //                 apiFunction = 'DIGITAL_CURRENCY_DAILY';
    //                 break;
    //             case 'Bond':
    //                 apiFunction = 'BOND_FUNCTION'; // Replace with actual AlphaVantage function for bonds
    //                 break;
    //             case 'Forex':
    //                 apiFunction = 'FX_INTRADAY';
    //                 break;
    //             case 'Options':
    //                 apiFunction = 'OPTIONS_FUNCTION'; // Replace with actual AlphaVantage function for options
    //                 break;
    //             case 'Mutual Fund':
    //                 apiFunction = 'MUTUAL_FUND_FUNCTION'; // Replace with actual AlphaVantage function for mutual funds
    //                 break;
    //             case 'Exchange-Traded Fund (ETF)':
    //                 apiFunction = 'ETF_FUNCTION'; // Replace with actual AlphaVantage function for ETFs
    //                 break;
    //             case 'Real Estate':
    //                 apiFunction = 'REAL_ESTATE_FUNCTION'; // Replace with actual AlphaVantage function for real estate
    //                 break;
    //             case 'Commodity':
    //                 apiFunction = 'COMMODITY_FUNCTION'; // Replace with actual AlphaVantage function for commodities
    //                 break;
    //             case 'Foreign Stock':
    //                 apiFunction = 'FOREIGN_STOCK_FUNCTION'; // Replace with actual AlphaVantage function for foreign stocks
    //                 break;
    //             case 'Precious Metal':
    //                 apiFunction = 'PRECIOUS_METAL_FUNCTION'; // Replace with actual AlphaVantage function for precious metals
    //                 break;
    //             case 'International Bond':
    //                 apiFunction = 'INTERNATIONAL_BOND_FUNCTION'; // Replace with actual AlphaVantage function for international bonds
    //                 break;
    //             default:
    //                 apiFunction = "UNSUPPORTED";
    //         }

    //     if (apiFunction === "UNSUPPORTED") {
    //         console.log("Unsupported trade type. Skipping API call.");
    //         return;
    //     }

    //     apiUrl = `https://www.alphavantage.co/query?function=${apiFunction}&symbol=${symbol}&interval=5min&apikey=YOUR_SERVER_SIDE_API_KEY`;

    //     console.log("Fetching URL:", apiUrl);

    //     if (cachedPrice) {
    //         currentPrice = parseFloat(cachedPrice);
    //     } else {
    //         try {
    //             let apiResponse = await fetchFromApi(apiUrl);
    //             console.log("Raw API Response:", apiResponse);

    //             try {
    //                 currentPrice = await parseAlphaVantageResponse(apiResponse);
    //             } catch (error) {
    //                 console.error("Invalid JSON response:", error);
    //             }

    //             localStorage.setItem(`currentPrice:${symbol}`, currentPrice);
    //             setTimeout(() => localStorage.removeItem(`currentPrice:${symbol}`), 60000);
    //         } catch (err) {
    //             console.error(`Error fetching live updates for ${symbol}:`, err);
    //         }
    //     }

    //     return currentPrice * shares;
    // }

    // async function updateWallet(wallet) {
    //     try {
    //         wallet.net_gains = await fetchLiveUpdates(wallet.symbol, wallet.shares, wallet.category);
    //     } catch (error) {
    //         console.error(`Error updating wallet for ${wallet.symbol}: ${error}`);
    //     }
    // }

    // let monthlyNetGains = {};

    // async function calculateMonthlyNetGains() {
    //     for (let record of userInvestmentRecords) {
    //         if (!validateRecord(record)) continue;

    //         let category = record.category;
    //         let closeDateKey = record.close_date ? record.close_date.split("/").slice(0, 2).join("-") : "Open Trades";

    //         monthlyNetGains[closeDateKey] = monthlyNetGains[closeDateKey] || 0;

    //         if (record.close_date) {
    //             monthlyNetGains[closeDateKey] += parseFloat(record.net_gains);
    //         } else {
    //             let liveGain = await fetchLiveUpdates(record.symbol, record.shares, category);
    //             monthlyNetGains[closeDateKey] += liveGain;
    //         }
    //     }
    // }

    // async function main() {
    //     await calculateMonthlyNetGains();

    //     let labels = Object.keys(monthlyNetGains);
    //     let data = Object.values(monthlyNetGains);

    //     let ctx = document.getElementById("report-chart").getContext("2d");

    //     new Chart(ctx, {
    //         type: "line",
    //         data: {
    //             labels: labels,
    //             datasets: [{
    //                 label: "Net gains per month",
    //                 data: data,
    //                 fill: false,
    //                 borderColor: "rgb(75, 192, 192)",
    //                 tension: 0.1
    //             }]
    //         },
    //         options: {
    //             scales: {
    //                 x: {
    //                     title: {
    //                         display: true,
    //                         text: "Month"
    //                     }
    //                 },
    //                 y: {
    //                     title: {
    //                         display: true,
    //                         text: "Net gains"
    //                     }
    //                 }
    //             }
    //         }
    //     });
    // }

    // main();

    // async function fetchLiveUpdates(e, t, a) {
    //     const apiKey = "70BOHXX3E6JX9H88";
    //     let r = `https://www.alphavantage.co/query?function=TIME_SERIES_INTRADAY&symbol=${e}&interval=5min&apikey=${apiKey}`;
    //     let n, s = localStorage.getItem(`currentPrice:${e}`);
    //     // let r = `<?php echo site_url('API/fetchRealTimeData/'); ?>${a}/${e}`;
    //     console.log("Fetching URL:", r);  // Debugging: Log the URL

    //     if (s) {
    //         n = parseFloat(s);
    //     } else {
    //         try {
    //             let i = await (await fetch(r, {
    //                 headers: {
    //                     "X-Requested-With": "XMLHttpRequest"
    //                 }
    //             })).text();
                
    //             console.log("Raw API Response:", i);  // Existing log
                
    //             // Replace this line
    //             // console.log("Parsed JSON:", JSON.parse(i));  // Debugging: Log the parsed JSON
                
    //             // With this new try-catch block
    //             const parsedData = JSON.parse(i);
    //             console.log("Parsed JSON:", parsedData);
    //             // try {
    //             //     const parsedData = JSON.parse(i);
    //             //     console.log("Parsed JSON:", parsedData);
    //             // } catch (e) {
    //             //     console.error("Error parsing JSON:", e);
    //             // }
                
    //             n = JSON.parse(i).currentPrice;
    //             localStorage.setItem(`currentPrice:${e}`, n);
    //             setTimeout(() => localStorage.removeItem(`currentPrice:${e}`), 60000);
    //         } catch (l) {
    //             console.error(`Error fetching live updates for ${e}:`, l);  // Existing error log
    //         }
    //     }
    //     return n * t;
    // }


    // async function updateWallet(record) {
    //     try {
    //         record.net_gains = await fetchLiveUpdates(record.symbol, record.shares, record.category);
    //     } catch (error) {
    //         console.error(`Error updating wallet for ${record.symbol}: ${error}`);
    //     }
    // }
    // let monthlyNetGains = {};

    // async function calculateMonthlyNetGains() {
        
    //     let investmentData = document.querySelector("#investment-data").innerText;
    //     let userInvestmentRecords;

    //     try {
    //         userInvestmentRecords = JSON.parse(investmentData);
    //     } catch (e) {
    //         console.error("Error parsing JSON:", e);
    //     }
    //     for (let record of userInvestmentRecords) {
    //         // if (!validateRecord(record)) continue;

    //         // Determine selectedType dynamically based on the record's category
    //         const selectedType = record.category; // Assuming 'category' exists in your record object

    //         let dateKey = record.close_date ? record.close_date.split("/").slice(0, 2).join("-") : "Open Trades";
    //         monthlyNetGains[dateKey] = monthlyNetGains[dateKey] || 0;

    //         if (record.close_date) {
    //             monthlyNetGains[dateKey] += parseFloat(record.net_gains);
    //         } else {
    //             // Pass selectedType as a parameter
    //             const currentValue = await fetchLiveUpdates(record.symbol, record.shares, selectedType);
    //             monthlyNetGains[dateKey] += currentValue;
    //         }
    //     }
    // }

    // async function main() {
    //     await calculateMonthlyNetGains();
    //     let labels = Object.keys(monthlyNetGains);
    //     let data = Object.values(monthlyNetGains);
    //     let ctx = document.getElementById("investment-report-chart").getContext("2d");

    //     new Chart(ctx, {
    //         type: "line",
    //         data: {
    //             labels: labels,
    //             datasets: [{
    //                 label: "Net gains per month",
    //                 data: data,
    //                 fill: false,
    //                 borderColor: "rgb(75, 192, 192)",
    //                 tension: 0.1
    //             }]
    //         },
    //         options: {
    //             scales: {
    //                 x: {
    //                     title: {
    //                         display: true,
    //                         text: "Month"
    //                     }
    //                 },
    //                 y: {
    //                     title: {
    //                         display: true,
    //                         text: "Net gains"
    //                     }
    //                 }
    //             }
    //         }
    //     });
    // }

    // main();

</script>
<!-- <script <?= $nonce['script'] ?? '' ?>>
    let investmentData = document.querySelector("#investment-data").innerText;
    let userInvestmentRecords;

    try {
        userInvestmentRecords = JSON.parse(investmentData);
    } catch (e) {
        console.error("Error parsing JSON:", e);
        // Consider sending real-time alerts here
    }

    function validateRecord(record) {
        if (!record) {
            console.error("Record is undefined or null");
            return false;
        }
        if (!record.hasOwnProperty('close_date') || !record.close_date) {
            console.log("close_date is missing or null in the record");
            return false;
        }
        return true;
    }

    let monthlyNetGains = {};

    if (!userInvestmentRecords || userInvestmentRecords.length === 0) {
        monthlyNetGains = { "No Data": null };
    } else {
        for (let i = 0; i < userInvestmentRecords.length; i++) {
            let record = userInvestmentRecords[i];
            if (!validateRecord(record)) continue;

            let dateParts = record.close_date.split("/");
            let monthYear = `${dateParts[0]}-${dateParts[1]}`;

            if (!monthlyNetGains.hasOwnProperty(monthYear)) {
                monthlyNetGains[monthYear] = 0;
            }
            monthlyNetGains[monthYear] += parseFloat(record.net_gains);
        }
    }

    // Preparing data for the Chart.js
    let labels = Object.keys(monthlyNetGains);
    let data = Object.values(monthlyNetGains);

    // Drawing the Chart.js chart
    let ctx = document.getElementById('report-chart').getContext('2d');
    new Chart(ctx, {
        type: 'line',
        data: {
            labels: labels,
            datasets: [{
                label: 'Net gains per month',
                data: data,
                fill: false,
                borderColor: 'rgb(75, 192, 192)',
                tension: 0.1
            }]
        },
        options: {
            scales: {
                x: {
                    title: {
                        display: true,
                        text: 'Month'
                    }
                },
                y: {
                    title: {
                        display: true,
                        text: 'Net gains'
                    }
                }
            }
        }
    });
</script> -->