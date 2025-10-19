<?php
declare(strict_types=1);

// app/Config/Routes.php
use CodeIgniter\Router\RouteCollection;
use Config\Services; // ← add this line

/**
 * @var RouteCollection $routes
 */
$routes = Services::routes();

// --- BEGIN: Default + explicit routes ---
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');   // change if you have a different landing controller
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();

// Explicit home route. If you don't have Home::index, temporarily redirect to /login.
// $routes->get('/', function () {
//     return redirect()->to('/login');  // change to 'Home::index' once that exists
// });

// Simple health check that should return 200 without auth
$routes->get('healthz', static function () {
    return service('response')->setJSON(['ok' => true, 'time' => time()]);
});

// (Optional) temporarily enable auto-routing to confirm controller wiring
$routes->setAutoRoute(false);
// --- END: Default + explicit routes ---


$routes->get('/', 'Home::index');
$routes->get('How-It-Works', 'Home::HowItWorks');

// app/Config/Routes.php
$routes->get('/sw.js', 'ServiceWorker::index');
$routes->get('/Apex/Referral', 'Home::index');
$routes->get('/Apex/Referral/(:segment)', 'Home::apexReferral/$1');
$routes->get('/Corporate-Earnings', 'Home::corporateEarnings');
$routes->get('/Corporate-Earnings/(:segment)', 'Home::corporateEarnings/$1');
$routes->get('/Economic-Calendar', 'Home::economicCalendar');
$routes->get('/Economic-Calendar/(:segment)', 'Home::economicCalendarContent/$1');
$routes->get('/Getting-Started/(:segment)/(:segment)', 'Home::gettingStarted');
$routes->get('/Getting-Started/(:segment)', 'Home::gettingStarted');
$routes->get('/Getting-Started', 'Home::gettingStarted');
$routes->get('/Memberships', 'Home::memberships');
$routes->get('/Memberships/(:segment)', 'Home::memberships');
$routes->get('/Preview/Alert/(:segment)', 'Home::previewAlert/$1');
$routes->get('/Privacy-Policy', 'Home::privacyPolicy');
$routes->get('/Terms-Of-Service', 'Home::termsOfService');
$routes->get('/resend-activation', 'Home::resendActivation');
$routes->post('/resend-activation', 'Home::resendActivationCode');

// Dev tools
$routes->get('Dev/BitcoinTest', 'App\Controllers\Dev\BitcoinTest::index');

$routes->group('debug', ['namespace' => 'App\Controllers\Debug'], static function ($routes) {
    $routes->get('common-data/smoke', 'CommonDataController::smoke');
});

// App Health and Ops endpoints
$routes->group('', ['namespace' => 'App\Controllers'], static function($routes) {
    // Health
    $routes->get('health', 'Health::index');     // JSON {"status":"ok",...}
    $routes->get('status', 'Health::status');    // plain "OK"
    $routes->get('api/health', 'Health::index'); // convenient alias

    // Ops (protected by X-OPCACHE-RESET header)
    $routes->get('_ops/opcache-reset', 'Ops::opcacheReset');
});

// App Health and Ops endpoints
$routes->group('', ['namespace' => 'App\Controllers'], static function($routes) {
    // Health
    $routes->get('health', 'Health::index');     // JSON {"status":"ok",...}
    $routes->get('status', 'Health::status');    // plain "OK"
    $routes->get('api/health', 'Health::index'); // convenient alias

    // Ops (protected by X-OPCACHE-RESET header)
    $routes->get('_ops/opcache-reset', 'Ops::opcacheReset');
});

// Auth Routes
$routes->group('', ['namespace' => 'App\Controllers'], function ($routes) {
    $routes->get('login', 'AuthController::login', ['as' => 'login']);
    $routes->post('login', 'AuthController::attemptLogin', ['as' => 'auth/attemptLogin']);
    $routes->get('logout', 'AuthController::logout');
    $routes->get('test-create-user', 'AuthController::createTempUser');

    $routes->post('Auth/link-robinhood', '\Myth\Auth\Controllers\AuthController::linkRobinhood');
    $routes->post('Auth/link-snaptrade', '\Myth\Auth\Controllers\AuthController::linkSnapTrade');

    // Registration
    // Registration routes
    $routes->get('register', 'AuthController::register', ['as' => 'register']); // Base route
    $routes->get('register/(:segment)', 'AuthController::register/$1', ['as' => 'register-segment']); // /register/<referral>
    $routes->get('(:any)/register', 'AuthController::register', ['as' => 'dynamic-register']); // /<dynamic>/register
    $routes->get('(:any)/register/(:segment)', 'AuthController::register/$2', ['as' => 'dynamic-register-referral']); // /<dynamic>/register/<referral>


    // Activation
    $routes->get('activate', 'AuthController::activateAccount', ['as' => 'activate']);
    $routes->post('activate-account', 'AuthController::activateAccount', ['as' => 'activate-account']);
    $routes->post('activate-account/(:segment)', 'AuthController::activateAccount', ['as' => 'activate-account-by-uri']);
    // $routes->get('resend-activation', 'AuthController::resend', ['as' => 'resend-activation-view']);
    // $routes->post('resend-activation', 'AuthController::resendActivationCode', ['as' => 'resend-activation-code']); 

    // Password Reset
    $routes->get('forgot-password', 'AuthController::forgotPassword', ['as' => 'forgot-password']);
    $routes->get('reset-password', 'AuthController::resetPassword', ['as' => 'reset-password']);
    $routes->post('forgot', 'AuthController::attemptForgot');

    // 2FA Authentication
    $routes->post('get2FAQRCode', 'AuthController::get2FAQRCode', ['as' => 'get-2FA-QRCode']);
    $routes->post('verify2FACode', 'AuthController::verify2FACode', ['as' => 'verify-2FA-Code']);
});
$routes->get('auth/(:any)', 'SocialAuthController::login/$1');
$routes->get('auth/callback', 'SocialAuthController::callback');

// All Remaining Custom Routes
$routes->group('', ['namespace' => 'App\Modules\User\Controllers','filter' => 'login'], function($routes) {
    $routes->get('/Account', 'DashboardController::account', ['as' => 'account']);
    $routes->get('/Account/Activity', 'DashboardController::activity', ['as' => 'activity']);
    $routes->get('/Account/Billing', 'DashboardController::billing', ['as' => 'billing']);
    $routes->get('/Account/Connected-Accounts', 'DashboardController::connectedAccounts', ['as' => 'connected-accounts']);
    $routes->get('/Account/Notifications', 'DashboardController::notifications', ['as' => 'notifications']);
    $routes->get('/Account/Security', 'DashboardController::Security', ['as' => 'security']);
    $routes->get('/Account/Social-Media', 'DashboardController::SocialMedia', ['as' => 'social-media']);
    $routes->get('/Accounts/createLinkToken', 'AccountController::createLinkToken', ['as' => 'create-link-token']);
    $routes->get('/Search', 'SearchController::index');
    $routes->get('/Search/(:segment)', 'SearchController::index/$1');
    // $routes->get('/Budget', 'BudgetController::index', ['as' => 'budget']);
    // $routes->get('/Investments', 'InvestmentsController::index', ['as' => 'investments']); 
    // $routes->get('/Getting-Started', 'Subscribe::index', ['as' => 'getting-started']);
    $routes->get('/MyMI-Wallet', 'WalletsController::MyMIWallet', ['as' => 'mymi-wallet']);
    // $routes->get('/Profile', 'DashboardController::profile', ['as' => 'profile']);
    $routes->get('/Profile/(:segment)', 'DashboardController::profile/$1', ['as' => 'profile']);
    $routes->get('/Performance', 'DashboardController::performance', ['as' => 'performance']);
    $routes->get('/Schedule', 'DashboardController::schedule', ['as' => 'schedule']);
    // $routes->get('/Support', 'DashboardController::support', ['as' => 'support']);
    // $routes->match(['GET', 'POST'], '/', 'InvestmentsController::tradeTracker');
    $routes->get('/Trade-Tracker', 'InvestmentsController::tradeTracker', ['as' => 'mymi-trade-tracker']);
    $routes->get('/Trade-Tracker/getTradeData', 'InvestmentsController::getTradeData', ['as' => 'get-trade-tracker-data']);
    $routes->post('/Trade-Tracker/saveTradeData', 'InvestmentsController::saveTradeData', ['as' => 'save-trade-tracker-data']);
    $routes->get('/MyMI-Gold/Goals/(:segment)', 'DashboardController::goals', ['as' => 'mymi-gold-daily-goals']);
    // $routes->get('/MyMI-Gold/Goals/Daily', 'DashboardController::goals', ['as' => 'mymi-gold-daily-goals']);
    // $routes->get('/MyMI-Gold/Goals/Weekly', 'DashboardController::goals', ['as' => 'mymi-gold-weekly-goals']);
    // $routes->get('/MyMI-Gold/Goals/Monthly', 'DashboardController::goals', ['as' => 'mymi-gold-monthly-goals']);

    // Additional secured routes here
});

