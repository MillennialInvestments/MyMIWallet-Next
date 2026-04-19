<?php defined('SYSTEMPATH') || exit('No direct script access allowed'); ?>

DEBUG - 2026-03-27 00:00:01 --> [REQ_ID=7196e6a98e04] [REQUEST][START] GET /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-27 00:00:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-27 00:00:01 --> [REQ_ID=7196e6a98e04] [FILTER_BEFORE] /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-27 00:00:01 --> [REQ_ID=7196e6a98e04] [ROUTE] Controller=\App\Modules\Management\Controllers\ManagementAPIController Method=Run_CRON_Tasks
DEBUG - 2026-03-27 00:00:01 --> [REQ_ID=7196e6a98e04] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-27 00:00:01 --> [REQ_ID=7196e6a98e04] [REQUEST][END]
INFO - 2026-03-27 00:00:01 --> [REQ_ID=7196e6a98e04] [PERF] Execution time=0.049432
DEBUG - 2026-03-27 00:01:22 --> [REQ_ID=307dc669d02f] [REQUEST][START] HEAD /
DEBUG - 2026-03-27 00:01:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-27 00:01:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-27 00:01:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-27 00:01:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-27 00:01:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-27 00:06:22 --> [REQ_ID=cc72cfb4a572] [REQUEST][START] HEAD /
DEBUG - 2026-03-27 00:06:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-27 00:06:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-27 00:06:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-27 00:06:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-27 00:06:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-27 00:11:22 --> [REQ_ID=114a69037292] [REQUEST][START] HEAD /
DEBUG - 2026-03-27 00:11:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-27 00:11:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-27 00:11:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-27 00:11:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-27 00:11:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-27 00:15:01 --> [REQ_ID=70d0344045a0] [REQUEST][START] GET /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-27 00:15:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-27 00:15:01 --> [REQ_ID=70d0344045a0] [FILTER_BEFORE] /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-27 00:15:01 --> [REQ_ID=70d0344045a0] [ROUTE] Controller=\App\Modules\APIs\Controllers\AlertsAPIController Method=fetchEmailAlerts
DEBUG - 2026-03-27 00:15:01 --> [REQ_ID=70d0344045a0] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-27 00:15:01 --> [REQ_ID=70d0344045a0] [REQUEST][END]
INFO - 2026-03-27 00:15:01 --> [REQ_ID=70d0344045a0] [PERF] Execution time=0.046722
DEBUG - 2026-03-27 00:16:22 --> [REQ_ID=5ec75a37dbdc] [REQUEST][START] HEAD /
DEBUG - 2026-03-27 00:16:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-27 00:16:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-27 00:16:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-27 00:16:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-27 00:16:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-27 00:21:22 --> [REQ_ID=ead291137f8c] [REQUEST][START] HEAD /
DEBUG - 2026-03-27 00:21:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-27 00:21:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-27 00:21:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-27 00:21:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-27 00:21:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-27 00:24:05 --> [REQ_ID=d0789965f4de] [REQUEST][START] GET /index.php/How-It-Works/Investment-Portfolio-Management
DEBUG - 2026-03-27 00:24:05 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-27 00:24:05 --> [REQ_ID=d0789965f4de] [REQUEST][END]
INFO - 2026-03-27 00:24:05 --> [REQ_ID=d0789965f4de] [PERF] Execution time=0.042947
DEBUG - 2026-03-27 00:26:22 --> [REQ_ID=1bf7f3479168] [REQUEST][START] HEAD /
DEBUG - 2026-03-27 00:26:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-27 00:26:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-27 00:26:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-27 00:26:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-27 00:26:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-27 00:29:15 --> [REQ_ID=5ae67b4dc218] [REQUEST][START] GET /
DEBUG - 2026-03-27 00:29:15 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-27 00:29:15 --> [REQ_ID=5ae67b4dc218] [FILTER_BEFORE] /
DEBUG - 2026-03-27 00:29:15 --> [REQ_ID=5ae67b4dc218] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-27 00:29:15 --> [REQ_ID=5ae67b4dc218] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-27 00:29:15 --> [CSRF] token name=csrf_test_name hash=dc694bdea393d126e9249cc39d1dcfb6
DEBUG - 2026-03-27 00:29:15 --> [REQ_ID=a0d0941f1a50] [INIT] App\Controllers\Home::GET
INFO - 2026-03-27 00:29:15 --> [REQ_ID=a0d0941f1a50] [MEMORY][controller-start] 6291456
INFO - 2026-03-27 00:29:15 --> [REQ_ID=a0d0941f1a50] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-27 00:29:15 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-27 00:29:16 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-03-27 00:29:16 --> [REQ_ID=a0d0941f1a50] [VIEW_RENDER] themes/public/home
INFO - 2026-03-27 00:29:16 --> [REQ_ID=a0d0941f1a50] [MEMORY][commonData:start] 10485760
INFO - 2026-03-27 00:29:16 --> themesMemory usage: 10485760
DEBUG - 2026-03-27 00:29:16 --> [MetaService] slug= pageName=Home cacheHit= path=DB
DEBUG - 2026-03-27 00:29:16 --> [REQ_ID=5ae67b4dc218] [FILTER_AFTER]
DEBUG - 2026-03-27 00:29:16 --> [REQ_ID=5ae67b4dc218] [LIFECYCLE][END] status=200 duration_ms=655.07 memory_delta=4194304
INFO - 2026-03-27 00:29:16 --> [REQ_ID=a0d0941f1a50] [PERF] Execution time=0.653316
DEBUG - 2026-03-27 00:29:16 --> [REQ_ID=5ae67b4dc218] [REQUEST][END]
INFO - 2026-03-27 00:29:16 --> [REQ_ID=5ae67b4dc218] [PERF] Execution time=0.694508
DEBUG - 2026-03-27 00:29:17 --> [REQ_ID=36f5e8225379] [REQUEST][START] GET /
DEBUG - 2026-03-27 00:29:17 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-27 00:29:17 --> [REQ_ID=36f5e8225379] [FILTER_BEFORE] /
DEBUG - 2026-03-27 00:29:17 --> [REQ_ID=36f5e8225379] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-27 00:29:17 --> [REQ_ID=36f5e8225379] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-27 00:29:17 --> [CSRF] token name=csrf_test_name hash=dc694bdea393d126e9249cc39d1dcfb6
DEBUG - 2026-03-27 00:29:17 --> [REQ_ID=db6c3a21c025] [INIT] App\Controllers\Home::GET
INFO - 2026-03-27 00:29:17 --> [REQ_ID=db6c3a21c025] [MEMORY][controller-start] 6291456
INFO - 2026-03-27 00:29:17 --> [REQ_ID=db6c3a21c025] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-27 00:29:17 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-27 00:29:18 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
DEBUG - 2026-03-27 00:29:18 --> [REQ_ID=db6c3a21c025] [VIEW_RENDER] themes/public/home
INFO - 2026-03-27 00:29:18 --> [REQ_ID=db6c3a21c025] [MEMORY][commonData:start] 8388608
INFO - 2026-03-27 00:29:18 --> themesMemory usage: 8388608
DEBUG - 2026-03-27 00:29:18 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-27 00:29:18 --> [REQ_ID=36f5e8225379] [FILTER_AFTER]
DEBUG - 2026-03-27 00:29:18 --> [REQ_ID=36f5e8225379] [LIFECYCLE][END] status=200 duration_ms=565.97 memory_delta=2097152
INFO - 2026-03-27 00:29:18 --> [REQ_ID=db6c3a21c025] [PERF] Execution time=0.565736
DEBUG - 2026-03-27 00:29:18 --> [REQ_ID=36f5e8225379] [REQUEST][END]
INFO - 2026-03-27 00:29:18 --> [REQ_ID=36f5e8225379] [PERF] Execution time=0.575902
DEBUG - 2026-03-27 00:31:22 --> [REQ_ID=82cede8a537b] [REQUEST][START] HEAD /
DEBUG - 2026-03-27 00:31:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-27 00:31:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-27 00:31:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-27 00:31:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-27 00:31:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-27 00:36:22 --> [REQ_ID=add39c5cee4e] [REQUEST][START] HEAD /
DEBUG - 2026-03-27 00:36:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-27 00:36:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-27 00:36:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-27 00:36:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-27 00:36:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-27 00:41:22 --> [REQ_ID=4109af13ed1a] [REQUEST][START] HEAD /
DEBUG - 2026-03-27 00:41:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-27 00:41:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-27 00:41:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-27 00:41:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-27 00:41:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-27 00:41:34 --> [REQ_ID=cace4c213339] [REQUEST][START] GET /index.php/Knowledgebase
DEBUG - 2026-03-27 00:41:34 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-27 00:41:34 --> ErrorException: Access level to App\Modules\User\Controllers\KnowledgebaseController::respondWithRendered() must be protected (as in class App\Controllers\BaseController) or weaker
[Method: GET, Route: Knowledgebase]
in APPPATH/Modules/User/Controllers/KnowledgebaseController.php on line 535.
 1 [internal function]: CodeIgniter\Debug\Exceptions->shutdownHandler()
CRITICAL - 2026-03-27 00:41:34 --> [EXCEPTION] Access level to App\Modules\User\Controllers\KnowledgebaseController::respondWithRendered() must be protected (as in class App\Controllers\BaseController) or weaker File=/home/mymiteam/mymiwallet/site/current/app/Modules/User/Controllers/KnowledgebaseController.php Line=535
DEBUG - 2026-03-27 00:46:22 --> [REQ_ID=4bd9c829ab23] [REQUEST][START] HEAD /
DEBUG - 2026-03-27 00:46:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-27 00:46:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-27 00:46:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-27 00:46:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-27 00:46:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-27 00:51:12 --> [REQ_ID=9058d71f1239] [REQUEST][START] GET /
DEBUG - 2026-03-27 00:51:12 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-27 00:51:12 --> [REQ_ID=9058d71f1239] [FILTER_BEFORE] /
DEBUG - 2026-03-27 00:51:12 --> [REQ_ID=9058d71f1239] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-27 00:51:12 --> [REQ_ID=9058d71f1239] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-27 00:51:12 --> [CSRF] token name=csrf_test_name hash=17f25ba8aaf69cea125011428b8e9a5a
DEBUG - 2026-03-27 00:51:12 --> [REQ_ID=5ec36151b9c7] [INIT] App\Controllers\Home::GET
INFO - 2026-03-27 00:51:12 --> [REQ_ID=5ec36151b9c7] [MEMORY][controller-start] 6291456
INFO - 2026-03-27 00:51:12 --> [REQ_ID=5ec36151b9c7] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-27 00:51:12 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-27 00:51:12 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-03-27 00:51:12 --> [REQ_ID=5ec36151b9c7] [VIEW_RENDER] themes/public/home
INFO - 2026-03-27 00:51:12 --> [REQ_ID=5ec36151b9c7] [MEMORY][commonData:start] 10485760
INFO - 2026-03-27 00:51:12 --> themesMemory usage: 10485760
DEBUG - 2026-03-27 00:51:12 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-27 00:51:12 --> [REQ_ID=9058d71f1239] [FILTER_AFTER]
DEBUG - 2026-03-27 00:51:12 --> [REQ_ID=9058d71f1239] [LIFECYCLE][END] status=200 duration_ms=545.74 memory_delta=4194304
INFO - 2026-03-27 00:51:12 --> [REQ_ID=5ec36151b9c7] [PERF] Execution time=0.543701
DEBUG - 2026-03-27 00:51:12 --> [REQ_ID=9058d71f1239] [REQUEST][END]
INFO - 2026-03-27 00:51:12 --> [REQ_ID=9058d71f1239] [PERF] Execution time=0.585292
DEBUG - 2026-03-27 00:51:13 --> [REQ_ID=746688bd2c3b] [REQUEST][START] GET /index.php/How-It-Works/Investment-Dashboard
DEBUG - 2026-03-27 00:51:13 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-27 00:51:13 --> [REQ_ID=746688bd2c3b] [FILTER_BEFORE] /index.php/How-It-Works/Investment-Dashboard
DEBUG - 2026-03-27 00:51:13 --> [REQ_ID=746688bd2c3b] [ROUTE] Controller=\App\Modules\Blog\Controllers\HowItWorksController Method=show
DEBUG - 2026-03-27 00:51:13 --> [REQ_ID=746688bd2c3b] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/How-It-Works/Investment-Dashboard
DEBUG - 2026-03-27 00:51:13 --> [CSRF] token name=csrf_test_name hash=17f25ba8aaf69cea125011428b8e9a5a
DEBUG - 2026-03-27 00:51:13 --> [REQ_ID=c2b087850fca] [INIT] App\Modules\Blog\Controllers\HowItWorksController::GET
INFO - 2026-03-27 00:51:13 --> [REQ_ID=c2b087850fca] [MEMORY][controller-start] 6291456
DEBUG - 2026-03-27 00:51:13 --> [REQ_ID=c2b087850fca] [METHOD_ENTRY] show
DEBUG - 2026-03-27 00:51:13 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-27 00:51:13 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-27 00:51:13 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-27 00:51:13 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-27 00:51:13 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-27 00:51:13 --> MyMICoin: guest context detected; skipping user-specific preload.
INFO - 2026-03-27 00:51:13 --> [REQ_ID=c2b087850fca] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-27 00:51:14 --> [REQ_ID=746688bd2c3b] [FILTER_AFTER]
DEBUG - 2026-03-27 00:51:14 --> [REQ_ID=746688bd2c3b] [LIFECYCLE][END] status=200 duration_ms=497.03 memory_delta=2097152
INFO - 2026-03-27 00:51:14 --> [REQ_ID=c2b087850fca] [PERF] Execution time=0.496871
DEBUG - 2026-03-27 00:51:14 --> [REQ_ID=746688bd2c3b] [REQUEST][END]
INFO - 2026-03-27 00:51:14 --> [REQ_ID=746688bd2c3b] [PERF] Execution time=0.512517
DEBUG - 2026-03-27 00:51:22 --> [REQ_ID=babb2d84b74f] [REQUEST][START] HEAD /
DEBUG - 2026-03-27 00:51:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-27 00:51:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-27 00:51:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-27 00:51:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-27 00:51:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-27 00:52:14 --> [REQ_ID=3ec54be45ed6] [REQUEST][START] GET /
DEBUG - 2026-03-27 00:52:14 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-27 00:52:14 --> [REQ_ID=3ec54be45ed6] [FILTER_BEFORE] /
DEBUG - 2026-03-27 00:52:14 --> [REQ_ID=3ec54be45ed6] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-27 00:52:14 --> [REQ_ID=3ec54be45ed6] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-27 00:52:14 --> [CSRF] token name=csrf_test_name hash=04b27f5358fbe8edd20f68497dad94b6
DEBUG - 2026-03-27 00:52:14 --> [REQ_ID=a97c302d0568] [INIT] App\Controllers\Home::GET
INFO - 2026-03-27 00:52:14 --> [REQ_ID=a97c302d0568] [MEMORY][controller-start] 4194304
INFO - 2026-03-27 00:52:14 --> [REQ_ID=a97c302d0568] [MEMORY][commonData:start] 4194304
DEBUG - 2026-03-27 00:52:14 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-27 00:52:15 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
DEBUG - 2026-03-27 00:52:15 --> [REQ_ID=a97c302d0568] [VIEW_RENDER] themes/public/home
INFO - 2026-03-27 00:52:15 --> [REQ_ID=a97c302d0568] [MEMORY][commonData:start] 8388608
INFO - 2026-03-27 00:52:15 --> themesMemory usage: 8388608
DEBUG - 2026-03-27 00:52:15 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-27 00:52:15 --> [REQ_ID=3ec54be45ed6] [FILTER_AFTER]
DEBUG - 2026-03-27 00:52:15 --> [REQ_ID=3ec54be45ed6] [LIFECYCLE][END] status=200 duration_ms=655.41 memory_delta=4194304
INFO - 2026-03-27 00:52:15 --> [REQ_ID=a97c302d0568] [PERF] Execution time=0.654607
DEBUG - 2026-03-27 00:52:15 --> [REQ_ID=3ec54be45ed6] [REQUEST][END]
INFO - 2026-03-27 00:52:15 --> [REQ_ID=3ec54be45ed6] [PERF] Execution time=0.669809
DEBUG - 2026-03-27 00:56:22 --> [REQ_ID=72e27faa94aa] [REQUEST][START] HEAD /
DEBUG - 2026-03-27 00:56:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-27 00:56:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-27 00:56:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-27 00:56:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-27 00:56:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-27 01:00:01 --> [REQ_ID=599e7714a804] [REQUEST][START] GET /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-27 01:00:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-27 01:00:01 --> [REQ_ID=599e7714a804] [FILTER_BEFORE] /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-27 01:00:01 --> [REQ_ID=599e7714a804] [ROUTE] Controller=\App\Modules\Management\Controllers\ManagementAPIController Method=Run_CRON_Tasks
DEBUG - 2026-03-27 01:00:01 --> [REQ_ID=599e7714a804] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-27 01:00:01 --> [REQ_ID=599e7714a804] [REQUEST][END]
INFO - 2026-03-27 01:00:01 --> [REQ_ID=599e7714a804] [PERF] Execution time=0.068504
DEBUG - 2026-03-27 01:01:22 --> [REQ_ID=d657c8298f0c] [REQUEST][START] HEAD /
DEBUG - 2026-03-27 01:01:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-27 01:01:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-27 01:01:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-27 01:01:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-27 01:01:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-27 01:06:22 --> [REQ_ID=4cb8a5719e03] [REQUEST][START] HEAD /
DEBUG - 2026-03-27 01:06:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-27 01:06:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-27 01:06:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-27 01:06:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-27 01:06:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-27 01:11:15 --> [REQ_ID=cb0bb9858944] [REQUEST][START] GET /
DEBUG - 2026-03-27 01:11:15 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-27 01:11:15 --> [REQ_ID=cb0bb9858944] [REQUEST][END]
INFO - 2026-03-27 01:11:15 --> [REQ_ID=cb0bb9858944] [PERF] Execution time=0.048281
DEBUG - 2026-03-27 01:11:22 --> [REQ_ID=995c789e367e] [REQUEST][START] HEAD /
DEBUG - 2026-03-27 01:11:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-27 01:11:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-27 01:11:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-27 01:11:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-27 01:11:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-27 01:15:02 --> [REQ_ID=24ec9d4b8370] [REQUEST][START] GET /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-27 01:15:02 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-27 01:15:02 --> [REQ_ID=24ec9d4b8370] [FILTER_BEFORE] /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-27 01:15:02 --> [REQ_ID=24ec9d4b8370] [ROUTE] Controller=\App\Modules\APIs\Controllers\AlertsAPIController Method=fetchEmailAlerts
DEBUG - 2026-03-27 01:15:02 --> [REQ_ID=24ec9d4b8370] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-27 01:15:02 --> [REQ_ID=24ec9d4b8370] [REQUEST][END]
INFO - 2026-03-27 01:15:02 --> [REQ_ID=24ec9d4b8370] [PERF] Execution time=0.047644
DEBUG - 2026-03-27 01:16:22 --> [REQ_ID=fff9a9e64c46] [REQUEST][START] HEAD /
DEBUG - 2026-03-27 01:16:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-27 01:16:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-27 01:16:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-27 01:16:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-27 01:16:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-27 01:17:57 --> [REQ_ID=f951bb008c90] [REQUEST][START] GET /
DEBUG - 2026-03-27 01:17:57 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-27 01:17:57 --> [REQ_ID=f951bb008c90] [REQUEST][END]
INFO - 2026-03-27 01:17:57 --> [REQ_ID=f951bb008c90] [PERF] Execution time=0.055132
DEBUG - 2026-03-27 01:21:22 --> [REQ_ID=79a578649d82] [REQUEST][START] HEAD /
DEBUG - 2026-03-27 01:21:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-27 01:21:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-27 01:21:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-27 01:21:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-27 01:21:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-27 01:26:22 --> [REQ_ID=cbff0f510d2f] [REQUEST][START] HEAD /
DEBUG - 2026-03-27 01:26:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-27 01:26:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-27 01:26:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-27 01:26:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-27 01:26:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-27 01:31:22 --> [REQ_ID=c8639619cc33] [REQUEST][START] HEAD /
DEBUG - 2026-03-27 01:31:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-27 01:31:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-27 01:31:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-27 01:31:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-27 01:31:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-27 01:36:22 --> [REQ_ID=54f8c31363a0] [REQUEST][START] HEAD /
DEBUG - 2026-03-27 01:36:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-27 01:36:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-27 01:36:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-27 01:36:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-27 01:36:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-27 01:36:53 --> [REQ_ID=ff6120c77c29] [REQUEST][START] GET /index.php/How-It-Works/Personal-Budgeting
DEBUG - 2026-03-27 01:36:53 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-27 01:36:53 --> [REQ_ID=ff6120c77c29] [REQUEST][END]
INFO - 2026-03-27 01:36:53 --> [REQ_ID=ff6120c77c29] [PERF] Execution time=0.022759
DEBUG - 2026-03-27 01:41:22 --> [REQ_ID=e873cef7971b] [REQUEST][START] HEAD /
DEBUG - 2026-03-27 01:41:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-27 01:41:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-27 01:41:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-27 01:41:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-27 01:41:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-27 01:46:22 --> [REQ_ID=60badeed9183] [REQUEST][START] HEAD /
DEBUG - 2026-03-27 01:46:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-27 01:46:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-27 01:46:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-27 01:46:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-27 01:46:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-27 01:51:22 --> [REQ_ID=5d3dac2ed5d5] [REQUEST][START] HEAD /
DEBUG - 2026-03-27 01:51:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-27 01:51:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-27 01:51:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-27 01:51:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-27 01:51:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-27 01:56:22 --> [REQ_ID=d61c83957282] [REQUEST][START] HEAD /
DEBUG - 2026-03-27 01:56:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-27 01:56:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-27 01:56:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-27 01:56:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-27 01:56:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-27 02:00:01 --> [REQ_ID=57572ab8c230] [REQUEST][START] GET /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-27 02:00:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-27 02:00:01 --> [REQ_ID=57572ab8c230] [FILTER_BEFORE] /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-27 02:00:01 --> [REQ_ID=57572ab8c230] [ROUTE] Controller=\App\Modules\Management\Controllers\ManagementAPIController Method=Run_CRON_Tasks
DEBUG - 2026-03-27 02:00:01 --> [REQ_ID=57572ab8c230] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-27 02:00:01 --> [REQ_ID=57572ab8c230] [REQUEST][END]
INFO - 2026-03-27 02:00:01 --> [REQ_ID=57572ab8c230] [PERF] Execution time=0.050759
DEBUG - 2026-03-27 02:01:22 --> [REQ_ID=724ea8282d64] [REQUEST][START] HEAD /
DEBUG - 2026-03-27 02:01:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-27 02:01:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-27 02:01:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-27 02:01:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-27 02:01:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-27 02:06:22 --> [REQ_ID=3ceb7b0fce50] [REQUEST][START] HEAD /
DEBUG - 2026-03-27 02:06:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-27 02:06:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-27 02:06:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-27 02:06:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-27 02:06:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-27 02:08:52 --> [REQ_ID=47623755ef67] [REQUEST][START] GET /
DEBUG - 2026-03-27 02:08:52 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-27 02:08:52 --> [REQ_ID=47623755ef67] [REQUEST][END]
INFO - 2026-03-27 02:08:52 --> [REQ_ID=47623755ef67] [PERF] Execution time=0.038320
DEBUG - 2026-03-27 02:11:22 --> [REQ_ID=b9dd93258fd1] [REQUEST][START] HEAD /
DEBUG - 2026-03-27 02:11:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-27 02:11:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-27 02:11:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-27 02:11:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-27 02:11:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-27 02:15:01 --> [REQ_ID=b863a2b8b73a] [REQUEST][START] GET /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-27 02:15:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-27 02:15:01 --> [REQ_ID=b863a2b8b73a] [FILTER_BEFORE] /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-27 02:15:01 --> [REQ_ID=b863a2b8b73a] [ROUTE] Controller=\App\Modules\APIs\Controllers\AlertsAPIController Method=fetchEmailAlerts
DEBUG - 2026-03-27 02:15:01 --> [REQ_ID=b863a2b8b73a] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-27 02:15:01 --> [REQ_ID=b863a2b8b73a] [REQUEST][END]
INFO - 2026-03-27 02:15:01 --> [REQ_ID=b863a2b8b73a] [PERF] Execution time=0.096502
DEBUG - 2026-03-27 02:16:22 --> [REQ_ID=3a96a54cfb35] [REQUEST][START] HEAD /
DEBUG - 2026-03-27 02:16:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-27 02:16:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-27 02:16:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-27 02:16:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-27 02:16:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-27 02:21:22 --> [REQ_ID=cafddb1f0c2d] [REQUEST][START] HEAD /
DEBUG - 2026-03-27 02:21:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-27 02:21:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-27 02:21:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-27 02:21:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-27 02:21:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-27 02:26:22 --> [REQ_ID=7783d6dd3663] [REQUEST][START] HEAD /
DEBUG - 2026-03-27 02:26:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-27 02:26:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-27 02:26:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-27 02:26:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-27 02:26:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-27 02:29:33 --> [REQ_ID=a22520021b12] [REQUEST][START] GET /
DEBUG - 2026-03-27 02:29:33 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-27 02:29:33 --> [REQ_ID=a22520021b12] [FILTER_BEFORE] /
DEBUG - 2026-03-27 02:29:33 --> [REQ_ID=a22520021b12] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-27 02:29:33 --> [REQ_ID=a22520021b12] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-27 02:29:33 --> [CSRF] token name=csrf_test_name hash=4a20ed2586eb0cfa92f32fb1f28fd47f
DEBUG - 2026-03-27 02:29:33 --> [REQ_ID=e957e7d814f8] [INIT] App\Controllers\Home::GET
INFO - 2026-03-27 02:29:33 --> [REQ_ID=e957e7d814f8] [MEMORY][controller-start] 6291456
INFO - 2026-03-27 02:29:33 --> [REQ_ID=e957e7d814f8] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-27 02:29:33 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-27 02:29:33 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-03-27 02:29:33 --> [REQ_ID=e957e7d814f8] [VIEW_RENDER] themes/public/home
INFO - 2026-03-27 02:29:33 --> [REQ_ID=e957e7d814f8] [MEMORY][commonData:start] 10485760
INFO - 2026-03-27 02:29:33 --> themesMemory usage: 10485760
DEBUG - 2026-03-27 02:29:34 --> [MetaService] slug= pageName=Home cacheHit= path=DB
DEBUG - 2026-03-27 02:29:34 --> [REQ_ID=a22520021b12] [FILTER_AFTER]
DEBUG - 2026-03-27 02:29:34 --> [REQ_ID=a22520021b12] [LIFECYCLE][END] status=200 duration_ms=746.39 memory_delta=4194304
INFO - 2026-03-27 02:29:34 --> [REQ_ID=e957e7d814f8] [PERF] Execution time=0.742867
DEBUG - 2026-03-27 02:29:34 --> [REQ_ID=a22520021b12] [REQUEST][END]
INFO - 2026-03-27 02:29:34 --> [REQ_ID=a22520021b12] [PERF] Execution time=0.792876
DEBUG - 2026-03-27 02:31:22 --> [REQ_ID=56fc4667c6ae] [REQUEST][START] HEAD /
DEBUG - 2026-03-27 02:31:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-27 02:31:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-27 02:31:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-27 02:31:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-27 02:31:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-27 02:36:22 --> [REQ_ID=4634194492ce] [REQUEST][START] HEAD /
DEBUG - 2026-03-27 02:36:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-27 02:36:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-27 02:36:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-27 02:36:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-27 02:36:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-27 02:41:22 --> [REQ_ID=ff739c212c0a] [REQUEST][START] HEAD /
DEBUG - 2026-03-27 02:41:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-27 02:41:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-27 02:41:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-27 02:41:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-27 02:41:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-27 02:46:22 --> [REQ_ID=63805b1db9c0] [REQUEST][START] HEAD /
DEBUG - 2026-03-27 02:46:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-27 02:46:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-27 02:46:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-27 02:46:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-27 02:46:23 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-27 02:51:22 --> [REQ_ID=d56498778a59] [REQUEST][START] HEAD /
DEBUG - 2026-03-27 02:51:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-27 02:51:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-27 02:51:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-27 02:51:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-27 02:51:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-27 02:56:21 --> [REQ_ID=d3e302ebfe35] [REQUEST][START] GET /
DEBUG - 2026-03-27 02:56:21 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-27 02:56:21 --> [REQ_ID=d3e302ebfe35] [FILTER_BEFORE] /
DEBUG - 2026-03-27 02:56:21 --> [REQ_ID=d3e302ebfe35] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-27 02:56:21 --> [REQ_ID=d3e302ebfe35] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-27 02:56:21 --> [CSRF] token name=csrf_test_name hash=132ebcc846c86c9242225c3cc9399744
DEBUG - 2026-03-27 02:56:21 --> [REQ_ID=f6b3493cc8fd] [INIT] App\Controllers\Home::GET
INFO - 2026-03-27 02:56:21 --> [REQ_ID=f6b3493cc8fd] [MEMORY][controller-start] 6291456
INFO - 2026-03-27 02:56:21 --> [REQ_ID=f6b3493cc8fd] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-27 02:56:21 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-27 02:56:22 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-03-27 02:56:22 --> [REQ_ID=f6b3493cc8fd] [VIEW_RENDER] themes/public/home
INFO - 2026-03-27 02:56:22 --> [REQ_ID=f6b3493cc8fd] [MEMORY][commonData:start] 10485760
INFO - 2026-03-27 02:56:22 --> themesMemory usage: 10485760
DEBUG - 2026-03-27 02:56:22 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-27 02:56:22 --> [REQ_ID=d3e302ebfe35] [FILTER_AFTER]
DEBUG - 2026-03-27 02:56:22 --> [REQ_ID=d3e302ebfe35] [LIFECYCLE][END] status=200 duration_ms=746.09 memory_delta=4194304
INFO - 2026-03-27 02:56:22 --> [REQ_ID=f6b3493cc8fd] [PERF] Execution time=0.744108
DEBUG - 2026-03-27 02:56:22 --> [REQ_ID=d3e302ebfe35] [REQUEST][END]
INFO - 2026-03-27 02:56:22 --> [REQ_ID=d3e302ebfe35] [PERF] Execution time=0.785236
DEBUG - 2026-03-27 02:56:22 --> [REQ_ID=b04c12eedc60] [REQUEST][START] HEAD /
DEBUG - 2026-03-27 02:56:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-27 02:56:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-27 02:56:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-27 02:56:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-27 02:56:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-27 03:00:01 --> [REQ_ID=dcd1d30a7f9a] [REQUEST][START] GET /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-27 03:00:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-27 03:00:01 --> [REQ_ID=dcd1d30a7f9a] [FILTER_BEFORE] /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-27 03:00:01 --> [REQ_ID=dcd1d30a7f9a] [ROUTE] Controller=\App\Modules\Management\Controllers\ManagementAPIController Method=Run_CRON_Tasks
DEBUG - 2026-03-27 03:00:01 --> [REQ_ID=dcd1d30a7f9a] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-27 03:00:01 --> [REQ_ID=dcd1d30a7f9a] [REQUEST][END]
INFO - 2026-03-27 03:00:01 --> [REQ_ID=dcd1d30a7f9a] [PERF] Execution time=0.049464
DEBUG - 2026-03-27 03:01:22 --> [REQ_ID=2937e710eff1] [REQUEST][START] HEAD /
DEBUG - 2026-03-27 03:01:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-27 03:01:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-27 03:01:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-27 03:01:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-27 03:01:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-27 03:06:22 --> [REQ_ID=9e5cdaf28c89] [REQUEST][START] HEAD /
DEBUG - 2026-03-27 03:06:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-27 03:06:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-27 03:06:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-27 03:06:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-27 03:06:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-27 03:11:22 --> [REQ_ID=11a2a67633c9] [REQUEST][START] HEAD /
DEBUG - 2026-03-27 03:11:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-27 03:11:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-27 03:11:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-27 03:11:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-27 03:11:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-27 03:15:01 --> [REQ_ID=6d66ee2d60e1] [REQUEST][START] GET /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-27 03:15:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-27 03:15:01 --> [REQ_ID=6d66ee2d60e1] [FILTER_BEFORE] /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-27 03:15:01 --> [REQ_ID=6d66ee2d60e1] [ROUTE] Controller=\App\Modules\APIs\Controllers\AlertsAPIController Method=fetchEmailAlerts
DEBUG - 2026-03-27 03:15:01 --> [REQ_ID=6d66ee2d60e1] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-27 03:15:01 --> [REQ_ID=6d66ee2d60e1] [REQUEST][END]
INFO - 2026-03-27 03:15:01 --> [REQ_ID=6d66ee2d60e1] [PERF] Execution time=0.048925
DEBUG - 2026-03-27 03:16:22 --> [REQ_ID=d91099fa846c] [REQUEST][START] HEAD /
DEBUG - 2026-03-27 03:16:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-27 03:16:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-27 03:16:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-27 03:16:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-27 03:16:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-27 03:21:22 --> [REQ_ID=f9e2c067cb1d] [REQUEST][START] HEAD /
DEBUG - 2026-03-27 03:21:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-27 03:21:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-27 03:21:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-27 03:21:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-27 03:21:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-27 03:26:22 --> [REQ_ID=a72695c4fcaf] [REQUEST][START] HEAD /
DEBUG - 2026-03-27 03:26:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-27 03:26:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-27 03:26:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-27 03:26:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-27 03:26:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-27 03:31:22 --> [REQ_ID=999629d8ce2b] [REQUEST][START] HEAD /
DEBUG - 2026-03-27 03:31:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-27 03:31:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-27 03:31:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-27 03:31:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-27 03:31:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-27 03:34:02 --> [REQ_ID=d1efc6e7e0fc] [REQUEST][START] GET /
DEBUG - 2026-03-27 03:34:02 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-27 03:34:02 --> [REQ_ID=d1efc6e7e0fc] [REQUEST][END]
INFO - 2026-03-27 03:34:02 --> [REQ_ID=d1efc6e7e0fc] [PERF] Execution time=0.038452
DEBUG - 2026-03-27 03:36:22 --> [REQ_ID=f4142acb26d4] [REQUEST][START] HEAD /
DEBUG - 2026-03-27 03:36:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-27 03:36:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-27 03:36:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-27 03:36:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-27 03:36:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-27 03:38:49 --> [REQ_ID=b72953ec6c54] [REQUEST][START] GET /
DEBUG - 2026-03-27 03:38:49 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-27 03:38:49 --> [REQ_ID=b72953ec6c54] [FILTER_BEFORE] /
DEBUG - 2026-03-27 03:38:49 --> [REQ_ID=b72953ec6c54] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-27 03:38:49 --> [REQ_ID=b72953ec6c54] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-27 03:38:49 --> [CSRF] token name=csrf_test_name hash=534a26346c9f2bc4b1b08d65e8b93865
DEBUG - 2026-03-27 03:38:49 --> [REQ_ID=17d2cc22e9a5] [INIT] App\Controllers\Home::GET
INFO - 2026-03-27 03:38:49 --> [REQ_ID=17d2cc22e9a5] [MEMORY][controller-start] 6291456
INFO - 2026-03-27 03:38:49 --> [REQ_ID=17d2cc22e9a5] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-27 03:38:49 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-27 03:38:50 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-03-27 03:38:50 --> [REQ_ID=17d2cc22e9a5] [VIEW_RENDER] themes/public/home
INFO - 2026-03-27 03:38:50 --> [REQ_ID=17d2cc22e9a5] [MEMORY][commonData:start] 10485760
INFO - 2026-03-27 03:38:50 --> themesMemory usage: 10485760
DEBUG - 2026-03-27 03:38:50 --> [MetaService] slug= pageName=Home cacheHit= path=DB
DEBUG - 2026-03-27 03:38:50 --> [REQ_ID=b72953ec6c54] [FILTER_AFTER]
DEBUG - 2026-03-27 03:38:50 --> [REQ_ID=b72953ec6c54] [LIFECYCLE][END] status=200 duration_ms=730.63 memory_delta=4194304
INFO - 2026-03-27 03:38:50 --> [REQ_ID=17d2cc22e9a5] [PERF] Execution time=0.728691
DEBUG - 2026-03-27 03:38:50 --> [REQ_ID=b72953ec6c54] [REQUEST][END]
INFO - 2026-03-27 03:38:50 --> [REQ_ID=b72953ec6c54] [PERF] Execution time=0.770311
DEBUG - 2026-03-27 03:38:51 --> [REQ_ID=255a2c0a63c8] [REQUEST][START] GET /index.php/How-It-Works/Investment-Dashboard
DEBUG - 2026-03-27 03:38:51 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-27 03:38:51 --> [REQ_ID=255a2c0a63c8] [FILTER_BEFORE] /index.php/How-It-Works/Investment-Dashboard
DEBUG - 2026-03-27 03:38:51 --> [REQ_ID=255a2c0a63c8] [ROUTE] Controller=\App\Modules\Blog\Controllers\HowItWorksController Method=show
DEBUG - 2026-03-27 03:38:51 --> [REQ_ID=255a2c0a63c8] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/How-It-Works/Investment-Dashboard
DEBUG - 2026-03-27 03:38:51 --> [CSRF] token name=csrf_test_name hash=534a26346c9f2bc4b1b08d65e8b93865
DEBUG - 2026-03-27 03:38:51 --> [REQ_ID=a759c78d67b5] [INIT] App\Modules\Blog\Controllers\HowItWorksController::GET
INFO - 2026-03-27 03:38:51 --> [REQ_ID=a759c78d67b5] [MEMORY][controller-start] 6291456
DEBUG - 2026-03-27 03:38:51 --> [REQ_ID=a759c78d67b5] [METHOD_ENTRY] show
DEBUG - 2026-03-27 03:38:51 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-27 03:38:51 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-27 03:38:51 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-27 03:38:51 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-27 03:38:51 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-27 03:38:51 --> MyMICoin: guest context detected; skipping user-specific preload.
INFO - 2026-03-27 03:38:51 --> [REQ_ID=a759c78d67b5] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-27 03:38:52 --> [REQ_ID=255a2c0a63c8] [FILTER_AFTER]
DEBUG - 2026-03-27 03:38:52 --> [REQ_ID=255a2c0a63c8] [LIFECYCLE][END] status=200 duration_ms=538.12 memory_delta=2097152
INFO - 2026-03-27 03:38:52 --> [REQ_ID=a759c78d67b5] [PERF] Execution time=0.537938
DEBUG - 2026-03-27 03:38:52 --> [REQ_ID=255a2c0a63c8] [REQUEST][END]
INFO - 2026-03-27 03:38:52 --> [REQ_ID=255a2c0a63c8] [PERF] Execution time=0.552450
DEBUG - 2026-03-27 03:39:52 --> [REQ_ID=61a67d1239c0] [REQUEST][START] GET /index.php
DEBUG - 2026-03-27 03:39:52 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-27 03:39:52 --> [REQ_ID=61a67d1239c0] [FILTER_BEFORE] /index.php
DEBUG - 2026-03-27 03:39:52 --> [REQ_ID=61a67d1239c0] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-27 03:39:52 --> [REQ_ID=61a67d1239c0] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-27 03:39:52 --> [CSRF] token name=csrf_test_name hash=655435af91cb3f1e9de655cc55b4158d
DEBUG - 2026-03-27 03:39:52 --> [REQ_ID=c2fbc8ec49a8] [INIT] App\Controllers\Home::GET
INFO - 2026-03-27 03:39:52 --> [REQ_ID=c2fbc8ec49a8] [MEMORY][controller-start] 6291456
INFO - 2026-03-27 03:39:52 --> [REQ_ID=c2fbc8ec49a8] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-27 03:39:52 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-27 03:39:53 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
DEBUG - 2026-03-27 03:39:53 --> [REQ_ID=c2fbc8ec49a8] [VIEW_RENDER] themes/public/home
INFO - 2026-03-27 03:39:53 --> [REQ_ID=c2fbc8ec49a8] [MEMORY][commonData:start] 8388608
INFO - 2026-03-27 03:39:53 --> themesMemory usage: 8388608
DEBUG - 2026-03-27 03:39:53 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-27 03:39:53 --> [REQ_ID=61a67d1239c0] [FILTER_AFTER]
DEBUG - 2026-03-27 03:39:53 --> [REQ_ID=61a67d1239c0] [LIFECYCLE][END] status=200 duration_ms=600.20 memory_delta=2097152
INFO - 2026-03-27 03:39:53 --> [REQ_ID=c2fbc8ec49a8] [PERF] Execution time=0.599880
DEBUG - 2026-03-27 03:39:53 --> [REQ_ID=61a67d1239c0] [REQUEST][END]
INFO - 2026-03-27 03:39:53 --> [REQ_ID=61a67d1239c0] [PERF] Execution time=0.609845
DEBUG - 2026-03-27 03:40:03 --> [REQ_ID=937d524aa29b] [REQUEST][START] GET /index.php/
DEBUG - 2026-03-27 03:40:03 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-27 03:40:03 --> [REQ_ID=937d524aa29b] [FILTER_BEFORE] /index.php/
DEBUG - 2026-03-27 03:40:03 --> [REQ_ID=937d524aa29b] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-27 03:40:03 --> [REQ_ID=937d524aa29b] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-27 03:40:03 --> [CSRF] token name=csrf_test_name hash=51bf8b564f27ba405b47a5dd3011464c
DEBUG - 2026-03-27 03:40:03 --> [REQ_ID=1fe593a07c44] [INIT] App\Controllers\Home::GET
INFO - 2026-03-27 03:40:03 --> [REQ_ID=1fe593a07c44] [MEMORY][controller-start] 6291456
INFO - 2026-03-27 03:40:03 --> [REQ_ID=1fe593a07c44] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-27 03:40:03 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-27 03:40:03 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
DEBUG - 2026-03-27 03:40:03 --> [REQ_ID=1fe593a07c44] [VIEW_RENDER] themes/public/home
INFO - 2026-03-27 03:40:03 --> [REQ_ID=1fe593a07c44] [MEMORY][commonData:start] 8388608
INFO - 2026-03-27 03:40:03 --> themesMemory usage: 8388608
DEBUG - 2026-03-27 03:40:03 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-27 03:40:03 --> [REQ_ID=937d524aa29b] [FILTER_AFTER]
DEBUG - 2026-03-27 03:40:03 --> [REQ_ID=937d524aa29b] [LIFECYCLE][END] status=200 duration_ms=604.16 memory_delta=2097152
INFO - 2026-03-27 03:40:03 --> [REQ_ID=1fe593a07c44] [PERF] Execution time=0.603918
DEBUG - 2026-03-27 03:40:03 --> [REQ_ID=937d524aa29b] [REQUEST][END]
INFO - 2026-03-27 03:40:03 --> [REQ_ID=937d524aa29b] [PERF] Execution time=0.613366
DEBUG - 2026-03-27 03:40:13 --> [REQ_ID=8b2dd82cc25a] [REQUEST][START] GET /index.php/Customer-Support
DEBUG - 2026-03-27 03:40:13 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-27 03:40:13 --> [REQ_ID=8b2dd82cc25a] [FILTER_BEFORE] /index.php/Customer-Support
DEBUG - 2026-03-27 03:40:13 --> [REQ_ID=8b2dd82cc25a] [ROUTE] Controller=\App\Controllers\App\Modules\Support\Controllers\SupportController Method=index
DEBUG - 2026-03-27 03:40:13 --> [REQ_ID=8b2dd82cc25a] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Customer-Support
DEBUG - 2026-03-27 03:40:13 --> [CSRF] token name=csrf_test_name hash=7561cfefb0030365a86cbaeccd26fa78
DEBUG - 2026-03-27 03:40:13 --> [REQ_ID=8b2dd82cc25a] [REQUEST][END]
INFO - 2026-03-27 03:40:13 --> [REQ_ID=8b2dd82cc25a] [PERF] Execution time=0.011023
DEBUG - 2026-03-27 03:41:00 --> [REQ_ID=eb96b5e099f9] [REQUEST][START] GET /index.php/How-It-Works/MyMI-Wallets
DEBUG - 2026-03-27 03:41:00 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-27 03:41:00 --> [REQ_ID=eb96b5e099f9] [FILTER_BEFORE] /index.php/How-It-Works/MyMI-Wallets
DEBUG - 2026-03-27 03:41:00 --> [REQ_ID=eb96b5e099f9] [ROUTE] Controller=\App\Modules\Blog\Controllers\HowItWorksController Method=show
DEBUG - 2026-03-27 03:41:00 --> [REQ_ID=eb96b5e099f9] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/How-It-Works/MyMI-Wallets
DEBUG - 2026-03-27 03:41:00 --> [CSRF] token name=csrf_test_name hash=7b4c8e58a902f2425f739d9610f18515
DEBUG - 2026-03-27 03:41:00 --> [REQ_ID=2359b09216fc] [INIT] App\Modules\Blog\Controllers\HowItWorksController::GET
INFO - 2026-03-27 03:41:00 --> [REQ_ID=2359b09216fc] [MEMORY][controller-start] 6291456
DEBUG - 2026-03-27 03:41:00 --> [REQ_ID=2359b09216fc] [METHOD_ENTRY] show
DEBUG - 2026-03-27 03:41:00 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-27 03:41:00 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-27 03:41:00 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-27 03:41:00 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-27 03:41:00 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-27 03:41:00 --> MyMICoin: guest context detected; skipping user-specific preload.
ERROR - 2026-03-27 03:41:00 --> HowItWorksController failure: mymi-wallets
CRITICAL - 2026-03-27 03:41:00 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: GET, Route: How-It-Works/MyMI-Wallets]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-27 03:41:00 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-27 03:41:00 --> [404] URI=https://www.mymiwallet.com/index.php/How-It-Works/MyMI-Wallets
WARNING - 2026-03-27 03:41:00 --> 404 route miss: https://www.mymiwallet.com/index.php/How-It-Works/MyMI-Wallets | referrer: none
ERROR - 2026-03-27 03:41:00 --> [ERROR_PAGE] event=error_404 status=404 message=Page not found.
INFO - 2026-03-27 03:41:00 --> [REQ_ID=2359b09216fc] [PERF] Execution time=0.261469
DEBUG - 2026-03-27 03:41:22 --> [REQ_ID=4fb847a6d407] [REQUEST][START] HEAD /
DEBUG - 2026-03-27 03:41:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-27 03:41:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-27 03:41:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-27 03:41:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-27 03:41:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-27 03:45:19 --> [REQ_ID=d0a0eb77843e] [REQUEST][START] GET /
DEBUG - 2026-03-27 03:45:19 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-27 03:45:19 --> [REQ_ID=d0a0eb77843e] [FILTER_BEFORE] /
DEBUG - 2026-03-27 03:45:19 --> [REQ_ID=d0a0eb77843e] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-27 03:45:19 --> [REQ_ID=d0a0eb77843e] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-27 03:45:19 --> [CSRF] token name=csrf_test_name hash=52dc85f62db7a9e464ea0ce34deb03b9
DEBUG - 2026-03-27 03:45:19 --> [REQ_ID=42a70e802962] [INIT] App\Controllers\Home::GET
INFO - 2026-03-27 03:45:19 --> [REQ_ID=42a70e802962] [MEMORY][controller-start] 6291456
INFO - 2026-03-27 03:45:19 --> [REQ_ID=42a70e802962] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-27 03:45:19 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-27 03:45:20 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
DEBUG - 2026-03-27 03:45:20 --> [REQ_ID=42a70e802962] [VIEW_RENDER] themes/public/home
INFO - 2026-03-27 03:45:20 --> [REQ_ID=42a70e802962] [MEMORY][commonData:start] 10485760
INFO - 2026-03-27 03:45:20 --> themesMemory usage: 10485760
DEBUG - 2026-03-27 03:45:20 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-27 03:45:20 --> [REQ_ID=d0a0eb77843e] [FILTER_AFTER]
DEBUG - 2026-03-27 03:45:20 --> [REQ_ID=d0a0eb77843e] [LIFECYCLE][END] status=200 duration_ms=551.75 memory_delta=4194304
INFO - 2026-03-27 03:45:20 --> [REQ_ID=42a70e802962] [PERF] Execution time=0.549529
DEBUG - 2026-03-27 03:45:20 --> [REQ_ID=d0a0eb77843e] [REQUEST][END]
INFO - 2026-03-27 03:45:20 --> [REQ_ID=d0a0eb77843e] [PERF] Execution time=0.593356
DEBUG - 2026-03-27 03:45:20 --> [REQ_ID=51a1e5091b7e] [REQUEST][START] GET /index.php/How-It-Works/Investment-Dashboard
DEBUG - 2026-03-27 03:45:20 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-27 03:45:20 --> [REQ_ID=51a1e5091b7e] [FILTER_BEFORE] /index.php/How-It-Works/Investment-Dashboard
DEBUG - 2026-03-27 03:45:20 --> [REQ_ID=51a1e5091b7e] [ROUTE] Controller=\App\Modules\Blog\Controllers\HowItWorksController Method=show
DEBUG - 2026-03-27 03:45:20 --> [REQ_ID=51a1e5091b7e] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/How-It-Works/Investment-Dashboard
DEBUG - 2026-03-27 03:45:20 --> [CSRF] token name=csrf_test_name hash=52dc85f62db7a9e464ea0ce34deb03b9
DEBUG - 2026-03-27 03:45:20 --> [REQ_ID=164a768ee40d] [INIT] App\Modules\Blog\Controllers\HowItWorksController::GET
INFO - 2026-03-27 03:45:20 --> [REQ_ID=164a768ee40d] [MEMORY][controller-start] 6291456
DEBUG - 2026-03-27 03:45:20 --> [REQ_ID=164a768ee40d] [METHOD_ENTRY] show
DEBUG - 2026-03-27 03:45:20 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-27 03:45:20 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-27 03:45:20 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-27 03:45:20 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-27 03:45:20 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-27 03:45:20 --> MyMICoin: guest context detected; skipping user-specific preload.
INFO - 2026-03-27 03:45:20 --> [REQ_ID=164a768ee40d] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-27 03:45:21 --> [REQ_ID=51a1e5091b7e] [FILTER_AFTER]
DEBUG - 2026-03-27 03:45:21 --> [REQ_ID=51a1e5091b7e] [LIFECYCLE][END] status=200 duration_ms=542.23 memory_delta=2097152
INFO - 2026-03-27 03:45:21 --> [REQ_ID=164a768ee40d] [PERF] Execution time=0.542120
DEBUG - 2026-03-27 03:45:21 --> [REQ_ID=51a1e5091b7e] [REQUEST][END]
INFO - 2026-03-27 03:45:21 --> [REQ_ID=51a1e5091b7e] [PERF] Execution time=0.561390
DEBUG - 2026-03-27 03:46:22 --> [REQ_ID=97ffeb2b2127] [REQUEST][START] HEAD /
DEBUG - 2026-03-27 03:46:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-27 03:46:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-27 03:46:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-27 03:46:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-27 03:46:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-27 03:51:22 --> [REQ_ID=e220eee5b34a] [REQUEST][START] HEAD /
DEBUG - 2026-03-27 03:51:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-27 03:51:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-27 03:51:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-27 03:51:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-27 03:51:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-27 03:56:22 --> [REQ_ID=c8a26d418026] [REQUEST][START] HEAD /
DEBUG - 2026-03-27 03:56:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-27 03:56:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-27 03:56:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-27 03:56:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-27 03:56:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-27 04:00:02 --> [REQ_ID=236886f0fc14] [REQUEST][START] GET /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-27 04:00:02 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-27 04:00:02 --> [REQ_ID=236886f0fc14] [FILTER_BEFORE] /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-27 04:00:02 --> [REQ_ID=236886f0fc14] [ROUTE] Controller=\App\Modules\Management\Controllers\ManagementAPIController Method=Run_CRON_Tasks
DEBUG - 2026-03-27 04:00:02 --> [REQ_ID=236886f0fc14] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-27 04:00:02 --> [REQ_ID=236886f0fc14] [REQUEST][END]
INFO - 2026-03-27 04:00:02 --> [REQ_ID=236886f0fc14] [PERF] Execution time=0.049661
DEBUG - 2026-03-27 04:01:22 --> [REQ_ID=c6a580ba51dd] [REQUEST][START] HEAD /
DEBUG - 2026-03-27 04:01:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-27 04:01:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-27 04:01:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-27 04:01:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-27 04:01:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-27 04:03:41 --> [REQ_ID=9eb543c6d43c] [REQUEST][START] GET /index.php
DEBUG - 2026-03-27 04:03:41 --> [REQ_ID=4190f3d81545] [REQUEST][START] GET /index.php/How-It-Works/Registering-An-Account
DEBUG - 2026-03-27 04:03:41 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-27 04:03:41 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-27 04:03:41 --> [REQ_ID=9eb543c6d43c] [FILTER_BEFORE] /index.php
DEBUG - 2026-03-27 04:03:41 --> [REQ_ID=9eb543c6d43c] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-27 04:03:41 --> [REQ_ID=9eb543c6d43c] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-27 04:03:41 --> [CSRF] token name=csrf_test_name hash=f12b0e4547838390fe4e1597e7aa1aa6
DEBUG - 2026-03-27 04:03:41 --> [REQ_ID=b576d027a121] [INIT] App\Controllers\Home::GET
INFO - 2026-03-27 04:03:41 --> [REQ_ID=b576d027a121] [MEMORY][controller-start] 6291456
DEBUG - 2026-03-27 04:03:41 --> [REQ_ID=4190f3d81545] [FILTER_BEFORE] /index.php/How-It-Works/Registering-An-Account
DEBUG - 2026-03-27 04:03:41 --> [REQ_ID=4190f3d81545] [ROUTE] Controller=\App\Modules\Blog\Controllers\HowItWorksController Method=show
DEBUG - 2026-03-27 04:03:41 --> [REQ_ID=4190f3d81545] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/How-It-Works/Registering-An-Account
DEBUG - 2026-03-27 04:03:41 --> [CSRF] token name=csrf_test_name hash=627b8c40e68da279906e5044f88442c4
DEBUG - 2026-03-27 04:03:41 --> [REQ_ID=f7c1184e2e73] [INIT] App\Modules\Blog\Controllers\HowItWorksController::GET
INFO - 2026-03-27 04:03:41 --> [REQ_ID=f7c1184e2e73] [MEMORY][controller-start] 6291456
INFO - 2026-03-27 04:03:41 --> [REQ_ID=b576d027a121] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-27 04:03:41 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-27 04:03:41 --> [REQ_ID=f7c1184e2e73] [METHOD_ENTRY] show
DEBUG - 2026-03-27 04:03:41 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-27 04:03:41 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-27 04:03:41 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-27 04:03:41 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-27 04:03:41 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-27 04:03:41 --> MyMICoin: guest context detected; skipping user-specific preload.
INFO - 2026-03-27 04:03:41 --> [REQ_ID=f7c1184e2e73] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-27 04:03:42 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-03-27 04:03:42 --> [REQ_ID=b576d027a121] [VIEW_RENDER] themes/public/home
INFO - 2026-03-27 04:03:42 --> [REQ_ID=b576d027a121] [MEMORY][commonData:start] 10485760
INFO - 2026-03-27 04:03:42 --> themesMemory usage: 10485760
DEBUG - 2026-03-27 04:03:42 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-27 04:03:42 --> [REQ_ID=9eb543c6d43c] [FILTER_AFTER]
DEBUG - 2026-03-27 04:03:42 --> [REQ_ID=9eb543c6d43c] [LIFECYCLE][END] status=200 duration_ms=643.19 memory_delta=4194304
INFO - 2026-03-27 04:03:42 --> [REQ_ID=b576d027a121] [PERF] Execution time=0.640388
DEBUG - 2026-03-27 04:03:42 --> [REQ_ID=9eb543c6d43c] [REQUEST][END]
INFO - 2026-03-27 04:03:42 --> [REQ_ID=9eb543c6d43c] [PERF] Execution time=0.697152
DEBUG - 2026-03-27 04:03:42 --> [REQ_ID=4190f3d81545] [FILTER_AFTER]
DEBUG - 2026-03-27 04:03:42 --> [REQ_ID=4190f3d81545] [LIFECYCLE][END] status=200 duration_ms=721.22 memory_delta=4194304
INFO - 2026-03-27 04:03:42 --> [REQ_ID=f7c1184e2e73] [PERF] Execution time=0.718853
DEBUG - 2026-03-27 04:03:42 --> [REQ_ID=4190f3d81545] [REQUEST][END]
INFO - 2026-03-27 04:03:42 --> [REQ_ID=4190f3d81545] [PERF] Execution time=0.781726
DEBUG - 2026-03-27 04:06:22 --> [REQ_ID=18fbd8a488d0] [REQUEST][START] HEAD /
DEBUG - 2026-03-27 04:06:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-27 04:06:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-27 04:06:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-27 04:06:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-27 04:06:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-27 04:11:22 --> [REQ_ID=c6df840516ce] [REQUEST][START] HEAD /
DEBUG - 2026-03-27 04:11:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-27 04:11:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-27 04:11:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-27 04:11:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-27 04:11:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-27 04:13:04 --> [REQ_ID=48cf7cce10f7] [REQUEST][START] GET /
DEBUG - 2026-03-27 04:13:04 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-27 04:13:04 --> [REQ_ID=48cf7cce10f7] [FILTER_BEFORE] /
DEBUG - 2026-03-27 04:13:04 --> [REQ_ID=48cf7cce10f7] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-27 04:13:04 --> [REQ_ID=48cf7cce10f7] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-27 04:13:04 --> [CSRF] token name=csrf_test_name hash=38bb0f7951ee691b28b33ba2edbaa1fd
DEBUG - 2026-03-27 04:13:04 --> [REQ_ID=3df51f775b62] [INIT] App\Controllers\Home::GET
INFO - 2026-03-27 04:13:04 --> [REQ_ID=3df51f775b62] [MEMORY][controller-start] 6291456
INFO - 2026-03-27 04:13:04 --> [REQ_ID=3df51f775b62] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-27 04:13:04 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-27 04:13:05 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
DEBUG - 2026-03-27 04:13:05 --> [REQ_ID=3df51f775b62] [VIEW_RENDER] themes/public/home
INFO - 2026-03-27 04:13:05 --> [REQ_ID=3df51f775b62] [MEMORY][commonData:start] 10485760
INFO - 2026-03-27 04:13:05 --> themesMemory usage: 10485760
DEBUG - 2026-03-27 04:13:05 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-27 04:13:05 --> [REQ_ID=48cf7cce10f7] [FILTER_AFTER]
DEBUG - 2026-03-27 04:13:05 --> [REQ_ID=48cf7cce10f7] [LIFECYCLE][END] status=200 duration_ms=744.75 memory_delta=4194304
INFO - 2026-03-27 04:13:05 --> [REQ_ID=3df51f775b62] [PERF] Execution time=0.742777
DEBUG - 2026-03-27 04:13:05 --> [REQ_ID=48cf7cce10f7] [REQUEST][END]
INFO - 2026-03-27 04:13:05 --> [REQ_ID=48cf7cce10f7] [PERF] Execution time=0.782889
DEBUG - 2026-03-27 04:15:01 --> [REQ_ID=92353fc275d0] [REQUEST][START] GET /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-27 04:15:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-27 04:15:01 --> [REQ_ID=92353fc275d0] [FILTER_BEFORE] /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-27 04:15:01 --> [REQ_ID=92353fc275d0] [ROUTE] Controller=\App\Modules\APIs\Controllers\AlertsAPIController Method=fetchEmailAlerts
DEBUG - 2026-03-27 04:15:01 --> [REQ_ID=92353fc275d0] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-27 04:15:01 --> [REQ_ID=92353fc275d0] [REQUEST][END]
INFO - 2026-03-27 04:15:01 --> [REQ_ID=92353fc275d0] [PERF] Execution time=0.052262
DEBUG - 2026-03-27 04:15:20 --> [REQ_ID=4687663b8057] [REQUEST][START] GET /
DEBUG - 2026-03-27 04:15:20 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-27 04:15:20 --> [REQ_ID=4687663b8057] [FILTER_BEFORE] /
DEBUG - 2026-03-27 04:15:20 --> [REQ_ID=4687663b8057] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-27 04:15:20 --> [REQ_ID=4687663b8057] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-27 04:15:20 --> [CSRF] token name=csrf_test_name hash=a003238ea2ffbce85946b6422eb96fbb
DEBUG - 2026-03-27 04:15:20 --> [REQ_ID=e05710d67cb9] [INIT] App\Controllers\Home::GET
INFO - 2026-03-27 04:15:20 --> [REQ_ID=e05710d67cb9] [MEMORY][controller-start] 4194304
INFO - 2026-03-27 04:15:20 --> [REQ_ID=e05710d67cb9] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-27 04:15:21 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-27 04:15:21 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
DEBUG - 2026-03-27 04:15:21 --> [REQ_ID=e05710d67cb9] [VIEW_RENDER] themes/public/home
INFO - 2026-03-27 04:15:21 --> [REQ_ID=e05710d67cb9] [MEMORY][commonData:start] 8388608
INFO - 2026-03-27 04:15:21 --> themesMemory usage: 8388608
DEBUG - 2026-03-27 04:15:21 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-27 04:15:21 --> [REQ_ID=4687663b8057] [FILTER_AFTER]
DEBUG - 2026-03-27 04:15:21 --> [REQ_ID=4687663b8057] [LIFECYCLE][END] status=200 duration_ms=558.78 memory_delta=4194304
INFO - 2026-03-27 04:15:21 --> [REQ_ID=e05710d67cb9] [PERF] Execution time=0.557434
DEBUG - 2026-03-27 04:15:21 --> [REQ_ID=4687663b8057] [REQUEST][END]
INFO - 2026-03-27 04:15:21 --> [REQ_ID=4687663b8057] [PERF] Execution time=0.569248
DEBUG - 2026-03-27 04:16:22 --> [REQ_ID=2270440f17fa] [REQUEST][START] HEAD /
DEBUG - 2026-03-27 04:16:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-27 04:16:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-27 04:16:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-27 04:16:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-27 04:16:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-27 04:21:22 --> [REQ_ID=f186d712d7b7] [REQUEST][START] HEAD /
DEBUG - 2026-03-27 04:21:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-27 04:21:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-27 04:21:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-27 04:21:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-27 04:21:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-27 04:26:22 --> [REQ_ID=2502edb62417] [REQUEST][START] HEAD /
DEBUG - 2026-03-27 04:26:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-27 04:26:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-27 04:26:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-27 04:26:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-27 04:26:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-27 04:31:22 --> [REQ_ID=6b45feb5179e] [REQUEST][START] HEAD /
DEBUG - 2026-03-27 04:31:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-27 04:31:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-27 04:31:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-27 04:31:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-27 04:31:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-27 04:36:22 --> [REQ_ID=873bcf8e6bfd] [REQUEST][START] HEAD /
DEBUG - 2026-03-27 04:36:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-27 04:36:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-27 04:36:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-27 04:36:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-27 04:36:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-27 04:41:22 --> [REQ_ID=db2b92ba74ef] [REQUEST][START] HEAD /
DEBUG - 2026-03-27 04:41:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-27 04:41:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-27 04:41:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-27 04:41:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-27 04:41:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-27 04:46:22 --> [REQ_ID=d44c0d562a66] [REQUEST][START] HEAD /
DEBUG - 2026-03-27 04:46:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-27 04:46:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-27 04:46:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-27 04:46:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-27 04:46:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-27 04:51:22 --> [REQ_ID=780167774ef9] [REQUEST][START] HEAD /
DEBUG - 2026-03-27 04:51:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-27 04:51:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-27 04:51:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-27 04:51:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-27 04:51:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-27 04:56:22 --> [REQ_ID=d354c959a211] [REQUEST][START] HEAD /
DEBUG - 2026-03-27 04:56:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-27 04:56:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-27 04:56:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-27 04:56:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-27 04:56:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-27 05:00:02 --> [REQ_ID=24d1b4174a03] [REQUEST][START] GET /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-27 05:00:02 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-27 05:00:02 --> [REQ_ID=24d1b4174a03] [FILTER_BEFORE] /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-27 05:00:02 --> [REQ_ID=24d1b4174a03] [ROUTE] Controller=\App\Modules\Management\Controllers\ManagementAPIController Method=Run_CRON_Tasks
DEBUG - 2026-03-27 05:00:02 --> [REQ_ID=24d1b4174a03] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-27 05:00:02 --> [REQ_ID=24d1b4174a03] [REQUEST][END]
INFO - 2026-03-27 05:00:02 --> [REQ_ID=24d1b4174a03] [PERF] Execution time=0.045875
DEBUG - 2026-03-27 05:01:22 --> [REQ_ID=e5e2ba1f2d87] [REQUEST][START] HEAD /
DEBUG - 2026-03-27 05:01:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-27 05:01:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-27 05:01:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-27 05:01:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-27 05:01:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-27 05:06:22 --> [REQ_ID=37a7a8914c56] [REQUEST][START] HEAD /
DEBUG - 2026-03-27 05:06:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-27 05:06:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-27 05:06:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-27 05:06:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-27 05:06:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-27 05:08:45 --> [REQ_ID=d5a2c06f2a43] [REQUEST][START] GET /index.php/Blog/IRS/IRS-Expanded-Home-Energy-Tax-Credits
DEBUG - 2026-03-27 05:08:45 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-27 05:08:45 --> [REQ_ID=d5a2c06f2a43] [REQUEST][END]
INFO - 2026-03-27 05:08:45 --> [REQ_ID=d5a2c06f2a43] [PERF] Execution time=0.041326
DEBUG - 2026-03-27 05:11:22 --> [REQ_ID=8a1e3a9f0e65] [REQUEST][START] HEAD /
DEBUG - 2026-03-27 05:11:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-27 05:11:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-27 05:11:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-27 05:11:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-27 05:11:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-27 05:15:01 --> [REQ_ID=c650fafa23c7] [REQUEST][START] GET /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-27 05:15:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-27 05:15:02 --> [REQ_ID=c650fafa23c7] [FILTER_BEFORE] /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-27 05:15:02 --> [REQ_ID=c650fafa23c7] [ROUTE] Controller=\App\Modules\APIs\Controllers\AlertsAPIController Method=fetchEmailAlerts
DEBUG - 2026-03-27 05:15:02 --> [REQ_ID=c650fafa23c7] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-27 05:15:02 --> [REQ_ID=c650fafa23c7] [REQUEST][END]
INFO - 2026-03-27 05:15:02 --> [REQ_ID=c650fafa23c7] [PERF] Execution time=0.067827
DEBUG - 2026-03-27 05:16:22 --> [REQ_ID=64af75d10cdd] [REQUEST][START] HEAD /
DEBUG - 2026-03-27 05:16:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-27 05:16:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-27 05:16:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-27 05:16:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-27 05:16:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-27 05:21:22 --> [REQ_ID=677d16cbd6cf] [REQUEST][START] HEAD /
DEBUG - 2026-03-27 05:21:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-27 05:21:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-27 05:21:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-27 05:21:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-27 05:21:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-27 05:26:22 --> [REQ_ID=93d83e89cf58] [REQUEST][START] HEAD /
DEBUG - 2026-03-27 05:26:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-27 05:26:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-27 05:26:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-27 05:26:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-27 05:26:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-27 05:31:22 --> [REQ_ID=a0838a84bf86] [REQUEST][START] HEAD /
DEBUG - 2026-03-27 05:31:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-27 05:31:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-27 05:31:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-27 05:31:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-27 05:31:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-27 05:34:06 --> [REQ_ID=0740ae78d014] [REQUEST][START] GET /index.php/How-It-Works/MyMI-Gold
DEBUG - 2026-03-27 05:34:06 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-27 05:34:06 --> [REQ_ID=0740ae78d014] [REQUEST][END]
INFO - 2026-03-27 05:34:06 --> [REQ_ID=0740ae78d014] [PERF] Execution time=0.040349
DEBUG - 2026-03-27 05:36:22 --> [REQ_ID=6f3a463e5c8e] [REQUEST][START] HEAD /
DEBUG - 2026-03-27 05:36:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-27 05:36:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-27 05:36:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-27 05:36:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-27 05:36:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-27 05:41:22 --> [REQ_ID=0dd0aa2a3f45] [REQUEST][START] HEAD /
DEBUG - 2026-03-27 05:41:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-27 05:41:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-27 05:41:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-27 05:41:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-27 05:41:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-27 05:41:23 --> [REQ_ID=176eb1d08f13] [REQUEST][START] GET /index.php/Account/Connected-Accounts
DEBUG - 2026-03-27 05:41:23 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-27 05:41:23 --> [REQ_ID=176eb1d08f13] [REQUEST][END]
INFO - 2026-03-27 05:41:23 --> [REQ_ID=176eb1d08f13] [PERF] Execution time=0.022144
DEBUG - 2026-03-27 05:42:44 --> [REQ_ID=4fcb1ec6466c] [REQUEST][START] GET /
DEBUG - 2026-03-27 05:42:44 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-27 05:42:44 --> [REQ_ID=4fcb1ec6466c] [FILTER_BEFORE] /
DEBUG - 2026-03-27 05:42:44 --> [REQ_ID=4fcb1ec6466c] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-27 05:42:44 --> [REQ_ID=4fcb1ec6466c] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-27 05:42:44 --> [CSRF] token name=csrf_test_name hash=eb681b0ee4d334ecd9320f8e6837a765
DEBUG - 2026-03-27 05:42:44 --> [REQ_ID=4b56a6d10419] [INIT] App\Controllers\Home::GET
INFO - 2026-03-27 05:42:44 --> [REQ_ID=4b56a6d10419] [MEMORY][controller-start] 6291456
INFO - 2026-03-27 05:42:44 --> [REQ_ID=4b56a6d10419] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-27 05:42:44 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-27 05:42:45 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-03-27 05:42:45 --> [REQ_ID=4b56a6d10419] [VIEW_RENDER] themes/public/home
INFO - 2026-03-27 05:42:45 --> [REQ_ID=4b56a6d10419] [MEMORY][commonData:start] 10485760
INFO - 2026-03-27 05:42:45 --> themesMemory usage: 10485760
DEBUG - 2026-03-27 05:42:45 --> [MetaService] slug= pageName=Home cacheHit= path=DB
DEBUG - 2026-03-27 05:42:45 --> [REQ_ID=4fcb1ec6466c] [FILTER_AFTER]
DEBUG - 2026-03-27 05:42:45 --> [REQ_ID=4fcb1ec6466c] [LIFECYCLE][END] status=200 duration_ms=596.93 memory_delta=4194304
INFO - 2026-03-27 05:42:45 --> [REQ_ID=4b56a6d10419] [PERF] Execution time=0.595045
DEBUG - 2026-03-27 05:42:45 --> [REQ_ID=4fcb1ec6466c] [REQUEST][END]
INFO - 2026-03-27 05:42:45 --> [REQ_ID=4fcb1ec6466c] [PERF] Execution time=0.635225
DEBUG - 2026-03-27 05:46:22 --> [REQ_ID=dbef759f0e45] [REQUEST][START] HEAD /
DEBUG - 2026-03-27 05:46:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-27 05:46:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-27 05:46:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-27 05:46:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-27 05:46:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-27 05:51:22 --> [REQ_ID=3d872f78630f] [REQUEST][START] HEAD /
DEBUG - 2026-03-27 05:51:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-27 05:51:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-27 05:51:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-27 05:51:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-27 05:51:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-27 05:56:22 --> [REQ_ID=57c43487004c] [REQUEST][START] HEAD /
DEBUG - 2026-03-27 05:56:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-27 05:56:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-27 05:56:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-27 05:56:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-27 05:56:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-27 06:00:01 --> [REQ_ID=5219335925c7] [REQUEST][START] GET /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-27 06:00:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-27 06:00:01 --> [REQ_ID=5219335925c7] [FILTER_BEFORE] /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-27 06:00:01 --> [REQ_ID=5219335925c7] [ROUTE] Controller=\App\Modules\Management\Controllers\ManagementAPIController Method=Run_CRON_Tasks
DEBUG - 2026-03-27 06:00:01 --> [REQ_ID=5219335925c7] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-27 06:00:01 --> [REQ_ID=5219335925c7] [REQUEST][END]
INFO - 2026-03-27 06:00:01 --> [REQ_ID=5219335925c7] [PERF] Execution time=0.045630
DEBUG - 2026-03-27 06:01:22 --> [REQ_ID=89ca7527bb55] [REQUEST][START] HEAD /
DEBUG - 2026-03-27 06:01:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-27 06:01:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-27 06:01:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-27 06:01:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-27 06:01:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-27 06:05:00 --> [REQ_ID=210e5df52f06] [REQUEST][START] GET /index.php/Blog
DEBUG - 2026-03-27 06:05:00 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-27 06:05:00 --> [REQ_ID=210e5df52f06] [REQUEST][END]
INFO - 2026-03-27 06:05:00 --> [REQ_ID=210e5df52f06] [PERF] Execution time=0.041320
DEBUG - 2026-03-27 06:06:22 --> [REQ_ID=93d4bde8d94f] [REQUEST][START] HEAD /
DEBUG - 2026-03-27 06:06:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-27 06:06:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-27 06:06:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-27 06:06:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-27 06:06:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-27 06:11:22 --> [REQ_ID=1f9ba5b65f04] [REQUEST][START] HEAD /
DEBUG - 2026-03-27 06:11:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-27 06:11:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-27 06:11:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-27 06:11:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-27 06:11:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-27 06:14:59 --> [REQ_ID=5e9dddd54b54] [REQUEST][START] GET /
DEBUG - 2026-03-27 06:14:59 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-27 06:14:59 --> [REQ_ID=5e9dddd54b54] [FILTER_BEFORE] /
DEBUG - 2026-03-27 06:14:59 --> [REQ_ID=5e9dddd54b54] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-27 06:14:59 --> [REQ_ID=5e9dddd54b54] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-27 06:14:59 --> [CSRF] token name=csrf_test_name hash=1c68d9b708498ec33bb95453372c3fd0
DEBUG - 2026-03-27 06:14:59 --> [REQ_ID=1169e57947b7] [INIT] App\Controllers\Home::GET
INFO - 2026-03-27 06:14:59 --> [REQ_ID=1169e57947b7] [MEMORY][controller-start] 6291456
INFO - 2026-03-27 06:14:59 --> [REQ_ID=1169e57947b7] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-27 06:14:59 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-27 06:14:59 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-03-27 06:14:59 --> [REQ_ID=1169e57947b7] [VIEW_RENDER] themes/public/home
INFO - 2026-03-27 06:14:59 --> [REQ_ID=1169e57947b7] [MEMORY][commonData:start] 10485760
INFO - 2026-03-27 06:14:59 --> themesMemory usage: 10485760
DEBUG - 2026-03-27 06:14:59 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-27 06:14:59 --> [REQ_ID=5e9dddd54b54] [FILTER_AFTER]
DEBUG - 2026-03-27 06:14:59 --> [REQ_ID=5e9dddd54b54] [LIFECYCLE][END] status=200 duration_ms=598.74 memory_delta=4194304
INFO - 2026-03-27 06:14:59 --> [REQ_ID=1169e57947b7] [PERF] Execution time=0.596782
DEBUG - 2026-03-27 06:14:59 --> [REQ_ID=5e9dddd54b54] [REQUEST][END]
INFO - 2026-03-27 06:14:59 --> [REQ_ID=5e9dddd54b54] [PERF] Execution time=0.638003
DEBUG - 2026-03-27 06:15:02 --> [REQ_ID=0c12a92c9f38] [REQUEST][START] GET /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-27 06:15:02 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-27 06:15:02 --> [REQ_ID=0c12a92c9f38] [FILTER_BEFORE] /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-27 06:15:02 --> [REQ_ID=0c12a92c9f38] [ROUTE] Controller=\App\Modules\APIs\Controllers\AlertsAPIController Method=fetchEmailAlerts
DEBUG - 2026-03-27 06:15:02 --> [REQ_ID=0c12a92c9f38] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-27 06:15:02 --> [REQ_ID=0c12a92c9f38] [REQUEST][END]
INFO - 2026-03-27 06:15:02 --> [REQ_ID=0c12a92c9f38] [PERF] Execution time=0.017252
DEBUG - 2026-03-27 06:16:22 --> [REQ_ID=7f5d28f891b8] [REQUEST][START] HEAD /
DEBUG - 2026-03-27 06:16:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-27 06:16:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-27 06:16:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-27 06:16:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-27 06:16:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-27 06:21:22 --> [REQ_ID=3ba85d8308ac] [REQUEST][START] HEAD /
DEBUG - 2026-03-27 06:21:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-27 06:21:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-27 06:21:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-27 06:21:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-27 06:21:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-27 06:26:22 --> [REQ_ID=ce5262d64630] [REQUEST][START] HEAD /
DEBUG - 2026-03-27 06:26:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-27 06:26:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-27 06:26:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-27 06:26:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-27 06:26:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-27 06:31:22 --> [REQ_ID=c1433548c869] [REQUEST][START] HEAD /
DEBUG - 2026-03-27 06:31:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-27 06:31:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-27 06:31:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-27 06:31:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-27 06:31:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-27 06:36:22 --> [REQ_ID=df38874734d7] [REQUEST][START] HEAD /
DEBUG - 2026-03-27 06:36:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-27 06:36:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-27 06:36:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-27 06:36:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-27 06:36:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-27 06:41:22 --> [REQ_ID=90566fad87be] [REQUEST][START] HEAD /
DEBUG - 2026-03-27 06:41:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-27 06:41:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-27 06:41:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-27 06:41:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-27 06:41:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-27 06:46:22 --> [REQ_ID=1eecf310d63e] [REQUEST][START] HEAD /
DEBUG - 2026-03-27 06:46:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-27 06:46:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-27 06:46:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-27 06:46:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-27 06:46:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-27 06:51:22 --> [REQ_ID=6e10475c2262] [REQUEST][START] HEAD /
DEBUG - 2026-03-27 06:51:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-27 06:51:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-27 06:51:23 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-27 06:51:23 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-27 06:51:23 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-27 06:56:22 --> [REQ_ID=1641d75e4b23] [REQUEST][START] HEAD /
DEBUG - 2026-03-27 06:56:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-27 06:56:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-27 06:56:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-27 06:56:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-27 06:56:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
INFO - 2026-03-27 07:00:01 --> [SPARK_START] App\Commands\AIOps\Run
INFO - 2026-03-27 07:00:01 --> [SPARK_MEMORY] 18874368
INFO - 2026-03-27 07:00:01 --> [spark:aiops:run] Intent
INFO - 2026-03-27 07:00:01 --> [spark:ops:work] Started
INFO - 2026-03-27 07:00:01 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-03-27 07:00:01 --> [SPARK_MEMORY] 18874368
INFO - 2026-03-27 07:00:01 --> [spark:ops:work] Intent
DEBUG - 2026-03-27 07:00:01 --> [REQ_ID=e8557c4b302b] [REQUEST][START] GET /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-27 07:00:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
INFO - 2026-03-27 07:00:01 --> [spark:ops:work] Completed
INFO - 2026-03-27 07:00:01 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.070028
INFO - 2026-03-27 07:00:01 --> [SPARK_MEMORY] 20971520
DEBUG - 2026-03-27 07:00:01 --> [REQ_ID=e8557c4b302b] [FILTER_BEFORE] /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-27 07:00:01 --> [REQ_ID=e8557c4b302b] [ROUTE] Controller=\App\Modules\Management\Controllers\ManagementAPIController Method=Run_CRON_Tasks
DEBUG - 2026-03-27 07:00:01 --> [REQ_ID=e8557c4b302b] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-27 07:00:01 --> [REQ_ID=e8557c4b302b] [REQUEST][END]
INFO - 2026-03-27 07:00:01 --> [REQ_ID=e8557c4b302b] [PERF] Execution time=0.107233
INFO - 2026-03-27 07:00:03 --> [AIOPS][SPARK][GOVERNANCE][spark:logs:summarize] Started
INFO - 2026-03-27 07:00:03 --> [SPARK_START] App\Commands\Logs\Summarize
INFO - 2026-03-27 07:00:03 --> [SPARK_MEMORY] 18874368
INFO - 2026-03-27 07:00:03 --> [spark:logs:summarize] Intent
INFO - 2026-03-27 07:00:03 --> [AIOPS][SPARK][GOVERNANCE][spark:logs:summarize] Completed
INFO - 2026-03-27 07:00:03 --> [SPARK_COMPLETE] App\Commands\Logs\Summarize duration=0.007521
INFO - 2026-03-27 07:00:03 --> [SPARK_MEMORY] 18874368
INFO - 2026-03-27 07:00:04 --> [spark:app:healthcheck] Started
INFO - 2026-03-27 07:00:04 --> [SPARK_START] App\Commands\App\Healthcheck
INFO - 2026-03-27 07:00:04 --> [SPARK_MEMORY] 18874368
INFO - 2026-03-27 07:00:04 --> [spark:app:healthcheck] Intent
DEBUG - 2026-03-27 07:00:04 --> LOG_HEALTHCHECK debug marker=8c0050b9ff7a
INFO - 2026-03-27 07:00:04 --> LOG_HEALTHCHECK info marker=8c0050b9ff7a
NOTICE - 2026-03-27 07:00:04 --> LOG_HEALTHCHECK probe marker=8c0050b9ff7a
INFO - 2026-03-27 07:00:04 --> [spark:app:healthcheck] Completed
INFO - 2026-03-27 07:00:04 --> [SPARK_COMPLETE] App\Commands\App\Healthcheck duration=0.044874
INFO - 2026-03-27 07:00:04 --> [SPARK_MEMORY] 18874368
INFO - 2026-03-27 07:00:04 --> [SPARK_COMPLETE] App\Commands\AIOps\Run duration=2.666768
INFO - 2026-03-27 07:00:04 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-03-27 07:01:22 --> [REQ_ID=d58f729585a3] [REQUEST][START] HEAD /
DEBUG - 2026-03-27 07:01:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-27 07:01:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-27 07:01:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-27 07:01:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-27 07:01:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-27 07:06:22 --> [REQ_ID=20f50052adf8] [REQUEST][START] HEAD /
DEBUG - 2026-03-27 07:06:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-27 07:06:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-27 07:06:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-27 07:06:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-27 07:06:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-27 07:11:22 --> [REQ_ID=040667f42dda] [REQUEST][START] HEAD /
DEBUG - 2026-03-27 07:11:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-27 07:11:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-27 07:11:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-27 07:11:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-27 07:11:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-27 07:15:01 --> [REQ_ID=c700dd0ae658] [REQUEST][START] GET /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-27 07:15:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-27 07:15:01 --> [REQ_ID=c700dd0ae658] [FILTER_BEFORE] /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-27 07:15:01 --> [REQ_ID=c700dd0ae658] [ROUTE] Controller=\App\Modules\APIs\Controllers\AlertsAPIController Method=fetchEmailAlerts
DEBUG - 2026-03-27 07:15:01 --> [REQ_ID=c700dd0ae658] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-27 07:15:01 --> [REQ_ID=c700dd0ae658] [REQUEST][END]
INFO - 2026-03-27 07:15:01 --> [REQ_ID=c700dd0ae658] [PERF] Execution time=0.046242
DEBUG - 2026-03-27 07:16:22 --> [REQ_ID=f01963362496] [REQUEST][START] HEAD /
DEBUG - 2026-03-27 07:16:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-27 07:16:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-27 07:16:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-27 07:16:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-27 07:16:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-27 07:21:22 --> [REQ_ID=6f7360068c2c] [REQUEST][START] HEAD /
DEBUG - 2026-03-27 07:21:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-27 07:21:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-27 07:21:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-27 07:21:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-27 07:21:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-27 07:26:22 --> [REQ_ID=cbb33f50e416] [REQUEST][START] HEAD /
DEBUG - 2026-03-27 07:26:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-27 07:26:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-27 07:26:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-27 07:26:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-27 07:26:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-27 07:31:22 --> [REQ_ID=64c4be684655] [REQUEST][START] HEAD /
DEBUG - 2026-03-27 07:31:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-27 07:31:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-27 07:31:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-27 07:31:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-27 07:31:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-27 07:35:45 --> [REQ_ID=2161d684eead] [REQUEST][START] GET /
DEBUG - 2026-03-27 07:35:45 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-27 07:35:45 --> [REQ_ID=2161d684eead] [FILTER_BEFORE] /
DEBUG - 2026-03-27 07:35:45 --> [REQ_ID=2161d684eead] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-27 07:35:45 --> [REQ_ID=2161d684eead] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-27 07:35:45 --> [CSRF] token name=csrf_test_name hash=9e7d043e71cccd485ae7bb4fd2d33ea5
DEBUG - 2026-03-27 07:35:45 --> [REQ_ID=d763aa200c5f] [INIT] App\Controllers\Home::GET
INFO - 2026-03-27 07:35:45 --> [REQ_ID=d763aa200c5f] [MEMORY][controller-start] 6291456
INFO - 2026-03-27 07:35:45 --> [REQ_ID=d763aa200c5f] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-27 07:35:45 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-27 07:35:46 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-03-27 07:35:46 --> [REQ_ID=d763aa200c5f] [VIEW_RENDER] themes/public/home
INFO - 2026-03-27 07:35:46 --> [REQ_ID=d763aa200c5f] [MEMORY][commonData:start] 10485760
INFO - 2026-03-27 07:35:46 --> themesMemory usage: 10485760
DEBUG - 2026-03-27 07:35:46 --> [MetaService] slug= pageName=Home cacheHit= path=DB
DEBUG - 2026-03-27 07:35:46 --> [REQ_ID=2161d684eead] [FILTER_AFTER]
DEBUG - 2026-03-27 07:35:46 --> [REQ_ID=2161d684eead] [LIFECYCLE][END] status=200 duration_ms=698.01 memory_delta=4194304
INFO - 2026-03-27 07:35:46 --> [REQ_ID=d763aa200c5f] [PERF] Execution time=0.696385
DEBUG - 2026-03-27 07:35:46 --> [REQ_ID=2161d684eead] [REQUEST][END]
INFO - 2026-03-27 07:35:46 --> [REQ_ID=2161d684eead] [PERF] Execution time=0.736364
DEBUG - 2026-03-27 07:36:22 --> [REQ_ID=bb40ce87d2bf] [REQUEST][START] HEAD /
DEBUG - 2026-03-27 07:36:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-27 07:36:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-27 07:36:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-27 07:36:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-27 07:36:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-27 07:41:22 --> [REQ_ID=7acad221a69f] [REQUEST][START] HEAD /
DEBUG - 2026-03-27 07:41:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-27 07:41:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-27 07:41:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-27 07:41:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-27 07:41:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-27 07:46:22 --> [REQ_ID=4139bcaba135] [REQUEST][START] HEAD /
DEBUG - 2026-03-27 07:46:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-27 07:46:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-27 07:46:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-27 07:46:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-27 07:46:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-27 07:51:22 --> [REQ_ID=d6a13f63e9fa] [REQUEST][START] HEAD /
DEBUG - 2026-03-27 07:51:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-27 07:51:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-27 07:51:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-27 07:51:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-27 07:51:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-27 07:52:54 --> [REQ_ID=d5a3ec3c04cc] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-27 07:52:54 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-27 07:52:55 --> [REQ_ID=d5a3ec3c04cc] [REQUEST][END]
INFO - 2026-03-27 07:52:55 --> [REQ_ID=d5a3ec3c04cc] [PERF] Execution time=0.044466
DEBUG - 2026-03-27 07:56:22 --> [REQ_ID=1a5f7999a922] [REQUEST][START] HEAD /
DEBUG - 2026-03-27 07:56:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-27 07:56:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-27 07:56:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-27 07:56:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-27 07:56:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-27 08:00:02 --> [REQ_ID=de11f2af0c3f] [REQUEST][START] GET /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-27 08:00:02 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-27 08:00:02 --> [REQ_ID=de11f2af0c3f] [FILTER_BEFORE] /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-27 08:00:02 --> [REQ_ID=de11f2af0c3f] [ROUTE] Controller=\App\Modules\Management\Controllers\ManagementAPIController Method=Run_CRON_Tasks
DEBUG - 2026-03-27 08:00:02 --> [REQ_ID=de11f2af0c3f] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-27 08:00:02 --> [REQ_ID=de11f2af0c3f] [REQUEST][END]
INFO - 2026-03-27 08:00:02 --> [REQ_ID=de11f2af0c3f] [PERF] Execution time=0.048164
DEBUG - 2026-03-27 08:01:22 --> [REQ_ID=a9d57c867a25] [REQUEST][START] HEAD /
DEBUG - 2026-03-27 08:01:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-27 08:01:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-27 08:01:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-27 08:01:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-27 08:01:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-27 08:01:30 --> [REQ_ID=fc4c467490b1] [REQUEST][START] GET /index.php/activate
DEBUG - 2026-03-27 08:01:30 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-27 08:01:31 --> [REQ_ID=fc4c467490b1] [REQUEST][END]
INFO - 2026-03-27 08:01:31 --> [REQ_ID=fc4c467490b1] [PERF] Execution time=0.021535
DEBUG - 2026-03-27 08:06:22 --> [REQ_ID=ced6498e05cd] [REQUEST][START] HEAD /
DEBUG - 2026-03-27 08:06:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-27 08:06:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-27 08:06:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-27 08:06:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-27 08:06:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-27 08:11:22 --> [REQ_ID=28c7c29792a3] [REQUEST][START] HEAD /
DEBUG - 2026-03-27 08:11:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-27 08:11:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-27 08:11:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-27 08:11:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-27 08:11:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-27 08:15:02 --> [REQ_ID=061d84187383] [REQUEST][START] GET /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-27 08:15:02 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-27 08:15:02 --> [REQ_ID=061d84187383] [FILTER_BEFORE] /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-27 08:15:02 --> [REQ_ID=061d84187383] [ROUTE] Controller=\App\Modules\APIs\Controllers\AlertsAPIController Method=fetchEmailAlerts
DEBUG - 2026-03-27 08:15:02 --> [REQ_ID=061d84187383] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-27 08:15:02 --> [REQ_ID=061d84187383] [REQUEST][END]
INFO - 2026-03-27 08:15:02 --> [REQ_ID=061d84187383] [PERF] Execution time=0.049139
DEBUG - 2026-03-27 08:16:22 --> [REQ_ID=d8c2ace8fff0] [REQUEST][START] HEAD /
DEBUG - 2026-03-27 08:16:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-27 08:16:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-27 08:16:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-27 08:16:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-27 08:16:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-27 08:21:22 --> [REQ_ID=53f8af7ab75e] [REQUEST][START] HEAD /
DEBUG - 2026-03-27 08:21:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-27 08:21:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-27 08:21:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-27 08:21:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-27 08:21:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-27 08:26:22 --> [REQ_ID=35a2d450a3e2] [REQUEST][START] HEAD /
DEBUG - 2026-03-27 08:26:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-27 08:26:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-27 08:26:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-27 08:26:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-27 08:26:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-27 08:31:22 --> [REQ_ID=cb4b6edae593] [REQUEST][START] HEAD /
DEBUG - 2026-03-27 08:31:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-27 08:31:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-27 08:31:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-27 08:31:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-27 08:31:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-27 08:36:22 --> [REQ_ID=a392883fbb32] [REQUEST][START] HEAD /
DEBUG - 2026-03-27 08:36:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-27 08:36:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-27 08:36:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-27 08:36:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-27 08:36:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-27 08:38:26 --> [REQ_ID=cc5b0f9892cc] [REQUEST][START] GET /index.php/How-To-Guides
DEBUG - 2026-03-27 08:38:26 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
INFO - 2026-03-27 08:38:26 --> REDIRECTED ROUTE at https://www.mymiwallet.com/Knowledgebase/Tutorials
DEBUG - 2026-03-27 08:38:26 --> [REQ_ID=cc5b0f9892cc] [REQUEST][END]
INFO - 2026-03-27 08:38:26 --> [REQ_ID=cc5b0f9892cc] [PERF] Execution time=0.037815
DEBUG - 2026-03-27 08:41:22 --> [REQ_ID=ccc122529efe] [REQUEST][START] HEAD /
DEBUG - 2026-03-27 08:41:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-27 08:41:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-27 08:41:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-27 08:41:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-27 08:41:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-27 08:46:22 --> [REQ_ID=0ec64a402011] [REQUEST][START] HEAD /
DEBUG - 2026-03-27 08:46:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-27 08:46:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-27 08:46:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-27 08:46:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-27 08:46:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-27 08:51:22 --> [REQ_ID=d1f9cd1c340f] [REQUEST][START] HEAD /
DEBUG - 2026-03-27 08:51:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-27 08:51:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-27 08:51:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-27 08:51:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-27 08:51:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-27 08:56:22 --> [REQ_ID=62bacc52e141] [REQUEST][START] HEAD /
DEBUG - 2026-03-27 08:56:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-27 08:56:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-27 08:56:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-27 08:56:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-27 08:56:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-27 09:00:01 --> [REQ_ID=1a30fbf1f2ec] [REQUEST][START] GET /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-27 09:00:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-27 09:00:01 --> [REQ_ID=1a30fbf1f2ec] [FILTER_BEFORE] /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-27 09:00:01 --> [REQ_ID=1a30fbf1f2ec] [ROUTE] Controller=\App\Modules\Management\Controllers\ManagementAPIController Method=Run_CRON_Tasks
DEBUG - 2026-03-27 09:00:01 --> [REQ_ID=1a30fbf1f2ec] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-27 09:00:01 --> [REQ_ID=1a30fbf1f2ec] [REQUEST][END]
INFO - 2026-03-27 09:00:01 --> [REQ_ID=1a30fbf1f2ec] [PERF] Execution time=0.042263
DEBUG - 2026-03-27 09:01:22 --> [REQ_ID=e04524af77dd] [REQUEST][START] HEAD /
DEBUG - 2026-03-27 09:01:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-27 09:01:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-27 09:01:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-27 09:01:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-27 09:01:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-27 09:06:22 --> [REQ_ID=284322d73eaa] [REQUEST][START] HEAD /
DEBUG - 2026-03-27 09:06:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-27 09:06:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-27 09:06:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-27 09:06:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-27 09:06:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-27 09:07:54 --> [REQ_ID=696893014f91] [REQUEST][START] GET /index.php
DEBUG - 2026-03-27 09:07:54 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-27 09:07:54 --> [REQ_ID=696893014f91] [REQUEST][END]
INFO - 2026-03-27 09:07:54 --> [REQ_ID=696893014f91] [PERF] Execution time=0.039606
DEBUG - 2026-03-27 09:11:22 --> [REQ_ID=d8498a1e7f20] [REQUEST][START] HEAD /
DEBUG - 2026-03-27 09:11:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-27 09:11:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-27 09:11:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-27 09:11:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-27 09:11:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-27 09:15:02 --> [REQ_ID=e04e1231f6db] [REQUEST][START] GET /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-27 09:15:02 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-27 09:15:02 --> [REQ_ID=e04e1231f6db] [FILTER_BEFORE] /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-27 09:15:02 --> [REQ_ID=e04e1231f6db] [ROUTE] Controller=\App\Modules\APIs\Controllers\AlertsAPIController Method=fetchEmailAlerts
DEBUG - 2026-03-27 09:15:02 --> [REQ_ID=e04e1231f6db] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-27 09:15:02 --> [REQ_ID=e04e1231f6db] [REQUEST][END]
INFO - 2026-03-27 09:15:02 --> [REQ_ID=e04e1231f6db] [PERF] Execution time=0.044680
DEBUG - 2026-03-27 09:16:22 --> [REQ_ID=2a77b80ca120] [REQUEST][START] HEAD /
DEBUG - 2026-03-27 09:16:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-27 09:16:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-27 09:16:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-27 09:16:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-27 09:16:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-27 09:21:22 --> [REQ_ID=6faf84a50e56] [REQUEST][START] HEAD /
DEBUG - 2026-03-27 09:21:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-27 09:21:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-27 09:21:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-27 09:21:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-27 09:21:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-27 09:26:22 --> [REQ_ID=c28b1bbf3871] [REQUEST][START] HEAD /
DEBUG - 2026-03-27 09:26:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-27 09:26:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-27 09:26:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-27 09:26:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-27 09:26:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-27 09:31:22 --> [REQ_ID=4aa3dc173661] [REQUEST][START] HEAD /
DEBUG - 2026-03-27 09:31:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-27 09:31:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-27 09:31:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-27 09:31:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-27 09:31:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-27 09:36:22 --> [REQ_ID=1c574392a5b7] [REQUEST][START] HEAD /
DEBUG - 2026-03-27 09:36:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-27 09:36:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-27 09:36:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-27 09:36:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-27 09:36:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-27 09:41:22 --> [REQ_ID=34b44e29589f] [REQUEST][START] HEAD /
DEBUG - 2026-03-27 09:41:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-27 09:41:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-27 09:41:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-27 09:41:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-27 09:41:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-27 09:44:35 --> [REQ_ID=4d01766348e0] [REQUEST][START] GET /index.php/register
DEBUG - 2026-03-27 09:44:35 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-27 09:44:35 --> [REQ_ID=4d01766348e0] [FILTER_BEFORE] /index.php/register
DEBUG - 2026-03-27 09:44:35 --> [REQ_ID=4d01766348e0] [ROUTE] Controller=\App\Controllers\AuthController Method=register
DEBUG - 2026-03-27 09:44:35 --> [REQ_ID=4d01766348e0] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/register
DEBUG - 2026-03-27 09:44:35 --> [CSRF] token name=csrf_test_name hash=820c879a8083ff25f5680ed86a08a1ba
DEBUG - 2026-03-27 09:44:35 --> [REQ_ID=80a4d960a0a5] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-27 09:44:35 --> [REQ_ID=80a4d960a0a5] [MEMORY][controller-start] 6291456
INFO - 2026-03-27 09:44:36 --> [REGISTRATION] Form loaded
INFO - 2026-03-27 09:44:36 --> [REQ_ID=80a4d960a0a5] [PERF] Execution time=0.068867
DEBUG - 2026-03-27 09:45:48 --> [REQ_ID=56f9a1d1dd25] [REQUEST][START] GET /index.php/Management/Admin
DEBUG - 2026-03-27 09:45:48 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-27 09:45:48 --> [REQ_ID=56f9a1d1dd25] [REQUEST][END]
INFO - 2026-03-27 09:45:48 --> [REQ_ID=56f9a1d1dd25] [PERF] Execution time=0.018050
DEBUG - 2026-03-27 09:46:22 --> [REQ_ID=eaef969602ed] [REQUEST][START] HEAD /
DEBUG - 2026-03-27 09:46:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-27 09:46:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-27 09:46:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-27 09:46:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-27 09:46:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-27 09:50:54 --> [REQ_ID=930b64593c16] [REQUEST][START] GET /
DEBUG - 2026-03-27 09:50:54 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-27 09:50:54 --> [REQ_ID=930b64593c16] [FILTER_BEFORE] /
DEBUG - 2026-03-27 09:50:54 --> [REQ_ID=930b64593c16] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-27 09:50:54 --> [REQ_ID=930b64593c16] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-27 09:50:54 --> [CSRF] token name=csrf_test_name hash=fd46c4e58c23508b6b6f5a3241b924e0
DEBUG - 2026-03-27 09:50:54 --> [REQ_ID=8d2dc4a4b9cf] [INIT] App\Controllers\Home::GET
INFO - 2026-03-27 09:50:54 --> [REQ_ID=8d2dc4a4b9cf] [MEMORY][controller-start] 6291456
INFO - 2026-03-27 09:50:55 --> [REQ_ID=8d2dc4a4b9cf] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-27 09:50:55 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-27 09:50:55 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-03-27 09:50:55 --> [REQ_ID=8d2dc4a4b9cf] [VIEW_RENDER] themes/public/home
INFO - 2026-03-27 09:50:55 --> [REQ_ID=8d2dc4a4b9cf] [MEMORY][commonData:start] 10485760
INFO - 2026-03-27 09:50:55 --> themesMemory usage: 10485760
DEBUG - 2026-03-27 09:50:55 --> [MetaService] slug= pageName=Home cacheHit= path=DB
DEBUG - 2026-03-27 09:50:55 --> [REQ_ID=930b64593c16] [FILTER_AFTER]
DEBUG - 2026-03-27 09:50:55 --> [REQ_ID=930b64593c16] [LIFECYCLE][END] status=200 duration_ms=808.81 memory_delta=4194304
INFO - 2026-03-27 09:50:55 --> [REQ_ID=8d2dc4a4b9cf] [PERF] Execution time=0.806892
DEBUG - 2026-03-27 09:50:55 --> [REQ_ID=930b64593c16] [REQUEST][END]
INFO - 2026-03-27 09:50:55 --> [REQ_ID=930b64593c16] [PERF] Execution time=0.878387
DEBUG - 2026-03-27 09:51:22 --> [REQ_ID=6c618d6a6655] [REQUEST][START] HEAD /
DEBUG - 2026-03-27 09:51:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-27 09:51:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-27 09:51:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-27 09:51:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-27 09:51:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-27 09:56:22 --> [REQ_ID=820c5b1b6f87] [REQUEST][START] HEAD /
DEBUG - 2026-03-27 09:56:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-27 09:56:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-27 09:56:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-27 09:56:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-27 09:56:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-27 10:00:01 --> [REQ_ID=3fbf6f20f8df] [REQUEST][START] GET /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-27 10:00:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-27 10:00:01 --> [REQ_ID=3fbf6f20f8df] [FILTER_BEFORE] /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-27 10:00:01 --> [REQ_ID=3fbf6f20f8df] [ROUTE] Controller=\App\Modules\Management\Controllers\ManagementAPIController Method=Run_CRON_Tasks
DEBUG - 2026-03-27 10:00:01 --> [REQ_ID=3fbf6f20f8df] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-27 10:00:01 --> [REQ_ID=3fbf6f20f8df] [REQUEST][END]
INFO - 2026-03-27 10:00:01 --> [REQ_ID=3fbf6f20f8df] [PERF] Execution time=0.048836
DEBUG - 2026-03-27 10:01:22 --> [REQ_ID=6e73af0c6aa5] [REQUEST][START] HEAD /
DEBUG - 2026-03-27 10:01:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-27 10:01:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-27 10:01:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-27 10:01:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-27 10:01:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-27 10:06:22 --> [REQ_ID=311d69dd5127] [REQUEST][START] HEAD /
DEBUG - 2026-03-27 10:06:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-27 10:06:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-27 10:06:23 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-27 10:06:23 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-27 10:06:23 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-27 10:11:04 --> [REQ_ID=18141c97cc31] [REQUEST][START] GET /
DEBUG - 2026-03-27 10:11:04 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-27 10:11:04 --> [REQ_ID=18141c97cc31] [FILTER_BEFORE] /
DEBUG - 2026-03-27 10:11:04 --> [REQ_ID=18141c97cc31] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-27 10:11:04 --> [REQ_ID=18141c97cc31] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-27 10:11:04 --> [CSRF] token name=csrf_test_name hash=27290d575be25aca6efc021a1dab27a5
DEBUG - 2026-03-27 10:11:04 --> [REQ_ID=9dbe7a5e250b] [INIT] App\Controllers\Home::GET
INFO - 2026-03-27 10:11:04 --> [REQ_ID=9dbe7a5e250b] [MEMORY][controller-start] 6291456
INFO - 2026-03-27 10:11:05 --> [REQ_ID=9dbe7a5e250b] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-27 10:11:05 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-27 10:11:05 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-03-27 10:11:05 --> [REQ_ID=9dbe7a5e250b] [VIEW_RENDER] themes/public/home
INFO - 2026-03-27 10:11:05 --> [REQ_ID=9dbe7a5e250b] [MEMORY][commonData:start] 10485760
INFO - 2026-03-27 10:11:05 --> themesMemory usage: 10485760
DEBUG - 2026-03-27 10:11:05 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-27 10:11:05 --> [REQ_ID=18141c97cc31] [FILTER_AFTER]
DEBUG - 2026-03-27 10:11:05 --> [REQ_ID=18141c97cc31] [LIFECYCLE][END] status=200 duration_ms=706.62 memory_delta=4194304
INFO - 2026-03-27 10:11:05 --> [REQ_ID=9dbe7a5e250b] [PERF] Execution time=0.704807
DEBUG - 2026-03-27 10:11:05 --> [REQ_ID=18141c97cc31] [REQUEST][END]
INFO - 2026-03-27 10:11:05 --> [REQ_ID=18141c97cc31] [PERF] Execution time=0.744686
DEBUG - 2026-03-27 10:11:22 --> [REQ_ID=8be180aa9677] [REQUEST][START] HEAD /
DEBUG - 2026-03-27 10:11:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-27 10:11:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-27 10:11:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-27 10:11:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-27 10:11:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-27 10:15:01 --> [REQ_ID=69ff96d9202e] [REQUEST][START] GET /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-27 10:15:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-27 10:15:01 --> [REQ_ID=69ff96d9202e] [FILTER_BEFORE] /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-27 10:15:01 --> [REQ_ID=69ff96d9202e] [ROUTE] Controller=\App\Modules\APIs\Controllers\AlertsAPIController Method=fetchEmailAlerts
DEBUG - 2026-03-27 10:15:01 --> [REQ_ID=69ff96d9202e] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-27 10:15:01 --> [REQ_ID=69ff96d9202e] [REQUEST][END]
INFO - 2026-03-27 10:15:01 --> [REQ_ID=69ff96d9202e] [PERF] Execution time=0.047763
DEBUG - 2026-03-27 10:16:22 --> [REQ_ID=323f651a3dad] [REQUEST][START] HEAD /
DEBUG - 2026-03-27 10:16:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-27 10:16:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-27 10:16:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-27 10:16:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-27 10:16:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-27 10:17:54 --> [REQ_ID=9de523e22d5c] [REQUEST][START] GET /
DEBUG - 2026-03-27 10:17:54 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-27 10:17:54 --> [REQ_ID=9de523e22d5c] [FILTER_BEFORE] /
DEBUG - 2026-03-27 10:17:54 --> [REQ_ID=9de523e22d5c] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-27 10:17:54 --> [REQ_ID=9de523e22d5c] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-27 10:17:54 --> [CSRF] token name=csrf_test_name hash=ffae9c70cf2fada7e8d4ad4429358b11
DEBUG - 2026-03-27 10:17:54 --> [REQ_ID=7fcc34a59ba1] [INIT] App\Controllers\Home::GET
INFO - 2026-03-27 10:17:54 --> [REQ_ID=7fcc34a59ba1] [MEMORY][controller-start] 6291456
INFO - 2026-03-27 10:17:54 --> [REQ_ID=7fcc34a59ba1] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-27 10:17:54 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-27 10:17:54 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
DEBUG - 2026-03-27 10:17:54 --> [REQ_ID=7fcc34a59ba1] [VIEW_RENDER] themes/public/home
INFO - 2026-03-27 10:17:54 --> [REQ_ID=7fcc34a59ba1] [MEMORY][commonData:start] 10485760
INFO - 2026-03-27 10:17:54 --> themesMemory usage: 10485760
DEBUG - 2026-03-27 10:17:54 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-27 10:17:54 --> [REQ_ID=9de523e22d5c] [FILTER_AFTER]
DEBUG - 2026-03-27 10:17:54 --> [REQ_ID=9de523e22d5c] [LIFECYCLE][END] status=200 duration_ms=686.92 memory_delta=4194304
INFO - 2026-03-27 10:17:54 --> [REQ_ID=7fcc34a59ba1] [PERF] Execution time=0.684928
DEBUG - 2026-03-27 10:17:54 --> [REQ_ID=9de523e22d5c] [REQUEST][END]
INFO - 2026-03-27 10:17:54 --> [REQ_ID=9de523e22d5c] [PERF] Execution time=0.725830
DEBUG - 2026-03-27 10:21:22 --> [REQ_ID=d44c75ffe156] [REQUEST][START] HEAD /
DEBUG - 2026-03-27 10:21:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-27 10:21:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-27 10:21:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-27 10:21:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-27 10:21:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-27 10:26:22 --> [REQ_ID=f67f6b0df8ba] [REQUEST][START] HEAD /
DEBUG - 2026-03-27 10:26:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-27 10:26:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-27 10:26:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-27 10:26:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-27 10:26:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-27 10:31:22 --> [REQ_ID=2348bfbefeca] [REQUEST][START] HEAD /
DEBUG - 2026-03-27 10:31:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-27 10:31:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-27 10:31:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-27 10:31:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-27 10:31:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-27 10:36:08 --> [REQ_ID=916f2c7edb12] [REQUEST][START] GET /index.php/News/Pre-Market-Movers/December-6th-2021
DEBUG - 2026-03-27 10:36:08 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-27 10:36:08 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: GET, Route: News/Pre-Market-Movers/December-6th-2021]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-27 10:36:08 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-27 10:36:08 --> [404] URI=https://www.mymiwallet.com/index.php/News/Pre-Market-Movers/December-6th-2021
WARNING - 2026-03-27 10:36:08 --> 404 route miss: https://www.mymiwallet.com/index.php/News/Pre-Market-Movers/December-6th-2021 | referrer: none
ERROR - 2026-03-27 10:36:08 --> [ERROR_PAGE] event=error_404 status=404 message=Page not found.
DEBUG - 2026-03-27 10:36:22 --> [REQ_ID=f3f76223a2d1] [REQUEST][START] HEAD /
DEBUG - 2026-03-27 10:36:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-27 10:36:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-27 10:36:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-27 10:36:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-27 10:36:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-27 10:39:37 --> [REQ_ID=eb43c5ea6bf9] [REQUEST][START] GET /index.php/Free/register
DEBUG - 2026-03-27 10:39:37 --> [REQ_ID=aa9541730c87] [REQUEST][START] GET /index.php/How-It-Works/Investment-Dashboard
DEBUG - 2026-03-27 10:39:37 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-27 10:39:37 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-27 10:39:37 --> [REQ_ID=eb43c5ea6bf9] [FILTER_BEFORE] /index.php/Free/register
DEBUG - 2026-03-27 10:39:37 --> [REQ_ID=eb43c5ea6bf9] [ROUTE] Controller=\App\Controllers\AuthController Method=register
DEBUG - 2026-03-27 10:39:37 --> [REQ_ID=eb43c5ea6bf9] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Free/register
DEBUG - 2026-03-27 10:39:37 --> [REQ_ID=aa9541730c87] [FILTER_BEFORE] /index.php/How-It-Works/Investment-Dashboard
DEBUG - 2026-03-27 10:39:37 --> [REQ_ID=aa9541730c87] [ROUTE] Controller=\App\Modules\Blog\Controllers\HowItWorksController Method=show
DEBUG - 2026-03-27 10:39:37 --> [REQ_ID=aa9541730c87] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/How-It-Works/Investment-Dashboard
DEBUG - 2026-03-27 10:39:37 --> [CSRF] token name=csrf_test_name hash=b5e687b4ed0777a90139caf6ae2a68b5
DEBUG - 2026-03-27 10:39:37 --> [REQ_ID=8a1555b9183f] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-27 10:39:37 --> [REQ_ID=8a1555b9183f] [MEMORY][controller-start] 6291456
DEBUG - 2026-03-27 10:39:37 --> [CSRF] token name=csrf_test_name hash=44463911d1b4c3737f72171dc50d3fee
DEBUG - 2026-03-27 10:39:37 --> [REQ_ID=9ce36f5c0a29] [INIT] App\Modules\Blog\Controllers\HowItWorksController::GET
INFO - 2026-03-27 10:39:37 --> [REQ_ID=9ce36f5c0a29] [MEMORY][controller-start] 6291456
DEBUG - 2026-03-27 10:39:37 --> [REQ_ID=9ce36f5c0a29] [METHOD_ENTRY] show
INFO - 2026-03-27 10:39:37 --> [REGISTRATION] Form loaded
INFO - 2026-03-27 10:39:37 --> [REQ_ID=8a1555b9183f] [PERF] Execution time=0.074666
DEBUG - 2026-03-27 10:39:37 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-27 10:39:37 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-27 10:39:37 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-27 10:39:37 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-27 10:39:37 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-27 10:39:37 --> MyMICoin: guest context detected; skipping user-specific preload.
INFO - 2026-03-27 10:39:37 --> [REQ_ID=9ce36f5c0a29] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-27 10:39:38 --> [REQ_ID=aa9541730c87] [FILTER_AFTER]
DEBUG - 2026-03-27 10:39:38 --> [REQ_ID=aa9541730c87] [LIFECYCLE][END] status=200 duration_ms=660.48 memory_delta=4194304
INFO - 2026-03-27 10:39:38 --> [REQ_ID=9ce36f5c0a29] [PERF] Execution time=0.657972
DEBUG - 2026-03-27 10:39:38 --> [REQ_ID=aa9541730c87] [REQUEST][END]
INFO - 2026-03-27 10:39:38 --> [REQ_ID=aa9541730c87] [PERF] Execution time=0.722233
DEBUG - 2026-03-27 10:41:20 --> [REQ_ID=20bdcf9473f9] [REQUEST][START] GET /index.php/MyMI-Gold/Goals/Daily
DEBUG - 2026-03-27 10:41:20 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-27 10:41:20 --> [REQ_ID=20bdcf9473f9] [REQUEST][END]
INFO - 2026-03-27 10:41:20 --> [REQ_ID=20bdcf9473f9] [PERF] Execution time=0.041395
DEBUG - 2026-03-27 10:41:22 --> [REQ_ID=dc750379fe9b] [REQUEST][START] HEAD /
DEBUG - 2026-03-27 10:41:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-27 10:41:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-27 10:41:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-27 10:41:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-27 10:41:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-27 10:42:50 --> [REQ_ID=ef538ba8abc6] [REQUEST][START] GET /index.php/Exchange
DEBUG - 2026-03-27 10:42:50 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-27 10:42:50 --> [REQ_ID=ef538ba8abc6] [REQUEST][END]
INFO - 2026-03-27 10:42:50 --> [REQ_ID=ef538ba8abc6] [PERF] Execution time=0.042069
DEBUG - 2026-03-27 10:46:22 --> [REQ_ID=7c28c535386b] [REQUEST][START] HEAD /
DEBUG - 2026-03-27 10:46:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-27 10:46:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-27 10:46:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-27 10:46:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-27 10:46:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-27 10:50:38 --> [REQ_ID=501672f7fe03] [REQUEST][START] GET /index.php/Dashboard
DEBUG - 2026-03-27 10:50:38 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-27 10:50:38 --> [REQ_ID=501672f7fe03] [FILTER_BEFORE] /index.php/Dashboard
DEBUG - 2026-03-27 10:50:38 --> [REQ_ID=501672f7fe03] [ROUTE] Controller=\App\Modules\User\Controllers\DashboardController Method=index
DEBUG - 2026-03-27 10:50:38 --> [REQ_ID=501672f7fe03] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Dashboard
DEBUG - 2026-03-27 10:50:38 --> [CSRF] token name=csrf_test_name hash=ff0e53c623e947d9f7a1e0af4a93d4be
DEBUG - 2026-03-27 10:50:38 --> [REQ_ID=501672f7fe03] [REQUEST][END]
INFO - 2026-03-27 10:50:38 --> [REQ_ID=501672f7fe03] [PERF] Execution time=0.056263
DEBUG - 2026-03-27 10:51:22 --> [REQ_ID=6f3eadf78365] [REQUEST][START] HEAD /
DEBUG - 2026-03-27 10:51:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-27 10:51:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-27 10:51:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-27 10:51:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-27 10:51:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-27 10:55:18 --> [REQ_ID=88753f5d63f0] [REQUEST][START] GET /index.php/Accounts/createLinkToken
DEBUG - 2026-03-27 10:55:18 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-27 10:55:18 --> [REQ_ID=88753f5d63f0] [REQUEST][END]
INFO - 2026-03-27 10:55:18 --> [REQ_ID=88753f5d63f0] [PERF] Execution time=0.039381
DEBUG - 2026-03-27 10:56:22 --> [REQ_ID=d8e50e63eefe] [REQUEST][START] HEAD /
DEBUG - 2026-03-27 10:56:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-27 10:56:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-27 10:56:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-27 10:56:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-27 10:56:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-27 11:00:01 --> [REQ_ID=91528a5fc8ce] [REQUEST][START] GET /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-27 11:00:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-27 11:00:01 --> [REQ_ID=91528a5fc8ce] [FILTER_BEFORE] /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-27 11:00:01 --> [REQ_ID=91528a5fc8ce] [ROUTE] Controller=\App\Modules\Management\Controllers\ManagementAPIController Method=Run_CRON_Tasks
DEBUG - 2026-03-27 11:00:01 --> [REQ_ID=91528a5fc8ce] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-27 11:00:02 --> [REQ_ID=91528a5fc8ce] [REQUEST][END]
INFO - 2026-03-27 11:00:02 --> [REQ_ID=91528a5fc8ce] [PERF] Execution time=0.052279
DEBUG - 2026-03-27 11:01:22 --> [REQ_ID=c8f0917b58c9] [REQUEST][START] HEAD /
DEBUG - 2026-03-27 11:01:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-27 11:01:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-27 11:01:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-27 11:01:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-27 11:01:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-27 11:06:22 --> [REQ_ID=73abdc54224c] [REQUEST][START] HEAD /
DEBUG - 2026-03-27 11:06:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-27 11:06:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-27 11:06:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-27 11:06:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-27 11:06:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-27 11:11:22 --> [REQ_ID=6adc2e512688] [REQUEST][START] HEAD /
DEBUG - 2026-03-27 11:11:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-27 11:11:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-27 11:11:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-27 11:11:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-27 11:11:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-27 11:15:01 --> [REQ_ID=25b094504cf1] [REQUEST][START] GET /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-27 11:15:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-27 11:15:01 --> [REQ_ID=25b094504cf1] [FILTER_BEFORE] /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-27 11:15:01 --> [REQ_ID=25b094504cf1] [ROUTE] Controller=\App\Modules\APIs\Controllers\AlertsAPIController Method=fetchEmailAlerts
DEBUG - 2026-03-27 11:15:01 --> [REQ_ID=25b094504cf1] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-27 11:15:01 --> [REQ_ID=25b094504cf1] [REQUEST][END]
INFO - 2026-03-27 11:15:01 --> [REQ_ID=25b094504cf1] [PERF] Execution time=0.046281
DEBUG - 2026-03-27 11:16:22 --> [REQ_ID=de8db82190f7] [REQUEST][START] HEAD /
DEBUG - 2026-03-27 11:16:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-27 11:16:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-27 11:16:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-27 11:16:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-27 11:16:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-27 11:21:22 --> [REQ_ID=75fc61abe469] [REQUEST][START] HEAD /
DEBUG - 2026-03-27 11:21:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-27 11:21:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-27 11:21:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-27 11:21:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-27 11:21:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-27 11:26:22 --> [REQ_ID=3328601d208c] [REQUEST][START] HEAD /
DEBUG - 2026-03-27 11:26:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-27 11:26:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-27 11:26:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-27 11:26:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-27 11:26:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-27 11:31:22 --> [REQ_ID=ad231883d9c6] [REQUEST][START] HEAD /
DEBUG - 2026-03-27 11:31:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-27 11:31:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-27 11:31:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-27 11:31:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-27 11:31:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-27 11:36:22 --> [REQ_ID=c1112c49993f] [REQUEST][START] HEAD /
DEBUG - 2026-03-27 11:36:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-27 11:36:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-27 11:36:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-27 11:36:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-27 11:36:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-27 11:37:54 --> [REQ_ID=ca43ba336456] [REQUEST][START] GET /
DEBUG - 2026-03-27 11:37:54 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-27 11:37:54 --> [REQ_ID=ca43ba336456] [REQUEST][END]
INFO - 2026-03-27 11:37:54 --> [REQ_ID=ca43ba336456] [PERF] Execution time=0.039715
DEBUG - 2026-03-27 11:41:22 --> [REQ_ID=f00f6c16b54e] [REQUEST][START] HEAD /
DEBUG - 2026-03-27 11:41:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-27 11:41:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-27 11:41:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-27 11:41:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-27 11:41:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-27 11:44:13 --> [REQ_ID=656ecada539a] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-27 11:44:13 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-27 11:44:13 --> [REQ_ID=656ecada539a] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-27 11:44:13 --> [REQ_ID=656ecada539a] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-27 11:44:13 --> [REQ_ID=656ecada539a] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-27 11:44:13 --> [CSRF] token name=csrf_test_name hash=93b6402c6fe89089a9d6198177f1cf5a
DEBUG - 2026-03-27 11:44:13 --> [REQ_ID=4dabc3d74c6f] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-27 11:44:13 --> [REQ_ID=4dabc3d74c6f] [MEMORY][controller-start] 6291456
DEBUG - 2026-03-27 11:44:13 --> [REQ_ID=656ecada539a] [FILTER_AFTER]
DEBUG - 2026-03-27 11:44:13 --> [REQ_ID=656ecada539a] [LIFECYCLE][END] status=200 duration_ms=85.54 memory_delta=0
INFO - 2026-03-27 11:44:13 --> [REQ_ID=4dabc3d74c6f] [PERF] Execution time=0.082787
DEBUG - 2026-03-27 11:44:13 --> [REQ_ID=656ecada539a] [REQUEST][END]
INFO - 2026-03-27 11:44:13 --> [REQ_ID=656ecada539a] [PERF] Execution time=0.134173
DEBUG - 2026-03-27 11:44:16 --> [REQ_ID=66731b6a9bd1] [REQUEST][START] POST /index.php/login
DEBUG - 2026-03-27 11:44:16 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-27 11:44:16 --> [REQ_ID=66731b6a9bd1] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-27 11:44:16 --> [REQ_ID=66731b6a9bd1] [ROUTE] Controller=\App\Controllers\AuthController Method=attemptLogin
DEBUG - 2026-03-27 11:44:16 --> [REQ_ID=66731b6a9bd1] [LIFECYCLE][START] POST https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-27 11:44:16 --> [CSRF] token name=csrf_test_name hash=93b6402c6fe89089a9d6198177f1cf5a
DEBUG - 2026-03-27 11:44:16 --> [REQ_ID=66731b6a9bd1] [REQUEST][END]
INFO - 2026-03-27 11:44:16 --> [REQ_ID=66731b6a9bd1] [PERF] Execution time=0.010849
DEBUG - 2026-03-27 11:44:16 --> [REQ_ID=c441ecdcb982] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-27 11:44:16 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-27 11:44:16 --> [REQ_ID=c441ecdcb982] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-27 11:44:16 --> [REQ_ID=c441ecdcb982] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-27 11:44:16 --> [REQ_ID=c441ecdcb982] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-27 11:44:16 --> [CSRF] token name=csrf_test_name hash=93b6402c6fe89089a9d6198177f1cf5a
DEBUG - 2026-03-27 11:44:16 --> [REQ_ID=df9b234d74eb] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-27 11:44:16 --> [REQ_ID=df9b234d74eb] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-27 11:44:16 --> [REQ_ID=c441ecdcb982] [FILTER_AFTER]
DEBUG - 2026-03-27 11:44:16 --> [REQ_ID=c441ecdcb982] [LIFECYCLE][END] status=200 duration_ms=18.36 memory_delta=0
INFO - 2026-03-27 11:44:16 --> [REQ_ID=df9b234d74eb] [PERF] Execution time=0.018288
DEBUG - 2026-03-27 11:44:16 --> [REQ_ID=c441ecdcb982] [REQUEST][END]
INFO - 2026-03-27 11:44:16 --> [REQ_ID=c441ecdcb982] [PERF] Execution time=0.026878
DEBUG - 2026-03-27 11:44:31 --> [REQ_ID=07d6c8ce0bc2] [REQUEST][START] POST /index.php/login
DEBUG - 2026-03-27 11:44:31 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-27 11:44:31 --> [REQ_ID=07d6c8ce0bc2] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-27 11:44:31 --> [REQ_ID=07d6c8ce0bc2] [ROUTE] Controller=\App\Controllers\AuthController Method=attemptLogin
DEBUG - 2026-03-27 11:44:31 --> [REQ_ID=07d6c8ce0bc2] [LIFECYCLE][START] POST https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-27 11:44:31 --> [CSRF] token name=csrf_test_name hash=93b6402c6fe89089a9d6198177f1cf5a
INFO - 2026-03-27 11:44:31 --> CSRF token verified.
DEBUG - 2026-03-27 11:44:31 --> [REQ_ID=3dee7467bf2e] [INIT] App\Controllers\AuthController::POST
INFO - 2026-03-27 11:44:31 --> [REQ_ID=3dee7467bf2e] [MEMORY][controller-start] 4194304
INFO - 2026-03-27 11:44:31 --> AuthController L93: Auth:attemptLogin started.
INFO - 2026-03-27 11:44:31 --> AuthController L104: Auth:attemptLogin rules: {"login":"required","password":"required"}
INFO - 2026-03-27 11:44:31 --> AuthController L132: Auth:attemptLogin Login Variables: login: required, remember: true, ip: 76.234.126.68, ua: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/146.0.0.0 Safari/537.36
DEBUG - 2026-03-27 11:44:31 --> Auth attemptLogin() called with login identifier: tburks2392, remember: true
DEBUG - 2026-03-27 11:44:31 --> Auth attemptLogin() called. redirect_url in session: none
DEBUG - 2026-03-27 11:44:31 --> Auth credentials normalised for attempt using key "username"
DEBUG - 2026-03-27 11:44:31 --> Auth attempt succeeded for identifier tburks2392. logged_in(): yes, user_id(): 2
DEBUG - 2026-03-27 11:44:31 --> Auth attempt succeeded. logged_in(): yes, user_id(): 2
DEBUG - 2026-03-27 11:44:31 --> Auth attemptLogin() - session user_id set to: 2
INFO - 2026-03-27 11:44:31 --> [AUTH] Login success
DEBUG - 2026-03-27 11:44:31 --> Auth redirect destination: https://www.mymiwallet.com/index.php/Dashboard
DEBUG - 2026-03-27 11:44:31 --> [REQ_ID=07d6c8ce0bc2] [FILTER_AFTER]
DEBUG - 2026-03-27 11:44:31 --> [REQ_ID=07d6c8ce0bc2] [LIFECYCLE][END] status=303 duration_ms=250.65 memory_delta=0
INFO - 2026-03-27 11:44:31 --> [REQ_ID=3dee7467bf2e] [PERF] Execution time=0.250514
DEBUG - 2026-03-27 11:44:31 --> [REQ_ID=07d6c8ce0bc2] [REQUEST][END]
INFO - 2026-03-27 11:44:31 --> [REQ_ID=07d6c8ce0bc2] [PERF] Execution time=0.260132
DEBUG - 2026-03-27 11:44:32 --> [REQ_ID=ec67cee3b3f1] [REQUEST][START] GET /index.php/Dashboard
DEBUG - 2026-03-27 11:44:32 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-27 11:44:32 --> [REQ_ID=ec67cee3b3f1] [FILTER_BEFORE] /index.php/Dashboard
DEBUG - 2026-03-27 11:44:32 --> [REQ_ID=ec67cee3b3f1] [ROUTE] Controller=\App\Modules\User\Controllers\DashboardController Method=index
DEBUG - 2026-03-27 11:44:32 --> [REQ_ID=ec67cee3b3f1] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Dashboard
DEBUG - 2026-03-27 11:44:32 --> [CSRF] token name=csrf_test_name hash=93b6402c6fe89089a9d6198177f1cf5a
DEBUG - 2026-03-27 11:44:32 --> [REQ_ID=0dd6ecc2c54c] [INIT] App\Modules\User\Controllers\DashboardController::GET
INFO - 2026-03-27 11:44:32 --> [REQ_ID=0dd6ecc2c54c] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-27 11:44:32 --> [REQ_ID=0dd6ecc2c54c] [METHOD_ENTRY] index
DEBUG - 2026-03-27 11:44:32 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-27 11:44:32 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-27 11:44:32 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-27 11:44:32 --> MyMIMarketing: Pscrape library not installed; Google search scraping will use fallback.
DEBUG - 2026-03-27 11:44:32 --> [DASHBOARD] Enter
DEBUG - 2026-03-27 11:44:32 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-27 11:44:32 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-27 11:44:32 --> [SERVICE] App\Services\BudgetService ::getUserBudget
DEBUG - 2026-03-27 11:44:32 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":2,"deleted":0}
DEBUG - 2026-03-27 11:44:32 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-27 11:44:32 --> [MODEL_WHERE] App\Models\BudgetModel KEY="created_by"
DEBUG - 2026-03-27 11:44:32 --> [MODEL_WHERE] App\Models\BudgetModel KEY="account_type"
DEBUG - 2026-03-27 11:44:32 --> [MODEL_WHERE] App\Models\BudgetModel KEY="designated_date >="
DEBUG - 2026-03-27 11:44:32 --> [MODEL_WHERE] App\Models\BudgetModel KEY="designated_date <="
DEBUG - 2026-03-27 11:44:32 --> [MODEL_WHERE] App\Models\BudgetModel KEY="year"
DEBUG - 2026-03-27 11:44:32 --> [MODEL_WHERE] App\Models\BudgetModel KEY="month <="
DEBUG - 2026-03-27 11:44:32 --> [MODEL_WHERE] App\Models\BudgetModel KEY="day <="
DEBUG - 2026-03-27 11:44:32 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":2,"account_type":"Income","month":"03","year":"2026"}
DEBUG - 2026-03-27 11:44:32 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-03-27 11:44:32 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":2,"account_type":"Income","month":"02","year":"2026"}
DEBUG - 2026-03-27 11:44:32 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-03-27 11:44:32 --> [MODEL_WHERE] App\Models\BudgetModel KEY="created_by"
DEBUG - 2026-03-27 11:44:32 --> [MODEL_WHERE] App\Models\BudgetModel KEY="account_type"
DEBUG - 2026-03-27 11:44:32 --> [MODEL_WHERE] App\Models\BudgetModel KEY="designated_date >="
DEBUG - 2026-03-27 11:44:32 --> [MODEL_WHERE] App\Models\BudgetModel KEY="designated_date <="
DEBUG - 2026-03-27 11:44:32 --> [MODEL_WHERE] App\Models\BudgetModel KEY="year"
DEBUG - 2026-03-27 11:44:32 --> [MODEL_WHERE] App\Models\BudgetModel KEY="month <="
DEBUG - 2026-03-27 11:44:32 --> [MODEL_WHERE] App\Models\BudgetModel KEY="day <="
DEBUG - 2026-03-27 11:44:32 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":2,"account_type":"Expense","month":"03","year":"2026"}
DEBUG - 2026-03-27 11:44:32 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-03-27 11:44:32 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":2,"account_type":"Expense","month":"02","year":"2026"}
DEBUG - 2026-03-27 11:44:32 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-03-27 11:44:32 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"status":1,"created_by":2,"deleted":0}
DEBUG - 2026-03-27 11:44:32 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"status":1,"paid":0,"created_by":2,"deleted":0}
DEBUG - 2026-03-27 11:44:32 --> Skipping placeholder symbol for row 46402
DEBUG - 2026-03-27 11:44:32 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"status":1,"created_by":2,"deleted":0}
ERROR - 2026-03-27 11:44:32 --> DashboardController::index failed to load executive summary: Call to undefined method CodeIgniter\Cache\Handlers\FileHandler::set()
DEBUG - 2026-03-27 11:44:32 --> [CACHE_MISS] mymiwallet_development_squeeze_high-risk_global_global_1f86633dd
ERROR - 2026-03-27 11:44:32 --> Unknown column 'score_total' in 'where clause'
in SYSTEMPATH/Database/MySQLi/Connection.php on line 300.
 1 SYSTEMPATH/Database/MySQLi/Connection.php(300): mysqli->query('SELECT COUNT(*) AS `numrows`
FROM `bf_squeeze_scorecards`
WHERE `score_total` >= 80
AND `as_of_datetime` >= \'2026-03-26 11:44:32\'', 0)
 2 SYSTEMPATH/Database/BaseConnection.php(769): CodeIgniter\Database\MySQLi\Connection->execute('SELECT COUNT(*) AS `numrows`
FROM `bf_squeeze_scorecards`
WHERE `score_total` >= 80
AND `as_of_datetime` >= \'2026-03-26 11:44:32\'')
 3 SYSTEMPATH/Database/BaseConnection.php(686): CodeIgniter\Database\BaseConnection->simpleQuery('SELECT COUNT(*) AS `numrows`
FROM `bf_squeeze_scorecards`
WHERE `score_total` >= 80
AND `as_of_datetime` >= \'2026-03-26 11:44:32\'')
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
DEBUG - 2026-03-27 11:44:32 --> MyMIInvestments::getSqueezeHighRiskCount failed: Unknown column 'score_total' in 'where clause'
DEBUG - 2026-03-27 11:44:32 --> 📰 Daily dashboard news window 2026-03-27 00:00:00 -> 2026-03-27 23:59:59 returned 0 rows
DEBUG - 2026-03-27 11:44:32 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-27 11:44:33 --> [SETUP] Status computed
DEBUG - 2026-03-27 11:44:33 --> [REQ_ID=0dd6ecc2c54c] [VIEW_RENDER] User/Dashboard/index
INFO - 2026-03-27 11:44:33 --> [REQ_ID=0dd6ecc2c54c] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-27 11:44:33 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-27 11:44:33 --> [MODEL_WHERE] App\Models\BudgetModel KEY="created_by"
DEBUG - 2026-03-27 11:44:33 --> [MODEL_WHERE] App\Models\BudgetModel KEY="account_type"
DEBUG - 2026-03-27 11:44:33 --> [MODEL_WHERE] App\Models\BudgetModel KEY="designated_date >="
DEBUG - 2026-03-27 11:44:33 --> [MODEL_WHERE] App\Models\BudgetModel KEY="designated_date <="
DEBUG - 2026-03-27 11:44:33 --> [MODEL_WHERE] App\Models\BudgetModel KEY="year"
DEBUG - 2026-03-27 11:44:33 --> [MODEL_WHERE] App\Models\BudgetModel KEY="month <="
DEBUG - 2026-03-27 11:44:33 --> [MODEL_WHERE] App\Models\BudgetModel KEY="day <="
DEBUG - 2026-03-27 11:44:33 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":2,"account_type":"Income","month":"03","year":"2026"}
DEBUG - 2026-03-27 11:44:33 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-03-27 11:44:33 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":2,"account_type":"Income","month":"02","year":"2026"}
DEBUG - 2026-03-27 11:44:33 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-03-27 11:44:33 --> [MODEL_WHERE] App\Models\BudgetModel KEY="created_by"
DEBUG - 2026-03-27 11:44:33 --> [MODEL_WHERE] App\Models\BudgetModel KEY="account_type"
DEBUG - 2026-03-27 11:44:33 --> [MODEL_WHERE] App\Models\BudgetModel KEY="designated_date >="
DEBUG - 2026-03-27 11:44:33 --> [MODEL_WHERE] App\Models\BudgetModel KEY="designated_date <="
DEBUG - 2026-03-27 11:44:33 --> [MODEL_WHERE] App\Models\BudgetModel KEY="year"
DEBUG - 2026-03-27 11:44:33 --> [MODEL_WHERE] App\Models\BudgetModel KEY="month <="
DEBUG - 2026-03-27 11:44:33 --> [MODEL_WHERE] App\Models\BudgetModel KEY="day <="
DEBUG - 2026-03-27 11:44:33 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":2,"account_type":"Expense","month":"03","year":"2026"}
DEBUG - 2026-03-27 11:44:33 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-03-27 11:44:33 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":2,"account_type":"Expense","month":"02","year":"2026"}
DEBUG - 2026-03-27 11:44:33 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-03-27 11:44:33 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"status":1,"created_by":2,"deleted":0}
DEBUG - 2026-03-27 11:44:33 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"status":1,"paid":0,"created_by":2,"deleted":0}
DEBUG - 2026-03-27 11:44:33 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-27 11:44:33 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"status":1,"created_by":2,"deleted":0}
DEBUG - 2026-03-27 11:44:33 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"status":1,"paid":0,"created_by":2,"deleted":0}
DEBUG - 2026-03-27 11:44:33 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":2,"account_type":"Income","status":1,"month":"03","year":"2026"}
DEBUG - 2026-03-27 11:44:33 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-03-27 11:44:33 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":2,"account_type":"Expense","status":1,"month":"03","year":"2026"}
DEBUG - 2026-03-27 11:44:33 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-03-27 11:44:33 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":2,"account_type":"Investment","month":"03","year":"2026","status":1}
DEBUG - 2026-03-27 11:44:33 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-03-27 11:44:33 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":2,"account_type":"Income","status":1,"month":"02"}
DEBUG - 2026-03-27 11:44:33 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-03-27 11:44:33 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":2,"account_type":"Expense","status":1,"month":"02"}
DEBUG - 2026-03-27 11:44:33 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-03-27 11:44:33 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":2,"account_type":"Investment","month":"02","year":"2026","status":1}
DEBUG - 2026-03-27 11:44:33 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-03-27 11:44:33 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":2,"account_type":"Income","status":1,"month":"04"}
DEBUG - 2026-03-27 11:44:33 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-03-27 11:44:33 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":2,"account_type":"Expense","status":1,"month":"04"}
DEBUG - 2026-03-27 11:44:33 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-03-27 11:44:33 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":2,"account_type":"Investment","month":"04","year":"2026","status":1}
DEBUG - 2026-03-27 11:44:33 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-03-27 11:44:33 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":2,"account_type":"Income","status":1,"year":"2026"}
DEBUG - 2026-03-27 11:44:33 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-03-27 11:44:33 --> [MODEL_WHERE] App\Models\BudgetModel KEY="created_by"
DEBUG - 2026-03-27 11:44:33 --> [MODEL_WHERE] App\Models\BudgetModel KEY="account_type"
DEBUG - 2026-03-27 11:44:33 --> [MODEL_WHERE] App\Models\BudgetModel KEY="status"
DEBUG - 2026-03-27 11:44:33 --> [MODEL_WHERE] App\Models\BudgetModel KEY="year"
DEBUG - 2026-03-27 11:44:33 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-03-27 11:44:33 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":2,"account_type":"Investment","status":1}
DEBUG - 2026-03-27 11:44:33 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-03-27 11:44:33 --> [MODEL_WHERE] App\Models\BudgetModel KEY="created_by"
DEBUG - 2026-03-27 11:44:33 --> [MODEL_WHERE] App\Models\BudgetModel KEY="account_type"
DEBUG - 2026-03-27 11:44:33 --> [MODEL_WHERE] App\Models\BudgetModel KEY="status"
DEBUG - 2026-03-27 11:44:33 --> [MODEL_WHERE] App\Models\BudgetModel KEY="designated_date >="
DEBUG - 2026-03-27 11:44:33 --> [MODEL_WHERE] App\Models\BudgetModel KEY="designated_date <="
DEBUG - 2026-03-27 11:44:33 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-03-27 11:44:33 --> [MODEL_WHERE] App\Models\BudgetModel KEY="created_by"
DEBUG - 2026-03-27 11:44:33 --> [MODEL_WHERE] App\Models\BudgetModel KEY="account_type"
DEBUG - 2026-03-27 11:44:33 --> [MODEL_WHERE] App\Models\BudgetModel KEY="status"
DEBUG - 2026-03-27 11:44:33 --> [MODEL_WHERE] App\Models\BudgetModel KEY="designated_date >="
DEBUG - 2026-03-27 11:44:33 --> [MODEL_WHERE] App\Models\BudgetModel KEY="designated_date <="
DEBUG - 2026-03-27 11:44:33 --> [MODEL_FIRST] App\Models\BudgetModel
INFO - 2026-03-27 11:44:33 --> DashboardController L72 - $checkingSummary: 8784.01
DEBUG - 2026-03-27 11:44:33 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-27 11:44:33 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-27 11:44:33 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-27 11:44:33 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-27 11:44:33 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-27 11:44:33 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-27 11:44:33 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-27 11:44:33 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-27 11:44:33 --> [SERVICE] App\Services\BudgetService ::getUserBudget
DEBUG - 2026-03-27 11:44:33 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":2,"deleted":0}
DEBUG - 2026-03-27 11:44:33 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-27 11:44:33 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"status":1,"created_by":2,"deleted":0}
DEBUG - 2026-03-27 11:44:33 --> [MODEL_WHERE] App\Models\BudgetModel KEY="created_by"
DEBUG - 2026-03-27 11:44:33 --> [MODEL_WHERE] App\Models\BudgetModel KEY="account_type"
DEBUG - 2026-03-27 11:44:33 --> [MODEL_WHERE] App\Models\BudgetModel KEY="designated_date >="
DEBUG - 2026-03-27 11:44:33 --> [MODEL_WHERE] App\Models\BudgetModel KEY="designated_date <="
DEBUG - 2026-03-27 11:44:33 --> [MODEL_WHERE] App\Models\BudgetModel KEY="year"
DEBUG - 2026-03-27 11:44:33 --> [MODEL_WHERE] App\Models\BudgetModel KEY="month <="
DEBUG - 2026-03-27 11:44:33 --> [MODEL_WHERE] App\Models\BudgetModel KEY="day <="
DEBUG - 2026-03-27 11:44:33 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":2,"account_type":"Income","month":"03","year":"2026"}
DEBUG - 2026-03-27 11:44:33 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-03-27 11:44:33 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":2,"account_type":"Income","month":"02","year":"2026"}
DEBUG - 2026-03-27 11:44:33 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-03-27 11:44:33 --> [MODEL_WHERE] App\Models\BudgetModel KEY="created_by"
DEBUG - 2026-03-27 11:44:33 --> [MODEL_WHERE] App\Models\BudgetModel KEY="account_type"
DEBUG - 2026-03-27 11:44:33 --> [MODEL_WHERE] App\Models\BudgetModel KEY="designated_date >="
DEBUG - 2026-03-27 11:44:33 --> [MODEL_WHERE] App\Models\BudgetModel KEY="designated_date <="
DEBUG - 2026-03-27 11:44:33 --> [MODEL_WHERE] App\Models\BudgetModel KEY="year"
DEBUG - 2026-03-27 11:44:33 --> [MODEL_WHERE] App\Models\BudgetModel KEY="month <="
DEBUG - 2026-03-27 11:44:33 --> [MODEL_WHERE] App\Models\BudgetModel KEY="day <="
DEBUG - 2026-03-27 11:44:33 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":2,"account_type":"Expense","month":"03","year":"2026"}
DEBUG - 2026-03-27 11:44:33 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-03-27 11:44:33 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":2,"account_type":"Expense","month":"02","year":"2026"}
DEBUG - 2026-03-27 11:44:33 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-03-27 11:44:33 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"status":1,"created_by":2,"deleted":0}
DEBUG - 2026-03-27 11:44:33 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"status":1,"paid":0,"created_by":2,"deleted":0}
INFO - 2026-03-27 11:44:33 --> getSolanaData: invalid address param
DEBUG - 2026-03-27 11:44:33 --> [REQ_ID=a89cf9abe400] [REQUEST][START] GET /index.php/API/Investments/getConfidenceHeatmap?timeframe=all&window=6h
DEBUG - 2026-03-27 11:44:33 --> [REQ_ID=7ee522eca450] [REQUEST][START] GET /index.php/API/Investments/getForecastHighlights
DEBUG - 2026-03-27 11:44:33 --> [REQ_ID=801d084168eb] [REQUEST][START] GET /index.php/ops/health
DEBUG - 2026-03-27 11:44:33 --> [REQ_ID=0a69863c8ee4] [REQUEST][START] GET /index.php/API/Investments/getConfidenceHeatmap?timeframe=5m&window=60
DEBUG - 2026-03-27 11:44:33 --> [REQ_ID=74dc0bec9e33] [REQUEST][START] GET /index.php/API/Investments/getForecastAccuracySummary?window=7d
INFO - 2026-03-27 11:44:33 --> themesMemory usage: 8388608
DEBUG - 2026-03-27 11:44:33 --> [REQ_ID=ec67cee3b3f1] [FILTER_AFTER]
DEBUG - 2026-03-27 11:44:33 --> [REQ_ID=ec67cee3b3f1] [LIFECYCLE][END] status=200 duration_ms=1,745.74 memory_delta=4194304
INFO - 2026-03-27 11:44:33 --> [REQ_ID=0dd6ecc2c54c] [PERF] Execution time=1.741408
DEBUG - 2026-03-27 11:44:33 --> [REQ_ID=ec67cee3b3f1] [REQUEST][END]
INFO - 2026-03-27 11:44:33 --> [REQ_ID=ec67cee3b3f1] [PERF] Execution time=1.760904
DEBUG - 2026-03-27 11:44:33 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-27 11:44:33 --> [REQ_ID=7ee522eca450] [FILTER_BEFORE] /index.php/API/Investments/getForecastHighlights
DEBUG - 2026-03-27 11:44:33 --> [REQ_ID=7ee522eca450] [ROUTE] Controller=\App\Modules\APIs\Controllers\InvestmentsAPIController Method=getForecastHighlights
DEBUG - 2026-03-27 11:44:33 --> [REQ_ID=7ee522eca450] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Investments/getForecastHighlights
DEBUG - 2026-03-27 11:44:33 --> [REQ_ID=023ef854dec8] [INIT] App\Modules\APIs\Controllers\InvestmentsAPIController::GET
INFO - 2026-03-27 11:44:33 --> [REQ_ID=023ef854dec8] [MEMORY][controller-start] 6291456
DEBUG - 2026-03-27 11:44:33 --> MyMIMarketing: Pscrape library not installed; Google search scraping will use fallback.
DEBUG - 2026-03-27 11:44:33 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-27 11:44:34 --> [REQ_ID=7ee522eca450] [FILTER_AFTER]
DEBUG - 2026-03-27 11:44:34 --> [REQ_ID=7ee522eca450] [LIFECYCLE][END] status=200 duration_ms=480.31 memory_delta=2097152
INFO - 2026-03-27 11:44:34 --> [REQ_ID=023ef854dec8] [PERF] Execution time=0.479675
DEBUG - 2026-03-27 11:44:34 --> [REQ_ID=7ee522eca450] [REQUEST][END]
INFO - 2026-03-27 11:44:34 --> [REQ_ID=7ee522eca450] [PERF] Execution time=0.682136
DEBUG - 2026-03-27 11:44:34 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-27 11:44:34 --> [REQ_ID=a89cf9abe400] [FILTER_BEFORE] /index.php/API/Investments/getConfidenceHeatmap?timeframe=all&window=6h
DEBUG - 2026-03-27 11:44:34 --> [REQ_ID=a89cf9abe400] [ROUTE] Controller=\App\Modules\APIs\Controllers\InvestmentsAPIController Method=getConfidenceHeatmap
DEBUG - 2026-03-27 11:44:34 --> [REQ_ID=a89cf9abe400] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Investments/getConfidenceHeatmap?timeframe=all&window=6h
DEBUG - 2026-03-27 11:44:34 --> [REQ_ID=a57f2176862c] [INIT] App\Modules\APIs\Controllers\InvestmentsAPIController::GET
INFO - 2026-03-27 11:44:34 --> [REQ_ID=a57f2176862c] [MEMORY][controller-start] 6291456
DEBUG - 2026-03-27 11:44:34 --> [REQ_ID=563655c2a799] [REQUEST][START] GET /index.php/API/Investments/getForecastHighlights
DEBUG - 2026-03-27 11:44:34 --> MyMIMarketing: Pscrape library not installed; Google search scraping will use fallback.
DEBUG - 2026-03-27 11:44:34 --> MyMIUser L52 - initialized (first log).
INFO - 2026-03-27 11:44:34 --> Premium entitlement resolved: user_id=2 route=/index.php/API/Investments/getConfidenceHeatmap feature=investments.analytics tier=free status=free allowed=no reason=Feature requires tier1 or higher. Current tier: free (free).
WARNING - 2026-03-27 11:44:34 --> Premium access denied: feature=investments.analytics route=/index.php/API/Investments/getConfidenceHeatmap user_id=2 tier=free status=free
DEBUG - 2026-03-27 11:44:34 --> [REQ_ID=a89cf9abe400] [FILTER_AFTER]
DEBUG - 2026-03-27 11:44:34 --> [REQ_ID=a89cf9abe400] [LIFECYCLE][END] status=302 duration_ms=131.46 memory_delta=2097152
INFO - 2026-03-27 11:44:34 --> [REQ_ID=a57f2176862c] [PERF] Execution time=0.130418
DEBUG - 2026-03-27 11:44:34 --> [REQ_ID=a89cf9abe400] [REQUEST][END]
INFO - 2026-03-27 11:44:34 --> [REQ_ID=a89cf9abe400] [PERF] Execution time=0.849858
DEBUG - 2026-03-27 11:44:34 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-27 11:44:34 --> [REQ_ID=801d084168eb] [FILTER_BEFORE] /index.php/ops/health
DEBUG - 2026-03-27 11:44:34 --> [REQ_ID=801d084168eb] [ROUTE] Controller=\App\Controllers\OpsHealthController Method=index
DEBUG - 2026-03-27 11:44:34 --> [REQ_ID=801d084168eb] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/ops/health
DEBUG - 2026-03-27 11:44:34 --> [CSRF] token name=csrf_test_name hash=93b6402c6fe89089a9d6198177f1cf5a
DEBUG - 2026-03-27 11:44:34 --> [REQ_ID=9b298f90fe27] [INIT] App\Controllers\OpsHealthController::GET
INFO - 2026-03-27 11:44:34 --> [REQ_ID=9b298f90fe27] [MEMORY][controller-start] 6291456
DEBUG - 2026-03-27 11:44:34 --> [REQ_ID=7dda812b8e70] [REQUEST][START] GET /index.php/Memberships
DEBUG - 2026-03-27 11:44:34 --> [REQ_ID=9b298f90fe27] [METHOD_ENTRY] index
DEBUG - 2026-03-27 11:44:34 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-27 11:44:34 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-27 11:44:34 --> [REQ_ID=801d084168eb] [FILTER_AFTER]
DEBUG - 2026-03-27 11:44:34 --> [REQ_ID=801d084168eb] [LIFECYCLE][END] status=404 duration_ms=88.13 memory_delta=0
INFO - 2026-03-27 11:44:34 --> [REQ_ID=9b298f90fe27] [PERF] Execution time=0.059994
DEBUG - 2026-03-27 11:44:34 --> [REQ_ID=801d084168eb] [REQUEST][END]
INFO - 2026-03-27 11:44:34 --> [REQ_ID=801d084168eb] [PERF] Execution time=0.921484
DEBUG - 2026-03-27 11:44:34 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-27 11:44:34 --> [REQ_ID=0a69863c8ee4] [FILTER_BEFORE] /index.php/API/Investments/getConfidenceHeatmap?timeframe=5m&window=60
DEBUG - 2026-03-27 11:44:34 --> [REQ_ID=0a69863c8ee4] [ROUTE] Controller=\App\Modules\APIs\Controllers\InvestmentsAPIController Method=getConfidenceHeatmap
DEBUG - 2026-03-27 11:44:34 --> [REQ_ID=0a69863c8ee4] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Investments/getConfidenceHeatmap?timeframe=5m&window=60
DEBUG - 2026-03-27 11:44:34 --> [REQ_ID=9cb4298be22e] [INIT] App\Modules\APIs\Controllers\InvestmentsAPIController::GET
INFO - 2026-03-27 11:44:34 --> [REQ_ID=9cb4298be22e] [MEMORY][controller-start] 6291456
DEBUG - 2026-03-27 11:44:34 --> MyMIMarketing: Pscrape library not installed; Google search scraping will use fallback.
DEBUG - 2026-03-27 11:44:34 --> MyMIUser L52 - initialized (first log).
INFO - 2026-03-27 11:44:34 --> Premium entitlement resolved: user_id=2 route=/index.php/API/Investments/getConfidenceHeatmap feature=investments.analytics tier=free status=free allowed=no reason=Feature requires tier1 or higher. Current tier: free (free).
WARNING - 2026-03-27 11:44:34 --> Premium access denied: feature=investments.analytics route=/index.php/API/Investments/getConfidenceHeatmap user_id=2 tier=free status=free
DEBUG - 2026-03-27 11:44:34 --> [REQ_ID=0a69863c8ee4] [FILTER_AFTER]
DEBUG - 2026-03-27 11:44:34 --> [REQ_ID=0a69863c8ee4] [LIFECYCLE][END] status=302 duration_ms=134.45 memory_delta=2097152
INFO - 2026-03-27 11:44:34 --> [REQ_ID=9cb4298be22e] [PERF] Execution time=0.133886
DEBUG - 2026-03-27 11:44:34 --> [REQ_ID=0a69863c8ee4] [REQUEST][END]
INFO - 2026-03-27 11:44:34 --> [REQ_ID=0a69863c8ee4] [PERF] Execution time=1.091081
DEBUG - 2026-03-27 11:44:34 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-27 11:44:34 --> [REQ_ID=74dc0bec9e33] [FILTER_BEFORE] /index.php/API/Investments/getForecastAccuracySummary?window=7d
DEBUG - 2026-03-27 11:44:34 --> [REQ_ID=74dc0bec9e33] [ROUTE] Controller=\App\Modules\APIs\Controllers\InvestmentsAPIController Method=getForecastAccuracySummary
DEBUG - 2026-03-27 11:44:34 --> [REQ_ID=74dc0bec9e33] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Investments/getForecastAccuracySummary?window=7d
DEBUG - 2026-03-27 11:44:34 --> [REQ_ID=6a6e4c6503a7] [INIT] App\Modules\APIs\Controllers\InvestmentsAPIController::GET
INFO - 2026-03-27 11:44:34 --> [REQ_ID=6a6e4c6503a7] [MEMORY][controller-start] 6291456
DEBUG - 2026-03-27 11:44:34 --> MyMIMarketing: Pscrape library not installed; Google search scraping will use fallback.
DEBUG - 2026-03-27 11:44:34 --> MyMIUser L52 - initialized (first log).
INFO - 2026-03-27 11:44:34 --> Premium entitlement resolved: user_id=2 route=/index.php/API/Investments/getForecastAccuracySummary feature=investments.analytics tier=free status=free allowed=no reason=Feature requires tier1 or higher. Current tier: free (free).
WARNING - 2026-03-27 11:44:34 --> Premium access denied: feature=investments.analytics route=/index.php/API/Investments/getForecastAccuracySummary user_id=2 tier=free status=free
DEBUG - 2026-03-27 11:44:34 --> [REQ_ID=74dc0bec9e33] [FILTER_AFTER]
DEBUG - 2026-03-27 11:44:34 --> [REQ_ID=74dc0bec9e33] [LIFECYCLE][END] status=302 duration_ms=126.63 memory_delta=2097152
INFO - 2026-03-27 11:44:34 --> [REQ_ID=6a6e4c6503a7] [PERF] Execution time=0.125924
DEBUG - 2026-03-27 11:44:34 --> [REQ_ID=74dc0bec9e33] [REQUEST][END]
INFO - 2026-03-27 11:44:34 --> [REQ_ID=74dc0bec9e33] [PERF] Execution time=1.245754
DEBUG - 2026-03-27 11:44:34 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-27 11:44:34 --> [REQ_ID=563655c2a799] [FILTER_BEFORE] /index.php/API/Investments/getForecastHighlights
DEBUG - 2026-03-27 11:44:34 --> [REQ_ID=563655c2a799] [ROUTE] Controller=\App\Modules\APIs\Controllers\InvestmentsAPIController Method=getForecastHighlights
DEBUG - 2026-03-27 11:44:34 --> [REQ_ID=563655c2a799] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Investments/getForecastHighlights
DEBUG - 2026-03-27 11:44:34 --> [REQ_ID=8ef41c316875] [INIT] App\Modules\APIs\Controllers\InvestmentsAPIController::GET
INFO - 2026-03-27 11:44:34 --> [REQ_ID=8ef41c316875] [MEMORY][controller-start] 6291456
DEBUG - 2026-03-27 11:44:34 --> MyMIMarketing: Pscrape library not installed; Google search scraping will use fallback.
DEBUG - 2026-03-27 11:44:34 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-27 11:44:34 --> [REQ_ID=563655c2a799] [FILTER_AFTER]
DEBUG - 2026-03-27 11:44:34 --> [REQ_ID=563655c2a799] [LIFECYCLE][END] status=200 duration_ms=13.51 memory_delta=0
INFO - 2026-03-27 11:44:34 --> [REQ_ID=8ef41c316875] [PERF] Execution time=0.013437
DEBUG - 2026-03-27 11:44:34 --> [REQ_ID=563655c2a799] [REQUEST][END]
INFO - 2026-03-27 11:44:34 --> [REQ_ID=563655c2a799] [PERF] Execution time=0.574033
DEBUG - 2026-03-27 11:44:34 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-27 11:44:34 --> [REQ_ID=7dda812b8e70] [FILTER_BEFORE] /index.php/Memberships
DEBUG - 2026-03-27 11:44:34 --> [REQ_ID=7dda812b8e70] [ROUTE] Controller=\App\Controllers\Home Method=memberships
DEBUG - 2026-03-27 11:44:34 --> [REQ_ID=7dda812b8e70] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Memberships
DEBUG - 2026-03-27 11:44:34 --> [CSRF] token name=csrf_test_name hash=93b6402c6fe89089a9d6198177f1cf5a
DEBUG - 2026-03-27 11:44:34 --> [REQ_ID=f3b6470c7089] [INIT] App\Controllers\Home::GET
INFO - 2026-03-27 11:44:34 --> [REQ_ID=f3b6470c7089] [MEMORY][controller-start] 6291456
INFO - 2026-03-27 11:44:34 --> [REQ_ID=f3b6470c7089] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-27 11:44:34 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-27 11:44:35 --> [MetaService] slug=memberships pageName= cacheHit= path=DB
DEBUG - 2026-03-27 11:44:35 --> [REQ_ID=f3b6470c7089] [VIEW_RENDER] themes/public/memberships
INFO - 2026-03-27 11:44:35 --> [REQ_ID=f3b6470c7089] [MEMORY][commonData:start] 8388608
INFO - 2026-03-27 11:44:35 --> themesMemory usage: 8388608
DEBUG - 2026-03-27 11:44:35 --> [MetaService] slug=memberships pageName=Memberships cacheHit= path=DB
DEBUG - 2026-03-27 11:44:35 --> [REQ_ID=7dda812b8e70] [FILTER_AFTER]
DEBUG - 2026-03-27 11:44:35 --> [REQ_ID=7dda812b8e70] [LIFECYCLE][END] status=200 duration_ms=559.71 memory_delta=2097152
INFO - 2026-03-27 11:44:35 --> [REQ_ID=f3b6470c7089] [PERF] Execution time=0.558412
DEBUG - 2026-03-27 11:44:35 --> [REQ_ID=7dda812b8e70] [REQUEST][END]
INFO - 2026-03-27 11:44:35 --> [REQ_ID=7dda812b8e70] [PERF] Execution time=0.980843
DEBUG - 2026-03-27 11:44:35 --> [REQ_ID=338eb7a13546] [REQUEST][START] GET /index.php/Memberships
DEBUG - 2026-03-27 11:44:35 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-27 11:44:35 --> [REQ_ID=338eb7a13546] [FILTER_BEFORE] /index.php/Memberships
DEBUG - 2026-03-27 11:44:35 --> [REQ_ID=338eb7a13546] [ROUTE] Controller=\App\Controllers\Home Method=memberships
DEBUG - 2026-03-27 11:44:35 --> [REQ_ID=338eb7a13546] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Memberships
DEBUG - 2026-03-27 11:44:35 --> [CSRF] token name=csrf_test_name hash=93b6402c6fe89089a9d6198177f1cf5a
DEBUG - 2026-03-27 11:44:35 --> [REQ_ID=01b048b3a847] [INIT] App\Controllers\Home::GET
INFO - 2026-03-27 11:44:35 --> [REQ_ID=01b048b3a847] [MEMORY][controller-start] 6291456
INFO - 2026-03-27 11:44:35 --> [REQ_ID=01b048b3a847] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-27 11:44:35 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-27 11:44:36 --> [MetaService] slug=memberships pageName= cacheHit=1 path=CACHE
DEBUG - 2026-03-27 11:44:36 --> [REQ_ID=01b048b3a847] [VIEW_RENDER] themes/public/memberships
INFO - 2026-03-27 11:44:36 --> [REQ_ID=01b048b3a847] [MEMORY][commonData:start] 8388608
INFO - 2026-03-27 11:44:36 --> themesMemory usage: 8388608
DEBUG - 2026-03-27 11:44:36 --> [MetaService] slug=memberships pageName=Memberships cacheHit=1 path=CACHE
DEBUG - 2026-03-27 11:44:36 --> [REQ_ID=338eb7a13546] [FILTER_AFTER]
DEBUG - 2026-03-27 11:44:36 --> [REQ_ID=338eb7a13546] [LIFECYCLE][END] status=200 duration_ms=537.68 memory_delta=2097152
INFO - 2026-03-27 11:44:36 --> [REQ_ID=01b048b3a847] [PERF] Execution time=0.537532
DEBUG - 2026-03-27 11:44:36 --> [REQ_ID=338eb7a13546] [REQUEST][END]
INFO - 2026-03-27 11:44:36 --> [REQ_ID=338eb7a13546] [PERF] Execution time=0.546005
DEBUG - 2026-03-27 11:44:36 --> [REQ_ID=289c309e0873] [REQUEST][START] GET /index.php/Memberships
DEBUG - 2026-03-27 11:44:36 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-27 11:44:36 --> [REQ_ID=289c309e0873] [FILTER_BEFORE] /index.php/Memberships
DEBUG - 2026-03-27 11:44:36 --> [REQ_ID=289c309e0873] [ROUTE] Controller=\App\Controllers\Home Method=memberships
DEBUG - 2026-03-27 11:44:36 --> [REQ_ID=289c309e0873] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Memberships
DEBUG - 2026-03-27 11:44:36 --> [CSRF] token name=csrf_test_name hash=93b6402c6fe89089a9d6198177f1cf5a
DEBUG - 2026-03-27 11:44:36 --> [REQ_ID=f1c4ec4e2c45] [INIT] App\Controllers\Home::GET
INFO - 2026-03-27 11:44:36 --> [REQ_ID=f1c4ec4e2c45] [MEMORY][controller-start] 6291456
INFO - 2026-03-27 11:44:36 --> [REQ_ID=f1c4ec4e2c45] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-27 11:44:36 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-27 11:44:36 --> [MetaService] slug=memberships pageName= cacheHit=1 path=CACHE
DEBUG - 2026-03-27 11:44:36 --> [REQ_ID=f1c4ec4e2c45] [VIEW_RENDER] themes/public/memberships
INFO - 2026-03-27 11:44:36 --> [REQ_ID=f1c4ec4e2c45] [MEMORY][commonData:start] 8388608
INFO - 2026-03-27 11:44:36 --> themesMemory usage: 8388608
DEBUG - 2026-03-27 11:44:36 --> [MetaService] slug=memberships pageName=Memberships cacheHit=1 path=CACHE
DEBUG - 2026-03-27 11:44:36 --> [REQ_ID=289c309e0873] [FILTER_AFTER]
DEBUG - 2026-03-27 11:44:36 --> [REQ_ID=289c309e0873] [LIFECYCLE][END] status=200 duration_ms=543.08 memory_delta=2097152
INFO - 2026-03-27 11:44:36 --> [REQ_ID=f1c4ec4e2c45] [PERF] Execution time=0.543034
DEBUG - 2026-03-27 11:44:36 --> [REQ_ID=289c309e0873] [REQUEST][END]
INFO - 2026-03-27 11:44:36 --> [REQ_ID=289c309e0873] [PERF] Execution time=0.552898
DEBUG - 2026-03-27 11:44:46 --> [REQ_ID=1621105d705d] [REQUEST][START] GET /index.php/Projects
DEBUG - 2026-03-27 11:44:46 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-27 11:44:46 --> [REQ_ID=1621105d705d] [FILTER_BEFORE] /index.php/Projects
DEBUG - 2026-03-27 11:44:46 --> [REQ_ID=1621105d705d] [ROUTE] Controller=\App\Modules\User\Controllers\ProjectsController Method=index
DEBUG - 2026-03-27 11:44:46 --> [REQ_ID=1621105d705d] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Projects
DEBUG - 2026-03-27 11:44:46 --> [CSRF] token name=csrf_test_name hash=93b6402c6fe89089a9d6198177f1cf5a
DEBUG - 2026-03-27 11:44:46 --> [REQ_ID=1238303cb0c7] [INIT] App\Modules\User\Controllers\ProjectsController::GET
INFO - 2026-03-27 11:44:46 --> [REQ_ID=1238303cb0c7] [MEMORY][controller-start] 6291456
DEBUG - 2026-03-27 11:44:46 --> [REQ_ID=1238303cb0c7] [METHOD_ENTRY] index
DEBUG - 2026-03-27 11:44:46 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-27 11:44:46 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-27 11:44:46 --> [REQ_ID=1238303cb0c7] [VIEW_RENDER] App\Modules\User\Views\Projects\view
INFO - 2026-03-27 11:44:46 --> [REQ_ID=1238303cb0c7] [MEMORY][commonData:start] 6291456
WARNING - 2026-03-27 11:44:46 --> [DEPRECATED] number_format(): Passing null to parameter #1 ($num) of type float is deprecated in APPPATH/Modules/User/Views/Projects/view.php on line 52.
 1 APPPATH/Modules/User/Views/Projects/view.php(52): number_format(null, 2)
 2 SYSTEMPATH/View/View.php(238): include('/home/mymiteam/mymiwallet/site/current/app/Modules/User/Views/Projects/view.php')
 3 SYSTEMPATH/View/View.php(241): CodeIgniter\View\View->CodeIgniter\View\{closure}()
 4 SYSTEMPATH/Common.php(1250): CodeIgniter\View\View->render('App\\Modules\\User\\Views\\Projects\\view', [], true)
 5 APPPATH/Controllers/BaseController.php(623): view('App\\Modules\\User\\Views\\Projects\\view', [...])
 6 APPPATH/Controllers/UserController.php(124): App\Controllers\BaseController->tryView('App\\Modules\\User\\Views\\Projects\\view', [...])
 7 APPPATH/Modules/User/Controllers/ProjectsController.php(50): App\Controllers\UserController->renderTheme('App\\Modules\\User\\Views\\Projects\\view', [...])
 8 SYSTEMPATH/CodeIgniter.php(951): App\Modules\User\Controllers\ProjectsController->index()
 9 SYSTEMPATH/CodeIgniter.php(497): CodeIgniter\CodeIgniter->runController(Object(App\Modules\User\Controllers\ProjectsController))
10 SYSTEMPATH/CodeIgniter.php(340): CodeIgniter\CodeIgniter->handleRequest(null, Object(Config\Cache), false)
11 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
12 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
13 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
WARNING - 2026-03-27 11:44:46 --> [DEPRECATED] number_format(): Passing null to parameter #1 ($num) of type float is deprecated in APPPATH/Modules/User/Views/Projects/view.php on line 53.
 1 APPPATH/Modules/User/Views/Projects/view.php(53): number_format(null, 2)
 2 SYSTEMPATH/View/View.php(238): include('/home/mymiteam/mymiwallet/site/current/app/Modules/User/Views/Projects/view.php')
 3 SYSTEMPATH/View/View.php(241): CodeIgniter\View\View->CodeIgniter\View\{closure}()
 4 SYSTEMPATH/Common.php(1250): CodeIgniter\View\View->render('App\\Modules\\User\\Views\\Projects\\view', [], true)
 5 APPPATH/Controllers/BaseController.php(623): view('App\\Modules\\User\\Views\\Projects\\view', [...])
 6 APPPATH/Controllers/UserController.php(124): App\Controllers\BaseController->tryView('App\\Modules\\User\\Views\\Projects\\view', [...])
 7 APPPATH/Modules/User/Controllers/ProjectsController.php(50): App\Controllers\UserController->renderTheme('App\\Modules\\User\\Views\\Projects\\view', [...])
 8 SYSTEMPATH/CodeIgniter.php(951): App\Modules\User\Controllers\ProjectsController->index()
 9 SYSTEMPATH/CodeIgniter.php(497): CodeIgniter\CodeIgniter->runController(Object(App\Modules\User\Controllers\ProjectsController))
10 SYSTEMPATH/CodeIgniter.php(340): CodeIgniter\CodeIgniter->handleRequest(null, Object(Config\Cache), false)
11 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
12 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
13 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
INFO - 2026-03-27 11:44:46 --> themesMemory usage: 6291456
DEBUG - 2026-03-27 11:44:46 --> [REQ_ID=1621105d705d] [FILTER_AFTER]
DEBUG - 2026-03-27 11:44:46 --> [REQ_ID=1621105d705d] [LIFECYCLE][END] status=200 duration_ms=69.27 memory_delta=0
INFO - 2026-03-27 11:44:46 --> [REQ_ID=1238303cb0c7] [PERF] Execution time=0.049174
DEBUG - 2026-03-27 11:44:46 --> [REQ_ID=1621105d705d] [REQUEST][END]
INFO - 2026-03-27 11:44:46 --> [REQ_ID=1621105d705d] [PERF] Execution time=0.081808
DEBUG - 2026-03-27 11:45:40 --> [REQ_ID=211b7c98d016] [REQUEST][START] GET /index.php/Projects/Fund
DEBUG - 2026-03-27 11:45:40 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-27 11:45:40 --> [REQ_ID=211b7c98d016] [FILTER_BEFORE] /index.php/Projects/Fund
DEBUG - 2026-03-27 11:45:40 --> [REQ_ID=211b7c98d016] [ROUTE] Controller=\App\Modules\User\Controllers\ProjectsController Method=fund
DEBUG - 2026-03-27 11:45:40 --> [REQ_ID=211b7c98d016] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Projects/Fund
DEBUG - 2026-03-27 11:45:40 --> [CSRF] token name=csrf_test_name hash=93b6402c6fe89089a9d6198177f1cf5a
DEBUG - 2026-03-27 11:45:40 --> [REQ_ID=1621b2f0c598] [INIT] App\Modules\User\Controllers\ProjectsController::GET
INFO - 2026-03-27 11:45:40 --> [REQ_ID=1621b2f0c598] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-27 11:45:40 --> [REQ_ID=1621b2f0c598] [METHOD_ENTRY] fund
DEBUG - 2026-03-27 11:45:40 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-27 11:45:40 --> [SERVICE] App\Services\BudgetService ::setUserId
ERROR - 2026-03-27 11:45:40 --> Unknown column 'project_id' in 'where clause'
in SYSTEMPATH/Database/MySQLi/Connection.php on line 300.
 1 SYSTEMPATH/Database/MySQLi/Connection.php(300): mysqli->query('SELECT *
FROM `bf_mdit_investor_profiles`
WHERE `project_id` = 24
AND `user_id` = 2', 0)
 2 SYSTEMPATH/Database/BaseConnection.php(769): CodeIgniter\Database\MySQLi\Connection->execute('SELECT *
FROM `bf_mdit_investor_profiles`
WHERE `project_id` = 24
AND `user_id` = 2')
 3 SYSTEMPATH/Database/BaseConnection.php(686): CodeIgniter\Database\BaseConnection->simpleQuery('SELECT *
FROM `bf_mdit_investor_profiles`
WHERE `project_id` = 24
AND `user_id` = 2')
 4 SYSTEMPATH/Database/BaseBuilder.php(1649): CodeIgniter\Database\BaseConnection->query('SELECT *
FROM `bf_mdit_investor_profiles`
WHERE `project_id` = :project_id:
AND `user_id` = :user_id:', [...], false)
 5 APPPATH/Models/ProjectsModel.php(251): CodeIgniter\Database\BaseBuilder->get()
 6 APPPATH/Libraries/MyMIProjects.php(693): App\Models\ProjectsModel->getFundInvestorProfile(24, 2)
 7 APPPATH/Modules/User/Controllers/ProjectsController.php(163): App\Libraries\MyMIProjects->getFundDashboardData(24, 2)
 8 SYSTEMPATH/CodeIgniter.php(951): App\Modules\User\Controllers\ProjectsController->fund()
 9 SYSTEMPATH/CodeIgniter.php(497): CodeIgniter\CodeIgniter->runController(Object(App\Modules\User\Controllers\ProjectsController))
10 SYSTEMPATH/CodeIgniter.php(340): CodeIgniter\CodeIgniter->handleRequest(null, Object(Config\Cache), false)
11 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
12 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
13 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
INFO - 2026-03-27 11:45:40 --> [REQ_ID=1621b2f0c598] [PERF] Execution time=0.025183
DEBUG - 2026-03-27 11:46:22 --> [REQ_ID=9954aba07f85] [REQUEST][START] HEAD /
DEBUG - 2026-03-27 11:46:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-27 11:46:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-27 11:46:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-27 11:46:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-27 11:46:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-27 11:51:22 --> [REQ_ID=b4e25c729e47] [REQUEST][START] HEAD /
DEBUG - 2026-03-27 11:51:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-27 11:51:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-27 11:51:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-27 11:51:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-27 11:51:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-27 11:56:22 --> [REQ_ID=d1a20a7db0ef] [REQUEST][START] HEAD /
DEBUG - 2026-03-27 11:56:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-27 11:56:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-27 11:56:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-27 11:56:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-27 11:56:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-27 12:00:02 --> [REQ_ID=a315357ae597] [REQUEST][START] GET /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-27 12:00:02 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-27 12:00:02 --> [REQ_ID=a315357ae597] [FILTER_BEFORE] /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-27 12:00:02 --> [REQ_ID=a315357ae597] [ROUTE] Controller=\App\Modules\Management\Controllers\ManagementAPIController Method=Run_CRON_Tasks
DEBUG - 2026-03-27 12:00:02 --> [REQ_ID=a315357ae597] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-27 12:00:02 --> [REQ_ID=a315357ae597] [REQUEST][END]
INFO - 2026-03-27 12:00:02 --> [REQ_ID=a315357ae597] [PERF] Execution time=0.045890
DEBUG - 2026-03-27 12:01:22 --> [REQ_ID=83dde830693e] [REQUEST][START] HEAD /
DEBUG - 2026-03-27 12:01:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-27 12:01:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-27 12:01:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-27 12:01:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-27 12:01:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-27 12:03:07 --> [REQ_ID=53adbf07e1d8] [REQUEST][START] GET /index.php/Apex/Referral
DEBUG - 2026-03-27 12:03:07 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-27 12:03:07 --> [REQ_ID=53adbf07e1d8] [REQUEST][END]
INFO - 2026-03-27 12:03:07 --> [REQ_ID=53adbf07e1d8] [PERF] Execution time=0.038824
DEBUG - 2026-03-27 12:06:22 --> [REQ_ID=8f2f56f709dc] [REQUEST][START] HEAD /
DEBUG - 2026-03-27 12:06:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-27 12:06:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-27 12:06:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-27 12:06:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-27 12:06:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-27 12:11:22 --> [REQ_ID=2a3d2a75f721] [REQUEST][START] HEAD /
DEBUG - 2026-03-27 12:11:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-27 12:11:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-27 12:11:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-27 12:11:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-27 12:11:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-27 12:15:01 --> [REQ_ID=baee3c69241b] [REQUEST][START] GET /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-27 12:15:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-27 12:15:02 --> [REQ_ID=baee3c69241b] [FILTER_BEFORE] /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-27 12:15:02 --> [REQ_ID=baee3c69241b] [ROUTE] Controller=\App\Modules\APIs\Controllers\AlertsAPIController Method=fetchEmailAlerts
DEBUG - 2026-03-27 12:15:02 --> [REQ_ID=baee3c69241b] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-27 12:15:02 --> [REQ_ID=baee3c69241b] [REQUEST][END]
INFO - 2026-03-27 12:15:02 --> [REQ_ID=baee3c69241b] [PERF] Execution time=0.048212
DEBUG - 2026-03-27 12:16:22 --> [REQ_ID=ed8135105b03] [REQUEST][START] HEAD /
DEBUG - 2026-03-27 12:16:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-27 12:16:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-27 12:16:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-27 12:16:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-27 12:16:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-27 12:17:58 --> [REQ_ID=bb236665df9d] [REQUEST][START] GET /index.php
DEBUG - 2026-03-27 12:17:58 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-27 12:17:58 --> [REQ_ID=bb236665df9d] [REQUEST][END]
INFO - 2026-03-27 12:17:58 --> [REQ_ID=bb236665df9d] [PERF] Execution time=0.039450
DEBUG - 2026-03-27 12:20:02 --> [REQ_ID=5a078d9369d9] [REQUEST][START] GET /
DEBUG - 2026-03-27 12:20:02 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-27 12:20:02 --> [REQ_ID=5a078d9369d9] [FILTER_BEFORE] /
DEBUG - 2026-03-27 12:20:02 --> [REQ_ID=5a078d9369d9] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-27 12:20:02 --> [REQ_ID=5a078d9369d9] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-27 12:20:02 --> [CSRF] token name=csrf_test_name hash=442190fe70b2487ce4e828be2482b7a2
DEBUG - 2026-03-27 12:20:02 --> [REQ_ID=66e13283b970] [INIT] App\Controllers\Home::GET
INFO - 2026-03-27 12:20:02 --> [REQ_ID=66e13283b970] [MEMORY][controller-start] 6291456
INFO - 2026-03-27 12:20:02 --> [REQ_ID=66e13283b970] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-27 12:20:02 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-27 12:20:02 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-03-27 12:20:02 --> [REQ_ID=66e13283b970] [VIEW_RENDER] themes/public/home
INFO - 2026-03-27 12:20:02 --> [REQ_ID=66e13283b970] [MEMORY][commonData:start] 10485760
INFO - 2026-03-27 12:20:02 --> themesMemory usage: 10485760
DEBUG - 2026-03-27 12:20:02 --> [MetaService] slug= pageName=Home cacheHit= path=DB
DEBUG - 2026-03-27 12:20:02 --> [REQ_ID=5a078d9369d9] [FILTER_AFTER]
DEBUG - 2026-03-27 12:20:02 --> [REQ_ID=5a078d9369d9] [LIFECYCLE][END] status=200 duration_ms=691.09 memory_delta=4194304
INFO - 2026-03-27 12:20:02 --> [REQ_ID=66e13283b970] [PERF] Execution time=0.688993
DEBUG - 2026-03-27 12:20:02 --> [REQ_ID=5a078d9369d9] [REQUEST][END]
INFO - 2026-03-27 12:20:02 --> [REQ_ID=5a078d9369d9] [PERF] Execution time=0.731534
DEBUG - 2026-03-27 12:21:22 --> [REQ_ID=bf0bc6cff43e] [REQUEST][START] HEAD /
DEBUG - 2026-03-27 12:21:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-27 12:21:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-27 12:21:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-27 12:21:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-27 12:21:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-27 12:21:30 --> [REQ_ID=7873196bc4ab] [REQUEST][START] GET /index.php/How-It-Works
DEBUG - 2026-03-27 12:21:30 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-27 12:21:30 --> [REQ_ID=7873196bc4ab] [REQUEST][END]
INFO - 2026-03-27 12:21:30 --> [REQ_ID=7873196bc4ab] [PERF] Execution time=0.022436
DEBUG - 2026-03-27 12:26:22 --> [REQ_ID=b9eca24bdf51] [REQUEST][START] HEAD /
DEBUG - 2026-03-27 12:26:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-27 12:26:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-27 12:26:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-27 12:26:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-27 12:26:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-27 12:31:22 --> [REQ_ID=765bd817a821] [REQUEST][START] HEAD /
DEBUG - 2026-03-27 12:31:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-27 12:31:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-27 12:31:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-27 12:31:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-27 12:31:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-27 12:36:22 --> [REQ_ID=c116ac6fea3d] [REQUEST][START] HEAD /
DEBUG - 2026-03-27 12:36:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-27 12:36:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-27 12:36:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-27 12:36:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-27 12:36:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-27 12:41:22 --> [REQ_ID=ae347e55287b] [REQUEST][START] HEAD /
DEBUG - 2026-03-27 12:41:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-27 12:41:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-27 12:41:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-27 12:41:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-27 12:41:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-27 12:43:19 --> [REQ_ID=fe3ebd350512] [REQUEST][START] GET /index.php/ITT/register
DEBUG - 2026-03-27 12:43:19 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-27 12:43:19 --> [REQ_ID=fe3ebd350512] [FILTER_BEFORE] /index.php/ITT/register
DEBUG - 2026-03-27 12:43:19 --> [REQ_ID=fe3ebd350512] [ROUTE] Controller=\App\Controllers\AuthController Method=register
DEBUG - 2026-03-27 12:43:19 --> [REQ_ID=fe3ebd350512] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/ITT/register
DEBUG - 2026-03-27 12:43:19 --> [CSRF] token name=csrf_test_name hash=00f0db9ee648d6745779a86caca4c429
DEBUG - 2026-03-27 12:43:19 --> [REQ_ID=2b02214d3b99] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-27 12:43:19 --> [REQ_ID=2b02214d3b99] [MEMORY][controller-start] 6291456
INFO - 2026-03-27 12:43:19 --> [REGISTRATION] Form loaded
INFO - 2026-03-27 12:43:19 --> [REQ_ID=2b02214d3b99] [PERF] Execution time=0.139254
DEBUG - 2026-03-27 12:43:20 --> [REQ_ID=9144c81e3e97] [REQUEST][START] GET /index.php/ITT/register
DEBUG - 2026-03-27 12:43:20 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-27 12:43:20 --> [REQ_ID=9144c81e3e97] [FILTER_BEFORE] /index.php/ITT/register
DEBUG - 2026-03-27 12:43:20 --> [REQ_ID=9144c81e3e97] [ROUTE] Controller=\App\Controllers\AuthController Method=register
DEBUG - 2026-03-27 12:43:20 --> [REQ_ID=9144c81e3e97] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/ITT/register
DEBUG - 2026-03-27 12:43:20 --> [CSRF] token name=csrf_test_name hash=bcb129cd37ea201fb72970c3441a4658
DEBUG - 2026-03-27 12:43:20 --> [REQ_ID=c088d986b743] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-27 12:43:20 --> [REQ_ID=c088d986b743] [MEMORY][controller-start] 4194304
INFO - 2026-03-27 12:43:20 --> [REGISTRATION] Form loaded
INFO - 2026-03-27 12:43:20 --> [REQ_ID=c088d986b743] [PERF] Execution time=0.013759
DEBUG - 2026-03-27 12:46:22 --> [REQ_ID=1645c3ae32a2] [REQUEST][START] HEAD /
DEBUG - 2026-03-27 12:46:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-27 12:46:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-27 12:46:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-27 12:46:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-27 12:46:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-27 12:49:41 --> [REQ_ID=af069c614d05] [REQUEST][START] GET /index.php/logout
DEBUG - 2026-03-27 12:49:41 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-27 12:49:41 --> [REQ_ID=af069c614d05] [REQUEST][END]
INFO - 2026-03-27 12:49:41 --> [REQ_ID=af069c614d05] [PERF] Execution time=0.041257
DEBUG - 2026-03-27 12:51:22 --> [REQ_ID=993e71e6fcc6] [REQUEST][START] HEAD /
DEBUG - 2026-03-27 12:51:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-27 12:51:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-27 12:51:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-27 12:51:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-27 12:51:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-27 12:56:22 --> [REQ_ID=2ed59345d77d] [REQUEST][START] HEAD /
DEBUG - 2026-03-27 12:56:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-27 12:56:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-27 12:56:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-27 12:56:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-27 12:56:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-27 13:00:01 --> [REQ_ID=77a3d34a0344] [REQUEST][START] GET /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-27 13:00:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-27 13:00:01 --> [REQ_ID=77a3d34a0344] [FILTER_BEFORE] /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-27 13:00:01 --> [REQ_ID=77a3d34a0344] [ROUTE] Controller=\App\Modules\Management\Controllers\ManagementAPIController Method=Run_CRON_Tasks
DEBUG - 2026-03-27 13:00:01 --> [REQ_ID=77a3d34a0344] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-27 13:00:01 --> [REQ_ID=77a3d34a0344] [REQUEST][END]
INFO - 2026-03-27 13:00:01 --> [REQ_ID=77a3d34a0344] [PERF] Execution time=0.057630
DEBUG - 2026-03-27 13:01:22 --> [REQ_ID=ace957a8788f] [REQUEST][START] HEAD /
DEBUG - 2026-03-27 13:01:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-27 13:01:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-27 13:01:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-27 13:01:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-27 13:01:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-27 13:06:22 --> [REQ_ID=7cb9f22a54c1] [REQUEST][START] HEAD /
DEBUG - 2026-03-27 13:06:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-27 13:06:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-27 13:06:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-27 13:06:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-27 13:06:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-27 13:11:22 --> [REQ_ID=e4fa487d62ac] [REQUEST][START] HEAD /
DEBUG - 2026-03-27 13:11:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-27 13:11:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-27 13:11:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-27 13:11:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-27 13:11:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-27 13:15:02 --> [REQ_ID=39909d98c23c] [REQUEST][START] GET /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-27 13:15:02 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-27 13:15:02 --> [REQ_ID=39909d98c23c] [FILTER_BEFORE] /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-27 13:15:02 --> [REQ_ID=39909d98c23c] [ROUTE] Controller=\App\Modules\APIs\Controllers\AlertsAPIController Method=fetchEmailAlerts
DEBUG - 2026-03-27 13:15:02 --> [REQ_ID=39909d98c23c] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-27 13:15:02 --> [REQ_ID=39909d98c23c] [REQUEST][END]
INFO - 2026-03-27 13:15:02 --> [REQ_ID=39909d98c23c] [PERF] Execution time=0.046161
DEBUG - 2026-03-27 13:16:22 --> [REQ_ID=dfddfd97ee1b] [REQUEST][START] HEAD /
DEBUG - 2026-03-27 13:16:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-27 13:16:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-27 13:16:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-27 13:16:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-27 13:16:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-27 13:17:55 --> [REQ_ID=f832a39c9b4e] [REQUEST][START] GET /index.php/Free/register
DEBUG - 2026-03-27 13:17:55 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-27 13:17:55 --> [REQ_ID=f832a39c9b4e] [FILTER_BEFORE] /index.php/Free/register
DEBUG - 2026-03-27 13:17:55 --> [REQ_ID=f832a39c9b4e] [ROUTE] Controller=\App\Controllers\AuthController Method=register
DEBUG - 2026-03-27 13:17:55 --> [REQ_ID=f832a39c9b4e] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Free/register
DEBUG - 2026-03-27 13:17:55 --> [CSRF] token name=csrf_test_name hash=cb8b915f50582d4b59ac6288bc757a10
DEBUG - 2026-03-27 13:17:55 --> [REQ_ID=6c478355db92] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-27 13:17:55 --> [REQ_ID=6c478355db92] [MEMORY][controller-start] 6291456
INFO - 2026-03-27 13:17:55 --> [REGISTRATION] Form loaded
INFO - 2026-03-27 13:17:55 --> [REQ_ID=6c478355db92] [PERF] Execution time=0.048980
DEBUG - 2026-03-27 13:21:22 --> [REQ_ID=77299bb96479] [REQUEST][START] HEAD /
DEBUG - 2026-03-27 13:21:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-27 13:21:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-27 13:21:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-27 13:21:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-27 13:21:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-27 13:26:22 --> [REQ_ID=7fa90cddaef4] [REQUEST][START] HEAD /
DEBUG - 2026-03-27 13:26:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-27 13:26:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-27 13:26:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-27 13:26:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-27 13:26:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-27 13:31:22 --> [REQ_ID=cb1f670a802c] [REQUEST][START] HEAD /
DEBUG - 2026-03-27 13:31:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-27 13:31:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-27 13:31:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-27 13:31:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-27 13:31:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-27 13:36:22 --> [REQ_ID=38ee0eb6c342] [REQUEST][START] HEAD /
DEBUG - 2026-03-27 13:36:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-27 13:36:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-27 13:36:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-27 13:36:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-27 13:36:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-27 13:37:05 --> [REQ_ID=e4c4ba15b4ab] [REQUEST][START] GET /
DEBUG - 2026-03-27 13:37:05 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-27 13:37:05 --> [REQ_ID=e4c4ba15b4ab] [FILTER_BEFORE] /
DEBUG - 2026-03-27 13:37:05 --> [REQ_ID=e4c4ba15b4ab] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-27 13:37:05 --> [REQ_ID=e4c4ba15b4ab] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-27 13:37:05 --> [CSRF] token name=csrf_test_name hash=fba277e6f8cb55ca45d01904fc3bffd6
DEBUG - 2026-03-27 13:37:05 --> [REQ_ID=a91f56580113] [INIT] App\Controllers\Home::GET
INFO - 2026-03-27 13:37:05 --> [REQ_ID=a91f56580113] [MEMORY][controller-start] 4194304
INFO - 2026-03-27 13:37:05 --> [REQ_ID=a91f56580113] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-27 13:37:05 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-27 13:37:05 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-03-27 13:37:05 --> [REQ_ID=a91f56580113] [VIEW_RENDER] themes/public/home
INFO - 2026-03-27 13:37:05 --> [REQ_ID=a91f56580113] [MEMORY][commonData:start] 8388608
INFO - 2026-03-27 13:37:05 --> themesMemory usage: 8388608
DEBUG - 2026-03-27 13:37:05 --> [MetaService] slug= pageName=Home cacheHit= path=DB
DEBUG - 2026-03-27 13:37:05 --> [REQ_ID=e4c4ba15b4ab] [FILTER_AFTER]
DEBUG - 2026-03-27 13:37:05 --> [REQ_ID=e4c4ba15b4ab] [LIFECYCLE][END] status=200 duration_ms=726.97 memory_delta=4194304
INFO - 2026-03-27 13:37:05 --> [REQ_ID=a91f56580113] [PERF] Execution time=0.724329
DEBUG - 2026-03-27 13:37:05 --> [REQ_ID=e4c4ba15b4ab] [REQUEST][END]
INFO - 2026-03-27 13:37:05 --> [REQ_ID=e4c4ba15b4ab] [PERF] Execution time=0.747145
DEBUG - 2026-03-27 13:41:22 --> [REQ_ID=3f73c91e58fd] [REQUEST][START] HEAD /
DEBUG - 2026-03-27 13:41:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-27 13:41:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-27 13:41:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-27 13:41:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-27 13:41:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-27 13:46:22 --> [REQ_ID=dc0ab82b1d4d] [REQUEST][START] HEAD /
DEBUG - 2026-03-27 13:46:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-27 13:46:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-27 13:46:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-27 13:46:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-27 13:46:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-27 13:49:33 --> [REQ_ID=7eda679e5541] [REQUEST][START] GET /index.php/How-It-Works
DEBUG - 2026-03-27 13:49:33 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-27 13:49:33 --> [REQ_ID=7eda679e5541] [FILTER_BEFORE] /index.php/How-It-Works
DEBUG - 2026-03-27 13:49:33 --> [REQ_ID=7eda679e5541] [ROUTE] Controller=\App\Modules\Blog\Controllers\HowItWorksController Method=index
DEBUG - 2026-03-27 13:49:33 --> [REQ_ID=7eda679e5541] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/How-It-Works
DEBUG - 2026-03-27 13:49:33 --> [CSRF] token name=csrf_test_name hash=974d9294811984c178b1c8ffc289e364
DEBUG - 2026-03-27 13:49:33 --> [REQ_ID=f7b323bcc4bb] [INIT] App\Modules\Blog\Controllers\HowItWorksController::GET
INFO - 2026-03-27 13:49:33 --> [REQ_ID=f7b323bcc4bb] [MEMORY][controller-start] 6291456
DEBUG - 2026-03-27 13:49:33 --> [REQ_ID=f7b323bcc4bb] [METHOD_ENTRY] index
DEBUG - 2026-03-27 13:49:33 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-27 13:49:33 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-27 13:49:33 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-27 13:49:33 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-27 13:49:33 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-27 13:49:33 --> MyMICoin: guest context detected; skipping user-specific preload.
ERROR - 2026-03-27 13:49:33 --> HowItWorksController failure: overview
CRITICAL - 2026-03-27 13:49:33 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: GET, Route: How-It-Works]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-27 13:49:33 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-27 13:49:33 --> [404] URI=https://www.mymiwallet.com/index.php/How-It-Works
WARNING - 2026-03-27 13:49:33 --> 404 route miss: https://www.mymiwallet.com/index.php/How-It-Works | referrer: none
INFO - 2026-03-27 13:49:33 --> [REQ_ID=f7b323bcc4bb] [PERF] Execution time=0.184219
DEBUG - 2026-03-27 13:51:22 --> [REQ_ID=fc78561e64c3] [REQUEST][START] HEAD /
DEBUG - 2026-03-27 13:51:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-27 13:51:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-27 13:51:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-27 13:51:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-27 13:51:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-27 13:56:22 --> [REQ_ID=b67e07ed29cd] [REQUEST][START] HEAD /
DEBUG - 2026-03-27 13:56:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-27 13:56:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-27 13:56:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-27 13:56:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-27 13:56:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-27 14:00:01 --> [REQ_ID=fb5e3269c470] [REQUEST][START] GET /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-27 14:00:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-27 14:00:01 --> [REQ_ID=fb5e3269c470] [FILTER_BEFORE] /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-27 14:00:01 --> [REQ_ID=fb5e3269c470] [ROUTE] Controller=\App\Modules\Management\Controllers\ManagementAPIController Method=Run_CRON_Tasks
DEBUG - 2026-03-27 14:00:01 --> [REQ_ID=fb5e3269c470] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-27 14:00:01 --> [REQ_ID=fb5e3269c470] [REQUEST][END]
INFO - 2026-03-27 14:00:01 --> [REQ_ID=fb5e3269c470] [PERF] Execution time=0.052090
DEBUG - 2026-03-27 14:01:22 --> [REQ_ID=96b411c2abed] [REQUEST][START] HEAD /
DEBUG - 2026-03-27 14:01:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-27 14:01:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-27 14:01:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-27 14:01:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-27 14:01:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-27 14:06:22 --> [REQ_ID=aca0beb0906a] [REQUEST][START] HEAD /
DEBUG - 2026-03-27 14:06:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-27 14:06:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-27 14:06:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-27 14:06:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-27 14:06:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-27 14:11:22 --> [REQ_ID=3f0ed24de9c8] [REQUEST][START] HEAD /
DEBUG - 2026-03-27 14:11:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-27 14:11:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-27 14:11:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-27 14:11:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-27 14:11:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-27 14:15:01 --> [REQ_ID=a581879c03eb] [REQUEST][START] GET /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-27 14:15:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-27 14:15:01 --> [REQ_ID=a581879c03eb] [FILTER_BEFORE] /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-27 14:15:01 --> [REQ_ID=a581879c03eb] [ROUTE] Controller=\App\Modules\APIs\Controllers\AlertsAPIController Method=fetchEmailAlerts
DEBUG - 2026-03-27 14:15:01 --> [REQ_ID=a581879c03eb] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-27 14:15:01 --> [REQ_ID=a581879c03eb] [REQUEST][END]
INFO - 2026-03-27 14:15:01 --> [REQ_ID=a581879c03eb] [PERF] Execution time=0.045544
DEBUG - 2026-03-27 14:16:22 --> [REQ_ID=e02521a7472f] [REQUEST][START] HEAD /
DEBUG - 2026-03-27 14:16:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-27 14:16:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-27 14:16:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-27 14:16:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-27 14:16:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-27 14:21:22 --> [REQ_ID=b6cdc15924e3] [REQUEST][START] HEAD /
DEBUG - 2026-03-27 14:21:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-27 14:21:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-27 14:21:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-27 14:21:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-27 14:21:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-27 14:25:22 --> [REQ_ID=8d97c6bfbdd4] [REQUEST][START] GET /index.php/Projects
DEBUG - 2026-03-27 14:25:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-27 14:25:22 --> [REQ_ID=8d97c6bfbdd4] [REQUEST][END]
INFO - 2026-03-27 14:25:22 --> [REQ_ID=8d97c6bfbdd4] [PERF] Execution time=0.042271
DEBUG - 2026-03-27 14:25:43 --> [REQ_ID=4eef33f47e03] [REQUEST][START] GET /index.php/Blog/News-And-Updates/Integrating-With-Plaid
DEBUG - 2026-03-27 14:25:43 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-27 14:25:43 --> [REQ_ID=4eef33f47e03] [REQUEST][END]
INFO - 2026-03-27 14:25:43 --> [REQ_ID=4eef33f47e03] [PERF] Execution time=0.011647
DEBUG - 2026-03-27 14:26:22 --> [REQ_ID=b7cea3833293] [REQUEST][START] HEAD /
DEBUG - 2026-03-27 14:26:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-27 14:26:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-27 14:26:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-27 14:26:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-27 14:26:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-27 14:31:22 --> [REQ_ID=77ae7fba3cc4] [REQUEST][START] HEAD /
DEBUG - 2026-03-27 14:31:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-27 14:31:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-27 14:31:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-27 14:31:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-27 14:31:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-27 14:36:22 --> [REQ_ID=4b6e3e9591e9] [REQUEST][START] HEAD /
DEBUG - 2026-03-27 14:36:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-27 14:36:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-27 14:36:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-27 14:36:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-27 14:36:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-27 14:37:46 --> [REQ_ID=cd3e3ec57548] [REQUEST][START] GET /
DEBUG - 2026-03-27 14:37:46 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-27 14:37:46 --> [REQ_ID=cd3e3ec57548] [FILTER_BEFORE] /
DEBUG - 2026-03-27 14:37:46 --> [REQ_ID=cd3e3ec57548] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-27 14:37:46 --> [REQ_ID=cd3e3ec57548] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-27 14:37:46 --> [CSRF] token name=csrf_test_name hash=e12a38014d48f8e79052a86beef3e9c2
DEBUG - 2026-03-27 14:37:46 --> [REQ_ID=a76e932948f0] [INIT] App\Controllers\Home::GET
INFO - 2026-03-27 14:37:46 --> [REQ_ID=a76e932948f0] [MEMORY][controller-start] 6291456
INFO - 2026-03-27 14:37:46 --> [REQ_ID=a76e932948f0] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-27 14:37:46 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-27 14:37:47 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-03-27 14:37:47 --> [REQ_ID=a76e932948f0] [VIEW_RENDER] themes/public/home
INFO - 2026-03-27 14:37:47 --> [REQ_ID=a76e932948f0] [MEMORY][commonData:start] 10485760
INFO - 2026-03-27 14:37:47 --> themesMemory usage: 10485760
DEBUG - 2026-03-27 14:37:47 --> [MetaService] slug= pageName=Home cacheHit= path=DB
DEBUG - 2026-03-27 14:37:47 --> [REQ_ID=cd3e3ec57548] [FILTER_AFTER]
DEBUG - 2026-03-27 14:37:47 --> [REQ_ID=cd3e3ec57548] [LIFECYCLE][END] status=200 duration_ms=672.13 memory_delta=4194304
INFO - 2026-03-27 14:37:47 --> [REQ_ID=a76e932948f0] [PERF] Execution time=0.670058
DEBUG - 2026-03-27 14:37:47 --> [REQ_ID=cd3e3ec57548] [REQUEST][END]
INFO - 2026-03-27 14:37:47 --> [REQ_ID=cd3e3ec57548] [PERF] Execution time=0.711937
DEBUG - 2026-03-27 14:41:22 --> [REQ_ID=3b013c5f46df] [REQUEST][START] HEAD /
DEBUG - 2026-03-27 14:41:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-27 14:41:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-27 14:41:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-27 14:41:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-27 14:41:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-27 14:46:22 --> [REQ_ID=5e90666dd5c9] [REQUEST][START] HEAD /
DEBUG - 2026-03-27 14:46:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-27 14:46:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-27 14:46:23 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-27 14:46:23 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-27 14:46:23 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-27 14:51:22 --> [REQ_ID=8fc6b4777208] [REQUEST][START] HEAD /
DEBUG - 2026-03-27 14:51:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-27 14:51:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-27 14:51:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-27 14:51:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-27 14:51:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-27 14:56:22 --> [REQ_ID=48ea80a00c65] [REQUEST][START] HEAD /
DEBUG - 2026-03-27 14:56:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-27 14:56:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-27 14:56:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-27 14:56:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-27 14:56:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-27 15:00:02 --> [REQ_ID=072dc188bdae] [REQUEST][START] GET /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-27 15:00:02 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-27 15:00:02 --> [REQ_ID=072dc188bdae] [FILTER_BEFORE] /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-27 15:00:02 --> [REQ_ID=072dc188bdae] [ROUTE] Controller=\App\Modules\Management\Controllers\ManagementAPIController Method=Run_CRON_Tasks
DEBUG - 2026-03-27 15:00:02 --> [REQ_ID=072dc188bdae] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-27 15:00:02 --> [REQ_ID=072dc188bdae] [REQUEST][END]
INFO - 2026-03-27 15:00:02 --> [REQ_ID=072dc188bdae] [PERF] Execution time=0.048831
DEBUG - 2026-03-27 15:01:22 --> [REQ_ID=6a018383d480] [REQUEST][START] HEAD /
DEBUG - 2026-03-27 15:01:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-27 15:01:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-27 15:01:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-27 15:01:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-27 15:01:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-27 15:06:22 --> [REQ_ID=a06194f13318] [REQUEST][START] HEAD /
DEBUG - 2026-03-27 15:06:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-27 15:06:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-27 15:06:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-27 15:06:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-27 15:06:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-27 15:11:22 --> [REQ_ID=6a24eaea97a8] [REQUEST][START] HEAD /
DEBUG - 2026-03-27 15:11:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-27 15:11:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-27 15:11:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-27 15:11:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-27 15:11:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-27 15:15:01 --> [REQ_ID=c7084fef52ba] [REQUEST][START] GET /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-27 15:15:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-27 15:15:01 --> [REQ_ID=c7084fef52ba] [FILTER_BEFORE] /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-27 15:15:01 --> [REQ_ID=c7084fef52ba] [ROUTE] Controller=\App\Modules\APIs\Controllers\AlertsAPIController Method=fetchEmailAlerts
DEBUG - 2026-03-27 15:15:01 --> [REQ_ID=c7084fef52ba] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-27 15:15:01 --> [REQ_ID=c7084fef52ba] [REQUEST][END]
INFO - 2026-03-27 15:15:01 --> [REQ_ID=c7084fef52ba] [PERF] Execution time=0.047183
DEBUG - 2026-03-27 15:16:22 --> [REQ_ID=1ac008526ff6] [REQUEST][START] HEAD /
DEBUG - 2026-03-27 15:16:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-27 15:16:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-27 15:16:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-27 15:16:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-27 15:16:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-27 15:19:17 --> [REQ_ID=047bd3729764] [REQUEST][START] GET /
DEBUG - 2026-03-27 15:19:17 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-27 15:19:17 --> [REQ_ID=047bd3729764] [FILTER_BEFORE] /
DEBUG - 2026-03-27 15:19:17 --> [REQ_ID=047bd3729764] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-27 15:19:17 --> [REQ_ID=047bd3729764] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-27 15:19:17 --> [CSRF] token name=csrf_test_name hash=00d1f0f7a0f6fd3f19a9e281dd0c9f85
DEBUG - 2026-03-27 15:19:17 --> [REQ_ID=c17b4c393e5f] [INIT] App\Controllers\Home::GET
INFO - 2026-03-27 15:19:17 --> [REQ_ID=c17b4c393e5f] [MEMORY][controller-start] 6291456
INFO - 2026-03-27 15:19:17 --> [REQ_ID=c17b4c393e5f] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-27 15:19:17 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-27 15:19:18 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-03-27 15:19:18 --> [REQ_ID=c17b4c393e5f] [VIEW_RENDER] themes/public/home
INFO - 2026-03-27 15:19:18 --> [REQ_ID=c17b4c393e5f] [MEMORY][commonData:start] 10485760
INFO - 2026-03-27 15:19:18 --> themesMemory usage: 10485760
DEBUG - 2026-03-27 15:19:18 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-27 15:19:18 --> [REQ_ID=047bd3729764] [FILTER_AFTER]
DEBUG - 2026-03-27 15:19:18 --> [REQ_ID=047bd3729764] [LIFECYCLE][END] status=200 duration_ms=649.90 memory_delta=4194304
INFO - 2026-03-27 15:19:18 --> [REQ_ID=c17b4c393e5f] [PERF] Execution time=0.648014
DEBUG - 2026-03-27 15:19:18 --> [REQ_ID=047bd3729764] [REQUEST][END]
INFO - 2026-03-27 15:19:18 --> [REQ_ID=047bd3729764] [PERF] Execution time=0.688838
DEBUG - 2026-03-27 15:21:22 --> [REQ_ID=38eb98995f73] [REQUEST][START] HEAD /
DEBUG - 2026-03-27 15:21:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-27 15:21:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-27 15:21:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-27 15:21:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-27 15:21:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-27 15:24:22 --> [REQ_ID=7be05bc2035d] [REQUEST][START] GET /
DEBUG - 2026-03-27 15:24:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-27 15:24:22 --> [REQ_ID=7be05bc2035d] [FILTER_BEFORE] /
DEBUG - 2026-03-27 15:24:22 --> [REQ_ID=7be05bc2035d] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-27 15:24:22 --> [REQ_ID=7be05bc2035d] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-27 15:24:22 --> [CSRF] token name=csrf_test_name hash=b65241211c71ecf60006639f4139a324
DEBUG - 2026-03-27 15:24:22 --> [REQ_ID=a4e167e4ecd3] [INIT] App\Controllers\Home::GET
INFO - 2026-03-27 15:24:22 --> [REQ_ID=a4e167e4ecd3] [MEMORY][controller-start] 6291456
INFO - 2026-03-27 15:24:22 --> [REQ_ID=a4e167e4ecd3] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-27 15:24:22 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-27 15:24:22 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
DEBUG - 2026-03-27 15:24:22 --> [REQ_ID=a4e167e4ecd3] [VIEW_RENDER] themes/public/home
INFO - 2026-03-27 15:24:22 --> [REQ_ID=a4e167e4ecd3] [MEMORY][commonData:start] 10485760
INFO - 2026-03-27 15:24:22 --> themesMemory usage: 10485760
DEBUG - 2026-03-27 15:24:22 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-27 15:24:22 --> [REQ_ID=7be05bc2035d] [FILTER_AFTER]
DEBUG - 2026-03-27 15:24:22 --> [REQ_ID=7be05bc2035d] [LIFECYCLE][END] status=200 duration_ms=550.89 memory_delta=4194304
INFO - 2026-03-27 15:24:22 --> [REQ_ID=a4e167e4ecd3] [PERF] Execution time=0.549017
DEBUG - 2026-03-27 15:24:22 --> [REQ_ID=7be05bc2035d] [REQUEST][END]
INFO - 2026-03-27 15:24:22 --> [REQ_ID=7be05bc2035d] [PERF] Execution time=0.589857
DEBUG - 2026-03-27 15:26:22 --> [REQ_ID=7ee0134f39e0] [REQUEST][START] HEAD /
DEBUG - 2026-03-27 15:26:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-27 15:26:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-27 15:26:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-27 15:26:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-27 15:26:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-27 15:31:02 --> [REQ_ID=83c9656254de] [REQUEST][START] GET /index.php/Projects/Fund
DEBUG - 2026-03-27 15:31:02 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-27 15:31:02 --> [REQ_ID=83c9656254de] [FILTER_BEFORE] /index.php/Projects/Fund
DEBUG - 2026-03-27 15:31:02 --> [REQ_ID=83c9656254de] [ROUTE] Controller=\App\Modules\User\Controllers\ProjectsController Method=fund
DEBUG - 2026-03-27 15:31:02 --> [REQ_ID=83c9656254de] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Projects/Fund
DEBUG - 2026-03-27 15:31:02 --> [CSRF] token name=csrf_test_name hash=f13ffdb3c101d6984d164da5ae883d1c
DEBUG - 2026-03-27 15:31:02 --> [REQ_ID=bdb6e13e9bb5] [INIT] App\Modules\User\Controllers\ProjectsController::GET
INFO - 2026-03-27 15:31:02 --> [REQ_ID=bdb6e13e9bb5] [MEMORY][controller-start] 6291456
DEBUG - 2026-03-27 15:31:02 --> [REQ_ID=bdb6e13e9bb5] [METHOD_ENTRY] fund
DEBUG - 2026-03-27 15:31:02 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-27 15:31:02 --> [SERVICE] App\Services\BudgetService ::setUserId
INFO - 2026-03-27 15:31:02 --> [REQ_ID=bdb6e13e9bb5] [PERF] Execution time=0.093927
DEBUG - 2026-03-27 15:31:04 --> [REQ_ID=0098473d3f1f] [REQUEST][START] GET /index.php/Projects/Fund
DEBUG - 2026-03-27 15:31:04 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-27 15:31:04 --> [REQ_ID=0098473d3f1f] [FILTER_BEFORE] /index.php/Projects/Fund
DEBUG - 2026-03-27 15:31:04 --> [REQ_ID=0098473d3f1f] [ROUTE] Controller=\App\Modules\User\Controllers\ProjectsController Method=fund
DEBUG - 2026-03-27 15:31:04 --> [REQ_ID=0098473d3f1f] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Projects/Fund
DEBUG - 2026-03-27 15:31:04 --> [CSRF] token name=csrf_test_name hash=9496086f9291d0492059559d78a582e6
DEBUG - 2026-03-27 15:31:04 --> [REQ_ID=5c8b40e69ee8] [INIT] App\Modules\User\Controllers\ProjectsController::GET
INFO - 2026-03-27 15:31:04 --> [REQ_ID=5c8b40e69ee8] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-27 15:31:04 --> [REQ_ID=5c8b40e69ee8] [METHOD_ENTRY] fund
DEBUG - 2026-03-27 15:31:04 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-27 15:31:04 --> [SERVICE] App\Services\BudgetService ::setUserId
INFO - 2026-03-27 15:31:04 --> [REQ_ID=5c8b40e69ee8] [PERF] Execution time=0.021138
DEBUG - 2026-03-27 15:31:22 --> [REQ_ID=f148da804309] [REQUEST][START] HEAD /
DEBUG - 2026-03-27 15:31:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-27 15:31:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-27 15:31:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-27 15:31:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-27 15:31:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-27 15:36:22 --> [REQ_ID=7d9c76f89769] [REQUEST][START] HEAD /
DEBUG - 2026-03-27 15:36:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-27 15:36:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-27 15:36:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-27 15:36:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-27 15:36:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-27 15:41:22 --> [REQ_ID=03813bde3a81] [REQUEST][START] HEAD /
DEBUG - 2026-03-27 15:41:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-27 15:41:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-27 15:41:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-27 15:41:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-27 15:41:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-27 15:46:22 --> [REQ_ID=76d94810e2c5] [REQUEST][START] HEAD /
DEBUG - 2026-03-27 15:46:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-27 15:46:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-27 15:46:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-27 15:46:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-27 15:46:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-27 15:51:22 --> [REQ_ID=dd7ac027b482] [REQUEST][START] HEAD /
DEBUG - 2026-03-27 15:51:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-27 15:51:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-27 15:51:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-27 15:51:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-27 15:51:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-27 15:56:22 --> [REQ_ID=aee60e3487ab] [REQUEST][START] HEAD /
DEBUG - 2026-03-27 15:56:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-27 15:56:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-27 15:56:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-27 15:56:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-27 15:56:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-27 16:00:02 --> [REQ_ID=b08abfab7e6b] [REQUEST][START] GET /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-27 16:00:02 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-27 16:00:02 --> [REQ_ID=b08abfab7e6b] [FILTER_BEFORE] /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-27 16:00:02 --> [REQ_ID=b08abfab7e6b] [ROUTE] Controller=\App\Modules\Management\Controllers\ManagementAPIController Method=Run_CRON_Tasks
DEBUG - 2026-03-27 16:00:02 --> [REQ_ID=b08abfab7e6b] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-27 16:00:02 --> [REQ_ID=b08abfab7e6b] [REQUEST][END]
INFO - 2026-03-27 16:00:02 --> [REQ_ID=b08abfab7e6b] [PERF] Execution time=0.046623
DEBUG - 2026-03-27 16:01:22 --> [REQ_ID=420a18612168] [REQUEST][START] HEAD /
DEBUG - 2026-03-27 16:01:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-27 16:01:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-27 16:01:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-27 16:01:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-27 16:01:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-27 16:06:22 --> [REQ_ID=c26a4f1555d3] [REQUEST][START] HEAD /
DEBUG - 2026-03-27 16:06:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-27 16:06:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-27 16:06:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-27 16:06:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-27 16:06:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-27 16:11:22 --> [REQ_ID=92f169346254] [REQUEST][START] HEAD /
DEBUG - 2026-03-27 16:11:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-27 16:11:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-27 16:11:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-27 16:11:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-27 16:11:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-27 16:15:01 --> [REQ_ID=4b8d5ff61d82] [REQUEST][START] GET /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-27 16:15:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-27 16:15:01 --> [REQ_ID=4b8d5ff61d82] [FILTER_BEFORE] /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-27 16:15:01 --> [REQ_ID=4b8d5ff61d82] [ROUTE] Controller=\App\Modules\APIs\Controllers\AlertsAPIController Method=fetchEmailAlerts
DEBUG - 2026-03-27 16:15:01 --> [REQ_ID=4b8d5ff61d82] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-27 16:15:01 --> [REQ_ID=4b8d5ff61d82] [REQUEST][END]
INFO - 2026-03-27 16:15:01 --> [REQ_ID=4b8d5ff61d82] [PERF] Execution time=0.048252
DEBUG - 2026-03-27 16:16:22 --> [REQ_ID=37b11c352c2f] [REQUEST][START] HEAD /
DEBUG - 2026-03-27 16:16:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-27 16:16:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-27 16:16:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-27 16:16:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-27 16:16:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-27 16:21:22 --> [REQ_ID=17aaa94e95f4] [REQUEST][START] HEAD /
DEBUG - 2026-03-27 16:21:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-27 16:21:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-27 16:21:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-27 16:21:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-27 16:21:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-27 16:23:14 --> [REQ_ID=7b0ef2f0c1a5] [REQUEST][START] GET /index.php/Apex/Referral
DEBUG - 2026-03-27 16:23:14 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-27 16:23:14 --> [REQ_ID=7b0ef2f0c1a5] [REQUEST][END]
INFO - 2026-03-27 16:23:14 --> [REQ_ID=7b0ef2f0c1a5] [PERF] Execution time=0.043360
DEBUG - 2026-03-27 16:26:22 --> [REQ_ID=488df920dadc] [REQUEST][START] HEAD /
DEBUG - 2026-03-27 16:26:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-27 16:26:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-27 16:26:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-27 16:26:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-27 16:26:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-27 16:31:22 --> [REQ_ID=05e84b06e367] [REQUEST][START] HEAD /
DEBUG - 2026-03-27 16:31:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-27 16:31:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-27 16:31:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-27 16:31:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-27 16:31:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-27 16:36:22 --> [REQ_ID=6abad874ca01] [REQUEST][START] HEAD /
DEBUG - 2026-03-27 16:36:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-27 16:36:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-27 16:36:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-27 16:36:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-27 16:36:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-27 16:40:14 --> [REQ_ID=26603b7925c5] [REQUEST][START] GET /
DEBUG - 2026-03-27 16:40:14 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-27 16:40:14 --> [REQ_ID=26603b7925c5] [FILTER_BEFORE] /
DEBUG - 2026-03-27 16:40:14 --> [REQ_ID=26603b7925c5] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-27 16:40:14 --> [REQ_ID=26603b7925c5] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-27 16:40:14 --> [CSRF] token name=csrf_test_name hash=a2ad154371bb4dcc20e33e951ee6fc95
DEBUG - 2026-03-27 16:40:14 --> [REQ_ID=9868f45b1860] [INIT] App\Controllers\Home::GET
INFO - 2026-03-27 16:40:14 --> [REQ_ID=9868f45b1860] [MEMORY][controller-start] 6291456
INFO - 2026-03-27 16:40:14 --> [REQ_ID=9868f45b1860] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-27 16:40:14 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-27 16:40:15 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-03-27 16:40:15 --> [REQ_ID=9868f45b1860] [VIEW_RENDER] themes/public/home
INFO - 2026-03-27 16:40:15 --> [REQ_ID=9868f45b1860] [MEMORY][commonData:start] 10485760
INFO - 2026-03-27 16:40:15 --> themesMemory usage: 10485760
DEBUG - 2026-03-27 16:40:15 --> [MetaService] slug= pageName=Home cacheHit= path=DB
DEBUG - 2026-03-27 16:40:15 --> [REQ_ID=26603b7925c5] [FILTER_AFTER]
DEBUG - 2026-03-27 16:40:15 --> [REQ_ID=26603b7925c5] [LIFECYCLE][END] status=200 duration_ms=664.21 memory_delta=4194304
INFO - 2026-03-27 16:40:15 --> [REQ_ID=9868f45b1860] [PERF] Execution time=0.662043
DEBUG - 2026-03-27 16:40:15 --> [REQ_ID=26603b7925c5] [REQUEST][END]
INFO - 2026-03-27 16:40:15 --> [REQ_ID=26603b7925c5] [PERF] Execution time=0.704776
DEBUG - 2026-03-27 16:41:22 --> [REQ_ID=9efc3b0d689c] [REQUEST][START] HEAD /
DEBUG - 2026-03-27 16:41:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-27 16:41:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-27 16:41:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-27 16:41:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-27 16:41:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-27 16:46:22 --> [REQ_ID=97d532268123] [REQUEST][START] HEAD /
DEBUG - 2026-03-27 16:46:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-27 16:46:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-27 16:46:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-27 16:46:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-27 16:46:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-27 16:51:22 --> [REQ_ID=a01c3734861d] [REQUEST][START] HEAD /
DEBUG - 2026-03-27 16:51:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-27 16:51:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-27 16:51:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-27 16:51:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-27 16:51:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-27 16:56:22 --> [REQ_ID=09946643adc8] [REQUEST][START] HEAD /
DEBUG - 2026-03-27 16:56:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-27 16:56:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-27 16:56:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-27 16:56:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-27 16:56:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-27 17:00:01 --> [REQ_ID=f2ac2cfcb43a] [REQUEST][START] GET /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-27 17:00:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-27 17:00:01 --> [REQ_ID=f2ac2cfcb43a] [FILTER_BEFORE] /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-27 17:00:01 --> [REQ_ID=f2ac2cfcb43a] [ROUTE] Controller=\App\Modules\Management\Controllers\ManagementAPIController Method=Run_CRON_Tasks
DEBUG - 2026-03-27 17:00:01 --> [REQ_ID=f2ac2cfcb43a] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-27 17:00:01 --> [REQ_ID=f2ac2cfcb43a] [REQUEST][END]
INFO - 2026-03-27 17:00:01 --> [REQ_ID=f2ac2cfcb43a] [PERF] Execution time=0.043573
DEBUG - 2026-03-27 17:01:22 --> [REQ_ID=4106764440a9] [REQUEST][START] HEAD /
DEBUG - 2026-03-27 17:01:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-27 17:01:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-27 17:01:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-27 17:01:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-27 17:01:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-27 17:06:22 --> [REQ_ID=0da082ceb5ef] [REQUEST][START] HEAD /
DEBUG - 2026-03-27 17:06:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-27 17:06:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-27 17:06:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-27 17:06:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-27 17:06:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-27 17:09:51 --> [REQ_ID=e4b82ca52cc5] [REQUEST][START] GET /
DEBUG - 2026-03-27 17:09:51 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-27 17:09:51 --> [REQ_ID=e4b82ca52cc5] [FILTER_BEFORE] /
DEBUG - 2026-03-27 17:09:51 --> [REQ_ID=e4b82ca52cc5] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-27 17:09:51 --> [REQ_ID=e4b82ca52cc5] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-27 17:09:51 --> [CSRF] token name=csrf_test_name hash=7d7ab10bb7c4eb2c22be3b781ec4139f
DEBUG - 2026-03-27 17:09:51 --> [REQ_ID=9a1e08a48a7f] [INIT] App\Controllers\Home::GET
INFO - 2026-03-27 17:09:51 --> [REQ_ID=9a1e08a48a7f] [MEMORY][controller-start] 6291456
INFO - 2026-03-27 17:09:51 --> [REQ_ID=9a1e08a48a7f] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-27 17:09:51 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-27 17:09:52 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-03-27 17:09:52 --> [REQ_ID=9a1e08a48a7f] [VIEW_RENDER] themes/public/home
INFO - 2026-03-27 17:09:52 --> [REQ_ID=9a1e08a48a7f] [MEMORY][commonData:start] 10485760
INFO - 2026-03-27 17:09:52 --> themesMemory usage: 10485760
DEBUG - 2026-03-27 17:09:52 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-27 17:09:52 --> [REQ_ID=e4b82ca52cc5] [FILTER_AFTER]
DEBUG - 2026-03-27 17:09:52 --> [REQ_ID=e4b82ca52cc5] [LIFECYCLE][END] status=200 duration_ms=874.19 memory_delta=4194304
INFO - 2026-03-27 17:09:52 --> [REQ_ID=9a1e08a48a7f] [PERF] Execution time=0.872233
DEBUG - 2026-03-27 17:09:52 --> [REQ_ID=e4b82ca52cc5] [REQUEST][END]
INFO - 2026-03-27 17:09:52 --> [REQ_ID=e4b82ca52cc5] [PERF] Execution time=0.914485
DEBUG - 2026-03-27 17:11:22 --> [REQ_ID=621684fe6fd9] [REQUEST][START] HEAD /
DEBUG - 2026-03-27 17:11:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-27 17:11:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-27 17:11:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-27 17:11:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-27 17:11:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-27 17:15:01 --> [REQ_ID=6ecdd1e2af59] [REQUEST][START] GET /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-27 17:15:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-27 17:15:01 --> [REQ_ID=6ecdd1e2af59] [FILTER_BEFORE] /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-27 17:15:01 --> [REQ_ID=6ecdd1e2af59] [ROUTE] Controller=\App\Modules\APIs\Controllers\AlertsAPIController Method=fetchEmailAlerts
DEBUG - 2026-03-27 17:15:01 --> [REQ_ID=6ecdd1e2af59] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-27 17:15:01 --> [REQ_ID=6ecdd1e2af59] [REQUEST][END]
INFO - 2026-03-27 17:15:01 --> [REQ_ID=6ecdd1e2af59] [PERF] Execution time=0.046600
DEBUG - 2026-03-27 17:16:22 --> [REQ_ID=1ca34112382e] [REQUEST][START] HEAD /
DEBUG - 2026-03-27 17:16:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-27 17:16:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-27 17:16:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-27 17:16:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-27 17:16:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-27 17:21:11 --> [REQ_ID=0b476602ca79] [REQUEST][START] GET /
DEBUG - 2026-03-27 17:21:11 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-27 17:21:11 --> [REQ_ID=0b476602ca79] [FILTER_BEFORE] /
DEBUG - 2026-03-27 17:21:11 --> [REQ_ID=0b476602ca79] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-27 17:21:11 --> [REQ_ID=0b476602ca79] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-27 17:21:11 --> [CSRF] token name=csrf_test_name hash=2ceb56d74b7e1bf049801cf09317ea98
DEBUG - 2026-03-27 17:21:11 --> [REQ_ID=47f8fb59ed8b] [INIT] App\Controllers\Home::GET
INFO - 2026-03-27 17:21:11 --> [REQ_ID=47f8fb59ed8b] [MEMORY][controller-start] 6291456
INFO - 2026-03-27 17:21:12 --> [REQ_ID=47f8fb59ed8b] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-27 17:21:12 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-27 17:21:12 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
DEBUG - 2026-03-27 17:21:12 --> [REQ_ID=47f8fb59ed8b] [VIEW_RENDER] themes/public/home
INFO - 2026-03-27 17:21:12 --> [REQ_ID=47f8fb59ed8b] [MEMORY][commonData:start] 10485760
INFO - 2026-03-27 17:21:12 --> themesMemory usage: 10485760
DEBUG - 2026-03-27 17:21:12 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-27 17:21:12 --> [REQ_ID=0b476602ca79] [FILTER_AFTER]
DEBUG - 2026-03-27 17:21:12 --> [REQ_ID=0b476602ca79] [LIFECYCLE][END] status=200 duration_ms=816.28 memory_delta=4194304
INFO - 2026-03-27 17:21:12 --> [REQ_ID=47f8fb59ed8b] [PERF] Execution time=0.814391
DEBUG - 2026-03-27 17:21:12 --> [REQ_ID=0b476602ca79] [REQUEST][END]
INFO - 2026-03-27 17:21:12 --> [REQ_ID=0b476602ca79] [PERF] Execution time=0.854308
DEBUG - 2026-03-27 17:21:22 --> [REQ_ID=06db73454514] [REQUEST][START] HEAD /
DEBUG - 2026-03-27 17:21:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-27 17:21:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-27 17:21:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-27 17:21:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-27 17:21:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-27 17:23:15 --> [REQ_ID=88818f523c96] [REQUEST][START] GET /index.php/Dashboard
DEBUG - 2026-03-27 17:23:15 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-27 17:23:15 --> [REQ_ID=88818f523c96] [FILTER_BEFORE] /index.php/Dashboard
DEBUG - 2026-03-27 17:23:15 --> [REQ_ID=88818f523c96] [ROUTE] Controller=\App\Modules\User\Controllers\DashboardController Method=index
DEBUG - 2026-03-27 17:23:15 --> [REQ_ID=88818f523c96] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Dashboard
DEBUG - 2026-03-27 17:23:15 --> [CSRF] token name=csrf_test_name hash=204676cff3fb81e0a21e5b780ba692e6
DEBUG - 2026-03-27 17:23:15 --> [REQ_ID=c2666ff64b2a] [INIT] App\Modules\User\Controllers\DashboardController::GET
INFO - 2026-03-27 17:23:15 --> [REQ_ID=c2666ff64b2a] [MEMORY][controller-start] 6291456
DEBUG - 2026-03-27 17:23:15 --> [REQ_ID=c2666ff64b2a] [METHOD_ENTRY] index
DEBUG - 2026-03-27 17:23:15 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-27 17:23:15 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-27 17:23:15 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-27 17:23:15 --> MyMIMarketing: Pscrape library not installed; Google search scraping will use fallback.
DEBUG - 2026-03-27 17:23:15 --> [DASHBOARD] Enter
DEBUG - 2026-03-27 17:23:15 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-27 17:23:15 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-27 17:23:15 --> [SERVICE] App\Services\BudgetService ::getUserBudget
DEBUG - 2026-03-27 17:23:15 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":11758,"deleted":0}
DEBUG - 2026-03-27 17:23:15 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-27 17:23:15 --> [MODEL_WHERE] App\Models\BudgetModel KEY="created_by"
DEBUG - 2026-03-27 17:23:15 --> [MODEL_WHERE] App\Models\BudgetModel KEY="account_type"
DEBUG - 2026-03-27 17:23:15 --> [MODEL_WHERE] App\Models\BudgetModel KEY="designated_date >="
DEBUG - 2026-03-27 17:23:15 --> [MODEL_WHERE] App\Models\BudgetModel KEY="designated_date <="
DEBUG - 2026-03-27 17:23:15 --> [MODEL_WHERE] App\Models\BudgetModel KEY="year"
DEBUG - 2026-03-27 17:23:15 --> [MODEL_WHERE] App\Models\BudgetModel KEY="month <="
DEBUG - 2026-03-27 17:23:15 --> [MODEL_WHERE] App\Models\BudgetModel KEY="day <="
DEBUG - 2026-03-27 17:23:15 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":11758,"account_type":"Income","month":"03","year":"2026"}
DEBUG - 2026-03-27 17:23:15 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-03-27 17:23:15 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":11758,"account_type":"Income","month":"02","year":"2026"}
DEBUG - 2026-03-27 17:23:15 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-03-27 17:23:15 --> [MODEL_WHERE] App\Models\BudgetModel KEY="created_by"
DEBUG - 2026-03-27 17:23:15 --> [MODEL_WHERE] App\Models\BudgetModel KEY="account_type"
DEBUG - 2026-03-27 17:23:15 --> [MODEL_WHERE] App\Models\BudgetModel KEY="designated_date >="
DEBUG - 2026-03-27 17:23:15 --> [MODEL_WHERE] App\Models\BudgetModel KEY="designated_date <="
DEBUG - 2026-03-27 17:23:15 --> [MODEL_WHERE] App\Models\BudgetModel KEY="year"
DEBUG - 2026-03-27 17:23:15 --> [MODEL_WHERE] App\Models\BudgetModel KEY="month <="
DEBUG - 2026-03-27 17:23:15 --> [MODEL_WHERE] App\Models\BudgetModel KEY="day <="
DEBUG - 2026-03-27 17:23:15 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":11758,"account_type":"Expense","month":"03","year":"2026"}
DEBUG - 2026-03-27 17:23:15 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-03-27 17:23:15 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":11758,"account_type":"Expense","month":"02","year":"2026"}
DEBUG - 2026-03-27 17:23:15 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-03-27 17:23:15 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"status":1,"created_by":11758,"deleted":0}
DEBUG - 2026-03-27 17:23:15 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"status":1,"paid":0,"created_by":11758,"deleted":0}
DEBUG - 2026-03-27 17:23:15 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"status":1,"created_by":11758,"deleted":0}
ERROR - 2026-03-27 17:23:15 --> DashboardController::index failed to load executive summary: Call to undefined method CodeIgniter\Cache\Handlers\FileHandler::set()
DEBUG - 2026-03-27 17:23:15 --> [CACHE_MISS] mymiwallet_development_squeeze_high-risk_global_global_1f86633dd
ERROR - 2026-03-27 17:23:15 --> Unknown column 'score_total' in 'where clause'
in SYSTEMPATH/Database/MySQLi/Connection.php on line 300.
 1 SYSTEMPATH/Database/MySQLi/Connection.php(300): mysqli->query('SELECT COUNT(*) AS `numrows`
FROM `bf_squeeze_scorecards`
WHERE `score_total` >= 80
AND `as_of_datetime` >= \'2026-03-26 17:23:15\'', 0)
 2 SYSTEMPATH/Database/BaseConnection.php(769): CodeIgniter\Database\MySQLi\Connection->execute('SELECT COUNT(*) AS `numrows`
FROM `bf_squeeze_scorecards`
WHERE `score_total` >= 80
AND `as_of_datetime` >= \'2026-03-26 17:23:15\'')
 3 SYSTEMPATH/Database/BaseConnection.php(686): CodeIgniter\Database\BaseConnection->simpleQuery('SELECT COUNT(*) AS `numrows`
FROM `bf_squeeze_scorecards`
WHERE `score_total` >= 80
AND `as_of_datetime` >= \'2026-03-26 17:23:15\'')
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
DEBUG - 2026-03-27 17:23:15 --> MyMIInvestments::getSqueezeHighRiskCount failed: Unknown column 'score_total' in 'where clause'
DEBUG - 2026-03-27 17:23:15 --> 📰 Daily dashboard news window 2026-03-27 00:00:00 -> 2026-03-27 23:59:59 returned 0 rows
DEBUG - 2026-03-27 17:23:15 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-27 17:23:15 --> [SETUP] Status computed
DEBUG - 2026-03-27 17:23:15 --> [REQ_ID=c2666ff64b2a] [VIEW_RENDER] User/Dashboard/index
INFO - 2026-03-27 17:23:15 --> [REQ_ID=c2666ff64b2a] [MEMORY][commonData:start] 8388608
DEBUG - 2026-03-27 17:23:15 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-27 17:23:15 --> [MODEL_WHERE] App\Models\BudgetModel KEY="created_by"
DEBUG - 2026-03-27 17:23:15 --> [MODEL_WHERE] App\Models\BudgetModel KEY="account_type"
DEBUG - 2026-03-27 17:23:15 --> [MODEL_WHERE] App\Models\BudgetModel KEY="designated_date >="
DEBUG - 2026-03-27 17:23:15 --> [MODEL_WHERE] App\Models\BudgetModel KEY="designated_date <="
DEBUG - 2026-03-27 17:23:15 --> [MODEL_WHERE] App\Models\BudgetModel KEY="year"
DEBUG - 2026-03-27 17:23:15 --> [MODEL_WHERE] App\Models\BudgetModel KEY="month <="
DEBUG - 2026-03-27 17:23:15 --> [MODEL_WHERE] App\Models\BudgetModel KEY="day <="
DEBUG - 2026-03-27 17:23:15 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":11758,"account_type":"Income","month":"03","year":"2026"}
DEBUG - 2026-03-27 17:23:15 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-03-27 17:23:15 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":11758,"account_type":"Income","month":"02","year":"2026"}
DEBUG - 2026-03-27 17:23:15 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-03-27 17:23:15 --> [MODEL_WHERE] App\Models\BudgetModel KEY="created_by"
DEBUG - 2026-03-27 17:23:15 --> [MODEL_WHERE] App\Models\BudgetModel KEY="account_type"
DEBUG - 2026-03-27 17:23:15 --> [MODEL_WHERE] App\Models\BudgetModel KEY="designated_date >="
DEBUG - 2026-03-27 17:23:15 --> [MODEL_WHERE] App\Models\BudgetModel KEY="designated_date <="
DEBUG - 2026-03-27 17:23:15 --> [MODEL_WHERE] App\Models\BudgetModel KEY="year"
DEBUG - 2026-03-27 17:23:15 --> [MODEL_WHERE] App\Models\BudgetModel KEY="month <="
DEBUG - 2026-03-27 17:23:15 --> [MODEL_WHERE] App\Models\BudgetModel KEY="day <="
DEBUG - 2026-03-27 17:23:15 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":11758,"account_type":"Expense","month":"03","year":"2026"}
DEBUG - 2026-03-27 17:23:15 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-03-27 17:23:15 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":11758,"account_type":"Expense","month":"02","year":"2026"}
DEBUG - 2026-03-27 17:23:15 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-03-27 17:23:15 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"status":1,"created_by":11758,"deleted":0}
DEBUG - 2026-03-27 17:23:15 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"status":1,"paid":0,"created_by":11758,"deleted":0}
DEBUG - 2026-03-27 17:23:15 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-27 17:23:15 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"status":1,"created_by":11758,"deleted":0}
DEBUG - 2026-03-27 17:23:15 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"status":1,"paid":0,"created_by":11758,"deleted":0}
DEBUG - 2026-03-27 17:23:15 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":11758,"account_type":"Income","status":1,"month":"03","year":"2026"}
DEBUG - 2026-03-27 17:23:15 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-03-27 17:23:15 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":11758,"account_type":"Expense","status":1,"month":"03","year":"2026"}
DEBUG - 2026-03-27 17:23:15 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-03-27 17:23:15 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":11758,"account_type":"Investment","month":"03","year":"2026","status":1}
DEBUG - 2026-03-27 17:23:15 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-03-27 17:23:15 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":11758,"account_type":"Income","status":1,"month":"02"}
DEBUG - 2026-03-27 17:23:15 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-03-27 17:23:15 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":11758,"account_type":"Expense","status":1,"month":"02"}
DEBUG - 2026-03-27 17:23:15 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-03-27 17:23:15 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":11758,"account_type":"Investment","month":"02","year":"2026","status":1}
DEBUG - 2026-03-27 17:23:15 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-03-27 17:23:15 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":11758,"account_type":"Income","status":1,"month":"04"}
DEBUG - 2026-03-27 17:23:15 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-03-27 17:23:15 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":11758,"account_type":"Expense","status":1,"month":"04"}
DEBUG - 2026-03-27 17:23:15 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-03-27 17:23:15 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":11758,"account_type":"Investment","month":"04","year":"2026","status":1}
DEBUG - 2026-03-27 17:23:15 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-03-27 17:23:15 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":11758,"account_type":"Income","status":1,"year":"2026"}
DEBUG - 2026-03-27 17:23:15 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-03-27 17:23:15 --> [MODEL_WHERE] App\Models\BudgetModel KEY="created_by"
DEBUG - 2026-03-27 17:23:15 --> [MODEL_WHERE] App\Models\BudgetModel KEY="account_type"
DEBUG - 2026-03-27 17:23:15 --> [MODEL_WHERE] App\Models\BudgetModel KEY="status"
DEBUG - 2026-03-27 17:23:15 --> [MODEL_WHERE] App\Models\BudgetModel KEY="year"
DEBUG - 2026-03-27 17:23:15 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-03-27 17:23:15 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":11758,"account_type":"Investment","status":1}
DEBUG - 2026-03-27 17:23:15 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-03-27 17:23:15 --> [MODEL_WHERE] App\Models\BudgetModel KEY="created_by"
DEBUG - 2026-03-27 17:23:15 --> [MODEL_WHERE] App\Models\BudgetModel KEY="account_type"
DEBUG - 2026-03-27 17:23:15 --> [MODEL_WHERE] App\Models\BudgetModel KEY="status"
DEBUG - 2026-03-27 17:23:15 --> [MODEL_WHERE] App\Models\BudgetModel KEY="designated_date >="
DEBUG - 2026-03-27 17:23:15 --> [MODEL_WHERE] App\Models\BudgetModel KEY="designated_date <="
DEBUG - 2026-03-27 17:23:15 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-03-27 17:23:15 --> [MODEL_WHERE] App\Models\BudgetModel KEY="created_by"
DEBUG - 2026-03-27 17:23:15 --> [MODEL_WHERE] App\Models\BudgetModel KEY="account_type"
DEBUG - 2026-03-27 17:23:15 --> [MODEL_WHERE] App\Models\BudgetModel KEY="status"
DEBUG - 2026-03-27 17:23:15 --> [MODEL_WHERE] App\Models\BudgetModel KEY="designated_date >="
DEBUG - 2026-03-27 17:23:15 --> [MODEL_WHERE] App\Models\BudgetModel KEY="designated_date <="
DEBUG - 2026-03-27 17:23:15 --> [MODEL_FIRST] App\Models\BudgetModel
INFO - 2026-03-27 17:23:15 --> DashboardController L72 - $checkingSummary: 0
DEBUG - 2026-03-27 17:23:15 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-27 17:23:15 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-27 17:23:15 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-27 17:23:15 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-27 17:23:15 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-27 17:23:15 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-27 17:23:15 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-27 17:23:15 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-27 17:23:15 --> [SERVICE] App\Services\BudgetService ::getUserBudget
DEBUG - 2026-03-27 17:23:15 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":11758,"deleted":0}
DEBUG - 2026-03-27 17:23:15 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-27 17:23:15 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"status":1,"created_by":11758,"deleted":0}
DEBUG - 2026-03-27 17:23:15 --> [MODEL_WHERE] App\Models\BudgetModel KEY="created_by"
DEBUG - 2026-03-27 17:23:15 --> [MODEL_WHERE] App\Models\BudgetModel KEY="account_type"
DEBUG - 2026-03-27 17:23:15 --> [MODEL_WHERE] App\Models\BudgetModel KEY="designated_date >="
DEBUG - 2026-03-27 17:23:15 --> [MODEL_WHERE] App\Models\BudgetModel KEY="designated_date <="
DEBUG - 2026-03-27 17:23:15 --> [MODEL_WHERE] App\Models\BudgetModel KEY="year"
DEBUG - 2026-03-27 17:23:15 --> [MODEL_WHERE] App\Models\BudgetModel KEY="month <="
DEBUG - 2026-03-27 17:23:15 --> [MODEL_WHERE] App\Models\BudgetModel KEY="day <="
DEBUG - 2026-03-27 17:23:15 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":11758,"account_type":"Income","month":"03","year":"2026"}
DEBUG - 2026-03-27 17:23:15 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-03-27 17:23:15 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":11758,"account_type":"Income","month":"02","year":"2026"}
DEBUG - 2026-03-27 17:23:15 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-03-27 17:23:15 --> [MODEL_WHERE] App\Models\BudgetModel KEY="created_by"
DEBUG - 2026-03-27 17:23:15 --> [MODEL_WHERE] App\Models\BudgetModel KEY="account_type"
DEBUG - 2026-03-27 17:23:15 --> [MODEL_WHERE] App\Models\BudgetModel KEY="designated_date >="
DEBUG - 2026-03-27 17:23:15 --> [MODEL_WHERE] App\Models\BudgetModel KEY="designated_date <="
DEBUG - 2026-03-27 17:23:15 --> [MODEL_WHERE] App\Models\BudgetModel KEY="year"
DEBUG - 2026-03-27 17:23:15 --> [MODEL_WHERE] App\Models\BudgetModel KEY="month <="
DEBUG - 2026-03-27 17:23:15 --> [MODEL_WHERE] App\Models\BudgetModel KEY="day <="
DEBUG - 2026-03-27 17:23:15 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":11758,"account_type":"Expense","month":"03","year":"2026"}
DEBUG - 2026-03-27 17:23:15 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-03-27 17:23:15 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":11758,"account_type":"Expense","month":"02","year":"2026"}
DEBUG - 2026-03-27 17:23:15 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-03-27 17:23:15 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"status":1,"created_by":11758,"deleted":0}
DEBUG - 2026-03-27 17:23:15 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"status":1,"paid":0,"created_by":11758,"deleted":0}
INFO - 2026-03-27 17:23:15 --> getSolanaData: invalid address param
INFO - 2026-03-27 17:23:16 --> themesMemory usage: 8388608
DEBUG - 2026-03-27 17:23:16 --> [REQ_ID=88818f523c96] [FILTER_AFTER]
DEBUG - 2026-03-27 17:23:16 --> [REQ_ID=88818f523c96] [LIFECYCLE][END] status=200 duration_ms=993.93 memory_delta=2097152
INFO - 2026-03-27 17:23:16 --> [REQ_ID=c2666ff64b2a] [PERF] Execution time=0.818719
DEBUG - 2026-03-27 17:23:16 --> [REQ_ID=88818f523c96] [REQUEST][END]
INFO - 2026-03-27 17:23:16 --> [REQ_ID=88818f523c96] [PERF] Execution time=1.040004
DEBUG - 2026-03-27 17:23:16 --> [REQ_ID=8f7faa9b032e] [REQUEST][START] GET /index.php/API/Investments/getForecastAccuracySummary?window=7d
DEBUG - 2026-03-27 17:23:16 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-27 17:23:16 --> [REQ_ID=8f7faa9b032e] [FILTER_BEFORE] /index.php/API/Investments/getForecastAccuracySummary?window=7d
DEBUG - 2026-03-27 17:23:16 --> [REQ_ID=8f7faa9b032e] [ROUTE] Controller=\App\Modules\APIs\Controllers\InvestmentsAPIController Method=getForecastAccuracySummary
DEBUG - 2026-03-27 17:23:16 --> [REQ_ID=8f7faa9b032e] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Investments/getForecastAccuracySummary?window=7d
DEBUG - 2026-03-27 17:23:16 --> [REQ_ID=0f5fe4997d74] [INIT] App\Modules\APIs\Controllers\InvestmentsAPIController::GET
INFO - 2026-03-27 17:23:16 --> [REQ_ID=0f5fe4997d74] [MEMORY][controller-start] 6291456
DEBUG - 2026-03-27 17:23:16 --> MyMIInvestments: no session user detected; skipping personalized hydration.
DEBUG - 2026-03-27 17:23:16 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-27 17:23:16 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-27 17:23:16 --> MyMIMarketing: Pscrape library not installed; Google search scraping will use fallback.
DEBUG - 2026-03-27 17:23:16 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-27 17:23:16 --> MyMIUser L52 - initialized (first log).
INFO - 2026-03-27 17:23:16 --> Premium entitlement guest: user_id= route=/index.php/API/Investments/getForecastAccuracySummary feature=investments.analytics tier=free status=free allowed=no reason=You must be logged in to use this feature.
WARNING - 2026-03-27 17:23:16 --> Premium access denied: feature=investments.analytics route=/index.php/API/Investments/getForecastAccuracySummary user_id= tier=free status=free
DEBUG - 2026-03-27 17:23:16 --> [REQ_ID=8f7faa9b032e] [FILTER_AFTER]
DEBUG - 2026-03-27 17:23:16 --> [REQ_ID=8f7faa9b032e] [LIFECYCLE][END] status=302 duration_ms=39.57 memory_delta=0
INFO - 2026-03-27 17:23:16 --> [REQ_ID=0f5fe4997d74] [PERF] Execution time=0.039691
DEBUG - 2026-03-27 17:23:16 --> [REQ_ID=8f7faa9b032e] [REQUEST][END]
INFO - 2026-03-27 17:23:16 --> [REQ_ID=8f7faa9b032e] [PERF] Execution time=0.055717
DEBUG - 2026-03-27 17:23:16 --> [REQ_ID=4fc13431a619] [REQUEST][START] GET /index.php/Memberships
DEBUG - 2026-03-27 17:23:16 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-27 17:23:16 --> [REQ_ID=4fc13431a619] [FILTER_BEFORE] /index.php/Memberships
DEBUG - 2026-03-27 17:23:16 --> [REQ_ID=4fc13431a619] [ROUTE] Controller=\App\Controllers\Home Method=memberships
DEBUG - 2026-03-27 17:23:16 --> [REQ_ID=4fc13431a619] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Memberships
DEBUG - 2026-03-27 17:23:16 --> [CSRF] token name=csrf_test_name hash=204676cff3fb81e0a21e5b780ba692e6
DEBUG - 2026-03-27 17:23:16 --> [REQ_ID=6c974e54c426] [INIT] App\Controllers\Home::GET
INFO - 2026-03-27 17:23:16 --> [REQ_ID=6c974e54c426] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-27 17:23:16 --> [REQ_ID=7c4053caf1ce] [REQUEST][START] GET /index.php/API/Investments/getForecastHighlights
DEBUG - 2026-03-27 17:23:16 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
INFO - 2026-03-27 17:23:16 --> [REQ_ID=6c974e54c426] [MEMORY][commonData:start] 4194304
DEBUG - 2026-03-27 17:23:16 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-27 17:23:16 --> [REQ_ID=7c4053caf1ce] [FILTER_BEFORE] /index.php/API/Investments/getForecastHighlights
DEBUG - 2026-03-27 17:23:16 --> [REQ_ID=7c4053caf1ce] [ROUTE] Controller=\App\Modules\APIs\Controllers\InvestmentsAPIController Method=getForecastHighlights
DEBUG - 2026-03-27 17:23:16 --> [REQ_ID=7c4053caf1ce] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Investments/getForecastHighlights
DEBUG - 2026-03-27 17:23:16 --> [REQ_ID=3ab5226d98f4] [INIT] App\Modules\APIs\Controllers\InvestmentsAPIController::GET
INFO - 2026-03-27 17:23:16 --> [REQ_ID=3ab5226d98f4] [MEMORY][controller-start] 6291456
DEBUG - 2026-03-27 17:23:16 --> [REQ_ID=3b8713c1f05c] [REQUEST][START] GET /index.php/API/Investments/getConfidenceHeatmap?timeframe=all&window=6h
DEBUG - 2026-03-27 17:23:16 --> [REQ_ID=e6c1a9fa2aba] [REQUEST][START] GET /index.php/API/Investments/getConfidenceHeatmap?timeframe=5m&window=60
DEBUG - 2026-03-27 17:23:16 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-27 17:23:16 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-27 17:23:16 --> MyMIInvestments: no session user detected; skipping personalized hydration.
DEBUG - 2026-03-27 17:23:16 --> [REQ_ID=3b8713c1f05c] [FILTER_BEFORE] /index.php/API/Investments/getConfidenceHeatmap?timeframe=all&window=6h
DEBUG - 2026-03-27 17:23:16 --> [REQ_ID=e6c1a9fa2aba] [FILTER_BEFORE] /index.php/API/Investments/getConfidenceHeatmap?timeframe=5m&window=60
DEBUG - 2026-03-27 17:23:16 --> [REQ_ID=e6c1a9fa2aba] [ROUTE] Controller=\App\Modules\APIs\Controllers\InvestmentsAPIController Method=getConfidenceHeatmap
DEBUG - 2026-03-27 17:23:16 --> [REQ_ID=e6c1a9fa2aba] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Investments/getConfidenceHeatmap?timeframe=5m&window=60
DEBUG - 2026-03-27 17:23:16 --> [REQ_ID=3b8713c1f05c] [ROUTE] Controller=\App\Modules\APIs\Controllers\InvestmentsAPIController Method=getConfidenceHeatmap
DEBUG - 2026-03-27 17:23:16 --> [REQ_ID=3b8713c1f05c] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Investments/getConfidenceHeatmap?timeframe=all&window=6h
DEBUG - 2026-03-27 17:23:16 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-27 17:23:16 --> [REQ_ID=fce1aaeb606d] [INIT] App\Modules\APIs\Controllers\InvestmentsAPIController::GET
INFO - 2026-03-27 17:23:16 --> [REQ_ID=fce1aaeb606d] [MEMORY][controller-start] 6291456
DEBUG - 2026-03-27 17:23:16 --> [REQ_ID=8cfd4abd9ad0] [INIT] App\Modules\APIs\Controllers\InvestmentsAPIController::GET
INFO - 2026-03-27 17:23:16 --> [REQ_ID=8cfd4abd9ad0] [MEMORY][controller-start] 6291456
DEBUG - 2026-03-27 17:23:16 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-27 17:23:16 --> [REQ_ID=924fd886607f] [REQUEST][START] GET /index.php/ops/health
DEBUG - 2026-03-27 17:23:16 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-27 17:23:16 --> MyMIInvestments: no session user detected; skipping personalized hydration.
DEBUG - 2026-03-27 17:23:16 --> MyMIInvestments: no session user detected; skipping personalized hydration.
DEBUG - 2026-03-27 17:23:16 --> MyMIMarketing: Pscrape library not installed; Google search scraping will use fallback.
DEBUG - 2026-03-27 17:23:16 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-27 17:23:16 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-27 17:23:16 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-27 17:23:16 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-27 17:23:16 --> [REQ_ID=924fd886607f] [FILTER_BEFORE] /index.php/ops/health
DEBUG - 2026-03-27 17:23:16 --> [REQ_ID=924fd886607f] [ROUTE] Controller=\App\Controllers\OpsHealthController Method=index
DEBUG - 2026-03-27 17:23:16 --> [REQ_ID=924fd886607f] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/ops/health
DEBUG - 2026-03-27 17:23:16 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-27 17:23:16 --> [CSRF] token name=csrf_test_name hash=3c597bfd895002dab924aa7408c36b1e
DEBUG - 2026-03-27 17:23:16 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-27 17:23:16 --> [REQ_ID=924fd886607f] [REQUEST][END]
INFO - 2026-03-27 17:23:16 --> [REQ_ID=924fd886607f] [PERF] Execution time=0.148284
DEBUG - 2026-03-27 17:23:16 --> MyMIMarketing: Pscrape library not installed; Google search scraping will use fallback.
DEBUG - 2026-03-27 17:23:16 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-27 17:23:16 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-27 17:23:16 --> MyMIMarketing: Pscrape library not installed; Google search scraping will use fallback.
DEBUG - 2026-03-27 17:23:16 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-27 17:23:16 --> MyMIUser L52 - initialized (first log).
INFO - 2026-03-27 17:23:16 --> Premium entitlement guest: user_id= route=/index.php/API/Investments/getConfidenceHeatmap feature=investments.analytics tier=free status=free allowed=no reason=You must be logged in to use this feature.
WARNING - 2026-03-27 17:23:16 --> Premium access denied: feature=investments.analytics route=/index.php/API/Investments/getConfidenceHeatmap user_id= tier=free status=free
DEBUG - 2026-03-27 17:23:16 --> [REQ_ID=e6c1a9fa2aba] [FILTER_AFTER]
DEBUG - 2026-03-27 17:23:16 --> [REQ_ID=e6c1a9fa2aba] [LIFECYCLE][END] status=302 duration_ms=247.62 memory_delta=2097152
INFO - 2026-03-27 17:23:16 --> [REQ_ID=8cfd4abd9ad0] [PERF] Execution time=0.244261
DEBUG - 2026-03-27 17:23:16 --> [REQ_ID=e6c1a9fa2aba] [REQUEST][END]
INFO - 2026-03-27 17:23:16 --> [REQ_ID=e6c1a9fa2aba] [PERF] Execution time=0.352099
INFO - 2026-03-27 17:23:16 --> Premium entitlement guest: user_id= route=/index.php/API/Investments/getConfidenceHeatmap feature=investments.analytics tier=free status=free allowed=no reason=You must be logged in to use this feature.
WARNING - 2026-03-27 17:23:16 --> Premium access denied: feature=investments.analytics route=/index.php/API/Investments/getConfidenceHeatmap user_id= tier=free status=free
DEBUG - 2026-03-27 17:23:16 --> [REQ_ID=3b8713c1f05c] [FILTER_AFTER]
DEBUG - 2026-03-27 17:23:16 --> [REQ_ID=3b8713c1f05c] [LIFECYCLE][END] status=302 duration_ms=258.51 memory_delta=2097152
INFO - 2026-03-27 17:23:16 --> [REQ_ID=fce1aaeb606d] [PERF] Execution time=0.255042
DEBUG - 2026-03-27 17:23:16 --> [REQ_ID=3b8713c1f05c] [REQUEST][END]
INFO - 2026-03-27 17:23:16 --> [REQ_ID=3b8713c1f05c] [PERF] Execution time=0.359043
DEBUG - 2026-03-27 17:23:16 --> [MetaService] slug=memberships pageName= cacheHit= path=DB
DEBUG - 2026-03-27 17:23:16 --> [REQ_ID=6c974e54c426] [VIEW_RENDER] themes/public/memberships
INFO - 2026-03-27 17:23:16 --> [REQ_ID=6c974e54c426] [MEMORY][commonData:start] 8388608
INFO - 2026-03-27 17:23:16 --> themesMemory usage: 8388608
DEBUG - 2026-03-27 17:23:16 --> [MetaService] slug=memberships pageName=Memberships cacheHit= path=DB
DEBUG - 2026-03-27 17:23:16 --> [REQ_ID=4fc13431a619] [FILTER_AFTER]
DEBUG - 2026-03-27 17:23:16 --> [REQ_ID=4fc13431a619] [LIFECYCLE][END] status=200 duration_ms=580.03 memory_delta=4194304
INFO - 2026-03-27 17:23:16 --> [REQ_ID=6c974e54c426] [PERF] Execution time=0.577912
DEBUG - 2026-03-27 17:23:16 --> [REQ_ID=4fc13431a619] [REQUEST][END]
INFO - 2026-03-27 17:23:16 --> [REQ_ID=4fc13431a619] [PERF] Execution time=0.601694
DEBUG - 2026-03-27 17:23:16 --> [REQ_ID=4e7aae406cfa] [REQUEST][START] GET /index.php/Memberships
DEBUG - 2026-03-27 17:23:16 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-27 17:23:16 --> [REQ_ID=4e7aae406cfa] [FILTER_BEFORE] /index.php/Memberships
DEBUG - 2026-03-27 17:23:16 --> [REQ_ID=4e7aae406cfa] [ROUTE] Controller=\App\Controllers\Home Method=memberships
DEBUG - 2026-03-27 17:23:16 --> [REQ_ID=4e7aae406cfa] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Memberships
DEBUG - 2026-03-27 17:23:16 --> [CSRF] token name=csrf_test_name hash=3c597bfd895002dab924aa7408c36b1e
DEBUG - 2026-03-27 17:23:16 --> [REQ_ID=d8f1866e8228] [INIT] App\Controllers\Home::GET
INFO - 2026-03-27 17:23:16 --> [REQ_ID=d8f1866e8228] [MEMORY][controller-start] 6291456
INFO - 2026-03-27 17:23:16 --> [REQ_ID=d8f1866e8228] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-27 17:23:16 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-27 17:23:16 --> [REQ_ID=7c4053caf1ce] [FILTER_AFTER]
DEBUG - 2026-03-27 17:23:16 --> [REQ_ID=7c4053caf1ce] [LIFECYCLE][END] status=200 duration_ms=569.91 memory_delta=2097152
INFO - 2026-03-27 17:23:16 --> [REQ_ID=3ab5226d98f4] [PERF] Execution time=0.567336
DEBUG - 2026-03-27 17:23:16 --> [REQ_ID=7c4053caf1ce] [REQUEST][END]
INFO - 2026-03-27 17:23:16 --> [REQ_ID=7c4053caf1ce] [PERF] Execution time=0.662136
DEBUG - 2026-03-27 17:23:17 --> [REQ_ID=e13b88b5baa2] [REQUEST][START] GET /index.php/API/Investments/getForecastHighlights
DEBUG - 2026-03-27 17:23:17 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-27 17:23:17 --> [REQ_ID=e13b88b5baa2] [FILTER_BEFORE] /index.php/API/Investments/getForecastHighlights
DEBUG - 2026-03-27 17:23:17 --> [REQ_ID=e13b88b5baa2] [ROUTE] Controller=\App\Modules\APIs\Controllers\InvestmentsAPIController Method=getForecastHighlights
DEBUG - 2026-03-27 17:23:17 --> [REQ_ID=e13b88b5baa2] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Investments/getForecastHighlights
DEBUG - 2026-03-27 17:23:17 --> [REQ_ID=f391009275d9] [INIT] App\Modules\APIs\Controllers\InvestmentsAPIController::GET
INFO - 2026-03-27 17:23:17 --> [REQ_ID=f391009275d9] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-27 17:23:17 --> MyMIInvestments: no session user detected; skipping personalized hydration.
DEBUG - 2026-03-27 17:23:17 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-27 17:23:17 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-27 17:23:17 --> MyMIMarketing: Pscrape library not installed; Google search scraping will use fallback.
DEBUG - 2026-03-27 17:23:17 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-27 17:23:17 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-27 17:23:17 --> [REQ_ID=e13b88b5baa2] [FILTER_AFTER]
DEBUG - 2026-03-27 17:23:17 --> [REQ_ID=e13b88b5baa2] [LIFECYCLE][END] status=200 duration_ms=14.31 memory_delta=0
INFO - 2026-03-27 17:23:17 --> [REQ_ID=f391009275d9] [PERF] Execution time=0.014215
DEBUG - 2026-03-27 17:23:17 --> [REQ_ID=e13b88b5baa2] [REQUEST][END]
INFO - 2026-03-27 17:23:17 --> [REQ_ID=e13b88b5baa2] [PERF] Execution time=0.022910
DEBUG - 2026-03-27 17:23:17 --> [MetaService] slug=memberships pageName= cacheHit=1 path=CACHE
DEBUG - 2026-03-27 17:23:17 --> [REQ_ID=d8f1866e8228] [VIEW_RENDER] themes/public/memberships
INFO - 2026-03-27 17:23:17 --> [REQ_ID=d8f1866e8228] [MEMORY][commonData:start] 8388608
INFO - 2026-03-27 17:23:17 --> themesMemory usage: 8388608
DEBUG - 2026-03-27 17:23:17 --> [MetaService] slug=memberships pageName=Memberships cacheHit=1 path=CACHE
DEBUG - 2026-03-27 17:23:17 --> [REQ_ID=4e7aae406cfa] [FILTER_AFTER]
DEBUG - 2026-03-27 17:23:17 --> [REQ_ID=4e7aae406cfa] [LIFECYCLE][END] status=200 duration_ms=512.86 memory_delta=2097152
INFO - 2026-03-27 17:23:17 --> [REQ_ID=d8f1866e8228] [PERF] Execution time=0.512676
DEBUG - 2026-03-27 17:23:17 --> [REQ_ID=4e7aae406cfa] [REQUEST][END]
INFO - 2026-03-27 17:23:17 --> [REQ_ID=4e7aae406cfa] [PERF] Execution time=0.521542
DEBUG - 2026-03-27 17:23:17 --> [REQ_ID=c5bcf4d8344e] [REQUEST][START] GET /index.php/Memberships
DEBUG - 2026-03-27 17:23:17 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-27 17:23:17 --> [REQ_ID=c5bcf4d8344e] [FILTER_BEFORE] /index.php/Memberships
DEBUG - 2026-03-27 17:23:17 --> [REQ_ID=c5bcf4d8344e] [ROUTE] Controller=\App\Controllers\Home Method=memberships
DEBUG - 2026-03-27 17:23:17 --> [REQ_ID=c5bcf4d8344e] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Memberships
DEBUG - 2026-03-27 17:23:17 --> [CSRF] token name=csrf_test_name hash=3c597bfd895002dab924aa7408c36b1e
DEBUG - 2026-03-27 17:23:17 --> [REQ_ID=f0b8dbfb9848] [INIT] App\Controllers\Home::GET
INFO - 2026-03-27 17:23:17 --> [REQ_ID=f0b8dbfb9848] [MEMORY][controller-start] 6291456
INFO - 2026-03-27 17:23:17 --> [REQ_ID=f0b8dbfb9848] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-27 17:23:17 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-27 17:23:18 --> [MetaService] slug=memberships pageName= cacheHit=1 path=CACHE
DEBUG - 2026-03-27 17:23:18 --> [REQ_ID=f0b8dbfb9848] [VIEW_RENDER] themes/public/memberships
INFO - 2026-03-27 17:23:18 --> [REQ_ID=f0b8dbfb9848] [MEMORY][commonData:start] 8388608
INFO - 2026-03-27 17:23:18 --> themesMemory usage: 8388608
DEBUG - 2026-03-27 17:23:18 --> [MetaService] slug=memberships pageName=Memberships cacheHit=1 path=CACHE
DEBUG - 2026-03-27 17:23:18 --> [REQ_ID=c5bcf4d8344e] [FILTER_AFTER]
DEBUG - 2026-03-27 17:23:18 --> [REQ_ID=c5bcf4d8344e] [LIFECYCLE][END] status=200 duration_ms=516.20 memory_delta=2097152
INFO - 2026-03-27 17:23:18 --> [REQ_ID=f0b8dbfb9848] [PERF] Execution time=0.515985
DEBUG - 2026-03-27 17:23:18 --> [REQ_ID=c5bcf4d8344e] [REQUEST][END]
INFO - 2026-03-27 17:23:18 --> [REQ_ID=c5bcf4d8344e] [PERF] Execution time=0.526120
DEBUG - 2026-03-27 17:26:22 --> [REQ_ID=9eb48c58cd75] [REQUEST][START] HEAD /
DEBUG - 2026-03-27 17:26:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-27 17:26:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-27 17:26:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-27 17:26:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-27 17:26:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-27 17:27:08 --> [REQ_ID=2ddbef9577f5] [REQUEST][START] GET /
DEBUG - 2026-03-27 17:27:08 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-27 17:27:08 --> [REQ_ID=2ddbef9577f5] [FILTER_BEFORE] /
DEBUG - 2026-03-27 17:27:08 --> [REQ_ID=2ddbef9577f5] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-27 17:27:08 --> [REQ_ID=2ddbef9577f5] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-27 17:27:08 --> [CSRF] token name=csrf_test_name hash=e6bb31f42b369b9c52d9c6b79d1fb922
DEBUG - 2026-03-27 17:27:08 --> [REQ_ID=3d3f656136b4] [INIT] App\Controllers\Home::GET
INFO - 2026-03-27 17:27:08 --> [REQ_ID=3d3f656136b4] [MEMORY][controller-start] 4194304
INFO - 2026-03-27 17:27:09 --> [REQ_ID=3d3f656136b4] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-27 17:27:09 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-27 17:27:09 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-03-27 17:27:09 --> [REQ_ID=3d3f656136b4] [VIEW_RENDER] themes/public/home
INFO - 2026-03-27 17:27:09 --> [REQ_ID=3d3f656136b4] [MEMORY][commonData:start] 8388608
INFO - 2026-03-27 17:27:09 --> themesMemory usage: 8388608
DEBUG - 2026-03-27 17:27:09 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-27 17:27:09 --> [REQ_ID=2ddbef9577f5] [FILTER_AFTER]
DEBUG - 2026-03-27 17:27:09 --> [REQ_ID=2ddbef9577f5] [LIFECYCLE][END] status=200 duration_ms=648.80 memory_delta=4194304
INFO - 2026-03-27 17:27:09 --> [REQ_ID=3d3f656136b4] [PERF] Execution time=0.646864
DEBUG - 2026-03-27 17:27:09 --> [REQ_ID=2ddbef9577f5] [REQUEST][END]
INFO - 2026-03-27 17:27:09 --> [REQ_ID=2ddbef9577f5] [PERF] Execution time=0.667727
DEBUG - 2026-03-27 17:31:22 --> [REQ_ID=ca03609b4179] [REQUEST][START] HEAD /
DEBUG - 2026-03-27 17:31:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-27 17:31:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-27 17:31:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-27 17:31:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-27 17:31:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-27 17:35:34 --> [REQ_ID=b63bea67a5fd] [REQUEST][START] GET /index.php/ITT/register
DEBUG - 2026-03-27 17:35:34 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-27 17:35:34 --> [REQ_ID=b63bea67a5fd] [FILTER_BEFORE] /index.php/ITT/register
DEBUG - 2026-03-27 17:35:34 --> [REQ_ID=b63bea67a5fd] [ROUTE] Controller=\App\Controllers\AuthController Method=register
DEBUG - 2026-03-27 17:35:34 --> [REQ_ID=b63bea67a5fd] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/ITT/register
DEBUG - 2026-03-27 17:35:34 --> [CSRF] token name=csrf_test_name hash=0f11c20ee1e209b3ea9404bb04ba0382
DEBUG - 2026-03-27 17:35:34 --> [REQ_ID=016497310e47] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-27 17:35:34 --> [REQ_ID=016497310e47] [MEMORY][controller-start] 6291456
INFO - 2026-03-27 17:35:34 --> [REGISTRATION] Form loaded
INFO - 2026-03-27 17:35:34 --> [REQ_ID=016497310e47] [PERF] Execution time=0.231471
DEBUG - 2026-03-27 17:36:22 --> [REQ_ID=84626bb651e4] [REQUEST][START] HEAD /
DEBUG - 2026-03-27 17:36:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-27 17:36:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-27 17:36:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-27 17:36:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-27 17:36:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-27 17:41:22 --> [REQ_ID=5712c14a4a87] [REQUEST][START] HEAD /
DEBUG - 2026-03-27 17:41:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-27 17:41:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-27 17:41:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-27 17:41:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-27 17:41:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
INFO - 2026-03-27 17:44:26 --> [SPARK_START] App\Commands\Chat\Restart
INFO - 2026-03-27 17:44:26 --> [SPARK_MEMORY] 18874368
INFO - 2026-03-27 17:44:26 --> [spark:chat:restart] Intent
INFO - 2026-03-27 17:44:26 --> [SPARK_COMPLETE] App\Commands\Chat\Restart duration=0.032340
INFO - 2026-03-27 17:44:26 --> [SPARK_MEMORY] 18874368
INFO - 2026-03-27 17:44:44 --> [SPARK_START] App\Commands\Chat\Logs
INFO - 2026-03-27 17:44:44 --> [SPARK_MEMORY] 18874368
INFO - 2026-03-27 17:44:44 --> [spark:chat:logs] Intent
INFO - 2026-03-27 17:44:44 --> [SPARK_COMPLETE] App\Commands\Chat\Logs duration=0.001362
INFO - 2026-03-27 17:44:44 --> [SPARK_MEMORY] 18874368
CRITICAL - 2026-03-27 17:44:44 --> TypeError: App\Commands\SafeBaseCommand::optInt(): Argument #2 ($key) must be of type ?string, int given, called in /home/mymiteam/mymiwallet/site/current/app/Commands/Chat/Logs.php on line 28
[Method: CLI, Route: chat:logs]
in APPPATH/Commands/SafeBaseCommand.php on line 308.
 1 APPPATH/Commands/Chat/Logs.php(28): App\Commands\SafeBaseCommand->optInt('lines', 200)
 2 SYSTEMPATH/CLI/Commands.php(74): App\Commands\Chat\Logs->run([])
 3 SYSTEMPATH/CLI/Console.php(47): CodeIgniter\CLI\Commands->run('chat:logs', [])
 4 SYSTEMPATH/Boot.php(442): CodeIgniter\CLI\Console->run()
 5 SYSTEMPATH/Boot.php(166): CodeIgniter\Boot::runCommand(Object(CodeIgniter\CLI\Console))
 6 ROOTPATH/spark(107): CodeIgniter\Boot::bootSpark(Object(Config\Paths))
CRITICAL - 2026-03-27 17:44:44 --> [EXCEPTION] App\Commands\SafeBaseCommand::optInt(): Argument #2 ($key) must be of type ?string, int given, called in /home/mymiteam/mymiwallet/site/current/app/Commands/Chat/Logs.php on line 28 File=/home/mymiteam/mymiwallet/site/current/app/Commands/SafeBaseCommand.php Line=308
INFO - 2026-03-27 17:44:55 --> [SPARK_START] App\Commands\Chat\Start
INFO - 2026-03-27 17:44:55 --> [SPARK_MEMORY] 18874368
INFO - 2026-03-27 17:44:55 --> [spark:chat:start] Intent
INFO - 2026-03-27 17:44:55 --> [SPARK_COMPLETE] App\Commands\Chat\Start duration=0.014869
INFO - 2026-03-27 17:44:55 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-03-27 17:46:22 --> [REQ_ID=40a5688cfea9] [REQUEST][START] HEAD /
DEBUG - 2026-03-27 17:46:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-27 17:46:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-27 17:46:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-27 17:46:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-27 17:46:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-27 17:51:22 --> [REQ_ID=52c77b6aec38] [REQUEST][START] HEAD /
DEBUG - 2026-03-27 17:51:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-27 17:51:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-27 17:51:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-27 17:51:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-27 17:51:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-27 17:56:22 --> [REQ_ID=117ef236a21a] [REQUEST][START] HEAD /
DEBUG - 2026-03-27 17:56:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-27 17:56:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-27 17:56:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-27 17:56:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-27 17:56:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-27 18:00:01 --> [REQ_ID=b4dbd83af74e] [REQUEST][START] GET /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-27 18:00:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-27 18:00:01 --> [REQ_ID=b4dbd83af74e] [FILTER_BEFORE] /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-27 18:00:01 --> [REQ_ID=b4dbd83af74e] [ROUTE] Controller=\App\Modules\Management\Controllers\ManagementAPIController Method=Run_CRON_Tasks
DEBUG - 2026-03-27 18:00:01 --> [REQ_ID=b4dbd83af74e] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-27 18:00:01 --> [REQ_ID=b4dbd83af74e] [REQUEST][END]
INFO - 2026-03-27 18:00:01 --> [REQ_ID=b4dbd83af74e] [PERF] Execution time=0.050253
DEBUG - 2026-03-27 18:01:22 --> [REQ_ID=c20fa1d53668] [REQUEST][START] HEAD /
DEBUG - 2026-03-27 18:01:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-27 18:01:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-27 18:01:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-27 18:01:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-27 18:01:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-27 18:05:04 --> [REQ_ID=44735dc831f3] [REQUEST][START] GET /
DEBUG - 2026-03-27 18:05:04 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-27 18:05:04 --> [REQ_ID=44735dc831f3] [FILTER_BEFORE] /
DEBUG - 2026-03-27 18:05:04 --> [REQ_ID=44735dc831f3] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-27 18:05:04 --> [REQ_ID=44735dc831f3] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-27 18:05:04 --> [CSRF] token name=csrf_test_name hash=e6bb31f42b369b9c52d9c6b79d1fb922
DEBUG - 2026-03-27 18:05:04 --> [REQ_ID=2d046488732f] [INIT] App\Controllers\Home::GET
INFO - 2026-03-27 18:05:04 --> [REQ_ID=2d046488732f] [MEMORY][controller-start] 6291456
INFO - 2026-03-27 18:05:05 --> [REQ_ID=2d046488732f] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-27 18:05:05 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-27 18:05:05 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-03-27 18:05:05 --> [REQ_ID=2d046488732f] [VIEW_RENDER] themes/public/home
INFO - 2026-03-27 18:05:05 --> [REQ_ID=2d046488732f] [MEMORY][commonData:start] 10485760
INFO - 2026-03-27 18:05:05 --> themesMemory usage: 10485760
DEBUG - 2026-03-27 18:05:05 --> [MetaService] slug= pageName=Home cacheHit= path=DB
DEBUG - 2026-03-27 18:05:05 --> [REQ_ID=44735dc831f3] [FILTER_AFTER]
DEBUG - 2026-03-27 18:05:05 --> [REQ_ID=44735dc831f3] [LIFECYCLE][END] status=200 duration_ms=594.71 memory_delta=4194304
INFO - 2026-03-27 18:05:05 --> [REQ_ID=2d046488732f] [PERF] Execution time=0.592927
DEBUG - 2026-03-27 18:05:05 --> [REQ_ID=44735dc831f3] [REQUEST][END]
INFO - 2026-03-27 18:05:05 --> [REQ_ID=44735dc831f3] [PERF] Execution time=0.635005
DEBUG - 2026-03-27 18:06:22 --> [REQ_ID=52076709ba71] [REQUEST][START] HEAD /
DEBUG - 2026-03-27 18:06:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-27 18:06:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-27 18:06:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-27 18:06:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-27 18:06:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-27 18:11:22 --> [REQ_ID=763b1f6d75bd] [REQUEST][START] HEAD /
DEBUG - 2026-03-27 18:11:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-27 18:11:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-27 18:11:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-27 18:11:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-27 18:11:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-27 18:13:32 --> [REQ_ID=7b06c4a97857] [REQUEST][START] GET /index.php/activate
DEBUG - 2026-03-27 18:13:32 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-27 18:13:32 --> [REQ_ID=7b06c4a97857] [REQUEST][END]
INFO - 2026-03-27 18:13:32 --> [REQ_ID=7b06c4a97857] [PERF] Execution time=0.040643
DEBUG - 2026-03-27 18:15:01 --> [REQ_ID=e94b4296ae9d] [REQUEST][START] GET /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-27 18:15:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-27 18:15:01 --> [REQ_ID=e94b4296ae9d] [FILTER_BEFORE] /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-27 18:15:01 --> [REQ_ID=e94b4296ae9d] [ROUTE] Controller=\App\Modules\APIs\Controllers\AlertsAPIController Method=fetchEmailAlerts
DEBUG - 2026-03-27 18:15:01 --> [REQ_ID=e94b4296ae9d] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-27 18:15:01 --> [REQ_ID=e94b4296ae9d] [REQUEST][END]
INFO - 2026-03-27 18:15:01 --> [REQ_ID=e94b4296ae9d] [PERF] Execution time=0.046345
DEBUG - 2026-03-27 18:16:22 --> [REQ_ID=e0c4950ac031] [REQUEST][START] HEAD /
DEBUG - 2026-03-27 18:16:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-27 18:16:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-27 18:16:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-27 18:16:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-27 18:16:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-27 18:21:22 --> [REQ_ID=1caa0a89a357] [REQUEST][START] HEAD /
DEBUG - 2026-03-27 18:21:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-27 18:21:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-27 18:21:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-27 18:21:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-27 18:21:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-27 18:26:22 --> [REQ_ID=caae7d336ebf] [REQUEST][START] HEAD /
DEBUG - 2026-03-27 18:26:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-27 18:26:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-27 18:26:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-27 18:26:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-27 18:26:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-27 18:31:22 --> [REQ_ID=1a01e0adfa8e] [REQUEST][START] HEAD /
DEBUG - 2026-03-27 18:31:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-27 18:31:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-27 18:31:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-27 18:31:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-27 18:31:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-27 18:36:22 --> [REQ_ID=1d8806c9c326] [REQUEST][START] HEAD /
DEBUG - 2026-03-27 18:36:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-27 18:36:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-27 18:36:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-27 18:36:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-27 18:36:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-27 18:41:22 --> [REQ_ID=3c51431a4024] [REQUEST][START] HEAD /
DEBUG - 2026-03-27 18:41:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-27 18:41:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-27 18:41:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-27 18:41:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-27 18:41:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-27 18:45:46 --> [REQ_ID=aaf7709e7fbf] [REQUEST][START] GET /
DEBUG - 2026-03-27 18:45:46 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-27 18:45:46 --> [REQ_ID=aaf7709e7fbf] [REQUEST][END]
INFO - 2026-03-27 18:45:46 --> [REQ_ID=aaf7709e7fbf] [PERF] Execution time=0.038684
DEBUG - 2026-03-27 18:46:22 --> [REQ_ID=1a9a5c1b331f] [REQUEST][START] HEAD /
DEBUG - 2026-03-27 18:46:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-27 18:46:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-27 18:46:23 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-27 18:46:23 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-27 18:46:23 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-27 18:51:22 --> [REQ_ID=25467b954cb7] [REQUEST][START] HEAD /
DEBUG - 2026-03-27 18:51:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-27 18:51:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-27 18:51:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-27 18:51:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-27 18:51:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-27 18:55:03 --> [REQ_ID=0204fa2b181b] [REQUEST][START] GET /
DEBUG - 2026-03-27 18:55:03 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-27 18:55:03 --> [REQ_ID=0204fa2b181b] [FILTER_BEFORE] /
DEBUG - 2026-03-27 18:55:03 --> [REQ_ID=0204fa2b181b] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-27 18:55:03 --> [REQ_ID=0204fa2b181b] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-27 18:55:03 --> [CSRF] token name=csrf_test_name hash=4b5751f15bc6b41a2f6dd54d9dd8c860
DEBUG - 2026-03-27 18:55:03 --> [REQ_ID=1d3b39c0fc5a] [INIT] App\Controllers\Home::GET
INFO - 2026-03-27 18:55:03 --> [REQ_ID=1d3b39c0fc5a] [MEMORY][controller-start] 6291456
INFO - 2026-03-27 18:55:03 --> [REQ_ID=1d3b39c0fc5a] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-27 18:55:03 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-27 18:55:04 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-03-27 18:55:04 --> [REQ_ID=1d3b39c0fc5a] [VIEW_RENDER] themes/public/home
INFO - 2026-03-27 18:55:04 --> [REQ_ID=1d3b39c0fc5a] [MEMORY][commonData:start] 10485760
INFO - 2026-03-27 18:55:04 --> themesMemory usage: 10485760
DEBUG - 2026-03-27 18:55:04 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-27 18:55:04 --> [REQ_ID=0204fa2b181b] [FILTER_AFTER]
DEBUG - 2026-03-27 18:55:04 --> [REQ_ID=0204fa2b181b] [LIFECYCLE][END] status=200 duration_ms=710.55 memory_delta=4194304
INFO - 2026-03-27 18:55:04 --> [REQ_ID=1d3b39c0fc5a] [PERF] Execution time=0.708572
DEBUG - 2026-03-27 18:55:04 --> [REQ_ID=0204fa2b181b] [REQUEST][END]
INFO - 2026-03-27 18:55:04 --> [REQ_ID=0204fa2b181b] [PERF] Execution time=0.750096
DEBUG - 2026-03-27 18:55:39 --> [REQ_ID=02f6ba77a2d3] [REQUEST][START] GET /
DEBUG - 2026-03-27 18:55:39 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-27 18:55:39 --> [REQ_ID=02f6ba77a2d3] [FILTER_BEFORE] /
DEBUG - 2026-03-27 18:55:39 --> [REQ_ID=02f6ba77a2d3] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-27 18:55:39 --> [REQ_ID=02f6ba77a2d3] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-27 18:55:39 --> [CSRF] token name=csrf_test_name hash=d7e98c3e6b5ae46f861b2bb26aa5b8d8
DEBUG - 2026-03-27 18:55:39 --> [REQ_ID=d30e1be1f2a9] [INIT] App\Controllers\Home::GET
INFO - 2026-03-27 18:55:39 --> [REQ_ID=d30e1be1f2a9] [MEMORY][controller-start] 6291456
INFO - 2026-03-27 18:55:39 --> [REQ_ID=d30e1be1f2a9] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-27 18:55:39 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-27 18:55:39 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
DEBUG - 2026-03-27 18:55:39 --> [REQ_ID=d30e1be1f2a9] [VIEW_RENDER] themes/public/home
INFO - 2026-03-27 18:55:39 --> [REQ_ID=d30e1be1f2a9] [MEMORY][commonData:start] 8388608
INFO - 2026-03-27 18:55:39 --> themesMemory usage: 8388608
DEBUG - 2026-03-27 18:55:39 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-27 18:55:39 --> [REQ_ID=02f6ba77a2d3] [FILTER_AFTER]
DEBUG - 2026-03-27 18:55:39 --> [REQ_ID=02f6ba77a2d3] [LIFECYCLE][END] status=200 duration_ms=539.22 memory_delta=2097152
INFO - 2026-03-27 18:55:39 --> [REQ_ID=d30e1be1f2a9] [PERF] Execution time=0.538765
DEBUG - 2026-03-27 18:55:39 --> [REQ_ID=02f6ba77a2d3] [REQUEST][END]
INFO - 2026-03-27 18:55:39 --> [REQ_ID=02f6ba77a2d3] [PERF] Execution time=0.550443
DEBUG - 2026-03-27 18:55:40 --> [REQ_ID=ef8893f7ee06] [REQUEST][START] GET /index.php
DEBUG - 2026-03-27 18:55:40 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-27 18:55:40 --> [REQ_ID=ef8893f7ee06] [FILTER_BEFORE] /index.php
DEBUG - 2026-03-27 18:55:40 --> [REQ_ID=ef8893f7ee06] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-27 18:55:40 --> [REQ_ID=ef8893f7ee06] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-27 18:55:40 --> [CSRF] token name=csrf_test_name hash=d7e98c3e6b5ae46f861b2bb26aa5b8d8
DEBUG - 2026-03-27 18:55:40 --> [REQ_ID=f9174d6d2013] [INIT] App\Controllers\Home::GET
INFO - 2026-03-27 18:55:40 --> [REQ_ID=f9174d6d2013] [MEMORY][controller-start] 6291456
INFO - 2026-03-27 18:55:40 --> [REQ_ID=f9174d6d2013] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-27 18:55:40 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-27 18:55:40 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
DEBUG - 2026-03-27 18:55:40 --> [REQ_ID=f9174d6d2013] [VIEW_RENDER] themes/public/home
INFO - 2026-03-27 18:55:40 --> [REQ_ID=f9174d6d2013] [MEMORY][commonData:start] 8388608
INFO - 2026-03-27 18:55:40 --> themesMemory usage: 8388608
DEBUG - 2026-03-27 18:55:40 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-27 18:55:40 --> [REQ_ID=ef8893f7ee06] [FILTER_AFTER]
DEBUG - 2026-03-27 18:55:40 --> [REQ_ID=ef8893f7ee06] [LIFECYCLE][END] status=200 duration_ms=486.47 memory_delta=2097152
INFO - 2026-03-27 18:55:40 --> [REQ_ID=f9174d6d2013] [PERF] Execution time=0.486254
DEBUG - 2026-03-27 18:55:40 --> [REQ_ID=ef8893f7ee06] [REQUEST][END]
INFO - 2026-03-27 18:55:40 --> [REQ_ID=ef8893f7ee06] [PERF] Execution time=0.496571
DEBUG - 2026-03-27 18:55:41 --> [REQ_ID=cf0a0b39a102] [REQUEST][START] GET /
DEBUG - 2026-03-27 18:55:41 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-27 18:55:41 --> [REQ_ID=cf0a0b39a102] [FILTER_BEFORE] /
DEBUG - 2026-03-27 18:55:41 --> [REQ_ID=cf0a0b39a102] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-27 18:55:41 --> [REQ_ID=cf0a0b39a102] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-27 18:55:41 --> [CSRF] token name=csrf_test_name hash=d7e98c3e6b5ae46f861b2bb26aa5b8d8
DEBUG - 2026-03-27 18:55:41 --> [REQ_ID=1b1dea80f189] [INIT] App\Controllers\Home::GET
INFO - 2026-03-27 18:55:41 --> [REQ_ID=1b1dea80f189] [MEMORY][controller-start] 6291456
INFO - 2026-03-27 18:55:41 --> [REQ_ID=1b1dea80f189] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-27 18:55:41 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-27 18:55:42 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
DEBUG - 2026-03-27 18:55:42 --> [REQ_ID=1b1dea80f189] [VIEW_RENDER] themes/public/home
INFO - 2026-03-27 18:55:42 --> [REQ_ID=1b1dea80f189] [MEMORY][commonData:start] 8388608
INFO - 2026-03-27 18:55:42 --> themesMemory usage: 8388608
DEBUG - 2026-03-27 18:55:42 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-27 18:55:42 --> [REQ_ID=cf0a0b39a102] [FILTER_AFTER]
DEBUG - 2026-03-27 18:55:42 --> [REQ_ID=cf0a0b39a102] [LIFECYCLE][END] status=200 duration_ms=532.99 memory_delta=2097152
INFO - 2026-03-27 18:55:42 --> [REQ_ID=1b1dea80f189] [PERF] Execution time=0.532692
DEBUG - 2026-03-27 18:55:42 --> [REQ_ID=cf0a0b39a102] [REQUEST][END]
INFO - 2026-03-27 18:55:42 --> [REQ_ID=cf0a0b39a102] [PERF] Execution time=0.542231
DEBUG - 2026-03-27 18:55:42 --> [REQ_ID=04ba1baff0d7] [REQUEST][START] GET /index.php/Blog
DEBUG - 2026-03-27 18:55:42 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-27 18:55:42 --> [REQ_ID=04ba1baff0d7] [FILTER_BEFORE] /index.php/Blog
DEBUG - 2026-03-27 18:55:42 --> [REQ_ID=04ba1baff0d7] [ROUTE] Controller=\App\Modules\Blog\Controllers\BlogController Method=index
DEBUG - 2026-03-27 18:55:42 --> [REQ_ID=04ba1baff0d7] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Blog
DEBUG - 2026-03-27 18:55:42 --> [CSRF] token name=csrf_test_name hash=d7e98c3e6b5ae46f861b2bb26aa5b8d8
DEBUG - 2026-03-27 18:55:42 --> [REQ_ID=3135b6982e22] [INIT] App\Modules\Blog\Controllers\BlogController::GET
INFO - 2026-03-27 18:55:42 --> [REQ_ID=3135b6982e22] [MEMORY][controller-start] 6291456
DEBUG - 2026-03-27 18:55:42 --> [REQ_ID=3135b6982e22] [METHOD_ENTRY] index
DEBUG - 2026-03-27 18:55:42 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-27 18:55:43 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-27 18:55:43 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-27 18:55:43 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-27 18:55:43 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-27 18:55:43 --> MyMICoin: guest context detected; skipping user-specific preload.
INFO - 2026-03-27 18:55:43 --> [REQ_ID=3135b6982e22] [MEMORY][commonData:start] 6291456
INFO - 2026-03-27 18:55:43 --> [REQ_ID=3135b6982e22] [PERF] Execution time=0.056411
DEBUG - 2026-03-27 18:55:46 --> [REQ_ID=355617293e57] [REQUEST][START] GET /
DEBUG - 2026-03-27 18:55:46 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-27 18:55:46 --> [REQ_ID=355617293e57] [FILTER_BEFORE] /
DEBUG - 2026-03-27 18:55:46 --> [REQ_ID=355617293e57] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-27 18:55:46 --> [REQ_ID=355617293e57] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-27 18:55:46 --> [CSRF] token name=csrf_test_name hash=d7e98c3e6b5ae46f861b2bb26aa5b8d8
DEBUG - 2026-03-27 18:55:46 --> [REQ_ID=0bd3733464f6] [INIT] App\Controllers\Home::GET
INFO - 2026-03-27 18:55:46 --> [REQ_ID=0bd3733464f6] [MEMORY][controller-start] 6291456
INFO - 2026-03-27 18:55:46 --> [REQ_ID=0bd3733464f6] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-27 18:55:46 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-27 18:55:46 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
DEBUG - 2026-03-27 18:55:46 --> [REQ_ID=0bd3733464f6] [VIEW_RENDER] themes/public/home
INFO - 2026-03-27 18:55:46 --> [REQ_ID=0bd3733464f6] [MEMORY][commonData:start] 8388608
INFO - 2026-03-27 18:55:46 --> themesMemory usage: 8388608
DEBUG - 2026-03-27 18:55:46 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-27 18:55:46 --> [REQ_ID=355617293e57] [FILTER_AFTER]
DEBUG - 2026-03-27 18:55:46 --> [REQ_ID=355617293e57] [LIFECYCLE][END] status=200 duration_ms=479.68 memory_delta=2097152
INFO - 2026-03-27 18:55:46 --> [REQ_ID=0bd3733464f6] [PERF] Execution time=0.479385
DEBUG - 2026-03-27 18:55:46 --> [REQ_ID=355617293e57] [REQUEST][END]
INFO - 2026-03-27 18:55:46 --> [REQ_ID=355617293e57] [PERF] Execution time=0.489188
DEBUG - 2026-03-27 18:55:47 --> [REQ_ID=dd65e31d406a] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-27 18:55:47 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-27 18:55:47 --> [REQ_ID=dd65e31d406a] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-27 18:55:47 --> [REQ_ID=dd65e31d406a] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-27 18:55:47 --> [REQ_ID=dd65e31d406a] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-27 18:55:47 --> [CSRF] token name=csrf_test_name hash=d7e98c3e6b5ae46f861b2bb26aa5b8d8
DEBUG - 2026-03-27 18:55:47 --> [REQ_ID=8778dacd8a66] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-27 18:55:47 --> [REQ_ID=8778dacd8a66] [MEMORY][controller-start] 6291456
DEBUG - 2026-03-27 18:55:47 --> [REQ_ID=dd65e31d406a] [FILTER_AFTER]
DEBUG - 2026-03-27 18:55:47 --> [REQ_ID=dd65e31d406a] [LIFECYCLE][END] status=200 duration_ms=23.97 memory_delta=0
INFO - 2026-03-27 18:55:47 --> [REQ_ID=8778dacd8a66] [PERF] Execution time=0.023579
DEBUG - 2026-03-27 18:55:47 --> [REQ_ID=dd65e31d406a] [REQUEST][END]
INFO - 2026-03-27 18:55:47 --> [REQ_ID=dd65e31d406a] [PERF] Execution time=0.037547
DEBUG - 2026-03-27 18:56:03 --> [REQ_ID=1dfcabc3a4ff] [REQUEST][START] GET /index.php/register
DEBUG - 2026-03-27 18:56:03 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-27 18:56:03 --> [REQ_ID=1dfcabc3a4ff] [FILTER_BEFORE] /index.php/register
DEBUG - 2026-03-27 18:56:03 --> [REQ_ID=1dfcabc3a4ff] [ROUTE] Controller=\App\Controllers\AuthController Method=register
DEBUG - 2026-03-27 18:56:03 --> [REQ_ID=1dfcabc3a4ff] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/register
DEBUG - 2026-03-27 18:56:03 --> [CSRF] token name=csrf_test_name hash=d7e98c3e6b5ae46f861b2bb26aa5b8d8
DEBUG - 2026-03-27 18:56:03 --> [REQ_ID=a6d2ba9d0dba] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-27 18:56:03 --> [REQ_ID=a6d2ba9d0dba] [MEMORY][controller-start] 4194304
INFO - 2026-03-27 18:56:03 --> [REGISTRATION] Form loaded
INFO - 2026-03-27 18:56:03 --> [REQ_ID=a6d2ba9d0dba] [PERF] Execution time=0.228894
DEBUG - 2026-03-27 18:56:04 --> [REQ_ID=c743a600bfb7] [REQUEST][START] GET /index.php/Legal/Terms-And-Conditions
DEBUG - 2026-03-27 18:56:04 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-27 18:56:04 --> [REQ_ID=c743a600bfb7] [FILTER_BEFORE] /index.php/Legal/Terms-And-Conditions
DEBUG - 2026-03-27 18:56:04 --> [REQ_ID=c743a600bfb7] [ROUTE] Controller=\App\Controllers\Home Method=terms
DEBUG - 2026-03-27 18:56:04 --> [REQ_ID=c743a600bfb7] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Legal/Terms-And-Conditions
DEBUG - 2026-03-27 18:56:04 --> [CSRF] token name=csrf_test_name hash=d7e98c3e6b5ae46f861b2bb26aa5b8d8
DEBUG - 2026-03-27 18:56:04 --> [REQ_ID=c743a600bfb7] [REQUEST][END]
INFO - 2026-03-27 18:56:04 --> [REQ_ID=c743a600bfb7] [PERF] Execution time=0.010902
DEBUG - 2026-03-27 18:56:04 --> [REQ_ID=5ebb3d43008c] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-27 18:56:04 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-27 18:56:04 --> [REQ_ID=5ebb3d43008c] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-27 18:56:04 --> [REQ_ID=5ebb3d43008c] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-27 18:56:04 --> [REQ_ID=5ebb3d43008c] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-27 18:56:04 --> [CSRF] token name=csrf_test_name hash=d7e98c3e6b5ae46f861b2bb26aa5b8d8
DEBUG - 2026-03-27 18:56:04 --> [REQ_ID=2466556d7e72] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-27 18:56:04 --> [REQ_ID=2466556d7e72] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-27 18:56:04 --> [REQ_ID=5ebb3d43008c] [FILTER_AFTER]
DEBUG - 2026-03-27 18:56:04 --> [REQ_ID=5ebb3d43008c] [LIFECYCLE][END] status=200 duration_ms=13.93 memory_delta=0
INFO - 2026-03-27 18:56:04 --> [REQ_ID=2466556d7e72] [PERF] Execution time=0.013830
DEBUG - 2026-03-27 18:56:04 --> [REQ_ID=5ebb3d43008c] [REQUEST][END]
INFO - 2026-03-27 18:56:04 --> [REQ_ID=5ebb3d43008c] [PERF] Execution time=0.024040
DEBUG - 2026-03-27 18:56:04 --> [REQ_ID=d66a12b62926] [REQUEST][START] GET /index.php/Support
DEBUG - 2026-03-27 18:56:04 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-27 18:56:04 --> [REQ_ID=d66a12b62926] [FILTER_BEFORE] /index.php/Support
DEBUG - 2026-03-27 18:56:04 --> [REQ_ID=d66a12b62926] [ROUTE] Controller=\App\Modules\Support\Controllers\SupportController Method=index
DEBUG - 2026-03-27 18:56:04 --> [REQ_ID=d66a12b62926] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Support
DEBUG - 2026-03-27 18:56:04 --> [CSRF] token name=csrf_test_name hash=d7e98c3e6b5ae46f861b2bb26aa5b8d8
DEBUG - 2026-03-27 18:56:04 --> [REQ_ID=2d67aa9ac92a] [INIT] App\Modules\Support\Controllers\SupportController::GET
INFO - 2026-03-27 18:56:04 --> [REQ_ID=2d67aa9ac92a] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-27 18:56:04 --> [REQ_ID=2d67aa9ac92a] [METHOD_ENTRY] index
DEBUG - 2026-03-27 18:56:04 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-27 18:56:04 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-27 18:56:04 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-27 18:56:04 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-27 18:56:04 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-27 18:56:05 --> MyMICoin: guest context detected; skipping user-specific preload.
INFO - 2026-03-27 18:56:05 --> [REQ_ID=2d67aa9ac92a] [MEMORY][commonData:start] 4194304
DEBUG - 2026-03-27 18:56:05 --> [REQ_ID=2d67aa9ac92a] [VIEW_RENDER] SupportModule\Views\Support\index
INFO - 2026-03-27 18:56:05 --> [REQ_ID=2d67aa9ac92a] [MEMORY][commonData:start] 4194304
INFO - 2026-03-27 18:56:05 --> themesMemory usage: 4194304
DEBUG - 2026-03-27 18:56:05 --> [REQ_ID=d66a12b62926] [FILTER_AFTER]
DEBUG - 2026-03-27 18:56:05 --> [REQ_ID=d66a12b62926] [LIFECYCLE][END] status=200 duration_ms=41.77 memory_delta=0
INFO - 2026-03-27 18:56:05 --> [REQ_ID=2d67aa9ac92a] [PERF] Execution time=0.041471
DEBUG - 2026-03-27 18:56:05 --> [REQ_ID=d66a12b62926] [REQUEST][END]
INFO - 2026-03-27 18:56:05 --> [REQ_ID=d66a12b62926] [PERF] Execution time=0.052803
DEBUG - 2026-03-27 18:56:05 --> [REQ_ID=87672407f833] [REQUEST][START] GET /index.php/Account/Activity
DEBUG - 2026-03-27 18:56:05 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-27 18:56:05 --> [REQ_ID=87672407f833] [FILTER_BEFORE] /index.php/Account/Activity
DEBUG - 2026-03-27 18:56:05 --> [REQ_ID=87672407f833] [ROUTE] Controller=\App\Modules\User\Controllers\DashboardController Method=activity
DEBUG - 2026-03-27 18:56:05 --> [REQ_ID=87672407f833] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Account/Activity
DEBUG - 2026-03-27 18:56:05 --> [CSRF] token name=csrf_test_name hash=d7e98c3e6b5ae46f861b2bb26aa5b8d8
DEBUG - 2026-03-27 18:56:05 --> [REQ_ID=87672407f833] [REQUEST][END]
INFO - 2026-03-27 18:56:05 --> [REQ_ID=87672407f833] [PERF] Execution time=0.016352
DEBUG - 2026-03-27 18:56:06 --> [REQ_ID=f2fe963dbf8a] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-27 18:56:06 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-27 18:56:06 --> [REQ_ID=f2fe963dbf8a] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-27 18:56:06 --> [REQ_ID=f2fe963dbf8a] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-27 18:56:06 --> [REQ_ID=f2fe963dbf8a] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-27 18:56:06 --> [CSRF] token name=csrf_test_name hash=d7e98c3e6b5ae46f861b2bb26aa5b8d8
DEBUG - 2026-03-27 18:56:06 --> [REQ_ID=6e5bc96ff93f] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-27 18:56:06 --> [REQ_ID=6e5bc96ff93f] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-27 18:56:06 --> [REQ_ID=f2fe963dbf8a] [FILTER_AFTER]
DEBUG - 2026-03-27 18:56:06 --> [REQ_ID=f2fe963dbf8a] [LIFECYCLE][END] status=200 duration_ms=17.70 memory_delta=0
INFO - 2026-03-27 18:56:06 --> [REQ_ID=6e5bc96ff93f] [PERF] Execution time=0.017616
DEBUG - 2026-03-27 18:56:06 --> [REQ_ID=f2fe963dbf8a] [REQUEST][END]
INFO - 2026-03-27 18:56:06 --> [REQ_ID=f2fe963dbf8a] [PERF] Execution time=0.027415
DEBUG - 2026-03-27 18:56:06 --> [REQ_ID=28e99878508a] [REQUEST][START] GET /index.php/Customer-Support
DEBUG - 2026-03-27 18:56:06 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-27 18:56:06 --> [REQ_ID=28e99878508a] [FILTER_BEFORE] /index.php/Customer-Support
DEBUG - 2026-03-27 18:56:06 --> [REQ_ID=28e99878508a] [ROUTE] Controller=\App\Controllers\App\Modules\Support\Controllers\SupportController Method=index
DEBUG - 2026-03-27 18:56:06 --> [REQ_ID=28e99878508a] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Customer-Support
DEBUG - 2026-03-27 18:56:06 --> [CSRF] token name=csrf_test_name hash=d7e98c3e6b5ae46f861b2bb26aa5b8d8
DEBUG - 2026-03-27 18:56:06 --> [REQ_ID=28e99878508a] [REQUEST][END]
INFO - 2026-03-27 18:56:06 --> [REQ_ID=28e99878508a] [PERF] Execution time=0.010256
DEBUG - 2026-03-27 18:56:09 --> [REQ_ID=267ea1ce1c06] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-27 18:56:09 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-27 18:56:09 --> [REQ_ID=267ea1ce1c06] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-27 18:56:09 --> [REQ_ID=267ea1ce1c06] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-27 18:56:09 --> [REQ_ID=267ea1ce1c06] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-27 18:56:09 --> [CSRF] token name=csrf_test_name hash=d7e98c3e6b5ae46f861b2bb26aa5b8d8
DEBUG - 2026-03-27 18:56:09 --> [REQ_ID=57f937c61d8f] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-27 18:56:09 --> [REQ_ID=57f937c61d8f] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-27 18:56:10 --> [REQ_ID=267ea1ce1c06] [FILTER_AFTER]
DEBUG - 2026-03-27 18:56:10 --> [REQ_ID=267ea1ce1c06] [LIFECYCLE][END] status=200 duration_ms=36.01 memory_delta=0
INFO - 2026-03-27 18:56:10 --> [REQ_ID=57f937c61d8f] [PERF] Execution time=0.035675
DEBUG - 2026-03-27 18:56:10 --> [REQ_ID=267ea1ce1c06] [REQUEST][END]
INFO - 2026-03-27 18:56:10 --> [REQ_ID=267ea1ce1c06] [PERF] Execution time=0.045698
DEBUG - 2026-03-27 18:56:22 --> [REQ_ID=601b994e7b07] [REQUEST][START] HEAD /
DEBUG - 2026-03-27 18:56:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-27 18:56:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-27 18:56:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-27 18:56:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-27 18:56:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-27 18:56:36 --> [REQ_ID=497257e9f8c4] [REQUEST][START] GET /
DEBUG - 2026-03-27 18:56:36 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-27 18:56:36 --> [REQ_ID=497257e9f8c4] [FILTER_BEFORE] /
DEBUG - 2026-03-27 18:56:36 --> [REQ_ID=497257e9f8c4] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-27 18:56:36 --> [REQ_ID=497257e9f8c4] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-27 18:56:36 --> [CSRF] token name=csrf_test_name hash=786fe7dd6764cebdf8afe90f1e167628
DEBUG - 2026-03-27 18:56:36 --> [REQ_ID=c68a19100d96] [INIT] App\Controllers\Home::GET
INFO - 2026-03-27 18:56:36 --> [REQ_ID=c68a19100d96] [MEMORY][controller-start] 4194304
INFO - 2026-03-27 18:56:36 --> [REQ_ID=c68a19100d96] [MEMORY][commonData:start] 4194304
DEBUG - 2026-03-27 18:56:36 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-27 18:56:37 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
DEBUG - 2026-03-27 18:56:37 --> [REQ_ID=c68a19100d96] [VIEW_RENDER] themes/public/home
INFO - 2026-03-27 18:56:37 --> [REQ_ID=c68a19100d96] [MEMORY][commonData:start] 8388608
INFO - 2026-03-27 18:56:37 --> themesMemory usage: 8388608
DEBUG - 2026-03-27 18:56:37 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-27 18:56:37 --> [REQ_ID=497257e9f8c4] [FILTER_AFTER]
DEBUG - 2026-03-27 18:56:37 --> [REQ_ID=497257e9f8c4] [LIFECYCLE][END] status=200 duration_ms=508.56 memory_delta=4194304
INFO - 2026-03-27 18:56:37 --> [REQ_ID=c68a19100d96] [PERF] Execution time=0.508240
DEBUG - 2026-03-27 18:56:37 --> [REQ_ID=497257e9f8c4] [REQUEST][END]
INFO - 2026-03-27 18:56:37 --> [REQ_ID=497257e9f8c4] [PERF] Execution time=0.518162
DEBUG - 2026-03-27 18:56:50 --> [REQ_ID=8025e994f7ea] [REQUEST][START] GET /index.php/How-It-Works/Investment-Dashboard
DEBUG - 2026-03-27 18:56:50 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-27 18:56:50 --> [REQ_ID=8025e994f7ea] [FILTER_BEFORE] /index.php/How-It-Works/Investment-Dashboard
DEBUG - 2026-03-27 18:56:50 --> [REQ_ID=8025e994f7ea] [ROUTE] Controller=\App\Modules\Blog\Controllers\HowItWorksController Method=show
DEBUG - 2026-03-27 18:56:50 --> [REQ_ID=8025e994f7ea] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/How-It-Works/Investment-Dashboard
DEBUG - 2026-03-27 18:56:50 --> [CSRF] token name=csrf_test_name hash=786fe7dd6764cebdf8afe90f1e167628
DEBUG - 2026-03-27 18:56:50 --> [REQ_ID=4473ced564b3] [INIT] App\Modules\Blog\Controllers\HowItWorksController::GET
INFO - 2026-03-27 18:56:50 --> [REQ_ID=4473ced564b3] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-27 18:56:50 --> [REQ_ID=4473ced564b3] [METHOD_ENTRY] show
DEBUG - 2026-03-27 18:56:50 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-27 18:56:50 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-27 18:56:50 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-27 18:56:50 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-27 18:56:50 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-27 18:56:50 --> MyMICoin: guest context detected; skipping user-specific preload.
INFO - 2026-03-27 18:56:50 --> [REQ_ID=4473ced564b3] [MEMORY][commonData:start] 4194304
DEBUG - 2026-03-27 18:56:50 --> [REQ_ID=8025e994f7ea] [FILTER_AFTER]
DEBUG - 2026-03-27 18:56:50 --> [REQ_ID=8025e994f7ea] [LIFECYCLE][END] status=200 duration_ms=498.09 memory_delta=4194304
INFO - 2026-03-27 18:56:50 --> [REQ_ID=4473ced564b3] [PERF] Execution time=0.498109
DEBUG - 2026-03-27 18:56:50 --> [REQ_ID=8025e994f7ea] [REQUEST][END]
INFO - 2026-03-27 18:56:50 --> [REQ_ID=8025e994f7ea] [PERF] Execution time=0.509454
DEBUG - 2026-03-27 18:58:18 --> [REQ_ID=0624d6c8de00] [REQUEST][START] GET /
DEBUG - 2026-03-27 18:58:18 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-27 18:58:18 --> [REQ_ID=0624d6c8de00] [FILTER_BEFORE] /
DEBUG - 2026-03-27 18:58:18 --> [REQ_ID=0624d6c8de00] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-27 18:58:18 --> [REQ_ID=0624d6c8de00] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-27 18:58:18 --> [CSRF] token name=csrf_test_name hash=2294a6353396493bac2a960616151a9a
DEBUG - 2026-03-27 18:58:18 --> [REQ_ID=d557b99e9afe] [INIT] App\Controllers\Home::GET
INFO - 2026-03-27 18:58:18 --> [REQ_ID=d557b99e9afe] [MEMORY][controller-start] 6291456
INFO - 2026-03-27 18:58:18 --> [REQ_ID=d557b99e9afe] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-27 18:58:18 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-27 18:58:19 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
DEBUG - 2026-03-27 18:58:19 --> [REQ_ID=d557b99e9afe] [VIEW_RENDER] themes/public/home
INFO - 2026-03-27 18:58:19 --> [REQ_ID=d557b99e9afe] [MEMORY][commonData:start] 10485760
INFO - 2026-03-27 18:58:19 --> themesMemory usage: 10485760
DEBUG - 2026-03-27 18:58:19 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-27 18:58:19 --> [REQ_ID=0624d6c8de00] [FILTER_AFTER]
DEBUG - 2026-03-27 18:58:19 --> [REQ_ID=0624d6c8de00] [LIFECYCLE][END] status=200 duration_ms=607.18 memory_delta=4194304
INFO - 2026-03-27 18:58:19 --> [REQ_ID=d557b99e9afe] [PERF] Execution time=0.605209
DEBUG - 2026-03-27 18:58:19 --> [REQ_ID=0624d6c8de00] [REQUEST][END]
INFO - 2026-03-27 18:58:19 --> [REQ_ID=0624d6c8de00] [PERF] Execution time=0.645712
DEBUG - 2026-03-27 18:58:19 --> [REQ_ID=0f1b04aa3e39] [REQUEST][START] GET /
DEBUG - 2026-03-27 18:58:19 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-27 18:58:19 --> [REQ_ID=0f1b04aa3e39] [FILTER_BEFORE] /
DEBUG - 2026-03-27 18:58:19 --> [REQ_ID=0f1b04aa3e39] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-27 18:58:19 --> [REQ_ID=0f1b04aa3e39] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-27 18:58:19 --> [CSRF] token name=csrf_test_name hash=2294a6353396493bac2a960616151a9a
DEBUG - 2026-03-27 18:58:19 --> [REQ_ID=d6bd1f8b55c5] [INIT] App\Controllers\Home::GET
INFO - 2026-03-27 18:58:19 --> [REQ_ID=d6bd1f8b55c5] [MEMORY][controller-start] 4194304
INFO - 2026-03-27 18:58:19 --> [REQ_ID=d6bd1f8b55c5] [MEMORY][commonData:start] 4194304
DEBUG - 2026-03-27 18:58:19 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-27 18:58:19 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
DEBUG - 2026-03-27 18:58:19 --> [REQ_ID=d6bd1f8b55c5] [VIEW_RENDER] themes/public/home
INFO - 2026-03-27 18:58:19 --> [REQ_ID=d6bd1f8b55c5] [MEMORY][commonData:start] 8388608
INFO - 2026-03-27 18:58:19 --> themesMemory usage: 8388608
DEBUG - 2026-03-27 18:58:19 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-27 18:58:19 --> [REQ_ID=0f1b04aa3e39] [FILTER_AFTER]
DEBUG - 2026-03-27 18:58:19 --> [REQ_ID=0f1b04aa3e39] [LIFECYCLE][END] status=200 duration_ms=497.82 memory_delta=4194304
INFO - 2026-03-27 18:58:19 --> [REQ_ID=d6bd1f8b55c5] [PERF] Execution time=0.497631
DEBUG - 2026-03-27 18:58:19 --> [REQ_ID=0f1b04aa3e39] [REQUEST][END]
INFO - 2026-03-27 18:58:19 --> [REQ_ID=0f1b04aa3e39] [PERF] Execution time=0.507878
DEBUG - 2026-03-27 19:00:01 --> [REQ_ID=74e5eb63c9d7] [REQUEST][START] GET /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-27 19:00:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-27 19:00:01 --> [REQ_ID=74e5eb63c9d7] [FILTER_BEFORE] /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-27 19:00:01 --> [REQ_ID=74e5eb63c9d7] [ROUTE] Controller=\App\Modules\Management\Controllers\ManagementAPIController Method=Run_CRON_Tasks
DEBUG - 2026-03-27 19:00:01 --> [REQ_ID=74e5eb63c9d7] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-27 19:00:01 --> [REQ_ID=74e5eb63c9d7] [REQUEST][END]
INFO - 2026-03-27 19:00:01 --> [REQ_ID=74e5eb63c9d7] [PERF] Execution time=0.051423
DEBUG - 2026-03-27 19:00:07 --> [REQ_ID=92b00bf7d9ac] [REQUEST][START] GET /index.php/Projects/Fund
DEBUG - 2026-03-27 19:00:07 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-27 19:00:07 --> [REQ_ID=92b00bf7d9ac] [FILTER_BEFORE] /index.php/Projects/Fund
DEBUG - 2026-03-27 19:00:07 --> [REQ_ID=92b00bf7d9ac] [ROUTE] Controller=\App\Modules\User\Controllers\ProjectsController Method=fund
DEBUG - 2026-03-27 19:00:07 --> [REQ_ID=92b00bf7d9ac] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Projects/Fund
DEBUG - 2026-03-27 19:00:07 --> [CSRF] token name=csrf_test_name hash=1c980fc47d6f41583a37565cf21da3ba
DEBUG - 2026-03-27 19:00:07 --> [REQ_ID=92b00bf7d9ac] [REQUEST][END]
INFO - 2026-03-27 19:00:07 --> [REQ_ID=92b00bf7d9ac] [PERF] Execution time=0.034926
DEBUG - 2026-03-27 19:00:08 --> [REQ_ID=f82d4d0a610a] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-27 19:00:08 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-27 19:00:08 --> [REQ_ID=f82d4d0a610a] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-27 19:00:08 --> [REQ_ID=f82d4d0a610a] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-27 19:00:08 --> [REQ_ID=f82d4d0a610a] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-27 19:00:08 --> [CSRF] token name=csrf_test_name hash=c3611d84d57435e3aaa83668e210da3b
DEBUG - 2026-03-27 19:00:08 --> [REQ_ID=15bb05f24c63] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-27 19:00:08 --> [REQ_ID=15bb05f24c63] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-27 19:00:08 --> [REQ_ID=f82d4d0a610a] [FILTER_AFTER]
DEBUG - 2026-03-27 19:00:08 --> [REQ_ID=f82d4d0a610a] [LIFECYCLE][END] status=200 duration_ms=62.41 memory_delta=0
INFO - 2026-03-27 19:00:08 --> [REQ_ID=15bb05f24c63] [PERF] Execution time=0.058087
DEBUG - 2026-03-27 19:00:08 --> [REQ_ID=f82d4d0a610a] [REQUEST][END]
INFO - 2026-03-27 19:00:08 --> [REQ_ID=f82d4d0a610a] [PERF] Execution time=0.096611
DEBUG - 2026-03-27 19:01:22 --> [REQ_ID=68e1852ce5b4] [REQUEST][START] HEAD /
DEBUG - 2026-03-27 19:01:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-27 19:01:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-27 19:01:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-27 19:01:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-27 19:01:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-27 19:06:22 --> [REQ_ID=b1dc1927e551] [REQUEST][START] HEAD /
DEBUG - 2026-03-27 19:06:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-27 19:06:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-27 19:06:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-27 19:06:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-27 19:06:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-27 19:08:31 --> [REQ_ID=b9ecff023b7b] [REQUEST][START] GET /
DEBUG - 2026-03-27 19:08:31 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-27 19:08:31 --> [REQ_ID=b9ecff023b7b] [FILTER_BEFORE] /
DEBUG - 2026-03-27 19:08:31 --> [REQ_ID=b9ecff023b7b] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-27 19:08:31 --> [REQ_ID=b9ecff023b7b] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-27 19:08:31 --> [CSRF] token name=csrf_test_name hash=694c90323d4eb2dd49c1b8c805c818c6
DEBUG - 2026-03-27 19:08:31 --> [REQ_ID=7fa418b7f38d] [INIT] App\Controllers\Home::GET
INFO - 2026-03-27 19:08:31 --> [REQ_ID=7fa418b7f38d] [MEMORY][controller-start] 6291456
INFO - 2026-03-27 19:08:31 --> [REQ_ID=7fa418b7f38d] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-27 19:08:31 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-27 19:08:32 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
DEBUG - 2026-03-27 19:08:32 --> [REQ_ID=7fa418b7f38d] [VIEW_RENDER] themes/public/home
INFO - 2026-03-27 19:08:32 --> [REQ_ID=7fa418b7f38d] [MEMORY][commonData:start] 10485760
INFO - 2026-03-27 19:08:32 --> themesMemory usage: 10485760
DEBUG - 2026-03-27 19:08:32 --> [MetaService] slug= pageName=Home cacheHit= path=DB
DEBUG - 2026-03-27 19:08:32 --> [REQ_ID=b9ecff023b7b] [FILTER_AFTER]
DEBUG - 2026-03-27 19:08:32 --> [REQ_ID=b9ecff023b7b] [LIFECYCLE][END] status=200 duration_ms=602.21 memory_delta=4194304
INFO - 2026-03-27 19:08:32 --> [REQ_ID=7fa418b7f38d] [PERF] Execution time=0.600166
DEBUG - 2026-03-27 19:08:32 --> [REQ_ID=b9ecff023b7b] [REQUEST][END]
INFO - 2026-03-27 19:08:32 --> [REQ_ID=b9ecff023b7b] [PERF] Execution time=0.641815
DEBUG - 2026-03-27 19:11:22 --> [REQ_ID=2e690f748c6a] [REQUEST][START] HEAD /
DEBUG - 2026-03-27 19:11:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-27 19:11:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-27 19:11:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-27 19:11:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-27 19:11:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-27 19:15:01 --> [REQ_ID=830826cd5202] [REQUEST][START] GET /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-27 19:15:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-27 19:15:01 --> [REQ_ID=830826cd5202] [FILTER_BEFORE] /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-27 19:15:01 --> [REQ_ID=830826cd5202] [ROUTE] Controller=\App\Modules\APIs\Controllers\AlertsAPIController Method=fetchEmailAlerts
DEBUG - 2026-03-27 19:15:01 --> [REQ_ID=830826cd5202] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-27 19:15:01 --> [REQ_ID=830826cd5202] [REQUEST][END]
INFO - 2026-03-27 19:15:01 --> [REQ_ID=830826cd5202] [PERF] Execution time=0.048149
DEBUG - 2026-03-27 19:16:22 --> [REQ_ID=e113c777c2f1] [REQUEST][START] HEAD /
DEBUG - 2026-03-27 19:16:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-27 19:16:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-27 19:16:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-27 19:16:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-27 19:16:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-27 19:21:22 --> [REQ_ID=df834c8a9b17] [REQUEST][START] HEAD /
DEBUG - 2026-03-27 19:21:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-27 19:21:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-27 19:21:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-27 19:21:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-27 19:21:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-27 19:26:22 --> [REQ_ID=c12b9cde65fc] [REQUEST][START] HEAD /
DEBUG - 2026-03-27 19:26:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-27 19:26:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-27 19:26:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-27 19:26:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-27 19:26:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-27 19:31:22 --> [REQ_ID=483c6013b798] [REQUEST][START] HEAD /
DEBUG - 2026-03-27 19:31:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-27 19:31:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-27 19:31:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-27 19:31:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-27 19:31:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-27 19:36:22 --> [REQ_ID=ffc6cffbf388] [REQUEST][START] HEAD /
DEBUG - 2026-03-27 19:36:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-27 19:36:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-27 19:36:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-27 19:36:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-27 19:36:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-27 19:41:22 --> [REQ_ID=859fe4ff49dd] [REQUEST][START] HEAD /
DEBUG - 2026-03-27 19:41:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-27 19:41:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-27 19:41:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-27 19:41:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-27 19:41:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-27 19:46:22 --> [REQ_ID=7fc0a356cafe] [REQUEST][START] HEAD /
DEBUG - 2026-03-27 19:46:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-27 19:46:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-27 19:46:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-27 19:46:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-27 19:46:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-27 19:51:22 --> [REQ_ID=9a6fc84ae5c5] [REQUEST][START] HEAD /
DEBUG - 2026-03-27 19:51:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-27 19:51:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-27 19:51:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-27 19:51:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-27 19:51:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-27 19:56:22 --> [REQ_ID=534211072a00] [REQUEST][START] HEAD /
DEBUG - 2026-03-27 19:56:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-27 19:56:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-27 19:56:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-27 19:56:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-27 19:56:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-27 20:00:01 --> [REQ_ID=71e10c996ea7] [REQUEST][START] GET /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-27 20:00:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-27 20:00:01 --> [REQ_ID=71e10c996ea7] [FILTER_BEFORE] /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-27 20:00:01 --> [REQ_ID=71e10c996ea7] [ROUTE] Controller=\App\Modules\Management\Controllers\ManagementAPIController Method=Run_CRON_Tasks
DEBUG - 2026-03-27 20:00:01 --> [REQ_ID=71e10c996ea7] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-27 20:00:01 --> [REQ_ID=71e10c996ea7] [REQUEST][END]
INFO - 2026-03-27 20:00:01 --> [REQ_ID=71e10c996ea7] [PERF] Execution time=0.050607
DEBUG - 2026-03-27 20:01:22 --> [REQ_ID=b6c723926982] [REQUEST][START] HEAD /
DEBUG - 2026-03-27 20:01:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-27 20:01:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-27 20:01:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-27 20:01:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-27 20:01:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-27 20:06:22 --> [REQ_ID=febdd662eac9] [REQUEST][START] HEAD /
DEBUG - 2026-03-27 20:06:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-27 20:06:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-27 20:06:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-27 20:06:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-27 20:06:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-27 20:11:22 --> [REQ_ID=4df066fb949d] [REQUEST][START] HEAD /
DEBUG - 2026-03-27 20:11:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-27 20:11:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-27 20:11:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-27 20:11:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-27 20:11:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-27 20:15:01 --> [REQ_ID=3fdd6ec58fbb] [REQUEST][START] GET /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-27 20:15:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-27 20:15:02 --> [REQ_ID=3fdd6ec58fbb] [FILTER_BEFORE] /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-27 20:15:02 --> [REQ_ID=3fdd6ec58fbb] [ROUTE] Controller=\App\Modules\APIs\Controllers\AlertsAPIController Method=fetchEmailAlerts
DEBUG - 2026-03-27 20:15:02 --> [REQ_ID=3fdd6ec58fbb] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-27 20:15:02 --> [REQ_ID=3fdd6ec58fbb] [REQUEST][END]
INFO - 2026-03-27 20:15:02 --> [REQ_ID=3fdd6ec58fbb] [PERF] Execution time=0.044945
DEBUG - 2026-03-27 20:15:57 --> [REQ_ID=1d75d1403717] [REQUEST][START] GET /index.php/News/Pre-Market-Movers/November-17th-2021
DEBUG - 2026-03-27 20:15:57 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-27 20:15:57 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: GET, Route: News/Pre-Market-Movers/November-17th-2021]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-27 20:15:57 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-27 20:15:57 --> [404] URI=https://www.mymiwallet.com/index.php/News/Pre-Market-Movers/November-17th-2021
WARNING - 2026-03-27 20:15:57 --> 404 route miss: https://www.mymiwallet.com/index.php/News/Pre-Market-Movers/November-17th-2021 | referrer: none
ERROR - 2026-03-27 20:15:57 --> [ERROR_PAGE] event=error_404 status=404 message=Page not found.
DEBUG - 2026-03-27 20:16:22 --> [REQ_ID=7305abe2ad13] [REQUEST][START] HEAD /
DEBUG - 2026-03-27 20:16:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-27 20:16:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-27 20:16:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-27 20:16:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-27 20:16:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-27 20:21:22 --> [REQ_ID=525ee12d7558] [REQUEST][START] HEAD /
DEBUG - 2026-03-27 20:21:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-27 20:21:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-27 20:21:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-27 20:21:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-27 20:21:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-27 20:26:22 --> [REQ_ID=cc2391954bec] [REQUEST][START] HEAD /
DEBUG - 2026-03-27 20:26:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-27 20:26:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-27 20:26:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-27 20:26:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-27 20:26:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-27 20:28:38 --> [REQ_ID=64bf5ffa7e0c] [REQUEST][START] GET /index.php/Account
DEBUG - 2026-03-27 20:28:38 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-27 20:28:38 --> [REQ_ID=64bf5ffa7e0c] [FILTER_BEFORE] /index.php/Account
DEBUG - 2026-03-27 20:28:38 --> [REQ_ID=64bf5ffa7e0c] [ROUTE] Controller=\App\Modules\User\Controllers\DashboardController Method=account
DEBUG - 2026-03-27 20:28:38 --> [REQ_ID=64bf5ffa7e0c] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Account
DEBUG - 2026-03-27 20:28:38 --> [CSRF] token name=csrf_test_name hash=e419ea100248b3ddda0ab7cf634ff951
DEBUG - 2026-03-27 20:28:38 --> [REQ_ID=64bf5ffa7e0c] [REQUEST][END]
INFO - 2026-03-27 20:28:38 --> [REQ_ID=64bf5ffa7e0c] [PERF] Execution time=0.055827
DEBUG - 2026-03-27 20:28:38 --> [REQ_ID=979d255b3500] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-27 20:28:38 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-27 20:28:38 --> [REQ_ID=979d255b3500] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-27 20:28:38 --> [REQ_ID=979d255b3500] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-27 20:28:38 --> [REQ_ID=979d255b3500] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-27 20:28:38 --> [CSRF] token name=csrf_test_name hash=61de99a80556a4b49d5b9bae20dae0bb
DEBUG - 2026-03-27 20:28:38 --> [REQ_ID=ed793e5be2ca] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-27 20:28:38 --> [REQ_ID=ed793e5be2ca] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-27 20:28:39 --> [REQ_ID=979d255b3500] [FILTER_AFTER]
DEBUG - 2026-03-27 20:28:39 --> [REQ_ID=979d255b3500] [LIFECYCLE][END] status=200 duration_ms=366.39 memory_delta=0
INFO - 2026-03-27 20:28:39 --> [REQ_ID=ed793e5be2ca] [PERF] Execution time=0.365042
DEBUG - 2026-03-27 20:28:39 --> [REQ_ID=979d255b3500] [REQUEST][END]
INFO - 2026-03-27 20:28:39 --> [REQ_ID=979d255b3500] [PERF] Execution time=0.378043
DEBUG - 2026-03-27 20:31:22 --> [REQ_ID=91265eedd8e3] [REQUEST][START] HEAD /
DEBUG - 2026-03-27 20:31:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-27 20:31:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-27 20:31:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-27 20:31:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-27 20:31:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-27 20:36:22 --> [REQ_ID=e434a9202ada] [REQUEST][START] HEAD /
DEBUG - 2026-03-27 20:36:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-27 20:36:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-27 20:36:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-27 20:36:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-27 20:36:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-27 20:41:22 --> [REQ_ID=cfbded7fbf9f] [REQUEST][START] HEAD /
DEBUG - 2026-03-27 20:41:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-27 20:41:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-27 20:41:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-27 20:41:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-27 20:41:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-27 20:46:22 --> [REQ_ID=8711a5633e1d] [REQUEST][START] HEAD /
DEBUG - 2026-03-27 20:46:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-27 20:46:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-27 20:46:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-27 20:46:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-27 20:46:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-27 20:51:22 --> [REQ_ID=10a6bdd505c9] [REQUEST][START] HEAD /
DEBUG - 2026-03-27 20:51:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-27 20:51:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-27 20:51:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-27 20:51:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-27 20:51:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-27 20:56:22 --> [REQ_ID=1c46aa5b743d] [REQUEST][START] HEAD /
DEBUG - 2026-03-27 20:56:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-27 20:56:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-27 20:56:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-27 20:56:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-27 20:56:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-27 21:00:01 --> [REQ_ID=3fbfcc641eff] [REQUEST][START] GET /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-27 21:00:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-27 21:00:01 --> [REQ_ID=3fbfcc641eff] [FILTER_BEFORE] /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-27 21:00:01 --> [REQ_ID=3fbfcc641eff] [ROUTE] Controller=\App\Modules\Management\Controllers\ManagementAPIController Method=Run_CRON_Tasks
DEBUG - 2026-03-27 21:00:01 --> [REQ_ID=3fbfcc641eff] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-27 21:00:01 --> [REQ_ID=3fbfcc641eff] [REQUEST][END]
INFO - 2026-03-27 21:00:01 --> [REQ_ID=3fbfcc641eff] [PERF] Execution time=0.046542
DEBUG - 2026-03-27 21:01:22 --> [REQ_ID=c739779f2d43] [REQUEST][START] HEAD /
DEBUG - 2026-03-27 21:01:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-27 21:01:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-27 21:01:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-27 21:01:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-27 21:01:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-27 21:05:10 --> [REQ_ID=2a74bb53e68e] [REQUEST][START] GET /
DEBUG - 2026-03-27 21:05:10 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-27 21:05:10 --> [REQ_ID=2a74bb53e68e] [FILTER_BEFORE] /
DEBUG - 2026-03-27 21:05:10 --> [REQ_ID=2a74bb53e68e] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-27 21:05:10 --> [REQ_ID=2a74bb53e68e] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-27 21:05:10 --> [CSRF] token name=csrf_test_name hash=0edfdab3585f66fb6e5b41cec0f67f9d
DEBUG - 2026-03-27 21:05:10 --> [REQ_ID=4626e24ef9e8] [INIT] App\Controllers\Home::GET
INFO - 2026-03-27 21:05:10 --> [REQ_ID=4626e24ef9e8] [MEMORY][controller-start] 6291456
INFO - 2026-03-27 21:05:10 --> [REQ_ID=4626e24ef9e8] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-27 21:05:10 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-27 21:05:10 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-03-27 21:05:10 --> [REQ_ID=4626e24ef9e8] [VIEW_RENDER] themes/public/home
INFO - 2026-03-27 21:05:10 --> [REQ_ID=4626e24ef9e8] [MEMORY][commonData:start] 10485760
INFO - 2026-03-27 21:05:10 --> themesMemory usage: 10485760
DEBUG - 2026-03-27 21:05:10 --> [MetaService] slug= pageName=Home cacheHit= path=DB
DEBUG - 2026-03-27 21:05:10 --> [REQ_ID=2a74bb53e68e] [FILTER_AFTER]
DEBUG - 2026-03-27 21:05:10 --> [REQ_ID=2a74bb53e68e] [LIFECYCLE][END] status=200 duration_ms=811.30 memory_delta=4194304
INFO - 2026-03-27 21:05:10 --> [REQ_ID=4626e24ef9e8] [PERF] Execution time=0.809401
DEBUG - 2026-03-27 21:05:10 --> [REQ_ID=2a74bb53e68e] [REQUEST][END]
INFO - 2026-03-27 21:05:10 --> [REQ_ID=2a74bb53e68e] [PERF] Execution time=0.849725
DEBUG - 2026-03-27 21:05:11 --> [REQ_ID=a10710c42a08] [REQUEST][START] GET /index.php
DEBUG - 2026-03-27 21:05:11 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-27 21:05:11 --> [REQ_ID=a10710c42a08] [FILTER_BEFORE] /index.php
DEBUG - 2026-03-27 21:05:11 --> [REQ_ID=a10710c42a08] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-27 21:05:11 --> [REQ_ID=a10710c42a08] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-27 21:05:11 --> [CSRF] token name=csrf_test_name hash=0edfdab3585f66fb6e5b41cec0f67f9d
DEBUG - 2026-03-27 21:05:11 --> [REQ_ID=9b9b52dc7af7] [INIT] App\Controllers\Home::GET
INFO - 2026-03-27 21:05:11 --> [REQ_ID=9b9b52dc7af7] [MEMORY][controller-start] 6291456
INFO - 2026-03-27 21:05:11 --> [REQ_ID=9b9b52dc7af7] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-27 21:05:11 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-27 21:05:11 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
DEBUG - 2026-03-27 21:05:11 --> [REQ_ID=9b9b52dc7af7] [VIEW_RENDER] themes/public/home
INFO - 2026-03-27 21:05:11 --> [REQ_ID=9b9b52dc7af7] [MEMORY][commonData:start] 8388608
INFO - 2026-03-27 21:05:11 --> themesMemory usage: 8388608
DEBUG - 2026-03-27 21:05:11 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-27 21:05:11 --> [REQ_ID=a10710c42a08] [FILTER_AFTER]
DEBUG - 2026-03-27 21:05:11 --> [REQ_ID=a10710c42a08] [LIFECYCLE][END] status=200 duration_ms=478.06 memory_delta=2097152
INFO - 2026-03-27 21:05:11 --> [REQ_ID=9b9b52dc7af7] [PERF] Execution time=0.477828
DEBUG - 2026-03-27 21:05:11 --> [REQ_ID=a10710c42a08] [REQUEST][END]
INFO - 2026-03-27 21:05:11 --> [REQ_ID=a10710c42a08] [PERF] Execution time=0.489507
DEBUG - 2026-03-27 21:05:12 --> [REQ_ID=a2f01dad4886] [REQUEST][START] GET /index.php/blog
DEBUG - 2026-03-27 21:05:12 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-27 21:05:12 --> [REQ_ID=a2f01dad4886] [FILTER_BEFORE] /index.php/blog
DEBUG - 2026-03-27 21:05:12 --> [REQ_ID=a2f01dad4886] [ROUTE] Controller=\App\Controllers\Blog Method=index
DEBUG - 2026-03-27 21:05:12 --> [REQ_ID=a2f01dad4886] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/blog
DEBUG - 2026-03-27 21:05:12 --> [CSRF] token name=csrf_test_name hash=0edfdab3585f66fb6e5b41cec0f67f9d
DEBUG - 2026-03-27 21:05:12 --> [REQ_ID=281c4fa8443a] [INIT] App\Controllers\Blog::GET
INFO - 2026-03-27 21:05:12 --> [REQ_ID=281c4fa8443a] [MEMORY][controller-start] 6291456
ERROR - 2026-03-27 21:05:12 --> Table 'mymiwallet.blog_posts' doesn't exist
in SYSTEMPATH/Database/MySQLi/Connection.php on line 300.
 1 SYSTEMPATH/Database/MySQLi/Connection.php(300): mysqli->query('SELECT *
FROM `blog_posts`
WHERE `published_at` <= \'2026-03-27 21:05:12\'
ORDER BY `published_at` DESC
 LIMIT 20', 0)
 2 SYSTEMPATH/Database/BaseConnection.php(769): CodeIgniter\Database\MySQLi\Connection->execute('SELECT *
FROM `blog_posts`
WHERE `published_at` <= \'2026-03-27 21:05:12\'
ORDER BY `published_at` DESC
 LIMIT 20')
 3 SYSTEMPATH/Database/BaseConnection.php(686): CodeIgniter\Database\BaseConnection->simpleQuery('SELECT *
FROM `blog_posts`
WHERE `published_at` <= \'2026-03-27 21:05:12\'
ORDER BY `published_at` DESC
 LIMIT 20')
 4 SYSTEMPATH/Database/BaseBuilder.php(1649): CodeIgniter\Database\BaseConnection->query('SELECT *
FROM `blog_posts`
WHERE `published_at` <= :published_at:
ORDER BY `published_at` DESC
 LIMIT 20', [...], false)
 5 SYSTEMPATH/Model.php(254): CodeIgniter\Database\BaseBuilder->get()
 6 SYSTEMPATH/BaseModel.php(675): CodeIgniter\Model->doFindAll(20, 0)
 7 APPPATH/Models/BlogModel.php(45): CodeIgniter\BaseModel->findAll(20)
 8 APPPATH/Controllers/Blog.php(24): App\Models\BlogModel->getRecentPosts(10)
 9 SYSTEMPATH/CodeIgniter.php(951): App\Controllers\Blog->index()
10 SYSTEMPATH/CodeIgniter.php(497): CodeIgniter\CodeIgniter->runController(Object(App\Controllers\Blog))
11 SYSTEMPATH/CodeIgniter.php(340): CodeIgniter\CodeIgniter->handleRequest(null, Object(Config\Cache), false)
12 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
13 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
14 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
INFO - 2026-03-27 21:05:12 --> [REQ_ID=281c4fa8443a] [PERF] Execution time=0.032019
DEBUG - 2026-03-27 21:05:12 --> [REQ_ID=f79e763941ac] [REQUEST][START] GET /index.php/free/register
DEBUG - 2026-03-27 21:05:12 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-27 21:05:12 --> [REQ_ID=f79e763941ac] [FILTER_BEFORE] /index.php/free/register
DEBUG - 2026-03-27 21:05:12 --> [REQ_ID=f79e763941ac] [ROUTE] Controller=\App\Controllers\AuthController Method=register
DEBUG - 2026-03-27 21:05:12 --> [REQ_ID=f79e763941ac] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/free/register
DEBUG - 2026-03-27 21:05:12 --> [CSRF] token name=csrf_test_name hash=0edfdab3585f66fb6e5b41cec0f67f9d
DEBUG - 2026-03-27 21:05:12 --> [REQ_ID=03ff1d50a2f8] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-27 21:05:12 --> [REQ_ID=03ff1d50a2f8] [MEMORY][controller-start] 4194304
INFO - 2026-03-27 21:05:12 --> [REGISTRATION] Form loaded
INFO - 2026-03-27 21:05:12 --> [REQ_ID=03ff1d50a2f8] [PERF] Execution time=0.039948
DEBUG - 2026-03-27 21:05:12 --> [REQ_ID=0e6e31c43760] [REQUEST][START] GET /index.php/how-it-works/investor-profile
DEBUG - 2026-03-27 21:05:12 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-27 21:05:12 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: GET, Route: how-it-works/investor-profile]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-27 21:05:12 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-27 21:05:12 --> [404] URI=https://www.mymiwallet.com/index.php/how-it-works/investor-profile
WARNING - 2026-03-27 21:05:12 --> 404 route miss: https://www.mymiwallet.com/index.php/how-it-works/investor-profile | referrer: none
DEBUG - 2026-03-27 21:05:12 --> [REQ_ID=0413322dcde7] [REQUEST][START] GET /index.php/how-it-works/mymi-gold
DEBUG - 2026-03-27 21:05:12 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-27 21:05:12 --> [REQ_ID=5110a06118f9] [REQUEST][START] GET /index.php/how-it-works
CRITICAL - 2026-03-27 21:05:12 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: GET, Route: how-it-works/mymi-gold]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
DEBUG - 2026-03-27 21:05:12 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-27 21:05:12 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-27 21:05:12 --> [404] URI=https://www.mymiwallet.com/index.php/how-it-works/mymi-gold
WARNING - 2026-03-27 21:05:12 --> 404 route miss: https://www.mymiwallet.com/index.php/how-it-works/mymi-gold | referrer: none
DEBUG - 2026-03-27 21:05:12 --> [REQ_ID=8fcb25eb4836] [REQUEST][START] GET /index.php/knowledgebase
DEBUG - 2026-03-27 21:05:12 --> [REQ_ID=49793264007c] [REQUEST][START] GET /index.php/login
CRITICAL - 2026-03-27 21:05:13 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: GET, Route: how-it-works]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-27 21:05:13 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-27 21:05:13 --> [404] URI=https://www.mymiwallet.com/index.php/how-it-works
WARNING - 2026-03-27 21:05:13 --> 404 route miss: https://www.mymiwallet.com/index.php/how-it-works | referrer: none
DEBUG - 2026-03-27 21:05:13 --> [REQ_ID=ce4adb5aeedb] [REQUEST][START] GET /index.php/how-it-works/investment-portfolio-management
DEBUG - 2026-03-27 21:05:13 --> [REQ_ID=73cdf6c60800] [REQUEST][START] GET /index.php/how-it-works/personal-budgeting
DEBUG - 2026-03-27 21:05:13 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-27 21:05:13 --> [REQ_ID=171a173e7108] [REQUEST][START] GET /index.php/legal/terms-and-conditions
DEBUG - 2026-03-27 21:05:13 --> [REQ_ID=17c6b7dbf404] [REQUEST][START] GET /index.php/legal/privacy-policy
DEBUG - 2026-03-27 21:05:13 --> [REQ_ID=48f1c6f854fd] [REQUEST][START] GET /index.php/how-it-works/daily-financial-news
DEBUG - 2026-03-27 21:05:13 --> [REQ_ID=212ae00cd906] [REQUEST][START] GET /index.php/how-it-works/investment-dashboard
DEBUG - 2026-03-27 21:05:13 --> [REQ_ID=1db026acf95e] [REQUEST][START] GET /index.php/how-it-works/automated-financial-insights
CRITICAL - 2026-03-27 21:05:13 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: GET, Route: knowledgebase]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-27 21:05:13 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-27 21:05:13 --> [404] URI=https://www.mymiwallet.com/index.php/knowledgebase
WARNING - 2026-03-27 21:05:13 --> 404 route miss: https://www.mymiwallet.com/index.php/knowledgebase | referrer: none
DEBUG - 2026-03-27 21:05:13 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-27 21:05:13 --> [REQ_ID=49793264007c] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-27 21:05:13 --> [REQ_ID=49793264007c] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-27 21:05:13 --> [REQ_ID=49793264007c] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-27 21:05:13 --> [CSRF] token name=csrf_test_name hash=0edfdab3585f66fb6e5b41cec0f67f9d
DEBUG - 2026-03-27 21:05:13 --> [REQ_ID=98988248f162] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-27 21:05:13 --> [REQ_ID=98988248f162] [MEMORY][controller-start] 6291456
DEBUG - 2026-03-27 21:05:13 --> [REQ_ID=49793264007c] [FILTER_AFTER]
DEBUG - 2026-03-27 21:05:13 --> [REQ_ID=49793264007c] [LIFECYCLE][END] status=200 duration_ms=53.41 memory_delta=0
INFO - 2026-03-27 21:05:13 --> [REQ_ID=98988248f162] [PERF] Execution time=0.050435
DEBUG - 2026-03-27 21:05:13 --> [REQ_ID=49793264007c] [REQUEST][END]
INFO - 2026-03-27 21:05:13 --> [REQ_ID=49793264007c] [PERF] Execution time=0.464711
DEBUG - 2026-03-27 21:05:13 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-27 21:05:13 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: GET, Route: how-it-works/investment-portfolio-management]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-27 21:05:13 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-27 21:05:13 --> [404] URI=https://www.mymiwallet.com/index.php/how-it-works/investment-portfolio-management
WARNING - 2026-03-27 21:05:13 --> 404 route miss: https://www.mymiwallet.com/index.php/how-it-works/investment-portfolio-management | referrer: none
DEBUG - 2026-03-27 21:05:13 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-27 21:05:13 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: GET, Route: how-it-works/personal-budgeting]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-27 21:05:13 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-27 21:05:13 --> [404] URI=https://www.mymiwallet.com/index.php/how-it-works/personal-budgeting
WARNING - 2026-03-27 21:05:13 --> 404 route miss: https://www.mymiwallet.com/index.php/how-it-works/personal-budgeting | referrer: none
DEBUG - 2026-03-27 21:05:13 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-27 21:05:13 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: GET, Route: legal/terms-and-conditions]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-27 21:05:13 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-27 21:05:13 --> [404] URI=https://www.mymiwallet.com/index.php/legal/terms-and-conditions
WARNING - 2026-03-27 21:05:13 --> 404 route miss: https://www.mymiwallet.com/index.php/legal/terms-and-conditions | referrer: none
DEBUG - 2026-03-27 21:05:13 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-27 21:05:13 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: GET, Route: legal/privacy-policy]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-27 21:05:13 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-27 21:05:13 --> [404] URI=https://www.mymiwallet.com/index.php/legal/privacy-policy
WARNING - 2026-03-27 21:05:13 --> 404 route miss: https://www.mymiwallet.com/index.php/legal/privacy-policy | referrer: none
DEBUG - 2026-03-27 21:05:13 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-27 21:05:13 --> [REQ_ID=ef8a90289555] [REQUEST][START] GET /index.php/dashboard
CRITICAL - 2026-03-27 21:05:13 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: GET, Route: how-it-works/daily-financial-news]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
DEBUG - 2026-03-27 21:05:13 --> [REQ_ID=6b92bec1e59e] [REQUEST][START] GET /index.php/how-it-works/registering-an-account
CRITICAL - 2026-03-27 21:05:13 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-27 21:05:13 --> [404] URI=https://www.mymiwallet.com/index.php/how-it-works/daily-financial-news
WARNING - 2026-03-27 21:05:13 --> 404 route miss: https://www.mymiwallet.com/index.php/how-it-works/daily-financial-news | referrer: none
DEBUG - 2026-03-27 21:05:13 --> [REQ_ID=61eaeab88017] [REQUEST][START] GET /index.php/how-it-works/setting-financial-goals
DEBUG - 2026-03-27 21:05:13 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-27 21:05:13 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-27 21:05:13 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: GET, Route: how-it-works/setting-financial-goals]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-27 21:05:13 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-27 21:05:13 --> [404] URI=https://www.mymiwallet.com/index.php/how-it-works/setting-financial-goals
WARNING - 2026-03-27 21:05:13 --> 404 route miss: https://www.mymiwallet.com/index.php/how-it-works/setting-financial-goals | referrer: none
CRITICAL - 2026-03-27 21:05:13 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: GET, Route: how-it-works/investment-dashboard]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-27 21:05:13 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-27 21:05:13 --> [404] URI=https://www.mymiwallet.com/index.php/how-it-works/investment-dashboard
WARNING - 2026-03-27 21:05:13 --> 404 route miss: https://www.mymiwallet.com/index.php/how-it-works/investment-dashboard | referrer: none
DEBUG - 2026-03-27 21:05:13 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-27 21:05:13 --> [REQ_ID=3d0776241dae] [REQUEST][START] GET /index.php/how-it-works/mymi-exchange
DEBUG - 2026-03-27 21:05:13 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-27 21:05:13 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: GET, Route: how-it-works/mymi-exchange]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-27 21:05:13 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: GET, Route: how-it-works/automated-financial-insights]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-27 21:05:13 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-27 21:05:13 --> [404] URI=https://www.mymiwallet.com/index.php/how-it-works/mymi-exchange
WARNING - 2026-03-27 21:05:13 --> 404 route miss: https://www.mymiwallet.com/index.php/how-it-works/mymi-exchange | referrer: none
CRITICAL - 2026-03-27 21:05:13 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-27 21:05:13 --> [404] URI=https://www.mymiwallet.com/index.php/how-it-works/automated-financial-insights
WARNING - 2026-03-27 21:05:13 --> 404 route miss: https://www.mymiwallet.com/index.php/how-it-works/automated-financial-insights | referrer: none
DEBUG - 2026-03-27 21:05:13 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-27 21:05:13 --> [REQ_ID=99362af30ed1] [REQUEST][START] GET /index.php/privacy-policy
DEBUG - 2026-03-27 21:05:13 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-27 21:05:13 --> [REQ_ID=793935f4b3dc] [REQUEST][START] GET /index.php/terms-of-service
DEBUG - 2026-03-27 21:05:13 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-27 21:05:13 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: GET, Route: privacy-policy]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
DEBUG - 2026-03-27 21:05:13 --> [REQ_ID=9130e8e8bc8c] [REQUEST][START] GET /index.php/support
CRITICAL - 2026-03-27 21:05:13 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: GET, Route: dashboard]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
DEBUG - 2026-03-27 21:05:13 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-27 21:05:13 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
CRITICAL - 2026-03-27 21:05:13 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-27 21:05:13 --> [404] URI=https://www.mymiwallet.com/index.php/privacy-policy
WARNING - 2026-03-27 21:05:13 --> [404] URI=https://www.mymiwallet.com/index.php/dashboard
WARNING - 2026-03-27 21:05:13 --> 404 route miss: https://www.mymiwallet.com/index.php/privacy-policy | referrer: none
WARNING - 2026-03-27 21:05:13 --> 404 route miss: https://www.mymiwallet.com/index.php/dashboard | referrer: none
DEBUG - 2026-03-27 21:05:13 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-27 21:05:13 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: GET, Route: terms-of-service]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-27 21:05:13 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: GET, Route: support]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-27 21:05:13 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-27 21:05:13 --> [404] URI=https://www.mymiwallet.com/index.php/terms-of-service
WARNING - 2026-03-27 21:05:13 --> 404 route miss: https://www.mymiwallet.com/index.php/terms-of-service | referrer: none
CRITICAL - 2026-03-27 21:05:13 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-27 21:05:13 --> [404] URI=https://www.mymiwallet.com/index.php/support
CRITICAL - 2026-03-27 21:05:13 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: GET, Route: how-it-works/registering-an-account]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
WARNING - 2026-03-27 21:05:13 --> 404 route miss: https://www.mymiwallet.com/index.php/support | referrer: none
CRITICAL - 2026-03-27 21:05:13 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-27 21:05:13 --> [404] URI=https://www.mymiwallet.com/index.php/how-it-works/registering-an-account
WARNING - 2026-03-27 21:05:13 --> 404 route miss: https://www.mymiwallet.com/index.php/how-it-works/registering-an-account | referrer: none
DEBUG - 2026-03-27 21:06:22 --> [REQ_ID=864f610407b0] [REQUEST][START] HEAD /
DEBUG - 2026-03-27 21:06:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-27 21:06:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-27 21:06:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-27 21:06:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-27 21:06:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-27 21:08:19 --> [REQ_ID=c45dda22c88a] [REQUEST][START] GET /
DEBUG - 2026-03-27 21:08:19 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-27 21:08:20 --> [REQ_ID=c45dda22c88a] [FILTER_BEFORE] /
DEBUG - 2026-03-27 21:08:20 --> [REQ_ID=c45dda22c88a] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-27 21:08:20 --> [REQ_ID=c45dda22c88a] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-27 21:08:20 --> [CSRF] token name=csrf_test_name hash=cc9375dd1ded6b47cf0819f79cf8ab85
DEBUG - 2026-03-27 21:08:20 --> [REQ_ID=09a95d1c2c6a] [INIT] App\Controllers\Home::GET
INFO - 2026-03-27 21:08:20 --> [REQ_ID=09a95d1c2c6a] [MEMORY][controller-start] 4194304
INFO - 2026-03-27 21:08:20 --> [REQ_ID=09a95d1c2c6a] [MEMORY][commonData:start] 4194304
DEBUG - 2026-03-27 21:08:20 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-27 21:08:20 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
DEBUG - 2026-03-27 21:08:20 --> [REQ_ID=09a95d1c2c6a] [VIEW_RENDER] themes/public/home
INFO - 2026-03-27 21:08:20 --> [REQ_ID=09a95d1c2c6a] [MEMORY][commonData:start] 8388608
INFO - 2026-03-27 21:08:20 --> themesMemory usage: 8388608
DEBUG - 2026-03-27 21:08:20 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-27 21:08:20 --> [REQ_ID=c45dda22c88a] [FILTER_AFTER]
DEBUG - 2026-03-27 21:08:20 --> [REQ_ID=c45dda22c88a] [LIFECYCLE][END] status=200 duration_ms=560.03 memory_delta=4194304
INFO - 2026-03-27 21:08:20 --> [REQ_ID=09a95d1c2c6a] [PERF] Execution time=0.559758
DEBUG - 2026-03-27 21:08:20 --> [REQ_ID=c45dda22c88a] [REQUEST][END]
INFO - 2026-03-27 21:08:20 --> [REQ_ID=c45dda22c88a] [PERF] Execution time=0.569455
DEBUG - 2026-03-27 21:11:22 --> [REQ_ID=86a5ee738cca] [REQUEST][START] HEAD /
DEBUG - 2026-03-27 21:11:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-27 21:11:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-27 21:11:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-27 21:11:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-27 21:11:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-27 21:14:32 --> [REQ_ID=249dd61fd896] [REQUEST][START] HEAD /
DEBUG - 2026-03-27 21:14:32 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-27 21:14:32 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-27 21:14:32 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-27 21:14:32 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-27 21:14:32 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://mymiwallet.com/
DEBUG - 2026-03-27 21:15:01 --> [REQ_ID=ed26d201fdcd] [REQUEST][START] GET /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-27 21:15:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-27 21:15:02 --> [REQ_ID=ed26d201fdcd] [FILTER_BEFORE] /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-27 21:15:02 --> [REQ_ID=ed26d201fdcd] [ROUTE] Controller=\App\Modules\APIs\Controllers\AlertsAPIController Method=fetchEmailAlerts
DEBUG - 2026-03-27 21:15:02 --> [REQ_ID=ed26d201fdcd] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-27 21:15:02 --> [REQ_ID=ed26d201fdcd] [REQUEST][END]
INFO - 2026-03-27 21:15:02 --> [REQ_ID=ed26d201fdcd] [PERF] Execution time=0.028134
DEBUG - 2026-03-27 21:16:22 --> [REQ_ID=ce280c21404b] [REQUEST][START] HEAD /
DEBUG - 2026-03-27 21:16:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-27 21:16:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-27 21:16:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-27 21:16:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-27 21:16:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-27 21:21:22 --> [REQ_ID=f1841fb22c2a] [REQUEST][START] HEAD /
DEBUG - 2026-03-27 21:21:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-27 21:21:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-27 21:21:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-27 21:21:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-27 21:21:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-27 21:26:22 --> [REQ_ID=91f71ead98b0] [REQUEST][START] HEAD /
DEBUG - 2026-03-27 21:26:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-27 21:26:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-27 21:26:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-27 21:26:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-27 21:26:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-27 21:31:22 --> [REQ_ID=150a66d356e1] [REQUEST][START] HEAD /
DEBUG - 2026-03-27 21:31:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-27 21:31:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-27 21:31:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-27 21:31:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-27 21:31:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-27 21:36:22 --> [REQ_ID=1e3c257c981b] [REQUEST][START] HEAD /
DEBUG - 2026-03-27 21:36:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-27 21:36:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-27 21:36:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-27 21:36:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-27 21:36:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-27 21:41:22 --> [REQ_ID=6c96cf0081f4] [REQUEST][START] HEAD /
DEBUG - 2026-03-27 21:41:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-27 21:41:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-27 21:41:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-27 21:41:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-27 21:41:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-27 21:46:22 --> [REQ_ID=13d56e8c6680] [REQUEST][START] HEAD /
DEBUG - 2026-03-27 21:46:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-27 21:46:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-27 21:46:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-27 21:46:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-27 21:46:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-27 21:51:22 --> [REQ_ID=5488327d3132] [REQUEST][START] HEAD /
DEBUG - 2026-03-27 21:51:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-27 21:51:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-27 21:51:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-27 21:51:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-27 21:51:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-27 21:56:22 --> [REQ_ID=5e06f82fb8f0] [REQUEST][START] HEAD /
DEBUG - 2026-03-27 21:56:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-27 21:56:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-27 21:56:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-27 21:56:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-27 21:56:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-27 22:00:01 --> [REQ_ID=b3dbddc38c6c] [REQUEST][START] GET /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-27 22:00:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-27 22:00:01 --> [REQ_ID=b3dbddc38c6c] [FILTER_BEFORE] /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-27 22:00:01 --> [REQ_ID=b3dbddc38c6c] [ROUTE] Controller=\App\Modules\Management\Controllers\ManagementAPIController Method=Run_CRON_Tasks
DEBUG - 2026-03-27 22:00:01 --> [REQ_ID=b3dbddc38c6c] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-27 22:00:01 --> [REQ_ID=b3dbddc38c6c] [REQUEST][END]
INFO - 2026-03-27 22:00:01 --> [REQ_ID=b3dbddc38c6c] [PERF] Execution time=0.053413
DEBUG - 2026-03-27 22:01:22 --> [REQ_ID=e0fead849cc0] [REQUEST][START] HEAD /
DEBUG - 2026-03-27 22:01:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-27 22:01:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-27 22:01:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-27 22:01:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-27 22:01:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-27 22:06:22 --> [REQ_ID=256a4128c4fc] [REQUEST][START] HEAD /
DEBUG - 2026-03-27 22:06:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-27 22:06:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-27 22:06:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-27 22:06:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-27 22:06:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-27 22:11:22 --> [REQ_ID=c958e5baeb87] [REQUEST][START] HEAD /
DEBUG - 2026-03-27 22:11:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-27 22:11:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-27 22:11:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-27 22:11:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-27 22:11:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-27 22:15:01 --> [REQ_ID=0fb5ed7ba241] [REQUEST][START] GET /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-27 22:15:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-27 22:15:01 --> [REQ_ID=0fb5ed7ba241] [FILTER_BEFORE] /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-27 22:15:01 --> [REQ_ID=0fb5ed7ba241] [ROUTE] Controller=\App\Modules\APIs\Controllers\AlertsAPIController Method=fetchEmailAlerts
DEBUG - 2026-03-27 22:15:01 --> [REQ_ID=0fb5ed7ba241] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-27 22:15:01 --> [REQ_ID=0fb5ed7ba241] [REQUEST][END]
INFO - 2026-03-27 22:15:01 --> [REQ_ID=0fb5ed7ba241] [PERF] Execution time=0.047153
DEBUG - 2026-03-27 22:16:22 --> [REQ_ID=26a94cf80cb4] [REQUEST][START] HEAD /
DEBUG - 2026-03-27 22:16:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-27 22:16:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-27 22:16:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-27 22:16:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-27 22:16:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-27 22:21:22 --> [REQ_ID=16f42bcfd043] [REQUEST][START] HEAD /
DEBUG - 2026-03-27 22:21:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-27 22:21:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-27 22:21:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-27 22:21:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-27 22:21:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-27 22:21:32 --> [REQ_ID=949c8617e36e] [REQUEST][START] GET /
DEBUG - 2026-03-27 22:21:32 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-27 22:21:32 --> [REQ_ID=949c8617e36e] [FILTER_BEFORE] /
DEBUG - 2026-03-27 22:21:32 --> [REQ_ID=949c8617e36e] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-27 22:21:32 --> [REQ_ID=949c8617e36e] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-27 22:21:32 --> [CSRF] token name=csrf_test_name hash=6b2e943177cc066ccae32b83952f4eb1
DEBUG - 2026-03-27 22:21:32 --> [REQ_ID=e1c6878a7f42] [INIT] App\Controllers\Home::GET
INFO - 2026-03-27 22:21:32 --> [REQ_ID=e1c6878a7f42] [MEMORY][controller-start] 4194304
INFO - 2026-03-27 22:21:32 --> [REQ_ID=e1c6878a7f42] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-27 22:21:32 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-27 22:21:33 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-03-27 22:21:33 --> [REQ_ID=e1c6878a7f42] [VIEW_RENDER] themes/public/home
INFO - 2026-03-27 22:21:33 --> [REQ_ID=e1c6878a7f42] [MEMORY][commonData:start] 8388608
INFO - 2026-03-27 22:21:33 --> themesMemory usage: 8388608
DEBUG - 2026-03-27 22:21:33 --> [MetaService] slug= pageName=Home cacheHit= path=DB
DEBUG - 2026-03-27 22:21:33 --> [REQ_ID=949c8617e36e] [FILTER_AFTER]
DEBUG - 2026-03-27 22:21:33 --> [REQ_ID=949c8617e36e] [LIFECYCLE][END] status=200 duration_ms=651.80 memory_delta=4194304
INFO - 2026-03-27 22:21:33 --> [REQ_ID=e1c6878a7f42] [PERF] Execution time=0.649899
DEBUG - 2026-03-27 22:21:33 --> [REQ_ID=949c8617e36e] [REQUEST][END]
INFO - 2026-03-27 22:21:33 --> [REQ_ID=949c8617e36e] [PERF] Execution time=0.669872
DEBUG - 2026-03-27 22:26:22 --> [REQ_ID=cdd49ce2f74b] [REQUEST][START] HEAD /
DEBUG - 2026-03-27 22:26:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-27 22:26:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-27 22:26:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-27 22:26:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-27 22:26:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-27 22:31:22 --> [REQ_ID=e7309b10f2e6] [REQUEST][START] HEAD /
DEBUG - 2026-03-27 22:31:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-27 22:31:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-27 22:31:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-27 22:31:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-27 22:31:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-27 22:32:24 --> [REQ_ID=a6c68047d1eb] [REQUEST][START] GET /index.php/Knowledgebase/Account-And-Billing
DEBUG - 2026-03-27 22:32:24 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-27 22:32:24 --> ErrorException: Access level to App\Modules\User\Controllers\KnowledgebaseController::respondWithRendered() must be protected (as in class App\Controllers\BaseController) or weaker
[Method: GET, Route: Knowledgebase/Account-And-Billing]
in APPPATH/Modules/User/Controllers/KnowledgebaseController.php on line 535.
 1 [internal function]: CodeIgniter\Debug\Exceptions->shutdownHandler()
CRITICAL - 2026-03-27 22:32:24 --> [EXCEPTION] Access level to App\Modules\User\Controllers\KnowledgebaseController::respondWithRendered() must be protected (as in class App\Controllers\BaseController) or weaker File=/home/mymiteam/mymiwallet/site/current/app/Modules/User/Controllers/KnowledgebaseController.php Line=535
DEBUG - 2026-03-27 22:36:22 --> [REQ_ID=7fd28f160974] [REQUEST][START] HEAD /
DEBUG - 2026-03-27 22:36:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-27 22:36:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-27 22:36:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-27 22:36:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-27 22:36:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-27 22:40:37 --> [REQ_ID=0b687dcae96e] [REQUEST][START] GET /
DEBUG - 2026-03-27 22:40:37 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-27 22:40:37 --> [REQ_ID=0b687dcae96e] [FILTER_BEFORE] /
DEBUG - 2026-03-27 22:40:37 --> [REQ_ID=0b687dcae96e] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-27 22:40:37 --> [REQ_ID=0b687dcae96e] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-27 22:40:37 --> [CSRF] token name=csrf_test_name hash=56256599931547c3a09d70e7ff5b2a37
DEBUG - 2026-03-27 22:40:37 --> [REQ_ID=23cb2c0758ab] [INIT] App\Controllers\Home::GET
INFO - 2026-03-27 22:40:37 --> [REQ_ID=23cb2c0758ab] [MEMORY][controller-start] 6291456
INFO - 2026-03-27 22:40:37 --> [REQ_ID=23cb2c0758ab] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-27 22:40:37 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-27 22:40:38 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-03-27 22:40:38 --> [REQ_ID=23cb2c0758ab] [VIEW_RENDER] themes/public/home
INFO - 2026-03-27 22:40:38 --> [REQ_ID=23cb2c0758ab] [MEMORY][commonData:start] 10485760
INFO - 2026-03-27 22:40:38 --> themesMemory usage: 10485760
DEBUG - 2026-03-27 22:40:38 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-27 22:40:38 --> [REQ_ID=0b687dcae96e] [FILTER_AFTER]
DEBUG - 2026-03-27 22:40:38 --> [REQ_ID=0b687dcae96e] [LIFECYCLE][END] status=200 duration_ms=712.41 memory_delta=4194304
INFO - 2026-03-27 22:40:38 --> [REQ_ID=23cb2c0758ab] [PERF] Execution time=0.710453
DEBUG - 2026-03-27 22:40:38 --> [REQ_ID=0b687dcae96e] [REQUEST][END]
INFO - 2026-03-27 22:40:38 --> [REQ_ID=0b687dcae96e] [PERF] Execution time=0.753426
DEBUG - 2026-03-27 22:41:22 --> [REQ_ID=142b9bdf5011] [REQUEST][START] HEAD /
DEBUG - 2026-03-27 22:41:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-27 22:41:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-27 22:41:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-27 22:41:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-27 22:41:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-27 22:44:17 --> [REQ_ID=0c6f34236eb5] [REQUEST][START] GET /
DEBUG - 2026-03-27 22:44:17 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-27 22:44:17 --> [REQ_ID=0c6f34236eb5] [FILTER_BEFORE] /
DEBUG - 2026-03-27 22:44:17 --> [REQ_ID=0c6f34236eb5] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-27 22:44:17 --> [REQ_ID=0c6f34236eb5] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-27 22:44:17 --> [CSRF] token name=csrf_test_name hash=2e2d64fcef82b4b64b2acb79a5846495
DEBUG - 2026-03-27 22:44:17 --> [REQ_ID=ac51f2fbe846] [INIT] App\Controllers\Home::GET
INFO - 2026-03-27 22:44:17 --> [REQ_ID=ac51f2fbe846] [MEMORY][controller-start] 6291456
INFO - 2026-03-27 22:44:17 --> [REQ_ID=ac51f2fbe846] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-27 22:44:17 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-27 22:44:18 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
DEBUG - 2026-03-27 22:44:18 --> [REQ_ID=ac51f2fbe846] [VIEW_RENDER] themes/public/home
INFO - 2026-03-27 22:44:18 --> [REQ_ID=ac51f2fbe846] [MEMORY][commonData:start] 10485760
INFO - 2026-03-27 22:44:18 --> themesMemory usage: 10485760
DEBUG - 2026-03-27 22:44:18 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-27 22:44:18 --> [REQ_ID=0c6f34236eb5] [FILTER_AFTER]
DEBUG - 2026-03-27 22:44:18 --> [REQ_ID=0c6f34236eb5] [LIFECYCLE][END] status=200 duration_ms=844.77 memory_delta=4194304
INFO - 2026-03-27 22:44:18 --> [REQ_ID=ac51f2fbe846] [PERF] Execution time=0.843033
DEBUG - 2026-03-27 22:44:18 --> [REQ_ID=0c6f34236eb5] [REQUEST][END]
INFO - 2026-03-27 22:44:18 --> [REQ_ID=0c6f34236eb5] [PERF] Execution time=0.885797
DEBUG - 2026-03-27 22:44:18 --> [REQ_ID=04e3e3bce2a6] [REQUEST][START] GET /index.php
DEBUG - 2026-03-27 22:44:18 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-27 22:44:18 --> [REQ_ID=04e3e3bce2a6] [FILTER_BEFORE] /index.php
DEBUG - 2026-03-27 22:44:18 --> [REQ_ID=04e3e3bce2a6] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-27 22:44:18 --> [REQ_ID=04e3e3bce2a6] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-27 22:44:18 --> [CSRF] token name=csrf_test_name hash=2e2d64fcef82b4b64b2acb79a5846495
DEBUG - 2026-03-27 22:44:18 --> [REQ_ID=b241995478be] [INIT] App\Controllers\Home::GET
INFO - 2026-03-27 22:44:18 --> [REQ_ID=b241995478be] [MEMORY][controller-start] 6291456
INFO - 2026-03-27 22:44:18 --> [REQ_ID=b241995478be] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-27 22:44:18 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-27 22:44:19 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
DEBUG - 2026-03-27 22:44:19 --> [REQ_ID=b241995478be] [VIEW_RENDER] themes/public/home
INFO - 2026-03-27 22:44:19 --> [REQ_ID=b241995478be] [MEMORY][commonData:start] 8388608
INFO - 2026-03-27 22:44:19 --> themesMemory usage: 8388608
DEBUG - 2026-03-27 22:44:19 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-27 22:44:19 --> [REQ_ID=04e3e3bce2a6] [FILTER_AFTER]
DEBUG - 2026-03-27 22:44:19 --> [REQ_ID=04e3e3bce2a6] [LIFECYCLE][END] status=200 duration_ms=553.89 memory_delta=2097152
INFO - 2026-03-27 22:44:19 --> [REQ_ID=b241995478be] [PERF] Execution time=0.553904
DEBUG - 2026-03-27 22:44:19 --> [REQ_ID=04e3e3bce2a6] [REQUEST][END]
INFO - 2026-03-27 22:44:19 --> [REQ_ID=04e3e3bce2a6] [PERF] Execution time=0.563383
DEBUG - 2026-03-27 22:44:20 --> [REQ_ID=a79051feb2ac] [REQUEST][START] GET /
DEBUG - 2026-03-27 22:44:20 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-27 22:44:20 --> [REQ_ID=a79051feb2ac] [FILTER_BEFORE] /
DEBUG - 2026-03-27 22:44:20 --> [REQ_ID=a79051feb2ac] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-27 22:44:20 --> [REQ_ID=a79051feb2ac] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-27 22:44:20 --> [CSRF] token name=csrf_test_name hash=2e2d64fcef82b4b64b2acb79a5846495
DEBUG - 2026-03-27 22:44:20 --> [REQ_ID=3c8a58a1dd30] [INIT] App\Controllers\Home::GET
INFO - 2026-03-27 22:44:20 --> [REQ_ID=3c8a58a1dd30] [MEMORY][controller-start] 6291456
INFO - 2026-03-27 22:44:20 --> [REQ_ID=3c8a58a1dd30] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-27 22:44:20 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-27 22:44:21 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
DEBUG - 2026-03-27 22:44:21 --> [REQ_ID=3c8a58a1dd30] [VIEW_RENDER] themes/public/home
INFO - 2026-03-27 22:44:21 --> [REQ_ID=3c8a58a1dd30] [MEMORY][commonData:start] 8388608
INFO - 2026-03-27 22:44:21 --> themesMemory usage: 8388608
DEBUG - 2026-03-27 22:44:21 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-27 22:44:21 --> [REQ_ID=a79051feb2ac] [FILTER_AFTER]
DEBUG - 2026-03-27 22:44:21 --> [REQ_ID=a79051feb2ac] [LIFECYCLE][END] status=200 duration_ms=519.99 memory_delta=2097152
INFO - 2026-03-27 22:44:21 --> [REQ_ID=3c8a58a1dd30] [PERF] Execution time=0.519788
DEBUG - 2026-03-27 22:44:21 --> [REQ_ID=a79051feb2ac] [REQUEST][END]
INFO - 2026-03-27 22:44:21 --> [REQ_ID=a79051feb2ac] [PERF] Execution time=0.528859
DEBUG - 2026-03-27 22:44:21 --> [REQ_ID=fcb60eea8a19] [REQUEST][START] GET /index.php/Blog
DEBUG - 2026-03-27 22:44:21 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-27 22:44:21 --> [REQ_ID=fcb60eea8a19] [FILTER_BEFORE] /index.php/Blog
DEBUG - 2026-03-27 22:44:21 --> [REQ_ID=fcb60eea8a19] [ROUTE] Controller=\App\Modules\Blog\Controllers\BlogController Method=index
DEBUG - 2026-03-27 22:44:21 --> [REQ_ID=fcb60eea8a19] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Blog
DEBUG - 2026-03-27 22:44:21 --> [CSRF] token name=csrf_test_name hash=2e2d64fcef82b4b64b2acb79a5846495
DEBUG - 2026-03-27 22:44:21 --> [REQ_ID=4b3ef94dea34] [INIT] App\Modules\Blog\Controllers\BlogController::GET
INFO - 2026-03-27 22:44:21 --> [REQ_ID=4b3ef94dea34] [MEMORY][controller-start] 6291456
DEBUG - 2026-03-27 22:44:21 --> [REQ_ID=4b3ef94dea34] [METHOD_ENTRY] index
DEBUG - 2026-03-27 22:44:21 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-27 22:44:21 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-27 22:44:21 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-27 22:44:21 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-27 22:44:21 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-27 22:44:21 --> MyMICoin: guest context detected; skipping user-specific preload.
INFO - 2026-03-27 22:44:21 --> [REQ_ID=4b3ef94dea34] [MEMORY][commonData:start] 6291456
INFO - 2026-03-27 22:44:21 --> [REQ_ID=4b3ef94dea34] [PERF] Execution time=0.050177
DEBUG - 2026-03-27 22:44:22 --> [REQ_ID=1528eb0a7643] [REQUEST][START] GET /
DEBUG - 2026-03-27 22:44:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-27 22:44:22 --> [REQ_ID=1528eb0a7643] [FILTER_BEFORE] /
DEBUG - 2026-03-27 22:44:22 --> [REQ_ID=1528eb0a7643] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-27 22:44:22 --> [REQ_ID=1528eb0a7643] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-27 22:44:22 --> [CSRF] token name=csrf_test_name hash=2e2d64fcef82b4b64b2acb79a5846495
DEBUG - 2026-03-27 22:44:22 --> [REQ_ID=c47fdb40597f] [INIT] App\Controllers\Home::GET
INFO - 2026-03-27 22:44:22 --> [REQ_ID=c47fdb40597f] [MEMORY][controller-start] 6291456
INFO - 2026-03-27 22:44:22 --> [REQ_ID=c47fdb40597f] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-27 22:44:22 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-27 22:44:22 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
DEBUG - 2026-03-27 22:44:22 --> [REQ_ID=c47fdb40597f] [VIEW_RENDER] themes/public/home
INFO - 2026-03-27 22:44:22 --> [REQ_ID=c47fdb40597f] [MEMORY][commonData:start] 8388608
INFO - 2026-03-27 22:44:22 --> themesMemory usage: 8388608
DEBUG - 2026-03-27 22:44:22 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-27 22:44:22 --> [REQ_ID=1528eb0a7643] [FILTER_AFTER]
DEBUG - 2026-03-27 22:44:22 --> [REQ_ID=1528eb0a7643] [LIFECYCLE][END] status=200 duration_ms=515.95 memory_delta=2097152
INFO - 2026-03-27 22:44:22 --> [REQ_ID=c47fdb40597f] [PERF] Execution time=0.515714
DEBUG - 2026-03-27 22:44:22 --> [REQ_ID=1528eb0a7643] [REQUEST][END]
INFO - 2026-03-27 22:44:22 --> [REQ_ID=1528eb0a7643] [PERF] Execution time=0.525320
DEBUG - 2026-03-27 22:44:23 --> [REQ_ID=d90fdc1f9466] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-27 22:44:23 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-27 22:44:23 --> [REQ_ID=d90fdc1f9466] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-27 22:44:23 --> [REQ_ID=d90fdc1f9466] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-27 22:44:23 --> [REQ_ID=d90fdc1f9466] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-27 22:44:23 --> [CSRF] token name=csrf_test_name hash=2e2d64fcef82b4b64b2acb79a5846495
DEBUG - 2026-03-27 22:44:23 --> [REQ_ID=6855fd321f00] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-27 22:44:23 --> [REQ_ID=6855fd321f00] [MEMORY][controller-start] 6291456
DEBUG - 2026-03-27 22:44:23 --> [REQ_ID=d90fdc1f9466] [FILTER_AFTER]
DEBUG - 2026-03-27 22:44:23 --> [REQ_ID=d90fdc1f9466] [LIFECYCLE][END] status=200 duration_ms=21.37 memory_delta=0
INFO - 2026-03-27 22:44:23 --> [REQ_ID=6855fd321f00] [PERF] Execution time=0.021071
DEBUG - 2026-03-27 22:44:23 --> [REQ_ID=d90fdc1f9466] [REQUEST][END]
INFO - 2026-03-27 22:44:23 --> [REQ_ID=d90fdc1f9466] [PERF] Execution time=0.033217
DEBUG - 2026-03-27 22:44:24 --> [REQ_ID=ba6ef98d8c88] [REQUEST][START] GET /
DEBUG - 2026-03-27 22:44:24 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-27 22:44:24 --> [REQ_ID=ba6ef98d8c88] [FILTER_BEFORE] /
DEBUG - 2026-03-27 22:44:24 --> [REQ_ID=ba6ef98d8c88] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-27 22:44:24 --> [REQ_ID=ba6ef98d8c88] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-27 22:44:24 --> [CSRF] token name=csrf_test_name hash=2e2d64fcef82b4b64b2acb79a5846495
DEBUG - 2026-03-27 22:44:24 --> [REQ_ID=d4a4db89f5ec] [INIT] App\Controllers\Home::GET
INFO - 2026-03-27 22:44:24 --> [REQ_ID=d4a4db89f5ec] [MEMORY][controller-start] 4194304
INFO - 2026-03-27 22:44:24 --> [REQ_ID=d4a4db89f5ec] [MEMORY][commonData:start] 4194304
DEBUG - 2026-03-27 22:44:24 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-27 22:44:24 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
DEBUG - 2026-03-27 22:44:24 --> [REQ_ID=d4a4db89f5ec] [VIEW_RENDER] themes/public/home
INFO - 2026-03-27 22:44:24 --> [REQ_ID=d4a4db89f5ec] [MEMORY][commonData:start] 8388608
INFO - 2026-03-27 22:44:24 --> themesMemory usage: 8388608
DEBUG - 2026-03-27 22:44:24 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-27 22:44:24 --> [REQ_ID=ba6ef98d8c88] [FILTER_AFTER]
DEBUG - 2026-03-27 22:44:24 --> [REQ_ID=ba6ef98d8c88] [LIFECYCLE][END] status=200 duration_ms=529.46 memory_delta=4194304
INFO - 2026-03-27 22:44:24 --> [REQ_ID=d4a4db89f5ec] [PERF] Execution time=0.529341
DEBUG - 2026-03-27 22:44:24 --> [REQ_ID=ba6ef98d8c88] [REQUEST][END]
INFO - 2026-03-27 22:44:24 --> [REQ_ID=ba6ef98d8c88] [PERF] Execution time=0.538894
DEBUG - 2026-03-27 22:44:25 --> [REQ_ID=cefbecf92009] [REQUEST][START] GET /index.php/register
DEBUG - 2026-03-27 22:44:25 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-27 22:44:25 --> [REQ_ID=cefbecf92009] [FILTER_BEFORE] /index.php/register
DEBUG - 2026-03-27 22:44:25 --> [REQ_ID=cefbecf92009] [ROUTE] Controller=\App\Controllers\AuthController Method=register
DEBUG - 2026-03-27 22:44:25 --> [REQ_ID=cefbecf92009] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/register
DEBUG - 2026-03-27 22:44:25 --> [CSRF] token name=csrf_test_name hash=2e2d64fcef82b4b64b2acb79a5846495
DEBUG - 2026-03-27 22:44:25 --> [REQ_ID=efb3646a603a] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-27 22:44:25 --> [REQ_ID=efb3646a603a] [MEMORY][controller-start] 6291456
INFO - 2026-03-27 22:44:25 --> [REGISTRATION] Form loaded
INFO - 2026-03-27 22:44:25 --> [REQ_ID=efb3646a603a] [PERF] Execution time=0.015176
DEBUG - 2026-03-27 22:44:25 --> [REQ_ID=0b6571c2c4b6] [REQUEST][START] GET /index.php/Legal/Terms-And-Conditions
DEBUG - 2026-03-27 22:44:25 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-27 22:44:25 --> [REQ_ID=0b6571c2c4b6] [FILTER_BEFORE] /index.php/Legal/Terms-And-Conditions
DEBUG - 2026-03-27 22:44:25 --> [REQ_ID=0b6571c2c4b6] [ROUTE] Controller=\App\Controllers\Home Method=terms
DEBUG - 2026-03-27 22:44:25 --> [REQ_ID=0b6571c2c4b6] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Legal/Terms-And-Conditions
DEBUG - 2026-03-27 22:44:25 --> [CSRF] token name=csrf_test_name hash=2e2d64fcef82b4b64b2acb79a5846495
DEBUG - 2026-03-27 22:44:25 --> [REQ_ID=0b6571c2c4b6] [REQUEST][END]
INFO - 2026-03-27 22:44:25 --> [REQ_ID=0b6571c2c4b6] [PERF] Execution time=0.009422
DEBUG - 2026-03-27 22:44:26 --> [REQ_ID=3541815d8746] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-27 22:44:26 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-27 22:44:26 --> [REQ_ID=3541815d8746] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-27 22:44:26 --> [REQ_ID=3541815d8746] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-27 22:44:26 --> [REQ_ID=3541815d8746] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-27 22:44:26 --> [CSRF] token name=csrf_test_name hash=2e2d64fcef82b4b64b2acb79a5846495
DEBUG - 2026-03-27 22:44:26 --> [REQ_ID=138568c980f7] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-27 22:44:26 --> [REQ_ID=138568c980f7] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-27 22:44:26 --> [REQ_ID=3541815d8746] [FILTER_AFTER]
DEBUG - 2026-03-27 22:44:26 --> [REQ_ID=3541815d8746] [LIFECYCLE][END] status=200 duration_ms=16.73 memory_delta=0
INFO - 2026-03-27 22:44:26 --> [REQ_ID=138568c980f7] [PERF] Execution time=0.016593
DEBUG - 2026-03-27 22:44:26 --> [REQ_ID=3541815d8746] [REQUEST][END]
INFO - 2026-03-27 22:44:26 --> [REQ_ID=3541815d8746] [PERF] Execution time=0.025958
DEBUG - 2026-03-27 22:44:26 --> [REQ_ID=118a9043724c] [REQUEST][START] GET /index.php/Support
DEBUG - 2026-03-27 22:44:26 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-27 22:44:26 --> [REQ_ID=118a9043724c] [FILTER_BEFORE] /index.php/Support
DEBUG - 2026-03-27 22:44:26 --> [REQ_ID=118a9043724c] [ROUTE] Controller=\App\Modules\Support\Controllers\SupportController Method=index
DEBUG - 2026-03-27 22:44:26 --> [REQ_ID=118a9043724c] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Support
DEBUG - 2026-03-27 22:44:26 --> [CSRF] token name=csrf_test_name hash=2e2d64fcef82b4b64b2acb79a5846495
DEBUG - 2026-03-27 22:44:26 --> [REQ_ID=6a3c03cee6c7] [INIT] App\Modules\Support\Controllers\SupportController::GET
INFO - 2026-03-27 22:44:26 --> [REQ_ID=6a3c03cee6c7] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-27 22:44:26 --> [REQ_ID=6a3c03cee6c7] [METHOD_ENTRY] index
DEBUG - 2026-03-27 22:44:26 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-27 22:44:26 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-27 22:44:26 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-27 22:44:26 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-27 22:44:26 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-27 22:44:26 --> MyMICoin: guest context detected; skipping user-specific preload.
INFO - 2026-03-27 22:44:26 --> [REQ_ID=6a3c03cee6c7] [MEMORY][commonData:start] 4194304
DEBUG - 2026-03-27 22:44:26 --> [REQ_ID=6a3c03cee6c7] [VIEW_RENDER] SupportModule\Views\Support\index
INFO - 2026-03-27 22:44:26 --> [REQ_ID=6a3c03cee6c7] [MEMORY][commonData:start] 4194304
INFO - 2026-03-27 22:44:26 --> themesMemory usage: 4194304
DEBUG - 2026-03-27 22:44:26 --> [REQ_ID=118a9043724c] [FILTER_AFTER]
DEBUG - 2026-03-27 22:44:26 --> [REQ_ID=118a9043724c] [LIFECYCLE][END] status=200 duration_ms=38.07 memory_delta=0
INFO - 2026-03-27 22:44:26 --> [REQ_ID=6a3c03cee6c7] [PERF] Execution time=0.037930
DEBUG - 2026-03-27 22:44:26 --> [REQ_ID=118a9043724c] [REQUEST][END]
INFO - 2026-03-27 22:44:26 --> [REQ_ID=118a9043724c] [PERF] Execution time=0.048319
DEBUG - 2026-03-27 22:44:27 --> [REQ_ID=2dd7677a06ef] [REQUEST][START] GET /index.php/Account/Activity
DEBUG - 2026-03-27 22:44:27 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-27 22:44:27 --> [REQ_ID=2dd7677a06ef] [FILTER_BEFORE] /index.php/Account/Activity
DEBUG - 2026-03-27 22:44:27 --> [REQ_ID=2dd7677a06ef] [ROUTE] Controller=\App\Modules\User\Controllers\DashboardController Method=activity
DEBUG - 2026-03-27 22:44:27 --> [REQ_ID=2dd7677a06ef] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Account/Activity
DEBUG - 2026-03-27 22:44:27 --> [CSRF] token name=csrf_test_name hash=2e2d64fcef82b4b64b2acb79a5846495
DEBUG - 2026-03-27 22:44:27 --> [REQ_ID=2dd7677a06ef] [REQUEST][END]
INFO - 2026-03-27 22:44:27 --> [REQ_ID=2dd7677a06ef] [PERF] Execution time=0.014488
DEBUG - 2026-03-27 22:44:27 --> [REQ_ID=c45450083711] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-27 22:44:27 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-27 22:44:27 --> [REQ_ID=c45450083711] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-27 22:44:27 --> [REQ_ID=c45450083711] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-27 22:44:27 --> [REQ_ID=c45450083711] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-27 22:44:27 --> [CSRF] token name=csrf_test_name hash=2e2d64fcef82b4b64b2acb79a5846495
DEBUG - 2026-03-27 22:44:27 --> [REQ_ID=d2596c90d49c] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-27 22:44:27 --> [REQ_ID=d2596c90d49c] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-27 22:44:27 --> [REQ_ID=c45450083711] [FILTER_AFTER]
DEBUG - 2026-03-27 22:44:27 --> [REQ_ID=c45450083711] [LIFECYCLE][END] status=200 duration_ms=19.05 memory_delta=0
INFO - 2026-03-27 22:44:27 --> [REQ_ID=d2596c90d49c] [PERF] Execution time=0.018963
DEBUG - 2026-03-27 22:44:27 --> [REQ_ID=c45450083711] [REQUEST][END]
INFO - 2026-03-27 22:44:27 --> [REQ_ID=c45450083711] [PERF] Execution time=0.028572
DEBUG - 2026-03-27 22:44:28 --> [REQ_ID=1d804dd62984] [REQUEST][START] GET /index.php/Customer-Support
DEBUG - 2026-03-27 22:44:28 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-27 22:44:28 --> [REQ_ID=1d804dd62984] [FILTER_BEFORE] /index.php/Customer-Support
DEBUG - 2026-03-27 22:44:28 --> [REQ_ID=1d804dd62984] [ROUTE] Controller=\App\Controllers\App\Modules\Support\Controllers\SupportController Method=index
DEBUG - 2026-03-27 22:44:28 --> [REQ_ID=1d804dd62984] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Customer-Support
DEBUG - 2026-03-27 22:44:28 --> [CSRF] token name=csrf_test_name hash=2e2d64fcef82b4b64b2acb79a5846495
DEBUG - 2026-03-27 22:44:28 --> [REQ_ID=1d804dd62984] [REQUEST][END]
INFO - 2026-03-27 22:44:28 --> [REQ_ID=1d804dd62984] [PERF] Execution time=0.008837
DEBUG - 2026-03-27 22:44:28 --> [REQ_ID=5f95fb3353c4] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-27 22:44:28 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-27 22:44:28 --> [REQ_ID=5f95fb3353c4] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-27 22:44:28 --> [REQ_ID=5f95fb3353c4] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-27 22:44:28 --> [REQ_ID=5f95fb3353c4] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-27 22:44:28 --> [CSRF] token name=csrf_test_name hash=2e2d64fcef82b4b64b2acb79a5846495
DEBUG - 2026-03-27 22:44:28 --> [REQ_ID=2507a745bd46] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-27 22:44:28 --> [REQ_ID=2507a745bd46] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-27 22:44:28 --> [REQ_ID=5f95fb3353c4] [FILTER_AFTER]
DEBUG - 2026-03-27 22:44:28 --> [REQ_ID=5f95fb3353c4] [LIFECYCLE][END] status=200 duration_ms=16.81 memory_delta=0
INFO - 2026-03-27 22:44:28 --> [REQ_ID=2507a745bd46] [PERF] Execution time=0.016820
DEBUG - 2026-03-27 22:44:28 --> [REQ_ID=5f95fb3353c4] [REQUEST][END]
INFO - 2026-03-27 22:44:28 --> [REQ_ID=5f95fb3353c4] [PERF] Execution time=0.025767
DEBUG - 2026-03-27 22:46:22 --> [REQ_ID=59dd6cce9551] [REQUEST][START] HEAD /
DEBUG - 2026-03-27 22:46:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-27 22:46:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-27 22:46:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-27 22:46:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-27 22:46:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-27 22:47:03 --> [REQ_ID=a54383d1c1c0] [REQUEST][START] GET /
DEBUG - 2026-03-27 22:47:03 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-27 22:47:03 --> [REQ_ID=a54383d1c1c0] [FILTER_BEFORE] /
DEBUG - 2026-03-27 22:47:03 --> [REQ_ID=a54383d1c1c0] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-27 22:47:03 --> [REQ_ID=a54383d1c1c0] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-27 22:47:03 --> [CSRF] token name=csrf_test_name hash=85cff223c709d2954a31224d39a157a5
DEBUG - 2026-03-27 22:47:03 --> [REQ_ID=9935e624306c] [INIT] App\Controllers\Home::GET
INFO - 2026-03-27 22:47:03 --> [REQ_ID=9935e624306c] [MEMORY][controller-start] 4194304
INFO - 2026-03-27 22:47:03 --> [REQ_ID=9935e624306c] [MEMORY][commonData:start] 4194304
DEBUG - 2026-03-27 22:47:03 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-27 22:47:04 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
DEBUG - 2026-03-27 22:47:04 --> [REQ_ID=9935e624306c] [VIEW_RENDER] themes/public/home
INFO - 2026-03-27 22:47:04 --> [REQ_ID=9935e624306c] [MEMORY][commonData:start] 8388608
INFO - 2026-03-27 22:47:04 --> themesMemory usage: 8388608
DEBUG - 2026-03-27 22:47:04 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-27 22:47:04 --> [REQ_ID=a54383d1c1c0] [FILTER_AFTER]
DEBUG - 2026-03-27 22:47:04 --> [REQ_ID=a54383d1c1c0] [LIFECYCLE][END] status=200 duration_ms=655.61 memory_delta=4194304
INFO - 2026-03-27 22:47:04 --> [REQ_ID=9935e624306c] [PERF] Execution time=0.653677
DEBUG - 2026-03-27 22:47:04 --> [REQ_ID=a54383d1c1c0] [REQUEST][END]
INFO - 2026-03-27 22:47:04 --> [REQ_ID=a54383d1c1c0] [PERF] Execution time=0.675561
DEBUG - 2026-03-27 22:51:22 --> [REQ_ID=4a336f9f4b6a] [REQUEST][START] HEAD /
DEBUG - 2026-03-27 22:51:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-27 22:51:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-27 22:51:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-27 22:51:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-27 22:51:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-27 22:56:22 --> [REQ_ID=519622372d2a] [REQUEST][START] HEAD /
DEBUG - 2026-03-27 22:56:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-27 22:56:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-27 22:56:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-27 22:56:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-27 22:56:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-27 23:00:01 --> [REQ_ID=71ad238e1b0a] [REQUEST][START] GET /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-27 23:00:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-27 23:00:01 --> [REQ_ID=71ad238e1b0a] [FILTER_BEFORE] /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-27 23:00:01 --> [REQ_ID=71ad238e1b0a] [ROUTE] Controller=\App\Modules\Management\Controllers\ManagementAPIController Method=Run_CRON_Tasks
DEBUG - 2026-03-27 23:00:01 --> [REQ_ID=71ad238e1b0a] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-27 23:00:01 --> [REQ_ID=71ad238e1b0a] [REQUEST][END]
INFO - 2026-03-27 23:00:01 --> [REQ_ID=71ad238e1b0a] [PERF] Execution time=0.055585
DEBUG - 2026-03-27 23:01:22 --> [REQ_ID=599dddf8d0db] [REQUEST][START] HEAD /
DEBUG - 2026-03-27 23:01:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-27 23:01:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-27 23:01:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-27 23:01:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-27 23:01:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-27 23:05:13 --> [REQ_ID=8533e75604a1] [REQUEST][START] GET /index.php/How-It-Works/earnings
DEBUG - 2026-03-27 23:05:13 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-27 23:05:13 --> [REQ_ID=8533e75604a1] [REQUEST][END]
INFO - 2026-03-27 23:05:13 --> [REQ_ID=8533e75604a1] [PERF] Execution time=0.041285
DEBUG - 2026-03-27 23:06:22 --> [REQ_ID=fa55032185fd] [REQUEST][START] HEAD /
DEBUG - 2026-03-27 23:06:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-27 23:06:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-27 23:06:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-27 23:06:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-27 23:06:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-27 23:11:22 --> [REQ_ID=7f57a76838c5] [REQUEST][START] HEAD /
DEBUG - 2026-03-27 23:11:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-27 23:11:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-27 23:11:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-27 23:11:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-27 23:11:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-27 23:15:01 --> [REQ_ID=e2c578f18631] [REQUEST][START] GET /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-27 23:15:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-27 23:15:01 --> [REQ_ID=e2c578f18631] [FILTER_BEFORE] /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-27 23:15:01 --> [REQ_ID=e2c578f18631] [ROUTE] Controller=\App\Modules\APIs\Controllers\AlertsAPIController Method=fetchEmailAlerts
DEBUG - 2026-03-27 23:15:01 --> [REQ_ID=e2c578f18631] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-27 23:15:01 --> [REQ_ID=e2c578f18631] [REQUEST][END]
INFO - 2026-03-27 23:15:01 --> [REQ_ID=e2c578f18631] [PERF] Execution time=0.045293
DEBUG - 2026-03-27 23:16:22 --> [REQ_ID=2404a3cca27a] [REQUEST][START] HEAD /
DEBUG - 2026-03-27 23:16:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-27 23:16:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-27 23:16:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-27 23:16:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-27 23:16:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-27 23:21:22 --> [REQ_ID=134a5c74ad42] [REQUEST][START] HEAD /
DEBUG - 2026-03-27 23:21:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-27 23:21:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-27 23:21:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-27 23:21:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-27 23:21:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-27 23:26:22 --> [REQ_ID=b4fa7b658874] [REQUEST][START] HEAD /
DEBUG - 2026-03-27 23:26:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-27 23:26:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-27 23:26:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-27 23:26:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-27 23:26:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-27 23:31:22 --> [REQ_ID=53c5f8195ad3] [REQUEST][START] HEAD /
DEBUG - 2026-03-27 23:31:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-27 23:31:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-27 23:31:23 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-27 23:31:23 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-27 23:31:23 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-27 23:36:22 --> [REQ_ID=609b86beb966] [REQUEST][START] HEAD /
DEBUG - 2026-03-27 23:36:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-27 23:36:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-27 23:36:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-27 23:36:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-27 23:36:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-27 23:41:22 --> [REQ_ID=5308d9a9366e] [REQUEST][START] HEAD /
DEBUG - 2026-03-27 23:41:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-27 23:41:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-27 23:41:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-27 23:41:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-27 23:41:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-27 23:46:22 --> [REQ_ID=82600c49c522] [REQUEST][START] HEAD /
DEBUG - 2026-03-27 23:46:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-27 23:46:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-27 23:46:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-27 23:46:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-27 23:46:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-27 23:51:22 --> [REQ_ID=f5c746419fb1] [REQUEST][START] HEAD /
DEBUG - 2026-03-27 23:51:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-27 23:51:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-27 23:51:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-27 23:51:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-27 23:51:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-27 23:56:22 --> [REQ_ID=7193ed0565c7] [REQUEST][START] HEAD /
DEBUG - 2026-03-27 23:56:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-27 23:56:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-27 23:56:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-27 23:56:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-27 23:56:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
