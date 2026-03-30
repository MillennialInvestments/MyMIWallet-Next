<?php defined('SYSTEMPATH') || exit('No direct script access allowed'); ?>

DEBUG - 2026-03-23 00:00:01 --> [REQ_ID=4e576b580fd8] [REQUEST][START] GET /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-23 00:00:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-23 00:00:01 --> [REQ_ID=4e576b580fd8] [FILTER_BEFORE] /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-23 00:00:01 --> [REQ_ID=4e576b580fd8] [ROUTE] Controller=\App\Modules\Management\Controllers\ManagementAPIController Method=Run_CRON_Tasks
DEBUG - 2026-03-23 00:00:01 --> [REQ_ID=4e576b580fd8] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-23 00:00:01 --> [REQ_ID=4e576b580fd8] [REQUEST][END]
INFO - 2026-03-23 00:00:01 --> [REQ_ID=4e576b580fd8] [PERF] Execution time=0.044531
DEBUG - 2026-03-23 00:01:22 --> [REQ_ID=f59bc30c432e] [REQUEST][START] HEAD /
DEBUG - 2026-03-23 00:01:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-23 00:01:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-23 00:01:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-23 00:01:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-23 00:01:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-23 00:01:42 --> [REQ_ID=270aede8867f] [REQUEST][START] GET /
DEBUG - 2026-03-23 00:01:42 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-23 00:01:42 --> [REQ_ID=270aede8867f] [FILTER_BEFORE] /
DEBUG - 2026-03-23 00:01:42 --> [REQ_ID=270aede8867f] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-23 00:01:42 --> [REQ_ID=270aede8867f] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-23 00:01:42 --> [CSRF] token name=csrf_test_name hash=a758a892dc90d54878f71ad35fa58f6c
DEBUG - 2026-03-23 00:01:42 --> [REQ_ID=9d6f083d1eb5] [INIT] App\Controllers\Home::GET
INFO - 2026-03-23 00:01:42 --> [REQ_ID=9d6f083d1eb5] [MEMORY][controller-start] 4194304
INFO - 2026-03-23 00:01:43 --> [REQ_ID=9d6f083d1eb5] [MEMORY][commonData:start] 4194304
DEBUG - 2026-03-23 00:01:43 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-23 00:01:43 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-03-23 00:01:43 --> [REQ_ID=9d6f083d1eb5] [VIEW_RENDER] themes/public/home
INFO - 2026-03-23 00:01:43 --> [REQ_ID=9d6f083d1eb5] [MEMORY][commonData:start] 8388608
INFO - 2026-03-23 00:01:43 --> themesMemory usage: 8388608
DEBUG - 2026-03-23 00:01:43 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-23 00:01:43 --> [REQ_ID=270aede8867f] [FILTER_AFTER]
DEBUG - 2026-03-23 00:01:43 --> [REQ_ID=270aede8867f] [LIFECYCLE][END] status=200 duration_ms=987.32 memory_delta=4194304
INFO - 2026-03-23 00:01:43 --> [REQ_ID=9d6f083d1eb5] [PERF] Execution time=0.985302
DEBUG - 2026-03-23 00:01:43 --> [REQ_ID=270aede8867f] [REQUEST][END]
INFO - 2026-03-23 00:01:43 --> [REQ_ID=270aede8867f] [PERF] Execution time=1.006652
DEBUG - 2026-03-23 00:06:22 --> [REQ_ID=77e1c64d3c0f] [REQUEST][START] HEAD /
DEBUG - 2026-03-23 00:06:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-23 00:06:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-23 00:06:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-23 00:06:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-23 00:06:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-23 00:11:22 --> [REQ_ID=c0abf41a0681] [REQUEST][START] HEAD /
DEBUG - 2026-03-23 00:11:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-23 00:11:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-23 00:11:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-23 00:11:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-23 00:11:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-23 00:15:02 --> [REQ_ID=9a45faa718b1] [REQUEST][START] GET /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-23 00:15:02 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-23 00:15:02 --> [REQ_ID=9a45faa718b1] [FILTER_BEFORE] /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-23 00:15:02 --> [REQ_ID=9a45faa718b1] [ROUTE] Controller=\App\Modules\APIs\Controllers\AlertsAPIController Method=fetchEmailAlerts
DEBUG - 2026-03-23 00:15:02 --> [REQ_ID=9a45faa718b1] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-23 00:15:02 --> [REQ_ID=9a45faa718b1] [REQUEST][END]
INFO - 2026-03-23 00:15:02 --> [REQ_ID=9a45faa718b1] [PERF] Execution time=0.046976
DEBUG - 2026-03-23 00:16:22 --> [REQ_ID=afb43ea933f1] [REQUEST][START] HEAD /
DEBUG - 2026-03-23 00:16:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-23 00:16:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-23 00:16:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-23 00:16:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-23 00:16:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-23 00:21:22 --> [REQ_ID=c7352db73250] [REQUEST][START] HEAD /
DEBUG - 2026-03-23 00:21:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-23 00:21:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-23 00:21:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-23 00:21:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-23 00:21:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-23 00:26:22 --> [REQ_ID=7caa0e6607e6] [REQUEST][START] HEAD /
DEBUG - 2026-03-23 00:26:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-23 00:26:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-23 00:26:23 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-23 00:26:23 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-23 00:26:23 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-23 00:31:22 --> [REQ_ID=ea444cacf414] [REQUEST][START] HEAD /
DEBUG - 2026-03-23 00:31:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-23 00:31:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-23 00:31:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-23 00:31:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-23 00:31:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-23 00:36:22 --> [REQ_ID=68426ae1703b] [REQUEST][START] HEAD /
DEBUG - 2026-03-23 00:36:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-23 00:36:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-23 00:36:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-23 00:36:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-23 00:36:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-23 00:41:22 --> [REQ_ID=95e2879963b5] [REQUEST][START] HEAD /
DEBUG - 2026-03-23 00:41:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-23 00:41:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-23 00:41:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-23 00:41:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-23 00:41:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-23 00:46:22 --> [REQ_ID=393f993ad2a3] [REQUEST][START] HEAD /
DEBUG - 2026-03-23 00:46:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-23 00:46:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-23 00:46:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-23 00:46:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-23 00:46:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-23 00:51:22 --> [REQ_ID=16bae9ec98f1] [REQUEST][START] HEAD /
DEBUG - 2026-03-23 00:51:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-23 00:51:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-23 00:51:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-23 00:51:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-23 00:51:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-23 00:56:04 --> [REQ_ID=52e39751d841] [REQUEST][START] GET /
DEBUG - 2026-03-23 00:56:04 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-23 00:56:04 --> [REQ_ID=52e39751d841] [REQUEST][END]
INFO - 2026-03-23 00:56:04 --> [REQ_ID=52e39751d841] [PERF] Execution time=0.038540
DEBUG - 2026-03-23 00:56:22 --> [REQ_ID=b3eb8b1eda5b] [REQUEST][START] HEAD /
DEBUG - 2026-03-23 00:56:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-23 00:56:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-23 00:56:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-23 00:56:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-23 00:56:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-23 01:00:01 --> [REQ_ID=5209e2a77636] [REQUEST][START] GET /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-23 01:00:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-23 01:00:01 --> [REQ_ID=5209e2a77636] [FILTER_BEFORE] /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-23 01:00:01 --> [REQ_ID=5209e2a77636] [ROUTE] Controller=\App\Modules\Management\Controllers\ManagementAPIController Method=Run_CRON_Tasks
DEBUG - 2026-03-23 01:00:01 --> [REQ_ID=5209e2a77636] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-23 01:00:01 --> [REQ_ID=5209e2a77636] [REQUEST][END]
INFO - 2026-03-23 01:00:01 --> [REQ_ID=5209e2a77636] [PERF] Execution time=0.106456
DEBUG - 2026-03-23 01:01:22 --> [REQ_ID=282758c1ea22] [REQUEST][START] HEAD /
DEBUG - 2026-03-23 01:01:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-23 01:01:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-23 01:01:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-23 01:01:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-23 01:01:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-23 01:06:22 --> [REQ_ID=ad49ca7565a4] [REQUEST][START] HEAD /
DEBUG - 2026-03-23 01:06:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-23 01:06:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-23 01:06:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-23 01:06:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-23 01:06:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-23 01:11:22 --> [REQ_ID=5b90a84ef128] [REQUEST][START] HEAD /
DEBUG - 2026-03-23 01:11:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-23 01:11:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-23 01:11:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-23 01:11:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-23 01:11:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-23 01:15:01 --> [REQ_ID=fe2e5acf5a34] [REQUEST][START] GET /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-23 01:15:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-23 01:15:01 --> [REQ_ID=fe2e5acf5a34] [FILTER_BEFORE] /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-23 01:15:01 --> [REQ_ID=fe2e5acf5a34] [ROUTE] Controller=\App\Modules\APIs\Controllers\AlertsAPIController Method=fetchEmailAlerts
DEBUG - 2026-03-23 01:15:01 --> [REQ_ID=fe2e5acf5a34] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-23 01:15:01 --> [REQ_ID=fe2e5acf5a34] [REQUEST][END]
INFO - 2026-03-23 01:15:01 --> [REQ_ID=fe2e5acf5a34] [PERF] Execution time=0.047774
DEBUG - 2026-03-23 01:16:22 --> [REQ_ID=b6852fd6e8cf] [REQUEST][START] HEAD /
DEBUG - 2026-03-23 01:16:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-23 01:16:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-23 01:16:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-23 01:16:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-23 01:16:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-23 01:21:22 --> [REQ_ID=8f2253082341] [REQUEST][START] HEAD /
DEBUG - 2026-03-23 01:21:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-23 01:21:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-23 01:21:23 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-23 01:21:23 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-23 01:21:23 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-23 01:26:22 --> [REQ_ID=dc083ed4b674] [REQUEST][START] HEAD /
DEBUG - 2026-03-23 01:26:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-23 01:26:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-23 01:26:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-23 01:26:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-23 01:26:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-23 01:30:36 --> [REQ_ID=622c8f51aff3] [REQUEST][START] GET /
DEBUG - 2026-03-23 01:30:36 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-23 01:30:36 --> [REQ_ID=622c8f51aff3] [REQUEST][END]
INFO - 2026-03-23 01:30:36 --> [REQ_ID=622c8f51aff3] [PERF] Execution time=0.038507
DEBUG - 2026-03-23 01:31:22 --> [REQ_ID=16fff5c8baf7] [REQUEST][START] HEAD /
DEBUG - 2026-03-23 01:31:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-23 01:31:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-23 01:31:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-23 01:31:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-23 01:31:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-23 01:36:22 --> [REQ_ID=c377f1333d00] [REQUEST][START] HEAD /
DEBUG - 2026-03-23 01:36:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-23 01:36:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-23 01:36:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-23 01:36:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-23 01:36:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-23 01:38:04 --> [REQ_ID=795eb9c7580c] [REQUEST][START] GET /
DEBUG - 2026-03-23 01:38:04 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-23 01:38:04 --> [REQ_ID=795eb9c7580c] [FILTER_BEFORE] /
DEBUG - 2026-03-23 01:38:04 --> [REQ_ID=795eb9c7580c] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-23 01:38:04 --> [REQ_ID=795eb9c7580c] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-23 01:38:04 --> [CSRF] token name=csrf_test_name hash=dff26df8c7bd87cff1b4c813602a1096
DEBUG - 2026-03-23 01:38:04 --> [REQ_ID=d1ef9ca0165d] [INIT] App\Controllers\Home::GET
INFO - 2026-03-23 01:38:04 --> [REQ_ID=d1ef9ca0165d] [MEMORY][controller-start] 6291456
INFO - 2026-03-23 01:38:04 --> [REQ_ID=d1ef9ca0165d] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-23 01:38:04 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-23 01:38:05 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-03-23 01:38:05 --> [REQ_ID=d1ef9ca0165d] [VIEW_RENDER] themes/public/home
INFO - 2026-03-23 01:38:05 --> [REQ_ID=d1ef9ca0165d] [MEMORY][commonData:start] 10485760
INFO - 2026-03-23 01:38:05 --> themesMemory usage: 10485760
DEBUG - 2026-03-23 01:38:05 --> [MetaService] slug= pageName=Home cacheHit= path=DB
DEBUG - 2026-03-23 01:38:05 --> [REQ_ID=795eb9c7580c] [FILTER_AFTER]
DEBUG - 2026-03-23 01:38:05 --> [REQ_ID=795eb9c7580c] [LIFECYCLE][END] status=200 duration_ms=1,485.34 memory_delta=4194304
INFO - 2026-03-23 01:38:05 --> [REQ_ID=d1ef9ca0165d] [PERF] Execution time=1.482162
DEBUG - 2026-03-23 01:38:05 --> [REQ_ID=795eb9c7580c] [REQUEST][END]
INFO - 2026-03-23 01:38:05 --> [REQ_ID=795eb9c7580c] [PERF] Execution time=1.530751
DEBUG - 2026-03-23 01:41:22 --> [REQ_ID=e2addc3cb453] [REQUEST][START] HEAD /
DEBUG - 2026-03-23 01:41:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-23 01:41:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-23 01:41:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-23 01:41:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-23 01:41:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-23 01:46:22 --> [REQ_ID=32cb2ddb27d5] [REQUEST][START] HEAD /
DEBUG - 2026-03-23 01:46:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-23 01:46:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-23 01:46:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-23 01:46:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-23 01:46:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-23 01:46:24 --> [REQ_ID=47041cd7a8db] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-23 01:46:24 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-23 01:46:24 --> [REQ_ID=47041cd7a8db] [REQUEST][END]
INFO - 2026-03-23 01:46:24 --> [REQ_ID=47041cd7a8db] [PERF] Execution time=0.019725
DEBUG - 2026-03-23 01:51:22 --> [REQ_ID=60fbd5740a2f] [REQUEST][START] HEAD /
DEBUG - 2026-03-23 01:51:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-23 01:51:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-23 01:51:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-23 01:51:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-23 01:51:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-23 01:54:53 --> [REQ_ID=72bd3236dee3] [REQUEST][START] GET /
DEBUG - 2026-03-23 01:54:53 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-23 01:54:53 --> [REQ_ID=72bd3236dee3] [FILTER_BEFORE] /
DEBUG - 2026-03-23 01:54:53 --> [REQ_ID=72bd3236dee3] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-23 01:54:53 --> [REQ_ID=72bd3236dee3] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-23 01:54:53 --> [CSRF] token name=csrf_test_name hash=0d69cc4f5e69b6a6e9d9de8b3f2bf712
DEBUG - 2026-03-23 01:54:53 --> [REQ_ID=d5d0d465d33f] [INIT] App\Controllers\Home::GET
INFO - 2026-03-23 01:54:53 --> [REQ_ID=d5d0d465d33f] [MEMORY][controller-start] 6291456
INFO - 2026-03-23 01:54:53 --> [REQ_ID=d5d0d465d33f] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-23 01:54:53 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-23 01:54:54 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-03-23 01:54:54 --> [REQ_ID=d5d0d465d33f] [VIEW_RENDER] themes/public/home
INFO - 2026-03-23 01:54:54 --> [REQ_ID=d5d0d465d33f] [MEMORY][commonData:start] 10485760
INFO - 2026-03-23 01:54:54 --> themesMemory usage: 10485760
DEBUG - 2026-03-23 01:54:54 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-23 01:54:54 --> [REQ_ID=72bd3236dee3] [FILTER_AFTER]
DEBUG - 2026-03-23 01:54:54 --> [REQ_ID=72bd3236dee3] [LIFECYCLE][END] status=200 duration_ms=1,265.10 memory_delta=4194304
INFO - 2026-03-23 01:54:54 --> [REQ_ID=d5d0d465d33f] [PERF] Execution time=1.262549
DEBUG - 2026-03-23 01:54:54 --> [REQ_ID=72bd3236dee3] [REQUEST][END]
INFO - 2026-03-23 01:54:54 --> [REQ_ID=72bd3236dee3] [PERF] Execution time=1.314414
DEBUG - 2026-03-23 01:56:22 --> [REQ_ID=077f660038e6] [REQUEST][START] HEAD /
DEBUG - 2026-03-23 01:56:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-23 01:56:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-23 01:56:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-23 01:56:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-23 01:56:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-23 01:57:46 --> [REQ_ID=967d7f96be31] [REQUEST][START] GET /
DEBUG - 2026-03-23 01:57:46 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-23 01:57:47 --> [REQ_ID=967d7f96be31] [FILTER_BEFORE] /
DEBUG - 2026-03-23 01:57:47 --> [REQ_ID=967d7f96be31] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-23 01:57:47 --> [REQ_ID=967d7f96be31] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-23 01:57:47 --> [CSRF] token name=csrf_test_name hash=3714c601251919360ffad05bebe8f065
DEBUG - 2026-03-23 01:57:47 --> [REQ_ID=aac42a799ff7] [INIT] App\Controllers\Home::GET
INFO - 2026-03-23 01:57:47 --> [REQ_ID=aac42a799ff7] [MEMORY][controller-start] 6291456
INFO - 2026-03-23 01:57:47 --> [REQ_ID=aac42a799ff7] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-23 01:57:47 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-23 01:57:47 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
DEBUG - 2026-03-23 01:57:47 --> [REQ_ID=aac42a799ff7] [VIEW_RENDER] themes/public/home
INFO - 2026-03-23 01:57:47 --> [REQ_ID=aac42a799ff7] [MEMORY][commonData:start] 10485760
INFO - 2026-03-23 01:57:47 --> themesMemory usage: 10485760
DEBUG - 2026-03-23 01:57:47 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-23 01:57:47 --> [REQ_ID=967d7f96be31] [FILTER_AFTER]
DEBUG - 2026-03-23 01:57:47 --> [REQ_ID=967d7f96be31] [LIFECYCLE][END] status=200 duration_ms=924.88 memory_delta=4194304
INFO - 2026-03-23 01:57:47 --> [REQ_ID=aac42a799ff7] [PERF] Execution time=0.922683
DEBUG - 2026-03-23 01:57:47 --> [REQ_ID=967d7f96be31] [REQUEST][END]
INFO - 2026-03-23 01:57:47 --> [REQ_ID=967d7f96be31] [PERF] Execution time=0.963848
DEBUG - 2026-03-23 02:00:01 --> [REQ_ID=eaeb97fff1d8] [REQUEST][START] GET /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-23 02:00:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-23 02:00:01 --> [REQ_ID=eaeb97fff1d8] [FILTER_BEFORE] /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-23 02:00:01 --> [REQ_ID=eaeb97fff1d8] [ROUTE] Controller=\App\Modules\Management\Controllers\ManagementAPIController Method=Run_CRON_Tasks
DEBUG - 2026-03-23 02:00:01 --> [REQ_ID=eaeb97fff1d8] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-23 02:00:01 --> [REQ_ID=eaeb97fff1d8] [REQUEST][END]
INFO - 2026-03-23 02:00:01 --> [REQ_ID=eaeb97fff1d8] [PERF] Execution time=0.045030
DEBUG - 2026-03-23 02:01:22 --> [REQ_ID=e0d44dcc13f5] [REQUEST][START] HEAD /
DEBUG - 2026-03-23 02:01:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-23 02:01:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-23 02:01:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-23 02:01:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-23 02:01:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-23 02:01:40 --> [REQ_ID=227e9a9b4409] [REQUEST][START] GET /index.php/Privacy-Policy
DEBUG - 2026-03-23 02:01:40 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-23 02:01:40 --> [REQ_ID=227e9a9b4409] [REQUEST][END]
INFO - 2026-03-23 02:01:40 --> [REQ_ID=227e9a9b4409] [PERF] Execution time=0.012923
DEBUG - 2026-03-23 02:06:22 --> [REQ_ID=8c1afeabd77d] [REQUEST][START] HEAD /
DEBUG - 2026-03-23 02:06:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-23 02:06:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-23 02:06:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-23 02:06:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-23 02:06:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-23 02:11:22 --> [REQ_ID=44e53bf5715a] [REQUEST][START] HEAD /
DEBUG - 2026-03-23 02:11:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-23 02:11:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-23 02:11:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-23 02:11:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-23 02:11:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-23 02:15:01 --> [REQ_ID=f204db84ee4e] [REQUEST][START] GET /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-23 02:15:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-23 02:15:02 --> [REQ_ID=f204db84ee4e] [FILTER_BEFORE] /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-23 02:15:02 --> [REQ_ID=f204db84ee4e] [ROUTE] Controller=\App\Modules\APIs\Controllers\AlertsAPIController Method=fetchEmailAlerts
DEBUG - 2026-03-23 02:15:02 --> [REQ_ID=f204db84ee4e] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-23 02:15:02 --> [REQ_ID=f204db84ee4e] [REQUEST][END]
INFO - 2026-03-23 02:15:02 --> [REQ_ID=f204db84ee4e] [PERF] Execution time=0.150061
DEBUG - 2026-03-23 02:16:22 --> [REQ_ID=44af16da0321] [REQUEST][START] HEAD /
DEBUG - 2026-03-23 02:16:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-23 02:16:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-23 02:16:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-23 02:16:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-23 02:16:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-23 02:21:22 --> [REQ_ID=2d72e312ca73] [REQUEST][START] HEAD /
DEBUG - 2026-03-23 02:21:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-23 02:21:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-23 02:21:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-23 02:21:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-23 02:21:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-23 02:26:22 --> [REQ_ID=a18d53666aeb] [REQUEST][START] HEAD /
DEBUG - 2026-03-23 02:26:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-23 02:26:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-23 02:26:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-23 02:26:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-23 02:26:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-23 02:31:22 --> [REQ_ID=002c6872a9ce] [REQUEST][START] HEAD /
DEBUG - 2026-03-23 02:31:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-23 02:31:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-23 02:31:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-23 02:31:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-23 02:31:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-23 02:31:42 --> [REQ_ID=d171538bf59a] [REQUEST][START] GET /
DEBUG - 2026-03-23 02:31:42 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-23 02:31:42 --> [REQ_ID=d171538bf59a] [FILTER_BEFORE] /
DEBUG - 2026-03-23 02:31:42 --> [REQ_ID=d171538bf59a] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-23 02:31:42 --> [REQ_ID=d171538bf59a] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-23 02:31:42 --> [CSRF] token name=csrf_test_name hash=c3d6d10aedd705d75650e0c3729fab95
DEBUG - 2026-03-23 02:31:42 --> [REQ_ID=3a5ad8e78e3f] [INIT] App\Controllers\Home::GET
INFO - 2026-03-23 02:31:42 --> [REQ_ID=3a5ad8e78e3f] [MEMORY][controller-start] 4194304
INFO - 2026-03-23 02:31:42 --> [REQ_ID=3a5ad8e78e3f] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-23 02:31:42 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-23 02:31:43 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-03-23 02:31:43 --> [REQ_ID=3a5ad8e78e3f] [VIEW_RENDER] themes/public/home
INFO - 2026-03-23 02:31:43 --> [REQ_ID=3a5ad8e78e3f] [MEMORY][commonData:start] 8388608
INFO - 2026-03-23 02:31:43 --> themesMemory usage: 8388608
DEBUG - 2026-03-23 02:31:43 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-23 02:31:43 --> [REQ_ID=d171538bf59a] [FILTER_AFTER]
DEBUG - 2026-03-23 02:31:43 --> [REQ_ID=d171538bf59a] [LIFECYCLE][END] status=200 duration_ms=941.21 memory_delta=4194304
INFO - 2026-03-23 02:31:43 --> [REQ_ID=3a5ad8e78e3f] [PERF] Execution time=0.938668
DEBUG - 2026-03-23 02:31:43 --> [REQ_ID=d171538bf59a] [REQUEST][END]
INFO - 2026-03-23 02:31:43 --> [REQ_ID=d171538bf59a] [PERF] Execution time=0.964086
DEBUG - 2026-03-23 02:36:22 --> [REQ_ID=ca82777f892a] [REQUEST][START] HEAD /
DEBUG - 2026-03-23 02:36:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-23 02:36:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-23 02:36:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-23 02:36:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-23 02:36:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-23 02:37:33 --> [REQ_ID=49457cc981ee] [REQUEST][START] GET /
DEBUG - 2026-03-23 02:37:33 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-23 02:37:33 --> [REQ_ID=49457cc981ee] [REQUEST][END]
INFO - 2026-03-23 02:37:33 --> [REQ_ID=49457cc981ee] [PERF] Execution time=0.017969
DEBUG - 2026-03-23 02:41:22 --> [REQ_ID=2c4eed2da722] [REQUEST][START] HEAD /
DEBUG - 2026-03-23 02:41:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-23 02:41:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-23 02:41:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-23 02:41:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-23 02:41:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-23 02:46:22 --> [REQ_ID=9a6dec2af1e5] [REQUEST][START] HEAD /
DEBUG - 2026-03-23 02:46:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-23 02:46:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-23 02:46:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-23 02:46:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-23 02:46:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-23 02:51:22 --> [REQ_ID=5f2e2d50069d] [REQUEST][START] HEAD /
DEBUG - 2026-03-23 02:51:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-23 02:51:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-23 02:51:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-23 02:51:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-23 02:51:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-23 02:56:22 --> [REQ_ID=207303238aaf] [REQUEST][START] HEAD /
DEBUG - 2026-03-23 02:56:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-23 02:56:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-23 02:56:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-23 02:56:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-23 02:56:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-23 03:00:01 --> [REQ_ID=ed3f0ed79616] [REQUEST][START] GET /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-23 03:00:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-23 03:00:01 --> [REQ_ID=ed3f0ed79616] [FILTER_BEFORE] /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-23 03:00:01 --> [REQ_ID=ed3f0ed79616] [ROUTE] Controller=\App\Modules\Management\Controllers\ManagementAPIController Method=Run_CRON_Tasks
DEBUG - 2026-03-23 03:00:01 --> [REQ_ID=ed3f0ed79616] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-23 03:00:01 --> [REQ_ID=ed3f0ed79616] [REQUEST][END]
INFO - 2026-03-23 03:00:01 --> [REQ_ID=ed3f0ed79616] [PERF] Execution time=0.037341
DEBUG - 2026-03-23 03:01:22 --> [REQ_ID=86b0ee1b6064] [REQUEST][START] HEAD /
DEBUG - 2026-03-23 03:01:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-23 03:01:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-23 03:01:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-23 03:01:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-23 03:01:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-23 03:01:24 --> [REQ_ID=1ea5dc0d5a17] [REQUEST][START] GET /
DEBUG - 2026-03-23 03:01:24 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-23 03:01:24 --> [REQ_ID=1ea5dc0d5a17] [REQUEST][END]
INFO - 2026-03-23 03:01:24 --> [REQ_ID=1ea5dc0d5a17] [PERF] Execution time=0.021423
DEBUG - 2026-03-23 03:02:55 --> [REQ_ID=1c976bf3a4d1] [REQUEST][START] GET /
DEBUG - 2026-03-23 03:02:55 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-23 03:02:55 --> [REQ_ID=1c976bf3a4d1] [FILTER_BEFORE] /
DEBUG - 2026-03-23 03:02:55 --> [REQ_ID=1c976bf3a4d1] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-23 03:02:55 --> [REQ_ID=1c976bf3a4d1] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-23 03:02:55 --> [CSRF] token name=csrf_test_name hash=5867b314cf8720cd78b6dd775193db1a
DEBUG - 2026-03-23 03:02:55 --> [REQ_ID=4839a3fbae63] [INIT] App\Controllers\Home::GET
INFO - 2026-03-23 03:02:55 --> [REQ_ID=4839a3fbae63] [MEMORY][controller-start] 6291456
INFO - 2026-03-23 03:02:55 --> [REQ_ID=4839a3fbae63] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-23 03:02:55 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-23 03:02:56 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-03-23 03:02:56 --> [REQ_ID=4839a3fbae63] [VIEW_RENDER] themes/public/home
INFO - 2026-03-23 03:02:56 --> [REQ_ID=4839a3fbae63] [MEMORY][commonData:start] 10485760
INFO - 2026-03-23 03:02:56 --> themesMemory usage: 10485760
DEBUG - 2026-03-23 03:02:56 --> [MetaService] slug= pageName=Home cacheHit= path=DB
DEBUG - 2026-03-23 03:02:56 --> [REQ_ID=1c976bf3a4d1] [FILTER_AFTER]
DEBUG - 2026-03-23 03:02:56 --> [REQ_ID=1c976bf3a4d1] [LIFECYCLE][END] status=200 duration_ms=955.24 memory_delta=4194304
INFO - 2026-03-23 03:02:56 --> [REQ_ID=4839a3fbae63] [PERF] Execution time=0.953053
DEBUG - 2026-03-23 03:02:56 --> [REQ_ID=1c976bf3a4d1] [REQUEST][END]
INFO - 2026-03-23 03:02:56 --> [REQ_ID=1c976bf3a4d1] [PERF] Execution time=1.001484
DEBUG - 2026-03-23 03:06:22 --> [REQ_ID=fda93e63de1d] [REQUEST][START] HEAD /
DEBUG - 2026-03-23 03:06:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-23 03:06:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-23 03:06:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-23 03:06:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-23 03:06:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-23 03:11:22 --> [REQ_ID=fdf0b90ba0ab] [REQUEST][START] HEAD /
DEBUG - 2026-03-23 03:11:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-23 03:11:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-23 03:11:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-23 03:11:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-23 03:11:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-23 03:15:01 --> [REQ_ID=cd36a977087f] [REQUEST][START] GET /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-23 03:15:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-23 03:15:01 --> [REQ_ID=cd36a977087f] [FILTER_BEFORE] /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-23 03:15:01 --> [REQ_ID=cd36a977087f] [ROUTE] Controller=\App\Modules\APIs\Controllers\AlertsAPIController Method=fetchEmailAlerts
DEBUG - 2026-03-23 03:15:01 --> [REQ_ID=cd36a977087f] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-23 03:15:01 --> [REQ_ID=cd36a977087f] [REQUEST][END]
INFO - 2026-03-23 03:15:01 --> [REQ_ID=cd36a977087f] [PERF] Execution time=0.044930
DEBUG - 2026-03-23 03:16:22 --> [REQ_ID=bd23df0808e4] [REQUEST][START] HEAD /
DEBUG - 2026-03-23 03:16:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-23 03:16:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-23 03:16:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-23 03:16:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-23 03:16:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-23 03:21:22 --> [REQ_ID=43f7f0aa8b8a] [REQUEST][START] HEAD /
DEBUG - 2026-03-23 03:21:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-23 03:21:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-23 03:21:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-23 03:21:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-23 03:21:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-23 03:26:22 --> [REQ_ID=d39e80b1e2c4] [REQUEST][START] HEAD /
DEBUG - 2026-03-23 03:26:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-23 03:26:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-23 03:26:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-23 03:26:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-23 03:26:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-23 03:31:22 --> [REQ_ID=8cc5cc924f17] [REQUEST][START] HEAD /
DEBUG - 2026-03-23 03:31:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-23 03:31:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-23 03:31:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-23 03:31:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-23 03:31:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-23 03:36:22 --> [REQ_ID=c248dea14e65] [REQUEST][START] HEAD /
DEBUG - 2026-03-23 03:36:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-23 03:36:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-23 03:36:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-23 03:36:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-23 03:36:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-23 03:41:22 --> [REQ_ID=235bc3d060d6] [REQUEST][START] HEAD /
DEBUG - 2026-03-23 03:41:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-23 03:41:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-23 03:41:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-23 03:41:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-23 03:41:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-23 03:41:46 --> [REQ_ID=5adbd01122c2] [REQUEST][START] GET /
DEBUG - 2026-03-23 03:41:46 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-23 03:41:46 --> [REQ_ID=5adbd01122c2] [FILTER_BEFORE] /
DEBUG - 2026-03-23 03:41:46 --> [REQ_ID=5adbd01122c2] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-23 03:41:46 --> [REQ_ID=5adbd01122c2] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-23 03:41:46 --> [CSRF] token name=csrf_test_name hash=5fc305e8ddfc12aa0677fb8349a8b157
DEBUG - 2026-03-23 03:41:46 --> [REQ_ID=656726aa799a] [INIT] App\Controllers\Home::GET
INFO - 2026-03-23 03:41:46 --> [REQ_ID=656726aa799a] [MEMORY][controller-start] 4194304
INFO - 2026-03-23 03:41:46 --> [REQ_ID=656726aa799a] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-23 03:41:46 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-23 03:41:47 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-03-23 03:41:47 --> [REQ_ID=656726aa799a] [VIEW_RENDER] themes/public/home
INFO - 2026-03-23 03:41:47 --> [REQ_ID=656726aa799a] [MEMORY][commonData:start] 8388608
INFO - 2026-03-23 03:41:47 --> themesMemory usage: 8388608
DEBUG - 2026-03-23 03:41:47 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-23 03:41:47 --> [REQ_ID=5adbd01122c2] [FILTER_AFTER]
DEBUG - 2026-03-23 03:41:47 --> [REQ_ID=5adbd01122c2] [LIFECYCLE][END] status=200 duration_ms=727.26 memory_delta=4194304
INFO - 2026-03-23 03:41:47 --> [REQ_ID=656726aa799a] [PERF] Execution time=0.725384
DEBUG - 2026-03-23 03:41:47 --> [REQ_ID=5adbd01122c2] [REQUEST][END]
INFO - 2026-03-23 03:41:47 --> [REQ_ID=5adbd01122c2] [PERF] Execution time=0.746590
DEBUG - 2026-03-23 03:46:22 --> [REQ_ID=11df3b7e97bb] [REQUEST][START] HEAD /
DEBUG - 2026-03-23 03:46:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-23 03:46:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-23 03:46:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-23 03:46:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-23 03:46:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-23 03:51:22 --> [REQ_ID=5b95c5744792] [REQUEST][START] HEAD /
DEBUG - 2026-03-23 03:51:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-23 03:51:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-23 03:51:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-23 03:51:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-23 03:51:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-23 03:56:22 --> [REQ_ID=6f9c64cf9cfa] [REQUEST][START] HEAD /
DEBUG - 2026-03-23 03:56:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-23 03:56:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-23 03:56:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-23 03:56:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-23 03:56:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-23 04:00:01 --> [REQ_ID=1fb61013b50d] [REQUEST][START] GET /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-23 04:00:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-23 04:00:01 --> [REQ_ID=1fb61013b50d] [FILTER_BEFORE] /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-23 04:00:01 --> [REQ_ID=1fb61013b50d] [ROUTE] Controller=\App\Modules\Management\Controllers\ManagementAPIController Method=Run_CRON_Tasks
DEBUG - 2026-03-23 04:00:01 --> [REQ_ID=1fb61013b50d] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-23 04:00:01 --> [REQ_ID=1fb61013b50d] [REQUEST][END]
INFO - 2026-03-23 04:00:01 --> [REQ_ID=1fb61013b50d] [PERF] Execution time=0.049818
DEBUG - 2026-03-23 04:01:22 --> [REQ_ID=7b6d9fdcfb81] [REQUEST][START] HEAD /
DEBUG - 2026-03-23 04:01:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-23 04:01:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-23 04:01:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-23 04:01:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-23 04:01:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-23 04:06:22 --> [REQ_ID=54f46faa3ae9] [REQUEST][START] HEAD /
DEBUG - 2026-03-23 04:06:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-23 04:06:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-23 04:06:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-23 04:06:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-23 04:06:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-23 04:11:22 --> [REQ_ID=3cd66c8defbd] [REQUEST][START] HEAD /
DEBUG - 2026-03-23 04:11:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-23 04:11:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-23 04:11:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-23 04:11:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-23 04:11:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-23 04:13:16 --> [REQ_ID=e679df9b7a87] [REQUEST][START] GET /
DEBUG - 2026-03-23 04:13:16 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-23 04:13:16 --> [REQ_ID=e679df9b7a87] [FILTER_BEFORE] /
DEBUG - 2026-03-23 04:13:16 --> [REQ_ID=e679df9b7a87] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-23 04:13:16 --> [REQ_ID=e679df9b7a87] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-23 04:13:16 --> [CSRF] token name=csrf_test_name hash=c409e78ccff17c4573296887e48a2db8
DEBUG - 2026-03-23 04:13:16 --> [REQ_ID=ab24e0db28ce] [INIT] App\Controllers\Home::GET
INFO - 2026-03-23 04:13:16 --> [REQ_ID=ab24e0db28ce] [MEMORY][controller-start] 6291456
INFO - 2026-03-23 04:13:17 --> [REQ_ID=ab24e0db28ce] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-23 04:13:17 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-23 04:13:17 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-03-23 04:13:17 --> [REQ_ID=ab24e0db28ce] [VIEW_RENDER] themes/public/home
INFO - 2026-03-23 04:13:17 --> [REQ_ID=ab24e0db28ce] [MEMORY][commonData:start] 10485760
INFO - 2026-03-23 04:13:17 --> themesMemory usage: 10485760
DEBUG - 2026-03-23 04:13:17 --> [MetaService] slug= pageName=Home cacheHit= path=DB
DEBUG - 2026-03-23 04:13:17 --> [REQ_ID=e679df9b7a87] [FILTER_AFTER]
DEBUG - 2026-03-23 04:13:17 --> [REQ_ID=e679df9b7a87] [LIFECYCLE][END] status=200 duration_ms=1,046.60 memory_delta=4194304
INFO - 2026-03-23 04:13:17 --> [REQ_ID=ab24e0db28ce] [PERF] Execution time=1.044405
DEBUG - 2026-03-23 04:13:17 --> [REQ_ID=e679df9b7a87] [REQUEST][END]
INFO - 2026-03-23 04:13:17 --> [REQ_ID=e679df9b7a87] [PERF] Execution time=1.089857
DEBUG - 2026-03-23 04:15:01 --> [REQ_ID=e35b2ff2066c] [REQUEST][START] GET /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-23 04:15:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-23 04:15:01 --> [REQ_ID=e35b2ff2066c] [FILTER_BEFORE] /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-23 04:15:01 --> [REQ_ID=e35b2ff2066c] [ROUTE] Controller=\App\Modules\APIs\Controllers\AlertsAPIController Method=fetchEmailAlerts
DEBUG - 2026-03-23 04:15:01 --> [REQ_ID=e35b2ff2066c] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-23 04:15:01 --> [REQ_ID=e35b2ff2066c] [REQUEST][END]
INFO - 2026-03-23 04:15:01 --> [REQ_ID=e35b2ff2066c] [PERF] Execution time=0.048992
DEBUG - 2026-03-23 04:16:22 --> [REQ_ID=b39cb35cc8ea] [REQUEST][START] HEAD /
DEBUG - 2026-03-23 04:16:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-23 04:16:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-23 04:16:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-23 04:16:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-23 04:16:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-23 04:16:24 --> [REQ_ID=452d8298d255] [REQUEST][START] GET /index.php/How-It-Works/earnings
DEBUG - 2026-03-23 04:16:24 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-23 04:16:24 --> [REQ_ID=452d8298d255] [REQUEST][END]
INFO - 2026-03-23 04:16:24 --> [REQ_ID=452d8298d255] [PERF] Execution time=0.021742
DEBUG - 2026-03-23 04:21:22 --> [REQ_ID=2eebb57f1001] [REQUEST][START] HEAD /
DEBUG - 2026-03-23 04:21:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-23 04:21:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-23 04:21:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-23 04:21:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-23 04:21:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-23 04:24:20 --> [REQ_ID=261cedf37584] [REQUEST][START] GET /
DEBUG - 2026-03-23 04:24:20 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-23 04:24:20 --> [REQ_ID=261cedf37584] [FILTER_BEFORE] /
DEBUG - 2026-03-23 04:24:20 --> [REQ_ID=261cedf37584] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-23 04:24:20 --> [REQ_ID=261cedf37584] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-23 04:24:20 --> [CSRF] token name=csrf_test_name hash=e61e2a3e8af5993a1574b942ceb01e79
DEBUG - 2026-03-23 04:24:20 --> [REQ_ID=77b1173be560] [INIT] App\Controllers\Home::GET
INFO - 2026-03-23 04:24:20 --> [REQ_ID=77b1173be560] [MEMORY][controller-start] 6291456
INFO - 2026-03-23 04:24:20 --> [REQ_ID=77b1173be560] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-23 04:24:20 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-23 04:24:21 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
DEBUG - 2026-03-23 04:24:21 --> [REQ_ID=77b1173be560] [VIEW_RENDER] themes/public/home
INFO - 2026-03-23 04:24:21 --> [REQ_ID=77b1173be560] [MEMORY][commonData:start] 10485760
INFO - 2026-03-23 04:24:21 --> themesMemory usage: 10485760
DEBUG - 2026-03-23 04:24:21 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-23 04:24:21 --> [REQ_ID=261cedf37584] [FILTER_AFTER]
DEBUG - 2026-03-23 04:24:21 --> [REQ_ID=261cedf37584] [LIFECYCLE][END] status=200 duration_ms=1,044.18 memory_delta=4194304
INFO - 2026-03-23 04:24:21 --> [REQ_ID=77b1173be560] [PERF] Execution time=1.041381
DEBUG - 2026-03-23 04:24:21 --> [REQ_ID=261cedf37584] [REQUEST][END]
INFO - 2026-03-23 04:24:21 --> [REQ_ID=261cedf37584] [PERF] Execution time=1.094733
DEBUG - 2026-03-23 04:26:22 --> [REQ_ID=0a4552b80b5d] [REQUEST][START] HEAD /
DEBUG - 2026-03-23 04:26:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-23 04:26:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-23 04:26:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-23 04:26:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-23 04:26:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-23 04:31:22 --> [REQ_ID=5d07792a8578] [REQUEST][START] HEAD /
DEBUG - 2026-03-23 04:31:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-23 04:31:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-23 04:31:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-23 04:31:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-23 04:31:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-23 04:36:22 --> [REQ_ID=5bf51575ce8b] [REQUEST][START] HEAD /
DEBUG - 2026-03-23 04:36:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-23 04:36:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-23 04:36:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-23 04:36:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-23 04:36:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-23 04:41:22 --> [REQ_ID=f825ccd6aa29] [REQUEST][START] HEAD /
DEBUG - 2026-03-23 04:41:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-23 04:41:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-23 04:41:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-23 04:41:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-23 04:41:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-23 04:46:22 --> [REQ_ID=f5628904ab66] [REQUEST][START] HEAD /
DEBUG - 2026-03-23 04:46:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-23 04:46:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-23 04:46:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-23 04:46:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-23 04:46:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-23 04:51:22 --> [REQ_ID=de3613019c52] [REQUEST][START] HEAD /
DEBUG - 2026-03-23 04:51:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-23 04:51:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-23 04:51:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-23 04:51:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-23 04:51:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-23 04:55:50 --> [REQ_ID=652ddf9665ef] [REQUEST][START] GET /index.php/Knowledgebase/Investor-Profile
DEBUG - 2026-03-23 04:55:50 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-23 04:55:50 --> ErrorException: Access level to App\Modules\User\Controllers\KnowledgebaseController::respondWithRendered() must be protected (as in class App\Controllers\BaseController) or weaker
[Method: GET, Route: Knowledgebase/Investor-Profile]
in APPPATH/Modules/User/Controllers/KnowledgebaseController.php on line 535.
 1 [internal function]: CodeIgniter\Debug\Exceptions->shutdownHandler()
