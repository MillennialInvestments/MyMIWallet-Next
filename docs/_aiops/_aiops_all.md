# AIOps Full Report

**Generated:** 2026-04-01T00:22:15+00:00

## Executive Summary
- Errors detected: 250
- Routes discovered: 17
- Database tables: 354
- Command files: 416
- Command issues: 382
- Actions detected: 14
- Root controllers: 22
- Root models: 183
- Root services: 213
- Modules discovered: 24

## System
```json
{
    "php_version": "8.2.29",
    "php_sapi": "cli",
    "ci_version": "4.7.0",
    "environment": "development",
    "base_url": "https://www.mymiwallet.com/",
    "index_page": "index.php",
    "memory_limit": "512M",
    "max_execution_time": "0",
    "post_max_size": "16M",
    "upload_max_filesize": "25M",
    "timezone": "UTC",
    "csrf_enabled": true,
    "extensions": [
        "Core",
        "date",
        "libxml",
        "pcre",
        "sqlite3",
        "filter",
        "hash",
        "intl",
        "json",
        "mbstring",
        "SPL",
        "session",
        "PDO",
        "pdo_sqlite",
        "random",
        "Reflection",
        "standard",
        "mysqlnd",
        "bcmath",
        "bz2",
        "calendar",
        "ctype",
        "curl",
        "dh_php_ext",
        "dom",
        "exif",
        "fileinfo",
        "ftp",
        "gd",
        "gettext",
        "iconv",
        "imap",
        "mysqli",
        "openssl",
        "pcntl",
        "pdo_mysql",
        "zlib",
        "posix",
        "pspell",
        "sodium",
        "SimpleXML",
        "soap",
        "sockets",
        "tokenizer",
        "xml",
        "xmlreader",
        "xmlwriter",
        "xsl",
        "zip",
        "Phar",
        "imagick",
        "gmp",
        "Zend OPcache"
    ]
}
```

## Performance
```json
{
    "memory_usage_bytes": 25165824,
    "memory_peak_usage_bytes": 25165824,
    "execution_seconds": 5.3204,
    "included_files_count": 588
}
```

## Security
```json
{
    "csrf_protection": "cookie",
    "force_global_secure_requests": true,
    "session_driver": "CodeIgniter\\Session\\Handlers\\FileHandler",
    "cookie_secure": true
}
```

## Detected Errors
- **summary-2026-03-31.log** [pattern: 504] DEBUG --> [CSRF] token name=csrf_test_name hash=fd12e4a1504c011a1cd8af6f7f5a424b
- **summary-2026-03-31.log** [pattern: 500] DEBUG --> [REQ_ID=9c500f9832d4] [INIT] App\Controllers\AuthController::GET
- **summary-2026-03-31.log** [pattern: 404] INFO --> [REQ_ID=241173862ee3] [PERF] Execution time=0.040468
- **summary-2026-03-31.log** [pattern: 404] INFO --> [REQ_ID=1b897b16861a] [PERF] Execution time=0.040424
- **summary-2026-03-31.log** [pattern: 504] INFO --> [REQ_ID=6ef5c304de57] [PERF] Execution time=0.050417
- **summary-2026-03-31.log** [pattern: 500] INFO --> [REQ_ID=9c500f9832d4] [MEMORY][controller-start] 4194304
- **summary-2026-03-31.log** [pattern: 500] INFO --> [REQ_ID=9c500f9832d4] [PERF] Execution time=0.117900
- **summary-2026-03-31.log** [pattern: warning] LEVEL: WARNING (NEW)
- **summary-2026-03-31.log** [pattern: warning] WARNING --> MyMIWallets initialized without numeric user context.
- **summary-2026-03-31.log** [pattern: 404] ERROR --> [404_ROUTE]
- **summary-2026-03-31.log** [pattern: exception] CRITICAL --> [CSRF][EXCEPTION] The action you requested is not allowed.
- **summary-2026-03-30.log** [pattern: 404] DEBUG --> [REQ_ID=3526c5404443] [REQUEST][START] GET /index.php/
- **summary-2026-03-30.log** [pattern: 404] DEBUG --> [REQ_ID=3526c5404443] [FILTER_BEFORE] /index.php/
- **summary-2026-03-30.log** [pattern: 404] DEBUG --> [REQ_ID=3526c5404443] [ROUTE] Controller=\App\Controllers\Home Method=index
- **summary-2026-03-30.log** [pattern: 404] DEBUG --> [REQ_ID=3526c5404443] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
- **summary-2026-03-30.log** [pattern: 404] DEBUG --> [REQ_ID=3526c5404443] [FILTER_AFTER]
- **summary-2026-03-30.log** [pattern: 404] DEBUG --> [REQ_ID=3526c5404443] [LIFECYCLE][END] status=200 duration_ms=562.93 memory_delta=4194304
- **summary-2026-03-30.log** [pattern: 404] DEBUG --> [REQ_ID=3526c5404443] [REQUEST][END]
- **summary-2026-03-30.log** [pattern: 404] INFO --> [REQ_ID=079691c40491] [PERF] Execution time=0.046875
- **summary-2026-03-30.log** [pattern: 504] INFO --> [REQ_ID=2300d85048cb] [MEMORY][controller-start] 4194304
- **summary-2026-03-30.log** [pattern: 504] INFO --> [REQ_ID=2300d85048cb] [PERF] Execution time=0.025103
- **summary-2026-03-30.log** [pattern: 504] INFO --> [REQ_ID=f622399c036a] [PERF] Execution time=0.504449
- **summary-2026-03-30.log** [pattern: 504] INFO --> [REQ_ID=a5040e1ff306] [MEMORY][controller-start] 4194304
- **summary-2026-03-30.log** [pattern: 504] INFO --> [REQ_ID=a5040e1ff306] [MEMORY][commonData:start] 4194304
- **summary-2026-03-30.log** [pattern: 504] INFO --> [REQ_ID=a5040e1ff306] [PERF] Execution time=0.521534
- **summary-2026-03-30.log** [pattern: 404] INFO --> AlertsModel L404 - Alert updated successfully for ID 9368: Array
- **summary-2026-03-30.log** [pattern: 404] INFO --> AlertsModel L404 - Alert updated successfully for ID 7405: Array
- **summary-2026-03-30.log** [pattern: 404] INFO --> [REQ_ID=3526c5404443] [PERF] Execution time=0.602068
- **summary-2026-03-30.log** [pattern: warning] LEVEL: WARNING
- **summary-2026-03-30.log** [pattern: warning] WARNING --> [404] URI=https://www.mymiwallet.com/index.php/
- **summary-2026-03-30.log** [pattern: warning] WARNING --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
- **summary-2026-03-30.log** [pattern: warning] WARNING --> MyMIWallets initialized without numeric user context.
- **summary-2026-03-30.log** [pattern: warning] WARNING --> [404] URI=https://www.mymiwallet.com/index.php/How-It-Works/Automated-Financial-Insights
- **summary-2026-03-30.log** [pattern: warning] WARNING --> 404 route miss: https://www.mymiwallet.com/index.php/How-It-Works/Automated-Financial-Insights | referrer: none
- **summary-2026-03-30.log** [pattern: warning] WARNING --> [404] URI=https://www.mymiwallet.com/index.php/How-It-Works
- **summary-2026-03-30.log** [pattern: warning] WARNING --> 404 route miss: https://www.mymiwallet.com/index.php/How-It-Works | referrer: none
- **summary-2026-03-30.log** [pattern: warning] WARNING --> 404 route miss: https://www.mymiwallet.com/index.php/How-It-Works | referrer: https://www.mymiwallet.com/index.php/How-It-Works
- **summary-2026-03-30.log** [pattern: warning] WARNING --> 404 route miss: https://www.mymiwallet.com/index.php/How-It-Works/Automated-Financial-Insights | referrer: https://www.mymiwallet.com/index.php/How-It-Works/Automated-Financial-Insights
- **summary-2026-03-30.log** [pattern: warning] WARNING --> [404] URI=https://www.mymiwallet.com/index.php/How-It-Works/Investor-Profile
- **summary-2026-03-30.log** [pattern: warning] WARNING --> 404 route miss: https://www.mymiwallet.com/index.php/How-It-Works/Investor-Profile | referrer: https://www.mymiwallet.com/index.php/How-It-Works/Investor-Profile
- **summary-2026-03-30.log** [pattern: warning] WARNING --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: none
- **summary-2026-03-30.log** [pattern: 404] ERROR --> [ERROR_PAGE] event=error_404 status=404 message=Page not found.
- **summary-2026-03-30.log** [pattern: 500] ERROR --> [ERROR_PAGE] event=error_500 status=500 message=Internal server error.
- **summary-2026-03-30.log** [pattern: exception] CRITICAL --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
- **summary-2026-03-30.log** [pattern: exception] CRITICAL --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
- **summary-2026-03-30.log** [pattern: exception] CRITICAL --> ErrorException: Access level to App\Modules\User\Controllers\KnowledgebaseController::respondWithRendered() must be protected (as in class App\Controllers\BaseController) or weaker
- **summary-2026-03-30.log** [pattern: exception] CRITICAL --> [EXCEPTION] Access level to App\Modules\User\Controllers\KnowledgebaseController::respondWithRendered() must be protected (as in class App\Controllers\BaseController) or weaker File=/home/mymiteam/mymiwallet/site/current/app/Modules/User/Controllers/KnowledgebaseController.php Line=535
- **summary-2026-03-29.log** [pattern: 404] DEBUG --> [REQ_ID=0df0620c4047] [REQUEST][START] GET /index.php/API/Management/Run-CRON-Tasks
- **summary-2026-03-29.log** [pattern: 404] DEBUG --> [REQ_ID=0df0620c4047] [FILTER_BEFORE] /index.php/API/Management/Run-CRON-Tasks
- **summary-2026-03-29.log** [pattern: 404] DEBUG --> [REQ_ID=0df0620c4047] [ROUTE] Controller=\App\Modules\Management\Controllers\ManagementAPIController Method=Run_CRON_Tasks
- **summary-2026-03-29.log** [pattern: 404] DEBUG --> [REQ_ID=0df0620c4047] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Management/Run-CRON-Tasks
- **summary-2026-03-29.log** [pattern: 404] DEBUG --> [REQ_ID=0df0620c4047] [REQUEST][END]
- **summary-2026-03-29.log** [pattern: 404] DEBUG --> [REQ_ID=04a6160404fc] [REQUEST][START] HEAD /
- **summary-2026-03-29.log** [pattern: 500] DEBUG --> [REQ_ID=5001ed1bea6e] [REQUEST][START] HEAD /
- **summary-2026-03-29.log** [pattern: 504] DEBUG --> [CSRF] token name=csrf_test_name hash=c2ff858e7a1c82e6da504d26ba4c2574
- **summary-2026-03-29.log** [pattern: 404] INFO --> [REQ_ID=0df0620c4047] [PERF] Execution time=0.049851
- **summary-2026-03-29.log** [pattern: 504] INFO --> [REQ_ID=a3093bcb58f9] [PERF] Execution time=0.015044
- **summary-2026-03-29.log** [pattern: warning] LEVEL: WARNING
- **summary-2026-03-29.log** [pattern: warning] WARNING --> [404] URI=https://www.mymiwallet.com/index.php/
- **summary-2026-03-29.log** [pattern: warning] WARNING --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
- **summary-2026-03-29.log** [pattern: warning] WARNING --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: none
- **summary-2026-03-29.log** [pattern: warning] WARNING --> MyMIWallets initialized without numeric user context.
- **summary-2026-03-29.log** [pattern: warning] WARNING --> [AUTH] Password reset request: user not found
- **summary-2026-03-29.log** [pattern: warning] WARNING --> [REGISTRATION] Validation failed (password fields)
- **summary-2026-03-29.log** [pattern: exception] CRITICAL --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
- **summary-2026-03-29.log** [pattern: exception] CRITICAL --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
- **summary-2026-03-28.log** [pattern: 404] DEBUG --> [REQ_ID=27ef5adc2687] [LIFECYCLE][END] status=404 duration_ms=86.51 memory_delta=0
- **summary-2026-03-28.log** [pattern: 500] DEBUG --> [REQ_ID=5acb7dc5009e] [REQUEST][START] GET /
- **summary-2026-03-28.log** [pattern: 500] DEBUG --> [REQ_ID=5acb7dc5009e] [FILTER_BEFORE] /
- **summary-2026-03-28.log** [pattern: 500] DEBUG --> [REQ_ID=5acb7dc5009e] [ROUTE] Controller=\App\Controllers\Home Method=index
- **summary-2026-03-28.log** [pattern: 500] DEBUG --> [REQ_ID=5acb7dc5009e] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
- **summary-2026-03-28.log** [pattern: 500] DEBUG --> [REQ_ID=5acb7dc5009e] [FILTER_AFTER]
- **summary-2026-03-28.log** [pattern: 500] DEBUG --> [REQ_ID=5acb7dc5009e] [LIFECYCLE][END] status=200 duration_ms=712.43 memory_delta=4194304
- **summary-2026-03-28.log** [pattern: 500] DEBUG --> [REQ_ID=5acb7dc5009e] [REQUEST][END]
- **summary-2026-03-28.log** [pattern: 500] INFO --> [REQ_ID=5acb7dc5009e] [PERF] Execution time=0.730937
- **summary-2026-03-28.log** [pattern: warning] LEVEL: WARNING
- **summary-2026-03-28.log** [pattern: warning] WARNING --> [404] URI=https://www.mymiwallet.com/index.php/
- **summary-2026-03-28.log** [pattern: warning] WARNING --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
- **summary-2026-03-28.log** [pattern: warning] WARNING --> Premium access denied: feature=investments.analytics route=/index.php/API/Investments/getForecastAccuracySummary user_id=2 tier=free status=free
- **summary-2026-03-28.log** [pattern: warning] WARNING --> Premium access denied: feature=investments.analytics route=/index.php/API/Investments/getConfidenceHeatmap user_id=2 tier=free status=free
- **summary-2026-03-28.log** [pattern: warning] WARNING --> [DEPRECATED] number_format(): Passing null to parameter #1 ($num) of type float is deprecated in APPPATH/Modules/User/Views/Projects/view.php on line 52.
- **summary-2026-03-28.log** [pattern: warning] WARNING --> [DEPRECATED] number_format(): Passing null to parameter #1 ($num) of type float is deprecated in APPPATH/Modules/User/Views/Projects/view.php on line 53.
- **summary-2026-03-28.log** [pattern: warning] WARNING --> [404] URI=https://www.mymiwallet.com/index.php/Projects/fund
- **summary-2026-03-28.log** [pattern: warning] WARNING --> 404 route miss: https://www.mymiwallet.com/index.php/Projects/fund | referrer: none
- **summary-2026-03-28.log** [pattern: undefined] ERROR --> DashboardController::index failed to load executive summary: Call to undefined method CodeIgniter\Cache\Handlers\FileHandler::set()
- **summary-2026-03-28.log** [pattern: 404] ERROR --> [ERROR_PAGE] event=error_404 status=404 message=Page not found.
- **summary-2026-03-28.log** [pattern: exception] CRITICAL --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
- **summary-2026-03-28.log** [pattern: exception] CRITICAL --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
- **summary-2026-03-27.log** [pattern: 404] DEBUG --> [REQ_ID=70d0344045a0] [REQUEST][START] GET /index.php/API/Alerts/fetchEmailAlerts
- **summary-2026-03-27.log** [pattern: 404] DEBUG --> [REQ_ID=70d0344045a0] [FILTER_BEFORE] /index.php/API/Alerts/fetchEmailAlerts
- **summary-2026-03-27.log** [pattern: 404] DEBUG --> [REQ_ID=70d0344045a0] [ROUTE] Controller=\App\Modules\APIs\Controllers\AlertsAPIController Method=fetchEmailAlerts
- **summary-2026-03-27.log** [pattern: 404] DEBUG --> [REQ_ID=70d0344045a0] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Alerts/fetchEmailAlerts
- **summary-2026-03-27.log** [pattern: 404] DEBUG --> [REQ_ID=70d0344045a0] [REQUEST][END]
- **summary-2026-03-27.log** [pattern: 504] DEBUG --> [CSRF] token name=csrf_test_name hash=627b8c40e68da279906e5044f88442c4
- **summary-2026-03-27.log** [pattern: 404] INFO --> [REQ_ID=70d0344045a0] [PERF] Execution time=0.046722
- **summary-2026-03-27.log** [pattern: 504] INFO --> [REQ_ID=599e7714a804] [PERF] Execution time=0.068504
- **summary-2026-03-27.log** [pattern: 504] INFO --> [REQ_ID=4b56a6d10419] [PERF] Execution time=0.595045
- **summary-2026-03-27.log** [pattern: warning] LEVEL: WARNING
- **summary-2026-03-27.log** [pattern: warning] WARNING --> [404] URI=https://www.mymiwallet.com/index.php/
- **summary-2026-03-27.log** [pattern: warning] WARNING --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
- **summary-2026-03-27.log** [pattern: warning] WARNING --> MyMIWallets initialized without numeric user context.
- **summary-2026-03-27.log** [pattern: warning] WARNING --> [404] URI=https://www.mymiwallet.com/index.php/How-It-Works/MyMI-Wallets
- **summary-2026-03-27.log** [pattern: warning] WARNING --> 404 route miss: https://www.mymiwallet.com/index.php/How-It-Works/MyMI-Wallets | referrer: none
- **summary-2026-03-27.log** [pattern: 404] ERROR --> [ERROR_PAGE] event=error_404 status=404 message=Page not found.
- **summary-2026-03-27.log** [pattern: exception] CRITICAL --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
- **summary-2026-03-27.log** [pattern: exception] CRITICAL --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
- **summary-2026-03-27.log** [pattern: exception] CRITICAL --> ErrorException: Access level to App\Modules\User\Controllers\KnowledgebaseController::respondWithRendered() must be protected (as in class App\Controllers\BaseController) or weaker
- **summary-2026-03-27.log** [pattern: exception] CRITICAL --> [EXCEPTION] Access level to App\Modules\User\Controllers\KnowledgebaseController::respondWithRendered() must be protected (as in class App\Controllers\BaseController) or weaker File=/home/mymiteam/mymiwallet/site/current/app/Modules/User/Controllers/KnowledgebaseController.php Line=535
- **summary-2026-03-26.log** [pattern: 404] DEBUG --> [REQ_ID=b310e4041c55] [REQUEST][START] HEAD /
- **summary-2026-03-26.log** [pattern: 504] DEBUG --> [REQ_ID=d504f06e08d5] [REQUEST][START] HEAD /
- **summary-2026-03-26.log** [pattern: warning] LEVEL: WARNING
- **summary-2026-03-26.log** [pattern: warning] WARNING --> [404] URI=https://www.mymiwallet.com/index.php/
- **summary-2026-03-26.log** [pattern: warning] WARNING --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
- **summary-2026-03-26.log** [pattern: warning] WARNING --> MyMIWallets initialized without numeric user context.
- **summary-2026-03-26.log** [pattern: warning] WARNING --> [404] URI=https://www.mymiwallet.com/index.php/How-It-Works/Automated-Financial-Insights
- **summary-2026-03-26.log** [pattern: warning] WARNING --> 404 route miss: https://www.mymiwallet.com/index.php/How-It-Works/Automated-Financial-Insights | referrer: none
- **summary-2026-03-26.log** [pattern: warning] WARNING --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: none
- **summary-2026-03-26.log** [pattern: 500] ERROR --> [ERROR_PAGE] event=error_500 status=500 message=Internal server error.
- **summary-2026-03-26.log** [pattern: 404] ERROR --> [ERROR_PAGE] event=error_404 status=404 message=Page not found.
- **summary-2026-03-26.log** [pattern: exception] CRITICAL --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
- **summary-2026-03-26.log** [pattern: exception] CRITICAL --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
- **summary-2026-03-26.log** [pattern: exception] CRITICAL --> ErrorException: Access level to App\Modules\User\Controllers\KnowledgebaseController::respondWithRendered() must be protected (as in class App\Controllers\BaseController) or weaker
- **summary-2026-03-26.log** [pattern: exception] CRITICAL --> [EXCEPTION] Access level to App\Modules\User\Controllers\KnowledgebaseController::respondWithRendered() must be protected (as in class App\Controllers\BaseController) or weaker File=/home/mymiteam/mymiwallet/site/current/app/Modules/User/Controllers/KnowledgebaseController.php Line=535
- **summary-2026-03-25.log** [pattern: 404] DEBUG --> [REQ_ID=1a9540453012] [REQUEST][START] GET /
- **summary-2026-03-25.log** [pattern: 404] DEBUG --> [REQ_ID=1a9540453012] [FILTER_BEFORE] /
- **summary-2026-03-25.log** [pattern: 404] DEBUG --> [REQ_ID=1a9540453012] [ROUTE] Controller=\App\Controllers\Home Method=index
- **summary-2026-03-25.log** [pattern: 404] DEBUG --> [REQ_ID=1a9540453012] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
- **summary-2026-03-25.log** [pattern: 404] DEBUG --> [REQ_ID=1a9540453012] [FILTER_AFTER]
- **summary-2026-03-25.log** [pattern: 404] DEBUG --> [REQ_ID=1a9540453012] [LIFECYCLE][END] status=200 duration_ms=619.76 memory_delta=4194304
- **summary-2026-03-25.log** [pattern: 404] DEBUG --> [REQ_ID=1a9540453012] [REQUEST][END]
- **summary-2026-03-25.log** [pattern: 404] INFO --> [REQ_ID=b006cb1c6a06] [PERF] Execution time=0.654044
- **summary-2026-03-25.log** [pattern: 504] INFO --> [REQ_ID=b249fd21f733] [PERF] Execution time=0.504397
- **summary-2026-03-25.log** [pattern: 404] INFO --> [REQ_ID=1a9540453012] [PERF] Execution time=0.633840
- **summary-2026-03-25.log** [pattern: warning] LEVEL: WARNING
- **summary-2026-03-25.log** [pattern: warning] WARNING --> [404] URI=https://www.mymiwallet.com/index.php/
- **summary-2026-03-25.log** [pattern: warning] WARNING --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
- **summary-2026-03-25.log** [pattern: warning] WARNING --> MyMIWallets initialized without numeric user context.
- **summary-2026-03-25.log** [pattern: warning] WARNING --> [404] URI=https://www.mymiwallet.com/index.php/How-It-Works/overview
- **summary-2026-03-25.log** [pattern: warning] WARNING --> 404 route miss: https://www.mymiwallet.com/index.php/How-It-Works/overview | referrer: none
- **summary-2026-03-25.log** [pattern: warning] WARNING --> [404] URI=https://www.mymiwallet.com/index.php/How-It-Works/marketing
- **summary-2026-03-25.log** [pattern: warning] WARNING --> 404 route miss: https://www.mymiwallet.com/index.php/How-It-Works/marketing | referrer: none
- **summary-2026-03-25.log** [pattern: warning] WARNING --> [404] URI=https://www.mymiwallet.com/index.php/How-It-Works/earnings
- **summary-2026-03-25.log** [pattern: warning] WARNING --> 404 route miss: https://www.mymiwallet.com/index.php/How-It-Works/earnings | referrer: none
- **summary-2026-03-25.log** [pattern: warning] WARNING --> [404] URI=https://www.mymiwallet.com/index.php/How-It-Works/investments
- **summary-2026-03-25.log** [pattern: warning] WARNING --> 404 route miss: https://www.mymiwallet.com/index.php/How-It-Works/investments | referrer: none
- **summary-2026-03-25.log** [pattern: warning] WARNING --> [404] URI=https://www.mymiwallet.com/index.php/How-It-Works/account-settings
- **summary-2026-03-25.log** [pattern: warning] WARNING --> 404 route miss: https://www.mymiwallet.com/index.php/How-It-Works/account-settings | referrer: none
- **summary-2026-03-25.log** [pattern: warning] WARNING --> [404] URI=https://www.mymiwallet.com/index.php/How-It-Works/Investor-Profile
- **summary-2026-03-25.log** [pattern: warning] WARNING --> 404 route miss: https://www.mymiwallet.com/index.php/How-It-Works/Investor-Profile | referrer: none
- **summary-2026-03-25.log** [pattern: warning] WARNING --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: none
- **summary-2026-03-25.log** [pattern: 404] ERROR --> [ERROR_PAGE] event=error_404 status=404 message=Page not found.
- **summary-2026-03-25.log** [pattern: 500] ERROR --> [ERROR_PAGE] event=error_500 status=500 message=Internal server error.
- **summary-2026-03-25.log** [pattern: exception] CRITICAL --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
- **summary-2026-03-25.log** [pattern: exception] CRITICAL --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
- **summary-2026-03-25.log** [pattern: exception] CRITICAL --> ErrorException: Access level to App\Modules\User\Controllers\KnowledgebaseController::respondWithRendered() must be protected (as in class App\Controllers\BaseController) or weaker
- **summary-2026-03-25.log** [pattern: exception] CRITICAL --> [EXCEPTION] Access level to App\Modules\User\Controllers\KnowledgebaseController::respondWithRendered() must be protected (as in class App\Controllers\BaseController) or weaker File=/home/mymiteam/mymiwallet/site/current/app/Modules/User/Controllers/KnowledgebaseController.php Line=535
- **summary-2026-03-24.log** [pattern: 404] INFO --> [REQ_ID=4bdcc49694b5] [PERF] Execution time=0.040426
- **summary-2026-03-24.log** [pattern: warning] LEVEL: WARNING
- **summary-2026-03-24.log** [pattern: warning] WARNING --> [404] URI=https://www.mymiwallet.com/index.php/
- **summary-2026-03-24.log** [pattern: warning] WARNING --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
- **summary-2026-03-24.log** [pattern: 500] ERROR --> [ERROR_PAGE] event=error_500 status=500 message=Internal server error.
- **summary-2026-03-24.log** [pattern: exception] CRITICAL --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
- **summary-2026-03-24.log** [pattern: exception] CRITICAL --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
- **summary-2026-03-24.log** [pattern: exception] CRITICAL --> ErrorException: Access level to App\Modules\User\Controllers\KnowledgebaseController::respondWithRendered() must be protected (as in class App\Controllers\BaseController) or weaker
- **summary-2026-03-24.log** [pattern: exception] CRITICAL --> [EXCEPTION] Access level to App\Modules\User\Controllers\KnowledgebaseController::respondWithRendered() must be protected (as in class App\Controllers\BaseController) or weaker File=/home/mymiteam/mymiwallet/site/current/app/Modules/User/Controllers/KnowledgebaseController.php Line=535
- **summary-2026-03-23.log** [pattern: 500] DEBUG --> [REQ_ID=5f2e2d50069d] [REQUEST][START] HEAD /
- **summary-2026-03-23.log** [pattern: 500] DEBUG --> [REQ_ID=8bdfc1c1500d] [REQUEST][START] GET /
- **summary-2026-03-23.log** [pattern: 500] DEBUG --> [REQ_ID=8bdfc1c1500d] [REQUEST][END]
- **summary-2026-03-23.log** [pattern: 500] INFO --> [REQ_ID=f204db84ee4e] [PERF] Execution time=0.150061
- **summary-2026-03-23.log** [pattern: 500] INFO --> [REQ_ID=8bdfc1c1500d] [PERF] Execution time=0.038271
- **summary-2026-03-23.log** [pattern: 504] INFO --> [REQ_ID=49b375ad64a7] [PERF] Execution time=0.036504
- **summary-2026-03-23.log** [pattern: warning] LEVEL: WARNING
- **summary-2026-03-23.log** [pattern: warning] WARNING --> [404] URI=https://www.mymiwallet.com/index.php/
- **summary-2026-03-23.log** [pattern: warning] WARNING --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
- **summary-2026-03-23.log** [pattern: 500] ERROR --> [ERROR_PAGE] event=error_500 status=500 message=Internal server error.
- **summary-2026-03-23.log** [pattern: exception] CRITICAL --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
- **summary-2026-03-23.log** [pattern: exception] CRITICAL --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
- **summary-2026-03-23.log** [pattern: exception] CRITICAL --> ErrorException: Access level to App\Modules\User\Controllers\KnowledgebaseController::respondWithRendered() must be protected (as in class App\Controllers\BaseController) or weaker
- **summary-2026-03-23.log** [pattern: exception] CRITICAL --> [EXCEPTION] Access level to App\Modules\User\Controllers\KnowledgebaseController::respondWithRendered() must be protected (as in class App\Controllers\BaseController) or weaker File=/home/mymiteam/mymiwallet/site/current/app/Modules/User/Controllers/KnowledgebaseController.php Line=535
- **summary-2026-03-22.log** [pattern: 500] DEBUG --> [REQ_ID=500275ad2832] [REQUEST][START] GET /index.php/login
- **summary-2026-03-22.log** [pattern: 500] DEBUG --> [REQ_ID=500275ad2832] [FILTER_BEFORE] /index.php/login
- **summary-2026-03-22.log** [pattern: 500] DEBUG --> [REQ_ID=500275ad2832] [ROUTE] Controller=\App\Controllers\AuthController Method=login
- **summary-2026-03-22.log** [pattern: 500] DEBUG --> [REQ_ID=500275ad2832] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
- **summary-2026-03-22.log** [pattern: 504] DEBUG --> [CSRF] token name=csrf_test_name hash=cb6d3b22e646c1dca46aa95042de8fb0
- **summary-2026-03-22.log** [pattern: 500] DEBUG --> [REQ_ID=500275ad2832] [FILTER_AFTER]
- **summary-2026-03-22.log** [pattern: 500] DEBUG --> [REQ_ID=500275ad2832] [LIFECYCLE][END] status=200 duration_ms=38.75 memory_delta=0
- **summary-2026-03-22.log** [pattern: 500] DEBUG --> [REQ_ID=500275ad2832] [REQUEST][END]
- **summary-2026-03-22.log** [pattern: 504] DEBUG --> [REQ_ID=9320d3504423] [REQUEST][START] HEAD /
- **summary-2026-03-22.log** [pattern: 504] INFO --> [REQ_ID=c0a97ced8e43] [PERF] Execution time=0.066504
- **summary-2026-03-22.log** [pattern: 500] INFO --> [REQ_ID=356f7e731277] [PERF] Execution time=3.750075
- **summary-2026-03-22.log** [pattern: 504] INFO --> [REQ_ID=a04346350428] [PERF] Execution time=0.843441
- **summary-2026-03-22.log** [pattern: 404] INFO --> [REQ_ID=88674041e266] [PERF] Execution time=0.044699
- **summary-2026-03-22.log** [pattern: 500] INFO --> [REQ_ID=9e30b57131a1] [PERF] Execution time=1.647500
- **summary-2026-03-22.log** [pattern: 504] INFO --> [REQ_ID=a256504d08f0] [PERF] Execution time=27.369368
- **summary-2026-03-22.log** [pattern: 500] INFO --> [REQ_ID=9d5763bb02b9] [PERF] Execution time=0.050056
- **summary-2026-03-22.log** [pattern: 500] INFO --> [REQ_ID=500275ad2832] [PERF] Execution time=0.051058
- **summary-2026-03-22.log** [pattern: warning] LEVEL: WARNING
- **summary-2026-03-22.log** [pattern: warning] WARNING --> [404] URI=https://www.mymiwallet.com/index.php/
- **summary-2026-03-22.log** [pattern: warning] WARNING --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
- **summary-2026-03-22.log** [pattern: warning] WARNING --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: none
- **summary-2026-03-22.log** [pattern: warning] WARNING --> [404] URI=https://www.mymiwallet.com/index.php/Management/Alerts/weeklyTopPerformance?limit=10
- **summary-2026-03-22.log** [pattern: warning] WARNING --> 404 route miss: https://www.mymiwallet.com/index.php/Management/Alerts/weeklyTopPerformance?limit=10 | referrer: https://www.mymiwallet.com/index.php/Management/Alerts
- **summary-2026-03-22.log** [pattern: warning] WARNING --> Premium access denied: feature=alerts.trade_alerts route=/index.php/Alerts user_id=2 tier=free status=free
- **summary-2026-03-22.log** [pattern: warning] WARNING --> [ACTIVATION] Activation failed: missing token
- **summary-2026-03-22.log** [pattern: warning] WARNING --> MyMIWallets initialized without numeric user context.
- **summary-2026-03-22.log** [pattern: warning] WARNING --> Premium access denied: feature=investments.analytics route=/index.php/API/Investments/getConfidenceHeatmap user_id=2 tier=free status=free
- **summary-2026-03-22.log** [pattern: warning] WARNING --> Premium access denied: feature=investments.analytics route=/index.php/API/Investments/getForecastAccuracySummary user_id=2 tier=free status=free
- **summary-2026-03-22.log** [pattern: warning] WARNING --> [404] URI=https://www.mymiwallet.com/index.php/API/Budget/getUserBudgetRecords
- **summary-2026-03-22.log** [pattern: warning] WARNING --> 404 route miss: https://www.mymiwallet.com/index.php/API/Budget/getUserBudgetRecords | referrer: https://www.mymiwallet.com/index.php/Budget
- **summary-2026-03-22.log** [pattern: warning] WARNING --> [404] URI=https://www.mymiwallet.com/index.php/API/Budget/getUserCreditBalances
- **summary-2026-03-22.log** [pattern: warning] WARNING --> 404 route miss: https://www.mymiwallet.com/index.php/API/Budget/getUserCreditBalances | referrer: https://www.mymiwallet.com/index.php/Budget
- **summary-2026-03-22.log** [pattern: warning] WARNING --> [404] URI=https://www.mymiwallet.com/index.php/API/Budget/getUserRepaymentSummary
- **summary-2026-03-22.log** [pattern: warning] WARNING --> 404 route miss: https://www.mymiwallet.com/index.php/API/Budget/getUserRepaymentSummary | referrer: https://www.mymiwallet.com/index.php/Budget
- **summary-2026-03-22.log** [pattern: warning] WARNING --> [404] URI=https://www.mymiwallet.com/index.php/API/Budget/getUserAvailableBalances
- **summary-2026-03-22.log** [pattern: warning] WARNING --> 404 route miss: https://www.mymiwallet.com/index.php/API/Budget/getUserAvailableBalances | referrer: https://www.mymiwallet.com/index.php/Budget
- **summary-2026-03-22.log** [pattern: warning] WARNING --> Queue service is not initialized, processing tax liability synchronously.
- **summary-2026-03-22.log** [pattern: warning] WARNING --> Premium access denied: feature=investments.watchlist route=/index.php/API/Investments/GetUserWatchlist/2 user_id=2 tier=free status=free
- **summary-2026-03-22.log** [pattern: warning] WARNING --> Feature guard blocked request: FEATURE_WALLETS GET /index.php/Wallets
- **summary-2026-03-22.log** [pattern: warning] WARNING --> Feature guard blocked request: FEATURE_WALLETS GET /index.php/Wallets/Purchase/Memberships
- **summary-2026-03-22.log** [pattern: warning] WARNING --> Feature guard blocked request: FEATURE_WALLETS GET /index.php/Wallets/Purchase/Memberships/Basic
- **summary-2026-03-22.log** [pattern: warning] WARNING --> Feature guard blocked request: FEATURE_WALLETS GET /index.php/Wallets/Purchase/Memberships/Customize
- **summary-2026-03-22.log** [pattern: warning] WARNING --> [404] URI=https://www.mymiwallet.com/index.php/Wallets/Purchase/Memberships/Customize
- **summary-2026-03-22.log** [pattern: warning] WARNING --> 404 route miss: https://www.mymiwallet.com/index.php/Wallets/Purchase/Memberships/Customize | referrer: none
- **summary-2026-03-22.log** [pattern: warning] WARNING --> [REGISTRATION] Validation failed (basic fields)
- **summary-2026-03-22.log** [pattern: warning] WARNING --> Premium access denied: feature=investments.analytics route=/index.php/API/Investments/getConfidenceHeatmap user_id=11758 tier=free status=free
- **summary-2026-03-22.log** [pattern: warning] WARNING --> Premium access denied: feature=investments.analytics route=/index.php/API/Investments/getForecastAccuracySummary user_id=11758 tier=free status=free
- **summary-2026-03-22.log** [pattern: undefined] ERROR --> BudgetController::index failed to build executive summary: Call to undefined method CodeIgniter\Cache\Handlers\FileHandler::set()
- **summary-2026-03-22.log** [pattern: undefined] ERROR --> DashboardController::index failed to load executive summary: Call to undefined method CodeIgniter\Cache\Handlers\FileHandler::set()
- **summary-2026-03-22.log** [pattern: undefined] ERROR --> HowItWorksController failure: Call to undefined method App\Modules\Blog\Controllers\HowItWorksController::respondWithRendered()
- **summary-2026-03-22.log** [pattern: 404] ERROR --> [ERROR_PAGE] event=error_404 status=404 message=Page not found.
- **summary-2026-03-22.log** [pattern: exception] CRITICAL --> [EXCEPTION] Class "App\Commands\SafeBaseCommand" not found File=/home/mymiteam/mymiwallet/site/current/app/Commands/SafeBaseCommand.php Line=23
- **summary-2026-03-22.log** [pattern: exception] CRITICAL --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
- **summary-2026-03-22.log** [pattern: exception] CRITICAL --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
- **summary-2026-03-22.log** [pattern: exception] CRITICAL --> [EXCEPTION] Class "App\Commands\SafeBaseCommand" not found File=/home/mymiteam/mymiwallet/site/current/app/Commands/SafeBaseCommand.php Line=22
- **summary-2026-03-20.log** [pattern: 500] DEBUG --> [REQ_ID=8366408500c9] [REQUEST][START] GET /index.php?debugbar
- **summary-2026-03-20.log** [pattern: 500] DEBUG --> [REQ_ID=8366408500c9] [FILTER_BEFORE] /index.php?debugbar
- **summary-2026-03-20.log** [pattern: 500] DEBUG --> [REQ_ID=8366408500c9] [ROUTE] Controller=\App\Controllers\Home Method=index
- **summary-2026-03-20.log** [pattern: 500] DEBUG --> [REQ_ID=8366408500c9] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php?debugbar=
- **summary-2026-03-20.log** [pattern: 500] DEBUG --> [REQ_ID=8366408500c9] [FILTER_AFTER]
- **summary-2026-03-20.log** [pattern: 500] DEBUG --> [REQ_ID=8366408500c9] [LIFECYCLE][END] status=200 duration_ms=649.06 memory_delta=4194304
- **summary-2026-03-20.log** [pattern: 500] DEBUG --> [REQ_ID=8366408500c9] [REQUEST][END]
- **summary-2026-03-20.log** [pattern: 500] DEBUG --> [CSRF] token name=csrf_test_name hash=16d4c7574ce97104cf5500dc2eefae21
- **summary-2026-03-20.log** [pattern: 500] INFO --> [REQ_ID=8366408500c9] [PERF] Execution time=0.725205
- **summary-2026-03-20.log** [pattern: warning] LEVEL: WARNING
- **summary-2026-03-20.log** [pattern: warning] WARNING --> [404] URI=https://www.mymiwallet.com/index.php/
- **summary-2026-03-20.log** [pattern: warning] WARNING --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
- **summary-2026-03-20.log** [pattern: warning] WARNING --> [ACTIVATION] Activation failed: missing token
- **summary-2026-03-20.log** [pattern: warning] WARNING --> MyMIWallets initialized without numeric user context.
- **summary-2026-03-20.log** [pattern: warning] WARNING --> [404] URI=https://www.mymiwallet.com/index.php/How-It-Works
- **summary-2026-03-20.log** [pattern: warning] WARNING --> 404 route miss: https://www.mymiwallet.com/index.php/How-It-Works | referrer: none

## Log Files Scanned
- **summary-2026-03-31.log** | size: 265527 bytes | preview lines: 2000
- **summary-2026-03-30.log** | size: 223824 bytes | preview lines: 2000
- **summary-2026-03-29.log** | size: 56282 bytes | preview lines: 1259
- **summary-2026-03-28.log** | size: 63856 bytes | preview lines: 1383
- **summary-2026-03-27.log** | size: 48937 bytes | preview lines: 1095
- **summary-2026-03-26.log** | size: 39498 bytes | preview lines: 881
- **summary-2026-03-25.log** | size: 58035 bytes | preview lines: 1283
- **summary-2026-03-24.log** | size: 34727 bytes | preview lines: 787
- **summary-2026-03-23.log** | size: 34685 bytes | preview lines: 789
- **summary-2026-03-22.log** | size: 279306 bytes | preview lines: 2000
- **summary-2026-03-20.log** | size: 69921 bytes | preview lines: 1537
- **summary-2026-03-19.log** | size: 51251 bytes | preview lines: 1153
- **summary-2026-03-18.log** | size: 43913 bytes | preview lines: 1004
- **summary-2026-03-17.log** | size: 478469 bytes | preview lines: 2000
- **summary-2026-03-16.log** | size: 132234 bytes | preview lines: 2000
- **summary-2026-03-15.log** | size: 80961 bytes | preview lines: 1739
- **summary-2026-03-14.log** | size: 36526 bytes | preview lines: 822
- **summary-2026-03-13.log** | size: 75491 bytes | preview lines: 1645
- **summary-2026-03-12.log** | size: 130852 bytes | preview lines: 2000
- **summary-2026-03-11.log** | size: 153154 bytes | preview lines: 2000
- **summary-2026-03-10.log** | size: 199954 bytes | preview lines: 2000
- **summary-2026-03-09.log** | size: 101180 bytes | preview lines: 2000
- **summary-2026-03-08.log** | size: 519235 bytes | preview lines: 2000
- **summary-2026-03-07.log** | size: 480189 bytes | preview lines: 2000
- **summary-2026-03-06.log** | size: 359705 bytes | preview lines: 2000

## Routes
- `API/Health` => `{"API\/v1\/Health":"\\App\\Modules\\APIs\\Controllers\\HealthAPIController::index"}`
- `API/Status` => `{"API\/v1\/Status":"\\App\\Modules\\APIs\\Controllers\\APIController::status"}`
- `Budget/Financial-Advisors` => `{"Advisor":"\\App\\Controllers\\AdvisorController::index"}`
- `Budget/Financial-Institute` => `{"Budget\/Account-Manager":"\\App\\Modules\\User\\Controllers\\BudgetController::accountManager"}`
- `Features/Advanced-Investment-Portfoio-Manager` => `Features/Advanced-Investment-Portfolio-Manager`
- `Home` => `{"\/":"\\App\\Controllers\\Home::index"}`
- `How-To-Guides` => `Knowledgebase/Tutorials`
- `Investments/Reports` => `Investments/Trade-Tracker`
- `News` => `Blog/News-And-Updates`
- `Premium-Features/Advanced-Charting` => `{"Features\/Brokerage-Integrations":"\\App\\Modules\\Advertise\\Controllers\\FeaturesController::BrokerageIntegrations"}`
- `Premium-Features/Advanced-Trade-Tracker` => `Investments/Trade-Tracker`
- `Premium-Features/Due-Diligence-Database` => `{"Features\/Brokerage-Integrations":"\\App\\Modules\\Advertise\\Controllers\\FeaturesController::BrokerageIntegrations"}`
- `Premium-Features/Wallets` => `Wallets/Manager`
- `Premium_Features/Brokerage-Integrations` => `{"Features\/Brokerage-Integrations":"\\App\\Modules\\Advertise\\Controllers\\FeaturesController::BrokerageIntegrations"}`
- `index.php` => `/`
- `index.php/(.*)` => `$1`
- `index.php/images/(.*)` => `images/$1`

## Architecture
### Root Controllers
- app/Controllers/Api/AdminChatUsageController.php
- app/Controllers/Api/AiOpsManualRunController.php
- app/Controllers/Api/InternalApiController.php
- app/Controllers/Api/OpsFilesystemStatusController.php
- app/Controllers/Api/SwaggerDocsController.php
- app/Controllers/AuthController.php
- app/Controllers/BaseAPIController.php
- app/Controllers/BaseAdminController.php
- app/Controllers/BaseController.php
- app/Controllers/BaseUserController.php
- app/Controllers/Blog.php
- app/Controllers/Debug.php
- app/Controllers/Health.php
- app/Controllers/Home.php
- app/Controllers/MaintenanceController.php
- app/Controllers/OpsHealthController.php
- app/Controllers/StockController.php
- app/Controllers/System/HealthController.php
- app/Controllers/SystemDebugController.php
- app/Controllers/Test.php
- app/Controllers/Traits/HasUserContext.php
- app/Controllers/UserController.php

### Root Models
- app/Models/AIOps/FormTestModel.php
- app/Models/AIOpsBranchLockModel.php
- app/Models/AIOpsChatAdminModel.php
- app/Models/AIOpsDependencyModel.php
- app/Models/AIOpsInstructionModel.php
- app/Models/APIModel.php
- app/Models/AccountsModel.php
- app/Models/AdvisorModel.php
- app/Models/AiOps/FormTestModel.php
- app/Models/AiOpsEmailProcessedModel.php
- app/Models/AiOpsIngestRunModel.php
- app/Models/AiOpsManualTodoModel.php
- app/Models/AiOpsReviewLedgerModel.php
- app/Models/AiOpsRunModel.php
- app/Models/AiOpsScanStateModel.php
- app/Models/AiOpsSettingsModel.php
- app/Models/AiOpsTaskModel.php
- app/Models/AiOpsTaskRunModel.php
- app/Models/AiOpsWorkQueueModel.php
- app/Models/AiUsageModel.php
- app/Models/AlertJobModel.php
- app/Models/AlertsModel.php
- app/Models/AnalyticalModel.php
- app/Models/AnnouncementsModel.php
- app/Models/ApiTokenModel.php
- app/Models/AssetsModel.php
- app/Models/AuctionBalanceModel.php
- app/Models/AuctionBidModel.php
- app/Models/AuctionItemModel.php
- app/Models/AuctionLotModel.php
- app/Models/AuctionModel.php
- app/Models/AuctionPaymentModel.php
- app/Models/AuctionSettlementModel.php
- app/Models/AuditLogModel.php
- app/Models/AuthHealthRunModel.php
- app/Models/AuthRegistrationAttemptModel.php
- app/Models/BaseModel.php
- app/Models/BiddingModel.php
- app/Models/BlogModel.php
- app/Models/BudgetModel.php
- app/Models/CampaignModel.php
- app/Models/ChatArchiveModel.php
- app/Models/ChatStepModel.php
- app/Models/ChatToolRunModel.php
- app/Models/ChatUsageModel.php
- app/Models/CircuitBreakerModel.php
- app/Models/ContentIdeaModel.php
- app/Models/ContentPostModel.php
- app/Models/ContentScannerIngestModel.php
- app/Models/ContentScannerRowModel.php
- app/Models/DashboardModel.php
- app/Models/DesignModel.php
- app/Models/DiligenceModel.php
- app/Models/DiscordAiMessageModel.php
- app/Models/DiscordAiNoteModel.php
- app/Models/DiscordAiSessionModel.php
- app/Models/DiscordLinkModel.php
- app/Models/DiscordModel.php
- app/Models/DripCampaignModel.php
- app/Models/EconomicDataPointModel.php
- app/Models/EconomicIndicatorModel.php
- app/Models/EmailModel.php
- app/Models/EmailOutboxModel.php
- app/Models/ErrorAlertEventModel.php
- app/Models/ErrorAlertRuleModel.php
- app/Models/ErrorLearningRunModel.php
- app/Models/ErrorPatternModel.php
- app/Models/EsportsModel.php
- app/Models/ExchangeModel.php
- app/Models/FailedJobModel.php
- app/Models/FeatureFlagModel.php
- app/Models/FeatureFlagOverrideModel.php
- app/Models/Fin/PositionDailyModel.php
- app/Models/Fin/PriceEodModel.php
- app/Models/Fin/RiskBreachModel.php
- app/Models/Fin/RiskBudgetModel.php
- app/Models/Fin/TradeModel.php
- app/Models/GoalsModel.php
- app/Models/IdempotencyModel.php
- app/Models/InboundWebhookModel.php
- app/Models/InstitutesModel.php
- app/Models/InvestmentForecastAccuracyModel.php
- app/Models/InvestmentForecastHistoryModel.php
- app/Models/InvestmentModel.php
- app/Models/InvestmentPriceForecastModel.php
- app/Models/InvestmentScannerLineageModel.php
- app/Models/InvestmentTickerDailyCountModel.php
- app/Models/InvestorModel.php
- app/Models/JobModel.php
- app/Models/LoginModel.php
- app/Models/MDIT/MditDepositModel.php
- app/Models/MDIT/MditDisclosureAcceptanceModel.php
- app/Models/MDIT/MditInvestorProfileModel.php
- app/Models/MDIT/MditNavSnapshotModel.php
- app/Models/MDIT/MditRedemptionModel.php
- app/Models/MDIT/MditTokenLedgerModel.php
- app/Models/MDIT/MditWalletModel.php
- app/Models/MDIT/MditWebhookEventModel.php
- app/Models/MailQueueModel.php
- app/Models/Marketing/AudienceModel.php
- app/Models/Marketing/EmailMarketingModel.php
- app/Models/Marketing/EmailOpenTrackingModel.php
- app/Models/Marketing/EmailQueueModel.php
- app/Models/Marketing/EmailTemplateModel.php
- app/Models/Marketing/MarketingPublishQueueModel.php
- app/Models/Marketing/MarketingVideoAssetModel.php
- app/Models/Marketing/MarketingVideoContentModel.php
- app/Models/Marketing/MarketingVideoTemplateModel.php
- app/Models/Marketing/MarketingVideoVersionModel.php
- app/Models/MarketingModel.php
- app/Models/MarketingNewsletterModel.php
- app/Models/MgmtBudgetModel.php
- app/Models/MyMICoinModel.php
- app/Models/MyMIGoldModel.php
- app/Models/NotificationOutboxModel.php
- app/Models/ObservedModel.php
- app/Models/OllamaQueueModel.php
- app/Models/OllamaRunModel.php
- app/Models/OllamaSessionModel.php
- app/Models/Ops/SparkHealthModel.php
- app/Models/OpsCommandInboxModel.php
- app/Models/OpsJobsModel.php
- app/Models/OpsProjectModel.php
- app/Models/OpsQueueModel.php
- app/Models/OpsRunsModel.php
- app/Models/OpsSubprojectModel.php
- app/Models/OpsTaskEventModel.php
- app/Models/OpsTaskModel.php
- app/Models/PageSEOModel.php
- app/Models/PermissionModel.php
- app/Models/PermissionRoleModel.php
- app/Models/PlaidModel.php
- app/Models/Predictions/LiquidityModel.php
- app/Models/Predictions/MarketsModel.php
- app/Models/Predictions/OptionsModel.php
- app/Models/Predictions/OrdersModel.php
- app/Models/Predictions/PayoutsModel.php
- app/Models/Predictions/PositionsModel.php
- app/Models/Predictions/TradesModel.php
- app/Models/PrivacyRequestModel.php
- app/Models/ProfileModel.php
- app/Models/ProjectCommitmentsModel.php
- app/Models/ProjectDistributionsModel.php
- app/Models/ProjectInboxModel.php
- app/Models/ProjectPayoutsModel.php
- app/Models/ProjectTaskRegistryModel.php
- app/Models/ProjectTokenAllocationsModel.php
- app/Models/ProjectWithdrawalsModel.php
- app/Models/ProjectsModel.php
- app/Models/PublicModel.php
- app/Models/PushSubscriptionModel.php
- app/Models/ReferralModel.php
- app/Models/RoleModel.php
- app/Models/RoleUserModel.php
- app/Models/RouteErrorHeatmapModel.php
- app/Models/RuntimeConfigModel.php
- app/Models/ScannerTaxonomyModel.php
- app/Models/SecurityModel.php
- app/Models/SignalFilesModel.php
- app/Models/SignalsModel.php
- app/Models/SocialCommunityModel.php
- app/Models/SocialDistributionQueueModel.php
- app/Models/SocialGeneratedPostModel.php
- app/Models/SocialPlatformModel.php
- app/Models/SocialPostTemplateModel.php
- app/Models/SolanaModel.php
- app/Models/SqueezeModel.php
- app/Models/SqueezeScorecardModel.php
- app/Models/StockFundamentalsModel.php
- app/Models/SubscribeModel.php
- app/Models/SupportModel.php
- app/Models/TokenModel.php
- app/Models/TrackerModel.php
- app/Models/TradeAlertScannerMetaModel.php
- app/Models/TransactionModel.php
- app/Models/UserIpHistoryModel.php
- app/Models/UserModel.php
- app/Models/UserPermissionOverrideModel.php
- app/Models/UserSessionModel.php
- app/Models/UserTwoFactorModel.php
- app/Models/WalletModel.php
- app/Models/WebhookOutboxModel.php
- app/Models/WeeklyStreamWatchlistModel.php

### Root Services
- app/Services/AIOps/AiOpsServiceManager.php
- app/Services/AIOps/AiopsActionExtractor.php
- app/Services/AIOps/AiopsErrorParser.php
- app/Services/AIOps/AiopsPatchPlanner.php
- app/Services/AIOps/AutoFixService.php
- app/Services/AIOps/AutoRunCoordinator.php
- app/Services/AIOps/BacklogMetaService.php
- app/Services/AIOps/BranchLockService.php
- app/Services/AIOps/CellDiscoveryScanner.php
- app/Services/AIOps/ChatIngestService.php
- app/Services/AIOps/CommandHookService.php
- app/Services/AIOps/DeduplicationService.php
- app/Services/AIOps/DependencyResolver.php
- app/Services/AIOps/DiffBuilder.php
- app/Services/AIOps/DiffValidationResult.php
- app/Services/AIOps/DocsScanResult.php
- app/Services/AIOps/DocsScannerService.php
- app/Services/AIOps/EmailScannerService.php
- app/Services/AIOps/ErrorClassifier.php
- app/Services/AIOps/ErrorIngestService.php
- app/Services/AIOps/FingerprintService.php
- app/Services/AIOps/FormIntelligenceService.php
- app/Services/AIOps/FormPatchPlanner.php
- app/Services/AIOps/FormTestExecutor.php
- app/Services/AIOps/GapItem.php
- app/Services/AIOps/GitHubPRService.php
- app/Services/AIOps/GovernanceScorer.php
- app/Services/AIOps/InstructionService.php
- app/Services/AIOps/ManualPriorityRunner.php
- app/Services/AIOps/ManualRunNotifier.php
- app/Services/AIOps/ObservabilityStateService.php
- app/Services/AIOps/OllamaCodeGenService.php
- app/Services/AIOps/OllamaPatchResult.php
- app/Services/AIOps/OllamaPatchRunner.php
- app/Services/AIOps/PRComposerService.php
- app/Services/AIOps/PatchJob.php
- app/Services/AIOps/PatchResult.php
- app/Services/AIOps/PriorityWriterService.php
- app/Services/AIOps/PublicPagesPipelineService.php
- app/Services/AIOps/RegressionEvaluator.php
- app/Services/AIOps/ReleaseNotesService.php
- app/Services/AIOps/RepoScannerService.php
- app/Services/AIOps/RepoVerifierService.php
- app/Services/AIOps/RouteErrorHeatmapService.php
- app/Services/AIOps/SchemaInspectorService.php
- app/Services/AIOps/TargetingIntelligence.php
- app/Services/AIOpsService.php
- app/Services/APIs/AlphaVantageService.php
- app/Services/AccountService.php
- app/Services/AiopsActionService.php
- app/Services/AiopsPatchService.php
- app/Services/AlertService.php
- app/Services/AlphaVantagePipelineService.php
- app/Services/AlphaVantageService.php
- app/Services/ApiGovernanceService.php
- app/Services/ApiOpsService.php
- app/Services/ApplePayService.php
- app/Services/AuctionService.php
- app/Services/Auth/AuthLogger.php
- app/Services/AuthAuditService.php
- app/Services/AuthSmokeService.php
- app/Services/AutoloadAuditService.php
- app/Services/AutoloadHealthService.php
- app/Services/BirdeyeService.php
- app/Services/BitcoinService.php
- app/Services/BlockchainService.php
- app/Services/BloggerService.php
- app/Services/BudgetService.php
- app/Services/BufferSchedulerService.php
- app/Services/CashAppService.php
- app/Services/ChatGovernanceIndexer.php
- app/Services/CoinGeckoService.php
- app/Services/CommandBuilderService.php
- app/Services/CommonDataService.php
- app/Services/ConfigLintService.php
- app/Services/CryptoPanicService.php
- app/Services/CurrencyService.php
- app/Services/DashboardAggregatorService.php
- app/Services/DashboardService.php
- app/Services/DebtManagementService.php
- app/Services/DigiByteService.php
- app/Services/Docs/DocsParserService.php
- app/Services/Docs/DocsRendererService.php
- app/Services/Docs/DocsSyncEngine.php
- app/Services/DocsService.php
- app/Services/DripCampaignService.php
- app/Services/EmailQueueService.php
- app/Services/EmailScraperService.php
- app/Services/EmailService.php
- app/Services/Env/EnvInspector.php
- app/Services/EthereumServices.php
- app/Services/EtherscanService.php
- app/Services/EventTracker.php
- app/Services/ExchangeService.php
- app/Services/ExternalApiGuard.php
- app/Services/Fin/PositionService.php
- app/Services/Fin/PriceService.php
- app/Services/Fin/RiskService.php
- app/Services/FinnhubService.php
- app/Services/ForecastAccuracyEvaluator.php
- app/Services/ForecastAggregationService.php
- app/Services/Forecasting/ForecastAccuracyEvaluator.php
- app/Services/Forecasting/ForecastAggregationService.php
- app/Services/Forecasting/MarketDataProviderInterface.php
- app/Services/Forecasting/MyMIForecaster.php
- app/Services/Forecasting/Providers/AlphaVantageProvider.php
- app/Services/ForecastingService.php
- app/Services/GitHubService.php
- app/Services/GitService.php
- app/Services/GoalTrackingService.php
- app/Services/GooglePayService.php
- app/Services/Infrastructure/RedisService.php
- app/Services/InfuraService.php
- app/Services/IntakeRouter.php
- app/Services/InternalEndpointGuardService.php
- app/Services/InvestmentService.php
- app/Services/JupiterService.php
- app/Services/LLM/OllamaCircuitBreaker.php
- app/Services/LLM/OllamaClient.php
- app/Services/MDIT/MditDepositService.php
- app/Services/MDIT/MditInvestorService.php
- app/Services/MDIT/MditIssuanceService.php
- app/Services/MDIT/MditNavService.php
- app/Services/MDIT/MditRedemptionService.php
- app/Services/MDIT/Providers/Kyc/SandboxKycProvider.php
- app/Services/MailChimpService.php
- app/Services/MailService.php
- app/Services/Marketing/EmailMarketingService.php
- app/Services/Marketing/MarketingVideoService.php
- app/Services/MarketingScraper.php
- app/Services/MarketingService.php
- app/Services/MetaService.php
- app/Services/NotificationService.php
- app/Services/Observability/ErrorAggregationService.php
- app/Services/Observability/ErrorAlertService.php
- app/Services/Observability/ErrorPatternLearnerService.php
- app/Services/OnboardingProgressService.php
- app/Services/OnboardingService.php
- app/Services/Ops/AiOpsArtifactService.php
- app/Services/Ops/ApiHealthService.php
- app/Services/Ops/AppSelfTestService.php
- app/Services/Ops/ConfigAuditService.php
- app/Services/Ops/DatabaseHealthService.php
- app/Services/Ops/DreamHostService.php
- app/Services/Ops/EmailOpsService.php
- app/Services/Ops/EnvDoctorService.php
- app/Services/Ops/FilesystemHealthService.php
- app/Services/Ops/LogOpsService.php
- app/Services/Ops/SnapshotWriter.php
- app/Services/Ops/SparkGovernanceService.php
- app/Services/Ops/SparkRunnerService.php
- app/Services/Ops/VpsHealthService.php
- app/Services/OpsCommandService.php
- app/Services/OpsExportService.php
- app/Services/OpsImportService.php
- app/Services/PayPalService.php
- app/Services/PlaidService.php
- app/Services/PremiumEntitlementService.php
- app/Services/ProjectsService.php
- app/Services/Psr4AuditService.php
- app/Services/PublicPages/SchemaGenerator.php
- app/Services/PythonService.php
- app/Services/RealEstateIngestService.php
- app/Services/RecurringService.php
- app/Services/ReferralService.php
- app/Services/RegistrationAttributionService.php
- app/Services/RegistrationSourceContentService.php
- app/Services/Research/FinancialResearchService.php
- app/Services/Research/InstitutionalResearchService.php
- app/Services/RevenueService.php
- app/Services/Routes/RouteReconcileService.php
- app/Services/Routes/RouteRepairService.php
- app/Services/ScannerTaxonomyService.php
- app/Services/Scanning/CacheLayer.php
- app/Services/Scanning/Providers/AlphaVantageProvider.php
- app/Services/Scanning/Providers/FinnhubProvider.php
- app/Services/Scanning/Providers/MarketDataProviderInterface.php
- app/Services/Scanning/Providers/ProviderRouter.php
- app/Services/Scanning/Providers/StooqProvider.php
- app/Services/Scanning/RateLimiter.php
- app/Services/Scanning/ScannerAlertBridge.php
- app/Services/Scanning/ScannerResult.php
- app/Services/Scanning/ScannerService.php
- app/Services/Scanning/SignalEngine.php
- app/Services/ScraperOpsService.php
- app/Services/SearchRotationService.php
- app/Services/SearchService.php
- app/Services/SetupStatusService.php
- app/Services/SlackWebhookService.php
- app/Services/SocialPostFormatter.php
- app/Services/SolanaService.php
- app/Services/Spark/AiopsDocsExecutionService.php
- app/Services/Spark/AuthAuditRunner.php
- app/Services/Spark/AuthFunnelCheckService.php
- app/Services/Spark/CommandInventoryService.php
- app/Services/Spark/DbApplyDocsService.php
- app/Services/Spark/DbInventoryService.php
- app/Services/Spark/LogHealthcheckService.php
- app/Services/Spark/LogSummarizeService.php
- app/Services/SubSystemManager.php
- app/Services/SupportService.php
- app/Services/TechnicalSnapshotService.php
- app/Services/TokenService.php
- app/Services/TradeAlertsIngest.php
- app/Services/TransactionService.php
- app/Services/Triage/CommandRunner.php
- app/Services/Triage/HostingModeDetector.php
- app/Services/UserService.php
- app/Services/WalletService.php
- app/Services/WalletSummaryCalculator.php
- app/Services/WalletSummaryService.php
- app/Services/WeeklyStreamService.php
- app/Services/ZapierService.php

### Root Libraries
- app/Libraries/Abuse/RateLimiter.php
- app/Libraries/AiCostControls.php
- app/Libraries/AiOps/AiOpsManager.php
- app/Libraries/AiOps/ChatGptClient.php
- app/Libraries/AiOps/CodexClient.php
- app/Libraries/AiOps/OllamaClient.php
- app/Libraries/AiOpsGuard.php
- app/Libraries/AlertChannelInterface.php
- app/Libraries/AlertChannels/DiscordChannel.php
- app/Libraries/AlertChannels/EmailChannel.php
- app/Libraries/AlertChannels/ZapierChannel.php
- app/Libraries/AlertJobQueue.php
- app/Libraries/AlertSourceInterface.php
- app/Libraries/AlertSources/ManualEntrySource.php
- app/Libraries/AlertSources/MarketAuxNewsSource.php
- app/Libraries/AlertSources/ThinkOrSwimEmailSource.php
- app/Libraries/Api/ApiRequestContext.php
- app/Libraries/AuditState.php
- app/Libraries/Auth/Gate.php
- app/Libraries/Backups/BackupService.php
- app/Libraries/Backups/Crypto.php
- app/Libraries/BaseLoader.php
- app/Libraries/Brokers/BrokerParserInterface.php
- app/Libraries/Brokers/ThinkorSwimParser.php
- app/Libraries/CacheKey.php
- app/Libraries/ContentEngine/DistributionService.php
- app/Libraries/ContentEngine/PostDraftService.php
- app/Libraries/ContentEngine/ScannerIngestService.php
- app/Libraries/ContentEngine/ScannerScoringService.php
- app/Libraries/ContentEngine/templates/discord.php
- app/Libraries/ContentEngine/templates/facebook.php
- app/Libraries/ContentEngine/templates/stocktwits.php
- app/Libraries/ContentEngine/templates/tiktok.php
- app/Libraries/ContentEngine/templates/tradingview.php
- app/Libraries/ContentEngine/templates/youtube.php
- app/Libraries/CostTracker.php
- app/Libraries/CrudCacheInvalidator.php
- app/Libraries/CryptoCurrencyInterface.php
- app/Libraries/CryptoHelper.php
- app/Libraries/DbInventory/InventoryScanner.php
- app/Libraries/DbInventory/MigrationRunner.php
- app/Libraries/DbInventory/SchemaRecorderDb.php
- app/Libraries/DbInventory/SchemaRecorderForge.php
- app/Libraries/DbInventory/SqlGenerator.php
- app/Libraries/DevHotReload.php
- app/Libraries/DiscordAlert.php
- app/Libraries/DocsIndex.php
- app/Libraries/EconomicDataService.php
- app/Libraries/EmailManager.php
- app/Libraries/EmergencyLogger.php
- app/Libraries/ErrorFingerprint.php
- app/Libraries/ExchangeConnectorInterface.php
- app/Libraries/FMVService.php
- app/Libraries/FRED.php
- app/Libraries/FallbackLogger.php
- app/Libraries/Flags.php
- app/Libraries/GitHelper.php
- app/Libraries/GitHubClient.php
- app/Libraries/GuardedPatchApplier.php
- app/Libraries/HtmlFormatter.php
- app/Libraries/Introspection/SupportScanner.php
- app/Libraries/KimiClient.php
- app/Libraries/KimiSuggestions.php
- app/Libraries/LogTriage.php
- app/Libraries/Mail/MailProviderInterface.php
- app/Libraries/Mail/PostmarkProvider.php
- app/Libraries/Mail/SmtpProvider.php
- app/Libraries/MailService.php
- app/Libraries/MarketNewsProvider.php
- app/Libraries/MultiCurl.php
- app/Libraries/MyMIAdvisor.php
- app/Libraries/MyMIAdvisors.php
- app/Libraries/MyMIAlerts.php
- app/Libraries/MyMIAlphaVantage.php
- app/Libraries/MyMIAnalytics.php
- app/Libraries/MyMIAssets.php
- app/Libraries/MyMIAssistant.php
- app/Libraries/MyMIBirdeye.php
- app/Libraries/MyMIBitcoin.php
- app/Libraries/MyMIBlogger.php
- app/Libraries/MyMIBudget.php
- app/Libraries/MyMICoin.php
- app/Libraries/MyMICoinGecko.php
- app/Libraries/MyMICryptoPanic.php
- app/Libraries/MyMIDashboard.php
- app/Libraries/MyMIDexScreener.php
- app/Libraries/MyMIDigibyte.php
- app/Libraries/MyMIDiscord.php
- app/Libraries/MyMIEsports.php
- app/Libraries/MyMIEsportsStartGG.php
- app/Libraries/MyMIEthereum.php
- app/Libraries/MyMIExchange.php
- app/Libraries/MyMIExchangeAdapter.php
- app/Libraries/MyMIFacebook.php
- app/Libraries/MyMIFinnhub.php
- app/Libraries/MyMIFractalAnalyzer.php
- app/Libraries/MyMIGemini.php
- app/Libraries/MyMIGold.php
- app/Libraries/MyMIInfura.php
- app/Libraries/MyMIInstitutes.php
- app/Libraries/MyMIInvestments.php
- app/Libraries/MyMIJupiter.php
- app/Libraries/MyMILogger.php
- app/Libraries/MyMIManage.php
- app/Libraries/MyMIMarketAux.php
- app/Libraries/MyMIMarketData.php
- app/Libraries/MyMIMarketing.php
- app/Libraries/MyMIMetaMask.php
- app/Libraries/MyMIMomentum.php
- app/Libraries/MyMINews.php
- app/Libraries/MyMINotifications.php
- app/Libraries/MyMIOnboarding.php
- app/Libraries/MyMIPhantom.php
- app/Libraries/MyMIPlaid.php
- app/Libraries/MyMIPredictions.php
- app/Libraries/MyMIProjects.php
- app/Libraries/MyMIPump.php
- app/Libraries/MyMIRaydium.php
- app/Libraries/MyMIReferrals.php
- app/Libraries/MyMIRobinhood.php
- app/Libraries/MyMISEC.php
- app/Libraries/MyMISecurity.php
- app/Libraries/MyMISettings.php
- app/Libraries/MyMISimulator.php
- app/Libraries/MyMISnapTrader.php
- app/Libraries/MyMISolana.php
- app/Libraries/MyMISolflare.php
- app/Libraries/MyMISports.php
- app/Libraries/MyMISqueeze.php
- app/Libraries/MyMISupport.php
- app/Libraries/MyMITrustWallet.php
- app/Libraries/MyMITwitter.php
- app/Libraries/MyMIUser.php
- app/Libraries/MyMIUsers.php
- app/Libraries/MyMIWallet.php
- app/Libraries/MyMIWalletConnect.php
- app/Libraries/MyMIWallets.php
- app/Libraries/MyRouter.php
- app/Libraries/Notifications/PushService.php
- app/Libraries/Observability/Metrics.php
- app/Libraries/OpenAIClient.php
- app/Libraries/Ops/AiOpsTaskRunner.php
- app/Libraries/Ops/Analyzers/CommandsAnalyzer.php
- app/Libraries/Ops/Analyzers/ConfigLintAnalyzer.php
- app/Libraries/Ops/Analyzers/CspAnalyzer.php
- app/Libraries/Ops/Analyzers/Psr4Analyzer.php
- app/Libraries/Ops/Analyzers/RoutesAnalyzer.php
- app/Libraries/Ops/Analyzers/RuntimeAnalyzer.php
- app/Libraries/Ops/Issue.php
- app/Libraries/Ops/OpsJobRegistry.php
- app/Libraries/Ops/OpsReportWriter.php
- app/Libraries/Ops/PrOutboxWriter.php
- app/Libraries/PatchHallucinationDetector.php
- app/Libraries/PatchRiskScorer.php
- app/Libraries/Platform/CommandRunner.php
- app/Libraries/Platform/ControlPlaneAnalyzer.php
- app/Libraries/Platform/ControlPlaneDispatcher.php
- app/Libraries/Platform/ControlPlaneRegistry.php
- app/Libraries/Platform/EdgeSnapshotReader.php
- app/Libraries/Platform/PlatformReportWriter.php
- app/Libraries/Privacy/DataErasureService.php
- app/Libraries/Privacy/DataExportService.php
- app/Libraries/Queue/Queue.php
- app/Libraries/Resilience/CircuitBreaker.php
- app/Libraries/Resilience/HttpClient.php
- app/Libraries/SafeCache.php
- app/Libraries/SafeProcess.php
- app/Libraries/ScannerRouter.php
- app/Libraries/ScrapemaxClient.php
- app/Libraries/Security/CaptchaService.php
- app/Libraries/Security/Crypto.php
- app/Libraries/Security/EncryptsAttributes.php
- app/Libraries/Security/Redactor.php
- app/Libraries/Security/TotpService.php
- app/Libraries/SeverityParser.php
- app/Libraries/Signals/MyMISignalIngestor.php
- app/Libraries/SiteSettingsOverride.php
- app/Libraries/SiteSettingsRuntime.php
- app/Libraries/SitemapGenerator.php
- app/Libraries/StockFundamentalsService.php
- app/Libraries/SymbolResolver.php
- app/Libraries/SystemEventBootstrap.php
- app/Libraries/Trades/TradeEnhancements.php
- app/Libraries/Traits/MarketingBatchTrait.php
- app/Libraries/Traits/TextProcessor.php
- app/Libraries/WebSocketClient.php
- app/Libraries/WebSocketHandler.php
- app/Libraries/Webhooks/WebhookDispatcher.php

### Modules
#### AIOps
- Controllers: 1
- Models: 6
- Services: 1
- Views: 0
- Config: 0

#### APIs
- Controllers: 45
- Models: 4
- Services: 0
- Views: 1
- Config: 0

#### Admin
- Controllers: 3
- Models: 0
- Services: 0
- Views: 0
- Config: 0

#### Advertise
- Controllers: 1
- Models: 0
- Services: 0
- Views: 2
- Config: 0

#### Advisor
- Controllers: 1
- Models: 0
- Services: 0
- Views: 2
- Config: 0

#### Blog
- Controllers: 10
- Models: 0
- Services: 0
- Views: 36
- Config: 1

#### Chat
- Controllers: 1
- Models: 0
- Services: 0
- Views: 0
- Config: 0

#### ContentEngine
- Controllers: 1
- Models: 0
- Services: 0
- Views: 0
- Config: 0

#### Docs
- Controllers: 2
- Models: 0
- Services: 0
- Views: 3
- Config: 0

#### Exchange
- Controllers: 7
- Models: 1
- Services: 0
- Views: 42
- Config: 0

#### Finance
- Controllers: 1
- Models: 0
- Services: 0
- Views: 0
- Config: 0

#### Logs
- Controllers: 1
- Models: 0
- Services: 0
- Views: 0
- Config: 0

#### Management
- Controllers: 50
- Models: 1
- Services: 0
- Views: 410
- Config: 1

#### Marketing_New
- Controllers: 1
- Models: 1
- Services: 0
- Views: 1
- Config: 0

#### Notifications
- Controllers: 1
- Models: 0
- Services: 0
- Views: 0
- Config: 0

#### Ops
- Controllers: 2
- Models: 0
- Services: 0
- Views: 1
- Config: 0

#### Predictions
- Controllers: 1
- Models: 0
- Services: 0
- Views: 0
- Config: 0

#### Public
- Controllers: 1
- Models: 0
- Services: 0
- Views: 2
- Config: 0

#### ScriptStudio
- Controllers: 1
- Models: 1
- Services: 0
- Views: 4
- Config: 1

#### Search
- Controllers: 1
- Models: 0
- Services: 0
- Views: 1
- Config: 0

#### Status
- Controllers: 2
- Models: 0
- Services: 0
- Views: 0
- Config: 0

#### Support
- Controllers: 3
- Models: 2
- Services: 1
- Views: 13
- Config: 0

#### Template
- Controllers: 0
- Models: 1
- Services: 0
- Views: 1
- Config: 0

#### User
- Controllers: 21
- Models: 2
- Services: 0
- Views: 563
- Config: 0

## Database Tables
### aiops_email_queue
- Field count: 12
  - `id` (bigint)
  - `mailbox` (varchar) length=255
  - `message_id` (varchar) length=255
  - `subject` (text)
  - `sender` (varchar) length=255
  - `raw_body` (longtext)
  - `raw_headers` (longtext)
  - `status` (enum)
  - `attempts` (int)
  - `last_error` (text)
  - `created_at` (datetime)
  - `processed_at` (datetime)

### aiops_generated_commands
- Field count: 5
  - `id` (int)
  - `class_name` (varchar) length=255
  - `command_name` (varchar) length=255
  - `source_text` (text)
  - `created_at` (datetime)

### aiops_review_ledger
- Field count: 8
  - `id` (bigint)
  - `scanner_name` (varchar) length=64
  - `file_path` (varchar) length=500
  - `hash_at_review` (char) length=64
  - `decision` (enum)
  - `pr_ref` (varchar) length=100
  - `summary` (text)
  - `reviewed_at` (datetime)

### aiops_scan_state
- Field count: 11
  - `id` (int)
  - `scanner_name` (varchar) length=64
  - `status` (enum)
  - `last_cursor` (varchar) length=255
  - `sleep_seconds` (int)
  - `batch_size` (int)
  - `max_prs_per_run` (int)
  - `cycle_count` (int)
  - `last_run_at` (datetime)
  - `notes` (text)
  - `updated_at` (datetime)

### aiops_work_queue
- Field count: 11
  - `id` (bigint)
  - `scanner_name` (varchar) length=64
  - `file_path` (varchar) length=500
  - `file_hash` (char) length=64
  - `priority` (int)
  - `status` (enum)
  - `attempt_count` (int)
  - `last_error` (text)
  - `last_touched_at` (datetime)
  - `created_at` (datetime)
  - `updated_at` (datetime)

### auth_activation_attempts
- Field count: 5
  - `id` (int)
  - `ip_address` (varchar) length=255
  - `user_agent` (varchar) length=255
  - `token` (varchar) length=255
  - `created_at` (datetime)

### auth_errors
- Field count: 6
  - `id` (int)
  - `process` (varchar) length=50
  - `error_message` (text)
  - `ip_address` (varchar) length=45
  - `user_agent` (varchar) length=255
  - `created_at` (datetime)

### auth_groups
- Field count: 3
  - `id` (int)
  - `name` (varchar) length=255
  - `description` (varchar) length=255

### auth_groups_permissions
- Field count: 2
  - `group_id` (int)
  - `permission_id` (int)

### auth_groups_users
- Field count: 4
  - `id` (int)
  - `user_id` (int)
  - `group` (varchar) length=255
  - `created_at` (datetime)

### auth_identities
- Field count: 12
  - `id` (int)
  - `user_id` (int)
  - `type` (varchar) length=255
  - `name` (varchar) length=255
  - `secret` (varchar) length=255
  - `secret2` (varchar) length=255
  - `expires` (datetime)
  - `extra` (text)
  - `force_reset` (tinyint) length=1
  - `last_used_at` (datetime)
  - `created_at` (datetime)
  - `updated_at` (datetime)

### auth_logins
- Field count: 9
  - `id` (int)
  - `ip_address` (varchar) length=255
  - `user_agent` (varchar) length=255
  - `id_type` (varchar) length=255
  - `identifier` (varchar) length=255
  - `user_id` (int)
  - `email` (varchar) length=255
  - `date` (datetime)
  - `success` (tinyint) length=1

### auth_permissions
- Field count: 3
  - `id` (int)
  - `name` (varchar) length=255
  - `description` (varchar) length=255

### auth_permissions_users
- Field count: 4
  - `id` (int)
  - `user_id` (int)
  - `permission` (varchar) length=255
  - `created_at` (datetime)

### auth_remember_tokens
- Field count: 7
  - `id` (int)
  - `selector` (varchar) length=255
  - `hashedValidator` (varchar) length=255
  - `user_id` (int)
  - `expires` (datetime)
  - `created_at` (datetime)
  - `updated_at` (datetime)

### auth_reset_attempts
- Field count: 6
  - `id` (int)
  - `email` (varchar) length=255
  - `ip_address` (varchar) length=255
  - `user_agent` (varchar) length=255
  - `token` (varchar) length=255
  - `created_at` (datetime)

### auth_token_logins
- Field count: 8
  - `id` (int)
  - `ip_address` (varchar) length=255
  - `user_agent` (varchar) length=255
  - `id_type` (varchar) length=255
  - `identifier` (varchar) length=255
  - `user_id` (int)
  - `date` (datetime)
  - `success` (tinyint) length=1

### auth_tokens
- Field count: 5
  - `id` (int)
  - `selector` (varchar) length=255
  - `hashedValidator` (varchar) length=255
  - `user_id` (int)
  - `expires` (datetime)

### auth_users_permissions
- Field count: 2
  - `user_id` (int)
  - `permission_id` (int)

### bf_act_logger
- Field count: 13
  - `id` (bigint)
  - `created_on` (timestamp)
  - `created_by` (varchar) length=45
  - `beta` (varchar) length=45
  - `type` (varchar) length=255
  - `type_id` (varchar) length=20
  - `controller` (varchar) length=255
  - `method` (varchar) length=255
  - `url` (text)
  - `full_url` (text)
  - `token` (text)
  - `comment` (text)
  - `suspicious_flag` (tinyint) length=1

### bf_ai_ops_caps
- Field count: 8
  - `id` (bigint)
  - `subsystem` (varchar) length=64
  - `cap_type` (varchar) length=24
  - `cap_value` (decimal) length=10
  - `reset_period` (varchar) length=16
  - `is_enabled` (tinyint) length=1
  - `created_at` (datetime)
  - `updated_at` (datetime)

### bf_ai_ops_events
- Field count: 6
  - `id` (bigint)
  - `subsystem` (varchar) length=64
  - `event_type` (varchar) length=64
  - `message` (text)
  - `meta_json` (longtext)
  - `created_at` (datetime)

### bf_ai_ops_runs
- Field count: 11
  - `id` (bigint)
  - `job_key` (varchar) length=64
  - `subsystem` (varchar) length=64
  - `status` (varchar) length=16
  - `started_at` (datetime)
  - `finished_at` (datetime)
  - `runtime_seconds` (int)
  - `message` (text)
  - `meta_json` (longtext)
  - `created_by` (bigint)
  - `created_at` (datetime)

### bf_ai_ops_usage
- Field count: 10
  - `id` (bigint)
  - `month_key` (char) length=7
  - `subsystem` (varchar) length=64
  - `runs` (int)
  - `runtime_seconds` (int)
  - `requests` (int)
  - `cache_hits` (int)
  - `errors` (int)
  - `capacity_used` (decimal) length=10
  - `updated_at` (datetime)

### bf_ai_usage
- Field count: 10
  - `id` (bigint)
  - `subsystem` (varchar) length=150
  - `action` (varchar) length=150
  - `user_id` (bigint)
  - `tokens_prompt` (int)
  - `tokens_completion` (int)
  - `cost_usd` (decimal) length=10
  - `meta_json` (longtext)
  - `created_at` (datetime)
  - `updated_at` (datetime)

### bf_aiops_branch_locks
- Field count: 6
  - `id` (bigint)
  - `branch` (varchar) length=255
  - `locked_by` (varchar) length=100
  - `instruction_id` (bigint)
  - `expires_at` (datetime)
  - `created_at` (datetime)

### bf_aiops_chat_admin
- Field count: 6
  - `id` (bigint)
  - `user_id` (bigint)
  - `raw_text` (longtext)
  - `cleaned_text` (longtext)
  - `instruction_id` (bigint)
  - `created_at` (datetime)

### bf_aiops_dependencies
- Field count: 3
  - `id` (bigint)
  - `instruction_id` (bigint)
  - `depends_on` (bigint)

### bf_aiops_email_processed
- Field count: 12
  - `id` (bigint)
  - `mailbox` (varchar) length=190
  - `imap_uid` (bigint)
  - `message_id` (varchar) length=255
  - `from_email` (varchar) length=255
  - `subject` (varchar) length=255
  - `received_at` (datetime)
  - `processed_at` (datetime)
  - `status` (varchar) length=32
  - `meta_json` (json)
  - `created_at` (datetime)
  - `updated_at` (datetime)

### bf_aiops_form_tests
- Field count: 15
  - `id` (int)
  - `source_type` (varchar) length=20
  - `source_value` (text)
  - `form_action` (varchar) length=255
  - `http_method` (varchar) length=10
  - `controller_class` (varchar) length=255
  - `route_match` (varchar) length=255
  - `generated_payload` (json)
  - `response_status` (int)
  - `response_headers` (text)
  - `response_body` (mediumtext)
  - `error_detected` (tinyint)
  - `logs_snapshot` (mediumtext)
  - `patch_job_created` (tinyint)
  - `created_at` (datetime)

### bf_aiops_ingest_runs
- Field count: 13
  - `id` (bigint)
  - `job` (varchar) length=64
  - `started_at` (datetime)
  - `ended_at` (datetime)
  - `duration_ms` (int)
  - `emails_scanned` (int)
  - `new_emails` (int)
  - `duplicates` (int)
  - `alerts_created` (int)
  - `alerts_updated` (int)
  - `status` (varchar) length=16
  - `error_message` (text)
  - `created_at` (datetime)

### bf_aiops_instructions
- Field count: 21
  - `id` (bigint)
  - `instruction_text` (longtext)
  - `instruction_hash` (char) length=64
  - `duplicate_of` (bigint)
  - `similarity_score` (decimal) length=5
  - `source` (varchar) length=100
  - `classification` (varchar) length=50
  - `risk_level` (varchar) length=20
  - `status` (varchar) length=30
  - `auto_pr` (tinyint) length=1
  - `dry_run` (tinyint) length=1
  - `severity_override` (varchar) length=20
  - `generated_files` (json)
  - `pr_branch` (varchar) length=255
  - `pr_url` (varchar) length=500
  - `worker_notes` (longtext)
  - `created_at` (datetime)
  - `updated_at` (datetime)
  - `gov_score` (varchar) length=45
  - `gov_numeric_score` (decimal) length=6
  - `risk_score` (decimal) length=5

### bf_aiops_manual_todos
- Field count: 7
  - `id` (bigint)
  - `content` (text)
  - `status` (varchar) length=16
  - `source` (varchar) length=64
  - `created_at` (datetime)
  - `updated_at` (datetime)
  - `completed_at` (datetime)

### bf_aiops_query_audit
- Field count: 6
  - `id` (int)
  - `query_text` (longtext)
  - `validated` (tinyint) length=1
  - `executed` (tinyint) length=1
  - `error_message` (text)
  - `created_at` (datetime)

### bf_aiops_registry
- Field count: 11
  - `id` (bigint)
  - `key_name` (varchar) length=64
  - `title` (varchar) length=128
  - `enabled` (tinyint) length=1
  - `schedule` (varchar) length=64
  - `config_json` (json)
  - `last_run_at` (datetime)
  - `last_status` (varchar) length=16
  - `last_message` (text)
  - `created_at` (datetime)
  - `updated_at` (datetime)

### bf_aiops_runs
- Field count: 15
  - `id` (bigint)
  - `run_key` (varchar) length=64
  - `mailbox` (varchar) length=190
  - `source_email` (varchar) length=255
  - `status` (varchar) length=32
  - `started_at` (datetime)
  - `finished_at` (datetime)
  - `duration_seconds` (int)
  - `scanned_count` (int)
  - `processed_count` (int)
  - `duplicate_count` (int)
  - `ticker_count` (int)
  - `meta_json` (json)
  - `created_at` (datetime)
  - `updated_at` (datetime)

### bf_aiops_schema_cache
- Field count: 4
  - `id` (int)
  - `table_name` (varchar) length=100
  - `schema_json` (longtext)
  - `last_updated_at` (datetime)

### bf_aiops_services
- Field count: 10
  - `id` (int)
  - `service_name` (varchar) length=100
  - `status` (varchar) length=50
  - `pid` (int)
  - `port` (int)
  - `last_checked_at` (datetime)
  - `health_status` (varchar) length=50
  - `notes` (text)
  - `created_at` (datetime)
  - `updated_at` (datetime)

### bf_aiops_settings
- Field count: 6
  - `id` (bigint)
  - `setting_key` (varchar) length=64
  - `setting_value` (text)
  - `value_json` (json)
  - `updated_by` (varchar) length=64
  - `updated_at` (datetime)

### bf_aiops_task_runs
- Field count: 11
  - `id` (bigint)
  - `task_id` (bigint)
  - `run_key` (varchar) length=64
  - `runner` (varchar) length=64
  - `status` (varchar) length=16
  - `started_at` (datetime)
  - `finished_at` (datetime)
  - `exit_code` (int)
  - `stdout` (mediumtext)
  - `stderr` (mediumtext)
  - `result_json` (json)

### bf_aiops_tasks
- Field count: 19
  - `id` (bigint)
  - `task_key` (varchar) length=64
  - `title` (varchar) length=255
  - `domain` (varchar) length=32
  - `severity` (varchar) length=8
  - `status` (varchar) length=16
  - `assigned_to` (varchar) length=32
  - `prompt` (mediumtext)
  - `context_json` (json)
  - `source` (varchar) length=64
  - `source_ref` (varchar) length=128
  - `attempts` (int)
  - `max_attempts` (int)
  - `last_error` (text)
  - `scheduled_at` (datetime)
  - `locked_at` (datetime)
  - `locked_by` (varchar) length=64
  - `created_at` (datetime)
  - `updated_at` (datetime)

### bf_aiops_workflow_usage
- Field count: 5
  - `workflow_id` (varchar) length=64
  - `workflow_slug` (varchar) length=190
  - `month` (char) length=7
  - `usd_used` (decimal) length=10
  - `updated_at` (datetime)

### bf_api_audit_findings
- Field count: 9
  - `id` (bigint)
  - `run_id` (bigint)
  - `endpoint_id` (bigint)
  - `severity` (varchar) length=16
  - `category` (varchar) length=64
  - `finding` (text)
  - `remediation` (text)
  - `evidence_json` (longtext)
  - `created_at` (datetime)

### bf_api_audit_runs
- Field count: 7
  - `id` (bigint)
  - `run_uuid` (varchar) length=64
  - `started_at` (datetime)
  - `finished_at` (datetime)
  - `environment` (varchar) length=64
  - `git_commit` (varchar) length=40
  - `summary_json` (longtext)

### bf_api_endpoint_rules
- Field count: 12
  - `id` (bigint)
  - `endpoint_id` (bigint)
  - `requires_auth` (tinyint) length=1
  - `required_group` (varchar) length=64
  - `required_permission` (varchar) length=128
  - `filters_expected` (text)
  - `rate_limit_policy` (varchar) length=64
  - `is_cli_only` (tinyint) length=1
  - `internal_token_required` (tinyint) length=1
  - `is_manual_override` (tinyint) length=1
  - `created_at` (datetime)
  - `updated_at` (datetime)

### bf_api_endpoints
- Field count: 9
  - `id` (bigint)
  - `uri` (varchar) length=255
  - `http_methods` (varchar) length=32
  - `controller` (varchar) length=255
  - `action` (varchar) length=128
  - `module` (varchar) length=128
  - `is_api` (tinyint) length=1
  - `version` (varchar) length=32
  - `discovered_at` (datetime)

### bf_auth_groups_users
- Field count: 4
  - `id` (int)
  - `user_id` (int)
  - `group` (varchar) length=255
  - `created_at` (datetime)

### bf_auth_health_runs
- Field count: 9
  - `id` (bigint)
  - `run_at` (datetime)
  - `status` (varchar) length=10
  - `score` (int)
  - `summary` (varchar) length=255
  - `details_json` (longtext)
  - `duration_ms` (int)
  - `server` (varchar) length=64
  - `build_tag` (varchar) length=64

### bf_auth_identities
- Field count: 12
  - `id` (int)
  - `user_id` (int)
  - `type` (varchar) length=255
  - `name` (varchar) length=255
  - `secret` (varchar) length=255
  - `secret2` (varchar) length=255
  - `expires` (datetime)
  - `extra` (text)
  - `force_reset` (tinyint) length=1
  - `last_used_at` (datetime)
  - `created_at` (datetime)
  - `updated_at` (datetime)

### bf_auth_logins
- Field count: 8
  - `id` (int)
  - `ip_address` (varchar) length=255
  - `user_agent` (varchar) length=255
  - `id_type` (varchar) length=255
  - `identifier` (varchar) length=255
  - `user_id` (int)
  - `date` (datetime)
  - `success` (tinyint) length=1

### bf_auth_permissions_users
- Field count: 4
  - `id` (int)
  - `user_id` (int)
  - `permission` (varchar) length=255
  - `created_at` (datetime)

### bf_auth_registration_attempts
- Field count: 10
  - `id` (int)
  - `email` (varchar) length=255
  - `email_hash` (char) length=64
  - `ip_address` (varchar) length=45
  - `user_agent` (text)
  - `uri` (varchar) length=255
  - `status` (enum)
  - `error_message` (text)
  - `created_at` (datetime)
  - `updated_at` (datetime)

### bf_auth_remember_tokens
- Field count: 7
  - `id` (int)
  - `selector` (varchar) length=255
  - `hashedValidator` (varchar) length=255
  - `user_id` (int)
  - `expires` (datetime)
  - `created_at` (datetime)
  - `updated_at` (datetime)

### bf_auth_token_logins
- Field count: 8
  - `id` (int)
  - `ip_address` (varchar) length=255
  - `user_agent` (varchar) length=255
  - `id_type` (varchar) length=255
  - `identifier` (varchar) length=255
  - `user_id` (int)
  - `date` (datetime)
  - `success` (tinyint) length=1

### bf_chat_archives
- Field count: 7
  - `id` (int)
  - `chat_date` (date)
  - `project_name` (varchar) length=100
  - `archive_path` (varchar) length=255
  - `summary` (varchar) length=255
  - `status` (enum)
  - `created_at` (datetime)

### bf_chat_steps
- Field count: 6
  - `id` (bigint)
  - `chat_archive_id` (bigint)
  - `step` (varchar) length=20
  - `status` (varchar) length=30
  - `detected_at` (datetime)
  - `notes` (text)

### bf_chat_tool_runs
- Field count: 9
  - `id` (bigint)
  - `user_id` (bigint)
  - `mode` (varchar) length=25
  - `tool` (varchar) length=100
  - `request_json` (longtext)
  - `response_json` (longtext)
  - `status` (varchar) length=20
  - `created_at` (datetime)
  - `updated_at` (datetime)

### bf_coin_redistribution_items
- Field count: 6
  - `id` (bigint)
  - `redistribution_id` (int)
  - `user_id` (int)
  - `old_units` (bigint)
  - `topup_units` (bigint)
  - `created_at` (datetime)

### bf_company_logos
- Field count: 6
  - `id` (int)
  - `status` (int)
  - `symbol` (varchar) length=10
  - `image_url` (text)
  - `approved_at` (datetime)
  - `updated_at` (datetime)

### bf_compliance_audits
- Field count: 8
  - `id` (int)
  - `check_date` (date)
  - `check_details` (text)
  - `actions_taken` (text)
  - `regulatory_body` (varchar) length=255
  - `communication_log` (text)
  - `created_at` (timestamp)
  - `updated_at` (timestamp)

### bf_content_ideas
- Field count: 10
  - `id` (int)
  - `ingest_id` (int)
  - `symbol` (varchar) length=16
  - `score_total` (decimal) length=10
  - `tier` (enum)
  - `reasons_json` (text)
  - `recommended_platforms_json` (text)
  - `status` (enum)
  - `created_at` (datetime)
  - `updated_at` (datetime)

### bf_content_posts
- Field count: 12
  - `id` (int)
  - `idea_id` (int)
  - `platform` (enum)
  - `title` (varchar) length=255
  - `body` (text)
  - `hashtags` (text)
  - `cta` (text)
  - `payload_json` (text)
  - `status` (enum)
  - `last_error` (text)
  - `created_at` (datetime)
  - `updated_at` (datetime)

### bf_content_scanner_ingest
- Field count: 9
  - `id` (int)
  - `scan_name` (varchar) length=255
  - `quote_ts` (datetime)
  - `payload_hash` (varchar) length=64
  - `source` (varchar) length=64
  - `row_count` (int)
  - `status` (enum)
  - `created_at` (datetime)
  - `updated_at` (datetime)

### bf_content_scanner_rows
- Field count: 17
  - `id` (int)
  - `ingest_id` (int)
  - `symbol` (varchar) length=16
  - `raw_json` (longtext)
  - `stage` (decimal) length=10
  - `mark` (decimal) length=16
  - `mark_pct_change` (decimal) length=10
  - `pct_chng_5d` (decimal) length=10
  - `market_cap_m` (decimal) length=16
  - `volume` (bigint)
  - `dollar_vol_m` (decimal) length=16
  - `abvvol` (decimal) length=10
  - `vol_365` (decimal) length=10
  - `high_52w` (decimal) length=16
  - `low_52w` (decimal) length=16
  - `pct_1mo_chg` (decimal) length=10
  - `created_at` (datetime)

### bf_discord_ai_messages
- Field count: 6
  - `id` (int)
  - `session_id` (int)
  - `role` (enum)
  - `content` (mediumtext)
  - `meta_json` (json)
  - `created_at` (datetime)

### bf_discord_ai_notes
- Field count: 10
  - `id` (int)
  - `user_id` (int)
  - `discord_user_id` (varchar) length=64
  - `title` (varchar) length=255
  - `note_type` (varchar) length=64
  - `content` (mediumtext)
  - `tags` (varchar) length=255
  - `encrypted` (tinyint) length=1
  - `created_at` (datetime)
  - `updated_at` (datetime)

### bf_discord_ai_sessions
- Field count: 10
  - `id` (int)
  - `user_id` (int)
  - `discord_user_id` (varchar) length=64
  - `channel_id` (varchar) length=64
  - `session_key` (varchar) length=64
  - `topic` (varchar) length=255
  - `context_json` (json)
  - `is_active` (tinyint) length=1
  - `created_at` (datetime)
  - `updated_at` (datetime)

### bf_discord_channels
- Field count: 15
  - `id` (int)
  - `channel_key` (varchar) length=64
  - `name` (varchar) length=128
  - `webhook_url` (text)
  - `channel_id` (varchar) length=64
  - `is_enabled` (tinyint) length=1
  - `allow_embeds` (tinyint) length=1
  - `min_interval_sec` (int)
  - `last_sent_at` (datetime)
  - `role_id` (varchar) length=64
  - `category` (varchar) length=64
  - `priority` (int)
  - `topic` (varchar) length=255
  - `created_at` (datetime)
  - `updated_at` (datetime)

### bf_discord_events_log
- Field count: 7
  - `id` (bigint)
  - `level` (varchar) length=16
  - `event_key` (varchar) length=64
  - `channel_key` (varchar) length=64
  - `payload_json` (json)
  - `details_json` (json)
  - `created_at` (datetime)

### bf_discord_links
- Field count: 13
  - `id` (int)
  - `user_id` (int)
  - `discord_user_id` (varchar) length=50
  - `discord_username` (varchar) length=255
  - `link_token` (varchar) length=255
  - `token_expires_at` (datetime)
  - `is_linked` (tinyint) length=1
  - `status` (varchar) length=32
  - `ai_persona` (varchar) length=64
  - `last_seen_at` (datetime)
  - `scopes_json` (json)
  - `created_at` (datetime)
  - `updated_at` (datetime)

### bf_discord_logs
- Field count: 7
  - `id` (bigint)
  - `channel` (varchar) length=128
  - `message` (text)
  - `payload_json` (json)
  - `status` (enum)
  - `error_message` (text)
  - `created_at` (datetime)

### bf_discord_message_history
- Field count: 6
  - `id` (bigint)
  - `external_message_id` (varchar) length=128
  - `channel` (varchar) length=128
  - `content_hash` (char) length=64
  - `sent_at` (datetime)
  - `created_at` (datetime)

### bf_discord_policies
- Field count: 6
  - `id` (int)
  - `pattern` (varchar) length=255
  - `action` (enum)
  - `rule_type` (enum)
  - `mask_with` (varchar) length=255
  - `is_enabled` (tinyint) length=1

### bf_discord_queue
- Field count: 12
  - `id` (bigint)
  - `channel_key` (varchar) length=64
  - `payload_json` (json)
  - `status` (enum)
  - `priority` (int)
  - `dedupe_key` (varchar) length=128
  - `coalesce_key` (varchar) length=128
  - `scheduled_at` (datetime)
  - `available_at` (datetime)
  - `error` (text)
  - `created_at` (datetime)
  - `sent_at` (datetime)

### bf_discord_subscriptions
- Field count: 12
  - `id` (int)
  - `event_key` (varchar) length=64
  - `channel_key` (varchar) length=64
  - `template_key` (varchar) length=64
  - `filters_json` (text)
  - `digest_window_sec` (int)
  - `max_per_window` (int)
  - `priority` (varchar) length=64
  - `quiet_bypass` (tinyint) length=1
  - `is_enabled` (tinyint) length=1
  - `created_at` (datetime)
  - `updated_at` (datetime)

### bf_discord_templates
- Field count: 8
  - `id` (int)
  - `template_key` (varchar) length=100
  - `title` (varchar) length=255
  - `content` (text)
  - `embed_json` (text)
  - `is_enabled` (tinyint) length=1
  - `created_at` (datetime)
  - `updated_at` (datetime)

### bf_economic_data_points
- Field count: 5
  - `id` (bigint)
  - `indicator_id` (int)
  - `date` (date)
  - `value` (decimal) length=20
  - `created_on` (datetime)

### bf_economic_indicators
- Field count: 8
  - `id` (int)
  - `name` (varchar) length=100
  - `series_id` (varchar) length=50
  - `source` (varchar) length=50
  - `frequency` (varchar) length=20
  - `unit` (varchar) length=50
  - `created_on` (datetime)
  - `last_updated` (datetime)

### bf_email_bounces
- Field count: 7
  - `id` (bigint)
  - `user_id` (int)
  - `email` (varchar) length=190
  - `provider` (varchar) length=64
  - `event` (varchar) length=32
  - `reason` (varchar) length=255
  - `created_at` (datetime)

### bf_email_campaigns
- Field count: 7
  - `id` (int)
  - `title` (varchar) length=255
  - `subject` (varchar) length=255
  - `body` (text)
  - `recipient_group` (varchar) length=100
  - `created_at` (datetime)
  - `status` (enum)

### bf_email_distribution_lists
- Field count: 6
  - `id` (int)
  - `name` (varchar) length=255
  - `slug` (varchar) length=255
  - `description` (text)
  - `is_active` (tinyint) length=1
  - `created_at` (datetime)

### bf_email_drip_campaign_steps
- Field count: 20
  - `id` (int)
  - `campaign_id` (int)
  - `step_number` (int)
  - `name` (varchar) length=255
  - `subject` (varchar) length=255
  - `description` (text)
  - `audience_tags` (varchar) length=255
  - `priority` (varchar) length=50
  - `created_by` (int)
  - `view_file` (varchar) length=255
  - `delay_days` (int)
  - `delay_hours` (int)
  - `is_active` (tinyint) length=1
  - `created_at` (timestamp)
  - `updated_at` (timestamp)
  - `preview_html` (text)
  - `fallback_text` (text)
  - `dynamic_vars` (text)
  - `template_id` (int)
  - `rule_logic` (text)

### bf_email_drip_campaigns
- Field count: 27
  - `id` (int)
  - `name` (varchar) length=255
  - `description` (text)
  - `trigger_event` (varchar) length=100
  - `is_active` (tinyint) length=1
  - `created_at` (timestamp)
  - `updated_at` (timestamp)
  - `audience_segment` (varchar) length=100
  - `goal` (varchar) length=255
  - `tags` (text)
  - `priority` (enum)
  - `version` (int)
  - `ab_test_group` (varchar) length=20
  - `enable_tracking` (tinyint) length=1
  - `audience_tags` (varchar) length=255
  - `segment_id` (int)
  - `content_type` (varchar) length=50
  - `template_id` (varchar) length=100
  - `utm_source` (varchar) length=100
  - `utm_medium` (varchar) length=100
  - `utm_campaign` (varchar) length=100
  - `enable_ai` (tinyint) length=1
  - `send_delay` (int)
  - `schedule_time` (time)
  - `send_window` (varchar) length=20
  - `logic_json` (json)
  - `created_by` (int)

### bf_email_drip_email_tracking
- Field count: 17
  - `id` (int)
  - `user_id` (int)
  - `campaign_id` (int)
  - `step_id` (int)
  - `message_id` (varchar) length=255
  - `sent_at` (timestamp)
  - `delivered_at` (timestamp)
  - `opened_at` (timestamp)
  - `open_count` (int)
  - `first_clicked_at` (timestamp)
  - `last_clicked_at` (timestamp)
  - `click_count` (int)
  - `last_click_url` (text)
  - `status` (varchar) length=50
  - `bounce_reason` (text)
  - `open_rate` (float)
  - `engagement_score` (float)

### bf_email_list_members
- Field count: 9
  - `id` (int)
  - `list_id` (int)
  - `user_id` (int)
  - `email` (varchar) length=255
  - `status` (enum)
  - `added_by` (int)
  - `added_at` (datetime)
  - `unsubscribe_token` (varchar) length=128
  - `unsubscribed_at` (datetime)

### bf_email_outbox
- Field count: 13
  - `id` (bigint)
  - `user_id` (bigint)
  - `to_email` (varchar) length=255
  - `subject` (varchar) length=255
  - `type` (varchar) length=50
  - `body` (longtext)
  - `headers` (text)
  - `status` (enum)
  - `provider` (varchar) length=50
  - `meta_json` (json)
  - `error_message` (text)
  - `created_at` (datetime)
  - `sent_at` (datetime)

### bf_email_user_drip_progress
- Field count: 11
  - `id` (int)
  - `user_id` (int)
  - `campaign_id` (int)
  - `current_step_id` (int)
  - `next_step_id` (int)
  - `next_send_at` (timestamp)
  - `status` (varchar) length=50
  - `enrolled_at` (timestamp)
  - `last_email_sent_at` (timestamp)
  - `completed_at` (timestamp)
  - `updated_at` (timestamp)

### bf_emails_campaigns
- Field count: 5
  - `id` (int)
  - `title` (varchar) length=255
  - `content` (text)
  - `scheduled_at` (datetime)
  - `created_at` (timestamp)

### bf_error_alert_events
- Field count: 11
  - `id` (int)
  - `rule_id` (int)
  - `triggered_at` (datetime)
  - `window_start` (datetime)
  - `window_end` (datetime)
  - `count` (int)
  - `severity` (varchar) length=20
  - `scope` (varchar) length=50
  - `scope_value` (varchar) length=255
  - `payload` (text)
  - `created_at` (datetime)

### bf_error_alert_rules
- Field count: 12
  - `id` (int)
  - `is_enabled` (tinyint) length=1
  - `name` (varchar) length=255
  - `severity_min` (varchar) length=20
  - `window_minutes` (int)
  - `threshold_count` (int)
  - `scope` (varchar) length=50
  - `scope_value` (varchar) length=255
  - `notify_email` (varchar) length=255
  - `notify_discord_webhook` (text)
  - `created_at` (datetime)
  - `updated_at` (datetime)

### bf_error_consolidated_logs
- Field count: 11
  - `id` (int)
  - `fingerprint` (varchar) length=255
  - `category` (varchar) length=100
  - `error_type` (varchar) length=100
  - `normalized_message` (text)
  - `sample_message` (text)
  - `occurrence_count` (int)
  - `first_seen` (datetime)
  - `last_seen` (datetime)
  - `created_at` (datetime)
  - `type` (varchar) length=100

### bf_error_learning_runs
- Field count: 11
  - `id` (int)
  - `run_uuid` (varchar) length=64
  - `provider` (varchar) length=50
  - `started_at` (datetime)
  - `finished_at` (datetime)
  - `processed` (int)
  - `created` (int)
  - `updated` (int)
  - `skipped` (int)
  - `errors` (int)
  - `notes` (text)

### bf_error_logs
- Field count: 14
  - `id` (int)
  - `type` (varchar) length=10
  - `path` (varchar) length=255
  - `full_url` (text)
  - `ip_address` (varchar) length=45
  - `user_agent` (text)
  - `uri` (varchar) length=255
  - `method` (varchar) length=16
  - `created_at` (datetime)
  - `level` (varchar) length=10
  - `message` (text)
  - `context` (text)
  - `file` (varchar) length=255
  - `line` (int)

### bf_error_patterns
- Field count: 18
  - `id` (int)
  - `fingerprint` (varchar) length=255
  - `category` (varchar) length=100
  - `error_type` (varchar) length=100
  - `severity` (varchar) length=20
  - `title` (varchar) length=255
  - `summary` (text)
  - `likely_root_cause` (text)
  - `suggested_fix` (text)
  - `controllers` (text)
  - `services` (text)
  - `tags` (text)
  - `example_message` (text)
  - `occurrence_count` (int)
  - `first_seen` (datetime)
  - `last_seen` (datetime)
  - `created_at` (datetime)
  - `updated_at` (datetime)

### bf_error_processing_checkpoint
- Field count: 4
  - `id` (int)
  - `process_name` (varchar) length=100
  - `last_processed_id` (bigint)
  - `updated_at` (datetime)

### bf_exchanges
- Field count: 21
  - `id` (int)
  - `status` (varchar) length=32
  - `alt_cur` (varchar) length=32
  - `int_cur` (varchar) length=32
  - `api_url` (varchar) length=256
  - `datetime` (timestamp)
  - `creator` (varchar) length=45
  - `market_pair` (varchar) length=32
  - `market` (varchar) length=32
  - `description` (varchar) length=32
  - `total_coins` (varchar) length=32
  - `coins_available` (varchar) length=32
  - `total_volume` (varchar) length=32
  - `initial_value` (varchar) length=32
  - `current_value` (varchar) length=32
  - `coin_value` (varchar) length=32
  - `gas_fee` (varchar) length=32
  - `trans_percent` (varchar) length=32
  - `trans_fee` (varchar) length=32
  - `image_icon` (varchar) length=512
  - `icon` (varchar) length=64

### bf_exchanges_assets
- Field count: 111
  - `id` (int)
  - `project_id` (int)
  - `asset_role` (enum)
  - `asset_type` (varchar) length=64
  - `name` (varchar) length=255
  - `metadata_json` (json)
  - `location_text` (varchar) length=255
  - `external_refs_json` (json)
  - `parent_asset_id` (int)
  - `chain` (enum)
  - `token_symbol` (varchar) length=32
  - `token_address` (varchar) length=255
  - `active` (varchar) length=45
  - `status` (varchar) length=45
  - `unix_timestamp` (varchar) length=45
  - `date` (varchar) length=45
  - `time` (varchar) length=45
  - `partner` (varchar) length=45
  - `user_id` (varchar) length=45
  - `user_email` (varchar) length=90
  - `first_name` (varchar) length=45
  - `middle_name` (varchar) length=45
  - `last_name` (varchar) length=45
  - `name_suffix` (varchar) length=45
  - `phone` (varchar) length=45
  - `company_name` (varchar) length=45
  - `address` (varchar) length=45
  - `city` (varchar) length=45
  - `state` (varchar) length=45
  - `country` (varchar) length=45
  - `zipcode` (varchar) length=45
  - `is_tradable` (int)
  - `listing_type` (varchar) length=45
  - `blockchain_id` (varchar) length=45
  - `blockchain` (varchar) length=45
  - `blockchain_name` (varchar) length=45
  - `dex_id` (text)
  - `dex_url` (text)
  - `dex_pair` (text)
  - `dex_swap_name` (varchar) length=255
  - `dex_swap_symbol` (varchar) length=45
  - `dex_swap_address` (text)
  - `symbol` (varchar) length=45
  - `coin_name` (varchar) length=255
  - `coin_address` (text)
  - `coin_quantity` (varchar) length=45
  - `coin_value` (varchar) length=45
  - `initial_value` (varchar) length=45
  - `market_cap` (varchar) length=45
  - `volume` (text)
  - `volume_array` (text)
  - `price_change` (text)
  - `liquidity` (text)
  - `fdv` (text)
  - `purpose` (varchar) length=45
  - `description` (text)
  - `coin_file` (text)
  - `coin_logo` (text)
  - `coin_links` (text)
  - `decimals` (varchar) length=45
  - `total_supply` (decimal) length=24
  - `minted_supply` (decimal) length=24
  - `token_status` (enum)
  - `created_at` (datetime)
  - `updated_at` (datetime)
  - `performance` (varchar) length=45
  - `coin_redistribution_count` (int)
  - `coin_redistribution_percentage` (decimal) length=10
  - `amount_of_new_coins_redistributed` (decimal) length=20
  - `total_summary_of_existing_coins_new_coins` (decimal) length=20
  - `amount_of_coins_available_for_sale` (decimal) length=20
  - `current_coin_value` (decimal) length=20
  - `amount_of_coins_purchased` (decimal) length=20
  - `cost_of_amount_of_coins_purchased` (decimal) length=20
  - `new_market_cap` (decimal) length=20
  - `new_coin_value` (decimal) length=20
  - `initial_coins_available` (decimal) length=20
  - `coins_remaining` (decimal) length=20
  - `coins_purchased` (decimal) length=20
  - `gas_fee` (decimal) length=20
  - `trans_percentage_fee` (decimal) length=20
  - `sales_tax_fee` (decimal) length=20
  - `gas_fee_costs` (decimal) length=20
  - `trans_percentage_costs` (decimal) length=20
  - `sales_tax_fee_cost` (decimal) length=20
  - `collected_fees` (decimal) length=20
  - `collected_fees_cost` (decimal) length=20
  - `fee_profits` (decimal) length=20
  - `user_total_transaction_cost` (decimal) length=20
  - `blog` (varchar) length=255
  - `coingeckoID` (varchar) length=255
  - `coinmarketcap` (varchar) length=255
  - `discord` (varchar) length=255
  - `discord_active` (int)
  - `facebook` (varchar) length=255
  - `facebook_active` (int)
  - `instagram` (varchar) length=255
  - `instagram_active` (int)
  - `medium` (varchar) length=255
  - `medium_active` (int)
  - `reddit` (varchar) length=255
  - `reddit_active` (int)
  - `telegram` (varchar) length=255
  - `telegram_active` (int)
  - `twitter` (varchar) length=255
  - `twitter_active` (int)
  - `website` (varchar) length=255
  - `website_active` (int)
  - `tags` (text)
  - `premium_tier` (enum)
  - `marketing_features` (json)

### bf_exchanges_assets_ledger
- Field count: 27
  - `id` (int)
  - `beta` (int)
  - `active` (int)
  - `status` (varchar) length=45
  - `deleted` (int)
  - `created_on` (datetime)
  - `acquired_at` (datetime)
  - `lockup_until` (datetime)
  - `completed_on` (datetime)
  - `user_id` (int)
  - `project_id` (int)
  - `token_id` (int)
  - `from_token` (varchar) length=255
  - `to_token` (varchar) length=255
  - `amount` (decimal) length=20
  - `share_units` (decimal) length=24
  - `cost_basis` (decimal) length=15
  - `fees` (decimal) length=20
  - `transaction_result` (text)
  - `suspicious` (tinyint) length=1
  - `suspicious_reason` (varchar) length=255
  - `reported` (int)
  - `reported_at` (datetime)
  - `reported_by` (int)
  - `kyc_status` (varchar) length=50
  - `service_fee` (decimal) length=10
  - `total_fee` (decimal) length=10

### bf_exchanges_coin_addresses
- Field count: 9
  - `id` (int)
  - `user_id` (int)
  - `chain` (varchar) length=32
  - `address` (varchar) length=64
  - `label` (varchar) length=128
  - `is_default` (tinyint) length=1
  - `created_at` (datetime)
  - `updated_at` (datetime)
  - `default_key` (varchar) length=96

### bf_exchanges_listing_request
- Field count: 32
  - `id` (int)
  - `status` (varchar) length=45
  - `unix_timestamp` (varchar) length=45
  - `date` (varchar) length=45
  - `time` (varchar) length=45
  - `partner` (varchar) length=45
  - `user_id` (varchar) length=45
  - `user_email` (varchar) length=90
  - `first_name` (varchar) length=45
  - `middle_name` (varchar) length=45
  - `last_name` (varchar) length=45
  - `name_suffix` (varchar) length=45
  - `phone` (varchar) length=45
  - `company_name` (varchar) length=45
  - `address` (varchar) length=45
  - `city` (varchar) length=45
  - `state` (varchar) length=45
  - `country` (varchar) length=45
  - `zipcode` (varchar) length=45
  - `listing_type` (varchar) length=45
  - `blockchain_id` (varchar) length=45
  - `blockchain` (varchar) length=45
  - `blockchain_name` (varchar) length=45
  - `symbol` (varchar) length=45
  - `coin_name` (varchar) length=45
  - `coin_quantity` (varchar) length=45
  - `coin_value` (varchar) length=45
  - `purpose` (varchar) length=45
  - `description` (text)
  - `coin_file` (varchar) length=45
  - `coin_logo` (varchar) length=45
  - `coin_links` (varchar) length=45

### bf_exchanges_orders
- Field count: 45
  - `id` (int)
  - `auction_id` (int)
  - `project_id` (int)
  - `token_id` (int)
  - `active` (int)
  - `status` (varchar) length=32
  - `unix_timestamp` (varchar) length=32
  - `current_date` (datetime)
  - `created_at` (datetime)
  - `month` (varchar) length=32
  - `day` (varchar) length=32
  - `year` (varchar) length=32
  - `time` (varchar) length=32
  - `trade_type` (varchar) length=32
  - `beta` (varchar) length=32
  - `user_id` (varchar) length=32
  - `user_email` (varchar) length=512
  - `trading_account` (varchar) length=32
  - `wallet_id` (varchar) length=128
  - `market_pair` (varchar) length=32
  - `market` (varchar) length=32
  - `initial_value` (varchar) length=32
  - `available_coins` (varchar) length=32
  - `amount` (varchar) length=32
  - `remaining_amount` (varchar) length=32
  - `minimum_purchase` (varchar) length=32
  - `total` (varchar) length=32
  - `remaining_coins` (varchar) length=32
  - `gas_fee` (varchar) length=32
  - `user_gas_fee` (varchar) length=32
  - `trans_percent` (varchar) length=32
  - `user_trans_percent` (varchar) length=32
  - `trans_fee` (varchar) length=32
  - `user_trans_fees` (varchar) length=32
  - `fees` (varchar) length=32
  - `total_cost` (varchar) length=32
  - `current_value` (varchar) length=32
  - `new_availability` (varchar) length=32
  - `initial_coin_value` (varchar) length=32
  - `new_coin_value` (varchar) length=32
  - `quoted_price` (decimal) length=12
  - `requested_units` (int)
  - `filled_units` (int)
  - `amount_usd` (decimal) length=14
  - `bid_status` (enum)

### bf_exchanges_transactions
- Field count: 13
  - `id` (int)
  - `chain` (varchar) length=32
  - `tx_hash` (varchar) length=255
  - `direction` (enum)
  - `from_addr` (varchar) length=255
  - `to_addr` (varchar) length=255
  - `amount` (decimal) length=24
  - `token_symbol` (varchar) length=32
  - `related_table` (varchar) length=64
  - `related_id` (int)
  - `status` (enum)
  - `created_at` (datetime)
  - `updated_at` (datetime)

### bf_financial_goals
- Field count: 9
  - `id` (int)
  - `user_id` (int)
  - `goal_name` (varchar) length=255
  - `goal_type` (varchar) length=50
  - `target_amount` (decimal) length=15
  - `current_amount` (decimal) length=15
  - `due_date` (datetime)
  - `created_on` (datetime)
  - `modified_on` (datetime)

### bf_frontend_incidents
- Field count: 10
  - `id` (bigint)
  - `incident_type` (varchar) length=32
  - `source_file` (varchar) length=128
  - `endpoint` (varchar) length=255
  - `message` (text)
  - `severity` (varchar) length=16
  - `raw_blob` (longtext)
  - `created_at` (datetime)
  - `processed_at` (datetime)
  - `status` (varchar) length=16

### bf_ftp_file_data
- Field count: 3
  - `id` (int)
  - `filename` (varchar) length=255
  - `data` (json)

### bf_health_registry
- Field count: 24
  - `id` (bigint)
  - `domain` (varchar) length=64
  - `name` (varchar) length=190
  - `description` (text)
  - `type` (varchar) length=32
  - `target` (varchar) length=255
  - `priority` (varchar) length=8
  - `enabled` (tinyint) length=1
  - `dry_run_supported` (tinyint) length=1
  - `timeout_ms` (int)
  - `auth_mode` (varchar) length=32
  - `request_method` (varchar) length=12
  - `request_path` (varchar) length=255
  - `payload_json` (json)
  - `headers_json` (json)
  - `expected_status` (smallint)
  - `expected_json_contains` (json)
  - `expected_schema_json` (json)
  - `cooldown_seconds` (int)
  - `max_runs_per_hour` (int)
  - `created_by` (bigint)
  - `updated_by` (bigint)
  - `created_at` (datetime)
  - `updated_at` (datetime)

### bf_health_run_results
- Field count: 18
  - `id` (bigint)
  - `run_id` (bigint)
  - `registry_id` (bigint)
  - `status` (varchar) length=16
  - `attempts` (int)
  - `started_at` (datetime)
  - `finished_at` (datetime)
  - `duration_ms` (int)
  - `http_status` (smallint)
  - `error_code` (varchar) length=64
  - `error_message` (text)
  - `assertions_json` (json)
  - `request_debug_json` (json)
  - `response_debug_json` (json)
  - `domain` (varchar) length=64
  - `priority` (varchar) length=8
  - `type` (varchar) length=32
  - `target` (varchar) length=255

### bf_health_runs
- Field count: 25
  - `id` (bigint)
  - `rid` (char) length=32
  - `command` (varchar) length=190
  - `domain_filter` (varchar) length=64
  - `priority_filter` (varchar) length=8
  - `dry_run` (tinyint) length=1
  - `status` (varchar) length=16
  - `total_checks` (int)
  - `pass_count` (int)
  - `fail_count` (int)
  - `warn_count` (int)
  - `skip_count` (int)
  - `started_at` (datetime)
  - `finished_at` (datetime)
  - `duration_ms` (int)
  - `env_json` (json)
  - `host` (varchar) length=190
  - `app_version` (varchar) length=64
  - `php_version` (varchar) length=32
  - `triggered_by_user_id` (int)
  - `triggered_by` (varchar) length=32
  - `ip_address` (varchar) length=64
  - `user_agent` (varchar) length=255
  - `notes` (text)
  - `error_summary` (text)

### bf_import_files
- Field count: 7
  - `id` (bigint)
  - `file_name` (varchar) length=255
  - `file_hash` (varchar) length=64
  - `status` (varchar) length=30
  - `records_imported` (int)
  - `processed_at` (datetime)
  - `created_at` (datetime)

### bf_investment_advisor_log
- Field count: 18
  - `id` (int)
  - `user_id` (int)
  - `advisor_type` (varchar) length=50
  - `last_generated` (datetime)
  - `status` (enum)
  - `summary` (text)
  - `script` (text)
  - `voiceover_url` (varchar) length=255
  - `voiceover_error` (text)
  - `media_json_url` (text)
  - `chart_url` (text)
  - `ticker` (text)
  - `media_zip_url` (varchar) length=255
  - `score` (decimal) length=6
  - `risk_rating` (varchar) length=50
  - `flag_opportunity` (tinyint) length=1
  - `created_on` (datetime)
  - `updated_on` (datetime)

### bf_investment_alert_enrichment
- Field count: 19
  - `id` (int)
  - `alert_id` (int)
  - `symbol` (varchar) length=128
  - `exchange` (varchar) length=128
  - `av_price` (decimal) length=10
  - `av_open` (decimal) length=10
  - `av_high` (decimal) length=10
  - `av_low` (decimal) length=10
  - `av_volume` (bigint)
  - `av_previous_close` (decimal) length=10
  - `av_change` (decimal) length=10
  - `av_change_percent` (varchar) length=16
  - `tv_financials_summary` (text)
  - `tv_technicals_summary` (text)
  - `tv_options_summary` (text)
  - `tv_news_snippets` (text)
  - `summary_generated` (text)
  - `gpt_template_used` (text)
  - `created_at` (datetime)

### bf_investment_alert_history
- Field count: 125
  - `id` (int)
  - `active` (int)
  - `status` (varchar) length=128
  - `occurrences` (int)
  - `alert_count` (int)
  - `distributed_count` (int)
  - `trade_id` (int)
  - `created_on` (varchar) length=128
  - `updated_at` (varchar) length=256
  - `date` (datetime)
  - `display` (varchar) length=128
  - `alert_created` (tinyint) length=1
  - `send_alert` (tinyint) length=1
  - `sent_on` (datetime)
  - `alert_sent` (tinyint) length=1
  - `alerted_on` (datetime)
  - `email_sent` (int)
  - `submitted_date` (varchar) length=128
  - `ticker` (varchar) length=10
  - `social_twitter` (text)
  - `social_facebook` (text)
  - `social_linkedin` (text)
  - `social_discord` (text)
  - `email_content` (text)
  - `blog_content` (text)
  - `voiceover_script` (text)
  - `category` (varchar) length=128
  - `market_session` (varchar) length=128
  - `type` (varchar) length=128
  - `free` (varchar) length=128
  - `basic` (varchar) length=128
  - `premium` (varchar) length=128
  - `gold` (varchar) length=128
  - `exchange` (varchar) length=128
  - `company` (varchar) length=128
  - `open` (decimal) length=10
  - `high` (decimal) length=10
  - `high52` (decimal) length=10
  - `low` (decimal) length=10
  - `low52` (decimal) length=10
  - `price` (decimal) length=10
  - `volume` (bigint)
  - `volume_actual` (bigint)
  - `ema5` (varchar) length=45
  - `ema8` (varchar) length=45
  - `ema13` (varchar) length=45
  - `ema34` (varchar) length=45
  - `ema48` (varchar) length=45
  - `off_high` (decimal) length=10
  - `off_high52` (decimal) length=10
  - `off_low` (decimal) length=10
  - `off_low52` (decimal) length=10
  - `latest_trading_day` (date)
  - `previous_close` (decimal) length=10
  - `change` (decimal) length=10
  - `market_cap` (varchar) length=20
  - `change_percent` (varchar) length=20
  - `link` (varchar) length=256
  - `current_price` (varchar) length=128
  - `potential_price` (varchar) length=32
  - `differential` (varchar) length=32
  - `potential_gain` (varchar) length=32
  - `stop_loss_percent` (varchar) length=32
  - `stop_loss_differential` (varchar) length=32
  - `stop_loss` (varchar) length=32
  - `support` (varchar) length=128
  - `max_entry` (varchar) length=128
  - `price_high` (varchar) length=32
  - `percent_change` (int)
  - `last_updated` (varchar) length=128
  - `last_updated_time` (varchar) length=128
  - `updated_stop_loss_differential` (varchar) length=128
  - `updated_stop_loss` (varchar) length=128
  - `closing_date` (varchar) length=128
  - `closing_time` (varchar) length=128
  - `details` (text)
  - `updated_details` (text)
  - `closing_details` (text)
  - `financial_news` (text)
  - `video_link` (varchar) length=256
  - `send_msg` (varchar) length=128
  - `expdate` (varchar) length=128
  - `option_type` (varchar) length=128
  - `expiration` (varchar) length=128
  - `option_price` (varchar) length=128
  - `strike` (varchar) length=128
  - `chart_image` (varchar) length=512
  - `watchlist` (varchar) length=128
  - `tv_chart` (varchar) length=256
  - `tv_chart_type` (varchar) length=20
  - `notification_sent` (tinyint)
  - `trade_description` (text)
  - `trade_chart_link` (varchar) length=255
  - `last_scrape_timestamp` (datetime)
  - `last_alert_processed` (datetime)
  - `processing_status` (enum)
  - `trade_alert_id` (int)
  - `updated_on` (datetime)
  - `market_sentiment` (varchar) length=255
  - `free_chart_link` (varchar) length=255
  - `premium_chart_link` (varchar) length=255
  - `ema_3_8` (varchar) length=10
  - `ema_8_13` (varchar) length=10
  - `ema_13_34` (varchar) length=10
  - `ema_34_48` (varchar) length=10
  - `ema_consensus` (int)
  - `trade_type` (varchar) length=45
  - `target_price` (decimal) length=10
  - `locked_profit_stop` (decimal) length=10
  - `trailing_stop_percent` (decimal) length=5
  - `alert_priority` (varchar) length=128
  - `analysis_summary` (text)
  - `ema_9` (varchar) length=45
  - `ema_21` (varchar) length=45
  - `ema_34` (varchar) length=45
  - `ema_48` (varchar) length=45
  - `ema_100` (varchar) length=45
  - `ema_200` (varchar) length=45
  - `ema_3` (decimal) length=10
  - `ema_8` (decimal) length=10
  - `ema_13` (decimal) length=10
  - `sma_50` (decimal) length=10
  - `sma_200` (decimal) length=10
  - `macd` (decimal) length=10
  - `rsi` (decimal) length=10

### bf_investment_calendar
- Field count: 16
  - `id` (int)
  - `date` (datetime)
  - `symbol` (varchar) length=20
  - `event_type` (varchar) length=100
  - `description` (text)
  - `event_time` (time)
  - `earnings_report` (text)
  - `percent_gain_loss` (decimal) length=5
  - `open_price` (decimal) length=10
  - `close_price` (decimal) length=10
  - `created_at` (timestamp)
  - `volume` (bigint)
  - `previous_close` (decimal) length=10
  - `forecast` (varchar) length=100
  - `actual` (varchar) length=100
  - `difference` (decimal) length=10

### bf_investment_economic_data
- Field count: 28
  - `id` (int)
  - `title` (varchar) length=255
  - `notes` (text)
  - `realtime_start` (date)
  - `realtime_end` (date)
  - `observation_start` (date)
  - `observation_end` (date)
  - `frequency` (varchar) length=100
  - `units` (varchar) length=100
  - `seasonal_adjustment` (varchar) length=100
  - `last_updated` (datetime)
  - `popularity` (int)
  - `series_id` (varchar) length=255
  - `frequency_short` (varchar) length=100
  - `units_short` (varchar) length=100
  - `seasonal_adjustment_short` (varchar) length=100
  - `filter_variable` (varchar) length=255
  - `filter_value` (varchar) length=255
  - `order_by` (varchar) length=255
  - `sort_order` (varchar) length=100
  - `count` (int)
  - `offset` (int)
  - `content_limit` (int)
  - `geographical_info` (text)
  - `source_link` (varchar) length=255
  - `category` (varchar) length=255
  - `full_content` (text)
  - `summarized_content` (text)

### bf_investment_filings
- Field count: 8
  - `id` (int)
  - `symbol` (varchar) length=10
  - `cik` (varchar) length=12
  - `accession_number` (varchar) length=32
  - `filing_date` (date)
  - `form_type` (varchar) length=16
  - `document_url` (text)
  - `created_on` (datetime)

### bf_investment_forecast_accuracy
- Field count: 18
  - `id` (bigint)
  - `forecast_id` (bigint)
  - `ticker` (varchar) length=16
  - `timeframe` (varchar) length=16
  - `evaluation_window` (int)
  - `forecast_direction` (enum)
  - `confidence_score` (int)
  - `target_price` (decimal) length=16
  - `range_low` (decimal) length=16
  - `range_high` (decimal) length=16
  - `hit_result` (varchar) length=16
  - `mfe` (decimal) length=16
  - `mae` (decimal) length=16
  - `window_start` (datetime)
  - `window_end` (datetime)
  - `evaluated_at` (datetime)
  - `notes` (text)
  - `created_at` (datetime)

### bf_investment_forecast_history
- Field count: 8
  - `id` (bigint)
  - `symbol` (varchar) length=32
  - `forecast_type` (varchar) length=64
  - `forecast_data` (json)
  - `confidence_score` (decimal) length=6
  - `forecast_updated_at` (datetime)
  - `recorded_at` (datetime)
  - `created_at` (datetime)

### bf_investment_forecast_jobs
- Field count: 9
  - `id` (bigint)
  - `alert_id` (bigint)
  - `ticker` (varchar) length=16
  - `status` (varchar) length=16
  - `attempts` (int)
  - `run_after` (datetime)
  - `payload_json` (longtext)
  - `created_at` (datetime)
  - `updated_at` (datetime)

### bf_investment_fundamentals
- Field count: 20
  - `id` (int)
  - `trade_id` (int)
  - `metric` (varchar) length=255
  - `current_value` (varchar) length=50
  - `yoy_change` (varchar) length=50
  - `year_2020` (varchar) length=50
  - `year_2021` (varchar) length=50
  - `year_2022` (varchar) length=50
  - `year_2023` (varchar) length=50
  - `year_2024` (varchar) length=50
  - `pe_ratio` (decimal) length=10
  - `pb_ratio` (decimal) length=10
  - `roe` (decimal) length=10
  - `profit_margin` (decimal) length=10
  - `debt_to_equity` (decimal) length=10
  - `current_ratio` (decimal) length=10
  - `quick_ratio` (decimal) length=10
  - `eps_growth` (decimal) length=10
  - `free_cash_flow` (decimal) length=10
  - `created_at` (timestamp)

### bf_investment_price_forecasts
- Field count: 14
  - `id` (bigint)
  - `alert_id` (bigint)
  - `ticker` (varchar) length=16
  - `timeframe` (varchar) length=16
  - `forecast_direction` (enum)
  - `target_price` (decimal) length=16
  - `range_low` (decimal) length=16
  - `range_high` (decimal) length=16
  - `confidence_score` (int)
  - `signal_score` (decimal) length=10
  - `indicators_json` (longtext)
  - `data_source` (varchar) length=32
  - `created_at` (datetime)
  - `updated_at` (datetime)

### bf_investment_scanner_lineage
- Field count: 7
  - `id` (bigint)
  - `scanner_key` (varchar) length=64
  - `scanner_name` (varchar) length=190
  - `source` (varchar) length=64
  - `meta_json` (json)
  - `created_at` (datetime)
  - `updated_at` (datetime)

### bf_investment_scraper
- Field count: 78
  - `id` (int)
  - `status` (varchar) length=50
  - `email_type` (enum)
  - `news_vendor` (varchar) length=255
  - `symbols` (varchar) length=255
  - `type` (varchar) length=100
  - `url` (varchar) length=255
  - `title` (varchar) length=255
  - `summary` (text)
  - `content` (mediumtext)
  - `email_identifier` (varchar) length=100
  - `email_date` (datetime)
  - `email_sender` (varchar) length=255
  - `email_subject` (varchar) length=500
  - `email_body` (mediumtext)
  - `email_attachments` (longtext)
  - `keywords` (text)
  - `scraped_at` (datetime)
  - `created_on` (datetime)
  - `modified_on` (datetime)
  - `links` (text)
  - `images` (text)
  - `videos` (text)
  - `metadata` (text)
  - `structured_data` (text)
  - `additional_html_elements` (text)
  - `page_performance_data` (text)
  - `network_requests` (text)
  - `user_interaction_points` (text)
  - `accessibility_information` (text)
  - `page_relationships` (text)
  - `seo_elements` (text)
  - `social_media_links` (text)
  - `comments_user_generated_content` (text)
  - `contact_information` (text)
  - `legal_information` (text)
  - `breadcrumbs` (text)
  - `date_time` (datetime)
  - `author_information` (text)
  - `ratings_reviews` (text)
  - `price_information` (text)
  - `location_data` (text)
  - `language_locale` (text)
  - `mobile_responsiveness` (text)
  - `security_information` (text)
  - `technology_stack` (text)
  - `server_information` (text)
  - `caching_information` (text)
  - `content_type` (text)
  - `character_set` (text)
  - `rss_atom_feeds` (text)
  - `pagination` (text)
  - `custom_data` (text)
  - `error_handling` (text)
  - `historical_changes` (text)
  - `user_reviews_ratings` (text)
  - `inventory_levels` (text)
  - `shipping_information` (text)
  - `bots_crawlers_information` (text)
  - `affiliate_links` (text)
  - `advertisements` (text)
  - `cookie_notices` (text)
  - `popups_modals` (text)
  - `browser_specific_data` (text)
  - `geolocation_specific_content` (text)
  - `ab_testing_variations` (text)
  - `user_agent_specific_content` (text)
  - `screen_size_specific_content` (text)
  - `device_specific_content` (text)
  - `browser_extension_data` (text)
  - `custom_scripts_analytics` (text)
  - `category` (varchar) length=255
  - `tag` (varchar) length=255
  - `class` (varchar) length=255
  - `segment` (varchar) length=255
  - `source` (varchar) length=32
  - `account_type` (varchar) length=16
  - `message_hash` (char) length=64

### bf_investment_signal_files
- Field count: 14
  - `id` (bigint)
  - `week_key` (varchar) length=8
  - `file_date` (date)
  - `file_path` (varchar) length=255
  - `file_name` (varchar) length=190
  - `category` (varchar) length=64
  - `signal_type` (varchar) length=64
  - `file_hash` (char) length=64
  - `rows_total` (int)
  - `rows_inserted` (int)
  - `rows_skipped` (int)
  - `processed_at` (datetime)
  - `created_at` (datetime)
  - `updated_at` (datetime)

### bf_investment_signals
- Field count: 15
  - `id` (bigint)
  - `week_key` (varchar) length=8
  - `signal_date` (date)
  - `symbol` (varchar) length=16
  - `category` (varchar) length=64
  - `signal_type` (varchar) length=64
  - `source` (varchar) length=32
  - `source_file` (varchar) length=255
  - `row_hash` (char) length=64
  - `score` (int)
  - `appearances` (int)
  - `metrics_json` (text)
  - `status` (varchar) length=16
  - `created_at` (datetime)
  - `updated_at` (datetime)

### bf_investment_stock_listing
- Field count: 7
  - `id` (int)
  - `symbol` (varchar) length=50
  - `company_name` (varchar) length=255
  - `market_cap` (decimal) length=15
  - `sector` (varchar) length=50
  - `industry` (varchar) length=50
  - `created_on` (datetime)

### bf_investment_strategies
- Field count: 6
  - `id` (int)
  - `user_id` (int)
  - `strategy_name` (varchar) length=255
  - `description` (text)
  - `created_on` (datetime)
  - `modified_on` (datetime)

### bf_investment_technical_snapshots
- Field count: 26
  - `id` (int)
  - `ticker` (varchar) length=10
  - `snapshot_date` (date)
  - `ema_3` (decimal) length=10
  - `ema_8` (decimal) length=10
  - `ema_13` (decimal) length=10
  - `ema_21` (decimal) length=10
  - `ema_34` (decimal) length=10
  - `ema_48` (decimal) length=10
  - `ema_analysis` (varchar) length=128
  - `sma_50` (decimal) length=10
  - `sma_200` (decimal) length=10
  - `ross_analysis` (varchar) length=128
  - `rsi` (decimal) length=5
  - `macd` (decimal) length=10
  - `macd_signal` (decimal) length=10
  - `bollinger_band_width` (decimal) length=10
  - `adx` (decimal) length=10
  - `stochastic_k` (decimal) length=10
  - `stochastic_d` (decimal) length=10
  - `gap_up_flag` (tinyint) length=1
  - `news_sentiment` (varchar) length=32
  - `volume` (bigint)
  - `volume_usd` (bigint)
  - `price` (decimal) length=10
  - `created_on` (datetime)

### bf_investment_ticker_daily_counts
- Field count: 8
  - `id` (bigint)
  - `ticker` (varchar) length=16
  - `scan_date` (date)
  - `source` (varchar) length=64
  - `scanner_key` (varchar) length=64
  - `occurrences` (int)
  - `created_at` (datetime)
  - `updated_at` (datetime)

### bf_investment_tickers
- Field count: 11
  - `id` (int)
  - `symbol` (varchar) length=10
  - `name` (varchar) length=255
  - `currency` (varchar) length=10
  - `exchange` (varchar) length=50
  - `created_on` (datetime)
  - `market_cap` (decimal) length=20
  - `mic_code` (varchar) length=10
  - `country` (varchar) length=100
  - `type` (varchar) length=50
  - `cik` (varchar) length=10

### bf_investment_tickers_nw
- Field count: 7
  - `id` (int)
  - `symbol` (varchar) length=16
  - `source` (varchar) length=64
  - `reason` (text)
  - `failure_count` (int)
  - `first_detected` (datetime)
  - `last_detected` (datetime)

### bf_investment_trade_alert_changes
- Field count: 30
  - `id` (int)
  - `alert_id` (int)
  - `change_type` (enum)
  - `previous_status` (varchar) length=128
  - `new_status` (varchar) length=128
  - `previous_price` (decimal) length=10
  - `new_price` (decimal) length=10
  - `previous_volume` (bigint)
  - `new_volume` (bigint)
  - `created_at` (timestamp)
  - `change_detected` (datetime)
  - `ema_3` (decimal) length=10
  - `ema_8` (decimal) length=10
  - `ema_9` (decimal) length=10
  - `ema_13` (decimal) length=10
  - `ema_21` (decimal) length=10
  - `ema_34` (decimal) length=10
  - `ema_48` (decimal) length=10
  - `ema_100` (decimal) length=10
  - `ema_200` (decimal) length=10
  - `sma_50` (decimal) length=10
  - `sma_200` (decimal) length=10
  - `macd` (decimal) length=10
  - `rsi` (decimal) length=10
  - `volume` (decimal) length=10
  - `ema_3_8` (varchar) length=10
  - `ema_8_13` (varchar) length=10
  - `ema_13_34` (varchar) length=10
  - `ema_34_48` (varchar) length=10
  - `ema_consensus` (varchar) length=10

### bf_investment_trade_alert_enrichment
- Field count: 5
  - `id` (int)
  - `symbol` (varchar) length=10
  - `summary` (text)
  - `keywords` (text)
  - `created_at` (datetime)

### bf_investment_trade_alerts
- Field count: 141
  - `id` (int)
  - `latest_forecast_id` (bigint)
  - `forecast_confidence` (int)
  - `forecast_direction` (varchar) length=16
  - `forecast_target_price` (decimal) length=16
  - `forecast_range_low` (decimal) length=16
  - `forecast_range_high` (decimal) length=16
  - `forecast_updated_at` (datetime)
  - `active` (int)
  - `status` (varchar) length=128
  - `occurrences` (int)
  - `alert_count` (int)
  - `distributed_count` (int)
  - `created_on` (varchar) length=128
  - `created_by` (int)
  - `updated_at` (varchar) length=256
  - `date` (datetime)
  - `display` (varchar) length=128
  - `alert_created` (tinyint) length=1
  - `send_alert` (tinyint) length=1
  - `alert_sent` (tinyint) length=1
  - `submitted_date` (varchar) length=128
  - `time` (varchar) length=128
  - `category` (varchar) length=128
  - `title` (varchar) length=255
  - `summary` (text)
  - `keywords` (text)
  - `tag` (varchar) length=128
  - `class` (varchar) length=128
  - `segment` (varchar) length=128
  - `trade_type` (varchar) length=45
  - `alert_priority` (varchar) length=128
  - `analysis_summary` (text)
  - `market_session` (varchar) length=128
  - `market_sentiment` (varchar) length=128
  - `type` (varchar) length=128
  - `free` (varchar) length=128
  - `basic` (varchar) length=128
  - `premium` (varchar) length=128
  - `gold` (varchar) length=128
  - `ticker` (varchar) length=128
  - `direction` (varchar) length=16
  - `exchange` (varchar) length=128
  - `market_data_status` (varchar) length=32
  - `company` (text)
  - `open` (decimal) length=10
  - `high` (decimal) length=10
  - `high52` (decimal) length=10
  - `low` (decimal) length=10
  - `low52` (decimal) length=10
  - `price` (decimal) length=10
  - `volume` (bigint)
  - `volume_actual` (bigint)
  - `ema5` (varchar) length=45
  - `ema8` (varchar) length=45
  - `ema13` (varchar) length=45
  - `ema34` (varchar) length=45
  - `ema48` (varchar) length=45
  - `off_high` (decimal) length=10
  - `off_high52` (decimal) length=10
  - `off_low` (decimal) length=10
  - `off_low52` (decimal) length=10
  - `latest_trading_day` (date)
  - `previous_close` (decimal) length=10
  - `change` (decimal) length=10
  - `market_cap` (varchar) length=20
  - `change_percent` (varchar) length=20
  - `link` (varchar) length=256
  - `current_price` (varchar) length=128
  - `potential_price` (varchar) length=32
  - `differential` (varchar) length=32
  - `potential_gain` (varchar) length=32
  - `stop_loss_percent` (varchar) length=32
  - `stop_loss_differential` (varchar) length=32
  - `stop_loss` (varchar) length=32
  - `support` (varchar) length=128
  - `entry_price` (decimal) length=10
  - `max_entry` (varchar) length=128
  - `price_high` (varchar) length=32
  - `percent_change` (int)
  - `trailing_stop_target` (decimal) length=5
  - `trailing_stop_percent` (decimal) length=5
  - `target_price` (decimal) length=10
  - `locked_profit_stop` (decimal) length=10
  - `last_updated` (varchar) length=128
  - `last_updated_time` (varchar) length=128
  - `last_marketed_at` (datetime)
  - `marketing_status` (varchar) length=32
  - `distribution_channels` (text)
  - `updated_stop_loss_differential` (varchar) length=128
  - `updated_stop_loss` (varchar) length=128
  - `closing_date` (varchar) length=128
  - `closing_time` (varchar) length=128
  - `details` (text)
  - `updated_details` (text)
  - `closing_details` (text)
  - `financial_news` (text)
  - `video_link` (varchar) length=256
  - `send_msg` (varchar) length=128
  - `expdate` (varchar) length=128
  - `option_type` (varchar) length=128
  - `expiration` (varchar) length=128
  - `option_price` (varchar) length=128
  - `strike` (varchar) length=128
  - `chart_image` (varchar) length=512
  - `watchlist` (varchar) length=128
  - `tv_title` (varchar) length=60
  - `tv_chart` (varchar) length=256
  - `tv_chart_type` (varchar) length=20
  - `tv_description` (text)
  - `notification_sent` (tinyint)
  - `trade_description` (text)
  - `trade_chart_link` (varchar) length=255
  - `ema_3_8` (varchar) length=10
  - `ema_8_13` (varchar) length=10
  - `ema_13_34` (varchar) length=10
  - `ema_34_48` (varchar) length=10
  - `ema_consensus` (int)
  - `ema_9` (varchar) length=10
  - `ema_21` (varchar) length=10
  - `ema_34` (varchar) length=10
  - `ema_48` (varchar) length=10
  - `ema_100` (varchar) length=10
  - `ema_200` (varchar) length=10
  - `ema_3` (decimal) length=10
  - `ema_8` (decimal) length=10
  - `ema_13` (decimal) length=10
  - `sma_50` (decimal) length=10
  - `sma_200` (decimal) length=10
  - `macd` (decimal) length=10
  - `rsi` (decimal) length=10
  - `modified_on` (datetime)
  - `source` (varchar) length=32
  - `account_type` (varchar) length=16
  - `broker_order_id` (varchar) length=64
  - `execution_id` (char) length=64
  - `filled_qty` (decimal) length=18
  - `filled_price` (decimal) length=18
  - `filled_at` (datetime)
  - `side` (enum)
  - `notified_discord` (tinyint) length=1

### bf_investments_news
- Field count: 12
  - `id` (int)
  - `email_message_id` (varchar) length=191
  - `source_email` (varchar) length=191
  - `provider` (varchar) length=191
  - `headline` (varchar) length=255
  - `subject` (varchar) length=255
  - `body` (text)
  - `category` (varchar) length=64
  - `status` (varchar) length=32
  - `received_at` (datetime)
  - `created_at` (datetime)
  - `updated_at` (datetime)

### bf_jobs
- Field count: 7
  - `id` (bigint)
  - `queue` (varchar) length=255
  - `payload` (text)
  - `attempts` (tinyint)
  - `reserved_at` (int)
  - `available_at` (int)
  - `created_at` (int)

### bf_mail_queue
- Field count: 14
  - `id` (bigint)
  - `module` (varchar) length=32
  - `provider` (varchar) length=32
  - `to_email` (varchar) length=191
  - `subject` (varchar) length=191
  - `html` (mediumtext)
  - `text` (mediumtext)
  - `status` (enum)
  - `attempts` (int)
  - `last_error` (varchar) length=255
  - `scheduled_at` (datetime)
  - `sent_at` (datetime)
  - `created_at` (datetime)
  - `updated_at` (datetime)

### bf_management_positions
- Field count: 12
  - `id` (int)
  - `name` (varchar) length=100
  - `username` (varchar) length=50
  - `role_id` (int)
  - `email` (varchar) length=100
  - `phone` (varchar) length=15
  - `department` (varchar) length=50
  - `position` (varchar) length=100
  - `is_filled` (tinyint) length=1
  - `date_assigned` (date)
  - `created_at` (timestamp)
  - `updated_at` (timestamp)

### bf_management_tasks
- Field count: 16
  - `id` (int)
  - `status` (varchar) length=128
  - `group` (varchar) length=512
  - `task` (varchar) length=1024
  - `title` (varchar) length=1024
  - `description` (text)
  - `url` (text)
  - `page_id` (varchar) length=45
  - `task_url` (text)
  - `assigned_to` (text)
  - `assigned_by` (text)
  - `notes` (text)
  - `created_on` (text)
  - `created_by` (text)
  - `completed_on` (text)
  - `completed_by` (text)

### bf_marketing_ab_tests
- Field count: 6
  - `id` (bigint)
  - `platform` (varchar) length=32
  - `name` (varchar) length=128
  - `status` (enum)
  - `metric` (enum)
  - `created_at` (datetime)

### bf_marketing_ab_variants
- Field count: 6
  - `id` (bigint)
  - `test_id` (bigint)
  - `template_id` (int)
  - `weight` (float)
  - `wins` (int)
  - `trials` (int)

### bf_marketing_analysis
- Field count: 8
  - `id` (int)
  - `source_type` (varchar) length=50
  - `source_identifier` (varchar) length=255
  - `feature_score` (float)
  - `keyword_score` (int)
  - `semantic_diversity_score` (int)
  - `additional_data` (json)
  - `created_on` (datetime)

### bf_marketing_audience_selection
- Field count: 3
  - `id` (int)
  - `campaign_id` (int)
  - `account_type` (varchar) length=100

### bf_marketing_best_times
- Field count: 6
  - `id` (bigint)
  - `platform` (varchar) length=32
  - `dow` (tinyint)
  - `hour_utc` (tinyint)
  - `score` (float)
  - `sample` (int)

### bf_marketing_blog_posts
- Field count: 10
  - `id` (int)
  - `title` (varchar) length=255
  - `content` (longtext)
  - `slug` (varchar) length=255
  - `tags` (text)
  - `created_on` (datetime)
  - `updated_on` (datetime)
  - `status` (varchar) length=32
  - `excerpt` (varchar) length=512
  - `meta_json` (longtext)

### bf_marketing_buffer
- Field count: 15
  - `id` (int)
  - `keyword` (varchar) length=255
  - `summary` (text)
  - `score` (float)
  - `tag_score` (float)
  - `category` (varchar) length=100
  - `status` (enum)
  - `platforms` (text)
  - `post_id` (int)
  - `created_at` (datetime)
  - `updated_at` (datetime)
  - `tfidf_score` (decimal) length=5
  - `auto_suggest` (tinyint) length=1
  - `scheduled_at` (datetime)
  - `schedule_interval` (int)

### bf_marketing_buffer_posts
- Field count: 8
  - `id` (int)
  - `source_id` (int)
  - `title` (varchar) length=255
  - `summary` (text)
  - `platform_content` (json)
  - `status` (enum)
  - `scheduled_date` (datetime)
  - `created_at` (datetime)

### bf_marketing_calendar
- Field count: 6
  - `id` (int)
  - `day` (varchar) length=10
  - `time` (varchar) length=10
  - `activity` (text)
  - `link` (varchar) length=255
  - `completed` (int)

### bf_marketing_campaigns
- Field count: 74
  - `id` (int)
  - `sched_id` (int)
  - `status` (int)
  - `beta` (varchar) length=45
  - `config_mode` (varchar) length=128
  - `form_mode` (varchar) length=45
  - `escalated` (int)
  - `type` (varchar) length=256
  - `audience_type` (varchar) length=100
  - `stage` (enum)
  - `is_draft` (tinyint) length=1
  - `name` (mediumtext)
  - `slug` (varchar) length=255
  - `keyword` (varchar) length=255
  - `created_on` (varchar) length=256
  - `created_by` (int)
  - `user_id` (int)
  - `user_email` (varchar) length=255
  - `username` (varchar) length=255
  - `account_type` (varchar) length=255
  - `account_id` (int)
  - `assigned_on` (varchar) length=256
  - `assigned_to` (varchar) length=256
  - `completed_on` (varchar) length=256
  - `scheduled_at` (datetime)
  - `auto_schedule_at` (datetime)
  - `description` (mediumtext)
  - `overall_campaign_description` (longtext)
  - `primary_content` (longtext)
  - `secondary_content` (longtext)
  - `html_content` (longtext)
  - `voice_script` (longtext)
  - `shared` (varchar) length=32
  - `shared_users` (json)
  - `blog` (int)
  - `in_app` (int)
  - `email` (int)
  - `discord` (int)
  - `facebook` (int)
  - `linkedin` (int)
  - `telegram` (int)
  - `twitter` (int)
  - `website` (int)
  - `promotional_links` (json)
  - `facebook_message` (text)
  - `linkedin_message` (text)
  - `discord_message` (text)
  - `stocktwits_message` (text)
  - `tiktok_message` (text)
  - `youtube_message` (text)
  - `email_message` (text)
  - `email_message_json` (json)
  - `email_subject` (varchar) length=255
  - `campaign_goal` (text)
  - `campaign_type` (varchar) length=100
  - `tone` (varchar) length=100
  - `cta` (text)
  - `distribution_ready` (tinyint) length=1
  - `distribution_priority` (int)
  - `distribution_notes` (text)
  - `review_status` (varchar) length=50
  - `reviewed_by` (varchar) length=100
  - `reviewed_on` (datetime)
  - `additional_info` (mediumtext)
  - `hashtags` (mediumtext)
  - `tags` (varchar) length=255
  - `platforms` (text)
  - `platform_config` (json)
  - `distribution_log` (text)
  - `distribution_status` (varchar) length=50
  - `distribution_attempts` (int)
  - `distribution_successful` (int)
  - `distribution_failed` (int)
  - `distribution_last_attempt` (datetime)

### bf_marketing_compliance_rules
- Field count: 4
  - `id` (int)
  - `rule_key` (varchar) length=64
  - `active` (tinyint) length=1
  - `config_json` (json)

### bf_marketing_content_enrichment_cache
- Field count: 5
  - `id` (int)
  - `url` (varchar) length=512
  - `content` (mediumtext)
  - `last_enriched_at` (datetime)
  - `source_keywords` (varchar) length=255

### bf_marketing_content_fingerprints
- Field count: 5
  - `id` (bigint)
  - `summary_id` (bigint)
  - `platform` (varchar) length=32
  - `fp64` (bigint)
  - `created_at` (datetime)

### bf_marketing_content_versions
- Field count: 6
  - `id` (bigint)
  - `queue_id` (bigint)
  - `version` (int)
  - `payload_body` (mediumtext)
  - `edited_by` (varchar) length=64
  - `created_at` (datetime)

### bf_marketing_email_open_tracking
- Field count: 4
  - `id` (int)
  - `campaign_id` (int)
  - `email` (varchar) length=255
  - `opened_at` (datetime)

### bf_marketing_email_queue
- Field count: 13
  - `id` (int)
  - `campaign_id` (int)
  - `email` (varchar) length=255
  - `subject` (varchar) length=255
  - `content` (text)
  - `status` (enum)
  - `opened` (int)
  - `open_tracking_id` (int)
  - `scheduled_at` (datetime)
  - `created_at` (datetime)
  - `updated_at` (datetime)
  - `preferred_send_time` (time)
  - `unsubscribe_token` (varchar) length=255

### bf_marketing_email_templates
- Field count: 6
  - `id` (int)
  - `title` (varchar) length=255
  - `subject` (varchar) length=255
  - `content` (text)
  - `created_at` (datetime)
  - `updated_at` (datetime)

### bf_marketing_engagements
- Field count: 10
  - `id` (bigint)
  - `platform` (varchar) length=32
  - `queue_id` (bigint)
  - `external_post_id` (varchar) length=128
  - `impressions` (int)
  - `clicks` (int)
  - `likes` (int)
  - `comments` (int)
  - `shares` (int)
  - `collected_at` (datetime)

### bf_marketing_events
- Field count: 11
  - `id` (bigint)
  - `queue_id` (bigint)
  - `platform` (varchar) length=32
  - `template_id` (int)
  - `summary_id` (bigint)
  - `utm_campaign` (varchar) length=64
  - `utm_source` (varchar) length=64
  - `utm_medium` (varchar) length=64
  - `final_url` (varchar) length=1024
  - `posted_at` (datetime)
  - `created_at` (datetime)

### bf_marketing_generated_content
- Field count: 33
  - `id` (int)
  - `alert_id` (int)
  - `campaign_id` (int)
  - `step_id` (int)
  - `summary_id` (int)
  - `title` (varchar) length=255
  - `description` (text)
  - `post_text` (text)
  - `formatted_summary` (mediumtext)
  - `platform` (varchar) length=50
  - `score` (decimal) length=5
  - `scheduled_at` (datetime)
  - `status` (enum)
  - `created_at` (datetime)
  - `updated_at` (datetime)
  - `shared_discord` (datetime)
  - `shared_linkedin` (datetime)
  - `shared_x` (datetime)
  - `shared_email` (datetime)
  - `engagement_score` (float)
  - `clicks_estimated` (int)
  - `voice_script` (text)
  - `facebook_message` (text)
  - `linkedin_message` (text)
  - `discord_message` (text)
  - `stocktwits_message` (text)
  - `tiktok_message` (text)
  - `youtube_message` (text)
  - `email_message` (text)
  - `hashtags` (text)
  - `promotional_links` (json)
  - `keywords` (text)
  - `last_enriched_at` (datetime)

### bf_marketing_ideas
- Field count: 10
  - `id` (int)
  - `title` (varchar) length=255
  - `description` (text)
  - `created_by` (int)
  - `created_on` (datetime)
  - `assigned_to` (int)
  - `priority` (enum)
  - `status` (enum)
  - `platforms` (json)
  - `additional_info` (text)

### bf_marketing_job_runs
- Field count: 7
  - `id` (bigint)
  - `job` (varchar) length=64
  - `started_at` (datetime)
  - `finished_at` (datetime)
  - `status` (enum)
  - `notes` (varchar) length=1024
  - `metrics_json` (json)

### bf_marketing_media_assets
- Field count: 7
  - `id` (bigint)
  - `kind` (enum)
  - `source` (varchar) length=32
  - `path` (varchar) length=1024
  - `sha1` (char) length=40
  - `meta_json` (json)
  - `created_at` (datetime)

### bf_marketing_news_content
- Field count: 14
  - `id` (int)
  - `title` (varchar) length=255
  - `email_subject` (varchar) length=255
  - `email_body` (text)
  - `source_type` (varchar) length=50
  - `source_url` (varchar) length=512
  - `content_type` (varchar) length=50
  - `keywords` (text)
  - `summary` (text)
  - `related_tickers` (text)
  - `date_received` (datetime)
  - `date_processed` (datetime)
  - `status` (varchar) length=20
  - `error_log` (text)

### bf_marketing_newsletters
- Field count: 16
  - `id` (int)
  - `week_start_date` (date)
  - `title` (varchar) length=255
  - `content` (text)
  - `status` (enum)
  - `scheduled_date` (datetime)
  - `sent_date` (datetime)
  - `target_audience` (varchar) length=255
  - `created_by` (int)
  - `created_at` (datetime)
  - `updated_at` (datetime)
  - `campaign_id` (int)
  - `priority` (tinyint) length=1
  - `attachments` (text)
  - `preview_link` (varchar) length=255
  - `notes` (text)

### bf_marketing_page_seo
- Field count: 36
  - `id` (int)
  - `status` (varchar) length=50
  - `source` (varchar) length=255
  - `created_at` (datetime)
  - `deleted_at` (datetime)
  - `automated` (int)
  - `page_name` (varchar) length=128
  - `page_title` (text)
  - `page_url` (varchar) length=256
  - `page_sitemap_url` (varchar) length=512
  - `page_internal_url` (varchar) length=256
  - `page_controller` (varchar) length=128
  - `page_controller_url` (varchar) length=128
  - `page_controller_directory` (varchar) length=128
  - `page_file_directory` (varchar) length=256
  - `page_image` (varchar) length=256
  - `page_description` (text)
  - `page_address` (varchar) length=512
  - `page_city` (varchar) length=128
  - `page_state` (varchar) length=64
  - `page_country` (varchar) length=64
  - `page_zipcode` (varchar) length=32
  - `page_facebook` (varchar) length=128
  - `active` (varchar) length=32
  - `custom` (varchar) length=32
  - `linked` (varchar) length=32
  - `functionality` (varchar) length=32
  - `design` (varchar) length=32
  - `mobile` (varchar) length=32
  - `seo` (varchar) length=32
  - `ext_links` (varchar) length=32
  - `grammar` (varchar) length=32
  - `d_optimize` (varchar) length=32
  - `load_perf` (varchar) length=32
  - `additional_notes` (varchar) length=32
  - `updated_at` (datetime)

### bf_marketing_pages_missing
- Field count: 7
  - `id` (int)
  - `slug` (varchar) length=255
  - `full_url` (varchar) length=500
  - `controller` (varchar) length=100
  - `method` (varchar) length=100
  - `status` (enum)
  - `created_at` (datetime)

### bf_marketing_platform_rules
- Field count: 7
  - `id` (int)
  - `platform_id` (int)
  - `rule_key` (varchar) length=64
  - `rule_value` (varchar) length=255
  - `description` (varchar) length=255
  - `created_at` (datetime)
  - `updated_at` (datetime)

### bf_marketing_platforms
- Field count: 7
  - `id` (int)
  - `platform_key` (varchar) length=50
  - `name` (varchar) length=100
  - `notes` (text)
  - `is_active` (tinyint) length=1
  - `created_at` (datetime)
  - `updated_at` (datetime)

### bf_marketing_post_queue
- Field count: 14
  - `id` (bigint)
  - `status` (enum)
  - `platform` (varchar) length=32
  - `template_id` (int)
  - `summary_id` (bigint)
  - `payload_title` (varchar) length=255
  - `payload_body` (text)
  - `payload_media` (varchar) length=512
  - `scheduled_at` (datetime)
  - `posted_at` (datetime)
  - `retries` (tinyint)
  - `error_message` (varchar) length=512
  - `created_at` (datetime)
  - `updated_at` (datetime)

### bf_marketing_promotions
- Field count: 9
  - `id` (int)
  - `code` (varchar) length=64
  - `title` (varchar) length=128
  - `active` (tinyint) length=1
  - `starts_at` (datetime)
  - `ends_at` (datetime)
  - `landing_url` (varchar) length=1024
  - `meta_json` (json)
  - `created_at` (datetime)

### bf_marketing_publish_queue
- Field count: 9
  - `id` (bigint)
  - `video_content_id` (bigint)
  - `platform` (varchar) length=32
  - `payload_json` (longtext)
  - `scheduled_for` (datetime)
  - `status` (varchar) length=32
  - `error` (text)
  - `created_at` (datetime)
  - `updated_at` (datetime)

### bf_marketing_schedule
- Field count: 21
  - `id` (int)
  - `post_date` (date)
  - `schedule_time` (datetime)
  - `platform` (varchar) length=50
  - `delivery_channel` (varchar) length=50
  - `subscriber_id` (int)
  - `campaign_id` (int)
  - `content_subject` (varchar) length=255
  - `content_description` (text)
  - `content_script` (longtext)
  - `content_blob` (longtext)
  - `content_link` (text)
  - `additional_links` (json)
  - `created_at` (timestamp)
  - `updated_at` (timestamp)
  - `completed` (int)
  - `zapier_webhook_url` (text)
  - `dispatch_type` (enum)
  - `post_status` (enum)
  - `retry_count` (int)
  - `last_attempt_at` (datetime)

### bf_marketing_schedule_content
- Field count: 6
  - `id` (int)
  - `post_id` (int)
  - `platform` (varchar) length=50
  - `generated_content` (text)
  - `created_at` (datetime)
  - `updated_at` (datetime)

### bf_marketing_scraper
- Field count: 89
  - `id` (int)
  - `source_id` (int)
  - `status` (varchar) length=50
  - `hash` (varchar) length=255
  - `type` (varchar) length=100
  - `url` (varchar) length=255
  - `category` (varchar) length=255
  - `title` (varchar) length=255
  - `summary` (text)
  - `formatted_summary` (mediumtext)
  - `content` (longtext)
  - `blog_content` (text)
  - `email_identifier` (varchar) length=100
  - `email_date` (datetime)
  - `email_sender` (varchar) length=255
  - `email_subject` (text)
  - `email_body` (longtext)
  - `email_attachments` (longtext)
  - `keywords` (text)
  - `platforms` (text)
  - `cta` (text)
  - `voiceover_url` (text)
  - `scraped_at` (datetime)
  - `created_on` (datetime)
  - `modified_on` (datetime)
  - `links` (text)
  - `images` (text)
  - `videos` (text)
  - `metadata` (text)
  - `structured_data` (text)
  - `additional_html_elements` (text)
  - `page_performance_data` (text)
  - `network_requests` (text)
  - `user_interaction_points` (text)
  - `accessibility_information` (text)
  - `page_relationships` (text)
  - `seo_elements` (text)
  - `social_media_links` (text)
  - `comments_user_generated_content` (text)
  - `contact_information` (text)
  - `legal_information` (text)
  - `breadcrumbs` (text)
  - `date_time` (datetime)
  - `author_information` (text)
  - `ratings_reviews` (text)
  - `price_information` (text)
  - `location_data` (text)
  - `language_locale` (text)
  - `mobile_responsiveness` (text)
  - `security_information` (text)
  - `technology_stack` (text)
  - `server_information` (text)
  - `caching_information` (text)
  - `content_type` (text)
  - `trade_alert_subcategory` (varchar) length=50
  - `character_set` (text)
  - `rss_atom_feeds` (text)
  - `pagination` (text)
  - `custom_data` (text)
  - `error_handling` (text)
  - `historical_changes` (text)
  - `user_reviews_ratings` (text)
  - `inventory_levels` (text)
  - `shipping_information` (text)
  - `bots_crawlers_information` (text)
  - `affiliate_links` (text)
  - `advertisements` (text)
  - `cookie_notices` (text)
  - `popups_modals` (text)
  - `browser_specific_data` (text)
  - `geolocation_specific_content` (text)
  - `ab_testing_variations` (text)
  - `user_agent_specific_content` (text)
  - `screen_size_specific_content` (text)
  - `device_specific_content` (text)
  - `browser_extension_data` (text)
  - `custom_scripts_analytics` (text)
  - `include_newsletter` (int)
  - `feature_score` (float)
  - `keyword_score` (float)
  - `created_at` (datetime)
  - `grouped` (tinyint) length=1
  - `date_created` (datetime)
  - `generated_from_force` (tinyint) length=1
  - `source` (varchar) length=64
  - `symbols` (text)
  - `date_scraped` (datetime)
  - `topics_json` (json)
  - `meta_json` (longtext)

### bf_marketing_search_api_log
- Field count: 7
  - `id` (int)
  - `query` (varchar) length=255
  - `source` (varchar) length=50
  - `response_code` (int)
  - `success` (tinyint) length=1
  - `ip_address` (varchar) length=45
  - `created_at` (datetime)

### bf_marketing_search_engine_usage
- Field count: 5
  - `id` (int)
  - `engine` (varchar) length=20
  - `usage_count` (int)
  - `used_at` (datetime)
  - `created_at` (datetime)

### bf_marketing_search_enrichment_log
- Field count: 8
  - `id` (int)
  - `keyword` (varchar) length=255
  - `engine_used` (enum)
  - `result_count` (int)
  - `status` (enum)
  - `error_message` (text)
  - `response_time_ms` (int)
  - `searched_at` (datetime)

### bf_marketing_social_templates
- Field count: 12
  - `id` (int)
  - `active` (tinyint) length=1
  - `platform` (varchar) length=32
  - `name` (varchar) length=64
  - `template_body` (text)
  - `media_hint` (varchar) length=128
  - `hashtags_hint` (varchar) length=512
  - `max_length` (int)
  - `allow_links` (tinyint) length=1
  - `created_by` (varchar) length=64
  - `created_at` (datetime)
  - `updated_at` (datetime)

### bf_marketing_suggestions
- Field count: 8
  - `id` (int)
  - `platform_id` (int)
  - `content_type` (enum)
  - `tip_text` (varchar) length=500
  - `priority` (tinyint)
  - `is_active` (tinyint) length=1
  - `created_at` (datetime)
  - `updated_at` (datetime)

### bf_marketing_taxonomy
- Field count: 12
  - `id` (bigint)
  - `platform_id` (int)
  - `content_type` (enum)
  - `tag_type` (enum)
  - `tag_text` (varchar) length=120
  - `category` (varchar) length=64
  - `weight` (decimal) length=6
  - `is_default` (tinyint) length=1
  - `is_active` (tinyint) length=1
  - `created_by` (varchar) length=100
  - `created_at` (datetime)
  - `updated_at` (datetime)

### bf_marketing_temp_scraper
- Field count: 75
  - `id` (int)
  - `status` (varchar) length=50
  - `type` (varchar) length=50
  - `url` (varchar) length=255
  - `title` (varchar) length=255
  - `summary` (text)
  - `formatted_summary` (mediumtext)
  - `content` (longtext)
  - `feature_score` (float)
  - `email_identifier` (varchar) length=255
  - `email_date` (datetime)
  - `email_sender` (varchar) length=255
  - `email_subject` (varchar) length=500
  - `email_body` (text)
  - `email_attachments` (text)
  - `keywords` (text)
  - `scraped_at` (datetime)
  - `created_on` (datetime)
  - `modified_on` (datetime)
  - `links` (text)
  - `images` (text)
  - `videos` (text)
  - `metadata` (text)
  - `structured_data` (text)
  - `additional_html_elements` (text)
  - `page_performance_data` (text)
  - `network_requests` (text)
  - `user_interaction_points` (text)
  - `accessibility_information` (text)
  - `page_relationships` (text)
  - `seo_elements` (text)
  - `social_media_links` (text)
  - `comments_user_generated_content` (text)
  - `contact_information` (text)
  - `legal_information` (text)
  - `breadcrumbs` (text)
  - `date_time` (datetime)
  - `author_information` (text)
  - `ratings_reviews` (text)
  - `price_information` (text)
  - `location_data` (text)
  - `language_locale` (text)
  - `mobile_responsiveness` (text)
  - `security_information` (text)
  - `technology_stack` (text)
  - `server_information` (text)
  - `caching_information` (text)
  - `content_type` (text)
  - `character_set` (text)
  - `rss_atom_feeds` (text)
  - `pagination` (text)
  - `custom_data` (text)
  - `error_handling` (text)
  - `historical_changes` (text)
  - `user_reviews_ratings` (text)
  - `inventory_levels` (text)
  - `shipping_information` (text)
  - `bots_crawlers_information` (text)
  - `affiliate_links` (text)
  - `advertisements` (text)
  - `cookie_notices` (text)
  - `popups_modals` (text)
  - `browser_specific_data` (text)
  - `geolocation_specific_content` (text)
  - `ab_testing_variations` (text)
  - `user_agent_specific_content` (text)
  - `screen_size_specific_content` (text)
  - `device_specific_content` (text)
  - `browser_extension_data` (text)
  - `custom_scripts_analytics` (text)
  - `keyword_score` (float)
  - `semantic_diversity_score` (float)
  - `processed` (tinyint) length=1
  - `date_scraped` (datetime)
  - `updated_on` (timestamp)

### bf_marketing_video_assets
- Field count: 9
  - `id` (bigint)
  - `video_content_id` (bigint)
  - `asset_type` (varchar) length=64
  - `asset_path` (varchar) length=255
  - `asset_url` (varchar) length=255
  - `asset_label` (varchar) length=255
  - `sort_order` (int)
  - `created_at` (datetime)
  - `updated_at` (datetime)

### bf_marketing_video_content
- Field count: 36
  - `id` (bigint)
  - `source_type` (varchar) length=64
  - `source_id` (bigint)
  - `platform` (varchar) length=32
  - `video_type` (varchar) length=64
  - `content_category` (varchar) length=64
  - `topic` (varchar) length=255
  - `symbol` (varchar) length=32
  - `title` (varchar) length=255
  - `hook` (text)
  - `intro_text` (text)
  - `body_text` (longtext)
  - `insight_text` (text)
  - `cta_text` (text)
  - `caption` (longtext)
  - `hashtags` (text)
  - `voiceover_script` (longtext)
  - `overlay_text_json` (longtext)
  - `scene_plan_json` (longtext)
  - `asset_plan_json` (longtext)
  - `platform_adaptations_json` (longtext)
  - `thumbnail_text` (varchar) length=255
  - `promo_link` (varchar) length=255
  - `audience` (varchar) length=128
  - `tone` (varchar) length=64
  - `duration_target` (varchar) length=32
  - `target_publish_window` (varchar) length=128
  - `creator_editor` (varchar) length=128
  - `status` (varchar) length=32
  - `generated_by` (int)
  - `approved_by` (int)
  - `scheduled_for` (datetime)
  - `posted_at` (datetime)
  - `created_at` (datetime)
  - `updated_at` (datetime)
  - `deleted_at` (datetime)

### bf_marketing_video_templates
- Field count: 14
  - `id` (bigint)
  - `template_name` (varchar) length=255
  - `platform` (varchar) length=32
  - `video_type` (varchar) length=64
  - `hook_template` (text)
  - `body_template` (longtext)
  - `cta_template` (text)
  - `caption_template` (longtext)
  - `overlay_template_json` (longtext)
  - `scene_template_json` (longtext)
  - `meta_json` (longtext)
  - `is_active` (tinyint) length=1
  - `created_at` (datetime)
  - `updated_at` (datetime)

### bf_marketing_video_versions
- Field count: 6
  - `id` (bigint)
  - `video_content_id` (bigint)
  - `version_data_json` (longtext)
  - `edited_by` (int)
  - `edit_note` (varchar) length=255
  - `created_at` (datetime)

### bf_marketing_visuals
- Field count: 19
  - `id` (int)
  - `summary_id` (int)
  - `title` (varchar) length=255
  - `slug` (varchar) length=255
  - `voiceover_text` (text)
  - `voiceover_audio_url` (varchar) length=512
  - `storyboard_json` (json)
  - `keywords` (text)
  - `tags` (text)
  - `topic` (varchar) length=255
  - `platforms` (varchar) length=255
  - `output_format` (varchar) length=50
  - `template_reference` (varchar) length=255
  - `zapier_sent` (tinyint) length=1
  - `zapier_sent_at` (datetime)
  - `status` (varchar) length=50
  - `notes` (text)
  - `created_at` (datetime)
  - `updated_at` (datetime)

### bf_mdit_deposits
- Field count: 13
  - `id` (int)
  - `user_id` (int)
  - `wallet_address` (varchar) length=128
  - `chain` (varchar) length=32
  - `asset_symbol` (varchar) length=16
  - `amount` (decimal) length=18
  - `tx_hash` (varchar) length=191
  - `confirmations` (int)
  - `status` (varchar) length=32
  - `idempotency_key` (varchar) length=191
  - `provider_event_id` (varchar) length=191
  - `created_on` (datetime)
  - `updated_on` (datetime)

### bf_mdit_disclosures_acceptance
- Field count: 6
  - `id` (int)
  - `user_id` (int)
  - `disclosure_version` (varchar) length=32
  - `accepted_on` (datetime)
  - `ip_address` (varchar) length=64
  - `user_agent` (varchar) length=255

### bf_mdit_investor_profiles
- Field count: 7
  - `id` (int)
  - `user_id` (int)
  - `kyc_status` (varchar) length=32
  - `accreditation_status` (varchar) length=32
  - `risk_ack_on` (datetime)
  - `created_on` (datetime)
  - `updated_on` (datetime)

### bf_mdit_nav_snapshots
- Field count: 8
  - `id` (int)
  - `as_of_date` (date)
  - `nav_total` (decimal) length=18
  - `token_supply` (decimal) length=18
  - `nav_per_unit` (decimal) length=18
  - `cash_value` (decimal) length=18
  - `equities_value` (decimal) length=18
  - `created_on` (datetime)

### bf_mdit_redemptions
- Field count: 11
  - `id` (int)
  - `user_id` (int)
  - `wallet_address` (varchar) length=128
  - `token_units` (decimal) length=18
  - `requested_on` (datetime)
  - `approved_on` (datetime)
  - `approved_by` (int)
  - `status` (varchar) length=32
  - `payout_asset` (varchar) length=32
  - `payout_amount` (decimal) length=18
  - `notes` (varchar) length=512

### bf_mdit_token_ledger
- Field count: 11
  - `id` (int)
  - `user_id` (int)
  - `wallet_address` (varchar) length=128
  - `token_symbol` (varchar) length=16
  - `units` (decimal) length=18
  - `nav_at_mint` (decimal) length=18
  - `minted_on` (datetime)
  - `burned_on` (datetime)
  - `source_deposit_id` (int)
  - `source_redemption_id` (int)
  - `status` (varchar) length=32

### bf_mdit_wallets
- Field count: 7
  - `id` (int)
  - `user_id` (int)
  - `wallet_address` (varchar) length=128
  - `chain` (varchar) length=32
  - `is_primary` (tinyint) length=1
  - `status` (varchar) length=32
  - `created_on` (datetime)

### bf_mdit_webhook_events
- Field count: 10
  - `id` (int)
  - `provider` (varchar) length=64
  - `event_id` (varchar) length=191
  - `event_type` (varchar) length=64
  - `payload_json` (longtext)
  - `payload_hash` (varchar) length=128
  - `received_on` (datetime)
  - `processed_on` (datetime)
  - `status` (varchar) length=32
  - `error_message` (varchar) length=512

### bf_migrations
- Field count: 7
  - `id` (bigint)
  - `version` (varchar) length=255
  - `class` (varchar) length=255
  - `group` (varchar) length=255
  - `namespace` (varchar) length=255
  - `time` (int)
  - `batch` (int)

### bf_mymicoin_overview
- Field count: 27
  - `id` (int)
  - `unix_timestamp` (varchar) length=32
  - `current_date` (datetime)
  - `month` (varchar) length=32
  - `day` (varchar) length=32
  - `year` (varchar) length=32
  - `time` (varchar) length=32
  - `status` (varchar) length=32
  - `beta` (varchar) length=32
  - `wallet_id` (varchar) length=64
  - `user_id` (int)
  - `user_email` (varchar) length=512
  - `reward` (varchar) length=32
  - `reward_type` (varchar) length=128
  - `initial_value` (varchar) length=64
  - `current_value` (varchar) length=32
  - `available_coins` (varchar) length=64
  - `new_availability` (varchar) length=32
  - `minimum_coin_amount` (varchar) length=32
  - `initial_coin_value` (varchar) length=32
  - `coin_value` (varchar) length=64
  - `amount` (varchar) length=32
  - `total` (varchar) length=32
  - `total_cost` (varchar) length=32
  - `gas_fee` (varchar) length=32
  - `trans_fee` (varchar) length=32
  - `trans_percent` (varchar) length=32

### bf_mymigold_overview
- Field count: 28
  - `id` (int)
  - `trans_id` (varchar) length=32
  - `unix_timestamp` (varchar) length=45
  - `current_date` (datetime)
  - `status` (varchar) length=32
  - `beta` (varchar) length=32
  - `wallet_id` (varchar) length=64
  - `user_id` (int)
  - `user_email` (varchar) length=512
  - `reward` (varchar) length=32
  - `reward_type` (varchar) length=128
  - `initial_value` (varchar) length=64
  - `current_value` (varchar) length=32
  - `available_coins` (varchar) length=64
  - `new_availability` (varchar) length=32
  - `minimum_coin_amount` (varchar) length=32
  - `initial_coin_value` (varchar) length=32
  - `coin_value` (varchar) length=64
  - `amount` (varchar) length=32
  - `total` (varchar) length=32
  - `total_cost` (varchar) length=32
  - `total_fees` (varchar) length=32
  - `gas_fee` (varchar) length=32
  - `trans_fee` (varchar) length=32
  - `trans_percent` (varchar) length=32
  - `user_gas_fee` (varchar) length=32
  - `user_trans_fee` (varchar) length=32
  - `user_trans_percent` (varchar) length=32

### bf_notification_outbox
- Field count: 13
  - `id` (bigint)
  - `channel` (varchar) length=32
  - `event` (varchar) length=64
  - `reference_id` (bigint)
  - `debounce_key` (varchar) length=191
  - `payload_json` (longtext)
  - `status` (varchar) length=16
  - `attempts` (int)
  - `last_error` (text)
  - `available_at` (datetime)
  - `scheduled_at` (datetime)
  - `created_at` (datetime)
  - `updated_at` (datetime)

### bf_ollama_embeddings
- Field count: 8
  - `id` (int)
  - `doc_id` (varchar) length=128
  - `chunk_id` (varchar) length=128
  - `text` (longtext)
  - `vector_json` (longtext)
  - `dim` (int)
  - `hash` (varchar) length=64
  - `created_at` (datetime)

### bf_ollama_queue
- Field count: 10
  - `job_id` (int)
  - `type` (varchar) length=32
  - `priority` (int)
  - `payload_json` (longtext)
  - `status` (varchar) length=20
  - `attempts` (int)
  - `last_error` (text)
  - `lease_until` (datetime)
  - `created_at` (datetime)
  - `updated_at` (datetime)

### bf_ollama_runs
- Field count: 13
  - `id` (int)
  - `run_uuid` (varchar) length=64
  - `type` (varchar) length=32
  - `model` (varchar) length=128
  - `params_json` (longtext)
  - `prompt_hash` (varchar) length=64
  - `status` (varchar) length=20
  - `started_at` (datetime)
  - `finished_at` (datetime)
  - `latency_ms` (int)
  - `token_in` (int)
  - `token_out` (int)
  - `error` (text)

### bf_ollama_sessions
- Field count: 6
  - `session_id` (varchar) length=64
  - `title` (varchar) length=255
  - `model` (varchar) length=128
  - `messages_json` (longtext)
  - `created_at` (datetime)
  - `updated_at` (datetime)

### bf_ops_command_inbox
- Field count: 11
  - `id` (bigint)
  - `source` (varchar) length=32
  - `source_id` (varchar) length=128
  - `subject` (varchar) length=255
  - `from_email` (varchar) length=255
  - `received_at` (datetime)
  - `body` (mediumtext)
  - `parsed_json` (json)
  - `status` (varchar) length=16
  - `created_at` (datetime)
  - `updated_at` (datetime)

### bf_ops_job_runs
- Field count: 14
  - `id` (bigint)
  - `job_id` (bigint)
  - `queue_id` (bigint)
  - `status` (varchar) length=50
  - `attempts` (int)
  - `payload_json` (longtext)
  - `result_json` (longtext)
  - `output_json` (longtext)
  - `output_text` (longtext)
  - `last_error` (longtext)
  - `started_at` (datetime)
  - `finished_at` (datetime)
  - `created_at` (datetime)
  - `updated_at` (datetime)

### bf_ops_jobs
- Field count: 10
  - `id` (bigint)
  - `job_key` (varchar) length=150
  - `name` (varchar) length=255
  - `description` (text)
  - `handler` (varchar) length=255
  - `max_attempts` (int)
  - `is_enabled` (tinyint) length=1
  - `last_run_at` (datetime)
  - `created_at` (datetime)
  - `updated_at` (datetime)

### bf_ops_queue
- Field count: 9
  - `id` (bigint)
  - `job_key` (varchar) length=150
  - `payload_json` (longtext)
  - `status` (varchar) length=50
  - `attempts` (int)
  - `locked_until` (datetime)
  - `last_error` (longtext)
  - `created_at` (datetime)
  - `updated_at` (datetime)

### bf_ops_schema_audit
- Field count: 7
  - `id` (bigint)
  - `operation` (varchar) length=16
  - `table_name` (varchar) length=64
  - `sql_hash` (char) length=64
  - `applied_by` (varchar) length=64
  - `applied_at` (datetime)
  - `source` (varchar) length=64

### bf_ops_spark_health
- Field count: 11
  - `id` (bigint)
  - `created_at` (datetime)
  - `hostname` (varchar) length=128
  - `app_env` (varchar) length=32
  - `php_version` (varchar) length=32
  - `ci_version` (varchar) length=32
  - `status` (enum)
  - `command_count` (int)
  - `invalid_count` (int)
  - `invalid_files_json` (mediumtext)
  - `notes` (text)

### bf_predictions_liquidity
- Field count: 9
  - `id` (bigint)
  - `market_id` (bigint)
  - `option_id` (bigint)
  - `provider_user_id` (int)
  - `asset` (varchar) length=12
  - `amount` (decimal) length=20
  - `state` (varchar) length=16
  - `created_at` (datetime)
  - `updated_at` (datetime)

### bf_predictions_markets
- Field count: 14
  - `id` (bigint)
  - `slug` (varchar) length=190
  - `title` (varchar) length=255
  - `description` (text)
  - `category` (varchar) length=120
  - `resolution_source` (varchar) length=120
  - `currency_mode` (varchar) length=32
  - `state` (varchar) length=24
  - `open_at` (datetime)
  - `lock_at` (datetime)
  - `resolve_at` (datetime)
  - `created_by` (int)
  - `created_at` (datetime)
  - `updated_at` (datetime)

### bf_predictions_options
- Field count: 8
  - `id` (bigint)
  - `market_id` (bigint)
  - `label` (varchar) length=255
  - `odds_bips` (int)
  - `liquidity_gold` (decimal) length=20
  - `is_winner` (tinyint) length=1
  - `created_at` (datetime)
  - `updated_at` (datetime)

### bf_predictions_orders
- Field count: 12
  - `id` (bigint)
  - `user_id` (int)
  - `market_id` (bigint)
  - `option_id` (bigint)
  - `side` (varchar) length=8
  - `stake_amount` (decimal) length=20
  - `stake_asset` (varchar) length=12
  - `expected_payout` (decimal) length=20
  - `fee_bips` (int)
  - `state` (varchar) length=24
  - `created_at` (datetime)
  - `updated_at` (datetime)

### bf_predictions_payouts
- Field count: 10
  - `id` (bigint)
  - `user_id` (int)
  - `market_id` (bigint)
  - `position_id` (bigint)
  - `asset` (varchar) length=12
  - `amount` (decimal) length=20
  - `status` (varchar) length=16
  - `tx_ref` (varchar) length=190
  - `created_at` (datetime)
  - `updated_at` (datetime)

### bf_predictions_positions
- Field count: 10
  - `id` (bigint)
  - `user_id` (int)
  - `market_id` (bigint)
  - `option_id` (bigint)
  - `avg_entry_odds_bips` (int)
  - `stake_asset` (varchar) length=12
  - `stake_total` (decimal) length=20
  - `payout_max` (decimal) length=20
  - `created_at` (datetime)
  - `updated_at` (datetime)

### bf_predictions_settlements
- Field count: 7
  - `id` (bigint)
  - `market_id` (bigint)
  - `winning_option_id` (bigint)
  - `resolver_user_id` (int)
  - `resolution_note` (text)
  - `resolved_at` (datetime)
  - `created_at` (datetime)

### bf_predictions_trades
- Field count: 10
  - `id` (bigint)
  - `order_id` (bigint)
  - `user_id` (int)
  - `market_id` (bigint)
  - `option_id` (bigint)
  - `stake_asset` (varchar) length=12
  - `stake_amount` (decimal) length=20
  - `fee_amount` (decimal) length=20
  - `fill_odds_bips` (int)
  - `created_at` (datetime)

### bf_project_comments
- Field count: 5
  - `id` (int)
  - `project_id` (int)
  - `user_id` (int)
  - `comment` (text)
  - `created_at` (datetime)

### bf_project_commitments
- Field count: 9
  - `id` (int)
  - `project_id` (int)
  - `user_id` (int)
  - `amount` (decimal) length=15
  - `status` (varchar) length=32
  - `notes` (text)
  - `created_at` (datetime)
  - `updated_at` (datetime)
  - `deleted_at` (datetime)

### bf_project_payouts
- Field count: 9
  - `id` (int)
  - `user_id` (int)
  - `project_id` (int)
  - `amount` (decimal) length=15
  - `payout_date` (date)
  - `status` (varchar) length=32
  - `notes` (text)
  - `created_at` (datetime)
  - `updated_at` (datetime)

### bf_project_task_registry
- Field count: 18
  - `id` (bigint)
  - `project_name` (varchar) length=120
  - `category` (varchar) length=64
  - `subcategory` (varchar) length=64
  - `component` (varchar) length=128
  - `description` (mediumtext)
  - `status` (enum)
  - `priority` (tinyint)
  - `blast_radius` (enum)
  - `environment` (enum)
  - `primary_files` (text)
  - `notes` (mediumtext)
  - `tags_json` (json)
  - `external_ref` (varchar) length=191
  - `source` (enum)
  - `created_at` (datetime)
  - `updated_at` (datetime)
  - `last_run_at` (datetime)

### bf_project_tokens
- Field count: 10
  - `id` (int)
  - `project_id` (int)
  - `chain` (enum)
  - `symbol` (varchar) length=16
  - `decimals` (tinyint)
  - `total_supply` (bigint)
  - `minted_supply` (bigint)
  - `config_json` (json)
  - `created_at` (datetime)
  - `updated_at` (datetime)

### bf_projects
- Field count: 45
  - `id` (int)
  - `name` (varchar) length=255
  - `slug` (varchar) length=255
  - `visibility` (varchar) length=20
  - `description` (text)
  - `target_amount` (decimal) length=15
  - `current_amount` (decimal) length=15
  - `status` (enum)
  - `is_active` (tinyint) length=1
  - `is_system` (tinyint) length=1
  - `project_type` (varchar) length=50
  - `nav_per_unit` (decimal) length=18
  - `total_units_issued` (decimal) length=20
  - `total_fund_value` (decimal) length=18
  - `linked_visual` (varchar) length=255
  - `category` (enum)
  - `created_by` (int)
  - `created_at` (timestamp)
  - `updated_at` (timestamp)
  - `investment_goal` (decimal) length=15
  - `funds_raised` (decimal) length=15
  - `valuation` (decimal) length=15
  - `offering_type` (enum)
  - `investor_count` (int)
  - `minimum_investment` (decimal) length=15
  - `maximum_investment` (decimal) length=15
  - `progress_percentage` (float)
  - `average_investment` (decimal) length=15
  - `top_investor_id` (int)
  - `revenue_generated` (decimal) length=15
  - `project_stage` (enum)
  - `completion_date` (date)
  - `last_investment_date` (timestamp)
  - `remarks` (text)
  - `promotional_links` (json)
  - `nav_update_in_progress` (tinyint) length=1
  - `linked_token_id` (int)
  - `exchange_asset_id` (int)
  - `exchange_enabled` (tinyint) length=1
  - `primary_issuance_enabled` (tinyint) length=1
  - `secondary_trading_enabled` (tinyint) length=1
  - `compliance_required` (tinyint) length=1
  - `fund_issuance_status` (varchar) length=20
  - `exchange_symbol` (varchar) length=50
  - `ticker` (varchar) length=20

### bf_projects_auctions
- Field count: 11
  - `id` (int)
  - `project_id` (int)
  - `token_id` (int)
  - `bucket_size` (int)
  - `bucket_price` (decimal) length=12
  - `round_no` (int)
  - `max_units_per_bid` (int)
  - `starts_at` (datetime)
  - `ends_at` (datetime)
  - `status` (enum)
  - `created_at` (datetime)

### bf_projects_coin_redistributions
- Field count: 6
  - `id` (int)
  - `token_id` (int)
  - `reissue_units` (bigint)
  - `factor` (decimal) length=16
  - `note` (varchar) length=255
  - `created_at` (datetime)

### bf_projects_commitments
- Field count: 8
  - `id` (int)
  - `user_id` (int)
  - `project_id` (int)
  - `amount` (decimal) length=15
  - `status` (enum)
  - `created_at` (timestamp)
  - `updated_at` (timestamp)
  - `deleted_at` (timestamp)

### bf_projects_distributions
- Field count: 7
  - `id` (int)
  - `user_id` (int)
  - `project_id` (int)
  - `amount` (decimal) length=15
  - `status` (enum)
  - `created_at` (timestamp)
  - `updated_at` (timestamp)

### bf_projects_fund_audit_logs
- Field count: 6
  - `id` (int)
  - `project_id` (int)
  - `actor_user_id` (int)
  - `action_type` (varchar) length=60
  - `context_json` (longtext)
  - `created_at` (datetime)

### bf_projects_fund_capital_flows
- Field count: 9
  - `id` (int)
  - `project_id` (int)
  - `flow_type` (varchar) length=50
  - `amount` (decimal) length=18
  - `units_delta` (decimal) length=20
  - `reference` (varchar) length=120
  - `notes` (text)
  - `created_by` (int)
  - `created_at` (datetime)

### bf_projects_fund_distributions
- Field count: 9
  - `id` (int)
  - `project_id` (int)
  - `distribution_type` (varchar) length=50
  - `total_amount` (decimal) length=18
  - `amount_per_unit` (decimal) length=18
  - `status` (varchar) length=30
  - `notes` (text)
  - `created_at` (datetime)
  - `updated_at` (datetime)

### bf_projects_fund_holders
- Field count: 9
  - `id` (int)
  - `project_id` (int)
  - `user_id` (int)
  - `units_owned` (decimal) length=20
  - `capital_contributed` (decimal) length=18
  - `average_nav` (decimal) length=18
  - `holder_status` (varchar) length=30
  - `created_at` (datetime)
  - `updated_at` (datetime)

### bf_projects_fund_investor_profiles
- Field count: 11
  - `id` (int)
  - `project_id` (int)
  - `user_id` (int)
  - `kyc_status` (varchar) length=30
  - `investor_eligibility` (varchar) length=30
  - `agreement_signed` (tinyint) length=1
  - `agreement_signed_at` (datetime)
  - `reviewed_by` (int)
  - `notes` (text)
  - `created_at` (datetime)
  - `updated_at` (datetime)

### bf_projects_fund_nav_history
- Field count: 7
  - `id` (int)
  - `project_id` (int)
  - `nav_per_unit` (decimal) length=18
  - `total_fund_value` (decimal) length=18
  - `total_units_issued` (decimal) length=20
  - `source_note` (varchar) length=255
  - `created_at` (datetime)

### bf_projects_fund_transactions
- Field count: 14
  - `id` (int)
  - `project_id` (int)
  - `user_id` (int)
  - `transaction_type` (varchar) length=50
  - `reference_type` (varchar) length=50
  - `reference_id` (int)
  - `units` (decimal) length=20
  - `nav_price` (decimal) length=18
  - `gross_amount` (decimal) length=18
  - `fee_amount` (decimal) length=18
  - `net_amount` (decimal) length=18
  - `notes` (text)
  - `created_at` (datetime)
  - `idempotency_key` (varchar) length=100

### bf_projects_insurance_reserve
- Field count: 10
  - `id` (int)
  - `project_id` (int)
  - `token_id` (int)
  - `policy_pct` (decimal) length=6
  - `platform_units` (bigint)
  - `creator_units` (bigint)
  - `public_units` (bigint)
  - `balance_units` (bigint)
  - `balance_usd` (decimal) length=14
  - `created_at` (datetime)

### bf_projects_investments
- Field count: 8
  - `id` (int)
  - `user_id` (int)
  - `project_id` (int)
  - `investment_amount` (decimal) length=15
  - `shares` (decimal) length=15
  - `status` (enum)
  - `created_at` (timestamp)
  - `updated_at` (timestamp)

### bf_projects_providers
- Field count: 17
  - `id` (int)
  - `legal_name` (varchar) length=255
  - `dba_name` (varchar) length=255
  - `ein` (varchar) length=32
  - `npi` (varchar) length=32
  - `address_line1` (varchar) length=255
  - `address_line2` (varchar) length=255
  - `city` (varchar) length=100
  - `state` (varchar) length=50
  - `postal_code` (varchar) length=20
  - `country` (varchar) length=2
  - `contact_name` (varchar) length=255
  - `contact_email` (varchar) length=255
  - `contact_phone` (varchar) length=50
  - `website` (varchar) length=255
  - `created_at` (timestamp)
  - `updated_at` (timestamp)

### bf_projects_real_estate
- Field count: 32
  - `id` (int)
  - `user_id` (int)
  - `source` (enum)
  - `raw_input` (text)
  - `zillow_url` (varchar) length=512
  - `zillow_id` (varchar) length=64
  - `address_line1` (varchar) length=255
  - `address_line2` (varchar) length=255
  - `city` (varchar) length=120
  - `state` (char) length=2
  - `postal_code` (varchar) length=20
  - `country` (varchar) length=2
  - `latitude` (decimal) length=10
  - `longitude` (decimal) length=10
  - `property_type` (varchar) length=64
  - `year_built` (smallint)
  - `beds` (decimal) length=4
  - `baths` (decimal) length=4
  - `sqft` (int)
  - `lot_sqft` (int)
  - `list_price` (decimal) length=14
  - `zestimate` (decimal) length=14
  - `rent_zestimate` (decimal) length=14
  - `taxes_annual` (decimal) length=14
  - `hoa_monthly` (decimal) length=14
  - `images_json` (json)
  - `features_json` (json)
  - `last_scraped_at` (datetime)
  - `status` (enum)
  - `project_id` (int)
  - `created_at` (datetime)
  - `updated_at` (datetime)

### bf_projects_revenue
- Field count: 6
  - `id` (int)
  - `project_id` (int)
  - `amount` (decimal) length=15
  - `reported_at` (datetime)
  - `created_at` (datetime)
  - `updated_at` (datetime)

### bf_projects_revenue_distributions
- Field count: 7
  - `id` (int)
  - `project_id` (int)
  - `revenue_event_id` (int)
  - `gross_amount` (decimal) length=15
  - `platform_fee_amount` (decimal) length=15
  - `net_amount` (decimal) length=15
  - `created_at` (datetime)

### bf_projects_revenue_distributions_items
- Field count: 10
  - `id` (int)
  - `distribution_id` (int)
  - `user_id` (int)
  - `token_id` (int)
  - `share_ratio` (decimal) length=12
  - `payout_amount` (decimal) length=15
  - `status` (enum)
  - `tx_ref` (varchar) length=255
  - `created_at` (datetime)
  - `updated_at` (datetime)

### bf_projects_revenue_events
- Field count: 8
  - `id` (int)
  - `project_id` (int)
  - `amount` (decimal) length=15
  - `currency` (varchar) length=8
  - `event_date` (date)
  - `source` (enum)
  - `notes` (text)
  - `created_at` (datetime)

### bf_projects_token_allocations
- Field count: 6
  - `id` (int)
  - `token_id` (int)
  - `role` (enum)
  - `units` (bigint)
  - `pct` (decimal) length=8
  - `created_at` (datetime)

### bf_public_pages_catalog
- Field count: 15
  - `id` (int)
  - `page_id` (varchar) length=100
  - `slug` (varchar) length=150
  - `title` (varchar) length=255
  - `module` (varchar) length=100
  - `type` (enum)
  - `topic_keywords` (varchar) length=255
  - `source_mode` (enum)
  - `db_query_key` (varchar) length=100
  - `google_query` (varchar) length=255
  - `refresh_days` (int)
  - `status` (enum)
  - `created_at` (datetime)
  - `updated_at` (datetime)
  - `next_run_at` (datetime)

### bf_public_pages_drafts
- Field count: 8
  - `id` (int)
  - `page_id` (varchar) length=100
  - `run_id` (int)
  - `content_md` (longtext)
  - `summary` (text)
  - `status` (enum)
  - `created_at` (datetime)
  - `updated_at` (datetime)

### bf_public_pages_published
- Field count: 9
  - `id` (int)
  - `page_id` (varchar) length=100
  - `draft_id` (int)
  - `content_html` (longtext)
  - `published_at` (datetime)
  - `version` (int)
  - `is_active` (tinyint) length=1
  - `schema_json` (json)
  - `published_meta_json` (json)

### bf_public_pages_query_presets
- Field count: 5
  - `id` (bigint)
  - `query_key` (varchar) length=120
  - `label` (varchar) length=255
  - `sql_template` (longtext)
  - `enabled` (tinyint) length=1

### bf_public_pages_runs
- Field count: 10
  - `id` (int)
  - `run_uuid` (char) length=32
  - `mode` (enum)
  - `created_at` (datetime)
  - `started_at` (datetime)
  - `ended_at` (datetime)
  - `summary_json` (json)
  - `finished_at` (datetime)
  - `status` (enum)
  - `notes` (text)

### bf_public_pages_sources
- Field count: 7
  - `id` (int)
  - `page_id` (varchar) length=100
  - `source_type` (enum)
  - `source_ref` (varchar) length=255
  - `payload` (longtext)
  - `checksum` (char) length=64
  - `created_at` (datetime)

### bf_redirect_links
- Field count: 6
  - `id` (int)
  - `slug` (varchar) length=255
  - `final_url` (text)
  - `platform` (varchar) length=50
  - `post_id` (int)
  - `created_at` (datetime)

### bf_research_insights
- Field count: 10
  - `id` (bigint)
  - `insight_type` (varchar) length=100
  - `symbol` (varchar) length=20
  - `headline` (text)
  - `score` (decimal) length=12
  - `source` (varchar) length=100
  - `payload_json` (longtext)
  - `insight_date` (datetime)
  - `created_at` (datetime)
  - `updated_at` (datetime)

### bf_research_items
- Field count: 13
  - `id` (bigint)
  - `item_type` (varchar) length=50
  - `category` (varchar) length=100
  - `symbol` (varchar) length=20
  - `source` (varchar) length=100
  - `title` (text)
  - `url` (text)
  - `summary` (longtext)
  - `score` (decimal) length=12
  - `payload_json` (longtext)
  - `published_at` (datetime)
  - `created_at` (datetime)
  - `updated_at` (datetime)

### bf_research_metrics
- Field count: 9
  - `id` (bigint)
  - `metric_type` (varchar) length=50
  - `metric_key` (varchar) length=100
  - `symbol` (varchar) length=20
  - `source` (varchar) length=100
  - `metric_value` (decimal) length=20
  - `payload_json` (longtext)
  - `metric_at` (datetime)
  - `created_at` (datetime)

### bf_research_runs
- Field count: 7
  - `id` (bigint)
  - `task_name` (varchar) length=100
  - `status` (varchar) length=30
  - `message` (text)
  - `payload_json` (longtext)
  - `started_at` (datetime)
  - `finished_at` (datetime)

### bf_retirement_goals
- Field count: 9
  - `id` (int)
  - `user_id` (int)
  - `target_age` (int)
  - `target_value` (decimal) length=10
  - `current_savings` (decimal) length=10
  - `monthly_contribution` (decimal) length=10
  - `expected_annual_return` (decimal) length=5
  - `created_at` (timestamp)
  - `updated_at` (timestamp)

### bf_route_error_heatmap
- Field count: 8
  - `id` (bigint)
  - `route` (varchar) length=255
  - `error_type` (varchar) length=100
  - `status_code` (int)
  - `hit_count` (int)
  - `last_seen` (datetime)
  - `created_at` (datetime)
  - `updated_at` (datetime)

### bf_runtime_config
- Field count: 5
  - `id` (bigint)
  - `config_key` (varchar) length=191
  - `config_value` (longtext)
  - `created_at` (datetime)
  - `updated_at` (datetime)

### bf_scanner_jobs
- Field count: 12
  - `id` (bigint)
  - `job_uuid` (varchar) length=64
  - `created_on` (datetime)
  - `started_on` (datetime)
  - `finished_on` (datetime)
  - `status` (varchar) length=16
  - `provider_used` (varchar) length=16
  - `timeframe` (varchar) length=16
  - `symbol_source` (varchar) length=16
  - `symbol_count` (int)
  - `params_json` (longtext)
  - `error_message` (text)

### bf_scanner_results
- Field count: 19
  - `id` (bigint)
  - `job_id` (bigint)
  - `symbol` (varchar) length=16
  - `timeframe` (varchar) length=16
  - `signal` (varchar) length=16
  - `direction` (varchar) length=8
  - `score` (float)
  - `price` (decimal) length=16
  - `vwap` (decimal) length=16
  - `ema8` (decimal) length=16
  - `ema13` (decimal) length=16
  - `ema55` (decimal) length=16
  - `last_liq_high` (decimal) length=16
  - `last_liq_low` (decimal) length=16
  - `volume` (bigint)
  - `vol_sma20` (decimal) length=16
  - `atr14` (decimal) length=16
  - `occurred_on` (datetime)
  - `payload_json` (longtext)

### bf_scanner_symbol_universe
- Field count: 6
  - `symbol` (varchar) length=16
  - `exchange` (varchar) length=32
  - `asset_type` (varchar) length=16
  - `is_active` (tinyint) length=1
  - `avg_volume_20d` (bigint)
  - `updated_on` (datetime)

### bf_scanner_taxonomy
- Field count: 7
  - `id` (bigint)
  - `scanner_name_raw` (varchar) length=255
  - `scanner_key` (varchar) length=191
  - `scanner_family` (varchar) length=191
  - `default_timeframe` (varchar) length=32
  - `created_at` (datetime)
  - `updated_at` (datetime)

### bf_sec_filings
- Field count: 7
  - `id` (int)
  - `accession_number` (varchar) length=32
  - `cik` (varchar) length=12
  - `filing_date` (date)
  - `form_type` (varchar) length=16
  - `document_url` (text)
  - `created_on` (datetime)

### bf_settings
- Field count: 8
  - `id` (int)
  - `class` (varchar) length=255
  - `key` (varchar) length=255
  - `value` (text)
  - `type` (varchar) length=31
  - `context` (varchar) length=255
  - `created_at` (datetime)
  - `updated_at` (datetime)

### bf_site_settings_overrides
- Field count: 4
  - `setting_key` (varchar) length=64
  - `setting_value` (varchar) length=255
  - `updated_at` (datetime)
  - `updated_by` (bigint)

### bf_social_communities
- Field count: 12
  - `id` (int)
  - `platform_id` (int)
  - `community_name` (varchar) length=150
  - `community_type` (varchar) length=50
  - `community_url` (varchar) length=255
  - `join_url` (varchar) length=255
  - `invite_code` (varchar) length=100
  - `is_primary` (tinyint) length=1
  - `status` (varchar) length=50
  - `notes` (text)
  - `created_at` (datetime)
  - `updated_at` (datetime)

### bf_social_distribution_queue
- Field count: 9
  - `id` (int)
  - `generated_post_id` (int)
  - `channel_key` (varchar) length=50
  - `payload_json` (text)
  - `status` (varchar) length=25
  - `attempts` (int)
  - `last_error` (text)
  - `created_at` (datetime)
  - `updated_at` (datetime)

### bf_social_generated_posts
- Field count: 17
  - `id` (int)
  - `source_type` (varchar) length=50
  - `source_id` (int)
  - `platform_id` (int)
  - `community_id` (int)
  - `template_id` (int)
  - `post_title` (varchar) length=255
  - `post_body` (mediumtext)
  - `hashtags` (text)
  - `tickers` (text)
  - `cta_link` (varchar) length=255
  - `status` (varchar) length=25
  - `posted_at` (datetime)
  - `external_post_url` (varchar) length=255
  - `error` (text)
  - `created_at` (datetime)
  - `updated_at` (datetime)

### bf_social_platforms
- Field count: 12
  - `id` (int)
  - `platform_key` (varchar) length=32
  - `display_name` (varchar) length=100
  - `base_url` (varchar) length=255
  - `supports_groups` (tinyint) length=1
  - `supports_short_video` (tinyint) length=1
  - `supports_long_video` (tinyint) length=1
  - `supports_live` (tinyint) length=1
  - `supports_polls` (tinyint) length=1
  - `supports_threads` (tinyint) length=1
  - `created_at` (datetime)
  - `updated_at` (datetime)

### bf_social_post_templates
- Field count: 13
  - `id` (int)
  - `platform_id` (int)
  - `template_key` (varchar) length=64
  - `title` (varchar) length=255
  - `max_chars` (int)
  - `hashtag_limit` (int)
  - `supports_links` (tinyint) length=1
  - `supports_mentions` (tinyint) length=1
  - `supports_tickers` (tinyint) length=1
  - `rules_json` (text)
  - `body_template` (text)
  - `created_at` (datetime)
  - `updated_at` (datetime)

### bf_squeeze_scorecards
- Field count: 7
  - `id` (int)
  - `symbol` (varchar) length=16
  - `short_interest` (float)
  - `float_shares` (bigint)
  - `borrow_rate` (float)
  - `squeeze_score` (float)
  - `created_at` (datetime)

### bf_stock_fundamentals
- Field count: 5
  - `id` (bigint)
  - `ticker` (varchar) length=10
  - `data` (longtext)
  - `created_on` (datetime)
  - `last_refreshed` (datetime)

### bf_strategy_progress
- Field count: 6
  - `id` (int)
  - `user_id` (int)
  - `strategy_id` (int)
  - `progress_percentage` (decimal) length=5
  - `notes` (text)
  - `updated_on` (datetime)

### bf_support_kb_articles
- Field count: 10
  - `id` (int)
  - `slug` (varchar) length=191
  - `title` (varchar) length=191
  - `category` (varchar) length=120
  - `tags_json` (text)
  - `body_html` (mediumtext)
  - `published` (tinyint) length=1
  - `views` (int)
  - `created_at` (datetime)
  - `updated_at` (datetime)

### bf_support_requests
- Field count: 14
  - `id` (int)
  - `user_id` (varchar) length=255
  - `email` (varchar) length=255
  - `name` (varchar) length=255
  - `details` (text)
  - `date` (date)
  - `time` (time)
  - `res_id` (int)
  - `response` (text)
  - `status` (varchar) length=50
  - `topic` (varchar) length=255
  - `created_on` (datetime)
  - `modified_on` (datetime)
  - `deleted_on` (datetime)

### bf_support_ticket_events
- Field count: 5
  - `id` (bigint)
  - `ticket_id` (bigint)
  - `event_type` (varchar) length=80
  - `payload_json` (longtext)
  - `created_at` (datetime)

### bf_support_tickets
- Field count: 13
  - `id` (bigint)
  - `user_id` (bigint)
  - `email` (varchar) length=255
  - `subject` (varchar) length=255
  - `message` (text)
  - `category` (varchar) length=50
  - `status` (varchar) length=30
  - `priority` (varchar) length=30
  - `ip_address` (varchar) length=45
  - `user_agent` (text)
  - `ref_context_json` (longtext)
  - `created_at` (datetime)
  - `updated_at` (datetime)

### bf_tax_audit_log
- Field count: 8
  - `id` (int)
  - `user_id` (int)
  - `action` (varchar) length=50
  - `entity_type` (varchar) length=50
  - `entity_id` (int)
  - `before_json` (longtext)
  - `after_json` (longtext)
  - `created_at` (datetime)

### bf_tax_jurisdictions
- Field count: 8
  - `id` (int)
  - `state` (varchar) length=2
  - `parish` (varchar) length=100
  - `name` (varchar) length=150
  - `code` (varchar) length=10
  - `active` (tinyint) length=1
  - `created_at` (datetime)
  - `updated_at` (datetime)

### bf_tax_rates
- Field count: 8
  - `id` (int)
  - `jurisdiction_id` (int)
  - `rate_total` (decimal) length=7
  - `rate_components` (json)
  - `effective_start` (date)
  - `effective_end` (date)
  - `created_at` (datetime)
  - `updated_at` (datetime)

### bf_tax_return_lines
- Field count: 10
  - `id` (int)
  - `template_id` (int)
  - `line_number` (int)
  - `label` (varchar) length=255
  - `type` (enum)
  - `calc_rule` (varchar) length=255
  - `requires_explain` (tinyint) length=1
  - `sort_order` (int)
  - `created_at` (datetime)
  - `updated_at` (datetime)

### bf_tax_return_templates
- Field count: 8
  - `id` (int)
  - `name` (varchar) length=150
  - `authority` (varchar) length=150
  - `frequency` (enum)
  - `notes` (text)
  - `active` (tinyint) length=1
  - `created_at` (datetime)
  - `updated_at` (datetime)

### bf_trade_alert_scanner_meta
- Field count: 8
  - `id` (bigint)
  - `alert_id` (bigint)
  - `scanner_key` (varchar) length=191
  - `scanner_family` (varchar) length=191
  - `timeframe` (varchar) length=32
  - `signal` (varchar) length=16
  - `tags_json` (longtext)
  - `created_at` (datetime)

### bf_trade_plans
- Field count: 20
  - `id` (bigint)
  - `user_id` (int)
  - `symbol` (varchar) length=16
  - `strategy` (varchar) length=64
  - `direction` (enum)
  - `entry` (decimal) length=14
  - `stop_loss` (decimal) length=14
  - `target_1` (decimal) length=14
  - `target_2` (decimal) length=14
  - `rr_ratio` (decimal) length=10
  - `risk_per_share` (decimal) length=14
  - `shares_total` (int)
  - `expected_profit_t1` (decimal) length=14
  - `expected_profit_t2` (decimal) length=14
  - `confidence_score` (decimal) length=6
  - `confirmations_json` (mediumtext)
  - `options_overlay_json` (mediumtext)
  - `created_on` (datetime)
  - `updated_on` (datetime)
  - `status` (enum)

### bf_user_discord_rewards
- Field count: 5
  - `id` (int)
  - `user_id` (int)
  - `activity` (varchar) length=100
  - `points_earned` (int)
  - `timestamp` (datetime)

### bf_user_employment
- Field count: 8
  - `id` (int)
  - `user_id` (int)
  - `employment_type` (varchar) length=40
  - `company_name` (varchar) length=160
  - `business_name` (varchar) length=160
  - `job_title` (varchar) length=120
  - `created_at` (datetime)
  - `updated_at` (datetime)

### bf_user_events
- Field count: 9
  - `id` (bigint)
  - `user_id` (int)
  - `event_key` (varchar) length=64
  - `event_group` (varchar) length=32
  - `referral_code` (varchar) length=64
  - `ip` (varchar) length=45
  - `user_agent` (varchar) length=255
  - `meta_json` (longtext)
  - `created_at` (datetime)

### bf_user_ip_history
- Field count: 10
  - `id` (int)
  - `user_id` (int)
  - `email` (varchar) length=255
  - `ip_address` (varchar) length=45
  - `user_agent` (varchar) length=1000
  - `login_count` (int)
  - `first_seen_at` (datetime)
  - `last_seen_at` (datetime)
  - `created_at` (datetime)
  - `updated_at` (datetime)

### bf_user_onboarding
- Field count: 8
  - `id` (int)
  - `user_id` (int)
  - `steps_json` (text)
  - `first_verified_login_at` (datetime)
  - `walkthrough_started_at` (datetime)
  - `walkthrough_completed_at` (datetime)
  - `created_at` (datetime)
  - `updated_at` (datetime)

### bf_user_profiles
- Field count: 8
  - `id` (int)
  - `user_id` (int)
  - `first_name` (varchar) length=120
  - `last_name` (varchar) length=120
  - `email` (varchar) length=255
  - `phone` (varchar) length=40
  - `created_at` (datetime)
  - `updated_at` (datetime)

### bf_user_tax_return_jurisdictions
- Field count: 7
  - `id` (int)
  - `return_id` (int)
  - `jurisdiction_id` (int)
  - `taxable_amount` (decimal) length=12
  - `tax_due` (decimal) length=12
  - `created_at` (datetime)
  - `updated_at` (datetime)

### bf_user_tax_return_values
- Field count: 7
  - `id` (int)
  - `return_id` (int)
  - `line_id` (int)
  - `amount` (decimal) length=12
  - `explain_text` (varchar) length=255
  - `created_at` (datetime)
  - `updated_at` (datetime)

### bf_user_tax_returns
- Field count: 12
  - `id` (int)
  - `user_id` (int)
  - `template_id` (int)
  - `filing_period_start` (date)
  - `filing_period_end` (date)
  - `due_date` (date)
  - `file_date` (date)
  - `status` (enum)
  - `total_remitted` (decimal) length=12
  - `notes` (text)
  - `created_at` (datetime)
  - `updated_at` (datetime)

### bf_user_tokens
- Field count: 6
  - `id` (int)
  - `user_id` (int)
  - `token_address` (varchar) length=255
  - `amount` (decimal) length=20
  - `created_at` (timestamp)
  - `updated_at` (timestamp)

### bf_user_trading_accounts
- Field count: 13
  - `id` (int)
  - `user_id` (int)
  - `broker` (varchar) length=64
  - `nickname` (varchar) length=64
  - `account_type` (varchar) length=32
  - `balance` (decimal) length=14
  - `buying_power` (decimal) length=14
  - `multiplier` (decimal) length=10
  - `max_daily_loss_amt` (decimal) length=14
  - `max_risk_per_trade_amt` (decimal) length=14
  - `is_active` (tinyint) length=1
  - `created_on` (datetime)
  - `updated_on` (datetime)

### bf_user_trading_profile
- Field count: 10
  - `id` (int)
  - `user_id` (int)
  - `daily_min_target` (decimal) length=12
  - `max_risk_per_trade_pct` (decimal) length=6
  - `max_daily_loss_pct` (decimal) length=6
  - `preferred_strategy` (varchar) length=64
  - `timezone` (varchar) length=64
  - `enable_options_overlay` (tinyint) length=1
  - `created_on` (datetime)
  - `updated_on` (datetime)

### bf_users
- Field count: 103
  - `id` (int)
  - `role_id` (int)
  - `active` (tinyint) length=1
  - `activate_hash` (varchar) length=40
  - `reset_by` (int)
  - `account_type` (varchar) length=32
  - `signup_date` (varchar) length=128
  - `email` (varchar) length=254
  - `password_hash` (char) length=60
  - `reset_hash` (varchar) length=40
  - `force_password_reset` (tinyint) length=1
  - `referred` (varchar) length=45
  - `referral_code` (varchar) length=128
  - `reactivate` (varchar) length=128
  - `username` (varchar) length=30
  - `display_name` (varchar) length=255
  - `display_name_changed` (date)
  - `first_name` (varchar) length=256
  - `middle_name` (varchar) length=32
  - `last_name` (varchar) length=256
  - `name_suffix` (varchar) length=32
  - `dob` (varchar) length=45
  - `ssn` (varchar) length=32
  - `phone` (varchar) length=15
  - `address` (varchar) length=512
  - `city` (varchar) length=512
  - `state` (varchar) length=128
  - `country` (varchar) length=256
  - `zipcode` (varchar) length=15
  - `mailing_address` (varchar) length=512
  - `employment` (varchar) length=128
  - `occupation` (varchar) length=256
  - `salary` (varchar) length=45
  - `proof_identity` (text)
  - `proof_address` (text)
  - `timezone` (varchar) length=40
  - `language` (varchar) length=20
  - `type` (varchar) length=128
  - `admin` (varchar) length=32
  - `partner` (int)
  - `investor` (varchar) length=32
  - `beta_wallet` (varchar) length=32
  - `private_key` (varchar) length=128
  - `wallet_id` (varchar) length=64
  - `default_wallet` (varchar) length=45
  - `tt_columns` (varchar) length=32
  - `organization` (varchar) length=256
  - `picture` (varchar) length=256
  - `link` (varchar) length=256
  - `ref_signup_date` (varchar) length=128
  - `referrer` (varchar) length=128
  - `referrer_code` (varchar) length=128
  - `promo_code` (varchar) length=128
  - `last_login` (datetime)
  - `last_ip` (varchar) length=45
  - `created_on` (datetime)
  - `deleted` (tinyint) length=1
  - `banned` (tinyint) length=1
  - `ban_message` (varchar) length=255
  - `account_information` (varchar) length=45
  - `kyc` (varchar) length=32
  - `kyc_verified` (varchar) length=45
  - `features_activated` (varchar) length=45
  - `financial_assessment` (varchar) length=32
  - `investment_assessment` (varchar) length=32
  - `banking_accounts` (varchar) length=45
  - `banking_wallets` (varchar) length=45
  - `last_banking_update` (varchar) length=45
  - `banking_integration` (varchar) length=45
  - `credit_summary` (varchar) length=45
  - `credit_wallets` (varchar) length=45
  - `last_credit_update` (varchar) length=45
  - `credit_integration` (varchar) length=45
  - `debt_summary` (varchar) length=45
  - `debt_wallets` (varchar) length=45
  - `last_debt_update` (varchar) length=45
  - `debt_integration` (varchar) length=45
  - `budgeting_complete` (varchar) length=32
  - `investment_wallets` (varchar) length=45
  - `last_investment_update` (varchar) length=45
  - `brokerage_integration` (varchar) length=45
  - `risk_assessment` (varchar) length=32
  - `financial_goals` (varchar) length=45
  - `time_horizon` (varchar) length=45
  - `financial_rating` (varchar) length=45
  - `investment_experience` (varchar) length=45
  - `investment_knowledge` (varchar) length=45
  - `market_sentiment` (varchar) length=45
  - `investment_availability` (varchar) length=45
  - `personal_budgeting` (varchar) length=32
  - `portfolio_manager` (varchar) length=32
  - `automated_integration` (varchar) length=32
  - `asset_creator` (varchar) length=32
  - `account_review` (int)
  - `marketing_review` (int)
  - `request_ban` (int)
  - `drip_campaign_type` (enum)
  - `drip_step_number` (int)
  - `drip_last_sent_at` (datetime)
  - `drip_completed` (tinyint) length=1
  - `email_verified_at` (datetime)
  - `email_bounced_at` (datetime)
  - `email_verification_token_hash` (varchar) length=255

### bf_users_2fa
- Field count: 9
  - `id` (bigint)
  - `user_id` (int)
  - `is_enabled` (tinyint) length=1
  - `secret_ciphertext` (text)
  - `secret_iv` (varbinary) length=16
  - `secret_tag` (varbinary) length=16
  - `backup_codes_hashes` (text)
  - `created_at` (datetime)
  - `updated_at` (datetime)

### bf_users_account_ledger
- Field count: 9
  - `id` (int)
  - `account_id` (int)
  - `user_id` (int)
  - `type` (enum)
  - `previous_balance` (decimal) length=10
  - `new_balance` (decimal) length=10
  - `difference` (decimal) length=10
  - `action` (enum)
  - `timestamp` (timestamp)

### bf_users_alerts
- Field count: 9
  - `id` (int)
  - `user_id` (int)
  - `alert_type` (varchar) length=50
  - `alert_message` (text)
  - `status` (tinyint) length=1
  - `created_on` (datetime)
  - `symbol` (varchar) length=10
  - `updated_on` (datetime)
  - `last_triggered_on` (datetime)

### bf_users_anonymous
- Field count: 4
  - `id` (int)
  - `anonymous_id` (varchar) length=20
  - `ip_address` (varchar) length=45
  - `created_at` (timestamp)

### bf_users_audit_log
- Field count: 6
  - `id` (int)
  - `user_id` (int)
  - `wallet_id` (int)
  - `action` (varchar) length=255
  - `details` (text)
  - `created_at` (datetime)

### bf_users_bank_accounts
- Field count: 27
  - `id` (int)
  - `beta` (varchar) length=45
  - `active` (int)
  - `status` (varchar) length=45
  - `deleted` (varchar) length=45
  - `current_timestamp` (datetime)
  - `date` (varchar) length=32
  - `time` (varchar) length=32
  - `user_id` (varchar) length=32
  - `user_email` (varchar) length=32
  - `username` (varchar) length=512
  - `wallet_id` (varchar) length=128
  - `fl_loginId` (varchar) length=128
  - `fl_institution_id` (varchar) length=64
  - `account_type` (varchar) length=32
  - `bank_account_owner` (varchar) length=32
  - `bank_name` (varchar) length=512
  - `routing_number` (varchar) length=512
  - `account_number` (varchar) length=512
  - `verify_account` (varchar) length=32
  - `ach_enabled` (varchar) length=45
  - `nickname` (varchar) length=32
  - `balance` (varchar) length=45
  - `current_balance` (varchar) length=32
  - `available_balance` (varchar) length=32
  - `created_on` (datetime)
  - `updated_on` (datetime)

### bf_users_budgeting
- Field count: 38
  - `id` (bigint)
  - `status` (varchar) length=32
  - `deleted` (varchar) length=45
  - `mode` (varchar) length=45
  - `paid` (varchar) length=45
  - `paid_date` (varchar) length=45
  - `paid_time` (varchar) length=45
  - `beta` (varchar) length=45
  - `submitted_on` (datetime)
  - `unix_timestamp` (varchar) length=128
  - `designated_date` (varchar) length=128
  - `designated_date_override` (varchar) length=45
  - `initial_weeks_left` (varchar) length=45
  - `last_date` (varchar) length=45
  - `month` (int)
  - `day` (int)
  - `year` (int)
  - `time` (varchar) length=32
  - `created_by` (varchar) length=128
  - `created_by_email` (varchar) length=256
  - `username` (varchar) length=256
  - `account_type` (varchar) length=128
  - `source_type` (varchar) length=128
  - `name` (varchar) length=256
  - `net_amount` (varchar) length=256
  - `gross_amount` (varchar) length=256
  - `monthly_payment` (varchar) length=45
  - `account_summary` (varchar) length=45
  - `wallet_id` (varchar) length=45
  - `is_debt` (varchar) length=45
  - `is_cc_payment` (int)
  - `intervals` (varchar) length=32
  - `recurring_account` (varchar) length=45
  - `recurring_account_primary` (varchar) length=45
  - `recurring_account_id` (varchar) length=45
  - `recurring_account_order` (varchar) length=45
  - `recurring_schedule` (varchar) length=45
  - `link` (text)

### bf_users_budgeting_forecast
- Field count: 13
  - `id` (int)
  - `user_id` (int)
  - `forecast_date` (varchar) length=45
  - `month` (varchar) length=16
  - `income` (decimal) length=10
  - `expenses` (decimal) length=10
  - `disposable_income` (decimal) length=10
  - `investment_opportunity_flag` (tinyint) length=1
  - `advisor_notes` (text)
  - `recommendation_score` (decimal) length=5
  - `risk_rating` (varchar) length=32
  - `synced_on` (datetime)
  - `created_on` (datetime)

### bf_users_budgeting_goals
- Field count: 10
  - `id` (int)
  - `user_id` (int)
  - `goal_name` (varchar) length=255
  - `target_amount` (decimal) length=10
  - `current_savings` (decimal) length=10
  - `status` (enum)
  - `target_date` (date)
  - `created_at` (timestamp)
  - `updated_at` (timestamp)
  - `description` (text)

### bf_users_certified_advisors
- Field count: 12
  - `id` (int)
  - `user_id` (int)
  - `name` (varchar) length=255
  - `specialty` (varchar) length=255
  - `location` (varchar) length=255
  - `contact` (varchar) length=255
  - `bio` (text)
  - `certifications` (text)
  - `experience` (int)
  - `fee_structure` (varchar) length=255
  - `created_at` (timestamp)
  - `updated_at` (timestamp)

### bf_users_coin_purchases
- Field count: 35
  - `id` (int)
  - `unix_timestamp` (varchar) length=32
  - `current_date` (datetime)
  - `month` (varchar) length=32
  - `day` (varchar) length=32
  - `year` (varchar) length=32
  - `time` (varchar) length=32
  - `status` (varchar) length=32
  - `beta` (varchar) length=32
  - `wallet_id` (varchar) length=64
  - `user_id` (int)
  - `user_email` (varchar) length=512
  - `reward` (varchar) length=32
  - `reward_type` (varchar) length=128
  - `feature` (varchar) length=128
  - `coin` (varchar) length=32
  - `initial_value` (varchar) length=64
  - `current_value` (varchar) length=32
  - `available_coins` (varchar) length=64
  - `new_availability` (varchar) length=32
  - `minimum_coin_amount` (varchar) length=32
  - `initial_coin_value` (varchar) length=64
  - `new_coin_value` (varchar) length=64
  - `amount` (varchar) length=32
  - `total` (varchar) length=32
  - `total_cost` (varchar) length=32
  - `total_fees` (varchar) length=32
  - `gas_fee` (varchar) length=32
  - `trans_fee` (varchar) length=32
  - `trans_percent` (varchar) length=32
  - `user_gas_fee` (varchar) length=32
  - `user_trans_fee` (varchar) length=32
  - `user_trans_percent` (varchar) length=32
  - `referral_id` (varchar) length=32
  - `redirect_url` (text)

### bf_users_comments
- Field count: 6
  - `id` (int)
  - `user_id` (varchar) length=20
  - `anonymous_id` (varchar) length=20
  - `ticker` (varchar) length=10
  - `comment_text` (text)
  - `created_at` (timestamp)

### bf_users_credit_accounts
- Field count: 27
  - `id` (int)
  - `beta` (varchar) length=45
  - `status` (varchar) length=45
  - `active` (varchar) length=45
  - `deleted` (varchar) length=45
  - `current_timestamp` (datetime)
  - `date` (varchar) length=32
  - `time` (varchar) length=32
  - `user_id` (varchar) length=32
  - `user_email` (varchar) length=32
  - `username` (varchar) length=512
  - `wallet_id` (varchar) length=128
  - `fl_loginId` (varchar) length=128
  - `fl_institution_id` (varchar) length=64
  - `account_type` (varchar) length=32
  - `bank_name` (varchar) length=512
  - `nickname` (varchar) length=32
  - `account_number` (varchar) length=512
  - `credit_limit` (varchar) length=32
  - `current_balance` (varchar) length=32
  - `available_balance` (varchar) length=32
  - `credit_status` (varchar) length=256
  - `due_date` (varchar) length=255
  - `payment_due` (varchar) length=45
  - `interest_rate` (varchar) length=45
  - `created_on` (datetime)
  - `updated_on` (datetime)

### bf_users_crypto_accounts
- Field count: 26
  - `id` (int)
  - `status` (varchar) length=50
  - `deleted` (tinyint) length=1
  - `current_timestamp` (datetime)
  - `beta` (tinyint) length=1
  - `date` (date)
  - `time` (time)
  - `user_id` (int)
  - `user_email` (varchar) length=255
  - `username` (varchar) length=255
  - `account_id` (varchar) length=255
  - `purchase_type` (varchar) length=50
  - `wallet_id` (varchar) length=255
  - `nickname` (varchar) length=255
  - `account_type` (varchar) length=50
  - `access_code` (varchar) length=255
  - `refresh_token` (varchar) length=255
  - `broker_id` (varchar) length=255
  - `broker` (varchar) length=255
  - `account_number` (varchar) length=255
  - `amount` (decimal) length=15
  - `initial_value` (decimal) length=15
  - `available_funds` (decimal) length=15
  - `net_worth` (decimal) length=15
  - `created_on` (datetime)
  - `updated_on` (datetime)

### bf_users_debt_accounts
- Field count: 28
  - `id` (int)
  - `beta` (varchar) length=45
  - `status` (varchar) length=45
  - `active` (int)
  - `deleted` (varchar) length=45
  - `current_timestamp` (datetime)
  - `date` (varchar) length=32
  - `time` (varchar) length=32
  - `user_id` (varchar) length=32
  - `user_email` (varchar) length=32
  - `username` (varchar) length=512
  - `wallet_id` (varchar) length=128
  - `fl_loginId` (varchar) length=128
  - `fl_institution_id` (varchar) length=64
  - `account_type` (varchar) length=32
  - `debtor` (varchar) length=512
  - `nickname` (varchar) length=32
  - `account_status` (varchar) length=45
  - `account_number` (varchar) length=512
  - `due_date` (varchar) length=45
  - `credit_limit` (varchar) length=32
  - `credit_status` (varchar) length=45
  - `current_balance` (varchar) length=32
  - `available_balance` (varchar) length=32
  - `monthly_payment` (varchar) length=32
  - `interest_rate` (varchar) length=45
  - `created_on` (datetime)
  - `updated_on` (datetime)

### bf_users_financial_institutions
- Field count: 12
  - `id` (int)
  - `user_id` (int)
  - `name` (varchar) length=255
  - `specialty` (varchar) length=255
  - `location` (varchar) length=255
  - `contact` (varchar) length=255
  - `bio` (text)
  - `certifications` (text)
  - `experience` (text)
  - `fee_structure` (text)
  - `created_at` (timestamp)
  - `updated_at` (timestamp)

### bf_users_goal_checklist
- Field count: 17
  - `id` (int)
  - `status` (int)
  - `active` (int)
  - `order_id` (int)
  - `category` (varchar) length=128
  - `goal_type` (enum)
  - `goal_description` (text)
  - `goal_completion_status` (tinyint) length=1
  - `gold_reward` (decimal) length=10
  - `start_date` (date)
  - `end_date` (date)
  - `frequency` (varchar) length=128
  - `created_at` (timestamp)
  - `updated_at` (timestamp)
  - `difficulty_level` (varchar) length=128
  - `sequence_order` (varchar) length=128
  - `max_redemption_times` (varchar) length=128

### bf_users_goal_completions
- Field count: 6
  - `id` (int)
  - `user_id` (int)
  - `goal_id` (int)
  - `completion_date` (timestamp)
  - `reward_transferred` (tinyint) length=1
  - `transaction_id` (varchar) length=255

### bf_users_invest_accounts
- Field count: 31
  - `id` (int)
  - `status` (varchar) length=5
  - `beta` (varchar) length=32
  - `deleted` (varchar) length=45
  - `active` (int)
  - `current_timestamp` (datetime)
  - `date` (varchar) length=32
  - `time` (varchar) length=32
  - `user_id` (varchar) length=32
  - `user_email` (varchar) length=512
  - `username` (varchar) length=128
  - `account_id` (varchar) length=45
  - `purchase_type` (varchar) length=45
  - `wallet_id` (varchar) length=128
  - `nickname` (varchar) length=512
  - `account_type` (varchar) length=512
  - `investment_type` (varchar) length=128
  - `investment_date` (date)
  - `symbol` (varchar) length=32
  - `investment_amount` (decimal) length=12
  - `access_code` (text)
  - `refresh_token` (text)
  - `broker_id` (varchar) length=128
  - `broker` (varchar) length=512
  - `account_number` (varchar) length=45
  - `amount` (varchar) length=32
  - `initial_value` (varchar) length=32
  - `available_funds` (varchar) length=45
  - `net_worth` (varchar) length=45
  - `created_on` (datetime)
  - `updated_on` (datetime)

### bf_users_link_clicks
- Field count: 6
  - `id` (int)
  - `redirect_id` (int)
  - `platform` (varchar) length=50
  - `ip_address` (varchar) length=45
  - `user_agent` (text)
  - `clicked_at` (datetime)

### bf_users_loan_accounts
- Field count: 28
  - `id` (int)
  - `beta` (varchar) length=45
  - `status` (varchar) length=45
  - `active` (int)
  - `deleted` (varchar) length=45
  - `current_timestamp` (datetime)
  - `date` (varchar) length=32
  - `time` (varchar) length=32
  - `user_id` (varchar) length=32
  - `user_email` (varchar) length=32
  - `username` (varchar) length=512
  - `wallet_id` (varchar) length=128
  - `fl_loginId` (varchar) length=128
  - `fl_institution_id` (varchar) length=64
  - `account_type` (varchar) length=32
  - `lender` (varchar) length=512
  - `nickname` (varchar) length=32
  - `account_status` (varchar) length=45
  - `account_number` (varchar) length=512
  - `due_date` (varchar) length=45
  - `loan_amount` (varchar) length=32
  - `loan_status` (varchar) length=45
  - `current_balance` (varchar) length=32
  - `available_balance` (varchar) length=32
  - `monthly_payment` (varchar) length=32
  - `interest_rate` (varchar) length=45
  - `created_on` (datetime)
  - `updated_on` (datetime)

### bf_users_memberships
- Field count: 14
  - `id` (int)
  - `status` (varchar) length=50
  - `active` (tinyint) length=1
  - `display` (tinyint) length=1
  - `identifier` (varchar) length=255
  - `category` (varchar) length=50
  - `feature_level` (int)
  - `feature_name` (varchar) length=100
  - `feature_cost` (decimal) length=10
  - `feature_description` (text)
  - `feature_benefits` (text)
  - `feature_link` (text)
  - `created_at` (timestamp)
  - `updated_at` (timestamp)

### bf_users_notification_subscriptions
- Field count: 9
  - `id` (int)
  - `endpoint` (text)
  - `public_key` (text)
  - `auth_token` (text)
  - `created_at` (datetime)
  - `page_url` (varchar) length=512
  - `is_notified` (int)
  - `user_id` (varchar) length=45
  - `email` (varchar) length=512

### bf_users_onboarding
- Field count: 14
  - `id` (int)
  - `user_id` (int)
  - `kyc_verified` (tinyint) length=1
  - `legal_policy_agreed` (tinyint) length=1
  - `membership_customized` (tinyint) length=1
  - `registered_robinhood` (tinyint) length=1
  - `registered_tradingview` (tinyint) length=1
  - `joined_discord` (tinyint) length=1
  - `completed_budget` (tinyint) length=1
  - `added_wallets` (tinyint) length=1
  - `viewed_financial_summary` (tinyint) length=1
  - `reminder_last_sent` (timestamp)
  - `created_at` (timestamp)
  - `updated_at` (timestamp)

### bf_users_post_likes
- Field count: 4
  - `id` (int)
  - `post_id` (int)
  - `user_id` (int)
  - `submitted_date` (datetime)

### bf_users_promotional_messages
- Field count: 7
  - `id` (int)
  - `active` (varchar) length=255
  - `message` (text)
  - `created_at` (datetime)
  - `updated_at` (datetime)
  - `noto_count` (int)
  - `email_noto_count` (int)

### bf_users_promotions
- Field count: 5
  - `id` (int)
  - `active` (int)
  - `message` (text)
  - `created_at` (datetime)
  - `updated_at` (datetime)

### bf_users_rate_limits
- Field count: 8
  - `id` (bigint)
  - `scope` (varchar) length=96
  - `rl_key` (varchar) length=128
  - `count` (int)
  - `window_started` (datetime)
  - `blocked_until` (datetime)
  - `updated_at` (datetime)
  - `created_at` (datetime)

### bf_users_referral_program
- Field count: 22
  - `id` (int)
  - `user_id` (int)
  - `referrer_code` (varchar) length=50
  - `active` (tinyint) length=1
  - `links_created` (int)
  - `signup_date` (datetime)
  - `user_type` (varchar) length=50
  - `first_name` (varchar) length=100
  - `last_name` (varchar) length=100
  - `email` (varchar) length=100
  - `phone` (varchar) length=20
  - `address` (varchar) length=255
  - `city` (varchar) length=100
  - `state` (varchar) length=100
  - `country` (varchar) length=100
  - `zipcode` (varchar) length=20
  - `paypal` (varchar) length=100
  - `basic_code` (varchar) length=50
  - `premium_code` (varchar) length=50
  - `gold_code` (varchar) length=50
  - `other_payment` (varchar) length=100
  - `advertisement` (text)

### bf_users_referrals
- Field count: 19
  - `id` (int)
  - `referrer_code` (varchar) length=255
  - `signup_date` (datetime)
  - `user_id` (int)
  - `user_ip_address` (varchar) length=45
  - `type` (enum)
  - `city` (varchar) length=100
  - `state` (varchar) length=100
  - `country` (varchar) length=100
  - `zipcode` (varchar) length=10
  - `total_spend` (decimal) length=10
  - `days_active` (int)
  - `active` (tinyint) length=1
  - `referral_email` (varchar) length=256
  - `first_name` (varchar) length=100
  - `last_name` (varchar) length=100
  - `created_on` (datetime)
  - `modified_on` (datetime)
  - `deleted_on` (datetime)

### bf_users_retirement
- Field count: 13
  - `id` (int)
  - `user_id` (int)
  - `category` (varchar) length=50
  - `current_age` (int)
  - `retirement_age` (int)
  - `monthly_savings` (decimal) length=10
  - `current_savings` (decimal) length=15
  - `target_value` (decimal) length=15
  - `annual_return_target` (decimal) length=5
  - `created_on` (datetime)
  - `modified_on` (datetime)
  - `created_by` (int)
  - `modified_by` (int)

### bf_users_retirement_goals
- Field count: 5
  - `id` (int)
  - `user_id` (int)
  - `target_value` (decimal) length=15
  - `annual_return_target` (decimal) length=5
  - `created_on` (datetime)

### bf_users_retirement_plans
- Field count: 9
  - `id` (int)
  - `user_id` (int)
  - `investment_id` (int)
  - `target_amount` (decimal) length=18
  - `retirement_date` (date)
  - `current_progress` (decimal) length=18
  - `status` (enum)
  - `created_at` (timestamp)
  - `updated_at` (timestamp)

### bf_users_retirement_progress_logs
- Field count: 4
  - `id` (int)
  - `retirement_plan_id` (int)
  - `progress_amount` (decimal) length=18
  - `log_date` (timestamp)

### bf_users_services
- Field count: 12
  - `id` (int)
  - `status` (int)
  - `service` (varchar) length=512
  - `description` (varchar) length=45
  - `url_link` (varchar) length=45
  - `cost` (decimal) length=8
  - `price` (decimal) length=8
  - `discount` (decimal) length=8
  - `net_price` (int)
  - `call_limit` (int)
  - `billing_type` (varchar) length=128
  - `user_id` (int)

### bf_users_services_purchases
- Field count: 10
  - `id` (int)
  - `status` (enum)
  - `purchase_time` (timestamp)
  - `user_id` (int)
  - `service_id` (int)
  - `service_name` (varchar) length=1024
  - `cost` (decimal) length=5
  - `price` (decimal) length=5
  - `tier` (enum)
  - `service_features` (json)

### bf_users_sessions
- Field count: 8
  - `id` (bigint)
  - `user_id` (int)
  - `session_id` (varchar) length=128
  - `ip_address` (varchar) length=64
  - `user_agent` (varchar) length=512
  - `created_at` (datetime)
  - `last_seen` (datetime)
  - `revoked_at` (datetime)

### bf_users_subscribers
- Field count: 17
  - `id` (int)
  - `email` (varchar) length=45
  - `referral` (varchar) length=45
  - `category` (varchar) length=255
  - `subject` (varchar) length=255
  - `topic` (varchar) length=255
  - `beta` (tinyint) length=1
  - `date` (datetime)
  - `hostTime` (varchar) length=45
  - `time` (varchar) length=45
  - `user_id` (int)
  - `user_ip` (varchar) length=45
  - `initial_sent` (int)
  - `status` (varchar) length=50
  - `delivery_error` (text)
  - `updated_at` (datetime)
  - `unsubscribe_token` (varchar) length=255

### bf_users_subscriptions
- Field count: 14
  - `id` (int)
  - `active` (int)
  - `user_id` (int)
  - `email` (varchar) length=255
  - `subscribed_on` (datetime)
  - `updated_on` (datetime)
  - `subscription_name` (varchar) length=255
  - `tier` (enum)
  - `membership_tier` (varchar) length=32
  - `membership_status` (varchar) length=32
  - `expires_at` (datetime)
  - `trial_ends_at` (datetime)
  - `source_channel` (varchar) length=64
  - `campaign_code` (varchar) length=128

### bf_users_trades
- Field count: 113
  - `id` (int)
  - `order_id` (varchar) length=45
  - `existing_order_id` (varchar) length=45
  - `active` (int)
  - `status` (varchar) length=32
  - `deleted` (varchar) length=45
  - `saved_sorting` (json)
  - `submitted_date` (varchar) length=45
  - `created_by` (varchar) length=45
  - `created_on` (datetime)
  - `modified_on` (datetime)
  - `updated_on` (datetime)
  - `modified_by` (varchar) length=45
  - `user_id` (varchar) length=45
  - `user_email` (varchar) length=45
  - `username` (varchar) length=45
  - `trading_account_id` (varchar) length=45
  - `trading_account` (varchar) length=45
  - `trading_account_tag` (varchar) length=45
  - `order_status` (varchar) length=45
  - `category` (varchar) length=45
  - `trade_type` (varchar) length=45
  - `purchase_type` (varchar) length=50
  - `closed` (varchar) length=128
  - `symbol_id` (varchar) length=45
  - `symbol` (varchar) length=45
  - `symbol_tag` (varchar) length=45
  - `key` (varchar) length=45
  - `current_price` (varchar) length=45
  - `entry_price` (varchar) length=32
  - `close_price` (varchar) length=32
  - `net_gains` (varchar) length=45
  - `open_date` (varchar) length=32
  - `open_year` (varchar) length=45
  - `open_month` (varchar) length=45
  - `open_day` (varchar) length=45
  - `open_time` (varchar) length=32
  - `position_type` (varchar) length=50
  - `close_date` (varchar) length=32
  - `closed_year` (varchar) length=45
  - `closed_month` (varchar) length=45
  - `closed_day` (varchar) length=45
  - `close_time` (varchar) length=32
  - `price_target` (varchar) length=45
  - `stop_loss` (varchar) length=45
  - `total_trade_cost` (varchar) length=45
  - `expiration` (varchar) length=32
  - `shares` (varchar) length=32
  - `remaining_position` (decimal) length=15
  - `remaining_shares` (varchar) length=45
  - `number_of_contracts` (varchar) length=45
  - `strike` (varchar) length=32
  - `wallet` (varchar) length=32
  - `details` (text)
  - `trade_log_details` (text)
  - `premium` (varchar) length=32
  - `variation_perc` (varchar) length=45
  - `variation` (varchar) length=45
  - `closed_perc` (varchar) length=45
  - `closed_ref` (varchar) length=45
  - `closed_list` (varchar) length=5128
  - `on_open_fees` (varchar) length=45
  - `on_close_fees` (varchar) length=45
  - `total_fees` (varchar) length=45
  - `json_user_fields` (json)
  - `stats_interpolated_fields` (varchar) length=5128
  - `testText` (tinytext)
  - `fund_type` (varchar) length=50
  - `bond_type` (varchar) length=50
  - `company_name` (varchar) length=255
  - `equity_percentage` (float)
  - `startup_name` (varchar) length=255
  - `investment_stage` (varchar) length=50
  - `derivative_type` (varchar) length=50
  - `item_name` (varchar) length=255
  - `item_type` (varchar) length=50
  - `currency_type` (varchar) length=50
  - `amount` (float)
  - `bank_name` (varchar) length=255
  - `interest_rate` (float)
  - `fund_name` (varchar) length=255
  - `provider_name` (varchar) length=255
  - `annuity_type` (varchar) length=50
  - `account_type` (varchar) length=50
  - `coverage_type` (varchar) length=50
  - `security_type` (varchar) length=50
  - `index_name` (varchar) length=50
  - `pm_unit_of_measurement` (varchar) length=50
  - `pm_storage_costs` (float)
  - `ib_country_of_origin` (varchar) length=50
  - `ib_currency` (varchar) length=50
  - `ib_local_exchange` (varchar) length=50
  - `strategy_id` (int)
  - `goal_id` (int)
  - `ema_3` (decimal) length=10
  - `ema_8` (decimal) length=10
  - `ema_9` (decimal) length=10
  - `ema_13` (decimal) length=10
  - `ema_21` (decimal) length=10
  - `ema_34` (decimal) length=10
  - `ema_48` (decimal) length=10
  - `ema_100` (decimal) length=10
  - `ema_200` (decimal) length=10
  - `sma_50` (decimal) length=10
  - `sma_200` (decimal) length=10
  - `macd` (decimal) length=10
  - `rsi` (decimal) length=10
  - `volume` (decimal) length=10
  - `ema_3_8` (varchar) length=10
  - `ema_8_13` (varchar) length=10
  - `ema_13_34` (varchar) length=10
  - `ema_34_48` (varchar) length=10
  - `ema_consensus` (varchar) length=10

### bf_users_trades_configs
- Field count: 7
  - `id` (int)
  - `user_id` (int)
  - `config_name` (varchar) length=255
  - `config_value` (varchar) length=255
  - `status` (tinyint) length=1
  - `created_on` (datetime)
  - `modified_on` (datetime)

### bf_users_trades_logs
- Field count: 25
  - `id` (int)
  - `trade_id` (int)
  - `user_id` (int)
  - `action` (varchar) length=255
  - `log_details` (text)
  - `created_on` (datetime)
  - `ema_3` (decimal) length=10
  - `ema_8` (decimal) length=10
  - `ema_9` (decimal) length=10
  - `ema_13` (decimal) length=10
  - `ema_21` (decimal) length=10
  - `ema_34` (decimal) length=10
  - `ema_48` (decimal) length=10
  - `ema_100` (decimal) length=10
  - `ema_200` (decimal) length=10
  - `sma_50` (decimal) length=10
  - `sma_200` (decimal) length=10
  - `macd` (decimal) length=10
  - `rsi` (decimal) length=10
  - `volume` (decimal) length=10
  - `ema_3_8` (varchar) length=10
  - `ema_8_13` (varchar) length=10
  - `ema_13_34` (varchar) length=10
  - `ema_34_48` (varchar) length=10
  - `ema_consensus` (varchar) length=10

### bf_users_wallet
- Field count: 54
  - `id` (int)
  - `status` (varchar) length=45
  - `active` (varchar) length=5
  - `deleted` (varchar) length=45
  - `beta` (varchar) length=32
  - `created_on` (datetime)
  - `default_wallet` (varchar) length=32
  - `exchange_wallet` (varchar) length=32
  - `premium_wallet` (varchar) length=45
  - `ach_enabled` (varchar) length=45
  - `market_pair` (varchar) length=32
  - `market` (varchar) length=32
  - `user_id` (varchar) length=32
  - `user_email` (varchar) length=512
  - `username` (varchar) length=128
  - `broker_id` (varchar) length=128
  - `broker` (varchar) length=512
  - `broker_account_owner` (varchar) length=45
  - `public_token` (varchar) length=512
  - `request_id` (varchar) length=512
  - `account_id` (varchar) length=45
  - `item_id` (varchar) length=512
  - `access_token` (text)
  - `refresh_token` (text)
  - `purchase_type` (varchar) length=45
  - `wallet_type` (varchar) length=512
  - `amount` (varchar) length=32
  - `initial_value` (varchar) length=32
  - `nickname` (varchar) length=512
  - `broker_products` (text)
  - `routing_numbers` (text)
  - `broker_logo` (text)
  - `broker_primary_color` (varchar) length=7
  - `available_products` (text)
  - `billed_products` (text)
  - `consent_expiration_time` (datetime)
  - `error` (text)
  - `products` (text)
  - `update_type` (varchar) length=255
  - `webhook` (text)
  - `notifications` (int)
  - `auto_staking` (int)
  - `withdrawal_limit` (varchar) length=32
  - `transaction_fees` (varchar) length=32
  - `linked_account_id` (int)
  - `account_number` (varchar) length=128
  - `credit_limit` (decimal) length=10
  - `investment_type` (varchar) length=128
  - `crypto_type` (varchar) length=128
  - `provider` (enum)
  - `credentials` (json)
  - `category` (varchar) length=32
  - `label` (varchar) length=191
  - `updated_on` (datetime)

### bf_users_wallet_transactions
- Field count: 33
  - `id` (int)
  - `transaction_id` (varchar) length=128
  - `status` (varchar) length=45
  - `active` (varchar) length=5
  - `unix_timestamp` (varchar) length=32
  - `submitted_date` (varchar) length=128
  - `month` (varchar) length=32
  - `day` (varchar) length=32
  - `year` (varchar) length=32
  - `time` (varchar) length=128
  - `trans_type` (varchar) length=128
  - `currency` (varchar) length=32
  - `wallet_id` (varchar) length=128
  - `bank_account` (varchar) length=32
  - `broker` (varchar) length=512
  - `nickname` (varchar) length=512
  - `user_id` (varchar) length=32
  - `user_email` (varchar) length=512
  - `type` (varchar) length=512
  - `deposit_date` (varchar) length=128
  - `withdraw_date` (varchar) length=128
  - `amount` (varchar) length=32
  - `initial_amount` (varchar) length=32
  - `current_amount` (varchar) length=32
  - `fees` (varchar) length=32
  - `total_cost` (varchar) length=32
  - `large_transaction_flag` (tinyint) length=1
  - `reviewed` (tinyint) length=1
  - `reviewed_by` (int)
  - `reviewed_at` (timestamp)
  - `review_notes` (text)
  - `suspicious_pattern` (tinyint) length=1
  - `pattern_details` (text)

### bf_users_watchlist
- Field count: 7
  - `id` (int)
  - `user_id` (int)
  - `status` (int)
  - `symbol` (varchar) length=10
  - `created_at` (timestamp)
  - `created_on` (datetime)
  - `current_price` (int)

### bf_weekly_stream_watchlist
- Field count: 7
  - `id` (int)
  - `week_start_date` (date)
  - `watchlist_name` (varchar) length=128
  - `symbol` (varchar) length=32
  - `score` (decimal) length=10
  - `notes` (text)
  - `created_at` (datetime)

### chat_usage
- Field count: 7
  - `user_id` (bigint)
  - `month` (char) length=7
  - `tokens_used` (int)
  - `usd_used` (decimal) length=10
  - `last_plan` (varchar) length=32
  - `last_email` (varchar) length=255
  - `updated_at` (datetime)

### error_heatmap
- Field count: 4
  - `id` (bigint)
  - `route` (varchar) length=255
  - `error_count` (int)
  - `last_error` (datetime)

### estimate_request_photos
- Field count: 8
  - `id` (int)
  - `estimate_request_id` (int)
  - `file_name` (varchar) length=255
  - `original_name` (varchar) length=255
  - `file_path` (varchar) length=500
  - `file_type` (varchar) length=100
  - `file_size` (int)
  - `created_at` (datetime)

### migrations
- Field count: 7
  - `id` (bigint)
  - `version` (varchar) length=255
  - `class` (varchar) length=255
  - `group` (varchar) length=255
  - `namespace` (varchar) length=255
  - `time` (int)
  - `batch` (int)

### mymiwallet.bf_project_commitments
- Field count: 9
  - `id` (int)
  - `project_id` (int)
  - `user_id` (int)
  - `amount` (decimal) length=15
  - `status` (varchar) length=32
  - `notes` (text)
  - `created_at` (datetime)
  - `updated_at` (datetime)
  - `deleted_at` (datetime)

### ops_projects
- Field count: 11
  - `id` (int)
  - `code` (varchar) length=32
  - `name` (varchar) length=255
  - `owner` (varchar) length=128
  - `priority` (varchar) length=8
  - `status` (varchar) length=20
  - `start_date` (date)
  - `target_date` (date)
  - `notes` (text)
  - `created_at` (datetime)
  - `updated_at` (datetime)

### ops_subprojects
- Field count: 11
  - `id` (int)
  - `project_id` (int)
  - `code` (varchar) length=32
  - `name` (varchar) length=255
  - `owner` (varchar) length=128
  - `priority` (varchar) length=8
  - `status` (varchar) length=20
  - `due_date` (date)
  - `notes` (text)
  - `created_at` (datetime)
  - `updated_at` (datetime)

### ops_task_events
- Field count: 6
  - `id` (int)
  - `task_id` (int)
  - `event_type` (varchar) length=32
  - `payload_json` (longtext)
  - `created_by` (varchar) length=128
  - `created_at` (datetime)

### ops_tasks
- Field count: 20
  - `id` (int)
  - `project_id` (int)
  - `subproject_id` (int)
  - `code` (varchar) length=32
  - `area` (varchar) length=64
  - `feature_surface` (varchar) length=128
  - `title` (varchar) length=255
  - `acceptance` (text)
  - `status` (varchar) length=20
  - `severity` (varchar) length=16
  - `priority` (varchar) length=8
  - `owner` (varchar) length=128
  - `due_date` (date)
  - `routes` (text)
  - `handler` (varchar) length=255
  - `dependencies` (text)
  - `evidence_link` (varchar) length=255
  - `updated_utc` (datetime)
  - `created_at` (datetime)
  - `updated_at` (datetime)

### quick_links
- Field count: 4
  - `id` (int)
  - `title` (varchar) length=255
  - `url` (varchar) length=255
  - `keywords` (text)

### settings
- Field count: 8
  - `id` (int)
  - `class` (varchar) length=255
  - `key` (varchar) length=255
  - `value` (text)
  - `type` (varchar) length=31
  - `context` (varchar) length=255
  - `created_at` (datetime)
  - `updated_at` (datetime)

### system_errors
- Field count: 8
  - `id` (bigint)
  - `level` (varchar) length=20
  - `message` (text)
  - `file` (varchar) length=255
  - `line` (int)
  - `route` (varchar) length=255
  - `classification` (varchar) length=50
  - `created_at` (datetime)

### users
- Field count: 139
  - `id` (int)
  - `role_id` (int)
  - `email` (varchar) length=255
  - `username` (varchar) length=30
  - `phone` (varchar) length=45
  - `status` (varchar) length=255
  - `status_message` (varchar) length=255
  - `active` (tinyint) length=1
  - `activate_hash` (varchar) length=255
  - `last_active` (datetime)
  - `password` (char) length=60
  - `password_hash` (char) length=60
  - `reset_at` (datetime)
  - `reset_hash` (char) length=60
  - `reset_expires` (datetime)
  - `created_at` (datetime)
  - `updated_at` (datetime)
  - `deleted_at` (datetime)
  - `reset_by` (int)
  - `account_type` (varchar) length=32
  - `signup_date` (varchar) length=128
  - `force_password_reset` (tinyint) length=1
  - `referred` (varchar) length=45
  - `referral_code` (varchar) length=128
  - `referred_by_user_id` (int)
  - `reactivate` (varchar) length=128
  - `display_name` (varchar) length=255
  - `display_name_changed` (date)
  - `first_name` (varchar) length=256
  - `middle_name` (varchar) length=32
  - `last_name` (varchar) length=256
  - `name_suffix` (varchar) length=32
  - `dob` (varchar) length=45
  - `ssn` (varchar) length=32
  - `address` (varchar) length=512
  - `city` (varchar) length=512
  - `state` (varchar) length=128
  - `country` (varchar) length=256
  - `zipcode` (varchar) length=15
  - `mailing_address` (varchar) length=512
  - `employment` (varchar) length=128
  - `occupation` (varchar) length=256
  - `salary` (varchar) length=45
  - `proof_identity` (text)
  - `proof_address` (text)
  - `timezone` (varchar) length=40
  - `language` (varchar) length=20
  - `type` (varchar) length=128
  - `admin` (varchar) length=32
  - `partner` (int)
  - `investor` (varchar) length=32
  - `beta_wallet` (varchar) length=32
  - `private_key` (varchar) length=128
  - `wallet_id` (varchar) length=64
  - `default_wallet` (varchar) length=45
  - `tt_columns` (varchar) length=32
  - `organization` (varchar) length=256
  - `picture` (varchar) length=256
  - `link` (varchar) length=256
  - `ref_signup_date` (varchar) length=128
  - `referral` (varchar) length=255
  - `referrer` (varchar) length=128
  - `referral_link` (text)
  - `referrer_code` (varchar) length=128
  - `promo_code` (varchar) length=128
  - `last_login` (datetime)
  - `last_ip` (varchar) length=45
  - `created_on` (datetime)
  - `deleted` (tinyint) length=1
  - `banned` (tinyint) length=1
  - `ban_message` (varchar) length=255
  - `account_information` (varchar) length=45
  - `kyc` (varchar) length=32
  - `kyc_verified` (varchar) length=45
  - `features_activated` (varchar) length=45
  - `financial_assessment` (varchar) length=32
  - `investment_assessment` (varchar) length=32
  - `banking_accounts` (varchar) length=45
  - `banking_wallets` (varchar) length=45
  - `last_banking_update` (varchar) length=45
  - `banking_integration` (varchar) length=45
  - `credit_summary` (varchar) length=45
  - `credit_wallets` (varchar) length=45
  - `last_credit_update` (varchar) length=45
  - `credit_integration` (varchar) length=45
  - `debt_summary` (varchar) length=45
  - `debt_wallets` (varchar) length=45
  - `last_debt_update` (varchar) length=45
  - `debt_integration` (varchar) length=45
  - `budgeting_complete` (varchar) length=32
  - `investment_wallets` (varchar) length=45
  - `last_investment_update` (varchar) length=45
  - `brokerage_integration` (varchar) length=45
  - `risk_assessment` (varchar) length=32
  - `financial_goals` (varchar) length=45
  - `time_horizon` (varchar) length=45
  - `financial_rating` (varchar) length=45
  - `investment_experience` (varchar) length=45
  - `investment_knowledge` (varchar) length=45
  - `market_sentiment` (varchar) length=45
  - `investment_availability` (varchar) length=45
  - `personal_budgeting` (varchar) length=32
  - `portfolio_manager` (varchar) length=32
  - `automated_integration` (varchar) length=32
  - `asset_creator` (varchar) length=32
  - `notification_preference` (varchar) length=255
  - `trade_alerts` (varchar) length=255
  - `account_review` (int)
  - `marketing_review` (int)
  - `request_ban` (int)
  - `force_pass_reset` (tinyint) length=1
  - `kyc_verification` (tinyint) length=1
  - `kyc_status` (varchar) length=50
  - `kyc_date` (date)
  - `kyc_time` (time)
  - `kyc_documentation` (text)
  - `kyc_rejection_date` (date)
  - `kyc_rejection_details` (text)
  - `drip_campaign_type` (enum)
  - `drip_step_number` (int)
  - `drip_last_sent_at` (datetime)
  - `drip_completed` (tinyint) length=1
  - `activate_email_resend` (datetime)
  - `facebook` (varchar) length=100
  - `linkedin` (varchar) length=100
  - `discord_username` (varchar) length=100
  - `discord_id` (bigint)
  - `discord_verified` (tinyint) length=1
  - `twitter` (varchar) length=100
  - `email_verified_at` (datetime)
  - `email_bounced_at` (datetime)
  - `email_verification_token_hash` (varchar) length=255
  - `source_channel` (varchar) length=64
  - `source_slug` (varchar) length=80
  - `campaign_code` (varchar) length=128
  - `utm_source` (varchar) length=120
  - `utm_medium` (varchar) length=120
  - `utm_campaign` (varchar) length=120
  - `landing_path` (varchar) length=255

### vw_project_tasks_next
- Field count: 11
  - `id` (bigint)
  - `project_name` (varchar) length=120
  - `category` (varchar) length=64
  - `subcategory` (varchar) length=64
  - `component` (varchar) length=128
  - `status` (enum)
  - `priority` (tinyint)
  - `blast_radius` (enum)
  - `environment` (enum)
  - `external_ref` (varchar) length=191
  - `updated_at` (datetime)

## Command Health
### Command Files
- app/Commands/AIOps/API/SchemaValidate.php
- app/Commands/AIOps/AiopsRepairs.php
- app/Commands/AIOps/Alerts/Check.php
- app/Commands/AIOps/Alerts/Clean.php
- app/Commands/AIOps/Alerts/Health.php
- app/Commands/AIOps/Alerts/Worker.php
- app/Commands/AIOps/All.php
- app/Commands/AIOps/Audit.php
- app/Commands/AIOps/AutoFixAnalyze.php
- app/Commands/AIOps/AutoRun.php
- app/Commands/AIOps/Backlog.php
- app/Commands/AIOps/BuildCommand.php
- app/Commands/AIOps/ChatGovernanceIndex.php
- app/Commands/AIOps/CommandIndex.php
- app/Commands/AIOps/ContinueAudit.php
- app/Commands/AIOps/CopilotValidate.php
- app/Commands/AIOps/CspAudit.php
- app/Commands/AIOps/DB/SlowScan.php
- app/Commands/AIOps/DedupeReport.php
- app/Commands/AIOps/DepsAdd.php
- app/Commands/AIOps/DiffFormat.php
- app/Commands/AIOps/Docs/AutoSync.php
- app/Commands/AIOps/Doctor.php
- app/Commands/AIOps/EmailScan.php
- app/Commands/AIOps/ExecuteDocs.php
- app/Commands/AIOps/FormTestScan.php
- app/Commands/AIOps/Forms/TestScan.php
- app/Commands/AIOps/GateCost.php
- app/Commands/AIOps/GovernanceAnalyze.php
- app/Commands/AIOps/HealthFull.php
- app/Commands/AIOps/Ingest.php
- app/Commands/AIOps/Init.php
- app/Commands/AIOps/IntegrityScan.php
- app/Commands/AIOps/LogsErrors.php
- app/Commands/AIOps/ManualIndex.php
- app/Commands/AIOps/ManualRun.php
- app/Commands/AIOps/MissingViewScan.php
- app/Commands/AIOps/N8n/Logs.php
- app/Commands/AIOps/N8n/Restart.php
- app/Commands/AIOps/N8n/Start.php
- app/Commands/AIOps/N8n/Stop.php
- app/Commands/AIOps/Observe.php
- app/Commands/AIOps/Observe/Cost.php
- app/Commands/AIOps/Observe/Hash.php
- app/Commands/AIOps/Observe/Map.php
- app/Commands/AIOps/Observe/Patch.php
- app/Commands/AIOps/Observe/Regression.php
- app/Commands/AIOps/Observe/Scan.php
- app/Commands/AIOps/Observe/Snapshot.php
- app/Commands/AIOps/Observe/Suggest.php
- app/Commands/AIOps/PRAuto.php
- app/Commands/AIOps/PRCreate.php
- app/Commands/AIOps/Patch/Apply.php
- app/Commands/AIOps/Patch/DryRun.php
- app/Commands/AIOps/Patch/Hallucination.php
- app/Commands/AIOps/Patch/RiskScore.php
- app/Commands/AIOps/Patch/Validate.php
- app/Commands/AIOps/PriorityBuildCommand.php
- app/Commands/AIOps/PublicPages/Audit.php
- app/Commands/AIOps/PublicPages/Import.php
- app/Commands/AIOps/PublicPages/Report.php
- app/Commands/AIOps/PublicPages/Run.php
- app/Commands/AIOps/Redis/Stats.php
- app/Commands/AIOps/Repair.php
- app/Commands/AIOps/RepairRun.php
- app/Commands/AIOps/RepairRunSafe.php
- app/Commands/AIOps/Rollback.php
- app/Commands/AIOps/Routes/Compare.php
- app/Commands/AIOps/Routes/Gate.php
- app/Commands/AIOps/Routes/Regress.php
- app/Commands/AIOps/Routes/Scan.php
- app/Commands/AIOps/Routes/ScanAuth.php
- app/Commands/AIOps/Run.php
- app/Commands/AIOps/RunGraph.php
- app/Commands/AIOps/ScanCells.php
- app/Commands/AIOps/Seed.php
- app/Commands/AIOps/SelfHeal.php
- app/Commands/AIOps/SqlCheck.php
- app/Commands/AIOps/Status.php
- app/Commands/AIOps/SuggestRoutes.php
- app/Commands/AIOps/SyncPerfRoutes.php
- app/Commands/AIOps/Unlock.php
- app/Commands/AIOps/Watch.php
- app/Commands/AIOps/Worker.php
- app/Commands/AIOps/WorkerLogs.php
- app/Commands/API/ApiAudit.php
- app/Commands/API/ApiFiltersCheck.php
- app/Commands/API/ApiList.php
- app/Commands/API/ApiPermissions.php
- app/Commands/API/ApiRateLimitCheck.php
- app/Commands/API/ApiVersioningCheck.php
- app/Commands/Alerts/Audit.php
- app/Commands/Alerts/Forecast.php
- app/Commands/Alerts/Ingest.php
- app/Commands/Alerts/ParseTest.php
- app/Commands/App/APIAuditPro.php
- app/Commands/App/APIList.php
- app/Commands/App/ControllerAudit.php
- app/Commands/App/CoverageGate.php
- app/Commands/App/Healthcheck.php
- app/Commands/App/Test.php
- app/Commands/AppUpdate.php
- app/Commands/Audit/All.php
- app/Commands/Audit/NodeAudit.php
- app/Commands/AuditPsr4.php
- app/Commands/Auth/Audit.php
- app/Commands/Auth/FlowSmoke.php
- app/Commands/Auth/FunnelCheck.php
- app/Commands/Auth/Smoke.php
- app/Commands/Auth/SmokeTest.php
- app/Commands/CacheAudit.php
- app/Commands/Chat/Audit.php
- app/Commands/Chat/Logs.php
- app/Commands/Chat/Repair.php
- app/Commands/Chat/Restart.php
- app/Commands/Chat/Start.php
- app/Commands/Chat/Status.php
- app/Commands/Chat/Stop.php
- app/Commands/Chat/Unblock.php
- app/Commands/Codex/Audit.php
- app/Commands/Codex/ContinueAudit.php
- app/Commands/Codex/Gate.php
- app/Commands/Codex/GateSeverity.php
- app/Commands/Codex/Index.php
- app/Commands/Codex/Instructions/Audit.php
- app/Commands/Codex/Instructions/DevOpsReview.php
- app/Commands/Codex/Instructions/Summarize.php
- app/Commands/Codex/Review.php
- app/Commands/Codex/ReviewCommit.php
- app/Commands/Codex/ReviewList.php
- app/Commands/Codex/ReviewPrOutbox.php
- app/Commands/Codex/ReviewPublish.php
- app/Commands/Codex/Status.php
- app/Commands/CompatAudit.php
- app/Commands/Config/Drift.php
- app/Commands/ConfigClear.php
- app/Commands/ConfigLint.php
- app/Commands/ContentEngineSmoke.php
- app/Commands/ContentIngestSample.php
- app/Commands/Contracts/AiOpsRunnable.php
- app/Commands/Contracts/DryRunCapable.php
- app/Commands/Contracts/RequiresApproval.php
- app/Commands/ControllerProfile.php
- app/Commands/Database/ApplyDocs.php
- app/Commands/Database/Drift.php
- app/Commands/Database/Inventory.php
- app/Commands/Database/MigrateDryRun.php
- app/Commands/Discord/GetList.php
- app/Commands/Discord/ProcessQueue.php
- app/Commands/Discord/Test.php
- app/Commands/Discord/TestLiquidity.php
- app/Commands/Discord/WireCheck.php
- app/Commands/Docs/ArchitectureGraph.php
- app/Commands/Docs/ArchitectureMap.php
- app/Commands/Docs/AuditDocs.php
- app/Commands/Docs/BuildHowItWorksNavigation.php
- app/Commands/Docs/DatabaseMap.php
- app/Commands/Docs/DependenciesMap.php
- app/Commands/Docs/Exports/ExportViewTxt.php
- app/Commands/Docs/FullDocsAudit.php
- app/Commands/Docs/Generate/DocsReadmeBuilder.php
- app/Commands/Docs/GenerateArchitectureMap.php
- app/Commands/Docs/GenerateKnowledgeGraph.php
- app/Commands/Docs/GenerateMissingDocs.php
- app/Commands/Docs/InventoryDocs.php
- app/Commands/Docs/ModulesMap.php
- app/Commands/Docs/RoutesInventory.php
- app/Commands/Docs/Scan/ControllersList.php
- app/Commands/Docs/Scan/ServiceList.php
- app/Commands/Docs/Scan/ViewDirectories.php
- app/Commands/Docs/Scan/ViewFiles.php
- app/Commands/Docs/ScanOrphanRoutes.php
- app/Commands/Docs/ScanOrphanViews.php
- app/Commands/Docs/ScanRoutes.php
- app/Commands/Docs/ScanUndocumentedControllers.php
- app/Commands/Docs/SparkCommandsInventory.php
- app/Commands/Docs/SyncAllDocs.php
- app/Commands/Docs/SyncCodeFromDocs.php
- app/Commands/Docs/SyncDocsSystem.php
- app/Commands/Docs/Test.php
- app/Commands/DreamHost/DNSTest.php
- app/Commands/DreamHost/EnvDebug.php
- app/Commands/DreamHost/ImapCapabilities.php
- app/Commands/DreamHost/ImapFlagSweep.php
- app/Commands/DreamHost/ImapTest.php
- app/Commands/DreamHost/PortTest.php
- app/Commands/DreamHost/SSLTest.php
- app/Commands/DreamHost/SmtpProbe.php
- app/Commands/Env/EnvDoctor.php
- app/Commands/Errors/ConsolidateErrors.php
- app/Commands/Errors/Diagnose502.php
- app/Commands/Errors/Diagnose503.php
- app/Commands/Errors/DispatchAlerts.php
- app/Commands/Errors/LearnPatterns.php
- app/Commands/Fix503.php
- app/Commands/ForecastEvaluate.php
- app/Commands/GapTrackerSync.php
- app/Commands/GitHub/Branch.php
- app/Commands/GitHub/Commit.php
- app/Commands/GitHub/CreatePR.php
- app/Commands/GitHub/Health.php
- app/Commands/GitHub/Pull.php
- app/Commands/GitHub/PullSafe.php
- app/Commands/GitHub/Push.php
- app/Commands/GitHub/SearchRepo.php
- app/Commands/GitHub/Status.php
- app/Commands/GitHub/Sync.php
- app/Commands/GitHub/SyncSafe.php
- app/Commands/GitHub/WorkspaceGuard.php
- app/Commands/GitHub/WorkspaceRepair.php
- app/Commands/Growth/RetentionWatch.php
- app/Commands/GtmCronRouteSecurityValidation.php
- app/Commands/GtmHealthSnapshot.php
- app/Commands/GtmLaunchAudit.php
- app/Commands/GtmLaunchSmoke.php
- app/Commands/Health/Cache.php
- app/Commands/Health/Disk.php
- app/Commands/Health/GitSafety.php
- app/Commands/Health/Services.php
- app/Commands/Investments/EconomyUpdateAll.php
- app/Commands/Logger/Audit.php
- app/Commands/Logs/CheckServerLogs.php
- app/Commands/Logs/Doctor.php
- app/Commands/Logs/EnableFullLogging.php
- app/Commands/Logs/Errors.php
- app/Commands/Logs/Healthcheck.php
- app/Commands/Logs/Summarize.php
- app/Commands/Logs/SummarizeAll.php
- app/Commands/LogsFullReport.php
- app/Commands/LogsTest.php
- app/Commands/Mail/Send.php
- app/Commands/Mail/SendTest.php
- app/Commands/Mail/Test.php
- app/Commands/Mail/Verify.php
- app/Commands/Marketing/AutomationAudit.php
- app/Commands/Master/Health/Commands.php
- app/Commands/Master/Health/Controllers.php
- app/Commands/Master/Health/Dependencies.php
- app/Commands/Master/Health/Docs.php
- app/Commands/Master/Health/Logs.php
- app/Commands/Master/Health/Models.php
- app/Commands/Master/Health/Routes.php
- app/Commands/Master/Health/Services.php
- app/Commands/Master/Health/Views.php
- app/Commands/Master/KnowledgeGraphBuild.php
- app/Commands/Master/RunAll.php
- app/Commands/MditNavComputeDaily.php
- app/Commands/NewsAudit.php
- app/Commands/Ollama/BaseOllamaCommand.php
- app/Commands/Ollama/Bench.php
- app/Commands/Ollama/Chat.php
- app/Commands/Ollama/Circuit/Reset.php
- app/Commands/Ollama/Circuit/Status.php
- app/Commands/Ollama/CircuitReset.php
- app/Commands/Ollama/CircuitStatus.php
- app/Commands/Ollama/Diagnose.php
- app/Commands/Ollama/Docs/Inventory.php
- app/Commands/Ollama/Docs/Sync.php
- app/Commands/Ollama/Doctor.php
- app/Commands/Ollama/Embed.php
- app/Commands/Ollama/EmbedFile.php
- app/Commands/Ollama/Generate.php
- app/Commands/Ollama/Health.php
- app/Commands/Ollama/Logs.php
- app/Commands/Ollama/Logs/Export.php
- app/Commands/Ollama/Logs/Tail.php
- app/Commands/Ollama/Modelfile/Validate.php
- app/Commands/Ollama/Models/CreateModel.php
- app/Commands/Ollama/Models/DiffModels.php
- app/Commands/Ollama/Models/EnsureModels.php
- app/Commands/Ollama/Models/ExportModels.php
- app/Commands/Ollama/Models/ListModels.php
- app/Commands/Ollama/Models/PruneModels.php
- app/Commands/Ollama/Models/PullModel.php
- app/Commands/Ollama/Models/PushModel.php
- app/Commands/Ollama/Models/RmModel.php
- app/Commands/Ollama/Models/ShowModel.php
- app/Commands/Ollama/Ping.php
- app/Commands/Ollama/Policy/Check.php
- app/Commands/Ollama/Policy/Export.php
- app/Commands/Ollama/Queue/Push.php
- app/Commands/Ollama/Queue/Retry.php
- app/Commands/Ollama/Queue/Stats.php
- app/Commands/Ollama/Queue/Work.php
- app/Commands/Ollama/RagQuery.php
- app/Commands/Ollama/Sessions/ListSessions.php
- app/Commands/Ollama/Sessions/RmSession.php
- app/Commands/Ollama/Sessions/ShowSession.php
- app/Commands/Ollama/Stream.php
- app/Commands/Ollama/Version.php
- app/Commands/Ops/AnalyzeCommands.php
- app/Commands/Ops/AppUpdate.php
- app/Commands/Ops/BaseOpsCommand.php
- app/Commands/Ops/BuildConsoleRegistry.php
- app/Commands/Ops/CiPrepare.php
- app/Commands/Ops/Commands/Audit.php
- app/Commands/Ops/Commands/Autofix.php
- app/Commands/Ops/Commands/ConstructorScanner.php
- app/Commands/Ops/Commands/Inventory.php
- app/Commands/Ops/Commands/Lint.php
- app/Commands/Ops/Commands/MissingFromConsole.php
- app/Commands/Ops/ConfigLint.php
- app/Commands/Ops/Diagnostics/FilesystemScan.php
- app/Commands/Ops/Diff.php
- app/Commands/Ops/DiffWallet.php
- app/Commands/Ops/DoctorFull.php
- app/Commands/Ops/DreamHost/DnsVerify.php
- app/Commands/Ops/DreamHost/EmailAudit.php
- app/Commands/Ops/DreamHost/EmailList.php
- app/Commands/Ops/DreamHost/Limits.php
- app/Commands/Ops/DriftScan.php
- app/Commands/Ops/Email/Healthcheck.php
- app/Commands/Ops/Email/QueueScan.php
- app/Commands/Ops/Email/Test.php
- app/Commands/Ops/EnvSnapshot.php
- app/Commands/Ops/FetchCommands.php
- app/Commands/Ops/FilesystemFix.php
- app/Commands/Ops/FilesystemLint.php
- app/Commands/Ops/Grep.php
- app/Commands/Ops/GrepSearch.php
- app/Commands/Ops/Health/Healthcheck.php
- app/Commands/Ops/LoggerTest.php
- app/Commands/Ops/Logs/Scan.php
- app/Commands/Ops/Logs/Watch.php
- app/Commands/Ops/ModelLimitAudit.php
- app/Commands/Ops/NetworkMatrix.php
- app/Commands/Ops/NextSteps.php
- app/Commands/Ops/NextStepsSync.php
- app/Commands/Ops/NextStepsSyncManual.php
- app/Commands/Ops/PHP/FpmHealth.php
- app/Commands/Ops/PHPExtensionsAudit.php
- app/Commands/Ops/ProposePr.php
- app/Commands/Ops/Report.php
- app/Commands/Ops/SelfHeal.php
- app/Commands/Ops/Server/NginxStatus.php
- app/Commands/Ops/Subs/Audit.php
- app/Commands/Ops/Subs/Doctor.php
- app/Commands/Ops/Subs/Repair.php
- app/Commands/Ops/Subs/Status.php
- app/Commands/Ops/Support/CommandRulesScanner.php
- app/Commands/Ops/Sync.php
- app/Commands/Ops/TailLogs.php
- app/Commands/Ops/VPSSnapshot.php
- app/Commands/Ops/WalletIntegrity.php
- app/Commands/Ops/Work.php
- app/Commands/Performance/K6Run.php
- app/Commands/Platform/ControlAnalyze.php
- app/Commands/Platform/ControlCollect.php
- app/Commands/Platform/ControlDispatch.php
- app/Commands/Platform/ControlRun.php
- app/Commands/Platform/CronDispatch.php
- app/Commands/Platform/EdgeSnapshot.php
- app/Commands/Platform/RunPlatform.php
- app/Commands/Platform/RunReport.php
- app/Commands/Platform/RunSubsystem.php
- app/Commands/PurgeFastCGI.php
- app/Commands/Repo/ClassScan.php
- app/Commands/Repo/ClassTrace.php
- app/Commands/Repo/DiffSplit.php
- app/Commands/Repo/Health.php
- app/Commands/Research/BaseResearchTaskCommand.php
- app/Commands/Research/DailyMarketReport.php
- app/Commands/Research/EarningsCalendar.php
- app/Commands/Research/FinancialIntelligenceSignals.php
- app/Commands/Research/FinancialKnowledge.php
- app/Commands/Research/FinancialNewsCollect.php
- app/Commands/Research/GoogleFinancialScan.php
- app/Commands/Research/GoogleScan.php
- app/Commands/Research/MarketDataCompile.php
- app/Commands/Research/ResearchPipeline.php
- app/Commands/Research/ShortInterestScan.php
- app/Commands/Research/ThinkOrSwimImport.php
- app/Commands/Research/WatchlistCleanup.php
- app/Commands/Research/WeeklyMarketReport.php
- app/Commands/RestartSafe.php
- app/Commands/Revenue/CostForecast.php
- app/Commands/RevenueStreamsScan.php
- app/Commands/Routes/Benchmark.php
- app/Commands/Routes/Debug.php
- app/Commands/Routes/Docs.php
- app/Commands/Routes/Reconcile.php
- app/Commands/Routes/Repair.php
- app/Commands/RoutesAuthAudit.php
- app/Commands/Runtime/CacheBoot.php
- app/Commands/Runtime/Diagnose502.php
- app/Commands/Runtime/SparkDoctor.php
- app/Commands/Runtime/SparkDoctorRuntime.php
- app/Commands/Runtime/SparkFix.php
- app/Commands/Runtime/SparkOptimize.php
- app/Commands/Runtime/Triage.php
- app/Commands/RuntimeCheck.php
- app/Commands/SafeBaseCommand.php
- app/Commands/Scanning/RunScanner.php
- app/Commands/Scrapers/EmailScraperAudit.php
- app/Commands/Security/GenerateCI4Key.php
- app/Commands/Security/GenerateKey.php
- app/Commands/Security/SecretsAudit.php
- app/Commands/SecurityCspAudit.php
- app/Commands/Spark/CommandGraph.php
- app/Commands/Spark/Doctor.php
- app/Commands/Spark/Fix.php
- app/Commands/Spark/InfraServerAudit.php
- app/Commands/Spark/RegistryAudit.php
- app/Commands/Spark/Reset.php
- app/Commands/Support/ArtifactHelper.php
- app/Commands/Support/GitHubIssueHelper.php
- app/Commands/Support/SubsCommandTrait.php
- app/Commands/Test/RedisPing.php
- app/Commands/TestEmail.php
- app/Commands/TrafficSpikeGuard.php
- app/Commands/Traits/CiRuntimeCheck.php
- app/Commands/Traits/NextStepTrait.php
- app/Commands/Traits/ParamOptions.php
- app/Commands/Traits/SparkRunnerTrait.php
- app/Commands/Ux/JourneyAudit.php
- app/Commands/WalletsWarmSummaryCache.php

### Command Issues
- **app/Commands/AIOps/API/SchemaValidate.php**: Check for typed/invalid BaseCommand property overrides
- **app/Commands/AIOps/AiopsRepairs.php**: Check for typed/invalid BaseCommand property overrides
- **app/Commands/AIOps/Alerts/Check.php**: Check for typed/invalid BaseCommand property overrides
- **app/Commands/AIOps/Alerts/Clean.php**: Check for typed/invalid BaseCommand property overrides
- **app/Commands/AIOps/Alerts/Health.php**: Check for typed/invalid BaseCommand property overrides
- **app/Commands/AIOps/Alerts/Worker.php**: Check for typed/invalid BaseCommand property overrides
- **app/Commands/AIOps/All.php**: Check for typed/invalid BaseCommand property overrides
- **app/Commands/AIOps/Audit.php**: Check for typed/invalid BaseCommand property overrides
- **app/Commands/AIOps/AutoFixAnalyze.php**: Check for typed/invalid BaseCommand property overrides
- **app/Commands/AIOps/AutoRun.php**: Check for typed/invalid BaseCommand property overrides
- **app/Commands/AIOps/Backlog.php**: Check for typed/invalid BaseCommand property overrides
- **app/Commands/AIOps/BuildCommand.php**: Check for typed/invalid BaseCommand property overrides
- **app/Commands/AIOps/ChatGovernanceIndex.php**: Check for typed/invalid BaseCommand property overrides
- **app/Commands/AIOps/CommandIndex.php**: Check for typed/invalid BaseCommand property overrides
- **app/Commands/AIOps/ContinueAudit.php**: Check for typed/invalid BaseCommand property overrides
- **app/Commands/AIOps/CopilotValidate.php**: Check for typed/invalid BaseCommand property overrides
- **app/Commands/AIOps/CspAudit.php**: Check for typed/invalid BaseCommand property overrides
- **app/Commands/AIOps/DB/SlowScan.php**: Check for typed/invalid BaseCommand property overrides
- **app/Commands/AIOps/DedupeReport.php**: Check for typed/invalid BaseCommand property overrides
- **app/Commands/AIOps/DepsAdd.php**: Check for typed/invalid BaseCommand property overrides
- **app/Commands/AIOps/DiffFormat.php**: Check for typed/invalid BaseCommand property overrides
- **app/Commands/AIOps/Docs/AutoSync.php**: Check for typed/invalid BaseCommand property overrides
- **app/Commands/AIOps/Doctor.php**: Check for typed/invalid BaseCommand property overrides
- **app/Commands/AIOps/EmailScan.php**: Check for typed/invalid BaseCommand property overrides
- **app/Commands/AIOps/ExecuteDocs.php**: Check for typed/invalid BaseCommand property overrides
- **app/Commands/AIOps/FormTestScan.php**: Check for typed/invalid BaseCommand property overrides
- **app/Commands/AIOps/GateCost.php**: Check for typed/invalid BaseCommand property overrides
- **app/Commands/AIOps/GovernanceAnalyze.php**: Check for typed/invalid BaseCommand property overrides
- **app/Commands/AIOps/HealthFull.php**: Check for typed/invalid BaseCommand property overrides
- **app/Commands/AIOps/Ingest.php**: Check for typed/invalid BaseCommand property overrides
- **app/Commands/AIOps/Init.php**: Check for typed/invalid BaseCommand property overrides
- **app/Commands/AIOps/IntegrityScan.php**: Check for typed/invalid BaseCommand property overrides
- **app/Commands/AIOps/LogsErrors.php**: Check for typed/invalid BaseCommand property overrides
- **app/Commands/AIOps/ManualIndex.php**: Check for typed/invalid BaseCommand property overrides
- **app/Commands/AIOps/ManualRun.php**: Check for typed/invalid BaseCommand property overrides
- **app/Commands/AIOps/MissingViewScan.php**: Check for typed/invalid BaseCommand property overrides
- **app/Commands/AIOps/N8n/Logs.php**: Check for typed/invalid BaseCommand property overrides
- **app/Commands/AIOps/N8n/Restart.php**: Check for typed/invalid BaseCommand property overrides
- **app/Commands/AIOps/N8n/Start.php**: Check for typed/invalid BaseCommand property overrides
- **app/Commands/AIOps/N8n/Stop.php**: Check for typed/invalid BaseCommand property overrides
- **app/Commands/AIOps/Observe.php**: Check for typed/invalid BaseCommand property overrides
- **app/Commands/AIOps/Observe/Cost.php**: Check for typed/invalid BaseCommand property overrides
- **app/Commands/AIOps/Observe/Hash.php**: Check for typed/invalid BaseCommand property overrides
- **app/Commands/AIOps/Observe/Map.php**: Check for typed/invalid BaseCommand property overrides
- **app/Commands/AIOps/Observe/Patch.php**: Check for typed/invalid BaseCommand property overrides
- **app/Commands/AIOps/Observe/Regression.php**: Check for typed/invalid BaseCommand property overrides
- **app/Commands/AIOps/Observe/Scan.php**: Check for typed/invalid BaseCommand property overrides
- **app/Commands/AIOps/Observe/Snapshot.php**: Check for typed/invalid BaseCommand property overrides
- **app/Commands/AIOps/Observe/Suggest.php**: Check for typed/invalid BaseCommand property overrides
- **app/Commands/AIOps/PRAuto.php**: Check for typed/invalid BaseCommand property overrides
- **app/Commands/AIOps/PRCreate.php**: Check for typed/invalid BaseCommand property overrides
- **app/Commands/AIOps/Patch/Apply.php**: Check for typed/invalid BaseCommand property overrides
- **app/Commands/AIOps/Patch/DryRun.php**: Check for typed/invalid BaseCommand property overrides
- **app/Commands/AIOps/Patch/Hallucination.php**: Check for typed/invalid BaseCommand property overrides
- **app/Commands/AIOps/Patch/RiskScore.php**: Check for typed/invalid BaseCommand property overrides
- **app/Commands/AIOps/Patch/Validate.php**: Check for typed/invalid BaseCommand property overrides
- **app/Commands/AIOps/PriorityBuildCommand.php**: Check for typed/invalid BaseCommand property overrides
- **app/Commands/AIOps/PublicPages/Audit.php**: Check for typed/invalid BaseCommand property overrides
- **app/Commands/AIOps/PublicPages/Import.php**: Check for typed/invalid BaseCommand property overrides
- **app/Commands/AIOps/PublicPages/Report.php**: Check for typed/invalid BaseCommand property overrides
- **app/Commands/AIOps/PublicPages/Run.php**: Check for typed/invalid BaseCommand property overrides
- **app/Commands/AIOps/Redis/Stats.php**: Check for typed/invalid BaseCommand property overrides
- **app/Commands/AIOps/Repair.php**: Check for typed/invalid BaseCommand property overrides
- **app/Commands/AIOps/RepairRun.php**: Check for typed/invalid BaseCommand property overrides
- **app/Commands/AIOps/RepairRunSafe.php**: Check for typed/invalid BaseCommand property overrides
- **app/Commands/AIOps/Rollback.php**: Check for typed/invalid BaseCommand property overrides
- **app/Commands/AIOps/Routes/Compare.php**: Check for typed/invalid BaseCommand property overrides
- **app/Commands/AIOps/Routes/Gate.php**: Check for typed/invalid BaseCommand property overrides
- **app/Commands/AIOps/Routes/Regress.php**: Check for typed/invalid BaseCommand property overrides
- **app/Commands/AIOps/Routes/Scan.php**: Check for typed/invalid BaseCommand property overrides
- **app/Commands/AIOps/Routes/ScanAuth.php**: Check for typed/invalid BaseCommand property overrides
- **app/Commands/AIOps/Run.php**: Check for typed/invalid BaseCommand property overrides
- **app/Commands/AIOps/RunGraph.php**: Check for typed/invalid BaseCommand property overrides
- **app/Commands/AIOps/ScanCells.php**: Check for typed/invalid BaseCommand property overrides
- **app/Commands/AIOps/Seed.php**: Check for typed/invalid BaseCommand property overrides
- **app/Commands/AIOps/SelfHeal.php**: Check for typed/invalid BaseCommand property overrides
- **app/Commands/AIOps/SqlCheck.php**: Check for typed/invalid BaseCommand property overrides
- **app/Commands/AIOps/Status.php**: Check for typed/invalid BaseCommand property overrides
- **app/Commands/AIOps/SuggestRoutes.php**: Check for typed/invalid BaseCommand property overrides
- **app/Commands/AIOps/SyncPerfRoutes.php**: Check for typed/invalid BaseCommand property overrides
- **app/Commands/AIOps/Unlock.php**: Check for typed/invalid BaseCommand property overrides
- **app/Commands/AIOps/Watch.php**: Check for typed/invalid BaseCommand property overrides
- **app/Commands/AIOps/Worker.php**: Check for typed/invalid BaseCommand property overrides
- **app/Commands/AIOps/WorkerLogs.php**: Check for typed/invalid BaseCommand property overrides
- **app/Commands/API/ApiAudit.php**: Check for typed/invalid BaseCommand property overrides
- **app/Commands/API/ApiFiltersCheck.php**: Check for typed/invalid BaseCommand property overrides
- **app/Commands/API/ApiList.php**: Check for typed/invalid BaseCommand property overrides
- **app/Commands/API/ApiPermissions.php**: Check for typed/invalid BaseCommand property overrides
- **app/Commands/API/ApiRateLimitCheck.php**: Check for typed/invalid BaseCommand property overrides
- **app/Commands/API/ApiVersioningCheck.php**: Check for typed/invalid BaseCommand property overrides
- **app/Commands/Alerts/Audit.php**: Check for typed/invalid BaseCommand property overrides
- **app/Commands/Alerts/Forecast.php**: Check for typed/invalid BaseCommand property overrides
- **app/Commands/Alerts/Ingest.php**: Check for typed/invalid BaseCommand property overrides
- **app/Commands/Alerts/ParseTest.php**: Check for typed/invalid BaseCommand property overrides
- **app/Commands/App/APIAuditPro.php**: Check for typed/invalid BaseCommand property overrides
- **app/Commands/App/APIList.php**: Check for typed/invalid BaseCommand property overrides
- **app/Commands/App/ControllerAudit.php**: Check for typed/invalid BaseCommand property overrides
- **app/Commands/App/CoverageGate.php**: Check for typed/invalid BaseCommand property overrides
- **app/Commands/App/Healthcheck.php**: Check for typed/invalid BaseCommand property overrides
- **app/Commands/App/Test.php**: Check for typed/invalid BaseCommand property overrides
- **app/Commands/AppUpdate.php**: Check for typed/invalid BaseCommand property overrides
- **app/Commands/Audit/All.php**: Check for typed/invalid BaseCommand property overrides
- **app/Commands/Audit/NodeAudit.php**: Check for typed/invalid BaseCommand property overrides
- **app/Commands/AuditPsr4.php**: Check for typed/invalid BaseCommand property overrides
- **app/Commands/Auth/Audit.php**: Check for typed/invalid BaseCommand property overrides
- **app/Commands/Auth/FlowSmoke.php**: Check for typed/invalid BaseCommand property overrides
- **app/Commands/Auth/FunnelCheck.php**: Check for typed/invalid BaseCommand property overrides
- **app/Commands/Auth/Smoke.php**: Check for typed/invalid BaseCommand property overrides
- **app/Commands/Auth/SmokeTest.php**: Check for typed/invalid BaseCommand property overrides
- **app/Commands/CacheAudit.php**: Check for typed/invalid BaseCommand property overrides
- **app/Commands/Chat/Audit.php**: Check for typed/invalid BaseCommand property overrides
- **app/Commands/Chat/Logs.php**: Check for typed/invalid BaseCommand property overrides
- **app/Commands/Chat/Repair.php**: Check for typed/invalid BaseCommand property overrides
- **app/Commands/Chat/Restart.php**: Check for typed/invalid BaseCommand property overrides
- **app/Commands/Chat/Start.php**: Check for typed/invalid BaseCommand property overrides
- **app/Commands/Chat/Status.php**: Check for typed/invalid BaseCommand property overrides
- **app/Commands/Chat/Stop.php**: Check for typed/invalid BaseCommand property overrides
- **app/Commands/Chat/Unblock.php**: Check for typed/invalid BaseCommand property overrides
- **app/Commands/Codex/Audit.php**: Check for typed/invalid BaseCommand property overrides
- **app/Commands/Codex/ContinueAudit.php**: Check for typed/invalid BaseCommand property overrides
- **app/Commands/Codex/Gate.php**: Check for typed/invalid BaseCommand property overrides
- **app/Commands/Codex/GateSeverity.php**: Check for typed/invalid BaseCommand property overrides
- **app/Commands/Codex/Index.php**: Check for typed/invalid BaseCommand property overrides
- **app/Commands/Codex/Instructions/Audit.php**: Check for typed/invalid BaseCommand property overrides
- **app/Commands/Codex/Instructions/DevOpsReview.php**: Check for typed/invalid BaseCommand property overrides
- **app/Commands/Codex/Instructions/Summarize.php**: Check for typed/invalid BaseCommand property overrides
- **app/Commands/Codex/Review.php**: Check for typed/invalid BaseCommand property overrides
- **app/Commands/Codex/ReviewCommit.php**: Check for typed/invalid BaseCommand property overrides
- **app/Commands/Codex/ReviewList.php**: Check for typed/invalid BaseCommand property overrides
- **app/Commands/Codex/ReviewPrOutbox.php**: Check for typed/invalid BaseCommand property overrides
- **app/Commands/Codex/ReviewPublish.php**: Check for typed/invalid BaseCommand property overrides
- **app/Commands/Codex/Status.php**: Check for typed/invalid BaseCommand property overrides
- **app/Commands/CompatAudit.php**: Check for typed/invalid BaseCommand property overrides
- **app/Commands/Config/Drift.php**: Check for typed/invalid BaseCommand property overrides
- **app/Commands/ConfigClear.php**: Check for typed/invalid BaseCommand property overrides
- **app/Commands/ConfigLint.php**: Check for typed/invalid BaseCommand property overrides
- **app/Commands/ContentEngineSmoke.php**: Check for typed/invalid BaseCommand property overrides
- **app/Commands/ContentIngestSample.php**: Check for typed/invalid BaseCommand property overrides
- **app/Commands/ControllerProfile.php**: Check for typed/invalid BaseCommand property overrides
- **app/Commands/Database/ApplyDocs.php**: Check for typed/invalid BaseCommand property overrides
- **app/Commands/Database/Drift.php**: Check for typed/invalid BaseCommand property overrides
- **app/Commands/Database/Inventory.php**: Check for typed/invalid BaseCommand property overrides
- **app/Commands/Database/MigrateDryRun.php**: Check for typed/invalid BaseCommand property overrides
- **app/Commands/Discord/GetList.php**: Check for typed/invalid BaseCommand property overrides
- **app/Commands/Discord/ProcessQueue.php**: Check for typed/invalid BaseCommand property overrides
- **app/Commands/Discord/Test.php**: Check for typed/invalid BaseCommand property overrides
- **app/Commands/Discord/TestLiquidity.php**: Check for typed/invalid BaseCommand property overrides
- **app/Commands/Discord/WireCheck.php**: Check for typed/invalid BaseCommand property overrides
- **app/Commands/Docs/ArchitectureGraph.php**: Check for typed/invalid BaseCommand property overrides
- **app/Commands/Docs/ArchitectureMap.php**: Check for typed/invalid BaseCommand property overrides
- **app/Commands/Docs/AuditDocs.php**: Check for typed/invalid BaseCommand property overrides
- **app/Commands/Docs/BuildHowItWorksNavigation.php**: Check for typed/invalid BaseCommand property overrides
- **app/Commands/Docs/GenerateArchitectureMap.php**: Check for typed/invalid BaseCommand property overrides
- **app/Commands/Docs/GenerateKnowledgeGraph.php**: Check for typed/invalid BaseCommand property overrides
- **app/Commands/Docs/GenerateMissingDocs.php**: Check for typed/invalid BaseCommand property overrides
- **app/Commands/Docs/InventoryDocs.php**: Check for typed/invalid BaseCommand property overrides
- **app/Commands/Docs/Scan/ControllersList.php**: Check for typed/invalid BaseCommand property overrides
- **app/Commands/Docs/Scan/ServiceList.php**: Check for typed/invalid BaseCommand property overrides
- **app/Commands/Docs/ScanOrphanRoutes.php**: Check for typed/invalid BaseCommand property overrides
- **app/Commands/Docs/ScanOrphanViews.php**: Check for typed/invalid BaseCommand property overrides
- **app/Commands/Docs/ScanRoutes.php**: Check for typed/invalid BaseCommand property overrides
- **app/Commands/Docs/ScanUndocumentedControllers.php**: Check for typed/invalid BaseCommand property overrides
- **app/Commands/Docs/SyncAllDocs.php**: Check for typed/invalid BaseCommand property overrides
- **app/Commands/Docs/SyncCodeFromDocs.php**: Check for typed/invalid BaseCommand property overrides
- **app/Commands/Docs/Test.php**: Check for typed/invalid BaseCommand property overrides
- **app/Commands/DreamHost/DNSTest.php**: Check for typed/invalid BaseCommand property overrides
- **app/Commands/DreamHost/EnvDebug.php**: Check for typed/invalid BaseCommand property overrides
- **app/Commands/DreamHost/ImapCapabilities.php**: Check for typed/invalid BaseCommand property overrides
- **app/Commands/DreamHost/ImapFlagSweep.php**: Check for typed/invalid BaseCommand property overrides
- **app/Commands/DreamHost/ImapTest.php**: Check for typed/invalid BaseCommand property overrides
- **app/Commands/DreamHost/PortTest.php**: Check for typed/invalid BaseCommand property overrides
- **app/Commands/DreamHost/SSLTest.php**: Check for typed/invalid BaseCommand property overrides
- **app/Commands/DreamHost/SmtpProbe.php**: Check for typed/invalid BaseCommand property overrides
- **app/Commands/Env/EnvDoctor.php**: Check for typed/invalid BaseCommand property overrides
- **app/Commands/Errors/ConsolidateErrors.php**: Check for typed/invalid BaseCommand property overrides
- **app/Commands/Errors/Diagnose502.php**: Check for typed/invalid BaseCommand property overrides
- **app/Commands/Errors/Diagnose503.php**: Check for typed/invalid BaseCommand property overrides
- **app/Commands/Errors/DispatchAlerts.php**: Check for typed/invalid BaseCommand property overrides
- **app/Commands/Errors/LearnPatterns.php**: Check for typed/invalid BaseCommand property overrides
- **app/Commands/Fix503.php**: Check for typed/invalid BaseCommand property overrides
- **app/Commands/ForecastEvaluate.php**: Check for typed/invalid BaseCommand property overrides
- **app/Commands/GapTrackerSync.php**: Check for typed/invalid BaseCommand property overrides
- **app/Commands/GitHub/Branch.php**: Check for typed/invalid BaseCommand property overrides
- **app/Commands/GitHub/Commit.php**: Check for typed/invalid BaseCommand property overrides
- **app/Commands/GitHub/CreatePR.php**: Check for typed/invalid BaseCommand property overrides
- **app/Commands/GitHub/Health.php**: Check for typed/invalid BaseCommand property overrides
- **app/Commands/GitHub/Pull.php**: Check for typed/invalid BaseCommand property overrides
- **app/Commands/GitHub/PullSafe.php**: Check for typed/invalid BaseCommand property overrides
- **app/Commands/GitHub/Push.php**: Check for typed/invalid BaseCommand property overrides
- **app/Commands/GitHub/SearchRepo.php**: Check for typed/invalid BaseCommand property overrides
- **app/Commands/GitHub/Status.php**: Check for typed/invalid BaseCommand property overrides
- **app/Commands/GitHub/Sync.php**: Check for typed/invalid BaseCommand property overrides
- **app/Commands/GitHub/SyncSafe.php**: Check for typed/invalid BaseCommand property overrides
- **app/Commands/GitHub/WorkspaceGuard.php**: Check for typed/invalid BaseCommand property overrides
- **app/Commands/GitHub/WorkspaceRepair.php**: Check for typed/invalid BaseCommand property overrides
- **app/Commands/Growth/RetentionWatch.php**: Check for typed/invalid BaseCommand property overrides
- **app/Commands/GtmCronRouteSecurityValidation.php**: Check for typed/invalid BaseCommand property overrides
- **app/Commands/GtmHealthSnapshot.php**: Check for typed/invalid BaseCommand property overrides
- **app/Commands/GtmLaunchAudit.php**: Check for typed/invalid BaseCommand property overrides
- **app/Commands/GtmLaunchSmoke.php**: Check for typed/invalid BaseCommand property overrides
- **app/Commands/Health/Cache.php**: Check for typed/invalid BaseCommand property overrides
- **app/Commands/Health/Disk.php**: Check for typed/invalid BaseCommand property overrides
- **app/Commands/Health/GitSafety.php**: Check for typed/invalid BaseCommand property overrides
- **app/Commands/Health/Services.php**: Check for typed/invalid BaseCommand property overrides
- **app/Commands/Investments/EconomyUpdateAll.php**: Check for typed/invalid BaseCommand property overrides
- **app/Commands/Logger/Audit.php**: Check for typed/invalid BaseCommand property overrides
- **app/Commands/Logs/CheckServerLogs.php**: Check for typed/invalid BaseCommand property overrides
- **app/Commands/Logs/Doctor.php**: Check for typed/invalid BaseCommand property overrides
- **app/Commands/Logs/EnableFullLogging.php**: Check for typed/invalid BaseCommand property overrides
- **app/Commands/Logs/Healthcheck.php**: Check for typed/invalid BaseCommand property overrides
- **app/Commands/Logs/Summarize.php**: Check for typed/invalid BaseCommand property overrides
- **app/Commands/Logs/SummarizeAll.php**: Check for typed/invalid BaseCommand property overrides
- **app/Commands/LogsFullReport.php**: Check for typed/invalid BaseCommand property overrides
- **app/Commands/LogsTest.php**: Check for typed/invalid BaseCommand property overrides
- **app/Commands/Mail/Send.php**: Check for typed/invalid BaseCommand property overrides
- **app/Commands/Mail/SendTest.php**: Check for typed/invalid BaseCommand property overrides
- **app/Commands/Mail/Test.php**: Check for typed/invalid BaseCommand property overrides
- **app/Commands/Mail/Verify.php**: Check for typed/invalid BaseCommand property overrides
- **app/Commands/Marketing/AutomationAudit.php**: Check for typed/invalid BaseCommand property overrides
- **app/Commands/Master/Health/Commands.php**: Check for typed/invalid BaseCommand property overrides
- **app/Commands/Master/Health/Controllers.php**: Check for typed/invalid BaseCommand property overrides
- **app/Commands/Master/Health/Dependencies.php**: Check for typed/invalid BaseCommand property overrides
- **app/Commands/Master/Health/Docs.php**: Check for typed/invalid BaseCommand property overrides
- **app/Commands/Master/Health/Logs.php**: Check for typed/invalid BaseCommand property overrides
- **app/Commands/Master/Health/Models.php**: Check for typed/invalid BaseCommand property overrides
- **app/Commands/Master/Health/Routes.php**: Check for typed/invalid BaseCommand property overrides
- **app/Commands/Master/Health/Services.php**: Check for typed/invalid BaseCommand property overrides
- **app/Commands/Master/Health/Views.php**: Check for typed/invalid BaseCommand property overrides
- **app/Commands/Master/KnowledgeGraphBuild.php**: Check for typed/invalid BaseCommand property overrides
- **app/Commands/Master/RunAll.php**: Check for typed/invalid BaseCommand property overrides
- **app/Commands/MditNavComputeDaily.php**: Check for typed/invalid BaseCommand property overrides
- **app/Commands/NewsAudit.php**: Check for typed/invalid BaseCommand property overrides
- **app/Commands/Ollama/Bench.php**: Check for typed/invalid BaseCommand property overrides
- **app/Commands/Ollama/Chat.php**: Check for typed/invalid BaseCommand property overrides
- **app/Commands/Ollama/Circuit/Reset.php**: Check for typed/invalid BaseCommand property overrides
- **app/Commands/Ollama/Circuit/Status.php**: Check for typed/invalid BaseCommand property overrides
- **app/Commands/Ollama/CircuitReset.php**: Check for typed/invalid BaseCommand property overrides
- **app/Commands/Ollama/CircuitStatus.php**: Check for typed/invalid BaseCommand property overrides
- **app/Commands/Ollama/Diagnose.php**: Check for typed/invalid BaseCommand property overrides
- **app/Commands/Ollama/Docs/Inventory.php**: Check for typed/invalid BaseCommand property overrides
- **app/Commands/Ollama/Docs/Sync.php**: Check for typed/invalid BaseCommand property overrides
- **app/Commands/Ollama/Doctor.php**: Check for typed/invalid BaseCommand property overrides
- **app/Commands/Ollama/Embed.php**: Check for typed/invalid BaseCommand property overrides
- **app/Commands/Ollama/EmbedFile.php**: Check for typed/invalid BaseCommand property overrides
- **app/Commands/Ollama/Generate.php**: Check for typed/invalid BaseCommand property overrides
- **app/Commands/Ollama/Health.php**: Check for typed/invalid BaseCommand property overrides
- **app/Commands/Ollama/Logs.php**: Check for typed/invalid BaseCommand property overrides
- **app/Commands/Ollama/Logs/Export.php**: Check for typed/invalid BaseCommand property overrides
- **app/Commands/Ollama/Logs/Tail.php**: Check for typed/invalid BaseCommand property overrides
- **app/Commands/Ollama/Modelfile/Validate.php**: Check for typed/invalid BaseCommand property overrides
- **app/Commands/Ollama/Models/CreateModel.php**: Check for typed/invalid BaseCommand property overrides
- **app/Commands/Ollama/Models/DiffModels.php**: Check for typed/invalid BaseCommand property overrides
- **app/Commands/Ollama/Models/EnsureModels.php**: Check for typed/invalid BaseCommand property overrides
- **app/Commands/Ollama/Models/ExportModels.php**: Check for typed/invalid BaseCommand property overrides
- **app/Commands/Ollama/Models/ListModels.php**: Check for typed/invalid BaseCommand property overrides
- **app/Commands/Ollama/Models/PruneModels.php**: Check for typed/invalid BaseCommand property overrides
- **app/Commands/Ollama/Models/PullModel.php**: Check for typed/invalid BaseCommand property overrides
- **app/Commands/Ollama/Models/PushModel.php**: Check for typed/invalid BaseCommand property overrides
- **app/Commands/Ollama/Models/RmModel.php**: Check for typed/invalid BaseCommand property overrides
- **app/Commands/Ollama/Models/ShowModel.php**: Check for typed/invalid BaseCommand property overrides
- **app/Commands/Ollama/Ping.php**: Check for typed/invalid BaseCommand property overrides
- **app/Commands/Ollama/Policy/Check.php**: Check for typed/invalid BaseCommand property overrides
- **app/Commands/Ollama/Policy/Export.php**: Check for typed/invalid BaseCommand property overrides
- **app/Commands/Ollama/Queue/Push.php**: Check for typed/invalid BaseCommand property overrides
- **app/Commands/Ollama/Queue/Retry.php**: Check for typed/invalid BaseCommand property overrides
- **app/Commands/Ollama/Queue/Stats.php**: Check for typed/invalid BaseCommand property overrides
- **app/Commands/Ollama/Queue/Work.php**: Check for typed/invalid BaseCommand property overrides
- **app/Commands/Ollama/RagQuery.php**: Check for typed/invalid BaseCommand property overrides
- **app/Commands/Ollama/Sessions/ListSessions.php**: Check for typed/invalid BaseCommand property overrides
- **app/Commands/Ollama/Sessions/RmSession.php**: Check for typed/invalid BaseCommand property overrides
- **app/Commands/Ollama/Sessions/ShowSession.php**: Check for typed/invalid BaseCommand property overrides
- **app/Commands/Ollama/Stream.php**: Check for typed/invalid BaseCommand property overrides
- **app/Commands/Ollama/Version.php**: Check for typed/invalid BaseCommand property overrides
- **app/Commands/Ops/AnalyzeCommands.php**: Check for typed/invalid BaseCommand property overrides
- **app/Commands/Ops/AppUpdate.php**: Check for typed/invalid BaseCommand property overrides
- **app/Commands/Ops/BuildConsoleRegistry.php**: Check for typed/invalid BaseCommand property overrides
- **app/Commands/Ops/CiPrepare.php**: Check for typed/invalid BaseCommand property overrides
- **app/Commands/Ops/Commands/Audit.php**: Check for typed/invalid BaseCommand property overrides
- **app/Commands/Ops/Commands/Autofix.php**: Check for typed/invalid BaseCommand property overrides
- **app/Commands/Ops/Commands/Inventory.php**: Check for typed/invalid BaseCommand property overrides
- **app/Commands/Ops/Commands/Lint.php**: Check for typed/invalid BaseCommand property overrides
- **app/Commands/Ops/Commands/MissingFromConsole.php**: Check for typed/invalid BaseCommand property overrides
- **app/Commands/Ops/ConfigLint.php**: Check for typed/invalid BaseCommand property overrides
- **app/Commands/Ops/Diagnostics/FilesystemScan.php**: Check for typed/invalid BaseCommand property overrides
- **app/Commands/Ops/Diff.php**: Check for typed/invalid BaseCommand property overrides
- **app/Commands/Ops/DiffWallet.php**: Check for typed/invalid BaseCommand property overrides
- **app/Commands/Ops/DoctorFull.php**: Check for typed/invalid BaseCommand property overrides
- **app/Commands/Ops/DreamHost/DnsVerify.php**: Check for typed/invalid BaseCommand property overrides
- **app/Commands/Ops/DreamHost/EmailAudit.php**: Check for typed/invalid BaseCommand property overrides
- **app/Commands/Ops/DreamHost/EmailList.php**: Check for typed/invalid BaseCommand property overrides
- **app/Commands/Ops/DreamHost/Limits.php**: Check for typed/invalid BaseCommand property overrides
- **app/Commands/Ops/DriftScan.php**: Check for typed/invalid BaseCommand property overrides
- **app/Commands/Ops/Email/Healthcheck.php**: Check for typed/invalid BaseCommand property overrides
- **app/Commands/Ops/Email/QueueScan.php**: Check for typed/invalid BaseCommand property overrides
- **app/Commands/Ops/Email/Test.php**: Check for typed/invalid BaseCommand property overrides
- **app/Commands/Ops/EnvSnapshot.php**: Check for typed/invalid BaseCommand property overrides
- **app/Commands/Ops/FetchCommands.php**: Check for typed/invalid BaseCommand property overrides
- **app/Commands/Ops/FilesystemFix.php**: Check for typed/invalid BaseCommand property overrides
- **app/Commands/Ops/FilesystemLint.php**: Check for typed/invalid BaseCommand property overrides
- **app/Commands/Ops/Grep.php**: Check for typed/invalid BaseCommand property overrides
- **app/Commands/Ops/GrepSearch.php**: Check for typed/invalid BaseCommand property overrides
- **app/Commands/Ops/Health/Healthcheck.php**: Check for typed/invalid BaseCommand property overrides
- **app/Commands/Ops/LoggerTest.php**: Check for typed/invalid BaseCommand property overrides
- **app/Commands/Ops/Logs/Scan.php**: Check for typed/invalid BaseCommand property overrides
- **app/Commands/Ops/Logs/Watch.php**: Check for typed/invalid BaseCommand property overrides
- **app/Commands/Ops/ModelLimitAudit.php**: Check for typed/invalid BaseCommand property overrides
- **app/Commands/Ops/NetworkMatrix.php**: Check for typed/invalid BaseCommand property overrides
- **app/Commands/Ops/NextSteps.php**: Check for typed/invalid BaseCommand property overrides
- **app/Commands/Ops/NextStepsSync.php**: Check for typed/invalid BaseCommand property overrides
- **app/Commands/Ops/NextStepsSyncManual.php**: Check for typed/invalid BaseCommand property overrides
- **app/Commands/Ops/PHP/FpmHealth.php**: Check for typed/invalid BaseCommand property overrides
- **app/Commands/Ops/PHPExtensionsAudit.php**: Check for typed/invalid BaseCommand property overrides
- **app/Commands/Ops/ProposePr.php**: Check for typed/invalid BaseCommand property overrides
- **app/Commands/Ops/Report.php**: Check for typed/invalid BaseCommand property overrides
- **app/Commands/Ops/SelfHeal.php**: Check for typed/invalid BaseCommand property overrides
- **app/Commands/Ops/Server/NginxStatus.php**: Check for typed/invalid BaseCommand property overrides
- **app/Commands/Ops/Subs/Audit.php**: Check for typed/invalid BaseCommand property overrides
- **app/Commands/Ops/Subs/Doctor.php**: Check for typed/invalid BaseCommand property overrides
- **app/Commands/Ops/Subs/Repair.php**: Check for typed/invalid BaseCommand property overrides
- **app/Commands/Ops/Subs/Status.php**: Check for typed/invalid BaseCommand property overrides
- **app/Commands/Ops/Sync.php**: Check for typed/invalid BaseCommand property overrides
- **app/Commands/Ops/TailLogs.php**: Check for typed/invalid BaseCommand property overrides
- **app/Commands/Ops/VPSSnapshot.php**: Check for typed/invalid BaseCommand property overrides
- **app/Commands/Ops/WalletIntegrity.php**: Check for typed/invalid BaseCommand property overrides
- **app/Commands/Ops/Work.php**: Check for typed/invalid BaseCommand property overrides
- **app/Commands/Performance/K6Run.php**: Check for typed/invalid BaseCommand property overrides
- **app/Commands/Platform/ControlAnalyze.php**: Check for typed/invalid BaseCommand property overrides
- **app/Commands/Platform/ControlCollect.php**: Check for typed/invalid BaseCommand property overrides
- **app/Commands/Platform/ControlDispatch.php**: Check for typed/invalid BaseCommand property overrides
- **app/Commands/Platform/ControlRun.php**: Check for typed/invalid BaseCommand property overrides
- **app/Commands/Platform/CronDispatch.php**: Check for typed/invalid BaseCommand property overrides
- **app/Commands/Platform/EdgeSnapshot.php**: Check for typed/invalid BaseCommand property overrides
- **app/Commands/Platform/RunPlatform.php**: Check for typed/invalid BaseCommand property overrides
- **app/Commands/Platform/RunReport.php**: Check for typed/invalid BaseCommand property overrides
- **app/Commands/Platform/RunSubsystem.php**: Check for typed/invalid BaseCommand property overrides
- **app/Commands/PurgeFastCGI.php**: Check for typed/invalid BaseCommand property overrides
- **app/Commands/Repo/ClassScan.php**: Check for typed/invalid BaseCommand property overrides
- **app/Commands/Repo/ClassTrace.php**: Check for typed/invalid BaseCommand property overrides
- **app/Commands/Repo/DiffSplit.php**: Check for typed/invalid BaseCommand property overrides
- **app/Commands/Repo/Health.php**: Check for typed/invalid BaseCommand property overrides
- **app/Commands/Research/DailyMarketReport.php**: Check for typed/invalid BaseCommand property overrides
- **app/Commands/Research/EarningsCalendar.php**: Check for typed/invalid BaseCommand property overrides
- **app/Commands/Research/FinancialIntelligenceSignals.php**: Check for typed/invalid BaseCommand property overrides
- **app/Commands/Research/FinancialKnowledge.php**: Check for typed/invalid BaseCommand property overrides
- **app/Commands/Research/GoogleFinancialScan.php**: Check for typed/invalid BaseCommand property overrides
- **app/Commands/Research/ShortInterestScan.php**: Check for typed/invalid BaseCommand property overrides
- **app/Commands/Research/WeeklyMarketReport.php**: Check for typed/invalid BaseCommand property overrides
- **app/Commands/RestartSafe.php**: Check for typed/invalid BaseCommand property overrides
- **app/Commands/Revenue/CostForecast.php**: Check for typed/invalid BaseCommand property overrides
- **app/Commands/RevenueStreamsScan.php**: Check for typed/invalid BaseCommand property overrides
- **app/Commands/Routes/Benchmark.php**: Check for typed/invalid BaseCommand property overrides
- **app/Commands/Routes/Debug.php**: Check for typed/invalid BaseCommand property overrides
- **app/Commands/Routes/Docs.php**: Check for typed/invalid BaseCommand property overrides
- **app/Commands/Routes/Reconcile.php**: Check for typed/invalid BaseCommand property overrides
- **app/Commands/Routes/Repair.php**: Check for typed/invalid BaseCommand property overrides
- **app/Commands/RoutesAuthAudit.php**: Check for typed/invalid BaseCommand property overrides
- **app/Commands/Runtime/CacheBoot.php**: Check for typed/invalid BaseCommand property overrides
- **app/Commands/Runtime/Diagnose502.php**: Check for typed/invalid BaseCommand property overrides
- **app/Commands/Runtime/SparkDoctor.php**: Check for typed/invalid BaseCommand property overrides
- **app/Commands/Runtime/SparkDoctorRuntime.php**: Check for typed/invalid BaseCommand property overrides
- **app/Commands/Runtime/SparkFix.php**: Check for typed/invalid BaseCommand property overrides
- **app/Commands/Runtime/SparkOptimize.php**: Check for typed/invalid BaseCommand property overrides
- **app/Commands/Runtime/Triage.php**: Check for typed/invalid BaseCommand property overrides
- **app/Commands/RuntimeCheck.php**: Check for typed/invalid BaseCommand property overrides
- **app/Commands/SafeBaseCommand.php**: Possible missing run() method
- **app/Commands/Scanning/RunScanner.php**: Check for typed/invalid BaseCommand property overrides
- **app/Commands/Scrapers/EmailScraperAudit.php**: Check for typed/invalid BaseCommand property overrides
- **app/Commands/Security/GenerateCI4Key.php**: Check for typed/invalid BaseCommand property overrides
- **app/Commands/Security/GenerateKey.php**: Check for typed/invalid BaseCommand property overrides
- **app/Commands/Security/SecretsAudit.php**: Check for typed/invalid BaseCommand property overrides
- **app/Commands/SecurityCspAudit.php**: Check for typed/invalid BaseCommand property overrides
- **app/Commands/Spark/CommandGraph.php**: Check for typed/invalid BaseCommand property overrides
- **app/Commands/Spark/Doctor.php**: Check for typed/invalid BaseCommand property overrides
- **app/Commands/Spark/Fix.php**: Check for typed/invalid BaseCommand property overrides
- **app/Commands/Spark/InfraServerAudit.php**: Check for typed/invalid BaseCommand property overrides
- **app/Commands/Spark/RegistryAudit.php**: Check for typed/invalid BaseCommand property overrides
- **app/Commands/Spark/Reset.php**: Check for typed/invalid BaseCommand property overrides
- **app/Commands/Test/RedisPing.php**: Check for typed/invalid BaseCommand property overrides
- **app/Commands/TestEmail.php**: Check for typed/invalid BaseCommand property overrides
- **app/Commands/TrafficSpikeGuard.php**: Check for typed/invalid BaseCommand property overrides
- **app/Commands/Ux/JourneyAudit.php**: Check for typed/invalid BaseCommand property overrides
- **app/Commands/WalletsWarmSummaryCache.php**: Check for typed/invalid BaseCommand property overrides

## Actions Detected
```json
[
    {
        "type": "optimize",
        "description": "Memory optimization required",
        "source": {
            "file": "summary-2026-03-31.log",
            "line_no": 1823,
            "pattern": "500",
            "line": "INFO --> [REQ_ID=9c500f9832d4] [MEMORY][controller-start] 4194304"
        }
    },
    {
        "type": "optimize",
        "description": "Memory optimization required",
        "source": {
            "file": "summary-2026-03-30.log",
            "line_no": 329,
            "pattern": "404",
            "line": "DEBUG --> [REQ_ID=3526c5404443] [LIFECYCLE][END] status=200 duration_ms=562.93 memory_delta=4194304"
        }
    },
    {
        "type": "optimize",
        "description": "Memory optimization required",
        "source": {
            "file": "summary-2026-03-30.log",
            "line_no": 1090,
            "pattern": "504",
            "line": "INFO --> [REQ_ID=2300d85048cb] [MEMORY][controller-start] 4194304"
        }
    },
    {
        "type": "optimize",
        "description": "Memory optimization required",
        "source": {
            "file": "summary-2026-03-30.log",
            "line_no": 1130,
            "pattern": "504",
            "line": "INFO --> [REQ_ID=a5040e1ff306] [MEMORY][controller-start] 4194304"
        }
    },
    {
        "type": "optimize",
        "description": "Memory optimization required",
        "source": {
            "file": "summary-2026-03-30.log",
            "line_no": 1132,
            "pattern": "504",
            "line": "INFO --> [REQ_ID=a5040e1ff306] [MEMORY][commonData:start] 4194304"
        }
    },
    {
        "type": "optimize",
        "description": "Memory optimization required",
        "source": {
            "file": "summary-2026-03-28.log",
            "line_no": 583,
            "pattern": "404",
            "line": "DEBUG --> [REQ_ID=27ef5adc2687] [LIFECYCLE][END] status=404 duration_ms=86.51 memory_delta=0"
        }
    },
    {
        "type": "optimize",
        "description": "Memory optimization required",
        "source": {
            "file": "summary-2026-03-28.log",
            "line_no": 813,
            "pattern": "500",
            "line": "DEBUG --> [REQ_ID=5acb7dc5009e] [LIFECYCLE][END] status=200 duration_ms=712.43 memory_delta=4194304"
        }
    },
    {
        "type": "patch",
        "description": "Missing method implementation",
        "source": {
            "file": "summary-2026-03-28.log",
            "line_no": 1360,
            "pattern": "undefined",
            "line": "ERROR --> DashboardController::index failed to load executive summary: Call to undefined method CodeIgniter\\Cache\\Handlers\\FileHandler::set()"
        }
    },
    {
        "type": "optimize",
        "description": "Memory optimization required",
        "source": {
            "file": "summary-2026-03-25.log",
            "line_no": 757,
            "pattern": "404",
            "line": "DEBUG --> [REQ_ID=1a9540453012] [LIFECYCLE][END] status=200 duration_ms=619.76 memory_delta=4194304"
        }
    },
    {
        "type": "optimize",
        "description": "Memory optimization required",
        "source": {
            "file": "summary-2026-03-22.log",
            "line_no": 26,
            "pattern": "500",
            "line": "DEBUG --> [REQ_ID=500275ad2832] [LIFECYCLE][END] status=200 duration_ms=38.75 memory_delta=0"
        }
    },
    {
        "type": "patch",
        "description": "Missing method implementation",
        "source": {
            "file": "summary-2026-03-22.log",
            "line_no": 1951,
            "pattern": "undefined",
            "line": "ERROR --> BudgetController::index failed to build executive summary: Call to undefined method CodeIgniter\\Cache\\Handlers\\FileHandler::set()"
        }
    },
    {
        "type": "patch",
        "description": "Missing method implementation",
        "source": {
            "file": "summary-2026-03-22.log",
            "line_no": 1953,
            "pattern": "undefined",
            "line": "ERROR --> DashboardController::index failed to load executive summary: Call to undefined method CodeIgniter\\Cache\\Handlers\\FileHandler::set()"
        }
    },
    {
        "type": "patch",
        "description": "Missing method implementation",
        "source": {
            "file": "summary-2026-03-22.log",
            "line_no": 1965,
            "pattern": "undefined",
            "line": "ERROR --> HowItWorksController failure: Call to undefined method App\\Modules\\Blog\\Controllers\\HowItWorksController::respondWithRendered()"
        }
    },
    {
        "type": "optimize",
        "description": "Memory optimization required",
        "source": {
            "file": "summary-2026-03-20.log",
            "line_no": 369,
            "pattern": "500",
            "line": "DEBUG --> [REQ_ID=8366408500c9] [LIFECYCLE][END] status=200 duration_ms=649.06 memory_delta=4194304"
        }
    }
]
```

## Recommended Next Actions
- Review the **Detected Errors** section first.
- Prioritize files referenced repeatedly across logs.
- Validate routes whose handlers map to recently changed controllers.
- Review command issues before running large Spark task chains.
- Use this file as the primary Codex input for the next repair pass.
