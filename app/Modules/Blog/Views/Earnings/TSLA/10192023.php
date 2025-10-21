<?php
$currentUserID 			= isset($current_user->id) && ! empty($current_user->id) ? $current_user->id : '';
$currentUserRoleID 		= isset($current_user->role_id) && ! empty($current_user->role_id) ? $current_user->role_id : '';
$beta                   = $this->config->item('beta'); 
$investmentOperations   = $this->config->item('investmentOperations'); 
$registerType           = $this->uri->segment(1);
if ($registerType === 'Investor') {
    $title		        = 'Register An Investor Account';
} else {
    $title		        = 'Register An Investor Account Free!';
};
$symbol                 = $this->uri->segment(3);
$earningsDate           = $this->uri->segment(4);
if (empty($cuID)) {
    if ($beta === 0) {
        $btnURL         = site_url('/Free/register'); 
    } elseif ($beta === 1) {
        $btnURL         = site_url('/Beta/register'); 
    }
    $btnText            = 'Register Now';
} else {
    $btnURL             = site_url('/Dashboard'); 
    $btnText            = 'Dashboard';
}
$totalActiveUsers       = $_SESSION['reporting']['totalActiveUsers']; 
$totalWalletsCreated    = $_SESSION['reporting']['totalWalletsCreated']; 
$totalTradesTracked     = $_SESSION['reporting']['totalTradesTracked']; 
$totalActivePartners    = $_SESSION['reporting']['totalActivePartners']; 
$totalApprovedAssets    = $_SESSION['reporting']['totalApprovedAssets']; 
$formData               = array(
    'title'             => $title,
    'registerType'      => $registerType,
);

// Your TD Ameritrade API Key
$this->load->config('api_endpoints');
$api_key = $this->config->item('td_ameritrade')['API_KEY'];

// Make the API call to TD Ameritrade
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "https://api.tdameritrade.com/v1/marketdata/$symbol/quotes?apikey=$api_key");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
$response = curl_exec($ch);
curl_close($ch);

// Decode the JSON response
$data = json_decode($response, true);

// Get the exchange
$exchange = $data[$symbol]['exchange'];

// Convert the exchange to the format that TradingView accepts
$tradingViewExchange = strtoupper($exchange); // Assuming TradingView accepts the exchange in uppercase