$routes->group('API', ['namespace' => 'App\Modules\APIs\Controllers'],  function($routes) {
    $routes->get('/', 'APIController::index');
    $routes->get('Health', 'HealthController::index');              // /API/Health
    $routes->get('Ops/OPcacheReset', 'OpsController::opcacheReset'); // /API/Ops/OPcacheReset
    $routes->match(['GET', 'POST'], '/', 'APIController::index');
    $routes->match(['GET', 'POST'], 'Status', 'APIController::status');
    $routes->get('Health', 'HealthController::index');              // /API/Health
    $routes->get('Ops/OPcacheReset', 'OpsController::opcacheReset'); // /API/Ops/OPcacheReset
    $routes->match(['GET', 'POST'], 'Status/(:segment)', 'APIController::status');
    $routes->match(['GET', 'POST'], 'Investments/getSymbolsByTradeType/(:segment)', 'APIController::getSymbolsByTradeType/$1');

    $routes->group('Management', function($routes) {
        $routes->get('Run-CRON-Tasks', 'ManagementController::Run_CRON_Tasks');
        $routes->get('ajaxGetActiveUsers', 'ManagementController::ajaxGetActiveUsers');
        $routes->get('ajaxGetInactiveUsers', 'ManagementController::ajaxGetInactiveUsers');
        $routes->get('checkForSpamUsers', 'ManagementController::checkForSpamUsers');
        $routes->get('distributeTodaysNewsContent', 'ManagementController::distributeTodaysNewsContent');
        $routes->get('exportPostJson/(:num)', 'ManagementController::exportPostJson/$1');
        $routes->get('fetchAlphaVantageNewsForTradeAlerts', 'ManagementController::fetchAlphaVantageNewsForTradeAlerts');
        $routes->get('fetchEmailsToTempScraper', 'ManagementController::fetchEmailsToTempScraper');
        $routes->get('fetchLatestSummaries', 'ManagementController::fetchLatestSummaries');
        $routes->get('fetchNewsEmails', 'ManagementController::fetchNewsEmails');
        $routes->get('generatePostsFromSummary/(:num)', 'ManagementController::generatePostsFromSummary/$1');
        $routes->get('generatePostsFromSummary', 'ManagementController::generatePostsFromSummary');
        $routes->get('generateVoiceScriptManually', 'ManagementController::generateVoiceScriptManually');
        $routes->get('getUsers', 'ManagementController::getUsers');
        $routes->get('getAlerts', 'ManagementController::getAlerts');
        $routes->get('getReferrals', 'ManagementController::getReferrals');
        $routes->get('getAssets', 'ManagementController::getAssets');
        $routes->get('getNews', 'ManagementController::getNews');
        $routes->get('getSupport', 'ManagementController::getSupport');
        $routes->get('processAllTradeAlerts', 'ManagementController::processAllTradeAlerts');
        $routes->get('runCronManually', 'ManagementController::runCronManually');
        $routes->get('runDailyAlphaVantageDataPipeline', 'ManagementController::runDailyAlphaVantageDataPipeline');
        $routes->get('scrapeAndGenerateTodaysStoryFromInbox', 'ManagementController::scrapeAndGenerateTodaysStoryFromInbox');
        $routes->get('sendAllDiscordAlerts', 'ManagementController::sendAllDiscordAlerts');
        $routes->get('sendToZapierManually', 'ManagementController::sendToZapierManually');
        $routes->get('sharePost/(:num)/(:segment)', 'ManagementController::sharePost/$1/$2');
        $routes->get('triggerPostAutogenOnEmpty', 'ManagementController::triggerPostAutogenOnEmpty');
        $routes->get('updateMarketDataForAlerts', 'ManagementController::updateMarketDataForAlerts');
        
    });

    // ------------------------
    // ✅ AlertsController
    // ------------------------
    $routes->group('Alerts', function($routes) {
        $routes->match(['GET', 'POST'], 'addTradeAlert', 'AlertsController::addTradeAlert');
        $routes->match(['GET', 'POST'], 'backfillCategories', 'AlertsController::backfillCategories');
        $routes->match(['GET', 'POST'], 'createTradeAlert/(:segment)', 'AlertsController::addTradeAlert');
        $routes->match(['GET', 'POST'], 'createTradeAlert', 'AlertsController::addTradeAlert');
        $routes->match(['GET', 'POST'], 'getFilteredAlerts', 'AlertsController::getFilteredAlerts');
        $routes->match(['GET', 'POST'], 'fetchAutoGeneratedAnalysis', 'AlertsController::fetchAutoGeneratedAnalysis');
        $routes->match(['GET', 'POST'], 'fetchEmailAlerts', 'AlertsController::fetchEmailAlerts');
        $routes->match(['GET', 'POST'], 'fetchMarketAuxNews/(:segment)', 'AlertsController::fetchMarketAuxNews/$1');
        $routes->match(['GET', 'POST'], 'forceFetchEmails', 'AlertsController::forceFetchEmails');
        $routes->match(['GET', 'POST'], 'forceFetchTickers', 'AlertsController::forceFetchTickers');
        $routes->post('API/Alerts/generateAdvisorMediaFromAlert/(:num)', 'AlertsController::generateAdvisorMediaFromAlert/$1');
        $routes->post('API/Alerts/generateAdvisorMediaFromAlert', 'AlertsController::generateAdvisorMediaFromAlert');
        $routes->match(['GET', 'POST'], 'generateNow', 'AlertsController::generateNow');
        $routes->match(['GET', 'POST'], 'generateTradeAlertSummary', 'AlertsController::generateTradeAlertSummary');
        $routes->match(['GET', 'POST'], 'getEmaComparison/(:segment)', 'AlertsController::getEmaComparison/1');
        $routes->match(['GET', 'POST'], 'getFullMetrics', 'AlertsController::getFullMetrics');
        $routes->match(['GET', 'POST'], 'getLatestPrices', 'AlertsController::getLatestPrices');
        $routes->match(['GET', 'POST'], 'getTechnicalIndicators', 'AlertsController::getTechnicalIndicators');
        $routes->match(['GET', 'POST'], 'hideTradeAlert', 'AlertsController::hideTradeAlert');
        $routes->match(['GET', 'POST'], 'manageTradeAlert', 'AlertsController::manageTradeAlert');
        $routes->match(['GET', 'POST'], 'markAlertAsSentAndSendEmail/(:segment)', 'AlertsController::markAlertAsSentAndSendEmail/$1');
        $routes->match(['GET', 'POST'], 'processAlerts', 'AlertsController::processAlerts');
        $routes->match(['GET', 'POST'], 'processEmailAlerts', 'AlertsController::processEmailAlerts');
        $routes->match(['GET', 'POST'], 'processTradeAlerts', 'AlertsController::processTradeAlerts');
        $routes->match(['GET', 'POST'], 'processTradeBatch', 'AlertsController::processTradeBatch');
        $routes->match(['GET', 'POST'], 'sendAlert', 'AlertsController::sendAlert');
        $routes->match(['GET', 'POST'], 'sendDiscordAlerts', 'AlertsController::sendDiscordAlerts');
        $routes->match(['GET', 'POST'], 'sendDiscordAlertsBySymbol/(:segment)', 'AlertsController::sendDiscordAlertsBySymbol/$1');
        $routes->match(['GET', 'POST'], 'storeMarketingContent', 'AlertsController::storeMarketingContent');
        $routes->match(['GET', 'POST'], 'updateBatchPrices', 'AlertsController::updateBatchPrices');
        $routes->match(['GET', 'POST'], 'updateChartOverride', 'AlertsController::updateChartOverride');
        $routes->match(['GET', 'POST'], 'updateExchange', 'AlertsController::updateExchange');
        $routes->match(['GET', 'POST'], 'updateStatus/(:num)/(:any)', 'AlertsController::updateStatus/$1/$2s');
        $routes->match(['GET', 'POST'], 'updateTradeAlerts', 'AlertsController::updateTradeAlerts');

        // Trade Alert Creation & Management
        $routes->match(['GET', 'POST'], 'submitTradeAlert', 'AlertsController::submitTradeAlert');
        $routes->match(['GET', 'POST'], 'getTradeAlertDetails', 'AlertsController::getTradeAlertDetails');
    
        // Voiceover and Marketing Content
        $routes->match(['GET', 'POST'], 'generateVoiceoverScript', 'AlertsController::generateVoiceoverScript');
        $routes->match(['GET', 'POST'], 'generateVoiceoverAndMarketingContent', 'AlertsController::generateVoiceoverAndMarketingContent');
        $routes->match(['GET', 'POST'], 'generateAndStoreVoiceover', 'AlertsController::generateAndStoreVoiceover');
        
        // Social Media & Marketing
        $routes->match(['GET', 'POST'], 'generateSocialMediaPosts', 'AlertsController::generateSocialMediaPosts');
        $routes->match(['GET', 'POST'], 'postMarketingContentToSocials', 'AlertsController::postMarketingContentToSocials');

        $routes->match(['GET', 'POST'], 'gen-keys', 'AlertsController::genKeys'); // Robinhood API Library :: generate keys
        $routes->match(['GET', 'POST'], 'sign', 'AlertsController::sign'); // Robinhood API Library :: sign
    });

    // ------------------------
    // ✅ AuctionsController
    // ------------------------
    $routes->group('Auctions', static function($routes) {
        $routes->post('fmv', 'AuctionsController::computeFMV');
        $routes->post('settle/(:num)', 'AuctionsController::settle/$1');
        $routes->post('escrow/release/(:num)', 'AuctionsController::releaseEscrow/$1');
        $routes->post('escrow/refund/(:num)', 'AuctionsController::refundEscrow/$1');
        $routes->post('topup', 'AuctionsController::topUp');
    });
    
    // ------------------------
    // ✅ BrokerController
    // ------------------------
    $routes->group('Broker', function($routes) {
        $routes->get('summary', 'BrokerController::summary');
        $routes->get('credit', 'BrokerController::credit');
        $routes->get('available', 'BrokerController::available');
        $routes->get('repayment', 'BrokerController::repayment');
        $routes->get('categories', 'BrokerController::categories');
        $routes->get('transactions', 'BrokerController::transactions');
        $routes->get('goals', 'BrokerController::goals');
        $routes->get('insights', 'BrokerController::insights');
        $routes->get('trends', 'BudgetController::trends');
        $routes->get('net-worth', 'BudgetController::netWorth');
        $routes->get('cash-flow', 'BudgetController::cashFlow');
        $routes->get('budgets', 'BudgetController::budgets');
        $routes->get('savings-goals', 'BrokerController::savingsGoals');
        $routes->get('investment-accounts', 'BrokerController::investmentAccounts');
        $routes->get('linked-accounts', 'BrokerController::linkedAccounts');
        $routes->get('add-linked-account', 'BrokerController::addLinkedAccount');
        $routes->get('remove-linked-account/(:segment)', 'BrokerController::removeLinkedAccount/$1');
        $routes->get('refresh-linked-account/(:segment)', 'BrokerController::refreshLinkedAccount/$1');

        $routes->get('fetchPlaidLinkToken/(:segment)', 'BrokerController::fetchPlaidLinkToken/$1');
        $routes->get('fetchPlaidLinkToken', 'BrokerController::fetchPlaidLinkToken');
        $routes->post('linkPlaidAccount', 'BrokerController::linkPlaidAccount');
        $routes->get('unlinkPlaidAccount/(:segment)', 'BrokerController::unlinkPlaidAccount/$1');
        $routes->get('refreshPlaidAccount/(:segment)', 'BrokerController::refreshPlaidAccount/$1');
        $routes->get('fetchPlaidAccounts/(:segment)', 'BrokerController::fetchPlaidAccounts/$1');
        $routes->get('fetchPlaidAccounts', 'BrokerController::fetchPlaidAccounts');
        $routes->get('fetchPlaidTransactions/(:segment)', 'BrokerController::fetchPlaidTransactions/$1');
        $routes->get('fetchPlaidTransactions', 'BrokerController::fetchPlaidTransactions');
        $routes->get('fetchPlaidBalances/(:segment)', 'BrokerController::fetchPlaidBalances/$1');
        $routes->get('fetchPlaidBalances', 'BrokerController::fetchPlaidBalances');
        $routes->get('fetchPlaidIncome/(:segment)', 'BrokerController::fetchPlaidIncome/$1');
        $routes->get('fetchPlaidIncome', 'BrokerController::fetchPlaidIncome');
        $routes->get('fetchPlaidLiabilities/(:segment)', 'BrokerController::fetchPlaidLiabilities/$1');
        $routes->get('fetchPlaidLiabilities', 'BrokerController::fetchPlaidLiabilities');
        $routes->get('fetchPlaidIdentity/(:segment)', 'BrokerController::fetchPlaidIdentity/$1');
        $routes->get('fetchPlaidIdentity', 'BrokerController::fetchPlaidIdentity');
        $routes->get('fetchPlaidInvestments/(:segment)', 'BrokerController::fetchPlaidInvestments/$1');
        $routes->get('fetchPlaidInvestments', 'BrokerController::fetchPlaidInvestments');
        $routes->get('fetchPlaidHoldings/(:segment)', 'BrokerController::fetchPlaidHoldings/$1');
        $routes->get('fetchPlaidHoldings', 'BrokerController::fetchPlaidHoldings');
        $routes->get('fetchPlaidLiabilities/(:segment)', 'BrokerController::fetchPlaidLiabilities/$1');
        $routes->get('fetchPlaidLiabilities', 'BrokerController::fetchPlaidLiabilities');
        $routes->get('fetchPlaidTransactions/(:segment)', 'BrokerController::fetchPlaidTransactions/$1');
        $routes->get('fetchPlaidTransactions', 'BrokerController::fetchPlaidTransactions');
        $routes->get('fetchPlaidBalances/(:segment)', 'BrokerController::fetchPlaidBalances/$1');
        $routes->get('fetchPlaidBalances', 'BrokerController::fetchPlaidBalances');
        $routes->get('fetchPlaidIncome/(:segment)', 'BrokerController::fetchPlaidIncome/$1');
        $routes->get('fetchPlaidIncome', 'BrokerController::fetchPlaidIncome');
        $routes->get('fetchPlaidIdentity/(:segment)', 'BrokerController::fetchPlaidIdentity/$1');
        $routes->get('fetchPlaidIdentity', 'BrokerController::fetchPlaidIdentity');
        $routes->get('fetchPlaidInvestments/(:segment)', 'BrokerController::fetchPlaidInvestments/$1');
        $routes->get('fetchPlaidInvestments', 'BrokerController::fetchPlaidInvestments');
        $routes->get('fetchPlaidHoldings/(:segment)', 'BrokerController::fetchPlaidHoldings/$1');
        $routes->get('fetchPlaidHoldings', 'BrokerController::fetchPlaidHoldings');
        $routes->get('fetchRobinhoodAccounts', 'BudgetController::fetchRobinhoodAccounts');
        $routes->get('fetchRobinhoodAccountDetails/(:segment)', 'BudgetController::fetchRobinhoodAccountDetails/$1');
        $routes->get('fetchRobinhoodPositions/(:segment)', 'BudgetController::fetchRobinhoodPositions/$1');
        $routes->get('fetchRobinhoodPositions', 'BudgetController::fetchRobinhoodPositions');
        $routes->get('fetchRobinhoodPortfolio/(:segment)', 'BudgetController::fetchRobinhoodPortfolio/$1');
        $routes->get('fetchRobinhoodPortfolio', 'BudgetController::fetchRobinhoodPortfolio');
        $routes->get('fetchRobinhoodWatchlists/(:segment)', 'BudgetController::fetchRobinhoodWatchlists/$1');
        $routes->get('fetchRobinhoodWatchlists', 'BudgetController::fetchRobinhoodWatchlists');
        $routes->get('fetchRobinhoodOrders/(:segment)', 'BudgetController::fetchRobinhoodOrders/$1');
        $routes->get('fetchRobinhoodOrders', 'BudgetController::fetchRobinhoodOrders');
        $routes->get('fetchRobinhoodOrderDetails/(:segment)', 'BudgetController::fetchRobinhoodOrderDetails/$1');
        $routes->get('fetchRobinhoodOrderDetails', 'BudgetController::fetchRobinhoodOrderDetails');
        $routes->get('fetchRobinhoodInstruments/(:segment)', 'BudgetController::fetchRobinhoodInstruments/$1');
        $routes->get('fetchRobinhoodInstruments', 'BudgetController::fetchRobinhoodInstruments');
        $routes->get('fetchRobinhoodQuotes/(:segment)', 'BudgetController::fetchRobinhoodQuotes/$1');
        $routes->get('fetchRobinhoodQuotes', 'BudgetController::fetchRobinhoodQuotes');
        $routes->get('fetchRobinhoodDividends/(:segment)', 'BudgetController::fetchRobinhoodDividends/$1');
        $routes->get('fetchRobinhoodDividends', 'BudgetController::fetchRobinhoodDividends');
        $routes->get('fetchRobinhoodTransfers/(:segment)', 'BudgetController::fetchRobinhoodTransfers/$1');
        $routes->get('fetchRobinhoodTransfers', 'BudgetController::fetchRobinhoodTransfers');
        $routes->get('fetchRobinhoodWatchlistItems/(:segment)', 'BudgetController::fetchRobinhoodWatchlistItems/$1');
        $routes->get('fetchRobinhoodWatchlistItems', 'BudgetController::fetchRobinhoodWatchlistItems');
        $routes->get('fetchRobinhoodTransactionHistory/(:segment)', 'BudgetController::fetchRobinhoodTransactionHistory/$1');
        $routes->get('fetchRobinhoodTransactionHistory', 'BudgetController::fetchRobinhoodTransactionHistory');
        $routes->get('fetchRobinhoodNotifications/(:segment)', 'BudgetController::fetchRobinhoodNotifications/$1');
        $routes->get('fetchRobinhoodNotifications', 'BudgetController::fetchRobinhoodNotifications');
        $routes->get('fetchRobinhoodACHRelationships/(:segment)', 'BudgetController::fetchRobinhoodACHRelationships/$1');
        $routes->get('fetchRobinhoodACHRelationships', 'BudgetController::fetchRobinhoodACHRelationships');
        $routes->get('fetchRobinhoodCryptoAccounts/(:segment)', 'BudgetController::fetchRobinhoodCryptoAccounts/$1');
        $routes->get('fetchRobinhoodCryptoAccounts', 'BudgetController::fetchRobinhoodCryptoAccounts');
        $routes->get('fetchRobinhoodCryptoPositions/(:segment)', 'BudgetController::fetchRobinhoodCryptoPositions/$1');
        $routes->get('fetchRobinhoodCryptoPositions', 'BudgetController::fetchRobinhoodCryptoPositions');
        $routes->get('fetchRobinhoodCryptoPortfolio/(:segment)', 'BudgetController::fetchRobinhoodCryptoPortfolio/$1');
        $routes->get('fetchRobinhoodCryptoPortfolio', 'BudgetController::fetchRobinhoodCryptoPortfolio');
        $routes->get('fetchRobinhoodCryptoOrders/(:segment)', 'BudgetController::fetchRobinhoodCryptoOrders/$1');
        $routes->get('fetchRobinhoodCryptoOrders', 'BudgetController::fetchRobinhoodCryptoOrders');
        $routes->get('fetchRobinhoodCrypto  OrderDetails/(:segment)', 'BudgetController::fetchRobinhoodCryptoOrderDetails/$1');
        $routes->get('fetchRobinhoodCryptoOrderDetails', 'BudgetController::fetchRobinhoodCryptoOrderDetails');
        $routes->get('fetchRobinhoodCryptoTransactions/(:segment)', 'BudgetController::fetchRobinhoodCryptoTransactions/$1');
        $routes->get('fetchRobinhoodCryptoTransactions', 'BudgetController::fetchRobinhoodCryptoTransactions');
        $routes->get('fetchRobinhoodCryptoQuotes/(:segment)', 'BudgetController::fetchRobinhoodCryptoQuotes/$1');
        $routes->get('fetchRobinhoodCryptoQuotes', 'BudgetController::fetchRobinhoodCryptoQuotes');
    });

    // ------------------------
    // ✅ BudgetController
    // ------------------------
    $routes->group('Budget', function($routes) {
        $routes->get('summary', 'BudgetController::summary');
        $routes->get('credit', 'BudgetController::credit');
        $routes->get('available', 'BudgetController::available');
        $routes->get('repayment', 'BudgetController::repayment');
        $routes->get('categories', 'BudgetController::categories');
        $routes->get('transactions', 'BudgetController::transactions');
        $routes->get('goals', 'BudgetController::goals');
        $routes->get('insights', 'BudgetController::insights');
        $routes->get('trends', 'BudgetController::trends');
        $routes->get('net-worth', 'BudgetController::netWorth');
        $routes->get('cash-flow', 'BudgetController::cashFlow');
        $routes->get('budgets', 'BudgetController::budgets');
        $routes->get('savings-goals', 'BudgetController::savingsGoals');
        $routes->get('investment-accounts', 'BudgetController::investmentAccounts');
        $routes->get('linked-accounts', 'BudgetController::linkedAccounts');
        $routes->get('add-linked-account', 'BudgetController::addLinkedAccount');
        $routes->get('remove-linked-account/(:segment)', 'BudgetController::removeLinkedAccount/$1');
        $routes->get('refresh-linked-account/(:segment)', 'BudgetController::refreshLinkedAccount/$1');        
    });

    // ------------------------
    // ✅ DiscordController
    // ------------------------

    $routes->group('Discord', ['namespace' => 'App\Modules\APIs\Controllers'], static function($routes) {
        $routes->post('enqueue',         'DiscordController::enqueue');
        $routes->post('broadcast',       'DiscordController::broadcast');
        $routes->get('process-queue',    'DiscordController::processQueue');
        $routes->get('health',           'DiscordController::health');
        $routes->post('test',            'DiscordController::test');
    });

    // ------------------------
    // ✅ DripCampaignController
    // ------------------------
    $routes->group('DripCampaign', function($routes) {
        $routes->get('click/(:segment)', 'DripCampaignController::click/$1');
        $routes->get('Enroll/(:num)', 'DripCampaignController::enrollUser/$1');
        $routes->get('open/(:segment)', 'DripCampaignController::open/$1');
        $routes->get('processBatch', 'DripCampaignController::processBatch');
        $routes->get('TestCron', 'DripCampaignController::testDripCron');
    });

    // ------------------------
    // ✅ EmailController
    // ------------------------    
    $routes->group('Email', function($routes) {        
        $routes->get('autoScheduleDraftCampaigns', 'EmailController::autoScheduleDraftCampaigns');
        $routes->get('cloneCampaign/(:num)', 'EmailController::cloneCampaign/$1');
        $routes->post('createDraftCampaign', 'EmailController::createDraftCampaign');
        $routes->post('scheduleCampaignApi/(:num)', 'EmailController::scheduleCampaignApi/$1');
        $routes->get('cancelScheduledCampaign/(:num)', 'EmailController::cancelScheduledCampaign/$1');
        $routes->delete('deleteCampaign/(:num)', 'EmailController::deleteCampaign/$1');
        $routes->get('fetchCampaignAnalytics', 'EmailController::fetchCampaignAnalytics');
        $routes->get('fetchQueuedEmails', 'EmailController::fetchQueuedEmails');
        $routes->get('fetchQueuedEmailById/(:num)', 'EmailController::fetchQueuedEmailById/$1');
        $routes->get('getAllCampaigns', 'EmailController::getAllCampaigns');
        $routes->get('getCampaignMetrics/(:num)', 'EmailController::getCampaignMetrics/$1');
        $routes->get('getCampaignStats/(:num)', 'EmailController::getCampaignStats/$1');
        $routes->get('getEmailQueueStats', 'EmailController::getEmailQueueStats');
        $routes->get('getEmailQueueTrend', 'EmailController::getEmailQueueTrend');
        $routes->get('processScheduledCampaigns', 'EmailController::processScheduledCampaigns');
        $routes->get('sendMassTestCampaign', 'EmailController::sendMassTestCampaign');
        $routes->get('trackBounceWebhook', 'EmailController::trackBounceWebhook');
        $routes->get('unsubscribe/(:any)', 'EmailController::unsubscribe/$1');
    });

    $routes->group('eSports', function($routes) {
        $routes->post('createEvent', 'EsportsController::createEvent');
        $routes->post('joinEvent', 'EsportsController::joinEvent');
        $routes->post('lockEscrow', 'EsportsController::lockEscrow');
        $routes->post('cancelEvent', 'EsportsController::cancelEvent');
        $routes->post('receiveResultWebhook', 'EsportsController::receiveResultWebhook');
        $routes->post('settlePayouts', 'EsportsController::settlePayouts');
        $routes->post('cronProcessJobs', 'EsportsController::cronProcessJobs');
        $routes->get('event/(:num)', 'EsportsController::getEvent/$1');
        $routes->get('events', 'EsportsController::listEvents');
    });
    
    $routes->group('Investments', function($routes) {
        $routes->match(['GET', 'POST'], 'addNewTradeToWatchlist', 'InvestmentsController::addNewTradeToWatchlist');
        $routes->get('fetchActiveTrades/(:any)', 'API::fetchActiveTrade/$1'); // Fetch User Active Trades
        $routes->get('fetchRealTimeData/(:any)/(:any)', 'API::fetchRealTimeData/$1/$2'); // Fetch Real-Time Price Data
        $routes->get('fetchWatchlistPrices/(:any)', 'InvestmentsController::fetchWatchlistPrices/$1');
        $routes->get('getInvestmentData/(:segment)', 'InvestmentsController::getInvestmentData/$1');
        $routes->get('getSymbolsByTradeType/(:any)', 'API::getSymbolsByTradeType/$1'); // Fetch Symbols by Trade Type (Stocks, Cryptos, etc.)
        $routes->get('GetUserWatchlist/(:any)', 'InvestmentsController::getUserWatchlist/$1');
        $routes->get('GetUserWatchlist/(:any)', 'InvestmentsController::getUserWatchlist/$1');
        $routes->get('refreshActiveTradesPrices/(:any)', 'InvestmentsController::refreshActiveTradesPrices/$1');
        $routes->get('getSymbolsByTradeType/(:segment)', 'InvestmentsController::getSymbolsByTradeType/$1');
        $routes->get('getInvestmentData/(:segment)', 'InvestmentsController::getInvestmentData/$1');
        $routes->get('removeTradeFromWatchlist/(:num)', 'InvestmentsController::removeTradeFromWatchlist/$1'); // NOT COMPLETED Remove Trade from Watchlist
        $routes->post('updateTradeNotes', 'InvestmentsController::updateTradeNotes'); // NOT COMPLETED Update Trade Notes
        $routes->post('updateTradeTargetPrice', 'InvestmentsController::updateTradeTargetPrice'); // NOT COMPLETED Update Trade Target Price
        $routes->post('updateWatchlistOrder', 'InvestmentsController::updateWatchlistOrder'); // NOT COMPLETED Update Watchlist Order
        $routes->post('updateWatchlistTags', 'InvestmentsController::updateWatchlistTags'); // NOT COMPLETED Update Watchlist Tags
        $routes->get('userHoldings/(:any)', 'InvestmentsController::userHoldings/$1'); // Fetch User Holdings
        $routes->get('userWatchlist/(:any)', 'InvestmentsController::userWatchlist/$1'); // Fetch User Watchlist
        $routes->get('Search/Ticker/(:any)', 'InvestmentsController::searchTicker/$1'); // Search User Holdings
    });

    // ------------------------
    // ✅ ManagementController
    // ------------------------
    $routes->group('Management', function($routes) {
        $routes->get('banUnverifiedUsers', 'ManagementController::banUnverifiedUsers');
        $routes->get('processQueuedEmails', 'ManagementController::processQueuedEmails');
        $routes->get('resendActivationEmailsBatch', 'ManagementController::resendActivationEmailsBatch');
        $routes->get('resendActivationEmailsBatchQueued', 'ManagementController::resendActivationEmailsBatchQueued');
        $routes->get('sendTestActivationEmail', 'ManagementController::sendTestActivationEmail');
    });

    // ------------------------
    // ✅ MarketingController
    // ------------------------
    $routes->group('Marketing', function($routes) {
        $routes->post('approvePost/(:num)', 'MarketingController::approvePost/$1');
        $routes->post('approveBufferItem/(:num)', 'MarketingController::approveBufferItem/$1');
        $routes->post('autoScheduleNextApproved', 'MarketingController::autoScheduleNextApproved');
        $routes->get('cronAnalyzeContent', 'MarketingController::cronAnalyzeContent');
        $routes->get('cronAutoPublishGroupedDigest', 'MarketingController::cronAutoPublishGroupedDigest');
        $routes->get('cronFetchAndGenerateNews', 'MarketingController::cronFetchAndGenerateNews');
        $routes->get('cronFetchInbox', 'MarketingController::cronFetchInbox');
        $routes->get('cronFetchMarketingEmails', 'MarketingController::cronFetchMarketingEmails');
        $routes->get('cronProcessSMSMarketingIdeas', 'MarketingController::cronProcessSMSMarketingIdeas');
        $routes->delete('deleteScrape/(:num)', 'MarketingController::deleteScrape/$1');
        $routes->get('downloadVoiceover/(:any)', 'MarketingController::downloadVoiceover/$1');
        $routes->get('distributeHighScoreContent', 'MarketingController::distributeHighScoreContent');
        $routes->get('emailPostForApproval/(:num)', 'MarketingController::emailPostForApproval/$1');
        $routes->get('fetchBufferPaginated', 'MarketingController::fetchBufferPaginated');
        $routes->get('fetchFinalizedSummariesBlock', 'MarketingController::fetchFinalizedSummariesBlock');
        $routes->get('fetchGeneratedSummaries', 'MarketingController::fetchGeneratedSummaries');
        $routes->get('fetchGeneratedSummariesBlock', 'MarketingController::fetchGeneratedSummariesBlock');
        $routes->get('fetchGeneratedSummariesJson', 'MarketingController::fetchGeneratedSummariesJson');
        $routes->get('forceGenerateFromTemp', 'MarketingController::forceGenerateFromTemp');
        $routes->get('ForceGenerateFromTemp/(:num)', 'MarketingController::ForceGenerateFromTemp/$1');
        // $routes->get('generateCampaignContent/(:num)', 'MarketingController::generateCampaignContent/$1');
        $routes->match(['GET', 'POST'], 'generateCampaignContent', 'MarketingController::generateCampaignContent');
        $routes->match(['GET', 'POST'], 'generateDailyMarketCampaign', 'MarketingController::generateDailyMarketCampaign');
        $routes->match(['GET', 'POST'], 'generateCampaignStepContent', 'MarketingController::generateCampaignStepContent');
        $routes->get('generateContentFromScraper', 'MarketingController::generateContentFromScraper');
        $routes->get('generateContentDigestFromStored', 'MarketingController::generateContentDigestFromStored');
        $routes->get('generateDailyContentDigest', 'MarketingController::generateDailyContentDigest');
        $routes->get('GenerateFromSimilar/(:num)', 'MarketingController::generateFromSimilar/$1');
        $routes->get('generateFromSimilar', 'MarketingController::generateFromSimilar');
        $routes->get('generateLivePreview', 'MarketingController::generateLivePreview');
        $routes->get('generatePostsFromSummary/(:num)', 'MarketingController::generatePostsFromSummary/$1');
        $routes->get('generatePostsFromSummary', 'MarketingController::generatePostsFromSummary');
        $routes->match(['GET', 'POST'], 'generatePostMediaContent', 'MarketingController::generatePostMediaContent');
        $routes->get('generateScheduledPosts', 'MarketingController::generateScheduledPosts');
        $routes->get('getCleanedScrapedContent', 'MarketingController::getCleanedScrapedContent');
        $routes->get('getScrapeDetails/(:num)', 'MarketingController::getScrapeDetails/$1');
        $routes->get('generateThreadFromSummary/(:num)', 'MarketingController::generateThreadFromSummary/$1');
        $routes->get('getContentPerformanceAnalytics', 'MarketingController::getContentPerformanceAnalytics');
        $routes->get('getGeneratedPostsPaginated', 'MarketingController::getGeneratedPostsPaginated');
        $routes->get('getStoryboardPackage/(:num)', 'MarketingController::getStoryboardPackage/(:num)');
        $routes->get('getTopGeneratedPosts', 'MarketingController::getTopGeneratedPosts');
        $routes->get('getTopKeywordChart/(:num)', 'MarketingController::getTopKeywordChart/$1');
        $routes->get('groupSimilarSummariesByCosine', 'MarketingController::groupSimilarSummariesByCosine');
        $routes->get('massResendActivationEmails', 'MarketingController::massResendActivationEmails');
        $routes->get('monitorKeywords', 'MarketingController::monitorKeywordsAndScrape');
        $routes->get('previewBufferItem/(:num)', 'MarketingController::previewBufferItem/$1');
        $routes->get('previewPendingSummaries', 'MarketingController::previewPendingSummaries');
        $routes->get('processMarketingTempEmails/(:num)/(:segment)/(:num)', 'MarketingController::processMarketingTempEmails/$1/$2/$3');
        $routes->get('processMarketingTempEmails/(:num)/(:segment)', 'MarketingController::processMarketingTempEmails/$1/$2');
        $routes->get('publishGroupedContentDraft', 'MarketingController::publishGroupedContentDraft');
        $routes->get('rankBufferPostsDaily', 'MarketingController::rankBufferPostsDaily');
        $routes->get('reprocessIncompleteEmails', 'MarketingController::reprocessIncompleteEmails');
        $routes->post('rejectBufferItem/(:num)', 'MarketingController::rejectBufferItem/$1');
        $routes->get('runContentGenerationBatch', 'MarketingController::runContentGenerationBatch');
        $routes->get('runKeywordBackfillBatch', 'MarketingController::runKeywordBackfillBatch');
        $routes->get('runKeywordEnrichment', 'MarketingController::runKeywordEnrichment');
        $routes->get('runScheduledTasks', 'MarketingController::runScheduledTasks');
        $routes->get('Search/(:segment)/(:any)', 'ManagementController::index/$1/$2');
        $routes->get('sendWalkthroughEmails', 'MarketingController::sendWalkthroughEmails');
        $routes->get('scheduleApprovedPost/(:num)', 'MarketingController::scheduleApprovedPost/$1');
        $routes->get('schedulePost/(:any)/(:any)/(:any)', 'MarketingController::schedulePost/$1/$2/$3');
        $routes->get('sharePost/(:num)/(:segment)', 'MarketingController::sharePost/$1/$2');
        $routes->get('Large-Content/Form', 'MarketingController::submitLargeContentForm');
        $routes->post('submitLargeContent', 'MarketingController::submitLargeContent');
        $routes->get('Manual-Content/Form', 'MarketingController::shortLongContentForm');
        $routes->post('submitManualContent', 'MarketingController::submitManualContent');
        $routes->get('testGenerateDailyDigest', 'MarketingController::testGenerateDailyDigest');
        $routes->get('testGenerateFromTempEmail/(:num)', 'MarketingController::testGenerateFromTempEmail/$1');
        $routes->get('testTfIdfEdgeCases', 'MarketingController::testTfIdfEdgeCases');
        $routes->get('testGenerateSummarizerHarness', 'MarketingController::testGenerateSummarizerHarness');
        $routes->get('Timeline/(:segment)', 'MarketingController::timeline/$1');
        $routes->get('Timeline', 'MarketingController::viewTimelineGrouped');
        $routes->get('triggerBackfill', 'MarketingController::reprocessIncompleteEmails');
        $routes->get('triggerPostAutogenOnEmpty', 'MarketingController::triggerPostAutogenOnEmpty');
        $routes->post('updateCampaignLinks', 'MarketingController::updateCampaignLinks');
        $routes->post('updateInsight', 'MarketingController::updateInsight');
        $routes->post('updateCampaignMessageField', 'MarketingController::updateCampaignMessageField');
        $routes->post('updatePostSchedule/(:num)', 'MarketingController::updatePostSchedule/$1');
        $routes->post('updatePlatformToggle/(:num)', 'MarketingController::updatePlatformToggle/$1');
        $routes->post('validateSymbol', 'MarketingController::validateSymbol');
        
        // Marketing Platforms & Posting Plan
        $routes->get('getPlatforms','ManagementController::getPlatforms');
        $routes->post('savePlatform','ManagementController::savePlatform');
        $routes->delete('deletePlatform/(:num)','ManagementController::deletePlatform/$1');

        $routes->get('getPlatformRules/(:segment)','ManagementController::getPlatformRules/$1');
        $routes->post('upsertPlatformRule','ManagementController::upsertPlatformRule');
        $routes->delete('deletePlatformRule/(:num)','ManagementController::deletePlatformRule/$1');

        $routes->post('searchTaxonomy','ManagementController::searchTaxonomy');
        $routes->post('saveTaxonomy','ManagementController::saveTaxonomy');
        $routes->delete('deleteTaxonomy/(:num)','ManagementController::deleteTaxonomy/$1');

        $routes->get('listSuggestions/(:segment)/(:segment)','ManagementController::listSuggestions/$1/$2');
        $routes->post('saveSuggestion','ManagementController::saveSuggestion');
        $routes->delete('deleteSuggestion/(:num)','ManagementController::deleteSuggestion/$1');

        $routes->post('getPostingPlan','ManagementController::getPostingPlan');
        $routes->post('composePost','ManagementController::composePost');
    });

    // Predictions (API)
    $routes->group('Predictions', function($routes) {
        $routes->get('/', 'PredictionsController::index');
        $routes->get('Liquidity/Add', 'PredictionsController::addLiquidity');
        $routes->get('Liquidity/Remove', 'PredictionsController::removeLiquidity');
        $routes->get('Markets', 'PredictionsController::markets');
        $routes->get('Market/(:num)', 'PredictionsController::view/$1');
        $routes->get('Markets/Create', 'PredictionsController::createMarket');
        $routes->get('Markets/Settle/(:num)', 'PredictionsController::settle/$1');
        $routes->get('Orders/Place', 'PredictionsController::placeOrder');
        $routes->get('Orders/Cancel', 'PredictionsController::cancelOrder');
        $routes->get('Portfolio', 'PredictionsController::portfolio');
        $routes->get('Settlements', 'PredictionsController::settlements');
        $routes->post('PlaceOrder', 'PredictionsController::placeOrder');     // POST
        $routes->post('CancelOrder', 'PredictionsController::cancelOrder');   // POST
    });

    // Predictions CRON(API)
    $routes->group('Predictions', function($routes) {
        $routes->get('Cron/Distribute-Fees', 'PredictionsController::cronDistributeFees');
        $routes->get('Cron/Fetch-Market-Data', 'PredictionsController::cronFetchMarketData');
        $routes->get('Cron/Fetch-User-Data', 'PredictionsController::cronFetchUserData');
        $routes->get('Cron/Settle-Markets', 'PredictionsController::cronSettleMarkets');
        $routes->get('Cron/Expire-Markets', 'PredictionsController::cronExpireMarkets');
        $routes->get('Cron/Update-Market-Prices', 'PredictionsController::cronUpdateMarketPrices');
        $routes->get('Cron/Update-Market-States', 'PredictionsController::cronUpdateMarketStates');
        $routes->get('Cron/Update-User-Positions', 'PredictionsController::cronUpdateUserPositions');
        $routes->get('Cron/Update-User-Stakes', 'PredictionsController::cronUpdateUserStakes');
        $routes->get('Cron/Update-User-Fees', 'PredictionsController::cronUpdateUserFees');
        $routes->get('Cron/Update-User-PnL', 'PredictionsController::cronUpdateUserPnL');
        $routes->get('Cron/Update-User-Rankings', 'PredictionsController::cronUpdateUserRankings');
        $routes->get('Cron/Update-User-Leaderboard', 'PredictionsController::cronUpdateUserLeaderboard');
        $routes->get('Cron/Update-User-Stats', 'PredictionsController::cronUpdateUserStats');
        $routes->get('Cron/Update-User-Notifications', 'PredictionsController::cronUpdateUserNotifications');
        $routes->get('Cron/Process-Expired-Markets', 'PredictionsController::cronProcessExpiredMarkets');
        $routes->get('Cron/Process-Settled-Markets', 'PredictionsController::cronProcessSettledMarkets');
        $routes->get('Cron/Process-User-Orders', 'PredictionsController::cronProcessUserOrders');
        $routes->get('Cron/Process-User-Positions', 'PredictionsController::cronProcessUserPositions');
        $routes->get('Cron/Process-User-Stakes', 'PredictionsController::cronProcessUserStakes');
        $routes->get('Cron/Process-User-Fees', 'PredictionsController::cronProcessUserFees');
        $routes->get('Cron/Process-User-PnL', 'PredictionsController::cronProcessUserPnL');
        $routes->get('Cron/Process-User-Rankings', 'PredictionsController::cronProcessUserRankings');
        $routes->get('Cron/Process-User-Leaderboard', 'PredictionsController::cronProcessUserLeaderboard');
        $routes->get('Cron/Process-User-Stats', 'PredictionsController::cronProcessUserStats');
        $routes->get('Cron/Process-User-Notifications', 'PredictionsController::cronProcessUserNotifications');
        $routes->get('Cron/Process-User-Settlements', 'PredictionsController::cronProcessUserSettlements');
        $routes->get('Cron/Lock', 'PredictionsController::lock');
        $routes->get('Cron/Rebalance', 'PredictionsController::rebalanceOdds');
        $routes->get('Cron/Unlock', 'PredictionsController::unlock');
    });

    $routes->group('Projects', function($routes) {
        $routes->get('List', 'ProjectsController::list');
        $routes->get('View/(:segment)', 'ProjectsController::view/$1');
        $routes->get('Holdings', 'ProjectsController::holdings');
        $routes->post('ingest/real-estate', 'ProjectsController::ingestRealEstate');
    });

    $routes->group('Solana', function($routes) {
        $routes->get('getMarketPrice/(:segment)', 'SolanaController::get/$1');
        $routes->get('getCoinAmount/(:segment)', 'SolanaController::getCoinAmount/$1');
        $routes->get('getMarketPrice', 'SolanaController::getMarketPrice');
        $routes->get('getTokenPrice/(:segment)', 'SolanaController::getTokenPrice/$1');
        $routes->get('getExchangePrice/(:segment)', 'SolanaController::getExchangePrice/$1');
        $routes->get('getAssetsData', 'SolanaController::getAssetsData');
        $routes->get('provisionDefaultWallet', 'SolanaController::provisionDefaultWallet');
        $routes->get('updatePrices', 'SolanaController::updateSolanaPrices');
        $routes->get('updateTokens', 'SolanaController::updateSolanaTokens');

        // New Routes - Codex Pull Request https://github.com/MillennialInvestments/MyMIWallet/pull/35/files#diff-bfda09f2b1b5c0bbb67e81be1c5a9e3f3c0abcff17f9890caa17e3557bb25653R1-R4
        $routes->get('health', 'SolanaController::health');
        $routes->get('wallet/(:segment)/balance', 'SolanaController::getBalance/$1');
        $routes->get('wallet/(:segment)/tokens', 'SolanaController::getTokenAccounts/$1');
        $routes->post('transfer', 'SolanaController::transfer');
        $routes->post('swap/quote', 'SolanaController::quote');
        $routes->post('swap/execute', 'SolanaController::swap');
        $routes->post('token/create', 'SolanaController::createToken');
        $routes->post('token/mint', 'SolanaController::mint');
    });    

    $routes->group('Support', function($routes) {
        // app/Config/Routes.php (inside your existing User or API group)
        $routes->get('Support/kb', 'SupportController::kb');
        $routes->get('Support/kb/(:segment)', 'SupportController::kbArticle/$1');
    });

    $routes->group('Wallets', function($routes) {

        // ✅ Add this so /API/Wallets resolves to WalletsController::index
        $routes->get('/', 'WalletsController::index');

        // (keep your existing routes)
        $routes->get('providers', 'WalletsController::providers');

        // CRUD
        $routes->post('Create', 'WalletsController::create');
        $routes->put('Update/(:num)', 'WalletsController::update/$1');
        $routes->delete('Unlink/(:num)', 'WalletsController::unlink/$1');

        // Broker links
        $routes->post('Link-Robinhood', 'WalletsController::linkRobinhood');
        $routes->post('Link-Snaptrade', 'WalletsController::linkSnapTrade');
        $routes->post('Snaptrade/Connect-URL', 'WalletsController::getSnapTradeConnectUrl');

        // (optional legacy) leave this if you still need it, but it’s not required for the client fetch:
        $routes->post('Banking/Update/(:num)',   'WalletsController::updateBank/$1');
        $routes->post('Credit/Update/(:num)',    'WalletsController::updateCredit/$1');
        $routes->post('Debt/Update/(:num)',      'WalletsController::updateDebt/$1');
        $routes->post('Investments/Update/(:num)','WalletsController::updateInvestment/$1');
        $routes->post('Crypto/Update/(:num)',    'WalletsController::updateCrypto/$1');

        // Plaid Integration Links
        $routes->get('Plaid/Config-Debug', 'WalletsController::plaidConfigDebug');
        $routes->get('Plaid/Env', 'WalletsController::plaidEnv');
        $routes->get('Plaid/OAuth-Return', 'WalletsController::plaidOAuthReturn');
        $routes->get('Plaid/Webhook', 'WalletsController::plaidWebhook');
        $routes->get('Plaid/Link-Token', 'WalletsController::plaidLinkToken');
        $routes->post('Plaid/Exchange', 'WalletsController::plaidExchange');

        $routes->get('/(:segment)/(:segment)', 'WalletsController::index/$1/$2');

    });

    $routes->group('User', function($routes) {
        $routes->match(['GET', 'POST'], 'Comments/Add', 'UserController::addComment');
    });
});

