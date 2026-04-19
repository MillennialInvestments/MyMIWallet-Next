<?php defined('SYSTEMPATH') || exit('No direct script access allowed'); ?>

DEBUG - 2026-03-24 00:00:01 --> [REQ_ID=9a9ea3d0d597] [REQUEST][START] GET /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-24 00:00:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-24 00:00:01 --> [REQ_ID=9a9ea3d0d597] [FILTER_BEFORE] /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-24 00:00:01 --> [REQ_ID=9a9ea3d0d597] [ROUTE] Controller=\App\Modules\Management\Controllers\ManagementAPIController Method=Run_CRON_Tasks
DEBUG - 2026-03-24 00:00:01 --> [REQ_ID=9a9ea3d0d597] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-24 00:00:01 --> [REQ_ID=9a9ea3d0d597] [REQUEST][END]
INFO - 2026-03-24 00:00:01 --> [REQ_ID=9a9ea3d0d597] [PERF] Execution time=0.015133
DEBUG - 2026-03-24 00:01:22 --> [REQ_ID=f4b746fa348e] [REQUEST][START] HEAD /
DEBUG - 2026-03-24 00:01:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-24 00:01:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-24 00:01:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-24 00:01:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-24 00:01:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-24 00:06:22 --> [REQ_ID=da73f8893d89] [REQUEST][START] HEAD /
DEBUG - 2026-03-24 00:06:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-24 00:06:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-24 00:06:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-24 00:06:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-24 00:06:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-24 00:11:22 --> [REQ_ID=64fb0a8e6cc5] [REQUEST][START] HEAD /
DEBUG - 2026-03-24 00:11:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-24 00:11:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-24 00:11:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-24 00:11:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-24 00:11:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-24 00:15:01 --> [REQ_ID=bb737a04a24b] [REQUEST][START] GET /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-24 00:15:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-24 00:15:01 --> [REQ_ID=bb737a04a24b] [FILTER_BEFORE] /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-24 00:15:01 --> [REQ_ID=bb737a04a24b] [ROUTE] Controller=\App\Modules\APIs\Controllers\AlertsAPIController Method=fetchEmailAlerts
DEBUG - 2026-03-24 00:15:01 --> [REQ_ID=bb737a04a24b] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-24 00:15:01 --> [REQ_ID=bb737a04a24b] [REQUEST][END]
INFO - 2026-03-24 00:15:01 --> [REQ_ID=bb737a04a24b] [PERF] Execution time=0.046494
DEBUG - 2026-03-24 00:16:22 --> [REQ_ID=707e1d52d58b] [REQUEST][START] HEAD /
DEBUG - 2026-03-24 00:16:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-24 00:16:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-24 00:16:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-24 00:16:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-24 00:16:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-24 00:21:22 --> [REQ_ID=523d87a94290] [REQUEST][START] HEAD /
DEBUG - 2026-03-24 00:21:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-24 00:21:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-24 00:21:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-24 00:21:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-24 00:21:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-24 00:26:22 --> [REQ_ID=125e3892595a] [REQUEST][START] HEAD /
DEBUG - 2026-03-24 00:26:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-24 00:26:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-24 00:26:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-24 00:26:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-24 00:26:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-24 00:31:22 --> [REQ_ID=65df65b08ea7] [REQUEST][START] HEAD /
DEBUG - 2026-03-24 00:31:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-24 00:31:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-24 00:31:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-24 00:31:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-24 00:31:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-24 00:36:22 --> [REQ_ID=34f91484bd8a] [REQUEST][START] HEAD /
DEBUG - 2026-03-24 00:36:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-24 00:36:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-24 00:36:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-24 00:36:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-24 00:36:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-24 00:41:22 --> [REQ_ID=1dde7269340f] [REQUEST][START] HEAD /
DEBUG - 2026-03-24 00:41:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-24 00:41:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-24 00:41:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-24 00:41:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-24 00:41:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-24 00:45:17 --> [REQ_ID=fdebc717f697] [REQUEST][START] GET /index.php/Blog/Personal-Budgeting/The-Importance-of-Personal-Financial-Budgeting
DEBUG - 2026-03-24 00:45:17 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-24 00:45:17 --> [REQ_ID=fdebc717f697] [REQUEST][END]
INFO - 2026-03-24 00:45:17 --> [REQ_ID=fdebc717f697] [PERF] Execution time=0.041403
DEBUG - 2026-03-24 00:46:22 --> [REQ_ID=fe25d08fe7f3] [REQUEST][START] HEAD /
DEBUG - 2026-03-24 00:46:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-24 00:46:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-24 00:46:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-24 00:46:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-24 00:46:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-24 00:51:22 --> [REQ_ID=b88f218d2831] [REQUEST][START] HEAD /
DEBUG - 2026-03-24 00:51:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-24 00:51:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-24 00:51:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-24 00:51:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-24 00:51:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-24 00:52:25 --> [REQ_ID=8d7d7886d070] [REQUEST][START] GET /
DEBUG - 2026-03-24 00:52:25 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-24 00:52:25 --> [REQ_ID=8d7d7886d070] [FILTER_BEFORE] /
DEBUG - 2026-03-24 00:52:25 --> [REQ_ID=8d7d7886d070] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-24 00:52:25 --> [REQ_ID=8d7d7886d070] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-24 00:52:25 --> [CSRF] token name=csrf_test_name hash=9931b88d600fd114ea70656d9f6360f9
DEBUG - 2026-03-24 00:52:25 --> [REQ_ID=bb6763340695] [INIT] App\Controllers\Home::GET
INFO - 2026-03-24 00:52:25 --> [REQ_ID=bb6763340695] [MEMORY][controller-start] 4194304
INFO - 2026-03-24 00:52:25 --> [REQ_ID=bb6763340695] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-24 00:52:25 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-24 00:52:25 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-03-24 00:52:25 --> [REQ_ID=bb6763340695] [VIEW_RENDER] themes/public/home
INFO - 2026-03-24 00:52:25 --> [REQ_ID=bb6763340695] [MEMORY][commonData:start] 8388608
INFO - 2026-03-24 00:52:25 --> themesMemory usage: 8388608
DEBUG - 2026-03-24 00:52:25 --> [MetaService] slug= pageName=Home cacheHit= path=DB
DEBUG - 2026-03-24 00:52:25 --> [REQ_ID=8d7d7886d070] [FILTER_AFTER]
DEBUG - 2026-03-24 00:52:25 --> [REQ_ID=8d7d7886d070] [LIFECYCLE][END] status=200 duration_ms=641.73 memory_delta=4194304
INFO - 2026-03-24 00:52:25 --> [REQ_ID=bb6763340695] [PERF] Execution time=0.639949
DEBUG - 2026-03-24 00:52:25 --> [REQ_ID=8d7d7886d070] [REQUEST][END]
INFO - 2026-03-24 00:52:25 --> [REQ_ID=8d7d7886d070] [PERF] Execution time=0.662286
DEBUG - 2026-03-24 00:56:22 --> [REQ_ID=c2b59165c08d] [REQUEST][START] HEAD /
DEBUG - 2026-03-24 00:56:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-24 00:56:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-24 00:56:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-24 00:56:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-24 00:56:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-24 01:00:01 --> [REQ_ID=c6c7c3bd411f] [REQUEST][START] GET /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-24 01:00:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-24 01:00:01 --> [REQ_ID=c6c7c3bd411f] [FILTER_BEFORE] /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-24 01:00:01 --> [REQ_ID=c6c7c3bd411f] [ROUTE] Controller=\App\Modules\Management\Controllers\ManagementAPIController Method=Run_CRON_Tasks
DEBUG - 2026-03-24 01:00:01 --> [REQ_ID=c6c7c3bd411f] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-24 01:00:01 --> [REQ_ID=c6c7c3bd411f] [REQUEST][END]
INFO - 2026-03-24 01:00:01 --> [REQ_ID=c6c7c3bd411f] [PERF] Execution time=0.042448
DEBUG - 2026-03-24 01:01:22 --> [REQ_ID=3734adb81e80] [REQUEST][START] HEAD /
DEBUG - 2026-03-24 01:01:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-24 01:01:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-24 01:01:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-24 01:01:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-24 01:01:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-24 01:06:22 --> [REQ_ID=54625353a891] [REQUEST][START] HEAD /
DEBUG - 2026-03-24 01:06:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-24 01:06:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-24 01:06:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-24 01:06:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-24 01:06:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-24 01:09:09 --> [REQ_ID=c557f7a63653] [REQUEST][START] GET /
DEBUG - 2026-03-24 01:09:09 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-24 01:09:09 --> [REQ_ID=c557f7a63653] [REQUEST][END]
INFO - 2026-03-24 01:09:09 --> [REQ_ID=c557f7a63653] [PERF] Execution time=0.038244
DEBUG - 2026-03-24 01:11:22 --> [REQ_ID=756829a427ae] [REQUEST][START] HEAD /
DEBUG - 2026-03-24 01:11:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-24 01:11:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-24 01:11:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-24 01:11:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-24 01:11:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-24 01:15:01 --> [REQ_ID=983fc8b11025] [REQUEST][START] GET /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-24 01:15:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-24 01:15:01 --> [REQ_ID=983fc8b11025] [FILTER_BEFORE] /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-24 01:15:01 --> [REQ_ID=983fc8b11025] [ROUTE] Controller=\App\Modules\APIs\Controllers\AlertsAPIController Method=fetchEmailAlerts
DEBUG - 2026-03-24 01:15:01 --> [REQ_ID=983fc8b11025] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-24 01:15:01 --> [REQ_ID=983fc8b11025] [REQUEST][END]
INFO - 2026-03-24 01:15:01 --> [REQ_ID=983fc8b11025] [PERF] Execution time=0.047742
DEBUG - 2026-03-24 01:16:22 --> [REQ_ID=9ab14f908c7e] [REQUEST][START] HEAD /
DEBUG - 2026-03-24 01:16:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-24 01:16:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-24 01:16:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-24 01:16:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-24 01:16:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-24 01:21:22 --> [REQ_ID=f358ed1aa2c5] [REQUEST][START] HEAD /
DEBUG - 2026-03-24 01:21:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-24 01:21:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-24 01:21:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-24 01:21:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-24 01:21:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-24 01:26:19 --> [REQ_ID=831d79b8dbba] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-24 01:26:19 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-24 01:26:19 --> [REQ_ID=831d79b8dbba] [REQUEST][END]
INFO - 2026-03-24 01:26:19 --> [REQ_ID=831d79b8dbba] [PERF] Execution time=0.039856
DEBUG - 2026-03-24 01:26:22 --> [REQ_ID=519e9ed3a968] [REQUEST][START] HEAD /
DEBUG - 2026-03-24 01:26:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-24 01:26:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-24 01:26:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-24 01:26:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-24 01:26:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-24 01:31:22 --> [REQ_ID=feac791ceb2e] [REQUEST][START] HEAD /
DEBUG - 2026-03-24 01:31:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-24 01:31:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-24 01:31:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-24 01:31:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-24 01:31:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-24 01:36:22 --> [REQ_ID=6094ec5aad85] [REQUEST][START] HEAD /
DEBUG - 2026-03-24 01:36:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-24 01:36:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-24 01:36:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-24 01:36:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-24 01:36:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-24 01:41:22 --> [REQ_ID=8ff61f796fe5] [REQUEST][START] HEAD /
DEBUG - 2026-03-24 01:41:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-24 01:41:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-24 01:41:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-24 01:41:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-24 01:41:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-24 01:46:22 --> [REQ_ID=a9c4df5df9c0] [REQUEST][START] HEAD /
DEBUG - 2026-03-24 01:46:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-24 01:46:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-24 01:46:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-24 01:46:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-24 01:46:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-24 01:51:22 --> [REQ_ID=4c7a3e7c46c3] [REQUEST][START] HEAD /
DEBUG - 2026-03-24 01:51:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-24 01:51:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-24 01:51:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-24 01:51:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-24 01:51:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-24 01:56:22 --> [REQ_ID=94272452c22b] [REQUEST][START] HEAD /
DEBUG - 2026-03-24 01:56:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-24 01:56:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-24 01:56:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-24 01:56:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-24 01:56:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-24 02:00:01 --> [REQ_ID=109686794aa6] [REQUEST][START] GET /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-24 02:00:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-24 02:00:01 --> [REQ_ID=109686794aa6] [FILTER_BEFORE] /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-24 02:00:01 --> [REQ_ID=109686794aa6] [ROUTE] Controller=\App\Modules\Management\Controllers\ManagementAPIController Method=Run_CRON_Tasks
DEBUG - 2026-03-24 02:00:01 --> [REQ_ID=109686794aa6] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-24 02:00:01 --> [REQ_ID=109686794aa6] [REQUEST][END]
INFO - 2026-03-24 02:00:01 --> [REQ_ID=109686794aa6] [PERF] Execution time=0.051141
DEBUG - 2026-03-24 02:00:42 --> [REQ_ID=449308537f8c] [REQUEST][START] GET /
DEBUG - 2026-03-24 02:00:42 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-24 02:00:42 --> [REQ_ID=449308537f8c] [FILTER_BEFORE] /
DEBUG - 2026-03-24 02:00:42 --> [REQ_ID=449308537f8c] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-24 02:00:42 --> [REQ_ID=449308537f8c] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-24 02:00:42 --> [CSRF] token name=csrf_test_name hash=a993ca0462400dd25b11bb82b692a4c6
DEBUG - 2026-03-24 02:00:42 --> [REQ_ID=f756048d0e7d] [INIT] App\Controllers\Home::GET
INFO - 2026-03-24 02:00:42 --> [REQ_ID=f756048d0e7d] [MEMORY][controller-start] 4194304
INFO - 2026-03-24 02:00:42 --> [REQ_ID=f756048d0e7d] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-24 02:00:42 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-24 02:00:43 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-03-24 02:00:43 --> [REQ_ID=f756048d0e7d] [VIEW_RENDER] themes/public/home
INFO - 2026-03-24 02:00:43 --> [REQ_ID=f756048d0e7d] [MEMORY][commonData:start] 8388608
INFO - 2026-03-24 02:00:43 --> themesMemory usage: 8388608
DEBUG - 2026-03-24 02:00:43 --> [MetaService] slug= pageName=Home cacheHit= path=DB
DEBUG - 2026-03-24 02:00:43 --> [REQ_ID=449308537f8c] [FILTER_AFTER]
DEBUG - 2026-03-24 02:00:43 --> [REQ_ID=449308537f8c] [LIFECYCLE][END] status=200 duration_ms=652.74 memory_delta=4194304
INFO - 2026-03-24 02:00:43 --> [REQ_ID=f756048d0e7d] [PERF] Execution time=0.651221
DEBUG - 2026-03-24 02:00:43 --> [REQ_ID=449308537f8c] [REQUEST][END]
INFO - 2026-03-24 02:00:43 --> [REQ_ID=449308537f8c] [PERF] Execution time=0.666727
DEBUG - 2026-03-24 02:01:22 --> [REQ_ID=b0cf476ee3de] [REQUEST][START] HEAD /
DEBUG - 2026-03-24 02:01:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-24 02:01:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-24 02:01:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-24 02:01:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-24 02:01:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-24 02:06:22 --> [REQ_ID=ad0a127799b8] [REQUEST][START] HEAD /
DEBUG - 2026-03-24 02:06:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-24 02:06:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-24 02:06:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-24 02:06:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-24 02:06:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-24 02:06:47 --> [REQ_ID=b754d8098349] [REQUEST][START] GET /
DEBUG - 2026-03-24 02:06:47 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-24 02:06:47 --> [REQ_ID=b754d8098349] [REQUEST][END]
INFO - 2026-03-24 02:06:47 --> [REQ_ID=b754d8098349] [PERF] Execution time=0.018115
DEBUG - 2026-03-24 02:10:19 --> [REQ_ID=d4bd39e87089] [REQUEST][START] GET /index.php/Knowledgebase
DEBUG - 2026-03-24 02:10:19 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-24 02:10:19 --> ErrorException: Access level to App\Modules\User\Controllers\KnowledgebaseController::respondWithRendered() must be protected (as in class App\Controllers\BaseController) or weaker
[Method: GET, Route: Knowledgebase]
in APPPATH/Modules/User/Controllers/KnowledgebaseController.php on line 535.
 1 [internal function]: CodeIgniter\Debug\Exceptions->shutdownHandler()
CRITICAL - 2026-03-24 02:10:19 --> [EXCEPTION] Access level to App\Modules\User\Controllers\KnowledgebaseController::respondWithRendered() must be protected (as in class App\Controllers\BaseController) or weaker File=/home/mymiteam/mymiwallet/site/current/app/Modules/User/Controllers/KnowledgebaseController.php Line=535
ERROR - 2026-03-24 02:10:19 --> [ERROR_PAGE] event=error_500 status=500 message=Internal server error.
DEBUG - 2026-03-24 02:11:22 --> [REQ_ID=e33968a6897c] [REQUEST][START] HEAD /
DEBUG - 2026-03-24 02:11:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-24 02:11:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-24 02:11:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-24 02:11:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-24 02:11:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-24 02:11:28 --> [REQ_ID=052eacb15496] [REQUEST][START] GET /
DEBUG - 2026-03-24 02:11:28 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-24 02:11:28 --> [REQ_ID=052eacb15496] [REQUEST][END]
INFO - 2026-03-24 02:11:28 --> [REQ_ID=052eacb15496] [PERF] Execution time=0.014487
DEBUG - 2026-03-24 02:15:01 --> [REQ_ID=a63fa373d197] [REQUEST][START] GET /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-24 02:15:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-24 02:15:01 --> [REQ_ID=a63fa373d197] [FILTER_BEFORE] /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-24 02:15:01 --> [REQ_ID=a63fa373d197] [ROUTE] Controller=\App\Modules\APIs\Controllers\AlertsAPIController Method=fetchEmailAlerts
DEBUG - 2026-03-24 02:15:01 --> [REQ_ID=a63fa373d197] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-24 02:15:01 --> [REQ_ID=a63fa373d197] [REQUEST][END]
INFO - 2026-03-24 02:15:01 --> [REQ_ID=a63fa373d197] [PERF] Execution time=0.048869
DEBUG - 2026-03-24 02:16:22 --> [REQ_ID=b615c884d55c] [REQUEST][START] HEAD /
DEBUG - 2026-03-24 02:16:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-24 02:16:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-24 02:16:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-24 02:16:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-24 02:16:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-24 02:16:44 --> [REQ_ID=c21b5785c176] [REQUEST][START] GET /
DEBUG - 2026-03-24 02:16:44 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-24 02:16:44 --> [REQ_ID=c21b5785c176] [FILTER_BEFORE] /
DEBUG - 2026-03-24 02:16:44 --> [REQ_ID=c21b5785c176] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-24 02:16:44 --> [REQ_ID=c21b5785c176] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-24 02:16:44 --> [CSRF] token name=csrf_test_name hash=db8da3481011a6b17389f9df6130ca88
DEBUG - 2026-03-24 02:16:44 --> [REQ_ID=fc4d6ebabe0b] [INIT] App\Controllers\Home::GET
INFO - 2026-03-24 02:16:44 --> [REQ_ID=fc4d6ebabe0b] [MEMORY][controller-start] 4194304
INFO - 2026-03-24 02:16:45 --> [REQ_ID=fc4d6ebabe0b] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-24 02:16:45 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-24 02:16:45 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-03-24 02:16:45 --> [REQ_ID=fc4d6ebabe0b] [VIEW_RENDER] themes/public/home
INFO - 2026-03-24 02:16:45 --> [REQ_ID=fc4d6ebabe0b] [MEMORY][commonData:start] 8388608
INFO - 2026-03-24 02:16:45 --> themesMemory usage: 8388608
DEBUG - 2026-03-24 02:16:45 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-24 02:16:45 --> [REQ_ID=c21b5785c176] [FILTER_AFTER]
DEBUG - 2026-03-24 02:16:45 --> [REQ_ID=c21b5785c176] [LIFECYCLE][END] status=200 duration_ms=850.18 memory_delta=4194304
INFO - 2026-03-24 02:16:45 --> [REQ_ID=fc4d6ebabe0b] [PERF] Execution time=0.848852
DEBUG - 2026-03-24 02:16:45 --> [REQ_ID=c21b5785c176] [REQUEST][END]
INFO - 2026-03-24 02:16:45 --> [REQ_ID=c21b5785c176] [PERF] Execution time=0.861250
DEBUG - 2026-03-24 02:17:06 --> [REQ_ID=5e48d48cfec0] [REQUEST][START] GET /
DEBUG - 2026-03-24 02:17:06 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-24 02:17:06 --> [REQ_ID=5e48d48cfec0] [REQUEST][END]
INFO - 2026-03-24 02:17:06 --> [REQ_ID=5e48d48cfec0] [PERF] Execution time=0.009213
DEBUG - 2026-03-24 02:21:22 --> [REQ_ID=e0516e54eaec] [REQUEST][START] HEAD /
DEBUG - 2026-03-24 02:21:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-24 02:21:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-24 02:21:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-24 02:21:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-24 02:21:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-24 02:26:22 --> [REQ_ID=8432cb361dec] [REQUEST][START] HEAD /
DEBUG - 2026-03-24 02:26:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-24 02:26:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-24 02:26:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-24 02:26:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-24 02:26:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-24 02:31:22 --> [REQ_ID=53dc295a7171] [REQUEST][START] HEAD /
DEBUG - 2026-03-24 02:31:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-24 02:31:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-24 02:31:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-24 02:31:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-24 02:31:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-24 02:36:22 --> [REQ_ID=3aca80e1e1a1] [REQUEST][START] HEAD /
DEBUG - 2026-03-24 02:36:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-24 02:36:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-24 02:36:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-24 02:36:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-24 02:36:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-24 02:41:22 --> [REQ_ID=e07bb69ec5e0] [REQUEST][START] HEAD /
DEBUG - 2026-03-24 02:41:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-24 02:41:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-24 02:41:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-24 02:41:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-24 02:41:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-24 02:46:22 --> [REQ_ID=abcb5ca84d66] [REQUEST][START] HEAD /
DEBUG - 2026-03-24 02:46:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-24 02:46:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-24 02:46:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-24 02:46:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-24 02:46:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-24 02:51:22 --> [REQ_ID=9309dea0176e] [REQUEST][START] HEAD /
DEBUG - 2026-03-24 02:51:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-24 02:51:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-24 02:51:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-24 02:51:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-24 02:51:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-24 02:52:25 --> [REQ_ID=cf7b10b8d03e] [REQUEST][START] GET /index.php/Blog
DEBUG - 2026-03-24 02:52:25 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-24 02:52:25 --> [REQ_ID=cf7b10b8d03e] [REQUEST][END]
INFO - 2026-03-24 02:52:25 --> [REQ_ID=cf7b10b8d03e] [PERF] Execution time=0.020914
DEBUG - 2026-03-24 02:56:22 --> [REQ_ID=6b557e60422c] [REQUEST][START] HEAD /
DEBUG - 2026-03-24 02:56:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-24 02:56:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-24 02:56:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-24 02:56:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-24 02:56:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-24 02:56:51 --> [REQ_ID=60d6d2ad8ce4] [REQUEST][START] GET /
DEBUG - 2026-03-24 02:56:51 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-24 02:56:51 --> [REQ_ID=60d6d2ad8ce4] [FILTER_BEFORE] /
DEBUG - 2026-03-24 02:56:51 --> [REQ_ID=60d6d2ad8ce4] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-24 02:56:51 --> [REQ_ID=60d6d2ad8ce4] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-24 02:56:51 --> [CSRF] token name=csrf_test_name hash=93af4a0166859c209e6c91663a1055a5
DEBUG - 2026-03-24 02:56:51 --> [REQ_ID=cddbe3fb5fc6] [INIT] App\Controllers\Home::GET
INFO - 2026-03-24 02:56:51 --> [REQ_ID=cddbe3fb5fc6] [MEMORY][controller-start] 4194304
INFO - 2026-03-24 02:56:51 --> [REQ_ID=cddbe3fb5fc6] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-24 02:56:51 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-24 02:56:51 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-03-24 02:56:51 --> [REQ_ID=cddbe3fb5fc6] [VIEW_RENDER] themes/public/home
INFO - 2026-03-24 02:56:51 --> [REQ_ID=cddbe3fb5fc6] [MEMORY][commonData:start] 8388608
INFO - 2026-03-24 02:56:51 --> themesMemory usage: 8388608
DEBUG - 2026-03-24 02:56:51 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-24 02:56:51 --> [REQ_ID=60d6d2ad8ce4] [FILTER_AFTER]
DEBUG - 2026-03-24 02:56:51 --> [REQ_ID=60d6d2ad8ce4] [LIFECYCLE][END] status=200 duration_ms=601.30 memory_delta=4194304
INFO - 2026-03-24 02:56:51 --> [REQ_ID=cddbe3fb5fc6] [PERF] Execution time=0.598323
DEBUG - 2026-03-24 02:56:51 --> [REQ_ID=60d6d2ad8ce4] [REQUEST][END]
INFO - 2026-03-24 02:56:51 --> [REQ_ID=60d6d2ad8ce4] [PERF] Execution time=0.625469
DEBUG - 2026-03-24 03:00:01 --> [REQ_ID=e4bf10a08284] [REQUEST][START] GET /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-24 03:00:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-24 03:00:01 --> [REQ_ID=e4bf10a08284] [FILTER_BEFORE] /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-24 03:00:01 --> [REQ_ID=e4bf10a08284] [ROUTE] Controller=\App\Modules\Management\Controllers\ManagementAPIController Method=Run_CRON_Tasks
DEBUG - 2026-03-24 03:00:01 --> [REQ_ID=e4bf10a08284] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-24 03:00:01 --> [REQ_ID=e4bf10a08284] [REQUEST][END]
INFO - 2026-03-24 03:00:01 --> [REQ_ID=e4bf10a08284] [PERF] Execution time=0.035768
DEBUG - 2026-03-24 03:01:22 --> [REQ_ID=44fc68b107cc] [REQUEST][START] HEAD /
DEBUG - 2026-03-24 03:01:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-24 03:01:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-24 03:01:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-24 03:01:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-24 03:01:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-24 03:06:22 --> [REQ_ID=5d4a60530801] [REQUEST][START] HEAD /
DEBUG - 2026-03-24 03:06:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-24 03:06:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-24 03:06:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-24 03:06:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-24 03:06:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-24 03:11:22 --> [REQ_ID=d824b975655e] [REQUEST][START] HEAD /
DEBUG - 2026-03-24 03:11:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-24 03:11:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-24 03:11:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-24 03:11:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-24 03:11:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-24 03:15:01 --> [REQ_ID=33af7d5ada46] [REQUEST][START] GET /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-24 03:15:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-24 03:15:01 --> [REQ_ID=33af7d5ada46] [FILTER_BEFORE] /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-24 03:15:01 --> [REQ_ID=33af7d5ada46] [ROUTE] Controller=\App\Modules\APIs\Controllers\AlertsAPIController Method=fetchEmailAlerts
DEBUG - 2026-03-24 03:15:01 --> [REQ_ID=33af7d5ada46] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-24 03:15:01 --> [REQ_ID=33af7d5ada46] [REQUEST][END]
INFO - 2026-03-24 03:15:01 --> [REQ_ID=33af7d5ada46] [PERF] Execution time=0.047831
DEBUG - 2026-03-24 03:16:22 --> [REQ_ID=24444b3a89fe] [REQUEST][START] HEAD /
DEBUG - 2026-03-24 03:16:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-24 03:16:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-24 03:16:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-24 03:16:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-24 03:16:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-24 03:21:08 --> [REQ_ID=336c0a335162] [REQUEST][START] GET /index.php/Management/Users
DEBUG - 2026-03-24 03:21:08 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-24 03:21:08 --> [REQ_ID=336c0a335162] [REQUEST][END]
INFO - 2026-03-24 03:21:08 --> [REQ_ID=336c0a335162] [PERF] Execution time=0.052565
DEBUG - 2026-03-24 03:21:22 --> [REQ_ID=3ddb0d4313df] [REQUEST][START] HEAD /
DEBUG - 2026-03-24 03:21:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-24 03:21:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-24 03:21:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-24 03:21:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-24 03:21:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-24 03:26:22 --> [REQ_ID=5d0f81983499] [REQUEST][START] HEAD /
DEBUG - 2026-03-24 03:26:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-24 03:26:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-24 03:26:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-24 03:26:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-24 03:26:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-24 03:31:22 --> [REQ_ID=e27510e892c8] [REQUEST][START] HEAD /
DEBUG - 2026-03-24 03:31:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-24 03:31:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-24 03:31:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-24 03:31:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-24 03:31:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-24 03:36:22 --> [REQ_ID=cbc643232c59] [REQUEST][START] HEAD /
DEBUG - 2026-03-24 03:36:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-24 03:36:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-24 03:36:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-24 03:36:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-24 03:36:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-24 03:41:22 --> [REQ_ID=e5e73049875c] [REQUEST][START] HEAD /
DEBUG - 2026-03-24 03:41:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-24 03:41:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-24 03:41:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-24 03:41:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-24 03:41:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-24 03:46:22 --> [REQ_ID=0d1add4a1ffe] [REQUEST][START] HEAD /
DEBUG - 2026-03-24 03:46:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-24 03:46:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-24 03:46:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-24 03:46:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-24 03:46:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-24 03:51:22 --> [REQ_ID=5e5dfe5eae21] [REQUEST][START] HEAD /
DEBUG - 2026-03-24 03:51:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-24 03:51:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-24 03:51:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-24 03:51:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-24 03:51:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-24 03:56:22 --> [REQ_ID=d7f78e25988a] [REQUEST][START] HEAD /
DEBUG - 2026-03-24 03:56:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-24 03:56:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-24 03:56:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-24 03:56:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-24 03:56:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-24 03:58:25 --> [REQ_ID=4bdcc49694b5] [REQUEST][START] GET /index.php/How-It-Works/earnings
DEBUG - 2026-03-24 03:58:25 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-24 03:58:25 --> [REQ_ID=4bdcc49694b5] [REQUEST][END]
INFO - 2026-03-24 03:58:25 --> [REQ_ID=4bdcc49694b5] [PERF] Execution time=0.040426
DEBUG - 2026-03-24 04:00:02 --> [REQ_ID=dbcc75e03ea2] [REQUEST][START] GET /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-24 04:00:02 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-24 04:00:02 --> [REQ_ID=dbcc75e03ea2] [FILTER_BEFORE] /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-24 04:00:02 --> [REQ_ID=dbcc75e03ea2] [ROUTE] Controller=\App\Modules\Management\Controllers\ManagementAPIController Method=Run_CRON_Tasks
DEBUG - 2026-03-24 04:00:02 --> [REQ_ID=dbcc75e03ea2] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-24 04:00:02 --> [REQ_ID=dbcc75e03ea2] [REQUEST][END]
INFO - 2026-03-24 04:00:02 --> [REQ_ID=dbcc75e03ea2] [PERF] Execution time=0.049286
DEBUG - 2026-03-24 04:01:22 --> [REQ_ID=870a011960c6] [REQUEST][START] HEAD /
DEBUG - 2026-03-24 04:01:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-24 04:01:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-24 04:01:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-24 04:01:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-24 04:01:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-24 04:06:22 --> [REQ_ID=87825967abb4] [REQUEST][START] HEAD /
DEBUG - 2026-03-24 04:06:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-24 04:06:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-24 04:06:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-24 04:06:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-24 04:06:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-24 04:09:52 --> [REQ_ID=cef3ebbf3eef] [REQUEST][START] GET /
DEBUG - 2026-03-24 04:09:52 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-24 04:09:52 --> [REQ_ID=cef3ebbf3eef] [FILTER_BEFORE] /
DEBUG - 2026-03-24 04:09:52 --> [REQ_ID=cef3ebbf3eef] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-24 04:09:52 --> [REQ_ID=cef3ebbf3eef] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-24 04:09:52 --> [CSRF] token name=csrf_test_name hash=bde24bb74d20ff7d7e28bfcff56171e1
DEBUG - 2026-03-24 04:09:52 --> [REQ_ID=ccf75273377b] [INIT] App\Controllers\Home::GET
INFO - 2026-03-24 04:09:52 --> [REQ_ID=ccf75273377b] [MEMORY][controller-start] 6291456
INFO - 2026-03-24 04:09:52 --> [REQ_ID=ccf75273377b] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-24 04:09:52 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-24 04:09:53 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-03-24 04:09:53 --> [REQ_ID=ccf75273377b] [VIEW_RENDER] themes/public/home
INFO - 2026-03-24 04:09:53 --> [REQ_ID=ccf75273377b] [MEMORY][commonData:start] 10485760
INFO - 2026-03-24 04:09:53 --> themesMemory usage: 10485760
DEBUG - 2026-03-24 04:09:53 --> [MetaService] slug= pageName=Home cacheHit= path=DB
DEBUG - 2026-03-24 04:09:53 --> [REQ_ID=cef3ebbf3eef] [FILTER_AFTER]
DEBUG - 2026-03-24 04:09:53 --> [REQ_ID=cef3ebbf3eef] [LIFECYCLE][END] status=200 duration_ms=644.10 memory_delta=4194304
INFO - 2026-03-24 04:09:53 --> [REQ_ID=ccf75273377b] [PERF] Execution time=0.641456
DEBUG - 2026-03-24 04:09:53 --> [REQ_ID=cef3ebbf3eef] [REQUEST][END]
INFO - 2026-03-24 04:09:53 --> [REQ_ID=cef3ebbf3eef] [PERF] Execution time=0.696239
DEBUG - 2026-03-24 04:10:59 --> [REQ_ID=2596a502ff84] [REQUEST][START] GET /index.php/Knowledgebase/Getting-Started
DEBUG - 2026-03-24 04:10:59 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-24 04:10:59 --> ErrorException: Access level to App\Modules\User\Controllers\KnowledgebaseController::respondWithRendered() must be protected (as in class App\Controllers\BaseController) or weaker
[Method: GET, Route: Knowledgebase/Getting-Started]
in APPPATH/Modules/User/Controllers/KnowledgebaseController.php on line 535.
 1 [internal function]: CodeIgniter\Debug\Exceptions->shutdownHandler()
CRITICAL - 2026-03-24 04:10:59 --> [EXCEPTION] Access level to App\Modules\User\Controllers\KnowledgebaseController::respondWithRendered() must be protected (as in class App\Controllers\BaseController) or weaker File=/home/mymiteam/mymiwallet/site/current/app/Modules/User/Controllers/KnowledgebaseController.php Line=535
ERROR - 2026-03-24 04:10:59 --> [ERROR_PAGE] event=error_500 status=500 message=Internal server error.
DEBUG - 2026-03-24 04:11:22 --> [REQ_ID=4630f19cf19d] [REQUEST][START] HEAD /
DEBUG - 2026-03-24 04:11:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-24 04:11:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-24 04:11:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-24 04:11:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-24 04:11:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-24 04:15:01 --> [REQ_ID=b93cd686441c] [REQUEST][START] GET /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-24 04:15:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-24 04:15:01 --> [REQ_ID=b93cd686441c] [FILTER_BEFORE] /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-24 04:15:01 --> [REQ_ID=b93cd686441c] [ROUTE] Controller=\App\Modules\APIs\Controllers\AlertsAPIController Method=fetchEmailAlerts
DEBUG - 2026-03-24 04:15:01 --> [REQ_ID=b93cd686441c] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-24 04:15:01 --> [REQ_ID=b93cd686441c] [REQUEST][END]
INFO - 2026-03-24 04:15:01 --> [REQ_ID=b93cd686441c] [PERF] Execution time=0.051222
DEBUG - 2026-03-24 04:16:22 --> [REQ_ID=0f2673894210] [REQUEST][START] HEAD /
DEBUG - 2026-03-24 04:16:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-24 04:16:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-24 04:16:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-24 04:16:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-24 04:16:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-24 04:21:22 --> [REQ_ID=029db9936b72] [REQUEST][START] HEAD /
DEBUG - 2026-03-24 04:21:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-24 04:21:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-24 04:21:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-24 04:21:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-24 04:21:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-24 04:24:10 --> [REQ_ID=8b211f4fafbc] [REQUEST][START] GET /
DEBUG - 2026-03-24 04:24:10 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-24 04:24:10 --> [REQ_ID=8b211f4fafbc] [FILTER_BEFORE] /
DEBUG - 2026-03-24 04:24:10 --> [REQ_ID=8b211f4fafbc] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-24 04:24:10 --> [REQ_ID=8b211f4fafbc] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-24 04:24:10 --> [CSRF] token name=csrf_test_name hash=a9d59fc8c7e1cfda6733cf4b03b2ac84
DEBUG - 2026-03-24 04:24:10 --> [REQ_ID=b429e094f07c] [INIT] App\Controllers\Home::GET
INFO - 2026-03-24 04:24:10 --> [REQ_ID=b429e094f07c] [MEMORY][controller-start] 6291456
INFO - 2026-03-24 04:24:10 --> [REQ_ID=b429e094f07c] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-24 04:24:10 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-24 04:24:11 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
DEBUG - 2026-03-24 04:24:11 --> [REQ_ID=b429e094f07c] [VIEW_RENDER] themes/public/home
INFO - 2026-03-24 04:24:11 --> [REQ_ID=b429e094f07c] [MEMORY][commonData:start] 10485760
INFO - 2026-03-24 04:24:11 --> themesMemory usage: 10485760
DEBUG - 2026-03-24 04:24:11 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-24 04:24:11 --> [REQ_ID=8b211f4fafbc] [FILTER_AFTER]
DEBUG - 2026-03-24 04:24:11 --> [REQ_ID=8b211f4fafbc] [LIFECYCLE][END] status=200 duration_ms=622.61 memory_delta=4194304
INFO - 2026-03-24 04:24:11 --> [REQ_ID=b429e094f07c] [PERF] Execution time=0.620402
DEBUG - 2026-03-24 04:24:11 --> [REQ_ID=8b211f4fafbc] [REQUEST][END]
INFO - 2026-03-24 04:24:11 --> [REQ_ID=8b211f4fafbc] [PERF] Execution time=0.661314
DEBUG - 2026-03-24 04:26:22 --> [REQ_ID=e50d6533f5cf] [REQUEST][START] HEAD /
DEBUG - 2026-03-24 04:26:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-24 04:26:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-24 04:26:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-24 04:26:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-24 04:26:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-24 04:31:22 --> [REQ_ID=e5795828c77f] [REQUEST][START] HEAD /
DEBUG - 2026-03-24 04:31:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-24 04:31:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-24 04:31:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-24 04:31:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-24 04:31:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-24 04:36:22 --> [REQ_ID=05644c95fac9] [REQUEST][START] HEAD /
DEBUG - 2026-03-24 04:36:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-24 04:36:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-24 04:36:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-24 04:36:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-24 04:36:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-24 04:41:22 --> [REQ_ID=f0072953e167] [REQUEST][START] HEAD /
DEBUG - 2026-03-24 04:41:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-24 04:41:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-24 04:41:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-24 04:41:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-24 04:41:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-24 04:46:22 --> [REQ_ID=61c1512af5a7] [REQUEST][START] HEAD /
DEBUG - 2026-03-24 04:46:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-24 04:46:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-24 04:46:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-24 04:46:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-24 04:46:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-24 04:51:22 --> [REQ_ID=a101de7e287e] [REQUEST][START] HEAD /
DEBUG - 2026-03-24 04:51:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-24 04:51:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-24 04:51:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-24 04:51:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-24 04:51:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-24 04:56:22 --> [REQ_ID=0943e5771c2b] [REQUEST][START] HEAD /
DEBUG - 2026-03-24 04:56:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-24 04:56:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-24 04:56:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-24 04:56:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-24 04:56:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-24 04:57:29 --> [REQ_ID=6f4e084313db] [REQUEST][START] GET /
DEBUG - 2026-03-24 04:57:29 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-24 04:57:29 --> [REQ_ID=6f4e084313db] [FILTER_BEFORE] /
DEBUG - 2026-03-24 04:57:29 --> [REQ_ID=6f4e084313db] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-24 04:57:29 --> [REQ_ID=6f4e084313db] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-24 04:57:29 --> [CSRF] token name=csrf_test_name hash=41e9ff962089dcf1f858ed26d617afc9
DEBUG - 2026-03-24 04:57:29 --> [REQ_ID=f4a6219b2933] [INIT] App\Controllers\Home::GET
INFO - 2026-03-24 04:57:29 --> [REQ_ID=f4a6219b2933] [MEMORY][controller-start] 4194304
INFO - 2026-03-24 04:57:29 --> [REQ_ID=f4a6219b2933] [MEMORY][commonData:start] 4194304
DEBUG - 2026-03-24 04:57:29 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-24 04:57:29 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-03-24 04:57:29 --> [REQ_ID=f4a6219b2933] [VIEW_RENDER] themes/public/home
INFO - 2026-03-24 04:57:29 --> [REQ_ID=f4a6219b2933] [MEMORY][commonData:start] 8388608
INFO - 2026-03-24 04:57:29 --> themesMemory usage: 8388608
DEBUG - 2026-03-24 04:57:29 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-24 04:57:29 --> [REQ_ID=6f4e084313db] [FILTER_AFTER]
DEBUG - 2026-03-24 04:57:29 --> [REQ_ID=6f4e084313db] [LIFECYCLE][END] status=200 duration_ms=836.33 memory_delta=4194304
INFO - 2026-03-24 04:57:29 --> [REQ_ID=f4a6219b2933] [PERF] Execution time=0.834343
DEBUG - 2026-03-24 04:57:29 --> [REQ_ID=6f4e084313db] [REQUEST][END]
INFO - 2026-03-24 04:57:29 --> [REQ_ID=6f4e084313db] [PERF] Execution time=0.855216
DEBUG - 2026-03-24 05:00:02 --> [REQ_ID=c062ffdb17b3] [REQUEST][START] GET /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-24 05:00:02 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-24 05:00:02 --> [REQ_ID=c062ffdb17b3] [FILTER_BEFORE] /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-24 05:00:02 --> [REQ_ID=c062ffdb17b3] [ROUTE] Controller=\App\Modules\Management\Controllers\ManagementAPIController Method=Run_CRON_Tasks
DEBUG - 2026-03-24 05:00:02 --> [REQ_ID=c062ffdb17b3] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-24 05:00:02 --> [REQ_ID=c062ffdb17b3] [REQUEST][END]
INFO - 2026-03-24 05:00:02 --> [REQ_ID=c062ffdb17b3] [PERF] Execution time=0.047605
DEBUG - 2026-03-24 05:01:22 --> [REQ_ID=bda625becac0] [REQUEST][START] HEAD /
DEBUG - 2026-03-24 05:01:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-24 05:01:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-24 05:01:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-24 05:01:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-24 05:01:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-24 05:06:22 --> [REQ_ID=32dad2bb7655] [REQUEST][START] HEAD /
DEBUG - 2026-03-24 05:06:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-24 05:06:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-24 05:06:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-24 05:06:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-24 05:06:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-24 05:08:08 --> [REQ_ID=e3addc3ab297] [REQUEST][START] GET /index.php/register
DEBUG - 2026-03-24 05:08:08 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-24 05:08:08 --> [REQ_ID=e3addc3ab297] [REQUEST][END]
INFO - 2026-03-24 05:08:08 --> [REQ_ID=e3addc3ab297] [PERF] Execution time=0.040995
DEBUG - 2026-03-24 05:11:22 --> [REQ_ID=d130f8c8352f] [REQUEST][START] HEAD /
DEBUG - 2026-03-24 05:11:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-24 05:11:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-24 05:11:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-24 05:11:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-24 05:11:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-24 05:15:01 --> [REQ_ID=1c6ee6ced0af] [REQUEST][START] GET /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-24 05:15:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-24 05:15:01 --> [REQ_ID=1c6ee6ced0af] [FILTER_BEFORE] /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-24 05:15:01 --> [REQ_ID=1c6ee6ced0af] [ROUTE] Controller=\App\Modules\APIs\Controllers\AlertsAPIController Method=fetchEmailAlerts
DEBUG - 2026-03-24 05:15:01 --> [REQ_ID=1c6ee6ced0af] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-24 05:15:01 --> [REQ_ID=1c6ee6ced0af] [REQUEST][END]
INFO - 2026-03-24 05:15:01 --> [REQ_ID=1c6ee6ced0af] [PERF] Execution time=0.054970
DEBUG - 2026-03-24 05:16:22 --> [REQ_ID=c84d554fd3e5] [REQUEST][START] HEAD /
DEBUG - 2026-03-24 05:16:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-24 05:16:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-24 05:16:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-24 05:16:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-24 05:16:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-24 05:21:22 --> [REQ_ID=bf96c5caea3d] [REQUEST][START] HEAD /
DEBUG - 2026-03-24 05:21:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-24 05:21:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-24 05:21:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-24 05:21:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-24 05:21:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-24 05:24:30 --> [REQ_ID=9518140d24fd] [REQUEST][START] GET /index.php/
DEBUG - 2026-03-24 05:24:30 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-24 05:24:30 --> [REQ_ID=9518140d24fd] [REQUEST][END]
INFO - 2026-03-24 05:24:30 --> [REQ_ID=9518140d24fd] [PERF] Execution time=0.037310
DEBUG - 2026-03-24 05:26:22 --> [REQ_ID=3b07e3280055] [REQUEST][START] HEAD /
DEBUG - 2026-03-24 05:26:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-24 05:26:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-24 05:26:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-24 05:26:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-24 05:26:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-24 05:31:22 --> [REQ_ID=58f033456648] [REQUEST][START] HEAD /
DEBUG - 2026-03-24 05:31:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-24 05:31:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-24 05:31:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-24 05:31:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-24 05:31:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-24 05:36:22 --> [REQ_ID=f62b1ccacbe6] [REQUEST][START] HEAD /
DEBUG - 2026-03-24 05:36:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-24 05:36:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-24 05:36:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-24 05:36:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-24 05:36:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-24 05:41:22 --> [REQ_ID=841bcf40fc54] [REQUEST][START] HEAD /
DEBUG - 2026-03-24 05:41:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-24 05:41:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-24 05:41:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-24 05:41:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-24 05:41:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-24 05:46:22 --> [REQ_ID=60fc4b4c5fd9] [REQUEST][START] HEAD /
DEBUG - 2026-03-24 05:46:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-24 05:46:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-24 05:46:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-24 05:46:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-24 05:46:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-24 05:56:22 --> [REQ_ID=4b351f20c351] [REQUEST][START] HEAD /
DEBUG - 2026-03-24 05:56:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-24 05:56:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-24 05:56:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-24 05:56:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-24 05:56:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-24 06:00:00 --> [REQ_ID=47d62fc51c9e] [REQUEST][START] GET /
DEBUG - 2026-03-24 06:00:00 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-24 06:00:00 --> [REQ_ID=47d62fc51c9e] [FILTER_BEFORE] /
DEBUG - 2026-03-24 06:00:00 --> [REQ_ID=47d62fc51c9e] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-24 06:00:00 --> [REQ_ID=47d62fc51c9e] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-24 06:00:00 --> [CSRF] token name=csrf_test_name hash=b211de122d7ad302caafecc0be943219
DEBUG - 2026-03-24 06:00:00 --> [REQ_ID=5f8e2ff73992] [INIT] App\Controllers\Home::GET
INFO - 2026-03-24 06:00:00 --> [REQ_ID=5f8e2ff73992] [MEMORY][controller-start] 6291456
INFO - 2026-03-24 06:00:00 --> [REQ_ID=5f8e2ff73992] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-24 06:00:00 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-24 06:00:00 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-03-24 06:00:00 --> [REQ_ID=5f8e2ff73992] [VIEW_RENDER] themes/public/home
INFO - 2026-03-24 06:00:00 --> [REQ_ID=5f8e2ff73992] [MEMORY][commonData:start] 10485760
INFO - 2026-03-24 06:00:00 --> themesMemory usage: 10485760
DEBUG - 2026-03-24 06:00:00 --> [MetaService] slug= pageName=Home cacheHit= path=DB
DEBUG - 2026-03-24 06:00:00 --> [REQ_ID=47d62fc51c9e] [FILTER_AFTER]
DEBUG - 2026-03-24 06:00:00 --> [REQ_ID=47d62fc51c9e] [LIFECYCLE][END] status=200 duration_ms=648.55 memory_delta=4194304
INFO - 2026-03-24 06:00:00 --> [REQ_ID=5f8e2ff73992] [PERF] Execution time=0.646814
DEBUG - 2026-03-24 06:00:00 --> [REQ_ID=47d62fc51c9e] [REQUEST][END]
INFO - 2026-03-24 06:00:00 --> [REQ_ID=47d62fc51c9e] [PERF] Execution time=0.687856
DEBUG - 2026-03-24 06:00:01 --> [REQ_ID=48dde1302f5d] [REQUEST][START] GET /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-24 06:00:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-24 06:00:01 --> [REQ_ID=48dde1302f5d] [FILTER_BEFORE] /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-24 06:00:01 --> [REQ_ID=48dde1302f5d] [ROUTE] Controller=\App\Modules\Management\Controllers\ManagementAPIController Method=Run_CRON_Tasks
DEBUG - 2026-03-24 06:00:01 --> [REQ_ID=48dde1302f5d] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-24 06:00:01 --> [REQ_ID=48dde1302f5d] [REQUEST][END]
INFO - 2026-03-24 06:00:01 --> [REQ_ID=48dde1302f5d] [PERF] Execution time=0.027798
DEBUG - 2026-03-24 06:01:22 --> [REQ_ID=b8d67b18834f] [REQUEST][START] HEAD /
DEBUG - 2026-03-24 06:01:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-24 06:01:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-24 06:01:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-24 06:01:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-24 06:01:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-24 06:01:57 --> [REQ_ID=f6780c057b33] [REQUEST][START] GET /
DEBUG - 2026-03-24 06:01:57 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-24 06:01:57 --> [REQ_ID=f6780c057b33] [FILTER_BEFORE] /
DEBUG - 2026-03-24 06:01:57 --> [REQ_ID=f6780c057b33] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-24 06:01:57 --> [REQ_ID=f6780c057b33] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-24 06:01:57 --> [CSRF] token name=csrf_test_name hash=d2f3924852e1c6a7c53acb6925ae77d1
DEBUG - 2026-03-24 06:01:57 --> [REQ_ID=16d3a3fb92b7] [INIT] App\Controllers\Home::GET
INFO - 2026-03-24 06:01:57 --> [REQ_ID=16d3a3fb92b7] [MEMORY][controller-start] 4194304
INFO - 2026-03-24 06:01:57 --> [REQ_ID=16d3a3fb92b7] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-24 06:01:57 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-24 06:01:57 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
DEBUG - 2026-03-24 06:01:57 --> [REQ_ID=16d3a3fb92b7] [VIEW_RENDER] themes/public/home
INFO - 2026-03-24 06:01:57 --> [REQ_ID=16d3a3fb92b7] [MEMORY][commonData:start] 8388608
INFO - 2026-03-24 06:01:57 --> themesMemory usage: 8388608
DEBUG - 2026-03-24 06:01:57 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-24 06:01:57 --> [REQ_ID=f6780c057b33] [FILTER_AFTER]
DEBUG - 2026-03-24 06:01:57 --> [REQ_ID=f6780c057b33] [LIFECYCLE][END] status=200 duration_ms=725.91 memory_delta=4194304
INFO - 2026-03-24 06:01:57 --> [REQ_ID=16d3a3fb92b7] [PERF] Execution time=0.723965
DEBUG - 2026-03-24 06:01:57 --> [REQ_ID=f6780c057b33] [REQUEST][END]
INFO - 2026-03-24 06:01:57 --> [REQ_ID=f6780c057b33] [PERF] Execution time=0.744369
DEBUG - 2026-03-24 06:15:01 --> [REQ_ID=f33119629f37] [REQUEST][START] GET /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-24 06:15:02 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-24 06:15:02 --> [REQ_ID=f33119629f37] [FILTER_BEFORE] /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-24 06:15:02 --> [REQ_ID=f33119629f37] [ROUTE] Controller=\App\Modules\APIs\Controllers\AlertsAPIController Method=fetchEmailAlerts
DEBUG - 2026-03-24 06:15:02 --> [REQ_ID=f33119629f37] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-24 06:15:02 --> [REQ_ID=f33119629f37] [REQUEST][END]
INFO - 2026-03-24 06:15:02 --> [REQ_ID=f33119629f37] [PERF] Execution time=0.045862
DEBUG - 2026-03-24 06:26:22 --> [REQ_ID=184c44faf3d9] [REQUEST][START] HEAD /
DEBUG - 2026-03-24 06:26:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-24 06:26:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-24 06:26:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-24 06:26:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-24 06:26:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-24 06:31:22 --> [REQ_ID=7693c147a61c] [REQUEST][START] HEAD /
DEBUG - 2026-03-24 06:31:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-24 06:31:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-24 06:31:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-24 06:31:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-24 06:31:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-24 06:50:05 --> [REQ_ID=39cc555e02d9] [REQUEST][START] GET /
DEBUG - 2026-03-24 06:50:05 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-24 06:50:05 --> [REQ_ID=39cc555e02d9] [FILTER_BEFORE] /
DEBUG - 2026-03-24 06:50:05 --> [REQ_ID=39cc555e02d9] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-24 06:50:05 --> [REQ_ID=39cc555e02d9] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-24 06:50:05 --> [CSRF] token name=csrf_test_name hash=ac5b2e848eacb56ff07941a43d982c12
DEBUG - 2026-03-24 06:50:05 --> [REQ_ID=4bd72b4505e1] [INIT] App\Controllers\Home::GET
INFO - 2026-03-24 06:50:05 --> [REQ_ID=4bd72b4505e1] [MEMORY][controller-start] 6291456
INFO - 2026-03-24 06:50:05 --> [REQ_ID=4bd72b4505e1] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-24 06:50:05 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-24 06:50:06 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-03-24 06:50:06 --> [REQ_ID=4bd72b4505e1] [VIEW_RENDER] themes/public/home
INFO - 2026-03-24 06:50:06 --> [REQ_ID=4bd72b4505e1] [MEMORY][commonData:start] 10485760
INFO - 2026-03-24 06:50:06 --> themesMemory usage: 10485760
DEBUG - 2026-03-24 06:50:06 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-24 06:50:06 --> [REQ_ID=39cc555e02d9] [FILTER_AFTER]
DEBUG - 2026-03-24 06:50:06 --> [REQ_ID=39cc555e02d9] [LIFECYCLE][END] status=200 duration_ms=776.60 memory_delta=4194304
INFO - 2026-03-24 06:50:06 --> [REQ_ID=4bd72b4505e1] [PERF] Execution time=0.774754
DEBUG - 2026-03-24 06:50:06 --> [REQ_ID=39cc555e02d9] [REQUEST][END]
INFO - 2026-03-24 06:50:06 --> [REQ_ID=39cc555e02d9] [PERF] Execution time=0.814402
DEBUG - 2026-03-24 06:51:22 --> [REQ_ID=5bbbc1a89d75] [REQUEST][START] HEAD /
DEBUG - 2026-03-24 06:51:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-24 06:51:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-24 06:51:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-24 06:51:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-24 06:51:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-24 06:56:22 --> [REQ_ID=0842893a0398] [REQUEST][START] HEAD /
DEBUG - 2026-03-24 06:56:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-24 06:56:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-24 06:56:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-24 06:56:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-24 06:56:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
INFO - 2026-03-24 07:00:01 --> [spark:ops:work] Started
INFO - 2026-03-24 07:00:01 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-03-24 07:00:01 --> [SPARK_MEMORY] 18874368
INFO - 2026-03-24 07:00:01 --> [spark:ops:work] Intent
DEBUG - 2026-03-24 07:00:01 --> [REQ_ID=89c149e98a29] [REQUEST][START] GET /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-24 07:00:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-24 07:00:01 --> [REQ_ID=89c149e98a29] [FILTER_BEFORE] /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-24 07:00:01 --> [REQ_ID=89c149e98a29] [ROUTE] Controller=\App\Modules\Management\Controllers\ManagementAPIController Method=Run_CRON_Tasks
DEBUG - 2026-03-24 07:00:01 --> [REQ_ID=89c149e98a29] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-24 07:00:01 --> [REQ_ID=89c149e98a29] [REQUEST][END]
INFO - 2026-03-24 07:00:01 --> [REQ_ID=89c149e98a29] [PERF] Execution time=0.049239
INFO - 2026-03-24 07:00:01 --> [SPARK_START] App\Commands\AIOps\Run
INFO - 2026-03-24 07:00:01 --> [SPARK_MEMORY] 18874368
INFO - 2026-03-24 07:00:01 --> [spark:aiops:run] Intent
INFO - 2026-03-24 07:00:01 --> [spark:ops:work] Completed
INFO - 2026-03-24 07:00:01 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.213889
INFO - 2026-03-24 07:00:01 --> [SPARK_MEMORY] 18874368
INFO - 2026-03-24 07:00:03 --> [AIOPS][SPARK][GOVERNANCE][spark:logs:summarize] Started
INFO - 2026-03-24 07:00:03 --> [SPARK_START] App\Commands\Logs\Summarize
INFO - 2026-03-24 07:00:03 --> [SPARK_MEMORY] 18874368
INFO - 2026-03-24 07:00:03 --> [spark:logs:summarize] Intent
INFO - 2026-03-24 07:00:03 --> [AIOPS][SPARK][GOVERNANCE][spark:logs:summarize] Completed
INFO - 2026-03-24 07:00:03 --> [SPARK_COMPLETE] App\Commands\Logs\Summarize duration=0.004678
INFO - 2026-03-24 07:00:03 --> [SPARK_MEMORY] 18874368
INFO - 2026-03-24 07:00:03 --> [spark:app:healthcheck] Started
INFO - 2026-03-24 07:00:03 --> [SPARK_START] App\Commands\App\Healthcheck
INFO - 2026-03-24 07:00:03 --> [SPARK_MEMORY] 18874368
INFO - 2026-03-24 07:00:03 --> [spark:app:healthcheck] Intent
DEBUG - 2026-03-24 07:00:03 --> LOG_HEALTHCHECK debug marker=d6c679c5c51a
INFO - 2026-03-24 07:00:03 --> LOG_HEALTHCHECK info marker=d6c679c5c51a
NOTICE - 2026-03-24 07:00:03 --> LOG_HEALTHCHECK probe marker=d6c679c5c51a
INFO - 2026-03-24 07:00:03 --> [spark:app:healthcheck] Completed
INFO - 2026-03-24 07:00:03 --> [SPARK_COMPLETE] App\Commands\App\Healthcheck duration=0.031119
INFO - 2026-03-24 07:00:03 --> [SPARK_MEMORY] 18874368
INFO - 2026-03-24 07:00:03 --> [SPARK_COMPLETE] App\Commands\AIOps\Run duration=2.173990
INFO - 2026-03-24 07:00:03 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-03-24 07:01:22 --> [REQ_ID=d7924881bbb9] [REQUEST][START] HEAD /
DEBUG - 2026-03-24 07:01:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-24 07:01:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-24 07:01:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-24 07:01:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-24 07:01:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-24 07:06:22 --> [REQ_ID=d3c51130a130] [REQUEST][START] HEAD /
DEBUG - 2026-03-24 07:06:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-24 07:06:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-24 07:06:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-24 07:06:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-24 07:06:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-24 07:15:01 --> [REQ_ID=d7a79b88211f] [REQUEST][START] GET /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-24 07:15:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-24 07:15:01 --> [REQ_ID=d7a79b88211f] [FILTER_BEFORE] /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-24 07:15:01 --> [REQ_ID=d7a79b88211f] [ROUTE] Controller=\App\Modules\APIs\Controllers\AlertsAPIController Method=fetchEmailAlerts
DEBUG - 2026-03-24 07:15:01 --> [REQ_ID=d7a79b88211f] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-24 07:15:01 --> [REQ_ID=d7a79b88211f] [REQUEST][END]
INFO - 2026-03-24 07:15:01 --> [REQ_ID=d7a79b88211f] [PERF] Execution time=0.044848
DEBUG - 2026-03-24 07:16:22 --> [REQ_ID=afa87161d14a] [REQUEST][START] HEAD /
DEBUG - 2026-03-24 07:16:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-24 07:16:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-24 07:16:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-24 07:16:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-24 07:16:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-24 07:21:22 --> [REQ_ID=9310c68cbe20] [REQUEST][START] HEAD /
DEBUG - 2026-03-24 07:21:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-24 07:21:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-24 07:21:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-24 07:21:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-24 07:21:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-24 07:26:22 --> [REQ_ID=5bb6e7297ebf] [REQUEST][START] HEAD /
DEBUG - 2026-03-24 07:26:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-24 07:26:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-24 07:26:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-24 07:26:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-24 07:26:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-24 07:31:22 --> [REQ_ID=35f41121d9b4] [REQUEST][START] HEAD /
DEBUG - 2026-03-24 07:31:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-24 07:31:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-24 07:31:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-24 07:31:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-24 07:31:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-24 07:36:22 --> [REQ_ID=fecadfb832c3] [REQUEST][START] HEAD /
DEBUG - 2026-03-24 07:36:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-24 07:36:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-24 07:36:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-24 07:36:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-24 07:36:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-24 07:41:22 --> [REQ_ID=a5fd836b021d] [REQUEST][START] HEAD /
DEBUG - 2026-03-24 07:41:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-24 07:41:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-24 07:41:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-24 07:41:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-24 07:41:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-24 07:46:22 --> [REQ_ID=95260a30f562] [REQUEST][START] HEAD /
DEBUG - 2026-03-24 07:46:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-24 07:46:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-24 07:46:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-24 07:46:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-24 07:46:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-24 07:51:22 --> [REQ_ID=76f76f1473ac] [REQUEST][START] HEAD /
DEBUG - 2026-03-24 07:51:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-24 07:51:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-24 07:51:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-24 07:51:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-24 07:51:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-24 07:56:22 --> [REQ_ID=3e77c519ec73] [REQUEST][START] HEAD /
DEBUG - 2026-03-24 07:56:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-24 07:56:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-24 07:56:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-24 07:56:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-24 07:56:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-24 07:57:01 --> [REQ_ID=2459024ef1b1] [REQUEST][START] GET /
DEBUG - 2026-03-24 07:57:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-24 07:57:01 --> [REQ_ID=2459024ef1b1] [FILTER_BEFORE] /
DEBUG - 2026-03-24 07:57:01 --> [REQ_ID=2459024ef1b1] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-24 07:57:01 --> [REQ_ID=2459024ef1b1] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-24 07:57:01 --> [CSRF] token name=csrf_test_name hash=5e19e09f4b82293efe576e2df60c8f1b
DEBUG - 2026-03-24 07:57:01 --> [REQ_ID=96104823096d] [INIT] App\Controllers\Home::GET
INFO - 2026-03-24 07:57:01 --> [REQ_ID=96104823096d] [MEMORY][controller-start] 4194304
INFO - 2026-03-24 07:57:01 --> [REQ_ID=96104823096d] [MEMORY][commonData:start] 4194304
DEBUG - 2026-03-24 07:57:01 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-24 07:57:02 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-03-24 07:57:02 --> [REQ_ID=96104823096d] [VIEW_RENDER] themes/public/home
INFO - 2026-03-24 07:57:02 --> [REQ_ID=96104823096d] [MEMORY][commonData:start] 8388608
INFO - 2026-03-24 07:57:02 --> themesMemory usage: 8388608
DEBUG - 2026-03-24 07:57:02 --> [MetaService] slug= pageName=Home cacheHit= path=DB
DEBUG - 2026-03-24 07:57:02 --> [REQ_ID=2459024ef1b1] [FILTER_AFTER]
DEBUG - 2026-03-24 07:57:02 --> [REQ_ID=2459024ef1b1] [LIFECYCLE][END] status=200 duration_ms=653.04 memory_delta=4194304
INFO - 2026-03-24 07:57:02 --> [REQ_ID=96104823096d] [PERF] Execution time=0.651116
DEBUG - 2026-03-24 07:57:02 --> [REQ_ID=2459024ef1b1] [REQUEST][END]
INFO - 2026-03-24 07:57:02 --> [REQ_ID=2459024ef1b1] [PERF] Execution time=0.672139
DEBUG - 2026-03-24 07:57:02 --> [REQ_ID=0459e63cbf12] [REQUEST][START] GET /
DEBUG - 2026-03-24 07:57:02 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-24 07:57:02 --> [REQ_ID=0459e63cbf12] [FILTER_BEFORE] /
DEBUG - 2026-03-24 07:57:02 --> [REQ_ID=0459e63cbf12] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-24 07:57:02 --> [REQ_ID=0459e63cbf12] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-24 07:57:02 --> [CSRF] token name=csrf_test_name hash=5e19e09f4b82293efe576e2df60c8f1b
DEBUG - 2026-03-24 07:57:02 --> [REQ_ID=b2fd7100fabf] [INIT] App\Controllers\Home::GET
INFO - 2026-03-24 07:57:02 --> [REQ_ID=b2fd7100fabf] [MEMORY][controller-start] 4194304
INFO - 2026-03-24 07:57:02 --> [REQ_ID=b2fd7100fabf] [MEMORY][commonData:start] 4194304
DEBUG - 2026-03-24 07:57:02 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-24 07:57:03 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
DEBUG - 2026-03-24 07:57:03 --> [REQ_ID=b2fd7100fabf] [VIEW_RENDER] themes/public/home
INFO - 2026-03-24 07:57:03 --> [REQ_ID=b2fd7100fabf] [MEMORY][commonData:start] 8388608
INFO - 2026-03-24 07:57:03 --> themesMemory usage: 8388608
DEBUG - 2026-03-24 07:57:03 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-24 07:57:03 --> [REQ_ID=0459e63cbf12] [FILTER_AFTER]
DEBUG - 2026-03-24 07:57:03 --> [REQ_ID=0459e63cbf12] [LIFECYCLE][END] status=200 duration_ms=529.67 memory_delta=4194304
INFO - 2026-03-24 07:57:03 --> [REQ_ID=b2fd7100fabf] [PERF] Execution time=0.529514
DEBUG - 2026-03-24 07:57:03 --> [REQ_ID=0459e63cbf12] [REQUEST][END]
INFO - 2026-03-24 07:57:03 --> [REQ_ID=0459e63cbf12] [PERF] Execution time=0.538285
DEBUG - 2026-03-24 07:57:03 --> [REQ_ID=ac9405cd2aff] [REQUEST][START] GET /index.php
DEBUG - 2026-03-24 07:57:03 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-24 07:57:03 --> [REQ_ID=ac9405cd2aff] [FILTER_BEFORE] /index.php
DEBUG - 2026-03-24 07:57:03 --> [REQ_ID=ac9405cd2aff] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-24 07:57:03 --> [REQ_ID=ac9405cd2aff] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-24 07:57:03 --> [CSRF] token name=csrf_test_name hash=5e19e09f4b82293efe576e2df60c8f1b
DEBUG - 2026-03-24 07:57:03 --> [REQ_ID=e913373122fd] [INIT] App\Controllers\Home::GET
INFO - 2026-03-24 07:57:03 --> [REQ_ID=e913373122fd] [MEMORY][controller-start] 6291456
INFO - 2026-03-24 07:57:03 --> [REQ_ID=e913373122fd] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-24 07:57:03 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-24 07:57:04 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
DEBUG - 2026-03-24 07:57:04 --> [REQ_ID=e913373122fd] [VIEW_RENDER] themes/public/home
INFO - 2026-03-24 07:57:04 --> [REQ_ID=e913373122fd] [MEMORY][commonData:start] 8388608
INFO - 2026-03-24 07:57:04 --> themesMemory usage: 8388608
DEBUG - 2026-03-24 07:57:04 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-24 07:57:04 --> [REQ_ID=ac9405cd2aff] [FILTER_AFTER]
DEBUG - 2026-03-24 07:57:04 --> [REQ_ID=ac9405cd2aff] [LIFECYCLE][END] status=200 duration_ms=543.01 memory_delta=2097152
INFO - 2026-03-24 07:57:04 --> [REQ_ID=e913373122fd] [PERF] Execution time=0.542812
DEBUG - 2026-03-24 07:57:04 --> [REQ_ID=ac9405cd2aff] [REQUEST][END]
INFO - 2026-03-24 07:57:04 --> [REQ_ID=ac9405cd2aff] [PERF] Execution time=0.551897
DEBUG - 2026-03-24 07:57:05 --> [REQ_ID=dc49058f4274] [REQUEST][START] GET /index.php/Blog
DEBUG - 2026-03-24 07:57:05 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-24 07:57:05 --> [REQ_ID=dc49058f4274] [FILTER_BEFORE] /index.php/Blog
DEBUG - 2026-03-24 07:57:05 --> [REQ_ID=dc49058f4274] [ROUTE] Controller=\App\Modules\Blog\Controllers\BlogController Method=index
DEBUG - 2026-03-24 07:57:05 --> [REQ_ID=dc49058f4274] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Blog
DEBUG - 2026-03-24 07:57:05 --> [CSRF] token name=csrf_test_name hash=5e19e09f4b82293efe576e2df60c8f1b
DEBUG - 2026-03-24 07:57:05 --> [REQ_ID=99efd51801bc] [INIT] App\Modules\Blog\Controllers\BlogController::GET
INFO - 2026-03-24 07:57:05 --> [REQ_ID=99efd51801bc] [MEMORY][controller-start] 6291456
DEBUG - 2026-03-24 07:57:05 --> [REQ_ID=99efd51801bc] [METHOD_ENTRY] index
DEBUG - 2026-03-24 07:57:05 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-24 07:57:05 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-24 07:57:05 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-24 07:57:05 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-24 07:57:05 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-24 07:57:05 --> MyMICoin: guest context detected; skipping user-specific preload.
INFO - 2026-03-24 07:57:05 --> [REQ_ID=99efd51801bc] [MEMORY][commonData:start] 6291456
INFO - 2026-03-24 07:57:05 --> [REQ_ID=99efd51801bc] [PERF] Execution time=0.054934
DEBUG - 2026-03-24 07:57:05 --> [REQ_ID=48e198ea5d28] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-24 07:57:05 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-24 07:57:05 --> [REQ_ID=48e198ea5d28] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-24 07:57:05 --> [REQ_ID=48e198ea5d28] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-24 07:57:05 --> [REQ_ID=48e198ea5d28] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-24 07:57:05 --> [CSRF] token name=csrf_test_name hash=5e19e09f4b82293efe576e2df60c8f1b
DEBUG - 2026-03-24 07:57:05 --> [REQ_ID=f4d87dc4a6c6] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-24 07:57:05 --> [REQ_ID=f4d87dc4a6c6] [MEMORY][controller-start] 6291456
DEBUG - 2026-03-24 07:57:05 --> [REQ_ID=48e198ea5d28] [FILTER_AFTER]
DEBUG - 2026-03-24 07:57:05 --> [REQ_ID=48e198ea5d28] [LIFECYCLE][END] status=200 duration_ms=20.06 memory_delta=0
INFO - 2026-03-24 07:57:05 --> [REQ_ID=f4d87dc4a6c6] [PERF] Execution time=0.019859
DEBUG - 2026-03-24 07:57:05 --> [REQ_ID=48e198ea5d28] [REQUEST][END]
INFO - 2026-03-24 07:57:05 --> [REQ_ID=48e198ea5d28] [PERF] Execution time=0.032439
DEBUG - 2026-03-24 07:57:06 --> [REQ_ID=ab241de90547] [REQUEST][START] GET /index.php/Support
DEBUG - 2026-03-24 07:57:06 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-24 07:57:06 --> [REQ_ID=ab241de90547] [FILTER_BEFORE] /index.php/Support
DEBUG - 2026-03-24 07:57:06 --> [REQ_ID=ab241de90547] [ROUTE] Controller=\App\Modules\Support\Controllers\SupportController Method=index
DEBUG - 2026-03-24 07:57:06 --> [REQ_ID=ab241de90547] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Support
DEBUG - 2026-03-24 07:57:06 --> [CSRF] token name=csrf_test_name hash=5e19e09f4b82293efe576e2df60c8f1b
DEBUG - 2026-03-24 07:57:06 --> [REQ_ID=da565be98601] [INIT] App\Modules\Support\Controllers\SupportController::GET
INFO - 2026-03-24 07:57:06 --> [REQ_ID=da565be98601] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-24 07:57:06 --> [REQ_ID=da565be98601] [METHOD_ENTRY] index
DEBUG - 2026-03-24 07:57:06 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-24 07:57:06 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-24 07:57:06 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-24 07:57:06 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-24 07:57:06 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-24 07:57:06 --> MyMICoin: guest context detected; skipping user-specific preload.
INFO - 2026-03-24 07:57:06 --> [REQ_ID=da565be98601] [MEMORY][commonData:start] 4194304
DEBUG - 2026-03-24 07:57:06 --> [REQ_ID=da565be98601] [VIEW_RENDER] SupportModule\Views\Support\index
INFO - 2026-03-24 07:57:06 --> [REQ_ID=da565be98601] [MEMORY][commonData:start] 4194304
INFO - 2026-03-24 07:57:06 --> themesMemory usage: 4194304
DEBUG - 2026-03-24 07:57:06 --> [REQ_ID=ab241de90547] [FILTER_AFTER]
DEBUG - 2026-03-24 07:57:06 --> [REQ_ID=ab241de90547] [LIFECYCLE][END] status=200 duration_ms=29.57 memory_delta=0
INFO - 2026-03-24 07:57:06 --> [REQ_ID=da565be98601] [PERF] Execution time=0.029426
DEBUG - 2026-03-24 07:57:06 --> [REQ_ID=ab241de90547] [REQUEST][END]
INFO - 2026-03-24 07:57:06 --> [REQ_ID=ab241de90547] [PERF] Execution time=0.039292
DEBUG - 2026-03-24 07:57:07 --> [REQ_ID=ce580eca78c5] [REQUEST][START] GET /index.php/Dashboard
DEBUG - 2026-03-24 07:57:07 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-24 07:57:07 --> [REQ_ID=ce580eca78c5] [FILTER_BEFORE] /index.php/Dashboard
DEBUG - 2026-03-24 07:57:07 --> [REQ_ID=ce580eca78c5] [ROUTE] Controller=\App\Modules\User\Controllers\DashboardController Method=index
DEBUG - 2026-03-24 07:57:07 --> [REQ_ID=ce580eca78c5] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Dashboard
DEBUG - 2026-03-24 07:57:07 --> [CSRF] token name=csrf_test_name hash=5e19e09f4b82293efe576e2df60c8f1b
DEBUG - 2026-03-24 07:57:07 --> [REQ_ID=ce580eca78c5] [REQUEST][END]
INFO - 2026-03-24 07:57:07 --> [REQ_ID=ce580eca78c5] [PERF] Execution time=0.017847
DEBUG - 2026-03-24 07:57:07 --> [REQ_ID=b6a8c039dcfd] [REQUEST][START] GET /
DEBUG - 2026-03-24 07:57:07 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-24 07:57:07 --> [REQ_ID=b6a8c039dcfd] [FILTER_BEFORE] /
DEBUG - 2026-03-24 07:57:07 --> [REQ_ID=b6a8c039dcfd] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-24 07:57:07 --> [REQ_ID=b6a8c039dcfd] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-24 07:57:07 --> [CSRF] token name=csrf_test_name hash=e1367993e5d8466570fa3722f43295ed
DEBUG - 2026-03-24 07:57:07 --> [REQ_ID=bd5ed0c3b9e3] [INIT] App\Controllers\Home::GET
INFO - 2026-03-24 07:57:07 --> [REQ_ID=bd5ed0c3b9e3] [MEMORY][controller-start] 4194304
INFO - 2026-03-24 07:57:07 --> [REQ_ID=bd5ed0c3b9e3] [MEMORY][commonData:start] 4194304
DEBUG - 2026-03-24 07:57:07 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-24 07:57:07 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
DEBUG - 2026-03-24 07:57:07 --> [REQ_ID=bd5ed0c3b9e3] [VIEW_RENDER] themes/public/home
INFO - 2026-03-24 07:57:07 --> [REQ_ID=bd5ed0c3b9e3] [MEMORY][commonData:start] 8388608
INFO - 2026-03-24 07:57:07 --> themesMemory usage: 8388608
DEBUG - 2026-03-24 07:57:07 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-24 07:57:07 --> [REQ_ID=b6a8c039dcfd] [FILTER_AFTER]
DEBUG - 2026-03-24 07:57:07 --> [REQ_ID=b6a8c039dcfd] [LIFECYCLE][END] status=200 duration_ms=471.17 memory_delta=4194304
INFO - 2026-03-24 07:57:07 --> [REQ_ID=bd5ed0c3b9e3] [PERF] Execution time=0.471013
DEBUG - 2026-03-24 07:57:07 --> [REQ_ID=b6a8c039dcfd] [REQUEST][END]
INFO - 2026-03-24 07:57:07 --> [REQ_ID=b6a8c039dcfd] [PERF] Execution time=0.479503
DEBUG - 2026-03-24 07:57:08 --> [REQ_ID=3d24a99dbf94] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-24 07:57:08 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-24 07:57:08 --> [REQ_ID=3d24a99dbf94] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-24 07:57:08 --> [REQ_ID=3d24a99dbf94] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-24 07:57:08 --> [REQ_ID=3d24a99dbf94] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-24 07:57:08 --> [CSRF] token name=csrf_test_name hash=5e19e09f4b82293efe576e2df60c8f1b
DEBUG - 2026-03-24 07:57:08 --> [REQ_ID=f96d9bb12b9b] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-24 07:57:08 --> [REQ_ID=f96d9bb12b9b] [MEMORY][controller-start] 6291456
DEBUG - 2026-03-24 07:57:08 --> [REQ_ID=3d24a99dbf94] [FILTER_AFTER]
DEBUG - 2026-03-24 07:57:08 --> [REQ_ID=3d24a99dbf94] [LIFECYCLE][END] status=200 duration_ms=17.59 memory_delta=0
INFO - 2026-03-24 07:57:08 --> [REQ_ID=f96d9bb12b9b] [PERF] Execution time=0.017361
DEBUG - 2026-03-24 07:57:08 --> [REQ_ID=3d24a99dbf94] [REQUEST][END]
INFO - 2026-03-24 07:57:08 --> [REQ_ID=3d24a99dbf94] [PERF] Execution time=0.028246
DEBUG - 2026-03-24 07:57:09 --> [REQ_ID=115b0018c7e2] [REQUEST][START] GET /index.php/How-It-Works
DEBUG - 2026-03-24 07:57:09 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-24 07:57:09 --> [REQ_ID=115b0018c7e2] [FILTER_BEFORE] /index.php/How-It-Works
DEBUG - 2026-03-24 07:57:09 --> [REQ_ID=115b0018c7e2] [ROUTE] Controller=\App\Modules\Blog\Controllers\HowItWorksController Method=index
DEBUG - 2026-03-24 07:57:09 --> [REQ_ID=115b0018c7e2] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/How-It-Works
DEBUG - 2026-03-24 07:57:09 --> [CSRF] token name=csrf_test_name hash=5e19e09f4b82293efe576e2df60c8f1b
DEBUG - 2026-03-24 07:57:09 --> [REQ_ID=e5959f141b76] [INIT] App\Modules\Blog\Controllers\HowItWorksController::GET
INFO - 2026-03-24 07:57:09 --> [REQ_ID=e5959f141b76] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-24 07:57:09 --> [REQ_ID=e5959f141b76] [METHOD_ENTRY] index
DEBUG - 2026-03-24 07:57:09 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-24 07:57:09 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-24 07:57:09 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-24 07:57:09 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-24 07:57:09 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-24 07:57:09 --> MyMICoin: guest context detected; skipping user-specific preload.
ERROR - 2026-03-24 07:57:09 --> HowItWorksController failure: overview
CRITICAL - 2026-03-24 07:57:09 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: GET, Route: How-It-Works]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-24 07:57:09 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-24 07:57:09 --> [404] URI=https://www.mymiwallet.com/index.php/How-It-Works
WARNING - 2026-03-24 07:57:09 --> 404 route miss: https://www.mymiwallet.com/index.php/How-It-Works | referrer: https://www.mymiwallet.com/index.php/How-It-Works
INFO - 2026-03-24 07:57:09 --> [REQ_ID=e5959f141b76] [PERF] Execution time=0.028775
DEBUG - 2026-03-24 07:57:09 --> [REQ_ID=860ca5545e23] [REQUEST][START] GET /index.php/Free/register
DEBUG - 2026-03-24 07:57:09 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-24 07:57:09 --> [REQ_ID=860ca5545e23] [FILTER_BEFORE] /index.php/Free/register
DEBUG - 2026-03-24 07:57:09 --> [REQ_ID=860ca5545e23] [ROUTE] Controller=\App\Controllers\AuthController Method=register
DEBUG - 2026-03-24 07:57:09 --> [REQ_ID=860ca5545e23] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Free/register
DEBUG - 2026-03-24 07:57:09 --> [CSRF] token name=csrf_test_name hash=5e19e09f4b82293efe576e2df60c8f1b
DEBUG - 2026-03-24 07:57:09 --> [REQ_ID=c43fbd49fa78] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-24 07:57:09 --> [REQ_ID=c43fbd49fa78] [MEMORY][controller-start] 4194304
INFO - 2026-03-24 07:57:09 --> [REGISTRATION] Form loaded
INFO - 2026-03-24 07:57:09 --> [REQ_ID=c43fbd49fa78] [PERF] Execution time=0.016746
DEBUG - 2026-03-24 07:57:10 --> [REQ_ID=553830a77ee0] [REQUEST][START] GET /index.php/Knowledgebase
DEBUG - 2026-03-24 07:57:10 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-24 07:57:10 --> ErrorException: Access level to App\Modules\User\Controllers\KnowledgebaseController::respondWithRendered() must be protected (as in class App\Controllers\BaseController) or weaker
[Method: GET, Route: Knowledgebase]
in APPPATH/Modules/User/Controllers/KnowledgebaseController.php on line 535.
 1 [internal function]: CodeIgniter\Debug\Exceptions->shutdownHandler()
CRITICAL - 2026-03-24 07:57:10 --> [EXCEPTION] Access level to App\Modules\User\Controllers\KnowledgebaseController::respondWithRendered() must be protected (as in class App\Controllers\BaseController) or weaker File=/home/mymiteam/mymiwallet/site/current/app/Modules/User/Controllers/KnowledgebaseController.php Line=535
DEBUG - 2026-03-24 07:57:10 --> [REQ_ID=1895d95544f6] [REQUEST][START] GET /index.php/Privacy-Policy
DEBUG - 2026-03-24 07:57:10 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-24 07:57:10 --> [REQ_ID=1895d95544f6] [FILTER_BEFORE] /index.php/Privacy-Policy
DEBUG - 2026-03-24 07:57:10 --> [REQ_ID=1895d95544f6] [ROUTE] Controller=\App\Controllers\Home Method=privacyPolicy
DEBUG - 2026-03-24 07:57:10 --> [REQ_ID=1895d95544f6] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Privacy-Policy
DEBUG - 2026-03-24 07:57:10 --> [CSRF] token name=csrf_test_name hash=5e19e09f4b82293efe576e2df60c8f1b
DEBUG - 2026-03-24 07:57:10 --> [REQ_ID=658e361d4a93] [INIT] App\Controllers\Home::GET
INFO - 2026-03-24 07:57:10 --> [REQ_ID=658e361d4a93] [MEMORY][controller-start] 4194304
INFO - 2026-03-24 07:57:10 --> [REQ_ID=658e361d4a93] [MEMORY][commonData:start] 4194304
DEBUG - 2026-03-24 07:57:10 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-24 07:57:11 --> [MetaService] slug=privacy-policy pageName= cacheHit= path=DB
DEBUG - 2026-03-24 07:57:11 --> [REQ_ID=658e361d4a93] [VIEW_RENDER] themes/public/privacyPolicy
INFO - 2026-03-24 07:57:11 --> [REQ_ID=658e361d4a93] [MEMORY][commonData:start] 8388608
INFO - 2026-03-24 07:57:11 --> themesMemory usage: 8388608
DEBUG - 2026-03-24 07:57:11 --> [MetaService] slug=privacy-policy pageName=Privacy Policy cacheHit= path=DB
DEBUG - 2026-03-24 07:57:11 --> [REQ_ID=1895d95544f6] [FILTER_AFTER]
DEBUG - 2026-03-24 07:57:11 --> [REQ_ID=1895d95544f6] [LIFECYCLE][END] status=200 duration_ms=470.42 memory_delta=4194304
INFO - 2026-03-24 07:57:11 --> [REQ_ID=658e361d4a93] [PERF] Execution time=0.470278
DEBUG - 2026-03-24 07:57:11 --> [REQ_ID=1895d95544f6] [REQUEST][END]
INFO - 2026-03-24 07:57:11 --> [REQ_ID=1895d95544f6] [PERF] Execution time=0.479994
DEBUG - 2026-03-24 08:00:01 --> [REQ_ID=1a0fac34d011] [REQUEST][START] GET /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-24 08:00:02 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-24 08:00:02 --> [REQ_ID=1a0fac34d011] [FILTER_BEFORE] /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-24 08:00:02 --> [REQ_ID=1a0fac34d011] [ROUTE] Controller=\App\Modules\Management\Controllers\ManagementAPIController Method=Run_CRON_Tasks
DEBUG - 2026-03-24 08:00:02 --> [REQ_ID=1a0fac34d011] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-24 08:00:02 --> [REQ_ID=1a0fac34d011] [REQUEST][END]
INFO - 2026-03-24 08:00:02 --> [REQ_ID=1a0fac34d011] [PERF] Execution time=0.047155
DEBUG - 2026-03-24 08:11:22 --> [REQ_ID=c6f33c89c849] [REQUEST][START] HEAD /
DEBUG - 2026-03-24 08:11:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-24 08:11:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-24 08:11:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-24 08:11:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-24 08:11:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-24 08:15:01 --> [REQ_ID=5f6e36525abb] [REQUEST][START] GET /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-24 08:15:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-24 08:15:01 --> [REQ_ID=5f6e36525abb] [FILTER_BEFORE] /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-24 08:15:01 --> [REQ_ID=5f6e36525abb] [ROUTE] Controller=\App\Modules\APIs\Controllers\AlertsAPIController Method=fetchEmailAlerts
DEBUG - 2026-03-24 08:15:01 --> [REQ_ID=5f6e36525abb] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-24 08:15:01 --> [REQ_ID=5f6e36525abb] [REQUEST][END]
INFO - 2026-03-24 08:15:01 --> [REQ_ID=5f6e36525abb] [PERF] Execution time=0.049920
DEBUG - 2026-03-24 08:16:22 --> [REQ_ID=e3ac2520be58] [REQUEST][START] HEAD /
DEBUG - 2026-03-24 08:16:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-24 08:16:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-24 08:16:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-24 08:16:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-24 08:16:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-24 08:21:22 --> [REQ_ID=ec752d552a82] [REQUEST][START] HEAD /
DEBUG - 2026-03-24 08:21:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-24 08:21:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-24 08:21:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-24 08:21:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-24 08:21:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-24 08:26:22 --> [REQ_ID=374e58117261] [REQUEST][START] HEAD /
DEBUG - 2026-03-24 08:26:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-24 08:26:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-24 08:26:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-24 08:26:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-24 08:26:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-24 08:30:27 --> [REQ_ID=fd42ed6008dd] [REQUEST][START] GET /index.php/Budget/Financial-Analysis
DEBUG - 2026-03-24 08:30:27 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-24 08:30:27 --> [REQ_ID=fd42ed6008dd] [REQUEST][END]
INFO - 2026-03-24 08:30:27 --> [REQ_ID=fd42ed6008dd] [PERF] Execution time=0.064034
DEBUG - 2026-03-24 08:31:22 --> [REQ_ID=4b3a82f5ea88] [REQUEST][START] HEAD /
DEBUG - 2026-03-24 08:31:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-24 08:31:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-24 08:31:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-24 08:31:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-24 08:31:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-24 08:36:22 --> [REQ_ID=0afc4568be33] [REQUEST][START] HEAD /
DEBUG - 2026-03-24 08:36:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-24 08:36:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-24 08:36:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-24 08:36:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-24 08:36:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-24 08:50:26 --> [REQ_ID=d32accbd1a2e] [REQUEST][START] GET /index.php/Privacy-Policy
DEBUG - 2026-03-24 08:50:26 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-24 08:50:26 --> [REQ_ID=d32accbd1a2e] [REQUEST][END]
INFO - 2026-03-24 08:50:26 --> [REQ_ID=d32accbd1a2e] [PERF] Execution time=0.040953
DEBUG - 2026-03-24 08:51:22 --> [REQ_ID=d0f59120758e] [REQUEST][START] HEAD /
DEBUG - 2026-03-24 08:51:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-24 08:51:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-24 08:51:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-24 08:51:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-24 08:51:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-24 08:53:37 --> [REQ_ID=b17623b82637] [REQUEST][START] GET /
DEBUG - 2026-03-24 08:53:37 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-24 08:53:37 --> [REQ_ID=b17623b82637] [FILTER_BEFORE] /
DEBUG - 2026-03-24 08:53:37 --> [REQ_ID=b17623b82637] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-24 08:53:37 --> [REQ_ID=b17623b82637] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-24 08:53:37 --> [CSRF] token name=csrf_test_name hash=2a69cb3c8e0bd1506cc92aecce631097
DEBUG - 2026-03-24 08:53:37 --> [REQ_ID=59b255bb0977] [INIT] App\Controllers\Home::GET
INFO - 2026-03-24 08:53:37 --> [REQ_ID=59b255bb0977] [MEMORY][controller-start] 6291456
INFO - 2026-03-24 08:53:38 --> [REQ_ID=59b255bb0977] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-24 08:53:38 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-24 08:53:38 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-03-24 08:53:38 --> [REQ_ID=59b255bb0977] [VIEW_RENDER] themes/public/home
INFO - 2026-03-24 08:53:38 --> [REQ_ID=59b255bb0977] [MEMORY][commonData:start] 10485760
INFO - 2026-03-24 08:53:38 --> themesMemory usage: 10485760
DEBUG - 2026-03-24 08:53:38 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-24 08:53:38 --> [REQ_ID=b17623b82637] [FILTER_AFTER]
DEBUG - 2026-03-24 08:53:38 --> [REQ_ID=b17623b82637] [LIFECYCLE][END] status=200 duration_ms=846.26 memory_delta=4194304
INFO - 2026-03-24 08:53:38 --> [REQ_ID=59b255bb0977] [PERF] Execution time=0.844294
DEBUG - 2026-03-24 08:53:38 --> [REQ_ID=b17623b82637] [REQUEST][END]
INFO - 2026-03-24 08:53:38 --> [REQ_ID=b17623b82637] [PERF] Execution time=0.886875
DEBUG - 2026-03-24 08:55:21 --> [REQ_ID=ee0a1ec36a87] [REQUEST][START] GET /index.php/My-Referrals
DEBUG - 2026-03-24 08:55:21 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-24 08:55:21 --> [REQ_ID=ee0a1ec36a87] [REQUEST][END]
INFO - 2026-03-24 08:55:21 --> [REQ_ID=ee0a1ec36a87] [PERF] Execution time=0.041901
DEBUG - 2026-03-24 09:00:02 --> [REQ_ID=d1100fc28376] [REQUEST][START] GET /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-24 09:00:02 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-24 09:00:02 --> [REQ_ID=d1100fc28376] [FILTER_BEFORE] /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-24 09:00:02 --> [REQ_ID=d1100fc28376] [ROUTE] Controller=\App\Modules\Management\Controllers\ManagementAPIController Method=Run_CRON_Tasks
DEBUG - 2026-03-24 09:00:02 --> [REQ_ID=d1100fc28376] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-24 09:00:02 --> [REQ_ID=d1100fc28376] [REQUEST][END]
INFO - 2026-03-24 09:00:02 --> [REQ_ID=d1100fc28376] [PERF] Execution time=0.042794
DEBUG - 2026-03-24 09:00:30 --> [REQ_ID=4c6ee90aa04d] [REQUEST][START] GET /index.php/Knowledgebase
DEBUG - 2026-03-24 09:00:30 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-24 09:00:30 --> ErrorException: Access level to App\Modules\User\Controllers\KnowledgebaseController::respondWithRendered() must be protected (as in class App\Controllers\BaseController) or weaker
[Method: GET, Route: Knowledgebase]
in APPPATH/Modules/User/Controllers/KnowledgebaseController.php on line 535.
 1 [internal function]: CodeIgniter\Debug\Exceptions->shutdownHandler()
CRITICAL - 2026-03-24 09:00:30 --> [EXCEPTION] Access level to App\Modules\User\Controllers\KnowledgebaseController::respondWithRendered() must be protected (as in class App\Controllers\BaseController) or weaker File=/home/mymiteam/mymiwallet/site/current/app/Modules/User/Controllers/KnowledgebaseController.php Line=535
ERROR - 2026-03-24 09:00:30 --> [ERROR_PAGE] event=error_500 status=500 message=Internal server error.
DEBUG - 2026-03-24 09:05:07 --> [REQ_ID=475172825784] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-24 09:05:07 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-24 09:05:07 --> [REQ_ID=475172825784] [REQUEST][END]
INFO - 2026-03-24 09:05:07 --> [REQ_ID=475172825784] [PERF] Execution time=0.040107
DEBUG - 2026-03-24 09:05:23 --> [REQ_ID=ca81e87a437c] [REQUEST][START] GET /index.php/Account/Notifications
DEBUG - 2026-03-24 09:05:23 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-24 09:05:23 --> [REQ_ID=ca81e87a437c] [REQUEST][END]
INFO - 2026-03-24 09:05:23 --> [REQ_ID=ca81e87a437c] [PERF] Execution time=0.013250
DEBUG - 2026-03-24 09:10:44 --> [REQ_ID=800fc5eb86a8] [REQUEST][START] GET /index.php/Management/Exchange
DEBUG - 2026-03-24 09:10:44 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-24 09:10:44 --> [REQ_ID=800fc5eb86a8] [REQUEST][END]
INFO - 2026-03-24 09:10:44 --> [REQ_ID=800fc5eb86a8] [PERF] Execution time=0.040836
DEBUG - 2026-03-24 09:11:22 --> [REQ_ID=376f117943cf] [REQUEST][START] HEAD /
DEBUG - 2026-03-24 09:11:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-24 09:11:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-24 09:11:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-24 09:11:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-24 09:11:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-24 09:15:01 --> [REQ_ID=25a858151081] [REQUEST][START] GET /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-24 09:15:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-24 09:15:01 --> [REQ_ID=25a858151081] [FILTER_BEFORE] /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-24 09:15:01 --> [REQ_ID=25a858151081] [ROUTE] Controller=\App\Modules\APIs\Controllers\AlertsAPIController Method=fetchEmailAlerts
DEBUG - 2026-03-24 09:15:01 --> [REQ_ID=25a858151081] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-24 09:15:01 --> [REQ_ID=25a858151081] [REQUEST][END]
INFO - 2026-03-24 09:15:01 --> [REQ_ID=25a858151081] [PERF] Execution time=0.048808
DEBUG - 2026-03-24 09:16:22 --> [REQ_ID=58e9416753ac] [REQUEST][START] HEAD /
DEBUG - 2026-03-24 09:16:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-24 09:16:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-24 09:16:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-24 09:16:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-24 09:16:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-24 09:18:02 --> [REQ_ID=7252a16d9763] [REQUEST][START] GET /
DEBUG - 2026-03-24 09:18:02 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-24 09:18:02 --> [REQ_ID=7252a16d9763] [FILTER_BEFORE] /
DEBUG - 2026-03-24 09:18:02 --> [REQ_ID=7252a16d9763] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-24 09:18:02 --> [REQ_ID=7252a16d9763] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-24 09:18:02 --> [CSRF] token name=csrf_test_name hash=ab1c0661639e5ce215243eddb330dd9e
DEBUG - 2026-03-24 09:18:02 --> [REQ_ID=226aa9dc14a1] [INIT] App\Controllers\Home::GET
INFO - 2026-03-24 09:18:02 --> [REQ_ID=226aa9dc14a1] [MEMORY][controller-start] 6291456
INFO - 2026-03-24 09:18:03 --> [REQ_ID=226aa9dc14a1] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-24 09:18:03 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-24 09:18:03 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-03-24 09:18:03 --> [REQ_ID=226aa9dc14a1] [VIEW_RENDER] themes/public/home
INFO - 2026-03-24 09:18:03 --> [REQ_ID=226aa9dc14a1] [MEMORY][commonData:start] 10485760
INFO - 2026-03-24 09:18:03 --> themesMemory usage: 10485760
DEBUG - 2026-03-24 09:18:03 --> [MetaService] slug= pageName=Home cacheHit= path=DB
DEBUG - 2026-03-24 09:18:03 --> [REQ_ID=7252a16d9763] [FILTER_AFTER]
DEBUG - 2026-03-24 09:18:03 --> [REQ_ID=7252a16d9763] [LIFECYCLE][END] status=200 duration_ms=829.00 memory_delta=4194304
INFO - 2026-03-24 09:18:03 --> [REQ_ID=226aa9dc14a1] [PERF] Execution time=0.827329
DEBUG - 2026-03-24 09:18:03 --> [REQ_ID=7252a16d9763] [REQUEST][END]
INFO - 2026-03-24 09:18:03 --> [REQ_ID=7252a16d9763] [PERF] Execution time=0.867775
DEBUG - 2026-03-24 09:21:22 --> [REQ_ID=0895edd569ec] [REQUEST][START] HEAD /
DEBUG - 2026-03-24 09:21:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-24 09:21:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-24 09:21:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-24 09:21:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-24 09:21:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-24 09:26:22 --> [REQ_ID=83c04be3451a] [REQUEST][START] HEAD /
DEBUG - 2026-03-24 09:26:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-24 09:26:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-24 09:26:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-24 09:26:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-24 09:26:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-24 09:30:19 --> [REQ_ID=be481e8cff64] [REQUEST][START] GET /index.php/Knowledgebase/Technical-Support
DEBUG - 2026-03-24 09:30:19 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-24 09:30:19 --> ErrorException: Access level to App\Modules\User\Controllers\KnowledgebaseController::respondWithRendered() must be protected (as in class App\Controllers\BaseController) or weaker
[Method: GET, Route: Knowledgebase/Technical-Support]
in APPPATH/Modules/User/Controllers/KnowledgebaseController.php on line 535.
 1 [internal function]: CodeIgniter\Debug\Exceptions->shutdownHandler()
CRITICAL - 2026-03-24 09:30:19 --> [EXCEPTION] Access level to App\Modules\User\Controllers\KnowledgebaseController::respondWithRendered() must be protected (as in class App\Controllers\BaseController) or weaker File=/home/mymiteam/mymiwallet/site/current/app/Modules/User/Controllers/KnowledgebaseController.php Line=535
ERROR - 2026-03-24 09:30:19 --> [ERROR_PAGE] event=error_500 status=500 message=Internal server error.
DEBUG - 2026-03-24 09:36:13 --> [REQ_ID=02dfb8e06f86] [REQUEST][START] GET /index.php/Account/Activity
DEBUG - 2026-03-24 09:36:13 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-24 09:36:13 --> [REQ_ID=02dfb8e06f86] [REQUEST][END]
INFO - 2026-03-24 09:36:13 --> [REQ_ID=02dfb8e06f86] [PERF] Execution time=0.056904
DEBUG - 2026-03-24 09:36:22 --> [REQ_ID=5b6743b1353d] [REQUEST][START] HEAD /
DEBUG - 2026-03-24 09:36:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-24 09:36:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-24 09:36:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-24 09:36:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-24 09:36:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-24 09:46:22 --> [REQ_ID=97f25d40f63b] [REQUEST][START] HEAD /
DEBUG - 2026-03-24 09:46:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-24 09:46:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-24 09:46:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-24 09:46:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-24 09:46:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-24 09:54:24 --> [REQ_ID=54cb5a59b2f1] [REQUEST][START] GET /index.php/Wallets/Purchase/Memberships/Starter
DEBUG - 2026-03-24 09:54:24 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-24 09:54:24 --> [REQ_ID=54cb5a59b2f1] [REQUEST][END]
INFO - 2026-03-24 09:54:24 --> [REQ_ID=54cb5a59b2f1] [PERF] Execution time=0.045499
DEBUG - 2026-03-24 09:56:45 --> [REQ_ID=cc3d6d0576b9] [REQUEST][START] GET /
DEBUG - 2026-03-24 09:56:45 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-24 09:56:45 --> [REQ_ID=cc3d6d0576b9] [FILTER_BEFORE] /
DEBUG - 2026-03-24 09:56:45 --> [REQ_ID=cc3d6d0576b9] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-24 09:56:45 --> [REQ_ID=cc3d6d0576b9] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-24 09:56:45 --> [CSRF] token name=csrf_test_name hash=0b2651e6079653b614e54cd3ef49e1d7
DEBUG - 2026-03-24 09:56:45 --> [REQ_ID=b098a1f79fb8] [INIT] App\Controllers\Home::GET
INFO - 2026-03-24 09:56:45 --> [REQ_ID=b098a1f79fb8] [MEMORY][controller-start] 6291456
INFO - 2026-03-24 09:56:45 --> [REQ_ID=b098a1f79fb8] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-24 09:56:45 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-24 09:56:45 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-03-24 09:56:45 --> [REQ_ID=b098a1f79fb8] [VIEW_RENDER] themes/public/home
INFO - 2026-03-24 09:56:45 --> [REQ_ID=b098a1f79fb8] [MEMORY][commonData:start] 10485760
INFO - 2026-03-24 09:56:45 --> themesMemory usage: 10485760
DEBUG - 2026-03-24 09:56:45 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-24 09:56:45 --> [REQ_ID=cc3d6d0576b9] [FILTER_AFTER]
DEBUG - 2026-03-24 09:56:45 --> [REQ_ID=cc3d6d0576b9] [LIFECYCLE][END] status=200 duration_ms=560.83 memory_delta=4194304
INFO - 2026-03-24 09:56:45 --> [REQ_ID=b098a1f79fb8] [PERF] Execution time=0.558965
DEBUG - 2026-03-24 09:56:45 --> [REQ_ID=cc3d6d0576b9] [REQUEST][END]
INFO - 2026-03-24 09:56:45 --> [REQ_ID=cc3d6d0576b9] [PERF] Execution time=0.598523
DEBUG - 2026-03-24 09:56:46 --> [REQ_ID=a5f6c095f7c8] [REQUEST][START] GET /
DEBUG - 2026-03-24 09:56:46 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-24 09:56:46 --> [REQ_ID=a5f6c095f7c8] [FILTER_BEFORE] /
DEBUG - 2026-03-24 09:56:46 --> [REQ_ID=a5f6c095f7c8] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-24 09:56:46 --> [REQ_ID=a5f6c095f7c8] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-24 09:56:46 --> [CSRF] token name=csrf_test_name hash=0b2651e6079653b614e54cd3ef49e1d7
DEBUG - 2026-03-24 09:56:46 --> [REQ_ID=4f198339326c] [INIT] App\Controllers\Home::GET
INFO - 2026-03-24 09:56:46 --> [REQ_ID=4f198339326c] [MEMORY][controller-start] 4194304
INFO - 2026-03-24 09:56:46 --> [REQ_ID=4f198339326c] [MEMORY][commonData:start] 4194304
DEBUG - 2026-03-24 09:56:46 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-24 09:56:46 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
DEBUG - 2026-03-24 09:56:46 --> [REQ_ID=4f198339326c] [VIEW_RENDER] themes/public/home
INFO - 2026-03-24 09:56:46 --> [REQ_ID=4f198339326c] [MEMORY][commonData:start] 8388608
INFO - 2026-03-24 09:56:46 --> themesMemory usage: 8388608
DEBUG - 2026-03-24 09:56:46 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-24 09:56:46 --> [REQ_ID=a5f6c095f7c8] [FILTER_AFTER]
DEBUG - 2026-03-24 09:56:46 --> [REQ_ID=a5f6c095f7c8] [LIFECYCLE][END] status=200 duration_ms=480.98 memory_delta=4194304
INFO - 2026-03-24 09:56:46 --> [REQ_ID=4f198339326c] [PERF] Execution time=0.480563
DEBUG - 2026-03-24 09:56:46 --> [REQ_ID=a5f6c095f7c8] [REQUEST][END]
INFO - 2026-03-24 09:56:46 --> [REQ_ID=a5f6c095f7c8] [PERF] Execution time=0.494705
DEBUG - 2026-03-24 10:00:01 --> [REQ_ID=980da883a6ca] [REQUEST][START] GET /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-24 10:00:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-24 10:00:01 --> [REQ_ID=980da883a6ca] [FILTER_BEFORE] /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-24 10:00:01 --> [REQ_ID=980da883a6ca] [ROUTE] Controller=\App\Modules\Management\Controllers\ManagementAPIController Method=Run_CRON_Tasks
DEBUG - 2026-03-24 10:00:01 --> [REQ_ID=980da883a6ca] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-24 10:00:01 --> [REQ_ID=980da883a6ca] [REQUEST][END]
INFO - 2026-03-24 10:00:01 --> [REQ_ID=980da883a6ca] [PERF] Execution time=0.042556
DEBUG - 2026-03-24 10:01:22 --> [REQ_ID=4fae1f8a4e0a] [REQUEST][START] HEAD /
DEBUG - 2026-03-24 10:01:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-24 10:01:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-24 10:01:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-24 10:01:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-24 10:01:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-24 10:06:22 --> [REQ_ID=7b88be4fb68c] [REQUEST][START] HEAD /
DEBUG - 2026-03-24 10:06:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-24 10:06:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-24 10:06:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-24 10:06:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-24 10:06:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-24 10:15:02 --> [REQ_ID=c8636ec64395] [REQUEST][START] GET /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-24 10:15:02 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-24 10:15:02 --> [REQ_ID=c8636ec64395] [FILTER_BEFORE] /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-24 10:15:02 --> [REQ_ID=c8636ec64395] [ROUTE] Controller=\App\Modules\APIs\Controllers\AlertsAPIController Method=fetchEmailAlerts
DEBUG - 2026-03-24 10:15:02 --> [REQ_ID=c8636ec64395] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-24 10:15:02 --> [REQ_ID=c8636ec64395] [REQUEST][END]
INFO - 2026-03-24 10:15:02 --> [REQ_ID=c8636ec64395] [PERF] Execution time=0.046943
DEBUG - 2026-03-24 10:15:10 --> [REQ_ID=a2663f172ccd] [REQUEST][START] GET /
DEBUG - 2026-03-24 10:15:10 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-24 10:15:10 --> [REQ_ID=a2663f172ccd] [FILTER_BEFORE] /
DEBUG - 2026-03-24 10:15:10 --> [REQ_ID=a2663f172ccd] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-24 10:15:10 --> [REQ_ID=a2663f172ccd] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-24 10:15:10 --> [CSRF] token name=csrf_test_name hash=36c964bc9a0339e55275b459d3fb97ee
DEBUG - 2026-03-24 10:15:10 --> [REQ_ID=2099fcaf31b3] [INIT] App\Controllers\Home::GET
INFO - 2026-03-24 10:15:10 --> [REQ_ID=2099fcaf31b3] [MEMORY][controller-start] 4194304
INFO - 2026-03-24 10:15:10 --> [REQ_ID=2099fcaf31b3] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-24 10:15:10 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-24 10:15:11 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-03-24 10:15:11 --> [REQ_ID=2099fcaf31b3] [VIEW_RENDER] themes/public/home
INFO - 2026-03-24 10:15:11 --> [REQ_ID=2099fcaf31b3] [MEMORY][commonData:start] 8388608
INFO - 2026-03-24 10:15:11 --> themesMemory usage: 8388608
DEBUG - 2026-03-24 10:15:11 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-24 10:15:11 --> [REQ_ID=a2663f172ccd] [FILTER_AFTER]
DEBUG - 2026-03-24 10:15:11 --> [REQ_ID=a2663f172ccd] [LIFECYCLE][END] status=200 duration_ms=685.54 memory_delta=4194304
INFO - 2026-03-24 10:15:11 --> [REQ_ID=2099fcaf31b3] [PERF] Execution time=0.684022
DEBUG - 2026-03-24 10:15:11 --> [REQ_ID=a2663f172ccd] [REQUEST][END]
INFO - 2026-03-24 10:15:11 --> [REQ_ID=a2663f172ccd] [PERF] Execution time=0.696449
DEBUG - 2026-03-24 10:21:22 --> [REQ_ID=21587b47fdc7] [REQUEST][START] HEAD /
DEBUG - 2026-03-24 10:21:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-24 10:21:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-24 10:21:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-24 10:21:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-24 10:21:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-24 10:26:07 --> [REQ_ID=43c2adb923c0] [REQUEST][START] GET /index.php/Assets
DEBUG - 2026-03-24 10:26:07 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-24 10:26:07 --> [REQ_ID=43c2adb923c0] [FILTER_BEFORE] /index.php/Assets
DEBUG - 2026-03-24 10:26:07 --> [REQ_ID=43c2adb923c0] [ROUTE] Controller=\App\Modules\Management\Controllers\AssetsController Method=index
DEBUG - 2026-03-24 10:26:07 --> [REQ_ID=43c2adb923c0] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Assets
DEBUG - 2026-03-24 10:26:07 --> [CSRF] token name=csrf_test_name hash=41a53c4da985e7f83d092d17451a683a
DEBUG - 2026-03-24 10:26:07 --> [REQ_ID=43c2adb923c0] [REQUEST][END]
INFO - 2026-03-24 10:26:07 --> [REQ_ID=43c2adb923c0] [PERF] Execution time=0.050561
DEBUG - 2026-03-24 10:26:07 --> [REQ_ID=265ffad56785] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-24 10:26:07 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-24 10:26:07 --> [REQ_ID=265ffad56785] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-24 10:26:07 --> [REQ_ID=265ffad56785] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-24 10:26:07 --> [REQ_ID=265ffad56785] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-24 10:26:07 --> [CSRF] token name=csrf_test_name hash=b667ce9bda824e2d5fe29b9b1e3f2574
DEBUG - 2026-03-24 10:26:07 --> [REQ_ID=a3caae5bfad3] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-24 10:26:07 --> [REQ_ID=a3caae5bfad3] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-24 10:26:07 --> [REQ_ID=265ffad56785] [FILTER_AFTER]
DEBUG - 2026-03-24 10:26:07 --> [REQ_ID=265ffad56785] [LIFECYCLE][END] status=200 duration_ms=106.13 memory_delta=0
INFO - 2026-03-24 10:26:07 --> [REQ_ID=a3caae5bfad3] [PERF] Execution time=0.106073
DEBUG - 2026-03-24 10:26:07 --> [REQ_ID=265ffad56785] [REQUEST][END]
INFO - 2026-03-24 10:26:07 --> [REQ_ID=265ffad56785] [PERF] Execution time=0.121779
DEBUG - 2026-03-24 10:41:22 --> [REQ_ID=166e9efdb90e] [REQUEST][START] HEAD /
DEBUG - 2026-03-24 10:41:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-24 10:41:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-24 10:41:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-24 10:41:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-24 10:41:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-24 10:46:22 --> [REQ_ID=fcf4add84488] [REQUEST][START] HEAD /
DEBUG - 2026-03-24 10:46:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-24 10:46:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-24 10:46:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-24 10:46:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-24 10:46:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-24 10:47:25 --> [REQ_ID=580ef30096db] [REQUEST][START] GET /index.php/Customer-Support
DEBUG - 2026-03-24 10:47:25 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-24 10:47:25 --> [REQ_ID=580ef30096db] [FILTER_BEFORE] /index.php/Customer-Support
DEBUG - 2026-03-24 10:47:25 --> [REQ_ID=580ef30096db] [ROUTE] Controller=\App\Controllers\App\Modules\Support\Controllers\SupportController Method=index
DEBUG - 2026-03-24 10:47:25 --> [REQ_ID=580ef30096db] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Customer-Support
DEBUG - 2026-03-24 10:47:25 --> [CSRF] token name=csrf_test_name hash=6cc2d351a296d7145e17c5648c04bccb
DEBUG - 2026-03-24 10:47:25 --> [REQ_ID=580ef30096db] [REQUEST][END]
INFO - 2026-03-24 10:47:25 --> [REQ_ID=580ef30096db] [PERF] Execution time=0.035485
DEBUG - 2026-03-24 10:47:25 --> [REQ_ID=1263ed079dce] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-24 10:47:25 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-24 10:47:25 --> [REQ_ID=1263ed079dce] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-24 10:47:25 --> [REQ_ID=1263ed079dce] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-24 10:47:25 --> [REQ_ID=1263ed079dce] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-24 10:47:25 --> [CSRF] token name=csrf_test_name hash=f6c2daac1242e57fbfed0188616d6209
DEBUG - 2026-03-24 10:47:25 --> [REQ_ID=041f53266557] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-24 10:47:25 --> [REQ_ID=041f53266557] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-24 10:47:25 --> [REQ_ID=1263ed079dce] [FILTER_AFTER]
DEBUG - 2026-03-24 10:47:25 --> [REQ_ID=1263ed079dce] [LIFECYCLE][END] status=200 duration_ms=54.08 memory_delta=0
INFO - 2026-03-24 10:47:25 --> [REQ_ID=041f53266557] [PERF] Execution time=0.053903
DEBUG - 2026-03-24 10:47:25 --> [REQ_ID=1263ed079dce] [REQUEST][END]
INFO - 2026-03-24 10:47:25 --> [REQ_ID=1263ed079dce] [PERF] Execution time=0.072977
DEBUG - 2026-03-24 10:47:26 --> [REQ_ID=28f8726701e0] [REQUEST][START] GET /index.php/register
DEBUG - 2026-03-24 10:47:26 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-24 10:47:26 --> [REQ_ID=28f8726701e0] [FILTER_BEFORE] /index.php/register
DEBUG - 2026-03-24 10:47:26 --> [REQ_ID=28f8726701e0] [ROUTE] Controller=\App\Controllers\AuthController Method=register
DEBUG - 2026-03-24 10:47:26 --> [REQ_ID=28f8726701e0] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/register
DEBUG - 2026-03-24 10:47:26 --> [CSRF] token name=csrf_test_name hash=2a9ba85194f8e9f6c658abf860944365
DEBUG - 2026-03-24 10:47:26 --> [REQ_ID=e0dc9dd312c5] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-24 10:47:26 --> [REQ_ID=e0dc9dd312c5] [MEMORY][controller-start] 4194304
INFO - 2026-03-24 10:47:26 --> [REGISTRATION] Form loaded
INFO - 2026-03-24 10:47:26 --> [REQ_ID=e0dc9dd312c5] [PERF] Execution time=0.016001
DEBUG - 2026-03-24 10:47:26 --> [REQ_ID=d692e8866d86] [REQUEST][START] GET /index.php/How-It-Works/MyMI-Wallets
DEBUG - 2026-03-24 10:47:26 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-24 10:47:26 --> [REQ_ID=d692e8866d86] [FILTER_BEFORE] /index.php/How-It-Works/MyMI-Wallets
DEBUG - 2026-03-24 10:47:26 --> [REQ_ID=d692e8866d86] [ROUTE] Controller=\App\Modules\Blog\Controllers\HowItWorksController Method=show
DEBUG - 2026-03-24 10:47:26 --> [REQ_ID=d692e8866d86] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/How-It-Works/MyMI-Wallets
DEBUG - 2026-03-24 10:47:26 --> [CSRF] token name=csrf_test_name hash=e1277961ce5bb942595b8293d5c56e70
DEBUG - 2026-03-24 10:47:26 --> [REQ_ID=d8af605b42d8] [INIT] App\Modules\Blog\Controllers\HowItWorksController::GET
INFO - 2026-03-24 10:47:26 --> [REQ_ID=d8af605b42d8] [MEMORY][controller-start] 6291456
DEBUG - 2026-03-24 10:47:26 --> [REQ_ID=d8af605b42d8] [METHOD_ENTRY] show
DEBUG - 2026-03-24 10:47:26 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-24 10:47:26 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-24 10:47:26 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-24 10:47:26 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-24 10:47:26 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-24 10:47:26 --> MyMICoin: guest context detected; skipping user-specific preload.
ERROR - 2026-03-24 10:47:26 --> HowItWorksController failure: mymi-wallets
CRITICAL - 2026-03-24 10:47:26 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: GET, Route: How-It-Works/MyMI-Wallets]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-24 10:47:26 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-24 10:47:26 --> [404] URI=https://www.mymiwallet.com/index.php/How-It-Works/MyMI-Wallets
WARNING - 2026-03-24 10:47:26 --> 404 route miss: https://www.mymiwallet.com/index.php/How-It-Works/MyMI-Wallets | referrer: none
ERROR - 2026-03-24 10:47:26 --> [ERROR_PAGE] event=error_404 status=404 message=Page not found.
INFO - 2026-03-24 10:47:26 --> [REQ_ID=d8af605b42d8] [PERF] Execution time=0.095828
DEBUG - 2026-03-24 10:48:10 --> [REQ_ID=86886f523090] [REQUEST][START] GET /index.php/How-It-Works/Determining-Your-Financial-Goals
DEBUG - 2026-03-24 10:48:10 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-24 10:48:10 --> [REQ_ID=86886f523090] [FILTER_BEFORE] /index.php/How-It-Works/Determining-Your-Financial-Goals
DEBUG - 2026-03-24 10:48:10 --> [REQ_ID=86886f523090] [ROUTE] Controller=\App\Modules\Blog\Controllers\HowItWorksController Method=show
DEBUG - 2026-03-24 10:48:10 --> [REQ_ID=86886f523090] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/How-It-Works/Determining-Your-Financial-Goals
DEBUG - 2026-03-24 10:48:10 --> [CSRF] token name=csrf_test_name hash=a5218b6d3b2b598706874401fc1cfc7c
DEBUG - 2026-03-24 10:48:10 --> [REQ_ID=4836578bb117] [INIT] App\Modules\Blog\Controllers\HowItWorksController::GET
INFO - 2026-03-24 10:48:10 --> [REQ_ID=4836578bb117] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-24 10:48:10 --> [REQ_ID=4836578bb117] [METHOD_ENTRY] show
DEBUG - 2026-03-24 10:48:10 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-24 10:48:10 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-24 10:48:10 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-24 10:48:10 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-24 10:48:10 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-24 10:48:10 --> MyMICoin: guest context detected; skipping user-specific preload.
INFO - 2026-03-24 10:48:10 --> [REQ_ID=4836578bb117] [MEMORY][commonData:start] 4194304
DEBUG - 2026-03-24 10:48:11 --> [REQ_ID=86886f523090] [FILTER_AFTER]
DEBUG - 2026-03-24 10:48:11 --> [REQ_ID=86886f523090] [LIFECYCLE][END] status=200 duration_ms=722.50 memory_delta=4194304
INFO - 2026-03-24 10:48:11 --> [REQ_ID=4836578bb117] [PERF] Execution time=0.722449
DEBUG - 2026-03-24 10:48:11 --> [REQ_ID=86886f523090] [REQUEST][END]
INFO - 2026-03-24 10:48:11 --> [REQ_ID=86886f523090] [PERF] Execution time=0.739058
DEBUG - 2026-03-24 10:51:22 --> [REQ_ID=4d461ef71c34] [REQUEST][START] HEAD /
DEBUG - 2026-03-24 10:51:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-24 10:51:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-24 10:51:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-24 10:51:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-24 10:51:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-24 11:00:01 --> [REQ_ID=3b767eaec8fb] [REQUEST][START] GET /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-24 11:00:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-24 11:00:01 --> [REQ_ID=3b767eaec8fb] [FILTER_BEFORE] /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-24 11:00:01 --> [REQ_ID=3b767eaec8fb] [ROUTE] Controller=\App\Modules\Management\Controllers\ManagementAPIController Method=Run_CRON_Tasks
DEBUG - 2026-03-24 11:00:01 --> [REQ_ID=3b767eaec8fb] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-24 11:00:01 --> [REQ_ID=3b767eaec8fb] [REQUEST][END]
INFO - 2026-03-24 11:00:01 --> [REQ_ID=3b767eaec8fb] [PERF] Execution time=0.036626
DEBUG - 2026-03-24 11:01:22 --> [REQ_ID=cf5111d5c21a] [REQUEST][START] HEAD /
DEBUG - 2026-03-24 11:01:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-24 11:01:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-24 11:01:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-24 11:01:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-24 11:01:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-24 11:06:22 --> [REQ_ID=759b95a3b417] [REQUEST][START] HEAD /
DEBUG - 2026-03-24 11:06:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-24 11:06:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-24 11:06:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-24 11:06:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-24 11:06:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-24 11:15:01 --> [REQ_ID=b7713a1037a4] [REQUEST][START] GET /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-24 11:15:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-24 11:15:01 --> [REQ_ID=b7713a1037a4] [FILTER_BEFORE] /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-24 11:15:01 --> [REQ_ID=b7713a1037a4] [ROUTE] Controller=\App\Modules\APIs\Controllers\AlertsAPIController Method=fetchEmailAlerts
DEBUG - 2026-03-24 11:15:01 --> [REQ_ID=b7713a1037a4] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-24 11:15:01 --> [REQ_ID=b7713a1037a4] [REQUEST][END]
INFO - 2026-03-24 11:15:01 --> [REQ_ID=b7713a1037a4] [PERF] Execution time=0.046927
DEBUG - 2026-03-24 11:15:15 --> [REQ_ID=fda5aa2a4822] [REQUEST][START] GET /index.php/Free/register
DEBUG - 2026-03-24 11:15:15 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-24 11:15:15 --> [REQ_ID=fda5aa2a4822] [FILTER_BEFORE] /index.php/Free/register
DEBUG - 2026-03-24 11:15:15 --> [REQ_ID=fda5aa2a4822] [ROUTE] Controller=\App\Controllers\AuthController Method=register
DEBUG - 2026-03-24 11:15:15 --> [REQ_ID=fda5aa2a4822] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Free/register
DEBUG - 2026-03-24 11:15:15 --> [CSRF] token name=csrf_test_name hash=89153bed4f747b0a4e0e976d556c7c9e
DEBUG - 2026-03-24 11:15:15 --> [REQ_ID=260e2e6ba99d] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-24 11:15:15 --> [REQ_ID=260e2e6ba99d] [MEMORY][controller-start] 4194304
INFO - 2026-03-24 11:15:16 --> [REGISTRATION] Form loaded
INFO - 2026-03-24 11:15:16 --> [REQ_ID=260e2e6ba99d] [PERF] Execution time=0.073098
DEBUG - 2026-03-24 11:15:29 --> [REQ_ID=defc83b325fa] [REQUEST][START] GET /index.php/How-It-Works/Purchase-MyMI-Gold
DEBUG - 2026-03-24 11:15:29 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-24 11:15:29 --> [REQ_ID=defc83b325fa] [FILTER_BEFORE] /index.php/How-It-Works/Purchase-MyMI-Gold
DEBUG - 2026-03-24 11:15:29 --> [REQ_ID=defc83b325fa] [ROUTE] Controller=\App\Modules\Blog\Controllers\HowItWorksController Method=PurchaseMyMIGold
DEBUG - 2026-03-24 11:15:29 --> [REQ_ID=defc83b325fa] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/How-It-Works/Purchase-MyMI-Gold
DEBUG - 2026-03-24 11:15:29 --> [CSRF] token name=csrf_test_name hash=de5c503984e300ff7868ac244f3525db
DEBUG - 2026-03-24 11:15:29 --> [REQ_ID=38ee77b4f1de] [INIT] App\Modules\Blog\Controllers\HowItWorksController::GET
INFO - 2026-03-24 11:15:29 --> [REQ_ID=38ee77b4f1de] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-24 11:15:29 --> [REQ_ID=38ee77b4f1de] [METHOD_ENTRY] PurchaseMyMIGold
DEBUG - 2026-03-24 11:15:29 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-24 11:15:29 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-24 11:15:29 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-24 11:15:29 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-24 11:15:29 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-24 11:15:29 --> MyMICoin: guest context detected; skipping user-specific preload.
INFO - 2026-03-24 11:15:29 --> [REQ_ID=38ee77b4f1de] [MEMORY][commonData:start] 6291456
INFO - 2026-03-24 11:15:30 --> themesMemory usage: 8388608
DEBUG - 2026-03-24 11:15:30 --> [MetaService] slug=how-it-works/purchase-mymi-gold pageName= cacheHit= path=DB
DEBUG - 2026-03-24 11:15:30 --> [REQ_ID=defc83b325fa] [FILTER_AFTER]
DEBUG - 2026-03-24 11:15:30 --> [REQ_ID=defc83b325fa] [LIFECYCLE][END] status=200 duration_ms=889.51 memory_delta=4194304
INFO - 2026-03-24 11:15:30 --> [REQ_ID=38ee77b4f1de] [PERF] Execution time=0.889439
DEBUG - 2026-03-24 11:15:30 --> [REQ_ID=defc83b325fa] [REQUEST][END]
INFO - 2026-03-24 11:15:30 --> [REQ_ID=defc83b325fa] [PERF] Execution time=0.903472
DEBUG - 2026-03-24 11:15:30 --> [REQ_ID=53ed5b7db10c] [REQUEST][START] GET /index.php/Premium-Features/Wallets
DEBUG - 2026-03-24 11:15:30 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
INFO - 2026-03-24 11:15:30 --> REDIRECTED ROUTE at https://www.mymiwallet.com/Wallets/Manager
DEBUG - 2026-03-24 11:15:30 --> [REQ_ID=53ed5b7db10c] [REQUEST][END]
INFO - 2026-03-24 11:15:30 --> [REQ_ID=53ed5b7db10c] [PERF] Execution time=0.009317
DEBUG - 2026-03-24 11:26:22 --> [REQ_ID=2b474fb82dc4] [REQUEST][START] HEAD /
DEBUG - 2026-03-24 11:26:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-24 11:26:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-24 11:26:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-24 11:26:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-24 11:26:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-24 11:31:36 --> [REQ_ID=53cc33ef96eb] [REQUEST][START] GET /index.php/Premium-Features/Wallets
DEBUG - 2026-03-24 11:31:36 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
INFO - 2026-03-24 11:31:36 --> REDIRECTED ROUTE at https://www.mymiwallet.com/Wallets/Manager
DEBUG - 2026-03-24 11:31:36 --> [REQ_ID=53cc33ef96eb] [REQUEST][END]
INFO - 2026-03-24 11:31:36 --> [REQ_ID=53cc33ef96eb] [PERF] Execution time=0.038260
DEBUG - 2026-03-24 11:36:22 --> [REQ_ID=3127bc5a2d75] [REQUEST][START] HEAD /
DEBUG - 2026-03-24 11:36:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-24 11:36:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-24 11:36:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-24 11:36:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-24 11:36:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-24 11:51:32 --> [REQ_ID=73b0937de02a] [REQUEST][START] GET /index.php/Account/Billing
DEBUG - 2026-03-24 11:51:32 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-24 11:51:32 --> [REQ_ID=73b0937de02a] [FILTER_BEFORE] /index.php/Account/Billing
DEBUG - 2026-03-24 11:51:32 --> [REQ_ID=73b0937de02a] [ROUTE] Controller=\App\Modules\User\Controllers\DashboardController Method=billing
DEBUG - 2026-03-24 11:51:32 --> [REQ_ID=73b0937de02a] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Account/Billing
DEBUG - 2026-03-24 11:51:32 --> [CSRF] token name=csrf_test_name hash=c77c237156f5cecbd56dbc8c2f10d523
DEBUG - 2026-03-24 11:51:32 --> [REQ_ID=73b0937de02a] [REQUEST][END]
INFO - 2026-03-24 11:51:32 --> [REQ_ID=73b0937de02a] [PERF] Execution time=0.068756
DEBUG - 2026-03-24 11:51:32 --> [REQ_ID=a287c45a4e74] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-24 11:51:32 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-24 11:51:32 --> [REQ_ID=a287c45a4e74] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-24 11:51:32 --> [REQ_ID=a287c45a4e74] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-24 11:51:32 --> [REQ_ID=a287c45a4e74] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-24 11:51:32 --> [CSRF] token name=csrf_test_name hash=2fb8a722bf9fa9cc1764d44b8ad2f850
DEBUG - 2026-03-24 11:51:32 --> [REQ_ID=1186cfff1e26] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-24 11:51:32 --> [REQ_ID=1186cfff1e26] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-24 11:51:32 --> [REQ_ID=a287c45a4e74] [FILTER_AFTER]
DEBUG - 2026-03-24 11:51:32 --> [REQ_ID=a287c45a4e74] [LIFECYCLE][END] status=200 duration_ms=60.57 memory_delta=0
INFO - 2026-03-24 11:51:32 --> [REQ_ID=1186cfff1e26] [PERF] Execution time=0.060317
DEBUG - 2026-03-24 11:51:32 --> [REQ_ID=a287c45a4e74] [REQUEST][END]
INFO - 2026-03-24 11:51:32 --> [REQ_ID=a287c45a4e74] [PERF] Execution time=0.075386
DEBUG - 2026-03-24 11:52:29 --> [REQ_ID=d47fea389bdc] [REQUEST][START] GET /index.php/How-It-Works/Daily-Financial-News
DEBUG - 2026-03-24 11:52:29 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-24 11:52:29 --> [REQ_ID=d47fea389bdc] [FILTER_BEFORE] /index.php/How-It-Works/Daily-Financial-News
DEBUG - 2026-03-24 11:52:29 --> [REQ_ID=d47fea389bdc] [ROUTE] Controller=\App\Modules\Blog\Controllers\HowItWorksController Method=DailyFinancialNews
DEBUG - 2026-03-24 11:52:29 --> [REQ_ID=d47fea389bdc] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/How-It-Works/Daily-Financial-News
DEBUG - 2026-03-24 11:52:29 --> [CSRF] token name=csrf_test_name hash=bdd044d13490328a80166f074c5e5afe
DEBUG - 2026-03-24 11:52:29 --> [REQ_ID=6f4fea855e21] [INIT] App\Modules\Blog\Controllers\HowItWorksController::GET
INFO - 2026-03-24 11:52:29 --> [REQ_ID=6f4fea855e21] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-24 11:52:29 --> [REQ_ID=6f4fea855e21] [METHOD_ENTRY] DailyFinancialNews
DEBUG - 2026-03-24 11:52:29 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-24 11:52:29 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-24 11:52:29 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-24 11:52:29 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-24 11:52:29 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-24 11:52:29 --> MyMICoin: guest context detected; skipping user-specific preload.
INFO - 2026-03-24 11:52:29 --> [REQ_ID=6f4fea855e21] [MEMORY][commonData:start] 6291456
INFO - 2026-03-24 11:52:30 --> themesMemory usage: 8388608
DEBUG - 2026-03-24 11:52:30 --> [MetaService] slug=how-it-works/daily-financial-news pageName= cacheHit= path=DB
DEBUG - 2026-03-24 11:52:30 --> [REQ_ID=d47fea389bdc] [FILTER_AFTER]
DEBUG - 2026-03-24 11:52:30 --> [REQ_ID=d47fea389bdc] [LIFECYCLE][END] status=200 duration_ms=694.11 memory_delta=4194304
INFO - 2026-03-24 11:52:30 --> [REQ_ID=6f4fea855e21] [PERF] Execution time=0.693781
DEBUG - 2026-03-24 11:52:30 --> [REQ_ID=d47fea389bdc] [REQUEST][END]
INFO - 2026-03-24 11:52:30 --> [REQ_ID=d47fea389bdc] [PERF] Execution time=0.711774
DEBUG - 2026-03-24 12:00:01 --> [REQ_ID=a9b41170e825] [REQUEST][START] GET /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-24 12:00:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-24 12:00:01 --> [REQ_ID=a9b41170e825] [FILTER_BEFORE] /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-24 12:00:01 --> [REQ_ID=a9b41170e825] [ROUTE] Controller=\App\Modules\Management\Controllers\ManagementAPIController Method=Run_CRON_Tasks
DEBUG - 2026-03-24 12:00:01 --> [REQ_ID=a9b41170e825] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-24 12:00:01 --> [REQ_ID=a9b41170e825] [REQUEST][END]
INFO - 2026-03-24 12:00:01 --> [REQ_ID=a9b41170e825] [PERF] Execution time=0.048746
DEBUG - 2026-03-24 12:01:22 --> [REQ_ID=6e726a510c4f] [REQUEST][START] HEAD /
DEBUG - 2026-03-24 12:01:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-24 12:01:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-24 12:01:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-24 12:01:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-24 12:01:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-24 12:15:01 --> [REQ_ID=51a860b44778] [REQUEST][START] GET /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-24 12:15:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-24 12:15:01 --> [REQ_ID=51a860b44778] [FILTER_BEFORE] /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-24 12:15:01 --> [REQ_ID=51a860b44778] [ROUTE] Controller=\App\Modules\APIs\Controllers\AlertsAPIController Method=fetchEmailAlerts
DEBUG - 2026-03-24 12:15:01 --> [REQ_ID=51a860b44778] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-24 12:15:01 --> [REQ_ID=51a860b44778] [REQUEST][END]
INFO - 2026-03-24 12:15:01 --> [REQ_ID=51a860b44778] [PERF] Execution time=0.045848
DEBUG - 2026-03-24 12:16:22 --> [REQ_ID=480c215fc84c] [REQUEST][START] HEAD /
DEBUG - 2026-03-24 12:16:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-24 12:16:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-24 12:16:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-24 12:16:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-24 12:16:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-24 12:19:26 --> [REQ_ID=dff988de5988] [REQUEST][START] GET /
DEBUG - 2026-03-24 12:19:26 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-24 12:19:26 --> [REQ_ID=dff988de5988] [FILTER_BEFORE] /
DEBUG - 2026-03-24 12:19:26 --> [REQ_ID=dff988de5988] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-24 12:19:26 --> [REQ_ID=dff988de5988] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-24 12:19:26 --> [CSRF] token name=csrf_test_name hash=34d7884691126c457769e2544019a44f
DEBUG - 2026-03-24 12:19:26 --> [REQ_ID=275ca72f4bab] [INIT] App\Controllers\Home::GET
INFO - 2026-03-24 12:19:26 --> [REQ_ID=275ca72f4bab] [MEMORY][controller-start] 6291456
INFO - 2026-03-24 12:19:27 --> [REQ_ID=275ca72f4bab] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-24 12:19:27 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-24 12:19:27 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-03-24 12:19:27 --> [REQ_ID=275ca72f4bab] [VIEW_RENDER] themes/public/home
INFO - 2026-03-24 12:19:27 --> [REQ_ID=275ca72f4bab] [MEMORY][commonData:start] 10485760
INFO - 2026-03-24 12:19:27 --> themesMemory usage: 10485760
DEBUG - 2026-03-24 12:19:27 --> [MetaService] slug= pageName=Home cacheHit= path=DB
DEBUG - 2026-03-24 12:19:27 --> [REQ_ID=dff988de5988] [FILTER_AFTER]
DEBUG - 2026-03-24 12:19:27 --> [REQ_ID=dff988de5988] [LIFECYCLE][END] status=200 duration_ms=795.70 memory_delta=4194304
INFO - 2026-03-24 12:19:27 --> [REQ_ID=275ca72f4bab] [PERF] Execution time=0.793952
DEBUG - 2026-03-24 12:19:27 --> [REQ_ID=dff988de5988] [REQUEST][END]
INFO - 2026-03-24 12:19:27 --> [REQ_ID=dff988de5988] [PERF] Execution time=0.835798
DEBUG - 2026-03-24 12:21:22 --> [REQ_ID=2f68b6d18ffb] [REQUEST][START] HEAD /
DEBUG - 2026-03-24 12:21:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-24 12:21:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-24 12:21:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-24 12:21:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-24 12:21:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-24 12:21:33 --> [REQ_ID=cda44b427436] [REQUEST][START] GET /
DEBUG - 2026-03-24 12:21:33 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-24 12:21:33 --> [REQ_ID=cda44b427436] [FILTER_BEFORE] /
DEBUG - 2026-03-24 12:21:33 --> [REQ_ID=cda44b427436] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-24 12:21:33 --> [REQ_ID=cda44b427436] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-24 12:21:33 --> [CSRF] token name=csrf_test_name hash=a6a3851f5ce43ac73278cde7926f75aa
DEBUG - 2026-03-24 12:21:33 --> [REQ_ID=21b3a67a1fa1] [INIT] App\Controllers\Home::GET
INFO - 2026-03-24 12:21:33 --> [REQ_ID=21b3a67a1fa1] [MEMORY][controller-start] 4194304
INFO - 2026-03-24 12:21:34 --> [REQ_ID=21b3a67a1fa1] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-24 12:21:34 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-24 12:21:34 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
DEBUG - 2026-03-24 12:21:34 --> [REQ_ID=21b3a67a1fa1] [VIEW_RENDER] themes/public/home
INFO - 2026-03-24 12:21:34 --> [REQ_ID=21b3a67a1fa1] [MEMORY][commonData:start] 8388608
INFO - 2026-03-24 12:21:34 --> themesMemory usage: 8388608
DEBUG - 2026-03-24 12:21:34 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-24 12:21:34 --> [REQ_ID=cda44b427436] [FILTER_AFTER]
DEBUG - 2026-03-24 12:21:34 --> [REQ_ID=cda44b427436] [LIFECYCLE][END] status=200 duration_ms=707.48 memory_delta=4194304
INFO - 2026-03-24 12:21:34 --> [REQ_ID=21b3a67a1fa1] [PERF] Execution time=0.705608
DEBUG - 2026-03-24 12:21:34 --> [REQ_ID=cda44b427436] [REQUEST][END]
INFO - 2026-03-24 12:21:34 --> [REQ_ID=cda44b427436] [PERF] Execution time=0.725487
DEBUG - 2026-03-24 12:21:35 --> [REQ_ID=7b9c234604a7] [REQUEST][START] GET /
DEBUG - 2026-03-24 12:21:35 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-24 12:21:35 --> [REQ_ID=7b9c234604a7] [FILTER_BEFORE] /
DEBUG - 2026-03-24 12:21:35 --> [REQ_ID=7b9c234604a7] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-24 12:21:35 --> [REQ_ID=7b9c234604a7] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-24 12:21:35 --> [CSRF] token name=csrf_test_name hash=a6a3851f5ce43ac73278cde7926f75aa
DEBUG - 2026-03-24 12:21:35 --> [REQ_ID=ac2a29f09080] [INIT] App\Controllers\Home::GET
INFO - 2026-03-24 12:21:35 --> [REQ_ID=ac2a29f09080] [MEMORY][controller-start] 6291456
INFO - 2026-03-24 12:21:35 --> [REQ_ID=ac2a29f09080] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-24 12:21:35 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-24 12:21:35 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
DEBUG - 2026-03-24 12:21:35 --> [REQ_ID=ac2a29f09080] [VIEW_RENDER] themes/public/home
INFO - 2026-03-24 12:21:35 --> [REQ_ID=ac2a29f09080] [MEMORY][commonData:start] 8388608
INFO - 2026-03-24 12:21:35 --> themesMemory usage: 8388608
DEBUG - 2026-03-24 12:21:35 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-24 12:21:35 --> [REQ_ID=7b9c234604a7] [FILTER_AFTER]
DEBUG - 2026-03-24 12:21:35 --> [REQ_ID=7b9c234604a7] [LIFECYCLE][END] status=200 duration_ms=498.04 memory_delta=2097152
INFO - 2026-03-24 12:21:35 --> [REQ_ID=ac2a29f09080] [PERF] Execution time=0.497779
DEBUG - 2026-03-24 12:21:35 --> [REQ_ID=7b9c234604a7] [REQUEST][END]
INFO - 2026-03-24 12:21:35 --> [REQ_ID=7b9c234604a7] [PERF] Execution time=0.506362
DEBUG - 2026-03-24 12:21:36 --> [REQ_ID=e1cf150dbb9b] [REQUEST][START] GET /index.php
DEBUG - 2026-03-24 12:21:36 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-24 12:21:36 --> [REQ_ID=e1cf150dbb9b] [FILTER_BEFORE] /index.php
DEBUG - 2026-03-24 12:21:36 --> [REQ_ID=e1cf150dbb9b] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-24 12:21:36 --> [REQ_ID=e1cf150dbb9b] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-24 12:21:36 --> [CSRF] token name=csrf_test_name hash=a6a3851f5ce43ac73278cde7926f75aa
DEBUG - 2026-03-24 12:21:36 --> [REQ_ID=774f2ce8e9e0] [INIT] App\Controllers\Home::GET
INFO - 2026-03-24 12:21:36 --> [REQ_ID=774f2ce8e9e0] [MEMORY][controller-start] 6291456
INFO - 2026-03-24 12:21:36 --> [REQ_ID=774f2ce8e9e0] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-24 12:21:36 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-24 12:21:36 --> [REQ_ID=3e0e9dce9080] [REQUEST][START] GET /index.php/
DEBUG - 2026-03-24 12:21:36 --> [REQ_ID=a5ef6ef55a1f] [REQUEST][START] GET /index.php/How-It-Works
DEBUG - 2026-03-24 12:21:36 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
DEBUG - 2026-03-24 12:21:36 --> [REQ_ID=774f2ce8e9e0] [VIEW_RENDER] themes/public/home
INFO - 2026-03-24 12:21:36 --> [REQ_ID=774f2ce8e9e0] [MEMORY][commonData:start] 8388608
INFO - 2026-03-24 12:21:36 --> themesMemory usage: 8388608
DEBUG - 2026-03-24 12:21:36 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-24 12:21:36 --> [REQ_ID=e1cf150dbb9b] [FILTER_AFTER]
DEBUG - 2026-03-24 12:21:36 --> [REQ_ID=e1cf150dbb9b] [LIFECYCLE][END] status=200 duration_ms=489.94 memory_delta=2097152
INFO - 2026-03-24 12:21:36 --> [REQ_ID=774f2ce8e9e0] [PERF] Execution time=0.489616
DEBUG - 2026-03-24 12:21:36 --> [REQ_ID=e1cf150dbb9b] [REQUEST][END]
INFO - 2026-03-24 12:21:36 --> [REQ_ID=e1cf150dbb9b] [PERF] Execution time=0.513146
DEBUG - 2026-03-24 12:21:36 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-24 12:21:36 --> [REQ_ID=3e0e9dce9080] [FILTER_BEFORE] /index.php/
DEBUG - 2026-03-24 12:21:36 --> [REQ_ID=3e0e9dce9080] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-24 12:21:36 --> [REQ_ID=3e0e9dce9080] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-24 12:21:36 --> [CSRF] token name=csrf_test_name hash=a6a3851f5ce43ac73278cde7926f75aa
DEBUG - 2026-03-24 12:21:36 --> [REQ_ID=d68701c2fee0] [INIT] App\Controllers\Home::GET
INFO - 2026-03-24 12:21:36 --> [REQ_ID=d68701c2fee0] [MEMORY][controller-start] 6291456
INFO - 2026-03-24 12:21:36 --> [REQ_ID=d68701c2fee0] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-24 12:21:36 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-24 12:21:37 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
DEBUG - 2026-03-24 12:21:37 --> [REQ_ID=d68701c2fee0] [VIEW_RENDER] themes/public/home
INFO - 2026-03-24 12:21:37 --> [REQ_ID=d68701c2fee0] [MEMORY][commonData:start] 10485760
INFO - 2026-03-24 12:21:37 --> themesMemory usage: 10485760
DEBUG - 2026-03-24 12:21:37 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-24 12:21:37 --> [REQ_ID=3e0e9dce9080] [FILTER_AFTER]
DEBUG - 2026-03-24 12:21:37 --> [REQ_ID=3e0e9dce9080] [LIFECYCLE][END] status=200 duration_ms=545.30 memory_delta=4194304
INFO - 2026-03-24 12:21:37 --> [REQ_ID=d68701c2fee0] [PERF] Execution time=0.543422
DEBUG - 2026-03-24 12:21:37 --> [REQ_ID=3e0e9dce9080] [REQUEST][END]
INFO - 2026-03-24 12:21:37 --> [REQ_ID=3e0e9dce9080] [PERF] Execution time=0.973704
DEBUG - 2026-03-24 12:21:37 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-24 12:21:37 --> [REQ_ID=a5ef6ef55a1f] [FILTER_BEFORE] /index.php/How-It-Works
DEBUG - 2026-03-24 12:21:37 --> [REQ_ID=a5ef6ef55a1f] [ROUTE] Controller=\App\Modules\Blog\Controllers\HowItWorksController Method=index
DEBUG - 2026-03-24 12:21:37 --> [REQ_ID=a5ef6ef55a1f] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/How-It-Works
DEBUG - 2026-03-24 12:21:37 --> [CSRF] token name=csrf_test_name hash=a6a3851f5ce43ac73278cde7926f75aa
DEBUG - 2026-03-24 12:21:37 --> [REQ_ID=e720db7bb70a] [INIT] App\Modules\Blog\Controllers\HowItWorksController::GET
INFO - 2026-03-24 12:21:37 --> [REQ_ID=e720db7bb70a] [MEMORY][controller-start] 6291456
DEBUG - 2026-03-24 12:21:37 --> [REQ_ID=e720db7bb70a] [METHOD_ENTRY] index
DEBUG - 2026-03-24 12:21:37 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-24 12:21:37 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-24 12:21:37 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-24 12:21:37 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-24 12:21:37 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-24 12:21:37 --> MyMICoin: guest context detected; skipping user-specific preload.
ERROR - 2026-03-24 12:21:37 --> HowItWorksController failure: overview
CRITICAL - 2026-03-24 12:21:37 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: GET, Route: How-It-Works]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-24 12:21:37 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-24 12:21:37 --> [404] URI=https://www.mymiwallet.com/index.php/How-It-Works
WARNING - 2026-03-24 12:21:37 --> 404 route miss: https://www.mymiwallet.com/index.php/How-It-Works | referrer: none
ERROR - 2026-03-24 12:21:37 --> [ERROR_PAGE] event=error_404 status=404 message=Page not found.
INFO - 2026-03-24 12:21:37 --> [REQ_ID=e720db7bb70a] [PERF] Execution time=0.100636
DEBUG - 2026-03-24 12:21:37 --> [REQ_ID=81e857382d09] [REQUEST][START] GET /
DEBUG - 2026-03-24 12:21:37 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-24 12:21:37 --> [REQ_ID=81e857382d09] [FILTER_BEFORE] /
DEBUG - 2026-03-24 12:21:37 --> [REQ_ID=81e857382d09] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-24 12:21:37 --> [REQ_ID=81e857382d09] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-24 12:21:37 --> [CSRF] token name=csrf_test_name hash=a6a3851f5ce43ac73278cde7926f75aa
DEBUG - 2026-03-24 12:21:37 --> [REQ_ID=7482998ebe48] [INIT] App\Controllers\Home::GET
INFO - 2026-03-24 12:21:37 --> [REQ_ID=7482998ebe48] [MEMORY][controller-start] 4194304
INFO - 2026-03-24 12:21:37 --> [REQ_ID=7482998ebe48] [MEMORY][commonData:start] 4194304
DEBUG - 2026-03-24 12:21:37 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-24 12:21:38 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
DEBUG - 2026-03-24 12:21:38 --> [REQ_ID=7482998ebe48] [VIEW_RENDER] themes/public/home
INFO - 2026-03-24 12:21:38 --> [REQ_ID=7482998ebe48] [MEMORY][commonData:start] 8388608
INFO - 2026-03-24 12:21:38 --> themesMemory usage: 8388608
DEBUG - 2026-03-24 12:21:38 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-24 12:21:38 --> [REQ_ID=81e857382d09] [FILTER_AFTER]
DEBUG - 2026-03-24 12:21:38 --> [REQ_ID=81e857382d09] [LIFECYCLE][END] status=200 duration_ms=497.97 memory_delta=4194304
INFO - 2026-03-24 12:21:38 --> [REQ_ID=7482998ebe48] [PERF] Execution time=0.497766
DEBUG - 2026-03-24 12:21:38 --> [REQ_ID=81e857382d09] [REQUEST][END]
INFO - 2026-03-24 12:21:38 --> [REQ_ID=81e857382d09] [PERF] Execution time=0.516816
DEBUG - 2026-03-24 12:26:22 --> [REQ_ID=56a3c1a76f94] [REQUEST][START] HEAD /
DEBUG - 2026-03-24 12:26:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-24 12:26:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-24 12:26:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-24 12:26:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-24 12:26:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-24 12:40:33 --> [REQ_ID=80b6025a5f39] [REQUEST][START] GET /
DEBUG - 2026-03-24 12:40:33 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-24 12:40:33 --> [REQ_ID=80b6025a5f39] [FILTER_BEFORE] /
DEBUG - 2026-03-24 12:40:33 --> [REQ_ID=80b6025a5f39] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-24 12:40:33 --> [REQ_ID=80b6025a5f39] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-24 12:40:33 --> [CSRF] token name=csrf_test_name hash=71ef9ad2e5304401882d1c2cdcbbf087
DEBUG - 2026-03-24 12:40:33 --> [REQ_ID=862a44b4d065] [INIT] App\Controllers\Home::GET
INFO - 2026-03-24 12:40:33 --> [REQ_ID=862a44b4d065] [MEMORY][controller-start] 6291456
INFO - 2026-03-24 12:40:33 --> [REQ_ID=862a44b4d065] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-24 12:40:33 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-24 12:40:33 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-03-24 12:40:33 --> [REQ_ID=862a44b4d065] [VIEW_RENDER] themes/public/home
INFO - 2026-03-24 12:40:33 --> [REQ_ID=862a44b4d065] [MEMORY][commonData:start] 10485760
INFO - 2026-03-24 12:40:33 --> themesMemory usage: 10485760
DEBUG - 2026-03-24 12:40:33 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-24 12:40:33 --> [REQ_ID=80b6025a5f39] [FILTER_AFTER]
DEBUG - 2026-03-24 12:40:33 --> [REQ_ID=80b6025a5f39] [LIFECYCLE][END] status=200 duration_ms=710.44 memory_delta=4194304
INFO - 2026-03-24 12:40:33 --> [REQ_ID=862a44b4d065] [PERF] Execution time=0.708152
DEBUG - 2026-03-24 12:40:33 --> [REQ_ID=80b6025a5f39] [REQUEST][END]
INFO - 2026-03-24 12:40:33 --> [REQ_ID=80b6025a5f39] [PERF] Execution time=0.753544
DEBUG - 2026-03-24 12:41:22 --> [REQ_ID=9aadc3b0b029] [REQUEST][START] HEAD /
DEBUG - 2026-03-24 12:41:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-24 12:41:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-24 12:41:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-24 12:41:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-24 12:41:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-24 12:46:22 --> [REQ_ID=77e3ac1c2647] [REQUEST][START] HEAD /
DEBUG - 2026-03-24 12:46:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-24 12:46:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-24 12:46:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-24 12:46:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-24 12:46:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-24 12:56:22 --> [REQ_ID=1598e92dddef] [REQUEST][START] HEAD /
DEBUG - 2026-03-24 12:56:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-24 12:56:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-24 12:56:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-24 12:56:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-24 12:56:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-24 12:57:47 --> [REQ_ID=2c275e8ddaff] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-24 12:57:47 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-24 12:57:47 --> [REQ_ID=2c275e8ddaff] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-24 12:57:47 --> [REQ_ID=2c275e8ddaff] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-24 12:57:47 --> [REQ_ID=2c275e8ddaff] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-24 12:57:47 --> [CSRF] token name=csrf_test_name hash=2f529e523a119b0c8b274583706d683c
DEBUG - 2026-03-24 12:57:47 --> [REQ_ID=538c4dddc58a] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-24 12:57:47 --> [REQ_ID=538c4dddc58a] [MEMORY][controller-start] 6291456
DEBUG - 2026-03-24 12:57:47 --> [REQ_ID=2c275e8ddaff] [FILTER_AFTER]
DEBUG - 2026-03-24 12:57:47 --> [REQ_ID=2c275e8ddaff] [LIFECYCLE][END] status=200 duration_ms=190.52 memory_delta=0
INFO - 2026-03-24 12:57:47 --> [REQ_ID=538c4dddc58a] [PERF] Execution time=0.188502
DEBUG - 2026-03-24 12:57:47 --> [REQ_ID=2c275e8ddaff] [REQUEST][END]
INFO - 2026-03-24 12:57:47 --> [REQ_ID=2c275e8ddaff] [PERF] Execution time=0.232264
DEBUG - 2026-03-24 12:57:48 --> [REQ_ID=914796f6ffaf] [REQUEST][START] GET /index.php/activate
DEBUG - 2026-03-24 12:57:48 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-24 12:57:48 --> [REQ_ID=914796f6ffaf] [FILTER_BEFORE] /index.php/activate
DEBUG - 2026-03-24 12:57:48 --> [REQ_ID=914796f6ffaf] [ROUTE] Controller=\App\Controllers\AuthController Method=activateAccount
DEBUG - 2026-03-24 12:57:48 --> [REQ_ID=914796f6ffaf] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/activate
DEBUG - 2026-03-24 12:57:48 --> [CSRF] token name=csrf_test_name hash=b58cc88d25eec190ae7396996c9920b9
DEBUG - 2026-03-24 12:57:48 --> [REQ_ID=f9d2e01cbbf6] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-24 12:57:48 --> [REQ_ID=f9d2e01cbbf6] [MEMORY][controller-start] 4194304
INFO - 2026-03-24 12:57:48 --> [ACTIVATION] Activation link hit
WARNING - 2026-03-24 12:57:48 --> [ACTIVATION] Activation failed: missing token
DEBUG - 2026-03-24 12:57:48 --> [REQ_ID=914796f6ffaf] [FILTER_AFTER]
DEBUG - 2026-03-24 12:57:48 --> [REQ_ID=914796f6ffaf] [LIFECYCLE][END] status=302 duration_ms=26.31 memory_delta=0
INFO - 2026-03-24 12:57:48 --> [REQ_ID=f9d2e01cbbf6] [PERF] Execution time=0.026169
DEBUG - 2026-03-24 12:57:48 --> [REQ_ID=914796f6ffaf] [REQUEST][END]
INFO - 2026-03-24 12:57:48 --> [REQ_ID=914796f6ffaf] [PERF] Execution time=0.034858
DEBUG - 2026-03-24 12:57:48 --> [REQ_ID=856f783ce20f] [REQUEST][START] GET /index.php/Support/Account
DEBUG - 2026-03-24 12:57:48 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-24 12:57:48 --> [REQ_ID=856f783ce20f] [FILTER_BEFORE] /index.php/Support/Account
DEBUG - 2026-03-24 12:57:48 --> [REQ_ID=856f783ce20f] [ROUTE] Controller=\App\Modules\Support\Controllers\AccountSupportController Method=index
DEBUG - 2026-03-24 12:57:48 --> [REQ_ID=856f783ce20f] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Support/Account
DEBUG - 2026-03-24 12:57:48 --> [CSRF] token name=csrf_test_name hash=09a2c26638ec39db7239d33c4ea201a0
DEBUG - 2026-03-24 12:57:48 --> [REQ_ID=0be666ceb560] [INIT] App\Modules\Support\Controllers\AccountSupportController::GET
INFO - 2026-03-24 12:57:48 --> [REQ_ID=0be666ceb560] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-24 12:57:48 --> [REQ_ID=0be666ceb560] [METHOD_ENTRY] index
DEBUG - 2026-03-24 12:57:48 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-24 12:57:48 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-24 12:57:48 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-24 12:57:48 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-24 12:57:48 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-24 12:57:48 --> MyMICoin: guest context detected; skipping user-specific preload.
INFO - 2026-03-24 12:57:48 --> [REQ_ID=0be666ceb560] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-24 12:57:48 --> [REQ_ID=0be666ceb560] [VIEW_RENDER] SupportModule/Support/account_help
INFO - 2026-03-24 12:57:48 --> [REQ_ID=0be666ceb560] [MEMORY][commonData:start] 6291456
INFO - 2026-03-24 12:57:48 --> themesMemory usage: 6291456
DEBUG - 2026-03-24 12:57:48 --> [REQ_ID=856f783ce20f] [FILTER_AFTER]
DEBUG - 2026-03-24 12:57:48 --> [REQ_ID=856f783ce20f] [LIFECYCLE][END] status=200 duration_ms=69.82 memory_delta=2097152
INFO - 2026-03-24 12:57:48 --> [REQ_ID=0be666ceb560] [PERF] Execution time=0.069662
DEBUG - 2026-03-24 12:57:48 --> [REQ_ID=856f783ce20f] [REQUEST][END]
INFO - 2026-03-24 12:57:48 --> [REQ_ID=856f783ce20f] [PERF] Execution time=0.082472
DEBUG - 2026-03-24 13:00:01 --> [REQ_ID=a72e26973653] [REQUEST][START] GET /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-24 13:00:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-24 13:00:01 --> [REQ_ID=a72e26973653] [FILTER_BEFORE] /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-24 13:00:01 --> [REQ_ID=a72e26973653] [ROUTE] Controller=\App\Modules\Management\Controllers\ManagementAPIController Method=Run_CRON_Tasks
DEBUG - 2026-03-24 13:00:01 --> [REQ_ID=a72e26973653] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-24 13:00:01 --> [REQ_ID=a72e26973653] [REQUEST][END]
INFO - 2026-03-24 13:00:01 --> [REQ_ID=a72e26973653] [PERF] Execution time=0.045560
DEBUG - 2026-03-24 13:11:22 --> [REQ_ID=8d0a87b1cd09] [REQUEST][START] HEAD /
DEBUG - 2026-03-24 13:11:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-24 13:11:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-24 13:11:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-24 13:11:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-24 13:11:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-24 13:15:02 --> [REQ_ID=1dd6512e811f] [REQUEST][START] GET /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-24 13:15:02 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-24 13:15:02 --> [REQ_ID=1dd6512e811f] [FILTER_BEFORE] /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-24 13:15:02 --> [REQ_ID=1dd6512e811f] [ROUTE] Controller=\App\Modules\APIs\Controllers\AlertsAPIController Method=fetchEmailAlerts
DEBUG - 2026-03-24 13:15:02 --> [REQ_ID=1dd6512e811f] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-24 13:15:02 --> [REQ_ID=1dd6512e811f] [REQUEST][END]
INFO - 2026-03-24 13:15:02 --> [REQ_ID=1dd6512e811f] [PERF] Execution time=0.045424
DEBUG - 2026-03-24 13:16:22 --> [REQ_ID=b76beca67700] [REQUEST][START] HEAD /
DEBUG - 2026-03-24 13:16:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-24 13:16:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-24 13:16:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-24 13:16:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-24 13:16:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-24 13:21:22 --> [REQ_ID=157a4232948a] [REQUEST][START] HEAD /
DEBUG - 2026-03-24 13:21:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-24 13:21:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-24 13:21:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-24 13:21:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-24 13:21:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-24 13:26:22 --> [REQ_ID=b5ed226f3a8d] [REQUEST][START] HEAD /
DEBUG - 2026-03-24 13:26:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-24 13:26:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-24 13:26:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-24 13:26:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-24 13:26:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-24 13:30:30 --> [REQ_ID=e9f0bdbd3240] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-24 13:30:30 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-24 13:30:30 --> [REQ_ID=e9f0bdbd3240] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-24 13:30:30 --> [REQ_ID=e9f0bdbd3240] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-24 13:30:30 --> [REQ_ID=e9f0bdbd3240] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-24 13:30:30 --> [CSRF] token name=csrf_test_name hash=74fe90a5603101b645c4fac17e1194c5
DEBUG - 2026-03-24 13:30:30 --> [REQ_ID=a33554794fbc] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-24 13:30:30 --> [REQ_ID=a33554794fbc] [MEMORY][controller-start] 6291456
DEBUG - 2026-03-24 13:30:30 --> [REQ_ID=e9f0bdbd3240] [FILTER_AFTER]
DEBUG - 2026-03-24 13:30:30 --> [REQ_ID=e9f0bdbd3240] [LIFECYCLE][END] status=200 duration_ms=136.56 memory_delta=0
INFO - 2026-03-24 13:30:30 --> [REQ_ID=a33554794fbc] [PERF] Execution time=0.134345
DEBUG - 2026-03-24 13:30:30 --> [REQ_ID=e9f0bdbd3240] [REQUEST][END]
INFO - 2026-03-24 13:30:30 --> [REQ_ID=e9f0bdbd3240] [PERF] Execution time=0.177799
DEBUG - 2026-03-24 13:30:31 --> [REQ_ID=3264b7fdd48c] [REQUEST][START] GET /
DEBUG - 2026-03-24 13:30:31 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-24 13:30:31 --> [REQ_ID=3264b7fdd48c] [FILTER_BEFORE] /
DEBUG - 2026-03-24 13:30:31 --> [REQ_ID=3264b7fdd48c] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-24 13:30:31 --> [REQ_ID=3264b7fdd48c] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-24 13:30:31 --> [CSRF] token name=csrf_test_name hash=1d63c4f9647bda4de5373cb947cef1e5
DEBUG - 2026-03-24 13:30:31 --> [REQ_ID=cb480e8da840] [INIT] App\Controllers\Home::GET
INFO - 2026-03-24 13:30:31 --> [REQ_ID=cb480e8da840] [MEMORY][controller-start] 4194304
INFO - 2026-03-24 13:30:31 --> [REQ_ID=cb480e8da840] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-24 13:30:31 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-24 13:30:31 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-03-24 13:30:31 --> [REQ_ID=cb480e8da840] [VIEW_RENDER] themes/public/home
INFO - 2026-03-24 13:30:31 --> [REQ_ID=cb480e8da840] [MEMORY][commonData:start] 8388608
INFO - 2026-03-24 13:30:31 --> themesMemory usage: 8388608
DEBUG - 2026-03-24 13:30:31 --> [MetaService] slug= pageName=Home cacheHit= path=DB
DEBUG - 2026-03-24 13:30:31 --> [REQ_ID=3264b7fdd48c] [FILTER_AFTER]
DEBUG - 2026-03-24 13:30:31 --> [REQ_ID=3264b7fdd48c] [LIFECYCLE][END] status=200 duration_ms=598.86 memory_delta=4194304
INFO - 2026-03-24 13:30:31 --> [REQ_ID=cb480e8da840] [PERF] Execution time=0.598638
DEBUG - 2026-03-24 13:30:31 --> [REQ_ID=3264b7fdd48c] [REQUEST][END]
INFO - 2026-03-24 13:30:31 --> [REQ_ID=3264b7fdd48c] [PERF] Execution time=0.610424
DEBUG - 2026-03-24 13:30:32 --> [REQ_ID=8b8f1ac866ef] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-24 13:30:32 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-24 13:30:32 --> [REQ_ID=8b8f1ac866ef] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-24 13:30:32 --> [REQ_ID=8b8f1ac866ef] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-24 13:30:32 --> [REQ_ID=8b8f1ac866ef] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-24 13:30:32 --> [CSRF] token name=csrf_test_name hash=4e82e503c8461205256c09ef3d5ad750
DEBUG - 2026-03-24 13:30:32 --> [REQ_ID=b6eebea94bd0] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-24 13:30:32 --> [REQ_ID=b6eebea94bd0] [MEMORY][controller-start] 6291456
DEBUG - 2026-03-24 13:30:32 --> [REQ_ID=8b8f1ac866ef] [FILTER_AFTER]
DEBUG - 2026-03-24 13:30:32 --> [REQ_ID=8b8f1ac866ef] [LIFECYCLE][END] status=200 duration_ms=21.50 memory_delta=0
INFO - 2026-03-24 13:30:32 --> [REQ_ID=b6eebea94bd0] [PERF] Execution time=0.021224
DEBUG - 2026-03-24 13:30:32 --> [REQ_ID=8b8f1ac866ef] [REQUEST][END]
INFO - 2026-03-24 13:30:32 --> [REQ_ID=8b8f1ac866ef] [PERF] Execution time=0.030328
DEBUG - 2026-03-24 13:30:32 --> [REQ_ID=01b906ad3e86] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-24 13:30:32 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-24 13:30:32 --> [REQ_ID=01b906ad3e86] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-24 13:30:32 --> [REQ_ID=01b906ad3e86] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-24 13:30:32 --> [REQ_ID=01b906ad3e86] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-24 13:30:32 --> [CSRF] token name=csrf_test_name hash=1d63c4f9647bda4de5373cb947cef1e5
DEBUG - 2026-03-24 13:30:32 --> [REQ_ID=961b9e354c41] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-24 13:30:32 --> [REQ_ID=961b9e354c41] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-24 13:30:32 --> [REQ_ID=01b906ad3e86] [FILTER_AFTER]
DEBUG - 2026-03-24 13:30:32 --> [REQ_ID=01b906ad3e86] [LIFECYCLE][END] status=200 duration_ms=16.61 memory_delta=0
INFO - 2026-03-24 13:30:32 --> [REQ_ID=961b9e354c41] [PERF] Execution time=0.016570
DEBUG - 2026-03-24 13:30:32 --> [REQ_ID=01b906ad3e86] [REQUEST][END]
INFO - 2026-03-24 13:30:32 --> [REQ_ID=01b906ad3e86] [PERF] Execution time=0.025271
DEBUG - 2026-03-24 13:31:22 --> [REQ_ID=168a3448e678] [REQUEST][START] HEAD /
DEBUG - 2026-03-24 13:31:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-24 13:31:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-24 13:31:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-24 13:31:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-24 13:31:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-24 13:31:42 --> [REQ_ID=06605d6d285d] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-24 13:31:42 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-24 13:31:42 --> [REQ_ID=06605d6d285d] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-24 13:31:42 --> [REQ_ID=06605d6d285d] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-24 13:31:42 --> [REQ_ID=06605d6d285d] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-24 13:31:42 --> [CSRF] token name=csrf_test_name hash=9c9e2dc33a21b81d6d1a6c1e884bad6e
DEBUG - 2026-03-24 13:31:42 --> [REQ_ID=ee3a8eae79e9] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-24 13:31:42 --> [REQ_ID=ee3a8eae79e9] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-24 13:31:42 --> [REQ_ID=06605d6d285d] [FILTER_AFTER]
DEBUG - 2026-03-24 13:31:42 --> [REQ_ID=06605d6d285d] [LIFECYCLE][END] status=200 duration_ms=45.09 memory_delta=0
INFO - 2026-03-24 13:31:42 --> [REQ_ID=ee3a8eae79e9] [PERF] Execution time=0.044793
DEBUG - 2026-03-24 13:31:42 --> [REQ_ID=06605d6d285d] [REQUEST][END]
INFO - 2026-03-24 13:31:42 --> [REQ_ID=06605d6d285d] [PERF] Execution time=0.054498
DEBUG - 2026-03-24 13:40:11 --> [REQ_ID=04836434f4a4] [REQUEST][START] GET /
DEBUG - 2026-03-24 13:40:11 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-24 13:40:11 --> [REQ_ID=04836434f4a4] [FILTER_BEFORE] /
DEBUG - 2026-03-24 13:40:11 --> [REQ_ID=04836434f4a4] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-24 13:40:11 --> [REQ_ID=04836434f4a4] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-24 13:40:11 --> [CSRF] token name=csrf_test_name hash=37c5f2f36b5637be15dd6875e0a87aaa
DEBUG - 2026-03-24 13:40:11 --> [REQ_ID=3abd58e944f6] [INIT] App\Controllers\Home::GET
INFO - 2026-03-24 13:40:11 --> [REQ_ID=3abd58e944f6] [MEMORY][controller-start] 6291456
INFO - 2026-03-24 13:40:11 --> [REQ_ID=3abd58e944f6] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-24 13:40:11 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-24 13:40:11 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
DEBUG - 2026-03-24 13:40:11 --> [REQ_ID=3abd58e944f6] [VIEW_RENDER] themes/public/home
INFO - 2026-03-24 13:40:11 --> [REQ_ID=3abd58e944f6] [MEMORY][commonData:start] 10485760
INFO - 2026-03-24 13:40:11 --> themesMemory usage: 10485760
DEBUG - 2026-03-24 13:40:11 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-24 13:40:11 --> [REQ_ID=04836434f4a4] [FILTER_AFTER]
DEBUG - 2026-03-24 13:40:11 --> [REQ_ID=04836434f4a4] [LIFECYCLE][END] status=200 duration_ms=683.20 memory_delta=4194304
INFO - 2026-03-24 13:40:11 --> [REQ_ID=3abd58e944f6] [PERF] Execution time=0.681221
DEBUG - 2026-03-24 13:40:11 --> [REQ_ID=04836434f4a4] [REQUEST][END]
INFO - 2026-03-24 13:40:11 --> [REQ_ID=04836434f4a4] [PERF] Execution time=0.722339
DEBUG - 2026-03-24 13:41:22 --> [REQ_ID=e2c57922f32c] [REQUEST][START] HEAD /
DEBUG - 2026-03-24 13:41:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-24 13:41:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-24 13:41:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-24 13:41:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-24 13:41:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-24 13:51:22 --> [REQ_ID=3c8c0a038ed9] [REQUEST][START] HEAD /
DEBUG - 2026-03-24 13:51:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-24 13:51:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-24 13:51:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-24 13:51:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-24 13:51:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-24 13:55:25 --> [REQ_ID=52a207a5afa9] [REQUEST][START] GET /index.php/Features/Advanced-Investment-Portfoio-Manager
DEBUG - 2026-03-24 13:55:25 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
INFO - 2026-03-24 13:55:25 --> REDIRECTED ROUTE at https://www.mymiwallet.com/Features/Advanced-Investment-Portfolio-Manager
DEBUG - 2026-03-24 13:55:25 --> [REQ_ID=52a207a5afa9] [REQUEST][END]
INFO - 2026-03-24 13:55:25 --> [REQ_ID=52a207a5afa9] [PERF] Execution time=0.036528
DEBUG - 2026-03-24 14:00:01 --> [REQ_ID=187ce08cacd1] [REQUEST][START] GET /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-24 14:00:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-24 14:00:01 --> [REQ_ID=187ce08cacd1] [FILTER_BEFORE] /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-24 14:00:01 --> [REQ_ID=187ce08cacd1] [ROUTE] Controller=\App\Modules\Management\Controllers\ManagementAPIController Method=Run_CRON_Tasks
DEBUG - 2026-03-24 14:00:01 --> [REQ_ID=187ce08cacd1] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-24 14:00:01 --> [REQ_ID=187ce08cacd1] [REQUEST][END]
INFO - 2026-03-24 14:00:01 --> [REQ_ID=187ce08cacd1] [PERF] Execution time=0.048284
DEBUG - 2026-03-24 14:01:22 --> [REQ_ID=2f6c1727661b] [REQUEST][START] HEAD /
DEBUG - 2026-03-24 14:01:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-24 14:01:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-24 14:01:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-24 14:01:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-24 14:01:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-24 14:11:22 --> [REQ_ID=bfbde9d795da] [REQUEST][START] HEAD /
DEBUG - 2026-03-24 14:11:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-24 14:11:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-24 14:11:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-24 14:11:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-24 14:11:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-24 14:15:01 --> [REQ_ID=bc198fa0f2dd] [REQUEST][START] GET /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-24 14:15:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-24 14:15:01 --> [REQ_ID=bc198fa0f2dd] [FILTER_BEFORE] /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-24 14:15:01 --> [REQ_ID=bc198fa0f2dd] [ROUTE] Controller=\App\Modules\APIs\Controllers\AlertsAPIController Method=fetchEmailAlerts
DEBUG - 2026-03-24 14:15:01 --> [REQ_ID=bc198fa0f2dd] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-24 14:15:01 --> [REQ_ID=bc198fa0f2dd] [REQUEST][END]
INFO - 2026-03-24 14:15:01 --> [REQ_ID=bc198fa0f2dd] [PERF] Execution time=0.044917
DEBUG - 2026-03-24 14:21:15 --> [REQ_ID=e684e3173c8c] [REQUEST][START] GET /
DEBUG - 2026-03-24 14:21:15 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-24 14:21:15 --> [REQ_ID=e684e3173c8c] [FILTER_BEFORE] /
DEBUG - 2026-03-24 14:21:15 --> [REQ_ID=e684e3173c8c] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-24 14:21:15 --> [REQ_ID=e684e3173c8c] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-24 14:21:15 --> [CSRF] token name=csrf_test_name hash=17eb6a217c0a700a2f2de5044fcbb8ed
DEBUG - 2026-03-24 14:21:15 --> [REQ_ID=aa8dc46433e9] [INIT] App\Controllers\Home::GET
INFO - 2026-03-24 14:21:15 --> [REQ_ID=aa8dc46433e9] [MEMORY][controller-start] 6291456
INFO - 2026-03-24 14:21:16 --> [REQ_ID=aa8dc46433e9] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-24 14:21:16 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-24 14:21:16 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-03-24 14:21:16 --> [REQ_ID=aa8dc46433e9] [VIEW_RENDER] themes/public/home
INFO - 2026-03-24 14:21:16 --> [REQ_ID=aa8dc46433e9] [MEMORY][commonData:start] 10485760
INFO - 2026-03-24 14:21:16 --> themesMemory usage: 10485760
DEBUG - 2026-03-24 14:21:16 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-24 14:21:16 --> [REQ_ID=e684e3173c8c] [FILTER_AFTER]
DEBUG - 2026-03-24 14:21:16 --> [REQ_ID=e684e3173c8c] [LIFECYCLE][END] status=200 duration_ms=727.25 memory_delta=4194304
INFO - 2026-03-24 14:21:16 --> [REQ_ID=aa8dc46433e9] [PERF] Execution time=0.725313
DEBUG - 2026-03-24 14:21:16 --> [REQ_ID=e684e3173c8c] [REQUEST][END]
INFO - 2026-03-24 14:21:16 --> [REQ_ID=e684e3173c8c] [PERF] Execution time=0.767607
DEBUG - 2026-03-24 14:26:09 --> [REQ_ID=9d23361e631c] [REQUEST][START] GET /index.php/Wallets
DEBUG - 2026-03-24 14:26:09 --> [REQ_ID=152fbdffd62c] [REQUEST][START] GET /index.php/My-Referrals
DEBUG - 2026-03-24 14:26:09 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-24 14:26:09 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-24 14:26:09 --> [REQ_ID=9d23361e631c] [FILTER_BEFORE] /index.php/Wallets
DEBUG - 2026-03-24 14:26:09 --> [REQ_ID=9d23361e631c] [ROUTE] Controller=\App\Modules\User\Controllers\WalletsController Method=index
DEBUG - 2026-03-24 14:26:09 --> [REQ_ID=9d23361e631c] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Wallets
DEBUG - 2026-03-24 14:26:09 --> [REQ_ID=152fbdffd62c] [FILTER_BEFORE] /index.php/My-Referrals
DEBUG - 2026-03-24 14:26:09 --> [REQ_ID=152fbdffd62c] [ROUTE] Controller=\App\Modules\User\Controllers\ReferralController Method=index
DEBUG - 2026-03-24 14:26:09 --> [REQ_ID=152fbdffd62c] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/My-Referrals
DEBUG - 2026-03-24 14:26:09 --> [CSRF] token name=csrf_test_name hash=bd4c554119deb273673752d4a47317ca
DEBUG - 2026-03-24 14:26:09 --> [CSRF] token name=csrf_test_name hash=849197b302399dd5e1e5be93d2a3a505
DEBUG - 2026-03-24 14:26:09 --> [REQ_ID=9d23361e631c] [REQUEST][END]
INFO - 2026-03-24 14:26:09 --> [REQ_ID=9d23361e631c] [PERF] Execution time=0.077374
DEBUG - 2026-03-24 14:26:09 --> [REQ_ID=152fbdffd62c] [REQUEST][END]
INFO - 2026-03-24 14:26:09 --> [REQ_ID=152fbdffd62c] [PERF] Execution time=0.074857
DEBUG - 2026-03-24 14:26:09 --> [REQ_ID=41e2efe8c299] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-24 14:26:09 --> [REQ_ID=5d02c99dd84b] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-24 14:26:09 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-24 14:26:09 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-24 14:26:09 --> [REQ_ID=41e2efe8c299] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-24 14:26:09 --> [REQ_ID=5d02c99dd84b] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-24 14:26:09 --> [REQ_ID=41e2efe8c299] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-24 14:26:09 --> [REQ_ID=5d02c99dd84b] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-24 14:26:09 --> [REQ_ID=41e2efe8c299] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-24 14:26:09 --> [REQ_ID=5d02c99dd84b] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-24 14:26:09 --> [CSRF] token name=csrf_test_name hash=8c12e037573f0dcf891741cd67ae0b2b
DEBUG - 2026-03-24 14:26:09 --> [CSRF] token name=csrf_test_name hash=9995e02a285774c7ed3df30a2ff382f5
DEBUG - 2026-03-24 14:26:09 --> [REQ_ID=604a189ee3a6] [INIT] App\Controllers\AuthController::GET
DEBUG - 2026-03-24 14:26:09 --> [REQ_ID=1db5da283873] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-24 14:26:09 --> [REQ_ID=604a189ee3a6] [MEMORY][controller-start] 4194304
INFO - 2026-03-24 14:26:09 --> [REQ_ID=1db5da283873] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-24 14:26:09 --> [REQ_ID=41e2efe8c299] [FILTER_AFTER]
DEBUG - 2026-03-24 14:26:09 --> [REQ_ID=41e2efe8c299] [LIFECYCLE][END] status=200 duration_ms=62.33 memory_delta=0
INFO - 2026-03-24 14:26:09 --> [REQ_ID=604a189ee3a6] [PERF] Execution time=0.061969
DEBUG - 2026-03-24 14:26:09 --> [REQ_ID=41e2efe8c299] [REQUEST][END]
INFO - 2026-03-24 14:26:09 --> [REQ_ID=41e2efe8c299] [PERF] Execution time=0.081820
DEBUG - 2026-03-24 14:26:09 --> [REQ_ID=5d02c99dd84b] [FILTER_AFTER]
DEBUG - 2026-03-24 14:26:09 --> [REQ_ID=5d02c99dd84b] [LIFECYCLE][END] status=200 duration_ms=124.96 memory_delta=0
INFO - 2026-03-24 14:26:09 --> [REQ_ID=1db5da283873] [PERF] Execution time=0.124596
DEBUG - 2026-03-24 14:26:09 --> [REQ_ID=5d02c99dd84b] [REQUEST][END]
INFO - 2026-03-24 14:26:09 --> [REQ_ID=5d02c99dd84b] [PERF] Execution time=0.144400
DEBUG - 2026-03-24 14:26:10 --> [REQ_ID=7497a327a8d5] [REQUEST][START] GET /index.php/Alerts
DEBUG - 2026-03-24 14:26:10 --> [REQ_ID=f2adcd8ea0e8] [REQUEST][START] GET /index.php/Account/Security
DEBUG - 2026-03-24 14:26:10 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-24 14:26:10 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-24 14:26:10 --> [REQ_ID=7497a327a8d5] [FILTER_BEFORE] /index.php/Alerts
DEBUG - 2026-03-24 14:26:10 --> [REQ_ID=7497a327a8d5] [ROUTE] Controller=\App\Modules\User\Controllers\AlertsController Method=index
DEBUG - 2026-03-24 14:26:10 --> [REQ_ID=7497a327a8d5] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Alerts
DEBUG - 2026-03-24 14:26:10 --> [CSRF] token name=csrf_test_name hash=edfe34e6a1105bb2f70b17af2da5faf8
DEBUG - 2026-03-24 14:26:10 --> [REQ_ID=7497a327a8d5] [REQUEST][END]
INFO - 2026-03-24 14:26:10 --> [REQ_ID=7497a327a8d5] [PERF] Execution time=0.019257
DEBUG - 2026-03-24 14:26:10 --> [REQ_ID=f2adcd8ea0e8] [FILTER_BEFORE] /index.php/Account/Security
DEBUG - 2026-03-24 14:26:10 --> [REQ_ID=f2adcd8ea0e8] [ROUTE] Controller=\App\Modules\User\Controllers\DashboardController Method=Security
DEBUG - 2026-03-24 14:26:10 --> [REQ_ID=f2adcd8ea0e8] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Account/Security
DEBUG - 2026-03-24 14:26:10 --> [CSRF] token name=csrf_test_name hash=1542cc45252312e9c7361ff8611163f1
DEBUG - 2026-03-24 14:26:10 --> [REQ_ID=f2adcd8ea0e8] [REQUEST][END]
INFO - 2026-03-24 14:26:10 --> [REQ_ID=f2adcd8ea0e8] [PERF] Execution time=0.021403
DEBUG - 2026-03-24 14:26:10 --> [REQ_ID=d0e6e89b6b20] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-24 14:26:10 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-24 14:26:10 --> [REQ_ID=949a0fec3d48] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-24 14:26:10 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-24 14:26:10 --> [REQ_ID=d0e6e89b6b20] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-24 14:26:10 --> [REQ_ID=d0e6e89b6b20] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-24 14:26:10 --> [REQ_ID=d0e6e89b6b20] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-24 14:26:10 --> [CSRF] token name=csrf_test_name hash=5f7955f104a072828daab25f5e0ec32e
DEBUG - 2026-03-24 14:26:10 --> [REQ_ID=2ceceab08db9] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-24 14:26:10 --> [REQ_ID=2ceceab08db9] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-24 14:26:10 --> [REQ_ID=949a0fec3d48] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-24 14:26:10 --> [REQ_ID=949a0fec3d48] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-24 14:26:10 --> [REQ_ID=949a0fec3d48] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-24 14:26:10 --> [CSRF] token name=csrf_test_name hash=cbdeaaf63581bc9d61e0fd74575cd726
DEBUG - 2026-03-24 14:26:10 --> [REQ_ID=d72f7151bb01] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-24 14:26:10 --> [REQ_ID=d72f7151bb01] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-24 14:26:10 --> [REQ_ID=d0e6e89b6b20] [FILTER_AFTER]
DEBUG - 2026-03-24 14:26:10 --> [REQ_ID=d0e6e89b6b20] [LIFECYCLE][END] status=200 duration_ms=14.80 memory_delta=0
INFO - 2026-03-24 14:26:10 --> [REQ_ID=2ceceab08db9] [PERF] Execution time=0.014512
DEBUG - 2026-03-24 14:26:10 --> [REQ_ID=d0e6e89b6b20] [REQUEST][END]
INFO - 2026-03-24 14:26:10 --> [REQ_ID=d0e6e89b6b20] [PERF] Execution time=0.029415
DEBUG - 2026-03-24 14:26:10 --> [REQ_ID=949a0fec3d48] [FILTER_AFTER]
DEBUG - 2026-03-24 14:26:10 --> [REQ_ID=949a0fec3d48] [LIFECYCLE][END] status=200 duration_ms=13.36 memory_delta=0
INFO - 2026-03-24 14:26:10 --> [REQ_ID=d72f7151bb01] [PERF] Execution time=0.013155
DEBUG - 2026-03-24 14:26:10 --> [REQ_ID=949a0fec3d48] [REQUEST][END]
INFO - 2026-03-24 14:26:10 --> [REQ_ID=949a0fec3d48] [PERF] Execution time=0.027630
DEBUG - 2026-03-24 14:26:15 --> [REQ_ID=e5f546ef873d] [REQUEST][START] GET /index.php/Support
DEBUG - 2026-03-24 14:26:15 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-24 14:26:15 --> [REQ_ID=e5f546ef873d] [FILTER_BEFORE] /index.php/Support
DEBUG - 2026-03-24 14:26:15 --> [REQ_ID=e5f546ef873d] [ROUTE] Controller=\App\Modules\Support\Controllers\SupportController Method=index
DEBUG - 2026-03-24 14:26:15 --> [REQ_ID=e5f546ef873d] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Support
DEBUG - 2026-03-24 14:26:15 --> [CSRF] token name=csrf_test_name hash=0b93ac0b37b897f67fd9d6917097c9c1
DEBUG - 2026-03-24 14:26:15 --> [REQ_ID=145c45b77db5] [INIT] App\Modules\Support\Controllers\SupportController::GET
INFO - 2026-03-24 14:26:15 --> [REQ_ID=145c45b77db5] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-24 14:26:15 --> [REQ_ID=145c45b77db5] [METHOD_ENTRY] index
DEBUG - 2026-03-24 14:26:15 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-24 14:26:15 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-24 14:26:15 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-24 14:26:15 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-24 14:26:15 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-24 14:26:15 --> MyMICoin: guest context detected; skipping user-specific preload.
INFO - 2026-03-24 14:26:15 --> [REQ_ID=145c45b77db5] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-24 14:26:15 --> [REQ_ID=145c45b77db5] [VIEW_RENDER] SupportModule\Views\Support\index
INFO - 2026-03-24 14:26:15 --> [REQ_ID=145c45b77db5] [MEMORY][commonData:start] 6291456
INFO - 2026-03-24 14:26:15 --> themesMemory usage: 6291456
DEBUG - 2026-03-24 14:26:15 --> [REQ_ID=e5f546ef873d] [FILTER_AFTER]
DEBUG - 2026-03-24 14:26:15 --> [REQ_ID=e5f546ef873d] [LIFECYCLE][END] status=200 duration_ms=86.85 memory_delta=2097152
INFO - 2026-03-24 14:26:15 --> [REQ_ID=145c45b77db5] [PERF] Execution time=0.086593
DEBUG - 2026-03-24 14:26:15 --> [REQ_ID=e5f546ef873d] [REQUEST][END]
INFO - 2026-03-24 14:26:15 --> [REQ_ID=e5f546ef873d] [PERF] Execution time=0.097137
DEBUG - 2026-03-24 14:26:25 --> [REQ_ID=037dbcfb9f2d] [REQUEST][START] GET /index.php/How-It-Works/Investment-Portfolio-Management
DEBUG - 2026-03-24 14:26:25 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-24 14:26:26 --> [REQ_ID=037dbcfb9f2d] [FILTER_BEFORE] /index.php/How-It-Works/Investment-Portfolio-Management
DEBUG - 2026-03-24 14:26:26 --> [REQ_ID=037dbcfb9f2d] [ROUTE] Controller=\App\Modules\Blog\Controllers\HowItWorksController Method=InvestmentPortfolioManagement
DEBUG - 2026-03-24 14:26:26 --> [REQ_ID=037dbcfb9f2d] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/How-It-Works/Investment-Portfolio-Management
DEBUG - 2026-03-24 14:26:26 --> [CSRF] token name=csrf_test_name hash=36a626523a7876727629eacd52b9bb4a
DEBUG - 2026-03-24 14:26:26 --> [REQ_ID=d2009c727fb4] [INIT] App\Modules\Blog\Controllers\HowItWorksController::GET
INFO - 2026-03-24 14:26:26 --> [REQ_ID=d2009c727fb4] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-24 14:26:26 --> [REQ_ID=d2009c727fb4] [METHOD_ENTRY] InvestmentPortfolioManagement
DEBUG - 2026-03-24 14:26:26 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-24 14:26:26 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-24 14:26:26 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-24 14:26:26 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-24 14:26:26 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-24 14:26:26 --> MyMICoin: guest context detected; skipping user-specific preload.
INFO - 2026-03-24 14:26:26 --> [REQ_ID=d2009c727fb4] [MEMORY][commonData:start] 6291456
INFO - 2026-03-24 14:26:26 --> themesMemory usage: 8388608
DEBUG - 2026-03-24 14:26:26 --> [MetaService] slug=how-it-works/investment-portfolio-management pageName= cacheHit= path=DB
DEBUG - 2026-03-24 14:26:26 --> [REQ_ID=037dbcfb9f2d] [FILTER_AFTER]
DEBUG - 2026-03-24 14:26:26 --> [REQ_ID=037dbcfb9f2d] [LIFECYCLE][END] status=200 duration_ms=606.02 memory_delta=4194304
INFO - 2026-03-24 14:26:26 --> [REQ_ID=d2009c727fb4] [PERF] Execution time=0.605714
DEBUG - 2026-03-24 14:26:26 --> [REQ_ID=037dbcfb9f2d] [REQUEST][END]
INFO - 2026-03-24 14:26:26 --> [REQ_ID=037dbcfb9f2d] [PERF] Execution time=0.619963
DEBUG - 2026-03-24 14:26:37 --> [REQ_ID=521133675eda] [REQUEST][START] GET /index.php/How-It-Works
DEBUG - 2026-03-24 14:26:37 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-24 14:26:37 --> [REQ_ID=521133675eda] [FILTER_BEFORE] /index.php/How-It-Works
DEBUG - 2026-03-24 14:26:37 --> [REQ_ID=521133675eda] [ROUTE] Controller=\App\Modules\Blog\Controllers\HowItWorksController Method=index
DEBUG - 2026-03-24 14:26:37 --> [REQ_ID=521133675eda] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/How-It-Works
DEBUG - 2026-03-24 14:26:37 --> [CSRF] token name=csrf_test_name hash=a70efa608317f48da0dd6a186c19458c
DEBUG - 2026-03-24 14:26:37 --> [REQ_ID=6d37a7b34625] [INIT] App\Modules\Blog\Controllers\HowItWorksController::GET
INFO - 2026-03-24 14:26:37 --> [REQ_ID=6d37a7b34625] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-24 14:26:37 --> [REQ_ID=6d37a7b34625] [METHOD_ENTRY] index
DEBUG - 2026-03-24 14:26:37 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-24 14:26:37 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-24 14:26:37 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-24 14:26:37 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-24 14:26:37 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-24 14:26:37 --> MyMICoin: guest context detected; skipping user-specific preload.
ERROR - 2026-03-24 14:26:37 --> HowItWorksController failure: overview
CRITICAL - 2026-03-24 14:26:37 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: GET, Route: How-It-Works]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-24 14:26:37 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-24 14:26:37 --> [404] URI=https://www.mymiwallet.com/index.php/How-It-Works
WARNING - 2026-03-24 14:26:37 --> 404 route miss: https://www.mymiwallet.com/index.php/How-It-Works | referrer: none
ERROR - 2026-03-24 14:26:37 --> [ERROR_PAGE] event=error_404 status=404 message=Page not found.
INFO - 2026-03-24 14:26:37 --> [REQ_ID=6d37a7b34625] [PERF] Execution time=0.042371
DEBUG - 2026-03-24 14:26:47 --> [REQ_ID=37c3218ada10] [REQUEST][START] GET /index.php/How-It-Works/Investment-Dashboard
DEBUG - 2026-03-24 14:26:47 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-24 14:26:47 --> [REQ_ID=37c3218ada10] [FILTER_BEFORE] /index.php/How-It-Works/Investment-Dashboard
DEBUG - 2026-03-24 14:26:47 --> [REQ_ID=37c3218ada10] [ROUTE] Controller=\App\Modules\Blog\Controllers\HowItWorksController Method=show
DEBUG - 2026-03-24 14:26:47 --> [REQ_ID=37c3218ada10] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/How-It-Works/Investment-Dashboard
DEBUG - 2026-03-24 14:26:47 --> [CSRF] token name=csrf_test_name hash=f7c655b423e33a81f122a710d419a46c
DEBUG - 2026-03-24 14:26:47 --> [REQ_ID=787a9bd04239] [INIT] App\Modules\Blog\Controllers\HowItWorksController::GET
INFO - 2026-03-24 14:26:47 --> [REQ_ID=787a9bd04239] [MEMORY][controller-start] 6291456
DEBUG - 2026-03-24 14:26:47 --> [REQ_ID=787a9bd04239] [METHOD_ENTRY] show
DEBUG - 2026-03-24 14:26:47 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-24 14:26:47 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-24 14:26:47 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-24 14:26:47 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-24 14:26:47 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-24 14:26:47 --> MyMICoin: guest context detected; skipping user-specific preload.
INFO - 2026-03-24 14:26:47 --> [REQ_ID=787a9bd04239] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-24 14:26:47 --> [REQ_ID=37c3218ada10] [FILTER_AFTER]
DEBUG - 2026-03-24 14:26:47 --> [REQ_ID=37c3218ada10] [LIFECYCLE][END] status=200 duration_ms=539.30 memory_delta=2097152
INFO - 2026-03-24 14:26:47 --> [REQ_ID=787a9bd04239] [PERF] Execution time=0.539243
DEBUG - 2026-03-24 14:26:47 --> [REQ_ID=37c3218ada10] [REQUEST][END]
INFO - 2026-03-24 14:26:47 --> [REQ_ID=37c3218ada10] [PERF] Execution time=0.549311
DEBUG - 2026-03-24 14:31:22 --> [REQ_ID=386aa62086d5] [REQUEST][START] HEAD /
DEBUG - 2026-03-24 14:31:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-24 14:31:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-24 14:31:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-24 14:31:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-24 14:31:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-24 14:41:22 --> [REQ_ID=ea30a84c1757] [REQUEST][START] HEAD /
DEBUG - 2026-03-24 14:41:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-24 14:41:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-24 14:41:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-24 14:41:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-24 14:41:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-24 14:51:22 --> [REQ_ID=2b10fcba7b9f] [REQUEST][START] HEAD /
DEBUG - 2026-03-24 14:51:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-24 14:51:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-24 14:51:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-24 14:51:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-24 14:51:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-24 14:56:22 --> [REQ_ID=642e13e01803] [REQUEST][START] HEAD /
DEBUG - 2026-03-24 14:56:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-24 14:56:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-24 14:56:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-24 14:56:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-24 14:56:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-24 15:00:02 --> [REQ_ID=61cf7767a661] [REQUEST][START] GET /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-24 15:00:02 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-24 15:00:02 --> [REQ_ID=61cf7767a661] [FILTER_BEFORE] /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-24 15:00:02 --> [REQ_ID=61cf7767a661] [ROUTE] Controller=\App\Modules\Management\Controllers\ManagementAPIController Method=Run_CRON_Tasks
DEBUG - 2026-03-24 15:00:02 --> [REQ_ID=61cf7767a661] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-24 15:00:02 --> [REQ_ID=61cf7767a661] [REQUEST][END]
INFO - 2026-03-24 15:00:02 --> [REQ_ID=61cf7767a661] [PERF] Execution time=0.049940
DEBUG - 2026-03-24 15:01:17 --> [REQ_ID=d615a0ecab72] [REQUEST][START] GET /
DEBUG - 2026-03-24 15:01:17 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-24 15:01:17 --> [REQ_ID=d615a0ecab72] [FILTER_BEFORE] /
DEBUG - 2026-03-24 15:01:17 --> [REQ_ID=d615a0ecab72] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-24 15:01:17 --> [REQ_ID=d615a0ecab72] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-24 15:01:17 --> [CSRF] token name=csrf_test_name hash=fd05a945fed53dd6c1d67729ef6d82c4
DEBUG - 2026-03-24 15:01:17 --> [REQ_ID=e5899c47cec6] [INIT] App\Controllers\Home::GET
INFO - 2026-03-24 15:01:17 --> [REQ_ID=e5899c47cec6] [MEMORY][controller-start] 4194304
INFO - 2026-03-24 15:01:17 --> [REQ_ID=e5899c47cec6] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-24 15:01:17 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-24 15:01:17 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-03-24 15:01:17 --> [REQ_ID=e5899c47cec6] [VIEW_RENDER] themes/public/home
INFO - 2026-03-24 15:01:17 --> [REQ_ID=e5899c47cec6] [MEMORY][commonData:start] 8388608
INFO - 2026-03-24 15:01:17 --> themesMemory usage: 8388608
DEBUG - 2026-03-24 15:01:17 --> [MetaService] slug= pageName=Home cacheHit= path=DB
DEBUG - 2026-03-24 15:01:18 --> [REQ_ID=d615a0ecab72] [FILTER_AFTER]
DEBUG - 2026-03-24 15:01:18 --> [REQ_ID=d615a0ecab72] [LIFECYCLE][END] status=200 duration_ms=665.19 memory_delta=4194304
INFO - 2026-03-24 15:01:18 --> [REQ_ID=e5899c47cec6] [PERF] Execution time=0.663844
DEBUG - 2026-03-24 15:01:18 --> [REQ_ID=d615a0ecab72] [REQUEST][END]
INFO - 2026-03-24 15:01:18 --> [REQ_ID=d615a0ecab72] [PERF] Execution time=0.679199
DEBUG - 2026-03-24 15:01:22 --> [REQ_ID=549b7caa2752] [REQUEST][START] HEAD /
DEBUG - 2026-03-24 15:01:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-24 15:01:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-24 15:01:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-24 15:01:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-24 15:01:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-24 15:10:24 --> [REQ_ID=309ce32fe25d] [REQUEST][START] GET /index.php/Management/Partners
DEBUG - 2026-03-24 15:10:24 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-24 15:10:24 --> [REQ_ID=309ce32fe25d] [FILTER_BEFORE] /index.php/Management/Partners
DEBUG - 2026-03-24 15:10:24 --> [REQ_ID=309ce32fe25d] [ROUTE] Controller=\App\Modules\Management\Controllers\PartnersController Method=index
DEBUG - 2026-03-24 15:10:24 --> [REQ_ID=309ce32fe25d] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Management/Partners
DEBUG - 2026-03-24 15:10:24 --> [CSRF] token name=csrf_test_name hash=ae984ec5a000d7fefae39a6e5761fa54
DEBUG - 2026-03-24 15:10:24 --> [REQ_ID=309ce32fe25d] [REQUEST][END]
INFO - 2026-03-24 15:10:24 --> [REQ_ID=309ce32fe25d] [PERF] Execution time=0.067573
DEBUG - 2026-03-24 15:10:24 --> [REQ_ID=c917acb6e2f9] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-24 15:10:24 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-24 15:10:24 --> [REQ_ID=c917acb6e2f9] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-24 15:10:24 --> [REQ_ID=c917acb6e2f9] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-24 15:10:24 --> [REQ_ID=c917acb6e2f9] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-24 15:10:24 --> [CSRF] token name=csrf_test_name hash=0ae9989a4f0ac52e1091c2c8fff54039
DEBUG - 2026-03-24 15:10:24 --> [REQ_ID=acc3d2c43750] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-24 15:10:24 --> [REQ_ID=acc3d2c43750] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-24 15:10:24 --> [REQ_ID=c917acb6e2f9] [FILTER_AFTER]
DEBUG - 2026-03-24 15:10:24 --> [REQ_ID=c917acb6e2f9] [LIFECYCLE][END] status=200 duration_ms=63.58 memory_delta=0
INFO - 2026-03-24 15:10:24 --> [REQ_ID=acc3d2c43750] [PERF] Execution time=0.063399
DEBUG - 2026-03-24 15:10:24 --> [REQ_ID=c917acb6e2f9] [REQUEST][END]
INFO - 2026-03-24 15:10:24 --> [REQ_ID=c917acb6e2f9] [PERF] Execution time=0.080035
DEBUG - 2026-03-24 15:11:22 --> [REQ_ID=89cbd6e6f92b] [REQUEST][START] HEAD /
DEBUG - 2026-03-24 15:11:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-24 15:11:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-24 15:11:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-24 15:11:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-24 15:11:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-24 15:15:01 --> [REQ_ID=e550202234fa] [REQUEST][START] GET /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-24 15:15:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-24 15:15:01 --> [REQ_ID=e550202234fa] [FILTER_BEFORE] /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-24 15:15:01 --> [REQ_ID=e550202234fa] [ROUTE] Controller=\App\Modules\APIs\Controllers\AlertsAPIController Method=fetchEmailAlerts
DEBUG - 2026-03-24 15:15:01 --> [REQ_ID=e550202234fa] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-24 15:15:01 --> [REQ_ID=e550202234fa] [REQUEST][END]
INFO - 2026-03-24 15:15:01 --> [REQ_ID=e550202234fa] [PERF] Execution time=0.046153
DEBUG - 2026-03-24 15:26:22 --> [REQ_ID=cf01ccb1c540] [REQUEST][START] HEAD /
DEBUG - 2026-03-24 15:26:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-24 15:26:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-24 15:26:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-24 15:26:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-24 15:26:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-24 15:41:22 --> [REQ_ID=1bd91d670cbb] [REQUEST][START] HEAD /
DEBUG - 2026-03-24 15:41:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-24 15:41:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-24 15:41:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-24 15:41:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-24 15:41:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-24 15:46:22 --> [REQ_ID=7789d89bd56c] [REQUEST][START] HEAD /
DEBUG - 2026-03-24 15:46:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-24 15:46:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-24 15:46:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-24 15:46:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-24 15:46:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-24 15:51:22 --> [REQ_ID=93648f089c24] [REQUEST][START] HEAD /
DEBUG - 2026-03-24 15:51:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-24 15:51:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-24 15:51:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-24 15:51:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-24 15:51:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-24 15:56:22 --> [REQ_ID=8125737cdc8f] [REQUEST][START] HEAD /
DEBUG - 2026-03-24 15:56:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-24 15:56:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-24 15:56:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-24 15:56:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-24 15:56:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-24 16:00:01 --> [REQ_ID=7388ee973854] [REQUEST][START] GET /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-24 16:00:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-24 16:00:01 --> [REQ_ID=7388ee973854] [FILTER_BEFORE] /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-24 16:00:01 --> [REQ_ID=7388ee973854] [ROUTE] Controller=\App\Modules\Management\Controllers\ManagementAPIController Method=Run_CRON_Tasks
DEBUG - 2026-03-24 16:00:01 --> [REQ_ID=7388ee973854] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-24 16:00:01 --> [REQ_ID=7388ee973854] [REQUEST][END]
INFO - 2026-03-24 16:00:01 --> [REQ_ID=7388ee973854] [PERF] Execution time=0.042632
DEBUG - 2026-03-24 16:01:22 --> [REQ_ID=ab6edcb82aa4] [REQUEST][START] HEAD /
DEBUG - 2026-03-24 16:01:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-24 16:01:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-24 16:01:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-24 16:01:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-24 16:01:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-24 16:06:22 --> [REQ_ID=41d6f6d0fbbd] [REQUEST][START] HEAD /
DEBUG - 2026-03-24 16:06:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-24 16:06:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-24 16:06:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-24 16:06:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-24 16:06:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-24 16:11:22 --> [REQ_ID=a2a480143a41] [REQUEST][START] HEAD /
DEBUG - 2026-03-24 16:11:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-24 16:11:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-24 16:11:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-24 16:11:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-24 16:11:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-24 16:15:01 --> [REQ_ID=4c8244340e0e] [REQUEST][START] GET /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-24 16:15:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-24 16:15:01 --> [REQ_ID=4c8244340e0e] [FILTER_BEFORE] /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-24 16:15:01 --> [REQ_ID=4c8244340e0e] [ROUTE] Controller=\App\Modules\APIs\Controllers\AlertsAPIController Method=fetchEmailAlerts
DEBUG - 2026-03-24 16:15:01 --> [REQ_ID=4c8244340e0e] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-24 16:15:01 --> [REQ_ID=4c8244340e0e] [REQUEST][END]
INFO - 2026-03-24 16:15:01 --> [REQ_ID=4c8244340e0e] [PERF] Execution time=0.045473
DEBUG - 2026-03-24 16:16:22 --> [REQ_ID=1e0124e78d4a] [REQUEST][START] HEAD /
DEBUG - 2026-03-24 16:16:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-24 16:16:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-24 16:16:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-24 16:16:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-24 16:16:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-24 16:19:18 --> [REQ_ID=0bda700ed5f6] [REQUEST][START] GET /
DEBUG - 2026-03-24 16:19:18 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-24 16:19:18 --> [REQ_ID=0bda700ed5f6] [FILTER_BEFORE] /
DEBUG - 2026-03-24 16:19:18 --> [REQ_ID=0bda700ed5f6] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-24 16:19:18 --> [REQ_ID=0bda700ed5f6] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-24 16:19:18 --> [CSRF] token name=csrf_test_name hash=735d5b5b99f90fe58d1679577e47f259
DEBUG - 2026-03-24 16:19:18 --> [REQ_ID=60495ad73ceb] [INIT] App\Controllers\Home::GET
INFO - 2026-03-24 16:19:18 --> [REQ_ID=60495ad73ceb] [MEMORY][controller-start] 6291456
INFO - 2026-03-24 16:19:18 --> [REQ_ID=60495ad73ceb] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-24 16:19:18 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-24 16:19:19 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-03-24 16:19:19 --> [REQ_ID=60495ad73ceb] [VIEW_RENDER] themes/public/home
INFO - 2026-03-24 16:19:19 --> [REQ_ID=60495ad73ceb] [MEMORY][commonData:start] 10485760
INFO - 2026-03-24 16:19:19 --> themesMemory usage: 10485760
DEBUG - 2026-03-24 16:19:19 --> [MetaService] slug= pageName=Home cacheHit= path=DB
DEBUG - 2026-03-24 16:19:19 --> [REQ_ID=0bda700ed5f6] [FILTER_AFTER]
DEBUG - 2026-03-24 16:19:19 --> [REQ_ID=0bda700ed5f6] [LIFECYCLE][END] status=200 duration_ms=1,050.24 memory_delta=4194304
INFO - 2026-03-24 16:19:19 --> [REQ_ID=60495ad73ceb] [PERF] Execution time=1.048496
DEBUG - 2026-03-24 16:19:19 --> [REQ_ID=0bda700ed5f6] [REQUEST][END]
INFO - 2026-03-24 16:19:19 --> [REQ_ID=0bda700ed5f6] [PERF] Execution time=1.088200
DEBUG - 2026-03-24 16:21:22 --> [REQ_ID=5a3e79cabf6a] [REQUEST][START] HEAD /
DEBUG - 2026-03-24 16:21:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-24 16:21:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-24 16:21:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-24 16:21:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-24 16:21:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-24 16:26:22 --> [REQ_ID=f9cfd4c0d38f] [REQUEST][START] HEAD /
DEBUG - 2026-03-24 16:26:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-24 16:26:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-24 16:26:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-24 16:26:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-24 16:26:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-24 16:31:15 --> [REQ_ID=5e2b3ceeecd0] [REQUEST][START] GET /index.php/Premium-Features/Advanced-Trade-Tracker
DEBUG - 2026-03-24 16:31:15 --> [REQ_ID=f91239a04231] [REQUEST][START] GET /index.php/Premium-Features/Due-Diligence-Database
DEBUG - 2026-03-24 16:31:15 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-24 16:31:15 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
INFO - 2026-03-24 16:31:15 --> REDIRECTED ROUTE at https://www.mymiwallet.com/Investments/Trade-Tracker
INFO - 2026-03-24 16:31:15 --> REDIRECTED ROUTE at https://www.mymiwallet.com/Features/Brokerage-Integrations
DEBUG - 2026-03-24 16:31:15 --> [REQ_ID=5e2b3ceeecd0] [REQUEST][END]
INFO - 2026-03-24 16:31:15 --> [REQ_ID=5e2b3ceeecd0] [PERF] Execution time=0.054271
DEBUG - 2026-03-24 16:31:15 --> [REQ_ID=f91239a04231] [REQUEST][END]
INFO - 2026-03-24 16:31:15 --> [REQ_ID=f91239a04231] [PERF] Execution time=0.055441
DEBUG - 2026-03-24 16:31:22 --> [REQ_ID=75c5427a1360] [REQUEST][START] HEAD /
DEBUG - 2026-03-24 16:31:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-24 16:31:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-24 16:31:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-24 16:31:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-24 16:31:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-24 16:33:24 --> [REQ_ID=35c97f26a747] [REQUEST][START] GET /
DEBUG - 2026-03-24 16:33:24 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-24 16:33:24 --> [REQ_ID=35c97f26a747] [FILTER_BEFORE] /
DEBUG - 2026-03-24 16:33:24 --> [REQ_ID=35c97f26a747] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-24 16:33:24 --> [REQ_ID=35c97f26a747] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-24 16:33:24 --> [CSRF] token name=csrf_test_name hash=debd0dc28f64e0cbfcaf6c5cafc6f805
DEBUG - 2026-03-24 16:33:24 --> [REQ_ID=210d3c62c448] [INIT] App\Controllers\Home::GET
INFO - 2026-03-24 16:33:24 --> [REQ_ID=210d3c62c448] [MEMORY][controller-start] 6291456
INFO - 2026-03-24 16:33:24 --> [REQ_ID=210d3c62c448] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-24 16:33:24 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-24 16:33:24 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
DEBUG - 2026-03-24 16:33:24 --> [REQ_ID=210d3c62c448] [VIEW_RENDER] themes/public/home
INFO - 2026-03-24 16:33:24 --> [REQ_ID=210d3c62c448] [MEMORY][commonData:start] 10485760
INFO - 2026-03-24 16:33:24 --> themesMemory usage: 10485760
DEBUG - 2026-03-24 16:33:24 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-24 16:33:24 --> [REQ_ID=35c97f26a747] [FILTER_AFTER]
DEBUG - 2026-03-24 16:33:24 --> [REQ_ID=35c97f26a747] [LIFECYCLE][END] status=200 duration_ms=650.66 memory_delta=4194304
INFO - 2026-03-24 16:33:24 --> [REQ_ID=210d3c62c448] [PERF] Execution time=0.648744
DEBUG - 2026-03-24 16:33:24 --> [REQ_ID=35c97f26a747] [REQUEST][END]
INFO - 2026-03-24 16:33:24 --> [REQ_ID=35c97f26a747] [PERF] Execution time=0.688439
DEBUG - 2026-03-24 16:36:22 --> [REQ_ID=e0f5a616425d] [REQUEST][START] HEAD /
DEBUG - 2026-03-24 16:36:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-24 16:36:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-24 16:36:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-24 16:36:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-24 16:36:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-24 16:36:59 --> [REQ_ID=668427f21420] [REQUEST][START] GET /index.php/How-It-Works/Personal-Budgeting
DEBUG - 2026-03-24 16:36:59 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-24 16:36:59 --> [REQ_ID=668427f21420] [REQUEST][END]
INFO - 2026-03-24 16:36:59 --> [REQ_ID=668427f21420] [PERF] Execution time=0.021373
DEBUG - 2026-03-24 16:37:20 --> [REQ_ID=8296b7e6dd70] [REQUEST][START] GET /
DEBUG - 2026-03-24 16:37:20 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-24 16:37:20 --> [REQ_ID=8296b7e6dd70] [FILTER_BEFORE] /
DEBUG - 2026-03-24 16:37:20 --> [REQ_ID=8296b7e6dd70] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-24 16:37:20 --> [REQ_ID=8296b7e6dd70] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-24 16:37:20 --> [CSRF] token name=csrf_test_name hash=69fd684e05128e1aaccd78d6d169edc8
DEBUG - 2026-03-24 16:37:20 --> [REQ_ID=12cbe83ac67e] [INIT] App\Controllers\Home::GET
INFO - 2026-03-24 16:37:20 --> [REQ_ID=12cbe83ac67e] [MEMORY][controller-start] 4194304
INFO - 2026-03-24 16:37:20 --> [REQ_ID=12cbe83ac67e] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-24 16:37:20 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-24 16:37:21 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-03-24 16:37:21 --> [REQ_ID=12cbe83ac67e] [VIEW_RENDER] themes/public/home
INFO - 2026-03-24 16:37:21 --> [REQ_ID=12cbe83ac67e] [MEMORY][commonData:start] 8388608
INFO - 2026-03-24 16:37:21 --> themesMemory usage: 8388608
DEBUG - 2026-03-24 16:37:21 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-24 16:37:21 --> [REQ_ID=8296b7e6dd70] [FILTER_AFTER]
DEBUG - 2026-03-24 16:37:21 --> [REQ_ID=8296b7e6dd70] [LIFECYCLE][END] status=200 duration_ms=573.91 memory_delta=4194304
INFO - 2026-03-24 16:37:21 --> [REQ_ID=12cbe83ac67e] [PERF] Execution time=0.571751
DEBUG - 2026-03-24 16:37:21 --> [REQ_ID=8296b7e6dd70] [REQUEST][END]
INFO - 2026-03-24 16:37:21 --> [REQ_ID=8296b7e6dd70] [PERF] Execution time=0.584652
DEBUG - 2026-03-24 16:41:22 --> [REQ_ID=cc5394e688e8] [REQUEST][START] HEAD /
DEBUG - 2026-03-24 16:41:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-24 16:41:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-24 16:41:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-24 16:41:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-24 16:41:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-24 16:46:22 --> [REQ_ID=25d249d134ef] [REQUEST][START] HEAD /
DEBUG - 2026-03-24 16:46:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-24 16:46:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-24 16:46:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-24 16:46:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-24 16:46:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-24 16:51:22 --> [REQ_ID=08e5996fdb19] [REQUEST][START] HEAD /
DEBUG - 2026-03-24 16:51:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-24 16:51:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-24 16:51:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-24 16:51:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-24 16:51:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-24 16:54:54 --> [REQ_ID=7437529f0220] [REQUEST][START] GET /
DEBUG - 2026-03-24 16:54:54 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-24 16:54:54 --> [REQ_ID=7437529f0220] [REQUEST][END]
INFO - 2026-03-24 16:54:54 --> [REQ_ID=7437529f0220] [PERF] Execution time=0.051874
DEBUG - 2026-03-24 16:56:22 --> [REQ_ID=0219bac35bb9] [REQUEST][START] HEAD /
DEBUG - 2026-03-24 16:56:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-24 16:56:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-24 16:56:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-24 16:56:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-24 16:56:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-24 17:00:01 --> [REQ_ID=c8f2f49e21bc] [REQUEST][START] GET /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-24 17:00:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-24 17:00:01 --> [REQ_ID=c8f2f49e21bc] [FILTER_BEFORE] /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-24 17:00:01 --> [REQ_ID=c8f2f49e21bc] [ROUTE] Controller=\App\Modules\Management\Controllers\ManagementAPIController Method=Run_CRON_Tasks
DEBUG - 2026-03-24 17:00:01 --> [REQ_ID=c8f2f49e21bc] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-24 17:00:01 --> [REQ_ID=c8f2f49e21bc] [REQUEST][END]
INFO - 2026-03-24 17:00:01 --> [REQ_ID=c8f2f49e21bc] [PERF] Execution time=0.051825
DEBUG - 2026-03-24 17:00:42 --> [REQ_ID=1eb7617dd264] [REQUEST][START] GET /
DEBUG - 2026-03-24 17:00:42 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-24 17:00:42 --> [REQ_ID=1eb7617dd264] [FILTER_BEFORE] /
DEBUG - 2026-03-24 17:00:42 --> [REQ_ID=1eb7617dd264] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-24 17:00:42 --> [REQ_ID=1eb7617dd264] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-24 17:00:42 --> [CSRF] token name=csrf_test_name hash=4baa843084f5b52af36d97b1cc206a41
DEBUG - 2026-03-24 17:00:42 --> [REQ_ID=8c4ef58f7e3c] [INIT] App\Controllers\Home::GET
INFO - 2026-03-24 17:00:42 --> [REQ_ID=8c4ef58f7e3c] [MEMORY][controller-start] 4194304
INFO - 2026-03-24 17:00:42 --> [REQ_ID=8c4ef58f7e3c] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-24 17:00:42 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-24 17:00:43 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-03-24 17:00:43 --> [REQ_ID=8c4ef58f7e3c] [VIEW_RENDER] themes/public/home
INFO - 2026-03-24 17:00:43 --> [REQ_ID=8c4ef58f7e3c] [MEMORY][commonData:start] 8388608
INFO - 2026-03-24 17:00:43 --> themesMemory usage: 8388608
DEBUG - 2026-03-24 17:00:43 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-24 17:00:43 --> [REQ_ID=1eb7617dd264] [FILTER_AFTER]
DEBUG - 2026-03-24 17:00:43 --> [REQ_ID=1eb7617dd264] [LIFECYCLE][END] status=200 duration_ms=550.63 memory_delta=4194304
INFO - 2026-03-24 17:00:43 --> [REQ_ID=8c4ef58f7e3c] [PERF] Execution time=0.548985
DEBUG - 2026-03-24 17:00:43 --> [REQ_ID=1eb7617dd264] [REQUEST][END]
INFO - 2026-03-24 17:00:43 --> [REQ_ID=1eb7617dd264] [PERF] Execution time=0.567240
DEBUG - 2026-03-24 17:01:22 --> [REQ_ID=8bec18bb1551] [REQUEST][START] HEAD /
DEBUG - 2026-03-24 17:01:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-24 17:01:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-24 17:01:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-24 17:01:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-24 17:01:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-24 17:04:51 --> [REQ_ID=8ba49e51a8d9] [REQUEST][START] GET /index.php/Management/Marketing/Campaigns
DEBUG - 2026-03-24 17:04:51 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-24 17:04:51 --> [REQ_ID=8ba49e51a8d9] [REQUEST][END]
INFO - 2026-03-24 17:04:51 --> [REQ_ID=8ba49e51a8d9] [PERF] Execution time=0.063244
DEBUG - 2026-03-24 17:05:45 --> [REQ_ID=e515ebe27e67] [REQUEST][START] GET /index.php/Wallets/Purchase/Memberships
DEBUG - 2026-03-24 17:05:45 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-24 17:05:45 --> [REQ_ID=e515ebe27e67] [FILTER_BEFORE] /index.php/Wallets/Purchase/Memberships
DEBUG - 2026-03-24 17:05:45 --> [REQ_ID=e515ebe27e67] [ROUTE] Controller=\App\Modules\User\Controllers\WalletsController Method=purchase
DEBUG - 2026-03-24 17:05:45 --> [REQ_ID=e515ebe27e67] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Wallets/Purchase/Memberships
DEBUG - 2026-03-24 17:05:45 --> [CSRF] token name=csrf_test_name hash=a3fb7a5692fa5dc67935fa4ccfc632d4
DEBUG - 2026-03-24 17:05:45 --> [REQ_ID=e515ebe27e67] [REQUEST][END]
INFO - 2026-03-24 17:05:45 --> [REQ_ID=e515ebe27e67] [PERF] Execution time=0.026529
DEBUG - 2026-03-24 17:05:45 --> [REQ_ID=96b2d60d3d0a] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-24 17:05:45 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-24 17:05:45 --> [REQ_ID=96b2d60d3d0a] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-24 17:05:45 --> [REQ_ID=96b2d60d3d0a] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-24 17:05:45 --> [REQ_ID=96b2d60d3d0a] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-24 17:05:45 --> [CSRF] token name=csrf_test_name hash=1f80798b7da454ab154a9562cfe163ea
DEBUG - 2026-03-24 17:05:45 --> [REQ_ID=185e468d2b4b] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-24 17:05:45 --> [REQ_ID=185e468d2b4b] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-24 17:05:45 --> [REQ_ID=96b2d60d3d0a] [FILTER_AFTER]
DEBUG - 2026-03-24 17:05:45 --> [REQ_ID=96b2d60d3d0a] [LIFECYCLE][END] status=200 duration_ms=203.28 memory_delta=0
INFO - 2026-03-24 17:05:45 --> [REQ_ID=185e468d2b4b] [PERF] Execution time=0.203083
DEBUG - 2026-03-24 17:05:45 --> [REQ_ID=96b2d60d3d0a] [REQUEST][END]
INFO - 2026-03-24 17:05:45 --> [REQ_ID=96b2d60d3d0a] [PERF] Execution time=0.214620
DEBUG - 2026-03-24 17:05:46 --> [REQ_ID=1db9e8b9af25] [REQUEST][START] GET /index.php/Account/Notifications
DEBUG - 2026-03-24 17:05:46 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-24 17:05:46 --> [REQ_ID=1db9e8b9af25] [FILTER_BEFORE] /index.php/Account/Notifications
DEBUG - 2026-03-24 17:05:46 --> [REQ_ID=1db9e8b9af25] [ROUTE] Controller=\App\Modules\User\Controllers\DashboardController Method=notifications
DEBUG - 2026-03-24 17:05:46 --> [REQ_ID=1db9e8b9af25] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Account/Notifications
DEBUG - 2026-03-24 17:05:46 --> [CSRF] token name=csrf_test_name hash=b0b6ffda1f2aa922326654145bde957e
DEBUG - 2026-03-24 17:05:46 --> [REQ_ID=1db9e8b9af25] [REQUEST][END]
INFO - 2026-03-24 17:05:46 --> [REQ_ID=1db9e8b9af25] [PERF] Execution time=0.037819
DEBUG - 2026-03-24 17:05:46 --> [REQ_ID=7a85b4a4c1c4] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-24 17:05:46 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-24 17:05:46 --> [REQ_ID=7a85b4a4c1c4] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-24 17:05:46 --> [REQ_ID=7a85b4a4c1c4] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-24 17:05:46 --> [REQ_ID=7a85b4a4c1c4] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-24 17:05:46 --> [CSRF] token name=csrf_test_name hash=e48cfe3ca1209cdbe219ef0943390ea3
DEBUG - 2026-03-24 17:05:46 --> [REQ_ID=bcf67763786e] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-24 17:05:46 --> [REQ_ID=bcf67763786e] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-24 17:05:46 --> [REQ_ID=7a85b4a4c1c4] [FILTER_AFTER]
DEBUG - 2026-03-24 17:05:46 --> [REQ_ID=7a85b4a4c1c4] [LIFECYCLE][END] status=200 duration_ms=21.10 memory_delta=0
INFO - 2026-03-24 17:05:46 --> [REQ_ID=bcf67763786e] [PERF] Execution time=0.024594
DEBUG - 2026-03-24 17:05:46 --> [REQ_ID=7a85b4a4c1c4] [REQUEST][END]
INFO - 2026-03-24 17:05:46 --> [REQ_ID=7a85b4a4c1c4] [PERF] Execution time=0.047247
DEBUG - 2026-03-24 17:05:46 --> [REQ_ID=34f8fa812683] [REQUEST][START] GET /index.php/Account
DEBUG - 2026-03-24 17:05:46 --> [REQ_ID=9883774df5da] [REQUEST][START] GET /index.php/Exchange/Solana
DEBUG - 2026-03-24 17:05:46 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-24 17:05:46 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-24 17:05:46 --> [REQ_ID=34f8fa812683] [FILTER_BEFORE] /index.php/Account
DEBUG - 2026-03-24 17:05:46 --> [REQ_ID=34f8fa812683] [ROUTE] Controller=\App\Modules\User\Controllers\DashboardController Method=account
DEBUG - 2026-03-24 17:05:46 --> [REQ_ID=34f8fa812683] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Account
DEBUG - 2026-03-24 17:05:46 --> [CSRF] token name=csrf_test_name hash=52c62bdf43b4a8de5e7908a987a29440
DEBUG - 2026-03-24 17:05:46 --> [REQ_ID=be12b51d89d2] [REQUEST][START] GET /index.php/Account/Social-Media
DEBUG - 2026-03-24 17:05:46 --> [REQ_ID=34f8fa812683] [REQUEST][END]
INFO - 2026-03-24 17:05:46 --> [REQ_ID=34f8fa812683] [PERF] Execution time=0.084244
DEBUG - 2026-03-24 17:05:46 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-24 17:05:46 --> [REQ_ID=9883774df5da] [FILTER_BEFORE] /index.php/Exchange/Solana
DEBUG - 2026-03-24 17:05:46 --> [REQ_ID=9883774df5da] [ROUTE] Controller=\App\Modules\Exchange\Controllers\SolanaController Method=index
DEBUG - 2026-03-24 17:05:46 --> [REQ_ID=9883774df5da] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Exchange/Solana
DEBUG - 2026-03-24 17:05:46 --> [CSRF] token name=csrf_test_name hash=550582ecb094b468258bc71672d84d2b
DEBUG - 2026-03-24 17:05:46 --> [REQ_ID=d0d05e132265] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-24 17:05:46 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-24 17:05:46 --> [REQ_ID=be12b51d89d2] [FILTER_BEFORE] /index.php/Account/Social-Media
DEBUG - 2026-03-24 17:05:46 --> [REQ_ID=be12b51d89d2] [ROUTE] Controller=\App\Modules\User\Controllers\DashboardController Method=SocialMedia
DEBUG - 2026-03-24 17:05:46 --> [REQ_ID=be12b51d89d2] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Account/Social-Media
DEBUG - 2026-03-24 17:05:46 --> [REQ_ID=d0d05e132265] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-24 17:05:46 --> [REQ_ID=d0d05e132265] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-24 17:05:46 --> [REQ_ID=d0d05e132265] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-24 17:05:46 --> [CSRF] token name=csrf_test_name hash=17a455fcb1bbf6a0dfcd2657a87f17f9
DEBUG - 2026-03-24 17:05:46 --> [REQ_ID=5e05a5012ab1] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-24 17:05:46 --> [REQ_ID=5e05a5012ab1] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-24 17:05:46 --> [REQ_ID=9883774df5da] [REQUEST][END]
INFO - 2026-03-24 17:05:46 --> [REQ_ID=9883774df5da] [PERF] Execution time=0.136462
DEBUG - 2026-03-24 17:05:46 --> [CSRF] token name=csrf_test_name hash=0f4fa21bc91bcb4a8d3a09670a9848a3
DEBUG - 2026-03-24 17:05:46 --> [REQ_ID=858d1b724011] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-24 17:05:46 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-24 17:05:46 --> [REQ_ID=be12b51d89d2] [REQUEST][END]
INFO - 2026-03-24 17:05:46 --> [REQ_ID=be12b51d89d2] [PERF] Execution time=0.094403
DEBUG - 2026-03-24 17:05:46 --> [REQ_ID=858d1b724011] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-24 17:05:46 --> [REQ_ID=858d1b724011] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-24 17:05:46 --> [REQ_ID=858d1b724011] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-24 17:05:46 --> [CSRF] token name=csrf_test_name hash=6b40c870c818cd24f44a9ddb5cea5965
DEBUG - 2026-03-24 17:05:46 --> [REQ_ID=f7172485cf60] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-24 17:05:46 --> [REQ_ID=f7172485cf60] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-24 17:05:46 --> [REQ_ID=bc48b6a30df2] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-24 17:05:46 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-24 17:05:46 --> [REQ_ID=d0d05e132265] [FILTER_AFTER]
DEBUG - 2026-03-24 17:05:46 --> [REQ_ID=d0d05e132265] [LIFECYCLE][END] status=200 duration_ms=53.47 memory_delta=0
INFO - 2026-03-24 17:05:46 --> [REQ_ID=5e05a5012ab1] [PERF] Execution time=0.051945
DEBUG - 2026-03-24 17:05:46 --> [REQ_ID=d0d05e132265] [REQUEST][END]
INFO - 2026-03-24 17:05:46 --> [REQ_ID=d0d05e132265] [PERF] Execution time=0.087652
DEBUG - 2026-03-24 17:05:46 --> [REQ_ID=bc48b6a30df2] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-24 17:05:46 --> [REQ_ID=bc48b6a30df2] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-24 17:05:46 --> [REQ_ID=bc48b6a30df2] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-24 17:05:46 --> [CSRF] token name=csrf_test_name hash=38547d41e894c6de12c0f62a9b046bb4
DEBUG - 2026-03-24 17:05:46 --> [REQ_ID=ef1d8ed9122d] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-24 17:05:46 --> [REQ_ID=ef1d8ed9122d] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-24 17:05:46 --> [REQ_ID=858d1b724011] [FILTER_AFTER]
DEBUG - 2026-03-24 17:05:46 --> [REQ_ID=858d1b724011] [LIFECYCLE][END] status=200 duration_ms=36.98 memory_delta=0
INFO - 2026-03-24 17:05:46 --> [REQ_ID=f7172485cf60] [PERF] Execution time=0.036461
DEBUG - 2026-03-24 17:05:46 --> [REQ_ID=858d1b724011] [REQUEST][END]
INFO - 2026-03-24 17:05:46 --> [REQ_ID=858d1b724011] [PERF] Execution time=0.060080
DEBUG - 2026-03-24 17:05:46 --> [REQ_ID=bc48b6a30df2] [FILTER_AFTER]
DEBUG - 2026-03-24 17:05:46 --> [REQ_ID=bc48b6a30df2] [LIFECYCLE][END] status=200 duration_ms=30.34 memory_delta=0
INFO - 2026-03-24 17:05:46 --> [REQ_ID=ef1d8ed9122d] [PERF] Execution time=0.029764
DEBUG - 2026-03-24 17:05:46 --> [REQ_ID=bc48b6a30df2] [REQUEST][END]
INFO - 2026-03-24 17:05:46 --> [REQ_ID=bc48b6a30df2] [PERF] Execution time=0.050099
DEBUG - 2026-03-24 17:05:51 --> [REQ_ID=3bda9425dfe5] [REQUEST][START] GET /index.php/Support
DEBUG - 2026-03-24 17:05:51 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-24 17:05:51 --> [REQ_ID=3bda9425dfe5] [FILTER_BEFORE] /index.php/Support
DEBUG - 2026-03-24 17:05:51 --> [REQ_ID=3bda9425dfe5] [ROUTE] Controller=\App\Modules\Support\Controllers\SupportController Method=index
DEBUG - 2026-03-24 17:05:51 --> [REQ_ID=3bda9425dfe5] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Support
DEBUG - 2026-03-24 17:05:51 --> [CSRF] token name=csrf_test_name hash=c97f5cd0a232b937e2722f96b2a63dbe
DEBUG - 2026-03-24 17:05:51 --> [REQ_ID=aca9afb8a1bd] [INIT] App\Modules\Support\Controllers\SupportController::GET
INFO - 2026-03-24 17:05:51 --> [REQ_ID=aca9afb8a1bd] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-24 17:05:51 --> [REQ_ID=aca9afb8a1bd] [METHOD_ENTRY] index
DEBUG - 2026-03-24 17:05:51 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-24 17:05:51 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-24 17:05:51 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-24 17:05:51 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-24 17:05:51 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-24 17:05:51 --> MyMICoin: guest context detected; skipping user-specific preload.
INFO - 2026-03-24 17:05:51 --> [REQ_ID=aca9afb8a1bd] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-24 17:05:51 --> [REQ_ID=aca9afb8a1bd] [VIEW_RENDER] SupportModule\Views\Support\index
INFO - 2026-03-24 17:05:51 --> [REQ_ID=aca9afb8a1bd] [MEMORY][commonData:start] 6291456
INFO - 2026-03-24 17:05:51 --> themesMemory usage: 6291456
DEBUG - 2026-03-24 17:05:51 --> [REQ_ID=3bda9425dfe5] [FILTER_AFTER]
DEBUG - 2026-03-24 17:05:51 --> [REQ_ID=3bda9425dfe5] [LIFECYCLE][END] status=200 duration_ms=174.05 memory_delta=2097152
INFO - 2026-03-24 17:05:51 --> [REQ_ID=aca9afb8a1bd] [PERF] Execution time=0.173801
DEBUG - 2026-03-24 17:05:51 --> [REQ_ID=3bda9425dfe5] [REQUEST][END]
INFO - 2026-03-24 17:05:51 --> [REQ_ID=3bda9425dfe5] [PERF] Execution time=0.185855
DEBUG - 2026-03-24 17:05:56 --> [REQ_ID=87d008ad722b] [REQUEST][START] GET /index.php/
DEBUG - 2026-03-24 17:05:56 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-24 17:05:56 --> [REQ_ID=87d008ad722b] [FILTER_BEFORE] /index.php/
DEBUG - 2026-03-24 17:05:56 --> [REQ_ID=87d008ad722b] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-24 17:05:56 --> [REQ_ID=87d008ad722b] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-24 17:05:56 --> [CSRF] token name=csrf_test_name hash=e966cd765ddee2194df39d2d3bc222ef
DEBUG - 2026-03-24 17:05:56 --> [REQ_ID=27a0b8789962] [INIT] App\Controllers\Home::GET
INFO - 2026-03-24 17:05:56 --> [REQ_ID=27a0b8789962] [MEMORY][controller-start] 4194304
INFO - 2026-03-24 17:05:56 --> [REQ_ID=27a0b8789962] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-24 17:05:56 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-24 17:05:57 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
DEBUG - 2026-03-24 17:05:57 --> [REQ_ID=27a0b8789962] [VIEW_RENDER] themes/public/home
INFO - 2026-03-24 17:05:57 --> [REQ_ID=27a0b8789962] [MEMORY][commonData:start] 8388608
INFO - 2026-03-24 17:05:57 --> themesMemory usage: 8388608
DEBUG - 2026-03-24 17:05:57 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-24 17:05:57 --> [REQ_ID=87d008ad722b] [FILTER_AFTER]
DEBUG - 2026-03-24 17:05:57 --> [REQ_ID=87d008ad722b] [LIFECYCLE][END] status=200 duration_ms=540.59 memory_delta=4194304
INFO - 2026-03-24 17:05:57 --> [REQ_ID=27a0b8789962] [PERF] Execution time=0.540315
DEBUG - 2026-03-24 17:05:57 --> [REQ_ID=87d008ad722b] [REQUEST][END]
INFO - 2026-03-24 17:05:57 --> [REQ_ID=87d008ad722b] [PERF] Execution time=0.550578
DEBUG - 2026-03-24 17:06:22 --> [REQ_ID=228a8b185123] [REQUEST][START] HEAD /
DEBUG - 2026-03-24 17:06:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-24 17:06:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-24 17:06:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-24 17:06:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-24 17:06:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-24 17:11:22 --> [REQ_ID=49de7c6a578f] [REQUEST][START] HEAD /
DEBUG - 2026-03-24 17:11:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-24 17:11:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-24 17:11:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-24 17:11:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-24 17:11:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-24 17:15:01 --> [REQ_ID=a3705d26b175] [REQUEST][START] GET /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-24 17:15:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-24 17:15:01 --> [REQ_ID=a3705d26b175] [FILTER_BEFORE] /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-24 17:15:01 --> [REQ_ID=a3705d26b175] [ROUTE] Controller=\App\Modules\APIs\Controllers\AlertsAPIController Method=fetchEmailAlerts
DEBUG - 2026-03-24 17:15:01 --> [REQ_ID=a3705d26b175] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-24 17:15:01 --> [REQ_ID=a3705d26b175] [REQUEST][END]
INFO - 2026-03-24 17:15:01 --> [REQ_ID=a3705d26b175] [PERF] Execution time=0.046521
DEBUG - 2026-03-24 17:16:22 --> [REQ_ID=aee5061d3768] [REQUEST][START] HEAD /
DEBUG - 2026-03-24 17:16:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-24 17:16:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-24 17:16:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-24 17:16:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-24 17:16:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-24 17:21:11 --> [REQ_ID=24250f665f6d] [REQUEST][START] GET /index.php/Terms-Of-Service
DEBUG - 2026-03-24 17:21:11 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-24 17:21:11 --> [REQ_ID=24250f665f6d] [REQUEST][END]
INFO - 2026-03-24 17:21:11 --> [REQ_ID=24250f665f6d] [PERF] Execution time=0.038630
DEBUG - 2026-03-24 17:21:22 --> [REQ_ID=52a64a199bae] [REQUEST][START] HEAD /
DEBUG - 2026-03-24 17:21:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-24 17:21:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-24 17:21:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-24 17:21:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-24 17:21:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-24 17:26:22 --> [REQ_ID=28a8f4d7074a] [REQUEST][START] HEAD /
DEBUG - 2026-03-24 17:26:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-24 17:26:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-24 17:26:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-24 17:26:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-24 17:26:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-24 17:28:23 --> [REQ_ID=4206d8571d43] [REQUEST][START] GET /
DEBUG - 2026-03-24 17:28:23 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-24 17:28:23 --> [REQ_ID=4206d8571d43] [FILTER_BEFORE] /
DEBUG - 2026-03-24 17:28:23 --> [REQ_ID=4206d8571d43] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-24 17:28:23 --> [REQ_ID=4206d8571d43] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-24 17:28:23 --> [CSRF] token name=csrf_test_name hash=bf8d5c20e4eccc5d208d7fc68a1f2b86
DEBUG - 2026-03-24 17:28:23 --> [REQ_ID=fbc89a8b7482] [INIT] App\Controllers\Home::GET
INFO - 2026-03-24 17:28:23 --> [REQ_ID=fbc89a8b7482] [MEMORY][controller-start] 6291456
INFO - 2026-03-24 17:28:23 --> [REQ_ID=fbc89a8b7482] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-24 17:28:23 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-24 17:28:24 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-03-24 17:28:24 --> [REQ_ID=fbc89a8b7482] [VIEW_RENDER] themes/public/home
INFO - 2026-03-24 17:28:24 --> [REQ_ID=fbc89a8b7482] [MEMORY][commonData:start] 10485760
INFO - 2026-03-24 17:28:24 --> themesMemory usage: 10485760
DEBUG - 2026-03-24 17:28:24 --> [MetaService] slug= pageName=Home cacheHit= path=DB
DEBUG - 2026-03-24 17:28:24 --> [REQ_ID=4206d8571d43] [FILTER_AFTER]
DEBUG - 2026-03-24 17:28:24 --> [REQ_ID=4206d8571d43] [LIFECYCLE][END] status=200 duration_ms=756.19 memory_delta=4194304
INFO - 2026-03-24 17:28:24 --> [REQ_ID=fbc89a8b7482] [PERF] Execution time=0.754239
DEBUG - 2026-03-24 17:28:24 --> [REQ_ID=4206d8571d43] [REQUEST][END]
INFO - 2026-03-24 17:28:24 --> [REQ_ID=4206d8571d43] [PERF] Execution time=0.797776
DEBUG - 2026-03-24 17:28:33 --> [REQ_ID=274b1edf0030] [REQUEST][START] GET /
DEBUG - 2026-03-24 17:28:33 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-24 17:28:33 --> [REQ_ID=274b1edf0030] [FILTER_BEFORE] /
DEBUG - 2026-03-24 17:28:33 --> [REQ_ID=274b1edf0030] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-24 17:28:33 --> [REQ_ID=274b1edf0030] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-24 17:28:33 --> [CSRF] token name=csrf_test_name hash=bf8d5c20e4eccc5d208d7fc68a1f2b86
DEBUG - 2026-03-24 17:28:33 --> [REQ_ID=93c35425e59b] [INIT] App\Controllers\Home::GET
INFO - 2026-03-24 17:28:33 --> [REQ_ID=93c35425e59b] [MEMORY][controller-start] 6291456
INFO - 2026-03-24 17:28:34 --> [REQ_ID=93c35425e59b] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-24 17:28:34 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-24 17:28:34 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
DEBUG - 2026-03-24 17:28:34 --> [REQ_ID=93c35425e59b] [VIEW_RENDER] themes/public/home
INFO - 2026-03-24 17:28:34 --> [REQ_ID=93c35425e59b] [MEMORY][commonData:start] 8388608
INFO - 2026-03-24 17:28:34 --> themesMemory usage: 8388608
DEBUG - 2026-03-24 17:28:34 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-24 17:28:34 --> [REQ_ID=274b1edf0030] [FILTER_AFTER]
DEBUG - 2026-03-24 17:28:34 --> [REQ_ID=274b1edf0030] [LIFECYCLE][END] status=200 duration_ms=533.76 memory_delta=2097152
INFO - 2026-03-24 17:28:34 --> [REQ_ID=93c35425e59b] [PERF] Execution time=0.533268
DEBUG - 2026-03-24 17:28:34 --> [REQ_ID=274b1edf0030] [REQUEST][END]
INFO - 2026-03-24 17:28:34 --> [REQ_ID=274b1edf0030] [PERF] Execution time=0.544837
DEBUG - 2026-03-24 17:28:42 --> [REQ_ID=c6c4dd9a71fc] [REQUEST][START] GET /
DEBUG - 2026-03-24 17:28:42 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-24 17:28:42 --> [REQ_ID=c6c4dd9a71fc] [FILTER_BEFORE] /
DEBUG - 2026-03-24 17:28:42 --> [REQ_ID=c6c4dd9a71fc] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-24 17:28:42 --> [REQ_ID=c6c4dd9a71fc] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-24 17:28:42 --> [CSRF] token name=csrf_test_name hash=bf8d5c20e4eccc5d208d7fc68a1f2b86
DEBUG - 2026-03-24 17:28:42 --> [REQ_ID=8b67799f4125] [INIT] App\Controllers\Home::GET
INFO - 2026-03-24 17:28:42 --> [REQ_ID=8b67799f4125] [MEMORY][controller-start] 4194304
INFO - 2026-03-24 17:28:42 --> [REQ_ID=8b67799f4125] [MEMORY][commonData:start] 4194304
DEBUG - 2026-03-24 17:28:42 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-24 17:28:43 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
DEBUG - 2026-03-24 17:28:43 --> [REQ_ID=8b67799f4125] [VIEW_RENDER] themes/public/home
INFO - 2026-03-24 17:28:43 --> [REQ_ID=8b67799f4125] [MEMORY][commonData:start] 8388608
INFO - 2026-03-24 17:28:43 --> themesMemory usage: 8388608
DEBUG - 2026-03-24 17:28:43 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-24 17:28:43 --> [REQ_ID=c6c4dd9a71fc] [FILTER_AFTER]
DEBUG - 2026-03-24 17:28:43 --> [REQ_ID=c6c4dd9a71fc] [LIFECYCLE][END] status=200 duration_ms=619.24 memory_delta=4194304
INFO - 2026-03-24 17:28:43 --> [REQ_ID=8b67799f4125] [PERF] Execution time=0.618934
DEBUG - 2026-03-24 17:28:43 --> [REQ_ID=c6c4dd9a71fc] [REQUEST][END]
INFO - 2026-03-24 17:28:43 --> [REQ_ID=c6c4dd9a71fc] [PERF] Execution time=0.629923
DEBUG - 2026-03-24 17:31:22 --> [REQ_ID=5c6e3d75b24f] [REQUEST][START] HEAD /
DEBUG - 2026-03-24 17:31:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-24 17:31:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-24 17:31:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-24 17:31:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-24 17:31:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-24 17:34:26 --> [REQ_ID=2208695fae77] [REQUEST][START] GET /index.php
DEBUG - 2026-03-24 17:34:26 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-24 17:34:26 --> [REQ_ID=2208695fae77] [FILTER_BEFORE] /index.php
DEBUG - 2026-03-24 17:34:26 --> [REQ_ID=2208695fae77] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-24 17:34:26 --> [REQ_ID=2208695fae77] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-24 17:34:26 --> [CSRF] token name=csrf_test_name hash=caa400176b4fe4dc00228432837521ef
DEBUG - 2026-03-24 17:34:26 --> [REQ_ID=643f5f056021] [INIT] App\Controllers\Home::GET
INFO - 2026-03-24 17:34:26 --> [REQ_ID=643f5f056021] [MEMORY][controller-start] 6291456
INFO - 2026-03-24 17:34:26 --> [REQ_ID=643f5f056021] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-24 17:34:26 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-24 17:34:27 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
DEBUG - 2026-03-24 17:34:27 --> [REQ_ID=643f5f056021] [VIEW_RENDER] themes/public/home
INFO - 2026-03-24 17:34:27 --> [REQ_ID=643f5f056021] [MEMORY][commonData:start] 10485760
INFO - 2026-03-24 17:34:27 --> themesMemory usage: 10485760
DEBUG - 2026-03-24 17:34:27 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-24 17:34:27 --> [REQ_ID=2208695fae77] [FILTER_AFTER]
DEBUG - 2026-03-24 17:34:27 --> [REQ_ID=2208695fae77] [LIFECYCLE][END] status=200 duration_ms=616.26 memory_delta=4194304
INFO - 2026-03-24 17:34:27 --> [REQ_ID=643f5f056021] [PERF] Execution time=0.614128
DEBUG - 2026-03-24 17:34:27 --> [REQ_ID=2208695fae77] [REQUEST][END]
INFO - 2026-03-24 17:34:27 --> [REQ_ID=2208695fae77] [PERF] Execution time=0.658968
DEBUG - 2026-03-24 17:34:27 --> [REQ_ID=4c99a8a026fa] [REQUEST][START] GET /index.php/How-It-Works/Automated-Financial-Insights
DEBUG - 2026-03-24 17:34:27 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-24 17:34:27 --> [REQ_ID=4c99a8a026fa] [FILTER_BEFORE] /index.php/How-It-Works/Automated-Financial-Insights
DEBUG - 2026-03-24 17:34:27 --> [REQ_ID=4c99a8a026fa] [ROUTE] Controller=\App\Modules\Blog\Controllers\HowItWorksController Method=show
DEBUG - 2026-03-24 17:34:27 --> [REQ_ID=4c99a8a026fa] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/How-It-Works/Automated-Financial-Insights
DEBUG - 2026-03-24 17:34:27 --> [CSRF] token name=csrf_test_name hash=f183923886825f0638bc589cfbc9c2fc
DEBUG - 2026-03-24 17:34:27 --> [REQ_ID=75e2b1e9114a] [INIT] App\Modules\Blog\Controllers\HowItWorksController::GET
INFO - 2026-03-24 17:34:27 --> [REQ_ID=75e2b1e9114a] [MEMORY][controller-start] 6291456
DEBUG - 2026-03-24 17:34:27 --> [REQ_ID=75e2b1e9114a] [METHOD_ENTRY] show
DEBUG - 2026-03-24 17:34:27 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-24 17:34:27 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-24 17:34:27 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-24 17:34:27 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-24 17:34:27 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-24 17:34:27 --> MyMICoin: guest context detected; skipping user-specific preload.
ERROR - 2026-03-24 17:34:27 --> HowItWorksController failure: automated-financial-insights
CRITICAL - 2026-03-24 17:34:27 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: GET, Route: How-It-Works/Automated-Financial-Insights]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-24 17:34:27 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-24 17:34:27 --> [404] URI=https://www.mymiwallet.com/index.php/How-It-Works/Automated-Financial-Insights
WARNING - 2026-03-24 17:34:27 --> 404 route miss: https://www.mymiwallet.com/index.php/How-It-Works/Automated-Financial-Insights | referrer: none
ERROR - 2026-03-24 17:34:27 --> [ERROR_PAGE] event=error_404 status=404 message=Page not found.
INFO - 2026-03-24 17:34:28 --> [REQ_ID=75e2b1e9114a] [PERF] Execution time=0.064175
DEBUG - 2026-03-24 17:36:22 --> [REQ_ID=f0a0021caae0] [REQUEST][START] HEAD /
DEBUG - 2026-03-24 17:36:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-24 17:36:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-24 17:36:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-24 17:36:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-24 17:36:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-24 17:41:22 --> [REQ_ID=25b280a18545] [REQUEST][START] HEAD /
DEBUG - 2026-03-24 17:41:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-24 17:41:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-24 17:41:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-24 17:41:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-24 17:41:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-24 17:46:22 --> [REQ_ID=7cc0629afc9c] [REQUEST][START] HEAD /
DEBUG - 2026-03-24 17:46:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-24 17:46:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-24 17:46:23 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-24 17:46:23 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-24 17:46:23 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-24 17:51:22 --> [REQ_ID=00363e3dc5f7] [REQUEST][START] HEAD /
DEBUG - 2026-03-24 17:51:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-24 17:51:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-24 17:51:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-24 17:51:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-24 17:51:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-24 17:56:22 --> [REQ_ID=a5dab9ebf5f5] [REQUEST][START] HEAD /
DEBUG - 2026-03-24 17:56:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-24 17:56:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-24 17:56:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-24 17:56:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-24 17:56:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-24 18:00:02 --> [REQ_ID=aa2e9536c037] [REQUEST][START] GET /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-24 18:00:02 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-24 18:00:02 --> [REQ_ID=aa2e9536c037] [FILTER_BEFORE] /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-24 18:00:02 --> [REQ_ID=aa2e9536c037] [ROUTE] Controller=\App\Modules\Management\Controllers\ManagementAPIController Method=Run_CRON_Tasks
DEBUG - 2026-03-24 18:00:02 --> [REQ_ID=aa2e9536c037] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-24 18:00:02 --> [REQ_ID=aa2e9536c037] [REQUEST][END]
INFO - 2026-03-24 18:00:02 --> [REQ_ID=aa2e9536c037] [PERF] Execution time=0.050017
DEBUG - 2026-03-24 18:01:22 --> [REQ_ID=09a678589024] [REQUEST][START] HEAD /
DEBUG - 2026-03-24 18:01:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-24 18:01:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-24 18:01:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-24 18:01:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-24 18:01:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-24 18:06:22 --> [REQ_ID=11cefbc75c06] [REQUEST][START] HEAD /
DEBUG - 2026-03-24 18:06:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-24 18:06:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-24 18:06:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-24 18:06:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-24 18:06:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-24 18:11:22 --> [REQ_ID=32ef5ea093cc] [REQUEST][START] HEAD /
DEBUG - 2026-03-24 18:11:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-24 18:11:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-24 18:11:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-24 18:11:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-24 18:11:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-24 18:15:01 --> [REQ_ID=f0a55820da27] [REQUEST][START] GET /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-24 18:15:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-24 18:15:01 --> [REQ_ID=f0a55820da27] [FILTER_BEFORE] /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-24 18:15:01 --> [REQ_ID=f0a55820da27] [ROUTE] Controller=\App\Modules\APIs\Controllers\AlertsAPIController Method=fetchEmailAlerts
DEBUG - 2026-03-24 18:15:01 --> [REQ_ID=f0a55820da27] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-24 18:15:01 --> [REQ_ID=f0a55820da27] [REQUEST][END]
INFO - 2026-03-24 18:15:01 --> [REQ_ID=f0a55820da27] [PERF] Execution time=0.047649
DEBUG - 2026-03-24 18:16:22 --> [REQ_ID=ab8e62fb6762] [REQUEST][START] HEAD /
DEBUG - 2026-03-24 18:16:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-24 18:16:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-24 18:16:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-24 18:16:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-24 18:16:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-24 18:21:22 --> [REQ_ID=79cabc3fcfa0] [REQUEST][START] HEAD /
DEBUG - 2026-03-24 18:21:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-24 18:21:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-24 18:21:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-24 18:21:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-24 18:21:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-24 18:22:55 --> [REQ_ID=4859d4682106] [REQUEST][START] GET /
DEBUG - 2026-03-24 18:22:55 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-24 18:22:55 --> [REQ_ID=4859d4682106] [FILTER_BEFORE] /
DEBUG - 2026-03-24 18:22:55 --> [REQ_ID=4859d4682106] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-24 18:22:55 --> [REQ_ID=4859d4682106] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-24 18:22:55 --> [CSRF] token name=csrf_test_name hash=dd662d1fc71bad78bbd0c7697734d4e9
DEBUG - 2026-03-24 18:22:55 --> [REQ_ID=46fa9db2a9ef] [INIT] App\Controllers\Home::GET
INFO - 2026-03-24 18:22:55 --> [REQ_ID=46fa9db2a9ef] [MEMORY][controller-start] 6291456
INFO - 2026-03-24 18:22:56 --> [REQ_ID=46fa9db2a9ef] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-24 18:22:56 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-24 18:22:56 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-03-24 18:22:56 --> [REQ_ID=46fa9db2a9ef] [VIEW_RENDER] themes/public/home
INFO - 2026-03-24 18:22:56 --> [REQ_ID=46fa9db2a9ef] [MEMORY][commonData:start] 10485760
INFO - 2026-03-24 18:22:56 --> themesMemory usage: 10485760
DEBUG - 2026-03-24 18:22:56 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-24 18:22:56 --> [REQ_ID=4859d4682106] [FILTER_AFTER]
DEBUG - 2026-03-24 18:22:56 --> [REQ_ID=4859d4682106] [LIFECYCLE][END] status=200 duration_ms=689.20 memory_delta=4194304
INFO - 2026-03-24 18:22:56 --> [REQ_ID=46fa9db2a9ef] [PERF] Execution time=0.687188
DEBUG - 2026-03-24 18:22:56 --> [REQ_ID=4859d4682106] [REQUEST][END]
INFO - 2026-03-24 18:22:56 --> [REQ_ID=4859d4682106] [PERF] Execution time=0.737091
DEBUG - 2026-03-24 18:26:22 --> [REQ_ID=855bfb7c4c43] [REQUEST][START] HEAD /
DEBUG - 2026-03-24 18:26:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-24 18:26:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-24 18:26:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-24 18:26:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-24 18:26:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-24 18:26:25 --> [REQ_ID=09ab72842053] [REQUEST][START] GET /
DEBUG - 2026-03-24 18:26:25 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-24 18:26:25 --> [REQ_ID=09ab72842053] [REQUEST][END]
INFO - 2026-03-24 18:26:25 --> [REQ_ID=09ab72842053] [PERF] Execution time=0.024596
DEBUG - 2026-03-24 18:31:22 --> [REQ_ID=f59fd49cc421] [REQUEST][START] HEAD /
DEBUG - 2026-03-24 18:31:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-24 18:31:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-24 18:31:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-24 18:31:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-24 18:31:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-24 18:36:22 --> [REQ_ID=4f395add80eb] [REQUEST][START] HEAD /
DEBUG - 2026-03-24 18:36:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-24 18:36:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-24 18:36:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-24 18:36:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-24 18:36:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-24 18:41:22 --> [REQ_ID=7e61ae1867bd] [REQUEST][START] HEAD /
DEBUG - 2026-03-24 18:41:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-24 18:41:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-24 18:41:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-24 18:41:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-24 18:41:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-24 18:42:19 --> [REQ_ID=b0046c29d208] [REQUEST][START] GET /index.php/Knowledgebase/MyMI-Partnerships
DEBUG - 2026-03-24 18:42:19 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-24 18:42:19 --> ErrorException: Access level to App\Modules\User\Controllers\KnowledgebaseController::respondWithRendered() must be protected (as in class App\Controllers\BaseController) or weaker
[Method: GET, Route: Knowledgebase/MyMI-Partnerships]
in APPPATH/Modules/User/Controllers/KnowledgebaseController.php on line 535.
 1 [internal function]: CodeIgniter\Debug\Exceptions->shutdownHandler()
CRITICAL - 2026-03-24 18:42:19 --> [EXCEPTION] Access level to App\Modules\User\Controllers\KnowledgebaseController::respondWithRendered() must be protected (as in class App\Controllers\BaseController) or weaker File=/home/mymiteam/mymiwallet/site/current/app/Modules/User/Controllers/KnowledgebaseController.php Line=535
ERROR - 2026-03-24 18:42:19 --> [ERROR_PAGE] event=error_500 status=500 message=Internal server error.
DEBUG - 2026-03-24 18:43:25 --> [REQ_ID=7b8257eb4683] [REQUEST][START] GET /
DEBUG - 2026-03-24 18:43:25 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-24 18:43:25 --> [REQ_ID=7b8257eb4683] [FILTER_BEFORE] /
DEBUG - 2026-03-24 18:43:25 --> [REQ_ID=7b8257eb4683] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-24 18:43:25 --> [REQ_ID=7b8257eb4683] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-24 18:43:25 --> [CSRF] token name=csrf_test_name hash=3b920d7189ba4b147a32cec2197f390d
DEBUG - 2026-03-24 18:43:25 --> [REQ_ID=c8d77f344dab] [INIT] App\Controllers\Home::GET
INFO - 2026-03-24 18:43:25 --> [REQ_ID=c8d77f344dab] [MEMORY][controller-start] 4194304
INFO - 2026-03-24 18:43:25 --> [REQ_ID=c8d77f344dab] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-24 18:43:25 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-24 18:43:26 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-03-24 18:43:26 --> [REQ_ID=c8d77f344dab] [VIEW_RENDER] themes/public/home
INFO - 2026-03-24 18:43:26 --> [REQ_ID=c8d77f344dab] [MEMORY][commonData:start] 8388608
INFO - 2026-03-24 18:43:26 --> themesMemory usage: 8388608
DEBUG - 2026-03-24 18:43:26 --> [MetaService] slug= pageName=Home cacheHit= path=DB
DEBUG - 2026-03-24 18:43:26 --> [REQ_ID=7b8257eb4683] [FILTER_AFTER]
DEBUG - 2026-03-24 18:43:26 --> [REQ_ID=7b8257eb4683] [LIFECYCLE][END] status=200 duration_ms=611.12 memory_delta=4194304
INFO - 2026-03-24 18:43:26 --> [REQ_ID=c8d77f344dab] [PERF] Execution time=0.609125
DEBUG - 2026-03-24 18:43:26 --> [REQ_ID=7b8257eb4683] [REQUEST][END]
INFO - 2026-03-24 18:43:26 --> [REQ_ID=7b8257eb4683] [PERF] Execution time=0.627127
DEBUG - 2026-03-24 18:46:22 --> [REQ_ID=14cfd0c7d064] [REQUEST][START] HEAD /
DEBUG - 2026-03-24 18:46:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-24 18:46:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-24 18:46:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-24 18:46:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-24 18:46:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-24 18:49:56 --> [REQ_ID=e3acb4912880] [REQUEST][START] GET /
DEBUG - 2026-03-24 18:49:56 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-24 18:49:56 --> [REQ_ID=e3acb4912880] [REQUEST][END]
INFO - 2026-03-24 18:49:56 --> [REQ_ID=e3acb4912880] [PERF] Execution time=0.041548
DEBUG - 2026-03-24 18:49:56 --> [REQ_ID=7e5836bccaa0] [REQUEST][START] GET /index.php/How-It-Works/Registering-An-Account
DEBUG - 2026-03-24 18:49:56 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-24 18:49:56 --> [REQ_ID=7e5836bccaa0] [FILTER_BEFORE] /index.php/How-It-Works/Registering-An-Account
DEBUG - 2026-03-24 18:49:56 --> [REQ_ID=7e5836bccaa0] [ROUTE] Controller=\App\Modules\Blog\Controllers\HowItWorksController Method=show
DEBUG - 2026-03-24 18:49:56 --> [REQ_ID=7e5836bccaa0] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/How-It-Works/Registering-An-Account
DEBUG - 2026-03-24 18:49:56 --> [CSRF] token name=csrf_test_name hash=ffa6ebc5be7a3ba52b4577b49c0460b1
DEBUG - 2026-03-24 18:49:56 --> [REQ_ID=b3a5a2cc6723] [INIT] App\Modules\Blog\Controllers\HowItWorksController::GET
INFO - 2026-03-24 18:49:56 --> [REQ_ID=b3a5a2cc6723] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-24 18:49:56 --> [REQ_ID=b3a5a2cc6723] [METHOD_ENTRY] show
DEBUG - 2026-03-24 18:49:56 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-24 18:49:56 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-24 18:49:56 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-24 18:49:56 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-24 18:49:56 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-24 18:49:56 --> MyMICoin: guest context detected; skipping user-specific preload.
INFO - 2026-03-24 18:49:56 --> [REQ_ID=b3a5a2cc6723] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-24 18:49:56 --> [REQ_ID=7e5836bccaa0] [FILTER_AFTER]
DEBUG - 2026-03-24 18:49:56 --> [REQ_ID=7e5836bccaa0] [LIFECYCLE][END] status=200 duration_ms=624.57 memory_delta=4194304
INFO - 2026-03-24 18:49:56 --> [REQ_ID=b3a5a2cc6723] [PERF] Execution time=0.622745
DEBUG - 2026-03-24 18:49:56 --> [REQ_ID=7e5836bccaa0] [REQUEST][END]
INFO - 2026-03-24 18:49:56 --> [REQ_ID=7e5836bccaa0] [PERF] Execution time=0.639062
DEBUG - 2026-03-24 18:49:57 --> [REQ_ID=bdb2e0f4394c] [REQUEST][START] GET /index.php/How-It-Works/Personal-Budgeting
DEBUG - 2026-03-24 18:49:57 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-24 18:49:57 --> [REQ_ID=bdb2e0f4394c] [FILTER_BEFORE] /index.php/How-It-Works/Personal-Budgeting
DEBUG - 2026-03-24 18:49:57 --> [REQ_ID=bdb2e0f4394c] [ROUTE] Controller=\App\Modules\Blog\Controllers\HowItWorksController Method=PersonalBudgeting
DEBUG - 2026-03-24 18:49:57 --> [REQ_ID=bdb2e0f4394c] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/How-It-Works/Personal-Budgeting
DEBUG - 2026-03-24 18:49:57 --> [CSRF] token name=csrf_test_name hash=5b190fe49278e3c5051fdacecba8c7e5
DEBUG - 2026-03-24 18:49:57 --> [REQ_ID=75799255877d] [INIT] App\Modules\Blog\Controllers\HowItWorksController::GET
INFO - 2026-03-24 18:49:57 --> [REQ_ID=75799255877d] [MEMORY][controller-start] 6291456
DEBUG - 2026-03-24 18:49:57 --> [REQ_ID=75799255877d] [METHOD_ENTRY] PersonalBudgeting
DEBUG - 2026-03-24 18:49:57 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-24 18:49:57 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-24 18:49:57 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-24 18:49:57 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-24 18:49:57 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-24 18:49:57 --> MyMICoin: guest context detected; skipping user-specific preload.
INFO - 2026-03-24 18:49:57 --> [REQ_ID=75799255877d] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-24 18:49:57 --> [REQ_ID=0af4664bc5fe] [REQUEST][START] GET /index.php/Support/Account
DEBUG - 2026-03-24 18:49:57 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-24 18:49:57 --> [REQ_ID=0af4664bc5fe] [FILTER_BEFORE] /index.php/Support/Account
DEBUG - 2026-03-24 18:49:57 --> [REQ_ID=0af4664bc5fe] [ROUTE] Controller=\App\Modules\Support\Controllers\AccountSupportController Method=index
DEBUG - 2026-03-24 18:49:57 --> [REQ_ID=0af4664bc5fe] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Support/Account
DEBUG - 2026-03-24 18:49:57 --> [CSRF] token name=csrf_test_name hash=e448cfc13bf8dc2267f5f88295792667
DEBUG - 2026-03-24 18:49:57 --> [REQ_ID=1e15ce844804] [INIT] App\Modules\Support\Controllers\AccountSupportController::GET
INFO - 2026-03-24 18:49:57 --> [REQ_ID=1e15ce844804] [MEMORY][controller-start] 6291456
DEBUG - 2026-03-24 18:49:57 --> [REQ_ID=1e15ce844804] [METHOD_ENTRY] index
DEBUG - 2026-03-24 18:49:57 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-24 18:49:57 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-24 18:49:57 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-24 18:49:57 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-24 18:49:57 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-24 18:49:57 --> MyMICoin: guest context detected; skipping user-specific preload.
INFO - 2026-03-24 18:49:57 --> [REQ_ID=1e15ce844804] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-24 18:49:57 --> [REQ_ID=1e15ce844804] [VIEW_RENDER] SupportModule/Support/account_help
INFO - 2026-03-24 18:49:57 --> [REQ_ID=1e15ce844804] [MEMORY][commonData:start] 6291456
INFO - 2026-03-24 18:49:57 --> themesMemory usage: 6291456
DEBUG - 2026-03-24 18:49:57 --> [REQ_ID=0af4664bc5fe] [FILTER_AFTER]
DEBUG - 2026-03-24 18:49:57 --> [REQ_ID=0af4664bc5fe] [LIFECYCLE][END] status=200 duration_ms=102.12 memory_delta=2097152
INFO - 2026-03-24 18:49:57 --> [REQ_ID=1e15ce844804] [PERF] Execution time=0.100046
DEBUG - 2026-03-24 18:49:57 --> [REQ_ID=0af4664bc5fe] [REQUEST][END]
INFO - 2026-03-24 18:49:57 --> [REQ_ID=0af4664bc5fe] [PERF] Execution time=0.144258
INFO - 2026-03-24 18:49:57 --> themesMemory usage: 8388608
DEBUG - 2026-03-24 18:49:57 --> [MetaService] slug=how-it-works/personal-budgeting pageName= cacheHit= path=DB
DEBUG - 2026-03-24 18:49:57 --> [REQ_ID=bdb2e0f4394c] [FILTER_AFTER]
DEBUG - 2026-03-24 18:49:57 --> [REQ_ID=bdb2e0f4394c] [LIFECYCLE][END] status=200 duration_ms=504.87 memory_delta=2097152
INFO - 2026-03-24 18:49:57 --> [REQ_ID=75799255877d] [PERF] Execution time=0.504613
DEBUG - 2026-03-24 18:49:57 --> [REQ_ID=bdb2e0f4394c] [REQUEST][END]
INFO - 2026-03-24 18:49:57 --> [REQ_ID=bdb2e0f4394c] [PERF] Execution time=0.514304
DEBUG - 2026-03-24 18:50:15 --> [REQ_ID=3de23db607f9] [REQUEST][START] GET /index.php/How-It-Works/MyMI-Exchange
DEBUG - 2026-03-24 18:50:15 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-24 18:50:15 --> [REQ_ID=3de23db607f9] [FILTER_BEFORE] /index.php/How-It-Works/MyMI-Exchange
DEBUG - 2026-03-24 18:50:15 --> [REQ_ID=3de23db607f9] [ROUTE] Controller=\App\Modules\Blog\Controllers\HowItWorksController Method=show
DEBUG - 2026-03-24 18:50:15 --> [REQ_ID=3de23db607f9] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/How-It-Works/MyMI-Exchange
DEBUG - 2026-03-24 18:50:15 --> [CSRF] token name=csrf_test_name hash=c47d56e4f72e330b32c8f0eb35a880e8
DEBUG - 2026-03-24 18:50:15 --> [REQ_ID=20d85d11144d] [INIT] App\Modules\Blog\Controllers\HowItWorksController::GET
INFO - 2026-03-24 18:50:15 --> [REQ_ID=20d85d11144d] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-24 18:50:15 --> [REQ_ID=20d85d11144d] [METHOD_ENTRY] show
DEBUG - 2026-03-24 18:50:15 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-24 18:50:15 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-24 18:50:15 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-24 18:50:15 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-24 18:50:15 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-24 18:50:15 --> MyMICoin: guest context detected; skipping user-specific preload.
INFO - 2026-03-24 18:50:15 --> [REQ_ID=20d85d11144d] [MEMORY][commonData:start] 4194304
DEBUG - 2026-03-24 18:50:16 --> [REQ_ID=3de23db607f9] [FILTER_AFTER]
DEBUG - 2026-03-24 18:50:16 --> [REQ_ID=3de23db607f9] [LIFECYCLE][END] status=200 duration_ms=589.44 memory_delta=4194304
INFO - 2026-03-24 18:50:16 --> [REQ_ID=20d85d11144d] [PERF] Execution time=0.589000
DEBUG - 2026-03-24 18:50:16 --> [REQ_ID=3de23db607f9] [REQUEST][END]
INFO - 2026-03-24 18:50:16 --> [REQ_ID=3de23db607f9] [PERF] Execution time=0.604368
DEBUG - 2026-03-24 18:51:22 --> [REQ_ID=bbc1cf98e007] [REQUEST][START] HEAD /
DEBUG - 2026-03-24 18:51:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-24 18:51:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-24 18:51:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-24 18:51:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-24 18:51:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-24 18:56:22 --> [REQ_ID=8cbbc439275b] [REQUEST][START] HEAD /
DEBUG - 2026-03-24 18:56:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-24 18:56:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-24 18:56:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-24 18:56:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-24 18:56:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-24 19:00:02 --> [REQ_ID=4c044777e3e4] [REQUEST][START] GET /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-24 19:00:02 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-24 19:00:02 --> [REQ_ID=4c044777e3e4] [FILTER_BEFORE] /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-24 19:00:02 --> [REQ_ID=4c044777e3e4] [ROUTE] Controller=\App\Modules\Management\Controllers\ManagementAPIController Method=Run_CRON_Tasks
DEBUG - 2026-03-24 19:00:02 --> [REQ_ID=4c044777e3e4] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-24 19:00:02 --> [REQ_ID=4c044777e3e4] [REQUEST][END]
INFO - 2026-03-24 19:00:02 --> [REQ_ID=4c044777e3e4] [PERF] Execution time=0.047754
DEBUG - 2026-03-24 19:01:22 --> [REQ_ID=047a0d46d1c9] [REQUEST][START] HEAD /
DEBUG - 2026-03-24 19:01:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-24 19:01:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-24 19:01:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-24 19:01:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-24 19:01:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-24 19:06:22 --> [REQ_ID=71a48b3a6e5b] [REQUEST][START] HEAD /
DEBUG - 2026-03-24 19:06:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-24 19:06:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-24 19:06:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-24 19:06:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-24 19:06:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-24 19:08:03 --> [REQ_ID=14d07a1a770c] [REQUEST][START] GET /index.php/Management/Admin
DEBUG - 2026-03-24 19:08:03 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-24 19:08:03 --> [REQ_ID=14d07a1a770c] [FILTER_BEFORE] /index.php/Management/Admin
DEBUG - 2026-03-24 19:08:03 --> [REQ_ID=14d07a1a770c] [ROUTE] Controller=\App\Modules\Management\Controllers\ManagementAdminController Method=index
DEBUG - 2026-03-24 19:08:03 --> [REQ_ID=14d07a1a770c] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Management/Admin
DEBUG - 2026-03-24 19:08:03 --> [CSRF] token name=csrf_test_name hash=54032e662130c20341044b3a664bdb05
DEBUG - 2026-03-24 19:08:03 --> [REQ_ID=14d07a1a770c] [REQUEST][END]
INFO - 2026-03-24 19:08:03 --> [REQ_ID=14d07a1a770c] [PERF] Execution time=0.056876
DEBUG - 2026-03-24 19:08:04 --> [REQ_ID=4654270c1c4f] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-24 19:08:04 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-24 19:08:04 --> [REQ_ID=4654270c1c4f] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-24 19:08:04 --> [REQ_ID=4654270c1c4f] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-24 19:08:04 --> [REQ_ID=4654270c1c4f] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-24 19:08:04 --> [CSRF] token name=csrf_test_name hash=762c490c96d36c390ca3c58ec5c9fcb1
DEBUG - 2026-03-24 19:08:04 --> [REQ_ID=07d6b5ec90f6] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-24 19:08:04 --> [REQ_ID=07d6b5ec90f6] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-24 19:08:04 --> [REQ_ID=4654270c1c4f] [FILTER_AFTER]
DEBUG - 2026-03-24 19:08:04 --> [REQ_ID=4654270c1c4f] [LIFECYCLE][END] status=200 duration_ms=34.92 memory_delta=0
INFO - 2026-03-24 19:08:04 --> [REQ_ID=07d6b5ec90f6] [PERF] Execution time=0.034676
DEBUG - 2026-03-24 19:08:04 --> [REQ_ID=4654270c1c4f] [REQUEST][END]
INFO - 2026-03-24 19:08:04 --> [REQ_ID=4654270c1c4f] [PERF] Execution time=0.049070
DEBUG - 2026-03-24 19:11:22 --> [REQ_ID=3b041a334421] [REQUEST][START] HEAD /
DEBUG - 2026-03-24 19:11:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-24 19:11:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-24 19:11:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-24 19:11:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-24 19:11:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-24 19:15:01 --> [REQ_ID=866253d73693] [REQUEST][START] GET /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-24 19:15:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-24 19:15:02 --> [REQ_ID=866253d73693] [FILTER_BEFORE] /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-24 19:15:02 --> [REQ_ID=866253d73693] [ROUTE] Controller=\App\Modules\APIs\Controllers\AlertsAPIController Method=fetchEmailAlerts
DEBUG - 2026-03-24 19:15:02 --> [REQ_ID=866253d73693] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-24 19:15:02 --> [REQ_ID=866253d73693] [REQUEST][END]
INFO - 2026-03-24 19:15:02 --> [REQ_ID=866253d73693] [PERF] Execution time=0.045784
DEBUG - 2026-03-24 19:16:22 --> [REQ_ID=aaf5ac2852da] [REQUEST][START] HEAD /
DEBUG - 2026-03-24 19:16:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-24 19:16:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-24 19:16:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-24 19:16:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-24 19:16:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-24 19:16:36 --> [REQ_ID=119c0082667b] [REQUEST][START] GET /index.php/Features/Brokerage-Integration
DEBUG - 2026-03-24 19:16:36 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-24 19:16:36 --> [REQ_ID=119c0082667b] [FILTER_BEFORE] /index.php/Features/Brokerage-Integration
DEBUG - 2026-03-24 19:16:36 --> [REQ_ID=119c0082667b] [ROUTE] Controller=\App\Modules\Advertise\Controllers\FeaturesController Method=BrokerageIntegrations
DEBUG - 2026-03-24 19:16:36 --> [REQ_ID=119c0082667b] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Features/Brokerage-Integration
DEBUG - 2026-03-24 19:16:36 --> [CSRF] token name=csrf_test_name hash=c2692174385b6333f6f670f41d85a95d
DEBUG - 2026-03-24 19:16:36 --> [REQ_ID=119c0082667b] [REQUEST][END]
INFO - 2026-03-24 19:16:36 --> [REQ_ID=119c0082667b] [PERF] Execution time=0.020941
DEBUG - 2026-03-24 19:16:36 --> [REQ_ID=0155654f8209] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-24 19:16:36 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-24 19:16:36 --> [REQ_ID=0155654f8209] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-24 19:16:36 --> [REQ_ID=0155654f8209] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-24 19:16:36 --> [REQ_ID=0155654f8209] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-24 19:16:36 --> [CSRF] token name=csrf_test_name hash=6a52791121013fe0f4434461ec7f1a80
DEBUG - 2026-03-24 19:16:36 --> [REQ_ID=831e8fd79eea] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-24 19:16:36 --> [REQ_ID=831e8fd79eea] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-24 19:16:36 --> [REQ_ID=0155654f8209] [FILTER_AFTER]
DEBUG - 2026-03-24 19:16:36 --> [REQ_ID=0155654f8209] [LIFECYCLE][END] status=200 duration_ms=52.62 memory_delta=0
INFO - 2026-03-24 19:16:36 --> [REQ_ID=831e8fd79eea] [PERF] Execution time=0.052371
DEBUG - 2026-03-24 19:16:36 --> [REQ_ID=0155654f8209] [REQUEST][END]
INFO - 2026-03-24 19:16:36 --> [REQ_ID=0155654f8209] [PERF] Execution time=0.064677
DEBUG - 2026-03-24 19:16:41 --> [REQ_ID=1f111bbb0922] [REQUEST][START] GET /index.php/Premium_Features/Brokerage-Integrations
DEBUG - 2026-03-24 19:16:41 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
INFO - 2026-03-24 19:16:41 --> REDIRECTED ROUTE at https://www.mymiwallet.com/Features/Brokerage-Integrations
DEBUG - 2026-03-24 19:16:41 --> [REQ_ID=1f111bbb0922] [REQUEST][END]
INFO - 2026-03-24 19:16:41 --> [REQ_ID=1f111bbb0922] [PERF] Execution time=0.009543
DEBUG - 2026-03-24 19:21:22 --> [REQ_ID=36a13bdafacc] [REQUEST][START] HEAD /
DEBUG - 2026-03-24 19:21:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-24 19:21:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-24 19:21:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-24 19:21:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-24 19:21:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-24 19:26:22 --> [REQ_ID=3407755261e7] [REQUEST][START] HEAD /
DEBUG - 2026-03-24 19:26:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-24 19:26:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-24 19:26:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-24 19:26:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-24 19:26:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-24 19:31:15 --> [REQ_ID=17f17da5adbb] [REQUEST][START] GET /
DEBUG - 2026-03-24 19:31:15 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-24 19:31:15 --> [REQ_ID=17f17da5adbb] [FILTER_BEFORE] /
DEBUG - 2026-03-24 19:31:15 --> [REQ_ID=17f17da5adbb] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-24 19:31:15 --> [REQ_ID=17f17da5adbb] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-24 19:31:15 --> [CSRF] token name=csrf_test_name hash=ecc5966cc19052b8cbe2964d7b3a680a
DEBUG - 2026-03-24 19:31:15 --> [REQ_ID=b168da1f45a2] [INIT] App\Controllers\Home::GET
INFO - 2026-03-24 19:31:15 --> [REQ_ID=b168da1f45a2] [MEMORY][controller-start] 6291456
INFO - 2026-03-24 19:31:15 --> [REQ_ID=b168da1f45a2] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-24 19:31:15 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-24 19:31:16 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-03-24 19:31:16 --> [REQ_ID=b168da1f45a2] [VIEW_RENDER] themes/public/home
INFO - 2026-03-24 19:31:16 --> [REQ_ID=b168da1f45a2] [MEMORY][commonData:start] 10485760
INFO - 2026-03-24 19:31:16 --> themesMemory usage: 10485760
DEBUG - 2026-03-24 19:31:16 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-24 19:31:16 --> [REQ_ID=17f17da5adbb] [FILTER_AFTER]
DEBUG - 2026-03-24 19:31:16 --> [REQ_ID=17f17da5adbb] [LIFECYCLE][END] status=200 duration_ms=601.85 memory_delta=4194304
INFO - 2026-03-24 19:31:16 --> [REQ_ID=b168da1f45a2] [PERF] Execution time=0.599841
DEBUG - 2026-03-24 19:31:16 --> [REQ_ID=17f17da5adbb] [REQUEST][END]
INFO - 2026-03-24 19:31:16 --> [REQ_ID=17f17da5adbb] [PERF] Execution time=0.643167
DEBUG - 2026-03-24 19:31:16 --> [REQ_ID=766fe152c640] [REQUEST][START] GET /
DEBUG - 2026-03-24 19:31:16 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-24 19:31:16 --> [REQ_ID=766fe152c640] [FILTER_BEFORE] /
DEBUG - 2026-03-24 19:31:16 --> [REQ_ID=766fe152c640] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-24 19:31:16 --> [REQ_ID=766fe152c640] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-24 19:31:16 --> [CSRF] token name=csrf_test_name hash=ecc5966cc19052b8cbe2964d7b3a680a
DEBUG - 2026-03-24 19:31:16 --> [REQ_ID=c0f4ba3ca47e] [INIT] App\Controllers\Home::GET
INFO - 2026-03-24 19:31:16 --> [REQ_ID=c0f4ba3ca47e] [MEMORY][controller-start] 4194304
INFO - 2026-03-24 19:31:16 --> [REQ_ID=c0f4ba3ca47e] [MEMORY][commonData:start] 4194304
DEBUG - 2026-03-24 19:31:16 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-24 19:31:16 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
DEBUG - 2026-03-24 19:31:16 --> [REQ_ID=c0f4ba3ca47e] [VIEW_RENDER] themes/public/home
INFO - 2026-03-24 19:31:16 --> [REQ_ID=c0f4ba3ca47e] [MEMORY][commonData:start] 8388608
INFO - 2026-03-24 19:31:16 --> themesMemory usage: 8388608
DEBUG - 2026-03-24 19:31:16 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-24 19:31:16 --> [REQ_ID=766fe152c640] [FILTER_AFTER]
DEBUG - 2026-03-24 19:31:16 --> [REQ_ID=766fe152c640] [LIFECYCLE][END] status=200 duration_ms=500.73 memory_delta=4194304
INFO - 2026-03-24 19:31:16 --> [REQ_ID=c0f4ba3ca47e] [PERF] Execution time=0.500501
DEBUG - 2026-03-24 19:31:16 --> [REQ_ID=766fe152c640] [REQUEST][END]
INFO - 2026-03-24 19:31:16 --> [REQ_ID=766fe152c640] [PERF] Execution time=0.510650
DEBUG - 2026-03-24 19:31:22 --> [REQ_ID=4c9fc9c67944] [REQUEST][START] HEAD /
DEBUG - 2026-03-24 19:31:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-24 19:31:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-24 19:31:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-24 19:31:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-24 19:31:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-24 19:36:22 --> [REQ_ID=70f357292f53] [REQUEST][START] HEAD /
DEBUG - 2026-03-24 19:36:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-24 19:36:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-24 19:36:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-24 19:36:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-24 19:36:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-24 19:41:22 --> [REQ_ID=5082c266589a] [REQUEST][START] HEAD /
DEBUG - 2026-03-24 19:41:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-24 19:41:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-24 19:41:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-24 19:41:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-24 19:41:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-24 19:46:22 --> [REQ_ID=bceecd67fde4] [REQUEST][START] HEAD /
DEBUG - 2026-03-24 19:46:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-24 19:46:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-24 19:46:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-24 19:46:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-24 19:46:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-24 19:51:22 --> [REQ_ID=cb8dca6fd07a] [REQUEST][START] HEAD /
DEBUG - 2026-03-24 19:51:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-24 19:51:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-24 19:51:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-24 19:51:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-24 19:51:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-24 19:54:29 --> [REQ_ID=66474897beab] [REQUEST][START] GET /index.php/Budget
DEBUG - 2026-03-24 19:54:29 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-24 19:54:29 --> [REQ_ID=8446e36d3217] [REQUEST][START] GET /index.php/Purchase/MyMIGold
DEBUG - 2026-03-24 19:54:29 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-24 19:54:29 --> [REQ_ID=66474897beab] [FILTER_BEFORE] /index.php/Budget
DEBUG - 2026-03-24 19:54:29 --> [REQ_ID=66474897beab] [ROUTE] Controller=\App\Modules\User\Controllers\BudgetController Method=index
DEBUG - 2026-03-24 19:54:29 --> [REQ_ID=66474897beab] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Budget
DEBUG - 2026-03-24 19:54:29 --> [REQ_ID=8446e36d3217] [FILTER_BEFORE] /index.php/Purchase/MyMIGold
DEBUG - 2026-03-24 19:54:29 --> [REQ_ID=8446e36d3217] [ROUTE] Controller=closure_route Method=index
DEBUG - 2026-03-24 19:54:29 --> [REQ_ID=8446e36d3217] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Purchase/MyMIGold
DEBUG - 2026-03-24 19:54:29 --> [CSRF] token name=csrf_test_name hash=de703129616b2c6a19aef9b7047a6c46
DEBUG - 2026-03-24 19:54:29 --> [CSRF] token name=csrf_test_name hash=aded18723d96fba90aa936e390ff5bd0
DEBUG - 2026-03-24 19:54:29 --> [REQ_ID=66474897beab] [REQUEST][END]
INFO - 2026-03-24 19:54:29 --> [REQ_ID=66474897beab] [PERF] Execution time=0.079113
DEBUG - 2026-03-24 19:54:29 --> [REQ_ID=8446e36d3217] [REQUEST][END]
INFO - 2026-03-24 19:54:29 --> [REQ_ID=8446e36d3217] [PERF] Execution time=0.069919
DEBUG - 2026-03-24 19:54:29 --> [REQ_ID=ac3b891178c1] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-24 19:54:29 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-24 19:54:29 --> [REQ_ID=c5269899f993] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-24 19:54:29 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-24 19:54:29 --> [REQ_ID=ac3b891178c1] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-24 19:54:29 --> [REQ_ID=ac3b891178c1] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-24 19:54:29 --> [REQ_ID=ac3b891178c1] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-24 19:54:29 --> [CSRF] token name=csrf_test_name hash=6681047dc2ec82eb8cfbe48c6fe1ea99
DEBUG - 2026-03-24 19:54:29 --> [REQ_ID=c5269899f993] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-24 19:54:29 --> [REQ_ID=c5269899f993] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-24 19:54:29 --> [REQ_ID=c5269899f993] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-24 19:54:29 --> [CSRF] token name=csrf_test_name hash=679c95293755e888eb05dd333e7355bf
DEBUG - 2026-03-24 19:54:29 --> [REQ_ID=3e1961915682] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-24 19:54:29 --> [REQ_ID=3e1961915682] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-24 19:54:29 --> [REQ_ID=009569a295db] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-24 19:54:29 --> [REQ_ID=009569a295db] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-24 19:54:29 --> [REQ_ID=c5269899f993] [FILTER_AFTER]
DEBUG - 2026-03-24 19:54:29 --> [REQ_ID=c5269899f993] [LIFECYCLE][END] status=200 duration_ms=123.58 memory_delta=0
INFO - 2026-03-24 19:54:29 --> [REQ_ID=3e1961915682] [PERF] Execution time=0.123322
DEBUG - 2026-03-24 19:54:29 --> [REQ_ID=ac3b891178c1] [FILTER_AFTER]
DEBUG - 2026-03-24 19:54:29 --> [REQ_ID=ac3b891178c1] [LIFECYCLE][END] status=200 duration_ms=126.81 memory_delta=0
DEBUG - 2026-03-24 19:54:29 --> [REQ_ID=c5269899f993] [REQUEST][END]
INFO - 2026-03-24 19:54:29 --> [REQ_ID=c5269899f993] [PERF] Execution time=0.156631
INFO - 2026-03-24 19:54:29 --> [REQ_ID=009569a295db] [PERF] Execution time=0.123527
DEBUG - 2026-03-24 19:54:29 --> [REQ_ID=ac3b891178c1] [REQUEST][END]
INFO - 2026-03-24 19:54:29 --> [REQ_ID=ac3b891178c1] [PERF] Execution time=0.158844
DEBUG - 2026-03-24 19:54:30 --> [REQ_ID=95a7fa14bda2] [REQUEST][START] GET /index.php/MyMI-Gold/Goals/Daily
DEBUG - 2026-03-24 19:54:30 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-24 19:54:30 --> [REQ_ID=95a7fa14bda2] [FILTER_BEFORE] /index.php/MyMI-Gold/Goals/Daily
DEBUG - 2026-03-24 19:54:30 --> [REQ_ID=95a7fa14bda2] [ROUTE] Controller=\App\Modules\User\Controllers\DashboardController Method=goals
DEBUG - 2026-03-24 19:54:30 --> [REQ_ID=95a7fa14bda2] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/MyMI-Gold/Goals/Daily
DEBUG - 2026-03-24 19:54:30 --> [CSRF] token name=csrf_test_name hash=8cabf7762cc59c1c44def91eb38cfd50
DEBUG - 2026-03-24 19:54:30 --> [REQ_ID=95a7fa14bda2] [REQUEST][END]
INFO - 2026-03-24 19:54:30 --> [REQ_ID=95a7fa14bda2] [PERF] Execution time=0.014258
DEBUG - 2026-03-24 19:54:30 --> [REQ_ID=1efc3b4693da] [REQUEST][START] GET /index.php/logout
DEBUG - 2026-03-24 19:54:30 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-24 19:54:30 --> [REQ_ID=5b7cdabce8f8] [REQUEST][START] GET /index.php/Investments
DEBUG - 2026-03-24 19:54:30 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-24 19:54:30 --> [REQ_ID=1efc3b4693da] [FILTER_BEFORE] /index.php/logout
DEBUG - 2026-03-24 19:54:30 --> [REQ_ID=1efc3b4693da] [ROUTE] Controller=\App\Controllers\AuthController Method=logout
DEBUG - 2026-03-24 19:54:30 --> [REQ_ID=1efc3b4693da] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/logout
DEBUG - 2026-03-24 19:54:30 --> [CSRF] token name=csrf_test_name hash=29e8e1379f9913f32a7bd2da47199222
DEBUG - 2026-03-24 19:54:30 --> [REQ_ID=1efc3b4693da] [REQUEST][END]
INFO - 2026-03-24 19:54:30 --> [REQ_ID=1efc3b4693da] [PERF] Execution time=0.015044
DEBUG - 2026-03-24 19:54:30 --> [REQ_ID=343eb8a9b77d] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-24 19:54:30 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-24 19:54:30 --> [REQ_ID=5b7cdabce8f8] [FILTER_BEFORE] /index.php/Investments
DEBUG - 2026-03-24 19:54:30 --> [REQ_ID=5b7cdabce8f8] [ROUTE] Controller=\App\Modules\User\Controllers\InvestmentsController Method=index
DEBUG - 2026-03-24 19:54:30 --> [REQ_ID=5b7cdabce8f8] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Investments
DEBUG - 2026-03-24 19:54:30 --> [CSRF] token name=csrf_test_name hash=a8c9cfe9597f8bd988eac788fab7ec1b
DEBUG - 2026-03-24 19:54:30 --> [REQ_ID=5b7cdabce8f8] [REQUEST][END]
INFO - 2026-03-24 19:54:30 --> [REQ_ID=5b7cdabce8f8] [PERF] Execution time=0.023466
DEBUG - 2026-03-24 19:54:30 --> [REQ_ID=343eb8a9b77d] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-24 19:54:30 --> [REQ_ID=343eb8a9b77d] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-24 19:54:30 --> [REQ_ID=343eb8a9b77d] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-24 19:54:30 --> [CSRF] token name=csrf_test_name hash=f12e395567a9b4527464dec412cd1cb5
DEBUG - 2026-03-24 19:54:30 --> [REQ_ID=8c4ed66173f6] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-24 19:54:30 --> [REQ_ID=8c4ed66173f6] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-24 19:54:30 --> [REQ_ID=2b2d4f68c301] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-24 19:54:30 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-24 19:54:30 --> [REQ_ID=2b2d4f68c301] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-24 19:54:30 --> [REQ_ID=2b2d4f68c301] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-24 19:54:30 --> [REQ_ID=2b2d4f68c301] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-24 19:54:30 --> [CSRF] token name=csrf_test_name hash=fe478b5ec9897becffe66fd236f2e81c
DEBUG - 2026-03-24 19:54:30 --> [REQ_ID=ccdd4f96a0b2] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-24 19:54:30 --> [REQ_ID=ccdd4f96a0b2] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-24 19:54:30 --> [REQ_ID=343eb8a9b77d] [FILTER_AFTER]
DEBUG - 2026-03-24 19:54:30 --> [REQ_ID=343eb8a9b77d] [LIFECYCLE][END] status=200 duration_ms=16.17 memory_delta=0
INFO - 2026-03-24 19:54:30 --> [REQ_ID=8c4ed66173f6] [PERF] Execution time=0.015896
DEBUG - 2026-03-24 19:54:30 --> [REQ_ID=343eb8a9b77d] [REQUEST][END]
INFO - 2026-03-24 19:54:30 --> [REQ_ID=343eb8a9b77d] [PERF] Execution time=0.026597
DEBUG - 2026-03-24 19:54:30 --> [REQ_ID=2b2d4f68c301] [FILTER_AFTER]
DEBUG - 2026-03-24 19:54:30 --> [REQ_ID=2b2d4f68c301] [LIFECYCLE][END] status=200 duration_ms=16.27 memory_delta=0
INFO - 2026-03-24 19:54:30 --> [REQ_ID=ccdd4f96a0b2] [PERF] Execution time=0.016211
DEBUG - 2026-03-24 19:54:30 --> [REQ_ID=2b2d4f68c301] [REQUEST][END]
INFO - 2026-03-24 19:54:30 --> [REQ_ID=2b2d4f68c301] [PERF] Execution time=0.025122
DEBUG - 2026-03-24 19:54:31 --> [REQ_ID=73edc7a73040] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-24 19:54:31 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-24 19:54:31 --> [REQ_ID=73edc7a73040] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-24 19:54:31 --> [REQ_ID=73edc7a73040] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-24 19:54:31 --> [REQ_ID=73edc7a73040] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-24 19:54:31 --> [CSRF] token name=csrf_test_name hash=e4a8d1d7cba13ce371ab19a2cbdc35da
DEBUG - 2026-03-24 19:54:31 --> [REQ_ID=36c6767d8fdc] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-24 19:54:31 --> [REQ_ID=36c6767d8fdc] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-24 19:54:31 --> [REQ_ID=73edc7a73040] [FILTER_AFTER]
DEBUG - 2026-03-24 19:54:31 --> [REQ_ID=73edc7a73040] [LIFECYCLE][END] status=200 duration_ms=13.41 memory_delta=0
INFO - 2026-03-24 19:54:31 --> [REQ_ID=36c6767d8fdc] [PERF] Execution time=0.013217
DEBUG - 2026-03-24 19:54:31 --> [REQ_ID=73edc7a73040] [REQUEST][END]
INFO - 2026-03-24 19:54:31 --> [REQ_ID=73edc7a73040] [PERF] Execution time=0.021849
DEBUG - 2026-03-24 19:54:36 --> [REQ_ID=9816c88deefc] [REQUEST][START] GET /index.php/Projects
DEBUG - 2026-03-24 19:54:36 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-24 19:54:36 --> [REQ_ID=9816c88deefc] [FILTER_BEFORE] /index.php/Projects
DEBUG - 2026-03-24 19:54:36 --> [REQ_ID=9816c88deefc] [ROUTE] Controller=\App\Modules\User\Controllers\ProjectsController Method=index
DEBUG - 2026-03-24 19:54:36 --> [REQ_ID=9816c88deefc] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Projects
DEBUG - 2026-03-24 19:54:36 --> [CSRF] token name=csrf_test_name hash=9f4e60d5532cc9cc59090a6bb12a69fc
DEBUG - 2026-03-24 19:54:36 --> [REQ_ID=9816c88deefc] [REQUEST][END]
INFO - 2026-03-24 19:54:36 --> [REQ_ID=9816c88deefc] [PERF] Execution time=0.011963
DEBUG - 2026-03-24 19:54:36 --> [REQ_ID=12ab178b4f29] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-24 19:54:36 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-24 19:54:36 --> [REQ_ID=12ab178b4f29] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-24 19:54:36 --> [REQ_ID=12ab178b4f29] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-24 19:54:36 --> [REQ_ID=12ab178b4f29] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-24 19:54:36 --> [CSRF] token name=csrf_test_name hash=9dd120d8d958878ff8cb81459e9e0c31
DEBUG - 2026-03-24 19:54:36 --> [REQ_ID=892ebb78bd52] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-24 19:54:36 --> [REQ_ID=892ebb78bd52] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-24 19:54:36 --> [REQ_ID=12ab178b4f29] [FILTER_AFTER]
DEBUG - 2026-03-24 19:54:36 --> [REQ_ID=12ab178b4f29] [LIFECYCLE][END] status=200 duration_ms=30.74 memory_delta=0
INFO - 2026-03-24 19:54:36 --> [REQ_ID=892ebb78bd52] [PERF] Execution time=0.030590
DEBUG - 2026-03-24 19:54:36 --> [REQ_ID=12ab178b4f29] [REQUEST][END]
INFO - 2026-03-24 19:54:36 --> [REQ_ID=12ab178b4f29] [PERF] Execution time=0.039444
DEBUG - 2026-03-24 19:56:22 --> [REQ_ID=8a1cf97c7c5c] [REQUEST][START] HEAD /
DEBUG - 2026-03-24 19:56:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-24 19:56:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-24 19:56:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-24 19:56:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-24 19:56:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-24 20:00:01 --> [REQ_ID=8b24efe1ff03] [REQUEST][START] GET /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-24 20:00:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-24 20:00:01 --> [REQ_ID=8b24efe1ff03] [FILTER_BEFORE] /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-24 20:00:01 --> [REQ_ID=8b24efe1ff03] [ROUTE] Controller=\App\Modules\Management\Controllers\ManagementAPIController Method=Run_CRON_Tasks
DEBUG - 2026-03-24 20:00:01 --> [REQ_ID=8b24efe1ff03] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-24 20:00:01 --> [REQ_ID=8b24efe1ff03] [REQUEST][END]
INFO - 2026-03-24 20:00:01 --> [REQ_ID=8b24efe1ff03] [PERF] Execution time=0.049488
DEBUG - 2026-03-24 20:01:22 --> [REQ_ID=3da5b3178247] [REQUEST][START] HEAD /
DEBUG - 2026-03-24 20:01:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-24 20:01:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-24 20:01:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-24 20:01:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-24 20:01:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-24 20:06:02 --> [REQ_ID=26f432195e26] [REQUEST][START] GET /
DEBUG - 2026-03-24 20:06:02 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-24 20:06:02 --> [REQ_ID=26f432195e26] [REQUEST][END]
INFO - 2026-03-24 20:06:02 --> [REQ_ID=26f432195e26] [PERF] Execution time=0.038089
DEBUG - 2026-03-24 20:06:22 --> [REQ_ID=33f6a5eb32e8] [REQUEST][START] HEAD /
DEBUG - 2026-03-24 20:06:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-24 20:06:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-24 20:06:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-24 20:06:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-24 20:06:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-24 20:11:22 --> [REQ_ID=b98b35d89fd2] [REQUEST][START] HEAD /
DEBUG - 2026-03-24 20:11:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-24 20:11:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-24 20:11:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-24 20:11:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-24 20:11:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-24 20:15:02 --> [REQ_ID=ecba19e8a6c2] [REQUEST][START] GET /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-24 20:15:02 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-24 20:15:02 --> [REQ_ID=ecba19e8a6c2] [FILTER_BEFORE] /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-24 20:15:02 --> [REQ_ID=ecba19e8a6c2] [ROUTE] Controller=\App\Modules\APIs\Controllers\AlertsAPIController Method=fetchEmailAlerts
DEBUG - 2026-03-24 20:15:02 --> [REQ_ID=ecba19e8a6c2] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-24 20:15:02 --> [REQ_ID=ecba19e8a6c2] [REQUEST][END]
INFO - 2026-03-24 20:15:02 --> [REQ_ID=ecba19e8a6c2] [PERF] Execution time=0.061397
DEBUG - 2026-03-24 20:16:22 --> [REQ_ID=53e95a939d9b] [REQUEST][START] HEAD /
DEBUG - 2026-03-24 20:16:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-24 20:16:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-24 20:16:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-24 20:16:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-24 20:16:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-24 20:21:22 --> [REQ_ID=9ae40e3fc374] [REQUEST][START] HEAD /
DEBUG - 2026-03-24 20:21:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-24 20:21:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-24 20:21:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-24 20:21:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-24 20:21:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-24 20:24:36 --> [REQ_ID=283151e30432] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-24 20:24:36 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-24 20:24:36 --> [REQ_ID=283151e30432] [REQUEST][END]
INFO - 2026-03-24 20:24:36 --> [REQ_ID=283151e30432] [PERF] Execution time=0.041400
DEBUG - 2026-03-24 20:24:38 --> [REQ_ID=d868c630c87f] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-24 20:24:38 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-24 20:24:38 --> [REQ_ID=d868c630c87f] [REQUEST][END]
INFO - 2026-03-24 20:24:38 --> [REQ_ID=d868c630c87f] [PERF] Execution time=0.012992
DEBUG - 2026-03-24 20:24:40 --> [REQ_ID=67053970e072] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-24 20:24:40 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-24 20:24:40 --> [REQ_ID=67053970e072] [REQUEST][END]
INFO - 2026-03-24 20:24:40 --> [REQ_ID=67053970e072] [PERF] Execution time=0.009284
DEBUG - 2026-03-24 20:24:42 --> [REQ_ID=cb8658dedd18] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-24 20:24:42 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-24 20:24:42 --> [REQ_ID=cb8658dedd18] [REQUEST][END]
INFO - 2026-03-24 20:24:42 --> [REQ_ID=cb8658dedd18] [PERF] Execution time=0.009514
DEBUG - 2026-03-24 20:24:44 --> [REQ_ID=1431f5732f43] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-24 20:24:44 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-24 20:24:44 --> [REQ_ID=1431f5732f43] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-24 20:24:44 --> [REQ_ID=1431f5732f43] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-24 20:24:44 --> [REQ_ID=1431f5732f43] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-24 20:24:44 --> [CSRF] token name=csrf_test_name hash=b66c4951f2cd8a5d8fe31daa65815a02
DEBUG - 2026-03-24 20:24:44 --> [REQ_ID=74ce132d2585] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-24 20:24:44 --> [REQ_ID=74ce132d2585] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-24 20:24:44 --> [REQ_ID=1431f5732f43] [FILTER_AFTER]
DEBUG - 2026-03-24 20:24:44 --> [REQ_ID=1431f5732f43] [LIFECYCLE][END] status=200 duration_ms=153.79 memory_delta=0
INFO - 2026-03-24 20:24:44 --> [REQ_ID=74ce132d2585] [PERF] Execution time=0.151551
DEBUG - 2026-03-24 20:24:44 --> [REQ_ID=1431f5732f43] [REQUEST][END]
INFO - 2026-03-24 20:24:44 --> [REQ_ID=1431f5732f43] [PERF] Execution time=0.165580
DEBUG - 2026-03-24 20:26:22 --> [REQ_ID=9fae73d9abb5] [REQUEST][START] HEAD /
DEBUG - 2026-03-24 20:26:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-24 20:26:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-24 20:26:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-24 20:26:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-24 20:26:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-24 20:31:22 --> [REQ_ID=9b95839e7674] [REQUEST][START] HEAD /
DEBUG - 2026-03-24 20:31:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-24 20:31:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-24 20:31:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-24 20:31:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-24 20:31:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-24 20:32:46 --> [REQ_ID=f373dd1cc4fd] [REQUEST][START] GET /
DEBUG - 2026-03-24 20:32:46 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-24 20:32:46 --> [REQ_ID=f373dd1cc4fd] [FILTER_BEFORE] /
DEBUG - 2026-03-24 20:32:46 --> [REQ_ID=f373dd1cc4fd] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-24 20:32:46 --> [REQ_ID=f373dd1cc4fd] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-24 20:32:46 --> [CSRF] token name=csrf_test_name hash=784e4cb9d5b3a79a23d6861ba9a51823
DEBUG - 2026-03-24 20:32:46 --> [REQ_ID=d34fb4fb2f3b] [INIT] App\Controllers\Home::GET
INFO - 2026-03-24 20:32:46 --> [REQ_ID=d34fb4fb2f3b] [MEMORY][controller-start] 6291456
INFO - 2026-03-24 20:32:46 --> [REQ_ID=d34fb4fb2f3b] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-24 20:32:47 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-24 20:32:47 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-03-24 20:32:47 --> [REQ_ID=d34fb4fb2f3b] [VIEW_RENDER] themes/public/home
INFO - 2026-03-24 20:32:47 --> [REQ_ID=d34fb4fb2f3b] [MEMORY][commonData:start] 10485760
INFO - 2026-03-24 20:32:47 --> themesMemory usage: 10485760
DEBUG - 2026-03-24 20:32:47 --> [MetaService] slug= pageName=Home cacheHit= path=DB
DEBUG - 2026-03-24 20:32:47 --> [REQ_ID=f373dd1cc4fd] [FILTER_AFTER]
DEBUG - 2026-03-24 20:32:47 --> [REQ_ID=f373dd1cc4fd] [LIFECYCLE][END] status=200 duration_ms=824.25 memory_delta=4194304
INFO - 2026-03-24 20:32:47 --> [REQ_ID=d34fb4fb2f3b] [PERF] Execution time=0.822170
DEBUG - 2026-03-24 20:32:47 --> [REQ_ID=f373dd1cc4fd] [REQUEST][END]
INFO - 2026-03-24 20:32:47 --> [REQ_ID=f373dd1cc4fd] [PERF] Execution time=0.863349
DEBUG - 2026-03-24 20:36:22 --> [REQ_ID=58da918b9841] [REQUEST][START] HEAD /
DEBUG - 2026-03-24 20:36:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-24 20:36:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-24 20:36:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-24 20:36:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-24 20:36:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-24 20:39:02 --> [REQ_ID=533a52f2bb19] [REQUEST][START] GET /index.php/Support/Account
DEBUG - 2026-03-24 20:39:02 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-24 20:39:03 --> [REQ_ID=533a52f2bb19] [FILTER_BEFORE] /index.php/Support/Account
DEBUG - 2026-03-24 20:39:03 --> [REQ_ID=533a52f2bb19] [ROUTE] Controller=\App\Modules\Support\Controllers\AccountSupportController Method=index
DEBUG - 2026-03-24 20:39:03 --> [REQ_ID=533a52f2bb19] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Support/Account
DEBUG - 2026-03-24 20:39:03 --> [CSRF] token name=csrf_test_name hash=609967ced8db6b90fecaf3f2b5f836dd
DEBUG - 2026-03-24 20:39:03 --> [REQ_ID=0c2e83fd3a96] [INIT] App\Modules\Support\Controllers\AccountSupportController::GET
INFO - 2026-03-24 20:39:03 --> [REQ_ID=0c2e83fd3a96] [MEMORY][controller-start] 6291456
DEBUG - 2026-03-24 20:39:03 --> [REQ_ID=0c2e83fd3a96] [METHOD_ENTRY] index
DEBUG - 2026-03-24 20:39:03 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-24 20:39:03 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-24 20:39:03 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-24 20:39:03 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-24 20:39:03 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-24 20:39:03 --> MyMICoin: guest context detected; skipping user-specific preload.
INFO - 2026-03-24 20:39:03 --> [REQ_ID=0c2e83fd3a96] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-24 20:39:03 --> [REQ_ID=0c2e83fd3a96] [VIEW_RENDER] SupportModule/Support/account_help
INFO - 2026-03-24 20:39:03 --> [REQ_ID=0c2e83fd3a96] [MEMORY][commonData:start] 6291456
INFO - 2026-03-24 20:39:03 --> themesMemory usage: 6291456
DEBUG - 2026-03-24 20:39:03 --> [REQ_ID=533a52f2bb19] [FILTER_AFTER]
DEBUG - 2026-03-24 20:39:03 --> [REQ_ID=533a52f2bb19] [LIFECYCLE][END] status=200 duration_ms=382.60 memory_delta=0
INFO - 2026-03-24 20:39:03 --> [REQ_ID=0c2e83fd3a96] [PERF] Execution time=0.379937
DEBUG - 2026-03-24 20:39:03 --> [REQ_ID=533a52f2bb19] [REQUEST][END]
INFO - 2026-03-24 20:39:03 --> [REQ_ID=533a52f2bb19] [PERF] Execution time=0.424359
DEBUG - 2026-03-24 20:41:22 --> [REQ_ID=bd629cfe74bb] [REQUEST][START] HEAD /
DEBUG - 2026-03-24 20:41:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-24 20:41:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-24 20:41:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-24 20:41:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-24 20:41:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-24 20:46:22 --> [REQ_ID=90b239c9b714] [REQUEST][START] HEAD /
DEBUG - 2026-03-24 20:46:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-24 20:46:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-24 20:46:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-24 20:46:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-24 20:46:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-24 20:51:22 --> [REQ_ID=e8264c6cfe1a] [REQUEST][START] HEAD /
DEBUG - 2026-03-24 20:51:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-24 20:51:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-24 20:51:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-24 20:51:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-24 20:51:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-24 20:56:22 --> [REQ_ID=732c5a9283fd] [REQUEST][START] HEAD /
DEBUG - 2026-03-24 20:56:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-24 20:56:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-24 20:56:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-24 20:56:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-24 20:56:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-24 21:00:01 --> [REQ_ID=2edd23ba56f7] [REQUEST][START] GET /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-24 21:00:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-24 21:00:01 --> [REQ_ID=2edd23ba56f7] [FILTER_BEFORE] /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-24 21:00:01 --> [REQ_ID=2edd23ba56f7] [ROUTE] Controller=\App\Modules\Management\Controllers\ManagementAPIController Method=Run_CRON_Tasks
DEBUG - 2026-03-24 21:00:01 --> [REQ_ID=2edd23ba56f7] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-24 21:00:01 --> [REQ_ID=2edd23ba56f7] [REQUEST][END]
INFO - 2026-03-24 21:00:01 --> [REQ_ID=2edd23ba56f7] [PERF] Execution time=0.050735
DEBUG - 2026-03-24 21:01:22 --> [REQ_ID=afa9bab751eb] [REQUEST][START] HEAD /
DEBUG - 2026-03-24 21:01:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-24 21:01:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-24 21:01:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-24 21:01:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-24 21:01:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-24 21:06:22 --> [REQ_ID=a31817894815] [REQUEST][START] HEAD /
DEBUG - 2026-03-24 21:06:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-24 21:06:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-24 21:06:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-24 21:06:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-24 21:06:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-24 21:08:48 --> [REQ_ID=44f98aab719e] [REQUEST][START] HEAD /
DEBUG - 2026-03-24 21:08:48 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-24 21:08:48 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-24 21:08:48 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-24 21:08:48 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-24 21:08:48 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://mymiwallet.com/
DEBUG - 2026-03-24 21:11:22 --> [REQ_ID=bf6b05eb37e9] [REQUEST][START] HEAD /
DEBUG - 2026-03-24 21:11:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-24 21:11:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-24 21:11:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-24 21:11:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-24 21:11:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-24 21:15:01 --> [REQ_ID=aa21773e9ce3] [REQUEST][START] GET /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-24 21:15:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-24 21:15:01 --> [REQ_ID=aa21773e9ce3] [FILTER_BEFORE] /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-24 21:15:01 --> [REQ_ID=aa21773e9ce3] [ROUTE] Controller=\App\Modules\APIs\Controllers\AlertsAPIController Method=fetchEmailAlerts
DEBUG - 2026-03-24 21:15:01 --> [REQ_ID=aa21773e9ce3] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-24 21:15:01 --> [REQ_ID=aa21773e9ce3] [REQUEST][END]
INFO - 2026-03-24 21:15:01 --> [REQ_ID=aa21773e9ce3] [PERF] Execution time=0.046587
DEBUG - 2026-03-24 21:16:22 --> [REQ_ID=ad702e90be39] [REQUEST][START] HEAD /
DEBUG - 2026-03-24 21:16:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-24 21:16:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-24 21:16:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-24 21:16:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-24 21:16:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-24 21:21:22 --> [REQ_ID=15fcadf04c26] [REQUEST][START] HEAD /
DEBUG - 2026-03-24 21:21:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-24 21:21:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-24 21:21:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-24 21:21:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-24 21:21:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-24 21:26:22 --> [REQ_ID=bdca0968174f] [REQUEST][START] HEAD /
DEBUG - 2026-03-24 21:26:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-24 21:26:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-24 21:26:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-24 21:26:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-24 21:26:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-24 21:31:22 --> [REQ_ID=b83cebf49221] [REQUEST][START] HEAD /
DEBUG - 2026-03-24 21:31:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-24 21:31:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-24 21:31:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-24 21:31:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-24 21:31:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-24 21:36:22 --> [REQ_ID=af1c15f6e130] [REQUEST][START] HEAD /
DEBUG - 2026-03-24 21:36:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-24 21:36:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-24 21:36:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-24 21:36:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-24 21:36:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-24 21:41:22 --> [REQ_ID=62e2a42a8154] [REQUEST][START] HEAD /
DEBUG - 2026-03-24 21:41:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-24 21:41:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-24 21:41:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-24 21:41:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-24 21:41:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-24 21:46:22 --> [REQ_ID=193da0d39a60] [REQUEST][START] HEAD /
DEBUG - 2026-03-24 21:46:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-24 21:46:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-24 21:46:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-24 21:46:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-24 21:46:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-24 21:51:22 --> [REQ_ID=4b2ac84be313] [REQUEST][START] HEAD /
DEBUG - 2026-03-24 21:51:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-24 21:51:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-24 21:51:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-24 21:51:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-24 21:51:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-24 21:56:22 --> [REQ_ID=1ee5df526641] [REQUEST][START] HEAD /
DEBUG - 2026-03-24 21:56:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-24 21:56:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-24 21:56:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-24 21:56:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-24 21:56:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-24 22:00:01 --> [REQ_ID=d863436237af] [REQUEST][START] GET /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-24 22:00:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-24 22:00:01 --> [REQ_ID=d863436237af] [FILTER_BEFORE] /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-24 22:00:01 --> [REQ_ID=d863436237af] [ROUTE] Controller=\App\Modules\Management\Controllers\ManagementAPIController Method=Run_CRON_Tasks
DEBUG - 2026-03-24 22:00:01 --> [REQ_ID=d863436237af] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-24 22:00:01 --> [REQ_ID=d863436237af] [REQUEST][END]
INFO - 2026-03-24 22:00:01 --> [REQ_ID=d863436237af] [PERF] Execution time=0.080647
DEBUG - 2026-03-24 22:01:22 --> [REQ_ID=fb343e2c0489] [REQUEST][START] HEAD /
DEBUG - 2026-03-24 22:01:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-24 22:01:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-24 22:01:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-24 22:01:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-24 22:01:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-24 22:02:24 --> [REQ_ID=2d05d0ec6129] [REQUEST][START] GET /
DEBUG - 2026-03-24 22:02:24 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-24 22:02:24 --> [REQ_ID=2d05d0ec6129] [FILTER_BEFORE] /
DEBUG - 2026-03-24 22:02:24 --> [REQ_ID=2d05d0ec6129] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-24 22:02:24 --> [REQ_ID=2d05d0ec6129] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-24 22:02:24 --> [CSRF] token name=csrf_test_name hash=7db3b5f45f0d3ad70f591e5cc1f90015
DEBUG - 2026-03-24 22:02:24 --> [REQ_ID=a56e5a11fb1e] [INIT] App\Controllers\Home::GET
INFO - 2026-03-24 22:02:24 --> [REQ_ID=a56e5a11fb1e] [MEMORY][controller-start] 4194304
INFO - 2026-03-24 22:02:24 --> [REQ_ID=a56e5a11fb1e] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-24 22:02:24 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-24 22:02:25 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-03-24 22:02:25 --> [REQ_ID=a56e5a11fb1e] [VIEW_RENDER] themes/public/home
INFO - 2026-03-24 22:02:25 --> [REQ_ID=a56e5a11fb1e] [MEMORY][commonData:start] 8388608
INFO - 2026-03-24 22:02:25 --> themesMemory usage: 8388608
DEBUG - 2026-03-24 22:02:25 --> [MetaService] slug= pageName=Home cacheHit= path=DB
DEBUG - 2026-03-24 22:02:25 --> [REQ_ID=2d05d0ec6129] [FILTER_AFTER]
DEBUG - 2026-03-24 22:02:25 --> [REQ_ID=2d05d0ec6129] [LIFECYCLE][END] status=200 duration_ms=615.52 memory_delta=4194304
INFO - 2026-03-24 22:02:25 --> [REQ_ID=a56e5a11fb1e] [PERF] Execution time=0.614070
DEBUG - 2026-03-24 22:02:25 --> [REQ_ID=2d05d0ec6129] [REQUEST][END]
INFO - 2026-03-24 22:02:25 --> [REQ_ID=2d05d0ec6129] [PERF] Execution time=0.629881
DEBUG - 2026-03-24 22:02:32 --> [REQ_ID=8d7c9166b172] [REQUEST][START] GET /
DEBUG - 2026-03-24 22:02:32 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-24 22:02:32 --> [REQ_ID=8d7c9166b172] [FILTER_BEFORE] /
DEBUG - 2026-03-24 22:02:32 --> [REQ_ID=8d7c9166b172] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-24 22:02:32 --> [REQ_ID=8d7c9166b172] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-24 22:02:32 --> [CSRF] token name=csrf_test_name hash=e753f264b5469ef97704528b8630a5d9
DEBUG - 2026-03-24 22:02:32 --> [REQ_ID=121d34db8b43] [INIT] App\Controllers\Home::GET
INFO - 2026-03-24 22:02:32 --> [REQ_ID=121d34db8b43] [MEMORY][controller-start] 6291456
INFO - 2026-03-24 22:02:32 --> [REQ_ID=121d34db8b43] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-24 22:02:32 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-24 22:02:32 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
DEBUG - 2026-03-24 22:02:32 --> [REQ_ID=121d34db8b43] [VIEW_RENDER] themes/public/home
INFO - 2026-03-24 22:02:32 --> [REQ_ID=121d34db8b43] [MEMORY][commonData:start] 8388608
INFO - 2026-03-24 22:02:32 --> themesMemory usage: 8388608
DEBUG - 2026-03-24 22:02:32 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-24 22:02:32 --> [REQ_ID=8d7c9166b172] [FILTER_AFTER]
DEBUG - 2026-03-24 22:02:32 --> [REQ_ID=8d7c9166b172] [LIFECYCLE][END] status=200 duration_ms=601.18 memory_delta=2097152
INFO - 2026-03-24 22:02:32 --> [REQ_ID=121d34db8b43] [PERF] Execution time=0.601091
DEBUG - 2026-03-24 22:02:32 --> [REQ_ID=8d7c9166b172] [REQUEST][END]
INFO - 2026-03-24 22:02:32 --> [REQ_ID=8d7c9166b172] [PERF] Execution time=0.611317
DEBUG - 2026-03-24 22:06:22 --> [REQ_ID=0190da78fb2e] [REQUEST][START] HEAD /
DEBUG - 2026-03-24 22:06:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-24 22:06:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-24 22:06:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-24 22:06:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-24 22:06:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-24 22:11:22 --> [REQ_ID=74cc95b531bf] [REQUEST][START] HEAD /
DEBUG - 2026-03-24 22:11:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-24 22:11:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-24 22:11:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-24 22:11:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-24 22:11:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-24 22:15:01 --> [REQ_ID=1d03c688b19e] [REQUEST][START] GET /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-24 22:15:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-24 22:15:01 --> [REQ_ID=1d03c688b19e] [FILTER_BEFORE] /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-24 22:15:01 --> [REQ_ID=1d03c688b19e] [ROUTE] Controller=\App\Modules\APIs\Controllers\AlertsAPIController Method=fetchEmailAlerts
DEBUG - 2026-03-24 22:15:01 --> [REQ_ID=1d03c688b19e] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-24 22:15:01 --> [REQ_ID=1d03c688b19e] [REQUEST][END]
INFO - 2026-03-24 22:15:01 --> [REQ_ID=1d03c688b19e] [PERF] Execution time=0.045009
DEBUG - 2026-03-24 22:16:20 --> [REQ_ID=cebe9ddfafc7] [REQUEST][START] GET /
DEBUG - 2026-03-24 22:16:20 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-24 22:16:20 --> [REQ_ID=cebe9ddfafc7] [FILTER_BEFORE] /
DEBUG - 2026-03-24 22:16:20 --> [REQ_ID=cebe9ddfafc7] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-24 22:16:20 --> [REQ_ID=cebe9ddfafc7] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-24 22:16:20 --> [CSRF] token name=csrf_test_name hash=1d9e21a918dedc5a785119bc81b64b94
DEBUG - 2026-03-24 22:16:20 --> [REQ_ID=7fafc6912391] [INIT] App\Controllers\Home::GET
INFO - 2026-03-24 22:16:20 --> [REQ_ID=7fafc6912391] [MEMORY][controller-start] 6291456
INFO - 2026-03-24 22:16:20 --> [REQ_ID=7fafc6912391] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-24 22:16:20 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-24 22:16:21 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
DEBUG - 2026-03-24 22:16:21 --> [REQ_ID=7fafc6912391] [VIEW_RENDER] themes/public/home
INFO - 2026-03-24 22:16:21 --> [REQ_ID=7fafc6912391] [MEMORY][commonData:start] 10485760
INFO - 2026-03-24 22:16:21 --> themesMemory usage: 10485760
DEBUG - 2026-03-24 22:16:21 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-24 22:16:21 --> [REQ_ID=cebe9ddfafc7] [FILTER_AFTER]
DEBUG - 2026-03-24 22:16:21 --> [REQ_ID=cebe9ddfafc7] [LIFECYCLE][END] status=200 duration_ms=675.56 memory_delta=4194304
INFO - 2026-03-24 22:16:21 --> [REQ_ID=7fafc6912391] [PERF] Execution time=0.673385
DEBUG - 2026-03-24 22:16:21 --> [REQ_ID=cebe9ddfafc7] [REQUEST][END]
INFO - 2026-03-24 22:16:21 --> [REQ_ID=cebe9ddfafc7] [PERF] Execution time=0.715403
DEBUG - 2026-03-24 22:16:22 --> [REQ_ID=55d2a4153daa] [REQUEST][START] HEAD /
DEBUG - 2026-03-24 22:16:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-24 22:16:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-24 22:16:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-24 22:16:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-24 22:16:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-24 22:21:22 --> [REQ_ID=2667ab3cbc4a] [REQUEST][START] HEAD /
DEBUG - 2026-03-24 22:21:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-24 22:21:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-24 22:21:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-24 22:21:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-24 22:21:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-24 22:26:22 --> [REQ_ID=f2fa1cab0512] [REQUEST][START] HEAD /
DEBUG - 2026-03-24 22:26:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-24 22:26:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-24 22:26:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-24 22:26:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-24 22:26:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-24 22:31:22 --> [REQ_ID=d938c6576325] [REQUEST][START] HEAD /
DEBUG - 2026-03-24 22:31:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-24 22:31:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-24 22:31:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-24 22:31:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-24 22:31:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-24 22:36:22 --> [REQ_ID=fd98f775100a] [REQUEST][START] HEAD /
DEBUG - 2026-03-24 22:36:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-24 22:36:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-24 22:36:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-24 22:36:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-24 22:36:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-24 22:41:22 --> [REQ_ID=5533cac900de] [REQUEST][START] HEAD /
DEBUG - 2026-03-24 22:41:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-24 22:41:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-24 22:41:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-24 22:41:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-24 22:41:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-24 22:46:22 --> [REQ_ID=7b1eee3a8640] [REQUEST][START] HEAD /
DEBUG - 2026-03-24 22:46:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-24 22:46:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-24 22:46:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-24 22:46:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-24 22:46:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-24 22:51:22 --> [REQ_ID=6ef75bb1a96e] [REQUEST][START] HEAD /
DEBUG - 2026-03-24 22:51:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-24 22:51:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-24 22:51:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-24 22:51:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-24 22:51:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-24 22:56:22 --> [REQ_ID=855652558373] [REQUEST][START] HEAD /
DEBUG - 2026-03-24 22:56:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-24 22:56:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-24 22:56:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-24 22:56:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-24 22:56:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-24 23:00:02 --> [REQ_ID=eaa5c6f61266] [REQUEST][START] GET /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-24 23:00:02 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-24 23:00:02 --> [REQ_ID=eaa5c6f61266] [FILTER_BEFORE] /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-24 23:00:02 --> [REQ_ID=eaa5c6f61266] [ROUTE] Controller=\App\Modules\Management\Controllers\ManagementAPIController Method=Run_CRON_Tasks
DEBUG - 2026-03-24 23:00:02 --> [REQ_ID=eaa5c6f61266] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-24 23:00:02 --> [REQ_ID=eaa5c6f61266] [REQUEST][END]
INFO - 2026-03-24 23:00:02 --> [REQ_ID=eaa5c6f61266] [PERF] Execution time=0.042189
DEBUG - 2026-03-24 23:01:22 --> [REQ_ID=6460fd094f43] [REQUEST][START] HEAD /
DEBUG - 2026-03-24 23:01:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-24 23:01:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-24 23:01:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-24 23:01:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-24 23:01:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-24 23:04:23 --> [REQ_ID=29897ba14e65] [REQUEST][START] GET /index.php/How-It-Works/MyMI-Gold
DEBUG - 2026-03-24 23:04:23 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-24 23:04:23 --> [REQ_ID=29897ba14e65] [REQUEST][END]
INFO - 2026-03-24 23:04:23 --> [REQ_ID=29897ba14e65] [PERF] Execution time=0.041628
DEBUG - 2026-03-24 23:06:22 --> [REQ_ID=c79d9b8c698b] [REQUEST][START] HEAD /
DEBUG - 2026-03-24 23:06:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-24 23:06:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-24 23:06:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-24 23:06:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-24 23:06:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-24 23:11:22 --> [REQ_ID=935b409c09bb] [REQUEST][START] HEAD /
DEBUG - 2026-03-24 23:11:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-24 23:11:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-24 23:11:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-24 23:11:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-24 23:11:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-24 23:15:01 --> [REQ_ID=a39cd06e810a] [REQUEST][START] GET /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-24 23:15:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-24 23:15:02 --> [REQ_ID=a39cd06e810a] [FILTER_BEFORE] /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-24 23:15:02 --> [REQ_ID=a39cd06e810a] [ROUTE] Controller=\App\Modules\APIs\Controllers\AlertsAPIController Method=fetchEmailAlerts
DEBUG - 2026-03-24 23:15:02 --> [REQ_ID=a39cd06e810a] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-24 23:15:02 --> [REQ_ID=a39cd06e810a] [REQUEST][END]
INFO - 2026-03-24 23:15:02 --> [REQ_ID=a39cd06e810a] [PERF] Execution time=0.046615
DEBUG - 2026-03-24 23:16:22 --> [REQ_ID=28a5633b032b] [REQUEST][START] HEAD /
DEBUG - 2026-03-24 23:16:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-24 23:16:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-24 23:16:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-24 23:16:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-24 23:16:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-24 23:21:22 --> [REQ_ID=0558d634ea46] [REQUEST][START] HEAD /
DEBUG - 2026-03-24 23:21:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-24 23:21:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-24 23:21:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-24 23:21:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-24 23:21:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-24 23:26:22 --> [REQ_ID=d32165e6cf29] [REQUEST][START] HEAD /
DEBUG - 2026-03-24 23:26:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-24 23:26:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-24 23:26:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-24 23:26:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-24 23:26:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-24 23:31:22 --> [REQ_ID=a993ffd0b09d] [REQUEST][START] HEAD /
DEBUG - 2026-03-24 23:31:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-24 23:31:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-24 23:31:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-24 23:31:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-24 23:31:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-24 23:34:00 --> [REQ_ID=9fa6ffd521e3] [REQUEST][START] GET /index.php/forgot
DEBUG - 2026-03-24 23:34:00 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-24 23:34:00 --> [REQ_ID=9fa6ffd521e3] [REQUEST][END]
INFO - 2026-03-24 23:34:00 --> [REQ_ID=9fa6ffd521e3] [PERF] Execution time=0.054439
DEBUG - 2026-03-24 23:36:22 --> [REQ_ID=8bfe3c0f8558] [REQUEST][START] HEAD /
DEBUG - 2026-03-24 23:36:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-24 23:36:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-24 23:36:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-24 23:36:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-24 23:36:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-24 23:39:40 --> [REQ_ID=db5950b69b9f] [REQUEST][START] GET /index.php/Memberships/Customize
DEBUG - 2026-03-24 23:39:40 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-24 23:39:40 --> [REQ_ID=db5950b69b9f] [REQUEST][END]
INFO - 2026-03-24 23:39:40 --> [REQ_ID=db5950b69b9f] [PERF] Execution time=0.039885
DEBUG - 2026-03-24 23:41:22 --> [REQ_ID=c66f239e279c] [REQUEST][START] HEAD /
DEBUG - 2026-03-24 23:41:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-24 23:41:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-24 23:41:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-24 23:41:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-24 23:41:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-24 23:44:42 --> [REQ_ID=16c230ce8f35] [REQUEST][START] GET /index.php/Management/Security
DEBUG - 2026-03-24 23:44:42 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-24 23:44:42 --> [REQ_ID=16c230ce8f35] [REQUEST][END]
INFO - 2026-03-24 23:44:42 --> [REQ_ID=16c230ce8f35] [PERF] Execution time=0.049768
DEBUG - 2026-03-24 23:46:22 --> [REQ_ID=4da078b4ce89] [REQUEST][START] HEAD /
DEBUG - 2026-03-24 23:46:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-24 23:46:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-24 23:46:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-24 23:46:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-24 23:46:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-24 23:50:56 --> [REQ_ID=5e1b57c1a87d] [REQUEST][START] GET /index.php/Investments
DEBUG - 2026-03-24 23:50:56 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-24 23:50:56 --> [REQ_ID=5e1b57c1a87d] [REQUEST][END]
INFO - 2026-03-24 23:50:56 --> [REQ_ID=5e1b57c1a87d] [PERF] Execution time=0.045901
DEBUG - 2026-03-24 23:51:22 --> [REQ_ID=6b931a2d947b] [REQUEST][START] HEAD /
DEBUG - 2026-03-24 23:51:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-24 23:51:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-24 23:51:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-24 23:51:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-24 23:51:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-24 23:56:22 --> [REQ_ID=971801f8ffe2] [REQUEST][START] HEAD /
DEBUG - 2026-03-24 23:56:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-24 23:56:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-24 23:56:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-24 23:56:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-24 23:56:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