// Helper function to generate TradingView widgets
// function generateTradingViewWidget($symbol, $interval, $containerId) {
//     return <<<HTML
//     <script <?= $nonce['script'] ?? '' >>
//         new TradingView.widget({
//             "autosize": true,
//             "symbol": "{$symbol}",
//             "interval": "{$interval}",
//             "timezone": "America/Chicago",
//             "theme": "dark",
//             "style": "1",
//             "locale": "en",
//             "toolbar_bg": "#f1f3f6",
//             "enable_publishing": true,
//             "withdateranges": true,
//             "hide_side_toolbar": false,
//             "allow_symbol_change": true,
//             "details": true,
//             "studies": [
//                 "MACD@tv-basicstudies",
//                 "MAExp@tv-basicstudies",
//                 "PivotPointsHighLow@tv-basicstudies",
//                 "RSI@tv-basicstudies",
//                 "VWAP@tv-basicstudies"
//             ],
//             "container_id": "{$containerId}"
//         });
//     </script>
// HTML;
// }
?>
<style <?= $nonce['style'] ?? '' ?>>
    .intro-banner{
        background: url(<?php echo base_url('assets/images/MyMI-Walllet-Background.jpeg'); ?>) no-repeat center center fixed; 
        -webkit-background-size: cover;
        -moz-background-size: cover;
        -o-background-size: cover;
        background-size: cover;
    }
    .intro-banner .version {background-color: #3E61BC;}
    .intro-overview ul {justify-content:normal;}
    .list-checked > li {color: #364A63; font-size: 1.125rem}; 
    .list-blue-header {color: #3E61BC}    
</style>
<div class="intro-banner pb-3 bg-dark">
    <div class="container pt-3">
        <div class="row justify-content-center pt-1">
            <div class="col-xl-6 col-lg-6 col-md-12">
                <div class="intro-banner-wrap">
                    <div class="intro-banner-inner text-center">
                        <div class="intro-banner-desc py-md-2 py-lg-5">
                            <div class="row">
                                <span class="overline-title">Introducing</span>
                                <h1 class="title text-white" class="fs-1">Quarterly Earnings Report</h1>
                                <h2 class="subttitle text-white pb-3" class="fs-4">A Comprehensive Analysis for Investors</h2>
                                <p class="text-light">
                                    Dive deep into the quarterly earnings report and understand its impact on the market. 
                                    This guide provides key takeaways, financial metrics, and implications for investors.
                                </p>
                                <div class="row intro-action-group mt-3">
                                    <div class="col-12">
                                        <h2 class="subttitle text-white pb-3" class="fs-4">Join Our Mailing List<br>For More News &amp; Updates!</h2>
                                    </div>
                                    <div class="col-12">
                                        <?php echo view('Subscribe/header_subscribe', $subViewData); ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-xl-6 pl-md-5">
                <div class="intro-banner-wrap pt-lg-5">
                    <div class="intro-banner-inner pt-3 pt-md-5">
                        <div class="intro-banner-desc pt-0">
                            <!-- Replace the src attribute with the path to your quarterly earnings report image -->
                            <img class="img-fluid rounded" src="<?php echo base_url('assets/images/Marketing/Blog/Earnings/' . $symbol . '/' . $earningsDate . '.jpg'); ?>" alt="<?php echo $symbol . ' Quarterly Earnings Report ' . $earningsDate; ?>" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="intro-section intro-overview text-center bg-white pt-0 pt-md-3 pr-3 pr-md-0">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12 col-md-3 col-lg-3 col-xl-3 px-5">
                <div class="row">
                    <div class="col-12">
                        <div class="card card-bordered">
                            <div class="card-body py-5">
                                <h2 class="pl-4 text-left">Table of Contents</h2>
                                <ul class="nav flex-column text-left nav-pills px-2" style="align-items:normal;" id="myTab" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="tab1-tab" data-bs-toggle="tab" href="#tab1" role="tab" aria-controls="tab1" aria-selected="true"><strong>Section 1: Telsa's Q3 Earnings</strong></a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="tab2-tab" data-bs-toggle="tab" href="#tab2" role="tab" aria-controls="tab2" aria-selected="false"><strong>Section 2: Trend Analysis</strong></a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="tab3-tab" data-bs-toggle="tab" href="#tab3" role="tab" aria-controls="tab3" aria-selected="false"><strong>Section 3: Fundamentals</strong></a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="tab4-tab" data-bs-toggle="tab" href="#tab4" role="tab" aria-controls="tab4" aria-selected="false"><strong>Section 4: Community Sentiment</strong></a>
                                    </li>
                                    <!-- <li class="nav-item">
                                        <a class="nav-link" id="tab5-tab" data-bs-toggle="tab" href="#tab5" role="tab" aria-controls="tab5" aria-selected="false"><strong>Section 5: Role of Budgeting in Long-Term Financial Planning</strong></a>
                                    </li> -->
                                </ul>
                                <hr class="d-block d-md-none">
                            </div>
                        </div>
                    </div>
                </div>
                <!-- <div class="row">
                    <div class="col-12">
                        <div class="card card-bordered">
                            <div class="card-body pb-5">
                                <h2 class="pl-4 text-left">Related Links</h2>
                                <ul class="nav flex-column text-left nav-pills px-2" id="myTab" role="tablist">
                                    <li class="nav-item"><a class="nav-link pl-3 pr-0" href="<?php // echo site_url('/Blog/Investing/The-Fundamentals-Of-Investing'); ?>" id="tab1-tab"><strong>The Fundamentals Of Investing</strong></a></li>
                                    <li class="nav-item"><a class="nav-link pl-3 pr-0" href="<?php // echo site_url('/Blog/Investing/Tips-For-Effective-Investment-Portfolio-Management'); ?>" id="tab1-tab"><strong>Tips for Effective Investment Portfolio Management</strong></a></li>
                                    <li class="nav-item"><a class="nav-link pl-3 pr-0" href="<?php // echo site_url('/Blog/IRS/IRS-Expanded-Home-Energy-Tax-Credits'); ?>" id="tab1-tab"><strong>IRS Announces Expanded Home Energy Tax Credits</strong></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div> -->
                <div class="row d-none d-md-block">
                    <div class="col-12">
                        <div class="card card-bordered">
                            <div class="card-body pb-5 px-0">
                                <img class="full-width" src="<?php echo base_url('assets/images/Marketing/Promotional-Infographic-1.png'); ?>" alt="MyMI Wallet - Personal Budgeting & Investment Portfolio Management" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-7 col-lg-7 col-xl-7 pl-5">
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane pb-5 fade show active" id="tab1" role="tabpanel" aria-labelledby="tab1-tab">
                        <!-- First Row: Title and Introduction for Tesla's Q3 Earnings Analysis -->
                        <div class="row justify-content-center pb-5">
                            <div class="col-12">
                                <div class="intro-section-title">
                                    <span class="overline-title intro-section-subtitle">A Comprehensive Analysis</span>
                                    <h3 class="intro-heading-lead">Tesla's Q3 Earnings</h3>
                                    <div class="intro-section-desc">
                                        <!-- <img src="" alt="Tesla Model X Charging" class="img-fluid"> -->
                                        <p class="dark-text">
                                            Tesla's recent Q3 earnings have missed Wall Street expectations, causing a stir in the market. 
                                            In this comprehensive guide, we'll take a deep dive into the numbers and explore what this means for Tesla and the electric vehicle industry.
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>    
                        <!-- Additional Sections -->
                        <div class="row justify-content-center pt-5 text-left">
                            <div class="col-12">
                                <div class="intro-section-title">
                                    <h2 class="subtitle"><strong>Why Tesla's Earnings Matter</strong></h2> <!-- Changed to h2 for major sections -->
                                </div>
                                <div class="intro-section-desc">
                                    <p class="dark-text">
                                        Tesla has been a significant player in shaping the electric vehicle (EV) market. Its quarterly earnings reports are not just a reflection of the company's financial health but also serve as an indicator for the entire EV industry. A strong earnings report from Tesla often boosts investor confidence not only in Tesla but also in the broader EV market. Conversely, a miss in earnings, like the recent Q3 report, can raise questions about the sustainability of Tesla's growth and the EV market's potential. Therefore, Tesla's earnings reports are a crucial barometer for investors, market analysts, and stakeholders in the EV ecosystem.
                                    </p>
                                </div>
                            </div>
                        </div>

                        <hr>

                        <div class="row justify-content-center pt-5 text-left">
                            <div class="col-12">
                                <div class="intro-section-title">
                                    <h4 class="subtitle"><strong>The Q3 Earnings Report: Key Takeaways</strong></h4>
                                </div>
                                <div class="intro-section-desc">
                                    <p class="dark-text">
                                        <ul class="list list-checked list-sm d-block">
                                            <li class="mb-2"><strong class="pl-3 list-blue-header">Financial Metrics:</strong> Tesla's Q3 core margin came in shockingly low at 16.3%, significantly missing the consensus estimate.</li>
                                            <li class="mb-2"><strong class="pl-3 list-blue-header">Market Response:</strong> The earnings report led to a lackluster response from investors, affecting Tesla's stock price.</li>
                                            <li class="mb-2"><strong class="pl-3 list-blue-header">Analyst Opinions:</strong> Analysts have expressed concerns over Tesla's "50% Growth Mirage," indicating that the company's rapid growth phase may be slowing down.</li>
                                            <li class="mb-2"><strong class="pl-3 list-blue-header">Overall Impression:</strong> This Q3 report marked Tesla's first double miss in over four years, which means it fell short of expectations on both revenue and earnings per share.</li>
                                        </ul>
                                    </p>
                                </div>
                            </div>
                        </div>
                        
                        <hr>

                        <!-- Section: Implications for Tesla -->
                        <div class="row justify-content-center pt-5 text-left">
                            <div class="col-12">
                                <div class="intro-section-title">
                                    <h4 class="subtitle"><strong>Implications for Tesla</strong></h4>
                                </div>
                                <div class="intro-section-desc">
                                    <p class="dark-text">
                                        The Q3 earnings miss has several implications for Tesla. It raises questions about the company's ability to maintain its aggressive growth targets and puts pressure on its future profitability. Investors may also be concerned about Tesla's increasing competition and market saturation.
                                    </p>
                                </div>
                            </div>
                        </div>

                        <hr>

                        <!-- Section: Impact on the EV Market -->
                        <div class="row justify-content-center pt-5 text-left">
                            <div class="col-12">
                                <div class="intro-section-title">
                                    <h4 class="subtitle"><strong>Impact on the EV Market</strong></h4>
                                </div>
                                <div class="intro-section-desc">
                                    <p class="dark-text">
                                        Tesla's earnings report has a ripple effect on the entire electric vehicle market. A strong performance by Tesla generally boosts the EV market, while a miss can cause investors to question the viability of electric vehicles as a whole. This report could potentially slow down investment in other EV startups and affect partnerships and collaborations.
                                    </p>
                                </div>
                            </div>
                        </div>

                        <hr>

                        <!-- Section: Conclusion -->
                        <div class="row justify-content-center pt-5 text-left">
                            <div class="col-12">
                                <div class="intro-section-title">
                                    <h4 class="subtitle"><strong>Conclusion</strong></h4>
                                </div>
                                <div class="intro-section-desc">
                                    <p class="dark-text">
                                        Tesla's Q3 earnings report serves as a critical indicator for both the company and the broader electric vehicle market. While the miss has raised some concerns, it's essential to consider the long-term perspective. Tesla remains a key player in the EV industry, and its performance will continue to have a significant impact on the market's future.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Tab Content for Trend Analysis -->
                    <div class="tab-pane pb-5 fade" id="tab2" role="tabpanel" aria-labelledby="tab2-tab">
                        <!-- Title and Introduction for Trend Analysis -->
                        <div class="row justify-content-center pb-5">
                            <div class="col-12">
                                <div class="intro-section-title">
                                    <span class="overline-title intro-section-subtitle">In-Depth Trend Analysis</span>
                                    <h3 class="intro-heading-lead">Tesla's Market Trends</h3>
                                    <div class="intro-section-desc">
                                        <p class="dark-text">
                                            Understanding the trends affecting Tesla's stock can provide valuable insights into its future performance. In this section, we'll analyze both long-term and short-term trends.
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>

                        <!-- Long-term Trends -->
                        <div class="row justify-content-center pt-5 text-left">
                            <div class="col-12">
                                <!-- <div class="intro-section-title">
                                    <h2 class="subtitle"><strong>Long-term Trends</strong></h2>
                                </div> -->
                                <div class="intro-section-desc">
                                    <!-- Content about long-term trends, possibly with a ChartJS graph -->                                        
                                    <!-- TradingView Widget BEGIN -->
                                    <div class="tv-chart-container full-width custom-tv-container">
                                        <div class="tradingview-widget-container full-width custom-tv-widget">
                                            <div id="tradingview_longTerm"></div>
                                            <div class="tradingview-widget-copyright">
                                                <a href="<?php echo 'https://www.tradingview.com/symbols/' . $tradingViewExchange . '-' . $symbol; ?>" rel="noopener" target="_blank">
                                                    <span class="blue-text"><?php echo $tradingViewExchange . ":" . $symbol; ?> Chart</span>
                                                </a> by TradingView
                                            </div>
                                            <script type="text/javascript" src="https://s3.tradingview.com/tv.js" <?= $nonce['script'] ?? '' ?>></script>
                                            <?php                                                
                                            $longTermInterval = "D";
                                            echo '
                                            <script ' . $nonce['script'] ?? '' . '>
                                                new TradingView.widget(
                                                {
                                                "autosize": false,
                                                "width": "100%",
                                                "height": 700,
                                                "symbol": "' . esc($symbol, 'js') . '",
                                                "interval": "' . esc($longTermInterval, 'js') . '",
                                                "timezone": "America/Chicago",
                                                "theme": "dark",
                                                "style": "1",
                                                "locale": "en",
                                                "toolbar_bg": "#f1f3f6",
                                                "enable_publishing": true,
                                                "withdateranges": true,
                                                "hide_side_toolbar": false,
                                                "allow_symbol_change": true,
                                                "details": true,
                                                "studies": [
                                                    "MACD@tv-basicstudies",
                                                    "MAExp@tv-basicstudies",
                                                    "PivotPointsHighLow@tv-basicstudies",
                                                    "RSI@tv-basicstudies",
                                                    "VWAP@tv-basicstudies"
                                                ],
                                                "container_id": "tradingview_longTerm"
                                                }
                                                );
                                            </script>
                                            ';
                                            ?>

                                        </div>
                                        <!-- TradingView Widget END -->
                                    </div>
                                    <!-- TradingView Widget END -->
                                </div>
                            </div>
                        </div>
                        <hr>

                        <!-- Stock Performance -->
                        <div class="row justify-content-center pt-5 text-left d-none">
                            <div class="col-12">
                                <div class="intro-section-title">
                                    <h2 class="subtitle"><strong>Stock Performance</strong></h2>
                                </div>
                                <div class="intro-section-desc">
                                    <p class="dark-text">
                                        <!-- Content about stock performance, possibly with DataTablesJS for tabular data -->
                                    </p>
                                </div>
                            </div>
                        </div>
                        <hr>

                        <!-- Market Sentiment -->
                        <div class="row justify-content-center pt-5 text-left d-none">
                            <div class="col-12">
                                <div class="intro-section-title">
                                    <h2 class="subtitle"><strong>Market Sentiment</strong></h2>
                                </div>
                                <div class="intro-section-desc">
                                    <p class="dark-text">
                                        <!-- Content about market sentiment, possibly with quotes from analysts -->
                                    </p>
                                </div>
                            </div>
                        </div>
                        <hr>

                        <!-- Conclusion -->
                        <div class="row justify-content-center pt-5 text-left d-none">
                            <div class="col-12">
                                <div class="intro-section-title">
                                    <h2 class="subtitle"><strong>Conclusion</strong></h2>
                                </div>
                                <div class="intro-section-desc">
                                    <p class="dark-text">
                                        <!-- Summary of the trend analysis -->
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="tab-pane active" id="tab6" role="tabpanel" aria-labelledby="tab6-tab">
                        <?php 
                        $currentUserID	 		= isset($current_user->id) && ! empty($current_user->id) ? $current_user->id : '';
                        $currentUserRoleID 		= isset($current_user->role_id) && ! empty($current_user->role_id) ? $current_user->role_id : '';
                        $currentUserEmail 		= isset($current_user->email) && ! empty($current_user->email) ? $current_user->email : '';
                        $marketMovers			= date("F-jS-Y");
                        $beta                   = $this->config->item('beta'); 
                        if (empty($cuID)) {
                            if ($beta === 0) {
                                $btnURL         = site_url('/Free/register'); 
                            } elseif ($beta === 1) {
                                $btnURL         = site_url('/Beta/register'); 
                            }
                            $btnText            = 'Register Now';
                        } else {
                            $btnURL             = site_url('/Dashboard'); 
                            $btnText            = 'Dashboard';
                        }
                        ?>
                        <div class="row justify-content-center pt-5">
                            <div class="col-12">
                                <div class="intro-section-title">
                                    <h3 class="intro-heading-lead"><strong>Access Our Financial Tools Now!</strong></h3>
                                    <div class="intro-section-desc">
                                        <p class="dark-text">
                                            Discover financial freedom with MyMI Wallet! Access our Personal Financial Budgeting and Investment Portfolio Management Tools at MyMI Wallet!
                                            By registering an account, you'll gain access to a suite of powerful tools designed to help you take control of your finances and grow your wealth.
                                        </p>      
                                        <?php                                         
                                        if (!empty($cuID)) {
                                            echo '
                                            <a class="btn btn-primary" href="' . site_url('/Dashboard') . '">Get Started!</a> 
                                            ';
                                        } else {
                                            echo '
                                            <a class="btn btn-primary" href="' . $btnURL . '">Get Started!</a> 
                                            ';
                                        }   
                                        ?>               
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>         
            </div>
        </div>
    </div>
</div>