$routes->group('Blog', ['namespace' => 'App\Modules\Blog\Controllers'],  function($routes) {
    $routes->get('/', 'BlogController::index'); // Landing Page
    $routes->get('Post/(:segment)', 'BlogController::viewBlog/$1'); // Dynamic Blog Post View

    $routes->group('Earnings', function($routes) {
        $routes->get('/', 'EarningsController::index');
        $routes->get('Test', 'EarningsController::test');
        $routes->get('(:segment)', 'EarningsController::viewByDate'); // Catch any dynamic date
        $routes->get('(:segment)', 'EarningsController::viewByDate'); // Catch any dynamic date
    });
    $routes->group('Investing', function($routes) {
        $routes->get('/', 'InvestingController::index');
        $routes->get('The-Beginners-Guide-To-Option-Trading', 'InvestingController::TheBeginnersGuideToOptionTrading');
        $routes->get('The-Fundamentals-Of-Investing', 'InvestingController::TheFundamentalsOfInvesting');
        $routes->get('Tips-For-Effective-Investment-Portfolio-Management', 'InvestingController::TipsForEffectiveInvestmentPortfolioManagement');
    });
    $routes->group('IRS', function($routes) {
        $routes->get('/', 'InvestingController::index');
        $routes->get('IRS-Expanded-Home-Energy-Tax-Credits', 'IRSController::IRSExpandedHomeEnergyTaxCredits');
    });
    $routes->group('News-And-Updates', function($routes) {
        $routes->get('/', 'UpdatesController::index');
        $routes->get('Integrating-With-Plaid', 'UpdatesController::IntegratingWithPlaid');
        $routes->get('The-Roadmap-To-The-Future-Of-Finance', 'UpdatesController::TheRoadmapToTheFutureOfFinance');
    });
    $routes->group('Personal-Budgeting', function($routes) {
        $routes->get('/', 'PersonalBudgetingController::index');
        $routes->get('The-Importance-of-Personal-Financial-Budgeting', 'PersonalBudgetingController::TheImportanceOfPersonalFinancialBudgeting');
    });
});

