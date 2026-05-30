<?php
declare(strict_types=1);

// app/Config/Routes.php
use App\Modules\Advisor\Controllers\AdvisorController;
use CodeIgniter\Router\RouteCollection;
use Config\Services; // ← add this line

/**
 * @var RouteCollection $routes
 */
$routes = Services::routes();
helper('ai');
$routes->get('index.php', 'Home::index');
$routes->get('index.php/', 'Home::index');
$routes->head('/', 'Home::index');
$routes->head('index.php', 'Home::index');
$routes->head('index.php/', 'Home::index');
// Preserve legacy index.php auth POST submits without downgrading to GET redirects.
$routes->get('index.php/login', 'AuthController::login');
$routes->post('index.php/login', 'AuthController::attemptLogin');
$routes->get('index.php/register', 'AuthController::register');
$routes->post('index.php/register', 'AuthController::attemptRegister');
// app/Config/Routes.php
// $routes->get('assets/(.*)', 'Assets::file/$1');
// $routes->get('favicon.ico', 'Assets::favicon');
// Optional, but helpful:
$routes->addRedirect('index.php/(:any)', '$1', 301);
$routes->addRedirect('index.php', '/', 301);
$routes->addRedirect('index.php/', '/', 301);
$routes->addRedirect('index.php/images/(:any)', 'images/$1', 301);
$routes->get('assets/(:any)', static function () {
    throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
});


// --- BEGIN: Default + explicit routes ---
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');   // change if you have a different landing controller
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override(function () {
    $request = service('request');
    $method = strtoupper((string) $request->getMethod());
    $path = '/' . ltrim((string) $request->getUri()->getPath(), '/');
    $query = (string) ($request->getUri()->getQuery() ?? '');
    $lowerPath = strtolower($path);
    $lowerQuery = strtolower($query);
    $trimmedPath = trim($lowerPath, '/');

    $isHealthProbe = $method === 'HEAD'
        && in_array($lowerPath, ['/', '/index.php', '/index.php/'], true);

    $isWpProbe = str_contains($lowerPath, 'wp-json')
        || str_contains($lowerPath, '/wp/')
        || str_starts_with($lowerPath, '/wp-')
        || str_starts_with($lowerPath, '/wp-content/')
        || str_contains($lowerQuery, 'rest_route=/wp/v2/');

    if ($isWpProbe) {
        return service('response')
            ->setStatusCode(410)
            ->setContentType('text/plain')
            ->setBody('Gone');
    }

    $method = strtoupper((string) $request->getMethod());
    $normalizedPath = '/' . trim($path, '/');
    if ($normalizedPath === '/') {
        $normalizedPath = '/';
    }

    $securityProbePatterns = [
        '/.git',
        '/wp-',
        '/wp/',
        '/wp-content/',
        '/adminfuns.php',
        '/sx_pms.php',
        '/wp-info.php',
        '/wp-test.php',
        '/like.php',
        '/we.php',
        '/wp.php',
        '/wp-indx.php',
        '/zoo.php',
        '.env',
        'composer.json',
        'composer.lock',
        'phpinfo.php',
        'server.js',
        'docker-compose',
        '.yaml',
        '.yml',
        '.ini',
        '.sql',
        '/vendor/',
        '/storage/',
        '/backup',
    ];

    $classification = 'app_route_missing';
    if ($method === 'HEAD' && in_array($normalizedPath, ['/', '/index.php'], true)) {
        $classification = 'health_probe';
    } else {
        foreach ($securityProbePatterns as $needle) {
            if (str_contains($lowerPath, $needle)) {
                $classification = 'security_probe';
                break;
            }
        }
    }

    if ($classification === 'app_route_missing') {
        $legacyMissingPaths = [
            '/docs/discord/where_to_share_what.md',
        ];
        if (in_array($lowerPath, $legacyMissingPaths, true)) {
            $classification = 'legacy_redirect_missing';
        }
    }

    $severity = match ($classification) {
        'health_probe' => 'debug',
        'security_probe' => 'notice',
        'legacy_redirect_missing' => 'warning',
        'app_route_missing' => 'error',
        default => 'notice',
    };

    $ip = method_exists($request, 'getIPAddress') ? $request->getIPAddress() : ($_SERVER['REMOTE_ADDR'] ?? null);
    $userAgent = method_exists($request, 'getUserAgent') ? (string) $request->getUserAgent() : ($_SERVER['HTTP_USER_AGENT'] ?? null);
    $referer = $_SERVER['HTTP_REFERER'] ?? '';

    log_message(
        $severity,
        '[404_ROUTE] method={method} path={path} ip={ip} ua={user_agent} classification={classification} referer={referer}',
        [
            'method' => $method,
            'path' => $path . ($query !== '' ? '?' . $query : ''),
            'ip' => $ip,
            'user_agent' => $userAgent,
            'classification' => $classification,
            'referer' => $referer,
        ]
    );

    if ($isHealthProbe) {
        return service('response')
            ->setStatusCode(204)
            ->setContentType('text/plain')
            ->setBody('');
    }

    if ($isWpProbe) {
        return service('response')
            ->setStatusCode(410)
            ->setContentType('text/plain')
            ->setBody('Gone');
    }

    if (preg_match('/\.(js|mjs)$/i', $path) === 1) {
        return service('response')
            ->setStatusCode(404)
            ->setContentType('application/javascript')
            ->setBody("/* 404 Not Found: {$path} */");
    }

    if (str_starts_with(strtolower(trim($path, '/')), 'api/')) {
        return service('response')
            ->setStatusCode(404)
            ->setJSON([
                'error' => 'not_found',
                'message' => 'Route not found.',
                'path' => $path,
            ]);
    }

    return view('errors/auto_route_fallback', [
        'url' => current_url(),
        'path' => $path,
    ]);
});

$routes->get('/', 'Home::index');
// Explicit home route. If you don't have Home::index, temporarily redirect to /login.
// $routes->get('/', function () {
//     return redirect()->to('/login');  // change to 'Home::index' once that exists
// });

// Simple health check that should return 200 without auth
$routes->get('healthz', 'System\HealthController::healthz', ['as' => 'healthz']);
if (ENVIRONMENT !== 'production') {
    $routes->get('test/crash', 'Test::crash');
}
if (ENVIRONMENT !== 'production') {
    $routes->get('debug/manual-exception', static function () {
        throw new \Exception('Manual test exception');
    });
}
$routes->get('ops/health', '\\App\\Controllers\\OpsHealthController::index');
$routes->get('Maintenance', 'MaintenanceController::index');

$routes->get('API/Ops/health-score', '\\App\\Controllers\\OpsHealthController::score');
$routes->get('API/Ops/filesystem-status', '\\App\\Controllers\\Api\\OpsFilesystemStatusController::index', ['filter' => 'permission:admin.access']);
$routes->get('API/docs', '\\App\\Controllers\\Api\\SwaggerDocsController::index', ['filter' => 'permission:admin.access']);
$routes->group('admin/ops', ['filter' => 'permission:admin.access'], static function ($routes) {
    $routes->get('health', '\\App\\Controllers\\OpsHealthController::index');
    $routes->post('health/run', '\\App\\Controllers\\OpsHealthController::run');
});


// CoinVault project coin vault routes. Keep explicit because auto-routing is disabled.
$routes->group('Admin/CoinVault', ['namespace' => 'App\Modules\CoinVault\Controllers', 'filter' => 'permission:admin.access'], static function ($routes) {
    $routes->get('/', 'CoinVaultController::index');
    $routes->get('Projects', 'CoinVaultController::projects');
    $routes->get('Project/(:num)', 'CoinVaultController::project/$1');
    $routes->get('Contributions', 'CoinVaultController::contributions');
    $routes->get('Payouts', 'CoinVaultController::payouts');
    $routes->get('Wallet/(:num)', 'CoinVaultController::wallet/$1');
});
$routes->group('API/CoinVault', ['namespace' => 'App\Modules\CoinVault\Controllers\Api'], static function ($routes) {
    $routes->post('contributionEvent', 'CoinVaultApiController::contributionEvent');
    $routes->post('approveContribution/(:num)', 'CoinVaultApiController::approveContribution/$1', ['filter' => 'permission:admin.access']);
    $routes->post('rejectContribution/(:num)', 'CoinVaultApiController::rejectContribution/$1', ['filter' => 'permission:admin.access']);
    $routes->post('requestPayout', 'CoinVaultApiController::requestPayout', ['filter' => 'login']);
    $routes->post('approvePayout/(:num)', 'CoinVaultApiController::approvePayout/$1', ['filter' => 'permission:admin.access']);
    $routes->post('rejectPayout/(:num)', 'CoinVaultApiController::rejectPayout/$1', ['filter' => 'permission:admin.access']);
});

// Docs index for AI orchestration
$routes->group('API/Docs', ['namespace' => 'App\Modules\APIs\Controllers'], static function($routes) {
    $routes->get('index', 'DocsController::index');
    $routes->get('view', 'DocsController::view');
});

// (Optional) temporarily enable auto-routing to confirm controller wiring
$routes->setAutoRoute(false);
// --- END: Default + explicit routes ---


$routes->addRedirect('Home', '/', 301);
$routes->addRedirect('News', 'Blog/News-And-Updates', 301);
$routes->get('Stock/(:segment)/(:segment)', 'StockController::show/$1/$2');
// SEO Blog Routes
$routes->get('blog', 'Blog::index');
$routes->get('blog/category/(:segment)', 'Blog::category/$1');
$routes->get('blog/(:segment)', 'Blog::post/$1');
// $routes->get('Dashboard', 'App\\Modules\\User\\Controllers\\BudgetController::index', ['filter' => 'login']);

// app/Config/Routes.php
$routes->get('/sw.js', 'ServiceWorker::index');
$routes->get('/Apex/Referral', 'Home::apexReferral');
$routes->get('/Apex/Referral/(:segment)', 'Home::apexReferral/$1');
$routes->get('/Corporate-Earnings', 'Home::corporateEarnings');
$routes->get('/Corporate-Earnings/(:segment)', 'Home::corporateEarnings/$1');
$routes->get('/Economic-Calendar', 'Home::economicCalendar');
$routes->get('/Economic-Calendar/(:segment)', 'Home::economicCalendarContent/$1');
// $routes->get('Exchange/(:segment)', 'Home::exchange/$1');
$routes->get('/Getting-Started/(:segment)/(:segment)', 'Home::gettingStarted');
$routes->get('/Getting-Started/(:segment)', 'Home::gettingStarted');
$routes->get('/Getting-Started', 'Home::gettingStarted');
$routes->get('/Memberships', 'Home::memberships');
$routes->get('/Memberships/(:segment)', 'Home::memberships');

$routes->get('Learn/(:segment)', 'App\Modules\Public\Controllers\PublicPagesController::show/$1');
// Public preview routes
$routes->group('', ['namespace' => 'App\Modules\User\Controllers'], static function ($routes) {
    // Symbol preview (canonical)
    $routes->get('Alerts/Preview/(:segment)', 'AlertsController::preview/$1');
    // Legacy alias
    $routes->get('Preview/Alert/(:segment)', 'AlertsController::preview/$1');
});
$routes->get('/Privacy-Policy', 'Home::privacyPolicy');
$routes->get('/Legal/Privacy-Policy', 'Home::privacyPolicy');
$routes->get('/Legal/Terms-And-Conditions', 'Home::terms');
$routes->get('/Customer-Support', 'App\Modules\Support\Controllers\SupportController::index');
$routes->get('/Investments/News', static fn() => redirect()->to(site_url('News'), 301));
$routes->get('/Profile', 'App\Modules\User\Controllers\DashboardController::profile', ['filter' => 'login']);
$routes->get('/Purchase/MyMIGold', static fn() => redirect()->to(site_url('Wallets/Purchase/MyMI-Gold'), 301));
$routes->post('auth/resend-activation', 'AuthController::resendActivationCode', ['as' => 'auth/resend-activation-legacy']);
$routes->get('/How-It-Works/Purchase/MyMIGold', static fn() => redirect()->to(site_url('How-It-Works/Purchase-MyMI-Gold'), 301));
$routes->get('/How-It-Works', '\\App\\Modules\\Blog\\Controllers\\HowItWorksController::index');
$routes->get('/How-It-Works/', static fn() => redirect()->to(site_url('How-It-Works'), 301));
$routes->get('/How-It-Works/(:segment)', '\\App\\Modules\\Blog\\Controllers\\HowItWorksController::show/$1');
$routes->get('/Support/Article', static fn() => redirect()->to(site_url('Support/Article/welcome'), 301));
$routes->get('/Wallets/Purchase/Memberships/Pro', static fn() => redirect()->to(site_url('Memberships/Pro'), 301));
$routes->get('/index.php/How-It-Works', static fn() => redirect()->to(site_url('How-It-Works'), 301));
$routes->get('/index.php/How-It-Works/(:segment)', static fn($slug) => redirect()->to(site_url('How-It-Works/' . $slug), 301));

$routes->get('Sector/(:segment)', 'Home::sector/$1');
$routes->get('/Terms-Of-Service', 'Home::termsOfService');
$routes->get('/resend-activation', 'AuthController::resendActivation', ['as' => 'resend-activation']);
$routes->post('/resend-activation', 'AuthController::resendActivationCode', ['as' => 'resend-activation-code']);

// Dev tools
$routes->get('Dev/BitcoinTest', 'App\Controllers\Dev\BitcoinTest::index');
$routes->get('Debug/whoami', 'Debug::whoami');
$routes->get('Debug/auth-audit-cache', 'Debug::authAuditCacheSelfTest');

$routes->group('debug', ['namespace' => 'App\Controllers\Debug'], static function ($routes) {
    $routes->get('common-data/smoke', 'CommonDataController::smoke');
});
$routes->get('debug/register-success-probe', 'AuthController::registerSuccessProbe');
$routes->get('API/Management/error-heatmap', 'SystemDebugController::errorHeatmap', ['filter' => 'permission:admin.access']);
$routes->get('Management/System-Debug', 'SystemDebugController::index', ['filter' => 'permission:admin.access']);

// App Health and Ops endpoints
$routes->group('', ['namespace' => 'App\Controllers'], static function($routes) {
    // Health
    $routes->get('health', 'Health::index', ['filter' => 'responsecache:60']);     // JSON {"status":"ok",...}
    $routes->get('status', 'Health::status', ['filter' => 'responsecache:60']);    // plain "OK"
    $routes->get('api/health', 'Api\\HealthController::index'); // convenient alias
    $routes->get('api/admin/chat-usage', 'Api\\AdminChatUsageController::index', ['filter' => 'permission:admin.access']);
    $routes->post('api/aiops/manual-run', 'Api\\AiOpsManualRunController::run', ['filter' => 'permission:admin.access']);
    $routes->get('ops/health', 'OpsHealthController::index');

    // Ops (protected by X-OPCACHE-RESET header)
    $routes->get('_ops/opcache-reset', 'Ops::opcacheReset');
});

