<?php
// Directly use the variables passed from the controller.
$cuID = $cuID ?? 0;
$beta = $beta ?? 0;
$date = $date ?? 0;
$hostTime = $hostTime ?? 0;
$time = $time ?? 0;
$investmentOperations = $investmentOperations ?? 0;
// $reportingData          = $reportingData ?? []; 
$pageURIA							= $pageURIA ?? '';
$pageURIB							= $pageURIB ?? '';
$page_title							= str_replace("-", " ", $pageURIB);

$getCoinValue						= $getCoinValue;
$getInitialCoinValue				= $getInitialCoinValue;
$initial_coin_value 				= $getCoinValue->initial_coin_value ?? 0;
$initial_available_coins            = $getCoinValue->available_coins ?? 0; // No number_format() here
$initial_percent_increase           = 0.25;
$initial_percent_increase_num       = $initial_percent_increase * 100;
$initial_new_available_coins        = $initial_available_coins * $initial_percent_increase; // Calculation on non-formatted number

$current_value                      = $getInitialCoinValue->current_value ?? 0;
$coin_value                         = $getInitialCoinValue->coin_value ?? 0;
$new_coin_value                     = $getInitialCoinValue->new_coin_value ?? 0;
$new_availability                   = $getInitialCoinValue->new_availability ?? 0;
$available_coins                    = $getInitialCoinValue->available_coins ?? 0;
$percent_increase                   = 0.25;
$percent_increase_num               = $percent_increase * 100;
$new_available_coins                = $initial_new_available_coins; // Assuming this is the correct calculation

$package_a                          = 10;
$package_a_coins                    = $package_a / ($coin_value ?: 1); // Avoid division by zero
$package_b                          = 25;
$package_b_coins                    = $package_b / ($coin_value ?: 1); 
$package_c                          = 50;
$package_c_coins                    = $package_c / ($coin_value ?: 1); 

// Now format numbers for display
$available_coins_formatted = number_format($available_coins, 0); 
$initial_available_coins_formatted = number_format($initial_available_coins, 0);
$new_available_coins_formatted = number_format($new_available_coins, 0);
$current_value_formatted = number_format($current_value, 2);
$coin_value_formatted = number_format($coin_value, 2);
$new_coin_value_formatted = number_format($new_coin_value, 8);
$new_availability_formatted = number_format($new_availability, 0);
$available_coins_formatted = number_format($available_coins, 0);
$package_a_coins_formatted = number_format($package_a_coins, 0);
$package_b_coins_formatted = number_format($package_b_coins, 0);
$package_c_coins_formatted = number_format($package_c_coins, 0);

// Package Prices
$package_prices = [10, 25, 50, 100];
// $package_prices = [5, 10, 15, 25, 50, 75, 100];

$testData = [
    // 'getCoinValue' => $getCoinValue,
    'initial_coin_value' => $initial_coin_value,
    'initial_available_coins' => $initial_available_coins,
    'initial_percent_increase' => $initial_percent_increase,
    'initial_percent_increase_num' => $initial_percent_increase_num,
    'initial_new_available_coins' => $initial_new_available_coins,
    // 'getInitialCoinValue' => $getInitialCoinValue,
    'current_value' => $current_value,
    'coin_value' => $coin_value,
    'new_availability' => $new_availability,
    'available_coins' => $available_coins,
    'percent_increase' => $percent_increase,
    'percent_increase_num' => $percent_increase_num,
    'new_available_coins' => $new_available_coins,
    'package_a' => $package_a,
    'package_a_coins' => $package_a_coins,
    'package_b' => $package_b,
    'package_b_coins' => $package_b_coins,
    'package_c' => $package_c,
    'package_c_coins' => $package_c_coins,
];
$subViewData = [

]; 
?>
<style <?= $nonce['style'] ?? '' ?>>
	@media (max-width: 375px) {
	#header01-m {padding-top: 15px !important;}	
	}
	@media (min-width: 767px) {
	#header01-m {padding-top: 1rem !important;}
	}
	.breadcrumb{background-color: transparent !important;}
	.blog-text{font-size:1.25rem;} 
