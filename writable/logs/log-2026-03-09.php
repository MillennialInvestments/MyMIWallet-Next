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