// Dashboard
$routes->group('Dashboard', ['namespace' => 'App\Modules\User\Controllers','filter' => 'login'], function($routes) {
    $routes->get('/', 'BudgetController::index', ['as' => 'dashboard']);
    $routes->get('Transaction-Modal/(:segment)', 'DashboardController::loadModalContent/$1', ['as' => 'load-modal-1-segment']);
    $routes->get('Transaction-Modal/(:segment)/(:segment)', 'DashboardController::loadModalContent/$1/$2', ['as' => 'load-modal-2-segment']);
    $routes->get('Transaction-Modal/(:segment)/(:segment)/(:segment)', 'DashboardController::loadModalContent/$1/$2/$3', ['as' => 'load-modal-3-segment']);
    $routes->get('Transaction-Modal/(:segment)/(:segment)/(:segment)/(:segment)', 'DashboardController::loadModalContent/$1/$2/$3/$4', ['as' => 'load-modal-4-segment']);
    $routes->get('Transaction-Modal/(:segment)/(:segment)/(:segment)/(:segment)/(:segment)', 'DashboardController::loadModalContent/$1/$2/$3/$4/$5', ['as' => 'load-modal-5-segment']);
    $routes->get('Transaction-Modal/(:segment)/(:segment)/(:segment)/(:segment)/(:segment)/(:segment)', 'DashboardController::loadModalContent/$1/$2/$3/$4/$5/$6', ['as' => 'load-modal-6-segment']);
    $routes->get('LoadingScreen', 'DashboardController::LoadingScreen', ['as' => 'loading-screen']);
    // Additional secured routes here

    // ✅ Onboarding Routes
    $routes->get('onboarding', 'DashboardController::onboarding', ['as' => 'onboarding']);
    $routes->get('checkOnboardingStatus', 'DashboardController::checkOnboardingStatus', ['as' => 'check-onboarding-status']);
    $routes->post('completeOnboardingStep/(:segment)', 'DashboardController::completeOnboardingStep/$1', ['as' => 'complete-onboarding-step']);
});

