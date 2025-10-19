<?php
use Config\Services;

$request = Services::request();
$session = session();

// Load required libraries, models, or services
$analyticsService = service('MyMIAnalytics'); // Replace with the appropriate service loading method
$router = service('router');
// Other services/models should be loaded similarly

$reporting = $analyticsService->reporting();
// Uncomment and adapt similar lines for other services/models as needed

if (!empty($session->get('userAccount')['cuID'])) {
    $cuID = !empty($session->get('user_id')) ? $session->get('user_id') : $request->getIPAddress();

    $config = config('App'); // Assuming 'beta' is configured in 'App' config file
    $betaStatus = $config->beta;
    $beta = $betaStatus === 0 ? 'No' : 'Yes';

    $thisController = $router->controllerName();
    $thisMethod = $router->methodName();
    $thisURL = $request->getPath();
    $thisFullURL = current_url(); // Make sure to load URL helper for this function

    $thisComment = 'User (' . $cuID . ') successfully viewed the following page: ' . $thisURL;

    // Log the action - ensure MyMILogger is properly loaded or adapted
    $mymilogger = new MyMILogger(); // Example, replace with actual loading method
    $mymilogger->user($cuID)
               ->beta($beta)
               ->type('Page Visit')
               ->controller($thisController)
               ->method($thisMethod)
               ->url($thisURL)
               ->full_url($thisFullURL)
               ->comment($thisComment)
               ->log();

    // Load user data - replace with actual methods from the relevant model/service
    $userAccount = $userService->userAccountInfo($cuID); // Example
    $walletID = $userAccount['walletID'];

    // Continue with similar loading methods for other data

    $userFlashData = [
        // Your flash data here
    ];

    // // Handling the page URI segments
    // $pageURIA = $request->getSegment(1);
    // $pageURIB = $request->getSegment(2);
    // Add conditions and further processing based on URI segments

    // Session data setting
    $allSessionData = [
        'userFlashData'             => $userFlashData,
        'userAccount'				=> $userAccount,
        // 'userInfo'					=> $userInfo,
        'userCoinData'				=> $userCoinData,
        'userGoldData'				=> $userGoldData,
        'userDefaultWalletInfo'		=> $userDefaultWalletInfo,
        'userLastActivity'			=> $userLastActivity,
        'MyMICoinData'				=> $MyMICoinData,
        'MyMIGoldData'				=> $MyMIGoldData,
        'myMIWalletSummary'			=> $myMIWalletSummary,
        'userWalletOpenSummary'		=> $userWalletOpenSummary,
        'userWalletTotalSummary'	=> $userWalletTotalSummary,
        'exchangeMarketData'		=> $exchangeMarketData,
        'userLastOrder'			    => $userLastOrder,
        'userLastCompletedOrder'    => $userLastCompletedOrder,
        // 'userExchangeInfo'			=> $userExchangeInfo,
        'reporting'                 => $reporting
    ];
    $session->set('allSessionData', $allSessionData);
}
?>
<?php
    $this->load->library('MyMIAnalytics'); 
    $reporting                      = $this->getMyMIAnalytics()->reporting();
    // $marketing                      = $this->mymimarketing->marketing(); 