</style>
<section class="cid-s0KKUOB7cY mt-5 full-width" id="header01-m">
    <div class="container-fluid">
		<div class="row justify-content-center">
			<div class="col-11 grid-margin stretch-card px-5">
				<div class="card">
					<div class="card-body px-5 pt-3">
						<div class="row">
							<div class="col">
								<nav aria-label="breadcrumb">
									<ol class="breadcrumb">
										<li class="breadcrumb-item"><a href="<?php echo site_url('/How-To-Guides'); ?>">How It Works</a></li>
										<li class="breadcrumb-item active" aria-current="page"><?php echo $page_title; ?></li>
									</ol>
								</nav>        
								<h1 class="card-title display-5">MYMI GOLD COINS</h1>    
								<p class="card-description">STEP-BY-STEP GUIDE</p>
							</div>
						</div>       
						<hr> 
						<div class="row">
							<div class="col-12 col-md-7 col-lg-7">
								<h2 class="card-title display-5 pt-4">What is MyMI Gold?</h2>
								<p class="card-text blog-text pt-3">
									MyMI Gold is a cryptocurrency coin dedicated to gain access to our Premium Features offered at MyMI Wallet to assist in improving your Investment Accounting and determining your Total Financial Growth.
								</p>
								<p class="card-text blog-text pt-3">
									The MyMI Gold is based on the Digibyte Blockchain and currently has <strong><?php echo $new_availability_formatted; ?> Coins</strong> available to purchase and use for our Premium Features. The price of MyMI Gold is currently determined by the Total Market Cap of the Coin which is then divided by the total coins remaining for purchase. 
								</p>  
								<p class="card-text blog-text pt-3">
									Once we reached the Maximum Amount of MyMI Gold Coins that are owned by Members of MyMI Wallet, we will release an additional <strong><?php echo $percent_increase_num; ?>% (<?php echo $new_available_coins_formatted; ?> Coins)</strong> of MyMI Gold to the network to allow for additional purchases of the coin to become available for newcomers to the MyMI Wallet Platform. 
								</p>                                   
								<h3 class="card-title display-5 pt-4">Current MyMI Gold Packages</h3>
								<p class="card-text blog-text pt-3">
									The current value of MyMI Gold is as follows: 
									<table class="table">
										<tbody>
											<!-- <tr>
												<th>Market Cap</th>
												<td class="text-center">$<?php echo $current_value_formatted; ?></td>
											</tr> -->
											<tr>
												<th>Available Coins</th>
												<td class="text-center"><?php echo $new_availability_formatted; ?> Coins</td>
											</tr>
											<tr>
												<th>Current Value</th>
												<td class="text-center">$<?php echo $coin_value_formatted; ?>/Coin</td>
											</tr>
										</tbody>
									</table>
								</p>
								<p class="card-text blog-text pt-3"> 
									The current value of MyMI Gold is as follows: 
									<table class="table">
										<tbody>
											<tr>
												<th>$<?php echo $package_a; ?> Bundle</th>
												<td class="text-center"><?php echo $package_a_coins; ?> MyMI Gold</td>
											</tr>
											<tr>
												<th>$<?php echo $package_b; ?> Bundle</th>
												<td class="text-center"><?php echo $package_b_coins; ?> MyMI Gold</td>
											</tr>
											<tr>
												<th>$<?php echo $package_c; ?> Bundle</th>
												<td class="text-center"><?php echo $package_c_coins; ?> MyMI Gold</td>
											</tr>
										</tbody>
									</table>
								</p>  
								<h3 class="card-title display-5 pt-4">How to purchase MyMI Gold</h3>
								<p class="card-text blog-text pt-3">
									To purchase your MyMI Gold, a wallet is required to receive the coins once they are purchased and pay for Premium Features within the MyMI Wallet Platform. If you do not have a wallet, you will be prompted to generate an address that will be designated to your Membership Account. 
								</p> 
								<p class="card-text blog-text pt-3">
									Once you have a MyMI Gold Wallet Address, you will then be able to purchase MyMI Gold via the Membership Dashboard and purchase access to Premium Features to get started.
								</p>
								<h4 class="card-title display-7 pt-4">How It Works</h4>
								<p class="card-text blog-text pt-3">
									Once your purchase your MyMI Gold, you will receive your MyMI Gold in your MyMI Account to utilize within the App and access additional features. You will also be able to trade MyMI Gold with other Members on our MyMI Exchange.
								</p>

                                <h4 class="card-title display-7 pt-4">Select Your MyMI Gold Package</h4>
                                <p class="card-text blog-text">
                                    Choose from various packages according to your needs. Each package comes with a specific amount of MyMI Gold.
                                </p>

                                <h4 class="card-title display-7 pt-4">Complete Purchase via PayPal</h4>
                                <p class="card-text blog-text">
                                    Once you've selected a package, click on 'Purchase Now' to proceed with the payment through PayPal.
                                </p>

                                <h4 class="card-title display-7 pt-4">Receive MyMI Gold in Your Wallet</h4>
                                <p class="card-text blog-text">
                                    After the purchase is confirmed and the payment is received, the corresponding amount of MyMI Gold will be transferred to your default MyMI Wallet.
                                </p>

                                <h4 class="card-title display-7 pt-4">Use MyMI Gold for Premium Features</h4>
                                <p class="card-text blog-text">
                                    MyMI Gold can be utilized within the MyMI Wallet app to access various Premium Features.
                                </p>

                                <h4 class="card-title display-7 pt-4">Monthly Subscriptions</h4>
                                <p class="card-text blog-text">
                                    For monthly subscriptions, PayPal will set up a recurring charge. On the due date, MyMI Gold will be purchased and transferred to cover the cost of the subscription.
                                </p>

								<h4 class="card-title display-5 pt-4">How to use MyMI Gold</h4>
								<p class="card-text blog-text pt-3">
									To use MyMI Gold, simply select the Premium Feature that you would like to purchase access to and your MyMI Gold will be sent to give you access for the allotted amount of time for each Premium Feature. 
								</p>
								<h4 class="card-title display-7 pt-4">Purchase Your Premium Features</h4>
								<p class="card-text blog-text pt-3">
									The Premium Features that we provide at MyMI Wallet include the following:
								</p>                                 
								<ul class="card-list">
									<!-- <li><a href="<?php echo site_url('Premium-Features/Wallets'); ?>">Additional Wallets (Trading Accounts)</a></li>
									<li><a href="<?php echo site_url('Premium-Features/Advanced-Trade-Tracker'); ?>">Advanced Charting Integrations</a></li> -->
									<li>
                                        <p>
                                            <a href="<?php echo site_url('Features/Advanced-Investment-Portfoio-Manager'); ?>"><strong>MyMI Trade Tracker <small>(Advanced Portfolio Manager)</small></strong></a> - 
                                            The MyMI Trade Tracker is an innovative and sophisticated tool designed to elevate your investment strategy. 
                                            It offers a comprehensive overview of your trades, enabling you to make informed decisions based on detailed insights into your investment performance. 
                                            With features like asset allocation analysis, performance metrics, real-time market data integration, and personalized alerts, the MyMI Trade Tracker is an indispensable tool for both novice and seasoned investors seeking to maximize their portfolio's potential and streamline their investment process.
                                        </p>
                                    </li>
									<li>
                                        <p>
                                            <a href="<?php echo site_url('Features/Brokerage-Integration'); ?>"><strong>Banking/Brokerage Integration Tool</strong></a> - 
                                            The Banking/Brokerage Integration tool is a cutting-edge feature designed to revolutionize the way you manage your financial assets. 
                                            This powerful tool allows you to seamlessly integrate and add your financial banking and investment accounts to a centralized dashboard. 
                                            It provides a holistic view of your financial landscape, enabling efficient tracking and management of your assets across various platforms. With this integration, you gain the ability to monitor investments, analyze portfolio performance, and make strategic decisions from a single, unified interface. 
                                        </p>
                                    </li>
									<!-- <li><a href="<?php echo site_url('Premium-Features/Brokerage-API-Integration'); ?>">Brokerage Account API Integration</a></li>
									<li><a href="<?php echo site_url('Premium-Features/Due-Diligence-Database'); ?>">Community Due Diligence Database</a></li> -->
								</ul>								
								<?php echo view('UserModule/Support/Need_Assistance', $subViewData); ?>
							</div>
							<div class="col-md-1 border-right px-5"></div>
							<div class="col-12 col-md-4 col-lg-4">
								<h6 class="card-title display-5 pt-4">Related Topics:</h6>
								<ul>
									<li>
										<a href="<?php echo site_url('How-It-Works/Purchase-MyMI-Gold'); ?>">How to purchase MyMI Gold</a>
									</li>
									<li>
										<a href="<?php echo site_url('Premium-Features/Wallets'); ?>">How to purchase Additional Wallets</a>
									</li>
									<li>
										<a href="<?php echo site_url('Premium-Features/Advanced-Trade-Tracker'); ?>">How to use Advanced Trade Tracker</a>
									</li>
									<li>                    
										<a href="<?php echo site_url('Premium-Features/Advanced-Charting'); ?>">How to use Advanced Charting</a> 
									</li>
									<li>                             
										<a href="<?php echo site_url('Premium_Features/Brokerage-Integrations'); ?>">How to integrate Brokerage Accounts</a>
									</li>
									<li>                                                    
										<a href="<?php echo site_url('Premium-Features/Due-Diligence-Database'); ?>">How our Due Database works</a>   
									</li>
								</ul>     
                                <br>
                                <br>
                                <?php 
                                // print_r($testData); 
                                // echo '<br><br>';
                                // echo 'getCoinValue: ' . print_r($getCoinValue);
                                // echo '<br><br>';
                                // echo 'initial_coin_value: ' . $initial_coin_value;
                                // echo '<br>';
                                // echo 'initial_available_coins: ' . $initial_available_coins;
                                // echo '<br>';
                                // echo 'initial_percent_increase: ' . $initial_percent_increase;
                                // echo '<br>';
                                // echo 'initial_percent_increase_num: ' . $initial_percent_increase_num;
                                // echo '<br>';
                                // echo 'initial_new_available_coins: ' . $initial_new_available_coins;
                                // echo '<br><br>';
                                // echo 'getInitialCoinValue: ' . print_r($getInitialCoinValue);
                                // echo '<br><br>';
                                // echo 'current_value: ' . $current_value;
                                // echo '<br>';
                                // echo 'coin_value: ' . $coin_value;
                                // echo '<br>';
                                // echo 'new_availability: ' . $new_availability;
                                // echo '<br>';
                                // echo 'available_coins: ' . $available_coins;
                                // echo '<br>';
                                // echo 'percent_increase: ' . $percent_increase;
                                // echo '<br>';
                                // echo 'percent_increase_num: ' . $percent_increase_num;
                                // echo '<br>';
                                // echo 'new_available_coins: ' . $new_available_coins_formatted;
                                // echo '<br>';
                                // echo 'package_a: ' . $package_a;
                                // echo '<br>';
                                // echo 'package_a_coins: ' . $package_a_coins_formatted;
                                // echo '<br>';
                                // echo 'package_b: ' . $package_b;
                                // echo '<br>';
                                // echo 'package_b_coins: ' . $package_b_coins_formatted;
                                // echo '<br>';
                                // echo 'package_c: ' . $package_c;
                                // echo '<br>';
                                // echo 'package_c_coins: ' . $package_c_coins_formatted;
                                ?>       

							</div>
						</div>       
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