$routes->group('Management', ['namespace' => 'App\Modules\Management\Controllers'],  function($routes) {
    $routes->get('/', 'ManagementController::index');
    $routes->group('Admin', function($routes) {
        $routes->get('/', 'AdminController::index');
    });
    $routes->group('Alerts', function($routes) {
        $routes->get('/', 'AlertsController::index');
        $routes->get('Add/(:segment)', 'AlertsController::add');
        $routes->get('addTradeAlert', 'AlertsController::addTradeAlert');
        $routes->get('Advisor/Media', 'AlertsController::advisorMedia');
        $routes->get('Crypto/(:segment)/(:segment)', 'Management\AlertsController::stockOverview/$1/$2');
        $routes->match(['GET', 'POST'], 'Audit/Emails', 'AlertsController::auditEmailScraper');
        $routes->get('fetchData', 'AlertsController::fetchData');
        $routes->get('Fetch/Ticker/(:segment)', 'AlertsController::fetchTickerDetails/$1');
        $routes->get('Import/Tickers', 'AlertsController::importTickers');
        $routes->get('Stock/(:segment)/(:segment)', 'Management\AlertsController::stockOverview/$1/$2');
        $routes->get('Tasks/fetchAlerts', 'Management\AlertsController::fetchData');
        $routes->get('Test', 'AlertsController::test');
        $routes->get('Test-Alert-Email', 'AlertsController::testEmail');
        $routes->get('Test-Email', 'AlertsController::sendTestEmail');
        $routes->get('Trades', 'AlertsController::trades');
    });
    $routes->group('Assets', function($routes) {
        $routes->get('/', 'AssetsController::index');
    });
    $routes->group('Budgets', function($routes) {
        $routes->get('/', 'BudgetsController::index');
    });
    $routes->group('Budgeting', function($routes) {
        $routes->get('/', 'BudgetingController::index');
    });   
    $routes->group('Discord', function($routes) {
        $routes->get('/', 'DiscordController::index');
        $routes->get('authorize', 'DiscordController::authorize');
        $routes->get('callback', 'DiscordController::callback');
        $routes->get('fetchGuilds', 'DiscordController::fetchGuilds');
        $routes->get('fetchChannels/(:num)', 'DiscordController::fetchChannels/$1');
        $routes->post('sendMessage', 'DiscordController::sendMessage');
        $routes->get('Discord', 'ManagementController::discord');
        $routes->post('Discord/Channels/Save', 'DiscordController::saveDiscordChannel');
        $routes->post('Discord/Channels/Delete', 'DiscordController::deleteDiscordChannel');
        $routes->post('Discord/Templates/Save', 'DiscordController::saveDiscordTemplate');
        $routes->post('Discord/Templates/Delete', 'DiscordController::deleteDiscordTemplate');
        $routes->post('Discord/Subscriptions/Save', 'DiscordController::saveDiscordSubscription');
        $routes->post('Discord/Subscriptions/Delete', 'DiscordController::deleteDiscordSubscription');
    });
    $routes->group('Drip-Campaigns', function($routes) {
        $routes->get('/', 'DripCampaignController::index');
        $routes->match(['GET', 'POST'], 'Create', 'DripCampaignController::create');
        $routes->get('(:num)/Steps', 'DripCampaignController::viewSteps/$1');
        $routes->match(['GET', 'POST'], '(:num)/Steps/Add', 'DripCampaignController::addStep/$1');
    });
    $routes->group('Email', function($routes) {
        $routes->get('/', 'EmailController::index');
        $routes->post('addMember', 'EmailController::addMember');
        $routes->get('autoScheduleDrafts', 'EmailController::autoScheduleDrafts');
        $routes->get('autoScheduleLogs', 'EmailController::autoScheduleLogs');
        $routes->get('campaigns', 'EmailController::campaigns');
        $routes->get('campaignStats/(:num)', 'EmailController::campaignStats/$1');
        $routes->post('createList', 'EmailController::createList');
        $routes->get('editCampaign/(:num)', 'EmailController::editCampaign/$1');
        $routes->get('previewQueuedEmail/(:num)', 'EmailController::previewQueuedEmail/$1');
        $routes->get('queued', 'EmailController::queued');
        $routes->post('sendCampaign', 'EmailController::sendCampaign');
        $routes->post('scheduleCampaign/(:num)', 'EmailController::scheduleCampaign/$1');
        $routes->post('scheduleCampaignSubmit/(:num)', 'EmailController::scheduleCampaignSubmit/$1');
        $routes->post('updateCampaign/(:num)', 'EmailController::updateCampaign/$1');
    });
    $routes->group('Exchange', function($routes) {
        $routes->get('/', 'ExchangeController::index');
    });
    $routes->group('How-Tos', function($routes) {
        $routes->get('/', 'HowTosController::index');
        $routes->get('Employees/Account-Setup', 'HowTosController::employeeAccountSetup');
        $routes->get('Employees/Email-Setup', 'HowTosController::employeeEmailSetup');
    });
    $routes->group('Marketing', function($routes) {
        $routes->get('/', 'MarketingController::index');
        $routes->match(['GET', 'POST'], 'Add/(:segment)', 'MarketingController::add/$1');
        // $routes->get('Add/(:segment)', 'MarketingController::addSchedule');
        $routes->match(['POST'], 'Add-Subscriber', 'MarketingController::addSubscriber');
        $routes->get('Approve-Content/(:num)', 'MarketingController::approveContent/$1');
        $routes->get('Blog-Creator', 'MarketingController::blogCreator');
        $routes->get('Blogs', 'MarketingController::blogs');
        $routes->get('Campaigns', 'MarketingController::campaigns');
        $routes->get('Content-Review', 'MarketingController::contentReview');
        $routes->get('Content/Generator', 'MarketingController::contentGenerator');
        $routes->get('Content/Listing', 'MarketingController::contentListing');
        $routes->get('Daily-Log', 'MarketingController::viewDailyLogs');
        $routes->get('Edit-Content/(:num)', 'MarketingController::editContent/$1');
        $routes->get('Email/(:any)/(:any)', 'MarketingController::viewEmail/$1/$2');
        $routes->get('fetchEmails', 'MarketingController::fetchEmails'); 
        $routes->post('fetchMissingLogos', 'MarketingController::fetchMissingLogos'); 
        $routes->get('Financial-News', 'MarketingController::financialNews'); 
        $routes->post('generateAutomatedContent', 'MarketingController::generateAutomatedContent');
        $routes->get('generateContent', 'MarketingController::generateContent');
        $routes->get('generateDailyContentDigest', 'MarketingController::generateDailyContentDigest');
        $routes->get('generateNewsletter', 'MarketingController::generateNewsletterContent');
        $routes->get('getRecentScrapes', 'MarketingController::getRecentScrapes'); 
        $routes->get('Grouped-Content-Drafts', 'MarketingController::generateGroupedContentDrafts'); 
        $routes->get('Ideas', 'MarketingController::ideas');
        $routes->get('Post-Creator', 'MarketingController::postCreator');    
        $routes->get('previewGeneratedPost/(:num)', 'MarketingController::previewGeneratedPost/$1');
        $routes->get('Promote', 'MarketingController::promote'); 
        $routes->get('Promote/(:segment)', 'MarketingController::promote'); 
        $routes->post('PublishBlog/(:num)', 'Management\MarketingController::publishBlog/$1');
        $routes->get('Research', 'AlertsController::research');
        $routes->get('RunContentGeneration', 'Management\MarketingController::runContentGeneration');
        $routes->get('Quick-Scraper', 'MarketingController::standaloneScrape'); 
        $routes->get('Reject-Content/(:num)', 'MarketingController::rejectContent/$1');
        $routes->post('Save-Content-Edit/(:num)', 'MarketingController::saveContentEdit/$1');
        $routes->get('Schedule', 'MarketingController::schedule'); 
        $routes->get('Schedule/(:segment)', 'MarketingController::schedule/$1'); 
        $routes->get('scheduleNewsletters', 'MarketingController::scheduleNewsletterCampaign'); 
        $routes->get('submitDailyLog', 'MarketingController::submitDailyLog'); 
        $routes->post('Scrape-Link', 'MarketingController::scrapeLink'); // Ensure this is a POST route
        $routes->get('sendNotification', 'MarketingController::sendNotification');
        $routes->get('sendNewsletter', 'MarketingController::sendScheduleNewsletter'); 
        $routes->get('Test', 'MarketingController::test'); 
        $routes->get('Twitter', 'MarketingController::twitterDashboard'); 
        $routes->get('Video-Creator', 'MarketingController::videoCreator');
        $routes->get('View-Email/(:segment)/(:segment)', 'MarketingController::viewEmail/$1/$2');
        $routes->get('View-Grouped-Summaries', 'MarketingController::View-Grouped-Summaries');
        $routes->match(['GET', 'POST'], 'MyMI-Gold/Tasks/Add', 'WalletsController::addUserGoldTasks');
        // Define other routes for 'blog' module
        // $routes->get('Management/Marketing/Email-Templates', 'EmailTemplateController::index');
        $routes->get('Email-Templates/create', 'EmailTemplateController::create');
        $routes->post('/Email-Templates/store', 'EmailTemplateController::store');
    
        $routes->get('Email-Queue', 'EmailQueueController::index');
        $routes->get('Email-Queue/create', 'EmailQueueController::create');
        $routes->post('Email-Queue/store', 'EmailQueueController::store');
        $routes->post('Email-Queue/processQueue', 'EmailQueueController::processQueue');
    });
    $routes->group('Marketing/Email', function($routes) {
        $routes->get('/', 'EmailController::index');
    });
    $routes->group('Marketing/Exchange', function($routes) {
        $routes->get('/', 'MarketingController::index');
        $routes->match(['GET', 'POST'], 'Edit/(:segment)', 'MarketingController::edit/$1');
        $routes->get('Top-Communities', 'MarketingController::topCommunities');
        $routes->get('Top-Communities/(:segment)', 'MarketingController::topCommunities/$1');
    });
    // $routes->group('Support', function($routes) {
    //     $routes->get('/', 'SupportController::index');
    // });
    $routes->group('Users', function($routes) {
        $routes->get('/', 'UsersController::index');
        $routes->get('Profile/(:segment)', 'UsersController::profile');
        $routes->match(['GET', 'POST'], 'ajaxBlockUser/(:segment)', 'UsersController::ajaxBlockUser');
        $routes->match(['GET', 'POST'], 'ajaxBulkBanUsers', 'UsersController::ajaxBulkBanUsers');
    });
    $routes->group('Partners', function($routes) {
        $routes->get('/', 'PartnersController::index');
    });
    $routes->group('Projects', function($routes) {
        $routes->get('/', 'ProjectsController::index');
        $routes->post('Approve/(:segment)', 'ProjectsController::approveProject/$1'); 
        $routes->post('Edit/(:segment)', 'ProjectsController::approveProject/$1'); 
        $routes->post('Reject/(:segment)', 'ProjectsController::rejectProject/$1'); 
        $routes->get('Quick-Intake', 'ProjectsController::realEstateQuickIntake');
        $routes->post('Quick-Intake', 'ProjectsController::realEstateQuickSubmit');
    });
    $routes->group('Referrals', function($routes) {
        $routes->get('/', 'ReferralsController::index');
    });
    $routes->group('Security', function($routes) {
        $routes->get('/', 'SecurityController::index');
    });
    $routes->group('Services', function($routes) {
        $routes->get('/', 'ServicesController::index');
    });
    $routes->group('Wallets', function($routes) {
        $routes->get('/', 'WalletsController::index');
        $routes->get('Reconcile', 'WalletsController::reconcile');
        $routes->post('EmailUserAboutIssue/(:num)/(:num)', 'WalletsController::emailUserAboutIssue/$1/$2');

    });
    $routes->group('Web-Design', function($routes) {
        $routes->get('/', 'WebDesignController::index');
    });
});

$routes->group('Search', ['namespace' => 'App\Modules\APIs\Controllers'], function($routes) {
    $routes->get('/', 'SearchController::index');
});

// Advisors
$routes->group('Advisors', ['namespace' => 'App\Modules\User\Controllers', 'filter' => 'login'], function($routes) {
    $routes->match(['GET', 'POST'], '/', 'AdvisorController::index');
});

// Alerts:
$routes->group('Alerts', ['namespace' => 'App\Modules\User\Controllers', 'filter' => 'login'], function($routes) {
    $routes->match(['GET', 'POST'], '/', 'AlertsController::index');
});

// Auctions:
$routes->group('Auctions', static function($routes) {
    $routes->get('/', 'AuctionsController::index');
    $routes->get('Item/(:num)', 'AuctionsController::item/$1');
    $routes->post('Create', 'AuctionsController::create');
    $routes->post('Bid/(:num)', 'AuctionsController::bid/$1');
    $routes->get('Poll/(:num)', 'AuctionsController::poll/$1');
});

// Budget:
// $routes->get('Budget', 'BudgetController::index', ['namespace' => 'App\Modules\User\Controllers', 'filter' => 'login']);
$routes->group('Budget', ['namespace' => 'App\Modules\User\Controllers', 'filter' => 'login'], function($routes) {
    $routes->get('/', 'BudgetController::index');
    $routes->get('Search/(:any)', 'BudgetController::index');
    // --- Budget: "This Month" views ---
    // --- Budget: "This Month" views ---
    $routes->get('This-Month', 'BudgetController::thisMonth');
    $routes->get('This-Month/(:segment)', 'BudgetController::thisMonth/$1');
    $routes->get('Last-Month', 'BudgetController::lastMonth');
    $routes->get('Last-Month/(:segment)', 'BudgetController::lastMonth/$1');
    $routes->get('Next-Month', 'BudgetController::nextMonth');
    $routes->get('Next-Month/(:segment)', 'BudgetController::nextMonth/$1');
    $routes->post('Account-Manager', 'BudgetController::accountManager');
    $routes->match(['GET', 'POST'], 'Account-Manager', 'BudgetController::accountManager');
    $routes->match(['GET', 'POST'], 'Add', 'BudgetController::add');
    $routes->match(['GET', 'POST'], 'Add/(:segment)', 'BudgetController::add/$1');
    $routes->match(['GET', 'POST'], 'Approve-Recurring-Schedule/(:num)', 'BudgetController::approveRecurringSchedule/$1');

    // $routes->post('Approve-Recurring-Schedule/(:num)', 'BudgetController::approveRecurringSchedule/$1');
    $routes->match(['GET', 'POST'], 'Cancel-Account/(:segment)', 'BudgetController::cancelAccount/$1');
    $routes->match(['GET', 'POST'], 'Copy', 'BudgetController::edit');
    $routes->match(['GET', 'POST'], 'Copy/(:segment)', 'BudgetController::edit/$1');
    $routes->match(['GET', 'POST'], 'Delete-Account', 'BudgetController::deleteAccount');
    $routes->match(['GET', 'POST'], 'Delete-Account/(:segment)', 'BudgetController::deleteAccount/$1');
    $routes->match(['GET', 'POST'], 'Details', 'BudgetController::details');
    $routes->match(['GET', 'POST'], 'Details/(:segment)', 'BudgetController::details/$1');
    $routes->match(['GET', 'POST'], 'Edit', 'BudgetController::edit');
    $routes->match(['GET', 'POST'], 'Edit/(:segment)', 'BudgetController::edit/$1');
    $routes->match(['GET', 'POST'], 'Edit/(:segment)/(:segment)', 'BudgetController::edit/$1/$2');
    $routes->match(['GET', 'POST'], 'Expenses', 'BudgetController::accountOverview');
    $routes->match(['GET', 'POST'], 'Financial-Analysis', 'BudgetController::financialAnalysis');
    $routes->match(['GET', 'POST'], 'Financial-Forecaster', 'BudgetController::financialForecaster');
    // --- Budget: Forecast views ---
    $routes->get('Forecast', 'BudgetController::forecast');                   // /Budget/Forecast  (defaults to 1y)
    $routes->get('Forecast/(:segment)', 'BudgetController::forecast/$1');     // /Budget/Forecast/{1y|5y|10y|15y|30y|<months>}
    $routes->match(['GET', 'POST'], 'History', 'BudgetController::history');
    $routes->match(['GET', 'POST'], 'History/(:segment)', 'BudgetController::history');
    $routes->match(['GET', 'POST'], 'Income', 'BudgetController::accountOverview');
    $routes->match(['GET', 'POST'], 'Recurring-Account/Schedule', 'BudgetController::recurringSchedule/$1');
    $routes->match(['GET', 'POST'], 'Recurring-Account/Schedule/(:segment)', 'BudgetController::recurringSchedule/$1');
    $routes->match(['GET', 'POST'], 'Recurring-Account/Edit/(:segment)', 'BudgetController::edit/$1');
    $routes->match(['GET', 'POST'], 'Settings/(:segment)', 'BudgetController::settings/$1');
    $routes->match(['GET', 'POST'], 'Status/Paid/(:segment)', 'BudgetController::paid/$1');
    $routes->match(['GET', 'POST'], 'Status/Unpaid/(:segment)', 'BudgetController::unpaid/$1');

    $routes->get('getUserBudgetRecords', 'BudgetController::getUserBudgetRecords');
    $routes->get('getUserCreditBalances', 'BudgetController::getUserCreditBalances');
    $routes->get('getUserAvailableBalances', 'BudgetController::getUserAvailableBalances');
    $routes->get('getUserRepaymentSummary', 'BudgetController::getUserRepaymentSummary');
    // Add other necessary route definitions here
});

// MyMI Exchanges 
$routes->group('Exchange', ['namespace' => 'App\Modules\Exchange\Controllers', 'filter' => 'login'], function($routes) {
    $routes->get('', 'ExchangeController::index', ['as' => 'mymi-exchange']);
    $routes->group('DigiByte', function($routes) { 
        $routes->post('fetchFrontendData', 'DigiByteController::fetchFrontendData', ['filter' => 'csrf']);
        $routes->post('provisionDefaultWallet', 'DigiByteController::provisionDefaultWallet', ['filter' => 'csrf']);
        $routes->post('disconnectWallet', 'DigiByteController::disconnectWallet', ['filter' => 'csrf']);
        $routes->post('refreshWallet', 'DigiByteController::refreshWallet', ['filter' => 'csrf']);
        $routes->post('getAssets', 'DigiByteController::getAssets', ['filter' => 'csrf']);
        $routes->post('createWallet', 'DigiByteController::createWallet', ['filter' => 'csrf']);
        $routes->post('connectWallet', 'DigiByteController::connectWallet', ['filter' => 'csrf']);
    });
    $routes->group('MetaMask', function($routes) {
        $routes->get('', 'MetaMaskController::index', ['as' => 'mymi-metamask']);
        $routes->post('connectWallet', 'MetaMaskController::connectWallet');
        $routes->post('disconnectWallet', 'MetaMaskController::disconnectWallet');
        $routes->post('refreshWallet', 'MetaMaskController::refreshWallet');
        $routes->post('getAssets', 'MetaMaskController::getAssets');
        $routes->post('generateWallet', 'MetaMaskController::generateWallet');
        $routes->post('signTransaction', 'MetaMaskController::signTransaction');
        $routes->post('verifySignature', 'MetaMaskController::verifySignature');
        $routes->post('sendAsset', 'MetaMaskController::sendAsset');
        $routes->post('getTransactionStatus', 'MetaMaskController::getTransactionStatus');
        $routes->post('getBalance', 'MetaMaskController::getBalance');
        $routes->post('validateAddress', 'MetaMaskController::validateAddress');
        $routes->post('getCurrentBlock', 'MetaMaskController::getCurrentBlock');
        $routes->post('estimateTransactionFee', 'MetaMaskController::estimateTransactionFee');
        $routes->post('getNetworkStatus', 'MetaMaskController::getNetworkStatus');
        $routes->post('deployContract', 'MetaMaskController::deployContract');
        $routes->post('callContractFunction', 'MetaMaskController::callContractFunction');        
    });
    $routes->group('Solana', function($routes) {
        $routes->get('', 'SolanaController::index', ['as' => 'mymi-solana']);
        $routes->get('Test-Page', 'SolanaController::testPage', ['as' => 'mymi-solana-test-page']);
        $routes->get('Assets', 'SolanaController::assets', ['as' => 'mymi-solana-assets']);
        $routes->get('Create', 'SolanaController::create', ['as' => 'mymi-solana-create']);
        $routes->get('Wallet/Disconnect/(:segment)', 'SolanaController::disconnectWallet/$1', ['as' => 'mymi-solana-create']);
        $routes->get('Import', 'SolanaController::import', ['as' => 'mymi-solana-import']);
        $routes->get('Swap', 'SolanaController::coinSwap', ['as' => 'mymi-solana-coin-swap']);
        $routes->get('Create/Wallet', 'SolanaController::create', ['as' => 'mymi-solana-create-wallet']);
        $routes->post('Create/Wallet', 'SolanaController::create');
        $routes->post('createSolanaWallet', 'SolanaController::createSolanaWallet');
        $routes->post('fetchFrontendData', 'SolanaController::fetchFrontendData', ['filter' => 'csrf']);
        $routes->post('provisionDefaultWallet', 'SolanaController::provisionDefaultWallet', ['filter' => 'csrf']);
        $routes->get('Import/Wallet', 'SolanaController::importWallet', ['as' => 'mymi-solana-import-wallet']);
        $routes->post('Import/Wallet', 'SolanaController::importWallet');
        $routes->post('updatePrices', 'SolanaController::updateSolanaPrices');
        $routes->post('updateTokens', 'SolanaController::updateSolanaTokens');
        $routes->get('Wallet/Verify-Ownership', 'SolanaController::verifyWalletOwnership', ['as' => 'mymi-solana-verify-wallet']);
        $routes->post('Wallet/Verify-Ownership', 'SolanaController::verifyWalletOwnership');
        $routes->get('Wallet/Execute-Swap', 'SolanaController::executeSwap', ['as' => 'mymi-solana-execute-swap']);
        $routes->post('Wallet/Execute-Swap', 'SolanaController::executeSwap');
        $routes->get('Wallet/ViewAssets', 'SolanaController::viewAssets', ['as' => 'mymi-solana-view-assets']);
        $routes->post('Wallet/ViewAssets', 'SolanaController::viewAssets');
        $routes->post('Wallet/Connect', 'SolanaController::connectWallet', ['as' => 'mymi-solana-connect-wallet']);
        $routes->post('Wallet/Disconnect', 'SolanaController::disconnectWallet', ['as' => 'mymi-solana-disconnect-wallet']);
        $routes->post('Wallet/Refresh', 'SolanaController::refreshWallet', ['as' => 'mymi-solana-refresh-wallet']);
    });
    $routes->group('Wallet', function($routes) {
        // Wallet Integration Links Here:
        $routes->post('Connect/MetaMask', 'SolanaController::connectWallet', ['as' => 'connect-wallet-metamask']);
        $routes->post('Disconnect/MetaMask', 'SolanaController::disconnectWallet', ['as' => 'disconnect-wallet-metamask']);
        $routes->post('Refresh/MetaMask', 'SolanaController::refreshWallet', ['as' => 'refresh-wallet-metamask']);

        $routes->post('Connect/Solflare', 'SolanaController::connectWallet', ['as' => 'connect-wallet-solflare']);
        $routes->post('Disconnect/Solflare', 'SolanaController::disconnectWallet', ['as' => 'disconnect-wallet-solflare']);
        $routes->post('Refresh/Solflare', 'SolanaController::refreshWallet', ['as' => 'refresh-wallet-solflare']);

        $routes->post('Connect/Phantom', 'SolanaController::connectWallet', ['as' => 'connect-wallet-phantom']);
        $routes->post('Disconnect/Phantom', 'SolanaController::disconnectWallet', ['as' => 'disconnect-wallet-phantom']);
        $routes->post('Refresh/Phantom', 'SolanaController::refreshWallet', ['as' => 'refresh-wallet-phantom']);

        $routes->post('Connect/TrustWallet', 'SolanaController::connectWallet', ['as' => 'connect-wallet-trustwallet']);
        $routes->post('Disconnect/TrustWallet', 'SolanaController::disconnectWallet', ['as' => 'disconnect-wallet-trustwallet']);
        $routes->post('Refresh/TrustWallet', 'SolanaController::refreshWallet', ['as' => 'refresh-wallet-trustwallet']);
    });

});

