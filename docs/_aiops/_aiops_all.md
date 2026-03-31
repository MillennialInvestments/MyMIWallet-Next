# AIOps Full Report

**Generated:** 2026-03-31T23:40:49+00:00

## Executive Summary
- Errors detected: 250
- Routes discovered: 17
- Database tables: 0
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
    "php_version": "8.4.18-dev",
    "php_sapi": "cli",
    "ci_version": "4.7.0",
    "environment": "development",
    "base_url": "https://www.mymiwallet.com/",
    "index_page": "index.php",
    "memory_limit": "128M",
    "max_execution_time": "0",
    "post_max_size": "8M",
    "upload_max_filesize": "2M",
    "timezone": "UTC",
    "csrf_enabled": true,
    "extensions": [
        "Core",
        "date",
        "libxml",
        "openssl",
        "pcre",
        "sqlite3",
        "zlib",
        "bcmath",
        "bz2",
        "ctype",
        "curl",
        "dom",
        "json",
        "fileinfo",
        "filter",
        "ftp",
        "gd",
        "hash",
        "iconv",
        "intl",
        "SPL",
        "mbstring",
        "session",
        "standard",
        "mysqlnd",
        "mysqli",
        "pcntl",
        "PDO",
        "pdo_mysql",
        "pdo_sqlite",
        "Phar",
        "posix",
        "random",
        "readline",
        "Reflection",
        "exif",
        "shmop",
        "SimpleXML",
        "soap",
        "sockets",
        "sysvsem",
        "sysvshm",
        "tidy",
        "tokenizer",
        "xml",
        "xmlreader",
        "xmlwriter",
        "xsl",
        "zip",
        "Zend OPcache",
        "xdebug"
    ]
}
```

## Performance
```json
{
    "memory_usage_bytes": 25165824,
    "memory_peak_usage_bytes": 25165824,
    "execution_seconds": 3.976,
    "included_files_count": 591
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
- Views: 35
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
- Views: 544
- Config: 0

## Database Tables
- No database metadata available.

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