if (!empty($_SESSION['userAccount']['cuID'])) {
    // $this->load->library('MyMIAnalytics'); 
    if (!empty($_SESSION['user_id'])) {
        $cuID 					    = $_SESSION['user_id'];
    } else {
        $cuID                       = $this->input->ip_address();
    }
    $betaStatus                     = $siteSettings->beta;
    if ($betaStatus === 0) {
        $beta                       = 'No';
    } else {
        $beta                       = 'Yes';
    }
    $thisController                 = $this->router->fetch_class();
    $thisMethod                     = $this->router->fetch_method();
    $thisURL                        = $this->uri->uri_string();
    $thisFullURL                    = current_url();
    $thisComment                    = 'User (' . $cuID . ') successfully viewed the following page: ' . $thisURL;
    $this->mymilogger
        ->user($cuID) //Set UserID, who created this  Action
        ->beta($beta) //Set whether in Beta or nto
        ->type('Page Visit') //Entry type like, Post, Page, Entry
        ->controller($thisController)
        ->method($thisMethod)
        ->url($thisURL)
        ->full_url($thisFullURL)
        ->comment($thisComment) //Token identify Action
        ->log(); //Add Database Entry
    $userDefaultAccount             = $this->getMyMIUser()->user_default_account_info(); 
    $userAccount	        		= $this->getMyMIUser()->user_account_info($cuID);
    $walletID                       = $userAccount['walletID'];
    // print_r($userAccount);
    // Template::set('userAccountInfo', $userAccountInfo);
    // $userInfo               		= $this->getMyMIUser()->get_user_information($cuID);
    // Template::set('userInfo', $userInfo);
    $userCoinData					= $this->mymicoin->get_user_coin_total($cuID);
    $userGoldData					= $this->mymigold->get_user_coin_total($cuID);
    $userDefaultWalletInfo			= $this->mymiwallet->get_default_wallet_info($cuID, $walletID);
    $userLastActivity				= $this->mymiwallet->get_last_activity($cuID, $walletID);
    $MyMICoinData					= $this->mymicoin->get_coin_info();
    $MyMIGoldData					= $this->mymigold->get_coin_info();
    $myMIWalletSummary				= $this->mymiwallet->get_wallet_totals($cuID);
    $userWalletOpenSummary			= $this->mymiwallet->get_total_open_value($cuID);
    $userWalletTotalSummary			= $this->mymiwallet->get_total_wallet_value($cuID);
    $getUserAssetCount              = $this->exchange_model->get_user_asset_count($cuID);
    $userFlashData                  = array(
        'cuID'                      => $cuID, 
        'beta'                      => $beta,
        'walletID'                  => $walletID,
        'date'                      => $date,
        'hostTime'                  => $hostTime,
        'time'                      => $time,
    ); 
    if ($pageURIA === 'Exchange' and $pageURIB === 'Market') {
        $exchangeMarketData			= $this->mymiexchange->get_market_summaries($pageURIC, $pageURID);
    } else {
        $exchangeMarketData         = array();
    }
    if ($pageURIA === 'MyMI-Gold' || $pageURIB === 'Complete-Purchase') {
        $userLastOrder			    = $this->mymigold->get_user_last_order($cuID);
        $userLastCompletedOrder     = $this->mymigold->get_user_last_completed_order($cuID);
    } elseif ($pageURIA === 'MyMI-Gold' || $pageURIB === 'Purchase-Complete') {
        $userLastOrder			    = $this->mymigold->get_user_last_order($cuID);
        $userLastCompletedOrder     = $this->mymigold->get_user_last_completed_order($cuID);
    } elseif ($pageURIA === 'Dashboard' or $pageURIA === 'Wallets' or $pageURIA === 'Test-Page') {
        $userLastOrder			    = $this->mymigold->get_user_last_order($cuID);
        $userLastCompletedOrder     = $this->mymigold->get_user_last_completed_order($cuID);
    } else {
        $userLastOrder              = array();
        $userLastCompletedOrder     = array();
    }
    // $userExchangeInfo				= $this->getMyMIUser()->get_user_exchange_info($cuID);
    $_SESSION['allSessionData']     = array();  
    $allSessionData					= array(
        'userFlashData'             => $userFlashData,
        'userAccount'				=> $userAccount,
        // 'userInfo'					=> $userInfo,
        'userCoinData'				=> $userCoinData,
        'userGoldData'				=> $userGoldData,
        'userDefaultWalletInfo'		=> $userDefaultWalletInfo,
        'userLastActivity'			=> $userLastActivity,
        'MyMICoinData'				=> $MyMICoinData,
        'MyMIGoldData'				=> $MyMIGoldData,
        'myMIWalletSummary'			=> $myMIWalletSummary,
        'userWalletOpenSummary'		=> $userWalletOpenSummary,
        'userWalletTotalSummary'	=> $userWalletTotalSummary,
        'exchangeMarketData'		=> $exchangeMarketData,
        'userLastOrder'			    => $userLastOrder,
        'userLastCompletedOrder'    => $userLastCompletedOrder,
        // 'userExchangeInfo'			=> $userExchangeInfo,
        'reporting'                 => $reporting
    );
    // print_r($allSessionData);
    $_SESSION['allSessionData']	 	= $allSessionData;
    // $reporting	 	    = $reporting;
}
?>