CRITICAL - 2026-03-23 04:55:50 --> [EXCEPTION] Access level to App\Modules\User\Controllers\KnowledgebaseController::respondWithRendered() must be protected (as in class App\Controllers\BaseController) or weaker File=/home/mymiteam/mymiwallet/site/current/app/Modules/User/Controllers/KnowledgebaseController.php Line=535
ERROR - 2026-03-23 04:55:50 --> [ERROR_PAGE] event=error_500 status=500 message=Internal server error.
DEBUG - 2026-03-23 04:56:22 --> [REQ_ID=886b595f572e] [REQUEST][START] HEAD /
DEBUG - 2026-03-23 04:56:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-23 04:56:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-23 04:56:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-23 04:56:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-23 04:56:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-23 05:00:01 --> [REQ_ID=80683d78d910] [REQUEST][START] GET /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-23 05:00:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-23 05:00:01 --> [REQ_ID=80683d78d910] [FILTER_BEFORE] /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-23 05:00:01 --> [REQ_ID=80683d78d910] [ROUTE] Controller=\App\Modules\Management\Controllers\ManagementAPIController Method=Run_CRON_Tasks
DEBUG - 2026-03-23 05:00:01 --> [REQ_ID=80683d78d910] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-23 05:00:01 --> [REQ_ID=80683d78d910] [REQUEST][END]
INFO - 2026-03-23 05:00:01 --> [REQ_ID=80683d78d910] [PERF] Execution time=0.048061
DEBUG - 2026-03-23 05:01:22 --> [REQ_ID=0e34360c0a01] [REQUEST][START] HEAD /
DEBUG - 2026-03-23 05:01:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-23 05:01:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-23 05:01:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-23 05:01:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-23 05:01:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-23 05:06:22 --> [REQ_ID=ae66b4398e43] [REQUEST][START] HEAD /
DEBUG - 2026-03-23 05:06:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-23 05:06:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-23 05:06:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-23 05:06:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-23 05:06:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-23 05:11:22 --> [REQ_ID=19d1b87b33bc] [REQUEST][START] HEAD /
DEBUG - 2026-03-23 05:11:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-23 05:11:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-23 05:11:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-23 05:11:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-23 05:11:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-23 05:15:01 --> [REQ_ID=e1cd377614b4] [REQUEST][START] GET /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-23 05:15:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-23 05:15:01 --> [REQ_ID=e1cd377614b4] [FILTER_BEFORE] /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-23 05:15:01 --> [REQ_ID=e1cd377614b4] [ROUTE] Controller=\App\Modules\APIs\Controllers\AlertsAPIController Method=fetchEmailAlerts
DEBUG - 2026-03-23 05:15:01 --> [REQ_ID=e1cd377614b4] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-23 05:15:01 --> [REQ_ID=e1cd377614b4] [REQUEST][END]
INFO - 2026-03-23 05:15:01 --> [REQ_ID=e1cd377614b4] [PERF] Execution time=0.047853
DEBUG - 2026-03-23 05:16:22 --> [REQ_ID=2cda3b419cac] [REQUEST][START] HEAD /
DEBUG - 2026-03-23 05:16:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-23 05:16:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-23 05:16:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-23 05:16:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-23 05:16:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-23 05:21:22 --> [REQ_ID=0544731deb2a] [REQUEST][START] HEAD /
DEBUG - 2026-03-23 05:21:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-23 05:21:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-23 05:21:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-23 05:21:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-23 05:21:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-23 05:25:21 --> [REQ_ID=5a1b7f7f7cfd] [REQUEST][START] GET /
DEBUG - 2026-03-23 05:25:21 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-23 05:25:21 --> [REQ_ID=5a1b7f7f7cfd] [FILTER_BEFORE] /
DEBUG - 2026-03-23 05:25:21 --> [REQ_ID=5a1b7f7f7cfd] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-23 05:25:21 --> [REQ_ID=5a1b7f7f7cfd] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-23 05:25:21 --> [CSRF] token name=csrf_test_name hash=9ce020e550239eb5b2b3a6b6d10e705b
DEBUG - 2026-03-23 05:25:21 --> [REQ_ID=1220d56f18b4] [INIT] App\Controllers\Home::GET
INFO - 2026-03-23 05:25:21 --> [REQ_ID=1220d56f18b4] [MEMORY][controller-start] 6291456
INFO - 2026-03-23 05:25:21 --> [REQ_ID=1220d56f18b4] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-23 05:25:21 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-23 05:25:22 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-03-23 05:25:22 --> [REQ_ID=1220d56f18b4] [VIEW_RENDER] themes/public/home
INFO - 2026-03-23 05:25:22 --> [REQ_ID=1220d56f18b4] [MEMORY][commonData:start] 10485760
INFO - 2026-03-23 05:25:22 --> themesMemory usage: 10485760
DEBUG - 2026-03-23 05:25:22 --> [MetaService] slug= pageName=Home cacheHit= path=DB
DEBUG - 2026-03-23 05:25:22 --> [REQ_ID=5a1b7f7f7cfd] [FILTER_AFTER]
DEBUG - 2026-03-23 05:25:22 --> [REQ_ID=5a1b7f7f7cfd] [LIFECYCLE][END] status=200 duration_ms=837.60 memory_delta=4194304
INFO - 2026-03-23 05:25:22 --> [REQ_ID=1220d56f18b4] [PERF] Execution time=0.835804
DEBUG - 2026-03-23 05:25:22 --> [REQ_ID=5a1b7f7f7cfd] [REQUEST][END]
INFO - 2026-03-23 05:25:22 --> [REQ_ID=5a1b7f7f7cfd] [PERF] Execution time=0.878454
DEBUG - 2026-03-23 05:26:22 --> [REQ_ID=6b26d5749471] [REQUEST][START] HEAD /
DEBUG - 2026-03-23 05:26:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-23 05:26:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-23 05:26:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-23 05:26:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-23 05:26:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-23 05:31:22 --> [REQ_ID=9d803bc5a47a] [REQUEST][START] HEAD /
DEBUG - 2026-03-23 05:31:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-23 05:31:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-23 05:31:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-23 05:31:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-23 05:31:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-23 05:31:24 --> [REQ_ID=d1ed19e07c3b] [REQUEST][START] GET /index.php
DEBUG - 2026-03-23 05:31:24 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-23 05:31:24 --> [REQ_ID=d1ed19e07c3b] [REQUEST][END]
INFO - 2026-03-23 05:31:24 --> [REQ_ID=d1ed19e07c3b] [PERF] Execution time=0.018886
DEBUG - 2026-03-23 05:36:22 --> [REQ_ID=feadd6fdc7e5] [REQUEST][START] HEAD /
DEBUG - 2026-03-23 05:36:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-23 05:36:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-23 05:36:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-23 05:36:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-23 05:36:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-23 05:41:22 --> [REQ_ID=0cded8038d73] [REQUEST][START] HEAD /
DEBUG - 2026-03-23 05:41:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-23 05:41:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-23 05:41:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-23 05:41:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-23 05:41:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-23 05:44:54 --> [REQ_ID=8bdfc1c1500d] [REQUEST][START] GET /
DEBUG - 2026-03-23 05:44:54 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-23 05:44:54 --> [REQ_ID=8bdfc1c1500d] [REQUEST][END]
INFO - 2026-03-23 05:44:54 --> [REQ_ID=8bdfc1c1500d] [PERF] Execution time=0.038271
DEBUG - 2026-03-23 05:46:22 --> [REQ_ID=8a25678e7597] [REQUEST][START] HEAD /
DEBUG - 2026-03-23 05:46:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-23 05:46:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-23 05:46:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-23 05:46:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-23 05:46:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-23 05:51:22 --> [REQ_ID=96c798a0a6c1] [REQUEST][START] HEAD /
DEBUG - 2026-03-23 05:51:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-23 05:51:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-23 05:51:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-23 05:51:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-23 05:51:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-23 05:56:22 --> [REQ_ID=4337add8b279] [REQUEST][START] HEAD /
DEBUG - 2026-03-23 05:56:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-23 05:56:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-23 05:56:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-23 05:56:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-23 05:56:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-23 06:00:02 --> [REQ_ID=49b375ad64a7] [REQUEST][START] GET /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-23 06:00:02 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-23 06:00:02 --> [REQ_ID=49b375ad64a7] [FILTER_BEFORE] /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-23 06:00:02 --> [REQ_ID=49b375ad64a7] [ROUTE] Controller=\App\Modules\Management\Controllers\ManagementAPIController Method=Run_CRON_Tasks
DEBUG - 2026-03-23 06:00:02 --> [REQ_ID=49b375ad64a7] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-23 06:00:02 --> [REQ_ID=49b375ad64a7] [REQUEST][END]
INFO - 2026-03-23 06:00:02 --> [REQ_ID=49b375ad64a7] [PERF] Execution time=0.036504
DEBUG - 2026-03-23 06:01:22 --> [REQ_ID=0f8b3666d517] [REQUEST][START] HEAD /
DEBUG - 2026-03-23 06:01:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-23 06:01:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-23 06:01:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-23 06:01:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-23 06:01:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-23 06:06:22 --> [REQ_ID=5ff37ec71933] [REQUEST][START] HEAD /
DEBUG - 2026-03-23 06:06:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-23 06:06:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-23 06:06:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-23 06:06:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-23 06:06:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-23 06:11:22 --> [REQ_ID=28ea2d4a85dd] [REQUEST][START] HEAD /
DEBUG - 2026-03-23 06:11:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-23 06:11:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-23 06:11:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-23 06:11:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-23 06:11:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-23 06:15:01 --> [REQ_ID=be849790d7d4] [REQUEST][START] GET /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-23 06:15:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-23 06:15:01 --> [REQ_ID=be849790d7d4] [FILTER_BEFORE] /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-23 06:15:01 --> [REQ_ID=be849790d7d4] [ROUTE] Controller=\App\Modules\APIs\Controllers\AlertsAPIController Method=fetchEmailAlerts
DEBUG - 2026-03-23 06:15:01 --> [REQ_ID=be849790d7d4] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-23 06:15:01 --> [REQ_ID=be849790d7d4] [REQUEST][END]
INFO - 2026-03-23 06:15:01 --> [REQ_ID=be849790d7d4] [PERF] Execution time=0.045087
DEBUG - 2026-03-23 06:16:22 --> [REQ_ID=df4ce31156db] [REQUEST][START] HEAD /
DEBUG - 2026-03-23 06:16:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-23 06:16:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-23 06:16:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-23 06:16:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-23 06:16:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-23 06:21:22 --> [REQ_ID=3689aa9c1f07] [REQUEST][START] HEAD /
DEBUG - 2026-03-23 06:21:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-23 06:21:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-23 06:21:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-23 06:21:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-23 06:21:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-23 06:26:22 --> [REQ_ID=9a0eea9fe1e0] [REQUEST][START] HEAD /
DEBUG - 2026-03-23 06:26:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-23 06:26:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-23 06:26:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-23 06:26:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-23 06:26:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-23 06:31:22 --> [REQ_ID=3fd214dd113f] [REQUEST][START] HEAD /
DEBUG - 2026-03-23 06:31:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-23 06:31:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-23 06:31:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-23 06:31:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-23 06:31:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-23 06:36:22 --> [REQ_ID=755ee16828e5] [REQUEST][START] HEAD /
DEBUG - 2026-03-23 06:36:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-23 06:36:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-23 06:36:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-23 06:36:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-23 06:36:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-23 06:41:22 --> [REQ_ID=c44dee2fee25] [REQUEST][START] HEAD /
DEBUG - 2026-03-23 06:41:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-23 06:41:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-23 06:41:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-23 06:41:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-23 06:41:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-23 06:46:22 --> [REQ_ID=fc51ca7f6d82] [REQUEST][START] HEAD /
DEBUG - 2026-03-23 06:46:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-23 06:46:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-23 06:46:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-23 06:46:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-23 06:46:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-23 06:51:22 --> [REQ_ID=05f923fd9389] [REQUEST][START] HEAD /
DEBUG - 2026-03-23 06:51:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-23 06:51:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-23 06:51:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-23 06:51:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-23 06:51:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-23 06:56:22 --> [REQ_ID=709652a3185f] [REQUEST][START] HEAD /
DEBUG - 2026-03-23 06:56:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-23 06:56:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-23 06:56:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-23 06:56:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-23 06:56:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
INFO - 2026-03-23 07:00:02 --> [SPARK_START] App\Commands\AIOps\Run
INFO - 2026-03-23 07:00:02 --> [SPARK_MEMORY] 18874368
INFO - 2026-03-23 07:00:02 --> [spark:aiops:run] Intent
INFO - 2026-03-23 07:00:02 --> [spark:ops:work] Started
INFO - 2026-03-23 07:00:02 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-03-23 07:00:02 --> [SPARK_MEMORY] 18874368
INFO - 2026-03-23 07:00:02 --> [spark:ops:work] Intent
DEBUG - 2026-03-23 07:00:02 --> [REQ_ID=f29ac28aceda] [REQUEST][START] GET /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-23 07:00:02 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
INFO - 2026-03-23 07:00:02 --> [spark:ops:work] Completed
INFO - 2026-03-23 07:00:02 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.092306
INFO - 2026-03-23 07:00:02 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-03-23 07:00:02 --> [REQ_ID=f29ac28aceda] [FILTER_BEFORE] /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-23 07:00:02 --> [REQ_ID=f29ac28aceda] [ROUTE] Controller=\App\Modules\Management\Controllers\ManagementAPIController Method=Run_CRON_Tasks
DEBUG - 2026-03-23 07:00:02 --> [REQ_ID=f29ac28aceda] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-23 07:00:02 --> [REQ_ID=f29ac28aceda] [REQUEST][END]
INFO - 2026-03-23 07:00:02 --> [REQ_ID=f29ac28aceda] [PERF] Execution time=0.056915
INFO - 2026-03-23 07:00:04 --> [AIOPS][SPARK][GOVERNANCE][spark:logs:summarize] Started
INFO - 2026-03-23 07:00:04 --> [SPARK_START] App\Commands\Logs\Summarize
INFO - 2026-03-23 07:00:04 --> [SPARK_MEMORY] 18874368
INFO - 2026-03-23 07:00:04 --> [spark:logs:summarize] Intent
INFO - 2026-03-23 07:00:04 --> [AIOPS][SPARK][GOVERNANCE][spark:logs:summarize] Completed
INFO - 2026-03-23 07:00:04 --> [SPARK_COMPLETE] App\Commands\Logs\Summarize duration=0.004704
INFO - 2026-03-23 07:00:04 --> [SPARK_MEMORY] 18874368
INFO - 2026-03-23 07:00:04 --> [spark:app:healthcheck] Started
INFO - 2026-03-23 07:00:04 --> [SPARK_START] App\Commands\App\Healthcheck
INFO - 2026-03-23 07:00:04 --> [SPARK_MEMORY] 18874368
INFO - 2026-03-23 07:00:04 --> [spark:app:healthcheck] Intent
DEBUG - 2026-03-23 07:00:04 --> LOG_HEALTHCHECK debug marker=5e3e2e7db971
INFO - 2026-03-23 07:00:04 --> LOG_HEALTHCHECK info marker=5e3e2e7db971
NOTICE - 2026-03-23 07:00:04 --> LOG_HEALTHCHECK probe marker=5e3e2e7db971
INFO - 2026-03-23 07:00:04 --> [spark:app:healthcheck] Completed
INFO - 2026-03-23 07:00:04 --> [SPARK_COMPLETE] App\Commands\App\Healthcheck duration=0.041326
INFO - 2026-03-23 07:00:04 --> [SPARK_MEMORY] 18874368
INFO - 2026-03-23 07:00:04 --> [SPARK_COMPLETE] App\Commands\AIOps\Run duration=2.144816
INFO - 2026-03-23 07:00:04 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-03-23 07:01:22 --> [REQ_ID=dfbfc195db28] [REQUEST][START] HEAD /
DEBUG - 2026-03-23 07:01:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-23 07:01:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-23 07:01:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-23 07:01:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-23 07:01:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-23 07:06:22 --> [REQ_ID=58cb58bc640d] [REQUEST][START] HEAD /
DEBUG - 2026-03-23 07:06:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-23 07:06:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-23 07:06:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-23 07:06:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-23 07:06:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-23 07:09:35 --> [REQ_ID=2dbe90a015e4] [REQUEST][START] GET /
DEBUG - 2026-03-23 07:09:35 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-23 07:09:35 --> [REQ_ID=2dbe90a015e4] [FILTER_BEFORE] /
DEBUG - 2026-03-23 07:09:35 --> [REQ_ID=2dbe90a015e4] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-23 07:09:35 --> [REQ_ID=2dbe90a015e4] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-23 07:09:35 --> [CSRF] token name=csrf_test_name hash=bf23459a3cf6568bfec341a5ca5b7092
DEBUG - 2026-03-23 07:09:35 --> [REQ_ID=ae6e82f5c1d2] [INIT] App\Controllers\Home::GET
INFO - 2026-03-23 07:09:35 --> [REQ_ID=ae6e82f5c1d2] [MEMORY][controller-start] 6291456
INFO - 2026-03-23 07:09:35 --> [REQ_ID=ae6e82f5c1d2] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-23 07:09:35 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-23 07:09:36 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-03-23 07:09:36 --> [REQ_ID=ae6e82f5c1d2] [VIEW_RENDER] themes/public/home
INFO - 2026-03-23 07:09:36 --> [REQ_ID=ae6e82f5c1d2] [MEMORY][commonData:start] 10485760
INFO - 2026-03-23 07:09:36 --> themesMemory usage: 10485760
DEBUG - 2026-03-23 07:09:36 --> [MetaService] slug= pageName=Home cacheHit= path=DB
DEBUG - 2026-03-23 07:09:36 --> [REQ_ID=2dbe90a015e4] [FILTER_AFTER]
DEBUG - 2026-03-23 07:09:36 --> [REQ_ID=2dbe90a015e4] [LIFECYCLE][END] status=200 duration_ms=1,046.52 memory_delta=4194304
INFO - 2026-03-23 07:09:36 --> [REQ_ID=ae6e82f5c1d2] [PERF] Execution time=1.044548
DEBUG - 2026-03-23 07:09:36 --> [REQ_ID=2dbe90a015e4] [REQUEST][END]
INFO - 2026-03-23 07:09:36 --> [REQ_ID=2dbe90a015e4] [PERF] Execution time=1.085068
DEBUG - 2026-03-23 07:11:22 --> [REQ_ID=da33fc8ec7d5] [REQUEST][START] HEAD /
DEBUG - 2026-03-23 07:11:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-23 07:11:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-23 07:11:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-23 07:11:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-23 07:11:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-23 07:15:02 --> [REQ_ID=a471f34dad9c] [REQUEST][START] GET /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-23 07:15:02 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-23 07:15:02 --> [REQ_ID=a471f34dad9c] [FILTER_BEFORE] /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-23 07:15:02 --> [REQ_ID=a471f34dad9c] [ROUTE] Controller=\App\Modules\APIs\Controllers\AlertsAPIController Method=fetchEmailAlerts
DEBUG - 2026-03-23 07:15:02 --> [REQ_ID=a471f34dad9c] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-23 07:15:02 --> [REQ_ID=a471f34dad9c] [REQUEST][END]
INFO - 2026-03-23 07:15:02 --> [REQ_ID=a471f34dad9c] [PERF] Execution time=0.045818
DEBUG - 2026-03-23 07:16:22 --> [REQ_ID=0382f1f7559c] [REQUEST][START] HEAD /
DEBUG - 2026-03-23 07:16:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-23 07:16:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-23 07:16:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-23 07:16:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-23 07:16:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-23 07:21:22 --> [REQ_ID=0ff80de36203] [REQUEST][START] HEAD /
DEBUG - 2026-03-23 07:21:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-23 07:21:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-23 07:21:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-23 07:21:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-23 07:21:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-23 07:26:22 --> [REQ_ID=efb49cf9e3c2] [REQUEST][START] HEAD /
DEBUG - 2026-03-23 07:26:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-23 07:26:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-23 07:26:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-23 07:26:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-23 07:26:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-23 07:30:52 --> [REQ_ID=3be4347858a0] [REQUEST][START] GET /
DEBUG - 2026-03-23 07:30:52 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-23 07:30:52 --> [REQ_ID=3be4347858a0] [FILTER_BEFORE] /
DEBUG - 2026-03-23 07:30:52 --> [REQ_ID=3be4347858a0] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-23 07:30:52 --> [REQ_ID=3be4347858a0] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-23 07:30:52 --> [CSRF] token name=csrf_test_name hash=7c2efdd7f2d74e44545dc56161fb218f
DEBUG - 2026-03-23 07:30:52 --> [REQ_ID=65e57382edc4] [INIT] App\Controllers\Home::GET
INFO - 2026-03-23 07:30:52 --> [REQ_ID=65e57382edc4] [MEMORY][controller-start] 6291456
INFO - 2026-03-23 07:30:52 --> [REQ_ID=65e57382edc4] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-23 07:30:52 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-23 07:30:53 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-03-23 07:30:53 --> [REQ_ID=65e57382edc4] [VIEW_RENDER] themes/public/home
INFO - 2026-03-23 07:30:53 --> [REQ_ID=65e57382edc4] [MEMORY][commonData:start] 10485760
INFO - 2026-03-23 07:30:53 --> themesMemory usage: 10485760
DEBUG - 2026-03-23 07:30:53 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-23 07:30:53 --> [REQ_ID=3be4347858a0] [FILTER_AFTER]
DEBUG - 2026-03-23 07:30:53 --> [REQ_ID=3be4347858a0] [LIFECYCLE][END] status=200 duration_ms=1,017.82 memory_delta=4194304
INFO - 2026-03-23 07:30:53 --> [REQ_ID=65e57382edc4] [PERF] Execution time=1.015978
DEBUG - 2026-03-23 07:30:53 --> [REQ_ID=3be4347858a0] [REQUEST][END]
INFO - 2026-03-23 07:30:53 --> [REQ_ID=3be4347858a0] [PERF] Execution time=1.059132
DEBUG - 2026-03-23 07:31:22 --> [REQ_ID=7fe271673bec] [REQUEST][START] HEAD /
DEBUG - 2026-03-23 07:31:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-23 07:31:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-23 07:31:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-23 07:31:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-23 07:31:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-23 07:36:22 --> [REQ_ID=ba4b86078d0a] [REQUEST][START] HEAD /
DEBUG - 2026-03-23 07:36:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-23 07:36:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-23 07:36:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-23 07:36:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-23 07:36:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-23 07:41:22 --> [REQ_ID=279dc8ae5a9e] [REQUEST][START] HEAD /
DEBUG - 2026-03-23 07:41:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-23 07:41:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-23 07:41:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-23 07:41:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-23 07:41:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-23 07:46:22 --> [REQ_ID=392b92ae0f2a] [REQUEST][START] HEAD /
DEBUG - 2026-03-23 07:46:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-23 07:46:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-23 07:46:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-23 07:46:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-23 07:46:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-23 07:51:22 --> [REQ_ID=235f8ac510c6] [REQUEST][START] HEAD /
DEBUG - 2026-03-23 07:51:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-23 07:51:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-23 07:51:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-23 07:51:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-23 07:51:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-23 07:56:22 --> [REQ_ID=294dcb2847e0] [REQUEST][START] HEAD /
DEBUG - 2026-03-23 07:56:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-23 07:56:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-23 07:56:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-23 07:56:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-23 07:56:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-23 08:00:02 --> [REQ_ID=c6dc0b5078ed] [REQUEST][START] GET /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-23 08:00:02 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-23 08:00:02 --> [REQ_ID=c6dc0b5078ed] [FILTER_BEFORE] /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-23 08:00:02 --> [REQ_ID=c6dc0b5078ed] [ROUTE] Controller=\App\Modules\Management\Controllers\ManagementAPIController Method=Run_CRON_Tasks
DEBUG - 2026-03-23 08:00:02 --> [REQ_ID=c6dc0b5078ed] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-23 08:00:02 --> [REQ_ID=c6dc0b5078ed] [REQUEST][END]
INFO - 2026-03-23 08:00:02 --> [REQ_ID=c6dc0b5078ed] [PERF] Execution time=0.043218
DEBUG - 2026-03-23 08:01:22 --> [REQ_ID=f2804ccaad3b] [REQUEST][START] HEAD /
DEBUG - 2026-03-23 08:01:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-23 08:01:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-23 08:01:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-23 08:01:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-23 08:01:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-23 08:06:22 --> [REQ_ID=c853810de933] [REQUEST][START] HEAD /
DEBUG - 2026-03-23 08:06:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-23 08:06:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-23 08:06:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-23 08:06:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-23 08:06:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-23 08:08:48 --> [REQ_ID=db456cf582b9] [REQUEST][START] GET /
DEBUG - 2026-03-23 08:08:48 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-23 08:08:48 --> [REQ_ID=db456cf582b9] [FILTER_BEFORE] /
DEBUG - 2026-03-23 08:08:48 --> [REQ_ID=db456cf582b9] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-23 08:08:48 --> [REQ_ID=db456cf582b9] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-23 08:08:48 --> [CSRF] token name=csrf_test_name hash=c8e182e74d8044356d09cd3c0bf8f7d9
DEBUG - 2026-03-23 08:08:48 --> [REQ_ID=ebc6e83d2850] [INIT] App\Controllers\Home::GET
INFO - 2026-03-23 08:08:48 --> [REQ_ID=ebc6e83d2850] [MEMORY][controller-start] 6291456
INFO - 2026-03-23 08:08:48 --> [REQ_ID=ebc6e83d2850] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-23 08:08:48 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-23 08:08:49 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-03-23 08:08:49 --> [REQ_ID=ebc6e83d2850] [VIEW_RENDER] themes/public/home
INFO - 2026-03-23 08:08:49 --> [REQ_ID=ebc6e83d2850] [MEMORY][commonData:start] 10485760
INFO - 2026-03-23 08:08:49 --> themesMemory usage: 10485760
DEBUG - 2026-03-23 08:08:49 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-23 08:08:49 --> [REQ_ID=db456cf582b9] [FILTER_AFTER]
DEBUG - 2026-03-23 08:08:49 --> [REQ_ID=db456cf582b9] [LIFECYCLE][END] status=200 duration_ms=1,020.23 memory_delta=4194304
INFO - 2026-03-23 08:08:49 --> [REQ_ID=ebc6e83d2850] [PERF] Execution time=1.018366
DEBUG - 2026-03-23 08:08:49 --> [REQ_ID=db456cf582b9] [REQUEST][END]
INFO - 2026-03-23 08:08:49 --> [REQ_ID=db456cf582b9] [PERF] Execution time=1.063430
DEBUG - 2026-03-23 08:11:22 --> [REQ_ID=1cb07cadf2b7] [REQUEST][START] HEAD /
DEBUG - 2026-03-23 08:11:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-23 08:11:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-23 08:11:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-23 08:11:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-23 08:11:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-23 08:15:01 --> [REQ_ID=1266781d9c32] [REQUEST][START] GET /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-23 08:15:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-23 08:15:01 --> [REQ_ID=1266781d9c32] [FILTER_BEFORE] /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-23 08:15:01 --> [REQ_ID=1266781d9c32] [ROUTE] Controller=\App\Modules\APIs\Controllers\AlertsAPIController Method=fetchEmailAlerts
DEBUG - 2026-03-23 08:15:01 --> [REQ_ID=1266781d9c32] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-23 08:15:01 --> [REQ_ID=1266781d9c32] [REQUEST][END]
INFO - 2026-03-23 08:15:01 --> [REQ_ID=1266781d9c32] [PERF] Execution time=0.052759
DEBUG - 2026-03-23 08:16:22 --> [REQ_ID=698454adb02b] [REQUEST][START] HEAD /
DEBUG - 2026-03-23 08:16:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-23 08:16:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-23 08:16:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-23 08:16:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-23 08:16:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-23 08:21:22 --> [REQ_ID=561494cb7418] [REQUEST][START] HEAD /
DEBUG - 2026-03-23 08:21:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-23 08:21:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-23 08:21:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-23 08:21:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-23 08:21:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-23 08:21:33 --> [REQ_ID=73c7fadd9cdf] [REQUEST][START] GET /index.php/Free/register
DEBUG - 2026-03-23 08:21:33 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-23 08:21:33 --> [REQ_ID=73c7fadd9cdf] [FILTER_BEFORE] /index.php/Free/register
DEBUG - 2026-03-23 08:21:33 --> [REQ_ID=73c7fadd9cdf] [ROUTE] Controller=\App\Controllers\AuthController Method=register
DEBUG - 2026-03-23 08:21:33 --> [REQ_ID=73c7fadd9cdf] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Free/register
DEBUG - 2026-03-23 08:21:33 --> [CSRF] token name=csrf_test_name hash=5ee446246279f457b2f0e4bf75281fc2
DEBUG - 2026-03-23 08:21:33 --> [REQ_ID=9e6d707a1722] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-23 08:21:33 --> [REQ_ID=9e6d707a1722] [MEMORY][controller-start] 4194304
INFO - 2026-03-23 08:21:34 --> [REGISTRATION] Form loaded
INFO - 2026-03-23 08:21:34 --> [REQ_ID=9e6d707a1722] [PERF] Execution time=0.041658
DEBUG - 2026-03-23 08:21:36 --> [REQ_ID=41bf4c3b6498] [REQUEST][START] GET /
DEBUG - 2026-03-23 08:21:36 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-23 08:21:36 --> [REQ_ID=41bf4c3b6498] [FILTER_BEFORE] /
DEBUG - 2026-03-23 08:21:36 --> [REQ_ID=41bf4c3b6498] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-23 08:21:36 --> [REQ_ID=41bf4c3b6498] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-23 08:21:36 --> [CSRF] token name=csrf_test_name hash=77dd24fa57325a558e4da2c289a823dc
DEBUG - 2026-03-23 08:21:36 --> [REQ_ID=1f163c8e7832] [INIT] App\Controllers\Home::GET
INFO - 2026-03-23 08:21:36 --> [REQ_ID=1f163c8e7832] [MEMORY][controller-start] 4194304
INFO - 2026-03-23 08:21:36 --> [REQ_ID=1f163c8e7832] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-23 08:21:36 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-23 08:21:36 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
DEBUG - 2026-03-23 08:21:36 --> [REQ_ID=1f163c8e7832] [VIEW_RENDER] themes/public/home
INFO - 2026-03-23 08:21:36 --> [REQ_ID=1f163c8e7832] [MEMORY][commonData:start] 8388608
INFO - 2026-03-23 08:21:36 --> themesMemory usage: 8388608
DEBUG - 2026-03-23 08:21:36 --> [MetaService] slug= pageName=Home cacheHit= path=DB
DEBUG - 2026-03-23 08:21:36 --> [REQ_ID=41bf4c3b6498] [FILTER_AFTER]
DEBUG - 2026-03-23 08:21:36 --> [REQ_ID=41bf4c3b6498] [LIFECYCLE][END] status=200 duration_ms=634.63 memory_delta=4194304
INFO - 2026-03-23 08:21:36 --> [REQ_ID=1f163c8e7832] [PERF] Execution time=0.634476
DEBUG - 2026-03-23 08:21:36 --> [REQ_ID=41bf4c3b6498] [REQUEST][END]
INFO - 2026-03-23 08:21:36 --> [REQ_ID=41bf4c3b6498] [PERF] Execution time=0.649333
DEBUG - 2026-03-23 08:21:43 --> [REQ_ID=8a976f898dc8] [REQUEST][START] POST /index.php/register
DEBUG - 2026-03-23 08:21:43 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-23 08:21:43 --> [REQ_ID=8a976f898dc8] [FILTER_BEFORE] /index.php/register
DEBUG - 2026-03-23 08:21:43 --> [REQ_ID=8a976f898dc8] [ROUTE] Controller=\App\Controllers\AuthController Method=attemptRegister
DEBUG - 2026-03-23 08:21:43 --> [REQ_ID=8a976f898dc8] [LIFECYCLE][START] POST https://www.mymiwallet.com/index.php/register
DEBUG - 2026-03-23 08:21:43 --> [CSRF] token name=csrf_test_name hash=77dd24fa57325a558e4da2c289a823dc
INFO - 2026-03-23 08:21:43 --> CSRF token verified.
DEBUG - 2026-03-23 08:21:43 --> [REQ_ID=c68a4f4ecb65] [INIT] App\Controllers\AuthController::POST
INFO - 2026-03-23 08:21:43 --> [REQ_ID=c68a4f4ecb65] [MEMORY][controller-start] 6291456
INFO - 2026-03-23 08:21:43 --> [REGISTRATION] Submission received
INFO - 2026-03-23 08:21:43 --> MailService queued email
ERROR - 2026-03-23 08:21:44 --> Registration failed: {"username":"The username field is not in the correct format."}
INFO - 2026-03-23 08:21:44 --> MailService queued email
WARNING - 2026-03-23 08:21:44 --> [REGISTRATION] Validation failed (basic fields)
DEBUG - 2026-03-23 08:21:44 --> [REQ_ID=8a976f898dc8] [FILTER_AFTER]
DEBUG - 2026-03-23 08:21:44 --> [REQ_ID=8a976f898dc8] [LIFECYCLE][END] status=302 duration_ms=116.48 memory_delta=0
INFO - 2026-03-23 08:21:44 --> [REQ_ID=c68a4f4ecb65] [PERF] Execution time=0.116303
DEBUG - 2026-03-23 08:21:44 --> [REQ_ID=8a976f898dc8] [REQUEST][END]
INFO - 2026-03-23 08:21:44 --> [REQ_ID=8a976f898dc8] [PERF] Execution time=0.126274
DEBUG - 2026-03-23 08:21:47 --> [REQ_ID=3764ef63f8bd] [REQUEST][START] GET /index.php/
DEBUG - 2026-03-23 08:21:47 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-23 08:21:47 --> [REQ_ID=3764ef63f8bd] [FILTER_BEFORE] /index.php/
DEBUG - 2026-03-23 08:21:47 --> [REQ_ID=3764ef63f8bd] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-23 08:21:47 --> [REQ_ID=3764ef63f8bd] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-23 08:21:47 --> [CSRF] token name=csrf_test_name hash=77dd24fa57325a558e4da2c289a823dc
DEBUG - 2026-03-23 08:21:47 --> [REQ_ID=f741fdd67fa7] [INIT] App\Controllers\Home::GET
INFO - 2026-03-23 08:21:47 --> [REQ_ID=f741fdd67fa7] [MEMORY][controller-start] 4194304
INFO - 2026-03-23 08:21:47 --> [REQ_ID=f741fdd67fa7] [MEMORY][commonData:start] 4194304
DEBUG - 2026-03-23 08:21:47 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-23 08:21:47 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
DEBUG - 2026-03-23 08:21:47 --> [REQ_ID=f741fdd67fa7] [VIEW_RENDER] themes/public/home
INFO - 2026-03-23 08:21:47 --> [REQ_ID=f741fdd67fa7] [MEMORY][commonData:start] 8388608
INFO - 2026-03-23 08:21:47 --> themesMemory usage: 8388608
DEBUG - 2026-03-23 08:21:47 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-23 08:21:47 --> [REQ_ID=3764ef63f8bd] [FILTER_AFTER]
DEBUG - 2026-03-23 08:21:47 --> [REQ_ID=3764ef63f8bd] [LIFECYCLE][END] status=200 duration_ms=502.62 memory_delta=4194304
INFO - 2026-03-23 08:21:47 --> [REQ_ID=f741fdd67fa7] [PERF] Execution time=0.502481
DEBUG - 2026-03-23 08:21:47 --> [REQ_ID=3764ef63f8bd] [REQUEST][END]
INFO - 2026-03-23 08:21:47 --> [REQ_ID=3764ef63f8bd] [PERF] Execution time=0.511755
DEBUG - 2026-03-23 08:21:53 --> [REQ_ID=a27d67189fa5] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-23 08:21:53 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-23 08:21:53 --> [REQ_ID=a27d67189fa5] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-23 08:21:53 --> [REQ_ID=a27d67189fa5] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-23 08:21:53 --> [REQ_ID=a27d67189fa5] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-23 08:21:53 --> [CSRF] token name=csrf_test_name hash=77dd24fa57325a558e4da2c289a823dc
DEBUG - 2026-03-23 08:21:53 --> [REQ_ID=76397186d23b] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-23 08:21:53 --> [REQ_ID=76397186d23b] [MEMORY][controller-start] 6291456
DEBUG - 2026-03-23 08:21:53 --> [REQ_ID=a27d67189fa5] [FILTER_AFTER]
DEBUG - 2026-03-23 08:21:53 --> [REQ_ID=a27d67189fa5] [LIFECYCLE][END] status=200 duration_ms=29.61 memory_delta=0
INFO - 2026-03-23 08:21:53 --> [REQ_ID=76397186d23b] [PERF] Execution time=0.029322
DEBUG - 2026-03-23 08:21:53 --> [REQ_ID=a27d67189fa5] [REQUEST][END]
INFO - 2026-03-23 08:21:53 --> [REQ_ID=a27d67189fa5] [PERF] Execution time=0.041766
DEBUG - 2026-03-23 08:21:56 --> [REQ_ID=360131716173] [REQUEST][START] GET /index.php
DEBUG - 2026-03-23 08:21:56 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-23 08:21:56 --> [REQ_ID=360131716173] [FILTER_BEFORE] /index.php
DEBUG - 2026-03-23 08:21:56 --> [REQ_ID=360131716173] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-23 08:21:56 --> [REQ_ID=360131716173] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-23 08:21:56 --> [CSRF] token name=csrf_test_name hash=77dd24fa57325a558e4da2c289a823dc
DEBUG - 2026-03-23 08:21:56 --> [REQ_ID=0b3f051d917c] [INIT] App\Controllers\Home::GET
INFO - 2026-03-23 08:21:56 --> [REQ_ID=0b3f051d917c] [MEMORY][controller-start] 4194304
INFO - 2026-03-23 08:21:56 --> [REQ_ID=0b3f051d917c] [MEMORY][commonData:start] 4194304
DEBUG - 2026-03-23 08:21:56 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-23 08:21:57 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
DEBUG - 2026-03-23 08:21:57 --> [REQ_ID=0b3f051d917c] [VIEW_RENDER] themes/public/home
INFO - 2026-03-23 08:21:57 --> [REQ_ID=0b3f051d917c] [MEMORY][commonData:start] 8388608
INFO - 2026-03-23 08:21:57 --> themesMemory usage: 8388608
DEBUG - 2026-03-23 08:21:57 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-23 08:21:57 --> [REQ_ID=360131716173] [FILTER_AFTER]
DEBUG - 2026-03-23 08:21:57 --> [REQ_ID=360131716173] [LIFECYCLE][END] status=200 duration_ms=566.20 memory_delta=4194304
INFO - 2026-03-23 08:21:57 --> [REQ_ID=0b3f051d917c] [PERF] Execution time=0.565984
DEBUG - 2026-03-23 08:21:57 --> [REQ_ID=360131716173] [REQUEST][END]
INFO - 2026-03-23 08:21:57 --> [REQ_ID=360131716173] [PERF] Execution time=0.575908
DEBUG - 2026-03-23 08:22:04 --> [REQ_ID=af5d494b1060] [REQUEST][START] GET /index.php/Free/register
DEBUG - 2026-03-23 08:22:04 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-23 08:22:04 --> [REQ_ID=af5d494b1060] [FILTER_BEFORE] /index.php/Free/register
DEBUG - 2026-03-23 08:22:04 --> [REQ_ID=af5d494b1060] [ROUTE] Controller=\App\Controllers\AuthController Method=register
DEBUG - 2026-03-23 08:22:04 --> [REQ_ID=af5d494b1060] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Free/register
DEBUG - 2026-03-23 08:22:04 --> [CSRF] token name=csrf_test_name hash=77dd24fa57325a558e4da2c289a823dc
DEBUG - 2026-03-23 08:22:04 --> [REQ_ID=f01a33cfe713] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-23 08:22:04 --> [REQ_ID=f01a33cfe713] [MEMORY][controller-start] 6291456
INFO - 2026-03-23 08:22:04 --> [REGISTRATION] Form loaded
INFO - 2026-03-23 08:22:04 --> [REQ_ID=f01a33cfe713] [PERF] Execution time=0.212167
DEBUG - 2026-03-23 08:26:22 --> [REQ_ID=3198ccfb47f3] [REQUEST][START] HEAD /
DEBUG - 2026-03-23 08:26:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-23 08:26:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-23 08:26:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-23 08:26:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-23 08:26:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-23 08:31:22 --> [REQ_ID=22bd2ed3e53a] [REQUEST][START] HEAD /
DEBUG - 2026-03-23 08:31:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-23 08:31:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-23 08:31:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-23 08:31:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-23 08:31:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-23 08:36:22 --> [REQ_ID=3556a2c4b71d] [REQUEST][START] HEAD /
DEBUG - 2026-03-23 08:36:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-23 08:36:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-23 08:36:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-23 08:36:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-23 08:36:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-23 08:41:22 --> [REQ_ID=f708a20f3c74] [REQUEST][START] HEAD /
DEBUG - 2026-03-23 08:41:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-23 08:41:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-23 08:41:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-23 08:41:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-23 08:41:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-23 08:44:27 --> [REQ_ID=87c3b4a2a51e] [REQUEST][START] GET /
DEBUG - 2026-03-23 08:44:27 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-23 08:44:27 --> [REQ_ID=87c3b4a2a51e] [FILTER_BEFORE] /
DEBUG - 2026-03-23 08:44:27 --> [REQ_ID=87c3b4a2a51e] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-23 08:44:27 --> [REQ_ID=87c3b4a2a51e] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-23 08:44:27 --> [CSRF] token name=csrf_test_name hash=004ad50cc083d36481904962772c1e59
DEBUG - 2026-03-23 08:44:27 --> [REQ_ID=5c8c10a39ecb] [INIT] App\Controllers\Home::GET
INFO - 2026-03-23 08:44:27 --> [REQ_ID=5c8c10a39ecb] [MEMORY][controller-start] 6291456
INFO - 2026-03-23 08:44:27 --> [REQ_ID=5c8c10a39ecb] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-23 08:44:27 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-23 08:44:27 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-03-23 08:44:27 --> [REQ_ID=5c8c10a39ecb] [VIEW_RENDER] themes/public/home
INFO - 2026-03-23 08:44:27 --> [REQ_ID=5c8c10a39ecb] [MEMORY][commonData:start] 10485760
INFO - 2026-03-23 08:44:27 --> themesMemory usage: 10485760
DEBUG - 2026-03-23 08:44:27 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-23 08:44:27 --> [REQ_ID=87c3b4a2a51e] [FILTER_AFTER]
DEBUG - 2026-03-23 08:44:27 --> [REQ_ID=87c3b4a2a51e] [LIFECYCLE][END] status=200 duration_ms=885.61 memory_delta=4194304
INFO - 2026-03-23 08:44:27 --> [REQ_ID=5c8c10a39ecb] [PERF] Execution time=0.883674
DEBUG - 2026-03-23 08:44:27 --> [REQ_ID=87c3b4a2a51e] [REQUEST][END]
INFO - 2026-03-23 08:44:27 --> [REQ_ID=87c3b4a2a51e] [PERF] Execution time=0.924455
DEBUG - 2026-03-23 08:44:29 --> [REQ_ID=d32e7c60d66d] [REQUEST][START] GET /index.php/How-It-Works/Investment-Dashboard
DEBUG - 2026-03-23 08:44:29 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-23 08:44:29 --> [REQ_ID=d32e7c60d66d] [FILTER_BEFORE] /index.php/How-It-Works/Investment-Dashboard
DEBUG - 2026-03-23 08:44:29 --> [REQ_ID=d32e7c60d66d] [ROUTE] Controller=\App\Modules\Blog\Controllers\HowItWorksController Method=show
DEBUG - 2026-03-23 08:44:29 --> [REQ_ID=d32e7c60d66d] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/How-It-Works/Investment-Dashboard
DEBUG - 2026-03-23 08:44:29 --> [CSRF] token name=csrf_test_name hash=004ad50cc083d36481904962772c1e59
DEBUG - 2026-03-23 08:44:29 --> [REQ_ID=54a6813f247e] [INIT] App\Modules\Blog\Controllers\HowItWorksController::GET
INFO - 2026-03-23 08:44:29 --> [REQ_ID=54a6813f247e] [MEMORY][controller-start] 6291456
DEBUG - 2026-03-23 08:44:29 --> [REQ_ID=54a6813f247e] [METHOD_ENTRY] show
DEBUG - 2026-03-23 08:44:29 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-23 08:44:29 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-23 08:44:29 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-23 08:44:29 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-23 08:44:29 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-23 08:44:29 --> MyMICoin: guest context detected; skipping user-specific preload.
INFO - 2026-03-23 08:44:29 --> [REQ_ID=54a6813f247e] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-23 08:44:29 --> [REQ_ID=d32e7c60d66d] [FILTER_AFTER]
DEBUG - 2026-03-23 08:44:29 --> [REQ_ID=d32e7c60d66d] [LIFECYCLE][END] status=200 duration_ms=689.72 memory_delta=2097152
INFO - 2026-03-23 08:44:29 --> [REQ_ID=54a6813f247e] [PERF] Execution time=0.689617
DEBUG - 2026-03-23 08:44:29 --> [REQ_ID=d32e7c60d66d] [REQUEST][END]
INFO - 2026-03-23 08:44:29 --> [REQ_ID=d32e7c60d66d] [PERF] Execution time=0.702280
DEBUG - 2026-03-23 08:46:22 --> [REQ_ID=e39a55b9393e] [REQUEST][START] HEAD /
DEBUG - 2026-03-23 08:46:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-23 08:46:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-23 08:46:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-23 08:46:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-23 08:46:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-23 08:51:22 --> [REQ_ID=9c2898218a4a] [REQUEST][START] HEAD /
DEBUG - 2026-03-23 08:51:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-23 08:51:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-23 08:51:23 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-23 08:51:23 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-23 08:51:23 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-23 08:56:22 --> [REQ_ID=ab5a680fd832] [REQUEST][START] HEAD /
DEBUG - 2026-03-23 08:56:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-23 08:56:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-23 08:56:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-23 08:56:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-23 08:56:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-23 09:00:01 --> [REQ_ID=7dc3c5550b52] [REQUEST][START] GET /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-23 09:00:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-23 09:00:01 --> [REQ_ID=7dc3c5550b52] [FILTER_BEFORE] /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-23 09:00:01 --> [REQ_ID=7dc3c5550b52] [ROUTE] Controller=\App\Modules\Management\Controllers\ManagementAPIController Method=Run_CRON_Tasks
DEBUG - 2026-03-23 09:00:01 --> [REQ_ID=7dc3c5550b52] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-23 09:00:01 --> [REQ_ID=7dc3c5550b52] [REQUEST][END]
INFO - 2026-03-23 09:00:01 --> [REQ_ID=7dc3c5550b52] [PERF] Execution time=0.046966
DEBUG - 2026-03-23 09:01:22 --> [REQ_ID=07b429c75ee6] [REQUEST][START] HEAD /
DEBUG - 2026-03-23 09:01:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-23 09:01:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-23 09:01:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-23 09:01:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-23 09:01:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-23 09:06:22 --> [REQ_ID=6a5c0ba2a4de] [REQUEST][START] HEAD /
DEBUG - 2026-03-23 09:06:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-23 09:06:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-23 09:06:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-23 09:06:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-23 09:06:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-23 09:06:50 --> [REQ_ID=1f60e93195e0] [REQUEST][START] GET /
DEBUG - 2026-03-23 09:06:50 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-23 09:06:50 --> [REQ_ID=1f60e93195e0] [REQUEST][END]
INFO - 2026-03-23 09:06:50 --> [REQ_ID=1f60e93195e0] [PERF] Execution time=0.017884
DEBUG - 2026-03-23 09:11:22 --> [REQ_ID=00cac2e0cf3b] [REQUEST][START] HEAD /
DEBUG - 2026-03-23 09:11:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-23 09:11:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-23 09:11:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-23 09:11:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-23 09:11:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-23 09:15:02 --> [REQ_ID=d1dd721bab46] [REQUEST][START] GET /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-23 09:15:02 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-23 09:15:02 --> [REQ_ID=d1dd721bab46] [FILTER_BEFORE] /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-23 09:15:02 --> [REQ_ID=d1dd721bab46] [ROUTE] Controller=\App\Modules\APIs\Controllers\AlertsAPIController Method=fetchEmailAlerts
DEBUG - 2026-03-23 09:15:02 --> [REQ_ID=d1dd721bab46] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-23 09:15:02 --> [REQ_ID=d1dd721bab46] [REQUEST][END]
INFO - 2026-03-23 09:15:02 --> [REQ_ID=d1dd721bab46] [PERF] Execution time=0.044983
DEBUG - 2026-03-23 09:16:22 --> [REQ_ID=c9f79a347258] [REQUEST][START] HEAD /
DEBUG - 2026-03-23 09:16:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-23 09:16:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-23 09:16:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-23 09:16:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-23 09:16:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-23 09:16:50 --> [REQ_ID=6150ddf95d08] [REQUEST][START] GET /index.php/Projects
DEBUG - 2026-03-23 09:16:50 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-23 09:16:50 --> [REQ_ID=6150ddf95d08] [REQUEST][END]
INFO - 2026-03-23 09:16:50 --> [REQ_ID=6150ddf95d08] [PERF] Execution time=0.028641
DEBUG - 2026-03-23 09:21:22 --> [REQ_ID=5b6ae0792a1e] [REQUEST][START] HEAD /
DEBUG - 2026-03-23 09:21:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-23 09:21:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-23 09:21:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-23 09:21:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-23 09:21:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-23 09:26:22 --> [REQ_ID=88f7f0469eba] [REQUEST][START] HEAD /
DEBUG - 2026-03-23 09:26:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-23 09:26:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-23 09:26:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-23 09:26:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-23 09:26:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-23 09:31:22 --> [REQ_ID=851aa47ace69] [REQUEST][START] HEAD /
DEBUG - 2026-03-23 09:31:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-23 09:31:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-23 09:31:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-23 09:31:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-23 09:31:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-23 09:36:22 --> [REQ_ID=bf40be7a841a] [REQUEST][START] HEAD /
DEBUG - 2026-03-23 09:36:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-23 09:36:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-23 09:36:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-23 09:36:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-23 09:36:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-23 09:41:22 --> [REQ_ID=8c6adb19642a] [REQUEST][START] HEAD /
DEBUG - 2026-03-23 09:41:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-23 09:41:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-23 09:41:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-23 09:41:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-23 09:41:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-23 09:46:22 --> [REQ_ID=15c5e3579b36] [REQUEST][START] HEAD /
DEBUG - 2026-03-23 09:46:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-23 09:46:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-23 09:46:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-23 09:46:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-23 09:46:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-23 09:51:22 --> [REQ_ID=0a64cb543dce] [REQUEST][START] HEAD /
DEBUG - 2026-03-23 09:51:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-23 09:51:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-23 09:51:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-23 09:51:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-23 09:51:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-23 09:56:22 --> [REQ_ID=3a264d08aeb7] [REQUEST][START] HEAD /
DEBUG - 2026-03-23 09:56:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-23 09:56:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-23 09:56:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-23 09:56:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-23 09:56:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-23 10:00:01 --> [REQ_ID=35544c2ffd79] [REQUEST][START] GET /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-23 10:00:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-23 10:00:01 --> [REQ_ID=35544c2ffd79] [FILTER_BEFORE] /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-23 10:00:01 --> [REQ_ID=35544c2ffd79] [ROUTE] Controller=\App\Modules\Management\Controllers\ManagementAPIController Method=Run_CRON_Tasks
DEBUG - 2026-03-23 10:00:01 --> [REQ_ID=35544c2ffd79] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-23 10:00:01 --> [REQ_ID=35544c2ffd79] [REQUEST][END]
INFO - 2026-03-23 10:00:01 --> [REQ_ID=35544c2ffd79] [PERF] Execution time=0.046526
DEBUG - 2026-03-23 10:00:49 --> [REQ_ID=9437d806c296] [REQUEST][START] GET /
DEBUG - 2026-03-23 10:00:49 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-23 10:00:49 --> [REQ_ID=9437d806c296] [REQUEST][END]
INFO - 2026-03-23 10:00:49 --> [REQ_ID=9437d806c296] [PERF] Execution time=0.128037
DEBUG - 2026-03-23 10:01:22 --> [REQ_ID=e187b6a01710] [REQUEST][START] HEAD /
DEBUG - 2026-03-23 10:01:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-23 10:01:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-23 10:01:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-23 10:01:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-23 10:01:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-23 10:06:22 --> [REQ_ID=126e33be6e78] [REQUEST][START] HEAD /
DEBUG - 2026-03-23 10:06:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-23 10:06:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-23 10:06:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-23 10:06:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-23 10:06:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-23 10:11:22 --> [REQ_ID=b225effd11aa] [REQUEST][START] HEAD /
DEBUG - 2026-03-23 10:11:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-23 10:11:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-23 10:11:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-23 10:11:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-23 10:11:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-23 10:15:01 --> [REQ_ID=bbc8d373de1e] [REQUEST][START] GET /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-23 10:15:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-23 10:15:01 --> [REQ_ID=bbc8d373de1e] [FILTER_BEFORE] /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-23 10:15:01 --> [REQ_ID=bbc8d373de1e] [ROUTE] Controller=\App\Modules\APIs\Controllers\AlertsAPIController Method=fetchEmailAlerts
DEBUG - 2026-03-23 10:15:01 --> [REQ_ID=bbc8d373de1e] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-23 10:15:01 --> [REQ_ID=bbc8d373de1e] [REQUEST][END]
INFO - 2026-03-23 10:15:01 --> [REQ_ID=bbc8d373de1e] [PERF] Execution time=0.048693
DEBUG - 2026-03-23 10:16:22 --> [REQ_ID=d1059438725d] [REQUEST][START] HEAD /
DEBUG - 2026-03-23 10:16:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-23 10:16:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-23 10:16:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-23 10:16:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-23 10:16:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-23 10:21:22 --> [REQ_ID=088af21b5fd1] [REQUEST][START] HEAD /
DEBUG - 2026-03-23 10:21:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-23 10:21:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-23 10:21:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-23 10:21:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-23 10:21:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-23 10:26:22 --> [REQ_ID=949ea6833c0c] [REQUEST][START] HEAD /
DEBUG - 2026-03-23 10:26:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-23 10:26:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-23 10:26:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-23 10:26:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-23 10:26:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-23 10:29:44 --> [REQ_ID=c74d7b627228] [REQUEST][START] GET /index.php/Assets
DEBUG - 2026-03-23 10:29:44 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-23 10:29:44 --> [REQ_ID=c74d7b627228] [FILTER_BEFORE] /index.php/Assets
DEBUG - 2026-03-23 10:29:44 --> [REQ_ID=c74d7b627228] [ROUTE] Controller=\App\Modules\Management\Controllers\AssetsController Method=index
DEBUG - 2026-03-23 10:29:44 --> [REQ_ID=c74d7b627228] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Assets
DEBUG - 2026-03-23 10:29:44 --> [CSRF] token name=csrf_test_name hash=7d3cc30c76b0ba7d35db54d24d6772e2
DEBUG - 2026-03-23 10:29:44 --> [REQ_ID=c74d7b627228] [REQUEST][END]
INFO - 2026-03-23 10:29:44 --> [REQ_ID=c74d7b627228] [PERF] Execution time=0.048579
DEBUG - 2026-03-23 10:29:44 --> [REQ_ID=f2577f67b5d4] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-23 10:29:44 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-23 10:29:44 --> [REQ_ID=f2577f67b5d4] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-23 10:29:44 --> [REQ_ID=f2577f67b5d4] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-23 10:29:44 --> [REQ_ID=f2577f67b5d4] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-23 10:29:44 --> [CSRF] token name=csrf_test_name hash=d8b86b4f11de6911b7a6a24fba69a6d0
DEBUG - 2026-03-23 10:29:44 --> [REQ_ID=93e7096bf7b6] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-23 10:29:44 --> [REQ_ID=93e7096bf7b6] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-23 10:29:44 --> [REQ_ID=f2577f67b5d4] [FILTER_AFTER]
DEBUG - 2026-03-23 10:29:44 --> [REQ_ID=f2577f67b5d4] [LIFECYCLE][END] status=200 duration_ms=123.51 memory_delta=0
INFO - 2026-03-23 10:29:44 --> [REQ_ID=93e7096bf7b6] [PERF] Execution time=0.123370
DEBUG - 2026-03-23 10:29:44 --> [REQ_ID=f2577f67b5d4] [REQUEST][END]
INFO - 2026-03-23 10:29:44 --> [REQ_ID=f2577f67b5d4] [PERF] Execution time=0.137811
DEBUG - 2026-03-23 10:31:22 --> [REQ_ID=1c66565048f5] [REQUEST][START] HEAD /
DEBUG - 2026-03-23 10:31:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-23 10:31:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-23 10:31:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-23 10:31:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-23 10:31:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-23 10:36:22 --> [REQ_ID=248657ba1f9f] [REQUEST][START] HEAD /
DEBUG - 2026-03-23 10:36:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-23 10:36:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-23 10:36:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-23 10:36:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-23 10:36:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-23 10:41:22 --> [REQ_ID=853f3c31457c] [REQUEST][START] HEAD /
DEBUG - 2026-03-23 10:41:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-23 10:41:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-23 10:41:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-23 10:41:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-23 10:41:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-23 10:46:13 --> [REQ_ID=0687646f621d] [REQUEST][START] GET /
DEBUG - 2026-03-23 10:46:13 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-23 10:46:13 --> [REQ_ID=0687646f621d] [FILTER_BEFORE] /
DEBUG - 2026-03-23 10:46:13 --> [REQ_ID=0687646f621d] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-23 10:46:13 --> [REQ_ID=0687646f621d] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-23 10:46:13 --> [CSRF] token name=csrf_test_name hash=b68513b10d1eb45df47f06eda3dac8b4
DEBUG - 2026-03-23 10:46:13 --> [REQ_ID=8580ca19464a] [INIT] App\Controllers\Home::GET
INFO - 2026-03-23 10:46:13 --> [REQ_ID=8580ca19464a] [MEMORY][controller-start] 6291456
INFO - 2026-03-23 10:46:13 --> [REQ_ID=8580ca19464a] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-23 10:46:13 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-23 10:46:14 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-03-23 10:46:14 --> [REQ_ID=8580ca19464a] [VIEW_RENDER] themes/public/home
INFO - 2026-03-23 10:46:14 --> [REQ_ID=8580ca19464a] [MEMORY][commonData:start] 10485760
INFO - 2026-03-23 10:46:14 --> themesMemory usage: 10485760
DEBUG - 2026-03-23 10:46:14 --> [MetaService] slug= pageName=Home cacheHit= path=DB
DEBUG - 2026-03-23 10:46:14 --> [REQ_ID=0687646f621d] [FILTER_AFTER]
DEBUG - 2026-03-23 10:46:14 --> [REQ_ID=0687646f621d] [LIFECYCLE][END] status=200 duration_ms=929.05 memory_delta=4194304
INFO - 2026-03-23 10:46:14 --> [REQ_ID=8580ca19464a] [PERF] Execution time=0.926995
DEBUG - 2026-03-23 10:46:14 --> [REQ_ID=0687646f621d] [REQUEST][END]
INFO - 2026-03-23 10:46:14 --> [REQ_ID=0687646f621d] [PERF] Execution time=0.970396
DEBUG - 2026-03-23 10:46:17 --> [REQ_ID=6bccf2b30c54] [REQUEST][START] GET /
DEBUG - 2026-03-23 10:46:17 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-23 10:46:17 --> [REQ_ID=6bccf2b30c54] [FILTER_BEFORE] /
DEBUG - 2026-03-23 10:46:17 --> [REQ_ID=6bccf2b30c54] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-23 10:46:17 --> [REQ_ID=6bccf2b30c54] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-23 10:46:17 --> [CSRF] token name=csrf_test_name hash=8ad58441a7427d12cb9afcd705937583
DEBUG - 2026-03-23 10:46:17 --> [REQ_ID=ee4093a79f66] [INIT] App\Controllers\Home::GET
INFO - 2026-03-23 10:46:17 --> [REQ_ID=ee4093a79f66] [MEMORY][controller-start] 6291456
INFO - 2026-03-23 10:46:17 --> [REQ_ID=ee4093a79f66] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-23 10:46:17 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-23 10:46:18 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
DEBUG - 2026-03-23 10:46:18 --> [REQ_ID=ee4093a79f66] [VIEW_RENDER] themes/public/home
INFO - 2026-03-23 10:46:18 --> [REQ_ID=ee4093a79f66] [MEMORY][commonData:start] 8388608
INFO - 2026-03-23 10:46:18 --> themesMemory usage: 8388608
DEBUG - 2026-03-23 10:46:18 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-23 10:46:18 --> [REQ_ID=6bccf2b30c54] [FILTER_AFTER]
DEBUG - 2026-03-23 10:46:18 --> [REQ_ID=6bccf2b30c54] [LIFECYCLE][END] status=200 duration_ms=600.43 memory_delta=2097152
INFO - 2026-03-23 10:46:18 --> [REQ_ID=ee4093a79f66] [PERF] Execution time=0.600201
DEBUG - 2026-03-23 10:46:18 --> [REQ_ID=6bccf2b30c54] [REQUEST][END]
INFO - 2026-03-23 10:46:18 --> [REQ_ID=6bccf2b30c54] [PERF] Execution time=0.609849
DEBUG - 2026-03-23 10:46:22 --> [REQ_ID=2d0e0b11d3c8] [REQUEST][START] HEAD /
DEBUG - 2026-03-23 10:46:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-23 10:46:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-23 10:46:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-23 10:46:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-23 10:46:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-23 10:51:22 --> [REQ_ID=5861140f0a38] [REQUEST][START] HEAD /
DEBUG - 2026-03-23 10:51:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-23 10:51:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-23 10:51:23 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-23 10:51:23 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-23 10:51:23 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-23 10:55:18 --> [REQ_ID=26002e599e63] [REQUEST][START] GET /
DEBUG - 2026-03-23 10:55:18 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-23 10:55:18 --> [REQ_ID=26002e599e63] [FILTER_BEFORE] /
DEBUG - 2026-03-23 10:55:18 --> [REQ_ID=26002e599e63] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-23 10:55:18 --> [REQ_ID=26002e599e63] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-23 10:55:18 --> [CSRF] token name=csrf_test_name hash=ff7f4a8adc4691d2239cc7060880dc86
DEBUG - 2026-03-23 10:55:18 --> [REQ_ID=db41b762e7f0] [INIT] App\Controllers\Home::GET
INFO - 2026-03-23 10:55:18 --> [REQ_ID=db41b762e7f0] [MEMORY][controller-start] 6291456
INFO - 2026-03-23 10:55:18 --> [REQ_ID=db41b762e7f0] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-23 10:55:18 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-23 10:55:19 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
DEBUG - 2026-03-23 10:55:19 --> [REQ_ID=db41b762e7f0] [VIEW_RENDER] themes/public/home
INFO - 2026-03-23 10:55:19 --> [REQ_ID=db41b762e7f0] [MEMORY][commonData:start] 10485760
INFO - 2026-03-23 10:55:19 --> themesMemory usage: 10485760
DEBUG - 2026-03-23 10:55:19 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-23 10:55:19 --> [REQ_ID=26002e599e63] [FILTER_AFTER]
DEBUG - 2026-03-23 10:55:19 --> [REQ_ID=26002e599e63] [LIFECYCLE][END] status=200 duration_ms=908.99 memory_delta=4194304
INFO - 2026-03-23 10:55:19 --> [REQ_ID=db41b762e7f0] [PERF] Execution time=0.907129
DEBUG - 2026-03-23 10:55:19 --> [REQ_ID=26002e599e63] [REQUEST][END]
INFO - 2026-03-23 10:55:19 --> [REQ_ID=26002e599e63] [PERF] Execution time=0.947036
DEBUG - 2026-03-23 10:56:22 --> [REQ_ID=6799e94d2aea] [REQUEST][START] HEAD /
DEBUG - 2026-03-23 10:56:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-23 10:56:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-23 10:56:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-23 10:56:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-23 10:56:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-23 10:58:36 --> [REQ_ID=719a62734ab5] [REQUEST][START] GET /
DEBUG - 2026-03-23 10:58:36 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-23 10:58:36 --> [REQ_ID=719a62734ab5] [REQUEST][END]
INFO - 2026-03-23 10:58:36 --> [REQ_ID=719a62734ab5] [PERF] Execution time=0.040306
DEBUG - 2026-03-23 11:00:01 --> [REQ_ID=3ea26b42085a] [REQUEST][START] GET /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-23 11:00:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-23 11:00:02 --> [REQ_ID=3ea26b42085a] [FILTER_BEFORE] /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-23 11:00:02 --> [REQ_ID=3ea26b42085a] [ROUTE] Controller=\App\Modules\Management\Controllers\ManagementAPIController Method=Run_CRON_Tasks
DEBUG - 2026-03-23 11:00:02 --> [REQ_ID=3ea26b42085a] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-23 11:00:02 --> [REQ_ID=3ea26b42085a] [REQUEST][END]
INFO - 2026-03-23 11:00:02 --> [REQ_ID=3ea26b42085a] [PERF] Execution time=0.048146
DEBUG - 2026-03-23 11:01:22 --> [REQ_ID=5bd77a839228] [REQUEST][START] HEAD /
DEBUG - 2026-03-23 11:01:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-23 11:01:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-23 11:01:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-23 11:01:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-23 11:01:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-23 11:06:22 --> [REQ_ID=749c2db3920f] [REQUEST][START] HEAD /
DEBUG - 2026-03-23 11:06:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-23 11:06:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-23 11:06:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-23 11:06:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-23 11:06:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-23 11:07:55 --> [REQ_ID=9efb9f62be03] [REQUEST][START] GET /index.php/Dashboard
DEBUG - 2026-03-23 11:07:55 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-23 11:07:56 --> [REQ_ID=9efb9f62be03] [FILTER_BEFORE] /index.php/Dashboard
DEBUG - 2026-03-23 11:07:56 --> [REQ_ID=9efb9f62be03] [ROUTE] Controller=\App\Modules\User\Controllers\DashboardController Method=index
DEBUG - 2026-03-23 11:07:56 --> [REQ_ID=9efb9f62be03] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Dashboard
DEBUG - 2026-03-23 11:07:56 --> [CSRF] token name=csrf_test_name hash=2a81f73915da6357932cd252b8672a5c
DEBUG - 2026-03-23 11:07:56 --> [REQ_ID=9efb9f62be03] [REQUEST][END]
INFO - 2026-03-23 11:07:56 --> [REQ_ID=9efb9f62be03] [PERF] Execution time=0.056324
DEBUG - 2026-03-23 11:11:22 --> [REQ_ID=df2a134feff6] [REQUEST][START] HEAD /
DEBUG - 2026-03-23 11:11:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-23 11:11:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-23 11:11:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-23 11:11:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-23 11:11:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-23 11:15:01 --> [REQ_ID=f3db48ca560a] [REQUEST][START] GET /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-23 11:15:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-23 11:15:01 --> [REQ_ID=f3db48ca560a] [FILTER_BEFORE] /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-23 11:15:01 --> [REQ_ID=f3db48ca560a] [ROUTE] Controller=\App\Modules\APIs\Controllers\AlertsAPIController Method=fetchEmailAlerts
DEBUG - 2026-03-23 11:15:01 --> [REQ_ID=f3db48ca560a] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-23 11:15:01 --> [REQ_ID=f3db48ca560a] [REQUEST][END]
INFO - 2026-03-23 11:15:01 --> [REQ_ID=f3db48ca560a] [PERF] Execution time=0.048365
DEBUG - 2026-03-23 11:16:22 --> [REQ_ID=45a41026939f] [REQUEST][START] HEAD /
DEBUG - 2026-03-23 11:16:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-23 11:16:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-23 11:16:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-23 11:16:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-23 11:16:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-23 11:21:22 --> [REQ_ID=d65f5dc3d3d6] [REQUEST][START] HEAD /
DEBUG - 2026-03-23 11:21:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-23 11:21:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-23 11:21:23 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-23 11:21:23 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-23 11:21:23 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-23 11:26:22 --> [REQ_ID=96ff5c41a201] [REQUEST][START] HEAD /
DEBUG - 2026-03-23 11:26:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-23 11:26:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-23 11:26:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-23 11:26:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-23 11:26:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-23 11:26:40 --> [REQ_ID=2238dc5e49ae] [REQUEST][START] GET /index.php/Dashboard
DEBUG - 2026-03-23 11:26:40 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-23 11:26:40 --> [REQ_ID=2238dc5e49ae] [FILTER_BEFORE] /index.php/Dashboard
DEBUG - 2026-03-23 11:26:40 --> [REQ_ID=2238dc5e49ae] [ROUTE] Controller=\App\Modules\User\Controllers\DashboardController Method=index
DEBUG - 2026-03-23 11:26:40 --> [REQ_ID=2238dc5e49ae] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Dashboard
DEBUG - 2026-03-23 11:26:40 --> [CSRF] token name=csrf_test_name hash=badfaf8ec356cd9b4ac306dc293f31c2
DEBUG - 2026-03-23 11:26:40 --> [REQ_ID=2238dc5e49ae] [REQUEST][END]
INFO - 2026-03-23 11:26:40 --> [REQ_ID=2238dc5e49ae] [PERF] Execution time=0.118308
DEBUG - 2026-03-23 11:30:33 --> [REQ_ID=116c093653ce] [REQUEST][START] GET /index.php/Dashboard
DEBUG - 2026-03-23 11:30:33 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-23 11:30:33 --> [REQ_ID=116c093653ce] [FILTER_BEFORE] /index.php/Dashboard
DEBUG - 2026-03-23 11:30:33 --> [REQ_ID=116c093653ce] [ROUTE] Controller=\App\Modules\User\Controllers\DashboardController Method=index
DEBUG - 2026-03-23 11:30:33 --> [REQ_ID=116c093653ce] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Dashboard
DEBUG - 2026-03-23 11:30:33 --> [CSRF] token name=csrf_test_name hash=c0d2c7d6c2c6c627abb60bc6a617bc7c
DEBUG - 2026-03-23 11:30:33 --> [REQ_ID=116c093653ce] [REQUEST][END]
INFO - 2026-03-23 11:30:33 --> [REQ_ID=116c093653ce] [PERF] Execution time=0.144851
DEBUG - 2026-03-23 11:31:22 --> [REQ_ID=6d6329453452] [REQUEST][START] HEAD /
DEBUG - 2026-03-23 11:31:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-23 11:31:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-23 11:31:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-23 11:31:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-23 11:31:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-23 11:34:40 --> [REQ_ID=ec7799453c1f] [REQUEST][START] GET /index.php/Premium-Features/Wallets
DEBUG - 2026-03-23 11:34:40 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
INFO - 2026-03-23 11:34:40 --> REDIRECTED ROUTE at https://www.mymiwallet.com/Wallets/Manager
DEBUG - 2026-03-23 11:34:40 --> [REQ_ID=ec7799453c1f] [REQUEST][END]
INFO - 2026-03-23 11:34:40 --> [REQ_ID=ec7799453c1f] [PERF] Execution time=0.038497
DEBUG - 2026-03-23 11:36:22 --> [REQ_ID=b25eaeab205a] [REQUEST][START] HEAD /
DEBUG - 2026-03-23 11:36:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-23 11:36:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-23 11:36:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-23 11:36:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-23 11:36:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-23 11:39:31 --> [REQ_ID=bd202a79b9b0] [REQUEST][START] GET /
DEBUG - 2026-03-23 11:39:31 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-23 11:39:31 --> [REQ_ID=bd202a79b9b0] [FILTER_BEFORE] /
DEBUG - 2026-03-23 11:39:31 --> [REQ_ID=bd202a79b9b0] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-23 11:39:31 --> [REQ_ID=bd202a79b9b0] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-23 11:39:31 --> [CSRF] token name=csrf_test_name hash=eca083952e0665c0c4711f10b28530aa
DEBUG - 2026-03-23 11:39:31 --> [REQ_ID=d8d5115d53aa] [INIT] App\Controllers\Home::GET
INFO - 2026-03-23 11:39:31 --> [REQ_ID=d8d5115d53aa] [MEMORY][controller-start] 6291456
INFO - 2026-03-23 11:39:31 --> [REQ_ID=d8d5115d53aa] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-23 11:39:31 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-23 11:39:32 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-03-23 11:39:32 --> [REQ_ID=d8d5115d53aa] [VIEW_RENDER] themes/public/home
INFO - 2026-03-23 11:39:32 --> [REQ_ID=d8d5115d53aa] [MEMORY][commonData:start] 10485760
INFO - 2026-03-23 11:39:32 --> themesMemory usage: 10485760
DEBUG - 2026-03-23 11:39:32 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-23 11:39:32 --> [REQ_ID=bd202a79b9b0] [FILTER_AFTER]
DEBUG - 2026-03-23 11:39:32 --> [REQ_ID=bd202a79b9b0] [LIFECYCLE][END] status=200 duration_ms=854.04 memory_delta=4194304
INFO - 2026-03-23 11:39:32 --> [REQ_ID=d8d5115d53aa] [PERF] Execution time=0.851305
DEBUG - 2026-03-23 11:39:32 --> [REQ_ID=bd202a79b9b0] [REQUEST][END]
INFO - 2026-03-23 11:39:32 --> [REQ_ID=bd202a79b9b0] [PERF] Execution time=0.903867
DEBUG - 2026-03-23 11:41:22 --> [REQ_ID=ed331158ab05] [REQUEST][START] HEAD /
DEBUG - 2026-03-23 11:41:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-23 11:41:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-23 11:41:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-23 11:41:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-23 11:41:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-23 11:46:22 --> [REQ_ID=bcf1a3d63692] [REQUEST][START] HEAD /
DEBUG - 2026-03-23 11:46:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-23 11:46:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-23 11:46:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-23 11:46:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-23 11:46:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-23 11:49:21 --> [REQ_ID=98a9c3a399d8] [REQUEST][START] GET /
DEBUG - 2026-03-23 11:49:21 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-23 11:49:21 --> [REQ_ID=98a9c3a399d8] [FILTER_BEFORE] /
DEBUG - 2026-03-23 11:49:21 --> [REQ_ID=98a9c3a399d8] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-23 11:49:21 --> [REQ_ID=98a9c3a399d8] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-23 11:49:21 --> [CSRF] token name=csrf_test_name hash=d9dc56a9f84f1ed6b1e1ff2b79d8790d
DEBUG - 2026-03-23 11:49:21 --> [REQ_ID=bb88684bdc32] [INIT] App\Controllers\Home::GET
INFO - 2026-03-23 11:49:21 --> [REQ_ID=bb88684bdc32] [MEMORY][controller-start] 6291456
INFO - 2026-03-23 11:49:21 --> [REQ_ID=bb88684bdc32] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-23 11:49:21 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-23 11:49:22 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
DEBUG - 2026-03-23 11:49:22 --> [REQ_ID=bb88684bdc32] [VIEW_RENDER] themes/public/home
INFO - 2026-03-23 11:49:22 --> [REQ_ID=bb88684bdc32] [MEMORY][commonData:start] 10485760
INFO - 2026-03-23 11:49:22 --> themesMemory usage: 10485760
DEBUG - 2026-03-23 11:49:22 --> [MetaService] slug= pageName=Home cacheHit= path=DB
DEBUG - 2026-03-23 11:49:22 --> [REQ_ID=98a9c3a399d8] [FILTER_AFTER]
DEBUG - 2026-03-23 11:49:22 --> [REQ_ID=98a9c3a399d8] [LIFECYCLE][END] status=200 duration_ms=933.41 memory_delta=4194304
INFO - 2026-03-23 11:49:22 --> [REQ_ID=bb88684bdc32] [PERF] Execution time=0.931523
DEBUG - 2026-03-23 11:49:22 --> [REQ_ID=98a9c3a399d8] [REQUEST][END]
INFO - 2026-03-23 11:49:22 --> [REQ_ID=98a9c3a399d8] [PERF] Execution time=0.972015
DEBUG - 2026-03-23 11:51:22 --> [REQ_ID=a235f38f6bce] [REQUEST][START] HEAD /
DEBUG - 2026-03-23 11:51:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-23 11:51:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-23 11:51:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-23 11:51:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-23 11:51:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-23 11:56:22 --> [REQ_ID=49dd7927e0b1] [REQUEST][START] HEAD /
DEBUG - 2026-03-23 11:56:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-23 11:56:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-23 11:56:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-23 11:56:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-23 11:56:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-23 12:00:02 --> [REQ_ID=37ac56157d8e] [REQUEST][START] GET /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-23 12:00:02 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-23 12:00:02 --> [REQ_ID=37ac56157d8e] [FILTER_BEFORE] /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-23 12:00:02 --> [REQ_ID=37ac56157d8e] [ROUTE] Controller=\App\Modules\Management\Controllers\ManagementAPIController Method=Run_CRON_Tasks
DEBUG - 2026-03-23 12:00:02 --> [REQ_ID=37ac56157d8e] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-23 12:00:02 --> [REQ_ID=37ac56157d8e] [REQUEST][END]
INFO - 2026-03-23 12:00:02 --> [REQ_ID=37ac56157d8e] [PERF] Execution time=0.044762
DEBUG - 2026-03-23 12:01:22 --> [REQ_ID=49b4c058602f] [REQUEST][START] HEAD /
DEBUG - 2026-03-23 12:01:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-23 12:01:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-23 12:01:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-23 12:01:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-23 12:01:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-23 12:06:22 --> [REQ_ID=94236b991db2] [REQUEST][START] HEAD /
DEBUG - 2026-03-23 12:06:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-23 12:06:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-23 12:06:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-23 12:06:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-23 12:06:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-23 12:11:22 --> [REQ_ID=7593d78c2a27] [REQUEST][START] HEAD /
DEBUG - 2026-03-23 12:11:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-23 12:11:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-23 12:11:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-23 12:11:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-23 12:11:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-23 12:15:01 --> [REQ_ID=06c47d6058cb] [REQUEST][START] GET /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-23 12:15:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-23 12:15:01 --> [REQ_ID=06c47d6058cb] [FILTER_BEFORE] /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-23 12:15:01 --> [REQ_ID=06c47d6058cb] [ROUTE] Controller=\App\Modules\APIs\Controllers\AlertsAPIController Method=fetchEmailAlerts
DEBUG - 2026-03-23 12:15:01 --> [REQ_ID=06c47d6058cb] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-23 12:15:01 --> [REQ_ID=06c47d6058cb] [REQUEST][END]
INFO - 2026-03-23 12:15:01 --> [REQ_ID=06c47d6058cb] [PERF] Execution time=0.047486
DEBUG - 2026-03-23 12:16:22 --> [REQ_ID=c2df95b06663] [REQUEST][START] HEAD /
DEBUG - 2026-03-23 12:16:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-23 12:16:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-23 12:16:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-23 12:16:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-23 12:16:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-23 12:18:54 --> [REQ_ID=eff8c981dbfe] [REQUEST][START] GET /index.php/Projects
DEBUG - 2026-03-23 12:18:54 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-23 12:18:54 --> [REQ_ID=eff8c981dbfe] [REQUEST][END]
INFO - 2026-03-23 12:18:54 --> [REQ_ID=eff8c981dbfe] [PERF] Execution time=0.059307
DEBUG - 2026-03-23 12:21:22 --> [REQ_ID=6bb719ae7335] [REQUEST][START] HEAD /
DEBUG - 2026-03-23 12:21:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-23 12:21:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-23 12:21:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-23 12:21:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-23 12:21:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-23 12:26:22 --> [REQ_ID=eedb5533721b] [REQUEST][START] HEAD /
DEBUG - 2026-03-23 12:26:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-23 12:26:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-23 12:26:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-23 12:26:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-23 12:26:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-23 12:31:22 --> [REQ_ID=c1031ce3e105] [REQUEST][START] HEAD /
DEBUG - 2026-03-23 12:31:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-23 12:31:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-23 12:31:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-23 12:31:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-23 12:31:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-23 12:36:22 --> [REQ_ID=69749ea53692] [REQUEST][START] HEAD /
DEBUG - 2026-03-23 12:36:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-23 12:36:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-23 12:36:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-23 12:36:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-23 12:36:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-23 12:38:41 --> [REQ_ID=0763b621e9a1] [REQUEST][START] GET /
DEBUG - 2026-03-23 12:38:41 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-23 12:38:41 --> [REQ_ID=0763b621e9a1] [FILTER_BEFORE] /
DEBUG - 2026-03-23 12:38:41 --> [REQ_ID=0763b621e9a1] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-23 12:38:41 --> [REQ_ID=0763b621e9a1] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-23 12:38:41 --> [CSRF] token name=csrf_test_name hash=35d1b32ee3e11aae7c5ab4dd427c2dfa
DEBUG - 2026-03-23 12:38:41 --> [REQ_ID=513737a7d9b8] [INIT] App\Controllers\Home::GET
INFO - 2026-03-23 12:38:41 --> [REQ_ID=513737a7d9b8] [MEMORY][controller-start] 6291456
INFO - 2026-03-23 12:38:41 --> [REQ_ID=513737a7d9b8] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-23 12:38:41 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-23 12:38:42 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-03-23 12:38:42 --> [REQ_ID=513737a7d9b8] [VIEW_RENDER] themes/public/home
INFO - 2026-03-23 12:38:42 --> [REQ_ID=513737a7d9b8] [MEMORY][commonData:start] 10485760
INFO - 2026-03-23 12:38:42 --> themesMemory usage: 10485760
DEBUG - 2026-03-23 12:38:42 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-23 12:38:42 --> [REQ_ID=0763b621e9a1] [FILTER_AFTER]
DEBUG - 2026-03-23 12:38:42 --> [REQ_ID=0763b621e9a1] [LIFECYCLE][END] status=200 duration_ms=1,126.51 memory_delta=4194304
INFO - 2026-03-23 12:38:42 --> [REQ_ID=513737a7d9b8] [PERF] Execution time=1.124580
DEBUG - 2026-03-23 12:38:42 --> [REQ_ID=0763b621e9a1] [REQUEST][END]
INFO - 2026-03-23 12:38:42 --> [REQ_ID=0763b621e9a1] [PERF] Execution time=1.164916
DEBUG - 2026-03-23 12:41:22 --> [REQ_ID=91cabe23fca9] [REQUEST][START] HEAD /
DEBUG - 2026-03-23 12:41:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-23 12:41:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-23 12:41:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-23 12:41:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-23 12:41:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-23 12:46:22 --> [REQ_ID=e5637965062d] [REQUEST][START] HEAD /
DEBUG - 2026-03-23 12:46:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-23 12:46:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-23 12:46:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-23 12:46:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-23 12:46:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-23 12:51:01 --> [REQ_ID=35bebb5c662f] [REQUEST][START] GET /
DEBUG - 2026-03-23 12:51:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-23 12:51:01 --> [REQ_ID=35bebb5c662f] [FILTER_BEFORE] /
DEBUG - 2026-03-23 12:51:01 --> [REQ_ID=35bebb5c662f] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-23 12:51:01 --> [REQ_ID=35bebb5c662f] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-23 12:51:01 --> [CSRF] token name=csrf_test_name hash=5187a89c7e12fdfbd92f11fd0ed10d7a
DEBUG - 2026-03-23 12:51:01 --> [REQ_ID=4cb7f3a4c006] [INIT] App\Controllers\Home::GET
INFO - 2026-03-23 12:51:01 --> [REQ_ID=4cb7f3a4c006] [MEMORY][controller-start] 6291456
INFO - 2026-03-23 12:51:01 --> [REQ_ID=4cb7f3a4c006] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-23 12:51:01 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-23 12:51:02 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
DEBUG - 2026-03-23 12:51:02 --> [REQ_ID=4cb7f3a4c006] [VIEW_RENDER] themes/public/home
INFO - 2026-03-23 12:51:02 --> [REQ_ID=4cb7f3a4c006] [MEMORY][commonData:start] 10485760
INFO - 2026-03-23 12:51:02 --> themesMemory usage: 10485760
DEBUG - 2026-03-23 12:51:02 --> [MetaService] slug= pageName=Home cacheHit= path=DB
DEBUG - 2026-03-23 12:51:02 --> [REQ_ID=35bebb5c662f] [FILTER_AFTER]
DEBUG - 2026-03-23 12:51:02 --> [REQ_ID=35bebb5c662f] [LIFECYCLE][END] status=200 duration_ms=893.94 memory_delta=4194304
INFO - 2026-03-23 12:51:02 --> [REQ_ID=4cb7f3a4c006] [PERF] Execution time=0.892150
DEBUG - 2026-03-23 12:51:02 --> [REQ_ID=35bebb5c662f] [REQUEST][END]
INFO - 2026-03-23 12:51:02 --> [REQ_ID=35bebb5c662f] [PERF] Execution time=0.932826
DEBUG - 2026-03-23 12:51:22 --> [REQ_ID=7a5824b791be] [REQUEST][START] HEAD /
DEBUG - 2026-03-23 12:51:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-23 12:51:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-23 12:51:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-23 12:51:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-23 12:51:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-23 12:52:57 --> [REQ_ID=61153759f63e] [REQUEST][START] GET /index.php/Knowledgebase/Assets
DEBUG - 2026-03-23 12:52:57 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-23 12:52:57 --> ErrorException: Access level to App\Modules\User\Controllers\KnowledgebaseController::respondWithRendered() must be protected (as in class App\Controllers\BaseController) or weaker
[Method: GET, Route: Knowledgebase/Assets]
in APPPATH/Modules/User/Controllers/KnowledgebaseController.php on line 535.
 1 [internal function]: CodeIgniter\Debug\Exceptions->shutdownHandler()
