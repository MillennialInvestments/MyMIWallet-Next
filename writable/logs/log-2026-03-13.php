<?php defined('SYSTEMPATH') || exit('No direct script access allowed'); ?>

DEBUG - 2026-03-13 00:00:01 --> [REQ_ID=065da31e376d] [REQUEST][START] GET /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-13 00:00:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-13 00:00:01 --> [REQ_ID=065da31e376d] [FILTER_BEFORE] /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-13 00:00:01 --> [REQ_ID=065da31e376d] [ROUTE] Controller=\App\Modules\Management\Controllers\ManagementAPIController Method=Run_CRON_Tasks
DEBUG - 2026-03-13 00:00:01 --> [REQ_ID=065da31e376d] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-13 00:00:01 --> [REQ_ID=065da31e376d] [REQUEST][END]
INFO - 2026-03-13 00:00:01 --> [REQ_ID=065da31e376d] [PERF] Execution time=0.046575
DEBUG - 2026-03-13 00:01:22 --> [REQ_ID=cbfd7a57291f] [REQUEST][START] HEAD /
DEBUG - 2026-03-13 00:01:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-13 00:01:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-13 00:01:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-13 00:01:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-13 00:01:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-13 00:06:22 --> [REQ_ID=ede0f2dca30d] [REQUEST][START] HEAD /
DEBUG - 2026-03-13 00:06:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-13 00:06:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-13 00:06:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-13 00:06:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-13 00:06:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-13 00:11:22 --> [REQ_ID=0589f9c992f4] [REQUEST][START] HEAD /
DEBUG - 2026-03-13 00:11:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-13 00:11:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-13 00:11:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-13 00:11:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-13 00:11:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-13 00:15:01 --> [REQ_ID=a6ee49c49dbd] [REQUEST][START] GET /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-13 00:15:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-13 00:15:01 --> [REQ_ID=a6ee49c49dbd] [FILTER_BEFORE] /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-13 00:15:01 --> [REQ_ID=a6ee49c49dbd] [ROUTE] Controller=\App\Modules\APIs\Controllers\AlertsAPIController Method=fetchEmailAlerts
DEBUG - 2026-03-13 00:15:01 --> [REQ_ID=a6ee49c49dbd] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-13 00:15:01 --> [REQ_ID=a6ee49c49dbd] [REQUEST][END]
INFO - 2026-03-13 00:15:01 --> [REQ_ID=a6ee49c49dbd] [PERF] Execution time=0.045981
DEBUG - 2026-03-13 00:16:22 --> [REQ_ID=e4b87848de5e] [REQUEST][START] HEAD /
DEBUG - 2026-03-13 00:16:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-13 00:16:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-13 00:16:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-13 00:16:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-13 00:16:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-13 00:21:22 --> [REQ_ID=4571d8fd30c5] [REQUEST][START] HEAD /
DEBUG - 2026-03-13 00:21:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-13 00:21:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-13 00:21:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-13 00:21:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-13 00:21:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-13 00:24:08 --> [REQ_ID=7d00516f76ac] [REQUEST][START] GET /
DEBUG - 2026-03-13 00:24:08 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-13 00:24:08 --> [REQ_ID=7d00516f76ac] [FILTER_BEFORE] /
DEBUG - 2026-03-13 00:24:08 --> [REQ_ID=7d00516f76ac] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-13 00:24:08 --> [REQ_ID=7d00516f76ac] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-13 00:24:08 --> [CSRF] token name=csrf_test_name hash=7e8c020d06dcae1ff7f56e7b50ea0332
DEBUG - 2026-03-13 00:24:08 --> [REQ_ID=f7440949abc5] [INIT] App\Controllers\Home::GET
INFO - 2026-03-13 00:24:08 --> [REQ_ID=f7440949abc5] [MEMORY][controller-start] 6291456
INFO - 2026-03-13 00:24:09 --> [REQ_ID=f7440949abc5] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-13 00:24:09 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-13 00:24:09 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-03-13 00:24:09 --> [REQ_ID=f7440949abc5] [VIEW_RENDER] themes/public/home
INFO - 2026-03-13 00:24:09 --> [REQ_ID=f7440949abc5] [MEMORY][commonData:start] 10485760
INFO - 2026-03-13 00:24:09 --> themesMemory usage: 10485760
DEBUG - 2026-03-13 00:24:09 --> [MetaService] slug= pageName=Home cacheHit= path=DB
DEBUG - 2026-03-13 00:24:09 --> [REQ_ID=7d00516f76ac] [FILTER_AFTER]
DEBUG - 2026-03-13 00:24:09 --> [REQ_ID=7d00516f76ac] [LIFECYCLE][END] status=200 duration_ms=828.94 memory_delta=4194304
INFO - 2026-03-13 00:24:09 --> [REQ_ID=f7440949abc5] [PERF] Execution time=0.826707
DEBUG - 2026-03-13 00:24:09 --> [REQ_ID=7d00516f76ac] [REQUEST][END]
INFO - 2026-03-13 00:24:09 --> [REQ_ID=7d00516f76ac] [PERF] Execution time=0.870043
DEBUG - 2026-03-13 00:26:22 --> [REQ_ID=002f75c12012] [REQUEST][START] HEAD /
DEBUG - 2026-03-13 00:26:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-13 00:26:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-13 00:26:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-13 00:26:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-13 00:26:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-13 00:31:22 --> [REQ_ID=8ae33140b2a3] [REQUEST][START] HEAD /
DEBUG - 2026-03-13 00:31:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-13 00:31:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-13 00:31:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-13 00:31:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-13 00:31:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-13 00:36:22 --> [REQ_ID=1589bfa6146a] [REQUEST][START] HEAD /
DEBUG - 2026-03-13 00:36:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-13 00:36:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-13 00:36:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-13 00:36:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-13 00:36:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-13 00:41:22 --> [REQ_ID=0717366c6b47] [REQUEST][START] HEAD /
DEBUG - 2026-03-13 00:41:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-13 00:41:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-13 00:41:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-13 00:41:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-13 00:41:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-13 00:46:22 --> [REQ_ID=a4ad56bc2097] [REQUEST][START] HEAD /
DEBUG - 2026-03-13 00:46:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-13 00:46:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-13 00:46:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-13 00:46:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-13 00:46:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-13 00:48:22 --> [REQ_ID=3ea6533a62a5] [REQUEST][START] GET /
DEBUG - 2026-03-13 00:48:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-13 00:48:22 --> [REQ_ID=3ea6533a62a5] [FILTER_BEFORE] /
DEBUG - 2026-03-13 00:48:22 --> [REQ_ID=3ea6533a62a5] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-13 00:48:22 --> [REQ_ID=3ea6533a62a5] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-13 00:48:22 --> [CSRF] token name=csrf_test_name hash=8fb9078e64443c11adb62a4cd7d5d099
DEBUG - 2026-03-13 00:48:22 --> [REQ_ID=b182836c1d99] [INIT] App\Controllers\Home::GET
INFO - 2026-03-13 00:48:22 --> [REQ_ID=b182836c1d99] [MEMORY][controller-start] 6291456
INFO - 2026-03-13 00:48:23 --> [REQ_ID=b182836c1d99] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-13 00:48:23 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-13 00:48:23 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-03-13 00:48:23 --> [REQ_ID=b182836c1d99] [VIEW_RENDER] themes/public/home
INFO - 2026-03-13 00:48:23 --> [REQ_ID=b182836c1d99] [MEMORY][commonData:start] 10485760
INFO - 2026-03-13 00:48:23 --> themesMemory usage: 10485760
DEBUG - 2026-03-13 00:48:23 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-13 00:48:23 --> [REQ_ID=3ea6533a62a5] [FILTER_AFTER]
DEBUG - 2026-03-13 00:48:23 --> [REQ_ID=3ea6533a62a5] [LIFECYCLE][END] status=200 duration_ms=809.35 memory_delta=4194304
INFO - 2026-03-13 00:48:23 --> [REQ_ID=b182836c1d99] [PERF] Execution time=0.807325
DEBUG - 2026-03-13 00:48:23 --> [REQ_ID=3ea6533a62a5] [REQUEST][END]
INFO - 2026-03-13 00:48:23 --> [REQ_ID=3ea6533a62a5] [PERF] Execution time=0.852643
DEBUG - 2026-03-13 00:51:22 --> [REQ_ID=a81fcac1a541] [REQUEST][START] HEAD /
DEBUG - 2026-03-13 00:51:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-13 00:51:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-13 00:51:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-13 00:51:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-13 00:51:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-13 00:56:21 --> [REQ_ID=3e7d950657d5] [REQUEST][START] GET /
DEBUG - 2026-03-13 00:56:21 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-13 00:56:21 --> [REQ_ID=3e7d950657d5] [FILTER_BEFORE] /
DEBUG - 2026-03-13 00:56:21 --> [REQ_ID=3e7d950657d5] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-13 00:56:21 --> [REQ_ID=3e7d950657d5] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-13 00:56:21 --> [CSRF] token name=csrf_test_name hash=4d986496caaec7e196bd7178c2cc44f9
DEBUG - 2026-03-13 00:56:21 --> [REQ_ID=52a8cd761efc] [INIT] App\Controllers\Home::GET
INFO - 2026-03-13 00:56:21 --> [REQ_ID=52a8cd761efc] [MEMORY][controller-start] 6291456
INFO - 2026-03-13 00:56:21 --> [REQ_ID=52a8cd761efc] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-13 00:56:21 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-13 00:56:22 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
DEBUG - 2026-03-13 00:56:22 --> [REQ_ID=52a8cd761efc] [VIEW_RENDER] themes/public/home
INFO - 2026-03-13 00:56:22 --> [REQ_ID=52a8cd761efc] [MEMORY][commonData:start] 10485760
INFO - 2026-03-13 00:56:22 --> themesMemory usage: 10485760
DEBUG - 2026-03-13 00:56:22 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-13 00:56:22 --> [REQ_ID=3e7d950657d5] [FILTER_AFTER]
DEBUG - 2026-03-13 00:56:22 --> [REQ_ID=3e7d950657d5] [LIFECYCLE][END] status=200 duration_ms=933.62 memory_delta=4194304
INFO - 2026-03-13 00:56:22 --> [REQ_ID=52a8cd761efc] [PERF] Execution time=0.931669
DEBUG - 2026-03-13 00:56:22 --> [REQ_ID=3e7d950657d5] [REQUEST][END]
INFO - 2026-03-13 00:56:22 --> [REQ_ID=3e7d950657d5] [PERF] Execution time=0.973010
DEBUG - 2026-03-13 00:56:22 --> [REQ_ID=c5ced589b449] [REQUEST][START] HEAD /
DEBUG - 2026-03-13 00:56:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-13 00:56:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-13 00:56:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-13 00:56:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-13 00:56:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-13 01:00:01 --> [REQ_ID=1c51441be32a] [REQUEST][START] GET /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-13 01:00:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-13 01:00:01 --> [REQ_ID=1c51441be32a] [FILTER_BEFORE] /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-13 01:00:01 --> [REQ_ID=1c51441be32a] [ROUTE] Controller=\App\Modules\Management\Controllers\ManagementAPIController Method=Run_CRON_Tasks
DEBUG - 2026-03-13 01:00:01 --> [REQ_ID=1c51441be32a] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-13 01:00:01 --> [REQ_ID=1c51441be32a] [REQUEST][END]
INFO - 2026-03-13 01:00:01 --> [REQ_ID=1c51441be32a] [PERF] Execution time=0.048462
DEBUG - 2026-03-13 01:01:22 --> [REQ_ID=9a6a3ec23990] [REQUEST][START] HEAD /
DEBUG - 2026-03-13 01:01:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-13 01:01:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-13 01:01:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-13 01:01:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-13 01:01:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-13 01:06:22 --> [REQ_ID=6d2e1f752459] [REQUEST][START] HEAD /
DEBUG - 2026-03-13 01:06:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-13 01:06:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-13 01:06:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-13 01:06:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-13 01:06:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-13 01:11:22 --> [REQ_ID=ee077142ea23] [REQUEST][START] HEAD /
DEBUG - 2026-03-13 01:11:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-13 01:11:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-13 01:11:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-13 01:11:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-13 01:11:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-13 01:15:01 --> [REQ_ID=1b31ee5de765] [REQUEST][START] GET /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-13 01:15:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-13 01:15:01 --> [REQ_ID=1b31ee5de765] [FILTER_BEFORE] /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-13 01:15:01 --> [REQ_ID=1b31ee5de765] [ROUTE] Controller=\App\Modules\APIs\Controllers\AlertsAPIController Method=fetchEmailAlerts
DEBUG - 2026-03-13 01:15:01 --> [REQ_ID=1b31ee5de765] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-13 01:15:01 --> [REQ_ID=1b31ee5de765] [REQUEST][END]
INFO - 2026-03-13 01:15:01 --> [REQ_ID=1b31ee5de765] [PERF] Execution time=0.046721
DEBUG - 2026-03-13 01:16:22 --> [REQ_ID=44e98bd19f28] [REQUEST][START] HEAD /
DEBUG - 2026-03-13 01:16:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-13 01:16:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-13 01:16:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-13 01:16:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-13 01:16:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-13 01:21:22 --> [REQ_ID=08b77339df04] [REQUEST][START] HEAD /
DEBUG - 2026-03-13 01:21:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-13 01:21:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-13 01:21:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-13 01:21:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-13 01:21:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-13 01:26:22 --> [REQ_ID=b8b83a4b4f5e] [REQUEST][START] HEAD /
DEBUG - 2026-03-13 01:26:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-13 01:26:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-13 01:26:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-13 01:26:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-13 01:26:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-13 01:31:22 --> [REQ_ID=c4669a214fad] [REQUEST][START] HEAD /
DEBUG - 2026-03-13 01:31:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-13 01:31:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-13 01:31:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-13 01:31:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-13 01:31:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-13 01:36:22 --> [REQ_ID=9622f84d3a13] [REQUEST][START] HEAD /
DEBUG - 2026-03-13 01:36:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-13 01:36:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-13 01:36:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-13 01:36:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-13 01:36:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-13 01:41:22 --> [REQ_ID=ce50bc2e6d41] [REQUEST][START] HEAD /
DEBUG - 2026-03-13 01:41:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-13 01:41:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-13 01:41:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-13 01:41:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-13 01:41:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-13 01:46:22 --> [REQ_ID=659eab22442e] [REQUEST][START] HEAD /
DEBUG - 2026-03-13 01:46:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-13 01:46:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-13 01:46:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-13 01:46:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-13 01:46:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-13 01:51:22 --> [REQ_ID=55694b3b7612] [REQUEST][START] HEAD /
DEBUG - 2026-03-13 01:51:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-13 01:51:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-13 01:51:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-13 01:51:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-13 01:51:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-13 01:56:08 --> [REQ_ID=95e650579dbe] [REQUEST][START] GET /
DEBUG - 2026-03-13 01:56:08 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-13 01:56:08 --> [REQ_ID=95e650579dbe] [FILTER_BEFORE] /
DEBUG - 2026-03-13 01:56:08 --> [REQ_ID=95e650579dbe] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-13 01:56:08 --> [REQ_ID=95e650579dbe] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-13 01:56:08 --> [CSRF] token name=csrf_test_name hash=8f60c18d6cd3e5c7ea3a81a03d6ae327
DEBUG - 2026-03-13 01:56:08 --> [REQ_ID=1bc157c9c7d5] [INIT] App\Controllers\Home::GET
INFO - 2026-03-13 01:56:08 --> [REQ_ID=1bc157c9c7d5] [MEMORY][controller-start] 6291456
INFO - 2026-03-13 01:56:08 --> [REQ_ID=1bc157c9c7d5] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-13 01:56:08 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-13 01:56:08 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-03-13 01:56:08 --> [REQ_ID=1bc157c9c7d5] [VIEW_RENDER] themes/public/home
INFO - 2026-03-13 01:56:08 --> [REQ_ID=1bc157c9c7d5] [MEMORY][commonData:start] 10485760
INFO - 2026-03-13 01:56:08 --> themesMemory usage: 10485760
DEBUG - 2026-03-13 01:56:08 --> [MetaService] slug= pageName=Home cacheHit= path=DB
DEBUG - 2026-03-13 01:56:08 --> [REQ_ID=95e650579dbe] [FILTER_AFTER]
DEBUG - 2026-03-13 01:56:08 --> [REQ_ID=95e650579dbe] [LIFECYCLE][END] status=200 duration_ms=636.48 memory_delta=4194304
INFO - 2026-03-13 01:56:08 --> [REQ_ID=1bc157c9c7d5] [PERF] Execution time=0.634214
DEBUG - 2026-03-13 01:56:08 --> [REQ_ID=95e650579dbe] [REQUEST][END]
INFO - 2026-03-13 01:56:08 --> [REQ_ID=95e650579dbe] [PERF] Execution time=0.676882
DEBUG - 2026-03-13 01:56:22 --> [REQ_ID=76278b9c6183] [REQUEST][START] HEAD /
DEBUG - 2026-03-13 01:56:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-13 01:56:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-13 01:56:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-13 01:56:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-13 01:56:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-13 02:00:01 --> [REQ_ID=c6b21a85e411] [REQUEST][START] GET /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-13 02:00:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-13 02:00:01 --> [REQ_ID=c6b21a85e411] [FILTER_BEFORE] /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-13 02:00:01 --> [REQ_ID=c6b21a85e411] [ROUTE] Controller=\App\Modules\Management\Controllers\ManagementAPIController Method=Run_CRON_Tasks
DEBUG - 2026-03-13 02:00:01 --> [REQ_ID=c6b21a85e411] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-13 02:00:01 --> [REQ_ID=c6b21a85e411] [REQUEST][END]
INFO - 2026-03-13 02:00:01 --> [REQ_ID=c6b21a85e411] [PERF] Execution time=0.037647
DEBUG - 2026-03-13 02:01:22 --> [REQ_ID=5d51fcfd336d] [REQUEST][START] HEAD /
DEBUG - 2026-03-13 02:01:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-13 02:01:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-13 02:01:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-13 02:01:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-13 02:01:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-13 02:06:22 --> [REQ_ID=e0900da9755b] [REQUEST][START] HEAD /
DEBUG - 2026-03-13 02:06:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-13 02:06:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-13 02:06:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-13 02:06:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-13 02:06:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-13 02:11:22 --> [REQ_ID=3535707cb297] [REQUEST][START] HEAD /
DEBUG - 2026-03-13 02:11:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-13 02:11:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-13 02:11:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-13 02:11:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-13 02:11:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-13 02:15:01 --> [REQ_ID=430ae39dfe3c] [REQUEST][START] GET /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-13 02:15:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-13 02:15:01 --> [REQ_ID=430ae39dfe3c] [FILTER_BEFORE] /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-13 02:15:01 --> [REQ_ID=430ae39dfe3c] [ROUTE] Controller=\App\Modules\APIs\Controllers\AlertsAPIController Method=fetchEmailAlerts
DEBUG - 2026-03-13 02:15:01 --> [REQ_ID=430ae39dfe3c] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-13 02:15:01 --> [REQ_ID=430ae39dfe3c] [REQUEST][END]
INFO - 2026-03-13 02:15:01 --> [REQ_ID=430ae39dfe3c] [PERF] Execution time=0.048305
DEBUG - 2026-03-13 02:16:22 --> [REQ_ID=32d443c83437] [REQUEST][START] HEAD /
DEBUG - 2026-03-13 02:16:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-13 02:16:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-13 02:16:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-13 02:16:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-13 02:16:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-13 02:21:22 --> [REQ_ID=bfaa1c24b8bd] [REQUEST][START] HEAD /
DEBUG - 2026-03-13 02:21:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-13 02:21:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-13 02:21:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-13 02:21:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-13 02:21:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-13 02:23:44 --> [REQ_ID=a166deecfa39] [REQUEST][START] GET /
DEBUG - 2026-03-13 02:23:44 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-13 02:23:44 --> [REQ_ID=a166deecfa39] [FILTER_BEFORE] /
DEBUG - 2026-03-13 02:23:44 --> [REQ_ID=a166deecfa39] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-13 02:23:44 --> [REQ_ID=a166deecfa39] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-13 02:23:44 --> [CSRF] token name=csrf_test_name hash=a877c86a37ec1968e76dd9348998a3ba
DEBUG - 2026-03-13 02:23:44 --> [REQ_ID=70606e2c0708] [INIT] App\Controllers\Home::GET
INFO - 2026-03-13 02:23:44 --> [REQ_ID=70606e2c0708] [MEMORY][controller-start] 6291456
INFO - 2026-03-13 02:23:44 --> [REQ_ID=70606e2c0708] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-13 02:23:44 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-13 02:23:45 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-03-13 02:23:45 --> [REQ_ID=70606e2c0708] [VIEW_RENDER] themes/public/home
INFO - 2026-03-13 02:23:45 --> [REQ_ID=70606e2c0708] [MEMORY][commonData:start] 10485760
INFO - 2026-03-13 02:23:45 --> themesMemory usage: 10485760
DEBUG - 2026-03-13 02:23:45 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-13 02:23:45 --> [REQ_ID=a166deecfa39] [FILTER_AFTER]
DEBUG - 2026-03-13 02:23:45 --> [REQ_ID=a166deecfa39] [LIFECYCLE][END] status=200 duration_ms=656.31 memory_delta=4194304
INFO - 2026-03-13 02:23:45 --> [REQ_ID=70606e2c0708] [PERF] Execution time=0.654324
DEBUG - 2026-03-13 02:23:45 --> [REQ_ID=a166deecfa39] [REQUEST][END]
INFO - 2026-03-13 02:23:45 --> [REQ_ID=a166deecfa39] [PERF] Execution time=0.695242
DEBUG - 2026-03-13 02:26:22 --> [REQ_ID=bb24b0e7589a] [REQUEST][START] HEAD /
DEBUG - 2026-03-13 02:26:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-13 02:26:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-13 02:26:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-13 02:26:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-13 02:26:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-13 02:31:22 --> [REQ_ID=d2eaccce2f15] [REQUEST][START] HEAD /
DEBUG - 2026-03-13 02:31:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-13 02:31:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-13 02:31:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-13 02:31:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-13 02:31:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-13 02:36:22 --> [REQ_ID=c79505b31eb3] [REQUEST][START] HEAD /
DEBUG - 2026-03-13 02:36:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-13 02:36:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-13 02:36:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-13 02:36:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-13 02:36:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-13 02:41:22 --> [REQ_ID=c53460339585] [REQUEST][START] HEAD /
DEBUG - 2026-03-13 02:41:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-13 02:41:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-13 02:41:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-13 02:41:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-13 02:41:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-13 02:44:29 --> [REQ_ID=062db521bb51] [REQUEST][START] GET /
DEBUG - 2026-03-13 02:44:29 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-13 02:44:29 --> [REQ_ID=062db521bb51] [FILTER_BEFORE] /
DEBUG - 2026-03-13 02:44:29 --> [REQ_ID=062db521bb51] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-13 02:44:29 --> [REQ_ID=062db521bb51] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-13 02:44:29 --> [CSRF] token name=csrf_test_name hash=e4d2d9b81b06dd6cf2484f6d0b4ea23c
DEBUG - 2026-03-13 02:44:29 --> [REQ_ID=3afd746b8bfd] [INIT] App\Controllers\Home::GET
INFO - 2026-03-13 02:44:29 --> [REQ_ID=3afd746b8bfd] [MEMORY][controller-start] 6291456
INFO - 2026-03-13 02:44:29 --> [REQ_ID=3afd746b8bfd] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-13 02:44:29 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-13 02:44:30 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-03-13 02:44:30 --> [REQ_ID=3afd746b8bfd] [VIEW_RENDER] themes/public/home
INFO - 2026-03-13 02:44:30 --> [REQ_ID=3afd746b8bfd] [MEMORY][commonData:start] 10485760
INFO - 2026-03-13 02:44:30 --> themesMemory usage: 10485760
DEBUG - 2026-03-13 02:44:30 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-13 02:44:30 --> [REQ_ID=062db521bb51] [FILTER_AFTER]
DEBUG - 2026-03-13 02:44:30 --> [REQ_ID=062db521bb51] [LIFECYCLE][END] status=200 duration_ms=861.91 memory_delta=4194304
INFO - 2026-03-13 02:44:30 --> [REQ_ID=3afd746b8bfd] [PERF] Execution time=0.859847
DEBUG - 2026-03-13 02:44:30 --> [REQ_ID=062db521bb51] [REQUEST][END]
INFO - 2026-03-13 02:44:30 --> [REQ_ID=062db521bb51] [PERF] Execution time=0.901174
DEBUG - 2026-03-13 02:46:22 --> [REQ_ID=410019625963] [REQUEST][START] HEAD /
DEBUG - 2026-03-13 02:46:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-13 02:46:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-13 02:46:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-13 02:46:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-13 02:46:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-13 02:51:22 --> [REQ_ID=179c73b58055] [REQUEST][START] HEAD /
DEBUG - 2026-03-13 02:51:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-13 02:51:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-13 02:51:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-13 02:51:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-13 02:51:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-13 02:56:22 --> [REQ_ID=cdcb117c8da3] [REQUEST][START] HEAD /
DEBUG - 2026-03-13 02:56:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-13 02:56:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-13 02:56:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-13 02:56:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-13 02:56:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-13 03:00:02 --> [REQ_ID=7fc94d597887] [REQUEST][START] GET /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-13 03:00:02 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-13 03:00:02 --> [REQ_ID=7fc94d597887] [FILTER_BEFORE] /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-13 03:00:02 --> [REQ_ID=7fc94d597887] [ROUTE] Controller=\App\Modules\Management\Controllers\ManagementAPIController Method=Run_CRON_Tasks
DEBUG - 2026-03-13 03:00:02 --> [REQ_ID=7fc94d597887] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-13 03:00:02 --> [REQ_ID=7fc94d597887] [REQUEST][END]
INFO - 2026-03-13 03:00:02 --> [REQ_ID=7fc94d597887] [PERF] Execution time=0.050218
DEBUG - 2026-03-13 03:01:22 --> [REQ_ID=b5e8d4582426] [REQUEST][START] HEAD /
DEBUG - 2026-03-13 03:01:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-13 03:01:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-13 03:01:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-13 03:01:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-13 03:01:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-13 03:06:22 --> [REQ_ID=79199741ec0b] [REQUEST][START] HEAD /
DEBUG - 2026-03-13 03:06:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-13 03:06:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-13 03:06:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-13 03:06:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-13 03:06:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-13 03:11:22 --> [REQ_ID=bb24bbc29300] [REQUEST][START] HEAD /
DEBUG - 2026-03-13 03:11:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-13 03:11:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-13 03:11:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-13 03:11:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-13 03:11:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-13 03:15:01 --> [REQ_ID=df71e4b09d6f] [REQUEST][START] GET /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-13 03:15:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-13 03:15:01 --> [REQ_ID=df71e4b09d6f] [FILTER_BEFORE] /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-13 03:15:01 --> [REQ_ID=df71e4b09d6f] [ROUTE] Controller=\App\Modules\APIs\Controllers\AlertsAPIController Method=fetchEmailAlerts
DEBUG - 2026-03-13 03:15:01 --> [REQ_ID=df71e4b09d6f] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-13 03:15:01 --> [REQ_ID=df71e4b09d6f] [REQUEST][END]
INFO - 2026-03-13 03:15:01 --> [REQ_ID=df71e4b09d6f] [PERF] Execution time=0.046410
DEBUG - 2026-03-13 03:16:22 --> [REQ_ID=fefd1241784a] [REQUEST][START] HEAD /
DEBUG - 2026-03-13 03:16:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-13 03:16:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-13 03:16:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-13 03:16:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-13 03:16:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-13 03:21:22 --> [REQ_ID=16b13e77f7a9] [REQUEST][START] HEAD /
DEBUG - 2026-03-13 03:21:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-13 03:21:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-13 03:21:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-13 03:21:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-13 03:21:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-13 03:26:22 --> [REQ_ID=fdb95001a6a1] [REQUEST][START] HEAD /
DEBUG - 2026-03-13 03:26:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-13 03:26:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-13 03:26:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-13 03:26:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-13 03:26:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-13 03:31:22 --> [REQ_ID=80949d456e7d] [REQUEST][START] HEAD /
DEBUG - 2026-03-13 03:31:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-13 03:31:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-13 03:31:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-13 03:31:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-13 03:31:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-13 03:36:22 --> [REQ_ID=82d0e3b051e5] [REQUEST][START] HEAD /
DEBUG - 2026-03-13 03:36:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-13 03:36:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-13 03:36:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-13 03:36:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-13 03:36:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-13 03:39:25 --> [REQ_ID=ac5f74876316] [REQUEST][START] GET /index.php/How-It-Works/MyMI-Gold
DEBUG - 2026-03-13 03:39:25 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-13 03:39:25 --> [REQ_ID=ac5f74876316] [REQUEST][END]
INFO - 2026-03-13 03:39:25 --> [REQ_ID=ac5f74876316] [PERF] Execution time=0.041884
DEBUG - 2026-03-13 03:41:22 --> [REQ_ID=6cd63dcb7350] [REQUEST][START] HEAD /
DEBUG - 2026-03-13 03:41:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-13 03:41:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-13 03:41:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-13 03:41:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-13 03:41:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-13 03:46:22 --> [REQ_ID=24af47f941a8] [REQUEST][START] HEAD /
DEBUG - 2026-03-13 03:46:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-13 03:46:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-13 03:46:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-13 03:46:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-13 03:46:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-13 03:51:22 --> [REQ_ID=679208edfebc] [REQUEST][START] HEAD /
DEBUG - 2026-03-13 03:51:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-13 03:51:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-13 03:51:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-13 03:51:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-13 03:51:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-13 03:54:11 --> [REQ_ID=01675bebcfee] [REQUEST][START] GET /
DEBUG - 2026-03-13 03:54:11 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-13 03:54:11 --> [REQ_ID=01675bebcfee] [REQUEST][END]
INFO - 2026-03-13 03:54:11 --> [REQ_ID=01675bebcfee] [PERF] Execution time=0.038941
DEBUG - 2026-03-13 03:56:22 --> [REQ_ID=5c893d85dac4] [REQUEST][START] HEAD /
DEBUG - 2026-03-13 03:56:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-13 03:56:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-13 03:56:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-13 03:56:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-13 03:56:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-13 04:00:02 --> [REQ_ID=8d80726e649c] [REQUEST][START] GET /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-13 04:00:02 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-13 04:00:02 --> [REQ_ID=8d80726e649c] [FILTER_BEFORE] /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-13 04:00:02 --> [REQ_ID=8d80726e649c] [ROUTE] Controller=\App\Modules\Management\Controllers\ManagementAPIController Method=Run_CRON_Tasks
DEBUG - 2026-03-13 04:00:02 --> [REQ_ID=8d80726e649c] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-13 04:00:02 --> [REQ_ID=8d80726e649c] [REQUEST][END]
INFO - 2026-03-13 04:00:02 --> [REQ_ID=8d80726e649c] [PERF] Execution time=0.049298
DEBUG - 2026-03-13 04:01:22 --> [REQ_ID=5f79a48c9680] [REQUEST][START] HEAD /
DEBUG - 2026-03-13 04:01:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-13 04:01:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-13 04:01:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-13 04:01:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-13 04:01:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-13 04:06:22 --> [REQ_ID=5eda87c65212] [REQUEST][START] HEAD /
DEBUG - 2026-03-13 04:06:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-13 04:06:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-13 04:06:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-13 04:06:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-13 04:06:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-13 04:08:59 --> [REQ_ID=633d62d28206] [REQUEST][START] GET /
DEBUG - 2026-03-13 04:08:59 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-13 04:08:59 --> [REQ_ID=633d62d28206] [FILTER_BEFORE] /
DEBUG - 2026-03-13 04:08:59 --> [REQ_ID=633d62d28206] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-13 04:08:59 --> [REQ_ID=633d62d28206] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-13 04:08:59 --> [CSRF] token name=csrf_test_name hash=0456030de371ff93b1ff160b878f3bbc
DEBUG - 2026-03-13 04:08:59 --> [REQ_ID=a4ac48249aa4] [INIT] App\Controllers\Home::GET
INFO - 2026-03-13 04:08:59 --> [REQ_ID=a4ac48249aa4] [MEMORY][controller-start] 6291456
INFO - 2026-03-13 04:08:59 --> [REQ_ID=a4ac48249aa4] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-13 04:08:59 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-13 04:08:59 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-03-13 04:08:59 --> [REQ_ID=a4ac48249aa4] [VIEW_RENDER] themes/public/home
INFO - 2026-03-13 04:08:59 --> [REQ_ID=a4ac48249aa4] [MEMORY][commonData:start] 10485760
INFO - 2026-03-13 04:08:59 --> themesMemory usage: 10485760
DEBUG - 2026-03-13 04:09:00 --> [MetaService] slug= pageName=Home cacheHit= path=DB
DEBUG - 2026-03-13 04:09:00 --> [REQ_ID=633d62d28206] [FILTER_AFTER]
DEBUG - 2026-03-13 04:09:00 --> [REQ_ID=633d62d28206] [LIFECYCLE][END] status=200 duration_ms=711.62 memory_delta=4194304
INFO - 2026-03-13 04:09:00 --> [REQ_ID=a4ac48249aa4] [PERF] Execution time=0.709757
DEBUG - 2026-03-13 04:09:00 --> [REQ_ID=633d62d28206] [REQUEST][END]
INFO - 2026-03-13 04:09:00 --> [REQ_ID=633d62d28206] [PERF] Execution time=0.750838
DEBUG - 2026-03-13 04:11:22 --> [REQ_ID=01ece16ceee9] [REQUEST][START] HEAD /
DEBUG - 2026-03-13 04:11:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-13 04:11:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-13 04:11:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-13 04:11:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-13 04:11:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-13 04:15:01 --> [REQ_ID=f13fd24a33ad] [REQUEST][START] GET /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-13 04:15:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-13 04:15:01 --> [REQ_ID=f13fd24a33ad] [FILTER_BEFORE] /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-13 04:15:01 --> [REQ_ID=f13fd24a33ad] [ROUTE] Controller=\App\Modules\APIs\Controllers\AlertsAPIController Method=fetchEmailAlerts
DEBUG - 2026-03-13 04:15:01 --> [REQ_ID=f13fd24a33ad] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-13 04:15:01 --> [REQ_ID=f13fd24a33ad] [REQUEST][END]
INFO - 2026-03-13 04:15:01 --> [REQ_ID=f13fd24a33ad] [PERF] Execution time=0.047701
DEBUG - 2026-03-13 04:15:21 --> [REQ_ID=96554608518c] [REQUEST][START] GET /index.php/Blog/IRS/IRS-Expanded-Home-Energy-Tax-Credits
DEBUG - 2026-03-13 04:15:21 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-13 04:15:21 --> [REQ_ID=96554608518c] [REQUEST][END]
INFO - 2026-03-13 04:15:21 --> [REQ_ID=96554608518c] [PERF] Execution time=0.012265
DEBUG - 2026-03-13 04:16:22 --> [REQ_ID=62eebaa1d09f] [REQUEST][START] HEAD /
DEBUG - 2026-03-13 04:16:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-13 04:16:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-13 04:16:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-13 04:16:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-13 04:16:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-13 04:16:29 --> [REQ_ID=feb9ac5b4293] [REQUEST][START] GET /
DEBUG - 2026-03-13 04:16:29 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-13 04:16:29 --> [REQ_ID=feb9ac5b4293] [FILTER_BEFORE] /
DEBUG - 2026-03-13 04:16:29 --> [REQ_ID=feb9ac5b4293] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-13 04:16:29 --> [REQ_ID=feb9ac5b4293] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-13 04:16:29 --> [CSRF] token name=csrf_test_name hash=6f6ef8eb5a4a900838cb06ac82f38974
DEBUG - 2026-03-13 04:16:29 --> [REQ_ID=0488c839d4fa] [INIT] App\Controllers\Home::GET
INFO - 2026-03-13 04:16:29 --> [REQ_ID=0488c839d4fa] [MEMORY][controller-start] 4194304
INFO - 2026-03-13 04:16:29 --> [REQ_ID=0488c839d4fa] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-13 04:16:29 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-13 04:16:29 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
DEBUG - 2026-03-13 04:16:29 --> [REQ_ID=0488c839d4fa] [VIEW_RENDER] themes/public/home
INFO - 2026-03-13 04:16:29 --> [REQ_ID=0488c839d4fa] [MEMORY][commonData:start] 8388608
INFO - 2026-03-13 04:16:29 --> themesMemory usage: 8388608
DEBUG - 2026-03-13 04:16:29 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-13 04:16:29 --> [REQ_ID=feb9ac5b4293] [FILTER_AFTER]
DEBUG - 2026-03-13 04:16:29 --> [REQ_ID=feb9ac5b4293] [LIFECYCLE][END] status=200 duration_ms=729.25 memory_delta=4194304
INFO - 2026-03-13 04:16:29 --> [REQ_ID=0488c839d4fa] [PERF] Execution time=0.727808
DEBUG - 2026-03-13 04:16:29 --> [REQ_ID=feb9ac5b4293] [REQUEST][END]
INFO - 2026-03-13 04:16:29 --> [REQ_ID=feb9ac5b4293] [PERF] Execution time=0.739558
DEBUG - 2026-03-13 04:21:22 --> [REQ_ID=4f5c79d0350d] [REQUEST][START] HEAD /
DEBUG - 2026-03-13 04:21:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-13 04:21:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-13 04:21:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-13 04:21:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-13 04:21:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-13 04:26:22 --> [REQ_ID=80c553c62782] [REQUEST][START] HEAD /
DEBUG - 2026-03-13 04:26:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-13 04:26:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-13 04:26:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-13 04:26:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-13 04:26:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-13 04:31:22 --> [REQ_ID=ae45846aceb2] [REQUEST][START] HEAD /
DEBUG - 2026-03-13 04:31:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-13 04:31:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-13 04:31:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-13 04:31:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-13 04:31:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-13 04:36:22 --> [REQ_ID=16b2bee335f4] [REQUEST][START] HEAD /
DEBUG - 2026-03-13 04:36:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-13 04:36:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-13 04:36:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-13 04:36:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-13 04:36:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-13 04:41:22 --> [REQ_ID=e17b46a4da48] [REQUEST][START] HEAD /
DEBUG - 2026-03-13 04:41:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-13 04:41:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-13 04:41:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-13 04:41:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-13 04:41:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-13 04:46:22 --> [REQ_ID=eb9fc8671e7c] [REQUEST][START] HEAD /
DEBUG - 2026-03-13 04:46:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-13 04:46:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-13 04:46:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-13 04:46:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-13 04:46:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-13 04:51:22 --> [REQ_ID=227a5a1fb7bd] [REQUEST][START] HEAD /
DEBUG - 2026-03-13 04:51:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-13 04:51:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-13 04:51:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-13 04:51:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-13 04:51:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-13 04:55:52 --> [REQ_ID=cc0c8b51e9da] [REQUEST][START] GET /
DEBUG - 2026-03-13 04:55:52 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-13 04:55:52 --> [REQ_ID=cc0c8b51e9da] [FILTER_BEFORE] /
DEBUG - 2026-03-13 04:55:52 --> [REQ_ID=cc0c8b51e9da] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-13 04:55:52 --> [REQ_ID=cc0c8b51e9da] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-13 04:55:52 --> [CSRF] token name=csrf_test_name hash=d887696e26ada861486714ef65646d97
DEBUG - 2026-03-13 04:55:52 --> [REQ_ID=9d6f05ede98f] [INIT] App\Controllers\Home::GET
INFO - 2026-03-13 04:55:52 --> [REQ_ID=9d6f05ede98f] [MEMORY][controller-start] 6291456
INFO - 2026-03-13 04:55:52 --> [REQ_ID=9d6f05ede98f] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-13 04:55:52 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-13 04:55:53 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-03-13 04:55:53 --> [REQ_ID=9d6f05ede98f] [VIEW_RENDER] themes/public/home
INFO - 2026-03-13 04:55:53 --> [REQ_ID=9d6f05ede98f] [MEMORY][commonData:start] 10485760
INFO - 2026-03-13 04:55:53 --> themesMemory usage: 10485760
DEBUG - 2026-03-13 04:55:53 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-13 04:55:53 --> [REQ_ID=cc0c8b51e9da] [FILTER_AFTER]
DEBUG - 2026-03-13 04:55:53 --> [REQ_ID=cc0c8b51e9da] [LIFECYCLE][END] status=200 duration_ms=833.01 memory_delta=4194304
INFO - 2026-03-13 04:55:53 --> [REQ_ID=9d6f05ede98f] [PERF] Execution time=0.830982
DEBUG - 2026-03-13 04:55:53 --> [REQ_ID=cc0c8b51e9da] [REQUEST][END]
INFO - 2026-03-13 04:55:53 --> [REQ_ID=cc0c8b51e9da] [PERF] Execution time=0.871700
DEBUG - 2026-03-13 04:55:56 --> [REQ_ID=14227fa65e1d] [REQUEST][START] POST /index.php/register
DEBUG - 2026-03-13 04:55:56 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-13 04:55:56 --> [REQ_ID=14227fa65e1d] [FILTER_BEFORE] /index.php/register
DEBUG - 2026-03-13 04:55:56 --> [REQ_ID=14227fa65e1d] [ROUTE] Controller=\App\Controllers\AuthController Method=attemptRegister
DEBUG - 2026-03-13 04:55:56 --> [REQ_ID=14227fa65e1d] [LIFECYCLE][START] POST https://www.mymiwallet.com/index.php/register
DEBUG - 2026-03-13 04:55:56 --> [CSRF] token name=csrf_test_name hash=d887696e26ada861486714ef65646d97
INFO - 2026-03-13 04:55:56 --> CSRF token verified.
DEBUG - 2026-03-13 04:55:56 --> [REQ_ID=911d2db9b917] [INIT] App\Controllers\AuthController::POST
INFO - 2026-03-13 04:55:56 --> [REQ_ID=911d2db9b917] [MEMORY][controller-start] 6291456
INFO - 2026-03-13 04:55:56 --> [REGISTRATION] Submission received
INFO - 2026-03-13 04:55:56 --> MailService queued email
INFO - 2026-03-13 04:55:56 --> [REGISTRATION] Validation passed (basic fields)
INFO - 2026-03-13 04:55:56 --> [REGISTRATION] Validation passed (password fields)
INFO - 2026-03-13 04:55:56 --> Registration created user_id=11722, email=esp.inoz.a.s4.1.5@gmail.com, username=qKnVNgZLXHFnMvXRQwysncf, active=, requiresActivation=1, loginIdentifier=username
INFO - 2026-03-13 04:55:56 --> [REGISTRATION] User record created
INFO - 2026-03-13 04:55:56 --> OnboardingProgressService: created onboarding record for user_id=11722
INFO - 2026-03-13 04:55:57 --> Registration succeeded for esp.inoz.a.s4.1.5@gmail.com (event ceac89d340ab2304)
INFO - 2026-03-13 04:55:57 --> [REGISTRATION] Activation email queued
INFO - 2026-03-13 04:55:57 --> Registration redirecting to success guide for user_id=11722
DEBUG - 2026-03-13 04:55:57 --> [REQ_ID=14227fa65e1d] [FILTER_AFTER]
DEBUG - 2026-03-13 04:55:57 --> [REQ_ID=14227fa65e1d] [LIFECYCLE][END] status=303 duration_ms=1,267.60 memory_delta=0
INFO - 2026-03-13 04:55:57 --> [REQ_ID=911d2db9b917] [PERF] Execution time=1.267171
DEBUG - 2026-03-13 04:55:57 --> [REQ_ID=14227fa65e1d] [REQUEST][END]
INFO - 2026-03-13 04:55:57 --> [REQ_ID=14227fa65e1d] [PERF] Execution time=1.281278
DEBUG - 2026-03-13 04:55:58 --> [REQ_ID=3b55556a0ee9] [REQUEST][START] GET /index.php/register/success
DEBUG - 2026-03-13 04:55:58 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-13 04:55:58 --> [REQ_ID=3b55556a0ee9] [FILTER_BEFORE] /index.php/register/success
DEBUG - 2026-03-13 04:55:58 --> [REQ_ID=3b55556a0ee9] [ROUTE] Controller=\App\Controllers\AuthController Method=registerSuccess
DEBUG - 2026-03-13 04:55:58 --> [REQ_ID=3b55556a0ee9] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/register/success
DEBUG - 2026-03-13 04:55:58 --> [CSRF] token name=csrf_test_name hash=d887696e26ada861486714ef65646d97
DEBUG - 2026-03-13 04:55:58 --> [REQ_ID=132cfe205e25] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-13 04:55:58 --> [REQ_ID=132cfe205e25] [MEMORY][controller-start] 4194304
INFO - 2026-03-13 04:55:58 --> AuthController::registerSuccess view rendered.
INFO - 2026-03-13 04:55:58 --> [REQ_ID=132cfe205e25] [PERF] Execution time=0.018593
DEBUG - 2026-03-13 04:56:11 --> [REQ_ID=c791fda5dbab] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-13 04:56:11 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-13 04:56:11 --> [REQ_ID=c791fda5dbab] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-13 04:56:11 --> [REQ_ID=c791fda5dbab] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-13 04:56:11 --> [REQ_ID=c791fda5dbab] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-13 04:56:11 --> [CSRF] token name=csrf_test_name hash=d887696e26ada861486714ef65646d97
DEBUG - 2026-03-13 04:56:11 --> [REQ_ID=08edf156c55f] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-13 04:56:11 --> [REQ_ID=08edf156c55f] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-13 04:56:11 --> [REQ_ID=c791fda5dbab] [FILTER_AFTER]
DEBUG - 2026-03-13 04:56:11 --> [REQ_ID=c791fda5dbab] [LIFECYCLE][END] status=200 duration_ms=31.74 memory_delta=0
INFO - 2026-03-13 04:56:11 --> [REQ_ID=08edf156c55f] [PERF] Execution time=0.031562
DEBUG - 2026-03-13 04:56:11 --> [REQ_ID=c791fda5dbab] [REQUEST][END]
INFO - 2026-03-13 04:56:11 --> [REQ_ID=c791fda5dbab] [PERF] Execution time=0.041616
DEBUG - 2026-03-13 04:56:20 --> [REQ_ID=afc4aa25fefb] [REQUEST][START] POST /index.php/login
DEBUG - 2026-03-13 04:56:20 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-13 04:56:20 --> [REQ_ID=afc4aa25fefb] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-13 04:56:20 --> [REQ_ID=afc4aa25fefb] [ROUTE] Controller=\App\Controllers\AuthController Method=attemptLogin
DEBUG - 2026-03-13 04:56:20 --> [REQ_ID=afc4aa25fefb] [LIFECYCLE][START] POST https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-13 04:56:20 --> [CSRF] token name=csrf_test_name hash=d887696e26ada861486714ef65646d97
INFO - 2026-03-13 04:56:20 --> CSRF token verified.
DEBUG - 2026-03-13 04:56:20 --> [REQ_ID=9da87da5a286] [INIT] App\Controllers\AuthController::POST
INFO - 2026-03-13 04:56:20 --> [REQ_ID=9da87da5a286] [MEMORY][controller-start] 4194304
INFO - 2026-03-13 04:56:20 --> AuthController L93: Auth:attemptLogin started.
INFO - 2026-03-13 04:56:20 --> AuthController L104: Auth:attemptLogin rules: {"login":"required","password":"required"}
INFO - 2026-03-13 04:56:20 --> AuthController L132: Auth:attemptLogin Login Variables: login: required, remember: true, ip: 45.80.158.249, ua: "Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36"
DEBUG - 2026-03-13 04:56:20 --> Auth attemptLogin() called with login identifier: esp.inoz.a.s4.1.5@gmail.com, remember: true
DEBUG - 2026-03-13 04:56:20 --> Auth attemptLogin() called. redirect_url in session: none
DEBUG - 2026-03-13 04:56:20 --> Auth credentials normalised for attempt using key "email"
WARNING - 2026-03-13 04:56:20 --> [AUTH_FAILURE] 
DEBUG - 2026-03-13 04:56:20 --> Auth attempt failed for identifier esp.inoz.a.s4.1.5@gmail.com. Error: Unable to log you in. Please check your password.
WARNING - 2026-03-13 04:56:20 --> [AUTH] Login failure
WARNING - 2026-03-13 04:56:20 --> [AUTH] Login failed
DEBUG - 2026-03-13 04:56:20 --> [REQ_ID=afc4aa25fefb] [FILTER_AFTER]
DEBUG - 2026-03-13 04:56:20 --> [REQ_ID=afc4aa25fefb] [LIFECYCLE][END] status=303 duration_ms=177.82 memory_delta=0
INFO - 2026-03-13 04:56:20 --> [REQ_ID=9da87da5a286] [PERF] Execution time=0.177554
DEBUG - 2026-03-13 04:56:20 --> [REQ_ID=afc4aa25fefb] [REQUEST][END]
INFO - 2026-03-13 04:56:20 --> [REQ_ID=afc4aa25fefb] [PERF] Execution time=0.187391
DEBUG - 2026-03-13 04:56:21 --> [REQ_ID=a601b9b3f702] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-13 04:56:21 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-13 04:56:21 --> [REQ_ID=a601b9b3f702] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-13 04:56:21 --> [REQ_ID=a601b9b3f702] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-13 04:56:21 --> [REQ_ID=a601b9b3f702] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-13 04:56:21 --> [CSRF] token name=csrf_test_name hash=d887696e26ada861486714ef65646d97
DEBUG - 2026-03-13 04:56:21 --> [REQ_ID=3afb925f09e4] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-13 04:56:21 --> [REQ_ID=3afb925f09e4] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-13 04:56:21 --> [REQ_ID=a601b9b3f702] [FILTER_AFTER]
DEBUG - 2026-03-13 04:56:21 --> [REQ_ID=a601b9b3f702] [LIFECYCLE][END] status=200 duration_ms=88.36 memory_delta=0
INFO - 2026-03-13 04:56:21 --> [REQ_ID=3afb925f09e4] [PERF] Execution time=0.088275
DEBUG - 2026-03-13 04:56:21 --> [REQ_ID=a601b9b3f702] [REQUEST][END]
INFO - 2026-03-13 04:56:21 --> [REQ_ID=a601b9b3f702] [PERF] Execution time=0.096919
DEBUG - 2026-03-13 04:56:22 --> [REQ_ID=4e8af3af1c59] [REQUEST][START] HEAD /
DEBUG - 2026-03-13 04:56:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-13 04:56:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-13 04:56:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-13 04:56:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-13 04:56:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-13 04:56:34 --> [REQ_ID=76cbbb4c6b08] [REQUEST][START] GET /index.php/How-It-Works/Registering-An-Account
DEBUG - 2026-03-13 04:56:34 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-13 04:56:34 --> [REQ_ID=76cbbb4c6b08] [FILTER_BEFORE] /index.php/How-It-Works/Registering-An-Account
DEBUG - 2026-03-13 04:56:34 --> [REQ_ID=76cbbb4c6b08] [ROUTE] Controller=\App\Modules\Blog\Controllers\HowItWorksController Method=show
DEBUG - 2026-03-13 04:56:34 --> [REQ_ID=76cbbb4c6b08] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/How-It-Works/Registering-An-Account
DEBUG - 2026-03-13 04:56:34 --> [CSRF] token name=csrf_test_name hash=d887696e26ada861486714ef65646d97
DEBUG - 2026-03-13 04:56:34 --> [REQ_ID=2b6193d89108] [INIT] App\Modules\Blog\Controllers\HowItWorksController::GET
INFO - 2026-03-13 04:56:34 --> [REQ_ID=2b6193d89108] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-13 04:56:34 --> [REQ_ID=2b6193d89108] [METHOD_ENTRY] show
DEBUG - 2026-03-13 04:56:34 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-13 04:56:34 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-13 04:56:34 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-13 04:56:34 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-13 04:56:34 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-13 04:56:34 --> MyMICoin: guest context detected; skipping user-specific preload.
ERROR - 2026-03-13 04:56:34 --> HowItWorksController failure: Call to undefined method App\Modules\Blog\Controllers\HowItWorksController::respondWithRendered()
INFO - 2026-03-13 04:56:34 --> [REQ_ID=2b6193d89108] [PERF] Execution time=0.114676
DEBUG - 2026-03-13 04:56:39 --> [REQ_ID=26e22622761d] [REQUEST][START] GET /index.php/Free/register
DEBUG - 2026-03-13 04:56:39 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-13 04:56:39 --> [REQ_ID=26e22622761d] [FILTER_BEFORE] /index.php/Free/register
DEBUG - 2026-03-13 04:56:39 --> [REQ_ID=26e22622761d] [ROUTE] Controller=\App\Controllers\AuthController Method=register
DEBUG - 2026-03-13 04:56:39 --> [REQ_ID=26e22622761d] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Free/register
DEBUG - 2026-03-13 04:56:39 --> [CSRF] token name=csrf_test_name hash=d887696e26ada861486714ef65646d97
DEBUG - 2026-03-13 04:56:39 --> [REQ_ID=26e22622761d] [REQUEST][END]
INFO - 2026-03-13 04:56:39 --> [REQ_ID=26e22622761d] [PERF] Execution time=0.010164
DEBUG - 2026-03-13 04:56:39 --> [REQ_ID=82a4cd852920] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-13 04:56:39 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-13 04:56:39 --> [REQ_ID=82a4cd852920] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-13 04:56:39 --> [REQ_ID=82a4cd852920] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-13 04:56:39 --> [REQ_ID=82a4cd852920] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-13 04:56:39 --> [CSRF] token name=csrf_test_name hash=d887696e26ada861486714ef65646d97
DEBUG - 2026-03-13 04:56:39 --> [REQ_ID=b155a025910b] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-13 04:56:39 --> [REQ_ID=b155a025910b] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-13 04:56:40 --> [REQ_ID=82a4cd852920] [FILTER_AFTER]
DEBUG - 2026-03-13 04:56:40 --> [REQ_ID=82a4cd852920] [LIFECYCLE][END] status=200 duration_ms=81.27 memory_delta=0
INFO - 2026-03-13 04:56:40 --> [REQ_ID=b155a025910b] [PERF] Execution time=0.081350
DEBUG - 2026-03-13 04:56:40 --> [REQ_ID=82a4cd852920] [REQUEST][END]
INFO - 2026-03-13 04:56:40 --> [REQ_ID=82a4cd852920] [PERF] Execution time=0.090435
DEBUG - 2026-03-13 04:56:44 --> [REQ_ID=1926078cdbe3] [REQUEST][START] GET /index.php/How-It-Works/Investor-Profile
DEBUG - 2026-03-13 04:56:44 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-13 04:56:44 --> [REQ_ID=1926078cdbe3] [FILTER_BEFORE] /index.php/How-It-Works/Investor-Profile
DEBUG - 2026-03-13 04:56:44 --> [REQ_ID=1926078cdbe3] [ROUTE] Controller=\App\Modules\Blog\Controllers\HowItWorksController Method=show
DEBUG - 2026-03-13 04:56:44 --> [REQ_ID=1926078cdbe3] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/How-It-Works/Investor-Profile
DEBUG - 2026-03-13 04:56:44 --> [CSRF] token name=csrf_test_name hash=d887696e26ada861486714ef65646d97
DEBUG - 2026-03-13 04:56:44 --> [REQ_ID=6b00c39e1172] [INIT] App\Modules\Blog\Controllers\HowItWorksController::GET
INFO - 2026-03-13 04:56:44 --> [REQ_ID=6b00c39e1172] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-13 04:56:44 --> [REQ_ID=6b00c39e1172] [METHOD_ENTRY] show
DEBUG - 2026-03-13 04:56:44 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-13 04:56:44 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-13 04:56:44 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-13 04:56:44 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-13 04:56:44 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-13 04:56:44 --> MyMICoin: guest context detected; skipping user-specific preload.
ERROR - 2026-03-13 04:56:44 --> HowItWorksController failure: investor-profile
CRITICAL - 2026-03-13 04:56:44 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: GET, Route: How-It-Works/Investor-Profile]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-13 04:56:44 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-13 04:56:44 --> [404] URI=https://www.mymiwallet.com/index.php/How-It-Works/Investor-Profile
WARNING - 2026-03-13 04:56:44 --> 404 route miss: https://www.mymiwallet.com/index.php/How-It-Works/Investor-Profile | referrer: none
ERROR - 2026-03-13 04:56:44 --> [ERROR_PAGE] event=error_404 status=404 message=Page not found.
INFO - 2026-03-13 04:56:44 --> [REQ_ID=6b00c39e1172] [PERF] Execution time=0.055484
DEBUG - 2026-03-13 04:56:49 --> [REQ_ID=e2dc2b62ac48] [REQUEST][START] GET /index.php/Support/Account
DEBUG - 2026-03-13 04:56:49 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-13 04:56:49 --> [REQ_ID=e2dc2b62ac48] [FILTER_BEFORE] /index.php/Support/Account
DEBUG - 2026-03-13 04:56:49 --> [REQ_ID=e2dc2b62ac48] [ROUTE] Controller=\App\Modules\Support\Controllers\AccountSupportController Method=index
DEBUG - 2026-03-13 04:56:49 --> [REQ_ID=e2dc2b62ac48] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Support/Account
DEBUG - 2026-03-13 04:56:49 --> [CSRF] token name=csrf_test_name hash=d887696e26ada861486714ef65646d97
DEBUG - 2026-03-13 04:56:49 --> [REQ_ID=9446e8ca5cbe] [INIT] App\Modules\Support\Controllers\AccountSupportController::GET
INFO - 2026-03-13 04:56:49 --> [REQ_ID=9446e8ca5cbe] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-13 04:56:49 --> [REQ_ID=9446e8ca5cbe] [METHOD_ENTRY] index
DEBUG - 2026-03-13 04:56:49 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-13 04:56:49 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-13 04:56:49 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-13 04:56:49 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-13 04:56:49 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-13 04:56:49 --> MyMICoin: guest context detected; skipping user-specific preload.
INFO - 2026-03-13 04:56:49 --> [REQ_ID=9446e8ca5cbe] [MEMORY][commonData:start] 4194304
DEBUG - 2026-03-13 04:56:49 --> [REQ_ID=9446e8ca5cbe] [VIEW_RENDER] SupportModule/Support/account_help
INFO - 2026-03-13 04:56:49 --> [REQ_ID=9446e8ca5cbe] [MEMORY][commonData:start] 4194304
INFO - 2026-03-13 04:56:49 --> themesMemory usage: 4194304
DEBUG - 2026-03-13 04:56:49 --> [REQ_ID=e2dc2b62ac48] [FILTER_AFTER]
DEBUG - 2026-03-13 04:56:49 --> [REQ_ID=e2dc2b62ac48] [LIFECYCLE][END] status=200 duration_ms=29.33 memory_delta=0
INFO - 2026-03-13 04:56:49 --> [REQ_ID=9446e8ca5cbe] [PERF] Execution time=0.029103
DEBUG - 2026-03-13 04:56:49 --> [REQ_ID=e2dc2b62ac48] [REQUEST][END]
INFO - 2026-03-13 04:56:49 --> [REQ_ID=e2dc2b62ac48] [PERF] Execution time=0.039391
DEBUG - 2026-03-13 04:56:54 --> [REQ_ID=47f08fa232a5] [REQUEST][START] POST /index.php/Support/resendActivation
DEBUG - 2026-03-13 04:56:54 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-13 04:56:54 --> [REQ_ID=47f08fa232a5] [FILTER_BEFORE] /index.php/Support/resendActivation
DEBUG - 2026-03-13 04:56:54 --> [REQ_ID=47f08fa232a5] [ROUTE] Controller=\App\Modules\Support\Controllers\AccountSupportController Method=resendActivation
DEBUG - 2026-03-13 04:56:54 --> [REQ_ID=47f08fa232a5] [LIFECYCLE][START] POST https://www.mymiwallet.com/index.php/Support/resendActivation
DEBUG - 2026-03-13 04:56:54 --> [CSRF] token name=csrf_test_name hash=d887696e26ada861486714ef65646d97
INFO - 2026-03-13 04:56:54 --> CSRF token verified.
DEBUG - 2026-03-13 04:56:54 --> [REQ_ID=79a40013dc0a] [INIT] App\Modules\Support\Controllers\AccountSupportController::POST
INFO - 2026-03-13 04:56:54 --> [REQ_ID=79a40013dc0a] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-13 04:56:54 --> [REQ_ID=79a40013dc0a] [METHOD_ENTRY] resendActivation
DEBUG - 2026-03-13 04:56:54 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-13 04:56:54 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-13 04:56:54 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-13 04:56:54 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-13 04:56:54 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-13 04:56:54 --> MyMICoin: guest context detected; skipping user-specific preload.
INFO - 2026-03-13 04:56:54 --> [SUPPORT] Account help requested
INFO - 2026-03-13 04:56:55 --> [SUPPORT] Account help outcome
DEBUG - 2026-03-13 04:56:55 --> [REQ_ID=47f08fa232a5] [FILTER_AFTER]
DEBUG - 2026-03-13 04:56:55 --> [REQ_ID=47f08fa232a5] [LIFECYCLE][END] status=303 duration_ms=1,063.44 memory_delta=0
INFO - 2026-03-13 04:56:55 --> [REQ_ID=79a40013dc0a] [PERF] Execution time=1.063340
DEBUG - 2026-03-13 04:56:55 --> [REQ_ID=47f08fa232a5] [REQUEST][END]
INFO - 2026-03-13 04:56:55 --> [REQ_ID=47f08fa232a5] [PERF] Execution time=1.074974
DEBUG - 2026-03-13 04:56:56 --> [REQ_ID=e8da44b47c83] [REQUEST][START] GET /index.php/Support/Account
DEBUG - 2026-03-13 04:56:56 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-13 04:56:56 --> [REQ_ID=e8da44b47c83] [FILTER_BEFORE] /index.php/Support/Account
DEBUG - 2026-03-13 04:56:56 --> [REQ_ID=e8da44b47c83] [ROUTE] Controller=\App\Modules\Support\Controllers\AccountSupportController Method=index
DEBUG - 2026-03-13 04:56:56 --> [REQ_ID=e8da44b47c83] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Support/Account
DEBUG - 2026-03-13 04:56:56 --> [CSRF] token name=csrf_test_name hash=d887696e26ada861486714ef65646d97
DEBUG - 2026-03-13 04:56:56 --> [REQ_ID=d83136e4f29e] [INIT] App\Modules\Support\Controllers\AccountSupportController::GET
INFO - 2026-03-13 04:56:56 --> [REQ_ID=d83136e4f29e] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-13 04:56:56 --> [REQ_ID=d83136e4f29e] [METHOD_ENTRY] index
DEBUG - 2026-03-13 04:56:56 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-13 04:56:56 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-13 04:56:56 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-13 04:56:56 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-13 04:56:56 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-13 04:56:56 --> MyMICoin: guest context detected; skipping user-specific preload.
INFO - 2026-03-13 04:56:56 --> [REQ_ID=d83136e4f29e] [MEMORY][commonData:start] 4194304
DEBUG - 2026-03-13 04:56:56 --> [REQ_ID=d83136e4f29e] [VIEW_RENDER] SupportModule/Support/account_help
INFO - 2026-03-13 04:56:56 --> [REQ_ID=d83136e4f29e] [MEMORY][commonData:start] 4194304
INFO - 2026-03-13 04:56:56 --> themesMemory usage: 4194304
DEBUG - 2026-03-13 04:56:56 --> [REQ_ID=e8da44b47c83] [FILTER_AFTER]
DEBUG - 2026-03-13 04:56:56 --> [REQ_ID=e8da44b47c83] [LIFECYCLE][END] status=200 duration_ms=28.48 memory_delta=0
INFO - 2026-03-13 04:56:56 --> [REQ_ID=d83136e4f29e] [PERF] Execution time=0.028199
DEBUG - 2026-03-13 04:56:56 --> [REQ_ID=e8da44b47c83] [REQUEST][END]
INFO - 2026-03-13 04:56:56 --> [REQ_ID=e8da44b47c83] [PERF] Execution time=0.037985
DEBUG - 2026-03-13 04:57:11 --> [REQ_ID=d063a506ded0] [REQUEST][START] GET /index.php/forgot
DEBUG - 2026-03-13 04:57:11 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-13 04:57:11 --> [REQ_ID=d063a506ded0] [FILTER_BEFORE] /index.php/forgot
DEBUG - 2026-03-13 04:57:11 --> [REQ_ID=d063a506ded0] [ROUTE] Controller=\Myth\Auth\Controllers\AuthController Method=forgotPassword
DEBUG - 2026-03-13 04:57:11 --> [REQ_ID=d063a506ded0] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/forgot
DEBUG - 2026-03-13 04:57:11 --> [CSRF] token name=csrf_test_name hash=d887696e26ada861486714ef65646d97
DEBUG - 2026-03-13 04:57:11 --> [REQ_ID=d063a506ded0] [FILTER_AFTER]
DEBUG - 2026-03-13 04:57:11 --> [REQ_ID=d063a506ded0] [LIFECYCLE][END] status=200 duration_ms=3.20 memory_delta=0
DEBUG - 2026-03-13 04:57:11 --> [REQ_ID=d063a506ded0] [REQUEST][END]
INFO - 2026-03-13 04:57:11 --> [REQ_ID=d063a506ded0] [PERF] Execution time=0.013906
DEBUG - 2026-03-13 04:57:14 --> [REQ_ID=29f88f1ab074] [REQUEST][START] GET /index.php/register
DEBUG - 2026-03-13 04:57:14 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-13 04:57:14 --> [REQ_ID=29f88f1ab074] [FILTER_BEFORE] /index.php/register
DEBUG - 2026-03-13 04:57:14 --> [REQ_ID=29f88f1ab074] [ROUTE] Controller=\App\Controllers\AuthController Method=register
DEBUG - 2026-03-13 04:57:14 --> [REQ_ID=29f88f1ab074] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/register
DEBUG - 2026-03-13 04:57:14 --> [CSRF] token name=csrf_test_name hash=d887696e26ada861486714ef65646d97
DEBUG - 2026-03-13 04:57:14 --> [REQ_ID=979537baf110] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-13 04:57:14 --> [REQ_ID=979537baf110] [MEMORY][controller-start] 4194304
INFO - 2026-03-13 04:57:14 --> [REGISTRATION] Form loaded
INFO - 2026-03-13 04:57:14 --> [REQ_ID=979537baf110] [PERF] Execution time=0.077109
DEBUG - 2026-03-13 04:57:20 --> [REQ_ID=23fdebf4a831] [REQUEST][START] GET /index.php/Account/Activity
DEBUG - 2026-03-13 04:57:20 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-13 04:57:20 --> [REQ_ID=23fdebf4a831] [FILTER_BEFORE] /index.php/Account/Activity
DEBUG - 2026-03-13 04:57:20 --> [REQ_ID=23fdebf4a831] [ROUTE] Controller=\App\Modules\User\Controllers\DashboardController Method=activity
DEBUG - 2026-03-13 04:57:20 --> [REQ_ID=23fdebf4a831] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Account/Activity
DEBUG - 2026-03-13 04:57:20 --> [CSRF] token name=csrf_test_name hash=d887696e26ada861486714ef65646d97
DEBUG - 2026-03-13 04:57:20 --> [REQ_ID=23fdebf4a831] [REQUEST][END]
INFO - 2026-03-13 04:57:20 --> [REQ_ID=23fdebf4a831] [PERF] Execution time=0.016416
DEBUG - 2026-03-13 04:57:20 --> [REQ_ID=dd2171f6fbe1] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-13 04:57:20 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-13 04:57:20 --> [REQ_ID=dd2171f6fbe1] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-13 04:57:20 --> [REQ_ID=dd2171f6fbe1] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-13 04:57:20 --> [REQ_ID=dd2171f6fbe1] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-13 04:57:20 --> [CSRF] token name=csrf_test_name hash=d887696e26ada861486714ef65646d97
DEBUG - 2026-03-13 04:57:20 --> [REQ_ID=a43be1025ed3] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-13 04:57:20 --> [REQ_ID=a43be1025ed3] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-13 04:57:20 --> [REQ_ID=dd2171f6fbe1] [FILTER_AFTER]
DEBUG - 2026-03-13 04:57:20 --> [REQ_ID=dd2171f6fbe1] [LIFECYCLE][END] status=200 duration_ms=129.26 memory_delta=0
INFO - 2026-03-13 04:57:20 --> [REQ_ID=a43be1025ed3] [PERF] Execution time=0.129110
DEBUG - 2026-03-13 04:57:20 --> [REQ_ID=dd2171f6fbe1] [REQUEST][END]
INFO - 2026-03-13 04:57:20 --> [REQ_ID=dd2171f6fbe1] [PERF] Execution time=0.139351
DEBUG - 2026-03-13 04:57:22 --> [REQ_ID=d5c03912b6cd] [REQUEST][START] GET /
DEBUG - 2026-03-13 04:57:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-13 04:57:22 --> [REQ_ID=d5c03912b6cd] [REQUEST][END]
INFO - 2026-03-13 04:57:22 --> [REQ_ID=d5c03912b6cd] [PERF] Execution time=0.008276
DEBUG - 2026-03-13 04:57:30 --> [REQ_ID=595b372c8aa8] [REQUEST][START] GET /index.php/Customer-Support
DEBUG - 2026-03-13 04:57:30 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-13 04:57:30 --> [REQ_ID=595b372c8aa8] [FILTER_BEFORE] /index.php/Customer-Support
DEBUG - 2026-03-13 04:57:30 --> [REQ_ID=595b372c8aa8] [ROUTE] Controller=\App\Controllers\App\Modules\Support\Controllers\SupportController Method=index
DEBUG - 2026-03-13 04:57:30 --> [REQ_ID=595b372c8aa8] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Customer-Support
DEBUG - 2026-03-13 04:57:30 --> [CSRF] token name=csrf_test_name hash=d887696e26ada861486714ef65646d97
DEBUG - 2026-03-13 04:57:30 --> [REQ_ID=595b372c8aa8] [REQUEST][END]
INFO - 2026-03-13 04:57:30 --> [REQ_ID=595b372c8aa8] [PERF] Execution time=0.010204
DEBUG - 2026-03-13 04:57:31 --> [REQ_ID=2d48f55584bd] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-13 04:57:31 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-13 04:57:31 --> [REQ_ID=2d48f55584bd] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-13 04:57:31 --> [REQ_ID=2d48f55584bd] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-13 04:57:31 --> [REQ_ID=2d48f55584bd] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-13 04:57:31 --> [CSRF] token name=csrf_test_name hash=d887696e26ada861486714ef65646d97
DEBUG - 2026-03-13 04:57:31 --> [REQ_ID=14f030e95c5c] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-13 04:57:31 --> [REQ_ID=14f030e95c5c] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-13 04:57:31 --> [REQ_ID=2d48f55584bd] [FILTER_AFTER]
DEBUG - 2026-03-13 04:57:31 --> [REQ_ID=2d48f55584bd] [LIFECYCLE][END] status=200 duration_ms=23.39 memory_delta=0
INFO - 2026-03-13 04:57:31 --> [REQ_ID=14f030e95c5c] [PERF] Execution time=0.023290
DEBUG - 2026-03-13 04:57:31 --> [REQ_ID=2d48f55584bd] [REQUEST][END]
INFO - 2026-03-13 04:57:31 --> [REQ_ID=2d48f55584bd] [PERF] Execution time=0.032201
DEBUG - 2026-03-13 04:57:37 --> [REQ_ID=76eb94a98607] [REQUEST][START] GET /index.php/Account/Security
DEBUG - 2026-03-13 04:57:37 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-13 04:57:38 --> [REQ_ID=76eb94a98607] [FILTER_BEFORE] /index.php/Account/Security
DEBUG - 2026-03-13 04:57:38 --> [REQ_ID=76eb94a98607] [ROUTE] Controller=\App\Modules\User\Controllers\DashboardController Method=Security
DEBUG - 2026-03-13 04:57:38 --> [REQ_ID=76eb94a98607] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Account/Security
DEBUG - 2026-03-13 04:57:38 --> [CSRF] token name=csrf_test_name hash=d887696e26ada861486714ef65646d97
DEBUG - 2026-03-13 04:57:38 --> [REQ_ID=76eb94a98607] [REQUEST][END]
INFO - 2026-03-13 04:57:38 --> [REQ_ID=76eb94a98607] [PERF] Execution time=0.009827
DEBUG - 2026-03-13 04:57:38 --> [REQ_ID=3df40b314f5d] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-13 04:57:38 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-13 04:57:38 --> [REQ_ID=3df40b314f5d] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-13 04:57:38 --> [REQ_ID=3df40b314f5d] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-13 04:57:38 --> [REQ_ID=3df40b314f5d] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-13 04:57:38 --> [CSRF] token name=csrf_test_name hash=d887696e26ada861486714ef65646d97
DEBUG - 2026-03-13 04:57:38 --> [REQ_ID=555c7854fa3c] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-13 04:57:38 --> [REQ_ID=555c7854fa3c] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-13 04:57:38 --> [REQ_ID=3df40b314f5d] [FILTER_AFTER]
DEBUG - 2026-03-13 04:57:38 --> [REQ_ID=3df40b314f5d] [LIFECYCLE][END] status=200 duration_ms=24.73 memory_delta=0
INFO - 2026-03-13 04:57:38 --> [REQ_ID=555c7854fa3c] [PERF] Execution time=0.024598
DEBUG - 2026-03-13 04:57:38 --> [REQ_ID=3df40b314f5d] [REQUEST][END]
INFO - 2026-03-13 04:57:38 --> [REQ_ID=3df40b314f5d] [PERF] Execution time=0.033790
DEBUG - 2026-03-13 04:57:46 --> [REQ_ID=269087bd21d7] [REQUEST][START] GET /index.php/logout
DEBUG - 2026-03-13 04:57:46 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-13 04:57:46 --> [REQ_ID=269087bd21d7] [FILTER_BEFORE] /index.php/logout
DEBUG - 2026-03-13 04:57:46 --> [REQ_ID=269087bd21d7] [ROUTE] Controller=\App\Controllers\AuthController Method=logout
DEBUG - 2026-03-13 04:57:46 --> [REQ_ID=269087bd21d7] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/logout
DEBUG - 2026-03-13 04:57:46 --> [CSRF] token name=csrf_test_name hash=d887696e26ada861486714ef65646d97
DEBUG - 2026-03-13 04:57:46 --> [REQ_ID=269087bd21d7] [REQUEST][END]
INFO - 2026-03-13 04:57:46 --> [REQ_ID=269087bd21d7] [PERF] Execution time=0.009646
DEBUG - 2026-03-13 04:57:46 --> [REQ_ID=93bf930c019f] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-13 04:57:46 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-13 04:57:46 --> [REQ_ID=93bf930c019f] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-13 04:57:46 --> [REQ_ID=93bf930c019f] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-13 04:57:46 --> [REQ_ID=93bf930c019f] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-13 04:57:46 --> [CSRF] token name=csrf_test_name hash=d887696e26ada861486714ef65646d97
DEBUG - 2026-03-13 04:57:46 --> [REQ_ID=402d01e36058] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-13 04:57:46 --> [REQ_ID=402d01e36058] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-13 04:57:46 --> [REQ_ID=93bf930c019f] [FILTER_AFTER]
DEBUG - 2026-03-13 04:57:46 --> [REQ_ID=93bf930c019f] [LIFECYCLE][END] status=200 duration_ms=21.08 memory_delta=0
INFO - 2026-03-13 04:57:46 --> [REQ_ID=402d01e36058] [PERF] Execution time=0.020858
DEBUG - 2026-03-13 04:57:46 --> [REQ_ID=93bf930c019f] [REQUEST][END]
INFO - 2026-03-13 04:57:46 --> [REQ_ID=93bf930c019f] [PERF] Execution time=0.030213
DEBUG - 2026-03-13 04:57:54 --> [REQ_ID=8586209957b0] [REQUEST][START] GET /index.php/Account/Social-Media
DEBUG - 2026-03-13 04:57:54 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-13 04:57:54 --> [REQ_ID=8586209957b0] [FILTER_BEFORE] /index.php/Account/Social-Media
DEBUG - 2026-03-13 04:57:54 --> [REQ_ID=8586209957b0] [ROUTE] Controller=\App\Modules\User\Controllers\DashboardController Method=SocialMedia
DEBUG - 2026-03-13 04:57:54 --> [REQ_ID=8586209957b0] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Account/Social-Media
DEBUG - 2026-03-13 04:57:54 --> [CSRF] token name=csrf_test_name hash=d887696e26ada861486714ef65646d97
DEBUG - 2026-03-13 04:57:54 --> [REQ_ID=8586209957b0] [REQUEST][END]
INFO - 2026-03-13 04:57:54 --> [REQ_ID=8586209957b0] [PERF] Execution time=0.010419
DEBUG - 2026-03-13 04:57:55 --> [REQ_ID=0bba843f101a] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-13 04:57:55 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-13 04:57:55 --> [REQ_ID=0bba843f101a] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-13 04:57:55 --> [REQ_ID=0bba843f101a] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-13 04:57:55 --> [REQ_ID=0bba843f101a] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-13 04:57:55 --> [CSRF] token name=csrf_test_name hash=d887696e26ada861486714ef65646d97
DEBUG - 2026-03-13 04:57:55 --> [REQ_ID=583f7e370047] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-13 04:57:55 --> [REQ_ID=583f7e370047] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-13 04:57:55 --> [REQ_ID=0bba843f101a] [FILTER_AFTER]
DEBUG - 2026-03-13 04:57:55 --> [REQ_ID=0bba843f101a] [LIFECYCLE][END] status=200 duration_ms=31.44 memory_delta=0
INFO - 2026-03-13 04:57:55 --> [REQ_ID=583f7e370047] [PERF] Execution time=0.031291
DEBUG - 2026-03-13 04:57:55 --> [REQ_ID=0bba843f101a] [REQUEST][END]
INFO - 2026-03-13 04:57:55 --> [REQ_ID=0bba843f101a] [PERF] Execution time=0.041917
DEBUG - 2026-03-13 04:58:05 --> [REQ_ID=012dbae98bf1] [REQUEST][START] GET /index.php/Account/Billing
DEBUG - 2026-03-13 04:58:05 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-13 04:58:05 --> [REQ_ID=012dbae98bf1] [FILTER_BEFORE] /index.php/Account/Billing
DEBUG - 2026-03-13 04:58:05 --> [REQ_ID=012dbae98bf1] [ROUTE] Controller=\App\Modules\User\Controllers\DashboardController Method=billing
DEBUG - 2026-03-13 04:58:05 --> [REQ_ID=012dbae98bf1] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Account/Billing
DEBUG - 2026-03-13 04:58:05 --> [CSRF] token name=csrf_test_name hash=d887696e26ada861486714ef65646d97
DEBUG - 2026-03-13 04:58:05 --> [REQ_ID=012dbae98bf1] [REQUEST][END]
INFO - 2026-03-13 04:58:05 --> [REQ_ID=012dbae98bf1] [PERF] Execution time=0.009942
DEBUG - 2026-03-13 04:58:05 --> [REQ_ID=37534877ea1d] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-13 04:58:05 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-13 04:58:05 --> [REQ_ID=37534877ea1d] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-13 04:58:05 --> [REQ_ID=37534877ea1d] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-13 04:58:05 --> [REQ_ID=37534877ea1d] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-13 04:58:05 --> [CSRF] token name=csrf_test_name hash=d887696e26ada861486714ef65646d97
DEBUG - 2026-03-13 04:58:05 --> [REQ_ID=322241fd3924] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-13 04:58:05 --> [REQ_ID=322241fd3924] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-13 04:58:05 --> [REQ_ID=37534877ea1d] [FILTER_AFTER]
DEBUG - 2026-03-13 04:58:05 --> [REQ_ID=37534877ea1d] [LIFECYCLE][END] status=200 duration_ms=24.29 memory_delta=0
INFO - 2026-03-13 04:58:05 --> [REQ_ID=322241fd3924] [PERF] Execution time=0.024126
DEBUG - 2026-03-13 04:58:05 --> [REQ_ID=37534877ea1d] [REQUEST][END]
INFO - 2026-03-13 04:58:05 --> [REQ_ID=37534877ea1d] [PERF] Execution time=0.033318
DEBUG - 2026-03-13 04:58:12 --> [REQ_ID=f247a2cfb248] [REQUEST][START] GET /index.php/Profile/
DEBUG - 2026-03-13 04:58:12 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-13 04:58:12 --> [REQ_ID=f247a2cfb248] [FILTER_BEFORE] /index.php/Profile/
DEBUG - 2026-03-13 04:58:12 --> [REQ_ID=f247a2cfb248] [ROUTE] Controller=\App\Controllers\App\Modules\User\Controllers\DashboardController Method=profile
DEBUG - 2026-03-13 04:58:12 --> [REQ_ID=f247a2cfb248] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Profile/
DEBUG - 2026-03-13 04:58:12 --> [CSRF] token name=csrf_test_name hash=d887696e26ada861486714ef65646d97
DEBUG - 2026-03-13 04:58:12 --> [REQ_ID=f247a2cfb248] [REQUEST][END]
INFO - 2026-03-13 04:58:12 --> [REQ_ID=f247a2cfb248] [PERF] Execution time=0.010175
DEBUG - 2026-03-13 04:58:13 --> [REQ_ID=89006966b28c] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-13 04:58:13 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-13 04:58:13 --> [REQ_ID=89006966b28c] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-13 04:58:13 --> [REQ_ID=89006966b28c] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-13 04:58:13 --> [REQ_ID=89006966b28c] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-13 04:58:13 --> [CSRF] token name=csrf_test_name hash=d887696e26ada861486714ef65646d97
DEBUG - 2026-03-13 04:58:13 --> [REQ_ID=2f8883ecae02] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-13 04:58:13 --> [REQ_ID=2f8883ecae02] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-13 04:58:13 --> [REQ_ID=89006966b28c] [FILTER_AFTER]
DEBUG - 2026-03-13 04:58:13 --> [REQ_ID=89006966b28c] [LIFECYCLE][END] status=200 duration_ms=28.38 memory_delta=0
INFO - 2026-03-13 04:58:13 --> [REQ_ID=2f8883ecae02] [PERF] Execution time=0.028341
DEBUG - 2026-03-13 04:58:13 --> [REQ_ID=89006966b28c] [REQUEST][END]
INFO - 2026-03-13 04:58:13 --> [REQ_ID=89006966b28c] [PERF] Execution time=0.037142
DEBUG - 2026-03-13 04:58:21 --> [REQ_ID=c015c0dd956c] [REQUEST][START] GET /index.php/Account
DEBUG - 2026-03-13 04:58:21 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-13 04:58:21 --> [REQ_ID=c015c0dd956c] [FILTER_BEFORE] /index.php/Account
DEBUG - 2026-03-13 04:58:21 --> [REQ_ID=c015c0dd956c] [ROUTE] Controller=\App\Modules\User\Controllers\DashboardController Method=account
DEBUG - 2026-03-13 04:58:21 --> [REQ_ID=c015c0dd956c] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Account
DEBUG - 2026-03-13 04:58:21 --> [CSRF] token name=csrf_test_name hash=d887696e26ada861486714ef65646d97
DEBUG - 2026-03-13 04:58:21 --> [REQ_ID=c015c0dd956c] [REQUEST][END]
INFO - 2026-03-13 04:58:21 --> [REQ_ID=c015c0dd956c] [PERF] Execution time=0.010648
DEBUG - 2026-03-13 04:58:22 --> [REQ_ID=236761efd22e] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-13 04:58:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-13 04:58:22 --> [REQ_ID=236761efd22e] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-13 04:58:22 --> [REQ_ID=236761efd22e] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-13 04:58:22 --> [REQ_ID=236761efd22e] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-13 04:58:22 --> [CSRF] token name=csrf_test_name hash=d887696e26ada861486714ef65646d97
DEBUG - 2026-03-13 04:58:22 --> [REQ_ID=eed2647be345] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-13 04:58:22 --> [REQ_ID=eed2647be345] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-13 04:58:22 --> [REQ_ID=236761efd22e] [FILTER_AFTER]
DEBUG - 2026-03-13 04:58:22 --> [REQ_ID=236761efd22e] [LIFECYCLE][END] status=200 duration_ms=25.82 memory_delta=0
INFO - 2026-03-13 04:58:22 --> [REQ_ID=eed2647be345] [PERF] Execution time=0.025805
DEBUG - 2026-03-13 04:58:22 --> [REQ_ID=236761efd22e] [REQUEST][END]
INFO - 2026-03-13 04:58:22 --> [REQ_ID=236761efd22e] [PERF] Execution time=0.034953
DEBUG - 2026-03-13 04:58:32 --> [REQ_ID=444cf047e88c] [REQUEST][START] GET /index.php/Management/Users
DEBUG - 2026-03-13 04:58:32 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-13 04:58:32 --> [REQ_ID=444cf047e88c] [FILTER_BEFORE] /index.php/Management/Users
DEBUG - 2026-03-13 04:58:32 --> [REQ_ID=444cf047e88c] [ROUTE] Controller=\App\Modules\Management\Controllers\UsersController Method=index
DEBUG - 2026-03-13 04:58:32 --> [REQ_ID=444cf047e88c] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Management/Users
DEBUG - 2026-03-13 04:58:32 --> [CSRF] token name=csrf_test_name hash=d887696e26ada861486714ef65646d97
DEBUG - 2026-03-13 04:58:32 --> [REQ_ID=444cf047e88c] [REQUEST][END]
INFO - 2026-03-13 04:58:32 --> [REQ_ID=444cf047e88c] [PERF] Execution time=0.010441
DEBUG - 2026-03-13 04:58:32 --> [REQ_ID=7126de0f1e9c] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-13 04:58:32 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-13 04:58:32 --> [REQ_ID=7126de0f1e9c] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-13 04:58:32 --> [REQ_ID=7126de0f1e9c] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-13 04:58:32 --> [REQ_ID=7126de0f1e9c] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-13 04:58:32 --> [CSRF] token name=csrf_test_name hash=d887696e26ada861486714ef65646d97
DEBUG - 2026-03-13 04:58:32 --> [REQ_ID=70fe86780f1a] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-13 04:58:32 --> [REQ_ID=70fe86780f1a] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-13 04:58:32 --> [REQ_ID=7126de0f1e9c] [FILTER_AFTER]
DEBUG - 2026-03-13 04:58:32 --> [REQ_ID=7126de0f1e9c] [LIFECYCLE][END] status=200 duration_ms=26.05 memory_delta=0
INFO - 2026-03-13 04:58:32 --> [REQ_ID=70fe86780f1a] [PERF] Execution time=0.026000
DEBUG - 2026-03-13 04:58:32 --> [REQ_ID=7126de0f1e9c] [REQUEST][END]
INFO - 2026-03-13 04:58:32 --> [REQ_ID=7126de0f1e9c] [PERF] Execution time=0.035304
DEBUG - 2026-03-13 04:58:43 --> [REQ_ID=0ea90cb4a1c4] [REQUEST][START] GET /index.php/Investments/News
DEBUG - 2026-03-13 04:58:43 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-13 04:58:43 --> [REQ_ID=0ea90cb4a1c4] [FILTER_BEFORE] /index.php/Investments/News
DEBUG - 2026-03-13 04:58:43 --> [REQ_ID=0ea90cb4a1c4] [ROUTE] Controller=closure_route Method=index
DEBUG - 2026-03-13 04:58:43 --> [REQ_ID=0ea90cb4a1c4] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Investments/News
DEBUG - 2026-03-13 04:58:43 --> [CSRF] token name=csrf_test_name hash=d887696e26ada861486714ef65646d97
DEBUG - 2026-03-13 04:58:43 --> [REQ_ID=0ea90cb4a1c4] [REQUEST][END]
INFO - 2026-03-13 04:58:43 --> [REQ_ID=0ea90cb4a1c4] [PERF] Execution time=0.009761
DEBUG - 2026-03-13 04:58:45 --> [REQ_ID=4b4b82c91c55] [REQUEST][START] GET /index.php/Account/Connected-Accounts
DEBUG - 2026-03-13 04:58:45 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-13 04:58:45 --> [REQ_ID=4b4b82c91c55] [FILTER_BEFORE] /index.php/Account/Connected-Accounts
DEBUG - 2026-03-13 04:58:45 --> [REQ_ID=4b4b82c91c55] [ROUTE] Controller=\App\Modules\User\Controllers\DashboardController Method=connectedAccounts
DEBUG - 2026-03-13 04:58:45 --> [REQ_ID=4b4b82c91c55] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Account/Connected-Accounts
DEBUG - 2026-03-13 04:58:45 --> [CSRF] token name=csrf_test_name hash=d887696e26ada861486714ef65646d97
DEBUG - 2026-03-13 04:58:45 --> [REQ_ID=4b4b82c91c55] [REQUEST][END]
INFO - 2026-03-13 04:58:45 --> [REQ_ID=4b4b82c91c55] [PERF] Execution time=0.009161
DEBUG - 2026-03-13 04:58:46 --> [REQ_ID=10f3c1182b14] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-13 04:58:46 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-13 04:58:46 --> [REQ_ID=10f3c1182b14] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-13 04:58:46 --> [REQ_ID=10f3c1182b14] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-13 04:58:46 --> [REQ_ID=10f3c1182b14] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-13 04:58:46 --> [CSRF] token name=csrf_test_name hash=d887696e26ada861486714ef65646d97
DEBUG - 2026-03-13 04:58:46 --> [REQ_ID=ad2c71c777eb] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-13 04:58:46 --> [REQ_ID=ad2c71c777eb] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-13 04:58:46 --> [REQ_ID=10f3c1182b14] [FILTER_AFTER]
DEBUG - 2026-03-13 04:58:46 --> [REQ_ID=10f3c1182b14] [LIFECYCLE][END] status=200 duration_ms=26.35 memory_delta=0
INFO - 2026-03-13 04:58:46 --> [REQ_ID=ad2c71c777eb] [PERF] Execution time=0.026125
DEBUG - 2026-03-13 04:58:46 --> [REQ_ID=10f3c1182b14] [REQUEST][END]
INFO - 2026-03-13 04:58:46 --> [REQ_ID=10f3c1182b14] [PERF] Execution time=0.035643
DEBUG - 2026-03-13 04:58:57 --> [REQ_ID=022789aee974] [REQUEST][START] GET /index.php/Account/Notifications
DEBUG - 2026-03-13 04:58:57 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-13 04:58:57 --> [REQ_ID=022789aee974] [FILTER_BEFORE] /index.php/Account/Notifications
DEBUG - 2026-03-13 04:58:57 --> [REQ_ID=022789aee974] [ROUTE] Controller=\App\Modules\User\Controllers\DashboardController Method=notifications
DEBUG - 2026-03-13 04:58:57 --> [REQ_ID=022789aee974] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Account/Notifications
DEBUG - 2026-03-13 04:58:57 --> [CSRF] token name=csrf_test_name hash=d887696e26ada861486714ef65646d97
DEBUG - 2026-03-13 04:58:57 --> [REQ_ID=022789aee974] [REQUEST][END]
INFO - 2026-03-13 04:58:57 --> [REQ_ID=022789aee974] [PERF] Execution time=0.009747
DEBUG - 2026-03-13 04:58:57 --> [REQ_ID=3a3116299004] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-13 04:58:57 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-13 04:58:57 --> [REQ_ID=3a3116299004] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-13 04:58:57 --> [REQ_ID=3a3116299004] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-13 04:58:57 --> [REQ_ID=3a3116299004] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-13 04:58:57 --> [CSRF] token name=csrf_test_name hash=d887696e26ada861486714ef65646d97
DEBUG - 2026-03-13 04:58:57 --> [REQ_ID=c8586632d6eb] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-13 04:58:57 --> [REQ_ID=c8586632d6eb] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-13 04:58:57 --> [REQ_ID=3a3116299004] [FILTER_AFTER]
DEBUG - 2026-03-13 04:58:57 --> [REQ_ID=3a3116299004] [LIFECYCLE][END] status=200 duration_ms=17.57 memory_delta=0
INFO - 2026-03-13 04:58:57 --> [REQ_ID=c8586632d6eb] [PERF] Execution time=0.017486
DEBUG - 2026-03-13 04:58:57 --> [REQ_ID=3a3116299004] [REQUEST][END]
INFO - 2026-03-13 04:58:57 --> [REQ_ID=3a3116299004] [PERF] Execution time=0.026612
DEBUG - 2026-03-13 04:59:03 --> [REQ_ID=af823bb980cf] [REQUEST][START] GET /index.php/How-It-Works/MyMI-Gold
DEBUG - 2026-03-13 04:59:03 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-13 04:59:03 --> [REQ_ID=af823bb980cf] [FILTER_BEFORE] /index.php/How-It-Works/MyMI-Gold
DEBUG - 2026-03-13 04:59:03 --> [REQ_ID=af823bb980cf] [ROUTE] Controller=\App\Modules\Blog\Controllers\HowItWorksController Method=MyMIGold
DEBUG - 2026-03-13 04:59:03 --> [REQ_ID=af823bb980cf] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/How-It-Works/MyMI-Gold
DEBUG - 2026-03-13 04:59:03 --> [CSRF] token name=csrf_test_name hash=d887696e26ada861486714ef65646d97
DEBUG - 2026-03-13 04:59:03 --> [REQ_ID=fcf1f84a2be4] [INIT] App\Modules\Blog\Controllers\HowItWorksController::GET
INFO - 2026-03-13 04:59:03 --> [REQ_ID=fcf1f84a2be4] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-13 04:59:03 --> [REQ_ID=fcf1f84a2be4] [METHOD_ENTRY] MyMIGold
DEBUG - 2026-03-13 04:59:03 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-13 04:59:03 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-13 04:59:03 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-13 04:59:03 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-13 04:59:03 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-13 04:59:03 --> MyMICoin: guest context detected; skipping user-specific preload.
INFO - 2026-03-13 04:59:03 --> [REQ_ID=fcf1f84a2be4] [MEMORY][commonData:start] 4194304
INFO - 2026-03-13 04:59:04 --> themesMemory usage: 8388608
DEBUG - 2026-03-13 04:59:04 --> [MetaService] slug=how-it-works/mymi-gold pageName= cacheHit= path=DB
DEBUG - 2026-03-13 04:59:04 --> [REQ_ID=af823bb980cf] [FILTER_AFTER]
DEBUG - 2026-03-13 04:59:04 --> [REQ_ID=af823bb980cf] [LIFECYCLE][END] status=200 duration_ms=754.50 memory_delta=4194304
INFO - 2026-03-13 04:59:04 --> [REQ_ID=fcf1f84a2be4] [PERF] Execution time=0.754280
DEBUG - 2026-03-13 04:59:04 --> [REQ_ID=af823bb980cf] [REQUEST][END]
INFO - 2026-03-13 04:59:04 --> [REQ_ID=af823bb980cf] [PERF] Execution time=0.766716
DEBUG - 2026-03-13 05:00:01 --> [REQ_ID=916edd2f08b9] [REQUEST][START] GET /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-13 05:00:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-13 05:00:01 --> [REQ_ID=916edd2f08b9] [FILTER_BEFORE] /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-13 05:00:01 --> [REQ_ID=916edd2f08b9] [ROUTE] Controller=\App\Modules\Management\Controllers\ManagementAPIController Method=Run_CRON_Tasks
DEBUG - 2026-03-13 05:00:01 --> [REQ_ID=916edd2f08b9] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-13 05:00:01 --> [REQ_ID=916edd2f08b9] [REQUEST][END]
INFO - 2026-03-13 05:00:01 --> [REQ_ID=916edd2f08b9] [PERF] Execution time=0.016740
DEBUG - 2026-03-13 05:01:22 --> [REQ_ID=a6cc0f5f424b] [REQUEST][START] HEAD /
DEBUG - 2026-03-13 05:01:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-13 05:01:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-13 05:01:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-13 05:01:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-13 05:01:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-13 05:06:22 --> [REQ_ID=26814355c666] [REQUEST][START] HEAD /
DEBUG - 2026-03-13 05:06:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-13 05:06:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-13 05:06:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-13 05:06:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-13 05:06:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-13 05:11:22 --> [REQ_ID=ba3db29d0cc5] [REQUEST][START] HEAD /
DEBUG - 2026-03-13 05:11:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-13 05:11:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-13 05:11:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-13 05:11:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-13 05:11:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-13 05:15:01 --> [REQ_ID=38a669546786] [REQUEST][START] GET /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-13 05:15:02 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-13 05:15:02 --> [REQ_ID=38a669546786] [FILTER_BEFORE] /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-13 05:15:02 --> [REQ_ID=38a669546786] [ROUTE] Controller=\App\Modules\APIs\Controllers\AlertsAPIController Method=fetchEmailAlerts
DEBUG - 2026-03-13 05:15:02 --> [REQ_ID=38a669546786] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-13 05:15:02 --> [REQ_ID=38a669546786] [REQUEST][END]
INFO - 2026-03-13 05:15:02 --> [REQ_ID=38a669546786] [PERF] Execution time=0.045643
DEBUG - 2026-03-13 05:16:22 --> [REQ_ID=740c97882292] [REQUEST][START] HEAD /
DEBUG - 2026-03-13 05:16:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-13 05:16:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-13 05:16:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-13 05:16:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-13 05:16:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-13 05:17:08 --> [REQ_ID=d0e5d7ac8793] [REQUEST][START] GET /index.php/Blog/News-And-Updates/The-Roadmap-To-The-Future-Of-Finance
DEBUG - 2026-03-13 05:17:08 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-13 05:17:08 --> [REQ_ID=d0e5d7ac8793] [FILTER_BEFORE] /index.php/Blog/News-And-Updates/The-Roadmap-To-The-Future-Of-Finance
DEBUG - 2026-03-13 05:17:08 --> [REQ_ID=d0e5d7ac8793] [ROUTE] Controller=\App\Modules\Blog\Controllers\NewsAndUpdates Method=TheRoadmapToTheFutureOfFinance
DEBUG - 2026-03-13 05:17:08 --> [REQ_ID=d0e5d7ac8793] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Blog/News-And-Updates/The-Roadmap-To-The-Future-Of-Finance
DEBUG - 2026-03-13 05:17:08 --> [CSRF] token name=csrf_test_name hash=df16cb687cd913f684dd562c4b6db449
DEBUG - 2026-03-13 05:17:08 --> [REQ_ID=353374c6b758] [INIT] App\Modules\Blog\Controllers\NewsAndUpdates::GET
INFO - 2026-03-13 05:17:08 --> [REQ_ID=353374c6b758] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-13 05:17:08 --> [REQ_ID=353374c6b758] [METHOD_ENTRY] TheRoadmapToTheFutureOfFinance
DEBUG - 2026-03-13 05:17:08 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-13 05:17:08 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-13 05:17:08 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-13 05:17:08 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-13 05:17:08 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-13 05:17:08 --> MyMICoin: guest context detected; skipping user-specific preload.
INFO - 2026-03-13 05:17:08 --> [REQ_ID=353374c6b758] [PERF] Execution time=0.214339
DEBUG - 2026-03-13 05:17:36 --> [REQ_ID=d454ec7c4e26] [REQUEST][START] GET /index.php/Blog/News-And-Updates/The-Roadmap-To-The-Future-Of-Finance
DEBUG - 2026-03-13 05:17:36 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-13 05:17:36 --> [REQ_ID=d454ec7c4e26] [FILTER_BEFORE] /index.php/Blog/News-And-Updates/The-Roadmap-To-The-Future-Of-Finance
DEBUG - 2026-03-13 05:17:36 --> [REQ_ID=d454ec7c4e26] [ROUTE] Controller=\App\Modules\Blog\Controllers\NewsAndUpdates Method=TheRoadmapToTheFutureOfFinance
DEBUG - 2026-03-13 05:17:36 --> [REQ_ID=d454ec7c4e26] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Blog/News-And-Updates/The-Roadmap-To-The-Future-Of-Finance
DEBUG - 2026-03-13 05:17:36 --> [CSRF] token name=csrf_test_name hash=53f423f0bddd19f5ec114b8b68ac9910
DEBUG - 2026-03-13 05:17:36 --> [REQ_ID=096fad0ff163] [INIT] App\Modules\Blog\Controllers\NewsAndUpdates::GET
INFO - 2026-03-13 05:17:36 --> [REQ_ID=096fad0ff163] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-13 05:17:36 --> [REQ_ID=096fad0ff163] [METHOD_ENTRY] TheRoadmapToTheFutureOfFinance
DEBUG - 2026-03-13 05:17:36 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-13 05:17:36 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-13 05:17:36 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-13 05:17:36 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-13 05:17:36 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-13 05:17:36 --> MyMICoin: guest context detected; skipping user-specific preload.
INFO - 2026-03-13 05:17:36 --> [REQ_ID=096fad0ff163] [PERF] Execution time=0.030642
DEBUG - 2026-03-13 05:17:43 --> [REQ_ID=0565dfa9002a] [REQUEST][START] GET /index.php/Blog/News-And-Updates/The-Roadmap-To-The-Future-Of-Finance
DEBUG - 2026-03-13 05:17:43 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-13 05:17:43 --> [REQ_ID=0565dfa9002a] [FILTER_BEFORE] /index.php/Blog/News-And-Updates/The-Roadmap-To-The-Future-Of-Finance
DEBUG - 2026-03-13 05:17:43 --> [REQ_ID=0565dfa9002a] [ROUTE] Controller=\App\Modules\Blog\Controllers\NewsAndUpdates Method=TheRoadmapToTheFutureOfFinance
DEBUG - 2026-03-13 05:17:43 --> [REQ_ID=0565dfa9002a] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Blog/News-And-Updates/The-Roadmap-To-The-Future-Of-Finance
DEBUG - 2026-03-13 05:17:43 --> [CSRF] token name=csrf_test_name hash=71582b6f584c022fc21c3ce694057e67
DEBUG - 2026-03-13 05:17:43 --> [REQ_ID=692b1080c1d9] [INIT] App\Modules\Blog\Controllers\NewsAndUpdates::GET
INFO - 2026-03-13 05:17:43 --> [REQ_ID=692b1080c1d9] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-13 05:17:43 --> [REQ_ID=692b1080c1d9] [METHOD_ENTRY] TheRoadmapToTheFutureOfFinance
DEBUG - 2026-03-13 05:17:43 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-13 05:17:43 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-13 05:17:43 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-13 05:17:43 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-13 05:17:43 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-13 05:17:43 --> MyMICoin: guest context detected; skipping user-specific preload.
INFO - 2026-03-13 05:17:43 --> [REQ_ID=692b1080c1d9] [PERF] Execution time=0.120842
DEBUG - 2026-03-13 05:21:22 --> [REQ_ID=f855304b3e29] [REQUEST][START] HEAD /
DEBUG - 2026-03-13 05:21:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-13 05:21:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-13 05:21:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-13 05:21:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-13 05:21:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-13 05:26:22 --> [REQ_ID=6c86869c58f2] [REQUEST][START] HEAD /
DEBUG - 2026-03-13 05:26:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-13 05:26:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-13 05:26:23 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-13 05:26:23 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-13 05:26:23 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-13 05:31:22 --> [REQ_ID=6a430a1cf53f] [REQUEST][START] HEAD /
DEBUG - 2026-03-13 05:31:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-13 05:31:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-13 05:31:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-13 05:31:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-13 05:31:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-13 05:36:22 --> [REQ_ID=83764f3ef1a6] [REQUEST][START] HEAD /
DEBUG - 2026-03-13 05:36:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-13 05:36:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-13 05:36:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-13 05:36:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-13 05:36:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-13 05:37:41 --> [REQ_ID=8532f7062e87] [REQUEST][START] GET /
DEBUG - 2026-03-13 05:37:41 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-13 05:37:41 --> [REQ_ID=8532f7062e87] [FILTER_BEFORE] /
DEBUG - 2026-03-13 05:37:41 --> [REQ_ID=8532f7062e87] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-13 05:37:41 --> [REQ_ID=8532f7062e87] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-13 05:37:41 --> [CSRF] token name=csrf_test_name hash=0657a408e9e68f59d7d24a6e3798d451
DEBUG - 2026-03-13 05:37:41 --> [REQ_ID=6ec9b34b8e71] [INIT] App\Controllers\Home::GET
INFO - 2026-03-13 05:37:41 --> [REQ_ID=6ec9b34b8e71] [MEMORY][controller-start] 4194304
INFO - 2026-03-13 05:37:41 --> [REQ_ID=6ec9b34b8e71] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-13 05:37:41 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-13 05:37:41 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-03-13 05:37:41 --> [REQ_ID=6ec9b34b8e71] [VIEW_RENDER] themes/public/home
INFO - 2026-03-13 05:37:41 --> [REQ_ID=6ec9b34b8e71] [MEMORY][commonData:start] 8388608
INFO - 2026-03-13 05:37:41 --> themesMemory usage: 8388608
DEBUG - 2026-03-13 05:37:41 --> [MetaService] slug= pageName=Home cacheHit= path=DB
DEBUG - 2026-03-13 05:37:41 --> [REQ_ID=8532f7062e87] [FILTER_AFTER]
DEBUG - 2026-03-13 05:37:41 --> [REQ_ID=8532f7062e87] [LIFECYCLE][END] status=200 duration_ms=772.99 memory_delta=4194304
INFO - 2026-03-13 05:37:41 --> [REQ_ID=6ec9b34b8e71] [PERF] Execution time=0.770990
DEBUG - 2026-03-13 05:37:41 --> [REQ_ID=8532f7062e87] [REQUEST][END]
INFO - 2026-03-13 05:37:41 --> [REQ_ID=8532f7062e87] [PERF] Execution time=0.792136
DEBUG - 2026-03-13 05:41:22 --> [REQ_ID=feb4aed1a294] [REQUEST][START] HEAD /
DEBUG - 2026-03-13 05:41:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-13 05:41:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-13 05:41:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-13 05:41:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-13 05:41:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-13 05:46:22 --> [REQ_ID=6be3b91a5f08] [REQUEST][START] HEAD /
DEBUG - 2026-03-13 05:46:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-13 05:46:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-13 05:46:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-13 05:46:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-13 05:46:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-13 05:48:27 --> [REQ_ID=b6a80d1c4dea] [REQUEST][START] GET /
DEBUG - 2026-03-13 05:48:27 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-13 05:48:27 --> [REQ_ID=b6a80d1c4dea] [FILTER_BEFORE] /
DEBUG - 2026-03-13 05:48:27 --> [REQ_ID=b6a80d1c4dea] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-13 05:48:27 --> [REQ_ID=b6a80d1c4dea] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-13 05:48:27 --> [CSRF] token name=csrf_test_name hash=5f7d90caf89952148b836a9213680c67
DEBUG - 2026-03-13 05:48:27 --> [REQ_ID=98177cc8e783] [INIT] App\Controllers\Home::GET
INFO - 2026-03-13 05:48:27 --> [REQ_ID=98177cc8e783] [MEMORY][controller-start] 6291456
INFO - 2026-03-13 05:48:27 --> [REQ_ID=98177cc8e783] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-13 05:48:27 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-13 05:48:27 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
DEBUG - 2026-03-13 05:48:27 --> [REQ_ID=98177cc8e783] [VIEW_RENDER] themes/public/home
INFO - 2026-03-13 05:48:27 --> [REQ_ID=98177cc8e783] [MEMORY][commonData:start] 10485760
INFO - 2026-03-13 05:48:27 --> themesMemory usage: 10485760
DEBUG - 2026-03-13 05:48:27 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-13 05:48:27 --> [REQ_ID=b6a80d1c4dea] [FILTER_AFTER]
DEBUG - 2026-03-13 05:48:27 --> [REQ_ID=b6a80d1c4dea] [LIFECYCLE][END] status=200 duration_ms=729.57 memory_delta=4194304
INFO - 2026-03-13 05:48:27 --> [REQ_ID=98177cc8e783] [PERF] Execution time=0.727619
DEBUG - 2026-03-13 05:48:27 --> [REQ_ID=b6a80d1c4dea] [REQUEST][END]
INFO - 2026-03-13 05:48:27 --> [REQ_ID=b6a80d1c4dea] [PERF] Execution time=0.768632
DEBUG - 2026-03-13 05:51:22 --> [REQ_ID=149e5cf52785] [REQUEST][START] HEAD /
DEBUG - 2026-03-13 05:51:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-13 05:51:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-13 05:51:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-13 05:51:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-13 05:51:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-13 05:56:22 --> [REQ_ID=a500eb02e0f4] [REQUEST][START] HEAD /
DEBUG - 2026-03-13 05:56:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-13 05:56:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-13 05:56:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-13 05:56:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-13 05:56:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-13 05:58:28 --> [REQ_ID=887cef659645] [REQUEST][START] GET /index.php/Wallets/Purchase/Memberships
DEBUG - 2026-03-13 05:58:28 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-13 05:58:28 --> [REQ_ID=887cef659645] [FILTER_BEFORE] /index.php/Wallets/Purchase/Memberships
DEBUG - 2026-03-13 05:58:28 --> [REQ_ID=887cef659645] [ROUTE] Controller=\App\Modules\User\Controllers\WalletsController Method=purchase
DEBUG - 2026-03-13 05:58:28 --> [REQ_ID=887cef659645] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Wallets/Purchase/Memberships
DEBUG - 2026-03-13 05:58:28 --> [CSRF] token name=csrf_test_name hash=53769295f19833ee0ccf5dfcf48b30bb
DEBUG - 2026-03-13 05:58:28 --> [REQ_ID=887cef659645] [REQUEST][END]
INFO - 2026-03-13 05:58:28 --> [REQ_ID=887cef659645] [PERF] Execution time=0.060050
DEBUG - 2026-03-13 05:58:28 --> [REQ_ID=959a32cf478a] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-13 05:58:28 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-13 05:58:28 --> [REQ_ID=959a32cf478a] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-13 05:58:28 --> [REQ_ID=959a32cf478a] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-13 05:58:28 --> [REQ_ID=959a32cf478a] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-13 05:58:28 --> [CSRF] token name=csrf_test_name hash=78370d3408a08aeb0973e9fcca8d1c93
DEBUG - 2026-03-13 05:58:28 --> [REQ_ID=839b566f19d9] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-13 05:58:28 --> [REQ_ID=839b566f19d9] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-13 05:58:28 --> [REQ_ID=959a32cf478a] [FILTER_AFTER]
DEBUG - 2026-03-13 05:58:28 --> [REQ_ID=959a32cf478a] [LIFECYCLE][END] status=200 duration_ms=218.62 memory_delta=0
INFO - 2026-03-13 05:58:28 --> [REQ_ID=839b566f19d9] [PERF] Execution time=0.218575
DEBUG - 2026-03-13 05:58:28 --> [REQ_ID=959a32cf478a] [REQUEST][END]
INFO - 2026-03-13 05:58:28 --> [REQ_ID=959a32cf478a] [PERF] Execution time=0.231717
DEBUG - 2026-03-13 06:00:01 --> [REQ_ID=7ba31ad593e2] [REQUEST][START] GET /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-13 06:00:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-13 06:00:01 --> [REQ_ID=7ba31ad593e2] [FILTER_BEFORE] /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-13 06:00:01 --> [REQ_ID=7ba31ad593e2] [ROUTE] Controller=\App\Modules\Management\Controllers\ManagementAPIController Method=Run_CRON_Tasks
DEBUG - 2026-03-13 06:00:01 --> [REQ_ID=7ba31ad593e2] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-13 06:00:01 --> [REQ_ID=7ba31ad593e2] [REQUEST][END]
INFO - 2026-03-13 06:00:01 --> [REQ_ID=7ba31ad593e2] [PERF] Execution time=0.050122
DEBUG - 2026-03-13 06:00:41 --> [REQ_ID=270488fb60f7] [REQUEST][START] GET /
DEBUG - 2026-03-13 06:00:41 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-13 06:00:41 --> [REQ_ID=270488fb60f7] [REQUEST][END]
INFO - 2026-03-13 06:00:41 --> [REQ_ID=270488fb60f7] [PERF] Execution time=0.013558
DEBUG - 2026-03-13 06:01:22 --> [REQ_ID=db61ad315b0a] [REQUEST][START] HEAD /
DEBUG - 2026-03-13 06:01:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-13 06:01:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-13 06:01:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-13 06:01:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-13 06:01:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-13 06:06:22 --> [REQ_ID=04220d42ff01] [REQUEST][START] HEAD /
DEBUG - 2026-03-13 06:06:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-13 06:06:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-13 06:06:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-13 06:06:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-13 06:06:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-13 06:11:22 --> [REQ_ID=555c4abaf801] [REQUEST][START] HEAD /
DEBUG - 2026-03-13 06:11:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-13 06:11:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-13 06:11:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-13 06:11:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-13 06:11:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-13 06:15:02 --> [REQ_ID=cb63e5e4c649] [REQUEST][START] GET /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-13 06:15:02 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-13 06:15:02 --> [REQ_ID=cb63e5e4c649] [FILTER_BEFORE] /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-13 06:15:02 --> [REQ_ID=cb63e5e4c649] [ROUTE] Controller=\App\Modules\APIs\Controllers\AlertsAPIController Method=fetchEmailAlerts
DEBUG - 2026-03-13 06:15:02 --> [REQ_ID=cb63e5e4c649] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-13 06:15:02 --> [REQ_ID=cb63e5e4c649] [REQUEST][END]
INFO - 2026-03-13 06:15:02 --> [REQ_ID=cb63e5e4c649] [PERF] Execution time=0.046637
DEBUG - 2026-03-13 06:16:22 --> [REQ_ID=e170faba9efb] [REQUEST][START] HEAD /
DEBUG - 2026-03-13 06:16:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-13 06:16:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-13 06:16:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-13 06:16:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-13 06:16:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-13 06:21:22 --> [REQ_ID=e0dd3575ccf2] [REQUEST][START] HEAD /
DEBUG - 2026-03-13 06:21:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-13 06:21:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-13 06:21:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-13 06:21:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-13 06:21:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-13 06:26:22 --> [REQ_ID=bf3c1d08f514] [REQUEST][START] HEAD /
DEBUG - 2026-03-13 06:26:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-13 06:26:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-13 06:26:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-13 06:26:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-13 06:26:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-13 06:31:22 --> [REQ_ID=96c25c9846eb] [REQUEST][START] HEAD /
DEBUG - 2026-03-13 06:31:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-13 06:31:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-13 06:31:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-13 06:31:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-13 06:31:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-13 06:36:22 --> [REQ_ID=78c0b9dae8b2] [REQUEST][START] HEAD /
DEBUG - 2026-03-13 06:36:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-13 06:36:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-13 06:36:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-13 06:36:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-13 06:36:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-13 06:41:22 --> [REQ_ID=0850e5499b0b] [REQUEST][START] HEAD /
DEBUG - 2026-03-13 06:41:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-13 06:41:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-13 06:41:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-13 06:41:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-13 06:41:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-13 06:44:42 --> [REQ_ID=ace9880aa40a] [REQUEST][START] GET /index.php/Management/Assets
DEBUG - 2026-03-13 06:44:42 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-13 06:44:42 --> [REQ_ID=ace9880aa40a] [REQUEST][END]
INFO - 2026-03-13 06:44:42 --> [REQ_ID=ace9880aa40a] [PERF] Execution time=0.047584
DEBUG - 2026-03-13 06:46:22 --> [REQ_ID=48ba54842fe6] [REQUEST][START] HEAD /
DEBUG - 2026-03-13 06:46:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-13 06:46:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-13 06:46:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-13 06:46:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-13 06:46:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-13 06:51:22 --> [REQ_ID=029afa8743fa] [REQUEST][START] HEAD /
DEBUG - 2026-03-13 06:51:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-13 06:51:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-13 06:51:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-13 06:51:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-13 06:51:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-13 06:56:22 --> [REQ_ID=c133620ade46] [REQUEST][START] HEAD /
DEBUG - 2026-03-13 06:56:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-13 06:56:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-13 06:56:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-13 06:56:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-13 06:56:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-13 07:00:01 --> [REQ_ID=c766cf8901d9] [REQUEST][START] GET /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-13 07:00:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
INFO - 2026-03-13 07:00:01 --> [SPARK_START] App\Commands\AIOps\Run
INFO - 2026-03-13 07:00:01 --> [SPARK_MEMORY] 18874368
INFO - 2026-03-13 07:00:01 --> [spark:aiops:run] Intent
DEBUG - 2026-03-13 07:00:01 --> [REQ_ID=c766cf8901d9] [FILTER_BEFORE] /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-13 07:00:01 --> [REQ_ID=c766cf8901d9] [ROUTE] Controller=\App\Modules\Management\Controllers\ManagementAPIController Method=Run_CRON_Tasks
DEBUG - 2026-03-13 07:00:01 --> [REQ_ID=c766cf8901d9] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Management/Run-CRON-Tasks
INFO - 2026-03-13 07:00:01 --> [spark:ops:work] Started
INFO - 2026-03-13 07:00:01 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-03-13 07:00:01 --> [SPARK_MEMORY] 18874368
INFO - 2026-03-13 07:00:01 --> [spark:ops:work] Intent
DEBUG - 2026-03-13 07:00:01 --> [REQ_ID=c766cf8901d9] [REQUEST][END]
INFO - 2026-03-13 07:00:01 --> [REQ_ID=c766cf8901d9] [PERF] Execution time=0.127342
INFO - 2026-03-13 07:00:01 --> [spark:ops:work] Completed
INFO - 2026-03-13 07:00:01 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.038030
INFO - 2026-03-13 07:00:01 --> [SPARK_MEMORY] 18874368
INFO - 2026-03-13 07:00:03 --> [AIOPS][SPARK][GOVERNANCE][spark:logs:summarize] Started
INFO - 2026-03-13 07:00:03 --> [SPARK_START] App\Commands\Logs\Summarize
INFO - 2026-03-13 07:00:03 --> [SPARK_MEMORY] 18874368
INFO - 2026-03-13 07:00:03 --> [spark:logs:summarize] Intent
INFO - 2026-03-13 07:00:03 --> [AIOPS][SPARK][GOVERNANCE][spark:logs:summarize] Completed
INFO - 2026-03-13 07:00:03 --> [SPARK_COMPLETE] App\Commands\Logs\Summarize duration=0.005606
INFO - 2026-03-13 07:00:03 --> [SPARK_MEMORY] 18874368
INFO - 2026-03-13 07:00:03 --> [spark:app:healthcheck] Started
INFO - 2026-03-13 07:00:03 --> [SPARK_START] App\Commands\App\Healthcheck
INFO - 2026-03-13 07:00:03 --> [SPARK_MEMORY] 18874368
INFO - 2026-03-13 07:00:03 --> [spark:app:healthcheck] Intent
DEBUG - 2026-03-13 07:00:03 --> LOG_HEALTHCHECK debug marker=6d1ed34e6ffc
INFO - 2026-03-13 07:00:03 --> LOG_HEALTHCHECK info marker=6d1ed34e6ffc
NOTICE - 2026-03-13 07:00:03 --> LOG_HEALTHCHECK probe marker=6d1ed34e6ffc
INFO - 2026-03-13 07:00:03 --> [spark:app:healthcheck] Completed
INFO - 2026-03-13 07:00:03 --> [SPARK_COMPLETE] App\Commands\App\Healthcheck duration=0.115472
INFO - 2026-03-13 07:00:03 --> [SPARK_MEMORY] 18874368
INFO - 2026-03-13 07:00:03 --> [SPARK_COMPLETE] App\Commands\AIOps\Run duration=1.902902
INFO - 2026-03-13 07:00:03 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-03-13 07:01:22 --> [REQ_ID=c810c0fc61cc] [REQUEST][START] HEAD /
DEBUG - 2026-03-13 07:01:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-13 07:01:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-13 07:01:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-13 07:01:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-13 07:01:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-13 07:06:22 --> [REQ_ID=76714ee5a489] [REQUEST][START] HEAD /
DEBUG - 2026-03-13 07:06:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-13 07:06:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-13 07:06:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-13 07:06:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-13 07:06:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-13 07:11:22 --> [REQ_ID=c1b4e51dcd3b] [REQUEST][START] HEAD /
DEBUG - 2026-03-13 07:11:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-13 07:11:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-13 07:11:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-13 07:11:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-13 07:11:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-13 07:15:01 --> [REQ_ID=76544bc9066f] [REQUEST][START] GET /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-13 07:15:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-13 07:15:01 --> [REQ_ID=76544bc9066f] [FILTER_BEFORE] /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-13 07:15:01 --> [REQ_ID=76544bc9066f] [ROUTE] Controller=\App\Modules\APIs\Controllers\AlertsAPIController Method=fetchEmailAlerts
DEBUG - 2026-03-13 07:15:01 --> [REQ_ID=76544bc9066f] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-13 07:15:01 --> [REQ_ID=76544bc9066f] [REQUEST][END]
INFO - 2026-03-13 07:15:01 --> [REQ_ID=76544bc9066f] [PERF] Execution time=0.053571
DEBUG - 2026-03-13 07:16:22 --> [REQ_ID=2e0989dba005] [REQUEST][START] HEAD /
DEBUG - 2026-03-13 07:16:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-13 07:16:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-13 07:16:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-13 07:16:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-13 07:16:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-13 07:21:22 --> [REQ_ID=363118072948] [REQUEST][START] HEAD /
DEBUG - 2026-03-13 07:21:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-13 07:21:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-13 07:21:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-13 07:21:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-13 07:21:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-13 07:26:22 --> [REQ_ID=e50b0667475c] [REQUEST][START] HEAD /
DEBUG - 2026-03-13 07:26:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-13 07:26:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-13 07:26:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-13 07:26:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-13 07:26:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-13 07:27:18 --> [REQ_ID=7bd92d416649] [REQUEST][START] HEAD /
DEBUG - 2026-03-13 07:27:18 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-13 07:27:18 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-13 07:27:18 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-13 07:27:18 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-13 07:27:18 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: none
DEBUG - 2026-03-13 07:30:13 --> [REQ_ID=6cc714087878] [REQUEST][START] GET /
DEBUG - 2026-03-13 07:30:13 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-13 07:30:13 --> [REQ_ID=6cc714087878] [FILTER_BEFORE] /
DEBUG - 2026-03-13 07:30:13 --> [REQ_ID=6cc714087878] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-13 07:30:13 --> [REQ_ID=6cc714087878] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-13 07:30:13 --> [CSRF] token name=csrf_test_name hash=2fba43fd1319a63f905ce0153d9d102e
DEBUG - 2026-03-13 07:30:13 --> [REQ_ID=7460a1746c69] [INIT] App\Controllers\Home::GET
INFO - 2026-03-13 07:30:13 --> [REQ_ID=7460a1746c69] [MEMORY][controller-start] 6291456
INFO - 2026-03-13 07:30:13 --> [REQ_ID=7460a1746c69] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-13 07:30:13 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-13 07:30:14 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-03-13 07:30:14 --> [REQ_ID=7460a1746c69] [VIEW_RENDER] themes/public/home
INFO - 2026-03-13 07:30:14 --> [REQ_ID=7460a1746c69] [MEMORY][commonData:start] 10485760
INFO - 2026-03-13 07:30:14 --> themesMemory usage: 10485760
DEBUG - 2026-03-13 07:30:14 --> [MetaService] slug= pageName=Home cacheHit= path=DB
DEBUG - 2026-03-13 07:30:14 --> [REQ_ID=6cc714087878] [FILTER_AFTER]
DEBUG - 2026-03-13 07:30:14 --> [REQ_ID=6cc714087878] [LIFECYCLE][END] status=200 duration_ms=726.18 memory_delta=4194304
INFO - 2026-03-13 07:30:14 --> [REQ_ID=7460a1746c69] [PERF] Execution time=0.724149
DEBUG - 2026-03-13 07:30:14 --> [REQ_ID=6cc714087878] [REQUEST][END]
INFO - 2026-03-13 07:30:14 --> [REQ_ID=6cc714087878] [PERF] Execution time=0.766574
DEBUG - 2026-03-13 07:31:22 --> [REQ_ID=3fcce81528b4] [REQUEST][START] HEAD /
DEBUG - 2026-03-13 07:31:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-13 07:31:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-13 07:31:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-13 07:31:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-13 07:31:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-13 07:32:45 --> [REQ_ID=9cc0763ce539] [REQUEST][START] GET /
DEBUG - 2026-03-13 07:32:45 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-13 07:32:45 --> [REQ_ID=9cc0763ce539] [FILTER_BEFORE] /
DEBUG - 2026-03-13 07:32:45 --> [REQ_ID=9cc0763ce539] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-13 07:32:45 --> [REQ_ID=9cc0763ce539] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-13 07:32:45 --> [CSRF] token name=csrf_test_name hash=5009a2b74261766bbf9e853ec6343b28
DEBUG - 2026-03-13 07:32:45 --> [REQ_ID=03576063e46b] [INIT] App\Controllers\Home::GET
INFO - 2026-03-13 07:32:45 --> [REQ_ID=03576063e46b] [MEMORY][controller-start] 6291456
INFO - 2026-03-13 07:32:45 --> [REQ_ID=03576063e46b] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-13 07:32:45 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-13 07:32:45 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
DEBUG - 2026-03-13 07:32:45 --> [REQ_ID=03576063e46b] [VIEW_RENDER] themes/public/home
INFO - 2026-03-13 07:32:45 --> [REQ_ID=03576063e46b] [MEMORY][commonData:start] 10485760
INFO - 2026-03-13 07:32:45 --> themesMemory usage: 10485760
DEBUG - 2026-03-13 07:32:45 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-13 07:32:45 --> [REQ_ID=9cc0763ce539] [FILTER_AFTER]
DEBUG - 2026-03-13 07:32:45 --> [REQ_ID=9cc0763ce539] [LIFECYCLE][END] status=200 duration_ms=667.17 memory_delta=4194304
INFO - 2026-03-13 07:32:45 --> [REQ_ID=03576063e46b] [PERF] Execution time=0.665140
DEBUG - 2026-03-13 07:32:45 --> [REQ_ID=9cc0763ce539] [REQUEST][END]
INFO - 2026-03-13 07:32:45 --> [REQ_ID=9cc0763ce539] [PERF] Execution time=0.706381
DEBUG - 2026-03-13 07:36:22 --> [REQ_ID=853245ed4dba] [REQUEST][START] HEAD /
DEBUG - 2026-03-13 07:36:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-13 07:36:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-13 07:36:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-13 07:36:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-13 07:36:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-13 07:41:22 --> [REQ_ID=91798736f8fe] [REQUEST][START] HEAD /
DEBUG - 2026-03-13 07:41:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-13 07:41:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-13 07:41:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-13 07:41:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-13 07:41:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-13 07:46:22 --> [REQ_ID=ad4762a116a6] [REQUEST][START] HEAD /
DEBUG - 2026-03-13 07:46:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-13 07:46:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-13 07:46:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-13 07:46:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-13 07:46:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-13 07:51:22 --> [REQ_ID=f42f2c08f727] [REQUEST][START] HEAD /
DEBUG - 2026-03-13 07:51:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-13 07:51:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-13 07:51:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-13 07:51:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-13 07:51:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-13 07:56:22 --> [REQ_ID=493a9806cb3d] [REQUEST][START] HEAD /
DEBUG - 2026-03-13 07:56:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-13 07:56:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-13 07:56:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-13 07:56:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-13 07:56:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-13 07:56:39 --> [REQ_ID=4c0b59740e51] [REQUEST][START] GET /
DEBUG - 2026-03-13 07:56:39 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-13 07:56:39 --> [REQ_ID=4c0b59740e51] [FILTER_BEFORE] /
DEBUG - 2026-03-13 07:56:39 --> [REQ_ID=4c0b59740e51] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-13 07:56:39 --> [REQ_ID=4c0b59740e51] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-13 07:56:39 --> [CSRF] token name=csrf_test_name hash=e80582039e7d13501fd465c7b0b247a4
DEBUG - 2026-03-13 07:56:39 --> [REQ_ID=e27a5193fe68] [INIT] App\Controllers\Home::GET
INFO - 2026-03-13 07:56:39 --> [REQ_ID=e27a5193fe68] [MEMORY][controller-start] 4194304
INFO - 2026-03-13 07:56:40 --> [REQ_ID=e27a5193fe68] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-13 07:56:40 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-13 07:56:40 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-03-13 07:56:40 --> [REQ_ID=e27a5193fe68] [VIEW_RENDER] themes/public/home
INFO - 2026-03-13 07:56:40 --> [REQ_ID=e27a5193fe68] [MEMORY][commonData:start] 8388608
INFO - 2026-03-13 07:56:40 --> themesMemory usage: 8388608
DEBUG - 2026-03-13 07:56:40 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-13 07:56:40 --> [REQ_ID=4c0b59740e51] [FILTER_AFTER]
DEBUG - 2026-03-13 07:56:40 --> [REQ_ID=4c0b59740e51] [LIFECYCLE][END] status=200 duration_ms=836.47 memory_delta=4194304
INFO - 2026-03-13 07:56:40 --> [REQ_ID=e27a5193fe68] [PERF] Execution time=0.834159
DEBUG - 2026-03-13 07:56:40 --> [REQ_ID=4c0b59740e51] [REQUEST][END]
INFO - 2026-03-13 07:56:40 --> [REQ_ID=4c0b59740e51] [PERF] Execution time=0.856254
DEBUG - 2026-03-13 08:00:01 --> [REQ_ID=452c316a7fa5] [REQUEST][START] GET /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-13 08:00:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-13 08:00:01 --> [REQ_ID=452c316a7fa5] [FILTER_BEFORE] /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-13 08:00:01 --> [REQ_ID=452c316a7fa5] [ROUTE] Controller=\App\Modules\Management\Controllers\ManagementAPIController Method=Run_CRON_Tasks
DEBUG - 2026-03-13 08:00:01 --> [REQ_ID=452c316a7fa5] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-13 08:00:01 --> [REQ_ID=452c316a7fa5] [REQUEST][END]
INFO - 2026-03-13 08:00:01 --> [REQ_ID=452c316a7fa5] [PERF] Execution time=0.042630
DEBUG - 2026-03-13 08:01:22 --> [REQ_ID=3a1eba0024a3] [REQUEST][START] HEAD /
DEBUG - 2026-03-13 08:01:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-13 08:01:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-13 08:01:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-13 08:01:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-13 08:01:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-13 08:01:22 --> [REQ_ID=ed5218a8f06c] [REQUEST][START] GET /
DEBUG - 2026-03-13 08:01:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-13 08:01:22 --> [REQ_ID=ed5218a8f06c] [FILTER_BEFORE] /
DEBUG - 2026-03-13 08:01:22 --> [REQ_ID=ed5218a8f06c] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-13 08:01:22 --> [REQ_ID=ed5218a8f06c] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-13 08:01:22 --> [CSRF] token name=csrf_test_name hash=69f9cf7bedfc358529d24d0d3c4da80c
DEBUG - 2026-03-13 08:01:22 --> [REQ_ID=f4baf276a2cc] [INIT] App\Controllers\Home::GET
INFO - 2026-03-13 08:01:22 --> [REQ_ID=f4baf276a2cc] [MEMORY][controller-start] 4194304
INFO - 2026-03-13 08:01:22 --> [REQ_ID=f4baf276a2cc] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-13 08:01:22 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-13 08:01:23 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
DEBUG - 2026-03-13 08:01:23 --> [REQ_ID=f4baf276a2cc] [VIEW_RENDER] themes/public/home
INFO - 2026-03-13 08:01:23 --> [REQ_ID=f4baf276a2cc] [MEMORY][commonData:start] 8388608
INFO - 2026-03-13 08:01:23 --> themesMemory usage: 8388608
DEBUG - 2026-03-13 08:01:23 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-13 08:01:23 --> [REQ_ID=ed5218a8f06c] [FILTER_AFTER]
DEBUG - 2026-03-13 08:01:23 --> [REQ_ID=ed5218a8f06c] [LIFECYCLE][END] status=200 duration_ms=681.39 memory_delta=4194304
INFO - 2026-03-13 08:01:23 --> [REQ_ID=f4baf276a2cc] [PERF] Execution time=0.680035
DEBUG - 2026-03-13 08:01:23 --> [REQ_ID=ed5218a8f06c] [REQUEST][END]
INFO - 2026-03-13 08:01:23 --> [REQ_ID=ed5218a8f06c] [PERF] Execution time=0.694387
DEBUG - 2026-03-13 08:01:29 --> [REQ_ID=0fdb66efc13e] [REQUEST][START] POST /index.php/register
DEBUG - 2026-03-13 08:01:29 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-13 08:01:29 --> [REQ_ID=0fdb66efc13e] [FILTER_BEFORE] /index.php/register
DEBUG - 2026-03-13 08:01:29 --> [REQ_ID=0fdb66efc13e] [ROUTE] Controller=\App\Controllers\AuthController Method=attemptRegister
DEBUG - 2026-03-13 08:01:29 --> [REQ_ID=0fdb66efc13e] [LIFECYCLE][START] POST https://www.mymiwallet.com/index.php/register
DEBUG - 2026-03-13 08:01:29 --> [CSRF] token name=csrf_test_name hash=69f9cf7bedfc358529d24d0d3c4da80c
INFO - 2026-03-13 08:01:29 --> CSRF token verified.
DEBUG - 2026-03-13 08:01:29 --> [REQ_ID=15aaca16fccc] [INIT] App\Controllers\AuthController::POST
INFO - 2026-03-13 08:01:29 --> [REQ_ID=15aaca16fccc] [MEMORY][controller-start] 6291456
INFO - 2026-03-13 08:01:29 --> [REGISTRATION] Submission received
INFO - 2026-03-13 08:01:29 --> MailService queued email
INFO - 2026-03-13 08:01:30 --> [REGISTRATION] Validation passed (basic fields)
INFO - 2026-03-13 08:01:30 --> [REGISTRATION] Validation passed (password fields)
INFO - 2026-03-13 08:01:30 --> Registration created user_id=11723, email=rhkassam@me.com, username=tMiCFuEkHTsyXqrUiYTrv, active=, requiresActivation=1, loginIdentifier=username
INFO - 2026-03-13 08:01:30 --> [REGISTRATION] User record created
INFO - 2026-03-13 08:01:30 --> OnboardingProgressService: created onboarding record for user_id=11723
INFO - 2026-03-13 08:01:31 --> Registration succeeded for rhkassam@me.com (event e86ca7d7e3afcd07)
INFO - 2026-03-13 08:01:31 --> [REGISTRATION] Activation email queued
INFO - 2026-03-13 08:01:31 --> Registration redirecting to success guide for user_id=11723
DEBUG - 2026-03-13 08:01:31 --> [REQ_ID=0fdb66efc13e] [FILTER_AFTER]
DEBUG - 2026-03-13 08:01:31 --> [REQ_ID=0fdb66efc13e] [LIFECYCLE][END] status=303 duration_ms=1,202.53 memory_delta=0
INFO - 2026-03-13 08:01:31 --> [REQ_ID=15aaca16fccc] [PERF] Execution time=1.202155
DEBUG - 2026-03-13 08:01:31 --> [REQ_ID=0fdb66efc13e] [REQUEST][END]
INFO - 2026-03-13 08:01:31 --> [REQ_ID=0fdb66efc13e] [PERF] Execution time=1.216151
DEBUG - 2026-03-13 08:01:31 --> [REQ_ID=da5c2dfdc5b8] [REQUEST][START] GET /index.php/register/success
DEBUG - 2026-03-13 08:01:31 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-13 08:01:31 --> [REQ_ID=da5c2dfdc5b8] [FILTER_BEFORE] /index.php/register/success
DEBUG - 2026-03-13 08:01:31 --> [REQ_ID=da5c2dfdc5b8] [ROUTE] Controller=\App\Controllers\AuthController Method=registerSuccess
DEBUG - 2026-03-13 08:01:31 --> [REQ_ID=da5c2dfdc5b8] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/register/success
DEBUG - 2026-03-13 08:01:31 --> [CSRF] token name=csrf_test_name hash=69f9cf7bedfc358529d24d0d3c4da80c
DEBUG - 2026-03-13 08:01:31 --> [REQ_ID=a9ee6ca5cee1] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-13 08:01:31 --> [REQ_ID=a9ee6ca5cee1] [MEMORY][controller-start] 4194304
INFO - 2026-03-13 08:01:31 --> AuthController::registerSuccess view rendered.
INFO - 2026-03-13 08:01:31 --> [REQ_ID=a9ee6ca5cee1] [PERF] Execution time=0.081787
DEBUG - 2026-03-13 08:01:43 --> [REQ_ID=b581b1cc2e56] [REQUEST][START] GET /index.php/How-It-Works/Investor-Profile
DEBUG - 2026-03-13 08:01:43 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-13 08:01:43 --> [REQ_ID=b581b1cc2e56] [FILTER_BEFORE] /index.php/How-It-Works/Investor-Profile
DEBUG - 2026-03-13 08:01:43 --> [REQ_ID=b581b1cc2e56] [ROUTE] Controller=\App\Modules\Blog\Controllers\HowItWorksController Method=show
DEBUG - 2026-03-13 08:01:43 --> [REQ_ID=b581b1cc2e56] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/How-It-Works/Investor-Profile
DEBUG - 2026-03-13 08:01:43 --> [CSRF] token name=csrf_test_name hash=69f9cf7bedfc358529d24d0d3c4da80c
DEBUG - 2026-03-13 08:01:43 --> [REQ_ID=240e0f40c362] [INIT] App\Modules\Blog\Controllers\HowItWorksController::GET
INFO - 2026-03-13 08:01:43 --> [REQ_ID=240e0f40c362] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-13 08:01:43 --> [REQ_ID=240e0f40c362] [METHOD_ENTRY] show
DEBUG - 2026-03-13 08:01:43 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-13 08:01:43 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-13 08:01:43 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-13 08:01:43 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-13 08:01:43 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-13 08:01:43 --> MyMICoin: guest context detected; skipping user-specific preload.
ERROR - 2026-03-13 08:01:43 --> HowItWorksController failure: investor-profile
CRITICAL - 2026-03-13 08:01:43 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: GET, Route: How-It-Works/Investor-Profile]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-13 08:01:43 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-13 08:01:43 --> [404] URI=https://www.mymiwallet.com/index.php/How-It-Works/Investor-Profile
WARNING - 2026-03-13 08:01:43 --> 404 route miss: https://www.mymiwallet.com/index.php/How-It-Works/Investor-Profile | referrer: none
ERROR - 2026-03-13 08:01:43 --> [ERROR_PAGE] event=error_404 status=404 message=Page not found.
INFO - 2026-03-13 08:01:43 --> [REQ_ID=240e0f40c362] [PERF] Execution time=0.199569
DEBUG - 2026-03-13 08:01:47 --> [REQ_ID=1281f4ef1086] [REQUEST][START] GET /index.php/How-It-Works/Registering-An-Account
DEBUG - 2026-03-13 08:01:47 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-13 08:01:47 --> [REQ_ID=1281f4ef1086] [FILTER_BEFORE] /index.php/How-It-Works/Registering-An-Account
DEBUG - 2026-03-13 08:01:47 --> [REQ_ID=1281f4ef1086] [ROUTE] Controller=\App\Modules\Blog\Controllers\HowItWorksController Method=show
DEBUG - 2026-03-13 08:01:47 --> [REQ_ID=1281f4ef1086] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/How-It-Works/Registering-An-Account
DEBUG - 2026-03-13 08:01:47 --> [CSRF] token name=csrf_test_name hash=69f9cf7bedfc358529d24d0d3c4da80c
DEBUG - 2026-03-13 08:01:47 --> [REQ_ID=cb908aa179c9] [INIT] App\Modules\Blog\Controllers\HowItWorksController::GET
INFO - 2026-03-13 08:01:47 --> [REQ_ID=cb908aa179c9] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-13 08:01:47 --> [REQ_ID=cb908aa179c9] [METHOD_ENTRY] show
DEBUG - 2026-03-13 08:01:47 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-13 08:01:47 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-13 08:01:47 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-13 08:01:47 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-13 08:01:47 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-13 08:01:47 --> MyMICoin: guest context detected; skipping user-specific preload.
ERROR - 2026-03-13 08:01:47 --> HowItWorksController failure: Call to undefined method App\Modules\Blog\Controllers\HowItWorksController::respondWithRendered()
INFO - 2026-03-13 08:01:47 --> [REQ_ID=cb908aa179c9] [PERF] Execution time=0.026637
DEBUG - 2026-03-13 08:01:52 --> [REQ_ID=059ad51ada7d] [REQUEST][START] GET /index.php/Free/register
DEBUG - 2026-03-13 08:01:52 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-13 08:01:52 --> [REQ_ID=059ad51ada7d] [FILTER_BEFORE] /index.php/Free/register
DEBUG - 2026-03-13 08:01:52 --> [REQ_ID=059ad51ada7d] [ROUTE] Controller=\App\Controllers\AuthController Method=register
DEBUG - 2026-03-13 08:01:52 --> [REQ_ID=059ad51ada7d] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Free/register
DEBUG - 2026-03-13 08:01:52 --> [CSRF] token name=csrf_test_name hash=69f9cf7bedfc358529d24d0d3c4da80c
DEBUG - 2026-03-13 08:01:52 --> [REQ_ID=059ad51ada7d] [REQUEST][END]
INFO - 2026-03-13 08:01:52 --> [REQ_ID=059ad51ada7d] [PERF] Execution time=0.009876
DEBUG - 2026-03-13 08:01:53 --> [REQ_ID=b07971757a15] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-13 08:01:53 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-13 08:01:53 --> [REQ_ID=b07971757a15] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-13 08:01:53 --> [REQ_ID=b07971757a15] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-13 08:01:53 --> [REQ_ID=b07971757a15] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-13 08:01:53 --> [CSRF] token name=csrf_test_name hash=69f9cf7bedfc358529d24d0d3c4da80c
DEBUG - 2026-03-13 08:01:53 --> [REQ_ID=30f286bd22e3] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-13 08:01:53 --> [REQ_ID=30f286bd22e3] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-13 08:01:53 --> [REQ_ID=b07971757a15] [FILTER_AFTER]
DEBUG - 2026-03-13 08:01:53 --> [REQ_ID=b07971757a15] [LIFECYCLE][END] status=200 duration_ms=32.82 memory_delta=0
INFO - 2026-03-13 08:01:53 --> [REQ_ID=30f286bd22e3] [PERF] Execution time=0.032692
DEBUG - 2026-03-13 08:01:53 --> [REQ_ID=b07971757a15] [REQUEST][END]
INFO - 2026-03-13 08:01:53 --> [REQ_ID=b07971757a15] [PERF] Execution time=0.043125
DEBUG - 2026-03-13 08:02:04 --> [REQ_ID=fe268ce07d54] [REQUEST][START] POST /index.php/login
DEBUG - 2026-03-13 08:02:04 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-13 08:02:04 --> [REQ_ID=fe268ce07d54] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-13 08:02:04 --> [REQ_ID=fe268ce07d54] [ROUTE] Controller=\App\Controllers\AuthController Method=attemptLogin
DEBUG - 2026-03-13 08:02:04 --> [REQ_ID=fe268ce07d54] [LIFECYCLE][START] POST https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-13 08:02:04 --> [CSRF] token name=csrf_test_name hash=69f9cf7bedfc358529d24d0d3c4da80c
INFO - 2026-03-13 08:02:04 --> CSRF token verified.
DEBUG - 2026-03-13 08:02:04 --> [REQ_ID=774b0d724ad8] [INIT] App\Controllers\AuthController::POST
INFO - 2026-03-13 08:02:04 --> [REQ_ID=774b0d724ad8] [MEMORY][controller-start] 4194304
INFO - 2026-03-13 08:02:04 --> AuthController L93: Auth:attemptLogin started.
INFO - 2026-03-13 08:02:04 --> AuthController L104: Auth:attemptLogin rules: {"login":"required","password":"required"}
INFO - 2026-03-13 08:02:04 --> AuthController L132: Auth:attemptLogin Login Variables: login: required, remember: true, ip: 38.135.25.140, ua: "Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36"
DEBUG - 2026-03-13 08:02:04 --> Auth attemptLogin() called with login identifier: rhkassam@me.com, remember: true
DEBUG - 2026-03-13 08:02:04 --> Auth attemptLogin() called. redirect_url in session: https://www.mymiwallet.com/index.php/Free/register
DEBUG - 2026-03-13 08:02:04 --> Auth credentials normalised for attempt using key "email"
WARNING - 2026-03-13 08:02:04 --> [AUTH_FAILURE] 
DEBUG - 2026-03-13 08:02:04 --> Auth attempt failed for identifier rhkassam@me.com. Error: Unable to log you in. Please check your password.
WARNING - 2026-03-13 08:02:04 --> [AUTH] Login failure
WARNING - 2026-03-13 08:02:04 --> [AUTH] Login failed
DEBUG - 2026-03-13 08:02:04 --> [REQ_ID=fe268ce07d54] [FILTER_AFTER]
DEBUG - 2026-03-13 08:02:04 --> [REQ_ID=fe268ce07d54] [LIFECYCLE][END] status=303 duration_ms=216.63 memory_delta=0
INFO - 2026-03-13 08:02:04 --> [REQ_ID=774b0d724ad8] [PERF] Execution time=0.216427
DEBUG - 2026-03-13 08:02:04 --> [REQ_ID=fe268ce07d54] [REQUEST][END]
INFO - 2026-03-13 08:02:04 --> [REQ_ID=fe268ce07d54] [PERF] Execution time=0.227314
DEBUG - 2026-03-13 08:02:05 --> [REQ_ID=73e65cf2cfa7] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-13 08:02:05 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-13 08:02:05 --> [REQ_ID=73e65cf2cfa7] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-13 08:02:05 --> [REQ_ID=73e65cf2cfa7] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-13 08:02:05 --> [REQ_ID=73e65cf2cfa7] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-13 08:02:05 --> [CSRF] token name=csrf_test_name hash=69f9cf7bedfc358529d24d0d3c4da80c
DEBUG - 2026-03-13 08:02:05 --> [REQ_ID=6c79b9ebaa3f] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-13 08:02:05 --> [REQ_ID=6c79b9ebaa3f] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-13 08:02:05 --> [REQ_ID=73e65cf2cfa7] [FILTER_AFTER]
DEBUG - 2026-03-13 08:02:05 --> [REQ_ID=73e65cf2cfa7] [LIFECYCLE][END] status=200 duration_ms=19.67 memory_delta=0
INFO - 2026-03-13 08:02:05 --> [REQ_ID=6c79b9ebaa3f] [PERF] Execution time=0.019530
DEBUG - 2026-03-13 08:02:05 --> [REQ_ID=73e65cf2cfa7] [REQUEST][END]
INFO - 2026-03-13 08:02:05 --> [REQ_ID=73e65cf2cfa7] [PERF] Execution time=0.028721
DEBUG - 2026-03-13 08:02:19 --> [REQ_ID=8098f295358b] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-13 08:02:19 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-13 08:02:19 --> [REQ_ID=8098f295358b] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-13 08:02:19 --> [REQ_ID=8098f295358b] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-13 08:02:19 --> [REQ_ID=8098f295358b] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-13 08:02:19 --> [CSRF] token name=csrf_test_name hash=69f9cf7bedfc358529d24d0d3c4da80c
DEBUG - 2026-03-13 08:02:19 --> [REQ_ID=b29267d0f226] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-13 08:02:19 --> [REQ_ID=b29267d0f226] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-13 08:02:19 --> [REQ_ID=8098f295358b] [FILTER_AFTER]
DEBUG - 2026-03-13 08:02:19 --> [REQ_ID=8098f295358b] [LIFECYCLE][END] status=200 duration_ms=125.27 memory_delta=0
INFO - 2026-03-13 08:02:19 --> [REQ_ID=b29267d0f226] [PERF] Execution time=0.125123
DEBUG - 2026-03-13 08:02:19 --> [REQ_ID=8098f295358b] [REQUEST][END]
INFO - 2026-03-13 08:02:19 --> [REQ_ID=8098f295358b] [PERF] Execution time=0.135292
DEBUG - 2026-03-13 08:02:23 --> [REQ_ID=be2ee9d2f2be] [REQUEST][START] GET /index.php/forgot
DEBUG - 2026-03-13 08:02:23 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-13 08:02:23 --> [REQ_ID=be2ee9d2f2be] [FILTER_BEFORE] /index.php/forgot
DEBUG - 2026-03-13 08:02:23 --> [REQ_ID=be2ee9d2f2be] [ROUTE] Controller=\Myth\Auth\Controllers\AuthController Method=forgotPassword
DEBUG - 2026-03-13 08:02:23 --> [REQ_ID=be2ee9d2f2be] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/forgot
DEBUG - 2026-03-13 08:02:23 --> [CSRF] token name=csrf_test_name hash=69f9cf7bedfc358529d24d0d3c4da80c
DEBUG - 2026-03-13 08:02:23 --> [REQ_ID=be2ee9d2f2be] [FILTER_AFTER]
DEBUG - 2026-03-13 08:02:23 --> [REQ_ID=be2ee9d2f2be] [LIFECYCLE][END] status=200 duration_ms=3.21 memory_delta=0
DEBUG - 2026-03-13 08:02:23 --> [REQ_ID=be2ee9d2f2be] [REQUEST][END]
INFO - 2026-03-13 08:02:23 --> [REQ_ID=be2ee9d2f2be] [PERF] Execution time=0.014169
DEBUG - 2026-03-13 08:02:29 --> [REQ_ID=81a494de6b52] [REQUEST][START] POST /index.php/forgot
DEBUG - 2026-03-13 08:02:29 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-13 08:02:29 --> [REQ_ID=81a494de6b52] [FILTER_BEFORE] /index.php/forgot
DEBUG - 2026-03-13 08:02:29 --> [REQ_ID=81a494de6b52] [ROUTE] Controller=\App\Controllers\AuthController Method=attemptForgot
DEBUG - 2026-03-13 08:02:29 --> [REQ_ID=81a494de6b52] [LIFECYCLE][START] POST https://www.mymiwallet.com/index.php/forgot
DEBUG - 2026-03-13 08:02:29 --> [CSRF] token name=csrf_test_name hash=69f9cf7bedfc358529d24d0d3c4da80c
INFO - 2026-03-13 08:02:29 --> CSRF token verified.
DEBUG - 2026-03-13 08:02:29 --> [REQ_ID=307940945a1f] [INIT] App\Controllers\AuthController::POST
INFO - 2026-03-13 08:02:29 --> [REQ_ID=307940945a1f] [MEMORY][controller-start] 4194304
INFO - 2026-03-13 08:02:29 --> [AUTH] Password reset requested
INFO - 2026-03-13 08:02:30 --> [AUTH] Password reset email sent
DEBUG - 2026-03-13 08:02:30 --> [REQ_ID=81a494de6b52] [FILTER_AFTER]
DEBUG - 2026-03-13 08:02:30 --> [REQ_ID=81a494de6b52] [LIFECYCLE][END] status=303 duration_ms=1,115.52 memory_delta=0
INFO - 2026-03-13 08:02:30 --> [REQ_ID=307940945a1f] [PERF] Execution time=1.115392
DEBUG - 2026-03-13 08:02:30 --> [REQ_ID=81a494de6b52] [REQUEST][END]
INFO - 2026-03-13 08:02:30 --> [REQ_ID=81a494de6b52] [PERF] Execution time=1.125216
DEBUG - 2026-03-13 08:02:30 --> [REQ_ID=99ad8965d4b4] [REQUEST][START] GET /index.php/reset-password
DEBUG - 2026-03-13 08:02:30 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-13 08:02:30 --> [REQ_ID=99ad8965d4b4] [FILTER_BEFORE] /index.php/reset-password
DEBUG - 2026-03-13 08:02:30 --> [REQ_ID=99ad8965d4b4] [ROUTE] Controller=\App\Controllers\AuthController Method=resetPassword
DEBUG - 2026-03-13 08:02:30 --> [REQ_ID=99ad8965d4b4] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/reset-password
DEBUG - 2026-03-13 08:02:30 --> [CSRF] token name=csrf_test_name hash=69f9cf7bedfc358529d24d0d3c4da80c
DEBUG - 2026-03-13 08:02:30 --> [REQ_ID=09720b8bef75] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-13 08:02:30 --> [REQ_ID=09720b8bef75] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-13 08:02:30 --> [REQ_ID=99ad8965d4b4] [FILTER_AFTER]
DEBUG - 2026-03-13 08:02:30 --> [REQ_ID=99ad8965d4b4] [LIFECYCLE][END] status=200 duration_ms=19.85 memory_delta=0
INFO - 2026-03-13 08:02:30 --> [REQ_ID=09720b8bef75] [PERF] Execution time=0.019658
DEBUG - 2026-03-13 08:02:30 --> [REQ_ID=99ad8965d4b4] [REQUEST][END]
INFO - 2026-03-13 08:02:30 --> [REQ_ID=99ad8965d4b4] [PERF] Execution time=0.028383
DEBUG - 2026-03-13 08:02:44 --> [REQ_ID=bafee2de2ec7] [REQUEST][START] GET /index.php/register
DEBUG - 2026-03-13 08:02:44 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-13 08:02:44 --> [REQ_ID=bafee2de2ec7] [FILTER_BEFORE] /index.php/register
DEBUG - 2026-03-13 08:02:44 --> [REQ_ID=bafee2de2ec7] [ROUTE] Controller=\App\Controllers\AuthController Method=register
DEBUG - 2026-03-13 08:02:44 --> [REQ_ID=bafee2de2ec7] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/register
DEBUG - 2026-03-13 08:02:44 --> [CSRF] token name=csrf_test_name hash=69f9cf7bedfc358529d24d0d3c4da80c
DEBUG - 2026-03-13 08:02:44 --> [REQ_ID=a7082c76974b] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-13 08:02:44 --> [REQ_ID=a7082c76974b] [MEMORY][controller-start] 4194304
INFO - 2026-03-13 08:02:44 --> [REGISTRATION] Form loaded
INFO - 2026-03-13 08:02:44 --> [REQ_ID=a7082c76974b] [PERF] Execution time=0.037696
DEBUG - 2026-03-13 08:02:48 --> [REQ_ID=86223e35d908] [REQUEST][START] GET /index.php/Support/Account
DEBUG - 2026-03-13 08:02:48 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-13 08:02:48 --> [REQ_ID=86223e35d908] [FILTER_BEFORE] /index.php/Support/Account
DEBUG - 2026-03-13 08:02:48 --> [REQ_ID=86223e35d908] [ROUTE] Controller=\App\Modules\Support\Controllers\AccountSupportController Method=index
DEBUG - 2026-03-13 08:02:48 --> [REQ_ID=86223e35d908] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Support/Account
DEBUG - 2026-03-13 08:02:48 --> [CSRF] token name=csrf_test_name hash=69f9cf7bedfc358529d24d0d3c4da80c
DEBUG - 2026-03-13 08:02:48 --> [REQ_ID=74d0274fd002] [INIT] App\Modules\Support\Controllers\AccountSupportController::GET
INFO - 2026-03-13 08:02:48 --> [REQ_ID=74d0274fd002] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-13 08:02:48 --> [REQ_ID=74d0274fd002] [METHOD_ENTRY] index
DEBUG - 2026-03-13 08:02:48 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-13 08:02:48 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-13 08:02:48 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-13 08:02:48 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-13 08:02:48 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-13 08:02:48 --> MyMICoin: guest context detected; skipping user-specific preload.
INFO - 2026-03-13 08:02:48 --> [REQ_ID=74d0274fd002] [MEMORY][commonData:start] 4194304
DEBUG - 2026-03-13 08:02:48 --> [REQ_ID=74d0274fd002] [VIEW_RENDER] SupportModule/Support/account_help
INFO - 2026-03-13 08:02:48 --> [REQ_ID=74d0274fd002] [MEMORY][commonData:start] 4194304
INFO - 2026-03-13 08:02:48 --> themesMemory usage: 4194304
DEBUG - 2026-03-13 08:02:48 --> [REQ_ID=86223e35d908] [FILTER_AFTER]
DEBUG - 2026-03-13 08:02:48 --> [REQ_ID=86223e35d908] [LIFECYCLE][END] status=200 duration_ms=37.77 memory_delta=0
INFO - 2026-03-13 08:02:48 --> [REQ_ID=74d0274fd002] [PERF] Execution time=0.037537
DEBUG - 2026-03-13 08:02:48 --> [REQ_ID=86223e35d908] [REQUEST][END]
INFO - 2026-03-13 08:02:48 --> [REQ_ID=86223e35d908] [PERF] Execution time=0.047957
DEBUG - 2026-03-13 08:02:54 --> [REQ_ID=fd239ab240ca] [REQUEST][START] GET /index.php/Account
DEBUG - 2026-03-13 08:02:54 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-13 08:02:54 --> [REQ_ID=fd239ab240ca] [FILTER_BEFORE] /index.php/Account
DEBUG - 2026-03-13 08:02:54 --> [REQ_ID=fd239ab240ca] [ROUTE] Controller=\App\Modules\User\Controllers\DashboardController Method=account
DEBUG - 2026-03-13 08:02:54 --> [REQ_ID=fd239ab240ca] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Account
DEBUG - 2026-03-13 08:02:54 --> [CSRF] token name=csrf_test_name hash=69f9cf7bedfc358529d24d0d3c4da80c
DEBUG - 2026-03-13 08:02:54 --> [REQ_ID=fd239ab240ca] [REQUEST][END]
INFO - 2026-03-13 08:02:54 --> [REQ_ID=fd239ab240ca] [PERF] Execution time=0.013510
DEBUG - 2026-03-13 08:02:55 --> [REQ_ID=65d579df75f9] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-13 08:02:55 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-13 08:02:55 --> [REQ_ID=65d579df75f9] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-13 08:02:55 --> [REQ_ID=65d579df75f9] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-13 08:02:55 --> [REQ_ID=65d579df75f9] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-13 08:02:55 --> [CSRF] token name=csrf_test_name hash=69f9cf7bedfc358529d24d0d3c4da80c
DEBUG - 2026-03-13 08:02:55 --> [REQ_ID=862fe9a6e1b8] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-13 08:02:55 --> [REQ_ID=862fe9a6e1b8] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-13 08:02:55 --> [REQ_ID=65d579df75f9] [FILTER_AFTER]
DEBUG - 2026-03-13 08:02:55 --> [REQ_ID=65d579df75f9] [LIFECYCLE][END] status=200 duration_ms=33.32 memory_delta=0
INFO - 2026-03-13 08:02:55 --> [REQ_ID=862fe9a6e1b8] [PERF] Execution time=0.033335
DEBUG - 2026-03-13 08:02:55 --> [REQ_ID=65d579df75f9] [REQUEST][END]
INFO - 2026-03-13 08:02:55 --> [REQ_ID=65d579df75f9] [PERF] Execution time=0.042286
DEBUG - 2026-03-13 08:03:04 --> [REQ_ID=2d065558102e] [REQUEST][START] GET /index.php/Account/Notifications
DEBUG - 2026-03-13 08:03:04 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-13 08:03:04 --> [REQ_ID=2d065558102e] [FILTER_BEFORE] /index.php/Account/Notifications
DEBUG - 2026-03-13 08:03:04 --> [REQ_ID=2d065558102e] [ROUTE] Controller=\App\Modules\User\Controllers\DashboardController Method=notifications
DEBUG - 2026-03-13 08:03:04 --> [REQ_ID=2d065558102e] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Account/Notifications
DEBUG - 2026-03-13 08:03:04 --> [CSRF] token name=csrf_test_name hash=69f9cf7bedfc358529d24d0d3c4da80c
DEBUG - 2026-03-13 08:03:04 --> [REQ_ID=2d065558102e] [REQUEST][END]
INFO - 2026-03-13 08:03:04 --> [REQ_ID=2d065558102e] [PERF] Execution time=0.010284
DEBUG - 2026-03-13 08:03:05 --> [REQ_ID=4ff8157db887] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-13 08:03:05 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-13 08:03:05 --> [REQ_ID=4ff8157db887] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-13 08:03:05 --> [REQ_ID=4ff8157db887] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-13 08:03:05 --> [REQ_ID=4ff8157db887] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-13 08:03:05 --> [CSRF] token name=csrf_test_name hash=69f9cf7bedfc358529d24d0d3c4da80c
DEBUG - 2026-03-13 08:03:05 --> [REQ_ID=b9e319a28103] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-13 08:03:05 --> [REQ_ID=b9e319a28103] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-13 08:03:05 --> [REQ_ID=4ff8157db887] [FILTER_AFTER]
DEBUG - 2026-03-13 08:03:05 --> [REQ_ID=4ff8157db887] [LIFECYCLE][END] status=200 duration_ms=37.37 memory_delta=0
INFO - 2026-03-13 08:03:05 --> [REQ_ID=b9e319a28103] [PERF] Execution time=0.037428
DEBUG - 2026-03-13 08:03:05 --> [REQ_ID=4ff8157db887] [REQUEST][END]
INFO - 2026-03-13 08:03:05 --> [REQ_ID=4ff8157db887] [PERF] Execution time=0.047438
DEBUG - 2026-03-13 08:03:12 --> [REQ_ID=350c82e28d8e] [REQUEST][START] GET /index.php/Management/Users
DEBUG - 2026-03-13 08:03:12 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-13 08:03:12 --> [REQ_ID=350c82e28d8e] [FILTER_BEFORE] /index.php/Management/Users
DEBUG - 2026-03-13 08:03:12 --> [REQ_ID=350c82e28d8e] [ROUTE] Controller=\App\Modules\Management\Controllers\UsersController Method=index
DEBUG - 2026-03-13 08:03:12 --> [REQ_ID=350c82e28d8e] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Management/Users
DEBUG - 2026-03-13 08:03:12 --> [CSRF] token name=csrf_test_name hash=69f9cf7bedfc358529d24d0d3c4da80c
DEBUG - 2026-03-13 08:03:12 --> [REQ_ID=350c82e28d8e] [REQUEST][END]
INFO - 2026-03-13 08:03:12 --> [REQ_ID=350c82e28d8e] [PERF] Execution time=0.010007
DEBUG - 2026-03-13 08:03:12 --> [REQ_ID=dc91cd75d095] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-13 08:03:12 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-13 08:03:12 --> [REQ_ID=dc91cd75d095] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-13 08:03:12 --> [REQ_ID=dc91cd75d095] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-13 08:03:12 --> [REQ_ID=dc91cd75d095] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-13 08:03:12 --> [CSRF] token name=csrf_test_name hash=69f9cf7bedfc358529d24d0d3c4da80c
DEBUG - 2026-03-13 08:03:12 --> [REQ_ID=f449ce481447] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-13 08:03:12 --> [REQ_ID=f449ce481447] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-13 08:03:13 --> [REQ_ID=dc91cd75d095] [FILTER_AFTER]
DEBUG - 2026-03-13 08:03:13 --> [REQ_ID=dc91cd75d095] [LIFECYCLE][END] status=200 duration_ms=94.16 memory_delta=0
INFO - 2026-03-13 08:03:13 --> [REQ_ID=f449ce481447] [PERF] Execution time=0.094088
DEBUG - 2026-03-13 08:03:13 --> [REQ_ID=dc91cd75d095] [REQUEST][END]
INFO - 2026-03-13 08:03:13 --> [REQ_ID=dc91cd75d095] [PERF] Execution time=0.104098
DEBUG - 2026-03-13 08:03:23 --> [REQ_ID=8beb863f482f] [REQUEST][START] GET /index.php/Account/Social-Media
DEBUG - 2026-03-13 08:03:23 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-13 08:03:23 --> [REQ_ID=8beb863f482f] [FILTER_BEFORE] /index.php/Account/Social-Media
DEBUG - 2026-03-13 08:03:23 --> [REQ_ID=8beb863f482f] [ROUTE] Controller=\App\Modules\User\Controllers\DashboardController Method=SocialMedia
DEBUG - 2026-03-13 08:03:23 --> [REQ_ID=8beb863f482f] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Account/Social-Media
DEBUG - 2026-03-13 08:03:23 --> [CSRF] token name=csrf_test_name hash=69f9cf7bedfc358529d24d0d3c4da80c
DEBUG - 2026-03-13 08:03:23 --> [REQ_ID=8beb863f482f] [REQUEST][END]
INFO - 2026-03-13 08:03:23 --> [REQ_ID=8beb863f482f] [PERF] Execution time=0.011288
DEBUG - 2026-03-13 08:03:24 --> [REQ_ID=99bbd05409cd] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-13 08:03:24 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-13 08:03:24 --> [REQ_ID=99bbd05409cd] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-13 08:03:24 --> [REQ_ID=99bbd05409cd] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-13 08:03:24 --> [REQ_ID=99bbd05409cd] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-13 08:03:24 --> [CSRF] token name=csrf_test_name hash=69f9cf7bedfc358529d24d0d3c4da80c
DEBUG - 2026-03-13 08:03:24 --> [REQ_ID=e0fb7833f651] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-13 08:03:24 --> [REQ_ID=e0fb7833f651] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-13 08:03:24 --> [REQ_ID=99bbd05409cd] [FILTER_AFTER]
DEBUG - 2026-03-13 08:03:24 --> [REQ_ID=99bbd05409cd] [LIFECYCLE][END] status=200 duration_ms=39.87 memory_delta=0
INFO - 2026-03-13 08:03:24 --> [REQ_ID=e0fb7833f651] [PERF] Execution time=0.039678
DEBUG - 2026-03-13 08:03:24 --> [REQ_ID=99bbd05409cd] [REQUEST][END]
INFO - 2026-03-13 08:03:24 --> [REQ_ID=99bbd05409cd] [PERF] Execution time=0.048312
DEBUG - 2026-03-13 08:03:32 --> [REQ_ID=07f4fbe6d515] [REQUEST][START] GET /index.php/Investments/News
DEBUG - 2026-03-13 08:03:32 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-13 08:03:32 --> [REQ_ID=07f4fbe6d515] [FILTER_BEFORE] /index.php/Investments/News
DEBUG - 2026-03-13 08:03:32 --> [REQ_ID=07f4fbe6d515] [ROUTE] Controller=closure_route Method=index
DEBUG - 2026-03-13 08:03:32 --> [REQ_ID=07f4fbe6d515] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Investments/News
DEBUG - 2026-03-13 08:03:32 --> [CSRF] token name=csrf_test_name hash=69f9cf7bedfc358529d24d0d3c4da80c
DEBUG - 2026-03-13 08:03:32 --> [REQ_ID=07f4fbe6d515] [REQUEST][END]
INFO - 2026-03-13 08:03:32 --> [REQ_ID=07f4fbe6d515] [PERF] Execution time=0.010861
DEBUG - 2026-03-13 08:03:32 --> [REQ_ID=effcaa4757af] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-13 08:03:32 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-13 08:03:32 --> [REQ_ID=effcaa4757af] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-13 08:03:32 --> [REQ_ID=effcaa4757af] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-13 08:03:32 --> [REQ_ID=effcaa4757af] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-13 08:03:32 --> [CSRF] token name=csrf_test_name hash=69f9cf7bedfc358529d24d0d3c4da80c
DEBUG - 2026-03-13 08:03:32 --> [REQ_ID=a9e958551cec] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-13 08:03:32 --> [REQ_ID=a9e958551cec] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-13 08:03:32 --> [REQ_ID=effcaa4757af] [FILTER_AFTER]
DEBUG - 2026-03-13 08:03:32 --> [REQ_ID=effcaa4757af] [LIFECYCLE][END] status=200 duration_ms=83.05 memory_delta=0
INFO - 2026-03-13 08:03:32 --> [REQ_ID=a9e958551cec] [PERF] Execution time=0.083065
DEBUG - 2026-03-13 08:03:32 --> [REQ_ID=effcaa4757af] [REQUEST][END]
INFO - 2026-03-13 08:03:32 --> [REQ_ID=effcaa4757af] [PERF] Execution time=0.093545
DEBUG - 2026-03-13 08:03:43 --> [REQ_ID=6c28bf68bdd1] [REQUEST][START] GET /index.php/Profile/
DEBUG - 2026-03-13 08:03:43 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-13 08:03:43 --> [REQ_ID=6c28bf68bdd1] [FILTER_BEFORE] /index.php/Profile/
DEBUG - 2026-03-13 08:03:43 --> [REQ_ID=6c28bf68bdd1] [ROUTE] Controller=\App\Controllers\App\Modules\User\Controllers\DashboardController Method=profile
DEBUG - 2026-03-13 08:03:43 --> [REQ_ID=6c28bf68bdd1] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Profile/
DEBUG - 2026-03-13 08:03:43 --> [CSRF] token name=csrf_test_name hash=69f9cf7bedfc358529d24d0d3c4da80c
DEBUG - 2026-03-13 08:03:43 --> [REQ_ID=6c28bf68bdd1] [REQUEST][END]
INFO - 2026-03-13 08:03:43 --> [REQ_ID=6c28bf68bdd1] [PERF] Execution time=0.009603
DEBUG - 2026-03-13 08:03:43 --> [REQ_ID=bf59047d63cb] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-13 08:03:43 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-13 08:03:43 --> [REQ_ID=bf59047d63cb] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-13 08:03:43 --> [REQ_ID=bf59047d63cb] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-13 08:03:43 --> [REQ_ID=bf59047d63cb] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-13 08:03:43 --> [CSRF] token name=csrf_test_name hash=69f9cf7bedfc358529d24d0d3c4da80c
DEBUG - 2026-03-13 08:03:43 --> [REQ_ID=3efe9ab4df89] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-13 08:03:43 --> [REQ_ID=3efe9ab4df89] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-13 08:03:43 --> [REQ_ID=bf59047d63cb] [FILTER_AFTER]
DEBUG - 2026-03-13 08:03:43 --> [REQ_ID=bf59047d63cb] [LIFECYCLE][END] status=200 duration_ms=30.50 memory_delta=0
INFO - 2026-03-13 08:03:43 --> [REQ_ID=3efe9ab4df89] [PERF] Execution time=0.030572
DEBUG - 2026-03-13 08:03:43 --> [REQ_ID=bf59047d63cb] [REQUEST][END]
INFO - 2026-03-13 08:03:43 --> [REQ_ID=bf59047d63cb] [PERF] Execution time=0.039593
DEBUG - 2026-03-13 08:03:50 --> [REQ_ID=04256ba4433c] [REQUEST][START] GET /index.php/Customer-Support
DEBUG - 2026-03-13 08:03:50 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-13 08:03:50 --> [REQ_ID=04256ba4433c] [FILTER_BEFORE] /index.php/Customer-Support
DEBUG - 2026-03-13 08:03:50 --> [REQ_ID=04256ba4433c] [ROUTE] Controller=\App\Controllers\App\Modules\Support\Controllers\SupportController Method=index
DEBUG - 2026-03-13 08:03:50 --> [REQ_ID=04256ba4433c] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Customer-Support
DEBUG - 2026-03-13 08:03:50 --> [CSRF] token name=csrf_test_name hash=69f9cf7bedfc358529d24d0d3c4da80c
DEBUG - 2026-03-13 08:03:50 --> [REQ_ID=04256ba4433c] [REQUEST][END]
INFO - 2026-03-13 08:03:50 --> [REQ_ID=04256ba4433c] [PERF] Execution time=0.009649
DEBUG - 2026-03-13 08:03:50 --> [REQ_ID=7904ef58da33] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-13 08:03:50 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-13 08:03:50 --> [REQ_ID=7904ef58da33] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-13 08:03:50 --> [REQ_ID=7904ef58da33] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-13 08:03:50 --> [REQ_ID=7904ef58da33] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-13 08:03:50 --> [CSRF] token name=csrf_test_name hash=69f9cf7bedfc358529d24d0d3c4da80c
DEBUG - 2026-03-13 08:03:50 --> [REQ_ID=ffc2499e1cd6] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-13 08:03:50 --> [REQ_ID=ffc2499e1cd6] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-13 08:03:50 --> [REQ_ID=7904ef58da33] [FILTER_AFTER]
DEBUG - 2026-03-13 08:03:50 --> [REQ_ID=7904ef58da33] [LIFECYCLE][END] status=200 duration_ms=39.33 memory_delta=0
INFO - 2026-03-13 08:03:50 --> [REQ_ID=ffc2499e1cd6] [PERF] Execution time=0.039229
DEBUG - 2026-03-13 08:03:50 --> [REQ_ID=7904ef58da33] [REQUEST][END]
INFO - 2026-03-13 08:03:50 --> [REQ_ID=7904ef58da33] [PERF] Execution time=0.048055
DEBUG - 2026-03-13 08:03:59 --> [REQ_ID=c3abf0881860] [REQUEST][START] GET /index.php/Account/Activity
DEBUG - 2026-03-13 08:03:59 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-13 08:03:59 --> [REQ_ID=c3abf0881860] [FILTER_BEFORE] /index.php/Account/Activity
DEBUG - 2026-03-13 08:03:59 --> [REQ_ID=c3abf0881860] [ROUTE] Controller=\App\Modules\User\Controllers\DashboardController Method=activity
DEBUG - 2026-03-13 08:03:59 --> [REQ_ID=c3abf0881860] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Account/Activity
DEBUG - 2026-03-13 08:03:59 --> [CSRF] token name=csrf_test_name hash=69f9cf7bedfc358529d24d0d3c4da80c
DEBUG - 2026-03-13 08:03:59 --> [REQ_ID=c3abf0881860] [REQUEST][END]
INFO - 2026-03-13 08:03:59 --> [REQ_ID=c3abf0881860] [PERF] Execution time=0.009668
DEBUG - 2026-03-13 08:03:59 --> [REQ_ID=21014c972d12] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-13 08:03:59 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-13 08:03:59 --> [REQ_ID=21014c972d12] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-13 08:03:59 --> [REQ_ID=21014c972d12] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-13 08:03:59 --> [REQ_ID=21014c972d12] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-13 08:03:59 --> [CSRF] token name=csrf_test_name hash=69f9cf7bedfc358529d24d0d3c4da80c
DEBUG - 2026-03-13 08:03:59 --> [REQ_ID=7fa9c380a6e9] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-13 08:03:59 --> [REQ_ID=7fa9c380a6e9] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-13 08:03:59 --> [REQ_ID=21014c972d12] [FILTER_AFTER]
DEBUG - 2026-03-13 08:03:59 --> [REQ_ID=21014c972d12] [LIFECYCLE][END] status=200 duration_ms=32.08 memory_delta=0
INFO - 2026-03-13 08:03:59 --> [REQ_ID=7fa9c380a6e9] [PERF] Execution time=0.031946
DEBUG - 2026-03-13 08:03:59 --> [REQ_ID=21014c972d12] [REQUEST][END]
INFO - 2026-03-13 08:03:59 --> [REQ_ID=21014c972d12] [PERF] Execution time=0.040438
DEBUG - 2026-03-13 08:04:09 --> [REQ_ID=ff276775eca3] [REQUEST][START] GET /index.php/logout
DEBUG - 2026-03-13 08:04:09 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-13 08:04:09 --> [REQ_ID=ff276775eca3] [FILTER_BEFORE] /index.php/logout
DEBUG - 2026-03-13 08:04:09 --> [REQ_ID=ff276775eca3] [ROUTE] Controller=\App\Controllers\AuthController Method=logout
DEBUG - 2026-03-13 08:04:09 --> [REQ_ID=ff276775eca3] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/logout
DEBUG - 2026-03-13 08:04:09 --> [CSRF] token name=csrf_test_name hash=69f9cf7bedfc358529d24d0d3c4da80c
DEBUG - 2026-03-13 08:04:09 --> [REQ_ID=ff276775eca3] [REQUEST][END]
INFO - 2026-03-13 08:04:09 --> [REQ_ID=ff276775eca3] [PERF] Execution time=0.009625
DEBUG - 2026-03-13 08:04:10 --> [REQ_ID=520ac994ccf6] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-13 08:04:10 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-13 08:04:10 --> [REQ_ID=520ac994ccf6] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-13 08:04:10 --> [REQ_ID=520ac994ccf6] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-13 08:04:10 --> [REQ_ID=520ac994ccf6] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-13 08:04:10 --> [CSRF] token name=csrf_test_name hash=69f9cf7bedfc358529d24d0d3c4da80c
DEBUG - 2026-03-13 08:04:10 --> [REQ_ID=02d6e6df75e9] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-13 08:04:10 --> [REQ_ID=02d6e6df75e9] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-13 08:04:10 --> [REQ_ID=520ac994ccf6] [FILTER_AFTER]
DEBUG - 2026-03-13 08:04:10 --> [REQ_ID=520ac994ccf6] [LIFECYCLE][END] status=200 duration_ms=24.28 memory_delta=0
INFO - 2026-03-13 08:04:10 --> [REQ_ID=02d6e6df75e9] [PERF] Execution time=0.024073
DEBUG - 2026-03-13 08:04:10 --> [REQ_ID=520ac994ccf6] [REQUEST][END]
INFO - 2026-03-13 08:04:10 --> [REQ_ID=520ac994ccf6] [PERF] Execution time=0.033611
DEBUG - 2026-03-13 08:04:18 --> [REQ_ID=d1a967baeea4] [REQUEST][START] GET /index.php/Account/Security
DEBUG - 2026-03-13 08:04:18 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-13 08:04:18 --> [REQ_ID=d1a967baeea4] [FILTER_BEFORE] /index.php/Account/Security
DEBUG - 2026-03-13 08:04:18 --> [REQ_ID=d1a967baeea4] [ROUTE] Controller=\App\Modules\User\Controllers\DashboardController Method=Security
DEBUG - 2026-03-13 08:04:18 --> [REQ_ID=d1a967baeea4] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Account/Security
DEBUG - 2026-03-13 08:04:18 --> [CSRF] token name=csrf_test_name hash=69f9cf7bedfc358529d24d0d3c4da80c
DEBUG - 2026-03-13 08:04:18 --> [REQ_ID=d1a967baeea4] [REQUEST][END]
INFO - 2026-03-13 08:04:18 --> [REQ_ID=d1a967baeea4] [PERF] Execution time=0.010501
DEBUG - 2026-03-13 08:04:18 --> [REQ_ID=36a7ffb0f18d] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-13 08:04:18 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-13 08:04:18 --> [REQ_ID=36a7ffb0f18d] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-13 08:04:18 --> [REQ_ID=36a7ffb0f18d] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-13 08:04:18 --> [REQ_ID=36a7ffb0f18d] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-13 08:04:18 --> [CSRF] token name=csrf_test_name hash=69f9cf7bedfc358529d24d0d3c4da80c
DEBUG - 2026-03-13 08:04:18 --> [REQ_ID=315ea09d8920] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-13 08:04:18 --> [REQ_ID=315ea09d8920] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-13 08:04:18 --> [REQ_ID=36a7ffb0f18d] [FILTER_AFTER]
DEBUG - 2026-03-13 08:04:18 --> [REQ_ID=36a7ffb0f18d] [LIFECYCLE][END] status=200 duration_ms=37.82 memory_delta=0
INFO - 2026-03-13 08:04:18 --> [REQ_ID=315ea09d8920] [PERF] Execution time=0.037783
DEBUG - 2026-03-13 08:04:18 --> [REQ_ID=36a7ffb0f18d] [REQUEST][END]
INFO - 2026-03-13 08:04:18 --> [REQ_ID=36a7ffb0f18d] [PERF] Execution time=0.046966
DEBUG - 2026-03-13 08:04:26 --> [REQ_ID=feff970c2e80] [REQUEST][START] GET /index.php/Account/Billing
DEBUG - 2026-03-13 08:04:26 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-13 08:04:26 --> [REQ_ID=feff970c2e80] [FILTER_BEFORE] /index.php/Account/Billing
DEBUG - 2026-03-13 08:04:26 --> [REQ_ID=feff970c2e80] [ROUTE] Controller=\App\Modules\User\Controllers\DashboardController Method=billing
DEBUG - 2026-03-13 08:04:26 --> [REQ_ID=feff970c2e80] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Account/Billing
DEBUG - 2026-03-13 08:04:26 --> [CSRF] token name=csrf_test_name hash=69f9cf7bedfc358529d24d0d3c4da80c
DEBUG - 2026-03-13 08:04:26 --> [REQ_ID=feff970c2e80] [REQUEST][END]
INFO - 2026-03-13 08:04:26 --> [REQ_ID=feff970c2e80] [PERF] Execution time=0.009889
DEBUG - 2026-03-13 08:04:26 --> [REQ_ID=e54e7065dc45] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-13 08:04:26 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-13 08:04:26 --> [REQ_ID=e54e7065dc45] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-13 08:04:26 --> [REQ_ID=e54e7065dc45] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-13 08:04:26 --> [REQ_ID=e54e7065dc45] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-13 08:04:26 --> [CSRF] token name=csrf_test_name hash=69f9cf7bedfc358529d24d0d3c4da80c
DEBUG - 2026-03-13 08:04:26 --> [REQ_ID=f33d812c680e] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-13 08:04:26 --> [REQ_ID=f33d812c680e] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-13 08:04:26 --> [REQ_ID=e54e7065dc45] [FILTER_AFTER]
DEBUG - 2026-03-13 08:04:26 --> [REQ_ID=e54e7065dc45] [LIFECYCLE][END] status=200 duration_ms=32.72 memory_delta=0
INFO - 2026-03-13 08:04:26 --> [REQ_ID=f33d812c680e] [PERF] Execution time=0.032619
DEBUG - 2026-03-13 08:04:26 --> [REQ_ID=e54e7065dc45] [REQUEST][END]
INFO - 2026-03-13 08:04:26 --> [REQ_ID=e54e7065dc45] [PERF] Execution time=0.041995
DEBUG - 2026-03-13 08:04:33 --> [REQ_ID=ec322702951d] [REQUEST][START] GET /index.php/Account/Connected-Accounts
DEBUG - 2026-03-13 08:04:33 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-13 08:04:33 --> [REQ_ID=ec322702951d] [FILTER_BEFORE] /index.php/Account/Connected-Accounts
DEBUG - 2026-03-13 08:04:33 --> [REQ_ID=ec322702951d] [ROUTE] Controller=\App\Modules\User\Controllers\DashboardController Method=connectedAccounts
DEBUG - 2026-03-13 08:04:33 --> [REQ_ID=ec322702951d] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Account/Connected-Accounts
DEBUG - 2026-03-13 08:04:33 --> [CSRF] token name=csrf_test_name hash=69f9cf7bedfc358529d24d0d3c4da80c
DEBUG - 2026-03-13 08:04:33 --> [REQ_ID=ec322702951d] [REQUEST][END]
INFO - 2026-03-13 08:04:33 --> [REQ_ID=ec322702951d] [PERF] Execution time=0.009976
DEBUG - 2026-03-13 08:04:33 --> [REQ_ID=0349f3605b22] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-13 08:04:33 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-13 08:04:33 --> [REQ_ID=0349f3605b22] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-13 08:04:33 --> [REQ_ID=0349f3605b22] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-13 08:04:33 --> [REQ_ID=0349f3605b22] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-13 08:04:33 --> [CSRF] token name=csrf_test_name hash=69f9cf7bedfc358529d24d0d3c4da80c
DEBUG - 2026-03-13 08:04:33 --> [REQ_ID=82b524092567] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-13 08:04:33 --> [REQ_ID=82b524092567] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-13 08:04:33 --> [REQ_ID=0349f3605b22] [FILTER_AFTER]
DEBUG - 2026-03-13 08:04:33 --> [REQ_ID=0349f3605b22] [LIFECYCLE][END] status=200 duration_ms=28.67 memory_delta=0
INFO - 2026-03-13 08:04:33 --> [REQ_ID=82b524092567] [PERF] Execution time=0.028574
DEBUG - 2026-03-13 08:04:33 --> [REQ_ID=0349f3605b22] [REQUEST][END]
INFO - 2026-03-13 08:04:33 --> [REQ_ID=0349f3605b22] [PERF] Execution time=0.038191
DEBUG - 2026-03-13 08:05:23 --> [REQ_ID=f799a558-6b81-44cd-bb89-ee5ad375753b] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-13 08:05:23 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-13 08:05:23 --> [REQ_ID=f799a558-6b81-44cd-bb89-ee5ad375753b] [REQUEST][END]
INFO - 2026-03-13 08:05:23 --> [REQ_ID=f799a558-6b81-44cd-bb89-ee5ad375753b] [PERF] Execution time=0.009383
DEBUG - 2026-03-13 08:06:22 --> [REQ_ID=72e601271ccc] [REQUEST][START] HEAD /
DEBUG - 2026-03-13 08:06:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-13 08:06:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-13 08:06:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-13 08:06:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-13 08:06:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-13 08:11:22 --> [REQ_ID=7e76adb3fc56] [REQUEST][START] HEAD /
DEBUG - 2026-03-13 08:11:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-13 08:11:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-13 08:11:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-13 08:11:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-13 08:11:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-13 08:15:01 --> [REQ_ID=0a227fd1a451] [REQUEST][START] GET /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-13 08:15:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-13 08:15:01 --> [REQ_ID=0a227fd1a451] [FILTER_BEFORE] /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-13 08:15:01 --> [REQ_ID=0a227fd1a451] [ROUTE] Controller=\App\Modules\APIs\Controllers\AlertsAPIController Method=fetchEmailAlerts
DEBUG - 2026-03-13 08:15:01 --> [REQ_ID=0a227fd1a451] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-13 08:15:01 --> [REQ_ID=0a227fd1a451] [REQUEST][END]
INFO - 2026-03-13 08:15:01 --> [REQ_ID=0a227fd1a451] [PERF] Execution time=0.046914
DEBUG - 2026-03-13 08:16:22 --> [REQ_ID=0c933d854264] [REQUEST][START] HEAD /
DEBUG - 2026-03-13 08:16:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-13 08:16:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-13 08:16:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-13 08:16:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-13 08:16:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-13 08:18:22 --> [REQ_ID=b863a7dfc08d] [REQUEST][START] GET /index.php/
DEBUG - 2026-03-13 08:18:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-13 08:18:22 --> [REQ_ID=b863a7dfc08d] [REQUEST][END]
INFO - 2026-03-13 08:18:22 --> [REQ_ID=b863a7dfc08d] [PERF] Execution time=0.043067
DEBUG - 2026-03-13 08:21:22 --> [REQ_ID=9c81ae71aec4] [REQUEST][START] HEAD /
DEBUG - 2026-03-13 08:21:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-13 08:21:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-13 08:21:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-13 08:21:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-13 08:21:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-13 08:26:22 --> [REQ_ID=df2f44ff1c83] [REQUEST][START] HEAD /
DEBUG - 2026-03-13 08:26:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-13 08:26:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-13 08:26:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-13 08:26:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-13 08:26:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-13 08:28:59 --> [REQ_ID=d60fcea93e7b] [REQUEST][START] GET /index.php/How-It-Works/Investment-Portfolio-Management
DEBUG - 2026-03-13 08:28:59 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-13 08:28:59 --> [REQ_ID=d60fcea93e7b] [FILTER_BEFORE] /index.php/How-It-Works/Investment-Portfolio-Management
DEBUG - 2026-03-13 08:28:59 --> [REQ_ID=d60fcea93e7b] [ROUTE] Controller=\App\Modules\Blog\Controllers\HowItWorksController Method=InvestmentPortfolioManagement
DEBUG - 2026-03-13 08:28:59 --> [REQ_ID=d60fcea93e7b] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/How-It-Works/Investment-Portfolio-Management
DEBUG - 2026-03-13 08:28:59 --> [CSRF] token name=csrf_test_name hash=fd048d8e83d1a2db0eb5fbde1db186f7
DEBUG - 2026-03-13 08:28:59 --> [REQ_ID=30f7d32f8558] [INIT] App\Modules\Blog\Controllers\HowItWorksController::GET
INFO - 2026-03-13 08:28:59 --> [REQ_ID=30f7d32f8558] [MEMORY][controller-start] 6291456
DEBUG - 2026-03-13 08:28:59 --> [REQ_ID=30f7d32f8558] [METHOD_ENTRY] InvestmentPortfolioManagement
DEBUG - 2026-03-13 08:28:59 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-13 08:28:59 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-13 08:28:59 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-13 08:28:59 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-13 08:28:59 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-13 08:28:59 --> MyMICoin: guest context detected; skipping user-specific preload.
INFO - 2026-03-13 08:28:59 --> [REQ_ID=30f7d32f8558] [MEMORY][commonData:start] 6291456
INFO - 2026-03-13 08:29:00 --> themesMemory usage: 10485760
DEBUG - 2026-03-13 08:29:00 --> [MetaService] slug=how-it-works/investment-portfolio-management pageName= cacheHit= path=DB
DEBUG - 2026-03-13 08:29:00 --> [REQ_ID=d60fcea93e7b] [FILTER_AFTER]
DEBUG - 2026-03-13 08:29:00 --> [REQ_ID=d60fcea93e7b] [LIFECYCLE][END] status=200 duration_ms=860.28 memory_delta=4194304
INFO - 2026-03-13 08:29:00 --> [REQ_ID=30f7d32f8558] [PERF] Execution time=0.857596
DEBUG - 2026-03-13 08:29:00 --> [REQ_ID=d60fcea93e7b] [REQUEST][END]
INFO - 2026-03-13 08:29:00 --> [REQ_ID=d60fcea93e7b] [PERF] Execution time=0.902147
DEBUG - 2026-03-13 08:29:04 --> [REQ_ID=3239c59ad8ce] [REQUEST][START] GET /
DEBUG - 2026-03-13 08:29:04 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-13 08:29:04 --> [REQ_ID=3239c59ad8ce] [FILTER_BEFORE] /
DEBUG - 2026-03-13 08:29:04 --> [REQ_ID=3239c59ad8ce] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-13 08:29:04 --> [REQ_ID=3239c59ad8ce] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-13 08:29:04 --> [CSRF] token name=csrf_test_name hash=205d1cd90df634cb774a4ce9eb27f796
DEBUG - 2026-03-13 08:29:04 --> [REQ_ID=c8b9e6da0f8b] [INIT] App\Controllers\Home::GET
INFO - 2026-03-13 08:29:04 --> [REQ_ID=c8b9e6da0f8b] [MEMORY][controller-start] 6291456
INFO - 2026-03-13 08:29:04 --> [REQ_ID=c8b9e6da0f8b] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-13 08:29:04 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-13 08:29:05 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-03-13 08:29:05 --> [REQ_ID=c8b9e6da0f8b] [VIEW_RENDER] themes/public/home
INFO - 2026-03-13 08:29:05 --> [REQ_ID=c8b9e6da0f8b] [MEMORY][commonData:start] 8388608
INFO - 2026-03-13 08:29:05 --> themesMemory usage: 8388608
DEBUG - 2026-03-13 08:29:05 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-13 08:29:05 --> [REQ_ID=3239c59ad8ce] [FILTER_AFTER]
DEBUG - 2026-03-13 08:29:05 --> [REQ_ID=3239c59ad8ce] [LIFECYCLE][END] status=200 duration_ms=703.93 memory_delta=2097152
INFO - 2026-03-13 08:29:05 --> [REQ_ID=c8b9e6da0f8b] [PERF] Execution time=0.703570
DEBUG - 2026-03-13 08:29:05 --> [REQ_ID=3239c59ad8ce] [REQUEST][END]
INFO - 2026-03-13 08:29:05 --> [REQ_ID=3239c59ad8ce] [PERF] Execution time=0.715373
DEBUG - 2026-03-13 08:31:22 --> [REQ_ID=e5394a81a638] [REQUEST][START] HEAD /
DEBUG - 2026-03-13 08:31:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-13 08:31:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-13 08:31:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-13 08:31:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-13 08:31:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-13 08:35:01 --> [REQ_ID=088034831022] [REQUEST][START] GET /index.php/Management/Marketing/Schedule
DEBUG - 2026-03-13 08:35:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-13 08:35:01 --> [REQ_ID=088034831022] [REQUEST][END]
INFO - 2026-03-13 08:35:01 --> [REQ_ID=088034831022] [PERF] Execution time=0.046061
DEBUG - 2026-03-13 08:36:22 --> [REQ_ID=1a73e888dadf] [REQUEST][START] HEAD /
DEBUG - 2026-03-13 08:36:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-13 08:36:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-13 08:36:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-13 08:36:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-13 08:36:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-13 08:41:22 --> [REQ_ID=0fb855fb4cd1] [REQUEST][START] HEAD /
DEBUG - 2026-03-13 08:41:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-13 08:41:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-13 08:41:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-13 08:41:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-13 08:41:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-13 08:46:22 --> [REQ_ID=81fd005604f5] [REQUEST][START] HEAD /
DEBUG - 2026-03-13 08:46:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-13 08:46:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-13 08:46:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-13 08:46:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-13 08:46:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-13 08:51:22 --> [REQ_ID=2693178eb692] [REQUEST][START] HEAD /
DEBUG - 2026-03-13 08:51:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-13 08:51:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-13 08:51:23 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-13 08:51:23 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-13 08:51:23 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-13 08:56:22 --> [REQ_ID=7ffb02397d04] [REQUEST][START] HEAD /
DEBUG - 2026-03-13 08:56:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-13 08:56:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-13 08:56:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-13 08:56:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-13 08:56:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-13 08:59:24 --> [REQ_ID=98029af72d57] [REQUEST][START] HEAD /
DEBUG - 2026-03-13 08:59:24 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-13 08:59:24 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-13 08:59:24 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-13 08:59:24 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-13 08:59:24 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: none
ERROR - 2026-03-13 08:59:24 --> [ERROR_PAGE] event=error_404 status=404 message=Page not found.
DEBUG - 2026-03-13 08:59:25 --> [REQ_ID=70ed38e07efe] [REQUEST][START] HEAD /
DEBUG - 2026-03-13 08:59:25 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-13 08:59:25 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-13 08:59:25 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-13 08:59:25 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-13 08:59:25 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: none
DEBUG - 2026-03-13 08:59:28 --> [REQ_ID=783b073d26fc] [REQUEST][START] HEAD /
DEBUG - 2026-03-13 08:59:28 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-13 08:59:28 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-13 08:59:28 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-13 08:59:28 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-13 08:59:28 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: none
ERROR - 2026-03-13 08:59:28 --> [ERROR_PAGE] event=error_404 status=404 message=Page not found.
DEBUG - 2026-03-13 08:59:30 --> [REQ_ID=89d3a662d389] [REQUEST][START] HEAD /
DEBUG - 2026-03-13 08:59:30 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-13 08:59:30 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-13 08:59:30 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-13 08:59:30 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-13 08:59:30 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: none
DEBUG - 2026-03-13 09:00:02 --> [REQ_ID=1976bd572d2b] [REQUEST][START] GET /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-13 09:00:02 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-13 09:00:02 --> [REQ_ID=1976bd572d2b] [FILTER_BEFORE] /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-13 09:00:02 --> [REQ_ID=1976bd572d2b] [ROUTE] Controller=\App\Modules\Management\Controllers\ManagementAPIController Method=Run_CRON_Tasks
DEBUG - 2026-03-13 09:00:02 --> [REQ_ID=1976bd572d2b] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-13 09:00:02 --> [REQ_ID=1976bd572d2b] [REQUEST][END]
INFO - 2026-03-13 09:00:02 --> [REQ_ID=1976bd572d2b] [PERF] Execution time=0.022628
DEBUG - 2026-03-13 09:01:22 --> [REQ_ID=a8145035d1de] [REQUEST][START] HEAD /
DEBUG - 2026-03-13 09:01:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-13 09:01:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-13 09:01:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-13 09:01:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-13 09:01:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-13 09:06:22 --> [REQ_ID=827fc8e70d0d] [REQUEST][START] HEAD /
DEBUG - 2026-03-13 09:06:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-13 09:06:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-13 09:06:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-13 09:06:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-13 09:06:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-13 09:11:22 --> [REQ_ID=4a08c12f25eb] [REQUEST][START] HEAD /
DEBUG - 2026-03-13 09:11:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-13 09:11:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-13 09:11:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-13 09:11:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-13 09:11:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-13 09:15:01 --> [REQ_ID=948e186b3ec4] [REQUEST][START] GET /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-13 09:15:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-13 09:15:01 --> [REQ_ID=948e186b3ec4] [FILTER_BEFORE] /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-13 09:15:01 --> [REQ_ID=948e186b3ec4] [ROUTE] Controller=\App\Modules\APIs\Controllers\AlertsAPIController Method=fetchEmailAlerts
DEBUG - 2026-03-13 09:15:01 --> [REQ_ID=948e186b3ec4] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-13 09:15:01 --> [REQ_ID=948e186b3ec4] [REQUEST][END]
INFO - 2026-03-13 09:15:01 --> [REQ_ID=948e186b3ec4] [PERF] Execution time=0.052766
DEBUG - 2026-03-13 09:16:22 --> [REQ_ID=f8467b9e1818] [REQUEST][START] HEAD /
DEBUG - 2026-03-13 09:16:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-13 09:16:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-13 09:16:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-13 09:16:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-13 09:16:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-13 09:21:22 --> [REQ_ID=a23d3e11869e] [REQUEST][START] HEAD /
DEBUG - 2026-03-13 09:21:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-13 09:21:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-13 09:21:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-13 09:21:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-13 09:21:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-13 09:26:22 --> [REQ_ID=f3b3e5f658cd] [REQUEST][START] HEAD /
DEBUG - 2026-03-13 09:26:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-13 09:26:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-13 09:26:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-13 09:26:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-13 09:26:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-13 09:31:22 --> [REQ_ID=67fd7833d14b] [REQUEST][START] HEAD /
DEBUG - 2026-03-13 09:31:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-13 09:31:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-13 09:31:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-13 09:31:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-13 09:31:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-13 09:32:40 --> [REQ_ID=dc4bb9c30f3e] [REQUEST][START] GET /index.php/Knowledgebase/Types-Of-Accounts
DEBUG - 2026-03-13 09:32:40 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-13 09:32:40 --> [REQ_ID=dc4bb9c30f3e] [REQUEST][END]
INFO - 2026-03-13 09:32:40 --> [REQ_ID=dc4bb9c30f3e] [PERF] Execution time=0.021019
DEBUG - 2026-03-13 09:33:22 --> [REQ_ID=16755730a641] [REQUEST][START] GET /index.php
DEBUG - 2026-03-13 09:33:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-13 09:33:22 --> [REQ_ID=16755730a641] [REQUEST][END]
INFO - 2026-03-13 09:33:22 --> [REQ_ID=16755730a641] [PERF] Execution time=0.009653
DEBUG - 2026-03-13 09:35:11 --> [REQ_ID=bca8c6675a71] [REQUEST][START] GET /
DEBUG - 2026-03-13 09:35:11 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-13 09:35:11 --> [REQ_ID=bca8c6675a71] [FILTER_BEFORE] /
DEBUG - 2026-03-13 09:35:11 --> [REQ_ID=bca8c6675a71] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-13 09:35:11 --> [REQ_ID=bca8c6675a71] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-13 09:35:11 --> [CSRF] token name=csrf_test_name hash=021d37cdd9ffff5dcb10bb91b13f309f
DEBUG - 2026-03-13 09:35:11 --> [REQ_ID=cc25d9aff50f] [INIT] App\Controllers\Home::GET
INFO - 2026-03-13 09:35:11 --> [REQ_ID=cc25d9aff50f] [MEMORY][controller-start] 6291456
INFO - 2026-03-13 09:35:11 --> [REQ_ID=cc25d9aff50f] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-13 09:35:11 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-13 09:35:12 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-03-13 09:35:12 --> [REQ_ID=cc25d9aff50f] [VIEW_RENDER] themes/public/home
INFO - 2026-03-13 09:35:12 --> [REQ_ID=cc25d9aff50f] [MEMORY][commonData:start] 10485760
INFO - 2026-03-13 09:35:12 --> themesMemory usage: 10485760
DEBUG - 2026-03-13 09:35:12 --> [MetaService] slug= pageName=Home cacheHit= path=DB
DEBUG - 2026-03-13 09:35:12 --> [REQ_ID=bca8c6675a71] [FILTER_AFTER]
DEBUG - 2026-03-13 09:35:12 --> [REQ_ID=bca8c6675a71] [LIFECYCLE][END] status=200 duration_ms=906.33 memory_delta=4194304
INFO - 2026-03-13 09:35:12 --> [REQ_ID=cc25d9aff50f] [PERF] Execution time=0.904526
DEBUG - 2026-03-13 09:35:12 --> [REQ_ID=bca8c6675a71] [REQUEST][END]
INFO - 2026-03-13 09:35:12 --> [REQ_ID=bca8c6675a71] [PERF] Execution time=0.948313
DEBUG - 2026-03-13 09:36:22 --> [REQ_ID=48d7611de761] [REQUEST][START] HEAD /
DEBUG - 2026-03-13 09:36:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-13 09:36:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-13 09:36:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-13 09:36:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-13 09:36:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-13 09:37:22 --> [REQ_ID=5e91ff20edb3] [REQUEST][START] GET /index.php/Budget/Financial-Analysis
DEBUG - 2026-03-13 09:37:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-13 09:37:22 --> [REQ_ID=5e91ff20edb3] [REQUEST][END]
INFO - 2026-03-13 09:37:22 --> [REQ_ID=5e91ff20edb3] [PERF] Execution time=0.016408
DEBUG - 2026-03-13 09:41:22 --> [REQ_ID=f721d1a17f4a] [REQUEST][START] HEAD /
DEBUG - 2026-03-13 09:41:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-13 09:41:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-13 09:41:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-13 09:41:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-13 09:41:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-13 09:46:22 --> [REQ_ID=61b7d7f3fe1b] [REQUEST][START] HEAD /
DEBUG - 2026-03-13 09:46:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-13 09:46:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-13 09:46:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-13 09:46:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-13 09:46:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-13 09:46:47 --> [REQ_ID=bf1d998f3d4b] [REQUEST][START] GET /
DEBUG - 2026-03-13 09:46:47 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-13 09:46:47 --> [REQ_ID=bf1d998f3d4b] [FILTER_BEFORE] /
DEBUG - 2026-03-13 09:46:47 --> [REQ_ID=bf1d998f3d4b] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-13 09:46:47 --> [REQ_ID=bf1d998f3d4b] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-13 09:46:47 --> [CSRF] token name=csrf_test_name hash=4f89a5fce659a5fd39c29785704a40c4
DEBUG - 2026-03-13 09:46:47 --> [REQ_ID=c5c6f22bfcef] [INIT] App\Controllers\Home::GET
INFO - 2026-03-13 09:46:47 --> [REQ_ID=c5c6f22bfcef] [MEMORY][controller-start] 4194304
INFO - 2026-03-13 09:46:47 --> [REQ_ID=c5c6f22bfcef] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-13 09:46:47 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-13 09:46:48 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
DEBUG - 2026-03-13 09:46:48 --> [REQ_ID=c5c6f22bfcef] [VIEW_RENDER] themes/public/home
INFO - 2026-03-13 09:46:48 --> [REQ_ID=c5c6f22bfcef] [MEMORY][commonData:start] 8388608
INFO - 2026-03-13 09:46:48 --> themesMemory usage: 8388608
DEBUG - 2026-03-13 09:46:48 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-13 09:46:48 --> [REQ_ID=bf1d998f3d4b] [FILTER_AFTER]
DEBUG - 2026-03-13 09:46:48 --> [REQ_ID=bf1d998f3d4b] [LIFECYCLE][END] status=200 duration_ms=783.47 memory_delta=4194304
INFO - 2026-03-13 09:46:48 --> [REQ_ID=c5c6f22bfcef] [PERF] Execution time=0.781392
DEBUG - 2026-03-13 09:46:48 --> [REQ_ID=bf1d998f3d4b] [REQUEST][END]
INFO - 2026-03-13 09:46:48 --> [REQ_ID=bf1d998f3d4b] [PERF] Execution time=0.802947
DEBUG - 2026-03-13 09:51:22 --> [REQ_ID=07cd5be45efe] [REQUEST][START] HEAD /
DEBUG - 2026-03-13 09:51:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-13 09:51:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-13 09:51:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-13 09:51:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-13 09:51:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-13 09:56:22 --> [REQ_ID=e00d10185490] [REQUEST][START] HEAD /
DEBUG - 2026-03-13 09:56:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-13 09:56:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-13 09:56:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-13 09:56:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-13 09:56:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-13 10:00:02 --> [REQ_ID=1117d45605bb] [REQUEST][START] GET /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-13 10:00:02 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-13 10:00:02 --> [REQ_ID=1117d45605bb] [FILTER_BEFORE] /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-13 10:00:02 --> [REQ_ID=1117d45605bb] [ROUTE] Controller=\App\Modules\Management\Controllers\ManagementAPIController Method=Run_CRON_Tasks
DEBUG - 2026-03-13 10:00:02 --> [REQ_ID=1117d45605bb] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-13 10:00:02 --> [REQ_ID=1117d45605bb] [REQUEST][END]
INFO - 2026-03-13 10:00:02 --> [REQ_ID=1117d45605bb] [PERF] Execution time=0.039461
DEBUG - 2026-03-13 10:01:22 --> [REQ_ID=9c3fc545c916] [REQUEST][START] HEAD /
DEBUG - 2026-03-13 10:01:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-13 10:01:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-13 10:01:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-13 10:01:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-13 10:01:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-13 10:06:22 --> [REQ_ID=bc497fc770ba] [REQUEST][START] HEAD /
DEBUG - 2026-03-13 10:06:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-13 10:06:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-13 10:06:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-13 10:06:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-13 10:06:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-13 10:07:32 --> [REQ_ID=4c055db0b598] [REQUEST][START] GET /index.php/Investments
DEBUG - 2026-03-13 10:07:32 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-13 10:07:32 --> [REQ_ID=4c055db0b598] [REQUEST][END]
INFO - 2026-03-13 10:07:32 --> [REQ_ID=4c055db0b598] [PERF] Execution time=0.022597
DEBUG - 2026-03-13 10:07:33 --> [REQ_ID=8cb55bcb7677] [REQUEST][START] GET /
DEBUG - 2026-03-13 10:07:33 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-13 10:07:33 --> [REQ_ID=8cb55bcb7677] [FILTER_BEFORE] /
DEBUG - 2026-03-13 10:07:33 --> [REQ_ID=8cb55bcb7677] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-13 10:07:33 --> [REQ_ID=8cb55bcb7677] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-13 10:07:33 --> [CSRF] token name=csrf_test_name hash=5b102c563fcfd7c4df81e265bf584fb2
DEBUG - 2026-03-13 10:07:33 --> [REQ_ID=c2e27654c2b9] [INIT] App\Controllers\Home::GET
INFO - 2026-03-13 10:07:33 --> [REQ_ID=c2e27654c2b9] [MEMORY][controller-start] 4194304
INFO - 2026-03-13 10:07:34 --> [REQ_ID=c2e27654c2b9] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-13 10:07:34 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-13 10:07:34 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-03-13 10:07:34 --> [REQ_ID=c2e27654c2b9] [VIEW_RENDER] themes/public/home
INFO - 2026-03-13 10:07:34 --> [REQ_ID=c2e27654c2b9] [MEMORY][commonData:start] 8388608
INFO - 2026-03-13 10:07:34 --> themesMemory usage: 8388608
DEBUG - 2026-03-13 10:07:34 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-13 10:07:34 --> [REQ_ID=8cb55bcb7677] [FILTER_AFTER]
DEBUG - 2026-03-13 10:07:34 --> [REQ_ID=8cb55bcb7677] [LIFECYCLE][END] status=200 duration_ms=782.01 memory_delta=4194304
INFO - 2026-03-13 10:07:34 --> [REQ_ID=c2e27654c2b9] [PERF] Execution time=0.779956
DEBUG - 2026-03-13 10:07:34 --> [REQ_ID=8cb55bcb7677] [REQUEST][END]
INFO - 2026-03-13 10:07:34 --> [REQ_ID=8cb55bcb7677] [PERF] Execution time=0.792990
DEBUG - 2026-03-13 10:07:42 --> [REQ_ID=8171cf019563] [REQUEST][START] POST /index.php/register
DEBUG - 2026-03-13 10:07:42 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-13 10:07:42 --> [REQ_ID=8171cf019563] [FILTER_BEFORE] /index.php/register
DEBUG - 2026-03-13 10:07:42 --> [REQ_ID=8171cf019563] [ROUTE] Controller=\App\Controllers\AuthController Method=attemptRegister
DEBUG - 2026-03-13 10:07:42 --> [REQ_ID=8171cf019563] [LIFECYCLE][START] POST https://www.mymiwallet.com/index.php/register
DEBUG - 2026-03-13 10:07:42 --> [CSRF] token name=csrf_test_name hash=5b102c563fcfd7c4df81e265bf584fb2
INFO - 2026-03-13 10:07:42 --> CSRF token verified.
DEBUG - 2026-03-13 10:07:42 --> [REQ_ID=6565bb592413] [INIT] App\Controllers\AuthController::POST
INFO - 2026-03-13 10:07:42 --> [REQ_ID=6565bb592413] [MEMORY][controller-start] 6291456
INFO - 2026-03-13 10:07:42 --> [REGISTRATION] Submission received
INFO - 2026-03-13 10:07:42 --> MailService queued email
INFO - 2026-03-13 10:07:42 --> [REGISTRATION] Validation passed (basic fields)
INFO - 2026-03-13 10:07:42 --> [REGISTRATION] Validation passed (password fields)
INFO - 2026-03-13 10:07:42 --> Registration created user_id=11724, email=guus@korper.nl, username=NMtUPvQJjLQFpkAhdVdnd, active=, requiresActivation=1, loginIdentifier=username
INFO - 2026-03-13 10:07:42 --> [REGISTRATION] User record created
INFO - 2026-03-13 10:07:42 --> OnboardingProgressService: created onboarding record for user_id=11724
INFO - 2026-03-13 10:07:43 --> Registration succeeded for guus@korper.nl (event 5e3913fe45ac7eff)
INFO - 2026-03-13 10:07:43 --> [REGISTRATION] Activation email queued
INFO - 2026-03-13 10:07:43 --> Registration redirecting to success guide for user_id=11724
DEBUG - 2026-03-13 10:07:43 --> [REQ_ID=8171cf019563] [FILTER_AFTER]
DEBUG - 2026-03-13 10:07:43 --> [REQ_ID=8171cf019563] [LIFECYCLE][END] status=303 duration_ms=1,353.24 memory_delta=0
INFO - 2026-03-13 10:07:43 --> [REQ_ID=6565bb592413] [PERF] Execution time=1.352706
DEBUG - 2026-03-13 10:07:43 --> [REQ_ID=8171cf019563] [REQUEST][END]
INFO - 2026-03-13 10:07:43 --> [REQ_ID=8171cf019563] [PERF] Execution time=1.368494
DEBUG - 2026-03-13 10:07:44 --> [REQ_ID=b518f387b717] [REQUEST][START] GET /index.php/register/success
DEBUG - 2026-03-13 10:07:44 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-13 10:07:44 --> [REQ_ID=b518f387b717] [FILTER_BEFORE] /index.php/register/success
DEBUG - 2026-03-13 10:07:44 --> [REQ_ID=b518f387b717] [ROUTE] Controller=\App\Controllers\AuthController Method=registerSuccess
DEBUG - 2026-03-13 10:07:44 --> [REQ_ID=b518f387b717] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/register/success
DEBUG - 2026-03-13 10:07:44 --> [CSRF] token name=csrf_test_name hash=5b102c563fcfd7c4df81e265bf584fb2
DEBUG - 2026-03-13 10:07:44 --> [REQ_ID=21906135b027] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-13 10:07:44 --> [REQ_ID=21906135b027] [MEMORY][controller-start] 4194304
INFO - 2026-03-13 10:07:44 --> AuthController::registerSuccess view rendered.
INFO - 2026-03-13 10:07:44 --> [REQ_ID=21906135b027] [PERF] Execution time=0.024543
DEBUG - 2026-03-13 10:07:56 --> [REQ_ID=20c9f61f09e8] [REQUEST][START] GET /index.php/Free/register
DEBUG - 2026-03-13 10:07:56 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-13 10:07:56 --> [REQ_ID=20c9f61f09e8] [FILTER_BEFORE] /index.php/Free/register
DEBUG - 2026-03-13 10:07:56 --> [REQ_ID=20c9f61f09e8] [ROUTE] Controller=\App\Controllers\AuthController Method=register
DEBUG - 2026-03-13 10:07:56 --> [REQ_ID=20c9f61f09e8] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Free/register
DEBUG - 2026-03-13 10:07:56 --> [CSRF] token name=csrf_test_name hash=5b102c563fcfd7c4df81e265bf584fb2
DEBUG - 2026-03-13 10:07:56 --> [REQ_ID=20c9f61f09e8] [REQUEST][END]
INFO - 2026-03-13 10:07:56 --> [REQ_ID=20c9f61f09e8] [PERF] Execution time=0.010104
DEBUG - 2026-03-13 10:07:57 --> [REQ_ID=03d2c294b444] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-13 10:07:57 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-13 10:07:57 --> [REQ_ID=03d2c294b444] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-13 10:07:57 --> [REQ_ID=03d2c294b444] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-13 10:07:57 --> [REQ_ID=03d2c294b444] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-13 10:07:57 --> [CSRF] token name=csrf_test_name hash=5b102c563fcfd7c4df81e265bf584fb2
DEBUG - 2026-03-13 10:07:57 --> [REQ_ID=afa93ab26820] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-13 10:07:57 --> [REQ_ID=afa93ab26820] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-13 10:07:57 --> [REQ_ID=03d2c294b444] [FILTER_AFTER]
DEBUG - 2026-03-13 10:07:57 --> [REQ_ID=03d2c294b444] [LIFECYCLE][END] status=200 duration_ms=30.58 memory_delta=0
INFO - 2026-03-13 10:07:57 --> [REQ_ID=afa93ab26820] [PERF] Execution time=0.030418
DEBUG - 2026-03-13 10:07:57 --> [REQ_ID=03d2c294b444] [REQUEST][END]
INFO - 2026-03-13 10:07:57 --> [REQ_ID=03d2c294b444] [PERF] Execution time=0.040307
DEBUG - 2026-03-13 10:08:05 --> [REQ_ID=fcc979f41744] [REQUEST][START] POST /index.php/login
DEBUG - 2026-03-13 10:08:05 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-13 10:08:05 --> [REQ_ID=fcc979f41744] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-13 10:08:05 --> [REQ_ID=fcc979f41744] [ROUTE] Controller=\App\Controllers\AuthController Method=attemptLogin
DEBUG - 2026-03-13 10:08:05 --> [REQ_ID=fcc979f41744] [LIFECYCLE][START] POST https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-13 10:08:05 --> [CSRF] token name=csrf_test_name hash=5b102c563fcfd7c4df81e265bf584fb2
INFO - 2026-03-13 10:08:05 --> CSRF token verified.
DEBUG - 2026-03-13 10:08:05 --> [REQ_ID=cf203c90d195] [INIT] App\Controllers\AuthController::POST
INFO - 2026-03-13 10:08:05 --> [REQ_ID=cf203c90d195] [MEMORY][controller-start] 4194304
INFO - 2026-03-13 10:08:05 --> AuthController L93: Auth:attemptLogin started.
INFO - 2026-03-13 10:08:05 --> AuthController L104: Auth:attemptLogin rules: {"login":"required","password":"required"}
INFO - 2026-03-13 10:08:05 --> AuthController L132: Auth:attemptLogin Login Variables: login: required, remember: true, ip: 185.220.101.15, ua: "Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36"
DEBUG - 2026-03-13 10:08:05 --> Auth attemptLogin() called with login identifier: guus@korper.nl, remember: true
DEBUG - 2026-03-13 10:08:05 --> Auth attemptLogin() called. redirect_url in session: https://www.mymiwallet.com/index.php/Free/register
DEBUG - 2026-03-13 10:08:05 --> Auth credentials normalised for attempt using key "email"
WARNING - 2026-03-13 10:08:05 --> [AUTH_FAILURE] 
DEBUG - 2026-03-13 10:08:05 --> Auth attempt failed for identifier guus@korper.nl. Error: Unable to log you in. Please check your password.
WARNING - 2026-03-13 10:08:05 --> [AUTH] Login failure
WARNING - 2026-03-13 10:08:05 --> [AUTH] Login failed
DEBUG - 2026-03-13 10:08:05 --> [REQ_ID=fcc979f41744] [FILTER_AFTER]
DEBUG - 2026-03-13 10:08:05 --> [REQ_ID=fcc979f41744] [LIFECYCLE][END] status=303 duration_ms=246.57 memory_delta=0
INFO - 2026-03-13 10:08:05 --> [REQ_ID=cf203c90d195] [PERF] Execution time=0.246410
DEBUG - 2026-03-13 10:08:05 --> [REQ_ID=fcc979f41744] [REQUEST][END]
INFO - 2026-03-13 10:08:05 --> [REQ_ID=fcc979f41744] [PERF] Execution time=0.257449
DEBUG - 2026-03-13 10:08:05 --> [REQ_ID=5e976703ed57] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-13 10:08:05 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-13 10:08:05 --> [REQ_ID=5e976703ed57] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-13 10:08:05 --> [REQ_ID=5e976703ed57] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-13 10:08:05 --> [REQ_ID=5e976703ed57] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-13 10:08:05 --> [CSRF] token name=csrf_test_name hash=5b102c563fcfd7c4df81e265bf584fb2
DEBUG - 2026-03-13 10:08:05 --> [REQ_ID=19c197befe18] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-13 10:08:05 --> [REQ_ID=19c197befe18] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-13 10:08:05 --> [REQ_ID=5e976703ed57] [FILTER_AFTER]
DEBUG - 2026-03-13 10:08:05 --> [REQ_ID=5e976703ed57] [LIFECYCLE][END] status=200 duration_ms=20.34 memory_delta=0
INFO - 2026-03-13 10:08:05 --> [REQ_ID=19c197befe18] [PERF] Execution time=0.020220
DEBUG - 2026-03-13 10:08:05 --> [REQ_ID=5e976703ed57] [REQUEST][END]
INFO - 2026-03-13 10:08:05 --> [REQ_ID=5e976703ed57] [PERF] Execution time=0.030051
DEBUG - 2026-03-13 10:08:19 --> [REQ_ID=ab78e0d12c7d] [REQUEST][START] GET /index.php/How-It-Works/Registering-An-Account
DEBUG - 2026-03-13 10:08:19 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-13 10:08:19 --> [REQ_ID=ab78e0d12c7d] [FILTER_BEFORE] /index.php/How-It-Works/Registering-An-Account
DEBUG - 2026-03-13 10:08:19 --> [REQ_ID=ab78e0d12c7d] [ROUTE] Controller=\App\Modules\Blog\Controllers\HowItWorksController Method=show
DEBUG - 2026-03-13 10:08:19 --> [REQ_ID=ab78e0d12c7d] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/How-It-Works/Registering-An-Account
DEBUG - 2026-03-13 10:08:19 --> [CSRF] token name=csrf_test_name hash=5b102c563fcfd7c4df81e265bf584fb2
DEBUG - 2026-03-13 10:08:19 --> [REQ_ID=5b538248c8af] [INIT] App\Modules\Blog\Controllers\HowItWorksController::GET
INFO - 2026-03-13 10:08:19 --> [REQ_ID=5b538248c8af] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-13 10:08:20 --> [REQ_ID=5b538248c8af] [METHOD_ENTRY] show
DEBUG - 2026-03-13 10:08:20 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-13 10:08:20 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-13 10:08:20 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-13 10:08:20 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-13 10:08:20 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-13 10:08:20 --> MyMICoin: guest context detected; skipping user-specific preload.
ERROR - 2026-03-13 10:08:20 --> HowItWorksController failure: Call to undefined method App\Modules\Blog\Controllers\HowItWorksController::respondWithRendered()
INFO - 2026-03-13 10:08:20 --> [REQ_ID=5b538248c8af] [PERF] Execution time=0.118811
DEBUG - 2026-03-13 10:08:23 --> [REQ_ID=57437b425951] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-13 10:08:23 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-13 10:08:23 --> [REQ_ID=57437b425951] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-13 10:08:23 --> [REQ_ID=57437b425951] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-13 10:08:23 --> [REQ_ID=57437b425951] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-13 10:08:23 --> [CSRF] token name=csrf_test_name hash=5b102c563fcfd7c4df81e265bf584fb2
DEBUG - 2026-03-13 10:08:23 --> [REQ_ID=2be283f4c689] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-13 10:08:23 --> [REQ_ID=2be283f4c689] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-13 10:08:23 --> [REQ_ID=57437b425951] [FILTER_AFTER]
DEBUG - 2026-03-13 10:08:23 --> [REQ_ID=57437b425951] [LIFECYCLE][END] status=200 duration_ms=23.91 memory_delta=0
INFO - 2026-03-13 10:08:23 --> [REQ_ID=2be283f4c689] [PERF] Execution time=0.023795
DEBUG - 2026-03-13 10:08:23 --> [REQ_ID=57437b425951] [REQUEST][END]
INFO - 2026-03-13 10:08:23 --> [REQ_ID=57437b425951] [PERF] Execution time=0.033131
DEBUG - 2026-03-13 10:08:28 --> [REQ_ID=f854d5be1733] [REQUEST][START] GET /index.php
DEBUG - 2026-03-13 10:08:28 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-13 10:08:28 --> [REQ_ID=f854d5be1733] [FILTER_BEFORE] /index.php
DEBUG - 2026-03-13 10:08:28 --> [REQ_ID=f854d5be1733] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-13 10:08:28 --> [REQ_ID=f854d5be1733] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-13 10:08:28 --> [CSRF] token name=csrf_test_name hash=3710c0bc1bb2142d37df9ec0e177940a
DEBUG - 2026-03-13 10:08:28 --> [REQ_ID=4826a9ec78f0] [INIT] App\Controllers\Home::GET
INFO - 2026-03-13 10:08:28 --> [REQ_ID=4826a9ec78f0] [MEMORY][controller-start] 4194304
INFO - 2026-03-13 10:08:28 --> [REQ_ID=4826a9ec78f0] [MEMORY][commonData:start] 4194304
DEBUG - 2026-03-13 10:08:28 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-13 10:08:29 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
DEBUG - 2026-03-13 10:08:29 --> [REQ_ID=4826a9ec78f0] [VIEW_RENDER] themes/public/home
INFO - 2026-03-13 10:08:29 --> [REQ_ID=4826a9ec78f0] [MEMORY][commonData:start] 8388608
INFO - 2026-03-13 10:08:29 --> themesMemory usage: 8388608
DEBUG - 2026-03-13 10:08:29 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-13 10:08:29 --> [REQ_ID=f854d5be1733] [FILTER_AFTER]
DEBUG - 2026-03-13 10:08:29 --> [REQ_ID=f854d5be1733] [LIFECYCLE][END] status=200 duration_ms=781.88 memory_delta=4194304
INFO - 2026-03-13 10:08:29 --> [REQ_ID=4826a9ec78f0] [PERF] Execution time=0.781607
DEBUG - 2026-03-13 10:08:29 --> [REQ_ID=f854d5be1733] [REQUEST][END]
INFO - 2026-03-13 10:08:29 --> [REQ_ID=f854d5be1733] [PERF] Execution time=0.793253
DEBUG - 2026-03-13 10:08:29 --> [REQ_ID=6688140b5e5b] [REQUEST][START] GET /index.php/activate-account?token=a2657d757be007e9045849e62da0eddf
DEBUG - 2026-03-13 10:08:29 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-13 10:08:29 --> [REQ_ID=6688140b5e5b] [FILTER_BEFORE] /index.php/activate-account?token=a2657d757be007e9045849e62da0eddf
DEBUG - 2026-03-13 10:08:29 --> [REQ_ID=6688140b5e5b] [ROUTE] Controller=\App\Controllers\AuthController Method=activateAccount
DEBUG - 2026-03-13 10:08:29 --> [REQ_ID=6688140b5e5b] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/activate-account?token=a2657d757be007e9045849e62da0eddf
DEBUG - 2026-03-13 10:08:29 --> [CSRF] token name=csrf_test_name hash=2fe2469c2c3e80114005667827bf3889
DEBUG - 2026-03-13 10:08:29 --> [REQ_ID=b3c096e7a745] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-13 10:08:29 --> [REQ_ID=b3c096e7a745] [MEMORY][controller-start] 6291456
INFO - 2026-03-13 10:08:29 --> [ACTIVATION] Activation link hit
ERROR - 2026-03-13 10:08:29 --> [ACTIVATION] Activation failed: user not found
DEBUG - 2026-03-13 10:08:29 --> [REQ_ID=6688140b5e5b] [FILTER_AFTER]
DEBUG - 2026-03-13 10:08:29 --> [REQ_ID=6688140b5e5b] [LIFECYCLE][END] status=302 duration_ms=177.80 memory_delta=0
INFO - 2026-03-13 10:08:29 --> [REQ_ID=b3c096e7a745] [PERF] Execution time=0.176779
DEBUG - 2026-03-13 10:08:29 --> [REQ_ID=6688140b5e5b] [REQUEST][END]
INFO - 2026-03-13 10:08:29 --> [REQ_ID=6688140b5e5b] [PERF] Execution time=0.189689
DEBUG - 2026-03-13 10:08:30 --> [REQ_ID=78773ea7b89d] [REQUEST][START] GET /index.php/How-It-Works/Investor-Profile
DEBUG - 2026-03-13 10:08:30 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-13 10:08:30 --> [REQ_ID=78773ea7b89d] [FILTER_BEFORE] /index.php/How-It-Works/Investor-Profile
DEBUG - 2026-03-13 10:08:30 --> [REQ_ID=78773ea7b89d] [ROUTE] Controller=\App\Modules\Blog\Controllers\HowItWorksController Method=show
DEBUG - 2026-03-13 10:08:30 --> [REQ_ID=78773ea7b89d] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/How-It-Works/Investor-Profile
DEBUG - 2026-03-13 10:08:30 --> [CSRF] token name=csrf_test_name hash=5b102c563fcfd7c4df81e265bf584fb2
DEBUG - 2026-03-13 10:08:30 --> [REQ_ID=d847282c7d6f] [INIT] App\Modules\Blog\Controllers\HowItWorksController::GET
INFO - 2026-03-13 10:08:30 --> [REQ_ID=d847282c7d6f] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-13 10:08:30 --> [REQ_ID=d847282c7d6f] [METHOD_ENTRY] show
DEBUG - 2026-03-13 10:08:30 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-13 10:08:30 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-13 10:08:30 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-13 10:08:30 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-13 10:08:30 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-13 10:08:30 --> MyMICoin: guest context detected; skipping user-specific preload.
ERROR - 2026-03-13 10:08:30 --> HowItWorksController failure: investor-profile
CRITICAL - 2026-03-13 10:08:30 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: GET, Route: How-It-Works/Investor-Profile]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-13 10:08:30 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-13 10:08:30 --> [404] URI=https://www.mymiwallet.com/index.php/How-It-Works/Investor-Profile
WARNING - 2026-03-13 10:08:30 --> 404 route miss: https://www.mymiwallet.com/index.php/How-It-Works/Investor-Profile | referrer: none
ERROR - 2026-03-13 10:08:30 --> [ERROR_PAGE] event=error_404 status=404 message=Page not found.
INFO - 2026-03-13 10:08:30 --> [REQ_ID=d847282c7d6f] [PERF] Execution time=0.060794
DEBUG - 2026-03-13 10:08:31 --> [REQ_ID=a9f8c372f32b] [REQUEST][START] GET /index.php/Support/Account
DEBUG - 2026-03-13 10:08:31 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-13 10:08:31 --> [REQ_ID=a9f8c372f32b] [FILTER_BEFORE] /index.php/Support/Account
DEBUG - 2026-03-13 10:08:31 --> [REQ_ID=a9f8c372f32b] [ROUTE] Controller=\App\Modules\Support\Controllers\AccountSupportController Method=index
DEBUG - 2026-03-13 10:08:31 --> [REQ_ID=a9f8c372f32b] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Support/Account
DEBUG - 2026-03-13 10:08:31 --> [CSRF] token name=csrf_test_name hash=3710c0bc1bb2142d37df9ec0e177940a
DEBUG - 2026-03-13 10:08:31 --> [REQ_ID=c2187fd3046e] [INIT] App\Modules\Support\Controllers\AccountSupportController::GET
INFO - 2026-03-13 10:08:31 --> [REQ_ID=c2187fd3046e] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-13 10:08:31 --> [REQ_ID=c2187fd3046e] [METHOD_ENTRY] index
DEBUG - 2026-03-13 10:08:31 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-13 10:08:31 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-13 10:08:31 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-13 10:08:31 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-13 10:08:31 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-13 10:08:31 --> MyMICoin: guest context detected; skipping user-specific preload.
INFO - 2026-03-13 10:08:31 --> [REQ_ID=c2187fd3046e] [MEMORY][commonData:start] 4194304
DEBUG - 2026-03-13 10:08:31 --> [REQ_ID=c2187fd3046e] [VIEW_RENDER] SupportModule/Support/account_help
INFO - 2026-03-13 10:08:31 --> [REQ_ID=c2187fd3046e] [MEMORY][commonData:start] 4194304
INFO - 2026-03-13 10:08:31 --> themesMemory usage: 4194304
DEBUG - 2026-03-13 10:08:31 --> [REQ_ID=a9f8c372f32b] [FILTER_AFTER]
DEBUG - 2026-03-13 10:08:31 --> [REQ_ID=a9f8c372f32b] [LIFECYCLE][END] status=200 duration_ms=34.68 memory_delta=0
INFO - 2026-03-13 10:08:31 --> [REQ_ID=c2187fd3046e] [PERF] Execution time=0.034338
DEBUG - 2026-03-13 10:08:31 --> [REQ_ID=a9f8c372f32b] [REQUEST][END]
INFO - 2026-03-13 10:08:31 --> [REQ_ID=a9f8c372f32b] [PERF] Execution time=0.044781
DEBUG - 2026-03-13 10:08:34 --> [REQ_ID=8d62e9c022ff] [REQUEST][START] GET /index.php/register
DEBUG - 2026-03-13 10:08:34 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-13 10:08:34 --> [REQ_ID=8d62e9c022ff] [FILTER_BEFORE] /index.php/register
DEBUG - 2026-03-13 10:08:34 --> [REQ_ID=8d62e9c022ff] [ROUTE] Controller=\App\Controllers\AuthController Method=register
DEBUG - 2026-03-13 10:08:34 --> [REQ_ID=8d62e9c022ff] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/register
DEBUG - 2026-03-13 10:08:34 --> [CSRF] token name=csrf_test_name hash=5b102c563fcfd7c4df81e265bf584fb2
DEBUG - 2026-03-13 10:08:34 --> [REQ_ID=aefd8a33ad0a] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-13 10:08:34 --> [REQ_ID=aefd8a33ad0a] [MEMORY][controller-start] 4194304
INFO - 2026-03-13 10:08:34 --> [REGISTRATION] Form loaded
INFO - 2026-03-13 10:08:34 --> [REQ_ID=aefd8a33ad0a] [PERF] Execution time=0.025402
DEBUG - 2026-03-13 10:08:39 --> [REQ_ID=38bab12388a6] [REQUEST][START] GET /index.php/Support/Account
DEBUG - 2026-03-13 10:08:39 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-13 10:08:39 --> [REQ_ID=38bab12388a6] [FILTER_BEFORE] /index.php/Support/Account
DEBUG - 2026-03-13 10:08:39 --> [REQ_ID=38bab12388a6] [ROUTE] Controller=\App\Modules\Support\Controllers\AccountSupportController Method=index
DEBUG - 2026-03-13 10:08:39 --> [REQ_ID=38bab12388a6] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Support/Account
DEBUG - 2026-03-13 10:08:39 --> [CSRF] token name=csrf_test_name hash=5b102c563fcfd7c4df81e265bf584fb2
DEBUG - 2026-03-13 10:08:39 --> [REQ_ID=887e5512c785] [INIT] App\Modules\Support\Controllers\AccountSupportController::GET
INFO - 2026-03-13 10:08:39 --> [REQ_ID=887e5512c785] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-13 10:08:39 --> [REQ_ID=887e5512c785] [METHOD_ENTRY] index
DEBUG - 2026-03-13 10:08:39 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-13 10:08:39 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-13 10:08:39 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-13 10:08:39 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-13 10:08:39 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-13 10:08:39 --> MyMICoin: guest context detected; skipping user-specific preload.
INFO - 2026-03-13 10:08:39 --> [REQ_ID=887e5512c785] [MEMORY][commonData:start] 4194304
DEBUG - 2026-03-13 10:08:39 --> [REQ_ID=887e5512c785] [VIEW_RENDER] SupportModule/Support/account_help
INFO - 2026-03-13 10:08:39 --> [REQ_ID=887e5512c785] [MEMORY][commonData:start] 4194304
INFO - 2026-03-13 10:08:39 --> themesMemory usage: 4194304
DEBUG - 2026-03-13 10:08:39 --> [REQ_ID=38bab12388a6] [FILTER_AFTER]
DEBUG - 2026-03-13 10:08:39 --> [REQ_ID=38bab12388a6] [LIFECYCLE][END] status=200 duration_ms=35.10 memory_delta=0
INFO - 2026-03-13 10:08:39 --> [REQ_ID=887e5512c785] [PERF] Execution time=0.034868
DEBUG - 2026-03-13 10:08:39 --> [REQ_ID=38bab12388a6] [REQUEST][END]
INFO - 2026-03-13 10:08:39 --> [REQ_ID=38bab12388a6] [PERF] Execution time=0.044589
DEBUG - 2026-03-13 10:08:45 --> [REQ_ID=3ea6e640d0d9] [REQUEST][START] POST /index.php/Support/resendActivation
DEBUG - 2026-03-13 10:08:45 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-13 10:08:45 --> [REQ_ID=3ea6e640d0d9] [FILTER_BEFORE] /index.php/Support/resendActivation
DEBUG - 2026-03-13 10:08:45 --> [REQ_ID=3ea6e640d0d9] [ROUTE] Controller=\App\Modules\Support\Controllers\AccountSupportController Method=resendActivation
DEBUG - 2026-03-13 10:08:45 --> [REQ_ID=3ea6e640d0d9] [LIFECYCLE][START] POST https://www.mymiwallet.com/index.php/Support/resendActivation
DEBUG - 2026-03-13 10:08:45 --> [CSRF] token name=csrf_test_name hash=5b102c563fcfd7c4df81e265bf584fb2
INFO - 2026-03-13 10:08:45 --> CSRF token verified.
DEBUG - 2026-03-13 10:08:45 --> [REQ_ID=169ef11f3faa] [INIT] App\Modules\Support\Controllers\AccountSupportController::POST
INFO - 2026-03-13 10:08:45 --> [REQ_ID=169ef11f3faa] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-13 10:08:45 --> [REQ_ID=169ef11f3faa] [METHOD_ENTRY] resendActivation
DEBUG - 2026-03-13 10:08:45 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-13 10:08:45 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-13 10:08:45 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-13 10:08:45 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-13 10:08:45 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-13 10:08:45 --> MyMICoin: guest context detected; skipping user-specific preload.
INFO - 2026-03-13 10:08:45 --> [SUPPORT] Account help requested
INFO - 2026-03-13 10:08:46 --> [SUPPORT] Account help outcome
DEBUG - 2026-03-13 10:08:46 --> [REQ_ID=3ea6e640d0d9] [FILTER_AFTER]
DEBUG - 2026-03-13 10:08:46 --> [REQ_ID=3ea6e640d0d9] [LIFECYCLE][END] status=303 duration_ms=1,461.04 memory_delta=0
INFO - 2026-03-13 10:08:46 --> [REQ_ID=169ef11f3faa] [PERF] Execution time=1.460902
DEBUG - 2026-03-13 10:08:46 --> [REQ_ID=3ea6e640d0d9] [REQUEST][END]
INFO - 2026-03-13 10:08:46 --> [REQ_ID=3ea6e640d0d9] [PERF] Execution time=1.471844
DEBUG - 2026-03-13 10:08:47 --> [REQ_ID=67f86b60f30c] [REQUEST][START] GET /index.php/Support/Account
DEBUG - 2026-03-13 10:08:47 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-13 10:08:47 --> [REQ_ID=67f86b60f30c] [FILTER_BEFORE] /index.php/Support/Account
DEBUG - 2026-03-13 10:08:47 --> [REQ_ID=67f86b60f30c] [ROUTE] Controller=\App\Modules\Support\Controllers\AccountSupportController Method=index
DEBUG - 2026-03-13 10:08:47 --> [REQ_ID=67f86b60f30c] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Support/Account
DEBUG - 2026-03-13 10:08:47 --> [CSRF] token name=csrf_test_name hash=5b102c563fcfd7c4df81e265bf584fb2
DEBUG - 2026-03-13 10:08:47 --> [REQ_ID=1139ffd54a94] [INIT] App\Modules\Support\Controllers\AccountSupportController::GET
INFO - 2026-03-13 10:08:47 --> [REQ_ID=1139ffd54a94] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-13 10:08:47 --> [REQ_ID=1139ffd54a94] [METHOD_ENTRY] index
DEBUG - 2026-03-13 10:08:47 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-13 10:08:47 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-13 10:08:47 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-13 10:08:47 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-13 10:08:47 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-13 10:08:47 --> MyMICoin: guest context detected; skipping user-specific preload.
INFO - 2026-03-13 10:08:47 --> [REQ_ID=1139ffd54a94] [MEMORY][commonData:start] 4194304
DEBUG - 2026-03-13 10:08:47 --> [REQ_ID=1139ffd54a94] [VIEW_RENDER] SupportModule/Support/account_help
INFO - 2026-03-13 10:08:47 --> [REQ_ID=1139ffd54a94] [MEMORY][commonData:start] 4194304
INFO - 2026-03-13 10:08:47 --> themesMemory usage: 4194304
DEBUG - 2026-03-13 10:08:47 --> [REQ_ID=67f86b60f30c] [FILTER_AFTER]
DEBUG - 2026-03-13 10:08:47 --> [REQ_ID=67f86b60f30c] [LIFECYCLE][END] status=200 duration_ms=27.28 memory_delta=0
INFO - 2026-03-13 10:08:47 --> [REQ_ID=1139ffd54a94] [PERF] Execution time=0.027068
DEBUG - 2026-03-13 10:08:47 --> [REQ_ID=67f86b60f30c] [REQUEST][END]
INFO - 2026-03-13 10:08:47 --> [REQ_ID=67f86b60f30c] [PERF] Execution time=0.037215
DEBUG - 2026-03-13 10:08:48 --> [REQ_ID=a0976338ac93] [REQUEST][START] GET /index.php/MyMI-Gold/Goals/Daily
DEBUG - 2026-03-13 10:08:48 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-13 10:08:48 --> [REQ_ID=a0976338ac93] [FILTER_BEFORE] /index.php/MyMI-Gold/Goals/Daily
DEBUG - 2026-03-13 10:08:48 --> [REQ_ID=a0976338ac93] [ROUTE] Controller=\App\Modules\User\Controllers\DashboardController Method=goals
DEBUG - 2026-03-13 10:08:48 --> [REQ_ID=a0976338ac93] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/MyMI-Gold/Goals/Daily
DEBUG - 2026-03-13 10:08:48 --> [CSRF] token name=csrf_test_name hash=3710c0bc1bb2142d37df9ec0e177940a
DEBUG - 2026-03-13 10:08:48 --> [REQ_ID=a0976338ac93] [REQUEST][END]
INFO - 2026-03-13 10:08:48 --> [REQ_ID=a0976338ac93] [PERF] Execution time=0.013466
DEBUG - 2026-03-13 10:08:48 --> [REQ_ID=a92780235ed4] [REQUEST][START] GET /index.php/Marketplace
DEBUG - 2026-03-13 10:08:48 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-13 10:08:48 --> [REQ_ID=a92780235ed4] [FILTER_BEFORE] /index.php/Marketplace
DEBUG - 2026-03-13 10:08:48 --> [REQ_ID=a92780235ed4] [ROUTE] Controller=\App\Modules\ScriptStudio\Controllers\ScriptStudioController Method=marketplace
DEBUG - 2026-03-13 10:08:48 --> [REQ_ID=a92780235ed4] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Marketplace
DEBUG - 2026-03-13 10:08:48 --> [CSRF] token name=csrf_test_name hash=3710c0bc1bb2142d37df9ec0e177940a
DEBUG - 2026-03-13 10:08:48 --> [REQ_ID=a92780235ed4] [REQUEST][END]
INFO - 2026-03-13 10:08:48 --> [REQ_ID=a92780235ed4] [PERF] Execution time=0.010311
DEBUG - 2026-03-13 10:08:48 --> [REQ_ID=e9b7619bf3ee] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-13 10:08:48 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-13 10:08:48 --> [REQ_ID=e9b7619bf3ee] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-13 10:08:48 --> [REQ_ID=e9b7619bf3ee] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-13 10:08:48 --> [REQ_ID=e9b7619bf3ee] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-13 10:08:48 --> [CSRF] token name=csrf_test_name hash=3710c0bc1bb2142d37df9ec0e177940a
DEBUG - 2026-03-13 10:08:48 --> [REQ_ID=378d5d1dc00a] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-13 10:08:48 --> [REQ_ID=378d5d1dc00a] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-13 10:08:48 --> [REQ_ID=e9b7619bf3ee] [FILTER_AFTER]
DEBUG - 2026-03-13 10:08:48 --> [REQ_ID=e9b7619bf3ee] [LIFECYCLE][END] status=200 duration_ms=26.32 memory_delta=0
INFO - 2026-03-13 10:08:48 --> [REQ_ID=378d5d1dc00a] [PERF] Execution time=0.026341
DEBUG - 2026-03-13 10:08:48 --> [REQ_ID=e9b7619bf3ee] [REQUEST][END]
INFO - 2026-03-13 10:08:48 --> [REQ_ID=e9b7619bf3ee] [PERF] Execution time=0.035341
DEBUG - 2026-03-13 10:09:00 --> [REQ_ID=67ba814f37b8] [REQUEST][START] GET /index.php/forgot
DEBUG - 2026-03-13 10:09:00 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-13 10:09:00 --> [REQ_ID=67ba814f37b8] [FILTER_BEFORE] /index.php/forgot
DEBUG - 2026-03-13 10:09:00 --> [REQ_ID=67ba814f37b8] [ROUTE] Controller=\Myth\Auth\Controllers\AuthController Method=forgotPassword
DEBUG - 2026-03-13 10:09:00 --> [REQ_ID=67ba814f37b8] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/forgot
DEBUG - 2026-03-13 10:09:00 --> [CSRF] token name=csrf_test_name hash=5b102c563fcfd7c4df81e265bf584fb2
DEBUG - 2026-03-13 10:09:00 --> [REQ_ID=67ba814f37b8] [FILTER_AFTER]
DEBUG - 2026-03-13 10:09:00 --> [REQ_ID=67ba814f37b8] [LIFECYCLE][END] status=200 duration_ms=3.24 memory_delta=0
DEBUG - 2026-03-13 10:09:00 --> [REQ_ID=67ba814f37b8] [REQUEST][END]
INFO - 2026-03-13 10:09:00 --> [REQ_ID=67ba814f37b8] [PERF] Execution time=0.014089
DEBUG - 2026-03-13 10:09:05 --> [REQ_ID=32ec6fb2e0f4] [REQUEST][START] GET /index.php/Account/Activity
DEBUG - 2026-03-13 10:09:05 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-13 10:09:05 --> [REQ_ID=32ec6fb2e0f4] [FILTER_BEFORE] /index.php/Account/Activity
DEBUG - 2026-03-13 10:09:05 --> [REQ_ID=32ec6fb2e0f4] [ROUTE] Controller=\App\Modules\User\Controllers\DashboardController Method=activity
DEBUG - 2026-03-13 10:09:05 --> [REQ_ID=32ec6fb2e0f4] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Account/Activity
DEBUG - 2026-03-13 10:09:05 --> [CSRF] token name=csrf_test_name hash=5b102c563fcfd7c4df81e265bf584fb2
DEBUG - 2026-03-13 10:09:05 --> [REQ_ID=32ec6fb2e0f4] [REQUEST][END]
INFO - 2026-03-13 10:09:05 --> [REQ_ID=32ec6fb2e0f4] [PERF] Execution time=0.009851
DEBUG - 2026-03-13 10:09:05 --> [REQ_ID=e4c50cd2b5e7] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-13 10:09:05 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-13 10:09:05 --> [REQ_ID=e4c50cd2b5e7] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-13 10:09:05 --> [REQ_ID=e4c50cd2b5e7] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-13 10:09:05 --> [REQ_ID=e4c50cd2b5e7] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-13 10:09:05 --> [CSRF] token name=csrf_test_name hash=5b102c563fcfd7c4df81e265bf584fb2
DEBUG - 2026-03-13 10:09:05 --> [REQ_ID=7fd738432bbc] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-13 10:09:05 --> [REQ_ID=7fd738432bbc] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-13 10:09:06 --> [REQ_ID=e4c50cd2b5e7] [FILTER_AFTER]
DEBUG - 2026-03-13 10:09:06 --> [REQ_ID=e4c50cd2b5e7] [LIFECYCLE][END] status=200 duration_ms=353.98 memory_delta=0
INFO - 2026-03-13 10:09:06 --> [REQ_ID=7fd738432bbc] [PERF] Execution time=0.353931
DEBUG - 2026-03-13 10:09:06 --> [REQ_ID=e4c50cd2b5e7] [REQUEST][END]
INFO - 2026-03-13 10:09:06 --> [REQ_ID=e4c50cd2b5e7] [PERF] Execution time=0.363809
DEBUG - 2026-03-13 10:09:15 --> [REQ_ID=4566bd471a65] [REQUEST][START] GET /index.php/Profile/
DEBUG - 2026-03-13 10:09:15 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-13 10:09:15 --> [REQ_ID=4566bd471a65] [FILTER_BEFORE] /index.php/Profile/
DEBUG - 2026-03-13 10:09:15 --> [REQ_ID=4566bd471a65] [ROUTE] Controller=\App\Controllers\App\Modules\User\Controllers\DashboardController Method=profile
DEBUG - 2026-03-13 10:09:15 --> [REQ_ID=4566bd471a65] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Profile/
DEBUG - 2026-03-13 10:09:15 --> [CSRF] token name=csrf_test_name hash=5b102c563fcfd7c4df81e265bf584fb2
DEBUG - 2026-03-13 10:09:15 --> [REQ_ID=4566bd471a65] [REQUEST][END]
INFO - 2026-03-13 10:09:15 --> [REQ_ID=4566bd471a65] [PERF] Execution time=0.010133
DEBUG - 2026-03-13 10:09:16 --> [REQ_ID=afc1fd023147] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-13 10:09:16 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-13 10:09:16 --> [REQ_ID=afc1fd023147] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-13 10:09:16 --> [REQ_ID=afc1fd023147] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-13 10:09:16 --> [REQ_ID=afc1fd023147] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-13 10:09:16 --> [CSRF] token name=csrf_test_name hash=5b102c563fcfd7c4df81e265bf584fb2
DEBUG - 2026-03-13 10:09:16 --> [REQ_ID=329a6b02a609] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-13 10:09:16 --> [REQ_ID=329a6b02a609] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-13 10:09:16 --> [REQ_ID=afc1fd023147] [FILTER_AFTER]
DEBUG - 2026-03-13 10:09:16 --> [REQ_ID=afc1fd023147] [LIFECYCLE][END] status=200 duration_ms=20.76 memory_delta=0
INFO - 2026-03-13 10:09:16 --> [REQ_ID=329a6b02a609] [PERF] Execution time=0.020302
DEBUG - 2026-03-13 10:09:16 --> [REQ_ID=afc1fd023147] [REQUEST][END]
INFO - 2026-03-13 10:09:16 --> [REQ_ID=afc1fd023147] [PERF] Execution time=0.029910
DEBUG - 2026-03-13 10:09:28 --> [REQ_ID=aad1eb39c07b] [REQUEST][START] GET /index.php/Account/Notifications
DEBUG - 2026-03-13 10:09:28 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-13 10:09:29 --> [REQ_ID=aad1eb39c07b] [FILTER_BEFORE] /index.php/Account/Notifications
DEBUG - 2026-03-13 10:09:29 --> [REQ_ID=aad1eb39c07b] [ROUTE] Controller=\App\Modules\User\Controllers\DashboardController Method=notifications
DEBUG - 2026-03-13 10:09:29 --> [REQ_ID=aad1eb39c07b] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Account/Notifications
DEBUG - 2026-03-13 10:09:29 --> [CSRF] token name=csrf_test_name hash=5b102c563fcfd7c4df81e265bf584fb2
DEBUG - 2026-03-13 10:09:29 --> [REQ_ID=aad1eb39c07b] [REQUEST][END]
INFO - 2026-03-13 10:09:29 --> [REQ_ID=aad1eb39c07b] [PERF] Execution time=0.009962
DEBUG - 2026-03-13 10:09:29 --> [REQ_ID=d8fe2695857d] [REQUEST][START] GET /index.php/Investments/News
DEBUG - 2026-03-13 10:09:29 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-13 10:09:30 --> [REQ_ID=d8fe2695857d] [FILTER_BEFORE] /index.php/Investments/News
DEBUG - 2026-03-13 10:09:30 --> [REQ_ID=d8fe2695857d] [ROUTE] Controller=closure_route Method=index
DEBUG - 2026-03-13 10:09:30 --> [REQ_ID=d8fe2695857d] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Investments/News
DEBUG - 2026-03-13 10:09:30 --> [CSRF] token name=csrf_test_name hash=5b102c563fcfd7c4df81e265bf584fb2
DEBUG - 2026-03-13 10:09:30 --> [REQ_ID=d8fe2695857d] [REQUEST][END]
INFO - 2026-03-13 10:09:30 --> [REQ_ID=d8fe2695857d] [PERF] Execution time=0.008833
DEBUG - 2026-03-13 10:09:30 --> [REQ_ID=ec4db21993f4] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-13 10:09:30 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-13 10:09:30 --> [REQ_ID=ec4db21993f4] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-13 10:09:30 --> [REQ_ID=ec4db21993f4] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-13 10:09:30 --> [REQ_ID=ec4db21993f4] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-13 10:09:30 --> [CSRF] token name=csrf_test_name hash=5b102c563fcfd7c4df81e265bf584fb2
DEBUG - 2026-03-13 10:09:30 --> [REQ_ID=b3f5774dff81] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-13 10:09:30 --> [REQ_ID=b3f5774dff81] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-13 10:09:30 --> [REQ_ID=ec4db21993f4] [FILTER_AFTER]
DEBUG - 2026-03-13 10:09:30 --> [REQ_ID=ec4db21993f4] [LIFECYCLE][END] status=200 duration_ms=90.07 memory_delta=0
INFO - 2026-03-13 10:09:30 --> [REQ_ID=b3f5774dff81] [PERF] Execution time=0.089888
DEBUG - 2026-03-13 10:09:30 --> [REQ_ID=ec4db21993f4] [REQUEST][END]
INFO - 2026-03-13 10:09:30 --> [REQ_ID=ec4db21993f4] [PERF] Execution time=0.099017
DEBUG - 2026-03-13 10:09:36 --> [REQ_ID=da69ddf2efb5] [REQUEST][START] GET /index.php/Account
DEBUG - 2026-03-13 10:09:36 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-13 10:09:36 --> [REQ_ID=da69ddf2efb5] [FILTER_BEFORE] /index.php/Account
DEBUG - 2026-03-13 10:09:36 --> [REQ_ID=da69ddf2efb5] [ROUTE] Controller=\App\Modules\User\Controllers\DashboardController Method=account
DEBUG - 2026-03-13 10:09:36 --> [REQ_ID=da69ddf2efb5] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Account
DEBUG - 2026-03-13 10:09:36 --> [CSRF] token name=csrf_test_name hash=5b102c563fcfd7c4df81e265bf584fb2
DEBUG - 2026-03-13 10:09:36 --> [REQ_ID=da69ddf2efb5] [REQUEST][END]
INFO - 2026-03-13 10:09:36 --> [REQ_ID=da69ddf2efb5] [PERF] Execution time=0.009745
DEBUG - 2026-03-13 10:09:37 --> [REQ_ID=95099e54a4de] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-13 10:09:37 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-13 10:09:37 --> [REQ_ID=95099e54a4de] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-13 10:09:37 --> [REQ_ID=95099e54a4de] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-13 10:09:37 --> [REQ_ID=95099e54a4de] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-13 10:09:37 --> [CSRF] token name=csrf_test_name hash=5b102c563fcfd7c4df81e265bf584fb2
DEBUG - 2026-03-13 10:09:37 --> [REQ_ID=dee4cc118fac] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-13 10:09:37 --> [REQ_ID=dee4cc118fac] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-13 10:09:37 --> [REQ_ID=95099e54a4de] [FILTER_AFTER]
DEBUG - 2026-03-13 10:09:37 --> [REQ_ID=95099e54a4de] [LIFECYCLE][END] status=200 duration_ms=17.67 memory_delta=0
INFO - 2026-03-13 10:09:37 --> [REQ_ID=dee4cc118fac] [PERF] Execution time=0.017580
DEBUG - 2026-03-13 10:09:37 --> [REQ_ID=95099e54a4de] [REQUEST][END]
INFO - 2026-03-13 10:09:37 --> [REQ_ID=95099e54a4de] [PERF] Execution time=0.026524
DEBUG - 2026-03-13 10:09:45 --> [REQ_ID=95e8e194055d] [REQUEST][START] GET /index.php/logout
DEBUG - 2026-03-13 10:09:45 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-13 10:09:45 --> [REQ_ID=95e8e194055d] [FILTER_BEFORE] /index.php/logout
DEBUG - 2026-03-13 10:09:45 --> [REQ_ID=95e8e194055d] [ROUTE] Controller=\App\Controllers\AuthController Method=logout
DEBUG - 2026-03-13 10:09:45 --> [REQ_ID=95e8e194055d] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/logout
DEBUG - 2026-03-13 10:09:45 --> [CSRF] token name=csrf_test_name hash=5b102c563fcfd7c4df81e265bf584fb2
DEBUG - 2026-03-13 10:09:45 --> [REQ_ID=95e8e194055d] [REQUEST][END]
INFO - 2026-03-13 10:09:45 --> [REQ_ID=95e8e194055d] [PERF] Execution time=0.009951
DEBUG - 2026-03-13 10:09:46 --> [REQ_ID=70ed020db2b2] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-13 10:09:46 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-13 10:09:46 --> [REQ_ID=70ed020db2b2] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-13 10:09:46 --> [REQ_ID=70ed020db2b2] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-13 10:09:46 --> [REQ_ID=70ed020db2b2] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-13 10:09:46 --> [CSRF] token name=csrf_test_name hash=5b102c563fcfd7c4df81e265bf584fb2
DEBUG - 2026-03-13 10:09:46 --> [REQ_ID=1ac7b084dbd7] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-13 10:09:46 --> [REQ_ID=1ac7b084dbd7] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-13 10:09:46 --> [REQ_ID=70ed020db2b2] [FILTER_AFTER]
DEBUG - 2026-03-13 10:09:46 --> [REQ_ID=70ed020db2b2] [LIFECYCLE][END] status=200 duration_ms=35.55 memory_delta=0
INFO - 2026-03-13 10:09:46 --> [REQ_ID=1ac7b084dbd7] [PERF] Execution time=0.035434
DEBUG - 2026-03-13 10:09:46 --> [REQ_ID=70ed020db2b2] [REQUEST][END]
INFO - 2026-03-13 10:09:46 --> [REQ_ID=70ed020db2b2] [PERF] Execution time=0.044924
DEBUG - 2026-03-13 10:09:55 --> [REQ_ID=74302ecc08d3] [REQUEST][START] GET /index.php/Management/Users
DEBUG - 2026-03-13 10:09:55 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-13 10:09:55 --> [REQ_ID=74302ecc08d3] [FILTER_BEFORE] /index.php/Management/Users
DEBUG - 2026-03-13 10:09:55 --> [REQ_ID=74302ecc08d3] [ROUTE] Controller=\App\Modules\Management\Controllers\UsersController Method=index
DEBUG - 2026-03-13 10:09:55 --> [REQ_ID=74302ecc08d3] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Management/Users
DEBUG - 2026-03-13 10:09:55 --> [CSRF] token name=csrf_test_name hash=5b102c563fcfd7c4df81e265bf584fb2
DEBUG - 2026-03-13 10:09:55 --> [REQ_ID=74302ecc08d3] [REQUEST][END]
INFO - 2026-03-13 10:09:55 --> [REQ_ID=74302ecc08d3] [PERF] Execution time=0.010214
DEBUG - 2026-03-13 10:09:56 --> [REQ_ID=0cb7ccbb404d] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-13 10:09:56 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-13 10:09:56 --> [REQ_ID=0cb7ccbb404d] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-13 10:09:56 --> [REQ_ID=0cb7ccbb404d] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-13 10:09:56 --> [REQ_ID=0cb7ccbb404d] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-13 10:09:56 --> [CSRF] token name=csrf_test_name hash=5b102c563fcfd7c4df81e265bf584fb2
DEBUG - 2026-03-13 10:09:56 --> [REQ_ID=9577097e4ae9] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-13 10:09:56 --> [REQ_ID=9577097e4ae9] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-13 10:09:56 --> [REQ_ID=0cb7ccbb404d] [FILTER_AFTER]
DEBUG - 2026-03-13 10:09:56 --> [REQ_ID=0cb7ccbb404d] [LIFECYCLE][END] status=200 duration_ms=31.58 memory_delta=0
INFO - 2026-03-13 10:09:56 --> [REQ_ID=9577097e4ae9] [PERF] Execution time=0.031587
DEBUG - 2026-03-13 10:09:56 --> [REQ_ID=0cb7ccbb404d] [REQUEST][END]
INFO - 2026-03-13 10:09:56 --> [REQ_ID=0cb7ccbb404d] [PERF] Execution time=0.040715
DEBUG - 2026-03-13 10:10:04 --> [REQ_ID=991be2696bc0] [REQUEST][START] GET /index.php/Account/Connected-Accounts
DEBUG - 2026-03-13 10:10:04 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-13 10:10:04 --> [REQ_ID=991be2696bc0] [FILTER_BEFORE] /index.php/Account/Connected-Accounts
DEBUG - 2026-03-13 10:10:04 --> [REQ_ID=991be2696bc0] [ROUTE] Controller=\App\Modules\User\Controllers\DashboardController Method=connectedAccounts
DEBUG - 2026-03-13 10:10:04 --> [REQ_ID=991be2696bc0] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Account/Connected-Accounts
DEBUG - 2026-03-13 10:10:04 --> [CSRF] token name=csrf_test_name hash=5b102c563fcfd7c4df81e265bf584fb2
DEBUG - 2026-03-13 10:10:04 --> [REQ_ID=991be2696bc0] [REQUEST][END]
INFO - 2026-03-13 10:10:04 --> [REQ_ID=991be2696bc0] [PERF] Execution time=0.010437
DEBUG - 2026-03-13 10:10:04 --> [REQ_ID=4a55e9b0d6fa] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-13 10:10:04 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-13 10:10:04 --> [REQ_ID=4a55e9b0d6fa] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-13 10:10:04 --> [REQ_ID=4a55e9b0d6fa] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-13 10:10:04 --> [REQ_ID=4a55e9b0d6fa] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-13 10:10:04 --> [CSRF] token name=csrf_test_name hash=5b102c563fcfd7c4df81e265bf584fb2
DEBUG - 2026-03-13 10:10:04 --> [REQ_ID=71254899e82f] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-13 10:10:04 --> [REQ_ID=71254899e82f] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-13 10:10:04 --> [REQ_ID=4a55e9b0d6fa] [FILTER_AFTER]
DEBUG - 2026-03-13 10:10:04 --> [REQ_ID=4a55e9b0d6fa] [LIFECYCLE][END] status=200 duration_ms=142.12 memory_delta=0
INFO - 2026-03-13 10:10:04 --> [REQ_ID=71254899e82f] [PERF] Execution time=0.142077
DEBUG - 2026-03-13 10:10:04 --> [REQ_ID=4a55e9b0d6fa] [REQUEST][END]
INFO - 2026-03-13 10:10:04 --> [REQ_ID=4a55e9b0d6fa] [PERF] Execution time=0.150920
DEBUG - 2026-03-13 10:10:12 --> [REQ_ID=5bd17226a4ba] [REQUEST][START] GET /index.php/Customer-Support
DEBUG - 2026-03-13 10:10:12 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-13 10:10:12 --> [REQ_ID=5bd17226a4ba] [FILTER_BEFORE] /index.php/Customer-Support
DEBUG - 2026-03-13 10:10:12 --> [REQ_ID=5bd17226a4ba] [ROUTE] Controller=\App\Controllers\App\Modules\Support\Controllers\SupportController Method=index
DEBUG - 2026-03-13 10:10:12 --> [REQ_ID=5bd17226a4ba] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Customer-Support
DEBUG - 2026-03-13 10:10:12 --> [CSRF] token name=csrf_test_name hash=5b102c563fcfd7c4df81e265bf584fb2
DEBUG - 2026-03-13 10:10:12 --> [REQ_ID=5bd17226a4ba] [REQUEST][END]
INFO - 2026-03-13 10:10:12 --> [REQ_ID=5bd17226a4ba] [PERF] Execution time=0.013152
DEBUG - 2026-03-13 10:10:13 --> [REQ_ID=955b25025198] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-13 10:10:13 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-13 10:10:13 --> [REQ_ID=955b25025198] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-13 10:10:13 --> [REQ_ID=955b25025198] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-13 10:10:13 --> [REQ_ID=955b25025198] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-13 10:10:13 --> [CSRF] token name=csrf_test_name hash=5b102c563fcfd7c4df81e265bf584fb2
DEBUG - 2026-03-13 10:10:13 --> [REQ_ID=b87980d48631] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-13 10:10:13 --> [REQ_ID=b87980d48631] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-13 10:10:13 --> [REQ_ID=955b25025198] [FILTER_AFTER]
DEBUG - 2026-03-13 10:10:13 --> [REQ_ID=955b25025198] [LIFECYCLE][END] status=200 duration_ms=33.52 memory_delta=0
INFO - 2026-03-13 10:10:13 --> [REQ_ID=b87980d48631] [PERF] Execution time=0.033531
DEBUG - 2026-03-13 10:10:13 --> [REQ_ID=955b25025198] [REQUEST][END]
INFO - 2026-03-13 10:10:13 --> [REQ_ID=955b25025198] [PERF] Execution time=0.044257
DEBUG - 2026-03-13 10:10:19 --> [REQ_ID=178e289481c3] [REQUEST][START] GET /index.php/Account/Social-Media
DEBUG - 2026-03-13 10:10:19 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-13 10:10:19 --> [REQ_ID=178e289481c3] [FILTER_BEFORE] /index.php/Account/Social-Media
DEBUG - 2026-03-13 10:10:19 --> [REQ_ID=178e289481c3] [ROUTE] Controller=\App\Modules\User\Controllers\DashboardController Method=SocialMedia
DEBUG - 2026-03-13 10:10:19 --> [REQ_ID=178e289481c3] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Account/Social-Media
DEBUG - 2026-03-13 10:10:19 --> [CSRF] token name=csrf_test_name hash=5b102c563fcfd7c4df81e265bf584fb2
DEBUG - 2026-03-13 10:10:19 --> [REQ_ID=178e289481c3] [REQUEST][END]
INFO - 2026-03-13 10:10:19 --> [REQ_ID=178e289481c3] [PERF] Execution time=0.010656
DEBUG - 2026-03-13 10:10:19 --> [REQ_ID=f5d07db56c75] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-13 10:10:19 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-13 10:10:19 --> [REQ_ID=f5d07db56c75] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-13 10:10:19 --> [REQ_ID=f5d07db56c75] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-13 10:10:19 --> [REQ_ID=f5d07db56c75] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-13 10:10:19 --> [CSRF] token name=csrf_test_name hash=5b102c563fcfd7c4df81e265bf584fb2
DEBUG - 2026-03-13 10:10:19 --> [REQ_ID=ca813b63f117] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-13 10:10:19 --> [REQ_ID=ca813b63f117] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-13 10:10:19 --> [REQ_ID=f5d07db56c75] [FILTER_AFTER]
DEBUG - 2026-03-13 10:10:19 --> [REQ_ID=f5d07db56c75] [LIFECYCLE][END] status=200 duration_ms=40.45 memory_delta=0
INFO - 2026-03-13 10:10:19 --> [REQ_ID=ca813b63f117] [PERF] Execution time=0.040253
DEBUG - 2026-03-13 10:10:19 --> [REQ_ID=f5d07db56c75] [REQUEST][END]
INFO - 2026-03-13 10:10:19 --> [REQ_ID=f5d07db56c75] [PERF] Execution time=0.049425
DEBUG - 2026-03-13 10:10:30 --> [REQ_ID=d04b65ed7f48] [REQUEST][START] GET /index.php/Account/Billing
DEBUG - 2026-03-13 10:10:30 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-13 10:10:30 --> [REQ_ID=d04b65ed7f48] [FILTER_BEFORE] /index.php/Account/Billing
DEBUG - 2026-03-13 10:10:30 --> [REQ_ID=d04b65ed7f48] [ROUTE] Controller=\App\Modules\User\Controllers\DashboardController Method=billing
DEBUG - 2026-03-13 10:10:30 --> [REQ_ID=d04b65ed7f48] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Account/Billing
DEBUG - 2026-03-13 10:10:30 --> [CSRF] token name=csrf_test_name hash=5b102c563fcfd7c4df81e265bf584fb2
DEBUG - 2026-03-13 10:10:30 --> [REQ_ID=d04b65ed7f48] [REQUEST][END]
INFO - 2026-03-13 10:10:30 --> [REQ_ID=d04b65ed7f48] [PERF] Execution time=0.009947
DEBUG - 2026-03-13 10:10:30 --> [REQ_ID=0394d238b0b3] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-13 10:10:30 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-13 10:10:31 --> [REQ_ID=0394d238b0b3] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-13 10:10:31 --> [REQ_ID=0394d238b0b3] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-13 10:10:31 --> [REQ_ID=0394d238b0b3] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-13 10:10:31 --> [CSRF] token name=csrf_test_name hash=5b102c563fcfd7c4df81e265bf584fb2
DEBUG - 2026-03-13 10:10:31 --> [REQ_ID=982eaee68544] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-13 10:10:31 --> [REQ_ID=982eaee68544] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-13 10:10:31 --> [REQ_ID=0394d238b0b3] [FILTER_AFTER]
DEBUG - 2026-03-13 10:10:31 --> [REQ_ID=0394d238b0b3] [LIFECYCLE][END] status=200 duration_ms=118.49 memory_delta=0
INFO - 2026-03-13 10:10:31 --> [REQ_ID=982eaee68544] [PERF] Execution time=0.118385
DEBUG - 2026-03-13 10:10:31 --> [REQ_ID=0394d238b0b3] [REQUEST][END]
INFO - 2026-03-13 10:10:31 --> [REQ_ID=0394d238b0b3] [PERF] Execution time=0.128516
DEBUG - 2026-03-13 10:10:38 --> [REQ_ID=01968eeea118] [REQUEST][START] GET /index.php/Account/Security
DEBUG - 2026-03-13 10:10:38 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-13 10:10:38 --> [REQ_ID=01968eeea118] [FILTER_BEFORE] /index.php/Account/Security
DEBUG - 2026-03-13 10:10:38 --> [REQ_ID=01968eeea118] [ROUTE] Controller=\App\Modules\User\Controllers\DashboardController Method=Security
DEBUG - 2026-03-13 10:10:38 --> [REQ_ID=01968eeea118] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Account/Security
DEBUG - 2026-03-13 10:10:38 --> [CSRF] token name=csrf_test_name hash=5b102c563fcfd7c4df81e265bf584fb2
DEBUG - 2026-03-13 10:10:38 --> [REQ_ID=01968eeea118] [REQUEST][END]
INFO - 2026-03-13 10:10:38 --> [REQ_ID=01968eeea118] [PERF] Execution time=0.010112
DEBUG - 2026-03-13 10:10:39 --> [REQ_ID=2023bb247a8f] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-13 10:10:39 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-13 10:10:39 --> [REQ_ID=2023bb247a8f] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-13 10:10:39 --> [REQ_ID=2023bb247a8f] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-13 10:10:39 --> [REQ_ID=2023bb247a8f] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-13 10:10:39 --> [CSRF] token name=csrf_test_name hash=5b102c563fcfd7c4df81e265bf584fb2
DEBUG - 2026-03-13 10:10:39 --> [REQ_ID=0f292fe0e26c] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-13 10:10:39 --> [REQ_ID=0f292fe0e26c] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-13 10:10:39 --> [REQ_ID=2023bb247a8f] [FILTER_AFTER]
DEBUG - 2026-03-13 10:10:39 --> [REQ_ID=2023bb247a8f] [LIFECYCLE][END] status=200 duration_ms=21.71 memory_delta=0
INFO - 2026-03-13 10:10:39 --> [REQ_ID=0f292fe0e26c] [PERF] Execution time=0.021514
DEBUG - 2026-03-13 10:10:39 --> [REQ_ID=2023bb247a8f] [REQUEST][END]
INFO - 2026-03-13 10:10:39 --> [REQ_ID=2023bb247a8f] [PERF] Execution time=0.030266
DEBUG - 2026-03-13 10:10:45 --> [REQ_ID=a46c12e397af] [REQUEST][START] GET /index.php/Legal/Privacy-Policy
DEBUG - 2026-03-13 10:10:45 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-13 10:10:45 --> [REQ_ID=a46c12e397af] [FILTER_BEFORE] /index.php/Legal/Privacy-Policy
DEBUG - 2026-03-13 10:10:45 --> [REQ_ID=a46c12e397af] [ROUTE] Controller=\App\Controllers\Home Method=privacyPolicy
DEBUG - 2026-03-13 10:10:45 --> [REQ_ID=a46c12e397af] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Legal/Privacy-Policy
DEBUG - 2026-03-13 10:10:45 --> [CSRF] token name=csrf_test_name hash=5b102c563fcfd7c4df81e265bf584fb2
DEBUG - 2026-03-13 10:10:45 --> [REQ_ID=a46c12e397af] [REQUEST][END]
INFO - 2026-03-13 10:10:45 --> [REQ_ID=a46c12e397af] [PERF] Execution time=0.010064
DEBUG - 2026-03-13 10:10:46 --> [REQ_ID=f9603cf79a66] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-13 10:10:46 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-13 10:10:46 --> [REQ_ID=f9603cf79a66] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-13 10:10:46 --> [REQ_ID=f9603cf79a66] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-13 10:10:46 --> [REQ_ID=f9603cf79a66] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-13 10:10:46 --> [CSRF] token name=csrf_test_name hash=5b102c563fcfd7c4df81e265bf584fb2
DEBUG - 2026-03-13 10:10:46 --> [REQ_ID=61d69ed63a14] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-13 10:10:46 --> [REQ_ID=61d69ed63a14] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-13 10:10:46 --> [REQ_ID=f9603cf79a66] [FILTER_AFTER]
DEBUG - 2026-03-13 10:10:46 --> [REQ_ID=f9603cf79a66] [LIFECYCLE][END] status=200 duration_ms=27.39 memory_delta=0
INFO - 2026-03-13 10:10:46 --> [REQ_ID=61d69ed63a14] [PERF] Execution time=0.027314
DEBUG - 2026-03-13 10:10:46 --> [REQ_ID=f9603cf79a66] [REQUEST][END]
INFO - 2026-03-13 10:10:46 --> [REQ_ID=f9603cf79a66] [PERF] Execution time=0.037995
DEBUG - 2026-03-13 10:11:22 --> [REQ_ID=6bc6fe574804] [REQUEST][START] HEAD /
DEBUG - 2026-03-13 10:11:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-13 10:11:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-13 10:11:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-13 10:11:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-13 10:11:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-13 10:15:02 --> [REQ_ID=7b83b9afaa17] [REQUEST][START] GET /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-13 10:15:02 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-13 10:15:02 --> [REQ_ID=7b83b9afaa17] [FILTER_BEFORE] /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-13 10:15:02 --> [REQ_ID=7b83b9afaa17] [ROUTE] Controller=\App\Modules\APIs\Controllers\AlertsAPIController Method=fetchEmailAlerts
DEBUG - 2026-03-13 10:15:02 --> [REQ_ID=7b83b9afaa17] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-13 10:15:02 --> [REQ_ID=7b83b9afaa17] [REQUEST][END]
INFO - 2026-03-13 10:15:02 --> [REQ_ID=7b83b9afaa17] [PERF] Execution time=0.047635
DEBUG - 2026-03-13 10:16:22 --> [REQ_ID=7101a34cd0ca] [REQUEST][START] HEAD /
DEBUG - 2026-03-13 10:16:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-13 10:16:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-13 10:16:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-13 10:16:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-13 10:16:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-13 10:21:22 --> [REQ_ID=01a2fc6cc7a2] [REQUEST][START] HEAD /
DEBUG - 2026-03-13 10:21:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-13 10:21:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-13 10:21:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-13 10:21:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-13 10:21:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-13 10:26:22 --> [REQ_ID=2a7a048b9f25] [REQUEST][START] HEAD /
DEBUG - 2026-03-13 10:26:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-13 10:26:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-13 10:26:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-13 10:26:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-13 10:26:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-13 10:31:22 --> [REQ_ID=41ad97a158fb] [REQUEST][START] HEAD /
DEBUG - 2026-03-13 10:31:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-13 10:31:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-13 10:31:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-13 10:31:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-13 10:31:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-13 10:36:22 --> [REQ_ID=c9554f01bdd2] [REQUEST][START] HEAD /
DEBUG - 2026-03-13 10:36:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-13 10:36:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-13 10:36:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-13 10:36:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-13 10:36:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-13 10:41:22 --> [REQ_ID=5aef2321e733] [REQUEST][START] HEAD /
DEBUG - 2026-03-13 10:41:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-13 10:41:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-13 10:41:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-13 10:41:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-13 10:41:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-13 10:46:22 --> [REQ_ID=4312cb157aa3] [REQUEST][START] HEAD /
DEBUG - 2026-03-13 10:46:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-13 10:46:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-13 10:46:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-13 10:46:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-13 10:46:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-13 10:51:22 --> [REQ_ID=dd64aa7f71fa] [REQUEST][START] HEAD /
DEBUG - 2026-03-13 10:51:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-13 10:51:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-13 10:51:23 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-13 10:51:23 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-13 10:51:23 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-13 10:56:22 --> [REQ_ID=5ef4b1001413] [REQUEST][START] HEAD /
DEBUG - 2026-03-13 10:56:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-13 10:56:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-13 10:56:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-13 10:56:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-13 10:56:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-13 11:00:01 --> [REQ_ID=211fcc68b9f7] [REQUEST][START] GET /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-13 11:00:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-13 11:00:01 --> [REQ_ID=211fcc68b9f7] [FILTER_BEFORE] /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-13 11:00:01 --> [REQ_ID=211fcc68b9f7] [ROUTE] Controller=\App\Modules\Management\Controllers\ManagementAPIController Method=Run_CRON_Tasks
DEBUG - 2026-03-13 11:00:01 --> [REQ_ID=211fcc68b9f7] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-13 11:00:01 --> [REQ_ID=211fcc68b9f7] [REQUEST][END]
INFO - 2026-03-13 11:00:01 --> [REQ_ID=211fcc68b9f7] [PERF] Execution time=0.040138
DEBUG - 2026-03-13 11:01:22 --> [REQ_ID=1658bcef8400] [REQUEST][START] HEAD /
DEBUG - 2026-03-13 11:01:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-13 11:01:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-13 11:01:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-13 11:01:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-13 11:01:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-13 11:06:22 --> [REQ_ID=073257740f84] [REQUEST][START] HEAD /
DEBUG - 2026-03-13 11:06:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-13 11:06:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-13 11:06:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-13 11:06:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-13 11:06:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-13 11:11:22 --> [REQ_ID=ff8d42d62f9f] [REQUEST][START] HEAD /
DEBUG - 2026-03-13 11:11:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-13 11:11:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-13 11:11:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-13 11:11:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-13 11:11:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-13 11:15:01 --> [REQ_ID=0ce5c21a5c6c] [REQUEST][START] GET /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-13 11:15:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-13 11:15:01 --> [REQ_ID=0ce5c21a5c6c] [FILTER_BEFORE] /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-13 11:15:01 --> [REQ_ID=0ce5c21a5c6c] [ROUTE] Controller=\App\Modules\APIs\Controllers\AlertsAPIController Method=fetchEmailAlerts
DEBUG - 2026-03-13 11:15:01 --> [REQ_ID=0ce5c21a5c6c] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-13 11:15:01 --> [REQ_ID=0ce5c21a5c6c] [REQUEST][END]
INFO - 2026-03-13 11:15:01 --> [REQ_ID=0ce5c21a5c6c] [PERF] Execution time=0.047510
DEBUG - 2026-03-13 11:16:22 --> [REQ_ID=6c8053408d54] [REQUEST][START] HEAD /
DEBUG - 2026-03-13 11:16:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-13 11:16:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-13 11:16:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-13 11:16:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-13 11:16:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-13 11:21:22 --> [REQ_ID=4e65abd77b91] [REQUEST][START] HEAD /
DEBUG - 2026-03-13 11:21:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-13 11:21:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-13 11:21:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-13 11:21:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-13 11:21:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-13 11:26:22 --> [REQ_ID=ca62904b3893] [REQUEST][START] HEAD /
DEBUG - 2026-03-13 11:26:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-13 11:26:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-13 11:26:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-13 11:26:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-13 11:26:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-13 11:31:22 --> [REQ_ID=349a703c94fa] [REQUEST][START] HEAD /
DEBUG - 2026-03-13 11:31:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-13 11:31:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-13 11:31:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-13 11:31:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-13 11:31:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-13 11:36:22 --> [REQ_ID=c8661fadc2fd] [REQUEST][START] HEAD /
DEBUG - 2026-03-13 11:36:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-13 11:36:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-13 11:36:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-13 11:36:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-13 11:36:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-13 11:41:22 --> [REQ_ID=177497e14e35] [REQUEST][START] HEAD /
DEBUG - 2026-03-13 11:41:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-13 11:41:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-13 11:41:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-13 11:41:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-13 11:41:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-13 11:46:22 --> [REQ_ID=d185f382a900] [REQUEST][START] HEAD /
DEBUG - 2026-03-13 11:46:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-13 11:46:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-13 11:46:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-13 11:46:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-13 11:46:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-13 11:47:37 --> [REQ_ID=1bfababac40a] [REQUEST][START] GET /
DEBUG - 2026-03-13 11:47:37 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-13 11:47:37 --> [REQ_ID=1bfababac40a] [FILTER_BEFORE] /
DEBUG - 2026-03-13 11:47:37 --> [REQ_ID=1bfababac40a] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-13 11:47:37 --> [REQ_ID=1bfababac40a] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-13 11:47:37 --> [CSRF] token name=csrf_test_name hash=3d7f8da9517597552fe40f314d9dd8ff
DEBUG - 2026-03-13 11:47:37 --> [REQ_ID=7ee1b6551ac8] [INIT] App\Controllers\Home::GET
INFO - 2026-03-13 11:47:37 --> [REQ_ID=7ee1b6551ac8] [MEMORY][controller-start] 4194304
INFO - 2026-03-13 11:47:37 --> [REQ_ID=7ee1b6551ac8] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-13 11:47:37 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-13 11:47:38 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-03-13 11:47:38 --> [REQ_ID=7ee1b6551ac8] [VIEW_RENDER] themes/public/home
INFO - 2026-03-13 11:47:38 --> [REQ_ID=7ee1b6551ac8] [MEMORY][commonData:start] 8388608
INFO - 2026-03-13 11:47:38 --> themesMemory usage: 8388608
DEBUG - 2026-03-13 11:47:38 --> [MetaService] slug= pageName=Home cacheHit= path=DB
DEBUG - 2026-03-13 11:47:38 --> [REQ_ID=1bfababac40a] [FILTER_AFTER]
DEBUG - 2026-03-13 11:47:38 --> [REQ_ID=1bfababac40a] [LIFECYCLE][END] status=200 duration_ms=872.39 memory_delta=4194304
INFO - 2026-03-13 11:47:38 --> [REQ_ID=7ee1b6551ac8] [PERF] Execution time=0.870095
DEBUG - 2026-03-13 11:47:38 --> [REQ_ID=1bfababac40a] [REQUEST][END]
INFO - 2026-03-13 11:47:38 --> [REQ_ID=1bfababac40a] [PERF] Execution time=0.891295
DEBUG - 2026-03-13 11:47:42 --> [REQ_ID=75a305d73c0d] [REQUEST][START] POST /index.php/register
DEBUG - 2026-03-13 11:47:42 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-13 11:47:42 --> [REQ_ID=75a305d73c0d] [FILTER_BEFORE] /index.php/register
DEBUG - 2026-03-13 11:47:42 --> [REQ_ID=75a305d73c0d] [ROUTE] Controller=\App\Controllers\AuthController Method=attemptRegister
DEBUG - 2026-03-13 11:47:42 --> [REQ_ID=75a305d73c0d] [LIFECYCLE][START] POST https://www.mymiwallet.com/index.php/register
DEBUG - 2026-03-13 11:47:42 --> [CSRF] token name=csrf_test_name hash=3d7f8da9517597552fe40f314d9dd8ff
INFO - 2026-03-13 11:47:42 --> CSRF token verified.
DEBUG - 2026-03-13 11:47:42 --> [REQ_ID=3a1e593145a6] [INIT] App\Controllers\AuthController::POST
INFO - 2026-03-13 11:47:42 --> [REQ_ID=3a1e593145a6] [MEMORY][controller-start] 6291456
INFO - 2026-03-13 11:47:42 --> [REGISTRATION] Submission received
INFO - 2026-03-13 11:47:42 --> MailService queued email
INFO - 2026-03-13 11:47:42 --> [REGISTRATION] Validation passed (basic fields)
INFO - 2026-03-13 11:47:42 --> [REGISTRATION] Validation passed (password fields)
INFO - 2026-03-13 11:47:42 --> Registration created user_id=11725, email=tdebold@hotmail.com, username=kujoENacDnJvLJXkyERyzhy, active=, requiresActivation=1, loginIdentifier=username
INFO - 2026-03-13 11:47:42 --> [REGISTRATION] User record created
INFO - 2026-03-13 11:47:42 --> OnboardingProgressService: created onboarding record for user_id=11725
INFO - 2026-03-13 11:47:43 --> Registration succeeded for tdebold@hotmail.com (event f8fc720e0cbd578f)
INFO - 2026-03-13 11:47:43 --> [REGISTRATION] Activation email queued
INFO - 2026-03-13 11:47:43 --> Registration redirecting to success guide for user_id=11725
DEBUG - 2026-03-13 11:47:43 --> [REQ_ID=75a305d73c0d] [FILTER_AFTER]
DEBUG - 2026-03-13 11:47:43 --> [REQ_ID=75a305d73c0d] [LIFECYCLE][END] status=303 duration_ms=1,138.56 memory_delta=0
INFO - 2026-03-13 11:47:43 --> [REQ_ID=3a1e593145a6] [PERF] Execution time=1.137889
DEBUG - 2026-03-13 11:47:43 --> [REQ_ID=75a305d73c0d] [REQUEST][END]
INFO - 2026-03-13 11:47:43 --> [REQ_ID=75a305d73c0d] [PERF] Execution time=1.152151
DEBUG - 2026-03-13 11:47:43 --> [REQ_ID=26a2ca5c953d] [REQUEST][START] GET /index.php/register/success
DEBUG - 2026-03-13 11:47:43 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-13 11:47:43 --> [REQ_ID=26a2ca5c953d] [FILTER_BEFORE] /index.php/register/success
DEBUG - 2026-03-13 11:47:43 --> [REQ_ID=26a2ca5c953d] [ROUTE] Controller=\App\Controllers\AuthController Method=registerSuccess
DEBUG - 2026-03-13 11:47:43 --> [REQ_ID=26a2ca5c953d] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/register/success
DEBUG - 2026-03-13 11:47:43 --> [CSRF] token name=csrf_test_name hash=3d7f8da9517597552fe40f314d9dd8ff
DEBUG - 2026-03-13 11:47:43 --> [REQ_ID=4ea3627e7a0a] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-13 11:47:43 --> [REQ_ID=4ea3627e7a0a] [MEMORY][controller-start] 4194304
INFO - 2026-03-13 11:47:43 --> AuthController::registerSuccess view rendered.
INFO - 2026-03-13 11:47:43 --> [REQ_ID=4ea3627e7a0a] [PERF] Execution time=0.019128
DEBUG - 2026-03-13 11:47:57 --> [REQ_ID=43c5c2454505] [REQUEST][START] GET /index.php/Free/register
DEBUG - 2026-03-13 11:47:57 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-13 11:47:57 --> [REQ_ID=43c5c2454505] [FILTER_BEFORE] /index.php/Free/register
DEBUG - 2026-03-13 11:47:57 --> [REQ_ID=43c5c2454505] [ROUTE] Controller=\App\Controllers\AuthController Method=register
DEBUG - 2026-03-13 11:47:57 --> [REQ_ID=43c5c2454505] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Free/register
DEBUG - 2026-03-13 11:47:57 --> [CSRF] token name=csrf_test_name hash=3d7f8da9517597552fe40f314d9dd8ff
DEBUG - 2026-03-13 11:47:57 --> [REQ_ID=43c5c2454505] [REQUEST][END]
INFO - 2026-03-13 11:47:57 --> [REQ_ID=43c5c2454505] [PERF] Execution time=0.010025
DEBUG - 2026-03-13 11:47:57 --> [REQ_ID=67a9e381c44b] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-13 11:47:57 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-13 11:47:57 --> [REQ_ID=67a9e381c44b] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-13 11:47:57 --> [REQ_ID=67a9e381c44b] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-13 11:47:57 --> [REQ_ID=67a9e381c44b] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-13 11:47:57 --> [CSRF] token name=csrf_test_name hash=3d7f8da9517597552fe40f314d9dd8ff
DEBUG - 2026-03-13 11:47:57 --> [REQ_ID=9d5d9de2aed4] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-13 11:47:57 --> [REQ_ID=9d5d9de2aed4] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-13 11:47:57 --> [REQ_ID=67a9e381c44b] [FILTER_AFTER]
DEBUG - 2026-03-13 11:47:57 --> [REQ_ID=67a9e381c44b] [LIFECYCLE][END] status=200 duration_ms=243.58 memory_delta=0
INFO - 2026-03-13 11:47:57 --> [REQ_ID=9d5d9de2aed4] [PERF] Execution time=0.243548
DEBUG - 2026-03-13 11:47:57 --> [REQ_ID=67a9e381c44b] [REQUEST][END]
INFO - 2026-03-13 11:47:57 --> [REQ_ID=67a9e381c44b] [PERF] Execution time=0.253029
DEBUG - 2026-03-13 11:48:05 --> [REQ_ID=4f7ef9c429ac] [REQUEST][START] POST /index.php/login
DEBUG - 2026-03-13 11:48:05 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-13 11:48:05 --> [REQ_ID=4f7ef9c429ac] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-13 11:48:05 --> [REQ_ID=4f7ef9c429ac] [ROUTE] Controller=\App\Controllers\AuthController Method=attemptLogin
DEBUG - 2026-03-13 11:48:05 --> [REQ_ID=4f7ef9c429ac] [LIFECYCLE][START] POST https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-13 11:48:05 --> [CSRF] token name=csrf_test_name hash=3d7f8da9517597552fe40f314d9dd8ff
INFO - 2026-03-13 11:48:05 --> CSRF token verified.
DEBUG - 2026-03-13 11:48:05 --> [REQ_ID=cc14d430cb21] [INIT] App\Controllers\AuthController::POST
INFO - 2026-03-13 11:48:05 --> [REQ_ID=cc14d430cb21] [MEMORY][controller-start] 4194304
INFO - 2026-03-13 11:48:05 --> AuthController L93: Auth:attemptLogin started.
INFO - 2026-03-13 11:48:05 --> AuthController L104: Auth:attemptLogin rules: {"login":"required","password":"required"}
INFO - 2026-03-13 11:48:05 --> AuthController L132: Auth:attemptLogin Login Variables: login: required, remember: false, ip: 45.84.107.174, ua: "Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36"
DEBUG - 2026-03-13 11:48:05 --> Auth attemptLogin() called with login identifier: tdebold@hotmail.com, remember: false
DEBUG - 2026-03-13 11:48:05 --> Auth attemptLogin() called. redirect_url in session: https://www.mymiwallet.com/index.php/Free/register
DEBUG - 2026-03-13 11:48:05 --> Auth credentials normalised for attempt using key "email"
WARNING - 2026-03-13 11:48:06 --> [AUTH_FAILURE] 
DEBUG - 2026-03-13 11:48:06 --> Auth attempt failed for identifier tdebold@hotmail.com. Error: Unable to log you in. Please check your password.
WARNING - 2026-03-13 11:48:06 --> [AUTH] Login failure
WARNING - 2026-03-13 11:48:06 --> [AUTH] Login failed
DEBUG - 2026-03-13 11:48:06 --> [REQ_ID=4f7ef9c429ac] [FILTER_AFTER]
DEBUG - 2026-03-13 11:48:06 --> [REQ_ID=4f7ef9c429ac] [LIFECYCLE][END] status=303 duration_ms=211.39 memory_delta=0
INFO - 2026-03-13 11:48:06 --> [REQ_ID=cc14d430cb21] [PERF] Execution time=0.211107
DEBUG - 2026-03-13 11:48:06 --> [REQ_ID=4f7ef9c429ac] [REQUEST][END]
INFO - 2026-03-13 11:48:06 --> [REQ_ID=4f7ef9c429ac] [PERF] Execution time=0.220577
DEBUG - 2026-03-13 11:48:07 --> [REQ_ID=248af394fa2b] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-13 11:48:07 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-13 11:48:07 --> [REQ_ID=248af394fa2b] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-13 11:48:07 --> [REQ_ID=248af394fa2b] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-13 11:48:07 --> [REQ_ID=248af394fa2b] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-13 11:48:07 --> [CSRF] token name=csrf_test_name hash=3d7f8da9517597552fe40f314d9dd8ff
DEBUG - 2026-03-13 11:48:07 --> [REQ_ID=461dd7382b45] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-13 11:48:07 --> [REQ_ID=461dd7382b45] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-13 11:48:07 --> [REQ_ID=248af394fa2b] [FILTER_AFTER]
DEBUG - 2026-03-13 11:48:07 --> [REQ_ID=248af394fa2b] [LIFECYCLE][END] status=200 duration_ms=19.64 memory_delta=0
INFO - 2026-03-13 11:48:07 --> [REQ_ID=461dd7382b45] [PERF] Execution time=0.019444
DEBUG - 2026-03-13 11:48:07 --> [REQ_ID=248af394fa2b] [REQUEST][END]
INFO - 2026-03-13 11:48:07 --> [REQ_ID=248af394fa2b] [PERF] Execution time=0.027954
DEBUG - 2026-03-13 11:48:21 --> [REQ_ID=5475ca59cebe] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-13 11:48:21 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-13 11:48:21 --> [REQ_ID=5475ca59cebe] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-13 11:48:21 --> [REQ_ID=5475ca59cebe] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-13 11:48:21 --> [REQ_ID=5475ca59cebe] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-13 11:48:21 --> [CSRF] token name=csrf_test_name hash=3d7f8da9517597552fe40f314d9dd8ff
DEBUG - 2026-03-13 11:48:21 --> [REQ_ID=6b2895c032f8] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-13 11:48:21 --> [REQ_ID=6b2895c032f8] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-13 11:48:21 --> [REQ_ID=5475ca59cebe] [FILTER_AFTER]
DEBUG - 2026-03-13 11:48:21 --> [REQ_ID=5475ca59cebe] [LIFECYCLE][END] status=200 duration_ms=28.96 memory_delta=0
INFO - 2026-03-13 11:48:21 --> [REQ_ID=6b2895c032f8] [PERF] Execution time=0.028907
DEBUG - 2026-03-13 11:48:21 --> [REQ_ID=5475ca59cebe] [REQUEST][END]
INFO - 2026-03-13 11:48:21 --> [REQ_ID=5475ca59cebe] [PERF] Execution time=0.038598
DEBUG - 2026-03-13 11:48:31 --> [REQ_ID=f9721379634a] [REQUEST][START] GET /index.php/How-It-Works/Registering-An-Account
DEBUG - 2026-03-13 11:48:31 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-13 11:48:31 --> [REQ_ID=f9721379634a] [FILTER_BEFORE] /index.php/How-It-Works/Registering-An-Account
DEBUG - 2026-03-13 11:48:31 --> [REQ_ID=f9721379634a] [ROUTE] Controller=\App\Modules\Blog\Controllers\HowItWorksController Method=show
DEBUG - 2026-03-13 11:48:31 --> [REQ_ID=f9721379634a] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/How-It-Works/Registering-An-Account
DEBUG - 2026-03-13 11:48:31 --> [CSRF] token name=csrf_test_name hash=3d7f8da9517597552fe40f314d9dd8ff
DEBUG - 2026-03-13 11:48:31 --> [REQ_ID=ea9babc4dc06] [INIT] App\Modules\Blog\Controllers\HowItWorksController::GET
INFO - 2026-03-13 11:48:31 --> [REQ_ID=ea9babc4dc06] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-13 11:48:31 --> [REQ_ID=ea9babc4dc06] [METHOD_ENTRY] show
DEBUG - 2026-03-13 11:48:31 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-13 11:48:31 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-13 11:48:31 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-13 11:48:31 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-13 11:48:31 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-13 11:48:31 --> MyMICoin: guest context detected; skipping user-specific preload.
ERROR - 2026-03-13 11:48:31 --> HowItWorksController failure: Call to undefined method App\Modules\Blog\Controllers\HowItWorksController::respondWithRendered()
INFO - 2026-03-13 11:48:31 --> [REQ_ID=ea9babc4dc06] [PERF] Execution time=0.154418
DEBUG - 2026-03-13 11:48:35 --> [REQ_ID=7742b8068167] [REQUEST][START] GET /index.php/How-It-Works/Investor-Profile
DEBUG - 2026-03-13 11:48:35 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-13 11:48:35 --> [REQ_ID=7742b8068167] [FILTER_BEFORE] /index.php/How-It-Works/Investor-Profile
DEBUG - 2026-03-13 11:48:35 --> [REQ_ID=7742b8068167] [ROUTE] Controller=\App\Modules\Blog\Controllers\HowItWorksController Method=show
DEBUG - 2026-03-13 11:48:35 --> [REQ_ID=7742b8068167] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/How-It-Works/Investor-Profile
DEBUG - 2026-03-13 11:48:35 --> [CSRF] token name=csrf_test_name hash=3d7f8da9517597552fe40f314d9dd8ff
DEBUG - 2026-03-13 11:48:35 --> [REQ_ID=7c5dfccef685] [INIT] App\Modules\Blog\Controllers\HowItWorksController::GET
INFO - 2026-03-13 11:48:35 --> [REQ_ID=7c5dfccef685] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-13 11:48:35 --> [REQ_ID=7c5dfccef685] [METHOD_ENTRY] show
DEBUG - 2026-03-13 11:48:35 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-13 11:48:35 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-13 11:48:35 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-13 11:48:35 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-13 11:48:35 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-13 11:48:35 --> MyMICoin: guest context detected; skipping user-specific preload.
ERROR - 2026-03-13 11:48:35 --> HowItWorksController failure: investor-profile
CRITICAL - 2026-03-13 11:48:35 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: GET, Route: How-It-Works/Investor-Profile]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-13 11:48:35 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-13 11:48:35 --> [404] URI=https://www.mymiwallet.com/index.php/How-It-Works/Investor-Profile
WARNING - 2026-03-13 11:48:35 --> 404 route miss: https://www.mymiwallet.com/index.php/How-It-Works/Investor-Profile | referrer: none
ERROR - 2026-03-13 11:48:35 --> [ERROR_PAGE] event=error_404 status=404 message=Page not found.
INFO - 2026-03-13 11:48:35 --> [REQ_ID=7c5dfccef685] [PERF] Execution time=0.035675
DEBUG - 2026-03-13 11:48:41 --> [REQ_ID=ea125f3ef163] [REQUEST][START] GET /index.php/Support
DEBUG - 2026-03-13 11:48:41 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-13 11:48:41 --> [REQ_ID=ea125f3ef163] [FILTER_BEFORE] /index.php/Support
DEBUG - 2026-03-13 11:48:41 --> [REQ_ID=ea125f3ef163] [ROUTE] Controller=\App\Modules\Support\Controllers\SupportController Method=index
DEBUG - 2026-03-13 11:48:41 --> [REQ_ID=ea125f3ef163] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Support
DEBUG - 2026-03-13 11:48:41 --> [CSRF] token name=csrf_test_name hash=3d7f8da9517597552fe40f314d9dd8ff
DEBUG - 2026-03-13 11:48:41 --> [REQ_ID=bbc6030b4c94] [INIT] App\Modules\Support\Controllers\SupportController::GET
INFO - 2026-03-13 11:48:41 --> [REQ_ID=bbc6030b4c94] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-13 11:48:41 --> [REQ_ID=bbc6030b4c94] [METHOD_ENTRY] index
DEBUG - 2026-03-13 11:48:41 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-13 11:48:41 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-13 11:48:41 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-13 11:48:41 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-13 11:48:41 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-13 11:48:41 --> MyMICoin: guest context detected; skipping user-specific preload.
INFO - 2026-03-13 11:48:41 --> [REQ_ID=bbc6030b4c94] [MEMORY][commonData:start] 4194304
DEBUG - 2026-03-13 11:48:41 --> [REQ_ID=bbc6030b4c94] [VIEW_RENDER] SupportModule\Views\Support\index
INFO - 2026-03-13 11:48:41 --> [REQ_ID=bbc6030b4c94] [MEMORY][commonData:start] 4194304
INFO - 2026-03-13 11:48:41 --> themesMemory usage: 4194304
DEBUG - 2026-03-13 11:48:41 --> [REQ_ID=ea125f3ef163] [FILTER_AFTER]
DEBUG - 2026-03-13 11:48:41 --> [REQ_ID=ea125f3ef163] [LIFECYCLE][END] status=200 duration_ms=131.17 memory_delta=0
INFO - 2026-03-13 11:48:41 --> [REQ_ID=bbc6030b4c94] [PERF] Execution time=0.130843
DEBUG - 2026-03-13 11:48:41 --> [REQ_ID=ea125f3ef163] [REQUEST][END]
INFO - 2026-03-13 11:48:41 --> [REQ_ID=ea125f3ef163] [PERF] Execution time=0.141288
DEBUG - 2026-03-13 11:48:42 --> [REQ_ID=089780e1c992] [REQUEST][START] GET /index.php/Support/Account
DEBUG - 2026-03-13 11:48:42 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-13 11:48:42 --> [REQ_ID=089780e1c992] [FILTER_BEFORE] /index.php/Support/Account
DEBUG - 2026-03-13 11:48:42 --> [REQ_ID=089780e1c992] [ROUTE] Controller=\App\Modules\Support\Controllers\AccountSupportController Method=index
DEBUG - 2026-03-13 11:48:42 --> [REQ_ID=089780e1c992] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Support/Account
DEBUG - 2026-03-13 11:48:42 --> [CSRF] token name=csrf_test_name hash=3d7f8da9517597552fe40f314d9dd8ff
DEBUG - 2026-03-13 11:48:42 --> [REQ_ID=6a4b1f0ee140] [INIT] App\Modules\Support\Controllers\AccountSupportController::GET
INFO - 2026-03-13 11:48:42 --> [REQ_ID=6a4b1f0ee140] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-13 11:48:42 --> [REQ_ID=6a4b1f0ee140] [METHOD_ENTRY] index
DEBUG - 2026-03-13 11:48:42 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-13 11:48:42 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-13 11:48:42 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-13 11:48:42 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-13 11:48:42 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-13 11:48:42 --> MyMICoin: guest context detected; skipping user-specific preload.
INFO - 2026-03-13 11:48:42 --> [REQ_ID=6a4b1f0ee140] [MEMORY][commonData:start] 4194304
DEBUG - 2026-03-13 11:48:42 --> [REQ_ID=6a4b1f0ee140] [VIEW_RENDER] SupportModule/Support/account_help
INFO - 2026-03-13 11:48:42 --> [REQ_ID=6a4b1f0ee140] [MEMORY][commonData:start] 4194304
INFO - 2026-03-13 11:48:42 --> themesMemory usage: 4194304
DEBUG - 2026-03-13 11:48:42 --> [REQ_ID=089780e1c992] [FILTER_AFTER]
DEBUG - 2026-03-13 11:48:42 --> [REQ_ID=089780e1c992] [LIFECYCLE][END] status=200 duration_ms=23.93 memory_delta=0
INFO - 2026-03-13 11:48:42 --> [REQ_ID=6a4b1f0ee140] [PERF] Execution time=0.023601
DEBUG - 2026-03-13 11:48:42 --> [REQ_ID=089780e1c992] [REQUEST][END]
INFO - 2026-03-13 11:48:42 --> [REQ_ID=089780e1c992] [PERF] Execution time=0.035412
DEBUG - 2026-03-13 11:48:45 --> [REQ_ID=4f13f5848aa7] [REQUEST][START] GET /index.php/forgot
DEBUG - 2026-03-13 11:48:45 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-13 11:48:45 --> [REQ_ID=4f13f5848aa7] [FILTER_BEFORE] /index.php/forgot
DEBUG - 2026-03-13 11:48:45 --> [REQ_ID=4f13f5848aa7] [ROUTE] Controller=\Myth\Auth\Controllers\AuthController Method=forgotPassword
DEBUG - 2026-03-13 11:48:45 --> [REQ_ID=4f13f5848aa7] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/forgot
DEBUG - 2026-03-13 11:48:45 --> [CSRF] token name=csrf_test_name hash=3d7f8da9517597552fe40f314d9dd8ff
DEBUG - 2026-03-13 11:48:46 --> [REQ_ID=4f13f5848aa7] [FILTER_AFTER]
DEBUG - 2026-03-13 11:48:46 --> [REQ_ID=4f13f5848aa7] [LIFECYCLE][END] status=200 duration_ms=3.27 memory_delta=0
DEBUG - 2026-03-13 11:48:46 --> [REQ_ID=4f13f5848aa7] [REQUEST][END]
INFO - 2026-03-13 11:48:46 --> [REQ_ID=4f13f5848aa7] [PERF] Execution time=0.014304
DEBUG - 2026-03-13 11:48:51 --> [REQ_ID=cf423785f48f] [REQUEST][START] POST /index.php/forgot
DEBUG - 2026-03-13 11:48:51 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-13 11:48:51 --> [REQ_ID=cf423785f48f] [FILTER_BEFORE] /index.php/forgot
DEBUG - 2026-03-13 11:48:51 --> [REQ_ID=cf423785f48f] [ROUTE] Controller=\App\Controllers\AuthController Method=attemptForgot
DEBUG - 2026-03-13 11:48:51 --> [REQ_ID=cf423785f48f] [LIFECYCLE][START] POST https://www.mymiwallet.com/index.php/forgot
DEBUG - 2026-03-13 11:48:51 --> [CSRF] token name=csrf_test_name hash=3d7f8da9517597552fe40f314d9dd8ff
INFO - 2026-03-13 11:48:51 --> CSRF token verified.
DEBUG - 2026-03-13 11:48:51 --> [REQ_ID=f4284e05ff93] [INIT] App\Controllers\AuthController::POST
INFO - 2026-03-13 11:48:51 --> [REQ_ID=f4284e05ff93] [MEMORY][controller-start] 4194304
INFO - 2026-03-13 11:48:51 --> [AUTH] Password reset requested
INFO - 2026-03-13 11:48:53 --> [AUTH] Password reset email sent
DEBUG - 2026-03-13 11:48:53 --> [REQ_ID=cf423785f48f] [FILTER_AFTER]
DEBUG - 2026-03-13 11:48:53 --> [REQ_ID=cf423785f48f] [LIFECYCLE][END] status=303 duration_ms=1,211.62 memory_delta=0
INFO - 2026-03-13 11:48:53 --> [REQ_ID=f4284e05ff93] [PERF] Execution time=1.211373
DEBUG - 2026-03-13 11:48:53 --> [REQ_ID=cf423785f48f] [REQUEST][END]
INFO - 2026-03-13 11:48:53 --> [REQ_ID=cf423785f48f] [PERF] Execution time=1.222845
DEBUG - 2026-03-13 11:48:53 --> [REQ_ID=cd94697f8abd] [REQUEST][START] GET /index.php/reset-password
DEBUG - 2026-03-13 11:48:53 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-13 11:48:53 --> [REQ_ID=cd94697f8abd] [FILTER_BEFORE] /index.php/reset-password
DEBUG - 2026-03-13 11:48:53 --> [REQ_ID=cd94697f8abd] [ROUTE] Controller=\App\Controllers\AuthController Method=resetPassword
DEBUG - 2026-03-13 11:48:53 --> [REQ_ID=cd94697f8abd] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/reset-password
DEBUG - 2026-03-13 11:48:53 --> [CSRF] token name=csrf_test_name hash=3d7f8da9517597552fe40f314d9dd8ff
DEBUG - 2026-03-13 11:48:53 --> [REQ_ID=ff441266b16c] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-13 11:48:53 --> [REQ_ID=ff441266b16c] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-13 11:48:53 --> [REQ_ID=cd94697f8abd] [FILTER_AFTER]
DEBUG - 2026-03-13 11:48:53 --> [REQ_ID=cd94697f8abd] [LIFECYCLE][END] status=200 duration_ms=12.89 memory_delta=0
INFO - 2026-03-13 11:48:53 --> [REQ_ID=ff441266b16c] [PERF] Execution time=0.012662
DEBUG - 2026-03-13 11:48:53 --> [REQ_ID=cd94697f8abd] [REQUEST][END]
INFO - 2026-03-13 11:48:53 --> [REQ_ID=cd94697f8abd] [PERF] Execution time=0.022254
DEBUG - 2026-03-13 11:49:06 --> [REQ_ID=d1b6a2e77791] [REQUEST][START] GET /index.php/register
DEBUG - 2026-03-13 11:49:06 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-13 11:49:06 --> [REQ_ID=d1b6a2e77791] [FILTER_BEFORE] /index.php/register
DEBUG - 2026-03-13 11:49:06 --> [REQ_ID=d1b6a2e77791] [ROUTE] Controller=\App\Controllers\AuthController Method=register
DEBUG - 2026-03-13 11:49:06 --> [REQ_ID=d1b6a2e77791] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/register
DEBUG - 2026-03-13 11:49:06 --> [CSRF] token name=csrf_test_name hash=3d7f8da9517597552fe40f314d9dd8ff
DEBUG - 2026-03-13 11:49:06 --> [REQ_ID=358801224723] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-13 11:49:06 --> [REQ_ID=358801224723] [MEMORY][controller-start] 4194304
INFO - 2026-03-13 11:49:06 --> [REGISTRATION] Form loaded
INFO - 2026-03-13 11:49:06 --> [REQ_ID=358801224723] [PERF] Execution time=0.012947
DEBUG - 2026-03-13 11:49:10 --> [REQ_ID=ee9c921a7a9f] [REQUEST][START] GET /index.php/logout
DEBUG - 2026-03-13 11:49:10 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-13 11:49:10 --> [REQ_ID=ee9c921a7a9f] [FILTER_BEFORE] /index.php/logout
DEBUG - 2026-03-13 11:49:10 --> [REQ_ID=ee9c921a7a9f] [ROUTE] Controller=\App\Controllers\AuthController Method=logout
DEBUG - 2026-03-13 11:49:10 --> [REQ_ID=ee9c921a7a9f] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/logout
DEBUG - 2026-03-13 11:49:10 --> [CSRF] token name=csrf_test_name hash=3d7f8da9517597552fe40f314d9dd8ff
DEBUG - 2026-03-13 11:49:10 --> [REQ_ID=ee9c921a7a9f] [REQUEST][END]
INFO - 2026-03-13 11:49:10 --> [REQ_ID=ee9c921a7a9f] [PERF] Execution time=0.009983
DEBUG - 2026-03-13 11:49:10 --> [REQ_ID=be6049464541] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-13 11:49:10 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-13 11:49:10 --> [REQ_ID=be6049464541] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-13 11:49:10 --> [REQ_ID=be6049464541] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-13 11:49:10 --> [REQ_ID=be6049464541] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-13 11:49:10 --> [CSRF] token name=csrf_test_name hash=3d7f8da9517597552fe40f314d9dd8ff
DEBUG - 2026-03-13 11:49:10 --> [REQ_ID=9f70e54b409f] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-13 11:49:10 --> [REQ_ID=9f70e54b409f] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-13 11:49:10 --> [REQ_ID=be6049464541] [FILTER_AFTER]
DEBUG - 2026-03-13 11:49:10 --> [REQ_ID=be6049464541] [LIFECYCLE][END] status=200 duration_ms=136.19 memory_delta=0
INFO - 2026-03-13 11:49:10 --> [REQ_ID=9f70e54b409f] [PERF] Execution time=0.136007
DEBUG - 2026-03-13 11:49:10 --> [REQ_ID=be6049464541] [REQUEST][END]
INFO - 2026-03-13 11:49:10 --> [REQ_ID=be6049464541] [PERF] Execution time=0.144821
DEBUG - 2026-03-13 11:49:19 --> [REQ_ID=ac5d9907311a] [REQUEST][START] GET /index.php/Customer-Support
DEBUG - 2026-03-13 11:49:19 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-13 11:49:19 --> [REQ_ID=ac5d9907311a] [FILTER_BEFORE] /index.php/Customer-Support
DEBUG - 2026-03-13 11:49:19 --> [REQ_ID=ac5d9907311a] [ROUTE] Controller=\App\Controllers\App\Modules\Support\Controllers\SupportController Method=index
DEBUG - 2026-03-13 11:49:19 --> [REQ_ID=ac5d9907311a] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Customer-Support
DEBUG - 2026-03-13 11:49:19 --> [CSRF] token name=csrf_test_name hash=3d7f8da9517597552fe40f314d9dd8ff
DEBUG - 2026-03-13 11:49:19 --> [REQ_ID=ac5d9907311a] [REQUEST][END]
INFO - 2026-03-13 11:49:19 --> [REQ_ID=ac5d9907311a] [PERF] Execution time=0.009725
DEBUG - 2026-03-13 11:49:19 --> [REQ_ID=ce5d886909f1] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-13 11:49:19 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-13 11:49:19 --> [REQ_ID=ce5d886909f1] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-13 11:49:19 --> [REQ_ID=ce5d886909f1] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-13 11:49:19 --> [REQ_ID=ce5d886909f1] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-13 11:49:19 --> [CSRF] token name=csrf_test_name hash=3d7f8da9517597552fe40f314d9dd8ff
DEBUG - 2026-03-13 11:49:19 --> [REQ_ID=6cd3c9629f25] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-13 11:49:19 --> [REQ_ID=6cd3c9629f25] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-13 11:49:19 --> [REQ_ID=ce5d886909f1] [FILTER_AFTER]
DEBUG - 2026-03-13 11:49:19 --> [REQ_ID=ce5d886909f1] [LIFECYCLE][END] status=200 duration_ms=27.25 memory_delta=0
INFO - 2026-03-13 11:49:19 --> [REQ_ID=6cd3c9629f25] [PERF] Execution time=0.027067
DEBUG - 2026-03-13 11:49:19 --> [REQ_ID=ce5d886909f1] [REQUEST][END]
INFO - 2026-03-13 11:49:19 --> [REQ_ID=ce5d886909f1] [PERF] Execution time=0.037671
DEBUG - 2026-03-13 11:49:29 --> [REQ_ID=cea08091e85a] [REQUEST][START] GET /index.php/Account/Social-Media
DEBUG - 2026-03-13 11:49:29 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-13 11:49:29 --> [REQ_ID=cea08091e85a] [FILTER_BEFORE] /index.php/Account/Social-Media
DEBUG - 2026-03-13 11:49:29 --> [REQ_ID=cea08091e85a] [ROUTE] Controller=\App\Modules\User\Controllers\DashboardController Method=SocialMedia
DEBUG - 2026-03-13 11:49:29 --> [REQ_ID=cea08091e85a] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Account/Social-Media
DEBUG - 2026-03-13 11:49:29 --> [CSRF] token name=csrf_test_name hash=3d7f8da9517597552fe40f314d9dd8ff
DEBUG - 2026-03-13 11:49:29 --> [REQ_ID=cea08091e85a] [REQUEST][END]
INFO - 2026-03-13 11:49:29 --> [REQ_ID=cea08091e85a] [PERF] Execution time=0.013943
DEBUG - 2026-03-13 11:49:29 --> [REQ_ID=47f25a97c53c] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-13 11:49:29 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-13 11:49:29 --> [REQ_ID=47f25a97c53c] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-13 11:49:29 --> [REQ_ID=47f25a97c53c] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-13 11:49:29 --> [REQ_ID=47f25a97c53c] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-13 11:49:29 --> [CSRF] token name=csrf_test_name hash=3d7f8da9517597552fe40f314d9dd8ff
DEBUG - 2026-03-13 11:49:29 --> [REQ_ID=0291364d4632] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-13 11:49:29 --> [REQ_ID=0291364d4632] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-13 11:49:30 --> [REQ_ID=47f25a97c53c] [FILTER_AFTER]
DEBUG - 2026-03-13 11:49:30 --> [REQ_ID=47f25a97c53c] [LIFECYCLE][END] status=200 duration_ms=16.46 memory_delta=0
INFO - 2026-03-13 11:49:30 --> [REQ_ID=0291364d4632] [PERF] Execution time=0.016380
DEBUG - 2026-03-13 11:49:30 --> [REQ_ID=47f25a97c53c] [REQUEST][END]
INFO - 2026-03-13 11:49:30 --> [REQ_ID=47f25a97c53c] [PERF] Execution time=0.025686
DEBUG - 2026-03-13 11:49:38 --> [REQ_ID=23ccc98cedbc] [REQUEST][START] GET /index.php/Management/Users
DEBUG - 2026-03-13 11:49:38 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-13 11:49:38 --> [REQ_ID=23ccc98cedbc] [FILTER_BEFORE] /index.php/Management/Users
DEBUG - 2026-03-13 11:49:38 --> [REQ_ID=23ccc98cedbc] [ROUTE] Controller=\App\Modules\Management\Controllers\UsersController Method=index
DEBUG - 2026-03-13 11:49:38 --> [REQ_ID=23ccc98cedbc] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Management/Users
DEBUG - 2026-03-13 11:49:38 --> [CSRF] token name=csrf_test_name hash=3d7f8da9517597552fe40f314d9dd8ff
DEBUG - 2026-03-13 11:49:38 --> [REQ_ID=23ccc98cedbc] [REQUEST][END]
INFO - 2026-03-13 11:49:38 --> [REQ_ID=23ccc98cedbc] [PERF] Execution time=0.010536
DEBUG - 2026-03-13 11:49:38 --> [REQ_ID=02e7f26776a2] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-13 11:49:38 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-13 11:49:38 --> [REQ_ID=02e7f26776a2] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-13 11:49:38 --> [REQ_ID=02e7f26776a2] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-13 11:49:38 --> [REQ_ID=02e7f26776a2] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-13 11:49:38 --> [CSRF] token name=csrf_test_name hash=3d7f8da9517597552fe40f314d9dd8ff
DEBUG - 2026-03-13 11:49:38 --> [REQ_ID=7ef2d52e3d63] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-13 11:49:38 --> [REQ_ID=7ef2d52e3d63] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-13 11:49:38 --> [REQ_ID=02e7f26776a2] [FILTER_AFTER]
DEBUG - 2026-03-13 11:49:38 --> [REQ_ID=02e7f26776a2] [LIFECYCLE][END] status=200 duration_ms=113.20 memory_delta=0
INFO - 2026-03-13 11:49:38 --> [REQ_ID=7ef2d52e3d63] [PERF] Execution time=0.112904
DEBUG - 2026-03-13 11:49:38 --> [REQ_ID=02e7f26776a2] [REQUEST][END]
INFO - 2026-03-13 11:49:38 --> [REQ_ID=02e7f26776a2] [PERF] Execution time=0.122217
DEBUG - 2026-03-13 11:49:48 --> [REQ_ID=3ad0e76529c8] [REQUEST][START] GET /index.php/Investments/News
DEBUG - 2026-03-13 11:49:48 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-13 11:49:48 --> [REQ_ID=3ad0e76529c8] [FILTER_BEFORE] /index.php/Investments/News
DEBUG - 2026-03-13 11:49:48 --> [REQ_ID=3ad0e76529c8] [ROUTE] Controller=closure_route Method=index
DEBUG - 2026-03-13 11:49:48 --> [REQ_ID=3ad0e76529c8] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Investments/News
DEBUG - 2026-03-13 11:49:48 --> [CSRF] token name=csrf_test_name hash=3d7f8da9517597552fe40f314d9dd8ff
DEBUG - 2026-03-13 11:49:48 --> [REQ_ID=3ad0e76529c8] [REQUEST][END]
INFO - 2026-03-13 11:49:48 --> [REQ_ID=3ad0e76529c8] [PERF] Execution time=0.009810
DEBUG - 2026-03-13 11:50:02 --> [REQ_ID=02d847ff870d] [REQUEST][START] GET /index.php/Account/Notifications
DEBUG - 2026-03-13 11:50:02 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-13 11:50:02 --> [REQ_ID=02d847ff870d] [FILTER_BEFORE] /index.php/Account/Notifications
DEBUG - 2026-03-13 11:50:02 --> [REQ_ID=02d847ff870d] [ROUTE] Controller=\App\Modules\User\Controllers\DashboardController Method=notifications
DEBUG - 2026-03-13 11:50:02 --> [REQ_ID=02d847ff870d] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Account/Notifications
DEBUG - 2026-03-13 11:50:02 --> [CSRF] token name=csrf_test_name hash=3d7f8da9517597552fe40f314d9dd8ff
DEBUG - 2026-03-13 11:50:02 --> [REQ_ID=02d847ff870d] [REQUEST][END]
INFO - 2026-03-13 11:50:02 --> [REQ_ID=02d847ff870d] [PERF] Execution time=0.009858
DEBUG - 2026-03-13 11:50:03 --> [REQ_ID=8f89fb0ee8da] [REQUEST][START] GET /index.php/Account/Security
DEBUG - 2026-03-13 11:50:03 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-13 11:50:03 --> [REQ_ID=8f89fb0ee8da] [FILTER_BEFORE] /index.php/Account/Security
DEBUG - 2026-03-13 11:50:03 --> [REQ_ID=8f89fb0ee8da] [ROUTE] Controller=\App\Modules\User\Controllers\DashboardController Method=Security
DEBUG - 2026-03-13 11:50:03 --> [REQ_ID=8f89fb0ee8da] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Account/Security
DEBUG - 2026-03-13 11:50:03 --> [CSRF] token name=csrf_test_name hash=3d7f8da9517597552fe40f314d9dd8ff
DEBUG - 2026-03-13 11:50:03 --> [REQ_ID=8f89fb0ee8da] [REQUEST][END]
INFO - 2026-03-13 11:50:03 --> [REQ_ID=8f89fb0ee8da] [PERF] Execution time=0.009720
DEBUG - 2026-03-13 11:50:04 --> [REQ_ID=645dcfeed658] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-13 11:50:04 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-13 11:50:04 --> [REQ_ID=645dcfeed658] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-13 11:50:04 --> [REQ_ID=645dcfeed658] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-13 11:50:04 --> [REQ_ID=645dcfeed658] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-13 11:50:04 --> [CSRF] token name=csrf_test_name hash=3d7f8da9517597552fe40f314d9dd8ff
DEBUG - 2026-03-13 11:50:04 --> [REQ_ID=e29129b375e6] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-13 11:50:04 --> [REQ_ID=e29129b375e6] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-13 11:50:04 --> [REQ_ID=645dcfeed658] [FILTER_AFTER]
DEBUG - 2026-03-13 11:50:04 --> [REQ_ID=645dcfeed658] [LIFECYCLE][END] status=200 duration_ms=106.02 memory_delta=0
INFO - 2026-03-13 11:50:04 --> [REQ_ID=e29129b375e6] [PERF] Execution time=0.106012
DEBUG - 2026-03-13 11:50:04 --> [REQ_ID=645dcfeed658] [REQUEST][END]
INFO - 2026-03-13 11:50:04 --> [REQ_ID=645dcfeed658] [PERF] Execution time=0.115231
DEBUG - 2026-03-13 11:50:05 --> [REQ_ID=03cd220f623b] [REQUEST][START] GET /index.php/Account/Connected-Accounts
DEBUG - 2026-03-13 11:50:05 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-13 11:50:05 --> [REQ_ID=03cd220f623b] [FILTER_BEFORE] /index.php/Account/Connected-Accounts
DEBUG - 2026-03-13 11:50:05 --> [REQ_ID=03cd220f623b] [ROUTE] Controller=\App\Modules\User\Controllers\DashboardController Method=connectedAccounts
DEBUG - 2026-03-13 11:50:05 --> [REQ_ID=03cd220f623b] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Account/Connected-Accounts
DEBUG - 2026-03-13 11:50:05 --> [CSRF] token name=csrf_test_name hash=3d7f8da9517597552fe40f314d9dd8ff
DEBUG - 2026-03-13 11:50:05 --> [REQ_ID=03cd220f623b] [REQUEST][END]
INFO - 2026-03-13 11:50:05 --> [REQ_ID=03cd220f623b] [PERF] Execution time=0.010175
DEBUG - 2026-03-13 11:50:06 --> [REQ_ID=402104be7e24] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-13 11:50:06 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-13 11:50:06 --> [REQ_ID=402104be7e24] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-13 11:50:06 --> [REQ_ID=402104be7e24] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-13 11:50:06 --> [REQ_ID=402104be7e24] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-13 11:50:06 --> [CSRF] token name=csrf_test_name hash=3d7f8da9517597552fe40f314d9dd8ff
DEBUG - 2026-03-13 11:50:06 --> [REQ_ID=beeb1386629f] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-13 11:50:06 --> [REQ_ID=beeb1386629f] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-13 11:50:06 --> [REQ_ID=402104be7e24] [FILTER_AFTER]
DEBUG - 2026-03-13 11:50:06 --> [REQ_ID=402104be7e24] [LIFECYCLE][END] status=200 duration_ms=17.18 memory_delta=0
INFO - 2026-03-13 11:50:06 --> [REQ_ID=beeb1386629f] [PERF] Execution time=0.016975
DEBUG - 2026-03-13 11:50:06 --> [REQ_ID=402104be7e24] [REQUEST][END]
INFO - 2026-03-13 11:50:06 --> [REQ_ID=402104be7e24] [PERF] Execution time=0.026482
DEBUG - 2026-03-13 11:50:13 --> [REQ_ID=610e1961a821] [REQUEST][START] GET /index.php/Account
DEBUG - 2026-03-13 11:50:13 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-13 11:50:13 --> [REQ_ID=610e1961a821] [FILTER_BEFORE] /index.php/Account
DEBUG - 2026-03-13 11:50:13 --> [REQ_ID=610e1961a821] [ROUTE] Controller=\App\Modules\User\Controllers\DashboardController Method=account
DEBUG - 2026-03-13 11:50:13 --> [REQ_ID=610e1961a821] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Account
DEBUG - 2026-03-13 11:50:13 --> [CSRF] token name=csrf_test_name hash=3d7f8da9517597552fe40f314d9dd8ff
DEBUG - 2026-03-13 11:50:13 --> [REQ_ID=610e1961a821] [REQUEST][END]
INFO - 2026-03-13 11:50:13 --> [REQ_ID=610e1961a821] [PERF] Execution time=0.010055
DEBUG - 2026-03-13 11:50:14 --> [REQ_ID=381e76832668] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-13 11:50:14 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-13 11:50:14 --> [REQ_ID=381e76832668] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-13 11:50:14 --> [REQ_ID=381e76832668] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-13 11:50:14 --> [REQ_ID=381e76832668] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-13 11:50:14 --> [CSRF] token name=csrf_test_name hash=3d7f8da9517597552fe40f314d9dd8ff
DEBUG - 2026-03-13 11:50:14 --> [REQ_ID=98ee3c162318] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-13 11:50:14 --> [REQ_ID=98ee3c162318] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-13 11:50:14 --> [REQ_ID=381e76832668] [FILTER_AFTER]
DEBUG - 2026-03-13 11:50:14 --> [REQ_ID=381e76832668] [LIFECYCLE][END] status=200 duration_ms=80.37 memory_delta=0
INFO - 2026-03-13 11:50:14 --> [REQ_ID=98ee3c162318] [PERF] Execution time=0.080194
DEBUG - 2026-03-13 11:50:14 --> [REQ_ID=381e76832668] [REQUEST][END]
INFO - 2026-03-13 11:50:14 --> [REQ_ID=381e76832668] [PERF] Execution time=0.088756
DEBUG - 2026-03-13 11:50:30 --> [REQ_ID=583460961ba0] [REQUEST][START] GET /index.php/Account/Activity
DEBUG - 2026-03-13 11:50:30 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-13 11:50:30 --> [REQ_ID=583460961ba0] [FILTER_BEFORE] /index.php/Account/Activity
DEBUG - 2026-03-13 11:50:30 --> [REQ_ID=583460961ba0] [ROUTE] Controller=\App\Modules\User\Controllers\DashboardController Method=activity
DEBUG - 2026-03-13 11:50:30 --> [REQ_ID=583460961ba0] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Account/Activity
DEBUG - 2026-03-13 11:50:30 --> [CSRF] token name=csrf_test_name hash=3d7f8da9517597552fe40f314d9dd8ff
DEBUG - 2026-03-13 11:50:30 --> [REQ_ID=583460961ba0] [REQUEST][END]
INFO - 2026-03-13 11:50:30 --> [REQ_ID=583460961ba0] [PERF] Execution time=0.010201
DEBUG - 2026-03-13 11:50:31 --> [REQ_ID=4561dbe74d2d] [REQUEST][START] GET /index.php/Profile/
DEBUG - 2026-03-13 11:50:31 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-13 11:50:31 --> [REQ_ID=4561dbe74d2d] [FILTER_BEFORE] /index.php/Profile/
DEBUG - 2026-03-13 11:50:31 --> [REQ_ID=4561dbe74d2d] [ROUTE] Controller=\App\Controllers\App\Modules\User\Controllers\DashboardController Method=profile
DEBUG - 2026-03-13 11:50:31 --> [REQ_ID=4561dbe74d2d] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Profile/
DEBUG - 2026-03-13 11:50:31 --> [CSRF] token name=csrf_test_name hash=3d7f8da9517597552fe40f314d9dd8ff
DEBUG - 2026-03-13 11:50:31 --> [REQ_ID=4561dbe74d2d] [REQUEST][END]
INFO - 2026-03-13 11:50:31 --> [REQ_ID=4561dbe74d2d] [PERF] Execution time=0.009535
DEBUG - 2026-03-13 11:50:32 --> [REQ_ID=d286b7762ff2] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-13 11:50:32 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-13 11:50:32 --> [REQ_ID=d286b7762ff2] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-13 11:50:32 --> [REQ_ID=d286b7762ff2] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-13 11:50:32 --> [REQ_ID=d286b7762ff2] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-13 11:50:32 --> [CSRF] token name=csrf_test_name hash=3d7f8da9517597552fe40f314d9dd8ff
DEBUG - 2026-03-13 11:50:32 --> [REQ_ID=0f769605bf9c] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-13 11:50:32 --> [REQ_ID=0f769605bf9c] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-13 11:50:32 --> [REQ_ID=d286b7762ff2] [FILTER_AFTER]
DEBUG - 2026-03-13 11:50:32 --> [REQ_ID=d286b7762ff2] [LIFECYCLE][END] status=200 duration_ms=33.10 memory_delta=0
INFO - 2026-03-13 11:50:32 --> [REQ_ID=0f769605bf9c] [PERF] Execution time=0.033026
DEBUG - 2026-03-13 11:50:32 --> [REQ_ID=d286b7762ff2] [REQUEST][END]
INFO - 2026-03-13 11:50:32 --> [REQ_ID=d286b7762ff2] [PERF] Execution time=0.043409
DEBUG - 2026-03-13 11:50:42 --> [REQ_ID=38183ec768a2] [REQUEST][START] GET /index.php/Account/Billing
DEBUG - 2026-03-13 11:50:42 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-13 11:50:42 --> [REQ_ID=38183ec768a2] [FILTER_BEFORE] /index.php/Account/Billing
DEBUG - 2026-03-13 11:50:42 --> [REQ_ID=38183ec768a2] [ROUTE] Controller=\App\Modules\User\Controllers\DashboardController Method=billing
DEBUG - 2026-03-13 11:50:42 --> [REQ_ID=38183ec768a2] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Account/Billing
DEBUG - 2026-03-13 11:50:42 --> [CSRF] token name=csrf_test_name hash=3d7f8da9517597552fe40f314d9dd8ff
DEBUG - 2026-03-13 11:50:42 --> [REQ_ID=38183ec768a2] [REQUEST][END]
INFO - 2026-03-13 11:50:42 --> [REQ_ID=38183ec768a2] [PERF] Execution time=0.011247
DEBUG - 2026-03-13 11:50:42 --> [REQ_ID=deb106158709] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-13 11:50:42 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-13 11:50:42 --> [REQ_ID=deb106158709] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-13 11:50:42 --> [REQ_ID=deb106158709] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-13 11:50:42 --> [REQ_ID=deb106158709] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-13 11:50:42 --> [CSRF] token name=csrf_test_name hash=3d7f8da9517597552fe40f314d9dd8ff
DEBUG - 2026-03-13 11:50:42 --> [REQ_ID=56ff498be578] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-13 11:50:42 --> [REQ_ID=56ff498be578] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-13 11:50:42 --> [REQ_ID=deb106158709] [FILTER_AFTER]
DEBUG - 2026-03-13 11:50:42 --> [REQ_ID=deb106158709] [LIFECYCLE][END] status=200 duration_ms=29.62 memory_delta=0
INFO - 2026-03-13 11:50:42 --> [REQ_ID=56ff498be578] [PERF] Execution time=0.029761
DEBUG - 2026-03-13 11:50:42 --> [REQ_ID=deb106158709] [REQUEST][END]
INFO - 2026-03-13 11:50:42 --> [REQ_ID=deb106158709] [PERF] Execution time=0.038525
DEBUG - 2026-03-13 11:50:51 --> [REQ_ID=379807d51932] [REQUEST][START] GET /index.php/How-It-Works/Automated-Financial-Insights
DEBUG - 2026-03-13 11:50:51 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-13 11:50:51 --> [REQ_ID=379807d51932] [FILTER_BEFORE] /index.php/How-It-Works/Automated-Financial-Insights
DEBUG - 2026-03-13 11:50:51 --> [REQ_ID=379807d51932] [ROUTE] Controller=\App\Modules\Blog\Controllers\HowItWorksController Method=show
DEBUG - 2026-03-13 11:50:51 --> [REQ_ID=379807d51932] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/How-It-Works/Automated-Financial-Insights
DEBUG - 2026-03-13 11:50:51 --> [CSRF] token name=csrf_test_name hash=3d7f8da9517597552fe40f314d9dd8ff
DEBUG - 2026-03-13 11:50:51 --> [REQ_ID=5cc5ef7bf434] [INIT] App\Modules\Blog\Controllers\HowItWorksController::GET
INFO - 2026-03-13 11:50:51 --> [REQ_ID=5cc5ef7bf434] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-13 11:50:52 --> [REQ_ID=5cc5ef7bf434] [METHOD_ENTRY] show
DEBUG - 2026-03-13 11:50:52 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-13 11:50:52 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-13 11:50:52 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-13 11:50:52 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-13 11:50:52 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-13 11:50:52 --> MyMICoin: guest context detected; skipping user-specific preload.
ERROR - 2026-03-13 11:50:52 --> HowItWorksController failure: automated-financial-insights
CRITICAL - 2026-03-13 11:50:52 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: GET, Route: How-It-Works/Automated-Financial-Insights]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-13 11:50:52 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-13 11:50:52 --> [404] URI=https://www.mymiwallet.com/index.php/How-It-Works/Automated-Financial-Insights
WARNING - 2026-03-13 11:50:52 --> 404 route miss: https://www.mymiwallet.com/index.php/How-It-Works/Automated-Financial-Insights | referrer: none
ERROR - 2026-03-13 11:50:52 --> [ERROR_PAGE] event=error_404 status=404 message=Page not found.
INFO - 2026-03-13 11:50:52 --> [REQ_ID=5cc5ef7bf434] [PERF] Execution time=0.039021
DEBUG - 2026-03-13 11:51:22 --> [REQ_ID=e3e5460679d9] [REQUEST][START] HEAD /
DEBUG - 2026-03-13 11:51:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-13 11:51:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-13 11:51:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-13 11:51:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-13 11:51:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-13 11:55:37 --> [REQ_ID=4cd5283e10a3] [REQUEST][START] GET /
DEBUG - 2026-03-13 11:55:37 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-13 11:55:37 --> [REQ_ID=4cd5283e10a3] [FILTER_BEFORE] /
DEBUG - 2026-03-13 11:55:37 --> [REQ_ID=4cd5283e10a3] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-13 11:55:37 --> [REQ_ID=4cd5283e10a3] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-13 11:55:37 --> [CSRF] token name=csrf_test_name hash=b18c172beeb5cbfa09fbbb9778d5e4b6
DEBUG - 2026-03-13 11:55:37 --> [REQ_ID=396f129f109a] [INIT] App\Controllers\Home::GET
INFO - 2026-03-13 11:55:37 --> [REQ_ID=396f129f109a] [MEMORY][controller-start] 6291456
INFO - 2026-03-13 11:55:37 --> [REQ_ID=396f129f109a] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-13 11:55:37 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-13 11:55:38 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
DEBUG - 2026-03-13 11:55:38 --> [REQ_ID=396f129f109a] [VIEW_RENDER] themes/public/home
INFO - 2026-03-13 11:55:38 --> [REQ_ID=396f129f109a] [MEMORY][commonData:start] 10485760
INFO - 2026-03-13 11:55:38 --> themesMemory usage: 10485760
DEBUG - 2026-03-13 11:55:38 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-13 11:55:38 --> [REQ_ID=4cd5283e10a3] [FILTER_AFTER]
DEBUG - 2026-03-13 11:55:38 --> [REQ_ID=4cd5283e10a3] [LIFECYCLE][END] status=200 duration_ms=848.05 memory_delta=4194304
INFO - 2026-03-13 11:55:38 --> [REQ_ID=396f129f109a] [PERF] Execution time=0.845979
DEBUG - 2026-03-13 11:55:38 --> [REQ_ID=4cd5283e10a3] [REQUEST][END]
INFO - 2026-03-13 11:55:38 --> [REQ_ID=4cd5283e10a3] [PERF] Execution time=0.888312
DEBUG - 2026-03-13 11:56:22 --> [REQ_ID=010d8f99870d] [REQUEST][START] HEAD /
DEBUG - 2026-03-13 11:56:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-13 11:56:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-13 11:56:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-13 11:56:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-13 11:56:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-13 12:00:01 --> [REQ_ID=6739f9b2e2dc] [REQUEST][START] GET /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-13 12:00:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-13 12:00:01 --> [REQ_ID=6739f9b2e2dc] [FILTER_BEFORE] /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-13 12:00:01 --> [REQ_ID=6739f9b2e2dc] [ROUTE] Controller=\App\Modules\Management\Controllers\ManagementAPIController Method=Run_CRON_Tasks
DEBUG - 2026-03-13 12:00:01 --> [REQ_ID=6739f9b2e2dc] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-13 12:00:01 --> [REQ_ID=6739f9b2e2dc] [REQUEST][END]
INFO - 2026-03-13 12:00:01 --> [REQ_ID=6739f9b2e2dc] [PERF] Execution time=0.069329
DEBUG - 2026-03-13 12:01:22 --> [REQ_ID=65d07025572a] [REQUEST][START] HEAD /
DEBUG - 2026-03-13 12:01:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-13 12:01:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-13 12:01:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-13 12:01:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-13 12:01:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-13 12:03:44 --> [REQ_ID=261311b50419] [REQUEST][START] GET /
DEBUG - 2026-03-13 12:03:44 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-13 12:03:44 --> [REQ_ID=261311b50419] [FILTER_BEFORE] /
DEBUG - 2026-03-13 12:03:44 --> [REQ_ID=261311b50419] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-13 12:03:44 --> [REQ_ID=261311b50419] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-13 12:03:44 --> [CSRF] token name=csrf_test_name hash=000d7102104e7002b12959c3390098f5
DEBUG - 2026-03-13 12:03:44 --> [REQ_ID=3ed7bee56958] [INIT] App\Controllers\Home::GET
INFO - 2026-03-13 12:03:44 --> [REQ_ID=3ed7bee56958] [MEMORY][controller-start] 6291456
INFO - 2026-03-13 12:03:44 --> [REQ_ID=3ed7bee56958] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-13 12:03:44 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-13 12:03:45 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-03-13 12:03:45 --> [REQ_ID=3ed7bee56958] [VIEW_RENDER] themes/public/home
INFO - 2026-03-13 12:03:45 --> [REQ_ID=3ed7bee56958] [MEMORY][commonData:start] 10485760
INFO - 2026-03-13 12:03:45 --> themesMemory usage: 10485760
DEBUG - 2026-03-13 12:03:45 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-13 12:03:45 --> [REQ_ID=261311b50419] [FILTER_AFTER]
DEBUG - 2026-03-13 12:03:45 --> [REQ_ID=261311b50419] [LIFECYCLE][END] status=200 duration_ms=734.03 memory_delta=4194304
INFO - 2026-03-13 12:03:45 --> [REQ_ID=3ed7bee56958] [PERF] Execution time=0.732079
DEBUG - 2026-03-13 12:03:45 --> [REQ_ID=261311b50419] [REQUEST][END]
INFO - 2026-03-13 12:03:45 --> [REQ_ID=261311b50419] [PERF] Execution time=0.773216
DEBUG - 2026-03-13 12:06:22 --> [REQ_ID=d306654d9427] [REQUEST][START] HEAD /
DEBUG - 2026-03-13 12:06:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-13 12:06:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-13 12:06:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-13 12:06:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-13 12:06:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-13 12:11:22 --> [REQ_ID=9590dd2e6de0] [REQUEST][START] HEAD /
DEBUG - 2026-03-13 12:11:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-13 12:11:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-13 12:11:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-13 12:11:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-13 12:11:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-13 12:12:16 --> [REQ_ID=70d9ffc36873] [REQUEST][START] GET /
DEBUG - 2026-03-13 12:12:16 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-13 12:12:16 --> [REQ_ID=70d9ffc36873] [FILTER_BEFORE] /
DEBUG - 2026-03-13 12:12:16 --> [REQ_ID=70d9ffc36873] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-13 12:12:16 --> [REQ_ID=70d9ffc36873] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-13 12:12:16 --> [CSRF] token name=csrf_test_name hash=e69e3749479b6e65fa192e48c92a73e9
DEBUG - 2026-03-13 12:12:16 --> [REQ_ID=509b8af8caad] [INIT] App\Controllers\Home::GET
INFO - 2026-03-13 12:12:16 --> [REQ_ID=509b8af8caad] [MEMORY][controller-start] 4194304
INFO - 2026-03-13 12:12:16 --> [REQ_ID=509b8af8caad] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-13 12:12:16 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-13 12:12:16 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
DEBUG - 2026-03-13 12:12:16 --> [REQ_ID=509b8af8caad] [VIEW_RENDER] themes/public/home
INFO - 2026-03-13 12:12:16 --> [REQ_ID=509b8af8caad] [MEMORY][commonData:start] 8388608
INFO - 2026-03-13 12:12:16 --> themesMemory usage: 8388608
DEBUG - 2026-03-13 12:12:16 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-13 12:12:16 --> [REQ_ID=70d9ffc36873] [FILTER_AFTER]
DEBUG - 2026-03-13 12:12:16 --> [REQ_ID=70d9ffc36873] [LIFECYCLE][END] status=200 duration_ms=706.27 memory_delta=4194304
INFO - 2026-03-13 12:12:16 --> [REQ_ID=509b8af8caad] [PERF] Execution time=0.704353
DEBUG - 2026-03-13 12:12:16 --> [REQ_ID=70d9ffc36873] [REQUEST][END]
INFO - 2026-03-13 12:12:16 --> [REQ_ID=70d9ffc36873] [PERF] Execution time=0.724761
DEBUG - 2026-03-13 12:15:01 --> [REQ_ID=51275d093569] [REQUEST][START] GET /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-13 12:15:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-13 12:15:01 --> [REQ_ID=51275d093569] [FILTER_BEFORE] /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-13 12:15:01 --> [REQ_ID=51275d093569] [ROUTE] Controller=\App\Modules\APIs\Controllers\AlertsAPIController Method=fetchEmailAlerts
DEBUG - 2026-03-13 12:15:01 --> [REQ_ID=51275d093569] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-13 12:15:01 --> [REQ_ID=51275d093569] [REQUEST][END]
INFO - 2026-03-13 12:15:01 --> [REQ_ID=51275d093569] [PERF] Execution time=0.046178
DEBUG - 2026-03-13 12:16:22 --> [REQ_ID=27173a7ad104] [REQUEST][START] HEAD /
DEBUG - 2026-03-13 12:16:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-13 12:16:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-13 12:16:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-13 12:16:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-13 12:16:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-13 12:21:22 --> [REQ_ID=e6be10eb702b] [REQUEST][START] HEAD /
DEBUG - 2026-03-13 12:21:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-13 12:21:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-13 12:21:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-13 12:21:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-13 12:21:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-13 12:26:03 --> [REQ_ID=5a52e9961517] [REQUEST][START] GET /index.php/Wallets/Purchase/Memberships
DEBUG - 2026-03-13 12:26:03 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-13 12:26:03 --> [REQ_ID=5a52e9961517] [REQUEST][END]
INFO - 2026-03-13 12:26:03 --> [REQ_ID=5a52e9961517] [PERF] Execution time=0.044607
DEBUG - 2026-03-13 12:26:22 --> [REQ_ID=215fc832a1f1] [REQUEST][START] HEAD /
DEBUG - 2026-03-13 12:26:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-13 12:26:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-13 12:26:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-13 12:26:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-13 12:26:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-13 12:31:22 --> [REQ_ID=8ade751fcd93] [REQUEST][START] HEAD /
DEBUG - 2026-03-13 12:31:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-13 12:31:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-13 12:31:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-13 12:31:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-13 12:31:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-13 12:36:22 --> [REQ_ID=8e807ef76acf] [REQUEST][START] HEAD /
DEBUG - 2026-03-13 12:36:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-13 12:36:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-13 12:36:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-13 12:36:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-13 12:36:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-13 12:39:52 --> [REQ_ID=58217189e2d6] [REQUEST][START] GET /
DEBUG - 2026-03-13 12:39:52 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-13 12:39:52 --> [REQ_ID=58217189e2d6] [FILTER_BEFORE] /
DEBUG - 2026-03-13 12:39:52 --> [REQ_ID=58217189e2d6] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-13 12:39:52 --> [REQ_ID=58217189e2d6] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-13 12:39:52 --> [CSRF] token name=csrf_test_name hash=cee752a481728d8316584072e8755e0b
DEBUG - 2026-03-13 12:39:52 --> [REQ_ID=3241e19d5fee] [INIT] App\Controllers\Home::GET
INFO - 2026-03-13 12:39:52 --> [REQ_ID=3241e19d5fee] [MEMORY][controller-start] 6291456
INFO - 2026-03-13 12:39:52 --> [REQ_ID=3241e19d5fee] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-13 12:39:52 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-13 12:39:52 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-03-13 12:39:52 --> [REQ_ID=3241e19d5fee] [VIEW_RENDER] themes/public/home
INFO - 2026-03-13 12:39:52 --> [REQ_ID=3241e19d5fee] [MEMORY][commonData:start] 10485760
INFO - 2026-03-13 12:39:52 --> themesMemory usage: 10485760
DEBUG - 2026-03-13 12:39:52 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-13 12:39:52 --> [REQ_ID=58217189e2d6] [FILTER_AFTER]
DEBUG - 2026-03-13 12:39:52 --> [REQ_ID=58217189e2d6] [LIFECYCLE][END] status=200 duration_ms=796.43 memory_delta=4194304
INFO - 2026-03-13 12:39:52 --> [REQ_ID=3241e19d5fee] [PERF] Execution time=0.794541
DEBUG - 2026-03-13 12:39:52 --> [REQ_ID=58217189e2d6] [REQUEST][END]
INFO - 2026-03-13 12:39:52 --> [REQ_ID=58217189e2d6] [PERF] Execution time=0.840405
DEBUG - 2026-03-13 12:41:22 --> [REQ_ID=82dcb79ee973] [REQUEST][START] HEAD /
DEBUG - 2026-03-13 12:41:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-13 12:41:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-13 12:41:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-13 12:41:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-13 12:41:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-13 12:46:22 --> [REQ_ID=59d3d1a59d8c] [REQUEST][START] HEAD /
DEBUG - 2026-03-13 12:46:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-13 12:46:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-13 12:46:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-13 12:46:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-13 12:46:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-13 12:51:22 --> [REQ_ID=ba7a6a897079] [REQUEST][START] HEAD /
DEBUG - 2026-03-13 12:51:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-13 12:51:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-13 12:51:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-13 12:51:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-13 12:51:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-13 12:56:22 --> [REQ_ID=dcba47163e7e] [REQUEST][START] HEAD /
DEBUG - 2026-03-13 12:56:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-13 12:56:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-13 12:56:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-13 12:56:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-13 12:56:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-13 12:58:43 --> [REQ_ID=c48ac56f3780] [REQUEST][START] GET /
DEBUG - 2026-03-13 12:58:43 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-13 12:58:43 --> [REQ_ID=c48ac56f3780] [FILTER_BEFORE] /
DEBUG - 2026-03-13 12:58:43 --> [REQ_ID=c48ac56f3780] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-13 12:58:43 --> [REQ_ID=c48ac56f3780] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-13 12:58:43 --> [CSRF] token name=csrf_test_name hash=000d7102104e7002b12959c3390098f5
DEBUG - 2026-03-13 12:58:43 --> [REQ_ID=0e8476a7704a] [INIT] App\Controllers\Home::GET
INFO - 2026-03-13 12:58:43 --> [REQ_ID=0e8476a7704a] [MEMORY][controller-start] 6291456
INFO - 2026-03-13 12:58:43 --> [REQ_ID=0e8476a7704a] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-13 12:58:43 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-13 12:58:44 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-03-13 12:58:44 --> [REQ_ID=0e8476a7704a] [VIEW_RENDER] themes/public/home
INFO - 2026-03-13 12:58:44 --> [REQ_ID=0e8476a7704a] [MEMORY][commonData:start] 10485760
INFO - 2026-03-13 12:58:44 --> themesMemory usage: 10485760
DEBUG - 2026-03-13 12:58:44 --> [MetaService] slug= pageName=Home cacheHit= path=DB
DEBUG - 2026-03-13 12:58:44 --> [REQ_ID=c48ac56f3780] [FILTER_AFTER]
DEBUG - 2026-03-13 12:58:44 --> [REQ_ID=c48ac56f3780] [LIFECYCLE][END] status=200 duration_ms=694.64 memory_delta=4194304
INFO - 2026-03-13 12:58:44 --> [REQ_ID=0e8476a7704a] [PERF] Execution time=0.692487
DEBUG - 2026-03-13 12:58:44 --> [REQ_ID=c48ac56f3780] [REQUEST][END]
INFO - 2026-03-13 12:58:44 --> [REQ_ID=c48ac56f3780] [PERF] Execution time=0.734223
DEBUG - 2026-03-13 13:00:01 --> [REQ_ID=ef314e702668] [REQUEST][START] GET /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-13 13:00:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-13 13:00:01 --> [REQ_ID=ef314e702668] [FILTER_BEFORE] /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-13 13:00:01 --> [REQ_ID=ef314e702668] [ROUTE] Controller=\App\Modules\Management\Controllers\ManagementAPIController Method=Run_CRON_Tasks
DEBUG - 2026-03-13 13:00:01 --> [REQ_ID=ef314e702668] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-13 13:00:01 --> [REQ_ID=ef314e702668] [REQUEST][END]
INFO - 2026-03-13 13:00:01 --> [REQ_ID=ef314e702668] [PERF] Execution time=0.048686
DEBUG - 2026-03-13 13:01:22 --> [REQ_ID=4d87c707477f] [REQUEST][START] HEAD /
DEBUG - 2026-03-13 13:01:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-13 13:01:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-13 13:01:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-13 13:01:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-13 13:01:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-13 13:06:22 --> [REQ_ID=df22d3f1c7ec] [REQUEST][START] HEAD /
DEBUG - 2026-03-13 13:06:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-13 13:06:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-13 13:06:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-13 13:06:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-13 13:06:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-13 13:11:22 --> [REQ_ID=06d927432ef9] [REQUEST][START] HEAD /
DEBUG - 2026-03-13 13:11:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-13 13:11:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-13 13:11:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-13 13:11:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-13 13:11:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-13 13:14:17 --> [REQ_ID=807ded870ca5] [REQUEST][START] GET /index.php/Alerts
DEBUG - 2026-03-13 13:14:17 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-13 13:14:17 --> [REQ_ID=807ded870ca5] [FILTER_BEFORE] /index.php/Alerts
DEBUG - 2026-03-13 13:14:17 --> [REQ_ID=807ded870ca5] [ROUTE] Controller=\App\Modules\User\Controllers\AlertsController Method=index
DEBUG - 2026-03-13 13:14:17 --> [REQ_ID=807ded870ca5] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Alerts
DEBUG - 2026-03-13 13:14:17 --> [CSRF] token name=csrf_test_name hash=5a756992cd8e89bf9519d0838f38b903
DEBUG - 2026-03-13 13:14:17 --> [REQ_ID=807ded870ca5] [REQUEST][END]
INFO - 2026-03-13 13:14:17 --> [REQ_ID=807ded870ca5] [PERF] Execution time=0.054193
DEBUG - 2026-03-13 13:14:17 --> [REQ_ID=4f767636ddef] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-13 13:14:17 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-13 13:14:17 --> [REQ_ID=4f767636ddef] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-13 13:14:17 --> [REQ_ID=4f767636ddef] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-13 13:14:17 --> [REQ_ID=4f767636ddef] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-13 13:14:17 --> [CSRF] token name=csrf_test_name hash=01c1637a4ebd9c9570797bfd775a642c
DEBUG - 2026-03-13 13:14:17 --> [REQ_ID=8d7e83e9a761] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-13 13:14:17 --> [REQ_ID=8d7e83e9a761] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-13 13:14:17 --> [REQ_ID=4f767636ddef] [FILTER_AFTER]
DEBUG - 2026-03-13 13:14:17 --> [REQ_ID=4f767636ddef] [LIFECYCLE][END] status=200 duration_ms=78.43 memory_delta=0
INFO - 2026-03-13 13:14:17 --> [REQ_ID=8d7e83e9a761] [PERF] Execution time=0.077955
DEBUG - 2026-03-13 13:14:17 --> [REQ_ID=4f767636ddef] [REQUEST][END]
INFO - 2026-03-13 13:14:17 --> [REQ_ID=4f767636ddef] [PERF] Execution time=0.089930
DEBUG - 2026-03-13 13:15:01 --> [REQ_ID=1764a5ca00fd] [REQUEST][START] GET /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-13 13:15:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-13 13:15:01 --> [REQ_ID=1764a5ca00fd] [FILTER_BEFORE] /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-13 13:15:01 --> [REQ_ID=1764a5ca00fd] [ROUTE] Controller=\App\Modules\APIs\Controllers\AlertsAPIController Method=fetchEmailAlerts
DEBUG - 2026-03-13 13:15:01 --> [REQ_ID=1764a5ca00fd] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-13 13:15:01 --> [REQ_ID=1764a5ca00fd] [REQUEST][END]
INFO - 2026-03-13 13:15:01 --> [REQ_ID=1764a5ca00fd] [PERF] Execution time=0.015550
DEBUG - 2026-03-13 13:16:05 --> [REQ_ID=bc05f0bceba7] [REQUEST][START] GET /
DEBUG - 2026-03-13 13:16:05 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-13 13:16:05 --> [REQ_ID=bc05f0bceba7] [FILTER_BEFORE] /
DEBUG - 2026-03-13 13:16:05 --> [REQ_ID=bc05f0bceba7] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-13 13:16:05 --> [REQ_ID=bc05f0bceba7] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-13 13:16:05 --> [CSRF] token name=csrf_test_name hash=6de2fd7565c5bb751f28deb31140f54b
DEBUG - 2026-03-13 13:16:05 --> [REQ_ID=8ca0137ca2dd] [INIT] App\Controllers\Home::GET
INFO - 2026-03-13 13:16:05 --> [REQ_ID=8ca0137ca2dd] [MEMORY][controller-start] 4194304
INFO - 2026-03-13 13:16:05 --> [REQ_ID=8ca0137ca2dd] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-13 13:16:05 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-13 13:16:06 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-03-13 13:16:06 --> [REQ_ID=8ca0137ca2dd] [VIEW_RENDER] themes/public/home
INFO - 2026-03-13 13:16:06 --> [REQ_ID=8ca0137ca2dd] [MEMORY][commonData:start] 8388608
INFO - 2026-03-13 13:16:06 --> themesMemory usage: 8388608
DEBUG - 2026-03-13 13:16:06 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-13 13:16:06 --> [REQ_ID=bc05f0bceba7] [FILTER_AFTER]
DEBUG - 2026-03-13 13:16:06 --> [REQ_ID=bc05f0bceba7] [LIFECYCLE][END] status=200 duration_ms=1,033.02 memory_delta=4194304
INFO - 2026-03-13 13:16:06 --> [REQ_ID=8ca0137ca2dd] [PERF] Execution time=1.032755
DEBUG - 2026-03-13 13:16:06 --> [REQ_ID=bc05f0bceba7] [REQUEST][END]
INFO - 2026-03-13 13:16:06 --> [REQ_ID=bc05f0bceba7] [PERF] Execution time=1.043789
DEBUG - 2026-03-13 13:16:22 --> [REQ_ID=8806e5891460] [REQUEST][START] HEAD /
DEBUG - 2026-03-13 13:16:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-13 13:16:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-13 13:16:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-13 13:16:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-13 13:16:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-13 13:17:19 --> [REQ_ID=d570e7847c82] [REQUEST][START] GET /index.php/Investments
DEBUG - 2026-03-13 13:17:19 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-13 13:17:19 --> [REQ_ID=d570e7847c82] [REQUEST][END]
INFO - 2026-03-13 13:17:19 --> [REQ_ID=d570e7847c82] [PERF] Execution time=0.012701
DEBUG - 2026-03-13 13:21:22 --> [REQ_ID=e6f2a35f15d1] [REQUEST][START] HEAD /
DEBUG - 2026-03-13 13:21:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-13 13:21:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-13 13:21:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-13 13:21:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-13 13:21:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-13 13:23:57 --> [REQ_ID=008b1098f5de] [REQUEST][START] GET /
DEBUG - 2026-03-13 13:23:57 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-13 13:23:57 --> [REQ_ID=008b1098f5de] [FILTER_BEFORE] /
DEBUG - 2026-03-13 13:23:57 --> [REQ_ID=008b1098f5de] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-13 13:23:57 --> [REQ_ID=008b1098f5de] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-13 13:23:57 --> [CSRF] token name=csrf_test_name hash=22e12fbe8815eb69d7926d60948de123
DEBUG - 2026-03-13 13:23:57 --> [REQ_ID=8e427fdafa66] [INIT] App\Controllers\Home::GET
INFO - 2026-03-13 13:23:57 --> [REQ_ID=8e427fdafa66] [MEMORY][controller-start] 6291456
INFO - 2026-03-13 13:23:57 --> [REQ_ID=8e427fdafa66] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-13 13:23:57 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-13 13:23:58 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
DEBUG - 2026-03-13 13:23:58 --> [REQ_ID=8e427fdafa66] [VIEW_RENDER] themes/public/home
INFO - 2026-03-13 13:23:58 --> [REQ_ID=8e427fdafa66] [MEMORY][commonData:start] 10485760
INFO - 2026-03-13 13:23:58 --> themesMemory usage: 10485760
DEBUG - 2026-03-13 13:23:58 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-13 13:23:58 --> [REQ_ID=008b1098f5de] [FILTER_AFTER]
DEBUG - 2026-03-13 13:23:58 --> [REQ_ID=008b1098f5de] [LIFECYCLE][END] status=200 duration_ms=968.13 memory_delta=4194304
INFO - 2026-03-13 13:23:58 --> [REQ_ID=8e427fdafa66] [PERF] Execution time=0.966141
DEBUG - 2026-03-13 13:23:58 --> [REQ_ID=008b1098f5de] [REQUEST][END]
INFO - 2026-03-13 13:23:58 --> [REQ_ID=008b1098f5de] [PERF] Execution time=1.008230
DEBUG - 2026-03-13 13:23:58 --> [REQ_ID=763280987c3d] [REQUEST][START] GET /
DEBUG - 2026-03-13 13:23:58 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-13 13:23:58 --> [REQ_ID=763280987c3d] [FILTER_BEFORE] /
DEBUG - 2026-03-13 13:23:58 --> [REQ_ID=763280987c3d] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-13 13:23:58 --> [REQ_ID=763280987c3d] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-13 13:23:58 --> [CSRF] token name=csrf_test_name hash=37f9b41f233e67ded6388ebb5d6f9449
DEBUG - 2026-03-13 13:23:58 --> [REQ_ID=b632e325d05e] [INIT] App\Controllers\Home::GET
INFO - 2026-03-13 13:23:58 --> [REQ_ID=b632e325d05e] [MEMORY][controller-start] 6291456
INFO - 2026-03-13 13:23:58 --> [REQ_ID=b632e325d05e] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-13 13:23:58 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-13 13:23:59 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
DEBUG - 2026-03-13 13:23:59 --> [REQ_ID=b632e325d05e] [VIEW_RENDER] themes/public/home
INFO - 2026-03-13 13:23:59 --> [REQ_ID=b632e325d05e] [MEMORY][commonData:start] 8388608
INFO - 2026-03-13 13:23:59 --> themesMemory usage: 8388608
DEBUG - 2026-03-13 13:23:59 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-13 13:23:59 --> [REQ_ID=763280987c3d] [FILTER_AFTER]
DEBUG - 2026-03-13 13:23:59 --> [REQ_ID=763280987c3d] [LIFECYCLE][END] status=200 duration_ms=772.08 memory_delta=2097152
INFO - 2026-03-13 13:23:59 --> [REQ_ID=b632e325d05e] [PERF] Execution time=0.771805
DEBUG - 2026-03-13 13:23:59 --> [REQ_ID=763280987c3d] [REQUEST][END]
INFO - 2026-03-13 13:23:59 --> [REQ_ID=763280987c3d] [PERF] Execution time=0.782911
DEBUG - 2026-03-13 13:24:51 --> [REQ_ID=c703a7359e67] [REQUEST][START] GET /
DEBUG - 2026-03-13 13:24:51 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-13 13:24:51 --> [REQ_ID=c703a7359e67] [FILTER_BEFORE] /
DEBUG - 2026-03-13 13:24:51 --> [REQ_ID=c703a7359e67] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-13 13:24:51 --> [REQ_ID=c703a7359e67] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-13 13:24:51 --> [CSRF] token name=csrf_test_name hash=c3b68267f6fd5bd643fe34072528b375
DEBUG - 2026-03-13 13:24:51 --> [REQ_ID=24ec4f64414d] [INIT] App\Controllers\Home::GET
INFO - 2026-03-13 13:24:51 --> [REQ_ID=24ec4f64414d] [MEMORY][controller-start] 6291456
INFO - 2026-03-13 13:24:51 --> [REQ_ID=24ec4f64414d] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-13 13:24:51 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-13 13:24:52 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
DEBUG - 2026-03-13 13:24:52 --> [REQ_ID=24ec4f64414d] [VIEW_RENDER] themes/public/home
INFO - 2026-03-13 13:24:52 --> [REQ_ID=24ec4f64414d] [MEMORY][commonData:start] 8388608
INFO - 2026-03-13 13:24:52 --> themesMemory usage: 8388608
DEBUG - 2026-03-13 13:24:52 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-13 13:24:52 --> [REQ_ID=c703a7359e67] [FILTER_AFTER]
DEBUG - 2026-03-13 13:24:52 --> [REQ_ID=c703a7359e67] [LIFECYCLE][END] status=200 duration_ms=574.12 memory_delta=2097152
INFO - 2026-03-13 13:24:52 --> [REQ_ID=24ec4f64414d] [PERF] Execution time=0.573989
DEBUG - 2026-03-13 13:24:52 --> [REQ_ID=c703a7359e67] [REQUEST][END]
INFO - 2026-03-13 13:24:52 --> [REQ_ID=c703a7359e67] [PERF] Execution time=0.583382
DEBUG - 2026-03-13 13:24:58 --> [REQ_ID=04617e5d4e41] [REQUEST][START] POST /index.php/register
DEBUG - 2026-03-13 13:24:58 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-13 13:24:58 --> [REQ_ID=04617e5d4e41] [FILTER_BEFORE] /index.php/register
DEBUG - 2026-03-13 13:24:58 --> [REQ_ID=04617e5d4e41] [ROUTE] Controller=\App\Controllers\AuthController Method=attemptRegister
DEBUG - 2026-03-13 13:24:58 --> [REQ_ID=04617e5d4e41] [LIFECYCLE][START] POST https://www.mymiwallet.com/index.php/register
DEBUG - 2026-03-13 13:24:58 --> [CSRF] token name=csrf_test_name hash=c3b68267f6fd5bd643fe34072528b375
INFO - 2026-03-13 13:24:58 --> CSRF token verified.
DEBUG - 2026-03-13 13:24:58 --> [REQ_ID=fd79cc7fc914] [INIT] App\Controllers\AuthController::POST
INFO - 2026-03-13 13:24:58 --> [REQ_ID=fd79cc7fc914] [MEMORY][controller-start] 6291456
INFO - 2026-03-13 13:24:58 --> [REGISTRATION] Submission received
INFO - 2026-03-13 13:24:58 --> MailService queued email
INFO - 2026-03-13 13:24:58 --> [REGISTRATION] Validation passed (basic fields)
INFO - 2026-03-13 13:24:58 --> [REGISTRATION] Validation passed (password fields)
INFO - 2026-03-13 13:24:58 --> Registration created user_id=11726, email=abj@jnasecurity.com, username=ITQXtYUBjaPdXdiNZxTIyNc, active=, requiresActivation=1, loginIdentifier=username
INFO - 2026-03-13 13:24:58 --> [REGISTRATION] User record created
INFO - 2026-03-13 13:24:58 --> OnboardingProgressService: created onboarding record for user_id=11726
INFO - 2026-03-13 13:24:59 --> Registration succeeded for abj@jnasecurity.com (event abb9b26da65aae6b)
INFO - 2026-03-13 13:24:59 --> [REGISTRATION] Activation email queued
INFO - 2026-03-13 13:24:59 --> Registration redirecting to success guide for user_id=11726
DEBUG - 2026-03-13 13:24:59 --> [REQ_ID=04617e5d4e41] [FILTER_AFTER]
DEBUG - 2026-03-13 13:24:59 --> [REQ_ID=04617e5d4e41] [LIFECYCLE][END] status=303 duration_ms=1,212.11 memory_delta=0
INFO - 2026-03-13 13:24:59 --> [REQ_ID=fd79cc7fc914] [PERF] Execution time=1.211718
DEBUG - 2026-03-13 13:24:59 --> [REQ_ID=04617e5d4e41] [REQUEST][END]
INFO - 2026-03-13 13:24:59 --> [REQ_ID=04617e5d4e41] [PERF] Execution time=1.225383
DEBUG - 2026-03-13 13:24:59 --> [REQ_ID=029a23e9db58] [REQUEST][START] GET /index.php/register/success
DEBUG - 2026-03-13 13:24:59 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-13 13:24:59 --> [REQ_ID=029a23e9db58] [FILTER_BEFORE] /index.php/register/success
DEBUG - 2026-03-13 13:24:59 --> [REQ_ID=029a23e9db58] [ROUTE] Controller=\App\Controllers\AuthController Method=registerSuccess
DEBUG - 2026-03-13 13:24:59 --> [REQ_ID=029a23e9db58] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/register/success
DEBUG - 2026-03-13 13:24:59 --> [CSRF] token name=csrf_test_name hash=c3b68267f6fd5bd643fe34072528b375
DEBUG - 2026-03-13 13:24:59 --> [REQ_ID=a8826c770764] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-13 13:24:59 --> [REQ_ID=a8826c770764] [MEMORY][controller-start] 4194304
INFO - 2026-03-13 13:24:59 --> AuthController::registerSuccess view rendered.
INFO - 2026-03-13 13:24:59 --> [REQ_ID=a8826c770764] [PERF] Execution time=0.012823
DEBUG - 2026-03-13 13:25:13 --> [REQ_ID=790bea293e2d] [REQUEST][START] GET /index.php/Free/register
DEBUG - 2026-03-13 13:25:13 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-13 13:25:13 --> [REQ_ID=790bea293e2d] [FILTER_BEFORE] /index.php/Free/register
DEBUG - 2026-03-13 13:25:13 --> [REQ_ID=790bea293e2d] [ROUTE] Controller=\App\Controllers\AuthController Method=register
DEBUG - 2026-03-13 13:25:13 --> [REQ_ID=790bea293e2d] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Free/register
DEBUG - 2026-03-13 13:25:13 --> [CSRF] token name=csrf_test_name hash=c3b68267f6fd5bd643fe34072528b375
DEBUG - 2026-03-13 13:25:13 --> [REQ_ID=790bea293e2d] [REQUEST][END]
INFO - 2026-03-13 13:25:13 --> [REQ_ID=790bea293e2d] [PERF] Execution time=0.010279
DEBUG - 2026-03-13 13:25:13 --> [REQ_ID=ee6a67da722c] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-13 13:25:13 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-13 13:25:13 --> [REQ_ID=ee6a67da722c] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-13 13:25:13 --> [REQ_ID=ee6a67da722c] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-13 13:25:13 --> [REQ_ID=ee6a67da722c] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-13 13:25:13 --> [CSRF] token name=csrf_test_name hash=c3b68267f6fd5bd643fe34072528b375
DEBUG - 2026-03-13 13:25:13 --> [REQ_ID=7bfbc0926ef8] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-13 13:25:13 --> [REQ_ID=7bfbc0926ef8] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-13 13:25:13 --> [REQ_ID=ee6a67da722c] [FILTER_AFTER]
DEBUG - 2026-03-13 13:25:13 --> [REQ_ID=ee6a67da722c] [LIFECYCLE][END] status=200 duration_ms=34.36 memory_delta=0
INFO - 2026-03-13 13:25:13 --> [REQ_ID=7bfbc0926ef8] [PERF] Execution time=0.034142
DEBUG - 2026-03-13 13:25:13 --> [REQ_ID=ee6a67da722c] [REQUEST][END]
INFO - 2026-03-13 13:25:13 --> [REQ_ID=ee6a67da722c] [PERF] Execution time=0.043050
DEBUG - 2026-03-13 13:25:26 --> [REQ_ID=1a505acd9fa4] [REQUEST][START] POST /index.php/login
DEBUG - 2026-03-13 13:25:26 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-13 13:25:26 --> [REQ_ID=1a505acd9fa4] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-13 13:25:26 --> [REQ_ID=1a505acd9fa4] [ROUTE] Controller=\App\Controllers\AuthController Method=attemptLogin
DEBUG - 2026-03-13 13:25:26 --> [REQ_ID=1a505acd9fa4] [LIFECYCLE][START] POST https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-13 13:25:26 --> [CSRF] token name=csrf_test_name hash=c3b68267f6fd5bd643fe34072528b375
INFO - 2026-03-13 13:25:26 --> CSRF token verified.
DEBUG - 2026-03-13 13:25:26 --> [REQ_ID=40fc49ae229d] [INIT] App\Controllers\AuthController::POST
INFO - 2026-03-13 13:25:26 --> [REQ_ID=40fc49ae229d] [MEMORY][controller-start] 4194304
INFO - 2026-03-13 13:25:26 --> AuthController L93: Auth:attemptLogin started.
INFO - 2026-03-13 13:25:26 --> AuthController L104: Auth:attemptLogin rules: {"login":"required","password":"required"}
INFO - 2026-03-13 13:25:26 --> AuthController L132: Auth:attemptLogin Login Variables: login: required, remember: true, ip: 185.241.208.115, ua: "Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36"
DEBUG - 2026-03-13 13:25:26 --> Auth attemptLogin() called with login identifier: abj@jnasecurity.com, remember: true
DEBUG - 2026-03-13 13:25:26 --> Auth attemptLogin() called. redirect_url in session: https://www.mymiwallet.com/index.php/Free/register
DEBUG - 2026-03-13 13:25:26 --> Auth credentials normalised for attempt using key "email"
WARNING - 2026-03-13 13:25:27 --> [AUTH_FAILURE] 
DEBUG - 2026-03-13 13:25:27 --> Auth attempt failed for identifier abj@jnasecurity.com. Error: Unable to log you in. Please check your password.
WARNING - 2026-03-13 13:25:27 --> [AUTH] Login failure
WARNING - 2026-03-13 13:25:27 --> [AUTH] Login failed
DEBUG - 2026-03-13 13:25:27 --> [REQ_ID=1a505acd9fa4] [FILTER_AFTER]
DEBUG - 2026-03-13 13:25:27 --> [REQ_ID=1a505acd9fa4] [LIFECYCLE][END] status=303 duration_ms=201.65 memory_delta=0
INFO - 2026-03-13 13:25:27 --> [REQ_ID=40fc49ae229d] [PERF] Execution time=0.201324
DEBUG - 2026-03-13 13:25:27 --> [REQ_ID=1a505acd9fa4] [REQUEST][END]
INFO - 2026-03-13 13:25:27 --> [REQ_ID=1a505acd9fa4] [PERF] Execution time=0.210869
DEBUG - 2026-03-13 13:25:41 --> [REQ_ID=ec1630b8bf52] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-13 13:25:41 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-13 13:25:41 --> [REQ_ID=ec1630b8bf52] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-13 13:25:41 --> [REQ_ID=ec1630b8bf52] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-13 13:25:41 --> [REQ_ID=ec1630b8bf52] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-13 13:25:41 --> [CSRF] token name=csrf_test_name hash=c3b68267f6fd5bd643fe34072528b375
DEBUG - 2026-03-13 13:25:41 --> [REQ_ID=f976cf6d1d92] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-13 13:25:41 --> [REQ_ID=f976cf6d1d92] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-13 13:25:41 --> [REQ_ID=ec1630b8bf52] [FILTER_AFTER]
DEBUG - 2026-03-13 13:25:41 --> [REQ_ID=ec1630b8bf52] [LIFECYCLE][END] status=200 duration_ms=38.18 memory_delta=0
INFO - 2026-03-13 13:25:41 --> [REQ_ID=f976cf6d1d92] [PERF] Execution time=0.038055
DEBUG - 2026-03-13 13:25:41 --> [REQ_ID=ec1630b8bf52] [REQUEST][END]
INFO - 2026-03-13 13:25:41 --> [REQ_ID=ec1630b8bf52] [PERF] Execution time=0.048345
DEBUG - 2026-03-13 13:25:41 --> [REQ_ID=79d23878c969] [REQUEST][START] GET /index.php/How-It-Works/Registering-An-Account
DEBUG - 2026-03-13 13:25:41 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-13 13:25:41 --> [REQ_ID=79d23878c969] [FILTER_BEFORE] /index.php/How-It-Works/Registering-An-Account
DEBUG - 2026-03-13 13:25:41 --> [REQ_ID=79d23878c969] [ROUTE] Controller=\App\Modules\Blog\Controllers\HowItWorksController Method=show
DEBUG - 2026-03-13 13:25:41 --> [REQ_ID=79d23878c969] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/How-It-Works/Registering-An-Account
DEBUG - 2026-03-13 13:25:41 --> [CSRF] token name=csrf_test_name hash=c3b68267f6fd5bd643fe34072528b375
DEBUG - 2026-03-13 13:25:41 --> [REQ_ID=f07a7b93ce59] [INIT] App\Modules\Blog\Controllers\HowItWorksController::GET
INFO - 2026-03-13 13:25:41 --> [REQ_ID=f07a7b93ce59] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-13 13:25:41 --> [REQ_ID=f07a7b93ce59] [METHOD_ENTRY] show
DEBUG - 2026-03-13 13:25:41 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-13 13:25:41 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-13 13:25:41 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-13 13:25:41 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-13 13:25:41 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-13 13:25:41 --> MyMICoin: guest context detected; skipping user-specific preload.
ERROR - 2026-03-13 13:25:41 --> HowItWorksController failure: Call to undefined method App\Modules\Blog\Controllers\HowItWorksController::respondWithRendered()
INFO - 2026-03-13 13:25:41 --> [REQ_ID=f07a7b93ce59] [PERF] Execution time=0.059417
DEBUG - 2026-03-13 13:25:46 --> [REQ_ID=bc4c27b89711] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-13 13:25:46 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-13 13:25:46 --> [REQ_ID=bc4c27b89711] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-13 13:25:46 --> [REQ_ID=bc4c27b89711] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-13 13:25:46 --> [REQ_ID=bc4c27b89711] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-13 13:25:46 --> [CSRF] token name=csrf_test_name hash=c3b68267f6fd5bd643fe34072528b375
DEBUG - 2026-03-13 13:25:46 --> [REQ_ID=094bf603893b] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-13 13:25:46 --> [REQ_ID=094bf603893b] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-13 13:25:46 --> [REQ_ID=bc4c27b89711] [FILTER_AFTER]
DEBUG - 2026-03-13 13:25:46 --> [REQ_ID=bc4c27b89711] [LIFECYCLE][END] status=200 duration_ms=25.17 memory_delta=0
INFO - 2026-03-13 13:25:46 --> [REQ_ID=094bf603893b] [PERF] Execution time=0.025111
DEBUG - 2026-03-13 13:25:46 --> [REQ_ID=bc4c27b89711] [REQUEST][END]
INFO - 2026-03-13 13:25:46 --> [REQ_ID=bc4c27b89711] [PERF] Execution time=0.035509
DEBUG - 2026-03-13 13:25:51 --> [REQ_ID=1e5973a8d1d7] [REQUEST][START] GET /index.php/How-It-Works/Investor-Profile
DEBUG - 2026-03-13 13:25:51 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-13 13:25:51 --> [REQ_ID=1e5973a8d1d7] [FILTER_BEFORE] /index.php/How-It-Works/Investor-Profile
DEBUG - 2026-03-13 13:25:51 --> [REQ_ID=1e5973a8d1d7] [ROUTE] Controller=\App\Modules\Blog\Controllers\HowItWorksController Method=show
DEBUG - 2026-03-13 13:25:51 --> [REQ_ID=1e5973a8d1d7] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/How-It-Works/Investor-Profile
DEBUG - 2026-03-13 13:25:51 --> [CSRF] token name=csrf_test_name hash=c3b68267f6fd5bd643fe34072528b375
DEBUG - 2026-03-13 13:25:51 --> [REQ_ID=a3b34adc20b7] [INIT] App\Modules\Blog\Controllers\HowItWorksController::GET
INFO - 2026-03-13 13:25:51 --> [REQ_ID=a3b34adc20b7] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-13 13:25:51 --> [REQ_ID=a3b34adc20b7] [METHOD_ENTRY] show
DEBUG - 2026-03-13 13:25:51 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-13 13:25:51 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-13 13:25:51 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-13 13:25:51 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-13 13:25:51 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-13 13:25:51 --> MyMICoin: guest context detected; skipping user-specific preload.
ERROR - 2026-03-13 13:25:51 --> HowItWorksController failure: investor-profile
CRITICAL - 2026-03-13 13:25:51 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: GET, Route: How-It-Works/Investor-Profile]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-13 13:25:51 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-13 13:25:51 --> [404] URI=https://www.mymiwallet.com/index.php/How-It-Works/Investor-Profile
WARNING - 2026-03-13 13:25:51 --> 404 route miss: https://www.mymiwallet.com/index.php/How-It-Works/Investor-Profile | referrer: none
ERROR - 2026-03-13 13:25:51 --> [ERROR_PAGE] event=error_404 status=404 message=Page not found.
INFO - 2026-03-13 13:25:51 --> [REQ_ID=a3b34adc20b7] [PERF] Execution time=0.043193
DEBUG - 2026-03-13 13:25:57 --> [REQ_ID=c039964c76aa] [REQUEST][START] GET /index.php/forgot
DEBUG - 2026-03-13 13:25:57 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-13 13:25:57 --> [REQ_ID=c039964c76aa] [FILTER_BEFORE] /index.php/forgot
DEBUG - 2026-03-13 13:25:57 --> [REQ_ID=c039964c76aa] [ROUTE] Controller=\Myth\Auth\Controllers\AuthController Method=forgotPassword
DEBUG - 2026-03-13 13:25:57 --> [REQ_ID=c039964c76aa] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/forgot
DEBUG - 2026-03-13 13:25:57 --> [CSRF] token name=csrf_test_name hash=c3b68267f6fd5bd643fe34072528b375
DEBUG - 2026-03-13 13:25:57 --> [REQ_ID=c039964c76aa] [FILTER_AFTER]
DEBUG - 2026-03-13 13:25:57 --> [REQ_ID=c039964c76aa] [LIFECYCLE][END] status=200 duration_ms=3.14 memory_delta=0
DEBUG - 2026-03-13 13:25:57 --> [REQ_ID=c039964c76aa] [REQUEST][END]
INFO - 2026-03-13 13:25:57 --> [REQ_ID=c039964c76aa] [PERF] Execution time=0.014666
DEBUG - 2026-03-13 13:25:57 --> [REQ_ID=5ec4890daef8] [REQUEST][START] GET /index.php/Support
DEBUG - 2026-03-13 13:25:57 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-13 13:25:57 --> [REQ_ID=5ec4890daef8] [FILTER_BEFORE] /index.php/Support
DEBUG - 2026-03-13 13:25:57 --> [REQ_ID=5ec4890daef8] [ROUTE] Controller=\App\Modules\Support\Controllers\SupportController Method=index
DEBUG - 2026-03-13 13:25:57 --> [REQ_ID=5ec4890daef8] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Support
DEBUG - 2026-03-13 13:25:57 --> [CSRF] token name=csrf_test_name hash=c3b68267f6fd5bd643fe34072528b375
DEBUG - 2026-03-13 13:25:57 --> [REQ_ID=c66be633ff09] [INIT] App\Modules\Support\Controllers\SupportController::GET
INFO - 2026-03-13 13:25:57 --> [REQ_ID=c66be633ff09] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-13 13:25:57 --> [REQ_ID=c66be633ff09] [METHOD_ENTRY] index
DEBUG - 2026-03-13 13:25:57 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-13 13:25:57 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-13 13:25:57 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-13 13:25:57 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-13 13:25:57 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-13 13:25:57 --> MyMICoin: guest context detected; skipping user-specific preload.
INFO - 2026-03-13 13:25:57 --> [REQ_ID=c66be633ff09] [MEMORY][commonData:start] 4194304
DEBUG - 2026-03-13 13:25:57 --> [REQ_ID=c66be633ff09] [VIEW_RENDER] SupportModule\Views\Support\index
INFO - 2026-03-13 13:25:57 --> [REQ_ID=c66be633ff09] [MEMORY][commonData:start] 4194304
INFO - 2026-03-13 13:25:58 --> themesMemory usage: 4194304
DEBUG - 2026-03-13 13:25:58 --> [REQ_ID=5ec4890daef8] [FILTER_AFTER]
DEBUG - 2026-03-13 13:25:58 --> [REQ_ID=5ec4890daef8] [LIFECYCLE][END] status=200 duration_ms=32.52 memory_delta=0
INFO - 2026-03-13 13:25:58 --> [REQ_ID=c66be633ff09] [PERF] Execution time=0.032307
DEBUG - 2026-03-13 13:25:58 --> [REQ_ID=5ec4890daef8] [REQUEST][END]
INFO - 2026-03-13 13:25:58 --> [REQ_ID=5ec4890daef8] [PERF] Execution time=0.043927
DEBUG - 2026-03-13 13:26:21 --> [REQ_ID=4ae90e0c2312] [REQUEST][START] GET /index.php/Support/Account
DEBUG - 2026-03-13 13:26:21 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-13 13:26:21 --> [REQ_ID=4ae90e0c2312] [FILTER_BEFORE] /index.php/Support/Account
DEBUG - 2026-03-13 13:26:21 --> [REQ_ID=4ae90e0c2312] [ROUTE] Controller=\App\Modules\Support\Controllers\AccountSupportController Method=index
DEBUG - 2026-03-13 13:26:21 --> [REQ_ID=4ae90e0c2312] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Support/Account
DEBUG - 2026-03-13 13:26:21 --> [CSRF] token name=csrf_test_name hash=c3b68267f6fd5bd643fe34072528b375
DEBUG - 2026-03-13 13:26:21 --> [REQ_ID=a504bfce4c10] [INIT] App\Modules\Support\Controllers\AccountSupportController::GET
INFO - 2026-03-13 13:26:21 --> [REQ_ID=a504bfce4c10] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-13 13:26:21 --> [REQ_ID=a504bfce4c10] [METHOD_ENTRY] index
DEBUG - 2026-03-13 13:26:21 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-13 13:26:21 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-13 13:26:21 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-13 13:26:21 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-13 13:26:21 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-13 13:26:21 --> MyMICoin: guest context detected; skipping user-specific preload.
INFO - 2026-03-13 13:26:21 --> [REQ_ID=a504bfce4c10] [MEMORY][commonData:start] 4194304
DEBUG - 2026-03-13 13:26:21 --> [REQ_ID=a504bfce4c10] [VIEW_RENDER] SupportModule/Support/account_help
INFO - 2026-03-13 13:26:21 --> [REQ_ID=a504bfce4c10] [MEMORY][commonData:start] 4194304
INFO - 2026-03-13 13:26:21 --> themesMemory usage: 4194304
DEBUG - 2026-03-13 13:26:21 --> [REQ_ID=4ae90e0c2312] [FILTER_AFTER]
DEBUG - 2026-03-13 13:26:21 --> [REQ_ID=4ae90e0c2312] [LIFECYCLE][END] status=200 duration_ms=58.13 memory_delta=0
INFO - 2026-03-13 13:26:21 --> [REQ_ID=a504bfce4c10] [PERF] Execution time=0.057880
DEBUG - 2026-03-13 13:26:21 --> [REQ_ID=4ae90e0c2312] [REQUEST][END]
INFO - 2026-03-13 13:26:21 --> [REQ_ID=4ae90e0c2312] [PERF] Execution time=0.067965
DEBUG - 2026-03-13 13:26:22 --> [REQ_ID=ae4e1476c226] [REQUEST][START] HEAD /
DEBUG - 2026-03-13 13:26:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-13 13:26:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-13 13:26:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-13 13:26:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-13 13:26:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-13 13:26:28 --> [REQ_ID=8e9664f1724b] [REQUEST][START] POST /index.php/Support/resendActivation
DEBUG - 2026-03-13 13:26:28 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-13 13:26:28 --> [REQ_ID=8e9664f1724b] [FILTER_BEFORE] /index.php/Support/resendActivation
DEBUG - 2026-03-13 13:26:28 --> [REQ_ID=8e9664f1724b] [ROUTE] Controller=\App\Modules\Support\Controllers\AccountSupportController Method=resendActivation
DEBUG - 2026-03-13 13:26:28 --> [REQ_ID=8e9664f1724b] [LIFECYCLE][START] POST https://www.mymiwallet.com/index.php/Support/resendActivation
DEBUG - 2026-03-13 13:26:28 --> [CSRF] token name=csrf_test_name hash=c3b68267f6fd5bd643fe34072528b375
INFO - 2026-03-13 13:26:28 --> CSRF token verified.
DEBUG - 2026-03-13 13:26:28 --> [REQ_ID=244c7baafa7f] [INIT] App\Modules\Support\Controllers\AccountSupportController::POST
INFO - 2026-03-13 13:26:28 --> [REQ_ID=244c7baafa7f] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-13 13:26:28 --> [REQ_ID=244c7baafa7f] [METHOD_ENTRY] resendActivation
DEBUG - 2026-03-13 13:26:28 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-13 13:26:28 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-13 13:26:28 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-13 13:26:28 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-13 13:26:28 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-13 13:26:28 --> MyMICoin: guest context detected; skipping user-specific preload.
INFO - 2026-03-13 13:26:28 --> [SUPPORT] Account help requested
INFO - 2026-03-13 13:26:30 --> [SUPPORT] Account help outcome
DEBUG - 2026-03-13 13:26:30 --> [REQ_ID=8e9664f1724b] [FILTER_AFTER]
DEBUG - 2026-03-13 13:26:30 --> [REQ_ID=8e9664f1724b] [LIFECYCLE][END] status=303 duration_ms=1,681.95 memory_delta=0
INFO - 2026-03-13 13:26:30 --> [REQ_ID=244c7baafa7f] [PERF] Execution time=1.681776
DEBUG - 2026-03-13 13:26:30 --> [REQ_ID=8e9664f1724b] [REQUEST][END]
INFO - 2026-03-13 13:26:30 --> [REQ_ID=8e9664f1724b] [PERF] Execution time=1.693250
DEBUG - 2026-03-13 13:26:31 --> [REQ_ID=ec7b4235b03a] [REQUEST][START] GET /index.php/Support/Account
DEBUG - 2026-03-13 13:26:31 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-13 13:26:31 --> [REQ_ID=ec7b4235b03a] [FILTER_BEFORE] /index.php/Support/Account
DEBUG - 2026-03-13 13:26:31 --> [REQ_ID=ec7b4235b03a] [ROUTE] Controller=\App\Modules\Support\Controllers\AccountSupportController Method=index
DEBUG - 2026-03-13 13:26:31 --> [REQ_ID=ec7b4235b03a] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Support/Account
DEBUG - 2026-03-13 13:26:31 --> [CSRF] token name=csrf_test_name hash=c3b68267f6fd5bd643fe34072528b375
DEBUG - 2026-03-13 13:26:31 --> [REQ_ID=0b3c2215c417] [INIT] App\Modules\Support\Controllers\AccountSupportController::GET
INFO - 2026-03-13 13:26:31 --> [REQ_ID=0b3c2215c417] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-13 13:26:31 --> [REQ_ID=0b3c2215c417] [METHOD_ENTRY] index
DEBUG - 2026-03-13 13:26:31 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-13 13:26:31 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-13 13:26:31 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-13 13:26:31 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-13 13:26:31 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-13 13:26:31 --> MyMICoin: guest context detected; skipping user-specific preload.
INFO - 2026-03-13 13:26:31 --> [REQ_ID=0b3c2215c417] [MEMORY][commonData:start] 4194304
DEBUG - 2026-03-13 13:26:31 --> [REQ_ID=0b3c2215c417] [VIEW_RENDER] SupportModule/Support/account_help
INFO - 2026-03-13 13:26:31 --> [REQ_ID=0b3c2215c417] [MEMORY][commonData:start] 4194304
INFO - 2026-03-13 13:26:31 --> themesMemory usage: 4194304
DEBUG - 2026-03-13 13:26:31 --> [REQ_ID=ec7b4235b03a] [FILTER_AFTER]
DEBUG - 2026-03-13 13:26:31 --> [REQ_ID=ec7b4235b03a] [LIFECYCLE][END] status=200 duration_ms=46.15 memory_delta=0
INFO - 2026-03-13 13:26:31 --> [REQ_ID=0b3c2215c417] [PERF] Execution time=0.045834
DEBUG - 2026-03-13 13:26:31 --> [REQ_ID=ec7b4235b03a] [REQUEST][END]
INFO - 2026-03-13 13:26:31 --> [REQ_ID=ec7b4235b03a] [PERF] Execution time=0.056899
DEBUG - 2026-03-13 13:26:46 --> [REQ_ID=edec7338ef8b] [REQUEST][START] GET /index.php/register
DEBUG - 2026-03-13 13:26:46 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-13 13:26:46 --> [REQ_ID=edec7338ef8b] [FILTER_BEFORE] /index.php/register
DEBUG - 2026-03-13 13:26:46 --> [REQ_ID=edec7338ef8b] [ROUTE] Controller=\App\Controllers\AuthController Method=register
DEBUG - 2026-03-13 13:26:46 --> [REQ_ID=edec7338ef8b] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/register
DEBUG - 2026-03-13 13:26:46 --> [CSRF] token name=csrf_test_name hash=c3b68267f6fd5bd643fe34072528b375
DEBUG - 2026-03-13 13:26:46 --> [REQ_ID=aa3f10f12e45] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-13 13:26:46 --> [REQ_ID=aa3f10f12e45] [MEMORY][controller-start] 4194304
INFO - 2026-03-13 13:26:46 --> [REGISTRATION] Form loaded
INFO - 2026-03-13 13:26:46 --> [REQ_ID=aa3f10f12e45] [PERF] Execution time=0.190963
DEBUG - 2026-03-13 13:26:51 --> [REQ_ID=15fa06309156] [REQUEST][START] GET /index.php/Account
DEBUG - 2026-03-13 13:26:51 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-13 13:26:51 --> [REQ_ID=15fa06309156] [FILTER_BEFORE] /index.php/Account
DEBUG - 2026-03-13 13:26:51 --> [REQ_ID=15fa06309156] [ROUTE] Controller=\App\Modules\User\Controllers\DashboardController Method=account
DEBUG - 2026-03-13 13:26:51 --> [REQ_ID=15fa06309156] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Account
DEBUG - 2026-03-13 13:26:51 --> [CSRF] token name=csrf_test_name hash=c3b68267f6fd5bd643fe34072528b375
DEBUG - 2026-03-13 13:26:51 --> [REQ_ID=15fa06309156] [REQUEST][END]
INFO - 2026-03-13 13:26:51 --> [REQ_ID=15fa06309156] [PERF] Execution time=0.013411
DEBUG - 2026-03-13 13:26:51 --> [REQ_ID=b46597006b5f] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-13 13:26:51 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-13 13:26:51 --> [REQ_ID=b46597006b5f] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-13 13:26:51 --> [REQ_ID=b46597006b5f] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-13 13:26:51 --> [REQ_ID=b46597006b5f] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-13 13:26:51 --> [CSRF] token name=csrf_test_name hash=c3b68267f6fd5bd643fe34072528b375
DEBUG - 2026-03-13 13:26:51 --> [REQ_ID=0fbdd59f91e5] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-13 13:26:51 --> [REQ_ID=0fbdd59f91e5] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-13 13:26:51 --> [REQ_ID=b46597006b5f] [FILTER_AFTER]
DEBUG - 2026-03-13 13:26:51 --> [REQ_ID=b46597006b5f] [LIFECYCLE][END] status=200 duration_ms=18.13 memory_delta=0
INFO - 2026-03-13 13:26:51 --> [REQ_ID=0fbdd59f91e5] [PERF] Execution time=0.018050
DEBUG - 2026-03-13 13:26:51 --> [REQ_ID=b46597006b5f] [REQUEST][END]
INFO - 2026-03-13 13:26:51 --> [REQ_ID=b46597006b5f] [PERF] Execution time=0.026841
DEBUG - 2026-03-13 13:26:59 --> [REQ_ID=fd88995786dc] [REQUEST][START] GET /index.php/Account/Connected-Accounts
DEBUG - 2026-03-13 13:26:59 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-13 13:26:59 --> [REQ_ID=fd88995786dc] [FILTER_BEFORE] /index.php/Account/Connected-Accounts
DEBUG - 2026-03-13 13:26:59 --> [REQ_ID=fd88995786dc] [ROUTE] Controller=\App\Modules\User\Controllers\DashboardController Method=connectedAccounts
DEBUG - 2026-03-13 13:26:59 --> [REQ_ID=fd88995786dc] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Account/Connected-Accounts
DEBUG - 2026-03-13 13:26:59 --> [CSRF] token name=csrf_test_name hash=c3b68267f6fd5bd643fe34072528b375
DEBUG - 2026-03-13 13:26:59 --> [REQ_ID=fd88995786dc] [REQUEST][END]
INFO - 2026-03-13 13:26:59 --> [REQ_ID=fd88995786dc] [PERF] Execution time=0.010200
DEBUG - 2026-03-13 13:26:59 --> [REQ_ID=b152c7af6fbd] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-13 13:26:59 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-13 13:26:59 --> [REQ_ID=b152c7af6fbd] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-13 13:26:59 --> [REQ_ID=b152c7af6fbd] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-13 13:26:59 --> [REQ_ID=b152c7af6fbd] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-13 13:26:59 --> [CSRF] token name=csrf_test_name hash=c3b68267f6fd5bd643fe34072528b375
DEBUG - 2026-03-13 13:26:59 --> [REQ_ID=fb683461d82f] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-13 13:26:59 --> [REQ_ID=fb683461d82f] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-13 13:26:59 --> [REQ_ID=b152c7af6fbd] [FILTER_AFTER]
DEBUG - 2026-03-13 13:26:59 --> [REQ_ID=b152c7af6fbd] [LIFECYCLE][END] status=200 duration_ms=33.55 memory_delta=0
INFO - 2026-03-13 13:26:59 --> [REQ_ID=fb683461d82f] [PERF] Execution time=0.033563
DEBUG - 2026-03-13 13:26:59 --> [REQ_ID=b152c7af6fbd] [REQUEST][END]
INFO - 2026-03-13 13:26:59 --> [REQ_ID=b152c7af6fbd] [PERF] Execution time=0.042961
DEBUG - 2026-03-13 13:27:11 --> [REQ_ID=1ca81e2cb036] [REQUEST][START] GET /index.php/Account/Social-Media
DEBUG - 2026-03-13 13:27:11 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-13 13:27:11 --> [REQ_ID=1ca81e2cb036] [FILTER_BEFORE] /index.php/Account/Social-Media
DEBUG - 2026-03-13 13:27:11 --> [REQ_ID=1ca81e2cb036] [ROUTE] Controller=\App\Modules\User\Controllers\DashboardController Method=SocialMedia
DEBUG - 2026-03-13 13:27:11 --> [REQ_ID=1ca81e2cb036] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Account/Social-Media
DEBUG - 2026-03-13 13:27:11 --> [CSRF] token name=csrf_test_name hash=c3b68267f6fd5bd643fe34072528b375
DEBUG - 2026-03-13 13:27:11 --> [REQ_ID=1ca81e2cb036] [REQUEST][END]
INFO - 2026-03-13 13:27:11 --> [REQ_ID=1ca81e2cb036] [PERF] Execution time=0.010098
DEBUG - 2026-03-13 13:27:12 --> [REQ_ID=4ba67827ab55] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-13 13:27:12 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-13 13:27:12 --> [REQ_ID=4ba67827ab55] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-13 13:27:12 --> [REQ_ID=4ba67827ab55] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-13 13:27:12 --> [REQ_ID=4ba67827ab55] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-13 13:27:12 --> [CSRF] token name=csrf_test_name hash=c3b68267f6fd5bd643fe34072528b375
DEBUG - 2026-03-13 13:27:12 --> [REQ_ID=c8c067e17e66] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-13 13:27:12 --> [REQ_ID=c8c067e17e66] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-13 13:27:12 --> [REQ_ID=4ba67827ab55] [FILTER_AFTER]
DEBUG - 2026-03-13 13:27:12 --> [REQ_ID=4ba67827ab55] [LIFECYCLE][END] status=200 duration_ms=35.19 memory_delta=0
INFO - 2026-03-13 13:27:12 --> [REQ_ID=c8c067e17e66] [PERF] Execution time=0.035068
DEBUG - 2026-03-13 13:27:12 --> [REQ_ID=4ba67827ab55] [REQUEST][END]
INFO - 2026-03-13 13:27:12 --> [REQ_ID=4ba67827ab55] [PERF] Execution time=0.043796
DEBUG - 2026-03-13 13:27:19 --> [REQ_ID=dcf6687421af] [REQUEST][START] GET /index.php/Account/Activity
DEBUG - 2026-03-13 13:27:19 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-13 13:27:19 --> [REQ_ID=dcf6687421af] [FILTER_BEFORE] /index.php/Account/Activity
DEBUG - 2026-03-13 13:27:19 --> [REQ_ID=dcf6687421af] [ROUTE] Controller=\App\Modules\User\Controllers\DashboardController Method=activity
DEBUG - 2026-03-13 13:27:19 --> [REQ_ID=dcf6687421af] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Account/Activity
DEBUG - 2026-03-13 13:27:19 --> [CSRF] token name=csrf_test_name hash=c3b68267f6fd5bd643fe34072528b375
DEBUG - 2026-03-13 13:27:19 --> [REQ_ID=dcf6687421af] [REQUEST][END]
INFO - 2026-03-13 13:27:19 --> [REQ_ID=dcf6687421af] [PERF] Execution time=0.010484
DEBUG - 2026-03-13 13:27:20 --> [REQ_ID=5e1505c9e98c] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-13 13:27:20 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-13 13:27:20 --> [REQ_ID=5e1505c9e98c] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-13 13:27:20 --> [REQ_ID=5e1505c9e98c] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-13 13:27:20 --> [REQ_ID=5e1505c9e98c] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-13 13:27:20 --> [CSRF] token name=csrf_test_name hash=c3b68267f6fd5bd643fe34072528b375
DEBUG - 2026-03-13 13:27:20 --> [REQ_ID=ead886cdd566] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-13 13:27:20 --> [REQ_ID=ead886cdd566] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-13 13:27:20 --> [REQ_ID=5e1505c9e98c] [FILTER_AFTER]
DEBUG - 2026-03-13 13:27:20 --> [REQ_ID=5e1505c9e98c] [LIFECYCLE][END] status=200 duration_ms=35.16 memory_delta=0
INFO - 2026-03-13 13:27:20 --> [REQ_ID=ead886cdd566] [PERF] Execution time=0.035111
DEBUG - 2026-03-13 13:27:20 --> [REQ_ID=5e1505c9e98c] [REQUEST][END]
INFO - 2026-03-13 13:27:20 --> [REQ_ID=5e1505c9e98c] [PERF] Execution time=0.043996
DEBUG - 2026-03-13 13:27:31 --> [REQ_ID=3242c42e0d9f] [REQUEST][START] GET /index.php/Investments/News
DEBUG - 2026-03-13 13:27:31 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-13 13:27:31 --> [REQ_ID=3242c42e0d9f] [FILTER_BEFORE] /index.php/Investments/News
DEBUG - 2026-03-13 13:27:31 --> [REQ_ID=3242c42e0d9f] [ROUTE] Controller=closure_route Method=index
DEBUG - 2026-03-13 13:27:31 --> [REQ_ID=3242c42e0d9f] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Investments/News
DEBUG - 2026-03-13 13:27:31 --> [CSRF] token name=csrf_test_name hash=c3b68267f6fd5bd643fe34072528b375
DEBUG - 2026-03-13 13:27:31 --> [REQ_ID=3242c42e0d9f] [REQUEST][END]
INFO - 2026-03-13 13:27:31 --> [REQ_ID=3242c42e0d9f] [PERF] Execution time=0.009808
DEBUG - 2026-03-13 13:27:32 --> [REQ_ID=512ef3539c0b] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-13 13:27:32 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-13 13:27:32 --> [REQ_ID=512ef3539c0b] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-13 13:27:32 --> [REQ_ID=512ef3539c0b] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-13 13:27:32 --> [REQ_ID=512ef3539c0b] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-13 13:27:32 --> [CSRF] token name=csrf_test_name hash=c3b68267f6fd5bd643fe34072528b375
DEBUG - 2026-03-13 13:27:32 --> [REQ_ID=4d90625f93af] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-13 13:27:32 --> [REQ_ID=4d90625f93af] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-13 13:27:32 --> [REQ_ID=512ef3539c0b] [FILTER_AFTER]
DEBUG - 2026-03-13 13:27:32 --> [REQ_ID=512ef3539c0b] [LIFECYCLE][END] status=200 duration_ms=89.85 memory_delta=0
INFO - 2026-03-13 13:27:32 --> [REQ_ID=4d90625f93af] [PERF] Execution time=0.089861
DEBUG - 2026-03-13 13:27:32 --> [REQ_ID=512ef3539c0b] [REQUEST][END]
INFO - 2026-03-13 13:27:32 --> [REQ_ID=512ef3539c0b] [PERF] Execution time=0.098900
DEBUG - 2026-03-13 13:27:42 --> [REQ_ID=6f47eb7abd87] [REQUEST][START] GET /index.php/logout
DEBUG - 2026-03-13 13:27:42 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-13 13:27:42 --> [REQ_ID=6f47eb7abd87] [FILTER_BEFORE] /index.php/logout
DEBUG - 2026-03-13 13:27:42 --> [REQ_ID=6f47eb7abd87] [ROUTE] Controller=\App\Controllers\AuthController Method=logout
DEBUG - 2026-03-13 13:27:42 --> [REQ_ID=6f47eb7abd87] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/logout
DEBUG - 2026-03-13 13:27:42 --> [CSRF] token name=csrf_test_name hash=c3b68267f6fd5bd643fe34072528b375
DEBUG - 2026-03-13 13:27:42 --> [REQ_ID=6f47eb7abd87] [REQUEST][END]
INFO - 2026-03-13 13:27:42 --> [REQ_ID=6f47eb7abd87] [PERF] Execution time=0.010047
DEBUG - 2026-03-13 13:27:43 --> [REQ_ID=59f022ac4a6c] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-13 13:27:43 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-13 13:27:43 --> [REQ_ID=59f022ac4a6c] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-13 13:27:43 --> [REQ_ID=59f022ac4a6c] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-13 13:27:43 --> [REQ_ID=59f022ac4a6c] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-13 13:27:43 --> [CSRF] token name=csrf_test_name hash=c3b68267f6fd5bd643fe34072528b375
DEBUG - 2026-03-13 13:27:43 --> [REQ_ID=33820eb5e805] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-13 13:27:43 --> [REQ_ID=33820eb5e805] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-13 13:27:43 --> [REQ_ID=59f022ac4a6c] [FILTER_AFTER]
DEBUG - 2026-03-13 13:27:43 --> [REQ_ID=59f022ac4a6c] [LIFECYCLE][END] status=200 duration_ms=97.28 memory_delta=0
INFO - 2026-03-13 13:27:43 --> [REQ_ID=33820eb5e805] [PERF] Execution time=0.097178
DEBUG - 2026-03-13 13:27:43 --> [REQ_ID=59f022ac4a6c] [REQUEST][END]
INFO - 2026-03-13 13:27:43 --> [REQ_ID=59f022ac4a6c] [PERF] Execution time=0.106590
DEBUG - 2026-03-13 13:27:53 --> [REQ_ID=9365ec098ddb] [REQUEST][START] GET /index.php/Management/Users
DEBUG - 2026-03-13 13:27:53 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-13 13:27:53 --> [REQ_ID=9365ec098ddb] [FILTER_BEFORE] /index.php/Management/Users
DEBUG - 2026-03-13 13:27:53 --> [REQ_ID=9365ec098ddb] [ROUTE] Controller=\App\Modules\Management\Controllers\UsersController Method=index
DEBUG - 2026-03-13 13:27:53 --> [REQ_ID=9365ec098ddb] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Management/Users
DEBUG - 2026-03-13 13:27:53 --> [CSRF] token name=csrf_test_name hash=c3b68267f6fd5bd643fe34072528b375
DEBUG - 2026-03-13 13:27:53 --> [REQ_ID=9365ec098ddb] [REQUEST][END]
INFO - 2026-03-13 13:27:53 --> [REQ_ID=9365ec098ddb] [PERF] Execution time=0.009994
DEBUG - 2026-03-13 13:27:53 --> [REQ_ID=beaa753b98a0] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-13 13:27:53 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-13 13:27:53 --> [REQ_ID=beaa753b98a0] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-13 13:27:53 --> [REQ_ID=beaa753b98a0] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-13 13:27:53 --> [REQ_ID=beaa753b98a0] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-13 13:27:53 --> [CSRF] token name=csrf_test_name hash=c3b68267f6fd5bd643fe34072528b375
DEBUG - 2026-03-13 13:27:53 --> [REQ_ID=22718fd2282f] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-13 13:27:53 --> [REQ_ID=22718fd2282f] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-13 13:27:53 --> [REQ_ID=beaa753b98a0] [FILTER_AFTER]
DEBUG - 2026-03-13 13:27:53 --> [REQ_ID=beaa753b98a0] [LIFECYCLE][END] status=200 duration_ms=35.36 memory_delta=0
INFO - 2026-03-13 13:27:53 --> [REQ_ID=22718fd2282f] [PERF] Execution time=0.035259
DEBUG - 2026-03-13 13:27:53 --> [REQ_ID=beaa753b98a0] [REQUEST][END]
INFO - 2026-03-13 13:27:53 --> [REQ_ID=beaa753b98a0] [PERF] Execution time=0.044709
DEBUG - 2026-03-13 13:28:05 --> [REQ_ID=7f1faa399ac0] [REQUEST][START] GET /index.php/Account/Security
DEBUG - 2026-03-13 13:28:05 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-13 13:28:05 --> [REQ_ID=7f1faa399ac0] [FILTER_BEFORE] /index.php/Account/Security
DEBUG - 2026-03-13 13:28:05 --> [REQ_ID=7f1faa399ac0] [ROUTE] Controller=\App\Modules\User\Controllers\DashboardController Method=Security
DEBUG - 2026-03-13 13:28:05 --> [REQ_ID=7f1faa399ac0] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Account/Security
DEBUG - 2026-03-13 13:28:05 --> [CSRF] token name=csrf_test_name hash=c3b68267f6fd5bd643fe34072528b375
DEBUG - 2026-03-13 13:28:05 --> [REQ_ID=7f1faa399ac0] [REQUEST][END]
INFO - 2026-03-13 13:28:05 --> [REQ_ID=7f1faa399ac0] [PERF] Execution time=0.010010
DEBUG - 2026-03-13 13:28:05 --> [REQ_ID=f678c80e6ea4] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-13 13:28:05 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-13 13:28:05 --> [REQ_ID=f678c80e6ea4] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-13 13:28:05 --> [REQ_ID=f678c80e6ea4] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-13 13:28:05 --> [REQ_ID=f678c80e6ea4] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-13 13:28:05 --> [CSRF] token name=csrf_test_name hash=c3b68267f6fd5bd643fe34072528b375
DEBUG - 2026-03-13 13:28:05 --> [REQ_ID=edd06bb4a8d0] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-13 13:28:05 --> [REQ_ID=edd06bb4a8d0] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-13 13:28:05 --> [REQ_ID=f678c80e6ea4] [FILTER_AFTER]
DEBUG - 2026-03-13 13:28:05 --> [REQ_ID=f678c80e6ea4] [LIFECYCLE][END] status=200 duration_ms=33.04 memory_delta=0
INFO - 2026-03-13 13:28:05 --> [REQ_ID=edd06bb4a8d0] [PERF] Execution time=0.033085
DEBUG - 2026-03-13 13:28:05 --> [REQ_ID=f678c80e6ea4] [REQUEST][END]
INFO - 2026-03-13 13:28:05 --> [REQ_ID=f678c80e6ea4] [PERF] Execution time=0.042493
DEBUG - 2026-03-13 13:28:16 --> [REQ_ID=3874d9557ba6] [REQUEST][START] GET /index.php/Account/Billing
DEBUG - 2026-03-13 13:28:16 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-13 13:28:16 --> [REQ_ID=3874d9557ba6] [FILTER_BEFORE] /index.php/Account/Billing
DEBUG - 2026-03-13 13:28:16 --> [REQ_ID=3874d9557ba6] [ROUTE] Controller=\App\Modules\User\Controllers\DashboardController Method=billing
DEBUG - 2026-03-13 13:28:16 --> [REQ_ID=3874d9557ba6] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Account/Billing
DEBUG - 2026-03-13 13:28:16 --> [CSRF] token name=csrf_test_name hash=c3b68267f6fd5bd643fe34072528b375
DEBUG - 2026-03-13 13:28:16 --> [REQ_ID=3874d9557ba6] [REQUEST][END]
INFO - 2026-03-13 13:28:16 --> [REQ_ID=3874d9557ba6] [PERF] Execution time=0.009818
DEBUG - 2026-03-13 13:28:16 --> [REQ_ID=d431669726a9] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-13 13:28:16 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-13 13:28:16 --> [REQ_ID=d431669726a9] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-13 13:28:16 --> [REQ_ID=d431669726a9] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-13 13:28:16 --> [REQ_ID=d431669726a9] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-13 13:28:16 --> [CSRF] token name=csrf_test_name hash=c3b68267f6fd5bd643fe34072528b375
DEBUG - 2026-03-13 13:28:16 --> [REQ_ID=0dd32fd52be9] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-13 13:28:16 --> [REQ_ID=0dd32fd52be9] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-13 13:28:16 --> [REQ_ID=d431669726a9] [FILTER_AFTER]
DEBUG - 2026-03-13 13:28:16 --> [REQ_ID=d431669726a9] [LIFECYCLE][END] status=200 duration_ms=42.08 memory_delta=0
INFO - 2026-03-13 13:28:16 --> [REQ_ID=0dd32fd52be9] [PERF] Execution time=0.042161
DEBUG - 2026-03-13 13:28:16 --> [REQ_ID=d431669726a9] [REQUEST][END]
INFO - 2026-03-13 13:28:16 --> [REQ_ID=d431669726a9] [PERF] Execution time=0.051105
DEBUG - 2026-03-13 13:28:26 --> [REQ_ID=350bd2f37b3f] [REQUEST][START] GET /index.php/Customer-Support
DEBUG - 2026-03-13 13:28:26 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-13 13:28:26 --> [REQ_ID=350bd2f37b3f] [FILTER_BEFORE] /index.php/Customer-Support
DEBUG - 2026-03-13 13:28:26 --> [REQ_ID=350bd2f37b3f] [ROUTE] Controller=\App\Controllers\App\Modules\Support\Controllers\SupportController Method=index
DEBUG - 2026-03-13 13:28:26 --> [REQ_ID=350bd2f37b3f] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Customer-Support
DEBUG - 2026-03-13 13:28:26 --> [CSRF] token name=csrf_test_name hash=c3b68267f6fd5bd643fe34072528b375
DEBUG - 2026-03-13 13:28:26 --> [REQ_ID=350bd2f37b3f] [REQUEST][END]
INFO - 2026-03-13 13:28:26 --> [REQ_ID=350bd2f37b3f] [PERF] Execution time=0.009589
DEBUG - 2026-03-13 13:28:27 --> [REQ_ID=97dea5e2dd42] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-13 13:28:27 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-13 13:28:27 --> [REQ_ID=97dea5e2dd42] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-13 13:28:27 --> [REQ_ID=97dea5e2dd42] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-13 13:28:27 --> [REQ_ID=97dea5e2dd42] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-13 13:28:27 --> [CSRF] token name=csrf_test_name hash=c3b68267f6fd5bd643fe34072528b375
DEBUG - 2026-03-13 13:28:27 --> [REQ_ID=f81bde3a8969] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-13 13:28:27 --> [REQ_ID=f81bde3a8969] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-13 13:28:27 --> [REQ_ID=97dea5e2dd42] [FILTER_AFTER]
DEBUG - 2026-03-13 13:28:27 --> [REQ_ID=97dea5e2dd42] [LIFECYCLE][END] status=200 duration_ms=85.80 memory_delta=0
INFO - 2026-03-13 13:28:27 --> [REQ_ID=f81bde3a8969] [PERF] Execution time=0.085619
DEBUG - 2026-03-13 13:28:27 --> [REQ_ID=97dea5e2dd42] [REQUEST][END]
INFO - 2026-03-13 13:28:27 --> [REQ_ID=97dea5e2dd42] [PERF] Execution time=0.094746
DEBUG - 2026-03-13 13:31:22 --> [REQ_ID=82d4762f3ba4] [REQUEST][START] HEAD /
DEBUG - 2026-03-13 13:31:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-13 13:31:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-13 13:31:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-13 13:31:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-13 13:31:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-13 13:36:22 --> [REQ_ID=2d907da3609c] [REQUEST][START] HEAD /
DEBUG - 2026-03-13 13:36:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-13 13:36:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-13 13:36:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-13 13:36:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-13 13:36:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-13 13:41:22 --> [REQ_ID=d50f08a063ca] [REQUEST][START] HEAD /
DEBUG - 2026-03-13 13:41:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-13 13:41:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-13 13:41:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-13 13:41:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-13 13:41:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-13 13:46:22 --> [REQ_ID=9ed28cd9a6c1] [REQUEST][START] HEAD /
DEBUG - 2026-03-13 13:46:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-13 13:46:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-13 13:46:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-13 13:46:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-13 13:46:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-13 13:51:22 --> [REQ_ID=4fd0eb7d7cd2] [REQUEST][START] HEAD /
DEBUG - 2026-03-13 13:51:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-13 13:51:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-13 13:51:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-13 13:51:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-13 13:51:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-13 13:56:22 --> [REQ_ID=0d6e5c7f82ac] [REQUEST][START] HEAD /
DEBUG - 2026-03-13 13:56:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-13 13:56:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-13 13:56:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-13 13:56:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-13 13:56:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-13 14:00:02 --> [REQ_ID=7cc1d6e09f1d] [REQUEST][START] GET /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-13 14:00:02 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-13 14:00:02 --> [REQ_ID=7cc1d6e09f1d] [FILTER_BEFORE] /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-13 14:00:02 --> [REQ_ID=7cc1d6e09f1d] [ROUTE] Controller=\App\Modules\Management\Controllers\ManagementAPIController Method=Run_CRON_Tasks
DEBUG - 2026-03-13 14:00:02 --> [REQ_ID=7cc1d6e09f1d] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-13 14:00:02 --> [REQ_ID=7cc1d6e09f1d] [REQUEST][END]
INFO - 2026-03-13 14:00:02 --> [REQ_ID=7cc1d6e09f1d] [PERF] Execution time=0.037661
DEBUG - 2026-03-13 14:01:22 --> [REQ_ID=a5d015b971e0] [REQUEST][START] HEAD /
DEBUG - 2026-03-13 14:01:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-13 14:01:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-13 14:01:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-13 14:01:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-13 14:01:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-13 14:06:22 --> [REQ_ID=e2359b62aadf] [REQUEST][START] HEAD /
DEBUG - 2026-03-13 14:06:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-13 14:06:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-13 14:06:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-13 14:06:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-13 14:06:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-13 14:11:22 --> [REQ_ID=45c481680219] [REQUEST][START] HEAD /
DEBUG - 2026-03-13 14:11:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-13 14:11:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-13 14:11:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-13 14:11:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-13 14:11:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-13 14:15:02 --> [REQ_ID=4512f2a1432e] [REQUEST][START] GET /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-13 14:15:02 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-13 14:15:02 --> [REQ_ID=4512f2a1432e] [FILTER_BEFORE] /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-13 14:15:02 --> [REQ_ID=4512f2a1432e] [ROUTE] Controller=\App\Modules\APIs\Controllers\AlertsAPIController Method=fetchEmailAlerts
DEBUG - 2026-03-13 14:15:02 --> [REQ_ID=4512f2a1432e] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-13 14:15:02 --> [REQ_ID=4512f2a1432e] [REQUEST][END]
INFO - 2026-03-13 14:15:02 --> [REQ_ID=4512f2a1432e] [PERF] Execution time=0.048012
DEBUG - 2026-03-13 14:16:22 --> [REQ_ID=e20bebd32591] [REQUEST][START] HEAD /
DEBUG - 2026-03-13 14:16:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-13 14:16:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-13 14:16:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-13 14:16:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-13 14:16:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-13 14:21:22 --> [REQ_ID=83e6d2345ae7] [REQUEST][START] HEAD /
DEBUG - 2026-03-13 14:21:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-13 14:21:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-13 14:21:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-13 14:21:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-13 14:21:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-13 14:26:22 --> [REQ_ID=5fe331730e7d] [REQUEST][START] HEAD /
DEBUG - 2026-03-13 14:26:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-13 14:26:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-13 14:26:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-13 14:26:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-13 14:26:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-13 14:31:22 --> [REQ_ID=79c872ba0002] [REQUEST][START] HEAD /
DEBUG - 2026-03-13 14:31:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-13 14:31:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-13 14:31:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-13 14:31:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-13 14:31:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-13 14:36:22 --> [REQ_ID=01909656163d] [REQUEST][START] HEAD /
DEBUG - 2026-03-13 14:36:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-13 14:36:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-13 14:36:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-13 14:36:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-13 14:36:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-13 14:41:22 --> [REQ_ID=4d2c4f90af97] [REQUEST][START] HEAD /
DEBUG - 2026-03-13 14:41:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-13 14:41:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-13 14:41:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-13 14:41:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-13 14:41:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-13 14:46:22 --> [REQ_ID=fd2f3e69d495] [REQUEST][START] HEAD /
DEBUG - 2026-03-13 14:46:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-13 14:46:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-13 14:46:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-13 14:46:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-13 14:46:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-13 14:47:24 --> [REQ_ID=0df0ddcc4f80] [REQUEST][START] GET /index.php/Dashboard
DEBUG - 2026-03-13 14:47:24 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-13 14:47:24 --> [REQ_ID=0df0ddcc4f80] [FILTER_BEFORE] /index.php/Dashboard
DEBUG - 2026-03-13 14:47:24 --> [REQ_ID=0df0ddcc4f80] [ROUTE] Controller=\App\Modules\User\Controllers\DashboardController Method=index
DEBUG - 2026-03-13 14:47:24 --> [REQ_ID=0df0ddcc4f80] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Dashboard
DEBUG - 2026-03-13 14:47:24 --> [CSRF] token name=csrf_test_name hash=d6cbe299837d040f54d3819fff28f90c
DEBUG - 2026-03-13 14:47:24 --> [REQ_ID=24970a9dba53] [INIT] App\Modules\User\Controllers\DashboardController::GET
INFO - 2026-03-13 14:47:24 --> [REQ_ID=24970a9dba53] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-13 14:47:24 --> [REQ_ID=24970a9dba53] [METHOD_ENTRY] index
DEBUG - 2026-03-13 14:47:24 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-13 14:47:24 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-13 14:47:24 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-13 14:47:24 --> MyMIMarketing: Pscrape library not installed; Google search scraping will use fallback.
DEBUG - 2026-03-13 14:47:24 --> [DASHBOARD] Enter
DEBUG - 2026-03-13 14:47:24 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-13 14:47:24 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-13 14:47:24 --> [SERVICE] App\Services\BudgetService ::getUserBudget
DEBUG - 2026-03-13 14:47:24 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":2,"deleted":0}
DEBUG - 2026-03-13 14:47:25 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-13 14:47:25 --> [MODEL_WHERE] App\Models\BudgetModel KEY="created_by"
DEBUG - 2026-03-13 14:47:25 --> [MODEL_WHERE] App\Models\BudgetModel KEY="account_type"
DEBUG - 2026-03-13 14:47:25 --> [MODEL_WHERE] App\Models\BudgetModel KEY="designated_date >="
DEBUG - 2026-03-13 14:47:25 --> [MODEL_WHERE] App\Models\BudgetModel KEY="designated_date <="
DEBUG - 2026-03-13 14:47:25 --> [MODEL_WHERE] App\Models\BudgetModel KEY="year"
DEBUG - 2026-03-13 14:47:25 --> [MODEL_WHERE] App\Models\BudgetModel KEY="month <="
DEBUG - 2026-03-13 14:47:25 --> [MODEL_WHERE] App\Models\BudgetModel KEY="day <="
DEBUG - 2026-03-13 14:47:25 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":2,"account_type":"Income","month":"03","year":"2026"}
DEBUG - 2026-03-13 14:47:25 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-03-13 14:47:25 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":2,"account_type":"Income","month":"02","year":"2026"}
DEBUG - 2026-03-13 14:47:25 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-03-13 14:47:25 --> [MODEL_WHERE] App\Models\BudgetModel KEY="created_by"
DEBUG - 2026-03-13 14:47:25 --> [MODEL_WHERE] App\Models\BudgetModel KEY="account_type"
DEBUG - 2026-03-13 14:47:25 --> [MODEL_WHERE] App\Models\BudgetModel KEY="designated_date >="
DEBUG - 2026-03-13 14:47:25 --> [MODEL_WHERE] App\Models\BudgetModel KEY="designated_date <="
DEBUG - 2026-03-13 14:47:25 --> [MODEL_WHERE] App\Models\BudgetModel KEY="year"
DEBUG - 2026-03-13 14:47:25 --> [MODEL_WHERE] App\Models\BudgetModel KEY="month <="
DEBUG - 2026-03-13 14:47:25 --> [MODEL_WHERE] App\Models\BudgetModel KEY="day <="
DEBUG - 2026-03-13 14:47:25 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":2,"account_type":"Expense","month":"03","year":"2026"}
DEBUG - 2026-03-13 14:47:25 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-03-13 14:47:25 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":2,"account_type":"Expense","month":"02","year":"2026"}
DEBUG - 2026-03-13 14:47:25 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-03-13 14:47:25 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"status":1,"created_by":2,"deleted":0}
DEBUG - 2026-03-13 14:47:25 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"status":1,"paid":0,"created_by":2,"deleted":0}
DEBUG - 2026-03-13 14:47:25 --> Skipping placeholder symbol for row 46402
DEBUG - 2026-03-13 14:47:25 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"status":1,"created_by":2,"deleted":0}
ERROR - 2026-03-13 14:47:25 --> DashboardController::index failed to load executive summary: Call to undefined method CodeIgniter\Cache\Handlers\FileHandler::set()
DEBUG - 2026-03-13 14:47:25 --> [CACHE_MISS] mymiwallet_development_squeeze_high-risk_global_global_1f86633dd
ERROR - 2026-03-13 14:47:25 --> Unknown column 'score_total' in 'where clause'
in SYSTEMPATH/Database/MySQLi/Connection.php on line 300.
 1 SYSTEMPATH/Database/MySQLi/Connection.php(300): mysqli->query('SELECT COUNT(*) AS `numrows`
FROM `bf_squeeze_scorecards`
WHERE `score_total` >= 80
AND `as_of_datetime` >= \'2026-03-12 14:47:25\'', 0)
 2 SYSTEMPATH/Database/BaseConnection.php(769): CodeIgniter\Database\MySQLi\Connection->execute('SELECT COUNT(*) AS `numrows`
FROM `bf_squeeze_scorecards`
WHERE `score_total` >= 80
AND `as_of_datetime` >= \'2026-03-12 14:47:25\'')
 3 SYSTEMPATH/Database/BaseConnection.php(686): CodeIgniter\Database\BaseConnection->simpleQuery('SELECT COUNT(*) AS `numrows`
FROM `bf_squeeze_scorecards`
WHERE `score_total` >= 80
AND `as_of_datetime` >= \'2026-03-12 14:47:25\'')
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
DEBUG - 2026-03-13 14:47:25 --> MyMIInvestments::getSqueezeHighRiskCount failed: Unknown column 'score_total' in 'where clause'
DEBUG - 2026-03-13 14:47:25 --> 📰 Daily dashboard news window 2026-03-13 00:00:00 -> 2026-03-13 23:59:59 returned 0 rows
DEBUG - 2026-03-13 14:47:25 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-13 14:47:25 --> [SETUP] Status computed
DEBUG - 2026-03-13 14:47:25 --> [REQ_ID=24970a9dba53] [VIEW_RENDER] User/Dashboard/index
INFO - 2026-03-13 14:47:25 --> [REQ_ID=24970a9dba53] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-13 14:47:25 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-13 14:47:25 --> [MODEL_WHERE] App\Models\BudgetModel KEY="created_by"
DEBUG - 2026-03-13 14:47:25 --> [MODEL_WHERE] App\Models\BudgetModel KEY="account_type"
DEBUG - 2026-03-13 14:47:25 --> [MODEL_WHERE] App\Models\BudgetModel KEY="designated_date >="
DEBUG - 2026-03-13 14:47:25 --> [MODEL_WHERE] App\Models\BudgetModel KEY="designated_date <="
DEBUG - 2026-03-13 14:47:25 --> [MODEL_WHERE] App\Models\BudgetModel KEY="year"
DEBUG - 2026-03-13 14:47:25 --> [MODEL_WHERE] App\Models\BudgetModel KEY="month <="
DEBUG - 2026-03-13 14:47:25 --> [MODEL_WHERE] App\Models\BudgetModel KEY="day <="
DEBUG - 2026-03-13 14:47:25 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":2,"account_type":"Income","month":"03","year":"2026"}
DEBUG - 2026-03-13 14:47:25 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-03-13 14:47:25 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":2,"account_type":"Income","month":"02","year":"2026"}
DEBUG - 2026-03-13 14:47:25 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-03-13 14:47:25 --> [MODEL_WHERE] App\Models\BudgetModel KEY="created_by"
DEBUG - 2026-03-13 14:47:25 --> [MODEL_WHERE] App\Models\BudgetModel KEY="account_type"
DEBUG - 2026-03-13 14:47:25 --> [MODEL_WHERE] App\Models\BudgetModel KEY="designated_date >="
DEBUG - 2026-03-13 14:47:25 --> [MODEL_WHERE] App\Models\BudgetModel KEY="designated_date <="
DEBUG - 2026-03-13 14:47:25 --> [MODEL_WHERE] App\Models\BudgetModel KEY="year"
DEBUG - 2026-03-13 14:47:25 --> [MODEL_WHERE] App\Models\BudgetModel KEY="month <="
DEBUG - 2026-03-13 14:47:25 --> [MODEL_WHERE] App\Models\BudgetModel KEY="day <="
DEBUG - 2026-03-13 14:47:25 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":2,"account_type":"Expense","month":"03","year":"2026"}
DEBUG - 2026-03-13 14:47:25 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-03-13 14:47:25 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":2,"account_type":"Expense","month":"02","year":"2026"}
DEBUG - 2026-03-13 14:47:25 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-03-13 14:47:25 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"status":1,"created_by":2,"deleted":0}
DEBUG - 2026-03-13 14:47:25 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"status":1,"paid":0,"created_by":2,"deleted":0}
DEBUG - 2026-03-13 14:47:25 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-13 14:47:25 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"status":1,"created_by":2,"deleted":0}
DEBUG - 2026-03-13 14:47:25 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"status":1,"paid":0,"created_by":2,"deleted":0}
DEBUG - 2026-03-13 14:47:25 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":2,"account_type":"Income","status":1,"month":"03","year":"2026"}
DEBUG - 2026-03-13 14:47:25 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-03-13 14:47:25 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":2,"account_type":"Expense","status":1,"month":"03","year":"2026"}
DEBUG - 2026-03-13 14:47:25 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-03-13 14:47:25 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":2,"account_type":"Investment","month":"03","year":"2026","status":1}
DEBUG - 2026-03-13 14:47:25 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-03-13 14:47:25 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":2,"account_type":"Income","status":1,"month":"02"}
DEBUG - 2026-03-13 14:47:25 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-03-13 14:47:25 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":2,"account_type":"Expense","status":1,"month":"02"}
DEBUG - 2026-03-13 14:47:25 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-03-13 14:47:25 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":2,"account_type":"Investment","month":"02","year":"2026","status":1}
DEBUG - 2026-03-13 14:47:25 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-03-13 14:47:25 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":2,"account_type":"Income","status":1,"month":"04"}
DEBUG - 2026-03-13 14:47:25 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-03-13 14:47:25 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":2,"account_type":"Expense","status":1,"month":"04"}
DEBUG - 2026-03-13 14:47:25 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-03-13 14:47:25 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":2,"account_type":"Investment","month":"04","year":"2026","status":1}
DEBUG - 2026-03-13 14:47:25 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-03-13 14:47:25 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":2,"account_type":"Income","status":1,"year":"2026"}
DEBUG - 2026-03-13 14:47:25 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-03-13 14:47:25 --> [MODEL_WHERE] App\Models\BudgetModel KEY="created_by"
DEBUG - 2026-03-13 14:47:25 --> [MODEL_WHERE] App\Models\BudgetModel KEY="account_type"
DEBUG - 2026-03-13 14:47:25 --> [MODEL_WHERE] App\Models\BudgetModel KEY="status"
DEBUG - 2026-03-13 14:47:25 --> [MODEL_WHERE] App\Models\BudgetModel KEY="year"
DEBUG - 2026-03-13 14:47:25 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-03-13 14:47:25 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":2,"account_type":"Investment","status":1}
DEBUG - 2026-03-13 14:47:25 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-03-13 14:47:25 --> [MODEL_WHERE] App\Models\BudgetModel KEY="created_by"
DEBUG - 2026-03-13 14:47:25 --> [MODEL_WHERE] App\Models\BudgetModel KEY="account_type"
DEBUG - 2026-03-13 14:47:25 --> [MODEL_WHERE] App\Models\BudgetModel KEY="status"
DEBUG - 2026-03-13 14:47:25 --> [MODEL_WHERE] App\Models\BudgetModel KEY="designated_date >="
DEBUG - 2026-03-13 14:47:25 --> [MODEL_WHERE] App\Models\BudgetModel KEY="designated_date <="
DEBUG - 2026-03-13 14:47:25 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-03-13 14:47:26 --> [MODEL_WHERE] App\Models\BudgetModel KEY="created_by"
DEBUG - 2026-03-13 14:47:26 --> [MODEL_WHERE] App\Models\BudgetModel KEY="account_type"
DEBUG - 2026-03-13 14:47:26 --> [MODEL_WHERE] App\Models\BudgetModel KEY="status"
DEBUG - 2026-03-13 14:47:26 --> [MODEL_WHERE] App\Models\BudgetModel KEY="designated_date >="
DEBUG - 2026-03-13 14:47:26 --> [MODEL_WHERE] App\Models\BudgetModel KEY="designated_date <="
DEBUG - 2026-03-13 14:47:26 --> [MODEL_FIRST] App\Models\BudgetModel
INFO - 2026-03-13 14:47:26 --> DashboardController L72 - $checkingSummary: 8784.01
DEBUG - 2026-03-13 14:47:26 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-13 14:47:26 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-13 14:47:26 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-13 14:47:26 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-13 14:47:26 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-13 14:47:26 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-13 14:47:26 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-13 14:47:26 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-13 14:47:26 --> [SERVICE] App\Services\BudgetService ::getUserBudget
DEBUG - 2026-03-13 14:47:26 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":2,"deleted":0}
DEBUG - 2026-03-13 14:47:26 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-13 14:47:26 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"status":1,"created_by":2,"deleted":0}
DEBUG - 2026-03-13 14:47:26 --> [MODEL_WHERE] App\Models\BudgetModel KEY="created_by"
DEBUG - 2026-03-13 14:47:26 --> [MODEL_WHERE] App\Models\BudgetModel KEY="account_type"
DEBUG - 2026-03-13 14:47:26 --> [MODEL_WHERE] App\Models\BudgetModel KEY="designated_date >="
DEBUG - 2026-03-13 14:47:26 --> [MODEL_WHERE] App\Models\BudgetModel KEY="designated_date <="
DEBUG - 2026-03-13 14:47:26 --> [MODEL_WHERE] App\Models\BudgetModel KEY="year"
DEBUG - 2026-03-13 14:47:26 --> [MODEL_WHERE] App\Models\BudgetModel KEY="month <="
DEBUG - 2026-03-13 14:47:26 --> [MODEL_WHERE] App\Models\BudgetModel KEY="day <="
DEBUG - 2026-03-13 14:47:26 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":2,"account_type":"Income","month":"03","year":"2026"}
DEBUG - 2026-03-13 14:47:26 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-03-13 14:47:26 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":2,"account_type":"Income","month":"02","year":"2026"}
DEBUG - 2026-03-13 14:47:26 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-03-13 14:47:26 --> [MODEL_WHERE] App\Models\BudgetModel KEY="created_by"
DEBUG - 2026-03-13 14:47:26 --> [MODEL_WHERE] App\Models\BudgetModel KEY="account_type"
DEBUG - 2026-03-13 14:47:26 --> [MODEL_WHERE] App\Models\BudgetModel KEY="designated_date >="
DEBUG - 2026-03-13 14:47:26 --> [MODEL_WHERE] App\Models\BudgetModel KEY="designated_date <="
DEBUG - 2026-03-13 14:47:26 --> [MODEL_WHERE] App\Models\BudgetModel KEY="year"
DEBUG - 2026-03-13 14:47:26 --> [MODEL_WHERE] App\Models\BudgetModel KEY="month <="
DEBUG - 2026-03-13 14:47:26 --> [MODEL_WHERE] App\Models\BudgetModel KEY="day <="
DEBUG - 2026-03-13 14:47:26 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":2,"account_type":"Expense","month":"03","year":"2026"}
DEBUG - 2026-03-13 14:47:26 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-03-13 14:47:26 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":2,"account_type":"Expense","month":"02","year":"2026"}
DEBUG - 2026-03-13 14:47:26 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-03-13 14:47:26 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"status":1,"created_by":2,"deleted":0}
DEBUG - 2026-03-13 14:47:26 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"status":1,"paid":0,"created_by":2,"deleted":0}
INFO - 2026-03-13 14:47:26 --> getSolanaData: invalid address param
INFO - 2026-03-13 14:47:26 --> themesMemory usage: 8388608
DEBUG - 2026-03-13 14:47:26 --> [REQ_ID=0df0ddcc4f80] [FILTER_AFTER]
DEBUG - 2026-03-13 14:47:26 --> [REQ_ID=0df0ddcc4f80] [LIFECYCLE][END] status=200 duration_ms=1,519.13 memory_delta=4194304
INFO - 2026-03-13 14:47:26 --> [REQ_ID=24970a9dba53] [PERF] Execution time=1.472937
DEBUG - 2026-03-13 14:47:26 --> [REQ_ID=0df0ddcc4f80] [REQUEST][END]
INFO - 2026-03-13 14:47:26 --> [REQ_ID=0df0ddcc4f80] [PERF] Execution time=1.543409
DEBUG - 2026-03-13 14:51:22 --> [REQ_ID=f5bceff9cbd2] [REQUEST][START] HEAD /
DEBUG - 2026-03-13 14:51:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-13 14:51:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-13 14:51:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-13 14:51:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-13 14:51:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-13 14:56:22 --> [REQ_ID=039a201b076a] [REQUEST][START] HEAD /
DEBUG - 2026-03-13 14:56:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-13 14:56:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-13 14:56:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-13 14:56:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-13 14:56:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-13 14:57:52 --> [REQ_ID=1dab38ea2697] [REQUEST][START] GET /
DEBUG - 2026-03-13 14:57:52 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-13 14:57:52 --> [REQ_ID=1dab38ea2697] [FILTER_BEFORE] /
DEBUG - 2026-03-13 14:57:52 --> [REQ_ID=1dab38ea2697] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-13 14:57:52 --> [REQ_ID=1dab38ea2697] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-13 14:57:52 --> [CSRF] token name=csrf_test_name hash=193d22cf76abda1cc8400c9d16b7a47e
DEBUG - 2026-03-13 14:57:52 --> [REQ_ID=5c56eb820688] [INIT] App\Controllers\Home::GET
INFO - 2026-03-13 14:57:52 --> [REQ_ID=5c56eb820688] [MEMORY][controller-start] 6291456
INFO - 2026-03-13 14:57:52 --> [REQ_ID=5c56eb820688] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-13 14:57:52 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-13 14:57:53 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-03-13 14:57:53 --> [REQ_ID=5c56eb820688] [VIEW_RENDER] themes/public/home
INFO - 2026-03-13 14:57:53 --> [REQ_ID=5c56eb820688] [MEMORY][commonData:start] 10485760
INFO - 2026-03-13 14:57:53 --> themesMemory usage: 10485760
DEBUG - 2026-03-13 14:57:53 --> [MetaService] slug= pageName=Home cacheHit= path=DB
DEBUG - 2026-03-13 14:57:53 --> [REQ_ID=1dab38ea2697] [FILTER_AFTER]
DEBUG - 2026-03-13 14:57:53 --> [REQ_ID=1dab38ea2697] [LIFECYCLE][END] status=200 duration_ms=893.91 memory_delta=4194304
INFO - 2026-03-13 14:57:53 --> [REQ_ID=5c56eb820688] [PERF] Execution time=0.891403
DEBUG - 2026-03-13 14:57:53 --> [REQ_ID=1dab38ea2697] [REQUEST][END]
INFO - 2026-03-13 14:57:53 --> [REQ_ID=1dab38ea2697] [PERF] Execution time=0.934148
DEBUG - 2026-03-13 14:59:39 --> [REQ_ID=8f744d15305d] [REQUEST][START] GET /
DEBUG - 2026-03-13 14:59:39 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-13 14:59:39 --> [REQ_ID=8f744d15305d] [FILTER_BEFORE] /
DEBUG - 2026-03-13 14:59:39 --> [REQ_ID=8f744d15305d] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-13 14:59:39 --> [REQ_ID=8f744d15305d] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-13 14:59:39 --> [CSRF] token name=csrf_test_name hash=a76e54d6761d5b133b9657e800312973
DEBUG - 2026-03-13 14:59:39 --> [REQ_ID=73e261701230] [INIT] App\Controllers\Home::GET
INFO - 2026-03-13 14:59:39 --> [REQ_ID=73e261701230] [MEMORY][controller-start] 6291456
INFO - 2026-03-13 14:59:39 --> [REQ_ID=73e261701230] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-13 14:59:39 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-13 14:59:40 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
DEBUG - 2026-03-13 14:59:40 --> [REQ_ID=73e261701230] [VIEW_RENDER] themes/public/home
INFO - 2026-03-13 14:59:40 --> [REQ_ID=73e261701230] [MEMORY][commonData:start] 10485760
INFO - 2026-03-13 14:59:40 --> themesMemory usage: 10485760
DEBUG - 2026-03-13 14:59:40 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-13 14:59:40 --> [REQ_ID=8f744d15305d] [FILTER_AFTER]
DEBUG - 2026-03-13 14:59:40 --> [REQ_ID=8f744d15305d] [LIFECYCLE][END] status=200 duration_ms=760.98 memory_delta=4194304
INFO - 2026-03-13 14:59:40 --> [REQ_ID=73e261701230] [PERF] Execution time=0.758972
DEBUG - 2026-03-13 14:59:40 --> [REQ_ID=8f744d15305d] [REQUEST][END]
INFO - 2026-03-13 14:59:40 --> [REQ_ID=8f744d15305d] [PERF] Execution time=0.799738
DEBUG - 2026-03-13 14:59:48 --> [REQ_ID=a5c30c4fc3b5] [REQUEST][START] POST /index.php/register
DEBUG - 2026-03-13 14:59:48 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-13 14:59:48 --> [REQ_ID=a5c30c4fc3b5] [FILTER_BEFORE] /index.php/register
DEBUG - 2026-03-13 14:59:48 --> [REQ_ID=a5c30c4fc3b5] [ROUTE] Controller=\App\Controllers\AuthController Method=attemptRegister
DEBUG - 2026-03-13 14:59:48 --> [REQ_ID=a5c30c4fc3b5] [LIFECYCLE][START] POST https://www.mymiwallet.com/index.php/register
DEBUG - 2026-03-13 14:59:48 --> [CSRF] token name=csrf_test_name hash=a76e54d6761d5b133b9657e800312973
INFO - 2026-03-13 14:59:48 --> CSRF token verified.
DEBUG - 2026-03-13 14:59:48 --> [REQ_ID=78edb3e72c2b] [INIT] App\Controllers\AuthController::POST
INFO - 2026-03-13 14:59:48 --> [REQ_ID=78edb3e72c2b] [MEMORY][controller-start] 6291456
INFO - 2026-03-13 14:59:48 --> [REGISTRATION] Submission received
INFO - 2026-03-13 14:59:48 --> MailService queued email
INFO - 2026-03-13 14:59:48 --> [REGISTRATION] Validation passed (basic fields)
INFO - 2026-03-13 14:59:48 --> [REGISTRATION] Validation passed (password fields)
INFO - 2026-03-13 14:59:48 --> Registration created user_id=11727, email=c.hris.sy.t.r.ages.e.r@gmail.com, username=QSmLhkyyyXgXzSyIvkuyZG, active=, requiresActivation=1, loginIdentifier=username
INFO - 2026-03-13 14:59:48 --> [REGISTRATION] User record created
INFO - 2026-03-13 14:59:48 --> OnboardingProgressService: created onboarding record for user_id=11727
INFO - 2026-03-13 14:59:49 --> Registration succeeded for c.hris.sy.t.r.ages.e.r@gmail.com (event 63e205a8c84f641c)
INFO - 2026-03-13 14:59:49 --> [REGISTRATION] Activation email queued
INFO - 2026-03-13 14:59:49 --> Registration redirecting to success guide for user_id=11727
DEBUG - 2026-03-13 14:59:49 --> [REQ_ID=a5c30c4fc3b5] [FILTER_AFTER]
DEBUG - 2026-03-13 14:59:49 --> [REQ_ID=a5c30c4fc3b5] [LIFECYCLE][END] status=303 duration_ms=1,305.76 memory_delta=0
INFO - 2026-03-13 14:59:49 --> [REQ_ID=78edb3e72c2b] [PERF] Execution time=1.305515
DEBUG - 2026-03-13 14:59:49 --> [REQ_ID=a5c30c4fc3b5] [REQUEST][END]
INFO - 2026-03-13 14:59:49 --> [REQ_ID=a5c30c4fc3b5] [PERF] Execution time=1.318919
DEBUG - 2026-03-13 14:59:50 --> [REQ_ID=cc20d3f674c8] [REQUEST][START] GET /index.php/register/success
DEBUG - 2026-03-13 14:59:50 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-13 14:59:50 --> [REQ_ID=cc20d3f674c8] [FILTER_BEFORE] /index.php/register/success
DEBUG - 2026-03-13 14:59:50 --> [REQ_ID=cc20d3f674c8] [ROUTE] Controller=\App\Controllers\AuthController Method=registerSuccess
DEBUG - 2026-03-13 14:59:50 --> [REQ_ID=cc20d3f674c8] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/register/success
DEBUG - 2026-03-13 14:59:50 --> [CSRF] token name=csrf_test_name hash=a76e54d6761d5b133b9657e800312973
DEBUG - 2026-03-13 14:59:50 --> [REQ_ID=75738ab1359e] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-13 14:59:50 --> [REQ_ID=75738ab1359e] [MEMORY][controller-start] 4194304
INFO - 2026-03-13 14:59:50 --> AuthController::registerSuccess view rendered.
INFO - 2026-03-13 14:59:50 --> [REQ_ID=75738ab1359e] [PERF] Execution time=0.094204
DEBUG - 2026-03-13 15:00:01 --> [REQ_ID=f41d5fd623f7] [REQUEST][START] GET /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-13 15:00:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-13 15:00:01 --> [REQ_ID=f41d5fd623f7] [FILTER_BEFORE] /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-13 15:00:01 --> [REQ_ID=f41d5fd623f7] [ROUTE] Controller=\App\Modules\Management\Controllers\ManagementAPIController Method=Run_CRON_Tasks
DEBUG - 2026-03-13 15:00:01 --> [REQ_ID=f41d5fd623f7] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-13 15:00:01 --> [REQ_ID=f41d5fd623f7] [REQUEST][END]
INFO - 2026-03-13 15:00:01 --> [REQ_ID=f41d5fd623f7] [PERF] Execution time=0.013465
DEBUG - 2026-03-13 15:00:04 --> [REQ_ID=6f20bcc67043] [REQUEST][START] GET /index.php/How-It-Works/Registering-An-Account
DEBUG - 2026-03-13 15:00:04 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-13 15:00:04 --> [REQ_ID=6f20bcc67043] [FILTER_BEFORE] /index.php/How-It-Works/Registering-An-Account
DEBUG - 2026-03-13 15:00:04 --> [REQ_ID=6f20bcc67043] [ROUTE] Controller=\App\Modules\Blog\Controllers\HowItWorksController Method=show
DEBUG - 2026-03-13 15:00:04 --> [REQ_ID=6f20bcc67043] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/How-It-Works/Registering-An-Account
DEBUG - 2026-03-13 15:00:04 --> [CSRF] token name=csrf_test_name hash=a76e54d6761d5b133b9657e800312973
DEBUG - 2026-03-13 15:00:04 --> [REQ_ID=f9121ef11815] [INIT] App\Modules\Blog\Controllers\HowItWorksController::GET
INFO - 2026-03-13 15:00:04 --> [REQ_ID=f9121ef11815] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-13 15:00:04 --> [REQ_ID=f9121ef11815] [METHOD_ENTRY] show
DEBUG - 2026-03-13 15:00:04 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-13 15:00:04 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-13 15:00:04 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-13 15:00:04 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-13 15:00:04 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-13 15:00:04 --> MyMICoin: guest context detected; skipping user-specific preload.
ERROR - 2026-03-13 15:00:04 --> HowItWorksController failure: Call to undefined method App\Modules\Blog\Controllers\HowItWorksController::respondWithRendered()
INFO - 2026-03-13 15:00:04 --> [REQ_ID=f9121ef11815] [PERF] Execution time=0.350164
DEBUG - 2026-03-13 15:00:07 --> [REQ_ID=87301e7286ca] [REQUEST][START] GET /index.php/How-It-Works/Investor-Profile
DEBUG - 2026-03-13 15:00:07 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-13 15:00:07 --> [REQ_ID=87301e7286ca] [FILTER_BEFORE] /index.php/How-It-Works/Investor-Profile
DEBUG - 2026-03-13 15:00:07 --> [REQ_ID=87301e7286ca] [ROUTE] Controller=\App\Modules\Blog\Controllers\HowItWorksController Method=show
DEBUG - 2026-03-13 15:00:07 --> [REQ_ID=87301e7286ca] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/How-It-Works/Investor-Profile
DEBUG - 2026-03-13 15:00:07 --> [CSRF] token name=csrf_test_name hash=a76e54d6761d5b133b9657e800312973
DEBUG - 2026-03-13 15:00:07 --> [REQ_ID=a5be064f9e00] [INIT] App\Modules\Blog\Controllers\HowItWorksController::GET
INFO - 2026-03-13 15:00:07 --> [REQ_ID=a5be064f9e00] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-13 15:00:07 --> [REQ_ID=a5be064f9e00] [METHOD_ENTRY] show
DEBUG - 2026-03-13 15:00:07 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-13 15:00:07 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-13 15:00:07 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-13 15:00:07 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-13 15:00:07 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-13 15:00:07 --> MyMICoin: guest context detected; skipping user-specific preload.
ERROR - 2026-03-13 15:00:07 --> HowItWorksController failure: investor-profile
CRITICAL - 2026-03-13 15:00:07 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: GET, Route: How-It-Works/Investor-Profile]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-13 15:00:07 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-13 15:00:07 --> [404] URI=https://www.mymiwallet.com/index.php/How-It-Works/Investor-Profile
WARNING - 2026-03-13 15:00:07 --> 404 route miss: https://www.mymiwallet.com/index.php/How-It-Works/Investor-Profile | referrer: none
ERROR - 2026-03-13 15:00:07 --> [ERROR_PAGE] event=error_404 status=404 message=Page not found.
INFO - 2026-03-13 15:00:07 --> [REQ_ID=a5be064f9e00] [PERF] Execution time=0.080806
DEBUG - 2026-03-13 15:00:12 --> [REQ_ID=315cd5ed158f] [REQUEST][START] GET /index.php/Free/register
DEBUG - 2026-03-13 15:00:12 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-13 15:00:12 --> [REQ_ID=315cd5ed158f] [FILTER_BEFORE] /index.php/Free/register
DEBUG - 2026-03-13 15:00:12 --> [REQ_ID=315cd5ed158f] [ROUTE] Controller=\App\Controllers\AuthController Method=register
DEBUG - 2026-03-13 15:00:12 --> [REQ_ID=315cd5ed158f] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Free/register
DEBUG - 2026-03-13 15:00:12 --> [CSRF] token name=csrf_test_name hash=a76e54d6761d5b133b9657e800312973
DEBUG - 2026-03-13 15:00:12 --> [REQ_ID=315cd5ed158f] [REQUEST][END]
INFO - 2026-03-13 15:00:12 --> [REQ_ID=315cd5ed158f] [PERF] Execution time=0.014901
DEBUG - 2026-03-13 15:00:13 --> [REQ_ID=afcae69ee0fc] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-13 15:00:13 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-13 15:00:13 --> [REQ_ID=afcae69ee0fc] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-13 15:00:13 --> [REQ_ID=afcae69ee0fc] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-13 15:00:13 --> [REQ_ID=afcae69ee0fc] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-13 15:00:13 --> [CSRF] token name=csrf_test_name hash=a76e54d6761d5b133b9657e800312973
DEBUG - 2026-03-13 15:00:13 --> [REQ_ID=f98a61d0d74e] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-13 15:00:13 --> [REQ_ID=f98a61d0d74e] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-13 15:00:13 --> [REQ_ID=afcae69ee0fc] [FILTER_AFTER]
DEBUG - 2026-03-13 15:00:13 --> [REQ_ID=afcae69ee0fc] [LIFECYCLE][END] status=200 duration_ms=26.49 memory_delta=0
INFO - 2026-03-13 15:00:13 --> [REQ_ID=f98a61d0d74e] [PERF] Execution time=0.026284
DEBUG - 2026-03-13 15:00:13 --> [REQ_ID=afcae69ee0fc] [REQUEST][END]
INFO - 2026-03-13 15:00:13 --> [REQ_ID=afcae69ee0fc] [PERF] Execution time=0.035401
DEBUG - 2026-03-13 15:00:13 --> [REQ_ID=61040bc6afd8] [REQUEST][START] GET /index.php/Support
DEBUG - 2026-03-13 15:00:13 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-13 15:00:13 --> [REQ_ID=61040bc6afd8] [FILTER_BEFORE] /index.php/Support
DEBUG - 2026-03-13 15:00:13 --> [REQ_ID=61040bc6afd8] [ROUTE] Controller=\App\Modules\Support\Controllers\SupportController Method=index
DEBUG - 2026-03-13 15:00:13 --> [REQ_ID=61040bc6afd8] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Support
DEBUG - 2026-03-13 15:00:13 --> [CSRF] token name=csrf_test_name hash=a76e54d6761d5b133b9657e800312973
DEBUG - 2026-03-13 15:00:13 --> [REQ_ID=e7b2987a1256] [INIT] App\Modules\Support\Controllers\SupportController::GET
INFO - 2026-03-13 15:00:13 --> [REQ_ID=e7b2987a1256] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-13 15:00:13 --> [REQ_ID=e7b2987a1256] [METHOD_ENTRY] index
DEBUG - 2026-03-13 15:00:13 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-13 15:00:13 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-13 15:00:13 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-13 15:00:13 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-13 15:00:13 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-13 15:00:13 --> MyMICoin: guest context detected; skipping user-specific preload.
INFO - 2026-03-13 15:00:13 --> [REQ_ID=e7b2987a1256] [MEMORY][commonData:start] 4194304
DEBUG - 2026-03-13 15:00:13 --> [REQ_ID=e7b2987a1256] [VIEW_RENDER] SupportModule\Views\Support\index
INFO - 2026-03-13 15:00:13 --> [REQ_ID=e7b2987a1256] [MEMORY][commonData:start] 4194304
INFO - 2026-03-13 15:00:13 --> themesMemory usage: 4194304
DEBUG - 2026-03-13 15:00:13 --> [REQ_ID=61040bc6afd8] [FILTER_AFTER]
DEBUG - 2026-03-13 15:00:13 --> [REQ_ID=61040bc6afd8] [LIFECYCLE][END] status=200 duration_ms=58.92 memory_delta=0
INFO - 2026-03-13 15:00:13 --> [REQ_ID=e7b2987a1256] [PERF] Execution time=0.058710
DEBUG - 2026-03-13 15:00:13 --> [REQ_ID=61040bc6afd8] [REQUEST][END]
INFO - 2026-03-13 15:00:13 --> [REQ_ID=61040bc6afd8] [PERF] Execution time=0.070096
DEBUG - 2026-03-13 15:00:19 --> [REQ_ID=bd5f03cb6ab1] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-13 15:00:19 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-13 15:00:19 --> [REQ_ID=bd5f03cb6ab1] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-13 15:00:19 --> [REQ_ID=bd5f03cb6ab1] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-13 15:00:19 --> [REQ_ID=bd5f03cb6ab1] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-13 15:00:19 --> [CSRF] token name=csrf_test_name hash=a76e54d6761d5b133b9657e800312973
DEBUG - 2026-03-13 15:00:19 --> [REQ_ID=4c2a9339104d] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-13 15:00:19 --> [REQ_ID=4c2a9339104d] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-13 15:00:19 --> [REQ_ID=bd5f03cb6ab1] [FILTER_AFTER]
DEBUG - 2026-03-13 15:00:19 --> [REQ_ID=bd5f03cb6ab1] [LIFECYCLE][END] status=200 duration_ms=42.75 memory_delta=0
INFO - 2026-03-13 15:00:19 --> [REQ_ID=4c2a9339104d] [PERF] Execution time=0.042601
DEBUG - 2026-03-13 15:00:19 --> [REQ_ID=bd5f03cb6ab1] [REQUEST][END]
INFO - 2026-03-13 15:00:19 --> [REQ_ID=bd5f03cb6ab1] [PERF] Execution time=0.052303
DEBUG - 2026-03-13 15:00:28 --> [REQ_ID=9af316a7281a] [REQUEST][START] POST /index.php/login
DEBUG - 2026-03-13 15:00:28 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-13 15:00:28 --> [REQ_ID=9af316a7281a] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-13 15:00:28 --> [REQ_ID=9af316a7281a] [ROUTE] Controller=\App\Controllers\AuthController Method=attemptLogin
DEBUG - 2026-03-13 15:00:28 --> [REQ_ID=9af316a7281a] [LIFECYCLE][START] POST https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-13 15:00:28 --> [CSRF] token name=csrf_test_name hash=a76e54d6761d5b133b9657e800312973
INFO - 2026-03-13 15:00:28 --> CSRF token verified.
DEBUG - 2026-03-13 15:00:28 --> [REQ_ID=70ba71f8c172] [INIT] App\Controllers\AuthController::POST
INFO - 2026-03-13 15:00:28 --> [REQ_ID=70ba71f8c172] [MEMORY][controller-start] 4194304
INFO - 2026-03-13 15:00:28 --> AuthController L93: Auth:attemptLogin started.
INFO - 2026-03-13 15:00:28 --> AuthController L104: Auth:attemptLogin rules: {"login":"required","password":"required"}
INFO - 2026-03-13 15:00:28 --> AuthController L132: Auth:attemptLogin Login Variables: login: required, remember: true, ip: 87.106.76.226, ua: "Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36"
DEBUG - 2026-03-13 15:00:28 --> Auth attemptLogin() called with login identifier: c.hris.sy.t.r.ages.e.r@gmail.com, remember: true
DEBUG - 2026-03-13 15:00:28 --> Auth attemptLogin() called. redirect_url in session: https://www.mymiwallet.com/index.php/Free/register
DEBUG - 2026-03-13 15:00:28 --> Auth credentials normalised for attempt using key "email"
WARNING - 2026-03-13 15:00:28 --> [AUTH_FAILURE] 
DEBUG - 2026-03-13 15:00:28 --> Auth attempt failed for identifier c.hris.sy.t.r.ages.e.r@gmail.com. Error: Unable to log you in. Please check your password.
WARNING - 2026-03-13 15:00:28 --> [AUTH] Login failure
WARNING - 2026-03-13 15:00:28 --> [AUTH] Login failed
DEBUG - 2026-03-13 15:00:28 --> [REQ_ID=9af316a7281a] [FILTER_AFTER]
DEBUG - 2026-03-13 15:00:28 --> [REQ_ID=9af316a7281a] [LIFECYCLE][END] status=303 duration_ms=260.44 memory_delta=0
INFO - 2026-03-13 15:00:28 --> [REQ_ID=70ba71f8c172] [PERF] Execution time=0.260248
DEBUG - 2026-03-13 15:00:28 --> [REQ_ID=9af316a7281a] [REQUEST][END]
INFO - 2026-03-13 15:00:28 --> [REQ_ID=9af316a7281a] [PERF] Execution time=0.270026
DEBUG - 2026-03-13 15:00:28 --> [REQ_ID=ea40767f709e] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-13 15:00:28 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-13 15:00:28 --> [REQ_ID=ea40767f709e] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-13 15:00:28 --> [REQ_ID=ea40767f709e] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-13 15:00:28 --> [REQ_ID=ea40767f709e] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-13 15:00:28 --> [CSRF] token name=csrf_test_name hash=a76e54d6761d5b133b9657e800312973
DEBUG - 2026-03-13 15:00:28 --> [REQ_ID=31bbfc0de8b8] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-13 15:00:28 --> [REQ_ID=31bbfc0de8b8] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-13 15:00:28 --> [REQ_ID=ea40767f709e] [FILTER_AFTER]
DEBUG - 2026-03-13 15:00:28 --> [REQ_ID=ea40767f709e] [LIFECYCLE][END] status=200 duration_ms=19.43 memory_delta=0
INFO - 2026-03-13 15:00:28 --> [REQ_ID=31bbfc0de8b8] [PERF] Execution time=0.019373
DEBUG - 2026-03-13 15:00:28 --> [REQ_ID=ea40767f709e] [REQUEST][END]
INFO - 2026-03-13 15:00:28 --> [REQ_ID=ea40767f709e] [PERF] Execution time=0.028183
DEBUG - 2026-03-13 15:00:43 --> [REQ_ID=11ff2c8151fc] [REQUEST][START] GET /index.php/Account/Notifications
DEBUG - 2026-03-13 15:00:43 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-13 15:00:43 --> [REQ_ID=11ff2c8151fc] [FILTER_BEFORE] /index.php/Account/Notifications
DEBUG - 2026-03-13 15:00:43 --> [REQ_ID=11ff2c8151fc] [ROUTE] Controller=\App\Modules\User\Controllers\DashboardController Method=notifications
DEBUG - 2026-03-13 15:00:43 --> [REQ_ID=11ff2c8151fc] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Account/Notifications
DEBUG - 2026-03-13 15:00:43 --> [CSRF] token name=csrf_test_name hash=a76e54d6761d5b133b9657e800312973
DEBUG - 2026-03-13 15:00:43 --> [REQ_ID=11ff2c8151fc] [REQUEST][END]
INFO - 2026-03-13 15:00:43 --> [REQ_ID=11ff2c8151fc] [PERF] Execution time=0.013491
DEBUG - 2026-03-13 15:00:43 --> [REQ_ID=9ef19ca6da83] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-13 15:00:43 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-13 15:00:43 --> [REQ_ID=9ef19ca6da83] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-13 15:00:43 --> [REQ_ID=9ef19ca6da83] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-13 15:00:43 --> [REQ_ID=9ef19ca6da83] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-13 15:00:43 --> [CSRF] token name=csrf_test_name hash=a76e54d6761d5b133b9657e800312973
DEBUG - 2026-03-13 15:00:43 --> [REQ_ID=657ed727dfce] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-13 15:00:43 --> [REQ_ID=657ed727dfce] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-13 15:00:44 --> [REQ_ID=9ef19ca6da83] [FILTER_AFTER]
DEBUG - 2026-03-13 15:00:44 --> [REQ_ID=9ef19ca6da83] [LIFECYCLE][END] status=200 duration_ms=51.54 memory_delta=0
INFO - 2026-03-13 15:00:44 --> [REQ_ID=657ed727dfce] [PERF] Execution time=0.051347
DEBUG - 2026-03-13 15:00:44 --> [REQ_ID=9ef19ca6da83] [REQUEST][END]
INFO - 2026-03-13 15:00:44 --> [REQ_ID=9ef19ca6da83] [PERF] Execution time=0.060845
DEBUG - 2026-03-13 15:00:48 --> [REQ_ID=42a543c9c021] [REQUEST][START] GET /index.php/Management/Users
DEBUG - 2026-03-13 15:00:48 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-13 15:00:48 --> [REQ_ID=42a543c9c021] [FILTER_BEFORE] /index.php/Management/Users
DEBUG - 2026-03-13 15:00:48 --> [REQ_ID=42a543c9c021] [ROUTE] Controller=\App\Modules\Management\Controllers\UsersController Method=index
DEBUG - 2026-03-13 15:00:48 --> [REQ_ID=42a543c9c021] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Management/Users
DEBUG - 2026-03-13 15:00:48 --> [CSRF] token name=csrf_test_name hash=a76e54d6761d5b133b9657e800312973
DEBUG - 2026-03-13 15:00:48 --> [REQ_ID=42a543c9c021] [REQUEST][END]
INFO - 2026-03-13 15:00:48 --> [REQ_ID=42a543c9c021] [PERF] Execution time=0.009917
DEBUG - 2026-03-13 15:00:48 --> [REQ_ID=d143664c7b64] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-13 15:00:48 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-13 15:00:48 --> [REQ_ID=d143664c7b64] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-13 15:00:48 --> [REQ_ID=d143664c7b64] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-13 15:00:48 --> [REQ_ID=d143664c7b64] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-13 15:00:48 --> [CSRF] token name=csrf_test_name hash=a76e54d6761d5b133b9657e800312973
DEBUG - 2026-03-13 15:00:48 --> [REQ_ID=0ce967dceaf4] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-13 15:00:48 --> [REQ_ID=0ce967dceaf4] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-13 15:00:48 --> [REQ_ID=d143664c7b64] [FILTER_AFTER]
DEBUG - 2026-03-13 15:00:48 --> [REQ_ID=d143664c7b64] [LIFECYCLE][END] status=200 duration_ms=38.53 memory_delta=0
INFO - 2026-03-13 15:00:48 --> [REQ_ID=0ce967dceaf4] [PERF] Execution time=0.038347
DEBUG - 2026-03-13 15:00:48 --> [REQ_ID=d143664c7b64] [REQUEST][END]
INFO - 2026-03-13 15:00:48 --> [REQ_ID=d143664c7b64] [PERF] Execution time=0.048051
DEBUG - 2026-03-13 15:00:57 --> [REQ_ID=465f2826f469] [REQUEST][START] GET /index.php/logout
DEBUG - 2026-03-13 15:00:57 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-13 15:00:57 --> [REQ_ID=465f2826f469] [FILTER_BEFORE] /index.php/logout
DEBUG - 2026-03-13 15:00:57 --> [REQ_ID=465f2826f469] [ROUTE] Controller=\App\Controllers\AuthController Method=logout
DEBUG - 2026-03-13 15:00:57 --> [REQ_ID=465f2826f469] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/logout
DEBUG - 2026-03-13 15:00:57 --> [CSRF] token name=csrf_test_name hash=a76e54d6761d5b133b9657e800312973
DEBUG - 2026-03-13 15:00:57 --> [REQ_ID=465f2826f469] [REQUEST][END]
INFO - 2026-03-13 15:00:57 --> [REQ_ID=465f2826f469] [PERF] Execution time=0.010160
DEBUG - 2026-03-13 15:00:57 --> [REQ_ID=5f9d50de5c69] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-13 15:00:57 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-13 15:00:57 --> [REQ_ID=5f9d50de5c69] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-13 15:00:57 --> [REQ_ID=5f9d50de5c69] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-13 15:00:57 --> [REQ_ID=5f9d50de5c69] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-13 15:00:57 --> [CSRF] token name=csrf_test_name hash=a76e54d6761d5b133b9657e800312973
DEBUG - 2026-03-13 15:00:57 --> [REQ_ID=e38d81e67b34] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-13 15:00:57 --> [REQ_ID=e38d81e67b34] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-13 15:00:57 --> [REQ_ID=5f9d50de5c69] [FILTER_AFTER]
DEBUG - 2026-03-13 15:00:57 --> [REQ_ID=5f9d50de5c69] [LIFECYCLE][END] status=200 duration_ms=44.19 memory_delta=0
INFO - 2026-03-13 15:00:57 --> [REQ_ID=e38d81e67b34] [PERF] Execution time=0.044093
DEBUG - 2026-03-13 15:00:57 --> [REQ_ID=5f9d50de5c69] [REQUEST][END]
INFO - 2026-03-13 15:00:57 --> [REQ_ID=5f9d50de5c69] [PERF] Execution time=0.052894
DEBUG - 2026-03-13 15:01:08 --> [REQ_ID=326ef3e94334] [REQUEST][START] GET /index.php/Profile/
DEBUG - 2026-03-13 15:01:08 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-13 15:01:08 --> [REQ_ID=326ef3e94334] [FILTER_BEFORE] /index.php/Profile/
DEBUG - 2026-03-13 15:01:08 --> [REQ_ID=326ef3e94334] [ROUTE] Controller=\App\Controllers\App\Modules\User\Controllers\DashboardController Method=profile
DEBUG - 2026-03-13 15:01:08 --> [REQ_ID=326ef3e94334] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Profile/
DEBUG - 2026-03-13 15:01:08 --> [CSRF] token name=csrf_test_name hash=a76e54d6761d5b133b9657e800312973
DEBUG - 2026-03-13 15:01:08 --> [REQ_ID=326ef3e94334] [REQUEST][END]
INFO - 2026-03-13 15:01:08 --> [REQ_ID=326ef3e94334] [PERF] Execution time=0.010401
DEBUG - 2026-03-13 15:01:08 --> [REQ_ID=434dcedd2cb7] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-13 15:01:08 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-13 15:01:08 --> [REQ_ID=434dcedd2cb7] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-13 15:01:08 --> [REQ_ID=434dcedd2cb7] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-13 15:01:08 --> [REQ_ID=434dcedd2cb7] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-13 15:01:08 --> [CSRF] token name=csrf_test_name hash=a76e54d6761d5b133b9657e800312973
DEBUG - 2026-03-13 15:01:08 --> [REQ_ID=0aefdf581141] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-13 15:01:08 --> [REQ_ID=0aefdf581141] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-13 15:01:08 --> [REQ_ID=434dcedd2cb7] [FILTER_AFTER]
DEBUG - 2026-03-13 15:01:08 --> [REQ_ID=434dcedd2cb7] [LIFECYCLE][END] status=200 duration_ms=42.09 memory_delta=0
INFO - 2026-03-13 15:01:08 --> [REQ_ID=0aefdf581141] [PERF] Execution time=0.042015
DEBUG - 2026-03-13 15:01:08 --> [REQ_ID=434dcedd2cb7] [REQUEST][END]
INFO - 2026-03-13 15:01:08 --> [REQ_ID=434dcedd2cb7] [PERF] Execution time=0.051170
DEBUG - 2026-03-13 15:01:15 --> [REQ_ID=194f7546f098] [REQUEST][START] GET /index.php/Account/Activity
DEBUG - 2026-03-13 15:01:15 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-13 15:01:15 --> [REQ_ID=194f7546f098] [FILTER_BEFORE] /index.php/Account/Activity
DEBUG - 2026-03-13 15:01:15 --> [REQ_ID=194f7546f098] [ROUTE] Controller=\App\Modules\User\Controllers\DashboardController Method=activity
DEBUG - 2026-03-13 15:01:15 --> [REQ_ID=194f7546f098] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Account/Activity
DEBUG - 2026-03-13 15:01:15 --> [CSRF] token name=csrf_test_name hash=a76e54d6761d5b133b9657e800312973
DEBUG - 2026-03-13 15:01:15 --> [REQ_ID=194f7546f098] [REQUEST][END]
INFO - 2026-03-13 15:01:15 --> [REQ_ID=194f7546f098] [PERF] Execution time=0.010002
DEBUG - 2026-03-13 15:01:16 --> [REQ_ID=ed4e1b8e89e6] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-13 15:01:16 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-13 15:01:16 --> [REQ_ID=ed4e1b8e89e6] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-13 15:01:16 --> [REQ_ID=ed4e1b8e89e6] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-13 15:01:16 --> [REQ_ID=ed4e1b8e89e6] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-13 15:01:16 --> [CSRF] token name=csrf_test_name hash=a76e54d6761d5b133b9657e800312973
DEBUG - 2026-03-13 15:01:16 --> [REQ_ID=50c89a720a29] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-13 15:01:16 --> [REQ_ID=50c89a720a29] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-13 15:01:16 --> [REQ_ID=ed4e1b8e89e6] [FILTER_AFTER]
DEBUG - 2026-03-13 15:01:16 --> [REQ_ID=ed4e1b8e89e6] [LIFECYCLE][END] status=200 duration_ms=15.90 memory_delta=0
INFO - 2026-03-13 15:01:16 --> [REQ_ID=50c89a720a29] [PERF] Execution time=0.015700
DEBUG - 2026-03-13 15:01:16 --> [REQ_ID=ed4e1b8e89e6] [REQUEST][END]
INFO - 2026-03-13 15:01:16 --> [REQ_ID=ed4e1b8e89e6] [PERF] Execution time=0.024152
DEBUG - 2026-03-13 15:01:22 --> [REQ_ID=33c0afdd13a4] [REQUEST][START] HEAD /
DEBUG - 2026-03-13 15:01:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-13 15:01:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-13 15:01:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-13 15:01:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-13 15:01:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-13 15:01:27 --> [REQ_ID=730e6480c175] [REQUEST][START] GET /index.php/Account/Security
DEBUG - 2026-03-13 15:01:27 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-13 15:01:27 --> [REQ_ID=730e6480c175] [FILTER_BEFORE] /index.php/Account/Security
DEBUG - 2026-03-13 15:01:27 --> [REQ_ID=730e6480c175] [ROUTE] Controller=\App\Modules\User\Controllers\DashboardController Method=Security
DEBUG - 2026-03-13 15:01:27 --> [REQ_ID=730e6480c175] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Account/Security
DEBUG - 2026-03-13 15:01:27 --> [CSRF] token name=csrf_test_name hash=a76e54d6761d5b133b9657e800312973
DEBUG - 2026-03-13 15:01:27 --> [REQ_ID=730e6480c175] [REQUEST][END]
INFO - 2026-03-13 15:01:27 --> [REQ_ID=730e6480c175] [PERF] Execution time=0.009828
DEBUG - 2026-03-13 15:01:27 --> [REQ_ID=793848b829f4] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-13 15:01:27 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-13 15:01:27 --> [REQ_ID=793848b829f4] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-13 15:01:27 --> [REQ_ID=793848b829f4] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-13 15:01:27 --> [REQ_ID=793848b829f4] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-13 15:01:27 --> [CSRF] token name=csrf_test_name hash=a76e54d6761d5b133b9657e800312973
DEBUG - 2026-03-13 15:01:27 --> [REQ_ID=65f4db622bec] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-13 15:01:27 --> [REQ_ID=65f4db622bec] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-13 15:01:27 --> [REQ_ID=793848b829f4] [FILTER_AFTER]
DEBUG - 2026-03-13 15:01:27 --> [REQ_ID=793848b829f4] [LIFECYCLE][END] status=200 duration_ms=25.53 memory_delta=0
INFO - 2026-03-13 15:01:27 --> [REQ_ID=65f4db622bec] [PERF] Execution time=0.025413
DEBUG - 2026-03-13 15:01:27 --> [REQ_ID=793848b829f4] [REQUEST][END]
INFO - 2026-03-13 15:01:27 --> [REQ_ID=793848b829f4] [PERF] Execution time=0.035370
DEBUG - 2026-03-13 15:01:38 --> [REQ_ID=c1bbea8197bc] [REQUEST][START] GET /index.php/Account/Billing
DEBUG - 2026-03-13 15:01:38 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-13 15:01:38 --> [REQ_ID=c1bbea8197bc] [FILTER_BEFORE] /index.php/Account/Billing
DEBUG - 2026-03-13 15:01:38 --> [REQ_ID=c1bbea8197bc] [ROUTE] Controller=\App\Modules\User\Controllers\DashboardController Method=billing
DEBUG - 2026-03-13 15:01:38 --> [REQ_ID=c1bbea8197bc] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Account/Billing
DEBUG - 2026-03-13 15:01:38 --> [CSRF] token name=csrf_test_name hash=a76e54d6761d5b133b9657e800312973
DEBUG - 2026-03-13 15:01:38 --> [REQ_ID=c1bbea8197bc] [REQUEST][END]
INFO - 2026-03-13 15:01:38 --> [REQ_ID=c1bbea8197bc] [PERF] Execution time=0.011284
DEBUG - 2026-03-13 15:01:38 --> [REQ_ID=09f11bdda7af] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-13 15:01:38 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-13 15:01:38 --> [REQ_ID=09f11bdda7af] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-13 15:01:38 --> [REQ_ID=09f11bdda7af] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-13 15:01:38 --> [REQ_ID=09f11bdda7af] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-13 15:01:38 --> [CSRF] token name=csrf_test_name hash=a76e54d6761d5b133b9657e800312973
DEBUG - 2026-03-13 15:01:38 --> [REQ_ID=2f4a6461303a] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-13 15:01:38 --> [REQ_ID=2f4a6461303a] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-13 15:01:38 --> [REQ_ID=09f11bdda7af] [FILTER_AFTER]
DEBUG - 2026-03-13 15:01:38 --> [REQ_ID=09f11bdda7af] [LIFECYCLE][END] status=200 duration_ms=22.38 memory_delta=0
INFO - 2026-03-13 15:01:38 --> [REQ_ID=2f4a6461303a] [PERF] Execution time=0.022296
DEBUG - 2026-03-13 15:01:38 --> [REQ_ID=09f11bdda7af] [REQUEST][END]
INFO - 2026-03-13 15:01:38 --> [REQ_ID=09f11bdda7af] [PERF] Execution time=0.032039
DEBUG - 2026-03-13 15:01:45 --> [REQ_ID=61c091a92a1f] [REQUEST][START] GET /index.php/Account/Connected-Accounts
DEBUG - 2026-03-13 15:01:45 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-13 15:01:45 --> [REQ_ID=61c091a92a1f] [FILTER_BEFORE] /index.php/Account/Connected-Accounts
DEBUG - 2026-03-13 15:01:45 --> [REQ_ID=61c091a92a1f] [ROUTE] Controller=\App\Modules\User\Controllers\DashboardController Method=connectedAccounts
DEBUG - 2026-03-13 15:01:45 --> [REQ_ID=61c091a92a1f] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Account/Connected-Accounts
DEBUG - 2026-03-13 15:01:45 --> [CSRF] token name=csrf_test_name hash=a76e54d6761d5b133b9657e800312973
DEBUG - 2026-03-13 15:01:45 --> [REQ_ID=61c091a92a1f] [REQUEST][END]
INFO - 2026-03-13 15:01:45 --> [REQ_ID=61c091a92a1f] [PERF] Execution time=0.010003
DEBUG - 2026-03-13 15:01:46 --> [REQ_ID=52a33318617b] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-13 15:01:46 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-13 15:01:46 --> [REQ_ID=52a33318617b] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-13 15:01:46 --> [REQ_ID=52a33318617b] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-13 15:01:46 --> [REQ_ID=52a33318617b] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-13 15:01:46 --> [CSRF] token name=csrf_test_name hash=a76e54d6761d5b133b9657e800312973
DEBUG - 2026-03-13 15:01:46 --> [REQ_ID=d85577c2b057] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-13 15:01:46 --> [REQ_ID=d85577c2b057] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-13 15:01:46 --> [REQ_ID=52a33318617b] [FILTER_AFTER]
DEBUG - 2026-03-13 15:01:46 --> [REQ_ID=52a33318617b] [LIFECYCLE][END] status=200 duration_ms=123.32 memory_delta=0
INFO - 2026-03-13 15:01:46 --> [REQ_ID=d85577c2b057] [PERF] Execution time=0.123276
DEBUG - 2026-03-13 15:01:46 --> [REQ_ID=52a33318617b] [REQUEST][END]
INFO - 2026-03-13 15:01:46 --> [REQ_ID=52a33318617b] [PERF] Execution time=0.132587
DEBUG - 2026-03-13 15:01:57 --> [REQ_ID=d8c30fb20548] [REQUEST][START] GET /index.php/Investments/News
DEBUG - 2026-03-13 15:01:57 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-13 15:01:57 --> [REQ_ID=d8c30fb20548] [FILTER_BEFORE] /index.php/Investments/News
DEBUG - 2026-03-13 15:01:57 --> [REQ_ID=d8c30fb20548] [ROUTE] Controller=closure_route Method=index
DEBUG - 2026-03-13 15:01:57 --> [REQ_ID=d8c30fb20548] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Investments/News
DEBUG - 2026-03-13 15:01:57 --> [CSRF] token name=csrf_test_name hash=a76e54d6761d5b133b9657e800312973
DEBUG - 2026-03-13 15:01:57 --> [REQ_ID=d8c30fb20548] [REQUEST][END]
INFO - 2026-03-13 15:01:57 --> [REQ_ID=d8c30fb20548] [PERF] Execution time=0.009983
DEBUG - 2026-03-13 15:01:57 --> [REQ_ID=736707dc67bf] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-13 15:01:57 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-13 15:01:57 --> [REQ_ID=736707dc67bf] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-13 15:01:57 --> [REQ_ID=736707dc67bf] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-13 15:01:57 --> [REQ_ID=736707dc67bf] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-13 15:01:57 --> [CSRF] token name=csrf_test_name hash=a76e54d6761d5b133b9657e800312973
DEBUG - 2026-03-13 15:01:57 --> [REQ_ID=38d5218f9c7c] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-13 15:01:57 --> [REQ_ID=38d5218f9c7c] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-13 15:01:57 --> [REQ_ID=736707dc67bf] [FILTER_AFTER]
DEBUG - 2026-03-13 15:01:57 --> [REQ_ID=736707dc67bf] [LIFECYCLE][END] status=200 duration_ms=34.65 memory_delta=0
INFO - 2026-03-13 15:01:57 --> [REQ_ID=38d5218f9c7c] [PERF] Execution time=0.034606
DEBUG - 2026-03-13 15:01:57 --> [REQ_ID=736707dc67bf] [REQUEST][END]
INFO - 2026-03-13 15:01:57 --> [REQ_ID=736707dc67bf] [PERF] Execution time=0.045422
DEBUG - 2026-03-13 15:02:04 --> [REQ_ID=b1d020fb9498] [REQUEST][START] GET /index.php/Account/Social-Media
DEBUG - 2026-03-13 15:02:04 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-13 15:02:04 --> [REQ_ID=b1d020fb9498] [FILTER_BEFORE] /index.php/Account/Social-Media
DEBUG - 2026-03-13 15:02:04 --> [REQ_ID=b1d020fb9498] [ROUTE] Controller=\App\Modules\User\Controllers\DashboardController Method=SocialMedia
DEBUG - 2026-03-13 15:02:04 --> [REQ_ID=b1d020fb9498] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Account/Social-Media
DEBUG - 2026-03-13 15:02:04 --> [CSRF] token name=csrf_test_name hash=a76e54d6761d5b133b9657e800312973
DEBUG - 2026-03-13 15:02:04 --> [REQ_ID=b1d020fb9498] [REQUEST][END]
INFO - 2026-03-13 15:02:04 --> [REQ_ID=b1d020fb9498] [PERF] Execution time=0.010775
DEBUG - 2026-03-13 15:02:05 --> [REQ_ID=7aa7f11ca886] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-13 15:02:05 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-13 15:02:05 --> [REQ_ID=7aa7f11ca886] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-13 15:02:05 --> [REQ_ID=7aa7f11ca886] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-13 15:02:05 --> [REQ_ID=7aa7f11ca886] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-13 15:02:05 --> [CSRF] token name=csrf_test_name hash=a76e54d6761d5b133b9657e800312973
DEBUG - 2026-03-13 15:02:05 --> [REQ_ID=b461e2a04147] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-13 15:02:05 --> [REQ_ID=b461e2a04147] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-13 15:02:05 --> [REQ_ID=7aa7f11ca886] [FILTER_AFTER]
DEBUG - 2026-03-13 15:02:05 --> [REQ_ID=7aa7f11ca886] [LIFECYCLE][END] status=200 duration_ms=33.22 memory_delta=0
INFO - 2026-03-13 15:02:05 --> [REQ_ID=b461e2a04147] [PERF] Execution time=0.033020
DEBUG - 2026-03-13 15:02:05 --> [REQ_ID=7aa7f11ca886] [REQUEST][END]
INFO - 2026-03-13 15:02:05 --> [REQ_ID=7aa7f11ca886] [PERF] Execution time=0.042364
DEBUG - 2026-03-13 15:02:16 --> [REQ_ID=77d2aa310b75] [REQUEST][START] GET /index.php/Account
DEBUG - 2026-03-13 15:02:16 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-13 15:02:16 --> [REQ_ID=77d2aa310b75] [FILTER_BEFORE] /index.php/Account
DEBUG - 2026-03-13 15:02:16 --> [REQ_ID=77d2aa310b75] [ROUTE] Controller=\App\Modules\User\Controllers\DashboardController Method=account
DEBUG - 2026-03-13 15:02:16 --> [REQ_ID=77d2aa310b75] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Account
DEBUG - 2026-03-13 15:02:16 --> [CSRF] token name=csrf_test_name hash=a76e54d6761d5b133b9657e800312973
DEBUG - 2026-03-13 15:02:16 --> [REQ_ID=77d2aa310b75] [REQUEST][END]
INFO - 2026-03-13 15:02:16 --> [REQ_ID=77d2aa310b75] [PERF] Execution time=0.010024
DEBUG - 2026-03-13 15:02:16 --> [REQ_ID=4c4ba035e62f] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-13 15:02:16 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-13 15:02:16 --> [REQ_ID=4c4ba035e62f] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-13 15:02:16 --> [REQ_ID=4c4ba035e62f] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-13 15:02:16 --> [REQ_ID=4c4ba035e62f] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-13 15:02:16 --> [CSRF] token name=csrf_test_name hash=a76e54d6761d5b133b9657e800312973
DEBUG - 2026-03-13 15:02:16 --> [REQ_ID=9c66b64ee47c] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-13 15:02:16 --> [REQ_ID=9c66b64ee47c] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-13 15:02:16 --> [REQ_ID=4c4ba035e62f] [FILTER_AFTER]
DEBUG - 2026-03-13 15:02:16 --> [REQ_ID=4c4ba035e62f] [LIFECYCLE][END] status=200 duration_ms=32.19 memory_delta=0
INFO - 2026-03-13 15:02:16 --> [REQ_ID=9c66b64ee47c] [PERF] Execution time=0.031952
DEBUG - 2026-03-13 15:02:16 --> [REQ_ID=4c4ba035e62f] [REQUEST][END]
INFO - 2026-03-13 15:02:16 --> [REQ_ID=4c4ba035e62f] [PERF] Execution time=0.041844
DEBUG - 2026-03-13 15:02:24 --> [REQ_ID=abd3a8ab5d3b] [REQUEST][START] GET /index.php/Customer-Support
DEBUG - 2026-03-13 15:02:24 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-13 15:02:24 --> [REQ_ID=abd3a8ab5d3b] [FILTER_BEFORE] /index.php/Customer-Support
DEBUG - 2026-03-13 15:02:24 --> [REQ_ID=abd3a8ab5d3b] [ROUTE] Controller=\App\Controllers\App\Modules\Support\Controllers\SupportController Method=index
DEBUG - 2026-03-13 15:02:24 --> [REQ_ID=abd3a8ab5d3b] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Customer-Support
DEBUG - 2026-03-13 15:02:24 --> [CSRF] token name=csrf_test_name hash=a76e54d6761d5b133b9657e800312973
DEBUG - 2026-03-13 15:02:24 --> [REQ_ID=abd3a8ab5d3b] [REQUEST][END]
INFO - 2026-03-13 15:02:24 --> [REQ_ID=abd3a8ab5d3b] [PERF] Execution time=0.010277
DEBUG - 2026-03-13 15:02:24 --> [REQ_ID=86e04e1eb820] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-13 15:02:24 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-13 15:02:24 --> [REQ_ID=86e04e1eb820] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-13 15:02:24 --> [REQ_ID=86e04e1eb820] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-13 15:02:24 --> [REQ_ID=86e04e1eb820] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-13 15:02:24 --> [CSRF] token name=csrf_test_name hash=a76e54d6761d5b133b9657e800312973
DEBUG - 2026-03-13 15:02:24 --> [REQ_ID=53f825160def] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-13 15:02:24 --> [REQ_ID=53f825160def] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-13 15:02:24 --> [REQ_ID=86e04e1eb820] [FILTER_AFTER]
DEBUG - 2026-03-13 15:02:24 --> [REQ_ID=86e04e1eb820] [LIFECYCLE][END] status=200 duration_ms=16.33 memory_delta=0
INFO - 2026-03-13 15:02:24 --> [REQ_ID=53f825160def] [PERF] Execution time=0.016140
DEBUG - 2026-03-13 15:02:24 --> [REQ_ID=86e04e1eb820] [REQUEST][END]
INFO - 2026-03-13 15:02:24 --> [REQ_ID=86e04e1eb820] [PERF] Execution time=0.025929
DEBUG - 2026-03-13 15:06:22 --> [REQ_ID=735ee6b07e17] [REQUEST][START] HEAD /
DEBUG - 2026-03-13 15:06:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-13 15:06:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-13 15:06:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-13 15:06:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-13 15:06:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-13 15:11:22 --> [REQ_ID=11fd1484feb9] [REQUEST][START] HEAD /
DEBUG - 2026-03-13 15:11:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-13 15:11:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-13 15:11:23 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-13 15:11:23 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-13 15:11:23 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-13 15:15:01 --> [REQ_ID=0544c02d9488] [REQUEST][START] GET /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-13 15:15:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-13 15:15:01 --> [REQ_ID=0544c02d9488] [FILTER_BEFORE] /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-13 15:15:01 --> [REQ_ID=0544c02d9488] [ROUTE] Controller=\App\Modules\APIs\Controllers\AlertsAPIController Method=fetchEmailAlerts
DEBUG - 2026-03-13 15:15:01 --> [REQ_ID=0544c02d9488] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-13 15:15:01 --> [REQ_ID=0544c02d9488] [REQUEST][END]
INFO - 2026-03-13 15:15:01 --> [REQ_ID=0544c02d9488] [PERF] Execution time=0.046353
DEBUG - 2026-03-13 15:16:22 --> [REQ_ID=856e51e66cc9] [REQUEST][START] HEAD /
DEBUG - 2026-03-13 15:16:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-13 15:16:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-13 15:16:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-13 15:16:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-13 15:16:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-13 15:21:22 --> [REQ_ID=3f2ac9d2b6b3] [REQUEST][START] HEAD /
DEBUG - 2026-03-13 15:21:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-13 15:21:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-13 15:21:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-13 15:21:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-13 15:21:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-13 15:26:22 --> [REQ_ID=920340cd729a] [REQUEST][START] HEAD /
DEBUG - 2026-03-13 15:26:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-13 15:26:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-13 15:26:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-13 15:26:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-13 15:26:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-13 15:31:22 --> [REQ_ID=d9c208eed2a1] [REQUEST][START] HEAD /
DEBUG - 2026-03-13 15:31:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-13 15:31:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-13 15:31:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-13 15:31:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-13 15:31:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-13 15:36:22 --> [REQ_ID=908a1c51b29d] [REQUEST][START] HEAD /
DEBUG - 2026-03-13 15:36:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-13 15:36:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-13 15:36:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-13 15:36:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-13 15:36:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-13 15:41:22 --> [REQ_ID=0ef8acea9e5b] [REQUEST][START] HEAD /
DEBUG - 2026-03-13 15:41:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-13 15:41:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-13 15:41:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-13 15:41:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-13 15:41:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-13 15:46:22 --> [REQ_ID=93ab38a4e565] [REQUEST][START] HEAD /
DEBUG - 2026-03-13 15:46:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-13 15:46:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-13 15:46:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-13 15:46:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-13 15:46:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-13 15:51:22 --> [REQ_ID=f74711e71786] [REQUEST][START] HEAD /
DEBUG - 2026-03-13 15:51:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-13 15:51:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-13 15:51:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-13 15:51:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-13 15:51:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-13 15:56:22 --> [REQ_ID=8117099f14b2] [REQUEST][START] HEAD /
DEBUG - 2026-03-13 15:56:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-13 15:56:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-13 15:56:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-13 15:56:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-13 15:56:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-13 16:00:01 --> [REQ_ID=07a220d75df3] [REQUEST][START] GET /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-13 16:00:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-13 16:00:01 --> [REQ_ID=07a220d75df3] [FILTER_BEFORE] /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-13 16:00:01 --> [REQ_ID=07a220d75df3] [ROUTE] Controller=\App\Modules\Management\Controllers\ManagementAPIController Method=Run_CRON_Tasks
DEBUG - 2026-03-13 16:00:01 --> [REQ_ID=07a220d75df3] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-13 16:00:01 --> [REQ_ID=07a220d75df3] [REQUEST][END]
INFO - 2026-03-13 16:00:01 --> [REQ_ID=07a220d75df3] [PERF] Execution time=0.039828
DEBUG - 2026-03-13 16:01:22 --> [REQ_ID=3d731e18056b] [REQUEST][START] HEAD /
DEBUG - 2026-03-13 16:01:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-13 16:01:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-13 16:01:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-13 16:01:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-13 16:01:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-13 16:06:22 --> [REQ_ID=24e3e91c83cb] [REQUEST][START] HEAD /
DEBUG - 2026-03-13 16:06:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-13 16:06:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-13 16:06:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-13 16:06:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-13 16:06:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-13 16:11:22 --> [REQ_ID=dd46abd2e44b] [REQUEST][START] HEAD /
DEBUG - 2026-03-13 16:11:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-13 16:11:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-13 16:11:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-13 16:11:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-13 16:11:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-13 16:15:01 --> [REQ_ID=2e8a5ba94122] [REQUEST][START] GET /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-13 16:15:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-13 16:15:01 --> [REQ_ID=2e8a5ba94122] [FILTER_BEFORE] /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-13 16:15:01 --> [REQ_ID=2e8a5ba94122] [ROUTE] Controller=\App\Modules\APIs\Controllers\AlertsAPIController Method=fetchEmailAlerts
DEBUG - 2026-03-13 16:15:01 --> [REQ_ID=2e8a5ba94122] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-13 16:15:01 --> [REQ_ID=2e8a5ba94122] [REQUEST][END]
INFO - 2026-03-13 16:15:01 --> [REQ_ID=2e8a5ba94122] [PERF] Execution time=0.044845
DEBUG - 2026-03-13 16:16:22 --> [REQ_ID=04ae19812742] [REQUEST][START] HEAD /
DEBUG - 2026-03-13 16:16:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-13 16:16:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-13 16:16:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-13 16:16:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-13 16:16:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-13 16:21:22 --> [REQ_ID=a8f3570b23f7] [REQUEST][START] HEAD /
DEBUG - 2026-03-13 16:21:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-13 16:21:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-13 16:21:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-13 16:21:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-13 16:21:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-13 16:22:14 --> [REQ_ID=26b99914eac3] [REQUEST][START] GET /
DEBUG - 2026-03-13 16:22:14 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-13 16:22:14 --> [REQ_ID=26b99914eac3] [FILTER_BEFORE] /
DEBUG - 2026-03-13 16:22:14 --> [REQ_ID=26b99914eac3] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-13 16:22:14 --> [REQ_ID=26b99914eac3] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-13 16:22:14 --> [CSRF] token name=csrf_test_name hash=dd8890e3e4992395ea98842873cab34c
DEBUG - 2026-03-13 16:22:14 --> [REQ_ID=dba85b48f200] [INIT] App\Controllers\Home::GET
INFO - 2026-03-13 16:22:14 --> [REQ_ID=dba85b48f200] [MEMORY][controller-start] 4194304
INFO - 2026-03-13 16:22:14 --> [REQ_ID=dba85b48f200] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-13 16:22:14 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-13 16:22:15 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-03-13 16:22:15 --> [REQ_ID=dba85b48f200] [VIEW_RENDER] themes/public/home
INFO - 2026-03-13 16:22:15 --> [REQ_ID=dba85b48f200] [MEMORY][commonData:start] 8388608
INFO - 2026-03-13 16:22:15 --> themesMemory usage: 8388608
DEBUG - 2026-03-13 16:22:15 --> [MetaService] slug= pageName=Home cacheHit= path=DB
DEBUG - 2026-03-13 16:22:15 --> [REQ_ID=26b99914eac3] [FILTER_AFTER]
DEBUG - 2026-03-13 16:22:15 --> [REQ_ID=26b99914eac3] [LIFECYCLE][END] status=200 duration_ms=773.01 memory_delta=4194304
INFO - 2026-03-13 16:22:15 --> [REQ_ID=dba85b48f200] [PERF] Execution time=0.771053
DEBUG - 2026-03-13 16:22:15 --> [REQ_ID=26b99914eac3] [REQUEST][END]
INFO - 2026-03-13 16:22:15 --> [REQ_ID=26b99914eac3] [PERF] Execution time=0.791818
DEBUG - 2026-03-13 16:22:15 --> [REQ_ID=a2bbb9b41845] [REQUEST][START] GET /index.php
DEBUG - 2026-03-13 16:22:15 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-13 16:22:15 --> [REQ_ID=a2bbb9b41845] [FILTER_BEFORE] /index.php
DEBUG - 2026-03-13 16:22:15 --> [REQ_ID=a2bbb9b41845] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-13 16:22:15 --> [REQ_ID=a2bbb9b41845] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-13 16:22:15 --> [CSRF] token name=csrf_test_name hash=dd8890e3e4992395ea98842873cab34c
DEBUG - 2026-03-13 16:22:15 --> [REQ_ID=c574a7b51e64] [INIT] App\Controllers\Home::GET
INFO - 2026-03-13 16:22:15 --> [REQ_ID=c574a7b51e64] [MEMORY][controller-start] 6291456
INFO - 2026-03-13 16:22:15 --> [REQ_ID=c574a7b51e64] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-13 16:22:15 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-13 16:22:16 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
DEBUG - 2026-03-13 16:22:16 --> [REQ_ID=c574a7b51e64] [VIEW_RENDER] themes/public/home
INFO - 2026-03-13 16:22:16 --> [REQ_ID=c574a7b51e64] [MEMORY][commonData:start] 8388608
INFO - 2026-03-13 16:22:16 --> themesMemory usage: 8388608
DEBUG - 2026-03-13 16:22:16 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-13 16:22:16 --> [REQ_ID=a2bbb9b41845] [FILTER_AFTER]
DEBUG - 2026-03-13 16:22:16 --> [REQ_ID=a2bbb9b41845] [LIFECYCLE][END] status=200 duration_ms=666.79 memory_delta=2097152
INFO - 2026-03-13 16:22:16 --> [REQ_ID=c574a7b51e64] [PERF] Execution time=0.666597
DEBUG - 2026-03-13 16:22:16 --> [REQ_ID=a2bbb9b41845] [REQUEST][END]
INFO - 2026-03-13 16:22:16 --> [REQ_ID=a2bbb9b41845] [PERF] Execution time=0.675816
DEBUG - 2026-03-13 16:22:16 --> [REQ_ID=d617b8b2b521] [REQUEST][START] GET /
DEBUG - 2026-03-13 16:22:16 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-13 16:22:16 --> [REQ_ID=d617b8b2b521] [FILTER_BEFORE] /
DEBUG - 2026-03-13 16:22:16 --> [REQ_ID=d617b8b2b521] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-13 16:22:16 --> [REQ_ID=d617b8b2b521] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-13 16:22:16 --> [CSRF] token name=csrf_test_name hash=dd8890e3e4992395ea98842873cab34c
DEBUG - 2026-03-13 16:22:16 --> [REQ_ID=dcdddf710cf5] [INIT] App\Controllers\Home::GET
INFO - 2026-03-13 16:22:16 --> [REQ_ID=dcdddf710cf5] [MEMORY][controller-start] 6291456
INFO - 2026-03-13 16:22:16 --> [REQ_ID=dcdddf710cf5] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-13 16:22:16 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-13 16:22:17 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
DEBUG - 2026-03-13 16:22:17 --> [REQ_ID=dcdddf710cf5] [VIEW_RENDER] themes/public/home
INFO - 2026-03-13 16:22:17 --> [REQ_ID=dcdddf710cf5] [MEMORY][commonData:start] 8388608
INFO - 2026-03-13 16:22:17 --> themesMemory usage: 8388608
DEBUG - 2026-03-13 16:22:17 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-13 16:22:17 --> [REQ_ID=d617b8b2b521] [FILTER_AFTER]
DEBUG - 2026-03-13 16:22:17 --> [REQ_ID=d617b8b2b521] [LIFECYCLE][END] status=200 duration_ms=656.26 memory_delta=2097152
INFO - 2026-03-13 16:22:17 --> [REQ_ID=dcdddf710cf5] [PERF] Execution time=0.656078
DEBUG - 2026-03-13 16:22:17 --> [REQ_ID=d617b8b2b521] [REQUEST][END]
INFO - 2026-03-13 16:22:17 --> [REQ_ID=d617b8b2b521] [PERF] Execution time=0.665042
DEBUG - 2026-03-13 16:22:17 --> [REQ_ID=503d304fb39d] [REQUEST][START] GET /index.php/Blog
DEBUG - 2026-03-13 16:22:17 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-13 16:22:17 --> [REQ_ID=503d304fb39d] [FILTER_BEFORE] /index.php/Blog
DEBUG - 2026-03-13 16:22:17 --> [REQ_ID=503d304fb39d] [ROUTE] Controller=\App\Modules\Blog\Controllers\BlogController Method=index
DEBUG - 2026-03-13 16:22:17 --> [REQ_ID=503d304fb39d] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Blog
DEBUG - 2026-03-13 16:22:17 --> [CSRF] token name=csrf_test_name hash=dd8890e3e4992395ea98842873cab34c
DEBUG - 2026-03-13 16:22:17 --> [REQ_ID=51b34ba67172] [INIT] App\Modules\Blog\Controllers\BlogController::GET
INFO - 2026-03-13 16:22:17 --> [REQ_ID=51b34ba67172] [MEMORY][controller-start] 6291456
DEBUG - 2026-03-13 16:22:17 --> [REQ_ID=51b34ba67172] [METHOD_ENTRY] index
DEBUG - 2026-03-13 16:22:17 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-13 16:22:17 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-13 16:22:17 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-13 16:22:17 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-13 16:22:17 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-13 16:22:17 --> MyMICoin: guest context detected; skipping user-specific preload.
INFO - 2026-03-13 16:22:17 --> [REQ_ID=51b34ba67172] [MEMORY][commonData:start] 6291456
INFO - 2026-03-13 16:22:17 --> [REQ_ID=51b34ba67172] [PERF] Execution time=0.059855
DEBUG - 2026-03-13 16:22:17 --> [REQ_ID=319ec7492c12] [REQUEST][START] GET /
DEBUG - 2026-03-13 16:22:17 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-13 16:22:17 --> [REQ_ID=319ec7492c12] [FILTER_BEFORE] /
DEBUG - 2026-03-13 16:22:17 --> [REQ_ID=319ec7492c12] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-13 16:22:17 --> [REQ_ID=319ec7492c12] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-13 16:22:17 --> [CSRF] token name=csrf_test_name hash=dd8890e3e4992395ea98842873cab34c
DEBUG - 2026-03-13 16:22:17 --> [REQ_ID=6bfd54e75b4e] [INIT] App\Controllers\Home::GET
INFO - 2026-03-13 16:22:17 --> [REQ_ID=6bfd54e75b4e] [MEMORY][controller-start] 6291456
INFO - 2026-03-13 16:22:17 --> [REQ_ID=6bfd54e75b4e] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-13 16:22:17 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-13 16:22:18 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
DEBUG - 2026-03-13 16:22:18 --> [REQ_ID=6bfd54e75b4e] [VIEW_RENDER] themes/public/home
INFO - 2026-03-13 16:22:18 --> [REQ_ID=6bfd54e75b4e] [MEMORY][commonData:start] 8388608
INFO - 2026-03-13 16:22:18 --> themesMemory usage: 8388608
DEBUG - 2026-03-13 16:22:18 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-13 16:22:18 --> [REQ_ID=319ec7492c12] [FILTER_AFTER]
DEBUG - 2026-03-13 16:22:18 --> [REQ_ID=319ec7492c12] [LIFECYCLE][END] status=200 duration_ms=624.51 memory_delta=2097152
INFO - 2026-03-13 16:22:18 --> [REQ_ID=6bfd54e75b4e] [PERF] Execution time=0.624313
DEBUG - 2026-03-13 16:22:18 --> [REQ_ID=319ec7492c12] [REQUEST][END]
INFO - 2026-03-13 16:22:18 --> [REQ_ID=319ec7492c12] [PERF] Execution time=0.633455
DEBUG - 2026-03-13 16:22:18 --> [REQ_ID=a892dcd32813] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-13 16:22:18 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-13 16:22:18 --> [REQ_ID=a892dcd32813] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-13 16:22:18 --> [REQ_ID=a892dcd32813] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-13 16:22:18 --> [REQ_ID=a892dcd32813] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-13 16:22:18 --> [CSRF] token name=csrf_test_name hash=dd8890e3e4992395ea98842873cab34c
DEBUG - 2026-03-13 16:22:18 --> [REQ_ID=49501a931f84] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-13 16:22:18 --> [REQ_ID=49501a931f84] [MEMORY][controller-start] 6291456
DEBUG - 2026-03-13 16:22:18 --> [REQ_ID=a892dcd32813] [FILTER_AFTER]
DEBUG - 2026-03-13 16:22:18 --> [REQ_ID=a892dcd32813] [LIFECYCLE][END] status=200 duration_ms=33.24 memory_delta=0
INFO - 2026-03-13 16:22:18 --> [REQ_ID=49501a931f84] [PERF] Execution time=0.032922
DEBUG - 2026-03-13 16:22:18 --> [REQ_ID=a892dcd32813] [REQUEST][END]
INFO - 2026-03-13 16:22:18 --> [REQ_ID=a892dcd32813] [PERF] Execution time=0.045111
DEBUG - 2026-03-13 16:22:19 --> [REQ_ID=2127a2c0528b] [REQUEST][START] GET /
DEBUG - 2026-03-13 16:22:19 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-13 16:22:19 --> [REQ_ID=2127a2c0528b] [FILTER_BEFORE] /
DEBUG - 2026-03-13 16:22:19 --> [REQ_ID=2127a2c0528b] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-13 16:22:19 --> [REQ_ID=2127a2c0528b] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-13 16:22:19 --> [CSRF] token name=csrf_test_name hash=dd8890e3e4992395ea98842873cab34c
DEBUG - 2026-03-13 16:22:19 --> [REQ_ID=7d0bfb6974d1] [INIT] App\Controllers\Home::GET
INFO - 2026-03-13 16:22:19 --> [REQ_ID=7d0bfb6974d1] [MEMORY][controller-start] 4194304
INFO - 2026-03-13 16:22:19 --> [REQ_ID=7d0bfb6974d1] [MEMORY][commonData:start] 4194304
DEBUG - 2026-03-13 16:22:19 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-13 16:22:19 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
DEBUG - 2026-03-13 16:22:19 --> [REQ_ID=7d0bfb6974d1] [VIEW_RENDER] themes/public/home
INFO - 2026-03-13 16:22:19 --> [REQ_ID=7d0bfb6974d1] [MEMORY][commonData:start] 8388608
INFO - 2026-03-13 16:22:19 --> themesMemory usage: 8388608
DEBUG - 2026-03-13 16:22:19 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-13 16:22:19 --> [REQ_ID=2127a2c0528b] [FILTER_AFTER]
DEBUG - 2026-03-13 16:22:19 --> [REQ_ID=2127a2c0528b] [LIFECYCLE][END] status=200 duration_ms=616.50 memory_delta=4194304
INFO - 2026-03-13 16:22:19 --> [REQ_ID=7d0bfb6974d1] [PERF] Execution time=0.616305
DEBUG - 2026-03-13 16:22:19 --> [REQ_ID=2127a2c0528b] [REQUEST][END]
INFO - 2026-03-13 16:22:19 --> [REQ_ID=2127a2c0528b] [PERF] Execution time=0.625098
DEBUG - 2026-03-13 16:22:20 --> [REQ_ID=32397bcd01c4] [REQUEST][START] GET /index.php/register
DEBUG - 2026-03-13 16:22:20 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-13 16:22:20 --> [REQ_ID=32397bcd01c4] [FILTER_BEFORE] /index.php/register
DEBUG - 2026-03-13 16:22:20 --> [REQ_ID=32397bcd01c4] [ROUTE] Controller=\App\Controllers\AuthController Method=register
DEBUG - 2026-03-13 16:22:20 --> [REQ_ID=32397bcd01c4] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/register
DEBUG - 2026-03-13 16:22:20 --> [CSRF] token name=csrf_test_name hash=dd8890e3e4992395ea98842873cab34c
DEBUG - 2026-03-13 16:22:20 --> [REQ_ID=299bbd1f82af] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-13 16:22:20 --> [REQ_ID=299bbd1f82af] [MEMORY][controller-start] 6291456
INFO - 2026-03-13 16:22:20 --> [REGISTRATION] Form loaded
INFO - 2026-03-13 16:22:20 --> [REQ_ID=299bbd1f82af] [PERF] Execution time=0.016836
DEBUG - 2026-03-13 16:22:20 --> [REQ_ID=c5bcad95909a] [REQUEST][START] GET /index.php/Legal/Terms-And-Conditions
DEBUG - 2026-03-13 16:22:20 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-13 16:22:20 --> [REQ_ID=c5bcad95909a] [FILTER_BEFORE] /index.php/Legal/Terms-And-Conditions
DEBUG - 2026-03-13 16:22:20 --> [REQ_ID=c5bcad95909a] [ROUTE] Controller=\App\Controllers\Home Method=terms
DEBUG - 2026-03-13 16:22:20 --> [REQ_ID=c5bcad95909a] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Legal/Terms-And-Conditions
DEBUG - 2026-03-13 16:22:20 --> [CSRF] token name=csrf_test_name hash=dd8890e3e4992395ea98842873cab34c
DEBUG - 2026-03-13 16:22:20 --> [REQ_ID=c5bcad95909a] [REQUEST][END]
INFO - 2026-03-13 16:22:20 --> [REQ_ID=c5bcad95909a] [PERF] Execution time=0.015164
DEBUG - 2026-03-13 16:22:20 --> [REQ_ID=31e65635ec2c] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-13 16:22:20 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-13 16:22:20 --> [REQ_ID=31e65635ec2c] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-13 16:22:20 --> [REQ_ID=31e65635ec2c] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-13 16:22:20 --> [REQ_ID=31e65635ec2c] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-13 16:22:20 --> [CSRF] token name=csrf_test_name hash=dd8890e3e4992395ea98842873cab34c
DEBUG - 2026-03-13 16:22:20 --> [REQ_ID=bb1392ca41b4] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-13 16:22:20 --> [REQ_ID=bb1392ca41b4] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-13 16:22:20 --> [REQ_ID=31e65635ec2c] [FILTER_AFTER]
DEBUG - 2026-03-13 16:22:20 --> [REQ_ID=31e65635ec2c] [LIFECYCLE][END] status=200 duration_ms=19.56 memory_delta=0
INFO - 2026-03-13 16:22:20 --> [REQ_ID=bb1392ca41b4] [PERF] Execution time=0.019311
DEBUG - 2026-03-13 16:22:20 --> [REQ_ID=31e65635ec2c] [REQUEST][END]
INFO - 2026-03-13 16:22:20 --> [REQ_ID=31e65635ec2c] [PERF] Execution time=0.029195
DEBUG - 2026-03-13 16:22:20 --> [REQ_ID=0190b623282e] [REQUEST][START] GET /index.php/Support
DEBUG - 2026-03-13 16:22:20 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-13 16:22:20 --> [REQ_ID=0190b623282e] [FILTER_BEFORE] /index.php/Support
DEBUG - 2026-03-13 16:22:20 --> [REQ_ID=0190b623282e] [ROUTE] Controller=\App\Modules\Support\Controllers\SupportController Method=index
DEBUG - 2026-03-13 16:22:20 --> [REQ_ID=0190b623282e] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Support
DEBUG - 2026-03-13 16:22:20 --> [CSRF] token name=csrf_test_name hash=dd8890e3e4992395ea98842873cab34c
DEBUG - 2026-03-13 16:22:20 --> [REQ_ID=5508987ea053] [INIT] App\Modules\Support\Controllers\SupportController::GET
INFO - 2026-03-13 16:22:20 --> [REQ_ID=5508987ea053] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-13 16:22:20 --> [REQ_ID=5508987ea053] [METHOD_ENTRY] index
DEBUG - 2026-03-13 16:22:20 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-13 16:22:20 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-13 16:22:20 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-13 16:22:20 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-13 16:22:20 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-13 16:22:20 --> MyMICoin: guest context detected; skipping user-specific preload.
INFO - 2026-03-13 16:22:20 --> [REQ_ID=5508987ea053] [MEMORY][commonData:start] 4194304
DEBUG - 2026-03-13 16:22:20 --> [REQ_ID=5508987ea053] [VIEW_RENDER] SupportModule\Views\Support\index
INFO - 2026-03-13 16:22:20 --> [REQ_ID=5508987ea053] [MEMORY][commonData:start] 4194304
INFO - 2026-03-13 16:22:20 --> themesMemory usage: 4194304
DEBUG - 2026-03-13 16:22:20 --> [REQ_ID=0190b623282e] [FILTER_AFTER]
DEBUG - 2026-03-13 16:22:20 --> [REQ_ID=0190b623282e] [LIFECYCLE][END] status=200 duration_ms=56.36 memory_delta=0
INFO - 2026-03-13 16:22:20 --> [REQ_ID=5508987ea053] [PERF] Execution time=0.055875
DEBUG - 2026-03-13 16:22:20 --> [REQ_ID=0190b623282e] [REQUEST][END]
INFO - 2026-03-13 16:22:20 --> [REQ_ID=0190b623282e] [PERF] Execution time=0.070055
DEBUG - 2026-03-13 16:22:21 --> [REQ_ID=dc9f77a35a13] [REQUEST][START] GET /index.php/Account/Activity
DEBUG - 2026-03-13 16:22:21 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-13 16:22:21 --> [REQ_ID=dc9f77a35a13] [FILTER_BEFORE] /index.php/Account/Activity
DEBUG - 2026-03-13 16:22:21 --> [REQ_ID=dc9f77a35a13] [ROUTE] Controller=\App\Modules\User\Controllers\DashboardController Method=activity
DEBUG - 2026-03-13 16:22:21 --> [REQ_ID=dc9f77a35a13] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Account/Activity
DEBUG - 2026-03-13 16:22:21 --> [CSRF] token name=csrf_test_name hash=dd8890e3e4992395ea98842873cab34c
DEBUG - 2026-03-13 16:22:21 --> [REQ_ID=dc9f77a35a13] [REQUEST][END]
INFO - 2026-03-13 16:22:21 --> [REQ_ID=dc9f77a35a13] [PERF] Execution time=0.012955
DEBUG - 2026-03-13 16:22:21 --> [REQ_ID=55d0ca6079b6] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-13 16:22:21 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-13 16:22:21 --> [REQ_ID=55d0ca6079b6] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-13 16:22:21 --> [REQ_ID=55d0ca6079b6] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-13 16:22:21 --> [REQ_ID=55d0ca6079b6] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-13 16:22:21 --> [CSRF] token name=csrf_test_name hash=dd8890e3e4992395ea98842873cab34c
DEBUG - 2026-03-13 16:22:21 --> [REQ_ID=e39afffd37a4] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-13 16:22:21 --> [REQ_ID=e39afffd37a4] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-13 16:22:21 --> [REQ_ID=55d0ca6079b6] [FILTER_AFTER]
DEBUG - 2026-03-13 16:22:21 --> [REQ_ID=55d0ca6079b6] [LIFECYCLE][END] status=200 duration_ms=20.64 memory_delta=0
INFO - 2026-03-13 16:22:21 --> [REQ_ID=e39afffd37a4] [PERF] Execution time=0.020622
DEBUG - 2026-03-13 16:22:21 --> [REQ_ID=55d0ca6079b6] [REQUEST][END]
INFO - 2026-03-13 16:22:21 --> [REQ_ID=55d0ca6079b6] [PERF] Execution time=0.029802
DEBUG - 2026-03-13 16:22:21 --> [REQ_ID=984e83b0c91b] [REQUEST][START] GET /index.php/Customer-Support
DEBUG - 2026-03-13 16:22:21 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-13 16:22:21 --> [REQ_ID=984e83b0c91b] [FILTER_BEFORE] /index.php/Customer-Support
DEBUG - 2026-03-13 16:22:21 --> [REQ_ID=984e83b0c91b] [ROUTE] Controller=\App\Controllers\App\Modules\Support\Controllers\SupportController Method=index
DEBUG - 2026-03-13 16:22:21 --> [REQ_ID=984e83b0c91b] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Customer-Support
DEBUG - 2026-03-13 16:22:21 --> [CSRF] token name=csrf_test_name hash=dd8890e3e4992395ea98842873cab34c
DEBUG - 2026-03-13 16:22:21 --> [REQ_ID=984e83b0c91b] [REQUEST][END]
INFO - 2026-03-13 16:22:21 --> [REQ_ID=984e83b0c91b] [PERF] Execution time=0.009890
DEBUG - 2026-03-13 16:22:21 --> [REQ_ID=0aeb28e35fca] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-13 16:22:21 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-13 16:22:21 --> [REQ_ID=0aeb28e35fca] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-13 16:22:21 --> [REQ_ID=0aeb28e35fca] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-13 16:22:21 --> [REQ_ID=0aeb28e35fca] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-13 16:22:21 --> [CSRF] token name=csrf_test_name hash=dd8890e3e4992395ea98842873cab34c
DEBUG - 2026-03-13 16:22:21 --> [REQ_ID=9f1bcbc3e450] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-13 16:22:21 --> [REQ_ID=9f1bcbc3e450] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-13 16:22:21 --> [REQ_ID=0aeb28e35fca] [FILTER_AFTER]
DEBUG - 2026-03-13 16:22:21 --> [REQ_ID=0aeb28e35fca] [LIFECYCLE][END] status=200 duration_ms=17.72 memory_delta=0
INFO - 2026-03-13 16:22:21 --> [REQ_ID=9f1bcbc3e450] [PERF] Execution time=0.017584
DEBUG - 2026-03-13 16:22:21 --> [REQ_ID=0aeb28e35fca] [REQUEST][END]
INFO - 2026-03-13 16:22:21 --> [REQ_ID=0aeb28e35fca] [PERF] Execution time=0.027780
DEBUG - 2026-03-13 16:22:22 --> [REQ_ID=0801119d3302] [REQUEST][START] GET /index.php/Account/Connected-Accounts
DEBUG - 2026-03-13 16:22:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-13 16:22:22 --> [REQ_ID=0801119d3302] [FILTER_BEFORE] /index.php/Account/Connected-Accounts
DEBUG - 2026-03-13 16:22:22 --> [REQ_ID=0801119d3302] [ROUTE] Controller=\App\Modules\User\Controllers\DashboardController Method=connectedAccounts
DEBUG - 2026-03-13 16:22:22 --> [REQ_ID=0801119d3302] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Account/Connected-Accounts
DEBUG - 2026-03-13 16:22:22 --> [CSRF] token name=csrf_test_name hash=dd8890e3e4992395ea98842873cab34c
DEBUG - 2026-03-13 16:22:22 --> [REQ_ID=0801119d3302] [REQUEST][END]
INFO - 2026-03-13 16:22:22 --> [REQ_ID=0801119d3302] [PERF] Execution time=0.010113
DEBUG - 2026-03-13 16:22:22 --> [REQ_ID=33450d09a247] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-13 16:22:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-13 16:22:22 --> [REQ_ID=33450d09a247] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-13 16:22:22 --> [REQ_ID=33450d09a247] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-13 16:22:22 --> [REQ_ID=33450d09a247] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-13 16:22:22 --> [CSRF] token name=csrf_test_name hash=dd8890e3e4992395ea98842873cab34c
DEBUG - 2026-03-13 16:22:22 --> [REQ_ID=44cdca4ff4e8] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-13 16:22:22 --> [REQ_ID=44cdca4ff4e8] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-13 16:22:22 --> [REQ_ID=33450d09a247] [FILTER_AFTER]
DEBUG - 2026-03-13 16:22:22 --> [REQ_ID=33450d09a247] [LIFECYCLE][END] status=200 duration_ms=20.13 memory_delta=0
INFO - 2026-03-13 16:22:22 --> [REQ_ID=44cdca4ff4e8] [PERF] Execution time=0.020104
DEBUG - 2026-03-13 16:22:22 --> [REQ_ID=33450d09a247] [REQUEST][END]
INFO - 2026-03-13 16:22:22 --> [REQ_ID=33450d09a247] [PERF] Execution time=0.029269
DEBUG - 2026-03-13 16:26:22 --> [REQ_ID=0ed564915d0c] [REQUEST][START] HEAD /
DEBUG - 2026-03-13 16:26:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-13 16:26:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-13 16:26:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-13 16:26:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-13 16:26:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-13 16:29:51 --> [REQ_ID=d70e1f40a39b] [REQUEST][START] GET /
DEBUG - 2026-03-13 16:29:51 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-13 16:29:51 --> [REQ_ID=d70e1f40a39b] [FILTER_BEFORE] /
DEBUG - 2026-03-13 16:29:51 --> [REQ_ID=d70e1f40a39b] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-13 16:29:51 --> [REQ_ID=d70e1f40a39b] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-13 16:29:51 --> [CSRF] token name=csrf_test_name hash=6fe1be02b78a439e3fcdfe0d6235bee7
DEBUG - 2026-03-13 16:29:51 --> [REQ_ID=8ed9aa269b0a] [INIT] App\Controllers\Home::GET
INFO - 2026-03-13 16:29:51 --> [REQ_ID=8ed9aa269b0a] [MEMORY][controller-start] 6291456
INFO - 2026-03-13 16:29:51 --> [REQ_ID=8ed9aa269b0a] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-13 16:29:51 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-13 16:29:52 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
DEBUG - 2026-03-13 16:29:52 --> [REQ_ID=8ed9aa269b0a] [VIEW_RENDER] themes/public/home
INFO - 2026-03-13 16:29:52 --> [REQ_ID=8ed9aa269b0a] [MEMORY][commonData:start] 10485760
INFO - 2026-03-13 16:29:52 --> themesMemory usage: 10485760
DEBUG - 2026-03-13 16:29:52 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-13 16:29:52 --> [REQ_ID=d70e1f40a39b] [FILTER_AFTER]
DEBUG - 2026-03-13 16:29:52 --> [REQ_ID=d70e1f40a39b] [LIFECYCLE][END] status=200 duration_ms=814.49 memory_delta=4194304
INFO - 2026-03-13 16:29:52 --> [REQ_ID=8ed9aa269b0a] [PERF] Execution time=0.811070
DEBUG - 2026-03-13 16:29:52 --> [REQ_ID=d70e1f40a39b] [REQUEST][END]
INFO - 2026-03-13 16:29:52 --> [REQ_ID=d70e1f40a39b] [PERF] Execution time=0.873535
DEBUG - 2026-03-13 16:29:58 --> [REQ_ID=60ebd8170c69] [REQUEST][START] POST /index.php/register
DEBUG - 2026-03-13 16:29:58 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-13 16:29:58 --> [REQ_ID=60ebd8170c69] [FILTER_BEFORE] /index.php/register
DEBUG - 2026-03-13 16:29:58 --> [REQ_ID=60ebd8170c69] [ROUTE] Controller=\App\Controllers\AuthController Method=attemptRegister
DEBUG - 2026-03-13 16:29:58 --> [REQ_ID=60ebd8170c69] [LIFECYCLE][START] POST https://www.mymiwallet.com/index.php/register
DEBUG - 2026-03-13 16:29:58 --> [CSRF] token name=csrf_test_name hash=6fe1be02b78a439e3fcdfe0d6235bee7
INFO - 2026-03-13 16:29:58 --> CSRF token verified.
DEBUG - 2026-03-13 16:29:58 --> [REQ_ID=c05f795bcb5e] [INIT] App\Controllers\AuthController::POST
INFO - 2026-03-13 16:29:58 --> [REQ_ID=c05f795bcb5e] [MEMORY][controller-start] 6291456
INFO - 2026-03-13 16:29:58 --> [REGISTRATION] Submission received
INFO - 2026-03-13 16:29:58 --> MailService queued email
INFO - 2026-03-13 16:29:58 --> [REGISTRATION] Validation passed (basic fields)
INFO - 2026-03-13 16:29:58 --> [REGISTRATION] Validation passed (password fields)
INFO - 2026-03-13 16:29:58 --> Registration created user_id=11728, email=david.kelly@xe-group.com, username=LamtLXcwDrKKqHRyVfaDzH, active=, requiresActivation=1, loginIdentifier=username
INFO - 2026-03-13 16:29:58 --> [REGISTRATION] User record created
INFO - 2026-03-13 16:29:58 --> OnboardingProgressService: created onboarding record for user_id=11728
INFO - 2026-03-13 16:29:59 --> Registration succeeded for david.kelly@xe-group.com (event 0028e77fcbe6e3be)
INFO - 2026-03-13 16:29:59 --> [REGISTRATION] Activation email queued
INFO - 2026-03-13 16:29:59 --> Registration redirecting to success guide for user_id=11728
DEBUG - 2026-03-13 16:29:59 --> [REQ_ID=60ebd8170c69] [FILTER_AFTER]
DEBUG - 2026-03-13 16:29:59 --> [REQ_ID=60ebd8170c69] [LIFECYCLE][END] status=303 duration_ms=1,261.03 memory_delta=0
INFO - 2026-03-13 16:29:59 --> [REQ_ID=c05f795bcb5e] [PERF] Execution time=1.260766
DEBUG - 2026-03-13 16:29:59 --> [REQ_ID=60ebd8170c69] [REQUEST][END]
INFO - 2026-03-13 16:29:59 --> [REQ_ID=60ebd8170c69] [PERF] Execution time=1.273949
DEBUG - 2026-03-13 16:29:59 --> [REQ_ID=576f2800da5e] [REQUEST][START] GET /index.php/register/success
DEBUG - 2026-03-13 16:29:59 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-13 16:29:59 --> [REQ_ID=576f2800da5e] [FILTER_BEFORE] /index.php/register/success
DEBUG - 2026-03-13 16:29:59 --> [REQ_ID=576f2800da5e] [ROUTE] Controller=\App\Controllers\AuthController Method=registerSuccess
DEBUG - 2026-03-13 16:29:59 --> [REQ_ID=576f2800da5e] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/register/success
DEBUG - 2026-03-13 16:29:59 --> [CSRF] token name=csrf_test_name hash=6fe1be02b78a439e3fcdfe0d6235bee7
DEBUG - 2026-03-13 16:29:59 --> [REQ_ID=1aef4b9a9be6] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-13 16:29:59 --> [REQ_ID=1aef4b9a9be6] [MEMORY][controller-start] 4194304
INFO - 2026-03-13 16:29:59 --> AuthController::registerSuccess view rendered.
INFO - 2026-03-13 16:29:59 --> [REQ_ID=1aef4b9a9be6] [PERF] Execution time=0.013434
DEBUG - 2026-03-13 16:30:12 --> [REQ_ID=3ae83010065d] [REQUEST][START] GET /index.php/How-It-Works/Investor-Profile
DEBUG - 2026-03-13 16:30:12 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-13 16:30:12 --> [REQ_ID=3ae83010065d] [FILTER_BEFORE] /index.php/How-It-Works/Investor-Profile
DEBUG - 2026-03-13 16:30:12 --> [REQ_ID=3ae83010065d] [ROUTE] Controller=\App\Modules\Blog\Controllers\HowItWorksController Method=show
DEBUG - 2026-03-13 16:30:12 --> [REQ_ID=3ae83010065d] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/How-It-Works/Investor-Profile
DEBUG - 2026-03-13 16:30:12 --> [CSRF] token name=csrf_test_name hash=6fe1be02b78a439e3fcdfe0d6235bee7
DEBUG - 2026-03-13 16:30:12 --> [REQ_ID=3aaf16786529] [INIT] App\Modules\Blog\Controllers\HowItWorksController::GET
INFO - 2026-03-13 16:30:12 --> [REQ_ID=3aaf16786529] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-13 16:30:12 --> [REQ_ID=3aaf16786529] [METHOD_ENTRY] show
DEBUG - 2026-03-13 16:30:12 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-13 16:30:13 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-13 16:30:13 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-13 16:30:13 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-13 16:30:13 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-13 16:30:13 --> MyMICoin: guest context detected; skipping user-specific preload.
ERROR - 2026-03-13 16:30:13 --> HowItWorksController failure: investor-profile
CRITICAL - 2026-03-13 16:30:13 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: GET, Route: How-It-Works/Investor-Profile]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-13 16:30:13 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-13 16:30:13 --> [404] URI=https://www.mymiwallet.com/index.php/How-It-Works/Investor-Profile
WARNING - 2026-03-13 16:30:13 --> 404 route miss: https://www.mymiwallet.com/index.php/How-It-Works/Investor-Profile | referrer: none
ERROR - 2026-03-13 16:30:13 --> [ERROR_PAGE] event=error_404 status=404 message=Page not found.
INFO - 2026-03-13 16:30:13 --> [REQ_ID=3aaf16786529] [PERF] Execution time=0.168215
DEBUG - 2026-03-13 16:30:17 --> [REQ_ID=eb3d3133dd3a] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-13 16:30:17 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-13 16:30:17 --> [REQ_ID=eb3d3133dd3a] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-13 16:30:17 --> [REQ_ID=eb3d3133dd3a] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-13 16:30:17 --> [REQ_ID=eb3d3133dd3a] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-13 16:30:17 --> [CSRF] token name=csrf_test_name hash=6fe1be02b78a439e3fcdfe0d6235bee7
DEBUG - 2026-03-13 16:30:17 --> [REQ_ID=fea42bdf8181] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-13 16:30:17 --> [REQ_ID=fea42bdf8181] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-13 16:30:17 --> [REQ_ID=eb3d3133dd3a] [FILTER_AFTER]
DEBUG - 2026-03-13 16:30:17 --> [REQ_ID=eb3d3133dd3a] [LIFECYCLE][END] status=200 duration_ms=20.68 memory_delta=0
INFO - 2026-03-13 16:30:17 --> [REQ_ID=fea42bdf8181] [PERF] Execution time=0.020571
DEBUG - 2026-03-13 16:30:17 --> [REQ_ID=eb3d3133dd3a] [REQUEST][END]
INFO - 2026-03-13 16:30:17 --> [REQ_ID=eb3d3133dd3a] [PERF] Execution time=0.030409
DEBUG - 2026-03-13 16:30:28 --> [REQ_ID=5a1a7db99799] [REQUEST][START] POST /index.php/login
DEBUG - 2026-03-13 16:30:28 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-13 16:30:28 --> [REQ_ID=5a1a7db99799] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-13 16:30:28 --> [REQ_ID=5a1a7db99799] [ROUTE] Controller=\App\Controllers\AuthController Method=attemptLogin
DEBUG - 2026-03-13 16:30:28 --> [REQ_ID=5a1a7db99799] [LIFECYCLE][START] POST https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-13 16:30:28 --> [CSRF] token name=csrf_test_name hash=6fe1be02b78a439e3fcdfe0d6235bee7
INFO - 2026-03-13 16:30:28 --> CSRF token verified.
DEBUG - 2026-03-13 16:30:28 --> [REQ_ID=f1179ef2319c] [INIT] App\Controllers\AuthController::POST
INFO - 2026-03-13 16:30:28 --> [REQ_ID=f1179ef2319c] [MEMORY][controller-start] 4194304
INFO - 2026-03-13 16:30:28 --> AuthController L93: Auth:attemptLogin started.
INFO - 2026-03-13 16:30:28 --> AuthController L104: Auth:attemptLogin rules: {"login":"required","password":"required"}
INFO - 2026-03-13 16:30:28 --> AuthController L132: Auth:attemptLogin Login Variables: login: required, remember: true, ip: 185.220.100.250, ua: "Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36"
DEBUG - 2026-03-13 16:30:28 --> Auth attemptLogin() called with login identifier: david.kelly@xe-group.com, remember: true
DEBUG - 2026-03-13 16:30:28 --> Auth attemptLogin() called. redirect_url in session: none
DEBUG - 2026-03-13 16:30:28 --> Auth credentials normalised for attempt using key "email"
WARNING - 2026-03-13 16:30:28 --> [AUTH_FAILURE] 
DEBUG - 2026-03-13 16:30:28 --> Auth attempt failed for identifier david.kelly@xe-group.com. Error: Unable to log you in. Please check your password.
WARNING - 2026-03-13 16:30:28 --> [AUTH] Login failure
WARNING - 2026-03-13 16:30:28 --> [AUTH] Login failed
DEBUG - 2026-03-13 16:30:28 --> [REQ_ID=5a1a7db99799] [FILTER_AFTER]
DEBUG - 2026-03-13 16:30:28 --> [REQ_ID=5a1a7db99799] [LIFECYCLE][END] status=303 duration_ms=258.44 memory_delta=0
INFO - 2026-03-13 16:30:28 --> [REQ_ID=f1179ef2319c] [PERF] Execution time=0.257851
DEBUG - 2026-03-13 16:30:28 --> [REQ_ID=5a1a7db99799] [REQUEST][END]
INFO - 2026-03-13 16:30:28 --> [REQ_ID=5a1a7db99799] [PERF] Execution time=0.268077
DEBUG - 2026-03-13 16:30:29 --> [REQ_ID=1e4c7b2faebc] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-13 16:30:29 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-13 16:30:29 --> [REQ_ID=1e4c7b2faebc] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-13 16:30:29 --> [REQ_ID=1e4c7b2faebc] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-13 16:30:29 --> [REQ_ID=1e4c7b2faebc] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-13 16:30:29 --> [CSRF] token name=csrf_test_name hash=6fe1be02b78a439e3fcdfe0d6235bee7
DEBUG - 2026-03-13 16:30:29 --> [REQ_ID=71f660d8102e] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-13 16:30:29 --> [REQ_ID=71f660d8102e] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-13 16:30:29 --> [REQ_ID=1e4c7b2faebc] [FILTER_AFTER]
DEBUG - 2026-03-13 16:30:29 --> [REQ_ID=1e4c7b2faebc] [LIFECYCLE][END] status=200 duration_ms=21.91 memory_delta=0
INFO - 2026-03-13 16:30:29 --> [REQ_ID=71f660d8102e] [PERF] Execution time=0.021791
DEBUG - 2026-03-13 16:30:29 --> [REQ_ID=1e4c7b2faebc] [REQUEST][END]
INFO - 2026-03-13 16:30:29 --> [REQ_ID=1e4c7b2faebc] [PERF] Execution time=0.032172
DEBUG - 2026-03-13 16:30:43 --> [REQ_ID=c26921cceea9] [REQUEST][START] GET /index.php/How-It-Works/Registering-An-Account
DEBUG - 2026-03-13 16:30:43 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-13 16:30:43 --> [REQ_ID=c26921cceea9] [FILTER_BEFORE] /index.php/How-It-Works/Registering-An-Account
DEBUG - 2026-03-13 16:30:43 --> [REQ_ID=c26921cceea9] [ROUTE] Controller=\App\Modules\Blog\Controllers\HowItWorksController Method=show
DEBUG - 2026-03-13 16:30:43 --> [REQ_ID=c26921cceea9] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/How-It-Works/Registering-An-Account
DEBUG - 2026-03-13 16:30:43 --> [CSRF] token name=csrf_test_name hash=6fe1be02b78a439e3fcdfe0d6235bee7
DEBUG - 2026-03-13 16:30:43 --> [REQ_ID=17914391838d] [INIT] App\Modules\Blog\Controllers\HowItWorksController::GET
INFO - 2026-03-13 16:30:43 --> [REQ_ID=17914391838d] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-13 16:30:43 --> [REQ_ID=17914391838d] [METHOD_ENTRY] show
DEBUG - 2026-03-13 16:30:43 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-13 16:30:43 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-13 16:30:43 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-13 16:30:43 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-13 16:30:43 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-13 16:30:43 --> MyMICoin: guest context detected; skipping user-specific preload.
ERROR - 2026-03-13 16:30:43 --> HowItWorksController failure: Call to undefined method App\Modules\Blog\Controllers\HowItWorksController::respondWithRendered()
INFO - 2026-03-13 16:30:43 --> [REQ_ID=17914391838d] [PERF] Execution time=0.033749
DEBUG - 2026-03-13 16:30:47 --> [REQ_ID=54293664fe8f] [REQUEST][START] GET /index.php/Free/register
DEBUG - 2026-03-13 16:30:47 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-13 16:30:47 --> [REQ_ID=54293664fe8f] [FILTER_BEFORE] /index.php/Free/register
DEBUG - 2026-03-13 16:30:47 --> [REQ_ID=54293664fe8f] [ROUTE] Controller=\App\Controllers\AuthController Method=register
DEBUG - 2026-03-13 16:30:47 --> [REQ_ID=54293664fe8f] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Free/register
DEBUG - 2026-03-13 16:30:47 --> [CSRF] token name=csrf_test_name hash=6fe1be02b78a439e3fcdfe0d6235bee7
DEBUG - 2026-03-13 16:30:47 --> [REQ_ID=54293664fe8f] [REQUEST][END]
INFO - 2026-03-13 16:30:47 --> [REQ_ID=54293664fe8f] [PERF] Execution time=0.010556
DEBUG - 2026-03-13 16:30:47 --> [REQ_ID=ecae51b54aa3] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-13 16:30:47 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-13 16:30:47 --> [REQ_ID=ecae51b54aa3] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-13 16:30:47 --> [REQ_ID=ecae51b54aa3] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-13 16:30:47 --> [REQ_ID=ecae51b54aa3] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-13 16:30:47 --> [CSRF] token name=csrf_test_name hash=6fe1be02b78a439e3fcdfe0d6235bee7
DEBUG - 2026-03-13 16:30:47 --> [REQ_ID=c69b6f410ef0] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-13 16:30:47 --> [REQ_ID=c69b6f410ef0] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-13 16:30:47 --> [REQ_ID=ecae51b54aa3] [FILTER_AFTER]
DEBUG - 2026-03-13 16:30:47 --> [REQ_ID=ecae51b54aa3] [LIFECYCLE][END] status=200 duration_ms=22.59 memory_delta=0
INFO - 2026-03-13 16:30:47 --> [REQ_ID=c69b6f410ef0] [PERF] Execution time=0.022492
DEBUG - 2026-03-13 16:30:47 --> [REQ_ID=ecae51b54aa3] [REQUEST][END]
INFO - 2026-03-13 16:30:47 --> [REQ_ID=ecae51b54aa3] [PERF] Execution time=0.031482
DEBUG - 2026-03-13 16:30:52 --> [REQ_ID=085e8666797b] [REQUEST][START] GET /index.php/Support/Account
DEBUG - 2026-03-13 16:30:52 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-13 16:30:52 --> [REQ_ID=085e8666797b] [FILTER_BEFORE] /index.php/Support/Account
DEBUG - 2026-03-13 16:30:52 --> [REQ_ID=085e8666797b] [ROUTE] Controller=\App\Modules\Support\Controllers\AccountSupportController Method=index
DEBUG - 2026-03-13 16:30:52 --> [REQ_ID=085e8666797b] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Support/Account
DEBUG - 2026-03-13 16:30:52 --> [CSRF] token name=csrf_test_name hash=6fe1be02b78a439e3fcdfe0d6235bee7
DEBUG - 2026-03-13 16:30:52 --> [REQ_ID=bd631d6489c1] [INIT] App\Modules\Support\Controllers\AccountSupportController::GET
INFO - 2026-03-13 16:30:52 --> [REQ_ID=bd631d6489c1] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-13 16:30:52 --> [REQ_ID=bd631d6489c1] [METHOD_ENTRY] index
DEBUG - 2026-03-13 16:30:52 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-13 16:30:52 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-13 16:30:52 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-13 16:30:52 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-13 16:30:52 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-13 16:30:52 --> MyMICoin: guest context detected; skipping user-specific preload.
INFO - 2026-03-13 16:30:52 --> [REQ_ID=bd631d6489c1] [MEMORY][commonData:start] 4194304
DEBUG - 2026-03-13 16:30:52 --> [REQ_ID=bd631d6489c1] [VIEW_RENDER] SupportModule/Support/account_help
INFO - 2026-03-13 16:30:52 --> [REQ_ID=bd631d6489c1] [MEMORY][commonData:start] 4194304
INFO - 2026-03-13 16:30:52 --> themesMemory usage: 4194304
DEBUG - 2026-03-13 16:30:52 --> [REQ_ID=085e8666797b] [FILTER_AFTER]
DEBUG - 2026-03-13 16:30:52 --> [REQ_ID=085e8666797b] [LIFECYCLE][END] status=200 duration_ms=48.08 memory_delta=0
INFO - 2026-03-13 16:30:52 --> [REQ_ID=bd631d6489c1] [PERF] Execution time=0.047822
DEBUG - 2026-03-13 16:30:52 --> [REQ_ID=085e8666797b] [REQUEST][END]
INFO - 2026-03-13 16:30:52 --> [REQ_ID=085e8666797b] [PERF] Execution time=0.058944
DEBUG - 2026-03-13 16:30:58 --> [REQ_ID=700878afad54] [REQUEST][START] POST /index.php/Support/resendActivation
DEBUG - 2026-03-13 16:30:58 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-13 16:30:58 --> [REQ_ID=700878afad54] [FILTER_BEFORE] /index.php/Support/resendActivation
DEBUG - 2026-03-13 16:30:58 --> [REQ_ID=700878afad54] [ROUTE] Controller=\App\Modules\Support\Controllers\AccountSupportController Method=resendActivation
DEBUG - 2026-03-13 16:30:58 --> [REQ_ID=700878afad54] [LIFECYCLE][START] POST https://www.mymiwallet.com/index.php/Support/resendActivation
DEBUG - 2026-03-13 16:30:58 --> [CSRF] token name=csrf_test_name hash=6fe1be02b78a439e3fcdfe0d6235bee7
INFO - 2026-03-13 16:30:58 --> CSRF token verified.
DEBUG - 2026-03-13 16:30:58 --> [REQ_ID=2186bc475bb5] [INIT] App\Modules\Support\Controllers\AccountSupportController::POST
INFO - 2026-03-13 16:30:58 --> [REQ_ID=2186bc475bb5] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-13 16:30:58 --> [REQ_ID=2186bc475bb5] [METHOD_ENTRY] resendActivation
DEBUG - 2026-03-13 16:30:58 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-13 16:30:58 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-13 16:30:58 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-13 16:30:58 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-13 16:30:58 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-13 16:30:58 --> MyMICoin: guest context detected; skipping user-specific preload.
INFO - 2026-03-13 16:30:58 --> [SUPPORT] Account help requested
INFO - 2026-03-13 16:30:59 --> [SUPPORT] Account help outcome
DEBUG - 2026-03-13 16:30:59 --> [REQ_ID=700878afad54] [FILTER_AFTER]
DEBUG - 2026-03-13 16:30:59 --> [REQ_ID=700878afad54] [LIFECYCLE][END] status=303 duration_ms=1,242.48 memory_delta=0
INFO - 2026-03-13 16:30:59 --> [REQ_ID=2186bc475bb5] [PERF] Execution time=1.242285
DEBUG - 2026-03-13 16:30:59 --> [REQ_ID=700878afad54] [REQUEST][END]
INFO - 2026-03-13 16:30:59 --> [REQ_ID=700878afad54] [PERF] Execution time=1.252751
DEBUG - 2026-03-13 16:30:59 --> [REQ_ID=f9664f4c25d3] [REQUEST][START] GET /index.php/Support/Account
DEBUG - 2026-03-13 16:30:59 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-13 16:30:59 --> [REQ_ID=f9664f4c25d3] [FILTER_BEFORE] /index.php/Support/Account
DEBUG - 2026-03-13 16:30:59 --> [REQ_ID=f9664f4c25d3] [ROUTE] Controller=\App\Modules\Support\Controllers\AccountSupportController Method=index
DEBUG - 2026-03-13 16:30:59 --> [REQ_ID=f9664f4c25d3] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Support/Account
DEBUG - 2026-03-13 16:30:59 --> [CSRF] token name=csrf_test_name hash=6fe1be02b78a439e3fcdfe0d6235bee7
DEBUG - 2026-03-13 16:30:59 --> [REQ_ID=358f7344995a] [INIT] App\Modules\Support\Controllers\AccountSupportController::GET
INFO - 2026-03-13 16:30:59 --> [REQ_ID=358f7344995a] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-13 16:30:59 --> [REQ_ID=358f7344995a] [METHOD_ENTRY] index
DEBUG - 2026-03-13 16:30:59 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-13 16:30:59 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-13 16:30:59 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-13 16:30:59 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-13 16:30:59 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-13 16:30:59 --> MyMICoin: guest context detected; skipping user-specific preload.
INFO - 2026-03-13 16:30:59 --> [REQ_ID=358f7344995a] [MEMORY][commonData:start] 4194304
DEBUG - 2026-03-13 16:30:59 --> [REQ_ID=358f7344995a] [VIEW_RENDER] SupportModule/Support/account_help
INFO - 2026-03-13 16:30:59 --> [REQ_ID=358f7344995a] [MEMORY][commonData:start] 4194304
INFO - 2026-03-13 16:30:59 --> themesMemory usage: 4194304
DEBUG - 2026-03-13 16:30:59 --> [REQ_ID=f9664f4c25d3] [FILTER_AFTER]
DEBUG - 2026-03-13 16:30:59 --> [REQ_ID=f9664f4c25d3] [LIFECYCLE][END] status=200 duration_ms=27.31 memory_delta=0
INFO - 2026-03-13 16:30:59 --> [REQ_ID=358f7344995a] [PERF] Execution time=0.027128
DEBUG - 2026-03-13 16:30:59 --> [REQ_ID=f9664f4c25d3] [REQUEST][END]
INFO - 2026-03-13 16:30:59 --> [REQ_ID=f9664f4c25d3] [PERF] Execution time=0.036115
DEBUG - 2026-03-13 16:31:13 --> [REQ_ID=108197099dd4] [REQUEST][START] GET /index.php/forgot
DEBUG - 2026-03-13 16:31:13 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-13 16:31:13 --> [REQ_ID=108197099dd4] [FILTER_BEFORE] /index.php/forgot
DEBUG - 2026-03-13 16:31:13 --> [REQ_ID=108197099dd4] [ROUTE] Controller=\Myth\Auth\Controllers\AuthController Method=forgotPassword
DEBUG - 2026-03-13 16:31:13 --> [REQ_ID=108197099dd4] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/forgot
DEBUG - 2026-03-13 16:31:13 --> [CSRF] token name=csrf_test_name hash=6fe1be02b78a439e3fcdfe0d6235bee7
DEBUG - 2026-03-13 16:31:13 --> [REQ_ID=108197099dd4] [FILTER_AFTER]
DEBUG - 2026-03-13 16:31:13 --> [REQ_ID=108197099dd4] [LIFECYCLE][END] status=200 duration_ms=3.15 memory_delta=0
DEBUG - 2026-03-13 16:31:13 --> [REQ_ID=108197099dd4] [REQUEST][END]
INFO - 2026-03-13 16:31:13 --> [REQ_ID=108197099dd4] [PERF] Execution time=0.014740
DEBUG - 2026-03-13 16:31:17 --> [REQ_ID=0f8e0b47db31] [REQUEST][START] GET /index.php/register
DEBUG - 2026-03-13 16:31:17 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-13 16:31:17 --> [REQ_ID=0f8e0b47db31] [FILTER_BEFORE] /index.php/register
DEBUG - 2026-03-13 16:31:17 --> [REQ_ID=0f8e0b47db31] [ROUTE] Controller=\App\Controllers\AuthController Method=register
DEBUG - 2026-03-13 16:31:17 --> [REQ_ID=0f8e0b47db31] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/register
DEBUG - 2026-03-13 16:31:17 --> [CSRF] token name=csrf_test_name hash=6fe1be02b78a439e3fcdfe0d6235bee7
DEBUG - 2026-03-13 16:31:17 --> [REQ_ID=169416ca56b7] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-13 16:31:17 --> [REQ_ID=169416ca56b7] [MEMORY][controller-start] 4194304
INFO - 2026-03-13 16:31:17 --> [REGISTRATION] Form loaded
INFO - 2026-03-13 16:31:17 --> [REQ_ID=169416ca56b7] [PERF] Execution time=0.098784
DEBUG - 2026-03-13 16:31:22 --> [REQ_ID=19a825811b65] [REQUEST][START] HEAD /
DEBUG - 2026-03-13 16:31:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-13 16:31:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-13 16:31:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-13 16:31:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-13 16:31:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-13 16:31:23 --> [REQ_ID=870cd0bdf2b4] [REQUEST][START] GET /index.php/Customer-Support
DEBUG - 2026-03-13 16:31:23 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-13 16:31:23 --> [REQ_ID=870cd0bdf2b4] [FILTER_BEFORE] /index.php/Customer-Support
DEBUG - 2026-03-13 16:31:23 --> [REQ_ID=870cd0bdf2b4] [ROUTE] Controller=\App\Controllers\App\Modules\Support\Controllers\SupportController Method=index
DEBUG - 2026-03-13 16:31:23 --> [REQ_ID=870cd0bdf2b4] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Customer-Support
DEBUG - 2026-03-13 16:31:23 --> [CSRF] token name=csrf_test_name hash=6fe1be02b78a439e3fcdfe0d6235bee7
DEBUG - 2026-03-13 16:31:23 --> [REQ_ID=870cd0bdf2b4] [REQUEST][END]
INFO - 2026-03-13 16:31:23 --> [REQ_ID=870cd0bdf2b4] [PERF] Execution time=0.009476
DEBUG - 2026-03-13 16:31:24 --> [REQ_ID=7cc75dd79506] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-13 16:31:24 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-13 16:31:24 --> [REQ_ID=7cc75dd79506] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-13 16:31:24 --> [REQ_ID=7cc75dd79506] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-13 16:31:24 --> [REQ_ID=7cc75dd79506] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-13 16:31:24 --> [CSRF] token name=csrf_test_name hash=6fe1be02b78a439e3fcdfe0d6235bee7
DEBUG - 2026-03-13 16:31:24 --> [REQ_ID=95d2ddabdd2d] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-13 16:31:24 --> [REQ_ID=95d2ddabdd2d] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-13 16:31:24 --> [REQ_ID=7cc75dd79506] [FILTER_AFTER]
DEBUG - 2026-03-13 16:31:24 --> [REQ_ID=7cc75dd79506] [LIFECYCLE][END] status=200 duration_ms=21.24 memory_delta=0
INFO - 2026-03-13 16:31:24 --> [REQ_ID=95d2ddabdd2d] [PERF] Execution time=0.021137
DEBUG - 2026-03-13 16:31:24 --> [REQ_ID=7cc75dd79506] [REQUEST][END]
INFO - 2026-03-13 16:31:24 --> [REQ_ID=7cc75dd79506] [PERF] Execution time=0.032004
DEBUG - 2026-03-13 16:31:32 --> [REQ_ID=4026bd2a58f1] [REQUEST][START] GET /index.php/logout
DEBUG - 2026-03-13 16:31:32 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-13 16:31:32 --> [REQ_ID=4026bd2a58f1] [FILTER_BEFORE] /index.php/logout
DEBUG - 2026-03-13 16:31:32 --> [REQ_ID=4026bd2a58f1] [ROUTE] Controller=\App\Controllers\AuthController Method=logout
DEBUG - 2026-03-13 16:31:32 --> [REQ_ID=4026bd2a58f1] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/logout
DEBUG - 2026-03-13 16:31:32 --> [CSRF] token name=csrf_test_name hash=6fe1be02b78a439e3fcdfe0d6235bee7
DEBUG - 2026-03-13 16:31:32 --> [REQ_ID=4026bd2a58f1] [REQUEST][END]
INFO - 2026-03-13 16:31:32 --> [REQ_ID=4026bd2a58f1] [PERF] Execution time=0.009831
DEBUG - 2026-03-13 16:31:32 --> [REQ_ID=22f08f4ce992] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-13 16:31:32 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-13 16:31:32 --> [REQ_ID=22f08f4ce992] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-13 16:31:32 --> [REQ_ID=22f08f4ce992] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-13 16:31:32 --> [REQ_ID=22f08f4ce992] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-13 16:31:32 --> [CSRF] token name=csrf_test_name hash=6fe1be02b78a439e3fcdfe0d6235bee7
DEBUG - 2026-03-13 16:31:32 --> [REQ_ID=06c043c892b8] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-13 16:31:32 --> [REQ_ID=06c043c892b8] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-13 16:31:32 --> [REQ_ID=22f08f4ce992] [FILTER_AFTER]
DEBUG - 2026-03-13 16:31:32 --> [REQ_ID=22f08f4ce992] [LIFECYCLE][END] status=200 duration_ms=36.35 memory_delta=0
INFO - 2026-03-13 16:31:32 --> [REQ_ID=06c043c892b8] [PERF] Execution time=0.036253
DEBUG - 2026-03-13 16:31:32 --> [REQ_ID=22f08f4ce992] [REQUEST][END]
INFO - 2026-03-13 16:31:32 --> [REQ_ID=22f08f4ce992] [PERF] Execution time=0.045193
DEBUG - 2026-03-13 16:31:42 --> [REQ_ID=35febed318a1] [REQUEST][START] GET /index.php/Account
DEBUG - 2026-03-13 16:31:42 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-13 16:31:42 --> [REQ_ID=35febed318a1] [FILTER_BEFORE] /index.php/Account
DEBUG - 2026-03-13 16:31:42 --> [REQ_ID=35febed318a1] [ROUTE] Controller=\App\Modules\User\Controllers\DashboardController Method=account
DEBUG - 2026-03-13 16:31:42 --> [REQ_ID=35febed318a1] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Account
DEBUG - 2026-03-13 16:31:42 --> [CSRF] token name=csrf_test_name hash=6fe1be02b78a439e3fcdfe0d6235bee7
DEBUG - 2026-03-13 16:31:42 --> [REQ_ID=35febed318a1] [REQUEST][END]
INFO - 2026-03-13 16:31:42 --> [REQ_ID=35febed318a1] [PERF] Execution time=0.013778
DEBUG - 2026-03-13 16:31:43 --> [REQ_ID=7e4ce12b2ffa] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-13 16:31:43 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-13 16:31:43 --> [REQ_ID=7e4ce12b2ffa] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-13 16:31:43 --> [REQ_ID=7e4ce12b2ffa] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-13 16:31:43 --> [REQ_ID=7e4ce12b2ffa] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-13 16:31:43 --> [CSRF] token name=csrf_test_name hash=6fe1be02b78a439e3fcdfe0d6235bee7
DEBUG - 2026-03-13 16:31:43 --> [REQ_ID=64404ca807ca] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-13 16:31:43 --> [REQ_ID=64404ca807ca] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-13 16:31:43 --> [REQ_ID=7e4ce12b2ffa] [FILTER_AFTER]
DEBUG - 2026-03-13 16:31:43 --> [REQ_ID=7e4ce12b2ffa] [LIFECYCLE][END] status=200 duration_ms=37.09 memory_delta=0
INFO - 2026-03-13 16:31:43 --> [REQ_ID=64404ca807ca] [PERF] Execution time=0.036874
DEBUG - 2026-03-13 16:31:43 --> [REQ_ID=7e4ce12b2ffa] [REQUEST][END]
INFO - 2026-03-13 16:31:43 --> [REQ_ID=7e4ce12b2ffa] [PERF] Execution time=0.051403
DEBUG - 2026-03-13 16:31:54 --> [REQ_ID=a637f9987a72] [REQUEST][START] GET /index.php/Account/Connected-Accounts
DEBUG - 2026-03-13 16:31:54 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-13 16:31:54 --> [REQ_ID=a637f9987a72] [FILTER_BEFORE] /index.php/Account/Connected-Accounts
DEBUG - 2026-03-13 16:31:54 --> [REQ_ID=a637f9987a72] [ROUTE] Controller=\App\Modules\User\Controllers\DashboardController Method=connectedAccounts
DEBUG - 2026-03-13 16:31:54 --> [REQ_ID=a637f9987a72] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Account/Connected-Accounts
DEBUG - 2026-03-13 16:31:54 --> [CSRF] token name=csrf_test_name hash=6fe1be02b78a439e3fcdfe0d6235bee7
DEBUG - 2026-03-13 16:31:54 --> [REQ_ID=a637f9987a72] [REQUEST][END]
INFO - 2026-03-13 16:31:54 --> [REQ_ID=a637f9987a72] [PERF] Execution time=0.009775
DEBUG - 2026-03-13 16:31:54 --> [REQ_ID=dfab6fe4616c] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-13 16:31:54 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-13 16:31:54 --> [REQ_ID=dfab6fe4616c] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-13 16:31:54 --> [REQ_ID=dfab6fe4616c] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-13 16:31:54 --> [REQ_ID=dfab6fe4616c] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-13 16:31:54 --> [CSRF] token name=csrf_test_name hash=6fe1be02b78a439e3fcdfe0d6235bee7
DEBUG - 2026-03-13 16:31:54 --> [REQ_ID=21d5dee2c26e] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-13 16:31:54 --> [REQ_ID=21d5dee2c26e] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-13 16:31:54 --> [REQ_ID=dfab6fe4616c] [FILTER_AFTER]
DEBUG - 2026-03-13 16:31:54 --> [REQ_ID=dfab6fe4616c] [LIFECYCLE][END] status=200 duration_ms=84.67 memory_delta=0
INFO - 2026-03-13 16:31:54 --> [REQ_ID=21d5dee2c26e] [PERF] Execution time=0.084623
DEBUG - 2026-03-13 16:31:54 --> [REQ_ID=dfab6fe4616c] [REQUEST][END]
INFO - 2026-03-13 16:31:54 --> [REQ_ID=dfab6fe4616c] [PERF] Execution time=0.094013
DEBUG - 2026-03-13 16:32:01 --> [REQ_ID=45b854b9be66] [REQUEST][START] GET /index.php/Account/Social-Media
DEBUG - 2026-03-13 16:32:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-13 16:32:01 --> [REQ_ID=45b854b9be66] [FILTER_BEFORE] /index.php/Account/Social-Media
DEBUG - 2026-03-13 16:32:01 --> [REQ_ID=45b854b9be66] [ROUTE] Controller=\App\Modules\User\Controllers\DashboardController Method=SocialMedia
DEBUG - 2026-03-13 16:32:01 --> [REQ_ID=45b854b9be66] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Account/Social-Media
DEBUG - 2026-03-13 16:32:01 --> [CSRF] token name=csrf_test_name hash=6fe1be02b78a439e3fcdfe0d6235bee7
DEBUG - 2026-03-13 16:32:01 --> [REQ_ID=45b854b9be66] [REQUEST][END]
INFO - 2026-03-13 16:32:01 --> [REQ_ID=45b854b9be66] [PERF] Execution time=0.010036
DEBUG - 2026-03-13 16:32:01 --> [REQ_ID=71e7872af54e] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-13 16:32:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-13 16:32:01 --> [REQ_ID=71e7872af54e] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-13 16:32:01 --> [REQ_ID=71e7872af54e] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-13 16:32:01 --> [REQ_ID=71e7872af54e] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-13 16:32:01 --> [CSRF] token name=csrf_test_name hash=6fe1be02b78a439e3fcdfe0d6235bee7
DEBUG - 2026-03-13 16:32:01 --> [REQ_ID=0f4e8028eb15] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-13 16:32:01 --> [REQ_ID=0f4e8028eb15] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-13 16:32:01 --> [REQ_ID=71e7872af54e] [FILTER_AFTER]
DEBUG - 2026-03-13 16:32:01 --> [REQ_ID=71e7872af54e] [LIFECYCLE][END] status=200 duration_ms=79.12 memory_delta=0
INFO - 2026-03-13 16:32:01 --> [REQ_ID=0f4e8028eb15] [PERF] Execution time=0.079059
DEBUG - 2026-03-13 16:32:01 --> [REQ_ID=71e7872af54e] [REQUEST][END]
INFO - 2026-03-13 16:32:01 --> [REQ_ID=71e7872af54e] [PERF] Execution time=0.088987
DEBUG - 2026-03-13 16:32:12 --> [REQ_ID=6ebc3d32699b] [REQUEST][START] GET /index.php/Account/Activity
DEBUG - 2026-03-13 16:32:12 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-13 16:32:12 --> [REQ_ID=6ebc3d32699b] [FILTER_BEFORE] /index.php/Account/Activity
DEBUG - 2026-03-13 16:32:12 --> [REQ_ID=6ebc3d32699b] [ROUTE] Controller=\App\Modules\User\Controllers\DashboardController Method=activity
DEBUG - 2026-03-13 16:32:12 --> [REQ_ID=6ebc3d32699b] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Account/Activity
DEBUG - 2026-03-13 16:32:12 --> [CSRF] token name=csrf_test_name hash=6fe1be02b78a439e3fcdfe0d6235bee7
DEBUG - 2026-03-13 16:32:12 --> [REQ_ID=6ebc3d32699b] [REQUEST][END]
INFO - 2026-03-13 16:32:12 --> [REQ_ID=6ebc3d32699b] [PERF] Execution time=0.010312
DEBUG - 2026-03-13 16:32:13 --> [REQ_ID=b3319367ffbc] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-13 16:32:13 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-13 16:32:13 --> [REQ_ID=b3319367ffbc] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-13 16:32:13 --> [REQ_ID=b3319367ffbc] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-13 16:32:13 --> [REQ_ID=b3319367ffbc] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-13 16:32:13 --> [CSRF] token name=csrf_test_name hash=6fe1be02b78a439e3fcdfe0d6235bee7
DEBUG - 2026-03-13 16:32:13 --> [REQ_ID=57be526de6bb] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-13 16:32:13 --> [REQ_ID=57be526de6bb] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-13 16:32:13 --> [REQ_ID=b3319367ffbc] [FILTER_AFTER]
DEBUG - 2026-03-13 16:32:13 --> [REQ_ID=b3319367ffbc] [LIFECYCLE][END] status=200 duration_ms=95.41 memory_delta=0
INFO - 2026-03-13 16:32:13 --> [REQ_ID=57be526de6bb] [PERF] Execution time=0.095345
DEBUG - 2026-03-13 16:32:13 --> [REQ_ID=b3319367ffbc] [REQUEST][END]
INFO - 2026-03-13 16:32:13 --> [REQ_ID=b3319367ffbc] [PERF] Execution time=0.104997
DEBUG - 2026-03-13 16:32:21 --> [REQ_ID=d28882ea074c] [REQUEST][START] GET /index.php/Account/Billing
DEBUG - 2026-03-13 16:32:21 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-13 16:32:21 --> [REQ_ID=d28882ea074c] [FILTER_BEFORE] /index.php/Account/Billing
DEBUG - 2026-03-13 16:32:21 --> [REQ_ID=d28882ea074c] [ROUTE] Controller=\App\Modules\User\Controllers\DashboardController Method=billing
DEBUG - 2026-03-13 16:32:21 --> [REQ_ID=d28882ea074c] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Account/Billing
DEBUG - 2026-03-13 16:32:21 --> [CSRF] token name=csrf_test_name hash=6fe1be02b78a439e3fcdfe0d6235bee7
DEBUG - 2026-03-13 16:32:21 --> [REQ_ID=d28882ea074c] [REQUEST][END]
INFO - 2026-03-13 16:32:21 --> [REQ_ID=d28882ea074c] [PERF] Execution time=0.009657
DEBUG - 2026-03-13 16:32:21 --> [REQ_ID=96f0a0542b18] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-13 16:32:21 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-13 16:32:21 --> [REQ_ID=96f0a0542b18] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-13 16:32:21 --> [REQ_ID=96f0a0542b18] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-13 16:32:21 --> [REQ_ID=96f0a0542b18] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-13 16:32:21 --> [CSRF] token name=csrf_test_name hash=6fe1be02b78a439e3fcdfe0d6235bee7
DEBUG - 2026-03-13 16:32:21 --> [REQ_ID=693d697b44df] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-13 16:32:21 --> [REQ_ID=693d697b44df] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-13 16:32:21 --> [REQ_ID=96f0a0542b18] [FILTER_AFTER]
DEBUG - 2026-03-13 16:32:21 --> [REQ_ID=96f0a0542b18] [LIFECYCLE][END] status=200 duration_ms=18.92 memory_delta=0
INFO - 2026-03-13 16:32:21 --> [REQ_ID=693d697b44df] [PERF] Execution time=0.018751
DEBUG - 2026-03-13 16:32:21 --> [REQ_ID=96f0a0542b18] [REQUEST][END]
INFO - 2026-03-13 16:32:21 --> [REQ_ID=96f0a0542b18] [PERF] Execution time=0.027175
DEBUG - 2026-03-13 16:32:31 --> [REQ_ID=44f0595ec701] [REQUEST][START] GET /index.php/Investments/News
DEBUG - 2026-03-13 16:32:31 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-13 16:32:31 --> [REQ_ID=44f0595ec701] [FILTER_BEFORE] /index.php/Investments/News
DEBUG - 2026-03-13 16:32:31 --> [REQ_ID=44f0595ec701] [ROUTE] Controller=closure_route Method=index
DEBUG - 2026-03-13 16:32:31 --> [REQ_ID=44f0595ec701] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Investments/News
DEBUG - 2026-03-13 16:32:31 --> [CSRF] token name=csrf_test_name hash=6fe1be02b78a439e3fcdfe0d6235bee7
DEBUG - 2026-03-13 16:32:31 --> [REQ_ID=44f0595ec701] [REQUEST][END]
INFO - 2026-03-13 16:32:31 --> [REQ_ID=44f0595ec701] [PERF] Execution time=0.009670
DEBUG - 2026-03-13 16:32:31 --> [REQ_ID=290b65db5b83] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-13 16:32:31 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-13 16:32:31 --> [REQ_ID=290b65db5b83] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-13 16:32:31 --> [REQ_ID=290b65db5b83] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-13 16:32:31 --> [REQ_ID=290b65db5b83] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-13 16:32:31 --> [CSRF] token name=csrf_test_name hash=6fe1be02b78a439e3fcdfe0d6235bee7
DEBUG - 2026-03-13 16:32:31 --> [REQ_ID=ca5d8575737d] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-13 16:32:31 --> [REQ_ID=ca5d8575737d] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-13 16:32:31 --> [REQ_ID=290b65db5b83] [FILTER_AFTER]
DEBUG - 2026-03-13 16:32:31 --> [REQ_ID=290b65db5b83] [LIFECYCLE][END] status=200 duration_ms=30.29 memory_delta=0
INFO - 2026-03-13 16:32:31 --> [REQ_ID=ca5d8575737d] [PERF] Execution time=0.030095
DEBUG - 2026-03-13 16:32:31 --> [REQ_ID=290b65db5b83] [REQUEST][END]
INFO - 2026-03-13 16:32:31 --> [REQ_ID=290b65db5b83] [PERF] Execution time=0.040603
DEBUG - 2026-03-13 16:32:40 --> [REQ_ID=6a6b575f3ff2] [REQUEST][START] GET /index.php/Account/Notifications
DEBUG - 2026-03-13 16:32:40 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-13 16:32:40 --> [REQ_ID=6a6b575f3ff2] [FILTER_BEFORE] /index.php/Account/Notifications
DEBUG - 2026-03-13 16:32:40 --> [REQ_ID=6a6b575f3ff2] [ROUTE] Controller=\App\Modules\User\Controllers\DashboardController Method=notifications
DEBUG - 2026-03-13 16:32:40 --> [REQ_ID=6a6b575f3ff2] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Account/Notifications
DEBUG - 2026-03-13 16:32:40 --> [CSRF] token name=csrf_test_name hash=6fe1be02b78a439e3fcdfe0d6235bee7
DEBUG - 2026-03-13 16:32:40 --> [REQ_ID=6a6b575f3ff2] [REQUEST][END]
INFO - 2026-03-13 16:32:40 --> [REQ_ID=6a6b575f3ff2] [PERF] Execution time=0.013252
DEBUG - 2026-03-13 16:32:40 --> [REQ_ID=eb707fbd22b3] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-13 16:32:40 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-13 16:32:40 --> [REQ_ID=eb707fbd22b3] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-13 16:32:40 --> [REQ_ID=eb707fbd22b3] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-13 16:32:40 --> [REQ_ID=eb707fbd22b3] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-13 16:32:40 --> [CSRF] token name=csrf_test_name hash=6fe1be02b78a439e3fcdfe0d6235bee7
DEBUG - 2026-03-13 16:32:40 --> [REQ_ID=38f03af04b25] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-13 16:32:40 --> [REQ_ID=38f03af04b25] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-13 16:32:40 --> [REQ_ID=eb707fbd22b3] [FILTER_AFTER]
DEBUG - 2026-03-13 16:32:40 --> [REQ_ID=eb707fbd22b3] [LIFECYCLE][END] status=200 duration_ms=108.85 memory_delta=0
INFO - 2026-03-13 16:32:40 --> [REQ_ID=38f03af04b25] [PERF] Execution time=0.108762
DEBUG - 2026-03-13 16:32:40 --> [REQ_ID=eb707fbd22b3] [REQUEST][END]
INFO - 2026-03-13 16:32:40 --> [REQ_ID=eb707fbd22b3] [PERF] Execution time=0.117979
DEBUG - 2026-03-13 16:32:50 --> [REQ_ID=c29be1152e12] [REQUEST][START] GET /index.php/Account/Security
DEBUG - 2026-03-13 16:32:50 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-13 16:32:50 --> [REQ_ID=c29be1152e12] [FILTER_BEFORE] /index.php/Account/Security
DEBUG - 2026-03-13 16:32:50 --> [REQ_ID=c29be1152e12] [ROUTE] Controller=\App\Modules\User\Controllers\DashboardController Method=Security
DEBUG - 2026-03-13 16:32:50 --> [REQ_ID=c29be1152e12] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Account/Security
DEBUG - 2026-03-13 16:32:50 --> [CSRF] token name=csrf_test_name hash=6fe1be02b78a439e3fcdfe0d6235bee7
DEBUG - 2026-03-13 16:32:50 --> [REQ_ID=c29be1152e12] [REQUEST][END]
INFO - 2026-03-13 16:32:50 --> [REQ_ID=c29be1152e12] [PERF] Execution time=0.011203
DEBUG - 2026-03-13 16:32:51 --> [REQ_ID=d65e3a13cc35] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-13 16:32:51 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-13 16:32:51 --> [REQ_ID=d65e3a13cc35] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-13 16:32:51 --> [REQ_ID=d65e3a13cc35] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-13 16:32:51 --> [REQ_ID=d65e3a13cc35] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-13 16:32:51 --> [CSRF] token name=csrf_test_name hash=6fe1be02b78a439e3fcdfe0d6235bee7
DEBUG - 2026-03-13 16:32:51 --> [REQ_ID=bbb0278fae2a] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-13 16:32:51 --> [REQ_ID=bbb0278fae2a] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-13 16:32:51 --> [REQ_ID=d65e3a13cc35] [FILTER_AFTER]
DEBUG - 2026-03-13 16:32:51 --> [REQ_ID=d65e3a13cc35] [LIFECYCLE][END] status=200 duration_ms=30.02 memory_delta=0
INFO - 2026-03-13 16:32:51 --> [REQ_ID=bbb0278fae2a] [PERF] Execution time=0.029983
DEBUG - 2026-03-13 16:32:51 --> [REQ_ID=d65e3a13cc35] [REQUEST][END]
INFO - 2026-03-13 16:32:51 --> [REQ_ID=d65e3a13cc35] [PERF] Execution time=0.039443
DEBUG - 2026-03-13 16:32:58 --> [REQ_ID=f574a23f8df8] [REQUEST][START] GET /index.php/Management/Users
DEBUG - 2026-03-13 16:32:58 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-13 16:32:58 --> [REQ_ID=f574a23f8df8] [FILTER_BEFORE] /index.php/Management/Users
DEBUG - 2026-03-13 16:32:58 --> [REQ_ID=f574a23f8df8] [ROUTE] Controller=\App\Modules\Management\Controllers\UsersController Method=index
DEBUG - 2026-03-13 16:32:58 --> [REQ_ID=f574a23f8df8] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Management/Users
DEBUG - 2026-03-13 16:32:58 --> [CSRF] token name=csrf_test_name hash=6fe1be02b78a439e3fcdfe0d6235bee7
DEBUG - 2026-03-13 16:32:58 --> [REQ_ID=f574a23f8df8] [REQUEST][END]
INFO - 2026-03-13 16:32:58 --> [REQ_ID=f574a23f8df8] [PERF] Execution time=0.010700
DEBUG - 2026-03-13 16:32:58 --> [REQ_ID=95f755347ac0] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-13 16:32:58 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-13 16:32:58 --> [REQ_ID=95f755347ac0] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-13 16:32:58 --> [REQ_ID=95f755347ac0] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-13 16:32:58 --> [REQ_ID=95f755347ac0] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-13 16:32:58 --> [CSRF] token name=csrf_test_name hash=6fe1be02b78a439e3fcdfe0d6235bee7
DEBUG - 2026-03-13 16:32:58 --> [REQ_ID=22fac880a469] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-13 16:32:58 --> [REQ_ID=22fac880a469] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-13 16:32:58 --> [REQ_ID=95f755347ac0] [FILTER_AFTER]
DEBUG - 2026-03-13 16:32:58 --> [REQ_ID=95f755347ac0] [LIFECYCLE][END] status=200 duration_ms=36.31 memory_delta=0
INFO - 2026-03-13 16:32:58 --> [REQ_ID=22fac880a469] [PERF] Execution time=0.036304
DEBUG - 2026-03-13 16:32:58 --> [REQ_ID=95f755347ac0] [REQUEST][END]
INFO - 2026-03-13 16:32:58 --> [REQ_ID=95f755347ac0] [PERF] Execution time=0.046877
DEBUG - 2026-03-13 16:33:09 --> [REQ_ID=d05c138a53a3] [REQUEST][START] GET /index.php/Profile/
DEBUG - 2026-03-13 16:33:09 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-13 16:33:09 --> [REQ_ID=d05c138a53a3] [FILTER_BEFORE] /index.php/Profile/
DEBUG - 2026-03-13 16:33:09 --> [REQ_ID=d05c138a53a3] [ROUTE] Controller=\App\Controllers\App\Modules\User\Controllers\DashboardController Method=profile
DEBUG - 2026-03-13 16:33:09 --> [REQ_ID=d05c138a53a3] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Profile/
DEBUG - 2026-03-13 16:33:09 --> [CSRF] token name=csrf_test_name hash=6fe1be02b78a439e3fcdfe0d6235bee7
DEBUG - 2026-03-13 16:33:09 --> [REQ_ID=d05c138a53a3] [REQUEST][END]
INFO - 2026-03-13 16:33:09 --> [REQ_ID=d05c138a53a3] [PERF] Execution time=0.009581
DEBUG - 2026-03-13 16:33:10 --> [REQ_ID=50eb6f35ef21] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-13 16:33:10 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-13 16:33:10 --> [REQ_ID=50eb6f35ef21] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-13 16:33:10 --> [REQ_ID=50eb6f35ef21] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-13 16:33:10 --> [REQ_ID=50eb6f35ef21] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-13 16:33:10 --> [CSRF] token name=csrf_test_name hash=6fe1be02b78a439e3fcdfe0d6235bee7
DEBUG - 2026-03-13 16:33:10 --> [REQ_ID=6cda2363cc1e] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-13 16:33:10 --> [REQ_ID=6cda2363cc1e] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-13 16:33:10 --> [REQ_ID=50eb6f35ef21] [FILTER_AFTER]
DEBUG - 2026-03-13 16:33:10 --> [REQ_ID=50eb6f35ef21] [LIFECYCLE][END] status=200 duration_ms=36.01 memory_delta=0
INFO - 2026-03-13 16:33:10 --> [REQ_ID=6cda2363cc1e] [PERF] Execution time=0.035948
DEBUG - 2026-03-13 16:33:10 --> [REQ_ID=50eb6f35ef21] [REQUEST][END]
INFO - 2026-03-13 16:33:10 --> [REQ_ID=50eb6f35ef21] [PERF] Execution time=0.046243
DEBUG - 2026-03-13 16:36:22 --> [REQ_ID=a249f3a8fd2b] [REQUEST][START] HEAD /
DEBUG - 2026-03-13 16:36:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-13 16:36:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-13 16:36:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-13 16:36:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-13 16:36:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-13 16:41:22 --> [REQ_ID=beae43328b4d] [REQUEST][START] HEAD /
DEBUG - 2026-03-13 16:41:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-13 16:41:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-13 16:41:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-13 16:41:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-13 16:41:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-13 16:46:22 --> [REQ_ID=28c66e307d0f] [REQUEST][START] HEAD /
DEBUG - 2026-03-13 16:46:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-13 16:46:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-13 16:46:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-13 16:46:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-13 16:46:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-13 16:51:22 --> [REQ_ID=493e8b5b40c3] [REQUEST][START] HEAD /
DEBUG - 2026-03-13 16:51:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-13 16:51:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-13 16:51:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-13 16:51:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-13 16:51:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-13 16:56:22 --> [REQ_ID=643d49f3d837] [REQUEST][START] HEAD /
DEBUG - 2026-03-13 16:56:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-13 16:56:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-13 16:56:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-13 16:56:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-13 16:56:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-13 16:59:41 --> [REQ_ID=f1457fc16e3c] [REQUEST][START] GET /
DEBUG - 2026-03-13 16:59:41 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-13 16:59:41 --> [REQ_ID=f1457fc16e3c] [FILTER_BEFORE] /
DEBUG - 2026-03-13 16:59:41 --> [REQ_ID=f1457fc16e3c] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-13 16:59:41 --> [REQ_ID=f1457fc16e3c] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-13 16:59:41 --> [CSRF] token name=csrf_test_name hash=78e20337b5d4a5ba3e8e37a3a3ed6701
DEBUG - 2026-03-13 16:59:41 --> [REQ_ID=d576441ff357] [INIT] App\Controllers\Home::GET
INFO - 2026-03-13 16:59:41 --> [REQ_ID=d576441ff357] [MEMORY][controller-start] 6291456
INFO - 2026-03-13 16:59:41 --> [REQ_ID=d576441ff357] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-13 16:59:41 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-13 16:59:42 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-03-13 16:59:42 --> [REQ_ID=d576441ff357] [VIEW_RENDER] themes/public/home
INFO - 2026-03-13 16:59:42 --> [REQ_ID=d576441ff357] [MEMORY][commonData:start] 10485760
INFO - 2026-03-13 16:59:42 --> themesMemory usage: 10485760
DEBUG - 2026-03-13 16:59:42 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-13 16:59:42 --> [REQ_ID=f1457fc16e3c] [FILTER_AFTER]
DEBUG - 2026-03-13 16:59:42 --> [REQ_ID=f1457fc16e3c] [LIFECYCLE][END] status=200 duration_ms=1,008.50 memory_delta=4194304
INFO - 2026-03-13 16:59:42 --> [REQ_ID=d576441ff357] [PERF] Execution time=1.006352
DEBUG - 2026-03-13 16:59:42 --> [REQ_ID=f1457fc16e3c] [REQUEST][END]
INFO - 2026-03-13 16:59:42 --> [REQ_ID=f1457fc16e3c] [PERF] Execution time=1.061023
DEBUG - 2026-03-13 16:59:53 --> [REQ_ID=f2345b543c3b] [REQUEST][START] GET /
DEBUG - 2026-03-13 16:59:53 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-13 16:59:53 --> [REQ_ID=f2345b543c3b] [FILTER_BEFORE] /
DEBUG - 2026-03-13 16:59:53 --> [REQ_ID=f2345b543c3b] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-13 16:59:53 --> [REQ_ID=f2345b543c3b] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-13 16:59:53 --> [CSRF] token name=csrf_test_name hash=a1a0cc8d7a61f423244b92396997abae
DEBUG - 2026-03-13 16:59:53 --> [REQ_ID=94c43795d90b] [INIT] App\Controllers\Home::GET
INFO - 2026-03-13 16:59:53 --> [REQ_ID=94c43795d90b] [MEMORY][controller-start] 6291456
INFO - 2026-03-13 16:59:53 --> [REQ_ID=94c43795d90b] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-13 16:59:53 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-13 16:59:53 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
DEBUG - 2026-03-13 16:59:53 --> [REQ_ID=94c43795d90b] [VIEW_RENDER] themes/public/home
INFO - 2026-03-13 16:59:53 --> [REQ_ID=94c43795d90b] [MEMORY][commonData:start] 8388608
INFO - 2026-03-13 16:59:53 --> themesMemory usage: 8388608
DEBUG - 2026-03-13 16:59:53 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-13 16:59:53 --> [REQ_ID=f2345b543c3b] [FILTER_AFTER]
DEBUG - 2026-03-13 16:59:53 --> [REQ_ID=f2345b543c3b] [LIFECYCLE][END] status=200 duration_ms=691.79 memory_delta=2097152
INFO - 2026-03-13 16:59:53 --> [REQ_ID=94c43795d90b] [PERF] Execution time=0.691475
DEBUG - 2026-03-13 16:59:53 --> [REQ_ID=f2345b543c3b] [REQUEST][END]
INFO - 2026-03-13 16:59:53 --> [REQ_ID=f2345b543c3b] [PERF] Execution time=0.701394
DEBUG - 2026-03-13 17:00:01 --> [REQ_ID=b775e9bf052c] [REQUEST][START] GET /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-13 17:00:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-13 17:00:01 --> [REQ_ID=b775e9bf052c] [FILTER_BEFORE] /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-13 17:00:01 --> [REQ_ID=b775e9bf052c] [ROUTE] Controller=\App\Modules\Management\Controllers\ManagementAPIController Method=Run_CRON_Tasks
DEBUG - 2026-03-13 17:00:01 --> [REQ_ID=b775e9bf052c] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-13 17:00:01 --> [REQ_ID=b775e9bf052c] [REQUEST][END]
INFO - 2026-03-13 17:00:01 --> [REQ_ID=b775e9bf052c] [PERF] Execution time=0.027392
DEBUG - 2026-03-13 17:01:22 --> [REQ_ID=0c8e1abed6e3] [REQUEST][START] HEAD /
DEBUG - 2026-03-13 17:01:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-13 17:01:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-13 17:01:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-13 17:01:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-13 17:01:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-13 17:02:15 --> [REQ_ID=6eb02c133766] [REQUEST][START] GET /
DEBUG - 2026-03-13 17:02:15 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-13 17:02:15 --> [REQ_ID=6eb02c133766] [FILTER_BEFORE] /
DEBUG - 2026-03-13 17:02:15 --> [REQ_ID=6eb02c133766] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-13 17:02:15 --> [REQ_ID=6eb02c133766] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-13 17:02:15 --> [CSRF] token name=csrf_test_name hash=5a8f6e9dea040957b4fe736e5a10fc10
DEBUG - 2026-03-13 17:02:15 --> [REQ_ID=bc4635635ca4] [INIT] App\Controllers\Home::GET
INFO - 2026-03-13 17:02:15 --> [REQ_ID=bc4635635ca4] [MEMORY][controller-start] 4194304
INFO - 2026-03-13 17:02:15 --> [REQ_ID=bc4635635ca4] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-13 17:02:15 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-13 17:02:16 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
DEBUG - 2026-03-13 17:02:16 --> [REQ_ID=bc4635635ca4] [VIEW_RENDER] themes/public/home
INFO - 2026-03-13 17:02:16 --> [REQ_ID=bc4635635ca4] [MEMORY][commonData:start] 8388608
INFO - 2026-03-13 17:02:16 --> themesMemory usage: 8388608
DEBUG - 2026-03-13 17:02:16 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-13 17:02:16 --> [REQ_ID=6eb02c133766] [FILTER_AFTER]
DEBUG - 2026-03-13 17:02:16 --> [REQ_ID=6eb02c133766] [LIFECYCLE][END] status=200 duration_ms=717.93 memory_delta=4194304
INFO - 2026-03-13 17:02:16 --> [REQ_ID=bc4635635ca4] [PERF] Execution time=0.715961
DEBUG - 2026-03-13 17:02:16 --> [REQ_ID=6eb02c133766] [REQUEST][END]
INFO - 2026-03-13 17:02:16 --> [REQ_ID=6eb02c133766] [PERF] Execution time=0.738306
DEBUG - 2026-03-13 17:05:15 --> [REQ_ID=f0eb3c4bbb2d] [REQUEST][START] GET /index.php/How-It-Works/Daily-Financial-News
DEBUG - 2026-03-13 17:05:15 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-13 17:05:15 --> [REQ_ID=f0eb3c4bbb2d] [FILTER_BEFORE] /index.php/How-It-Works/Daily-Financial-News
DEBUG - 2026-03-13 17:05:15 --> [REQ_ID=f0eb3c4bbb2d] [ROUTE] Controller=\App\Modules\Blog\Controllers\HowItWorksController Method=DailyFinancialNews
DEBUG - 2026-03-13 17:05:15 --> [REQ_ID=f0eb3c4bbb2d] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/How-It-Works/Daily-Financial-News
DEBUG - 2026-03-13 17:05:15 --> [CSRF] token name=csrf_test_name hash=56a49289245fb1ae6a1bca76041fef60
DEBUG - 2026-03-13 17:05:15 --> [REQ_ID=03d42da2ffaf] [INIT] App\Modules\Blog\Controllers\HowItWorksController::GET
INFO - 2026-03-13 17:05:15 --> [REQ_ID=03d42da2ffaf] [MEMORY][controller-start] 6291456
DEBUG - 2026-03-13 17:05:15 --> [REQ_ID=03d42da2ffaf] [METHOD_ENTRY] DailyFinancialNews
DEBUG - 2026-03-13 17:05:15 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-13 17:05:15 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-13 17:05:15 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-13 17:05:15 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-13 17:05:15 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-13 17:05:15 --> MyMICoin: guest context detected; skipping user-specific preload.
INFO - 2026-03-13 17:05:15 --> [REQ_ID=03d42da2ffaf] [MEMORY][commonData:start] 6291456
INFO - 2026-03-13 17:05:16 --> themesMemory usage: 10485760
DEBUG - 2026-03-13 17:05:16 --> [MetaService] slug=how-it-works/daily-financial-news pageName= cacheHit= path=DB
DEBUG - 2026-03-13 17:05:16 --> [REQ_ID=f0eb3c4bbb2d] [FILTER_AFTER]
DEBUG - 2026-03-13 17:05:16 --> [REQ_ID=f0eb3c4bbb2d] [LIFECYCLE][END] status=200 duration_ms=984.48 memory_delta=4194304
INFO - 2026-03-13 17:05:16 --> [REQ_ID=03d42da2ffaf] [PERF] Execution time=0.982438
DEBUG - 2026-03-13 17:05:16 --> [REQ_ID=f0eb3c4bbb2d] [REQUEST][END]
INFO - 2026-03-13 17:05:16 --> [REQ_ID=f0eb3c4bbb2d] [PERF] Execution time=1.026715
DEBUG - 2026-03-13 17:06:22 --> [REQ_ID=140638918304] [REQUEST][START] HEAD /
DEBUG - 2026-03-13 17:06:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-13 17:06:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-13 17:06:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-13 17:06:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-13 17:06:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-13 17:11:22 --> [REQ_ID=8dedac8bd1e0] [REQUEST][START] HEAD /
DEBUG - 2026-03-13 17:11:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-13 17:11:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-13 17:11:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-13 17:11:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-13 17:11:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-13 17:12:50 --> [REQ_ID=90edc1181e7a] [REQUEST][START] GET /
DEBUG - 2026-03-13 17:12:50 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-13 17:12:50 --> [REQ_ID=90edc1181e7a] [FILTER_BEFORE] /
DEBUG - 2026-03-13 17:12:50 --> [REQ_ID=90edc1181e7a] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-13 17:12:50 --> [REQ_ID=90edc1181e7a] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-13 17:12:50 --> [CSRF] token name=csrf_test_name hash=318464ef92889779b44657d1d5f2bbbe
DEBUG - 2026-03-13 17:12:50 --> [REQ_ID=499ec62edd79] [INIT] App\Controllers\Home::GET
INFO - 2026-03-13 17:12:50 --> [REQ_ID=499ec62edd79] [MEMORY][controller-start] 6291456
INFO - 2026-03-13 17:12:50 --> [REQ_ID=499ec62edd79] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-13 17:12:50 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-13 17:12:50 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
DEBUG - 2026-03-13 17:12:50 --> [REQ_ID=499ec62edd79] [VIEW_RENDER] themes/public/home
INFO - 2026-03-13 17:12:50 --> [REQ_ID=499ec62edd79] [MEMORY][commonData:start] 10485760
INFO - 2026-03-13 17:12:50 --> themesMemory usage: 10485760
DEBUG - 2026-03-13 17:12:50 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-13 17:12:50 --> [REQ_ID=90edc1181e7a] [FILTER_AFTER]
DEBUG - 2026-03-13 17:12:50 --> [REQ_ID=90edc1181e7a] [LIFECYCLE][END] status=200 duration_ms=681.30 memory_delta=4194304
INFO - 2026-03-13 17:12:50 --> [REQ_ID=499ec62edd79] [PERF] Execution time=0.679274
DEBUG - 2026-03-13 17:12:50 --> [REQ_ID=90edc1181e7a] [REQUEST][END]
INFO - 2026-03-13 17:12:50 --> [REQ_ID=90edc1181e7a] [PERF] Execution time=0.720403
DEBUG - 2026-03-13 17:15:01 --> [REQ_ID=a24782126345] [REQUEST][START] GET /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-13 17:15:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-13 17:15:01 --> [REQ_ID=a24782126345] [FILTER_BEFORE] /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-13 17:15:01 --> [REQ_ID=a24782126345] [ROUTE] Controller=\App\Modules\APIs\Controllers\AlertsAPIController Method=fetchEmailAlerts
DEBUG - 2026-03-13 17:15:01 --> [REQ_ID=a24782126345] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-13 17:15:01 --> [REQ_ID=a24782126345] [REQUEST][END]
INFO - 2026-03-13 17:15:01 --> [REQ_ID=a24782126345] [PERF] Execution time=0.048026
DEBUG - 2026-03-13 17:16:22 --> [REQ_ID=118dd441a025] [REQUEST][START] HEAD /
DEBUG - 2026-03-13 17:16:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-13 17:16:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-13 17:16:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-13 17:16:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-13 17:16:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-13 17:21:22 --> [REQ_ID=e402cda6f1cd] [REQUEST][START] HEAD /
DEBUG - 2026-03-13 17:21:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-13 17:21:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-13 17:21:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-13 17:21:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-13 17:21:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-13 17:26:22 --> [REQ_ID=9983444c47a6] [REQUEST][START] HEAD /
DEBUG - 2026-03-13 17:26:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-13 17:26:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-13 17:26:23 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-13 17:26:23 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-13 17:26:23 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-13 17:31:22 --> [REQ_ID=46b932582e57] [REQUEST][START] HEAD /
DEBUG - 2026-03-13 17:31:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-13 17:31:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-13 17:31:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-13 17:31:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-13 17:31:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-13 17:36:22 --> [REQ_ID=d5f873ae4901] [REQUEST][START] HEAD /
DEBUG - 2026-03-13 17:36:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-13 17:36:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-13 17:36:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-13 17:36:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-13 17:36:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-13 17:41:22 --> [REQ_ID=a822e47dc2b0] [REQUEST][START] HEAD /
DEBUG - 2026-03-13 17:41:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-13 17:41:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-13 17:41:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-13 17:41:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-13 17:41:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-13 17:46:22 --> [REQ_ID=945898556c18] [REQUEST][START] HEAD /
DEBUG - 2026-03-13 17:46:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-13 17:46:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-13 17:46:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-13 17:46:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-13 17:46:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-13 17:51:22 --> [REQ_ID=0a7e7368788f] [REQUEST][START] HEAD /
DEBUG - 2026-03-13 17:51:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-13 17:51:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-13 17:51:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-13 17:51:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-13 17:51:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-13 17:56:22 --> [REQ_ID=b37529612918] [REQUEST][START] HEAD /
DEBUG - 2026-03-13 17:56:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-13 17:56:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-13 17:56:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-13 17:56:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-13 17:56:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-13 17:59:16 --> [REQ_ID=a9f7d8fb7e8c] [REQUEST][START] GET /index.php/Memberships/Customize
DEBUG - 2026-03-13 17:59:16 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-13 17:59:16 --> [REQ_ID=a9f7d8fb7e8c] [REQUEST][END]
INFO - 2026-03-13 17:59:16 --> [REQ_ID=a9f7d8fb7e8c] [PERF] Execution time=0.039411
DEBUG - 2026-03-13 18:00:02 --> [REQ_ID=0d016bb02405] [REQUEST][START] GET /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-13 18:00:02 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-13 18:00:02 --> [REQ_ID=0d016bb02405] [FILTER_BEFORE] /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-13 18:00:02 --> [REQ_ID=0d016bb02405] [ROUTE] Controller=\App\Modules\Management\Controllers\ManagementAPIController Method=Run_CRON_Tasks
DEBUG - 2026-03-13 18:00:02 --> [REQ_ID=0d016bb02405] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-13 18:00:02 --> [REQ_ID=0d016bb02405] [REQUEST][END]
INFO - 2026-03-13 18:00:02 --> [REQ_ID=0d016bb02405] [PERF] Execution time=0.015077
DEBUG - 2026-03-13 18:01:22 --> [REQ_ID=2357ab8d2653] [REQUEST][START] HEAD /
DEBUG - 2026-03-13 18:01:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-13 18:01:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-13 18:01:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-13 18:01:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-13 18:01:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-13 18:06:22 --> [REQ_ID=38ea81a4ca79] [REQUEST][START] HEAD /
DEBUG - 2026-03-13 18:06:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-13 18:06:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-13 18:06:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-13 18:06:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-13 18:06:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-13 18:11:22 --> [REQ_ID=63df4570fd70] [REQUEST][START] HEAD /
DEBUG - 2026-03-13 18:11:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-13 18:11:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-13 18:11:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-13 18:11:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-13 18:11:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-13 18:15:01 --> [REQ_ID=0802994542b5] [REQUEST][START] GET /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-13 18:15:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-13 18:15:01 --> [REQ_ID=0802994542b5] [FILTER_BEFORE] /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-13 18:15:01 --> [REQ_ID=0802994542b5] [ROUTE] Controller=\App\Modules\APIs\Controllers\AlertsAPIController Method=fetchEmailAlerts
DEBUG - 2026-03-13 18:15:01 --> [REQ_ID=0802994542b5] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-13 18:15:01 --> [REQ_ID=0802994542b5] [REQUEST][END]
INFO - 2026-03-13 18:15:01 --> [REQ_ID=0802994542b5] [PERF] Execution time=0.046521
DEBUG - 2026-03-13 18:16:22 --> [REQ_ID=8af51c09a073] [REQUEST][START] HEAD /
DEBUG - 2026-03-13 18:16:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-13 18:16:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-13 18:16:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-13 18:16:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-13 18:16:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-13 18:21:22 --> [REQ_ID=655ccd70025c] [REQUEST][START] HEAD /
DEBUG - 2026-03-13 18:21:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-13 18:21:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-13 18:21:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-13 18:21:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-13 18:21:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-13 18:26:22 --> [REQ_ID=ef401e102b2f] [REQUEST][START] HEAD /
DEBUG - 2026-03-13 18:26:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-13 18:26:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-13 18:26:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-13 18:26:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-13 18:26:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-13 18:31:22 --> [REQ_ID=656c40aa7e4b] [REQUEST][START] HEAD /
DEBUG - 2026-03-13 18:31:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-13 18:31:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-13 18:31:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-13 18:31:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-13 18:31:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-13 18:36:22 --> [REQ_ID=8143a5a1c7ff] [REQUEST][START] HEAD /
DEBUG - 2026-03-13 18:36:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-13 18:36:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-13 18:36:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-13 18:36:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-13 18:36:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-13 18:37:36 --> [REQ_ID=3846883294aa] [REQUEST][START] GET /
DEBUG - 2026-03-13 18:37:36 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-13 18:37:36 --> [REQ_ID=3846883294aa] [FILTER_BEFORE] /
DEBUG - 2026-03-13 18:37:36 --> [REQ_ID=3846883294aa] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-13 18:37:36 --> [REQ_ID=3846883294aa] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-13 18:37:36 --> [CSRF] token name=csrf_test_name hash=701c8254bc02e8e4e5905a27dd03de97
DEBUG - 2026-03-13 18:37:36 --> [REQ_ID=0b789220dbe3] [INIT] App\Controllers\Home::GET
INFO - 2026-03-13 18:37:36 --> [REQ_ID=0b789220dbe3] [MEMORY][controller-start] 4194304
INFO - 2026-03-13 18:37:36 --> [REQ_ID=0b789220dbe3] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-13 18:37:36 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-13 18:37:37 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-03-13 18:37:37 --> [REQ_ID=0b789220dbe3] [VIEW_RENDER] themes/public/home
INFO - 2026-03-13 18:37:37 --> [REQ_ID=0b789220dbe3] [MEMORY][commonData:start] 8388608
INFO - 2026-03-13 18:37:37 --> themesMemory usage: 8388608
DEBUG - 2026-03-13 18:37:37 --> [MetaService] slug= pageName=Home cacheHit= path=DB
DEBUG - 2026-03-13 18:37:37 --> [REQ_ID=3846883294aa] [FILTER_AFTER]
DEBUG - 2026-03-13 18:37:37 --> [REQ_ID=3846883294aa] [LIFECYCLE][END] status=200 duration_ms=818.65 memory_delta=4194304
INFO - 2026-03-13 18:37:37 --> [REQ_ID=0b789220dbe3] [PERF] Execution time=0.816606
DEBUG - 2026-03-13 18:37:37 --> [REQ_ID=3846883294aa] [REQUEST][END]
INFO - 2026-03-13 18:37:37 --> [REQ_ID=3846883294aa] [PERF] Execution time=0.837395
DEBUG - 2026-03-13 18:41:22 --> [REQ_ID=d283ecb5bf1d] [REQUEST][START] HEAD /
DEBUG - 2026-03-13 18:41:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-13 18:41:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-13 18:41:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-13 18:41:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-13 18:41:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-13 18:41:52 --> [REQ_ID=94a1d1827c09] [REQUEST][START] GET /
DEBUG - 2026-03-13 18:41:52 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-13 18:41:52 --> [REQ_ID=94a1d1827c09] [REQUEST][END]
INFO - 2026-03-13 18:41:52 --> [REQ_ID=94a1d1827c09] [PERF] Execution time=0.017674
DEBUG - 2026-03-13 18:46:22 --> [REQ_ID=21b9489438c6] [REQUEST][START] HEAD /
DEBUG - 2026-03-13 18:46:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-13 18:46:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-13 18:46:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-13 18:46:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-13 18:46:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-13 18:51:22 --> [REQ_ID=87ec3c4ef569] [REQUEST][START] HEAD /
DEBUG - 2026-03-13 18:51:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-13 18:51:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-13 18:51:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-13 18:51:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-13 18:51:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-13 18:55:38 --> [REQ_ID=f4840482d460] [REQUEST][START] HEAD /
DEBUG - 2026-03-13 18:55:38 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-13 18:55:38 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-13 18:55:38 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-13 18:55:38 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-13 18:55:38 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://mymiwallet.com/
DEBUG - 2026-03-13 18:56:22 --> [REQ_ID=4d0c57b325ca] [REQUEST][START] HEAD /
DEBUG - 2026-03-13 18:56:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-13 18:56:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-13 18:56:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-13 18:56:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-13 18:56:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-13 19:00:01 --> [REQ_ID=f210556afb3f] [REQUEST][START] GET /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-13 19:00:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-13 19:00:01 --> [REQ_ID=f210556afb3f] [FILTER_BEFORE] /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-13 19:00:01 --> [REQ_ID=f210556afb3f] [ROUTE] Controller=\App\Modules\Management\Controllers\ManagementAPIController Method=Run_CRON_Tasks
DEBUG - 2026-03-13 19:00:01 --> [REQ_ID=f210556afb3f] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-13 19:00:01 --> [REQ_ID=f210556afb3f] [REQUEST][END]
INFO - 2026-03-13 19:00:01 --> [REQ_ID=f210556afb3f] [PERF] Execution time=0.054413
DEBUG - 2026-03-13 19:01:22 --> [REQ_ID=89508e3fe4fa] [REQUEST][START] HEAD /
DEBUG - 2026-03-13 19:01:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-13 19:01:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-13 19:01:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-13 19:01:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-13 19:01:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-13 19:01:32 --> [REQ_ID=fa639720-631e-4e26-a673-afde3c11fb6f] [REQUEST][START] GET /
DEBUG - 2026-03-13 19:01:32 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-13 19:01:32 --> [REQ_ID=fa639720-631e-4e26-a673-afde3c11fb6f] [REQUEST][END]
INFO - 2026-03-13 19:01:32 --> [REQ_ID=fa639720-631e-4e26-a673-afde3c11fb6f] [PERF] Execution time=0.018234
DEBUG - 2026-03-13 19:06:22 --> [REQ_ID=f2077dd8f706] [REQUEST][START] HEAD /
DEBUG - 2026-03-13 19:06:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-13 19:06:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-13 19:06:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-13 19:06:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-13 19:06:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-13 19:10:02 --> [REQ_ID=6ed36fa74fa8] [REQUEST][START] GET /index.php/Management/Marketing/Schedule
DEBUG - 2026-03-13 19:10:02 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-13 19:10:02 --> [REQ_ID=6ed36fa74fa8] [REQUEST][END]
INFO - 2026-03-13 19:10:02 --> [REQ_ID=6ed36fa74fa8] [PERF] Execution time=0.054238
DEBUG - 2026-03-13 19:10:17 --> [REQ_ID=da8a4c68c9dd] [REQUEST][START] GET /
DEBUG - 2026-03-13 19:10:17 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-13 19:10:17 --> [REQ_ID=da8a4c68c9dd] [FILTER_BEFORE] /
DEBUG - 2026-03-13 19:10:17 --> [REQ_ID=da8a4c68c9dd] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-13 19:10:17 --> [REQ_ID=da8a4c68c9dd] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-13 19:10:17 --> [CSRF] token name=csrf_test_name hash=e5dda983e3331e9fd7a47ed574d65c13
DEBUG - 2026-03-13 19:10:17 --> [REQ_ID=a0e201bf384c] [INIT] App\Controllers\Home::GET
INFO - 2026-03-13 19:10:17 --> [REQ_ID=a0e201bf384c] [MEMORY][controller-start] 4194304
INFO - 2026-03-13 19:10:17 --> [REQ_ID=a0e201bf384c] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-13 19:10:17 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-13 19:10:17 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-03-13 19:10:17 --> [REQ_ID=a0e201bf384c] [VIEW_RENDER] themes/public/home
INFO - 2026-03-13 19:10:17 --> [REQ_ID=a0e201bf384c] [MEMORY][commonData:start] 8388608
INFO - 2026-03-13 19:10:17 --> themesMemory usage: 8388608
DEBUG - 2026-03-13 19:10:17 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-13 19:10:17 --> [REQ_ID=da8a4c68c9dd] [FILTER_AFTER]
DEBUG - 2026-03-13 19:10:17 --> [REQ_ID=da8a4c68c9dd] [LIFECYCLE][END] status=200 duration_ms=780.45 memory_delta=4194304
INFO - 2026-03-13 19:10:17 --> [REQ_ID=a0e201bf384c] [PERF] Execution time=0.778467
DEBUG - 2026-03-13 19:10:17 --> [REQ_ID=da8a4c68c9dd] [REQUEST][END]
INFO - 2026-03-13 19:10:17 --> [REQ_ID=da8a4c68c9dd] [PERF] Execution time=0.791361
DEBUG - 2026-03-13 19:10:46 --> [REQ_ID=a6a50d1a9885] [REQUEST][START] GET /
DEBUG - 2026-03-13 19:10:46 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-13 19:10:46 --> [REQ_ID=a6a50d1a9885] [REQUEST][END]
INFO - 2026-03-13 19:10:46 --> [REQ_ID=a6a50d1a9885] [PERF] Execution time=0.010730
DEBUG - 2026-03-13 19:11:22 --> [REQ_ID=75756d16ab87] [REQUEST][START] HEAD /
DEBUG - 2026-03-13 19:11:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-13 19:11:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-13 19:11:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-13 19:11:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-13 19:11:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-13 19:15:02 --> [REQ_ID=e4f9360d39dd] [REQUEST][START] GET /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-13 19:15:02 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-13 19:15:02 --> [REQ_ID=e4f9360d39dd] [FILTER_BEFORE] /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-13 19:15:02 --> [REQ_ID=e4f9360d39dd] [ROUTE] Controller=\App\Modules\APIs\Controllers\AlertsAPIController Method=fetchEmailAlerts
DEBUG - 2026-03-13 19:15:02 --> [REQ_ID=e4f9360d39dd] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-13 19:15:02 --> [REQ_ID=e4f9360d39dd] [REQUEST][END]
INFO - 2026-03-13 19:15:02 --> [REQ_ID=e4f9360d39dd] [PERF] Execution time=0.050954
DEBUG - 2026-03-13 19:16:22 --> [REQ_ID=f4fa9aba81ec] [REQUEST][START] HEAD /
DEBUG - 2026-03-13 19:16:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-13 19:16:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-13 19:16:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-13 19:16:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-13 19:16:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-13 19:16:25 --> [REQ_ID=d3d369f4be4c] [REQUEST][START] GET /
DEBUG - 2026-03-13 19:16:25 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-13 19:16:25 --> [REQ_ID=d3d369f4be4c] [REQUEST][END]
INFO - 2026-03-13 19:16:25 --> [REQ_ID=d3d369f4be4c] [PERF] Execution time=0.017237
DEBUG - 2026-03-13 19:21:22 --> [REQ_ID=97437e7374b8] [REQUEST][START] HEAD /
DEBUG - 2026-03-13 19:21:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-13 19:21:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-13 19:21:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-13 19:21:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-13 19:21:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-13 19:26:22 --> [REQ_ID=f8bc02f90a1c] [REQUEST][START] HEAD /
DEBUG - 2026-03-13 19:26:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-13 19:26:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-13 19:26:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-13 19:26:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-13 19:26:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-13 19:31:22 --> [REQ_ID=cb2237586b31] [REQUEST][START] HEAD /
DEBUG - 2026-03-13 19:31:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-13 19:31:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-13 19:31:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-13 19:31:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-13 19:31:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-13 19:33:46 --> [REQ_ID=7e98eb270467] [REQUEST][START] GET /
DEBUG - 2026-03-13 19:33:46 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-13 19:33:46 --> [REQ_ID=7e98eb270467] [REQUEST][END]
INFO - 2026-03-13 19:33:46 --> [REQ_ID=7e98eb270467] [PERF] Execution time=0.039858
DEBUG - 2026-03-13 19:36:22 --> [REQ_ID=43a61066e474] [REQUEST][START] HEAD /
DEBUG - 2026-03-13 19:36:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-13 19:36:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-13 19:36:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-13 19:36:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-13 19:36:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-13 19:41:22 --> [REQ_ID=f74db0be0006] [REQUEST][START] HEAD /
DEBUG - 2026-03-13 19:41:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-13 19:41:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-13 19:41:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-13 19:41:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-13 19:41:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-13 19:46:22 --> [REQ_ID=ceea70453960] [REQUEST][START] HEAD /
DEBUG - 2026-03-13 19:46:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-13 19:46:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-13 19:46:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-13 19:46:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-13 19:46:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-13 19:51:22 --> [REQ_ID=6c65324cb7be] [REQUEST][START] HEAD /
DEBUG - 2026-03-13 19:51:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-13 19:51:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-13 19:51:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-13 19:51:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-13 19:51:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-13 19:56:22 --> [REQ_ID=3c16e976fbe3] [REQUEST][START] HEAD /
DEBUG - 2026-03-13 19:56:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-13 19:56:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-13 19:56:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-13 19:56:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-13 19:56:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-13 20:00:01 --> [REQ_ID=8c045cebc608] [REQUEST][START] GET /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-13 20:00:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-13 20:00:01 --> [REQ_ID=8c045cebc608] [FILTER_BEFORE] /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-13 20:00:01 --> [REQ_ID=8c045cebc608] [ROUTE] Controller=\App\Modules\Management\Controllers\ManagementAPIController Method=Run_CRON_Tasks
DEBUG - 2026-03-13 20:00:01 --> [REQ_ID=8c045cebc608] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-13 20:00:01 --> [REQ_ID=8c045cebc608] [REQUEST][END]
INFO - 2026-03-13 20:00:01 --> [REQ_ID=8c045cebc608] [PERF] Execution time=0.049429
DEBUG - 2026-03-13 20:01:22 --> [REQ_ID=d7d5a04b9942] [REQUEST][START] HEAD /
DEBUG - 2026-03-13 20:01:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-13 20:01:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-13 20:01:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-13 20:01:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-13 20:01:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-13 20:06:22 --> [REQ_ID=0355f86dc9c7] [REQUEST][START] HEAD /
DEBUG - 2026-03-13 20:06:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-13 20:06:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-13 20:06:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-13 20:06:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-13 20:06:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-13 20:06:46 --> [REQ_ID=e25fd1c412bc] [REQUEST][START] GET /
DEBUG - 2026-03-13 20:06:46 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-13 20:06:46 --> [REQ_ID=e25fd1c412bc] [REQUEST][END]
INFO - 2026-03-13 20:06:46 --> [REQ_ID=e25fd1c412bc] [PERF] Execution time=0.018391
DEBUG - 2026-03-13 20:06:46 --> [REQ_ID=0db7b699a2d1] [REQUEST][START] GET /
DEBUG - 2026-03-13 20:06:46 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-13 20:06:46 --> [REQ_ID=0db7b699a2d1] [FILTER_BEFORE] /
DEBUG - 2026-03-13 20:06:46 --> [REQ_ID=0db7b699a2d1] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-13 20:06:46 --> [REQ_ID=0db7b699a2d1] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-13 20:06:46 --> [CSRF] token name=csrf_test_name hash=3cf5231f6057ff383fe39ece98be1b9f
DEBUG - 2026-03-13 20:06:46 --> [REQ_ID=82996d3263e5] [INIT] App\Controllers\Home::GET
INFO - 2026-03-13 20:06:46 --> [REQ_ID=82996d3263e5] [MEMORY][controller-start] 4194304
INFO - 2026-03-13 20:06:46 --> [REQ_ID=82996d3263e5] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-13 20:06:46 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-13 20:06:47 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-03-13 20:06:47 --> [REQ_ID=82996d3263e5] [VIEW_RENDER] themes/public/home
INFO - 2026-03-13 20:06:47 --> [REQ_ID=82996d3263e5] [MEMORY][commonData:start] 8388608
INFO - 2026-03-13 20:06:47 --> themesMemory usage: 8388608
DEBUG - 2026-03-13 20:06:47 --> [MetaService] slug= pageName=Home cacheHit= path=DB
DEBUG - 2026-03-13 20:06:47 --> [REQ_ID=0db7b699a2d1] [FILTER_AFTER]
DEBUG - 2026-03-13 20:06:47 --> [REQ_ID=0db7b699a2d1] [LIFECYCLE][END] status=200 duration_ms=733.99 memory_delta=4194304
INFO - 2026-03-13 20:06:47 --> [REQ_ID=82996d3263e5] [PERF] Execution time=0.732122
DEBUG - 2026-03-13 20:06:47 --> [REQ_ID=0db7b699a2d1] [REQUEST][END]
INFO - 2026-03-13 20:06:47 --> [REQ_ID=0db7b699a2d1] [PERF] Execution time=0.743435
DEBUG - 2026-03-13 20:11:22 --> [REQ_ID=f9a8151e99eb] [REQUEST][START] HEAD /
DEBUG - 2026-03-13 20:11:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-13 20:11:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-13 20:11:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-13 20:11:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-13 20:11:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-13 20:15:01 --> [REQ_ID=3c4cd34988ee] [REQUEST][START] GET /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-13 20:15:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-13 20:15:01 --> [REQ_ID=3c4cd34988ee] [FILTER_BEFORE] /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-13 20:15:01 --> [REQ_ID=3c4cd34988ee] [ROUTE] Controller=\App\Modules\APIs\Controllers\AlertsAPIController Method=fetchEmailAlerts
DEBUG - 2026-03-13 20:15:01 --> [REQ_ID=3c4cd34988ee] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-13 20:15:01 --> [REQ_ID=3c4cd34988ee] [REQUEST][END]
INFO - 2026-03-13 20:15:01 --> [REQ_ID=3c4cd34988ee] [PERF] Execution time=0.045397
DEBUG - 2026-03-13 20:16:22 --> [REQ_ID=1e7da5cf54ad] [REQUEST][START] HEAD /
DEBUG - 2026-03-13 20:16:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-13 20:16:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-13 20:16:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-13 20:16:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-13 20:16:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-13 20:21:22 --> [REQ_ID=08f2410d04f8] [REQUEST][START] HEAD /
DEBUG - 2026-03-13 20:21:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-13 20:21:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-13 20:21:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-13 20:21:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-13 20:21:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-13 20:26:22 --> [REQ_ID=0f2faba38e90] [REQUEST][START] HEAD /
DEBUG - 2026-03-13 20:26:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-13 20:26:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-13 20:26:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-13 20:26:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-13 20:26:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-13 20:31:22 --> [REQ_ID=ee68be0adde4] [REQUEST][START] HEAD /
DEBUG - 2026-03-13 20:31:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-13 20:31:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-13 20:31:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-13 20:31:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-13 20:31:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-13 20:36:22 --> [REQ_ID=c0f17883acf2] [REQUEST][START] HEAD /
DEBUG - 2026-03-13 20:36:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-13 20:36:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-13 20:36:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-13 20:36:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-13 20:36:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-13 20:36:40 --> [REQ_ID=7cbd0e736012] [REQUEST][START] GET /index.php/Account/Notifications
DEBUG - 2026-03-13 20:36:40 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-13 20:36:40 --> [REQ_ID=7cbd0e736012] [FILTER_BEFORE] /index.php/Account/Notifications
DEBUG - 2026-03-13 20:36:40 --> [REQ_ID=7cbd0e736012] [ROUTE] Controller=\App\Modules\User\Controllers\DashboardController Method=notifications
DEBUG - 2026-03-13 20:36:40 --> [REQ_ID=7cbd0e736012] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Account/Notifications
DEBUG - 2026-03-13 20:36:40 --> [CSRF] token name=csrf_test_name hash=edaa64a2aecce9806737aacda99ef74c
DEBUG - 2026-03-13 20:36:40 --> [REQ_ID=7cbd0e736012] [REQUEST][END]
INFO - 2026-03-13 20:36:40 --> [REQ_ID=7cbd0e736012] [PERF] Execution time=0.032184
DEBUG - 2026-03-13 20:36:40 --> [REQ_ID=b344afba63b9] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-13 20:36:40 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-13 20:36:40 --> [REQ_ID=b344afba63b9] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-13 20:36:40 --> [REQ_ID=b344afba63b9] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-13 20:36:40 --> [REQ_ID=b344afba63b9] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-13 20:36:40 --> [CSRF] token name=csrf_test_name hash=9a55d8d79be6146006d5f87a4df57fd7
DEBUG - 2026-03-13 20:36:40 --> [REQ_ID=c14be6168500] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-13 20:36:40 --> [REQ_ID=c14be6168500] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-13 20:36:40 --> [REQ_ID=b344afba63b9] [FILTER_AFTER]
DEBUG - 2026-03-13 20:36:40 --> [REQ_ID=b344afba63b9] [LIFECYCLE][END] status=200 duration_ms=50.71 memory_delta=0
INFO - 2026-03-13 20:36:40 --> [REQ_ID=c14be6168500] [PERF] Execution time=0.049655
DEBUG - 2026-03-13 20:36:40 --> [REQ_ID=b344afba63b9] [REQUEST][END]
INFO - 2026-03-13 20:36:40 --> [REQ_ID=b344afba63b9] [PERF] Execution time=0.062801
DEBUG - 2026-03-13 20:37:06 --> [REQ_ID=9ef6e9621813] [REQUEST][START] GET /index.php/Account/Connected-Accounts
DEBUG - 2026-03-13 20:37:06 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-13 20:37:06 --> [REQ_ID=9ef6e9621813] [FILTER_BEFORE] /index.php/Account/Connected-Accounts
DEBUG - 2026-03-13 20:37:06 --> [REQ_ID=9ef6e9621813] [ROUTE] Controller=\App\Modules\User\Controllers\DashboardController Method=connectedAccounts
DEBUG - 2026-03-13 20:37:06 --> [REQ_ID=9ef6e9621813] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Account/Connected-Accounts
DEBUG - 2026-03-13 20:37:06 --> [CSRF] token name=csrf_test_name hash=0089787a8a5959dbfb147baac65378a7
DEBUG - 2026-03-13 20:37:06 --> [REQ_ID=9ef6e9621813] [REQUEST][END]
INFO - 2026-03-13 20:37:06 --> [REQ_ID=9ef6e9621813] [PERF] Execution time=0.012366
DEBUG - 2026-03-13 20:37:07 --> [REQ_ID=85086db03a74] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-13 20:37:07 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-13 20:37:07 --> [REQ_ID=85086db03a74] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-13 20:37:07 --> [REQ_ID=85086db03a74] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-13 20:37:07 --> [REQ_ID=85086db03a74] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-13 20:37:07 --> [CSRF] token name=csrf_test_name hash=a1a803973a083f23aa128c6301922c1b
DEBUG - 2026-03-13 20:37:07 --> [REQ_ID=611e04d5f4b9] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-13 20:37:07 --> [REQ_ID=611e04d5f4b9] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-13 20:37:07 --> [REQ_ID=85086db03a74] [FILTER_AFTER]
DEBUG - 2026-03-13 20:37:07 --> [REQ_ID=85086db03a74] [LIFECYCLE][END] status=200 duration_ms=55.37 memory_delta=0
INFO - 2026-03-13 20:37:07 --> [REQ_ID=611e04d5f4b9] [PERF] Execution time=0.051161
DEBUG - 2026-03-13 20:37:07 --> [REQ_ID=85086db03a74] [REQUEST][END]
INFO - 2026-03-13 20:37:07 --> [REQ_ID=85086db03a74] [PERF] Execution time=0.065645
DEBUG - 2026-03-13 20:39:59 --> [REQ_ID=62245c95d998] [REQUEST][START] GET /index.php/Management/Budgeting
DEBUG - 2026-03-13 20:39:59 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-13 20:39:59 --> [REQ_ID=62245c95d998] [FILTER_BEFORE] /index.php/Management/Budgeting
DEBUG - 2026-03-13 20:39:59 --> [REQ_ID=62245c95d998] [ROUTE] Controller=\App\Modules\Management\Controllers\BudgetingAdminController Method=index
DEBUG - 2026-03-13 20:39:59 --> [REQ_ID=62245c95d998] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Management/Budgeting
DEBUG - 2026-03-13 20:39:59 --> [CSRF] token name=csrf_test_name hash=7615773568c7bd557b6e1cbefa4af180
DEBUG - 2026-03-13 20:39:59 --> [REQ_ID=62245c95d998] [REQUEST][END]
INFO - 2026-03-13 20:39:59 --> [REQ_ID=62245c95d998] [PERF] Execution time=0.053468
DEBUG - 2026-03-13 20:40:00 --> [REQ_ID=72cbbcacb982] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-13 20:40:00 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-13 20:40:00 --> [REQ_ID=72cbbcacb982] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-13 20:40:00 --> [REQ_ID=72cbbcacb982] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-13 20:40:00 --> [REQ_ID=72cbbcacb982] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-13 20:40:00 --> [CSRF] token name=csrf_test_name hash=79c5f02ffa9c25ab72d16c734888c3ac
DEBUG - 2026-03-13 20:40:00 --> [REQ_ID=1c7eb2fd52f6] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-13 20:40:00 --> [REQ_ID=1c7eb2fd52f6] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-13 20:40:00 --> [REQ_ID=72cbbcacb982] [FILTER_AFTER]
DEBUG - 2026-03-13 20:40:00 --> [REQ_ID=72cbbcacb982] [LIFECYCLE][END] status=200 duration_ms=64.28 memory_delta=0
INFO - 2026-03-13 20:40:00 --> [REQ_ID=1c7eb2fd52f6] [PERF] Execution time=0.063083
DEBUG - 2026-03-13 20:40:00 --> [REQ_ID=72cbbcacb982] [REQUEST][END]
INFO - 2026-03-13 20:40:00 --> [REQ_ID=72cbbcacb982] [PERF] Execution time=0.076883
DEBUG - 2026-03-13 20:41:22 --> [REQ_ID=2ce1bd2b982b] [REQUEST][START] HEAD /
DEBUG - 2026-03-13 20:41:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-13 20:41:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-13 20:41:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-13 20:41:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-13 20:41:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-13 20:46:22 --> [REQ_ID=09b5df8dd324] [REQUEST][START] HEAD /
DEBUG - 2026-03-13 20:46:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-13 20:46:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-13 20:46:27 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-13 20:46:27 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-13 20:46:27 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-13 20:51:22 --> [REQ_ID=87f23f791743] [REQUEST][START] HEAD /
DEBUG - 2026-03-13 20:51:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-13 20:51:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-13 20:51:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-13 20:51:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-13 20:51:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-13 20:54:55 --> [REQ_ID=0871aaacde30] [REQUEST][START] GET /index.php/Features/Advanced-Investment-Portfoio-Manager
DEBUG - 2026-03-13 20:54:55 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
INFO - 2026-03-13 20:54:55 --> REDIRECTED ROUTE at https://www.mymiwallet.com/Features/Advanced-Investment-Portfolio-Manager
DEBUG - 2026-03-13 20:54:55 --> [REQ_ID=0871aaacde30] [REQUEST][END]
INFO - 2026-03-13 20:54:55 --> [REQ_ID=0871aaacde30] [PERF] Execution time=0.036939
DEBUG - 2026-03-13 20:56:22 --> [REQ_ID=dca70c0b1492] [REQUEST][START] HEAD /
DEBUG - 2026-03-13 20:56:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-13 20:56:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-13 20:56:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-13 20:56:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-13 20:56:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-13 21:00:01 --> [REQ_ID=a75f2d0f1940] [REQUEST][START] GET /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-13 21:00:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-13 21:00:01 --> [REQ_ID=a75f2d0f1940] [FILTER_BEFORE] /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-13 21:00:01 --> [REQ_ID=a75f2d0f1940] [ROUTE] Controller=\App\Modules\Management\Controllers\ManagementAPIController Method=Run_CRON_Tasks
DEBUG - 2026-03-13 21:00:01 --> [REQ_ID=a75f2d0f1940] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-13 21:00:01 --> [REQ_ID=a75f2d0f1940] [REQUEST][END]
INFO - 2026-03-13 21:00:01 --> [REQ_ID=a75f2d0f1940] [PERF] Execution time=0.051068
DEBUG - 2026-03-13 21:01:22 --> [REQ_ID=f91a6a20d178] [REQUEST][START] HEAD /
DEBUG - 2026-03-13 21:01:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-13 21:01:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-13 21:01:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-13 21:01:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-13 21:01:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-13 21:06:22 --> [REQ_ID=0b256549f28c] [REQUEST][START] HEAD /
DEBUG - 2026-03-13 21:06:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-13 21:06:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-13 21:06:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-13 21:06:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-13 21:06:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-13 21:11:22 --> [REQ_ID=bf661f9706d7] [REQUEST][START] HEAD /
DEBUG - 2026-03-13 21:11:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-13 21:11:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-13 21:11:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-13 21:11:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-13 21:11:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-13 21:13:17 --> [REQ_ID=b33d2851736b] [REQUEST][START] GET /
DEBUG - 2026-03-13 21:13:17 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-13 21:13:17 --> [REQ_ID=b33d2851736b] [FILTER_BEFORE] /
DEBUG - 2026-03-13 21:13:17 --> [REQ_ID=b33d2851736b] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-13 21:13:17 --> [REQ_ID=b33d2851736b] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-13 21:13:17 --> [CSRF] token name=csrf_test_name hash=8be47d6b61679144a0eaa694e482d757
DEBUG - 2026-03-13 21:13:17 --> [REQ_ID=dea69d8b83e2] [INIT] App\Controllers\Home::GET
INFO - 2026-03-13 21:13:17 --> [REQ_ID=dea69d8b83e2] [MEMORY][controller-start] 6291456
INFO - 2026-03-13 21:13:17 --> [REQ_ID=dea69d8b83e2] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-13 21:13:17 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-13 21:13:18 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-03-13 21:13:18 --> [REQ_ID=dea69d8b83e2] [VIEW_RENDER] themes/public/home
INFO - 2026-03-13 21:13:18 --> [REQ_ID=dea69d8b83e2] [MEMORY][commonData:start] 10485760
INFO - 2026-03-13 21:13:18 --> themesMemory usage: 10485760
DEBUG - 2026-03-13 21:13:18 --> [MetaService] slug= pageName=Home cacheHit= path=DB
DEBUG - 2026-03-13 21:13:18 --> [REQ_ID=b33d2851736b] [FILTER_AFTER]
DEBUG - 2026-03-13 21:13:18 --> [REQ_ID=b33d2851736b] [LIFECYCLE][END] status=200 duration_ms=719.91 memory_delta=4194304
INFO - 2026-03-13 21:13:18 --> [REQ_ID=dea69d8b83e2] [PERF] Execution time=0.717973
DEBUG - 2026-03-13 21:13:18 --> [REQ_ID=b33d2851736b] [REQUEST][END]
INFO - 2026-03-13 21:13:18 --> [REQ_ID=b33d2851736b] [PERF] Execution time=0.763429
DEBUG - 2026-03-13 21:15:01 --> [REQ_ID=9be38154640c] [REQUEST][START] GET /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-13 21:15:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-13 21:15:01 --> [REQ_ID=9be38154640c] [FILTER_BEFORE] /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-13 21:15:01 --> [REQ_ID=9be38154640c] [ROUTE] Controller=\App\Modules\APIs\Controllers\AlertsAPIController Method=fetchEmailAlerts
DEBUG - 2026-03-13 21:15:01 --> [REQ_ID=9be38154640c] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-13 21:15:01 --> [REQ_ID=9be38154640c] [REQUEST][END]
INFO - 2026-03-13 21:15:01 --> [REQ_ID=9be38154640c] [PERF] Execution time=0.045959
DEBUG - 2026-03-13 21:16:22 --> [REQ_ID=1fad5a40cc79] [REQUEST][START] HEAD /
DEBUG - 2026-03-13 21:16:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-13 21:16:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-13 21:16:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-13 21:16:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-13 21:16:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-13 21:21:22 --> [REQ_ID=bf5a8b2a12e1] [REQUEST][START] HEAD /
DEBUG - 2026-03-13 21:21:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-13 21:21:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-13 21:21:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-13 21:21:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-13 21:21:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-13 21:26:22 --> [REQ_ID=b855ca222661] [REQUEST][START] HEAD /
DEBUG - 2026-03-13 21:26:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-13 21:26:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-13 21:26:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-13 21:26:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-13 21:26:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-13 21:31:22 --> [REQ_ID=30a5d7d01a45] [REQUEST][START] HEAD /
DEBUG - 2026-03-13 21:31:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-13 21:31:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-13 21:31:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-13 21:31:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-13 21:31:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-13 21:36:22 --> [REQ_ID=122b5f47e7cb] [REQUEST][START] HEAD /
DEBUG - 2026-03-13 21:36:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-13 21:36:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-13 21:36:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-13 21:36:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-13 21:36:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-13 21:41:22 --> [REQ_ID=7a8b5e43c32d] [REQUEST][START] HEAD /
DEBUG - 2026-03-13 21:41:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-13 21:41:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-13 21:41:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-13 21:41:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-13 21:41:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-13 21:46:22 --> [REQ_ID=ea2de0e53bb0] [REQUEST][START] HEAD /
DEBUG - 2026-03-13 21:46:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-13 21:46:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-13 21:46:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-13 21:46:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-13 21:46:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-13 21:51:22 --> [REQ_ID=d88f6aa69cce] [REQUEST][START] HEAD /
DEBUG - 2026-03-13 21:51:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-13 21:51:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-13 21:51:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-13 21:51:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-13 21:51:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-13 21:56:22 --> [REQ_ID=9ddfdaa542fb] [REQUEST][START] HEAD /
DEBUG - 2026-03-13 21:56:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-13 21:56:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-13 21:56:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-13 21:56:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-13 21:56:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-13 22:00:02 --> [REQ_ID=60822ee5716f] [REQUEST][START] GET /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-13 22:00:02 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-13 22:00:02 --> [REQ_ID=60822ee5716f] [FILTER_BEFORE] /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-13 22:00:02 --> [REQ_ID=60822ee5716f] [ROUTE] Controller=\App\Modules\Management\Controllers\ManagementAPIController Method=Run_CRON_Tasks
DEBUG - 2026-03-13 22:00:02 --> [REQ_ID=60822ee5716f] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-13 22:00:02 --> [REQ_ID=60822ee5716f] [REQUEST][END]
INFO - 2026-03-13 22:00:02 --> [REQ_ID=60822ee5716f] [PERF] Execution time=0.051178
DEBUG - 2026-03-13 22:01:22 --> [REQ_ID=0db892e0c804] [REQUEST][START] HEAD /
DEBUG - 2026-03-13 22:01:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-13 22:01:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-13 22:01:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-13 22:01:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-13 22:01:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-13 22:06:22 --> [REQ_ID=b2eded0aebc0] [REQUEST][START] HEAD /
DEBUG - 2026-03-13 22:06:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-13 22:06:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-13 22:06:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-13 22:06:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-13 22:06:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-13 22:11:22 --> [REQ_ID=514af628199e] [REQUEST][START] HEAD /
DEBUG - 2026-03-13 22:11:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-13 22:11:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-13 22:11:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-13 22:11:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-13 22:11:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-13 22:15:01 --> [REQ_ID=a87dca0b16a4] [REQUEST][START] GET /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-13 22:15:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-13 22:15:01 --> [REQ_ID=a87dca0b16a4] [FILTER_BEFORE] /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-13 22:15:01 --> [REQ_ID=a87dca0b16a4] [ROUTE] Controller=\App\Modules\APIs\Controllers\AlertsAPIController Method=fetchEmailAlerts
DEBUG - 2026-03-13 22:15:01 --> [REQ_ID=a87dca0b16a4] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-13 22:15:01 --> [REQ_ID=a87dca0b16a4] [REQUEST][END]
INFO - 2026-03-13 22:15:01 --> [REQ_ID=a87dca0b16a4] [PERF] Execution time=0.051017
DEBUG - 2026-03-13 22:15:51 --> [REQ_ID=6578d5622688] [REQUEST][START] GET /
DEBUG - 2026-03-13 22:15:51 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-13 22:15:51 --> [REQ_ID=6578d5622688] [FILTER_BEFORE] /
DEBUG - 2026-03-13 22:15:51 --> [REQ_ID=6578d5622688] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-13 22:15:51 --> [REQ_ID=6578d5622688] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-13 22:15:51 --> [CSRF] token name=csrf_test_name hash=badc071dfde1a0cecf0094694e28bf2f
DEBUG - 2026-03-13 22:15:51 --> [REQ_ID=7d7de5702b46] [INIT] App\Controllers\Home::GET
INFO - 2026-03-13 22:15:51 --> [REQ_ID=7d7de5702b46] [MEMORY][controller-start] 4194304
INFO - 2026-03-13 22:15:51 --> [REQ_ID=7d7de5702b46] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-13 22:15:51 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-13 22:15:52 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-03-13 22:15:52 --> [REQ_ID=7d7de5702b46] [VIEW_RENDER] themes/public/home
INFO - 2026-03-13 22:15:52 --> [REQ_ID=7d7de5702b46] [MEMORY][commonData:start] 8388608
INFO - 2026-03-13 22:15:52 --> themesMemory usage: 8388608
DEBUG - 2026-03-13 22:15:52 --> [MetaService] slug= pageName=Home cacheHit= path=DB
DEBUG - 2026-03-13 22:15:52 --> [REQ_ID=6578d5622688] [FILTER_AFTER]
DEBUG - 2026-03-13 22:15:52 --> [REQ_ID=6578d5622688] [LIFECYCLE][END] status=200 duration_ms=955.62 memory_delta=4194304
INFO - 2026-03-13 22:15:52 --> [REQ_ID=7d7de5702b46] [PERF] Execution time=0.954299
DEBUG - 2026-03-13 22:15:52 --> [REQ_ID=6578d5622688] [REQUEST][END]
INFO - 2026-03-13 22:15:52 --> [REQ_ID=6578d5622688] [PERF] Execution time=0.967576
DEBUG - 2026-03-13 22:16:22 --> [REQ_ID=815197fff9de] [REQUEST][START] HEAD /
DEBUG - 2026-03-13 22:16:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-13 22:16:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-13 22:16:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-13 22:16:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-13 22:16:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-13 22:21:22 --> [REQ_ID=cb3a0e50b7da] [REQUEST][START] HEAD /
DEBUG - 2026-03-13 22:21:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-13 22:21:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-13 22:21:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-13 22:21:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-13 22:21:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-13 22:26:22 --> [REQ_ID=2707ebfbe07c] [REQUEST][START] HEAD /
DEBUG - 2026-03-13 22:26:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-13 22:26:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-13 22:26:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-13 22:26:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-13 22:26:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-13 22:31:22 --> [REQ_ID=abb77bf3f0a6] [REQUEST][START] HEAD /
DEBUG - 2026-03-13 22:31:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-13 22:31:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-13 22:31:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-13 22:31:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-13 22:31:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-13 22:36:22 --> [REQ_ID=daf15bf8e015] [REQUEST][START] HEAD /
DEBUG - 2026-03-13 22:36:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-13 22:36:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-13 22:36:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-13 22:36:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-13 22:36:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-13 22:41:22 --> [REQ_ID=d906e6bd2607] [REQUEST][START] HEAD /
DEBUG - 2026-03-13 22:41:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-13 22:41:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-13 22:41:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-13 22:41:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-13 22:41:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-13 22:46:22 --> [REQ_ID=c08bffe8f1d1] [REQUEST][START] HEAD /
DEBUG - 2026-03-13 22:46:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-13 22:46:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-13 22:46:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-13 22:46:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-13 22:46:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-13 22:51:22 --> [REQ_ID=cd7680aa3b73] [REQUEST][START] HEAD /
DEBUG - 2026-03-13 22:51:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-13 22:51:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-13 22:51:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-13 22:51:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-13 22:51:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-13 22:56:22 --> [REQ_ID=4262308bc2d0] [REQUEST][START] HEAD /
DEBUG - 2026-03-13 22:56:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-13 22:56:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-13 22:56:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-13 22:56:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-13 22:56:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-13 23:00:02 --> [REQ_ID=ef1bc43ffb10] [REQUEST][START] GET /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-13 23:00:02 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-13 23:00:02 --> [REQ_ID=ef1bc43ffb10] [FILTER_BEFORE] /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-13 23:00:02 --> [REQ_ID=ef1bc43ffb10] [ROUTE] Controller=\App\Modules\Management\Controllers\ManagementAPIController Method=Run_CRON_Tasks
DEBUG - 2026-03-13 23:00:02 --> [REQ_ID=ef1bc43ffb10] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-13 23:00:02 --> [REQ_ID=ef1bc43ffb10] [REQUEST][END]
INFO - 2026-03-13 23:00:02 --> [REQ_ID=ef1bc43ffb10] [PERF] Execution time=0.048485
DEBUG - 2026-03-13 23:01:22 --> [REQ_ID=b7672347d1d6] [REQUEST][START] HEAD /
DEBUG - 2026-03-13 23:01:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-13 23:01:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-13 23:01:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-13 23:01:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-13 23:01:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-13 23:06:22 --> [REQ_ID=b37e386c09ed] [REQUEST][START] HEAD /
DEBUG - 2026-03-13 23:06:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-13 23:06:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-13 23:06:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-13 23:06:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-13 23:06:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-13 23:10:48 --> [REQ_ID=fad4db2a23ff] [REQUEST][START] HEAD /
DEBUG - 2026-03-13 23:10:48 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-13 23:10:48 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-13 23:10:48 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-13 23:10:48 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-13 23:10:48 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://mymiwallet.com/
DEBUG - 2026-03-13 23:11:22 --> [REQ_ID=182e5f5fd72b] [REQUEST][START] HEAD /
DEBUG - 2026-03-13 23:11:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-13 23:11:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-13 23:11:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-13 23:11:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-13 23:11:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-13 23:15:02 --> [REQ_ID=e23f568584e7] [REQUEST][START] GET /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-13 23:15:02 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-13 23:15:02 --> [REQ_ID=e23f568584e7] [FILTER_BEFORE] /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-13 23:15:02 --> [REQ_ID=e23f568584e7] [ROUTE] Controller=\App\Modules\APIs\Controllers\AlertsAPIController Method=fetchEmailAlerts
DEBUG - 2026-03-13 23:15:02 --> [REQ_ID=e23f568584e7] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-13 23:15:02 --> [REQ_ID=e23f568584e7] [REQUEST][END]
INFO - 2026-03-13 23:15:02 --> [REQ_ID=e23f568584e7] [PERF] Execution time=0.058462
DEBUG - 2026-03-13 23:16:22 --> [REQ_ID=e17177dc6b91] [REQUEST][START] HEAD /
DEBUG - 2026-03-13 23:16:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-13 23:16:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-13 23:16:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-13 23:16:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-13 23:16:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-13 23:21:22 --> [REQ_ID=7f6780b70475] [REQUEST][START] HEAD /
DEBUG - 2026-03-13 23:21:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-13 23:21:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-13 23:21:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-13 23:21:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-13 23:21:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-13 23:23:52 --> [REQ_ID=5bbc1d6c24ae] [REQUEST][START] GET /
DEBUG - 2026-03-13 23:23:52 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-13 23:23:52 --> [REQ_ID=5bbc1d6c24ae] [FILTER_BEFORE] /
DEBUG - 2026-03-13 23:23:52 --> [REQ_ID=5bbc1d6c24ae] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-13 23:23:52 --> [REQ_ID=5bbc1d6c24ae] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-13 23:23:52 --> [CSRF] token name=csrf_test_name hash=454a167b31de0641f71b7bf4e1cc986c
DEBUG - 2026-03-13 23:23:52 --> [REQ_ID=348a33dd9efb] [INIT] App\Controllers\Home::GET
INFO - 2026-03-13 23:23:52 --> [REQ_ID=348a33dd9efb] [MEMORY][controller-start] 6291456
INFO - 2026-03-13 23:23:52 --> [REQ_ID=348a33dd9efb] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-13 23:23:52 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-13 23:23:53 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-03-13 23:23:53 --> [REQ_ID=348a33dd9efb] [VIEW_RENDER] themes/public/home
INFO - 2026-03-13 23:23:53 --> [REQ_ID=348a33dd9efb] [MEMORY][commonData:start] 10485760
INFO - 2026-03-13 23:23:53 --> themesMemory usage: 10485760
DEBUG - 2026-03-13 23:23:53 --> [MetaService] slug= pageName=Home cacheHit= path=DB
DEBUG - 2026-03-13 23:23:53 --> [REQ_ID=5bbc1d6c24ae] [FILTER_AFTER]
DEBUG - 2026-03-13 23:23:53 --> [REQ_ID=5bbc1d6c24ae] [LIFECYCLE][END] status=200 duration_ms=812.38 memory_delta=4194304
INFO - 2026-03-13 23:23:53 --> [REQ_ID=348a33dd9efb] [PERF] Execution time=0.810506
DEBUG - 2026-03-13 23:23:53 --> [REQ_ID=5bbc1d6c24ae] [REQUEST][END]
INFO - 2026-03-13 23:23:53 --> [REQ_ID=5bbc1d6c24ae] [PERF] Execution time=0.851335
DEBUG - 2026-03-13 23:26:22 --> [REQ_ID=f95bbb217c32] [REQUEST][START] HEAD /
DEBUG - 2026-03-13 23:26:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-13 23:26:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-13 23:26:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-13 23:26:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-13 23:26:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-13 23:31:22 --> [REQ_ID=359eecb9c5ad] [REQUEST][START] HEAD /
DEBUG - 2026-03-13 23:31:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-13 23:31:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-13 23:31:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-13 23:31:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-13 23:31:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-13 23:36:22 --> [REQ_ID=6e6d25781134] [REQUEST][START] HEAD /
DEBUG - 2026-03-13 23:36:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-13 23:36:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-13 23:36:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-13 23:36:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-13 23:36:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-13 23:41:22 --> [REQ_ID=1d00cda6df37] [REQUEST][START] HEAD /
DEBUG - 2026-03-13 23:41:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-13 23:41:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-13 23:41:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-13 23:41:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-13 23:41:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-13 23:46:22 --> [REQ_ID=564a84510ca3] [REQUEST][START] HEAD /
DEBUG - 2026-03-13 23:46:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-13 23:46:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-13 23:46:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-13 23:46:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-13 23:46:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-13 23:48:05 --> [REQ_ID=0dabafb28a26] [REQUEST][START] GET /index.php/Privacy-Policy
DEBUG - 2026-03-13 23:48:05 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-13 23:48:05 --> [REQ_ID=0dabafb28a26] [REQUEST][END]
INFO - 2026-03-13 23:48:05 --> [REQ_ID=0dabafb28a26] [PERF] Execution time=0.038114
DEBUG - 2026-03-13 23:50:06 --> [REQ_ID=82fbec234793] [REQUEST][START] HEAD /index.php/Privacy-Policy
DEBUG - 2026-03-13 23:50:06 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-13 23:50:06 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: Privacy-Policy]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-13 23:50:06 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-13 23:50:06 --> [404] URI=https://www.mymiwallet.com/index.php/Privacy-Policy
WARNING - 2026-03-13 23:50:06 --> 404 route miss: https://www.mymiwallet.com/index.php/Privacy-Policy | referrer: none
DEBUG - 2026-03-13 23:51:22 --> [REQ_ID=25be9f90e469] [REQUEST][START] HEAD /
DEBUG - 2026-03-13 23:51:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-13 23:51:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-13 23:51:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-13 23:51:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-13 23:51:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-13 23:56:22 --> [REQ_ID=00d62a3cc951] [REQUEST][START] HEAD /
DEBUG - 2026-03-13 23:56:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-13 23:56:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-13 23:56:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-13 23:56:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-13 23:56:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