// Institutes
$routes->group('Institutes', ['namespace' => 'App\Modules\User\Controllers', 'filter' => 'login'], function($routes) {
    $routes->match(['GET', 'POST'], '/', 'InstitutesController::index');
});

// Alternative links to Investment Dashboard
$routes->match(['GET', 'POST'], 'My-Investments', 'App\Modules\User\Controllers\InvestmentsController::index', ['filter' => 'login']);
$routes->match(['GET', 'POST'], 'My-Trades', 'App\Modules\User\Controllers\InvestmentsController::index', ['filter' => 'login']);

// Investments:
$routes->group('Investments', ['namespace' => 'App\Modules\User\Controllers', 'filter' => 'login'], function($routes) {
    $routes->match(['GET', 'POST'], '/', 'InvestmentsController::index');
    $routes->post('Account-Manager', 'InvestmentsController::accountManager'); // Account Manager to handle adding, editing, deleting Investments Records to/from Database
    $routes->match(['GET', 'POST'], 'Add', 'InvestmentsController::add'); // Add New Investment Records to Database
    $routes->match(['GET', 'POST'], 'Add/(:segment)', 'InvestmentsController::add'); // Add New Investment Records to Database
    $routes->match(['GET', 'POST'], 'Autosave', 'InvestmentsController::autoSave');
    $routes->match(['GET', 'POST'], 'Overview', 'InvestmentsController::overview');
    $routes->match(['GET', 'POST'], 'Retirement', 'InvestmentsController::retirement');
    $routes->match(['GET', 'POST'], 'Save', 'InvestmentsController::save'); // Save Investment Record Data to Database
    $routes->match(['GET', 'POST'], 'Services', 'InvestmentsController::services');
    $routes->match(['GET', 'POST'], 'Test', 'InvestmentsController::test');
    $routes->match(['GET', 'POST'], 'Watchlist', 'InvestmentsController::watchlist');

    $routes->get('Strategies', 'InvestmentController::getStrategies'); 
    $routes->post('Strategies', 'InvestmentController::createStrategy'); 
    $routes->get('Strategies/(:num)', 'InvestmentController::getStrategy/$1'); 
    $routes->put('Strategies/(:num)', 'InvestmentController::updateStrategy/$1'); 
    $routes->delete('Strategies/(:num)', 'InvestmentController::deleteGoal/$1'); 

    $routes->get('Goals', 'InvestmentController::getGoals'); 
    $routes->post('Goals', 'InvestmentController::createGoal'); 
    $routes->get('Goals/(:num)', 'InvestmentController::createGoal/$1'); 
    $routes->put('Goals/(:num)', 'InvestmentController::updateGoal/$1'); 
    $routes->put('Goals/(:num)', 'InvestmentController::deleteGoal/$1'); 

    // Routes for the new methods related to various overviews and data
    $routes->get('Crypto-Overview', 'InvestmentsController::cryptoOverview');
    $routes->get('Economic-Data', 'InvestmentsController::economicData');
    $routes->get('Market-News', 'InvestmentsController::marketNews');
    $routes->get('MyMI-News', 'InvestmentsController::MyMINews');
    $routes->get('MyMI-Research', 'InvestmentsController::MyMIResearch');
    $routes->get('Stock-Overview', 'InvestmentsController::stockOverview');
    // Add other necessary route definitions here
});

// Predictions (User)
$routes->group('Predictions', ['namespace' => 'App\Modules\Predictions\Controllers'], static function($routes) {
    $routes->get('/', 'PredictionsController::index');
    $routes->get('Markets', 'PredictionsController::markets');
    $routes->get('Market/(:num)', 'PredictionsController::view/$1');
    $routes->get('Portfolio', 'PredictionsController::portfolio');
    $routes->get('Settlements', 'PredictionsController::settlements');
    $routes->post('PlaceOrder', 'PredictionsController::placeOrder');     // POST
    $routes->post('CancelOrder', 'PredictionsController::cancelOrder');   // POST
});

// Projects
$routes->group('Projects', ['namespace' => 'App\Modules\User\Controllers', 'filter' => 'login'], function($routes) {
    $routes->match(['GET', 'POST'], '/', 'ProjectsController::index');
    $routes->match(['GET', 'POST'], 'Add', 'ProjectsController::add');
    $routes->match(['GET', 'POST'], 'Holdings', 'ProjectsController::holdings');
    $routes->match(['GET', 'POST'], 'View/(:segment)', 'ProjectsController::viewProject/$1');
    $routes->match(['GET', 'POST'], 'Commit/(:segment)', 'ProjectsController::commit/$1');
    $routes->match(['GET', 'POST'], 'Submit/Commit/(:segment)', 'ProjectsController::submitCommit/$1');
    $routes->match(['GET', 'POST'], 'Invest/(:segment)', 'ProjectsController::invest/$1');
    $routes->match(['GET', 'POST'], 'Submit/Invest/(:segment)', 'ProjectsController::submitInvest/$1');
    $routes->match(['GET', 'POST'], 'Sell/(:segment)', 'ProjectsController::sell/$1');
    $routes->match(['GET', 'POST'], 'Submit/Sell/(:segment)', 'ProjectsController::submitSell/$1');
    $routes->match(['GET', 'POST'], 'Discuss/(:segment)', 'ProjectsController::discuss/$1');
    $routes->match(['GET', 'POST'], 'Submit/Discuss/(:segment)', 'ProjectsController::submitDiscuss/$1');
    $routes->post('AddComment', 'ProjectsController::addComment');
}); 

// Blog:
$routes->group('Announcements', ['namespace' => 'App\Modules\Blog\Controllers'], function($routes) {
    $routes->get('/', 'AnnouncementsController::index');
    // Define other routes for 'blog' module
});

// Script Studio Module
$routes->group('ScriptStudio', ['namespace' => 'ScriptStudioModule\\Controllers'], function($routes) {
    $routes->get('/', 'ScriptStudioController::index');
    $routes->get('Marketplace', 'ScriptStudioController::marketplace');
    $routes->get('Create', 'ScriptStudioController::create');
    $routes->post('Store', 'ScriptStudioController::store');
    $routes->get('Edit/(:num)', 'ScriptStudioController::edit/$1');
    $routes->post('Update/(:num)', 'ScriptStudioController::update/$1');
    $routes->get('Preview/(:num)', 'ScriptStudioController::preview/$1');
    $routes->get('Export/(:num)/(:segment)', 'ScriptStudioController::export/$1/$2');
});

// Customer Support:
$routes->group('Support', ['namespace' => 'App\Modules\Support\Controllers'], function($routes) {
    $routes->get('/', 'SupportController::index');
    $routes->get('FAQ', 'SupportController::faq');
    $routes->get('Article/(:segment)', 'SupportController::article/$1');
    $routes->post('Feedback', 'SupportController::feedback');
    $routes->get('Test', 'SupportController::test');
    $routes->get('Test-Email', 'SupportController::sendTestEmail');
    // Define other routes for 'blog' module
});

// How It Works:
$routes->group('How-It-Works', ['namespace' => 'App\Modules\Blog\Controllers'], function($routes) {
    $routes->get('/', 'HowItWorksController::index');
    $routes->get('Determining-Your-Financial-Goals', 'HowItWorksController::DetermineYourFinancialGoals');
    $routes->get('Daily-Financial-News', 'HowItWorksController::DailyFinancialNews'); 
    $routes->get('Investment-Portfolio-Management', 'HowItWorksController::InvestmentPortfolioManagement'); 
    $routes->get('Personal-Budgeting', 'HowItWorksController::PersonalBudgeting'); 
    $routes->get('Registering-An-Account', 'HowItWorksController::RegisteringAnAccount'); 
    // MyMI Gold - How It Works
    $routes->get('MyMI-Gold', 'HowItWorksController::MyMIGold');
    $routes->get('Purchase-MyMI-Gold', 'HowItWorksController::PurchaseMyMIGold');
    // Define other routes for 'blog' module
});

// User - Referrals
// $routes->match(['GET', 'POST'], 'My-Referrals', 'App\Modules\User\Controllers\ReferralController::index', ['filter' => 'login']);

$routes->group('My-Referrals', ['namespace' => 'App\Modules\User\Controllers', 'filter' => 'login'], function($routes) {
    $routes->match(['GET', 'POST'], '/', 'ReferralController::index');
});
$routes->group('Referrals', ['namespace' => 'App\Modules\User\Controllers', 'filter' => 'login'], function($routes) {
    $routes->match(['GET', 'POST'], '/', 'ReferralController::index');
    $routes->match(['GET', 'POST'], 'Create', 'ReferralController::create');
    $routes->match(['GET', 'POST'], 'sendReferralEmail', 'ReferralController::sendReferralEmail'); 
});

