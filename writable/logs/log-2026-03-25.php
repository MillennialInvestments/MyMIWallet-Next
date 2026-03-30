<?php defined('SYSTEMPATH') || exit('No direct script access allowed'); ?>

DEBUG - 2026-03-25 00:00:01 --> [REQ_ID=96735ec73a65] [REQUEST][START] GET /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-25 00:00:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-25 00:00:01 --> [REQ_ID=96735ec73a65] [FILTER_BEFORE] /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-25 00:00:01 --> [REQ_ID=96735ec73a65] [ROUTE] Controller=\App\Modules\Management\Controllers\ManagementAPIController Method=Run_CRON_Tasks
DEBUG - 2026-03-25 00:00:01 --> [REQ_ID=96735ec73a65] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-25 00:00:01 --> [REQ_ID=96735ec73a65] [REQUEST][END]
INFO - 2026-03-25 00:00:01 --> [REQ_ID=96735ec73a65] [PERF] Execution time=0.049878
DEBUG - 2026-03-25 00:01:22 --> [REQ_ID=0160a41f9370] [REQUEST][START] HEAD /
DEBUG - 2026-03-25 00:01:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-25 00:01:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-25 00:01:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-25 00:01:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-25 00:01:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-25 00:06:22 --> [REQ_ID=07c3ff786c90] [REQUEST][START] HEAD /
DEBUG - 2026-03-25 00:06:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-25 00:06:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-25 00:06:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-25 00:06:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-25 00:06:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-25 00:11:22 --> [REQ_ID=26dfce1146cc] [REQUEST][START] HEAD /
DEBUG - 2026-03-25 00:11:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-25 00:11:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-25 00:11:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-25 00:11:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-25 00:11:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-25 00:15:02 --> [REQ_ID=44b961584933] [REQUEST][START] GET /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-25 00:15:02 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-25 00:15:02 --> [REQ_ID=44b961584933] [FILTER_BEFORE] /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-25 00:15:02 --> [REQ_ID=44b961584933] [ROUTE] Controller=\App\Modules\APIs\Controllers\AlertsAPIController Method=fetchEmailAlerts
DEBUG - 2026-03-25 00:15:02 --> [REQ_ID=44b961584933] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-25 00:15:02 --> [REQ_ID=44b961584933] [REQUEST][END]
INFO - 2026-03-25 00:15:02 --> [REQ_ID=44b961584933] [PERF] Execution time=0.047410
DEBUG - 2026-03-25 00:15:32 --> [REQ_ID=f3bf68ee9d19] [REQUEST][START] GET /index.php/How-It-Works/Setting-Financial-Goals
DEBUG - 2026-03-25 00:15:32 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-25 00:15:32 --> [REQ_ID=f3bf68ee9d19] [REQUEST][END]
INFO - 2026-03-25 00:15:32 --> [REQ_ID=f3bf68ee9d19] [PERF] Execution time=0.017645
DEBUG - 2026-03-25 00:16:22 --> [REQ_ID=453666103cd6] [REQUEST][START] HEAD /
DEBUG - 2026-03-25 00:16:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-25 00:16:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-25 00:16:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-25 00:16:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-25 00:16:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-25 00:21:22 --> [REQ_ID=f8ee75f67530] [REQUEST][START] HEAD /
DEBUG - 2026-03-25 00:21:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-25 00:21:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-25 00:21:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-25 00:21:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-25 00:21:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-25 00:22:20 --> [REQ_ID=95c6bdcf658f] [REQUEST][START] GET /index.php/
DEBUG - 2026-03-25 00:22:20 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-25 00:22:20 --> [REQ_ID=95c6bdcf658f] [FILTER_BEFORE] /index.php/
DEBUG - 2026-03-25 00:22:20 --> [REQ_ID=95c6bdcf658f] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-25 00:22:20 --> [REQ_ID=95c6bdcf658f] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-25 00:22:20 --> [CSRF] token name=csrf_test_name hash=77f7ff5cd866b0a86c80bdd562e9011d
DEBUG - 2026-03-25 00:22:20 --> [REQ_ID=b006cb1c6a06] [INIT] App\Controllers\Home::GET
INFO - 2026-03-25 00:22:20 --> [REQ_ID=b006cb1c6a06] [MEMORY][controller-start] 4194304
INFO - 2026-03-25 00:22:20 --> [REQ_ID=b006cb1c6a06] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-25 00:22:20 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-25 00:22:20 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-03-25 00:22:20 --> [REQ_ID=b006cb1c6a06] [VIEW_RENDER] themes/public/home
INFO - 2026-03-25 00:22:20 --> [REQ_ID=b006cb1c6a06] [MEMORY][commonData:start] 8388608
INFO - 2026-03-25 00:22:20 --> themesMemory usage: 8388608
DEBUG - 2026-03-25 00:22:20 --> [MetaService] slug= pageName=Home cacheHit= path=DB
DEBUG - 2026-03-25 00:22:20 --> [REQ_ID=95c6bdcf658f] [FILTER_AFTER]
DEBUG - 2026-03-25 00:22:20 --> [REQ_ID=95c6bdcf658f] [LIFECYCLE][END] status=200 duration_ms=655.91 memory_delta=4194304
INFO - 2026-03-25 00:22:20 --> [REQ_ID=b006cb1c6a06] [PERF] Execution time=0.654044
DEBUG - 2026-03-25 00:22:20 --> [REQ_ID=95c6bdcf658f] [REQUEST][END]
INFO - 2026-03-25 00:22:20 --> [REQ_ID=95c6bdcf658f] [PERF] Execution time=0.676329
DEBUG - 2026-03-25 00:22:33 --> [REQ_ID=6b48c016ba12] [REQUEST][START] GET /index.php/logout
DEBUG - 2026-03-25 00:22:33 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-25 00:22:33 --> [REQ_ID=6b48c016ba12] [FILTER_BEFORE] /index.php/logout
DEBUG - 2026-03-25 00:22:33 --> [REQ_ID=6b48c016ba12] [ROUTE] Controller=\App\Controllers\AuthController Method=logout
DEBUG - 2026-03-25 00:22:33 --> [REQ_ID=6b48c016ba12] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/logout
DEBUG - 2026-03-25 00:22:33 --> [CSRF] token name=csrf_test_name hash=0c7498333763d13bb314ed00f0153027
DEBUG - 2026-03-25 00:22:33 --> [REQ_ID=6b48c016ba12] [REQUEST][END]
INFO - 2026-03-25 00:22:33 --> [REQ_ID=6b48c016ba12] [PERF] Execution time=0.015669
DEBUG - 2026-03-25 00:22:45 --> [REQ_ID=c053e9ecc451] [REQUEST][START] GET /index.php/Account
DEBUG - 2026-03-25 00:22:45 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-25 00:22:45 --> [REQ_ID=c053e9ecc451] [FILTER_BEFORE] /index.php/Account
DEBUG - 2026-03-25 00:22:45 --> [REQ_ID=c053e9ecc451] [ROUTE] Controller=\App\Modules\User\Controllers\DashboardController Method=account
DEBUG - 2026-03-25 00:22:45 --> [REQ_ID=c053e9ecc451] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Account
DEBUG - 2026-03-25 00:22:45 --> [CSRF] token name=csrf_test_name hash=2116f1a75939b0698e2747a5c65115c1
DEBUG - 2026-03-25 00:22:45 --> [REQ_ID=c053e9ecc451] [REQUEST][END]
INFO - 2026-03-25 00:22:45 --> [REQ_ID=c053e9ecc451] [PERF] Execution time=0.014414
DEBUG - 2026-03-25 00:22:58 --> [REQ_ID=373101f43287] [REQUEST][START] GET /index.php/Exchange
DEBUG - 2026-03-25 00:22:58 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-25 00:22:58 --> [REQ_ID=373101f43287] [FILTER_BEFORE] /index.php/Exchange
DEBUG - 2026-03-25 00:22:58 --> [REQ_ID=373101f43287] [ROUTE] Controller=\App\Modules\Exchange\Controllers\ExchangeController Method=index
DEBUG - 2026-03-25 00:22:58 --> [REQ_ID=373101f43287] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Exchange
DEBUG - 2026-03-25 00:22:58 --> [CSRF] token name=csrf_test_name hash=76c2048f5ae7150ec7686ee4d95c158a
DEBUG - 2026-03-25 00:22:58 --> [REQ_ID=373101f43287] [REQUEST][END]
INFO - 2026-03-25 00:22:58 --> [REQ_ID=373101f43287] [PERF] Execution time=0.014655
DEBUG - 2026-03-25 00:23:10 --> [REQ_ID=42de45e07e84] [REQUEST][START] GET /index.php/Alerts
DEBUG - 2026-03-25 00:23:10 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-25 00:23:10 --> [REQ_ID=42de45e07e84] [FILTER_BEFORE] /index.php/Alerts
DEBUG - 2026-03-25 00:23:10 --> [REQ_ID=42de45e07e84] [ROUTE] Controller=\App\Modules\User\Controllers\AlertsController Method=index
DEBUG - 2026-03-25 00:23:10 --> [REQ_ID=42de45e07e84] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Alerts
DEBUG - 2026-03-25 00:23:10 --> [CSRF] token name=csrf_test_name hash=f9142c6ebabe1bf6cbda8f3745c83b97
DEBUG - 2026-03-25 00:23:10 --> [REQ_ID=42de45e07e84] [REQUEST][END]
INFO - 2026-03-25 00:23:10 --> [REQ_ID=42de45e07e84] [PERF] Execution time=0.126877
DEBUG - 2026-03-25 00:23:48 --> [REQ_ID=a2c0f8e99076] [REQUEST][START] GET /index.php/Marketplace
DEBUG - 2026-03-25 00:23:48 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-25 00:23:48 --> [REQ_ID=a2c0f8e99076] [FILTER_BEFORE] /index.php/Marketplace
DEBUG - 2026-03-25 00:23:48 --> [REQ_ID=a2c0f8e99076] [ROUTE] Controller=\App\Modules\ScriptStudio\Controllers\ScriptStudioController Method=marketplace
DEBUG - 2026-03-25 00:23:48 --> [REQ_ID=a2c0f8e99076] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Marketplace
DEBUG - 2026-03-25 00:23:48 --> [CSRF] token name=csrf_test_name hash=2205c7260419ca69e4502d748fd6b781
DEBUG - 2026-03-25 00:23:48 --> [REQ_ID=a2c0f8e99076] [REQUEST][END]
INFO - 2026-03-25 00:23:48 --> [REQ_ID=a2c0f8e99076] [PERF] Execution time=0.012624
DEBUG - 2026-03-25 00:24:01 --> [REQ_ID=cf320831cf6a] [REQUEST][START] GET /index.php/Support/Account
DEBUG - 2026-03-25 00:24:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-25 00:24:01 --> [REQ_ID=cf320831cf6a] [FILTER_BEFORE] /index.php/Support/Account
DEBUG - 2026-03-25 00:24:01 --> [REQ_ID=cf320831cf6a] [ROUTE] Controller=\App\Modules\Support\Controllers\AccountSupportController Method=index
DEBUG - 2026-03-25 00:24:01 --> [REQ_ID=cf320831cf6a] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Support/Account
DEBUG - 2026-03-25 00:24:01 --> [CSRF] token name=csrf_test_name hash=32e2cecc4f0af21b29ca95f2879d08a5
DEBUG - 2026-03-25 00:24:01 --> [REQ_ID=8e73617d5e5c] [INIT] App\Modules\Support\Controllers\AccountSupportController::GET
INFO - 2026-03-25 00:24:01 --> [REQ_ID=8e73617d5e5c] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-25 00:24:01 --> [REQ_ID=8e73617d5e5c] [METHOD_ENTRY] index
DEBUG - 2026-03-25 00:24:01 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-25 00:24:01 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-25 00:24:01 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-25 00:24:01 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-25 00:24:01 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-25 00:24:01 --> MyMICoin: guest context detected; skipping user-specific preload.
INFO - 2026-03-25 00:24:01 --> [REQ_ID=8e73617d5e5c] [MEMORY][commonData:start] 4194304
DEBUG - 2026-03-25 00:24:01 --> [REQ_ID=8e73617d5e5c] [VIEW_RENDER] SupportModule/Support/account_help
INFO - 2026-03-25 00:24:01 --> [REQ_ID=8e73617d5e5c] [MEMORY][commonData:start] 4194304
INFO - 2026-03-25 00:24:01 --> themesMemory usage: 4194304
DEBUG - 2026-03-25 00:24:01 --> [REQ_ID=cf320831cf6a] [FILTER_AFTER]
DEBUG - 2026-03-25 00:24:01 --> [REQ_ID=cf320831cf6a] [LIFECYCLE][END] status=200 duration_ms=316.24 memory_delta=0
INFO - 2026-03-25 00:24:01 --> [REQ_ID=8e73617d5e5c] [PERF] Execution time=0.315689
DEBUG - 2026-03-25 00:24:01 --> [REQ_ID=cf320831cf6a] [REQUEST][END]
INFO - 2026-03-25 00:24:01 --> [REQ_ID=cf320831cf6a] [PERF] Execution time=0.327748
DEBUG - 2026-03-25 00:24:14 --> [REQ_ID=2f31e7859b16] [REQUEST][START] GET /index.php/Dashboard
DEBUG - 2026-03-25 00:24:14 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-25 00:24:14 --> [REQ_ID=2f31e7859b16] [FILTER_BEFORE] /index.php/Dashboard
DEBUG - 2026-03-25 00:24:14 --> [REQ_ID=2f31e7859b16] [ROUTE] Controller=\App\Modules\User\Controllers\DashboardController Method=index
DEBUG - 2026-03-25 00:24:14 --> [REQ_ID=2f31e7859b16] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Dashboard
DEBUG - 2026-03-25 00:24:14 --> [CSRF] token name=csrf_test_name hash=f5e12f715e4d55a01b32e1964ac5275f
DEBUG - 2026-03-25 00:24:14 --> [REQ_ID=2f31e7859b16] [REQUEST][END]
INFO - 2026-03-25 00:24:14 --> [REQ_ID=2f31e7859b16] [PERF] Execution time=0.010701
DEBUG - 2026-03-25 00:24:51 --> [REQ_ID=8a8825a38876] [REQUEST][START] GET /index.php/How-It-Works/overview
DEBUG - 2026-03-25 00:24:51 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-25 00:24:51 --> [REQ_ID=8a8825a38876] [FILTER_BEFORE] /index.php/How-It-Works/overview
DEBUG - 2026-03-25 00:24:51 --> [REQ_ID=8a8825a38876] [ROUTE] Controller=\App\Modules\Blog\Controllers\HowItWorksController Method=show
DEBUG - 2026-03-25 00:24:51 --> [REQ_ID=8a8825a38876] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/How-It-Works/overview
DEBUG - 2026-03-25 00:24:51 --> [CSRF] token name=csrf_test_name hash=82311eeb86bba35cfe02431a78a01d26
DEBUG - 2026-03-25 00:24:51 --> [REQ_ID=640e0fa46488] [INIT] App\Modules\Blog\Controllers\HowItWorksController::GET
INFO - 2026-03-25 00:24:51 --> [REQ_ID=640e0fa46488] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-25 00:24:51 --> [REQ_ID=640e0fa46488] [METHOD_ENTRY] show
DEBUG - 2026-03-25 00:24:51 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-25 00:24:51 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-25 00:24:51 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-25 00:24:51 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-25 00:24:51 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-25 00:24:51 --> MyMICoin: guest context detected; skipping user-specific preload.
ERROR - 2026-03-25 00:24:51 --> HowItWorksController failure: overview
CRITICAL - 2026-03-25 00:24:51 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: GET, Route: How-It-Works/overview]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-25 00:24:51 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-25 00:24:51 --> [404] URI=https://www.mymiwallet.com/index.php/How-It-Works/overview
WARNING - 2026-03-25 00:24:51 --> 404 route miss: https://www.mymiwallet.com/index.php/How-It-Works/overview | referrer: none
ERROR - 2026-03-25 00:24:51 --> [ERROR_PAGE] event=error_404 status=404 message=Page not found.
INFO - 2026-03-25 00:24:51 --> [REQ_ID=640e0fa46488] [PERF] Execution time=0.067183
DEBUG - 2026-03-25 00:25:15 --> [REQ_ID=ef0bcc93ebe6] [REQUEST][START] GET /index.php/How-It-Works/marketing
DEBUG - 2026-03-25 00:25:15 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-25 00:25:15 --> [REQ_ID=ef0bcc93ebe6] [FILTER_BEFORE] /index.php/How-It-Works/marketing
DEBUG - 2026-03-25 00:25:15 --> [REQ_ID=ef0bcc93ebe6] [ROUTE] Controller=\App\Modules\Blog\Controllers\HowItWorksController Method=show
DEBUG - 2026-03-25 00:25:15 --> [REQ_ID=ef0bcc93ebe6] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/How-It-Works/marketing
DEBUG - 2026-03-25 00:25:15 --> [CSRF] token name=csrf_test_name hash=3e90ee5bc860961711e85f0ea97720d2
DEBUG - 2026-03-25 00:25:15 --> [REQ_ID=49c00df92ddd] [INIT] App\Modules\Blog\Controllers\HowItWorksController::GET
INFO - 2026-03-25 00:25:15 --> [REQ_ID=49c00df92ddd] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-25 00:25:15 --> [REQ_ID=49c00df92ddd] [METHOD_ENTRY] show
DEBUG - 2026-03-25 00:25:15 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-25 00:25:15 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-25 00:25:15 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-25 00:25:15 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-25 00:25:15 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-25 00:25:15 --> MyMICoin: guest context detected; skipping user-specific preload.
ERROR - 2026-03-25 00:25:15 --> HowItWorksController failure: marketing
CRITICAL - 2026-03-25 00:25:15 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: GET, Route: How-It-Works/marketing]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-25 00:25:15 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-25 00:25:15 --> [404] URI=https://www.mymiwallet.com/index.php/How-It-Works/marketing
WARNING - 2026-03-25 00:25:15 --> 404 route miss: https://www.mymiwallet.com/index.php/How-It-Works/marketing | referrer: none
ERROR - 2026-03-25 00:25:15 --> [ERROR_PAGE] event=error_404 status=404 message=Page not found.
INFO - 2026-03-25 00:25:15 --> [REQ_ID=49c00df92ddd] [PERF] Execution time=0.037361
DEBUG - 2026-03-25 00:25:40 --> [REQ_ID=1ab2a35f17b6] [REQUEST][START] GET /index.php/How-It-Works/earnings
DEBUG - 2026-03-25 00:25:40 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-25 00:25:40 --> [REQ_ID=1ab2a35f17b6] [FILTER_BEFORE] /index.php/How-It-Works/earnings
DEBUG - 2026-03-25 00:25:40 --> [REQ_ID=1ab2a35f17b6] [ROUTE] Controller=\App\Modules\Blog\Controllers\HowItWorksController Method=show
DEBUG - 2026-03-25 00:25:40 --> [REQ_ID=1ab2a35f17b6] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/How-It-Works/earnings
DEBUG - 2026-03-25 00:25:40 --> [CSRF] token name=csrf_test_name hash=ae80228c724598fbc2ea0d892b26d4fb
DEBUG - 2026-03-25 00:25:40 --> [REQ_ID=6e1d693928b7] [INIT] App\Modules\Blog\Controllers\HowItWorksController::GET
INFO - 2026-03-25 00:25:40 --> [REQ_ID=6e1d693928b7] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-25 00:25:40 --> [REQ_ID=6e1d693928b7] [METHOD_ENTRY] show
DEBUG - 2026-03-25 00:25:40 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-25 00:25:40 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-25 00:25:40 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-25 00:25:40 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-25 00:25:40 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-25 00:25:40 --> MyMICoin: guest context detected; skipping user-specific preload.
ERROR - 2026-03-25 00:25:40 --> HowItWorksController failure: earnings
CRITICAL - 2026-03-25 00:25:40 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: GET, Route: How-It-Works/earnings]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-25 00:25:40 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-25 00:25:40 --> [404] URI=https://www.mymiwallet.com/index.php/How-It-Works/earnings
WARNING - 2026-03-25 00:25:40 --> 404 route miss: https://www.mymiwallet.com/index.php/How-It-Works/earnings | referrer: none
ERROR - 2026-03-25 00:25:40 --> [ERROR_PAGE] event=error_404 status=404 message=Page not found.
INFO - 2026-03-25 00:25:40 --> [REQ_ID=6e1d693928b7] [PERF] Execution time=0.029724
DEBUG - 2026-03-25 00:25:52 --> [REQ_ID=d8b9774215e8] [REQUEST][START] GET /index.php/How-It-Works/investments
DEBUG - 2026-03-25 00:25:52 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-25 00:25:52 --> [REQ_ID=d8b9774215e8] [FILTER_BEFORE] /index.php/How-It-Works/investments
DEBUG - 2026-03-25 00:25:52 --> [REQ_ID=d8b9774215e8] [ROUTE] Controller=\App\Modules\Blog\Controllers\HowItWorksController Method=show
DEBUG - 2026-03-25 00:25:52 --> [REQ_ID=d8b9774215e8] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/How-It-Works/investments
DEBUG - 2026-03-25 00:25:52 --> [CSRF] token name=csrf_test_name hash=a1c15bbfd08493f26d29775b3a1970e8
DEBUG - 2026-03-25 00:25:52 --> [REQ_ID=e0ef9314cfe3] [INIT] App\Modules\Blog\Controllers\HowItWorksController::GET
INFO - 2026-03-25 00:25:52 --> [REQ_ID=e0ef9314cfe3] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-25 00:25:52 --> [REQ_ID=e0ef9314cfe3] [METHOD_ENTRY] show
DEBUG - 2026-03-25 00:25:52 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-25 00:25:52 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-25 00:25:52 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-25 00:25:52 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-25 00:25:52 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-25 00:25:52 --> MyMICoin: guest context detected; skipping user-specific preload.
ERROR - 2026-03-25 00:25:52 --> HowItWorksController failure: investments
CRITICAL - 2026-03-25 00:25:52 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: GET, Route: How-It-Works/investments]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-25 00:25:52 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-25 00:25:52 --> [404] URI=https://www.mymiwallet.com/index.php/How-It-Works/investments
WARNING - 2026-03-25 00:25:52 --> 404 route miss: https://www.mymiwallet.com/index.php/How-It-Works/investments | referrer: none
ERROR - 2026-03-25 00:25:52 --> [ERROR_PAGE] event=error_404 status=404 message=Page not found.
INFO - 2026-03-25 00:25:52 --> [REQ_ID=e0ef9314cfe3] [PERF] Execution time=0.052948
DEBUG - 2026-03-25 00:26:05 --> [REQ_ID=782d212eb741] [REQUEST][START] GET /index.php/How-It-Works/account-settings
DEBUG - 2026-03-25 00:26:05 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-25 00:26:05 --> [REQ_ID=782d212eb741] [FILTER_BEFORE] /index.php/How-It-Works/account-settings
DEBUG - 2026-03-25 00:26:05 --> [REQ_ID=782d212eb741] [ROUTE] Controller=\App\Modules\Blog\Controllers\HowItWorksController Method=show
DEBUG - 2026-03-25 00:26:05 --> [REQ_ID=782d212eb741] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/How-It-Works/account-settings
DEBUG - 2026-03-25 00:26:05 --> [CSRF] token name=csrf_test_name hash=ac62ad410365ad75a88438845344fd85
DEBUG - 2026-03-25 00:26:05 --> [REQ_ID=5d61530f5bef] [INIT] App\Modules\Blog\Controllers\HowItWorksController::GET
INFO - 2026-03-25 00:26:05 --> [REQ_ID=5d61530f5bef] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-25 00:26:05 --> [REQ_ID=5d61530f5bef] [METHOD_ENTRY] show
DEBUG - 2026-03-25 00:26:05 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-25 00:26:05 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-25 00:26:05 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-25 00:26:05 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-25 00:26:05 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-25 00:26:05 --> MyMICoin: guest context detected; skipping user-specific preload.
ERROR - 2026-03-25 00:26:05 --> HowItWorksController failure: account-settings
CRITICAL - 2026-03-25 00:26:05 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: GET, Route: How-It-Works/account-settings]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-25 00:26:05 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-25 00:26:05 --> [404] URI=https://www.mymiwallet.com/index.php/How-It-Works/account-settings
WARNING - 2026-03-25 00:26:05 --> 404 route miss: https://www.mymiwallet.com/index.php/How-It-Works/account-settings | referrer: none
ERROR - 2026-03-25 00:26:05 --> [ERROR_PAGE] event=error_404 status=404 message=Page not found.
INFO - 2026-03-25 00:26:05 --> [REQ_ID=5d61530f5bef] [PERF] Execution time=0.046824
DEBUG - 2026-03-25 00:26:17 --> [REQ_ID=583636e3fd7e] [REQUEST][START] GET /index.php/How-It-Works/Investor-Profile
DEBUG - 2026-03-25 00:26:17 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-25 00:26:17 --> [REQ_ID=583636e3fd7e] [FILTER_BEFORE] /index.php/How-It-Works/Investor-Profile
DEBUG - 2026-03-25 00:26:17 --> [REQ_ID=583636e3fd7e] [ROUTE] Controller=\App\Modules\Blog\Controllers\HowItWorksController Method=show
DEBUG - 2026-03-25 00:26:17 --> [REQ_ID=583636e3fd7e] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/How-It-Works/Investor-Profile
DEBUG - 2026-03-25 00:26:17 --> [CSRF] token name=csrf_test_name hash=9c1efd102d1c3ac3204dd30b8efc41d2
DEBUG - 2026-03-25 00:26:17 --> [REQ_ID=0fee4a51d871] [INIT] App\Modules\Blog\Controllers\HowItWorksController::GET
INFO - 2026-03-25 00:26:17 --> [REQ_ID=0fee4a51d871] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-25 00:26:17 --> [REQ_ID=0fee4a51d871] [METHOD_ENTRY] show
DEBUG - 2026-03-25 00:26:17 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-25 00:26:17 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-25 00:26:17 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-25 00:26:17 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-25 00:26:17 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-25 00:26:17 --> MyMICoin: guest context detected; skipping user-specific preload.
ERROR - 2026-03-25 00:26:17 --> HowItWorksController failure: investor-profile
CRITICAL - 2026-03-25 00:26:17 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: GET, Route: How-It-Works/Investor-Profile]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-25 00:26:17 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-25 00:26:17 --> [404] URI=https://www.mymiwallet.com/index.php/How-It-Works/Investor-Profile
WARNING - 2026-03-25 00:26:17 --> 404 route miss: https://www.mymiwallet.com/index.php/How-It-Works/Investor-Profile | referrer: none
ERROR - 2026-03-25 00:26:17 --> [ERROR_PAGE] event=error_404 status=404 message=Page not found.
INFO - 2026-03-25 00:26:17 --> [REQ_ID=0fee4a51d871] [PERF] Execution time=0.040823
DEBUG - 2026-03-25 00:26:22 --> [REQ_ID=8b6d6d773771] [REQUEST][START] HEAD /
DEBUG - 2026-03-25 00:26:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-25 00:26:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-25 00:26:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-25 00:26:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-25 00:26:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-25 00:31:22 --> [REQ_ID=0aa2cee28f95] [REQUEST][START] HEAD /
DEBUG - 2026-03-25 00:31:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-25 00:31:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-25 00:31:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-25 00:31:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-25 00:31:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-25 00:31:42 --> [REQ_ID=14b728360539] [REQUEST][START] GET /
DEBUG - 2026-03-25 00:31:42 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-25 00:31:42 --> [REQ_ID=14b728360539] [REQUEST][END]
INFO - 2026-03-25 00:31:42 --> [REQ_ID=14b728360539] [PERF] Execution time=0.018030
DEBUG - 2026-03-25 00:36:22 --> [REQ_ID=8c6df519cb98] [REQUEST][START] HEAD /
DEBUG - 2026-03-25 00:36:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-25 00:36:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-25 00:36:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-25 00:36:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-25 00:36:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-25 00:37:25 --> [REQ_ID=f56dd38337f5] [REQUEST][START] GET /
DEBUG - 2026-03-25 00:37:25 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-25 00:37:25 --> [REQ_ID=f56dd38337f5] [REQUEST][END]
INFO - 2026-03-25 00:37:25 --> [REQ_ID=f56dd38337f5] [PERF] Execution time=0.018676
DEBUG - 2026-03-25 00:39:37 --> [REQ_ID=f736790029b1] [REQUEST][START] GET /
DEBUG - 2026-03-25 00:39:37 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-25 00:39:37 --> [REQ_ID=f736790029b1] [FILTER_BEFORE] /
DEBUG - 2026-03-25 00:39:37 --> [REQ_ID=f736790029b1] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-25 00:39:37 --> [REQ_ID=f736790029b1] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-25 00:39:37 --> [CSRF] token name=csrf_test_name hash=4f9a101b36f4c4c67f2cfeba802b0bd2
DEBUG - 2026-03-25 00:39:37 --> [REQ_ID=d5a2d6d3175d] [INIT] App\Controllers\Home::GET
INFO - 2026-03-25 00:39:37 --> [REQ_ID=d5a2d6d3175d] [MEMORY][controller-start] 6291456
INFO - 2026-03-25 00:39:37 --> [REQ_ID=d5a2d6d3175d] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-25 00:39:37 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-25 00:39:38 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-03-25 00:39:38 --> [REQ_ID=d5a2d6d3175d] [VIEW_RENDER] themes/public/home
INFO - 2026-03-25 00:39:38 --> [REQ_ID=d5a2d6d3175d] [MEMORY][commonData:start] 10485760
INFO - 2026-03-25 00:39:38 --> themesMemory usage: 10485760
DEBUG - 2026-03-25 00:39:38 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-25 00:39:38 --> [REQ_ID=f736790029b1] [FILTER_AFTER]
DEBUG - 2026-03-25 00:39:38 --> [REQ_ID=f736790029b1] [LIFECYCLE][END] status=200 duration_ms=717.20 memory_delta=4194304
INFO - 2026-03-25 00:39:38 --> [REQ_ID=d5a2d6d3175d] [PERF] Execution time=0.711959
DEBUG - 2026-03-25 00:39:38 --> [REQ_ID=f736790029b1] [REQUEST][END]
INFO - 2026-03-25 00:39:38 --> [REQ_ID=f736790029b1] [PERF] Execution time=0.762093
DEBUG - 2026-03-25 00:41:22 --> [REQ_ID=cd8d88177af7] [REQUEST][START] HEAD /
DEBUG - 2026-03-25 00:41:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-25 00:41:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-25 00:41:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-25 00:41:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-25 00:41:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-25 00:46:22 --> [REQ_ID=6cd78c3bae97] [REQUEST][START] HEAD /
DEBUG - 2026-03-25 00:46:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-25 00:46:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-25 00:46:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-25 00:46:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-25 00:46:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-25 00:47:02 --> [REQ_ID=5b95e5886f78] [REQUEST][START] GET /
DEBUG - 2026-03-25 00:47:02 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-25 00:47:02 --> [REQ_ID=5b95e5886f78] [FILTER_BEFORE] /
DEBUG - 2026-03-25 00:47:02 --> [REQ_ID=5b95e5886f78] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-25 00:47:02 --> [REQ_ID=5b95e5886f78] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-25 00:47:02 --> [CSRF] token name=csrf_test_name hash=2651e68d7291c1b4331f675e18efdcd2
DEBUG - 2026-03-25 00:47:02 --> [REQ_ID=2cefcc369316] [INIT] App\Controllers\Home::GET
INFO - 2026-03-25 00:47:02 --> [REQ_ID=2cefcc369316] [MEMORY][controller-start] 4194304
INFO - 2026-03-25 00:47:02 --> [REQ_ID=2cefcc369316] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-25 00:47:02 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-25 00:47:03 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
DEBUG - 2026-03-25 00:47:03 --> [REQ_ID=2cefcc369316] [VIEW_RENDER] themes/public/home
INFO - 2026-03-25 00:47:03 --> [REQ_ID=2cefcc369316] [MEMORY][commonData:start] 8388608
INFO - 2026-03-25 00:47:03 --> themesMemory usage: 8388608
DEBUG - 2026-03-25 00:47:03 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-25 00:47:03 --> [REQ_ID=5b95e5886f78] [FILTER_AFTER]
DEBUG - 2026-03-25 00:47:03 --> [REQ_ID=5b95e5886f78] [LIFECYCLE][END] status=200 duration_ms=690.14 memory_delta=4194304
INFO - 2026-03-25 00:47:03 --> [REQ_ID=2cefcc369316] [PERF] Execution time=0.688199
DEBUG - 2026-03-25 00:47:03 --> [REQ_ID=5b95e5886f78] [REQUEST][END]
INFO - 2026-03-25 00:47:03 --> [REQ_ID=5b95e5886f78] [PERF] Execution time=0.710021
DEBUG - 2026-03-25 00:51:22 --> [REQ_ID=fb9141837e42] [REQUEST][START] HEAD /
DEBUG - 2026-03-25 00:51:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-25 00:51:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-25 00:51:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-25 00:51:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-25 00:51:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-25 00:56:22 --> [REQ_ID=99a33be6f696] [REQUEST][START] HEAD /
DEBUG - 2026-03-25 00:56:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-25 00:56:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-25 00:56:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-25 00:56:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-25 00:56:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-25 00:57:19 --> [REQ_ID=b1dffd62130b] [REQUEST][START] GET /index.php
DEBUG - 2026-03-25 00:57:19 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-25 00:57:19 --> [REQ_ID=b1dffd62130b] [REQUEST][END]
INFO - 2026-03-25 00:57:19 --> [REQ_ID=b1dffd62130b] [PERF] Execution time=0.018544
DEBUG - 2026-03-25 01:00:01 --> [REQ_ID=3a5e4ccc3ce7] [REQUEST][START] GET /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-25 01:00:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-25 01:00:01 --> [REQ_ID=3a5e4ccc3ce7] [FILTER_BEFORE] /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-25 01:00:01 --> [REQ_ID=3a5e4ccc3ce7] [ROUTE] Controller=\App\Modules\Management\Controllers\ManagementAPIController Method=Run_CRON_Tasks
DEBUG - 2026-03-25 01:00:01 --> [REQ_ID=3a5e4ccc3ce7] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-25 01:00:01 --> [REQ_ID=3a5e4ccc3ce7] [REQUEST][END]
INFO - 2026-03-25 01:00:01 --> [REQ_ID=3a5e4ccc3ce7] [PERF] Execution time=0.069757
DEBUG - 2026-03-25 01:01:22 --> [REQ_ID=0ee2d783895d] [REQUEST][START] HEAD /
DEBUG - 2026-03-25 01:01:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-25 01:01:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-25 01:01:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-25 01:01:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-25 01:01:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-25 01:06:22 --> [REQ_ID=42fe5dd35592] [REQUEST][START] HEAD /
DEBUG - 2026-03-25 01:06:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-25 01:06:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-25 01:06:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-25 01:06:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-25 01:06:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-25 01:11:22 --> [REQ_ID=4e881386d31d] [REQUEST][START] HEAD /
DEBUG - 2026-03-25 01:11:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-25 01:11:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-25 01:11:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-25 01:11:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-25 01:11:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-25 01:15:01 --> [REQ_ID=3d806ef50964] [REQUEST][START] GET /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-25 01:15:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-25 01:15:01 --> [REQ_ID=3d806ef50964] [FILTER_BEFORE] /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-25 01:15:01 --> [REQ_ID=3d806ef50964] [ROUTE] Controller=\App\Modules\APIs\Controllers\AlertsAPIController Method=fetchEmailAlerts
DEBUG - 2026-03-25 01:15:01 --> [REQ_ID=3d806ef50964] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-25 01:15:01 --> [REQ_ID=3d806ef50964] [REQUEST][END]
INFO - 2026-03-25 01:15:01 --> [REQ_ID=3d806ef50964] [PERF] Execution time=0.046184
DEBUG - 2026-03-25 01:15:21 --> [REQ_ID=94e3b52b9c17] [REQUEST][START] GET /
DEBUG - 2026-03-25 01:15:21 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-25 01:15:21 --> [REQ_ID=94e3b52b9c17] [REQUEST][END]
INFO - 2026-03-25 01:15:21 --> [REQ_ID=94e3b52b9c17] [PERF] Execution time=0.010187
DEBUG - 2026-03-25 01:16:22 --> [REQ_ID=d3adc8e2b09e] [REQUEST][START] HEAD /
DEBUG - 2026-03-25 01:16:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-25 01:16:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-25 01:16:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-25 01:16:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-25 01:16:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-25 01:21:22 --> [REQ_ID=517bc87be38a] [REQUEST][START] HEAD /
DEBUG - 2026-03-25 01:21:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-25 01:21:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-25 01:21:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-25 01:21:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-25 01:21:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-25 01:23:52 --> [REQ_ID=205e51e030d6] [REQUEST][START] GET /
DEBUG - 2026-03-25 01:23:52 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-25 01:23:52 --> [REQ_ID=205e51e030d6] [FILTER_BEFORE] /
DEBUG - 2026-03-25 01:23:52 --> [REQ_ID=205e51e030d6] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-25 01:23:52 --> [REQ_ID=205e51e030d6] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-25 01:23:52 --> [CSRF] token name=csrf_test_name hash=ee8e4b6f84266efbd484e661731e5a9e
DEBUG - 2026-03-25 01:23:52 --> [REQ_ID=229e1e83f824] [INIT] App\Controllers\Home::GET
INFO - 2026-03-25 01:23:52 --> [REQ_ID=229e1e83f824] [MEMORY][controller-start] 6291456
INFO - 2026-03-25 01:23:52 --> [REQ_ID=229e1e83f824] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-25 01:23:52 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-25 01:23:53 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-03-25 01:23:53 --> [REQ_ID=229e1e83f824] [VIEW_RENDER] themes/public/home
INFO - 2026-03-25 01:23:53 --> [REQ_ID=229e1e83f824] [MEMORY][commonData:start] 10485760
INFO - 2026-03-25 01:23:53 --> themesMemory usage: 10485760
DEBUG - 2026-03-25 01:23:53 --> [MetaService] slug= pageName=Home cacheHit= path=DB
DEBUG - 2026-03-25 01:23:53 --> [REQ_ID=205e51e030d6] [FILTER_AFTER]
DEBUG - 2026-03-25 01:23:53 --> [REQ_ID=205e51e030d6] [LIFECYCLE][END] status=200 duration_ms=634.86 memory_delta=4194304
INFO - 2026-03-25 01:23:53 --> [REQ_ID=229e1e83f824] [PERF] Execution time=0.632880
DEBUG - 2026-03-25 01:23:53 --> [REQ_ID=205e51e030d6] [REQUEST][END]
INFO - 2026-03-25 01:23:53 --> [REQ_ID=205e51e030d6] [PERF] Execution time=0.673227
DEBUG - 2026-03-25 01:26:22 --> [REQ_ID=957aa42272f0] [REQUEST][START] HEAD /
DEBUG - 2026-03-25 01:26:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-25 01:26:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-25 01:26:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-25 01:26:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-25 01:26:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-25 01:29:30 --> [REQ_ID=7c591b105daf] [REQUEST][START] GET /
DEBUG - 2026-03-25 01:29:30 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-25 01:29:30 --> [REQ_ID=7c591b105daf] [FILTER_BEFORE] /
DEBUG - 2026-03-25 01:29:30 --> [REQ_ID=7c591b105daf] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-25 01:29:30 --> [REQ_ID=7c591b105daf] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-25 01:29:30 --> [CSRF] token name=csrf_test_name hash=9f4502a853b56ee2ac1d451960a951aa
DEBUG - 2026-03-25 01:29:30 --> [REQ_ID=30228dab6cdb] [INIT] App\Controllers\Home::GET
INFO - 2026-03-25 01:29:30 --> [REQ_ID=30228dab6cdb] [MEMORY][controller-start] 6291456
INFO - 2026-03-25 01:29:30 --> [REQ_ID=30228dab6cdb] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-25 01:29:30 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-25 01:29:30 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
DEBUG - 2026-03-25 01:29:30 --> [REQ_ID=30228dab6cdb] [VIEW_RENDER] themes/public/home
INFO - 2026-03-25 01:29:30 --> [REQ_ID=30228dab6cdb] [MEMORY][commonData:start] 10485760
INFO - 2026-03-25 01:29:30 --> themesMemory usage: 10485760
DEBUG - 2026-03-25 01:29:30 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-25 01:29:30 --> [REQ_ID=7c591b105daf] [FILTER_AFTER]
DEBUG - 2026-03-25 01:29:30 --> [REQ_ID=7c591b105daf] [LIFECYCLE][END] status=200 duration_ms=581.92 memory_delta=4194304
INFO - 2026-03-25 01:29:30 --> [REQ_ID=30228dab6cdb] [PERF] Execution time=0.580152
DEBUG - 2026-03-25 01:29:30 --> [REQ_ID=7c591b105daf] [REQUEST][END]
INFO - 2026-03-25 01:29:30 --> [REQ_ID=7c591b105daf] [PERF] Execution time=0.623201
DEBUG - 2026-03-25 01:29:33 --> [REQ_ID=b249fd21f733] [REQUEST][START] GET /index.php/How-It-Works/Investment-Dashboard
DEBUG - 2026-03-25 01:29:33 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-25 01:29:33 --> [REQ_ID=b249fd21f733] [FILTER_BEFORE] /index.php/How-It-Works/Investment-Dashboard
DEBUG - 2026-03-25 01:29:33 --> [REQ_ID=b249fd21f733] [ROUTE] Controller=\App\Modules\Blog\Controllers\HowItWorksController Method=show
DEBUG - 2026-03-25 01:29:33 --> [REQ_ID=b249fd21f733] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/How-It-Works/Investment-Dashboard
DEBUG - 2026-03-25 01:29:33 --> [CSRF] token name=csrf_test_name hash=9f4502a853b56ee2ac1d451960a951aa
DEBUG - 2026-03-25 01:29:33 --> [REQ_ID=b3be0e53e692] [INIT] App\Modules\Blog\Controllers\HowItWorksController::GET
INFO - 2026-03-25 01:29:33 --> [REQ_ID=b3be0e53e692] [MEMORY][controller-start] 6291456
DEBUG - 2026-03-25 01:29:33 --> [REQ_ID=b3be0e53e692] [METHOD_ENTRY] show
DEBUG - 2026-03-25 01:29:33 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-25 01:29:33 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-25 01:29:33 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-25 01:29:33 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-25 01:29:33 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-25 01:29:33 --> MyMICoin: guest context detected; skipping user-specific preload.
INFO - 2026-03-25 01:29:33 --> [REQ_ID=b3be0e53e692] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-25 01:29:34 --> [REQ_ID=b249fd21f733] [FILTER_AFTER]
DEBUG - 2026-03-25 01:29:34 --> [REQ_ID=b249fd21f733] [LIFECYCLE][END] status=200 duration_ms=490.39 memory_delta=2097152
INFO - 2026-03-25 01:29:34 --> [REQ_ID=b3be0e53e692] [PERF] Execution time=0.490317
DEBUG - 2026-03-25 01:29:34 --> [REQ_ID=b249fd21f733] [REQUEST][END]
INFO - 2026-03-25 01:29:34 --> [REQ_ID=b249fd21f733] [PERF] Execution time=0.504397
DEBUG - 2026-03-25 01:31:22 --> [REQ_ID=3fab77423fc5] [REQUEST][START] HEAD /
DEBUG - 2026-03-25 01:31:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-25 01:31:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-25 01:31:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-25 01:31:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-25 01:31:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-25 01:36:22 --> [REQ_ID=6517b70c013c] [REQUEST][START] HEAD /
DEBUG - 2026-03-25 01:36:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-25 01:36:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-25 01:36:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-25 01:36:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-25 01:36:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-25 01:41:22 --> [REQ_ID=d8198842b998] [REQUEST][START] HEAD /
DEBUG - 2026-03-25 01:41:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-25 01:41:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-25 01:41:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-25 01:41:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-25 01:41:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-25 01:46:22 --> [REQ_ID=a4839047e514] [REQUEST][START] HEAD /
DEBUG - 2026-03-25 01:46:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-25 01:46:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-25 01:46:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-25 01:46:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-25 01:46:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-25 01:51:22 --> [REQ_ID=c29090349f19] [REQUEST][START] HEAD /
DEBUG - 2026-03-25 01:51:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-25 01:51:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-25 01:51:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-25 01:51:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-25 01:51:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-25 01:56:22 --> [REQ_ID=57393cd59cbc] [REQUEST][START] HEAD /
DEBUG - 2026-03-25 01:56:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-25 01:56:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-25 01:56:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-25 01:56:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-25 01:56:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-25 01:56:27 --> [REQ_ID=af924cacecd2] [REQUEST][START] GET /index.php/Legal/Terms-And-Conditions
DEBUG - 2026-03-25 01:56:27 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-25 01:56:27 --> [REQ_ID=af924cacecd2] [FILTER_BEFORE] /index.php/Legal/Terms-And-Conditions
DEBUG - 2026-03-25 01:56:27 --> [REQ_ID=af924cacecd2] [ROUTE] Controller=\App\Controllers\Home Method=terms
DEBUG - 2026-03-25 01:56:27 --> [REQ_ID=af924cacecd2] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Legal/Terms-And-Conditions
DEBUG - 2026-03-25 01:56:27 --> [CSRF] token name=csrf_test_name hash=e2bed93cbdd1c45713f1369b75db6bca
DEBUG - 2026-03-25 01:56:27 --> [REQ_ID=af924cacecd2] [REQUEST][END]
INFO - 2026-03-25 01:56:27 --> [REQ_ID=af924cacecd2] [PERF] Execution time=0.038561
DEBUG - 2026-03-25 01:56:27 --> [REQ_ID=e77b32d82162] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-25 01:56:27 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-25 01:56:27 --> [REQ_ID=e77b32d82162] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-25 01:56:27 --> [REQ_ID=e77b32d82162] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-25 01:56:27 --> [REQ_ID=e77b32d82162] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-25 01:56:27 --> [CSRF] token name=csrf_test_name hash=5320b32a551dff7c45aef477abc5d32e
DEBUG - 2026-03-25 01:56:27 --> [REQ_ID=a43db684f53e] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-25 01:56:27 --> [REQ_ID=a43db684f53e] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-25 01:56:27 --> [REQ_ID=e77b32d82162] [FILTER_AFTER]
DEBUG - 2026-03-25 01:56:27 --> [REQ_ID=e77b32d82162] [LIFECYCLE][END] status=200 duration_ms=29.10 memory_delta=0
INFO - 2026-03-25 01:56:27 --> [REQ_ID=a43db684f53e] [PERF] Execution time=0.028873
DEBUG - 2026-03-25 01:56:27 --> [REQ_ID=e77b32d82162] [REQUEST][END]
INFO - 2026-03-25 01:56:27 --> [REQ_ID=e77b32d82162] [PERF] Execution time=0.040969
DEBUG - 2026-03-25 02:00:01 --> [REQ_ID=6cc8e630ec22] [REQUEST][START] GET /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-25 02:00:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-25 02:00:01 --> [REQ_ID=6cc8e630ec22] [FILTER_BEFORE] /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-25 02:00:01 --> [REQ_ID=6cc8e630ec22] [ROUTE] Controller=\App\Modules\Management\Controllers\ManagementAPIController Method=Run_CRON_Tasks
DEBUG - 2026-03-25 02:00:01 --> [REQ_ID=6cc8e630ec22] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-25 02:00:01 --> [REQ_ID=6cc8e630ec22] [REQUEST][END]
INFO - 2026-03-25 02:00:01 --> [REQ_ID=6cc8e630ec22] [PERF] Execution time=0.048235
DEBUG - 2026-03-25 02:01:22 --> [REQ_ID=17ff5b3a94d9] [REQUEST][START] HEAD /
DEBUG - 2026-03-25 02:01:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-25 02:01:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-25 02:01:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-25 02:01:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-25 02:01:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-25 02:06:22 --> [REQ_ID=92a383f34fa3] [REQUEST][START] HEAD /
DEBUG - 2026-03-25 02:06:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-25 02:06:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-25 02:06:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-25 02:06:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-25 02:06:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-25 02:11:22 --> [REQ_ID=0c70f281b55c] [REQUEST][START] HEAD /
DEBUG - 2026-03-25 02:11:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-25 02:11:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-25 02:11:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-25 02:11:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-25 02:11:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-25 02:15:01 --> [REQ_ID=347530f51f83] [REQUEST][START] GET /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-25 02:15:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-25 02:15:01 --> [REQ_ID=347530f51f83] [FILTER_BEFORE] /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-25 02:15:01 --> [REQ_ID=347530f51f83] [ROUTE] Controller=\App\Modules\APIs\Controllers\AlertsAPIController Method=fetchEmailAlerts
DEBUG - 2026-03-25 02:15:01 --> [REQ_ID=347530f51f83] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-25 02:15:01 --> [REQ_ID=347530f51f83] [REQUEST][END]
INFO - 2026-03-25 02:15:01 --> [REQ_ID=347530f51f83] [PERF] Execution time=0.068236
DEBUG - 2026-03-25 02:16:22 --> [REQ_ID=2540356ae357] [REQUEST][START] HEAD /
DEBUG - 2026-03-25 02:16:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-25 02:16:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-25 02:16:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-25 02:16:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-25 02:16:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-25 02:21:22 --> [REQ_ID=3ee9a508c9ff] [REQUEST][START] HEAD /
DEBUG - 2026-03-25 02:21:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-25 02:21:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-25 02:21:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-25 02:21:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-25 02:21:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-25 02:26:22 --> [REQ_ID=d5a2ecaff2e7] [REQUEST][START] HEAD /
DEBUG - 2026-03-25 02:26:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-25 02:26:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-25 02:26:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-25 02:26:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-25 02:26:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-25 02:31:22 --> [REQ_ID=837d258dd476] [REQUEST][START] HEAD /
DEBUG - 2026-03-25 02:31:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-25 02:31:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-25 02:31:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-25 02:31:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-25 02:31:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-25 02:36:22 --> [REQ_ID=a23ff57faa41] [REQUEST][START] HEAD /
DEBUG - 2026-03-25 02:36:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-25 02:36:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-25 02:36:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-25 02:36:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-25 02:36:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-25 02:41:22 --> [REQ_ID=9df2a8d2a05d] [REQUEST][START] HEAD /
DEBUG - 2026-03-25 02:41:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-25 02:41:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-25 02:41:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-25 02:41:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-25 02:41:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-25 02:46:22 --> [REQ_ID=9cecb1f69d6e] [REQUEST][START] HEAD /
DEBUG - 2026-03-25 02:46:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-25 02:46:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-25 02:46:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-25 02:46:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-25 02:46:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-25 02:49:28 --> [REQ_ID=cb2d684b79c6] [REQUEST][START] GET /
DEBUG - 2026-03-25 02:49:28 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-25 02:49:28 --> [REQ_ID=cb2d684b79c6] [FILTER_BEFORE] /
DEBUG - 2026-03-25 02:49:28 --> [REQ_ID=cb2d684b79c6] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-25 02:49:28 --> [REQ_ID=cb2d684b79c6] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-25 02:49:28 --> [CSRF] token name=csrf_test_name hash=904947565563e422e7943d163b9a4d7d
DEBUG - 2026-03-25 02:49:28 --> [REQ_ID=0297c306d519] [INIT] App\Controllers\Home::GET
INFO - 2026-03-25 02:49:28 --> [REQ_ID=0297c306d519] [MEMORY][controller-start] 6291456
INFO - 2026-03-25 02:49:29 --> [REQ_ID=0297c306d519] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-25 02:49:29 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-25 02:49:29 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-03-25 02:49:29 --> [REQ_ID=0297c306d519] [VIEW_RENDER] themes/public/home
INFO - 2026-03-25 02:49:29 --> [REQ_ID=0297c306d519] [MEMORY][commonData:start] 10485760
INFO - 2026-03-25 02:49:29 --> themesMemory usage: 10485760
DEBUG - 2026-03-25 02:49:29 --> [MetaService] slug= pageName=Home cacheHit= path=DB
DEBUG - 2026-03-25 02:49:29 --> [REQ_ID=cb2d684b79c6] [FILTER_AFTER]
DEBUG - 2026-03-25 02:49:29 --> [REQ_ID=cb2d684b79c6] [LIFECYCLE][END] status=200 duration_ms=842.99 memory_delta=4194304
INFO - 2026-03-25 02:49:29 --> [REQ_ID=0297c306d519] [PERF] Execution time=0.840924
DEBUG - 2026-03-25 02:49:29 --> [REQ_ID=cb2d684b79c6] [REQUEST][END]
INFO - 2026-03-25 02:49:29 --> [REQ_ID=cb2d684b79c6] [PERF] Execution time=0.883047
DEBUG - 2026-03-25 02:51:22 --> [REQ_ID=e8c1757bd5f8] [REQUEST][START] HEAD /
DEBUG - 2026-03-25 02:51:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-25 02:51:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-25 02:51:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-25 02:51:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-25 02:51:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-25 02:56:22 --> [REQ_ID=dc6ea966a0c7] [REQUEST][START] HEAD /
DEBUG - 2026-03-25 02:56:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-25 02:56:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-25 02:56:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-25 02:56:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-25 02:56:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-25 03:00:01 --> [REQ_ID=6898e02a0c4e] [REQUEST][START] GET /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-25 03:00:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-25 03:00:01 --> [REQ_ID=6898e02a0c4e] [FILTER_BEFORE] /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-25 03:00:01 --> [REQ_ID=6898e02a0c4e] [ROUTE] Controller=\App\Modules\Management\Controllers\ManagementAPIController Method=Run_CRON_Tasks
DEBUG - 2026-03-25 03:00:01 --> [REQ_ID=6898e02a0c4e] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-25 03:00:01 --> [REQ_ID=6898e02a0c4e] [REQUEST][END]
INFO - 2026-03-25 03:00:01 --> [REQ_ID=6898e02a0c4e] [PERF] Execution time=0.050169
DEBUG - 2026-03-25 03:00:32 --> [REQ_ID=c4f937ea9dea] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-25 03:00:32 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-25 03:00:32 --> [REQ_ID=c4f937ea9dea] [REQUEST][END]
INFO - 2026-03-25 03:00:32 --> [REQ_ID=c4f937ea9dea] [PERF] Execution time=0.021860
DEBUG - 2026-03-25 03:01:22 --> [REQ_ID=65f02609f9fb] [REQUEST][START] HEAD /
DEBUG - 2026-03-25 03:01:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-25 03:01:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-25 03:01:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-25 03:01:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-25 03:01:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-25 03:06:22 --> [REQ_ID=5dfcbdf741a9] [REQUEST][START] HEAD /
DEBUG - 2026-03-25 03:06:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-25 03:06:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-25 03:06:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-25 03:06:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-25 03:06:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-25 03:11:22 --> [REQ_ID=fbfcd8cbee6e] [REQUEST][START] HEAD /
DEBUG - 2026-03-25 03:11:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-25 03:11:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-25 03:11:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-25 03:11:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-25 03:11:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-25 03:15:01 --> [REQ_ID=12877f07a92c] [REQUEST][START] GET /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-25 03:15:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-25 03:15:01 --> [REQ_ID=12877f07a92c] [FILTER_BEFORE] /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-25 03:15:01 --> [REQ_ID=12877f07a92c] [ROUTE] Controller=\App\Modules\APIs\Controllers\AlertsAPIController Method=fetchEmailAlerts
DEBUG - 2026-03-25 03:15:01 --> [REQ_ID=12877f07a92c] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-25 03:15:01 --> [REQ_ID=12877f07a92c] [REQUEST][END]
INFO - 2026-03-25 03:15:01 --> [REQ_ID=12877f07a92c] [PERF] Execution time=0.050728
DEBUG - 2026-03-25 03:16:22 --> [REQ_ID=22f8a0102264] [REQUEST][START] HEAD /
DEBUG - 2026-03-25 03:16:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-25 03:16:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-25 03:16:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-25 03:16:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-25 03:16:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-25 03:21:22 --> [REQ_ID=c40d6eef31a3] [REQUEST][START] HEAD /
DEBUG - 2026-03-25 03:21:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-25 03:21:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-25 03:21:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-25 03:21:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-25 03:21:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-25 03:26:22 --> [REQ_ID=9c9bc22023b8] [REQUEST][START] HEAD /
DEBUG - 2026-03-25 03:26:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-25 03:26:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-25 03:26:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-25 03:26:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-25 03:26:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-25 03:27:13 --> [REQ_ID=f48d6e5c4921] [REQUEST][START] GET /
DEBUG - 2026-03-25 03:27:13 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-25 03:27:13 --> [REQ_ID=f48d6e5c4921] [FILTER_BEFORE] /
DEBUG - 2026-03-25 03:27:13 --> [REQ_ID=f48d6e5c4921] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-25 03:27:13 --> [REQ_ID=f48d6e5c4921] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-25 03:27:13 --> [CSRF] token name=csrf_test_name hash=dedc5f2c649aba758346bb793e19d0d6
DEBUG - 2026-03-25 03:27:13 --> [REQ_ID=7909d7e7fcba] [INIT] App\Controllers\Home::GET
INFO - 2026-03-25 03:27:13 --> [REQ_ID=7909d7e7fcba] [MEMORY][controller-start] 4194304
INFO - 2026-03-25 03:27:13 --> [REQ_ID=7909d7e7fcba] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-25 03:27:13 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-25 03:27:14 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-03-25 03:27:14 --> [REQ_ID=7909d7e7fcba] [VIEW_RENDER] themes/public/home
INFO - 2026-03-25 03:27:14 --> [REQ_ID=7909d7e7fcba] [MEMORY][commonData:start] 8388608
INFO - 2026-03-25 03:27:14 --> themesMemory usage: 8388608
DEBUG - 2026-03-25 03:27:14 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-25 03:27:14 --> [REQ_ID=f48d6e5c4921] [FILTER_AFTER]
DEBUG - 2026-03-25 03:27:14 --> [REQ_ID=f48d6e5c4921] [LIFECYCLE][END] status=200 duration_ms=891.66 memory_delta=4194304
INFO - 2026-03-25 03:27:14 --> [REQ_ID=7909d7e7fcba] [PERF] Execution time=0.889669
DEBUG - 2026-03-25 03:27:14 --> [REQ_ID=f48d6e5c4921] [REQUEST][END]
INFO - 2026-03-25 03:27:14 --> [REQ_ID=f48d6e5c4921] [PERF] Execution time=0.910967
DEBUG - 2026-03-25 03:31:22 --> [REQ_ID=3ea0acdf1c0c] [REQUEST][START] HEAD /
DEBUG - 2026-03-25 03:31:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-25 03:31:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-25 03:31:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-25 03:31:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-25 03:31:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-25 03:36:22 --> [REQ_ID=87335f48443c] [REQUEST][START] HEAD /
DEBUG - 2026-03-25 03:36:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-25 03:36:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-25 03:36:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-25 03:36:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-25 03:36:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-25 03:41:22 --> [REQ_ID=b3a0a2cdfe12] [REQUEST][START] HEAD /
DEBUG - 2026-03-25 03:41:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-25 03:41:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-25 03:41:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-25 03:41:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-25 03:41:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-25 03:44:18 --> [REQ_ID=b320964c4a4f] [REQUEST][START] GET /
DEBUG - 2026-03-25 03:44:18 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-25 03:44:18 --> [REQ_ID=b320964c4a4f] [FILTER_BEFORE] /
DEBUG - 2026-03-25 03:44:18 --> [REQ_ID=b320964c4a4f] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-25 03:44:18 --> [REQ_ID=b320964c4a4f] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-25 03:44:18 --> [CSRF] token name=csrf_test_name hash=226046cf8cc54d0a9324c38a6f093dc7
DEBUG - 2026-03-25 03:44:18 --> [REQ_ID=fc723c33968d] [INIT] App\Controllers\Home::GET
INFO - 2026-03-25 03:44:18 --> [REQ_ID=fc723c33968d] [MEMORY][controller-start] 6291456
INFO - 2026-03-25 03:44:18 --> [REQ_ID=fc723c33968d] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-25 03:44:18 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-25 03:44:18 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-03-25 03:44:18 --> [REQ_ID=fc723c33968d] [VIEW_RENDER] themes/public/home
INFO - 2026-03-25 03:44:18 --> [REQ_ID=fc723c33968d] [MEMORY][commonData:start] 10485760
INFO - 2026-03-25 03:44:18 --> themesMemory usage: 10485760
DEBUG - 2026-03-25 03:44:18 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-25 03:44:18 --> [REQ_ID=b320964c4a4f] [FILTER_AFTER]
DEBUG - 2026-03-25 03:44:18 --> [REQ_ID=b320964c4a4f] [LIFECYCLE][END] status=200 duration_ms=689.56 memory_delta=4194304
INFO - 2026-03-25 03:44:18 --> [REQ_ID=fc723c33968d] [PERF] Execution time=0.687647
DEBUG - 2026-03-25 03:44:18 --> [REQ_ID=b320964c4a4f] [REQUEST][END]
INFO - 2026-03-25 03:44:18 --> [REQ_ID=b320964c4a4f] [PERF] Execution time=0.729277
DEBUG - 2026-03-25 03:46:22 --> [REQ_ID=9179ec4aa32f] [REQUEST][START] HEAD /
DEBUG - 2026-03-25 03:46:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-25 03:46:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-25 03:46:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-25 03:46:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-25 03:46:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-25 03:51:22 --> [REQ_ID=5830fb57dbf3] [REQUEST][START] HEAD /
DEBUG - 2026-03-25 03:51:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-25 03:51:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-25 03:51:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-25 03:51:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-25 03:51:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-25 03:56:22 --> [REQ_ID=9670ec24d8f1] [REQUEST][START] HEAD /
DEBUG - 2026-03-25 03:56:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-25 03:56:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-25 03:56:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-25 03:56:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-25 03:56:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-25 04:00:01 --> [REQ_ID=576bb07db84e] [REQUEST][START] GET /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-25 04:00:02 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-25 04:00:02 --> [REQ_ID=576bb07db84e] [FILTER_BEFORE] /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-25 04:00:02 --> [REQ_ID=576bb07db84e] [ROUTE] Controller=\App\Modules\Management\Controllers\ManagementAPIController Method=Run_CRON_Tasks
DEBUG - 2026-03-25 04:00:02 --> [REQ_ID=576bb07db84e] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-25 04:00:02 --> [REQ_ID=576bb07db84e] [REQUEST][END]
INFO - 2026-03-25 04:00:02 --> [REQ_ID=576bb07db84e] [PERF] Execution time=0.087916
DEBUG - 2026-03-25 04:00:50 --> [REQ_ID=f3158ee91538] [REQUEST][START] GET /index.php/Getting-Started
DEBUG - 2026-03-25 04:00:50 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-25 04:00:50 --> [REQ_ID=f3158ee91538] [REQUEST][END]
INFO - 2026-03-25 04:00:50 --> [REQ_ID=f3158ee91538] [PERF] Execution time=0.014423
DEBUG - 2026-03-25 04:01:22 --> [REQ_ID=10dfd5c29a11] [REQUEST][START] HEAD /
DEBUG - 2026-03-25 04:01:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-25 04:01:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-25 04:01:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-25 04:01:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-25 04:01:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-25 04:06:22 --> [REQ_ID=b74bfd1d39ff] [REQUEST][START] HEAD /
DEBUG - 2026-03-25 04:06:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-25 04:06:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-25 04:06:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-25 04:06:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-25 04:06:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-25 04:11:22 --> [REQ_ID=8df02c3b38b9] [REQUEST][START] HEAD /
DEBUG - 2026-03-25 04:11:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-25 04:11:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-25 04:11:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-25 04:11:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-25 04:11:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-25 04:15:01 --> [REQ_ID=bd2cf46f9f74] [REQUEST][START] GET /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-25 04:15:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-25 04:15:01 --> [REQ_ID=bd2cf46f9f74] [FILTER_BEFORE] /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-25 04:15:01 --> [REQ_ID=bd2cf46f9f74] [ROUTE] Controller=\App\Modules\APIs\Controllers\AlertsAPIController Method=fetchEmailAlerts
DEBUG - 2026-03-25 04:15:01 --> [REQ_ID=bd2cf46f9f74] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-25 04:15:01 --> [REQ_ID=bd2cf46f9f74] [REQUEST][END]
INFO - 2026-03-25 04:15:01 --> [REQ_ID=bd2cf46f9f74] [PERF] Execution time=0.046991
DEBUG - 2026-03-25 04:16:20 --> [REQ_ID=22c176cea7a5] [REQUEST][START] GET /
DEBUG - 2026-03-25 04:16:20 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-25 04:16:20 --> [REQ_ID=22c176cea7a5] [FILTER_BEFORE] /
DEBUG - 2026-03-25 04:16:20 --> [REQ_ID=22c176cea7a5] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-25 04:16:20 --> [REQ_ID=22c176cea7a5] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-25 04:16:20 --> [CSRF] token name=csrf_test_name hash=001a6de49381e693bef18adb59240ad5
DEBUG - 2026-03-25 04:16:20 --> [REQ_ID=72d33c9bf5a9] [INIT] App\Controllers\Home::GET
INFO - 2026-03-25 04:16:20 --> [REQ_ID=72d33c9bf5a9] [MEMORY][controller-start] 6291456
INFO - 2026-03-25 04:16:21 --> [REQ_ID=72d33c9bf5a9] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-25 04:16:21 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-25 04:16:21 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-03-25 04:16:21 --> [REQ_ID=72d33c9bf5a9] [VIEW_RENDER] themes/public/home
INFO - 2026-03-25 04:16:21 --> [REQ_ID=72d33c9bf5a9] [MEMORY][commonData:start] 10485760
INFO - 2026-03-25 04:16:21 --> themesMemory usage: 10485760
DEBUG - 2026-03-25 04:16:21 --> [MetaService] slug= pageName=Home cacheHit= path=DB
DEBUG - 2026-03-25 04:16:21 --> [REQ_ID=22c176cea7a5] [FILTER_AFTER]
DEBUG - 2026-03-25 04:16:21 --> [REQ_ID=22c176cea7a5] [LIFECYCLE][END] status=200 duration_ms=826.16 memory_delta=4194304
INFO - 2026-03-25 04:16:21 --> [REQ_ID=72d33c9bf5a9] [PERF] Execution time=0.823200
DEBUG - 2026-03-25 04:16:21 --> [REQ_ID=22c176cea7a5] [REQUEST][END]
INFO - 2026-03-25 04:16:21 --> [REQ_ID=22c176cea7a5] [PERF] Execution time=0.879038
DEBUG - 2026-03-25 04:16:22 --> [REQ_ID=c8cf49cb5522] [REQUEST][START] HEAD /
DEBUG - 2026-03-25 04:16:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-25 04:16:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-25 04:16:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-25 04:16:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-25 04:16:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-25 04:16:35 --> [REQ_ID=821cf8f00575] [REQUEST][START] GET /
DEBUG - 2026-03-25 04:16:35 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-25 04:16:35 --> [REQ_ID=821cf8f00575] [FILTER_BEFORE] /
DEBUG - 2026-03-25 04:16:35 --> [REQ_ID=821cf8f00575] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-25 04:16:35 --> [REQ_ID=821cf8f00575] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-25 04:16:35 --> [CSRF] token name=csrf_test_name hash=58a66bce5165ccc143f45a8cb8b8a015
DEBUG - 2026-03-25 04:16:35 --> [REQ_ID=db0aabb892f9] [INIT] App\Controllers\Home::GET
INFO - 2026-03-25 04:16:35 --> [REQ_ID=db0aabb892f9] [MEMORY][controller-start] 4194304
INFO - 2026-03-25 04:16:35 --> [REQ_ID=db0aabb892f9] [MEMORY][commonData:start] 4194304
DEBUG - 2026-03-25 04:16:35 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-25 04:16:35 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
DEBUG - 2026-03-25 04:16:35 --> [REQ_ID=db0aabb892f9] [VIEW_RENDER] themes/public/home
INFO - 2026-03-25 04:16:35 --> [REQ_ID=db0aabb892f9] [MEMORY][commonData:start] 8388608
INFO - 2026-03-25 04:16:35 --> themesMemory usage: 8388608
DEBUG - 2026-03-25 04:16:35 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-25 04:16:35 --> [REQ_ID=821cf8f00575] [FILTER_AFTER]
DEBUG - 2026-03-25 04:16:35 --> [REQ_ID=821cf8f00575] [LIFECYCLE][END] status=200 duration_ms=549.00 memory_delta=4194304
INFO - 2026-03-25 04:16:35 --> [REQ_ID=db0aabb892f9] [PERF] Execution time=0.548927
DEBUG - 2026-03-25 04:16:35 --> [REQ_ID=821cf8f00575] [REQUEST][END]
INFO - 2026-03-25 04:16:35 --> [REQ_ID=821cf8f00575] [PERF] Execution time=0.559972
DEBUG - 2026-03-25 04:21:22 --> [REQ_ID=ef8dad73035f] [REQUEST][START] HEAD /
DEBUG - 2026-03-25 04:21:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-25 04:21:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-25 04:21:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-25 04:21:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-25 04:21:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-25 04:26:22 --> [REQ_ID=5a601dc102ed] [REQUEST][START] HEAD /
DEBUG - 2026-03-25 04:26:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-25 04:26:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-25 04:26:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-25 04:26:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-25 04:26:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-25 04:30:53 --> [REQ_ID=2b9ff08945e2] [REQUEST][START] GET /
DEBUG - 2026-03-25 04:30:53 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-25 04:30:53 --> [REQ_ID=2b9ff08945e2] [FILTER_BEFORE] /
DEBUG - 2026-03-25 04:30:53 --> [REQ_ID=2b9ff08945e2] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-25 04:30:53 --> [REQ_ID=2b9ff08945e2] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-25 04:30:53 --> [CSRF] token name=csrf_test_name hash=9bd18dd23ee3e98cbb300a08bfdff6a0
DEBUG - 2026-03-25 04:30:53 --> [REQ_ID=95483bf1ac4d] [INIT] App\Controllers\Home::GET
INFO - 2026-03-25 04:30:53 --> [REQ_ID=95483bf1ac4d] [MEMORY][controller-start] 6291456
INFO - 2026-03-25 04:30:53 --> [REQ_ID=95483bf1ac4d] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-25 04:30:53 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-25 04:30:54 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
DEBUG - 2026-03-25 04:30:54 --> [REQ_ID=95483bf1ac4d] [VIEW_RENDER] themes/public/home
INFO - 2026-03-25 04:30:54 --> [REQ_ID=95483bf1ac4d] [MEMORY][commonData:start] 10485760
INFO - 2026-03-25 04:30:54 --> themesMemory usage: 10485760
DEBUG - 2026-03-25 04:30:54 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-25 04:30:54 --> [REQ_ID=2b9ff08945e2] [FILTER_AFTER]
DEBUG - 2026-03-25 04:30:54 --> [REQ_ID=2b9ff08945e2] [LIFECYCLE][END] status=200 duration_ms=596.98 memory_delta=4194304
INFO - 2026-03-25 04:30:54 --> [REQ_ID=95483bf1ac4d] [PERF] Execution time=0.594798
DEBUG - 2026-03-25 04:30:54 --> [REQ_ID=2b9ff08945e2] [REQUEST][END]
INFO - 2026-03-25 04:30:54 --> [REQ_ID=2b9ff08945e2] [PERF] Execution time=0.635682
DEBUG - 2026-03-25 04:31:22 --> [REQ_ID=723ab1136b43] [REQUEST][START] HEAD /
DEBUG - 2026-03-25 04:31:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-25 04:31:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-25 04:31:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-25 04:31:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-25 04:31:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-25 04:36:22 --> [REQ_ID=48e77e63aeb8] [REQUEST][START] HEAD /
DEBUG - 2026-03-25 04:36:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-25 04:36:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-25 04:36:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-25 04:36:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-25 04:36:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-25 04:41:22 --> [REQ_ID=898ff2e30fe0] [REQUEST][START] HEAD /
DEBUG - 2026-03-25 04:41:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-25 04:41:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-25 04:41:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-25 04:41:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-25 04:41:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-25 04:42:19 --> [REQ_ID=fd89082b4cd5] [REQUEST][START] GET /index.php/How-It-Works/earnings
DEBUG - 2026-03-25 04:42:19 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-25 04:42:19 --> [REQ_ID=fd89082b4cd5] [REQUEST][END]
INFO - 2026-03-25 04:42:19 --> [REQ_ID=fd89082b4cd5] [PERF] Execution time=0.020853
DEBUG - 2026-03-25 04:46:22 --> [REQ_ID=ab6b95a228de] [REQUEST][START] HEAD /
DEBUG - 2026-03-25 04:46:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-25 04:46:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-25 04:46:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-25 04:46:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-25 04:46:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-25 04:51:22 --> [REQ_ID=731f431d86ce] [REQUEST][START] HEAD /
DEBUG - 2026-03-25 04:51:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-25 04:51:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-25 04:51:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-25 04:51:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-25 04:51:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-25 04:51:45 --> [REQ_ID=44348a2c4a6b] [REQUEST][START] GET /index.php/Management/Assets
DEBUG - 2026-03-25 04:51:45 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-25 04:51:45 --> [REQ_ID=44348a2c4a6b] [REQUEST][END]
INFO - 2026-03-25 04:51:45 --> [REQ_ID=44348a2c4a6b] [PERF] Execution time=0.022993
DEBUG - 2026-03-25 04:56:22 --> [REQ_ID=ec3090340791] [REQUEST][START] HEAD /
DEBUG - 2026-03-25 04:56:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-25 04:56:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-25 04:56:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-25 04:56:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-25 04:56:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-25 04:57:18 --> [REQ_ID=599b39294a96] [REQUEST][START] GET /index.php/Knowledgebase/Partner-Service-Agreement
DEBUG - 2026-03-25 04:57:18 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-25 04:57:18 --> ErrorException: Access level to App\Modules\User\Controllers\KnowledgebaseController::respondWithRendered() must be protected (as in class App\Controllers\BaseController) or weaker
[Method: GET, Route: Knowledgebase/Partner-Service-Agreement]
in APPPATH/Modules/User/Controllers/KnowledgebaseController.php on line 535.
 1 [internal function]: CodeIgniter\Debug\Exceptions->shutdownHandler()
CRITICAL - 2026-03-25 04:57:18 --> [EXCEPTION] Access level to App\Modules\User\Controllers\KnowledgebaseController::respondWithRendered() must be protected (as in class App\Controllers\BaseController) or weaker File=/home/mymiteam/mymiwallet/site/current/app/Modules/User/Controllers/KnowledgebaseController.php Line=535
ERROR - 2026-03-25 04:57:18 --> [ERROR_PAGE] event=error_500 status=500 message=Internal server error.
DEBUG - 2026-03-25 05:00:02 --> [REQ_ID=ac5c33e8ef47] [REQUEST][START] GET /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-25 05:00:02 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-25 05:00:02 --> [REQ_ID=ac5c33e8ef47] [FILTER_BEFORE] /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-25 05:00:02 --> [REQ_ID=ac5c33e8ef47] [ROUTE] Controller=\App\Modules\Management\Controllers\ManagementAPIController Method=Run_CRON_Tasks
DEBUG - 2026-03-25 05:00:02 --> [REQ_ID=ac5c33e8ef47] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-25 05:00:02 --> [REQ_ID=ac5c33e8ef47] [REQUEST][END]
INFO - 2026-03-25 05:00:02 --> [REQ_ID=ac5c33e8ef47] [PERF] Execution time=0.049079
DEBUG - 2026-03-25 05:00:52 --> [REQ_ID=1a9540453012] [REQUEST][START] GET /
DEBUG - 2026-03-25 05:00:52 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-25 05:00:52 --> [REQ_ID=1a9540453012] [FILTER_BEFORE] /
DEBUG - 2026-03-25 05:00:52 --> [REQ_ID=1a9540453012] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-25 05:00:52 --> [REQ_ID=1a9540453012] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-25 05:00:52 --> [CSRF] token name=csrf_test_name hash=4a1bad4236be11db8230fa441f3bb5bc
DEBUG - 2026-03-25 05:00:52 --> [REQ_ID=9025abb3306e] [INIT] App\Controllers\Home::GET
INFO - 2026-03-25 05:00:52 --> [REQ_ID=9025abb3306e] [MEMORY][controller-start] 4194304
INFO - 2026-03-25 05:00:52 --> [REQ_ID=9025abb3306e] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-25 05:00:52 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-25 05:00:53 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-03-25 05:00:53 --> [REQ_ID=9025abb3306e] [VIEW_RENDER] themes/public/home
INFO - 2026-03-25 05:00:53 --> [REQ_ID=9025abb3306e] [MEMORY][commonData:start] 8388608
INFO - 2026-03-25 05:00:53 --> themesMemory usage: 8388608
DEBUG - 2026-03-25 05:00:53 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-25 05:00:53 --> [REQ_ID=1a9540453012] [FILTER_AFTER]
DEBUG - 2026-03-25 05:00:53 --> [REQ_ID=1a9540453012] [LIFECYCLE][END] status=200 duration_ms=619.76 memory_delta=4194304
INFO - 2026-03-25 05:00:53 --> [REQ_ID=9025abb3306e] [PERF] Execution time=0.618373
DEBUG - 2026-03-25 05:00:53 --> [REQ_ID=1a9540453012] [REQUEST][END]
INFO - 2026-03-25 05:00:53 --> [REQ_ID=1a9540453012] [PERF] Execution time=0.633840
DEBUG - 2026-03-25 05:01:22 --> [REQ_ID=db46f137ffb9] [REQUEST][START] HEAD /
DEBUG - 2026-03-25 05:01:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-25 05:01:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-25 05:01:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-25 05:01:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-25 05:01:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-25 05:02:49 --> [REQ_ID=c2f685a30ce9] [REQUEST][START] GET /index.php/Assets
DEBUG - 2026-03-25 05:02:49 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-25 05:02:49 --> [REQ_ID=c2f685a30ce9] [REQUEST][END]
INFO - 2026-03-25 05:02:49 --> [REQ_ID=c2f685a30ce9] [PERF] Execution time=0.013162
DEBUG - 2026-03-25 05:06:22 --> [REQ_ID=6b9343bb88a2] [REQUEST][START] HEAD /
DEBUG - 2026-03-25 05:06:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-25 05:06:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-25 05:06:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-25 05:06:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-25 05:06:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-25 05:11:22 --> [REQ_ID=3609733424ba] [REQUEST][START] HEAD /
DEBUG - 2026-03-25 05:11:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-25 05:11:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-25 05:11:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-25 05:11:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-25 05:11:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-25 05:15:01 --> [REQ_ID=2ce86b8a149e] [REQUEST][START] GET /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-25 05:15:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-25 05:15:01 --> [REQ_ID=2ce86b8a149e] [FILTER_BEFORE] /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-25 05:15:01 --> [REQ_ID=2ce86b8a149e] [ROUTE] Controller=\App\Modules\APIs\Controllers\AlertsAPIController Method=fetchEmailAlerts
DEBUG - 2026-03-25 05:15:01 --> [REQ_ID=2ce86b8a149e] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-25 05:15:01 --> [REQ_ID=2ce86b8a149e] [REQUEST][END]
INFO - 2026-03-25 05:15:01 --> [REQ_ID=2ce86b8a149e] [PERF] Execution time=0.055996
DEBUG - 2026-03-25 05:16:22 --> [REQ_ID=90f6808cb82e] [REQUEST][START] HEAD /
DEBUG - 2026-03-25 05:16:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-25 05:16:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-25 05:16:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-25 05:16:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-25 05:16:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-25 05:21:22 --> [REQ_ID=f554cb6b276b] [REQUEST][START] HEAD /
DEBUG - 2026-03-25 05:21:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-25 05:21:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-25 05:21:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-25 05:21:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-25 05:21:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-25 05:26:22 --> [REQ_ID=345d01d9fdca] [REQUEST][START] HEAD /
DEBUG - 2026-03-25 05:26:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-25 05:26:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-25 05:26:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-25 05:26:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-25 05:26:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-25 05:31:22 --> [REQ_ID=277bbfbc5575] [REQUEST][START] HEAD /
DEBUG - 2026-03-25 05:31:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-25 05:31:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-25 05:31:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-25 05:31:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-25 05:31:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-25 05:32:46 --> [REQ_ID=9d5f6223bfc0] [REQUEST][START] GET /index.php/Wallets/Purchase/Memberships/Basic
DEBUG - 2026-03-25 05:32:46 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-25 05:32:46 --> [REQ_ID=9d5f6223bfc0] [REQUEST][END]
INFO - 2026-03-25 05:32:46 --> [REQ_ID=9d5f6223bfc0] [PERF] Execution time=0.044680
DEBUG - 2026-03-25 05:36:22 --> [REQ_ID=4a90728da948] [REQUEST][START] HEAD /
DEBUG - 2026-03-25 05:36:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-25 05:36:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-25 05:36:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-25 05:36:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-25 05:36:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-25 05:37:53 --> [REQ_ID=bf389876f0cc] [REQUEST][START] GET /index.php/Terms-Of-Service
DEBUG - 2026-03-25 05:37:53 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-25 05:37:53 --> [REQ_ID=bf389876f0cc] [REQUEST][END]
INFO - 2026-03-25 05:37:53 --> [REQ_ID=bf389876f0cc] [PERF] Execution time=0.038830
DEBUG - 2026-03-25 05:41:22 --> [REQ_ID=930a71edd94c] [REQUEST][START] HEAD /
DEBUG - 2026-03-25 05:41:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-25 05:41:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-25 05:41:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-25 05:41:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-25 05:41:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-25 05:43:29 --> [REQ_ID=2fd0a6dcf29a] [REQUEST][START] GET /index.php/Partner/register
DEBUG - 2026-03-25 05:43:29 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-25 05:43:29 --> [REQ_ID=2fd0a6dcf29a] [REQUEST][END]
INFO - 2026-03-25 05:43:29 --> [REQ_ID=2fd0a6dcf29a] [PERF] Execution time=0.040119
DEBUG - 2026-03-25 05:46:22 --> [REQ_ID=2df15f8de3ef] [REQUEST][START] HEAD /
DEBUG - 2026-03-25 05:46:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-25 05:46:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-25 05:46:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-25 05:46:23 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-25 05:46:23 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-25 05:46:39 --> [REQ_ID=4d9d4f8947ea] [REQUEST][START] GET /
DEBUG - 2026-03-25 05:46:39 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-25 05:46:39 --> [REQ_ID=4d9d4f8947ea] [FILTER_BEFORE] /
DEBUG - 2026-03-25 05:46:39 --> [REQ_ID=4d9d4f8947ea] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-25 05:46:39 --> [REQ_ID=4d9d4f8947ea] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-25 05:46:39 --> [CSRF] token name=csrf_test_name hash=c3375753a2b3739de298fc679254f8c8
DEBUG - 2026-03-25 05:46:39 --> [REQ_ID=0278aa35f88f] [INIT] App\Controllers\Home::GET
INFO - 2026-03-25 05:46:39 --> [REQ_ID=0278aa35f88f] [MEMORY][controller-start] 4194304
INFO - 2026-03-25 05:46:39 --> [REQ_ID=0278aa35f88f] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-25 05:46:39 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-25 05:46:40 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-03-25 05:46:40 --> [REQ_ID=0278aa35f88f] [VIEW_RENDER] themes/public/home
INFO - 2026-03-25 05:46:40 --> [REQ_ID=0278aa35f88f] [MEMORY][commonData:start] 8388608
INFO - 2026-03-25 05:46:40 --> themesMemory usage: 8388608
DEBUG - 2026-03-25 05:46:40 --> [MetaService] slug= pageName=Home cacheHit= path=DB
DEBUG - 2026-03-25 05:46:40 --> [REQ_ID=4d9d4f8947ea] [FILTER_AFTER]
DEBUG - 2026-03-25 05:46:40 --> [REQ_ID=4d9d4f8947ea] [LIFECYCLE][END] status=200 duration_ms=626.14 memory_delta=4194304
INFO - 2026-03-25 05:46:40 --> [REQ_ID=0278aa35f88f] [PERF] Execution time=0.623040
DEBUG - 2026-03-25 05:46:40 --> [REQ_ID=4d9d4f8947ea] [REQUEST][END]
INFO - 2026-03-25 05:46:40 --> [REQ_ID=4d9d4f8947ea] [PERF] Execution time=0.650203
DEBUG - 2026-03-25 05:49:12 --> [REQ_ID=a9cd02ee1737] [REQUEST][START] GET /index.php/Account/Social-Media
DEBUG - 2026-03-25 05:49:12 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-25 05:49:12 --> [REQ_ID=a9cd02ee1737] [REQUEST][END]
INFO - 2026-03-25 05:49:12 --> [REQ_ID=a9cd02ee1737] [PERF] Execution time=0.046120
DEBUG - 2026-03-25 05:51:22 --> [REQ_ID=39d15e6fc9d0] [REQUEST][START] HEAD /
DEBUG - 2026-03-25 05:51:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-25 05:51:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-25 05:51:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-25 05:51:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-25 05:51:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-25 05:56:22 --> [REQ_ID=8764b24304c3] [REQUEST][START] HEAD /
DEBUG - 2026-03-25 05:56:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-25 05:56:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-25 05:56:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-25 05:56:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-25 05:56:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-25 05:57:18 --> [REQ_ID=57eed5ab9418] [REQUEST][START] HEAD /
DEBUG - 2026-03-25 05:57:18 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-25 05:57:18 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-25 05:57:19 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-25 05:57:19 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-25 05:57:19 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: none
DEBUG - 2026-03-25 06:00:01 --> [REQ_ID=fea319fc083e] [REQUEST][START] GET /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-25 06:00:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-25 06:00:01 --> [REQ_ID=fea319fc083e] [FILTER_BEFORE] /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-25 06:00:01 --> [REQ_ID=fea319fc083e] [ROUTE] Controller=\App\Modules\Management\Controllers\ManagementAPIController Method=Run_CRON_Tasks
DEBUG - 2026-03-25 06:00:01 --> [REQ_ID=fea319fc083e] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-25 06:00:01 --> [REQ_ID=fea319fc083e] [REQUEST][END]
INFO - 2026-03-25 06:00:01 --> [REQ_ID=fea319fc083e] [PERF] Execution time=0.050972
DEBUG - 2026-03-25 06:01:22 --> [REQ_ID=3f27e1f78570] [REQUEST][START] HEAD /
DEBUG - 2026-03-25 06:01:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-25 06:01:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-25 06:01:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-25 06:01:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-25 06:01:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-25 06:06:22 --> [REQ_ID=facac3d605d3] [REQUEST][START] HEAD /
DEBUG - 2026-03-25 06:06:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-25 06:06:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-25 06:06:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-25 06:06:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-25 06:06:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-25 06:11:22 --> [REQ_ID=4ce194ab5d6b] [REQUEST][START] HEAD /
DEBUG - 2026-03-25 06:11:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-25 06:11:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-25 06:11:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-25 06:11:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-25 06:11:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-25 06:15:02 --> [REQ_ID=02387db46759] [REQUEST][START] GET /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-25 06:15:02 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-25 06:15:02 --> [REQ_ID=02387db46759] [FILTER_BEFORE] /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-25 06:15:02 --> [REQ_ID=02387db46759] [ROUTE] Controller=\App\Modules\APIs\Controllers\AlertsAPIController Method=fetchEmailAlerts
DEBUG - 2026-03-25 06:15:02 --> [REQ_ID=02387db46759] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-25 06:15:02 --> [REQ_ID=02387db46759] [REQUEST][END]
INFO - 2026-03-25 06:15:02 --> [REQ_ID=02387db46759] [PERF] Execution time=0.045975
DEBUG - 2026-03-25 06:16:22 --> [REQ_ID=54a19dbd07bf] [REQUEST][START] HEAD /
DEBUG - 2026-03-25 06:16:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-25 06:16:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-25 06:16:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-25 06:16:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-25 06:16:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-25 06:21:22 --> [REQ_ID=3a729420fc1a] [REQUEST][START] HEAD /
DEBUG - 2026-03-25 06:21:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-25 06:21:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-25 06:21:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-25 06:21:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-25 06:21:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-25 06:26:22 --> [REQ_ID=a6720f06f4d3] [REQUEST][START] HEAD /
DEBUG - 2026-03-25 06:26:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-25 06:26:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-25 06:26:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-25 06:26:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-25 06:26:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-25 06:31:22 --> [REQ_ID=a9811ec7860d] [REQUEST][START] HEAD /
DEBUG - 2026-03-25 06:31:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-25 06:31:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-25 06:31:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-25 06:31:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-25 06:31:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-25 06:36:22 --> [REQ_ID=d6bd7ec6976b] [REQUEST][START] HEAD /
DEBUG - 2026-03-25 06:36:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-25 06:36:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-25 06:36:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-25 06:36:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-25 06:36:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-25 06:39:56 --> [REQ_ID=d3d00ad0e23e] [REQUEST][START] GET /
DEBUG - 2026-03-25 06:39:56 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-25 06:39:56 --> [REQ_ID=d3d00ad0e23e] [REQUEST][END]
INFO - 2026-03-25 06:39:56 --> [REQ_ID=d3d00ad0e23e] [PERF] Execution time=0.040922
DEBUG - 2026-03-25 06:41:22 --> [REQ_ID=9ba25880e722] [REQUEST][START] HEAD /
DEBUG - 2026-03-25 06:41:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-25 06:41:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-25 06:41:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-25 06:41:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-25 06:41:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-25 06:46:22 --> [REQ_ID=42f83da17602] [REQUEST][START] HEAD /
DEBUG - 2026-03-25 06:46:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-25 06:46:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-25 06:46:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-25 06:46:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-25 06:46:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-25 06:51:22 --> [REQ_ID=e870c5fe9d35] [REQUEST][START] HEAD /
DEBUG - 2026-03-25 06:51:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-25 06:51:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-25 06:51:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-25 06:51:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-25 06:51:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-25 06:56:22 --> [REQ_ID=009d56e476ea] [REQUEST][START] HEAD /
DEBUG - 2026-03-25 06:56:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-25 06:56:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-25 06:56:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-25 06:56:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-25 06:56:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-25 06:57:28 --> [REQ_ID=d300870fb7ac] [REQUEST][START] GET /
DEBUG - 2026-03-25 06:57:28 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-25 06:57:28 --> [REQ_ID=d300870fb7ac] [FILTER_BEFORE] /
DEBUG - 2026-03-25 06:57:28 --> [REQ_ID=d300870fb7ac] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-25 06:57:28 --> [REQ_ID=d300870fb7ac] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-25 06:57:28 --> [CSRF] token name=csrf_test_name hash=68f7f21f2678484d0fa8e5c1d8300aca
DEBUG - 2026-03-25 06:57:28 --> [REQ_ID=0d315131a925] [INIT] App\Controllers\Home::GET
INFO - 2026-03-25 06:57:28 --> [REQ_ID=0d315131a925] [MEMORY][controller-start] 6291456
INFO - 2026-03-25 06:57:28 --> [REQ_ID=0d315131a925] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-25 06:57:28 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-25 06:57:29 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-03-25 06:57:29 --> [REQ_ID=0d315131a925] [VIEW_RENDER] themes/public/home
INFO - 2026-03-25 06:57:29 --> [REQ_ID=0d315131a925] [MEMORY][commonData:start] 10485760
INFO - 2026-03-25 06:57:29 --> themesMemory usage: 10485760
DEBUG - 2026-03-25 06:57:29 --> [MetaService] slug= pageName=Home cacheHit= path=DB
DEBUG - 2026-03-25 06:57:29 --> [REQ_ID=d300870fb7ac] [FILTER_AFTER]
DEBUG - 2026-03-25 06:57:29 --> [REQ_ID=d300870fb7ac] [LIFECYCLE][END] status=200 duration_ms=610.88 memory_delta=4194304
INFO - 2026-03-25 06:57:29 --> [REQ_ID=0d315131a925] [PERF] Execution time=0.609108
DEBUG - 2026-03-25 06:57:29 --> [REQ_ID=d300870fb7ac] [REQUEST][END]
INFO - 2026-03-25 06:57:29 --> [REQ_ID=d300870fb7ac] [PERF] Execution time=0.653870
INFO - 2026-03-25 07:00:01 --> [SPARK_START] App\Commands\AIOps\Run
INFO - 2026-03-25 07:00:01 --> [SPARK_MEMORY] 18874368
INFO - 2026-03-25 07:00:01 --> [spark:aiops:run] Intent
INFO - 2026-03-25 07:00:01 --> [spark:ops:work] Started
INFO - 2026-03-25 07:00:01 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-03-25 07:00:01 --> [SPARK_MEMORY] 18874368
INFO - 2026-03-25 07:00:01 --> [spark:ops:work] Intent
INFO - 2026-03-25 07:00:01 --> [spark:ops:work] Completed
INFO - 2026-03-25 07:00:01 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.080502
INFO - 2026-03-25 07:00:01 --> [SPARK_MEMORY] 20971520
DEBUG - 2026-03-25 07:00:01 --> [REQ_ID=59e85cd03e58] [REQUEST][START] GET /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-25 07:00:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-25 07:00:01 --> [REQ_ID=59e85cd03e58] [FILTER_BEFORE] /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-25 07:00:01 --> [REQ_ID=59e85cd03e58] [ROUTE] Controller=\App\Modules\Management\Controllers\ManagementAPIController Method=Run_CRON_Tasks
DEBUG - 2026-03-25 07:00:01 --> [REQ_ID=59e85cd03e58] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-25 07:00:01 --> [REQ_ID=59e85cd03e58] [REQUEST][END]
INFO - 2026-03-25 07:00:01 --> [REQ_ID=59e85cd03e58] [PERF] Execution time=0.044268
INFO - 2026-03-25 07:00:03 --> [AIOPS][SPARK][GOVERNANCE][spark:logs:summarize] Started
INFO - 2026-03-25 07:00:03 --> [SPARK_START] App\Commands\Logs\Summarize
INFO - 2026-03-25 07:00:03 --> [SPARK_MEMORY] 18874368
INFO - 2026-03-25 07:00:03 --> [spark:logs:summarize] Intent
INFO - 2026-03-25 07:00:03 --> [AIOPS][SPARK][GOVERNANCE][spark:logs:summarize] Completed
INFO - 2026-03-25 07:00:03 --> [SPARK_COMPLETE] App\Commands\Logs\Summarize duration=0.008734
INFO - 2026-03-25 07:00:03 --> [SPARK_MEMORY] 18874368
INFO - 2026-03-25 07:00:03 --> [spark:app:healthcheck] Started
INFO - 2026-03-25 07:00:03 --> [SPARK_START] App\Commands\App\Healthcheck
INFO - 2026-03-25 07:00:03 --> [SPARK_MEMORY] 18874368
INFO - 2026-03-25 07:00:03 --> [spark:app:healthcheck] Intent
DEBUG - 2026-03-25 07:00:03 --> LOG_HEALTHCHECK debug marker=2eb58011fb40
INFO - 2026-03-25 07:00:03 --> LOG_HEALTHCHECK info marker=2eb58011fb40
NOTICE - 2026-03-25 07:00:03 --> LOG_HEALTHCHECK probe marker=2eb58011fb40
INFO - 2026-03-25 07:00:03 --> [spark:app:healthcheck] Completed
INFO - 2026-03-25 07:00:03 --> [SPARK_COMPLETE] App\Commands\App\Healthcheck duration=0.034314
INFO - 2026-03-25 07:00:03 --> [SPARK_MEMORY] 18874368
INFO - 2026-03-25 07:00:03 --> [SPARK_COMPLETE] App\Commands\AIOps\Run duration=2.258288
INFO - 2026-03-25 07:00:03 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-03-25 07:01:22 --> [REQ_ID=202ae6331fbf] [REQUEST][START] HEAD /
DEBUG - 2026-03-25 07:01:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-25 07:01:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-25 07:01:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-25 07:01:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-25 07:01:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-25 07:05:54 --> [REQ_ID=cba46cc35df2] [REQUEST][START] GET /
DEBUG - 2026-03-25 07:05:54 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-25 07:05:54 --> [REQ_ID=cba46cc35df2] [FILTER_BEFORE] /
DEBUG - 2026-03-25 07:05:54 --> [REQ_ID=cba46cc35df2] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-25 07:05:54 --> [REQ_ID=cba46cc35df2] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-25 07:05:54 --> [CSRF] token name=csrf_test_name hash=bd5cc0146bc27ab69f4b1e36fcffeb3d
DEBUG - 2026-03-25 07:05:54 --> [REQ_ID=88d51717c6a1] [INIT] App\Controllers\Home::GET
INFO - 2026-03-25 07:05:54 --> [REQ_ID=88d51717c6a1] [MEMORY][controller-start] 6291456
INFO - 2026-03-25 07:05:54 --> [REQ_ID=88d51717c6a1] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-25 07:05:54 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-25 07:05:55 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
DEBUG - 2026-03-25 07:05:55 --> [REQ_ID=88d51717c6a1] [VIEW_RENDER] themes/public/home
INFO - 2026-03-25 07:05:55 --> [REQ_ID=88d51717c6a1] [MEMORY][commonData:start] 10485760
INFO - 2026-03-25 07:05:55 --> themesMemory usage: 10485760
DEBUG - 2026-03-25 07:05:55 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-25 07:05:55 --> [REQ_ID=cba46cc35df2] [FILTER_AFTER]
DEBUG - 2026-03-25 07:05:55 --> [REQ_ID=cba46cc35df2] [LIFECYCLE][END] status=200 duration_ms=605.85 memory_delta=4194304
INFO - 2026-03-25 07:05:55 --> [REQ_ID=88d51717c6a1] [PERF] Execution time=0.603739
DEBUG - 2026-03-25 07:05:55 --> [REQ_ID=cba46cc35df2] [REQUEST][END]
INFO - 2026-03-25 07:05:55 --> [REQ_ID=cba46cc35df2] [PERF] Execution time=0.655743
DEBUG - 2026-03-25 07:06:22 --> [REQ_ID=acbeb7dd85c7] [REQUEST][START] HEAD /
DEBUG - 2026-03-25 07:06:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-25 07:06:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-25 07:06:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-25 07:06:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-25 07:06:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-25 07:11:22 --> [REQ_ID=96e238d91c9c] [REQUEST][START] HEAD /
DEBUG - 2026-03-25 07:11:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-25 07:11:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-25 07:11:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-25 07:11:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-25 07:11:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-25 07:15:01 --> [REQ_ID=7e32b0d18c3c] [REQUEST][START] GET /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-25 07:15:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-25 07:15:01 --> [REQ_ID=7e32b0d18c3c] [FILTER_BEFORE] /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-25 07:15:01 --> [REQ_ID=7e32b0d18c3c] [ROUTE] Controller=\App\Modules\APIs\Controllers\AlertsAPIController Method=fetchEmailAlerts
DEBUG - 2026-03-25 07:15:01 --> [REQ_ID=7e32b0d18c3c] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-25 07:15:01 --> [REQ_ID=7e32b0d18c3c] [REQUEST][END]
INFO - 2026-03-25 07:15:01 --> [REQ_ID=7e32b0d18c3c] [PERF] Execution time=0.046480
DEBUG - 2026-03-25 07:16:22 --> [REQ_ID=76210add174b] [REQUEST][START] HEAD /
DEBUG - 2026-03-25 07:16:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-25 07:16:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-25 07:16:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-25 07:16:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-25 07:16:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-25 07:21:22 --> [REQ_ID=0181fd62fa35] [REQUEST][START] HEAD /
DEBUG - 2026-03-25 07:21:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-25 07:21:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-25 07:21:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-25 07:21:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-25 07:21:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-25 07:26:22 --> [REQ_ID=3dcaa13f2cc4] [REQUEST][START] HEAD /
DEBUG - 2026-03-25 07:26:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-25 07:26:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-25 07:26:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-25 07:26:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-25 07:26:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-25 07:31:22 --> [REQ_ID=8b726de3e65d] [REQUEST][START] HEAD /
DEBUG - 2026-03-25 07:31:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-25 07:31:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-25 07:31:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-25 07:31:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-25 07:31:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-25 07:36:22 --> [REQ_ID=561050ed27d4] [REQUEST][START] HEAD /
DEBUG - 2026-03-25 07:36:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-25 07:36:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-25 07:36:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-25 07:36:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-25 07:36:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-25 07:41:22 --> [REQ_ID=bb22e0ccf0d3] [REQUEST][START] HEAD /
DEBUG - 2026-03-25 07:41:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-25 07:41:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-25 07:41:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-25 07:41:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-25 07:41:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-25 07:46:22 --> [REQ_ID=fd2772dca805] [REQUEST][START] HEAD /
DEBUG - 2026-03-25 07:46:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-25 07:46:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-25 07:46:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-25 07:46:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-25 07:46:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-25 07:51:22 --> [REQ_ID=ea147edcfc7c] [REQUEST][START] HEAD /
DEBUG - 2026-03-25 07:51:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-25 07:51:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-25 07:51:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-25 07:51:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-25 07:51:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-25 07:56:22 --> [REQ_ID=c049b244d045] [REQUEST][START] HEAD /
DEBUG - 2026-03-25 07:56:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-25 07:56:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-25 07:56:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-25 07:56:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-25 07:56:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-25 08:00:01 --> [REQ_ID=83109774cb60] [REQUEST][START] GET /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-25 08:00:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-25 08:00:01 --> [REQ_ID=83109774cb60] [FILTER_BEFORE] /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-25 08:00:01 --> [REQ_ID=83109774cb60] [ROUTE] Controller=\App\Modules\Management\Controllers\ManagementAPIController Method=Run_CRON_Tasks
DEBUG - 2026-03-25 08:00:01 --> [REQ_ID=83109774cb60] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-25 08:00:01 --> [REQ_ID=83109774cb60] [REQUEST][END]
INFO - 2026-03-25 08:00:01 --> [REQ_ID=83109774cb60] [PERF] Execution time=0.049470
DEBUG - 2026-03-25 08:01:22 --> [REQ_ID=e93e427c7c81] [REQUEST][START] HEAD /
DEBUG - 2026-03-25 08:01:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-25 08:01:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-25 08:01:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-25 08:01:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-25 08:01:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-25 08:06:22 --> [REQ_ID=69405c98426b] [REQUEST][START] HEAD /
DEBUG - 2026-03-25 08:06:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-25 08:06:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-25 08:06:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-25 08:06:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-25 08:06:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-25 08:11:22 --> [REQ_ID=90917cea460e] [REQUEST][START] HEAD /
DEBUG - 2026-03-25 08:11:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-25 08:11:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-25 08:11:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-25 08:11:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-25 08:11:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-25 08:15:01 --> [REQ_ID=313b3edd5505] [REQUEST][START] GET /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-25 08:15:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-25 08:15:01 --> [REQ_ID=313b3edd5505] [FILTER_BEFORE] /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-25 08:15:01 --> [REQ_ID=313b3edd5505] [ROUTE] Controller=\App\Modules\APIs\Controllers\AlertsAPIController Method=fetchEmailAlerts
DEBUG - 2026-03-25 08:15:01 --> [REQ_ID=313b3edd5505] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-25 08:15:01 --> [REQ_ID=313b3edd5505] [REQUEST][END]
INFO - 2026-03-25 08:15:01 --> [REQ_ID=313b3edd5505] [PERF] Execution time=0.046435
DEBUG - 2026-03-25 08:16:22 --> [REQ_ID=d4790d88cbd8] [REQUEST][START] HEAD /
DEBUG - 2026-03-25 08:16:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-25 08:16:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-25 08:16:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-25 08:16:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-25 08:16:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-25 08:21:04 --> [REQ_ID=c72bf617ae87] [REQUEST][START] GET /index.php/How-It-Works/Registering-An-Account
DEBUG - 2026-03-25 08:21:04 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-25 08:21:04 --> [REQ_ID=c72bf617ae87] [REQUEST][END]
INFO - 2026-03-25 08:21:04 --> [REQ_ID=c72bf617ae87] [PERF] Execution time=0.041939
DEBUG - 2026-03-25 08:21:22 --> [REQ_ID=10619f03a5b4] [REQUEST][START] HEAD /
DEBUG - 2026-03-25 08:21:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-25 08:21:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-25 08:21:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-25 08:21:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-25 08:21:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-25 08:26:22 --> [REQ_ID=02e75c9fd1cf] [REQUEST][START] HEAD /
DEBUG - 2026-03-25 08:26:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-25 08:26:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-25 08:26:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-25 08:26:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-25 08:26:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-25 08:31:22 --> [REQ_ID=3af34cebf2d0] [REQUEST][START] HEAD /
DEBUG - 2026-03-25 08:31:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-25 08:31:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-25 08:31:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-25 08:31:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-25 08:31:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-25 08:34:47 --> [REQ_ID=4a780d11c733] [REQUEST][START] GET /
DEBUG - 2026-03-25 08:34:47 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-25 08:34:47 --> [REQ_ID=4a780d11c733] [FILTER_BEFORE] /
DEBUG - 2026-03-25 08:34:47 --> [REQ_ID=4a780d11c733] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-25 08:34:47 --> [REQ_ID=4a780d11c733] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-25 08:34:47 --> [CSRF] token name=csrf_test_name hash=c6b7bf6a6d9ee3372429fcff8e9deaa2
DEBUG - 2026-03-25 08:34:47 --> [REQ_ID=5a9fbcecd7c3] [INIT] App\Controllers\Home::GET
INFO - 2026-03-25 08:34:47 --> [REQ_ID=5a9fbcecd7c3] [MEMORY][controller-start] 6291456
INFO - 2026-03-25 08:34:47 --> [REQ_ID=5a9fbcecd7c3] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-25 08:34:47 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-25 08:34:47 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-03-25 08:34:47 --> [REQ_ID=5a9fbcecd7c3] [VIEW_RENDER] themes/public/home
INFO - 2026-03-25 08:34:47 --> [REQ_ID=5a9fbcecd7c3] [MEMORY][commonData:start] 10485760
INFO - 2026-03-25 08:34:47 --> themesMemory usage: 10485760
DEBUG - 2026-03-25 08:34:47 --> [MetaService] slug= pageName=Home cacheHit= path=DB
DEBUG - 2026-03-25 08:34:48 --> [REQ_ID=4a780d11c733] [FILTER_AFTER]
DEBUG - 2026-03-25 08:34:48 --> [REQ_ID=4a780d11c733] [LIFECYCLE][END] status=200 duration_ms=665.11 memory_delta=4194304
INFO - 2026-03-25 08:34:48 --> [REQ_ID=5a9fbcecd7c3] [PERF] Execution time=0.663150
DEBUG - 2026-03-25 08:34:48 --> [REQ_ID=4a780d11c733] [REQUEST][END]
INFO - 2026-03-25 08:34:48 --> [REQ_ID=4a780d11c733] [PERF] Execution time=0.703966
DEBUG - 2026-03-25 08:36:22 --> [REQ_ID=44b92516a758] [REQUEST][START] HEAD /
DEBUG - 2026-03-25 08:36:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-25 08:36:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-25 08:36:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-25 08:36:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-25 08:36:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-25 08:38:46 --> [REQ_ID=6781ddbd5b38] [REQUEST][START] GET /
DEBUG - 2026-03-25 08:38:46 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-25 08:38:46 --> [REQ_ID=6781ddbd5b38] [FILTER_BEFORE] /
DEBUG - 2026-03-25 08:38:46 --> [REQ_ID=6781ddbd5b38] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-25 08:38:46 --> [REQ_ID=6781ddbd5b38] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-25 08:38:46 --> [CSRF] token name=csrf_test_name hash=f913bd3612243725f8c9d38920e06c8a
DEBUG - 2026-03-25 08:38:46 --> [REQ_ID=2117e488b4c9] [INIT] App\Controllers\Home::GET
INFO - 2026-03-25 08:38:46 --> [REQ_ID=2117e488b4c9] [MEMORY][controller-start] 6291456
INFO - 2026-03-25 08:38:46 --> [REQ_ID=2117e488b4c9] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-25 08:38:46 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-25 08:38:46 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
DEBUG - 2026-03-25 08:38:46 --> [REQ_ID=2117e488b4c9] [VIEW_RENDER] themes/public/home
INFO - 2026-03-25 08:38:46 --> [REQ_ID=2117e488b4c9] [MEMORY][commonData:start] 10485760
INFO - 2026-03-25 08:38:46 --> themesMemory usage: 10485760
DEBUG - 2026-03-25 08:38:46 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-25 08:38:46 --> [REQ_ID=6781ddbd5b38] [FILTER_AFTER]
DEBUG - 2026-03-25 08:38:46 --> [REQ_ID=6781ddbd5b38] [LIFECYCLE][END] status=200 duration_ms=497.07 memory_delta=4194304
INFO - 2026-03-25 08:38:46 --> [REQ_ID=2117e488b4c9] [PERF] Execution time=0.494728
DEBUG - 2026-03-25 08:38:46 --> [REQ_ID=6781ddbd5b38] [REQUEST][END]
INFO - 2026-03-25 08:38:46 --> [REQ_ID=6781ddbd5b38] [PERF] Execution time=0.535326
DEBUG - 2026-03-25 08:41:22 --> [REQ_ID=e84f7b9f3c2b] [REQUEST][START] HEAD /
DEBUG - 2026-03-25 08:41:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-25 08:41:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-25 08:41:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-25 08:41:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-25 08:41:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-25 08:46:22 --> [REQ_ID=461e6d704130] [REQUEST][START] HEAD /
DEBUG - 2026-03-25 08:46:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-25 08:46:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-25 08:46:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-25 08:46:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-25 08:46:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-25 08:51:22 --> [REQ_ID=da4e6d73e692] [REQUEST][START] HEAD /
DEBUG - 2026-03-25 08:51:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-25 08:51:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-25 08:51:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-25 08:51:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-25 08:51:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-25 08:56:22 --> [REQ_ID=e622310a9c5f] [REQUEST][START] HEAD /
DEBUG - 2026-03-25 08:56:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-25 08:56:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-25 08:56:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-25 08:56:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-25 08:56:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-25 09:00:01 --> [REQ_ID=cc9cadef18da] [REQUEST][START] GET /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-25 09:00:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-25 09:00:01 --> [REQ_ID=cc9cadef18da] [FILTER_BEFORE] /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-25 09:00:01 --> [REQ_ID=cc9cadef18da] [ROUTE] Controller=\App\Modules\Management\Controllers\ManagementAPIController Method=Run_CRON_Tasks
DEBUG - 2026-03-25 09:00:01 --> [REQ_ID=cc9cadef18da] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-25 09:00:01 --> [REQ_ID=cc9cadef18da] [REQUEST][END]
INFO - 2026-03-25 09:00:01 --> [REQ_ID=cc9cadef18da] [PERF] Execution time=0.056980
DEBUG - 2026-03-25 09:01:22 --> [REQ_ID=18829cab5d1d] [REQUEST][START] HEAD /
DEBUG - 2026-03-25 09:01:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-25 09:01:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-25 09:01:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-25 09:01:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-25 09:01:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-25 09:01:51 --> [REQ_ID=708e9ad2c3f6] [REQUEST][START] GET /
DEBUG - 2026-03-25 09:01:51 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-25 09:01:51 --> [REQ_ID=708e9ad2c3f6] [FILTER_BEFORE] /
DEBUG - 2026-03-25 09:01:51 --> [REQ_ID=708e9ad2c3f6] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-25 09:01:51 --> [REQ_ID=708e9ad2c3f6] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-25 09:01:51 --> [CSRF] token name=csrf_test_name hash=c5bc81a8db3ebf1650310b32b54b8392
DEBUG - 2026-03-25 09:01:51 --> [REQ_ID=a1b0ccf481a0] [INIT] App\Controllers\Home::GET
INFO - 2026-03-25 09:01:51 --> [REQ_ID=a1b0ccf481a0] [MEMORY][controller-start] 4194304
INFO - 2026-03-25 09:01:51 --> [REQ_ID=a1b0ccf481a0] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-25 09:01:51 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-25 09:01:52 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-03-25 09:01:52 --> [REQ_ID=a1b0ccf481a0] [VIEW_RENDER] themes/public/home
INFO - 2026-03-25 09:01:52 --> [REQ_ID=a1b0ccf481a0] [MEMORY][commonData:start] 8388608
INFO - 2026-03-25 09:01:52 --> themesMemory usage: 8388608
DEBUG - 2026-03-25 09:01:52 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-25 09:01:52 --> [REQ_ID=708e9ad2c3f6] [FILTER_AFTER]
DEBUG - 2026-03-25 09:01:52 --> [REQ_ID=708e9ad2c3f6] [LIFECYCLE][END] status=200 duration_ms=775.50 memory_delta=4194304
INFO - 2026-03-25 09:01:52 --> [REQ_ID=a1b0ccf481a0] [PERF] Execution time=0.773451
DEBUG - 2026-03-25 09:01:52 --> [REQ_ID=708e9ad2c3f6] [REQUEST][END]
INFO - 2026-03-25 09:01:52 --> [REQ_ID=708e9ad2c3f6] [PERF] Execution time=0.794568
DEBUG - 2026-03-25 09:06:22 --> [REQ_ID=beb6201b34d9] [REQUEST][START] HEAD /
DEBUG - 2026-03-25 09:06:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-25 09:06:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-25 09:06:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-25 09:06:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-25 09:06:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-25 09:11:22 --> [REQ_ID=086d0e5e025f] [REQUEST][START] HEAD /
DEBUG - 2026-03-25 09:11:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-25 09:11:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-25 09:11:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-25 09:11:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-25 09:11:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-25 09:15:01 --> [REQ_ID=0326361957d6] [REQUEST][START] GET /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-25 09:15:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-25 09:15:01 --> [REQ_ID=0326361957d6] [FILTER_BEFORE] /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-25 09:15:01 --> [REQ_ID=0326361957d6] [ROUTE] Controller=\App\Modules\APIs\Controllers\AlertsAPIController Method=fetchEmailAlerts
DEBUG - 2026-03-25 09:15:01 --> [REQ_ID=0326361957d6] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-25 09:15:01 --> [REQ_ID=0326361957d6] [REQUEST][END]
INFO - 2026-03-25 09:15:01 --> [REQ_ID=0326361957d6] [PERF] Execution time=0.046135
DEBUG - 2026-03-25 09:16:22 --> [REQ_ID=0a3581507cc0] [REQUEST][START] HEAD /
DEBUG - 2026-03-25 09:16:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-25 09:16:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-25 09:16:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-25 09:16:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-25 09:16:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-25 09:21:22 --> [REQ_ID=4c7dc9c8cb8b] [REQUEST][START] HEAD /
DEBUG - 2026-03-25 09:21:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-25 09:21:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-25 09:21:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-25 09:21:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-25 09:21:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-25 09:26:22 --> [REQ_ID=2837c55b70ed] [REQUEST][START] HEAD /
DEBUG - 2026-03-25 09:26:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-25 09:26:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-25 09:26:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-25 09:26:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-25 09:26:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-25 09:31:22 --> [REQ_ID=dd8a59029cbc] [REQUEST][START] HEAD /
DEBUG - 2026-03-25 09:31:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-25 09:31:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-25 09:31:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-25 09:31:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-25 09:31:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-25 09:36:22 --> [REQ_ID=a5f2bca1132d] [REQUEST][START] HEAD /
DEBUG - 2026-03-25 09:36:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-25 09:36:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-25 09:36:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-25 09:36:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-25 09:36:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-25 09:41:22 --> [REQ_ID=0fdac081eca3] [REQUEST][START] HEAD /
DEBUG - 2026-03-25 09:41:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-25 09:41:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-25 09:41:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-25 09:41:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-25 09:41:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-25 09:46:21 --> [REQ_ID=85b26ce9fb53] [REQUEST][START] GET /index.php/News/After-Hours-Movers/December-6th-2021
DEBUG - 2026-03-25 09:46:21 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-25 09:46:21 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: GET, Route: News/After-Hours-Movers/December-6th-2021]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-25 09:46:21 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-25 09:46:21 --> [404] URI=https://www.mymiwallet.com/index.php/News/After-Hours-Movers/December-6th-2021
WARNING - 2026-03-25 09:46:21 --> 404 route miss: https://www.mymiwallet.com/index.php/News/After-Hours-Movers/December-6th-2021 | referrer: none
ERROR - 2026-03-25 09:46:21 --> [ERROR_PAGE] event=error_404 status=404 message=Page not found.
DEBUG - 2026-03-25 09:46:22 --> [REQ_ID=f8a6627c1f17] [REQUEST][START] HEAD /
DEBUG - 2026-03-25 09:46:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-25 09:46:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-25 09:46:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-25 09:46:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-25 09:46:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-25 09:51:22 --> [REQ_ID=a377b7e01019] [REQUEST][START] HEAD /
DEBUG - 2026-03-25 09:51:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-25 09:51:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-25 09:51:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-25 09:51:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-25 09:51:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-25 09:54:08 --> [REQ_ID=766ba1def0cf] [REQUEST][START] GET /
DEBUG - 2026-03-25 09:54:08 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-25 09:54:08 --> [REQ_ID=766ba1def0cf] [FILTER_BEFORE] /
DEBUG - 2026-03-25 09:54:08 --> [REQ_ID=766ba1def0cf] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-25 09:54:08 --> [REQ_ID=766ba1def0cf] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-25 09:54:08 --> [CSRF] token name=csrf_test_name hash=861087486a87ff8a29f375df949684a6
DEBUG - 2026-03-25 09:54:08 --> [REQ_ID=b740f181bc1a] [INIT] App\Controllers\Home::GET
INFO - 2026-03-25 09:54:08 --> [REQ_ID=b740f181bc1a] [MEMORY][controller-start] 6291456
INFO - 2026-03-25 09:54:08 --> [REQ_ID=b740f181bc1a] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-25 09:54:08 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-25 09:54:09 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-03-25 09:54:09 --> [REQ_ID=b740f181bc1a] [VIEW_RENDER] themes/public/home
INFO - 2026-03-25 09:54:09 --> [REQ_ID=b740f181bc1a] [MEMORY][commonData:start] 10485760
INFO - 2026-03-25 09:54:09 --> themesMemory usage: 10485760
DEBUG - 2026-03-25 09:54:09 --> [MetaService] slug= pageName=Home cacheHit= path=DB
DEBUG - 2026-03-25 09:54:09 --> [REQ_ID=766ba1def0cf] [FILTER_AFTER]
DEBUG - 2026-03-25 09:54:09 --> [REQ_ID=766ba1def0cf] [LIFECYCLE][END] status=200 duration_ms=626.91 memory_delta=4194304
INFO - 2026-03-25 09:54:09 --> [REQ_ID=b740f181bc1a] [PERF] Execution time=0.625204
DEBUG - 2026-03-25 09:54:09 --> [REQ_ID=766ba1def0cf] [REQUEST][END]
INFO - 2026-03-25 09:54:09 --> [REQ_ID=766ba1def0cf] [PERF] Execution time=0.669755
DEBUG - 2026-03-25 09:56:22 --> [REQ_ID=c6310d25eacc] [REQUEST][START] HEAD /
DEBUG - 2026-03-25 09:56:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-25 09:56:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-25 09:56:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-25 09:56:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-25 09:56:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-25 10:00:01 --> [REQ_ID=f864feae9550] [REQUEST][START] GET /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-25 10:00:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-25 10:00:01 --> [REQ_ID=f864feae9550] [FILTER_BEFORE] /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-25 10:00:01 --> [REQ_ID=f864feae9550] [ROUTE] Controller=\App\Modules\Management\Controllers\ManagementAPIController Method=Run_CRON_Tasks
DEBUG - 2026-03-25 10:00:01 --> [REQ_ID=f864feae9550] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-25 10:00:01 --> [REQ_ID=f864feae9550] [REQUEST][END]
INFO - 2026-03-25 10:00:01 --> [REQ_ID=f864feae9550] [PERF] Execution time=0.050785
DEBUG - 2026-03-25 10:01:22 --> [REQ_ID=fe22a352fed3] [REQUEST][START] HEAD /
DEBUG - 2026-03-25 10:01:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-25 10:01:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-25 10:01:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-25 10:01:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-25 10:01:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-25 10:06:22 --> [REQ_ID=3951c4645973] [REQUEST][START] HEAD /
DEBUG - 2026-03-25 10:06:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-25 10:06:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-25 10:06:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-25 10:06:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-25 10:06:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-25 10:11:22 --> [REQ_ID=daf8fca98039] [REQUEST][START] HEAD /
DEBUG - 2026-03-25 10:11:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-25 10:11:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-25 10:11:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-25 10:11:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-25 10:11:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-25 10:15:01 --> [REQ_ID=b504166f0658] [REQUEST][START] GET /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-25 10:15:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-25 10:15:01 --> [REQ_ID=b504166f0658] [FILTER_BEFORE] /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-25 10:15:01 --> [REQ_ID=b504166f0658] [ROUTE] Controller=\App\Modules\APIs\Controllers\AlertsAPIController Method=fetchEmailAlerts
DEBUG - 2026-03-25 10:15:01 --> [REQ_ID=b504166f0658] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-25 10:15:01 --> [REQ_ID=b504166f0658] [REQUEST][END]
INFO - 2026-03-25 10:15:01 --> [REQ_ID=b504166f0658] [PERF] Execution time=0.059513
DEBUG - 2026-03-25 10:16:22 --> [REQ_ID=dd1dd94ff1e1] [REQUEST][START] HEAD /
DEBUG - 2026-03-25 10:16:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-25 10:16:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-25 10:16:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-25 10:16:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-25 10:16:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-25 10:20:02 --> [REQ_ID=d2e7213faab1] [REQUEST][START] GET /
DEBUG - 2026-03-25 10:20:02 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-25 10:20:02 --> [REQ_ID=d2e7213faab1] [FILTER_BEFORE] /
DEBUG - 2026-03-25 10:20:02 --> [REQ_ID=d2e7213faab1] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-25 10:20:02 --> [REQ_ID=d2e7213faab1] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-25 10:20:02 --> [CSRF] token name=csrf_test_name hash=0278a5d099360ec5abcfa83a4b1c54cb
DEBUG - 2026-03-25 10:20:02 --> [REQ_ID=5bd3b2039199] [INIT] App\Controllers\Home::GET
INFO - 2026-03-25 10:20:02 --> [REQ_ID=5bd3b2039199] [MEMORY][controller-start] 6291456
INFO - 2026-03-25 10:20:02 --> [REQ_ID=5bd3b2039199] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-25 10:20:02 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-25 10:20:02 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-03-25 10:20:02 --> [REQ_ID=5bd3b2039199] [VIEW_RENDER] themes/public/home
INFO - 2026-03-25 10:20:02 --> [REQ_ID=5bd3b2039199] [MEMORY][commonData:start] 10485760
INFO - 2026-03-25 10:20:02 --> themesMemory usage: 10485760
DEBUG - 2026-03-25 10:20:02 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-25 10:20:02 --> [REQ_ID=d2e7213faab1] [FILTER_AFTER]
DEBUG - 2026-03-25 10:20:02 --> [REQ_ID=d2e7213faab1] [LIFECYCLE][END] status=200 duration_ms=664.22 memory_delta=4194304
INFO - 2026-03-25 10:20:02 --> [REQ_ID=5bd3b2039199] [PERF] Execution time=0.662240
DEBUG - 2026-03-25 10:20:02 --> [REQ_ID=d2e7213faab1] [REQUEST][END]
INFO - 2026-03-25 10:20:02 --> [REQ_ID=d2e7213faab1] [PERF] Execution time=0.703319
DEBUG - 2026-03-25 10:21:22 --> [REQ_ID=010bfa14815a] [REQUEST][START] HEAD /
DEBUG - 2026-03-25 10:21:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-25 10:21:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-25 10:21:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-25 10:21:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-25 10:21:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-25 10:26:22 --> [REQ_ID=fdbc10662d45] [REQUEST][START] HEAD /
DEBUG - 2026-03-25 10:26:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-25 10:26:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-25 10:26:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-25 10:26:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-25 10:26:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-25 10:31:22 --> [REQ_ID=341f297142a4] [REQUEST][START] HEAD /
DEBUG - 2026-03-25 10:31:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-25 10:31:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-25 10:31:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-25 10:31:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-25 10:31:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-25 10:36:22 --> [REQ_ID=04687b728abb] [REQUEST][START] HEAD /
DEBUG - 2026-03-25 10:36:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-25 10:36:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-25 10:36:23 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-25 10:36:23 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-25 10:36:23 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-25 10:39:37 --> [REQ_ID=e143a9fdd493] [REQUEST][START] GET /
DEBUG - 2026-03-25 10:39:37 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-25 10:39:37 --> [REQ_ID=e143a9fdd493] [FILTER_BEFORE] /
DEBUG - 2026-03-25 10:39:37 --> [REQ_ID=e143a9fdd493] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-25 10:39:37 --> [REQ_ID=e143a9fdd493] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-25 10:39:37 --> [CSRF] token name=csrf_test_name hash=2d36f1b1fa615aef9240ff6f784e920f
DEBUG - 2026-03-25 10:39:37 --> [REQ_ID=9139c60f2b2c] [INIT] App\Controllers\Home::GET
INFO - 2026-03-25 10:39:37 --> [REQ_ID=9139c60f2b2c] [MEMORY][controller-start] 6291456
INFO - 2026-03-25 10:39:37 --> [REQ_ID=9139c60f2b2c] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-25 10:39:37 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-25 10:39:37 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-03-25 10:39:37 --> [REQ_ID=9139c60f2b2c] [VIEW_RENDER] themes/public/home
INFO - 2026-03-25 10:39:37 --> [REQ_ID=9139c60f2b2c] [MEMORY][commonData:start] 10485760
INFO - 2026-03-25 10:39:37 --> themesMemory usage: 10485760
DEBUG - 2026-03-25 10:39:37 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-25 10:39:37 --> [REQ_ID=e143a9fdd493] [FILTER_AFTER]
DEBUG - 2026-03-25 10:39:37 --> [REQ_ID=e143a9fdd493] [LIFECYCLE][END] status=200 duration_ms=684.65 memory_delta=4194304
INFO - 2026-03-25 10:39:37 --> [REQ_ID=9139c60f2b2c] [PERF] Execution time=0.682686
DEBUG - 2026-03-25 10:39:37 --> [REQ_ID=e143a9fdd493] [REQUEST][END]
INFO - 2026-03-25 10:39:37 --> [REQ_ID=e143a9fdd493] [PERF] Execution time=0.725043
DEBUG - 2026-03-25 10:39:43 --> [REQ_ID=166f1a6a625c] [REQUEST][START] GET /
DEBUG - 2026-03-25 10:39:43 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-25 10:39:43 --> [REQ_ID=166f1a6a625c] [FILTER_BEFORE] /
DEBUG - 2026-03-25 10:39:43 --> [REQ_ID=166f1a6a625c] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-25 10:39:43 --> [REQ_ID=166f1a6a625c] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-25 10:39:43 --> [CSRF] token name=csrf_test_name hash=2d36f1b1fa615aef9240ff6f784e920f
DEBUG - 2026-03-25 10:39:43 --> [REQ_ID=38d8e1b98f6c] [INIT] App\Controllers\Home::GET
INFO - 2026-03-25 10:39:43 --> [REQ_ID=38d8e1b98f6c] [MEMORY][controller-start] 6291456
INFO - 2026-03-25 10:39:43 --> [REQ_ID=38d8e1b98f6c] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-25 10:39:43 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-25 10:39:43 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
DEBUG - 2026-03-25 10:39:43 --> [REQ_ID=38d8e1b98f6c] [VIEW_RENDER] themes/public/home
INFO - 2026-03-25 10:39:43 --> [REQ_ID=38d8e1b98f6c] [MEMORY][commonData:start] 8388608
INFO - 2026-03-25 10:39:43 --> themesMemory usage: 8388608
DEBUG - 2026-03-25 10:39:43 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-25 10:39:43 --> [REQ_ID=166f1a6a625c] [FILTER_AFTER]
DEBUG - 2026-03-25 10:39:43 --> [REQ_ID=166f1a6a625c] [LIFECYCLE][END] status=200 duration_ms=542.56 memory_delta=2097152
INFO - 2026-03-25 10:39:43 --> [REQ_ID=38d8e1b98f6c] [PERF] Execution time=0.542319
DEBUG - 2026-03-25 10:39:43 --> [REQ_ID=166f1a6a625c] [REQUEST][END]
INFO - 2026-03-25 10:39:43 --> [REQ_ID=166f1a6a625c] [PERF] Execution time=0.592626
DEBUG - 2026-03-25 10:39:49 --> [REQ_ID=cc50e00d0142] [REQUEST][START] GET /
DEBUG - 2026-03-25 10:39:49 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-25 10:39:49 --> [REQ_ID=cc50e00d0142] [FILTER_BEFORE] /
DEBUG - 2026-03-25 10:39:49 --> [REQ_ID=cc50e00d0142] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-25 10:39:49 --> [REQ_ID=cc50e00d0142] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-25 10:39:49 --> [CSRF] token name=csrf_test_name hash=2d36f1b1fa615aef9240ff6f784e920f
DEBUG - 2026-03-25 10:39:49 --> [REQ_ID=9387b850f449] [INIT] App\Controllers\Home::GET
INFO - 2026-03-25 10:39:49 --> [REQ_ID=9387b850f449] [MEMORY][controller-start] 4194304
INFO - 2026-03-25 10:39:49 --> [REQ_ID=9387b850f449] [MEMORY][commonData:start] 4194304
DEBUG - 2026-03-25 10:39:49 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-25 10:39:49 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
DEBUG - 2026-03-25 10:39:49 --> [REQ_ID=9387b850f449] [VIEW_RENDER] themes/public/home
INFO - 2026-03-25 10:39:49 --> [REQ_ID=9387b850f449] [MEMORY][commonData:start] 8388608
INFO - 2026-03-25 10:39:49 --> themesMemory usage: 8388608
DEBUG - 2026-03-25 10:39:49 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-25 10:39:49 --> [REQ_ID=cc50e00d0142] [FILTER_AFTER]
DEBUG - 2026-03-25 10:39:49 --> [REQ_ID=cc50e00d0142] [LIFECYCLE][END] status=200 duration_ms=487.17 memory_delta=4194304
INFO - 2026-03-25 10:39:49 --> [REQ_ID=9387b850f449] [PERF] Execution time=0.486297
DEBUG - 2026-03-25 10:39:49 --> [REQ_ID=cc50e00d0142] [REQUEST][END]
INFO - 2026-03-25 10:39:49 --> [REQ_ID=cc50e00d0142] [PERF] Execution time=0.500602
DEBUG - 2026-03-25 10:41:22 --> [REQ_ID=fa461e23854f] [REQUEST][START] HEAD /
DEBUG - 2026-03-25 10:41:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-25 10:41:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-25 10:41:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-25 10:41:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-25 10:41:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-25 10:46:22 --> [REQ_ID=1ed430b922cc] [REQUEST][START] HEAD /
DEBUG - 2026-03-25 10:46:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-25 10:46:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-25 10:46:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-25 10:46:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-25 10:46:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-25 10:51:22 --> [REQ_ID=637bc508b916] [REQUEST][START] HEAD /
DEBUG - 2026-03-25 10:51:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-25 10:51:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-25 10:51:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-25 10:51:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-25 10:51:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-25 10:56:22 --> [REQ_ID=06c98762d235] [REQUEST][START] HEAD /
DEBUG - 2026-03-25 10:56:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-25 10:56:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-25 10:56:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-25 10:56:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-25 10:56:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-25 11:00:02 --> [REQ_ID=9dab1efaa3c3] [REQUEST][START] GET /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-25 11:00:02 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-25 11:00:02 --> [REQ_ID=9dab1efaa3c3] [FILTER_BEFORE] /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-25 11:00:02 --> [REQ_ID=9dab1efaa3c3] [ROUTE] Controller=\App\Modules\Management\Controllers\ManagementAPIController Method=Run_CRON_Tasks
DEBUG - 2026-03-25 11:00:02 --> [REQ_ID=9dab1efaa3c3] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-25 11:00:02 --> [REQ_ID=9dab1efaa3c3] [REQUEST][END]
INFO - 2026-03-25 11:00:02 --> [REQ_ID=9dab1efaa3c3] [PERF] Execution time=0.053687
DEBUG - 2026-03-25 11:01:22 --> [REQ_ID=00d91c53f67d] [REQUEST][START] HEAD /
DEBUG - 2026-03-25 11:01:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-25 11:01:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-25 11:01:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-25 11:01:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-25 11:01:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-25 11:06:22 --> [REQ_ID=3b1664672acb] [REQUEST][START] HEAD /
DEBUG - 2026-03-25 11:06:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-25 11:06:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-25 11:06:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-25 11:06:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-25 11:06:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-25 11:11:22 --> [REQ_ID=9351d5c579bb] [REQUEST][START] HEAD /
DEBUG - 2026-03-25 11:11:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-25 11:11:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-25 11:11:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-25 11:11:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-25 11:11:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-25 11:15:01 --> [REQ_ID=8f94a5fdbc7b] [REQUEST][START] GET /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-25 11:15:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-25 11:15:01 --> [REQ_ID=8f94a5fdbc7b] [FILTER_BEFORE] /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-25 11:15:01 --> [REQ_ID=8f94a5fdbc7b] [ROUTE] Controller=\App\Modules\APIs\Controllers\AlertsAPIController Method=fetchEmailAlerts
DEBUG - 2026-03-25 11:15:01 --> [REQ_ID=8f94a5fdbc7b] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-25 11:15:01 --> [REQ_ID=8f94a5fdbc7b] [REQUEST][END]
INFO - 2026-03-25 11:15:01 --> [REQ_ID=8f94a5fdbc7b] [PERF] Execution time=0.045955
DEBUG - 2026-03-25 11:16:22 --> [REQ_ID=18cf03da983b] [REQUEST][START] HEAD /
DEBUG - 2026-03-25 11:16:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-25 11:16:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-25 11:16:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-25 11:16:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-25 11:16:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-25 11:21:22 --> [REQ_ID=8a6177db75c6] [REQUEST][START] HEAD /
DEBUG - 2026-03-25 11:21:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-25 11:21:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-25 11:21:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-25 11:21:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-25 11:21:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-25 11:26:22 --> [REQ_ID=544324c739e7] [REQUEST][START] HEAD /
DEBUG - 2026-03-25 11:26:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-25 11:26:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-25 11:26:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-25 11:26:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-25 11:26:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-25 11:31:22 --> [REQ_ID=64b80c4c1583] [REQUEST][START] HEAD /
DEBUG - 2026-03-25 11:31:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-25 11:31:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-25 11:31:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-25 11:31:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-25 11:31:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-25 11:33:07 --> [REQ_ID=dd7d5a68b2f1] [REQUEST][START] GET /index.php/register
DEBUG - 2026-03-25 11:33:07 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-25 11:33:07 --> [REQ_ID=dd7d5a68b2f1] [REQUEST][END]
INFO - 2026-03-25 11:33:07 --> [REQ_ID=dd7d5a68b2f1] [PERF] Execution time=0.040873
DEBUG - 2026-03-25 11:36:22 --> [REQ_ID=395dc84489c4] [REQUEST][START] HEAD /
DEBUG - 2026-03-25 11:36:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-25 11:36:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-25 11:36:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-25 11:36:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-25 11:36:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-25 11:41:22 --> [REQ_ID=ed72834fa8d8] [REQUEST][START] HEAD /
DEBUG - 2026-03-25 11:41:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-25 11:41:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-25 11:41:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-25 11:41:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-25 11:41:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-25 11:46:22 --> [REQ_ID=3d443bba4528] [REQUEST][START] HEAD /
DEBUG - 2026-03-25 11:46:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-25 11:46:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-25 11:46:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-25 11:46:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-25 11:46:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-25 11:51:22 --> [REQ_ID=c281fd7340b5] [REQUEST][START] HEAD /
DEBUG - 2026-03-25 11:51:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-25 11:51:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-25 11:51:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-25 11:51:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-25 11:51:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-25 11:56:22 --> [REQ_ID=12d6cfd4445f] [REQUEST][START] HEAD /
DEBUG - 2026-03-25 11:56:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-25 11:56:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-25 11:56:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-25 11:56:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-25 11:56:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-25 12:00:02 --> [REQ_ID=1d70d81e85d1] [REQUEST][START] GET /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-25 12:00:02 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-25 12:00:02 --> [REQ_ID=1d70d81e85d1] [FILTER_BEFORE] /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-25 12:00:02 --> [REQ_ID=1d70d81e85d1] [ROUTE] Controller=\App\Modules\Management\Controllers\ManagementAPIController Method=Run_CRON_Tasks
DEBUG - 2026-03-25 12:00:02 --> [REQ_ID=1d70d81e85d1] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-25 12:00:02 --> [REQ_ID=1d70d81e85d1] [REQUEST][END]
INFO - 2026-03-25 12:00:02 --> [REQ_ID=1d70d81e85d1] [PERF] Execution time=0.050044
DEBUG - 2026-03-25 12:01:22 --> [REQ_ID=3f0c0475666b] [REQUEST][START] HEAD /
DEBUG - 2026-03-25 12:01:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-25 12:01:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-25 12:01:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-25 12:01:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-25 12:01:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-25 12:06:22 --> [REQ_ID=764a9854ee2a] [REQUEST][START] HEAD /
DEBUG - 2026-03-25 12:06:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-25 12:06:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-25 12:06:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-25 12:06:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-25 12:06:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-25 12:11:22 --> [REQ_ID=22bdd1b008f8] [REQUEST][START] HEAD /
DEBUG - 2026-03-25 12:11:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-25 12:11:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-25 12:11:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-25 12:11:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-25 12:11:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-25 12:15:01 --> [REQ_ID=b55b89768924] [REQUEST][START] GET /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-25 12:15:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-25 12:15:01 --> [REQ_ID=b55b89768924] [FILTER_BEFORE] /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-25 12:15:01 --> [REQ_ID=b55b89768924] [ROUTE] Controller=\App\Modules\APIs\Controllers\AlertsAPIController Method=fetchEmailAlerts
DEBUG - 2026-03-25 12:15:01 --> [REQ_ID=b55b89768924] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-25 12:15:01 --> [REQ_ID=b55b89768924] [REQUEST][END]
INFO - 2026-03-25 12:15:01 --> [REQ_ID=b55b89768924] [PERF] Execution time=0.046819
DEBUG - 2026-03-25 12:16:22 --> [REQ_ID=4d149c0a1600] [REQUEST][START] HEAD /
DEBUG - 2026-03-25 12:16:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-25 12:16:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-25 12:16:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-25 12:16:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-25 12:16:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-25 12:21:22 --> [REQ_ID=4d4493cb4fb3] [REQUEST][START] HEAD /
DEBUG - 2026-03-25 12:21:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-25 12:21:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-25 12:21:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-25 12:21:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-25 12:21:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-25 12:26:22 --> [REQ_ID=901a355bc863] [REQUEST][START] HEAD /
DEBUG - 2026-03-25 12:26:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-25 12:26:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-25 12:26:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-25 12:26:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-25 12:26:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-25 12:31:22 --> [REQ_ID=6018816ab80b] [REQUEST][START] HEAD /
DEBUG - 2026-03-25 12:31:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-25 12:31:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-25 12:31:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-25 12:31:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-25 12:31:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-25 12:36:22 --> [REQ_ID=06ec7d5e0932] [REQUEST][START] HEAD /
DEBUG - 2026-03-25 12:36:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-25 12:36:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-25 12:36:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-25 12:36:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-25 12:36:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-25 12:41:22 --> [REQ_ID=5c2dbeca8819] [REQUEST][START] HEAD /
DEBUG - 2026-03-25 12:41:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-25 12:41:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-25 12:41:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-25 12:41:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-25 12:41:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-25 12:46:22 --> [REQ_ID=36e1ac0cc60e] [REQUEST][START] HEAD /
DEBUG - 2026-03-25 12:46:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-25 12:46:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-25 12:46:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-25 12:46:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-25 12:46:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-25 12:46:24 --> [REQ_ID=b9f25deef47b] [REQUEST][START] GET /
DEBUG - 2026-03-25 12:46:24 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-25 12:46:24 --> [REQ_ID=b9f25deef47b] [FILTER_BEFORE] /
DEBUG - 2026-03-25 12:46:24 --> [REQ_ID=b9f25deef47b] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-25 12:46:24 --> [REQ_ID=b9f25deef47b] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-25 12:46:24 --> [CSRF] token name=csrf_test_name hash=a1b8b818ab6bbb7cb8e7aa82096e6bff
DEBUG - 2026-03-25 12:46:24 --> [REQ_ID=c8d193be408b] [INIT] App\Controllers\Home::GET
INFO - 2026-03-25 12:46:24 --> [REQ_ID=c8d193be408b] [MEMORY][controller-start] 4194304
INFO - 2026-03-25 12:46:24 --> [REQ_ID=c8d193be408b] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-25 12:46:24 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-25 12:46:24 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-03-25 12:46:24 --> [REQ_ID=c8d193be408b] [VIEW_RENDER] themes/public/home
INFO - 2026-03-25 12:46:24 --> [REQ_ID=c8d193be408b] [MEMORY][commonData:start] 8388608
INFO - 2026-03-25 12:46:24 --> themesMemory usage: 8388608
DEBUG - 2026-03-25 12:46:24 --> [MetaService] slug= pageName=Home cacheHit= path=DB
DEBUG - 2026-03-25 12:46:24 --> [REQ_ID=b9f25deef47b] [FILTER_AFTER]
DEBUG - 2026-03-25 12:46:24 --> [REQ_ID=b9f25deef47b] [LIFECYCLE][END] status=200 duration_ms=583.49 memory_delta=4194304
INFO - 2026-03-25 12:46:24 --> [REQ_ID=c8d193be408b] [PERF] Execution time=0.580509
DEBUG - 2026-03-25 12:46:24 --> [REQ_ID=b9f25deef47b] [REQUEST][END]
INFO - 2026-03-25 12:46:24 --> [REQ_ID=b9f25deef47b] [PERF] Execution time=0.610854
DEBUG - 2026-03-25 12:51:22 --> [REQ_ID=f5afa87ada2f] [REQUEST][START] HEAD /
DEBUG - 2026-03-25 12:51:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-25 12:51:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-25 12:51:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-25 12:51:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-25 12:51:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-25 12:56:22 --> [REQ_ID=fec1b6976739] [REQUEST][START] HEAD /
DEBUG - 2026-03-25 12:56:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-25 12:56:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-25 12:56:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-25 12:56:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-25 12:56:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-25 13:00:02 --> [REQ_ID=26558e3b6ad7] [REQUEST][START] GET /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-25 13:00:02 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-25 13:00:02 --> [REQ_ID=26558e3b6ad7] [FILTER_BEFORE] /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-25 13:00:02 --> [REQ_ID=26558e3b6ad7] [ROUTE] Controller=\App\Modules\Management\Controllers\ManagementAPIController Method=Run_CRON_Tasks
DEBUG - 2026-03-25 13:00:02 --> [REQ_ID=26558e3b6ad7] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-25 13:00:02 --> [REQ_ID=26558e3b6ad7] [REQUEST][END]
INFO - 2026-03-25 13:00:02 --> [REQ_ID=26558e3b6ad7] [PERF] Execution time=0.038572
DEBUG - 2026-03-25 13:01:10 --> [REQ_ID=b881d82654a7] [REQUEST][START] GET /index.php/
DEBUG - 2026-03-25 13:01:10 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-25 13:01:10 --> [REQ_ID=b881d82654a7] [REQUEST][END]
INFO - 2026-03-25 13:01:10 --> [REQ_ID=b881d82654a7] [PERF] Execution time=0.046167
DEBUG - 2026-03-25 13:01:22 --> [REQ_ID=c8d6e94475be] [REQUEST][START] HEAD /
DEBUG - 2026-03-25 13:01:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-25 13:01:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-25 13:01:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-25 13:01:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-25 13:01:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-25 13:04:28 --> [REQ_ID=66dc7bb36149] [REQUEST][START] GET /
DEBUG - 2026-03-25 13:04:28 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-25 13:04:28 --> [REQ_ID=66dc7bb36149] [FILTER_BEFORE] /
DEBUG - 2026-03-25 13:04:28 --> [REQ_ID=66dc7bb36149] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-25 13:04:28 --> [REQ_ID=66dc7bb36149] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-25 13:04:28 --> [CSRF] token name=csrf_test_name hash=2e7d38b39b0dcc6d9f723897fda6dc32
DEBUG - 2026-03-25 13:04:28 --> [REQ_ID=84a1bee3a9a8] [INIT] App\Controllers\Home::GET
INFO - 2026-03-25 13:04:28 --> [REQ_ID=84a1bee3a9a8] [MEMORY][controller-start] 6291456
INFO - 2026-03-25 13:04:28 --> [REQ_ID=84a1bee3a9a8] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-25 13:04:28 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-25 13:04:29 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-03-25 13:04:29 --> [REQ_ID=84a1bee3a9a8] [VIEW_RENDER] themes/public/home
INFO - 2026-03-25 13:04:29 --> [REQ_ID=84a1bee3a9a8] [MEMORY][commonData:start] 10485760
INFO - 2026-03-25 13:04:29 --> themesMemory usage: 10485760
DEBUG - 2026-03-25 13:04:29 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-25 13:04:29 --> [REQ_ID=66dc7bb36149] [FILTER_AFTER]
DEBUG - 2026-03-25 13:04:29 --> [REQ_ID=66dc7bb36149] [LIFECYCLE][END] status=200 duration_ms=643.44 memory_delta=4194304
INFO - 2026-03-25 13:04:29 --> [REQ_ID=84a1bee3a9a8] [PERF] Execution time=0.640556
DEBUG - 2026-03-25 13:04:29 --> [REQ_ID=66dc7bb36149] [REQUEST][END]
INFO - 2026-03-25 13:04:29 --> [REQ_ID=66dc7bb36149] [PERF] Execution time=0.694776
DEBUG - 2026-03-25 13:06:22 --> [REQ_ID=9cafa619d45e] [REQUEST][START] HEAD /
DEBUG - 2026-03-25 13:06:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-25 13:06:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-25 13:06:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-25 13:06:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-25 13:06:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-25 13:11:22 --> [REQ_ID=33daff305ecb] [REQUEST][START] HEAD /
DEBUG - 2026-03-25 13:11:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-25 13:11:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-25 13:11:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-25 13:11:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-25 13:11:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-25 13:15:02 --> [REQ_ID=a3d0ca31801e] [REQUEST][START] GET /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-25 13:15:02 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-25 13:15:02 --> [REQ_ID=a3d0ca31801e] [FILTER_BEFORE] /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-25 13:15:02 --> [REQ_ID=a3d0ca31801e] [ROUTE] Controller=\App\Modules\APIs\Controllers\AlertsAPIController Method=fetchEmailAlerts
DEBUG - 2026-03-25 13:15:02 --> [REQ_ID=a3d0ca31801e] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-25 13:15:02 --> [REQ_ID=a3d0ca31801e] [REQUEST][END]
INFO - 2026-03-25 13:15:02 --> [REQ_ID=a3d0ca31801e] [PERF] Execution time=0.046014
DEBUG - 2026-03-25 13:15:57 --> [REQ_ID=ad4cbc30024d] [REQUEST][START] GET /index.php/Budget
DEBUG - 2026-03-25 13:15:57 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-25 13:15:57 --> [REQ_ID=ad4cbc30024d] [REQUEST][END]
INFO - 2026-03-25 13:15:57 --> [REQ_ID=ad4cbc30024d] [PERF] Execution time=0.023022
DEBUG - 2026-03-25 13:16:22 --> [REQ_ID=71f3de162c70] [REQUEST][START] HEAD /
DEBUG - 2026-03-25 13:16:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-25 13:16:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-25 13:16:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-25 13:16:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-25 13:16:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-25 13:16:44 --> [REQ_ID=a77606116446] [REQUEST][START] HEAD /
DEBUG - 2026-03-25 13:16:44 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-25 13:16:44 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-25 13:16:44 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-25 13:16:44 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-25 13:16:44 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: https://mymiwallet.com
DEBUG - 2026-03-25 13:19:53 --> [REQ_ID=ea4b4bc2e8ad] [REQUEST][START] GET /
DEBUG - 2026-03-25 13:19:53 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-25 13:19:53 --> [REQ_ID=ea4b4bc2e8ad] [FILTER_BEFORE] /
DEBUG - 2026-03-25 13:19:53 --> [REQ_ID=ea4b4bc2e8ad] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-25 13:19:53 --> [REQ_ID=ea4b4bc2e8ad] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-25 13:19:53 --> [CSRF] token name=csrf_test_name hash=4a013a52d69b544b516b066dbfc6f07c
DEBUG - 2026-03-25 13:19:53 --> [REQ_ID=c375ce1818f9] [INIT] App\Controllers\Home::GET
INFO - 2026-03-25 13:19:53 --> [REQ_ID=c375ce1818f9] [MEMORY][controller-start] 6291456
INFO - 2026-03-25 13:19:53 --> [REQ_ID=c375ce1818f9] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-25 13:19:53 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-25 13:19:54 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-03-25 13:19:54 --> [REQ_ID=c375ce1818f9] [VIEW_RENDER] themes/public/home
INFO - 2026-03-25 13:19:54 --> [REQ_ID=c375ce1818f9] [MEMORY][commonData:start] 10485760
INFO - 2026-03-25 13:19:54 --> themesMemory usage: 10485760
DEBUG - 2026-03-25 13:19:54 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-25 13:19:54 --> [REQ_ID=ea4b4bc2e8ad] [FILTER_AFTER]
DEBUG - 2026-03-25 13:19:54 --> [REQ_ID=ea4b4bc2e8ad] [LIFECYCLE][END] status=200 duration_ms=617.03 memory_delta=4194304
INFO - 2026-03-25 13:19:54 --> [REQ_ID=c375ce1818f9] [PERF] Execution time=0.614879
DEBUG - 2026-03-25 13:19:54 --> [REQ_ID=ea4b4bc2e8ad] [REQUEST][END]
INFO - 2026-03-25 13:19:54 --> [REQ_ID=ea4b4bc2e8ad] [PERF] Execution time=0.658611
DEBUG - 2026-03-25 13:21:22 --> [REQ_ID=018f560c9a78] [REQUEST][START] HEAD /
DEBUG - 2026-03-25 13:21:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-25 13:21:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-25 13:21:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-25 13:21:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-25 13:21:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-25 13:26:22 --> [REQ_ID=0ce177a1e5e1] [REQUEST][START] HEAD /
DEBUG - 2026-03-25 13:26:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-25 13:26:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-25 13:26:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-25 13:26:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-25 13:26:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-25 13:31:22 --> [REQ_ID=a0a93dd24c01] [REQUEST][START] HEAD /
DEBUG - 2026-03-25 13:31:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-25 13:31:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-25 13:31:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-25 13:31:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-25 13:31:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-25 13:36:22 --> [REQ_ID=a1d85cd36140] [REQUEST][START] HEAD /
DEBUG - 2026-03-25 13:36:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-25 13:36:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-25 13:36:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-25 13:36:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-25 13:36:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-25 13:41:22 --> [REQ_ID=5fca6ef54b55] [REQUEST][START] HEAD /
DEBUG - 2026-03-25 13:41:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-25 13:41:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-25 13:41:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-25 13:41:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-25 13:41:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-25 13:46:22 --> [REQ_ID=8890acd126c7] [REQUEST][START] HEAD /
DEBUG - 2026-03-25 13:46:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-25 13:46:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-25 13:46:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-25 13:46:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-25 13:46:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-25 13:51:22 --> [REQ_ID=9d2a6ab58d8d] [REQUEST][START] HEAD /
DEBUG - 2026-03-25 13:51:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-25 13:51:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-25 13:51:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-25 13:51:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-25 13:51:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-25 13:53:20 --> [REQ_ID=e84e78045a56] [REQUEST][START] GET /index.php/How-It-Works/Investment-Dashboard
DEBUG - 2026-03-25 13:53:20 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-25 13:53:20 --> [REQ_ID=e84e78045a56] [FILTER_BEFORE] /index.php/How-It-Works/Investment-Dashboard
DEBUG - 2026-03-25 13:53:20 --> [REQ_ID=e84e78045a56] [ROUTE] Controller=\App\Modules\Blog\Controllers\HowItWorksController Method=show
DEBUG - 2026-03-25 13:53:20 --> [REQ_ID=e84e78045a56] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/How-It-Works/Investment-Dashboard
DEBUG - 2026-03-25 13:53:20 --> [CSRF] token name=csrf_test_name hash=f31fb934f19abcfd7c0c106c33ca1b65
DEBUG - 2026-03-25 13:53:20 --> [REQ_ID=5764320196f9] [INIT] App\Modules\Blog\Controllers\HowItWorksController::GET
INFO - 2026-03-25 13:53:20 --> [REQ_ID=5764320196f9] [MEMORY][controller-start] 6291456
DEBUG - 2026-03-25 13:53:21 --> [REQ_ID=5764320196f9] [METHOD_ENTRY] show
DEBUG - 2026-03-25 13:53:21 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-25 13:53:21 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-25 13:53:21 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-25 13:53:21 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-25 13:53:21 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-25 13:53:21 --> MyMICoin: guest context detected; skipping user-specific preload.
INFO - 2026-03-25 13:53:21 --> [REQ_ID=5764320196f9] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-25 13:53:21 --> [REQ_ID=e84e78045a56] [FILTER_AFTER]
DEBUG - 2026-03-25 13:53:21 --> [REQ_ID=e84e78045a56] [LIFECYCLE][END] status=200 duration_ms=745.20 memory_delta=4194304
INFO - 2026-03-25 13:53:21 --> [REQ_ID=5764320196f9] [PERF] Execution time=0.743463
DEBUG - 2026-03-25 13:53:21 --> [REQ_ID=e84e78045a56] [REQUEST][END]
INFO - 2026-03-25 13:53:21 --> [REQ_ID=e84e78045a56] [PERF] Execution time=0.786815
DEBUG - 2026-03-25 13:56:22 --> [REQ_ID=081c8de9be12] [REQUEST][START] HEAD /
DEBUG - 2026-03-25 13:56:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-25 13:56:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-25 13:56:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-25 13:56:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-25 13:56:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-25 13:56:29 --> [REQ_ID=5cbd6e6252ec] [REQUEST][START] GET /
DEBUG - 2026-03-25 13:56:29 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-25 13:56:29 --> [REQ_ID=5cbd6e6252ec] [FILTER_BEFORE] /
DEBUG - 2026-03-25 13:56:29 --> [REQ_ID=5cbd6e6252ec] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-25 13:56:29 --> [REQ_ID=5cbd6e6252ec] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-25 13:56:29 --> [CSRF] token name=csrf_test_name hash=61611cb177bb9c4e4dc2e9ee7fba229e
DEBUG - 2026-03-25 13:56:29 --> [REQ_ID=7306f0fc1265] [INIT] App\Controllers\Home::GET
INFO - 2026-03-25 13:56:29 --> [REQ_ID=7306f0fc1265] [MEMORY][controller-start] 4194304
INFO - 2026-03-25 13:56:29 --> [REQ_ID=7306f0fc1265] [MEMORY][commonData:start] 4194304
DEBUG - 2026-03-25 13:56:29 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-25 13:56:30 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-03-25 13:56:30 --> [REQ_ID=7306f0fc1265] [VIEW_RENDER] themes/public/home
INFO - 2026-03-25 13:56:30 --> [REQ_ID=7306f0fc1265] [MEMORY][commonData:start] 8388608
INFO - 2026-03-25 13:56:30 --> themesMemory usage: 8388608
DEBUG - 2026-03-25 13:56:30 --> [MetaService] slug= pageName=Home cacheHit= path=DB
DEBUG - 2026-03-25 13:56:30 --> [REQ_ID=5cbd6e6252ec] [FILTER_AFTER]
DEBUG - 2026-03-25 13:56:30 --> [REQ_ID=5cbd6e6252ec] [LIFECYCLE][END] status=200 duration_ms=716.04 memory_delta=4194304
INFO - 2026-03-25 13:56:30 --> [REQ_ID=7306f0fc1265] [PERF] Execution time=0.713482
DEBUG - 2026-03-25 13:56:30 --> [REQ_ID=5cbd6e6252ec] [REQUEST][END]
INFO - 2026-03-25 13:56:30 --> [REQ_ID=5cbd6e6252ec] [PERF] Execution time=0.740397
DEBUG - 2026-03-25 14:00:01 --> [REQ_ID=30f5fef68560] [REQUEST][START] GET /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-25 14:00:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-25 14:00:01 --> [REQ_ID=30f5fef68560] [FILTER_BEFORE] /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-25 14:00:01 --> [REQ_ID=30f5fef68560] [ROUTE] Controller=\App\Modules\Management\Controllers\ManagementAPIController Method=Run_CRON_Tasks
DEBUG - 2026-03-25 14:00:01 --> [REQ_ID=30f5fef68560] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-25 14:00:01 --> [REQ_ID=30f5fef68560] [REQUEST][END]
INFO - 2026-03-25 14:00:01 --> [REQ_ID=30f5fef68560] [PERF] Execution time=0.049878
DEBUG - 2026-03-25 14:01:22 --> [REQ_ID=19dfedc4ac7b] [REQUEST][START] HEAD /
DEBUG - 2026-03-25 14:01:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-25 14:01:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-25 14:01:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-25 14:01:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-25 14:01:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-25 14:03:46 --> [REQ_ID=d59d9c9b0c83] [REQUEST][START] GET /
DEBUG - 2026-03-25 14:03:46 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-25 14:03:46 --> [REQ_ID=d59d9c9b0c83] [FILTER_BEFORE] /
DEBUG - 2026-03-25 14:03:46 --> [REQ_ID=d59d9c9b0c83] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-25 14:03:46 --> [REQ_ID=d59d9c9b0c83] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-25 14:03:46 --> [CSRF] token name=csrf_test_name hash=577a078f308706ef69db8eb4e1f983ff
DEBUG - 2026-03-25 14:03:46 --> [REQ_ID=ae2048a6a063] [INIT] App\Controllers\Home::GET
INFO - 2026-03-25 14:03:46 --> [REQ_ID=ae2048a6a063] [MEMORY][controller-start] 6291456
INFO - 2026-03-25 14:03:46 --> [REQ_ID=ae2048a6a063] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-25 14:03:46 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-25 14:03:47 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
DEBUG - 2026-03-25 14:03:47 --> [REQ_ID=ae2048a6a063] [VIEW_RENDER] themes/public/home
INFO - 2026-03-25 14:03:47 --> [REQ_ID=ae2048a6a063] [MEMORY][commonData:start] 10485760
INFO - 2026-03-25 14:03:47 --> themesMemory usage: 10485760
DEBUG - 2026-03-25 14:03:47 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-25 14:03:47 --> [REQ_ID=d59d9c9b0c83] [FILTER_AFTER]
DEBUG - 2026-03-25 14:03:47 --> [REQ_ID=d59d9c9b0c83] [LIFECYCLE][END] status=200 duration_ms=707.55 memory_delta=4194304
INFO - 2026-03-25 14:03:47 --> [REQ_ID=ae2048a6a063] [PERF] Execution time=0.705728
DEBUG - 2026-03-25 14:03:47 --> [REQ_ID=d59d9c9b0c83] [REQUEST][END]
INFO - 2026-03-25 14:03:47 --> [REQ_ID=d59d9c9b0c83] [PERF] Execution time=0.745547
DEBUG - 2026-03-25 14:06:22 --> [REQ_ID=95c8936abf5c] [REQUEST][START] HEAD /
DEBUG - 2026-03-25 14:06:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-25 14:06:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-25 14:06:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-25 14:06:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-25 14:06:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-25 14:11:22 --> [REQ_ID=aee68c2446e3] [REQUEST][START] HEAD /
DEBUG - 2026-03-25 14:11:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-25 14:11:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-25 14:11:23 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-25 14:11:23 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-25 14:11:23 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-25 14:13:17 --> [REQ_ID=320b7eced52b] [REQUEST][START] GET /index.php/Free/register/MyMI-Budgeting-Tool
DEBUG - 2026-03-25 14:13:17 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-25 14:13:17 --> [REQ_ID=320b7eced52b] [REQUEST][END]
INFO - 2026-03-25 14:13:17 --> [REQ_ID=320b7eced52b] [PERF] Execution time=0.041390
DEBUG - 2026-03-25 14:15:01 --> [REQ_ID=011478c455c3] [REQUEST][START] GET /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-25 14:15:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-25 14:15:01 --> [REQ_ID=011478c455c3] [FILTER_BEFORE] /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-25 14:15:01 --> [REQ_ID=011478c455c3] [ROUTE] Controller=\App\Modules\APIs\Controllers\AlertsAPIController Method=fetchEmailAlerts
DEBUG - 2026-03-25 14:15:01 --> [REQ_ID=011478c455c3] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-25 14:15:01 --> [REQ_ID=011478c455c3] [REQUEST][END]
INFO - 2026-03-25 14:15:01 --> [REQ_ID=011478c455c3] [PERF] Execution time=0.047739
DEBUG - 2026-03-25 14:16:22 --> [REQ_ID=9bdc50c0f6f0] [REQUEST][START] HEAD /
DEBUG - 2026-03-25 14:16:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-25 14:16:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-25 14:16:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-25 14:16:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-25 14:16:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-25 14:21:22 --> [REQ_ID=b9d5619e0bd0] [REQUEST][START] HEAD /
DEBUG - 2026-03-25 14:21:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-25 14:21:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-25 14:21:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-25 14:21:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-25 14:21:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-25 14:25:32 --> [REQ_ID=00efcbb038b7] [REQUEST][START] GET /
DEBUG - 2026-03-25 14:25:32 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-25 14:25:32 --> [REQ_ID=00efcbb038b7] [FILTER_BEFORE] /
DEBUG - 2026-03-25 14:25:32 --> [REQ_ID=00efcbb038b7] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-25 14:25:32 --> [REQ_ID=00efcbb038b7] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-25 14:25:32 --> [CSRF] token name=csrf_test_name hash=4f70084d14a8ecf443b720e01498d89c
DEBUG - 2026-03-25 14:25:32 --> [REQ_ID=32897c1a62c1] [INIT] App\Controllers\Home::GET
INFO - 2026-03-25 14:25:32 --> [REQ_ID=32897c1a62c1] [MEMORY][controller-start] 6291456
INFO - 2026-03-25 14:25:32 --> [REQ_ID=32897c1a62c1] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-25 14:25:32 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-25 14:25:33 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-03-25 14:25:33 --> [REQ_ID=32897c1a62c1] [VIEW_RENDER] themes/public/home
INFO - 2026-03-25 14:25:33 --> [REQ_ID=32897c1a62c1] [MEMORY][commonData:start] 10485760
INFO - 2026-03-25 14:25:33 --> themesMemory usage: 10485760
DEBUG - 2026-03-25 14:25:33 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-25 14:25:33 --> [REQ_ID=00efcbb038b7] [FILTER_AFTER]
DEBUG - 2026-03-25 14:25:33 --> [REQ_ID=00efcbb038b7] [LIFECYCLE][END] status=200 duration_ms=687.38 memory_delta=4194304
INFO - 2026-03-25 14:25:33 --> [REQ_ID=32897c1a62c1] [PERF] Execution time=0.685428
DEBUG - 2026-03-25 14:25:33 --> [REQ_ID=00efcbb038b7] [REQUEST][END]
INFO - 2026-03-25 14:25:33 --> [REQ_ID=00efcbb038b7] [PERF] Execution time=0.725486
DEBUG - 2026-03-25 14:26:22 --> [REQ_ID=d7f563fbf728] [REQUEST][START] HEAD /
DEBUG - 2026-03-25 14:26:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-25 14:26:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-25 14:26:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-25 14:26:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-25 14:26:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-25 14:31:22 --> [REQ_ID=3f9b4264dd18] [REQUEST][START] HEAD /
DEBUG - 2026-03-25 14:31:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-25 14:31:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-25 14:31:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-25 14:31:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-25 14:31:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-25 14:36:22 --> [REQ_ID=d0a7bc41574f] [REQUEST][START] HEAD /
DEBUG - 2026-03-25 14:36:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-25 14:36:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-25 14:36:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-25 14:36:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-25 14:36:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-25 14:38:51 --> [REQ_ID=eb6d230349e7] [REQUEST][START] GET /index.php/Support/Account
DEBUG - 2026-03-25 14:38:51 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-25 14:38:51 --> [REQ_ID=eb6d230349e7] [REQUEST][END]
INFO - 2026-03-25 14:38:51 --> [REQ_ID=eb6d230349e7] [PERF] Execution time=0.041820
DEBUG - 2026-03-25 14:41:22 --> [REQ_ID=52d27e61e943] [REQUEST][START] HEAD /
DEBUG - 2026-03-25 14:41:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-25 14:41:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-25 14:41:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-25 14:41:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-25 14:41:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-25 14:44:32 --> [REQ_ID=30e55c9a931e] [REQUEST][START] GET /index.php/Exchange
DEBUG - 2026-03-25 14:44:32 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-25 14:44:32 --> [REQ_ID=30e55c9a931e] [REQUEST][END]
INFO - 2026-03-25 14:44:32 --> [REQ_ID=30e55c9a931e] [PERF] Execution time=0.044767
DEBUG - 2026-03-25 14:46:22 --> [REQ_ID=f3569412a687] [REQUEST][START] HEAD /
DEBUG - 2026-03-25 14:46:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-25 14:46:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-25 14:46:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-25 14:46:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-25 14:46:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-25 14:49:51 --> [REQ_ID=eaa46597d21e] [REQUEST][START] GET /index.php/Free/register
DEBUG - 2026-03-25 14:49:51 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-25 14:49:51 --> [REQ_ID=eaa46597d21e] [REQUEST][END]
INFO - 2026-03-25 14:49:51 --> [REQ_ID=eaa46597d21e] [PERF] Execution time=0.061392
DEBUG - 2026-03-25 14:51:22 --> [REQ_ID=1cc56bc91ea3] [REQUEST][START] HEAD /
DEBUG - 2026-03-25 14:51:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-25 14:51:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-25 14:51:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-25 14:51:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-25 14:51:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-25 14:56:22 --> [REQ_ID=1fb1e4587112] [REQUEST][START] HEAD /
DEBUG - 2026-03-25 14:56:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-25 14:56:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-25 14:56:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-25 14:56:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-25 14:56:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-25 15:00:01 --> [REQ_ID=a02617c8aa61] [REQUEST][START] GET /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-25 15:00:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-25 15:00:01 --> [REQ_ID=a02617c8aa61] [FILTER_BEFORE] /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-25 15:00:01 --> [REQ_ID=a02617c8aa61] [ROUTE] Controller=\App\Modules\Management\Controllers\ManagementAPIController Method=Run_CRON_Tasks
DEBUG - 2026-03-25 15:00:01 --> [REQ_ID=a02617c8aa61] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-25 15:00:01 --> [REQ_ID=a02617c8aa61] [REQUEST][END]
INFO - 2026-03-25 15:00:01 --> [REQ_ID=a02617c8aa61] [PERF] Execution time=0.049487
DEBUG - 2026-03-25 15:01:22 --> [REQ_ID=ba6cd566d9b1] [REQUEST][START] HEAD /
DEBUG - 2026-03-25 15:01:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-25 15:01:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-25 15:01:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-25 15:01:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-25 15:01:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-25 15:06:22 --> [REQ_ID=04c6feb09c69] [REQUEST][START] HEAD /
DEBUG - 2026-03-25 15:06:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-25 15:06:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-25 15:06:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-25 15:06:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-25 15:06:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-25 15:11:22 --> [REQ_ID=bfac22ae0d5f] [REQUEST][START] HEAD /
DEBUG - 2026-03-25 15:11:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-25 15:11:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-25 15:11:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-25 15:11:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-25 15:11:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-25 15:15:01 --> [REQ_ID=3ad6d5c92100] [REQUEST][START] GET /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-25 15:15:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-25 15:15:01 --> [REQ_ID=3ad6d5c92100] [FILTER_BEFORE] /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-25 15:15:01 --> [REQ_ID=3ad6d5c92100] [ROUTE] Controller=\App\Modules\APIs\Controllers\AlertsAPIController Method=fetchEmailAlerts
DEBUG - 2026-03-25 15:15:01 --> [REQ_ID=3ad6d5c92100] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-25 15:15:01 --> [REQ_ID=3ad6d5c92100] [REQUEST][END]
INFO - 2026-03-25 15:15:01 --> [REQ_ID=3ad6d5c92100] [PERF] Execution time=0.045908
DEBUG - 2026-03-25 15:16:22 --> [REQ_ID=bed44dd6e839] [REQUEST][START] HEAD /
DEBUG - 2026-03-25 15:16:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-25 15:16:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-25 15:16:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-25 15:16:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-25 15:16:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-25 15:18:26 --> [REQ_ID=829aeb00e649] [REQUEST][START] GET /
DEBUG - 2026-03-25 15:18:26 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-25 15:18:26 --> [REQ_ID=829aeb00e649] [FILTER_BEFORE] /
DEBUG - 2026-03-25 15:18:26 --> [REQ_ID=829aeb00e649] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-25 15:18:26 --> [REQ_ID=829aeb00e649] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-25 15:18:26 --> [CSRF] token name=csrf_test_name hash=3bf04471f3b14e1fa256d457d6db4cd3
DEBUG - 2026-03-25 15:18:26 --> [REQ_ID=5c00ee136034] [INIT] App\Controllers\Home::GET
INFO - 2026-03-25 15:18:26 --> [REQ_ID=5c00ee136034] [MEMORY][controller-start] 6291456
INFO - 2026-03-25 15:18:26 --> [REQ_ID=5c00ee136034] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-25 15:18:26 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-25 15:18:27 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-03-25 15:18:27 --> [REQ_ID=5c00ee136034] [VIEW_RENDER] themes/public/home
INFO - 2026-03-25 15:18:27 --> [REQ_ID=5c00ee136034] [MEMORY][commonData:start] 10485760
INFO - 2026-03-25 15:18:27 --> themesMemory usage: 10485760
DEBUG - 2026-03-25 15:18:27 --> [MetaService] slug= pageName=Home cacheHit= path=DB
DEBUG - 2026-03-25 15:18:27 --> [REQ_ID=829aeb00e649] [FILTER_AFTER]
DEBUG - 2026-03-25 15:18:27 --> [REQ_ID=829aeb00e649] [LIFECYCLE][END] status=200 duration_ms=685.54 memory_delta=4194304
INFO - 2026-03-25 15:18:27 --> [REQ_ID=5c00ee136034] [PERF] Execution time=0.683215
DEBUG - 2026-03-25 15:18:27 --> [REQ_ID=829aeb00e649] [REQUEST][END]
INFO - 2026-03-25 15:18:27 --> [REQ_ID=829aeb00e649] [PERF] Execution time=0.725675
DEBUG - 2026-03-25 15:18:27 --> [REQ_ID=92351a0e2e79] [REQUEST][START] GET /index.php/Legal/Terms-And-Conditions
DEBUG - 2026-03-25 15:18:27 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-25 15:18:27 --> [REQ_ID=92351a0e2e79] [FILTER_BEFORE] /index.php/Legal/Terms-And-Conditions
DEBUG - 2026-03-25 15:18:27 --> [REQ_ID=92351a0e2e79] [ROUTE] Controller=\App\Controllers\Home Method=terms
DEBUG - 2026-03-25 15:18:27 --> [REQ_ID=92351a0e2e79] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Legal/Terms-And-Conditions
DEBUG - 2026-03-25 15:18:27 --> [CSRF] token name=csrf_test_name hash=5ed2d96d1e60a0c896ebd88d2ec8756f
DEBUG - 2026-03-25 15:18:27 --> [REQ_ID=92351a0e2e79] [REQUEST][END]
INFO - 2026-03-25 15:18:27 --> [REQ_ID=92351a0e2e79] [PERF] Execution time=0.011029
DEBUG - 2026-03-25 15:18:27 --> [REQ_ID=5fa759bc8996] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-25 15:18:27 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-25 15:18:27 --> [REQ_ID=5fa759bc8996] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-25 15:18:27 --> [REQ_ID=5fa759bc8996] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-25 15:18:27 --> [REQ_ID=5fa759bc8996] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-25 15:18:27 --> [CSRF] token name=csrf_test_name hash=49c6dc229ca022cc788245ab1986eae2
DEBUG - 2026-03-25 15:18:27 --> [REQ_ID=3450c67201cc] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-25 15:18:27 --> [REQ_ID=3450c67201cc] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-25 15:18:27 --> [REQ_ID=5fa759bc8996] [FILTER_AFTER]
DEBUG - 2026-03-25 15:18:27 --> [REQ_ID=5fa759bc8996] [LIFECYCLE][END] status=200 duration_ms=22.92 memory_delta=0
INFO - 2026-03-25 15:18:27 --> [REQ_ID=3450c67201cc] [PERF] Execution time=0.022550
DEBUG - 2026-03-25 15:18:27 --> [REQ_ID=5fa759bc8996] [REQUEST][END]
INFO - 2026-03-25 15:18:27 --> [REQ_ID=5fa759bc8996] [PERF] Execution time=0.035171
DEBUG - 2026-03-25 15:18:28 --> [REQ_ID=bb33db3b4159] [REQUEST][START] GET /index.php/Terms-Of-Service
DEBUG - 2026-03-25 15:18:28 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-25 15:18:28 --> [REQ_ID=bb33db3b4159] [FILTER_BEFORE] /index.php/Terms-Of-Service
DEBUG - 2026-03-25 15:18:28 --> [REQ_ID=bb33db3b4159] [ROUTE] Controller=\App\Controllers\Home Method=termsOfService
DEBUG - 2026-03-25 15:18:28 --> [REQ_ID=bb33db3b4159] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Terms-Of-Service
DEBUG - 2026-03-25 15:18:28 --> [CSRF] token name=csrf_test_name hash=0b3b8357f51120e1070bf4f2ae78d6a0
DEBUG - 2026-03-25 15:18:28 --> [REQ_ID=5637baea3a2e] [INIT] App\Controllers\Home::GET
INFO - 2026-03-25 15:18:28 --> [REQ_ID=5637baea3a2e] [MEMORY][controller-start] 4194304
INFO - 2026-03-25 15:18:28 --> [REQ_ID=5637baea3a2e] [MEMORY][commonData:start] 4194304
DEBUG - 2026-03-25 15:18:28 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-25 15:18:29 --> [MetaService] slug=terms-of-service pageName= cacheHit= path=DB
DEBUG - 2026-03-25 15:18:29 --> [REQ_ID=5637baea3a2e] [VIEW_RENDER] themes/public/termsOfService
INFO - 2026-03-25 15:18:29 --> [REQ_ID=5637baea3a2e] [MEMORY][commonData:start] 8388608
INFO - 2026-03-25 15:18:29 --> themesMemory usage: 8388608
DEBUG - 2026-03-25 15:18:29 --> [MetaService] slug=terms-of-service pageName=Terms of Service cacheHit= path=DB
DEBUG - 2026-03-25 15:18:29 --> [REQ_ID=bb33db3b4159] [FILTER_AFTER]
DEBUG - 2026-03-25 15:18:29 --> [REQ_ID=bb33db3b4159] [LIFECYCLE][END] status=200 duration_ms=561.64 memory_delta=4194304
INFO - 2026-03-25 15:18:29 --> [REQ_ID=5637baea3a2e] [PERF] Execution time=0.561366
DEBUG - 2026-03-25 15:18:29 --> [REQ_ID=bb33db3b4159] [REQUEST][END]
INFO - 2026-03-25 15:18:29 --> [REQ_ID=bb33db3b4159] [PERF] Execution time=0.571670
DEBUG - 2026-03-25 15:21:22 --> [REQ_ID=579859fb72eb] [REQUEST][START] HEAD /
DEBUG - 2026-03-25 15:21:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-25 15:21:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-25 15:21:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-25 15:21:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-25 15:21:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-25 15:26:22 --> [REQ_ID=a10c0680bb26] [REQUEST][START] HEAD /
DEBUG - 2026-03-25 15:26:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-25 15:26:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-25 15:26:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-25 15:26:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-25 15:26:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-25 15:27:54 --> [REQ_ID=7053a810501c] [REQUEST][START] GET /index.php/How-It-Works/MyMI-Gold
DEBUG - 2026-03-25 15:27:54 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-25 15:27:54 --> [REQ_ID=7053a810501c] [REQUEST][END]
INFO - 2026-03-25 15:27:54 --> [REQ_ID=7053a810501c] [PERF] Execution time=0.059593
DEBUG - 2026-03-25 15:31:22 --> [REQ_ID=b5b08119db43] [REQUEST][START] HEAD /
DEBUG - 2026-03-25 15:31:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-25 15:31:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-25 15:31:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-25 15:31:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-25 15:31:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-25 15:36:22 --> [REQ_ID=a1ce9a3348bc] [REQUEST][START] HEAD /
DEBUG - 2026-03-25 15:36:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-25 15:36:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-25 15:36:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-25 15:36:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-25 15:36:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-25 15:41:22 --> [REQ_ID=b69ba93736a2] [REQUEST][START] HEAD /
DEBUG - 2026-03-25 15:41:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-25 15:41:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-25 15:41:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-25 15:41:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-25 15:41:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-25 15:46:22 --> [REQ_ID=bc311bf8f556] [REQUEST][START] HEAD /
DEBUG - 2026-03-25 15:46:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-25 15:46:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-25 15:46:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-25 15:46:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-25 15:46:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-25 15:51:22 --> [REQ_ID=013a08e1ff23] [REQUEST][START] HEAD /
DEBUG - 2026-03-25 15:51:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-25 15:51:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-25 15:51:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-25 15:51:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-25 15:51:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-25 15:56:22 --> [REQ_ID=c3435e31bef4] [REQUEST][START] HEAD /
DEBUG - 2026-03-25 15:56:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-25 15:56:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-25 15:56:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-25 15:56:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-25 15:56:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-25 16:00:01 --> [REQ_ID=c2d0408cffce] [REQUEST][START] GET /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-25 16:00:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-25 16:00:01 --> [REQ_ID=c2d0408cffce] [FILTER_BEFORE] /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-25 16:00:01 --> [REQ_ID=c2d0408cffce] [ROUTE] Controller=\App\Modules\Management\Controllers\ManagementAPIController Method=Run_CRON_Tasks
DEBUG - 2026-03-25 16:00:01 --> [REQ_ID=c2d0408cffce] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-25 16:00:01 --> [REQ_ID=c2d0408cffce] [REQUEST][END]
INFO - 2026-03-25 16:00:01 --> [REQ_ID=c2d0408cffce] [PERF] Execution time=0.049705
DEBUG - 2026-03-25 16:01:22 --> [REQ_ID=c1405e42ea0c] [REQUEST][START] HEAD /
DEBUG - 2026-03-25 16:01:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-25 16:01:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-25 16:01:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-25 16:01:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-25 16:01:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-25 16:06:22 --> [REQ_ID=0dab5fb21c05] [REQUEST][START] HEAD /
DEBUG - 2026-03-25 16:06:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-25 16:06:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-25 16:06:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-25 16:06:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-25 16:06:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-25 16:11:22 --> [REQ_ID=43a10bacefe8] [REQUEST][START] HEAD /
DEBUG - 2026-03-25 16:11:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-25 16:11:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-25 16:11:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-25 16:11:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-25 16:11:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-25 16:14:51 --> [REQ_ID=daca147ed95c] [REQUEST][START] GET /
DEBUG - 2026-03-25 16:14:51 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-25 16:14:51 --> [REQ_ID=daca147ed95c] [FILTER_BEFORE] /
DEBUG - 2026-03-25 16:14:51 --> [REQ_ID=daca147ed95c] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-25 16:14:51 --> [REQ_ID=daca147ed95c] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-25 16:14:51 --> [CSRF] token name=csrf_test_name hash=f3a3fd0b70be43dbd74146fe7b06fe6d
DEBUG - 2026-03-25 16:14:51 --> [REQ_ID=97f001c992fd] [INIT] App\Controllers\Home::GET
INFO - 2026-03-25 16:14:51 --> [REQ_ID=97f001c992fd] [MEMORY][controller-start] 6291456
INFO - 2026-03-25 16:14:51 --> [REQ_ID=97f001c992fd] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-25 16:14:51 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-25 16:14:52 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-03-25 16:14:52 --> [REQ_ID=97f001c992fd] [VIEW_RENDER] themes/public/home
INFO - 2026-03-25 16:14:52 --> [REQ_ID=97f001c992fd] [MEMORY][commonData:start] 10485760
INFO - 2026-03-25 16:14:52 --> themesMemory usage: 10485760
DEBUG - 2026-03-25 16:14:52 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-25 16:14:52 --> [REQ_ID=daca147ed95c] [FILTER_AFTER]
DEBUG - 2026-03-25 16:14:52 --> [REQ_ID=daca147ed95c] [LIFECYCLE][END] status=200 duration_ms=781.37 memory_delta=4194304
INFO - 2026-03-25 16:14:52 --> [REQ_ID=97f001c992fd] [PERF] Execution time=0.779130
DEBUG - 2026-03-25 16:14:52 --> [REQ_ID=daca147ed95c] [REQUEST][END]
INFO - 2026-03-25 16:14:52 --> [REQ_ID=daca147ed95c] [PERF] Execution time=0.824937
DEBUG - 2026-03-25 16:15:01 --> [REQ_ID=065e958effd8] [REQUEST][START] GET /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-25 16:15:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-25 16:15:01 --> [REQ_ID=065e958effd8] [FILTER_BEFORE] /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-25 16:15:01 --> [REQ_ID=065e958effd8] [ROUTE] Controller=\App\Modules\APIs\Controllers\AlertsAPIController Method=fetchEmailAlerts
DEBUG - 2026-03-25 16:15:01 --> [REQ_ID=065e958effd8] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-25 16:15:01 --> [REQ_ID=065e958effd8] [REQUEST][END]
INFO - 2026-03-25 16:15:01 --> [REQ_ID=065e958effd8] [PERF] Execution time=0.017209
DEBUG - 2026-03-25 16:15:05 --> [REQ_ID=c5ec73bd3c42] [REQUEST][START] GET /index.php/How-It-Works/Investment-Dashboard
DEBUG - 2026-03-25 16:15:05 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-25 16:15:05 --> [REQ_ID=c5ec73bd3c42] [REQUEST][END]
INFO - 2026-03-25 16:15:05 --> [REQ_ID=c5ec73bd3c42] [PERF] Execution time=0.012727
DEBUG - 2026-03-25 16:15:05 --> [REQ_ID=e5e172f8188a] [REQUEST][START] GET /
DEBUG - 2026-03-25 16:15:05 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-25 16:15:05 --> [REQ_ID=e5e172f8188a] [FILTER_BEFORE] /
DEBUG - 2026-03-25 16:15:05 --> [REQ_ID=e5e172f8188a] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-25 16:15:05 --> [REQ_ID=e5e172f8188a] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-25 16:15:05 --> [CSRF] token name=csrf_test_name hash=85a5928a910fb959bbfcddbb76f24edf
DEBUG - 2026-03-25 16:15:05 --> [REQ_ID=4436613e4eda] [INIT] App\Controllers\Home::GET
INFO - 2026-03-25 16:15:05 --> [REQ_ID=4436613e4eda] [MEMORY][controller-start] 4194304
INFO - 2026-03-25 16:15:05 --> [REQ_ID=4436613e4eda] [MEMORY][commonData:start] 4194304
DEBUG - 2026-03-25 16:15:05 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-25 16:15:06 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
DEBUG - 2026-03-25 16:15:06 --> [REQ_ID=4436613e4eda] [VIEW_RENDER] themes/public/home
INFO - 2026-03-25 16:15:06 --> [REQ_ID=4436613e4eda] [MEMORY][commonData:start] 8388608
INFO - 2026-03-25 16:15:06 --> themesMemory usage: 8388608
DEBUG - 2026-03-25 16:15:06 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-25 16:15:06 --> [REQ_ID=e5e172f8188a] [FILTER_AFTER]
DEBUG - 2026-03-25 16:15:06 --> [REQ_ID=e5e172f8188a] [LIFECYCLE][END] status=200 duration_ms=535.35 memory_delta=4194304
INFO - 2026-03-25 16:15:06 --> [REQ_ID=4436613e4eda] [PERF] Execution time=0.535023
DEBUG - 2026-03-25 16:15:06 --> [REQ_ID=e5e172f8188a] [REQUEST][END]
INFO - 2026-03-25 16:15:06 --> [REQ_ID=e5e172f8188a] [PERF] Execution time=0.545814
DEBUG - 2026-03-25 16:16:22 --> [REQ_ID=018430276a63] [REQUEST][START] HEAD /
DEBUG - 2026-03-25 16:16:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-25 16:16:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-25 16:16:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-25 16:16:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-25 16:16:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-25 16:21:22 --> [REQ_ID=6dae576bd3bc] [REQUEST][START] HEAD /
DEBUG - 2026-03-25 16:21:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-25 16:21:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-25 16:21:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-25 16:21:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-25 16:21:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-25 16:26:22 --> [REQ_ID=c975786b1d27] [REQUEST][START] HEAD /
DEBUG - 2026-03-25 16:26:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-25 16:26:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-25 16:26:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-25 16:26:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-25 16:26:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-25 16:30:40 --> [REQ_ID=f98514063246] [REQUEST][START] GET /
DEBUG - 2026-03-25 16:30:40 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-25 16:30:40 --> [REQ_ID=f98514063246] [FILTER_BEFORE] /
DEBUG - 2026-03-25 16:30:40 --> [REQ_ID=f98514063246] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-25 16:30:40 --> [REQ_ID=f98514063246] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-25 16:30:40 --> [CSRF] token name=csrf_test_name hash=98b0d1e05ea15882d204858965a2d429
DEBUG - 2026-03-25 16:30:40 --> [REQ_ID=4a53e6d75bba] [INIT] App\Controllers\Home::GET
INFO - 2026-03-25 16:30:40 --> [REQ_ID=4a53e6d75bba] [MEMORY][controller-start] 6291456
INFO - 2026-03-25 16:30:40 --> [REQ_ID=4a53e6d75bba] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-25 16:30:40 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-25 16:30:41 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-03-25 16:30:41 --> [REQ_ID=4a53e6d75bba] [VIEW_RENDER] themes/public/home
INFO - 2026-03-25 16:30:41 --> [REQ_ID=4a53e6d75bba] [MEMORY][commonData:start] 10485760
INFO - 2026-03-25 16:30:41 --> themesMemory usage: 10485760
DEBUG - 2026-03-25 16:30:41 --> [MetaService] slug= pageName=Home cacheHit= path=DB
DEBUG - 2026-03-25 16:30:41 --> [REQ_ID=f98514063246] [FILTER_AFTER]
DEBUG - 2026-03-25 16:30:41 --> [REQ_ID=f98514063246] [LIFECYCLE][END] status=200 duration_ms=709.93 memory_delta=4194304
INFO - 2026-03-25 16:30:41 --> [REQ_ID=4a53e6d75bba] [PERF] Execution time=0.708113
DEBUG - 2026-03-25 16:30:41 --> [REQ_ID=f98514063246] [REQUEST][END]
INFO - 2026-03-25 16:30:41 --> [REQ_ID=f98514063246] [PERF] Execution time=0.749385
DEBUG - 2026-03-25 16:31:22 --> [REQ_ID=e206bfdbfced] [REQUEST][START] HEAD /
DEBUG - 2026-03-25 16:31:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-25 16:31:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-25 16:31:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-25 16:31:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-25 16:31:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-25 16:36:22 --> [REQ_ID=cad87a8babc4] [REQUEST][START] HEAD /
DEBUG - 2026-03-25 16:36:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-25 16:36:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-25 16:36:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-25 16:36:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-25 16:36:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-25 16:41:22 --> [REQ_ID=a189c110553b] [REQUEST][START] HEAD /
DEBUG - 2026-03-25 16:41:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-25 16:41:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-25 16:41:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-25 16:41:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-25 16:41:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-25 16:46:22 --> [REQ_ID=0aff0aa337eb] [REQUEST][START] HEAD /
DEBUG - 2026-03-25 16:46:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-25 16:46:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-25 16:46:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-25 16:46:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-25 16:46:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-25 16:51:22 --> [REQ_ID=9ab5ab789759] [REQUEST][START] HEAD /
DEBUG - 2026-03-25 16:51:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-25 16:51:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-25 16:51:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-25 16:51:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-25 16:51:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-25 16:56:22 --> [REQ_ID=0c40b8adaaf3] [REQUEST][START] HEAD /
DEBUG - 2026-03-25 16:56:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-25 16:56:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-25 16:56:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-25 16:56:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-25 16:56:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-25 17:00:01 --> [REQ_ID=52f0ab3cd35e] [REQUEST][START] GET /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-25 17:00:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-25 17:00:01 --> [REQ_ID=52f0ab3cd35e] [FILTER_BEFORE] /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-25 17:00:01 --> [REQ_ID=52f0ab3cd35e] [ROUTE] Controller=\App\Modules\Management\Controllers\ManagementAPIController Method=Run_CRON_Tasks
DEBUG - 2026-03-25 17:00:01 --> [REQ_ID=52f0ab3cd35e] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-25 17:00:01 --> [REQ_ID=52f0ab3cd35e] [REQUEST][END]
INFO - 2026-03-25 17:00:01 --> [REQ_ID=52f0ab3cd35e] [PERF] Execution time=0.063641
DEBUG - 2026-03-25 17:01:22 --> [REQ_ID=76c40b5a442e] [REQUEST][START] HEAD /
DEBUG - 2026-03-25 17:01:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-25 17:01:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-25 17:01:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-25 17:01:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-25 17:01:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-25 17:04:03 --> [REQ_ID=b62e5b530af3] [REQUEST][START] GET /
DEBUG - 2026-03-25 17:04:03 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-25 17:04:03 --> [REQ_ID=b62e5b530af3] [FILTER_BEFORE] /
DEBUG - 2026-03-25 17:04:03 --> [REQ_ID=b62e5b530af3] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-25 17:04:03 --> [REQ_ID=b62e5b530af3] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-25 17:04:03 --> [CSRF] token name=csrf_test_name hash=50c5753822c8f3716ef5fe32623768a5
DEBUG - 2026-03-25 17:04:03 --> [REQ_ID=d7b2287d79c3] [INIT] App\Controllers\Home::GET
INFO - 2026-03-25 17:04:03 --> [REQ_ID=d7b2287d79c3] [MEMORY][controller-start] 6291456
INFO - 2026-03-25 17:04:03 --> [REQ_ID=d7b2287d79c3] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-25 17:04:03 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-25 17:04:03 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-03-25 17:04:03 --> [REQ_ID=d7b2287d79c3] [VIEW_RENDER] themes/public/home
INFO - 2026-03-25 17:04:03 --> [REQ_ID=d7b2287d79c3] [MEMORY][commonData:start] 10485760
INFO - 2026-03-25 17:04:03 --> themesMemory usage: 10485760
DEBUG - 2026-03-25 17:04:03 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-25 17:04:03 --> [REQ_ID=b62e5b530af3] [FILTER_AFTER]
DEBUG - 2026-03-25 17:04:03 --> [REQ_ID=b62e5b530af3] [LIFECYCLE][END] status=200 duration_ms=724.81 memory_delta=4194304
INFO - 2026-03-25 17:04:03 --> [REQ_ID=d7b2287d79c3] [PERF] Execution time=0.722742
DEBUG - 2026-03-25 17:04:03 --> [REQ_ID=b62e5b530af3] [REQUEST][END]
INFO - 2026-03-25 17:04:03 --> [REQ_ID=b62e5b530af3] [PERF] Execution time=0.763455
DEBUG - 2026-03-25 17:06:22 --> [REQ_ID=b643e982bc76] [REQUEST][START] HEAD /
DEBUG - 2026-03-25 17:06:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-25 17:06:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-25 17:06:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-25 17:06:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-25 17:06:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-25 17:11:22 --> [REQ_ID=8e02709583dd] [REQUEST][START] HEAD /
DEBUG - 2026-03-25 17:11:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-25 17:11:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-25 17:11:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-25 17:11:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-25 17:11:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-25 17:11:33 --> [REQ_ID=e3a8147016c1] [REQUEST][START] GET /
DEBUG - 2026-03-25 17:11:33 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-25 17:11:33 --> [REQ_ID=e3a8147016c1] [REQUEST][END]
INFO - 2026-03-25 17:11:33 --> [REQ_ID=e3a8147016c1] [PERF] Execution time=0.017644
DEBUG - 2026-03-25 17:13:09 --> [REQ_ID=1d2a43464788] [REQUEST][START] GET /index.php/Management/Services
DEBUG - 2026-03-25 17:13:09 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-25 17:13:09 --> [REQ_ID=1d2a43464788] [REQUEST][END]
INFO - 2026-03-25 17:13:09 --> [REQ_ID=1d2a43464788] [PERF] Execution time=0.042051
DEBUG - 2026-03-25 17:15:01 --> [REQ_ID=e8f439647d98] [REQUEST][START] GET /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-25 17:15:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-25 17:15:01 --> [REQ_ID=e8f439647d98] [FILTER_BEFORE] /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-25 17:15:01 --> [REQ_ID=e8f439647d98] [ROUTE] Controller=\App\Modules\APIs\Controllers\AlertsAPIController Method=fetchEmailAlerts
DEBUG - 2026-03-25 17:15:01 --> [REQ_ID=e8f439647d98] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-25 17:15:01 --> [REQ_ID=e8f439647d98] [REQUEST][END]
INFO - 2026-03-25 17:15:01 --> [REQ_ID=e8f439647d98] [PERF] Execution time=0.048194
DEBUG - 2026-03-25 17:16:22 --> [REQ_ID=8fca815a3e43] [REQUEST][START] HEAD /
DEBUG - 2026-03-25 17:16:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-25 17:16:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-25 17:16:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-25 17:16:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-25 17:16:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-25 17:17:01 --> [REQ_ID=6ee500e564d9] [REQUEST][START] GET /index.php/How-It-Works/Setting-Financial-Goals
DEBUG - 2026-03-25 17:17:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-25 17:17:01 --> [REQ_ID=6ee500e564d9] [REQUEST][END]
INFO - 2026-03-25 17:17:01 --> [REQ_ID=6ee500e564d9] [PERF] Execution time=0.020925
DEBUG - 2026-03-25 17:21:22 --> [REQ_ID=fceaed737353] [REQUEST][START] HEAD /
DEBUG - 2026-03-25 17:21:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-25 17:21:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-25 17:21:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-25 17:21:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-25 17:21:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-25 17:26:22 --> [REQ_ID=946f1b5bbe08] [REQUEST][START] HEAD /
DEBUG - 2026-03-25 17:26:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-25 17:26:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-25 17:26:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-25 17:26:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-25 17:26:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-25 17:31:22 --> [REQ_ID=f1cf302999ce] [REQUEST][START] HEAD /
DEBUG - 2026-03-25 17:31:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-25 17:31:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-25 17:31:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-25 17:31:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-25 17:31:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-25 17:36:22 --> [REQ_ID=74b77b186182] [REQUEST][START] HEAD /
DEBUG - 2026-03-25 17:36:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-25 17:36:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-25 17:36:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-25 17:36:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-25 17:36:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-25 17:37:09 --> [REQ_ID=bbebf2d4d105] [REQUEST][START] GET /index.php/How-It-Works/Investor-Profile
DEBUG - 2026-03-25 17:37:09 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-25 17:37:09 --> [REQ_ID=bbebf2d4d105] [REQUEST][END]
INFO - 2026-03-25 17:37:09 --> [REQ_ID=bbebf2d4d105] [PERF] Execution time=0.021175
DEBUG - 2026-03-25 17:39:55 --> [REQ_ID=888df74efcb0] [REQUEST][START] GET /index.php/News/After-Hours-Movers/December-8th-2021
DEBUG - 2026-03-25 17:39:55 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-25 17:39:55 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: GET, Route: News/After-Hours-Movers/December-8th-2021]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-25 17:39:56 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-25 17:39:56 --> [404] URI=https://www.mymiwallet.com/index.php/News/After-Hours-Movers/December-8th-2021
WARNING - 2026-03-25 17:39:56 --> 404 route miss: https://www.mymiwallet.com/index.php/News/After-Hours-Movers/December-8th-2021 | referrer: none
ERROR - 2026-03-25 17:39:56 --> [ERROR_PAGE] event=error_404 status=404 message=Page not found.
DEBUG - 2026-03-25 17:41:22 --> [REQ_ID=9ce6233f884b] [REQUEST][START] HEAD /
DEBUG - 2026-03-25 17:41:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-25 17:41:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-25 17:41:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-25 17:41:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-25 17:41:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-25 17:41:26 --> [REQ_ID=e028ad32a4ee] [REQUEST][START] GET /index.php/Privacy-policy
DEBUG - 2026-03-25 17:41:26 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-25 17:41:26 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: GET, Route: Privacy-policy]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-25 17:41:26 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-25 17:41:26 --> [404] URI=https://www.mymiwallet.com/index.php/Privacy-policy
WARNING - 2026-03-25 17:41:26 --> 404 route miss: https://www.mymiwallet.com/index.php/Privacy-policy | referrer: none
ERROR - 2026-03-25 17:41:26 --> [ERROR_PAGE] event=error_404 status=404 message=Page not found.
DEBUG - 2026-03-25 17:44:15 --> [REQ_ID=014089c1bb37] [REQUEST][START] GET /
DEBUG - 2026-03-25 17:44:15 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-25 17:44:15 --> [REQ_ID=014089c1bb37] [FILTER_BEFORE] /
DEBUG - 2026-03-25 17:44:15 --> [REQ_ID=014089c1bb37] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-25 17:44:15 --> [REQ_ID=014089c1bb37] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-25 17:44:15 --> [CSRF] token name=csrf_test_name hash=a9e0ce7b3d4432b9909960e11d0abaab
DEBUG - 2026-03-25 17:44:15 --> [REQ_ID=1ee78d99afb2] [INIT] App\Controllers\Home::GET
INFO - 2026-03-25 17:44:15 --> [REQ_ID=1ee78d99afb2] [MEMORY][controller-start] 6291456
INFO - 2026-03-25 17:44:15 --> [REQ_ID=1ee78d99afb2] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-25 17:44:15 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-25 17:44:16 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-03-25 17:44:16 --> [REQ_ID=1ee78d99afb2] [VIEW_RENDER] themes/public/home
INFO - 2026-03-25 17:44:16 --> [REQ_ID=1ee78d99afb2] [MEMORY][commonData:start] 10485760
INFO - 2026-03-25 17:44:16 --> themesMemory usage: 10485760
DEBUG - 2026-03-25 17:44:16 --> [MetaService] slug= pageName=Home cacheHit= path=DB
DEBUG - 2026-03-25 17:44:16 --> [REQ_ID=014089c1bb37] [FILTER_AFTER]
DEBUG - 2026-03-25 17:44:16 --> [REQ_ID=014089c1bb37] [LIFECYCLE][END] status=200 duration_ms=780.78 memory_delta=4194304
INFO - 2026-03-25 17:44:16 --> [REQ_ID=1ee78d99afb2] [PERF] Execution time=0.778785
DEBUG - 2026-03-25 17:44:16 --> [REQ_ID=014089c1bb37] [REQUEST][END]
INFO - 2026-03-25 17:44:16 --> [REQ_ID=014089c1bb37] [PERF] Execution time=0.819923
DEBUG - 2026-03-25 17:45:45 --> [REQ_ID=948f511660b8] [REQUEST][START] GET /index.php/Premium-Features/Advanced-Charting
DEBUG - 2026-03-25 17:45:45 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
INFO - 2026-03-25 17:45:45 --> REDIRECTED ROUTE at https://www.mymiwallet.com/Features/Brokerage-Integrations
DEBUG - 2026-03-25 17:45:45 --> [REQ_ID=948f511660b8] [REQUEST][END]
INFO - 2026-03-25 17:45:45 --> [REQ_ID=948f511660b8] [PERF] Execution time=0.036707
DEBUG - 2026-03-25 17:46:22 --> [REQ_ID=62ca231715ea] [REQUEST][START] HEAD /
DEBUG - 2026-03-25 17:46:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-25 17:46:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-25 17:46:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-25 17:46:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-25 17:46:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-25 17:48:34 --> [REQ_ID=4ef1d7975260] [REQUEST][START] GET /
DEBUG - 2026-03-25 17:48:34 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-25 17:48:34 --> [REQ_ID=4ef1d7975260] [FILTER_BEFORE] /
DEBUG - 2026-03-25 17:48:34 --> [REQ_ID=4ef1d7975260] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-25 17:48:34 --> [REQ_ID=4ef1d7975260] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-25 17:48:34 --> [CSRF] token name=csrf_test_name hash=5426c048c3ad2e0be4020ca1acabc8f8
DEBUG - 2026-03-25 17:48:34 --> [REQ_ID=2c03c1662434] [INIT] App\Controllers\Home::GET
INFO - 2026-03-25 17:48:34 --> [REQ_ID=2c03c1662434] [MEMORY][controller-start] 6291456
INFO - 2026-03-25 17:48:34 --> [REQ_ID=2c03c1662434] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-25 17:48:34 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-25 17:48:34 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
DEBUG - 2026-03-25 17:48:34 --> [REQ_ID=2c03c1662434] [VIEW_RENDER] themes/public/home
INFO - 2026-03-25 17:48:34 --> [REQ_ID=2c03c1662434] [MEMORY][commonData:start] 10485760
INFO - 2026-03-25 17:48:34 --> themesMemory usage: 10485760
DEBUG - 2026-03-25 17:48:34 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-25 17:48:34 --> [REQ_ID=4ef1d7975260] [FILTER_AFTER]
DEBUG - 2026-03-25 17:48:34 --> [REQ_ID=4ef1d7975260] [LIFECYCLE][END] status=200 duration_ms=689.22 memory_delta=4194304
INFO - 2026-03-25 17:48:34 --> [REQ_ID=2c03c1662434] [PERF] Execution time=0.687230
DEBUG - 2026-03-25 17:48:34 --> [REQ_ID=4ef1d7975260] [REQUEST][END]
INFO - 2026-03-25 17:48:34 --> [REQ_ID=4ef1d7975260] [PERF] Execution time=0.729118
DEBUG - 2026-03-25 17:51:22 --> [REQ_ID=706d1d3961e9] [REQUEST][START] HEAD /
DEBUG - 2026-03-25 17:51:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-25 17:51:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-25 17:51:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-25 17:51:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-25 17:51:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-25 17:55:35 --> [REQ_ID=89873cbc5c01] [REQUEST][START] GET /index.php/Dashboard
DEBUG - 2026-03-25 17:55:35 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-25 17:55:35 --> [REQ_ID=89873cbc5c01] [FILTER_BEFORE] /index.php/Dashboard
DEBUG - 2026-03-25 17:55:35 --> [REQ_ID=89873cbc5c01] [ROUTE] Controller=\App\Modules\User\Controllers\DashboardController Method=index
DEBUG - 2026-03-25 17:55:35 --> [REQ_ID=89873cbc5c01] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Dashboard
DEBUG - 2026-03-25 17:55:35 --> [CSRF] token name=csrf_test_name hash=f4ddcf7b97b76e3c0d6f70fbfdcb11d1
DEBUG - 2026-03-25 17:55:35 --> [REQ_ID=bc034670648b] [INIT] App\Modules\User\Controllers\DashboardController::GET
INFO - 2026-03-25 17:55:35 --> [REQ_ID=bc034670648b] [MEMORY][controller-start] 6291456
DEBUG - 2026-03-25 17:55:35 --> [REQ_ID=bc034670648b] [METHOD_ENTRY] index
DEBUG - 2026-03-25 17:55:35 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-25 17:55:35 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-25 17:55:35 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-25 17:55:35 --> MyMIMarketing: Pscrape library not installed; Google search scraping will use fallback.
DEBUG - 2026-03-25 17:55:35 --> [DASHBOARD] Enter
DEBUG - 2026-03-25 17:55:35 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-25 17:55:35 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-25 17:55:35 --> [SERVICE] App\Services\BudgetService ::getUserBudget
DEBUG - 2026-03-25 17:55:35 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":11758,"deleted":0}
DEBUG - 2026-03-25 17:55:35 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-25 17:55:35 --> [MODEL_WHERE] App\Models\BudgetModel KEY="created_by"
DEBUG - 2026-03-25 17:55:35 --> [MODEL_WHERE] App\Models\BudgetModel KEY="account_type"
DEBUG - 2026-03-25 17:55:35 --> [MODEL_WHERE] App\Models\BudgetModel KEY="designated_date >="
DEBUG - 2026-03-25 17:55:35 --> [MODEL_WHERE] App\Models\BudgetModel KEY="designated_date <="
DEBUG - 2026-03-25 17:55:35 --> [MODEL_WHERE] App\Models\BudgetModel KEY="year"
DEBUG - 2026-03-25 17:55:35 --> [MODEL_WHERE] App\Models\BudgetModel KEY="month <="
DEBUG - 2026-03-25 17:55:35 --> [MODEL_WHERE] App\Models\BudgetModel KEY="day <="
DEBUG - 2026-03-25 17:55:35 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":11758,"account_type":"Income","month":"03","year":"2026"}
DEBUG - 2026-03-25 17:55:35 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-03-25 17:55:35 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":11758,"account_type":"Income","month":"02","year":"2026"}
DEBUG - 2026-03-25 17:55:35 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-03-25 17:55:35 --> [MODEL_WHERE] App\Models\BudgetModel KEY="created_by"
DEBUG - 2026-03-25 17:55:35 --> [MODEL_WHERE] App\Models\BudgetModel KEY="account_type"
DEBUG - 2026-03-25 17:55:35 --> [MODEL_WHERE] App\Models\BudgetModel KEY="designated_date >="
DEBUG - 2026-03-25 17:55:35 --> [MODEL_WHERE] App\Models\BudgetModel KEY="designated_date <="
DEBUG - 2026-03-25 17:55:35 --> [MODEL_WHERE] App\Models\BudgetModel KEY="year"
DEBUG - 2026-03-25 17:55:35 --> [MODEL_WHERE] App\Models\BudgetModel KEY="month <="
DEBUG - 2026-03-25 17:55:35 --> [MODEL_WHERE] App\Models\BudgetModel KEY="day <="
DEBUG - 2026-03-25 17:55:35 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":11758,"account_type":"Expense","month":"03","year":"2026"}
DEBUG - 2026-03-25 17:55:35 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-03-25 17:55:35 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":11758,"account_type":"Expense","month":"02","year":"2026"}
DEBUG - 2026-03-25 17:55:35 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-03-25 17:55:35 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"status":1,"created_by":11758,"deleted":0}
DEBUG - 2026-03-25 17:55:35 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"status":1,"paid":0,"created_by":11758,"deleted":0}
DEBUG - 2026-03-25 17:55:35 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"status":1,"created_by":11758,"deleted":0}
ERROR - 2026-03-25 17:55:36 --> DashboardController::index failed to load executive summary: Call to undefined method CodeIgniter\Cache\Handlers\FileHandler::set()
DEBUG - 2026-03-25 17:55:36 --> [CACHE_MISS] mymiwallet_development_squeeze_high-risk_global_global_1f86633dd
ERROR - 2026-03-25 17:55:36 --> Unknown column 'score_total' in 'where clause'
in SYSTEMPATH/Database/MySQLi/Connection.php on line 300.
 1 SYSTEMPATH/Database/MySQLi/Connection.php(300): mysqli->query('SELECT COUNT(*) AS `numrows`
FROM `bf_squeeze_scorecards`
WHERE `score_total` >= 80
AND `as_of_datetime` >= \'2026-03-24 17:55:36\'', 0)
 2 SYSTEMPATH/Database/BaseConnection.php(769): CodeIgniter\Database\MySQLi\Connection->execute('SELECT COUNT(*) AS `numrows`
FROM `bf_squeeze_scorecards`
WHERE `score_total` >= 80
AND `as_of_datetime` >= \'2026-03-24 17:55:36\'')
 3 SYSTEMPATH/Database/BaseConnection.php(686): CodeIgniter\Database\BaseConnection->simpleQuery('SELECT COUNT(*) AS `numrows`
FROM `bf_squeeze_scorecards`
WHERE `score_total` >= 80
AND `as_of_datetime` >= \'2026-03-24 17:55:36\'')
 4 SYSTEMPATH/Database/BaseBuilder.php(1733): CodeIgniter\Database\BaseConnection->query('SELECT COUNT(*) AS `numrows`
FROM `bf_squeeze_scorecards`
WHERE `score_total` >= :score_total:
AND `as_of_datetime` >= :as_of_datetime:', [...], false)
 5 APPPATH/Libraries/MyMIInvestments.php(752): CodeIgniter\Database\BaseBuilder->countAllResults()
 6 APPPATH/Modules/User/Controllers/DashboardController.php(688): App\Libraries\MyMIInvestments->getSqueezeHighRiskCount(80, 24)
 7 SYSTEMPATH/CodeIgniter.php(951): App\Modules\User\Controllers\DashboardController->index()
 8 SYSTEMPATH/CodeIgniter.php(497): CodeIgniter\CodeIgniter->runController(Object(App\Modules\User\Controllers\DashboardController))
 9 SYSTEMPATH/CodeIgniter.php(340): CodeIgniter\CodeIgniter->handleRequest(null, Object(Config\Cache), false)
10 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
11 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
12 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
DEBUG - 2026-03-25 17:55:36 --> MyMIInvestments::getSqueezeHighRiskCount failed: Unknown column 'score_total' in 'where clause'
DEBUG - 2026-03-25 17:55:36 --> 📰 Daily dashboard news window 2026-03-25 00:00:00 -> 2026-03-25 23:59:59 returned 0 rows
DEBUG - 2026-03-25 17:55:36 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-25 17:55:36 --> [SETUP] Status computed
DEBUG - 2026-03-25 17:55:36 --> [REQ_ID=bc034670648b] [VIEW_RENDER] User/Dashboard/index
INFO - 2026-03-25 17:55:36 --> [REQ_ID=bc034670648b] [MEMORY][commonData:start] 8388608
DEBUG - 2026-03-25 17:55:36 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-25 17:55:36 --> [MODEL_WHERE] App\Models\BudgetModel KEY="created_by"
DEBUG - 2026-03-25 17:55:36 --> [MODEL_WHERE] App\Models\BudgetModel KEY="account_type"
DEBUG - 2026-03-25 17:55:36 --> [MODEL_WHERE] App\Models\BudgetModel KEY="designated_date >="
DEBUG - 2026-03-25 17:55:36 --> [MODEL_WHERE] App\Models\BudgetModel KEY="designated_date <="
DEBUG - 2026-03-25 17:55:36 --> [MODEL_WHERE] App\Models\BudgetModel KEY="year"
DEBUG - 2026-03-25 17:55:36 --> [MODEL_WHERE] App\Models\BudgetModel KEY="month <="
DEBUG - 2026-03-25 17:55:36 --> [MODEL_WHERE] App\Models\BudgetModel KEY="day <="
DEBUG - 2026-03-25 17:55:36 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":11758,"account_type":"Income","month":"03","year":"2026"}
DEBUG - 2026-03-25 17:55:36 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-03-25 17:55:36 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":11758,"account_type":"Income","month":"02","year":"2026"}
DEBUG - 2026-03-25 17:55:36 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-03-25 17:55:36 --> [MODEL_WHERE] App\Models\BudgetModel KEY="created_by"
DEBUG - 2026-03-25 17:55:36 --> [MODEL_WHERE] App\Models\BudgetModel KEY="account_type"
DEBUG - 2026-03-25 17:55:36 --> [MODEL_WHERE] App\Models\BudgetModel KEY="designated_date >="
DEBUG - 2026-03-25 17:55:36 --> [MODEL_WHERE] App\Models\BudgetModel KEY="designated_date <="
DEBUG - 2026-03-25 17:55:36 --> [MODEL_WHERE] App\Models\BudgetModel KEY="year"
DEBUG - 2026-03-25 17:55:36 --> [MODEL_WHERE] App\Models\BudgetModel KEY="month <="
DEBUG - 2026-03-25 17:55:36 --> [MODEL_WHERE] App\Models\BudgetModel KEY="day <="
DEBUG - 2026-03-25 17:55:36 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":11758,"account_type":"Expense","month":"03","year":"2026"}
DEBUG - 2026-03-25 17:55:36 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-03-25 17:55:36 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":11758,"account_type":"Expense","month":"02","year":"2026"}
DEBUG - 2026-03-25 17:55:36 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-03-25 17:55:36 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"status":1,"created_by":11758,"deleted":0}
DEBUG - 2026-03-25 17:55:36 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"status":1,"paid":0,"created_by":11758,"deleted":0}
DEBUG - 2026-03-25 17:55:36 --> [REQ_ID=81496e5ac8da] [REQUEST][START] GET /index.php/API/Investments/getConfidenceHeatmap?timeframe=5m&window=60
DEBUG - 2026-03-25 17:55:36 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-25 17:55:36 --> [REQ_ID=81496e5ac8da] [FILTER_BEFORE] /index.php/API/Investments/getConfidenceHeatmap?timeframe=5m&window=60
DEBUG - 2026-03-25 17:55:36 --> [REQ_ID=81496e5ac8da] [ROUTE] Controller=\App\Modules\APIs\Controllers\InvestmentsAPIController Method=getConfidenceHeatmap
DEBUG - 2026-03-25 17:55:36 --> [REQ_ID=81496e5ac8da] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Investments/getConfidenceHeatmap?timeframe=5m&window=60
DEBUG - 2026-03-25 17:55:36 --> [REQ_ID=2d751c035a35] [INIT] App\Modules\APIs\Controllers\InvestmentsAPIController::GET
INFO - 2026-03-25 17:55:36 --> [REQ_ID=2d751c035a35] [MEMORY][controller-start] 6291456
DEBUG - 2026-03-25 17:55:36 --> [REQ_ID=7107174fe691] [REQUEST][START] GET /index.php/API/Investments/getForecastHighlights
DEBUG - 2026-03-25 17:55:36 --> [REQ_ID=b4b0ce5d5de2] [REQUEST][START] GET /index.php/API/Investments/getForecastAccuracySummary?window=7d
DEBUG - 2026-03-25 17:55:36 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-25 17:55:36 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-25 17:55:36 --> [REQ_ID=001b7b62b89a] [REQUEST][START] GET /index.php/API/Investments/getConfidenceHeatmap?timeframe=all&window=6h
DEBUG - 2026-03-25 17:55:36 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-25 17:55:37 --> MyMIInvestments: no session user detected; skipping personalized hydration.
DEBUG - 2026-03-25 17:55:37 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-25 17:55:37 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"status":1,"created_by":11758,"deleted":0}
DEBUG - 2026-03-25 17:55:37 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"status":1,"paid":0,"created_by":11758,"deleted":0}
DEBUG - 2026-03-25 17:55:37 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":11758,"account_type":"Income","status":1,"month":"03","year":"2026"}
DEBUG - 2026-03-25 17:55:37 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-03-25 17:55:37 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":11758,"account_type":"Expense","status":1,"month":"03","year":"2026"}
DEBUG - 2026-03-25 17:55:37 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-03-25 17:55:37 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":11758,"account_type":"Investment","month":"03","year":"2026","status":1}
DEBUG - 2026-03-25 17:55:37 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-03-25 17:55:37 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-25 17:55:37 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":11758,"account_type":"Income","status":1,"month":"02"}
DEBUG - 2026-03-25 17:55:37 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-03-25 17:55:37 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":11758,"account_type":"Expense","status":1,"month":"02"}
DEBUG - 2026-03-25 17:55:37 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-03-25 17:55:37 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":11758,"account_type":"Investment","month":"02","year":"2026","status":1}
DEBUG - 2026-03-25 17:55:37 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-03-25 17:55:37 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":11758,"account_type":"Income","status":1,"month":"04"}
DEBUG - 2026-03-25 17:55:37 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-03-25 17:55:37 --> [REQ_ID=b4b0ce5d5de2] [FILTER_BEFORE] /index.php/API/Investments/getForecastAccuracySummary?window=7d
DEBUG - 2026-03-25 17:55:37 --> [REQ_ID=b4b0ce5d5de2] [ROUTE] Controller=\App\Modules\APIs\Controllers\InvestmentsAPIController Method=getForecastAccuracySummary
DEBUG - 2026-03-25 17:55:37 --> [REQ_ID=b4b0ce5d5de2] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Investments/getForecastAccuracySummary?window=7d
DEBUG - 2026-03-25 17:55:37 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":11758,"account_type":"Expense","status":1,"month":"04"}
DEBUG - 2026-03-25 17:55:37 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-03-25 17:55:37 --> [REQ_ID=8928c0b19833] [INIT] App\Modules\APIs\Controllers\InvestmentsAPIController::GET
INFO - 2026-03-25 17:55:37 --> [REQ_ID=8928c0b19833] [MEMORY][controller-start] 6291456
DEBUG - 2026-03-25 17:55:37 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":11758,"account_type":"Investment","month":"04","year":"2026","status":1}
DEBUG - 2026-03-25 17:55:37 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-03-25 17:55:37 --> [REQ_ID=7107174fe691] [FILTER_BEFORE] /index.php/API/Investments/getForecastHighlights
DEBUG - 2026-03-25 17:55:37 --> [REQ_ID=7107174fe691] [ROUTE] Controller=\App\Modules\APIs\Controllers\InvestmentsAPIController Method=getForecastHighlights
DEBUG - 2026-03-25 17:55:37 --> [REQ_ID=7107174fe691] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Investments/getForecastHighlights
DEBUG - 2026-03-25 17:55:37 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":11758,"account_type":"Income","status":1,"year":"2026"}
DEBUG - 2026-03-25 17:55:37 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-03-25 17:55:37 --> [MODEL_WHERE] App\Models\BudgetModel KEY="created_by"
DEBUG - 2026-03-25 17:55:37 --> [MODEL_WHERE] App\Models\BudgetModel KEY="account_type"
DEBUG - 2026-03-25 17:55:37 --> [MODEL_WHERE] App\Models\BudgetModel KEY="status"
DEBUG - 2026-03-25 17:55:37 --> [MODEL_WHERE] App\Models\BudgetModel KEY="year"
DEBUG - 2026-03-25 17:55:37 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-03-25 17:55:37 --> [REQ_ID=e04bb5c351ac] [INIT] App\Modules\APIs\Controllers\InvestmentsAPIController::GET
INFO - 2026-03-25 17:55:37 --> [REQ_ID=e04bb5c351ac] [MEMORY][controller-start] 6291456
DEBUG - 2026-03-25 17:55:37 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":11758,"account_type":"Investment","status":1}
DEBUG - 2026-03-25 17:55:37 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-03-25 17:55:37 --> [MODEL_WHERE] App\Models\BudgetModel KEY="created_by"
DEBUG - 2026-03-25 17:55:37 --> [MODEL_WHERE] App\Models\BudgetModel KEY="account_type"
DEBUG - 2026-03-25 17:55:37 --> [MODEL_WHERE] App\Models\BudgetModel KEY="status"
DEBUG - 2026-03-25 17:55:37 --> [MODEL_WHERE] App\Models\BudgetModel KEY="designated_date >="
DEBUG - 2026-03-25 17:55:37 --> [MODEL_WHERE] App\Models\BudgetModel KEY="designated_date <="
DEBUG - 2026-03-25 17:55:37 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-03-25 17:55:37 --> [REQ_ID=001b7b62b89a] [FILTER_BEFORE] /index.php/API/Investments/getConfidenceHeatmap?timeframe=all&window=6h
DEBUG - 2026-03-25 17:55:37 --> [REQ_ID=001b7b62b89a] [ROUTE] Controller=\App\Modules\APIs\Controllers\InvestmentsAPIController Method=getConfidenceHeatmap
DEBUG - 2026-03-25 17:55:37 --> [REQ_ID=001b7b62b89a] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Investments/getConfidenceHeatmap?timeframe=all&window=6h
DEBUG - 2026-03-25 17:55:37 --> [REQ_ID=494162d7c58a] [INIT] App\Modules\APIs\Controllers\InvestmentsAPIController::GET
INFO - 2026-03-25 17:55:37 --> [REQ_ID=494162d7c58a] [MEMORY][controller-start] 6291456
DEBUG - 2026-03-25 17:55:37 --> [MODEL_WHERE] App\Models\BudgetModel KEY="created_by"
DEBUG - 2026-03-25 17:55:37 --> [MODEL_WHERE] App\Models\BudgetModel KEY="account_type"
DEBUG - 2026-03-25 17:55:37 --> [MODEL_WHERE] App\Models\BudgetModel KEY="status"
DEBUG - 2026-03-25 17:55:37 --> [MODEL_WHERE] App\Models\BudgetModel KEY="designated_date >="
DEBUG - 2026-03-25 17:55:37 --> [MODEL_WHERE] App\Models\BudgetModel KEY="designated_date <="
DEBUG - 2026-03-25 17:55:37 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-03-25 17:55:37 --> MyMICoin: guest context detected; skipping user-specific preload.
INFO - 2026-03-25 17:55:37 --> DashboardController L72 - $checkingSummary: 0
DEBUG - 2026-03-25 17:55:37 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-25 17:55:37 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-25 17:55:37 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-25 17:55:37 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-25 17:55:37 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-25 17:55:37 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-25 17:55:37 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-25 17:55:37 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-25 17:55:37 --> [SERVICE] App\Services\BudgetService ::getUserBudget
DEBUG - 2026-03-25 17:55:37 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":11758,"deleted":0}
DEBUG - 2026-03-25 17:55:37 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-25 17:55:37 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"status":1,"created_by":11758,"deleted":0}
DEBUG - 2026-03-25 17:55:37 --> [MODEL_WHERE] App\Models\BudgetModel KEY="created_by"
DEBUG - 2026-03-25 17:55:37 --> [MODEL_WHERE] App\Models\BudgetModel KEY="account_type"
DEBUG - 2026-03-25 17:55:37 --> [MODEL_WHERE] App\Models\BudgetModel KEY="designated_date >="
DEBUG - 2026-03-25 17:55:37 --> [MODEL_WHERE] App\Models\BudgetModel KEY="designated_date <="
DEBUG - 2026-03-25 17:55:37 --> [MODEL_WHERE] App\Models\BudgetModel KEY="year"
DEBUG - 2026-03-25 17:55:37 --> [MODEL_WHERE] App\Models\BudgetModel KEY="month <="
DEBUG - 2026-03-25 17:55:37 --> [MODEL_WHERE] App\Models\BudgetModel KEY="day <="
DEBUG - 2026-03-25 17:55:37 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":11758,"account_type":"Income","month":"03","year":"2026"}
DEBUG - 2026-03-25 17:55:37 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-03-25 17:55:37 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":11758,"account_type":"Income","month":"02","year":"2026"}
DEBUG - 2026-03-25 17:55:37 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-03-25 17:55:37 --> [MODEL_WHERE] App\Models\BudgetModel KEY="created_by"
DEBUG - 2026-03-25 17:55:37 --> [MODEL_WHERE] App\Models\BudgetModel KEY="account_type"
DEBUG - 2026-03-25 17:55:37 --> [MODEL_WHERE] App\Models\BudgetModel KEY="designated_date >="
DEBUG - 2026-03-25 17:55:37 --> [MODEL_WHERE] App\Models\BudgetModel KEY="designated_date <="
DEBUG - 2026-03-25 17:55:37 --> [MODEL_WHERE] App\Models\BudgetModel KEY="year"
DEBUG - 2026-03-25 17:55:37 --> [MODEL_WHERE] App\Models\BudgetModel KEY="month <="
DEBUG - 2026-03-25 17:55:37 --> [MODEL_WHERE] App\Models\BudgetModel KEY="day <="
DEBUG - 2026-03-25 17:55:37 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":11758,"account_type":"Expense","month":"03","year":"2026"}
DEBUG - 2026-03-25 17:55:37 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-03-25 17:55:37 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":11758,"account_type":"Expense","month":"02","year":"2026"}
DEBUG - 2026-03-25 17:55:37 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-03-25 17:55:37 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"status":1,"created_by":11758,"deleted":0}
DEBUG - 2026-03-25 17:55:37 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"status":1,"paid":0,"created_by":11758,"deleted":0}
DEBUG - 2026-03-25 17:55:37 --> [REQ_ID=260e20ad33c6] [REQUEST][START] GET /index.php/ops/health
INFO - 2026-03-25 17:55:37 --> getSolanaData: invalid address param
DEBUG - 2026-03-25 17:55:37 --> MyMIMarketing: Pscrape library not installed; Google search scraping will use fallback.
DEBUG - 2026-03-25 17:55:37 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-25 17:55:37 --> MyMIInvestments: no session user detected; skipping personalized hydration.
DEBUG - 2026-03-25 17:55:37 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-25 17:55:37 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-25 17:55:37 --> MyMIInvestments: no session user detected; skipping personalized hydration.
DEBUG - 2026-03-25 17:55:37 --> MyMIInvestments: no session user detected; skipping personalized hydration.
DEBUG - 2026-03-25 17:55:37 --> MyMICoin: guest context detected; skipping user-specific preload.
INFO - 2026-03-25 17:55:37 --> Premium entitlement guest: user_id= route=/index.php/API/Investments/getConfidenceHeatmap feature=investments.analytics tier=free status=free allowed=no reason=You must be logged in to use this feature.
WARNING - 2026-03-25 17:55:37 --> Premium access denied: feature=investments.analytics route=/index.php/API/Investments/getConfidenceHeatmap user_id= tier=free status=free
DEBUG - 2026-03-25 17:55:37 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-25 17:55:37 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-25 17:55:37 --> [REQ_ID=81496e5ac8da] [FILTER_AFTER]
DEBUG - 2026-03-25 17:55:37 --> [REQ_ID=81496e5ac8da] [LIFECYCLE][END] status=302 duration_ms=437.82 memory_delta=2097152
INFO - 2026-03-25 17:55:37 --> [REQ_ID=2d751c035a35] [PERF] Execution time=0.435862
DEBUG - 2026-03-25 17:55:37 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-25 17:55:37 --> [REQ_ID=81496e5ac8da] [REQUEST][END]
INFO - 2026-03-25 17:55:37 --> [REQ_ID=81496e5ac8da] [PERF] Execution time=0.617187
DEBUG - 2026-03-25 17:55:37 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-25 17:55:37 --> [REQ_ID=260e20ad33c6] [FILTER_BEFORE] /index.php/ops/health
DEBUG - 2026-03-25 17:55:37 --> [REQ_ID=260e20ad33c6] [ROUTE] Controller=\App\Controllers\OpsHealthController Method=index
DEBUG - 2026-03-25 17:55:37 --> [REQ_ID=260e20ad33c6] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/ops/health
DEBUG - 2026-03-25 17:55:37 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-25 17:55:37 --> [CSRF] token name=csrf_test_name hash=a19dded353705a7485398a5dae84204f
DEBUG - 2026-03-25 17:55:37 --> MyMIMarketing: Pscrape library not installed; Google search scraping will use fallback.
DEBUG - 2026-03-25 17:55:37 --> [REQ_ID=2896be7183fd] [REQUEST][START] GET /index.php/Memberships
DEBUG - 2026-03-25 17:55:37 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-25 17:55:37 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-25 17:55:37 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-25 17:55:37 --> [REQ_ID=2896be7183fd] [FILTER_BEFORE] /index.php/Memberships
DEBUG - 2026-03-25 17:55:37 --> [REQ_ID=2896be7183fd] [ROUTE] Controller=\App\Controllers\Home Method=memberships
DEBUG - 2026-03-25 17:55:37 --> [REQ_ID=2896be7183fd] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Memberships
DEBUG - 2026-03-25 17:55:37 --> [CSRF] token name=csrf_test_name hash=03f84ad44deaab0c86c6f5d7c4f0a216
DEBUG - 2026-03-25 17:55:37 --> [REQ_ID=225575b01fca] [INIT] App\Controllers\Home::GET
INFO - 2026-03-25 17:55:37 --> [REQ_ID=225575b01fca] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-25 17:55:37 --> MyMIMarketing: Pscrape library not installed; Google search scraping will use fallback.
DEBUG - 2026-03-25 17:55:37 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-25 17:55:37 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-25 17:55:37 --> MyMIMarketing: Pscrape library not installed; Google search scraping will use fallback.
DEBUG - 2026-03-25 17:55:37 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-25 17:55:37 --> MyMIUser L52 - initialized (first log).
INFO - 2026-03-25 17:55:37 --> [REQ_ID=225575b01fca] [MEMORY][commonData:start] 4194304
DEBUG - 2026-03-25 17:55:37 --> MyMIUser L52 - initialized (first log).
INFO - 2026-03-25 17:55:37 --> Premium entitlement guest: user_id= route=/index.php/API/Investments/getForecastAccuracySummary feature=investments.analytics tier=free status=free allowed=no reason=You must be logged in to use this feature.
WARNING - 2026-03-25 17:55:37 --> Premium access denied: feature=investments.analytics route=/index.php/API/Investments/getForecastAccuracySummary user_id= tier=free status=free
DEBUG - 2026-03-25 17:55:37 --> [REQ_ID=260e20ad33c6] [REQUEST][END]
INFO - 2026-03-25 17:55:37 --> [REQ_ID=260e20ad33c6] [PERF] Execution time=0.325812
DEBUG - 2026-03-25 17:55:37 --> [REQ_ID=b4b0ce5d5de2] [FILTER_AFTER]
DEBUG - 2026-03-25 17:55:37 --> [REQ_ID=b4b0ce5d5de2] [LIFECYCLE][END] status=302 duration_ms=469.67 memory_delta=2097152
INFO - 2026-03-25 17:55:37 --> [REQ_ID=8928c0b19833] [PERF] Execution time=0.468671
INFO - 2026-03-25 17:55:37 --> Premium entitlement guest: user_id= route=/index.php/API/Investments/getConfidenceHeatmap feature=investments.analytics tier=free status=free allowed=no reason=You must be logged in to use this feature.
WARNING - 2026-03-25 17:55:37 --> Premium access denied: feature=investments.analytics route=/index.php/API/Investments/getConfidenceHeatmap user_id= tier=free status=free
DEBUG - 2026-03-25 17:55:37 --> [REQ_ID=001b7b62b89a] [FILTER_AFTER]
DEBUG - 2026-03-25 17:55:37 --> [REQ_ID=001b7b62b89a] [LIFECYCLE][END] status=302 duration_ms=467.41 memory_delta=2097152
INFO - 2026-03-25 17:55:37 --> [REQ_ID=494162d7c58a] [PERF] Execution time=0.466292
DEBUG - 2026-03-25 17:55:37 --> [REQ_ID=b4b0ce5d5de2] [REQUEST][END]
INFO - 2026-03-25 17:55:37 --> [REQ_ID=b4b0ce5d5de2] [PERF] Execution time=0.656559
DEBUG - 2026-03-25 17:55:37 --> [REQ_ID=001b7b62b89a] [REQUEST][END]
INFO - 2026-03-25 17:55:37 --> [REQ_ID=001b7b62b89a] [PERF] Execution time=0.617677
INFO - 2026-03-25 17:55:37 --> themesMemory usage: 8388608
DEBUG - 2026-03-25 17:55:37 --> [REQ_ID=89873cbc5c01] [FILTER_AFTER]
DEBUG - 2026-03-25 17:55:37 --> [REQ_ID=89873cbc5c01] [LIFECYCLE][END] status=200 duration_ms=2,159.66 memory_delta=2097152
INFO - 2026-03-25 17:55:37 --> [REQ_ID=bc034670648b] [PERF] Execution time=2.076812
DEBUG - 2026-03-25 17:55:37 --> [REQ_ID=89873cbc5c01] [REQUEST][END]
INFO - 2026-03-25 17:55:37 --> [REQ_ID=89873cbc5c01] [PERF] Execution time=2.218523
DEBUG - 2026-03-25 17:55:37 --> [REQ_ID=7107174fe691] [FILTER_AFTER]
DEBUG - 2026-03-25 17:55:37 --> [REQ_ID=7107174fe691] [LIFECYCLE][END] status=200 duration_ms=786.60 memory_delta=2097152
INFO - 2026-03-25 17:55:37 --> [REQ_ID=e04bb5c351ac] [PERF] Execution time=0.778963
DEBUG - 2026-03-25 17:55:37 --> [REQ_ID=7107174fe691] [REQUEST][END]
INFO - 2026-03-25 17:55:37 --> [REQ_ID=7107174fe691] [PERF] Execution time=0.966768
DEBUG - 2026-03-25 17:55:37 --> [REQ_ID=db77609e2d35] [REQUEST][START] GET /index.php/API/Investments/getForecastHighlights
DEBUG - 2026-03-25 17:55:37 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-25 17:55:37 --> [REQ_ID=db77609e2d35] [FILTER_BEFORE] /index.php/API/Investments/getForecastHighlights
DEBUG - 2026-03-25 17:55:37 --> [REQ_ID=db77609e2d35] [ROUTE] Controller=\App\Modules\APIs\Controllers\InvestmentsAPIController Method=getForecastHighlights
DEBUG - 2026-03-25 17:55:37 --> [REQ_ID=db77609e2d35] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Investments/getForecastHighlights
DEBUG - 2026-03-25 17:55:37 --> [REQ_ID=2241da30c733] [INIT] App\Modules\APIs\Controllers\InvestmentsAPIController::GET
INFO - 2026-03-25 17:55:37 --> [REQ_ID=2241da30c733] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-25 17:55:37 --> MyMIInvestments: no session user detected; skipping personalized hydration.
DEBUG - 2026-03-25 17:55:37 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-25 17:55:37 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-25 17:55:37 --> MyMIMarketing: Pscrape library not installed; Google search scraping will use fallback.
DEBUG - 2026-03-25 17:55:37 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-25 17:55:37 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-25 17:55:37 --> [REQ_ID=db77609e2d35] [FILTER_AFTER]
DEBUG - 2026-03-25 17:55:37 --> [REQ_ID=db77609e2d35] [LIFECYCLE][END] status=200 duration_ms=14.06 memory_delta=0
INFO - 2026-03-25 17:55:37 --> [REQ_ID=2241da30c733] [PERF] Execution time=0.014068
DEBUG - 2026-03-25 17:55:37 --> [REQ_ID=db77609e2d35] [REQUEST][END]
INFO - 2026-03-25 17:55:37 --> [REQ_ID=db77609e2d35] [PERF] Execution time=0.023879
DEBUG - 2026-03-25 17:55:38 --> [MetaService] slug=memberships pageName= cacheHit= path=DB
DEBUG - 2026-03-25 17:55:38 --> [REQ_ID=225575b01fca] [VIEW_RENDER] themes/public/memberships
INFO - 2026-03-25 17:55:38 --> [REQ_ID=225575b01fca] [MEMORY][commonData:start] 8388608
INFO - 2026-03-25 17:55:38 --> themesMemory usage: 8388608
DEBUG - 2026-03-25 17:55:38 --> [MetaService] slug=memberships pageName=Memberships cacheHit= path=DB
DEBUG - 2026-03-25 17:55:38 --> [REQ_ID=2896be7183fd] [FILTER_AFTER]
DEBUG - 2026-03-25 17:55:38 --> [REQ_ID=2896be7183fd] [LIFECYCLE][END] status=200 duration_ms=665.64 memory_delta=4194304
INFO - 2026-03-25 17:55:38 --> [REQ_ID=225575b01fca] [PERF] Execution time=0.642939
DEBUG - 2026-03-25 17:55:38 --> [REQ_ID=2896be7183fd] [REQUEST][END]
INFO - 2026-03-25 17:55:38 --> [REQ_ID=2896be7183fd] [PERF] Execution time=0.692832
DEBUG - 2026-03-25 17:55:38 --> [REQ_ID=73084ecf425a] [REQUEST][START] GET /index.php/Memberships
DEBUG - 2026-03-25 17:55:38 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-25 17:55:38 --> [REQ_ID=73084ecf425a] [FILTER_BEFORE] /index.php/Memberships
DEBUG - 2026-03-25 17:55:38 --> [REQ_ID=73084ecf425a] [ROUTE] Controller=\App\Controllers\Home Method=memberships
DEBUG - 2026-03-25 17:55:38 --> [REQ_ID=73084ecf425a] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Memberships
DEBUG - 2026-03-25 17:55:38 --> [CSRF] token name=csrf_test_name hash=a19dded353705a7485398a5dae84204f
DEBUG - 2026-03-25 17:55:38 --> [REQ_ID=19869f55bf9b] [INIT] App\Controllers\Home::GET
INFO - 2026-03-25 17:55:38 --> [REQ_ID=19869f55bf9b] [MEMORY][controller-start] 6291456
INFO - 2026-03-25 17:55:38 --> [REQ_ID=19869f55bf9b] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-25 17:55:38 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-25 17:55:38 --> [MetaService] slug=memberships pageName= cacheHit=1 path=CACHE
DEBUG - 2026-03-25 17:55:38 --> [REQ_ID=19869f55bf9b] [VIEW_RENDER] themes/public/memberships
INFO - 2026-03-25 17:55:38 --> [REQ_ID=19869f55bf9b] [MEMORY][commonData:start] 8388608
INFO - 2026-03-25 17:55:38 --> themesMemory usage: 8388608
DEBUG - 2026-03-25 17:55:38 --> [MetaService] slug=memberships pageName=Memberships cacheHit=1 path=CACHE
DEBUG - 2026-03-25 17:55:38 --> [REQ_ID=73084ecf425a] [FILTER_AFTER]
DEBUG - 2026-03-25 17:55:38 --> [REQ_ID=73084ecf425a] [LIFECYCLE][END] status=200 duration_ms=531.20 memory_delta=2097152
INFO - 2026-03-25 17:55:38 --> [REQ_ID=19869f55bf9b] [PERF] Execution time=0.530991
DEBUG - 2026-03-25 17:55:38 --> [REQ_ID=73084ecf425a] [REQUEST][END]
INFO - 2026-03-25 17:55:38 --> [REQ_ID=73084ecf425a] [PERF] Execution time=0.540200
DEBUG - 2026-03-25 17:55:38 --> [REQ_ID=1929d1ae41d4] [REQUEST][START] GET /index.php/Memberships
DEBUG - 2026-03-25 17:55:38 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-25 17:55:38 --> [REQ_ID=1929d1ae41d4] [FILTER_BEFORE] /index.php/Memberships
DEBUG - 2026-03-25 17:55:38 --> [REQ_ID=1929d1ae41d4] [ROUTE] Controller=\App\Controllers\Home Method=memberships
DEBUG - 2026-03-25 17:55:38 --> [REQ_ID=1929d1ae41d4] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Memberships
DEBUG - 2026-03-25 17:55:38 --> [CSRF] token name=csrf_test_name hash=a19dded353705a7485398a5dae84204f
DEBUG - 2026-03-25 17:55:38 --> [REQ_ID=dd214e0737e2] [INIT] App\Controllers\Home::GET
INFO - 2026-03-25 17:55:38 --> [REQ_ID=dd214e0737e2] [MEMORY][controller-start] 6291456
INFO - 2026-03-25 17:55:38 --> [REQ_ID=dd214e0737e2] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-25 17:55:38 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-25 17:55:39 --> [MetaService] slug=memberships pageName= cacheHit=1 path=CACHE
DEBUG - 2026-03-25 17:55:39 --> [REQ_ID=dd214e0737e2] [VIEW_RENDER] themes/public/memberships
INFO - 2026-03-25 17:55:39 --> [REQ_ID=dd214e0737e2] [MEMORY][commonData:start] 8388608
INFO - 2026-03-25 17:55:39 --> themesMemory usage: 8388608
DEBUG - 2026-03-25 17:55:39 --> [MetaService] slug=memberships pageName=Memberships cacheHit=1 path=CACHE
DEBUG - 2026-03-25 17:55:39 --> [REQ_ID=1929d1ae41d4] [FILTER_AFTER]
DEBUG - 2026-03-25 17:55:39 --> [REQ_ID=1929d1ae41d4] [LIFECYCLE][END] status=200 duration_ms=539.10 memory_delta=2097152
INFO - 2026-03-25 17:55:39 --> [REQ_ID=dd214e0737e2] [PERF] Execution time=0.538918
DEBUG - 2026-03-25 17:55:39 --> [REQ_ID=1929d1ae41d4] [REQUEST][END]
INFO - 2026-03-25 17:55:39 --> [REQ_ID=1929d1ae41d4] [PERF] Execution time=0.547830
DEBUG - 2026-03-25 17:56:22 --> [REQ_ID=bb8947dbfaf1] [REQUEST][START] HEAD /
DEBUG - 2026-03-25 17:56:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-25 17:56:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-25 17:56:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-25 17:56:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-25 17:56:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-25 18:00:01 --> [REQ_ID=fdb3cacd58c4] [REQUEST][START] GET /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-25 18:00:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-25 18:00:01 --> [REQ_ID=fdb3cacd58c4] [FILTER_BEFORE] /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-25 18:00:01 --> [REQ_ID=fdb3cacd58c4] [ROUTE] Controller=\App\Modules\Management\Controllers\ManagementAPIController Method=Run_CRON_Tasks
DEBUG - 2026-03-25 18:00:01 --> [REQ_ID=fdb3cacd58c4] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-25 18:00:01 --> [REQ_ID=fdb3cacd58c4] [REQUEST][END]
INFO - 2026-03-25 18:00:01 --> [REQ_ID=fdb3cacd58c4] [PERF] Execution time=0.047933
DEBUG - 2026-03-25 18:01:22 --> [REQ_ID=0ea39a2b544c] [REQUEST][START] HEAD /
DEBUG - 2026-03-25 18:01:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-25 18:01:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-25 18:01:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-25 18:01:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-25 18:01:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-25 18:06:22 --> [REQ_ID=77d50f024c66] [REQUEST][START] HEAD /
DEBUG - 2026-03-25 18:06:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-25 18:06:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-25 18:06:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-25 18:06:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-25 18:06:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-25 18:11:22 --> [REQ_ID=bb8eb80598af] [REQUEST][START] HEAD /
DEBUG - 2026-03-25 18:11:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-25 18:11:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-25 18:11:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-25 18:11:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-25 18:11:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-25 18:15:01 --> [REQ_ID=807023094929] [REQUEST][START] GET /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-25 18:15:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-25 18:15:01 --> [REQ_ID=807023094929] [FILTER_BEFORE] /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-25 18:15:01 --> [REQ_ID=807023094929] [ROUTE] Controller=\App\Modules\APIs\Controllers\AlertsAPIController Method=fetchEmailAlerts
DEBUG - 2026-03-25 18:15:01 --> [REQ_ID=807023094929] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-25 18:15:01 --> [REQ_ID=807023094929] [REQUEST][END]
INFO - 2026-03-25 18:15:01 --> [REQ_ID=807023094929] [PERF] Execution time=0.046084
DEBUG - 2026-03-25 18:16:22 --> [REQ_ID=ec82d864df4e] [REQUEST][START] HEAD /
DEBUG - 2026-03-25 18:16:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-25 18:16:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-25 18:16:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-25 18:16:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-25 18:16:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-25 18:19:31 --> [REQ_ID=8ba563a87ce6] [REQUEST][START] GET /index.php/Dashboard
DEBUG - 2026-03-25 18:19:31 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-25 18:19:31 --> [REQ_ID=8ba563a87ce6] [FILTER_BEFORE] /index.php/Dashboard
DEBUG - 2026-03-25 18:19:31 --> [REQ_ID=8ba563a87ce6] [ROUTE] Controller=\App\Modules\User\Controllers\DashboardController Method=index
DEBUG - 2026-03-25 18:19:31 --> [REQ_ID=8ba563a87ce6] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Dashboard
DEBUG - 2026-03-25 18:19:31 --> [CSRF] token name=csrf_test_name hash=03f84ad44deaab0c86c6f5d7c4f0a216
DEBUG - 2026-03-25 18:19:31 --> [REQ_ID=09e20121ad7d] [INIT] App\Modules\User\Controllers\DashboardController::GET
INFO - 2026-03-25 18:19:31 --> [REQ_ID=09e20121ad7d] [MEMORY][controller-start] 6291456
DEBUG - 2026-03-25 18:19:31 --> [REQ_ID=09e20121ad7d] [METHOD_ENTRY] index
DEBUG - 2026-03-25 18:19:31 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-25 18:19:31 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-25 18:19:31 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-25 18:19:31 --> MyMIMarketing: Pscrape library not installed; Google search scraping will use fallback.
DEBUG - 2026-03-25 18:19:31 --> [DASHBOARD] Enter
DEBUG - 2026-03-25 18:19:31 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-25 18:19:31 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-25 18:19:31 --> [SERVICE] App\Services\BudgetService ::getUserBudget
DEBUG - 2026-03-25 18:19:31 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":11758,"deleted":0}
DEBUG - 2026-03-25 18:19:31 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-25 18:19:31 --> [MODEL_WHERE] App\Models\BudgetModel KEY="created_by"
DEBUG - 2026-03-25 18:19:31 --> [MODEL_WHERE] App\Models\BudgetModel KEY="account_type"
DEBUG - 2026-03-25 18:19:31 --> [MODEL_WHERE] App\Models\BudgetModel KEY="designated_date >="
DEBUG - 2026-03-25 18:19:31 --> [MODEL_WHERE] App\Models\BudgetModel KEY="designated_date <="
DEBUG - 2026-03-25 18:19:31 --> [MODEL_WHERE] App\Models\BudgetModel KEY="year"
DEBUG - 2026-03-25 18:19:31 --> [MODEL_WHERE] App\Models\BudgetModel KEY="month <="
DEBUG - 2026-03-25 18:19:31 --> [MODEL_WHERE] App\Models\BudgetModel KEY="day <="
DEBUG - 2026-03-25 18:19:31 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":11758,"account_type":"Income","month":"03","year":"2026"}
DEBUG - 2026-03-25 18:19:31 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-03-25 18:19:31 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":11758,"account_type":"Income","month":"02","year":"2026"}
DEBUG - 2026-03-25 18:19:31 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-03-25 18:19:31 --> [MODEL_WHERE] App\Models\BudgetModel KEY="created_by"
DEBUG - 2026-03-25 18:19:31 --> [MODEL_WHERE] App\Models\BudgetModel KEY="account_type"
DEBUG - 2026-03-25 18:19:31 --> [MODEL_WHERE] App\Models\BudgetModel KEY="designated_date >="
DEBUG - 2026-03-25 18:19:31 --> [MODEL_WHERE] App\Models\BudgetModel KEY="designated_date <="
DEBUG - 2026-03-25 18:19:31 --> [MODEL_WHERE] App\Models\BudgetModel KEY="year"
DEBUG - 2026-03-25 18:19:31 --> [MODEL_WHERE] App\Models\BudgetModel KEY="month <="
DEBUG - 2026-03-25 18:19:31 --> [MODEL_WHERE] App\Models\BudgetModel KEY="day <="
DEBUG - 2026-03-25 18:19:31 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":11758,"account_type":"Expense","month":"03","year":"2026"}
DEBUG - 2026-03-25 18:19:31 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-03-25 18:19:31 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":11758,"account_type":"Expense","month":"02","year":"2026"}
DEBUG - 2026-03-25 18:19:31 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-03-25 18:19:31 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"status":1,"created_by":11758,"deleted":0}
DEBUG - 2026-03-25 18:19:31 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"status":1,"paid":0,"created_by":11758,"deleted":0}
DEBUG - 2026-03-25 18:19:31 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"status":1,"created_by":11758,"deleted":0}
ERROR - 2026-03-25 18:19:31 --> DashboardController::index failed to load executive summary: Call to undefined method CodeIgniter\Cache\Handlers\FileHandler::set()
DEBUG - 2026-03-25 18:19:31 --> [CACHE_MISS] mymiwallet_development_squeeze_high-risk_global_global_1f86633dd
ERROR - 2026-03-25 18:19:31 --> Unknown column 'score_total' in 'where clause'
in SYSTEMPATH/Database/MySQLi/Connection.php on line 300.
 1 SYSTEMPATH/Database/MySQLi/Connection.php(300): mysqli->query('SELECT COUNT(*) AS `numrows`
FROM `bf_squeeze_scorecards`
WHERE `score_total` >= 80
AND `as_of_datetime` >= \'2026-03-24 18:19:31\'', 0)
 2 SYSTEMPATH/Database/BaseConnection.php(769): CodeIgniter\Database\MySQLi\Connection->execute('SELECT COUNT(*) AS `numrows`
FROM `bf_squeeze_scorecards`
WHERE `score_total` >= 80
AND `as_of_datetime` >= \'2026-03-24 18:19:31\'')
 3 SYSTEMPATH/Database/BaseConnection.php(686): CodeIgniter\Database\BaseConnection->simpleQuery('SELECT COUNT(*) AS `numrows`
FROM `bf_squeeze_scorecards`
WHERE `score_total` >= 80
AND `as_of_datetime` >= \'2026-03-24 18:19:31\'')
 4 SYSTEMPATH/Database/BaseBuilder.php(1733): CodeIgniter\Database\BaseConnection->query('SELECT COUNT(*) AS `numrows`
FROM `bf_squeeze_scorecards`
WHERE `score_total` >= :score_total:
AND `as_of_datetime` >= :as_of_datetime:', [...], false)
 5 APPPATH/Libraries/MyMIInvestments.php(752): CodeIgniter\Database\BaseBuilder->countAllResults()
 6 APPPATH/Modules/User/Controllers/DashboardController.php(688): App\Libraries\MyMIInvestments->getSqueezeHighRiskCount(80, 24)
 7 SYSTEMPATH/CodeIgniter.php(951): App\Modules\User\Controllers\DashboardController->index()
 8 SYSTEMPATH/CodeIgniter.php(497): CodeIgniter\CodeIgniter->runController(Object(App\Modules\User\Controllers\DashboardController))
 9 SYSTEMPATH/CodeIgniter.php(340): CodeIgniter\CodeIgniter->handleRequest(null, Object(Config\Cache), false)
10 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
11 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
12 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
DEBUG - 2026-03-25 18:19:31 --> MyMIInvestments::getSqueezeHighRiskCount failed: Unknown column 'score_total' in 'where clause'
DEBUG - 2026-03-25 18:19:31 --> 📰 Daily dashboard news window 2026-03-25 00:00:00 -> 2026-03-25 23:59:59 returned 0 rows
DEBUG - 2026-03-25 18:19:31 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-25 18:19:31 --> [SETUP] Status computed
DEBUG - 2026-03-25 18:19:31 --> [REQ_ID=09e20121ad7d] [VIEW_RENDER] User/Dashboard/index
INFO - 2026-03-25 18:19:31 --> [REQ_ID=09e20121ad7d] [MEMORY][commonData:start] 8388608
DEBUG - 2026-03-25 18:19:31 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-25 18:19:31 --> [MODEL_WHERE] App\Models\BudgetModel KEY="created_by"
DEBUG - 2026-03-25 18:19:31 --> [MODEL_WHERE] App\Models\BudgetModel KEY="account_type"
DEBUG - 2026-03-25 18:19:31 --> [MODEL_WHERE] App\Models\BudgetModel KEY="designated_date >="
DEBUG - 2026-03-25 18:19:31 --> [MODEL_WHERE] App\Models\BudgetModel KEY="designated_date <="
DEBUG - 2026-03-25 18:19:31 --> [MODEL_WHERE] App\Models\BudgetModel KEY="year"
DEBUG - 2026-03-25 18:19:31 --> [MODEL_WHERE] App\Models\BudgetModel KEY="month <="
DEBUG - 2026-03-25 18:19:31 --> [MODEL_WHERE] App\Models\BudgetModel KEY="day <="
DEBUG - 2026-03-25 18:19:31 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":11758,"account_type":"Income","month":"03","year":"2026"}
DEBUG - 2026-03-25 18:19:31 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-03-25 18:19:31 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":11758,"account_type":"Income","month":"02","year":"2026"}
DEBUG - 2026-03-25 18:19:31 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-03-25 18:19:31 --> [MODEL_WHERE] App\Models\BudgetModel KEY="created_by"
DEBUG - 2026-03-25 18:19:31 --> [MODEL_WHERE] App\Models\BudgetModel KEY="account_type"
DEBUG - 2026-03-25 18:19:31 --> [MODEL_WHERE] App\Models\BudgetModel KEY="designated_date >="
DEBUG - 2026-03-25 18:19:31 --> [MODEL_WHERE] App\Models\BudgetModel KEY="designated_date <="
DEBUG - 2026-03-25 18:19:31 --> [MODEL_WHERE] App\Models\BudgetModel KEY="year"
DEBUG - 2026-03-25 18:19:31 --> [MODEL_WHERE] App\Models\BudgetModel KEY="month <="
DEBUG - 2026-03-25 18:19:31 --> [MODEL_WHERE] App\Models\BudgetModel KEY="day <="
DEBUG - 2026-03-25 18:19:31 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":11758,"account_type":"Expense","month":"03","year":"2026"}
DEBUG - 2026-03-25 18:19:31 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-03-25 18:19:31 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":11758,"account_type":"Expense","month":"02","year":"2026"}
DEBUG - 2026-03-25 18:19:31 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-03-25 18:19:31 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"status":1,"created_by":11758,"deleted":0}
DEBUG - 2026-03-25 18:19:31 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"status":1,"paid":0,"created_by":11758,"deleted":0}
DEBUG - 2026-03-25 18:19:32 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-25 18:19:32 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"status":1,"created_by":11758,"deleted":0}
DEBUG - 2026-03-25 18:19:32 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"status":1,"paid":0,"created_by":11758,"deleted":0}
DEBUG - 2026-03-25 18:19:32 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":11758,"account_type":"Income","status":1,"month":"03","year":"2026"}
DEBUG - 2026-03-25 18:19:32 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-03-25 18:19:32 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":11758,"account_type":"Expense","status":1,"month":"03","year":"2026"}
DEBUG - 2026-03-25 18:19:32 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-03-25 18:19:32 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":11758,"account_type":"Investment","month":"03","year":"2026","status":1}
DEBUG - 2026-03-25 18:19:32 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-03-25 18:19:32 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":11758,"account_type":"Income","status":1,"month":"02"}
DEBUG - 2026-03-25 18:19:32 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-03-25 18:19:32 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":11758,"account_type":"Expense","status":1,"month":"02"}
DEBUG - 2026-03-25 18:19:32 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-03-25 18:19:32 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":11758,"account_type":"Investment","month":"02","year":"2026","status":1}
DEBUG - 2026-03-25 18:19:32 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-03-25 18:19:32 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":11758,"account_type":"Income","status":1,"month":"04"}
DEBUG - 2026-03-25 18:19:32 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-03-25 18:19:32 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":11758,"account_type":"Expense","status":1,"month":"04"}
DEBUG - 2026-03-25 18:19:32 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-03-25 18:19:32 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":11758,"account_type":"Investment","month":"04","year":"2026","status":1}
DEBUG - 2026-03-25 18:19:32 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-03-25 18:19:32 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":11758,"account_type":"Income","status":1,"year":"2026"}
DEBUG - 2026-03-25 18:19:32 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-03-25 18:19:32 --> [MODEL_WHERE] App\Models\BudgetModel KEY="created_by"
DEBUG - 2026-03-25 18:19:32 --> [MODEL_WHERE] App\Models\BudgetModel KEY="account_type"
DEBUG - 2026-03-25 18:19:32 --> [MODEL_WHERE] App\Models\BudgetModel KEY="status"
DEBUG - 2026-03-25 18:19:32 --> [MODEL_WHERE] App\Models\BudgetModel KEY="year"
DEBUG - 2026-03-25 18:19:32 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-03-25 18:19:32 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":11758,"account_type":"Investment","status":1}
DEBUG - 2026-03-25 18:19:32 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-03-25 18:19:32 --> [MODEL_WHERE] App\Models\BudgetModel KEY="created_by"
DEBUG - 2026-03-25 18:19:32 --> [MODEL_WHERE] App\Models\BudgetModel KEY="account_type"
DEBUG - 2026-03-25 18:19:32 --> [MODEL_WHERE] App\Models\BudgetModel KEY="status"
DEBUG - 2026-03-25 18:19:32 --> [MODEL_WHERE] App\Models\BudgetModel KEY="designated_date >="
DEBUG - 2026-03-25 18:19:32 --> [MODEL_WHERE] App\Models\BudgetModel KEY="designated_date <="
DEBUG - 2026-03-25 18:19:32 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-03-25 18:19:32 --> [MODEL_WHERE] App\Models\BudgetModel KEY="created_by"
DEBUG - 2026-03-25 18:19:32 --> [MODEL_WHERE] App\Models\BudgetModel KEY="account_type"
DEBUG - 2026-03-25 18:19:32 --> [MODEL_WHERE] App\Models\BudgetModel KEY="status"
DEBUG - 2026-03-25 18:19:32 --> [MODEL_WHERE] App\Models\BudgetModel KEY="designated_date >="
DEBUG - 2026-03-25 18:19:32 --> [MODEL_WHERE] App\Models\BudgetModel KEY="designated_date <="
DEBUG - 2026-03-25 18:19:32 --> [MODEL_FIRST] App\Models\BudgetModel
INFO - 2026-03-25 18:19:32 --> DashboardController L72 - $checkingSummary: 0
DEBUG - 2026-03-25 18:19:32 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-25 18:19:32 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-25 18:19:32 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-25 18:19:32 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-25 18:19:32 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-25 18:19:32 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-25 18:19:32 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-25 18:19:32 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-25 18:19:32 --> [SERVICE] App\Services\BudgetService ::getUserBudget
DEBUG - 2026-03-25 18:19:32 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":11758,"deleted":0}
DEBUG - 2026-03-25 18:19:32 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-25 18:19:32 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"status":1,"created_by":11758,"deleted":0}
DEBUG - 2026-03-25 18:19:32 --> [MODEL_WHERE] App\Models\BudgetModel KEY="created_by"
DEBUG - 2026-03-25 18:19:32 --> [MODEL_WHERE] App\Models\BudgetModel KEY="account_type"
DEBUG - 2026-03-25 18:19:32 --> [MODEL_WHERE] App\Models\BudgetModel KEY="designated_date >="
DEBUG - 2026-03-25 18:19:32 --> [MODEL_WHERE] App\Models\BudgetModel KEY="designated_date <="
DEBUG - 2026-03-25 18:19:32 --> [MODEL_WHERE] App\Models\BudgetModel KEY="year"
DEBUG - 2026-03-25 18:19:32 --> [MODEL_WHERE] App\Models\BudgetModel KEY="month <="
DEBUG - 2026-03-25 18:19:32 --> [MODEL_WHERE] App\Models\BudgetModel KEY="day <="
DEBUG - 2026-03-25 18:19:32 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":11758,"account_type":"Income","month":"03","year":"2026"}
DEBUG - 2026-03-25 18:19:32 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-03-25 18:19:32 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":11758,"account_type":"Income","month":"02","year":"2026"}
DEBUG - 2026-03-25 18:19:32 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-03-25 18:19:32 --> [MODEL_WHERE] App\Models\BudgetModel KEY="created_by"
DEBUG - 2026-03-25 18:19:32 --> [MODEL_WHERE] App\Models\BudgetModel KEY="account_type"
DEBUG - 2026-03-25 18:19:32 --> [MODEL_WHERE] App\Models\BudgetModel KEY="designated_date >="
DEBUG - 2026-03-25 18:19:32 --> [MODEL_WHERE] App\Models\BudgetModel KEY="designated_date <="
DEBUG - 2026-03-25 18:19:32 --> [MODEL_WHERE] App\Models\BudgetModel KEY="year"
DEBUG - 2026-03-25 18:19:32 --> [MODEL_WHERE] App\Models\BudgetModel KEY="month <="
DEBUG - 2026-03-25 18:19:32 --> [MODEL_WHERE] App\Models\BudgetModel KEY="day <="
DEBUG - 2026-03-25 18:19:32 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":11758,"account_type":"Expense","month":"03","year":"2026"}
DEBUG - 2026-03-25 18:19:32 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-03-25 18:19:32 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":11758,"account_type":"Expense","month":"02","year":"2026"}
DEBUG - 2026-03-25 18:19:32 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-03-25 18:19:32 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"status":1,"created_by":11758,"deleted":0}
DEBUG - 2026-03-25 18:19:32 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"status":1,"paid":0,"created_by":11758,"deleted":0}
INFO - 2026-03-25 18:19:32 --> getSolanaData: invalid address param
INFO - 2026-03-25 18:19:32 --> themesMemory usage: 8388608
DEBUG - 2026-03-25 18:19:32 --> [REQ_ID=8ba563a87ce6] [FILTER_AFTER]
DEBUG - 2026-03-25 18:19:32 --> [REQ_ID=8ba563a87ce6] [LIFECYCLE][END] status=200 duration_ms=856.50 memory_delta=2097152
INFO - 2026-03-25 18:19:32 --> [REQ_ID=09e20121ad7d] [PERF] Execution time=0.759827
DEBUG - 2026-03-25 18:19:32 --> [REQ_ID=8ba563a87ce6] [REQUEST][END]
INFO - 2026-03-25 18:19:32 --> [REQ_ID=8ba563a87ce6] [PERF] Execution time=0.913955
DEBUG - 2026-03-25 18:19:32 --> [REQ_ID=19f782d9cd8c] [REQUEST][START] GET /index.php/API/Investments/getForecastHighlights
DEBUG - 2026-03-25 18:19:32 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-25 18:19:32 --> [REQ_ID=19f782d9cd8c] [FILTER_BEFORE] /index.php/API/Investments/getForecastHighlights
DEBUG - 2026-03-25 18:19:32 --> [REQ_ID=19f782d9cd8c] [ROUTE] Controller=\App\Modules\APIs\Controllers\InvestmentsAPIController Method=getForecastHighlights
DEBUG - 2026-03-25 18:19:32 --> [REQ_ID=19f782d9cd8c] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Investments/getForecastHighlights
DEBUG - 2026-03-25 18:19:32 --> [REQ_ID=5ac0a3a91032] [INIT] App\Modules\APIs\Controllers\InvestmentsAPIController::GET
INFO - 2026-03-25 18:19:32 --> [REQ_ID=5ac0a3a91032] [MEMORY][controller-start] 6291456
DEBUG - 2026-03-25 18:19:32 --> MyMIInvestments: no session user detected; skipping personalized hydration.
DEBUG - 2026-03-25 18:19:32 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-25 18:19:32 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-25 18:19:32 --> MyMIMarketing: Pscrape library not installed; Google search scraping will use fallback.
DEBUG - 2026-03-25 18:19:32 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-25 18:19:32 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-25 18:19:32 --> [REQ_ID=13b067421631] [REQUEST][START] GET /index.php/API/Investments/getForecastAccuracySummary?window=7d
DEBUG - 2026-03-25 18:19:32 --> [REQ_ID=f11878f7bc37] [REQUEST][START] GET /index.php/API/Investments/getConfidenceHeatmap?timeframe=5m&window=60
DEBUG - 2026-03-25 18:19:32 --> [REQ_ID=b4685888a8bf] [REQUEST][START] GET /index.php/API/Investments/getConfidenceHeatmap?timeframe=all&window=6h
DEBUG - 2026-03-25 18:19:32 --> [REQ_ID=fd2c8236e4d5] [REQUEST][START] GET /index.php/ops/health
DEBUG - 2026-03-25 18:19:32 --> [REQ_ID=19f782d9cd8c] [FILTER_AFTER]
DEBUG - 2026-03-25 18:19:32 --> [REQ_ID=19f782d9cd8c] [LIFECYCLE][END] status=200 duration_ms=316.06 memory_delta=0
INFO - 2026-03-25 18:19:32 --> [REQ_ID=5ac0a3a91032] [PERF] Execution time=0.316053
DEBUG - 2026-03-25 18:19:32 --> [REQ_ID=19f782d9cd8c] [REQUEST][END]
INFO - 2026-03-25 18:19:32 --> [REQ_ID=19f782d9cd8c] [PERF] Execution time=0.347468
DEBUG - 2026-03-25 18:19:32 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-25 18:19:32 --> [REQ_ID=13b067421631] [FILTER_BEFORE] /index.php/API/Investments/getForecastAccuracySummary?window=7d
DEBUG - 2026-03-25 18:19:32 --> [REQ_ID=13b067421631] [ROUTE] Controller=\App\Modules\APIs\Controllers\InvestmentsAPIController Method=getForecastAccuracySummary
DEBUG - 2026-03-25 18:19:32 --> [REQ_ID=13b067421631] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Investments/getForecastAccuracySummary?window=7d
DEBUG - 2026-03-25 18:19:32 --> [REQ_ID=3121026a00b9] [INIT] App\Modules\APIs\Controllers\InvestmentsAPIController::GET
INFO - 2026-03-25 18:19:32 --> [REQ_ID=3121026a00b9] [MEMORY][controller-start] 6291456
DEBUG - 2026-03-25 18:19:32 --> [REQ_ID=1b62caa6816d] [REQUEST][START] GET /index.php/API/Investments/getForecastHighlights
DEBUG - 2026-03-25 18:19:32 --> MyMIInvestments: no session user detected; skipping personalized hydration.
DEBUG - 2026-03-25 18:19:32 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-25 18:19:32 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-25 18:19:32 --> MyMIMarketing: Pscrape library not installed; Google search scraping will use fallback.
DEBUG - 2026-03-25 18:19:32 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-25 18:19:32 --> MyMIUser L52 - initialized (first log).
INFO - 2026-03-25 18:19:32 --> Premium entitlement guest: user_id= route=/index.php/API/Investments/getForecastAccuracySummary feature=investments.analytics tier=free status=free allowed=no reason=You must be logged in to use this feature.
WARNING - 2026-03-25 18:19:32 --> Premium access denied: feature=investments.analytics route=/index.php/API/Investments/getForecastAccuracySummary user_id= tier=free status=free
DEBUG - 2026-03-25 18:19:32 --> [REQ_ID=13b067421631] [FILTER_AFTER]
DEBUG - 2026-03-25 18:19:32 --> [REQ_ID=13b067421631] [LIFECYCLE][END] status=302 duration_ms=120.01 memory_delta=2097152
INFO - 2026-03-25 18:19:32 --> [REQ_ID=3121026a00b9] [PERF] Execution time=0.119137
DEBUG - 2026-03-25 18:19:32 --> [REQ_ID=13b067421631] [REQUEST][END]
INFO - 2026-03-25 18:19:32 --> [REQ_ID=13b067421631] [PERF] Execution time=0.301485
DEBUG - 2026-03-25 18:19:32 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-25 18:19:32 --> [REQ_ID=f11878f7bc37] [FILTER_BEFORE] /index.php/API/Investments/getConfidenceHeatmap?timeframe=5m&window=60
DEBUG - 2026-03-25 18:19:32 --> [REQ_ID=f11878f7bc37] [ROUTE] Controller=\App\Modules\APIs\Controllers\InvestmentsAPIController Method=getConfidenceHeatmap
DEBUG - 2026-03-25 18:19:32 --> [REQ_ID=f11878f7bc37] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Investments/getConfidenceHeatmap?timeframe=5m&window=60
DEBUG - 2026-03-25 18:19:32 --> [REQ_ID=2d54623211bc] [INIT] App\Modules\APIs\Controllers\InvestmentsAPIController::GET
INFO - 2026-03-25 18:19:32 --> [REQ_ID=2d54623211bc] [MEMORY][controller-start] 6291456
DEBUG - 2026-03-25 18:19:32 --> [REQ_ID=11312bc9f9b1] [REQUEST][START] GET /index.php/Memberships
DEBUG - 2026-03-25 18:19:32 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-25 18:19:33 --> [REQ_ID=11312bc9f9b1] [FILTER_BEFORE] /index.php/Memberships
DEBUG - 2026-03-25 18:19:33 --> [REQ_ID=11312bc9f9b1] [ROUTE] Controller=\App\Controllers\Home Method=memberships
DEBUG - 2026-03-25 18:19:33 --> [REQ_ID=11312bc9f9b1] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Memberships
DEBUG - 2026-03-25 18:19:33 --> [CSRF] token name=csrf_test_name hash=03f84ad44deaab0c86c6f5d7c4f0a216
DEBUG - 2026-03-25 18:19:33 --> [REQ_ID=e1f12e7442ba] [INIT] App\Controllers\Home::GET
INFO - 2026-03-25 18:19:33 --> [REQ_ID=e1f12e7442ba] [MEMORY][controller-start] 6291456
DEBUG - 2026-03-25 18:19:33 --> MyMIInvestments: no session user detected; skipping personalized hydration.
INFO - 2026-03-25 18:19:33 --> [REQ_ID=e1f12e7442ba] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-25 18:19:33 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-25 18:19:33 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-25 18:19:33 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-25 18:19:33 --> MyMIMarketing: Pscrape library not installed; Google search scraping will use fallback.
DEBUG - 2026-03-25 18:19:33 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-25 18:19:33 --> MyMIUser L52 - initialized (first log).
INFO - 2026-03-25 18:19:33 --> Premium entitlement guest: user_id= route=/index.php/API/Investments/getConfidenceHeatmap feature=investments.analytics tier=free status=free allowed=no reason=You must be logged in to use this feature.
WARNING - 2026-03-25 18:19:33 --> Premium access denied: feature=investments.analytics route=/index.php/API/Investments/getConfidenceHeatmap user_id= tier=free status=free
DEBUG - 2026-03-25 18:19:33 --> [REQ_ID=f11878f7bc37] [FILTER_AFTER]
DEBUG - 2026-03-25 18:19:33 --> [REQ_ID=f11878f7bc37] [LIFECYCLE][END] status=302 duration_ms=123.15 memory_delta=2097152
INFO - 2026-03-25 18:19:33 --> [REQ_ID=2d54623211bc] [PERF] Execution time=0.122168
DEBUG - 2026-03-25 18:19:33 --> [REQ_ID=f11878f7bc37] [REQUEST][END]
INFO - 2026-03-25 18:19:33 --> [REQ_ID=f11878f7bc37] [PERF] Execution time=0.404137
DEBUG - 2026-03-25 18:19:33 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-25 18:19:33 --> [REQ_ID=b4685888a8bf] [FILTER_BEFORE] /index.php/API/Investments/getConfidenceHeatmap?timeframe=all&window=6h
DEBUG - 2026-03-25 18:19:33 --> [REQ_ID=b4685888a8bf] [ROUTE] Controller=\App\Modules\APIs\Controllers\InvestmentsAPIController Method=getConfidenceHeatmap
DEBUG - 2026-03-25 18:19:33 --> [REQ_ID=b4685888a8bf] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Investments/getConfidenceHeatmap?timeframe=all&window=6h
DEBUG - 2026-03-25 18:19:33 --> [REQ_ID=549c5f1ac030] [INIT] App\Modules\APIs\Controllers\InvestmentsAPIController::GET
INFO - 2026-03-25 18:19:33 --> [REQ_ID=549c5f1ac030] [MEMORY][controller-start] 6291456
DEBUG - 2026-03-25 18:19:33 --> MyMIInvestments: no session user detected; skipping personalized hydration.
DEBUG - 2026-03-25 18:19:33 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-25 18:19:33 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-25 18:19:33 --> MyMIMarketing: Pscrape library not installed; Google search scraping will use fallback.
DEBUG - 2026-03-25 18:19:33 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-25 18:19:33 --> MyMIUser L52 - initialized (first log).
INFO - 2026-03-25 18:19:33 --> Premium entitlement guest: user_id= route=/index.php/API/Investments/getConfidenceHeatmap feature=investments.analytics tier=free status=free allowed=no reason=You must be logged in to use this feature.
WARNING - 2026-03-25 18:19:33 --> Premium access denied: feature=investments.analytics route=/index.php/API/Investments/getConfidenceHeatmap user_id= tier=free status=free
DEBUG - 2026-03-25 18:19:33 --> [REQ_ID=b4685888a8bf] [FILTER_AFTER]
DEBUG - 2026-03-25 18:19:33 --> [REQ_ID=b4685888a8bf] [LIFECYCLE][END] status=302 duration_ms=123.25 memory_delta=2097152
INFO - 2026-03-25 18:19:33 --> [REQ_ID=549c5f1ac030] [PERF] Execution time=0.122345
DEBUG - 2026-03-25 18:19:33 --> [REQ_ID=b4685888a8bf] [REQUEST][END]
INFO - 2026-03-25 18:19:33 --> [REQ_ID=b4685888a8bf] [PERF] Execution time=0.539251
DEBUG - 2026-03-25 18:19:33 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-25 18:19:33 --> [REQ_ID=fd2c8236e4d5] [FILTER_BEFORE] /index.php/ops/health
DEBUG - 2026-03-25 18:19:33 --> [REQ_ID=fd2c8236e4d5] [ROUTE] Controller=\App\Controllers\OpsHealthController Method=index
DEBUG - 2026-03-25 18:19:33 --> [REQ_ID=fd2c8236e4d5] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/ops/health
DEBUG - 2026-03-25 18:19:33 --> [CSRF] token name=csrf_test_name hash=03f84ad44deaab0c86c6f5d7c4f0a216
DEBUG - 2026-03-25 18:19:33 --> [REQ_ID=fd2c8236e4d5] [REQUEST][END]
INFO - 2026-03-25 18:19:33 --> [REQ_ID=fd2c8236e4d5] [PERF] Execution time=0.585905
DEBUG - 2026-03-25 18:19:33 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-25 18:19:33 --> [REQ_ID=1b62caa6816d] [FILTER_BEFORE] /index.php/API/Investments/getForecastHighlights
DEBUG - 2026-03-25 18:19:33 --> [REQ_ID=1b62caa6816d] [ROUTE] Controller=\App\Modules\APIs\Controllers\InvestmentsAPIController Method=getForecastHighlights
DEBUG - 2026-03-25 18:19:33 --> [REQ_ID=1b62caa6816d] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Investments/getForecastHighlights
DEBUG - 2026-03-25 18:19:33 --> [REQ_ID=7340085e911d] [INIT] App\Modules\APIs\Controllers\InvestmentsAPIController::GET
INFO - 2026-03-25 18:19:33 --> [REQ_ID=7340085e911d] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-25 18:19:33 --> MyMIInvestments: no session user detected; skipping personalized hydration.
DEBUG - 2026-03-25 18:19:33 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-25 18:19:33 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-25 18:19:33 --> MyMIMarketing: Pscrape library not installed; Google search scraping will use fallback.
DEBUG - 2026-03-25 18:19:33 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-25 18:19:33 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-25 18:19:33 --> [REQ_ID=1b62caa6816d] [FILTER_AFTER]
DEBUG - 2026-03-25 18:19:33 --> [REQ_ID=1b62caa6816d] [LIFECYCLE][END] status=200 duration_ms=14.29 memory_delta=0
INFO - 2026-03-25 18:19:33 --> [REQ_ID=7340085e911d] [PERF] Execution time=0.014200
DEBUG - 2026-03-25 18:19:33 --> [REQ_ID=1b62caa6816d] [REQUEST][END]
INFO - 2026-03-25 18:19:33 --> [REQ_ID=1b62caa6816d] [PERF] Execution time=0.506724
DEBUG - 2026-03-25 18:19:33 --> [MetaService] slug=memberships pageName= cacheHit=1 path=CACHE
DEBUG - 2026-03-25 18:19:33 --> [REQ_ID=e1f12e7442ba] [VIEW_RENDER] themes/public/memberships
INFO - 2026-03-25 18:19:33 --> [REQ_ID=e1f12e7442ba] [MEMORY][commonData:start] 8388608
INFO - 2026-03-25 18:19:33 --> themesMemory usage: 8388608
DEBUG - 2026-03-25 18:19:33 --> [MetaService] slug=memberships pageName=Memberships cacheHit=1 path=CACHE
DEBUG - 2026-03-25 18:19:33 --> [REQ_ID=11312bc9f9b1] [FILTER_AFTER]
DEBUG - 2026-03-25 18:19:33 --> [REQ_ID=11312bc9f9b1] [LIFECYCLE][END] status=200 duration_ms=549.17 memory_delta=2097152
INFO - 2026-03-25 18:19:33 --> [REQ_ID=e1f12e7442ba] [PERF] Execution time=0.546850
DEBUG - 2026-03-25 18:19:33 --> [REQ_ID=11312bc9f9b1] [REQUEST][END]
INFO - 2026-03-25 18:19:33 --> [REQ_ID=11312bc9f9b1] [PERF] Execution time=0.563101
DEBUG - 2026-03-25 18:19:33 --> [REQ_ID=490891eb0f94] [REQUEST][START] GET /index.php/Memberships
DEBUG - 2026-03-25 18:19:33 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-25 18:19:33 --> [REQ_ID=490891eb0f94] [FILTER_BEFORE] /index.php/Memberships
DEBUG - 2026-03-25 18:19:33 --> [REQ_ID=490891eb0f94] [ROUTE] Controller=\App\Controllers\Home Method=memberships
DEBUG - 2026-03-25 18:19:33 --> [REQ_ID=490891eb0f94] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Memberships
DEBUG - 2026-03-25 18:19:33 --> [CSRF] token name=csrf_test_name hash=03f84ad44deaab0c86c6f5d7c4f0a216
DEBUG - 2026-03-25 18:19:33 --> [REQ_ID=290526d20287] [INIT] App\Controllers\Home::GET
INFO - 2026-03-25 18:19:33 --> [REQ_ID=290526d20287] [MEMORY][controller-start] 6291456
INFO - 2026-03-25 18:19:33 --> [REQ_ID=290526d20287] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-25 18:19:33 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-25 18:19:34 --> [MetaService] slug=memberships pageName= cacheHit=1 path=CACHE
DEBUG - 2026-03-25 18:19:34 --> [REQ_ID=290526d20287] [VIEW_RENDER] themes/public/memberships
INFO - 2026-03-25 18:19:34 --> [REQ_ID=290526d20287] [MEMORY][commonData:start] 8388608
INFO - 2026-03-25 18:19:34 --> themesMemory usage: 8388608
DEBUG - 2026-03-25 18:19:34 --> [MetaService] slug=memberships pageName=Memberships cacheHit=1 path=CACHE
DEBUG - 2026-03-25 18:19:34 --> [REQ_ID=490891eb0f94] [FILTER_AFTER]
DEBUG - 2026-03-25 18:19:34 --> [REQ_ID=490891eb0f94] [LIFECYCLE][END] status=200 duration_ms=527.62 memory_delta=2097152
INFO - 2026-03-25 18:19:34 --> [REQ_ID=290526d20287] [PERF] Execution time=0.527507
DEBUG - 2026-03-25 18:19:34 --> [REQ_ID=490891eb0f94] [REQUEST][END]
INFO - 2026-03-25 18:19:34 --> [REQ_ID=490891eb0f94] [PERF] Execution time=0.537456
DEBUG - 2026-03-25 18:19:34 --> [REQ_ID=fee60c46c597] [REQUEST][START] GET /index.php/Memberships
DEBUG - 2026-03-25 18:19:34 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-25 18:19:34 --> [REQ_ID=fee60c46c597] [FILTER_BEFORE] /index.php/Memberships
DEBUG - 2026-03-25 18:19:34 --> [REQ_ID=fee60c46c597] [ROUTE] Controller=\App\Controllers\Home Method=memberships
DEBUG - 2026-03-25 18:19:34 --> [REQ_ID=fee60c46c597] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Memberships
DEBUG - 2026-03-25 18:19:34 --> [CSRF] token name=csrf_test_name hash=03f84ad44deaab0c86c6f5d7c4f0a216
DEBUG - 2026-03-25 18:19:34 --> [REQ_ID=c01a1fd731f9] [INIT] App\Controllers\Home::GET
INFO - 2026-03-25 18:19:34 --> [REQ_ID=c01a1fd731f9] [MEMORY][controller-start] 6291456
INFO - 2026-03-25 18:19:34 --> [REQ_ID=c01a1fd731f9] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-25 18:19:34 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-25 18:19:34 --> [MetaService] slug=memberships pageName= cacheHit=1 path=CACHE
DEBUG - 2026-03-25 18:19:34 --> [REQ_ID=c01a1fd731f9] [VIEW_RENDER] themes/public/memberships
INFO - 2026-03-25 18:19:34 --> [REQ_ID=c01a1fd731f9] [MEMORY][commonData:start] 8388608
INFO - 2026-03-25 18:19:34 --> themesMemory usage: 8388608
DEBUG - 2026-03-25 18:19:34 --> [MetaService] slug=memberships pageName=Memberships cacheHit=1 path=CACHE
DEBUG - 2026-03-25 18:19:34 --> [REQ_ID=fee60c46c597] [FILTER_AFTER]
DEBUG - 2026-03-25 18:19:34 --> [REQ_ID=fee60c46c597] [LIFECYCLE][END] status=200 duration_ms=517.11 memory_delta=2097152
INFO - 2026-03-25 18:19:34 --> [REQ_ID=c01a1fd731f9] [PERF] Execution time=0.517002
DEBUG - 2026-03-25 18:19:34 --> [REQ_ID=fee60c46c597] [REQUEST][END]
INFO - 2026-03-25 18:19:34 --> [REQ_ID=fee60c46c597] [PERF] Execution time=0.527082
DEBUG - 2026-03-25 18:21:14 --> [REQ_ID=1425f2ec9205] [REQUEST][START] GET /
DEBUG - 2026-03-25 18:21:14 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-25 18:21:14 --> [REQ_ID=1425f2ec9205] [REQUEST][END]
INFO - 2026-03-25 18:21:14 --> [REQ_ID=1425f2ec9205] [PERF] Execution time=0.040566
DEBUG - 2026-03-25 18:21:22 --> [REQ_ID=31a3a347e926] [REQUEST][START] HEAD /
DEBUG - 2026-03-25 18:21:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-25 18:21:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-25 18:21:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-25 18:21:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-25 18:21:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-25 18:26:22 --> [REQ_ID=4000b77c8bec] [REQUEST][START] HEAD /
DEBUG - 2026-03-25 18:26:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-25 18:26:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-25 18:26:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-25 18:26:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-25 18:26:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-25 18:31:22 --> [REQ_ID=f9a0bbea9d2c] [REQUEST][START] HEAD /
DEBUG - 2026-03-25 18:31:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-25 18:31:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-25 18:31:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-25 18:31:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-25 18:31:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-25 18:34:57 --> [REQ_ID=841c634f9b7a] [REQUEST][START] GET /
DEBUG - 2026-03-25 18:34:57 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-25 18:34:57 --> [REQ_ID=841c634f9b7a] [REQUEST][END]
INFO - 2026-03-25 18:34:57 --> [REQ_ID=841c634f9b7a] [PERF] Execution time=0.040324
DEBUG - 2026-03-25 18:36:22 --> [REQ_ID=e59223005392] [REQUEST][START] HEAD /
DEBUG - 2026-03-25 18:36:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-25 18:36:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-25 18:36:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-25 18:36:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-25 18:36:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-25 18:36:54 --> [REQ_ID=0dccee530b60] [REQUEST][START] GET /index.php
DEBUG - 2026-03-25 18:36:54 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-25 18:36:54 --> [REQ_ID=0dccee530b60] [REQUEST][END]
INFO - 2026-03-25 18:36:54 --> [REQ_ID=0dccee530b60] [PERF] Execution time=0.017945
DEBUG - 2026-03-25 18:41:22 --> [REQ_ID=74989ead371a] [REQUEST][START] HEAD /
DEBUG - 2026-03-25 18:41:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-25 18:41:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-25 18:41:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-25 18:41:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-25 18:41:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-25 18:46:22 --> [REQ_ID=8c1d7727d829] [REQUEST][START] HEAD /
DEBUG - 2026-03-25 18:46:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-25 18:46:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-25 18:46:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-25 18:46:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-25 18:46:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-25 18:51:22 --> [REQ_ID=cb5970496be0] [REQUEST][START] HEAD /
DEBUG - 2026-03-25 18:51:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-25 18:51:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-25 18:51:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-25 18:51:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-25 18:51:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-25 18:52:01 --> [REQ_ID=ca45e499277f] [REQUEST][START] GET /index.php/Wallets/Purchase/Memberships
DEBUG - 2026-03-25 18:52:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-25 18:52:01 --> [REQ_ID=ca45e499277f] [REQUEST][END]
INFO - 2026-03-25 18:52:01 --> [REQ_ID=ca45e499277f] [PERF] Execution time=0.028984
DEBUG - 2026-03-25 18:56:22 --> [REQ_ID=44e60172db9a] [REQUEST][START] HEAD /
DEBUG - 2026-03-25 18:56:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-25 18:56:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-25 18:56:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-25 18:56:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-25 18:56:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-25 18:57:02 --> [REQ_ID=89d727d306ba] [REQUEST][START] GET /
DEBUG - 2026-03-25 18:57:02 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-25 18:57:02 --> [REQ_ID=89d727d306ba] [FILTER_BEFORE] /
DEBUG - 2026-03-25 18:57:02 --> [REQ_ID=89d727d306ba] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-25 18:57:02 --> [REQ_ID=89d727d306ba] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-25 18:57:02 --> [CSRF] token name=csrf_test_name hash=6207f8a99c3eb090bc37d932a7a92de0
DEBUG - 2026-03-25 18:57:02 --> [REQ_ID=d138678d4eff] [INIT] App\Controllers\Home::GET
INFO - 2026-03-25 18:57:02 --> [REQ_ID=d138678d4eff] [MEMORY][controller-start] 4194304
INFO - 2026-03-25 18:57:02 --> [REQ_ID=d138678d4eff] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-25 18:57:02 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-25 18:57:03 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-03-25 18:57:03 --> [REQ_ID=d138678d4eff] [VIEW_RENDER] themes/public/home
INFO - 2026-03-25 18:57:03 --> [REQ_ID=d138678d4eff] [MEMORY][commonData:start] 8388608
INFO - 2026-03-25 18:57:03 --> themesMemory usage: 8388608
DEBUG - 2026-03-25 18:57:03 --> [MetaService] slug= pageName=Home cacheHit= path=DB
DEBUG - 2026-03-25 18:57:03 --> [REQ_ID=89d727d306ba] [FILTER_AFTER]
DEBUG - 2026-03-25 18:57:03 --> [REQ_ID=89d727d306ba] [LIFECYCLE][END] status=200 duration_ms=619.18 memory_delta=4194304
INFO - 2026-03-25 18:57:03 --> [REQ_ID=d138678d4eff] [PERF] Execution time=0.617141
DEBUG - 2026-03-25 18:57:03 --> [REQ_ID=89d727d306ba] [REQUEST][END]
INFO - 2026-03-25 18:57:03 --> [REQ_ID=89d727d306ba] [PERF] Execution time=0.638790
DEBUG - 2026-03-25 19:00:02 --> [REQ_ID=0989eee33cb6] [REQUEST][START] GET /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-25 19:00:02 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-25 19:00:02 --> [REQ_ID=0989eee33cb6] [FILTER_BEFORE] /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-25 19:00:02 --> [REQ_ID=0989eee33cb6] [ROUTE] Controller=\App\Modules\Management\Controllers\ManagementAPIController Method=Run_CRON_Tasks
DEBUG - 2026-03-25 19:00:02 --> [REQ_ID=0989eee33cb6] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-25 19:00:02 --> [REQ_ID=0989eee33cb6] [REQUEST][END]
INFO - 2026-03-25 19:00:02 --> [REQ_ID=0989eee33cb6] [PERF] Execution time=0.036093
DEBUG - 2026-03-25 19:01:22 --> [REQ_ID=fd2bf9ec691c] [REQUEST][START] HEAD /
DEBUG - 2026-03-25 19:01:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-25 19:01:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-25 19:01:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-25 19:01:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-25 19:01:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-25 19:06:22 --> [REQ_ID=8bc3f206af73] [REQUEST][START] HEAD /
DEBUG - 2026-03-25 19:06:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-25 19:06:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-25 19:06:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-25 19:06:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-25 19:06:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-25 19:11:22 --> [REQ_ID=3f8de45f0e60] [REQUEST][START] HEAD /
DEBUG - 2026-03-25 19:11:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-25 19:11:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-25 19:11:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-25 19:11:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-25 19:11:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-25 19:15:02 --> [REQ_ID=43c1fcfe505f] [REQUEST][START] GET /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-25 19:15:02 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-25 19:15:02 --> [REQ_ID=43c1fcfe505f] [FILTER_BEFORE] /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-25 19:15:02 --> [REQ_ID=43c1fcfe505f] [ROUTE] Controller=\App\Modules\APIs\Controllers\AlertsAPIController Method=fetchEmailAlerts
DEBUG - 2026-03-25 19:15:02 --> [REQ_ID=43c1fcfe505f] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-25 19:15:02 --> [REQ_ID=43c1fcfe505f] [REQUEST][END]
INFO - 2026-03-25 19:15:02 --> [REQ_ID=43c1fcfe505f] [PERF] Execution time=0.046504
DEBUG - 2026-03-25 19:16:22 --> [REQ_ID=d9100b1d4da2] [REQUEST][START] HEAD /
DEBUG - 2026-03-25 19:16:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-25 19:16:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-25 19:16:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-25 19:16:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-25 19:16:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-25 19:20:29 --> [REQ_ID=38a3ce602f25] [REQUEST][START] GET /index.php/How-It-Works/Setting-Financial-Goals
DEBUG - 2026-03-25 19:20:29 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-25 19:20:29 --> [REQ_ID=38a3ce602f25] [FILTER_BEFORE] /index.php/How-It-Works/Setting-Financial-Goals
DEBUG - 2026-03-25 19:20:29 --> [REQ_ID=38a3ce602f25] [ROUTE] Controller=\App\Modules\Blog\Controllers\HowItWorksController Method=SettingFinancialGoals
DEBUG - 2026-03-25 19:20:29 --> [REQ_ID=38a3ce602f25] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/How-It-Works/Setting-Financial-Goals
DEBUG - 2026-03-25 19:20:29 --> [CSRF] token name=csrf_test_name hash=070e950c191f3f555cae48304d0eb6e6
DEBUG - 2026-03-25 19:20:29 --> [REQ_ID=99b57f20a523] [INIT] App\Modules\Blog\Controllers\HowItWorksController::GET
INFO - 2026-03-25 19:20:29 --> [REQ_ID=99b57f20a523] [MEMORY][controller-start] 6291456
DEBUG - 2026-03-25 19:20:30 --> [REQ_ID=99b57f20a523] [METHOD_ENTRY] SettingFinancialGoals
DEBUG - 2026-03-25 19:20:30 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-25 19:20:30 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-25 19:20:30 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-25 19:20:30 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-25 19:20:30 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-25 19:20:30 --> MyMICoin: guest context detected; skipping user-specific preload.
INFO - 2026-03-25 19:20:30 --> [REQ_ID=99b57f20a523] [MEMORY][commonData:start] 6291456
INFO - 2026-03-25 19:20:30 --> themesMemory usage: 10485760
DEBUG - 2026-03-25 19:20:30 --> [MetaService] slug=how-it-works/setting-financial-goals pageName= cacheHit= path=DB
DEBUG - 2026-03-25 19:20:30 --> [REQ_ID=38a3ce602f25] [FILTER_AFTER]
DEBUG - 2026-03-25 19:20:30 --> [REQ_ID=38a3ce602f25] [LIFECYCLE][END] status=200 duration_ms=790.76 memory_delta=4194304
INFO - 2026-03-25 19:20:30 --> [REQ_ID=99b57f20a523] [PERF] Execution time=0.788850
DEBUG - 2026-03-25 19:20:30 --> [REQ_ID=38a3ce602f25] [REQUEST][END]
INFO - 2026-03-25 19:20:30 --> [REQ_ID=38a3ce602f25] [PERF] Execution time=0.832689
DEBUG - 2026-03-25 19:21:22 --> [REQ_ID=d09a300265cb] [REQUEST][START] HEAD /
DEBUG - 2026-03-25 19:21:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-25 19:21:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-25 19:21:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-25 19:21:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-25 19:21:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-25 19:26:01 --> [REQ_ID=3a9c5d9e9588] [REQUEST][START] GET /
DEBUG - 2026-03-25 19:26:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-25 19:26:01 --> [REQ_ID=3a9c5d9e9588] [FILTER_BEFORE] /
DEBUG - 2026-03-25 19:26:01 --> [REQ_ID=3a9c5d9e9588] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-25 19:26:01 --> [REQ_ID=3a9c5d9e9588] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-25 19:26:01 --> [CSRF] token name=csrf_test_name hash=838e1dcee7c55ee69e095a0905aa4496
DEBUG - 2026-03-25 19:26:01 --> [REQ_ID=715d6d485797] [INIT] App\Controllers\Home::GET
INFO - 2026-03-25 19:26:01 --> [REQ_ID=715d6d485797] [MEMORY][controller-start] 6291456
INFO - 2026-03-25 19:26:01 --> [REQ_ID=715d6d485797] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-25 19:26:01 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-25 19:26:01 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-03-25 19:26:01 --> [REQ_ID=715d6d485797] [VIEW_RENDER] themes/public/home
INFO - 2026-03-25 19:26:01 --> [REQ_ID=715d6d485797] [MEMORY][commonData:start] 10485760
INFO - 2026-03-25 19:26:01 --> themesMemory usage: 10485760
DEBUG - 2026-03-25 19:26:01 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-25 19:26:01 --> [REQ_ID=3a9c5d9e9588] [FILTER_AFTER]
DEBUG - 2026-03-25 19:26:01 --> [REQ_ID=3a9c5d9e9588] [LIFECYCLE][END] status=200 duration_ms=722.41 memory_delta=4194304
INFO - 2026-03-25 19:26:01 --> [REQ_ID=715d6d485797] [PERF] Execution time=0.720292
DEBUG - 2026-03-25 19:26:01 --> [REQ_ID=3a9c5d9e9588] [REQUEST][END]
INFO - 2026-03-25 19:26:01 --> [REQ_ID=3a9c5d9e9588] [PERF] Execution time=0.761415
DEBUG - 2026-03-25 19:26:22 --> [REQ_ID=342f2b05ad52] [REQUEST][START] HEAD /
DEBUG - 2026-03-25 19:26:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-25 19:26:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-25 19:26:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-25 19:26:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-25 19:26:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-25 19:31:22 --> [REQ_ID=c648e4eafd22] [REQUEST][START] HEAD /
DEBUG - 2026-03-25 19:31:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-25 19:31:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-25 19:31:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-25 19:31:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-25 19:31:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-25 19:36:22 --> [REQ_ID=9acc13d441f3] [REQUEST][START] HEAD /
DEBUG - 2026-03-25 19:36:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-25 19:36:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-25 19:36:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-25 19:36:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-25 19:36:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-25 19:41:00 --> [REQ_ID=ca41959375d6] [REQUEST][START] GET /index.php/How-It-Works/MyMI-Gold
DEBUG - 2026-03-25 19:41:00 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-25 19:41:00 --> [REQ_ID=ca41959375d6] [FILTER_BEFORE] /index.php/How-It-Works/MyMI-Gold
DEBUG - 2026-03-25 19:41:00 --> [REQ_ID=ca41959375d6] [ROUTE] Controller=\App\Modules\Blog\Controllers\HowItWorksController Method=MyMIGold
DEBUG - 2026-03-25 19:41:00 --> [REQ_ID=ca41959375d6] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/How-It-Works/MyMI-Gold
DEBUG - 2026-03-25 19:41:00 --> [CSRF] token name=csrf_test_name hash=0d77624d1e056254da76195675f80d74
DEBUG - 2026-03-25 19:41:00 --> [REQ_ID=63d3dec3c53c] [INIT] App\Modules\Blog\Controllers\HowItWorksController::GET
INFO - 2026-03-25 19:41:00 --> [REQ_ID=63d3dec3c53c] [MEMORY][controller-start] 6291456
DEBUG - 2026-03-25 19:41:00 --> [REQ_ID=63d3dec3c53c] [METHOD_ENTRY] MyMIGold
DEBUG - 2026-03-25 19:41:00 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-25 19:41:00 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-25 19:41:00 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-25 19:41:00 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-25 19:41:00 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-25 19:41:00 --> MyMICoin: guest context detected; skipping user-specific preload.
INFO - 2026-03-25 19:41:00 --> [REQ_ID=63d3dec3c53c] [MEMORY][commonData:start] 6291456
INFO - 2026-03-25 19:41:01 --> themesMemory usage: 10485760
DEBUG - 2026-03-25 19:41:01 --> [MetaService] slug=how-it-works/mymi-gold pageName= cacheHit= path=DB
DEBUG - 2026-03-25 19:41:01 --> [REQ_ID=ca41959375d6] [FILTER_AFTER]
DEBUG - 2026-03-25 19:41:01 --> [REQ_ID=ca41959375d6] [LIFECYCLE][END] status=200 duration_ms=759.24 memory_delta=4194304
INFO - 2026-03-25 19:41:01 --> [REQ_ID=63d3dec3c53c] [PERF] Execution time=0.757253
DEBUG - 2026-03-25 19:41:01 --> [REQ_ID=ca41959375d6] [REQUEST][END]
INFO - 2026-03-25 19:41:01 --> [REQ_ID=ca41959375d6] [PERF] Execution time=0.801230
DEBUG - 2026-03-25 19:41:22 --> [REQ_ID=2a4be36dd88d] [REQUEST][START] HEAD /
DEBUG - 2026-03-25 19:41:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-25 19:41:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-25 19:41:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-25 19:41:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-25 19:41:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-25 19:41:45 --> [REQ_ID=e9d23692a776] [REQUEST][START] GET /index.php/Wallets/Purchase/Memberships/Customize
DEBUG - 2026-03-25 19:41:45 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-25 19:41:45 --> [REQ_ID=e9d23692a776] [REQUEST][END]
INFO - 2026-03-25 19:41:45 --> [REQ_ID=e9d23692a776] [PERF] Execution time=0.015404
DEBUG - 2026-03-25 19:45:16 --> [REQ_ID=5c3b9ad76a52] [REQUEST][START] GET /index.php/How-It-Works/MyMI-Exchange
DEBUG - 2026-03-25 19:45:16 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-25 19:45:16 --> [REQ_ID=5c3b9ad76a52] [REQUEST][END]
INFO - 2026-03-25 19:45:16 --> [REQ_ID=5c3b9ad76a52] [PERF] Execution time=0.042354
DEBUG - 2026-03-25 19:46:22 --> [REQ_ID=9c5fd8942a71] [REQUEST][START] HEAD /
DEBUG - 2026-03-25 19:46:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-25 19:46:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-25 19:46:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-25 19:46:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-25 19:46:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-25 19:51:22 --> [REQ_ID=eb6ea871bd01] [REQUEST][START] HEAD /
DEBUG - 2026-03-25 19:51:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-25 19:51:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-25 19:51:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-25 19:51:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-25 19:51:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-25 19:56:22 --> [REQ_ID=6d7cd1b3bfb8] [REQUEST][START] HEAD /
DEBUG - 2026-03-25 19:56:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-25 19:56:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-25 19:56:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-25 19:56:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-25 19:56:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-25 20:00:01 --> [REQ_ID=9a8f75bdb6f2] [REQUEST][START] GET /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-25 20:00:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-25 20:00:01 --> [REQ_ID=9a8f75bdb6f2] [FILTER_BEFORE] /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-25 20:00:01 --> [REQ_ID=9a8f75bdb6f2] [ROUTE] Controller=\App\Modules\Management\Controllers\ManagementAPIController Method=Run_CRON_Tasks
DEBUG - 2026-03-25 20:00:01 --> [REQ_ID=9a8f75bdb6f2] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-25 20:00:01 --> [REQ_ID=9a8f75bdb6f2] [REQUEST][END]
INFO - 2026-03-25 20:00:01 --> [REQ_ID=9a8f75bdb6f2] [PERF] Execution time=0.048568
DEBUG - 2026-03-25 20:01:02 --> [REQ_ID=c2386c338005] [REQUEST][START] GET /index.php/How-It-Works/MyMI-Exchange
DEBUG - 2026-03-25 20:01:02 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-25 20:01:02 --> [REQ_ID=c2386c338005] [FILTER_BEFORE] /index.php/How-It-Works/MyMI-Exchange
DEBUG - 2026-03-25 20:01:02 --> [REQ_ID=c2386c338005] [ROUTE] Controller=\App\Modules\Blog\Controllers\HowItWorksController Method=show
DEBUG - 2026-03-25 20:01:02 --> [REQ_ID=c2386c338005] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/How-It-Works/MyMI-Exchange
DEBUG - 2026-03-25 20:01:02 --> [CSRF] token name=csrf_test_name hash=f378fcaa2902a63f287475e2e76aa731
DEBUG - 2026-03-25 20:01:02 --> [REQ_ID=4905fa1d497f] [INIT] App\Modules\Blog\Controllers\HowItWorksController::GET
INFO - 2026-03-25 20:01:02 --> [REQ_ID=4905fa1d497f] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-25 20:01:02 --> [REQ_ID=4905fa1d497f] [METHOD_ENTRY] show
DEBUG - 2026-03-25 20:01:02 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-25 20:01:02 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-25 20:01:02 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-25 20:01:02 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-25 20:01:02 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-25 20:01:02 --> MyMICoin: guest context detected; skipping user-specific preload.
INFO - 2026-03-25 20:01:02 --> [REQ_ID=4905fa1d497f] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-25 20:01:03 --> [REQ_ID=c2386c338005] [FILTER_AFTER]
DEBUG - 2026-03-25 20:01:03 --> [REQ_ID=c2386c338005] [LIFECYCLE][END] status=200 duration_ms=970.76 memory_delta=4194304
INFO - 2026-03-25 20:01:03 --> [REQ_ID=4905fa1d497f] [PERF] Execution time=0.969688
DEBUG - 2026-03-25 20:01:03 --> [REQ_ID=c2386c338005] [REQUEST][END]
INFO - 2026-03-25 20:01:03 --> [REQ_ID=c2386c338005] [PERF] Execution time=0.988492
DEBUG - 2026-03-25 20:01:16 --> [REQ_ID=1b2a98c70714] [REQUEST][START] GET /
DEBUG - 2026-03-25 20:01:16 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-25 20:01:16 --> [REQ_ID=1b2a98c70714] [FILTER_BEFORE] /
DEBUG - 2026-03-25 20:01:16 --> [REQ_ID=1b2a98c70714] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-25 20:01:16 --> [REQ_ID=1b2a98c70714] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-25 20:01:16 --> [CSRF] token name=csrf_test_name hash=c7e8ad8704379ec0491c95e397774456
DEBUG - 2026-03-25 20:01:16 --> [REQ_ID=9b94a2b3066e] [INIT] App\Controllers\Home::GET
INFO - 2026-03-25 20:01:16 --> [REQ_ID=9b94a2b3066e] [MEMORY][controller-start] 4194304
INFO - 2026-03-25 20:01:17 --> [REQ_ID=9b94a2b3066e] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-25 20:01:17 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-25 20:01:17 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-03-25 20:01:17 --> [REQ_ID=9b94a2b3066e] [VIEW_RENDER] themes/public/home
INFO - 2026-03-25 20:01:17 --> [REQ_ID=9b94a2b3066e] [MEMORY][commonData:start] 8388608
INFO - 2026-03-25 20:01:17 --> themesMemory usage: 8388608
DEBUG - 2026-03-25 20:01:17 --> [MetaService] slug= pageName=Home cacheHit= path=DB
DEBUG - 2026-03-25 20:01:17 --> [REQ_ID=1b2a98c70714] [FILTER_AFTER]
DEBUG - 2026-03-25 20:01:17 --> [REQ_ID=1b2a98c70714] [LIFECYCLE][END] status=200 duration_ms=628.57 memory_delta=4194304
INFO - 2026-03-25 20:01:17 --> [REQ_ID=9b94a2b3066e] [PERF] Execution time=0.628506
DEBUG - 2026-03-25 20:01:17 --> [REQ_ID=1b2a98c70714] [REQUEST][END]
INFO - 2026-03-25 20:01:17 --> [REQ_ID=1b2a98c70714] [PERF] Execution time=0.639381
DEBUG - 2026-03-25 20:01:18 --> [REQ_ID=8f4df3a335a8] [REQUEST][START] GET /index.php/How-It-Works/Investment-Portfolio-Management
DEBUG - 2026-03-25 20:01:18 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-25 20:01:18 --> [REQ_ID=8f4df3a335a8] [FILTER_BEFORE] /index.php/How-It-Works/Investment-Portfolio-Management
DEBUG - 2026-03-25 20:01:18 --> [REQ_ID=8f4df3a335a8] [ROUTE] Controller=\App\Modules\Blog\Controllers\HowItWorksController Method=InvestmentPortfolioManagement
DEBUG - 2026-03-25 20:01:18 --> [REQ_ID=8f4df3a335a8] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/How-It-Works/Investment-Portfolio-Management
DEBUG - 2026-03-25 20:01:18 --> [CSRF] token name=csrf_test_name hash=8dfa1a6f25251cc1081e3192e2c0900c
DEBUG - 2026-03-25 20:01:18 --> [REQ_ID=03cd0dcda462] [INIT] App\Modules\Blog\Controllers\HowItWorksController::GET
INFO - 2026-03-25 20:01:18 --> [REQ_ID=03cd0dcda462] [MEMORY][controller-start] 6291456
DEBUG - 2026-03-25 20:01:18 --> [REQ_ID=03cd0dcda462] [METHOD_ENTRY] InvestmentPortfolioManagement
DEBUG - 2026-03-25 20:01:18 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-25 20:01:18 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-25 20:01:18 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-25 20:01:18 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-25 20:01:18 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-25 20:01:18 --> MyMICoin: guest context detected; skipping user-specific preload.
INFO - 2026-03-25 20:01:18 --> [REQ_ID=03cd0dcda462] [MEMORY][commonData:start] 6291456
INFO - 2026-03-25 20:01:18 --> themesMemory usage: 8388608
DEBUG - 2026-03-25 20:01:18 --> [MetaService] slug=how-it-works/investment-portfolio-management pageName= cacheHit= path=DB
DEBUG - 2026-03-25 20:01:18 --> [REQ_ID=8f4df3a335a8] [FILTER_AFTER]
DEBUG - 2026-03-25 20:01:18 --> [REQ_ID=8f4df3a335a8] [LIFECYCLE][END] status=200 duration_ms=534.57 memory_delta=2097152
INFO - 2026-03-25 20:01:18 --> [REQ_ID=03cd0dcda462] [PERF] Execution time=0.534446
DEBUG - 2026-03-25 20:01:18 --> [REQ_ID=8f4df3a335a8] [REQUEST][END]
INFO - 2026-03-25 20:01:18 --> [REQ_ID=8f4df3a335a8] [PERF] Execution time=0.544966
DEBUG - 2026-03-25 20:01:18 --> [REQ_ID=7b224fbcac88] [REQUEST][START] GET /index.php/How-It-Works/Automated-Financial-Insights
DEBUG - 2026-03-25 20:01:18 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-25 20:01:18 --> [REQ_ID=7b224fbcac88] [FILTER_BEFORE] /index.php/How-It-Works/Automated-Financial-Insights
DEBUG - 2026-03-25 20:01:18 --> [REQ_ID=7b224fbcac88] [ROUTE] Controller=\App\Modules\Blog\Controllers\HowItWorksController Method=show
DEBUG - 2026-03-25 20:01:18 --> [REQ_ID=7b224fbcac88] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/How-It-Works/Automated-Financial-Insights
DEBUG - 2026-03-25 20:01:18 --> [CSRF] token name=csrf_test_name hash=41c6a46a3143c2ba0b70f5e1fd3bc2fc
DEBUG - 2026-03-25 20:01:18 --> [REQ_ID=f8f06d0aea2d] [INIT] App\Modules\Blog\Controllers\HowItWorksController::GET
INFO - 2026-03-25 20:01:18 --> [REQ_ID=f8f06d0aea2d] [MEMORY][controller-start] 6291456
DEBUG - 2026-03-25 20:01:18 --> [REQ_ID=f8f06d0aea2d] [METHOD_ENTRY] show
DEBUG - 2026-03-25 20:01:18 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-25 20:01:18 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-25 20:01:18 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-25 20:01:18 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-25 20:01:18 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-25 20:01:18 --> MyMICoin: guest context detected; skipping user-specific preload.
ERROR - 2026-03-25 20:01:18 --> HowItWorksController failure: automated-financial-insights
CRITICAL - 2026-03-25 20:01:18 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: GET, Route: How-It-Works/Automated-Financial-Insights]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-25 20:01:18 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-25 20:01:18 --> [404] URI=https://www.mymiwallet.com/index.php/How-It-Works/Automated-Financial-Insights
WARNING - 2026-03-25 20:01:18 --> 404 route miss: https://www.mymiwallet.com/index.php/How-It-Works/Automated-Financial-Insights | referrer: none
ERROR - 2026-03-25 20:01:18 --> [ERROR_PAGE] event=error_404 status=404 message=Page not found.
INFO - 2026-03-25 20:01:18 --> [REQ_ID=f8f06d0aea2d] [PERF] Execution time=0.028967
DEBUG - 2026-03-25 20:01:19 --> [REQ_ID=8a82bab45ccd] [REQUEST][START] GET /index.php/How-It-Works/Setting-Financial-Goals
DEBUG - 2026-03-25 20:01:19 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-25 20:01:19 --> [REQ_ID=8a82bab45ccd] [FILTER_BEFORE] /index.php/How-It-Works/Setting-Financial-Goals
DEBUG - 2026-03-25 20:01:19 --> [REQ_ID=8a82bab45ccd] [ROUTE] Controller=\App\Modules\Blog\Controllers\HowItWorksController Method=SettingFinancialGoals
DEBUG - 2026-03-25 20:01:19 --> [REQ_ID=8a82bab45ccd] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/How-It-Works/Setting-Financial-Goals
DEBUG - 2026-03-25 20:01:19 --> [CSRF] token name=csrf_test_name hash=d374e7d3f74b12ae67c0747ad7b621f9
DEBUG - 2026-03-25 20:01:19 --> [REQ_ID=ab7567cc5682] [INIT] App\Modules\Blog\Controllers\HowItWorksController::GET
INFO - 2026-03-25 20:01:19 --> [REQ_ID=ab7567cc5682] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-25 20:01:19 --> [REQ_ID=ab7567cc5682] [METHOD_ENTRY] SettingFinancialGoals
DEBUG - 2026-03-25 20:01:19 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-25 20:01:19 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-25 20:01:19 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-25 20:01:19 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-25 20:01:19 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-25 20:01:19 --> MyMICoin: guest context detected; skipping user-specific preload.
INFO - 2026-03-25 20:01:19 --> [REQ_ID=ab7567cc5682] [MEMORY][commonData:start] 4194304
INFO - 2026-03-25 20:01:19 --> themesMemory usage: 8388608
DEBUG - 2026-03-25 20:01:19 --> [MetaService] slug=how-it-works/setting-financial-goals pageName= cacheHit=1 path=CACHE
DEBUG - 2026-03-25 20:01:19 --> [REQ_ID=8a82bab45ccd] [FILTER_AFTER]
DEBUG - 2026-03-25 20:01:19 --> [REQ_ID=8a82bab45ccd] [LIFECYCLE][END] status=200 duration_ms=594.77 memory_delta=4194304
INFO - 2026-03-25 20:01:19 --> [REQ_ID=ab7567cc5682] [PERF] Execution time=0.594473
DEBUG - 2026-03-25 20:01:19 --> [REQ_ID=8a82bab45ccd] [REQUEST][END]
INFO - 2026-03-25 20:01:19 --> [REQ_ID=8a82bab45ccd] [PERF] Execution time=0.605092
DEBUG - 2026-03-25 20:01:22 --> [REQ_ID=16965e749c9d] [REQUEST][START] HEAD /
DEBUG - 2026-03-25 20:01:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-25 20:01:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-25 20:01:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-25 20:01:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-25 20:01:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-25 20:06:22 --> [REQ_ID=aa07b4d587d4] [REQUEST][START] HEAD /
DEBUG - 2026-03-25 20:06:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-25 20:06:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-25 20:06:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-25 20:06:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-25 20:06:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-25 20:11:22 --> [REQ_ID=6456f55d2dc4] [REQUEST][START] HEAD /
DEBUG - 2026-03-25 20:11:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-25 20:11:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-25 20:11:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-25 20:11:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-25 20:11:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-25 20:15:02 --> [REQ_ID=e06fcb11d922] [REQUEST][START] GET /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-25 20:15:02 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-25 20:15:02 --> [REQ_ID=e06fcb11d922] [FILTER_BEFORE] /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-25 20:15:02 --> [REQ_ID=e06fcb11d922] [ROUTE] Controller=\App\Modules\APIs\Controllers\AlertsAPIController Method=fetchEmailAlerts
DEBUG - 2026-03-25 20:15:02 --> [REQ_ID=e06fcb11d922] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-25 20:15:02 --> [REQ_ID=e06fcb11d922] [REQUEST][END]
INFO - 2026-03-25 20:15:02 --> [REQ_ID=e06fcb11d922] [PERF] Execution time=0.047159
DEBUG - 2026-03-25 20:16:22 --> [REQ_ID=1b72688eed74] [REQUEST][START] HEAD /
DEBUG - 2026-03-25 20:16:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-25 20:16:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-25 20:16:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-25 20:16:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-25 20:16:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-25 20:21:22 --> [REQ_ID=f78ee2e8a78f] [REQUEST][START] HEAD /
DEBUG - 2026-03-25 20:21:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-25 20:21:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-25 20:21:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-25 20:21:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-25 20:21:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-25 20:26:22 --> [REQ_ID=e3e8cb7fc2d7] [REQUEST][START] HEAD /
DEBUG - 2026-03-25 20:26:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-25 20:26:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-25 20:26:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-25 20:26:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-25 20:26:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-25 20:30:27 --> [REQ_ID=70171b3d4c70] [REQUEST][START] GET /index.php/How-It-Works/Purchase-MyMI-Gold
DEBUG - 2026-03-25 20:30:27 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-25 20:30:27 --> [REQ_ID=70171b3d4c70] [FILTER_BEFORE] /index.php/How-It-Works/Purchase-MyMI-Gold
DEBUG - 2026-03-25 20:30:27 --> [REQ_ID=70171b3d4c70] [ROUTE] Controller=\App\Modules\Blog\Controllers\HowItWorksController Method=PurchaseMyMIGold
DEBUG - 2026-03-25 20:30:27 --> [REQ_ID=70171b3d4c70] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/How-It-Works/Purchase-MyMI-Gold
DEBUG - 2026-03-25 20:30:27 --> [CSRF] token name=csrf_test_name hash=ba9f4fb585744034001316d97a3c8100
DEBUG - 2026-03-25 20:30:27 --> [REQ_ID=d47e9668e4e8] [INIT] App\Modules\Blog\Controllers\HowItWorksController::GET
INFO - 2026-03-25 20:30:27 --> [REQ_ID=d47e9668e4e8] [MEMORY][controller-start] 6291456
DEBUG - 2026-03-25 20:30:27 --> [REQ_ID=d47e9668e4e8] [METHOD_ENTRY] PurchaseMyMIGold
DEBUG - 2026-03-25 20:30:27 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-25 20:30:27 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-25 20:30:27 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-25 20:30:27 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-25 20:30:27 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-25 20:30:27 --> MyMICoin: guest context detected; skipping user-specific preload.
INFO - 2026-03-25 20:30:27 --> [REQ_ID=d47e9668e4e8] [MEMORY][commonData:start] 6291456
INFO - 2026-03-25 20:30:27 --> themesMemory usage: 10485760
DEBUG - 2026-03-25 20:30:27 --> [MetaService] slug=how-it-works/purchase-mymi-gold pageName= cacheHit= path=DB
DEBUG - 2026-03-25 20:30:27 --> [REQ_ID=70171b3d4c70] [FILTER_AFTER]
DEBUG - 2026-03-25 20:30:27 --> [REQ_ID=70171b3d4c70] [LIFECYCLE][END] status=200 duration_ms=642.51 memory_delta=4194304
INFO - 2026-03-25 20:30:27 --> [REQ_ID=d47e9668e4e8] [PERF] Execution time=0.640381
DEBUG - 2026-03-25 20:30:27 --> [REQ_ID=70171b3d4c70] [REQUEST][END]
INFO - 2026-03-25 20:30:27 --> [REQ_ID=70171b3d4c70] [PERF] Execution time=0.686707
DEBUG - 2026-03-25 20:31:22 --> [REQ_ID=6f39298c30ae] [REQUEST][START] HEAD /
DEBUG - 2026-03-25 20:31:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-25 20:31:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-25 20:31:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-25 20:31:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-25 20:31:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-25 20:36:22 --> [REQ_ID=ce58b50bcedd] [REQUEST][START] HEAD /
DEBUG - 2026-03-25 20:36:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-25 20:36:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-25 20:36:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-25 20:36:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-25 20:36:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-25 20:41:02 --> [REQ_ID=5d23f0b816da] [REQUEST][START] GET /index.php/Features/Brokerage-Integration
DEBUG - 2026-03-25 20:41:02 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-25 20:41:02 --> [REQ_ID=5d23f0b816da] [FILTER_BEFORE] /index.php/Features/Brokerage-Integration
DEBUG - 2026-03-25 20:41:02 --> [REQ_ID=5d23f0b816da] [ROUTE] Controller=\App\Modules\Advertise\Controllers\FeaturesController Method=BrokerageIntegrations
DEBUG - 2026-03-25 20:41:02 --> [REQ_ID=5d23f0b816da] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Features/Brokerage-Integration
DEBUG - 2026-03-25 20:41:02 --> [CSRF] token name=csrf_test_name hash=cb3bba38a144309a675dbcbd44f98014
DEBUG - 2026-03-25 20:41:02 --> [REQ_ID=5d23f0b816da] [REQUEST][END]
INFO - 2026-03-25 20:41:02 --> [REQ_ID=5d23f0b816da] [PERF] Execution time=0.058909
DEBUG - 2026-03-25 20:41:06 --> [REQ_ID=851b5161dc47] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-25 20:41:06 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-25 20:41:06 --> [REQ_ID=851b5161dc47] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-25 20:41:06 --> [REQ_ID=851b5161dc47] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-25 20:41:06 --> [REQ_ID=851b5161dc47] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-25 20:41:06 --> [CSRF] token name=csrf_test_name hash=fe8d6735f40b3944065906592e0d1a41
DEBUG - 2026-03-25 20:41:06 --> [REQ_ID=90b229bef62b] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-25 20:41:06 --> [REQ_ID=90b229bef62b] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-25 20:41:06 --> [REQ_ID=851b5161dc47] [FILTER_AFTER]
DEBUG - 2026-03-25 20:41:06 --> [REQ_ID=851b5161dc47] [LIFECYCLE][END] status=200 duration_ms=36.86 memory_delta=0
INFO - 2026-03-25 20:41:06 --> [REQ_ID=90b229bef62b] [PERF] Execution time=0.036519
DEBUG - 2026-03-25 20:41:06 --> [REQ_ID=851b5161dc47] [REQUEST][END]
INFO - 2026-03-25 20:41:06 --> [REQ_ID=851b5161dc47] [PERF] Execution time=0.049490
DEBUG - 2026-03-25 20:41:22 --> [REQ_ID=3db3df0bddfe] [REQUEST][START] HEAD /
DEBUG - 2026-03-25 20:41:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-25 20:41:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-25 20:41:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-25 20:41:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-25 20:41:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-25 20:46:22 --> [REQ_ID=fc1c34fdc8db] [REQUEST][START] HEAD /
DEBUG - 2026-03-25 20:46:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-25 20:46:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-25 20:46:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-25 20:46:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-25 20:46:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-25 20:51:22 --> [REQ_ID=aaa7365686e2] [REQUEST][START] HEAD /
DEBUG - 2026-03-25 20:51:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-25 20:51:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-25 20:51:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-25 20:51:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-25 20:51:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-25 20:56:22 --> [REQ_ID=67b78bea45d7] [REQUEST][START] HEAD /
DEBUG - 2026-03-25 20:56:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-25 20:56:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-25 20:56:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-25 20:56:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-25 20:56:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-25 21:00:01 --> [REQ_ID=e2200cb0da32] [REQUEST][START] GET /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-25 21:00:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-25 21:00:01 --> [REQ_ID=e2200cb0da32] [FILTER_BEFORE] /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-25 21:00:01 --> [REQ_ID=e2200cb0da32] [ROUTE] Controller=\App\Modules\Management\Controllers\ManagementAPIController Method=Run_CRON_Tasks
DEBUG - 2026-03-25 21:00:01 --> [REQ_ID=e2200cb0da32] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-25 21:00:01 --> [REQ_ID=e2200cb0da32] [REQUEST][END]
INFO - 2026-03-25 21:00:01 --> [REQ_ID=e2200cb0da32] [PERF] Execution time=0.049158
DEBUG - 2026-03-25 21:00:11 --> [REQ_ID=ec22657e0c71] [REQUEST][START] GET /index.php/How-To-Guides
DEBUG - 2026-03-25 21:00:11 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
INFO - 2026-03-25 21:00:11 --> REDIRECTED ROUTE at https://www.mymiwallet.com/Knowledgebase/Tutorials
DEBUG - 2026-03-25 21:00:11 --> [REQ_ID=ec22657e0c71] [REQUEST][END]
INFO - 2026-03-25 21:00:11 --> [REQ_ID=ec22657e0c71] [PERF] Execution time=0.020660
DEBUG - 2026-03-25 21:01:22 --> [REQ_ID=8bad6872d1ab] [REQUEST][START] HEAD /
DEBUG - 2026-03-25 21:01:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-25 21:01:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-25 21:01:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-25 21:01:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-25 21:01:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-25 21:06:22 --> [REQ_ID=cc245a994360] [REQUEST][START] HEAD /
DEBUG - 2026-03-25 21:06:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-25 21:06:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-25 21:06:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-25 21:06:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-25 21:06:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-25 21:11:22 --> [REQ_ID=2af11bbfec5d] [REQUEST][START] HEAD /
DEBUG - 2026-03-25 21:11:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-25 21:11:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-25 21:11:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-25 21:11:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-25 21:11:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-25 21:11:27 --> [REQ_ID=b5d0f2ca1510] [REQUEST][START] GET /
DEBUG - 2026-03-25 21:11:27 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-25 21:11:27 --> [REQ_ID=b5d0f2ca1510] [FILTER_BEFORE] /
DEBUG - 2026-03-25 21:11:27 --> [REQ_ID=b5d0f2ca1510] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-25 21:11:27 --> [REQ_ID=b5d0f2ca1510] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-25 21:11:27 --> [CSRF] token name=csrf_test_name hash=cde8671687812ce33119b064c9535657
DEBUG - 2026-03-25 21:11:27 --> [REQ_ID=7c01529d1d46] [INIT] App\Controllers\Home::GET
INFO - 2026-03-25 21:11:27 --> [REQ_ID=7c01529d1d46] [MEMORY][controller-start] 4194304
INFO - 2026-03-25 21:11:27 --> [REQ_ID=7c01529d1d46] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-25 21:11:27 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-25 21:11:27 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-03-25 21:11:27 --> [REQ_ID=7c01529d1d46] [VIEW_RENDER] themes/public/home
INFO - 2026-03-25 21:11:27 --> [REQ_ID=7c01529d1d46] [MEMORY][commonData:start] 8388608
INFO - 2026-03-25 21:11:27 --> themesMemory usage: 8388608
DEBUG - 2026-03-25 21:11:27 --> [MetaService] slug= pageName=Home cacheHit= path=DB
DEBUG - 2026-03-25 21:11:27 --> [REQ_ID=b5d0f2ca1510] [FILTER_AFTER]
DEBUG - 2026-03-25 21:11:27 --> [REQ_ID=b5d0f2ca1510] [LIFECYCLE][END] status=200 duration_ms=644.97 memory_delta=4194304
INFO - 2026-03-25 21:11:27 --> [REQ_ID=7c01529d1d46] [PERF] Execution time=0.643148
DEBUG - 2026-03-25 21:11:28 --> [REQ_ID=b5d0f2ca1510] [REQUEST][END]
INFO - 2026-03-25 21:11:28 --> [REQ_ID=b5d0f2ca1510] [PERF] Execution time=0.664417
DEBUG - 2026-03-25 21:15:01 --> [REQ_ID=c1558b9f416b] [REQUEST][START] GET /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-25 21:15:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-25 21:15:01 --> [REQ_ID=c1558b9f416b] [FILTER_BEFORE] /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-25 21:15:01 --> [REQ_ID=c1558b9f416b] [ROUTE] Controller=\App\Modules\APIs\Controllers\AlertsAPIController Method=fetchEmailAlerts
DEBUG - 2026-03-25 21:15:01 --> [REQ_ID=c1558b9f416b] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-25 21:15:01 --> [REQ_ID=c1558b9f416b] [REQUEST][END]
INFO - 2026-03-25 21:15:01 --> [REQ_ID=c1558b9f416b] [PERF] Execution time=0.050587
DEBUG - 2026-03-25 21:15:17 --> [REQ_ID=1f52fbb29a0e] [REQUEST][START] GET /index.php/Management/Marketing/Video-Creator
DEBUG - 2026-03-25 21:15:17 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-25 21:15:17 --> [REQ_ID=1f52fbb29a0e] [REQUEST][END]
INFO - 2026-03-25 21:15:17 --> [REQ_ID=1f52fbb29a0e] [PERF] Execution time=0.221067
DEBUG - 2026-03-25 21:16:22 --> [REQ_ID=d15bc27a6f74] [REQUEST][START] HEAD /
DEBUG - 2026-03-25 21:16:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-25 21:16:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-25 21:16:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-25 21:16:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-25 21:16:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-25 21:21:22 --> [REQ_ID=75885ad38fa2] [REQUEST][START] HEAD /
DEBUG - 2026-03-25 21:21:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-25 21:21:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-25 21:21:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-25 21:21:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-25 21:21:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-25 21:26:22 --> [REQ_ID=49d8fdb963e3] [REQUEST][START] HEAD /
DEBUG - 2026-03-25 21:26:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-25 21:26:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-25 21:26:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-25 21:26:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-25 21:26:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-25 21:27:57 --> [REQ_ID=5b2ce2a530a2] [REQUEST][START] GET /
DEBUG - 2026-03-25 21:27:57 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-25 21:27:57 --> [REQ_ID=5b2ce2a530a2] [FILTER_BEFORE] /
DEBUG - 2026-03-25 21:27:57 --> [REQ_ID=5b2ce2a530a2] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-25 21:27:57 --> [REQ_ID=5b2ce2a530a2] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-25 21:27:57 --> [CSRF] token name=csrf_test_name hash=bef457b9baa6fd682dfa92eceaf586f0
DEBUG - 2026-03-25 21:27:57 --> [REQ_ID=0a5459a89b8f] [INIT] App\Controllers\Home::GET
INFO - 2026-03-25 21:27:57 --> [REQ_ID=0a5459a89b8f] [MEMORY][controller-start] 6291456
INFO - 2026-03-25 21:27:57 --> [REQ_ID=0a5459a89b8f] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-25 21:27:57 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-25 21:27:57 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-03-25 21:27:57 --> [REQ_ID=0a5459a89b8f] [VIEW_RENDER] themes/public/home
INFO - 2026-03-25 21:27:57 --> [REQ_ID=0a5459a89b8f] [MEMORY][commonData:start] 10485760
INFO - 2026-03-25 21:27:57 --> themesMemory usage: 10485760
DEBUG - 2026-03-25 21:27:57 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-25 21:27:57 --> [REQ_ID=5b2ce2a530a2] [FILTER_AFTER]
DEBUG - 2026-03-25 21:27:57 --> [REQ_ID=5b2ce2a530a2] [LIFECYCLE][END] status=200 duration_ms=629.95 memory_delta=4194304
INFO - 2026-03-25 21:27:57 --> [REQ_ID=0a5459a89b8f] [PERF] Execution time=0.627813
DEBUG - 2026-03-25 21:27:57 --> [REQ_ID=5b2ce2a530a2] [REQUEST][END]
INFO - 2026-03-25 21:27:57 --> [REQ_ID=5b2ce2a530a2] [PERF] Execution time=0.670237
DEBUG - 2026-03-25 21:31:22 --> [REQ_ID=a14f82b1061e] [REQUEST][START] HEAD /
DEBUG - 2026-03-25 21:31:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-25 21:31:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-25 21:31:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-25 21:31:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-25 21:31:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-25 21:36:22 --> [REQ_ID=3aa10e44dba9] [REQUEST][START] HEAD /
DEBUG - 2026-03-25 21:36:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-25 21:36:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-25 21:36:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-25 21:36:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-25 21:36:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-25 21:40:22 --> [REQ_ID=0edd9aeb250a] [REQUEST][START] GET /
DEBUG - 2026-03-25 21:40:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-25 21:40:22 --> [REQ_ID=0edd9aeb250a] [FILTER_BEFORE] /
DEBUG - 2026-03-25 21:40:22 --> [REQ_ID=0edd9aeb250a] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-25 21:40:22 --> [REQ_ID=0edd9aeb250a] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-25 21:40:22 --> [CSRF] token name=csrf_test_name hash=d48e9e5edc58cc62c390393b2fca54d8
DEBUG - 2026-03-25 21:40:22 --> [REQ_ID=897cf9756975] [INIT] App\Controllers\Home::GET
INFO - 2026-03-25 21:40:22 --> [REQ_ID=897cf9756975] [MEMORY][controller-start] 6291456
INFO - 2026-03-25 21:40:22 --> [REQ_ID=897cf9756975] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-25 21:40:22 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-25 21:40:23 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
DEBUG - 2026-03-25 21:40:23 --> [REQ_ID=897cf9756975] [VIEW_RENDER] themes/public/home
INFO - 2026-03-25 21:40:23 --> [REQ_ID=897cf9756975] [MEMORY][commonData:start] 10485760
INFO - 2026-03-25 21:40:23 --> themesMemory usage: 10485760
DEBUG - 2026-03-25 21:40:23 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-25 21:40:23 --> [REQ_ID=0edd9aeb250a] [FILTER_AFTER]
DEBUG - 2026-03-25 21:40:23 --> [REQ_ID=0edd9aeb250a] [LIFECYCLE][END] status=200 duration_ms=847.01 memory_delta=4194304
INFO - 2026-03-25 21:40:23 --> [REQ_ID=897cf9756975] [PERF] Execution time=0.845041
DEBUG - 2026-03-25 21:40:23 --> [REQ_ID=0edd9aeb250a] [REQUEST][END]
INFO - 2026-03-25 21:40:23 --> [REQ_ID=0edd9aeb250a] [PERF] Execution time=0.886411
DEBUG - 2026-03-25 21:41:22 --> [REQ_ID=629da9944437] [REQUEST][START] HEAD /
DEBUG - 2026-03-25 21:41:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-25 21:41:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-25 21:41:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-25 21:41:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-25 21:41:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-25 21:45:36 --> [REQ_ID=19a6f45d6824] [REQUEST][START] HEAD /
DEBUG - 2026-03-25 21:45:36 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-25 21:45:36 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-25 21:45:36 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-25 21:45:36 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-25 21:45:36 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://mymiwallet.com/
DEBUG - 2026-03-25 21:46:22 --> [REQ_ID=30b407271f6c] [REQUEST][START] HEAD /
DEBUG - 2026-03-25 21:46:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-25 21:46:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-25 21:46:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-25 21:46:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-25 21:46:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-25 21:51:22 --> [REQ_ID=9cc83779e320] [REQUEST][START] HEAD /
DEBUG - 2026-03-25 21:51:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-25 21:51:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-25 21:51:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-25 21:51:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-25 21:51:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-25 21:56:22 --> [REQ_ID=9873ca5e3836] [REQUEST][START] HEAD /
DEBUG - 2026-03-25 21:56:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-25 21:56:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-25 21:56:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-25 21:56:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-25 21:56:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-25 22:00:01 --> [REQ_ID=62ef78968082] [REQUEST][START] GET /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-25 22:00:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-25 22:00:01 --> [REQ_ID=62ef78968082] [FILTER_BEFORE] /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-25 22:00:01 --> [REQ_ID=62ef78968082] [ROUTE] Controller=\App\Modules\Management\Controllers\ManagementAPIController Method=Run_CRON_Tasks
DEBUG - 2026-03-25 22:00:01 --> [REQ_ID=62ef78968082] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-25 22:00:01 --> [REQ_ID=62ef78968082] [REQUEST][END]
INFO - 2026-03-25 22:00:01 --> [REQ_ID=62ef78968082] [PERF] Execution time=0.059926
DEBUG - 2026-03-25 22:01:22 --> [REQ_ID=826cf0270370] [REQUEST][START] HEAD /
DEBUG - 2026-03-25 22:01:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-25 22:01:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-25 22:01:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-25 22:01:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-25 22:01:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-25 22:06:22 --> [REQ_ID=8d3dec1b640e] [REQUEST][START] HEAD /
DEBUG - 2026-03-25 22:06:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-25 22:06:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-25 22:06:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-25 22:06:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-25 22:06:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-25 22:11:22 --> [REQ_ID=197ed52b73d1] [REQUEST][START] HEAD /
DEBUG - 2026-03-25 22:11:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-25 22:11:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-25 22:11:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-25 22:11:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-25 22:11:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-25 22:15:01 --> [REQ_ID=fe100810f5b4] [REQUEST][START] GET /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-25 22:15:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-25 22:15:01 --> [REQ_ID=fe100810f5b4] [FILTER_BEFORE] /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-25 22:15:01 --> [REQ_ID=fe100810f5b4] [ROUTE] Controller=\App\Modules\APIs\Controllers\AlertsAPIController Method=fetchEmailAlerts
DEBUG - 2026-03-25 22:15:01 --> [REQ_ID=fe100810f5b4] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-25 22:15:01 --> [REQ_ID=fe100810f5b4] [REQUEST][END]
INFO - 2026-03-25 22:15:01 --> [REQ_ID=fe100810f5b4] [PERF] Execution time=0.053106
DEBUG - 2026-03-25 22:16:22 --> [REQ_ID=0daeb985e83c] [REQUEST][START] HEAD /
DEBUG - 2026-03-25 22:16:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-25 22:16:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-25 22:16:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-25 22:16:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-25 22:16:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-25 22:21:22 --> [REQ_ID=ad0e2a75a63e] [REQUEST][START] HEAD /
DEBUG - 2026-03-25 22:21:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-25 22:21:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-25 22:21:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-25 22:21:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-25 22:21:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-25 22:22:06 --> [REQ_ID=af32678eff6d] [REQUEST][START] GET /
DEBUG - 2026-03-25 22:22:06 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-25 22:22:06 --> [REQ_ID=af32678eff6d] [FILTER_BEFORE] /
DEBUG - 2026-03-25 22:22:06 --> [REQ_ID=af32678eff6d] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-25 22:22:06 --> [REQ_ID=af32678eff6d] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-25 22:22:06 --> [CSRF] token name=csrf_test_name hash=4901e0c4c2ddf2d29d78ca93a233d3a0
DEBUG - 2026-03-25 22:22:06 --> [REQ_ID=28a327da5fbb] [INIT] App\Controllers\Home::GET
INFO - 2026-03-25 22:22:06 --> [REQ_ID=28a327da5fbb] [MEMORY][controller-start] 4194304
INFO - 2026-03-25 22:22:07 --> [REQ_ID=28a327da5fbb] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-25 22:22:07 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-25 22:22:07 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-03-25 22:22:07 --> [REQ_ID=28a327da5fbb] [VIEW_RENDER] themes/public/home
INFO - 2026-03-25 22:22:07 --> [REQ_ID=28a327da5fbb] [MEMORY][commonData:start] 8388608
INFO - 2026-03-25 22:22:07 --> themesMemory usage: 8388608
DEBUG - 2026-03-25 22:22:07 --> [MetaService] slug= pageName=Home cacheHit= path=DB
DEBUG - 2026-03-25 22:22:07 --> [REQ_ID=af32678eff6d] [FILTER_AFTER]
DEBUG - 2026-03-25 22:22:07 --> [REQ_ID=af32678eff6d] [LIFECYCLE][END] status=200 duration_ms=664.77 memory_delta=4194304
INFO - 2026-03-25 22:22:07 --> [REQ_ID=28a327da5fbb] [PERF] Execution time=0.662818
DEBUG - 2026-03-25 22:22:07 --> [REQ_ID=af32678eff6d] [REQUEST][END]
INFO - 2026-03-25 22:22:07 --> [REQ_ID=af32678eff6d] [PERF] Execution time=0.684137
DEBUG - 2026-03-25 22:26:22 --> [REQ_ID=2884c02ff744] [REQUEST][START] HEAD /
DEBUG - 2026-03-25 22:26:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-25 22:26:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-25 22:26:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-25 22:26:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-25 22:26:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-25 22:28:16 --> [REQ_ID=c53376691adb] [REQUEST][START] GET /
DEBUG - 2026-03-25 22:28:16 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-25 22:28:16 --> [REQ_ID=c53376691adb] [FILTER_BEFORE] /
DEBUG - 2026-03-25 22:28:16 --> [REQ_ID=c53376691adb] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-25 22:28:16 --> [REQ_ID=c53376691adb] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-25 22:28:16 --> [CSRF] token name=csrf_test_name hash=7022f508f0eea7324c2e9abefcec93c8
DEBUG - 2026-03-25 22:28:16 --> [REQ_ID=08c95253eb4a] [INIT] App\Controllers\Home::GET
INFO - 2026-03-25 22:28:16 --> [REQ_ID=08c95253eb4a] [MEMORY][controller-start] 6291456
INFO - 2026-03-25 22:28:17 --> [REQ_ID=08c95253eb4a] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-25 22:28:17 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-25 22:28:17 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
DEBUG - 2026-03-25 22:28:17 --> [REQ_ID=08c95253eb4a] [VIEW_RENDER] themes/public/home
INFO - 2026-03-25 22:28:17 --> [REQ_ID=08c95253eb4a] [MEMORY][commonData:start] 10485760
INFO - 2026-03-25 22:28:17 --> themesMemory usage: 10485760
DEBUG - 2026-03-25 22:28:17 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-25 22:28:17 --> [REQ_ID=c53376691adb] [FILTER_AFTER]
DEBUG - 2026-03-25 22:28:17 --> [REQ_ID=c53376691adb] [LIFECYCLE][END] status=200 duration_ms=571.90 memory_delta=4194304
INFO - 2026-03-25 22:28:17 --> [REQ_ID=08c95253eb4a] [PERF] Execution time=0.570103
DEBUG - 2026-03-25 22:28:17 --> [REQ_ID=c53376691adb] [REQUEST][END]
INFO - 2026-03-25 22:28:17 --> [REQ_ID=c53376691adb] [PERF] Execution time=0.611029
DEBUG - 2026-03-25 22:28:18 --> [REQ_ID=55e700f48556] [REQUEST][START] GET /
DEBUG - 2026-03-25 22:28:18 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-25 22:28:18 --> [REQ_ID=55e700f48556] [FILTER_BEFORE] /
DEBUG - 2026-03-25 22:28:18 --> [REQ_ID=55e700f48556] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-25 22:28:18 --> [REQ_ID=55e700f48556] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-25 22:28:18 --> [CSRF] token name=csrf_test_name hash=7022f508f0eea7324c2e9abefcec93c8
DEBUG - 2026-03-25 22:28:18 --> [REQ_ID=d7b893bd7e9e] [INIT] App\Controllers\Home::GET
INFO - 2026-03-25 22:28:18 --> [REQ_ID=d7b893bd7e9e] [MEMORY][controller-start] 4194304
INFO - 2026-03-25 22:28:18 --> [REQ_ID=d7b893bd7e9e] [MEMORY][commonData:start] 4194304
DEBUG - 2026-03-25 22:28:18 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-25 22:28:19 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
DEBUG - 2026-03-25 22:28:19 --> [REQ_ID=d7b893bd7e9e] [VIEW_RENDER] themes/public/home
INFO - 2026-03-25 22:28:19 --> [REQ_ID=d7b893bd7e9e] [MEMORY][commonData:start] 8388608
INFO - 2026-03-25 22:28:19 --> themesMemory usage: 8388608
DEBUG - 2026-03-25 22:28:19 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-25 22:28:19 --> [REQ_ID=55e700f48556] [FILTER_AFTER]
DEBUG - 2026-03-25 22:28:19 --> [REQ_ID=55e700f48556] [LIFECYCLE][END] status=200 duration_ms=486.58 memory_delta=4194304
INFO - 2026-03-25 22:28:19 --> [REQ_ID=d7b893bd7e9e] [PERF] Execution time=0.486375
DEBUG - 2026-03-25 22:28:19 --> [REQ_ID=55e700f48556] [REQUEST][END]
INFO - 2026-03-25 22:28:19 --> [REQ_ID=55e700f48556] [PERF] Execution time=0.495572
DEBUG - 2026-03-25 22:31:22 --> [REQ_ID=a0bbb9036abc] [REQUEST][START] HEAD /
DEBUG - 2026-03-25 22:31:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-25 22:31:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-25 22:31:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-25 22:31:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-25 22:31:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-25 22:32:31 --> [REQ_ID=0207c89d4176] [REQUEST][START] GET /
DEBUG - 2026-03-25 22:32:31 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-25 22:32:31 --> [REQ_ID=0207c89d4176] [REQUEST][END]
INFO - 2026-03-25 22:32:31 --> [REQ_ID=0207c89d4176] [PERF] Execution time=0.017818
DEBUG - 2026-03-25 22:36:22 --> [REQ_ID=31f41a507e5d] [REQUEST][START] HEAD /
DEBUG - 2026-03-25 22:36:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-25 22:36:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-25 22:36:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-25 22:36:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-25 22:36:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-25 22:36:46 --> [REQ_ID=31568af1ab4c] [REQUEST][START] GET /index.php/Privacy-Policy
DEBUG - 2026-03-25 22:36:46 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-25 22:36:46 --> [REQ_ID=31568af1ab4c] [REQUEST][END]
INFO - 2026-03-25 22:36:46 --> [REQ_ID=31568af1ab4c] [PERF] Execution time=0.017900
DEBUG - 2026-03-25 22:41:22 --> [REQ_ID=f86fdac8b924] [REQUEST][START] HEAD /
DEBUG - 2026-03-25 22:41:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-25 22:41:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-25 22:41:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-25 22:41:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-25 22:41:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-25 22:46:22 --> [REQ_ID=df0a86306ecc] [REQUEST][START] HEAD /
DEBUG - 2026-03-25 22:46:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-25 22:46:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-25 22:46:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-25 22:46:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-25 22:46:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-25 22:51:22 --> [REQ_ID=55b77bc9b8ea] [REQUEST][START] HEAD /
DEBUG - 2026-03-25 22:51:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-25 22:51:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-25 22:51:23 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-25 22:51:23 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-25 22:51:23 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-25 22:56:22 --> [REQ_ID=d1b5db74765c] [REQUEST][START] HEAD /
DEBUG - 2026-03-25 22:56:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-25 22:56:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-25 22:56:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-25 22:56:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-25 22:56:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-25 23:00:02 --> [REQ_ID=899044336078] [REQUEST][START] GET /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-25 23:00:02 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-25 23:00:02 --> [REQ_ID=899044336078] [FILTER_BEFORE] /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-25 23:00:02 --> [REQ_ID=899044336078] [ROUTE] Controller=\App\Modules\Management\Controllers\ManagementAPIController Method=Run_CRON_Tasks
DEBUG - 2026-03-25 23:00:02 --> [REQ_ID=899044336078] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-25 23:00:02 --> [REQ_ID=899044336078] [REQUEST][END]
INFO - 2026-03-25 23:00:02 --> [REQ_ID=899044336078] [PERF] Execution time=0.048454
DEBUG - 2026-03-25 23:01:22 --> [REQ_ID=97a35d830441] [REQUEST][START] HEAD /
DEBUG - 2026-03-25 23:01:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-25 23:01:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-25 23:01:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-25 23:01:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-25 23:01:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-25 23:06:22 --> [REQ_ID=7562959bbdcf] [REQUEST][START] HEAD /
DEBUG - 2026-03-25 23:06:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-25 23:06:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-25 23:06:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-25 23:06:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-25 23:06:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-25 23:11:22 --> [REQ_ID=7b2ba8818b1a] [REQUEST][START] HEAD /
DEBUG - 2026-03-25 23:11:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-25 23:11:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-25 23:11:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-25 23:11:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-25 23:11:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-25 23:15:01 --> [REQ_ID=7ba96eb58000] [REQUEST][START] GET /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-25 23:15:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-25 23:15:01 --> [REQ_ID=7ba96eb58000] [FILTER_BEFORE] /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-25 23:15:01 --> [REQ_ID=7ba96eb58000] [ROUTE] Controller=\App\Modules\APIs\Controllers\AlertsAPIController Method=fetchEmailAlerts
DEBUG - 2026-03-25 23:15:01 --> [REQ_ID=7ba96eb58000] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-25 23:15:01 --> [REQ_ID=7ba96eb58000] [REQUEST][END]
INFO - 2026-03-25 23:15:01 --> [REQ_ID=7ba96eb58000] [PERF] Execution time=0.045652
DEBUG - 2026-03-25 23:15:55 --> [REQ_ID=c693d8ce3874] [REQUEST][START] GET /
DEBUG - 2026-03-25 23:15:55 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-25 23:15:55 --> [REQ_ID=c693d8ce3874] [FILTER_BEFORE] /
DEBUG - 2026-03-25 23:15:55 --> [REQ_ID=c693d8ce3874] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-25 23:15:55 --> [REQ_ID=c693d8ce3874] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-25 23:15:55 --> [CSRF] token name=csrf_test_name hash=e758365b093cd09b5b971fcb0707e62e
DEBUG - 2026-03-25 23:15:55 --> [REQ_ID=1edc37307091] [INIT] App\Controllers\Home::GET
INFO - 2026-03-25 23:15:55 --> [REQ_ID=1edc37307091] [MEMORY][controller-start] 4194304
INFO - 2026-03-25 23:15:55 --> [REQ_ID=1edc37307091] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-25 23:15:55 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-25 23:15:55 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-03-25 23:15:55 --> [REQ_ID=1edc37307091] [VIEW_RENDER] themes/public/home
INFO - 2026-03-25 23:15:55 --> [REQ_ID=1edc37307091] [MEMORY][commonData:start] 8388608
INFO - 2026-03-25 23:15:55 --> themesMemory usage: 8388608
DEBUG - 2026-03-25 23:15:55 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-25 23:15:55 --> [REQ_ID=c693d8ce3874] [FILTER_AFTER]
DEBUG - 2026-03-25 23:15:55 --> [REQ_ID=c693d8ce3874] [LIFECYCLE][END] status=200 duration_ms=764.21 memory_delta=4194304
INFO - 2026-03-25 23:15:55 --> [REQ_ID=1edc37307091] [PERF] Execution time=0.762828
DEBUG - 2026-03-25 23:15:55 --> [REQ_ID=c693d8ce3874] [REQUEST][END]
INFO - 2026-03-25 23:15:55 --> [REQ_ID=c693d8ce3874] [PERF] Execution time=0.775432
DEBUG - 2026-03-25 23:16:22 --> [REQ_ID=c075e2117cfa] [REQUEST][START] HEAD /
DEBUG - 2026-03-25 23:16:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-25 23:16:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-25 23:16:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-25 23:16:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-25 23:16:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-25 23:21:22 --> [REQ_ID=04fec91a9a12] [REQUEST][START] HEAD /
DEBUG - 2026-03-25 23:21:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-25 23:21:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-25 23:21:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-25 23:21:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-25 23:21:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-25 23:26:22 --> [REQ_ID=559a36501a1b] [REQUEST][START] HEAD /
DEBUG - 2026-03-25 23:26:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-25 23:26:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-25 23:26:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-25 23:26:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-25 23:26:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-25 23:31:22 --> [REQ_ID=14d9ed2ff121] [REQUEST][START] HEAD /
DEBUG - 2026-03-25 23:31:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-25 23:31:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-25 23:31:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-25 23:31:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-25 23:31:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-25 23:36:22 --> [REQ_ID=9869700325fb] [REQUEST][START] HEAD /
DEBUG - 2026-03-25 23:36:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-25 23:36:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-25 23:36:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-25 23:36:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-25 23:36:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-25 23:41:15 --> [REQ_ID=7c1e62f16d09] [REQUEST][START] GET /index.php/Portfolio/Add/GRAB
DEBUG - 2026-03-25 23:41:15 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-25 23:41:15 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: GET, Route: Portfolio/Add/GRAB]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-25 23:41:15 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-25 23:41:15 --> [404] URI=https://www.mymiwallet.com/index.php/Portfolio/Add/GRAB
WARNING - 2026-03-25 23:41:15 --> 404 route miss: https://www.mymiwallet.com/index.php/Portfolio/Add/GRAB | referrer: none
DEBUG - 2026-03-25 23:41:22 --> [REQ_ID=ce3365ad38f3] [REQUEST][START] HEAD /
DEBUG - 2026-03-25 23:41:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-25 23:41:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-25 23:41:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-25 23:41:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-25 23:41:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-25 23:46:22 --> [REQ_ID=f02d2d4291b1] [REQUEST][START] HEAD /
DEBUG - 2026-03-25 23:46:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-25 23:46:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-25 23:46:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-25 23:46:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-25 23:46:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-25 23:51:22 --> [REQ_ID=e77461b6fa9f] [REQUEST][START] HEAD /
DEBUG - 2026-03-25 23:51:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-25 23:51:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-25 23:51:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-25 23:51:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-25 23:51:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-25 23:56:22 --> [REQ_ID=60b0b164c0f8] [REQUEST][START] HEAD /
DEBUG - 2026-03-25 23:56:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-25 23:56:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-25 23:56:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-25 23:56:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-25 23:56:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-25 23:59:03 --> [REQ_ID=b1d4b0a635c5] [REQUEST][START] GET /
DEBUG - 2026-03-25 23:59:03 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-25 23:59:03 --> [REQ_ID=b1d4b0a635c5] [FILTER_BEFORE] /
DEBUG - 2026-03-25 23:59:03 --> [REQ_ID=b1d4b0a635c5] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-25 23:59:03 --> [REQ_ID=b1d4b0a635c5] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-25 23:59:03 --> [CSRF] token name=csrf_test_name hash=46c96f2e762ec4888b433adeb384f59c
DEBUG - 2026-03-25 23:59:03 --> [REQ_ID=b05031898ee2] [INIT] App\Controllers\Home::GET
INFO - 2026-03-25 23:59:03 --> [REQ_ID=b05031898ee2] [MEMORY][controller-start] 6291456
INFO - 2026-03-25 23:59:03 --> [REQ_ID=b05031898ee2] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-25 23:59:03 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-25 23:59:04 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-03-25 23:59:04 --> [REQ_ID=b05031898ee2] [VIEW_RENDER] themes/public/home
INFO - 2026-03-25 23:59:04 --> [REQ_ID=b05031898ee2] [MEMORY][commonData:start] 10485760
INFO - 2026-03-25 23:59:04 --> themesMemory usage: 10485760
DEBUG - 2026-03-25 23:59:04 --> [MetaService] slug= pageName=Home cacheHit= path=DB
DEBUG - 2026-03-25 23:59:04 --> [REQ_ID=b1d4b0a635c5] [FILTER_AFTER]
DEBUG - 2026-03-25 23:59:04 --> [REQ_ID=b1d4b0a635c5] [LIFECYCLE][END] status=200 duration_ms=692.42 memory_delta=4194304
INFO - 2026-03-25 23:59:04 --> [REQ_ID=b05031898ee2] [PERF] Execution time=0.690697
DEBUG - 2026-03-25 23:59:04 --> [REQ_ID=b1d4b0a635c5] [REQUEST][END]
INFO - 2026-03-25 23:59:04 --> [REQ_ID=b1d4b0a635c5] [PERF] Execution time=0.733352