// --- Auth Routes ---
// $routes->group('', ['namespace' => 'Myth\Auth\Controllers'], static function ($routes) {
$routes->group('', ['namespace' => 'App\Controllers', 'filter' => 'no-cache'], static function ($routes) {
    $routes->get('login', 'AuthController::login', ['as' => 'login']);
    $routes->post('login', 'AuthController::attemptLogin', ['as' => 'login-submit']);
    $routes->post('auth/resend-activation', 'AuthController::resendActivationCode', ['as' => 'auth/resend-activation']);
    $routes->get('logout', 'AuthController::logout');
    $routes->post('logout', 'AuthController::logout', ['as' => 'auth/logout']);

    $routes->get('register', 'AuthController::register', ['as' => 'register']);
    $routes->post('register', 'AuthController::attemptRegister', ['as' => 'register-submit']);
    $routes->get('register/success', 'AuthController::registerSuccess', ['as' => 'register-success']);
    $routes->post('register/resend-activation', 'AuthController::resendRegistrationActivation', ['as' => 'register-resend-activation']);
// });

    // Shield migration test routes (parallel to Myth/Auth routes).
    $routes->get('login-shield', '\\App\\Controllers\\ShieldAuth\\Login::index', ['as' => 'login-shield']);
    $routes->post('login-shield', '\\App\\Controllers\\ShieldAuth\\Login::attempt', ['as' => 'login-shield-submit']);
    $routes->get('register-shield', '\\App\\Controllers\\ShieldAuth\\Register::index', ['as' => 'register-shield']);
    $routes->post('register-shield', '\\App\\Controllers\\ShieldAuth\\Register::attempt', ['as' => 'register-shield-submit']);

// $routes->group('', ['namespace' => 'App\Controllers'], static function ($routes) {

    // TEMP: handle accidental /Login and redirect to lowercase
    $routes->get('Login', static function () {
        return redirect()->to(site_url('login'));
    });

    // Utility
    $routes->get('test-create-user', 'AuthController::createTempUser');

    // Existing integrations you already wired
    $routes->post('Auth/link-robinhood', 'AuthController::linkRobinhood');
    $routes->post('Auth/link-snaptrade', 'AuthController::linkSnapTrade');

    // Registration (including dynamic/referral patterns)
    // Placement comment: explicit Discord route declared before dynamic catch-all for intentional campaign resolution.
    $routes->get('register/(:segment)', 'AuthController::register/$1', ['as' => 'register-segment']);
    $routes->get('Discord/register', 'AuthController::register', ['as' => 'discord-register']);
    $routes->get('Discord/register/(:segment)', 'AuthController::register/$1', ['as' => 'discord-register-referral']);
    $routes->post('Discord/register', 'AuthController::attemptRegister', ['as' => 'discord-register-attempt']);
    $routes->post('Discord/register/(:segment)', 'AuthController::attemptRegister');

    // Generic dynamic register routes are disabled to keep canonical /register unambiguous.
    // Keep Discord and explicit register-segment routes for campaign/referral use-cases.
    // $routes->get('(:segment)/register', 'AuthController::register', ['as' => 'dynamic-register']);
    // $routes->get('(:segment)/register/(:segment)', 'AuthController::register/$2', ['as' => 'dynamic-register-referral']);
    // $routes->post('(:segment)/register', 'AuthController::attemptRegister');
    // $routes->post('(:segment)/register/(:segment)', 'AuthController::attemptRegister');

    // Activation
    $routes->get('activate', 'AuthController::activateAccount', ['as' => 'activate']);
    $routes->get('activate-account', 'AuthController::activateAccount', ['as' => 'activate-account-get']);
    $routes->post('activate-account', 'AuthController::activateAccount', ['as' => 'activate-account']);
    $routes->post('activate-account/(:segment)', 'AuthController::activateAccount', ['as' => 'activate-account-by-uri']);
    $routes->get('resend-activate-account', 'AuthController::resendActivateAccount', ['as' => 'resend-activate-account']);

    // Password Reset
    $routes->get('forgot-password', 'AuthController::forgotPassword', ['as' => 'forgot-password']);
    $routes->get('reset-password', 'AuthController::resetPassword', ['as' => 'reset-password']);
    $routes->post('forgot', 'AuthController::attemptForgot');
    $routes->post('reset-password', 'AuthController::attemptReset', ['as' => 'reset-password-attempt']);

    // 2FA
    $routes->post('get2FAQRCode', 'AuthController::get2FAQRCode', ['as' => 'get-2FA-QRCode']);
    $routes->post('verify2FACode', 'AuthController::verify2FACode', ['as' => 'verify-2FA-Code']);

    // --- HybridAuth secondary gateway ---
    $routes->get('auth/provider/(:segment)', 'AuthController::redirectToProvider/$1', ['as' => 'auth-provider']);
    $routes->get('auth/provider/(:segment)/callback', 'AuthController::handleProviderCallback/$1', ['as' => 'auth-provider-callback']);
    $routes->get('auth/link/(:segment)', 'AuthController::linkProvider/$1', ['as' => 'auth-link-provider']);
    $routes->get('auth/unlink/(:segment)', 'AuthController::unlinkProvider/$1', ['as' => 'auth-unlink-provider']);
});