// User - Wallets
$routes->group('Wallets', ['namespace' => 'App\Modules\User\Controllers', 'filter' => 'login'], function($routes) {
    $routes->get('/', 'WalletsController::index', ['as' => 'wallets.index']);
    $routes->match(['GET', 'POST'], 'Account-Manager', 'WalletsController::accountManager', ['as' => 'wallets.account-manager']);
    $routes->match(['GET', 'POST'], 'Add', 'WalletsController::add', ['as' => 'wallets.add']);
    $routes->match(['GET', 'POST'], 'Add/(:segment)', 'WalletsController::add/$1', ['as' => 'wallets.add.segment']);
    $routes->match(['GET', 'POST'], 'Add/(:segment)/(:segment)', 'WalletsController::addFetch/$1/$2', ['as' => 'wallets.add.segment.segment']);
    $routes->match(['GET', 'POST'], 'Add/Bank-Account', 'WalletsController::createBankeAccount', ['as' => 'wallets.add.bank-account']);
    $routes->match(['GET', 'POST'], 'Attach-Account', 'WalletsController::attachAccount', ['as' => 'wallets.attach-account']);
    $routes->match(['GET', 'POST'], 'Attach-Account/(:segment)/(:segment)/(:segment)', 'WalletsController::attachAccount/$1/$2/$3', ['as' => 'wallets.attach-account.segment.segment.segment']);
    $routes->match(['GET', 'POST'], 'Banking', 'WalletsController::banking', ['as' => 'wallets.banking']);
    $routes->match(['GET', 'POST'], 'Banking/Add/Account/(:segment)', 'WalletsController::add', ['as' => 'wallets.banking.add.account.segment']);
    $routes->match(['GET', 'POST'], 'Banking/(:segment)', 'WalletsController::addAccount', ['as' => 'wallets.banking.segment']);
    $routes->match(['GET', 'POST'], 'Banking/Details/(:segment)', 'WalletsController::details/$1', ['as' => 'wallets.banking.details.segment']);
    $routes->match(['GET', 'POST'], 'Banking/Edit/Account/(:segment)', 'WalletsController::edit/$1', ['as' => 'wallets.banking.edit.account.segment']);
    $routes->match(['GET', 'POST'], 'Checking', 'WalletsController::index', ['as' => 'wallets.checking']);
    $routes->match(['GET', 'POST'], 'Create', 'WalletsController::generateWallet', ['as' => 'wallets.create']); // Previously /Wallets/Address-Generator
    $routes->match(['GET', 'POST'], 'Credit', 'WalletsController::index', ['as' => 'wallets.credit']);
    $routes->match(['GET', 'POST'], 'Credit/Details/(:segment)', 'WalletsController::details/$1');
    $routes->match(['GET', 'POST'], 'Credit/Edit/Account/(:segment)', 'WalletsController::edit/$1');
    $routes->match(['GET', 'POST'], 'Coin-Swap', 'WalletsController::coinSwap', ['as' => 'wallets.coin-swap']);
    $routes->match(['GET', 'POST'], 'Coin-Swap/(:segment)', 'WalletsController::coinSwap/$1', ['as' => 'wallets.coin-swap.segment']);
    $routes->match(['GET', 'POST'], 'Complete/Purchase', 'WalletsController::completePurchase', ['as' => 'wallets.complete.purchase']);
    $routes->match(['GET', 'POST'], 'Confirm-Deposit', 'WalletsController::confirmDeposit', ['as' => 'wallets.confirm.deposit']);
    $routes->match(['GET', 'POST'], 'Debt', 'WalletsController::index', ['as' => 'wallets.debt']);
    $routes->match(['GET', 'POST'], 'Debt/Details/(:segment)', 'WalletsController::details/$1', ['as' => 'wallets.debt.details.segment']);
    $routes->match(['GET', 'POST'], 'Debt/Edit/Account/(:segment)', 'WalletsController::edit/$1', ['as' => 'wallets.debt.edit.account.segment']);
    $routes->match(['GET', 'POST'], 'Delete/(:segment)/(:segment)', 'WalletsController::delete/$1/$2');
    $routes->match(['GET', 'POST'], 'Deposit', 'WalletsController::deposit', ['as' => 'wallets.deposit']);
    $routes->match(['GET', 'POST'], 'Deposit/Fetch', 'WalletsController::addDepositFetch', ['as' => 'wallets.deposit.fetch']);
    $routes->match(['GET', 'POST'], 'Deposit/Complete', 'WalletsController::depositComplete', ['as' => 'wallets.deposit.complete']);
    $routes->match(['GET', 'POST'], 'Deposit/Complete/(:segment)', 'WalletsController::depositComplete/$1', ['as' => 'wallets.deposit.complete.segment']);
    $routes->match(['GET', 'POST'], 'Deposit/(:segment)', 'WalletsController::deposit/$1', ['as' => 'wallets.deposit.segment']);
    $routes->match(['GET', 'POST'], 'Deposit/Funds', 'WalletsController::deposit', ['as' => 'wallets.deposit.funds']);
    $routes->match(['GET', 'POST'], 'Details', 'WalletsController::details', ['as' => 'wallets.details']);
    $routes->match(['GET', 'POST'], 'Edit', 'WalletsController::edit', ['as' => 'wallets.edit']);
    $routes->match(['GET', 'POST'], 'Edit/(:segment)', 'WalletsController::edit/$1', ['as' => 'wallets.edit.segment']); // Previously /Wallets/Address-Generator
    $routes->match(['GET', 'POST'], 'Edit/(:segment)/(:segment)', 'WalletsController::edit/$1/$2', ['as' => 'wallets.edit.segment.segment']); // Previously /Wallets/Address-Generator
    $routes->match(['GET', 'POST'], 'Feature-Manager', 'WalletsController::featureManager', ['as' => 'wallets.feature-manager']);
    $routes->match(['GET', 'POST'], 'Generate-Wallet', 'WalletsController::generateWallet', ['as' => 'wallets.generate-wallet']);
    $routes->match(['GET', 'POST'], 'Investments', 'WalletsController::index', ['as' => 'wallets.investments']);
    $routes->match(['GET', 'POST'], 'Investment/Details/(:segment)', 'WalletsController::details/$1', ['as' => 'wallets.investment.details']);
    $routes->match(['GET', 'POST'], 'Investment/Edit/Account/(:segment)', 'WalletsController::edit/$1', ['as' => 'wallets.investment.edit']);
    $routes->match(['GET', 'POST'], 'Link-Account', 'WalletsController::linkAccount', ['as' => 'wallets.link-account']);
    $routes->match(['GET', 'POST'], 'Link-Account/(:segment)', 'WalletsController::linkAccount/$1', ['as' => 'wallets.link-account.segment']);
    $routes->match(['GET', 'POST'], 'Link-Account/(:segment)/(:segment)', 'WalletsController::linkAccount/$1', ['as' => 'wallets.link-account.segment.segment']);
    $routes->match(['GET', 'POST'], 'Link-Account/Success', 'WalletsController::linkAccountSuccess', ['as' => 'wallets.link-account.success']);
    $routes->match(['GET', 'POST'], 'Link-Account/Success/(:segment)', 'WalletsController::linkAccountSuccess/$1', ['as' => 'wallets.link-account.success.segment']);
    $routes->match(['GET', 'POST'], 'Manager', 'WalletsController::walletManager', ['as' => 'wallets.manager']);
    $routes->match(['GET', 'POST'], 'Wallets/MyMIGPayPalCallback', 'WalletsController::handleMyMIGPayPalCallback');
    $routes->match(['GET', 'POST'], 'Purchase', 'WalletsController::purchase');
    $routes->match(['GET', 'POST'], 'Purchase-Manager', 'WalletsController::purchaseManager');
    $routes->match(['GET', 'POST'], 'Purchase/(:segment)', 'WalletsController::purchase');
    $routes->match(['GET', 'POST'], 'Purchase/Memberships/Customize', 'WalletsController::customizeMembership');
    $routes->match(['GET', 'POST'], 'Purchase/Memberships/Success', 'WalletsController::purchaseMembershipSuccess');
    $routes->match(['GET', 'POST'], 'Purchase/Memberships/Success', 'WalletsController::purchaseMembershipSuccess');
    $routes->match(['GET', 'POST'], 'Purchase/Memberships/(:segment)', 'WalletsController::purchase');
    $routes->match(['GET', 'POST'], 'Purchase/Memberships/(:segment)/(:segment)', 'WalletsController::purchase');
    // $routes->match(['GET', 'POST'], 'Purchase/MyMI-Gold', 'WalletsController::purchaseGold');
    $routes->match(['GET', 'POST'], 'Purchase/(:segment)/Complete', 'WalletsController::purchaseComplete');
    $routes->match(['GET', 'POST'], 'Purchase/Complete/(:segment)', 'WalletsController::purchaseComplete/$1');
    $routes->match(['GET', 'POST'], 'Purchase/Complete/(:segment)/(:segment)', 'WalletsController::purchaseComplete/$1/$2');
    $routes->match(['GET', 'POST'], 'Purchase/MyMI-Gold', 'WalletsController::purchaseMyMIGold');
    // $routes->match(['GET', 'POST'], 'Purchase/Complete/MyMI-Gold', 'WalletsController::purchaseMyMIGold');
    // $routes->match(['GET', 'POST'], 'Purchase/Complete/MyMI-Gold/(:segment)', 'WalletsController::purchaseMyMIGold');
    // $routes->match(['GET', 'POST'], 'Purchase/MyMI-Gold/Complete/(:segment)', 'WalletsController::purchaseComplete/$1');
    $routes->match(['GET', 'POST'], 'Purchase/MyMIGold/Security/(:segment)', 'WalletsController::securityViolation');
    $routes->match(['GET', 'POST'], 'Transfer-Funds', 'WalletsController::transferFunds', ['as' => 'wallets.transfer-funds']);
    $routes->match(['GET', 'POST'], 'Wallet-Generator', 'WalletsController::walletGenerator', ['as' => 'wallets.generator']);
    $routes->match(['GET', 'POST'], 'Wallet-Selection', 'WalletsController::walletSelections', ['as' => 'wallets.selection']);
    $routes->match(['GET', 'POST'], 'Wallet-Transactions', 'WalletsController::walletTransaction', ['as' => 'wallets.transactions']);
    $routes->match(['GET', 'POST'], 'Wallet-Transaction/(:segment)', 'WalletsController::walletTransaction/$1', ['as' => 'wallets.transactions.segment']);
    $routes->match(['GET', 'POST'], 'Withdraw', 'WalletsController::withdraw', ['as' => 'wallets.withdraw']); // Previously /Wallets/Withdraw-Funds
    $routes->match(['GET', 'POST'], 'Withdraw/(:segment)', 'WalletsController::withdraw/$1', ['as' => 'wallets.withdraw.segment']); // Previously /Wallets/Withdraw-Funds
    $routes->match(['GET', 'POST'], 'Withdraw/Fetch', 'WalletsController::addWithdrawFetch', ['as' => 'wallets.withdraw.fetch']);
    // Add other necessary route definitions here
});

// // Management - Admin:
// $routes->group('Management', ['namespace' => 'App\Modules\Management\Controllers'], function($routes) {
//     $routes->get('/', 'ManagementController::index');
//     // $routes->get('How-Tos', 'ManagementController::howTos'); 
//     // Define other routes for 'blog' module
// });

// // Management - Marketing:
// $routes->group('Marketing', ['namespace' => 'App\Modules\Management\Controllers'], function($routes) {
//     $routes->get('/', 'MarketingController::index');
//     // Define other routes for 'blog' module
// });

// Features:
$routes->group('Features', ['namespace' => 'App\Modules\Advertise\Controllers'], function($routes) {
    $routes->get('/', 'Features::index');
    $routes->get('Brokerage-Integrations', 'Features::BrokerageIntegrations');
    $routes->get('MyMI-Gold', 'HowItWorks::MyMIGold');
    // Define other routes for 'blog' module
});

// How It Works:
$routes->group('How-It-Works', ['namespace' => 'App\Modules\Blog\Controllers'], function($routes) {
    $routes->get('/', 'HowItWorks::index');
    $routes->get('Determining-Your-Financial-Goals', 'HowItWorksController::DetermineYourFinancialGoals');
    $routes->get('Personal-Budgeting', 'HowItWorksController::PersonalBudgeting'); 
    $routes->get('Registering-An-Account', 'HowItWorksController::RegisteringAnAccount'); 
    // MyMI Gold - How It Works
    $routes->get('MyMI-Gold', 'HowItWorksController::MyMIGold');
    $routes->get('Purchase/MyMIGold', 'HowItWorksController::PurchaseMyMIGold');
    // Define other routes for 'blog' module
});

// KnowlegeBase:
$routes->group('Knowledgebase', ['namespace' => 'App\Modules\User\Controllers'], function($routes) {
    $routes->get('/', 'KnowledgebaseController::index');
    $routes->get('Account-And-Billing', 'KnowledgebaseController::accountBilling');
    $routes->get('Assets', 'KnowledgebaseController::assets');
    // $routes->get('Getting-Started', 'KnowledgebaseController::gettingStarted');
    $routes->get('Integrating-Wallets', 'KnowledgebaseController::integratingWallets');
    $routes->get('Investor-Profile', 'KnowledgebaseController::investorProfile');
    $routes->get('KYC-Verification', 'KnowledgebaseController::KYCVerification');
    $routes->get('MyMI-Partnerships', 'KnowledgebaseController::partnerships');
    $routes->get('Promoted-Articles', 'KnowledgebaseController::promotedArticles');
    $routes->get('Technical-Support', 'KnowledgebaseController::technicalSupport');
    $routes->get('Trade-Tracker', 'KnowledgebaseController::tradeTracker');
    $routes->get('Tutorials', 'KnowledgebaseController::tutorials');
    $routes->get('Types-Of-Accounts', 'KnowledgebaseController::typesOfAccounts');
    // Define other routes for 'blog' module
});

// News And Updates:
$routes->group('Blog/News-And-Updates', ['namespace' => 'App\Modules\Blog\Controllers'], function($routes) {
    $routes->get('/', 'NewsAndUpdates::index');
    $routes->get('Integrating-With-Plaid', 'NewsAndUpdates::IntegratingWithPlaid');
    $routes->get('The-Roadmap-To-The-Future-Of-Finance', 'NewsAndUpdates::TheRoadmapToTheFutureOfFinance');
    // Define other routes for 'blog' module
});

// User - Subscribe
$routes->group('Subscribe', ['namespace' => 'App\Modules\Blog\Controllers'], function($routes) {
    $routes->get('/', 'SubscribeController::index');
    $routes->get('/Daily-Financial-News', 'SubscribeController::index');
    $routes->get('Submit', 'SubscribeController::submit');
    // Define other routes for 'blog' module
});

// // User - Getting Started
// $routes->group('Getting-Started', ['namespace' => 'App\Modules\Blog\Controllers'], function($routes) {
//     $routes->get('/', 'SubscribeController::index');
//     // Define other routes for 'blog' module
// });

$routes->post('debug', function () {
    return "Debugging route works!";
});

// 🔁 DEV-ONLY ERROR TEST ROUTES
if (ENVIRONMENT !== 'production') {
    $routes->get('test-403', function () {
        throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound('Forbidden access.');
    });

    $routes->get('test-404', function () {
        throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound('Page not found.');
    });

    $routes->get('test-500', function () {
        throw new \RuntimeException('Intentional 500 error for testing.');
    });

    $routes->get('test-504', function () {
        http_response_code(504);
        include APPPATH . 'Views/errors/html/error_504.php';
        exit;
    });
}
// // Alerts API Group - Handles Trade Alerts, Social Media, and Voiceovers
// $routes->group('API/Alerts', ['namespace' => 'App\Modules\APIs\Controllers'], function ($routes) {
//     $routes->match(['GET', 'POST'], 'addTradeAlert', 'AlertsController::addTradeAlert');
//     $routes->match(['GET', 'POST'], 'getFilteredAlerts', 'AlertsController::getFilteredAlerts');
//     $routes->match(['GET', 'POST'], 'fetchEmailAlerts', 'AlertsController::fetchEmailAlerts');
//     $routes->match(['GET', 'POST'], 'forceFetchEmails', 'AlertsController::forceFetchEmails');
//     $routes->match(['GET', 'POST'], 'forceFetchTickers', 'AlertsController::forceFetchTickers');
//     $routes->match(['GET', 'POST'], 'manageTradeAlert', 'AlertsController::manageTradeAlert');
//     $routes->match(['GET', 'POST'], 'markAlertAsSentAndSendEmail/(:segment)', 'AlertsController::markAlertAsSentAndSendEmail/$1');
//     $routes->match(['GET', 'POST'], 'updateTradeAlerts', 'AlertsController::updateTradeAlerts');
//     $routes->match(['GET', 'POST'], 'processAlerts', 'AlertsController::processAlerts');
//     $routes->match(['GET', 'POST'], 'processTradeAlerts', 'AlertsController::processTradeAlerts');
//     $routes->match(['GET', 'POST'], 'sendAlert', 'AlertsController::sendAlert');
//     $routes->match(['GET', 'POST'], 'sendDiscordAlerts', 'AlertsController::sendDiscordAlerts');
//     $routes->match(['GET', 'POST'], 'sendDiscordAlertsBySymbol/(:segment)', 'AlertsController::sendDiscordAlertsBySymbol/$1');
//     $routes->match(['GET', 'POST'], 'storeMarketingContent', 'AlertsController::storeMarketingContent');
//     $routes->match(['GET', 'POST'], 'updateChartOverride', 'AlertsController::updateChartOverride');
//     $routes->match(['GET', 'POST'], 'updateExchange', 'AlertsController::updateExchange');
    
//     // Trade Alert Creation & Management
//     $routes->match(['GET', 'POST'], 'submitTradeAlert', 'AlertsController::submitTradeAlert');
//     $routes->match(['GET', 'POST'], 'getTradeAlertDetails', 'AlertsController::getTradeAlertDetails');

//     // Voiceover and Marketing Content
//     $routes->match(['GET', 'POST'], 'generateVoiceoverScript', 'AlertsController::generateVoiceoverScript');
//     $routes->match(['GET', 'POST'], 'generateVoiceoverAndMarketingContent', 'AlertsController::generateVoiceoverAndMarketingContent');
//     $routes->match(['GET', 'POST'], 'generateAndStoreVoiceover', 'AlertsController::generateAndStoreVoiceover');
    
//     // Social Media & Marketing
//     $routes->match(['GET', 'POST'], 'generateSocialMediaPosts', 'AlertsController::generateSocialMediaPosts');
//     $routes->match(['GET', 'POST'], 'postMarketingContentToSocials', 'AlertsController::postMarketingContentToSocials');
// });

// Alerts API Group - Handles Trade Alerts, Social Media, and Voiceovers
// $routes->group('API/Management', ['namespace' => 'App\Modules\APIs\Controllers'], function ($routes) {
//     $routes->match(['GET', 'POST'], 'ajaxGetActiveUsers', 'ManagementController::ajaxGetActiveUsers');
//     $routes->match(['GET', 'POST'], 'ajaxGetInactiveUsers', 'ManagementController::ajaxGetInactiveUsers');
//     $routes->match(['GET', 'POST'], 'checkForSpamUsers', 'ManagementController::checkForSpamUsers');
//     $routes->match(['GET', 'POST'], 'Marketing/cronAnalyzeContent', 'ManagementController::cronAnalyzeContent');
//     $routes->match(['GET', 'POST'], 'Marketing/cronFetchAndGenerateNews', 'ManagementController::cronFetchAndGenerateNews');
//     $routes->match(['GET', 'POST'], 'Marketing/cronFetchMarketingEmails', 'ManagementController::cronFetchMarketingEmails');
//     $routes->match(['GET', 'POST'], 'Marketing/cronFetchInbox', 'ManagementController::cronFetchInbox');
//     $routes->match(['GET', 'POST'], 'generateTodaysStory', 'ManagementController::generateTodaysStory');
//     $routes->match(['GET', 'POST'], 'Marketing/generateContent', 'ManagementController::cronFetchAndGenerateNews');
//     $routes->match(['GET', 'POST'], 'Marketing/generateContentFromScraper', 'ManagementController::generateContentFromScraper');
//     $routes->match(['GET', 'POST'], 'Marketing/generateContentDigestFromStored', 'ManagementController::generateContentDigestFromStored');
//     $routes->match(['GET', 'POST'], 'Marketing/generateDailyContentDigest', 'ManagementController::generateDailyContentDigest');
//     $routes->match(['GET', 'POST'], 'Marketing/massResendActivationEmails', 'ManagementController::massResendActivationEmails');
//     $routes->match(['CLI', 'GET', 'POST'], 'Run-CRON-Tasks', 'ManagementController::runCRONTasks');
//     $routes->get('fetchEmailsToTempScraper', 'ManagementController::fetchEmailsToTempScraper');
//     $routes->get('getUsers', 'ManagementController::getUsers');
//     $routes->get('getReferrals', 'ManagementController::getReferrals');
//     $routes->get('getAlerts', 'ManagementController::getAlerts');
//     $routes->get('getNews', 'ManagementController::getNews');
//     $routes->get('getAssets', 'ManagementController::getAssets');
//     $routes->get('getSupport', 'ManagementController::getSupport');
//     $routes->get('processTempEmailsToScraper', 'ManagementController::processTempEmailsToScraper');
    