CRITICAL - 2026-03-23 12:52:57 --> [EXCEPTION] Access level to App\Modules\User\Controllers\KnowledgebaseController::respondWithRendered() must be protected (as in class App\Controllers\BaseController) or weaker File=/home/mymiteam/mymiwallet/site/current/app/Modules/User/Controllers/KnowledgebaseController.php Line=535
ERROR - 2026-03-23 12:52:57 --> [ERROR_PAGE] event=error_500 status=500 message=Internal server error.
DEBUG - 2026-03-23 12:56:22 --> [REQ_ID=194203edf9a9] [REQUEST][START] HEAD /
DEBUG - 2026-03-23 12:56:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-23 12:56:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-23 12:56:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-23 12:56:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-23 12:56:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-23 12:58:45 --> [REQ_ID=7caf4ebf5cde] [REQUEST][START] GET /
DEBUG - 2026-03-23 12:58:45 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-23 12:58:45 --> [REQ_ID=7caf4ebf5cde] [FILTER_BEFORE] /
DEBUG - 2026-03-23 12:58:45 --> [REQ_ID=7caf4ebf5cde] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-23 12:58:45 --> [REQ_ID=7caf4ebf5cde] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-23 12:58:45 --> [CSRF] token name=csrf_test_name hash=410806f4c3547a7e8db2bc79998b6a5f
DEBUG - 2026-03-23 12:58:45 --> [REQ_ID=0b1c4f68fbda] [INIT] App\Controllers\Home::GET
INFO - 2026-03-23 12:58:45 --> [REQ_ID=0b1c4f68fbda] [MEMORY][controller-start] 6291456
INFO - 2026-03-23 12:58:45 --> [REQ_ID=0b1c4f68fbda] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-23 12:58:45 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-23 12:58:46 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-03-23 12:58:46 --> [REQ_ID=0b1c4f68fbda] [VIEW_RENDER] themes/public/home
INFO - 2026-03-23 12:58:46 --> [REQ_ID=0b1c4f68fbda] [MEMORY][commonData:start] 10485760
INFO - 2026-03-23 12:58:46 --> themesMemory usage: 10485760
DEBUG - 2026-03-23 12:58:46 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-23 12:58:46 --> [REQ_ID=7caf4ebf5cde] [FILTER_AFTER]
DEBUG - 2026-03-23 12:58:46 --> [REQ_ID=7caf4ebf5cde] [LIFECYCLE][END] status=200 duration_ms=891.41 memory_delta=4194304
INFO - 2026-03-23 12:58:46 --> [REQ_ID=0b1c4f68fbda] [PERF] Execution time=0.889479
DEBUG - 2026-03-23 12:58:46 --> [REQ_ID=7caf4ebf5cde] [REQUEST][END]
INFO - 2026-03-23 12:58:46 --> [REQ_ID=7caf4ebf5cde] [PERF] Execution time=0.931469
DEBUG - 2026-03-23 13:00:01 --> [REQ_ID=d6d7544d3e4b] [REQUEST][START] GET /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-23 13:00:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-23 13:00:01 --> [REQ_ID=d6d7544d3e4b] [FILTER_BEFORE] /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-23 13:00:01 --> [REQ_ID=d6d7544d3e4b] [ROUTE] Controller=\App\Modules\Management\Controllers\ManagementAPIController Method=Run_CRON_Tasks
DEBUG - 2026-03-23 13:00:01 --> [REQ_ID=d6d7544d3e4b] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-23 13:00:01 --> [REQ_ID=d6d7544d3e4b] [REQUEST][END]
INFO - 2026-03-23 13:00:01 --> [REQ_ID=d6d7544d3e4b] [PERF] Execution time=0.014795
DEBUG - 2026-03-23 13:01:22 --> [REQ_ID=439741b50471] [REQUEST][START] HEAD /
DEBUG - 2026-03-23 13:01:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-23 13:01:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-23 13:01:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-23 13:01:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-23 13:01:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-23 13:06:22 --> [REQ_ID=52832c68a6da] [REQUEST][START] HEAD /
DEBUG - 2026-03-23 13:06:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-23 13:06:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-23 13:06:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-23 13:06:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-23 13:06:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-23 13:11:22 --> [REQ_ID=b968636a40ee] [REQUEST][START] HEAD /
DEBUG - 2026-03-23 13:11:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-23 13:11:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-23 13:11:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-23 13:11:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-23 13:11:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-23 13:15:02 --> [REQ_ID=79f27c091ba0] [REQUEST][START] GET /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-23 13:15:02 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-23 13:15:02 --> [REQ_ID=79f27c091ba0] [FILTER_BEFORE] /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-23 13:15:02 --> [REQ_ID=79f27c091ba0] [ROUTE] Controller=\App\Modules\APIs\Controllers\AlertsAPIController Method=fetchEmailAlerts
DEBUG - 2026-03-23 13:15:02 --> [REQ_ID=79f27c091ba0] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-23 13:15:02 --> [REQ_ID=79f27c091ba0] [REQUEST][END]
INFO - 2026-03-23 13:15:02 --> [REQ_ID=79f27c091ba0] [PERF] Execution time=0.062684
DEBUG - 2026-03-23 13:16:22 --> [REQ_ID=062573afaae6] [REQUEST][START] HEAD /
DEBUG - 2026-03-23 13:16:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-23 13:16:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-23 13:16:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-23 13:16:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-23 13:16:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-23 13:21:22 --> [REQ_ID=c9aa0aa178e4] [REQUEST][START] HEAD /
DEBUG - 2026-03-23 13:21:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-23 13:21:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-23 13:21:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-23 13:21:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-23 13:21:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-23 13:25:54 --> [REQ_ID=178dec3dcb68] [REQUEST][START] GET /index.php/Wallets/Purchase/Memberships/Premium
DEBUG - 2026-03-23 13:25:54 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-23 13:25:54 --> [REQ_ID=178dec3dcb68] [REQUEST][END]
INFO - 2026-03-23 13:25:54 --> [REQ_ID=178dec3dcb68] [PERF] Execution time=0.047520
DEBUG - 2026-03-23 13:26:22 --> [REQ_ID=c5d4ca65e432] [REQUEST][START] HEAD /
DEBUG - 2026-03-23 13:26:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-23 13:26:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-23 13:26:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-23 13:26:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-23 13:26:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-23 13:31:14 --> [REQ_ID=28a04ceeb3bd] [REQUEST][START] GET /index.php/How-It-Works/marketing
DEBUG - 2026-03-23 13:31:14 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-23 13:31:14 --> [REQ_ID=28a04ceeb3bd] [REQUEST][END]
INFO - 2026-03-23 13:31:14 --> [REQ_ID=28a04ceeb3bd] [PERF] Execution time=0.041383
DEBUG - 2026-03-23 13:31:22 --> [REQ_ID=b23329e7b27e] [REQUEST][START] HEAD /
DEBUG - 2026-03-23 13:31:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-23 13:31:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-23 13:31:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-23 13:31:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-23 13:31:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-23 13:36:22 --> [REQ_ID=473e34ba073f] [REQUEST][START] HEAD /
DEBUG - 2026-03-23 13:36:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-23 13:36:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-23 13:36:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-23 13:36:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-23 13:36:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-23 13:41:22 --> [REQ_ID=1d3a89ea46d0] [REQUEST][START] HEAD /
DEBUG - 2026-03-23 13:41:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-23 13:41:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-23 13:41:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-23 13:41:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-23 13:41:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-23 13:46:22 --> [REQ_ID=0ac8c1730c66] [REQUEST][START] HEAD /
DEBUG - 2026-03-23 13:46:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-23 13:46:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-23 13:46:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-23 13:46:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-23 13:46:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-23 13:49:15 --> [REQ_ID=33c5081d1ed3] [REQUEST][START] HEAD /
DEBUG - 2026-03-23 13:49:15 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-23 13:49:15 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-23 13:49:15 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-23 13:49:15 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-23 13:49:15 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: none
DEBUG - 2026-03-23 13:51:22 --> [REQ_ID=e12f69a60d04] [REQUEST][START] HEAD /
DEBUG - 2026-03-23 13:51:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-23 13:51:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-23 13:51:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-23 13:51:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-23 13:51:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-23 13:56:22 --> [REQ_ID=bc164d9fd041] [REQUEST][START] HEAD /
DEBUG - 2026-03-23 13:56:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-23 13:56:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-23 13:56:23 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-23 13:56:23 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-23 13:56:23 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-23 14:00:01 --> [REQ_ID=8139d80d2968] [REQUEST][START] GET /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-23 14:00:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-23 14:00:01 --> [REQ_ID=8139d80d2968] [FILTER_BEFORE] /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-23 14:00:01 --> [REQ_ID=8139d80d2968] [ROUTE] Controller=\App\Modules\Management\Controllers\ManagementAPIController Method=Run_CRON_Tasks
DEBUG - 2026-03-23 14:00:01 --> [REQ_ID=8139d80d2968] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-23 14:00:01 --> [REQ_ID=8139d80d2968] [REQUEST][END]
INFO - 2026-03-23 14:00:01 --> [REQ_ID=8139d80d2968] [PERF] Execution time=0.050103
DEBUG - 2026-03-23 14:01:22 --> [REQ_ID=9b5a03deb6c9] [REQUEST][START] HEAD /
DEBUG - 2026-03-23 14:01:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-23 14:01:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-23 14:01:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-23 14:01:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-23 14:01:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-23 14:06:22 --> [REQ_ID=f605def584c4] [REQUEST][START] HEAD /
DEBUG - 2026-03-23 14:06:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-23 14:06:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-23 14:06:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-23 14:06:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-23 14:06:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-23 14:11:22 --> [REQ_ID=d775e2d65770] [REQUEST][START] HEAD /
DEBUG - 2026-03-23 14:11:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-23 14:11:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-23 14:11:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-23 14:11:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-23 14:11:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-23 14:15:01 --> [REQ_ID=a5360a5292f1] [REQUEST][START] GET /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-23 14:15:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-23 14:15:01 --> [REQ_ID=a5360a5292f1] [FILTER_BEFORE] /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-23 14:15:01 --> [REQ_ID=a5360a5292f1] [ROUTE] Controller=\App\Modules\APIs\Controllers\AlertsAPIController Method=fetchEmailAlerts
DEBUG - 2026-03-23 14:15:01 --> [REQ_ID=a5360a5292f1] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-23 14:15:01 --> [REQ_ID=a5360a5292f1] [REQUEST][END]
INFO - 2026-03-23 14:15:01 --> [REQ_ID=a5360a5292f1] [PERF] Execution time=0.046441
DEBUG - 2026-03-23 14:16:22 --> [REQ_ID=cc9fc6a2cfa3] [REQUEST][START] HEAD /
DEBUG - 2026-03-23 14:16:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-23 14:16:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-23 14:16:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-23 14:16:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-23 14:16:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-23 14:21:22 --> [REQ_ID=9bc072053549] [REQUEST][START] HEAD /
DEBUG - 2026-03-23 14:21:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-23 14:21:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-23 14:21:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-23 14:21:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-23 14:21:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-23 14:26:22 --> [REQ_ID=877fdb54744c] [REQUEST][START] HEAD /
DEBUG - 2026-03-23 14:26:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-23 14:26:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-23 14:26:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-23 14:26:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-23 14:26:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-23 14:31:22 --> [REQ_ID=83841c84a4f1] [REQUEST][START] HEAD /
DEBUG - 2026-03-23 14:31:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-23 14:31:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-23 14:31:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-23 14:31:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-23 14:31:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-23 14:35:35 --> [REQ_ID=38af36237c25] [REQUEST][START] GET /
DEBUG - 2026-03-23 14:35:35 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-23 14:35:35 --> [REQ_ID=38af36237c25] [REQUEST][END]
INFO - 2026-03-23 14:35:35 --> [REQ_ID=38af36237c25] [PERF] Execution time=0.038128
DEBUG - 2026-03-23 14:36:10 --> [REQ_ID=aec8f9e2bf1e] [REQUEST][START] GET /
DEBUG - 2026-03-23 14:36:10 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-23 14:36:10 --> [REQ_ID=aec8f9e2bf1e] [FILTER_BEFORE] /
DEBUG - 2026-03-23 14:36:10 --> [REQ_ID=aec8f9e2bf1e] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-23 14:36:10 --> [REQ_ID=aec8f9e2bf1e] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-23 14:36:10 --> [CSRF] token name=csrf_test_name hash=e08ad3fca7639107fab4f40c0420de10
DEBUG - 2026-03-23 14:36:10 --> [REQ_ID=a2f05b999074] [INIT] App\Controllers\Home::GET
INFO - 2026-03-23 14:36:10 --> [REQ_ID=a2f05b999074] [MEMORY][controller-start] 4194304
INFO - 2026-03-23 14:36:10 --> [REQ_ID=a2f05b999074] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-23 14:36:10 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-23 14:36:11 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-03-23 14:36:11 --> [REQ_ID=a2f05b999074] [VIEW_RENDER] themes/public/home
INFO - 2026-03-23 14:36:11 --> [REQ_ID=a2f05b999074] [MEMORY][commonData:start] 8388608
INFO - 2026-03-23 14:36:11 --> themesMemory usage: 8388608
DEBUG - 2026-03-23 14:36:11 --> [MetaService] slug= pageName=Home cacheHit= path=DB
DEBUG - 2026-03-23 14:36:11 --> [REQ_ID=aec8f9e2bf1e] [FILTER_AFTER]
DEBUG - 2026-03-23 14:36:11 --> [REQ_ID=aec8f9e2bf1e] [LIFECYCLE][END] status=200 duration_ms=1,299.93 memory_delta=4194304
INFO - 2026-03-23 14:36:11 --> [REQ_ID=a2f05b999074] [PERF] Execution time=1.295035
DEBUG - 2026-03-23 14:36:11 --> [REQ_ID=aec8f9e2bf1e] [REQUEST][END]
INFO - 2026-03-23 14:36:11 --> [REQ_ID=aec8f9e2bf1e] [PERF] Execution time=1.315425
DEBUG - 2026-03-23 14:36:22 --> [REQ_ID=fe571347560d] [REQUEST][START] HEAD /
DEBUG - 2026-03-23 14:36:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-23 14:36:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-23 14:36:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-23 14:36:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-23 14:36:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-23 14:41:22 --> [REQ_ID=51df56f7098e] [REQUEST][START] HEAD /
DEBUG - 2026-03-23 14:41:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-23 14:41:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-23 14:41:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-23 14:41:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-23 14:41:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-23 14:46:22 --> [REQ_ID=3c6b7d311813] [REQUEST][START] HEAD /
DEBUG - 2026-03-23 14:46:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-23 14:46:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-23 14:46:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-23 14:46:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-23 14:46:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-23 14:51:22 --> [REQ_ID=4fe8ef179ebb] [REQUEST][START] HEAD /
DEBUG - 2026-03-23 14:51:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-23 14:51:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-23 14:51:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-23 14:51:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-23 14:51:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-23 14:56:22 --> [REQ_ID=16f45fc799d6] [REQUEST][START] HEAD /
DEBUG - 2026-03-23 14:56:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-23 14:56:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-23 14:56:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-23 14:56:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-23 14:56:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-23 15:00:01 --> [REQ_ID=6c017510c9ec] [REQUEST][START] GET /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-23 15:00:02 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-23 15:00:02 --> [REQ_ID=6c017510c9ec] [FILTER_BEFORE] /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-23 15:00:02 --> [REQ_ID=6c017510c9ec] [ROUTE] Controller=\App\Modules\Management\Controllers\ManagementAPIController Method=Run_CRON_Tasks
DEBUG - 2026-03-23 15:00:02 --> [REQ_ID=6c017510c9ec] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-23 15:00:02 --> [REQ_ID=6c017510c9ec] [REQUEST][END]
INFO - 2026-03-23 15:00:02 --> [REQ_ID=6c017510c9ec] [PERF] Execution time=0.049386
DEBUG - 2026-03-23 15:01:22 --> [REQ_ID=50ef502abaa3] [REQUEST][START] HEAD /
DEBUG - 2026-03-23 15:01:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-23 15:01:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-23 15:01:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-23 15:01:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-23 15:01:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-23 15:06:22 --> [REQ_ID=478f80b2e1cb] [REQUEST][START] HEAD /
DEBUG - 2026-03-23 15:06:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-23 15:06:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-23 15:06:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-23 15:06:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-23 15:06:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-23 15:11:22 --> [REQ_ID=031a2df3b82f] [REQUEST][START] HEAD /
DEBUG - 2026-03-23 15:11:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-23 15:11:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-23 15:11:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-23 15:11:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-23 15:11:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-23 15:13:18 --> [REQ_ID=ac6d14640705] [REQUEST][START] GET /index.php/Management/Partners
DEBUG - 2026-03-23 15:13:18 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-23 15:13:18 --> [REQ_ID=ac6d14640705] [FILTER_BEFORE] /index.php/Management/Partners
DEBUG - 2026-03-23 15:13:18 --> [REQ_ID=ac6d14640705] [ROUTE] Controller=\App\Modules\Management\Controllers\PartnersController Method=index
DEBUG - 2026-03-23 15:13:18 --> [REQ_ID=ac6d14640705] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Management/Partners
DEBUG - 2026-03-23 15:13:18 --> [CSRF] token name=csrf_test_name hash=f90d829680ce31426d2e209fee6b3fa9
DEBUG - 2026-03-23 15:13:18 --> [REQ_ID=ac6d14640705] [REQUEST][END]
INFO - 2026-03-23 15:13:18 --> [REQ_ID=ac6d14640705] [PERF] Execution time=0.051246
DEBUG - 2026-03-23 15:13:19 --> [REQ_ID=a5f877a0bd06] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-23 15:13:19 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-23 15:13:19 --> [REQ_ID=a5f877a0bd06] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-23 15:13:19 --> [REQ_ID=a5f877a0bd06] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-23 15:13:19 --> [REQ_ID=a5f877a0bd06] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-23 15:13:19 --> [CSRF] token name=csrf_test_name hash=d16374808b3b8f9a35ec6336a5674f8d
DEBUG - 2026-03-23 15:13:19 --> [REQ_ID=003b44cb50c4] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-23 15:13:19 --> [REQ_ID=003b44cb50c4] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-23 15:13:19 --> [REQ_ID=a5f877a0bd06] [FILTER_AFTER]
DEBUG - 2026-03-23 15:13:19 --> [REQ_ID=a5f877a0bd06] [LIFECYCLE][END] status=200 duration_ms=365.40 memory_delta=0
INFO - 2026-03-23 15:13:19 --> [REQ_ID=003b44cb50c4] [PERF] Execution time=0.364893
DEBUG - 2026-03-23 15:13:19 --> [REQ_ID=a5f877a0bd06] [REQUEST][END]
INFO - 2026-03-23 15:13:19 --> [REQ_ID=a5f877a0bd06] [PERF] Execution time=0.385423
DEBUG - 2026-03-23 15:15:01 --> [REQ_ID=1c5b6699393f] [REQUEST][START] GET /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-23 15:15:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-23 15:15:01 --> [REQ_ID=1c5b6699393f] [FILTER_BEFORE] /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-23 15:15:01 --> [REQ_ID=1c5b6699393f] [ROUTE] Controller=\App\Modules\APIs\Controllers\AlertsAPIController Method=fetchEmailAlerts
DEBUG - 2026-03-23 15:15:01 --> [REQ_ID=1c5b6699393f] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-23 15:15:01 --> [REQ_ID=1c5b6699393f] [REQUEST][END]
INFO - 2026-03-23 15:15:01 --> [REQ_ID=1c5b6699393f] [PERF] Execution time=0.046217
DEBUG - 2026-03-23 15:16:22 --> [REQ_ID=68bbd461a978] [REQUEST][START] HEAD /
DEBUG - 2026-03-23 15:16:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-23 15:16:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-23 15:16:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-23 15:16:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-23 15:16:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-23 15:21:22 --> [REQ_ID=043ff3fc90bc] [REQUEST][START] HEAD /
DEBUG - 2026-03-23 15:21:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-23 15:21:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-23 15:21:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-23 15:21:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-23 15:21:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-23 15:26:22 --> [REQ_ID=000a8e2bd18c] [REQUEST][START] HEAD /
DEBUG - 2026-03-23 15:26:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-23 15:26:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-23 15:26:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-23 15:26:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-23 15:26:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-23 15:31:22 --> [REQ_ID=4bd5ec49e2fd] [REQUEST][START] HEAD /
DEBUG - 2026-03-23 15:31:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-23 15:31:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-23 15:31:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-23 15:31:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-23 15:31:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-23 15:36:22 --> [REQ_ID=54236a257a46] [REQUEST][START] HEAD /
DEBUG - 2026-03-23 15:36:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-23 15:36:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-23 15:36:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-23 15:36:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-23 15:36:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-23 15:37:01 --> [REQ_ID=02e892e026cb] [REQUEST][START] GET /
DEBUG - 2026-03-23 15:37:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-23 15:37:01 --> [REQ_ID=02e892e026cb] [FILTER_BEFORE] /
DEBUG - 2026-03-23 15:37:01 --> [REQ_ID=02e892e026cb] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-23 15:37:01 --> [REQ_ID=02e892e026cb] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-23 15:37:01 --> [CSRF] token name=csrf_test_name hash=8bca4128f1f48c90be4a6572a45085f3
DEBUG - 2026-03-23 15:37:01 --> [REQ_ID=272a2f480e9b] [INIT] App\Controllers\Home::GET
INFO - 2026-03-23 15:37:01 --> [REQ_ID=272a2f480e9b] [MEMORY][controller-start] 4194304
INFO - 2026-03-23 15:37:01 --> [REQ_ID=272a2f480e9b] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-23 15:37:01 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-23 15:37:02 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-03-23 15:37:02 --> [REQ_ID=272a2f480e9b] [VIEW_RENDER] themes/public/home
INFO - 2026-03-23 15:37:02 --> [REQ_ID=272a2f480e9b] [MEMORY][commonData:start] 8388608
INFO - 2026-03-23 15:37:02 --> themesMemory usage: 8388608
DEBUG - 2026-03-23 15:37:02 --> [MetaService] slug= pageName=Home cacheHit= path=DB
DEBUG - 2026-03-23 15:37:02 --> [REQ_ID=02e892e026cb] [FILTER_AFTER]
DEBUG - 2026-03-23 15:37:02 --> [REQ_ID=02e892e026cb] [LIFECYCLE][END] status=200 duration_ms=946.54 memory_delta=4194304
INFO - 2026-03-23 15:37:02 --> [REQ_ID=272a2f480e9b] [PERF] Execution time=0.944668
DEBUG - 2026-03-23 15:37:02 --> [REQ_ID=02e892e026cb] [REQUEST][END]
INFO - 2026-03-23 15:37:02 --> [REQ_ID=02e892e026cb] [PERF] Execution time=0.965360
DEBUG - 2026-03-23 15:41:22 --> [REQ_ID=cd81f739143b] [REQUEST][START] HEAD /
DEBUG - 2026-03-23 15:41:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-23 15:41:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-23 15:41:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-23 15:41:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-23 15:41:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-23 15:46:22 --> [REQ_ID=1d5b6d4d1ada] [REQUEST][START] HEAD /
DEBUG - 2026-03-23 15:46:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-23 15:46:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-23 15:46:23 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-23 15:46:23 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-23 15:46:23 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-23 15:51:22 --> [REQ_ID=ed273b0bd91d] [REQUEST][START] HEAD /
DEBUG - 2026-03-23 15:51:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-23 15:51:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-23 15:51:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-23 15:51:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-23 15:51:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-23 15:56:22 --> [REQ_ID=87e93e7a03db] [REQUEST][START] HEAD /
DEBUG - 2026-03-23 15:56:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-23 15:56:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-23 15:56:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-23 15:56:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-23 15:56:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-23 16:00:02 --> [REQ_ID=7f1c2450554c] [REQUEST][START] GET /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-23 16:00:02 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-23 16:00:02 --> [REQ_ID=7f1c2450554c] [FILTER_BEFORE] /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-23 16:00:02 --> [REQ_ID=7f1c2450554c] [ROUTE] Controller=\App\Modules\Management\Controllers\ManagementAPIController Method=Run_CRON_Tasks
DEBUG - 2026-03-23 16:00:02 --> [REQ_ID=7f1c2450554c] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-23 16:00:02 --> [REQ_ID=7f1c2450554c] [REQUEST][END]
INFO - 2026-03-23 16:00:02 --> [REQ_ID=7f1c2450554c] [PERF] Execution time=0.063037
DEBUG - 2026-03-23 16:01:22 --> [REQ_ID=5cb1bafe4bd6] [REQUEST][START] HEAD /
DEBUG - 2026-03-23 16:01:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-23 16:01:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-23 16:01:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-23 16:01:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-23 16:01:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-23 16:06:22 --> [REQ_ID=e40205fcc348] [REQUEST][START] HEAD /
DEBUG - 2026-03-23 16:06:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-23 16:06:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-23 16:06:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-23 16:06:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-23 16:06:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-23 16:11:22 --> [REQ_ID=048d8be91170] [REQUEST][START] HEAD /
DEBUG - 2026-03-23 16:11:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-23 16:11:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-23 16:11:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-23 16:11:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-23 16:11:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-23 16:15:02 --> [REQ_ID=a8fd987e1a23] [REQUEST][START] GET /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-23 16:15:02 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-23 16:15:02 --> [REQ_ID=a8fd987e1a23] [FILTER_BEFORE] /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-23 16:15:02 --> [REQ_ID=a8fd987e1a23] [ROUTE] Controller=\App\Modules\APIs\Controllers\AlertsAPIController Method=fetchEmailAlerts
DEBUG - 2026-03-23 16:15:02 --> [REQ_ID=a8fd987e1a23] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-23 16:15:02 --> [REQ_ID=a8fd987e1a23] [REQUEST][END]
INFO - 2026-03-23 16:15:02 --> [REQ_ID=a8fd987e1a23] [PERF] Execution time=0.045724
DEBUG - 2026-03-23 16:15:08 --> [REQ_ID=f5a55eb85ff8] [REQUEST][START] GET /
DEBUG - 2026-03-23 16:15:08 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-23 16:15:08 --> [REQ_ID=f5a55eb85ff8] [FILTER_BEFORE] /
DEBUG - 2026-03-23 16:15:08 --> [REQ_ID=f5a55eb85ff8] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-23 16:15:08 --> [REQ_ID=f5a55eb85ff8] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-23 16:15:08 --> [CSRF] token name=csrf_test_name hash=c2ee7c295c6496d68a594b1922d0bb82
DEBUG - 2026-03-23 16:15:08 --> [REQ_ID=fdf183a44740] [INIT] App\Controllers\Home::GET
INFO - 2026-03-23 16:15:08 --> [REQ_ID=fdf183a44740] [MEMORY][controller-start] 4194304
INFO - 2026-03-23 16:15:08 --> [REQ_ID=fdf183a44740] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-23 16:15:08 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-23 16:15:09 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-03-23 16:15:09 --> [REQ_ID=fdf183a44740] [VIEW_RENDER] themes/public/home
INFO - 2026-03-23 16:15:09 --> [REQ_ID=fdf183a44740] [MEMORY][commonData:start] 8388608
INFO - 2026-03-23 16:15:09 --> themesMemory usage: 8388608
DEBUG - 2026-03-23 16:15:09 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-23 16:15:09 --> [REQ_ID=f5a55eb85ff8] [FILTER_AFTER]
DEBUG - 2026-03-23 16:15:09 --> [REQ_ID=f5a55eb85ff8] [LIFECYCLE][END] status=200 duration_ms=985.23 memory_delta=4194304
INFO - 2026-03-23 16:15:09 --> [REQ_ID=fdf183a44740] [PERF] Execution time=0.983799
DEBUG - 2026-03-23 16:15:09 --> [REQ_ID=f5a55eb85ff8] [REQUEST][END]
INFO - 2026-03-23 16:15:09 --> [REQ_ID=f5a55eb85ff8] [PERF] Execution time=0.995578
DEBUG - 2026-03-23 16:16:22 --> [REQ_ID=f0bc791b7c95] [REQUEST][START] HEAD /
DEBUG - 2026-03-23 16:16:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-23 16:16:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-23 16:16:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-23 16:16:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-23 16:16:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-23 16:16:28 --> [REQ_ID=0bf30826dc9e] [REQUEST][START] GET /
DEBUG - 2026-03-23 16:16:28 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-23 16:16:28 --> [REQ_ID=0bf30826dc9e] [FILTER_BEFORE] /
DEBUG - 2026-03-23 16:16:28 --> [REQ_ID=0bf30826dc9e] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-23 16:16:28 --> [REQ_ID=0bf30826dc9e] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-23 16:16:28 --> [CSRF] token name=csrf_test_name hash=2551e0b89b92f3b2226cc6804837e2c7
DEBUG - 2026-03-23 16:16:28 --> [REQ_ID=4039b9c3cca0] [INIT] App\Controllers\Home::GET
INFO - 2026-03-23 16:16:28 --> [REQ_ID=4039b9c3cca0] [MEMORY][controller-start] 4194304
INFO - 2026-03-23 16:16:28 --> [REQ_ID=4039b9c3cca0] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-23 16:16:28 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-23 16:16:29 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
DEBUG - 2026-03-23 16:16:29 --> [REQ_ID=4039b9c3cca0] [VIEW_RENDER] themes/public/home
INFO - 2026-03-23 16:16:29 --> [REQ_ID=4039b9c3cca0] [MEMORY][commonData:start] 8388608
INFO - 2026-03-23 16:16:29 --> themesMemory usage: 8388608
DEBUG - 2026-03-23 16:16:29 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-23 16:16:29 --> [REQ_ID=0bf30826dc9e] [FILTER_AFTER]
DEBUG - 2026-03-23 16:16:29 --> [REQ_ID=0bf30826dc9e] [LIFECYCLE][END] status=200 duration_ms=883.50 memory_delta=4194304
INFO - 2026-03-23 16:16:29 --> [REQ_ID=4039b9c3cca0] [PERF] Execution time=0.881659
DEBUG - 2026-03-23 16:16:29 --> [REQ_ID=0bf30826dc9e] [REQUEST][END]
INFO - 2026-03-23 16:16:29 --> [REQ_ID=0bf30826dc9e] [PERF] Execution time=0.901329
DEBUG - 2026-03-23 16:17:59 --> [REQ_ID=67df80e16d8b] [REQUEST][START] HEAD /
DEBUG - 2026-03-23 16:17:59 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-23 16:17:59 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-23 16:18:00 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-23 16:18:00 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-23 16:18:00 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: none
ERROR - 2026-03-23 16:18:00 --> [ERROR_PAGE] event=error_404 status=404 message=Page not found.
DEBUG - 2026-03-23 16:18:01 --> [REQ_ID=59c5ec2f1253] [REQUEST][START] HEAD /
DEBUG - 2026-03-23 16:18:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-23 16:18:01 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-23 16:18:01 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-23 16:18:01 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-23 16:18:01 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: none
ERROR - 2026-03-23 16:18:01 --> [ERROR_PAGE] event=error_404 status=404 message=Page not found.
DEBUG - 2026-03-23 16:18:03 --> [REQ_ID=2c275618cdee] [REQUEST][START] HEAD /
DEBUG - 2026-03-23 16:18:03 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-23 16:18:03 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-23 16:18:03 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-23 16:18:03 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-23 16:18:03 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: none
ERROR - 2026-03-23 16:18:03 --> [ERROR_PAGE] event=error_404 status=404 message=Page not found.
DEBUG - 2026-03-23 16:21:22 --> [REQ_ID=600508eaa931] [REQUEST][START] HEAD /
DEBUG - 2026-03-23 16:21:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-23 16:21:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-23 16:21:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-23 16:21:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-23 16:21:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-23 16:26:22 --> [REQ_ID=368b3e18904e] [REQUEST][START] HEAD /
DEBUG - 2026-03-23 16:26:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-23 16:26:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-23 16:26:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-23 16:26:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-23 16:26:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-23 16:31:22 --> [REQ_ID=6f10fa03236c] [REQUEST][START] HEAD /
DEBUG - 2026-03-23 16:31:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-23 16:31:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-23 16:31:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-23 16:31:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-23 16:31:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-23 16:36:22 --> [REQ_ID=c6d56525602a] [REQUEST][START] HEAD /
DEBUG - 2026-03-23 16:36:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-23 16:36:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-23 16:36:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-23 16:36:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-23 16:36:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-23 16:41:22 --> [REQ_ID=1baa53f6a498] [REQUEST][START] HEAD /
DEBUG - 2026-03-23 16:41:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-23 16:41:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-23 16:41:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-23 16:41:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-23 16:41:23 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-23 16:46:22 --> [REQ_ID=468a826c762b] [REQUEST][START] HEAD /
DEBUG - 2026-03-23 16:46:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-23 16:46:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-23 16:46:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-23 16:46:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-23 16:46:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-23 16:51:22 --> [REQ_ID=be2b0c2667b0] [REQUEST][START] HEAD /
DEBUG - 2026-03-23 16:51:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-23 16:51:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-23 16:51:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-23 16:51:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-23 16:51:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-23 16:56:22 --> [REQ_ID=b6588fa2c2ab] [REQUEST][START] HEAD /
DEBUG - 2026-03-23 16:56:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-23 16:56:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-23 16:56:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-23 16:56:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-23 16:56:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-23 17:00:01 --> [REQ_ID=a1b1d9e3c908] [REQUEST][START] GET /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-23 17:00:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-23 17:00:01 --> [REQ_ID=a1b1d9e3c908] [FILTER_BEFORE] /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-23 17:00:01 --> [REQ_ID=a1b1d9e3c908] [ROUTE] Controller=\App\Modules\Management\Controllers\ManagementAPIController Method=Run_CRON_Tasks
DEBUG - 2026-03-23 17:00:01 --> [REQ_ID=a1b1d9e3c908] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-23 17:00:01 --> [REQ_ID=a1b1d9e3c908] [REQUEST][END]
INFO - 2026-03-23 17:00:01 --> [REQ_ID=a1b1d9e3c908] [PERF] Execution time=0.049494
DEBUG - 2026-03-23 17:01:22 --> [REQ_ID=71fcb6252913] [REQUEST][START] HEAD /
DEBUG - 2026-03-23 17:01:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-23 17:01:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-23 17:01:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-23 17:01:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-23 17:01:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-23 17:06:22 --> [REQ_ID=9b42c404ded8] [REQUEST][START] HEAD /
DEBUG - 2026-03-23 17:06:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-23 17:06:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-23 17:06:23 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-23 17:06:23 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-23 17:06:23 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-23 17:11:22 --> [REQ_ID=66fc39e23791] [REQUEST][START] HEAD /
DEBUG - 2026-03-23 17:11:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-23 17:11:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-23 17:11:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-23 17:11:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-23 17:11:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-23 17:15:01 --> [REQ_ID=2718fce07cac] [REQUEST][START] GET /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-23 17:15:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-23 17:15:01 --> [REQ_ID=2718fce07cac] [FILTER_BEFORE] /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-23 17:15:01 --> [REQ_ID=2718fce07cac] [ROUTE] Controller=\App\Modules\APIs\Controllers\AlertsAPIController Method=fetchEmailAlerts
DEBUG - 2026-03-23 17:15:01 --> [REQ_ID=2718fce07cac] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-23 17:15:01 --> [REQ_ID=2718fce07cac] [REQUEST][END]
INFO - 2026-03-23 17:15:01 --> [REQ_ID=2718fce07cac] [PERF] Execution time=0.065399
DEBUG - 2026-03-23 17:16:22 --> [REQ_ID=228bfbe3afd7] [REQUEST][START] HEAD /
DEBUG - 2026-03-23 17:16:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-23 17:16:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-23 17:16:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-23 17:16:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-23 17:16:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-23 17:18:10 --> [REQ_ID=7614314b1854] [REQUEST][START] GET /
DEBUG - 2026-03-23 17:18:10 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-23 17:18:10 --> [REQ_ID=7614314b1854] [FILTER_BEFORE] /
DEBUG - 2026-03-23 17:18:10 --> [REQ_ID=7614314b1854] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-23 17:18:10 --> [REQ_ID=7614314b1854] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-23 17:18:10 --> [CSRF] token name=csrf_test_name hash=f2c4c62b5ab54121e2d31060c035c763
DEBUG - 2026-03-23 17:18:10 --> [REQ_ID=86d0aa593336] [INIT] App\Controllers\Home::GET
INFO - 2026-03-23 17:18:10 --> [REQ_ID=86d0aa593336] [MEMORY][controller-start] 6291456
INFO - 2026-03-23 17:18:10 --> [REQ_ID=86d0aa593336] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-23 17:18:10 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-23 17:18:11 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-03-23 17:18:11 --> [REQ_ID=86d0aa593336] [VIEW_RENDER] themes/public/home
INFO - 2026-03-23 17:18:11 --> [REQ_ID=86d0aa593336] [MEMORY][commonData:start] 10485760
INFO - 2026-03-23 17:18:11 --> themesMemory usage: 10485760
DEBUG - 2026-03-23 17:18:11 --> [MetaService] slug= pageName=Home cacheHit= path=DB
DEBUG - 2026-03-23 17:18:11 --> [REQ_ID=7614314b1854] [FILTER_AFTER]
DEBUG - 2026-03-23 17:18:11 --> [REQ_ID=7614314b1854] [LIFECYCLE][END] status=200 duration_ms=734.53 memory_delta=4194304
INFO - 2026-03-23 17:18:11 --> [REQ_ID=86d0aa593336] [PERF] Execution time=0.731866
DEBUG - 2026-03-23 17:18:11 --> [REQ_ID=7614314b1854] [REQUEST][END]
INFO - 2026-03-23 17:18:11 --> [REQ_ID=7614314b1854] [PERF] Execution time=0.783665
DEBUG - 2026-03-23 17:21:22 --> [REQ_ID=f4c3bb65bb09] [REQUEST][START] HEAD /
DEBUG - 2026-03-23 17:21:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-23 17:21:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-23 17:21:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-23 17:21:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-23 17:21:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-23 17:24:53 --> [REQ_ID=03262530b6b1] [REQUEST][START] GET /
DEBUG - 2026-03-23 17:24:53 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-23 17:24:53 --> [REQ_ID=03262530b6b1] [FILTER_BEFORE] /
DEBUG - 2026-03-23 17:24:53 --> [REQ_ID=03262530b6b1] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-23 17:24:53 --> [REQ_ID=03262530b6b1] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-23 17:24:53 --> [CSRF] token name=csrf_test_name hash=c85d818d4e765a84e46527f4204024ae
DEBUG - 2026-03-23 17:24:53 --> [REQ_ID=0fbbfa74e99f] [INIT] App\Controllers\Home::GET
INFO - 2026-03-23 17:24:53 --> [REQ_ID=0fbbfa74e99f] [MEMORY][controller-start] 6291456
INFO - 2026-03-23 17:24:53 --> [REQ_ID=0fbbfa74e99f] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-23 17:24:53 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-23 17:24:54 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
DEBUG - 2026-03-23 17:24:54 --> [REQ_ID=0fbbfa74e99f] [VIEW_RENDER] themes/public/home
INFO - 2026-03-23 17:24:54 --> [REQ_ID=0fbbfa74e99f] [MEMORY][commonData:start] 10485760
INFO - 2026-03-23 17:24:54 --> themesMemory usage: 10485760
DEBUG - 2026-03-23 17:24:54 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-23 17:24:54 --> [REQ_ID=03262530b6b1] [FILTER_AFTER]
DEBUG - 2026-03-23 17:24:54 --> [REQ_ID=03262530b6b1] [LIFECYCLE][END] status=200 duration_ms=1,045.35 memory_delta=4194304
INFO - 2026-03-23 17:24:54 --> [REQ_ID=0fbbfa74e99f] [PERF] Execution time=1.043494
DEBUG - 2026-03-23 17:24:54 --> [REQ_ID=03262530b6b1] [REQUEST][END]
INFO - 2026-03-23 17:24:54 --> [REQ_ID=03262530b6b1] [PERF] Execution time=1.082905
DEBUG - 2026-03-23 17:24:55 --> [REQ_ID=e7adfed4bd2a] [REQUEST][START] GET /
DEBUG - 2026-03-23 17:24:55 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-23 17:24:55 --> [REQ_ID=e7adfed4bd2a] [FILTER_BEFORE] /
DEBUG - 2026-03-23 17:24:55 --> [REQ_ID=e7adfed4bd2a] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-23 17:24:55 --> [REQ_ID=e7adfed4bd2a] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-23 17:24:55 --> [CSRF] token name=csrf_test_name hash=ebe16331a2c56e71675f8cba51f865d2
DEBUG - 2026-03-23 17:24:55 --> [REQ_ID=18e94a47c94a] [INIT] App\Controllers\Home::GET
INFO - 2026-03-23 17:24:55 --> [REQ_ID=18e94a47c94a] [MEMORY][controller-start] 6291456
INFO - 2026-03-23 17:24:55 --> [REQ_ID=18e94a47c94a] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-23 17:24:55 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-23 17:24:56 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
DEBUG - 2026-03-23 17:24:56 --> [REQ_ID=18e94a47c94a] [VIEW_RENDER] themes/public/home
INFO - 2026-03-23 17:24:56 --> [REQ_ID=18e94a47c94a] [MEMORY][commonData:start] 8388608
INFO - 2026-03-23 17:24:56 --> themesMemory usage: 8388608
DEBUG - 2026-03-23 17:24:56 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-23 17:24:56 --> [REQ_ID=e7adfed4bd2a] [FILTER_AFTER]
DEBUG - 2026-03-23 17:24:56 --> [REQ_ID=e7adfed4bd2a] [LIFECYCLE][END] status=200 duration_ms=809.73 memory_delta=2097152
INFO - 2026-03-23 17:24:56 --> [REQ_ID=18e94a47c94a] [PERF] Execution time=0.809577
DEBUG - 2026-03-23 17:24:56 --> [REQ_ID=e7adfed4bd2a] [REQUEST][END]
INFO - 2026-03-23 17:24:56 --> [REQ_ID=e7adfed4bd2a] [PERF] Execution time=0.818134
DEBUG - 2026-03-23 17:24:56 --> [REQ_ID=e580f452a488] [REQUEST][START] GET /index.php/Legal/Terms-And-Conditions
DEBUG - 2026-03-23 17:24:56 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-23 17:24:56 --> [REQ_ID=e580f452a488] [FILTER_BEFORE] /index.php/Legal/Terms-And-Conditions
DEBUG - 2026-03-23 17:24:56 --> [REQ_ID=e580f452a488] [ROUTE] Controller=\App\Controllers\Home Method=terms
DEBUG - 2026-03-23 17:24:56 --> [REQ_ID=e580f452a488] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Legal/Terms-And-Conditions
DEBUG - 2026-03-23 17:24:56 --> [CSRF] token name=csrf_test_name hash=c85d818d4e765a84e46527f4204024ae
DEBUG - 2026-03-23 17:24:56 --> [REQ_ID=e580f452a488] [REQUEST][END]
INFO - 2026-03-23 17:24:56 --> [REQ_ID=e580f452a488] [PERF] Execution time=0.010331
DEBUG - 2026-03-23 17:24:57 --> [REQ_ID=aa77f30761e6] [REQUEST][START] GET /index.php/Legal/Privacy-Policy
DEBUG - 2026-03-23 17:24:57 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-23 17:24:57 --> [REQ_ID=aa77f30761e6] [FILTER_BEFORE] /index.php/Legal/Privacy-Policy
DEBUG - 2026-03-23 17:24:57 --> [REQ_ID=aa77f30761e6] [ROUTE] Controller=\App\Controllers\Home Method=privacyPolicy
DEBUG - 2026-03-23 17:24:57 --> [REQ_ID=aa77f30761e6] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Legal/Privacy-Policy
DEBUG - 2026-03-23 17:24:57 --> [CSRF] token name=csrf_test_name hash=c85d818d4e765a84e46527f4204024ae
DEBUG - 2026-03-23 17:24:57 --> [REQ_ID=aa77f30761e6] [REQUEST][END]
INFO - 2026-03-23 17:24:57 --> [REQ_ID=aa77f30761e6] [PERF] Execution time=0.008914
DEBUG - 2026-03-23 17:24:58 --> [REQ_ID=c1069bcdbf7b] [REQUEST][START] GET /index.php/Privacy-Policy
DEBUG - 2026-03-23 17:24:58 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-23 17:24:58 --> [REQ_ID=c1069bcdbf7b] [FILTER_BEFORE] /index.php/Privacy-Policy
DEBUG - 2026-03-23 17:24:58 --> [REQ_ID=c1069bcdbf7b] [ROUTE] Controller=\App\Controllers\Home Method=privacyPolicy
DEBUG - 2026-03-23 17:24:58 --> [REQ_ID=c1069bcdbf7b] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Privacy-Policy
DEBUG - 2026-03-23 17:24:58 --> [CSRF] token name=csrf_test_name hash=c85d818d4e765a84e46527f4204024ae
DEBUG - 2026-03-23 17:24:58 --> [REQ_ID=a1ac378432a1] [INIT] App\Controllers\Home::GET
INFO - 2026-03-23 17:24:58 --> [REQ_ID=a1ac378432a1] [MEMORY][controller-start] 4194304
INFO - 2026-03-23 17:24:58 --> [REQ_ID=a1ac378432a1] [MEMORY][commonData:start] 4194304
DEBUG - 2026-03-23 17:24:58 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-23 17:24:59 --> [MetaService] slug=privacy-policy pageName= cacheHit= path=DB
DEBUG - 2026-03-23 17:24:59 --> [REQ_ID=a1ac378432a1] [VIEW_RENDER] themes/public/privacyPolicy
INFO - 2026-03-23 17:24:59 --> [REQ_ID=a1ac378432a1] [MEMORY][commonData:start] 8388608
INFO - 2026-03-23 17:24:59 --> themesMemory usage: 8388608
DEBUG - 2026-03-23 17:24:59 --> [MetaService] slug=privacy-policy pageName=Privacy Policy cacheHit= path=DB
DEBUG - 2026-03-23 17:24:59 --> [REQ_ID=c1069bcdbf7b] [FILTER_AFTER]
DEBUG - 2026-03-23 17:24:59 --> [REQ_ID=c1069bcdbf7b] [LIFECYCLE][END] status=200 duration_ms=787.37 memory_delta=4194304
INFO - 2026-03-23 17:24:59 --> [REQ_ID=a1ac378432a1] [PERF] Execution time=0.787336
DEBUG - 2026-03-23 17:24:59 --> [REQ_ID=c1069bcdbf7b] [REQUEST][END]
INFO - 2026-03-23 17:24:59 --> [REQ_ID=c1069bcdbf7b] [PERF] Execution time=0.797084
DEBUG - 2026-03-23 17:24:59 --> [REQ_ID=6c6d55885da5] [REQUEST][START] GET /index.php/Terms-Of-Service
DEBUG - 2026-03-23 17:24:59 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-23 17:24:59 --> [REQ_ID=6c6d55885da5] [FILTER_BEFORE] /index.php/Terms-Of-Service
DEBUG - 2026-03-23 17:24:59 --> [REQ_ID=6c6d55885da5] [ROUTE] Controller=\App\Controllers\Home Method=termsOfService
DEBUG - 2026-03-23 17:24:59 --> [REQ_ID=6c6d55885da5] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Terms-Of-Service
DEBUG - 2026-03-23 17:24:59 --> [CSRF] token name=csrf_test_name hash=c85d818d4e765a84e46527f4204024ae
DEBUG - 2026-03-23 17:24:59 --> [REQ_ID=6c4b1184623d] [INIT] App\Controllers\Home::GET
INFO - 2026-03-23 17:24:59 --> [REQ_ID=6c4b1184623d] [MEMORY][controller-start] 6291456
INFO - 2026-03-23 17:24:59 --> [REQ_ID=6c4b1184623d] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-23 17:24:59 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-23 17:25:00 --> [MetaService] slug=terms-of-service pageName= cacheHit= path=DB
DEBUG - 2026-03-23 17:25:00 --> [REQ_ID=6c4b1184623d] [VIEW_RENDER] themes/public/termsOfService
INFO - 2026-03-23 17:25:00 --> [REQ_ID=6c4b1184623d] [MEMORY][commonData:start] 8388608
INFO - 2026-03-23 17:25:00 --> themesMemory usage: 8388608
DEBUG - 2026-03-23 17:25:00 --> [MetaService] slug=terms-of-service pageName=Terms of Service cacheHit= path=DB
DEBUG - 2026-03-23 17:25:00 --> [REQ_ID=6c6d55885da5] [FILTER_AFTER]
DEBUG - 2026-03-23 17:25:00 --> [REQ_ID=6c6d55885da5] [LIFECYCLE][END] status=200 duration_ms=985.44 memory_delta=2097152
INFO - 2026-03-23 17:25:00 --> [REQ_ID=6c4b1184623d] [PERF] Execution time=0.985312
DEBUG - 2026-03-23 17:25:00 --> [REQ_ID=6c6d55885da5] [REQUEST][END]
INFO - 2026-03-23 17:25:00 --> [REQ_ID=6c6d55885da5] [PERF] Execution time=0.994826
DEBUG - 2026-03-23 17:25:00 --> [REQ_ID=d8afb16c8420] [REQUEST][START] GET /index.php/Support
DEBUG - 2026-03-23 17:25:00 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-23 17:25:00 --> [REQ_ID=d8afb16c8420] [FILTER_BEFORE] /index.php/Support
DEBUG - 2026-03-23 17:25:00 --> [REQ_ID=d8afb16c8420] [ROUTE] Controller=\App\Modules\Support\Controllers\SupportController Method=index
DEBUG - 2026-03-23 17:25:00 --> [REQ_ID=d8afb16c8420] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Support
DEBUG - 2026-03-23 17:25:00 --> [CSRF] token name=csrf_test_name hash=c85d818d4e765a84e46527f4204024ae
DEBUG - 2026-03-23 17:25:00 --> [REQ_ID=b597f50fb297] [INIT] App\Modules\Support\Controllers\SupportController::GET
INFO - 2026-03-23 17:25:00 --> [REQ_ID=b597f50fb297] [MEMORY][controller-start] 6291456
DEBUG - 2026-03-23 17:25:00 --> [REQ_ID=b597f50fb297] [METHOD_ENTRY] index
DEBUG - 2026-03-23 17:25:00 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-23 17:25:00 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-23 17:25:01 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-23 17:25:01 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-23 17:25:01 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-23 17:25:01 --> MyMICoin: guest context detected; skipping user-specific preload.
INFO - 2026-03-23 17:25:01 --> [REQ_ID=b597f50fb297] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-23 17:25:01 --> [REQ_ID=b597f50fb297] [VIEW_RENDER] SupportModule\Views\Support\index
INFO - 2026-03-23 17:25:01 --> [REQ_ID=b597f50fb297] [MEMORY][commonData:start] 6291456
INFO - 2026-03-23 17:25:01 --> themesMemory usage: 6291456
DEBUG - 2026-03-23 17:25:01 --> [REQ_ID=d8afb16c8420] [FILTER_AFTER]
DEBUG - 2026-03-23 17:25:01 --> [REQ_ID=d8afb16c8420] [LIFECYCLE][END] status=200 duration_ms=86.41 memory_delta=0
INFO - 2026-03-23 17:25:01 --> [REQ_ID=b597f50fb297] [PERF] Execution time=0.086256
DEBUG - 2026-03-23 17:25:01 --> [REQ_ID=d8afb16c8420] [REQUEST][END]
INFO - 2026-03-23 17:25:01 --> [REQ_ID=d8afb16c8420] [PERF] Execution time=0.098544
DEBUG - 2026-03-23 17:25:01 --> [REQ_ID=80a7edb09434] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-23 17:25:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-23 17:25:01 --> [REQ_ID=80a7edb09434] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-23 17:25:01 --> [REQ_ID=80a7edb09434] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-23 17:25:01 --> [REQ_ID=80a7edb09434] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-23 17:25:01 --> [CSRF] token name=csrf_test_name hash=c85d818d4e765a84e46527f4204024ae
DEBUG - 2026-03-23 17:25:01 --> [REQ_ID=9b8610d2af27] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-23 17:25:01 --> [REQ_ID=9b8610d2af27] [MEMORY][controller-start] 6291456
DEBUG - 2026-03-23 17:25:02 --> [REQ_ID=80a7edb09434] [FILTER_AFTER]
DEBUG - 2026-03-23 17:25:02 --> [REQ_ID=80a7edb09434] [LIFECYCLE][END] status=200 duration_ms=54.48 memory_delta=0
INFO - 2026-03-23 17:25:02 --> [REQ_ID=9b8610d2af27] [PERF] Execution time=0.054151
DEBUG - 2026-03-23 17:25:02 --> [REQ_ID=80a7edb09434] [REQUEST][END]
INFO - 2026-03-23 17:25:02 --> [REQ_ID=80a7edb09434] [PERF] Execution time=0.066703
DEBUG - 2026-03-23 17:25:02 --> [REQ_ID=61d50280a5bd] [REQUEST][START] GET /index.php/Account/Activity
DEBUG - 2026-03-23 17:25:02 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-23 17:25:02 --> [REQ_ID=61d50280a5bd] [FILTER_BEFORE] /index.php/Account/Activity
DEBUG - 2026-03-23 17:25:02 --> [REQ_ID=61d50280a5bd] [ROUTE] Controller=\App\Modules\User\Controllers\DashboardController Method=activity
DEBUG - 2026-03-23 17:25:02 --> [REQ_ID=61d50280a5bd] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Account/Activity
DEBUG - 2026-03-23 17:25:02 --> [CSRF] token name=csrf_test_name hash=c85d818d4e765a84e46527f4204024ae
DEBUG - 2026-03-23 17:25:02 --> [REQ_ID=61d50280a5bd] [REQUEST][END]
INFO - 2026-03-23 17:25:02 --> [REQ_ID=61d50280a5bd] [PERF] Execution time=0.013585
DEBUG - 2026-03-23 17:25:03 --> [REQ_ID=1d4b04585396] [REQUEST][START] GET /index.php/Customer-Support
DEBUG - 2026-03-23 17:25:03 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-23 17:25:04 --> [REQ_ID=1d4b04585396] [FILTER_BEFORE] /index.php/Customer-Support
DEBUG - 2026-03-23 17:25:04 --> [REQ_ID=1d4b04585396] [ROUTE] Controller=\App\Controllers\App\Modules\Support\Controllers\SupportController Method=index
DEBUG - 2026-03-23 17:25:04 --> [REQ_ID=1d4b04585396] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Customer-Support
DEBUG - 2026-03-23 17:25:04 --> [CSRF] token name=csrf_test_name hash=c85d818d4e765a84e46527f4204024ae
DEBUG - 2026-03-23 17:25:04 --> [REQ_ID=1d4b04585396] [REQUEST][END]
INFO - 2026-03-23 17:25:04 --> [REQ_ID=1d4b04585396] [PERF] Execution time=0.008996
DEBUG - 2026-03-23 17:25:04 --> [REQ_ID=df0dfe425082] [REQUEST][START] GET /index.php/?_escaped_fragment_=
DEBUG - 2026-03-23 17:25:04 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-23 17:25:04 --> [REQ_ID=df0dfe425082] [FILTER_BEFORE] /index.php/?_escaped_fragment_=
DEBUG - 2026-03-23 17:25:04 --> [REQ_ID=df0dfe425082] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-23 17:25:04 --> [REQ_ID=df0dfe425082] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php?_escaped_fragment_=
DEBUG - 2026-03-23 17:25:04 --> [CSRF] token name=csrf_test_name hash=c85d818d4e765a84e46527f4204024ae
DEBUG - 2026-03-23 17:25:04 --> [REQ_ID=eb44a685b129] [INIT] App\Controllers\Home::GET
INFO - 2026-03-23 17:25:04 --> [REQ_ID=eb44a685b129] [MEMORY][controller-start] 4194304
INFO - 2026-03-23 17:25:05 --> [REQ_ID=eb44a685b129] [MEMORY][commonData:start] 4194304
DEBUG - 2026-03-23 17:25:05 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-23 17:25:06 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
DEBUG - 2026-03-23 17:25:06 --> [REQ_ID=eb44a685b129] [VIEW_RENDER] themes/public/home
INFO - 2026-03-23 17:25:06 --> [REQ_ID=eb44a685b129] [MEMORY][commonData:start] 8388608
INFO - 2026-03-23 17:25:06 --> themesMemory usage: 8388608
DEBUG - 2026-03-23 17:25:06 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-23 17:25:06 --> [REQ_ID=df0dfe425082] [FILTER_AFTER]
DEBUG - 2026-03-23 17:25:06 --> [REQ_ID=df0dfe425082] [LIFECYCLE][END] status=200 duration_ms=1,209.32 memory_delta=4194304
INFO - 2026-03-23 17:25:06 --> [REQ_ID=eb44a685b129] [PERF] Execution time=1.209235
DEBUG - 2026-03-23 17:25:06 --> [REQ_ID=df0dfe425082] [REQUEST][END]
INFO - 2026-03-23 17:25:06 --> [REQ_ID=df0dfe425082] [PERF] Execution time=1.220444
DEBUG - 2026-03-23 17:25:06 --> [REQ_ID=086c56b01c28] [REQUEST][START] GET /
DEBUG - 2026-03-23 17:25:06 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-23 17:25:06 --> [REQ_ID=086c56b01c28] [FILTER_BEFORE] /
DEBUG - 2026-03-23 17:25:06 --> [REQ_ID=086c56b01c28] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-23 17:25:06 --> [REQ_ID=086c56b01c28] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-23 17:25:06 --> [CSRF] token name=csrf_test_name hash=c85d818d4e765a84e46527f4204024ae
DEBUG - 2026-03-23 17:25:06 --> [REQ_ID=115a7ba25e49] [INIT] App\Controllers\Home::GET
INFO - 2026-03-23 17:25:06 --> [REQ_ID=115a7ba25e49] [MEMORY][controller-start] 6291456
INFO - 2026-03-23 17:25:06 --> [REQ_ID=115a7ba25e49] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-23 17:25:06 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-23 17:25:07 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
DEBUG - 2026-03-23 17:25:07 --> [REQ_ID=115a7ba25e49] [VIEW_RENDER] themes/public/home
INFO - 2026-03-23 17:25:07 --> [REQ_ID=115a7ba25e49] [MEMORY][commonData:start] 8388608
INFO - 2026-03-23 17:25:07 --> themesMemory usage: 8388608
DEBUG - 2026-03-23 17:25:07 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-23 17:25:07 --> [REQ_ID=086c56b01c28] [FILTER_AFTER]
DEBUG - 2026-03-23 17:25:07 --> [REQ_ID=086c56b01c28] [LIFECYCLE][END] status=200 duration_ms=819.91 memory_delta=2097152
INFO - 2026-03-23 17:25:07 --> [REQ_ID=115a7ba25e49] [PERF] Execution time=0.819606
DEBUG - 2026-03-23 17:25:07 --> [REQ_ID=086c56b01c28] [REQUEST][END]
INFO - 2026-03-23 17:25:07 --> [REQ_ID=086c56b01c28] [PERF] Execution time=0.829133
DEBUG - 2026-03-23 17:25:18 --> [REQ_ID=fc28a84593dd] [REQUEST][START] GET /
DEBUG - 2026-03-23 17:25:18 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-23 17:25:18 --> [REQ_ID=fc28a84593dd] [FILTER_BEFORE] /
DEBUG - 2026-03-23 17:25:18 --> [REQ_ID=fc28a84593dd] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-23 17:25:18 --> [REQ_ID=fc28a84593dd] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-23 17:25:18 --> [CSRF] token name=csrf_test_name hash=feb695fd650e7f981886a9b8a2a3862c
DEBUG - 2026-03-23 17:25:18 --> [REQ_ID=89dff9b7fe6b] [INIT] App\Controllers\Home::GET
INFO - 2026-03-23 17:25:18 --> [REQ_ID=89dff9b7fe6b] [MEMORY][controller-start] 4194304
INFO - 2026-03-23 17:25:18 --> [REQ_ID=89dff9b7fe6b] [MEMORY][commonData:start] 4194304
DEBUG - 2026-03-23 17:25:18 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-23 17:25:18 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
DEBUG - 2026-03-23 17:25:18 --> [REQ_ID=89dff9b7fe6b] [VIEW_RENDER] themes/public/home
INFO - 2026-03-23 17:25:18 --> [REQ_ID=89dff9b7fe6b] [MEMORY][commonData:start] 8388608
INFO - 2026-03-23 17:25:18 --> themesMemory usage: 8388608
DEBUG - 2026-03-23 17:25:18 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-23 17:25:18 --> [REQ_ID=fc28a84593dd] [FILTER_AFTER]
DEBUG - 2026-03-23 17:25:18 --> [REQ_ID=fc28a84593dd] [LIFECYCLE][END] status=200 duration_ms=817.53 memory_delta=4194304
INFO - 2026-03-23 17:25:18 --> [REQ_ID=89dff9b7fe6b] [PERF] Execution time=0.817356
DEBUG - 2026-03-23 17:25:18 --> [REQ_ID=fc28a84593dd] [REQUEST][END]
INFO - 2026-03-23 17:25:18 --> [REQ_ID=fc28a84593dd] [PERF] Execution time=0.827027
DEBUG - 2026-03-23 17:25:22 --> [REQ_ID=61b0b0ae81cf] [REQUEST][START] GET /
DEBUG - 2026-03-23 17:25:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-23 17:25:22 --> [REQ_ID=61b0b0ae81cf] [FILTER_BEFORE] /
DEBUG - 2026-03-23 17:25:22 --> [REQ_ID=61b0b0ae81cf] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-23 17:25:22 --> [REQ_ID=61b0b0ae81cf] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-23 17:25:22 --> [CSRF] token name=csrf_test_name hash=591e35de82f548fcd7d2aea40ae429d2
DEBUG - 2026-03-23 17:25:22 --> [REQ_ID=4b63534226cc] [INIT] App\Controllers\Home::GET
INFO - 2026-03-23 17:25:22 --> [REQ_ID=4b63534226cc] [MEMORY][controller-start] 4194304
INFO - 2026-03-23 17:25:22 --> [REQ_ID=4b63534226cc] [MEMORY][commonData:start] 4194304
DEBUG - 2026-03-23 17:25:22 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-23 17:25:23 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
DEBUG - 2026-03-23 17:25:23 --> [REQ_ID=4b63534226cc] [VIEW_RENDER] themes/public/home
INFO - 2026-03-23 17:25:23 --> [REQ_ID=4b63534226cc] [MEMORY][commonData:start] 8388608
INFO - 2026-03-23 17:25:23 --> themesMemory usage: 8388608
DEBUG - 2026-03-23 17:25:23 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-23 17:25:23 --> [REQ_ID=61b0b0ae81cf] [FILTER_AFTER]
DEBUG - 2026-03-23 17:25:23 --> [REQ_ID=61b0b0ae81cf] [LIFECYCLE][END] status=200 duration_ms=946.21 memory_delta=4194304
INFO - 2026-03-23 17:25:23 --> [REQ_ID=4b63534226cc] [PERF] Execution time=0.946049
DEBUG - 2026-03-23 17:25:23 --> [REQ_ID=61b0b0ae81cf] [REQUEST][END]
INFO - 2026-03-23 17:25:23 --> [REQ_ID=61b0b0ae81cf] [PERF] Execution time=0.955462
DEBUG - 2026-03-23 17:25:24 --> [REQ_ID=3a9473221d7a] [REQUEST][START] OPTIONS /
DEBUG - 2026-03-23 17:25:24 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-23 17:25:24 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: OPTIONS, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-23 17:25:24 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-23 17:25:24 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-23 17:25:24 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: none
ERROR - 2026-03-23 17:25:24 --> [ERROR_PAGE] event=error_404 status=404 message=Page not found.
DEBUG - 2026-03-23 17:26:22 --> [REQ_ID=81d1bdf16d20] [REQUEST][START] HEAD /
DEBUG - 2026-03-23 17:26:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-23 17:26:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-23 17:26:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-23 17:26:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-23 17:26:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-23 17:31:22 --> [REQ_ID=13aca47dff43] [REQUEST][START] HEAD /
DEBUG - 2026-03-23 17:31:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-23 17:31:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-23 17:31:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-23 17:31:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-23 17:31:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-23 17:36:22 --> [REQ_ID=10230dedf167] [REQUEST][START] HEAD /
DEBUG - 2026-03-23 17:36:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-23 17:36:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-23 17:36:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-23 17:36:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-23 17:36:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-23 17:41:22 --> [REQ_ID=638481e482f3] [REQUEST][START] HEAD /
DEBUG - 2026-03-23 17:41:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-23 17:41:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-23 17:41:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-23 17:41:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-23 17:41:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-23 17:43:25 --> [REQ_ID=bcd272746502] [REQUEST][START] GET /
DEBUG - 2026-03-23 17:43:25 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-23 17:43:25 --> [REQ_ID=bcd272746502] [REQUEST][END]
INFO - 2026-03-23 17:43:25 --> [REQ_ID=bcd272746502] [PERF] Execution time=0.039282
DEBUG - 2026-03-23 17:43:25 --> [REQ_ID=840f9f9b5bb5] [REQUEST][START] GET /
DEBUG - 2026-03-23 17:43:25 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-23 17:43:25 --> [REQ_ID=840f9f9b5bb5] [FILTER_BEFORE] /
DEBUG - 2026-03-23 17:43:25 --> [REQ_ID=840f9f9b5bb5] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-23 17:43:25 --> [REQ_ID=840f9f9b5bb5] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-23 17:43:25 --> [CSRF] token name=csrf_test_name hash=9577667f784f1b9052c29bcd4cb961ef
DEBUG - 2026-03-23 17:43:25 --> [REQ_ID=4f0fe6ef5b2b] [INIT] App\Controllers\Home::GET
INFO - 2026-03-23 17:43:25 --> [REQ_ID=4f0fe6ef5b2b] [MEMORY][controller-start] 4194304
INFO - 2026-03-23 17:43:25 --> [REQ_ID=4f0fe6ef5b2b] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-23 17:43:26 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-23 17:43:26 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-03-23 17:43:26 --> [REQ_ID=4f0fe6ef5b2b] [VIEW_RENDER] themes/public/home
INFO - 2026-03-23 17:43:26 --> [REQ_ID=4f0fe6ef5b2b] [MEMORY][commonData:start] 8388608
INFO - 2026-03-23 17:43:26 --> themesMemory usage: 8388608
DEBUG - 2026-03-23 17:43:26 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-23 17:43:26 --> [REQ_ID=840f9f9b5bb5] [FILTER_AFTER]
DEBUG - 2026-03-23 17:43:26 --> [REQ_ID=840f9f9b5bb5] [LIFECYCLE][END] status=200 duration_ms=986.60 memory_delta=4194304
INFO - 2026-03-23 17:43:26 --> [REQ_ID=4f0fe6ef5b2b] [PERF] Execution time=0.984600
DEBUG - 2026-03-23 17:43:26 --> [REQ_ID=840f9f9b5bb5] [REQUEST][END]
INFO - 2026-03-23 17:43:26 --> [REQ_ID=840f9f9b5bb5] [PERF] Execution time=0.995349
DEBUG - 2026-03-23 17:46:22 --> [REQ_ID=f78db841d05d] [REQUEST][START] HEAD /
DEBUG - 2026-03-23 17:46:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-23 17:46:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-23 17:46:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-23 17:46:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-23 17:46:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-23 17:47:59 --> [REQ_ID=b63ed70f9327] [REQUEST][START] GET /
DEBUG - 2026-03-23 17:47:59 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-23 17:47:59 --> [REQ_ID=b63ed70f9327] [FILTER_BEFORE] /
DEBUG - 2026-03-23 17:47:59 --> [REQ_ID=b63ed70f9327] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-23 17:47:59 --> [REQ_ID=b63ed70f9327] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-23 17:47:59 --> [CSRF] token name=csrf_test_name hash=de97a4bb71616708d94d201310470048
DEBUG - 2026-03-23 17:47:59 --> [REQ_ID=0c1b0f90a299] [INIT] App\Controllers\Home::GET
INFO - 2026-03-23 17:47:59 --> [REQ_ID=0c1b0f90a299] [MEMORY][controller-start] 6291456
INFO - 2026-03-23 17:47:59 --> [REQ_ID=0c1b0f90a299] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-23 17:47:59 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-23 17:48:00 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
DEBUG - 2026-03-23 17:48:00 --> [REQ_ID=0c1b0f90a299] [VIEW_RENDER] themes/public/home
INFO - 2026-03-23 17:48:00 --> [REQ_ID=0c1b0f90a299] [MEMORY][commonData:start] 10485760
INFO - 2026-03-23 17:48:00 --> themesMemory usage: 10485760
DEBUG - 2026-03-23 17:48:00 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-23 17:48:00 --> [REQ_ID=b63ed70f9327] [FILTER_AFTER]
DEBUG - 2026-03-23 17:48:00 --> [REQ_ID=b63ed70f9327] [LIFECYCLE][END] status=200 duration_ms=957.26 memory_delta=4194304
INFO - 2026-03-23 17:48:00 --> [REQ_ID=0c1b0f90a299] [PERF] Execution time=0.955404
DEBUG - 2026-03-23 17:48:00 --> [REQ_ID=b63ed70f9327] [REQUEST][END]
INFO - 2026-03-23 17:48:00 --> [REQ_ID=b63ed70f9327] [PERF] Execution time=1.001963
DEBUG - 2026-03-23 17:51:22 --> [REQ_ID=3abcac275fee] [REQUEST][START] HEAD /
DEBUG - 2026-03-23 17:51:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-23 17:51:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-23 17:51:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-23 17:51:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-23 17:51:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-23 17:56:22 --> [REQ_ID=51e4ebc35c11] [REQUEST][START] HEAD /
DEBUG - 2026-03-23 17:56:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-23 17:56:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-23 17:56:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-23 17:56:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-23 17:56:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-23 18:00:02 --> [REQ_ID=c10ad67d0c17] [REQUEST][START] GET /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-23 18:00:02 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-23 18:00:02 --> [REQ_ID=c10ad67d0c17] [FILTER_BEFORE] /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-23 18:00:02 --> [REQ_ID=c10ad67d0c17] [ROUTE] Controller=\App\Modules\Management\Controllers\ManagementAPIController Method=Run_CRON_Tasks
DEBUG - 2026-03-23 18:00:02 --> [REQ_ID=c10ad67d0c17] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-23 18:00:02 --> [REQ_ID=c10ad67d0c17] [REQUEST][END]
INFO - 2026-03-23 18:00:02 --> [REQ_ID=c10ad67d0c17] [PERF] Execution time=0.044234
DEBUG - 2026-03-23 18:01:22 --> [REQ_ID=771b14468361] [REQUEST][START] HEAD /
DEBUG - 2026-03-23 18:01:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-23 18:01:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-23 18:01:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-23 18:01:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-23 18:01:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-23 18:04:26 --> [REQ_ID=31c0ff5a9e5e] [REQUEST][START] GET /
DEBUG - 2026-03-23 18:04:26 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-23 18:04:26 --> [REQ_ID=31c0ff5a9e5e] [FILTER_BEFORE] /
DEBUG - 2026-03-23 18:04:26 --> [REQ_ID=31c0ff5a9e5e] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-23 18:04:26 --> [REQ_ID=31c0ff5a9e5e] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-23 18:04:26 --> [CSRF] token name=csrf_test_name hash=1e02c1b8eeda4aa59b0bba0c0da3cbad
DEBUG - 2026-03-23 18:04:26 --> [REQ_ID=08e5094bb2b3] [INIT] App\Controllers\Home::GET
INFO - 2026-03-23 18:04:26 --> [REQ_ID=08e5094bb2b3] [MEMORY][controller-start] 6291456
INFO - 2026-03-23 18:04:26 --> [REQ_ID=08e5094bb2b3] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-23 18:04:26 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-23 18:04:27 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-03-23 18:04:27 --> [REQ_ID=08e5094bb2b3] [VIEW_RENDER] themes/public/home
INFO - 2026-03-23 18:04:27 --> [REQ_ID=08e5094bb2b3] [MEMORY][commonData:start] 10485760
INFO - 2026-03-23 18:04:27 --> themesMemory usage: 10485760
DEBUG - 2026-03-23 18:04:27 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-23 18:04:27 --> [REQ_ID=31c0ff5a9e5e] [FILTER_AFTER]
DEBUG - 2026-03-23 18:04:27 --> [REQ_ID=31c0ff5a9e5e] [LIFECYCLE][END] status=200 duration_ms=705.07 memory_delta=4194304
INFO - 2026-03-23 18:04:27 --> [REQ_ID=08e5094bb2b3] [PERF] Execution time=0.703006
DEBUG - 2026-03-23 18:04:27 --> [REQ_ID=31c0ff5a9e5e] [REQUEST][END]
INFO - 2026-03-23 18:04:27 --> [REQ_ID=31c0ff5a9e5e] [PERF] Execution time=0.744042
DEBUG - 2026-03-23 18:05:31 --> [REQ_ID=785519454899] [REQUEST][START] GET /
DEBUG - 2026-03-23 18:05:31 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-23 18:05:31 --> [REQ_ID=785519454899] [FILTER_BEFORE] /
DEBUG - 2026-03-23 18:05:31 --> [REQ_ID=785519454899] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-23 18:05:31 --> [REQ_ID=785519454899] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-23 18:05:31 --> [CSRF] token name=csrf_test_name hash=b4aa374a15016d6dbfa5c956d9e0b77f
DEBUG - 2026-03-23 18:05:31 --> [REQ_ID=010d56a57664] [INIT] App\Controllers\Home::GET
INFO - 2026-03-23 18:05:31 --> [REQ_ID=010d56a57664] [MEMORY][controller-start] 6291456
INFO - 2026-03-23 18:05:31 --> [REQ_ID=010d56a57664] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-23 18:05:31 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-23 18:05:32 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
DEBUG - 2026-03-23 18:05:32 --> [REQ_ID=010d56a57664] [VIEW_RENDER] themes/public/home
INFO - 2026-03-23 18:05:32 --> [REQ_ID=010d56a57664] [MEMORY][commonData:start] 8388608
INFO - 2026-03-23 18:05:32 --> themesMemory usage: 8388608
DEBUG - 2026-03-23 18:05:32 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-23 18:05:32 --> [REQ_ID=785519454899] [FILTER_AFTER]
DEBUG - 2026-03-23 18:05:32 --> [REQ_ID=785519454899] [LIFECYCLE][END] status=200 duration_ms=1,148.10 memory_delta=2097152
INFO - 2026-03-23 18:05:32 --> [REQ_ID=010d56a57664] [PERF] Execution time=1.147790
DEBUG - 2026-03-23 18:05:32 --> [REQ_ID=785519454899] [REQUEST][END]
INFO - 2026-03-23 18:05:32 --> [REQ_ID=785519454899] [PERF] Execution time=1.158806
DEBUG - 2026-03-23 18:05:35 --> [REQ_ID=d1ab2714afb1] [REQUEST][START] GET /
DEBUG - 2026-03-23 18:05:35 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-23 18:05:35 --> [REQ_ID=d1ab2714afb1] [FILTER_BEFORE] /
DEBUG - 2026-03-23 18:05:35 --> [REQ_ID=d1ab2714afb1] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-23 18:05:35 --> [REQ_ID=d1ab2714afb1] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-23 18:05:35 --> [CSRF] token name=csrf_test_name hash=7375faa5ae5f998c1fe90b08ccdcff33
DEBUG - 2026-03-23 18:05:35 --> [REQ_ID=c24d09f7bb5e] [INIT] App\Controllers\Home::GET
INFO - 2026-03-23 18:05:35 --> [REQ_ID=c24d09f7bb5e] [MEMORY][controller-start] 6291456
INFO - 2026-03-23 18:05:35 --> [REQ_ID=c24d09f7bb5e] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-23 18:05:35 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-23 18:05:36 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
DEBUG - 2026-03-23 18:05:36 --> [REQ_ID=c24d09f7bb5e] [VIEW_RENDER] themes/public/home
INFO - 2026-03-23 18:05:36 --> [REQ_ID=c24d09f7bb5e] [MEMORY][commonData:start] 8388608
INFO - 2026-03-23 18:05:36 --> themesMemory usage: 8388608
DEBUG - 2026-03-23 18:05:36 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-23 18:05:36 --> [REQ_ID=d1ab2714afb1] [FILTER_AFTER]
DEBUG - 2026-03-23 18:05:36 --> [REQ_ID=d1ab2714afb1] [LIFECYCLE][END] status=200 duration_ms=761.33 memory_delta=2097152
INFO - 2026-03-23 18:05:36 --> [REQ_ID=c24d09f7bb5e] [PERF] Execution time=0.760863
DEBUG - 2026-03-23 18:05:36 --> [REQ_ID=d1ab2714afb1] [REQUEST][END]
INFO - 2026-03-23 18:05:36 --> [REQ_ID=d1ab2714afb1] [PERF] Execution time=0.773910
DEBUG - 2026-03-23 18:05:52 --> [REQ_ID=e15fc20af3eb] [REQUEST][START] GET /
DEBUG - 2026-03-23 18:05:52 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-23 18:05:52 --> [REQ_ID=e15fc20af3eb] [FILTER_BEFORE] /
DEBUG - 2026-03-23 18:05:52 --> [REQ_ID=e15fc20af3eb] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-23 18:05:52 --> [REQ_ID=e15fc20af3eb] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-23 18:05:52 --> [CSRF] token name=csrf_test_name hash=80f9af1c3ac43434327d9d8ba1a9b2e1
DEBUG - 2026-03-23 18:05:52 --> [REQ_ID=9a67aa15b575] [INIT] App\Controllers\Home::GET
INFO - 2026-03-23 18:05:52 --> [REQ_ID=9a67aa15b575] [MEMORY][controller-start] 6291456
INFO - 2026-03-23 18:05:52 --> [REQ_ID=9a67aa15b575] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-23 18:05:52 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-23 18:05:53 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
DEBUG - 2026-03-23 18:05:53 --> [REQ_ID=9a67aa15b575] [VIEW_RENDER] themes/public/home
INFO - 2026-03-23 18:05:53 --> [REQ_ID=9a67aa15b575] [MEMORY][commonData:start] 8388608
INFO - 2026-03-23 18:05:53 --> themesMemory usage: 8388608
DEBUG - 2026-03-23 18:05:53 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-23 18:05:53 --> [REQ_ID=e15fc20af3eb] [FILTER_AFTER]
DEBUG - 2026-03-23 18:05:53 --> [REQ_ID=e15fc20af3eb] [LIFECYCLE][END] status=200 duration_ms=956.33 memory_delta=2097152
INFO - 2026-03-23 18:05:53 --> [REQ_ID=9a67aa15b575] [PERF] Execution time=0.956132
DEBUG - 2026-03-23 18:05:53 --> [REQ_ID=e15fc20af3eb] [REQUEST][END]
INFO - 2026-03-23 18:05:53 --> [REQ_ID=e15fc20af3eb] [PERF] Execution time=0.966703
DEBUG - 2026-03-23 18:06:22 --> [REQ_ID=0d78a0562fbb] [REQUEST][START] HEAD /
DEBUG - 2026-03-23 18:06:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-23 18:06:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-23 18:06:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-23 18:06:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-23 18:06:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-23 18:07:31 --> [REQ_ID=42b185606b77] [REQUEST][START] GET /
DEBUG - 2026-03-23 18:07:31 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-23 18:07:31 --> [REQ_ID=42b185606b77] [FILTER_BEFORE] /
DEBUG - 2026-03-23 18:07:31 --> [REQ_ID=42b185606b77] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-23 18:07:31 --> [REQ_ID=42b185606b77] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-23 18:07:31 --> [CSRF] token name=csrf_test_name hash=33702ea9c93aa0e38359396af580a219
DEBUG - 2026-03-23 18:07:31 --> [REQ_ID=7af9481ebeeb] [INIT] App\Controllers\Home::GET
INFO - 2026-03-23 18:07:31 --> [REQ_ID=7af9481ebeeb] [MEMORY][controller-start] 6291456
INFO - 2026-03-23 18:07:31 --> [REQ_ID=7af9481ebeeb] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-23 18:07:31 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-23 18:07:32 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
DEBUG - 2026-03-23 18:07:32 --> [REQ_ID=7af9481ebeeb] [VIEW_RENDER] themes/public/home
INFO - 2026-03-23 18:07:32 --> [REQ_ID=7af9481ebeeb] [MEMORY][commonData:start] 10485760
INFO - 2026-03-23 18:07:32 --> themesMemory usage: 10485760
DEBUG - 2026-03-23 18:07:32 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-23 18:07:32 --> [REQ_ID=42b185606b77] [FILTER_AFTER]
DEBUG - 2026-03-23 18:07:32 --> [REQ_ID=42b185606b77] [LIFECYCLE][END] status=200 duration_ms=1,065.07 memory_delta=4194304
INFO - 2026-03-23 18:07:32 --> [REQ_ID=7af9481ebeeb] [PERF] Execution time=1.062449
DEBUG - 2026-03-23 18:07:32 --> [REQ_ID=42b185606b77] [REQUEST][END]
INFO - 2026-03-23 18:07:32 --> [REQ_ID=42b185606b77] [PERF] Execution time=1.115039
DEBUG - 2026-03-23 18:08:03 --> [REQ_ID=207a8ec9507f] [REQUEST][START] GET /
DEBUG - 2026-03-23 18:08:03 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-23 18:08:03 --> [REQ_ID=207a8ec9507f] [FILTER_BEFORE] /
DEBUG - 2026-03-23 18:08:03 --> [REQ_ID=207a8ec9507f] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-23 18:08:03 --> [REQ_ID=207a8ec9507f] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-23 18:08:03 --> [CSRF] token name=csrf_test_name hash=d5248ed24603b3e386f802b1282348ab
DEBUG - 2026-03-23 18:08:03 --> [REQ_ID=a2517c8df1fe] [INIT] App\Controllers\Home::GET
INFO - 2026-03-23 18:08:03 --> [REQ_ID=a2517c8df1fe] [MEMORY][controller-start] 6291456
INFO - 2026-03-23 18:08:03 --> [REQ_ID=a2517c8df1fe] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-23 18:08:03 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-23 18:08:04 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
DEBUG - 2026-03-23 18:08:04 --> [REQ_ID=a2517c8df1fe] [VIEW_RENDER] themes/public/home
INFO - 2026-03-23 18:08:04 --> [REQ_ID=a2517c8df1fe] [MEMORY][commonData:start] 8388608
INFO - 2026-03-23 18:08:04 --> themesMemory usage: 8388608
DEBUG - 2026-03-23 18:08:04 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-23 18:08:04 --> [REQ_ID=207a8ec9507f] [FILTER_AFTER]
DEBUG - 2026-03-23 18:08:04 --> [REQ_ID=207a8ec9507f] [LIFECYCLE][END] status=200 duration_ms=1,080.84 memory_delta=2097152
INFO - 2026-03-23 18:08:04 --> [REQ_ID=a2517c8df1fe] [PERF] Execution time=1.080597
DEBUG - 2026-03-23 18:08:04 --> [REQ_ID=207a8ec9507f] [REQUEST][END]
INFO - 2026-03-23 18:08:04 --> [REQ_ID=207a8ec9507f] [PERF] Execution time=1.090374
DEBUG - 2026-03-23 18:11:22 --> [REQ_ID=84a37e22e4b4] [REQUEST][START] HEAD /
DEBUG - 2026-03-23 18:11:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-23 18:11:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-23 18:11:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-23 18:11:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-23 18:11:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-23 18:15:01 --> [REQ_ID=d8ef61ef3af9] [REQUEST][START] GET /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-23 18:15:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-23 18:15:01 --> [REQ_ID=d8ef61ef3af9] [FILTER_BEFORE] /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-23 18:15:01 --> [REQ_ID=d8ef61ef3af9] [ROUTE] Controller=\App\Modules\APIs\Controllers\AlertsAPIController Method=fetchEmailAlerts
DEBUG - 2026-03-23 18:15:01 --> [REQ_ID=d8ef61ef3af9] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-23 18:15:01 --> [REQ_ID=d8ef61ef3af9] [REQUEST][END]
INFO - 2026-03-23 18:15:01 --> [REQ_ID=d8ef61ef3af9] [PERF] Execution time=0.046142
DEBUG - 2026-03-23 18:16:22 --> [REQ_ID=1ffdf2526acf] [REQUEST][START] HEAD /
DEBUG - 2026-03-23 18:16:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-23 18:16:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-23 18:16:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-23 18:16:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-23 18:16:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-23 18:21:22 --> [REQ_ID=650659cfbcf4] [REQUEST][START] HEAD /
DEBUG - 2026-03-23 18:21:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-23 18:21:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-23 18:21:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-23 18:21:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-23 18:21:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-23 18:26:05 --> [REQ_ID=16760f4b198e] [REQUEST][START] GET /
DEBUG - 2026-03-23 18:26:05 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-23 18:26:05 --> [REQ_ID=16760f4b198e] [FILTER_BEFORE] /
DEBUG - 2026-03-23 18:26:05 --> [REQ_ID=16760f4b198e] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-23 18:26:05 --> [REQ_ID=16760f4b198e] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-23 18:26:05 --> [CSRF] token name=csrf_test_name hash=9d20a89c7a2d98d42882f9806c468c53
DEBUG - 2026-03-23 18:26:05 --> [REQ_ID=63f9e7143d0b] [INIT] App\Controllers\Home::GET
INFO - 2026-03-23 18:26:05 --> [REQ_ID=63f9e7143d0b] [MEMORY][controller-start] 6291456
INFO - 2026-03-23 18:26:06 --> [REQ_ID=63f9e7143d0b] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-23 18:26:06 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-23 18:26:06 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-03-23 18:26:06 --> [REQ_ID=63f9e7143d0b] [VIEW_RENDER] themes/public/home
INFO - 2026-03-23 18:26:06 --> [REQ_ID=63f9e7143d0b] [MEMORY][commonData:start] 10485760
INFO - 2026-03-23 18:26:06 --> themesMemory usage: 10485760
DEBUG - 2026-03-23 18:26:06 --> [MetaService] slug= pageName=Home cacheHit= path=DB
DEBUG - 2026-03-23 18:26:06 --> [REQ_ID=16760f4b198e] [FILTER_AFTER]
DEBUG - 2026-03-23 18:26:06 --> [REQ_ID=16760f4b198e] [LIFECYCLE][END] status=200 duration_ms=885.66 memory_delta=4194304
INFO - 2026-03-23 18:26:06 --> [REQ_ID=63f9e7143d0b] [PERF] Execution time=0.883786
DEBUG - 2026-03-23 18:26:06 --> [REQ_ID=16760f4b198e] [REQUEST][END]
INFO - 2026-03-23 18:26:06 --> [REQ_ID=16760f4b198e] [PERF] Execution time=0.926939
DEBUG - 2026-03-23 18:26:13 --> [REQ_ID=6083ff2172d3] [REQUEST][START] GET /
DEBUG - 2026-03-23 18:26:13 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-23 18:26:13 --> [REQ_ID=6083ff2172d3] [FILTER_BEFORE] /
DEBUG - 2026-03-23 18:26:13 --> [REQ_ID=6083ff2172d3] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-23 18:26:13 --> [REQ_ID=6083ff2172d3] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-23 18:26:13 --> [CSRF] token name=csrf_test_name hash=9d20a89c7a2d98d42882f9806c468c53
DEBUG - 2026-03-23 18:26:13 --> [REQ_ID=0361ac9e0d6f] [INIT] App\Controllers\Home::GET
INFO - 2026-03-23 18:26:13 --> [REQ_ID=0361ac9e0d6f] [MEMORY][controller-start] 6291456
INFO - 2026-03-23 18:26:13 --> [REQ_ID=0361ac9e0d6f] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-23 18:26:13 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-23 18:26:14 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
DEBUG - 2026-03-23 18:26:14 --> [REQ_ID=0361ac9e0d6f] [VIEW_RENDER] themes/public/home
INFO - 2026-03-23 18:26:14 --> [REQ_ID=0361ac9e0d6f] [MEMORY][commonData:start] 8388608
INFO - 2026-03-23 18:26:14 --> themesMemory usage: 8388608
DEBUG - 2026-03-23 18:26:14 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-23 18:26:14 --> [REQ_ID=6083ff2172d3] [FILTER_AFTER]
DEBUG - 2026-03-23 18:26:14 --> [REQ_ID=6083ff2172d3] [LIFECYCLE][END] status=200 duration_ms=936.69 memory_delta=2097152
INFO - 2026-03-23 18:26:14 --> [REQ_ID=0361ac9e0d6f] [PERF] Execution time=0.936367
DEBUG - 2026-03-23 18:26:14 --> [REQ_ID=6083ff2172d3] [REQUEST][END]
INFO - 2026-03-23 18:26:14 --> [REQ_ID=6083ff2172d3] [PERF] Execution time=0.946704
DEBUG - 2026-03-23 18:26:22 --> [REQ_ID=d3cf5fd2a86e] [REQUEST][START] HEAD /
DEBUG - 2026-03-23 18:26:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-23 18:26:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-23 18:26:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-23 18:26:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-23 18:26:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-23 18:26:23 --> [REQ_ID=78006f1a8e0f] [REQUEST][START] GET /
DEBUG - 2026-03-23 18:26:23 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-23 18:26:23 --> [REQ_ID=78006f1a8e0f] [FILTER_BEFORE] /
DEBUG - 2026-03-23 18:26:23 --> [REQ_ID=78006f1a8e0f] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-23 18:26:23 --> [REQ_ID=78006f1a8e0f] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-23 18:26:23 --> [CSRF] token name=csrf_test_name hash=9d20a89c7a2d98d42882f9806c468c53
DEBUG - 2026-03-23 18:26:23 --> [REQ_ID=581637ed1f08] [INIT] App\Controllers\Home::GET
INFO - 2026-03-23 18:26:23 --> [REQ_ID=581637ed1f08] [MEMORY][controller-start] 4194304
INFO - 2026-03-23 18:26:23 --> [REQ_ID=581637ed1f08] [MEMORY][commonData:start] 4194304
DEBUG - 2026-03-23 18:26:23 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-23 18:26:24 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
DEBUG - 2026-03-23 18:26:24 --> [REQ_ID=581637ed1f08] [VIEW_RENDER] themes/public/home
INFO - 2026-03-23 18:26:24 --> [REQ_ID=581637ed1f08] [MEMORY][commonData:start] 8388608
INFO - 2026-03-23 18:26:24 --> themesMemory usage: 8388608
DEBUG - 2026-03-23 18:26:24 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-23 18:26:24 --> [REQ_ID=78006f1a8e0f] [FILTER_AFTER]
DEBUG - 2026-03-23 18:26:24 --> [REQ_ID=78006f1a8e0f] [LIFECYCLE][END] status=200 duration_ms=900.48 memory_delta=4194304
INFO - 2026-03-23 18:26:24 --> [REQ_ID=581637ed1f08] [PERF] Execution time=0.900289
DEBUG - 2026-03-23 18:26:24 --> [REQ_ID=78006f1a8e0f] [REQUEST][END]
INFO - 2026-03-23 18:26:24 --> [REQ_ID=78006f1a8e0f] [PERF] Execution time=0.911008
DEBUG - 2026-03-23 18:31:17 --> [REQ_ID=5e4ad3fb1307] [REQUEST][START] GET /
DEBUG - 2026-03-23 18:31:17 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-23 18:31:17 --> [REQ_ID=5e4ad3fb1307] [REQUEST][END]
INFO - 2026-03-23 18:31:17 --> [REQ_ID=5e4ad3fb1307] [PERF] Execution time=0.043959
DEBUG - 2026-03-23 18:31:22 --> [REQ_ID=4a4c561f41f0] [REQUEST][START] HEAD /
DEBUG - 2026-03-23 18:31:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-23 18:31:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-23 18:31:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-23 18:31:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-23 18:31:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-23 18:36:22 --> [REQ_ID=e5ac29963941] [REQUEST][START] HEAD /
DEBUG - 2026-03-23 18:36:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-23 18:36:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-23 18:36:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-23 18:36:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-23 18:36:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-23 18:41:22 --> [REQ_ID=a7ee68161c95] [REQUEST][START] HEAD /
DEBUG - 2026-03-23 18:41:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-23 18:41:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-23 18:41:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-23 18:41:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-23 18:41:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-23 18:46:22 --> [REQ_ID=e0570d946fb7] [REQUEST][START] HEAD /
DEBUG - 2026-03-23 18:46:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-23 18:46:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-23 18:46:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-23 18:46:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-23 18:46:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-23 18:50:57 --> [REQ_ID=a661a76ec4f8] [REQUEST][START] GET /index.php/Account
DEBUG - 2026-03-23 18:50:57 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-23 18:50:57 --> [REQ_ID=a661a76ec4f8] [REQUEST][END]
INFO - 2026-03-23 18:50:57 --> [REQ_ID=a661a76ec4f8] [PERF] Execution time=0.041689
DEBUG - 2026-03-23 18:51:22 --> [REQ_ID=d4cf0920f1a9] [REQUEST][START] HEAD /
DEBUG - 2026-03-23 18:51:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-23 18:51:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-23 18:51:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-23 18:51:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-23 18:51:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-23 18:56:22 --> [REQ_ID=2f2c3cd77c49] [REQUEST][START] HEAD /
DEBUG - 2026-03-23 18:56:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-23 18:56:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-23 18:56:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-23 18:56:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-23 18:56:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-23 19:00:02 --> [REQ_ID=4342e8f8b6ae] [REQUEST][START] GET /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-23 19:00:02 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-23 19:00:02 --> [REQ_ID=4342e8f8b6ae] [FILTER_BEFORE] /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-23 19:00:02 --> [REQ_ID=4342e8f8b6ae] [ROUTE] Controller=\App\Modules\Management\Controllers\ManagementAPIController Method=Run_CRON_Tasks
DEBUG - 2026-03-23 19:00:02 --> [REQ_ID=4342e8f8b6ae] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-23 19:00:02 --> [REQ_ID=4342e8f8b6ae] [REQUEST][END]
INFO - 2026-03-23 19:00:02 --> [REQ_ID=4342e8f8b6ae] [PERF] Execution time=0.076792
DEBUG - 2026-03-23 19:01:22 --> [REQ_ID=a807a9c36b68] [REQUEST][START] HEAD /
DEBUG - 2026-03-23 19:01:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-23 19:01:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-23 19:01:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-23 19:01:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-23 19:01:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-23 19:06:22 --> [REQ_ID=a18934255b58] [REQUEST][START] HEAD /
DEBUG - 2026-03-23 19:06:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-23 19:06:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-23 19:06:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-23 19:06:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-23 19:06:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-23 19:11:22 --> [REQ_ID=c755a071ae74] [REQUEST][START] HEAD /
DEBUG - 2026-03-23 19:11:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-23 19:11:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-23 19:11:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-23 19:11:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-23 19:11:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-23 19:11:52 --> [REQ_ID=7a041369206a] [REQUEST][START] GET /
DEBUG - 2026-03-23 19:11:52 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-23 19:11:52 --> [REQ_ID=7a041369206a] [FILTER_BEFORE] /
DEBUG - 2026-03-23 19:11:52 --> [REQ_ID=7a041369206a] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-23 19:11:52 --> [REQ_ID=7a041369206a] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-23 19:11:52 --> [CSRF] token name=csrf_test_name hash=21caf5b931aef495a40cb699027e1318
DEBUG - 2026-03-23 19:11:52 --> [REQ_ID=987bfa1a8d5b] [INIT] App\Controllers\Home::GET
INFO - 2026-03-23 19:11:52 --> [REQ_ID=987bfa1a8d5b] [MEMORY][controller-start] 4194304
INFO - 2026-03-23 19:11:53 --> [REQ_ID=987bfa1a8d5b] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-23 19:11:53 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-23 19:11:53 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-03-23 19:11:53 --> [REQ_ID=987bfa1a8d5b] [VIEW_RENDER] themes/public/home
INFO - 2026-03-23 19:11:53 --> [REQ_ID=987bfa1a8d5b] [MEMORY][commonData:start] 8388608
INFO - 2026-03-23 19:11:53 --> themesMemory usage: 8388608
DEBUG - 2026-03-23 19:11:53 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-23 19:11:53 --> [REQ_ID=7a041369206a] [FILTER_AFTER]
DEBUG - 2026-03-23 19:11:53 --> [REQ_ID=7a041369206a] [LIFECYCLE][END] status=200 duration_ms=699.05 memory_delta=4194304
INFO - 2026-03-23 19:11:53 --> [REQ_ID=987bfa1a8d5b] [PERF] Execution time=0.697088
DEBUG - 2026-03-23 19:11:53 --> [REQ_ID=7a041369206a] [REQUEST][END]
INFO - 2026-03-23 19:11:53 --> [REQ_ID=7a041369206a] [PERF] Execution time=0.717278
DEBUG - 2026-03-23 19:15:01 --> [REQ_ID=d557543f212d] [REQUEST][START] GET /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-23 19:15:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-23 19:15:01 --> [REQ_ID=d557543f212d] [FILTER_BEFORE] /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-23 19:15:01 --> [REQ_ID=d557543f212d] [ROUTE] Controller=\App\Modules\APIs\Controllers\AlertsAPIController Method=fetchEmailAlerts
DEBUG - 2026-03-23 19:15:01 --> [REQ_ID=d557543f212d] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-23 19:15:01 --> [REQ_ID=d557543f212d] [REQUEST][END]
INFO - 2026-03-23 19:15:01 --> [REQ_ID=d557543f212d] [PERF] Execution time=0.045626
DEBUG - 2026-03-23 19:16:22 --> [REQ_ID=09eb7f17227e] [REQUEST][START] HEAD /
DEBUG - 2026-03-23 19:16:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-23 19:16:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-23 19:16:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-23 19:16:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-23 19:16:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-23 19:21:22 --> [REQ_ID=21aa6d86864b] [REQUEST][START] HEAD /
DEBUG - 2026-03-23 19:21:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-23 19:21:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-23 19:21:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-23 19:21:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-23 19:21:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-23 19:26:22 --> [REQ_ID=42de14bfc0be] [REQUEST][START] HEAD /
DEBUG - 2026-03-23 19:26:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-23 19:26:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-23 19:26:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-23 19:26:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-23 19:26:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-23 19:31:22 --> [REQ_ID=a6aa038b750a] [REQUEST][START] HEAD /
DEBUG - 2026-03-23 19:31:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-23 19:31:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-23 19:31:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-23 19:31:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-23 19:31:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-23 19:36:22 --> [REQ_ID=08a2974e8eb5] [REQUEST][START] HEAD /
DEBUG - 2026-03-23 19:36:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-23 19:36:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-23 19:36:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-23 19:36:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-23 19:36:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-23 19:41:22 --> [REQ_ID=7e637bf09f63] [REQUEST][START] HEAD /
DEBUG - 2026-03-23 19:41:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-23 19:41:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-23 19:41:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-23 19:41:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-23 19:41:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-23 19:46:22 --> [REQ_ID=949504feea1b] [REQUEST][START] HEAD /
DEBUG - 2026-03-23 19:46:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-23 19:46:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-23 19:46:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-23 19:46:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-23 19:46:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-23 19:51:22 --> [REQ_ID=4ec5c5132c2b] [REQUEST][START] HEAD /
DEBUG - 2026-03-23 19:51:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-23 19:51:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-23 19:51:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-23 19:51:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-23 19:51:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-23 19:56:22 --> [REQ_ID=415f307871a0] [REQUEST][START] HEAD /
DEBUG - 2026-03-23 19:56:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-23 19:56:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-23 19:56:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-23 19:56:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-23 19:56:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-23 20:00:01 --> [REQ_ID=c8bbd7087110] [REQUEST][START] GET /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-23 20:00:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-23 20:00:01 --> [REQ_ID=c8bbd7087110] [FILTER_BEFORE] /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-23 20:00:01 --> [REQ_ID=c8bbd7087110] [ROUTE] Controller=\App\Modules\Management\Controllers\ManagementAPIController Method=Run_CRON_Tasks
DEBUG - 2026-03-23 20:00:01 --> [REQ_ID=c8bbd7087110] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-23 20:00:01 --> [REQ_ID=c8bbd7087110] [REQUEST][END]
INFO - 2026-03-23 20:00:01 --> [REQ_ID=c8bbd7087110] [PERF] Execution time=0.051499
DEBUG - 2026-03-23 20:01:22 --> [REQ_ID=790e825797ed] [REQUEST][START] HEAD /
DEBUG - 2026-03-23 20:01:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-23 20:01:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-23 20:01:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-23 20:01:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-23 20:01:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-23 20:06:22 --> [REQ_ID=8d0166c3baab] [REQUEST][START] HEAD /
DEBUG - 2026-03-23 20:06:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-23 20:06:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-23 20:06:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-23 20:06:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-23 20:06:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-23 20:11:22 --> [REQ_ID=f0e245915f8e] [REQUEST][START] HEAD /
DEBUG - 2026-03-23 20:11:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-23 20:11:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-23 20:11:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-23 20:11:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-23 20:11:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-23 20:15:02 --> [REQ_ID=ddbd04d9ad5a] [REQUEST][START] GET /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-23 20:15:02 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-23 20:15:02 --> [REQ_ID=ddbd04d9ad5a] [FILTER_BEFORE] /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-23 20:15:02 --> [REQ_ID=ddbd04d9ad5a] [ROUTE] Controller=\App\Modules\APIs\Controllers\AlertsAPIController Method=fetchEmailAlerts
DEBUG - 2026-03-23 20:15:02 --> [REQ_ID=ddbd04d9ad5a] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-23 20:15:02 --> [REQ_ID=ddbd04d9ad5a] [REQUEST][END]
INFO - 2026-03-23 20:15:02 --> [REQ_ID=ddbd04d9ad5a] [PERF] Execution time=0.064088
DEBUG - 2026-03-23 20:16:22 --> [REQ_ID=1e0f8988510b] [REQUEST][START] HEAD /
DEBUG - 2026-03-23 20:16:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-23 20:16:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-23 20:16:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-23 20:16:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-23 20:16:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-23 20:21:22 --> [REQ_ID=3f91df58c056] [REQUEST][START] HEAD /
DEBUG - 2026-03-23 20:21:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-23 20:21:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-23 20:21:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-23 20:21:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-23 20:21:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-23 20:25:47 --> [REQ_ID=bf5cdf082816] [REQUEST][START] GET /index.php/How-It-Works/overview
DEBUG - 2026-03-23 20:25:47 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-23 20:25:47 --> [REQ_ID=bf5cdf082816] [REQUEST][END]
INFO - 2026-03-23 20:25:47 --> [REQ_ID=bf5cdf082816] [PERF] Execution time=0.041791
DEBUG - 2026-03-23 20:26:22 --> [REQ_ID=9ecdae3ddb0a] [REQUEST][START] HEAD /
DEBUG - 2026-03-23 20:26:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-23 20:26:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-23 20:26:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-23 20:26:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-23 20:26:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-23 20:31:22 --> [REQ_ID=a304d6916e2e] [REQUEST][START] HEAD /
DEBUG - 2026-03-23 20:31:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-23 20:31:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-23 20:31:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-23 20:31:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-23 20:31:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-23 20:35:24 --> [REQ_ID=f9e30538531f] [REQUEST][START] GET /index.php/Account/Billing
DEBUG - 2026-03-23 20:35:24 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-23 20:35:24 --> [REQ_ID=f9e30538531f] [REQUEST][END]
INFO - 2026-03-23 20:35:24 --> [REQ_ID=f9e30538531f] [PERF] Execution time=0.043011
DEBUG - 2026-03-23 20:36:22 --> [REQ_ID=ec74d6c1224b] [REQUEST][START] HEAD /
DEBUG - 2026-03-23 20:36:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-23 20:36:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-23 20:36:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-23 20:36:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-23 20:36:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-23 20:41:03 --> [REQ_ID=89db8c5ef885] [REQUEST][START] GET /index.php/register
DEBUG - 2026-03-23 20:41:03 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-23 20:41:03 --> [REQ_ID=89db8c5ef885] [REQUEST][END]
INFO - 2026-03-23 20:41:03 --> [REQ_ID=89db8c5ef885] [PERF] Execution time=0.041911
DEBUG - 2026-03-23 20:41:22 --> [REQ_ID=f78da24ec661] [REQUEST][START] HEAD /
DEBUG - 2026-03-23 20:41:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-23 20:41:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-23 20:41:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-23 20:41:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-23 20:41:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-23 20:46:22 --> [REQ_ID=542fa59966af] [REQUEST][START] HEAD /
DEBUG - 2026-03-23 20:46:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-23 20:46:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-23 20:46:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-23 20:46:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-23 20:46:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-23 20:46:29 --> [REQ_ID=7ba47f5c0566] [REQUEST][START] GET /index.php/Management/Services
DEBUG - 2026-03-23 20:46:29 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-23 20:46:29 --> [REQ_ID=7ba47f5c0566] [FILTER_BEFORE] /index.php/Management/Services
DEBUG - 2026-03-23 20:46:29 --> [REQ_ID=7ba47f5c0566] [ROUTE] Controller=\App\Modules\Management\Controllers\ServicesController Method=index
DEBUG - 2026-03-23 20:46:29 --> [REQ_ID=7ba47f5c0566] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Management/Services
DEBUG - 2026-03-23 20:46:29 --> [CSRF] token name=csrf_test_name hash=9d381ac5400bf986040dc128ca57cd92
DEBUG - 2026-03-23 20:46:29 --> [REQ_ID=7ba47f5c0566] [REQUEST][END]
INFO - 2026-03-23 20:46:29 --> [REQ_ID=7ba47f5c0566] [PERF] Execution time=0.025957
DEBUG - 2026-03-23 20:46:30 --> [REQ_ID=b3d03766f3f6] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-23 20:46:30 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-23 20:46:30 --> [REQ_ID=b3d03766f3f6] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-23 20:46:30 --> [REQ_ID=b3d03766f3f6] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-23 20:46:30 --> [REQ_ID=b3d03766f3f6] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-23 20:46:30 --> [CSRF] token name=csrf_test_name hash=db1f62d5658de390753336fc13974c01
DEBUG - 2026-03-23 20:46:30 --> [REQ_ID=f0d99ef8085e] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-23 20:46:30 --> [REQ_ID=f0d99ef8085e] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-23 20:46:30 --> [REQ_ID=b3d03766f3f6] [FILTER_AFTER]
DEBUG - 2026-03-23 20:46:30 --> [REQ_ID=b3d03766f3f6] [LIFECYCLE][END] status=200 duration_ms=48.69 memory_delta=0
INFO - 2026-03-23 20:46:30 --> [REQ_ID=f0d99ef8085e] [PERF] Execution time=0.047188
DEBUG - 2026-03-23 20:46:30 --> [REQ_ID=b3d03766f3f6] [REQUEST][END]
INFO - 2026-03-23 20:46:30 --> [REQ_ID=b3d03766f3f6] [PERF] Execution time=0.063358
DEBUG - 2026-03-23 20:48:25 --> [REQ_ID=e31d899554c8] [REQUEST][START] GET /
DEBUG - 2026-03-23 20:48:25 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-23 20:48:25 --> [REQ_ID=e31d899554c8] [FILTER_BEFORE] /
DEBUG - 2026-03-23 20:48:25 --> [REQ_ID=e31d899554c8] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-23 20:48:25 --> [REQ_ID=e31d899554c8] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-23 20:48:25 --> [CSRF] token name=csrf_test_name hash=ebc1bdd0645d851d7556fb88b6280c02
DEBUG - 2026-03-23 20:48:25 --> [REQ_ID=27860b1b25aa] [INIT] App\Controllers\Home::GET
INFO - 2026-03-23 20:48:25 --> [REQ_ID=27860b1b25aa] [MEMORY][controller-start] 6291456
INFO - 2026-03-23 20:48:25 --> [REQ_ID=27860b1b25aa] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-23 20:48:25 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-23 20:48:26 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-03-23 20:48:26 --> [REQ_ID=27860b1b25aa] [VIEW_RENDER] themes/public/home
INFO - 2026-03-23 20:48:26 --> [REQ_ID=27860b1b25aa] [MEMORY][commonData:start] 10485760
INFO - 2026-03-23 20:48:26 --> themesMemory usage: 10485760
DEBUG - 2026-03-23 20:48:26 --> [MetaService] slug= pageName=Home cacheHit= path=DB
DEBUG - 2026-03-23 20:48:26 --> [REQ_ID=e31d899554c8] [FILTER_AFTER]
DEBUG - 2026-03-23 20:48:26 --> [REQ_ID=e31d899554c8] [LIFECYCLE][END] status=200 duration_ms=641.94 memory_delta=4194304
INFO - 2026-03-23 20:48:26 --> [REQ_ID=27860b1b25aa] [PERF] Execution time=0.640062
DEBUG - 2026-03-23 20:48:26 --> [REQ_ID=e31d899554c8] [REQUEST][END]
INFO - 2026-03-23 20:48:26 --> [REQ_ID=e31d899554c8] [PERF] Execution time=0.681124
DEBUG - 2026-03-23 20:48:27 --> [REQ_ID=bb1c05ea0257] [REQUEST][START] GET /index.php/How-It-Works/Investment-Dashboard
DEBUG - 2026-03-23 20:48:27 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-23 20:48:27 --> [REQ_ID=bb1c05ea0257] [FILTER_BEFORE] /index.php/How-It-Works/Investment-Dashboard
DEBUG - 2026-03-23 20:48:27 --> [REQ_ID=bb1c05ea0257] [ROUTE] Controller=\App\Modules\Blog\Controllers\HowItWorksController Method=show
DEBUG - 2026-03-23 20:48:27 --> [REQ_ID=bb1c05ea0257] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/How-It-Works/Investment-Dashboard
DEBUG - 2026-03-23 20:48:27 --> [CSRF] token name=csrf_test_name hash=ebc1bdd0645d851d7556fb88b6280c02
DEBUG - 2026-03-23 20:48:27 --> [REQ_ID=968f206cada0] [INIT] App\Modules\Blog\Controllers\HowItWorksController::GET
INFO - 2026-03-23 20:48:27 --> [REQ_ID=968f206cada0] [MEMORY][controller-start] 6291456
DEBUG - 2026-03-23 20:48:27 --> [REQ_ID=968f206cada0] [METHOD_ENTRY] show
DEBUG - 2026-03-23 20:48:27 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-23 20:48:27 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-23 20:48:27 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-23 20:48:27 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-23 20:48:27 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-23 20:48:27 --> MyMICoin: guest context detected; skipping user-specific preload.
INFO - 2026-03-23 20:48:27 --> [REQ_ID=968f206cada0] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-23 20:48:27 --> [REQ_ID=bb1c05ea0257] [FILTER_AFTER]
DEBUG - 2026-03-23 20:48:27 --> [REQ_ID=bb1c05ea0257] [LIFECYCLE][END] status=200 duration_ms=541.76 memory_delta=2097152
INFO - 2026-03-23 20:48:27 --> [REQ_ID=968f206cada0] [PERF] Execution time=0.541699
DEBUG - 2026-03-23 20:48:27 --> [REQ_ID=bb1c05ea0257] [REQUEST][END]
INFO - 2026-03-23 20:48:27 --> [REQ_ID=bb1c05ea0257] [PERF] Execution time=0.554793
DEBUG - 2026-03-23 20:51:22 --> [REQ_ID=22de37527478] [REQUEST][START] HEAD /
DEBUG - 2026-03-23 20:51:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-23 20:51:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-23 20:51:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-23 20:51:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-23 20:51:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-23 20:54:48 --> [REQ_ID=0dc90a5d2adc] [REQUEST][START] GET /index.php/Investments/Watchlist
DEBUG - 2026-03-23 20:54:48 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-23 20:54:48 --> [REQ_ID=0dc90a5d2adc] [REQUEST][END]
INFO - 2026-03-23 20:54:48 --> [REQ_ID=0dc90a5d2adc] [PERF] Execution time=0.046313
DEBUG - 2026-03-23 20:56:22 --> [REQ_ID=7d7988aeceef] [REQUEST][START] HEAD /
DEBUG - 2026-03-23 20:56:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-23 20:56:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-23 20:56:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-23 20:56:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-23 20:56:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-23 21:00:01 --> [REQ_ID=9074cc760cab] [REQUEST][START] GET /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-23 21:00:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-23 21:00:01 --> [REQ_ID=9074cc760cab] [FILTER_BEFORE] /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-23 21:00:01 --> [REQ_ID=9074cc760cab] [ROUTE] Controller=\App\Modules\Management\Controllers\ManagementAPIController Method=Run_CRON_Tasks
DEBUG - 2026-03-23 21:00:01 --> [REQ_ID=9074cc760cab] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-23 21:00:01 --> [REQ_ID=9074cc760cab] [REQUEST][END]
INFO - 2026-03-23 21:00:01 --> [REQ_ID=9074cc760cab] [PERF] Execution time=0.105628
DEBUG - 2026-03-23 21:01:22 --> [REQ_ID=a810bcfde299] [REQUEST][START] HEAD /
DEBUG - 2026-03-23 21:01:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-23 21:01:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-23 21:01:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-23 21:01:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-23 21:01:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-23 21:06:22 --> [REQ_ID=c518fee022f7] [REQUEST][START] HEAD /
DEBUG - 2026-03-23 21:06:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-23 21:06:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-23 21:06:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-23 21:06:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-23 21:06:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-23 21:11:22 --> [REQ_ID=c14e03f6af36] [REQUEST][START] HEAD /
DEBUG - 2026-03-23 21:11:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-23 21:11:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-23 21:11:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-23 21:11:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-23 21:11:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-23 21:15:01 --> [REQ_ID=9f2a0c78b219] [REQUEST][START] GET /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-23 21:15:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-23 21:15:01 --> [REQ_ID=9f2a0c78b219] [FILTER_BEFORE] /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-23 21:15:01 --> [REQ_ID=9f2a0c78b219] [ROUTE] Controller=\App\Modules\APIs\Controllers\AlertsAPIController Method=fetchEmailAlerts
DEBUG - 2026-03-23 21:15:01 --> [REQ_ID=9f2a0c78b219] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-23 21:15:01 --> [REQ_ID=9f2a0c78b219] [REQUEST][END]
INFO - 2026-03-23 21:15:01 --> [REQ_ID=9f2a0c78b219] [PERF] Execution time=0.048425
DEBUG - 2026-03-23 21:16:22 --> [REQ_ID=652a9afa1c8f] [REQUEST][START] HEAD /
DEBUG - 2026-03-23 21:16:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-23 21:16:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-23 21:16:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-23 21:16:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-23 21:16:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-23 21:21:22 --> [REQ_ID=83715d859977] [REQUEST][START] HEAD /
DEBUG - 2026-03-23 21:21:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-23 21:21:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-23 21:21:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-23 21:21:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-23 21:21:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-23 21:23:31 --> [REQ_ID=970f9f20344a] [REQUEST][START] GET /index.php/Exchange/Solana
DEBUG - 2026-03-23 21:23:31 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-23 21:23:31 --> [REQ_ID=970f9f20344a] [REQUEST][END]
INFO - 2026-03-23 21:23:31 --> [REQ_ID=970f9f20344a] [PERF] Execution time=0.049001
DEBUG - 2026-03-23 21:24:29 --> [REQ_ID=24444eda6a43] [REQUEST][START] HEAD /
DEBUG - 2026-03-23 21:24:29 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-23 21:24:29 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-23 21:24:30 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-23 21:24:30 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-23 21:24:30 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://mymiwallet.com/
DEBUG - 2026-03-23 21:26:22 --> [REQ_ID=432352fa037f] [REQUEST][START] HEAD /
DEBUG - 2026-03-23 21:26:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-23 21:26:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-23 21:26:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-23 21:26:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-23 21:26:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-23 21:31:22 --> [REQ_ID=e018f4fbb9de] [REQUEST][START] HEAD /
DEBUG - 2026-03-23 21:31:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-23 21:31:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-23 21:31:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-23 21:31:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-23 21:31:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-23 21:36:22 --> [REQ_ID=d4ed4b3b85df] [REQUEST][START] HEAD /
DEBUG - 2026-03-23 21:36:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-23 21:36:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-23 21:36:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-23 21:36:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-23 21:36:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-23 21:41:22 --> [REQ_ID=e60b675ae337] [REQUEST][START] HEAD /
DEBUG - 2026-03-23 21:41:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-23 21:41:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-23 21:41:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-23 21:41:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-23 21:41:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-23 21:42:48 --> [REQ_ID=ea04ac574df9] [REQUEST][START] GET /
DEBUG - 2026-03-23 21:42:48 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-23 21:42:48 --> [REQ_ID=ea04ac574df9] [FILTER_BEFORE] /
DEBUG - 2026-03-23 21:42:48 --> [REQ_ID=ea04ac574df9] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-23 21:42:48 --> [REQ_ID=ea04ac574df9] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-23 21:42:48 --> [CSRF] token name=csrf_test_name hash=7cdd662c58a38f4447c8f42fa15542ae
DEBUG - 2026-03-23 21:42:48 --> [REQ_ID=59d68a40644e] [INIT] App\Controllers\Home::GET
INFO - 2026-03-23 21:42:48 --> [REQ_ID=59d68a40644e] [MEMORY][controller-start] 6291456
INFO - 2026-03-23 21:42:48 --> [REQ_ID=59d68a40644e] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-23 21:42:48 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-23 21:42:48 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-03-23 21:42:48 --> [REQ_ID=59d68a40644e] [VIEW_RENDER] themes/public/home
INFO - 2026-03-23 21:42:48 --> [REQ_ID=59d68a40644e] [MEMORY][commonData:start] 10485760
INFO - 2026-03-23 21:42:49 --> themesMemory usage: 10485760
DEBUG - 2026-03-23 21:42:49 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-23 21:42:49 --> [REQ_ID=ea04ac574df9] [FILTER_AFTER]
DEBUG - 2026-03-23 21:42:49 --> [REQ_ID=ea04ac574df9] [LIFECYCLE][END] status=200 duration_ms=669.27 memory_delta=4194304
INFO - 2026-03-23 21:42:49 --> [REQ_ID=59d68a40644e] [PERF] Execution time=0.667287
DEBUG - 2026-03-23 21:42:49 --> [REQ_ID=ea04ac574df9] [REQUEST][END]
INFO - 2026-03-23 21:42:49 --> [REQ_ID=ea04ac574df9] [PERF] Execution time=0.708614
DEBUG - 2026-03-23 21:42:49 --> [REQ_ID=29eb71c30ee3] [REQUEST][START] GET /index.php/How-It-Works/Investment-Dashboard
DEBUG - 2026-03-23 21:42:49 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-23 21:42:49 --> [REQ_ID=29eb71c30ee3] [FILTER_BEFORE] /index.php/How-It-Works/Investment-Dashboard
DEBUG - 2026-03-23 21:42:49 --> [REQ_ID=29eb71c30ee3] [ROUTE] Controller=\App\Modules\Blog\Controllers\HowItWorksController Method=show
DEBUG - 2026-03-23 21:42:49 --> [REQ_ID=29eb71c30ee3] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/How-It-Works/Investment-Dashboard
DEBUG - 2026-03-23 21:42:49 --> [CSRF] token name=csrf_test_name hash=7cdd662c58a38f4447c8f42fa15542ae
DEBUG - 2026-03-23 21:42:49 --> [REQ_ID=c5d14fb0a46d] [INIT] App\Modules\Blog\Controllers\HowItWorksController::GET
INFO - 2026-03-23 21:42:49 --> [REQ_ID=c5d14fb0a46d] [MEMORY][controller-start] 6291456
DEBUG - 2026-03-23 21:42:49 --> [REQ_ID=c5d14fb0a46d] [METHOD_ENTRY] show
DEBUG - 2026-03-23 21:42:49 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-23 21:42:49 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-23 21:42:49 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-23 21:42:49 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-23 21:42:49 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-23 21:42:49 --> MyMICoin: guest context detected; skipping user-specific preload.
INFO - 2026-03-23 21:42:49 --> [REQ_ID=c5d14fb0a46d] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-23 21:42:50 --> [REQ_ID=29eb71c30ee3] [FILTER_AFTER]
DEBUG - 2026-03-23 21:42:50 --> [REQ_ID=29eb71c30ee3] [LIFECYCLE][END] status=200 duration_ms=530.81 memory_delta=2097152
INFO - 2026-03-23 21:42:50 --> [REQ_ID=c5d14fb0a46d] [PERF] Execution time=0.530780
DEBUG - 2026-03-23 21:42:50 --> [REQ_ID=29eb71c30ee3] [REQUEST][END]
INFO - 2026-03-23 21:42:50 --> [REQ_ID=29eb71c30ee3] [PERF] Execution time=0.544162
DEBUG - 2026-03-23 21:46:22 --> [REQ_ID=c555bc7b6967] [REQUEST][START] HEAD /
DEBUG - 2026-03-23 21:46:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-23 21:46:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-23 21:46:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-23 21:46:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-23 21:46:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-23 21:51:22 --> [REQ_ID=f1f3ca324859] [REQUEST][START] HEAD /
DEBUG - 2026-03-23 21:51:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-23 21:51:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-23 21:51:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-23 21:51:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-23 21:51:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-23 21:56:22 --> [REQ_ID=0b6b5b0d1b40] [REQUEST][START] HEAD /
DEBUG - 2026-03-23 21:56:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-23 21:56:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-23 21:56:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-23 21:56:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-23 21:56:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-23 22:00:02 --> [REQ_ID=5dfea5dfa121] [REQUEST][START] GET /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-23 22:00:02 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-23 22:00:02 --> [REQ_ID=5dfea5dfa121] [FILTER_BEFORE] /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-23 22:00:02 --> [REQ_ID=5dfea5dfa121] [ROUTE] Controller=\App\Modules\Management\Controllers\ManagementAPIController Method=Run_CRON_Tasks
DEBUG - 2026-03-23 22:00:02 --> [REQ_ID=5dfea5dfa121] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-23 22:00:02 --> [REQ_ID=5dfea5dfa121] [REQUEST][END]
INFO - 2026-03-23 22:00:02 --> [REQ_ID=5dfea5dfa121] [PERF] Execution time=0.053848
DEBUG - 2026-03-23 22:00:21 --> [REQ_ID=3559e83906e8] [REQUEST][START] GET /index.php/Blog/Earnings/Oct-14-2024
DEBUG - 2026-03-23 22:00:21 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-23 22:00:21 --> [REQ_ID=3559e83906e8] [REQUEST][END]
INFO - 2026-03-23 22:00:21 --> [REQ_ID=3559e83906e8] [PERF] Execution time=0.017219
DEBUG - 2026-03-23 22:01:22 --> [REQ_ID=2bb10abca263] [REQUEST][START] HEAD /
DEBUG - 2026-03-23 22:01:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-23 22:01:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-23 22:01:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-23 22:01:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-23 22:01:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-23 22:06:22 --> [REQ_ID=f1cbc42acffb] [REQUEST][START] HEAD /
DEBUG - 2026-03-23 22:06:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-23 22:06:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-23 22:06:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-23 22:06:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-23 22:06:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-23 22:11:12 --> [REQ_ID=d319064a9da4] [REQUEST][START] GET /
DEBUG - 2026-03-23 22:11:12 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-23 22:11:12 --> [REQ_ID=d319064a9da4] [FILTER_BEFORE] /
DEBUG - 2026-03-23 22:11:12 --> [REQ_ID=d319064a9da4] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-23 22:11:12 --> [REQ_ID=d319064a9da4] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-23 22:11:12 --> [CSRF] token name=csrf_test_name hash=3ba5f1606e4eb32dbe02c1b04d0c3c59
DEBUG - 2026-03-23 22:11:12 --> [REQ_ID=f9bd5bdaf860] [INIT] App\Controllers\Home::GET
INFO - 2026-03-23 22:11:12 --> [REQ_ID=f9bd5bdaf860] [MEMORY][controller-start] 6291456
INFO - 2026-03-23 22:11:12 --> [REQ_ID=f9bd5bdaf860] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-23 22:11:12 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-23 22:11:13 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-03-23 22:11:13 --> [REQ_ID=f9bd5bdaf860] [VIEW_RENDER] themes/public/home
INFO - 2026-03-23 22:11:13 --> [REQ_ID=f9bd5bdaf860] [MEMORY][commonData:start] 10485760
INFO - 2026-03-23 22:11:13 --> themesMemory usage: 10485760
DEBUG - 2026-03-23 22:11:13 --> [MetaService] slug= pageName=Home cacheHit= path=DB
DEBUG - 2026-03-23 22:11:13 --> [REQ_ID=d319064a9da4] [FILTER_AFTER]
DEBUG - 2026-03-23 22:11:13 --> [REQ_ID=d319064a9da4] [LIFECYCLE][END] status=200 duration_ms=728.50 memory_delta=4194304
INFO - 2026-03-23 22:11:13 --> [REQ_ID=f9bd5bdaf860] [PERF] Execution time=0.726520
DEBUG - 2026-03-23 22:11:13 --> [REQ_ID=d319064a9da4] [REQUEST][END]
INFO - 2026-03-23 22:11:13 --> [REQ_ID=d319064a9da4] [PERF] Execution time=0.767653
DEBUG - 2026-03-23 22:11:22 --> [REQ_ID=fbb3c2b3d1c9] [REQUEST][START] HEAD /
DEBUG - 2026-03-23 22:11:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-23 22:11:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-23 22:11:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-23 22:11:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-23 22:11:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-23 22:15:02 --> [REQ_ID=b7a6d8008290] [REQUEST][START] GET /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-23 22:15:02 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-23 22:15:02 --> [REQ_ID=b7a6d8008290] [FILTER_BEFORE] /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-23 22:15:02 --> [REQ_ID=b7a6d8008290] [ROUTE] Controller=\App\Modules\APIs\Controllers\AlertsAPIController Method=fetchEmailAlerts
DEBUG - 2026-03-23 22:15:02 --> [REQ_ID=b7a6d8008290] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-23 22:15:02 --> [REQ_ID=b7a6d8008290] [REQUEST][END]
INFO - 2026-03-23 22:15:02 --> [REQ_ID=b7a6d8008290] [PERF] Execution time=0.061713
DEBUG - 2026-03-23 22:16:22 --> [REQ_ID=1404c2875bc4] [REQUEST][START] HEAD /
DEBUG - 2026-03-23 22:16:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-23 22:16:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-23 22:16:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-23 22:16:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-23 22:16:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-23 22:21:22 --> [REQ_ID=527c669101c5] [REQUEST][START] HEAD /
DEBUG - 2026-03-23 22:21:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-23 22:21:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-23 22:21:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-23 22:21:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-23 22:21:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-23 22:26:12 --> [REQ_ID=15941c142545] [REQUEST][START] GET /
DEBUG - 2026-03-23 22:26:12 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-23 22:26:12 --> [REQ_ID=15941c142545] [FILTER_BEFORE] /
DEBUG - 2026-03-23 22:26:12 --> [REQ_ID=15941c142545] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-23 22:26:12 --> [REQ_ID=15941c142545] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-23 22:26:12 --> [CSRF] token name=csrf_test_name hash=ab3bb569be0c4d90669ced14c5fbc4d2
DEBUG - 2026-03-23 22:26:12 --> [REQ_ID=ed973043306e] [INIT] App\Controllers\Home::GET
INFO - 2026-03-23 22:26:12 --> [REQ_ID=ed973043306e] [MEMORY][controller-start] 6291456
INFO - 2026-03-23 22:26:12 --> [REQ_ID=ed973043306e] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-23 22:26:12 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-23 22:26:13 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
DEBUG - 2026-03-23 22:26:13 --> [REQ_ID=ed973043306e] [VIEW_RENDER] themes/public/home
INFO - 2026-03-23 22:26:13 --> [REQ_ID=ed973043306e] [MEMORY][commonData:start] 10485760
INFO - 2026-03-23 22:26:13 --> themesMemory usage: 10485760
DEBUG - 2026-03-23 22:26:13 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-23 22:26:13 --> [REQ_ID=15941c142545] [FILTER_AFTER]
DEBUG - 2026-03-23 22:26:13 --> [REQ_ID=15941c142545] [LIFECYCLE][END] status=200 duration_ms=754.29 memory_delta=4194304
INFO - 2026-03-23 22:26:13 --> [REQ_ID=ed973043306e] [PERF] Execution time=0.752370
DEBUG - 2026-03-23 22:26:13 --> [REQ_ID=15941c142545] [REQUEST][END]
INFO - 2026-03-23 22:26:13 --> [REQ_ID=15941c142545] [PERF] Execution time=0.793991
DEBUG - 2026-03-23 22:26:22 --> [REQ_ID=41fb46986598] [REQUEST][START] HEAD /
DEBUG - 2026-03-23 22:26:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-23 22:26:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-23 22:26:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-23 22:26:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-23 22:26:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-23 22:31:22 --> [REQ_ID=3a555c045d76] [REQUEST][START] HEAD /
DEBUG - 2026-03-23 22:31:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-23 22:31:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-23 22:31:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-23 22:31:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-23 22:31:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-23 22:36:22 --> [REQ_ID=645d1022b407] [REQUEST][START] HEAD /
DEBUG - 2026-03-23 22:36:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-23 22:36:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-23 22:36:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-23 22:36:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-23 22:36:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-23 22:41:22 --> [REQ_ID=efabb3659f72] [REQUEST][START] HEAD /
DEBUG - 2026-03-23 22:41:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-23 22:41:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-23 22:41:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-23 22:41:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-23 22:41:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-23 22:46:22 --> [REQ_ID=1a9b61cdfae3] [REQUEST][START] HEAD /
DEBUG - 2026-03-23 22:46:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-23 22:46:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-23 22:46:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-23 22:46:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-23 22:46:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-23 22:51:22 --> [REQ_ID=a21f2b9187d6] [REQUEST][START] HEAD /
DEBUG - 2026-03-23 22:51:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-23 22:51:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-23 22:51:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-23 22:51:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-23 22:51:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-23 22:56:22 --> [REQ_ID=a46d47efa943] [REQUEST][START] HEAD /
DEBUG - 2026-03-23 22:56:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-23 22:56:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-23 22:56:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-23 22:56:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-23 22:56:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-23 23:00:01 --> [REQ_ID=e77c01a828a4] [REQUEST][START] GET /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-23 23:00:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-23 23:00:01 --> [REQ_ID=e77c01a828a4] [FILTER_BEFORE] /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-23 23:00:01 --> [REQ_ID=e77c01a828a4] [ROUTE] Controller=\App\Modules\Management\Controllers\ManagementAPIController Method=Run_CRON_Tasks
DEBUG - 2026-03-23 23:00:01 --> [REQ_ID=e77c01a828a4] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-23 23:00:01 --> [REQ_ID=e77c01a828a4] [REQUEST][END]
INFO - 2026-03-23 23:00:01 --> [REQ_ID=e77c01a828a4] [PERF] Execution time=0.044585
DEBUG - 2026-03-23 23:01:22 --> [REQ_ID=47c6c21f3732] [REQUEST][START] HEAD /
DEBUG - 2026-03-23 23:01:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-23 23:01:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-23 23:01:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-23 23:01:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-23 23:01:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-23 23:06:22 --> [REQ_ID=404dd0d31b21] [REQUEST][START] HEAD /
DEBUG - 2026-03-23 23:06:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-23 23:06:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-23 23:06:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-23 23:06:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-23 23:06:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-23 23:07:15 --> [REQ_ID=f2fdc415bcca] [REQUEST][START] GET /index.php/Knowledgebase
DEBUG - 2026-03-23 23:07:15 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-23 23:07:15 --> ErrorException: Access level to App\Modules\User\Controllers\KnowledgebaseController::respondWithRendered() must be protected (as in class App\Controllers\BaseController) or weaker
[Method: GET, Route: Knowledgebase]
in APPPATH/Modules/User/Controllers/KnowledgebaseController.php on line 535.
 1 [internal function]: CodeIgniter\Debug\Exceptions->shutdownHandler()