// All Remaining Custom Routes
$routes->group('', ['namespace' => 'App\Modules\User\Controllers', 'filter' => ['login', 'noStore']], function($routes) {
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


$routes->group('Advisor', static function($routes) {
    $routes->get('/', 'AdvisorController::index');
    $routes->post('generateInsight', 'AdvisorController::generateAdvisorInsight');
    $routes->post('generateStoryboard', 'AdvisorController::generateNewsStoryboard');
    $routes->post('tradeAnalysis/(:num)', 'AdvisorController::generateTradeAnalysis');
});

$routes->group('API/v1', ['namespace' => 'App\Modules\APIs\Controllers', 'filter' => ['apiToken', 'ratelimit']],  function($routes) {
    $routes->match(['GET', 'POST'], 'Status', 'APIController::status');
    $routes->get('Health', 'HealthAPIController::index');
    $routes->get('Health/spark', 'HealthAPIController::spark');
    $routes->get('Ops/status', 'OpsAPIController::status');
});

// Backward-compatible legacy aliases (deprecated; migrate to /API/v1/*)
$routes->addRedirect('API/Status', 'API/v1/Status', 302);
$routes->addRedirect('API/Health', 'API/v1/Health', 302);

$routes->group('API', ['namespace' => 'App\Modules\APIs\Controllers'],  function($routes) {
    $routes->get('/', 'APIController::index');
    $routes->match(['GET', 'POST'], '/', 'APIController::index');
    $routes->group('mobile', static function($routes) {
        $routes->post('auth/login', 'MobileAuthController::login', ['filter' => 'ratelimit']);
        $routes->post('auth/register', 'MobileAuthController::register', ['filter' => 'ratelimit']);
        $routes->post('auth/logout', 'MobileAuthController::logout', ['filter' => 'apiToken']);
        $routes->get('me', 'MobileAuthController::me', ['filter' => 'apiToken']);

        $routes->group('', ['filter' => 'apiToken'], static function($routes) {
            $routes->get('dashboard', 'MobileController::dashboard');
            $routes->get('budget', 'MobileController::budget');
            $routes->get('investments', 'MobileController::investments');
            $routes->get('alerts', 'MobileController::alerts');
        });
    });
    $routes->post('Discord/interactions', 'DiscordAPIController::interactions');
    $routes->match(['GET', 'POST'], 'Status', 'APIController::status');
    $routes->get('Health', 'HealthAPIController::index');              // /API/Health
    $routes->get('Health/spark', 'HealthAPIController::spark');        // /API/Health/spark
    $routes->get('Ops/status', 'OpsAPIController::status');
    $routes->post('Ops/dispatch', 'OpsAPIController::dispatch');
    $routes->post('Ops/ingestReport', 'OpsAPIController::ingestReport');
    $routes->get('Ops/reports/latest', 'OpsAPIController::latestReport');
    $routes->get('Ops/ingest-metrics', 'OpsAPIController::ingestMetrics');
    $routes->get('Ops/OPcacheReset', 'OpsAPIController::opcacheReset'); // /API/Ops/OPcacheReset
    $routes->group('AiOps', static function($routes) {
        $routes->get('status', 'AiOpsAPIController::status');
        $routes->post('toggle', 'AiOpsAPIController::toggle');
        $routes->post('run', 'AiOpsAPIController::run');
        $routes->post('receiveResult', 'AiOpsAPIController::receiveResult');
    });
    $routes->group('AIOps', static function($routes) {
        $routes->get('health', 'AiOpsAPIController::health');
        $routes->post('policy/check', 'AiOpsAPIController::policyCheck');
        $routes->post('usage/log', 'AiOpsAPIController::logUsage');
        $routes->post('cache/store', 'AiOpsAPIController::cacheStore');
        $routes->get('cache/get', 'AiOpsAPIController::cacheGet');
        $routes->post('test/policy', 'AiOpsAPIController::testPolicy');
        $routes->post('toggle', 'AiOpsAPIController::toggle', ['filter' => 'permission:admin.access']);
    });
    $routes->post('Alerts/backfillEmailAlerts', 'AlertsAPIController::backfillEmailAlerts');
    $routes->get('cronFetchAndGenerateNews', 'ManagementAPIController::cronFetchAndGenerateNews');
    $routes->post('Management/backfillMarketingEmails', 'ManagementAPIController::backfillMarketingEmails');
    $routes->get('Management/debugLogs', 'ManagementAPIController::debugLogs', ['filter' => 'permission:admin.access']);
    $routes->group('Scanner', static function($routes) {
        $routes->get('status', 'ScannerController::status');
        $routes->post('run', 'ScannerController::run');
        $routes->get('results', 'ScannerController::results');
        $routes->get('results/(:segment)', 'ScannerController::symbol/$1');
        $routes->post('universe/sync', 'ScannerController::syncUniverse');
    });
    $routes->get('Management/getAutoloadHealth', 'ManagementAPIController::getAutoloadHealth', ['filter' => 'permission:admin.access']);
    $routes->get('Management/subsystems/status', 'ManagementAPIController::subsystemsStatus', ['filter' => 'permission:admin.access']);
    $routes->post('Management/subsystems/action', 'ManagementAPIController::subsystemsAction', ['filter' => 'permission:admin.access']);

    // Public Discord help/onboarding endpoints
    $routes->match(['GET', 'POST'], 'Status/(:segment)', 'APIController::status');
    $routes->match(['GET', 'POST'], 'Investments/getSymbolsByTradeType/(:segment)', 'APIController::getSymbolsByTradeType/$1');
    $routes->get('Investments/getForecastDetails/(:segment)', 'InvestmentsAPIController::getForecastDetails/$1');
    $routes->get('Investments/getConfidenceHeatmap', 'InvestmentsAPIController::getConfidenceHeatmap');
    $routes->get('Investments/getTopConfidenceBySector', 'InvestmentsAPIController::getTopConfidenceBySector');
    $routes->get('Investments/getConfidenceDistribution', 'InvestmentsAPIController::getConfidenceDistribution');
    $routes->get('Investments/getForecastAccuracySummary', 'InvestmentsAPIController::getForecastAccuracySummary');

    $routes->group('AI', function($routes) {
        $routes->post('Chat', 'AIAPIController::postChat');
        $routes->get('Notes', 'AIAPIController::listNotes');
        $routes->post('LinkSettings', 'AIAPIController::updateLinkSettings');
    });
    // Canonical Discord interactions + command registration endpoints.
    $routes->group('Discord', static function($routes) {
        $routes->get('commandsCatalog', 'DiscordAPIController::commandsCatalog');
        $routes->get('onboardingSteps', 'DiscordAPIController::onboardingSteps');
        $routes->get('sharingGuide', 'DiscordAPIController::sharingGuide');
        $routes->post('enqueue', 'DiscordAPIController::enqueue');
        $routes->post('broadcast', 'DiscordAPIController::broadcast');
        $routes->post('completeOnboardingStep', 'DiscordAPIController::completeOnboardingStep');
        $routes->get('health', 'DiscordAPIController::health');
        // $routes->post('interactions', 'DiscordAPIController::interactions');
        $routes->post('register-guild-commands', 'DiscordAPIController::registerGuildCommands');
        $routes->post('messageHook', 'DiscordAPIController::messageHook');
        $routes->get('lookup/ticker', 'DiscordAPIController::tickerLookup');
        $routes->get('lookup/crypto', 'DiscordAPIController::cryptoLookup');
        $routes->get('lookup/quote', 'DiscordAPIController::quoteLookup');
        $routes->post('webhook', 'DiscordAPIController::webhookProxy');
        $routes->post('createLinkToken', 'DiscordAPIController::createLinkToken');
        $routes->get('process-queue', 'DiscordAPIController::processQueue');
        $routes->get('coalesce-now', 'DiscordAPIController::coalesceNow');
        $routes->delete('purge-dead', 'DiscordAPIController::purgeDead');
        $routes->post('test', 'DiscordAPIController::test');
    });
    $routes->group('Mdit', ['filter' => 'authcheck'], static function($routes) {
        $routes->post('kyc/start', 'MditInvestorAPIController::startKyc');
        $routes->get('kyc/status', 'MditInvestorAPIController::kycStatus');
        $routes->post('accreditation/attest', 'MditInvestorAPIController::attestAccreditation');
        $routes->get('portfolio/summary', 'MditInvestorAPIController::portfolioSummary');

        $routes->post('deposits/initiate', 'MditDepositAPIController::initiate');
        $routes->post('deposits/confirm', 'MditDepositAPIController::confirm');
        $routes->post('issuance/mint', 'MditIssuanceAPIController::mint', ['filter' => 'permission:mdit.admin']);
        $routes->post('redemptions/request', 'MditRedemptionAPIController::requestRedemption');

        $routes->group('admin', ['filter' => 'permission:mdit.admin'], static function($routes) {
            $routes->get('redemptions/pending', 'MditAdminAPIController::pendingRedemptions');
            $routes->post('redemptions/approve', 'MditAdminAPIController::approveRedemption');
            $routes->get('deposits/pending', 'MditAdminAPIController::pendingDeposits');
            $routes->post('nav/compute_today', 'MditAdminAPIController::computeNavToday');
        });
    });
    $routes->post('Mdit/webhooks/onramp', 'MditWebhookController::onramp');
    $routes->get('Chat/me', 'ChatController::me');
    $routes->post('Chat/tool', 'ChatController::tool');

    $routes->group('Management', ['namespace' => 'App\Modules\APIs\Controllers', 'filter' => 'cronKey'], function($routes) {
        $routes->match(['GET', 'POST'], 'Run-CRON-Tasks', 'ManagementAPIController::Run_CRON_Tasks');
        $routes->cli('Run-CRON-Tasks', 'ManagementAPIController::runCRONTasks');
        $routes->match(['GET', 'POST'], 'ajaxGetActiveUsers', 'ManagementAPIController::ajaxGetActiveUsers');
        $routes->match(['GET', 'POST'], 'ajaxGetInactiveUsers', 'ManagementAPIController::ajaxGetInactiveUsers');
        $routes->get('banUnverifiedUsers', 'ManagementAPIController::banUnverifiedUsers');
        $routes->match(['GET', 'POST'], 'checkForSpamUsers', 'ManagementAPIController::checkForSpamUsers');
        $routes->get('distributeTodaysNewsContent', 'ManagementAPIController::distributeTodaysNewsContent');
        $routes->get('exportWeeklyWatchlistCSV', 'ManagementAPIController::exportWeeklyWatchlistCSV');
        $routes->get('exportPostJson/(:num)', 'ManagementAPIController::exportPostJson/$1');
        $routes->get('fetchAlphaVantageNewsForTradeAlerts', 'ManagementAPIController::fetchAlphaVantageNewsForTradeAlerts');
        $routes->get('fetchEmailsToTempScraper', 'ManagementAPIController::fetchEmailsToTempScraper');
        $routes->get('fetchLatestSummaries', 'ManagementAPIController::fetchLatestSummaries');
        $routes->get('fetchNewsEmails', 'ManagementAPIController::fetchNewsEmails');
        $routes->get('generatePostsFromSummary/(:num)', 'ManagementAPIController::generatePostsFromSummary/$1');
        $routes->get('generatePostsFromSummary', 'ManagementAPIController::generatePostsFromSummary');
        $routes->get('generateCoffeeAndStocksNewsletter', 'ManagementAPIController::generateCoffeeAndStocksNewsletter');
        $routes->get('fetchCoffeeAndStocksNewsletter', 'ManagementAPIController::fetchCoffeeAndStocksNewsletter');
        $routes->get('generateWeeklyStreamData', 'ManagementAPIController::generateWeeklyStreamData');
        $routes->post('saveCoffeeAndStocksNewsletter', 'ManagementAPIController::saveCoffeeAndStocksNewsletter');
        $routes->get('generateVoiceScriptManually', 'ManagementAPIController::generateVoiceScriptManually');
        $routes->get('runBackfillAlertsEmails', 'ManagementAPIController::runBackfillAlertsEmails');
        $routes->get('runBackfillMarketingEmails', 'ManagementAPIController::runBackfillMarketingEmails');
        $routes->get('getUsers', 'ManagementAPIController::getUsers');
        $routes->get('getAlerts', 'ManagementAPIController::getAlerts');
        $routes->get('getReferrals', 'ManagementAPIController::getReferrals');
        $routes->get('getAssets', 'ManagementAPIController::getAssets');
        $routes->get('getNews', 'ManagementAPIController::getNews');
        $routes->get('getSupport', 'ManagementAPIController::getSupport');
        $routes->get('processAllTradeAlerts', 'ManagementAPIController::processAllTradeAlerts');
        $routes->get('runCronManually', 'ManagementAPIController::runCronManually');
        $routes->get('runDailyAlphaVantageDataPipeline', 'ManagementAPIController::runDailyAlphaVantageDataPipeline');
        $routes->get('scrapeAndGenerateTodaysStoryFromInbox', 'ManagementAPIController::scrapeAndGenerateTodaysStoryFromInbox');
        $routes->get('sendAllDiscordAlerts', 'ManagementAPIController::sendAllDiscordAlerts');
        $routes->get('sendToZapierManually', 'ManagementAPIController::sendToZapierManually');
        $routes->match(['GET', 'POST'], 'generateTodaysStory', 'ManagementAPIController::generateTodaysStory');
        $routes->get('sharePost/(:num)/(:segment)', 'ManagementAPIController::sharePost/$1/$2');
        $routes->get('triggerPostAutogenOnEmpty', 'ManagementAPIController::triggerPostAutogenOnEmpty');
        $routes->get('updateMarketDataForAlerts', 'ManagementAPIController::updateMarketDataForAlerts');
        $routes->match(['GET', 'POST'], 'processQueuedEmails', 'ManagementAPIController::processQueuedEmails');
        $routes->match(['GET', 'POST'], 'processTempEmailsToScraper', 'ManagementAPIController::processTempEmailsToScraper');
        $routes->match(['GET', 'POST'], 'resendActivationEmailsBatch', 'ManagementAPIController::resendActivationEmailsBatch');
        $routes->match(['GET', 'POST'], 'resendActivationEmailsBatchQueued', 'ManagementAPIController::resendActivationEmailsBatchQueued');
        $routes->match(['GET', 'POST'], 'sendTestActivationEmail', 'ManagementAPIController::sendTestActivationEmail');
        $routes->match(['GET', 'POST'], 'saveSuggestion', 'ManagementAPIController::saveSuggestion');

        // Marketing-prefixed aliases kept for audit parity + backwards compatibility.
        $routes->match(['GET', 'POST'], 'Marketing/cronAnalyzeContent', 'ManagementAPIController::cronAnalyzeContent');
        $routes->match(['GET', 'POST'], 'Marketing/cronFetchAndGenerateNews', 'ManagementAPIController::cronFetchAndGenerateNews');
        $routes->match(['GET', 'POST'], 'Marketing/generateContent', 'ManagementAPIController::cronFetchAndGenerateNews');
        $routes->match(['GET', 'POST'], 'Marketing/cronFetchInbox', 'ManagementAPIController::cronFetchInbox');
        $routes->match(['GET', 'POST'], 'Marketing/cronFetchMarketingEmails', 'ManagementAPIController::cronFetchMarketingEmails');
        $routes->match(['GET', 'POST'], 'Marketing/generateContentDigestFromStored', 'ManagementAPIController::generateContentDigestFromStored');
        $routes->match(['GET', 'POST'], 'Marketing/generateContentFromScraper', 'ManagementAPIController::generateContentFromScraper');
        $routes->match(['GET', 'POST'], 'Marketing/generateDailyContentDigest', 'ManagementAPIController::generateDailyContentDigest');
        $routes->match(['GET', 'POST'], 'Marketing/massResendActivationEmails', 'ManagementAPIController::massResendActivationEmails');
        $routes->get('getSocialPlatforms', 'MarketingAPIController::getSocialPlatforms');
        $routes->get('getSocialCommunities', 'MarketingAPIController::getSocialCommunities');
        $routes->match(['GET', 'POST'], 'saveSocialCommunity', 'MarketingAPIController::saveSocialCommunity');
        $routes->get('getPostTemplates', 'MarketingAPIController::getPostTemplates');
        $routes->match(['GET', 'POST'], 'savePostTemplate', 'MarketingAPIController::savePostTemplate');
        $routes->get('generatePlatformPosts/(:num)', 'MarketingAPIController::generatePlatformPosts/$1');
        $routes->get('generatePlatformPosts', 'MarketingAPIController::generatePlatformPosts');
        $routes->get('generateDailyCommunityPosts', 'MarketingAPIController::generateDailyCommunityPosts');
        $routes->get('exportGeneratedPostJson/(:num)', 'MarketingAPIController::exportGeneratedPostJson/$1');
        $routes->get('generateRevenueDocs', 'MarketingAPIController::generateRevenueDocs');
        $routes->get('cronGenerateDailyCommunityPosts', 'MarketingAPIController::cronGenerateDailyCommunityPosts');
        $routes->get('cronQueueDistribution', 'MarketingAPIController::cronQueueDistribution');

        $routes->group('Advisor', static function($routes) {
            $routes->post('generateNow', [AdvisorController::class, 'generateNow']);
        });

        $routes->group('Projects', static function($routes) {
            $routes->post('fetchInbox', 'ProjectsController::fetchProjectEmails');
            $routes->post('parseInbox', 'ProjectsController::parseProjectEmails');
            $routes->post('promoteLead/(:num)', 'ProjectsController::promoteLead/$1');
            $routes->post('updateProject/(:num)', 'ProjectsController::updateProject/$1');
            $routes->post('openCommitments/(:num)', 'ProjectsController::openCommitments/$1');
            $routes->post('checkThreshold/(:num)', 'ProjectsController::checkThreshold/$1');
            $routes->post('launchPrivateAuction/(:num)', 'ProjectsController::launchPrivateAuction/$1');
            $routes->post('settlePrivateAuction/(:num)', 'ProjectsController::settlePrivateAuction/$1');
            $routes->post('markFunded/(:num)', 'ProjectsController::markFunded/$1');
            $routes->post('createQuarterlyDistribution/(:num)', 'ProjectsController::createQuarterlyDistribution/$1');
            $routes->post('runPayouts/(:num)', 'ProjectsController::runPayouts/$1');
            $routes->post('processMonthlyWithdrawals/(:num)', 'ProjectsController::processMonthlyWithdrawals/$1');
            $routes->post('TBI-Coins/Create-Defaults/(:num)', 'TbiProjectCoinsAPIController::createDefaults/$1', ['filter' => 'permission:admin.access']);
            $routes->get('TBI-Coins/(:num)', 'TbiProjectCoinsAPIController::getProjectCoins/$1');
            $routes->post('TBI-Coins/Record-Contribution', 'TbiProjectCoinsAPIController::recordContribution', ['filter' => 'login']);
            $routes->post('TBI-Coins/Approve-Contribution/(:num)', 'TbiProjectCoinsAPIController::approveContribution/$1', ['filter' => 'permission:admin.access']);
            $routes->post('TBI-Coins/Reject-Contribution/(:num)', 'TbiProjectCoinsAPIController::rejectContribution/$1', ['filter' => 'permission:admin.access']);
            $routes->post('TBI-Coins/Prepare-Solana-Mint/(:num)', 'TbiProjectCoinsAPIController::prepareSolanaMint/$1', ['filter' => 'permission:admin.access']);
            $routes->post('TBI-Coins/Prepare-Exchange-Asset/(:num)', 'TbiProjectCoinsAPIController::prepareExchangeAsset/$1', ['filter' => 'permission:admin.access']);
        });
        
    });

    $routes->group('Referrals', ['filter' => 'login'], static function($routes) {
        $routes->post('bulk-update-status', 'ReferralController::bulkUpdateStatus');
        $routes->post('bulk-delete', 'ReferralController::bulkDelete');
    });

    $routes->group('Squeeze', ['filter' => 'login'], static function($routes) {
        $routes->get('scorecard', 'SqueezeController::scorecard');
        $routes->get('zoomout', 'SqueezeController::zoomout');
        $routes->get('fade', 'SqueezeController::fade');
        $routes->post('run', 'SqueezeController::run');
    });

    $routes->group('Management/Chat', ['namespace' => 'App\\Modules\\Management\\Controllers', 'filter' => 'permission:admin.access'], static function($routes) {
        $routes->get('Usage', 'ChatUsageController::index');
        $routes->post('Settings', 'ChatUsageController::saveSettings');
        $routes->post('ResetUser', 'ChatUsageController::resetUser');
    });

    $routes->group('Management/Ops', ['namespace' => 'App\\Modules\\Management\\Controllers', 'filter' => 'permission:admin.access'], static function($routes) {
        $routes->get('/', 'OpsController::index');
        $routes->get('ajaxStatus', 'OpsController::ajaxStatus');
        $routes->post('ajaxDispatch', 'OpsController::ajaxDispatch');
    });

    // ------------------------
    // ✅ AlertsController
    // ------------------------
    $routes->group('Alerts', function($routes) {
        $routes->get('ingestCsvSignals', 'AlertsAPIController::ingestCsvSignals');
        $routes->get('signals', 'AlertsAPIController::getSignals');
        $routes->get('signalFiles', 'AlertsAPIController::getSignalFiles');
        $routes->get('previewSignalFile/(:num)', 'AlertsAPIController::previewSignalFile/$1');
        $routes->get('recalcSignalScores', 'AlertsAPIController::recalcSignalScores');
        $routes->match(['GET', 'POST'], 'addTradeAlert', 'AlertsAPIController::addTradeAlert');
        $routes->match(['GET', 'POST'], 'backfillCategories', 'AlertsAPIController::backfillCategories');
        $routes->match(['GET', 'POST'], 'createTradeAlert/(:segment)', 'AlertsAPIController::addTradeAlert');
        $routes->match(['GET', 'POST'], 'createTradeAlert', 'AlertsAPIController::addTradeAlert');
        $routes->match(['GET', 'POST'], 'getFilteredAlerts', 'AlertsAPIController::getFilteredAlerts');
        $routes->get('scanner', 'AlertsAPIController::scanner');
        $routes->match(['GET', 'POST'], 'fetchAutoGeneratedAnalysis', 'AlertsAPIController::fetchAutoGeneratedAnalysis');
        $routes->match(['GET', 'POST'], 'fetchEmailAlerts', 'AlertsAPIController::fetchEmailAlerts');
        // $routes->match(['GET', 'POST'], 'fetchMarketAuxNews/(:segment)', 'AlertsAPIController::fetchMarketAuxNews/$1');
        $routes->get('fetchMarketAuxNews/(:segment)', 'AlertsAPIController::fetchMarketAuxNews/$1');
        $routes->match(['GET', 'POST'], 'forceFetchEmails', 'AlertsAPIController::forceFetchEmails');
        $routes->match(['GET', 'POST'], 'forceFetchTickers', 'AlertsAPIController::forceFetchTickers');
        $routes->match(['GET', 'POST'], 'generateMarketingForAlert/(:num)', 'AlertsAPIController::generateMarketingForAlert/$1');
        $routes->post('Alerts/generateAdvisorMediaFromAlert/(:num)', 'AlertsAPIController::generateAdvisorMediaFromAlert/$1');
        $routes->post('Alerts/generateAdvisorMediaFromAlert', 'AlertsAPIController::generateAdvisorMediaFromAlert');
        $routes->match(['GET', 'POST'], 'generateNow', 'AlertsAPIController::generateNow');
        $routes->match(['GET', 'POST'], 'generateTradeAlertSummary', 'AlertsAPIController::generateTradeAlertSummary');
        $routes->match(['GET', 'POST'], 'getEmaComparison/(:segment)', 'AlertsAPIController::getEmaComparison/$1');
        $routes->get('generateAlertSocialCopy/(:num)', 'AlertsAPIController::generateAlertSocialCopy/$1');
        $routes->match(['GET', 'POST'], 'getFullMetrics', 'AlertsAPIController::getFullMetrics');
        $routes->match(['GET', 'POST'], 'getLatestPrices', 'AlertsAPIController::getLatestPrices');
        $routes->match(['GET', 'POST'], 'getTechnicalIndicators', 'AlertsAPIController::getTechnicalIndicators');
        $routes->match(['GET', 'POST'], 'hideTradeAlert', 'AlertsAPIController::hideTradeAlert');
        $routes->match(['GET', 'POST'], 'manageTradeAlert', 'AlertsAPIController::manageTradeAlert');
        $routes->match(['GET', 'POST'], 'markAlertAsSentAndSendEmail/(:segment)', 'AlertsAPIController::markAlertAsSentAndSendEmail/$1');
        $routes->match(['GET', 'POST'], 'processAlerts', 'AlertsAPIController::processAlerts');
        $routes->match(['GET', 'POST'], 'processEmailAlerts', 'AlertsAPIController::processEmailAlerts');
        $routes->match(['GET', 'POST'], 'processTradeAlerts', 'AlertsAPIController::processTradeAlerts');
        $routes->match(['GET', 'POST'], 'processTradeBatch', 'AlertsAPIController::processTradeBatch');
        $routes->match(['GET', 'POST'], 'sendAlert', 'AlertsAPIController::sendAlert');
        $routes->match(['GET', 'POST'], 'sendDiscordAlerts', 'AlertsAPIController::sendDiscordAlerts');
        $routes->match(['GET', 'POST'], 'sendDiscordAlertsBySymbol/(:segment)', 'AlertsAPIController::sendDiscordAlertsBySymbol/$1');
        $routes->match(['GET', 'POST'], 'storeMarketingContent', 'AlertsAPIController::storeMarketingContent');
        $routes->match(['GET', 'POST'], 'updateBatchPrices', 'AlertsAPIController::updateBatchPrices');
        $routes->match(['GET', 'POST'], 'updateChartOverride', 'AlertsAPIController::updateChartOverride');
        $routes->match(['GET', 'POST'], 'updateExchange', 'AlertsAPIController::updateExchange');
        $routes->match(['GET', 'POST'], 'updateStatus/(:num)/(:any)', 'AlertsAPIController::updateStatus/$1/$2');
        $routes->match(['GET', 'POST'], 'updateTradeAlerts', 'AlertsAPIController::updateTradeAlerts');

        // Trade Alert Creation & Management
        $routes->match(['GET', 'POST'], 'submitTradeAlert', 'AlertsAPIController::submitTradeAlert');
        $routes->match(['GET', 'POST'], 'getTradeAlertDetails', 'AlertsAPIController::getTradeAlertDetails');
    
        // Voiceover and Marketing Content
        $routes->match(['GET', 'POST'], 'generateVoiceoverScript', 'AlertsAPIController::generateVoiceoverScript');
        $routes->match(['GET', 'POST'], 'generateVoiceoverAndMarketingContent', 'AlertsAPIController::generateVoiceoverAndMarketingContent');
        $routes->match(['GET', 'POST'], 'generateAndStoreVoiceover', 'AlertsAPIController::generateAndStoreVoiceover');
        
        // Social Media & Marketing
        $routes->match(['GET', 'POST'], 'generateSocialMediaPosts', 'AlertsAPIController::generateSocialMediaPosts');
        $routes->match(['GET', 'POST'], 'postMarketingContentToSocials', 'AlertsAPIController::postMarketingContentToSocials');

        $routes->match(['GET', 'POST'], 'gen-keys', 'AlertsAPIController::genKeys'); // Robinhood API Library :: generate keys
        $routes->match(['GET', 'POST'], 'sign', 'AlertsAPIController::sign'); // Robinhood API Library :: sign
    });

    // ------------------------
    // ✅ AuctionsController
    // ------------------------
    $routes->group('Auctions', static function($routes) {
        $routes->post('fmv', 'AuctionsAPIController::computeFMV');
        $routes->post('settle/(:num)', 'AuctionsAPIController::settle/$1');
        $routes->post('escrow/release/(:num)', 'AuctionsAPIController::releaseEscrow/$1');
        $routes->post('escrow/refund/(:num)', 'AuctionsAPIController::refundEscrow/$1');
        $routes->post('topup', 'AuctionsAPIController::topUp');
    });
    
    // ------------------------
    // ✅ BrokerController
    // ------------------------
    $routes->group('Broker', function($routes) {
        $routes->get('summary', 'BrokerAPIController::summary');
        $routes->get('credit', 'BrokerAPIController::credit');
        $routes->get('available', 'BrokerAPIController::available');
        $routes->get('repayment', 'BrokerAPIController::repayment');
        $routes->get('categories', 'BrokerAPIController::categories');
        $routes->get('transactions', 'BrokerAPIController::transactions');
        $routes->get('goals', 'BrokerAPIController::goals');
        $routes->get('insights', 'BrokerAPIController::insights');
        $routes->get('trends', 'BudgetController::trends');
        $routes->get('net-worth', 'BudgetController::netWorth');
        $routes->get('cash-flow', 'BudgetController::cashFlow');
        $routes->get('budgets', 'BudgetController::budgets');
        $routes->get('savings-goals', 'BrokerAPIController::savingsGoals');
        $routes->get('investment-accounts', 'BrokerAPIController::investmentAccounts');
        $routes->get('linked-accounts', 'BrokerAPIController::linkedAccounts');
        $routes->get('add-linked-account', 'BrokerAPIController::addLinkedAccount');
        $routes->get('remove-linked-account/(:segment)', 'BrokerAPIController::removeLinkedAccount/$1');
        $routes->get('refresh-linked-account/(:segment)', 'BrokerAPIController::refreshLinkedAccount/$1');

        $routes->get('fetchPlaidLinkToken/(:segment)', 'BrokerAPIController::fetchPlaidLinkToken/$1');
        $routes->get('fetchPlaidLinkToken', 'BrokerAPIController::fetchPlaidLinkToken');
        $routes->post('linkPlaidAccount', 'BrokerAPIController::linkPlaidAccount');
        $routes->get('unlinkPlaidAccount/(:segment)', 'BrokerAPIController::unlinkPlaidAccount/$1');
        $routes->get('refreshPlaidAccount/(:segment)', 'BrokerAPIController::refreshPlaidAccount/$1');
        $routes->get('fetchPlaidAccounts/(:segment)', 'BrokerAPIController::fetchPlaidAccounts/$1');
        $routes->get('fetchPlaidAccounts', 'BrokerAPIController::fetchPlaidAccounts');
        $routes->get('fetchPlaidTransactions/(:segment)', 'BrokerAPIController::fetchPlaidTransactions/$1');
        $routes->get('fetchPlaidTransactions', 'BrokerAPIController::fetchPlaidTransactions');
        $routes->get('fetchPlaidBalances/(:segment)', 'BrokerAPIController::fetchPlaidBalances/$1');
        $routes->get('fetchPlaidBalances', 'BrokerAPIController::fetchPlaidBalances');
        $routes->get('fetchPlaidIncome/(:segment)', 'BrokerAPIController::fetchPlaidIncome/$1');
        $routes->get('fetchPlaidIncome', 'BrokerAPIController::fetchPlaidIncome');
        $routes->get('fetchPlaidLiabilities/(:segment)', 'BrokerAPIController::fetchPlaidLiabilities/$1');
        $routes->get('fetchPlaidLiabilities', 'BrokerAPIController::fetchPlaidLiabilities');
        $routes->get('fetchPlaidIdentity/(:segment)', 'BrokerAPIController::fetchPlaidIdentity/$1');
        $routes->get('fetchPlaidIdentity', 'BrokerAPIController::fetchPlaidIdentity');
        $routes->get('fetchPlaidInvestments/(:segment)', 'BrokerAPIController::fetchPlaidInvestments/$1');
        $routes->get('fetchPlaidInvestments', 'BrokerAPIController::fetchPlaidInvestments');
        $routes->get('fetchPlaidHoldings/(:segment)', 'BrokerAPIController::fetchPlaidHoldings/$1');
        $routes->get('fetchPlaidHoldings', 'BrokerAPIController::fetchPlaidHoldings');
        $routes->get('fetchRobinhoodAccounts', 'BrokerAPIController::fetchRobinhoodAccounts');
        $routes->get('fetchRobinhoodAccountDetails/(:segment)', 'BrokerAPIController::fetchRobinhoodAccountDetails/$1');
        $routes->get('fetchRobinhoodPositions/(:segment)', 'BrokerAPIController::fetchRobinhoodPositions/$1');
        $routes->get('fetchRobinhoodPositions', 'BrokerAPIController::fetchRobinhoodPositions');
        $routes->get('fetchRobinhoodPortfolio/(:segment)', 'BrokerAPIController::fetchRobinhoodPortfolio/$1');
        $routes->get('fetchRobinhoodPortfolio', 'BrokerAPIController::fetchRobinhoodPortfolio');
        $routes->get('fetchRobinhoodWatchlists/(:segment)', 'BrokerAPIController::fetchRobinhoodWatchlists/$1');
        $routes->get('fetchRobinhoodWatchlists', 'BrokerAPIController::fetchRobinhoodWatchlists');
        $routes->get('fetchRobinhoodOrders/(:segment)', 'BrokerAPIController::fetchRobinhoodOrders/$1');
        $routes->get('fetchRobinhoodOrders', 'BrokerAPIController::fetchRobinhoodOrders');
        $routes->get('fetchRobinhoodOrderDetails/(:segment)', 'BrokerAPIController::fetchRobinhoodOrderDetails/$1');
        $routes->get('fetchRobinhoodOrderDetails', 'BrokerAPIController::fetchRobinhoodOrderDetails');
        $routes->get('fetchRobinhoodInstruments/(:segment)', 'BrokerAPIController::fetchRobinhoodInstruments/$1');
        $routes->get('fetchRobinhoodInstruments', 'BrokerAPIController::fetchRobinhoodInstruments');
        $routes->get('fetchRobinhoodQuotes/(:segment)', 'BrokerAPIController::fetchRobinhoodQuotes/$1');
        $routes->get('fetchRobinhoodQuotes', 'BrokerAPIController::fetchRobinhoodQuotes');
        $routes->get('fetchRobinhoodDividends/(:segment)', 'BrokerAPIController::fetchRobinhoodDividends/$1');
        $routes->get('fetchRobinhoodDividends', 'BrokerAPIController::fetchRobinhoodDividends');
        $routes->get('fetchRobinhoodTransfers/(:segment)', 'BrokerAPIController::fetchRobinhoodTransfers/$1');
        $routes->get('fetchRobinhoodTransfers', 'BrokerAPIController::fetchRobinhoodTransfers');
        $routes->get('fetchRobinhoodWatchlistItems/(:segment)', 'BrokerAPIController::fetchRobinhoodWatchlistItems/$1');
        $routes->get('fetchRobinhoodWatchlistItems', 'BrokerAPIController::fetchRobinhoodWatchlistItems');
        $routes->get('fetchRobinhoodTransactionHistory/(:segment)', 'BrokerAPIController::fetchRobinhoodTransactionHistory/$1');
        $routes->get('fetchRobinhoodTransactionHistory', 'BrokerAPIController::fetchRobinhoodTransactionHistory');
        $routes->get('fetchRobinhoodNotifications/(:segment)', 'BrokerAPIController::fetchRobinhoodNotifications/$1');
        $routes->get('fetchRobinhoodNotifications', 'BrokerAPIController::fetchRobinhoodNotifications');
        $routes->get('fetchRobinhoodACHRelationships/(:segment)', 'BrokerAPIController::fetchRobinhoodACHRelationships/$1');
        $routes->get('fetchRobinhoodACHRelationships', 'BrokerAPIController::fetchRobinhoodACHRelationships');
        $routes->get('fetchRobinhoodCryptoAccounts/(:segment)', 'BrokerAPIController::fetchRobinhoodCryptoAccounts/$1');
        $routes->get('fetchRobinhoodCryptoAccounts', 'BrokerAPIController::fetchRobinhoodCryptoAccounts');
        $routes->get('fetchRobinhoodCryptoPositions/(:segment)', 'BrokerAPIController::fetchRobinhoodCryptoPositions/$1');
        $routes->get('fetchRobinhoodCryptoPositions', 'BrokerAPIController::fetchRobinhoodCryptoPositions');
        $routes->get('fetchRobinhoodCryptoPortfolio/(:segment)', 'BrokerAPIController::fetchRobinhoodCryptoPortfolio/$1');
        $routes->get('fetchRobinhoodCryptoPortfolio', 'BrokerAPIController::fetchRobinhoodCryptoPortfolio');
        $routes->get('fetchRobinhoodCryptoOrders/(:segment)', 'BrokerAPIController::fetchRobinhoodCryptoOrders/$1');
        $routes->get('fetchRobinhoodCryptoOrders', 'BrokerAPIController::fetchRobinhoodCryptoOrders');
        $routes->get('fetchRobinhoodCryptoOrderDetails/(:segment)', 'BrokerAPIController::fetchRobinhoodCryptoOrderDetails/$1');
        $routes->get('fetchRobinhoodCryptoOrderDetails', 'BrokerAPIController::fetchRobinhoodCryptoOrderDetails');
        $routes->get('fetchRobinhoodCryptoTransactions/(:segment)', 'BrokerAPIController::fetchRobinhoodCryptoTransactions/$1');
        $routes->get('fetchRobinhoodCryptoTransactions', 'BrokerAPIController::fetchRobinhoodCryptoTransactions');
        $routes->get('fetchRobinhoodCryptoQuotes/(:segment)', 'BrokerAPIController::fetchRobinhoodCryptoQuotes/$1');
        $routes->get('fetchRobinhoodCryptoQuotes', 'BrokerAPIController::fetchRobinhoodCryptoQuotes');
    });

    // ------------------------
    // ✅ BudgetAPIController
    // ------------------------
    $routes->group('Budget', function($routes) {
        $routes->get('summary', 'BudgetAPIController::summary');
        $routes->get('credit', 'BudgetAPIController::credit');
        $routes->get('available', 'BudgetAPIController::available');
        $routes->get('repayment', 'BudgetAPIController::repayment');
        $routes->get('categories', 'BudgetAPIController::categories');
        $routes->get('transactions', 'BudgetAPIController::transactions');
        $routes->get('goals', 'BudgetAPIController::goals');
        $routes->get('insights', 'BudgetAPIController::insights');
        $routes->get('trends', 'BudgetAPIController::trends');
        $routes->get('net-worth', 'BudgetAPIController::netWorth');
        $routes->get('cash-flow', 'BudgetAPIController::cashFlow');
        $routes->get('budgets', 'BudgetAPIController::budgets');
        $routes->get('savings-goals', 'BudgetAPIController::savingsGoals');
        $routes->get('investment-accounts', 'BudgetAPIController::investmentAccounts');
        $routes->get('linked-accounts', 'BudgetAPIController::linkedAccounts');
        $routes->get('add-linked-account', 'BudgetAPIController::addLinkedAccount');
        $routes->get('remove-linked-account/(:segment)', 'BudgetAPIController::removeLinkedAccount/$1');
        $routes->get('refresh-linked-account/(:segment)', 'BudgetAPIController::refreshLinkedAccount/$1');     
        $routes->get('Data', 'BudgetAPIController::apiBudgetData');
        $routes->get('Credit', 'BudgetAPIController::apiCreditData');
        $routes->get('Available', 'BudgetAPIController::apiAvailableData');
        $routes->get('Repayment', 'BudgetAPIController::apiRepaymentSummary');   

        $routes->get('getUserBudgetRecords', '\App\Modules\APIs\Controllers\BudgetController::getUserBudgetRecords');
        $routes->get('getUserCreditBalances', '\App\Modules\APIs\Controllers\BudgetController::getUserCreditBalances');
        $routes->get('getUserAvailableBalances', '\App\Modules\APIs\Controllers\BudgetController::getUserAvailableBalances');
        $routes->get('getUserRepaymentSummary', '\App\Modules\APIs\Controllers\BudgetController::getUserRepaymentSummary');
    });

    $routes->group('ContentEngine', function($routes) {
        $routes->post('ingestScanner', 'ContentEngineAPIController::ingestScanner');
        $routes->post('processIngest/(:num)', 'ContentEngineAPIController::processIngest/$1');
        $routes->get('topIdeas', 'ContentEngineAPIController::topIdeas');
        $routes->get('posts', 'ContentEngineAPIController::posts');
        $routes->get('posts/(:num)', 'ContentEngineAPIController::posts/$1');
        $routes->post('approvePost/(:num)', 'ContentEngineAPIController::approvePost/$1');
        $routes->post('sendPost/(:num)', 'ContentEngineAPIController::sendPost/$1');
        $routes->post('runDaily', 'ContentEngineAPIController::runDaily');
    });

    // ------------------------
    // ✅ DripCampaignController
    // ------------------------
    $routes->group('DripCampaign', function($routes) {
        $routes->get('click/(:segment)', 'DripCampaignAPIController::click/$1');
        $routes->get('Enroll/(:num)', 'DripCampaignAPIController::enrollUser/$1');
        $routes->get('open/(:segment)', 'DripCampaignAPIController::open/$1');
        $routes->get('processBatch', 'DripCampaignAPIController::processBatch');
        $routes->get('TestCron', 'DripCampaignAPIController::testDripCron');
    });

    // ------------------------
    // ✅ EmailController
    // ------------------------    
    $routes->group('Email', function($routes) {        
        $routes->get('autoScheduleDraftCampaigns', 'EmailAPIController::autoScheduleDraftCampaigns');
        $routes->get('cloneCampaign/(:num)', 'EmailAPIController::cloneCampaign/$1');
        $routes->post('createDraftCampaign', 'EmailAPIController::createDraftCampaign');
        $routes->post('scheduleCampaignApi/(:num)', 'EmailAPIController::scheduleCampaignApi/$1');
        $routes->get('cancelScheduledCampaign/(:num)', 'EmailAPIController::cancelScheduledCampaign/$1');
        $routes->delete('deleteCampaign/(:num)', 'EmailAPIController::deleteCampaign/$1');
        $routes->get('fetchCampaignAnalytics', 'EmailAPIController::fetchCampaignAnalytics');
        $routes->get('fetchQueuedEmails', 'EmailAPIController::fetchQueuedEmails');
        $routes->get('fetchQueuedEmailById/(:num)', 'EmailAPIController::fetchQueuedEmailById/$1');
        $routes->get('getAllCampaigns', 'EmailAPIController::getAllCampaigns');
        $routes->get('getCampaignMetrics/(:num)', 'EmailAPIController::getCampaignMetrics/$1');
        $routes->get('getCampaignStats/(:num)', 'EmailAPIController::getCampaignStats/$1');
        $routes->get('getEmailQueueStats', 'EmailAPIController::getEmailQueueStats');
        $routes->get('getEmailQueueTrend', 'EmailAPIController::getEmailQueueTrend');
        $routes->get('processScheduledCampaigns', 'EmailAPIController::processScheduledCampaigns');
        $routes->get('sendMassTestCampaign', 'EmailAPIController::sendMassTestCampaign');
        $routes->get('trackBounceWebhook', 'EmailAPIController::trackBounceWebhook');
        $routes->get('unsubscribe/(:any)', 'EmailAPIController::unsubscribe/$1');
    });

    $routes->group('eSports', function($routes) {
        $routes->post('createEvent', 'EsportsAPIController::createEvent');
        $routes->post('joinEvent', 'EsportsAPIController::joinEvent');
        $routes->post('lockEscrow', 'EsportsAPIController::lockEscrow');
        $routes->post('cancelEvent', 'EsportsAPIController::cancelEvent');
        $routes->post('receiveResultWebhook', 'EsportsAPIController::receiveResultWebhook');
        $routes->post('settlePayouts', 'EsportsAPIController::settlePayouts');
        $routes->post('cronProcessJobs', 'EsportsAPIController::cronProcessJobs');
        $routes->get('event/(:num)', 'EsportsAPIController::getEvent/$1');
        $routes->get('events', 'EsportsAPIController::listEvents');
    });
    
    $routes->group('Investments', function($routes) {
        $routes->get('/', 'InvestmentsAPIController:index');
        // $routes->match(['GET', 'POST'], 'addNewTradeToWatchlist', 'InvestmentsAPIController:addNewTradeToWatchlist');
        // $routes->get('fetchActiveTrades/(:any)', 'API::fetchActiveTrade/$1'); // Fetch User Active Trades
        // $routes->get('fetchRealTimeData/(:any)/(:any)', 'API::fetchRealTimeData/$1/$2'); // Fetch Real-Time Price Data
        // $routes->get('fetchWatchlistPrices/(:any)', 'InvestmentsAPIController::fetchWatchlistPrices/$1');
        // $routes->get('getInvestmentData/(:segment)', 'InvestmentsAPIController::getInvestmentData/$1');
        // $routes->get('getSymbolsByTradeType/(:any)', 'API::getSymbolsByTradeType/$1'); // Fetch Symbols by Trade Type (Stocks, Cryptos, etc.)
        // $routes->get('GetUserWatchlist/(:any)', 'InvestmentsAPIController::getUserWatchlist/$1');
        // $routes->get('refreshActiveTradesPrices/(:any)', 'InvestmentsAPIController::refreshActiveTradesPrices/$1');
        $routes->get('getSymbolsByTradeType/(:segment)', 'InvestmentsAPIController::getSymbolsByTradeType/$1');
        $routes->get('getInvestmentData/(:segment)', 'InvestmentsAPIController::getInvestmentData/$1');
        $routes->get('searchTickers', 'InvestmentsAPIController::searchTickers');
        $routes->get('news',              'InvestmentsAPIController::listNews');
        $routes->get('news/(:num)',       'InvestmentsAPIController::getNews/$1');
        $routes->post('news',             'InvestmentsAPIController::createNews');
        $routes->post('news/(:num)',      'InvestmentsAPIController::updateNews/$1');
        $routes->delete('news/(:num)',    'InvestmentsAPIController::deleteNews/$1');
        $routes->post('validateSymbol',    'InvestmentsAPIController::validateSymbol');
        $routes->get('getForecastHighlights', 'InvestmentsAPIController::getForecastHighlights');
        $routes->get('getForecastDetails/(:segment)', 'InvestmentsAPIController::getForecastDetails/$1');
        $routes->get('getConfidenceHeatmap', 'InvestmentsAPIController::getConfidenceHeatmap');
        $routes->get('getTopConfidenceBySector', 'InvestmentsAPIController::getTopConfidenceBySector');
        $routes->get('getConfidenceDistribution', 'InvestmentsAPIController::getConfidenceDistribution');
        $routes->get('getForecastAccuracySummary', 'InvestmentsAPIController::getForecastAccuracySummary');
        $routes->post('refreshForecasts', 'InvestmentsAPIController::refreshForecasts');
        $routes->post('reforecastTicker', 'InvestmentsAPIController::reforecastTicker');
        // $routes->get('removeTradeFromWatchlist/(:num)', 'InvestmentsAPIController::removeTradeFromWatchlist/$1'); // NOT COMPLETED Remove Trade from Watchlist
        // $routes->post('updateTradeNotes', 'InvestmentsAPIController::updateTradeNotes'); // NOT COMPLETED Update Trade Notes
        // $routes->post('updateTradeTargetPrice', 'InvestmentsAPIController::updateTradeTargetPrice'); // NOT COMPLETED Update Trade Target Price
        // $routes->post('updateWatchlistOrder', 'InvestmentsAPIController::updateWatchlistOrder'); // NOT COMPLETED Update Watchlist Order
        // $routes->post('updateWatchlistTags', 'InvestmentsAPIController::updateWatchlistTags'); // NOT COMPLETED Update Watchlist Tags
        // $routes->get('userHoldings/(:any)', 'InvestmentsAPIController::userHoldings/$1'); // Fetch User Holdings
        // $routes->get('userWatchlist/(:any)', 'InvestmentsAPIController::userWatchlist/$1'); // Fetch User Watchlist
        // $routes->get('Search/Ticker/(:any)', 'InvestmentsAPIController::searchTicker/$1'); // Search User Holdings
    });

    // ------------------------
    // ✅ ManagementController
    // ------------------------

    $routes->get('SMTP/test', 'SmtpTestController::probe', ['filter' => 'login']);

    // ------------------------
    // ✅ MarketingAPIController
    // ------------------------
    $routes->group('Marketing', function($routes) {
        $routes->post('/', 'MarketingAPIController::index');
        $routes->post('approvePost/(:num)', 'MarketingAPIController::approvePost/$1');
        $routes->post('approveBufferItem/(:num)', 'MarketingAPIController::approveBufferItem/$1');
        $routes->post('autoScheduleNextApproved', 'MarketingAPIController::autoScheduleNextApproved');
        $routes->get('cronAnalyzeContent', 'MarketingAPIController::cronAnalyzeContent');
        $routes->get('cronAutoPublishGroupedDigest', 'MarketingAPIController::cronAutoPublishGroupedDigest');
        $routes->get('cronFetchAndGenerateNews', 'MarketingAPIController::cronFetchAndGenerateNews');
        $routes->get('cronFetchInbox', 'MarketingAPIController::cronFetchInbox');
        $routes->get('cronFetchMarketingEmails', 'MarketingAPIController::cronFetchMarketingEmails');
        $routes->get('cronProcessSMSMarketingIdeas', 'MarketingAPIController::cronProcessSMSMarketingIdeas');
        $routes->delete('deleteScrape/(:num)', 'MarketingAPIController::deleteScrape/$1');
        $routes->get('downloadVoiceover/(:any)', 'MarketingAPIController::downloadVoiceover/$1');
        $routes->get('distributeHighScoreContent', 'MarketingAPIController::distributeHighScoreContent');
        $routes->get('emailPostForApproval/(:num)', 'MarketingAPIController::emailPostForApproval/$1');
        $routes->get('fetchBufferPaginated', 'MarketingAPIController::fetchBufferPaginated');
        $routes->get('fetchFinalizedSummariesBlock', 'MarketingAPIController::fetchFinalizedSummariesBlock');
        $routes->get('fetchGeneratedSummaries', 'MarketingAPIController::fetchGeneratedSummaries');
        $routes->get('fetchGeneratedSummariesBlock', 'MarketingAPIController::fetchGeneratedSummariesBlock');
        $routes->get('fetchGeneratedSummariesJson', 'MarketingAPIController::fetchGeneratedSummariesJson');
        $routes->post('generateVideoContent', 'MarketingAPIController::generateVideoContent');
        $routes->post('generateTikTokContent', 'MarketingAPIController::generateTikTokContent');
        $routes->post('saveVideoDraft', 'MarketingAPIController::saveVideoDraft');
        $routes->post('updateVideoContent/(:num)', 'MarketingAPIController::updateVideoContent/$1');
        $routes->post('approveVideoContent/(:num)', 'MarketingAPIController::approveVideoContent/$1');
        $routes->post('archiveVideoContent/(:num)', 'MarketingAPIController::archiveVideoContent/$1');
        $routes->post('duplicateVideoContent/(:num)', 'MarketingAPIController::duplicateVideoContent/$1');
        $routes->get('getVideoContent/(:num)', 'MarketingAPIController::getVideoContent/$1');
        $routes->get('getVideoQueue', 'MarketingAPIController::getVideoQueue');
        $routes->match(['GET', 'POST'], 'generateFromTicker', 'MarketingAPIController::generateFromTicker');
        $routes->match(['GET', 'POST'], 'generateFromTopic', 'MarketingAPIController::generateFromTopic');
        $routes->match(['GET', 'POST'], 'generateFromScrapedSource/(:num)', 'MarketingAPIController::generateFromScrapedSource/$1');
        $routes->get('exportVideoPackage/(:num)', 'MarketingAPIController::exportVideoPackage/$1');
        $routes->get('getTemplates', 'MarketingAPIController::getTemplates');
        $routes->match(['GET', 'POST'], 'saveTemplate', 'MarketingAPIController::saveTemplate');
        $routes->delete('deleteTemplate/(:num)', 'MarketingAPIController::deleteTemplate/$1');
        $routes->get('forceGenerateFromTemp', 'MarketingAPIController::forceGenerateFromTemp');
        $routes->get('ForceGenerateFromTemp/(:num)', 'MarketingAPIController::ForceGenerateFromTemp/$1');
        // $routes->get('generateCampaignContent/(:num)', 'MarketingAPIController::generateCampaignContent/$1');
        $routes->match(['GET', 'POST'], 'generateCampaignContent', 'MarketingAPIController::generateCampaignContent');
        $routes->match(['GET', 'POST'], 'generateDailyMarketCampaign', 'MarketingAPIController::generateDailyMarketCampaign');
        $routes->match(['GET', 'POST'], 'generateCampaignStepContent', 'MarketingAPIController::generateCampaignStepContent');
        $routes->get('generateContentFromScraper', 'MarketingAPIController::generateContentFromScraper');
        $routes->get('generateContentDigestFromStored', 'MarketingAPIController::generateContentDigestFromStored');
        $routes->get('generateDailyContentDigest', 'MarketingAPIController::generateDailyContentDigest');
        $routes->get('generateKimiSummaries', 'MarketingAPIController::generateKimiSummaries');
        $routes->get('generateKimiPosts', 'MarketingAPIController::generateKimiPosts');
        $routes->get('GenerateFromSimilar/(:num)', 'MarketingAPIController::generateFromSimilar/$1');
        $routes->get('generateFromSimilar', 'MarketingAPIController::generateFromSimilar');
        $routes->get('generateLivePreview', 'MarketingAPIController::generateLivePreview');
        $routes->get('generatePostsFromSummary/(:num)', 'MarketingAPIController::generatePostsFromSummary/$1');
        $routes->get('generatePostsFromSummary', 'MarketingAPIController::generatePostsFromSummary');
        $routes->match(['GET', 'POST'], 'generatePostMediaContent', 'MarketingAPIController::generatePostMediaContent');
        $routes->get('generateScheduledPosts', 'MarketingAPIController::generateScheduledPosts');
        $routes->get('getCleanedScrapedContent', 'MarketingAPIController::getCleanedScrapedContent');
        $routes->get('getScrapeDetails/(:num)', 'MarketingAPIController::getScrapeDetails/$1');
        $routes->get('generateThreadFromSummary/(:num)', 'MarketingAPIController::generateThreadFromSummary/$1');
        $routes->get('getContentPerformanceAnalytics', 'MarketingAPIController::getContentPerformanceAnalytics');
        $routes->get('getGeneratedPostsPaginated', 'MarketingAPIController::getGeneratedPostsPaginated');
        $routes->get('getStoryboardPackage/(:num)', 'MarketingAPIController::getStoryboardPackage/$1');
        $routes->get('getTopGeneratedPosts', 'MarketingAPIController::getTopGeneratedPosts');
        $routes->get('getTopKeywordChart/(:num)', 'MarketingAPIController::getTopKeywordChart/$1');
        $routes->get('groupSimilarSummariesByCosine', 'MarketingAPIController::groupSimilarSummariesByCosine');
        $routes->get('massResendActivationEmails', 'MarketingAPIController::massResendActivationEmails');
        $routes->get('monitorKeywords', 'MarketingAPIController::monitorKeywordsAndScrape');
        $routes->get('previewBufferItem/(:num)', 'MarketingAPIController::previewBufferItem/$1');
        $routes->get('previewPendingSummaries', 'MarketingAPIController::previewPendingSummaries');
        $routes->get('processMarketingTempEmails/(:num)/(:segment)/(:num)', 'MarketingAPIController::processMarketingTempEmails/$1/$2/$3');
        $routes->get('processMarketingTempEmails/(:num)/(:segment)', 'MarketingAPIController::processMarketingTempEmails/$1/$2');
        $routes->get('publishGroupedContentDraft', 'MarketingAPIController::publishGroupedContentDraft');
        $routes->get('rankBufferPostsDaily', 'MarketingAPIController::rankBufferPostsDaily');
        $routes->match(['GET', 'POST'], 'runNewsScrape', 'MarketingAPIController::runNewsScrape');
        $routes->match(['GET', 'POST'], 'runNewsGenerate', 'MarketingAPIController::runNewsGenerate');
        $routes->match(['GET', 'POST'], 'runNewsPipeline', 'MarketingAPIController::runNewsPipeline');
        $routes->get('reprocessIncompleteEmails', 'MarketingAPIController::reprocessIncompleteEmails');
        $routes->post('rejectBufferItem/(:num)', 'MarketingAPIController::rejectBufferItem/$1');
        $routes->get('runContentGenerationBatch', 'MarketingAPIController::runContentGenerationBatch');
        $routes->get('runKeywordBackfillBatch', 'MarketingAPIController::runKeywordBackfillBatch');
        $routes->get('runKeywordEnrichment', 'MarketingAPIController::runKeywordEnrichment');
        $routes->get('runScheduledTasks', 'MarketingAPIController::runScheduledTasks');
        $routes->get('Search/(:segment)/(:any)', 'ManagementController::index/$1/$2');
        $routes->get('sendWalkthroughEmails', 'MarketingAPIController::sendWalkthroughEmails');
        $routes->get('scheduleApprovedPost/(:num)', 'MarketingAPIController::scheduleApprovedPost/$1');
        $routes->get('schedulePost/(:any)/(:any)/(:any)', 'MarketingAPIController::schedulePost/$1/$2/$3');
        $routes->get('sharePost/(:num)/(:segment)', 'MarketingAPIController::sharePost/$1/$2');
        $routes->get('Large-Content/Form', 'MarketingAPIController::submitLargeContentForm');
        $routes->post('submitLargeContent', 'MarketingAPIController::submitLargeContent');
        $routes->get('Manual-Content/Form', 'MarketingAPIController::shortLongContentForm');
        $routes->post('submitManualContent', 'MarketingAPIController::submitManualContent');
        $routes->get('testGenerateDailyDigest', 'MarketingAPIController::testGenerateDailyDigest');
        $routes->get('testGenerateFromTempEmail/(:num)', 'MarketingAPIController::testGenerateFromTempEmail/$1');
        $routes->get('testTfIdfEdgeCases', 'MarketingAPIController::testTfIdfEdgeCases');
        $routes->get('testGenerateSummarizerHarness', 'MarketingAPIController::testGenerateSummarizerHarness');
        $routes->get('Timeline/(:segment)', 'MarketingAPIController::timeline/$1');
        $routes->get('Timeline', 'MarketingAPIController::viewTimelineGrouped');
        $routes->get('triggerBackfill', 'MarketingAPIController::reprocessIncompleteEmails');
        $routes->get('triggerPostAutogenOnEmpty', 'MarketingAPIController::triggerPostAutogenOnEmpty');
        $routes->post('updateCampaignLinks', 'MarketingAPIController::updateCampaignLinks');
        $routes->post('updateInsight', 'MarketingAPIController::updateInsight');
        $routes->post('updateCampaignMessageField', 'MarketingAPIController::updateCampaignMessageField');
        $routes->post('updatePostSchedule/(:num)', 'MarketingAPIController::updatePostSchedule/$1');
        $routes->post('updatePlatformToggle/(:num)', 'MarketingAPIController::updatePlatformToggle/$1');
        $routes->post('validateSymbol', 'MarketingAPIController::validateSymbol');
        $routes->post('uploadNotification', 'MarketingAPIController::uploadNotification');
        $routes->post('getStoryUpdates', 'MarketingAPIController::getStoryUpdates');
        $routes->post('generateMarketingPackage', 'MarketingAPIController::generateMarketingPackage');
        $routes->match(['GET', 'POST'], 'processPendingNotifications', 'MarketingAPIController::processPendingNotifications');
        $routes->match(['GET', 'POST'], 'processPendingTempScraper', 'MarketingAPIController::processPendingTempScraper');
        $routes->match(['GET', 'POST'], 'processPendingCampaigns', 'MarketingAPIController::processPendingCampaigns');
        $routes->match(['GET', 'POST'], 'processPendingGeneratedContent', 'MarketingAPIController::processPendingGeneratedContent');
        $routes->get('distributionSummary', 'MarketingAPIController::distributionSummary');
        $routes->get('distributionHistory/(:num)', 'MarketingAPIController::distributionHistory/$1');
        $routes->get('distributionFailedSummary', 'MarketingAPIController::distributionFailedSummary');
        $routes->get('distributionChannelTotals', 'MarketingAPIController::distributionChannelTotals');
        $routes->match(['GET', 'POST'], 'retryDistributionTargets', 'MarketingAPIController::retryDistributionTargets');
        $routes->match(['GET', 'POST'], 'retryDistributionTargets/(:num)', 'MarketingAPIController::retryDistributionTargets/$1');
        $routes->match(['GET', 'POST'], 'runMarketingPipeline', 'MarketingAPIController::runMarketingPipeline');

        // UI/ops endpoints (deduped from former parallel group)
        $routes->get('/', 'MarketingAPIController::index');
        $routes->get('Add/(:segment)', 'MarketingAPIController::add/$1');
        $routes->match(['POST'], 'Add-Subscriber', 'MarketingAPIController::addSubscriber');
        $routes->get('Approve-Content/(:num)', 'MarketingAPIController::approveContent/$1');
        $routes->get('Blog-Creator', 'MarketingAPIController::blogCreator');
        $routes->get('Blogs', 'MarketingAPIController::blogs');
        $routes->get('Campaigns', 'MarketingAPIController::campaigns');
        $routes->get('Content-Review', 'MarketingAPIController::contentReview');
        $routes->get('Content/Generator', 'MarketingAPIController::contentGenerator');
        $routes->get('Content/Listing', 'MarketingAPIController::contentListing');
        $routes->get('Daily-Log', 'MarketingAPIController::viewDailyLogs');
        $routes->get('Edit-Content/(:num)', 'MarketingAPIController::editContent/$1');
        $routes->get('Email/(:any)/(:any)', 'MarketingAPIController::viewEmail/$1/$2');
        $routes->get('fetchEmails', 'MarketingAPIController::fetchEmails');
        $routes->post('fetchMissingLogos', 'MarketingAPIController::fetchMissingLogos');
        $routes->get('Financial-News', 'MarketingAPIController::financialNews');
        $routes->post('generateAutomatedContent', 'MarketingAPIController::generateAutomatedContent');
        $routes->get('generateContent', 'MarketingAPIController::generateContent');
        $routes->post('generateMarketingPackage', 'MarketingAPIController::generateMarketingPackage');
        $routes->get('generateNewsletter', 'MarketingAPIController::generateNewsletterContent');
        $routes->get('getRecentScrapes', 'MarketingAPIController::getRecentScrapes');
        $routes->get('Grouped-Content-Drafts', 'MarketingAPIController::generateGroupedContentDrafts');
        $routes->get('Ideas', 'MarketingAPIController::ideas');
        $routes->get('Post-Creator', 'MarketingAPIController::postCreator');
        $routes->get('previewGeneratedPost/(:num)', 'MarketingAPIController::previewGeneratedPost/$1');
        $routes->get('Promote', 'MarketingAPIController::promote');
        $routes->get('Promote/(:segment)', 'MarketingAPIController::promote');
        $routes->post('PublishBlog/(:num)', 'Management\MarketingAPIController::publishBlog/$1');
        $routes->get('Research', 'AlertsAPIController::research');
        $routes->get('RunContentGeneration', 'Management\MarketingAPIController::runContentGeneration');
        $routes->get('Quick-Scraper', 'MarketingAPIController::standaloneScrape');
        $routes->get('Reject-Content/(:num)', 'MarketingAPIController::rejectContent/$1');
        $routes->post('Save-Content-Edit/(:num)', 'MarketingAPIController::saveContentEdit/$1');
        $routes->get('Schedule', 'MarketingAPIController::schedule');
        $routes->get('Schedule/(:segment)', 'MarketingAPIController::schedule/$1');
        $routes->get('scheduleNewsletters', 'MarketingAPIController::scheduleNewsletterCampaign');
        $routes->get('submitDailyLog', 'MarketingAPIController::submitDailyLog');
        $routes->post('Scrape-Link', 'MarketingAPIController::scrapeLink');
        $routes->get('sendNotification', 'MarketingAPIController::sendNotification');
        $routes->get('sendNewsletter', 'MarketingAPIController::sendScheduleNewsletter');
        $routes->get('Communities', 'MarketingAPIController::communities');
        $routes->get('Test', 'MarketingAPIController::test');
        $routes->get('Twitter', 'MarketingAPIController::twitterDashboard');
        $routes->get('Video-Creator', 'MarketingAPIController::videoCreator');
        $routes->get('View-Email/(:segment)/(:segment)', 'MarketingAPIController::viewEmail/$1/$2');
        $routes->get('View-Grouped-Summaries', 'MarketingAPIController::View-Grouped-Summaries');
        $routes->match(['GET', 'POST'], 'MyMI-Gold/Tasks/Add', 'WalletsAPIController::addUserGoldTasks');
        $routes->get('Email-Templates/create', 'EmailTemplateController::create');
        $routes->post('/Email-Templates/store', 'EmailTemplateController::store');
        $routes->get('Email-Queue', 'EmailQueueController::index');
        $routes->get('Email-Queue/create', 'EmailQueueController::create');
        $routes->post('Email-Queue/store', 'EmailQueueController::store');
        $routes->post('Email-Queue/processQueue', 'EmailQueueController::processQueue');
        
        // Marketing Platforms & Posting Plan
        $routes->get('getPlatforms','ManagementAPIController::getPlatforms');
        $routes->post('savePlatform','ManagementAPIController::savePlatform');
        $routes->delete('deletePlatform/(:num)','ManagementAPIController::deletePlatform/$1');

        $routes->get('getPlatformRules/(:segment)','ManagementAPIController::getPlatformRules/$1');
        $routes->post('upsertPlatformRule','ManagementAPIController::upsertPlatformRule');
        $routes->delete('deletePlatformRule/(:num)','ManagementAPIController::deletePlatformRule/$1');

        $routes->post('searchTaxonomy','ManagementAPIController::searchTaxonomy');
        $routes->post('saveTaxonomy','ManagementAPIController::saveTaxonomy');
        $routes->delete('deleteTaxonomy/(:num)','ManagementAPIController::deleteTaxonomy/$1');

        $routes->get('listSuggestions/(:segment)/(:segment)','ManagementAPIController::listSuggestions/$1/$2');
        $routes->post('saveSuggestion','ManagementAPIController::saveSuggestion');
        $routes->delete('deleteSuggestion/(:num)','ManagementAPIController::deleteSuggestion/$1');

        $routes->post('getPostingPlan','ManagementAPIController::getPostingPlan');
        $routes->post('composePost','ManagementAPIController::composePost');
    });

    // Predictions (API + CRON)
    $routes->group('Predictions', function($routes) {
        $routes->get('/', 'PredictionsAPIController::index');
        $routes->get('Liquidity/Add', 'PredictionsAPIController::addLiquidity');
        $routes->get('Liquidity/Remove', 'PredictionsAPIController::removeLiquidity');
        $routes->get('Markets', 'PredictionsAPIController::markets');
        $routes->get('Market/(:num)', 'PredictionsAPIController::view/$1');
        $routes->get('Markets/Create', 'PredictionsAPIController::createMarket');
        $routes->get('Markets/Settle/(:num)', 'PredictionsAPIController::settle/$1');
        $routes->get('Orders/Place', 'PredictionsAPIController::placeOrder');
        $routes->get('Orders/Cancel', 'PredictionsAPIController::cancelOrder');
        $routes->get('Portfolio', 'PredictionsAPIController::portfolio');
        $routes->get('Settlements', 'PredictionsAPIController::settlements');
        $routes->post('PlaceOrder', 'PredictionsAPIController::placeOrder');
        $routes->post('CancelOrder', 'PredictionsAPIController::cancelOrder');
        $routes->get('Cron/Distribute-Fees', 'PredictionsAPIController::cronDistributeFees');
        $routes->get('Cron/Fetch-Market-Data', 'PredictionsAPIController::cronFetchMarketData');
        $routes->get('Cron/Fetch-User-Data', 'PredictionsAPIController::cronFetchUserData');
        $routes->get('Cron/Settle-Markets', 'PredictionsAPIController::cronSettleMarkets');
        $routes->get('Cron/Expire-Markets', 'PredictionsAPIController::cronExpireMarkets');
        $routes->get('Cron/Update-Market-Prices', 'PredictionsAPIController::cronUpdateMarketPrices');
        $routes->get('Cron/Update-Market-States', 'PredictionsAPIController::cronUpdateMarketStates');
        $routes->get('Cron/Update-User-Positions', 'PredictionsAPIController::cronUpdateUserPositions');
        $routes->get('Cron/Update-User-Stakes', 'PredictionsAPIController::cronUpdateUserStakes');
        $routes->get('Cron/Update-User-Fees', 'PredictionsAPIController::cronUpdateUserFees');
        $routes->get('Cron/Update-User-PnL', 'PredictionsAPIController::cronUpdateUserPnL');
        $routes->get('Cron/Update-User-Rankings', 'PredictionsAPIController::cronUpdateUserRankings');
        $routes->get('Cron/Update-User-Leaderboard', 'PredictionsAPIController::cronUpdateUserLeaderboard');
        $routes->get('Cron/Update-User-Stats', 'PredictionsAPIController::cronUpdateUserStats');
        $routes->get('Cron/Update-User-Notifications', 'PredictionsAPIController::cronUpdateUserNotifications');
        $routes->get('Cron/Process-Expired-Markets', 'PredictionsAPIController::cronProcessExpiredMarkets');
        $routes->get('Cron/Process-Settled-Markets', 'PredictionsAPIController::cronProcessSettledMarkets');
        $routes->get('Cron/Process-User-Orders', 'PredictionsAPIController::cronProcessUserOrders');
        $routes->get('Cron/Process-User-Positions', 'PredictionsAPIController::cronProcessUserPositions');
        $routes->get('Cron/Process-User-Stakes', 'PredictionsAPIController::cronProcessUserStakes');
        $routes->get('Cron/Process-User-Fees', 'PredictionsAPIController::cronProcessUserFees');
        $routes->get('Cron/Process-User-PnL', 'PredictionsAPIController::cronProcessUserPnL');
        $routes->get('Cron/Process-User-Rankings', 'PredictionsAPIController::cronProcessUserRankings');
        $routes->get('Cron/Process-User-Leaderboard', 'PredictionsAPIController::cronProcessUserLeaderboard');
        $routes->get('Cron/Process-User-Stats', 'PredictionsAPIController::cronProcessUserStats');
        $routes->get('Cron/Process-User-Notifications', 'PredictionsAPIController::cronProcessUserNotifications');
        $routes->get('Cron/Process-User-Settlements', 'PredictionsAPIController::cronProcessUserSettlements');
        $routes->get('Cron/Lock', 'PredictionsAPIController::lock');
        $routes->get('Cron/Rebalance', 'PredictionsAPIController::rebalanceOdds');
        $routes->get('Cron/Unlock', 'PredictionsAPIController::unlock');
        $routes->get('Latest', 'PredictionsAPIController::latest');
    });

    $routes->group('Solana', function($routes) {
        $routes->get('getMarketPrice/(:segment)', 'SolanaAPIController::get/$1');
        $routes->get('getCoinAmount/(:segment)', 'SolanaAPIController::getCoinAmount/$1');
        $routes->get('getMarketPrice', 'SolanaAPIController::getMarketPrice');
        $routes->get('getTokenPrice/(:segment)', 'SolanaAPIController::getTokenPrice/$1');
        $routes->get('getExchangePrice/(:segment)', 'SolanaAPIController::getExchangePrice/$1');
        $routes->get('getAssetsData', 'SolanaAPIController::getAssetsData');
        $routes->get('provisionDefaultWallet', 'SolanaAPIController::provisionDefaultWallet');
        $routes->get('updatePrices', 'SolanaAPIController::updateSolanaPrices');
        $routes->get('updateTokens', 'SolanaAPIController::updateSolanaTokens');

        // New Routes - Codex Pull Request https://github.com/MillennialInvestments/MyMIWallet/pull/35/files#diff-bfda09f2b1b5c0bbb67e81be1c5a9e3f3c0abcff17f9890caa17e3557bb25653R1-R4
        $routes->get('health', 'SolanaAPIController::health');
        $routes->get('wallet/(:segment)/balance', 'SolanaAPIController::getBalance/$1');
        $routes->get('wallet/(:segment)/tokens', 'SolanaAPIController::getTokenAccounts/$1');
        $routes->post('transfer', 'SolanaAPIController::transfer');
        $routes->post('swap/quote', 'SolanaAPIController::quote');
        $routes->post('swap/execute', 'SolanaAPIController::swap');
        $routes->post('token/create', 'SolanaAPIController::createToken');
        $routes->post('token/mint', 'SolanaAPIController::mint');
    });    

    $routes->group('Support', function($routes) {
        // app/Config/Routes.php (inside your existing User or API group)
        $routes->get('kb', 'SupportAPIController::kb');
        $routes->get('kb/(:segment)', 'SupportAPIController::kbArticle/$1');
    });

    $routes->group('Wallets', function($routes) {

        // ✅ Add this so /API/Wallets resolves to WalletsAPIController::index
        $routes->get('/', 'WalletsAPIController::index');
        $routes->get('summary', 'WalletsAPIController::summary');

        // (keep your existing routes)
        $routes->get('providers', 'WalletsAPIController::providers');

        // CRUD
        $routes->post('Create', 'WalletsAPIController::create');
        $routes->put('Update/(:num)', 'WalletsAPIController::update/$1');
        $routes->delete('Unlink/(:num)', 'WalletsAPIController::unlink/$1');

        // Broker links
        $routes->post('Link-Robinhood', 'WalletsAPIController::linkRobinhood');
        $routes->post('Link-Snaptrade', 'WalletsAPIController::linkSnapTrade');
        $routes->post('Snaptrade/Connect-URL', 'WalletsAPIController::getSnapTradeConnectUrl');

        // (optional legacy) leave this if you still need it, but it’s not required for the client fetch:
        $routes->post('Banking/Update/(:num)',   'WalletsAPIController::updateBank/$1');
        $routes->post('Credit/Update/(:num)',    'WalletsAPIController::updateCredit/$1');
        $routes->post('Debt/Update/(:num)',      'WalletsAPIController::updateDebt/$1');
        $routes->post('Investments/Update/(:num)','WalletsAPIController::updateInvestment/$1');
        $routes->post('Crypto/Update/(:num)',    'WalletsAPIController::updateCrypto/$1');

        // Plaid Integration Links
        $routes->get('Plaid/Config-Debug', 'WalletsAPIController::plaidConfigDebug');
        $routes->get('Plaid/Env', 'WalletsAPIController::plaidEnv');
        $routes->get('Plaid/OAuth-Return', 'WalletsAPIController::plaidOAuthReturn');
        $routes->get('Plaid/Webhook', 'WalletsAPIController::plaidWebhook');
        $routes->get('Plaid/Link-Token', 'WalletsAPIController::plaidLinkToken');
        $routes->post('Plaid/Exchange', 'WalletsAPIController::plaidExchange');
        $routes->post('Plaid/Refresh/(:num)', 'WalletsAPIController::refreshPlaidWallet/$1');
        $routes->post('Plaid/Sync-Transactions/(:num)', 'WalletsAPIController::syncPlaidTransactions/$1');

        $routes->get('/(:segment)/(:segment)', 'WalletsAPIController::index/$1/$2');

    });

    $routes->group('User', function($routes) {
        $routes->match(['GET', 'POST'], 'Comments/Add', 'UserAPIController::addComment');
    });

    // Backwards-compatible alias for pluralized /API/Users path surface.
    $routes->group('Users', function($routes) {
        $routes->match(['GET', 'POST'], 'Comments/Add', 'UserAPIController::addComment');
    });
});

// // Alerts-related public APIs
// $routes->group('Alerts', function ($routes) {
//     $routes->get('fetchMarketAuxNews/(:segment)', 'AlertsAPIController::fetchMarketAuxNews/$1');
// });

$routes->group('Blog', ['namespace' => 'App\Modules\Blog\Controllers'],  function($routes) {
    $routes->get('/', 'BlogController::index'); // Landing Page
    $routes->get('Post/(:segment)', 'BlogController::viewBlog/$1'); // Dynamic Blog Post View

    $routes->group('Earnings', function($routes) {
        $routes->get('/', 'EarningsController::index');
        $routes->get('Test', 'EarningsController::test');
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
        $routes->get('/', 'NewsAndUpdates::index');
        $routes->get('Integrating-With-Plaid', 'NewsAndUpdates::IntegratingWithPlaid');
        $routes->get('The-Roadmap-To-The-Future-Of-Finance', 'NewsAndUpdates::TheRoadmapToTheFutureOfFinance');
    });
    $routes->group('Personal-Budgeting', function($routes) {
        $routes->get('/', 'PersonalBudgetingController::index');
        $routes->get('The-Importance-of-Personal-Financial-Budgeting', 'PersonalBudgetingController::TheImportanceOfPersonalFinancialBudgeting');
    });

    $routes->get('(:segment)/(:segment)', 'BlogController::view/$1/$2');
    $routes->get('(:segment)', 'BlogController::view/$1');
});
$routes->get('index.php/Blog', static fn() => redirect()->to(site_url('Blog'), 301));
$routes->get('index.php/Blog/(:segment)', static fn($slug) => redirect()->to(site_url('Blog/' . $slug), 301));
$routes->get('index.php/Blog/(:segment)/(:segment)', static fn($a, $b) => redirect()->to(site_url('Blog/' . $a . '/' . $b), 301));

// Dashboard
$routes->group('Dashboard', ['namespace' => 'App\Modules\User\Controllers', 'filter' => ['login', 'noStore']], function($routes) {
    $routes->get('/', 'DashboardController::index', ['as' => 'dashboard']);
    // Backward-compatible alias for legacy singular path
    $routes->addRedirect('PropFirm', 'PropFirms', 302);
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
    $routes->get('continue-setup-modal', 'DashboardController::continueSetupModal', ['as' => 'continue-setup-modal']);
    $routes->post('setup/dismiss', 'DashboardController::dismissSetup', ['as' => 'setup-dismiss']);
    $routes->get('onboarding/progress', 'OnboardingWalkthroughController::progress', ['as' => 'onboarding-progress']);
    $routes->post('onboarding/profile', 'OnboardingWalkthroughController::saveProfile', ['as' => 'onboarding-save-profile']);
    $routes->post('onboarding/budget-income', 'OnboardingWalkthroughController::saveBudgetIncome', ['as' => 'onboarding-save-income']);
    $routes->post('onboarding/credit-debt', 'OnboardingWalkthroughController::saveCreditDebt', ['as' => 'onboarding-save-credit-debt']);
    $routes->post('onboarding/recurring-expense', 'OnboardingWalkthroughController::saveRecurringExpense', ['as' => 'onboarding-save-recurring']);
    $routes->post('onboarding/watchlist', 'OnboardingWalkthroughController::saveWatchlist', ['as' => 'onboarding-save-watchlist']);
    $routes->post('onboarding/source-welcome/complete', 'OnboardingWalkthroughController::completeSourceWelcome', ['as' => 'onboarding-complete-source-welcome']);
    $routes->post('account-completion/dismiss', 'OnboardingWalkthroughController::dismissAccountCompletion', ['as' => 'account-completion-dismiss']);
});

$routes->group('Management', ['namespace' => 'App\Modules\Management\Controllers'],  function($routes) {
    $routes->get('/', 'ManagementAdminController::index');
    $routes->get('banUnverifiedUsers', 'ManagementAdminController::banUnverifiedUsers');
    $routes->get('processQueuedEmails', 'ManagementAdminController::processQueuedEmails');
    $routes->get('resendActivationEmailsBatch', 'ManagementAdminController::resendActivationEmailsBatch');
    $routes->get('resendActivationEmailsBatchQueued', 'ManagementAdminController::resendActivationEmailsBatchQueued');
    $routes->get('sendTestActivationEmail', 'ManagementAdminController::sendTestActivationEmail');
    $routes->post('saveSuggestion', 'ManagementAdminController::saveSuggestion');
    $routes->get('Signals', 'SignalsAdminController::index');
    $routes->get('AiOps', 'AiOpsManagementAdminController::index', ['filter' => 'permission:admin.access']);
    $routes->get('Ops', 'OpsAdminController::index', ['filter' => 'permission:admin.access']);
    $routes->get('Ops/ajaxStatus', 'OpsAdminController::ajaxStatus', ['filter' => 'permission:admin.access']);
    $routes->post('Ops/ajaxDispatch', 'OpsAdminController::ajaxDispatch', ['filter' => 'permission:admin.access']);
    $routes->group('AccountRescue', ['filter' => 'permission:admin.access'], function($routes) {
        $routes->get('/', 'AccountRescueAdminController::index');
        $routes->post('lookup', 'AccountRescueAdminController::lookup');
        $routes->post('resend-activation', 'AccountRescueAdminController::resendActivation');
        $routes->post('manual-activate', 'AccountRescueAdminController::manualActivate');
        $routes->post('force-password-reset', 'AccountRescueAdminController::forcePasswordReset');
        $routes->post('unlock-account', 'AccountRescueAdminController::unlockAccount');
    });
    $routes->group('Admin', function($routes) {
        $routes->get('/', 'ManagementAdminController::index');
        $routes->get('Chat', 'ChatAdminController::index', ['filter' => 'permission:admin.access']);
        $routes->post('Chat/submit', 'ChatAdminController::submit', ['filter' => 'permission:admin.access']);
        $routes->get('Chat/history', 'ChatAdminController::history', ['filter' => 'permission:admin.access']);
    });
    $routes->group('Alerts', function($routes) {
        $routes->get('/', 'AlertsAdminController::index');
        $routes->get('Add/(:segment)', 'AlertsAdminController::add');
        $routes->get('addTradeAlert', 'AlertsAdminController::addTradeAlert');
        $routes->get('Advisor/Media', 'AlertsAdminController::advisorMedia');
        $routes->post('Generate-Advisor-Package', 'AlertsAdminController::generateAdvisorPackage', ['filter' => 'auth']);
        $routes->get('Crypto/(:segment)/(:segment)', 'Management\AlertsAdminController::stockOverview/$1/$2');
        $routes->match(['GET', 'POST'], 'Audit/Emails', 'AlertsAdminController::auditEmailScraper');
        $routes->get('fetchData', 'AlertsAdminController::fetchData');
        $routes->get('Fetch/Ticker/(:segment)', 'AlertsAdminController::fetchTickerDetails/$1');
        $routes->get('Import/Tickers', 'AlertsAdminController::importTickers');
        $routes->get('Stock/(:segment)/(:segment)', 'Management\AlertsAdminController::stockOverview/$1/$2');
        $routes->get('Tasks/fetchAlerts', 'Management\AlertsAdminController::fetchData');
        $routes->get('Submit/TradingView', 'AlertsAdminController::submitTradingView');
        $routes->get('Test', 'AlertsAdminController::test');
        $routes->get('Test-Alert-Email', 'AlertsAdminController::testEmail');
        $routes->get('Test-Email', 'AlertsAdminController::sendTestEmail');
        $routes->get('Trades', 'AlertsAdminController::trades');
        $routes->get('Top-Performance/Weekly', 'AlertsAdminController::topPerformanceWeekly');
        $routes->get('weeklyTopPerformance', 'AlertsAdminController::topPerformanceWeekly');
    });
    $routes->group('Assets', function($routes) {
        $routes->get('/', 'AssetsAdminController::index');
    });
    $routes->group('Budgets', function($routes) {
        $routes->get('/', 'BudgetsAdminController::index');
    });
    $routes->group('Budgeting', function($routes) {
        $routes->get('/', 'BudgetingAdminController::index');
    });   
    $routes->group('Development', function($routes) {
        $routes->get('/', 'DevelopmentAdminController::index');
    });
    $routes->group('Discord', function($routes) {  
        $routes->get('/', 'DiscordAdminController::index');
        $routes->post('Channels/Save', 'DiscordAdminController::saveDiscordChannel');
        $routes->post('Channels/Delete', 'DiscordAdminController::deleteDiscordChannel');
        $routes->post('Templates/Save', 'DiscordAdminController::saveDiscordTemplate');
        $routes->post('Templates/Delete', 'DiscordAdminController::deleteDiscordTemplate');
        $routes->post('Subscriptions/Save', 'DiscordAdminController::saveDiscordSubscription');
        $routes->post('Subscriptions/Delete', 'DiscordAdminController::deleteDiscordSubscription');
        $routes->post('Policies/Save', 'DiscordAdminController::saveDiscordPolicy');
        $routes->post('Policies/Delete', 'DiscordAdminController::deleteDiscordPolicy');
    });
    $routes->group('Drip-Campaigns', function($routes) {
        $routes->get('/', 'DripCampaignAdminController::index');
        $routes->match(['GET', 'POST'], 'Create', 'DripCampaignAdminController::create');
        $routes->get('(:num)/Steps', 'DripCampaignAdminController::viewSteps/$1');
        $routes->match(['GET', 'POST'], '(:num)/Steps/Add', 'DripCampaignAdminController::addStep/$1');
    });
    $routes->group('Email', function($routes) {
        $routes->get('/', 'EmailAdminController::index');
        $routes->post('addMember', 'EmailAdminController::addMember');
        $routes->get('autoScheduleDrafts', 'EmailAdminController::autoScheduleDrafts');
        $routes->get('autoScheduleLogs', 'EmailAdminController::autoScheduleLogs');
        $routes->get('campaigns', 'EmailAdminController::campaigns');
        $routes->get('campaignStats/(:num)', 'EmailAdminController::campaignStats/$1');
        $routes->post('createList', 'EmailAdminController::createList');
        $routes->get('editCampaign/(:num)', 'EmailAdminController::editCampaign/$1');
        $routes->get('previewQueuedEmail/(:num)', 'EmailAdminController::previewQueuedEmail/$1');
        $routes->get('queued', 'EmailAdminController::queued');
        $routes->post('sendCampaign', 'EmailAdminController::sendCampaign');
        $routes->post('scheduleCampaign/(:num)', 'EmailAdminController::scheduleCampaign/$1');
        $routes->post('scheduleCampaignSubmit/(:num)', 'EmailAdminController::scheduleCampaignSubmit/$1');
        $routes->post('updateCampaign/(:num)', 'EmailAdminController::updateCampaign/$1');
    });
    $routes->group('ErrorOps', function($routes) {
        $routes->get('/', 'ErrorOpsController::index');
        $routes->get('apiKpis', 'ErrorOpsController::apiKpis');
        $routes->get('apiTopControllers', 'ErrorOpsController::apiTopControllers');
        $routes->get('apiHeatmap', 'ErrorOpsController::apiHeatmap');
        $routes->get('apiPatterns', 'ErrorOpsController::apiPatterns');
    });
    $routes->group('Exchange', function($routes) {
        $routes->get('/', 'ExchangeAdminController::index');
    }); 
    $routes->group('Finance', function($routes) {
        $routes->get('/', 'FinanceAdminController::index');
    });
    $routes->group('How-Tos', function($routes) {
        $routes->get('/', 'HowTosAdminController::index');
        $routes->get('Employees/Account-Setup', 'HowTosAdminController::employeeAccountSetup');
        $routes->get('Employees/Email-Setup', 'HowTosAdminController::employeeEmailSetup');
    }); 
    $routes->group('HR', function($routes) {
        $routes->get('/', 'HRAdminController::index');
    });
    $routes->group('Investments', function($routes) {
        $routes->get('/', 'InvestmentsAdminController::index');
        $routes->get('News', 'InvestmentsAdminController::newsIndex');
    });
    $routes->group('Marketing', function($routes) {
        $routes->get('/', 'MarketingAdminController::index');
        $routes->match(['GET', 'POST'], 'Add/(:segment)', 'MarketingAdminController::add/$1');
        // $routes->get('Add/(:segment)', 'MarketingAdminController::addSchedule');
        $routes->match(['POST'], 'Add-Subscriber', 'MarketingAdminController::addSubscriber');
        $routes->get('Approve-Content/(:num)', 'MarketingAdminController::approveContent/$1');
        $routes->get('Blog-Creator', 'MarketingAdminController::blogCreator');
        $routes->get('Blogs', 'MarketingAdminController::blogs');
        $routes->get('Campaigns', 'MarketingAdminController::campaigns');
        $routes->get('Content-Review', 'MarketingAdminController::contentReview');
        $routes->get('Content/Generator', 'MarketingAdminController::contentGenerator');
        $routes->get('Content-Studio', 'MarketingAdminController::contentStudio');
        $routes->get('Content/Listing', 'MarketingAdminController::contentListing');
        $routes->get('Daily-Log', 'MarketingAdminController::viewDailyLogs');
        $routes->get('Edit-Content/(:num)', 'MarketingAdminController::editContent/$1');
        $routes->get('Email/(:any)/(:any)', 'MarketingAdminController::viewEmail/$1/$2');
        $routes->get('fetchEmails', 'MarketingAdminController::fetchEmails'); 
        $routes->post('fetchMissingLogos', 'MarketingAdminController::fetchMissingLogos'); 
        $routes->get('Financial-News', 'MarketingAdminController::financialNews'); 
        $routes->post('generateAutomatedContent', 'MarketingAdminController::generateAutomatedContent');
        $routes->get('generateContent', 'MarketingAdminController::generateContent');
        $routes->get('generateDailyContentDigest', 'MarketingAdminController::generateDailyContentDigest');
        $routes->get('generateNewsletter', 'MarketingAdminController::generateNewsletterContent');
        $routes->get('getRecentScrapes', 'MarketingAdminController::getRecentScrapes'); 
        $routes->get('Grouped-Content-Drafts', 'MarketingAdminController::generateGroupedContentDrafts'); 
        $routes->get('Ideas', 'MarketingAdminController::ideas');
        $routes->get('Post-Creator', 'MarketingAdminController::postCreator');    
        $routes->get('previewGeneratedPost/(:num)', 'MarketingAdminController::previewGeneratedPost/$1');
        $routes->get('Promote', 'MarketingAdminController::promote'); 
        $routes->get('Promote/(:segment)', 'MarketingAdminController::promote'); 
        $routes->post('PublishBlog/(:num)', 'Management\MarketingAdminController::publishBlog/$1');
        $routes->get('Research', 'AlertsController::research');
        $routes->get('RunContentGeneration', 'Management\MarketingAdminController::runContentGeneration');
        $routes->get('Quick-Scraper', 'MarketingAdminController::standaloneScrape'); 
        $routes->get('Reject-Content/(:num)', 'MarketingAdminController::rejectContent/$1');
        $routes->post('Save-Content-Edit/(:num)', 'MarketingAdminController::saveContentEdit/$1');
        $routes->get('Schedule', 'MarketingAdminController::schedule'); 
        $routes->get('Schedule/(:segment)', 'MarketingAdminController::schedule/$1'); 
        $routes->get('scheduleNewsletters', 'MarketingAdminController::scheduleNewsletterCampaign'); 
        $routes->get('submitDailyLog', 'MarketingAdminController::submitDailyLog'); 
        $routes->post('Scrape-Link', 'MarketingAdminController::scrapeLink'); // Ensure this is a POST route
        $routes->get('sendNotification', 'MarketingAdminController::sendNotification');
        $routes->get('sendNewsletter', 'MarketingAdminController::sendScheduleNewsletter'); 
        $routes->get('Test', 'MarketingAdminController::test'); 
        $routes->get('Twitter', 'MarketingAdminController::twitterDashboard'); 
        $routes->get('Video-Creator', 'MarketingAdminController::videoCreator');
        $routes->get('View-Email/(:segment)/(:segment)', 'MarketingAdminController::viewEmail/$1/$2');
        $routes->get('View-Grouped-Summaries', 'MarketingAdminController::View-Grouped-Summaries');
        $routes->match(['GET', 'POST'], 'MyMI-Gold/Tasks/Add', 'WalletsAdminController::addUserGoldTasks');
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
    $routes->group('Operations', function($routes) {
        $routes->get('/', 'OperationsController::index');
    });
    // $routes->group('Support', function($routes) {
    //     $routes->get('/', 'SupportController::index');
    // });
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
        $routes->get('Fund', 'ProjectsAdminController::fundOverview');
        $routes->get('Fund/(:num)', 'ProjectsAdminController::fundOverview/$1');
        $routes->post('UpdateFundNAV', 'ProjectsAdminController::updateFundNAV');
        $routes->post('RecordFundDistribution', 'ProjectsAdminController::recordFundDistribution');
        $routes->post('SeedPrimaryFundProject', 'ProjectsAdminController::seedPrimaryFundProject');
        $routes->post('HideTestProjects', 'ProjectsAdminController::hideTestProjects');
        $routes->post('UpdateInvestorCompliance', 'ProjectsAdminController::updateInvestorCompliance');
        $routes->post('RecordFundCapitalFlow', 'ProjectsAdminController::recordFundCapitalFlow');
        $routes->get('ValidateFundIntegrity', 'ProjectsAdminController::validateFundIntegrity');
        $routes->get('ValidateFundIntegrity/(:num)', 'ProjectsAdminController::validateFundIntegrity/$1');
        $routes->get('ReconcileFundExchange/(:num)', 'ProjectsAdminController::reconcileFundExchange/$1');
        $routes->post('RegisterFundExchangeAsset/(:num)', 'ProjectsAdminController::registerFundExchangeAsset/$1');
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
    $routes->group('Users', function($routes) {
        $routes->get('/', 'UsersController::index');
        $routes->get('Profile/(:segment)', 'UsersController::profile');
        $routes->match(['GET', 'POST'], 'ajaxBlockUser/(:segment)', 'UsersController::ajaxBlockUser');
        $routes->match(['GET', 'POST'], 'ajaxBulkBanUsers', 'UsersController::ajaxBulkBanUsers');
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

$routes->group('Ops', ['namespace' => 'App\Modules\Ops\Controllers'], function($routes) {
    $routes->get('', 'OpsDashboardController::index');
    $routes->get('projects', 'OpsDashboardController::projects');
    $routes->post('projects/save', 'OpsDashboardController::saveProject');
    $routes->get('subprojects', 'OpsDashboardController::subprojects');
    $routes->post('subprojects/save', 'OpsDashboardController::saveSubproject');
    $routes->get('tasks', 'OpsDashboardController::tasks');
    $routes->post('tasks/save', 'OpsDashboardController::saveTask');
    $routes->post('import/xlsx', 'OpsDashboardController::importXlsx');
    $routes->get('export/tasks.csv', 'OpsDashboardController::exportTasksCsv');
    $routes->get('export/workbook.xlsx', 'OpsDashboardController::exportWorkbookXlsx');

});
$routes->group('Search', ['namespace' => 'App\Modules\APIs\Controllers'], function($routes) {
    $routes->get('/', 'SearchController::index');
});

// Advisor
$routes->group('Advisor', ['filter' => 'login'], function($routes) {
    $routes->match(['GET', 'POST'], '/', [AdvisorController::class, 'index']);
});

// Advisors
$routes->group('Advisors', ['filter' => 'login'], function($routes) {
    $routes->match(['GET', 'POST'], '/', [AdvisorController::class, 'index']);
});

// Alerts:
$routes->group('Alerts', ['namespace' => 'App\Modules\User\Controllers', 'filter' => 'login'], function($routes) {
    $routes->match(['GET', 'POST'], '/', 'AlertsController::index');
    $routes->match(['GET', 'POST'], '/Trades', 'AlertsController::trades');
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
$routes->group('Budget', ['namespace' => 'App\Modules\User\Controllers', 'filter' => ['login', 'noStore']], function($routes) {
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
    // Add other necessary route definitions here
});

// MyMI Exchanges 
$routes->group('Exchange', ['namespace' => 'App\Modules\Exchange\Controllers', 'filter' => 'login'], function($routes) {
    $routes->get('', 'ExchangeController::index', ['as' => 'mymi-exchange']);
    $routes->get('Projects/(:any)', 'ExchangeController::project/$1');
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
$routes->group('', ['namespace' => 'App\Modules\User\Controllers', 'filter' => 'login'], static function($routes) {
    $routes->match(['GET', 'POST'], 'My-Investments', 'InvestmentsController::index');
    $routes->match(['GET', 'POST'], 'My-Trades', 'InvestmentsController::index');
});

// Investments:
$routes->group('Investments', ['namespace' => 'App\Modules\User\Controllers', 'filter' => 'login'], function($routes) {
    $routes->match(['GET', 'POST'], '/', 'InvestmentsController::index');
    $routes->get('forecastModal/(:segment)', 'InvestmentsController::forecastModal/$1');
    $routes->post('Account-Manager', 'InvestmentsController::accountManager'); // Account Manager to handle adding, editing, deleting Investments Records to/from Database
    $routes->match(['GET', 'POST'], 'Add', 'InvestmentsController::add'); // Add New Investment Records to Database
    $routes->match(['GET', 'POST'], 'Add/(:segment)', 'InvestmentsController::add'); // Add New Investment Records to Database
    $routes->match(['GET', 'POST'], 'Autosave', 'InvestmentsController::autoSave');
    $routes->match(['GET', 'POST'], 'Overview', 'InvestmentsController::overview');
    $routes->get('Trade-Tracker', 'InvestmentsController::tradeTracker');
    $routes->match(['GET', 'POST'], 'Retirement', 'InvestmentsController::retirement');
    $routes->match(['GET', 'POST'], 'Save', 'InvestmentsController::save'); // Save Investment Record Data to Database
    $routes->match(['GET', 'POST'], 'Services', 'InvestmentsController::services');
    $routes->match(['GET', 'POST'], 'Squeezes', 'InvestmentsController::squeezes');
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
    $routes->delete('Goals/(:num)', 'InvestmentController::deleteGoal/$1'); 

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
$routes->group('Predictions', ['namespace' => 'App\Modules\User\Controllers'], static function($routes) {
    $routes->get('/', 'PredictionsController::index');
    $routes->get('Markets', 'PredictionsController::markets');
    $routes->get('Market/(:num)', 'PredictionsController::view/$1');
    $routes->get('Portfolio', 'PredictionsController::portfolio');
    $routes->get('Settlements', 'PredictionsController::settlements');
    $routes->post('PlaceOrder', 'PredictionsController::placeOrder');     // POST
    $routes->post('CancelOrder', 'PredictionsController::cancelOrder');   // POST
});

// ===== Projects (User) =====
$routes->group('Projects', ['namespace' => 'App\Modules\User\Controllers'], static function($routes) {
    $routes->get('/', 'ProjectsController::index');
    $routes->get('View/(:num)', 'ProjectsController::view/$1');
    $routes->post('Commit/(:num)', 'ProjectsController::commit/$1');
    $routes->post('Withdraw-Commit/(:num)', 'ProjectsController::withdrawCommit/$1');
    $routes->get('My/Commitments', 'ProjectsController::myCommitments');
    $routes->post('Request-Monthly-Withdrawal/(:num)', 'ProjectsController::requestMonthlyWithdrawal/$1');
    $routes->post('Accept-Private-Allocation/(:num)', 'ProjectsController::acceptPrivateAllocation/$1');
    $routes->get('Fund', 'ProjectsController::fund');
    $routes->get('Fund/(:num)', 'ProjectsController::fund/$1');
    $routes->post('PurchaseFundUnits', 'ProjectsController::purchaseFundUnits');
}); 

// Blog:
$routes->group('Announcements', ['namespace' => 'App\Modules\Blog\Controllers'], function($routes) {
    $routes->get('/', 'AnnouncementsController::index');
    // Define other routes for 'blog' module
});


// Legacy route compatibility aliases for logged errors
$routes->group('', ['namespace' => 'App\Modules\Management\Controllers'], static function($routes) {
    $routes->get('Assets', 'AssetsController::index', ['filter' => 'login']);
});
$routes->group('', ['namespace' => 'App\Modules\ScriptStudio\Controllers'], static function($routes) {
    $routes->get('Marketplace', 'ScriptStudioController::marketplace');
});
$routes->group('API/Investments', ['namespace' => 'App\Modules\User\Controllers'], static function($routes) {
    $routes->get('GetUserWatchlist/(:segment)', 'InvestmentsController::getUserWatchlist/$1');
    $routes->get('Economy/latest', 'EconomyController::latest');
});

// Script Studio Module
$routes->group('ScriptStudio', ['namespace' => 'App\\Modules\\ScriptStudio\\Controllers'], function($routes) {
    $routes->get('/', 'ScriptStudioController::index');
    $routes->get('Marketplace', 'ScriptStudioController::marketplace');
    $routes->get('Create', 'ScriptStudioController::create');
    $routes->post('Store', 'ScriptStudioController::store');
    $routes->get('Edit/(:num)', 'ScriptStudioController::edit/$1');
    $routes->post('Update/(:num)', 'ScriptStudioController::update/$1');
    $routes->get('Preview/(:num)', 'ScriptStudioController::preview/$1');
    $routes->get('Export/(:num)/(:segment)', 'ScriptStudioController::export/$1/$2');
});

// Public: How It Works (new public views)
$routes->group('How-It-Works', ['namespace' => 'App\\Modules\\Blog\\Controllers'], static function ($routes) {
    $routes->get('', 'HowItWorksController::index');

    $routes->get('Daily-Financial-News', 'HowItWorksController::DailyFinancialNews');
    $routes->get('Investing', 'HowItWorksController::InvestmentPortfolioManagement');
    $routes->get('Investment-Portfolio-Management', 'HowItWorksController::InvestmentPortfolioManagement');
    $routes->get('MyMI-Gold', 'HowItWorksController::MyMIGold');
    $routes->get('What-Is-MyMI-Gold', 'HowItWorksController::MyMIGold');
    $routes->get('Personal-Budgeting', 'HowItWorksController::PersonalBudgeting');
    $routes->get('Purchase-MyMI-Gold', 'HowItWorksController::PurchaseMyMIGold');
    $routes->get('Setting-Financial-Goals', 'HowItWorksController::SettingFinancialGoals');
    $routes->get('crypto', 'HowItWorksController::show/crypto');
    $routes->get('alerts', 'HowItWorksController::show/alerts');
    $routes->get('projects', 'HowItWorksController::show/projects');
    $routes->get('security', 'HowItWorksController::show/security');
    $routes->get('pricing', 'HowItWorksController::show/pricing');

    // Catch-all MUST be last
    $routes->get('(:segment)', 'HowItWorksController::show/$1');
});

// Legacy API aliases for external callers that still hit exact historical paths.
$routes->group('API', ['namespace' => 'App\\Modules\\APIs\\Controllers'], static function ($routes) {
    $routes->match(['GET', 'POST'], 'Alerts/fetchEmailAlerts', 'AlertsAPIController::fetchEmailAlerts');
    $routes->match(['GET', 'POST'], 'Management/Run-CRON-Tasks', 'ManagementAPIController::Run_CRON_Tasks', ['filter' => 'cronKey']);
    $routes->match(['GET', 'POST'], 'management/run-cron-tasks', 'ManagementAPIController::Run_CRON_Tasks', ['filter' => 'cronKey']);
});

// Customer Support:
$routes->group('Support', ['namespace' => 'App\Modules\Support\Controllers'], function($routes) {
    $routes->get('ticket/(:num)', 'SupportTicketController::show/$1');
    $routes->get('/', 'SupportController::index');
    $routes->get('Account', 'AccountSupportController::index');
    $routes->post('resendActivation', 'AccountSupportController::resendActivation');
    $routes->post('sendPasswordReset', 'AccountSupportController::sendPasswordReset');
    $routes->get('Article/(:segment)', 'SupportController::article/$1');
    $routes->get('Article', 'SupportController::article');
    $routes->get('Discord', 'SupportController::discordOnboarding');
    $routes->get('FAQ', 'SupportController::view/FAQ');
    $routes->get('Feedback', 'SupportController::view/Feedback');
    $routes->get('Test', 'SupportController::view/Test');
    $routes->get('Test-Email', 'SupportController::view/Test-Email');
    $routes->get('(:any)', 'SupportController::view/$1');
});

$routes->get('help/account', 'App\\Modules\\Support\\Controllers\\AccountSupportController::index');

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
$routes->group('Wallets', ['namespace' => 'App\Modules\User\Controllers', 'filter' => ['login', 'noStore']], function($routes) {
    $routes->get('/', 'WalletsController::index', ['as' => 'wallets.index']);
    $routes->match(['GET', 'POST'], 'All', 'WalletsController::all', ['as' => 'wallets.all']);
    $routes->match(['GET', 'POST'], 'Account-Manager', 'WalletsController::accountManager', ['as' => 'wallets.account-manager']);
    $routes->match(['GET', 'POST'], 'Add', 'WalletsController::add', ['as' => 'wallets.add']);
    $routes->match(['GET', 'POST'], 'Add/(:segment)', 'WalletsController::add/$1', ['as' => 'wallets.add.segment']);
    $routes->match(['GET', 'POST'], 'Add/(:segment)/(:segment)', 'WalletsController::addFetch/$1/$2', ['as' => 'wallets.add.segment.segment']);
    $routes->match(['GET', 'POST'], 'Add/Bank-Account', 'WalletsController::createBankeAccount', ['as' => 'wallets.add.bank-account']);
    $routes->match(['GET', 'POST'], 'Attach-Account', 'WalletsController::attachAccount', ['as' => 'wallets.attach-account']);
    $routes->match(['GET', 'POST'], 'Attach-Account/(:segment)/(:segment)/(:segment)', 'WalletsController::attachAccount/$1/$2/$3', ['as' => 'wallets.attach-account.segment.segment.segment']);
    $routes->match(['GET', 'POST'], 'Bank', 'WalletsController::bank', ['as' => 'wallets.bank']);
    $routes->match(['GET', 'POST'], 'Banking', 'WalletsController::banking', ['as' => 'wallets.banking']);
    $routes->match(['GET', 'POST'], 'Banking/Add/Account/(:segment)', 'WalletsController::add', ['as' => 'wallets.banking.add.account.segment']);
    $routes->match(['GET', 'POST'], 'Banking/(:segment)', 'WalletsController::addAccount', ['as' => 'wallets.banking.segment']);
    $routes->match(['GET', 'POST'], 'Banking/Details/(:segment)', 'WalletsController::details/$1', ['as' => 'wallets.banking.details.segment']);
    $routes->match(['GET', 'POST'], 'Credit/Details/(:segment)', 'WalletsController::details/$1', ['as' => 'wallets.credit.details.segment']);
    $routes->match(['GET', 'POST'], 'Debt/Details/(:segment)', 'WalletsController::details/$1', ['as' => 'wallets.debt.details.segment']);
    $routes->match(['GET', 'POST'], 'Investment/Details/(:segment)', 'WalletsController::details/$1', ['as' => 'wallets.investment.details.segment']);
    $routes->match(['GET', 'POST'], 'Crypto/Details/(:segment)', 'WalletsController::details/$1', ['as' => 'wallets.crypto.details.segment']);
    $routes->match(['GET', 'POST'], 'Delete/(:segment)/(:segment)', 'WalletsController::delete/$1/$2', [
        'as' => 'wallets.delete.type.id',
    ]);
    $routes->match(['GET', 'POST'], 'Banking/Edit/Account/(:segment)', 'WalletsController::editBankAccount/$1', ['as' => 'wallets.banking.edit.account.segment']);
    $routes->match(['GET', 'POST'], 'Checking', 'WalletsController::checking', ['as' => 'wallets.checking']);
    $routes->match(['GET', 'POST'], 'Credit/Edit/Account/(:segment)', 'WalletsController::editCreditAccount/$1');
    $routes->match(['GET', 'POST'], 'Crypto', 'WalletsController::crypto', ['as' => 'wallets.crypto']);
    $routes->match(['GET', 'POST'], 'Create', 'WalletsController::generateWallet', ['as' => 'wallets.create']); // Previously /Wallets/Address-Generator
    $routes->match(['GET', 'POST'], 'Credit', 'WalletsController::index', ['as' => 'wallets.credit']);
    $routes->match(['GET', 'POST'], 'Credit/Details/(:segment)', 'WalletsController::details/$1');
    $routes->match(['GET', 'POST'], 'Coin-Swap', 'WalletsController::coinSwap', ['as' => 'wallets.coin-swap']);
    $routes->match(['GET', 'POST'], 'Coin-Swap/(:segment)', 'WalletsController::coinSwap/$1', ['as' => 'wallets.coin-swap.segment']);
    $routes->match(['GET', 'POST'], 'Complete/Purchase', 'WalletsController::completePurchase', ['as' => 'wallets.complete.purchase']);
    $routes->match(['GET', 'POST'], 'Confirm-Deposit', 'WalletsController::confirmDeposit', ['as' => 'wallets.confirm.deposit']);
    $routes->match(['GET', 'POST'], 'Debt', 'WalletsController::debt', ['as' => 'wallets.debt']);
    $routes->match(['GET', 'POST'], 'Debt/Details/(:segment)', 'WalletsController::details/$1', ['as' => 'wallets.debt.details.segment']);
    $routes->match(['GET', 'POST'], 'Debt/Edit/Account/(:segment)', 'WalletsController::editDebtAccount/$1', ['as' => 'wallets.debt.edit.account.segment']);
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
    $routes->match(['GET', 'POST'], 'Investments', 'WalletsController::investments', ['as' => 'wallets.investments']);
    $routes->match(['GET', 'POST'], 'Investment/Details/(:segment)', 'WalletsController::details/$1', ['as' => 'wallets.investment.details']);
    $routes->match(['GET', 'POST'], 'Investment/Edit/Account/(:segment)', 'WalletsController::editInvestAccount/$1', ['as' => 'wallets.investment.edit']);
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
    $routes->get('/', 'FeaturesController::index');
    $routes->get('Brokerage-Integrations', 'FeaturesController::BrokerageIntegrations');
    $routes->get('Brokerage-Integration', 'FeaturesController::BrokerageIntegrations');
    $routes->get('MyMI-Gold', 'HowItWorks::MyMIGold');
    // Define other routes for 'blog' module
});

$routes->addRedirect('Features/Advanced-Investment-Portfoio-Manager', 'Features/Brokerage-Integrations', 301);
$routes->addRedirect('Premium-Features/Due-Diligence-Database', 'Features/Brokerage-Integrations', 301);
$routes->addRedirect('Premium-Features/Advanced-Charting', 'Features/Brokerage-Integrations', 301);
$routes->addRedirect('Premium-Features/Advanced-Trade-Tracker', 'Investments/Trade-Tracker', 301);
$routes->addRedirect('Premium-Features/Wallets', 'Wallets/Manager', 301);
$routes->addRedirect('Premium_Features/Brokerage-Integrations', 'Features/Brokerage-Integrations', 301);
$routes->addRedirect('User/Alerts', 'Alerts', 301);
$routes->addRedirect('Exchange/NASDAQ', 'Exchange/Projects/NASDAQ', 301);
$routes->addRedirect('Management/Alerts/share-template', 'Management/Alerts', 301);
$routes->addRedirect('How-To-Guides', 'Knowledgebase/Tutorials', 301);
$routes->addRedirect('Budget/Financial-Institute', 'Budget/Account-Manager', 301);
$routes->addRedirect('Budget/Financial-Advisors', 'Advisor', 301);
$routes->addRedirect('Investments/Reports', 'Investments/Trade-Tracker', 301);

$routes->group('Management', ['namespace' => 'App\Modules\Management\Controllers', 'filter' => 'role:admin,team'], function ($routes) {
    $routes->get('API', 'APIAdminController::index');
    $routes->get('API/(:segment)', 'APIAdminController::index');
    $routes->get('Docs', 'DocsAdminController::index');
    $routes->get('Docs/(:any)', 'DocsAdminController::browse/$1');
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
    $routes->get('(:any)', 'KnowledgebaseController::show/$1');
    // Define other routes for 'blog' module
});

// News And Updates:
// $routes->group('Blog/News-And-Updates', ['namespace' => 'App\Modules\Blog\Controllers'], function($routes) {
//     $routes->get('/', 'NewsAndUpdates::index');
//     $routes->get('Integrating-With-Plaid', 'NewsAndUpdates::IntegratingWithPlaid');
//     $routes->get('The-Roadmap-To-The-Future-Of-Finance', 'NewsAndUpdates::TheRoadmapToTheFutureOfFinance');
//     // Define other routes for 'blog' module
// });

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
        return service('response')
            ->setStatusCode(403)
            ->setBody(view('errors/html/error_403'));
    });

    $routes->get('test-404', function () {
        throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound('Page not found.');
    });

    $routes->get('test-500', function () {
        throw new \RuntimeException('Intentional 500 error for testing.');
    });

    $routes->get('test-504', function () {
        return service('response')
            ->setStatusCode(504)
            ->setBody(view('errors/html/error_504'));
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
$routes->group('API/Bitcoin', ['namespace' => 'App\Modules\APIs\Controllers'], static function($routes) {
    $routes->post('buildUnsignedPsbt', 'App\Modules\APIs\Controllers\BitcoinController::buildUnsignedPsbt');
    $routes->post('broadcastSignedTx', 'App\Modules\APIs\Controllers\BitcoinController::broadcastSignedTx');
});

$routes->group('API/Alerts', ['namespace' => 'App\\Modules\\APIs\\Controllers'], static function($routes) {
    $routes->match(['GET', 'POST'], 'processBrokerEmails', 'AlertsController::processBrokerEmails');
    $routes->match(['GET', 'POST'], 'processAllEmails', 'AlertsController::processAllEmails');
    $routes->get('previewScraper/(:num)', 'AlertsController::previewScraper/$1');
    $routes->get('scanner', 'AlertsAPIController::scanner');
});

$routes->group('system', static function($routes) {
    $routes->get('healthz', 'System\HealthController::healthz');
    $routes->get('diag',    'System\HealthController::diag');
});

$routes->get('Subscribe/Daily-Financial-News', static function () {
    return redirect()->to(site_url('Subscribe'));
});
$routes->get('Blog/Investing/(:any)', static function () {
    return redirect()->to(site_url('Blog/Investing'));
});


// Tax user module (nested under User module)
$routes->group('Tax', ['namespace' => 'App\\Modules\\User\\Tax\\Controllers', 'filter' => 'login'], static function ($routes) {
    $routes->get('/', 'Tax::index');
    $routes->match(['GET', 'POST'], 'create', 'Tax::create');
    $routes->get('edit/(:num)', 'Tax::edit/$1');
    $routes->get('view/(:num)', 'Tax::view/$1');
    $routes->get('preview/(:num)', 'Tax::preview/$1');
    $routes->post('ajax/saveLine', 'Tax::ajaxSaveLine');
    $routes->post('ajax/saveAllocation', 'Tax::ajaxSaveAllocation');
    $routes->get('ajax/recalc/(:num)', 'Tax::ajaxRecalc/$1');
    $routes->get('export/json/(:num)', 'Tax::exportJson/$1');
    $routes->get('export/csv/(:num)', 'Tax::exportCsv/$1');
});

// Tax admin module nested under Management
$routes->group('Admin/Tax', ['namespace' => 'App\\Modules\\Management\\TaxAdmin\\Controllers', 'filter' => 'login'], static function ($routes) {
    $routes->get('/', 'TaxConfig::index');
    $routes->get('Templates', 'TaxConfig::templates');
    $routes->match(['GET', 'POST'], 'Templates/edit/(:num)', 'TaxConfig::editTemplate/$1');
    $routes->match(['GET', 'POST'], 'Jurisdictions', 'TaxConfig::jurisdictions');
    $routes->get('Rates', 'TaxConfig::rates');
    $routes->match(['GET', 'POST'], 'Rates/create', 'TaxConfig::createRate');
    $routes->match(['GET', 'POST'], 'Rates/edit/(:num)', 'TaxConfig::editRate/$1');
});

$routes->group('API/Ops', ['namespace' => 'App\Modules\APIs\Controllers', 'filter' => 'internalToken'], static function ($routes) {
    $routes->get('healthcheck', 'App\Modules\Ops\Controllers\OpsController::healthcheck');
    $routes->post('app/update', 'App\Modules\Ops\Controllers\OpsController::appUpdate');
    $routes->get('commands', 'App\Modules\Ops\Controllers\OpsController::commands');

    $routes->post('public-pages/import', 'App\Modules\APIs\Controllers\OpsPublicPagesController::import');
    $routes->post('public-pages/run', 'App\Modules\APIs\Controllers\OpsPublicPagesController::run');
    $routes->get('public-pages/report', 'App\Modules\APIs\Controllers\OpsPublicPagesController::report');
});

$routes->group('API/AiOps', ['namespace' => 'App\Modules\APIs\Controllers', 'filter' => 'internalToken'], static function ($routes) {
    $routes->get('snapshot', 'App\Modules\AIOps\Controllers\AIOpsController::snapshot');
    $routes->get('gaps/docs', 'App\Modules\AIOps\Controllers\AIOpsController::docsGaps');
    $routes->post('watch', 'App\Modules\AIOps\Controllers\AIOpsController::watch');
});

$routes->group('API', ['namespace' => 'App\Modules\APIs\Controllers', 'filter' => 'internalToken'], static function ($routes) {
    $routes->get('Logs/summary', 'App\Modules\Logs\Controllers\LogsController::summary');
    $routes->post('ContentEngine/run', 'App\Modules\ContentEngine\Controllers\ContentEngineController::run');
    $routes->get('ContentEngine/drafts/(:segment)', 'App\Modules\ContentEngine\Controllers\ContentEngineController::draft/$1');
    $routes->get('Chat/health', 'App\Modules\Chat\Controllers\ChatController::health');
    $routes->get('Chat/usage', 'App\Modules\Chat\Controllers\ChatController::usage');
});

// Economic dashboard widget + cron endpoints
$routes->group('Dashboard/Economy', ['namespace' => 'App\Modules\User\Controllers'], static function($routes) {
    $routes->get('Widget', 'EconomyController::dashboardWidget', ['filter' => 'login']);
});
$routes->group('investments/economy', ['namespace' => 'App\Modules\User\Controllers'], static function($routes) {
    $routes->match(['GET', 'POST'], 'update_all', 'EconomyController::updateAll');
});
$routes->group('investments', ['namespace' => 'App\Modules\APIs\Controllers'], static function($routes) {
    $routes->get('fundamentals/(:segment)', 'InvestmentsAPIController::fundamentals/$1');
});

if (is_file(APPPATH . 'Modules/PropFirms/Config/Routes.php')) {
    require APPPATH . 'Modules/PropFirms/Config/Routes.php';
}