//     $routes->get('distributeTodaysNewsContent', 'ManagementController::distributeTodaysNewsContent');
//     $routes->get('exportPostJson/(:num)', 'ManagementController::exportPostJson/$1');
//     $routes->get('fetchNewsEmails', 'ManagementController::fetchNewsEmails');
//     $routes->get('generatePostsFromSummary/(:num)', 'ManagementController::generatePostsFromSummary/$1');
//     $routes->get('generateVoiceScriptManually', 'ManagementController::generateVoiceScriptManually');
//     $routes->get('processAllTradeAlerts', 'ManagementController::processAllTradeAlerts');
//     $routes->get('runCronManually', 'ManagementController::runCronManually');
//     $routes->get('runDailyAlphaVantageDataPipeline', 'ManagementController::runDailyAlphaVantageDataPipeline');
//     $routes->get('sendToZapierManually', 'ManagementController::sendToZapierManually');
//     $routes->get('scrapeAndGenerateTodaysStoryFromInbox', 'ManagementController::scrapeAndGenerateTodaysStoryFromInbox');
//     $routes->get('sharePost/(:num)/(:segment)', 'ManagementController::sharePost/$1/$2');
//     $routes->get('sendAllDiscordAlerts', 'ManagementController::sendAllDiscordAlerts');
//     $routes->get('updateMarketDataForAlerts', 'ManagementController::updateMarketDataForAlerts');
// });

// Alerts API Group - Handles Trade Alerts, Social Media, and Voiceovers
// $routes->group('API/Users', ['namespace' => 'App\Modules\APIs\Controllers'], function ($routes) {
//     $routes->match(['GET', 'POST'], 'Comments/Add', 'UserController::addComment');
// });


// // Management - Admins:
// $routes->group('Management/Admin', ['namespace' => 'App\Modules\Management\Controllers'], function($routes) {
//     $routes->get('/', 'AdminController::index');
//     // Define other routes for 'blog' module
// });

// // Management - API:
// $routes->group('Management/API', ['namespace' => 'App\Modules\Management\Controllers'], function($routes) {
//     $routes->get('/', 'APIController::index');
//     // Define other routes for 'blog' module
// });

// // Management - Assets:
// $routes->group('Management/Assets', ['namespace' => 'App\Modules\Management\Controllers'], function($routes) {
//     $routes->get('/', 'AssetsController::index');
//     // Define other routes for 'blog' module
// });

// // Management - Budgets:
// $routes->group('Management/Budgets', ['namespace' => 'App\Modules\Management\Controllers'], function($routes) {
//     $routes->get('/', 'BudgetsController::index');
//     // Define other routes for 'blog' module
// });

// // Management - Budgeting:
// $routes->group('Management/Budgeting', ['namespace' => 'App\Modules\Management\Controllers'], function($routes) {
//     $routes->get('/', 'BudgetingController::index');
//     // Define other routes for 'blog' module
// });

// // Management - Exchange:
// $routes->group('Management/Exchange', ['namespace' => 'App\Modules\Management\Controllers'], function($routes) {
//     $routes->get('/', 'ExchangeController::index');
//     // Define other routes for 'blog' module
// });

// // Management - Exchange:
// $routes->group('Management/How-Tos', ['namespace' => 'App\Modules\Management\Controllers'], function($routes) {
//     $routes->get('/', 'HowTosController::index');
//     $routes->get('Employees/Account-Setup', 'HowTosController::employeeAccountSetup');
//     $routes->get('Employees/Email-Setup', 'HowTosController::employeeEmailSetup');
//     // Define other routes for 'blog' module
// });

// // Management - Alert Management:
// $routes->group('Management/Alerts', ['namespace' => 'App\Modules\Management\Controllers'], function($routes) {
//     $routes->get('/', 'AlertsController::index');
//     $routes->get('Add/(:segment)', 'AlertsController::add');
//     $routes->get('addTradeAlert', 'AlertsController::addTradeAlert');
//     $routes->get('fetchData', 'AlertsController::fetchData');
//     $routes->get('Fetch/Ticker/(:segment)', 'AlertsController::fetchTickerDetails/$1');
//     $routes->get('Import/Tickers', 'AlertsController::importTickers');
//     $routes->get('Tasks/fetchAlerts', 'Management\AlertsController::fetchData');
//     $routes->get('Test', 'AlertsController::testEmail');
//     $routes->get('Test-Email', 'AlertsController::sendTestEmail');
//     $routes->get('Trades', 'AlertsController::trades');
//     // Define other routes for 'blog' module
// });

// // Management - Marketing:
// $routes->group('Management/Marketing', ['namespace' => 'App\Modules\Management\Controllers'], function($routes) {
//     $routes->get('/', 'MarketingController::index');
//     $routes->match(['GET', 'POST'], 'Add/(:segment)', 'MarketingController::add/$1');
//     // $routes->get('Add/(:segment)', 'MarketingController::addSchedule');
//     $routes->match(['POST'], 'Add-Subscriber', 'MarketingController::addSubscriber');
//     $routes->get('Approve-Content/(:num)', 'MarketingController::approveContent/$1');
//     $routes->get('Blog-Creator', 'MarketingController::blogCreator');
//     $routes->get('Blogs', 'MarketingController::blogs');
//     $routes->get('Campaigns', 'MarketingController::campaigns');
//     $routes->get('Content-Review', 'MarketingController::contentReview');
//     $routes->get('Content/Generator', 'MarketingController::contentGenerator');
//     $routes->get('Content/Listing', 'MarketingController::contentListing');
//     $routes->get('Daily-Log', 'MarketingController::viewDailyLogs');
//     $routes->get('Edit-Content/(:num)', 'MarketingController::editContent/$1');
//     $routes->get('Email/(:any)/(:any)', 'MarketingController::viewEmail/$1/$2');
//     $routes->get('fetchEmails', 'MarketingController::fetchEmails'); 
//     $routes->post('fetchMissingLogos', 'MarketingController::fetchMissingLogos'); 
//     $routes->get('Financial-News', 'MarketingController::financialNews'); 
//     $routes->post('generateAutomatedContent', 'MarketingController::generateAutomatedContent');
//     $routes->get('generateContent', 'MarketingController::generateContent');
//     $routes->get('generateDailyContentDigest', 'MarketingController::generateDailyContentDigest');
//     $routes->get('generateNewsletter', 'MarketingController::generateNewsletterContent');
//     $routes->get('getRecentScrapes', 'MarketingController::getRecentScrapes'); 
//     $routes->get('Ideas', 'MarketingController::ideas');
//     $routes->get('Post-Creator', 'MarketingController::postCreator');    
//     $routes->get('previewGeneratedPost/(:num)', 'MarketingController::previewGeneratedPost/$1');
//     $routes->get('Promote', 'MarketingController::promote'); 
//     $routes->get('Promote/(:segment)', 'MarketingController::promote'); 
//     $routes->post('PublishBlog/(:num)', 'Management\MarketingController::publishBlog/$1');
//     $routes->get('RunContentGeneration', 'Management\MarketingController::runContentGeneration');
//     $routes->get('Quick-Scraper', 'MarketingController::standaloneScrape'); 
//     $routes->get('Reject-Content/(:num)', 'MarketingController::rejectContent/$1');
//     $routes->post('Save-Content-Edit/(:num)', 'MarketingController::saveContentEdit/$1');
//     $routes->get('Schedule', 'MarketingController::schedule'); 
//     $routes->get('Schedule/(:segment)', 'MarketingController::schedule/$1'); 
//     $routes->get('scheduleNewsletters', 'MarketingController::scheduleNewsletterCampaign'); 
//     $routes->get('submitDailyLog', 'MarketingController::submitDailyLog'); 
//     $routes->get('Large-Content/Form', 'MarketingController::submitLargeContentForm'); 
//     $routes->post('submitLargeContent', 'MarketingController::submitLargeContent'); 
//     $routes->post('Scrape-Link', 'MarketingController::scrapeLink'); // Ensure this is a POST route
//     $routes->get('sendNotification', 'MarketingController::sendNotification');
//     $routes->get('sendNewsletter', 'MarketingController::sendScheduleNewsletter'); 
//     $routes->get('Test', 'MarketingController::test'); 
//     $routes->get('Twitter', 'MarketingController::twitterDashboard'); 
//     $routes->get('Video-Creator', 'MarketingController::videoCreator');
//     $routes->match(['GET', 'POST'], 'MyMI-Gold/Tasks/Add', 'WalletsController::addUserGoldTasks');
//     // Define other routes for 'blog' module
//     // $routes->get('Management/Marketing/Email-Templates', 'EmailTemplateController::index');
//     $routes->get('Email-Templates/create', 'EmailTemplateController::create');
//     $routes->post('/Email-Templates/store', 'EmailTemplateController::store');

//     $routes->get('Email-Queue', 'EmailQueueController::index');
//     $routes->get('Email-Queue/create', 'EmailQueueController::create');
//     $routes->post('Email-Queue/store', 'EmailQueueController::store');
//     $routes->post('Email-Queue/processQueue', 'EmailQueueController::processQueue');

// });

// // Management - Marketing:
// $routes->group('Management/Marketing/Exchanges', ['namespace' => 'App\Modules\Management\Controllers'], function($routes) {
//     $routes->get('/', 'MarketingController::index');
//     $routes->match(['GET', 'POST'], 'Edit/(:segment)', 'MarketingController::edit/$1');
//     $routes->get('Top-Communities', 'MarketingController::topCommunities');
//     $routes->get('Top-Communities/(:segment)', 'MarketingController::topCommunities/$1');
//     // $routes->match(['GET', 'POST'], 'MyMI-Gold/Tasks/Add', 'WalletsController::addUserGoldTasks');
//     // Define other routes for 'blog' module
// });

// // Management - Partners:
// $routes->group('Management/Partners', ['namespace' => 'App\Modules\Management\Controllers'], function($routes) {
//     $routes->get('/', 'PartnersController::index');
//     // Define other routes for 'blog' module
// });

// // Management - Projects:
// $routes->group('Management/Projects', ['namespace' => 'App\Modules\Management\Controllers'], function($routes) {
//     $routes->get('/', 'ProjectsController::index');
//     $routes->post('Approve/(:segment)', 'ProjectsController::approveProject/$1'); 
//     $routes->post('Edit/(:segment)', 'ProjectsController::approveProject/$1'); 
//     $routes->post('Reject/(:segment)', 'ProjectsController::rejectProject/$1'); 
//     // Define other routes for 'blog' module
// });

// // Management - Referrals:
// $routes->group('Management/Referrals', ['namespace' => 'App\Modules\Management\Controllers'], function($routes) {
//     $routes->get('/', 'ReferralsController::index');
//     // Define other routes for 'blog' module
// });

// // Management - Services:
// $routes->group('Management/Services', ['namespace' => 'App\Modules\Management\Controllers'], function($routes) {
//     $routes->get('/', 'ServicesController::index');
//     // Define other routes for 'blog' module
// });

// // Management - Security:
// $routes->group('Management/Security', ['namespace' => 'App\Modules\Management\Controllers'], function($routes) {
//     $routes->get('/', 'SecurityController::index');
//     // Define other routes for 'blog' module
// });

// // Management - Support:
// $routes->group('Management/Support', ['namespace' => 'App\Modules\Management\Controllers'], function($routes) {
//     $routes->get('/', 'SupportController::index');
//     // Define other routes for 'blog' module
// });

// // Management - Users:
// $routes->group('Management/Users', ['namespace' => 'App\Modules\Management\Controllers'], function($routes) {
//     $routes->get('/', 'UsersController::index');
//     $routes->get('Profile/(:segment)', 'UsersController::profile');
//     $routes->match(['GET', 'POST'], 'ajaxBlockUser/(:segment)', 'UsersController::ajaxBlockUser');
//     $routes->match(['GET', 'POST'], 'ajaxBulkBanUsers', 'UsersController::ajaxBulkBanUsers');
//     // Define other routes for 'blog' module
// });

// // Management - Wallets:
// $routes->group('Management/Wallets', ['namespace' => 'App\Modules\Management\Controllers'], function($routes) {
//     $routes->get('/', 'WalletsController::index');
//     // Define other routes for 'blog' module
// });

// // Management - Web Design:
// $routes->group('Management/Web-Design', ['namespace' => 'App\Modules\Management\Controllers'], function($routes) {
//     $routes->get('/', 'WebDesignController::index');
//     // Define other routes for 'blog' module
// });


// // Blog:
// $routes->group('Blog', ['namespace' => 'App\Modules\Blog\Controllers'], function($routes) {
//     $routes->get('/', 'BlogController::index'); // Landing Page
//     $routes->get('Post/(:segment)', 'BlogController::viewBlog/$1'); // Dynamic Blog Post View
//     // Define other routes for 'blog' module
// });

// // Blog - Investing:
// $routes->group('Blog/Earnings', ['namespace' => 'App\Modules\Blog\Controllers'], function($routes) {
//     $routes->get('/', 'EarningsController::index');
//     $routes->get('Test', 'EarningsController::test');
//     $routes->get('(:segment)', 'EarningsController::viewByDate'); // Catch any dynamic date
//     $routes->get('(:segment)', 'EarningsController::viewByDate'); // Catch any dynamic date
// });


// // Blog - Investing:
// $routes->group('Blog/Investing', ['namespace' => 'App\Modules\Blog\Controllers'], function($routes) {
//     $routes->get('/', 'InvestingController::index');
//     $routes->get('The-Beginners-Guide-To-Option-Trading', 'InvestingController::TheBeginnersGuideToOptionTrading');
//     $routes->get('The-Fundamentals-Of-Investing', 'InvestingController::TheFundamentalsOfInvesting');
//     $routes->get('Tips-For-Effective-Investment-Portfolio-Management', 'InvestingController::TipsForEffectiveInvestmentPortfolioManagement');
//     // Define other routes for 'blog' module
// });

// // Blog - IRS News And Updates:
// $routes->group('Blog/IRS', ['namespace' => 'App\Modules\Blog\Controllers'], function($routes) {
//     $routes->get('/', 'InvestingController::index');
//     $routes->get('IRS-Expanded-Home-Energy-Tax-Credits', 'IRSController::IRSExpandedHomeEnergyTaxCredits');
//     // Define other routes for 'blog' module
// });

// // Blog -  News And Updates:
// $routes->group('Blog/News-And-Updates', ['namespace' => 'App\Modules\Blog\Controllers'], function($routes) {
//     $routes->get('/', 'UpdatesController::index');
//     $routes->get('Integrating-With-Plaid', 'UpdatesController::IntegratingWithPlaid');
//     $routes->get('The-Roadmap-To-The-Future-Of-Finance', 'UpdatesController::TheRoadmapToTheFutureOfFinance');
//     // Define other routes for 'blog' module
// });

// // Blog - Personal Budgeting:
// $routes->group('Blog/Personal-Budgeting', ['namespace' => 'App\Modules\Blog\Controllers'], function($routes) {
//     $routes->get('/', 'PersonalBudgetingController::index');
//     $routes->get('The-Importance-of-Personal-Financial-Budgeting', 'PersonalBudgetingController::TheImportanceOfPersonalFinancialBudgeting');
//     // Define other routes for 'blog' module
// });
// APIs - Bitcoin (PSBT + broadcast)
$routes->group('API/Bitcoin', static function($routes) {
    $routes->post('buildUnsignedPsbt', 'App\Modules\APIs\Controllers\BitcoinController::buildUnsignedPsbt');
    $routes->post('broadcastSignedTx', 'App\Modules\APIs\Controllers\BitcoinController::broadcastSignedTx');
});

if (file_exists(APPPATH . "Modules/Management/Config/Routes.php")) {
    require APPPATH . "Modules/Management/Config/Routes.php";
}
?>