CRITICAL - 2026-03-23 23:07:15 --> [EXCEPTION] Access level to App\Modules\User\Controllers\KnowledgebaseController::respondWithRendered() must be protected (as in class App\Controllers\BaseController) or weaker File=/home/mymiteam/mymiwallet/site/current/app/Modules/User/Controllers/KnowledgebaseController.php Line=535
DEBUG - 2026-03-23 23:10:06 --> [REQ_ID=1d4f57954d3d] [REQUEST][START] GET /index.php/Dashboard
DEBUG - 2026-03-23 23:10:06 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-23 23:10:06 --> [REQ_ID=1d4f57954d3d] [FILTER_BEFORE] /index.php/Dashboard
DEBUG - 2026-03-23 23:10:06 --> [REQ_ID=1d4f57954d3d] [ROUTE] Controller=\App\Modules\User\Controllers\DashboardController Method=index
DEBUG - 2026-03-23 23:10:06 --> [REQ_ID=1d4f57954d3d] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Dashboard
DEBUG - 2026-03-23 23:10:06 --> [CSRF] token name=csrf_test_name hash=0133c7a679eaf60a349e2b83ba5ff9c9
DEBUG - 2026-03-23 23:10:06 --> [REQ_ID=1d4f57954d3d] [REQUEST][END]
INFO - 2026-03-23 23:10:06 --> [REQ_ID=1d4f57954d3d] [PERF] Execution time=0.217165
DEBUG - 2026-03-23 23:11:22 --> [REQ_ID=11e9213045d0] [REQUEST][START] HEAD /
DEBUG - 2026-03-23 23:11:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-23 23:11:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-23 23:11:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-23 23:11:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-23 23:11:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-23 23:15:02 --> [REQ_ID=b2f982eea241] [REQUEST][START] GET /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-23 23:15:02 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-23 23:15:02 --> [REQ_ID=b2f982eea241] [FILTER_BEFORE] /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-23 23:15:02 --> [REQ_ID=b2f982eea241] [ROUTE] Controller=\App\Modules\APIs\Controllers\AlertsAPIController Method=fetchEmailAlerts
DEBUG - 2026-03-23 23:15:02 --> [REQ_ID=b2f982eea241] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-23 23:15:02 --> [REQ_ID=b2f982eea241] [REQUEST][END]
INFO - 2026-03-23 23:15:02 --> [REQ_ID=b2f982eea241] [PERF] Execution time=0.047247
DEBUG - 2026-03-23 23:16:22 --> [REQ_ID=5e78d7214505] [REQUEST][START] HEAD /
DEBUG - 2026-03-23 23:16:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-23 23:16:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-23 23:16:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-23 23:16:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-23 23:16:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-23 23:21:22 --> [REQ_ID=42310b4a9a77] [REQUEST][START] HEAD /
DEBUG - 2026-03-23 23:21:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-23 23:21:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-23 23:21:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-23 23:21:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-23 23:21:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-23 23:23:54 --> [REQ_ID=cd0fba79eb25] [REQUEST][START] GET /
DEBUG - 2026-03-23 23:23:54 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-23 23:23:54 --> [REQ_ID=cd0fba79eb25] [FILTER_BEFORE] /
DEBUG - 2026-03-23 23:23:54 --> [REQ_ID=cd0fba79eb25] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-23 23:23:54 --> [REQ_ID=cd0fba79eb25] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-23 23:23:54 --> [CSRF] token name=csrf_test_name hash=7f6db0ebacd86769eb695735fd3972e8
DEBUG - 2026-03-23 23:23:54 --> [REQ_ID=e9882b852e87] [INIT] App\Controllers\Home::GET
INFO - 2026-03-23 23:23:54 --> [REQ_ID=e9882b852e87] [MEMORY][controller-start] 6291456
INFO - 2026-03-23 23:23:55 --> [REQ_ID=e9882b852e87] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-23 23:23:55 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-23 23:23:55 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-03-23 23:23:55 --> [REQ_ID=e9882b852e87] [VIEW_RENDER] themes/public/home
INFO - 2026-03-23 23:23:55 --> [REQ_ID=e9882b852e87] [MEMORY][commonData:start] 10485760
INFO - 2026-03-23 23:23:55 --> themesMemory usage: 10485760
DEBUG - 2026-03-23 23:23:55 --> [MetaService] slug= pageName=Home cacheHit= path=DB
DEBUG - 2026-03-23 23:23:55 --> [REQ_ID=cd0fba79eb25] [FILTER_AFTER]
DEBUG - 2026-03-23 23:23:55 --> [REQ_ID=cd0fba79eb25] [LIFECYCLE][END] status=200 duration_ms=829.51 memory_delta=4194304
INFO - 2026-03-23 23:23:55 --> [REQ_ID=e9882b852e87] [PERF] Execution time=0.827555
DEBUG - 2026-03-23 23:23:55 --> [REQ_ID=cd0fba79eb25] [REQUEST][END]
INFO - 2026-03-23 23:23:55 --> [REQ_ID=cd0fba79eb25] [PERF] Execution time=0.869268
DEBUG - 2026-03-23 23:26:22 --> [REQ_ID=59f88125fc1d] [REQUEST][START] HEAD /
DEBUG - 2026-03-23 23:26:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-23 23:26:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-23 23:26:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-23 23:26:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-23 23:26:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-23 23:31:22 --> [REQ_ID=fa96c3254e55] [REQUEST][START] HEAD /
DEBUG - 2026-03-23 23:31:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-23 23:31:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-23 23:31:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-23 23:31:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-23 23:31:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-23 23:36:22 --> [REQ_ID=4436fd02f799] [REQUEST][START] HEAD /
DEBUG - 2026-03-23 23:36:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-23 23:36:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-23 23:36:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-23 23:36:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-23 23:36:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-23 23:38:26 --> [REQ_ID=3da493bf1172] [REQUEST][START] GET /
DEBUG - 2026-03-23 23:38:26 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-23 23:38:26 --> [REQ_ID=3da493bf1172] [FILTER_BEFORE] /
DEBUG - 2026-03-23 23:38:26 --> [REQ_ID=3da493bf1172] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-23 23:38:26 --> [REQ_ID=3da493bf1172] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-23 23:38:26 --> [CSRF] token name=csrf_test_name hash=192f195d352ea887695a26043de87a45
DEBUG - 2026-03-23 23:38:26 --> [REQ_ID=df190dee8426] [INIT] App\Controllers\Home::GET
INFO - 2026-03-23 23:38:26 --> [REQ_ID=df190dee8426] [MEMORY][controller-start] 6291456
INFO - 2026-03-23 23:38:26 --> [REQ_ID=df190dee8426] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-23 23:38:26 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-23 23:38:27 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
DEBUG - 2026-03-23 23:38:27 --> [REQ_ID=df190dee8426] [VIEW_RENDER] themes/public/home
INFO - 2026-03-23 23:38:27 --> [REQ_ID=df190dee8426] [MEMORY][commonData:start] 10485760
INFO - 2026-03-23 23:38:27 --> themesMemory usage: 10485760
DEBUG - 2026-03-23 23:38:27 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-23 23:38:27 --> [REQ_ID=3da493bf1172] [FILTER_AFTER]
DEBUG - 2026-03-23 23:38:27 --> [REQ_ID=3da493bf1172] [LIFECYCLE][END] status=200 duration_ms=782.26 memory_delta=4194304
INFO - 2026-03-23 23:38:27 --> [REQ_ID=df190dee8426] [PERF] Execution time=0.780329
DEBUG - 2026-03-23 23:38:27 --> [REQ_ID=3da493bf1172] [REQUEST][END]
INFO - 2026-03-23 23:38:27 --> [REQ_ID=3da493bf1172] [PERF] Execution time=0.820879
DEBUG - 2026-03-23 23:41:22 --> [REQ_ID=ad4655002b24] [REQUEST][START] HEAD /
DEBUG - 2026-03-23 23:41:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-23 23:41:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-23 23:41:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-23 23:41:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-23 23:41:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-23 23:42:50 --> [REQ_ID=363c6d96ea9a] [REQUEST][START] GET /
DEBUG - 2026-03-23 23:42:50 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-23 23:42:50 --> [REQ_ID=363c6d96ea9a] [FILTER_BEFORE] /
DEBUG - 2026-03-23 23:42:50 --> [REQ_ID=363c6d96ea9a] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-23 23:42:50 --> [REQ_ID=363c6d96ea9a] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-23 23:42:50 --> [CSRF] token name=csrf_test_name hash=c929691552c68d010e070af82fda1a28
DEBUG - 2026-03-23 23:42:50 --> [REQ_ID=a50f7ab6f4a6] [INIT] App\Controllers\Home::GET
INFO - 2026-03-23 23:42:50 --> [REQ_ID=a50f7ab6f4a6] [MEMORY][controller-start] 6291456
INFO - 2026-03-23 23:42:50 --> [REQ_ID=a50f7ab6f4a6] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-23 23:42:50 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-23 23:42:51 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-03-23 23:42:51 --> [REQ_ID=a50f7ab6f4a6] [VIEW_RENDER] themes/public/home
INFO - 2026-03-23 23:42:51 --> [REQ_ID=a50f7ab6f4a6] [MEMORY][commonData:start] 10485760
INFO - 2026-03-23 23:42:51 --> themesMemory usage: 10485760
DEBUG - 2026-03-23 23:42:51 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-23 23:42:51 --> [REQ_ID=363c6d96ea9a] [FILTER_AFTER]
DEBUG - 2026-03-23 23:42:51 --> [REQ_ID=363c6d96ea9a] [LIFECYCLE][END] status=200 duration_ms=709.97 memory_delta=4194304
INFO - 2026-03-23 23:42:51 --> [REQ_ID=a50f7ab6f4a6] [PERF] Execution time=0.708089
DEBUG - 2026-03-23 23:42:51 --> [REQ_ID=363c6d96ea9a] [REQUEST][END]
INFO - 2026-03-23 23:42:51 --> [REQ_ID=363c6d96ea9a] [PERF] Execution time=0.748204
DEBUG - 2026-03-23 23:46:22 --> [REQ_ID=570d25b60a40] [REQUEST][START] HEAD /
DEBUG - 2026-03-23 23:46:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-23 23:46:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-23 23:46:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-23 23:46:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-23 23:46:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-23 23:51:22 --> [REQ_ID=6ae96d0cb15e] [REQUEST][START] HEAD /
DEBUG - 2026-03-23 23:51:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-23 23:51:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-23 23:51:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-23 23:51:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-23 23:51:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-23 23:56:22 --> [REQ_ID=5cea166e44a7] [REQUEST][START] HEAD /
DEBUG - 2026-03-23 23:56:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-23 23:56:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-23 23:56:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-23 23:56:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-23 23:56:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-23 23:57:07 --> [REQ_ID=d499d7cc08fd] [REQUEST][START] GET /index.php/Exchange/Solana
DEBUG - 2026-03-23 23:57:07 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-23 23:57:07 --> [REQ_ID=d499d7cc08fd] [FILTER_BEFORE] /index.php/Exchange/Solana
DEBUG - 2026-03-23 23:57:07 --> [REQ_ID=d499d7cc08fd] [ROUTE] Controller=\App\Modules\Exchange\Controllers\SolanaController Method=index
DEBUG - 2026-03-23 23:57:07 --> [REQ_ID=d499d7cc08fd] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Exchange/Solana
DEBUG - 2026-03-23 23:57:07 --> [CSRF] token name=csrf_test_name hash=c566cd50a3f2b2e8146b224a7b207398
DEBUG - 2026-03-23 23:57:07 --> [REQ_ID=d499d7cc08fd] [REQUEST][END]
INFO - 2026-03-23 23:57:07 --> [REQ_ID=d499d7cc08fd] [PERF] Execution time=0.033412
DEBUG - 2026-03-23 23:57:08 --> [REQ_ID=5b89056a8a7a] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-23 23:57:08 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-23 23:57:08 --> [REQ_ID=5b89056a8a7a] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-23 23:57:08 --> [REQ_ID=5b89056a8a7a] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-23 23:57:08 --> [REQ_ID=5b89056a8a7a] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-23 23:57:08 --> [CSRF] token name=csrf_test_name hash=ab1360563f850e60c7d9c3d3a1f02571
DEBUG - 2026-03-23 23:57:08 --> [REQ_ID=193260973f29] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-23 23:57:08 --> [REQ_ID=193260973f29] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-23 23:57:08 --> [REQ_ID=5b89056a8a7a] [FILTER_AFTER]
DEBUG - 2026-03-23 23:57:08 --> [REQ_ID=5b89056a8a7a] [LIFECYCLE][END] status=200 duration_ms=157.22 memory_delta=0
INFO - 2026-03-23 23:57:08 --> [REQ_ID=193260973f29] [PERF] Execution time=0.156650
DEBUG - 2026-03-23 23:57:08 --> [REQ_ID=5b89056a8a7a] [REQUEST][END]
INFO - 2026-03-23 23:57:08 --> [REQ_ID=5b89056a8a7a] [PERF] Execution time=0.175297
DEBUG - 2026-03-23 23:59:22 --> [REQ_ID=bf6984dffb6b] [REQUEST][START] GET /
DEBUG - 2026-03-23 23:59:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-23 23:59:22 --> [REQ_ID=bf6984dffb6b] [FILTER_BEFORE] /
DEBUG - 2026-03-23 23:59:22 --> [REQ_ID=bf6984dffb6b] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-23 23:59:22 --> [REQ_ID=bf6984dffb6b] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-23 23:59:22 --> [CSRF] token name=csrf_test_name hash=bdf1a2e36f13e38398bfbe10d369a6c3
DEBUG - 2026-03-23 23:59:22 --> [REQ_ID=52586bfae598] [INIT] App\Controllers\Home::GET
INFO - 2026-03-23 23:59:22 --> [REQ_ID=52586bfae598] [MEMORY][controller-start] 6291456
INFO - 2026-03-23 23:59:22 --> [REQ_ID=52586bfae598] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-23 23:59:22 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-23 23:59:23 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-03-23 23:59:23 --> [REQ_ID=52586bfae598] [VIEW_RENDER] themes/public/home
INFO - 2026-03-23 23:59:23 --> [REQ_ID=52586bfae598] [MEMORY][commonData:start] 10485760
INFO - 2026-03-23 23:59:23 --> themesMemory usage: 10485760
DEBUG - 2026-03-23 23:59:23 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-23 23:59:23 --> [REQ_ID=bf6984dffb6b] [FILTER_AFTER]
DEBUG - 2026-03-23 23:59:23 --> [REQ_ID=bf6984dffb6b] [LIFECYCLE][END] status=200 duration_ms=751.71 memory_delta=4194304
INFO - 2026-03-23 23:59:23 --> [REQ_ID=52586bfae598] [PERF] Execution time=0.749809
DEBUG - 2026-03-23 23:59:23 --> [REQ_ID=bf6984dffb6b] [REQUEST][END]
INFO - 2026-03-23 23:59:23 --> [REQ_ID=bf6984dffb6b] [PERF] Execution time=0.789537
