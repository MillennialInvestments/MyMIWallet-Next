<?php defined('SYSTEMPATH') || exit('No direct script access allowed'); ?>

DEBUG - 2026-03-09 00:00:01 --> [REQ_ID=96039ca6029c] [REQUEST][START] GET /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-09 00:00:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-09 00:00:02 --> [REQ_ID=96039ca6029c] [FILTER_BEFORE] /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-09 00:00:02 --> [REQ_ID=96039ca6029c] [ROUTE] Controller=\App\Modules\Management\Controllers\ManagementAPIController Method=Run_CRON_Tasks
DEBUG - 2026-03-09 00:00:02 --> [REQ_ID=96039ca6029c] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-09 00:00:02 --> [REQ_ID=96039ca6029c] [REQUEST][END]
INFO - 2026-03-09 00:00:02 --> [REQ_ID=96039ca6029c] [PERF] Execution time=0.052620
DEBUG - 2026-03-09 00:01:17 --> [REQ_ID=7c8822103e5a] [REQUEST][START] HEAD /
DEBUG - 2026-03-09 00:01:17 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-09 00:01:17 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-09 00:01:17 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-09 00:01:17 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-09 00:01:17 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-09 00:06:17 --> [REQ_ID=e413dafdaf9d] [REQUEST][START] HEAD /
DEBUG - 2026-03-09 00:06:17 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-09 00:06:17 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-09 00:06:17 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-09 00:06:17 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-09 00:06:17 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-09 00:11:17 --> [REQ_ID=009be23b14c2] [REQUEST][START] HEAD /
DEBUG - 2026-03-09 00:11:17 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-09 00:11:17 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-09 00:11:17 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-09 00:11:17 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-09 00:11:17 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-09 00:15:01 --> [REQ_ID=d1f5ed00b21a] [REQUEST][START] GET /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-09 00:15:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-09 00:15:01 --> [REQ_ID=d1f5ed00b21a] [FILTER_BEFORE] /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-09 00:15:01 --> [REQ_ID=d1f5ed00b21a] [ROUTE] Controller=\App\Modules\APIs\Controllers\AlertsAPIController Method=fetchEmailAlerts
DEBUG - 2026-03-09 00:15:01 --> [REQ_ID=d1f5ed00b21a] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-09 00:15:01 --> [REQ_ID=d1f5ed00b21a] [REQUEST][END]
INFO - 2026-03-09 00:15:01 --> [REQ_ID=d1f5ed00b21a] [PERF] Execution time=0.047937
DEBUG - 2026-03-09 00:16:17 --> [REQ_ID=2fba78881c5e] [REQUEST][START] HEAD /
DEBUG - 2026-03-09 00:16:17 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-09 00:16:17 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-09 00:16:17 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-09 00:16:17 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-09 00:16:17 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-09 00:18:07 --> [REQ_ID=bfe7d5aab5e4] [REQUEST][START] GET /index.php/Wallets
DEBUG - 2026-03-09 00:18:07 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-09 00:18:07 --> [REQ_ID=bfe7d5aab5e4] [FILTER_BEFORE] /index.php/Wallets
DEBUG - 2026-03-09 00:18:07 --> [REQ_ID=bfe7d5aab5e4] [ROUTE] Controller=\App\Modules\User\Controllers\WalletsController Method=index
DEBUG - 2026-03-09 00:18:07 --> [REQ_ID=bfe7d5aab5e4] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Wallets
DEBUG - 2026-03-09 00:18:07 --> [CSRF] token name=csrf_test_name hash=07d86bab158d01f65c6e606e22ef7a1a
DEBUG - 2026-03-09 00:18:07 --> [REQ_ID=bfe7d5aab5e4] [REQUEST][END]
INFO - 2026-03-09 00:18:07 --> [REQ_ID=bfe7d5aab5e4] [PERF] Execution time=0.056839
DEBUG - 2026-03-09 00:18:08 --> [REQ_ID=c0a500610023] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-09 00:18:08 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-09 00:18:08 --> [REQ_ID=c0a500610023] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-09 00:18:08 --> [REQ_ID=c0a500610023] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-09 00:18:08 --> [REQ_ID=c0a500610023] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-09 00:18:08 --> [CSRF] token name=csrf_test_name hash=f42131d39b70816362700b9a014f08b3
DEBUG - 2026-03-09 00:18:08 --> [REQ_ID=76cd56be4150] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-09 00:18:08 --> [REQ_ID=76cd56be4150] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-09 00:18:08 --> [REQ_ID=c0a500610023] [FILTER_AFTER]
DEBUG - 2026-03-09 00:18:08 --> [REQ_ID=c0a500610023] [LIFECYCLE][END] status=200 duration_ms=135.16 memory_delta=0
INFO - 2026-03-09 00:18:08 --> [REQ_ID=76cd56be4150] [PERF] Execution time=0.134965
DEBUG - 2026-03-09 00:18:08 --> [REQ_ID=c0a500610023] [REQUEST][END]
INFO - 2026-03-09 00:18:08 --> [REQ_ID=c0a500610023] [PERF] Execution time=0.146510
DEBUG - 2026-03-09 00:21:17 --> [REQ_ID=abc160d6b6a9] [REQUEST][START] HEAD /
DEBUG - 2026-03-09 00:21:17 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-09 00:21:17 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-09 00:21:17 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-09 00:21:17 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-09 00:21:17 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-09 00:22:16 --> [REQ_ID=1a649e55df17] [REQUEST][START] GET /index.php/MyMI-Gold/Goals/Daily
DEBUG - 2026-03-09 00:22:16 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-09 00:22:16 --> [REQ_ID=1a649e55df17] [FILTER_BEFORE] /index.php/MyMI-Gold/Goals/Daily
DEBUG - 2026-03-09 00:22:16 --> [REQ_ID=1a649e55df17] [ROUTE] Controller=\App\Modules\User\Controllers\DashboardController Method=goals
DEBUG - 2026-03-09 00:22:16 --> [REQ_ID=1a649e55df17] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/MyMI-Gold/Goals/Daily
DEBUG - 2026-03-09 00:22:16 --> [CSRF] token name=csrf_test_name hash=d1dfeeee73a1d4d755c0a2526042ba59
DEBUG - 2026-03-09 00:22:16 --> [REQ_ID=1a649e55df17] [REQUEST][END]
INFO - 2026-03-09 00:22:16 --> [REQ_ID=1a649e55df17] [PERF] Execution time=0.042446
DEBUG - 2026-03-09 00:22:17 --> [REQ_ID=3f87c79471a4] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-09 00:22:17 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-09 00:22:17 --> [REQ_ID=3f87c79471a4] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-09 00:22:17 --> [REQ_ID=3f87c79471a4] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-09 00:22:17 --> [REQ_ID=3f87c79471a4] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-09 00:22:17 --> [CSRF] token name=csrf_test_name hash=11e1d3ec31a81ce206ba5c37b5d98cdd
DEBUG - 2026-03-09 00:22:17 --> [REQ_ID=5b002df5f432] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-09 00:22:17 --> [REQ_ID=5b002df5f432] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-09 00:22:17 --> [REQ_ID=3f87c79471a4] [FILTER_AFTER]
DEBUG - 2026-03-09 00:22:17 --> [REQ_ID=3f87c79471a4] [LIFECYCLE][END] status=200 duration_ms=28.51 memory_delta=0
INFO - 2026-03-09 00:22:17 --> [REQ_ID=5b002df5f432] [PERF] Execution time=0.028239
DEBUG - 2026-03-09 00:22:17 --> [REQ_ID=3f87c79471a4] [REQUEST][END]
INFO - 2026-03-09 00:22:17 --> [REQ_ID=3f87c79471a4] [PERF] Execution time=0.040683
DEBUG - 2026-03-09 00:22:26 --> [REQ_ID=0951aae0f8e9] [REQUEST][START] GET /index.php/Privacy-Policy
DEBUG - 2026-03-09 00:22:26 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-09 00:22:26 --> [REQ_ID=0951aae0f8e9] [FILTER_BEFORE] /index.php/Privacy-Policy
DEBUG - 2026-03-09 00:22:26 --> [REQ_ID=0951aae0f8e9] [ROUTE] Controller=\App\Controllers\Home Method=privacyPolicy
DEBUG - 2026-03-09 00:22:26 --> [REQ_ID=0951aae0f8e9] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Privacy-Policy
DEBUG - 2026-03-09 00:22:26 --> [CSRF] token name=csrf_test_name hash=27a18ce524c6f742771c897aa3284a31
DEBUG - 2026-03-09 00:22:26 --> [REQ_ID=77ac611e59b2] [INIT] App\Controllers\Home::GET
INFO - 2026-03-09 00:22:26 --> [REQ_ID=77ac611e59b2] [MEMORY][controller-start] 4194304
INFO - 2026-03-09 00:22:26 --> [REQ_ID=77ac611e59b2] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-09 00:22:26 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-09 00:22:26 --> [MetaService] slug=privacy-policy pageName= cacheHit= path=DB
DEBUG - 2026-03-09 00:22:26 --> [REQ_ID=77ac611e59b2] [VIEW_RENDER] themes/public/privacyPolicy
INFO - 2026-03-09 00:22:26 --> [REQ_ID=77ac611e59b2] [MEMORY][commonData:start] 8388608
INFO - 2026-03-09 00:22:26 --> themesMemory usage: 8388608
DEBUG - 2026-03-09 00:22:26 --> [MetaService] slug=privacy-policy pageName=Privacy Policy cacheHit= path=DB
DEBUG - 2026-03-09 00:22:26 --> [REQ_ID=0951aae0f8e9] [FILTER_AFTER]
DEBUG - 2026-03-09 00:22:26 --> [REQ_ID=0951aae0f8e9] [LIFECYCLE][END] status=200 duration_ms=693.03 memory_delta=4194304
INFO - 2026-03-09 00:22:26 --> [REQ_ID=77ac611e59b2] [PERF] Execution time=0.692744
DEBUG - 2026-03-09 00:22:26 --> [REQ_ID=0951aae0f8e9] [REQUEST][END]
INFO - 2026-03-09 00:22:26 --> [REQ_ID=0951aae0f8e9] [PERF] Execution time=0.703324
DEBUG - 2026-03-09 00:26:17 --> [REQ_ID=c24ad3053294] [REQUEST][START] HEAD /
DEBUG - 2026-03-09 00:26:17 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-09 00:26:17 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-09 00:26:17 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-09 00:26:17 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-09 00:26:17 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-09 00:26:35 --> [REQ_ID=860a000524b1] [REQUEST][START] GET /index.php/Management/Marketing/Video-Creator
DEBUG - 2026-03-09 00:26:35 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-09 00:26:35 --> [REQ_ID=860a000524b1] [FILTER_BEFORE] /index.php/Management/Marketing/Video-Creator
DEBUG - 2026-03-09 00:26:35 --> [REQ_ID=860a000524b1] [ROUTE] Controller=\App\Modules\Management\Controllers\MarketingAdminController Method=videoCreator
DEBUG - 2026-03-09 00:26:35 --> [REQ_ID=860a000524b1] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Management/Marketing/Video-Creator
DEBUG - 2026-03-09 00:26:35 --> [CSRF] token name=csrf_test_name hash=6d67f47a7e2e8326b3a66e3f7b5ac80b
DEBUG - 2026-03-09 00:26:35 --> [REQ_ID=860a000524b1] [REQUEST][END]
INFO - 2026-03-09 00:26:35 --> [REQ_ID=860a000524b1] [PERF] Execution time=0.036137
DEBUG - 2026-03-09 00:26:35 --> [REQ_ID=3b36c627fdf2] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-09 00:26:35 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-09 00:26:35 --> [REQ_ID=3b36c627fdf2] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-09 00:26:35 --> [REQ_ID=3b36c627fdf2] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-09 00:26:35 --> [REQ_ID=3b36c627fdf2] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-09 00:26:35 --> [CSRF] token name=csrf_test_name hash=e6374eea93c8f0913873004cec7196f1
DEBUG - 2026-03-09 00:26:35 --> [REQ_ID=889e62c8fe23] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-09 00:26:35 --> [REQ_ID=889e62c8fe23] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-09 00:26:35 --> [REQ_ID=3b36c627fdf2] [FILTER_AFTER]
DEBUG - 2026-03-09 00:26:35 --> [REQ_ID=3b36c627fdf2] [LIFECYCLE][END] status=200 duration_ms=40.33 memory_delta=0
INFO - 2026-03-09 00:26:35 --> [REQ_ID=889e62c8fe23] [PERF] Execution time=0.039574
DEBUG - 2026-03-09 00:26:35 --> [REQ_ID=3b36c627fdf2] [REQUEST][END]
INFO - 2026-03-09 00:26:35 --> [REQ_ID=3b36c627fdf2] [PERF] Execution time=0.057213
DEBUG - 2026-03-09 00:30:49 --> [REQ_ID=2dd8184253ad] [REQUEST][START] GET /index.php/Management/Alerts
DEBUG - 2026-03-09 00:30:49 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-09 00:30:49 --> [REQ_ID=2dd8184253ad] [FILTER_BEFORE] /index.php/Management/Alerts
DEBUG - 2026-03-09 00:30:49 --> [REQ_ID=2dd8184253ad] [ROUTE] Controller=\App\Modules\Management\Controllers\AlertsAdminController Method=index
DEBUG - 2026-03-09 00:30:49 --> [REQ_ID=2dd8184253ad] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Management/Alerts
DEBUG - 2026-03-09 00:30:49 --> [CSRF] token name=csrf_test_name hash=451b3327558f0088dffdad7d7a91bbeb
DEBUG - 2026-03-09 00:30:49 --> [REQ_ID=2dd8184253ad] [REQUEST][END]
INFO - 2026-03-09 00:30:49 --> [REQ_ID=2dd8184253ad] [PERF] Execution time=0.057373
DEBUG - 2026-03-09 00:30:50 --> [REQ_ID=67bee2c73346] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-09 00:30:50 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-09 00:30:50 --> [REQ_ID=67bee2c73346] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-09 00:30:50 --> [REQ_ID=67bee2c73346] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-09 00:30:50 --> [REQ_ID=67bee2c73346] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-09 00:30:50 --> [CSRF] token name=csrf_test_name hash=c78cda43db89dd3d20d4f3d117cd0b77
DEBUG - 2026-03-09 00:30:50 --> [REQ_ID=9dd2856f448f] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-09 00:30:50 --> [REQ_ID=9dd2856f448f] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-09 00:30:50 --> [REQ_ID=67bee2c73346] [FILTER_AFTER]
DEBUG - 2026-03-09 00:30:50 --> [REQ_ID=67bee2c73346] [LIFECYCLE][END] status=200 duration_ms=173.90 memory_delta=0
INFO - 2026-03-09 00:30:50 --> [REQ_ID=9dd2856f448f] [PERF] Execution time=0.173804
DEBUG - 2026-03-09 00:30:50 --> [REQ_ID=67bee2c73346] [REQUEST][END]
INFO - 2026-03-09 00:30:50 --> [REQ_ID=67bee2c73346] [PERF] Execution time=0.185894
DEBUG - 2026-03-09 00:31:17 --> [REQ_ID=c34cb74e6a8e] [REQUEST][START] HEAD /
DEBUG - 2026-03-09 00:31:17 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-09 00:31:17 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-09 00:31:17 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-09 00:31:17 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-09 00:31:17 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-09 00:36:17 --> [REQ_ID=3def506a6cd5] [REQUEST][START] HEAD /
DEBUG - 2026-03-09 00:36:17 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-09 00:36:17 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-09 00:36:17 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-09 00:36:17 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-09 00:36:17 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-09 00:41:17 --> [REQ_ID=6695faf114cf] [REQUEST][START] HEAD /
DEBUG - 2026-03-09 00:41:17 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-09 00:41:17 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-09 00:41:17 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-09 00:41:17 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-09 00:41:17 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-09 00:44:52 --> [REQ_ID=b29deb09ae60] [REQUEST][START] GET /index.php/Preview/Alert/IMNN
DEBUG - 2026-03-09 00:44:52 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-09 00:44:52 --> [REQ_ID=b29deb09ae60] [FILTER_BEFORE] /index.php/Preview/Alert/IMNN
DEBUG - 2026-03-09 00:44:52 --> [REQ_ID=b29deb09ae60] [ROUTE] Controller=\App\Modules\User\Controllers\AlertsController Method=preview
DEBUG - 2026-03-09 00:44:52 --> [REQ_ID=b29deb09ae60] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Preview/Alert/IMNN
DEBUG - 2026-03-09 00:44:52 --> [CSRF] token name=csrf_test_name hash=ae618f398350c8a881155e1107396bcb
DEBUG - 2026-03-09 00:44:52 --> [REQ_ID=bc619e763967] [INIT] App\Modules\User\Controllers\AlertsController::GET
INFO - 2026-03-09 00:44:52 --> [REQ_ID=bc619e763967] [MEMORY][controller-start] 6291456
DEBUG - 2026-03-09 00:44:53 --> [REQ_ID=bc619e763967] [METHOD_ENTRY] preview
DEBUG - 2026-03-09 00:44:53 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-09 00:44:53 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-09 00:44:53 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-09 00:44:53 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-09 00:44:53 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-09 00:44:53 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-09 00:44:53 --> MyMIInvestments: no session user detected; skipping personalized hydration.
DEBUG - 2026-03-09 00:44:53 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-09 00:44:53 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-09 00:44:53 --> MyMIMarketing: Pscrape library not installed; Google search scraping will use fallback.
DEBUG - 2026-03-09 00:44:53 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-09 00:44:53 --> MyMIAlerts: no authenticated user context detected.
DEBUG - 2026-03-09 00:44:53 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-09 00:44:53 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-09 00:44:53 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-09 00:44:53 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-09 00:44:53 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-09 00:44:53 --> [SERVICE] App\Services\BudgetService ::setUserId
INFO - 2026-03-09 00:44:53 --> [REQ_ID=bc619e763967] [MEMORY][commonData:start] 8388608
DEBUG - 2026-03-09 00:44:53 --> MyMIInvestments: no session user detected; skipping personalized hydration.
DEBUG - 2026-03-09 00:44:53 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-09 00:44:53 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-09 00:44:53 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-09 00:44:53 --> MyMIAlerts: no authenticated user context detected.
INFO - 2026-03-09 00:44:53 --> AlertsModel L404 - Alert updated successfully for ID 9368: Array
(
    [price] => 3.24
    [current_price] => 3.24
    [last_updated] => 2026-03-09 00:44:53
    [last_updated_time] => 2026-03-09 00:44:53
)

INFO - 2026-03-09 00:44:53 --> 🔄 Trying AlphaVantage for IMNN...
INFO - 2026-03-09 00:44:53 --> ✅ Alert snapshot inserted for IMNN with trade_id 9368
DEBUG - 2026-03-09 00:44:53 --> [REQ_ID=bc619e763967] [VIEW_RENDER] themes/public/previewAlert
INFO - 2026-03-09 00:44:53 --> [REQ_ID=bc619e763967] [MEMORY][commonData:start] 8388608
INFO - 2026-03-09 00:44:53 --> themesMemory usage: 8388608
DEBUG - 2026-03-09 00:44:53 --> [REQ_ID=b29deb09ae60] [FILTER_AFTER]
DEBUG - 2026-03-09 00:44:53 --> [REQ_ID=b29deb09ae60] [LIFECYCLE][END] status=200 duration_ms=784.71 memory_delta=2097152
INFO - 2026-03-09 00:44:53 --> [REQ_ID=bc619e763967] [PERF] Execution time=0.782799
DEBUG - 2026-03-09 00:44:53 --> [REQ_ID=b29deb09ae60] [REQUEST][END]
INFO - 2026-03-09 00:44:53 --> [REQ_ID=b29deb09ae60] [PERF] Execution time=0.824470
DEBUG - 2026-03-09 00:45:42 --> [REQ_ID=85b181eba96c] [REQUEST][START] GET /index.php/Premium-Features/Due-Diligence-Database
DEBUG - 2026-03-09 00:45:42 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
INFO - 2026-03-09 00:45:42 --> REDIRECTED ROUTE at https://www.mymiwallet.com/Features/Brokerage-Integrations
DEBUG - 2026-03-09 00:45:42 --> [REQ_ID=85b181eba96c] [REQUEST][END]
INFO - 2026-03-09 00:45:42 --> [REQ_ID=85b181eba96c] [PERF] Execution time=0.012389
DEBUG - 2026-03-09 00:46:17 --> [REQ_ID=7f1a902edd78] [REQUEST][START] HEAD /
DEBUG - 2026-03-09 00:46:17 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-09 00:46:17 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-09 00:46:17 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-09 00:46:17 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-09 00:46:17 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-09 00:50:59 --> [REQ_ID=1d44cbb45066] [REQUEST][START] GET /
DEBUG - 2026-03-09 00:50:59 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-09 00:50:59 --> [REQ_ID=1d44cbb45066] [FILTER_BEFORE] /
DEBUG - 2026-03-09 00:50:59 --> [REQ_ID=1d44cbb45066] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-09 00:50:59 --> [REQ_ID=1d44cbb45066] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-09 00:50:59 --> [CSRF] token name=csrf_test_name hash=eea0e5173c131b86117601095023157c
DEBUG - 2026-03-09 00:50:59 --> [REQ_ID=de51edc8b455] [INIT] App\Controllers\Home::GET
INFO - 2026-03-09 00:50:59 --> [REQ_ID=de51edc8b455] [MEMORY][controller-start] 6291456
INFO - 2026-03-09 00:50:59 --> [REQ_ID=de51edc8b455] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-09 00:50:59 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-09 00:51:00 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-03-09 00:51:00 --> [REQ_ID=de51edc8b455] [VIEW_RENDER] themes/public/home
INFO - 2026-03-09 00:51:00 --> [REQ_ID=de51edc8b455] [MEMORY][commonData:start] 10485760
INFO - 2026-03-09 00:51:00 --> themesMemory usage: 10485760
DEBUG - 2026-03-09 00:51:00 --> [MetaService] slug= pageName=Home cacheHit= path=DB
DEBUG - 2026-03-09 00:51:00 --> [REQ_ID=1d44cbb45066] [FILTER_AFTER]
DEBUG - 2026-03-09 00:51:00 --> [REQ_ID=1d44cbb45066] [LIFECYCLE][END] status=200 duration_ms=787.13 memory_delta=4194304
INFO - 2026-03-09 00:51:00 --> [REQ_ID=de51edc8b455] [PERF] Execution time=0.784214
DEBUG - 2026-03-09 00:51:00 --> [REQ_ID=1d44cbb45066] [REQUEST][END]
INFO - 2026-03-09 00:51:00 --> [REQ_ID=1d44cbb45066] [PERF] Execution time=0.838249
DEBUG - 2026-03-09 00:51:17 --> [REQ_ID=c9ad889c5950] [REQUEST][START] HEAD /
DEBUG - 2026-03-09 00:51:17 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-09 00:51:17 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-09 00:51:17 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-09 00:51:17 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-09 00:51:17 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-09 00:53:15 --> [REQ_ID=ac05025656e3] [REQUEST][START] GET /
DEBUG - 2026-03-09 00:53:15 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-09 00:53:15 --> [REQ_ID=ac05025656e3] [FILTER_BEFORE] /
DEBUG - 2026-03-09 00:53:15 --> [REQ_ID=ac05025656e3] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-09 00:53:15 --> [REQ_ID=ac05025656e3] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-09 00:53:15 --> [CSRF] token name=csrf_test_name hash=840e2d322e4de0e0e45c61d691156ed6
DEBUG - 2026-03-09 00:53:15 --> [REQ_ID=8db75112452d] [INIT] App\Controllers\Home::GET
INFO - 2026-03-09 00:53:15 --> [REQ_ID=8db75112452d] [MEMORY][controller-start] 6291456
INFO - 2026-03-09 00:53:15 --> [REQ_ID=8db75112452d] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-09 00:53:15 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-09 00:53:16 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
DEBUG - 2026-03-09 00:53:16 --> [REQ_ID=8db75112452d] [VIEW_RENDER] themes/public/home
INFO - 2026-03-09 00:53:16 --> [REQ_ID=8db75112452d] [MEMORY][commonData:start] 10485760
INFO - 2026-03-09 00:53:16 --> themesMemory usage: 10485760
DEBUG - 2026-03-09 00:53:16 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-09 00:53:16 --> [REQ_ID=ac05025656e3] [FILTER_AFTER]
DEBUG - 2026-03-09 00:53:16 --> [REQ_ID=ac05025656e3] [LIFECYCLE][END] status=200 duration_ms=648.82 memory_delta=4194304
INFO - 2026-03-09 00:53:16 --> [REQ_ID=8db75112452d] [PERF] Execution time=0.646812
DEBUG - 2026-03-09 00:53:16 --> [REQ_ID=ac05025656e3] [REQUEST][END]
INFO - 2026-03-09 00:53:16 --> [REQ_ID=ac05025656e3] [PERF] Execution time=0.686945
DEBUG - 2026-03-09 00:56:17 --> [REQ_ID=0b95032b1a91] [REQUEST][START] HEAD /
DEBUG - 2026-03-09 00:56:17 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-09 00:56:17 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-09 00:56:17 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-09 00:56:17 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-09 00:56:17 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-09 01:00:02 --> [REQ_ID=7a17563767ed] [REQUEST][START] GET /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-09 01:00:02 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-09 01:00:02 --> [REQ_ID=7a17563767ed] [FILTER_BEFORE] /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-09 01:00:02 --> [REQ_ID=7a17563767ed] [ROUTE] Controller=\App\Modules\Management\Controllers\ManagementAPIController Method=Run_CRON_Tasks
DEBUG - 2026-03-09 01:00:02 --> [REQ_ID=7a17563767ed] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-09 01:00:02 --> [REQ_ID=7a17563767ed] [REQUEST][END]
INFO - 2026-03-09 01:00:02 --> [REQ_ID=7a17563767ed] [PERF] Execution time=0.062089
DEBUG - 2026-03-09 01:01:17 --> [REQ_ID=d50caf6ca704] [REQUEST][START] HEAD /
DEBUG - 2026-03-09 01:01:17 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-09 01:01:17 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-09 01:01:17 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-09 01:01:17 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-09 01:01:17 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-09 01:06:17 --> [REQ_ID=dc058bcf544e] [REQUEST][START] HEAD /
DEBUG - 2026-03-09 01:06:17 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-09 01:06:17 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-09 01:06:17 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-09 01:06:17 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-09 01:06:17 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-09 01:11:17 --> [REQ_ID=3e8fbc40a0a6] [REQUEST][START] HEAD /
DEBUG - 2026-03-09 01:11:17 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-09 01:11:17 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-09 01:11:17 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-09 01:11:17 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-09 01:11:17 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-09 01:15:01 --> [REQ_ID=90f7659f9a94] [REQUEST][START] GET /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-09 01:15:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-09 01:15:01 --> [REQ_ID=90f7659f9a94] [FILTER_BEFORE] /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-09 01:15:01 --> [REQ_ID=90f7659f9a94] [ROUTE] Controller=\App\Modules\APIs\Controllers\AlertsAPIController Method=fetchEmailAlerts
DEBUG - 2026-03-09 01:15:01 --> [REQ_ID=90f7659f9a94] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-09 01:15:01 --> [REQ_ID=90f7659f9a94] [REQUEST][END]
INFO - 2026-03-09 01:15:01 --> [REQ_ID=90f7659f9a94] [PERF] Execution time=0.054389
DEBUG - 2026-03-09 01:16:17 --> [REQ_ID=39bcf33cfc26] [REQUEST][START] HEAD /
DEBUG - 2026-03-09 01:16:17 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-09 01:16:17 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-09 01:16:17 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-09 01:16:17 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-09 01:16:17 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-09 01:21:01 --> [REQ_ID=da0a1a0da9f4] [REQUEST][START] GET /
DEBUG - 2026-03-09 01:21:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-09 01:21:01 --> [REQ_ID=da0a1a0da9f4] [FILTER_BEFORE] /
DEBUG - 2026-03-09 01:21:01 --> [REQ_ID=da0a1a0da9f4] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-09 01:21:01 --> [REQ_ID=da0a1a0da9f4] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-09 01:21:01 --> [CSRF] token name=csrf_test_name hash=51e6e32f546eb8217ddfa6856e946fba
DEBUG - 2026-03-09 01:21:01 --> [REQ_ID=11ba376001d4] [INIT] App\Controllers\Home::GET
INFO - 2026-03-09 01:21:01 --> [REQ_ID=11ba376001d4] [MEMORY][controller-start] 6291456
INFO - 2026-03-09 01:21:01 --> [REQ_ID=11ba376001d4] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-09 01:21:01 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-09 01:21:02 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-03-09 01:21:02 --> [REQ_ID=11ba376001d4] [VIEW_RENDER] themes/public/home
INFO - 2026-03-09 01:21:02 --> [REQ_ID=11ba376001d4] [MEMORY][commonData:start] 10485760
INFO - 2026-03-09 01:21:02 --> themesMemory usage: 10485760
DEBUG - 2026-03-09 01:21:02 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-09 01:21:02 --> [REQ_ID=da0a1a0da9f4] [FILTER_AFTER]
DEBUG - 2026-03-09 01:21:02 --> [REQ_ID=da0a1a0da9f4] [LIFECYCLE][END] status=200 duration_ms=773.62 memory_delta=4194304
INFO - 2026-03-09 01:21:02 --> [REQ_ID=11ba376001d4] [PERF] Execution time=0.771296
DEBUG - 2026-03-09 01:21:02 --> [REQ_ID=da0a1a0da9f4] [REQUEST][END]
INFO - 2026-03-09 01:21:02 --> [REQ_ID=da0a1a0da9f4] [PERF] Execution time=0.814447
DEBUG - 2026-03-09 01:21:17 --> [REQ_ID=5f3b7465b94b] [REQUEST][START] GET /index.php/Support/Account
DEBUG - 2026-03-09 01:21:17 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-09 01:21:17 --> [REQ_ID=5f3b7465b94b] [FILTER_BEFORE] /index.php/Support/Account
DEBUG - 2026-03-09 01:21:17 --> [REQ_ID=5f3b7465b94b] [ROUTE] Controller=\App\Modules\Support\Controllers\AccountSupportController Method=index
DEBUG - 2026-03-09 01:21:17 --> [REQ_ID=5f3b7465b94b] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Support/Account
DEBUG - 2026-03-09 01:21:17 --> [CSRF] token name=csrf_test_name hash=fc14d639b34c820b52ff026364c72b37
DEBUG - 2026-03-09 01:21:17 --> [REQ_ID=bf0f3896f52a] [INIT] App\Modules\Support\Controllers\AccountSupportController::GET
INFO - 2026-03-09 01:21:17 --> [REQ_ID=bf0f3896f52a] [MEMORY][controller-start] 6291456
DEBUG - 2026-03-09 01:21:17 --> [REQ_ID=bf0f3896f52a] [METHOD_ENTRY] index
DEBUG - 2026-03-09 01:21:17 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-09 01:21:17 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-09 01:21:17 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-09 01:21:17 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-09 01:21:17 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-09 01:21:17 --> MyMICoin: guest context detected; skipping user-specific preload.
INFO - 2026-03-09 01:21:17 --> [REQ_ID=bf0f3896f52a] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-09 01:21:17 --> [REQ_ID=bf0f3896f52a] [VIEW_RENDER] SupportModule/Support/account_help
INFO - 2026-03-09 01:21:17 --> [REQ_ID=bf0f3896f52a] [MEMORY][commonData:start] 6291456
INFO - 2026-03-09 01:21:17 --> themesMemory usage: 6291456
DEBUG - 2026-03-09 01:21:17 --> [REQ_ID=5f3b7465b94b] [FILTER_AFTER]
DEBUG - 2026-03-09 01:21:17 --> [REQ_ID=5f3b7465b94b] [LIFECYCLE][END] status=200 duration_ms=78.53 memory_delta=0
INFO - 2026-03-09 01:21:17 --> [REQ_ID=bf0f3896f52a] [PERF] Execution time=0.078159
DEBUG - 2026-03-09 01:21:17 --> [REQ_ID=5f3b7465b94b] [REQUEST][END]
INFO - 2026-03-09 01:21:17 --> [REQ_ID=5f3b7465b94b] [PERF] Execution time=0.092325
DEBUG - 2026-03-09 01:21:17 --> [REQ_ID=055397cd31fd] [REQUEST][START] HEAD /
DEBUG - 2026-03-09 01:21:17 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-09 01:21:17 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-09 01:21:17 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-09 01:21:17 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-09 01:21:17 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-09 01:24:41 --> [REQ_ID=2e525cf17371] [REQUEST][START] GET /index.php/How-It-Works/Automated-Financial-Insights
DEBUG - 2026-03-09 01:24:41 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-09 01:24:41 --> [REQ_ID=2e525cf17371] [FILTER_BEFORE] /index.php/How-It-Works/Automated-Financial-Insights
DEBUG - 2026-03-09 01:24:41 --> [REQ_ID=2e525cf17371] [ROUTE] Controller=\App\Modules\Blog\Controllers\HowItWorksController Method=show
DEBUG - 2026-03-09 01:24:41 --> [REQ_ID=2e525cf17371] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/How-It-Works/Automated-Financial-Insights
DEBUG - 2026-03-09 01:24:41 --> [CSRF] token name=csrf_test_name hash=a790d2a13fa2d63336970550d33bf747
DEBUG - 2026-03-09 01:24:41 --> [REQ_ID=dfd0fec4c639] [INIT] App\Modules\Blog\Controllers\HowItWorksController::GET
INFO - 2026-03-09 01:24:41 --> [REQ_ID=dfd0fec4c639] [MEMORY][controller-start] 6291456
DEBUG - 2026-03-09 01:24:41 --> [REQ_ID=dfd0fec4c639] [METHOD_ENTRY] show
DEBUG - 2026-03-09 01:24:41 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-09 01:24:41 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-09 01:24:41 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-09 01:24:41 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-09 01:24:41 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-09 01:24:41 --> MyMICoin: guest context detected; skipping user-specific preload.
ERROR - 2026-03-09 01:24:41 --> HowItWorksController failure: automated-financial-insights
CRITICAL - 2026-03-09 01:24:41 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: GET, Route: How-It-Works/Automated-Financial-Insights]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-09 01:24:41 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-09 01:24:41 --> [404] URI=https://www.mymiwallet.com/index.php/How-It-Works/Automated-Financial-Insights
WARNING - 2026-03-09 01:24:41 --> 404 route miss: https://www.mymiwallet.com/index.php/How-It-Works/Automated-Financial-Insights | referrer: none
INFO - 2026-03-09 01:24:41 --> [REQ_ID=dfd0fec4c639] [PERF] Execution time=0.212468
DEBUG - 2026-03-09 01:26:17 --> [REQ_ID=19c12882de88] [REQUEST][START] HEAD /
DEBUG - 2026-03-09 01:26:17 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-09 01:26:17 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-09 01:26:17 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-09 01:26:17 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-09 01:26:17 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-09 01:31:10 --> [REQ_ID=84dcd77111d9] [REQUEST][START] GET /index.php/How-It-Works/overview
DEBUG - 2026-03-09 01:31:10 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-09 01:31:10 --> [REQ_ID=84dcd77111d9] [FILTER_BEFORE] /index.php/How-It-Works/overview
DEBUG - 2026-03-09 01:31:10 --> [REQ_ID=84dcd77111d9] [ROUTE] Controller=\App\Modules\Blog\Controllers\HowItWorksController Method=show
DEBUG - 2026-03-09 01:31:10 --> [REQ_ID=84dcd77111d9] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/How-It-Works/overview
DEBUG - 2026-03-09 01:31:10 --> [CSRF] token name=csrf_test_name hash=4f266814280d4bb1e3e68310266d9b46
DEBUG - 2026-03-09 01:31:10 --> [REQ_ID=caa423f00326] [INIT] App\Modules\Blog\Controllers\HowItWorksController::GET
INFO - 2026-03-09 01:31:10 --> [REQ_ID=caa423f00326] [MEMORY][controller-start] 6291456
DEBUG - 2026-03-09 01:31:10 --> [REQ_ID=caa423f00326] [METHOD_ENTRY] show
DEBUG - 2026-03-09 01:31:10 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-09 01:31:10 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-09 01:31:10 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-09 01:31:10 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-09 01:31:10 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-09 01:31:10 --> MyMICoin: guest context detected; skipping user-specific preload.
ERROR - 2026-03-09 01:31:10 --> HowItWorksController failure: overview
CRITICAL - 2026-03-09 01:31:10 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: GET, Route: How-It-Works/overview]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-09 01:31:10 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-09 01:31:10 --> [404] URI=https://www.mymiwallet.com/index.php/How-It-Works/overview
WARNING - 2026-03-09 01:31:10 --> 404 route miss: https://www.mymiwallet.com/index.php/How-It-Works/overview | referrer: none
ERROR - 2026-03-09 01:31:10 --> [ERROR_PAGE] event=error_404 status=404 message=Page not found.
INFO - 2026-03-09 01:31:10 --> [REQ_ID=caa423f00326] [PERF] Execution time=0.217108
DEBUG - 2026-03-09 01:31:16 --> [REQ_ID=d17d6c0d1ef6] [REQUEST][START] GET /index.php/Support
DEBUG - 2026-03-09 01:31:16 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-09 01:31:16 --> [REQ_ID=d17d6c0d1ef6] [FILTER_BEFORE] /index.php/Support
DEBUG - 2026-03-09 01:31:16 --> [REQ_ID=d17d6c0d1ef6] [ROUTE] Controller=\App\Modules\Support\Controllers\SupportController Method=index
DEBUG - 2026-03-09 01:31:16 --> [REQ_ID=d17d6c0d1ef6] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Support
DEBUG - 2026-03-09 01:31:16 --> [CSRF] token name=csrf_test_name hash=08b167c3f7738ba68d8edb0f9803d578
DEBUG - 2026-03-09 01:31:16 --> [REQ_ID=c63f0cdb29b6] [INIT] App\Modules\Support\Controllers\SupportController::GET
INFO - 2026-03-09 01:31:16 --> [REQ_ID=c63f0cdb29b6] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-09 01:31:16 --> [REQ_ID=c63f0cdb29b6] [METHOD_ENTRY] index
DEBUG - 2026-03-09 01:31:16 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-09 01:31:16 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-09 01:31:16 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-09 01:31:16 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-09 01:31:16 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-09 01:31:16 --> MyMICoin: guest context detected; skipping user-specific preload.
INFO - 2026-03-09 01:31:16 --> [REQ_ID=c63f0cdb29b6] [MEMORY][commonData:start] 4194304
DEBUG - 2026-03-09 01:31:16 --> [REQ_ID=c63f0cdb29b6] [VIEW_RENDER] SupportModule\Views\Support\index
INFO - 2026-03-09 01:31:16 --> [REQ_ID=c63f0cdb29b6] [MEMORY][commonData:start] 4194304
INFO - 2026-03-09 01:31:16 --> themesMemory usage: 4194304
DEBUG - 2026-03-09 01:31:16 --> [REQ_ID=d17d6c0d1ef6] [FILTER_AFTER]
DEBUG - 2026-03-09 01:31:16 --> [REQ_ID=d17d6c0d1ef6] [LIFECYCLE][END] status=200 duration_ms=34.64 memory_delta=0
INFO - 2026-03-09 01:31:16 --> [REQ_ID=c63f0cdb29b6] [PERF] Execution time=0.034441
DEBUG - 2026-03-09 01:31:16 --> [REQ_ID=d17d6c0d1ef6] [REQUEST][END]
INFO - 2026-03-09 01:31:16 --> [REQ_ID=d17d6c0d1ef6] [PERF] Execution time=0.049936
DEBUG - 2026-03-09 01:31:17 --> [REQ_ID=7cf7aba9f367] [REQUEST][START] HEAD /
DEBUG - 2026-03-09 01:31:17 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-09 01:31:17 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-09 01:31:17 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-09 01:31:17 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-09 01:31:17 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-09 02:00:01 --> [REQ_ID=8ac5fba62012] [REQUEST][START] GET /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-09 02:00:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-09 02:00:01 --> [REQ_ID=8ac5fba62012] [FILTER_BEFORE] /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-09 02:00:01 --> [REQ_ID=8ac5fba62012] [ROUTE] Controller=\App\Modules\Management\Controllers\ManagementAPIController Method=Run_CRON_Tasks
DEBUG - 2026-03-09 02:00:01 --> [REQ_ID=8ac5fba62012] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-09 02:00:01 --> [REQ_ID=8ac5fba62012] [REQUEST][END]
INFO - 2026-03-09 02:00:01 --> [REQ_ID=8ac5fba62012] [PERF] Execution time=0.048427
DEBUG - 2026-03-09 02:01:22 --> [REQ_ID=fef5e3958159] [REQUEST][START] HEAD /
DEBUG - 2026-03-09 02:01:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-09 02:01:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-09 02:01:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-09 02:01:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-09 02:01:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-09 02:04:05 --> [REQ_ID=9dcf1454c4bf] [REQUEST][START] GET /index.php/Investments/Watchlist
DEBUG - 2026-03-09 02:04:05 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-09 02:04:06 --> [REQ_ID=9dcf1454c4bf] [FILTER_BEFORE] /index.php/Investments/Watchlist
DEBUG - 2026-03-09 02:04:06 --> [REQ_ID=9dcf1454c4bf] [ROUTE] Controller=\App\Modules\User\Controllers\InvestmentsController Method=watchlist
DEBUG - 2026-03-09 02:04:06 --> [REQ_ID=9dcf1454c4bf] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Investments/Watchlist
DEBUG - 2026-03-09 02:04:06 --> [CSRF] token name=csrf_test_name hash=ecdc471cafda590887ea2fd6cf127f68
DEBUG - 2026-03-09 02:04:06 --> [REQ_ID=9dcf1454c4bf] [REQUEST][END]
INFO - 2026-03-09 02:04:06 --> [REQ_ID=9dcf1454c4bf] [PERF] Execution time=0.077048
DEBUG - 2026-03-09 02:04:06 --> [REQ_ID=7781800a451a] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-09 02:04:06 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-09 02:04:06 --> [REQ_ID=7781800a451a] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-09 02:04:06 --> [REQ_ID=7781800a451a] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-09 02:04:06 --> [REQ_ID=7781800a451a] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-09 02:04:06 --> [CSRF] token name=csrf_test_name hash=51e1a2678605152f081343cc1b8db894
DEBUG - 2026-03-09 02:04:06 --> [REQ_ID=f0bc039200a6] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-09 02:04:06 --> [REQ_ID=f0bc039200a6] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-09 02:04:06 --> [REQ_ID=7781800a451a] [FILTER_AFTER]
DEBUG - 2026-03-09 02:04:06 --> [REQ_ID=7781800a451a] [LIFECYCLE][END] status=200 duration_ms=111.15 memory_delta=0
INFO - 2026-03-09 02:04:06 --> [REQ_ID=f0bc039200a6] [PERF] Execution time=0.110678
DEBUG - 2026-03-09 02:04:06 --> [REQ_ID=7781800a451a] [REQUEST][END]
INFO - 2026-03-09 02:04:06 --> [REQ_ID=7781800a451a] [PERF] Execution time=0.122938
DEBUG - 2026-03-09 02:06:17 --> [REQ_ID=68b1aa163e94] [REQUEST][START] HEAD /
DEBUG - 2026-03-09 02:06:17 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-09 02:06:17 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-09 02:06:17 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-09 02:06:17 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-09 02:06:17 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-09 02:11:16 --> [REQ_ID=e88242acc840] [REQUEST][START] HEAD /
DEBUG - 2026-03-09 02:11:16 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-09 02:11:16 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-09 02:11:16 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-09 02:11:16 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-09 02:11:16 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://mymiwallet.com/
DEBUG - 2026-03-09 02:11:17 --> [REQ_ID=7271ba89d1da] [REQUEST][START] HEAD /
DEBUG - 2026-03-09 02:11:17 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-09 02:11:17 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-09 02:11:17 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-09 02:11:17 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-09 02:11:17 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-09 02:15:02 --> [REQ_ID=f3e032545913] [REQUEST][START] GET /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-09 02:15:02 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-09 02:15:02 --> [REQ_ID=f3e032545913] [FILTER_BEFORE] /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-09 02:15:02 --> [REQ_ID=f3e032545913] [ROUTE] Controller=\App\Modules\APIs\Controllers\AlertsAPIController Method=fetchEmailAlerts
DEBUG - 2026-03-09 02:15:02 --> [REQ_ID=f3e032545913] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-09 02:15:02 --> [REQ_ID=f3e032545913] [REQUEST][END]
INFO - 2026-03-09 02:15:02 --> [REQ_ID=f3e032545913] [PERF] Execution time=0.047315
DEBUG - 2026-03-09 02:16:17 --> [REQ_ID=b9a2d7112903] [REQUEST][START] HEAD /
DEBUG - 2026-03-09 02:16:17 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-09 02:16:17 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-09 02:16:17 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-09 02:16:17 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-09 02:16:17 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-09 02:21:17 --> [REQ_ID=1e3a10f763db] [REQUEST][START] HEAD /
DEBUG - 2026-03-09 02:21:17 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-09 02:21:17 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-09 02:21:17 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-09 02:21:17 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-09 02:21:17 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-09 02:26:17 --> [REQ_ID=db2c2352b33c] [REQUEST][START] HEAD /
DEBUG - 2026-03-09 02:26:17 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-09 02:26:17 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-09 02:26:17 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-09 02:26:17 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-09 02:26:17 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-09 02:31:17 --> [REQ_ID=84ddffb33c78] [REQUEST][START] HEAD /
DEBUG - 2026-03-09 02:31:17 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-09 02:31:17 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-09 02:31:17 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-09 02:31:17 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-09 02:31:17 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-09 02:32:06 --> [REQ_ID=a2c672425f9b] [REQUEST][START] GET /index.php/Customer-Support
DEBUG - 2026-03-09 02:32:06 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-09 02:32:06 --> [REQ_ID=a2c672425f9b] [FILTER_BEFORE] /index.php/Customer-Support
DEBUG - 2026-03-09 02:32:06 --> [REQ_ID=a2c672425f9b] [ROUTE] Controller=\App\Controllers\App\Modules\Support\Controllers\SupportController Method=index
DEBUG - 2026-03-09 02:32:06 --> [REQ_ID=a2c672425f9b] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Customer-Support
DEBUG - 2026-03-09 02:32:06 --> [CSRF] token name=csrf_test_name hash=b8e61310c89f4cb0e2e749802b25ca39
DEBUG - 2026-03-09 02:32:06 --> [REQ_ID=a2c672425f9b] [REQUEST][END]
INFO - 2026-03-09 02:32:06 --> [REQ_ID=a2c672425f9b] [PERF] Execution time=0.023059
DEBUG - 2026-03-09 02:32:07 --> [REQ_ID=3305c07bf34e] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-09 02:32:07 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-09 02:32:07 --> [REQ_ID=3305c07bf34e] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-09 02:32:07 --> [REQ_ID=3305c07bf34e] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-09 02:32:07 --> [REQ_ID=3305c07bf34e] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-09 02:32:07 --> [CSRF] token name=csrf_test_name hash=9d854bbe69f5074374f5e5116f71f86e
DEBUG - 2026-03-09 02:32:07 --> [REQ_ID=281a8455f507] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-09 02:32:07 --> [REQ_ID=281a8455f507] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-09 02:32:07 --> [REQ_ID=3305c07bf34e] [FILTER_AFTER]
DEBUG - 2026-03-09 02:32:07 --> [REQ_ID=3305c07bf34e] [LIFECYCLE][END] status=200 duration_ms=55.72 memory_delta=0
INFO - 2026-03-09 02:32:07 --> [REQ_ID=281a8455f507] [PERF] Execution time=0.055516
DEBUG - 2026-03-09 02:32:07 --> [REQ_ID=3305c07bf34e] [REQUEST][END]
INFO - 2026-03-09 02:32:07 --> [REQ_ID=3305c07bf34e] [PERF] Execution time=0.071246
DEBUG - 2026-03-09 02:36:17 --> [REQ_ID=105248ecb02b] [REQUEST][START] HEAD /
DEBUG - 2026-03-09 02:36:17 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-09 02:36:17 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-09 02:36:17 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-09 02:36:17 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-09 02:36:17 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-09 02:36:34 --> [REQ_ID=fa8ab3f4069e] [REQUEST][START] GET /
DEBUG - 2026-03-09 02:36:34 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-09 02:36:34 --> [REQ_ID=fa8ab3f4069e] [FILTER_BEFORE] /
DEBUG - 2026-03-09 02:36:34 --> [REQ_ID=fa8ab3f4069e] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-09 02:36:34 --> [REQ_ID=fa8ab3f4069e] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-09 02:36:34 --> [CSRF] token name=csrf_test_name hash=3664bbcb5214a8fc2e922f8816d86ba4
DEBUG - 2026-03-09 02:36:34 --> [REQ_ID=190776f1ba3e] [INIT] App\Controllers\Home::GET
INFO - 2026-03-09 02:36:34 --> [REQ_ID=190776f1ba3e] [MEMORY][controller-start] 4194304
INFO - 2026-03-09 02:36:34 --> [REQ_ID=190776f1ba3e] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-09 02:36:34 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-09 02:36:34 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-03-09 02:36:34 --> [REQ_ID=190776f1ba3e] [VIEW_RENDER] themes/public/home
INFO - 2026-03-09 02:36:34 --> [REQ_ID=190776f1ba3e] [MEMORY][commonData:start] 8388608
INFO - 2026-03-09 02:36:34 --> themesMemory usage: 8388608
DEBUG - 2026-03-09 02:36:35 --> [MetaService] slug= pageName=Home cacheHit= path=DB
DEBUG - 2026-03-09 02:36:35 --> [REQ_ID=fa8ab3f4069e] [FILTER_AFTER]
DEBUG - 2026-03-09 02:36:35 --> [REQ_ID=fa8ab3f4069e] [LIFECYCLE][END] status=200 duration_ms=642.37 memory_delta=4194304
INFO - 2026-03-09 02:36:35 --> [REQ_ID=190776f1ba3e] [PERF] Execution time=0.640763
DEBUG - 2026-03-09 02:36:35 --> [REQ_ID=fa8ab3f4069e] [REQUEST][END]
INFO - 2026-03-09 02:36:35 --> [REQ_ID=fa8ab3f4069e] [PERF] Execution time=0.663566
DEBUG - 2026-03-09 02:41:17 --> [REQ_ID=914421b8d775] [REQUEST][START] HEAD /
DEBUG - 2026-03-09 02:41:17 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-09 02:41:17 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-09 02:41:17 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-09 02:41:17 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-09 02:41:17 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-09 02:41:42 --> [REQ_ID=ddfa5ace2e9c] [REQUEST][START] GET /index.php/How-It-Works/MyMI-Exchange
DEBUG - 2026-03-09 02:41:42 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-09 02:41:42 --> [REQ_ID=ddfa5ace2e9c] [FILTER_BEFORE] /index.php/How-It-Works/MyMI-Exchange
DEBUG - 2026-03-09 02:41:42 --> [REQ_ID=ddfa5ace2e9c] [ROUTE] Controller=\App\Modules\Blog\Controllers\HowItWorksController Method=show
DEBUG - 2026-03-09 02:41:42 --> [REQ_ID=ddfa5ace2e9c] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/How-It-Works/MyMI-Exchange
DEBUG - 2026-03-09 02:41:42 --> [CSRF] token name=csrf_test_name hash=ebf54dfa6cb197549e79b95611bebc3e
DEBUG - 2026-03-09 02:41:42 --> [REQ_ID=1e1028e6c666] [INIT] App\Modules\Blog\Controllers\HowItWorksController::GET
INFO - 2026-03-09 02:41:42 --> [REQ_ID=1e1028e6c666] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-09 02:41:42 --> [REQ_ID=1e1028e6c666] [METHOD_ENTRY] show
DEBUG - 2026-03-09 02:41:42 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-09 02:41:42 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-09 02:41:42 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-09 02:41:42 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-09 02:41:42 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-09 02:41:42 --> MyMICoin: guest context detected; skipping user-specific preload.
ERROR - 2026-03-09 02:41:42 --> HowItWorksController failure: Call to undefined method App\Modules\Blog\Controllers\HowItWorksController::respondWithRendered()
INFO - 2026-03-09 02:41:42 --> [REQ_ID=1e1028e6c666] [PERF] Execution time=0.085668
DEBUG - 2026-03-09 02:41:42 --> [REQ_ID=a266a7edcc29] [REQUEST][START] GET /index.php/Support
DEBUG - 2026-03-09 02:41:42 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-09 02:41:42 --> [REQ_ID=a266a7edcc29] [FILTER_BEFORE] /index.php/Support
DEBUG - 2026-03-09 02:41:42 --> [REQ_ID=a266a7edcc29] [ROUTE] Controller=\App\Modules\Support\Controllers\SupportController Method=index
DEBUG - 2026-03-09 02:41:42 --> [REQ_ID=a266a7edcc29] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Support
DEBUG - 2026-03-09 02:41:42 --> [CSRF] token name=csrf_test_name hash=db8154c8d0df882ce2517a96fee31a5a
DEBUG - 2026-03-09 02:41:42 --> [REQ_ID=2aa666698ba7] [INIT] App\Modules\Support\Controllers\SupportController::GET
INFO - 2026-03-09 02:41:42 --> [REQ_ID=2aa666698ba7] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-09 02:41:42 --> [REQ_ID=2aa666698ba7] [METHOD_ENTRY] index
DEBUG - 2026-03-09 02:41:42 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-09 02:41:42 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-09 02:41:42 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-09 02:41:42 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-09 02:41:42 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-09 02:41:42 --> MyMICoin: guest context detected; skipping user-specific preload.
INFO - 2026-03-09 02:41:42 --> [REQ_ID=2aa666698ba7] [MEMORY][commonData:start] 4194304
DEBUG - 2026-03-09 02:41:42 --> [REQ_ID=2aa666698ba7] [VIEW_RENDER] SupportModule\Views\Support\index
INFO - 2026-03-09 02:41:42 --> [REQ_ID=2aa666698ba7] [MEMORY][commonData:start] 4194304
INFO - 2026-03-09 02:41:42 --> themesMemory usage: 4194304
DEBUG - 2026-03-09 02:41:42 --> [REQ_ID=a266a7edcc29] [FILTER_AFTER]
DEBUG - 2026-03-09 02:41:42 --> [REQ_ID=a266a7edcc29] [LIFECYCLE][END] status=200 duration_ms=40.69 memory_delta=0
INFO - 2026-03-09 02:41:42 --> [REQ_ID=2aa666698ba7] [PERF] Execution time=0.040562
DEBUG - 2026-03-09 02:41:42 --> [REQ_ID=a266a7edcc29] [REQUEST][END]
INFO - 2026-03-09 02:41:42 --> [REQ_ID=a266a7edcc29] [PERF] Execution time=0.055834
DEBUG - 2026-03-09 02:46:17 --> [REQ_ID=f10ca72e3955] [REQUEST][START] HEAD /
DEBUG - 2026-03-09 02:46:17 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-09 02:46:17 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-09 02:46:17 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-09 02:46:17 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-09 02:46:17 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-09 02:51:17 --> [REQ_ID=764546d86eda] [REQUEST][START] HEAD /
DEBUG - 2026-03-09 02:51:17 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-09 02:51:17 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-09 02:51:17 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-09 02:51:17 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-09 02:51:17 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-09 02:56:17 --> [REQ_ID=16cccaff5ca2] [REQUEST][START] HEAD /
DEBUG - 2026-03-09 02:56:17 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-09 02:56:17 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-09 02:56:17 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-09 02:56:17 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-09 02:56:17 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-09 03:00:02 --> [REQ_ID=0d1dee7e21c5] [REQUEST][START] GET /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-09 03:00:02 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-09 03:00:02 --> [REQ_ID=0d1dee7e21c5] [FILTER_BEFORE] /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-09 03:00:02 --> [REQ_ID=0d1dee7e21c5] [ROUTE] Controller=\App\Modules\Management\Controllers\ManagementAPIController Method=Run_CRON_Tasks
DEBUG - 2026-03-09 03:00:02 --> [REQ_ID=0d1dee7e21c5] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-09 03:00:02 --> [REQ_ID=0d1dee7e21c5] [REQUEST][END]
INFO - 2026-03-09 03:00:02 --> [REQ_ID=0d1dee7e21c5] [PERF] Execution time=0.052394
DEBUG - 2026-03-09 03:01:17 --> [REQ_ID=63fae3c2712f] [REQUEST][START] HEAD /
DEBUG - 2026-03-09 03:01:17 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-09 03:01:17 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-09 03:01:17 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-09 03:01:17 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-09 03:01:17 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-09 03:05:52 --> [REQ_ID=74e0eb54e84d] [REQUEST][START] GET /index.php/Investments/Reports
DEBUG - 2026-03-09 03:05:52 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
INFO - 2026-03-09 03:05:52 --> REDIRECTED ROUTE at https://www.mymiwallet.com/Investments/Trade-Tracker
DEBUG - 2026-03-09 03:05:52 --> [REQ_ID=74e0eb54e84d] [REQUEST][END]
INFO - 2026-03-09 03:05:52 --> [REQ_ID=74e0eb54e84d] [PERF] Execution time=0.039094
DEBUG - 2026-03-09 03:06:17 --> [REQ_ID=6bd1048be0a9] [REQUEST][START] HEAD /
DEBUG - 2026-03-09 03:06:17 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-09 03:06:17 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-09 03:06:17 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-09 03:06:17 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-09 03:06:17 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-09 03:11:17 --> [REQ_ID=f9655b731f8f] [REQUEST][START] HEAD /
DEBUG - 2026-03-09 03:11:17 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-09 03:11:17 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-09 03:11:17 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-09 03:11:17 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-09 03:11:17 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-09 03:15:02 --> [REQ_ID=bf3310469540] [REQUEST][START] GET /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-09 03:15:02 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-09 03:15:02 --> [REQ_ID=bf3310469540] [FILTER_BEFORE] /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-09 03:15:02 --> [REQ_ID=bf3310469540] [ROUTE] Controller=\App\Modules\APIs\Controllers\AlertsAPIController Method=fetchEmailAlerts
DEBUG - 2026-03-09 03:15:02 --> [REQ_ID=bf3310469540] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-09 03:15:02 --> [REQ_ID=bf3310469540] [REQUEST][END]
INFO - 2026-03-09 03:15:02 --> [REQ_ID=bf3310469540] [PERF] Execution time=0.045073
DEBUG - 2026-03-09 03:16:17 --> [REQ_ID=25d6303be64e] [REQUEST][START] HEAD /
DEBUG - 2026-03-09 03:16:17 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-09 03:16:17 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-09 03:16:17 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-09 03:16:17 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-09 03:16:17 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-09 03:21:17 --> [REQ_ID=bad81ce787bf] [REQUEST][START] HEAD /
DEBUG - 2026-03-09 03:21:17 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-09 03:21:17 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-09 03:21:17 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-09 03:21:17 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-09 03:21:17 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-09 03:26:17 --> [REQ_ID=8819a252b5af] [REQUEST][START] HEAD /
DEBUG - 2026-03-09 03:26:17 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-09 03:26:17 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-09 03:26:17 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-09 03:26:17 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-09 03:26:17 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-09 03:31:17 --> [REQ_ID=99595d2262db] [REQUEST][START] HEAD /
DEBUG - 2026-03-09 03:31:17 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-09 03:31:17 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-09 03:31:17 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-09 03:31:17 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-09 03:31:17 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-09 03:32:39 --> [REQ_ID=e2488f28e4ec] [REQUEST][START] GET /index.php/Account/Billing
DEBUG - 2026-03-09 03:32:39 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-09 03:32:39 --> [REQ_ID=e2488f28e4ec] [FILTER_BEFORE] /index.php/Account/Billing
DEBUG - 2026-03-09 03:32:39 --> [REQ_ID=e2488f28e4ec] [ROUTE] Controller=\App\Modules\User\Controllers\DashboardController Method=billing
DEBUG - 2026-03-09 03:32:39 --> [REQ_ID=e2488f28e4ec] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Account/Billing
DEBUG - 2026-03-09 03:32:39 --> [CSRF] token name=csrf_test_name hash=943df9ef40ae3cc783878377854e35a2
DEBUG - 2026-03-09 03:32:39 --> [REQ_ID=e2488f28e4ec] [REQUEST][END]
INFO - 2026-03-09 03:32:39 --> [REQ_ID=e2488f28e4ec] [PERF] Execution time=0.030429
DEBUG - 2026-03-09 03:32:40 --> [REQ_ID=b4b3d4262c2e] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-09 03:32:40 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-09 03:32:40 --> [REQ_ID=b4b3d4262c2e] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-09 03:32:40 --> [REQ_ID=b4b3d4262c2e] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-09 03:32:40 --> [REQ_ID=b4b3d4262c2e] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-09 03:32:40 --> [CSRF] token name=csrf_test_name hash=dbaf93c573278ffc75a59e02c2d942e0
DEBUG - 2026-03-09 03:32:40 --> [REQ_ID=bbdc1a018eb3] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-09 03:32:40 --> [REQ_ID=bbdc1a018eb3] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-09 03:32:40 --> [REQ_ID=b4b3d4262c2e] [FILTER_AFTER]
DEBUG - 2026-03-09 03:32:40 --> [REQ_ID=b4b3d4262c2e] [LIFECYCLE][END] status=200 duration_ms=125.97 memory_delta=0
INFO - 2026-03-09 03:32:40 --> [REQ_ID=bbdc1a018eb3] [PERF] Execution time=0.125730
DEBUG - 2026-03-09 03:32:40 --> [REQ_ID=b4b3d4262c2e] [REQUEST][END]
INFO - 2026-03-09 03:32:40 --> [REQ_ID=b4b3d4262c2e] [PERF] Execution time=0.137408
DEBUG - 2026-03-09 03:33:07 --> [REQ_ID=c6c254f1e79e] [REQUEST][START] GET /index.php/Investments
DEBUG - 2026-03-09 03:33:07 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-09 03:33:07 --> [REQ_ID=c6c254f1e79e] [FILTER_BEFORE] /index.php/Investments
DEBUG - 2026-03-09 03:33:07 --> [REQ_ID=c6c254f1e79e] [ROUTE] Controller=\App\Modules\User\Controllers\InvestmentsController Method=index
DEBUG - 2026-03-09 03:33:07 --> [REQ_ID=c6c254f1e79e] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Investments
DEBUG - 2026-03-09 03:33:07 --> [CSRF] token name=csrf_test_name hash=fc8133a0bc8728792df7d4edcb1ac42c
DEBUG - 2026-03-09 03:33:07 --> [REQ_ID=c6c254f1e79e] [REQUEST][END]
INFO - 2026-03-09 03:33:07 --> [REQ_ID=c6c254f1e79e] [PERF] Execution time=0.015448
DEBUG - 2026-03-09 03:33:12 --> [REQ_ID=286db78fdd71] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-09 03:33:12 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-09 03:33:12 --> [REQ_ID=286db78fdd71] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-09 03:33:12 --> [REQ_ID=286db78fdd71] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-09 03:33:12 --> [REQ_ID=286db78fdd71] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-09 03:33:12 --> [CSRF] token name=csrf_test_name hash=86a3bbee8030fa993cecf0cb61c4c2b2
DEBUG - 2026-03-09 03:33:12 --> [REQ_ID=dd0ada5e1e59] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-09 03:33:12 --> [REQ_ID=dd0ada5e1e59] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-09 03:33:12 --> [REQ_ID=286db78fdd71] [FILTER_AFTER]
DEBUG - 2026-03-09 03:33:12 --> [REQ_ID=286db78fdd71] [LIFECYCLE][END] status=200 duration_ms=20.00 memory_delta=0
INFO - 2026-03-09 03:33:12 --> [REQ_ID=dd0ada5e1e59] [PERF] Execution time=0.019760
DEBUG - 2026-03-09 03:33:12 --> [REQ_ID=286db78fdd71] [REQUEST][END]
INFO - 2026-03-09 03:33:12 --> [REQ_ID=286db78fdd71] [PERF] Execution time=0.029941
DEBUG - 2026-03-09 03:36:17 --> [REQ_ID=c7d0b7ddf720] [REQUEST][START] HEAD /
DEBUG - 2026-03-09 03:36:17 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-09 03:36:17 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-09 03:36:17 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-09 03:36:17 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-09 03:36:17 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-09 03:39:05 --> [REQ_ID=a5c86dfb572e] [REQUEST][START] GET /index.php/Assets
DEBUG - 2026-03-09 03:39:05 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-09 03:39:05 --> [REQ_ID=a5c86dfb572e] [FILTER_BEFORE] /index.php/Assets
DEBUG - 2026-03-09 03:39:05 --> [REQ_ID=a5c86dfb572e] [ROUTE] Controller=\App\Modules\Management\Controllers\AssetsController Method=index
DEBUG - 2026-03-09 03:39:05 --> [REQ_ID=a5c86dfb572e] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Assets
DEBUG - 2026-03-09 03:39:05 --> [CSRF] token name=csrf_test_name hash=94c86288b3f1df16b33080a45745f4f8
DEBUG - 2026-03-09 03:39:05 --> [REQ_ID=a5c86dfb572e] [REQUEST][END]
INFO - 2026-03-09 03:39:05 --> [REQ_ID=a5c86dfb572e] [PERF] Execution time=0.050557
DEBUG - 2026-03-09 03:39:06 --> [REQ_ID=c6f9dca7cfc2] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-09 03:39:06 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-09 03:39:06 --> [REQ_ID=c6f9dca7cfc2] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-09 03:39:06 --> [REQ_ID=c6f9dca7cfc2] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-09 03:39:06 --> [REQ_ID=c6f9dca7cfc2] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-09 03:39:06 --> [CSRF] token name=csrf_test_name hash=162026b3b41df141349bfb3993891b03
DEBUG - 2026-03-09 03:39:06 --> [REQ_ID=49a89410a40a] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-09 03:39:06 --> [REQ_ID=49a89410a40a] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-09 03:39:06 --> [REQ_ID=c6f9dca7cfc2] [FILTER_AFTER]
DEBUG - 2026-03-09 03:39:06 --> [REQ_ID=c6f9dca7cfc2] [LIFECYCLE][END] status=200 duration_ms=68.31 memory_delta=0
INFO - 2026-03-09 03:39:06 --> [REQ_ID=49a89410a40a] [PERF] Execution time=0.067594
DEBUG - 2026-03-09 03:39:06 --> [REQ_ID=c6f9dca7cfc2] [REQUEST][END]
INFO - 2026-03-09 03:39:06 --> [REQ_ID=c6f9dca7cfc2] [PERF] Execution time=0.087699
DEBUG - 2026-03-09 03:39:44 --> [REQ_ID=104d53bb45ce] [REQUEST][START] GET /index.php/Support
DEBUG - 2026-03-09 03:39:44 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-09 03:39:44 --> [REQ_ID=104d53bb45ce] [FILTER_BEFORE] /index.php/Support
DEBUG - 2026-03-09 03:39:44 --> [REQ_ID=104d53bb45ce] [ROUTE] Controller=\App\Modules\Support\Controllers\SupportController Method=index
DEBUG - 2026-03-09 03:39:44 --> [REQ_ID=104d53bb45ce] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Support
DEBUG - 2026-03-09 03:39:44 --> [CSRF] token name=csrf_test_name hash=0dd6cbe703954efc75bff7f2553235be
DEBUG - 2026-03-09 03:39:44 --> [REQ_ID=11f64d3f826b] [INIT] App\Modules\Support\Controllers\SupportController::GET
INFO - 2026-03-09 03:39:44 --> [REQ_ID=11f64d3f826b] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-09 03:39:44 --> [REQ_ID=11f64d3f826b] [METHOD_ENTRY] index
DEBUG - 2026-03-09 03:39:44 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-09 03:39:44 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-09 03:39:44 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-09 03:39:44 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-09 03:39:44 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-09 03:39:44 --> MyMICoin: guest context detected; skipping user-specific preload.
INFO - 2026-03-09 03:39:44 --> [REQ_ID=11f64d3f826b] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-09 03:39:44 --> [REQ_ID=11f64d3f826b] [VIEW_RENDER] SupportModule\Views\Support\index
INFO - 2026-03-09 03:39:44 --> [REQ_ID=11f64d3f826b] [MEMORY][commonData:start] 6291456
INFO - 2026-03-09 03:39:44 --> themesMemory usage: 6291456
DEBUG - 2026-03-09 03:39:44 --> [REQ_ID=104d53bb45ce] [FILTER_AFTER]
DEBUG - 2026-03-09 03:39:44 --> [REQ_ID=104d53bb45ce] [LIFECYCLE][END] status=200 duration_ms=154.44 memory_delta=2097152
INFO - 2026-03-09 03:39:44 --> [REQ_ID=11f64d3f826b] [PERF] Execution time=0.154112
DEBUG - 2026-03-09 03:39:44 --> [REQ_ID=104d53bb45ce] [REQUEST][END]
INFO - 2026-03-09 03:39:44 --> [REQ_ID=104d53bb45ce] [PERF] Execution time=0.165684
DEBUG - 2026-03-09 03:39:57 --> [REQ_ID=50292375cb18] [REQUEST][START] GET /index.php/How-It-Works/overview
DEBUG - 2026-03-09 03:39:57 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-09 03:39:57 --> [REQ_ID=50292375cb18] [FILTER_BEFORE] /index.php/How-It-Works/overview
DEBUG - 2026-03-09 03:39:57 --> [REQ_ID=50292375cb18] [ROUTE] Controller=\App\Modules\Blog\Controllers\HowItWorksController Method=show
DEBUG - 2026-03-09 03:39:57 --> [REQ_ID=50292375cb18] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/How-It-Works/overview
DEBUG - 2026-03-09 03:39:57 --> [CSRF] token name=csrf_test_name hash=0dd6cbe703954efc75bff7f2553235be
DEBUG - 2026-03-09 03:39:57 --> [REQ_ID=617aefc3b9cd] [INIT] App\Modules\Blog\Controllers\HowItWorksController::GET
INFO - 2026-03-09 03:39:57 --> [REQ_ID=617aefc3b9cd] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-09 03:39:57 --> [REQ_ID=617aefc3b9cd] [METHOD_ENTRY] show
DEBUG - 2026-03-09 03:39:57 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-09 03:39:57 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-09 03:39:57 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-09 03:39:57 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-09 03:39:57 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-09 03:39:57 --> MyMICoin: guest context detected; skipping user-specific preload.
ERROR - 2026-03-09 03:39:57 --> HowItWorksController failure: overview
CRITICAL - 2026-03-09 03:39:57 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: GET, Route: How-It-Works/overview]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-09 03:39:57 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-09 03:39:57 --> [404] URI=https://www.mymiwallet.com/index.php/How-It-Works/overview
WARNING - 2026-03-09 03:39:57 --> 404 route miss: https://www.mymiwallet.com/index.php/How-It-Works/overview | referrer: none
ERROR - 2026-03-09 03:39:57 --> [ERROR_PAGE] event=error_404 status=404 message=Page not found.
INFO - 2026-03-09 03:39:57 --> [REQ_ID=617aefc3b9cd] [PERF] Execution time=0.072773
DEBUG - 2026-03-09 03:40:02 --> [REQ_ID=2376f5650529] [REQUEST][START] GET /index.php/Support
DEBUG - 2026-03-09 03:40:02 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-09 03:40:02 --> [REQ_ID=2376f5650529] [FILTER_BEFORE] /index.php/Support
DEBUG - 2026-03-09 03:40:02 --> [REQ_ID=2376f5650529] [ROUTE] Controller=\App\Modules\Support\Controllers\SupportController Method=index
DEBUG - 2026-03-09 03:40:02 --> [REQ_ID=2376f5650529] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Support
DEBUG - 2026-03-09 03:40:02 --> [CSRF] token name=csrf_test_name hash=0dd6cbe703954efc75bff7f2553235be
DEBUG - 2026-03-09 03:40:02 --> [REQ_ID=dab418a71035] [INIT] App\Modules\Support\Controllers\SupportController::GET
INFO - 2026-03-09 03:40:02 --> [REQ_ID=dab418a71035] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-09 03:40:02 --> [REQ_ID=dab418a71035] [METHOD_ENTRY] index
DEBUG - 2026-03-09 03:40:02 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-09 03:40:02 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-09 03:40:02 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-09 03:40:02 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-09 03:40:02 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-09 03:40:02 --> MyMICoin: guest context detected; skipping user-specific preload.
INFO - 2026-03-09 03:40:02 --> [REQ_ID=dab418a71035] [MEMORY][commonData:start] 4194304
DEBUG - 2026-03-09 03:40:02 --> [REQ_ID=dab418a71035] [VIEW_RENDER] SupportModule\Views\Support\index
INFO - 2026-03-09 03:40:02 --> [REQ_ID=dab418a71035] [MEMORY][commonData:start] 4194304
INFO - 2026-03-09 03:40:02 --> themesMemory usage: 4194304
DEBUG - 2026-03-09 03:40:02 --> [REQ_ID=2376f5650529] [FILTER_AFTER]
DEBUG - 2026-03-09 03:40:02 --> [REQ_ID=2376f5650529] [LIFECYCLE][END] status=200 duration_ms=41.60 memory_delta=0
INFO - 2026-03-09 03:40:02 --> [REQ_ID=dab418a71035] [PERF] Execution time=0.041352
DEBUG - 2026-03-09 03:40:02 --> [REQ_ID=2376f5650529] [REQUEST][END]
INFO - 2026-03-09 03:40:02 --> [REQ_ID=2376f5650529] [PERF] Execution time=0.051031
DEBUG - 2026-03-09 03:40:04 --> [REQ_ID=5b806edcfdac] [REQUEST][START] GET /index.php/Support
DEBUG - 2026-03-09 03:40:04 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-09 03:40:04 --> [REQ_ID=5b806edcfdac] [FILTER_BEFORE] /index.php/Support
DEBUG - 2026-03-09 03:40:04 --> [REQ_ID=5b806edcfdac] [ROUTE] Controller=\App\Modules\Support\Controllers\SupportController Method=index
DEBUG - 2026-03-09 03:40:04 --> [REQ_ID=5b806edcfdac] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Support
DEBUG - 2026-03-09 03:40:04 --> [CSRF] token name=csrf_test_name hash=0dd6cbe703954efc75bff7f2553235be
DEBUG - 2026-03-09 03:40:04 --> [REQ_ID=0606d9097154] [INIT] App\Modules\Support\Controllers\SupportController::GET
INFO - 2026-03-09 03:40:04 --> [REQ_ID=0606d9097154] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-09 03:40:04 --> [REQ_ID=0606d9097154] [METHOD_ENTRY] index
DEBUG - 2026-03-09 03:40:04 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-09 03:40:04 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-09 03:40:04 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-09 03:40:04 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-09 03:40:04 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-09 03:40:04 --> MyMICoin: guest context detected; skipping user-specific preload.
INFO - 2026-03-09 03:40:04 --> [REQ_ID=0606d9097154] [MEMORY][commonData:start] 4194304
DEBUG - 2026-03-09 03:40:04 --> [REQ_ID=0606d9097154] [VIEW_RENDER] SupportModule\Views\Support\index
INFO - 2026-03-09 03:40:04 --> [REQ_ID=0606d9097154] [MEMORY][commonData:start] 4194304
INFO - 2026-03-09 03:40:04 --> themesMemory usage: 4194304
DEBUG - 2026-03-09 03:40:04 --> [REQ_ID=5b806edcfdac] [FILTER_AFTER]
DEBUG - 2026-03-09 03:40:04 --> [REQ_ID=5b806edcfdac] [LIFECYCLE][END] status=200 duration_ms=30.16 memory_delta=0
INFO - 2026-03-09 03:40:04 --> [REQ_ID=0606d9097154] [PERF] Execution time=0.030308
DEBUG - 2026-03-09 03:40:04 --> [REQ_ID=5b806edcfdac] [REQUEST][END]
INFO - 2026-03-09 03:40:04 --> [REQ_ID=5b806edcfdac] [PERF] Execution time=0.041019
DEBUG - 2026-03-09 03:40:07 --> [REQ_ID=d820671eef2c] [REQUEST][START] GET /index.php/Support
DEBUG - 2026-03-09 03:40:07 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-09 03:40:07 --> [REQ_ID=d820671eef2c] [FILTER_BEFORE] /index.php/Support
DEBUG - 2026-03-09 03:40:07 --> [REQ_ID=d820671eef2c] [ROUTE] Controller=\App\Modules\Support\Controllers\SupportController Method=index
DEBUG - 2026-03-09 03:40:07 --> [REQ_ID=d820671eef2c] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Support
DEBUG - 2026-03-09 03:40:07 --> [CSRF] token name=csrf_test_name hash=0dd6cbe703954efc75bff7f2553235be
DEBUG - 2026-03-09 03:40:07 --> [REQ_ID=13f21aea922a] [INIT] App\Modules\Support\Controllers\SupportController::GET
INFO - 2026-03-09 03:40:07 --> [REQ_ID=13f21aea922a] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-09 03:40:07 --> [REQ_ID=13f21aea922a] [METHOD_ENTRY] index
DEBUG - 2026-03-09 03:40:07 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-09 03:40:07 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-09 03:40:07 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-09 03:40:07 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-09 03:40:07 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-09 03:40:07 --> MyMICoin: guest context detected; skipping user-specific preload.
INFO - 2026-03-09 03:40:07 --> [REQ_ID=13f21aea922a] [MEMORY][commonData:start] 4194304
DEBUG - 2026-03-09 03:40:07 --> [REQ_ID=13f21aea922a] [VIEW_RENDER] SupportModule\Views\Support\index
INFO - 2026-03-09 03:40:07 --> [REQ_ID=13f21aea922a] [MEMORY][commonData:start] 4194304
INFO - 2026-03-09 03:40:07 --> themesMemory usage: 4194304
DEBUG - 2026-03-09 03:40:07 --> [REQ_ID=d820671eef2c] [FILTER_AFTER]
DEBUG - 2026-03-09 03:40:07 --> [REQ_ID=d820671eef2c] [LIFECYCLE][END] status=200 duration_ms=32.73 memory_delta=0
INFO - 2026-03-09 03:40:07 --> [REQ_ID=13f21aea922a] [PERF] Execution time=0.031943
DEBUG - 2026-03-09 03:40:07 --> [REQ_ID=d820671eef2c] [REQUEST][END]
INFO - 2026-03-09 03:40:07 --> [REQ_ID=d820671eef2c] [PERF] Execution time=0.046281
DEBUG - 2026-03-09 03:40:15 --> [REQ_ID=c922cd0229da] [REQUEST][START] GET /index.php/How-It-Works
DEBUG - 2026-03-09 03:40:15 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-09 03:40:15 --> [REQ_ID=c922cd0229da] [FILTER_BEFORE] /index.php/How-It-Works
DEBUG - 2026-03-09 03:40:15 --> [REQ_ID=c922cd0229da] [ROUTE] Controller=\App\Modules\Blog\Controllers\HowItWorksController Method=index
DEBUG - 2026-03-09 03:40:15 --> [REQ_ID=c922cd0229da] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/How-It-Works
DEBUG - 2026-03-09 03:40:15 --> [CSRF] token name=csrf_test_name hash=0dd6cbe703954efc75bff7f2553235be
DEBUG - 2026-03-09 03:40:15 --> [REQ_ID=53b772fda246] [INIT] App\Modules\Blog\Controllers\HowItWorksController::GET
INFO - 2026-03-09 03:40:15 --> [REQ_ID=53b772fda246] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-09 03:40:15 --> [REQ_ID=53b772fda246] [METHOD_ENTRY] index
DEBUG - 2026-03-09 03:40:15 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-09 03:40:15 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-09 03:40:15 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-09 03:40:15 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-09 03:40:15 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-09 03:40:15 --> MyMICoin: guest context detected; skipping user-specific preload.
ERROR - 2026-03-09 03:40:15 --> HowItWorksController failure: overview
CRITICAL - 2026-03-09 03:40:15 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: GET, Route: How-It-Works]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-09 03:40:15 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-09 03:40:15 --> [404] URI=https://www.mymiwallet.com/index.php/How-It-Works
WARNING - 2026-03-09 03:40:15 --> 404 route miss: https://www.mymiwallet.com/index.php/How-It-Works | referrer: none
ERROR - 2026-03-09 03:40:15 --> [ERROR_PAGE] event=error_404 status=404 message=Page not found.
INFO - 2026-03-09 03:40:15 --> [REQ_ID=53b772fda246] [PERF] Execution time=0.045249
DEBUG - 2026-03-09 03:40:20 --> [REQ_ID=06c3ba0c39bc] [REQUEST][START] GET /index.php/How-It-Works/alerts
DEBUG - 2026-03-09 03:40:20 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-09 03:40:20 --> [REQ_ID=06c3ba0c39bc] [FILTER_BEFORE] /index.php/How-It-Works/alerts
DEBUG - 2026-03-09 03:40:20 --> [REQ_ID=06c3ba0c39bc] [ROUTE] Controller=\App\Modules\Blog\Controllers\HowItWorksController Method=show
DEBUG - 2026-03-09 03:40:20 --> [REQ_ID=06c3ba0c39bc] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/How-It-Works/alerts
DEBUG - 2026-03-09 03:40:20 --> [CSRF] token name=csrf_test_name hash=0dd6cbe703954efc75bff7f2553235be
DEBUG - 2026-03-09 03:40:20 --> [REQ_ID=e8f44e417061] [INIT] App\Modules\Blog\Controllers\HowItWorksController::GET
INFO - 2026-03-09 03:40:20 --> [REQ_ID=e8f44e417061] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-09 03:40:20 --> [REQ_ID=e8f44e417061] [METHOD_ENTRY] show
DEBUG - 2026-03-09 03:40:20 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-09 03:40:20 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-09 03:40:20 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-09 03:40:20 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-09 03:40:20 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-09 03:40:20 --> MyMICoin: guest context detected; skipping user-specific preload.
ERROR - 2026-03-09 03:40:20 --> HowItWorksController failure: alerts
CRITICAL - 2026-03-09 03:40:20 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: GET, Route: How-It-Works/alerts]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-09 03:40:20 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-09 03:40:20 --> [404] URI=https://www.mymiwallet.com/index.php/How-It-Works/alerts
WARNING - 2026-03-09 03:40:20 --> 404 route miss: https://www.mymiwallet.com/index.php/How-It-Works/alerts | referrer: none
ERROR - 2026-03-09 03:40:20 --> [ERROR_PAGE] event=error_404 status=404 message=Page not found.
INFO - 2026-03-09 03:40:20 --> [REQ_ID=e8f44e417061] [PERF] Execution time=0.034518
DEBUG - 2026-03-09 03:40:22 --> [REQ_ID=bc90de3ac1cc] [REQUEST][START] GET /index.php/How-It-Works
DEBUG - 2026-03-09 03:40:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-09 03:40:22 --> [REQ_ID=bc90de3ac1cc] [FILTER_BEFORE] /index.php/How-It-Works
DEBUG - 2026-03-09 03:40:22 --> [REQ_ID=bc90de3ac1cc] [ROUTE] Controller=\App\Modules\Blog\Controllers\HowItWorksController Method=index
DEBUG - 2026-03-09 03:40:22 --> [REQ_ID=bc90de3ac1cc] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/How-It-Works
DEBUG - 2026-03-09 03:40:22 --> [CSRF] token name=csrf_test_name hash=0dd6cbe703954efc75bff7f2553235be
DEBUG - 2026-03-09 03:40:22 --> [REQ_ID=898f9a38da2c] [INIT] App\Modules\Blog\Controllers\HowItWorksController::GET
INFO - 2026-03-09 03:40:22 --> [REQ_ID=898f9a38da2c] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-09 03:40:22 --> [REQ_ID=898f9a38da2c] [METHOD_ENTRY] index
DEBUG - 2026-03-09 03:40:22 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-09 03:40:22 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-09 03:40:22 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-09 03:40:22 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-09 03:40:22 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-09 03:40:22 --> MyMICoin: guest context detected; skipping user-specific preload.
ERROR - 2026-03-09 03:40:22 --> HowItWorksController failure: overview
CRITICAL - 2026-03-09 03:40:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: GET, Route: How-It-Works]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-09 03:40:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-09 03:40:22 --> [404] URI=https://www.mymiwallet.com/index.php/How-It-Works
WARNING - 2026-03-09 03:40:22 --> 404 route miss: https://www.mymiwallet.com/index.php/How-It-Works | referrer: none
ERROR - 2026-03-09 03:40:22 --> [ERROR_PAGE] event=error_404 status=404 message=Page not found.
INFO - 2026-03-09 03:40:22 --> [REQ_ID=898f9a38da2c] [PERF] Execution time=0.037615
DEBUG - 2026-03-09 03:41:17 --> [REQ_ID=949428118e07] [REQUEST][START] HEAD /
DEBUG - 2026-03-09 03:41:17 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-09 03:41:17 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-09 03:41:17 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-09 03:41:17 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-09 03:41:17 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-09 03:46:17 --> [REQ_ID=3e122fa64c66] [REQUEST][START] HEAD /
DEBUG - 2026-03-09 03:46:17 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-09 03:46:17 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-09 03:46:17 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-09 03:46:17 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-09 03:46:17 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-09 03:48:17 --> [REQ_ID=a6fa9df34c08] [REQUEST][START] GET /index.php/Terms-Of-Service
DEBUG - 2026-03-09 03:48:17 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-09 03:48:17 --> [REQ_ID=a6fa9df34c08] [FILTER_BEFORE] /index.php/Terms-Of-Service
DEBUG - 2026-03-09 03:48:17 --> [REQ_ID=a6fa9df34c08] [ROUTE] Controller=\App\Controllers\Home Method=termsOfService
DEBUG - 2026-03-09 03:48:17 --> [REQ_ID=a6fa9df34c08] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Terms-Of-Service
DEBUG - 2026-03-09 03:48:17 --> [CSRF] token name=csrf_test_name hash=69c25e595a7b9db6a81e83f33fe07eba
DEBUG - 2026-03-09 03:48:17 --> [REQ_ID=587a3c23fabc] [INIT] App\Controllers\Home::GET
INFO - 2026-03-09 03:48:17 --> [REQ_ID=587a3c23fabc] [MEMORY][controller-start] 6291456
INFO - 2026-03-09 03:48:17 --> [REQ_ID=587a3c23fabc] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-09 03:48:17 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-09 03:48:18 --> [MetaService] slug=terms-of-service pageName= cacheHit= path=DB
DEBUG - 2026-03-09 03:48:18 --> [REQ_ID=587a3c23fabc] [VIEW_RENDER] themes/public/termsOfService
INFO - 2026-03-09 03:48:18 --> [REQ_ID=587a3c23fabc] [MEMORY][commonData:start] 10485760
INFO - 2026-03-09 03:48:18 --> themesMemory usage: 10485760
DEBUG - 2026-03-09 03:48:18 --> [MetaService] slug=terms-of-service pageName=Terms of Service cacheHit= path=DB
DEBUG - 2026-03-09 03:48:18 --> [REQ_ID=a6fa9df34c08] [FILTER_AFTER]
DEBUG - 2026-03-09 03:48:18 --> [REQ_ID=a6fa9df34c08] [LIFECYCLE][END] status=200 duration_ms=787.32 memory_delta=4194304
INFO - 2026-03-09 03:48:18 --> [REQ_ID=587a3c23fabc] [PERF] Execution time=0.785163
DEBUG - 2026-03-09 03:48:18 --> [REQ_ID=a6fa9df34c08] [REQUEST][END]
INFO - 2026-03-09 03:48:18 --> [REQ_ID=a6fa9df34c08] [PERF] Execution time=0.829127
DEBUG - 2026-03-09 03:51:17 --> [REQ_ID=26944508914a] [REQUEST][START] HEAD /
DEBUG - 2026-03-09 03:51:17 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-09 03:51:17 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-09 03:51:17 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-09 03:51:17 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-09 03:51:17 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-09 03:56:17 --> [REQ_ID=94fadc904c41] [REQUEST][START] HEAD /
DEBUG - 2026-03-09 03:56:17 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-09 03:56:17 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-09 03:56:17 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-09 03:56:17 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-09 03:56:17 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-09 03:57:41 --> [REQ_ID=473185102610] [REQUEST][START] GET /
DEBUG - 2026-03-09 03:57:41 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-09 03:57:41 --> [REQ_ID=473185102610] [FILTER_BEFORE] /
DEBUG - 2026-03-09 03:57:41 --> [REQ_ID=473185102610] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-09 03:57:41 --> [REQ_ID=473185102610] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-09 03:57:41 --> [CSRF] token name=csrf_test_name hash=263f1f1cec74c9f21a6bf305740483ff
DEBUG - 2026-03-09 03:57:41 --> [REQ_ID=4f924898050f] [INIT] App\Controllers\Home::GET
INFO - 2026-03-09 03:57:41 --> [REQ_ID=4f924898050f] [MEMORY][controller-start] 4194304
INFO - 2026-03-09 03:57:41 --> [REQ_ID=4f924898050f] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-09 03:57:41 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-09 03:57:42 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-03-09 03:57:42 --> [REQ_ID=4f924898050f] [VIEW_RENDER] themes/public/home
INFO - 2026-03-09 03:57:42 --> [REQ_ID=4f924898050f] [MEMORY][commonData:start] 8388608
INFO - 2026-03-09 03:57:42 --> themesMemory usage: 8388608
DEBUG - 2026-03-09 03:57:42 --> [MetaService] slug= pageName=Home cacheHit= path=DB
DEBUG - 2026-03-09 03:57:42 --> [REQ_ID=473185102610] [FILTER_AFTER]
DEBUG - 2026-03-09 03:57:42 --> [REQ_ID=473185102610] [LIFECYCLE][END] status=200 duration_ms=908.29 memory_delta=4194304
INFO - 2026-03-09 03:57:42 --> [REQ_ID=4f924898050f] [PERF] Execution time=0.905627
DEBUG - 2026-03-09 03:57:42 --> [REQ_ID=473185102610] [REQUEST][END]
INFO - 2026-03-09 03:57:42 --> [REQ_ID=473185102610] [PERF] Execution time=0.927778
DEBUG - 2026-03-09 03:58:31 --> [REQ_ID=d00efaa17d2c] [REQUEST][START] GET /
DEBUG - 2026-03-09 03:58:31 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-09 03:58:31 --> [REQ_ID=d00efaa17d2c] [FILTER_BEFORE] /
DEBUG - 2026-03-09 03:58:31 --> [REQ_ID=d00efaa17d2c] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-09 03:58:31 --> [REQ_ID=d00efaa17d2c] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-09 03:58:31 --> [CSRF] token name=csrf_test_name hash=1c09d1269417d076e5efa6dfe6305e80
DEBUG - 2026-03-09 03:58:31 --> [REQ_ID=588e007cb0ef] [INIT] App\Controllers\Home::GET
INFO - 2026-03-09 03:58:31 --> [REQ_ID=588e007cb0ef] [MEMORY][controller-start] 6291456
INFO - 2026-03-09 03:58:31 --> [REQ_ID=588e007cb0ef] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-09 03:58:31 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-09 03:58:32 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
DEBUG - 2026-03-09 03:58:32 --> [REQ_ID=588e007cb0ef] [VIEW_RENDER] themes/public/home
INFO - 2026-03-09 03:58:32 --> [REQ_ID=588e007cb0ef] [MEMORY][commonData:start] 8388608
INFO - 2026-03-09 03:58:32 --> themesMemory usage: 8388608
DEBUG - 2026-03-09 03:58:32 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-09 03:58:32 --> [REQ_ID=d00efaa17d2c] [FILTER_AFTER]
DEBUG - 2026-03-09 03:58:32 --> [REQ_ID=d00efaa17d2c] [LIFECYCLE][END] status=200 duration_ms=579.59 memory_delta=2097152
INFO - 2026-03-09 03:58:32 --> [REQ_ID=588e007cb0ef] [PERF] Execution time=0.579573
DEBUG - 2026-03-09 03:58:32 --> [REQ_ID=d00efaa17d2c] [REQUEST][END]
INFO - 2026-03-09 03:58:32 --> [REQ_ID=d00efaa17d2c] [PERF] Execution time=0.590352
DEBUG - 2026-03-09 04:00:01 --> [REQ_ID=3368c3507d9c] [REQUEST][START] GET /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-09 04:00:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-09 04:00:01 --> [REQ_ID=3368c3507d9c] [FILTER_BEFORE] /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-09 04:00:01 --> [REQ_ID=3368c3507d9c] [ROUTE] Controller=\App\Modules\Management\Controllers\ManagementAPIController Method=Run_CRON_Tasks
DEBUG - 2026-03-09 04:00:01 --> [REQ_ID=3368c3507d9c] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-09 04:00:01 --> [REQ_ID=3368c3507d9c] [REQUEST][END]
INFO - 2026-03-09 04:00:01 --> [REQ_ID=3368c3507d9c] [PERF] Execution time=0.046103
DEBUG - 2026-03-09 04:01:17 --> [REQ_ID=67168c7d85e6] [REQUEST][START] HEAD /
DEBUG - 2026-03-09 04:01:17 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-09 04:01:17 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-09 04:01:17 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-09 04:01:17 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-09 04:01:17 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-09 04:04:34 --> [REQ_ID=261537e2d330] [REQUEST][START] GET /
DEBUG - 2026-03-09 04:04:34 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-09 04:04:34 --> [REQ_ID=261537e2d330] [FILTER_BEFORE] /
DEBUG - 2026-03-09 04:04:34 --> [REQ_ID=261537e2d330] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-09 04:04:34 --> [REQ_ID=261537e2d330] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-09 04:04:34 --> [CSRF] token name=csrf_test_name hash=533444476da4d275ffec2ae8553391cb
DEBUG - 2026-03-09 04:04:34 --> [REQ_ID=c10b2d36928b] [INIT] App\Controllers\Home::GET
INFO - 2026-03-09 04:04:34 --> [REQ_ID=c10b2d36928b] [MEMORY][controller-start] 6291456
INFO - 2026-03-09 04:04:34 --> [REQ_ID=c10b2d36928b] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-09 04:04:34 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-09 04:04:34 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
DEBUG - 2026-03-09 04:04:34 --> [REQ_ID=c10b2d36928b] [VIEW_RENDER] themes/public/home
INFO - 2026-03-09 04:04:34 --> [REQ_ID=c10b2d36928b] [MEMORY][commonData:start] 10485760
INFO - 2026-03-09 04:04:34 --> themesMemory usage: 10485760
DEBUG - 2026-03-09 04:04:34 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-09 04:04:34 --> [REQ_ID=261537e2d330] [FILTER_AFTER]
DEBUG - 2026-03-09 04:04:34 --> [REQ_ID=261537e2d330] [LIFECYCLE][END] status=200 duration_ms=583.54 memory_delta=4194304
INFO - 2026-03-09 04:04:34 --> [REQ_ID=c10b2d36928b] [PERF] Execution time=0.581181
DEBUG - 2026-03-09 04:04:34 --> [REQ_ID=261537e2d330] [REQUEST][END]
INFO - 2026-03-09 04:04:34 --> [REQ_ID=261537e2d330] [PERF] Execution time=0.623529
DEBUG - 2026-03-09 04:06:17 --> [REQ_ID=aec916d57e6d] [REQUEST][START] HEAD /
DEBUG - 2026-03-09 04:06:17 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-09 04:06:17 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-09 04:06:17 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-09 04:06:17 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-09 04:06:17 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-09 04:11:17 --> [REQ_ID=b093aae90c8c] [REQUEST][START] HEAD /
DEBUG - 2026-03-09 04:11:17 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-09 04:11:17 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-09 04:11:17 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-09 04:11:17 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-09 04:11:17 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-09 04:15:01 --> [REQ_ID=4ec6dafb78fb] [REQUEST][START] GET /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-09 04:15:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-09 04:15:01 --> [REQ_ID=4ec6dafb78fb] [FILTER_BEFORE] /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-09 04:15:01 --> [REQ_ID=4ec6dafb78fb] [ROUTE] Controller=\App\Modules\APIs\Controllers\AlertsAPIController Method=fetchEmailAlerts
DEBUG - 2026-03-09 04:15:01 --> [REQ_ID=4ec6dafb78fb] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-09 04:15:01 --> [REQ_ID=4ec6dafb78fb] [REQUEST][END]
INFO - 2026-03-09 04:15:01 --> [REQ_ID=4ec6dafb78fb] [PERF] Execution time=0.049681
DEBUG - 2026-03-09 04:16:17 --> [REQ_ID=7d03dfdaf623] [REQUEST][START] HEAD /
DEBUG - 2026-03-09 04:16:17 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-09 04:16:17 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-09 04:16:17 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-09 04:16:17 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-09 04:16:17 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-09 04:21:12 --> [REQ_ID=e6a7929e63c9] [REQUEST][START] GET /
DEBUG - 2026-03-09 04:21:12 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-09 04:21:12 --> [REQ_ID=e6a7929e63c9] [FILTER_BEFORE] /
DEBUG - 2026-03-09 04:21:12 --> [REQ_ID=e6a7929e63c9] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-09 04:21:12 --> [REQ_ID=e6a7929e63c9] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-09 04:21:12 --> [CSRF] token name=csrf_test_name hash=fa0b2a983b0c945e31b56736ea5daaf6
DEBUG - 2026-03-09 04:21:12 --> [REQ_ID=1c02f69d487d] [INIT] App\Controllers\Home::GET
INFO - 2026-03-09 04:21:12 --> [REQ_ID=1c02f69d487d] [MEMORY][controller-start] 6291456
INFO - 2026-03-09 04:21:13 --> [REQ_ID=1c02f69d487d] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-09 04:21:13 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-09 04:21:14 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-03-09 04:21:14 --> [REQ_ID=1c02f69d487d] [VIEW_RENDER] themes/public/home
INFO - 2026-03-09 04:21:14 --> [REQ_ID=1c02f69d487d] [MEMORY][commonData:start] 10485760
INFO - 2026-03-09 04:21:14 --> themesMemory usage: 10485760
DEBUG - 2026-03-09 04:21:14 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-09 04:21:14 --> [REQ_ID=e6a7929e63c9] [FILTER_AFTER]
DEBUG - 2026-03-09 04:21:14 --> [REQ_ID=e6a7929e63c9] [LIFECYCLE][END] status=200 duration_ms=1,399.94 memory_delta=4194304
INFO - 2026-03-09 04:21:14 --> [REQ_ID=1c02f69d487d] [PERF] Execution time=1.388358
DEBUG - 2026-03-09 04:21:14 --> [REQ_ID=e6a7929e63c9] [REQUEST][END]
INFO - 2026-03-09 04:21:14 --> [REQ_ID=e6a7929e63c9] [PERF] Execution time=1.571796
DEBUG - 2026-03-09 04:21:15 --> [REQ_ID=8e6b688136c7] [REQUEST][START] GET /
DEBUG - 2026-03-09 04:21:15 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-09 04:21:15 --> [REQ_ID=8e6b688136c7] [FILTER_BEFORE] /
DEBUG - 2026-03-09 04:21:15 --> [REQ_ID=8e6b688136c7] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-09 04:21:15 --> [REQ_ID=8e6b688136c7] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-09 04:21:15 --> [CSRF] token name=csrf_test_name hash=cc279d07b333ae94a9cd9e442e399b6e
DEBUG - 2026-03-09 04:21:15 --> [REQ_ID=d10f673ee8e1] [INIT] App\Controllers\Home::GET
INFO - 2026-03-09 04:21:15 --> [REQ_ID=d10f673ee8e1] [MEMORY][controller-start] 6291456
INFO - 2026-03-09 04:21:15 --> [REQ_ID=d10f673ee8e1] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-09 04:21:15 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-09 04:21:15 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
DEBUG - 2026-03-09 04:21:15 --> [REQ_ID=d10f673ee8e1] [VIEW_RENDER] themes/public/home
INFO - 2026-03-09 04:21:15 --> [REQ_ID=d10f673ee8e1] [MEMORY][commonData:start] 8388608
INFO - 2026-03-09 04:21:15 --> themesMemory usage: 8388608
DEBUG - 2026-03-09 04:21:15 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-09 04:21:15 --> [REQ_ID=8e6b688136c7] [FILTER_AFTER]
DEBUG - 2026-03-09 04:21:15 --> [REQ_ID=8e6b688136c7] [LIFECYCLE][END] status=200 duration_ms=552.41 memory_delta=2097152
INFO - 2026-03-09 04:21:15 --> [REQ_ID=d10f673ee8e1] [PERF] Execution time=0.552509
DEBUG - 2026-03-09 04:21:15 --> [REQ_ID=8e6b688136c7] [REQUEST][END]
INFO - 2026-03-09 04:21:15 --> [REQ_ID=8e6b688136c7] [PERF] Execution time=0.581193
DEBUG - 2026-03-09 04:21:17 --> [REQ_ID=f402b4718f5a] [REQUEST][START] HEAD /
DEBUG - 2026-03-09 04:21:17 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-09 04:21:17 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-09 04:21:17 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-09 04:21:17 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-09 04:21:17 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-09 04:26:17 --> [REQ_ID=40664aa04fd3] [REQUEST][START] HEAD /
DEBUG - 2026-03-09 04:26:17 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-09 04:26:17 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-09 04:26:17 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-09 04:26:17 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-09 04:26:17 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-09 04:26:23 --> [REQ_ID=2a6eae940e53] [REQUEST][START] GET /
DEBUG - 2026-03-09 04:26:23 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-09 04:26:23 --> [REQ_ID=2a6eae940e53] [FILTER_BEFORE] /
DEBUG - 2026-03-09 04:26:23 --> [REQ_ID=2a6eae940e53] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-09 04:26:23 --> [REQ_ID=2a6eae940e53] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-09 04:26:23 --> [CSRF] token name=csrf_test_name hash=99a3e47b054d768ad40175829289890a
DEBUG - 2026-03-09 04:26:23 --> [REQ_ID=b89cc111458c] [INIT] App\Controllers\Home::GET
INFO - 2026-03-09 04:26:23 --> [REQ_ID=b89cc111458c] [MEMORY][controller-start] 4194304
INFO - 2026-03-09 04:26:24 --> [REQ_ID=b89cc111458c] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-09 04:26:24 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-09 04:26:24 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
DEBUG - 2026-03-09 04:26:24 --> [REQ_ID=b89cc111458c] [VIEW_RENDER] themes/public/home
INFO - 2026-03-09 04:26:24 --> [REQ_ID=b89cc111458c] [MEMORY][commonData:start] 8388608
INFO - 2026-03-09 04:26:24 --> themesMemory usage: 8388608
DEBUG - 2026-03-09 04:26:24 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-09 04:26:24 --> [REQ_ID=2a6eae940e53] [FILTER_AFTER]
DEBUG - 2026-03-09 04:26:24 --> [REQ_ID=2a6eae940e53] [LIFECYCLE][END] status=200 duration_ms=652.21 memory_delta=4194304
INFO - 2026-03-09 04:26:24 --> [REQ_ID=b89cc111458c] [PERF] Execution time=0.650265
DEBUG - 2026-03-09 04:26:24 --> [REQ_ID=2a6eae940e53] [REQUEST][END]
INFO - 2026-03-09 04:26:24 --> [REQ_ID=2a6eae940e53] [PERF] Execution time=0.671095
DEBUG - 2026-03-09 04:26:26 --> [REQ_ID=7a08c5b38ef8] [REQUEST][START] GET /
DEBUG - 2026-03-09 04:26:26 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-09 04:26:26 --> [REQ_ID=7a08c5b38ef8] [FILTER_BEFORE] /
DEBUG - 2026-03-09 04:26:26 --> [REQ_ID=7a08c5b38ef8] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-09 04:26:26 --> [REQ_ID=7a08c5b38ef8] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-09 04:26:26 --> [CSRF] token name=csrf_test_name hash=99a3e47b054d768ad40175829289890a
DEBUG - 2026-03-09 04:26:26 --> [REQ_ID=efb936016e14] [INIT] App\Controllers\Home::GET
INFO - 2026-03-09 04:26:26 --> [REQ_ID=efb936016e14] [MEMORY][controller-start] 6291456
INFO - 2026-03-09 04:26:26 --> [REQ_ID=efb936016e14] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-09 04:26:26 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-09 04:26:26 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
DEBUG - 2026-03-09 04:26:26 --> [REQ_ID=efb936016e14] [VIEW_RENDER] themes/public/home
INFO - 2026-03-09 04:26:26 --> [REQ_ID=efb936016e14] [MEMORY][commonData:start] 8388608
INFO - 2026-03-09 04:26:26 --> themesMemory usage: 8388608
DEBUG - 2026-03-09 04:26:26 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-09 04:26:26 --> [REQ_ID=7a08c5b38ef8] [FILTER_AFTER]
DEBUG - 2026-03-09 04:26:26 --> [REQ_ID=7a08c5b38ef8] [LIFECYCLE][END] status=200 duration_ms=669.98 memory_delta=2097152
INFO - 2026-03-09 04:26:26 --> [REQ_ID=efb936016e14] [PERF] Execution time=0.669701
DEBUG - 2026-03-09 04:26:26 --> [REQ_ID=7a08c5b38ef8] [REQUEST][END]
INFO - 2026-03-09 04:26:26 --> [REQ_ID=7a08c5b38ef8] [PERF] Execution time=0.792079
DEBUG - 2026-03-09 04:26:29 --> [REQ_ID=b0396b15ee81] [REQUEST][START] GET /index.php/How-It-Works
DEBUG - 2026-03-09 04:26:29 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-09 04:26:29 --> [REQ_ID=b0396b15ee81] [FILTER_BEFORE] /index.php/How-It-Works
DEBUG - 2026-03-09 04:26:29 --> [REQ_ID=b0396b15ee81] [ROUTE] Controller=\App\Modules\Blog\Controllers\HowItWorksController Method=index
DEBUG - 2026-03-09 04:26:29 --> [REQ_ID=b0396b15ee81] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/How-It-Works
DEBUG - 2026-03-09 04:26:29 --> [CSRF] token name=csrf_test_name hash=99a3e47b054d768ad40175829289890a
DEBUG - 2026-03-09 04:26:29 --> [REQ_ID=1155f8ca7ae6] [INIT] App\Modules\Blog\Controllers\HowItWorksController::GET
INFO - 2026-03-09 04:26:29 --> [REQ_ID=1155f8ca7ae6] [MEMORY][controller-start] 6291456
DEBUG - 2026-03-09 04:26:29 --> [REQ_ID=1155f8ca7ae6] [METHOD_ENTRY] index
DEBUG - 2026-03-09 04:26:29 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-09 04:26:29 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-09 04:26:29 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-09 04:26:29 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-09 04:26:29 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-09 04:26:29 --> MyMICoin: guest context detected; skipping user-specific preload.
ERROR - 2026-03-09 04:26:29 --> HowItWorksController failure: overview
CRITICAL - 2026-03-09 04:26:29 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: GET, Route: How-It-Works]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-09 04:26:29 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-09 04:26:29 --> [404] URI=https://www.mymiwallet.com/index.php/How-It-Works
WARNING - 2026-03-09 04:26:29 --> 404 route miss: https://www.mymiwallet.com/index.php/How-It-Works | referrer: none
ERROR - 2026-03-09 04:26:29 --> [ERROR_PAGE] event=error_404 status=404 message=Page not found.
INFO - 2026-03-09 04:26:29 --> [REQ_ID=1155f8ca7ae6] [PERF] Execution time=0.112681
DEBUG - 2026-03-09 04:26:35 --> [REQ_ID=c84c16299a46] [REQUEST][START] GET /index.php/Support
DEBUG - 2026-03-09 04:26:35 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-09 04:26:35 --> [REQ_ID=c84c16299a46] [FILTER_BEFORE] /index.php/Support
DEBUG - 2026-03-09 04:26:35 --> [REQ_ID=c84c16299a46] [ROUTE] Controller=\App\Modules\Support\Controllers\SupportController Method=index
DEBUG - 2026-03-09 04:26:35 --> [REQ_ID=c84c16299a46] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Support
DEBUG - 2026-03-09 04:26:35 --> [CSRF] token name=csrf_test_name hash=99a3e47b054d768ad40175829289890a
DEBUG - 2026-03-09 04:26:35 --> [REQ_ID=0844ebb3a197] [INIT] App\Modules\Support\Controllers\SupportController::GET
INFO - 2026-03-09 04:26:35 --> [REQ_ID=0844ebb3a197] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-09 04:26:35 --> [REQ_ID=0844ebb3a197] [METHOD_ENTRY] index
DEBUG - 2026-03-09 04:26:35 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-09 04:26:35 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-09 04:26:35 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-09 04:26:35 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-09 04:26:35 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-09 04:26:35 --> MyMICoin: guest context detected; skipping user-specific preload.
INFO - 2026-03-09 04:26:35 --> [REQ_ID=0844ebb3a197] [MEMORY][commonData:start] 4194304
DEBUG - 2026-03-09 04:26:35 --> [REQ_ID=0844ebb3a197] [VIEW_RENDER] SupportModule\Views\Support\index
INFO - 2026-03-09 04:26:35 --> [REQ_ID=0844ebb3a197] [MEMORY][commonData:start] 4194304
INFO - 2026-03-09 04:26:35 --> themesMemory usage: 4194304
DEBUG - 2026-03-09 04:26:35 --> [REQ_ID=c84c16299a46] [FILTER_AFTER]
DEBUG - 2026-03-09 04:26:35 --> [REQ_ID=c84c16299a46] [LIFECYCLE][END] status=200 duration_ms=135.20 memory_delta=0
INFO - 2026-03-09 04:26:35 --> [REQ_ID=0844ebb3a197] [PERF] Execution time=0.131647
DEBUG - 2026-03-09 04:26:35 --> [REQ_ID=c84c16299a46] [REQUEST][END]
INFO - 2026-03-09 04:26:35 --> [REQ_ID=c84c16299a46] [PERF] Execution time=0.251149
DEBUG - 2026-03-09 04:31:17 --> [REQ_ID=9edb7dae9c24] [REQUEST][START] HEAD /
DEBUG - 2026-03-09 04:31:17 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-09 04:31:17 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-09 04:31:17 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-09 04:31:17 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-09 04:31:17 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-09 04:36:17 --> [REQ_ID=cd50e3e9bc25] [REQUEST][START] HEAD /
DEBUG - 2026-03-09 04:36:17 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-09 04:36:17 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-09 04:36:17 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-09 04:36:17 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-09 04:36:17 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-09 04:36:17 --> [REQ_ID=966015175e4b] [REQUEST][START] GET /
DEBUG - 2026-03-09 04:36:17 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-09 04:36:17 --> [REQ_ID=966015175e4b] [FILTER_BEFORE] /
DEBUG - 2026-03-09 04:36:17 --> [REQ_ID=966015175e4b] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-09 04:36:17 --> [REQ_ID=966015175e4b] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-09 04:36:17 --> [CSRF] token name=csrf_test_name hash=1d467a63978dc265df8709f98fe29fad
DEBUG - 2026-03-09 04:36:17 --> [REQ_ID=2fb2e46fbca9] [INIT] App\Controllers\Home::GET
INFO - 2026-03-09 04:36:17 --> [REQ_ID=2fb2e46fbca9] [MEMORY][controller-start] 4194304
INFO - 2026-03-09 04:36:17 --> [REQ_ID=2fb2e46fbca9] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-09 04:36:17 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-09 04:36:18 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-03-09 04:36:18 --> [REQ_ID=2fb2e46fbca9] [VIEW_RENDER] themes/public/home
INFO - 2026-03-09 04:36:18 --> [REQ_ID=2fb2e46fbca9] [MEMORY][commonData:start] 8388608
INFO - 2026-03-09 04:36:18 --> themesMemory usage: 8388608
DEBUG - 2026-03-09 04:36:18 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-09 04:36:18 --> [REQ_ID=966015175e4b] [FILTER_AFTER]
DEBUG - 2026-03-09 04:36:18 --> [REQ_ID=966015175e4b] [LIFECYCLE][END] status=200 duration_ms=829.19 memory_delta=4194304
INFO - 2026-03-09 04:36:18 --> [REQ_ID=2fb2e46fbca9] [PERF] Execution time=0.823680
DEBUG - 2026-03-09 04:36:18 --> [REQ_ID=966015175e4b] [REQUEST][END]
INFO - 2026-03-09 04:36:18 --> [REQ_ID=966015175e4b] [PERF] Execution time=0.882647
DEBUG - 2026-03-09 04:41:17 --> [REQ_ID=ae305828ba35] [REQUEST][START] HEAD /
DEBUG - 2026-03-09 04:41:17 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-09 04:41:17 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-09 04:41:17 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-09 04:41:17 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-09 04:41:17 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-09 04:44:07 --> [REQ_ID=139f33f94582] [REQUEST][START] GET /index.php/Trade-Tracker
DEBUG - 2026-03-09 04:44:07 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-09 04:44:07 --> [REQ_ID=139f33f94582] [FILTER_BEFORE] /index.php/Trade-Tracker
DEBUG - 2026-03-09 04:44:07 --> [REQ_ID=139f33f94582] [ROUTE] Controller=\App\Modules\User\Controllers\InvestmentsController Method=tradeTracker
DEBUG - 2026-03-09 04:44:07 --> [REQ_ID=139f33f94582] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Trade-Tracker
DEBUG - 2026-03-09 04:44:07 --> [CSRF] token name=csrf_test_name hash=fb84acb4b20c621a533b96ad0a7a7a54
DEBUG - 2026-03-09 04:44:07 --> [REQ_ID=139f33f94582] [REQUEST][END]
INFO - 2026-03-09 04:44:07 --> [REQ_ID=139f33f94582] [PERF] Execution time=0.055245
DEBUG - 2026-03-09 04:44:08 --> [REQ_ID=40550aabe8be] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-09 04:44:08 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-09 04:44:08 --> [REQ_ID=40550aabe8be] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-09 04:44:08 --> [REQ_ID=40550aabe8be] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-09 04:44:08 --> [REQ_ID=40550aabe8be] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-09 04:44:08 --> [CSRF] token name=csrf_test_name hash=6b1d3d612cf23285fbb9a35d8d2a5c11
DEBUG - 2026-03-09 04:44:08 --> [REQ_ID=faf22c282402] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-09 04:44:08 --> [REQ_ID=faf22c282402] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-09 04:44:08 --> [REQ_ID=40550aabe8be] [FILTER_AFTER]
DEBUG - 2026-03-09 04:44:08 --> [REQ_ID=40550aabe8be] [LIFECYCLE][END] status=200 duration_ms=460.73 memory_delta=0
INFO - 2026-03-09 04:44:08 --> [REQ_ID=faf22c282402] [PERF] Execution time=0.460480
DEBUG - 2026-03-09 04:44:08 --> [REQ_ID=40550aabe8be] [REQUEST][END]
INFO - 2026-03-09 04:44:08 --> [REQ_ID=40550aabe8be] [PERF] Execution time=0.473202
DEBUG - 2026-03-09 04:46:17 --> [REQ_ID=a4d9e01d1cce] [REQUEST][START] HEAD /
DEBUG - 2026-03-09 04:46:17 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-09 04:46:17 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-09 04:46:17 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-09 04:46:17 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-09 04:46:17 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-09 04:47:01 --> [REQ_ID=7096c986fb99] [REQUEST][START] GET /index.php/How-It-Works/Investment-Portfolio-Management
DEBUG - 2026-03-09 04:47:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-09 04:47:01 --> [REQ_ID=7096c986fb99] [FILTER_BEFORE] /index.php/How-It-Works/Investment-Portfolio-Management
DEBUG - 2026-03-09 04:47:01 --> [REQ_ID=7096c986fb99] [ROUTE] Controller=\App\Modules\Blog\Controllers\HowItWorksController Method=InvestmentPortfolioManagement
DEBUG - 2026-03-09 04:47:01 --> [REQ_ID=7096c986fb99] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/How-It-Works/Investment-Portfolio-Management
DEBUG - 2026-03-09 04:47:01 --> [CSRF] token name=csrf_test_name hash=695fb45fea1a3b4c21944efaca6526a6
DEBUG - 2026-03-09 04:47:01 --> [REQ_ID=1a2961db5c7d] [INIT] App\Modules\Blog\Controllers\HowItWorksController::GET
INFO - 2026-03-09 04:47:01 --> [REQ_ID=1a2961db5c7d] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-09 04:47:01 --> [REQ_ID=1a2961db5c7d] [METHOD_ENTRY] InvestmentPortfolioManagement
DEBUG - 2026-03-09 04:47:01 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-09 04:47:01 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-09 04:47:01 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-09 04:47:01 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-09 04:47:01 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-09 04:47:01 --> MyMICoin: guest context detected; skipping user-specific preload.
INFO - 2026-03-09 04:47:01 --> [REQ_ID=1a2961db5c7d] [MEMORY][commonData:start] 6291456
INFO - 2026-03-09 04:47:02 --> themesMemory usage: 8388608
DEBUG - 2026-03-09 04:47:02 --> [MetaService] slug=how-it-works/investment-portfolio-management pageName= cacheHit= path=DB
DEBUG - 2026-03-09 04:47:02 --> [REQ_ID=7096c986fb99] [FILTER_AFTER]
DEBUG - 2026-03-09 04:47:02 --> [REQ_ID=7096c986fb99] [LIFECYCLE][END] status=200 duration_ms=855.62 memory_delta=4194304
INFO - 2026-03-09 04:47:02 --> [REQ_ID=1a2961db5c7d] [PERF] Execution time=0.853061
DEBUG - 2026-03-09 04:47:02 --> [REQ_ID=7096c986fb99] [REQUEST][END]
INFO - 2026-03-09 04:47:02 --> [REQ_ID=7096c986fb99] [PERF] Execution time=0.880914
DEBUG - 2026-03-09 04:51:17 --> [REQ_ID=7d5ca05a9496] [REQUEST][START] HEAD /
DEBUG - 2026-03-09 04:51:17 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-09 04:51:17 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-09 04:51:17 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-09 04:51:17 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-09 04:51:17 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-09 04:51:53 --> [REQ_ID=2aa8c6d892dc] [REQUEST][START] HEAD /
DEBUG - 2026-03-09 04:51:53 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-09 04:51:53 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-09 04:51:53 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-09 04:51:53 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-09 04:51:53 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: none
DEBUG - 2026-03-09 04:53:20 --> [REQ_ID=b368cb3f3bc3] [REQUEST][START] GET /index.php/Management/Services
DEBUG - 2026-03-09 04:53:20 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-09 04:53:20 --> [REQ_ID=b368cb3f3bc3] [FILTER_BEFORE] /index.php/Management/Services
DEBUG - 2026-03-09 04:53:20 --> [REQ_ID=b368cb3f3bc3] [ROUTE] Controller=\App\Modules\Management\Controllers\ServicesController Method=index
DEBUG - 2026-03-09 04:53:20 --> [REQ_ID=b368cb3f3bc3] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Management/Services
DEBUG - 2026-03-09 04:53:20 --> [CSRF] token name=csrf_test_name hash=75cff0327acef0268f2f69c6f3583f53
DEBUG - 2026-03-09 04:53:20 --> [REQ_ID=b368cb3f3bc3] [REQUEST][END]
INFO - 2026-03-09 04:53:20 --> [REQ_ID=b368cb3f3bc3] [PERF] Execution time=0.026060
DEBUG - 2026-03-09 04:53:20 --> [REQ_ID=08c213088bdb] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-09 04:53:20 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-09 04:53:20 --> [REQ_ID=08c213088bdb] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-09 04:53:20 --> [REQ_ID=08c213088bdb] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-09 04:53:20 --> [REQ_ID=08c213088bdb] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-09 04:53:20 --> [CSRF] token name=csrf_test_name hash=8595647cee321ade0ebd157d94927833
DEBUG - 2026-03-09 04:53:20 --> [REQ_ID=e1214348d5a3] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-09 04:53:20 --> [REQ_ID=e1214348d5a3] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-09 04:53:20 --> [REQ_ID=08c213088bdb] [FILTER_AFTER]
DEBUG - 2026-03-09 04:53:20 --> [REQ_ID=08c213088bdb] [LIFECYCLE][END] status=200 duration_ms=30.26 memory_delta=0
INFO - 2026-03-09 04:53:20 --> [REQ_ID=e1214348d5a3] [PERF] Execution time=0.030014
DEBUG - 2026-03-09 04:53:20 --> [REQ_ID=08c213088bdb] [REQUEST][END]
INFO - 2026-03-09 04:53:20 --> [REQ_ID=08c213088bdb] [PERF] Execution time=0.052547
DEBUG - 2026-03-09 04:56:17 --> [REQ_ID=72372304188c] [REQUEST][START] HEAD /
DEBUG - 2026-03-09 04:56:17 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-09 04:56:17 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-09 04:56:17 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-09 04:56:17 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-09 04:56:17 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-09 05:00:01 --> [REQ_ID=211f91c1d9d1] [REQUEST][START] GET /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-09 05:00:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-09 05:00:01 --> [REQ_ID=211f91c1d9d1] [FILTER_BEFORE] /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-09 05:00:01 --> [REQ_ID=211f91c1d9d1] [ROUTE] Controller=\App\Modules\Management\Controllers\ManagementAPIController Method=Run_CRON_Tasks
DEBUG - 2026-03-09 05:00:01 --> [REQ_ID=211f91c1d9d1] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-09 05:00:01 --> [REQ_ID=211f91c1d9d1] [REQUEST][END]
INFO - 2026-03-09 05:00:01 --> [REQ_ID=211f91c1d9d1] [PERF] Execution time=0.051582
DEBUG - 2026-03-09 05:01:17 --> [REQ_ID=1571d1a1717e] [REQUEST][START] HEAD /
DEBUG - 2026-03-09 05:01:17 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-09 05:01:17 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-09 05:01:17 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-09 05:01:17 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-09 05:01:17 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-09 05:06:13 --> [REQ_ID=b1d94ef44a00] [REQUEST][START] GET /
DEBUG - 2026-03-09 05:06:13 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-09 05:06:13 --> [REQ_ID=b1d94ef44a00] [FILTER_BEFORE] /
DEBUG - 2026-03-09 05:06:13 --> [REQ_ID=b1d94ef44a00] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-09 05:06:13 --> [REQ_ID=b1d94ef44a00] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-09 05:06:13 --> [CSRF] token name=csrf_test_name hash=eedd3b812ee6f719f5db7d612556c0c1
DEBUG - 2026-03-09 05:06:13 --> [REQ_ID=cb33346958ab] [INIT] App\Controllers\Home::GET
INFO - 2026-03-09 05:06:13 --> [REQ_ID=cb33346958ab] [MEMORY][controller-start] 6291456
INFO - 2026-03-09 05:06:14 --> [REQ_ID=cb33346958ab] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-09 05:06:14 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-09 05:06:14 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-03-09 05:06:14 --> [REQ_ID=cb33346958ab] [VIEW_RENDER] themes/public/home
INFO - 2026-03-09 05:06:14 --> [REQ_ID=cb33346958ab] [MEMORY][commonData:start] 10485760
INFO - 2026-03-09 05:06:14 --> themesMemory usage: 10485760
DEBUG - 2026-03-09 05:06:14 --> [MetaService] slug= pageName=Home cacheHit= path=DB
DEBUG - 2026-03-09 05:06:14 --> [REQ_ID=b1d94ef44a00] [FILTER_AFTER]
DEBUG - 2026-03-09 05:06:14 --> [REQ_ID=b1d94ef44a00] [LIFECYCLE][END] status=200 duration_ms=757.67 memory_delta=4194304
INFO - 2026-03-09 05:06:14 --> [REQ_ID=cb33346958ab] [PERF] Execution time=0.755613
DEBUG - 2026-03-09 05:06:14 --> [REQ_ID=b1d94ef44a00] [REQUEST][END]
INFO - 2026-03-09 05:06:14 --> [REQ_ID=b1d94ef44a00] [PERF] Execution time=0.796511
DEBUG - 2026-03-09 05:06:17 --> [REQ_ID=04ffef8fbc6d] [REQUEST][START] HEAD /
DEBUG - 2026-03-09 05:06:17 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-09 05:06:17 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-09 05:06:17 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-09 05:06:17 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-09 05:06:17 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-09 05:08:24 --> [REQ_ID=29499bee5326] [REQUEST][START] GET /index.php/Management/Budgets
DEBUG - 2026-03-09 05:08:24 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-09 05:08:24 --> [REQ_ID=29499bee5326] [FILTER_BEFORE] /index.php/Management/Budgets
DEBUG - 2026-03-09 05:08:24 --> [REQ_ID=29499bee5326] [ROUTE] Controller=\App\Modules\Management\Controllers\BudgetsAdminController Method=index
DEBUG - 2026-03-09 05:08:24 --> [REQ_ID=29499bee5326] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Management/Budgets
DEBUG - 2026-03-09 05:08:24 --> [CSRF] token name=csrf_test_name hash=508d94b0ed1fba36055e5b7fd394bd92
DEBUG - 2026-03-09 05:08:24 --> [REQ_ID=29499bee5326] [REQUEST][END]
INFO - 2026-03-09 05:08:24 --> [REQ_ID=29499bee5326] [PERF] Execution time=0.054753
DEBUG - 2026-03-09 05:08:25 --> [REQ_ID=e5aae1e39830] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-09 05:08:25 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-09 05:08:25 --> [REQ_ID=e5aae1e39830] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-09 05:08:25 --> [REQ_ID=e5aae1e39830] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-09 05:08:25 --> [REQ_ID=e5aae1e39830] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-09 05:08:25 --> [CSRF] token name=csrf_test_name hash=6a1015f6451ca9e022c01fc72c928a9b
DEBUG - 2026-03-09 05:08:25 --> [REQ_ID=2e0e7ae97c0b] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-09 05:08:25 --> [REQ_ID=2e0e7ae97c0b] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-09 05:08:25 --> [REQ_ID=e5aae1e39830] [FILTER_AFTER]
DEBUG - 2026-03-09 05:08:25 --> [REQ_ID=e5aae1e39830] [LIFECYCLE][END] status=200 duration_ms=122.12 memory_delta=0
INFO - 2026-03-09 05:08:25 --> [REQ_ID=2e0e7ae97c0b] [PERF] Execution time=0.121843
DEBUG - 2026-03-09 05:08:25 --> [REQ_ID=e5aae1e39830] [REQUEST][END]
INFO - 2026-03-09 05:08:25 --> [REQ_ID=e5aae1e39830] [PERF] Execution time=0.134320
DEBUG - 2026-03-09 05:11:17 --> [REQ_ID=e804995fda21] [REQUEST][START] HEAD /
DEBUG - 2026-03-09 05:11:17 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-09 05:11:17 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-09 05:11:17 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-09 05:11:17 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-09 05:11:17 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-09 05:12:32 --> [REQ_ID=9ca67f18151a] [REQUEST][START] GET /index.php/Management/Users
DEBUG - 2026-03-09 05:12:32 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-09 05:12:32 --> [REQ_ID=9ca67f18151a] [FILTER_BEFORE] /index.php/Management/Users
DEBUG - 2026-03-09 05:12:32 --> [REQ_ID=9ca67f18151a] [ROUTE] Controller=\App\Modules\Management\Controllers\UsersController Method=index
DEBUG - 2026-03-09 05:12:32 --> [REQ_ID=9ca67f18151a] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Management/Users
DEBUG - 2026-03-09 05:12:32 --> [CSRF] token name=csrf_test_name hash=8f915b37f55583768ba0c45b96242265
DEBUG - 2026-03-09 05:12:32 --> [REQ_ID=9ca67f18151a] [REQUEST][END]
INFO - 2026-03-09 05:12:32 --> [REQ_ID=9ca67f18151a] [PERF] Execution time=0.025407
DEBUG - 2026-03-09 05:12:33 --> [REQ_ID=f7d54f64d12d] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-09 05:12:33 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-09 05:12:33 --> [REQ_ID=f7d54f64d12d] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-09 05:12:33 --> [REQ_ID=f7d54f64d12d] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-09 05:12:33 --> [REQ_ID=f7d54f64d12d] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-09 05:12:33 --> [CSRF] token name=csrf_test_name hash=5129c7e6a12a5f08338891cfdffbe360
DEBUG - 2026-03-09 05:12:33 --> [REQ_ID=3516c583fb14] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-09 05:12:33 --> [REQ_ID=3516c583fb14] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-09 05:12:33 --> [REQ_ID=f7d54f64d12d] [FILTER_AFTER]
DEBUG - 2026-03-09 05:12:33 --> [REQ_ID=f7d54f64d12d] [LIFECYCLE][END] status=200 duration_ms=142.83 memory_delta=0
INFO - 2026-03-09 05:12:33 --> [REQ_ID=3516c583fb14] [PERF] Execution time=0.142683
DEBUG - 2026-03-09 05:12:33 --> [REQ_ID=f7d54f64d12d] [REQUEST][END]
INFO - 2026-03-09 05:12:33 --> [REQ_ID=f7d54f64d12d] [PERF] Execution time=0.158619
DEBUG - 2026-03-09 05:15:01 --> [REQ_ID=774e30ec75d0] [REQUEST][START] GET /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-09 05:15:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-09 05:15:01 --> [REQ_ID=774e30ec75d0] [FILTER_BEFORE] /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-09 05:15:01 --> [REQ_ID=774e30ec75d0] [ROUTE] Controller=\App\Modules\APIs\Controllers\AlertsAPIController Method=fetchEmailAlerts
DEBUG - 2026-03-09 05:15:01 --> [REQ_ID=774e30ec75d0] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-09 05:15:01 --> [REQ_ID=774e30ec75d0] [REQUEST][END]
INFO - 2026-03-09 05:15:01 --> [REQ_ID=774e30ec75d0] [PERF] Execution time=0.071153
DEBUG - 2026-03-09 05:16:17 --> [REQ_ID=b2f9ef0cf2d5] [REQUEST][START] HEAD /
DEBUG - 2026-03-09 05:16:17 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-09 05:16:17 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-09 05:16:17 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-09 05:16:17 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-09 05:16:17 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-09 05:21:17 --> [REQ_ID=356ed4a7c8d7] [REQUEST][START] HEAD /
DEBUG - 2026-03-09 05:21:17 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-09 05:21:17 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-09 05:21:17 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-09 05:21:17 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-09 05:21:17 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-09 05:26:17 --> [REQ_ID=c4e715badd5a] [REQUEST][START] HEAD /
DEBUG - 2026-03-09 05:26:17 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-09 05:26:17 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-09 05:26:17 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-09 05:26:17 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-09 05:26:17 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-09 05:30:45 --> [REQ_ID=f027f829fb0e] [REQUEST][START] GET /
DEBUG - 2026-03-09 05:30:45 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-09 05:30:45 --> [REQ_ID=f027f829fb0e] [FILTER_BEFORE] /
DEBUG - 2026-03-09 05:30:45 --> [REQ_ID=f027f829fb0e] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-09 05:30:45 --> [REQ_ID=f027f829fb0e] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-09 05:30:45 --> [CSRF] token name=csrf_test_name hash=2e9cfdfab9908424652e43f50784d49f
DEBUG - 2026-03-09 05:30:45 --> [REQ_ID=ac7f24ca10e1] [INIT] App\Controllers\Home::GET
INFO - 2026-03-09 05:30:45 --> [REQ_ID=ac7f24ca10e1] [MEMORY][controller-start] 6291456
INFO - 2026-03-09 05:30:45 --> [REQ_ID=ac7f24ca10e1] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-09 05:30:45 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-09 05:30:46 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-03-09 05:30:46 --> [REQ_ID=ac7f24ca10e1] [VIEW_RENDER] themes/public/home
INFO - 2026-03-09 05:30:46 --> [REQ_ID=ac7f24ca10e1] [MEMORY][commonData:start] 10485760
INFO - 2026-03-09 05:30:46 --> themesMemory usage: 10485760
DEBUG - 2026-03-09 05:30:46 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-09 05:30:46 --> [REQ_ID=f027f829fb0e] [FILTER_AFTER]
DEBUG - 2026-03-09 05:30:46 --> [REQ_ID=f027f829fb0e] [LIFECYCLE][END] status=200 duration_ms=828.73 memory_delta=4194304
INFO - 2026-03-09 05:30:46 --> [REQ_ID=ac7f24ca10e1] [PERF] Execution time=0.826357
DEBUG - 2026-03-09 05:30:46 --> [REQ_ID=f027f829fb0e] [REQUEST][END]
INFO - 2026-03-09 05:30:46 --> [REQ_ID=f027f829fb0e] [PERF] Execution time=0.866876
DEBUG - 2026-03-09 05:31:17 --> [REQ_ID=9fbaa039c2a8] [REQUEST][START] HEAD /
DEBUG - 2026-03-09 05:31:17 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-09 05:31:17 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-09 05:31:17 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-09 05:31:17 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-09 05:31:17 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-09 05:36:17 --> [REQ_ID=77d7972e84b3] [REQUEST][START] HEAD /
DEBUG - 2026-03-09 05:36:17 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-09 05:36:17 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-09 05:36:17 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-09 05:36:17 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-09 05:36:17 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-09 05:41:17 --> [REQ_ID=4e51aa1fa0a8] [REQUEST][START] HEAD /
DEBUG - 2026-03-09 05:41:17 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-09 05:41:17 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-09 05:41:17 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-09 05:41:17 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-09 05:41:17 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-09 05:46:17 --> [REQ_ID=a46cbb8382e0] [REQUEST][START] HEAD /
DEBUG - 2026-03-09 05:46:17 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-09 05:46:17 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-09 05:46:17 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-09 05:46:17 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-09 05:46:17 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-09 05:51:17 --> [REQ_ID=9a3bef664a43] [REQUEST][START] HEAD /
DEBUG - 2026-03-09 05:51:17 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-09 05:51:17 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-09 05:51:17 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-09 05:51:17 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-09 05:51:17 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-09 05:53:48 --> [REQ_ID=63cad5e05ef9] [REQUEST][START] GET /index.php/Management/Marketing/Promote/Solana
DEBUG - 2026-03-09 05:53:48 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-09 05:53:48 --> [REQ_ID=63cad5e05ef9] [FILTER_BEFORE] /index.php/Management/Marketing/Promote/Solana
DEBUG - 2026-03-09 05:53:48 --> [REQ_ID=63cad5e05ef9] [ROUTE] Controller=\App\Modules\Management\Controllers\MarketingAdminController Method=promote
DEBUG - 2026-03-09 05:53:48 --> [REQ_ID=63cad5e05ef9] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Management/Marketing/Promote/Solana
DEBUG - 2026-03-09 05:53:48 --> [CSRF] token name=csrf_test_name hash=0596953e57dfdb8b865dbf8e5a71666e
DEBUG - 2026-03-09 05:53:48 --> [REQ_ID=63cad5e05ef9] [REQUEST][END]
INFO - 2026-03-09 05:53:48 --> [REQ_ID=63cad5e05ef9] [PERF] Execution time=0.060407
DEBUG - 2026-03-09 05:53:48 --> [REQ_ID=1f49781f66da] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-09 05:53:48 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-09 05:53:49 --> [REQ_ID=1f49781f66da] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-09 05:53:49 --> [REQ_ID=1f49781f66da] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-09 05:53:49 --> [REQ_ID=1f49781f66da] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-09 05:53:49 --> [CSRF] token name=csrf_test_name hash=29947302f2e59b861c1f329a4e7e6747
DEBUG - 2026-03-09 05:53:49 --> [REQ_ID=d442d4584ab2] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-09 05:53:49 --> [REQ_ID=d442d4584ab2] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-09 05:53:49 --> [REQ_ID=1f49781f66da] [FILTER_AFTER]
DEBUG - 2026-03-09 05:53:49 --> [REQ_ID=1f49781f66da] [LIFECYCLE][END] status=200 duration_ms=180.98 memory_delta=0
INFO - 2026-03-09 05:53:49 --> [REQ_ID=d442d4584ab2] [PERF] Execution time=0.180776
DEBUG - 2026-03-09 05:53:49 --> [REQ_ID=1f49781f66da] [REQUEST][END]
INFO - 2026-03-09 05:53:49 --> [REQ_ID=1f49781f66da] [PERF] Execution time=0.192743
DEBUG - 2026-03-09 05:56:17 --> [REQ_ID=28b22b342826] [REQUEST][START] HEAD /
DEBUG - 2026-03-09 05:56:17 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-09 05:56:17 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-09 05:56:17 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-09 05:56:17 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-09 05:56:17 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-09 06:00:02 --> [REQ_ID=822dd755c2fb] [REQUEST][START] GET /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-09 06:00:02 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-09 06:00:02 --> [REQ_ID=822dd755c2fb] [FILTER_BEFORE] /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-09 06:00:02 --> [REQ_ID=822dd755c2fb] [ROUTE] Controller=\App\Modules\Management\Controllers\ManagementAPIController Method=Run_CRON_Tasks
DEBUG - 2026-03-09 06:00:02 --> [REQ_ID=822dd755c2fb] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-09 06:00:02 --> [REQ_ID=822dd755c2fb] [REQUEST][END]
INFO - 2026-03-09 06:00:02 --> [REQ_ID=822dd755c2fb] [PERF] Execution time=0.049567
DEBUG - 2026-03-09 06:01:17 --> [REQ_ID=0f3fbf0ea8ac] [REQUEST][START] HEAD /
DEBUG - 2026-03-09 06:01:17 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-09 06:01:17 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-09 06:01:17 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-09 06:01:17 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-09 06:01:17 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-09 06:06:17 --> [REQ_ID=15a7b829e2d7] [REQUEST][START] HEAD /
DEBUG - 2026-03-09 06:06:17 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-09 06:06:17 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-09 06:06:17 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-09 06:06:17 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-09 06:06:17 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-09 06:09:52 --> [REQ_ID=decf95e47d8f] [REQUEST][START] GET /
DEBUG - 2026-03-09 06:09:52 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-09 06:09:52 --> [REQ_ID=decf95e47d8f] [FILTER_BEFORE] /
DEBUG - 2026-03-09 06:09:52 --> [REQ_ID=decf95e47d8f] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-09 06:09:52 --> [REQ_ID=decf95e47d8f] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-09 06:09:52 --> [CSRF] token name=csrf_test_name hash=fec4bcf7dae3ba8d0ef45f2cf867af22
DEBUG - 2026-03-09 06:09:52 --> [REQ_ID=68c817f05ca3] [INIT] App\Controllers\Home::GET
INFO - 2026-03-09 06:09:52 --> [REQ_ID=68c817f05ca3] [MEMORY][controller-start] 6291456
INFO - 2026-03-09 06:09:52 --> [REQ_ID=68c817f05ca3] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-09 06:09:52 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-09 06:09:53 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-03-09 06:09:53 --> [REQ_ID=68c817f05ca3] [VIEW_RENDER] themes/public/home
INFO - 2026-03-09 06:09:53 --> [REQ_ID=68c817f05ca3] [MEMORY][commonData:start] 10485760
INFO - 2026-03-09 06:09:53 --> themesMemory usage: 10485760
DEBUG - 2026-03-09 06:09:53 --> [MetaService] slug= pageName=Home cacheHit= path=DB
DEBUG - 2026-03-09 06:09:53 --> [REQ_ID=decf95e47d8f] [FILTER_AFTER]
DEBUG - 2026-03-09 06:09:53 --> [REQ_ID=decf95e47d8f] [LIFECYCLE][END] status=200 duration_ms=623.52 memory_delta=4194304
INFO - 2026-03-09 06:09:53 --> [REQ_ID=68c817f05ca3] [PERF] Execution time=0.621562
DEBUG - 2026-03-09 06:09:53 --> [REQ_ID=decf95e47d8f] [REQUEST][END]
INFO - 2026-03-09 06:09:53 --> [REQ_ID=decf95e47d8f] [PERF] Execution time=0.666070
DEBUG - 2026-03-09 06:11:17 --> [REQ_ID=f11ff3bb7311] [REQUEST][START] HEAD /
DEBUG - 2026-03-09 06:11:17 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-09 06:11:17 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-09 06:11:17 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-09 06:11:17 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-09 06:11:17 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-09 06:15:01 --> [REQ_ID=07f34f82987e] [REQUEST][START] GET /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-09 06:15:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-09 06:15:01 --> [REQ_ID=07f34f82987e] [FILTER_BEFORE] /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-09 06:15:01 --> [REQ_ID=07f34f82987e] [ROUTE] Controller=\App\Modules\APIs\Controllers\AlertsAPIController Method=fetchEmailAlerts
DEBUG - 2026-03-09 06:15:01 --> [REQ_ID=07f34f82987e] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-09 06:15:01 --> [REQ_ID=07f34f82987e] [REQUEST][END]
INFO - 2026-03-09 06:15:01 --> [REQ_ID=07f34f82987e] [PERF] Execution time=0.048180
DEBUG - 2026-03-09 06:16:17 --> [REQ_ID=bdb197e7de60] [REQUEST][START] HEAD /
DEBUG - 2026-03-09 06:16:17 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-09 06:16:17 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-09 06:16:17 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-09 06:16:17 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-09 06:16:17 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-09 06:18:43 --> [REQ_ID=92093605c140] [REQUEST][START] GET /index.php/Dashboard
DEBUG - 2026-03-09 06:18:43 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-09 06:18:43 --> [REQ_ID=92093605c140] [FILTER_BEFORE] /index.php/Dashboard
DEBUG - 2026-03-09 06:18:43 --> [REQ_ID=92093605c140] [ROUTE] Controller=\App\Modules\User\Controllers\DashboardController Method=index
DEBUG - 2026-03-09 06:18:43 --> [REQ_ID=92093605c140] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Dashboard
DEBUG - 2026-03-09 06:18:43 --> [CSRF] token name=csrf_test_name hash=b222291ef8919e58165a37546b6b7cb7
DEBUG - 2026-03-09 06:18:43 --> [REQ_ID=92093605c140] [REQUEST][END]
INFO - 2026-03-09 06:18:43 --> [REQ_ID=92093605c140] [PERF] Execution time=0.057973
DEBUG - 2026-03-09 06:18:43 --> [REQ_ID=18af9dc28f08] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-09 06:18:43 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-09 06:18:43 --> [REQ_ID=18af9dc28f08] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-09 06:18:43 --> [REQ_ID=18af9dc28f08] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-09 06:18:43 --> [REQ_ID=18af9dc28f08] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-09 06:18:43 --> [CSRF] token name=csrf_test_name hash=5b33187a6d5acca98fd624480c1a6173
DEBUG - 2026-03-09 06:18:43 --> [REQ_ID=52c3eab15588] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-09 06:18:43 --> [REQ_ID=52c3eab15588] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-09 06:18:44 --> [REQ_ID=18af9dc28f08] [FILTER_AFTER]
DEBUG - 2026-03-09 06:18:44 --> [REQ_ID=18af9dc28f08] [LIFECYCLE][END] status=200 duration_ms=212.85 memory_delta=0
INFO - 2026-03-09 06:18:44 --> [REQ_ID=52c3eab15588] [PERF] Execution time=0.212565
DEBUG - 2026-03-09 06:18:44 --> [REQ_ID=18af9dc28f08] [REQUEST][END]
INFO - 2026-03-09 06:18:44 --> [REQ_ID=18af9dc28f08] [PERF] Execution time=0.225834
DEBUG - 2026-03-09 06:21:17 --> [REQ_ID=d33ec88f278d] [REQUEST][START] HEAD /
DEBUG - 2026-03-09 06:21:17 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-09 06:21:17 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-09 06:21:17 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-09 06:21:17 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-09 06:21:17 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-09 06:26:17 --> [REQ_ID=bb767e4462ea] [REQUEST][START] HEAD /
DEBUG - 2026-03-09 06:26:17 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-09 06:26:17 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-09 06:26:17 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-09 06:26:17 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-09 06:26:17 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-09 06:26:23 --> [REQ_ID=7414137e6763] [REQUEST][START] GET /index.php/Budget/Financial-Advisors
DEBUG - 2026-03-09 06:26:23 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
INFO - 2026-03-09 06:26:23 --> REDIRECTED ROUTE at https://www.mymiwallet.com/Advisor
DEBUG - 2026-03-09 06:26:23 --> [REQ_ID=7414137e6763] [REQUEST][END]
INFO - 2026-03-09 06:26:23 --> [REQ_ID=7414137e6763] [PERF] Execution time=0.017281
DEBUG - 2026-03-09 06:31:17 --> [REQ_ID=ac7fa46fe572] [REQUEST][START] HEAD /
DEBUG - 2026-03-09 06:31:17 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-09 06:31:17 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-09 06:31:17 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-09 06:31:17 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-09 06:31:17 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-09 06:35:50 --> [REQ_ID=4511a5a4ea62] [REQUEST][START] GET /index.php/Legal/Privacy-Policy
DEBUG - 2026-03-09 06:35:50 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-09 06:35:50 --> [REQ_ID=4511a5a4ea62] [FILTER_BEFORE] /index.php/Legal/Privacy-Policy
DEBUG - 2026-03-09 06:35:50 --> [REQ_ID=4511a5a4ea62] [ROUTE] Controller=\App\Controllers\Home Method=privacyPolicy
DEBUG - 2026-03-09 06:35:50 --> [REQ_ID=4511a5a4ea62] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Legal/Privacy-Policy
DEBUG - 2026-03-09 06:35:50 --> [CSRF] token name=csrf_test_name hash=84a9cb5ece6a2fb89559681b4d6efee8
DEBUG - 2026-03-09 06:35:50 --> [REQ_ID=4511a5a4ea62] [REQUEST][END]
INFO - 2026-03-09 06:35:50 --> [REQ_ID=4511a5a4ea62] [PERF] Execution time=0.052054
DEBUG - 2026-03-09 06:35:50 --> [REQ_ID=50293e88a45b] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-09 06:35:50 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-09 06:35:50 --> [REQ_ID=50293e88a45b] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-09 06:35:50 --> [REQ_ID=50293e88a45b] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-09 06:35:50 --> [REQ_ID=50293e88a45b] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-09 06:35:50 --> [CSRF] token name=csrf_test_name hash=b8c7e5f4baf4d8817e0a9fa841393666
DEBUG - 2026-03-09 06:35:50 --> [REQ_ID=beb2f4bbcd23] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-09 06:35:50 --> [REQ_ID=beb2f4bbcd23] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-09 06:35:51 --> [REQ_ID=50293e88a45b] [FILTER_AFTER]
DEBUG - 2026-03-09 06:35:51 --> [REQ_ID=50293e88a45b] [LIFECYCLE][END] status=200 duration_ms=364.00 memory_delta=0
INFO - 2026-03-09 06:35:51 --> [REQ_ID=beb2f4bbcd23] [PERF] Execution time=0.363896
DEBUG - 2026-03-09 06:35:51 --> [REQ_ID=50293e88a45b] [REQUEST][END]
INFO - 2026-03-09 06:35:51 --> [REQ_ID=50293e88a45b] [PERF] Execution time=0.376545
DEBUG - 2026-03-09 06:36:17 --> [REQ_ID=03a3bf31ea6e] [REQUEST][START] HEAD /
DEBUG - 2026-03-09 06:36:17 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-09 06:36:17 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-09 06:36:17 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-09 06:36:17 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-09 06:36:17 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-09 06:37:50 --> [REQ_ID=5e73a9c17c63] [REQUEST][START] GET /index.php/Management/Marketing/Post-Creator
DEBUG - 2026-03-09 06:37:50 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-09 06:37:50 --> [REQ_ID=5e73a9c17c63] [FILTER_BEFORE] /index.php/Management/Marketing/Post-Creator
DEBUG - 2026-03-09 06:37:50 --> [REQ_ID=5e73a9c17c63] [ROUTE] Controller=\App\Modules\Management\Controllers\MarketingAdminController Method=postCreator
DEBUG - 2026-03-09 06:37:50 --> [REQ_ID=5e73a9c17c63] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Management/Marketing/Post-Creator
DEBUG - 2026-03-09 06:37:50 --> [CSRF] token name=csrf_test_name hash=0e85f0748834eb323102d220b11e2f54
DEBUG - 2026-03-09 06:37:50 --> [REQ_ID=5e73a9c17c63] [REQUEST][END]
INFO - 2026-03-09 06:37:50 --> [REQ_ID=5e73a9c17c63] [PERF] Execution time=0.059697
DEBUG - 2026-03-09 06:37:51 --> [REQ_ID=5d0729876e2a] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-09 06:37:51 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-09 06:37:51 --> [REQ_ID=5d0729876e2a] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-09 06:37:51 --> [REQ_ID=5d0729876e2a] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-09 06:37:51 --> [REQ_ID=5d0729876e2a] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-09 06:37:51 --> [CSRF] token name=csrf_test_name hash=0022090abc1c7e6b544f8219c802d8ef
DEBUG - 2026-03-09 06:37:51 --> [REQ_ID=d3d76e0abef8] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-09 06:37:51 --> [REQ_ID=d3d76e0abef8] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-09 06:37:51 --> [REQ_ID=5d0729876e2a] [FILTER_AFTER]
DEBUG - 2026-03-09 06:37:51 --> [REQ_ID=5d0729876e2a] [LIFECYCLE][END] status=200 duration_ms=120.73 memory_delta=0
INFO - 2026-03-09 06:37:51 --> [REQ_ID=d3d76e0abef8] [PERF] Execution time=0.120446
DEBUG - 2026-03-09 06:37:51 --> [REQ_ID=5d0729876e2a] [REQUEST][END]
INFO - 2026-03-09 06:37:51 --> [REQ_ID=5d0729876e2a] [PERF] Execution time=0.132806
DEBUG - 2026-03-09 06:41:17 --> [REQ_ID=4660441692ab] [REQUEST][START] HEAD /
DEBUG - 2026-03-09 06:41:17 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-09 06:41:17 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-09 06:41:17 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-09 06:41:17 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-09 06:41:17 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-09 06:45:08 --> [REQ_ID=f813c5694988] [REQUEST][START] GET /
DEBUG - 2026-03-09 06:45:08 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-09 06:45:08 --> [REQ_ID=f813c5694988] [FILTER_BEFORE] /
DEBUG - 2026-03-09 06:45:08 --> [REQ_ID=f813c5694988] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-09 06:45:08 --> [REQ_ID=f813c5694988] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-09 06:45:08 --> [CSRF] token name=csrf_test_name hash=0d6eb05f59c7ee9ae745cfeff7f920e1
DEBUG - 2026-03-09 06:45:08 --> [REQ_ID=621053523384] [INIT] App\Controllers\Home::GET
INFO - 2026-03-09 06:45:08 --> [REQ_ID=621053523384] [MEMORY][controller-start] 6291456
INFO - 2026-03-09 06:45:09 --> [REQ_ID=621053523384] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-09 06:45:09 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-09 06:45:09 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-03-09 06:45:09 --> [REQ_ID=621053523384] [VIEW_RENDER] themes/public/home
INFO - 2026-03-09 06:45:09 --> [REQ_ID=621053523384] [MEMORY][commonData:start] 10485760
INFO - 2026-03-09 06:45:09 --> themesMemory usage: 10485760
DEBUG - 2026-03-09 06:45:09 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-09 06:45:09 --> [REQ_ID=f813c5694988] [FILTER_AFTER]
DEBUG - 2026-03-09 06:45:09 --> [REQ_ID=f813c5694988] [LIFECYCLE][END] status=200 duration_ms=704.80 memory_delta=4194304
INFO - 2026-03-09 06:45:09 --> [REQ_ID=621053523384] [PERF] Execution time=0.702274
DEBUG - 2026-03-09 06:45:09 --> [REQ_ID=f813c5694988] [REQUEST][END]
INFO - 2026-03-09 06:45:09 --> [REQ_ID=f813c5694988] [PERF] Execution time=0.746099
DEBUG - 2026-03-09 06:45:10 --> [REQ_ID=f3752a9b286a] [REQUEST][START] GET /
DEBUG - 2026-03-09 06:45:10 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-09 06:45:10 --> [REQ_ID=f3752a9b286a] [FILTER_BEFORE] /
DEBUG - 2026-03-09 06:45:10 --> [REQ_ID=f3752a9b286a] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-09 06:45:10 --> [REQ_ID=f3752a9b286a] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-09 06:45:10 --> [CSRF] token name=csrf_test_name hash=0d6eb05f59c7ee9ae745cfeff7f920e1
DEBUG - 2026-03-09 06:45:10 --> [REQ_ID=bd4cc34c920c] [INIT] App\Controllers\Home::GET
INFO - 2026-03-09 06:45:10 --> [REQ_ID=bd4cc34c920c] [MEMORY][controller-start] 4194304
INFO - 2026-03-09 06:45:10 --> [REQ_ID=bd4cc34c920c] [MEMORY][commonData:start] 4194304
DEBUG - 2026-03-09 06:45:10 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-09 06:45:10 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
DEBUG - 2026-03-09 06:45:10 --> [REQ_ID=bd4cc34c920c] [VIEW_RENDER] themes/public/home
INFO - 2026-03-09 06:45:10 --> [REQ_ID=bd4cc34c920c] [MEMORY][commonData:start] 8388608
INFO - 2026-03-09 06:45:10 --> themesMemory usage: 8388608
DEBUG - 2026-03-09 06:45:10 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-09 06:45:10 --> [REQ_ID=f3752a9b286a] [FILTER_AFTER]
DEBUG - 2026-03-09 06:45:10 --> [REQ_ID=f3752a9b286a] [LIFECYCLE][END] status=200 duration_ms=611.44 memory_delta=4194304
INFO - 2026-03-09 06:45:10 --> [REQ_ID=bd4cc34c920c] [PERF] Execution time=0.611070
DEBUG - 2026-03-09 06:45:10 --> [REQ_ID=f3752a9b286a] [REQUEST][END]
INFO - 2026-03-09 06:45:10 --> [REQ_ID=f3752a9b286a] [PERF] Execution time=0.620260
DEBUG - 2026-03-09 06:46:17 --> [REQ_ID=9bfd38b3887a] [REQUEST][START] HEAD /
DEBUG - 2026-03-09 06:46:17 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-09 06:46:17 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-09 06:46:17 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-09 06:46:17 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-09 06:46:17 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-09 06:47:04 --> [REQ_ID=276fb35c95e3] [REQUEST][START] GET /
DEBUG - 2026-03-09 06:47:04 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-09 06:47:04 --> [REQ_ID=276fb35c95e3] [FILTER_BEFORE] /
DEBUG - 2026-03-09 06:47:04 --> [REQ_ID=276fb35c95e3] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-09 06:47:04 --> [REQ_ID=276fb35c95e3] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-09 06:47:04 --> [CSRF] token name=csrf_test_name hash=c751c729f97e6818067305316d1af6c7
DEBUG - 2026-03-09 06:47:04 --> [REQ_ID=670d6203994b] [INIT] App\Controllers\Home::GET
INFO - 2026-03-09 06:47:04 --> [REQ_ID=670d6203994b] [MEMORY][controller-start] 4194304
INFO - 2026-03-09 06:47:04 --> [REQ_ID=670d6203994b] [MEMORY][commonData:start] 4194304
DEBUG - 2026-03-09 06:47:04 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-09 06:47:04 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
DEBUG - 2026-03-09 06:47:04 --> [REQ_ID=670d6203994b] [VIEW_RENDER] themes/public/home
INFO - 2026-03-09 06:47:04 --> [REQ_ID=670d6203994b] [MEMORY][commonData:start] 8388608
INFO - 2026-03-09 06:47:04 --> themesMemory usage: 8388608
DEBUG - 2026-03-09 06:47:04 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-09 06:47:04 --> [REQ_ID=276fb35c95e3] [FILTER_AFTER]
DEBUG - 2026-03-09 06:47:04 --> [REQ_ID=276fb35c95e3] [LIFECYCLE][END] status=200 duration_ms=553.93 memory_delta=4194304
INFO - 2026-03-09 06:47:04 --> [REQ_ID=670d6203994b] [PERF] Execution time=0.553586
DEBUG - 2026-03-09 06:47:04 --> [REQ_ID=276fb35c95e3] [REQUEST][END]
INFO - 2026-03-09 06:47:04 --> [REQ_ID=276fb35c95e3] [PERF] Execution time=0.564050
DEBUG - 2026-03-09 06:47:25 --> [REQ_ID=e77f517e2926] [REQUEST][START] GET /
DEBUG - 2026-03-09 06:47:25 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-09 06:47:25 --> [REQ_ID=e77f517e2926] [FILTER_BEFORE] /
DEBUG - 2026-03-09 06:47:25 --> [REQ_ID=e77f517e2926] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-09 06:47:25 --> [REQ_ID=e77f517e2926] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-09 06:47:25 --> [CSRF] token name=csrf_test_name hash=08750de942ad51730161c912ba052f35
DEBUG - 2026-03-09 06:47:25 --> [REQ_ID=e6281510119f] [INIT] App\Controllers\Home::GET
INFO - 2026-03-09 06:47:25 --> [REQ_ID=e6281510119f] [MEMORY][controller-start] 4194304
INFO - 2026-03-09 06:47:25 --> [REQ_ID=e6281510119f] [MEMORY][commonData:start] 4194304
DEBUG - 2026-03-09 06:47:25 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-09 06:47:25 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
DEBUG - 2026-03-09 06:47:25 --> [REQ_ID=e6281510119f] [VIEW_RENDER] themes/public/home
INFO - 2026-03-09 06:47:25 --> [REQ_ID=e6281510119f] [MEMORY][commonData:start] 8388608
INFO - 2026-03-09 06:47:25 --> themesMemory usage: 8388608
DEBUG - 2026-03-09 06:47:25 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-09 06:47:25 --> [REQ_ID=e77f517e2926] [FILTER_AFTER]
DEBUG - 2026-03-09 06:47:25 --> [REQ_ID=e77f517e2926] [LIFECYCLE][END] status=200 duration_ms=556.42 memory_delta=4194304
INFO - 2026-03-09 06:47:25 --> [REQ_ID=e6281510119f] [PERF] Execution time=0.556052
DEBUG - 2026-03-09 06:47:25 --> [REQ_ID=e77f517e2926] [REQUEST][END]
INFO - 2026-03-09 06:47:25 --> [REQ_ID=e77f517e2926] [PERF] Execution time=0.566266
DEBUG - 2026-03-09 06:51:17 --> [REQ_ID=be04e7ef8401] [REQUEST][START] HEAD /
DEBUG - 2026-03-09 06:51:17 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-09 06:51:17 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-09 06:51:17 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-09 06:51:17 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-09 06:51:17 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-09 06:56:17 --> [REQ_ID=705369a9b314] [REQUEST][START] HEAD /
DEBUG - 2026-03-09 06:56:17 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-09 06:56:17 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-09 06:56:17 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-09 06:56:17 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-09 06:56:17 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
INFO - 2026-03-09 07:00:01 --> [SPARK_START] App\Commands\AIOps\Run
INFO - 2026-03-09 07:00:01 --> [SPARK_MEMORY] 18874368
INFO - 2026-03-09 07:00:01 --> [spark:aiops:run] Intent
DEBUG - 2026-03-09 07:00:01 --> [REQ_ID=dacb3be5f02b] [REQUEST][START] GET /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-09 07:00:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-09 07:00:01 --> [REQ_ID=dacb3be5f02b] [FILTER_BEFORE] /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-09 07:00:01 --> [REQ_ID=dacb3be5f02b] [ROUTE] Controller=\App\Modules\Management\Controllers\ManagementAPIController Method=Run_CRON_Tasks
DEBUG - 2026-03-09 07:00:01 --> [REQ_ID=dacb3be5f02b] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-09 07:00:01 --> [REQ_ID=dacb3be5f02b] [REQUEST][END]
INFO - 2026-03-09 07:00:01 --> [REQ_ID=dacb3be5f02b] [PERF] Execution time=0.117457
INFO - 2026-03-09 07:00:01 --> [spark:ops:work] Started
INFO - 2026-03-09 07:00:01 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-03-09 07:00:01 --> [SPARK_MEMORY] 18874368
INFO - 2026-03-09 07:00:01 --> [spark:ops:work] Intent
INFO - 2026-03-09 07:00:01 --> [spark:ops:work] Completed
INFO - 2026-03-09 07:00:01 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.113157
INFO - 2026-03-09 07:00:01 --> [SPARK_MEMORY] 18874368
INFO - 2026-03-09 07:00:02 --> [AIOPS][SPARK][GOVERNANCE][spark:logs:summarize] Started
INFO - 2026-03-09 07:00:02 --> [SPARK_START] App\Commands\Logs\Summarize
INFO - 2026-03-09 07:00:02 --> [SPARK_MEMORY] 18874368
INFO - 2026-03-09 07:00:02 --> [spark:logs:summarize] Intent
INFO - 2026-03-09 07:00:02 --> [AIOPS][SPARK][GOVERNANCE][spark:logs:summarize] Completed
INFO - 2026-03-09 07:00:02 --> [SPARK_COMPLETE] App\Commands\Logs\Summarize duration=0.007103
INFO - 2026-03-09 07:00:02 --> [SPARK_MEMORY] 18874368
INFO - 2026-03-09 07:00:03 --> [spark:app:healthcheck] Started
INFO - 2026-03-09 07:00:03 --> [SPARK_START] App\Commands\App\Healthcheck
INFO - 2026-03-09 07:00:03 --> [SPARK_MEMORY] 18874368
INFO - 2026-03-09 07:00:03 --> [spark:app:healthcheck] Intent
DEBUG - 2026-03-09 07:00:03 --> LOG_HEALTHCHECK debug marker=c48e97854923
INFO - 2026-03-09 07:00:03 --> LOG_HEALTHCHECK info marker=c48e97854923
NOTICE - 2026-03-09 07:00:03 --> LOG_HEALTHCHECK probe marker=c48e97854923
INFO - 2026-03-09 07:00:03 --> [spark:app:healthcheck] Completed
INFO - 2026-03-09 07:00:03 --> [SPARK_COMPLETE] App\Commands\App\Healthcheck duration=0.039036
INFO - 2026-03-09 07:00:03 --> [SPARK_MEMORY] 18874368
INFO - 2026-03-09 07:00:03 --> [SPARK_COMPLETE] App\Commands\AIOps\Run duration=1.969553
INFO - 2026-03-09 07:00:03 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-03-09 07:01:17 --> [REQ_ID=6203afc197fe] [REQUEST][START] HEAD /
DEBUG - 2026-03-09 07:01:17 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-09 07:01:17 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-09 07:01:17 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-09 07:01:17 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-09 07:01:17 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-09 07:06:17 --> [REQ_ID=1558f98b7301] [REQUEST][START] HEAD /
DEBUG - 2026-03-09 07:06:17 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-09 07:06:17 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-09 07:06:17 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-09 07:06:17 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-09 07:06:17 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-09 07:11:17 --> [REQ_ID=fcd34ddb78b3] [REQUEST][START] HEAD /
DEBUG - 2026-03-09 07:11:17 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-09 07:11:17 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-09 07:11:17 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-09 07:11:17 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-09 07:11:17 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-09 07:12:08 --> [REQ_ID=ff21e9484647] [REQUEST][START] GET /
DEBUG - 2026-03-09 07:12:08 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-09 07:12:08 --> [REQ_ID=ff21e9484647] [FILTER_BEFORE] /
DEBUG - 2026-03-09 07:12:08 --> [REQ_ID=ff21e9484647] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-09 07:12:08 --> [REQ_ID=ff21e9484647] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-09 07:12:08 --> [CSRF] token name=csrf_test_name hash=ca6dcaf4e57fed4c4dce0f52258bf247
DEBUG - 2026-03-09 07:12:08 --> [REQ_ID=a91e44237b7e] [INIT] App\Controllers\Home::GET
INFO - 2026-03-09 07:12:08 --> [REQ_ID=a91e44237b7e] [MEMORY][controller-start] 4194304
INFO - 2026-03-09 07:12:08 --> [REQ_ID=a91e44237b7e] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-09 07:12:08 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-09 07:12:09 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-03-09 07:12:09 --> [REQ_ID=a91e44237b7e] [VIEW_RENDER] themes/public/home
INFO - 2026-03-09 07:12:09 --> [REQ_ID=a91e44237b7e] [MEMORY][commonData:start] 8388608
INFO - 2026-03-09 07:12:09 --> themesMemory usage: 8388608
DEBUG - 2026-03-09 07:12:09 --> [MetaService] slug= pageName=Home cacheHit= path=DB
DEBUG - 2026-03-09 07:12:09 --> [REQ_ID=ff21e9484647] [FILTER_AFTER]
DEBUG - 2026-03-09 07:12:09 --> [REQ_ID=ff21e9484647] [LIFECYCLE][END] status=200 duration_ms=745.79 memory_delta=4194304
INFO - 2026-03-09 07:12:09 --> [REQ_ID=a91e44237b7e] [PERF] Execution time=0.743098
DEBUG - 2026-03-09 07:12:09 --> [REQ_ID=ff21e9484647] [REQUEST][END]
INFO - 2026-03-09 07:12:09 --> [REQ_ID=ff21e9484647] [PERF] Execution time=0.765648
DEBUG - 2026-03-09 07:13:24 --> [REQ_ID=b1aa00efe50c] [REQUEST][START] GET /
DEBUG - 2026-03-09 07:13:24 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-09 07:13:24 --> [REQ_ID=b1aa00efe50c] [FILTER_BEFORE] /
DEBUG - 2026-03-09 07:13:24 --> [REQ_ID=b1aa00efe50c] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-09 07:13:24 --> [REQ_ID=b1aa00efe50c] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-09 07:13:24 --> [CSRF] token name=csrf_test_name hash=9d09a0757ec12a07cae2a8c9d3280976
DEBUG - 2026-03-09 07:13:24 --> [REQ_ID=3525c8d7790f] [INIT] App\Controllers\Home::GET
INFO - 2026-03-09 07:13:24 --> [REQ_ID=3525c8d7790f] [MEMORY][controller-start] 6291456
INFO - 2026-03-09 07:13:24 --> [REQ_ID=3525c8d7790f] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-09 07:13:24 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-09 07:13:25 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
DEBUG - 2026-03-09 07:13:25 --> [REQ_ID=3525c8d7790f] [VIEW_RENDER] themes/public/home
INFO - 2026-03-09 07:13:25 --> [REQ_ID=3525c8d7790f] [MEMORY][commonData:start] 8388608
INFO - 2026-03-09 07:13:25 --> themesMemory usage: 8388608
DEBUG - 2026-03-09 07:13:25 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-09 07:13:25 --> [REQ_ID=b1aa00efe50c] [FILTER_AFTER]
DEBUG - 2026-03-09 07:13:25 --> [REQ_ID=b1aa00efe50c] [LIFECYCLE][END] status=200 duration_ms=662.56 memory_delta=2097152
INFO - 2026-03-09 07:13:25 --> [REQ_ID=3525c8d7790f] [PERF] Execution time=0.662182
DEBUG - 2026-03-09 07:13:25 --> [REQ_ID=b1aa00efe50c] [REQUEST][END]
INFO - 2026-03-09 07:13:25 --> [REQ_ID=b1aa00efe50c] [PERF] Execution time=0.672734
DEBUG - 2026-03-09 07:15:02 --> [REQ_ID=290d746e6d58] [REQUEST][START] GET /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-09 07:15:02 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-09 07:15:02 --> [REQ_ID=290d746e6d58] [FILTER_BEFORE] /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-09 07:15:02 --> [REQ_ID=290d746e6d58] [ROUTE] Controller=\App\Modules\APIs\Controllers\AlertsAPIController Method=fetchEmailAlerts
DEBUG - 2026-03-09 07:15:02 --> [REQ_ID=290d746e6d58] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-09 07:15:02 --> [REQ_ID=290d746e6d58] [REQUEST][END]
INFO - 2026-03-09 07:15:02 --> [REQ_ID=290d746e6d58] [PERF] Execution time=0.047848
DEBUG - 2026-03-09 07:15:11 --> [REQ_ID=d0139b2e4331] [REQUEST][START] GET /
DEBUG - 2026-03-09 07:15:11 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-09 07:15:11 --> [REQ_ID=d0139b2e4331] [FILTER_BEFORE] /
DEBUG - 2026-03-09 07:15:11 --> [REQ_ID=d0139b2e4331] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-09 07:15:11 --> [REQ_ID=d0139b2e4331] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-09 07:15:11 --> [CSRF] token name=csrf_test_name hash=4cd0475bc890ff11c69f1447d73c50f0
DEBUG - 2026-03-09 07:15:11 --> [REQ_ID=9c9263e9cdc5] [INIT] App\Controllers\Home::GET
INFO - 2026-03-09 07:15:11 --> [REQ_ID=9c9263e9cdc5] [MEMORY][controller-start] 4194304
INFO - 2026-03-09 07:15:11 --> [REQ_ID=9c9263e9cdc5] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-09 07:15:11 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-09 07:15:12 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
DEBUG - 2026-03-09 07:15:12 --> [REQ_ID=9c9263e9cdc5] [VIEW_RENDER] themes/public/home
INFO - 2026-03-09 07:15:12 --> [REQ_ID=9c9263e9cdc5] [MEMORY][commonData:start] 8388608
INFO - 2026-03-09 07:15:12 --> themesMemory usage: 8388608
DEBUG - 2026-03-09 07:15:12 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-09 07:15:12 --> [REQ_ID=d0139b2e4331] [FILTER_AFTER]
DEBUG - 2026-03-09 07:15:12 --> [REQ_ID=d0139b2e4331] [LIFECYCLE][END] status=200 duration_ms=719.56 memory_delta=4194304
INFO - 2026-03-09 07:15:12 --> [REQ_ID=9c9263e9cdc5] [PERF] Execution time=0.718006
DEBUG - 2026-03-09 07:15:12 --> [REQ_ID=d0139b2e4331] [REQUEST][END]
INFO - 2026-03-09 07:15:12 --> [REQ_ID=d0139b2e4331] [PERF] Execution time=0.732268
DEBUG - 2026-03-09 07:15:56 --> [REQ_ID=d515e3be0dd7] [REQUEST][START] GET /
DEBUG - 2026-03-09 07:15:56 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-09 07:15:56 --> [REQ_ID=d515e3be0dd7] [FILTER_BEFORE] /
DEBUG - 2026-03-09 07:15:56 --> [REQ_ID=d515e3be0dd7] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-09 07:15:56 --> [REQ_ID=d515e3be0dd7] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-09 07:15:56 --> [CSRF] token name=csrf_test_name hash=76f9c7f4faeb59ff6a29ff9c88ff29a9
DEBUG - 2026-03-09 07:15:56 --> [REQ_ID=36f3684269f0] [INIT] App\Controllers\Home::GET
INFO - 2026-03-09 07:15:56 --> [REQ_ID=36f3684269f0] [MEMORY][controller-start] 6291456
INFO - 2026-03-09 07:15:56 --> [REQ_ID=36f3684269f0] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-09 07:15:56 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-09 07:15:57 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
DEBUG - 2026-03-09 07:15:57 --> [REQ_ID=36f3684269f0] [VIEW_RENDER] themes/public/home
INFO - 2026-03-09 07:15:57 --> [REQ_ID=36f3684269f0] [MEMORY][commonData:start] 8388608
INFO - 2026-03-09 07:15:57 --> themesMemory usage: 8388608
DEBUG - 2026-03-09 07:15:57 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-09 07:15:57 --> [REQ_ID=d515e3be0dd7] [FILTER_AFTER]
DEBUG - 2026-03-09 07:15:57 --> [REQ_ID=d515e3be0dd7] [LIFECYCLE][END] status=200 duration_ms=684.72 memory_delta=2097152
INFO - 2026-03-09 07:15:57 --> [REQ_ID=36f3684269f0] [PERF] Execution time=0.684449
DEBUG - 2026-03-09 07:15:57 --> [REQ_ID=d515e3be0dd7] [REQUEST][END]
INFO - 2026-03-09 07:15:57 --> [REQ_ID=d515e3be0dd7] [PERF] Execution time=0.694189
DEBUG - 2026-03-09 07:16:17 --> [REQ_ID=bda4fabd774a] [REQUEST][START] HEAD /
DEBUG - 2026-03-09 07:16:17 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-09 07:16:17 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-09 07:16:17 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-09 07:16:17 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-09 07:16:17 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-09 07:17:04 --> [REQ_ID=6bc6d5841b7b] [REQUEST][START] GET /
DEBUG - 2026-03-09 07:17:04 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-09 07:17:04 --> [REQ_ID=6bc6d5841b7b] [FILTER_BEFORE] /
DEBUG - 2026-03-09 07:17:04 --> [REQ_ID=6bc6d5841b7b] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-09 07:17:04 --> [REQ_ID=6bc6d5841b7b] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-09 07:17:04 --> [CSRF] token name=csrf_test_name hash=17799a68a7f3135cc3cf010dc9f82140
DEBUG - 2026-03-09 07:17:04 --> [REQ_ID=013a1730be5b] [INIT] App\Controllers\Home::GET
INFO - 2026-03-09 07:17:04 --> [REQ_ID=013a1730be5b] [MEMORY][controller-start] 4194304
INFO - 2026-03-09 07:17:05 --> [REQ_ID=013a1730be5b] [MEMORY][commonData:start] 4194304
DEBUG - 2026-03-09 07:17:05 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-09 07:17:05 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
DEBUG - 2026-03-09 07:17:05 --> [REQ_ID=013a1730be5b] [VIEW_RENDER] themes/public/home
INFO - 2026-03-09 07:17:05 --> [REQ_ID=013a1730be5b] [MEMORY][commonData:start] 8388608
INFO - 2026-03-09 07:17:05 --> themesMemory usage: 8388608
DEBUG - 2026-03-09 07:17:05 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-09 07:17:05 --> [REQ_ID=6bc6d5841b7b] [FILTER_AFTER]
DEBUG - 2026-03-09 07:17:05 --> [REQ_ID=6bc6d5841b7b] [LIFECYCLE][END] status=200 duration_ms=1,050.59 memory_delta=4194304
INFO - 2026-03-09 07:17:05 --> [REQ_ID=013a1730be5b] [PERF] Execution time=1.050197
DEBUG - 2026-03-09 07:17:05 --> [REQ_ID=6bc6d5841b7b] [REQUEST][END]
INFO - 2026-03-09 07:17:05 --> [REQ_ID=6bc6d5841b7b] [PERF] Execution time=1.060471
DEBUG - 2026-03-09 07:21:17 --> [REQ_ID=a54cf16e5626] [REQUEST][START] HEAD /
DEBUG - 2026-03-09 07:21:17 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-09 07:21:17 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-09 07:21:17 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-09 07:21:17 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-09 07:21:17 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-09 07:26:17 --> [REQ_ID=93a104253ec1] [REQUEST][START] HEAD /
DEBUG - 2026-03-09 07:26:17 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-09 07:26:17 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-09 07:26:17 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-09 07:26:17 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-09 07:26:17 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-09 07:26:20 --> [REQ_ID=21862682ca4c] [REQUEST][START] GET /
DEBUG - 2026-03-09 07:26:20 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-09 07:26:20 --> [REQ_ID=21862682ca4c] [FILTER_BEFORE] /
DEBUG - 2026-03-09 07:26:20 --> [REQ_ID=21862682ca4c] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-09 07:26:20 --> [REQ_ID=21862682ca4c] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-09 07:26:20 --> [CSRF] token name=csrf_test_name hash=b4f9360444f6844278881e90a491fcde
DEBUG - 2026-03-09 07:26:20 --> [REQ_ID=70b1d9ce4346] [INIT] App\Controllers\Home::GET
INFO - 2026-03-09 07:26:20 --> [REQ_ID=70b1d9ce4346] [MEMORY][controller-start] 4194304
INFO - 2026-03-09 07:26:20 --> [REQ_ID=70b1d9ce4346] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-09 07:26:20 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-09 07:26:21 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
DEBUG - 2026-03-09 07:26:21 --> [REQ_ID=70b1d9ce4346] [VIEW_RENDER] themes/public/home
INFO - 2026-03-09 07:26:21 --> [REQ_ID=70b1d9ce4346] [MEMORY][commonData:start] 8388608
INFO - 2026-03-09 07:26:21 --> themesMemory usage: 8388608
DEBUG - 2026-03-09 07:26:21 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-09 07:26:21 --> [REQ_ID=21862682ca4c] [FILTER_AFTER]
DEBUG - 2026-03-09 07:26:21 --> [REQ_ID=21862682ca4c] [LIFECYCLE][END] status=200 duration_ms=711.43 memory_delta=4194304
INFO - 2026-03-09 07:26:21 --> [REQ_ID=70b1d9ce4346] [PERF] Execution time=0.709281
DEBUG - 2026-03-09 07:26:21 --> [REQ_ID=21862682ca4c] [REQUEST][END]
INFO - 2026-03-09 07:26:21 --> [REQ_ID=21862682ca4c] [PERF] Execution time=0.732150
DEBUG - 2026-03-09 07:31:17 --> [REQ_ID=e743ab214b99] [REQUEST][START] HEAD /
DEBUG - 2026-03-09 07:31:17 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-09 07:31:17 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-09 07:31:17 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-09 07:31:17 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-09 07:31:17 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-09 07:36:17 --> [REQ_ID=4cd7cb8e8547] [REQUEST][START] HEAD /
DEBUG - 2026-03-09 07:36:17 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-09 07:36:17 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-09 07:36:17 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-09 07:36:17 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-09 07:36:17 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-09 07:37:31 --> [REQ_ID=90bdf50c8390] [REQUEST][START] GET /index.php/Projects
DEBUG - 2026-03-09 07:37:31 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-09 07:37:31 --> [REQ_ID=90bdf50c8390] [FILTER_BEFORE] /index.php/Projects
DEBUG - 2026-03-09 07:37:31 --> [REQ_ID=90bdf50c8390] [ROUTE] Controller=\App\Modules\User\Controllers\ProjectsController Method=index
DEBUG - 2026-03-09 07:37:31 --> [REQ_ID=90bdf50c8390] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Projects
DEBUG - 2026-03-09 07:37:31 --> [CSRF] token name=csrf_test_name hash=230e9754c2347026aae19036b9c5403c
DEBUG - 2026-03-09 07:37:31 --> [REQ_ID=90bdf50c8390] [REQUEST][END]
INFO - 2026-03-09 07:37:31 --> [REQ_ID=90bdf50c8390] [PERF] Execution time=0.030171
DEBUG - 2026-03-09 07:37:31 --> [REQ_ID=40623ed4cb4a] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-09 07:37:31 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-09 07:37:31 --> [REQ_ID=40623ed4cb4a] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-09 07:37:31 --> [REQ_ID=40623ed4cb4a] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-09 07:37:31 --> [REQ_ID=40623ed4cb4a] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-09 07:37:31 --> [CSRF] token name=csrf_test_name hash=09559f9f9d2397085c991d820c0327e2
DEBUG - 2026-03-09 07:37:31 --> [REQ_ID=d03a8bd0c0e5] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-09 07:37:31 --> [REQ_ID=d03a8bd0c0e5] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-09 07:37:31 --> [REQ_ID=40623ed4cb4a] [FILTER_AFTER]
DEBUG - 2026-03-09 07:37:31 --> [REQ_ID=40623ed4cb4a] [LIFECYCLE][END] status=200 duration_ms=36.27 memory_delta=0
INFO - 2026-03-09 07:37:31 --> [REQ_ID=d03a8bd0c0e5] [PERF] Execution time=0.036064
DEBUG - 2026-03-09 07:37:31 --> [REQ_ID=40623ed4cb4a] [REQUEST][END]
INFO - 2026-03-09 07:37:31 --> [REQ_ID=40623ed4cb4a] [PERF] Execution time=0.047784
DEBUG - 2026-03-09 07:37:34 --> [REQ_ID=278aa9d4722b] [REQUEST][START] GET /index.php/Support
DEBUG - 2026-03-09 07:37:34 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-09 07:37:34 --> [REQ_ID=278aa9d4722b] [FILTER_BEFORE] /index.php/Support
DEBUG - 2026-03-09 07:37:34 --> [REQ_ID=278aa9d4722b] [ROUTE] Controller=\App\Modules\Support\Controllers\SupportController Method=index
DEBUG - 2026-03-09 07:37:34 --> [REQ_ID=278aa9d4722b] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Support
DEBUG - 2026-03-09 07:37:34 --> [CSRF] token name=csrf_test_name hash=74d9be230c52b0b562fe56614ef55fb5
DEBUG - 2026-03-09 07:37:34 --> [REQ_ID=6c2e9e339582] [INIT] App\Modules\Support\Controllers\SupportController::GET
INFO - 2026-03-09 07:37:34 --> [REQ_ID=6c2e9e339582] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-09 07:37:34 --> [REQ_ID=6c2e9e339582] [METHOD_ENTRY] index
DEBUG - 2026-03-09 07:37:34 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-09 07:37:34 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-09 07:37:34 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-09 07:37:34 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-09 07:37:34 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-09 07:37:34 --> MyMICoin: guest context detected; skipping user-specific preload.
INFO - 2026-03-09 07:37:34 --> [REQ_ID=6c2e9e339582] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-09 07:37:34 --> [REQ_ID=6c2e9e339582] [VIEW_RENDER] SupportModule\Views\Support\index
INFO - 2026-03-09 07:37:34 --> [REQ_ID=6c2e9e339582] [MEMORY][commonData:start] 6291456
INFO - 2026-03-09 07:37:34 --> themesMemory usage: 6291456
DEBUG - 2026-03-09 07:37:34 --> [REQ_ID=278aa9d4722b] [FILTER_AFTER]
DEBUG - 2026-03-09 07:37:34 --> [REQ_ID=278aa9d4722b] [LIFECYCLE][END] status=200 duration_ms=99.82 memory_delta=2097152
INFO - 2026-03-09 07:37:34 --> [REQ_ID=6c2e9e339582] [PERF] Execution time=0.099556
DEBUG - 2026-03-09 07:37:34 --> [REQ_ID=278aa9d4722b] [REQUEST][END]
INFO - 2026-03-09 07:37:34 --> [REQ_ID=278aa9d4722b] [PERF] Execution time=0.110299
DEBUG - 2026-03-09 07:41:17 --> [REQ_ID=2c0dc3625876] [REQUEST][START] HEAD /
DEBUG - 2026-03-09 07:41:17 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-09 07:41:17 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-09 07:41:17 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-09 07:41:17 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-09 07:41:17 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-09 07:46:17 --> [REQ_ID=04272c9ad019] [REQUEST][START] HEAD /
DEBUG - 2026-03-09 07:46:17 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-09 07:46:17 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-09 07:46:17 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-09 07:46:17 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-09 07:46:17 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-09 07:47:18 --> [REQ_ID=73bca7e4c5ce] [REQUEST][START] GET /index.php/Account/Social-Media
DEBUG - 2026-03-09 07:47:18 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-09 07:47:18 --> [REQ_ID=73bca7e4c5ce] [FILTER_BEFORE] /index.php/Account/Social-Media
DEBUG - 2026-03-09 07:47:18 --> [REQ_ID=73bca7e4c5ce] [ROUTE] Controller=\App\Modules\User\Controllers\DashboardController Method=SocialMedia
DEBUG - 2026-03-09 07:47:18 --> [REQ_ID=73bca7e4c5ce] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Account/Social-Media
DEBUG - 2026-03-09 07:47:18 --> [CSRF] token name=csrf_test_name hash=f24795fa2e9f672ceaa323241112ad0d
DEBUG - 2026-03-09 07:47:18 --> [REQ_ID=73bca7e4c5ce] [REQUEST][END]
INFO - 2026-03-09 07:47:18 --> [REQ_ID=73bca7e4c5ce] [PERF] Execution time=0.031716
DEBUG - 2026-03-09 07:47:19 --> [REQ_ID=9192a35e6913] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-09 07:47:19 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-09 07:47:19 --> [REQ_ID=9192a35e6913] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-09 07:47:19 --> [REQ_ID=9192a35e6913] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-09 07:47:19 --> [REQ_ID=9192a35e6913] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-09 07:47:19 --> [CSRF] token name=csrf_test_name hash=13c3c94ec417d15e9d72a3b52ece1483
DEBUG - 2026-03-09 07:47:19 --> [REQ_ID=97ea36cb337f] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-09 07:47:19 --> [REQ_ID=97ea36cb337f] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-09 07:47:19 --> [REQ_ID=9192a35e6913] [FILTER_AFTER]
DEBUG - 2026-03-09 07:47:19 --> [REQ_ID=9192a35e6913] [LIFECYCLE][END] status=200 duration_ms=30.83 memory_delta=0
INFO - 2026-03-09 07:47:19 --> [REQ_ID=97ea36cb337f] [PERF] Execution time=0.030358
DEBUG - 2026-03-09 07:47:19 --> [REQ_ID=9192a35e6913] [REQUEST][END]
INFO - 2026-03-09 07:47:19 --> [REQ_ID=9192a35e6913] [PERF] Execution time=0.047899
DEBUG - 2026-03-09 07:51:17 --> [REQ_ID=db5948714c99] [REQUEST][START] HEAD /
DEBUG - 2026-03-09 07:51:17 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-09 07:51:17 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-09 07:51:17 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-09 07:51:17 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-09 07:51:17 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-09 07:54:22 --> [REQ_ID=6b1e62636d64] [REQUEST][START] GET /index.php/Purchase/MyMIGold
DEBUG - 2026-03-09 07:54:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-09 07:54:22 --> [REQ_ID=6b1e62636d64] [FILTER_BEFORE] /index.php/Purchase/MyMIGold
DEBUG - 2026-03-09 07:54:22 --> [REQ_ID=6b1e62636d64] [ROUTE] Controller=closure_route Method=index
DEBUG - 2026-03-09 07:54:22 --> [REQ_ID=6b1e62636d64] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Purchase/MyMIGold
DEBUG - 2026-03-09 07:54:22 --> [CSRF] token name=csrf_test_name hash=d9979be8473a048bfd6d7a6fd9879b7b
DEBUG - 2026-03-09 07:54:22 --> [REQ_ID=6b1e62636d64] [REQUEST][END]
INFO - 2026-03-09 07:54:22 --> [REQ_ID=6b1e62636d64] [PERF] Execution time=0.046746
DEBUG - 2026-03-09 07:54:22 --> [REQ_ID=72bc69fc0bd1] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-09 07:54:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-09 07:54:22 --> [REQ_ID=72bc69fc0bd1] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-09 07:54:22 --> [REQ_ID=72bc69fc0bd1] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-09 07:54:22 --> [REQ_ID=72bc69fc0bd1] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-09 07:54:22 --> [CSRF] token name=csrf_test_name hash=44dd2b9c4e75b68a05f15fbd1e28db9a
DEBUG - 2026-03-09 07:54:22 --> [REQ_ID=e3d05e0b51f5] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-09 07:54:22 --> [REQ_ID=e3d05e0b51f5] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-09 07:54:22 --> [REQ_ID=72bc69fc0bd1] [FILTER_AFTER]
DEBUG - 2026-03-09 07:54:22 --> [REQ_ID=72bc69fc0bd1] [LIFECYCLE][END] status=200 duration_ms=53.67 memory_delta=0
INFO - 2026-03-09 07:54:22 --> [REQ_ID=e3d05e0b51f5] [PERF] Execution time=0.053346
DEBUG - 2026-03-09 07:54:22 --> [REQ_ID=72bc69fc0bd1] [REQUEST][END]
INFO - 2026-03-09 07:54:22 --> [REQ_ID=72bc69fc0bd1] [PERF] Execution time=0.068876
DEBUG - 2026-03-09 07:56:17 --> [REQ_ID=2e439896677b] [REQUEST][START] HEAD /
DEBUG - 2026-03-09 07:56:17 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-09 07:56:17 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-09 07:56:17 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-09 07:56:17 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-09 07:56:17 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-09 07:57:29 --> [REQ_ID=0864ba5b75d5] [REQUEST][START] GET /index.php/Knowledgebase
DEBUG - 2026-03-09 07:57:29 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-09 07:57:29 --> [REQ_ID=0864ba5b75d5] [FILTER_BEFORE] /index.php/Knowledgebase
DEBUG - 2026-03-09 07:57:29 --> [REQ_ID=0864ba5b75d5] [ROUTE] Controller=\App\Modules\User\Controllers\KnowledgebaseController Method=index
DEBUG - 2026-03-09 07:57:29 --> [REQ_ID=0864ba5b75d5] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Knowledgebase
DEBUG - 2026-03-09 07:57:29 --> [CSRF] token name=csrf_test_name hash=8a355ce27bd216ed628c95ea930472c5
DEBUG - 2026-03-09 07:57:30 --> [REQ_ID=0864ba5b75d5] [REQUEST][END]
INFO - 2026-03-09 07:57:30 --> [REQ_ID=0864ba5b75d5] [PERF] Execution time=0.036635
DEBUG - 2026-03-09 07:57:30 --> [REQ_ID=6d3d641e1cd5] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-09 07:57:30 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-09 07:57:30 --> [REQ_ID=6d3d641e1cd5] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-09 07:57:30 --> [REQ_ID=6d3d641e1cd5] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-09 07:57:30 --> [REQ_ID=6d3d641e1cd5] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-09 07:57:30 --> [CSRF] token name=csrf_test_name hash=860a2e02fd3f305a69c91995a25ad18a
DEBUG - 2026-03-09 07:57:30 --> [REQ_ID=fdc01a6714ed] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-09 07:57:30 --> [REQ_ID=fdc01a6714ed] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-09 07:57:30 --> [REQ_ID=6d3d641e1cd5] [FILTER_AFTER]
DEBUG - 2026-03-09 07:57:30 --> [REQ_ID=6d3d641e1cd5] [LIFECYCLE][END] status=200 duration_ms=92.77 memory_delta=0
INFO - 2026-03-09 07:57:30 --> [REQ_ID=fdc01a6714ed] [PERF] Execution time=0.092615
DEBUG - 2026-03-09 07:57:30 --> [REQ_ID=6d3d641e1cd5] [REQUEST][END]
INFO - 2026-03-09 07:57:30 --> [REQ_ID=6d3d641e1cd5] [PERF] Execution time=0.106991
DEBUG - 2026-03-09 08:00:01 --> [REQ_ID=0aa2179ec180] [REQUEST][START] GET /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-09 08:00:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-09 08:00:01 --> [REQ_ID=0aa2179ec180] [FILTER_BEFORE] /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-09 08:00:01 --> [REQ_ID=0aa2179ec180] [ROUTE] Controller=\App\Modules\Management\Controllers\ManagementAPIController Method=Run_CRON_Tasks
DEBUG - 2026-03-09 08:00:01 --> [REQ_ID=0aa2179ec180] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-09 08:00:01 --> [REQ_ID=0aa2179ec180] [REQUEST][END]
INFO - 2026-03-09 08:00:01 --> [REQ_ID=0aa2179ec180] [PERF] Execution time=0.046270
DEBUG - 2026-03-09 08:01:17 --> [REQ_ID=6cbbc09f6210] [REQUEST][START] HEAD /
DEBUG - 2026-03-09 08:01:17 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-09 08:01:17 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-09 08:01:17 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-09 08:01:17 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-09 08:01:17 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-09 08:02:52 --> [REQ_ID=18c8f39c820d] [REQUEST][START] GET /index.php/Budget
DEBUG - 2026-03-09 08:02:52 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-09 08:02:52 --> [REQ_ID=18c8f39c820d] [FILTER_BEFORE] /index.php/Budget
DEBUG - 2026-03-09 08:02:52 --> [REQ_ID=18c8f39c820d] [ROUTE] Controller=\App\Modules\User\Controllers\BudgetController Method=index
DEBUG - 2026-03-09 08:02:52 --> [REQ_ID=18c8f39c820d] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Budget
DEBUG - 2026-03-09 08:02:52 --> [CSRF] token name=csrf_test_name hash=11ce55fc3acb92f2f1162e6dfe49f00e
DEBUG - 2026-03-09 08:02:52 --> [REQ_ID=18c8f39c820d] [REQUEST][END]
INFO - 2026-03-09 08:02:52 --> [REQ_ID=18c8f39c820d] [PERF] Execution time=0.056034
DEBUG - 2026-03-09 08:02:52 --> [REQ_ID=54c3c399e6dd] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-09 08:02:52 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-09 08:02:52 --> [REQ_ID=54c3c399e6dd] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-09 08:02:52 --> [REQ_ID=54c3c399e6dd] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-09 08:02:52 --> [REQ_ID=54c3c399e6dd] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-09 08:02:52 --> [CSRF] token name=csrf_test_name hash=f80fbd8d862896e65cb4b39b4e52a212
DEBUG - 2026-03-09 08:02:52 --> [REQ_ID=f14e17f0105d] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-09 08:02:52 --> [REQ_ID=f14e17f0105d] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-09 08:02:53 --> [REQ_ID=54c3c399e6dd] [FILTER_AFTER]
DEBUG - 2026-03-09 08:02:53 --> [REQ_ID=54c3c399e6dd] [LIFECYCLE][END] status=200 duration_ms=50.95 memory_delta=0
INFO - 2026-03-09 08:02:53 --> [REQ_ID=f14e17f0105d] [PERF] Execution time=0.050704
DEBUG - 2026-03-09 08:02:53 --> [REQ_ID=54c3c399e6dd] [REQUEST][END]
INFO - 2026-03-09 08:02:53 --> [REQ_ID=54c3c399e6dd] [PERF] Execution time=0.062982
DEBUG - 2026-03-09 08:06:17 --> [REQ_ID=faad21a72268] [REQUEST][START] HEAD /
DEBUG - 2026-03-09 08:06:17 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-09 08:06:17 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-09 08:06:17 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-09 08:06:17 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-09 08:06:17 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-09 08:11:17 --> [REQ_ID=e2c735af6fd4] [REQUEST][START] HEAD /
DEBUG - 2026-03-09 08:11:17 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-09 08:11:17 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-09 08:11:17 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-09 08:11:17 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-09 08:11:17 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-09 08:13:11 --> [REQ_ID=451d9ee27c8a] [REQUEST][START] GET /index.php/How-It-Works/MyMI-Exchange
DEBUG - 2026-03-09 08:13:11 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-09 08:13:11 --> [REQ_ID=451d9ee27c8a] [FILTER_BEFORE] /index.php/How-It-Works/MyMI-Exchange
DEBUG - 2026-03-09 08:13:11 --> [REQ_ID=451d9ee27c8a] [ROUTE] Controller=\App\Modules\Blog\Controllers\HowItWorksController Method=show
DEBUG - 2026-03-09 08:13:11 --> [REQ_ID=451d9ee27c8a] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/How-It-Works/MyMI-Exchange
DEBUG - 2026-03-09 08:13:11 --> [CSRF] token name=csrf_test_name hash=13e5b5d981081d9fd3c4fe49a9c7762f
DEBUG - 2026-03-09 08:13:11 --> [REQ_ID=a7b08acb418a] [INIT] App\Modules\Blog\Controllers\HowItWorksController::GET
INFO - 2026-03-09 08:13:11 --> [REQ_ID=a7b08acb418a] [MEMORY][controller-start] 6291456
DEBUG - 2026-03-09 08:13:11 --> [REQ_ID=a7b08acb418a] [METHOD_ENTRY] show
DEBUG - 2026-03-09 08:13:11 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-09 08:13:11 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-09 08:13:11 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-09 08:13:11 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-09 08:13:11 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-09 08:13:11 --> MyMICoin: guest context detected; skipping user-specific preload.
ERROR - 2026-03-09 08:13:11 --> HowItWorksController failure: Call to undefined method App\Modules\Blog\Controllers\HowItWorksController::respondWithRendered()
INFO - 2026-03-09 08:13:11 --> [REQ_ID=a7b08acb418a] [PERF] Execution time=0.217904
DEBUG - 2026-03-09 08:15:01 --> [REQ_ID=3b6d492f848f] [REQUEST][START] GET /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-09 08:15:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-09 08:15:01 --> [REQ_ID=3b6d492f848f] [FILTER_BEFORE] /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-09 08:15:01 --> [REQ_ID=3b6d492f848f] [ROUTE] Controller=\App\Modules\APIs\Controllers\AlertsAPIController Method=fetchEmailAlerts
DEBUG - 2026-03-09 08:15:01 --> [REQ_ID=3b6d492f848f] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-09 08:15:01 --> [REQ_ID=3b6d492f848f] [REQUEST][END]
INFO - 2026-03-09 08:15:01 --> [REQ_ID=3b6d492f848f] [PERF] Execution time=0.049140
DEBUG - 2026-03-09 08:16:17 --> [REQ_ID=e73f8eecfc32] [REQUEST][START] HEAD /
DEBUG - 2026-03-09 08:16:17 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-09 08:16:17 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-09 08:16:17 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-09 08:16:17 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-09 08:16:17 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-09 08:21:17 --> [REQ_ID=6d454e04a18c] [REQUEST][START] HEAD /
DEBUG - 2026-03-09 08:21:17 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-09 08:21:17 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-09 08:21:17 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-09 08:21:17 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-09 08:21:17 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-09 08:23:20 --> [REQ_ID=2d3b3888ec69] [REQUEST][START] GET /index.php/Management/Marketing/Ideas
DEBUG - 2026-03-09 08:23:20 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-09 08:23:20 --> [REQ_ID=2d3b3888ec69] [REQUEST][END]
INFO - 2026-03-09 08:23:20 --> [REQ_ID=2d3b3888ec69] [PERF] Execution time=0.047639
DEBUG - 2026-03-09 08:23:57 --> [REQ_ID=63a634426316] [REQUEST][START] GET /index.php/Assets
DEBUG - 2026-03-09 08:23:57 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-09 08:23:57 --> [REQ_ID=63a634426316] [REQUEST][END]
INFO - 2026-03-09 08:23:57 --> [REQ_ID=63a634426316] [PERF] Execution time=0.010453
DEBUG - 2026-03-09 08:26:17 --> [REQ_ID=efe712bb8810] [REQUEST][START] HEAD /
DEBUG - 2026-03-09 08:26:17 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-09 08:26:17 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-09 08:26:17 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-09 08:26:17 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-09 08:26:17 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-09 08:26:22 --> [REQ_ID=e8341151062f] [REQUEST][START] GET /index.php/
DEBUG - 2026-03-09 08:26:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-09 08:26:22 --> [REQ_ID=e8341151062f] [REQUEST][END]
INFO - 2026-03-09 08:26:22 --> [REQ_ID=e8341151062f] [PERF] Execution time=0.018144
DEBUG - 2026-03-09 08:28:19 --> [REQ_ID=99aaf4758baa] [REQUEST][START] GET /index.php/Legal/Terms-And-Conditions
DEBUG - 2026-03-09 08:28:19 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-09 08:28:19 --> [REQ_ID=99aaf4758baa] [FILTER_BEFORE] /index.php/Legal/Terms-And-Conditions
DEBUG - 2026-03-09 08:28:19 --> [REQ_ID=99aaf4758baa] [ROUTE] Controller=\App\Controllers\Home Method=terms
DEBUG - 2026-03-09 08:28:19 --> [REQ_ID=99aaf4758baa] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Legal/Terms-And-Conditions
DEBUG - 2026-03-09 08:28:19 --> [CSRF] token name=csrf_test_name hash=5d5a79d122ef8e318b69111398657109
DEBUG - 2026-03-09 08:28:19 --> [REQ_ID=99aaf4758baa] [REQUEST][END]
INFO - 2026-03-09 08:28:19 --> [REQ_ID=99aaf4758baa] [PERF] Execution time=0.051013
DEBUG - 2026-03-09 08:28:20 --> [REQ_ID=dbdffaf1a4f0] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-09 08:28:20 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-09 08:28:20 --> [REQ_ID=dbdffaf1a4f0] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-09 08:28:20 --> [REQ_ID=dbdffaf1a4f0] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-09 08:28:20 --> [REQ_ID=dbdffaf1a4f0] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-09 08:28:20 --> [CSRF] token name=csrf_test_name hash=05dca26c56cc8a421302f4ec9cdd0b18
DEBUG - 2026-03-09 08:28:20 --> [REQ_ID=dc092ab38fb9] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-09 08:28:20 --> [REQ_ID=dc092ab38fb9] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-09 08:28:20 --> [REQ_ID=dbdffaf1a4f0] [FILTER_AFTER]
DEBUG - 2026-03-09 08:28:20 --> [REQ_ID=dbdffaf1a4f0] [LIFECYCLE][END] status=200 duration_ms=48.31 memory_delta=0
INFO - 2026-03-09 08:28:20 --> [REQ_ID=dc092ab38fb9] [PERF] Execution time=0.048050
DEBUG - 2026-03-09 08:28:20 --> [REQ_ID=dbdffaf1a4f0] [REQUEST][END]
INFO - 2026-03-09 08:28:20 --> [REQ_ID=dbdffaf1a4f0] [PERF] Execution time=0.060320
DEBUG - 2026-03-09 08:30:29 --> [REQ_ID=1e6b505e15a8] [REQUEST][START] GET /
DEBUG - 2026-03-09 08:30:29 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-09 08:30:29 --> [REQ_ID=1e6b505e15a8] [REQUEST][END]
INFO - 2026-03-09 08:30:29 --> [REQ_ID=1e6b505e15a8] [PERF] Execution time=0.038472
DEBUG - 2026-03-09 08:30:35 --> [REQ_ID=5862ef5a2330] [REQUEST][START] GET /index.php
DEBUG - 2026-03-09 08:30:35 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-09 08:30:35 --> [REQ_ID=5862ef5a2330] [FILTER_BEFORE] /index.php
DEBUG - 2026-03-09 08:30:35 --> [REQ_ID=5862ef5a2330] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-09 08:30:35 --> [REQ_ID=5862ef5a2330] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-09 08:30:35 --> [CSRF] token name=csrf_test_name hash=d2a2fbd2279f75e8619e29ef572b5f36
DEBUG - 2026-03-09 08:30:35 --> [REQ_ID=a0b5f7515892] [INIT] App\Controllers\Home::GET
INFO - 2026-03-09 08:30:35 --> [REQ_ID=a0b5f7515892] [MEMORY][controller-start] 4194304
INFO - 2026-03-09 08:30:35 --> [REQ_ID=a0b5f7515892] [MEMORY][commonData:start] 4194304
DEBUG - 2026-03-09 08:30:35 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-09 08:30:36 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-03-09 08:30:36 --> [REQ_ID=a0b5f7515892] [VIEW_RENDER] themes/public/home
INFO - 2026-03-09 08:30:36 --> [REQ_ID=a0b5f7515892] [MEMORY][commonData:start] 8388608
INFO - 2026-03-09 08:30:36 --> themesMemory usage: 8388608
DEBUG - 2026-03-09 08:30:36 --> [MetaService] slug= pageName=Home cacheHit= path=DB
DEBUG - 2026-03-09 08:30:36 --> [REQ_ID=5862ef5a2330] [FILTER_AFTER]
DEBUG - 2026-03-09 08:30:36 --> [REQ_ID=5862ef5a2330] [LIFECYCLE][END] status=200 duration_ms=772.99 memory_delta=4194304
INFO - 2026-03-09 08:30:36 --> [REQ_ID=a0b5f7515892] [PERF] Execution time=0.770805
DEBUG - 2026-03-09 08:30:36 --> [REQ_ID=5862ef5a2330] [REQUEST][END]
INFO - 2026-03-09 08:30:36 --> [REQ_ID=5862ef5a2330] [PERF] Execution time=0.783296
DEBUG - 2026-03-09 08:31:17 --> [REQ_ID=4d508d0ba66f] [REQUEST][START] HEAD /
DEBUG - 2026-03-09 08:31:17 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-09 08:31:17 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-09 08:31:17 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-09 08:31:17 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-09 08:31:17 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-09 08:36:17 --> [REQ_ID=2d3715d32fcc] [REQUEST][START] HEAD /
DEBUG - 2026-03-09 08:36:17 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-09 08:36:17 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-09 08:36:17 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-09 08:36:17 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-09 08:36:17 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-09 08:41:17 --> [REQ_ID=ba7c5d3d6423] [REQUEST][START] HEAD /
DEBUG - 2026-03-09 08:41:17 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-09 08:41:17 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-09 08:41:17 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-09 08:41:17 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-09 08:41:17 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-09 08:41:58 --> [REQ_ID=170c7afae07d] [REQUEST][START] GET /index.php/Budget/Financial-Analysis
DEBUG - 2026-03-09 08:41:58 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-09 08:41:58 --> [REQ_ID=170c7afae07d] [FILTER_BEFORE] /index.php/Budget/Financial-Analysis
DEBUG - 2026-03-09 08:41:58 --> [REQ_ID=170c7afae07d] [ROUTE] Controller=\App\Modules\User\Controllers\BudgetController Method=financialAnalysis
DEBUG - 2026-03-09 08:41:58 --> [REQ_ID=170c7afae07d] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Budget/Financial-Analysis
DEBUG - 2026-03-09 08:41:58 --> [CSRF] token name=csrf_test_name hash=6ba82fc0add24cfc9ccc842b7060648d
DEBUG - 2026-03-09 08:41:58 --> [REQ_ID=170c7afae07d] [REQUEST][END]
INFO - 2026-03-09 08:41:58 --> [REQ_ID=170c7afae07d] [PERF] Execution time=0.035547
DEBUG - 2026-03-09 08:41:59 --> [REQ_ID=cab15dda7f82] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-09 08:41:59 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-09 08:41:59 --> [REQ_ID=cab15dda7f82] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-09 08:41:59 --> [REQ_ID=cab15dda7f82] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-09 08:41:59 --> [REQ_ID=cab15dda7f82] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-09 08:41:59 --> [CSRF] token name=csrf_test_name hash=ffd159bcb8e8a444423567ec546994b9
DEBUG - 2026-03-09 08:41:59 --> [REQ_ID=c89fe7644c77] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-09 08:41:59 --> [REQ_ID=c89fe7644c77] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-09 08:41:59 --> [REQ_ID=cab15dda7f82] [FILTER_AFTER]
DEBUG - 2026-03-09 08:41:59 --> [REQ_ID=cab15dda7f82] [LIFECYCLE][END] status=200 duration_ms=156.21 memory_delta=0
INFO - 2026-03-09 08:41:59 --> [REQ_ID=c89fe7644c77] [PERF] Execution time=0.155934
DEBUG - 2026-03-09 08:41:59 --> [REQ_ID=cab15dda7f82] [REQUEST][END]
INFO - 2026-03-09 08:41:59 --> [REQ_ID=cab15dda7f82] [PERF] Execution time=0.168023
DEBUG - 2026-03-09 08:46:17 --> [REQ_ID=e5d0b6f505d4] [REQUEST][START] HEAD /
DEBUG - 2026-03-09 08:46:17 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-09 08:46:17 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-09 08:46:17 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-09 08:46:17 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-09 08:46:17 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-09 08:51:17 --> [REQ_ID=efcf1c0fcb42] [REQUEST][START] HEAD /
DEBUG - 2026-03-09 08:51:17 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-09 08:51:17 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-09 08:51:17 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-09 08:51:17 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-09 08:51:17 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-09 08:56:17 --> [REQ_ID=f229dac79bce] [REQUEST][START] HEAD /
DEBUG - 2026-03-09 08:56:17 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-09 08:56:17 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-09 08:56:17 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-09 08:56:17 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-09 08:56:17 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-09 08:59:05 --> [REQ_ID=cc427536538d] [REQUEST][START] GET /index.php/Management/Marketing/Content/Listing
DEBUG - 2026-03-09 08:59:05 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-09 08:59:05 --> [REQ_ID=cc427536538d] [FILTER_BEFORE] /index.php/Management/Marketing/Content/Listing
DEBUG - 2026-03-09 08:59:05 --> [REQ_ID=cc427536538d] [ROUTE] Controller=\App\Modules\Management\Controllers\MarketingAdminController Method=contentListing
DEBUG - 2026-03-09 08:59:05 --> [REQ_ID=cc427536538d] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Management/Marketing/Content/Listing
DEBUG - 2026-03-09 08:59:05 --> [CSRF] token name=csrf_test_name hash=b97605dec1d63dd7c3967fbdacfca0b3
DEBUG - 2026-03-09 08:59:05 --> [REQ_ID=cc427536538d] [REQUEST][END]
INFO - 2026-03-09 08:59:05 --> [REQ_ID=cc427536538d] [PERF] Execution time=0.058241
DEBUG - 2026-03-09 08:59:05 --> [REQ_ID=8b0aef41bac0] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-09 08:59:05 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-09 08:59:05 --> [REQ_ID=8b0aef41bac0] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-09 08:59:05 --> [REQ_ID=8b0aef41bac0] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-09 08:59:05 --> [REQ_ID=8b0aef41bac0] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-09 08:59:05 --> [CSRF] token name=csrf_test_name hash=0a69064d863efa145916befec0639aaf
DEBUG - 2026-03-09 08:59:05 --> [REQ_ID=e925f60eea03] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-09 08:59:05 --> [REQ_ID=e925f60eea03] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-09 08:59:05 --> [REQ_ID=8b0aef41bac0] [FILTER_AFTER]
DEBUG - 2026-03-09 08:59:05 --> [REQ_ID=8b0aef41bac0] [LIFECYCLE][END] status=200 duration_ms=57.54 memory_delta=0
INFO - 2026-03-09 08:59:05 --> [REQ_ID=e925f60eea03] [PERF] Execution time=0.057305
DEBUG - 2026-03-09 08:59:05 --> [REQ_ID=8b0aef41bac0] [REQUEST][END]
INFO - 2026-03-09 08:59:05 --> [REQ_ID=8b0aef41bac0] [PERF] Execution time=0.069493
DEBUG - 2026-03-09 09:00:01 --> [REQ_ID=bfbb13b53c42] [REQUEST][START] GET /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-09 09:00:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-09 09:00:01 --> [REQ_ID=bfbb13b53c42] [FILTER_BEFORE] /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-09 09:00:01 --> [REQ_ID=bfbb13b53c42] [ROUTE] Controller=\App\Modules\Management\Controllers\ManagementAPIController Method=Run_CRON_Tasks
DEBUG - 2026-03-09 09:00:01 --> [REQ_ID=bfbb13b53c42] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-09 09:00:01 --> [REQ_ID=bfbb13b53c42] [REQUEST][END]
INFO - 2026-03-09 09:00:01 --> [REQ_ID=bfbb13b53c42] [PERF] Execution time=0.030807
DEBUG - 2026-03-09 09:00:40 --> [REQ_ID=e0ac310dad30] [REQUEST][START] GET /index.php/My-Referrals
DEBUG - 2026-03-09 09:00:40 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-09 09:00:40 --> [REQ_ID=e0ac310dad30] [FILTER_BEFORE] /index.php/My-Referrals
DEBUG - 2026-03-09 09:00:40 --> [REQ_ID=e0ac310dad30] [ROUTE] Controller=\App\Modules\User\Controllers\ReferralController Method=index
DEBUG - 2026-03-09 09:00:40 --> [REQ_ID=e0ac310dad30] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/My-Referrals
DEBUG - 2026-03-09 09:00:40 --> [CSRF] token name=csrf_test_name hash=eee71663b23d6a2a334dc78ea14b7655
DEBUG - 2026-03-09 09:00:40 --> [REQ_ID=e0ac310dad30] [REQUEST][END]
INFO - 2026-03-09 09:00:40 --> [REQ_ID=e0ac310dad30] [PERF] Execution time=0.012033
DEBUG - 2026-03-09 09:00:40 --> [REQ_ID=b1f65b41c541] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-09 09:00:40 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-09 09:00:40 --> [REQ_ID=b1f65b41c541] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-09 09:00:40 --> [REQ_ID=b1f65b41c541] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-09 09:00:40 --> [REQ_ID=b1f65b41c541] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-09 09:00:40 --> [CSRF] token name=csrf_test_name hash=57b64f89a48c4438626dd52de985db61
DEBUG - 2026-03-09 09:00:40 --> [REQ_ID=945ceed39825] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-09 09:00:40 --> [REQ_ID=945ceed39825] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-09 09:00:41 --> [REQ_ID=b1f65b41c541] [FILTER_AFTER]
DEBUG - 2026-03-09 09:00:41 --> [REQ_ID=b1f65b41c541] [LIFECYCLE][END] status=200 duration_ms=340.11 memory_delta=0
INFO - 2026-03-09 09:00:41 --> [REQ_ID=945ceed39825] [PERF] Execution time=0.340049
DEBUG - 2026-03-09 09:00:41 --> [REQ_ID=b1f65b41c541] [REQUEST][END]
INFO - 2026-03-09 09:00:41 --> [REQ_ID=b1f65b41c541] [PERF] Execution time=0.349206
DEBUG - 2026-03-09 09:01:17 --> [REQ_ID=ed57ae9c6c54] [REQUEST][START] HEAD /
DEBUG - 2026-03-09 09:01:17 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-09 09:01:17 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-09 09:01:17 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-09 09:01:17 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-09 09:01:17 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-09 09:06:17 --> [REQ_ID=16c48eb6d764] [REQUEST][START] HEAD /
DEBUG - 2026-03-09 09:06:17 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-09 09:06:17 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-09 09:06:17 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-09 09:06:17 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-09 09:06:17 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-09 09:11:17 --> [REQ_ID=a55571ddf4df] [REQUEST][START] HEAD /
DEBUG - 2026-03-09 09:11:17 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-09 09:11:17 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-09 09:11:17 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-09 09:11:17 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-09 09:11:17 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-09 09:15:01 --> [REQ_ID=0d09e8e78297] [REQUEST][START] GET /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-09 09:15:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-09 09:15:01 --> [REQ_ID=0d09e8e78297] [FILTER_BEFORE] /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-09 09:15:01 --> [REQ_ID=0d09e8e78297] [ROUTE] Controller=\App\Modules\APIs\Controllers\AlertsAPIController Method=fetchEmailAlerts
DEBUG - 2026-03-09 09:15:01 --> [REQ_ID=0d09e8e78297] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-09 09:15:01 --> [REQ_ID=0d09e8e78297] [REQUEST][END]
INFO - 2026-03-09 09:15:01 --> [REQ_ID=0d09e8e78297] [PERF] Execution time=0.049017
DEBUG - 2026-03-09 09:16:17 --> [REQ_ID=26d81e131592] [REQUEST][START] HEAD /
DEBUG - 2026-03-09 09:16:17 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-09 09:16:17 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-09 09:16:17 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-09 09:16:17 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-09 09:16:17 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-09 09:21:17 --> [REQ_ID=d9597ef1b72d] [REQUEST][START] HEAD /
DEBUG - 2026-03-09 09:21:17 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-09 09:21:17 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-09 09:21:17 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-09 09:21:17 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-09 09:21:17 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-09 09:21:27 --> [REQ_ID=ffa1ab33ab36] [REQUEST][START] GET /index.php/Management/API
DEBUG - 2026-03-09 09:21:27 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-09 09:21:27 --> [REQ_ID=ffa1ab33ab36] [FILTER_BEFORE] /index.php/Management/API
DEBUG - 2026-03-09 09:21:27 --> [REQ_ID=ffa1ab33ab36] [ROUTE] Controller=\App\Modules\Management\Controllers\APIAdminController Method=index
DEBUG - 2026-03-09 09:21:27 --> [REQ_ID=ffa1ab33ab36] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Management/API
DEBUG - 2026-03-09 09:21:27 --> [CSRF] token name=csrf_test_name hash=7128bfc89834db0b6dd6fc9a5fb9b168
DEBUG - 2026-03-09 09:21:27 --> [REQ_ID=ffa1ab33ab36] [REQUEST][END]
INFO - 2026-03-09 09:21:27 --> [REQ_ID=ffa1ab33ab36] [PERF] Execution time=0.031301
DEBUG - 2026-03-09 09:21:27 --> [REQ_ID=bc36f28b98af] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-09 09:21:27 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-09 09:21:27 --> [REQ_ID=bc36f28b98af] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-09 09:21:27 --> [REQ_ID=bc36f28b98af] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-09 09:21:27 --> [REQ_ID=bc36f28b98af] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-09 09:21:27 --> [CSRF] token name=csrf_test_name hash=6dd1a1b47bb21356a17d709ec102c6cc
DEBUG - 2026-03-09 09:21:27 --> [REQ_ID=ae1ece50eac2] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-09 09:21:27 --> [REQ_ID=ae1ece50eac2] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-09 09:21:27 --> [REQ_ID=bc36f28b98af] [FILTER_AFTER]
DEBUG - 2026-03-09 09:21:27 --> [REQ_ID=bc36f28b98af] [LIFECYCLE][END] status=200 duration_ms=37.96 memory_delta=0
INFO - 2026-03-09 09:21:27 --> [REQ_ID=ae1ece50eac2] [PERF] Execution time=0.037598
DEBUG - 2026-03-09 09:21:27 --> [REQ_ID=bc36f28b98af] [REQUEST][END]
INFO - 2026-03-09 09:21:27 --> [REQ_ID=bc36f28b98af] [PERF] Execution time=0.049985
DEBUG - 2026-03-09 09:26:03 --> [REQ_ID=df989fe6d907] [REQUEST][START] GET /
DEBUG - 2026-03-09 09:26:03 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-09 09:26:03 --> [REQ_ID=df989fe6d907] [FILTER_BEFORE] /
DEBUG - 2026-03-09 09:26:03 --> [REQ_ID=df989fe6d907] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-09 09:26:03 --> [REQ_ID=df989fe6d907] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-09 09:26:03 --> [CSRF] token name=csrf_test_name hash=8c41d92682b29e0c3cca8bc5070e282d
DEBUG - 2026-03-09 09:26:03 --> [REQ_ID=002bb744b46c] [INIT] App\Controllers\Home::GET
INFO - 2026-03-09 09:26:03 --> [REQ_ID=002bb744b46c] [MEMORY][controller-start] 6291456
INFO - 2026-03-09 09:26:03 --> [REQ_ID=002bb744b46c] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-09 09:26:03 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-09 09:26:04 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-03-09 09:26:04 --> [REQ_ID=002bb744b46c] [VIEW_RENDER] themes/public/home
INFO - 2026-03-09 09:26:04 --> [REQ_ID=002bb744b46c] [MEMORY][commonData:start] 10485760
INFO - 2026-03-09 09:26:04 --> themesMemory usage: 10485760
DEBUG - 2026-03-09 09:26:04 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-09 09:26:04 --> [REQ_ID=df989fe6d907] [FILTER_AFTER]
DEBUG - 2026-03-09 09:26:04 --> [REQ_ID=df989fe6d907] [LIFECYCLE][END] status=200 duration_ms=755.64 memory_delta=4194304
INFO - 2026-03-09 09:26:04 --> [REQ_ID=002bb744b46c] [PERF] Execution time=0.752928
DEBUG - 2026-03-09 09:26:04 --> [REQ_ID=df989fe6d907] [REQUEST][END]
INFO - 2026-03-09 09:26:04 --> [REQ_ID=df989fe6d907] [PERF] Execution time=0.800452
DEBUG - 2026-03-09 09:26:17 --> [REQ_ID=c7a3c4b7a8c3] [REQUEST][START] HEAD /
DEBUG - 2026-03-09 09:26:17 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-09 09:26:17 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-09 09:26:17 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-09 09:26:17 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-09 09:26:17 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-09 09:31:10 --> [REQ_ID=6cf630deec53] [REQUEST][START] GET /index.php/logout
DEBUG - 2026-03-09 09:31:10 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-09 09:31:10 --> [REQ_ID=6cf630deec53] [REQUEST][END]
INFO - 2026-03-09 09:31:10 --> [REQ_ID=6cf630deec53] [PERF] Execution time=0.041666
DEBUG - 2026-03-09 09:31:16 --> [REQ_ID=8af5a3d3d901] [REQUEST][START] HEAD /
DEBUG - 2026-03-09 09:31:16 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-09 09:31:17 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-09 09:31:17 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-09 09:31:17 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-09 09:31:17 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-09 09:31:55 --> [REQ_ID=01dd650f53e2] [REQUEST][START] GET /index.php/Features/Advanced-Investment-Portfoio-Manager
DEBUG - 2026-03-09 09:31:55 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
INFO - 2026-03-09 09:31:55 --> REDIRECTED ROUTE at https://www.mymiwallet.com/Features/Advanced-Investment-Portfolio-Manager
DEBUG - 2026-03-09 09:31:55 --> [REQ_ID=01dd650f53e2] [REQUEST][END]
INFO - 2026-03-09 09:31:55 --> [REQ_ID=01dd650f53e2] [PERF] Execution time=0.011830
DEBUG - 2026-03-09 09:32:11 --> [REQ_ID=850cd8ac82fa] [REQUEST][START] GET /index.php/How-It-Works/Investment-Dashboard
DEBUG - 2026-03-09 09:32:11 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-09 09:32:11 --> [REQ_ID=850cd8ac82fa] [REQUEST][END]
INFO - 2026-03-09 09:32:11 --> [REQ_ID=850cd8ac82fa] [PERF] Execution time=0.010992
DEBUG - 2026-03-09 09:35:29 --> [REQ_ID=b7ae96931594] [REQUEST][START] GET /index.php/Account/Activity
DEBUG - 2026-03-09 09:35:29 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-09 09:35:29 --> [REQ_ID=b7ae96931594] [REQUEST][END]
INFO - 2026-03-09 09:35:29 --> [REQ_ID=b7ae96931594] [PERF] Execution time=0.041760
DEBUG - 2026-03-09 09:36:17 --> [REQ_ID=31c944942ccc] [REQUEST][START] HEAD /
DEBUG - 2026-03-09 09:36:17 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-09 09:36:17 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-09 09:36:17 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-09 09:36:17 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-09 09:36:17 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-09 09:41:17 --> [REQ_ID=43f372b84d0d] [REQUEST][START] HEAD /
DEBUG - 2026-03-09 09:41:17 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-09 09:41:17 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-09 09:41:17 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-09 09:41:17 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-09 09:41:17 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-09 09:46:17 --> [REQ_ID=ced946401b2b] [REQUEST][START] HEAD /
DEBUG - 2026-03-09 09:46:17 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-09 09:46:17 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-09 09:46:17 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-09 09:46:17 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-09 09:46:17 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-09 09:51:17 --> [REQ_ID=bc7a8af93057] [REQUEST][START] HEAD /
DEBUG - 2026-03-09 09:51:17 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-09 09:51:17 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-09 09:51:17 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-09 09:51:17 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-09 09:51:17 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-09 09:56:17 --> [REQ_ID=518ad776c9ec] [REQUEST][START] HEAD /
DEBUG - 2026-03-09 09:56:17 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-09 09:56:17 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-09 09:56:17 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-09 09:56:17 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-09 09:56:17 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-09 10:00:01 --> [REQ_ID=739944c79711] [REQUEST][START] GET /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-09 10:00:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-09 10:00:01 --> [REQ_ID=739944c79711] [FILTER_BEFORE] /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-09 10:00:01 --> [REQ_ID=739944c79711] [ROUTE] Controller=\App\Modules\Management\Controllers\ManagementAPIController Method=Run_CRON_Tasks
DEBUG - 2026-03-09 10:00:01 --> [REQ_ID=739944c79711] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-09 10:00:01 --> [REQ_ID=739944c79711] [REQUEST][END]
INFO - 2026-03-09 10:00:01 --> [REQ_ID=739944c79711] [PERF] Execution time=0.036769
DEBUG - 2026-03-09 10:01:17 --> [REQ_ID=03d24e6dc0b9] [REQUEST][START] HEAD /
DEBUG - 2026-03-09 10:01:17 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-09 10:01:17 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-09 10:01:17 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-09 10:01:17 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-09 10:01:17 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-09 10:02:44 --> [REQ_ID=a6aac52dfb1b] [REQUEST][START] GET /index.php/Management/Projects
DEBUG - 2026-03-09 10:02:44 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-09 10:02:44 --> [REQ_ID=a6aac52dfb1b] [FILTER_BEFORE] /index.php/Management/Projects
DEBUG - 2026-03-09 10:02:44 --> [REQ_ID=a6aac52dfb1b] [ROUTE] Controller=\App\Modules\Management\Controllers\ProjectsController Method=index
DEBUG - 2026-03-09 10:02:44 --> [REQ_ID=a6aac52dfb1b] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Management/Projects
DEBUG - 2026-03-09 10:02:44 --> [CSRF] token name=csrf_test_name hash=2e8403a79d8cf382ecb879ea62d26fb2
DEBUG - 2026-03-09 10:02:44 --> [REQ_ID=a6aac52dfb1b] [REQUEST][END]
INFO - 2026-03-09 10:02:44 --> [REQ_ID=a6aac52dfb1b] [PERF] Execution time=0.052424
DEBUG - 2026-03-09 10:02:45 --> [REQ_ID=39a376bb3ec9] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-09 10:02:45 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-09 10:02:45 --> [REQ_ID=39a376bb3ec9] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-09 10:02:45 --> [REQ_ID=39a376bb3ec9] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-09 10:02:45 --> [REQ_ID=39a376bb3ec9] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-09 10:02:45 --> [CSRF] token name=csrf_test_name hash=ca5e5f8c9432518519a2348a9bc502ba
DEBUG - 2026-03-09 10:02:45 --> [REQ_ID=a177087e0053] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-09 10:02:45 --> [REQ_ID=a177087e0053] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-09 10:02:45 --> [REQ_ID=39a376bb3ec9] [FILTER_AFTER]
DEBUG - 2026-03-09 10:02:45 --> [REQ_ID=39a376bb3ec9] [LIFECYCLE][END] status=200 duration_ms=274.26 memory_delta=0
INFO - 2026-03-09 10:02:45 --> [REQ_ID=a177087e0053] [PERF] Execution time=0.274009
DEBUG - 2026-03-09 10:02:45 --> [REQ_ID=39a376bb3ec9] [REQUEST][END]
INFO - 2026-03-09 10:02:45 --> [REQ_ID=39a376bb3ec9] [PERF] Execution time=0.290329
DEBUG - 2026-03-09 10:02:46 --> [REQ_ID=be5575e07ff4] [REQUEST][START] GET /index.php/How-It-Works/Purchase-MyMI-Gold
DEBUG - 2026-03-09 10:02:46 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-09 10:02:47 --> [REQ_ID=be5575e07ff4] [FILTER_BEFORE] /index.php/How-It-Works/Purchase-MyMI-Gold
DEBUG - 2026-03-09 10:02:47 --> [REQ_ID=be5575e07ff4] [ROUTE] Controller=\App\Modules\Blog\Controllers\HowItWorksController Method=PurchaseMyMIGold
DEBUG - 2026-03-09 10:02:47 --> [REQ_ID=be5575e07ff4] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/How-It-Works/Purchase-MyMI-Gold
DEBUG - 2026-03-09 10:02:47 --> [CSRF] token name=csrf_test_name hash=a97bd326975446acb1332a0229fb9af0
DEBUG - 2026-03-09 10:02:47 --> [REQ_ID=ca1105b9f96f] [INIT] App\Modules\Blog\Controllers\HowItWorksController::GET
INFO - 2026-03-09 10:02:47 --> [REQ_ID=ca1105b9f96f] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-09 10:02:47 --> [REQ_ID=ca1105b9f96f] [METHOD_ENTRY] PurchaseMyMIGold
DEBUG - 2026-03-09 10:02:47 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-09 10:02:47 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-09 10:02:47 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-09 10:02:47 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-09 10:02:47 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-09 10:02:47 --> MyMICoin: guest context detected; skipping user-specific preload.
INFO - 2026-03-09 10:02:47 --> [REQ_ID=ca1105b9f96f] [MEMORY][commonData:start] 6291456
INFO - 2026-03-09 10:02:47 --> themesMemory usage: 8388608
DEBUG - 2026-03-09 10:02:47 --> [MetaService] slug=how-it-works/purchase-mymi-gold pageName= cacheHit= path=DB
DEBUG - 2026-03-09 10:02:47 --> [REQ_ID=be5575e07ff4] [FILTER_AFTER]
DEBUG - 2026-03-09 10:02:47 --> [REQ_ID=be5575e07ff4] [LIFECYCLE][END] status=200 duration_ms=771.91 memory_delta=4194304
INFO - 2026-03-09 10:02:47 --> [REQ_ID=ca1105b9f96f] [PERF] Execution time=0.770496
DEBUG - 2026-03-09 10:02:47 --> [REQ_ID=be5575e07ff4] [REQUEST][END]
INFO - 2026-03-09 10:02:47 --> [REQ_ID=be5575e07ff4] [PERF] Execution time=0.901883
DEBUG - 2026-03-09 10:06:17 --> [REQ_ID=7c90d6501a4e] [REQUEST][START] HEAD /
DEBUG - 2026-03-09 10:06:17 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-09 10:06:17 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-09 10:06:17 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-09 10:06:17 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-09 10:06:17 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-09 10:11:17 --> [REQ_ID=f8c9cb0a1ba7] [REQUEST][START] HEAD /
DEBUG - 2026-03-09 10:11:17 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-09 10:11:17 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-09 10:11:17 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-09 10:11:17 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-09 10:11:17 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-09 10:15:01 --> [REQ_ID=3dc4481105ee] [REQUEST][START] GET /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-09 10:15:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-09 10:15:01 --> [REQ_ID=3dc4481105ee] [FILTER_BEFORE] /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-09 10:15:01 --> [REQ_ID=3dc4481105ee] [ROUTE] Controller=\App\Modules\APIs\Controllers\AlertsAPIController Method=fetchEmailAlerts
DEBUG - 2026-03-09 10:15:01 --> [REQ_ID=3dc4481105ee] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-09 10:15:01 --> [REQ_ID=3dc4481105ee] [REQUEST][END]
INFO - 2026-03-09 10:15:01 --> [REQ_ID=3dc4481105ee] [PERF] Execution time=0.056614
DEBUG - 2026-03-09 10:16:16 --> [REQ_ID=a1966b40959c] [REQUEST][START] HEAD /
DEBUG - 2026-03-09 10:16:16 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-09 10:16:16 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-09 10:16:17 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-09 10:16:17 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-09 10:16:17 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-09 10:17:57 --> [REQ_ID=d6b7cde2c075] [REQUEST][START] GET /index.php/Premium-Features/Advanced-Charting
DEBUG - 2026-03-09 10:17:57 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
INFO - 2026-03-09 10:17:57 --> REDIRECTED ROUTE at https://www.mymiwallet.com/Features/Brokerage-Integrations
DEBUG - 2026-03-09 10:17:57 --> [REQ_ID=d6b7cde2c075] [REQUEST][END]
INFO - 2026-03-09 10:17:57 --> [REQ_ID=d6b7cde2c075] [PERF] Execution time=0.037343
DEBUG - 2026-03-09 10:21:17 --> [REQ_ID=cf6101ffd993] [REQUEST][START] HEAD /
DEBUG - 2026-03-09 10:21:17 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-09 10:21:17 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-09 10:21:17 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-09 10:21:17 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-09 10:21:17 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-09 10:26:17 --> [REQ_ID=29adf330418e] [REQUEST][START] HEAD /
DEBUG - 2026-03-09 10:26:17 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-09 10:26:17 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-09 10:26:17 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-09 10:26:17 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-09 10:26:17 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-09 10:27:36 --> [REQ_ID=5fd56a4d11fe] [REQUEST][START] GET /
DEBUG - 2026-03-09 10:27:36 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-09 10:27:36 --> [REQ_ID=5fd56a4d11fe] [FILTER_BEFORE] /
DEBUG - 2026-03-09 10:27:36 --> [REQ_ID=5fd56a4d11fe] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-09 10:27:36 --> [REQ_ID=5fd56a4d11fe] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-09 10:27:36 --> [CSRF] token name=csrf_test_name hash=64a449fcf3e8b97957095438ee962295
DEBUG - 2026-03-09 10:27:36 --> [REQ_ID=e01e609a76fc] [INIT] App\Controllers\Home::GET
INFO - 2026-03-09 10:27:36 --> [REQ_ID=e01e609a76fc] [MEMORY][controller-start] 6291456
INFO - 2026-03-09 10:27:36 --> [REQ_ID=e01e609a76fc] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-09 10:27:36 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-09 10:27:36 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-03-09 10:27:36 --> [REQ_ID=e01e609a76fc] [VIEW_RENDER] themes/public/home
INFO - 2026-03-09 10:27:36 --> [REQ_ID=e01e609a76fc] [MEMORY][commonData:start] 10485760
INFO - 2026-03-09 10:27:36 --> themesMemory usage: 10485760
DEBUG - 2026-03-09 10:27:36 --> [MetaService] slug= pageName=Home cacheHit= path=DB
DEBUG - 2026-03-09 10:27:36 --> [REQ_ID=5fd56a4d11fe] [FILTER_AFTER]
DEBUG - 2026-03-09 10:27:36 --> [REQ_ID=5fd56a4d11fe] [LIFECYCLE][END] status=200 duration_ms=690.34 memory_delta=4194304
INFO - 2026-03-09 10:27:36 --> [REQ_ID=e01e609a76fc] [PERF] Execution time=0.688367
DEBUG - 2026-03-09 10:27:36 --> [REQ_ID=5fd56a4d11fe] [REQUEST][END]
INFO - 2026-03-09 10:27:36 --> [REQ_ID=5fd56a4d11fe] [PERF] Execution time=0.730957
DEBUG - 2026-03-09 10:31:17 --> [REQ_ID=6ca9b5fe3adc] [REQUEST][START] HEAD /
DEBUG - 2026-03-09 10:31:17 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-09 10:31:17 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-09 10:31:17 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-09 10:31:17 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-09 10:31:17 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-09 10:36:17 --> [REQ_ID=3bdc576fe71a] [REQUEST][START] HEAD /
DEBUG - 2026-03-09 10:36:17 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-09 10:36:17 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-09 10:36:17 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-09 10:36:17 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-09 10:36:17 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-09 10:41:17 --> [REQ_ID=20b71440ddab] [REQUEST][START] HEAD /
DEBUG - 2026-03-09 10:41:17 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-09 10:41:17 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-09 10:41:17 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-09 10:41:17 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-09 10:41:17 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-09 10:46:17 --> [REQ_ID=ef9e6ad59882] [REQUEST][START] HEAD /
DEBUG - 2026-03-09 10:46:17 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-09 10:46:17 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-09 10:46:17 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-09 10:46:17 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-09 10:46:17 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-09 10:51:17 --> [REQ_ID=b0087d119a10] [REQUEST][START] HEAD /
DEBUG - 2026-03-09 10:51:17 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-09 10:51:17 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-09 10:51:17 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-09 10:51:17 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-09 10:51:17 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-09 10:56:17 --> [REQ_ID=69c2abf64248] [REQUEST][START] HEAD /
DEBUG - 2026-03-09 10:56:17 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-09 10:56:17 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-09 10:56:17 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-09 10:56:17 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-09 10:56:17 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-09 10:58:55 --> [REQ_ID=94ce5bf523d1] [REQUEST][START] GET /index.php/Management/Marketing/Content/Generator
DEBUG - 2026-03-09 10:58:55 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-09 10:58:55 --> [REQ_ID=94ce5bf523d1] [FILTER_BEFORE] /index.php/Management/Marketing/Content/Generator
DEBUG - 2026-03-09 10:58:55 --> [REQ_ID=94ce5bf523d1] [ROUTE] Controller=\App\Modules\Management\Controllers\MarketingAdminController Method=contentGenerator
DEBUG - 2026-03-09 10:58:55 --> [REQ_ID=94ce5bf523d1] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Management/Marketing/Content/Generator
DEBUG - 2026-03-09 10:58:55 --> [CSRF] token name=csrf_test_name hash=e37eed877aaa0c5663eefdc1d5b230bd
DEBUG - 2026-03-09 10:58:55 --> [REQ_ID=94ce5bf523d1] [REQUEST][END]
INFO - 2026-03-09 10:58:55 --> [REQ_ID=94ce5bf523d1] [PERF] Execution time=0.060847
DEBUG - 2026-03-09 10:58:56 --> [REQ_ID=3754bc69849c] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-09 10:58:56 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-09 10:58:56 --> [REQ_ID=3754bc69849c] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-09 10:58:56 --> [REQ_ID=3754bc69849c] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-09 10:58:56 --> [REQ_ID=3754bc69849c] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-09 10:58:56 --> [CSRF] token name=csrf_test_name hash=d10467abe4bc77c32b551b8304afcee8
DEBUG - 2026-03-09 10:58:56 --> [REQ_ID=ac977cd57ba5] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-09 10:58:56 --> [REQ_ID=ac977cd57ba5] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-09 10:58:56 --> [REQ_ID=3754bc69849c] [FILTER_AFTER]
DEBUG - 2026-03-09 10:58:56 --> [REQ_ID=3754bc69849c] [LIFECYCLE][END] status=200 duration_ms=128.10 memory_delta=0
INFO - 2026-03-09 10:58:56 --> [REQ_ID=ac977cd57ba5] [PERF] Execution time=0.127900
DEBUG - 2026-03-09 10:58:56 --> [REQ_ID=3754bc69849c] [REQUEST][END]
INFO - 2026-03-09 10:58:56 --> [REQ_ID=3754bc69849c] [PERF] Execution time=0.139731
DEBUG - 2026-03-09 11:00:02 --> [REQ_ID=d380ba484cec] [REQUEST][START] GET /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-09 11:00:02 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-09 11:00:02 --> [REQ_ID=d380ba484cec] [FILTER_BEFORE] /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-09 11:00:02 --> [REQ_ID=d380ba484cec] [ROUTE] Controller=\App\Modules\Management\Controllers\ManagementAPIController Method=Run_CRON_Tasks
DEBUG - 2026-03-09 11:00:02 --> [REQ_ID=d380ba484cec] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-09 11:00:02 --> [REQ_ID=d380ba484cec] [REQUEST][END]
INFO - 2026-03-09 11:00:02 --> [REQ_ID=d380ba484cec] [PERF] Execution time=0.041024
DEBUG - 2026-03-09 11:01:16 --> [REQ_ID=55389affd18f] [REQUEST][START] HEAD /
DEBUG - 2026-03-09 11:01:16 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-09 11:01:16 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-09 11:01:17 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-09 11:01:17 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-09 11:01:17 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-09 11:02:43 --> [REQ_ID=982c680332be] [REQUEST][START] GET /index.php/How-It-Works/Investment-Portfolio-Management
DEBUG - 2026-03-09 11:02:43 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-09 11:02:43 --> [REQ_ID=982c680332be] [REQUEST][END]
INFO - 2026-03-09 11:02:43 --> [REQ_ID=982c680332be] [PERF] Execution time=0.041245
DEBUG - 2026-03-09 11:06:17 --> [REQ_ID=910b47e80597] [REQUEST][START] HEAD /
DEBUG - 2026-03-09 11:06:17 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-09 11:06:17 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-09 11:06:17 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-09 11:06:17 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-09 11:06:17 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-09 11:06:55 --> [REQ_ID=d30070445cbd] [REQUEST][START] GET /
DEBUG - 2026-03-09 11:06:55 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-09 11:06:55 --> [REQ_ID=d30070445cbd] [FILTER_BEFORE] /
DEBUG - 2026-03-09 11:06:55 --> [REQ_ID=d30070445cbd] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-09 11:06:55 --> [REQ_ID=d30070445cbd] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-09 11:06:55 --> [CSRF] token name=csrf_test_name hash=44b0c56f8ad033c9386306f4a0d074d5
DEBUG - 2026-03-09 11:06:55 --> [REQ_ID=21d8d95af49a] [INIT] App\Controllers\Home::GET
INFO - 2026-03-09 11:06:55 --> [REQ_ID=21d8d95af49a] [MEMORY][controller-start] 4194304
INFO - 2026-03-09 11:06:55 --> [REQ_ID=21d8d95af49a] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-09 11:06:55 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-09 11:06:56 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-03-09 11:06:56 --> [REQ_ID=21d8d95af49a] [VIEW_RENDER] themes/public/home
INFO - 2026-03-09 11:06:56 --> [REQ_ID=21d8d95af49a] [MEMORY][commonData:start] 8388608
INFO - 2026-03-09 11:06:56 --> themesMemory usage: 8388608
DEBUG - 2026-03-09 11:06:56 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-09 11:06:56 --> [REQ_ID=d30070445cbd] [FILTER_AFTER]
DEBUG - 2026-03-09 11:06:56 --> [REQ_ID=d30070445cbd] [LIFECYCLE][END] status=200 duration_ms=745.13 memory_delta=4194304
INFO - 2026-03-09 11:06:56 --> [REQ_ID=21d8d95af49a] [PERF] Execution time=0.743067
DEBUG - 2026-03-09 11:06:56 --> [REQ_ID=d30070445cbd] [REQUEST][END]
INFO - 2026-03-09 11:06:56 --> [REQ_ID=d30070445cbd] [PERF] Execution time=0.766261
DEBUG - 2026-03-09 11:11:17 --> [REQ_ID=bdd54c1ed341] [REQUEST][START] HEAD /
DEBUG - 2026-03-09 11:11:17 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-09 11:11:17 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-09 11:11:17 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-09 11:11:17 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-09 11:11:17 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-09 11:15:01 --> [REQ_ID=ce6fef32276f] [REQUEST][START] GET /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-09 11:15:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-09 11:15:02 --> [REQ_ID=ce6fef32276f] [FILTER_BEFORE] /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-09 11:15:02 --> [REQ_ID=ce6fef32276f] [ROUTE] Controller=\App\Modules\APIs\Controllers\AlertsAPIController Method=fetchEmailAlerts
DEBUG - 2026-03-09 11:15:02 --> [REQ_ID=ce6fef32276f] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-09 11:15:02 --> [REQ_ID=ce6fef32276f] [REQUEST][END]
INFO - 2026-03-09 11:15:02 --> [REQ_ID=ce6fef32276f] [PERF] Execution time=0.049744
DEBUG - 2026-03-09 11:16:16 --> [REQ_ID=b266b7921d46] [REQUEST][START] HEAD /
DEBUG - 2026-03-09 11:16:16 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-09 11:16:16 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-09 11:16:17 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-09 11:16:17 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-09 11:16:17 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-09 11:16:48 --> [REQ_ID=fca67802771f] [REQUEST][START] GET /
DEBUG - 2026-03-09 11:16:48 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-09 11:16:48 --> [REQ_ID=fca67802771f] [FILTER_BEFORE] /
DEBUG - 2026-03-09 11:16:48 --> [REQ_ID=fca67802771f] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-09 11:16:48 --> [REQ_ID=fca67802771f] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-09 11:16:48 --> [CSRF] token name=csrf_test_name hash=eb137e780d490a2533db056086f978d0
DEBUG - 2026-03-09 11:16:48 --> [REQ_ID=e023791bb92f] [INIT] App\Controllers\Home::GET
INFO - 2026-03-09 11:16:48 --> [REQ_ID=e023791bb92f] [MEMORY][controller-start] 4194304
INFO - 2026-03-09 11:16:48 --> [REQ_ID=e023791bb92f] [MEMORY][commonData:start] 4194304
DEBUG - 2026-03-09 11:16:48 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-09 11:16:49 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
DEBUG - 2026-03-09 11:16:49 --> [REQ_ID=e023791bb92f] [VIEW_RENDER] themes/public/home
INFO - 2026-03-09 11:16:49 --> [REQ_ID=e023791bb92f] [MEMORY][commonData:start] 8388608
INFO - 2026-03-09 11:16:49 --> themesMemory usage: 8388608
DEBUG - 2026-03-09 11:16:49 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-09 11:16:49 --> [REQ_ID=fca67802771f] [FILTER_AFTER]
DEBUG - 2026-03-09 11:16:49 --> [REQ_ID=fca67802771f] [LIFECYCLE][END] status=200 duration_ms=870.10 memory_delta=4194304
INFO - 2026-03-09 11:16:49 --> [REQ_ID=e023791bb92f] [PERF] Execution time=0.868316
DEBUG - 2026-03-09 11:16:49 --> [REQ_ID=fca67802771f] [REQUEST][END]
INFO - 2026-03-09 11:16:49 --> [REQ_ID=fca67802771f] [PERF] Execution time=0.881325
DEBUG - 2026-03-09 11:16:50 --> [REQ_ID=bdf34cbdb037] [REQUEST][START] POST /index.php/register
DEBUG - 2026-03-09 11:16:50 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-09 11:16:50 --> [REQ_ID=bdf34cbdb037] [FILTER_BEFORE] /index.php/register
DEBUG - 2026-03-09 11:16:50 --> [REQ_ID=bdf34cbdb037] [ROUTE] Controller=\App\Controllers\AuthController Method=attemptRegister
DEBUG - 2026-03-09 11:16:50 --> [REQ_ID=bdf34cbdb037] [LIFECYCLE][START] POST https://www.mymiwallet.com/index.php/register
DEBUG - 2026-03-09 11:16:50 --> [CSRF] token name=csrf_test_name hash=eb137e780d490a2533db056086f978d0
INFO - 2026-03-09 11:16:50 --> CSRF token verified.
DEBUG - 2026-03-09 11:16:50 --> [REQ_ID=8e4ebc9b923f] [INIT] App\Controllers\AuthController::POST
INFO - 2026-03-09 11:16:50 --> [REQ_ID=8e4ebc9b923f] [MEMORY][controller-start] 4194304
INFO - 2026-03-09 11:16:50 --> [REGISTRATION] Submission received
INFO - 2026-03-09 11:16:50 --> MailService queued email
INFO - 2026-03-09 11:16:50 --> [REGISTRATION] Validation passed (basic fields)
INFO - 2026-03-09 11:16:50 --> [REGISTRATION] Validation passed (password fields)
INFO - 2026-03-09 11:16:50 --> Registration created user_id=11700, email=m.a.rta.s.pellow.da@gmail.com, username=Martagoobe, active=, requiresActivation=1, loginIdentifier=username
INFO - 2026-03-09 11:16:50 --> [REGISTRATION] User record created
INFO - 2026-03-09 11:16:50 --> OnboardingProgressService: created onboarding record for user_id=11700
INFO - 2026-03-09 11:16:51 --> Registration succeeded for m.a.rta.s.pellow.da@gmail.com (event d195a51f3fe25413)
INFO - 2026-03-09 11:16:51 --> [REGISTRATION] Activation email queued
INFO - 2026-03-09 11:16:51 --> Registration redirecting to success guide for user_id=11700
DEBUG - 2026-03-09 11:16:51 --> [REQ_ID=bdf34cbdb037] [FILTER_AFTER]
DEBUG - 2026-03-09 11:16:51 --> [REQ_ID=bdf34cbdb037] [LIFECYCLE][END] status=302 duration_ms=1,285.54 memory_delta=0
INFO - 2026-03-09 11:16:51 --> [REQ_ID=8e4ebc9b923f] [PERF] Execution time=1.285191
DEBUG - 2026-03-09 11:16:51 --> [REQ_ID=bdf34cbdb037] [REQUEST][END]
INFO - 2026-03-09 11:16:51 --> [REQ_ID=bdf34cbdb037] [PERF] Execution time=1.298046
DEBUG - 2026-03-09 11:16:52 --> [REQ_ID=9c58020fbf51] [REQUEST][START] GET /index.php/register/success
DEBUG - 2026-03-09 11:16:52 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-09 11:16:52 --> [REQ_ID=9c58020fbf51] [FILTER_BEFORE] /index.php/register/success
DEBUG - 2026-03-09 11:16:52 --> [REQ_ID=9c58020fbf51] [ROUTE] Controller=\App\Controllers\AuthController Method=registerSuccess
DEBUG - 2026-03-09 11:16:52 --> [REQ_ID=9c58020fbf51] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/register/success
DEBUG - 2026-03-09 11:16:52 --> [CSRF] token name=csrf_test_name hash=eb137e780d490a2533db056086f978d0
DEBUG - 2026-03-09 11:16:52 --> [REQ_ID=4d3205881204] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-09 11:16:52 --> [REQ_ID=4d3205881204] [MEMORY][controller-start] 4194304
INFO - 2026-03-09 11:16:52 --> AuthController::registerSuccess view rendered.
INFO - 2026-03-09 11:16:52 --> [REQ_ID=4d3205881204] [PERF] Execution time=0.017959
DEBUG - 2026-03-09 11:16:52 --> [REQ_ID=fb296b7785bf] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-09 11:16:52 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-09 11:16:52 --> [REQ_ID=fb296b7785bf] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-09 11:16:52 --> [REQ_ID=fb296b7785bf] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-09 11:16:52 --> [REQ_ID=fb296b7785bf] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-09 11:16:52 --> [CSRF] token name=csrf_test_name hash=eb137e780d490a2533db056086f978d0
DEBUG - 2026-03-09 11:16:52 --> [REQ_ID=fcbe71c9e143] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-09 11:16:52 --> [REQ_ID=fcbe71c9e143] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-09 11:16:52 --> [REQ_ID=fb296b7785bf] [FILTER_AFTER]
DEBUG - 2026-03-09 11:16:52 --> [REQ_ID=fb296b7785bf] [LIFECYCLE][END] status=200 duration_ms=19.65 memory_delta=0
INFO - 2026-03-09 11:16:52 --> [REQ_ID=fcbe71c9e143] [PERF] Execution time=0.019976
DEBUG - 2026-03-09 11:16:52 --> [REQ_ID=fb296b7785bf] [REQUEST][END]
INFO - 2026-03-09 11:16:52 --> [REQ_ID=fb296b7785bf] [PERF] Execution time=0.030152
DEBUG - 2026-03-09 11:16:53 --> [REQ_ID=fe25415f4cf5] [REQUEST][START] POST /index.php/login
DEBUG - 2026-03-09 11:16:53 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-09 11:16:53 --> [REQ_ID=fe25415f4cf5] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-09 11:16:53 --> [REQ_ID=fe25415f4cf5] [ROUTE] Controller=\App\Controllers\AuthController Method=attemptLogin
DEBUG - 2026-03-09 11:16:53 --> [REQ_ID=fe25415f4cf5] [LIFECYCLE][START] POST https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-09 11:16:53 --> [CSRF] token name=csrf_test_name hash=eb137e780d490a2533db056086f978d0
INFO - 2026-03-09 11:16:53 --> CSRF token verified.
DEBUG - 2026-03-09 11:16:53 --> [REQ_ID=316cb6b09b95] [INIT] App\Controllers\AuthController::POST
INFO - 2026-03-09 11:16:53 --> [REQ_ID=316cb6b09b95] [MEMORY][controller-start] 4194304
INFO - 2026-03-09 11:16:53 --> AuthController L93: Auth:attemptLogin started.
INFO - 2026-03-09 11:16:53 --> AuthController L104: Auth:attemptLogin rules: {"login":"required","password":"required"}
INFO - 2026-03-09 11:16:53 --> AuthController L132: Auth:attemptLogin Login Variables: login: required, remember: false, ip: 176.36.146.80, ua: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/130.0.0.0 Safari/537.36
DEBUG - 2026-03-09 11:16:53 --> Auth attemptLogin() called with login identifier: Martagoobe, remember: false
DEBUG - 2026-03-09 11:16:53 --> Auth attemptLogin() called. redirect_url in session: none
DEBUG - 2026-03-09 11:16:53 --> Auth credentials normalised for attempt using key "username"
WARNING - 2026-03-09 11:16:53 --> [AUTH_FAILURE] 
DEBUG - 2026-03-09 11:16:53 --> Auth attempt failed for identifier Martagoobe. Error: This user account is not yet activated. <a href="https://www.mymiwallet.com/index.php/resend-activate-account?login=Martagoobe">Resend activation message one more time.</a>
WARNING - 2026-03-09 11:16:53 --> [AUTH] Login failure
WARNING - 2026-03-09 11:16:53 --> [AUTH] Login failed
DEBUG - 2026-03-09 11:16:53 --> [REQ_ID=fe25415f4cf5] [FILTER_AFTER]
DEBUG - 2026-03-09 11:16:53 --> [REQ_ID=fe25415f4cf5] [LIFECYCLE][END] status=302 duration_ms=104.97 memory_delta=0
INFO - 2026-03-09 11:16:53 --> [REQ_ID=316cb6b09b95] [PERF] Execution time=0.104758
DEBUG - 2026-03-09 11:16:53 --> [REQ_ID=fe25415f4cf5] [REQUEST][END]
INFO - 2026-03-09 11:16:53 --> [REQ_ID=fe25415f4cf5] [PERF] Execution time=0.113946
DEBUG - 2026-03-09 11:16:53 --> [REQ_ID=da5cf0a56b48] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-09 11:16:53 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-09 11:16:53 --> [REQ_ID=da5cf0a56b48] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-09 11:16:53 --> [REQ_ID=da5cf0a56b48] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-09 11:16:53 --> [REQ_ID=da5cf0a56b48] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-09 11:16:53 --> [CSRF] token name=csrf_test_name hash=eb137e780d490a2533db056086f978d0
DEBUG - 2026-03-09 11:16:53 --> [REQ_ID=88754d8d6ea5] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-09 11:16:53 --> [REQ_ID=88754d8d6ea5] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-09 11:16:53 --> [REQ_ID=da5cf0a56b48] [FILTER_AFTER]
DEBUG - 2026-03-09 11:16:53 --> [REQ_ID=da5cf0a56b48] [LIFECYCLE][END] status=200 duration_ms=16.10 memory_delta=0
INFO - 2026-03-09 11:16:53 --> [REQ_ID=88754d8d6ea5] [PERF] Execution time=0.016002
DEBUG - 2026-03-09 11:16:53 --> [REQ_ID=da5cf0a56b48] [REQUEST][END]
INFO - 2026-03-09 11:16:53 --> [REQ_ID=da5cf0a56b48] [PERF] Execution time=0.024872
DEBUG - 2026-03-09 11:16:54 --> [REQ_ID=b741921c1615] [REQUEST][START] GET /index.php/
DEBUG - 2026-03-09 11:16:54 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-09 11:16:54 --> [REQ_ID=b741921c1615] [FILTER_BEFORE] /index.php/
DEBUG - 2026-03-09 11:16:54 --> [REQ_ID=b741921c1615] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-09 11:16:54 --> [REQ_ID=b741921c1615] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-09 11:16:54 --> [CSRF] token name=csrf_test_name hash=eb137e780d490a2533db056086f978d0
DEBUG - 2026-03-09 11:16:54 --> [REQ_ID=52e3ec44eab0] [INIT] App\Controllers\Home::GET
INFO - 2026-03-09 11:16:54 --> [REQ_ID=52e3ec44eab0] [MEMORY][controller-start] 4194304
INFO - 2026-03-09 11:16:54 --> [REQ_ID=52e3ec44eab0] [MEMORY][commonData:start] 4194304
DEBUG - 2026-03-09 11:16:54 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-09 11:16:55 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
DEBUG - 2026-03-09 11:16:55 --> [REQ_ID=52e3ec44eab0] [VIEW_RENDER] themes/public/home
INFO - 2026-03-09 11:16:55 --> [REQ_ID=52e3ec44eab0] [MEMORY][commonData:start] 8388608
INFO - 2026-03-09 11:16:55 --> themesMemory usage: 8388608
DEBUG - 2026-03-09 11:16:55 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-09 11:16:55 --> [REQ_ID=b741921c1615] [FILTER_AFTER]
DEBUG - 2026-03-09 11:16:55 --> [REQ_ID=b741921c1615] [LIFECYCLE][END] status=200 duration_ms=577.56 memory_delta=4194304
INFO - 2026-03-09 11:16:55 --> [REQ_ID=52e3ec44eab0] [PERF] Execution time=0.577339
DEBUG - 2026-03-09 11:16:55 --> [REQ_ID=b741921c1615] [REQUEST][END]
INFO - 2026-03-09 11:16:55 --> [REQ_ID=b741921c1615] [PERF] Execution time=0.586198
DEBUG - 2026-03-09 11:21:17 --> [REQ_ID=b0196739ead0] [REQUEST][START] HEAD /
DEBUG - 2026-03-09 11:21:17 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-09 11:21:17 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-09 11:21:17 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-09 11:21:17 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-09 11:21:17 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-09 11:26:17 --> [REQ_ID=5eaaf60d01e6] [REQUEST][START] HEAD /
DEBUG - 2026-03-09 11:26:17 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-09 11:26:17 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-09 11:26:17 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-09 11:26:17 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-09 11:26:17 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-09 11:31:17 --> [REQ_ID=38909408a682] [REQUEST][START] HEAD /
DEBUG - 2026-03-09 11:31:17 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-09 11:31:17 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-09 11:31:17 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-09 11:31:17 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-09 11:31:17 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-09 11:34:45 --> [REQ_ID=d75c24b5b4e0] [REQUEST][START] GET /index.php/activate-account?token=0886df3fe8b1ba06bbc06cf0272e8688
DEBUG - 2026-03-09 11:34:45 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-09 11:34:45 --> [REQ_ID=d75c24b5b4e0] [FILTER_BEFORE] /index.php/activate-account?token=0886df3fe8b1ba06bbc06cf0272e8688
DEBUG - 2026-03-09 11:34:45 --> [REQ_ID=d75c24b5b4e0] [ROUTE] Controller=\App\Controllers\AuthController Method=activateAccount
DEBUG - 2026-03-09 11:34:45 --> [REQ_ID=d75c24b5b4e0] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/activate-account?token=0886df3fe8b1ba06bbc06cf0272e8688
DEBUG - 2026-03-09 11:34:45 --> [CSRF] token name=csrf_test_name hash=8ae94dd453fbb6fdf754d25787fedcf6
DEBUG - 2026-03-09 11:34:45 --> [REQ_ID=07b7c7f90500] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-09 11:34:45 --> [REQ_ID=07b7c7f90500] [MEMORY][controller-start] 6291456
INFO - 2026-03-09 11:34:45 --> [ACTIVATION] Activation link hit
DEBUG - 2026-03-09 11:34:45 --> [ACTIVATION] Token validated for user
INFO - 2026-03-09 11:34:45 --> [ACTIVATION] Account activated
INFO - 2026-03-09 11:34:45 --> [ACTIVATION] Redirect issued
DEBUG - 2026-03-09 11:34:45 --> [REQ_ID=d75c24b5b4e0] [FILTER_AFTER]
DEBUG - 2026-03-09 11:34:45 --> [REQ_ID=d75c24b5b4e0] [LIFECYCLE][END] status=302 duration_ms=193.63 memory_delta=0
INFO - 2026-03-09 11:34:45 --> [REQ_ID=07b7c7f90500] [PERF] Execution time=0.191879
DEBUG - 2026-03-09 11:34:45 --> [REQ_ID=d75c24b5b4e0] [REQUEST][END]
INFO - 2026-03-09 11:34:45 --> [REQ_ID=d75c24b5b4e0] [PERF] Execution time=0.236030
DEBUG - 2026-03-09 11:34:46 --> [REQ_ID=55e32ffd777b] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-09 11:34:46 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-09 11:34:46 --> [REQ_ID=55e32ffd777b] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-09 11:34:46 --> [REQ_ID=55e32ffd777b] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-09 11:34:46 --> [REQ_ID=55e32ffd777b] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-09 11:34:46 --> [CSRF] token name=csrf_test_name hash=5f4764a68bb58242d05e3860e9e1e047
DEBUG - 2026-03-09 11:34:46 --> [REQ_ID=7a4cb06e94c7] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-09 11:34:46 --> [REQ_ID=7a4cb06e94c7] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-09 11:34:46 --> [REQ_ID=55e32ffd777b] [FILTER_AFTER]
DEBUG - 2026-03-09 11:34:46 --> [REQ_ID=55e32ffd777b] [LIFECYCLE][END] status=200 duration_ms=43.57 memory_delta=0
INFO - 2026-03-09 11:34:46 --> [REQ_ID=7a4cb06e94c7] [PERF] Execution time=0.043369
DEBUG - 2026-03-09 11:34:46 --> [REQ_ID=55e32ffd777b] [REQUEST][END]
INFO - 2026-03-09 11:34:46 --> [REQ_ID=55e32ffd777b] [PERF] Execution time=0.052389
DEBUG - 2026-03-09 11:34:46 --> [REQ_ID=f03cf2363641] [REQUEST][START] POST /index.php/login
DEBUG - 2026-03-09 11:34:46 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-09 11:34:46 --> [REQ_ID=f03cf2363641] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-09 11:34:46 --> [REQ_ID=f03cf2363641] [ROUTE] Controller=\App\Controllers\AuthController Method=attemptLogin
DEBUG - 2026-03-09 11:34:46 --> [REQ_ID=f03cf2363641] [LIFECYCLE][START] POST https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-09 11:34:46 --> [CSRF] token name=csrf_test_name hash=5f4764a68bb58242d05e3860e9e1e047
INFO - 2026-03-09 11:34:46 --> CSRF token verified.
DEBUG - 2026-03-09 11:34:46 --> [REQ_ID=5d2056fc19e9] [INIT] App\Controllers\AuthController::POST
INFO - 2026-03-09 11:34:46 --> [REQ_ID=5d2056fc19e9] [MEMORY][controller-start] 4194304
INFO - 2026-03-09 11:34:46 --> AuthController L93: Auth:attemptLogin started.
INFO - 2026-03-09 11:34:46 --> AuthController L104: Auth:attemptLogin rules: {"login":"required","password":"required"}
INFO - 2026-03-09 11:34:46 --> AuthController L132: Auth:attemptLogin Login Variables: login: required, remember: false, ip: 176.36.146.80, ua: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/129.0.0.0 Safari/537.36
DEBUG - 2026-03-09 11:34:46 --> Auth attemptLogin() called with login identifier: Martagoobe, remember: false
DEBUG - 2026-03-09 11:34:46 --> Auth attemptLogin() called. redirect_url in session: none
DEBUG - 2026-03-09 11:34:46 --> Auth credentials normalised for attempt using key "username"
DEBUG - 2026-03-09 11:34:47 --> Auth attempt succeeded for identifier Martagoobe. logged_in(): yes, user_id(): 11700
DEBUG - 2026-03-09 11:34:47 --> Auth attempt succeeded. logged_in(): yes, user_id(): 11700
DEBUG - 2026-03-09 11:34:47 --> Auth attemptLogin() - session user_id set to: 11700
ERROR - 2026-03-09 11:34:47 --> Duplicate entry 'm.a.rta.s.pellow.da@gmail.com-176.36.146.80' for key 'bf_user_ip_history.bf_user_ip_unique_email'
in SYSTEMPATH/Database/MySQLi/Connection.php on line 300.
 1 SYSTEMPATH/Database/MySQLi/Connection.php(300): mysqli->query('INSERT INTO `bf_user_ip_history` (`user_id`, `email`, `ip_address`, `user_agent`, `first_seen_at`, `last_seen_at`, `created_at`, `updated_at`) VALUES (11700, \'m.a.rta.s.pellow.da@gmail.com\', \'176.36.146.80\', \'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/129.0.0.0 Safari/537.36\', \'2026-03-09 11:34:47\', \'2026-03-09 11:34:47\', \'2026-03-09 11:34:47\', \'2026-03-09 11:34:47\')', 0)
 2 SYSTEMPATH/Database/BaseConnection.php(769): CodeIgniter\Database\MySQLi\Connection->execute('INSERT INTO `bf_user_ip_history` (`user_id`, `email`, `ip_address`, `user_agent`, `first_seen_at`, `last_seen_at`, `created_at`, `updated_at`) VALUES (11700, \'m.a.rta.s.pellow.da@gmail.com\', \'176.36.146.80\', \'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/129.0.0.0 Safari/537.36\', \'2026-03-09 11:34:47\', \'2026-03-09 11:34:47\', \'2026-03-09 11:34:47\', \'2026-03-09 11:34:47\')')
 3 SYSTEMPATH/Database/BaseConnection.php(686): CodeIgniter\Database\BaseConnection->simpleQuery('INSERT INTO `bf_user_ip_history` (`user_id`, `email`, `ip_address`, `user_agent`, `first_seen_at`, `last_seen_at`, `created_at`, `updated_at`) VALUES (11700, \'m.a.rta.s.pellow.da@gmail.com\', \'176.36.146.80\', \'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/129.0.0.0 Safari/537.36\', \'2026-03-09 11:34:47\', \'2026-03-09 11:34:47\', \'2026-03-09 11:34:47\', \'2026-03-09 11:34:47\')')
 4 SYSTEMPATH/Database/BaseBuilder.php(2345): CodeIgniter\Database\BaseConnection->query('INSERT INTO `bf_user_ip_history` (`user_id`, `email`, `ip_address`, `user_agent`, `first_seen_at`, `last_seen_at`, `created_at`, `updated_at`) VALUES (:user_id:, :email:, :ip_address:, :user_agent:, :first_seen_at:, :last_seen_at:, :created_at:, :updated_at:)', [...], false)
 5 SYSTEMPATH/Model.php(356): CodeIgniter\Database\BaseBuilder->insert()
 6 SYSTEMPATH/BaseModel.php(898): CodeIgniter\Model->doInsert([...])
 7 SYSTEMPATH/Model.php(665): CodeIgniter\BaseModel->insert([...], true)
 8 APPPATH/Models/UserIpHistoryModel.php(41): CodeIgniter\Model->insert([...])
 9 APPPATH/Controllers/AuthController.php(286): App\Models\UserIpHistoryModel->record(11700, 'm.a.rta.s.pellow.da@gmail.com', '176.36.146.80', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/129.0.0.0 Safari/537.36')
10 SYSTEMPATH/CodeIgniter.php(951): App\Controllers\AuthController->attemptLogin()
11 SYSTEMPATH/CodeIgniter.php(497): CodeIgniter\CodeIgniter->runController(Object(App\Controllers\AuthController))
12 SYSTEMPATH/CodeIgniter.php(340): CodeIgniter\CodeIgniter->handleRequest(null, Object(Config\Cache), false)
13 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
14 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
15 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
ERROR - 2026-03-09 11:34:47 --> UserIpHistoryModel::record failed: Duplicate entry 'm.a.rta.s.pellow.da@gmail.com-176.36.146.80' for key 'bf_user_ip_history.bf_user_ip_unique_email'
INFO - 2026-03-09 11:34:47 --> [AUTH] Login success
INFO - 2026-03-09 11:34:47 --> OnboardingProgressService: first verified login recorded for user_id=11700
INFO - 2026-03-09 11:34:47 --> OnboardingProgressService: walkthrough started for user_id=11700
INFO - 2026-03-09 11:34:47 --> Auth attemptLogin() onboarding walkthrough queued for user_id=11700
DEBUG - 2026-03-09 11:34:47 --> Auth redirect destination: https://www.mymiwallet.com/index.php/Dashboard
DEBUG - 2026-03-09 11:34:47 --> [REQ_ID=f03cf2363641] [FILTER_AFTER]
DEBUG - 2026-03-09 11:34:47 --> [REQ_ID=f03cf2363641] [LIFECYCLE][END] status=302 duration_ms=193.47 memory_delta=0
INFO - 2026-03-09 11:34:47 --> [REQ_ID=5d2056fc19e9] [PERF] Execution time=0.193481
DEBUG - 2026-03-09 11:34:47 --> [REQ_ID=f03cf2363641] [REQUEST][END]
INFO - 2026-03-09 11:34:47 --> [REQ_ID=f03cf2363641] [PERF] Execution time=0.202541
DEBUG - 2026-03-09 11:34:47 --> [REQ_ID=190b19ce9fbb] [REQUEST][START] GET /index.php/Dashboard
DEBUG - 2026-03-09 11:34:47 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-09 11:34:47 --> [REQ_ID=190b19ce9fbb] [FILTER_BEFORE] /index.php/Dashboard
DEBUG - 2026-03-09 11:34:47 --> [REQ_ID=190b19ce9fbb] [ROUTE] Controller=\App\Modules\User\Controllers\DashboardController Method=index
DEBUG - 2026-03-09 11:34:47 --> [REQ_ID=190b19ce9fbb] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Dashboard
DEBUG - 2026-03-09 11:34:47 --> [CSRF] token name=csrf_test_name hash=5f4764a68bb58242d05e3860e9e1e047
DEBUG - 2026-03-09 11:34:47 --> [REQ_ID=6d1cffc95462] [INIT] App\Modules\User\Controllers\DashboardController::GET
INFO - 2026-03-09 11:34:47 --> [REQ_ID=6d1cffc95462] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-09 11:34:47 --> [REQ_ID=6d1cffc95462] [METHOD_ENTRY] index
DEBUG - 2026-03-09 11:34:47 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-09 11:34:47 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-09 11:34:47 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-09 11:34:47 --> MyMIMarketing: Pscrape library not installed; Google search scraping will use fallback.
DEBUG - 2026-03-09 11:34:47 --> [DASHBOARD] Enter
DEBUG - 2026-03-09 11:34:47 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-09 11:34:47 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-09 11:34:47 --> [SERVICE] App\Services\BudgetService ::getUserBudget
DEBUG - 2026-03-09 11:34:47 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":11700,"deleted":0}
DEBUG - 2026-03-09 11:34:47 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-09 11:34:47 --> [MODEL_WHERE] App\Models\BudgetModel KEY="created_by"
DEBUG - 2026-03-09 11:34:47 --> [MODEL_WHERE] App\Models\BudgetModel KEY="account_type"
DEBUG - 2026-03-09 11:34:47 --> [MODEL_WHERE] App\Models\BudgetModel KEY="designated_date >="
DEBUG - 2026-03-09 11:34:47 --> [MODEL_WHERE] App\Models\BudgetModel KEY="designated_date <="
DEBUG - 2026-03-09 11:34:47 --> [MODEL_WHERE] App\Models\BudgetModel KEY="year"
DEBUG - 2026-03-09 11:34:47 --> [MODEL_WHERE] App\Models\BudgetModel KEY="month <="
DEBUG - 2026-03-09 11:34:47 --> [MODEL_WHERE] App\Models\BudgetModel KEY="day <="
DEBUG - 2026-03-09 11:34:47 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":11700,"account_type":"Income","month":"03","year":"2026"}
DEBUG - 2026-03-09 11:34:47 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-03-09 11:34:47 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":11700,"account_type":"Income","month":"02","year":"2026"}
DEBUG - 2026-03-09 11:34:47 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-03-09 11:34:47 --> [MODEL_WHERE] App\Models\BudgetModel KEY="created_by"
DEBUG - 2026-03-09 11:34:47 --> [MODEL_WHERE] App\Models\BudgetModel KEY="account_type"
DEBUG - 2026-03-09 11:34:47 --> [MODEL_WHERE] App\Models\BudgetModel KEY="designated_date >="
DEBUG - 2026-03-09 11:34:47 --> [MODEL_WHERE] App\Models\BudgetModel KEY="designated_date <="
DEBUG - 2026-03-09 11:34:47 --> [MODEL_WHERE] App\Models\BudgetModel KEY="year"
DEBUG - 2026-03-09 11:34:47 --> [MODEL_WHERE] App\Models\BudgetModel KEY="month <="
DEBUG - 2026-03-09 11:34:47 --> [MODEL_WHERE] App\Models\BudgetModel KEY="day <="
DEBUG - 2026-03-09 11:34:47 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":11700,"account_type":"Expense","month":"03","year":"2026"}
DEBUG - 2026-03-09 11:34:47 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-03-09 11:34:47 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":11700,"account_type":"Expense","month":"02","year":"2026"}
DEBUG - 2026-03-09 11:34:47 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-03-09 11:34:47 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"status":1,"created_by":11700,"deleted":0}
DEBUG - 2026-03-09 11:34:47 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"status":1,"paid":0,"created_by":11700,"deleted":0}
DEBUG - 2026-03-09 11:34:47 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"status":1,"created_by":11700,"deleted":0}
ERROR - 2026-03-09 11:34:48 --> DashboardController::index failed to load executive summary: Call to undefined method CodeIgniter\Cache\Handlers\FileHandler::set()
DEBUG - 2026-03-09 11:34:48 --> [CACHE_MISS] mymiwallet_development_squeeze_high-risk_global_global_1f86633dd
ERROR - 2026-03-09 11:34:48 --> Unknown column 'score_total' in 'where clause'
in SYSTEMPATH/Database/MySQLi/Connection.php on line 300.
 1 SYSTEMPATH/Database/MySQLi/Connection.php(300): mysqli->query('SELECT COUNT(*) AS `numrows`
FROM `bf_squeeze_scorecards`
WHERE `score_total` >= 80
AND `as_of_datetime` >= \'2026-03-08 11:34:48\'', 0)
 2 SYSTEMPATH/Database/BaseConnection.php(769): CodeIgniter\Database\MySQLi\Connection->execute('SELECT COUNT(*) AS `numrows`
FROM `bf_squeeze_scorecards`
WHERE `score_total` >= 80
AND `as_of_datetime` >= \'2026-03-08 11:34:48\'')
 3 SYSTEMPATH/Database/BaseConnection.php(686): CodeIgniter\Database\BaseConnection->simpleQuery('SELECT COUNT(*) AS `numrows`
FROM `bf_squeeze_scorecards`
WHERE `score_total` >= 80
AND `as_of_datetime` >= \'2026-03-08 11:34:48\'')
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
DEBUG - 2026-03-09 11:34:48 --> MyMIInvestments::getSqueezeHighRiskCount failed: Unknown column 'score_total' in 'where clause'
DEBUG - 2026-03-09 11:34:48 --> 📰 Daily dashboard news window 2026-03-09 00:00:00 -> 2026-03-09 23:59:59 returned 0 rows
DEBUG - 2026-03-09 11:34:48 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-09 11:34:48 --> [SETUP] Status computed
DEBUG - 2026-03-09 11:34:48 --> [REQ_ID=6d1cffc95462] [VIEW_RENDER] User/Dashboard/index
INFO - 2026-03-09 11:34:48 --> [REQ_ID=6d1cffc95462] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-09 11:34:48 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-09 11:34:48 --> [MODEL_WHERE] App\Models\BudgetModel KEY="created_by"
DEBUG - 2026-03-09 11:34:48 --> [MODEL_WHERE] App\Models\BudgetModel KEY="account_type"
DEBUG - 2026-03-09 11:34:48 --> [MODEL_WHERE] App\Models\BudgetModel KEY="designated_date >="
DEBUG - 2026-03-09 11:34:48 --> [MODEL_WHERE] App\Models\BudgetModel KEY="designated_date <="
DEBUG - 2026-03-09 11:34:48 --> [MODEL_WHERE] App\Models\BudgetModel KEY="year"
DEBUG - 2026-03-09 11:34:48 --> [MODEL_WHERE] App\Models\BudgetModel KEY="month <="
DEBUG - 2026-03-09 11:34:48 --> [MODEL_WHERE] App\Models\BudgetModel KEY="day <="
DEBUG - 2026-03-09 11:34:48 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":11700,"account_type":"Income","month":"03","year":"2026"}
DEBUG - 2026-03-09 11:34:48 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-03-09 11:34:48 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":11700,"account_type":"Income","month":"02","year":"2026"}
DEBUG - 2026-03-09 11:34:48 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-03-09 11:34:48 --> [MODEL_WHERE] App\Models\BudgetModel KEY="created_by"
DEBUG - 2026-03-09 11:34:48 --> [MODEL_WHERE] App\Models\BudgetModel KEY="account_type"
DEBUG - 2026-03-09 11:34:48 --> [MODEL_WHERE] App\Models\BudgetModel KEY="designated_date >="
DEBUG - 2026-03-09 11:34:48 --> [MODEL_WHERE] App\Models\BudgetModel KEY="designated_date <="
DEBUG - 2026-03-09 11:34:48 --> [MODEL_WHERE] App\Models\BudgetModel KEY="year"
DEBUG - 2026-03-09 11:34:48 --> [MODEL_WHERE] App\Models\BudgetModel KEY="month <="
DEBUG - 2026-03-09 11:34:48 --> [MODEL_WHERE] App\Models\BudgetModel KEY="day <="
DEBUG - 2026-03-09 11:34:48 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":11700,"account_type":"Expense","month":"03","year":"2026"}
DEBUG - 2026-03-09 11:34:48 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-03-09 11:34:48 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":11700,"account_type":"Expense","month":"02","year":"2026"}
DEBUG - 2026-03-09 11:34:48 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-03-09 11:34:48 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"status":1,"created_by":11700,"deleted":0}
DEBUG - 2026-03-09 11:34:48 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"status":1,"paid":0,"created_by":11700,"deleted":0}
DEBUG - 2026-03-09 11:34:48 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-09 11:34:48 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"status":1,"created_by":11700,"deleted":0}
DEBUG - 2026-03-09 11:34:48 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"status":1,"paid":0,"created_by":11700,"deleted":0}
DEBUG - 2026-03-09 11:34:48 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":11700,"account_type":"Income","status":1,"month":"03","year":"2026"}
DEBUG - 2026-03-09 11:34:48 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-03-09 11:34:48 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":11700,"account_type":"Expense","status":1,"month":"03","year":"2026"}
DEBUG - 2026-03-09 11:34:48 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-03-09 11:34:48 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":11700,"account_type":"Investment","month":"03","year":"2026","status":1}
DEBUG - 2026-03-09 11:34:48 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-03-09 11:34:48 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":11700,"account_type":"Income","status":1,"month":"02"}
DEBUG - 2026-03-09 11:34:48 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-03-09 11:34:48 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":11700,"account_type":"Expense","status":1,"month":"02"}
DEBUG - 2026-03-09 11:34:48 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-03-09 11:34:48 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":11700,"account_type":"Investment","month":"02","year":"2026","status":1}
DEBUG - 2026-03-09 11:34:48 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-03-09 11:34:48 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":11700,"account_type":"Income","status":1,"month":"04"}
DEBUG - 2026-03-09 11:34:48 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-03-09 11:34:48 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":11700,"account_type":"Expense","status":1,"month":"04"}
DEBUG - 2026-03-09 11:34:48 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-03-09 11:34:48 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":11700,"account_type":"Investment","month":"04","year":"2026","status":1}
DEBUG - 2026-03-09 11:34:48 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-03-09 11:34:48 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":11700,"account_type":"Income","status":1,"year":"2026"}
DEBUG - 2026-03-09 11:34:48 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-03-09 11:34:48 --> [MODEL_WHERE] App\Models\BudgetModel KEY="created_by"
DEBUG - 2026-03-09 11:34:48 --> [MODEL_WHERE] App\Models\BudgetModel KEY="account_type"
DEBUG - 2026-03-09 11:34:48 --> [MODEL_WHERE] App\Models\BudgetModel KEY="status"
DEBUG - 2026-03-09 11:34:48 --> [MODEL_WHERE] App\Models\BudgetModel KEY="year"
DEBUG - 2026-03-09 11:34:48 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-03-09 11:34:48 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":11700,"account_type":"Investment","status":1}
DEBUG - 2026-03-09 11:34:48 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-03-09 11:34:48 --> [MODEL_WHERE] App\Models\BudgetModel KEY="created_by"
DEBUG - 2026-03-09 11:34:48 --> [MODEL_WHERE] App\Models\BudgetModel KEY="account_type"
DEBUG - 2026-03-09 11:34:48 --> [MODEL_WHERE] App\Models\BudgetModel KEY="status"
DEBUG - 2026-03-09 11:34:48 --> [MODEL_WHERE] App\Models\BudgetModel KEY="designated_date >="
DEBUG - 2026-03-09 11:34:48 --> [MODEL_WHERE] App\Models\BudgetModel KEY="designated_date <="
DEBUG - 2026-03-09 11:34:48 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-03-09 11:34:48 --> [MODEL_WHERE] App\Models\BudgetModel KEY="created_by"
DEBUG - 2026-03-09 11:34:48 --> [MODEL_WHERE] App\Models\BudgetModel KEY="account_type"
DEBUG - 2026-03-09 11:34:48 --> [MODEL_WHERE] App\Models\BudgetModel KEY="status"
DEBUG - 2026-03-09 11:34:48 --> [MODEL_WHERE] App\Models\BudgetModel KEY="designated_date >="
DEBUG - 2026-03-09 11:34:48 --> [MODEL_WHERE] App\Models\BudgetModel KEY="designated_date <="
DEBUG - 2026-03-09 11:34:48 --> [MODEL_FIRST] App\Models\BudgetModel
INFO - 2026-03-09 11:34:48 --> DashboardController L72 - $checkingSummary: 0
DEBUG - 2026-03-09 11:34:48 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-09 11:34:48 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-09 11:34:48 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-09 11:34:48 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-09 11:34:48 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-09 11:34:48 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-09 11:34:48 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-09 11:34:48 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-09 11:34:48 --> [SERVICE] App\Services\BudgetService ::getUserBudget
DEBUG - 2026-03-09 11:34:48 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":11700,"deleted":0}
DEBUG - 2026-03-09 11:34:48 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-09 11:34:48 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"status":1,"created_by":11700,"deleted":0}
DEBUG - 2026-03-09 11:34:48 --> [MODEL_WHERE] App\Models\BudgetModel KEY="created_by"
DEBUG - 2026-03-09 11:34:48 --> [MODEL_WHERE] App\Models\BudgetModel KEY="account_type"
DEBUG - 2026-03-09 11:34:48 --> [MODEL_WHERE] App\Models\BudgetModel KEY="designated_date >="
DEBUG - 2026-03-09 11:34:48 --> [MODEL_WHERE] App\Models\BudgetModel KEY="designated_date <="
DEBUG - 2026-03-09 11:34:48 --> [MODEL_WHERE] App\Models\BudgetModel KEY="year"
DEBUG - 2026-03-09 11:34:48 --> [MODEL_WHERE] App\Models\BudgetModel KEY="month <="
DEBUG - 2026-03-09 11:34:48 --> [MODEL_WHERE] App\Models\BudgetModel KEY="day <="
DEBUG - 2026-03-09 11:34:48 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":11700,"account_type":"Income","month":"03","year":"2026"}
DEBUG - 2026-03-09 11:34:48 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-03-09 11:34:48 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":11700,"account_type":"Income","month":"02","year":"2026"}
DEBUG - 2026-03-09 11:34:48 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-03-09 11:34:48 --> [MODEL_WHERE] App\Models\BudgetModel KEY="created_by"
DEBUG - 2026-03-09 11:34:48 --> [MODEL_WHERE] App\Models\BudgetModel KEY="account_type"
DEBUG - 2026-03-09 11:34:48 --> [MODEL_WHERE] App\Models\BudgetModel KEY="designated_date >="
DEBUG - 2026-03-09 11:34:48 --> [MODEL_WHERE] App\Models\BudgetModel KEY="designated_date <="
DEBUG - 2026-03-09 11:34:48 --> [MODEL_WHERE] App\Models\BudgetModel KEY="year"
DEBUG - 2026-03-09 11:34:48 --> [MODEL_WHERE] App\Models\BudgetModel KEY="month <="
DEBUG - 2026-03-09 11:34:48 --> [MODEL_WHERE] App\Models\BudgetModel KEY="day <="
DEBUG - 2026-03-09 11:34:48 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":11700,"account_type":"Expense","month":"03","year":"2026"}
DEBUG - 2026-03-09 11:34:48 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-03-09 11:34:48 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":11700,"account_type":"Expense","month":"02","year":"2026"}
DEBUG - 2026-03-09 11:34:48 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-03-09 11:34:48 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"status":1,"created_by":11700,"deleted":0}
DEBUG - 2026-03-09 11:34:48 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"status":1,"paid":0,"created_by":11700,"deleted":0}
INFO - 2026-03-09 11:34:48 --> DashboardController: onboarding walkthrough modal triggered for user_id=11700
INFO - 2026-03-09 11:34:48 --> getSolanaData: invalid address param
INFO - 2026-03-09 11:34:49 --> themesMemory usage: 6291456
DEBUG - 2026-03-09 11:34:49 --> [REQ_ID=190b19ce9fbb] [FILTER_AFTER]
DEBUG - 2026-03-09 11:34:49 --> [REQ_ID=190b19ce9fbb] [LIFECYCLE][END] status=200 duration_ms=1,401.91 memory_delta=2097152
INFO - 2026-03-09 11:34:49 --> [REQ_ID=6d1cffc95462] [PERF] Execution time=1.395517
DEBUG - 2026-03-09 11:34:49 --> [REQ_ID=190b19ce9fbb] [REQUEST][END]
INFO - 2026-03-09 11:34:49 --> [REQ_ID=190b19ce9fbb] [PERF] Execution time=1.417941
DEBUG - 2026-03-09 11:34:49 --> [REQ_ID=ef119a406992] [REQUEST][START] GET /index.php/Account/Billing
DEBUG - 2026-03-09 11:34:49 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-09 11:34:49 --> [REQ_ID=ef119a406992] [FILTER_BEFORE] /index.php/Account/Billing
DEBUG - 2026-03-09 11:34:49 --> [REQ_ID=ef119a406992] [ROUTE] Controller=\App\Modules\User\Controllers\DashboardController Method=billing
DEBUG - 2026-03-09 11:34:49 --> [REQ_ID=ef119a406992] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Account/Billing
DEBUG - 2026-03-09 11:34:49 --> [CSRF] token name=csrf_test_name hash=5f4764a68bb58242d05e3860e9e1e047
DEBUG - 2026-03-09 11:34:49 --> [REQ_ID=84fbed29228f] [INIT] App\Modules\User\Controllers\DashboardController::GET
INFO - 2026-03-09 11:34:49 --> [REQ_ID=84fbed29228f] [MEMORY][controller-start] 6291456
DEBUG - 2026-03-09 11:34:49 --> [REQ_ID=84fbed29228f] [METHOD_ENTRY] billing
DEBUG - 2026-03-09 11:34:49 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-09 11:34:49 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-09 11:34:49 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-09 11:34:49 --> MyMIMarketing: Pscrape library not installed; Google search scraping will use fallback.
DEBUG - 2026-03-09 11:34:49 --> No default Solana wallet for user 11700; provisioning...
INFO - 2026-03-09 11:34:49 --> [REQ_ID=84fbed29228f] [PERF] Execution time=0.018214
DEBUG - 2026-03-09 11:36:17 --> [REQ_ID=09667eecce86] [REQUEST][START] HEAD /
DEBUG - 2026-03-09 11:36:17 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-09 11:36:17 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-09 11:36:17 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-09 11:36:17 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-09 11:36:17 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-09 11:41:17 --> [REQ_ID=751f28a29e29] [REQUEST][START] HEAD /
DEBUG - 2026-03-09 11:41:17 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-09 11:41:17 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-09 11:41:17 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-09 11:41:17 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-09 11:41:17 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-09 11:44:06 --> [REQ_ID=46527014ea8b] [REQUEST][START] GET /
DEBUG - 2026-03-09 11:44:06 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-09 11:44:06 --> [REQ_ID=46527014ea8b] [FILTER_BEFORE] /
DEBUG - 2026-03-09 11:44:06 --> [REQ_ID=46527014ea8b] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-09 11:44:06 --> [REQ_ID=46527014ea8b] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-09 11:44:06 --> [CSRF] token name=csrf_test_name hash=75d32eeae8530e4459899ee4c70c6e3a
DEBUG - 2026-03-09 11:44:06 --> [REQ_ID=de94dc150618] [INIT] App\Controllers\Home::GET
INFO - 2026-03-09 11:44:06 --> [REQ_ID=de94dc150618] [MEMORY][controller-start] 6291456
INFO - 2026-03-09 11:44:06 --> [REQ_ID=de94dc150618] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-09 11:44:06 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-09 11:44:06 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-03-09 11:44:06 --> [REQ_ID=de94dc150618] [VIEW_RENDER] themes/public/home
INFO - 2026-03-09 11:44:06 --> [REQ_ID=de94dc150618] [MEMORY][commonData:start] 10485760
INFO - 2026-03-09 11:44:06 --> themesMemory usage: 10485760
DEBUG - 2026-03-09 11:44:06 --> [MetaService] slug= pageName=Home cacheHit= path=DB
DEBUG - 2026-03-09 11:44:06 --> [REQ_ID=46527014ea8b] [FILTER_AFTER]
DEBUG - 2026-03-09 11:44:06 --> [REQ_ID=46527014ea8b] [LIFECYCLE][END] status=200 duration_ms=768.18 memory_delta=4194304
INFO - 2026-03-09 11:44:06 --> [REQ_ID=de94dc150618] [PERF] Execution time=0.766140
DEBUG - 2026-03-09 11:44:06 --> [REQ_ID=46527014ea8b] [REQUEST][END]
INFO - 2026-03-09 11:44:06 --> [REQ_ID=46527014ea8b] [PERF] Execution time=0.808309
DEBUG - 2026-03-09 11:44:07 --> [REQ_ID=7b40a4744579] [REQUEST][START] GET /index.php/How-It-Works/Investment-Dashboard
DEBUG - 2026-03-09 11:44:07 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-09 11:44:07 --> [REQ_ID=7b40a4744579] [FILTER_BEFORE] /index.php/How-It-Works/Investment-Dashboard
DEBUG - 2026-03-09 11:44:07 --> [REQ_ID=7b40a4744579] [ROUTE] Controller=\App\Modules\Blog\Controllers\HowItWorksController Method=show
DEBUG - 2026-03-09 11:44:07 --> [REQ_ID=7b40a4744579] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/How-It-Works/Investment-Dashboard
DEBUG - 2026-03-09 11:44:07 --> [CSRF] token name=csrf_test_name hash=75d32eeae8530e4459899ee4c70c6e3a
DEBUG - 2026-03-09 11:44:07 --> [REQ_ID=abaa790b1614] [INIT] App\Modules\Blog\Controllers\HowItWorksController::GET
INFO - 2026-03-09 11:44:07 --> [REQ_ID=abaa790b1614] [MEMORY][controller-start] 6291456
DEBUG - 2026-03-09 11:44:07 --> [REQ_ID=abaa790b1614] [METHOD_ENTRY] show
DEBUG - 2026-03-09 11:44:07 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-09 11:44:07 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-09 11:44:07 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-09 11:44:07 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-09 11:44:07 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-09 11:44:07 --> MyMICoin: guest context detected; skipping user-specific preload.
ERROR - 2026-03-09 11:44:07 --> HowItWorksController failure: Call to undefined method App\Modules\Blog\Controllers\HowItWorksController::respondWithRendered()
INFO - 2026-03-09 11:44:07 --> [REQ_ID=abaa790b1614] [PERF] Execution time=0.063886
DEBUG - 2026-03-09 11:44:08 --> [REQ_ID=3e2ec9eabc28] [REQUEST][START] GET /index.php/Dashboard
DEBUG - 2026-03-09 11:44:08 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-09 11:44:08 --> [REQ_ID=3e2ec9eabc28] [FILTER_BEFORE] /index.php/Dashboard
DEBUG - 2026-03-09 11:44:08 --> [REQ_ID=3e2ec9eabc28] [ROUTE] Controller=\App\Modules\User\Controllers\DashboardController Method=index
DEBUG - 2026-03-09 11:44:08 --> [REQ_ID=3e2ec9eabc28] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Dashboard
DEBUG - 2026-03-09 11:44:08 --> [CSRF] token name=csrf_test_name hash=75d32eeae8530e4459899ee4c70c6e3a
DEBUG - 2026-03-09 11:44:08 --> [REQ_ID=3e2ec9eabc28] [REQUEST][END]
INFO - 2026-03-09 11:44:08 --> [REQ_ID=3e2ec9eabc28] [PERF] Execution time=0.015340
DEBUG - 2026-03-09 11:44:08 --> [REQ_ID=b7d99430fe7f] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-09 11:44:08 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-09 11:44:08 --> [REQ_ID=b7d99430fe7f] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-09 11:44:08 --> [REQ_ID=b7d99430fe7f] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-09 11:44:08 --> [REQ_ID=b7d99430fe7f] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-09 11:44:08 --> [CSRF] token name=csrf_test_name hash=75d32eeae8530e4459899ee4c70c6e3a
DEBUG - 2026-03-09 11:44:08 --> [REQ_ID=f75c63083efb] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-09 11:44:08 --> [REQ_ID=f75c63083efb] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-09 11:44:08 --> [REQ_ID=b7d99430fe7f] [FILTER_AFTER]
DEBUG - 2026-03-09 11:44:08 --> [REQ_ID=b7d99430fe7f] [LIFECYCLE][END] status=200 duration_ms=29.00 memory_delta=0
INFO - 2026-03-09 11:44:08 --> [REQ_ID=f75c63083efb] [PERF] Execution time=0.028651
DEBUG - 2026-03-09 11:44:08 --> [REQ_ID=b7d99430fe7f] [REQUEST][END]
INFO - 2026-03-09 11:44:08 --> [REQ_ID=b7d99430fe7f] [PERF] Execution time=0.040805
DEBUG - 2026-03-09 11:44:09 --> [REQ_ID=f226170ab9d6] [REQUEST][START] GET /index.php/register
DEBUG - 2026-03-09 11:44:09 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-09 11:44:09 --> [REQ_ID=f226170ab9d6] [FILTER_BEFORE] /index.php/register
DEBUG - 2026-03-09 11:44:09 --> [REQ_ID=f226170ab9d6] [ROUTE] Controller=\App\Controllers\AuthController Method=register
DEBUG - 2026-03-09 11:44:09 --> [REQ_ID=f226170ab9d6] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/register
DEBUG - 2026-03-09 11:44:09 --> [CSRF] token name=csrf_test_name hash=75d32eeae8530e4459899ee4c70c6e3a
DEBUG - 2026-03-09 11:44:09 --> [REQ_ID=626f95f91783] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-09 11:44:09 --> [REQ_ID=626f95f91783] [MEMORY][controller-start] 4194304
INFO - 2026-03-09 11:44:09 --> [REGISTRATION] Form loaded
INFO - 2026-03-09 11:44:09 --> [REQ_ID=626f95f91783] [PERF] Execution time=0.015973
DEBUG - 2026-03-09 11:44:10 --> [REQ_ID=66e0b236bf32] [REQUEST][START] GET /index.php/Free/register
DEBUG - 2026-03-09 11:44:10 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-09 11:44:10 --> [REQ_ID=66e0b236bf32] [FILTER_BEFORE] /index.php/Free/register
DEBUG - 2026-03-09 11:44:10 --> [REQ_ID=66e0b236bf32] [ROUTE] Controller=\App\Controllers\AuthController Method=register
DEBUG - 2026-03-09 11:44:10 --> [REQ_ID=66e0b236bf32] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Free/register
DEBUG - 2026-03-09 11:44:10 --> [CSRF] token name=csrf_test_name hash=75d32eeae8530e4459899ee4c70c6e3a
DEBUG - 2026-03-09 11:44:10 --> [REQ_ID=66e0b236bf32] [REQUEST][END]
INFO - 2026-03-09 11:44:10 --> [REQ_ID=66e0b236bf32] [PERF] Execution time=0.009656
DEBUG - 2026-03-09 11:44:10 --> [REQ_ID=9f4813c29975] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-09 11:44:10 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-09 11:44:10 --> [REQ_ID=9f4813c29975] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-09 11:44:10 --> [REQ_ID=9f4813c29975] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-09 11:44:10 --> [REQ_ID=9f4813c29975] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-09 11:44:10 --> [CSRF] token name=csrf_test_name hash=75d32eeae8530e4459899ee4c70c6e3a
DEBUG - 2026-03-09 11:44:10 --> [REQ_ID=3fb1322eb281] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-09 11:44:10 --> [REQ_ID=3fb1322eb281] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-09 11:44:10 --> [REQ_ID=9f4813c29975] [FILTER_AFTER]
DEBUG - 2026-03-09 11:44:10 --> [REQ_ID=9f4813c29975] [LIFECYCLE][END] status=200 duration_ms=17.59 memory_delta=0
INFO - 2026-03-09 11:44:10 --> [REQ_ID=3fb1322eb281] [PERF] Execution time=0.017430
DEBUG - 2026-03-09 11:44:10 --> [REQ_ID=9f4813c29975] [REQUEST][END]
INFO - 2026-03-09 11:44:10 --> [REQ_ID=9f4813c29975] [PERF] Execution time=0.026445
DEBUG - 2026-03-09 11:45:13 --> [REQ_ID=c5f709dffe3d] [REQUEST][START] GET /index.php/Preview/Alert/GRAB
DEBUG - 2026-03-09 11:45:13 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-09 11:45:13 --> [REQ_ID=c5f709dffe3d] [FILTER_BEFORE] /index.php/Preview/Alert/GRAB
DEBUG - 2026-03-09 11:45:13 --> [REQ_ID=c5f709dffe3d] [ROUTE] Controller=\App\Modules\User\Controllers\AlertsController Method=preview
DEBUG - 2026-03-09 11:45:13 --> [REQ_ID=c5f709dffe3d] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Preview/Alert/GRAB
DEBUG - 2026-03-09 11:45:13 --> [CSRF] token name=csrf_test_name hash=4bd36c49a5867ec552631b507f21651e
DEBUG - 2026-03-09 11:45:13 --> [REQ_ID=11c7bf85a912] [INIT] App\Modules\User\Controllers\AlertsController::GET
INFO - 2026-03-09 11:45:13 --> [REQ_ID=11c7bf85a912] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-09 11:45:13 --> [REQ_ID=11c7bf85a912] [METHOD_ENTRY] preview
DEBUG - 2026-03-09 11:45:13 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-09 11:45:13 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-09 11:45:13 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-09 11:45:13 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-09 11:45:13 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-09 11:45:13 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-09 11:45:13 --> MyMIInvestments: no session user detected; skipping personalized hydration.
DEBUG - 2026-03-09 11:45:13 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-09 11:45:13 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-09 11:45:13 --> MyMIMarketing: Pscrape library not installed; Google search scraping will use fallback.
DEBUG - 2026-03-09 11:45:13 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-09 11:45:13 --> MyMIAlerts: no authenticated user context detected.
DEBUG - 2026-03-09 11:45:13 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-09 11:45:13 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-09 11:45:13 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-09 11:45:13 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-09 11:45:13 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-09 11:45:13 --> [SERVICE] App\Services\BudgetService ::setUserId
INFO - 2026-03-09 11:45:13 --> [REQ_ID=11c7bf85a912] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-09 11:45:13 --> MyMIInvestments: no session user detected; skipping personalized hydration.
DEBUG - 2026-03-09 11:45:13 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-09 11:45:13 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-09 11:45:13 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-09 11:45:13 --> MyMIAlerts: no authenticated user context detected.
INFO - 2026-03-09 11:45:13 --> AlertsModel L404 - Alert updated successfully for ID 7405: Array
(
    [price] => 3.98
    [current_price] => 3.98
    [last_updated] => 2026-03-09 11:45:13
    [last_updated_time] => 2026-03-09 11:45:13
)

INFO - 2026-03-09 11:45:13 --> 🔄 Trying AlphaVantage for GRAB...
INFO - 2026-03-09 11:45:13 --> ✅ Alert snapshot inserted for GRAB with trade_id 7405
DEBUG - 2026-03-09 11:45:13 --> [REQ_ID=11c7bf85a912] [VIEW_RENDER] themes/public/previewAlert
INFO - 2026-03-09 11:45:13 --> [REQ_ID=11c7bf85a912] [MEMORY][commonData:start] 6291456
INFO - 2026-03-09 11:45:13 --> themesMemory usage: 6291456
DEBUG - 2026-03-09 11:45:13 --> [REQ_ID=c5f709dffe3d] [FILTER_AFTER]
DEBUG - 2026-03-09 11:45:13 --> [REQ_ID=c5f709dffe3d] [LIFECYCLE][END] status=200 duration_ms=493.13 memory_delta=2097152
INFO - 2026-03-09 11:45:13 --> [REQ_ID=11c7bf85a912] [PERF] Execution time=0.492832
DEBUG - 2026-03-09 11:45:13 --> [REQ_ID=c5f709dffe3d] [REQUEST][END]
INFO - 2026-03-09 11:45:13 --> [REQ_ID=c5f709dffe3d] [PERF] Execution time=0.504410
DEBUG - 2026-03-09 11:46:16 --> [REQ_ID=79a9857cccb4] [REQUEST][START] HEAD /
DEBUG - 2026-03-09 11:46:16 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-09 11:46:16 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-09 11:46:17 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-09 11:46:17 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-09 11:46:17 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-09 11:51:17 --> [REQ_ID=54fa5801322c] [REQUEST][START] HEAD /
DEBUG - 2026-03-09 11:51:17 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-09 11:51:17 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-09 11:51:17 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-09 11:51:17 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-09 11:51:17 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-09 11:56:17 --> [REQ_ID=ce46332a42a7] [REQUEST][START] HEAD /
DEBUG - 2026-03-09 11:56:17 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-09 11:56:17 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-09 11:56:17 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-09 11:56:17 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-09 11:56:17 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-09 12:00:01 --> [REQ_ID=9cd3510d2bfb] [REQUEST][START] GET /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-09 12:00:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-09 12:00:01 --> [REQ_ID=9cd3510d2bfb] [FILTER_BEFORE] /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-09 12:00:01 --> [REQ_ID=9cd3510d2bfb] [ROUTE] Controller=\App\Modules\Management\Controllers\ManagementAPIController Method=Run_CRON_Tasks
DEBUG - 2026-03-09 12:00:01 --> [REQ_ID=9cd3510d2bfb] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-09 12:00:01 --> [REQ_ID=9cd3510d2bfb] [REQUEST][END]
INFO - 2026-03-09 12:00:01 --> [REQ_ID=9cd3510d2bfb] [PERF] Execution time=0.064254
DEBUG - 2026-03-09 12:01:16 --> [REQ_ID=0353d2f7f168] [REQUEST][START] HEAD /
DEBUG - 2026-03-09 12:01:16 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-09 12:01:16 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-09 12:01:16 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-09 12:01:16 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-09 12:01:16 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-09 12:05:11 --> [REQ_ID=3b1d406d7057] [REQUEST][START] GET /index.php/How-It-Works/marketing
DEBUG - 2026-03-09 12:05:11 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-09 12:05:11 --> [REQ_ID=3b1d406d7057] [FILTER_BEFORE] /index.php/How-It-Works/marketing
DEBUG - 2026-03-09 12:05:11 --> [REQ_ID=3b1d406d7057] [ROUTE] Controller=\App\Modules\Blog\Controllers\HowItWorksController Method=show
DEBUG - 2026-03-09 12:05:11 --> [REQ_ID=3b1d406d7057] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/How-It-Works/marketing
DEBUG - 2026-03-09 12:05:11 --> [CSRF] token name=csrf_test_name hash=45fff3c882e5384a9a779d91fe25fa9b
DEBUG - 2026-03-09 12:05:11 --> [REQ_ID=c65ad9cc90bf] [INIT] App\Modules\Blog\Controllers\HowItWorksController::GET
INFO - 2026-03-09 12:05:11 --> [REQ_ID=c65ad9cc90bf] [MEMORY][controller-start] 6291456
DEBUG - 2026-03-09 12:05:11 --> [REQ_ID=c65ad9cc90bf] [METHOD_ENTRY] show
DEBUG - 2026-03-09 12:05:11 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-09 12:05:11 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-09 12:05:11 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-09 12:05:11 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-09 12:05:11 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-09 12:05:11 --> MyMICoin: guest context detected; skipping user-specific preload.
ERROR - 2026-03-09 12:05:12 --> HowItWorksController failure: marketing
CRITICAL - 2026-03-09 12:05:12 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: GET, Route: How-It-Works/marketing]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-09 12:05:12 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-09 12:05:12 --> [404] URI=https://www.mymiwallet.com/index.php/How-It-Works/marketing
WARNING - 2026-03-09 12:05:12 --> 404 route miss: https://www.mymiwallet.com/index.php/How-It-Works/marketing | referrer: none
ERROR - 2026-03-09 12:05:12 --> [ERROR_PAGE] event=error_404 status=404 message=Page not found.
INFO - 2026-03-09 12:05:12 --> [REQ_ID=c65ad9cc90bf] [PERF] Execution time=0.216971
DEBUG - 2026-03-09 12:05:12 --> [REQ_ID=bc91e9cccfbd] [REQUEST][START] GET /index.php/images/ci4-marketing.png
DEBUG - 2026-03-09 12:05:12 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-09 12:05:12 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: GET, Route: images/ci4-marketing.png]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-09 12:05:12 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-09 12:05:12 --> [404] URI=https://www.mymiwallet.com/index.php/images/ci4-marketing.png
WARNING - 2026-03-09 12:05:12 --> 404 route miss: https://www.mymiwallet.com/index.php/images/ci4-marketing.png | referrer: none
DEBUG - 2026-03-09 12:05:14 --> [REQ_ID=d9f3a45399e1] [REQUEST][START] GET /index.php/How-It-Works/earnings
DEBUG - 2026-03-09 12:05:14 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-09 12:05:14 --> [REQ_ID=d9f3a45399e1] [FILTER_BEFORE] /index.php/How-It-Works/earnings
DEBUG - 2026-03-09 12:05:14 --> [REQ_ID=d9f3a45399e1] [ROUTE] Controller=\App\Modules\Blog\Controllers\HowItWorksController Method=show
DEBUG - 2026-03-09 12:05:14 --> [REQ_ID=d9f3a45399e1] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/How-It-Works/earnings
DEBUG - 2026-03-09 12:05:14 --> [CSRF] token name=csrf_test_name hash=656ba645e24f7ebc5bab6ae1d1cd6a47
DEBUG - 2026-03-09 12:05:14 --> [REQ_ID=efe817cf7e11] [INIT] App\Modules\Blog\Controllers\HowItWorksController::GET
INFO - 2026-03-09 12:05:14 --> [REQ_ID=efe817cf7e11] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-09 12:05:14 --> [REQ_ID=efe817cf7e11] [METHOD_ENTRY] show
DEBUG - 2026-03-09 12:05:14 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-09 12:05:14 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-09 12:05:14 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-09 12:05:14 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-09 12:05:14 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-09 12:05:14 --> MyMICoin: guest context detected; skipping user-specific preload.
ERROR - 2026-03-09 12:05:14 --> HowItWorksController failure: earnings
CRITICAL - 2026-03-09 12:05:14 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: GET, Route: How-It-Works/earnings]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-09 12:05:14 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-09 12:05:14 --> [404] URI=https://www.mymiwallet.com/index.php/How-It-Works/earnings
WARNING - 2026-03-09 12:05:14 --> 404 route miss: https://www.mymiwallet.com/index.php/How-It-Works/earnings | referrer: none
ERROR - 2026-03-09 12:05:14 --> [ERROR_PAGE] event=error_404 status=404 message=Page not found.
INFO - 2026-03-09 12:05:14 --> [REQ_ID=efe817cf7e11] [PERF] Execution time=0.027204
DEBUG - 2026-03-09 12:05:14 --> [REQ_ID=3af21b1b6c90] [REQUEST][START] GET /index.php/images/ci4-earnings.png
DEBUG - 2026-03-09 12:05:14 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-09 12:05:14 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: GET, Route: images/ci4-earnings.png]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-09 12:05:14 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-09 12:05:14 --> [404] URI=https://www.mymiwallet.com/index.php/images/ci4-earnings.png
WARNING - 2026-03-09 12:05:14 --> 404 route miss: https://www.mymiwallet.com/index.php/images/ci4-earnings.png | referrer: none
DEBUG - 2026-03-09 12:05:15 --> [REQ_ID=f7e94e5c1ece] [REQUEST][START] GET /index.php/How-It-Works/investments
DEBUG - 2026-03-09 12:05:15 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-09 12:05:15 --> [REQ_ID=f7e94e5c1ece] [FILTER_BEFORE] /index.php/How-It-Works/investments
DEBUG - 2026-03-09 12:05:15 --> [REQ_ID=f7e94e5c1ece] [ROUTE] Controller=\App\Modules\Blog\Controllers\HowItWorksController Method=show
DEBUG - 2026-03-09 12:05:15 --> [REQ_ID=f7e94e5c1ece] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/How-It-Works/investments
DEBUG - 2026-03-09 12:05:15 --> [CSRF] token name=csrf_test_name hash=0ed40cebb03e71725a79698bfe374c16
DEBUG - 2026-03-09 12:05:15 --> [REQ_ID=f0ef1c7a25a1] [INIT] App\Modules\Blog\Controllers\HowItWorksController::GET
INFO - 2026-03-09 12:05:15 --> [REQ_ID=f0ef1c7a25a1] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-09 12:05:15 --> [REQ_ID=f0ef1c7a25a1] [METHOD_ENTRY] show
DEBUG - 2026-03-09 12:05:15 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-09 12:05:15 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-09 12:05:15 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-09 12:05:15 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-09 12:05:15 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-09 12:05:15 --> MyMICoin: guest context detected; skipping user-specific preload.
ERROR - 2026-03-09 12:05:15 --> HowItWorksController failure: investments
CRITICAL - 2026-03-09 12:05:15 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: GET, Route: How-It-Works/investments]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-09 12:05:15 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-09 12:05:15 --> [404] URI=https://www.mymiwallet.com/index.php/How-It-Works/investments
WARNING - 2026-03-09 12:05:15 --> 404 route miss: https://www.mymiwallet.com/index.php/How-It-Works/investments | referrer: none
ERROR - 2026-03-09 12:05:15 --> [ERROR_PAGE] event=error_404 status=404 message=Page not found.
INFO - 2026-03-09 12:05:15 --> [REQ_ID=f0ef1c7a25a1] [PERF] Execution time=0.042682
DEBUG - 2026-03-09 12:05:15 --> [REQ_ID=55ecf245f267] [REQUEST][START] GET /index.php/images/ci4-portfolio.png
DEBUG - 2026-03-09 12:05:15 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-09 12:05:15 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: GET, Route: images/ci4-portfolio.png]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-09 12:05:15 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-09 12:05:15 --> [404] URI=https://www.mymiwallet.com/index.php/images/ci4-portfolio.png
WARNING - 2026-03-09 12:05:15 --> 404 route miss: https://www.mymiwallet.com/index.php/images/ci4-portfolio.png | referrer: none
DEBUG - 2026-03-09 12:05:17 --> [REQ_ID=c0d1f52d8835] [REQUEST][START] GET /index.php/How-It-Works/overview
DEBUG - 2026-03-09 12:05:17 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-09 12:05:17 --> [REQ_ID=c0d1f52d8835] [FILTER_BEFORE] /index.php/How-It-Works/overview
DEBUG - 2026-03-09 12:05:17 --> [REQ_ID=c0d1f52d8835] [ROUTE] Controller=\App\Modules\Blog\Controllers\HowItWorksController Method=show
DEBUG - 2026-03-09 12:05:17 --> [REQ_ID=c0d1f52d8835] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/How-It-Works/overview
DEBUG - 2026-03-09 12:05:17 --> [CSRF] token name=csrf_test_name hash=c9a51ecc1fd6a88698325147c0535fe8
DEBUG - 2026-03-09 12:05:17 --> [REQ_ID=f88a855527d1] [INIT] App\Modules\Blog\Controllers\HowItWorksController::GET
INFO - 2026-03-09 12:05:17 --> [REQ_ID=f88a855527d1] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-09 12:05:17 --> [REQ_ID=f88a855527d1] [METHOD_ENTRY] show
DEBUG - 2026-03-09 12:05:17 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-09 12:05:17 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-09 12:05:17 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-09 12:05:17 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-09 12:05:17 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-09 12:05:17 --> MyMICoin: guest context detected; skipping user-specific preload.
ERROR - 2026-03-09 12:05:17 --> HowItWorksController failure: overview
CRITICAL - 2026-03-09 12:05:17 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: GET, Route: How-It-Works/overview]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-09 12:05:17 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-09 12:05:17 --> [404] URI=https://www.mymiwallet.com/index.php/How-It-Works/overview
WARNING - 2026-03-09 12:05:17 --> 404 route miss: https://www.mymiwallet.com/index.php/How-It-Works/overview | referrer: none
ERROR - 2026-03-09 12:05:17 --> [ERROR_PAGE] event=error_404 status=404 message=Page not found.
INFO - 2026-03-09 12:05:17 --> [REQ_ID=f88a855527d1] [PERF] Execution time=0.037731
DEBUG - 2026-03-09 12:05:19 --> [REQ_ID=f10d14b498c8] [REQUEST][START] GET /index.php/How-It-Works/investments
DEBUG - 2026-03-09 12:05:19 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-09 12:05:19 --> [REQ_ID=f10d14b498c8] [FILTER_BEFORE] /index.php/How-It-Works/investments
DEBUG - 2026-03-09 12:05:19 --> [REQ_ID=f10d14b498c8] [ROUTE] Controller=\App\Modules\Blog\Controllers\HowItWorksController Method=show
DEBUG - 2026-03-09 12:05:19 --> [REQ_ID=f10d14b498c8] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/How-It-Works/investments
DEBUG - 2026-03-09 12:05:19 --> [CSRF] token name=csrf_test_name hash=697886924e21dd6628909f089b0d0050
DEBUG - 2026-03-09 12:05:19 --> [REQ_ID=2818b1ef9bc8] [INIT] App\Modules\Blog\Controllers\HowItWorksController::GET
INFO - 2026-03-09 12:05:19 --> [REQ_ID=2818b1ef9bc8] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-09 12:05:19 --> [REQ_ID=2818b1ef9bc8] [METHOD_ENTRY] show
DEBUG - 2026-03-09 12:05:19 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-09 12:05:19 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-09 12:05:19 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-09 12:05:19 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-09 12:05:19 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-09 12:05:19 --> MyMICoin: guest context detected; skipping user-specific preload.
ERROR - 2026-03-09 12:05:19 --> HowItWorksController failure: investments
CRITICAL - 2026-03-09 12:05:19 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: GET, Route: How-It-Works/investments]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-09 12:05:19 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-09 12:05:19 --> [404] URI=https://www.mymiwallet.com/index.php/How-It-Works/investments
WARNING - 2026-03-09 12:05:19 --> 404 route miss: https://www.mymiwallet.com/index.php/How-It-Works/investments | referrer: none
ERROR - 2026-03-09 12:05:19 --> [ERROR_PAGE] event=error_404 status=404 message=Page not found.
INFO - 2026-03-09 12:05:19 --> [REQ_ID=2818b1ef9bc8] [PERF] Execution time=0.029824
DEBUG - 2026-03-09 12:05:20 --> [REQ_ID=e9bb69134c63] [REQUEST][START] GET /index.php/images/ci4-portfolio.png
DEBUG - 2026-03-09 12:05:20 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-09 12:05:20 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: GET, Route: images/ci4-portfolio.png]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-09 12:05:20 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-09 12:05:20 --> [404] URI=https://www.mymiwallet.com/index.php/images/ci4-portfolio.png
WARNING - 2026-03-09 12:05:20 --> 404 route miss: https://www.mymiwallet.com/index.php/images/ci4-portfolio.png | referrer: none
DEBUG - 2026-03-09 12:05:47 --> [REQ_ID=3f778b94f544] [REQUEST][START] GET /index.php/Management/Marketing/Ideas
DEBUG - 2026-03-09 12:05:47 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-09 12:05:47 --> [REQ_ID=3f778b94f544] [FILTER_BEFORE] /index.php/Management/Marketing/Ideas
DEBUG - 2026-03-09 12:05:47 --> [REQ_ID=3f778b94f544] [ROUTE] Controller=\App\Modules\Management\Controllers\MarketingAdminController Method=ideas
DEBUG - 2026-03-09 12:05:47 --> [REQ_ID=3f778b94f544] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Management/Marketing/Ideas
DEBUG - 2026-03-09 12:05:47 --> [CSRF] token name=csrf_test_name hash=09a2b6d48e0663adde03e30cf269e9d1
DEBUG - 2026-03-09 12:05:47 --> [REQ_ID=3f778b94f544] [REQUEST][END]
INFO - 2026-03-09 12:05:47 --> [REQ_ID=3f778b94f544] [PERF] Execution time=0.021676
DEBUG - 2026-03-09 12:05:49 --> [REQ_ID=613f53022e6a] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-09 12:05:49 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-09 12:05:49 --> [REQ_ID=613f53022e6a] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-09 12:05:49 --> [REQ_ID=613f53022e6a] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-09 12:05:49 --> [REQ_ID=613f53022e6a] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-09 12:05:49 --> [CSRF] token name=csrf_test_name hash=65879e19a6da530602d4f30511c78216
DEBUG - 2026-03-09 12:05:49 --> [REQ_ID=59e4afe0614e] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-09 12:05:49 --> [REQ_ID=59e4afe0614e] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-09 12:05:49 --> [REQ_ID=613f53022e6a] [FILTER_AFTER]
DEBUG - 2026-03-09 12:05:49 --> [REQ_ID=613f53022e6a] [LIFECYCLE][END] status=200 duration_ms=664.06 memory_delta=0
INFO - 2026-03-09 12:05:49 --> [REQ_ID=59e4afe0614e] [PERF] Execution time=0.662703
DEBUG - 2026-03-09 12:05:49 --> [REQ_ID=613f53022e6a] [REQUEST][END]
INFO - 2026-03-09 12:05:49 --> [REQ_ID=613f53022e6a] [PERF] Execution time=0.694021
DEBUG - 2026-03-09 12:06:16 --> [REQ_ID=c378bf353e41] [REQUEST][START] HEAD /
DEBUG - 2026-03-09 12:06:16 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-09 12:06:16 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-09 12:06:16 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-09 12:06:16 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-09 12:06:16 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-09 12:11:17 --> [REQ_ID=e3bb1f4959ce] [REQUEST][START] HEAD /
DEBUG - 2026-03-09 12:11:17 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-09 12:11:17 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-09 12:11:17 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-09 12:11:17 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-09 12:11:17 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-09 12:15:02 --> [REQ_ID=3384a3262450] [REQUEST][START] GET /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-09 12:15:02 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-09 12:15:02 --> [REQ_ID=3384a3262450] [FILTER_BEFORE] /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-09 12:15:02 --> [REQ_ID=3384a3262450] [ROUTE] Controller=\App\Modules\APIs\Controllers\AlertsAPIController Method=fetchEmailAlerts
DEBUG - 2026-03-09 12:15:02 --> [REQ_ID=3384a3262450] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-09 12:15:02 --> [REQ_ID=3384a3262450] [REQUEST][END]
INFO - 2026-03-09 12:15:02 --> [REQ_ID=3384a3262450] [PERF] Execution time=0.045808
DEBUG - 2026-03-09 12:16:17 --> [REQ_ID=254a30338d23] [REQUEST][START] HEAD /
DEBUG - 2026-03-09 12:16:17 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-09 12:16:17 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-09 12:16:17 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-09 12:16:17 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-09 12:16:17 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-09 12:21:17 --> [REQ_ID=8414e77abd60] [REQUEST][START] HEAD /
DEBUG - 2026-03-09 12:21:17 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-09 12:21:17 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-09 12:21:20 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-09 12:21:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-09 12:21:23 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-09 12:26:17 --> [REQ_ID=b68114235fe3] [REQUEST][START] HEAD /
DEBUG - 2026-03-09 12:26:17 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-09 12:26:17 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-09 12:26:17 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-09 12:26:17 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-09 12:26:17 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-09 12:28:57 --> [REQ_ID=1703144d4362] [REQUEST][START] GET /index.php/Premium-Features/Advanced-Trade-Tracker
DEBUG - 2026-03-09 12:28:57 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
INFO - 2026-03-09 12:28:57 --> REDIRECTED ROUTE at https://www.mymiwallet.com/Investments/Trade-Tracker
DEBUG - 2026-03-09 12:28:57 --> [REQ_ID=1703144d4362] [REQUEST][END]
INFO - 2026-03-09 12:28:57 --> [REQ_ID=1703144d4362] [PERF] Execution time=0.038415
DEBUG - 2026-03-09 12:29:00 --> [REQ_ID=8019e61c994f] [REQUEST][START] GET /index.php/How-It-Works/MyMI-Gold
DEBUG - 2026-03-09 12:29:00 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-09 12:29:00 --> [REQ_ID=8019e61c994f] [FILTER_BEFORE] /index.php/How-It-Works/MyMI-Gold
DEBUG - 2026-03-09 12:29:00 --> [REQ_ID=8019e61c994f] [ROUTE] Controller=\App\Modules\Blog\Controllers\HowItWorksController Method=MyMIGold
DEBUG - 2026-03-09 12:29:00 --> [REQ_ID=8019e61c994f] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/How-It-Works/MyMI-Gold
DEBUG - 2026-03-09 12:29:00 --> [CSRF] token name=csrf_test_name hash=3b735db8885a4c4c41c0379b15df1969
DEBUG - 2026-03-09 12:29:00 --> [REQ_ID=a9ea77dcb05e] [INIT] App\Modules\Blog\Controllers\HowItWorksController::GET
INFO - 2026-03-09 12:29:00 --> [REQ_ID=a9ea77dcb05e] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-09 12:29:00 --> [REQ_ID=a9ea77dcb05e] [METHOD_ENTRY] MyMIGold
DEBUG - 2026-03-09 12:29:00 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-09 12:29:00 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-09 12:29:00 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-09 12:29:00 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-09 12:29:00 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-09 12:29:00 --> MyMICoin: guest context detected; skipping user-specific preload.
INFO - 2026-03-09 12:29:00 --> [REQ_ID=a9ea77dcb05e] [MEMORY][commonData:start] 6291456
INFO - 2026-03-09 12:29:01 --> themesMemory usage: 8388608
DEBUG - 2026-03-09 12:29:01 --> [MetaService] slug=how-it-works/mymi-gold pageName= cacheHit= path=DB
DEBUG - 2026-03-09 12:29:01 --> [REQ_ID=8019e61c994f] [FILTER_AFTER]
DEBUG - 2026-03-09 12:29:01 --> [REQ_ID=8019e61c994f] [LIFECYCLE][END] status=200 duration_ms=664.48 memory_delta=4194304
INFO - 2026-03-09 12:29:01 --> [REQ_ID=a9ea77dcb05e] [PERF] Execution time=0.662279
DEBUG - 2026-03-09 12:29:01 --> [REQ_ID=8019e61c994f] [REQUEST][END]
INFO - 2026-03-09 12:29:01 --> [REQ_ID=8019e61c994f] [PERF] Execution time=0.680184
DEBUG - 2026-03-09 12:31:17 --> [REQ_ID=6c7ac40498a9] [REQUEST][START] HEAD /
DEBUG - 2026-03-09 12:31:17 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-09 12:31:17 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-09 12:31:17 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-09 12:31:17 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-09 12:31:17 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-09 12:33:34 --> [REQ_ID=17484987246b] [REQUEST][START] GET /index.php/Profile/
DEBUG - 2026-03-09 12:33:34 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-09 12:33:34 --> [REQ_ID=17484987246b] [FILTER_BEFORE] /index.php/Profile/
DEBUG - 2026-03-09 12:33:34 --> [REQ_ID=17484987246b] [ROUTE] Controller=\App\Controllers\App\Modules\User\Controllers\DashboardController Method=profile
DEBUG - 2026-03-09 12:33:34 --> [REQ_ID=17484987246b] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Profile/
DEBUG - 2026-03-09 12:33:34 --> [CSRF] token name=csrf_test_name hash=dee9258adb04a66a95046713f8dbd49f
DEBUG - 2026-03-09 12:33:34 --> [REQ_ID=17484987246b] [REQUEST][END]
INFO - 2026-03-09 12:33:34 --> [REQ_ID=17484987246b] [PERF] Execution time=0.050485
DEBUG - 2026-03-09 12:33:34 --> [REQ_ID=9157a76a780f] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-09 12:33:34 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-09 12:33:34 --> [REQ_ID=9157a76a780f] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-09 12:33:34 --> [REQ_ID=9157a76a780f] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-09 12:33:34 --> [REQ_ID=9157a76a780f] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-09 12:33:34 --> [CSRF] token name=csrf_test_name hash=f07f43703585cbf297587785dadd20b1
DEBUG - 2026-03-09 12:33:34 --> [REQ_ID=2bb10dbcf30f] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-09 12:33:34 --> [REQ_ID=2bb10dbcf30f] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-09 12:33:34 --> [REQ_ID=9157a76a780f] [FILTER_AFTER]
DEBUG - 2026-03-09 12:33:34 --> [REQ_ID=9157a76a780f] [LIFECYCLE][END] status=200 duration_ms=278.68 memory_delta=0
INFO - 2026-03-09 12:33:34 --> [REQ_ID=2bb10dbcf30f] [PERF] Execution time=0.278476
DEBUG - 2026-03-09 12:33:34 --> [REQ_ID=9157a76a780f] [REQUEST][END]
INFO - 2026-03-09 12:33:34 --> [REQ_ID=9157a76a780f] [PERF] Execution time=0.293507
DEBUG - 2026-03-09 12:35:48 --> [REQ_ID=eea034858b7f] [REQUEST][START] GET /
DEBUG - 2026-03-09 12:35:48 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-09 12:35:48 --> [REQ_ID=eea034858b7f] [FILTER_BEFORE] /
DEBUG - 2026-03-09 12:35:48 --> [REQ_ID=eea034858b7f] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-09 12:35:48 --> [REQ_ID=eea034858b7f] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-09 12:35:48 --> [CSRF] token name=csrf_test_name hash=33da1303734a8ae365cfe441836eaef2
DEBUG - 2026-03-09 12:35:48 --> [REQ_ID=bbd4374c9eed] [INIT] App\Controllers\Home::GET
INFO - 2026-03-09 12:35:48 --> [REQ_ID=bbd4374c9eed] [MEMORY][controller-start] 6291456
INFO - 2026-03-09 12:35:48 --> [REQ_ID=bbd4374c9eed] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-09 12:35:48 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-09 12:35:49 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-03-09 12:35:49 --> [REQ_ID=bbd4374c9eed] [VIEW_RENDER] themes/public/home
INFO - 2026-03-09 12:35:49 --> [REQ_ID=bbd4374c9eed] [MEMORY][commonData:start] 10485760
INFO - 2026-03-09 12:35:49 --> themesMemory usage: 10485760
DEBUG - 2026-03-09 12:35:49 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-09 12:35:49 --> [REQ_ID=eea034858b7f] [FILTER_AFTER]
DEBUG - 2026-03-09 12:35:49 --> [REQ_ID=eea034858b7f] [LIFECYCLE][END] status=200 duration_ms=626.29 memory_delta=4194304
INFO - 2026-03-09 12:35:49 --> [REQ_ID=bbd4374c9eed] [PERF] Execution time=0.624362
DEBUG - 2026-03-09 12:35:49 --> [REQ_ID=eea034858b7f] [REQUEST][END]
INFO - 2026-03-09 12:35:49 --> [REQ_ID=eea034858b7f] [PERF] Execution time=0.669413
DEBUG - 2026-03-09 12:36:16 --> [REQ_ID=2a5aa7717cc4] [REQUEST][START] HEAD /
DEBUG - 2026-03-09 12:36:16 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-09 12:36:16 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-09 12:36:17 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-09 12:36:17 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-09 12:36:17 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-09 12:39:10 --> [REQ_ID=f2392f252816] [REQUEST][START] GET /
DEBUG - 2026-03-09 12:39:10 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-09 12:39:10 --> [REQ_ID=f2392f252816] [FILTER_BEFORE] /
DEBUG - 2026-03-09 12:39:10 --> [REQ_ID=f2392f252816] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-09 12:39:10 --> [REQ_ID=f2392f252816] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-09 12:39:10 --> [CSRF] token name=csrf_test_name hash=f15f51aff90a3b9cc8391b15e77280ef
DEBUG - 2026-03-09 12:39:10 --> [REQ_ID=0b6551f5e8d7] [INIT] App\Controllers\Home::GET
INFO - 2026-03-09 12:39:10 --> [REQ_ID=0b6551f5e8d7] [MEMORY][controller-start] 6291456
INFO - 2026-03-09 12:39:10 --> [REQ_ID=0b6551f5e8d7] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-09 12:39:10 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-09 12:39:11 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
DEBUG - 2026-03-09 12:39:11 --> [REQ_ID=0b6551f5e8d7] [VIEW_RENDER] themes/public/home
INFO - 2026-03-09 12:39:11 --> [REQ_ID=0b6551f5e8d7] [MEMORY][commonData:start] 10485760
INFO - 2026-03-09 12:39:11 --> themesMemory usage: 10485760
DEBUG - 2026-03-09 12:39:11 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-09 12:39:11 --> [REQ_ID=f2392f252816] [FILTER_AFTER]
DEBUG - 2026-03-09 12:39:11 --> [REQ_ID=f2392f252816] [LIFECYCLE][END] status=200 duration_ms=712.59 memory_delta=4194304
INFO - 2026-03-09 12:39:11 --> [REQ_ID=0b6551f5e8d7] [PERF] Execution time=0.710532
DEBUG - 2026-03-09 12:39:11 --> [REQ_ID=f2392f252816] [REQUEST][END]
INFO - 2026-03-09 12:39:11 --> [REQ_ID=f2392f252816] [PERF] Execution time=0.752026
DEBUG - 2026-03-09 12:41:16 --> [REQ_ID=e0039bc8dcfa] [REQUEST][START] HEAD /
DEBUG - 2026-03-09 12:41:16 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-09 12:41:17 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-09 12:41:17 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-09 12:41:17 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-09 12:41:17 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-09 12:44:45 --> [REQ_ID=64cd58b02d3d] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-09 12:44:45 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-09 12:44:45 --> [REQ_ID=64cd58b02d3d] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-09 12:44:45 --> [REQ_ID=64cd58b02d3d] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-09 12:44:45 --> [REQ_ID=64cd58b02d3d] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-09 12:44:45 --> [CSRF] token name=csrf_test_name hash=29e24b5724cb97f801ed2e0affaaba8d
DEBUG - 2026-03-09 12:44:45 --> [REQ_ID=a2a6cfffb4ff] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-09 12:44:45 --> [REQ_ID=a2a6cfffb4ff] [MEMORY][controller-start] 6291456
DEBUG - 2026-03-09 12:44:45 --> [REQ_ID=64cd58b02d3d] [FILTER_AFTER]
DEBUG - 2026-03-09 12:44:45 --> [REQ_ID=64cd58b02d3d] [LIFECYCLE][END] status=200 duration_ms=73.94 memory_delta=0
INFO - 2026-03-09 12:44:45 --> [REQ_ID=a2a6cfffb4ff] [PERF] Execution time=0.071844
DEBUG - 2026-03-09 12:44:45 --> [REQ_ID=64cd58b02d3d] [REQUEST][END]
INFO - 2026-03-09 12:44:45 --> [REQ_ID=64cd58b02d3d] [PERF] Execution time=0.115033
DEBUG - 2026-03-09 12:44:50 --> [REQ_ID=10f27d620f72] [REQUEST][START] GET /index.php/Ops
DEBUG - 2026-03-09 12:44:50 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-09 12:44:50 --> [REQ_ID=10f27d620f72] [FILTER_BEFORE] /index.php/Ops
DEBUG - 2026-03-09 12:44:50 --> [REQ_ID=10f27d620f72] [ROUTE] Controller=\App\Modules\Ops\Controllers\OpsDashboardController Method=index
DEBUG - 2026-03-09 12:44:50 --> [REQ_ID=10f27d620f72] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Ops
DEBUG - 2026-03-09 12:44:50 --> [CSRF] token name=csrf_test_name hash=0baef3b126784f69783ec9a2565abfc3
DEBUG - 2026-03-09 12:44:50 --> [REQ_ID=10f27d620f72] [REQUEST][END]
INFO - 2026-03-09 12:44:50 --> [REQ_ID=10f27d620f72] [PERF] Execution time=0.014032
DEBUG - 2026-03-09 12:44:50 --> [REQ_ID=bfe08012bdce] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-09 12:44:50 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-09 12:44:50 --> [REQ_ID=bfe08012bdce] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-09 12:44:50 --> [REQ_ID=bfe08012bdce] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-09 12:44:50 --> [REQ_ID=bfe08012bdce] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-09 12:44:50 --> [CSRF] token name=csrf_test_name hash=868464e9fd750bf41bd3257536a10d35
DEBUG - 2026-03-09 12:44:50 --> [REQ_ID=c4005a4a0135] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-09 12:44:50 --> [REQ_ID=c4005a4a0135] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-09 12:44:50 --> [REQ_ID=bfe08012bdce] [FILTER_AFTER]
DEBUG - 2026-03-09 12:44:50 --> [REQ_ID=bfe08012bdce] [LIFECYCLE][END] status=200 duration_ms=16.88 memory_delta=0
INFO - 2026-03-09 12:44:50 --> [REQ_ID=c4005a4a0135] [PERF] Execution time=0.016764
DEBUG - 2026-03-09 12:44:50 --> [REQ_ID=bfe08012bdce] [REQUEST][END]
INFO - 2026-03-09 12:44:50 --> [REQ_ID=bfe08012bdce] [PERF] Execution time=0.026232
DEBUG - 2026-03-09 12:46:16 --> [REQ_ID=68e3da756cdd] [REQUEST][START] HEAD /
DEBUG - 2026-03-09 12:46:16 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-09 12:46:17 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-09 12:46:17 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-09 12:46:17 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-09 12:46:17 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-09 12:51:16 --> [REQ_ID=2b7f018be676] [REQUEST][START] HEAD /
DEBUG - 2026-03-09 12:51:17 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-09 12:51:17 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-09 12:51:17 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-09 12:51:17 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-09 12:51:17 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-09 12:51:56 --> [REQ_ID=5082e89ae109] [REQUEST][START] GET /
DEBUG - 2026-03-09 12:51:56 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-09 12:51:56 --> [REQ_ID=5082e89ae109] [FILTER_BEFORE] /
DEBUG - 2026-03-09 12:51:56 --> [REQ_ID=5082e89ae109] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-09 12:51:56 --> [REQ_ID=5082e89ae109] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-09 12:51:56 --> [CSRF] token name=csrf_test_name hash=c1ae18af985e1c57650db7667a3b583f
DEBUG - 2026-03-09 12:51:56 --> [REQ_ID=2b5dd0e98a0d] [INIT] App\Controllers\Home::GET
INFO - 2026-03-09 12:51:56 --> [REQ_ID=2b5dd0e98a0d] [MEMORY][controller-start] 4194304
INFO - 2026-03-09 12:51:57 --> [REQ_ID=2b5dd0e98a0d] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-09 12:51:57 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-09 12:51:57 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-03-09 12:51:57 --> [REQ_ID=2b5dd0e98a0d] [VIEW_RENDER] themes/public/home
INFO - 2026-03-09 12:51:57 --> [REQ_ID=2b5dd0e98a0d] [MEMORY][commonData:start] 8388608
INFO - 2026-03-09 12:51:57 --> themesMemory usage: 8388608
DEBUG - 2026-03-09 12:51:57 --> [MetaService] slug= pageName=Home cacheHit= path=DB
DEBUG - 2026-03-09 12:51:57 --> [REQ_ID=5082e89ae109] [FILTER_AFTER]
DEBUG - 2026-03-09 12:51:57 --> [REQ_ID=5082e89ae109] [LIFECYCLE][END] status=200 duration_ms=586.73 memory_delta=4194304
INFO - 2026-03-09 12:51:57 --> [REQ_ID=2b5dd0e98a0d] [PERF] Execution time=0.584800
DEBUG - 2026-03-09 12:51:57 --> [REQ_ID=5082e89ae109] [REQUEST][END]
INFO - 2026-03-09 12:51:57 --> [REQ_ID=5082e89ae109] [PERF] Execution time=0.605395
DEBUG - 2026-03-09 12:56:16 --> [REQ_ID=e93f2f62ee6c] [REQUEST][START] HEAD /
DEBUG - 2026-03-09 12:56:16 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-09 12:56:17 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-09 12:56:17 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-09 12:56:17 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-09 12:56:17 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-09 12:57:46 --> [REQ_ID=8b5ee8155a61] [REQUEST][START] GET /
DEBUG - 2026-03-09 12:57:46 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-09 12:57:46 --> [REQ_ID=8b5ee8155a61] [FILTER_BEFORE] /
DEBUG - 2026-03-09 12:57:46 --> [REQ_ID=8b5ee8155a61] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-09 12:57:46 --> [REQ_ID=8b5ee8155a61] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-09 12:57:46 --> [CSRF] token name=csrf_test_name hash=0373a7d1812d5461df8e66d3b33719c8
DEBUG - 2026-03-09 12:57:46 --> [REQ_ID=5db447c3fc19] [INIT] App\Controllers\Home::GET
INFO - 2026-03-09 12:57:46 --> [REQ_ID=5db447c3fc19] [MEMORY][controller-start] 4194304
INFO - 2026-03-09 12:57:46 --> [REQ_ID=5db447c3fc19] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-09 12:57:46 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-09 12:57:46 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
DEBUG - 2026-03-09 12:57:46 --> [REQ_ID=5db447c3fc19] [VIEW_RENDER] themes/public/home
INFO - 2026-03-09 12:57:46 --> [REQ_ID=5db447c3fc19] [MEMORY][commonData:start] 8388608
INFO - 2026-03-09 12:57:46 --> themesMemory usage: 8388608
DEBUG - 2026-03-09 12:57:46 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-09 12:57:46 --> [REQ_ID=8b5ee8155a61] [FILTER_AFTER]
DEBUG - 2026-03-09 12:57:46 --> [REQ_ID=8b5ee8155a61] [LIFECYCLE][END] status=200 duration_ms=633.74 memory_delta=4194304
INFO - 2026-03-09 12:57:46 --> [REQ_ID=5db447c3fc19] [PERF] Execution time=0.631746
DEBUG - 2026-03-09 12:57:46 --> [REQ_ID=8b5ee8155a61] [REQUEST][END]
INFO - 2026-03-09 12:57:46 --> [REQ_ID=8b5ee8155a61] [PERF] Execution time=0.652603
DEBUG - 2026-03-09 13:00:01 --> [REQ_ID=82879cb251f2] [REQUEST][START] GET /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-09 13:00:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-09 13:00:01 --> [REQ_ID=82879cb251f2] [FILTER_BEFORE] /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-09 13:00:01 --> [REQ_ID=82879cb251f2] [ROUTE] Controller=\App\Modules\Management\Controllers\ManagementAPIController Method=Run_CRON_Tasks
DEBUG - 2026-03-09 13:00:01 --> [REQ_ID=82879cb251f2] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-09 13:00:01 --> [REQ_ID=82879cb251f2] [REQUEST][END]
INFO - 2026-03-09 13:00:01 --> [REQ_ID=82879cb251f2] [PERF] Execution time=0.049850
DEBUG - 2026-03-09 13:00:07 --> [REQ_ID=2c3491974de4] [REQUEST][START] GET /index.php/
DEBUG - 2026-03-09 13:00:07 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-09 13:00:07 --> [REQ_ID=2c3491974de4] [FILTER_BEFORE] /index.php/
DEBUG - 2026-03-09 13:00:07 --> [REQ_ID=2c3491974de4] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-09 13:00:07 --> [REQ_ID=2c3491974de4] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-09 13:00:07 --> [CSRF] token name=csrf_test_name hash=4cd16a72c2570a6f6f2e00e7176e4337
DEBUG - 2026-03-09 13:00:07 --> [REQ_ID=daa481045f5d] [INIT] App\Controllers\Home::GET
INFO - 2026-03-09 13:00:07 --> [REQ_ID=daa481045f5d] [MEMORY][controller-start] 4194304
INFO - 2026-03-09 13:00:08 --> [REQ_ID=daa481045f5d] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-09 13:00:08 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-09 13:00:08 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
DEBUG - 2026-03-09 13:00:08 --> [REQ_ID=daa481045f5d] [VIEW_RENDER] themes/public/home
INFO - 2026-03-09 13:00:08 --> [REQ_ID=daa481045f5d] [MEMORY][commonData:start] 8388608
INFO - 2026-03-09 13:00:08 --> themesMemory usage: 8388608
DEBUG - 2026-03-09 13:00:08 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-09 13:00:08 --> [REQ_ID=2c3491974de4] [FILTER_AFTER]
DEBUG - 2026-03-09 13:00:08 --> [REQ_ID=2c3491974de4] [LIFECYCLE][END] status=200 duration_ms=717.07 memory_delta=4194304
INFO - 2026-03-09 13:00:08 --> [REQ_ID=daa481045f5d] [PERF] Execution time=0.715601
DEBUG - 2026-03-09 13:00:08 --> [REQ_ID=2c3491974de4] [REQUEST][END]
INFO - 2026-03-09 13:00:08 --> [REQ_ID=2c3491974de4] [PERF] Execution time=0.731102
DEBUG - 2026-03-09 13:01:16 --> [REQ_ID=0ceeabc361d2] [REQUEST][START] HEAD /
DEBUG - 2026-03-09 13:01:16 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-09 13:01:16 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-09 13:01:17 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-09 13:01:17 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-09 13:01:17 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-09 13:06:16 --> [REQ_ID=dc62fdb18067] [REQUEST][START] HEAD /
DEBUG - 2026-03-09 13:06:16 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-09 13:06:17 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-09 13:06:17 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-09 13:06:17 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-09 13:06:17 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-09 13:06:52 --> [REQ_ID=3534030ccbd7] [REQUEST][START] GET /index.php/Premium-Features/Wallets
DEBUG - 2026-03-09 13:06:52 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
INFO - 2026-03-09 13:06:52 --> REDIRECTED ROUTE at https://www.mymiwallet.com/Wallets/Manager
DEBUG - 2026-03-09 13:06:52 --> [REQ_ID=3534030ccbd7] [REQUEST][END]
INFO - 2026-03-09 13:06:52 --> [REQ_ID=3534030ccbd7] [PERF] Execution time=0.016773
DEBUG - 2026-03-09 13:11:16 --> [REQ_ID=b630fcc24d7b] [REQUEST][START] HEAD /
DEBUG - 2026-03-09 13:11:16 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-09 13:11:16 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-09 13:11:17 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-09 13:11:17 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-09 13:11:17 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-09 13:14:27 --> [REQ_ID=997b17f0936e] [REQUEST][START] GET /
DEBUG - 2026-03-09 13:14:27 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-09 13:14:27 --> [REQ_ID=997b17f0936e] [FILTER_BEFORE] /
DEBUG - 2026-03-09 13:14:27 --> [REQ_ID=997b17f0936e] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-09 13:14:27 --> [REQ_ID=997b17f0936e] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-09 13:14:27 --> [CSRF] token name=csrf_test_name hash=3c1c84ea6af7f05a608a2c655e2a86ea
DEBUG - 2026-03-09 13:14:27 --> [REQ_ID=548041fc268c] [INIT] App\Controllers\Home::GET
INFO - 2026-03-09 13:14:27 --> [REQ_ID=548041fc268c] [MEMORY][controller-start] 6291456
INFO - 2026-03-09 13:14:27 --> [REQ_ID=548041fc268c] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-09 13:14:27 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-09 13:14:28 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-03-09 13:14:28 --> [REQ_ID=548041fc268c] [VIEW_RENDER] themes/public/home
INFO - 2026-03-09 13:14:28 --> [REQ_ID=548041fc268c] [MEMORY][commonData:start] 10485760
INFO - 2026-03-09 13:14:28 --> themesMemory usage: 10485760
DEBUG - 2026-03-09 13:14:28 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-09 13:14:28 --> [REQ_ID=997b17f0936e] [FILTER_AFTER]
DEBUG - 2026-03-09 13:14:28 --> [REQ_ID=997b17f0936e] [LIFECYCLE][END] status=200 duration_ms=970.18 memory_delta=4194304
INFO - 2026-03-09 13:14:28 --> [REQ_ID=548041fc268c] [PERF] Execution time=0.968220
DEBUG - 2026-03-09 13:14:28 --> [REQ_ID=997b17f0936e] [REQUEST][END]
INFO - 2026-03-09 13:14:28 --> [REQ_ID=997b17f0936e] [PERF] Execution time=1.008478
DEBUG - 2026-03-09 13:15:02 --> [REQ_ID=d3924ffcf52a] [REQUEST][START] GET /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-09 13:15:02 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-09 13:15:02 --> [REQ_ID=d3924ffcf52a] [FILTER_BEFORE] /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-09 13:15:02 --> [REQ_ID=d3924ffcf52a] [ROUTE] Controller=\App\Modules\APIs\Controllers\AlertsAPIController Method=fetchEmailAlerts
DEBUG - 2026-03-09 13:15:02 --> [REQ_ID=d3924ffcf52a] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-09 13:15:02 --> [REQ_ID=d3924ffcf52a] [REQUEST][END]
INFO - 2026-03-09 13:15:02 --> [REQ_ID=d3924ffcf52a] [PERF] Execution time=0.018006
DEBUG - 2026-03-09 13:16:16 --> [REQ_ID=df947c8a286f] [REQUEST][START] HEAD /
DEBUG - 2026-03-09 13:16:16 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-09 13:16:16 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-09 13:16:17 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-09 13:16:17 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-09 13:16:17 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-09 13:20:34 --> [REQ_ID=afa1d69ad6a2] [REQUEST][START] GET /index.php/Account/Connected-Accounts
DEBUG - 2026-03-09 13:20:34 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-09 13:20:34 --> [REQ_ID=afa1d69ad6a2] [FILTER_BEFORE] /index.php/Account/Connected-Accounts
DEBUG - 2026-03-09 13:20:34 --> [REQ_ID=afa1d69ad6a2] [ROUTE] Controller=\App\Modules\User\Controllers\DashboardController Method=connectedAccounts
DEBUG - 2026-03-09 13:20:34 --> [REQ_ID=afa1d69ad6a2] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Account/Connected-Accounts
DEBUG - 2026-03-09 13:20:34 --> [CSRF] token name=csrf_test_name hash=19c735ad5eea01d5bf8980450013b784
DEBUG - 2026-03-09 13:20:34 --> [REQ_ID=afa1d69ad6a2] [REQUEST][END]
INFO - 2026-03-09 13:20:34 --> [REQ_ID=afa1d69ad6a2] [PERF] Execution time=0.058104
DEBUG - 2026-03-09 13:20:34 --> [REQ_ID=b61a8a95fce4] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-09 13:20:34 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-09 13:20:34 --> [REQ_ID=b61a8a95fce4] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-09 13:20:34 --> [REQ_ID=b61a8a95fce4] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-09 13:20:34 --> [REQ_ID=b61a8a95fce4] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-09 13:20:34 --> [CSRF] token name=csrf_test_name hash=09fa009159708f6a1c5e15ef13ee077c
DEBUG - 2026-03-09 13:20:34 --> [REQ_ID=52bf8b0e19a9] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-09 13:20:34 --> [REQ_ID=52bf8b0e19a9] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-09 13:20:34 --> [REQ_ID=b61a8a95fce4] [FILTER_AFTER]
DEBUG - 2026-03-09 13:20:34 --> [REQ_ID=b61a8a95fce4] [LIFECYCLE][END] status=200 duration_ms=244.07 memory_delta=0
INFO - 2026-03-09 13:20:34 --> [REQ_ID=52bf8b0e19a9] [PERF] Execution time=0.243872
DEBUG - 2026-03-09 13:20:34 --> [REQ_ID=b61a8a95fce4] [REQUEST][END]
INFO - 2026-03-09 13:20:34 --> [REQ_ID=b61a8a95fce4] [PERF] Execution time=0.255678
DEBUG - 2026-03-09 13:21:16 --> [REQ_ID=130d8f3cc09b] [REQUEST][START] HEAD /
DEBUG - 2026-03-09 13:21:16 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-09 13:21:16 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-09 13:21:17 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-09 13:21:17 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-09 13:21:17 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-09 13:26:16 --> [REQ_ID=d425983fdf1b] [REQUEST][START] HEAD /
DEBUG - 2026-03-09 13:26:16 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-09 13:26:16 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-09 13:26:16 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-09 13:26:16 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-09 13:26:16 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-09 13:31:16 --> [REQ_ID=5a6649d91946] [REQUEST][START] HEAD /
DEBUG - 2026-03-09 13:31:16 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-09 13:31:16 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-09 13:31:17 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-09 13:31:17 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-09 13:31:17 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-09 13:32:14 --> [REQ_ID=bd6d4ad005e4] [REQUEST][START] GET /index.php/Support
DEBUG - 2026-03-09 13:32:14 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-09 13:32:14 --> [REQ_ID=bd6d4ad005e4] [REQUEST][END]
INFO - 2026-03-09 13:32:14 --> [REQ_ID=bd6d4ad005e4] [PERF] Execution time=0.021293
DEBUG - 2026-03-09 13:33:16 --> [REQ_ID=fc1c644d8da6] [REQUEST][START] GET /index.php/logout
DEBUG - 2026-03-09 13:33:16 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-09 13:33:16 --> [REQ_ID=fc1c644d8da6] [REQUEST][END]
INFO - 2026-03-09 13:33:16 --> [REQ_ID=fc1c644d8da6] [PERF] Execution time=0.012282
DEBUG - 2026-03-09 13:33:28 --> [REQ_ID=eb7e9926663b] [REQUEST][START] GET /index.php/Management/Marketing/Content/Listing
DEBUG - 2026-03-09 13:33:28 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-09 13:33:28 --> [REQ_ID=eb7e9926663b] [REQUEST][END]
INFO - 2026-03-09 13:33:28 --> [REQ_ID=eb7e9926663b] [PERF] Execution time=0.015887
DEBUG - 2026-03-09 13:34:46 --> [REQ_ID=c6bf46c21a20] [REQUEST][START] GET /index.php/Knowledgebase
DEBUG - 2026-03-09 13:34:46 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-09 13:34:46 --> [REQ_ID=c6bf46c21a20] [FILTER_BEFORE] /index.php/Knowledgebase
DEBUG - 2026-03-09 13:34:46 --> [REQ_ID=c6bf46c21a20] [ROUTE] Controller=\App\Modules\User\Controllers\KnowledgebaseController Method=index
DEBUG - 2026-03-09 13:34:46 --> [REQ_ID=c6bf46c21a20] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Knowledgebase
DEBUG - 2026-03-09 13:34:46 --> [CSRF] token name=csrf_test_name hash=769c91413642044c7a7992f0979208d1
DEBUG - 2026-03-09 13:34:46 --> [REQ_ID=c6bf46c21a20] [REQUEST][END]
INFO - 2026-03-09 13:34:46 --> [REQ_ID=c6bf46c21a20] [PERF] Execution time=0.021466
DEBUG - 2026-03-09 13:34:46 --> [REQ_ID=334a7a50a47a] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-09 13:34:46 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-09 13:34:46 --> [REQ_ID=334a7a50a47a] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-09 13:34:46 --> [REQ_ID=334a7a50a47a] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-09 13:34:46 --> [REQ_ID=334a7a50a47a] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-09 13:34:46 --> [CSRF] token name=csrf_test_name hash=bf56254248f810016adcb65983c0aba3
DEBUG - 2026-03-09 13:34:46 --> [REQ_ID=90405c2cfd77] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-09 13:34:46 --> [REQ_ID=90405c2cfd77] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-09 13:34:46 --> [REQ_ID=334a7a50a47a] [FILTER_AFTER]
DEBUG - 2026-03-09 13:34:46 --> [REQ_ID=334a7a50a47a] [LIFECYCLE][END] status=200 duration_ms=125.57 memory_delta=0
INFO - 2026-03-09 13:34:46 --> [REQ_ID=90405c2cfd77] [PERF] Execution time=0.125323
DEBUG - 2026-03-09 13:34:46 --> [REQ_ID=334a7a50a47a] [REQUEST][END]
INFO - 2026-03-09 13:34:46 --> [REQ_ID=334a7a50a47a] [PERF] Execution time=0.134175
DEBUG - 2026-03-09 13:36:16 --> [REQ_ID=229e1bc0be69] [REQUEST][START] HEAD /
DEBUG - 2026-03-09 13:36:16 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-09 13:36:16 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-09 13:36:17 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-09 13:36:17 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-09 13:36:17 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-09 13:40:01 --> [REQ_ID=52ce30d809f6] [REQUEST][START] GET /index.php/Management/Exchange
DEBUG - 2026-03-09 13:40:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-09 13:40:01 --> [REQ_ID=52ce30d809f6] [FILTER_BEFORE] /index.php/Management/Exchange
DEBUG - 2026-03-09 13:40:01 --> [REQ_ID=52ce30d809f6] [ROUTE] Controller=\App\Modules\Management\Controllers\ExchangeAdminController Method=index
DEBUG - 2026-03-09 13:40:01 --> [REQ_ID=52ce30d809f6] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Management/Exchange
DEBUG - 2026-03-09 13:40:01 --> [CSRF] token name=csrf_test_name hash=ce11b759f9d22426a2ef82b8ef4152e4
DEBUG - 2026-03-09 13:40:01 --> [REQ_ID=52ce30d809f6] [REQUEST][END]
INFO - 2026-03-09 13:40:01 --> [REQ_ID=52ce30d809f6] [PERF] Execution time=0.058060
DEBUG - 2026-03-09 13:40:01 --> [REQ_ID=fbefb1831a95] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-09 13:40:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-09 13:40:01 --> [REQ_ID=fbefb1831a95] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-09 13:40:01 --> [REQ_ID=fbefb1831a95] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-09 13:40:01 --> [REQ_ID=fbefb1831a95] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-09 13:40:01 --> [CSRF] token name=csrf_test_name hash=57a60789138ff751dd34b096b2f4ee37
DEBUG - 2026-03-09 13:40:01 --> [REQ_ID=cb7321dc56a3] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-09 13:40:01 --> [REQ_ID=cb7321dc56a3] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-09 13:40:01 --> [REQ_ID=fbefb1831a95] [FILTER_AFTER]
DEBUG - 2026-03-09 13:40:01 --> [REQ_ID=fbefb1831a95] [LIFECYCLE][END] status=200 duration_ms=172.35 memory_delta=0
INFO - 2026-03-09 13:40:01 --> [REQ_ID=cb7321dc56a3] [PERF] Execution time=0.172280
DEBUG - 2026-03-09 13:40:01 --> [REQ_ID=fbefb1831a95] [REQUEST][END]
INFO - 2026-03-09 13:40:01 --> [REQ_ID=fbefb1831a95] [PERF] Execution time=0.184827
DEBUG - 2026-03-09 13:41:16 --> [REQ_ID=882dd1c97c79] [REQUEST][START] HEAD /
DEBUG - 2026-03-09 13:41:16 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-09 13:41:16 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-09 13:41:17 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-09 13:41:17 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-09 13:41:17 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-09 13:44:21 --> [REQ_ID=f423b52c4661] [REQUEST][START] GET /
DEBUG - 2026-03-09 13:44:21 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-09 13:44:21 --> [REQ_ID=f423b52c4661] [FILTER_BEFORE] /
DEBUG - 2026-03-09 13:44:21 --> [REQ_ID=f423b52c4661] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-09 13:44:21 --> [REQ_ID=f423b52c4661] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-09 13:44:21 --> [CSRF] token name=csrf_test_name hash=f631ba549dc2dbca71a6ec7ae9d8fe26
DEBUG - 2026-03-09 13:44:21 --> [REQ_ID=b65a9fdda66f] [INIT] App\Controllers\Home::GET
INFO - 2026-03-09 13:44:21 --> [REQ_ID=b65a9fdda66f] [MEMORY][controller-start] 6291456
INFO - 2026-03-09 13:44:21 --> [REQ_ID=b65a9fdda66f] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-09 13:44:21 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-09 13:44:22 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-03-09 13:44:22 --> [REQ_ID=b65a9fdda66f] [VIEW_RENDER] themes/public/home
INFO - 2026-03-09 13:44:22 --> [REQ_ID=b65a9fdda66f] [MEMORY][commonData:start] 10485760
INFO - 2026-03-09 13:44:22 --> themesMemory usage: 10485760
DEBUG - 2026-03-09 13:44:22 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-09 13:44:22 --> [REQ_ID=f423b52c4661] [FILTER_AFTER]
DEBUG - 2026-03-09 13:44:22 --> [REQ_ID=f423b52c4661] [LIFECYCLE][END] status=200 duration_ms=781.83 memory_delta=4194304
INFO - 2026-03-09 13:44:22 --> [REQ_ID=b65a9fdda66f] [PERF] Execution time=0.779835
DEBUG - 2026-03-09 13:44:22 --> [REQ_ID=f423b52c4661] [REQUEST][END]
INFO - 2026-03-09 13:44:22 --> [REQ_ID=f423b52c4661] [PERF] Execution time=0.822131
DEBUG - 2026-03-09 13:46:16 --> [REQ_ID=3fe2a4b62b87] [REQUEST][START] HEAD /
DEBUG - 2026-03-09 13:46:16 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-09 13:46:16 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-09 13:46:17 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-09 13:46:17 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-09 13:46:17 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-09 13:50:19 --> [REQ_ID=c6c83c46de0c] [REQUEST][START] GET /index.php/Blog/Personal-Budgeting/The-Importance-of-Personal-Financial-Budgeting
DEBUG - 2026-03-09 13:50:19 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-09 13:50:19 --> [REQ_ID=c6c83c46de0c] [REQUEST][END]
INFO - 2026-03-09 13:50:19 --> [REQ_ID=c6c83c46de0c] [PERF] Execution time=0.043743
DEBUG - 2026-03-09 13:50:29 --> [REQ_ID=31d7c061bf99] [REQUEST][START] GET /index.php/Management/Docs
DEBUG - 2026-03-09 13:50:29 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-09 13:50:29 --> [REQ_ID=31d7c061bf99] [FILTER_BEFORE] /index.php/Management/Docs
DEBUG - 2026-03-09 13:50:29 --> [REQ_ID=31d7c061bf99] [ROUTE] Controller=\App\Modules\Management\Controllers\DocsAdminController Method=index
DEBUG - 2026-03-09 13:50:29 --> [REQ_ID=31d7c061bf99] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Management/Docs
DEBUG - 2026-03-09 13:50:29 --> [CSRF] token name=csrf_test_name hash=e0b092f9f06b99da4d5c599a735973c6
DEBUG - 2026-03-09 13:50:29 --> [REQ_ID=31d7c061bf99] [REQUEST][END]
INFO - 2026-03-09 13:50:29 --> [REQ_ID=31d7c061bf99] [PERF] Execution time=0.024470
DEBUG - 2026-03-09 13:50:29 --> [REQ_ID=607a59c897b8] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-09 13:50:29 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-09 13:50:29 --> [REQ_ID=607a59c897b8] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-09 13:50:29 --> [REQ_ID=607a59c897b8] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-09 13:50:29 --> [REQ_ID=607a59c897b8] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-09 13:50:29 --> [CSRF] token name=csrf_test_name hash=0a8543de61e4cfb8a744193a644ec6ba
DEBUG - 2026-03-09 13:50:29 --> [REQ_ID=bb5837911393] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-09 13:50:29 --> [REQ_ID=bb5837911393] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-09 13:50:29 --> [REQ_ID=607a59c897b8] [FILTER_AFTER]
DEBUG - 2026-03-09 13:50:29 --> [REQ_ID=607a59c897b8] [LIFECYCLE][END] status=200 duration_ms=140.10 memory_delta=0
INFO - 2026-03-09 13:50:29 --> [REQ_ID=bb5837911393] [PERF] Execution time=0.140036
DEBUG - 2026-03-09 13:50:29 --> [REQ_ID=607a59c897b8] [REQUEST][END]
INFO - 2026-03-09 13:50:29 --> [REQ_ID=607a59c897b8] [PERF] Execution time=0.152094
DEBUG - 2026-03-09 13:51:16 --> [REQ_ID=2551eb732aa7] [REQUEST][START] HEAD /
DEBUG - 2026-03-09 13:51:16 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-09 13:51:16 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-09 13:51:17 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-09 13:51:17 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-09 13:51:17 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-09 13:54:59 --> [REQ_ID=abbfedb0ccc6] [REQUEST][START] GET /index.php/logout
DEBUG - 2026-03-09 13:54:59 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-09 13:54:59 --> [REQ_ID=abbfedb0ccc6] [REQUEST][END]
INFO - 2026-03-09 13:54:59 --> [REQ_ID=abbfedb0ccc6] [PERF] Execution time=0.044395
DEBUG - 2026-03-09 13:55:33 --> [REQ_ID=1550e999bd04] [REQUEST][START] GET /index.php/Blog
DEBUG - 2026-03-09 13:55:33 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-09 13:55:33 --> [REQ_ID=1550e999bd04] [REQUEST][END]
INFO - 2026-03-09 13:55:33 --> [REQ_ID=1550e999bd04] [PERF] Execution time=0.012459
DEBUG - 2026-03-09 13:56:16 --> [REQ_ID=5d3793818a6c] [REQUEST][START] HEAD /
DEBUG - 2026-03-09 13:56:16 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-09 13:56:16 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-09 13:56:16 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-09 13:56:16 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-09 13:56:16 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-09 13:57:51 --> [REQ_ID=ede0eb99c4b6] [REQUEST][START] GET /index.php/How-It-Works/Setting-Financial-Goals
DEBUG - 2026-03-09 13:57:51 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-09 13:57:51 --> [REQ_ID=ede0eb99c4b6] [FILTER_BEFORE] /index.php/How-It-Works/Setting-Financial-Goals
DEBUG - 2026-03-09 13:57:51 --> [REQ_ID=ede0eb99c4b6] [ROUTE] Controller=\App\Modules\Blog\Controllers\HowItWorksController Method=SettingFinancialGoals
DEBUG - 2026-03-09 13:57:51 --> [REQ_ID=ede0eb99c4b6] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/How-It-Works/Setting-Financial-Goals
DEBUG - 2026-03-09 13:57:51 --> [CSRF] token name=csrf_test_name hash=0f43769e8c2e802c84ad395257b05509
DEBUG - 2026-03-09 13:57:51 --> [REQ_ID=7bf70b4b4b25] [INIT] App\Modules\Blog\Controllers\HowItWorksController::GET
INFO - 2026-03-09 13:57:51 --> [REQ_ID=7bf70b4b4b25] [MEMORY][controller-start] 6291456
DEBUG - 2026-03-09 13:57:51 --> [REQ_ID=7bf70b4b4b25] [METHOD_ENTRY] SettingFinancialGoals
DEBUG - 2026-03-09 13:57:51 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-09 13:57:51 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-09 13:57:51 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-09 13:57:51 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-09 13:57:51 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-09 13:57:51 --> MyMICoin: guest context detected; skipping user-specific preload.
INFO - 2026-03-09 13:57:51 --> [REQ_ID=7bf70b4b4b25] [MEMORY][commonData:start] 6291456
INFO - 2026-03-09 13:57:52 --> themesMemory usage: 10485760
DEBUG - 2026-03-09 13:57:52 --> [MetaService] slug=how-it-works/setting-financial-goals pageName= cacheHit= path=DB
DEBUG - 2026-03-09 13:57:52 --> [REQ_ID=ede0eb99c4b6] [FILTER_AFTER]
DEBUG - 2026-03-09 13:57:52 --> [REQ_ID=ede0eb99c4b6] [LIFECYCLE][END] status=200 duration_ms=646.88 memory_delta=4194304
INFO - 2026-03-09 13:57:52 --> [REQ_ID=7bf70b4b4b25] [PERF] Execution time=0.644994
DEBUG - 2026-03-09 13:57:52 --> [REQ_ID=ede0eb99c4b6] [REQUEST][END]
INFO - 2026-03-09 13:57:52 --> [REQ_ID=ede0eb99c4b6] [PERF] Execution time=0.692426
DEBUG - 2026-03-09 13:58:31 --> [REQ_ID=67504b11a93c] [REQUEST][START] GET /index.php/How-It-Works/Daily-Financial-News
DEBUG - 2026-03-09 13:58:31 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-09 13:58:31 --> [REQ_ID=67504b11a93c] [FILTER_BEFORE] /index.php/How-It-Works/Daily-Financial-News
DEBUG - 2026-03-09 13:58:31 --> [REQ_ID=67504b11a93c] [ROUTE] Controller=\App\Modules\Blog\Controllers\HowItWorksController Method=DailyFinancialNews
DEBUG - 2026-03-09 13:58:31 --> [REQ_ID=67504b11a93c] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/How-It-Works/Daily-Financial-News
DEBUG - 2026-03-09 13:58:31 --> [CSRF] token name=csrf_test_name hash=d8d8c6114671e3ed2a5e7c45f1e4067b
DEBUG - 2026-03-09 13:58:31 --> [REQ_ID=d29f99b7f28c] [INIT] App\Modules\Blog\Controllers\HowItWorksController::GET
INFO - 2026-03-09 13:58:31 --> [REQ_ID=d29f99b7f28c] [MEMORY][controller-start] 6291456
DEBUG - 2026-03-09 13:58:31 --> [REQ_ID=d29f99b7f28c] [METHOD_ENTRY] DailyFinancialNews
DEBUG - 2026-03-09 13:58:31 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-09 13:58:31 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-09 13:58:31 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-09 13:58:31 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-09 13:58:31 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-09 13:58:31 --> MyMICoin: guest context detected; skipping user-specific preload.
INFO - 2026-03-09 13:58:31 --> [REQ_ID=d29f99b7f28c] [MEMORY][commonData:start] 6291456
INFO - 2026-03-09 13:58:32 --> themesMemory usage: 8388608
DEBUG - 2026-03-09 13:58:32 --> [MetaService] slug=how-it-works/daily-financial-news pageName= cacheHit= path=DB
DEBUG - 2026-03-09 13:58:32 --> [REQ_ID=67504b11a93c] [FILTER_AFTER]
DEBUG - 2026-03-09 13:58:32 --> [REQ_ID=67504b11a93c] [LIFECYCLE][END] status=200 duration_ms=535.73 memory_delta=2097152
INFO - 2026-03-09 13:58:32 --> [REQ_ID=d29f99b7f28c] [PERF] Execution time=0.534658
DEBUG - 2026-03-09 13:58:32 --> [REQ_ID=67504b11a93c] [REQUEST][END]
INFO - 2026-03-09 13:58:32 --> [REQ_ID=67504b11a93c] [PERF] Execution time=0.605816
DEBUG - 2026-03-09 14:00:01 --> [REQ_ID=ad406d8fe724] [REQUEST][START] GET /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-09 14:00:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-09 14:00:01 --> [REQ_ID=ad406d8fe724] [FILTER_BEFORE] /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-09 14:00:01 --> [REQ_ID=ad406d8fe724] [ROUTE] Controller=\App\Modules\Management\Controllers\ManagementAPIController Method=Run_CRON_Tasks
DEBUG - 2026-03-09 14:00:01 --> [REQ_ID=ad406d8fe724] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-09 14:00:01 --> [REQ_ID=ad406d8fe724] [REQUEST][END]
INFO - 2026-03-09 14:00:01 --> [REQ_ID=ad406d8fe724] [PERF] Execution time=0.035772
DEBUG - 2026-03-09 14:01:16 --> [REQ_ID=ad36963d1311] [REQUEST][START] HEAD /
DEBUG - 2026-03-09 14:01:16 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-09 14:01:16 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-09 14:01:17 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-09 14:01:17 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-09 14:01:17 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-09 14:06:16 --> [REQ_ID=bb40d47db662] [REQUEST][START] HEAD /
DEBUG - 2026-03-09 14:06:16 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-09 14:06:16 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-09 14:06:17 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-09 14:06:17 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-09 14:06:17 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-09 14:11:16 --> [REQ_ID=5e4692ed71c6] [REQUEST][START] HEAD /
DEBUG - 2026-03-09 14:11:16 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-09 14:11:16 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-09 14:11:17 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-09 14:11:17 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-09 14:11:17 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-09 14:15:01 --> [REQ_ID=49b01a97bdd5] [REQUEST][START] GET /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-09 14:15:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-09 14:15:01 --> [REQ_ID=49b01a97bdd5] [FILTER_BEFORE] /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-09 14:15:01 --> [REQ_ID=49b01a97bdd5] [ROUTE] Controller=\App\Modules\APIs\Controllers\AlertsAPIController Method=fetchEmailAlerts
DEBUG - 2026-03-09 14:15:01 --> [REQ_ID=49b01a97bdd5] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-09 14:15:01 --> [REQ_ID=49b01a97bdd5] [REQUEST][END]
INFO - 2026-03-09 14:15:01 --> [REQ_ID=49b01a97bdd5] [PERF] Execution time=0.045783
DEBUG - 2026-03-09 14:16:16 --> [REQ_ID=607ee1d4125f] [REQUEST][START] HEAD /
DEBUG - 2026-03-09 14:16:16 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-09 14:16:16 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-09 14:16:16 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-09 14:16:16 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-09 14:16:16 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-09 14:20:45 --> [REQ_ID=5cbf8192e6ce] [REQUEST][START] GET /index.php/Legal/Terms-And-Conditions
DEBUG - 2026-03-09 14:20:45 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-09 14:20:45 --> [REQ_ID=5cbf8192e6ce] [REQUEST][END]
INFO - 2026-03-09 14:20:45 --> [REQ_ID=5cbf8192e6ce] [PERF] Execution time=0.040802
DEBUG - 2026-03-09 14:21:16 --> [REQ_ID=172b4bb3de31] [REQUEST][START] HEAD /
DEBUG - 2026-03-09 14:21:16 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-09 14:21:16 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-09 14:21:16 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-09 14:21:16 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-09 14:21:16 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-09 14:25:40 --> [REQ_ID=e26e04a34fb3] [REQUEST][START] GET /
DEBUG - 2026-03-09 14:25:40 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-09 14:25:40 --> [REQ_ID=e26e04a34fb3] [FILTER_BEFORE] /
DEBUG - 2026-03-09 14:25:40 --> [REQ_ID=e26e04a34fb3] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-09 14:25:40 --> [REQ_ID=e26e04a34fb3] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-09 14:25:40 --> [CSRF] token name=csrf_test_name hash=92fb4e2e087dbffda85c86e571da873c
DEBUG - 2026-03-09 14:25:40 --> [REQ_ID=5f63b7170c2d] [INIT] App\Controllers\Home::GET
INFO - 2026-03-09 14:25:40 --> [REQ_ID=5f63b7170c2d] [MEMORY][controller-start] 6291456
INFO - 2026-03-09 14:25:40 --> [REQ_ID=5f63b7170c2d] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-09 14:25:40 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-09 14:25:40 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-03-09 14:25:40 --> [REQ_ID=5f63b7170c2d] [VIEW_RENDER] themes/public/home
INFO - 2026-03-09 14:25:40 --> [REQ_ID=5f63b7170c2d] [MEMORY][commonData:start] 10485760
INFO - 2026-03-09 14:25:40 --> themesMemory usage: 10485760
DEBUG - 2026-03-09 14:25:40 --> [MetaService] slug= pageName=Home cacheHit= path=DB
DEBUG - 2026-03-09 14:25:40 --> [REQ_ID=e26e04a34fb3] [FILTER_AFTER]
DEBUG - 2026-03-09 14:25:40 --> [REQ_ID=e26e04a34fb3] [LIFECYCLE][END] status=200 duration_ms=728.96 memory_delta=4194304
INFO - 2026-03-09 14:25:40 --> [REQ_ID=5f63b7170c2d] [PERF] Execution time=0.727100
DEBUG - 2026-03-09 14:25:40 --> [REQ_ID=e26e04a34fb3] [REQUEST][END]
INFO - 2026-03-09 14:25:40 --> [REQ_ID=e26e04a34fb3] [PERF] Execution time=0.768272
DEBUG - 2026-03-09 14:26:16 --> [REQ_ID=29654ee76c4f] [REQUEST][START] HEAD /
DEBUG - 2026-03-09 14:26:16 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-09 14:26:16 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-09 14:26:16 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-09 14:26:16 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-09 14:26:16 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-09 14:31:16 --> [REQ_ID=78eee1de12a6] [REQUEST][START] HEAD /
DEBUG - 2026-03-09 14:31:16 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-09 14:31:16 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-09 14:31:17 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-09 14:31:17 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-09 14:31:17 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-09 14:32:17 --> [REQ_ID=c349a439cfed] [REQUEST][START] GET /index.php/Alerts
DEBUG - 2026-03-09 14:32:17 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-09 14:32:17 --> [REQ_ID=c349a439cfed] [REQUEST][END]
INFO - 2026-03-09 14:32:17 --> [REQ_ID=c349a439cfed] [PERF] Execution time=0.022587
DEBUG - 2026-03-09 14:32:37 --> [REQ_ID=ae3d2d5c125a] [REQUEST][START] GET /index.php/Management/Partners
DEBUG - 2026-03-09 14:32:37 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-09 14:32:37 --> [REQ_ID=ae3d2d5c125a] [FILTER_BEFORE] /index.php/Management/Partners
DEBUG - 2026-03-09 14:32:37 --> [REQ_ID=ae3d2d5c125a] [ROUTE] Controller=\App\Modules\Management\Controllers\PartnersController Method=index
DEBUG - 2026-03-09 14:32:37 --> [REQ_ID=ae3d2d5c125a] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Management/Partners
DEBUG - 2026-03-09 14:32:37 --> [CSRF] token name=csrf_test_name hash=e3980da799da061b87c947383e729767
DEBUG - 2026-03-09 14:32:37 --> [REQ_ID=ae3d2d5c125a] [REQUEST][END]
INFO - 2026-03-09 14:32:37 --> [REQ_ID=ae3d2d5c125a] [PERF] Execution time=0.018684
DEBUG - 2026-03-09 14:32:38 --> [REQ_ID=256109f1b86a] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-09 14:32:38 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-09 14:32:38 --> [REQ_ID=256109f1b86a] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-09 14:32:38 --> [REQ_ID=256109f1b86a] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-09 14:32:38 --> [REQ_ID=256109f1b86a] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-09 14:32:38 --> [CSRF] token name=csrf_test_name hash=47beb9be24e5f96c86e4712202fce075
DEBUG - 2026-03-09 14:32:38 --> [REQ_ID=bd6286152f37] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-09 14:32:38 --> [REQ_ID=bd6286152f37] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-09 14:32:38 --> [REQ_ID=256109f1b86a] [FILTER_AFTER]
DEBUG - 2026-03-09 14:32:38 --> [REQ_ID=256109f1b86a] [LIFECYCLE][END] status=200 duration_ms=50.52 memory_delta=0
INFO - 2026-03-09 14:32:38 --> [REQ_ID=bd6286152f37] [PERF] Execution time=0.050255
DEBUG - 2026-03-09 14:32:38 --> [REQ_ID=256109f1b86a] [REQUEST][END]
INFO - 2026-03-09 14:32:38 --> [REQ_ID=256109f1b86a] [PERF] Execution time=0.062107
DEBUG - 2026-03-09 14:33:53 --> [REQ_ID=ce41a45c0c36] [REQUEST][START] GET /index.php/Support/Account
DEBUG - 2026-03-09 14:33:53 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-09 14:33:53 --> [REQ_ID=ce41a45c0c36] [REQUEST][END]
INFO - 2026-03-09 14:33:53 --> [REQ_ID=ce41a45c0c36] [PERF] Execution time=0.042488
DEBUG - 2026-03-09 14:36:16 --> [REQ_ID=26a1e920219d] [REQUEST][START] HEAD /
DEBUG - 2026-03-09 14:36:17 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-09 14:36:17 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-09 14:36:17 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-09 14:36:17 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-09 14:36:17 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-09 14:41:16 --> [REQ_ID=fdd2459adc01] [REQUEST][START] HEAD /
DEBUG - 2026-03-09 14:41:16 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-09 14:41:16 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-09 14:41:17 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-09 14:41:17 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-09 14:41:17 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-09 14:46:16 --> [REQ_ID=090a41a1d886] [REQUEST][START] HEAD /
DEBUG - 2026-03-09 14:46:16 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-09 14:46:16 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-09 14:46:16 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-09 14:46:16 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-09 14:46:16 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-09 14:51:16 --> [REQ_ID=37719ea5c39b] [REQUEST][START] HEAD /
DEBUG - 2026-03-09 14:51:16 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-09 14:51:16 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-09 14:51:16 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-09 14:51:16 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-09 14:51:16 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-09 14:53:36 --> [REQ_ID=d710f58e3505] [REQUEST][START] GET /index.php/Wallets/Purchase/Memberships
DEBUG - 2026-03-09 14:53:36 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-09 14:53:36 --> [REQ_ID=d710f58e3505] [REQUEST][END]
INFO - 2026-03-09 14:53:36 --> [REQ_ID=d710f58e3505] [PERF] Execution time=0.044976
DEBUG - 2026-03-09 14:56:16 --> [REQ_ID=e0d46f714b71] [REQUEST][START] HEAD /
DEBUG - 2026-03-09 14:56:16 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-09 14:56:16 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-09 14:56:17 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-09 14:56:17 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-09 14:56:17 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-09 15:00:01 --> [REQ_ID=9de9a895818e] [REQUEST][START] GET /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-09 15:00:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-09 15:00:01 --> [REQ_ID=9de9a895818e] [FILTER_BEFORE] /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-09 15:00:01 --> [REQ_ID=9de9a895818e] [ROUTE] Controller=\App\Modules\Management\Controllers\ManagementAPIController Method=Run_CRON_Tasks
DEBUG - 2026-03-09 15:00:01 --> [REQ_ID=9de9a895818e] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-09 15:00:01 --> [REQ_ID=9de9a895818e] [REQUEST][END]
INFO - 2026-03-09 15:00:01 --> [REQ_ID=9de9a895818e] [PERF] Execution time=0.049864
DEBUG - 2026-03-09 15:01:16 --> [REQ_ID=805ff757fba5] [REQUEST][START] HEAD /
DEBUG - 2026-03-09 15:01:16 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-09 15:01:16 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-09 15:01:16 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-09 15:01:16 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-09 15:01:16 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-09 15:06:16 --> [REQ_ID=2088b5fe7ebc] [REQUEST][START] HEAD /
DEBUG - 2026-03-09 15:06:16 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-09 15:06:16 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-09 15:06:17 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-09 15:06:17 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-09 15:06:17 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-09 15:11:16 --> [REQ_ID=5af99f252713] [REQUEST][START] HEAD /
DEBUG - 2026-03-09 15:11:16 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-09 15:11:16 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-09 15:11:17 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-09 15:11:17 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-09 15:11:17 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-09 15:15:02 --> [REQ_ID=ccacbbac753d] [REQUEST][START] GET /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-09 15:15:02 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-09 15:15:02 --> [REQ_ID=ccacbbac753d] [FILTER_BEFORE] /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-09 15:15:02 --> [REQ_ID=ccacbbac753d] [ROUTE] Controller=\App\Modules\APIs\Controllers\AlertsAPIController Method=fetchEmailAlerts
DEBUG - 2026-03-09 15:15:02 --> [REQ_ID=ccacbbac753d] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-09 15:15:02 --> [REQ_ID=ccacbbac753d] [REQUEST][END]
INFO - 2026-03-09 15:15:02 --> [REQ_ID=ccacbbac753d] [PERF] Execution time=0.045574
DEBUG - 2026-03-09 15:16:16 --> [REQ_ID=568a3ea2bcd2] [REQUEST][START] HEAD /
DEBUG - 2026-03-09 15:16:16 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-09 15:16:16 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-09 15:16:17 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-09 15:16:17 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-09 15:16:17 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-09 15:21:16 --> [REQ_ID=f84cdfb3ad2a] [REQUEST][START] HEAD /
DEBUG - 2026-03-09 15:21:16 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-09 15:21:16 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-09 15:21:16 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-09 15:21:16 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-09 15:21:16 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-09 15:26:16 --> [REQ_ID=c6065a1e5bc9] [REQUEST][START] HEAD /
DEBUG - 2026-03-09 15:26:16 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-09 15:26:16 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-09 15:26:17 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-09 15:26:17 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-09 15:26:17 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-09 15:31:16 --> [REQ_ID=9e07b563d474] [REQUEST][START] HEAD /
DEBUG - 2026-03-09 15:31:16 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-09 15:31:16 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-09 15:31:17 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-09 15:31:17 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-09 15:31:17 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-09 15:36:16 --> [REQ_ID=3f4266ffd895] [REQUEST][START] HEAD /
DEBUG - 2026-03-09 15:36:16 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-09 15:36:16 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-09 15:36:16 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-09 15:36:16 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-09 15:36:16 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-09 15:41:16 --> [REQ_ID=9fbc232a73b0] [REQUEST][START] HEAD /
DEBUG - 2026-03-09 15:41:16 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-09 15:41:16 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-09 15:41:16 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-09 15:41:16 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-09 15:41:16 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-09 15:41:34 --> [REQ_ID=d9fee86ce8d7] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-09 15:41:34 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-09 15:41:34 --> [REQ_ID=d9fee86ce8d7] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-09 15:41:34 --> [REQ_ID=d9fee86ce8d7] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-09 15:41:34 --> [REQ_ID=d9fee86ce8d7] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-09 15:41:34 --> [CSRF] token name=csrf_test_name hash=49d8dadfb290814ab9519e0b6c1d2d69
DEBUG - 2026-03-09 15:41:34 --> [REQ_ID=bd32b10b6855] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-09 15:41:34 --> [REQ_ID=bd32b10b6855] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-09 15:41:34 --> [REQ_ID=d9fee86ce8d7] [FILTER_AFTER]
DEBUG - 2026-03-09 15:41:34 --> [REQ_ID=d9fee86ce8d7] [LIFECYCLE][END] status=200 duration_ms=240.14 memory_delta=0
INFO - 2026-03-09 15:41:34 --> [REQ_ID=bd32b10b6855] [PERF] Execution time=0.237902
DEBUG - 2026-03-09 15:41:34 --> [REQ_ID=d9fee86ce8d7] [REQUEST][END]
INFO - 2026-03-09 15:41:34 --> [REQ_ID=d9fee86ce8d7] [PERF] Execution time=0.262361
DEBUG - 2026-03-09 15:41:36 --> [REQ_ID=4f3d01f3cb78] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-09 15:41:36 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-09 15:41:36 --> [REQ_ID=4f3d01f3cb78] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-09 15:41:36 --> [REQ_ID=4f3d01f3cb78] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-09 15:41:36 --> [REQ_ID=4f3d01f3cb78] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-09 15:41:36 --> [CSRF] token name=csrf_test_name hash=747d40c13f3d19cc40cab9fc934bc464
DEBUG - 2026-03-09 15:41:36 --> [REQ_ID=75f077eb9d66] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-09 15:41:36 --> [REQ_ID=75f077eb9d66] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-09 15:41:36 --> [REQ_ID=4f3d01f3cb78] [FILTER_AFTER]
DEBUG - 2026-03-09 15:41:36 --> [REQ_ID=4f3d01f3cb78] [LIFECYCLE][END] status=200 duration_ms=31.80 memory_delta=0
INFO - 2026-03-09 15:41:36 --> [REQ_ID=75f077eb9d66] [PERF] Execution time=0.034858
DEBUG - 2026-03-09 15:41:36 --> [REQ_ID=4f3d01f3cb78] [REQUEST][END]
INFO - 2026-03-09 15:41:36 --> [REQ_ID=4f3d01f3cb78] [PERF] Execution time=0.117913
DEBUG - 2026-03-09 15:41:37 --> [REQ_ID=21c932b22e45] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-09 15:41:37 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-09 15:41:37 --> [REQ_ID=21c932b22e45] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-09 15:41:37 --> [REQ_ID=21c932b22e45] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-09 15:41:37 --> [REQ_ID=21c932b22e45] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-09 15:41:37 --> [CSRF] token name=csrf_test_name hash=12ab9fe687029230638c6df6301af570
DEBUG - 2026-03-09 15:41:37 --> [REQ_ID=eeced1bce551] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-09 15:41:37 --> [REQ_ID=eeced1bce551] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-09 15:41:37 --> [REQ_ID=21c932b22e45] [FILTER_AFTER]
DEBUG - 2026-03-09 15:41:37 --> [REQ_ID=21c932b22e45] [LIFECYCLE][END] status=200 duration_ms=22.24 memory_delta=0
INFO - 2026-03-09 15:41:37 --> [REQ_ID=eeced1bce551] [PERF] Execution time=0.022181
DEBUG - 2026-03-09 15:41:37 --> [REQ_ID=21c932b22e45] [REQUEST][END]
INFO - 2026-03-09 15:41:37 --> [REQ_ID=21c932b22e45] [PERF] Execution time=0.031560
DEBUG - 2026-03-09 15:41:38 --> [REQ_ID=3de801f738f9] [REQUEST][START] GET /index.php/How-It-Works/mymi-gold
DEBUG - 2026-03-09 15:41:38 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-09 15:41:38 --> [REQ_ID=3de801f738f9] [FILTER_BEFORE] /index.php/How-It-Works/mymi-gold
DEBUG - 2026-03-09 15:41:38 --> [REQ_ID=3de801f738f9] [ROUTE] Controller=\App\Modules\Blog\Controllers\HowItWorksController Method=show
DEBUG - 2026-03-09 15:41:38 --> [REQ_ID=3de801f738f9] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/How-It-Works/mymi-gold
DEBUG - 2026-03-09 15:41:38 --> [CSRF] token name=csrf_test_name hash=8eac16ddfe1c8e8b99b14e701aca90d6
DEBUG - 2026-03-09 15:41:38 --> [REQ_ID=ba0b265d00b1] [INIT] App\Modules\Blog\Controllers\HowItWorksController::GET
INFO - 2026-03-09 15:41:38 --> [REQ_ID=ba0b265d00b1] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-09 15:41:38 --> [REQ_ID=ba0b265d00b1] [METHOD_ENTRY] show
DEBUG - 2026-03-09 15:41:38 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-09 15:41:38 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-09 15:41:38 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-09 15:41:38 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-09 15:41:38 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-09 15:41:38 --> MyMICoin: guest context detected; skipping user-specific preload.
ERROR - 2026-03-09 15:41:38 --> HowItWorksController failure: Call to undefined method App\Modules\Blog\Controllers\HowItWorksController::respondWithRendered()
INFO - 2026-03-09 15:41:38 --> [REQ_ID=ba0b265d00b1] [PERF] Execution time=0.072181
DEBUG - 2026-03-09 15:41:40 --> [REQ_ID=e2f9fe66963d] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-09 15:41:40 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-09 15:41:40 --> [REQ_ID=e2f9fe66963d] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-09 15:41:40 --> [REQ_ID=e2f9fe66963d] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-09 15:41:40 --> [REQ_ID=e2f9fe66963d] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-09 15:41:40 --> [CSRF] token name=csrf_test_name hash=42641c44d96df879e42ebf96fd96ae32
DEBUG - 2026-03-09 15:41:40 --> [REQ_ID=26eb3838748a] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-09 15:41:40 --> [REQ_ID=26eb3838748a] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-09 15:41:40 --> [REQ_ID=e2f9fe66963d] [FILTER_AFTER]
DEBUG - 2026-03-09 15:41:40 --> [REQ_ID=e2f9fe66963d] [LIFECYCLE][END] status=200 duration_ms=18.55 memory_delta=0
INFO - 2026-03-09 15:41:40 --> [REQ_ID=26eb3838748a] [PERF] Execution time=0.018356
DEBUG - 2026-03-09 15:41:40 --> [REQ_ID=e2f9fe66963d] [REQUEST][END]
INFO - 2026-03-09 15:41:40 --> [REQ_ID=e2f9fe66963d] [PERF] Execution time=0.028863
DEBUG - 2026-03-09 15:41:41 --> [REQ_ID=30feab4868fc] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-09 15:41:41 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-09 15:41:41 --> [REQ_ID=30feab4868fc] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-09 15:41:41 --> [REQ_ID=30feab4868fc] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-09 15:41:41 --> [REQ_ID=30feab4868fc] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-09 15:41:41 --> [CSRF] token name=csrf_test_name hash=bbf58d01c8ae66256bb46ca5c5d9ab6c
DEBUG - 2026-03-09 15:41:41 --> [REQ_ID=6aeaedf4483f] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-09 15:41:41 --> [REQ_ID=6aeaedf4483f] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-09 15:41:41 --> [REQ_ID=30feab4868fc] [FILTER_AFTER]
DEBUG - 2026-03-09 15:41:41 --> [REQ_ID=30feab4868fc] [LIFECYCLE][END] status=200 duration_ms=27.17 memory_delta=0
INFO - 2026-03-09 15:41:41 --> [REQ_ID=6aeaedf4483f] [PERF] Execution time=0.026991
DEBUG - 2026-03-09 15:41:41 --> [REQ_ID=30feab4868fc] [REQUEST][END]
INFO - 2026-03-09 15:41:41 --> [REQ_ID=30feab4868fc] [PERF] Execution time=0.036767
DEBUG - 2026-03-09 15:41:42 --> [REQ_ID=e4492ffa0f7e] [REQUEST][START] GET /index.php/How-It-Works/marketing
DEBUG - 2026-03-09 15:41:42 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-09 15:41:42 --> [REQ_ID=e4492ffa0f7e] [FILTER_BEFORE] /index.php/How-It-Works/marketing
DEBUG - 2026-03-09 15:41:42 --> [REQ_ID=e4492ffa0f7e] [ROUTE] Controller=\App\Modules\Blog\Controllers\HowItWorksController Method=show
DEBUG - 2026-03-09 15:41:42 --> [REQ_ID=e4492ffa0f7e] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/How-It-Works/marketing
DEBUG - 2026-03-09 15:41:42 --> [CSRF] token name=csrf_test_name hash=42641c44d96df879e42ebf96fd96ae32
DEBUG - 2026-03-09 15:41:42 --> [REQ_ID=bf752389c7b0] [INIT] App\Modules\Blog\Controllers\HowItWorksController::GET
INFO - 2026-03-09 15:41:42 --> [REQ_ID=bf752389c7b0] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-09 15:41:42 --> [REQ_ID=bf752389c7b0] [METHOD_ENTRY] show
DEBUG - 2026-03-09 15:41:42 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-09 15:41:42 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-09 15:41:42 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-09 15:41:42 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-09 15:41:42 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-09 15:41:42 --> MyMICoin: guest context detected; skipping user-specific preload.
ERROR - 2026-03-09 15:41:42 --> HowItWorksController failure: marketing
CRITICAL - 2026-03-09 15:41:42 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: GET, Route: How-It-Works/marketing]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-09 15:41:42 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-09 15:41:42 --> [404] URI=https://www.mymiwallet.com/index.php/How-It-Works/marketing
WARNING - 2026-03-09 15:41:42 --> 404 route miss: https://www.mymiwallet.com/index.php/How-It-Works/marketing | referrer: none
INFO - 2026-03-09 15:41:42 --> [REQ_ID=bf752389c7b0] [PERF] Execution time=0.038534
DEBUG - 2026-03-09 15:41:43 --> [REQ_ID=34ba038c5753] [REQUEST][START] GET /index.php/How-It-Works/alerts
DEBUG - 2026-03-09 15:41:43 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-09 15:41:43 --> [REQ_ID=34ba038c5753] [FILTER_BEFORE] /index.php/How-It-Works/alerts
DEBUG - 2026-03-09 15:41:43 --> [REQ_ID=34ba038c5753] [ROUTE] Controller=\App\Modules\Blog\Controllers\HowItWorksController Method=show
DEBUG - 2026-03-09 15:41:43 --> [REQ_ID=34ba038c5753] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/How-It-Works/alerts
DEBUG - 2026-03-09 15:41:43 --> [CSRF] token name=csrf_test_name hash=2c14392148b2fdc50b4b761773f3c4bf
DEBUG - 2026-03-09 15:41:43 --> [REQ_ID=52deb8942b19] [INIT] App\Modules\Blog\Controllers\HowItWorksController::GET
INFO - 2026-03-09 15:41:43 --> [REQ_ID=52deb8942b19] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-09 15:41:43 --> [REQ_ID=52deb8942b19] [METHOD_ENTRY] show
DEBUG - 2026-03-09 15:41:43 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-09 15:41:43 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-09 15:41:43 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-09 15:41:43 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-09 15:41:43 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-09 15:41:43 --> MyMICoin: guest context detected; skipping user-specific preload.
ERROR - 2026-03-09 15:41:43 --> HowItWorksController failure: alerts
CRITICAL - 2026-03-09 15:41:43 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: GET, Route: How-It-Works/alerts]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-09 15:41:43 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-09 15:41:43 --> [404] URI=https://www.mymiwallet.com/index.php/How-It-Works/alerts
WARNING - 2026-03-09 15:41:43 --> 404 route miss: https://www.mymiwallet.com/index.php/How-It-Works/alerts | referrer: none
INFO - 2026-03-09 15:41:43 --> [REQ_ID=52deb8942b19] [PERF] Execution time=0.044938
DEBUG - 2026-03-09 15:41:44 --> [REQ_ID=63b43bde8983] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-09 15:41:44 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-09 15:41:44 --> [REQ_ID=63b43bde8983] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-09 15:41:44 --> [REQ_ID=63b43bde8983] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-09 15:41:44 --> [REQ_ID=63b43bde8983] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-09 15:41:44 --> [CSRF] token name=csrf_test_name hash=a55b4fe5324935a891a68b08e96729d7
DEBUG - 2026-03-09 15:41:44 --> [REQ_ID=726282fa3b3d] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-09 15:41:44 --> [REQ_ID=726282fa3b3d] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-09 15:41:44 --> [REQ_ID=63b43bde8983] [FILTER_AFTER]
DEBUG - 2026-03-09 15:41:44 --> [REQ_ID=63b43bde8983] [LIFECYCLE][END] status=200 duration_ms=28.44 memory_delta=0
INFO - 2026-03-09 15:41:44 --> [REQ_ID=726282fa3b3d] [PERF] Execution time=0.028357
DEBUG - 2026-03-09 15:41:44 --> [REQ_ID=63b43bde8983] [REQUEST][END]
INFO - 2026-03-09 15:41:44 --> [REQ_ID=63b43bde8983] [PERF] Execution time=0.038341
DEBUG - 2026-03-09 15:41:44 --> [REQ_ID=9e75f637ee0d] [REQUEST][START] GET /index.php/How-It-Works/investing
DEBUG - 2026-03-09 15:41:44 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-09 15:41:44 --> [REQ_ID=9e75f637ee0d] [FILTER_BEFORE] /index.php/How-It-Works/investing
DEBUG - 2026-03-09 15:41:44 --> [REQ_ID=9e75f637ee0d] [ROUTE] Controller=\App\Modules\Blog\Controllers\HowItWorksController Method=show
DEBUG - 2026-03-09 15:41:44 --> [REQ_ID=9e75f637ee0d] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/How-It-Works/investing
DEBUG - 2026-03-09 15:41:44 --> [CSRF] token name=csrf_test_name hash=e871c3ca86364c57133327f86ee9e662
DEBUG - 2026-03-09 15:41:44 --> [REQ_ID=5860585a764e] [INIT] App\Modules\Blog\Controllers\HowItWorksController::GET
INFO - 2026-03-09 15:41:44 --> [REQ_ID=5860585a764e] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-09 15:41:44 --> [REQ_ID=5860585a764e] [METHOD_ENTRY] show
DEBUG - 2026-03-09 15:41:44 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-09 15:41:44 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-09 15:41:44 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-09 15:41:44 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-09 15:41:44 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-09 15:41:44 --> MyMICoin: guest context detected; skipping user-specific preload.
ERROR - 2026-03-09 15:41:44 --> HowItWorksController failure: investing
CRITICAL - 2026-03-09 15:41:44 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: GET, Route: How-It-Works/investing]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-09 15:41:44 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-09 15:41:44 --> [404] URI=https://www.mymiwallet.com/index.php/How-It-Works/investing
WARNING - 2026-03-09 15:41:44 --> 404 route miss: https://www.mymiwallet.com/index.php/How-It-Works/investing | referrer: none
INFO - 2026-03-09 15:41:44 --> [REQ_ID=5860585a764e] [PERF] Execution time=0.026684
DEBUG - 2026-03-09 15:41:46 --> [REQ_ID=8deb188c9a5e] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-09 15:41:46 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-09 15:41:47 --> [REQ_ID=8deb188c9a5e] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-09 15:41:47 --> [REQ_ID=8deb188c9a5e] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-09 15:41:47 --> [REQ_ID=8deb188c9a5e] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-09 15:41:47 --> [CSRF] token name=csrf_test_name hash=be197972cd8a02cc89c21902ffbe88b2
DEBUG - 2026-03-09 15:41:47 --> [REQ_ID=8cd63326e625] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-09 15:41:47 --> [REQ_ID=8cd63326e625] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-09 15:41:47 --> [REQ_ID=8deb188c9a5e] [FILTER_AFTER]
DEBUG - 2026-03-09 15:41:47 --> [REQ_ID=8deb188c9a5e] [LIFECYCLE][END] status=200 duration_ms=20.90 memory_delta=0
INFO - 2026-03-09 15:41:47 --> [REQ_ID=8cd63326e625] [PERF] Execution time=0.021157
DEBUG - 2026-03-09 15:41:47 --> [REQ_ID=8deb188c9a5e] [REQUEST][END]
INFO - 2026-03-09 15:41:47 --> [REQ_ID=8deb188c9a5e] [PERF] Execution time=0.036955
DEBUG - 2026-03-09 15:41:47 --> [REQ_ID=9397dc8c08a8] [REQUEST][START] GET /
DEBUG - 2026-03-09 15:41:47 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-09 15:41:47 --> [REQ_ID=9397dc8c08a8] [FILTER_BEFORE] /
DEBUG - 2026-03-09 15:41:47 --> [REQ_ID=9397dc8c08a8] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-09 15:41:47 --> [REQ_ID=9397dc8c08a8] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-09 15:41:47 --> [CSRF] token name=csrf_test_name hash=910daa50834affdcc8385a35d199c590
DEBUG - 2026-03-09 15:41:47 --> [REQ_ID=1824a0116588] [INIT] App\Controllers\Home::GET
INFO - 2026-03-09 15:41:47 --> [REQ_ID=1824a0116588] [MEMORY][controller-start] 4194304
INFO - 2026-03-09 15:41:47 --> [REQ_ID=1824a0116588] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-09 15:41:47 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-09 15:41:48 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-03-09 15:41:48 --> [REQ_ID=1824a0116588] [VIEW_RENDER] themes/public/home
INFO - 2026-03-09 15:41:48 --> [REQ_ID=1824a0116588] [MEMORY][commonData:start] 8388608
INFO - 2026-03-09 15:41:48 --> themesMemory usage: 8388608
DEBUG - 2026-03-09 15:41:48 --> [MetaService] slug= pageName=Home cacheHit= path=DB
DEBUG - 2026-03-09 15:41:48 --> [REQ_ID=9397dc8c08a8] [FILTER_AFTER]
DEBUG - 2026-03-09 15:41:48 --> [REQ_ID=9397dc8c08a8] [LIFECYCLE][END] status=200 duration_ms=706.05 memory_delta=4194304
INFO - 2026-03-09 15:41:48 --> [REQ_ID=1824a0116588] [PERF] Execution time=0.705842
DEBUG - 2026-03-09 15:41:48 --> [REQ_ID=9397dc8c08a8] [REQUEST][END]
INFO - 2026-03-09 15:41:48 --> [REQ_ID=9397dc8c08a8] [PERF] Execution time=0.716921
DEBUG - 2026-03-09 15:41:49 --> [REQ_ID=082a8076b2fd] [REQUEST][START] GET /index.php/Management
DEBUG - 2026-03-09 15:41:49 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-09 15:41:49 --> [REQ_ID=082a8076b2fd] [FILTER_BEFORE] /index.php/Management
DEBUG - 2026-03-09 15:41:49 --> [REQ_ID=082a8076b2fd] [ROUTE] Controller=\App\Modules\Management\Controllers\ManagementAdminController Method=index
DEBUG - 2026-03-09 15:41:49 --> [REQ_ID=082a8076b2fd] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Management
DEBUG - 2026-03-09 15:41:49 --> [CSRF] token name=csrf_test_name hash=4db3daefb1715527c672406d10d20b91
DEBUG - 2026-03-09 15:41:49 --> [REQ_ID=082a8076b2fd] [REQUEST][END]
INFO - 2026-03-09 15:41:49 --> [REQ_ID=082a8076b2fd] [PERF] Execution time=0.013780
DEBUG - 2026-03-09 15:41:49 --> [REQ_ID=bd7e05fda5db] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-09 15:41:49 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-09 15:41:49 --> [REQ_ID=bd7e05fda5db] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-09 15:41:49 --> [REQ_ID=bd7e05fda5db] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-09 15:41:49 --> [REQ_ID=bd7e05fda5db] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-09 15:41:49 --> [CSRF] token name=csrf_test_name hash=2516e79f22ab7ae2ce27fb20dfee0db3
DEBUG - 2026-03-09 15:41:49 --> [REQ_ID=17cbf5b8a1c8] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-09 15:41:49 --> [REQ_ID=17cbf5b8a1c8] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-09 15:41:49 --> [REQ_ID=bd7e05fda5db] [FILTER_AFTER]
DEBUG - 2026-03-09 15:41:49 --> [REQ_ID=bd7e05fda5db] [LIFECYCLE][END] status=200 duration_ms=24.33 memory_delta=0
INFO - 2026-03-09 15:41:49 --> [REQ_ID=17cbf5b8a1c8] [PERF] Execution time=0.024265
DEBUG - 2026-03-09 15:41:49 --> [REQ_ID=bd7e05fda5db] [REQUEST][END]
INFO - 2026-03-09 15:41:49 --> [REQ_ID=bd7e05fda5db] [PERF] Execution time=0.036017
DEBUG - 2026-03-09 15:41:49 --> [REQ_ID=b6f4674b9147] [REQUEST][START] GET /index.php/How-It-Works/mymi-gold
DEBUG - 2026-03-09 15:41:49 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-09 15:41:49 --> [REQ_ID=b6f4674b9147] [FILTER_BEFORE] /index.php/How-It-Works/mymi-gold
DEBUG - 2026-03-09 15:41:49 --> [REQ_ID=b6f4674b9147] [ROUTE] Controller=\App\Modules\Blog\Controllers\HowItWorksController Method=show
DEBUG - 2026-03-09 15:41:49 --> [REQ_ID=b6f4674b9147] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/How-It-Works/mymi-gold
DEBUG - 2026-03-09 15:41:49 --> [CSRF] token name=csrf_test_name hash=8d32507297bdd67e5f9e7e3f1d655acc
DEBUG - 2026-03-09 15:41:49 --> [REQ_ID=f63b47522ff8] [INIT] App\Modules\Blog\Controllers\HowItWorksController::GET
INFO - 2026-03-09 15:41:49 --> [REQ_ID=f63b47522ff8] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-09 15:41:49 --> [REQ_ID=f63b47522ff8] [METHOD_ENTRY] show
DEBUG - 2026-03-09 15:41:49 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-09 15:41:49 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-09 15:41:49 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-09 15:41:49 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-09 15:41:49 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-09 15:41:49 --> MyMICoin: guest context detected; skipping user-specific preload.
ERROR - 2026-03-09 15:41:49 --> HowItWorksController failure: Call to undefined method App\Modules\Blog\Controllers\HowItWorksController::respondWithRendered()
INFO - 2026-03-09 15:41:49 --> [REQ_ID=f63b47522ff8] [PERF] Execution time=0.025120
DEBUG - 2026-03-09 15:41:50 --> [REQ_ID=ebfbb4f76e10] [REQUEST][START] GET /index.php/Support
DEBUG - 2026-03-09 15:41:50 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-09 15:41:50 --> [REQ_ID=ebfbb4f76e10] [FILTER_BEFORE] /index.php/Support
DEBUG - 2026-03-09 15:41:50 --> [REQ_ID=ebfbb4f76e10] [ROUTE] Controller=\App\Modules\Support\Controllers\SupportController Method=index
DEBUG - 2026-03-09 15:41:50 --> [REQ_ID=ebfbb4f76e10] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Support
DEBUG - 2026-03-09 15:41:50 --> [CSRF] token name=csrf_test_name hash=5dda713d711d329e6378be22c32a61b4
DEBUG - 2026-03-09 15:41:50 --> [REQ_ID=36be1c8754fb] [INIT] App\Modules\Support\Controllers\SupportController::GET
INFO - 2026-03-09 15:41:50 --> [REQ_ID=36be1c8754fb] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-09 15:41:50 --> [REQ_ID=36be1c8754fb] [METHOD_ENTRY] index
DEBUG - 2026-03-09 15:41:50 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-09 15:41:50 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-09 15:41:50 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-09 15:41:50 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-09 15:41:50 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-09 15:41:50 --> MyMICoin: guest context detected; skipping user-specific preload.
INFO - 2026-03-09 15:41:50 --> [REQ_ID=36be1c8754fb] [MEMORY][commonData:start] 4194304
DEBUG - 2026-03-09 15:41:50 --> [REQ_ID=36be1c8754fb] [VIEW_RENDER] SupportModule\Views\Support\index
INFO - 2026-03-09 15:41:50 --> [REQ_ID=36be1c8754fb] [MEMORY][commonData:start] 4194304
INFO - 2026-03-09 15:41:50 --> themesMemory usage: 4194304
DEBUG - 2026-03-09 15:41:50 --> [REQ_ID=ebfbb4f76e10] [FILTER_AFTER]
DEBUG - 2026-03-09 15:41:50 --> [REQ_ID=ebfbb4f76e10] [LIFECYCLE][END] status=200 duration_ms=39.70 memory_delta=0
INFO - 2026-03-09 15:41:50 --> [REQ_ID=36be1c8754fb] [PERF] Execution time=0.039491
DEBUG - 2026-03-09 15:41:50 --> [REQ_ID=ebfbb4f76e10] [REQUEST][END]
INFO - 2026-03-09 15:41:50 --> [REQ_ID=ebfbb4f76e10] [PERF] Execution time=0.049727
DEBUG - 2026-03-09 15:41:52 --> [REQ_ID=3337e2929c9f] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-09 15:41:52 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-09 15:41:53 --> [REQ_ID=3337e2929c9f] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-09 15:41:53 --> [REQ_ID=3337e2929c9f] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-09 15:41:53 --> [REQ_ID=3337e2929c9f] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-09 15:41:53 --> [CSRF] token name=csrf_test_name hash=1426d7d3306ddd60dfe7ba77e752a3c0
DEBUG - 2026-03-09 15:41:53 --> [REQ_ID=6e568f83a2df] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-09 15:41:53 --> [REQ_ID=6e568f83a2df] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-09 15:41:53 --> [REQ_ID=3337e2929c9f] [FILTER_AFTER]
DEBUG - 2026-03-09 15:41:53 --> [REQ_ID=3337e2929c9f] [LIFECYCLE][END] status=200 duration_ms=89.26 memory_delta=0
INFO - 2026-03-09 15:41:53 --> [REQ_ID=6e568f83a2df] [PERF] Execution time=0.051025
DEBUG - 2026-03-09 15:41:53 --> [REQ_ID=3337e2929c9f] [REQUEST][END]
INFO - 2026-03-09 15:41:53 --> [REQ_ID=3337e2929c9f] [PERF] Execution time=0.209090
DEBUG - 2026-03-09 15:42:15 --> [REQ_ID=34f082c4246e] [REQUEST][START] GET /index.php/How-It-Works/mymi-gold
DEBUG - 2026-03-09 15:42:15 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-09 15:42:15 --> [REQ_ID=34f082c4246e] [FILTER_BEFORE] /index.php/How-It-Works/mymi-gold
DEBUG - 2026-03-09 15:42:15 --> [REQ_ID=34f082c4246e] [ROUTE] Controller=\App\Modules\Blog\Controllers\HowItWorksController Method=show
DEBUG - 2026-03-09 15:42:15 --> [REQ_ID=34f082c4246e] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/How-It-Works/mymi-gold
DEBUG - 2026-03-09 15:42:15 --> [CSRF] token name=csrf_test_name hash=f2bed21e3e8d6338b2edf4b54fb2ef28
DEBUG - 2026-03-09 15:42:15 --> [REQ_ID=104dc7121433] [INIT] App\Modules\Blog\Controllers\HowItWorksController::GET
INFO - 2026-03-09 15:42:15 --> [REQ_ID=104dc7121433] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-09 15:42:15 --> [REQ_ID=104dc7121433] [METHOD_ENTRY] show
DEBUG - 2026-03-09 15:42:15 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-09 15:42:15 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-09 15:42:15 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-09 15:42:15 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-09 15:42:15 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-09 15:42:15 --> MyMICoin: guest context detected; skipping user-specific preload.
ERROR - 2026-03-09 15:42:15 --> HowItWorksController failure: Call to undefined method App\Modules\Blog\Controllers\HowItWorksController::respondWithRendered()
INFO - 2026-03-09 15:42:15 --> [REQ_ID=104dc7121433] [PERF] Execution time=0.022998
DEBUG - 2026-03-09 15:46:16 --> [REQ_ID=1d62cb21030c] [REQUEST][START] HEAD /
DEBUG - 2026-03-09 15:46:16 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-09 15:46:16 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-09 15:46:17 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-09 15:46:17 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-09 15:46:17 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-09 15:51:16 --> [REQ_ID=c7db141b810c] [REQUEST][START] HEAD /
DEBUG - 2026-03-09 15:51:16 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-09 15:51:16 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-09 15:51:16 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-09 15:51:16 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-09 15:51:16 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-09 15:56:16 --> [REQ_ID=fadb84643469] [REQUEST][START] HEAD /
DEBUG - 2026-03-09 15:56:16 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-09 15:56:16 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-09 15:56:16 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-09 15:56:16 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-09 15:56:16 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-09 15:56:26 --> [REQ_ID=628d8e63afa9] [REQUEST][START] GET /index.php/How-It-Works/Investor-Profile
DEBUG - 2026-03-09 15:56:26 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-09 15:56:27 --> [REQ_ID=628d8e63afa9] [FILTER_BEFORE] /index.php/How-It-Works/Investor-Profile
DEBUG - 2026-03-09 15:56:27 --> [REQ_ID=628d8e63afa9] [ROUTE] Controller=\App\Modules\Blog\Controllers\HowItWorksController Method=show
DEBUG - 2026-03-09 15:56:27 --> [REQ_ID=628d8e63afa9] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/How-It-Works/Investor-Profile
DEBUG - 2026-03-09 15:56:27 --> [CSRF] token name=csrf_test_name hash=5cd598bc7f8ff462b39e2a770366a918
DEBUG - 2026-03-09 15:56:27 --> [REQ_ID=14acda9e926d] [INIT] App\Modules\Blog\Controllers\HowItWorksController::GET
INFO - 2026-03-09 15:56:27 --> [REQ_ID=14acda9e926d] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-09 15:56:27 --> [REQ_ID=14acda9e926d] [METHOD_ENTRY] show
DEBUG - 2026-03-09 15:56:27 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-09 15:56:27 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-09 15:56:27 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-09 15:56:27 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-09 15:56:27 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-09 15:56:27 --> MyMICoin: guest context detected; skipping user-specific preload.
ERROR - 2026-03-09 15:56:27 --> HowItWorksController failure: investor-profile
CRITICAL - 2026-03-09 15:56:27 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: GET, Route: How-It-Works/Investor-Profile]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-09 15:56:27 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-09 15:56:27 --> [404] URI=https://www.mymiwallet.com/index.php/How-It-Works/Investor-Profile
WARNING - 2026-03-09 15:56:27 --> 404 route miss: https://www.mymiwallet.com/index.php/How-It-Works/Investor-Profile | referrer: none
INFO - 2026-03-09 15:56:27 --> [REQ_ID=14acda9e926d] [PERF] Execution time=0.088920
DEBUG - 2026-03-09 16:00:01 --> [REQ_ID=9335fb9b0ced] [REQUEST][START] GET /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-09 16:00:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-09 16:00:01 --> [REQ_ID=9335fb9b0ced] [FILTER_BEFORE] /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-09 16:00:01 --> [REQ_ID=9335fb9b0ced] [ROUTE] Controller=\App\Modules\Management\Controllers\ManagementAPIController Method=Run_CRON_Tasks
DEBUG - 2026-03-09 16:00:01 --> [REQ_ID=9335fb9b0ced] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-09 16:00:01 --> [REQ_ID=9335fb9b0ced] [REQUEST][END]
INFO - 2026-03-09 16:00:01 --> [REQ_ID=9335fb9b0ced] [PERF] Execution time=0.043352
DEBUG - 2026-03-09 16:01:16 --> [REQ_ID=95d12b6c0c4e] [REQUEST][START] HEAD /
DEBUG - 2026-03-09 16:01:16 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-09 16:01:16 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-09 16:01:16 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-09 16:01:16 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-09 16:01:16 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-09 16:06:16 --> [REQ_ID=999ae9faef45] [REQUEST][START] HEAD /
DEBUG - 2026-03-09 16:06:16 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-09 16:06:16 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-09 16:06:17 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-09 16:06:17 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-09 16:06:17 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-09 16:11:16 --> [REQ_ID=76893705407a] [REQUEST][START] HEAD /
DEBUG - 2026-03-09 16:11:16 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-09 16:11:16 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-09 16:11:17 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-09 16:11:17 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-09 16:11:17 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-09 16:12:56 --> [REQ_ID=6c1704c19416] [REQUEST][START] GET /
DEBUG - 2026-03-09 16:12:56 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-09 16:12:56 --> [REQ_ID=6c1704c19416] [FILTER_BEFORE] /
DEBUG - 2026-03-09 16:12:56 --> [REQ_ID=6c1704c19416] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-09 16:12:56 --> [REQ_ID=6c1704c19416] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-09 16:12:56 --> [CSRF] token name=csrf_test_name hash=f1918004ea3e57940bf71d783d621905
DEBUG - 2026-03-09 16:12:56 --> [REQ_ID=d2b3c90db170] [INIT] App\Controllers\Home::GET
INFO - 2026-03-09 16:12:56 --> [REQ_ID=d2b3c90db170] [MEMORY][controller-start] 6291456
INFO - 2026-03-09 16:12:56 --> [REQ_ID=d2b3c90db170] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-09 16:12:56 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-09 16:12:57 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-03-09 16:12:57 --> [REQ_ID=d2b3c90db170] [VIEW_RENDER] themes/public/home
INFO - 2026-03-09 16:12:57 --> [REQ_ID=d2b3c90db170] [MEMORY][commonData:start] 10485760
INFO - 2026-03-09 16:12:57 --> themesMemory usage: 10485760
DEBUG - 2026-03-09 16:12:57 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-09 16:12:57 --> [REQ_ID=6c1704c19416] [FILTER_AFTER]
DEBUG - 2026-03-09 16:12:57 --> [REQ_ID=6c1704c19416] [LIFECYCLE][END] status=200 duration_ms=642.57 memory_delta=4194304
INFO - 2026-03-09 16:12:57 --> [REQ_ID=d2b3c90db170] [PERF] Execution time=0.640548
DEBUG - 2026-03-09 16:12:57 --> [REQ_ID=6c1704c19416] [REQUEST][END]
INFO - 2026-03-09 16:12:57 --> [REQ_ID=6c1704c19416] [PERF] Execution time=0.682421
DEBUG - 2026-03-09 16:15:01 --> [REQ_ID=8bb68ccbb6d0] [REQUEST][START] GET /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-09 16:15:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-09 16:15:01 --> [REQ_ID=8bb68ccbb6d0] [FILTER_BEFORE] /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-09 16:15:01 --> [REQ_ID=8bb68ccbb6d0] [ROUTE] Controller=\App\Modules\APIs\Controllers\AlertsAPIController Method=fetchEmailAlerts
DEBUG - 2026-03-09 16:15:01 --> [REQ_ID=8bb68ccbb6d0] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-09 16:15:01 --> [REQ_ID=8bb68ccbb6d0] [REQUEST][END]
INFO - 2026-03-09 16:15:01 --> [REQ_ID=8bb68ccbb6d0] [PERF] Execution time=0.048374
DEBUG - 2026-03-09 16:16:16 --> [REQ_ID=334c0ec3f7b5] [REQUEST][START] HEAD /
DEBUG - 2026-03-09 16:16:16 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-09 16:16:16 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-09 16:16:16 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-09 16:16:16 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-09 16:16:16 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-09 16:21:16 --> [REQ_ID=e182e99df705] [REQUEST][START] HEAD /
DEBUG - 2026-03-09 16:21:16 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-09 16:21:16 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-09 16:21:16 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-09 16:21:16 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-09 16:21:16 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-09 16:26:16 --> [REQ_ID=7bc7505ac459] [REQUEST][START] HEAD /
DEBUG - 2026-03-09 16:26:16 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-09 16:26:16 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-09 16:26:17 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-09 16:26:17 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-09 16:26:17 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-09 16:28:56 --> [REQ_ID=b3df26c816e5] [REQUEST][START] GET /
DEBUG - 2026-03-09 16:28:56 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-09 16:28:56 --> [REQ_ID=b3df26c816e5] [FILTER_BEFORE] /
DEBUG - 2026-03-09 16:28:56 --> [REQ_ID=b3df26c816e5] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-09 16:28:56 --> [REQ_ID=b3df26c816e5] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-09 16:28:56 --> [CSRF] token name=csrf_test_name hash=af4132de7aafb9e11cb64c2b9461568d
DEBUG - 2026-03-09 16:28:56 --> [REQ_ID=009ac4365702] [INIT] App\Controllers\Home::GET
INFO - 2026-03-09 16:28:56 --> [REQ_ID=009ac4365702] [MEMORY][controller-start] 6291456
INFO - 2026-03-09 16:28:56 --> [REQ_ID=009ac4365702] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-09 16:28:56 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-09 16:28:56 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-03-09 16:28:56 --> [REQ_ID=009ac4365702] [VIEW_RENDER] themes/public/home
INFO - 2026-03-09 16:28:56 --> [REQ_ID=009ac4365702] [MEMORY][commonData:start] 10485760
INFO - 2026-03-09 16:28:56 --> themesMemory usage: 10485760
DEBUG - 2026-03-09 16:28:56 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-09 16:28:56 --> [REQ_ID=b3df26c816e5] [FILTER_AFTER]
DEBUG - 2026-03-09 16:28:56 --> [REQ_ID=b3df26c816e5] [LIFECYCLE][END] status=200 duration_ms=874.21 memory_delta=4194304
INFO - 2026-03-09 16:28:56 --> [REQ_ID=009ac4365702] [PERF] Execution time=0.872061
DEBUG - 2026-03-09 16:28:56 --> [REQ_ID=b3df26c816e5] [REQUEST][END]
INFO - 2026-03-09 16:28:56 --> [REQ_ID=b3df26c816e5] [PERF] Execution time=0.912799
DEBUG - 2026-03-09 16:31:16 --> [REQ_ID=b0c679984a1b] [REQUEST][START] HEAD /
DEBUG - 2026-03-09 16:31:16 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-09 16:31:16 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-09 16:31:16 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-09 16:31:16 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-09 16:31:16 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-09 16:32:30 --> [REQ_ID=8bbfdda9d97c] [REQUEST][START] GET /
DEBUG - 2026-03-09 16:32:30 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-09 16:32:30 --> [REQ_ID=8bbfdda9d97c] [FILTER_BEFORE] /
DEBUG - 2026-03-09 16:32:30 --> [REQ_ID=8bbfdda9d97c] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-09 16:32:30 --> [REQ_ID=8bbfdda9d97c] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-09 16:32:30 --> [CSRF] token name=csrf_test_name hash=125cc2565553a5aa37a98d32fefbdde5
DEBUG - 2026-03-09 16:32:30 --> [REQ_ID=68fa18d07f27] [INIT] App\Controllers\Home::GET
INFO - 2026-03-09 16:32:30 --> [REQ_ID=68fa18d07f27] [MEMORY][controller-start] 4194304
INFO - 2026-03-09 16:32:30 --> [REQ_ID=68fa18d07f27] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-09 16:32:30 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-09 16:32:31 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
DEBUG - 2026-03-09 16:32:31 --> [REQ_ID=68fa18d07f27] [VIEW_RENDER] themes/public/home
INFO - 2026-03-09 16:32:31 --> [REQ_ID=68fa18d07f27] [MEMORY][commonData:start] 8388608
INFO - 2026-03-09 16:32:31 --> themesMemory usage: 8388608
DEBUG - 2026-03-09 16:32:31 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-09 16:32:31 --> [REQ_ID=8bbfdda9d97c] [FILTER_AFTER]
DEBUG - 2026-03-09 16:32:31 --> [REQ_ID=8bbfdda9d97c] [LIFECYCLE][END] status=200 duration_ms=617.39 memory_delta=4194304
INFO - 2026-03-09 16:32:31 --> [REQ_ID=68fa18d07f27] [PERF] Execution time=0.614889
DEBUG - 2026-03-09 16:32:31 --> [REQ_ID=8bbfdda9d97c] [REQUEST][END]
INFO - 2026-03-09 16:32:31 --> [REQ_ID=8bbfdda9d97c] [PERF] Execution time=0.636721
DEBUG - 2026-03-09 16:34:18 --> [REQ_ID=a57a22344367] [REQUEST][START] GET /
DEBUG - 2026-03-09 16:34:18 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-09 16:34:18 --> [REQ_ID=a57a22344367] [FILTER_BEFORE] /
DEBUG - 2026-03-09 16:34:18 --> [REQ_ID=a57a22344367] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-09 16:34:18 --> [REQ_ID=a57a22344367] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-09 16:34:18 --> [CSRF] token name=csrf_test_name hash=e15860ce7e640b9e16db029c5fe7e3de
DEBUG - 2026-03-09 16:34:18 --> [REQ_ID=3878f7385e30] [INIT] App\Controllers\Home::GET
INFO - 2026-03-09 16:34:18 --> [REQ_ID=3878f7385e30] [MEMORY][controller-start] 6291456
INFO - 2026-03-09 16:34:19 --> [REQ_ID=3878f7385e30] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-09 16:34:19 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-09 16:34:19 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
DEBUG - 2026-03-09 16:34:19 --> [REQ_ID=3878f7385e30] [VIEW_RENDER] themes/public/home
INFO - 2026-03-09 16:34:19 --> [REQ_ID=3878f7385e30] [MEMORY][commonData:start] 10485760
INFO - 2026-03-09 16:34:19 --> themesMemory usage: 10485760
DEBUG - 2026-03-09 16:34:19 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-09 16:34:19 --> [REQ_ID=a57a22344367] [FILTER_AFTER]
DEBUG - 2026-03-09 16:34:19 --> [REQ_ID=a57a22344367] [LIFECYCLE][END] status=200 duration_ms=890.18 memory_delta=4194304
INFO - 2026-03-09 16:34:19 --> [REQ_ID=3878f7385e30] [PERF] Execution time=0.888241
DEBUG - 2026-03-09 16:34:19 --> [REQ_ID=a57a22344367] [REQUEST][END]
INFO - 2026-03-09 16:34:19 --> [REQ_ID=a57a22344367] [PERF] Execution time=0.929098
DEBUG - 2026-03-09 16:36:16 --> [REQ_ID=8ca7fe541d49] [REQUEST][START] HEAD /
DEBUG - 2026-03-09 16:36:16 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-09 16:36:16 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-09 16:36:16 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-09 16:36:16 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-09 16:36:16 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-09 16:41:21 --> [REQ_ID=22c5885c53fd] [REQUEST][START] HEAD /
DEBUG - 2026-03-09 16:41:21 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-09 16:41:21 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-09 16:41:21 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-09 16:41:21 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-09 16:41:21 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-09 16:46:16 --> [REQ_ID=c10d07db083b] [REQUEST][START] HEAD /
DEBUG - 2026-03-09 16:46:16 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-09 16:46:16 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-09 16:46:16 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-09 16:46:16 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-09 16:46:16 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-09 16:51:16 --> [REQ_ID=8b6c6f79c24f] [REQUEST][START] HEAD /
DEBUG - 2026-03-09 16:51:16 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-09 16:51:16 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-09 16:51:16 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-09 16:51:16 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-09 16:51:16 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-09 16:56:16 --> [REQ_ID=eb4238eb8fcb] [REQUEST][START] HEAD /
DEBUG - 2026-03-09 16:56:16 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-09 16:56:16 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-09 16:56:16 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-09 16:56:16 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-09 16:56:16 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-09 17:00:01 --> [REQ_ID=6034122944e9] [REQUEST][START] GET /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-09 17:00:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-09 17:00:01 --> [REQ_ID=6034122944e9] [FILTER_BEFORE] /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-09 17:00:01 --> [REQ_ID=6034122944e9] [ROUTE] Controller=\App\Modules\Management\Controllers\ManagementAPIController Method=Run_CRON_Tasks
DEBUG - 2026-03-09 17:00:01 --> [REQ_ID=6034122944e9] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-09 17:00:01 --> [REQ_ID=6034122944e9] [REQUEST][END]
INFO - 2026-03-09 17:00:01 --> [REQ_ID=6034122944e9] [PERF] Execution time=0.037206
DEBUG - 2026-03-09 17:01:16 --> [REQ_ID=808a0111d95a] [REQUEST][START] HEAD /
DEBUG - 2026-03-09 17:01:16 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-09 17:01:16 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-09 17:01:16 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-09 17:01:16 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-09 17:01:16 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-09 17:01:40 --> [REQ_ID=267fd0ab6446] [REQUEST][START] GET /index.php/Knowledgebase
DEBUG - 2026-03-09 17:01:40 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-09 17:01:40 --> [REQ_ID=267fd0ab6446] [REQUEST][END]
INFO - 2026-03-09 17:01:40 --> [REQ_ID=267fd0ab6446] [PERF] Execution time=0.016528
DEBUG - 2026-03-09 17:06:16 --> [REQ_ID=c0b4eb1a9ec0] [REQUEST][START] HEAD /
DEBUG - 2026-03-09 17:06:16 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-09 17:06:16 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-09 17:06:16 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-09 17:06:16 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-09 17:06:16 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-09 17:11:16 --> [REQ_ID=8f38ad905ae2] [REQUEST][START] HEAD /
DEBUG - 2026-03-09 17:11:16 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-09 17:11:16 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-09 17:11:16 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-09 17:11:16 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-09 17:11:16 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-09 17:15:01 --> [REQ_ID=e8988b4292ab] [REQUEST][START] GET /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-09 17:15:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-09 17:15:01 --> [REQ_ID=e8988b4292ab] [FILTER_BEFORE] /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-09 17:15:01 --> [REQ_ID=e8988b4292ab] [ROUTE] Controller=\App\Modules\APIs\Controllers\AlertsAPIController Method=fetchEmailAlerts
DEBUG - 2026-03-09 17:15:01 --> [REQ_ID=e8988b4292ab] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-09 17:15:01 --> [REQ_ID=e8988b4292ab] [REQUEST][END]
INFO - 2026-03-09 17:15:01 --> [REQ_ID=e8988b4292ab] [PERF] Execution time=0.049126
DEBUG - 2026-03-09 17:16:16 --> [REQ_ID=4d407407a1a6] [REQUEST][START] HEAD /
DEBUG - 2026-03-09 17:16:16 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-09 17:16:16 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-09 17:16:16 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-09 17:16:16 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-09 17:16:16 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-09 17:21:16 --> [REQ_ID=4ccab257a029] [REQUEST][START] HEAD /
DEBUG - 2026-03-09 17:21:16 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-09 17:21:16 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-09 17:21:16 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-09 17:21:16 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-09 17:21:16 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-09 17:22:42 --> [REQ_ID=e7745c6c10c1] [REQUEST][START] GET /
DEBUG - 2026-03-09 17:22:42 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-09 17:22:42 --> [REQ_ID=e7745c6c10c1] [REQUEST][END]
INFO - 2026-03-09 17:22:42 --> [REQ_ID=e7745c6c10c1] [PERF] Execution time=0.038969
DEBUG - 2026-03-09 17:26:16 --> [REQ_ID=508daf704b2d] [REQUEST][START] HEAD /
DEBUG - 2026-03-09 17:26:16 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-09 17:26:16 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-09 17:26:17 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-09 17:26:17 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-09 17:26:17 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-09 17:29:56 --> [REQ_ID=3b1994249f99] [REQUEST][START] GET /index.php
DEBUG - 2026-03-09 17:29:56 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-09 17:29:56 --> [REQ_ID=3b1994249f99] [REQUEST][END]
INFO - 2026-03-09 17:29:56 --> [REQ_ID=3b1994249f99] [PERF] Execution time=0.038789
DEBUG - 2026-03-09 17:31:16 --> [REQ_ID=c1b820696216] [REQUEST][START] HEAD /
DEBUG - 2026-03-09 17:31:16 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-09 17:31:16 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-09 17:31:16 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-09 17:31:16 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-09 17:31:16 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-09 17:36:16 --> [REQ_ID=817cc7946016] [REQUEST][START] HEAD /
DEBUG - 2026-03-09 17:36:16 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-09 17:36:16 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-09 17:36:16 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-09 17:36:16 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-09 17:36:16 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-09 17:41:16 --> [REQ_ID=e3dbcb9d612e] [REQUEST][START] HEAD /
DEBUG - 2026-03-09 17:41:16 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-09 17:41:16 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-09 17:41:16 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-09 17:41:16 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-09 17:41:16 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-09 17:46:16 --> [REQ_ID=cdab3d81e6ad] [REQUEST][START] HEAD /
DEBUG - 2026-03-09 17:46:16 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-09 17:46:16 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-09 17:46:16 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-09 17:46:16 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-09 17:46:16 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-09 17:51:16 --> [REQ_ID=1337e73405a4] [REQUEST][START] HEAD /
DEBUG - 2026-03-09 17:51:16 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-09 17:51:16 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-09 17:51:16 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-09 17:51:16 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-09 17:51:16 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-09 17:56:16 --> [REQ_ID=28a7dddf239b] [REQUEST][START] HEAD /
DEBUG - 2026-03-09 17:56:16 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-09 17:56:16 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-09 17:56:16 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-09 17:56:16 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-09 17:56:16 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-09 18:00:01 --> [REQ_ID=a568d76d78c0] [REQUEST][START] GET /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-09 18:00:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-09 18:00:01 --> [REQ_ID=a568d76d78c0] [FILTER_BEFORE] /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-09 18:00:01 --> [REQ_ID=a568d76d78c0] [ROUTE] Controller=\App\Modules\Management\Controllers\ManagementAPIController Method=Run_CRON_Tasks
DEBUG - 2026-03-09 18:00:01 --> [REQ_ID=a568d76d78c0] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-09 18:00:01 --> [REQ_ID=a568d76d78c0] [REQUEST][END]
INFO - 2026-03-09 18:00:01 --> [REQ_ID=a568d76d78c0] [PERF] Execution time=0.050244
DEBUG - 2026-03-09 18:01:16 --> [REQ_ID=fcae2ba6f1a3] [REQUEST][START] HEAD /
DEBUG - 2026-03-09 18:01:16 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-09 18:01:16 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-09 18:01:16 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-09 18:01:16 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-09 18:01:16 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-09 18:06:16 --> [REQ_ID=dd9cb06aa82a] [REQUEST][START] HEAD /
DEBUG - 2026-03-09 18:06:16 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-09 18:06:16 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-09 18:06:16 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-09 18:06:16 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-09 18:06:16 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-09 18:11:16 --> [REQ_ID=41ca53b9038e] [REQUEST][START] HEAD /
DEBUG - 2026-03-09 18:11:16 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-09 18:11:16 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-09 18:11:16 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-09 18:11:16 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-09 18:11:16 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-09 18:15:01 --> [REQ_ID=b02dca91c362] [REQUEST][START] GET /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-09 18:15:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-09 18:15:01 --> [REQ_ID=b02dca91c362] [FILTER_BEFORE] /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-09 18:15:01 --> [REQ_ID=b02dca91c362] [ROUTE] Controller=\App\Modules\APIs\Controllers\AlertsAPIController Method=fetchEmailAlerts
DEBUG - 2026-03-09 18:15:01 --> [REQ_ID=b02dca91c362] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-09 18:15:01 --> [REQ_ID=b02dca91c362] [REQUEST][END]
INFO - 2026-03-09 18:15:01 --> [REQ_ID=b02dca91c362] [PERF] Execution time=0.045819
DEBUG - 2026-03-09 18:16:16 --> [REQ_ID=b8841529c4c2] [REQUEST][START] HEAD /
DEBUG - 2026-03-09 18:16:16 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-09 18:16:16 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-09 18:16:16 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-09 18:16:16 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-09 18:16:16 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-09 18:19:05 --> [REQ_ID=c6fa8f961dc9] [REQUEST][START] GET /
DEBUG - 2026-03-09 18:19:05 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-09 18:19:05 --> [REQ_ID=c6fa8f961dc9] [FILTER_BEFORE] /
DEBUG - 2026-03-09 18:19:05 --> [REQ_ID=c6fa8f961dc9] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-09 18:19:05 --> [REQ_ID=c6fa8f961dc9] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-09 18:19:05 --> [CSRF] token name=csrf_test_name hash=6b35d0a74af4571fb81f8bcaf8500894
DEBUG - 2026-03-09 18:19:05 --> [REQ_ID=a1aeb7fdf00d] [INIT] App\Controllers\Home::GET
INFO - 2026-03-09 18:19:05 --> [REQ_ID=a1aeb7fdf00d] [MEMORY][controller-start] 6291456
INFO - 2026-03-09 18:19:05 --> [REQ_ID=a1aeb7fdf00d] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-09 18:19:05 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-09 18:19:06 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-03-09 18:19:06 --> [REQ_ID=a1aeb7fdf00d] [VIEW_RENDER] themes/public/home
INFO - 2026-03-09 18:19:06 --> [REQ_ID=a1aeb7fdf00d] [MEMORY][commonData:start] 10485760
INFO - 2026-03-09 18:19:06 --> themesMemory usage: 10485760
DEBUG - 2026-03-09 18:19:06 --> [MetaService] slug= pageName=Home cacheHit= path=DB
DEBUG - 2026-03-09 18:19:06 --> [REQ_ID=c6fa8f961dc9] [FILTER_AFTER]
DEBUG - 2026-03-09 18:19:06 --> [REQ_ID=c6fa8f961dc9] [LIFECYCLE][END] status=200 duration_ms=740.80 memory_delta=4194304
INFO - 2026-03-09 18:19:06 --> [REQ_ID=a1aeb7fdf00d] [PERF] Execution time=0.738863
DEBUG - 2026-03-09 18:19:06 --> [REQ_ID=c6fa8f961dc9] [REQUEST][END]
INFO - 2026-03-09 18:19:06 --> [REQ_ID=c6fa8f961dc9] [PERF] Execution time=0.779586
DEBUG - 2026-03-09 18:21:08 --> [REQ_ID=dcad9059cf4b] [REQUEST][START] GET /
DEBUG - 2026-03-09 18:21:08 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-09 18:21:08 --> [REQ_ID=dcad9059cf4b] [FILTER_BEFORE] /
DEBUG - 2026-03-09 18:21:08 --> [REQ_ID=dcad9059cf4b] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-09 18:21:08 --> [REQ_ID=dcad9059cf4b] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-09 18:21:08 --> [CSRF] token name=csrf_test_name hash=51b2f9f427caac7ce75f4324c4aa12a2
DEBUG - 2026-03-09 18:21:08 --> [REQ_ID=09ad73228645] [INIT] App\Controllers\Home::GET
INFO - 2026-03-09 18:21:08 --> [REQ_ID=09ad73228645] [MEMORY][controller-start] 6291456
INFO - 2026-03-09 18:21:08 --> [REQ_ID=09ad73228645] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-09 18:21:08 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-09 18:21:08 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
DEBUG - 2026-03-09 18:21:08 --> [REQ_ID=09ad73228645] [VIEW_RENDER] themes/public/home
INFO - 2026-03-09 18:21:08 --> [REQ_ID=09ad73228645] [MEMORY][commonData:start] 10485760
INFO - 2026-03-09 18:21:08 --> themesMemory usage: 10485760
DEBUG - 2026-03-09 18:21:08 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-09 18:21:08 --> [REQ_ID=dcad9059cf4b] [FILTER_AFTER]
DEBUG - 2026-03-09 18:21:08 --> [REQ_ID=dcad9059cf4b] [LIFECYCLE][END] status=200 duration_ms=704.23 memory_delta=4194304
INFO - 2026-03-09 18:21:08 --> [REQ_ID=09ad73228645] [PERF] Execution time=0.702135
DEBUG - 2026-03-09 18:21:08 --> [REQ_ID=dcad9059cf4b] [REQUEST][END]
INFO - 2026-03-09 18:21:08 --> [REQ_ID=dcad9059cf4b] [PERF] Execution time=0.743346
DEBUG - 2026-03-09 18:21:16 --> [REQ_ID=68ed0bef7a46] [REQUEST][START] HEAD /
DEBUG - 2026-03-09 18:21:16 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-09 18:21:16 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-09 18:21:16 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-09 18:21:16 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-09 18:21:16 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-09 18:26:16 --> [REQ_ID=f0a55c8e72eb] [REQUEST][START] HEAD /
DEBUG - 2026-03-09 18:26:16 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-09 18:26:16 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-09 18:26:17 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-09 18:26:17 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-09 18:26:17 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-09 18:29:58 --> [REQ_ID=1855a30a0e07] [REQUEST][START] HEAD /
DEBUG - 2026-03-09 18:29:58 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-09 18:29:58 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-09 18:29:58 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-09 18:29:58 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-09 18:29:58 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://mymiwallet.com/
DEBUG - 2026-03-09 18:31:16 --> [REQ_ID=207ffbce7790] [REQUEST][START] HEAD /
DEBUG - 2026-03-09 18:31:16 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-09 18:31:16 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-09 18:31:16 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-09 18:31:16 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-09 18:31:16 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-09 18:36:16 --> [REQ_ID=6b467e399b5a] [REQUEST][START] HEAD /
DEBUG - 2026-03-09 18:36:16 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-09 18:36:16 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-09 18:36:16 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-09 18:36:16 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-09 18:36:16 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-09 18:41:16 --> [REQ_ID=4b7ae6a47ed5] [REQUEST][START] HEAD /
DEBUG - 2026-03-09 18:41:16 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-09 18:41:16 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-09 18:41:16 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-09 18:41:16 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-09 18:41:16 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-09 18:42:10 --> [REQ_ID=879ae07c85e3] [REQUEST][START] GET /index.php/Dashboard
DEBUG - 2026-03-09 18:42:10 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-09 18:42:10 --> [REQ_ID=879ae07c85e3] [FILTER_BEFORE] /index.php/Dashboard
DEBUG - 2026-03-09 18:42:10 --> [REQ_ID=879ae07c85e3] [ROUTE] Controller=\App\Modules\User\Controllers\DashboardController Method=index
DEBUG - 2026-03-09 18:42:10 --> [REQ_ID=879ae07c85e3] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Dashboard
DEBUG - 2026-03-09 18:42:10 --> [CSRF] token name=csrf_test_name hash=d09f0af3ffc43d8873d50deb3d5cab65
DEBUG - 2026-03-09 18:42:10 --> [REQ_ID=879ae07c85e3] [REQUEST][END]
INFO - 2026-03-09 18:42:10 --> [REQ_ID=879ae07c85e3] [PERF] Execution time=0.040737
DEBUG - 2026-03-09 18:46:16 --> [REQ_ID=a13acd9eaf8f] [REQUEST][START] HEAD /
DEBUG - 2026-03-09 18:46:16 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-09 18:46:16 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-09 18:46:17 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-09 18:46:17 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-09 18:46:17 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-09 18:50:51 --> [REQ_ID=cb9ff7c32ec0] [REQUEST][START] GET /index.php/Management/Marketing/Ideas
DEBUG - 2026-03-09 18:50:51 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-09 18:50:51 --> [REQ_ID=cb9ff7c32ec0] [REQUEST][END]
INFO - 2026-03-09 18:50:51 --> [REQ_ID=cb9ff7c32ec0] [PERF] Execution time=0.046452
DEBUG - 2026-03-09 18:51:16 --> [REQ_ID=0bf0706ac936] [REQUEST][START] HEAD /
DEBUG - 2026-03-09 18:51:16 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-09 18:51:16 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-09 18:51:16 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-09 18:51:16 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-09 18:51:16 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-09 18:56:16 --> [REQ_ID=e82854db93f2] [REQUEST][START] HEAD /
DEBUG - 2026-03-09 18:56:16 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-09 18:56:16 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-09 18:56:17 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-09 18:56:17 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-09 18:56:17 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-09 19:00:02 --> [REQ_ID=fcd2b23bd506] [REQUEST][START] GET /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-09 19:00:02 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-09 19:00:02 --> [REQ_ID=fcd2b23bd506] [FILTER_BEFORE] /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-09 19:00:02 --> [REQ_ID=fcd2b23bd506] [ROUTE] Controller=\App\Modules\Management\Controllers\ManagementAPIController Method=Run_CRON_Tasks
DEBUG - 2026-03-09 19:00:02 --> [REQ_ID=fcd2b23bd506] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-09 19:00:02 --> [REQ_ID=fcd2b23bd506] [REQUEST][END]
INFO - 2026-03-09 19:00:02 --> [REQ_ID=fcd2b23bd506] [PERF] Execution time=0.049484
DEBUG - 2026-03-09 19:01:16 --> [REQ_ID=85fbe5427a22] [REQUEST][START] HEAD /
DEBUG - 2026-03-09 19:01:16 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-09 19:01:16 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-09 19:01:16 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-09 19:01:16 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-09 19:01:16 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-09 19:06:16 --> [REQ_ID=f24d18d8b7d5] [REQUEST][START] HEAD /
DEBUG - 2026-03-09 19:06:16 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-09 19:06:16 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-09 19:06:16 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-09 19:06:16 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-09 19:06:16 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-09 19:11:19 --> [REQ_ID=cbcfc32cec5c] [REQUEST][START] GET /index.php/
DEBUG - 2026-03-09 19:11:19 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-09 19:11:19 --> [REQ_ID=cbcfc32cec5c] [REQUEST][END]
INFO - 2026-03-09 19:11:19 --> [REQ_ID=cbcfc32cec5c] [PERF] Execution time=0.038196
DEBUG - 2026-03-09 19:11:21 --> [REQ_ID=f3616196b14e] [REQUEST][START] HEAD /
DEBUG - 2026-03-09 19:11:21 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-09 19:11:21 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-09 19:11:21 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-09 19:11:21 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-09 19:11:21 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-09 19:15:01 --> [REQ_ID=b911ab3491af] [REQUEST][START] GET /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-09 19:15:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-09 19:15:01 --> [REQ_ID=b911ab3491af] [FILTER_BEFORE] /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-09 19:15:01 --> [REQ_ID=b911ab3491af] [ROUTE] Controller=\App\Modules\APIs\Controllers\AlertsAPIController Method=fetchEmailAlerts
DEBUG - 2026-03-09 19:15:01 --> [REQ_ID=b911ab3491af] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-09 19:15:01 --> [REQ_ID=b911ab3491af] [REQUEST][END]
INFO - 2026-03-09 19:15:01 --> [REQ_ID=b911ab3491af] [PERF] Execution time=0.048312
DEBUG - 2026-03-09 19:16:16 --> [REQ_ID=f960acd1ed2f] [REQUEST][START] HEAD /
DEBUG - 2026-03-09 19:16:16 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-09 19:16:16 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-09 19:16:16 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-09 19:16:16 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-09 19:16:16 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-09 19:21:16 --> [REQ_ID=fc0daa2095e8] [REQUEST][START] HEAD /
DEBUG - 2026-03-09 19:21:16 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-09 19:21:16 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-09 19:21:16 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-09 19:21:16 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-09 19:21:16 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-09 19:26:16 --> [REQ_ID=57160419f14e] [REQUEST][START] HEAD /
DEBUG - 2026-03-09 19:26:16 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-09 19:26:16 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-09 19:26:16 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-09 19:26:16 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-09 19:26:16 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-09 19:30:08 --> [REQ_ID=0cb678a982bd] [REQUEST][START] GET /
DEBUG - 2026-03-09 19:30:08 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-09 19:30:08 --> [REQ_ID=0cb678a982bd] [FILTER_BEFORE] /
DEBUG - 2026-03-09 19:30:08 --> [REQ_ID=0cb678a982bd] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-09 19:30:08 --> [REQ_ID=0cb678a982bd] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-09 19:30:08 --> [CSRF] token name=csrf_test_name hash=c9743b7473962051551d3092cb8094e1
DEBUG - 2026-03-09 19:30:08 --> [REQ_ID=cf2ff3e2f9ac] [INIT] App\Controllers\Home::GET
INFO - 2026-03-09 19:30:08 --> [REQ_ID=cf2ff3e2f9ac] [MEMORY][controller-start] 6291456
INFO - 2026-03-09 19:30:08 --> [REQ_ID=cf2ff3e2f9ac] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-09 19:30:08 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-09 19:30:09 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-03-09 19:30:09 --> [REQ_ID=cf2ff3e2f9ac] [VIEW_RENDER] themes/public/home
INFO - 2026-03-09 19:30:09 --> [REQ_ID=cf2ff3e2f9ac] [MEMORY][commonData:start] 10485760
INFO - 2026-03-09 19:30:09 --> themesMemory usage: 10485760
DEBUG - 2026-03-09 19:30:09 --> [MetaService] slug= pageName=Home cacheHit= path=DB
DEBUG - 2026-03-09 19:30:09 --> [REQ_ID=0cb678a982bd] [FILTER_AFTER]
DEBUG - 2026-03-09 19:30:09 --> [REQ_ID=0cb678a982bd] [LIFECYCLE][END] status=200 duration_ms=705.47 memory_delta=4194304
INFO - 2026-03-09 19:30:09 --> [REQ_ID=cf2ff3e2f9ac] [PERF] Execution time=0.703688
DEBUG - 2026-03-09 19:30:09 --> [REQ_ID=0cb678a982bd] [REQUEST][END]
INFO - 2026-03-09 19:30:09 --> [REQ_ID=0cb678a982bd] [PERF] Execution time=0.744115
DEBUG - 2026-03-09 19:31:16 --> [REQ_ID=e06f4b75bc4c] [REQUEST][START] HEAD /
DEBUG - 2026-03-09 19:31:16 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-09 19:31:16 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-09 19:31:16 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-09 19:31:16 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-09 19:31:16 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-09 19:36:16 --> [REQ_ID=6d9998e27c42] [REQUEST][START] HEAD /
DEBUG - 2026-03-09 19:36:16 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-09 19:36:16 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-09 19:36:16 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-09 19:36:16 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-09 19:36:16 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-09 19:41:16 --> [REQ_ID=c18fa1052b74] [REQUEST][START] HEAD /
DEBUG - 2026-03-09 19:41:16 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-09 19:41:16 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-09 19:41:16 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-09 19:41:16 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-09 19:41:16 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-09 19:46:16 --> [REQ_ID=d7206137125e] [REQUEST][START] HEAD /
DEBUG - 2026-03-09 19:46:16 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-09 19:46:16 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-09 19:46:17 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-09 19:46:17 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-09 19:46:17 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-09 19:51:16 --> [REQ_ID=eb2d0922822e] [REQUEST][START] HEAD /
DEBUG - 2026-03-09 19:51:16 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-09 19:51:16 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-09 19:51:16 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-09 19:51:16 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-09 19:51:16 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-09 19:56:16 --> [REQ_ID=1e4529d385f7] [REQUEST][START] HEAD /
DEBUG - 2026-03-09 19:56:16 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-09 19:56:16 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-09 19:56:16 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-09 19:56:16 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-09 19:56:16 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-09 20:00:02 --> [REQ_ID=fa030be0ca46] [REQUEST][START] GET /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-09 20:00:02 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-09 20:00:02 --> [REQ_ID=fa030be0ca46] [FILTER_BEFORE] /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-09 20:00:02 --> [REQ_ID=fa030be0ca46] [ROUTE] Controller=\App\Modules\Management\Controllers\ManagementAPIController Method=Run_CRON_Tasks
DEBUG - 2026-03-09 20:00:02 --> [REQ_ID=fa030be0ca46] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-09 20:00:02 --> [REQ_ID=fa030be0ca46] [REQUEST][END]
INFO - 2026-03-09 20:00:02 --> [REQ_ID=fa030be0ca46] [PERF] Execution time=0.047322
DEBUG - 2026-03-09 20:01:15 --> [REQ_ID=ad08325af982] [REQUEST][START] GET /
DEBUG - 2026-03-09 20:01:15 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-09 20:01:15 --> [REQ_ID=ad08325af982] [FILTER_BEFORE] /
DEBUG - 2026-03-09 20:01:15 --> [REQ_ID=ad08325af982] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-09 20:01:15 --> [REQ_ID=ad08325af982] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-09 20:01:15 --> [CSRF] token name=csrf_test_name hash=26026637d416dc77b201c386b29e878c
DEBUG - 2026-03-09 20:01:15 --> [REQ_ID=550e879cbe03] [INIT] App\Controllers\Home::GET
INFO - 2026-03-09 20:01:15 --> [REQ_ID=550e879cbe03] [MEMORY][controller-start] 4194304
INFO - 2026-03-09 20:01:15 --> [REQ_ID=550e879cbe03] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-09 20:01:15 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-09 20:01:16 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-03-09 20:01:16 --> [REQ_ID=550e879cbe03] [VIEW_RENDER] themes/public/home
INFO - 2026-03-09 20:01:16 --> [REQ_ID=550e879cbe03] [MEMORY][commonData:start] 8388608
INFO - 2026-03-09 20:01:16 --> themesMemory usage: 8388608
DEBUG - 2026-03-09 20:01:16 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-09 20:01:16 --> [REQ_ID=ad08325af982] [FILTER_AFTER]
DEBUG - 2026-03-09 20:01:16 --> [REQ_ID=ad08325af982] [LIFECYCLE][END] status=200 duration_ms=1,032.85 memory_delta=4194304
INFO - 2026-03-09 20:01:16 --> [REQ_ID=550e879cbe03] [PERF] Execution time=1.031376
DEBUG - 2026-03-09 20:01:16 --> [REQ_ID=ad08325af982] [REQUEST][END]
INFO - 2026-03-09 20:01:16 --> [REQ_ID=ad08325af982] [PERF] Execution time=1.048323
DEBUG - 2026-03-09 20:01:16 --> [REQ_ID=c8d7ac1c1c66] [REQUEST][START] HEAD /
DEBUG - 2026-03-09 20:01:16 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-09 20:01:16 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-09 20:01:16 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-09 20:01:16 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-09 20:01:16 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-09 20:03:01 --> [REQ_ID=ef6717ad8ef0] [REQUEST][START] GET /index.php/Premium_Features/Brokerage-Integrations
DEBUG - 2026-03-09 20:03:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
INFO - 2026-03-09 20:03:01 --> REDIRECTED ROUTE at https://www.mymiwallet.com/Features/Brokerage-Integrations
DEBUG - 2026-03-09 20:03:01 --> [REQ_ID=ef6717ad8ef0] [REQUEST][END]
INFO - 2026-03-09 20:03:01 --> [REQ_ID=ef6717ad8ef0] [PERF] Execution time=0.036819
DEBUG - 2026-03-09 20:06:16 --> [REQ_ID=f2260f8964ca] [REQUEST][START] HEAD /
DEBUG - 2026-03-09 20:06:16 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-09 20:06:16 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-09 20:06:16 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-09 20:06:16 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-09 20:06:17 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-09 20:06:46 --> [REQ_ID=98a9bb13581c] [REQUEST][START] GET /index.php/How-It-Works/marketing
DEBUG - 2026-03-09 20:06:46 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-09 20:06:46 --> [REQ_ID=98a9bb13581c] [REQUEST][END]
INFO - 2026-03-09 20:06:46 --> [REQ_ID=98a9bb13581c] [PERF] Execution time=0.021090
DEBUG - 2026-03-09 20:11:16 --> [REQ_ID=c9bdb5ac4eca] [REQUEST][START] HEAD /
DEBUG - 2026-03-09 20:11:16 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-09 20:11:16 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-09 20:11:16 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-09 20:11:16 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-09 20:11:16 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-09 20:13:40 --> [REQ_ID=89695273a814] [REQUEST][START] GET /
DEBUG - 2026-03-09 20:13:40 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-09 20:13:40 --> [REQ_ID=89695273a814] [FILTER_BEFORE] /
DEBUG - 2026-03-09 20:13:40 --> [REQ_ID=89695273a814] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-09 20:13:40 --> [REQ_ID=89695273a814] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-09 20:13:40 --> [CSRF] token name=csrf_test_name hash=9e4c47fed177e143c057af251ef04863
DEBUG - 2026-03-09 20:13:40 --> [REQ_ID=0a4dbc85756d] [INIT] App\Controllers\Home::GET
INFO - 2026-03-09 20:13:40 --> [REQ_ID=0a4dbc85756d] [MEMORY][controller-start] 6291456
INFO - 2026-03-09 20:13:40 --> [REQ_ID=0a4dbc85756d] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-09 20:13:40 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-09 20:13:40 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
DEBUG - 2026-03-09 20:13:40 --> [REQ_ID=0a4dbc85756d] [VIEW_RENDER] themes/public/home
INFO - 2026-03-09 20:13:40 --> [REQ_ID=0a4dbc85756d] [MEMORY][commonData:start] 10485760
INFO - 2026-03-09 20:13:40 --> themesMemory usage: 10485760
DEBUG - 2026-03-09 20:13:40 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-09 20:13:40 --> [REQ_ID=89695273a814] [FILTER_AFTER]
DEBUG - 2026-03-09 20:13:40 --> [REQ_ID=89695273a814] [LIFECYCLE][END] status=200 duration_ms=693.87 memory_delta=4194304
INFO - 2026-03-09 20:13:40 --> [REQ_ID=0a4dbc85756d] [PERF] Execution time=0.691881
DEBUG - 2026-03-09 20:13:40 --> [REQ_ID=89695273a814] [REQUEST][END]
INFO - 2026-03-09 20:13:40 --> [REQ_ID=89695273a814] [PERF] Execution time=0.733647
DEBUG - 2026-03-09 20:15:02 --> [REQ_ID=803b2c40cf48] [REQUEST][START] GET /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-09 20:15:02 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-09 20:15:02 --> [REQ_ID=803b2c40cf48] [FILTER_BEFORE] /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-09 20:15:02 --> [REQ_ID=803b2c40cf48] [ROUTE] Controller=\App\Modules\APIs\Controllers\AlertsAPIController Method=fetchEmailAlerts
DEBUG - 2026-03-09 20:15:02 --> [REQ_ID=803b2c40cf48] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-09 20:15:02 --> [REQ_ID=803b2c40cf48] [REQUEST][END]
INFO - 2026-03-09 20:15:02 --> [REQ_ID=803b2c40cf48] [PERF] Execution time=0.048569
DEBUG - 2026-03-09 20:16:16 --> [REQ_ID=a542496fec0a] [REQUEST][START] HEAD /
DEBUG - 2026-03-09 20:16:16 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-09 20:16:16 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-09 20:16:16 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-09 20:16:16 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-09 20:16:16 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-09 20:21:16 --> [REQ_ID=f45eac3c60b3] [REQUEST][START] HEAD /
DEBUG - 2026-03-09 20:21:16 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-09 20:21:16 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-09 20:21:16 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-09 20:21:16 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-09 20:21:16 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-09 20:26:16 --> [REQ_ID=6f309684d84f] [REQUEST][START] HEAD /
DEBUG - 2026-03-09 20:26:16 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-09 20:26:16 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-09 20:26:16 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-09 20:26:16 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-09 20:26:16 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-09 20:31:16 --> [REQ_ID=ae2b09be9d9f] [REQUEST][START] HEAD /
DEBUG - 2026-03-09 20:31:16 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-09 20:31:16 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-09 20:31:16 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-09 20:31:16 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-09 20:31:16 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-09 20:36:16 --> [REQ_ID=c6257b3360a0] [REQUEST][START] HEAD /
DEBUG - 2026-03-09 20:36:16 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-09 20:36:16 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-09 20:36:16 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-09 20:36:16 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-09 20:36:16 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-09 20:41:16 --> [REQ_ID=8535006a5aae] [REQUEST][START] HEAD /
DEBUG - 2026-03-09 20:41:16 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-09 20:41:16 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-09 20:41:16 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-09 20:41:16 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-09 20:41:16 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-09 20:42:40 --> [REQ_ID=ae547268a9ab] [REQUEST][START] GET /index.php/Wallets/Purchase/Memberships
DEBUG - 2026-03-09 20:42:40 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-09 20:42:40 --> [REQ_ID=ae547268a9ab] [REQUEST][END]
INFO - 2026-03-09 20:42:40 --> [REQ_ID=ae547268a9ab] [PERF] Execution time=0.047082
DEBUG - 2026-03-09 20:46:16 --> [REQ_ID=5dced3f2437e] [REQUEST][START] HEAD /
DEBUG - 2026-03-09 20:46:16 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-09 20:46:16 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-09 20:46:16 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-09 20:46:16 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-09 20:46:16 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-09 20:51:16 --> [REQ_ID=67fd8427eaac] [REQUEST][START] HEAD /
DEBUG - 2026-03-09 20:51:16 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-09 20:51:16 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-09 20:51:16 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-09 20:51:16 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-09 20:51:16 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-09 20:56:16 --> [REQ_ID=bd0312307b50] [REQUEST][START] HEAD /
DEBUG - 2026-03-09 20:56:16 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-09 20:56:16 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-09 20:56:16 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-09 20:56:16 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-09 20:56:16 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-09 21:00:01 --> [REQ_ID=484e3d7edd0e] [REQUEST][START] GET /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-09 21:00:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-09 21:00:01 --> [REQ_ID=484e3d7edd0e] [FILTER_BEFORE] /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-09 21:00:01 --> [REQ_ID=484e3d7edd0e] [ROUTE] Controller=\App\Modules\Management\Controllers\ManagementAPIController Method=Run_CRON_Tasks
DEBUG - 2026-03-09 21:00:01 --> [REQ_ID=484e3d7edd0e] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-09 21:00:01 --> [REQ_ID=484e3d7edd0e] [REQUEST][END]
INFO - 2026-03-09 21:00:01 --> [REQ_ID=484e3d7edd0e] [PERF] Execution time=0.037341
DEBUG - 2026-03-09 21:01:16 --> [REQ_ID=65f07ba3c352] [REQUEST][START] HEAD /
DEBUG - 2026-03-09 21:01:16 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-09 21:01:16 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-09 21:01:16 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-09 21:01:16 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-09 21:01:16 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-09 21:06:16 --> [REQ_ID=6510e9241a81] [REQUEST][START] HEAD /
DEBUG - 2026-03-09 21:06:16 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-09 21:06:16 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-09 21:06:16 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-09 21:06:16 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-09 21:06:16 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-09 21:08:32 --> [REQ_ID=a98f77342ba4] [REQUEST][START] GET /index.php/Management/Security
DEBUG - 2026-03-09 21:08:32 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-09 21:08:32 --> [REQ_ID=a98f77342ba4] [REQUEST][END]
INFO - 2026-03-09 21:08:32 --> [REQ_ID=a98f77342ba4] [PERF] Execution time=0.018136
DEBUG - 2026-03-09 21:11:16 --> [REQ_ID=ec7a88142cff] [REQUEST][START] HEAD /
DEBUG - 2026-03-09 21:11:16 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-09 21:11:16 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-09 21:11:16 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-09 21:11:16 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-09 21:11:16 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-09 21:15:02 --> [REQ_ID=0ee7b2d5700d] [REQUEST][START] GET /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-09 21:15:02 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-09 21:15:02 --> [REQ_ID=0ee7b2d5700d] [FILTER_BEFORE] /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-09 21:15:02 --> [REQ_ID=0ee7b2d5700d] [ROUTE] Controller=\App\Modules\APIs\Controllers\AlertsAPIController Method=fetchEmailAlerts
DEBUG - 2026-03-09 21:15:02 --> [REQ_ID=0ee7b2d5700d] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-09 21:15:02 --> [REQ_ID=0ee7b2d5700d] [REQUEST][END]
INFO - 2026-03-09 21:15:02 --> [REQ_ID=0ee7b2d5700d] [PERF] Execution time=0.045996
DEBUG - 2026-03-09 21:16:16 --> [REQ_ID=b2a64faf8833] [REQUEST][START] HEAD /
DEBUG - 2026-03-09 21:16:16 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-09 21:16:16 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-09 21:16:16 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-09 21:16:16 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-09 21:16:16 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-09 21:21:16 --> [REQ_ID=678f1cd327d5] [REQUEST][START] HEAD /
DEBUG - 2026-03-09 21:21:16 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-09 21:21:16 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-09 21:21:16 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-09 21:21:16 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-09 21:21:16 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-09 21:21:35 --> [REQ_ID=86b51533a18c] [REQUEST][START] GET /index.php/Knowledgebase/Technical-Support
DEBUG - 2026-03-09 21:21:35 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-09 21:21:35 --> [REQ_ID=86b51533a18c] [REQUEST][END]
INFO - 2026-03-09 21:21:35 --> [REQ_ID=86b51533a18c] [PERF] Execution time=0.021912
DEBUG - 2026-03-09 21:26:16 --> [REQ_ID=11053e7b32eb] [REQUEST][START] HEAD /
DEBUG - 2026-03-09 21:26:16 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-09 21:26:16 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-09 21:26:16 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-09 21:26:16 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-09 21:26:16 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-09 21:31:16 --> [REQ_ID=5ac83a60f031] [REQUEST][START] HEAD /
DEBUG - 2026-03-09 21:31:16 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-09 21:31:16 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-09 21:31:16 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-09 21:31:16 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-09 21:31:16 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-09 21:36:16 --> [REQ_ID=e610989b115a] [REQUEST][START] HEAD /
DEBUG - 2026-03-09 21:36:16 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-09 21:36:16 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-09 21:36:16 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-09 21:36:16 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-09 21:36:16 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-09 21:39:10 --> [REQ_ID=5df6083548ac] [REQUEST][START] GET /index.php/Dashboard
DEBUG - 2026-03-09 21:39:10 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-09 21:39:11 --> [REQ_ID=5df6083548ac] [FILTER_BEFORE] /index.php/Dashboard
DEBUG - 2026-03-09 21:39:11 --> [REQ_ID=5df6083548ac] [ROUTE] Controller=\App\Modules\User\Controllers\DashboardController Method=index
DEBUG - 2026-03-09 21:39:11 --> [REQ_ID=5df6083548ac] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Dashboard
DEBUG - 2026-03-09 21:39:11 --> [CSRF] token name=csrf_test_name hash=12367ad35afb6ab9285d90f1d0f3c246
DEBUG - 2026-03-09 21:39:11 --> [REQ_ID=5df6083548ac] [REQUEST][END]
INFO - 2026-03-09 21:39:11 --> [REQ_ID=5df6083548ac] [PERF] Execution time=0.331919
DEBUG - 2026-03-09 21:41:16 --> [REQ_ID=07a2be19d8e0] [REQUEST][START] HEAD /
DEBUG - 2026-03-09 21:41:16 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-09 21:41:16 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-09 21:41:16 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-09 21:41:16 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-09 21:41:16 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-09 21:46:16 --> [REQ_ID=3ad00c5a6c4a] [REQUEST][START] HEAD /
DEBUG - 2026-03-09 21:46:16 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-09 21:46:16 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-09 21:46:16 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-09 21:46:16 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-09 21:46:16 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-09 21:51:16 --> [REQ_ID=5c91d08d1dfe] [REQUEST][START] HEAD /
DEBUG - 2026-03-09 21:51:16 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-09 21:51:16 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-09 21:51:17 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-09 21:51:17 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-09 21:51:17 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-09 21:53:22 --> [REQ_ID=66a506ccf879] [REQUEST][START] GET /
DEBUG - 2026-03-09 21:53:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-09 21:53:22 --> [REQ_ID=66a506ccf879] [REQUEST][END]
INFO - 2026-03-09 21:53:22 --> [REQ_ID=66a506ccf879] [PERF] Execution time=0.038449
DEBUG - 2026-03-09 21:53:56 --> [REQ_ID=4961ccb2036c] [REQUEST][START] HEAD /
DEBUG - 2026-03-09 21:53:56 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-09 21:53:56 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-09 21:53:57 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-09 21:53:57 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-09 21:53:57 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: none
DEBUG - 2026-03-09 21:54:23 --> [REQ_ID=a0b7752261cb] [REQUEST][START] GET /index.php/Blog/Personal-Budgeting/The-Importance-of-Personal-Financial-Budgeting
DEBUG - 2026-03-09 21:54:23 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-09 21:54:23 --> [REQ_ID=a0b7752261cb] [REQUEST][END]
INFO - 2026-03-09 21:54:23 --> [REQ_ID=a0b7752261cb] [PERF] Execution time=0.012396
DEBUG - 2026-03-09 21:56:16 --> [REQ_ID=ae1683018dc0] [REQUEST][START] HEAD /
DEBUG - 2026-03-09 21:56:16 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-09 21:56:16 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-09 21:56:16 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-09 21:56:16 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-09 21:56:16 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-09 21:59:56 --> [REQ_ID=d6194c3544a6] [REQUEST][START] GET /
DEBUG - 2026-03-09 21:59:56 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-09 21:59:56 --> [REQ_ID=d6194c3544a6] [REQUEST][END]
INFO - 2026-03-09 21:59:56 --> [REQ_ID=d6194c3544a6] [PERF] Execution time=0.037760
DEBUG - 2026-03-09 22:00:01 --> [REQ_ID=e3ba274a51ce] [REQUEST][START] GET /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-09 22:00:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-09 22:00:01 --> [REQ_ID=e3ba274a51ce] [FILTER_BEFORE] /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-09 22:00:01 --> [REQ_ID=e3ba274a51ce] [ROUTE] Controller=\App\Modules\Management\Controllers\ManagementAPIController Method=Run_CRON_Tasks
DEBUG - 2026-03-09 22:00:01 --> [REQ_ID=e3ba274a51ce] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-09 22:00:01 --> [REQ_ID=e3ba274a51ce] [REQUEST][END]
INFO - 2026-03-09 22:00:01 --> [REQ_ID=e3ba274a51ce] [PERF] Execution time=0.035255
DEBUG - 2026-03-09 22:01:16 --> [REQ_ID=4cd352b09c52] [REQUEST][START] HEAD /
DEBUG - 2026-03-09 22:01:16 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-09 22:01:16 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-09 22:01:16 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-09 22:01:16 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-09 22:01:16 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-09 22:06:16 --> [REQ_ID=abeff9a00e64] [REQUEST][START] HEAD /
DEBUG - 2026-03-09 22:06:16 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-09 22:06:16 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-09 22:06:16 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-09 22:06:16 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-09 22:06:16 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-09 22:10:16 --> [REQ_ID=1c51873fe431] [REQUEST][START] GET /
DEBUG - 2026-03-09 22:10:16 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-09 22:10:16 --> [REQ_ID=1c51873fe431] [FILTER_BEFORE] /
DEBUG - 2026-03-09 22:10:16 --> [REQ_ID=1c51873fe431] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-09 22:10:16 --> [REQ_ID=1c51873fe431] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-09 22:10:16 --> [CSRF] token name=csrf_test_name hash=024ceaeeec87ae9b92ab04d24f5a9eaf
DEBUG - 2026-03-09 22:10:16 --> [REQ_ID=cb85a67f8c26] [INIT] App\Controllers\Home::GET
INFO - 2026-03-09 22:10:16 --> [REQ_ID=cb85a67f8c26] [MEMORY][controller-start] 6291456
INFO - 2026-03-09 22:10:16 --> [REQ_ID=cb85a67f8c26] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-09 22:10:16 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-09 22:10:17 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-03-09 22:10:17 --> [REQ_ID=cb85a67f8c26] [VIEW_RENDER] themes/public/home
INFO - 2026-03-09 22:10:17 --> [REQ_ID=cb85a67f8c26] [MEMORY][commonData:start] 10485760
INFO - 2026-03-09 22:10:17 --> themesMemory usage: 10485760
DEBUG - 2026-03-09 22:10:17 --> [MetaService] slug= pageName=Home cacheHit= path=DB
DEBUG - 2026-03-09 22:10:17 --> [REQ_ID=1c51873fe431] [FILTER_AFTER]
DEBUG - 2026-03-09 22:10:17 --> [REQ_ID=1c51873fe431] [LIFECYCLE][END] status=200 duration_ms=854.61 memory_delta=4194304
INFO - 2026-03-09 22:10:17 --> [REQ_ID=cb85a67f8c26] [PERF] Execution time=0.852651
DEBUG - 2026-03-09 22:10:17 --> [REQ_ID=1c51873fe431] [REQUEST][END]
INFO - 2026-03-09 22:10:17 --> [REQ_ID=1c51873fe431] [PERF] Execution time=0.892605
DEBUG - 2026-03-09 22:11:16 --> [REQ_ID=1280f32f212e] [REQUEST][START] HEAD /
DEBUG - 2026-03-09 22:11:16 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-09 22:11:16 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-09 22:11:16 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-09 22:11:16 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-09 22:11:16 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-09 22:15:01 --> [REQ_ID=12d0393cd5e2] [REQUEST][START] GET /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-09 22:15:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-09 22:15:01 --> [REQ_ID=12d0393cd5e2] [FILTER_BEFORE] /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-09 22:15:01 --> [REQ_ID=12d0393cd5e2] [ROUTE] Controller=\App\Modules\APIs\Controllers\AlertsAPIController Method=fetchEmailAlerts
DEBUG - 2026-03-09 22:15:01 --> [REQ_ID=12d0393cd5e2] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-09 22:15:01 --> [REQ_ID=12d0393cd5e2] [REQUEST][END]
INFO - 2026-03-09 22:15:01 --> [REQ_ID=12d0393cd5e2] [PERF] Execution time=0.019459
DEBUG - 2026-03-09 22:16:16 --> [REQ_ID=2320ccb3614b] [REQUEST][START] HEAD /
DEBUG - 2026-03-09 22:16:16 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-09 22:16:16 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-09 22:16:16 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-09 22:16:16 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-09 22:16:16 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-09 22:21:22 --> [REQ_ID=e86907c7b8bb] [REQUEST][START] HEAD /
DEBUG - 2026-03-09 22:21:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-09 22:21:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-09 22:21:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-09 22:21:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-09 22:21:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-09 22:22:04 --> [REQ_ID=1f1830362414] [REQUEST][START] GET /index.php/Budget
DEBUG - 2026-03-09 22:22:04 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-09 22:22:04 --> [REQ_ID=1f1830362414] [REQUEST][END]
INFO - 2026-03-09 22:22:04 --> [REQ_ID=1f1830362414] [PERF] Execution time=0.016590
DEBUG - 2026-03-09 22:25:56 --> [REQ_ID=66958a45bf8c] [REQUEST][START] GET /
DEBUG - 2026-03-09 22:25:56 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-09 22:25:56 --> [REQ_ID=66958a45bf8c] [FILTER_BEFORE] /
DEBUG - 2026-03-09 22:25:56 --> [REQ_ID=66958a45bf8c] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-09 22:25:56 --> [REQ_ID=66958a45bf8c] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-09 22:25:56 --> [CSRF] token name=csrf_test_name hash=8e963d22914ee7ca508d7b719c3e95fd
DEBUG - 2026-03-09 22:25:56 --> [REQ_ID=a557a92089d3] [INIT] App\Controllers\Home::GET
INFO - 2026-03-09 22:25:56 --> [REQ_ID=a557a92089d3] [MEMORY][controller-start] 4194304
INFO - 2026-03-09 22:25:56 --> [REQ_ID=a557a92089d3] [MEMORY][commonData:start] 4194304
DEBUG - 2026-03-09 22:25:56 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-09 22:25:56 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-03-09 22:25:56 --> [REQ_ID=a557a92089d3] [VIEW_RENDER] themes/public/home
INFO - 2026-03-09 22:25:56 --> [REQ_ID=a557a92089d3] [MEMORY][commonData:start] 8388608
INFO - 2026-03-09 22:25:56 --> themesMemory usage: 8388608
DEBUG - 2026-03-09 22:25:56 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-09 22:25:56 --> [REQ_ID=66958a45bf8c] [FILTER_AFTER]
DEBUG - 2026-03-09 22:25:56 --> [REQ_ID=66958a45bf8c] [LIFECYCLE][END] status=200 duration_ms=707.68 memory_delta=4194304
INFO - 2026-03-09 22:25:56 --> [REQ_ID=a557a92089d3] [PERF] Execution time=0.707341
DEBUG - 2026-03-09 22:25:56 --> [REQ_ID=66958a45bf8c] [REQUEST][END]
INFO - 2026-03-09 22:25:56 --> [REQ_ID=66958a45bf8c] [PERF] Execution time=0.717724
DEBUG - 2026-03-09 22:26:22 --> [REQ_ID=8a21fe3f2eeb] [REQUEST][START] HEAD /
DEBUG - 2026-03-09 22:26:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-09 22:26:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-09 22:26:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-09 22:26:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-09 22:26:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-09 22:31:22 --> [REQ_ID=8a47db84d75f] [REQUEST][START] HEAD /
DEBUG - 2026-03-09 22:31:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-09 22:31:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-09 22:31:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-09 22:31:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-09 22:31:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-09 22:32:01 --> [REQ_ID=a484f9ad1223] [REQUEST][START] GET /index.php/How-It-Works/MyMI-Gold
DEBUG - 2026-03-09 22:32:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-09 22:32:01 --> [REQ_ID=a484f9ad1223] [REQUEST][END]
INFO - 2026-03-09 22:32:01 --> [REQ_ID=a484f9ad1223] [PERF] Execution time=0.023757
DEBUG - 2026-03-09 22:33:46 --> [REQ_ID=417e5a24a0f3] [REQUEST][START] GET /
DEBUG - 2026-03-09 22:33:46 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-09 22:33:46 --> [REQ_ID=417e5a24a0f3] [FILTER_BEFORE] /
DEBUG - 2026-03-09 22:33:46 --> [REQ_ID=417e5a24a0f3] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-09 22:33:46 --> [REQ_ID=417e5a24a0f3] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-09 22:33:46 --> [CSRF] token name=csrf_test_name hash=b0f0bba85cd5efc5bb1b48b89b6dac66
DEBUG - 2026-03-09 22:33:46 --> [REQ_ID=bc639494dcc1] [INIT] App\Controllers\Home::GET
INFO - 2026-03-09 22:33:46 --> [REQ_ID=bc639494dcc1] [MEMORY][controller-start] 6291456
INFO - 2026-03-09 22:33:46 --> [REQ_ID=bc639494dcc1] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-09 22:33:46 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-09 22:33:47 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
DEBUG - 2026-03-09 22:33:47 --> [REQ_ID=bc639494dcc1] [VIEW_RENDER] themes/public/home
INFO - 2026-03-09 22:33:47 --> [REQ_ID=bc639494dcc1] [MEMORY][commonData:start] 10485760
INFO - 2026-03-09 22:33:47 --> themesMemory usage: 10485760
DEBUG - 2026-03-09 22:33:47 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-09 22:33:47 --> [REQ_ID=417e5a24a0f3] [FILTER_AFTER]
DEBUG - 2026-03-09 22:33:47 --> [REQ_ID=417e5a24a0f3] [LIFECYCLE][END] status=200 duration_ms=707.90 memory_delta=4194304
INFO - 2026-03-09 22:33:47 --> [REQ_ID=bc639494dcc1] [PERF] Execution time=0.705809
DEBUG - 2026-03-09 22:33:47 --> [REQ_ID=417e5a24a0f3] [REQUEST][END]
INFO - 2026-03-09 22:33:47 --> [REQ_ID=417e5a24a0f3] [PERF] Execution time=0.746869
DEBUG - 2026-03-09 22:36:22 --> [REQ_ID=0ec6fef9c0e3] [REQUEST][START] HEAD /
DEBUG - 2026-03-09 22:36:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-09 22:36:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-09 22:36:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-09 22:36:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-09 22:36:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-09 22:41:22 --> [REQ_ID=de5b1e6c7026] [REQUEST][START] HEAD /
DEBUG - 2026-03-09 22:41:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-09 22:41:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-09 22:41:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-09 22:41:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-09 22:41:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-09 22:44:28 --> [REQ_ID=30e4a92f8a0a] [REQUEST][START] GET /index.php/Account/Billing
DEBUG - 2026-03-09 22:44:28 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-09 22:44:28 --> [REQ_ID=30e4a92f8a0a] [REQUEST][END]
INFO - 2026-03-09 22:44:28 --> [REQ_ID=30e4a92f8a0a] [PERF] Execution time=0.043686
DEBUG - 2026-03-09 22:45:42 --> [REQ_ID=c5cce5b6bddb] [REQUEST][START] GET /
DEBUG - 2026-03-09 22:45:42 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-09 22:45:42 --> [REQ_ID=c5cce5b6bddb] [FILTER_BEFORE] /
DEBUG - 2026-03-09 22:45:42 --> [REQ_ID=c5cce5b6bddb] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-09 22:45:42 --> [REQ_ID=c5cce5b6bddb] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-09 22:45:42 --> [CSRF] token name=csrf_test_name hash=5643dd208c91acb145635f76d115beb0
DEBUG - 2026-03-09 22:45:42 --> [REQ_ID=c7018c35af2d] [INIT] App\Controllers\Home::GET
INFO - 2026-03-09 22:45:42 --> [REQ_ID=c7018c35af2d] [MEMORY][controller-start] 6291456
INFO - 2026-03-09 22:45:43 --> [REQ_ID=c7018c35af2d] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-09 22:45:43 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-09 22:45:43 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-03-09 22:45:43 --> [REQ_ID=c7018c35af2d] [VIEW_RENDER] themes/public/home
INFO - 2026-03-09 22:45:43 --> [REQ_ID=c7018c35af2d] [MEMORY][commonData:start] 10485760
INFO - 2026-03-09 22:45:43 --> themesMemory usage: 10485760
DEBUG - 2026-03-09 22:45:43 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-09 22:45:43 --> [REQ_ID=c5cce5b6bddb] [FILTER_AFTER]
DEBUG - 2026-03-09 22:45:43 --> [REQ_ID=c5cce5b6bddb] [LIFECYCLE][END] status=200 duration_ms=771.93 memory_delta=4194304
INFO - 2026-03-09 22:45:43 --> [REQ_ID=c7018c35af2d] [PERF] Execution time=0.769997
DEBUG - 2026-03-09 22:45:43 --> [REQ_ID=c5cce5b6bddb] [REQUEST][END]
INFO - 2026-03-09 22:45:43 --> [REQ_ID=c5cce5b6bddb] [PERF] Execution time=0.810090
DEBUG - 2026-03-09 22:46:22 --> [REQ_ID=4660730644d3] [REQUEST][START] HEAD /
DEBUG - 2026-03-09 22:46:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-09 22:46:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-09 22:46:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-09 22:46:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-09 22:46:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-09 22:51:22 --> [REQ_ID=2b69b6d59171] [REQUEST][START] HEAD /
DEBUG - 2026-03-09 22:51:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-09 22:51:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-09 22:51:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-09 22:51:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-09 22:51:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-09 22:51:55 --> [REQ_ID=028b93825c1c] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-09 22:51:55 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-09 22:51:55 --> [REQ_ID=028b93825c1c] [REQUEST][END]
INFO - 2026-03-09 22:51:55 --> [REQ_ID=028b93825c1c] [PERF] Execution time=0.020231
DEBUG - 2026-03-09 22:54:03 --> [REQ_ID=392abbdccaff] [REQUEST][START] HEAD /index.php/login
DEBUG - 2026-03-09 22:54:03 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-09 22:54:03 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: login]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-09 22:54:03 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-09 22:54:03 --> [404] URI=https://www.mymiwallet.com/index.php/login
WARNING - 2026-03-09 22:54:03 --> 404 route miss: https://www.mymiwallet.com/index.php/login | referrer: none
DEBUG - 2026-03-09 22:56:22 --> [REQ_ID=7183ee7964e3] [REQUEST][START] HEAD /
DEBUG - 2026-03-09 22:56:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-09 22:56:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-09 22:56:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-09 22:56:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-09 22:56:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-09 23:00:01 --> [REQ_ID=9f285e8a5870] [REQUEST][START] GET /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-09 23:00:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-09 23:00:01 --> [REQ_ID=9f285e8a5870] [FILTER_BEFORE] /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-09 23:00:01 --> [REQ_ID=9f285e8a5870] [ROUTE] Controller=\App\Modules\Management\Controllers\ManagementAPIController Method=Run_CRON_Tasks
DEBUG - 2026-03-09 23:00:01 --> [REQ_ID=9f285e8a5870] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-09 23:00:01 --> [REQ_ID=9f285e8a5870] [REQUEST][END]
INFO - 2026-03-09 23:00:01 --> [REQ_ID=9f285e8a5870] [PERF] Execution time=0.039197
DEBUG - 2026-03-09 23:01:22 --> [REQ_ID=2e3a4520bc7c] [REQUEST][START] HEAD /
DEBUG - 2026-03-09 23:01:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-09 23:01:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-09 23:01:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-09 23:01:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-09 23:01:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-09 23:05:00 --> [REQ_ID=58ded96e1769] [REQUEST][START] GET /index.php/How-It-Works/Registering-An-Account
DEBUG - 2026-03-09 23:05:00 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-09 23:05:00 --> [REQ_ID=58ded96e1769] [FILTER_BEFORE] /index.php/How-It-Works/Registering-An-Account
DEBUG - 2026-03-09 23:05:00 --> [REQ_ID=58ded96e1769] [ROUTE] Controller=\App\Modules\Blog\Controllers\HowItWorksController Method=show
DEBUG - 2026-03-09 23:05:00 --> [REQ_ID=58ded96e1769] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/How-It-Works/Registering-An-Account
DEBUG - 2026-03-09 23:05:00 --> [CSRF] token name=csrf_test_name hash=b084f28a79cb6781ef68340c1c3626a2
DEBUG - 2026-03-09 23:05:00 --> [REQ_ID=2b4484d51182] [INIT] App\Modules\Blog\Controllers\HowItWorksController::GET
INFO - 2026-03-09 23:05:00 --> [REQ_ID=2b4484d51182] [MEMORY][controller-start] 6291456
DEBUG - 2026-03-09 23:05:00 --> [REQ_ID=2b4484d51182] [METHOD_ENTRY] show
DEBUG - 2026-03-09 23:05:00 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-09 23:05:00 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-09 23:05:00 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-09 23:05:00 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-09 23:05:00 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-09 23:05:00 --> MyMICoin: guest context detected; skipping user-specific preload.
ERROR - 2026-03-09 23:05:00 --> HowItWorksController failure: Call to undefined method App\Modules\Blog\Controllers\HowItWorksController::respondWithRendered()
INFO - 2026-03-09 23:05:00 --> [REQ_ID=2b4484d51182] [PERF] Execution time=0.170609
DEBUG - 2026-03-09 23:05:00 --> [REQ_ID=134e066740d5] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-09 23:05:00 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-09 23:05:00 --> [REQ_ID=134e066740d5] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-09 23:05:00 --> [REQ_ID=134e066740d5] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-09 23:05:00 --> [REQ_ID=134e066740d5] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-09 23:05:00 --> [CSRF] token name=csrf_test_name hash=ecacc710493fa541d463aa8c1669e74e
DEBUG - 2026-03-09 23:05:00 --> [REQ_ID=978ca78af807] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-09 23:05:00 --> [REQ_ID=978ca78af807] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-09 23:05:01 --> [REQ_ID=134e066740d5] [FILTER_AFTER]
DEBUG - 2026-03-09 23:05:01 --> [REQ_ID=134e066740d5] [LIFECYCLE][END] status=200 duration_ms=53.63 memory_delta=0
INFO - 2026-03-09 23:05:01 --> [REQ_ID=978ca78af807] [PERF] Execution time=0.053356
DEBUG - 2026-03-09 23:05:01 --> [REQ_ID=134e066740d5] [REQUEST][END]
INFO - 2026-03-09 23:05:01 --> [REQ_ID=134e066740d5] [PERF] Execution time=0.073880
DEBUG - 2026-03-09 23:05:01 --> [REQ_ID=a108c0096d06] [REQUEST][START] GET /index.php/forgot
DEBUG - 2026-03-09 23:05:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-09 23:05:01 --> [REQ_ID=a108c0096d06] [FILTER_BEFORE] /index.php/forgot
DEBUG - 2026-03-09 23:05:01 --> [REQ_ID=a108c0096d06] [ROUTE] Controller=\Myth\Auth\Controllers\AuthController Method=forgotPassword
DEBUG - 2026-03-09 23:05:01 --> [REQ_ID=a108c0096d06] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/forgot
DEBUG - 2026-03-09 23:05:01 --> [CSRF] token name=csrf_test_name hash=8e3ede8f51ace36f9c0e76199a631b47
DEBUG - 2026-03-09 23:05:01 --> [REQ_ID=a108c0096d06] [FILTER_AFTER]
DEBUG - 2026-03-09 23:05:01 --> [REQ_ID=a108c0096d06] [LIFECYCLE][END] status=200 duration_ms=2.98 memory_delta=0
DEBUG - 2026-03-09 23:05:01 --> [REQ_ID=a108c0096d06] [REQUEST][END]
INFO - 2026-03-09 23:05:01 --> [REQ_ID=a108c0096d06] [PERF] Execution time=0.016666
DEBUG - 2026-03-09 23:05:01 --> [REQ_ID=b3d0df6b3ffa] [REQUEST][START] GET /index.php/How-It-Works/Investment-Dashboard
DEBUG - 2026-03-09 23:05:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-09 23:05:01 --> [REQ_ID=b3d0df6b3ffa] [FILTER_BEFORE] /index.php/How-It-Works/Investment-Dashboard
DEBUG - 2026-03-09 23:05:01 --> [REQ_ID=b3d0df6b3ffa] [ROUTE] Controller=\App\Modules\Blog\Controllers\HowItWorksController Method=show
DEBUG - 2026-03-09 23:05:01 --> [REQ_ID=b3d0df6b3ffa] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/How-It-Works/Investment-Dashboard
DEBUG - 2026-03-09 23:05:01 --> [CSRF] token name=csrf_test_name hash=6b36a5dfb01cabbf569fb83ead2f535e
DEBUG - 2026-03-09 23:05:01 --> [REQ_ID=e35ffdd9ae35] [INIT] App\Modules\Blog\Controllers\HowItWorksController::GET
INFO - 2026-03-09 23:05:01 --> [REQ_ID=e35ffdd9ae35] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-09 23:05:01 --> [REQ_ID=e35ffdd9ae35] [METHOD_ENTRY] show
DEBUG - 2026-03-09 23:05:01 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-09 23:05:01 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-09 23:05:01 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-09 23:05:01 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-09 23:05:01 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-09 23:05:01 --> MyMICoin: guest context detected; skipping user-specific preload.
ERROR - 2026-03-09 23:05:01 --> HowItWorksController failure: Call to undefined method App\Modules\Blog\Controllers\HowItWorksController::respondWithRendered()
INFO - 2026-03-09 23:05:01 --> [REQ_ID=e35ffdd9ae35] [PERF] Execution time=0.020723
DEBUG - 2026-03-09 23:05:01 --> [REQ_ID=dab2f7c918ca] [REQUEST][START] GET /index.php/How-It-Works/budgeting
DEBUG - 2026-03-09 23:05:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-09 23:05:01 --> [REQ_ID=dab2f7c918ca] [FILTER_BEFORE] /index.php/How-It-Works/budgeting
DEBUG - 2026-03-09 23:05:01 --> [REQ_ID=dab2f7c918ca] [ROUTE] Controller=\App\Modules\Blog\Controllers\HowItWorksController Method=show
DEBUG - 2026-03-09 23:05:01 --> [REQ_ID=dab2f7c918ca] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/How-It-Works/budgeting
DEBUG - 2026-03-09 23:05:01 --> [CSRF] token name=csrf_test_name hash=239d8884fc08450b43002c6bfa7a2636
DEBUG - 2026-03-09 23:05:01 --> [REQ_ID=a9c1f19054d3] [INIT] App\Modules\Blog\Controllers\HowItWorksController::GET
INFO - 2026-03-09 23:05:01 --> [REQ_ID=a9c1f19054d3] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-09 23:05:01 --> [REQ_ID=a9c1f19054d3] [METHOD_ENTRY] show
DEBUG - 2026-03-09 23:05:01 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-09 23:05:01 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-09 23:05:01 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-09 23:05:01 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-09 23:05:01 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-09 23:05:01 --> MyMICoin: guest context detected; skipping user-specific preload.
ERROR - 2026-03-09 23:05:01 --> HowItWorksController failure: budgeting
CRITICAL - 2026-03-09 23:05:01 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: GET, Route: How-It-Works/budgeting]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-09 23:05:01 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-09 23:05:01 --> [404] URI=https://www.mymiwallet.com/index.php/How-It-Works/budgeting
WARNING - 2026-03-09 23:05:01 --> 404 route miss: https://www.mymiwallet.com/index.php/How-It-Works/budgeting | referrer: none
INFO - 2026-03-09 23:05:01 --> [REQ_ID=a9c1f19054d3] [PERF] Execution time=0.027141
DEBUG - 2026-03-09 23:05:01 --> [REQ_ID=c1ea941e96f1] [REQUEST][START] GET /index.php/How-It-Works/MyMI-Exchange
DEBUG - 2026-03-09 23:05:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-09 23:05:01 --> [REQ_ID=c1ea941e96f1] [FILTER_BEFORE] /index.php/How-It-Works/MyMI-Exchange
DEBUG - 2026-03-09 23:05:01 --> [REQ_ID=c1ea941e96f1] [ROUTE] Controller=\App\Modules\Blog\Controllers\HowItWorksController Method=show
DEBUG - 2026-03-09 23:05:01 --> [REQ_ID=c1ea941e96f1] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/How-It-Works/MyMI-Exchange
DEBUG - 2026-03-09 23:05:01 --> [CSRF] token name=csrf_test_name hash=650c84d48a6862994a4de053834eb9d7
DEBUG - 2026-03-09 23:05:01 --> [REQ_ID=4fe9789a00ee] [INIT] App\Modules\Blog\Controllers\HowItWorksController::GET
INFO - 2026-03-09 23:05:01 --> [REQ_ID=4fe9789a00ee] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-09 23:05:01 --> [REQ_ID=4fe9789a00ee] [METHOD_ENTRY] show
DEBUG - 2026-03-09 23:05:01 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-09 23:05:01 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-09 23:05:01 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-09 23:05:01 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-09 23:05:01 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-09 23:05:01 --> MyMICoin: guest context detected; skipping user-specific preload.
ERROR - 2026-03-09 23:05:01 --> HowItWorksController failure: Call to undefined method App\Modules\Blog\Controllers\HowItWorksController::respondWithRendered()
INFO - 2026-03-09 23:05:01 --> [REQ_ID=4fe9789a00ee] [PERF] Execution time=0.026585
DEBUG - 2026-03-09 23:05:01 --> [REQ_ID=3700c3d5ec0c] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-09 23:05:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-09 23:05:01 --> [REQ_ID=3700c3d5ec0c] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-09 23:05:01 --> [REQ_ID=3700c3d5ec0c] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-09 23:05:01 --> [REQ_ID=3700c3d5ec0c] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-09 23:05:01 --> [CSRF] token name=csrf_test_name hash=9195c489d256f38a9e0091b6b42e87f1
DEBUG - 2026-03-09 23:05:01 --> [REQ_ID=86b4ddfc32a6] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-09 23:05:01 --> [REQ_ID=86b4ddfc32a6] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-09 23:05:01 --> [REQ_ID=3700c3d5ec0c] [FILTER_AFTER]
DEBUG - 2026-03-09 23:05:01 --> [REQ_ID=3700c3d5ec0c] [LIFECYCLE][END] status=200 duration_ms=23.12 memory_delta=0
INFO - 2026-03-09 23:05:01 --> [REQ_ID=86b4ddfc32a6] [PERF] Execution time=0.023094
DEBUG - 2026-03-09 23:05:01 --> [REQ_ID=3700c3d5ec0c] [REQUEST][END]
INFO - 2026-03-09 23:05:01 --> [REQ_ID=3700c3d5ec0c] [PERF] Execution time=0.049911
DEBUG - 2026-03-09 23:05:01 --> [REQ_ID=bfe7b9dc7d73] [REQUEST][START] GET /index.php/How-It-Works/Investment-Dashboard
DEBUG - 2026-03-09 23:05:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-09 23:05:01 --> [REQ_ID=a6d952f68800] [REQUEST][START] GET /index.php/How-It-Works/Investment-Dashboard
DEBUG - 2026-03-09 23:05:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-09 23:05:01 --> [REQ_ID=bfe7b9dc7d73] [FILTER_BEFORE] /index.php/How-It-Works/Investment-Dashboard
DEBUG - 2026-03-09 23:05:01 --> [REQ_ID=bfe7b9dc7d73] [ROUTE] Controller=\App\Modules\Blog\Controllers\HowItWorksController Method=show
DEBUG - 2026-03-09 23:05:01 --> [REQ_ID=bfe7b9dc7d73] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/How-It-Works/Investment-Dashboard
DEBUG - 2026-03-09 23:05:01 --> [CSRF] token name=csrf_test_name hash=c26792facd7966291987f61944268d41
DEBUG - 2026-03-09 23:05:01 --> [REQ_ID=15b4abd6c64c] [INIT] App\Modules\Blog\Controllers\HowItWorksController::GET
INFO - 2026-03-09 23:05:01 --> [REQ_ID=15b4abd6c64c] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-09 23:05:01 --> [REQ_ID=15b4abd6c64c] [METHOD_ENTRY] show
DEBUG - 2026-03-09 23:05:01 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-09 23:05:01 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-09 23:05:01 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-09 23:05:01 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-09 23:05:01 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-09 23:05:01 --> MyMICoin: guest context detected; skipping user-specific preload.
ERROR - 2026-03-09 23:05:01 --> HowItWorksController failure: Call to undefined method App\Modules\Blog\Controllers\HowItWorksController::respondWithRendered()
INFO - 2026-03-09 23:05:01 --> [REQ_ID=15b4abd6c64c] [PERF] Execution time=0.025386
DEBUG - 2026-03-09 23:05:01 --> [REQ_ID=9f7e344b7a50] [REQUEST][START] GET /index.php/How-It-Works/Registering-An-Account
DEBUG - 2026-03-09 23:05:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-09 23:05:01 --> [REQ_ID=a6d952f68800] [FILTER_BEFORE] /index.php/How-It-Works/Investment-Dashboard
DEBUG - 2026-03-09 23:05:01 --> [REQ_ID=a6d952f68800] [ROUTE] Controller=\App\Modules\Blog\Controllers\HowItWorksController Method=show
DEBUG - 2026-03-09 23:05:01 --> [REQ_ID=a6d952f68800] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/How-It-Works/Investment-Dashboard
DEBUG - 2026-03-09 23:05:01 --> [CSRF] token name=csrf_test_name hash=10c8b441bf995a19881570db947b3df1
DEBUG - 2026-03-09 23:05:01 --> [REQ_ID=e0c90c278604] [INIT] App\Modules\Blog\Controllers\HowItWorksController::GET
INFO - 2026-03-09 23:05:01 --> [REQ_ID=e0c90c278604] [MEMORY][controller-start] 6291456
DEBUG - 2026-03-09 23:05:01 --> [REQ_ID=9f7e344b7a50] [FILTER_BEFORE] /index.php/How-It-Works/Registering-An-Account
DEBUG - 2026-03-09 23:05:01 --> [REQ_ID=9f7e344b7a50] [ROUTE] Controller=\App\Modules\Blog\Controllers\HowItWorksController Method=show
DEBUG - 2026-03-09 23:05:01 --> [REQ_ID=9f7e344b7a50] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/How-It-Works/Registering-An-Account
DEBUG - 2026-03-09 23:05:01 --> [CSRF] token name=csrf_test_name hash=c5f6b2a48554489ced4d3fe0c53a12a9
DEBUG - 2026-03-09 23:05:01 --> [REQ_ID=4995925bb7ec] [INIT] App\Modules\Blog\Controllers\HowItWorksController::GET
INFO - 2026-03-09 23:05:01 --> [REQ_ID=4995925bb7ec] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-09 23:05:01 --> [REQ_ID=4995925bb7ec] [METHOD_ENTRY] show
DEBUG - 2026-03-09 23:05:01 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-09 23:05:01 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-09 23:05:01 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-09 23:05:01 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-09 23:05:01 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-09 23:05:01 --> [REQ_ID=022a5ca618f4] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-09 23:05:01 --> MyMICoin: guest context detected; skipping user-specific preload.
ERROR - 2026-03-09 23:05:01 --> HowItWorksController failure: Call to undefined method App\Modules\Blog\Controllers\HowItWorksController::respondWithRendered()
INFO - 2026-03-09 23:05:01 --> [REQ_ID=4995925bb7ec] [PERF] Execution time=0.026318
DEBUG - 2026-03-09 23:05:01 --> [REQ_ID=e0c90c278604] [METHOD_ENTRY] show
DEBUG - 2026-03-09 23:05:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-09 23:05:01 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-09 23:05:01 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-09 23:05:02 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-09 23:05:02 --> [REQ_ID=f9ecf8c371e5] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-09 23:05:02 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-09 23:05:02 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-09 23:05:02 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-09 23:05:02 --> MyMICoin: guest context detected; skipping user-specific preload.
ERROR - 2026-03-09 23:05:02 --> HowItWorksController failure: Call to undefined method App\Modules\Blog\Controllers\HowItWorksController::respondWithRendered()
INFO - 2026-03-09 23:05:02 --> [REQ_ID=e0c90c278604] [PERF] Execution time=0.152903
DEBUG - 2026-03-09 23:05:02 --> [REQ_ID=f9ecf8c371e5] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-09 23:05:02 --> [REQ_ID=f9ecf8c371e5] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-09 23:05:02 --> [REQ_ID=f9ecf8c371e5] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-09 23:05:02 --> [CSRF] token name=csrf_test_name hash=db2ce217d4c7f37c55d761822fadbb75
DEBUG - 2026-03-09 23:05:02 --> [REQ_ID=b2d31e7c6181] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-09 23:05:02 --> [REQ_ID=b2d31e7c6181] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-09 23:05:02 --> [REQ_ID=f9ecf8c371e5] [FILTER_AFTER]
DEBUG - 2026-03-09 23:05:02 --> [REQ_ID=f9ecf8c371e5] [LIFECYCLE][END] status=200 duration_ms=30.97 memory_delta=0
INFO - 2026-03-09 23:05:02 --> [REQ_ID=b2d31e7c6181] [PERF] Execution time=0.033742
DEBUG - 2026-03-09 23:05:02 --> [REQ_ID=f9ecf8c371e5] [REQUEST][END]
INFO - 2026-03-09 23:05:02 --> [REQ_ID=f9ecf8c371e5] [PERF] Execution time=0.079026
DEBUG - 2026-03-09 23:05:02 --> [REQ_ID=022a5ca618f4] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-09 23:05:02 --> [REQ_ID=022a5ca618f4] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-09 23:05:02 --> [REQ_ID=022a5ca618f4] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-09 23:05:02 --> [CSRF] token name=csrf_test_name hash=8f24962da38319c31e4ae5ac7e09716b
DEBUG - 2026-03-09 23:05:02 --> [REQ_ID=f3467f527e25] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-09 23:05:02 --> [REQ_ID=f3467f527e25] [MEMORY][controller-start] 6291456
DEBUG - 2026-03-09 23:05:02 --> [REQ_ID=837dfe63cbe2] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-09 23:05:02 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-09 23:05:02 --> [REQ_ID=022a5ca618f4] [FILTER_AFTER]
DEBUG - 2026-03-09 23:05:02 --> [REQ_ID=022a5ca618f4] [LIFECYCLE][END] status=200 duration_ms=120.51 memory_delta=0
INFO - 2026-03-09 23:05:02 --> [REQ_ID=f3467f527e25] [PERF] Execution time=0.107464
DEBUG - 2026-03-09 23:05:02 --> [REQ_ID=022a5ca618f4] [REQUEST][END]
INFO - 2026-03-09 23:05:02 --> [REQ_ID=022a5ca618f4] [PERF] Execution time=0.302639
DEBUG - 2026-03-09 23:05:02 --> [REQ_ID=4fd276695593] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-09 23:05:02 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-09 23:05:02 --> [REQ_ID=837dfe63cbe2] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-09 23:05:02 --> [REQ_ID=837dfe63cbe2] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-09 23:05:02 --> [REQ_ID=837dfe63cbe2] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-09 23:05:02 --> [CSRF] token name=csrf_test_name hash=448b66f9b6f17a6a1e115851f178d85c
DEBUG - 2026-03-09 23:05:02 --> [REQ_ID=c0030883aeb5] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-09 23:05:02 --> [REQ_ID=c0030883aeb5] [MEMORY][controller-start] 6291456
DEBUG - 2026-03-09 23:05:02 --> [REQ_ID=4fd276695593] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-09 23:05:02 --> [REQ_ID=4fd276695593] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-09 23:05:02 --> [REQ_ID=4fd276695593] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-09 23:05:02 --> [CSRF] token name=csrf_test_name hash=17603d3e303ccf1fa1d36e7c4a03b883
DEBUG - 2026-03-09 23:05:02 --> [REQ_ID=5f1736465d23] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-09 23:05:02 --> [REQ_ID=5f1736465d23] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-09 23:05:02 --> [REQ_ID=4fd276695593] [FILTER_AFTER]
DEBUG - 2026-03-09 23:05:02 --> [REQ_ID=4fd276695593] [LIFECYCLE][END] status=200 duration_ms=21.60 memory_delta=0
INFO - 2026-03-09 23:05:02 --> [REQ_ID=5f1736465d23] [PERF] Execution time=0.023627
DEBUG - 2026-03-09 23:05:02 --> [REQ_ID=4fd276695593] [REQUEST][END]
INFO - 2026-03-09 23:05:02 --> [REQ_ID=4fd276695593] [PERF] Execution time=0.053284
DEBUG - 2026-03-09 23:05:02 --> [REQ_ID=583f7c98fc2a] [REQUEST][START] GET /index.php/Features/Brokerage-Integration
DEBUG - 2026-03-09 23:05:02 --> [REQ_ID=837dfe63cbe2] [FILTER_AFTER]
DEBUG - 2026-03-09 23:05:02 --> [REQ_ID=837dfe63cbe2] [LIFECYCLE][END] status=200 duration_ms=83.43 memory_delta=0
INFO - 2026-03-09 23:05:02 --> [REQ_ID=c0030883aeb5] [PERF] Execution time=0.079028
DEBUG - 2026-03-09 23:05:02 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-09 23:05:02 --> [REQ_ID=5aec8811895d] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-09 23:05:02 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-09 23:05:02 --> [REQ_ID=837dfe63cbe2] [REQUEST][END]
INFO - 2026-03-09 23:05:02 --> [REQ_ID=837dfe63cbe2] [PERF] Execution time=0.240492
DEBUG - 2026-03-09 23:05:02 --> [REQ_ID=91cfdf3c49ce] [REQUEST][START] GET /index.php/Support
DEBUG - 2026-03-09 23:05:02 --> [REQ_ID=5aec8811895d] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-09 23:05:02 --> [REQ_ID=5aec8811895d] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-09 23:05:02 --> [REQ_ID=5aec8811895d] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-09 23:05:02 --> [CSRF] token name=csrf_test_name hash=239d8884fc08450b43002c6bfa7a2636
DEBUG - 2026-03-09 23:05:02 --> [REQ_ID=cdac30c0aef4] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-09 23:05:02 --> [REQ_ID=cdac30c0aef4] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-09 23:05:02 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-09 23:05:02 --> [REQ_ID=5aec8811895d] [FILTER_AFTER]
DEBUG - 2026-03-09 23:05:02 --> [REQ_ID=5aec8811895d] [LIFECYCLE][END] status=200 duration_ms=20.66 memory_delta=0
INFO - 2026-03-09 23:05:02 --> [REQ_ID=cdac30c0aef4] [PERF] Execution time=0.018452
DEBUG - 2026-03-09 23:05:02 --> [REQ_ID=5aec8811895d] [REQUEST][END]
INFO - 2026-03-09 23:05:02 --> [REQ_ID=5aec8811895d] [PERF] Execution time=0.041280
DEBUG - 2026-03-09 23:05:02 --> [REQ_ID=583f7c98fc2a] [FILTER_BEFORE] /index.php/Features/Brokerage-Integration
DEBUG - 2026-03-09 23:05:02 --> [REQ_ID=583f7c98fc2a] [ROUTE] Controller=\App\Modules\Advertise\Controllers\FeaturesController Method=BrokerageIntegrations
DEBUG - 2026-03-09 23:05:02 --> [REQ_ID=583f7c98fc2a] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Features/Brokerage-Integration
DEBUG - 2026-03-09 23:05:02 --> [CSRF] token name=csrf_test_name hash=1891ccb7b7d5378fbb37f097a6303752
DEBUG - 2026-03-09 23:05:02 --> [REQ_ID=02951b454d0f] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-09 23:05:02 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-09 23:05:02 --> [REQ_ID=91cfdf3c49ce] [FILTER_BEFORE] /index.php/Support
DEBUG - 2026-03-09 23:05:02 --> [REQ_ID=91cfdf3c49ce] [ROUTE] Controller=\App\Modules\Support\Controllers\SupportController Method=index
DEBUG - 2026-03-09 23:05:02 --> [REQ_ID=91cfdf3c49ce] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Support
DEBUG - 2026-03-09 23:05:02 --> [REQ_ID=02951b454d0f] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-09 23:05:02 --> [REQ_ID=02951b454d0f] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-09 23:05:02 --> [REQ_ID=02951b454d0f] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-09 23:05:02 --> [REQ_ID=583f7c98fc2a] [REQUEST][END]
DEBUG - 2026-03-09 23:05:02 --> [CSRF] token name=csrf_test_name hash=5335518e01660fbd66b36be1aaaed0ae
INFO - 2026-03-09 23:05:02 --> [REQ_ID=583f7c98fc2a] [PERF] Execution time=0.163363
DEBUG - 2026-03-09 23:05:02 --> [REQ_ID=53eb9e06810d] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-09 23:05:02 --> [REQ_ID=53eb9e06810d] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-09 23:05:02 --> [CSRF] token name=csrf_test_name hash=6f8ba44762a6e9840af181f26d79edcf
DEBUG - 2026-03-09 23:05:02 --> [REQ_ID=4581736090bc] [INIT] App\Modules\Support\Controllers\SupportController::GET
INFO - 2026-03-09 23:05:02 --> [REQ_ID=4581736090bc] [MEMORY][controller-start] 6291456
DEBUG - 2026-03-09 23:05:02 --> [REQ_ID=02951b454d0f] [FILTER_AFTER]
DEBUG - 2026-03-09 23:05:02 --> [REQ_ID=02951b454d0f] [LIFECYCLE][END] status=200 duration_ms=21.74 memory_delta=0
INFO - 2026-03-09 23:05:02 --> [REQ_ID=53eb9e06810d] [PERF] Execution time=0.021299
DEBUG - 2026-03-09 23:05:02 --> [REQ_ID=02951b454d0f] [REQUEST][END]
INFO - 2026-03-09 23:05:02 --> [REQ_ID=02951b454d0f] [PERF] Execution time=0.048157
DEBUG - 2026-03-09 23:05:02 --> [REQ_ID=c920a06fbfcc] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-09 23:05:02 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-09 23:05:02 --> [REQ_ID=c920a06fbfcc] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-09 23:05:02 --> [REQ_ID=c920a06fbfcc] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-09 23:05:02 --> [REQ_ID=c920a06fbfcc] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-09 23:05:02 --> [CSRF] token name=csrf_test_name hash=1467f79d65a2ca3f9a213d6ba846e6c7
DEBUG - 2026-03-09 23:05:02 --> [REQ_ID=885882c63539] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-09 23:05:02 --> [REQ_ID=885882c63539] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-09 23:05:02 --> [REQ_ID=4581736090bc] [METHOD_ENTRY] index
DEBUG - 2026-03-09 23:05:02 --> [REQ_ID=56b73927273f] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-09 23:05:02 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-09 23:05:02 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-09 23:05:02 --> [REQ_ID=c920a06fbfcc] [FILTER_AFTER]
DEBUG - 2026-03-09 23:05:02 --> [REQ_ID=c920a06fbfcc] [LIFECYCLE][END] status=200 duration_ms=85.75 memory_delta=0
DEBUG - 2026-03-09 23:05:02 --> [REQ_ID=56b73927273f] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-09 23:05:02 --> [REQ_ID=56b73927273f] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-09 23:05:02 --> [REQ_ID=56b73927273f] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
INFO - 2026-03-09 23:05:02 --> [REQ_ID=885882c63539] [PERF] Execution time=0.085431
DEBUG - 2026-03-09 23:05:02 --> [REQ_ID=c920a06fbfcc] [REQUEST][END]
INFO - 2026-03-09 23:05:02 --> [REQ_ID=c920a06fbfcc] [PERF] Execution time=0.110059
DEBUG - 2026-03-09 23:05:02 --> [CSRF] token name=csrf_test_name hash=b5332bed802efa8b37a63733676f33c7
DEBUG - 2026-03-09 23:05:02 --> [REQ_ID=c1ed8f706573] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-09 23:05:02 --> [REQ_ID=c1ed8f706573] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-09 23:05:02 --> [REQ_ID=e3e67c02e5b3] [REQUEST][START] GET /index.php/How-It-Works/MyMI-Exchange
DEBUG - 2026-03-09 23:05:02 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-09 23:05:02 --> [REQ_ID=ad9c008e18a0] [REQUEST][START] GET /index.php/How-It-Works/Registering-An-Account
DEBUG - 2026-03-09 23:05:02 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-09 23:05:02 --> [REQ_ID=6087001617d7] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-09 23:05:02 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-09 23:05:02 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-09 23:05:02 --> [REQ_ID=56b73927273f] [FILTER_AFTER]
DEBUG - 2026-03-09 23:05:02 --> [REQ_ID=56b73927273f] [LIFECYCLE][END] status=200 duration_ms=32.74 memory_delta=0
INFO - 2026-03-09 23:05:02 --> [REQ_ID=c1ed8f706573] [PERF] Execution time=0.028157
DEBUG - 2026-03-09 23:05:02 --> [REQ_ID=56b73927273f] [REQUEST][END]
INFO - 2026-03-09 23:05:02 --> [REQ_ID=56b73927273f] [PERF] Execution time=0.075554
DEBUG - 2026-03-09 23:05:02 --> [REQ_ID=e3e67c02e5b3] [FILTER_BEFORE] /index.php/How-It-Works/MyMI-Exchange
DEBUG - 2026-03-09 23:05:02 --> [REQ_ID=e3e67c02e5b3] [ROUTE] Controller=\App\Modules\Blog\Controllers\HowItWorksController Method=show
DEBUG - 2026-03-09 23:05:02 --> [REQ_ID=e3e67c02e5b3] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/How-It-Works/MyMI-Exchange
DEBUG - 2026-03-09 23:05:02 --> [CSRF] token name=csrf_test_name hash=ff4ff1a80df90d8dbee56a62259c6c40
DEBUG - 2026-03-09 23:05:02 --> [REQ_ID=46b2dd3be0d1] [INIT] App\Modules\Blog\Controllers\HowItWorksController::GET
INFO - 2026-03-09 23:05:02 --> [REQ_ID=46b2dd3be0d1] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-09 23:05:02 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-09 23:05:02 --> [REQ_ID=46b2dd3be0d1] [METHOD_ENTRY] show
DEBUG - 2026-03-09 23:05:02 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-09 23:05:02 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-09 23:05:02 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-09 23:05:02 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-09 23:05:02 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-09 23:05:02 --> [REQ_ID=ad9c008e18a0] [FILTER_BEFORE] /index.php/How-It-Works/Registering-An-Account
DEBUG - 2026-03-09 23:05:02 --> [REQ_ID=ad9c008e18a0] [ROUTE] Controller=\App\Modules\Blog\Controllers\HowItWorksController Method=show
DEBUG - 2026-03-09 23:05:02 --> [REQ_ID=ad9c008e18a0] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/How-It-Works/Registering-An-Account
DEBUG - 2026-03-09 23:05:02 --> [CSRF] token name=csrf_test_name hash=99c92acc2e81647563d230d704c328f1
DEBUG - 2026-03-09 23:05:02 --> [REQ_ID=b3b4be2356fa] [INIT] App\Modules\Blog\Controllers\HowItWorksController::GET
INFO - 2026-03-09 23:05:02 --> [REQ_ID=b3b4be2356fa] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-09 23:05:02 --> [REQ_ID=7c52a9912e35] [REQUEST][START] GET /index.php/Preview/Alert/NASDAQ-GUTS
DEBUG - 2026-03-09 23:05:02 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-09 23:05:02 --> MyMICoin: guest context detected; skipping user-specific preload.
ERROR - 2026-03-09 23:05:02 --> HowItWorksController failure: Call to undefined method App\Modules\Blog\Controllers\HowItWorksController::respondWithRendered()
DEBUG - 2026-03-09 23:05:02 --> [REQ_ID=6087001617d7] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-09 23:05:02 --> [REQ_ID=6087001617d7] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-09 23:05:02 --> [REQ_ID=6087001617d7] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-09 23:05:02 --> [CSRF] token name=csrf_test_name hash=a4fb387ab3da311e1cfdd4bf2b11765f
DEBUG - 2026-03-09 23:05:02 --> [REQ_ID=38611bf2389a] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-09 23:05:02 --> [REQ_ID=38611bf2389a] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-09 23:05:02 --> [REQ_ID=b3b4be2356fa] [METHOD_ENTRY] show
INFO - 2026-03-09 23:05:02 --> [REQ_ID=46b2dd3be0d1] [PERF] Execution time=0.029856
DEBUG - 2026-03-09 23:05:02 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-09 23:05:02 --> [REQ_ID=7c52a9912e35] [FILTER_BEFORE] /index.php/Preview/Alert/NASDAQ-GUTS
DEBUG - 2026-03-09 23:05:02 --> [REQ_ID=7c52a9912e35] [ROUTE] Controller=\App\Modules\User\Controllers\AlertsController Method=preview
DEBUG - 2026-03-09 23:05:02 --> [REQ_ID=7c52a9912e35] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Preview/Alert/NASDAQ-GUTS
WARNING - 2026-03-09 23:05:02 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-09 23:05:02 --> [CSRF] token name=csrf_test_name hash=41d1af1680198baef12523178bdf5731
DEBUG - 2026-03-09 23:05:02 --> [REQ_ID=eabe9f06ebfc] [INIT] App\Modules\User\Controllers\AlertsController::GET
INFO - 2026-03-09 23:05:02 --> [REQ_ID=eabe9f06ebfc] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-09 23:05:02 --> MyMICoin: guest context detected; skipping user-specific preload.
INFO - 2026-03-09 23:05:02 --> [REQ_ID=4581736090bc] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-09 23:05:02 --> [REQ_ID=4581736090bc] [VIEW_RENDER] SupportModule\Views\Support\index
INFO - 2026-03-09 23:05:02 --> [REQ_ID=4581736090bc] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-09 23:05:02 --> [REQ_ID=6087001617d7] [FILTER_AFTER]
DEBUG - 2026-03-09 23:05:02 --> [REQ_ID=6087001617d7] [LIFECYCLE][END] status=200 duration_ms=35.75 memory_delta=0
INFO - 2026-03-09 23:05:02 --> [REQ_ID=38611bf2389a] [PERF] Execution time=0.038444
DEBUG - 2026-03-09 23:05:02 --> [REQ_ID=eabe9f06ebfc] [METHOD_ENTRY] preview
DEBUG - 2026-03-09 23:05:02 --> [REQ_ID=6087001617d7] [REQUEST][END]
INFO - 2026-03-09 23:05:02 --> [REQ_ID=6087001617d7] [PERF] Execution time=0.108247
INFO - 2026-03-09 23:05:02 --> themesMemory usage: 6291456
DEBUG - 2026-03-09 23:05:02 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-09 23:05:02 --> [REQ_ID=9279ed913ba0] [REQUEST][START] GET /index.php/Support
DEBUG - 2026-03-09 23:05:02 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-09 23:05:02 --> [REQ_ID=91cfdf3c49ce] [FILTER_AFTER]
DEBUG - 2026-03-09 23:05:02 --> [REQ_ID=91cfdf3c49ce] [LIFECYCLE][END] status=200 duration_ms=281.08 memory_delta=0
INFO - 2026-03-09 23:05:02 --> [REQ_ID=4581736090bc] [PERF] Execution time=0.275430
DEBUG - 2026-03-09 23:05:02 --> [REQ_ID=91cfdf3c49ce] [REQUEST][END]
INFO - 2026-03-09 23:05:02 --> [REQ_ID=91cfdf3c49ce] [PERF] Execution time=0.396222
DEBUG - 2026-03-09 23:05:02 --> [REQ_ID=e94b4cde8239] [REQUEST][START] GET /index.php/How-It-Works/Investment-Dashboard
DEBUG - 2026-03-09 23:05:02 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-09 23:05:02 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-09 23:05:02 --> [REQ_ID=9279ed913ba0] [FILTER_BEFORE] /index.php/Support
DEBUG - 2026-03-09 23:05:02 --> [REQ_ID=9279ed913ba0] [ROUTE] Controller=\App\Modules\Support\Controllers\SupportController Method=index
DEBUG - 2026-03-09 23:05:02 --> [REQ_ID=9279ed913ba0] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Support
DEBUG - 2026-03-09 23:05:02 --> [CSRF] token name=csrf_test_name hash=5dc1c61a98c20a248b7095453bd86579
DEBUG - 2026-03-09 23:05:02 --> [REQ_ID=11e885712f79] [INIT] App\Modules\Support\Controllers\SupportController::GET
INFO - 2026-03-09 23:05:02 --> [REQ_ID=11e885712f79] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-09 23:05:02 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-09 23:05:02 --> [REQ_ID=e94b4cde8239] [FILTER_BEFORE] /index.php/How-It-Works/Investment-Dashboard
DEBUG - 2026-03-09 23:05:02 --> [REQ_ID=e94b4cde8239] [ROUTE] Controller=\App\Modules\Blog\Controllers\HowItWorksController Method=show
DEBUG - 2026-03-09 23:05:02 --> [REQ_ID=e94b4cde8239] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/How-It-Works/Investment-Dashboard
DEBUG - 2026-03-09 23:05:02 --> [CSRF] token name=csrf_test_name hash=8f24962da38319c31e4ae5ac7e09716b
DEBUG - 2026-03-09 23:05:02 --> [REQ_ID=09499f7d3599] [INIT] App\Modules\Blog\Controllers\HowItWorksController::GET
INFO - 2026-03-09 23:05:02 --> [REQ_ID=09499f7d3599] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-09 23:05:02 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-09 23:05:02 --> [REQ_ID=875ad4e0c911] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-09 23:05:02 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-09 23:05:02 --> [REQ_ID=11e885712f79] [METHOD_ENTRY] index
DEBUG - 2026-03-09 23:05:02 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-09 23:05:02 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-09 23:05:02 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-09 23:05:02 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-09 23:05:02 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-09 23:05:02 --> [REQ_ID=09499f7d3599] [METHOD_ENTRY] show
DEBUG - 2026-03-09 23:05:02 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-09 23:05:02 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-09 23:05:02 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-09 23:05:02 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-09 23:05:02 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-09 23:05:02 --> MyMICoin: guest context detected; skipping user-specific preload.
INFO - 2026-03-09 23:05:02 --> [REQ_ID=11e885712f79] [MEMORY][commonData:start] 4194304
DEBUG - 2026-03-09 23:05:02 --> [REQ_ID=11e885712f79] [VIEW_RENDER] SupportModule\Views\Support\index
INFO - 2026-03-09 23:05:02 --> [REQ_ID=11e885712f79] [MEMORY][commonData:start] 4194304
DEBUG - 2026-03-09 23:05:02 --> MyMICoin: guest context detected; skipping user-specific preload.
ERROR - 2026-03-09 23:05:02 --> HowItWorksController failure: Call to undefined method App\Modules\Blog\Controllers\HowItWorksController::respondWithRendered()
DEBUG - 2026-03-09 23:05:02 --> [SERVICE] App\Services\BudgetService ::setUserId
INFO - 2026-03-09 23:05:02 --> [REQ_ID=09499f7d3599] [PERF] Execution time=0.029973
DEBUG - 2026-03-09 23:05:02 --> [REQ_ID=875ad4e0c911] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-09 23:05:02 --> [REQ_ID=875ad4e0c911] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-09 23:05:02 --> [REQ_ID=875ad4e0c911] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-09 23:05:02 --> [CSRF] token name=csrf_test_name hash=8a23a6b9279ac8449d9738065f9b3cd7
DEBUG - 2026-03-09 23:05:02 --> [REQ_ID=4d39b63889f5] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-09 23:05:02 --> [REQ_ID=4d39b63889f5] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-09 23:05:02 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-09 23:05:02 --> [REQ_ID=875ad4e0c911] [FILTER_AFTER]
DEBUG - 2026-03-09 23:05:02 --> [REQ_ID=875ad4e0c911] [LIFECYCLE][END] status=200 duration_ms=18.75 memory_delta=0
INFO - 2026-03-09 23:05:02 --> [REQ_ID=4d39b63889f5] [PERF] Execution time=0.018103
DEBUG - 2026-03-09 23:05:02 --> [REQ_ID=875ad4e0c911] [REQUEST][END]
INFO - 2026-03-09 23:05:02 --> [REQ_ID=875ad4e0c911] [PERF] Execution time=0.042963
INFO - 2026-03-09 23:05:02 --> themesMemory usage: 4194304
DEBUG - 2026-03-09 23:05:02 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-09 23:05:02 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-09 23:05:02 --> [REQ_ID=9279ed913ba0] [FILTER_AFTER]
DEBUG - 2026-03-09 23:05:02 --> [REQ_ID=9279ed913ba0] [LIFECYCLE][END] status=200 duration_ms=81.37 memory_delta=0
INFO - 2026-03-09 23:05:02 --> [REQ_ID=11e885712f79] [PERF] Execution time=0.082268
WARNING - 2026-03-09 23:05:02 --> MyMIWallets initialized without numeric user context.
WARNING - 2026-03-09 23:05:02 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-09 23:05:02 --> [REQ_ID=9279ed913ba0] [REQUEST][END]
INFO - 2026-03-09 23:05:02 --> [REQ_ID=9279ed913ba0] [PERF] Execution time=0.126065
DEBUG - 2026-03-09 23:05:02 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-09 23:05:02 --> MyMICoin: guest context detected; skipping user-specific preload.
ERROR - 2026-03-09 23:05:02 --> HowItWorksController failure: Call to undefined method App\Modules\Blog\Controllers\HowItWorksController::respondWithRendered()
INFO - 2026-03-09 23:05:02 --> [REQ_ID=b3b4be2356fa] [PERF] Execution time=0.215013
DEBUG - 2026-03-09 23:05:02 --> MyMIInvestments: no session user detected; skipping personalized hydration.
DEBUG - 2026-03-09 23:05:02 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-09 23:05:02 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-09 23:05:02 --> MyMIMarketing: Pscrape library not installed; Google search scraping will use fallback.
DEBUG - 2026-03-09 23:05:02 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-09 23:05:02 --> MyMIAlerts: no authenticated user context detected.
DEBUG - 2026-03-09 23:05:02 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-09 23:05:02 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-09 23:05:02 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-09 23:05:02 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-09 23:05:02 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-09 23:05:02 --> [SERVICE] App\Services\BudgetService ::setUserId
INFO - 2026-03-09 23:05:02 --> [REQ_ID=eabe9f06ebfc] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-09 23:05:02 --> MyMIInvestments: no session user detected; skipping personalized hydration.
DEBUG - 2026-03-09 23:05:02 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-09 23:05:02 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-09 23:05:02 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-09 23:05:02 --> MyMIAlerts: no authenticated user context detected.
DEBUG - 2026-03-09 23:05:03 --> [REQ_ID=21a8584ef763] [REQUEST][START] GET /index.php/How-It-Works/index
DEBUG - 2026-03-09 23:05:03 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-09 23:05:03 --> [REQ_ID=21a8584ef763] [FILTER_BEFORE] /index.php/How-It-Works/index
DEBUG - 2026-03-09 23:05:03 --> [REQ_ID=21a8584ef763] [ROUTE] Controller=\App\Modules\Blog\Controllers\HowItWorksController Method=show
DEBUG - 2026-03-09 23:05:03 --> [REQ_ID=21a8584ef763] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/How-It-Works/index
DEBUG - 2026-03-09 23:05:03 --> [CSRF] token name=csrf_test_name hash=1467f79d65a2ca3f9a213d6ba846e6c7
DEBUG - 2026-03-09 23:05:03 --> [REQ_ID=7531973909e9] [INIT] App\Modules\Blog\Controllers\HowItWorksController::GET
INFO - 2026-03-09 23:05:03 --> [REQ_ID=7531973909e9] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-09 23:05:03 --> [REQ_ID=7531973909e9] [METHOD_ENTRY] show
DEBUG - 2026-03-09 23:05:03 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-09 23:05:03 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-09 23:05:03 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-09 23:05:03 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-09 23:05:03 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-09 23:05:03 --> MyMICoin: guest context detected; skipping user-specific preload.
ERROR - 2026-03-09 23:05:03 --> HowItWorksController failure: index
CRITICAL - 2026-03-09 23:05:03 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: GET, Route: How-It-Works/index]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-09 23:05:03 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-09 23:05:03 --> [404] URI=https://www.mymiwallet.com/index.php/How-It-Works/index
WARNING - 2026-03-09 23:05:03 --> 404 route miss: https://www.mymiwallet.com/index.php/How-It-Works/index | referrer: none
INFO - 2026-03-09 23:05:03 --> [REQ_ID=7531973909e9] [PERF] Execution time=0.039827
DEBUG - 2026-03-09 23:05:03 --> [REQ_ID=5064753b7091] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-09 23:05:03 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-09 23:05:03 --> [REQ_ID=5064753b7091] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-09 23:05:03 --> [REQ_ID=5064753b7091] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-09 23:05:03 --> [REQ_ID=5064753b7091] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-09 23:05:03 --> [CSRF] token name=csrf_test_name hash=118d5755a8a980739d3a37939ba3d693
DEBUG - 2026-03-09 23:05:03 --> [REQ_ID=6c5c766eab75] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-09 23:05:03 --> [REQ_ID=6c5c766eab75] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-09 23:05:03 --> [REQ_ID=0a1bf7d0b42d] [REQUEST][START] GET /index.php/Support
DEBUG - 2026-03-09 23:05:03 --> [REQ_ID=d2e7c2629596] [REQUEST][START] GET /index.php/How-It-Works/Purchasing-MyMi-Gold
DEBUG - 2026-03-09 23:05:03 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-09 23:05:03 --> [REQ_ID=5064753b7091] [FILTER_AFTER]
DEBUG - 2026-03-09 23:05:03 --> [REQ_ID=5064753b7091] [LIFECYCLE][END] status=200 duration_ms=22.76 memory_delta=0
INFO - 2026-03-09 23:05:03 --> [REQ_ID=6c5c766eab75] [PERF] Execution time=0.022168
DEBUG - 2026-03-09 23:05:03 --> [REQ_ID=5064753b7091] [REQUEST][END]
INFO - 2026-03-09 23:05:03 --> [REQ_ID=5064753b7091] [PERF] Execution time=0.043652
DEBUG - 2026-03-09 23:05:03 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-09 23:05:03 --> [REQ_ID=0a1bf7d0b42d] [FILTER_BEFORE] /index.php/Support
DEBUG - 2026-03-09 23:05:03 --> [REQ_ID=0a1bf7d0b42d] [ROUTE] Controller=\App\Modules\Support\Controllers\SupportController Method=index
DEBUG - 2026-03-09 23:05:03 --> [REQ_ID=0a1bf7d0b42d] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Support
DEBUG - 2026-03-09 23:05:03 --> [CSRF] token name=csrf_test_name hash=115ed078b1baa9246039258cd1c76420
DEBUG - 2026-03-09 23:05:03 --> [REQ_ID=ea81607d3fbd] [INIT] App\Modules\Support\Controllers\SupportController::GET
INFO - 2026-03-09 23:05:03 --> [REQ_ID=ea81607d3fbd] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-09 23:05:03 --> [REQ_ID=1b8194b88d94] [REQUEST][START] GET /index.php/How-It-Works/MyMi-Gold
DEBUG - 2026-03-09 23:05:03 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-09 23:05:03 --> [REQ_ID=d2e7c2629596] [FILTER_BEFORE] /index.php/How-It-Works/Purchasing-MyMi-Gold
DEBUG - 2026-03-09 23:05:03 --> [REQ_ID=d2e7c2629596] [ROUTE] Controller=\App\Modules\Blog\Controllers\HowItWorksController Method=show
DEBUG - 2026-03-09 23:05:03 --> [REQ_ID=d2e7c2629596] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/How-It-Works/Purchasing-MyMi-Gold
DEBUG - 2026-03-09 23:05:03 --> [CSRF] token name=csrf_test_name hash=ecacc710493fa541d463aa8c1669e74e
DEBUG - 2026-03-09 23:05:03 --> [REQ_ID=d793f61eef20] [INIT] App\Modules\Blog\Controllers\HowItWorksController::GET
INFO - 2026-03-09 23:05:03 --> [REQ_ID=d793f61eef20] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-09 23:05:03 --> [REQ_ID=ea81607d3fbd] [METHOD_ENTRY] index
DEBUG - 2026-03-09 23:05:03 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-09 23:05:03 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-09 23:05:03 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-09 23:05:03 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-09 23:05:03 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-09 23:05:03 --> [REQ_ID=d793f61eef20] [METHOD_ENTRY] show
DEBUG - 2026-03-09 23:05:03 --> [REQ_ID=1b8194b88d94] [FILTER_BEFORE] /index.php/How-It-Works/MyMi-Gold
DEBUG - 2026-03-09 23:05:03 --> [REQ_ID=1b8194b88d94] [ROUTE] Controller=\App\Modules\Blog\Controllers\HowItWorksController Method=show
DEBUG - 2026-03-09 23:05:03 --> [REQ_ID=1b8194b88d94] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/How-It-Works/MyMi-Gold
DEBUG - 2026-03-09 23:05:03 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-09 23:05:03 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-09 23:05:03 --> [CSRF] token name=csrf_test_name hash=17603d3e303ccf1fa1d36e7c4a03b883
DEBUG - 2026-03-09 23:05:03 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-09 23:05:03 --> [REQ_ID=55b8c0a1e4af] [INIT] App\Modules\Blog\Controllers\HowItWorksController::GET
INFO - 2026-03-09 23:05:03 --> [REQ_ID=55b8c0a1e4af] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-09 23:05:03 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-09 23:05:03 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-09 23:05:03 --> MyMICoin: guest context detected; skipping user-specific preload.
INFO - 2026-03-09 23:05:03 --> [REQ_ID=ea81607d3fbd] [MEMORY][commonData:start] 4194304
DEBUG - 2026-03-09 23:05:03 --> [REQ_ID=ea81607d3fbd] [VIEW_RENDER] SupportModule\Views\Support\index
INFO - 2026-03-09 23:05:03 --> [REQ_ID=ea81607d3fbd] [MEMORY][commonData:start] 4194304
DEBUG - 2026-03-09 23:05:03 --> MyMICoin: guest context detected; skipping user-specific preload.
ERROR - 2026-03-09 23:05:03 --> HowItWorksController failure: purchasing-mymi-gold
CRITICAL - 2026-03-09 23:05:03 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: GET, Route: How-It-Works/Purchasing-MyMi-Gold]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
DEBUG - 2026-03-09 23:05:03 --> [REQ_ID=55b8c0a1e4af] [METHOD_ENTRY] show
DEBUG - 2026-03-09 23:05:03 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-09 23:05:03 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-09 23:05:03 --> MyMICoin: guest context detected; skipping user-specific preload.
CRITICAL - 2026-03-09 23:05:03 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
DEBUG - 2026-03-09 23:05:03 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-09 23:05:03 --> MyMIWallets initialized without numeric user context.
INFO - 2026-03-09 23:05:03 --> themesMemory usage: 4194304
WARNING - 2026-03-09 23:05:03 --> [404] URI=https://www.mymiwallet.com/index.php/How-It-Works/Purchasing-MyMi-Gold
WARNING - 2026-03-09 23:05:03 --> 404 route miss: https://www.mymiwallet.com/index.php/How-It-Works/Purchasing-MyMi-Gold | referrer: none
DEBUG - 2026-03-09 23:05:03 --> MyMICoin: guest context detected; skipping user-specific preload.
ERROR - 2026-03-09 23:05:03 --> HowItWorksController failure: Call to undefined method App\Modules\Blog\Controllers\HowItWorksController::respondWithRendered()
INFO - 2026-03-09 23:05:03 --> [REQ_ID=55b8c0a1e4af] [PERF] Execution time=0.031844
INFO - 2026-03-09 23:05:03 --> [REQ_ID=d793f61eef20] [PERF] Execution time=0.056325
DEBUG - 2026-03-09 23:05:03 --> [REQ_ID=0a1bf7d0b42d] [FILTER_AFTER]
DEBUG - 2026-03-09 23:05:03 --> [REQ_ID=0a1bf7d0b42d] [LIFECYCLE][END] status=200 duration_ms=65.14 memory_delta=0
INFO - 2026-03-09 23:05:03 --> [REQ_ID=ea81607d3fbd] [PERF] Execution time=0.064705
DEBUG - 2026-03-09 23:05:03 --> [REQ_ID=0a1bf7d0b42d] [REQUEST][END]
INFO - 2026-03-09 23:05:03 --> [REQ_ID=0a1bf7d0b42d] [PERF] Execution time=0.107736
DEBUG - 2026-03-09 23:05:03 --> [REQ_ID=c543c7e02e3c] [REQUEST][START] GET /index.php/How-It-Works/Purchasing-MyMi-Gold
DEBUG - 2026-03-09 23:05:03 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-09 23:05:03 --> [REQ_ID=61e2be6a2733] [REQUEST][START] GET /index.php/How-It-Works/MyMi-Gold
DEBUG - 2026-03-09 23:05:03 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-09 23:05:03 --> [REQ_ID=c543c7e02e3c] [FILTER_BEFORE] /index.php/How-It-Works/Purchasing-MyMi-Gold
DEBUG - 2026-03-09 23:05:03 --> [REQ_ID=c543c7e02e3c] [ROUTE] Controller=\App\Modules\Blog\Controllers\HowItWorksController Method=show
DEBUG - 2026-03-09 23:05:03 --> [REQ_ID=c543c7e02e3c] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/How-It-Works/Purchasing-MyMi-Gold
DEBUG - 2026-03-09 23:05:03 --> [CSRF] token name=csrf_test_name hash=448b66f9b6f17a6a1e115851f178d85c
DEBUG - 2026-03-09 23:05:03 --> [REQ_ID=b9a755b48533] [INIT] App\Modules\Blog\Controllers\HowItWorksController::GET
INFO - 2026-03-09 23:05:03 --> [REQ_ID=b9a755b48533] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-09 23:05:03 --> [REQ_ID=b9a755b48533] [METHOD_ENTRY] show
DEBUG - 2026-03-09 23:05:03 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-09 23:05:03 --> [REQ_ID=c4f3930a08d7] [REQUEST][START] GET /index.php/How-It-Works/MyMi-Gold
DEBUG - 2026-03-09 23:05:03 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-09 23:05:03 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-09 23:05:03 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-09 23:05:03 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-09 23:05:03 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-09 23:05:03 --> [REQ_ID=61e2be6a2733] [FILTER_BEFORE] /index.php/How-It-Works/MyMi-Gold
DEBUG - 2026-03-09 23:05:03 --> [REQ_ID=61e2be6a2733] [ROUTE] Controller=\App\Modules\Blog\Controllers\HowItWorksController Method=show
DEBUG - 2026-03-09 23:05:03 --> [REQ_ID=61e2be6a2733] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/How-It-Works/MyMi-Gold
DEBUG - 2026-03-09 23:05:03 --> MyMICoin: guest context detected; skipping user-specific preload.
ERROR - 2026-03-09 23:05:03 --> HowItWorksController failure: purchasing-mymi-gold
CRITICAL - 2026-03-09 23:05:03 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: GET, Route: How-It-Works/Purchasing-MyMi-Gold]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
DEBUG - 2026-03-09 23:05:03 --> [CSRF] token name=csrf_test_name hash=3de2cd76fd42dfcdd597913c762bc04d
DEBUG - 2026-03-09 23:05:03 --> [REQ_ID=1ec1ff1e7497] [INIT] App\Modules\Blog\Controllers\HowItWorksController::GET
INFO - 2026-03-09 23:05:03 --> [REQ_ID=1ec1ff1e7497] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-09 23:05:03 --> [REQ_ID=c47ff3360b46] [REQUEST][START] GET /index.php/Support
DEBUG - 2026-03-09 23:05:03 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-09 23:05:03 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-09 23:05:03 --> [404] URI=https://www.mymiwallet.com/index.php/How-It-Works/Purchasing-MyMi-Gold
WARNING - 2026-03-09 23:05:03 --> 404 route miss: https://www.mymiwallet.com/index.php/How-It-Works/Purchasing-MyMi-Gold | referrer: none
DEBUG - 2026-03-09 23:05:03 --> [REQ_ID=c4f3930a08d7] [FILTER_BEFORE] /index.php/How-It-Works/MyMi-Gold
DEBUG - 2026-03-09 23:05:03 --> [REQ_ID=c4f3930a08d7] [ROUTE] Controller=\App\Modules\Blog\Controllers\HowItWorksController Method=show
DEBUG - 2026-03-09 23:05:03 --> [REQ_ID=c4f3930a08d7] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/How-It-Works/MyMi-Gold
DEBUG - 2026-03-09 23:05:03 --> [CSRF] token name=csrf_test_name hash=b312158b3be741780c5cb3df786d9ca2
DEBUG - 2026-03-09 23:05:03 --> [REQ_ID=26acf82eb723] [INIT] App\Modules\Blog\Controllers\HowItWorksController::GET
INFO - 2026-03-09 23:05:03 --> [REQ_ID=26acf82eb723] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-09 23:05:03 --> [REQ_ID=1ec1ff1e7497] [METHOD_ENTRY] show
DEBUG - 2026-03-09 23:05:03 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-09 23:05:03 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-09 23:05:03 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-09 23:05:03 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-09 23:05:03 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-09 23:05:03 --> [REQ_ID=1dc48eeb2d8f] [REQUEST][START] GET /index.php/Support
DEBUG - 2026-03-09 23:05:03 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-09 23:05:03 --> MyMICoin: guest context detected; skipping user-specific preload.
ERROR - 2026-03-09 23:05:03 --> HowItWorksController failure: Call to undefined method App\Modules\Blog\Controllers\HowItWorksController::respondWithRendered()
INFO - 2026-03-09 23:05:03 --> [REQ_ID=b9a755b48533] [PERF] Execution time=0.057249
INFO - 2026-03-09 23:05:03 --> [REQ_ID=1ec1ff1e7497] [PERF] Execution time=0.022985
DEBUG - 2026-03-09 23:05:03 --> [REQ_ID=26acf82eb723] [METHOD_ENTRY] show
DEBUG - 2026-03-09 23:05:03 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-09 23:05:03 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-09 23:05:03 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-09 23:05:03 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-09 23:05:03 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-09 23:05:03 --> MyMICoin: guest context detected; skipping user-specific preload.
ERROR - 2026-03-09 23:05:03 --> HowItWorksController failure: Call to undefined method App\Modules\Blog\Controllers\HowItWorksController::respondWithRendered()
INFO - 2026-03-09 23:05:03 --> [REQ_ID=26acf82eb723] [PERF] Execution time=0.028548
DEBUG - 2026-03-09 23:05:03 --> [REQ_ID=c47ff3360b46] [FILTER_BEFORE] /index.php/Support
DEBUG - 2026-03-09 23:05:03 --> [REQ_ID=c47ff3360b46] [ROUTE] Controller=\App\Modules\Support\Controllers\SupportController Method=index
DEBUG - 2026-03-09 23:05:03 --> [REQ_ID=c47ff3360b46] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Support
DEBUG - 2026-03-09 23:05:03 --> [CSRF] token name=csrf_test_name hash=0f499e4d38b724f9a3ecec4ad8f09d37
DEBUG - 2026-03-09 23:05:03 --> [REQ_ID=7290bc356080] [INIT] App\Modules\Support\Controllers\SupportController::GET
INFO - 2026-03-09 23:05:03 --> [REQ_ID=7290bc356080] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-09 23:05:03 --> [REQ_ID=1dc48eeb2d8f] [FILTER_BEFORE] /index.php/Support
DEBUG - 2026-03-09 23:05:03 --> [REQ_ID=1dc48eeb2d8f] [ROUTE] Controller=\App\Modules\Support\Controllers\SupportController Method=index
DEBUG - 2026-03-09 23:05:03 --> [REQ_ID=1dc48eeb2d8f] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Support
DEBUG - 2026-03-09 23:05:03 --> [CSRF] token name=csrf_test_name hash=8e3ede8f51ace36f9c0e76199a631b47
DEBUG - 2026-03-09 23:05:03 --> [REQ_ID=72b2280c227e] [INIT] App\Modules\Support\Controllers\SupportController::GET
INFO - 2026-03-09 23:05:03 --> [REQ_ID=72b2280c227e] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-09 23:05:03 --> [REQ_ID=7290bc356080] [METHOD_ENTRY] index
DEBUG - 2026-03-09 23:05:03 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-09 23:05:03 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-09 23:05:03 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-09 23:05:03 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-09 23:05:03 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-09 23:05:03 --> [REQ_ID=098892758680] [REQUEST][START] GET /index.php/Blog
DEBUG - 2026-03-09 23:05:03 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-09 23:05:03 --> MyMICoin: guest context detected; skipping user-specific preload.
INFO - 2026-03-09 23:05:03 --> [REQ_ID=7290bc356080] [MEMORY][commonData:start] 4194304
DEBUG - 2026-03-09 23:05:03 --> [REQ_ID=7290bc356080] [VIEW_RENDER] SupportModule\Views\Support\index
DEBUG - 2026-03-09 23:05:03 --> TwelveData batch response error: **symbol** or **figi** parameter is missing or invalid. Please provide a valid symbol according to API documentation: https://twelvedata.com/docs#reference-data
INFO - 2026-03-09 23:05:03 --> [REQ_ID=7290bc356080] [MEMORY][commonData:start] 4194304
DEBUG - 2026-03-09 23:05:03 --> [REQ_ID=72b2280c227e] [METHOD_ENTRY] index
DEBUG - 2026-03-09 23:05:03 --> [REQ_ID=098892758680] [FILTER_BEFORE] /index.php/Blog
DEBUG - 2026-03-09 23:05:03 --> [REQ_ID=098892758680] [ROUTE] Controller=\App\Modules\Blog\Controllers\BlogController Method=index
DEBUG - 2026-03-09 23:05:03 --> [REQ_ID=098892758680] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Blog
DEBUG - 2026-03-09 23:05:03 --> [CSRF] token name=csrf_test_name hash=9f63432873cf09e5809c24c4a0438e0a
DEBUG - 2026-03-09 23:05:03 --> [REQ_ID=413c6eb65411] [INIT] App\Modules\Blog\Controllers\BlogController::GET
INFO - 2026-03-09 23:05:03 --> [REQ_ID=413c6eb65411] [MEMORY][controller-start] 4194304
INFO - 2026-03-09 23:05:03 --> themesMemory usage: 4194304
DEBUG - 2026-03-09 23:05:03 --> [REQ_ID=413c6eb65411] [METHOD_ENTRY] index
DEBUG - 2026-03-09 23:05:03 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-09 23:05:03 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-09 23:05:03 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-09 23:05:03 --> [REQ_ID=c47ff3360b46] [FILTER_AFTER]
DEBUG - 2026-03-09 23:05:03 --> [REQ_ID=c47ff3360b46] [LIFECYCLE][END] status=200 duration_ms=63.40 memory_delta=0
INFO - 2026-03-09 23:05:03 --> [REQ_ID=7290bc356080] [PERF] Execution time=0.065316
DEBUG - 2026-03-09 23:05:03 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-09 23:05:03 --> [REQ_ID=c47ff3360b46] [REQUEST][END]
INFO - 2026-03-09 23:05:03 --> [REQ_ID=c47ff3360b46] [PERF] Execution time=0.105942
DEBUG - 2026-03-09 23:05:03 --> MyMIUser L52 - initialized (first log).
WARNING - 2026-03-09 23:05:03 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-09 23:05:03 --> MyMICoin: guest context detected; skipping user-specific preload.
INFO - 2026-03-09 23:05:03 --> [REQ_ID=413c6eb65411] [MEMORY][commonData:start] 4194304
INFO - 2026-03-09 23:05:03 --> [REQ_ID=413c6eb65411] [PERF] Execution time=0.026225
DEBUG - 2026-03-09 23:05:03 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-09 23:05:03 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-09 23:05:03 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-09 23:05:03 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-09 23:05:03 --> MyMICoin: guest context detected; skipping user-specific preload.
INFO - 2026-03-09 23:05:03 --> [REQ_ID=72b2280c227e] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-09 23:05:03 --> [REQ_ID=72b2280c227e] [VIEW_RENDER] SupportModule\Views\Support\index
INFO - 2026-03-09 23:05:03 --> [REQ_ID=72b2280c227e] [MEMORY][commonData:start] 6291456
INFO - 2026-03-09 23:05:03 --> themesMemory usage: 6291456
DEBUG - 2026-03-09 23:05:03 --> [REQ_ID=1dc48eeb2d8f] [FILTER_AFTER]
DEBUG - 2026-03-09 23:05:03 --> [REQ_ID=1dc48eeb2d8f] [LIFECYCLE][END] status=200 duration_ms=153.86 memory_delta=2097152
INFO - 2026-03-09 23:05:03 --> [REQ_ID=72b2280c227e] [PERF] Execution time=0.155216
DEBUG - 2026-03-09 23:05:03 --> [REQ_ID=1dc48eeb2d8f] [REQUEST][END]
INFO - 2026-03-09 23:05:03 --> [REQ_ID=1dc48eeb2d8f] [PERF] Execution time=0.191392
DEBUG - 2026-03-09 23:05:03 --> [REQ_ID=4a08617c443c] [REQUEST][START] GET /index.php/Support
DEBUG - 2026-03-09 23:05:03 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-09 23:05:03 --> [REQ_ID=c62d3741d3b0] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-09 23:05:03 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-09 23:05:03 --> [REQ_ID=41ff942e277a] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-09 23:05:03 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-09 23:05:03 --> [REQ_ID=4a08617c443c] [FILTER_BEFORE] /index.php/Support
DEBUG - 2026-03-09 23:05:03 --> [REQ_ID=4a08617c443c] [ROUTE] Controller=\App\Modules\Support\Controllers\SupportController Method=index
DEBUG - 2026-03-09 23:05:03 --> [REQ_ID=4a08617c443c] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Support
DEBUG - 2026-03-09 23:05:03 --> [CSRF] token name=csrf_test_name hash=f9c09503c5e60b20f48a202994689f82
DEBUG - 2026-03-09 23:05:03 --> [REQ_ID=ce63d542d660] [INIT] App\Modules\Support\Controllers\SupportController::GET
INFO - 2026-03-09 23:05:03 --> [REQ_ID=ce63d542d660] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-09 23:05:03 --> [REQ_ID=c62d3741d3b0] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-09 23:05:03 --> [REQ_ID=c62d3741d3b0] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-09 23:05:03 --> [REQ_ID=c62d3741d3b0] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-09 23:05:03 --> [CSRF] token name=csrf_test_name hash=fb8025f698ded963e1e607a57851162a
DEBUG - 2026-03-09 23:05:03 --> [REQ_ID=89177ef69b05] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-09 23:05:03 --> [REQ_ID=89177ef69b05] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-09 23:05:03 --> [REQ_ID=ce63d542d660] [METHOD_ENTRY] index
DEBUG - 2026-03-09 23:05:03 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-09 23:05:03 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-09 23:05:03 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-09 23:05:03 --> [REQ_ID=41ff942e277a] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-09 23:05:03 --> [REQ_ID=41ff942e277a] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-09 23:05:03 --> [REQ_ID=41ff942e277a] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-09 23:05:03 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-09 23:05:03 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-09 23:05:03 --> [CSRF] token name=csrf_test_name hash=22e82f27df8af99a6e532139cdb19f31
DEBUG - 2026-03-09 23:05:03 --> [REQ_ID=1661677445c3] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-09 23:05:03 --> [REQ_ID=1661677445c3] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-09 23:05:03 --> MyMICoin: guest context detected; skipping user-specific preload.
INFO - 2026-03-09 23:05:03 --> [REQ_ID=ce63d542d660] [MEMORY][commonData:start] 4194304
DEBUG - 2026-03-09 23:05:03 --> [REQ_ID=ce63d542d660] [VIEW_RENDER] SupportModule\Views\Support\index
INFO - 2026-03-09 23:05:03 --> [REQ_ID=ce63d542d660] [MEMORY][commonData:start] 4194304
DEBUG - 2026-03-09 23:05:03 --> [REQ_ID=c62d3741d3b0] [FILTER_AFTER]
DEBUG - 2026-03-09 23:05:03 --> [REQ_ID=c62d3741d3b0] [LIFECYCLE][END] status=200 duration_ms=26.78 memory_delta=0
INFO - 2026-03-09 23:05:03 --> [REQ_ID=89177ef69b05] [PERF] Execution time=0.026610
DEBUG - 2026-03-09 23:05:03 --> [REQ_ID=c62d3741d3b0] [REQUEST][END]
INFO - 2026-03-09 23:05:03 --> [REQ_ID=c62d3741d3b0] [PERF] Execution time=0.064040
DEBUG - 2026-03-09 23:05:03 --> [REQ_ID=41ff942e277a] [FILTER_AFTER]
DEBUG - 2026-03-09 23:05:03 --> [REQ_ID=41ff942e277a] [LIFECYCLE][END] status=200 duration_ms=19.45 memory_delta=0
INFO - 2026-03-09 23:05:03 --> [REQ_ID=1661677445c3] [PERF] Execution time=0.020579
DEBUG - 2026-03-09 23:05:03 --> [REQ_ID=41ff942e277a] [REQUEST][END]
INFO - 2026-03-09 23:05:03 --> [REQ_ID=41ff942e277a] [PERF] Execution time=0.046039
INFO - 2026-03-09 23:05:03 --> themesMemory usage: 4194304
DEBUG - 2026-03-09 23:05:03 --> [REQ_ID=4a08617c443c] [FILTER_AFTER]
DEBUG - 2026-03-09 23:05:03 --> [REQ_ID=4a08617c443c] [LIFECYCLE][END] status=200 duration_ms=54.22 memory_delta=0
INFO - 2026-03-09 23:05:03 --> [REQ_ID=ce63d542d660] [PERF] Execution time=0.054357
DEBUG - 2026-03-09 23:05:03 --> [REQ_ID=4a08617c443c] [REQUEST][END]
INFO - 2026-03-09 23:05:03 --> [REQ_ID=4a08617c443c] [PERF] Execution time=0.097205
DEBUG - 2026-03-09 23:05:03 --> Marketstack fallback failed: 22 : The requested URL returned error: 403
DEBUG - 2026-03-09 23:05:03 --> [REQ_ID=86075d46719a] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-09 23:05:03 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-09 23:05:03 --> [REQ_ID=eabe9f06ebfc] [VIEW_RENDER] themes/public/previewAlert
INFO - 2026-03-09 23:05:03 --> [REQ_ID=eabe9f06ebfc] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-09 23:05:03 --> [REQ_ID=86075d46719a] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-09 23:05:03 --> [REQ_ID=86075d46719a] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-09 23:05:03 --> [REQ_ID=86075d46719a] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-09 23:05:03 --> [CSRF] token name=csrf_test_name hash=b1218651439a0d04344802d3565409da
DEBUG - 2026-03-09 23:05:03 --> [REQ_ID=1412f39874b0] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-09 23:05:03 --> [REQ_ID=1412f39874b0] [MEMORY][controller-start] 4194304
INFO - 2026-03-09 23:05:03 --> themesMemory usage: 6291456
DEBUG - 2026-03-09 23:05:03 --> [REQ_ID=7c52a9912e35] [FILTER_AFTER]
DEBUG - 2026-03-09 23:05:03 --> [REQ_ID=7c52a9912e35] [LIFECYCLE][END] status=200 duration_ms=1,084.38 memory_delta=2097152
INFO - 2026-03-09 23:05:03 --> [REQ_ID=eabe9f06ebfc] [PERF] Execution time=1.081853
DEBUG - 2026-03-09 23:05:03 --> [REQ_ID=7c52a9912e35] [REQUEST][END]
INFO - 2026-03-09 23:05:03 --> [REQ_ID=7c52a9912e35] [PERF] Execution time=1.116995
DEBUG - 2026-03-09 23:05:03 --> [REQ_ID=86075d46719a] [FILTER_AFTER]
DEBUG - 2026-03-09 23:05:03 --> [REQ_ID=86075d46719a] [LIFECYCLE][END] status=200 duration_ms=24.29 memory_delta=0
INFO - 2026-03-09 23:05:03 --> [REQ_ID=1412f39874b0] [PERF] Execution time=0.021918
DEBUG - 2026-03-09 23:05:03 --> [REQ_ID=86075d46719a] [REQUEST][END]
INFO - 2026-03-09 23:05:03 --> [REQ_ID=86075d46719a] [PERF] Execution time=0.052440
DEBUG - 2026-03-09 23:05:03 --> [REQ_ID=1f894ef06eab] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-09 23:05:03 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-09 23:05:03 --> [REQ_ID=1f894ef06eab] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-09 23:05:03 --> [REQ_ID=1f894ef06eab] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-09 23:05:03 --> [REQ_ID=1f894ef06eab] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-09 23:05:03 --> [CSRF] token name=csrf_test_name hash=41c5299bdfefcb0638a4b28c8be7a4ad
DEBUG - 2026-03-09 23:05:03 --> [REQ_ID=025628d9f144] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-09 23:05:03 --> [REQ_ID=025628d9f144] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-09 23:05:03 --> [REQ_ID=1f894ef06eab] [FILTER_AFTER]
DEBUG - 2026-03-09 23:05:03 --> [REQ_ID=1f894ef06eab] [LIFECYCLE][END] status=200 duration_ms=19.44 memory_delta=0
INFO - 2026-03-09 23:05:03 --> [REQ_ID=025628d9f144] [PERF] Execution time=0.019383
DEBUG - 2026-03-09 23:05:03 --> [REQ_ID=1f894ef06eab] [REQUEST][END]
INFO - 2026-03-09 23:05:03 --> [REQ_ID=1f894ef06eab] [PERF] Execution time=0.032801
DEBUG - 2026-03-09 23:05:03 --> [REQ_ID=7820e08cf0fe] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-09 23:05:03 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-09 23:05:03 --> [REQ_ID=7820e08cf0fe] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-09 23:05:03 --> [REQ_ID=7820e08cf0fe] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-09 23:05:03 --> [REQ_ID=7820e08cf0fe] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-09 23:05:03 --> [CSRF] token name=csrf_test_name hash=093e22b8b9ad669b2f4d3c03122b7cf8
DEBUG - 2026-03-09 23:05:03 --> [REQ_ID=cf53871181b3] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-09 23:05:03 --> [REQ_ID=cf53871181b3] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-09 23:05:04 --> [REQ_ID=7820e08cf0fe] [FILTER_AFTER]
DEBUG - 2026-03-09 23:05:04 --> [REQ_ID=7820e08cf0fe] [LIFECYCLE][END] status=200 duration_ms=20.25 memory_delta=0
INFO - 2026-03-09 23:05:04 --> [REQ_ID=cf53871181b3] [PERF] Execution time=0.019353
DEBUG - 2026-03-09 23:05:04 --> [REQ_ID=7820e08cf0fe] [REQUEST][END]
INFO - 2026-03-09 23:05:04 --> [REQ_ID=7820e08cf0fe] [PERF] Execution time=0.033007
DEBUG - 2026-03-09 23:05:04 --> [REQ_ID=7f1882b02fe7] [REQUEST][START] GET /index.php/Support
DEBUG - 2026-03-09 23:05:04 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-09 23:05:04 --> [REQ_ID=7f1882b02fe7] [FILTER_BEFORE] /index.php/Support
DEBUG - 2026-03-09 23:05:04 --> [REQ_ID=7f1882b02fe7] [ROUTE] Controller=\App\Modules\Support\Controllers\SupportController Method=index
DEBUG - 2026-03-09 23:05:04 --> [REQ_ID=7f1882b02fe7] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Support
DEBUG - 2026-03-09 23:05:04 --> [CSRF] token name=csrf_test_name hash=71fe2e6bfca3ba5726afd078b18a13af
DEBUG - 2026-03-09 23:05:04 --> [REQ_ID=f7bce356726b] [INIT] App\Modules\Support\Controllers\SupportController::GET
INFO - 2026-03-09 23:05:04 --> [REQ_ID=f7bce356726b] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-09 23:05:04 --> [REQ_ID=f7bce356726b] [METHOD_ENTRY] index
DEBUG - 2026-03-09 23:05:04 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-09 23:05:04 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-09 23:05:04 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-09 23:05:04 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-09 23:05:04 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-09 23:05:04 --> MyMICoin: guest context detected; skipping user-specific preload.
INFO - 2026-03-09 23:05:04 --> [REQ_ID=f7bce356726b] [MEMORY][commonData:start] 4194304
DEBUG - 2026-03-09 23:05:04 --> [REQ_ID=f7bce356726b] [VIEW_RENDER] SupportModule\Views\Support\index
INFO - 2026-03-09 23:05:04 --> [REQ_ID=f7bce356726b] [MEMORY][commonData:start] 4194304
DEBUG - 2026-03-09 23:05:04 --> [REQ_ID=5f704812aa4b] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-09 23:05:04 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
INFO - 2026-03-09 23:05:04 --> themesMemory usage: 4194304
DEBUG - 2026-03-09 23:05:04 --> [REQ_ID=7f1882b02fe7] [FILTER_AFTER]
DEBUG - 2026-03-09 23:05:04 --> [REQ_ID=7f1882b02fe7] [LIFECYCLE][END] status=200 duration_ms=58.53 memory_delta=0
INFO - 2026-03-09 23:05:04 --> [REQ_ID=f7bce356726b] [PERF] Execution time=0.054802
DEBUG - 2026-03-09 23:05:04 --> [REQ_ID=7f1882b02fe7] [REQUEST][END]
INFO - 2026-03-09 23:05:04 --> [REQ_ID=7f1882b02fe7] [PERF] Execution time=0.074698
DEBUG - 2026-03-09 23:05:04 --> [REQ_ID=5f704812aa4b] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-09 23:05:04 --> [REQ_ID=5f704812aa4b] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-09 23:05:04 --> [REQ_ID=5f704812aa4b] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-09 23:05:04 --> [CSRF] token name=csrf_test_name hash=68cb2bfc52d32c5109ca964266b9a43a
DEBUG - 2026-03-09 23:05:04 --> [REQ_ID=cb10793a1ee9] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-09 23:05:04 --> [REQ_ID=cb10793a1ee9] [MEMORY][controller-start] 6291456
DEBUG - 2026-03-09 23:05:04 --> [REQ_ID=4d2ae0c8b268] [REQUEST][START] GET /index.php/How-It-Works/Registering-An-Account
DEBUG - 2026-03-09 23:05:04 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-09 23:05:04 --> [REQ_ID=5f704812aa4b] [FILTER_AFTER]
DEBUG - 2026-03-09 23:05:04 --> [REQ_ID=5f704812aa4b] [LIFECYCLE][END] status=200 duration_ms=27.22 memory_delta=0
INFO - 2026-03-09 23:05:04 --> [REQ_ID=cb10793a1ee9] [PERF] Execution time=0.024326
DEBUG - 2026-03-09 23:05:04 --> [REQ_ID=5f704812aa4b] [REQUEST][END]
INFO - 2026-03-09 23:05:04 --> [REQ_ID=5f704812aa4b] [PERF] Execution time=0.051349
DEBUG - 2026-03-09 23:05:04 --> [REQ_ID=4d2ae0c8b268] [FILTER_BEFORE] /index.php/How-It-Works/Registering-An-Account
DEBUG - 2026-03-09 23:05:04 --> [REQ_ID=4d2ae0c8b268] [ROUTE] Controller=\App\Modules\Blog\Controllers\HowItWorksController Method=show
DEBUG - 2026-03-09 23:05:04 --> [REQ_ID=4d2ae0c8b268] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/How-It-Works/Registering-An-Account
DEBUG - 2026-03-09 23:05:04 --> [CSRF] token name=csrf_test_name hash=22e82f27df8af99a6e532139cdb19f31
DEBUG - 2026-03-09 23:05:04 --> [REQ_ID=8f22b2cb18db] [INIT] App\Modules\Blog\Controllers\HowItWorksController::GET
INFO - 2026-03-09 23:05:04 --> [REQ_ID=8f22b2cb18db] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-09 23:05:04 --> [REQ_ID=8f22b2cb18db] [METHOD_ENTRY] show
DEBUG - 2026-03-09 23:05:04 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-09 23:05:04 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-09 23:05:04 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-09 23:05:04 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-09 23:05:04 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-09 23:05:04 --> MyMICoin: guest context detected; skipping user-specific preload.
ERROR - 2026-03-09 23:05:04 --> HowItWorksController failure: Call to undefined method App\Modules\Blog\Controllers\HowItWorksController::respondWithRendered()
INFO - 2026-03-09 23:05:04 --> [REQ_ID=8f22b2cb18db] [PERF] Execution time=0.018376
DEBUG - 2026-03-09 23:05:04 --> [REQ_ID=ecb2c9fff8df] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-09 23:05:04 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-09 23:05:04 --> [REQ_ID=ecb2c9fff8df] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-09 23:05:04 --> [REQ_ID=ecb2c9fff8df] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-09 23:05:04 --> [REQ_ID=ecb2c9fff8df] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-09 23:05:04 --> [CSRF] token name=csrf_test_name hash=59ebcfad4b32995aaec7d0b16e33b5a4
DEBUG - 2026-03-09 23:05:04 --> [REQ_ID=06cee098184d] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-09 23:05:04 --> [REQ_ID=06cee098184d] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-09 23:05:04 --> [REQ_ID=ecb2c9fff8df] [FILTER_AFTER]
DEBUG - 2026-03-09 23:05:04 --> [REQ_ID=ecb2c9fff8df] [LIFECYCLE][END] status=200 duration_ms=16.63 memory_delta=0
INFO - 2026-03-09 23:05:04 --> [REQ_ID=06cee098184d] [PERF] Execution time=0.014548
DEBUG - 2026-03-09 23:05:04 --> [REQ_ID=ecb2c9fff8df] [REQUEST][END]
INFO - 2026-03-09 23:05:04 --> [REQ_ID=ecb2c9fff8df] [PERF] Execution time=0.029671
DEBUG - 2026-03-09 23:05:04 --> [REQ_ID=8bf2c359ace3] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-09 23:05:04 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-09 23:05:04 --> [REQ_ID=8bf2c359ace3] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-09 23:05:04 --> [REQ_ID=8bf2c359ace3] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-09 23:05:04 --> [REQ_ID=8bf2c359ace3] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-09 23:05:04 --> [CSRF] token name=csrf_test_name hash=174424f3774ef82d03efd4016763b00f
DEBUG - 2026-03-09 23:05:04 --> [REQ_ID=d69d18da5e8d] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-09 23:05:04 --> [REQ_ID=d69d18da5e8d] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-09 23:05:04 --> [REQ_ID=8bf2c359ace3] [FILTER_AFTER]
DEBUG - 2026-03-09 23:05:04 --> [REQ_ID=8bf2c359ace3] [LIFECYCLE][END] status=200 duration_ms=17.25 memory_delta=0
INFO - 2026-03-09 23:05:04 --> [REQ_ID=d69d18da5e8d] [PERF] Execution time=0.016997
DEBUG - 2026-03-09 23:05:04 --> [REQ_ID=8bf2c359ace3] [REQUEST][END]
INFO - 2026-03-09 23:05:04 --> [REQ_ID=8bf2c359ace3] [PERF] Execution time=0.029748
DEBUG - 2026-03-09 23:05:04 --> [REQ_ID=5391390fff25] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-09 23:05:04 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-09 23:05:04 --> [REQ_ID=5391390fff25] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-09 23:05:04 --> [REQ_ID=5391390fff25] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-09 23:05:04 --> [REQ_ID=5391390fff25] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-09 23:05:04 --> [CSRF] token name=csrf_test_name hash=e9cd86dec5653f291125d42000846977
DEBUG - 2026-03-09 23:05:04 --> [REQ_ID=d388d2c81543] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-09 23:05:04 --> [REQ_ID=d388d2c81543] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-09 23:05:04 --> [REQ_ID=5391390fff25] [FILTER_AFTER]
DEBUG - 2026-03-09 23:05:04 --> [REQ_ID=5391390fff25] [LIFECYCLE][END] status=200 duration_ms=24.79 memory_delta=0
INFO - 2026-03-09 23:05:04 --> [REQ_ID=d388d2c81543] [PERF] Execution time=0.025041
DEBUG - 2026-03-09 23:05:04 --> [REQ_ID=5391390fff25] [REQUEST][END]
INFO - 2026-03-09 23:05:04 --> [REQ_ID=5391390fff25] [PERF] Execution time=0.040046
DEBUG - 2026-03-09 23:05:04 --> [REQ_ID=e1187f6e8fe0] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-09 23:05:04 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-09 23:05:04 --> [REQ_ID=e1187f6e8fe0] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-09 23:05:04 --> [REQ_ID=e1187f6e8fe0] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-09 23:05:04 --> [REQ_ID=e1187f6e8fe0] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-09 23:05:04 --> [CSRF] token name=csrf_test_name hash=7fece4dc0e9bc9c7224bbdc4bd0d67f0
DEBUG - 2026-03-09 23:05:04 --> [REQ_ID=905f82b3f2b0] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-09 23:05:04 --> [REQ_ID=905f82b3f2b0] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-09 23:05:04 --> [REQ_ID=0fdc30c05d41] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-09 23:05:04 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-09 23:05:04 --> [REQ_ID=e1187f6e8fe0] [FILTER_AFTER]
DEBUG - 2026-03-09 23:05:04 --> [REQ_ID=e1187f6e8fe0] [LIFECYCLE][END] status=200 duration_ms=20.82 memory_delta=0
INFO - 2026-03-09 23:05:04 --> [REQ_ID=905f82b3f2b0] [PERF] Execution time=0.019779
DEBUG - 2026-03-09 23:05:04 --> [REQ_ID=e1187f6e8fe0] [REQUEST][END]
INFO - 2026-03-09 23:05:04 --> [REQ_ID=e1187f6e8fe0] [PERF] Execution time=0.036719
DEBUG - 2026-03-09 23:05:04 --> [REQ_ID=0fdc30c05d41] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-09 23:05:04 --> [REQ_ID=0fdc30c05d41] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-09 23:05:04 --> [REQ_ID=0fdc30c05d41] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-09 23:05:04 --> [CSRF] token name=csrf_test_name hash=639fd0937715d365c4b7e342703f61f3
DEBUG - 2026-03-09 23:05:04 --> [REQ_ID=a83bb790a74a] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-09 23:05:04 --> [REQ_ID=a83bb790a74a] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-09 23:05:04 --> [REQ_ID=0fdc30c05d41] [FILTER_AFTER]
DEBUG - 2026-03-09 23:05:04 --> [REQ_ID=0fdc30c05d41] [LIFECYCLE][END] status=200 duration_ms=22.11 memory_delta=0
INFO - 2026-03-09 23:05:04 --> [REQ_ID=a83bb790a74a] [PERF] Execution time=0.025567
DEBUG - 2026-03-09 23:05:04 --> [REQ_ID=0fdc30c05d41] [REQUEST][END]
INFO - 2026-03-09 23:05:04 --> [REQ_ID=0fdc30c05d41] [PERF] Execution time=0.039242
DEBUG - 2026-03-09 23:05:04 --> [REQ_ID=69c0c16be8c0] [REQUEST][START] GET /index.php/How-It-Works/marketing
DEBUG - 2026-03-09 23:05:04 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-09 23:05:04 --> [REQ_ID=20c8ea81ca95] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-09 23:05:04 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-09 23:05:04 --> [REQ_ID=235c4e90b961] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-09 23:05:04 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-09 23:05:04 --> [REQ_ID=89cb0a238dda] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-09 23:05:04 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-09 23:05:04 --> [REQ_ID=20c8ea81ca95] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-09 23:05:04 --> [REQ_ID=20c8ea81ca95] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-09 23:05:04 --> [REQ_ID=20c8ea81ca95] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-09 23:05:05 --> [CSRF] token name=csrf_test_name hash=8e3ede8f51ace36f9c0e76199a631b47
DEBUG - 2026-03-09 23:05:05 --> [REQ_ID=5fc51ade18db] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-09 23:05:05 --> [REQ_ID=5fc51ade18db] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-09 23:05:05 --> [REQ_ID=69c0c16be8c0] [FILTER_BEFORE] /index.php/How-It-Works/marketing
DEBUG - 2026-03-09 23:05:05 --> [REQ_ID=69c0c16be8c0] [ROUTE] Controller=\App\Modules\Blog\Controllers\HowItWorksController Method=show
DEBUG - 2026-03-09 23:05:05 --> [REQ_ID=69c0c16be8c0] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/How-It-Works/marketing
DEBUG - 2026-03-09 23:05:05 --> [CSRF] token name=csrf_test_name hash=093e22b8b9ad669b2f4d3c03122b7cf8
DEBUG - 2026-03-09 23:05:05 --> [REQ_ID=cbb18c8795f4] [INIT] App\Modules\Blog\Controllers\HowItWorksController::GET
INFO - 2026-03-09 23:05:05 --> [REQ_ID=cbb18c8795f4] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-09 23:05:05 --> [REQ_ID=245a51397ef3] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-09 23:05:05 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-09 23:05:05 --> [REQ_ID=235c4e90b961] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-09 23:05:05 --> [REQ_ID=235c4e90b961] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-09 23:05:05 --> [REQ_ID=235c4e90b961] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-09 23:05:05 --> [CSRF] token name=csrf_test_name hash=4ab5ec3b94dd9d887efee3a0c8d0f45d
DEBUG - 2026-03-09 23:05:05 --> [REQ_ID=2f1a3ec4b859] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-09 23:05:05 --> [REQ_ID=2f1a3ec4b859] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-09 23:05:05 --> [REQ_ID=89cb0a238dda] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-09 23:05:05 --> [REQ_ID=89cb0a238dda] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-09 23:05:05 --> [REQ_ID=89cb0a238dda] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-09 23:05:05 --> [REQ_ID=20c8ea81ca95] [FILTER_AFTER]
DEBUG - 2026-03-09 23:05:05 --> [REQ_ID=20c8ea81ca95] [LIFECYCLE][END] status=200 duration_ms=28.48 memory_delta=0
INFO - 2026-03-09 23:05:05 --> [REQ_ID=5fc51ade18db] [PERF] Execution time=0.022422
DEBUG - 2026-03-09 23:05:05 --> [CSRF] token name=csrf_test_name hash=01fa4f129416b2b9514001adc8fc25b6
DEBUG - 2026-03-09 23:05:05 --> [REQ_ID=5de28030368e] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-09 23:05:05 --> [REQ_ID=5de28030368e] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-09 23:05:05 --> [REQ_ID=20c8ea81ca95] [REQUEST][END]
INFO - 2026-03-09 23:05:05 --> [REQ_ID=20c8ea81ca95] [PERF] Execution time=0.064921
DEBUG - 2026-03-09 23:05:05 --> [REQ_ID=235c4e90b961] [FILTER_AFTER]
DEBUG - 2026-03-09 23:05:05 --> [REQ_ID=235c4e90b961] [LIFECYCLE][END] status=200 duration_ms=22.31 memory_delta=0
INFO - 2026-03-09 23:05:05 --> [REQ_ID=2f1a3ec4b859] [PERF] Execution time=0.022389
DEBUG - 2026-03-09 23:05:05 --> [REQ_ID=235c4e90b961] [REQUEST][END]
INFO - 2026-03-09 23:05:05 --> [REQ_ID=235c4e90b961] [PERF] Execution time=0.060565
DEBUG - 2026-03-09 23:05:05 --> [REQ_ID=cbb18c8795f4] [METHOD_ENTRY] show
DEBUG - 2026-03-09 23:05:05 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-09 23:05:05 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-09 23:05:05 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-09 23:05:05 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-09 23:05:05 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-09 23:05:05 --> [REQ_ID=91142f8bf224] [REQUEST][START] GET /index.php/How-It-Works/Investment-Dashboard
DEBUG - 2026-03-09 23:05:05 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-09 23:05:05 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-09 23:05:05 --> [REQ_ID=89cb0a238dda] [FILTER_AFTER]
DEBUG - 2026-03-09 23:05:05 --> [REQ_ID=89cb0a238dda] [LIFECYCLE][END] status=200 duration_ms=28.46 memory_delta=0
INFO - 2026-03-09 23:05:05 --> [REQ_ID=5de28030368e] [PERF] Execution time=0.025059
DEBUG - 2026-03-09 23:05:05 --> [REQ_ID=89cb0a238dda] [REQUEST][END]
INFO - 2026-03-09 23:05:05 --> [REQ_ID=89cb0a238dda] [PERF] Execution time=0.056063
ERROR - 2026-03-09 23:05:05 --> HowItWorksController failure: marketing
DEBUG - 2026-03-09 23:05:05 --> [REQ_ID=245a51397ef3] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-09 23:05:05 --> [REQ_ID=245a51397ef3] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-09 23:05:05 --> [REQ_ID=245a51397ef3] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-09 23:05:05 --> [CSRF] token name=csrf_test_name hash=7140cdc8cb2413a2a0fccfdfa0efa656
DEBUG - 2026-03-09 23:05:05 --> [REQ_ID=0e363c0169be] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-09 23:05:05 --> [REQ_ID=0e363c0169be] [MEMORY][controller-start] 4194304
CRITICAL - 2026-03-09 23:05:05 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: GET, Route: How-It-Works/marketing]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-09 23:05:05 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
DEBUG - 2026-03-09 23:05:05 --> [REQ_ID=c0f0e47dc944] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-09 23:05:05 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
WARNING - 2026-03-09 23:05:05 --> [404] URI=https://www.mymiwallet.com/index.php/How-It-Works/marketing
WARNING - 2026-03-09 23:05:05 --> 404 route miss: https://www.mymiwallet.com/index.php/How-It-Works/marketing | referrer: none
DEBUG - 2026-03-09 23:05:05 --> [REQ_ID=245a51397ef3] [FILTER_AFTER]
DEBUG - 2026-03-09 23:05:05 --> [REQ_ID=245a51397ef3] [LIFECYCLE][END] status=200 duration_ms=24.99 memory_delta=0
INFO - 2026-03-09 23:05:05 --> [REQ_ID=0e363c0169be] [PERF] Execution time=0.022386
DEBUG - 2026-03-09 23:05:05 --> [REQ_ID=245a51397ef3] [REQUEST][END]
INFO - 2026-03-09 23:05:05 --> [REQ_ID=245a51397ef3] [PERF] Execution time=0.072874
INFO - 2026-03-09 23:05:05 --> [REQ_ID=cbb18c8795f4] [PERF] Execution time=0.075302
DEBUG - 2026-03-09 23:05:05 --> [REQ_ID=91142f8bf224] [FILTER_BEFORE] /index.php/How-It-Works/Investment-Dashboard
DEBUG - 2026-03-09 23:05:05 --> [REQ_ID=91142f8bf224] [ROUTE] Controller=\App\Modules\Blog\Controllers\HowItWorksController Method=show
DEBUG - 2026-03-09 23:05:05 --> [REQ_ID=91142f8bf224] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/How-It-Works/Investment-Dashboard
DEBUG - 2026-03-09 23:05:05 --> [CSRF] token name=csrf_test_name hash=ae3ec6a9e8dabb5b2042b838ad6769ce
DEBUG - 2026-03-09 23:05:05 --> [REQ_ID=81d177a664d0] [INIT] App\Modules\Blog\Controllers\HowItWorksController::GET
INFO - 2026-03-09 23:05:05 --> [REQ_ID=81d177a664d0] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-09 23:05:05 --> [REQ_ID=c0f0e47dc944] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-09 23:05:05 --> [REQ_ID=c0f0e47dc944] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-09 23:05:05 --> [REQ_ID=c0f0e47dc944] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-09 23:05:05 --> [CSRF] token name=csrf_test_name hash=3e478a36da2bb74d4b49dcb138da5dd8
DEBUG - 2026-03-09 23:05:05 --> [REQ_ID=dd5b59d2809a] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-09 23:05:05 --> [REQ_ID=dd5b59d2809a] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-09 23:05:05 --> [REQ_ID=81d177a664d0] [METHOD_ENTRY] show
DEBUG - 2026-03-09 23:05:05 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-09 23:05:05 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-09 23:05:05 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-09 23:05:05 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-09 23:05:05 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-09 23:05:05 --> MyMICoin: guest context detected; skipping user-specific preload.
ERROR - 2026-03-09 23:05:05 --> HowItWorksController failure: Call to undefined method App\Modules\Blog\Controllers\HowItWorksController::respondWithRendered()
DEBUG - 2026-03-09 23:05:05 --> [REQ_ID=c0f0e47dc944] [FILTER_AFTER]
DEBUG - 2026-03-09 23:05:05 --> [REQ_ID=c0f0e47dc944] [LIFECYCLE][END] status=200 duration_ms=26.32 memory_delta=0
INFO - 2026-03-09 23:05:05 --> [REQ_ID=dd5b59d2809a] [PERF] Execution time=0.022942
DEBUG - 2026-03-09 23:05:05 --> [REQ_ID=c0f0e47dc944] [REQUEST][END]
INFO - 2026-03-09 23:05:05 --> [REQ_ID=c0f0e47dc944] [PERF] Execution time=0.053889
INFO - 2026-03-09 23:05:05 --> [REQ_ID=81d177a664d0] [PERF] Execution time=0.028841
DEBUG - 2026-03-09 23:05:05 --> [REQ_ID=523039bef3aa] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-09 23:05:05 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-09 23:05:05 --> [REQ_ID=523039bef3aa] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-09 23:05:05 --> [REQ_ID=523039bef3aa] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-09 23:05:05 --> [REQ_ID=523039bef3aa] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-09 23:05:05 --> [CSRF] token name=csrf_test_name hash=aa4a958c5372f0381123cdaf53fbf064
DEBUG - 2026-03-09 23:05:05 --> [REQ_ID=36ddef395dc3] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-09 23:05:05 --> [REQ_ID=36ddef395dc3] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-09 23:05:05 --> [REQ_ID=ee63f0e8661e] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-09 23:05:05 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-09 23:05:05 --> [REQ_ID=523039bef3aa] [FILTER_AFTER]
DEBUG - 2026-03-09 23:05:05 --> [REQ_ID=523039bef3aa] [LIFECYCLE][END] status=200 duration_ms=30.94 memory_delta=0
INFO - 2026-03-09 23:05:05 --> [REQ_ID=36ddef395dc3] [PERF] Execution time=0.030119
DEBUG - 2026-03-09 23:05:05 --> [REQ_ID=523039bef3aa] [REQUEST][END]
INFO - 2026-03-09 23:05:05 --> [REQ_ID=523039bef3aa] [PERF] Execution time=0.046766
DEBUG - 2026-03-09 23:05:05 --> [REQ_ID=ee63f0e8661e] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-09 23:05:05 --> [REQ_ID=ee63f0e8661e] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-09 23:05:05 --> [REQ_ID=ee63f0e8661e] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-09 23:05:05 --> [CSRF] token name=csrf_test_name hash=f9c09503c5e60b20f48a202994689f82
DEBUG - 2026-03-09 23:05:05 --> [REQ_ID=f652aa17d348] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-09 23:05:05 --> [REQ_ID=f652aa17d348] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-09 23:05:05 --> [REQ_ID=ee63f0e8661e] [FILTER_AFTER]
DEBUG - 2026-03-09 23:05:05 --> [REQ_ID=ee63f0e8661e] [LIFECYCLE][END] status=200 duration_ms=16.29 memory_delta=0
INFO - 2026-03-09 23:05:05 --> [REQ_ID=f652aa17d348] [PERF] Execution time=0.016263
DEBUG - 2026-03-09 23:05:05 --> [REQ_ID=ee63f0e8661e] [REQUEST][END]
INFO - 2026-03-09 23:05:05 --> [REQ_ID=ee63f0e8661e] [PERF] Execution time=0.040735
DEBUG - 2026-03-09 23:05:05 --> [REQ_ID=9301e3285afa] [REQUEST][START] GET /index.php/How-It-Works/MyMI-Exchange
DEBUG - 2026-03-09 23:05:05 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-09 23:05:05 --> [REQ_ID=9301e3285afa] [FILTER_BEFORE] /index.php/How-It-Works/MyMI-Exchange
DEBUG - 2026-03-09 23:05:05 --> [REQ_ID=9301e3285afa] [ROUTE] Controller=\App\Modules\Blog\Controllers\HowItWorksController Method=show
DEBUG - 2026-03-09 23:05:05 --> [REQ_ID=9301e3285afa] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/How-It-Works/MyMI-Exchange
DEBUG - 2026-03-09 23:05:05 --> [CSRF] token name=csrf_test_name hash=0f499e4d38b724f9a3ecec4ad8f09d37
DEBUG - 2026-03-09 23:05:05 --> [REQ_ID=83625c4b176d] [INIT] App\Modules\Blog\Controllers\HowItWorksController::GET
INFO - 2026-03-09 23:05:05 --> [REQ_ID=83625c4b176d] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-09 23:05:05 --> [REQ_ID=83625c4b176d] [METHOD_ENTRY] show
DEBUG - 2026-03-09 23:05:05 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-09 23:05:05 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-09 23:05:05 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-09 23:05:05 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-09 23:05:05 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-09 23:05:05 --> MyMICoin: guest context detected; skipping user-specific preload.
ERROR - 2026-03-09 23:05:05 --> HowItWorksController failure: Call to undefined method App\Modules\Blog\Controllers\HowItWorksController::respondWithRendered()
INFO - 2026-03-09 23:05:05 --> [REQ_ID=83625c4b176d] [PERF] Execution time=0.021560
DEBUG - 2026-03-09 23:05:05 --> [REQ_ID=c73089e4d25e] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-09 23:05:05 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-09 23:05:05 --> [REQ_ID=c73089e4d25e] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-09 23:05:05 --> [REQ_ID=c73089e4d25e] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-09 23:05:05 --> [REQ_ID=c73089e4d25e] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-09 23:05:05 --> [CSRF] token name=csrf_test_name hash=115ed078b1baa9246039258cd1c76420
DEBUG - 2026-03-09 23:05:05 --> [REQ_ID=e8456e6a9aff] [REQUEST][START] GET /index.php/Support
DEBUG - 2026-03-09 23:05:05 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-09 23:05:05 --> [REQ_ID=23119ff82e95] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-09 23:05:05 --> [REQ_ID=23119ff82e95] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-09 23:05:05 --> [REQ_ID=e8456e6a9aff] [FILTER_BEFORE] /index.php/Support
DEBUG - 2026-03-09 23:05:05 --> [REQ_ID=e8456e6a9aff] [ROUTE] Controller=\App\Modules\Support\Controllers\SupportController Method=index
DEBUG - 2026-03-09 23:05:05 --> [REQ_ID=e8456e6a9aff] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Support
DEBUG - 2026-03-09 23:05:05 --> [CSRF] token name=csrf_test_name hash=59ebcfad4b32995aaec7d0b16e33b5a4
DEBUG - 2026-03-09 23:05:05 --> [REQ_ID=db4b8c2ac092] [INIT] App\Modules\Support\Controllers\SupportController::GET
INFO - 2026-03-09 23:05:05 --> [REQ_ID=db4b8c2ac092] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-09 23:05:05 --> [REQ_ID=c73089e4d25e] [FILTER_AFTER]
DEBUG - 2026-03-09 23:05:05 --> [REQ_ID=c73089e4d25e] [LIFECYCLE][END] status=200 duration_ms=21.41 memory_delta=0
INFO - 2026-03-09 23:05:05 --> [REQ_ID=23119ff82e95] [PERF] Execution time=0.017737
DEBUG - 2026-03-09 23:05:05 --> [REQ_ID=c73089e4d25e] [REQUEST][END]
INFO - 2026-03-09 23:05:05 --> [REQ_ID=c73089e4d25e] [PERF] Execution time=0.037129
DEBUG - 2026-03-09 23:05:05 --> [REQ_ID=db4b8c2ac092] [METHOD_ENTRY] index
DEBUG - 2026-03-09 23:05:05 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-09 23:05:05 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-09 23:05:05 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-09 23:05:05 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-09 23:05:05 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-09 23:05:05 --> MyMICoin: guest context detected; skipping user-specific preload.
INFO - 2026-03-09 23:05:05 --> [REQ_ID=db4b8c2ac092] [MEMORY][commonData:start] 4194304
DEBUG - 2026-03-09 23:05:05 --> [REQ_ID=db4b8c2ac092] [VIEW_RENDER] SupportModule\Views\Support\index
INFO - 2026-03-09 23:05:05 --> [REQ_ID=db4b8c2ac092] [MEMORY][commonData:start] 4194304
INFO - 2026-03-09 23:05:05 --> themesMemory usage: 4194304
DEBUG - 2026-03-09 23:05:05 --> [REQ_ID=e8456e6a9aff] [FILTER_AFTER]
DEBUG - 2026-03-09 23:05:05 --> [REQ_ID=e8456e6a9aff] [LIFECYCLE][END] status=200 duration_ms=30.49 memory_delta=0
INFO - 2026-03-09 23:05:05 --> [REQ_ID=db4b8c2ac092] [PERF] Execution time=0.029214
DEBUG - 2026-03-09 23:05:05 --> [REQ_ID=e8456e6a9aff] [REQUEST][END]
INFO - 2026-03-09 23:05:05 --> [REQ_ID=e8456e6a9aff] [PERF] Execution time=0.046375
DEBUG - 2026-03-09 23:05:05 --> [REQ_ID=5594efc44592] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-09 23:05:05 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-09 23:05:05 --> [REQ_ID=5594efc44592] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-09 23:05:05 --> [REQ_ID=5594efc44592] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-09 23:05:05 --> [REQ_ID=5594efc44592] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-09 23:05:05 --> [CSRF] token name=csrf_test_name hash=0597b2c15ba6ce6533cbecf0caee6628
DEBUG - 2026-03-09 23:05:05 --> [REQ_ID=ac1b75f2868d] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-09 23:05:05 --> [REQ_ID=ac1b75f2868d] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-09 23:05:05 --> [REQ_ID=44c2c68a2dca] [REQUEST][START] GET /index.php/How-It-Works/MyMI-Exchange
DEBUG - 2026-03-09 23:05:05 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-09 23:05:05 --> [REQ_ID=987fcfa3c5e8] [REQUEST][START] GET /index.php/Support/Account
DEBUG - 2026-03-09 23:05:05 --> [REQ_ID=5594efc44592] [FILTER_AFTER]
DEBUG - 2026-03-09 23:05:05 --> [REQ_ID=5594efc44592] [LIFECYCLE][END] status=200 duration_ms=18.25 memory_delta=0
INFO - 2026-03-09 23:05:05 --> [REQ_ID=ac1b75f2868d] [PERF] Execution time=0.017910
DEBUG - 2026-03-09 23:05:05 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-09 23:05:05 --> [REQ_ID=5594efc44592] [REQUEST][END]
INFO - 2026-03-09 23:05:05 --> [REQ_ID=5594efc44592] [PERF] Execution time=0.040068
DEBUG - 2026-03-09 23:05:05 --> [REQ_ID=44c2c68a2dca] [FILTER_BEFORE] /index.php/How-It-Works/MyMI-Exchange
DEBUG - 2026-03-09 23:05:05 --> [REQ_ID=44c2c68a2dca] [ROUTE] Controller=\App\Modules\Blog\Controllers\HowItWorksController Method=show
DEBUG - 2026-03-09 23:05:05 --> [REQ_ID=44c2c68a2dca] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/How-It-Works/MyMI-Exchange
DEBUG - 2026-03-09 23:05:05 --> [CSRF] token name=csrf_test_name hash=1bc99f92e742e4503de7c616c67e0004
DEBUG - 2026-03-09 23:05:05 --> [REQ_ID=e5cf5893ab72] [INIT] App\Modules\Blog\Controllers\HowItWorksController::GET
INFO - 2026-03-09 23:05:05 --> [REQ_ID=e5cf5893ab72] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-09 23:05:05 --> [REQ_ID=987fcfa3c5e8] [FILTER_BEFORE] /index.php/Support/Account
DEBUG - 2026-03-09 23:05:05 --> [REQ_ID=987fcfa3c5e8] [ROUTE] Controller=\App\Modules\Support\Controllers\AccountSupportController Method=index
DEBUG - 2026-03-09 23:05:05 --> [REQ_ID=987fcfa3c5e8] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Support/Account
DEBUG - 2026-03-09 23:05:05 --> [CSRF] token name=csrf_test_name hash=1f2fa0ced912c579669a5022da81b349
DEBUG - 2026-03-09 23:05:05 --> [REQ_ID=0db10efb75c1] [INIT] App\Modules\Support\Controllers\AccountSupportController::GET
INFO - 2026-03-09 23:05:05 --> [REQ_ID=0db10efb75c1] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-09 23:05:05 --> [REQ_ID=e5cf5893ab72] [METHOD_ENTRY] show
DEBUG - 2026-03-09 23:05:05 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-09 23:05:05 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-09 23:05:05 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-09 23:05:05 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-09 23:05:05 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-09 23:05:05 --> [REQ_ID=0db10efb75c1] [METHOD_ENTRY] index
DEBUG - 2026-03-09 23:05:05 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-09 23:05:05 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-09 23:05:05 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-09 23:05:05 --> [REQ_ID=ebf3cceea179] [REQUEST][START] GET /index.php/How-It-Works/Automated-Financial-Insights
DEBUG - 2026-03-09 23:05:05 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-09 23:05:05 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-09 23:05:05 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-09 23:05:05 --> MyMICoin: guest context detected; skipping user-specific preload.
ERROR - 2026-03-09 23:05:05 --> HowItWorksController failure: Call to undefined method App\Modules\Blog\Controllers\HowItWorksController::respondWithRendered()
INFO - 2026-03-09 23:05:05 --> [REQ_ID=e5cf5893ab72] [PERF] Execution time=0.032464
DEBUG - 2026-03-09 23:05:05 --> MyMICoin: guest context detected; skipping user-specific preload.
INFO - 2026-03-09 23:05:05 --> [REQ_ID=0db10efb75c1] [MEMORY][commonData:start] 4194304
DEBUG - 2026-03-09 23:05:05 --> [REQ_ID=0db10efb75c1] [VIEW_RENDER] SupportModule/Support/account_help
INFO - 2026-03-09 23:05:05 --> [REQ_ID=0db10efb75c1] [MEMORY][commonData:start] 4194304
DEBUG - 2026-03-09 23:05:05 --> [REQ_ID=ebf3cceea179] [FILTER_BEFORE] /index.php/How-It-Works/Automated-Financial-Insights
DEBUG - 2026-03-09 23:05:05 --> [REQ_ID=ebf3cceea179] [ROUTE] Controller=\App\Modules\Blog\Controllers\HowItWorksController Method=show
DEBUG - 2026-03-09 23:05:05 --> [REQ_ID=ebf3cceea179] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/How-It-Works/Automated-Financial-Insights
DEBUG - 2026-03-09 23:05:05 --> [CSRF] token name=csrf_test_name hash=3e478a36da2bb74d4b49dcb138da5dd8
DEBUG - 2026-03-09 23:05:05 --> [REQ_ID=9392eba2afeb] [INIT] App\Modules\Blog\Controllers\HowItWorksController::GET
INFO - 2026-03-09 23:05:05 --> [REQ_ID=9392eba2afeb] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-09 23:05:05 --> [REQ_ID=913379c22a49] [REQUEST][START] GET /index.php/Preview/Alert/GRAB
DEBUG - 2026-03-09 23:05:05 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
INFO - 2026-03-09 23:05:05 --> themesMemory usage: 4194304
DEBUG - 2026-03-09 23:05:05 --> [REQ_ID=987fcfa3c5e8] [FILTER_AFTER]
DEBUG - 2026-03-09 23:05:05 --> [REQ_ID=987fcfa3c5e8] [LIFECYCLE][END] status=200 duration_ms=47.39 memory_delta=0
INFO - 2026-03-09 23:05:05 --> [REQ_ID=0db10efb75c1] [PERF] Execution time=0.046894
DEBUG - 2026-03-09 23:05:05 --> [REQ_ID=9392eba2afeb] [METHOD_ENTRY] show
DEBUG - 2026-03-09 23:05:05 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-09 23:05:05 --> [REQ_ID=987fcfa3c5e8] [REQUEST][END]
INFO - 2026-03-09 23:05:05 --> [REQ_ID=987fcfa3c5e8] [PERF] Execution time=0.070515
DEBUG - 2026-03-09 23:05:05 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-09 23:05:05 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-09 23:05:05 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-09 23:05:05 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-09 23:05:05 --> MyMICoin: guest context detected; skipping user-specific preload.
ERROR - 2026-03-09 23:05:05 --> HowItWorksController failure: automated-financial-insights
CRITICAL - 2026-03-09 23:05:05 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: GET, Route: How-It-Works/Automated-Financial-Insights]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
DEBUG - 2026-03-09 23:05:05 --> [REQ_ID=913379c22a49] [FILTER_BEFORE] /index.php/Preview/Alert/GRAB
DEBUG - 2026-03-09 23:05:05 --> [REQ_ID=913379c22a49] [ROUTE] Controller=\App\Modules\User\Controllers\AlertsController Method=preview
DEBUG - 2026-03-09 23:05:05 --> [REQ_ID=913379c22a49] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Preview/Alert/GRAB
DEBUG - 2026-03-09 23:05:05 --> [CSRF] token name=csrf_test_name hash=9bc6e3f8e1a4c9a164b0d69c72a14233
DEBUG - 2026-03-09 23:05:05 --> [REQ_ID=4b72561c163e] [INIT] App\Modules\User\Controllers\AlertsController::GET
INFO - 2026-03-09 23:05:05 --> [REQ_ID=4b72561c163e] [MEMORY][controller-start] 4194304
CRITICAL - 2026-03-09 23:05:05 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-09 23:05:05 --> [404] URI=https://www.mymiwallet.com/index.php/How-It-Works/Automated-Financial-Insights
WARNING - 2026-03-09 23:05:05 --> 404 route miss: https://www.mymiwallet.com/index.php/How-It-Works/Automated-Financial-Insights | referrer: none
DEBUG - 2026-03-09 23:05:05 --> [REQ_ID=4b72561c163e] [METHOD_ENTRY] preview
DEBUG - 2026-03-09 23:05:05 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-09 23:05:05 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-09 23:05:05 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-09 23:05:05 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-09 23:05:05 --> MyMIWallets initialized without numeric user context.
INFO - 2026-03-09 23:05:05 --> [REQ_ID=9392eba2afeb] [PERF] Execution time=0.046233
DEBUG - 2026-03-09 23:05:05 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-09 23:05:05 --> MyMIInvestments: no session user detected; skipping personalized hydration.
DEBUG - 2026-03-09 23:05:05 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-09 23:05:05 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-09 23:05:06 --> [REQ_ID=143940f688ab] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-09 23:05:06 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-09 23:05:06 --> MyMIMarketing: Pscrape library not installed; Google search scraping will use fallback.
DEBUG - 2026-03-09 23:05:06 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-09 23:05:06 --> MyMIAlerts: no authenticated user context detected.
DEBUG - 2026-03-09 23:05:06 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-09 23:05:06 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-09 23:05:06 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-09 23:05:06 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-09 23:05:06 --> [REQ_ID=274670ebbcd2] [REQUEST][START] GET /index.php/Support/Account
DEBUG - 2026-03-09 23:05:06 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-09 23:05:06 --> [SERVICE] App\Services\BudgetService ::setUserId
INFO - 2026-03-09 23:05:06 --> [REQ_ID=4b72561c163e] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-09 23:05:06 --> MyMIInvestments: no session user detected; skipping personalized hydration.
DEBUG - 2026-03-09 23:05:06 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-09 23:05:06 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-09 23:05:06 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-09 23:05:06 --> MyMIAlerts: no authenticated user context detected.
DEBUG - 2026-03-09 23:05:06 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-09 23:05:06 --> [REQ_ID=143940f688ab] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-09 23:05:06 --> [REQ_ID=143940f688ab] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-09 23:05:06 --> [REQ_ID=143940f688ab] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-09 23:05:06 --> [CSRF] token name=csrf_test_name hash=8bc6ed60498744f50e98c8b852bc24ac
DEBUG - 2026-03-09 23:05:06 --> [REQ_ID=14b4d6b46368] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-09 23:05:06 --> [REQ_ID=14b4d6b46368] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-09 23:05:06 --> [REQ_ID=274670ebbcd2] [FILTER_BEFORE] /index.php/Support/Account
DEBUG - 2026-03-09 23:05:06 --> [REQ_ID=274670ebbcd2] [ROUTE] Controller=\App\Modules\Support\Controllers\AccountSupportController Method=index
DEBUG - 2026-03-09 23:05:06 --> [REQ_ID=274670ebbcd2] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Support/Account
DEBUG - 2026-03-09 23:05:06 --> [CSRF] token name=csrf_test_name hash=f52027b64ade69f1acea60768ce18deb
DEBUG - 2026-03-09 23:05:06 --> [REQ_ID=5d8eec1b65c8] [INIT] App\Modules\Support\Controllers\AccountSupportController::GET
INFO - 2026-03-09 23:05:06 --> [REQ_ID=5d8eec1b65c8] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-09 23:05:06 --> [REQ_ID=143940f688ab] [FILTER_AFTER]
DEBUG - 2026-03-09 23:05:06 --> [REQ_ID=143940f688ab] [LIFECYCLE][END] status=200 duration_ms=23.19 memory_delta=0
INFO - 2026-03-09 23:05:06 --> [REQ_ID=14b4d6b46368] [PERF] Execution time=0.023764
DEBUG - 2026-03-09 23:05:06 --> [REQ_ID=143940f688ab] [REQUEST][END]
INFO - 2026-03-09 23:05:06 --> [REQ_ID=143940f688ab] [PERF] Execution time=0.049160
DEBUG - 2026-03-09 23:05:06 --> [REQ_ID=5d8eec1b65c8] [METHOD_ENTRY] index
DEBUG - 2026-03-09 23:05:06 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-09 23:05:06 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-09 23:05:06 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-09 23:05:06 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-09 23:05:06 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-09 23:05:06 --> MyMICoin: guest context detected; skipping user-specific preload.
INFO - 2026-03-09 23:05:06 --> [REQ_ID=5d8eec1b65c8] [MEMORY][commonData:start] 4194304
DEBUG - 2026-03-09 23:05:06 --> [REQ_ID=5d8eec1b65c8] [VIEW_RENDER] SupportModule/Support/account_help
INFO - 2026-03-09 23:05:06 --> [REQ_ID=5d8eec1b65c8] [MEMORY][commonData:start] 4194304
INFO - 2026-03-09 23:05:06 --> themesMemory usage: 4194304
DEBUG - 2026-03-09 23:05:06 --> [REQ_ID=274670ebbcd2] [FILTER_AFTER]
DEBUG - 2026-03-09 23:05:06 --> [REQ_ID=274670ebbcd2] [LIFECYCLE][END] status=200 duration_ms=46.58 memory_delta=0
INFO - 2026-03-09 23:05:06 --> [REQ_ID=5d8eec1b65c8] [PERF] Execution time=0.044910
DEBUG - 2026-03-09 23:05:06 --> [REQ_ID=274670ebbcd2] [REQUEST][END]
INFO - 2026-03-09 23:05:06 --> [REQ_ID=274670ebbcd2] [PERF] Execution time=0.068058
INFO - 2026-03-09 23:05:06 --> AlertsModel L404 - Alert updated successfully for ID 7405: Array
(
    [price] => 3.96
    [current_price] => 3.96
    [last_updated] => 2026-03-09 23:05:06
    [last_updated_time] => 2026-03-09 23:05:06
)

INFO - 2026-03-09 23:05:06 --> 🔄 Trying AlphaVantage for GRAB...
DEBUG - 2026-03-09 23:05:06 --> [REQ_ID=da85e8b3c404] [REQUEST][START] GET /index.php/Preview/Alert/IMNN
DEBUG - 2026-03-09 23:05:06 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-09 23:05:06 --> [REQ_ID=da85e8b3c404] [FILTER_BEFORE] /index.php/Preview/Alert/IMNN
DEBUG - 2026-03-09 23:05:06 --> [REQ_ID=da85e8b3c404] [ROUTE] Controller=\App\Modules\User\Controllers\AlertsController Method=preview
DEBUG - 2026-03-09 23:05:06 --> [REQ_ID=da85e8b3c404] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Preview/Alert/IMNN
DEBUG - 2026-03-09 23:05:06 --> [CSRF] token name=csrf_test_name hash=23f9627d627dd5e8e4ed86803d54ab07
DEBUG - 2026-03-09 23:05:06 --> [REQ_ID=c76bda3f1bcf] [INIT] App\Modules\User\Controllers\AlertsController::GET
INFO - 2026-03-09 23:05:06 --> [REQ_ID=c76bda3f1bcf] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-09 23:05:06 --> [REQ_ID=c76bda3f1bcf] [METHOD_ENTRY] preview
DEBUG - 2026-03-09 23:05:06 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-09 23:05:06 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-09 23:05:06 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-09 23:05:06 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-09 23:05:06 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-09 23:05:06 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-09 23:05:06 --> MyMIInvestments: no session user detected; skipping personalized hydration.
DEBUG - 2026-03-09 23:05:06 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-09 23:05:06 --> MyMICoin: guest context detected; skipping user-specific preload.
INFO - 2026-03-09 23:05:06 --> ✅ Alert snapshot inserted for GRAB with trade_id 7405
DEBUG - 2026-03-09 23:05:06 --> [REQ_ID=4b72561c163e] [VIEW_RENDER] themes/public/previewAlert
INFO - 2026-03-09 23:05:06 --> [REQ_ID=4b72561c163e] [MEMORY][commonData:start] 6291456
INFO - 2026-03-09 23:05:06 --> themesMemory usage: 6291456
DEBUG - 2026-03-09 23:05:06 --> [REQ_ID=6c596c5fc473] [REQUEST][START] GET /index.php/How-It-Works/Automated-Financial-Insights
DEBUG - 2026-03-09 23:05:06 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-09 23:05:06 --> MyMIMarketing: Pscrape library not installed; Google search scraping will use fallback.
DEBUG - 2026-03-09 23:05:06 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-09 23:05:06 --> MyMIAlerts: no authenticated user context detected.
DEBUG - 2026-03-09 23:05:06 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-09 23:05:06 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-09 23:05:06 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-09 23:05:06 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-09 23:05:06 --> [REQ_ID=913379c22a49] [FILTER_AFTER]
DEBUG - 2026-03-09 23:05:06 --> [REQ_ID=913379c22a49] [LIFECYCLE][END] status=200 duration_ms=452.05 memory_delta=2097152
INFO - 2026-03-09 23:05:06 --> [REQ_ID=4b72561c163e] [PERF] Execution time=0.450973
DEBUG - 2026-03-09 23:05:06 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-09 23:05:06 --> [REQ_ID=913379c22a49] [REQUEST][END]
INFO - 2026-03-09 23:05:06 --> [REQ_ID=913379c22a49] [PERF] Execution time=0.479410
DEBUG - 2026-03-09 23:05:06 --> [SERVICE] App\Services\BudgetService ::setUserId
INFO - 2026-03-09 23:05:06 --> [REQ_ID=c76bda3f1bcf] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-09 23:05:06 --> MyMIInvestments: no session user detected; skipping personalized hydration.
DEBUG - 2026-03-09 23:05:06 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-09 23:05:06 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-09 23:05:06 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-09 23:05:06 --> MyMIAlerts: no authenticated user context detected.
DEBUG - 2026-03-09 23:05:06 --> [REQ_ID=6c596c5fc473] [FILTER_BEFORE] /index.php/How-It-Works/Automated-Financial-Insights
DEBUG - 2026-03-09 23:05:06 --> [REQ_ID=6c596c5fc473] [ROUTE] Controller=\App\Modules\Blog\Controllers\HowItWorksController Method=show
DEBUG - 2026-03-09 23:05:06 --> [REQ_ID=6c596c5fc473] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/How-It-Works/Automated-Financial-Insights
DEBUG - 2026-03-09 23:05:06 --> [CSRF] token name=csrf_test_name hash=0f499e4d38b724f9a3ecec4ad8f09d37
DEBUG - 2026-03-09 23:05:06 --> [REQ_ID=6f4c5b4b6b1c] [INIT] App\Modules\Blog\Controllers\HowItWorksController::GET
INFO - 2026-03-09 23:05:06 --> [REQ_ID=6f4c5b4b6b1c] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-09 23:05:06 --> [REQ_ID=6f4c5b4b6b1c] [METHOD_ENTRY] show
DEBUG - 2026-03-09 23:05:06 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-09 23:05:06 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-09 23:05:06 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-09 23:05:06 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-09 23:05:06 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-09 23:05:06 --> MyMICoin: guest context detected; skipping user-specific preload.
ERROR - 2026-03-09 23:05:06 --> HowItWorksController failure: automated-financial-insights
CRITICAL - 2026-03-09 23:05:06 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: GET, Route: How-It-Works/Automated-Financial-Insights]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-09 23:05:06 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-09 23:05:06 --> [404] URI=https://www.mymiwallet.com/index.php/How-It-Works/Automated-Financial-Insights
WARNING - 2026-03-09 23:05:06 --> 404 route miss: https://www.mymiwallet.com/index.php/How-It-Works/Automated-Financial-Insights | referrer: none
INFO - 2026-03-09 23:05:06 --> [REQ_ID=6f4c5b4b6b1c] [PERF] Execution time=0.024683
WARNING - 2026-03-09 23:05:06 --> AlphaVantage rate limit notice: Thank you for using Alpha Vantage! Please consider spreading out your free API requests more sparingly (1 request per second). You may subscribe to any of the premium plans at https://www.alphavantage.co/premium/ to lift the free key rate limit (25 requests per day), raise the per-second burst limit, and instantly unlock all premium endpoints
DEBUG - 2026-03-09 23:05:06 --> [REQ_ID=a3637b65ef7d] [REQUEST][START] GET /index.php/Support/Account
DEBUG - 2026-03-09 23:05:06 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-09 23:05:06 --> [REQ_ID=a3637b65ef7d] [FILTER_BEFORE] /index.php/Support/Account
DEBUG - 2026-03-09 23:05:06 --> [REQ_ID=a3637b65ef7d] [ROUTE] Controller=\App\Modules\Support\Controllers\AccountSupportController Method=index
DEBUG - 2026-03-09 23:05:06 --> [REQ_ID=a3637b65ef7d] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Support/Account
DEBUG - 2026-03-09 23:05:06 --> [CSRF] token name=csrf_test_name hash=059ae62e03497020afc53e1f796ea78c
DEBUG - 2026-03-09 23:05:06 --> [REQ_ID=92033205bc0c] [INIT] App\Modules\Support\Controllers\AccountSupportController::GET
INFO - 2026-03-09 23:05:06 --> [REQ_ID=92033205bc0c] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-09 23:05:06 --> [REQ_ID=92033205bc0c] [METHOD_ENTRY] index
DEBUG - 2026-03-09 23:05:06 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-09 23:05:06 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-09 23:05:06 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-09 23:05:06 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-09 23:05:06 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-09 23:05:06 --> MyMICoin: guest context detected; skipping user-specific preload.
INFO - 2026-03-09 23:05:06 --> [REQ_ID=92033205bc0c] [MEMORY][commonData:start] 4194304
DEBUG - 2026-03-09 23:05:06 --> [REQ_ID=92033205bc0c] [VIEW_RENDER] SupportModule/Support/account_help
INFO - 2026-03-09 23:05:06 --> [REQ_ID=92033205bc0c] [MEMORY][commonData:start] 4194304
INFO - 2026-03-09 23:05:06 --> themesMemory usage: 4194304
DEBUG - 2026-03-09 23:05:06 --> [REQ_ID=236ef38962d9] [REQUEST][START] GET /index.php/How-It-Works/overview
DEBUG - 2026-03-09 23:05:06 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-09 23:05:06 --> [REQ_ID=a3637b65ef7d] [FILTER_AFTER]
DEBUG - 2026-03-09 23:05:06 --> [REQ_ID=a3637b65ef7d] [LIFECYCLE][END] status=200 duration_ms=37.48 memory_delta=0
INFO - 2026-03-09 23:05:06 --> [REQ_ID=92033205bc0c] [PERF] Execution time=0.036417
DEBUG - 2026-03-09 23:05:06 --> [REQ_ID=a3637b65ef7d] [REQUEST][END]
INFO - 2026-03-09 23:05:06 --> [REQ_ID=a3637b65ef7d] [PERF] Execution time=0.052739
DEBUG - 2026-03-09 23:05:06 --> [REQ_ID=236ef38962d9] [FILTER_BEFORE] /index.php/How-It-Works/overview
DEBUG - 2026-03-09 23:05:06 --> [REQ_ID=236ef38962d9] [ROUTE] Controller=\App\Modules\Blog\Controllers\HowItWorksController Method=show
DEBUG - 2026-03-09 23:05:06 --> [REQ_ID=236ef38962d9] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/How-It-Works/overview
DEBUG - 2026-03-09 23:05:06 --> [CSRF] token name=csrf_test_name hash=3fd07b5506deceb6f7c63a29ea805285
DEBUG - 2026-03-09 23:05:06 --> [REQ_ID=bf4923e22330] [INIT] App\Modules\Blog\Controllers\HowItWorksController::GET
INFO - 2026-03-09 23:05:06 --> [REQ_ID=bf4923e22330] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-09 23:05:06 --> [REQ_ID=bf4923e22330] [METHOD_ENTRY] show
DEBUG - 2026-03-09 23:05:06 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-09 23:05:06 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-09 23:05:06 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-09 23:05:06 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-09 23:05:06 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-09 23:05:06 --> MyMICoin: guest context detected; skipping user-specific preload.
ERROR - 2026-03-09 23:05:06 --> HowItWorksController failure: overview
CRITICAL - 2026-03-09 23:05:06 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: GET, Route: How-It-Works/overview]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-09 23:05:06 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-09 23:05:06 --> [404] URI=https://www.mymiwallet.com/index.php/How-It-Works/overview
WARNING - 2026-03-09 23:05:06 --> 404 route miss: https://www.mymiwallet.com/index.php/How-It-Works/overview | referrer: none
INFO - 2026-03-09 23:05:06 --> [REQ_ID=bf4923e22330] [PERF] Execution time=0.029653
INFO - 2026-03-09 23:05:06 --> AlertsModel L404 - Alert updated successfully for ID 9368: Array
(
    [price] => 3.12
    [current_price] => 3.12
    [last_updated] => 2026-03-09 23:05:06
    [last_updated_time] => 2026-03-09 23:05:06
)

INFO - 2026-03-09 23:05:06 --> 🔄 Trying AlphaVantage for IMNN...
INFO - 2026-03-09 23:05:06 --> ✅ Alert snapshot inserted for IMNN with trade_id 9368
DEBUG - 2026-03-09 23:05:06 --> [REQ_ID=c76bda3f1bcf] [VIEW_RENDER] themes/public/previewAlert
INFO - 2026-03-09 23:05:06 --> [REQ_ID=c76bda3f1bcf] [MEMORY][commonData:start] 6291456
INFO - 2026-03-09 23:05:06 --> themesMemory usage: 6291456
DEBUG - 2026-03-09 23:05:06 --> [REQ_ID=da85e8b3c404] [FILTER_AFTER]
DEBUG - 2026-03-09 23:05:06 --> [REQ_ID=da85e8b3c404] [LIFECYCLE][END] status=200 duration_ms=520.13 memory_delta=2097152
INFO - 2026-03-09 23:05:06 --> [REQ_ID=c76bda3f1bcf] [PERF] Execution time=0.519916
DEBUG - 2026-03-09 23:05:06 --> [REQ_ID=da85e8b3c404] [REQUEST][END]
INFO - 2026-03-09 23:05:06 --> [REQ_ID=da85e8b3c404] [PERF] Execution time=0.530988
DEBUG - 2026-03-09 23:06:22 --> [REQ_ID=a61322d70573] [REQUEST][START] HEAD /
DEBUG - 2026-03-09 23:06:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-09 23:06:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-09 23:06:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-09 23:06:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-09 23:06:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-09 23:11:22 --> [REQ_ID=8d9ba437ef33] [REQUEST][START] HEAD /
DEBUG - 2026-03-09 23:11:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-09 23:11:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-09 23:11:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-09 23:11:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-09 23:11:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-09 23:15:01 --> [REQ_ID=497f4ba1feb9] [REQUEST][START] GET /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-09 23:15:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-09 23:15:01 --> [REQ_ID=497f4ba1feb9] [FILTER_BEFORE] /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-09 23:15:01 --> [REQ_ID=497f4ba1feb9] [ROUTE] Controller=\App\Modules\APIs\Controllers\AlertsAPIController Method=fetchEmailAlerts
DEBUG - 2026-03-09 23:15:01 --> [REQ_ID=497f4ba1feb9] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-09 23:15:01 --> [REQ_ID=497f4ba1feb9] [REQUEST][END]
INFO - 2026-03-09 23:15:01 --> [REQ_ID=497f4ba1feb9] [PERF] Execution time=0.056717
DEBUG - 2026-03-09 23:16:22 --> [REQ_ID=a8029e03dc7e] [REQUEST][START] HEAD /
DEBUG - 2026-03-09 23:16:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-09 23:16:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-09 23:16:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-09 23:16:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-09 23:16:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-09 23:20:17 --> [REQ_ID=c07aea1f8338] [REQUEST][START] GET /index.php/Investments
DEBUG - 2026-03-09 23:20:17 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-09 23:20:17 --> [REQ_ID=c07aea1f8338] [REQUEST][END]
INFO - 2026-03-09 23:20:17 --> [REQ_ID=c07aea1f8338] [PERF] Execution time=0.046000
DEBUG - 2026-03-09 23:21:22 --> [REQ_ID=dba2186b6e0a] [REQUEST][START] HEAD /
DEBUG - 2026-03-09 23:21:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-09 23:21:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-09 23:21:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-09 23:21:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-09 23:21:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-09 23:26:22 --> [REQ_ID=da6252e62a49] [REQUEST][START] HEAD /
DEBUG - 2026-03-09 23:26:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-09 23:26:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-09 23:26:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-09 23:26:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-09 23:26:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-09 23:31:22 --> [REQ_ID=fbcf37081f1a] [REQUEST][START] HEAD /
DEBUG - 2026-03-09 23:31:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-09 23:31:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-09 23:31:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-09 23:31:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-09 23:31:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-09 23:36:22 --> [REQ_ID=70fcbd68e79b] [REQUEST][START] HEAD /
DEBUG - 2026-03-09 23:36:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-09 23:36:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-09 23:36:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-09 23:36:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-09 23:36:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-09 23:37:04 --> [REQ_ID=6d2664bf9ca9] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-09 23:37:04 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-09 23:37:04 --> [REQ_ID=6d2664bf9ca9] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-09 23:37:04 --> [REQ_ID=6d2664bf9ca9] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-09 23:37:04 --> [REQ_ID=6d2664bf9ca9] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-09 23:37:04 --> [CSRF] token name=csrf_test_name hash=b12051c8a9c8c2e881de49c56fe9e1ad
DEBUG - 2026-03-09 23:37:04 --> [REQ_ID=143b699cdc98] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-09 23:37:04 --> [REQ_ID=143b699cdc98] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-09 23:37:04 --> [REQ_ID=6d2664bf9ca9] [FILTER_AFTER]
DEBUG - 2026-03-09 23:37:04 --> [REQ_ID=6d2664bf9ca9] [LIFECYCLE][END] status=200 duration_ms=45.25 memory_delta=0
INFO - 2026-03-09 23:37:04 --> [REQ_ID=143b699cdc98] [PERF] Execution time=0.042854
DEBUG - 2026-03-09 23:37:04 --> [REQ_ID=6d2664bf9ca9] [REQUEST][END]
INFO - 2026-03-09 23:37:04 --> [REQ_ID=6d2664bf9ca9] [PERF] Execution time=0.066994
DEBUG - 2026-03-09 23:41:22 --> [REQ_ID=b2d22b98c558] [REQUEST][START] HEAD /
DEBUG - 2026-03-09 23:41:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-09 23:41:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-09 23:41:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-09 23:41:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-09 23:41:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-09 23:46:22 --> [REQ_ID=e3ef99bc5de0] [REQUEST][START] HEAD /
DEBUG - 2026-03-09 23:46:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-09 23:46:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-09 23:46:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-09 23:46:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-09 23:46:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-09 23:51:22 --> [REQ_ID=113257843c42] [REQUEST][START] HEAD /
DEBUG - 2026-03-09 23:51:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-09 23:51:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-09 23:51:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-09 23:51:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-09 23:51:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-09 23:56:22 --> [REQ_ID=e4cdb7107848] [REQUEST][START] HEAD /
DEBUG - 2026-03-09 23:56:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-09 23:56:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-09 23:56:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-09 23:56:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-09 23:56:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
