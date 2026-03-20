<?php defined('SYSTEMPATH') || exit('No direct script access allowed'); ?>

DEBUG - 2026-03-18 00:00:01 --> [REQ_ID=ea7df80b85fa] [REQUEST][START] GET /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-18 00:00:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-18 00:00:01 --> [REQ_ID=ea7df80b85fa] [FILTER_BEFORE] /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-18 00:00:01 --> [REQ_ID=ea7df80b85fa] [ROUTE] Controller=\App\Modules\Management\Controllers\ManagementAPIController Method=Run_CRON_Tasks
DEBUG - 2026-03-18 00:00:01 --> [REQ_ID=ea7df80b85fa] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-18 00:00:01 --> [REQ_ID=ea7df80b85fa] [REQUEST][END]
INFO - 2026-03-18 00:00:01 --> [REQ_ID=ea7df80b85fa] [PERF] Execution time=0.061238
DEBUG - 2026-03-18 00:01:22 --> [REQ_ID=cdd07053821b] [REQUEST][START] HEAD /
DEBUG - 2026-03-18 00:01:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-18 00:01:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-18 00:01:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-18 00:01:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-18 00:01:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-18 00:06:22 --> [REQ_ID=76b5ad68bac0] [REQUEST][START] HEAD /
DEBUG - 2026-03-18 00:06:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-18 00:06:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-18 00:06:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-18 00:06:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-18 00:06:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-18 00:07:07 --> [REQ_ID=c1fa42f308c8] [REQUEST][START] GET /index.php/How-It-Works
DEBUG - 2026-03-18 00:07:07 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-18 00:07:07 --> [REQ_ID=c1fa42f308c8] [REQUEST][END]
INFO - 2026-03-18 00:07:07 --> [REQ_ID=c1fa42f308c8] [PERF] Execution time=0.021487
DEBUG - 2026-03-18 00:10:47 --> [REQ_ID=ba103fa85222] [REQUEST][START] GET /
DEBUG - 2026-03-18 00:10:47 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-18 00:10:47 --> [REQ_ID=ba103fa85222] [FILTER_BEFORE] /
DEBUG - 2026-03-18 00:10:47 --> [REQ_ID=ba103fa85222] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-18 00:10:47 --> [REQ_ID=ba103fa85222] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-18 00:10:47 --> [CSRF] token name=csrf_test_name hash=3e989b0e49411078454ec026b6f63db9
DEBUG - 2026-03-18 00:10:47 --> [REQ_ID=5c0708010a7e] [INIT] App\Controllers\Home::GET
INFO - 2026-03-18 00:10:47 --> [REQ_ID=5c0708010a7e] [MEMORY][controller-start] 6291456
INFO - 2026-03-18 00:10:47 --> [REQ_ID=5c0708010a7e] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-18 00:10:47 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-18 00:10:48 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-03-18 00:10:48 --> [REQ_ID=5c0708010a7e] [VIEW_RENDER] themes/public/home
INFO - 2026-03-18 00:10:48 --> [REQ_ID=5c0708010a7e] [MEMORY][commonData:start] 10485760
INFO - 2026-03-18 00:10:48 --> themesMemory usage: 10485760
DEBUG - 2026-03-18 00:10:48 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-18 00:10:48 --> [REQ_ID=ba103fa85222] [FILTER_AFTER]
DEBUG - 2026-03-18 00:10:48 --> [REQ_ID=ba103fa85222] [LIFECYCLE][END] status=200 duration_ms=897.81 memory_delta=4194304
INFO - 2026-03-18 00:10:48 --> [REQ_ID=5c0708010a7e] [PERF] Execution time=0.895933
DEBUG - 2026-03-18 00:10:48 --> [REQ_ID=ba103fa85222] [REQUEST][END]
INFO - 2026-03-18 00:10:48 --> [REQ_ID=ba103fa85222] [PERF] Execution time=0.936936
DEBUG - 2026-03-18 00:11:22 --> [REQ_ID=299e71e69cf8] [REQUEST][START] HEAD /
DEBUG - 2026-03-18 00:11:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-18 00:11:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-18 00:11:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-18 00:11:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-18 00:11:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-18 00:15:01 --> [REQ_ID=27e1f9e4b36a] [REQUEST][START] GET /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-18 00:15:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-18 00:15:01 --> [REQ_ID=27e1f9e4b36a] [FILTER_BEFORE] /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-18 00:15:01 --> [REQ_ID=27e1f9e4b36a] [ROUTE] Controller=\App\Modules\APIs\Controllers\AlertsAPIController Method=fetchEmailAlerts
DEBUG - 2026-03-18 00:15:01 --> [REQ_ID=27e1f9e4b36a] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-18 00:15:01 --> [REQ_ID=27e1f9e4b36a] [REQUEST][END]
INFO - 2026-03-18 00:15:01 --> [REQ_ID=27e1f9e4b36a] [PERF] Execution time=0.047666
DEBUG - 2026-03-18 00:16:22 --> [REQ_ID=ae21775d539f] [REQUEST][START] HEAD /
DEBUG - 2026-03-18 00:16:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-18 00:16:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-18 00:16:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-18 00:16:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-18 00:16:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-18 00:19:03 --> [REQ_ID=041aea4b30f7] [REQUEST][START] GET /
DEBUG - 2026-03-18 00:19:03 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-18 00:19:03 --> [REQ_ID=041aea4b30f7] [FILTER_BEFORE] /
DEBUG - 2026-03-18 00:19:03 --> [REQ_ID=041aea4b30f7] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-18 00:19:03 --> [REQ_ID=041aea4b30f7] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-18 00:19:03 --> [CSRF] token name=csrf_test_name hash=887cb85ea7620ddcaa53fd07bf0064b7
DEBUG - 2026-03-18 00:19:03 --> [REQ_ID=f70ef6faed17] [INIT] App\Controllers\Home::GET
INFO - 2026-03-18 00:19:03 --> [REQ_ID=f70ef6faed17] [MEMORY][controller-start] 6291456
INFO - 2026-03-18 00:19:03 --> [REQ_ID=f70ef6faed17] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-18 00:19:03 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-18 00:19:04 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
DEBUG - 2026-03-18 00:19:04 --> [REQ_ID=f70ef6faed17] [VIEW_RENDER] themes/public/home
INFO - 2026-03-18 00:19:04 --> [REQ_ID=f70ef6faed17] [MEMORY][commonData:start] 10485760
INFO - 2026-03-18 00:19:04 --> themesMemory usage: 10485760
DEBUG - 2026-03-18 00:19:04 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-18 00:19:04 --> [REQ_ID=041aea4b30f7] [FILTER_AFTER]
DEBUG - 2026-03-18 00:19:04 --> [REQ_ID=041aea4b30f7] [LIFECYCLE][END] status=200 duration_ms=840.64 memory_delta=4194304
INFO - 2026-03-18 00:19:04 --> [REQ_ID=f70ef6faed17] [PERF] Execution time=0.838174
DEBUG - 2026-03-18 00:19:04 --> [REQ_ID=041aea4b30f7] [REQUEST][END]
INFO - 2026-03-18 00:19:04 --> [REQ_ID=041aea4b30f7] [PERF] Execution time=0.878598
DEBUG - 2026-03-18 00:19:08 --> [REQ_ID=a1fbcf1bda53] [REQUEST][START] GET /
DEBUG - 2026-03-18 00:19:08 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-18 00:19:08 --> [REQ_ID=a1fbcf1bda53] [FILTER_BEFORE] /
DEBUG - 2026-03-18 00:19:08 --> [REQ_ID=a1fbcf1bda53] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-18 00:19:08 --> [REQ_ID=a1fbcf1bda53] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-18 00:19:08 --> [CSRF] token name=csrf_test_name hash=e3a65467b2614178bf05c5b858e8f129
DEBUG - 2026-03-18 00:19:08 --> [REQ_ID=dfdf3d04fca5] [INIT] App\Controllers\Home::GET
INFO - 2026-03-18 00:19:08 --> [REQ_ID=dfdf3d04fca5] [MEMORY][controller-start] 6291456
INFO - 2026-03-18 00:19:08 --> [REQ_ID=dfdf3d04fca5] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-18 00:19:08 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-18 00:19:08 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
DEBUG - 2026-03-18 00:19:08 --> [REQ_ID=dfdf3d04fca5] [VIEW_RENDER] themes/public/home
INFO - 2026-03-18 00:19:08 --> [REQ_ID=dfdf3d04fca5] [MEMORY][commonData:start] 8388608
INFO - 2026-03-18 00:19:08 --> themesMemory usage: 8388608
DEBUG - 2026-03-18 00:19:08 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-18 00:19:08 --> [REQ_ID=a1fbcf1bda53] [FILTER_AFTER]
DEBUG - 2026-03-18 00:19:08 --> [REQ_ID=a1fbcf1bda53] [LIFECYCLE][END] status=200 duration_ms=692.48 memory_delta=2097152
INFO - 2026-03-18 00:19:08 --> [REQ_ID=dfdf3d04fca5] [PERF] Execution time=0.692273
DEBUG - 2026-03-18 00:19:08 --> [REQ_ID=a1fbcf1bda53] [REQUEST][END]
INFO - 2026-03-18 00:19:08 --> [REQ_ID=a1fbcf1bda53] [PERF] Execution time=0.702481
DEBUG - 2026-03-18 00:21:22 --> [REQ_ID=4c0532262ba0] [REQUEST][START] HEAD /
DEBUG - 2026-03-18 00:21:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-18 00:21:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-18 00:21:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-18 00:21:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-18 00:21:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-18 00:26:22 --> [REQ_ID=6bc816261194] [REQUEST][START] HEAD /
DEBUG - 2026-03-18 00:26:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-18 00:26:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-18 00:26:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-18 00:26:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-18 00:26:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-18 00:31:22 --> [REQ_ID=743be9fb417d] [REQUEST][START] HEAD /
DEBUG - 2026-03-18 00:31:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-18 00:31:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-18 00:31:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-18 00:31:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-18 00:31:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-18 00:36:22 --> [REQ_ID=fb3ff08ccc6d] [REQUEST][START] HEAD /
DEBUG - 2026-03-18 00:36:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-18 00:36:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-18 00:36:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-18 00:36:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-18 00:36:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-18 00:41:22 --> [REQ_ID=f8d7c27b2065] [REQUEST][START] HEAD /
DEBUG - 2026-03-18 00:41:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-18 00:41:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-18 00:41:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-18 00:41:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-18 00:41:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-18 00:46:22 --> [REQ_ID=c402018645da] [REQUEST][START] HEAD /
DEBUG - 2026-03-18 00:46:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-18 00:46:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-18 00:46:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-18 00:46:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-18 00:46:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-18 00:51:22 --> [REQ_ID=bf9fee54bd43] [REQUEST][START] HEAD /
DEBUG - 2026-03-18 00:51:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-18 00:51:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-18 00:51:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-18 00:51:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-18 00:51:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-18 00:56:22 --> [REQ_ID=205c3d206b09] [REQUEST][START] HEAD /
DEBUG - 2026-03-18 00:56:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-18 00:56:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-18 00:56:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-18 00:56:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-18 00:56:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-18 01:00:01 --> [REQ_ID=b8c8d8c1f154] [REQUEST][START] GET /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-18 01:00:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-18 01:00:01 --> [REQ_ID=b8c8d8c1f154] [FILTER_BEFORE] /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-18 01:00:01 --> [REQ_ID=b8c8d8c1f154] [ROUTE] Controller=\App\Modules\Management\Controllers\ManagementAPIController Method=Run_CRON_Tasks
DEBUG - 2026-03-18 01:00:01 --> [REQ_ID=b8c8d8c1f154] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-18 01:00:01 --> [REQ_ID=b8c8d8c1f154] [REQUEST][END]
INFO - 2026-03-18 01:00:01 --> [REQ_ID=b8c8d8c1f154] [PERF] Execution time=0.047460
DEBUG - 2026-03-18 01:01:22 --> [REQ_ID=f75fe666b344] [REQUEST][START] HEAD /
DEBUG - 2026-03-18 01:01:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-18 01:01:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-18 01:01:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-18 01:01:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-18 01:01:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-18 01:06:22 --> [REQ_ID=74e1e0325042] [REQUEST][START] HEAD /
DEBUG - 2026-03-18 01:06:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-18 01:06:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-18 01:06:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-18 01:06:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-18 01:06:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-18 01:11:22 --> [REQ_ID=e1b068306847] [REQUEST][START] HEAD /
DEBUG - 2026-03-18 01:11:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-18 01:11:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-18 01:11:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-18 01:11:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-18 01:11:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-18 01:15:01 --> [REQ_ID=ce3d52c029a2] [REQUEST][START] GET /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-18 01:15:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-18 01:15:01 --> [REQ_ID=ce3d52c029a2] [FILTER_BEFORE] /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-18 01:15:01 --> [REQ_ID=ce3d52c029a2] [ROUTE] Controller=\App\Modules\APIs\Controllers\AlertsAPIController Method=fetchEmailAlerts
DEBUG - 2026-03-18 01:15:01 --> [REQ_ID=ce3d52c029a2] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-18 01:15:01 --> [REQ_ID=ce3d52c029a2] [REQUEST][END]
INFO - 2026-03-18 01:15:01 --> [REQ_ID=ce3d52c029a2] [PERF] Execution time=0.044870
DEBUG - 2026-03-18 01:16:22 --> [REQ_ID=d8d4d174cea8] [REQUEST][START] HEAD /
DEBUG - 2026-03-18 01:16:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-18 01:16:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-18 01:16:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-18 01:16:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-18 01:16:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-18 01:21:22 --> [REQ_ID=e53ae6d24546] [REQUEST][START] HEAD /
DEBUG - 2026-03-18 01:21:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-18 01:21:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-18 01:21:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-18 01:21:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-18 01:21:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-18 01:26:22 --> [REQ_ID=6348bc348aea] [REQUEST][START] HEAD /
DEBUG - 2026-03-18 01:26:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-18 01:26:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-18 01:26:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-18 01:26:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-18 01:26:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-18 01:28:07 --> [REQ_ID=aad22236f3dd] [REQUEST][START] GET /
DEBUG - 2026-03-18 01:28:07 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-18 01:28:07 --> [REQ_ID=aad22236f3dd] [FILTER_BEFORE] /
DEBUG - 2026-03-18 01:28:07 --> [REQ_ID=aad22236f3dd] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-18 01:28:07 --> [REQ_ID=aad22236f3dd] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-18 01:28:07 --> [CSRF] token name=csrf_test_name hash=6c235fb1b593c3895ce0e43cdc9fc7d7
DEBUG - 2026-03-18 01:28:07 --> [REQ_ID=fef9d3fef6a7] [INIT] App\Controllers\Home::GET
INFO - 2026-03-18 01:28:07 --> [REQ_ID=fef9d3fef6a7] [MEMORY][controller-start] 6291456
INFO - 2026-03-18 01:28:07 --> [REQ_ID=fef9d3fef6a7] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-18 01:28:07 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-18 01:28:08 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-03-18 01:28:08 --> [REQ_ID=fef9d3fef6a7] [VIEW_RENDER] themes/public/home
INFO - 2026-03-18 01:28:08 --> [REQ_ID=fef9d3fef6a7] [MEMORY][commonData:start] 10485760
INFO - 2026-03-18 01:28:08 --> themesMemory usage: 10485760
DEBUG - 2026-03-18 01:28:08 --> [MetaService] slug= pageName=Home cacheHit= path=DB
DEBUG - 2026-03-18 01:28:08 --> [REQ_ID=aad22236f3dd] [FILTER_AFTER]
DEBUG - 2026-03-18 01:28:08 --> [REQ_ID=aad22236f3dd] [LIFECYCLE][END] status=200 duration_ms=1,072.67 memory_delta=4194304
INFO - 2026-03-18 01:28:08 --> [REQ_ID=fef9d3fef6a7] [PERF] Execution time=1.070629
DEBUG - 2026-03-18 01:28:08 --> [REQ_ID=aad22236f3dd] [REQUEST][END]
INFO - 2026-03-18 01:28:08 --> [REQ_ID=aad22236f3dd] [PERF] Execution time=1.110068
DEBUG - 2026-03-18 01:31:22 --> [REQ_ID=a7ff700275c4] [REQUEST][START] HEAD /
DEBUG - 2026-03-18 01:31:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-18 01:31:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-18 01:31:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-18 01:31:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-18 01:31:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-18 01:36:22 --> [REQ_ID=e8d107ee089b] [REQUEST][START] HEAD /
DEBUG - 2026-03-18 01:36:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-18 01:36:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-18 01:36:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-18 01:36:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-18 01:36:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-18 01:41:19 --> [REQ_ID=e9bf820188d6] [REQUEST][START] GET /
DEBUG - 2026-03-18 01:41:19 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-18 01:41:19 --> [REQ_ID=e9bf820188d6] [FILTER_BEFORE] /
DEBUG - 2026-03-18 01:41:19 --> [REQ_ID=e9bf820188d6] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-18 01:41:19 --> [REQ_ID=e9bf820188d6] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-18 01:41:19 --> [CSRF] token name=csrf_test_name hash=8b1c0ac6165566c79d7bf9339dd10500
DEBUG - 2026-03-18 01:41:19 --> [REQ_ID=0939c1010ce6] [INIT] App\Controllers\Home::GET
INFO - 2026-03-18 01:41:19 --> [REQ_ID=0939c1010ce6] [MEMORY][controller-start] 6291456
INFO - 2026-03-18 01:41:19 --> [REQ_ID=0939c1010ce6] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-18 01:41:19 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-18 01:41:20 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
DEBUG - 2026-03-18 01:41:20 --> [REQ_ID=0939c1010ce6] [VIEW_RENDER] themes/public/home
INFO - 2026-03-18 01:41:20 --> [REQ_ID=0939c1010ce6] [MEMORY][commonData:start] 10485760
INFO - 2026-03-18 01:41:20 --> themesMemory usage: 10485760
DEBUG - 2026-03-18 01:41:20 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-18 01:41:20 --> [REQ_ID=e9bf820188d6] [FILTER_AFTER]
DEBUG - 2026-03-18 01:41:20 --> [REQ_ID=e9bf820188d6] [LIFECYCLE][END] status=200 duration_ms=916.88 memory_delta=4194304
INFO - 2026-03-18 01:41:20 --> [REQ_ID=0939c1010ce6] [PERF] Execution time=0.914668
DEBUG - 2026-03-18 01:41:20 --> [REQ_ID=e9bf820188d6] [REQUEST][END]
INFO - 2026-03-18 01:41:20 --> [REQ_ID=e9bf820188d6] [PERF] Execution time=0.964561
DEBUG - 2026-03-18 01:41:22 --> [REQ_ID=330d82fcdd8c] [REQUEST][START] HEAD /
DEBUG - 2026-03-18 01:41:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-18 01:41:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-18 01:41:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-18 01:41:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-18 01:41:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-18 01:46:22 --> [REQ_ID=883d2971cf5b] [REQUEST][START] HEAD /
DEBUG - 2026-03-18 01:46:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-18 01:46:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-18 01:46:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-18 01:46:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-18 01:46:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-18 01:51:22 --> [REQ_ID=8d4c0124797c] [REQUEST][START] HEAD /
DEBUG - 2026-03-18 01:51:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-18 01:51:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-18 01:51:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-18 01:51:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-18 01:51:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-18 01:56:22 --> [REQ_ID=483d5fefe9e0] [REQUEST][START] HEAD /
DEBUG - 2026-03-18 01:56:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-18 01:56:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-18 01:56:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-18 01:56:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-18 01:56:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-18 02:00:01 --> [REQ_ID=184b9fa5e9bf] [REQUEST][START] GET /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-18 02:00:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-18 02:00:01 --> [REQ_ID=184b9fa5e9bf] [FILTER_BEFORE] /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-18 02:00:01 --> [REQ_ID=184b9fa5e9bf] [ROUTE] Controller=\App\Modules\Management\Controllers\ManagementAPIController Method=Run_CRON_Tasks
DEBUG - 2026-03-18 02:00:01 --> [REQ_ID=184b9fa5e9bf] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-18 02:00:01 --> [REQ_ID=184b9fa5e9bf] [REQUEST][END]
INFO - 2026-03-18 02:00:01 --> [REQ_ID=184b9fa5e9bf] [PERF] Execution time=0.047371
DEBUG - 2026-03-18 02:01:22 --> [REQ_ID=57430f7de039] [REQUEST][START] HEAD /
DEBUG - 2026-03-18 02:01:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-18 02:01:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-18 02:01:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-18 02:01:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-18 02:01:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-18 02:03:12 --> [REQ_ID=c9a8c322fcf9] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-18 02:03:12 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-18 02:03:12 --> [REQ_ID=c9a8c322fcf9] [REQUEST][END]
INFO - 2026-03-18 02:03:12 --> [REQ_ID=c9a8c322fcf9] [PERF] Execution time=0.041721
DEBUG - 2026-03-18 02:06:22 --> [REQ_ID=4260f97b537d] [REQUEST][START] HEAD /
DEBUG - 2026-03-18 02:06:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-18 02:06:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-18 02:06:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-18 02:06:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-18 02:06:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-18 02:07:40 --> [REQ_ID=a7dc93258800] [REQUEST][START] GET /
DEBUG - 2026-03-18 02:07:40 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-18 02:07:40 --> [REQ_ID=a7dc93258800] [REQUEST][END]
INFO - 2026-03-18 02:07:40 --> [REQ_ID=a7dc93258800] [PERF] Execution time=0.040900
DEBUG - 2026-03-18 02:08:05 --> [REQ_ID=92a7a89198e7] [REQUEST][START] GET /
DEBUG - 2026-03-18 02:08:05 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-18 02:08:05 --> [REQ_ID=92a7a89198e7] [FILTER_BEFORE] /
DEBUG - 2026-03-18 02:08:05 --> [REQ_ID=92a7a89198e7] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-18 02:08:05 --> [REQ_ID=92a7a89198e7] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-18 02:08:05 --> [CSRF] token name=csrf_test_name hash=ad16e0c1af4a50495230ba22be47737b
DEBUG - 2026-03-18 02:08:05 --> [REQ_ID=c09bea077308] [INIT] App\Controllers\Home::GET
INFO - 2026-03-18 02:08:05 --> [REQ_ID=c09bea077308] [MEMORY][controller-start] 4194304
INFO - 2026-03-18 02:08:05 --> [REQ_ID=c09bea077308] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-18 02:08:05 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-18 02:08:06 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-03-18 02:08:06 --> [REQ_ID=c09bea077308] [VIEW_RENDER] themes/public/home
INFO - 2026-03-18 02:08:06 --> [REQ_ID=c09bea077308] [MEMORY][commonData:start] 8388608
INFO - 2026-03-18 02:08:06 --> themesMemory usage: 8388608
DEBUG - 2026-03-18 02:08:06 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-18 02:08:06 --> [REQ_ID=92a7a89198e7] [FILTER_AFTER]
DEBUG - 2026-03-18 02:08:06 --> [REQ_ID=92a7a89198e7] [LIFECYCLE][END] status=200 duration_ms=791.27 memory_delta=4194304
INFO - 2026-03-18 02:08:06 --> [REQ_ID=c09bea077308] [PERF] Execution time=0.789283
DEBUG - 2026-03-18 02:08:06 --> [REQ_ID=92a7a89198e7] [REQUEST][END]
INFO - 2026-03-18 02:08:06 --> [REQ_ID=92a7a89198e7] [PERF] Execution time=0.800814
DEBUG - 2026-03-18 02:11:22 --> [REQ_ID=cbfeb0f5b91b] [REQUEST][START] HEAD /
DEBUG - 2026-03-18 02:11:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-18 02:11:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-18 02:11:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-18 02:11:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-18 02:11:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-18 02:15:01 --> [REQ_ID=edb9b59ddf88] [REQUEST][START] GET /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-18 02:15:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-18 02:15:01 --> [REQ_ID=edb9b59ddf88] [FILTER_BEFORE] /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-18 02:15:01 --> [REQ_ID=edb9b59ddf88] [ROUTE] Controller=\App\Modules\APIs\Controllers\AlertsAPIController Method=fetchEmailAlerts
DEBUG - 2026-03-18 02:15:01 --> [REQ_ID=edb9b59ddf88] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-18 02:15:01 --> [REQ_ID=edb9b59ddf88] [REQUEST][END]
INFO - 2026-03-18 02:15:01 --> [REQ_ID=edb9b59ddf88] [PERF] Execution time=0.044946
DEBUG - 2026-03-18 02:16:22 --> [REQ_ID=9f0c5d0d18c8] [REQUEST][START] HEAD /
DEBUG - 2026-03-18 02:16:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-18 02:16:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-18 02:16:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-18 02:16:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-18 02:16:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-18 02:21:22 --> [REQ_ID=9103754d3f91] [REQUEST][START] HEAD /
DEBUG - 2026-03-18 02:21:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-18 02:21:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-18 02:21:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-18 02:21:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-18 02:21:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-18 02:26:22 --> [REQ_ID=c5f5128991ed] [REQUEST][START] HEAD /
DEBUG - 2026-03-18 02:26:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-18 02:26:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-18 02:26:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-18 02:26:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-18 02:26:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-18 02:31:22 --> [REQ_ID=70ec7c19f838] [REQUEST][START] HEAD /
DEBUG - 2026-03-18 02:31:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-18 02:31:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-18 02:31:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-18 02:31:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-18 02:31:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-18 02:36:18 --> [REQ_ID=b84e683d004f] [REQUEST][START] GET /
DEBUG - 2026-03-18 02:36:18 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-18 02:36:18 --> [REQ_ID=b84e683d004f] [REQUEST][END]
INFO - 2026-03-18 02:36:18 --> [REQ_ID=b84e683d004f] [PERF] Execution time=0.038318
DEBUG - 2026-03-18 02:36:22 --> [REQ_ID=5417c7ae9f22] [REQUEST][START] HEAD /
DEBUG - 2026-03-18 02:36:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-18 02:36:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-18 02:36:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-18 02:36:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-18 02:36:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-18 02:41:22 --> [REQ_ID=ce77f0455e19] [REQUEST][START] HEAD /
DEBUG - 2026-03-18 02:41:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-18 02:41:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-18 02:41:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-18 02:41:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-18 02:41:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-18 02:46:22 --> [REQ_ID=1f17c36a446f] [REQUEST][START] HEAD /
DEBUG - 2026-03-18 02:46:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-18 02:46:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-18 02:46:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-18 02:46:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-18 02:46:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-18 02:51:22 --> [REQ_ID=8c0fd6b13b5c] [REQUEST][START] HEAD /
DEBUG - 2026-03-18 02:51:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-18 02:51:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-18 02:51:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-18 02:51:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-18 02:51:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-18 02:56:22 --> [REQ_ID=e6f32ef821a7] [REQUEST][START] HEAD /
DEBUG - 2026-03-18 02:56:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-18 02:56:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-18 02:56:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-18 02:56:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-18 02:56:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-18 03:00:01 --> [REQ_ID=fe0747a68d5f] [REQUEST][START] GET /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-18 03:00:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-18 03:00:01 --> [REQ_ID=fe0747a68d5f] [FILTER_BEFORE] /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-18 03:00:01 --> [REQ_ID=fe0747a68d5f] [ROUTE] Controller=\App\Modules\Management\Controllers\ManagementAPIController Method=Run_CRON_Tasks
DEBUG - 2026-03-18 03:00:01 --> [REQ_ID=fe0747a68d5f] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-18 03:00:01 --> [REQ_ID=fe0747a68d5f] [REQUEST][END]
INFO - 2026-03-18 03:00:01 --> [REQ_ID=fe0747a68d5f] [PERF] Execution time=0.035964
DEBUG - 2026-03-18 03:01:22 --> [REQ_ID=ceb1d3ac99b2] [REQUEST][START] HEAD /
DEBUG - 2026-03-18 03:01:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-18 03:01:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-18 03:01:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-18 03:01:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-18 03:01:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-18 03:06:22 --> [REQ_ID=24aeb03f6c2e] [REQUEST][START] HEAD /
DEBUG - 2026-03-18 03:06:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-18 03:06:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-18 03:06:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-18 03:06:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-18 03:06:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-18 03:11:22 --> [REQ_ID=f9f05202d2cc] [REQUEST][START] HEAD /
DEBUG - 2026-03-18 03:11:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-18 03:11:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-18 03:11:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-18 03:11:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-18 03:11:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-18 03:14:11 --> [REQ_ID=4deb498396ee] [REQUEST][START] GET /
DEBUG - 2026-03-18 03:14:11 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-18 03:14:11 --> [REQ_ID=4deb498396ee] [FILTER_BEFORE] /
DEBUG - 2026-03-18 03:14:11 --> [REQ_ID=4deb498396ee] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-18 03:14:11 --> [REQ_ID=4deb498396ee] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-18 03:14:11 --> [CSRF] token name=csrf_test_name hash=e543d56f38c47fd59f7d857bd58a600e
DEBUG - 2026-03-18 03:14:11 --> [REQ_ID=24bc5a807a10] [INIT] App\Controllers\Home::GET
INFO - 2026-03-18 03:14:11 --> [REQ_ID=24bc5a807a10] [MEMORY][controller-start] 6291456
INFO - 2026-03-18 03:14:11 --> [REQ_ID=24bc5a807a10] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-18 03:14:11 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-18 03:14:12 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-03-18 03:14:12 --> [REQ_ID=24bc5a807a10] [VIEW_RENDER] themes/public/home
INFO - 2026-03-18 03:14:12 --> [REQ_ID=24bc5a807a10] [MEMORY][commonData:start] 10485760
INFO - 2026-03-18 03:14:12 --> themesMemory usage: 10485760
DEBUG - 2026-03-18 03:14:12 --> [MetaService] slug= pageName=Home cacheHit= path=DB
DEBUG - 2026-03-18 03:14:12 --> [REQ_ID=4deb498396ee] [FILTER_AFTER]
DEBUG - 2026-03-18 03:14:12 --> [REQ_ID=4deb498396ee] [LIFECYCLE][END] status=200 duration_ms=889.16 memory_delta=4194304
INFO - 2026-03-18 03:14:12 --> [REQ_ID=24bc5a807a10] [PERF] Execution time=0.886617
DEBUG - 2026-03-18 03:14:12 --> [REQ_ID=4deb498396ee] [REQUEST][END]
INFO - 2026-03-18 03:14:12 --> [REQ_ID=4deb498396ee] [PERF] Execution time=0.944553
DEBUG - 2026-03-18 03:15:01 --> [REQ_ID=eb09e121150a] [REQUEST][START] GET /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-18 03:15:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-18 03:15:01 --> [REQ_ID=eb09e121150a] [FILTER_BEFORE] /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-18 03:15:01 --> [REQ_ID=eb09e121150a] [ROUTE] Controller=\App\Modules\APIs\Controllers\AlertsAPIController Method=fetchEmailAlerts
DEBUG - 2026-03-18 03:15:01 --> [REQ_ID=eb09e121150a] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-18 03:15:01 --> [REQ_ID=eb09e121150a] [REQUEST][END]
INFO - 2026-03-18 03:15:01 --> [REQ_ID=eb09e121150a] [PERF] Execution time=0.017704
DEBUG - 2026-03-18 03:16:22 --> [REQ_ID=6e42450d3647] [REQUEST][START] HEAD /
DEBUG - 2026-03-18 03:16:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-18 03:16:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-18 03:16:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-18 03:16:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-18 03:16:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-18 03:21:22 --> [REQ_ID=dbc12bd1e0f8] [REQUEST][START] HEAD /
DEBUG - 2026-03-18 03:21:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-18 03:21:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-18 03:21:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-18 03:21:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-18 03:21:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-18 03:22:47 --> [REQ_ID=47d13cefa2d9] [REQUEST][START] GET /index.php/Account/Billing
DEBUG - 2026-03-18 03:22:47 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-18 03:22:47 --> [REQ_ID=47d13cefa2d9] [REQUEST][END]
INFO - 2026-03-18 03:22:47 --> [REQ_ID=47d13cefa2d9] [PERF] Execution time=0.041865
DEBUG - 2026-03-18 03:23:05 --> [REQ_ID=f177ffc0a690] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-18 03:23:05 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-18 03:23:05 --> [REQ_ID=f177ffc0a690] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-18 03:23:05 --> [REQ_ID=f177ffc0a690] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-18 03:23:05 --> [REQ_ID=f177ffc0a690] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-18 03:23:05 --> [CSRF] token name=csrf_test_name hash=3988b4200043a35fad03f73377c15c55
DEBUG - 2026-03-18 03:23:05 --> [REQ_ID=1bdc67f9a7ca] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-18 03:23:05 --> [REQ_ID=1bdc67f9a7ca] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-18 03:23:05 --> [REQ_ID=f177ffc0a690] [FILTER_AFTER]
DEBUG - 2026-03-18 03:23:05 --> [REQ_ID=f177ffc0a690] [LIFECYCLE][END] status=200 duration_ms=80.19 memory_delta=0
INFO - 2026-03-18 03:23:05 --> [REQ_ID=1bdc67f9a7ca] [PERF] Execution time=0.076521
DEBUG - 2026-03-18 03:23:05 --> [REQ_ID=f177ffc0a690] [REQUEST][END]
INFO - 2026-03-18 03:23:05 --> [REQ_ID=f177ffc0a690] [PERF] Execution time=0.094327
DEBUG - 2026-03-18 03:26:22 --> [REQ_ID=172546fb3434] [REQUEST][START] HEAD /
DEBUG - 2026-03-18 03:26:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-18 03:26:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-18 03:26:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-18 03:26:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-18 03:26:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-18 03:30:48 --> [REQ_ID=c8aacf7f1b08] [REQUEST][START] GET /
DEBUG - 2026-03-18 03:30:48 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-18 03:30:48 --> [REQ_ID=c8aacf7f1b08] [FILTER_BEFORE] /
DEBUG - 2026-03-18 03:30:48 --> [REQ_ID=c8aacf7f1b08] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-18 03:30:48 --> [REQ_ID=c8aacf7f1b08] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-18 03:30:48 --> [CSRF] token name=csrf_test_name hash=e7ce85fec4374b1f864242590d39119a
DEBUG - 2026-03-18 03:30:48 --> [REQ_ID=da22c7ae2777] [INIT] App\Controllers\Home::GET
INFO - 2026-03-18 03:30:48 --> [REQ_ID=da22c7ae2777] [MEMORY][controller-start] 6291456
INFO - 2026-03-18 03:30:48 --> [REQ_ID=da22c7ae2777] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-18 03:30:48 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-18 03:30:49 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-03-18 03:30:49 --> [REQ_ID=da22c7ae2777] [VIEW_RENDER] themes/public/home
INFO - 2026-03-18 03:30:49 --> [REQ_ID=da22c7ae2777] [MEMORY][commonData:start] 10485760
INFO - 2026-03-18 03:30:49 --> themesMemory usage: 10485760
DEBUG - 2026-03-18 03:30:49 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-18 03:30:49 --> [REQ_ID=c8aacf7f1b08] [FILTER_AFTER]
DEBUG - 2026-03-18 03:30:49 --> [REQ_ID=c8aacf7f1b08] [LIFECYCLE][END] status=200 duration_ms=904.40 memory_delta=4194304
INFO - 2026-03-18 03:30:49 --> [REQ_ID=da22c7ae2777] [PERF] Execution time=0.902374
DEBUG - 2026-03-18 03:30:49 --> [REQ_ID=c8aacf7f1b08] [REQUEST][END]
INFO - 2026-03-18 03:30:49 --> [REQ_ID=c8aacf7f1b08] [PERF] Execution time=0.944412
DEBUG - 2026-03-18 03:31:22 --> [REQ_ID=fc93f873c3d3] [REQUEST][START] HEAD /
DEBUG - 2026-03-18 03:31:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-18 03:31:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-18 03:31:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-18 03:31:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-18 03:31:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-18 03:36:22 --> [REQ_ID=a22b6c632aad] [REQUEST][START] HEAD /
DEBUG - 2026-03-18 03:36:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-18 03:36:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-18 03:36:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-18 03:36:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-18 03:36:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-18 03:41:22 --> [REQ_ID=0e465154efd0] [REQUEST][START] HEAD /
DEBUG - 2026-03-18 03:41:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-18 03:41:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-18 03:41:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-18 03:41:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-18 03:41:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-18 03:46:22 --> [REQ_ID=3567fa03f338] [REQUEST][START] HEAD /
DEBUG - 2026-03-18 03:46:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-18 03:46:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-18 03:46:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-18 03:46:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-18 03:46:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-18 03:47:04 --> [REQ_ID=4cf32a968a98] [REQUEST][START] GET /index.php/Knowledgebase/Investor-Profile
DEBUG - 2026-03-18 03:47:04 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-18 03:47:04 --> [REQ_ID=4cf32a968a98] [REQUEST][END]
INFO - 2026-03-18 03:47:04 --> [REQ_ID=4cf32a968a98] [PERF] Execution time=0.021158
DEBUG - 2026-03-18 03:51:22 --> [REQ_ID=1a6e5e0b9174] [REQUEST][START] HEAD /
DEBUG - 2026-03-18 03:51:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-18 03:51:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-18 03:51:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-18 03:51:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-18 03:51:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-18 03:56:22 --> [REQ_ID=3327d5be2e94] [REQUEST][START] HEAD /
DEBUG - 2026-03-18 03:56:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-18 03:56:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-18 03:56:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-18 03:56:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-18 03:56:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-18 03:57:46 --> [REQ_ID=1c6cd396ae27] [REQUEST][START] GET /index.php/How-It-Works/Personal-Budgeting
DEBUG - 2026-03-18 03:57:46 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-18 03:57:46 --> [REQ_ID=1c6cd396ae27] [REQUEST][END]
INFO - 2026-03-18 03:57:46 --> [REQ_ID=1c6cd396ae27] [PERF] Execution time=0.021733
DEBUG - 2026-03-18 04:00:01 --> [REQ_ID=9b5c97390d8d] [REQUEST][START] GET /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-18 04:00:02 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-18 04:00:02 --> [REQ_ID=9b5c97390d8d] [FILTER_BEFORE] /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-18 04:00:02 --> [REQ_ID=9b5c97390d8d] [ROUTE] Controller=\App\Modules\Management\Controllers\ManagementAPIController Method=Run_CRON_Tasks
DEBUG - 2026-03-18 04:00:02 --> [REQ_ID=9b5c97390d8d] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-18 04:00:02 --> [REQ_ID=9b5c97390d8d] [REQUEST][END]
INFO - 2026-03-18 04:00:02 --> [REQ_ID=9b5c97390d8d] [PERF] Execution time=0.043290
DEBUG - 2026-03-18 04:01:22 --> [REQ_ID=b519fe0de650] [REQUEST][START] HEAD /
DEBUG - 2026-03-18 04:01:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-18 04:01:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-18 04:01:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-18 04:01:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-18 04:01:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-18 04:06:22 --> [REQ_ID=20a50dba0d2e] [REQUEST][START] HEAD /
DEBUG - 2026-03-18 04:06:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-18 04:06:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-18 04:06:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-18 04:06:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-18 04:06:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-18 04:11:22 --> [REQ_ID=dfc45ee06e28] [REQUEST][START] HEAD /
DEBUG - 2026-03-18 04:11:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-18 04:11:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-18 04:11:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-18 04:11:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-18 04:11:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-18 04:15:01 --> [REQ_ID=a0c0aed19c47] [REQUEST][START] GET /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-18 04:15:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-18 04:15:01 --> [REQ_ID=a0c0aed19c47] [FILTER_BEFORE] /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-18 04:15:01 --> [REQ_ID=a0c0aed19c47] [ROUTE] Controller=\App\Modules\APIs\Controllers\AlertsAPIController Method=fetchEmailAlerts
DEBUG - 2026-03-18 04:15:01 --> [REQ_ID=a0c0aed19c47] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-18 04:15:01 --> [REQ_ID=a0c0aed19c47] [REQUEST][END]
INFO - 2026-03-18 04:15:01 --> [REQ_ID=a0c0aed19c47] [PERF] Execution time=0.045408
DEBUG - 2026-03-18 04:16:22 --> [REQ_ID=4a9a320ce13b] [REQUEST][START] HEAD /
DEBUG - 2026-03-18 04:16:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-18 04:16:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-18 04:16:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-18 04:16:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-18 04:16:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-18 04:21:22 --> [REQ_ID=8337400cea8b] [REQUEST][START] HEAD /
DEBUG - 2026-03-18 04:21:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-18 04:21:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-18 04:21:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-18 04:21:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-18 04:21:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-18 04:26:22 --> [REQ_ID=cdbfc0d04fb7] [REQUEST][START] HEAD /
DEBUG - 2026-03-18 04:26:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-18 04:26:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-18 04:26:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-18 04:26:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-18 04:26:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-18 04:31:22 --> [REQ_ID=40f2fb2433a6] [REQUEST][START] HEAD /
DEBUG - 2026-03-18 04:31:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-18 04:31:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-18 04:31:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-18 04:31:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-18 04:31:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-18 04:36:22 --> [REQ_ID=335aa6ab2951] [REQUEST][START] HEAD /
DEBUG - 2026-03-18 04:36:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-18 04:36:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-18 04:36:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-18 04:36:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-18 04:36:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-18 04:41:22 --> [REQ_ID=dc3c284fb857] [REQUEST][START] HEAD /
DEBUG - 2026-03-18 04:41:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-18 04:41:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-18 04:41:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-18 04:41:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-18 04:41:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-18 04:42:12 --> [REQ_ID=3e98f40a322a] [REQUEST][START] GET /
DEBUG - 2026-03-18 04:42:12 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-18 04:42:12 --> [REQ_ID=3e98f40a322a] [FILTER_BEFORE] /
DEBUG - 2026-03-18 04:42:12 --> [REQ_ID=3e98f40a322a] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-18 04:42:12 --> [REQ_ID=3e98f40a322a] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-18 04:42:12 --> [CSRF] token name=csrf_test_name hash=f1160ecb72c5ae6d22468fe4eccfaa5f
DEBUG - 2026-03-18 04:42:12 --> [REQ_ID=617ba4b30b71] [INIT] App\Controllers\Home::GET
INFO - 2026-03-18 04:42:12 --> [REQ_ID=617ba4b30b71] [MEMORY][controller-start] 4194304
INFO - 2026-03-18 04:42:12 --> [REQ_ID=617ba4b30b71] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-18 04:42:12 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-18 04:42:13 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-03-18 04:42:13 --> [REQ_ID=617ba4b30b71] [VIEW_RENDER] themes/public/home
INFO - 2026-03-18 04:42:13 --> [REQ_ID=617ba4b30b71] [MEMORY][commonData:start] 8388608
INFO - 2026-03-18 04:42:13 --> themesMemory usage: 8388608
DEBUG - 2026-03-18 04:42:13 --> [MetaService] slug= pageName=Home cacheHit= path=DB
DEBUG - 2026-03-18 04:42:13 --> [REQ_ID=3e98f40a322a] [FILTER_AFTER]
DEBUG - 2026-03-18 04:42:13 --> [REQ_ID=3e98f40a322a] [LIFECYCLE][END] status=200 duration_ms=1,120.98 memory_delta=4194304
INFO - 2026-03-18 04:42:13 --> [REQ_ID=617ba4b30b71] [PERF] Execution time=1.119043
DEBUG - 2026-03-18 04:42:13 --> [REQ_ID=3e98f40a322a] [REQUEST][END]
INFO - 2026-03-18 04:42:13 --> [REQ_ID=3e98f40a322a] [PERF] Execution time=1.139625
DEBUG - 2026-03-18 04:46:22 --> [REQ_ID=3eadd2bb2fa4] [REQUEST][START] HEAD /
DEBUG - 2026-03-18 04:46:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-18 04:46:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-18 04:46:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-18 04:46:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-18 04:46:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-18 04:51:22 --> [REQ_ID=51ad42a6c706] [REQUEST][START] HEAD /
DEBUG - 2026-03-18 04:51:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-18 04:51:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-18 04:51:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-18 04:51:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-18 04:51:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-18 04:56:22 --> [REQ_ID=5a782d35edfe] [REQUEST][START] HEAD /
DEBUG - 2026-03-18 04:56:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-18 04:56:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-18 04:56:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-18 04:56:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-18 04:56:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-18 05:00:02 --> [REQ_ID=fc721102dea1] [REQUEST][START] GET /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-18 05:00:02 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-18 05:00:02 --> [REQ_ID=fc721102dea1] [FILTER_BEFORE] /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-18 05:00:02 --> [REQ_ID=fc721102dea1] [ROUTE] Controller=\App\Modules\Management\Controllers\ManagementAPIController Method=Run_CRON_Tasks
DEBUG - 2026-03-18 05:00:02 --> [REQ_ID=fc721102dea1] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-18 05:00:02 --> [REQ_ID=fc721102dea1] [REQUEST][END]
INFO - 2026-03-18 05:00:02 --> [REQ_ID=fc721102dea1] [PERF] Execution time=0.047494
DEBUG - 2026-03-18 05:01:22 --> [REQ_ID=2657fa8f6622] [REQUEST][START] HEAD /
DEBUG - 2026-03-18 05:01:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-18 05:01:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-18 05:01:23 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-18 05:01:23 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-18 05:01:23 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-18 05:06:22 --> [REQ_ID=2fbbe213a3c9] [REQUEST][START] HEAD /
DEBUG - 2026-03-18 05:06:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-18 05:06:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-18 05:06:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-18 05:06:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-18 05:06:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-18 05:11:22 --> [REQ_ID=659d2b605d4c] [REQUEST][START] HEAD /
DEBUG - 2026-03-18 05:11:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-18 05:11:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-18 05:11:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-18 05:11:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-18 05:11:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-18 05:15:01 --> [REQ_ID=98367144b429] [REQUEST][START] GET /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-18 05:15:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-18 05:15:01 --> [REQ_ID=98367144b429] [FILTER_BEFORE] /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-18 05:15:01 --> [REQ_ID=98367144b429] [ROUTE] Controller=\App\Modules\APIs\Controllers\AlertsAPIController Method=fetchEmailAlerts
DEBUG - 2026-03-18 05:15:01 --> [REQ_ID=98367144b429] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-18 05:15:01 --> [REQ_ID=98367144b429] [REQUEST][END]
INFO - 2026-03-18 05:15:01 --> [REQ_ID=98367144b429] [PERF] Execution time=0.045670
DEBUG - 2026-03-18 05:16:22 --> [REQ_ID=63d7ff77ac31] [REQUEST][START] HEAD /
DEBUG - 2026-03-18 05:16:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-18 05:16:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-18 05:16:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-18 05:16:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-18 05:16:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-18 05:21:22 --> [REQ_ID=9b93b01c1fd7] [REQUEST][START] HEAD /
DEBUG - 2026-03-18 05:21:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-18 05:21:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-18 05:21:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-18 05:21:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-18 05:21:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-18 05:21:33 --> [REQ_ID=fa1f2496a1fe] [REQUEST][START] GET /index.php/How-It-Works/MyMI-Gold
DEBUG - 2026-03-18 05:21:33 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-18 05:21:33 --> [REQ_ID=fa1f2496a1fe] [FILTER_BEFORE] /index.php/How-It-Works/MyMI-Gold
DEBUG - 2026-03-18 05:21:33 --> [REQ_ID=fa1f2496a1fe] [ROUTE] Controller=\App\Modules\Blog\Controllers\HowItWorksController Method=MyMIGold
DEBUG - 2026-03-18 05:21:33 --> [REQ_ID=fa1f2496a1fe] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/How-It-Works/MyMI-Gold
DEBUG - 2026-03-18 05:21:33 --> [CSRF] token name=csrf_test_name hash=0b8a77000f698bef83eed5fc53f64d4b
DEBUG - 2026-03-18 05:21:33 --> [REQ_ID=938bdc0766b8] [INIT] App\Modules\Blog\Controllers\HowItWorksController::GET
INFO - 2026-03-18 05:21:33 --> [REQ_ID=938bdc0766b8] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-18 05:21:33 --> [REQ_ID=938bdc0766b8] [METHOD_ENTRY] MyMIGold
DEBUG - 2026-03-18 05:21:33 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-18 05:21:33 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-18 05:21:34 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-18 05:21:34 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-18 05:21:34 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-18 05:21:34 --> MyMICoin: guest context detected; skipping user-specific preload.
INFO - 2026-03-18 05:21:34 --> [REQ_ID=938bdc0766b8] [MEMORY][commonData:start] 6291456
INFO - 2026-03-18 05:21:34 --> themesMemory usage: 8388608
DEBUG - 2026-03-18 05:21:34 --> [MetaService] slug=how-it-works/mymi-gold pageName= cacheHit= path=DB
DEBUG - 2026-03-18 05:21:34 --> [REQ_ID=fa1f2496a1fe] [FILTER_AFTER]
DEBUG - 2026-03-18 05:21:34 --> [REQ_ID=fa1f2496a1fe] [LIFECYCLE][END] status=200 duration_ms=974.99 memory_delta=4194304
INFO - 2026-03-18 05:21:34 --> [REQ_ID=938bdc0766b8] [PERF] Execution time=0.972831
DEBUG - 2026-03-18 05:21:34 --> [REQ_ID=fa1f2496a1fe] [REQUEST][END]
INFO - 2026-03-18 05:21:34 --> [REQ_ID=fa1f2496a1fe] [PERF] Execution time=0.998634
DEBUG - 2026-03-18 05:21:51 --> [REQ_ID=881132f88aa0] [REQUEST][START] GET /
DEBUG - 2026-03-18 05:21:51 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-18 05:21:51 --> [REQ_ID=881132f88aa0] [REQUEST][END]
INFO - 2026-03-18 05:21:51 --> [REQ_ID=881132f88aa0] [PERF] Execution time=0.010239
DEBUG - 2026-03-18 05:26:22 --> [REQ_ID=d64f34a04e92] [REQUEST][START] HEAD /
DEBUG - 2026-03-18 05:26:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-18 05:26:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-18 05:26:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-18 05:26:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-18 05:26:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-18 05:31:22 --> [REQ_ID=b5c61b27425e] [REQUEST][START] HEAD /
DEBUG - 2026-03-18 05:31:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-18 05:31:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-18 05:31:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-18 05:31:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-18 05:31:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-18 05:34:09 --> [REQ_ID=f13987c2276b] [REQUEST][START] GET /
DEBUG - 2026-03-18 05:34:09 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-18 05:34:09 --> [REQ_ID=f13987c2276b] [FILTER_BEFORE] /
DEBUG - 2026-03-18 05:34:09 --> [REQ_ID=f13987c2276b] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-18 05:34:09 --> [REQ_ID=f13987c2276b] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-18 05:34:09 --> [CSRF] token name=csrf_test_name hash=964bc3109eb64a3079d34089a87e1e79
DEBUG - 2026-03-18 05:34:09 --> [REQ_ID=4766e29294bd] [INIT] App\Controllers\Home::GET
INFO - 2026-03-18 05:34:09 --> [REQ_ID=4766e29294bd] [MEMORY][controller-start] 6291456
INFO - 2026-03-18 05:34:09 --> [REQ_ID=4766e29294bd] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-18 05:34:09 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-18 05:34:10 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-03-18 05:34:10 --> [REQ_ID=4766e29294bd] [VIEW_RENDER] themes/public/home
INFO - 2026-03-18 05:34:10 --> [REQ_ID=4766e29294bd] [MEMORY][commonData:start] 10485760
INFO - 2026-03-18 05:34:10 --> themesMemory usage: 10485760
DEBUG - 2026-03-18 05:34:10 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-18 05:34:10 --> [REQ_ID=f13987c2276b] [FILTER_AFTER]
DEBUG - 2026-03-18 05:34:10 --> [REQ_ID=f13987c2276b] [LIFECYCLE][END] status=200 duration_ms=848.14 memory_delta=4194304
INFO - 2026-03-18 05:34:10 --> [REQ_ID=4766e29294bd] [PERF] Execution time=0.846217
DEBUG - 2026-03-18 05:34:10 --> [REQ_ID=f13987c2276b] [REQUEST][END]
INFO - 2026-03-18 05:34:10 --> [REQ_ID=f13987c2276b] [PERF] Execution time=0.886238
DEBUG - 2026-03-18 05:36:22 --> [REQ_ID=34911a5b2ccc] [REQUEST][START] HEAD /
DEBUG - 2026-03-18 05:36:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-18 05:36:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-18 05:36:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-18 05:36:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-18 05:36:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-18 05:41:22 --> [REQ_ID=0f619d654dad] [REQUEST][START] HEAD /
DEBUG - 2026-03-18 05:41:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-18 05:41:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-18 05:41:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-18 05:41:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-18 05:41:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-18 05:46:22 --> [REQ_ID=df736a936339] [REQUEST][START] HEAD /
DEBUG - 2026-03-18 05:46:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-18 05:46:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-18 05:46:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-18 05:46:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-18 05:46:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-18 05:48:02 --> [REQ_ID=7c7e11496f83] [REQUEST][START] GET /
DEBUG - 2026-03-18 05:48:02 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-18 05:48:02 --> [REQ_ID=7c7e11496f83] [FILTER_BEFORE] /
DEBUG - 2026-03-18 05:48:02 --> [REQ_ID=7c7e11496f83] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-18 05:48:02 --> [REQ_ID=7c7e11496f83] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-18 05:48:02 --> [CSRF] token name=csrf_test_name hash=560973565fd277ef5c0488c2d1cd3c41
DEBUG - 2026-03-18 05:48:02 --> [REQ_ID=56a5f7cb0795] [INIT] App\Controllers\Home::GET
INFO - 2026-03-18 05:48:02 --> [REQ_ID=56a5f7cb0795] [MEMORY][controller-start] 4194304
INFO - 2026-03-18 05:48:02 --> [REQ_ID=56a5f7cb0795] [MEMORY][commonData:start] 4194304
DEBUG - 2026-03-18 05:48:02 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-18 05:48:03 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
DEBUG - 2026-03-18 05:48:03 --> [REQ_ID=56a5f7cb0795] [VIEW_RENDER] themes/public/home
INFO - 2026-03-18 05:48:03 --> [REQ_ID=56a5f7cb0795] [MEMORY][commonData:start] 8388608
INFO - 2026-03-18 05:48:03 --> themesMemory usage: 8388608
DEBUG - 2026-03-18 05:48:03 --> [MetaService] slug= pageName=Home cacheHit= path=DB
DEBUG - 2026-03-18 05:48:03 --> [REQ_ID=7c7e11496f83] [FILTER_AFTER]
DEBUG - 2026-03-18 05:48:03 --> [REQ_ID=7c7e11496f83] [LIFECYCLE][END] status=200 duration_ms=931.77 memory_delta=4194304
INFO - 2026-03-18 05:48:03 --> [REQ_ID=56a5f7cb0795] [PERF] Execution time=0.929165
DEBUG - 2026-03-18 05:48:03 --> [REQ_ID=7c7e11496f83] [REQUEST][END]
INFO - 2026-03-18 05:48:03 --> [REQ_ID=7c7e11496f83] [PERF] Execution time=0.956072
DEBUG - 2026-03-18 05:48:03 --> [REQ_ID=47131153e598] [REQUEST][START] GET /
DEBUG - 2026-03-18 05:48:03 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-18 05:48:03 --> [REQ_ID=47131153e598] [FILTER_BEFORE] /
DEBUG - 2026-03-18 05:48:03 --> [REQ_ID=47131153e598] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-18 05:48:03 --> [REQ_ID=47131153e598] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-18 05:48:03 --> [CSRF] token name=csrf_test_name hash=560973565fd277ef5c0488c2d1cd3c41
DEBUG - 2026-03-18 05:48:03 --> [REQ_ID=5b90fbb44dea] [INIT] App\Controllers\Home::GET
INFO - 2026-03-18 05:48:03 --> [REQ_ID=5b90fbb44dea] [MEMORY][controller-start] 4194304
INFO - 2026-03-18 05:48:03 --> [REQ_ID=5b90fbb44dea] [MEMORY][commonData:start] 4194304
DEBUG - 2026-03-18 05:48:03 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-18 05:48:04 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
DEBUG - 2026-03-18 05:48:04 --> [REQ_ID=5b90fbb44dea] [VIEW_RENDER] themes/public/home
INFO - 2026-03-18 05:48:04 --> [REQ_ID=5b90fbb44dea] [MEMORY][commonData:start] 8388608
INFO - 2026-03-18 05:48:04 --> themesMemory usage: 8388608
DEBUG - 2026-03-18 05:48:04 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-18 05:48:04 --> [REQ_ID=47131153e598] [FILTER_AFTER]
DEBUG - 2026-03-18 05:48:04 --> [REQ_ID=47131153e598] [LIFECYCLE][END] status=200 duration_ms=823.80 memory_delta=4194304
INFO - 2026-03-18 05:48:04 --> [REQ_ID=5b90fbb44dea] [PERF] Execution time=0.823628
DEBUG - 2026-03-18 05:48:04 --> [REQ_ID=47131153e598] [REQUEST][END]
INFO - 2026-03-18 05:48:04 --> [REQ_ID=47131153e598] [PERF] Execution time=0.832889
DEBUG - 2026-03-18 05:51:22 --> [REQ_ID=cf601e3be67f] [REQUEST][START] HEAD /
DEBUG - 2026-03-18 05:51:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-18 05:51:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-18 05:51:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-18 05:51:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-18 05:51:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-18 05:56:22 --> [REQ_ID=1e902ae18d4b] [REQUEST][START] HEAD /
DEBUG - 2026-03-18 05:56:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-18 05:56:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-18 05:56:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-18 05:56:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-18 05:56:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-18 06:00:02 --> [REQ_ID=f543309f3c3e] [REQUEST][START] GET /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-18 06:00:02 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-18 06:00:02 --> [REQ_ID=f543309f3c3e] [FILTER_BEFORE] /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-18 06:00:02 --> [REQ_ID=f543309f3c3e] [ROUTE] Controller=\App\Modules\Management\Controllers\ManagementAPIController Method=Run_CRON_Tasks
DEBUG - 2026-03-18 06:00:02 --> [REQ_ID=f543309f3c3e] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-18 06:00:02 --> [REQ_ID=f543309f3c3e] [REQUEST][END]
INFO - 2026-03-18 06:00:02 --> [REQ_ID=f543309f3c3e] [PERF] Execution time=0.036987
DEBUG - 2026-03-18 06:01:22 --> [REQ_ID=d1b2ee7982ae] [REQUEST][START] HEAD /
DEBUG - 2026-03-18 06:01:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-18 06:01:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-18 06:01:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-18 06:01:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-18 06:01:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-18 06:02:45 --> [REQ_ID=d2126d6f775d] [REQUEST][START] GET /
DEBUG - 2026-03-18 06:02:45 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-18 06:02:45 --> [REQ_ID=d2126d6f775d] [FILTER_BEFORE] /
DEBUG - 2026-03-18 06:02:45 --> [REQ_ID=d2126d6f775d] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-18 06:02:45 --> [REQ_ID=d2126d6f775d] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-18 06:02:45 --> [CSRF] token name=csrf_test_name hash=893bc0ebb5368620b523412465eacf2f
DEBUG - 2026-03-18 06:02:45 --> [REQ_ID=aa3c2aade299] [INIT] App\Controllers\Home::GET
INFO - 2026-03-18 06:02:45 --> [REQ_ID=aa3c2aade299] [MEMORY][controller-start] 4194304
INFO - 2026-03-18 06:02:45 --> [REQ_ID=aa3c2aade299] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-18 06:02:45 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-18 06:02:46 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-03-18 06:02:46 --> [REQ_ID=aa3c2aade299] [VIEW_RENDER] themes/public/home
INFO - 2026-03-18 06:02:46 --> [REQ_ID=aa3c2aade299] [MEMORY][commonData:start] 8388608
INFO - 2026-03-18 06:02:46 --> themesMemory usage: 8388608
DEBUG - 2026-03-18 06:02:46 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-18 06:02:46 --> [REQ_ID=d2126d6f775d] [FILTER_AFTER]
DEBUG - 2026-03-18 06:02:46 --> [REQ_ID=d2126d6f775d] [LIFECYCLE][END] status=200 duration_ms=1,080.25 memory_delta=4194304
INFO - 2026-03-18 06:02:46 --> [REQ_ID=aa3c2aade299] [PERF] Execution time=1.077458
DEBUG - 2026-03-18 06:02:46 --> [REQ_ID=d2126d6f775d] [REQUEST][END]
INFO - 2026-03-18 06:02:46 --> [REQ_ID=d2126d6f775d] [PERF] Execution time=1.160421
DEBUG - 2026-03-18 06:06:22 --> [REQ_ID=944c8e6b17b8] [REQUEST][START] HEAD /
DEBUG - 2026-03-18 06:06:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-18 06:06:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-18 06:06:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-18 06:06:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-18 06:06:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-18 06:11:22 --> [REQ_ID=f4ffcd0de10b] [REQUEST][START] HEAD /
DEBUG - 2026-03-18 06:11:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-18 06:11:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-18 06:11:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-18 06:11:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-18 06:11:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-18 06:15:01 --> [REQ_ID=349c31889815] [REQUEST][START] GET /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-18 06:15:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-18 06:15:02 --> [REQ_ID=349c31889815] [FILTER_BEFORE] /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-18 06:15:02 --> [REQ_ID=349c31889815] [ROUTE] Controller=\App\Modules\APIs\Controllers\AlertsAPIController Method=fetchEmailAlerts
DEBUG - 2026-03-18 06:15:02 --> [REQ_ID=349c31889815] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-18 06:15:02 --> [REQ_ID=349c31889815] [REQUEST][END]
INFO - 2026-03-18 06:15:02 --> [REQ_ID=349c31889815] [PERF] Execution time=0.063514
DEBUG - 2026-03-18 06:16:22 --> [REQ_ID=4a6f3b340e50] [REQUEST][START] HEAD /
DEBUG - 2026-03-18 06:16:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-18 06:16:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-18 06:16:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-18 06:16:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-18 06:16:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-18 06:21:22 --> [REQ_ID=565572f7fe35] [REQUEST][START] HEAD /
DEBUG - 2026-03-18 06:21:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-18 06:21:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-18 06:21:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-18 06:21:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-18 06:21:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-18 06:26:22 --> [REQ_ID=4809d842ea4d] [REQUEST][START] HEAD /
DEBUG - 2026-03-18 06:26:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-18 06:26:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-18 06:26:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-18 06:26:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-18 06:26:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-18 06:29:11 --> [REQ_ID=02e0c4170f13] [REQUEST][START] GET /index.php/How-It-Works/Registering-An-Account
DEBUG - 2026-03-18 06:29:11 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-18 06:29:11 --> [REQ_ID=02e0c4170f13] [REQUEST][END]
INFO - 2026-03-18 06:29:11 --> [REQ_ID=02e0c4170f13] [PERF] Execution time=0.055917
DEBUG - 2026-03-18 06:31:22 --> [REQ_ID=e3f2ddba0777] [REQUEST][START] HEAD /
DEBUG - 2026-03-18 06:31:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-18 06:31:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-18 06:31:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-18 06:31:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-18 06:31:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-18 06:36:22 --> [REQ_ID=5b439f305cc5] [REQUEST][START] HEAD /
DEBUG - 2026-03-18 06:36:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-18 06:36:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-18 06:36:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-18 06:36:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-18 06:36:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-18 06:36:51 --> [REQ_ID=0af5967af4ea] [REQUEST][START] GET /index.php/How-It-Works/MyMI-Exchange
DEBUG - 2026-03-18 06:36:51 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-18 06:36:51 --> [REQ_ID=0af5967af4ea] [REQUEST][END]
INFO - 2026-03-18 06:36:51 --> [REQ_ID=0af5967af4ea] [PERF] Execution time=0.020960
DEBUG - 2026-03-18 06:40:32 --> [REQ_ID=9a0d1d4cc633] [REQUEST][START] GET /
DEBUG - 2026-03-18 06:40:32 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-18 06:40:32 --> [REQ_ID=9a0d1d4cc633] [FILTER_BEFORE] /
DEBUG - 2026-03-18 06:40:32 --> [REQ_ID=9a0d1d4cc633] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-18 06:40:32 --> [REQ_ID=9a0d1d4cc633] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-18 06:40:32 --> [CSRF] token name=csrf_test_name hash=0aa5d2a920d15af817083bdb2fab8201
DEBUG - 2026-03-18 06:40:32 --> [REQ_ID=cac4a63e1edd] [INIT] App\Controllers\Home::GET
INFO - 2026-03-18 06:40:32 --> [REQ_ID=cac4a63e1edd] [MEMORY][controller-start] 6291456
INFO - 2026-03-18 06:40:33 --> [REQ_ID=cac4a63e1edd] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-18 06:40:33 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-18 06:40:33 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-03-18 06:40:33 --> [REQ_ID=cac4a63e1edd] [VIEW_RENDER] themes/public/home
INFO - 2026-03-18 06:40:33 --> [REQ_ID=cac4a63e1edd] [MEMORY][commonData:start] 10485760
INFO - 2026-03-18 06:40:33 --> themesMemory usage: 10485760
DEBUG - 2026-03-18 06:40:33 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-18 06:40:33 --> [REQ_ID=9a0d1d4cc633] [FILTER_AFTER]
DEBUG - 2026-03-18 06:40:33 --> [REQ_ID=9a0d1d4cc633] [LIFECYCLE][END] status=200 duration_ms=996.70 memory_delta=4194304
INFO - 2026-03-18 06:40:33 --> [REQ_ID=cac4a63e1edd] [PERF] Execution time=0.994829
DEBUG - 2026-03-18 06:40:33 --> [REQ_ID=9a0d1d4cc633] [REQUEST][END]
INFO - 2026-03-18 06:40:33 --> [REQ_ID=9a0d1d4cc633] [PERF] Execution time=1.035737
DEBUG - 2026-03-18 06:41:22 --> [REQ_ID=18bd3024fc2a] [REQUEST][START] HEAD /
DEBUG - 2026-03-18 06:41:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-18 06:41:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-18 06:41:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-18 06:41:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-18 06:41:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-18 06:41:40 --> [REQ_ID=fb9b0447426d] [REQUEST][START] GET /index.php/Knowledgebase/Assets
DEBUG - 2026-03-18 06:41:40 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-18 06:41:40 --> [REQ_ID=fb9b0447426d] [REQUEST][END]
INFO - 2026-03-18 06:41:40 --> [REQ_ID=fb9b0447426d] [PERF] Execution time=0.012894
DEBUG - 2026-03-18 06:45:02 --> [REQ_ID=257b5797da01] [REQUEST][START] GET /index.php/Account/Notifications
DEBUG - 2026-03-18 06:45:02 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-18 06:45:02 --> [REQ_ID=257b5797da01] [REQUEST][END]
INFO - 2026-03-18 06:45:02 --> [REQ_ID=257b5797da01] [PERF] Execution time=0.041237
DEBUG - 2026-03-18 06:46:00 --> [REQ_ID=4caab0086aed] [REQUEST][START] GET /
DEBUG - 2026-03-18 06:46:00 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-18 06:46:00 --> [REQ_ID=4caab0086aed] [FILTER_BEFORE] /
DEBUG - 2026-03-18 06:46:00 --> [REQ_ID=4caab0086aed] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-18 06:46:00 --> [REQ_ID=4caab0086aed] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-18 06:46:00 --> [CSRF] token name=csrf_test_name hash=5b7ff8789070bff3cf66a51205dc3ac5
DEBUG - 2026-03-18 06:46:00 --> [REQ_ID=546c668590ff] [INIT] App\Controllers\Home::GET
INFO - 2026-03-18 06:46:00 --> [REQ_ID=546c668590ff] [MEMORY][controller-start] 4194304
INFO - 2026-03-18 06:46:00 --> [REQ_ID=546c668590ff] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-18 06:46:00 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-18 06:46:01 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
DEBUG - 2026-03-18 06:46:01 --> [REQ_ID=546c668590ff] [VIEW_RENDER] themes/public/home
INFO - 2026-03-18 06:46:01 --> [REQ_ID=546c668590ff] [MEMORY][commonData:start] 8388608
INFO - 2026-03-18 06:46:01 --> themesMemory usage: 8388608
DEBUG - 2026-03-18 06:46:01 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-18 06:46:01 --> [REQ_ID=4caab0086aed] [FILTER_AFTER]
DEBUG - 2026-03-18 06:46:01 --> [REQ_ID=4caab0086aed] [LIFECYCLE][END] status=200 duration_ms=941.60 memory_delta=4194304
INFO - 2026-03-18 06:46:01 --> [REQ_ID=546c668590ff] [PERF] Execution time=0.939621
DEBUG - 2026-03-18 06:46:01 --> [REQ_ID=4caab0086aed] [REQUEST][END]
INFO - 2026-03-18 06:46:01 --> [REQ_ID=4caab0086aed] [PERF] Execution time=0.951769
DEBUG - 2026-03-18 06:46:22 --> [REQ_ID=669a54f83136] [REQUEST][START] HEAD /
DEBUG - 2026-03-18 06:46:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-18 06:46:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-18 06:46:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-18 06:46:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-18 06:46:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-18 06:51:22 --> [REQ_ID=6ed348b54ab0] [REQUEST][START] HEAD /
DEBUG - 2026-03-18 06:51:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-18 06:51:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-18 06:51:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-18 06:51:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-18 06:51:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-18 06:56:22 --> [REQ_ID=f944b5d591f3] [REQUEST][START] HEAD /
DEBUG - 2026-03-18 06:56:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-18 06:56:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-18 06:56:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-18 06:56:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-18 06:56:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
INFO - 2026-03-18 07:00:01 --> [SPARK_START] App\Commands\AIOps\Run
INFO - 2026-03-18 07:00:01 --> [SPARK_MEMORY] 18874368
INFO - 2026-03-18 07:00:01 --> [spark:aiops:run] Intent
DEBUG - 2026-03-18 07:00:01 --> [REQ_ID=cb02f28e4445] [REQUEST][START] GET /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-18 07:00:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
INFO - 2026-03-18 07:00:01 --> [spark:ops:work] Started
INFO - 2026-03-18 07:00:01 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-03-18 07:00:01 --> [SPARK_MEMORY] 18874368
INFO - 2026-03-18 07:00:01 --> [spark:ops:work] Intent
DEBUG - 2026-03-18 07:00:01 --> [REQ_ID=cb02f28e4445] [FILTER_BEFORE] /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-18 07:00:01 --> [REQ_ID=cb02f28e4445] [ROUTE] Controller=\App\Modules\Management\Controllers\ManagementAPIController Method=Run_CRON_Tasks
DEBUG - 2026-03-18 07:00:01 --> [REQ_ID=cb02f28e4445] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-18 07:00:01 --> [REQ_ID=cb02f28e4445] [REQUEST][END]
INFO - 2026-03-18 07:00:01 --> [REQ_ID=cb02f28e4445] [PERF] Execution time=0.094447
INFO - 2026-03-18 07:00:01 --> [spark:ops:work] Completed
INFO - 2026-03-18 07:00:01 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.275094
INFO - 2026-03-18 07:00:01 --> [SPARK_MEMORY] 18874368
INFO - 2026-03-18 07:00:03 --> [AIOPS][SPARK][GOVERNANCE][spark:logs:summarize] Started
INFO - 2026-03-18 07:00:03 --> [SPARK_START] App\Commands\Logs\Summarize
INFO - 2026-03-18 07:00:03 --> [SPARK_MEMORY] 18874368
INFO - 2026-03-18 07:00:03 --> [spark:logs:summarize] Intent
INFO - 2026-03-18 07:00:03 --> [AIOPS][SPARK][GOVERNANCE][spark:logs:summarize] Completed
INFO - 2026-03-18 07:00:03 --> [SPARK_COMPLETE] App\Commands\Logs\Summarize duration=0.004202
INFO - 2026-03-18 07:00:03 --> [SPARK_MEMORY] 18874368
INFO - 2026-03-18 07:00:03 --> [spark:app:healthcheck] Started
INFO - 2026-03-18 07:00:03 --> [SPARK_START] App\Commands\App\Healthcheck
INFO - 2026-03-18 07:00:03 --> [SPARK_MEMORY] 18874368
INFO - 2026-03-18 07:00:03 --> [spark:app:healthcheck] Intent
DEBUG - 2026-03-18 07:00:03 --> LOG_HEALTHCHECK debug marker=0bb898b2aba1
INFO - 2026-03-18 07:00:03 --> LOG_HEALTHCHECK info marker=0bb898b2aba1
NOTICE - 2026-03-18 07:00:03 --> LOG_HEALTHCHECK probe marker=0bb898b2aba1
INFO - 2026-03-18 07:00:03 --> [spark:app:healthcheck] Completed
INFO - 2026-03-18 07:00:03 --> [SPARK_COMPLETE] App\Commands\App\Healthcheck duration=0.091071
INFO - 2026-03-18 07:00:03 --> [SPARK_MEMORY] 18874368
INFO - 2026-03-18 07:00:03 --> [SPARK_COMPLETE] App\Commands\AIOps\Run duration=2.093061
INFO - 2026-03-18 07:00:03 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-03-18 07:01:22 --> [REQ_ID=1e8b4de17578] [REQUEST][START] HEAD /
DEBUG - 2026-03-18 07:01:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-18 07:01:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-18 07:01:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-18 07:01:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-18 07:01:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-18 07:06:22 --> [REQ_ID=3f2608ab850a] [REQUEST][START] HEAD /
DEBUG - 2026-03-18 07:06:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-18 07:06:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-18 07:06:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-18 07:06:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-18 07:06:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-18 07:11:22 --> [REQ_ID=e6441377222d] [REQUEST][START] HEAD /
DEBUG - 2026-03-18 07:11:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-18 07:11:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-18 07:11:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-18 07:11:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-18 07:11:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-18 07:15:01 --> [REQ_ID=17f99f90a4a8] [REQUEST][START] GET /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-18 07:15:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-18 07:15:01 --> [REQ_ID=17f99f90a4a8] [FILTER_BEFORE] /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-18 07:15:01 --> [REQ_ID=17f99f90a4a8] [ROUTE] Controller=\App\Modules\APIs\Controllers\AlertsAPIController Method=fetchEmailAlerts
DEBUG - 2026-03-18 07:15:01 --> [REQ_ID=17f99f90a4a8] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-18 07:15:01 --> [REQ_ID=17f99f90a4a8] [REQUEST][END]
INFO - 2026-03-18 07:15:01 --> [REQ_ID=17f99f90a4a8] [PERF] Execution time=0.046888
DEBUG - 2026-03-18 07:16:22 --> [REQ_ID=7a662036f497] [REQUEST][START] HEAD /
DEBUG - 2026-03-18 07:16:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-18 07:16:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-18 07:16:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-18 07:16:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-18 07:16:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-18 07:17:36 --> [REQ_ID=849741dae8a7] [REQUEST][START] GET /
DEBUG - 2026-03-18 07:17:36 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-18 07:17:36 --> [REQ_ID=849741dae8a7] [FILTER_BEFORE] /
DEBUG - 2026-03-18 07:17:36 --> [REQ_ID=849741dae8a7] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-18 07:17:36 --> [REQ_ID=849741dae8a7] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-18 07:17:36 --> [CSRF] token name=csrf_test_name hash=e472b714e60a4974b2bb29ce4aaa9c2a
DEBUG - 2026-03-18 07:17:36 --> [REQ_ID=ac2aefe63830] [INIT] App\Controllers\Home::GET
INFO - 2026-03-18 07:17:36 --> [REQ_ID=ac2aefe63830] [MEMORY][controller-start] 4194304
INFO - 2026-03-18 07:17:37 --> [REQ_ID=ac2aefe63830] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-18 07:17:37 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-18 07:17:37 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-03-18 07:17:37 --> [REQ_ID=ac2aefe63830] [VIEW_RENDER] themes/public/home
INFO - 2026-03-18 07:17:37 --> [REQ_ID=ac2aefe63830] [MEMORY][commonData:start] 8388608
INFO - 2026-03-18 07:17:37 --> themesMemory usage: 8388608
DEBUG - 2026-03-18 07:17:37 --> [MetaService] slug= pageName=Home cacheHit= path=DB
DEBUG - 2026-03-18 07:17:37 --> [REQ_ID=849741dae8a7] [FILTER_AFTER]
DEBUG - 2026-03-18 07:17:37 --> [REQ_ID=849741dae8a7] [LIFECYCLE][END] status=200 duration_ms=876.21 memory_delta=4194304
INFO - 2026-03-18 07:17:37 --> [REQ_ID=ac2aefe63830] [PERF] Execution time=0.873598
DEBUG - 2026-03-18 07:17:37 --> [REQ_ID=849741dae8a7] [REQUEST][END]
INFO - 2026-03-18 07:17:37 --> [REQ_ID=849741dae8a7] [PERF] Execution time=0.900581
DEBUG - 2026-03-18 07:21:22 --> [REQ_ID=dbed5292f112] [REQUEST][START] HEAD /
DEBUG - 2026-03-18 07:21:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-18 07:21:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-18 07:21:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-18 07:21:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-18 07:21:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-18 07:26:22 --> [REQ_ID=556347dc2248] [REQUEST][START] HEAD /
DEBUG - 2026-03-18 07:26:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-18 07:26:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-18 07:26:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-18 07:26:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-18 07:26:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-18 07:31:22 --> [REQ_ID=91fc8018c479] [REQUEST][START] HEAD /
DEBUG - 2026-03-18 07:31:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-18 07:31:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-18 07:31:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-18 07:31:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-18 07:31:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-18 07:33:18 --> [REQ_ID=10e45f6e647c] [REQUEST][START] GET /?rest_route=/wp/v2/posts&per_page=5&status=publish&_fields=link,comment_status
DEBUG - 2026-03-18 07:33:18 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-18 07:33:18 --> [REQ_ID=10e45f6e647c] [FILTER_BEFORE] /?rest_route=/wp/v2/posts&per_page=5&status=publish&_fields=link,comment_status
DEBUG - 2026-03-18 07:33:18 --> [REQ_ID=10e45f6e647c] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-18 07:33:18 --> [REQ_ID=10e45f6e647c] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php?rest_route=%2Fwp%2Fv2%2Fposts&per_page=5&status=publish&_fields=link%2Ccomment_status
DEBUG - 2026-03-18 07:33:18 --> [CSRF] token name=csrf_test_name hash=358dde4e22c5da6471d2ae8b9c1d6182
DEBUG - 2026-03-18 07:33:18 --> [REQ_ID=70f5e2006baf] [INIT] App\Controllers\Home::GET
INFO - 2026-03-18 07:33:18 --> [REQ_ID=70f5e2006baf] [MEMORY][controller-start] 6291456
INFO - 2026-03-18 07:33:18 --> [REQ_ID=70f5e2006baf] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-18 07:33:19 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-18 07:33:19 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-03-18 07:33:19 --> [REQ_ID=70f5e2006baf] [VIEW_RENDER] themes/public/home
INFO - 2026-03-18 07:33:19 --> [REQ_ID=70f5e2006baf] [MEMORY][commonData:start] 10485760
INFO - 2026-03-18 07:33:19 --> themesMemory usage: 10485760
DEBUG - 2026-03-18 07:33:19 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-18 07:33:19 --> [REQ_ID=10e45f6e647c] [FILTER_AFTER]
DEBUG - 2026-03-18 07:33:19 --> [REQ_ID=10e45f6e647c] [LIFECYCLE][END] status=200 duration_ms=1,068.48 memory_delta=4194304
INFO - 2026-03-18 07:33:19 --> [REQ_ID=70f5e2006baf] [PERF] Execution time=1.066531
DEBUG - 2026-03-18 07:33:19 --> [REQ_ID=10e45f6e647c] [REQUEST][END]
INFO - 2026-03-18 07:33:19 --> [REQ_ID=10e45f6e647c] [PERF] Execution time=1.108862
DEBUG - 2026-03-18 07:33:23 --> [REQ_ID=1a6821316aee] [REQUEST][START] GET /
DEBUG - 2026-03-18 07:33:23 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-18 07:33:23 --> [REQ_ID=1a6821316aee] [FILTER_BEFORE] /
DEBUG - 2026-03-18 07:33:23 --> [REQ_ID=1a6821316aee] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-18 07:33:23 --> [REQ_ID=1a6821316aee] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-18 07:33:23 --> [CSRF] token name=csrf_test_name hash=fda49ae2b9dfe033634f2676be2fb10d
DEBUG - 2026-03-18 07:33:23 --> [REQ_ID=7e6cd818b0f4] [INIT] App\Controllers\Home::GET
INFO - 2026-03-18 07:33:23 --> [REQ_ID=7e6cd818b0f4] [MEMORY][controller-start] 6291456
INFO - 2026-03-18 07:33:23 --> [REQ_ID=7e6cd818b0f4] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-18 07:33:23 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-18 07:33:24 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
DEBUG - 2026-03-18 07:33:24 --> [REQ_ID=7e6cd818b0f4] [VIEW_RENDER] themes/public/home
INFO - 2026-03-18 07:33:24 --> [REQ_ID=7e6cd818b0f4] [MEMORY][commonData:start] 8388608
INFO - 2026-03-18 07:33:24 --> themesMemory usage: 8388608
DEBUG - 2026-03-18 07:33:24 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-18 07:33:24 --> [REQ_ID=1a6821316aee] [FILTER_AFTER]
DEBUG - 2026-03-18 07:33:24 --> [REQ_ID=1a6821316aee] [LIFECYCLE][END] status=200 duration_ms=877.48 memory_delta=2097152
INFO - 2026-03-18 07:33:24 --> [REQ_ID=7e6cd818b0f4] [PERF] Execution time=0.877185
DEBUG - 2026-03-18 07:33:24 --> [REQ_ID=1a6821316aee] [REQUEST][END]
INFO - 2026-03-18 07:33:24 --> [REQ_ID=1a6821316aee] [PERF] Execution time=0.886801
DEBUG - 2026-03-18 07:33:31 --> [REQ_ID=b2e36ec7873a] [REQUEST][START] GET /index.php/How-It-Works
DEBUG - 2026-03-18 07:33:31 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-18 07:33:31 --> [REQ_ID=b2e36ec7873a] [FILTER_BEFORE] /index.php/How-It-Works
DEBUG - 2026-03-18 07:33:31 --> [REQ_ID=b2e36ec7873a] [ROUTE] Controller=\App\Modules\Blog\Controllers\HowItWorksController Method=index
DEBUG - 2026-03-18 07:33:31 --> [REQ_ID=b2e36ec7873a] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/How-It-Works
DEBUG - 2026-03-18 07:33:31 --> [CSRF] token name=csrf_test_name hash=8f4ebb99286d5675cc39880ad02c38ac
DEBUG - 2026-03-18 07:33:31 --> [REQ_ID=175b23d19949] [INIT] App\Modules\Blog\Controllers\HowItWorksController::GET
INFO - 2026-03-18 07:33:31 --> [REQ_ID=175b23d19949] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-18 07:33:31 --> [REQ_ID=175b23d19949] [METHOD_ENTRY] index
DEBUG - 2026-03-18 07:33:31 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-18 07:33:31 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-18 07:33:31 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-18 07:33:31 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-18 07:33:31 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-18 07:33:31 --> MyMICoin: guest context detected; skipping user-specific preload.
ERROR - 2026-03-18 07:33:31 --> HowItWorksController failure: overview
CRITICAL - 2026-03-18 07:33:31 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: GET, Route: How-It-Works]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-18 07:33:31 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-18 07:33:31 --> [404] URI=https://www.mymiwallet.com/index.php/How-It-Works
WARNING - 2026-03-18 07:33:31 --> 404 route miss: https://www.mymiwallet.com/index.php/How-It-Works | referrer: https://search.yahoo.com/
ERROR - 2026-03-18 07:33:31 --> [ERROR_PAGE] event=error_404 status=404 message=Page not found.
INFO - 2026-03-18 07:33:31 --> [REQ_ID=175b23d19949] [PERF] Execution time=0.398168
DEBUG - 2026-03-18 07:33:32 --> [REQ_ID=58c7eb6c13bd] [REQUEST][START] GET /index.php/Knowledgebase
DEBUG - 2026-03-18 07:33:32 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-18 07:33:32 --> [REQ_ID=58c7eb6c13bd] [FILTER_BEFORE] /index.php/Knowledgebase
DEBUG - 2026-03-18 07:33:32 --> [REQ_ID=58c7eb6c13bd] [ROUTE] Controller=\App\Modules\User\Controllers\KnowledgebaseController Method=index
DEBUG - 2026-03-18 07:33:32 --> [REQ_ID=58c7eb6c13bd] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Knowledgebase
DEBUG - 2026-03-18 07:33:32 --> [CSRF] token name=csrf_test_name hash=f139c21d8a6f38d5b4ae53ae61ee08b4
DEBUG - 2026-03-18 07:33:32 --> [REQ_ID=58c7eb6c13bd] [REQUEST][END]
INFO - 2026-03-18 07:33:32 --> [REQ_ID=58c7eb6c13bd] [PERF] Execution time=0.011452
DEBUG - 2026-03-18 07:33:32 --> [REQ_ID=5cb2cec0e604] [REQUEST][START] GET /index.php/Blog
DEBUG - 2026-03-18 07:33:32 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-18 07:33:32 --> [REQ_ID=5cb2cec0e604] [FILTER_BEFORE] /index.php/Blog
DEBUG - 2026-03-18 07:33:32 --> [REQ_ID=5cb2cec0e604] [ROUTE] Controller=\App\Modules\Blog\Controllers\BlogController Method=index
DEBUG - 2026-03-18 07:33:32 --> [REQ_ID=5cb2cec0e604] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Blog
DEBUG - 2026-03-18 07:33:32 --> [CSRF] token name=csrf_test_name hash=60662ff908d040d65d974d07d68d7f82
DEBUG - 2026-03-18 07:33:32 --> [REQ_ID=39df98d37ec2] [INIT] App\Modules\Blog\Controllers\BlogController::GET
INFO - 2026-03-18 07:33:32 --> [REQ_ID=39df98d37ec2] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-18 07:33:32 --> [REQ_ID=39df98d37ec2] [METHOD_ENTRY] index
DEBUG - 2026-03-18 07:33:32 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-18 07:33:32 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-18 07:33:32 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-18 07:33:32 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-18 07:33:32 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-18 07:33:32 --> MyMICoin: guest context detected; skipping user-specific preload.
INFO - 2026-03-18 07:33:32 --> [REQ_ID=39df98d37ec2] [MEMORY][commonData:start] 4194304
INFO - 2026-03-18 07:33:32 --> [REQ_ID=39df98d37ec2] [PERF] Execution time=0.018644
DEBUG - 2026-03-18 07:33:32 --> [REQ_ID=9d755e4b4858] [REQUEST][START] GET /index.php/
DEBUG - 2026-03-18 07:33:32 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-18 07:33:32 --> [REQ_ID=9d755e4b4858] [FILTER_BEFORE] /index.php/
DEBUG - 2026-03-18 07:33:32 --> [REQ_ID=9d755e4b4858] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-18 07:33:32 --> [REQ_ID=9d755e4b4858] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-18 07:33:32 --> [CSRF] token name=csrf_test_name hash=69e8aa02a4465523e53d2281b5902151
DEBUG - 2026-03-18 07:33:32 --> [REQ_ID=b1a4955bbeb5] [INIT] App\Controllers\Home::GET
INFO - 2026-03-18 07:33:32 --> [REQ_ID=b1a4955bbeb5] [MEMORY][controller-start] 6291456
INFO - 2026-03-18 07:33:32 --> [REQ_ID=b1a4955bbeb5] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-18 07:33:32 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-18 07:33:32 --> [REQ_ID=a2b42dba9530] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-18 07:33:32 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-18 07:33:32 --> [REQ_ID=a2b42dba9530] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-18 07:33:32 --> [REQ_ID=a2b42dba9530] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-18 07:33:32 --> [REQ_ID=a2b42dba9530] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-18 07:33:32 --> [CSRF] token name=csrf_test_name hash=5e7f7a4014fc26a6ab4883a40dd9c870
DEBUG - 2026-03-18 07:33:32 --> [REQ_ID=3b08a53fcd82] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-18 07:33:32 --> [REQ_ID=3b08a53fcd82] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-18 07:33:32 --> [REQ_ID=a2b42dba9530] [FILTER_AFTER]
DEBUG - 2026-03-18 07:33:32 --> [REQ_ID=a2b42dba9530] [LIFECYCLE][END] status=200 duration_ms=32.06 memory_delta=0
INFO - 2026-03-18 07:33:32 --> [REQ_ID=3b08a53fcd82] [PERF] Execution time=0.031811
DEBUG - 2026-03-18 07:33:32 --> [REQ_ID=a2b42dba9530] [REQUEST][END]
INFO - 2026-03-18 07:33:32 --> [REQ_ID=a2b42dba9530] [PERF] Execution time=0.043361
DEBUG - 2026-03-18 07:33:33 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
DEBUG - 2026-03-18 07:33:33 --> [REQ_ID=b1a4955bbeb5] [VIEW_RENDER] themes/public/home
INFO - 2026-03-18 07:33:33 --> [REQ_ID=b1a4955bbeb5] [MEMORY][commonData:start] 10485760
INFO - 2026-03-18 07:33:33 --> themesMemory usage: 10485760
DEBUG - 2026-03-18 07:33:33 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-18 07:33:33 --> [REQ_ID=9d755e4b4858] [FILTER_AFTER]
DEBUG - 2026-03-18 07:33:33 --> [REQ_ID=9d755e4b4858] [LIFECYCLE][END] status=200 duration_ms=743.46 memory_delta=4194304
INFO - 2026-03-18 07:33:33 --> [REQ_ID=b1a4955bbeb5] [PERF] Execution time=0.741503
DEBUG - 2026-03-18 07:33:33 --> [REQ_ID=9d755e4b4858] [REQUEST][END]
INFO - 2026-03-18 07:33:33 --> [REQ_ID=9d755e4b4858] [PERF] Execution time=0.783277
DEBUG - 2026-03-18 07:33:33 --> [REQ_ID=84dc28bb1001] [REQUEST][START] GET /index.php/How-It-Works/Personal-Budgeting
DEBUG - 2026-03-18 07:33:33 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-18 07:33:33 --> [REQ_ID=84dc28bb1001] [FILTER_BEFORE] /index.php/How-It-Works/Personal-Budgeting
DEBUG - 2026-03-18 07:33:33 --> [REQ_ID=84dc28bb1001] [ROUTE] Controller=\App\Modules\Blog\Controllers\HowItWorksController Method=PersonalBudgeting
DEBUG - 2026-03-18 07:33:33 --> [REQ_ID=84dc28bb1001] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/How-It-Works/Personal-Budgeting
DEBUG - 2026-03-18 07:33:33 --> [CSRF] token name=csrf_test_name hash=027439a9f4552984f854abc4cda29829
DEBUG - 2026-03-18 07:33:33 --> [REQ_ID=487a4e2a25cd] [INIT] App\Modules\Blog\Controllers\HowItWorksController::GET
INFO - 2026-03-18 07:33:33 --> [REQ_ID=487a4e2a25cd] [MEMORY][controller-start] 6291456
DEBUG - 2026-03-18 07:33:33 --> [REQ_ID=487a4e2a25cd] [METHOD_ENTRY] PersonalBudgeting
DEBUG - 2026-03-18 07:33:33 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-18 07:33:33 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-18 07:33:33 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-18 07:33:34 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-18 07:33:34 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-18 07:33:34 --> MyMICoin: guest context detected; skipping user-specific preload.
INFO - 2026-03-18 07:33:34 --> [REQ_ID=487a4e2a25cd] [MEMORY][commonData:start] 6291456
INFO - 2026-03-18 07:33:34 --> themesMemory usage: 8388608
DEBUG - 2026-03-18 07:33:34 --> [MetaService] slug=how-it-works/personal-budgeting pageName= cacheHit= path=DB
DEBUG - 2026-03-18 07:33:34 --> [REQ_ID=84dc28bb1001] [FILTER_AFTER]
DEBUG - 2026-03-18 07:33:34 --> [REQ_ID=84dc28bb1001] [LIFECYCLE][END] status=200 duration_ms=1,079.57 memory_delta=2097152
INFO - 2026-03-18 07:33:34 --> [REQ_ID=487a4e2a25cd] [PERF] Execution time=1.079412
DEBUG - 2026-03-18 07:33:34 --> [REQ_ID=84dc28bb1001] [REQUEST][END]
INFO - 2026-03-18 07:33:34 --> [REQ_ID=84dc28bb1001] [PERF] Execution time=1.092320
DEBUG - 2026-03-18 07:36:22 --> [REQ_ID=1463ea4307ca] [REQUEST][START] HEAD /
DEBUG - 2026-03-18 07:36:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-18 07:36:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-18 07:36:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-18 07:36:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-18 07:36:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-18 07:41:22 --> [REQ_ID=3ad94d59b80c] [REQUEST][START] HEAD /
DEBUG - 2026-03-18 07:41:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-18 07:41:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-18 07:41:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-18 07:41:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-18 07:41:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-18 07:44:53 --> [REQ_ID=7bc7901201f2] [REQUEST][START] GET /
DEBUG - 2026-03-18 07:44:53 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-18 07:44:53 --> [REQ_ID=7bc7901201f2] [FILTER_BEFORE] /
DEBUG - 2026-03-18 07:44:53 --> [REQ_ID=7bc7901201f2] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-18 07:44:53 --> [REQ_ID=7bc7901201f2] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-18 07:44:53 --> [CSRF] token name=csrf_test_name hash=d8d2c4264f3b02a484ba965fba903286
DEBUG - 2026-03-18 07:44:53 --> [REQ_ID=aac3d252955a] [INIT] App\Controllers\Home::GET
INFO - 2026-03-18 07:44:53 --> [REQ_ID=aac3d252955a] [MEMORY][controller-start] 6291456
INFO - 2026-03-18 07:44:53 --> [REQ_ID=aac3d252955a] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-18 07:44:53 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-18 07:44:53 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
DEBUG - 2026-03-18 07:44:53 --> [REQ_ID=aac3d252955a] [VIEW_RENDER] themes/public/home
INFO - 2026-03-18 07:44:53 --> [REQ_ID=aac3d252955a] [MEMORY][commonData:start] 10485760
INFO - 2026-03-18 07:44:53 --> themesMemory usage: 10485760
DEBUG - 2026-03-18 07:44:53 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-18 07:44:53 --> [REQ_ID=7bc7901201f2] [FILTER_AFTER]
DEBUG - 2026-03-18 07:44:53 --> [REQ_ID=7bc7901201f2] [LIFECYCLE][END] status=200 duration_ms=762.52 memory_delta=4194304
INFO - 2026-03-18 07:44:53 --> [REQ_ID=aac3d252955a] [PERF] Execution time=0.760559
DEBUG - 2026-03-18 07:44:53 --> [REQ_ID=7bc7901201f2] [REQUEST][END]
INFO - 2026-03-18 07:44:53 --> [REQ_ID=7bc7901201f2] [PERF] Execution time=0.801471
DEBUG - 2026-03-18 07:46:22 --> [REQ_ID=c5ea6fa6be89] [REQUEST][START] HEAD /
DEBUG - 2026-03-18 07:46:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-18 07:46:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-18 07:46:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-18 07:46:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-18 07:46:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-18 07:51:22 --> [REQ_ID=e836372b0813] [REQUEST][START] HEAD /
DEBUG - 2026-03-18 07:51:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-18 07:51:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-18 07:51:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-18 07:51:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-18 07:51:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-18 07:51:51 --> [REQ_ID=7204bc28a5a4] [REQUEST][START] GET /index.php
DEBUG - 2026-03-18 07:51:51 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-18 07:51:51 --> [REQ_ID=7204bc28a5a4] [REQUEST][END]
INFO - 2026-03-18 07:51:51 --> [REQ_ID=7204bc28a5a4] [PERF] Execution time=0.023845
DEBUG - 2026-03-18 07:56:22 --> [REQ_ID=0a29ce9c7455] [REQUEST][START] HEAD /
DEBUG - 2026-03-18 07:56:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-18 07:56:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-18 07:56:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-18 07:56:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-18 07:56:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-18 08:00:01 --> [REQ_ID=dcf7e05518a1] [REQUEST][START] GET /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-18 08:00:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-18 08:00:01 --> [REQ_ID=dcf7e05518a1] [FILTER_BEFORE] /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-18 08:00:01 --> [REQ_ID=dcf7e05518a1] [ROUTE] Controller=\App\Modules\Management\Controllers\ManagementAPIController Method=Run_CRON_Tasks
DEBUG - 2026-03-18 08:00:01 --> [REQ_ID=dcf7e05518a1] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-18 08:00:01 --> [REQ_ID=dcf7e05518a1] [REQUEST][END]
INFO - 2026-03-18 08:00:01 --> [REQ_ID=dcf7e05518a1] [PERF] Execution time=0.035884
DEBUG - 2026-03-18 08:01:22 --> [REQ_ID=29bed95f37c6] [REQUEST][START] HEAD /
DEBUG - 2026-03-18 08:01:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-18 08:01:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-18 08:01:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-18 08:01:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-18 08:01:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-18 08:06:22 --> [REQ_ID=1665cc91f89f] [REQUEST][START] HEAD /
DEBUG - 2026-03-18 08:06:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-18 08:06:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-18 08:06:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-18 08:06:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-18 08:06:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-18 08:11:22 --> [REQ_ID=47cbb9f2b683] [REQUEST][START] HEAD /
DEBUG - 2026-03-18 08:11:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-18 08:11:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-18 08:11:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-18 08:11:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-18 08:11:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-18 08:15:01 --> [REQ_ID=0c2645c5411a] [REQUEST][START] GET /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-18 08:15:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-18 08:15:01 --> [REQ_ID=0c2645c5411a] [FILTER_BEFORE] /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-18 08:15:01 --> [REQ_ID=0c2645c5411a] [ROUTE] Controller=\App\Modules\APIs\Controllers\AlertsAPIController Method=fetchEmailAlerts
DEBUG - 2026-03-18 08:15:01 --> [REQ_ID=0c2645c5411a] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-18 08:15:01 --> [REQ_ID=0c2645c5411a] [REQUEST][END]
INFO - 2026-03-18 08:15:01 --> [REQ_ID=0c2645c5411a] [PERF] Execution time=0.045894
DEBUG - 2026-03-18 08:16:22 --> [REQ_ID=d86dea5cdbb8] [REQUEST][START] HEAD /
DEBUG - 2026-03-18 08:16:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-18 08:16:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-18 08:16:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-18 08:16:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-18 08:16:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-18 08:21:22 --> [REQ_ID=56abaa81f730] [REQUEST][START] HEAD /
DEBUG - 2026-03-18 08:21:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-18 08:21:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-18 08:21:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-18 08:21:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-18 08:21:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-18 08:26:22 --> [REQ_ID=77bf21eb4372] [REQUEST][START] HEAD /
DEBUG - 2026-03-18 08:26:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-18 08:26:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-18 08:26:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-18 08:26:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-18 08:26:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-18 08:31:22 --> [REQ_ID=4a414888d997] [REQUEST][START] HEAD /
DEBUG - 2026-03-18 08:31:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-18 08:31:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-18 08:31:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-18 08:31:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-18 08:31:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-18 08:36:22 --> [REQ_ID=23ccdc22ac19] [REQUEST][START] HEAD /
DEBUG - 2026-03-18 08:36:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-18 08:36:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-18 08:36:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-18 08:36:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-18 08:36:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-18 08:41:22 --> [REQ_ID=ebd1fc54b19d] [REQUEST][START] HEAD /
DEBUG - 2026-03-18 08:41:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-18 08:41:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-18 08:41:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-18 08:41:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-18 08:41:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-18 08:46:22 --> [REQ_ID=aea21ba11198] [REQUEST][START] HEAD /
DEBUG - 2026-03-18 08:46:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-18 08:46:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-18 08:46:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-18 08:46:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-18 08:46:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-18 08:48:38 --> [REQ_ID=1a85554666f1] [REQUEST][START] GET /
DEBUG - 2026-03-18 08:48:38 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-18 08:48:38 --> [REQ_ID=1a85554666f1] [FILTER_BEFORE] /
DEBUG - 2026-03-18 08:48:38 --> [REQ_ID=1a85554666f1] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-18 08:48:38 --> [REQ_ID=1a85554666f1] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-18 08:48:38 --> [CSRF] token name=csrf_test_name hash=f360de181419e8cd3e7912b55c57f871
DEBUG - 2026-03-18 08:48:38 --> [REQ_ID=bbec97b99c29] [INIT] App\Controllers\Home::GET
INFO - 2026-03-18 08:48:38 --> [REQ_ID=bbec97b99c29] [MEMORY][controller-start] 6291456
INFO - 2026-03-18 08:48:38 --> [REQ_ID=bbec97b99c29] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-18 08:48:38 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-18 08:48:39 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-03-18 08:48:39 --> [REQ_ID=bbec97b99c29] [VIEW_RENDER] themes/public/home
INFO - 2026-03-18 08:48:39 --> [REQ_ID=bbec97b99c29] [MEMORY][commonData:start] 10485760
INFO - 2026-03-18 08:48:39 --> themesMemory usage: 10485760
DEBUG - 2026-03-18 08:48:39 --> [MetaService] slug= pageName=Home cacheHit= path=DB
DEBUG - 2026-03-18 08:48:39 --> [REQ_ID=1a85554666f1] [FILTER_AFTER]
DEBUG - 2026-03-18 08:48:39 --> [REQ_ID=1a85554666f1] [LIFECYCLE][END] status=200 duration_ms=913.88 memory_delta=4194304
INFO - 2026-03-18 08:48:39 --> [REQ_ID=bbec97b99c29] [PERF] Execution time=0.912163
DEBUG - 2026-03-18 08:48:39 --> [REQ_ID=1a85554666f1] [REQUEST][END]
INFO - 2026-03-18 08:48:39 --> [REQ_ID=1a85554666f1] [PERF] Execution time=0.952057
DEBUG - 2026-03-18 08:51:22 --> [REQ_ID=832f7010b5ae] [REQUEST][START] HEAD /
DEBUG - 2026-03-18 08:51:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-18 08:51:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-18 08:51:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-18 08:51:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-18 08:51:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-18 08:56:22 --> [REQ_ID=f4770fa6732e] [REQUEST][START] HEAD /
DEBUG - 2026-03-18 08:56:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-18 08:56:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-18 08:56:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-18 08:56:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-18 08:56:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-18 09:00:02 --> [REQ_ID=32f51a76a146] [REQUEST][START] GET /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-18 09:00:02 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-18 09:00:02 --> [REQ_ID=32f51a76a146] [FILTER_BEFORE] /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-18 09:00:02 --> [REQ_ID=32f51a76a146] [ROUTE] Controller=\App\Modules\Management\Controllers\ManagementAPIController Method=Run_CRON_Tasks
DEBUG - 2026-03-18 09:00:02 --> [REQ_ID=32f51a76a146] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-18 09:00:02 --> [REQ_ID=32f51a76a146] [REQUEST][END]
INFO - 2026-03-18 09:00:02 --> [REQ_ID=32f51a76a146] [PERF] Execution time=0.047150
DEBUG - 2026-03-18 09:01:22 --> [REQ_ID=fb2d01c31961] [REQUEST][START] HEAD /
DEBUG - 2026-03-18 09:01:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-18 09:01:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-18 09:01:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-18 09:01:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-18 09:01:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-18 09:06:22 --> [REQ_ID=dd50dc05d5a2] [REQUEST][START] HEAD /
DEBUG - 2026-03-18 09:06:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-18 09:06:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-18 09:06:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-18 09:06:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-18 09:06:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-18 09:10:47 --> [REQ_ID=b3b10a31f6d5] [REQUEST][START] GET /
DEBUG - 2026-03-18 09:10:47 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-18 09:10:47 --> [REQ_ID=b3b10a31f6d5] [FILTER_BEFORE] /
DEBUG - 2026-03-18 09:10:47 --> [REQ_ID=b3b10a31f6d5] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-18 09:10:47 --> [REQ_ID=b3b10a31f6d5] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-18 09:10:47 --> [CSRF] token name=csrf_test_name hash=684554c366923e2778333337ef977904
DEBUG - 2026-03-18 09:10:47 --> [REQ_ID=efd85b71db57] [INIT] App\Controllers\Home::GET
INFO - 2026-03-18 09:10:47 --> [REQ_ID=efd85b71db57] [MEMORY][controller-start] 6291456
INFO - 2026-03-18 09:10:47 --> [REQ_ID=efd85b71db57] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-18 09:10:47 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-18 09:10:48 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-03-18 09:10:48 --> [REQ_ID=efd85b71db57] [VIEW_RENDER] themes/public/home
INFO - 2026-03-18 09:10:48 --> [REQ_ID=efd85b71db57] [MEMORY][commonData:start] 10485760
INFO - 2026-03-18 09:10:48 --> themesMemory usage: 10485760
DEBUG - 2026-03-18 09:10:48 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-18 09:10:48 --> [REQ_ID=b3b10a31f6d5] [FILTER_AFTER]
DEBUG - 2026-03-18 09:10:48 --> [REQ_ID=b3b10a31f6d5] [LIFECYCLE][END] status=200 duration_ms=976.26 memory_delta=4194304
INFO - 2026-03-18 09:10:48 --> [REQ_ID=efd85b71db57] [PERF] Execution time=0.974368
DEBUG - 2026-03-18 09:10:48 --> [REQ_ID=b3b10a31f6d5] [REQUEST][END]
INFO - 2026-03-18 09:10:48 --> [REQ_ID=b3b10a31f6d5] [PERF] Execution time=1.014287
DEBUG - 2026-03-18 09:11:22 --> [REQ_ID=480e59821b0d] [REQUEST][START] HEAD /
DEBUG - 2026-03-18 09:11:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-18 09:11:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-18 09:11:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-18 09:11:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-18 09:11:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-18 09:15:01 --> [REQ_ID=5396d806a17e] [REQUEST][START] GET /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-18 09:15:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-18 09:15:01 --> [REQ_ID=5396d806a17e] [FILTER_BEFORE] /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-18 09:15:01 --> [REQ_ID=5396d806a17e] [ROUTE] Controller=\App\Modules\APIs\Controllers\AlertsAPIController Method=fetchEmailAlerts
DEBUG - 2026-03-18 09:15:01 --> [REQ_ID=5396d806a17e] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-18 09:15:01 --> [REQ_ID=5396d806a17e] [REQUEST][END]
INFO - 2026-03-18 09:15:01 --> [REQ_ID=5396d806a17e] [PERF] Execution time=0.050005
DEBUG - 2026-03-18 09:16:22 --> [REQ_ID=e89b2fc76da4] [REQUEST][START] HEAD /
DEBUG - 2026-03-18 09:16:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-18 09:16:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-18 09:16:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-18 09:16:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-18 09:16:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-18 09:21:22 --> [REQ_ID=103bbafb5a99] [REQUEST][START] HEAD /
DEBUG - 2026-03-18 09:21:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-18 09:21:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-18 09:21:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-18 09:21:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-18 09:21:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-18 09:22:35 --> [REQ_ID=72fb5d0f60c3] [REQUEST][START] GET /
DEBUG - 2026-03-18 09:22:35 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-18 09:22:35 --> [REQ_ID=72fb5d0f60c3] [FILTER_BEFORE] /
DEBUG - 2026-03-18 09:22:35 --> [REQ_ID=72fb5d0f60c3] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-18 09:22:35 --> [REQ_ID=72fb5d0f60c3] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-18 09:22:35 --> [CSRF] token name=csrf_test_name hash=af6ef66d942b950adf5ae4a317d8211d
DEBUG - 2026-03-18 09:22:35 --> [REQ_ID=e9ff20155886] [INIT] App\Controllers\Home::GET
INFO - 2026-03-18 09:22:35 --> [REQ_ID=e9ff20155886] [MEMORY][controller-start] 6291456
INFO - 2026-03-18 09:22:35 --> [REQ_ID=e9ff20155886] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-18 09:22:35 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-18 09:22:35 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
DEBUG - 2026-03-18 09:22:35 --> [REQ_ID=e9ff20155886] [VIEW_RENDER] themes/public/home
INFO - 2026-03-18 09:22:35 --> [REQ_ID=e9ff20155886] [MEMORY][commonData:start] 10485760
INFO - 2026-03-18 09:22:36 --> themesMemory usage: 10485760
DEBUG - 2026-03-18 09:22:36 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-18 09:22:36 --> [REQ_ID=72fb5d0f60c3] [FILTER_AFTER]
DEBUG - 2026-03-18 09:22:36 --> [REQ_ID=72fb5d0f60c3] [LIFECYCLE][END] status=200 duration_ms=921.10 memory_delta=4194304
INFO - 2026-03-18 09:22:36 --> [REQ_ID=e9ff20155886] [PERF] Execution time=0.918946
DEBUG - 2026-03-18 09:22:36 --> [REQ_ID=72fb5d0f60c3] [REQUEST][END]
INFO - 2026-03-18 09:22:36 --> [REQ_ID=72fb5d0f60c3] [PERF] Execution time=0.959291
DEBUG - 2026-03-18 09:26:22 --> [REQ_ID=5c599ded8d04] [REQUEST][START] HEAD /
DEBUG - 2026-03-18 09:26:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-18 09:26:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-18 09:26:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-18 09:26:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-18 09:26:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-18 09:31:22 --> [REQ_ID=aabba28b958d] [REQUEST][START] HEAD /
DEBUG - 2026-03-18 09:31:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-18 09:31:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-18 09:31:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-18 09:31:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-18 09:31:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-18 09:36:22 --> [REQ_ID=a3349c53b8cb] [REQUEST][START] HEAD /
DEBUG - 2026-03-18 09:36:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-18 09:36:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-18 09:36:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-18 09:36:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-18 09:36:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-18 09:41:22 --> [REQ_ID=f199bf8edf13] [REQUEST][START] HEAD /
DEBUG - 2026-03-18 09:41:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-18 09:41:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-18 09:41:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-18 09:41:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-18 09:41:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-18 09:46:22 --> [REQ_ID=2c58633867d6] [REQUEST][START] HEAD /
DEBUG - 2026-03-18 09:46:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-18 09:46:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-18 09:46:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-18 09:46:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-18 09:46:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-18 09:51:22 --> [REQ_ID=a428aceee6d7] [REQUEST][START] HEAD /
DEBUG - 2026-03-18 09:51:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-18 09:51:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-18 09:51:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-18 09:51:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-18 09:51:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-18 09:56:22 --> [REQ_ID=448a0204bf37] [REQUEST][START] HEAD /
DEBUG - 2026-03-18 09:56:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-18 09:56:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-18 09:56:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-18 09:56:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-18 09:56:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-18 09:59:35 --> [REQ_ID=3856907b6b23] [REQUEST][START] GET /index.php/How-It-Works/Registering-An-Account
DEBUG - 2026-03-18 09:59:35 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-18 09:59:35 --> [REQ_ID=3856907b6b23] [REQUEST][END]
INFO - 2026-03-18 09:59:35 --> [REQ_ID=3856907b6b23] [PERF] Execution time=0.041348
DEBUG - 2026-03-18 10:00:02 --> [REQ_ID=68bb78dafc62] [REQUEST][START] GET /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-18 10:00:02 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-18 10:00:02 --> [REQ_ID=68bb78dafc62] [FILTER_BEFORE] /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-18 10:00:02 --> [REQ_ID=68bb78dafc62] [ROUTE] Controller=\App\Modules\Management\Controllers\ManagementAPIController Method=Run_CRON_Tasks
DEBUG - 2026-03-18 10:00:02 --> [REQ_ID=68bb78dafc62] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-18 10:00:02 --> [REQ_ID=68bb78dafc62] [REQUEST][END]
INFO - 2026-03-18 10:00:02 --> [REQ_ID=68bb78dafc62] [PERF] Execution time=0.014683
DEBUG - 2026-03-18 10:01:22 --> [REQ_ID=ab1e70d68ecd] [REQUEST][START] HEAD /
DEBUG - 2026-03-18 10:01:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-18 10:01:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-18 10:01:23 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-18 10:01:23 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-18 10:01:23 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-18 10:06:22 --> [REQ_ID=fafcae4ca624] [REQUEST][START] HEAD /
DEBUG - 2026-03-18 10:06:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-18 10:06:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-18 10:06:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-18 10:06:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-18 10:06:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-18 10:11:22 --> [REQ_ID=906d6a67a1dd] [REQUEST][START] HEAD /
DEBUG - 2026-03-18 10:11:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-18 10:11:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-18 10:11:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-18 10:11:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-18 10:11:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-18 10:15:01 --> [REQ_ID=200193c144ea] [REQUEST][START] GET /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-18 10:15:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-18 10:15:01 --> [REQ_ID=200193c144ea] [FILTER_BEFORE] /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-18 10:15:01 --> [REQ_ID=200193c144ea] [ROUTE] Controller=\App\Modules\APIs\Controllers\AlertsAPIController Method=fetchEmailAlerts
DEBUG - 2026-03-18 10:15:01 --> [REQ_ID=200193c144ea] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-18 10:15:01 --> [REQ_ID=200193c144ea] [REQUEST][END]
INFO - 2026-03-18 10:15:01 --> [REQ_ID=200193c144ea] [PERF] Execution time=0.046575
DEBUG - 2026-03-18 10:16:22 --> [REQ_ID=477993469aa9] [REQUEST][START] HEAD /
DEBUG - 2026-03-18 10:16:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-18 10:16:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-18 10:16:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-18 10:16:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-18 10:16:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-18 10:20:14 --> [REQ_ID=77e1d1d707b3] [REQUEST][START] GET /
DEBUG - 2026-03-18 10:20:14 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-18 10:20:14 --> [REQ_ID=77e1d1d707b3] [FILTER_BEFORE] /
DEBUG - 2026-03-18 10:20:14 --> [REQ_ID=77e1d1d707b3] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-18 10:20:14 --> [REQ_ID=77e1d1d707b3] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-18 10:20:14 --> [CSRF] token name=csrf_test_name hash=4616ee8961bd996a225794dc9a6a051a
DEBUG - 2026-03-18 10:20:14 --> [REQ_ID=a0ccda4c30bc] [INIT] App\Controllers\Home::GET
INFO - 2026-03-18 10:20:14 --> [REQ_ID=a0ccda4c30bc] [MEMORY][controller-start] 6291456
INFO - 2026-03-18 10:20:14 --> [REQ_ID=a0ccda4c30bc] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-18 10:20:14 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-18 10:20:14 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-03-18 10:20:14 --> [REQ_ID=a0ccda4c30bc] [VIEW_RENDER] themes/public/home
INFO - 2026-03-18 10:20:14 --> [REQ_ID=a0ccda4c30bc] [MEMORY][commonData:start] 10485760
INFO - 2026-03-18 10:20:14 --> themesMemory usage: 10485760
DEBUG - 2026-03-18 10:20:14 --> [MetaService] slug= pageName=Home cacheHit= path=DB
DEBUG - 2026-03-18 10:20:14 --> [REQ_ID=77e1d1d707b3] [FILTER_AFTER]
DEBUG - 2026-03-18 10:20:14 --> [REQ_ID=77e1d1d707b3] [LIFECYCLE][END] status=200 duration_ms=682.58 memory_delta=4194304
INFO - 2026-03-18 10:20:14 --> [REQ_ID=a0ccda4c30bc] [PERF] Execution time=0.680732
DEBUG - 2026-03-18 10:20:14 --> [REQ_ID=77e1d1d707b3] [REQUEST][END]
INFO - 2026-03-18 10:20:14 --> [REQ_ID=77e1d1d707b3] [PERF] Execution time=0.722748
DEBUG - 2026-03-18 10:21:22 --> [REQ_ID=b40fe139275b] [REQUEST][START] HEAD /
DEBUG - 2026-03-18 10:21:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-18 10:21:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-18 10:21:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-18 10:21:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-18 10:21:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-18 10:26:22 --> [REQ_ID=e95edd30631c] [REQUEST][START] HEAD /
DEBUG - 2026-03-18 10:26:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-18 10:26:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-18 10:26:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-18 10:26:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-18 10:26:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-18 10:26:24 --> [REQ_ID=a5a47e6c4ae0] [REQUEST][START] GET /index.php/Knowledgebase/MyMI-Partnerships
DEBUG - 2026-03-18 10:26:24 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-18 10:26:24 --> [REQ_ID=a5a47e6c4ae0] [REQUEST][END]
INFO - 2026-03-18 10:26:24 --> [REQ_ID=a5a47e6c4ae0] [PERF] Execution time=0.021163
DEBUG - 2026-03-18 10:31:22 --> [REQ_ID=369785b47766] [REQUEST][START] HEAD /
DEBUG - 2026-03-18 10:31:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-18 10:31:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-18 10:31:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-18 10:31:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-18 10:31:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-18 10:36:22 --> [REQ_ID=199defac321b] [REQUEST][START] HEAD /
DEBUG - 2026-03-18 10:36:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-18 10:36:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-18 10:36:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-18 10:36:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-18 10:36:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-18 10:41:22 --> [REQ_ID=96ff387ab038] [REQUEST][START] HEAD /
DEBUG - 2026-03-18 10:41:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-18 10:41:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-18 10:41:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-18 10:41:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-18 10:41:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-18 10:46:22 --> [REQ_ID=eda3a5ecfd30] [REQUEST][START] HEAD /
DEBUG - 2026-03-18 10:46:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-18 10:46:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-18 10:46:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-18 10:46:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-18 10:46:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-18 10:51:22 --> [REQ_ID=1d1eb96161f8] [REQUEST][START] HEAD /
DEBUG - 2026-03-18 10:51:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-18 10:51:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-18 10:51:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-18 10:51:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-18 10:51:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-18 10:56:22 --> [REQ_ID=b163d92b1ace] [REQUEST][START] HEAD /
DEBUG - 2026-03-18 10:56:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-18 10:56:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-18 10:56:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-18 10:56:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-18 10:56:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-18 10:57:56 --> [REQ_ID=4e6eab00824d] [REQUEST][START] GET /
DEBUG - 2026-03-18 10:57:56 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-18 10:57:56 --> [REQ_ID=4e6eab00824d] [FILTER_BEFORE] /
DEBUG - 2026-03-18 10:57:56 --> [REQ_ID=4e6eab00824d] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-18 10:57:56 --> [REQ_ID=4e6eab00824d] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-18 10:57:56 --> [CSRF] token name=csrf_test_name hash=b06a397f69e817791493e9e0a191157d
DEBUG - 2026-03-18 10:57:56 --> [REQ_ID=ea47ee91ee8d] [INIT] App\Controllers\Home::GET
INFO - 2026-03-18 10:57:56 --> [REQ_ID=ea47ee91ee8d] [MEMORY][controller-start] 6291456
INFO - 2026-03-18 10:57:56 --> [REQ_ID=ea47ee91ee8d] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-18 10:57:56 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-18 10:57:57 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-03-18 10:57:57 --> [REQ_ID=ea47ee91ee8d] [VIEW_RENDER] themes/public/home
INFO - 2026-03-18 10:57:57 --> [REQ_ID=ea47ee91ee8d] [MEMORY][commonData:start] 10485760
INFO - 2026-03-18 10:57:57 --> themesMemory usage: 10485760
DEBUG - 2026-03-18 10:57:57 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-18 10:57:57 --> [REQ_ID=4e6eab00824d] [FILTER_AFTER]
DEBUG - 2026-03-18 10:57:57 --> [REQ_ID=4e6eab00824d] [LIFECYCLE][END] status=200 duration_ms=1,047.48 memory_delta=4194304
INFO - 2026-03-18 10:57:57 --> [REQ_ID=ea47ee91ee8d] [PERF] Execution time=1.044790
DEBUG - 2026-03-18 10:57:57 --> [REQ_ID=4e6eab00824d] [REQUEST][END]
INFO - 2026-03-18 10:57:57 --> [REQ_ID=4e6eab00824d] [PERF] Execution time=1.091243
DEBUG - 2026-03-18 11:00:02 --> [REQ_ID=fcea022204f0] [REQUEST][START] GET /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-18 11:00:02 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-18 11:00:02 --> [REQ_ID=fcea022204f0] [FILTER_BEFORE] /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-18 11:00:02 --> [REQ_ID=fcea022204f0] [ROUTE] Controller=\App\Modules\Management\Controllers\ManagementAPIController Method=Run_CRON_Tasks
DEBUG - 2026-03-18 11:00:02 --> [REQ_ID=fcea022204f0] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-18 11:00:02 --> [REQ_ID=fcea022204f0] [REQUEST][END]
INFO - 2026-03-18 11:00:02 --> [REQ_ID=fcea022204f0] [PERF] Execution time=0.028971
DEBUG - 2026-03-18 11:01:22 --> [REQ_ID=c7f622dfbe31] [REQUEST][START] HEAD /
DEBUG - 2026-03-18 11:01:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-18 11:01:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-18 11:01:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-18 11:01:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-18 11:01:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-18 11:06:22 --> [REQ_ID=1649dcee75a3] [REQUEST][START] HEAD /
DEBUG - 2026-03-18 11:06:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-18 11:06:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-18 11:06:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-18 11:06:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-18 11:06:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-18 11:11:22 --> [REQ_ID=fd93cb28cc33] [REQUEST][START] HEAD /
DEBUG - 2026-03-18 11:11:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-18 11:11:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-18 11:11:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-18 11:11:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-18 11:11:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-18 11:13:32 --> [REQ_ID=bb6db4aff849] [REQUEST][START] POST /
DEBUG - 2026-03-18 11:13:32 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-18 11:13:32 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: POST, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-18 11:13:32 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-18 11:13:32 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-18 11:13:32 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: https://www.mymiwallet.com/
DEBUG - 2026-03-18 11:15:01 --> [REQ_ID=966e6fe060ba] [REQUEST][START] GET /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-18 11:15:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-18 11:15:01 --> [REQ_ID=966e6fe060ba] [FILTER_BEFORE] /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-18 11:15:01 --> [REQ_ID=966e6fe060ba] [ROUTE] Controller=\App\Modules\APIs\Controllers\AlertsAPIController Method=fetchEmailAlerts
DEBUG - 2026-03-18 11:15:01 --> [REQ_ID=966e6fe060ba] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-18 11:15:01 --> [REQ_ID=966e6fe060ba] [REQUEST][END]
INFO - 2026-03-18 11:15:01 --> [REQ_ID=966e6fe060ba] [PERF] Execution time=0.047606
DEBUG - 2026-03-18 11:16:22 --> [REQ_ID=9aa02a34edd2] [REQUEST][START] HEAD /
DEBUG - 2026-03-18 11:16:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-18 11:16:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-18 11:16:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-18 11:16:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-18 11:16:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-18 11:21:22 --> [REQ_ID=ae3d64981b9b] [REQUEST][START] HEAD /
DEBUG - 2026-03-18 11:21:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-18 11:21:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-18 11:21:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-18 11:21:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-18 11:21:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-18 11:26:22 --> [REQ_ID=6b00414fe620] [REQUEST][START] HEAD /
DEBUG - 2026-03-18 11:26:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-18 11:26:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-18 11:26:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-18 11:26:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-18 11:26:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-18 11:31:22 --> [REQ_ID=ebb27d7b0f99] [REQUEST][START] HEAD /
DEBUG - 2026-03-18 11:31:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-18 11:31:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-18 11:31:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-18 11:31:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-18 11:31:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-18 11:36:22 --> [REQ_ID=feeddbe77227] [REQUEST][START] HEAD /
DEBUG - 2026-03-18 11:36:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-18 11:36:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-18 11:36:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-18 11:36:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-18 11:36:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-18 11:41:22 --> [REQ_ID=60878d1bf3e9] [REQUEST][START] HEAD /
DEBUG - 2026-03-18 11:41:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-18 11:41:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-18 11:41:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-18 11:41:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-18 11:41:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-18 11:46:22 --> [REQ_ID=88de5c603fae] [REQUEST][START] HEAD /
DEBUG - 2026-03-18 11:46:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-18 11:46:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-18 11:46:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-18 11:46:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-18 11:46:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-18 11:51:22 --> [REQ_ID=435db6c9d1f8] [REQUEST][START] HEAD /
DEBUG - 2026-03-18 11:51:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-18 11:51:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-18 11:51:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-18 11:51:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-18 11:51:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-18 11:56:22 --> [REQ_ID=891ebb64bc54] [REQUEST][START] HEAD /
DEBUG - 2026-03-18 11:56:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-18 11:56:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-18 11:56:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-18 11:56:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-18 11:56:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-18 12:00:01 --> [REQ_ID=123821a69d87] [REQUEST][START] GET /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-18 12:00:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-18 12:00:01 --> [REQ_ID=123821a69d87] [FILTER_BEFORE] /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-18 12:00:01 --> [REQ_ID=123821a69d87] [ROUTE] Controller=\App\Modules\Management\Controllers\ManagementAPIController Method=Run_CRON_Tasks
DEBUG - 2026-03-18 12:00:01 --> [REQ_ID=123821a69d87] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-18 12:00:01 --> [REQ_ID=123821a69d87] [REQUEST][END]
INFO - 2026-03-18 12:00:01 --> [REQ_ID=123821a69d87] [PERF] Execution time=0.036771
DEBUG - 2026-03-18 12:01:22 --> [REQ_ID=f33888dc1f05] [REQUEST][START] HEAD /
DEBUG - 2026-03-18 12:01:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-18 12:01:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-18 12:01:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-18 12:01:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-18 12:01:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-18 12:06:22 --> [REQ_ID=c0e9ab195760] [REQUEST][START] HEAD /
DEBUG - 2026-03-18 12:06:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-18 12:06:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-18 12:06:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-18 12:06:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-18 12:06:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-18 12:10:16 --> [REQ_ID=00630dc63ad3] [REQUEST][START] GET /index.php/Dashboard
DEBUG - 2026-03-18 12:10:16 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-18 12:10:16 --> [REQ_ID=00630dc63ad3] [FILTER_BEFORE] /index.php/Dashboard
DEBUG - 2026-03-18 12:10:16 --> [REQ_ID=00630dc63ad3] [ROUTE] Controller=\App\Modules\User\Controllers\DashboardController Method=index
DEBUG - 2026-03-18 12:10:16 --> [REQ_ID=00630dc63ad3] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Dashboard
DEBUG - 2026-03-18 12:10:16 --> [CSRF] token name=csrf_test_name hash=3ec480f5b6b79d935e0de283b3b0acdb
DEBUG - 2026-03-18 12:10:16 --> [REQ_ID=537e88b23a04] [INIT] App\Modules\User\Controllers\DashboardController::GET
INFO - 2026-03-18 12:10:16 --> [REQ_ID=537e88b23a04] [MEMORY][controller-start] 6291456
DEBUG - 2026-03-18 12:10:16 --> [REQ_ID=537e88b23a04] [METHOD_ENTRY] index
DEBUG - 2026-03-18 12:10:16 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-18 12:10:16 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-18 12:10:16 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-18 12:10:17 --> MyMIMarketing: Pscrape library not installed; Google search scraping will use fallback.
DEBUG - 2026-03-18 12:10:17 --> [DASHBOARD] Enter
DEBUG - 2026-03-18 12:10:17 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-18 12:10:17 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-18 12:10:17 --> [SERVICE] App\Services\BudgetService ::getUserBudget
DEBUG - 2026-03-18 12:10:17 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":2,"deleted":0}
DEBUG - 2026-03-18 12:10:17 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-18 12:10:17 --> [MODEL_WHERE] App\Models\BudgetModel KEY="created_by"
DEBUG - 2026-03-18 12:10:17 --> [MODEL_WHERE] App\Models\BudgetModel KEY="account_type"
DEBUG - 2026-03-18 12:10:17 --> [MODEL_WHERE] App\Models\BudgetModel KEY="designated_date >="
DEBUG - 2026-03-18 12:10:17 --> [MODEL_WHERE] App\Models\BudgetModel KEY="designated_date <="
DEBUG - 2026-03-18 12:10:17 --> [MODEL_WHERE] App\Models\BudgetModel KEY="year"
DEBUG - 2026-03-18 12:10:17 --> [MODEL_WHERE] App\Models\BudgetModel KEY="month <="
DEBUG - 2026-03-18 12:10:17 --> [MODEL_WHERE] App\Models\BudgetModel KEY="day <="
DEBUG - 2026-03-18 12:10:17 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":2,"account_type":"Income","month":"03","year":"2026"}
DEBUG - 2026-03-18 12:10:17 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-03-18 12:10:17 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":2,"account_type":"Income","month":"02","year":"2026"}
DEBUG - 2026-03-18 12:10:17 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-03-18 12:10:17 --> [MODEL_WHERE] App\Models\BudgetModel KEY="created_by"
DEBUG - 2026-03-18 12:10:17 --> [MODEL_WHERE] App\Models\BudgetModel KEY="account_type"
DEBUG - 2026-03-18 12:10:17 --> [MODEL_WHERE] App\Models\BudgetModel KEY="designated_date >="
DEBUG - 2026-03-18 12:10:17 --> [MODEL_WHERE] App\Models\BudgetModel KEY="designated_date <="
DEBUG - 2026-03-18 12:10:17 --> [MODEL_WHERE] App\Models\BudgetModel KEY="year"
DEBUG - 2026-03-18 12:10:17 --> [MODEL_WHERE] App\Models\BudgetModel KEY="month <="
DEBUG - 2026-03-18 12:10:17 --> [MODEL_WHERE] App\Models\BudgetModel KEY="day <="
DEBUG - 2026-03-18 12:10:17 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":2,"account_type":"Expense","month":"03","year":"2026"}
DEBUG - 2026-03-18 12:10:17 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-03-18 12:10:17 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":2,"account_type":"Expense","month":"02","year":"2026"}
DEBUG - 2026-03-18 12:10:17 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-03-18 12:10:17 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"status":1,"created_by":2,"deleted":0}
DEBUG - 2026-03-18 12:10:17 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"status":1,"paid":0,"created_by":2,"deleted":0}
DEBUG - 2026-03-18 12:10:17 --> Skipping placeholder symbol for row 46402
DEBUG - 2026-03-18 12:10:17 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"status":1,"created_by":2,"deleted":0}
ERROR - 2026-03-18 12:10:17 --> DashboardController::index failed to load executive summary: Call to undefined method CodeIgniter\Cache\Handlers\FileHandler::set()
DEBUG - 2026-03-18 12:10:17 --> [CACHE_MISS] mymiwallet_development_squeeze_high-risk_global_global_1f86633dd
ERROR - 2026-03-18 12:10:17 --> Unknown column 'score_total' in 'where clause'
in SYSTEMPATH/Database/MySQLi/Connection.php on line 300.
 1 SYSTEMPATH/Database/MySQLi/Connection.php(300): mysqli->query('SELECT COUNT(*) AS `numrows`
FROM `bf_squeeze_scorecards`
WHERE `score_total` >= 80
AND `as_of_datetime` >= \'2026-03-17 12:10:17\'', 0)
 2 SYSTEMPATH/Database/BaseConnection.php(769): CodeIgniter\Database\MySQLi\Connection->execute('SELECT COUNT(*) AS `numrows`
FROM `bf_squeeze_scorecards`
WHERE `score_total` >= 80
AND `as_of_datetime` >= \'2026-03-17 12:10:17\'')
 3 SYSTEMPATH/Database/BaseConnection.php(686): CodeIgniter\Database\BaseConnection->simpleQuery('SELECT COUNT(*) AS `numrows`
FROM `bf_squeeze_scorecards`
WHERE `score_total` >= 80
AND `as_of_datetime` >= \'2026-03-17 12:10:17\'')
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
DEBUG - 2026-03-18 12:10:17 --> MyMIInvestments::getSqueezeHighRiskCount failed: Unknown column 'score_total' in 'where clause'
DEBUG - 2026-03-18 12:10:17 --> 📰 Daily dashboard news window 2026-03-18 00:00:00 -> 2026-03-18 23:59:59 returned 0 rows
DEBUG - 2026-03-18 12:10:17 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-18 12:10:17 --> [SETUP] Status computed
DEBUG - 2026-03-18 12:10:17 --> [REQ_ID=537e88b23a04] [VIEW_RENDER] User/Dashboard/index
INFO - 2026-03-18 12:10:17 --> [REQ_ID=537e88b23a04] [MEMORY][commonData:start] 8388608
DEBUG - 2026-03-18 12:10:17 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-18 12:10:17 --> [MODEL_WHERE] App\Models\BudgetModel KEY="created_by"
DEBUG - 2026-03-18 12:10:17 --> [MODEL_WHERE] App\Models\BudgetModel KEY="account_type"
DEBUG - 2026-03-18 12:10:17 --> [MODEL_WHERE] App\Models\BudgetModel KEY="designated_date >="
DEBUG - 2026-03-18 12:10:17 --> [MODEL_WHERE] App\Models\BudgetModel KEY="designated_date <="
DEBUG - 2026-03-18 12:10:17 --> [MODEL_WHERE] App\Models\BudgetModel KEY="year"
DEBUG - 2026-03-18 12:10:17 --> [MODEL_WHERE] App\Models\BudgetModel KEY="month <="
DEBUG - 2026-03-18 12:10:17 --> [MODEL_WHERE] App\Models\BudgetModel KEY="day <="
DEBUG - 2026-03-18 12:10:17 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":2,"account_type":"Income","month":"03","year":"2026"}
DEBUG - 2026-03-18 12:10:17 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-03-18 12:10:17 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":2,"account_type":"Income","month":"02","year":"2026"}
DEBUG - 2026-03-18 12:10:17 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-03-18 12:10:17 --> [MODEL_WHERE] App\Models\BudgetModel KEY="created_by"
DEBUG - 2026-03-18 12:10:17 --> [MODEL_WHERE] App\Models\BudgetModel KEY="account_type"
DEBUG - 2026-03-18 12:10:17 --> [MODEL_WHERE] App\Models\BudgetModel KEY="designated_date >="
DEBUG - 2026-03-18 12:10:17 --> [MODEL_WHERE] App\Models\BudgetModel KEY="designated_date <="
DEBUG - 2026-03-18 12:10:17 --> [MODEL_WHERE] App\Models\BudgetModel KEY="year"
DEBUG - 2026-03-18 12:10:17 --> [MODEL_WHERE] App\Models\BudgetModel KEY="month <="
DEBUG - 2026-03-18 12:10:17 --> [MODEL_WHERE] App\Models\BudgetModel KEY="day <="
DEBUG - 2026-03-18 12:10:17 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":2,"account_type":"Expense","month":"03","year":"2026"}
DEBUG - 2026-03-18 12:10:17 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-03-18 12:10:17 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":2,"account_type":"Expense","month":"02","year":"2026"}
DEBUG - 2026-03-18 12:10:17 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-03-18 12:10:17 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"status":1,"created_by":2,"deleted":0}
DEBUG - 2026-03-18 12:10:17 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"status":1,"paid":0,"created_by":2,"deleted":0}
DEBUG - 2026-03-18 12:10:17 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-18 12:10:17 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"status":1,"created_by":2,"deleted":0}
DEBUG - 2026-03-18 12:10:17 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"status":1,"paid":0,"created_by":2,"deleted":0}
DEBUG - 2026-03-18 12:10:17 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":2,"account_type":"Income","status":1,"month":"03","year":"2026"}
DEBUG - 2026-03-18 12:10:17 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-03-18 12:10:17 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":2,"account_type":"Expense","status":1,"month":"03","year":"2026"}
DEBUG - 2026-03-18 12:10:17 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-03-18 12:10:17 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":2,"account_type":"Investment","month":"03","year":"2026","status":1}
DEBUG - 2026-03-18 12:10:17 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-03-18 12:10:17 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":2,"account_type":"Income","status":1,"month":"02"}
DEBUG - 2026-03-18 12:10:17 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-03-18 12:10:17 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":2,"account_type":"Expense","status":1,"month":"02"}
DEBUG - 2026-03-18 12:10:17 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-03-18 12:10:17 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":2,"account_type":"Investment","month":"02","year":"2026","status":1}
DEBUG - 2026-03-18 12:10:17 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-03-18 12:10:17 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":2,"account_type":"Income","status":1,"month":"04"}
DEBUG - 2026-03-18 12:10:17 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-03-18 12:10:17 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":2,"account_type":"Expense","status":1,"month":"04"}
DEBUG - 2026-03-18 12:10:17 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-03-18 12:10:17 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":2,"account_type":"Investment","month":"04","year":"2026","status":1}
DEBUG - 2026-03-18 12:10:17 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-03-18 12:10:17 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":2,"account_type":"Income","status":1,"year":"2026"}
DEBUG - 2026-03-18 12:10:17 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-03-18 12:10:17 --> [MODEL_WHERE] App\Models\BudgetModel KEY="created_by"
DEBUG - 2026-03-18 12:10:17 --> [MODEL_WHERE] App\Models\BudgetModel KEY="account_type"
DEBUG - 2026-03-18 12:10:17 --> [MODEL_WHERE] App\Models\BudgetModel KEY="status"
DEBUG - 2026-03-18 12:10:17 --> [MODEL_WHERE] App\Models\BudgetModel KEY="year"
DEBUG - 2026-03-18 12:10:17 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-03-18 12:10:17 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":2,"account_type":"Investment","status":1}
DEBUG - 2026-03-18 12:10:17 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-03-18 12:10:17 --> [MODEL_WHERE] App\Models\BudgetModel KEY="created_by"
DEBUG - 2026-03-18 12:10:17 --> [MODEL_WHERE] App\Models\BudgetModel KEY="account_type"
DEBUG - 2026-03-18 12:10:17 --> [MODEL_WHERE] App\Models\BudgetModel KEY="status"
DEBUG - 2026-03-18 12:10:17 --> [MODEL_WHERE] App\Models\BudgetModel KEY="designated_date >="
DEBUG - 2026-03-18 12:10:17 --> [MODEL_WHERE] App\Models\BudgetModel KEY="designated_date <="
DEBUG - 2026-03-18 12:10:17 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-03-18 12:10:17 --> [MODEL_WHERE] App\Models\BudgetModel KEY="created_by"
DEBUG - 2026-03-18 12:10:17 --> [MODEL_WHERE] App\Models\BudgetModel KEY="account_type"
DEBUG - 2026-03-18 12:10:17 --> [MODEL_WHERE] App\Models\BudgetModel KEY="status"
DEBUG - 2026-03-18 12:10:17 --> [MODEL_WHERE] App\Models\BudgetModel KEY="designated_date >="
DEBUG - 2026-03-18 12:10:17 --> [MODEL_WHERE] App\Models\BudgetModel KEY="designated_date <="
DEBUG - 2026-03-18 12:10:17 --> [MODEL_FIRST] App\Models\BudgetModel
INFO - 2026-03-18 12:10:17 --> DashboardController L72 - $checkingSummary: 8784.01
DEBUG - 2026-03-18 12:10:17 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-18 12:10:17 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-18 12:10:17 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-18 12:10:17 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-18 12:10:17 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-18 12:10:17 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-18 12:10:17 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-18 12:10:17 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-18 12:10:17 --> [SERVICE] App\Services\BudgetService ::getUserBudget
DEBUG - 2026-03-18 12:10:17 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":2,"deleted":0}
DEBUG - 2026-03-18 12:10:17 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-18 12:10:17 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"status":1,"created_by":2,"deleted":0}
DEBUG - 2026-03-18 12:10:17 --> [MODEL_WHERE] App\Models\BudgetModel KEY="created_by"
DEBUG - 2026-03-18 12:10:17 --> [MODEL_WHERE] App\Models\BudgetModel KEY="account_type"
DEBUG - 2026-03-18 12:10:17 --> [MODEL_WHERE] App\Models\BudgetModel KEY="designated_date >="
DEBUG - 2026-03-18 12:10:17 --> [MODEL_WHERE] App\Models\BudgetModel KEY="designated_date <="
DEBUG - 2026-03-18 12:10:17 --> [MODEL_WHERE] App\Models\BudgetModel KEY="year"
DEBUG - 2026-03-18 12:10:17 --> [MODEL_WHERE] App\Models\BudgetModel KEY="month <="
DEBUG - 2026-03-18 12:10:17 --> [MODEL_WHERE] App\Models\BudgetModel KEY="day <="
DEBUG - 2026-03-18 12:10:17 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":2,"account_type":"Income","month":"03","year":"2026"}
DEBUG - 2026-03-18 12:10:17 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-03-18 12:10:17 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":2,"account_type":"Income","month":"02","year":"2026"}
DEBUG - 2026-03-18 12:10:17 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-03-18 12:10:17 --> [MODEL_WHERE] App\Models\BudgetModel KEY="created_by"
DEBUG - 2026-03-18 12:10:17 --> [MODEL_WHERE] App\Models\BudgetModel KEY="account_type"
DEBUG - 2026-03-18 12:10:17 --> [MODEL_WHERE] App\Models\BudgetModel KEY="designated_date >="
DEBUG - 2026-03-18 12:10:17 --> [MODEL_WHERE] App\Models\BudgetModel KEY="designated_date <="
DEBUG - 2026-03-18 12:10:17 --> [MODEL_WHERE] App\Models\BudgetModel KEY="year"
DEBUG - 2026-03-18 12:10:17 --> [MODEL_WHERE] App\Models\BudgetModel KEY="month <="
DEBUG - 2026-03-18 12:10:17 --> [MODEL_WHERE] App\Models\BudgetModel KEY="day <="
DEBUG - 2026-03-18 12:10:17 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":2,"account_type":"Expense","month":"03","year":"2026"}
DEBUG - 2026-03-18 12:10:17 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-03-18 12:10:17 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":2,"account_type":"Expense","month":"02","year":"2026"}
DEBUG - 2026-03-18 12:10:17 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-03-18 12:10:17 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"status":1,"created_by":2,"deleted":0}
DEBUG - 2026-03-18 12:10:17 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"status":1,"paid":0,"created_by":2,"deleted":0}
INFO - 2026-03-18 12:10:17 --> getSolanaData: invalid address param
INFO - 2026-03-18 12:10:17 --> themesMemory usage: 10485760
DEBUG - 2026-03-18 12:10:17 --> [REQ_ID=00630dc63ad3] [FILTER_AFTER]
DEBUG - 2026-03-18 12:10:17 --> [REQ_ID=00630dc63ad3] [LIFECYCLE][END] status=200 duration_ms=1,031.99 memory_delta=4194304
INFO - 2026-03-18 12:10:17 --> [REQ_ID=537e88b23a04] [PERF] Execution time=0.918341
DEBUG - 2026-03-18 12:10:17 --> [REQ_ID=00630dc63ad3] [REQUEST][END]
INFO - 2026-03-18 12:10:17 --> [REQ_ID=00630dc63ad3] [PERF] Execution time=1.075751
DEBUG - 2026-03-18 12:11:22 --> [REQ_ID=5ac4320f6330] [REQUEST][START] HEAD /
DEBUG - 2026-03-18 12:11:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-18 12:11:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-18 12:11:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-18 12:11:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-18 12:11:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-18 12:12:18 --> [REQ_ID=61d3728f0ae9] [REQUEST][START] GET /index.php/Discord/register
DEBUG - 2026-03-18 12:12:18 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-18 12:12:18 --> [REQ_ID=61d3728f0ae9] [FILTER_BEFORE] /index.php/Discord/register
DEBUG - 2026-03-18 12:12:18 --> [REQ_ID=61d3728f0ae9] [ROUTE] Controller=\App\Controllers\AuthController Method=register
DEBUG - 2026-03-18 12:12:18 --> [REQ_ID=61d3728f0ae9] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Discord/register
DEBUG - 2026-03-18 12:12:18 --> [CSRF] token name=csrf_test_name hash=3edc19183365c31f6063971a6257dda7
DEBUG - 2026-03-18 12:12:18 --> [REQ_ID=47908d5075b4] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-18 12:12:18 --> [REQ_ID=47908d5075b4] [MEMORY][controller-start] 4194304
INFO - 2026-03-18 12:12:18 --> [REGISTRATION] Form loaded
INFO - 2026-03-18 12:12:18 --> [REQ_ID=47908d5075b4] [PERF] Execution time=0.204573
DEBUG - 2026-03-18 12:13:36 --> [REQ_ID=908117b11914] [REQUEST][START] GET /index.php/Discord/register
DEBUG - 2026-03-18 12:13:36 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-18 12:13:36 --> [REQ_ID=908117b11914] [FILTER_BEFORE] /index.php/Discord/register
DEBUG - 2026-03-18 12:13:36 --> [REQ_ID=908117b11914] [ROUTE] Controller=\App\Controllers\AuthController Method=register
DEBUG - 2026-03-18 12:13:36 --> [REQ_ID=908117b11914] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Discord/register
DEBUG - 2026-03-18 12:13:36 --> [CSRF] token name=csrf_test_name hash=1c7e13c86a2f45fa7dc6eb3d3076601c
DEBUG - 2026-03-18 12:13:36 --> [REQ_ID=c1cb72763c9b] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-18 12:13:36 --> [REQ_ID=c1cb72763c9b] [MEMORY][controller-start] 4194304
INFO - 2026-03-18 12:13:37 --> [REGISTRATION] Form loaded
INFO - 2026-03-18 12:13:37 --> [REQ_ID=c1cb72763c9b] [PERF] Execution time=0.142416
DEBUG - 2026-03-18 12:15:02 --> [REQ_ID=fdbb01880c4b] [REQUEST][START] GET /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-18 12:15:02 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-18 12:15:02 --> [REQ_ID=fdbb01880c4b] [FILTER_BEFORE] /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-18 12:15:02 --> [REQ_ID=fdbb01880c4b] [ROUTE] Controller=\App\Modules\APIs\Controllers\AlertsAPIController Method=fetchEmailAlerts
DEBUG - 2026-03-18 12:15:02 --> [REQ_ID=fdbb01880c4b] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-18 12:15:02 --> [REQ_ID=fdbb01880c4b] [REQUEST][END]
INFO - 2026-03-18 12:15:02 --> [REQ_ID=fdbb01880c4b] [PERF] Execution time=0.063265
DEBUG - 2026-03-18 12:15:41 --> [REQ_ID=5c2068fa4b8c] [REQUEST][START] GET /index.php/Dashboard
DEBUG - 2026-03-18 12:15:41 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-18 12:15:41 --> [REQ_ID=5c2068fa4b8c] [FILTER_BEFORE] /index.php/Dashboard
DEBUG - 2026-03-18 12:15:41 --> [REQ_ID=5c2068fa4b8c] [ROUTE] Controller=\App\Modules\User\Controllers\DashboardController Method=index
DEBUG - 2026-03-18 12:15:41 --> [REQ_ID=5c2068fa4b8c] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Dashboard
DEBUG - 2026-03-18 12:15:41 --> [CSRF] token name=csrf_test_name hash=3ec480f5b6b79d935e0de283b3b0acdb
DEBUG - 2026-03-18 12:15:41 --> [REQ_ID=7075e8c5492e] [INIT] App\Modules\User\Controllers\DashboardController::GET
INFO - 2026-03-18 12:15:41 --> [REQ_ID=7075e8c5492e] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-18 12:15:41 --> [REQ_ID=7075e8c5492e] [METHOD_ENTRY] index
DEBUG - 2026-03-18 12:15:41 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-18 12:15:41 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-18 12:15:41 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-18 12:15:41 --> MyMIMarketing: Pscrape library not installed; Google search scraping will use fallback.
DEBUG - 2026-03-18 12:15:41 --> [DASHBOARD] Enter
DEBUG - 2026-03-18 12:15:41 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-18 12:15:41 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-18 12:15:41 --> [SERVICE] App\Services\BudgetService ::getUserBudget
DEBUG - 2026-03-18 12:15:41 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":2,"deleted":0}
DEBUG - 2026-03-18 12:15:41 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-18 12:15:41 --> [MODEL_WHERE] App\Models\BudgetModel KEY="created_by"
DEBUG - 2026-03-18 12:15:41 --> [MODEL_WHERE] App\Models\BudgetModel KEY="account_type"
DEBUG - 2026-03-18 12:15:41 --> [MODEL_WHERE] App\Models\BudgetModel KEY="designated_date >="
DEBUG - 2026-03-18 12:15:41 --> [MODEL_WHERE] App\Models\BudgetModel KEY="designated_date <="
DEBUG - 2026-03-18 12:15:41 --> [MODEL_WHERE] App\Models\BudgetModel KEY="year"
DEBUG - 2026-03-18 12:15:41 --> [MODEL_WHERE] App\Models\BudgetModel KEY="month <="
DEBUG - 2026-03-18 12:15:41 --> [MODEL_WHERE] App\Models\BudgetModel KEY="day <="
DEBUG - 2026-03-18 12:15:41 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":2,"account_type":"Income","month":"03","year":"2026"}
DEBUG - 2026-03-18 12:15:41 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-03-18 12:15:41 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":2,"account_type":"Income","month":"02","year":"2026"}
DEBUG - 2026-03-18 12:15:41 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-03-18 12:15:41 --> [MODEL_WHERE] App\Models\BudgetModel KEY="created_by"
DEBUG - 2026-03-18 12:15:41 --> [MODEL_WHERE] App\Models\BudgetModel KEY="account_type"
DEBUG - 2026-03-18 12:15:41 --> [MODEL_WHERE] App\Models\BudgetModel KEY="designated_date >="
DEBUG - 2026-03-18 12:15:41 --> [MODEL_WHERE] App\Models\BudgetModel KEY="designated_date <="
DEBUG - 2026-03-18 12:15:41 --> [MODEL_WHERE] App\Models\BudgetModel KEY="year"
DEBUG - 2026-03-18 12:15:41 --> [MODEL_WHERE] App\Models\BudgetModel KEY="month <="
DEBUG - 2026-03-18 12:15:41 --> [MODEL_WHERE] App\Models\BudgetModel KEY="day <="
DEBUG - 2026-03-18 12:15:41 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":2,"account_type":"Expense","month":"03","year":"2026"}
DEBUG - 2026-03-18 12:15:41 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-03-18 12:15:41 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":2,"account_type":"Expense","month":"02","year":"2026"}
DEBUG - 2026-03-18 12:15:41 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-03-18 12:15:41 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"status":1,"created_by":2,"deleted":0}
DEBUG - 2026-03-18 12:15:41 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"status":1,"paid":0,"created_by":2,"deleted":0}
DEBUG - 2026-03-18 12:15:41 --> Skipping placeholder symbol for row 46402
DEBUG - 2026-03-18 12:15:41 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"status":1,"created_by":2,"deleted":0}
ERROR - 2026-03-18 12:15:41 --> DashboardController::index failed to load executive summary: Call to undefined method CodeIgniter\Cache\Handlers\FileHandler::set()
DEBUG - 2026-03-18 12:15:41 --> [CACHE_MISS] mymiwallet_development_squeeze_high-risk_global_global_1f86633dd
ERROR - 2026-03-18 12:15:41 --> Unknown column 'score_total' in 'where clause'
in SYSTEMPATH/Database/MySQLi/Connection.php on line 300.
 1 SYSTEMPATH/Database/MySQLi/Connection.php(300): mysqli->query('SELECT COUNT(*) AS `numrows`
FROM `bf_squeeze_scorecards`
WHERE `score_total` >= 80
AND `as_of_datetime` >= \'2026-03-17 12:15:41\'', 0)
 2 SYSTEMPATH/Database/BaseConnection.php(769): CodeIgniter\Database\MySQLi\Connection->execute('SELECT COUNT(*) AS `numrows`
FROM `bf_squeeze_scorecards`
WHERE `score_total` >= 80
AND `as_of_datetime` >= \'2026-03-17 12:15:41\'')
 3 SYSTEMPATH/Database/BaseConnection.php(686): CodeIgniter\Database\BaseConnection->simpleQuery('SELECT COUNT(*) AS `numrows`
FROM `bf_squeeze_scorecards`
WHERE `score_total` >= 80
AND `as_of_datetime` >= \'2026-03-17 12:15:41\'')
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
DEBUG - 2026-03-18 12:15:41 --> MyMIInvestments::getSqueezeHighRiskCount failed: Unknown column 'score_total' in 'where clause'
DEBUG - 2026-03-18 12:15:41 --> 📰 Daily dashboard news window 2026-03-18 00:00:00 -> 2026-03-18 23:59:59 returned 0 rows
DEBUG - 2026-03-18 12:15:41 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-18 12:15:41 --> [SETUP] Status computed
DEBUG - 2026-03-18 12:15:41 --> [REQ_ID=7075e8c5492e] [VIEW_RENDER] User/Dashboard/index
INFO - 2026-03-18 12:15:41 --> [REQ_ID=7075e8c5492e] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-18 12:15:41 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-18 12:15:41 --> [MODEL_WHERE] App\Models\BudgetModel KEY="created_by"
DEBUG - 2026-03-18 12:15:41 --> [MODEL_WHERE] App\Models\BudgetModel KEY="account_type"
DEBUG - 2026-03-18 12:15:41 --> [MODEL_WHERE] App\Models\BudgetModel KEY="designated_date >="
DEBUG - 2026-03-18 12:15:41 --> [MODEL_WHERE] App\Models\BudgetModel KEY="designated_date <="
DEBUG - 2026-03-18 12:15:41 --> [MODEL_WHERE] App\Models\BudgetModel KEY="year"
DEBUG - 2026-03-18 12:15:41 --> [MODEL_WHERE] App\Models\BudgetModel KEY="month <="
DEBUG - 2026-03-18 12:15:41 --> [MODEL_WHERE] App\Models\BudgetModel KEY="day <="
DEBUG - 2026-03-18 12:15:41 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":2,"account_type":"Income","month":"03","year":"2026"}
DEBUG - 2026-03-18 12:15:41 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-03-18 12:15:41 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":2,"account_type":"Income","month":"02","year":"2026"}
DEBUG - 2026-03-18 12:15:41 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-03-18 12:15:41 --> [MODEL_WHERE] App\Models\BudgetModel KEY="created_by"
DEBUG - 2026-03-18 12:15:41 --> [MODEL_WHERE] App\Models\BudgetModel KEY="account_type"
DEBUG - 2026-03-18 12:15:41 --> [MODEL_WHERE] App\Models\BudgetModel KEY="designated_date >="
DEBUG - 2026-03-18 12:15:41 --> [MODEL_WHERE] App\Models\BudgetModel KEY="designated_date <="
DEBUG - 2026-03-18 12:15:41 --> [MODEL_WHERE] App\Models\BudgetModel KEY="year"
DEBUG - 2026-03-18 12:15:41 --> [MODEL_WHERE] App\Models\BudgetModel KEY="month <="
DEBUG - 2026-03-18 12:15:41 --> [MODEL_WHERE] App\Models\BudgetModel KEY="day <="
DEBUG - 2026-03-18 12:15:41 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":2,"account_type":"Expense","month":"03","year":"2026"}
DEBUG - 2026-03-18 12:15:41 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-03-18 12:15:41 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":2,"account_type":"Expense","month":"02","year":"2026"}
DEBUG - 2026-03-18 12:15:41 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-03-18 12:15:41 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"status":1,"created_by":2,"deleted":0}
DEBUG - 2026-03-18 12:15:41 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"status":1,"paid":0,"created_by":2,"deleted":0}
DEBUG - 2026-03-18 12:15:41 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-18 12:15:41 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"status":1,"created_by":2,"deleted":0}
DEBUG - 2026-03-18 12:15:41 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"status":1,"paid":0,"created_by":2,"deleted":0}
DEBUG - 2026-03-18 12:15:41 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":2,"account_type":"Income","status":1,"month":"03","year":"2026"}
DEBUG - 2026-03-18 12:15:41 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-03-18 12:15:41 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":2,"account_type":"Expense","status":1,"month":"03","year":"2026"}
DEBUG - 2026-03-18 12:15:41 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-03-18 12:15:41 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":2,"account_type":"Investment","month":"03","year":"2026","status":1}
DEBUG - 2026-03-18 12:15:41 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-03-18 12:15:41 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":2,"account_type":"Income","status":1,"month":"02"}
DEBUG - 2026-03-18 12:15:41 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-03-18 12:15:41 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":2,"account_type":"Expense","status":1,"month":"02"}
DEBUG - 2026-03-18 12:15:41 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-03-18 12:15:41 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":2,"account_type":"Investment","month":"02","year":"2026","status":1}
DEBUG - 2026-03-18 12:15:41 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-03-18 12:15:41 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":2,"account_type":"Income","status":1,"month":"04"}
DEBUG - 2026-03-18 12:15:41 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-03-18 12:15:41 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":2,"account_type":"Expense","status":1,"month":"04"}
DEBUG - 2026-03-18 12:15:41 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-03-18 12:15:41 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":2,"account_type":"Investment","month":"04","year":"2026","status":1}
DEBUG - 2026-03-18 12:15:41 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-03-18 12:15:41 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":2,"account_type":"Income","status":1,"year":"2026"}
DEBUG - 2026-03-18 12:15:41 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-03-18 12:15:41 --> [MODEL_WHERE] App\Models\BudgetModel KEY="created_by"
DEBUG - 2026-03-18 12:15:41 --> [MODEL_WHERE] App\Models\BudgetModel KEY="account_type"
DEBUG - 2026-03-18 12:15:41 --> [MODEL_WHERE] App\Models\BudgetModel KEY="status"
DEBUG - 2026-03-18 12:15:41 --> [MODEL_WHERE] App\Models\BudgetModel KEY="year"
DEBUG - 2026-03-18 12:15:41 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-03-18 12:15:41 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":2,"account_type":"Investment","status":1}
DEBUG - 2026-03-18 12:15:41 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-03-18 12:15:41 --> [MODEL_WHERE] App\Models\BudgetModel KEY="created_by"
DEBUG - 2026-03-18 12:15:41 --> [MODEL_WHERE] App\Models\BudgetModel KEY="account_type"
DEBUG - 2026-03-18 12:15:41 --> [MODEL_WHERE] App\Models\BudgetModel KEY="status"
DEBUG - 2026-03-18 12:15:41 --> [MODEL_WHERE] App\Models\BudgetModel KEY="designated_date >="
DEBUG - 2026-03-18 12:15:41 --> [MODEL_WHERE] App\Models\BudgetModel KEY="designated_date <="
DEBUG - 2026-03-18 12:15:41 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-03-18 12:15:41 --> [MODEL_WHERE] App\Models\BudgetModel KEY="created_by"
DEBUG - 2026-03-18 12:15:41 --> [MODEL_WHERE] App\Models\BudgetModel KEY="account_type"
DEBUG - 2026-03-18 12:15:41 --> [MODEL_WHERE] App\Models\BudgetModel KEY="status"
DEBUG - 2026-03-18 12:15:41 --> [MODEL_WHERE] App\Models\BudgetModel KEY="designated_date >="
DEBUG - 2026-03-18 12:15:41 --> [MODEL_WHERE] App\Models\BudgetModel KEY="designated_date <="
DEBUG - 2026-03-18 12:15:41 --> [MODEL_FIRST] App\Models\BudgetModel
INFO - 2026-03-18 12:15:41 --> DashboardController L72 - $checkingSummary: 8784.01
DEBUG - 2026-03-18 12:15:41 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-18 12:15:41 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-18 12:15:41 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-18 12:15:41 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-18 12:15:41 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-18 12:15:41 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-18 12:15:41 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-18 12:15:41 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-18 12:15:41 --> [SERVICE] App\Services\BudgetService ::getUserBudget
DEBUG - 2026-03-18 12:15:41 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":2,"deleted":0}
DEBUG - 2026-03-18 12:15:41 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-18 12:15:41 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"status":1,"created_by":2,"deleted":0}
DEBUG - 2026-03-18 12:15:41 --> [MODEL_WHERE] App\Models\BudgetModel KEY="created_by"
DEBUG - 2026-03-18 12:15:41 --> [MODEL_WHERE] App\Models\BudgetModel KEY="account_type"
DEBUG - 2026-03-18 12:15:41 --> [MODEL_WHERE] App\Models\BudgetModel KEY="designated_date >="
DEBUG - 2026-03-18 12:15:41 --> [MODEL_WHERE] App\Models\BudgetModel KEY="designated_date <="
DEBUG - 2026-03-18 12:15:41 --> [MODEL_WHERE] App\Models\BudgetModel KEY="year"
DEBUG - 2026-03-18 12:15:41 --> [MODEL_WHERE] App\Models\BudgetModel KEY="month <="
DEBUG - 2026-03-18 12:15:41 --> [MODEL_WHERE] App\Models\BudgetModel KEY="day <="
DEBUG - 2026-03-18 12:15:41 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":2,"account_type":"Income","month":"03","year":"2026"}
DEBUG - 2026-03-18 12:15:41 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-03-18 12:15:41 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":2,"account_type":"Income","month":"02","year":"2026"}
DEBUG - 2026-03-18 12:15:41 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-03-18 12:15:41 --> [MODEL_WHERE] App\Models\BudgetModel KEY="created_by"
DEBUG - 2026-03-18 12:15:41 --> [MODEL_WHERE] App\Models\BudgetModel KEY="account_type"
DEBUG - 2026-03-18 12:15:41 --> [MODEL_WHERE] App\Models\BudgetModel KEY="designated_date >="
DEBUG - 2026-03-18 12:15:41 --> [MODEL_WHERE] App\Models\BudgetModel KEY="designated_date <="
DEBUG - 2026-03-18 12:15:41 --> [MODEL_WHERE] App\Models\BudgetModel KEY="year"
DEBUG - 2026-03-18 12:15:41 --> [MODEL_WHERE] App\Models\BudgetModel KEY="month <="
DEBUG - 2026-03-18 12:15:41 --> [MODEL_WHERE] App\Models\BudgetModel KEY="day <="
DEBUG - 2026-03-18 12:15:41 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":2,"account_type":"Expense","month":"03","year":"2026"}
DEBUG - 2026-03-18 12:15:41 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-03-18 12:15:41 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":2,"account_type":"Expense","month":"02","year":"2026"}
DEBUG - 2026-03-18 12:15:41 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-03-18 12:15:41 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"status":1,"created_by":2,"deleted":0}
DEBUG - 2026-03-18 12:15:41 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"status":1,"paid":0,"created_by":2,"deleted":0}
INFO - 2026-03-18 12:15:41 --> getSolanaData: invalid address param
INFO - 2026-03-18 12:15:41 --> themesMemory usage: 8388608
DEBUG - 2026-03-18 12:15:41 --> [REQ_ID=5c2068fa4b8c] [FILTER_AFTER]
DEBUG - 2026-03-18 12:15:41 --> [REQ_ID=5c2068fa4b8c] [LIFECYCLE][END] status=200 duration_ms=932.28 memory_delta=4194304
INFO - 2026-03-18 12:15:41 --> [REQ_ID=7075e8c5492e] [PERF] Execution time=0.873864
DEBUG - 2026-03-18 12:15:41 --> [REQ_ID=5c2068fa4b8c] [REQUEST][END]
INFO - 2026-03-18 12:15:41 --> [REQ_ID=5c2068fa4b8c] [PERF] Execution time=0.948484
DEBUG - 2026-03-18 12:16:22 --> [REQ_ID=5be236770f69] [REQUEST][START] HEAD /
DEBUG - 2026-03-18 12:16:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-18 12:16:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-18 12:16:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-18 12:16:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-18 12:16:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-18 12:21:22 --> [REQ_ID=f9a59c05fbcb] [REQUEST][START] HEAD /
DEBUG - 2026-03-18 12:21:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-18 12:21:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-18 12:21:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-18 12:21:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-18 12:21:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-18 12:26:22 --> [REQ_ID=e04ea4945d08] [REQUEST][START] HEAD /
DEBUG - 2026-03-18 12:26:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-18 12:26:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-18 12:26:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-18 12:26:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-18 12:26:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-18 12:29:12 --> [REQ_ID=e282fc93dc55] [REQUEST][START] GET /index.php/Management/Marketing/Video-Creator
DEBUG - 2026-03-18 12:29:12 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-18 12:29:12 --> [REQ_ID=e282fc93dc55] [REQUEST][END]
INFO - 2026-03-18 12:29:12 --> [REQ_ID=e282fc93dc55] [PERF] Execution time=0.046046
DEBUG - 2026-03-18 12:31:22 --> [REQ_ID=0ed797e5c597] [REQUEST][START] HEAD /
DEBUG - 2026-03-18 12:31:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-18 12:31:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-18 12:31:23 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-18 12:31:23 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-18 12:31:23 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-18 12:32:03 --> [REQ_ID=f45c89b4f55e] [REQUEST][START] GET /index.php/Budget/Financial-Analysis
DEBUG - 2026-03-18 12:32:03 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-18 12:32:03 --> [REQ_ID=f45c89b4f55e] [REQUEST][END]
INFO - 2026-03-18 12:32:03 --> [REQ_ID=f45c89b4f55e] [PERF] Execution time=0.024367
DEBUG - 2026-03-18 12:36:22 --> [REQ_ID=88b414f9868a] [REQUEST][START] HEAD /
DEBUG - 2026-03-18 12:36:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-18 12:36:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-18 12:36:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-18 12:36:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-18 12:36:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-18 12:41:22 --> [REQ_ID=30020d7202f9] [REQUEST][START] HEAD /
DEBUG - 2026-03-18 12:41:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-18 12:41:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-18 12:41:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-18 12:41:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-18 12:41:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-18 12:46:22 --> [REQ_ID=728ef3306ccd] [REQUEST][START] HEAD /
DEBUG - 2026-03-18 12:46:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-18 12:46:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-18 12:46:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-18 12:46:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-18 12:46:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-18 12:48:19 --> [REQ_ID=749f045aa94c] [REQUEST][START] GET /
DEBUG - 2026-03-18 12:48:19 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-18 12:48:19 --> [REQ_ID=749f045aa94c] [FILTER_BEFORE] /
DEBUG - 2026-03-18 12:48:19 --> [REQ_ID=749f045aa94c] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-18 12:48:19 --> [REQ_ID=749f045aa94c] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-18 12:48:19 --> [CSRF] token name=csrf_test_name hash=264d08d936b19aa2de1b565fcc53b96c
DEBUG - 2026-03-18 12:48:19 --> [REQ_ID=09127bece4b5] [INIT] App\Controllers\Home::GET
INFO - 2026-03-18 12:48:19 --> [REQ_ID=09127bece4b5] [MEMORY][controller-start] 4194304
INFO - 2026-03-18 12:48:19 --> [REQ_ID=09127bece4b5] [MEMORY][commonData:start] 4194304
DEBUG - 2026-03-18 12:48:19 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-18 12:48:21 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-03-18 12:48:21 --> [REQ_ID=09127bece4b5] [VIEW_RENDER] themes/public/home
INFO - 2026-03-18 12:48:21 --> [REQ_ID=09127bece4b5] [MEMORY][commonData:start] 8388608
INFO - 2026-03-18 12:48:21 --> themesMemory usage: 8388608
DEBUG - 2026-03-18 12:48:21 --> [MetaService] slug= pageName=Home cacheHit= path=DB
DEBUG - 2026-03-18 12:48:21 --> [REQ_ID=749f045aa94c] [FILTER_AFTER]
DEBUG - 2026-03-18 12:48:21 --> [REQ_ID=749f045aa94c] [LIFECYCLE][END] status=200 duration_ms=1,396.29 memory_delta=4194304
INFO - 2026-03-18 12:48:21 --> [REQ_ID=09127bece4b5] [PERF] Execution time=1.394412
DEBUG - 2026-03-18 12:48:21 --> [REQ_ID=749f045aa94c] [REQUEST][END]
INFO - 2026-03-18 12:48:21 --> [REQ_ID=749f045aa94c] [PERF] Execution time=1.416867
DEBUG - 2026-03-18 12:49:55 --> [REQ_ID=f826b62889c8] [REQUEST][START] GET /index.php/Knowledgebase/MyMI-Partnerships
DEBUG - 2026-03-18 12:49:55 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-18 12:49:55 --> [REQ_ID=f826b62889c8] [REQUEST][END]
INFO - 2026-03-18 12:49:55 --> [REQ_ID=f826b62889c8] [PERF] Execution time=0.045367
DEBUG - 2026-03-18 12:51:22 --> [REQ_ID=39a525aef466] [REQUEST][START] HEAD /
DEBUG - 2026-03-18 12:51:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-18 12:51:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-18 12:51:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-18 12:51:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-18 12:51:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-18 12:52:57 --> [REQ_ID=2bfcb99740d0] [REQUEST][START] GET /index.php/Account/Notifications
DEBUG - 2026-03-18 12:52:57 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-18 12:52:57 --> [REQ_ID=2bfcb99740d0] [REQUEST][END]
INFO - 2026-03-18 12:52:57 --> [REQ_ID=2bfcb99740d0] [PERF] Execution time=0.041168
DEBUG - 2026-03-18 12:56:22 --> [REQ_ID=1185ef231c3a] [REQUEST][START] HEAD /
DEBUG - 2026-03-18 12:56:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-18 12:56:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-18 12:56:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-18 12:56:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-18 12:56:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-18 13:00:01 --> [REQ_ID=a92be2656d95] [REQUEST][START] GET /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-18 13:00:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-18 13:00:01 --> [REQ_ID=a92be2656d95] [FILTER_BEFORE] /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-18 13:00:01 --> [REQ_ID=a92be2656d95] [ROUTE] Controller=\App\Modules\Management\Controllers\ManagementAPIController Method=Run_CRON_Tasks
DEBUG - 2026-03-18 13:00:01 --> [REQ_ID=a92be2656d95] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-18 13:00:01 --> [REQ_ID=a92be2656d95] [REQUEST][END]
INFO - 2026-03-18 13:00:01 --> [REQ_ID=a92be2656d95] [PERF] Execution time=0.053663
DEBUG - 2026-03-18 13:01:22 --> [REQ_ID=ada871b511de] [REQUEST][START] HEAD /
DEBUG - 2026-03-18 13:01:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-18 13:01:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-18 13:01:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-18 13:01:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-18 13:01:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-18 13:06:22 --> [REQ_ID=ae8b11a0c5a3] [REQUEST][START] HEAD /
DEBUG - 2026-03-18 13:06:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-18 13:06:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-18 13:06:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-18 13:06:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-18 13:06:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-18 13:11:22 --> [REQ_ID=39683d593466] [REQUEST][START] HEAD /
DEBUG - 2026-03-18 13:11:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-18 13:11:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-18 13:11:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-18 13:11:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-18 13:11:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-18 13:15:01 --> [REQ_ID=f0338409d972] [REQUEST][START] GET /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-18 13:15:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-18 13:15:01 --> [REQ_ID=f0338409d972] [FILTER_BEFORE] /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-18 13:15:01 --> [REQ_ID=f0338409d972] [ROUTE] Controller=\App\Modules\APIs\Controllers\AlertsAPIController Method=fetchEmailAlerts
DEBUG - 2026-03-18 13:15:01 --> [REQ_ID=f0338409d972] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-18 13:15:01 --> [REQ_ID=f0338409d972] [REQUEST][END]
INFO - 2026-03-18 13:15:01 --> [REQ_ID=f0338409d972] [PERF] Execution time=0.045046
DEBUG - 2026-03-18 13:16:22 --> [REQ_ID=22ea5cfffd78] [REQUEST][START] HEAD /
DEBUG - 2026-03-18 13:16:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-18 13:16:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-18 13:16:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-18 13:16:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-18 13:16:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-18 13:21:22 --> [REQ_ID=cf6a18b79c0b] [REQUEST][START] HEAD /
DEBUG - 2026-03-18 13:21:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-18 13:21:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-18 13:21:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-18 13:21:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-18 13:21:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-18 13:26:22 --> [REQ_ID=02c3552c8f44] [REQUEST][START] HEAD /
DEBUG - 2026-03-18 13:26:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-18 13:26:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-18 13:26:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-18 13:26:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-18 13:26:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-18 13:29:42 --> [REQ_ID=735a37059604] [REQUEST][START] GET /
DEBUG - 2026-03-18 13:29:42 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-18 13:29:42 --> [REQ_ID=735a37059604] [FILTER_BEFORE] /
DEBUG - 2026-03-18 13:29:42 --> [REQ_ID=735a37059604] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-18 13:29:42 --> [REQ_ID=735a37059604] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-18 13:29:42 --> [CSRF] token name=csrf_test_name hash=4c679ba94bb412ffa44748fddfcb3615
DEBUG - 2026-03-18 13:29:42 --> [REQ_ID=d2a2164a223a] [INIT] App\Controllers\Home::GET
INFO - 2026-03-18 13:29:42 --> [REQ_ID=d2a2164a223a] [MEMORY][controller-start] 6291456
INFO - 2026-03-18 13:29:42 --> [REQ_ID=d2a2164a223a] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-18 13:29:42 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-18 13:29:43 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-03-18 13:29:43 --> [REQ_ID=d2a2164a223a] [VIEW_RENDER] themes/public/home
INFO - 2026-03-18 13:29:43 --> [REQ_ID=d2a2164a223a] [MEMORY][commonData:start] 10485760
INFO - 2026-03-18 13:29:43 --> themesMemory usage: 10485760
DEBUG - 2026-03-18 13:29:43 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-18 13:29:43 --> [REQ_ID=735a37059604] [FILTER_AFTER]
DEBUG - 2026-03-18 13:29:43 --> [REQ_ID=735a37059604] [LIFECYCLE][END] status=200 duration_ms=941.77 memory_delta=4194304
INFO - 2026-03-18 13:29:43 --> [REQ_ID=d2a2164a223a] [PERF] Execution time=0.939029
DEBUG - 2026-03-18 13:29:43 --> [REQ_ID=735a37059604] [REQUEST][END]
INFO - 2026-03-18 13:29:43 --> [REQ_ID=735a37059604] [PERF] Execution time=0.982069
DEBUG - 2026-03-18 13:31:22 --> [REQ_ID=04662a5e20e7] [REQUEST][START] HEAD /
DEBUG - 2026-03-18 13:31:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-18 13:31:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-18 13:31:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-18 13:31:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-18 13:31:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-18 13:31:54 --> [REQ_ID=da50d69d4e57] [REQUEST][START] GET /
DEBUG - 2026-03-18 13:31:54 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-18 13:31:54 --> [REQ_ID=da50d69d4e57] [FILTER_BEFORE] /
DEBUG - 2026-03-18 13:31:54 --> [REQ_ID=da50d69d4e57] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-18 13:31:54 --> [REQ_ID=da50d69d4e57] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-18 13:31:54 --> [CSRF] token name=csrf_test_name hash=83c4d96698313b684482a1c144dc74d2
DEBUG - 2026-03-18 13:31:54 --> [REQ_ID=61792d2eef89] [INIT] App\Controllers\Home::GET
INFO - 2026-03-18 13:31:54 --> [REQ_ID=61792d2eef89] [MEMORY][controller-start] 4194304
INFO - 2026-03-18 13:31:54 --> [REQ_ID=61792d2eef89] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-18 13:31:54 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-18 13:31:55 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
DEBUG - 2026-03-18 13:31:55 --> [REQ_ID=61792d2eef89] [VIEW_RENDER] themes/public/home
INFO - 2026-03-18 13:31:55 --> [REQ_ID=61792d2eef89] [MEMORY][commonData:start] 8388608
INFO - 2026-03-18 13:31:55 --> themesMemory usage: 8388608
DEBUG - 2026-03-18 13:31:55 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-18 13:31:55 --> [REQ_ID=da50d69d4e57] [FILTER_AFTER]
DEBUG - 2026-03-18 13:31:55 --> [REQ_ID=da50d69d4e57] [LIFECYCLE][END] status=200 duration_ms=844.06 memory_delta=4194304
INFO - 2026-03-18 13:31:55 --> [REQ_ID=61792d2eef89] [PERF] Execution time=0.842033
DEBUG - 2026-03-18 13:31:55 --> [REQ_ID=da50d69d4e57] [REQUEST][END]
INFO - 2026-03-18 13:31:55 --> [REQ_ID=da50d69d4e57] [PERF] Execution time=0.862689
DEBUG - 2026-03-18 13:36:22 --> [REQ_ID=391c83809340] [REQUEST][START] HEAD /
DEBUG - 2026-03-18 13:36:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-18 13:36:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-18 13:36:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-18 13:36:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-18 13:36:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-18 13:41:22 --> [REQ_ID=0f22da883cfc] [REQUEST][START] HEAD /
DEBUG - 2026-03-18 13:41:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-18 13:41:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-18 13:41:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-18 13:41:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-18 13:41:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-18 13:46:22 --> [REQ_ID=a82c027b7463] [REQUEST][START] HEAD /
DEBUG - 2026-03-18 13:46:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-18 13:46:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-18 13:46:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-18 13:46:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-18 13:46:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-18 13:46:34 --> [REQ_ID=068f8ffda384] [REQUEST][START] GET /index.php/Wallets
DEBUG - 2026-03-18 13:46:34 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-18 13:46:34 --> [REQ_ID=068f8ffda384] [REQUEST][END]
INFO - 2026-03-18 13:46:34 --> [REQ_ID=068f8ffda384] [PERF] Execution time=0.036141
DEBUG - 2026-03-18 13:49:57 --> [REQ_ID=d57fc11e9e15] [REQUEST][START] GET /index.php/Management/Security
DEBUG - 2026-03-18 13:49:57 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-18 13:49:57 --> [REQ_ID=d57fc11e9e15] [REQUEST][END]
INFO - 2026-03-18 13:49:57 --> [REQ_ID=d57fc11e9e15] [PERF] Execution time=0.035534
DEBUG - 2026-03-18 13:51:22 --> [REQ_ID=4e2550fa4de0] [REQUEST][START] HEAD /
DEBUG - 2026-03-18 13:51:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-18 13:51:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-18 13:51:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-18 13:51:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-18 13:51:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-18 13:52:59 --> [REQ_ID=6bd452ed9696] [REQUEST][START] GET /index.php/Knowledgebase
DEBUG - 2026-03-18 13:52:59 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-18 13:52:59 --> [REQ_ID=6bd452ed9696] [REQUEST][END]
INFO - 2026-03-18 13:52:59 --> [REQ_ID=6bd452ed9696] [PERF] Execution time=0.058418
DEBUG - 2026-03-18 13:56:22 --> [REQ_ID=4458ed16e8e1] [REQUEST][START] HEAD /
DEBUG - 2026-03-18 13:56:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-18 13:56:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-18 13:56:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-18 13:56:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-18 13:56:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-18 13:57:12 --> [REQ_ID=80ceaea39a37] [REQUEST][START] GET /index.php/My-Referrals
DEBUG - 2026-03-18 13:57:12 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-18 13:57:12 --> [REQ_ID=80ceaea39a37] [REQUEST][END]
INFO - 2026-03-18 13:57:12 --> [REQ_ID=80ceaea39a37] [PERF] Execution time=0.021302
DEBUG - 2026-03-18 14:00:01 --> [REQ_ID=63940ad10212] [REQUEST][START] GET /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-18 14:00:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-18 14:00:01 --> [REQ_ID=63940ad10212] [FILTER_BEFORE] /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-18 14:00:01 --> [REQ_ID=63940ad10212] [ROUTE] Controller=\App\Modules\Management\Controllers\ManagementAPIController Method=Run_CRON_Tasks
DEBUG - 2026-03-18 14:00:01 --> [REQ_ID=63940ad10212] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-18 14:00:01 --> [REQ_ID=63940ad10212] [REQUEST][END]
INFO - 2026-03-18 14:00:01 --> [REQ_ID=63940ad10212] [PERF] Execution time=0.043789
DEBUG - 2026-03-18 14:01:22 --> [REQ_ID=1bc9beb34020] [REQUEST][START] HEAD /
DEBUG - 2026-03-18 14:01:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-18 14:01:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-18 14:01:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-18 14:01:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-18 14:01:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-18 14:06:22 --> [REQ_ID=d491c48a156c] [REQUEST][START] HEAD /
DEBUG - 2026-03-18 14:06:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-18 14:06:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-18 14:06:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-18 14:06:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-18 14:06:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-18 14:11:22 --> [REQ_ID=150294548d16] [REQUEST][START] HEAD /
DEBUG - 2026-03-18 14:11:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-18 14:11:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-18 14:11:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-18 14:11:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-18 14:11:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-18 14:15:02 --> [REQ_ID=09ea831c7d50] [REQUEST][START] GET /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-18 14:15:02 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-18 14:15:02 --> [REQ_ID=09ea831c7d50] [FILTER_BEFORE] /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-18 14:15:02 --> [REQ_ID=09ea831c7d50] [ROUTE] Controller=\App\Modules\APIs\Controllers\AlertsAPIController Method=fetchEmailAlerts
DEBUG - 2026-03-18 14:15:02 --> [REQ_ID=09ea831c7d50] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-18 14:15:02 --> [REQ_ID=09ea831c7d50] [REQUEST][END]
INFO - 2026-03-18 14:15:02 --> [REQ_ID=09ea831c7d50] [PERF] Execution time=0.045219
DEBUG - 2026-03-18 14:16:22 --> [REQ_ID=efeb3857adc2] [REQUEST][START] HEAD /
DEBUG - 2026-03-18 14:16:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-18 14:16:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-18 14:16:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-18 14:16:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-18 14:16:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-18 14:21:22 --> [REQ_ID=1a62bc45edb2] [REQUEST][START] HEAD /
DEBUG - 2026-03-18 14:21:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-18 14:21:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-18 14:21:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-18 14:21:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-18 14:21:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-18 14:24:49 --> [REQ_ID=dcc90dbd0ccd] [REQUEST][START] GET /
DEBUG - 2026-03-18 14:24:49 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-18 14:24:49 --> [REQ_ID=dcc90dbd0ccd] [FILTER_BEFORE] /
DEBUG - 2026-03-18 14:24:49 --> [REQ_ID=dcc90dbd0ccd] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-18 14:24:49 --> [REQ_ID=dcc90dbd0ccd] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-18 14:24:49 --> [CSRF] token name=csrf_test_name hash=ab5d3cc5e0669ebb5b31f20fb7a61f98
DEBUG - 2026-03-18 14:24:49 --> [REQ_ID=9a2169b99d5d] [INIT] App\Controllers\Home::GET
INFO - 2026-03-18 14:24:49 --> [REQ_ID=9a2169b99d5d] [MEMORY][controller-start] 6291456
INFO - 2026-03-18 14:24:49 --> [REQ_ID=9a2169b99d5d] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-18 14:24:49 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-18 14:24:50 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-03-18 14:24:50 --> [REQ_ID=9a2169b99d5d] [VIEW_RENDER] themes/public/home
INFO - 2026-03-18 14:24:50 --> [REQ_ID=9a2169b99d5d] [MEMORY][commonData:start] 10485760
INFO - 2026-03-18 14:24:50 --> themesMemory usage: 10485760
DEBUG - 2026-03-18 14:24:50 --> [MetaService] slug= pageName=Home cacheHit= path=DB
DEBUG - 2026-03-18 14:24:50 --> [REQ_ID=dcc90dbd0ccd] [FILTER_AFTER]
DEBUG - 2026-03-18 14:24:50 --> [REQ_ID=dcc90dbd0ccd] [LIFECYCLE][END] status=200 duration_ms=1,060.82 memory_delta=4194304
INFO - 2026-03-18 14:24:50 --> [REQ_ID=9a2169b99d5d] [PERF] Execution time=1.059025
DEBUG - 2026-03-18 14:24:50 --> [REQ_ID=dcc90dbd0ccd] [REQUEST][END]
INFO - 2026-03-18 14:24:50 --> [REQ_ID=dcc90dbd0ccd] [PERF] Execution time=1.099601
DEBUG - 2026-03-18 14:26:22 --> [REQ_ID=c2df4753eaa9] [REQUEST][START] HEAD /
DEBUG - 2026-03-18 14:26:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-18 14:26:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-18 14:26:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-18 14:26:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-18 14:26:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-18 14:31:22 --> [REQ_ID=11e19507fe57] [REQUEST][START] HEAD /
DEBUG - 2026-03-18 14:31:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-18 14:31:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-18 14:31:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-18 14:31:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-18 14:31:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-18 14:36:22 --> [REQ_ID=b4ed1f81d811] [REQUEST][START] HEAD /
DEBUG - 2026-03-18 14:36:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-18 14:36:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-18 14:36:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-18 14:36:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-18 14:36:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-18 14:41:22 --> [REQ_ID=58fc84d1e0c9] [REQUEST][START] HEAD /
DEBUG - 2026-03-18 14:41:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-18 14:41:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-18 14:41:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-18 14:41:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-18 14:41:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-18 14:45:39 --> [REQ_ID=f1f71600d753] [REQUEST][START] GET /
DEBUG - 2026-03-18 14:45:39 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-18 14:45:39 --> [REQ_ID=f1f71600d753] [FILTER_BEFORE] /
DEBUG - 2026-03-18 14:45:39 --> [REQ_ID=f1f71600d753] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-18 14:45:39 --> [REQ_ID=f1f71600d753] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-18 14:45:39 --> [CSRF] token name=csrf_test_name hash=19633a524755cdf9a888ddee7200b879
DEBUG - 2026-03-18 14:45:39 --> [REQ_ID=503c5ad918a2] [INIT] App\Controllers\Home::GET
INFO - 2026-03-18 14:45:39 --> [REQ_ID=503c5ad918a2] [MEMORY][controller-start] 6291456
INFO - 2026-03-18 14:45:39 --> [REQ_ID=503c5ad918a2] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-18 14:45:39 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-18 14:45:40 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-03-18 14:45:40 --> [REQ_ID=503c5ad918a2] [VIEW_RENDER] themes/public/home
INFO - 2026-03-18 14:45:40 --> [REQ_ID=503c5ad918a2] [MEMORY][commonData:start] 10485760
INFO - 2026-03-18 14:45:40 --> themesMemory usage: 10485760
DEBUG - 2026-03-18 14:45:40 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-18 14:45:40 --> [REQ_ID=f1f71600d753] [FILTER_AFTER]
DEBUG - 2026-03-18 14:45:40 --> [REQ_ID=f1f71600d753] [LIFECYCLE][END] status=200 duration_ms=1,254.97 memory_delta=4194304
INFO - 2026-03-18 14:45:40 --> [REQ_ID=503c5ad918a2] [PERF] Execution time=1.252869
DEBUG - 2026-03-18 14:45:40 --> [REQ_ID=f1f71600d753] [REQUEST][END]
INFO - 2026-03-18 14:45:40 --> [REQ_ID=f1f71600d753] [PERF] Execution time=1.293847
DEBUG - 2026-03-18 14:46:22 --> [REQ_ID=580fe84ae67b] [REQUEST][START] HEAD /
DEBUG - 2026-03-18 14:46:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-18 14:46:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-18 14:46:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-18 14:46:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-18 14:46:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-18 14:51:22 --> [REQ_ID=58248a62f441] [REQUEST][START] HEAD /
DEBUG - 2026-03-18 14:51:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-18 14:51:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-18 14:51:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-18 14:51:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-18 14:51:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-18 14:56:22 --> [REQ_ID=f2378956af24] [REQUEST][START] HEAD /
DEBUG - 2026-03-18 14:56:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-18 14:56:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-18 14:56:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-18 14:56:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-18 14:56:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-18 15:00:01 --> [REQ_ID=3c1d4a356a42] [REQUEST][START] GET /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-18 15:00:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-18 15:00:01 --> [REQ_ID=3c1d4a356a42] [FILTER_BEFORE] /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-18 15:00:01 --> [REQ_ID=3c1d4a356a42] [ROUTE] Controller=\App\Modules\Management\Controllers\ManagementAPIController Method=Run_CRON_Tasks
DEBUG - 2026-03-18 15:00:01 --> [REQ_ID=3c1d4a356a42] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-18 15:00:01 --> [REQ_ID=3c1d4a356a42] [REQUEST][END]
INFO - 2026-03-18 15:00:01 --> [REQ_ID=3c1d4a356a42] [PERF] Execution time=0.037362
DEBUG - 2026-03-18 15:01:22 --> [REQ_ID=e42a0da20bf1] [REQUEST][START] HEAD /
DEBUG - 2026-03-18 15:01:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-18 15:01:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-18 15:01:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-18 15:01:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-18 15:01:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-18 15:06:22 --> [REQ_ID=bed66952705d] [REQUEST][START] HEAD /
DEBUG - 2026-03-18 15:06:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-18 15:06:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-18 15:06:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-18 15:06:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-18 15:06:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-18 15:11:22 --> [REQ_ID=107f9dafc78b] [REQUEST][START] HEAD /
DEBUG - 2026-03-18 15:11:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-18 15:11:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-18 15:11:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-18 15:11:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-18 15:11:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-18 15:15:01 --> [REQ_ID=606bb1ba510d] [REQUEST][START] GET /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-18 15:15:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-18 15:15:01 --> [REQ_ID=606bb1ba510d] [FILTER_BEFORE] /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-18 15:15:01 --> [REQ_ID=606bb1ba510d] [ROUTE] Controller=\App\Modules\APIs\Controllers\AlertsAPIController Method=fetchEmailAlerts
DEBUG - 2026-03-18 15:15:01 --> [REQ_ID=606bb1ba510d] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-18 15:15:01 --> [REQ_ID=606bb1ba510d] [REQUEST][END]
INFO - 2026-03-18 15:15:01 --> [REQ_ID=606bb1ba510d] [PERF] Execution time=0.059755
DEBUG - 2026-03-18 15:16:22 --> [REQ_ID=e7bfa246b664] [REQUEST][START] HEAD /
DEBUG - 2026-03-18 15:16:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-18 15:16:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-18 15:16:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-18 15:16:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-18 15:16:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-18 15:21:22 --> [REQ_ID=9a05ed98eb2d] [REQUEST][START] HEAD /
DEBUG - 2026-03-18 15:21:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-18 15:21:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-18 15:21:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-18 15:21:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-18 15:21:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-18 15:26:22 --> [REQ_ID=1316b2fb4630] [REQUEST][START] HEAD /
DEBUG - 2026-03-18 15:26:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-18 15:26:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-18 15:26:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-18 15:26:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-18 15:26:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-18 15:31:22 --> [REQ_ID=d1e78ca50c99] [REQUEST][START] HEAD /
DEBUG - 2026-03-18 15:31:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-18 15:31:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-18 15:31:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-18 15:31:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-18 15:31:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-18 15:33:36 --> [REQ_ID=6a2b19116dd3] [REQUEST][START] GET /
DEBUG - 2026-03-18 15:33:36 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-18 15:33:36 --> [REQ_ID=6a2b19116dd3] [FILTER_BEFORE] /
DEBUG - 2026-03-18 15:33:36 --> [REQ_ID=6a2b19116dd3] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-18 15:33:36 --> [REQ_ID=6a2b19116dd3] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-18 15:33:36 --> [CSRF] token name=csrf_test_name hash=23c9a599c602e0eaf30b06dcef17f472
DEBUG - 2026-03-18 15:33:36 --> [REQ_ID=23a75931b453] [INIT] App\Controllers\Home::GET
INFO - 2026-03-18 15:33:36 --> [REQ_ID=23a75931b453] [MEMORY][controller-start] 6291456
INFO - 2026-03-18 15:33:36 --> [REQ_ID=23a75931b453] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-18 15:33:36 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-18 15:33:37 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-03-18 15:33:37 --> [REQ_ID=23a75931b453] [VIEW_RENDER] themes/public/home
INFO - 2026-03-18 15:33:37 --> [REQ_ID=23a75931b453] [MEMORY][commonData:start] 10485760
INFO - 2026-03-18 15:33:37 --> themesMemory usage: 10485760
DEBUG - 2026-03-18 15:33:37 --> [MetaService] slug= pageName=Home cacheHit= path=DB
DEBUG - 2026-03-18 15:33:37 --> [REQ_ID=6a2b19116dd3] [FILTER_AFTER]
DEBUG - 2026-03-18 15:33:37 --> [REQ_ID=6a2b19116dd3] [LIFECYCLE][END] status=200 duration_ms=1,256.96 memory_delta=4194304
INFO - 2026-03-18 15:33:37 --> [REQ_ID=23a75931b453] [PERF] Execution time=1.254965
DEBUG - 2026-03-18 15:33:37 --> [REQ_ID=6a2b19116dd3] [REQUEST][END]
INFO - 2026-03-18 15:33:37 --> [REQ_ID=6a2b19116dd3] [PERF] Execution time=1.295502
DEBUG - 2026-03-18 15:36:22 --> [REQ_ID=65e7b1e740a3] [REQUEST][START] HEAD /
DEBUG - 2026-03-18 15:36:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-18 15:36:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-18 15:36:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-18 15:36:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-18 15:36:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-18 15:41:22 --> [REQ_ID=45823d5668ad] [REQUEST][START] HEAD /
DEBUG - 2026-03-18 15:41:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-18 15:41:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-18 15:41:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-18 15:41:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-18 15:41:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-18 15:46:22 --> [REQ_ID=bcbd9ab567f6] [REQUEST][START] HEAD /
DEBUG - 2026-03-18 15:46:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-18 15:46:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-18 15:46:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-18 15:46:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-18 15:46:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-18 15:51:22 --> [REQ_ID=11a3ac6e556c] [REQUEST][START] HEAD /
DEBUG - 2026-03-18 15:51:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-18 15:51:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-18 15:51:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-18 15:51:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-18 15:51:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-18 15:56:22 --> [REQ_ID=5bb4dd66b21e] [REQUEST][START] HEAD /
DEBUG - 2026-03-18 15:56:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-18 15:56:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-18 15:56:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-18 15:56:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-18 15:56:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-18 16:00:02 --> [REQ_ID=dd7259542690] [REQUEST][START] GET /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-18 16:00:02 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-18 16:00:02 --> [REQ_ID=dd7259542690] [FILTER_BEFORE] /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-18 16:00:02 --> [REQ_ID=dd7259542690] [ROUTE] Controller=\App\Modules\Management\Controllers\ManagementAPIController Method=Run_CRON_Tasks
DEBUG - 2026-03-18 16:00:02 --> [REQ_ID=dd7259542690] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-18 16:00:02 --> [REQ_ID=dd7259542690] [REQUEST][END]
INFO - 2026-03-18 16:00:02 --> [REQ_ID=dd7259542690] [PERF] Execution time=0.049523
DEBUG - 2026-03-18 16:01:22 --> [REQ_ID=64ea0277823d] [REQUEST][START] HEAD /
DEBUG - 2026-03-18 16:01:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-18 16:01:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-18 16:01:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-18 16:01:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-18 16:01:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-18 16:06:22 --> [REQ_ID=71bfc0d40f09] [REQUEST][START] HEAD /
DEBUG - 2026-03-18 16:06:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-18 16:06:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-18 16:06:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-18 16:06:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-18 16:06:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-18 16:11:22 --> [REQ_ID=fbc2322b6086] [REQUEST][START] HEAD /
DEBUG - 2026-03-18 16:11:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-18 16:11:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-18 16:11:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-18 16:11:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-18 16:11:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-18 16:15:01 --> [REQ_ID=5b4d4c659ae9] [REQUEST][START] GET /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-18 16:15:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-18 16:15:01 --> [REQ_ID=5b4d4c659ae9] [FILTER_BEFORE] /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-18 16:15:01 --> [REQ_ID=5b4d4c659ae9] [ROUTE] Controller=\App\Modules\APIs\Controllers\AlertsAPIController Method=fetchEmailAlerts
DEBUG - 2026-03-18 16:15:01 --> [REQ_ID=5b4d4c659ae9] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-18 16:15:01 --> [REQ_ID=5b4d4c659ae9] [REQUEST][END]
INFO - 2026-03-18 16:15:01 --> [REQ_ID=5b4d4c659ae9] [PERF] Execution time=0.064255
DEBUG - 2026-03-18 16:15:50 --> [REQ_ID=0d8a23c2c4c9] [REQUEST][START] GET /
DEBUG - 2026-03-18 16:15:50 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-18 16:15:50 --> [REQ_ID=0d8a23c2c4c9] [FILTER_BEFORE] /
DEBUG - 2026-03-18 16:15:50 --> [REQ_ID=0d8a23c2c4c9] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-18 16:15:50 --> [REQ_ID=0d8a23c2c4c9] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-18 16:15:50 --> [CSRF] token name=csrf_test_name hash=a2d57140980b5a384aab6f00db8a5a7f
DEBUG - 2026-03-18 16:15:50 --> [REQ_ID=aeb89d2dea4c] [INIT] App\Controllers\Home::GET
INFO - 2026-03-18 16:15:50 --> [REQ_ID=aeb89d2dea4c] [MEMORY][controller-start] 4194304
INFO - 2026-03-18 16:15:50 --> [REQ_ID=aeb89d2dea4c] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-18 16:15:50 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-18 16:15:51 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-03-18 16:15:51 --> [REQ_ID=aeb89d2dea4c] [VIEW_RENDER] themes/public/home
INFO - 2026-03-18 16:15:51 --> [REQ_ID=aeb89d2dea4c] [MEMORY][commonData:start] 8388608
INFO - 2026-03-18 16:15:51 --> themesMemory usage: 8388608
DEBUG - 2026-03-18 16:15:51 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-18 16:15:51 --> [REQ_ID=0d8a23c2c4c9] [FILTER_AFTER]
DEBUG - 2026-03-18 16:15:51 --> [REQ_ID=0d8a23c2c4c9] [LIFECYCLE][END] status=200 duration_ms=1,055.88 memory_delta=4194304
INFO - 2026-03-18 16:15:51 --> [REQ_ID=aeb89d2dea4c] [PERF] Execution time=1.054351
DEBUG - 2026-03-18 16:15:51 --> [REQ_ID=0d8a23c2c4c9] [REQUEST][END]
INFO - 2026-03-18 16:15:51 --> [REQ_ID=0d8a23c2c4c9] [PERF] Execution time=1.067122
DEBUG - 2026-03-18 16:16:22 --> [REQ_ID=da36357eef02] [REQUEST][START] HEAD /
DEBUG - 2026-03-18 16:16:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-18 16:16:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-18 16:16:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-18 16:16:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-18 16:16:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-18 16:21:22 --> [REQ_ID=6911511d32a2] [REQUEST][START] HEAD /
DEBUG - 2026-03-18 16:21:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-18 16:21:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-18 16:21:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-18 16:21:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-18 16:21:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-18 16:26:22 --> [REQ_ID=47617db4487b] [REQUEST][START] HEAD /
DEBUG - 2026-03-18 16:26:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-18 16:26:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-18 16:26:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-18 16:26:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-18 16:26:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-18 16:31:22 --> [REQ_ID=8ff32edc6355] [REQUEST][START] HEAD /
DEBUG - 2026-03-18 16:31:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-18 16:31:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-18 16:31:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-18 16:31:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-18 16:31:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-18 16:36:22 --> [REQ_ID=08c23f66777b] [REQUEST][START] HEAD /
DEBUG - 2026-03-18 16:36:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-18 16:36:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-18 16:36:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-18 16:36:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-18 16:36:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-18 16:41:22 --> [REQ_ID=cd6863d7155a] [REQUEST][START] HEAD /
DEBUG - 2026-03-18 16:41:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-18 16:41:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-18 16:41:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-18 16:41:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-18 16:41:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-18 16:46:22 --> [REQ_ID=a9a6a02d655a] [REQUEST][START] HEAD /
DEBUG - 2026-03-18 16:46:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-18 16:46:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-18 16:46:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-18 16:46:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-18 16:46:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-18 16:51:22 --> [REQ_ID=0eb7a2065932] [REQUEST][START] HEAD /
DEBUG - 2026-03-18 16:51:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-18 16:51:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-18 16:51:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-18 16:51:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-18 16:51:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-18 16:56:22 --> [REQ_ID=5d129ed06d78] [REQUEST][START] HEAD /
DEBUG - 2026-03-18 16:56:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-18 16:56:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-18 16:56:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-18 16:56:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-18 16:56:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-18 17:00:02 --> [REQ_ID=5bf3033f75a6] [REQUEST][START] GET /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-18 17:00:02 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-18 17:00:02 --> [REQ_ID=5bf3033f75a6] [FILTER_BEFORE] /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-18 17:00:02 --> [REQ_ID=5bf3033f75a6] [ROUTE] Controller=\App\Modules\Management\Controllers\ManagementAPIController Method=Run_CRON_Tasks
DEBUG - 2026-03-18 17:00:02 --> [REQ_ID=5bf3033f75a6] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-18 17:00:02 --> [REQ_ID=5bf3033f75a6] [REQUEST][END]
INFO - 2026-03-18 17:00:02 --> [REQ_ID=5bf3033f75a6] [PERF] Execution time=0.058276
DEBUG - 2026-03-18 17:01:22 --> [REQ_ID=4ae8d2ccae4c] [REQUEST][START] HEAD /
DEBUG - 2026-03-18 17:01:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-18 17:01:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-18 17:01:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-18 17:01:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-18 17:01:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-18 17:06:22 --> [REQ_ID=e4083c5cf812] [REQUEST][START] HEAD /
DEBUG - 2026-03-18 17:06:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-18 17:06:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-18 17:06:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-18 17:06:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-18 17:06:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-18 17:11:22 --> [REQ_ID=e8241c28bec6] [REQUEST][START] HEAD /
DEBUG - 2026-03-18 17:11:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-18 17:11:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-18 17:11:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-18 17:11:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-18 17:11:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-18 17:15:02 --> [REQ_ID=a800978325b4] [REQUEST][START] GET /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-18 17:15:02 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-18 17:15:02 --> [REQ_ID=a800978325b4] [FILTER_BEFORE] /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-18 17:15:02 --> [REQ_ID=a800978325b4] [ROUTE] Controller=\App\Modules\APIs\Controllers\AlertsAPIController Method=fetchEmailAlerts
DEBUG - 2026-03-18 17:15:02 --> [REQ_ID=a800978325b4] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-18 17:15:02 --> [REQ_ID=a800978325b4] [REQUEST][END]
INFO - 2026-03-18 17:15:02 --> [REQ_ID=a800978325b4] [PERF] Execution time=0.046053
DEBUG - 2026-03-18 17:16:22 --> [REQ_ID=eb9864c468a7] [REQUEST][START] HEAD /
DEBUG - 2026-03-18 17:16:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-18 17:16:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-18 17:16:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-18 17:16:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-18 17:16:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-18 17:21:22 --> [REQ_ID=1f6d9541d282] [REQUEST][START] HEAD /
DEBUG - 2026-03-18 17:21:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-18 17:21:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-18 17:21:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-18 17:21:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-18 17:21:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-18 17:26:22 --> [REQ_ID=4e90573621f3] [REQUEST][START] HEAD /
DEBUG - 2026-03-18 17:26:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-18 17:26:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-18 17:26:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-18 17:26:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-18 17:26:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-18 17:31:22 --> [REQ_ID=81d3490ae37b] [REQUEST][START] HEAD /
DEBUG - 2026-03-18 17:31:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-18 17:31:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-18 17:31:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-18 17:31:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-18 17:31:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-18 17:36:22 --> [REQ_ID=19ec0aa32de8] [REQUEST][START] HEAD /
DEBUG - 2026-03-18 17:36:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-18 17:36:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-18 17:36:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-18 17:36:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-18 17:36:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-18 17:41:22 --> [REQ_ID=8a0bb5cd8712] [REQUEST][START] HEAD /
DEBUG - 2026-03-18 17:41:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-18 17:41:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-18 17:41:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-18 17:41:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-18 17:41:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-18 17:46:22 --> [REQ_ID=cff807d45ea6] [REQUEST][START] HEAD /
DEBUG - 2026-03-18 17:46:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-18 17:46:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-18 17:46:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-18 17:46:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-18 17:46:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-18 17:51:22 --> [REQ_ID=e2f56d15ad59] [REQUEST][START] HEAD /
DEBUG - 2026-03-18 17:51:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-18 17:51:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-18 17:51:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-18 17:51:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-18 17:51:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-18 17:53:00 --> [REQ_ID=1faedaf16c5c] [REQUEST][START] HEAD /
DEBUG - 2026-03-18 17:53:00 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-18 17:53:00 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-18 17:53:01 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-18 17:53:01 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-18 17:53:01 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://mymiwallet.com/
DEBUG - 2026-03-18 17:56:22 --> [REQ_ID=759db75bcebe] [REQUEST][START] HEAD /
DEBUG - 2026-03-18 17:56:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-18 17:56:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-18 17:56:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-18 17:56:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-18 17:56:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-18 18:00:01 --> [REQ_ID=e18f6b87bce1] [REQUEST][START] GET /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-18 18:00:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-18 18:00:01 --> [REQ_ID=e18f6b87bce1] [FILTER_BEFORE] /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-18 18:00:01 --> [REQ_ID=e18f6b87bce1] [ROUTE] Controller=\App\Modules\Management\Controllers\ManagementAPIController Method=Run_CRON_Tasks
DEBUG - 2026-03-18 18:00:01 --> [REQ_ID=e18f6b87bce1] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-18 18:00:01 --> [REQ_ID=e18f6b87bce1] [REQUEST][END]
INFO - 2026-03-18 18:00:01 --> [REQ_ID=e18f6b87bce1] [PERF] Execution time=0.036223
DEBUG - 2026-03-18 18:01:22 --> [REQ_ID=46c399bd3697] [REQUEST][START] HEAD /
DEBUG - 2026-03-18 18:01:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-18 18:01:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-18 18:01:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-18 18:01:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-18 18:01:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-18 18:06:22 --> [REQ_ID=21176d280ef6] [REQUEST][START] HEAD /
DEBUG - 2026-03-18 18:06:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-18 18:06:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-18 18:06:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-18 18:06:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-18 18:06:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-18 18:11:22 --> [REQ_ID=c526e799f35a] [REQUEST][START] HEAD /
DEBUG - 2026-03-18 18:11:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-18 18:11:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-18 18:11:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-18 18:11:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-18 18:11:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-18 18:15:01 --> [REQ_ID=f820173d68dc] [REQUEST][START] GET /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-18 18:15:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-18 18:15:01 --> [REQ_ID=f820173d68dc] [FILTER_BEFORE] /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-18 18:15:01 --> [REQ_ID=f820173d68dc] [ROUTE] Controller=\App\Modules\APIs\Controllers\AlertsAPIController Method=fetchEmailAlerts
DEBUG - 2026-03-18 18:15:01 --> [REQ_ID=f820173d68dc] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-18 18:15:01 --> [REQ_ID=f820173d68dc] [REQUEST][END]
INFO - 2026-03-18 18:15:01 --> [REQ_ID=f820173d68dc] [PERF] Execution time=0.047819
DEBUG - 2026-03-18 18:16:22 --> [REQ_ID=46981a3b9ec8] [REQUEST][START] HEAD /
DEBUG - 2026-03-18 18:16:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-18 18:16:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-18 18:16:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-18 18:16:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-18 18:16:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-18 18:21:22 --> [REQ_ID=8eb2c77b1d5b] [REQUEST][START] HEAD /
DEBUG - 2026-03-18 18:21:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-18 18:21:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-18 18:21:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-18 18:21:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-18 18:21:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-18 18:22:57 --> [REQ_ID=1993a31f45fc] [REQUEST][START] GET /
DEBUG - 2026-03-18 18:22:57 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-18 18:22:57 --> [REQ_ID=1993a31f45fc] [REQUEST][END]
INFO - 2026-03-18 18:22:57 --> [REQ_ID=1993a31f45fc] [PERF] Execution time=0.038399
DEBUG - 2026-03-18 18:26:22 --> [REQ_ID=14d3a242314d] [REQUEST][START] HEAD /
DEBUG - 2026-03-18 18:26:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-18 18:26:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-18 18:26:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-18 18:26:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-18 18:26:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-18 18:30:15 --> [REQ_ID=c5c28275653f] [REQUEST][START] GET /
DEBUG - 2026-03-18 18:30:15 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-18 18:30:15 --> [REQ_ID=c5c28275653f] [FILTER_BEFORE] /
DEBUG - 2026-03-18 18:30:15 --> [REQ_ID=c5c28275653f] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-18 18:30:15 --> [REQ_ID=c5c28275653f] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-18 18:30:15 --> [CSRF] token name=csrf_test_name hash=18dbc81fb8ce0f307bfe4f7e10034b25
DEBUG - 2026-03-18 18:30:15 --> [REQ_ID=e760f834c8a5] [INIT] App\Controllers\Home::GET
INFO - 2026-03-18 18:30:15 --> [REQ_ID=e760f834c8a5] [MEMORY][controller-start] 6291456
INFO - 2026-03-18 18:30:15 --> [REQ_ID=e760f834c8a5] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-18 18:30:15 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-18 18:30:16 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-03-18 18:30:16 --> [REQ_ID=e760f834c8a5] [VIEW_RENDER] themes/public/home
INFO - 2026-03-18 18:30:16 --> [REQ_ID=e760f834c8a5] [MEMORY][commonData:start] 10485760
INFO - 2026-03-18 18:30:16 --> themesMemory usage: 10485760
DEBUG - 2026-03-18 18:30:16 --> [MetaService] slug= pageName=Home cacheHit= path=DB
DEBUG - 2026-03-18 18:30:16 --> [REQ_ID=c5c28275653f] [FILTER_AFTER]
DEBUG - 2026-03-18 18:30:16 --> [REQ_ID=c5c28275653f] [LIFECYCLE][END] status=200 duration_ms=924.91 memory_delta=4194304
INFO - 2026-03-18 18:30:16 --> [REQ_ID=e760f834c8a5] [PERF] Execution time=0.923996
DEBUG - 2026-03-18 18:30:16 --> [REQ_ID=c5c28275653f] [REQUEST][END]
INFO - 2026-03-18 18:30:16 --> [REQ_ID=c5c28275653f] [PERF] Execution time=0.966018
DEBUG - 2026-03-18 18:31:22 --> [REQ_ID=ccb62ebe669d] [REQUEST][START] HEAD /
DEBUG - 2026-03-18 18:31:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-18 18:31:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-18 18:31:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-18 18:31:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-18 18:31:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-18 18:36:22 --> [REQ_ID=7dc84524045d] [REQUEST][START] HEAD /
DEBUG - 2026-03-18 18:36:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-18 18:36:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-18 18:36:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-18 18:36:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-18 18:36:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-18 18:41:22 --> [REQ_ID=9d2999f699ee] [REQUEST][START] HEAD /
DEBUG - 2026-03-18 18:41:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-18 18:41:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-18 18:41:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-18 18:41:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-18 18:41:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-18 18:46:22 --> [REQ_ID=97c6ff34caa1] [REQUEST][START] HEAD /
DEBUG - 2026-03-18 18:46:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-18 18:46:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-18 18:46:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-18 18:46:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-18 18:46:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-18 18:51:22 --> [REQ_ID=0362a610ba50] [REQUEST][START] HEAD /
DEBUG - 2026-03-18 18:51:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-18 18:51:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-18 18:51:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-18 18:51:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-18 18:51:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-18 18:55:14 --> [REQ_ID=bca53f23a66e] [REQUEST][START] GET /index.php/How-It-Works/MyMI-Gold
DEBUG - 2026-03-18 18:55:14 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-18 18:55:14 --> [REQ_ID=bca53f23a66e] [FILTER_BEFORE] /index.php/How-It-Works/MyMI-Gold
DEBUG - 2026-03-18 18:55:14 --> [REQ_ID=bca53f23a66e] [ROUTE] Controller=\App\Modules\Blog\Controllers\HowItWorksController Method=MyMIGold
DEBUG - 2026-03-18 18:55:14 --> [REQ_ID=bca53f23a66e] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/How-It-Works/MyMI-Gold
DEBUG - 2026-03-18 18:55:14 --> [CSRF] token name=csrf_test_name hash=48b01c3ee8229f0f263627e526ed1328
DEBUG - 2026-03-18 18:55:14 --> [REQ_ID=9e9312735baf] [INIT] App\Modules\Blog\Controllers\HowItWorksController::GET
INFO - 2026-03-18 18:55:14 --> [REQ_ID=9e9312735baf] [MEMORY][controller-start] 6291456
DEBUG - 2026-03-18 18:55:15 --> [REQ_ID=9e9312735baf] [METHOD_ENTRY] MyMIGold
DEBUG - 2026-03-18 18:55:15 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-18 18:55:15 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-18 18:55:15 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-18 18:55:15 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-18 18:55:15 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-18 18:55:15 --> MyMICoin: guest context detected; skipping user-specific preload.
INFO - 2026-03-18 18:55:15 --> [REQ_ID=9e9312735baf] [MEMORY][commonData:start] 6291456
INFO - 2026-03-18 18:55:15 --> themesMemory usage: 10485760
DEBUG - 2026-03-18 18:55:15 --> [MetaService] slug=how-it-works/mymi-gold pageName= cacheHit= path=DB
DEBUG - 2026-03-18 18:55:15 --> [REQ_ID=bca53f23a66e] [FILTER_AFTER]
DEBUG - 2026-03-18 18:55:15 --> [REQ_ID=bca53f23a66e] [LIFECYCLE][END] status=200 duration_ms=1,027.45 memory_delta=4194304
INFO - 2026-03-18 18:55:15 --> [REQ_ID=9e9312735baf] [PERF] Execution time=1.025528
DEBUG - 2026-03-18 18:55:15 --> [REQ_ID=bca53f23a66e] [REQUEST][END]
INFO - 2026-03-18 18:55:15 --> [REQ_ID=bca53f23a66e] [PERF] Execution time=1.071570
DEBUG - 2026-03-18 18:56:22 --> [REQ_ID=0b144b839478] [REQUEST][START] HEAD /
DEBUG - 2026-03-18 18:56:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-18 18:56:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-18 18:56:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-18 18:56:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-18 18:56:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-18 18:59:03 --> [REQ_ID=52f827ea30a4] [REQUEST][START] GET /index.php/News/After-Hours-Movers/November-17th-2021
DEBUG - 2026-03-18 18:59:03 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-18 18:59:03 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: GET, Route: News/After-Hours-Movers/November-17th-2021]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-18 18:59:03 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-18 18:59:03 --> [404] URI=https://www.mymiwallet.com/index.php/News/After-Hours-Movers/November-17th-2021
WARNING - 2026-03-18 18:59:03 --> 404 route miss: https://www.mymiwallet.com/index.php/News/After-Hours-Movers/November-17th-2021 | referrer: none
ERROR - 2026-03-18 18:59:03 --> [ERROR_PAGE] event=error_404 status=404 message=Page not found.
DEBUG - 2026-03-18 19:00:01 --> [REQ_ID=a34e1091d533] [REQUEST][START] GET /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-18 19:00:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-18 19:00:01 --> [REQ_ID=a34e1091d533] [FILTER_BEFORE] /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-18 19:00:01 --> [REQ_ID=a34e1091d533] [ROUTE] Controller=\App\Modules\Management\Controllers\ManagementAPIController Method=Run_CRON_Tasks
DEBUG - 2026-03-18 19:00:01 --> [REQ_ID=a34e1091d533] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-18 19:00:01 --> [REQ_ID=a34e1091d533] [REQUEST][END]
INFO - 2026-03-18 19:00:01 --> [REQ_ID=a34e1091d533] [PERF] Execution time=0.015949
DEBUG - 2026-03-18 19:01:22 --> [REQ_ID=9279cd95f206] [REQUEST][START] HEAD /
DEBUG - 2026-03-18 19:01:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-18 19:01:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-18 19:01:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-18 19:01:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-18 19:01:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-18 19:06:22 --> [REQ_ID=22de287bcb07] [REQUEST][START] HEAD /
DEBUG - 2026-03-18 19:06:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-18 19:06:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-18 19:06:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-18 19:06:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-18 19:06:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-18 19:11:22 --> [REQ_ID=ae4ce12bd5d1] [REQUEST][START] HEAD /
DEBUG - 2026-03-18 19:11:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-18 19:11:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-18 19:11:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-18 19:11:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-18 19:11:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-18 19:14:12 --> [REQ_ID=38f10becd0f8] [REQUEST][START] GET /index.php/Knowledgebase/Technical-Support
DEBUG - 2026-03-18 19:14:12 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-18 19:14:12 --> [REQ_ID=38f10becd0f8] [REQUEST][END]
INFO - 2026-03-18 19:14:12 --> [REQ_ID=38f10becd0f8] [PERF] Execution time=0.042750
DEBUG - 2026-03-18 19:14:47 --> [REQ_ID=a68d4aadf1ff] [REQUEST][START] GET /index.php/How-It-Works/Setting-Financial-Goals
DEBUG - 2026-03-18 19:14:47 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-18 19:14:47 --> [REQ_ID=a68d4aadf1ff] [FILTER_BEFORE] /index.php/How-It-Works/Setting-Financial-Goals
DEBUG - 2026-03-18 19:14:47 --> [REQ_ID=a68d4aadf1ff] [ROUTE] Controller=\App\Modules\Blog\Controllers\HowItWorksController Method=SettingFinancialGoals
DEBUG - 2026-03-18 19:14:47 --> [REQ_ID=a68d4aadf1ff] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/How-It-Works/Setting-Financial-Goals
DEBUG - 2026-03-18 19:14:47 --> [CSRF] token name=csrf_test_name hash=8bcf8249dd83f4052ab4a49016c6020c
DEBUG - 2026-03-18 19:14:47 --> [REQ_ID=5d6321a416d0] [INIT] App\Modules\Blog\Controllers\HowItWorksController::GET
INFO - 2026-03-18 19:14:47 --> [REQ_ID=5d6321a416d0] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-18 19:14:47 --> [REQ_ID=5d6321a416d0] [METHOD_ENTRY] SettingFinancialGoals
DEBUG - 2026-03-18 19:14:47 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-18 19:14:47 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-18 19:14:47 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-18 19:14:47 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-18 19:14:47 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-18 19:14:47 --> MyMICoin: guest context detected; skipping user-specific preload.
INFO - 2026-03-18 19:14:47 --> [REQ_ID=5d6321a416d0] [MEMORY][commonData:start] 6291456
INFO - 2026-03-18 19:14:48 --> themesMemory usage: 8388608
DEBUG - 2026-03-18 19:14:48 --> [MetaService] slug=how-it-works/setting-financial-goals pageName= cacheHit= path=DB
DEBUG - 2026-03-18 19:14:48 --> [REQ_ID=a68d4aadf1ff] [FILTER_AFTER]
DEBUG - 2026-03-18 19:14:48 --> [REQ_ID=a68d4aadf1ff] [LIFECYCLE][END] status=200 duration_ms=1,083.80 memory_delta=4194304
INFO - 2026-03-18 19:14:48 --> [REQ_ID=5d6321a416d0] [PERF] Execution time=1.080375
DEBUG - 2026-03-18 19:14:48 --> [REQ_ID=a68d4aadf1ff] [REQUEST][END]
INFO - 2026-03-18 19:14:48 --> [REQ_ID=a68d4aadf1ff] [PERF] Execution time=1.095401
DEBUG - 2026-03-18 19:15:01 --> [REQ_ID=d1e4b132740b] [REQUEST][START] GET /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-18 19:15:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-18 19:15:01 --> [REQ_ID=d1e4b132740b] [FILTER_BEFORE] /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-18 19:15:01 --> [REQ_ID=d1e4b132740b] [ROUTE] Controller=\App\Modules\APIs\Controllers\AlertsAPIController Method=fetchEmailAlerts
DEBUG - 2026-03-18 19:15:01 --> [REQ_ID=d1e4b132740b] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-18 19:15:01 --> [REQ_ID=d1e4b132740b] [REQUEST][END]
INFO - 2026-03-18 19:15:01 --> [REQ_ID=d1e4b132740b] [PERF] Execution time=0.016787
DEBUG - 2026-03-18 19:16:22 --> [REQ_ID=040234fcf924] [REQUEST][START] HEAD /
DEBUG - 2026-03-18 19:16:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-18 19:16:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-18 19:16:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-18 19:16:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-18 19:16:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-18 19:21:22 --> [REQ_ID=1295ad47821e] [REQUEST][START] HEAD /
DEBUG - 2026-03-18 19:21:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-18 19:21:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-18 19:21:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-18 19:21:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-18 19:21:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-18 19:26:22 --> [REQ_ID=81a6ced2d56c] [REQUEST][START] HEAD /
DEBUG - 2026-03-18 19:26:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-18 19:26:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-18 19:26:23 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-18 19:26:23 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-18 19:26:23 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-18 19:31:22 --> [REQ_ID=86e1bf7a3df8] [REQUEST][START] HEAD /
DEBUG - 2026-03-18 19:31:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-18 19:31:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-18 19:31:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-18 19:31:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-18 19:31:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-18 19:34:20 --> [REQ_ID=f78fe53fe7ea] [REQUEST][START] GET /index.php/How-It-Works/MyMI-Exchange
DEBUG - 2026-03-18 19:34:20 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-18 19:34:20 --> [REQ_ID=f78fe53fe7ea] [FILTER_BEFORE] /index.php/How-It-Works/MyMI-Exchange
DEBUG - 2026-03-18 19:34:20 --> [REQ_ID=f78fe53fe7ea] [ROUTE] Controller=\App\Modules\Blog\Controllers\HowItWorksController Method=show
DEBUG - 2026-03-18 19:34:20 --> [REQ_ID=f78fe53fe7ea] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/How-It-Works/MyMI-Exchange
DEBUG - 2026-03-18 19:34:20 --> [CSRF] token name=csrf_test_name hash=f214f574b4af14c718ce57bf6463b2d7
DEBUG - 2026-03-18 19:34:20 --> [REQ_ID=db1a9231423e] [INIT] App\Modules\Blog\Controllers\HowItWorksController::GET
INFO - 2026-03-18 19:34:20 --> [REQ_ID=db1a9231423e] [MEMORY][controller-start] 6291456
DEBUG - 2026-03-18 19:34:20 --> [REQ_ID=db1a9231423e] [METHOD_ENTRY] show
DEBUG - 2026-03-18 19:34:20 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-18 19:34:20 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-18 19:34:20 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-18 19:34:20 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-18 19:34:20 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-18 19:34:20 --> MyMICoin: guest context detected; skipping user-specific preload.
ERROR - 2026-03-18 19:34:20 --> HowItWorksController failure: Call to undefined method App\Modules\Blog\Controllers\HowItWorksController::respondWithRendered()
INFO - 2026-03-18 19:34:20 --> [REQ_ID=db1a9231423e] [PERF] Execution time=0.226214
DEBUG - 2026-03-18 19:36:22 --> [REQ_ID=bd52ed083369] [REQUEST][START] HEAD /
DEBUG - 2026-03-18 19:36:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-18 19:36:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-18 19:36:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-18 19:36:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-18 19:36:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-18 19:41:22 --> [REQ_ID=7d35edcbca1e] [REQUEST][START] HEAD /
DEBUG - 2026-03-18 19:41:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-18 19:41:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-18 19:41:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-18 19:41:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-18 19:41:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-18 19:44:44 --> [REQ_ID=71fb1a2b0695] [REQUEST][START] GET /index.php/Features/Advanced-Investment-Portfoio-Manager
DEBUG - 2026-03-18 19:44:44 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
INFO - 2026-03-18 19:44:44 --> REDIRECTED ROUTE at https://www.mymiwallet.com/Features/Advanced-Investment-Portfolio-Manager
DEBUG - 2026-03-18 19:44:44 --> [REQ_ID=71fb1a2b0695] [REQUEST][END]
INFO - 2026-03-18 19:44:44 --> [REQ_ID=71fb1a2b0695] [PERF] Execution time=0.044454
DEBUG - 2026-03-18 19:46:22 --> [REQ_ID=82083f1a31f7] [REQUEST][START] HEAD /
DEBUG - 2026-03-18 19:46:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-18 19:46:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-18 19:46:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-18 19:46:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-18 19:46:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-18 19:51:22 --> [REQ_ID=c089ee8cfa7d] [REQUEST][START] HEAD /
DEBUG - 2026-03-18 19:51:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-18 19:51:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-18 19:51:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-18 19:51:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-18 19:51:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-18 19:54:18 --> [REQ_ID=4068c1ddc6ce] [REQUEST][START] GET /index.php/Premium-Features/Due-Diligence-Database
DEBUG - 2026-03-18 19:54:18 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
INFO - 2026-03-18 19:54:18 --> REDIRECTED ROUTE at https://www.mymiwallet.com/Features/Brokerage-Integrations
DEBUG - 2026-03-18 19:54:18 --> [REQ_ID=4068c1ddc6ce] [REQUEST][END]
INFO - 2026-03-18 19:54:18 --> [REQ_ID=4068c1ddc6ce] [PERF] Execution time=0.037366
DEBUG - 2026-03-18 19:56:22 --> [REQ_ID=0edefd81fe98] [REQUEST][START] HEAD /
DEBUG - 2026-03-18 19:56:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-18 19:56:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-18 19:56:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-18 19:56:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-18 19:56:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-18 20:00:01 --> [REQ_ID=42af3d45e0de] [REQUEST][START] GET /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-18 20:00:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-18 20:00:01 --> [REQ_ID=42af3d45e0de] [FILTER_BEFORE] /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-18 20:00:01 --> [REQ_ID=42af3d45e0de] [ROUTE] Controller=\App\Modules\Management\Controllers\ManagementAPIController Method=Run_CRON_Tasks
DEBUG - 2026-03-18 20:00:01 --> [REQ_ID=42af3d45e0de] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-18 20:00:01 --> [REQ_ID=42af3d45e0de] [REQUEST][END]
INFO - 2026-03-18 20:00:01 --> [REQ_ID=42af3d45e0de] [PERF] Execution time=0.044302
DEBUG - 2026-03-18 20:01:22 --> [REQ_ID=7173ef05860a] [REQUEST][START] HEAD /
DEBUG - 2026-03-18 20:01:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-18 20:01:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-18 20:01:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-18 20:01:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-18 20:01:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-18 20:06:22 --> [REQ_ID=054cd45b2c1d] [REQUEST][START] HEAD /
DEBUG - 2026-03-18 20:06:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-18 20:06:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-18 20:06:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-18 20:06:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-18 20:06:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-18 20:08:26 --> [REQ_ID=53ff4311b1c9] [REQUEST][START] GET /
DEBUG - 2026-03-18 20:08:26 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-18 20:08:26 --> [REQ_ID=53ff4311b1c9] [FILTER_BEFORE] /
DEBUG - 2026-03-18 20:08:26 --> [REQ_ID=53ff4311b1c9] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-18 20:08:26 --> [REQ_ID=53ff4311b1c9] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-18 20:08:26 --> [CSRF] token name=csrf_test_name hash=406290249bd4b08ee3fcebc18c02a473
DEBUG - 2026-03-18 20:08:26 --> [REQ_ID=f6399597ae93] [INIT] App\Controllers\Home::GET
INFO - 2026-03-18 20:08:26 --> [REQ_ID=f6399597ae93] [MEMORY][controller-start] 6291456
INFO - 2026-03-18 20:08:26 --> [REQ_ID=f6399597ae93] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-18 20:08:26 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-18 20:08:27 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-03-18 20:08:27 --> [REQ_ID=f6399597ae93] [VIEW_RENDER] themes/public/home
INFO - 2026-03-18 20:08:27 --> [REQ_ID=f6399597ae93] [MEMORY][commonData:start] 10485760
INFO - 2026-03-18 20:08:27 --> themesMemory usage: 10485760
DEBUG - 2026-03-18 20:08:27 --> [MetaService] slug= pageName=Home cacheHit= path=DB
DEBUG - 2026-03-18 20:08:27 --> [REQ_ID=53ff4311b1c9] [FILTER_AFTER]
DEBUG - 2026-03-18 20:08:27 --> [REQ_ID=53ff4311b1c9] [LIFECYCLE][END] status=200 duration_ms=976.04 memory_delta=4194304
INFO - 2026-03-18 20:08:27 --> [REQ_ID=f6399597ae93] [PERF] Execution time=0.973687
DEBUG - 2026-03-18 20:08:27 --> [REQ_ID=53ff4311b1c9] [REQUEST][END]
INFO - 2026-03-18 20:08:27 --> [REQ_ID=53ff4311b1c9] [PERF] Execution time=1.015995
DEBUG - 2026-03-18 20:11:22 --> [REQ_ID=7935c6099d7d] [REQUEST][START] HEAD /
DEBUG - 2026-03-18 20:11:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-18 20:11:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-18 20:11:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-18 20:11:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-18 20:11:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-18 20:15:01 --> [REQ_ID=dc7d1017cde4] [REQUEST][START] GET /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-18 20:15:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-18 20:15:01 --> [REQ_ID=dc7d1017cde4] [FILTER_BEFORE] /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-18 20:15:01 --> [REQ_ID=dc7d1017cde4] [ROUTE] Controller=\App\Modules\APIs\Controllers\AlertsAPIController Method=fetchEmailAlerts
DEBUG - 2026-03-18 20:15:01 --> [REQ_ID=dc7d1017cde4] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-18 20:15:01 --> [REQ_ID=dc7d1017cde4] [REQUEST][END]
INFO - 2026-03-18 20:15:01 --> [REQ_ID=dc7d1017cde4] [PERF] Execution time=0.049065
DEBUG - 2026-03-18 20:16:22 --> [REQ_ID=cb2ade60e9f0] [REQUEST][START] HEAD /
DEBUG - 2026-03-18 20:16:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-18 20:16:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-18 20:16:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-18 20:16:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-18 20:16:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-18 20:21:22 --> [REQ_ID=85e1a00591b5] [REQUEST][START] HEAD /
DEBUG - 2026-03-18 20:21:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-18 20:21:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-18 20:21:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-18 20:21:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-18 20:21:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-18 20:25:09 --> [REQ_ID=13a1638f334d] [REQUEST][START] GET /index.php/Subscribe/Daily-Financial-News
DEBUG - 2026-03-18 20:25:09 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-18 20:25:09 --> [REQ_ID=13a1638f334d] [REQUEST][END]
INFO - 2026-03-18 20:25:09 --> [REQ_ID=13a1638f334d] [PERF] Execution time=0.037611
DEBUG - 2026-03-18 20:26:22 --> [REQ_ID=c430e2aa3f83] [REQUEST][START] HEAD /
DEBUG - 2026-03-18 20:26:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-18 20:26:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-18 20:26:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-18 20:26:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-18 20:26:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-18 20:31:22 --> [REQ_ID=c5170cab34a2] [REQUEST][START] HEAD /
DEBUG - 2026-03-18 20:31:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-18 20:31:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-18 20:31:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-18 20:31:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-18 20:31:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-18 20:32:21 --> [REQ_ID=9382ed91da0c] [REQUEST][START] GET /index.php/Knowledgebase/Investor-Profile
DEBUG - 2026-03-18 20:32:21 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-18 20:32:21 --> [REQ_ID=9382ed91da0c] [FILTER_BEFORE] /index.php/Knowledgebase/Investor-Profile
DEBUG - 2026-03-18 20:32:21 --> [REQ_ID=9382ed91da0c] [ROUTE] Controller=\App\Modules\User\Controllers\KnowledgebaseController Method=investorProfile
DEBUG - 2026-03-18 20:32:21 --> [REQ_ID=9382ed91da0c] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Knowledgebase/Investor-Profile
DEBUG - 2026-03-18 20:32:21 --> [CSRF] token name=csrf_test_name hash=883c22497b13830e8dad8689c185b18d
DEBUG - 2026-03-18 20:32:21 --> [REQ_ID=9382ed91da0c] [REQUEST][END]
INFO - 2026-03-18 20:32:21 --> [REQ_ID=9382ed91da0c] [PERF] Execution time=0.032126
DEBUG - 2026-03-18 20:32:22 --> [REQ_ID=8af157f3cff2] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-18 20:32:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-18 20:32:22 --> [REQ_ID=8af157f3cff2] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-18 20:32:22 --> [REQ_ID=8af157f3cff2] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-18 20:32:22 --> [REQ_ID=8af157f3cff2] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-18 20:32:22 --> [CSRF] token name=csrf_test_name hash=7bad396b8acd9f582808ec374bd9c8a7
DEBUG - 2026-03-18 20:32:22 --> [REQ_ID=d09322e6993d] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-18 20:32:22 --> [REQ_ID=d09322e6993d] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-18 20:32:22 --> [REQ_ID=8af157f3cff2] [FILTER_AFTER]
DEBUG - 2026-03-18 20:32:22 --> [REQ_ID=8af157f3cff2] [LIFECYCLE][END] status=200 duration_ms=41.28 memory_delta=0
INFO - 2026-03-18 20:32:22 --> [REQ_ID=d09322e6993d] [PERF] Execution time=0.038996
DEBUG - 2026-03-18 20:32:22 --> [REQ_ID=8af157f3cff2] [REQUEST][END]
INFO - 2026-03-18 20:32:22 --> [REQ_ID=8af157f3cff2] [PERF] Execution time=0.057948
DEBUG - 2026-03-18 20:36:18 --> [REQ_ID=09df6ab364fb] [REQUEST][START] GET /index.php/Account/Activity
DEBUG - 2026-03-18 20:36:18 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-18 20:36:18 --> [REQ_ID=09df6ab364fb] [REQUEST][END]
INFO - 2026-03-18 20:36:18 --> [REQ_ID=09df6ab364fb] [PERF] Execution time=0.043852
DEBUG - 2026-03-18 20:36:22 --> [REQ_ID=2affe37c3ef1] [REQUEST][START] HEAD /
DEBUG - 2026-03-18 20:36:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-18 20:36:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-18 20:36:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-18 20:36:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-18 20:36:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-18 20:41:22 --> [REQ_ID=78873199ab5c] [REQUEST][START] HEAD /
DEBUG - 2026-03-18 20:41:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-18 20:41:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-18 20:41:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-18 20:41:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-18 20:41:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-18 20:46:22 --> [REQ_ID=047b44c6dc17] [REQUEST][START] HEAD /
DEBUG - 2026-03-18 20:46:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-18 20:46:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-18 20:46:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-18 20:46:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-18 20:46:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-18 20:47:46 --> [REQ_ID=ea2f7d20cfcd] [REQUEST][START] GET /
DEBUG - 2026-03-18 20:47:46 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-18 20:47:46 --> [REQ_ID=ea2f7d20cfcd] [FILTER_BEFORE] /
DEBUG - 2026-03-18 20:47:46 --> [REQ_ID=ea2f7d20cfcd] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-18 20:47:46 --> [REQ_ID=ea2f7d20cfcd] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-18 20:47:46 --> [CSRF] token name=csrf_test_name hash=6891c3b1b1bd20f5a7a711462f2b4f1e
DEBUG - 2026-03-18 20:47:46 --> [REQ_ID=561007e7190b] [INIT] App\Controllers\Home::GET
INFO - 2026-03-18 20:47:46 --> [REQ_ID=561007e7190b] [MEMORY][controller-start] 6291456
INFO - 2026-03-18 20:47:46 --> [REQ_ID=561007e7190b] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-18 20:47:46 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-18 20:47:47 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-03-18 20:47:47 --> [REQ_ID=561007e7190b] [VIEW_RENDER] themes/public/home
INFO - 2026-03-18 20:47:47 --> [REQ_ID=561007e7190b] [MEMORY][commonData:start] 10485760
INFO - 2026-03-18 20:47:47 --> themesMemory usage: 10485760
DEBUG - 2026-03-18 20:47:47 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-18 20:47:47 --> [REQ_ID=ea2f7d20cfcd] [FILTER_AFTER]
DEBUG - 2026-03-18 20:47:47 --> [REQ_ID=ea2f7d20cfcd] [LIFECYCLE][END] status=200 duration_ms=1,097.24 memory_delta=4194304
INFO - 2026-03-18 20:47:47 --> [REQ_ID=561007e7190b] [PERF] Execution time=1.095502
DEBUG - 2026-03-18 20:47:47 --> [REQ_ID=ea2f7d20cfcd] [REQUEST][END]
INFO - 2026-03-18 20:47:47 --> [REQ_ID=ea2f7d20cfcd] [PERF] Execution time=1.139412
DEBUG - 2026-03-18 20:51:22 --> [REQ_ID=8e863643299c] [REQUEST][START] HEAD /
DEBUG - 2026-03-18 20:51:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-18 20:51:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-18 20:51:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-18 20:51:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-18 20:51:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-18 20:56:22 --> [REQ_ID=27c41e5132e4] [REQUEST][START] HEAD /
DEBUG - 2026-03-18 20:56:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-18 20:56:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-18 20:56:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-18 20:56:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-18 20:56:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-18 21:00:01 --> [REQ_ID=fe4fef79b385] [REQUEST][START] GET /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-18 21:00:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-18 21:00:01 --> [REQ_ID=fe4fef79b385] [FILTER_BEFORE] /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-18 21:00:01 --> [REQ_ID=fe4fef79b385] [ROUTE] Controller=\App\Modules\Management\Controllers\ManagementAPIController Method=Run_CRON_Tasks
DEBUG - 2026-03-18 21:00:01 --> [REQ_ID=fe4fef79b385] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-18 21:00:02 --> [REQ_ID=fe4fef79b385] [REQUEST][END]
INFO - 2026-03-18 21:00:02 --> [REQ_ID=fe4fef79b385] [PERF] Execution time=0.050924
DEBUG - 2026-03-18 21:01:22 --> [REQ_ID=6d1208bdac18] [REQUEST][START] HEAD /
DEBUG - 2026-03-18 21:01:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-18 21:01:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-18 21:01:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-18 21:01:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-18 21:01:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-18 21:06:22 --> [REQ_ID=0242ceee6241] [REQUEST][START] HEAD /
DEBUG - 2026-03-18 21:06:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-18 21:06:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-18 21:06:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-18 21:06:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-18 21:06:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-18 21:11:22 --> [REQ_ID=82f799093f10] [REQUEST][START] HEAD /
DEBUG - 2026-03-18 21:11:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-18 21:11:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-18 21:11:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-18 21:11:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-18 21:11:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-18 21:15:01 --> [REQ_ID=afe4d612ff44] [REQUEST][START] GET /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-18 21:15:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-18 21:15:01 --> [REQ_ID=afe4d612ff44] [FILTER_BEFORE] /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-18 21:15:01 --> [REQ_ID=afe4d612ff44] [ROUTE] Controller=\App\Modules\APIs\Controllers\AlertsAPIController Method=fetchEmailAlerts
DEBUG - 2026-03-18 21:15:01 --> [REQ_ID=afe4d612ff44] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-18 21:15:01 --> [REQ_ID=afe4d612ff44] [REQUEST][END]
INFO - 2026-03-18 21:15:01 --> [REQ_ID=afe4d612ff44] [PERF] Execution time=0.045532
DEBUG - 2026-03-18 21:16:22 --> [REQ_ID=c279df2e0aae] [REQUEST][START] HEAD /
DEBUG - 2026-03-18 21:16:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-18 21:16:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-18 21:16:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-18 21:16:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-18 21:16:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-18 21:17:44 --> [REQ_ID=dee1af22eeaf] [REQUEST][START] GET /
DEBUG - 2026-03-18 21:17:44 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-18 21:17:44 --> [REQ_ID=dee1af22eeaf] [FILTER_BEFORE] /
DEBUG - 2026-03-18 21:17:44 --> [REQ_ID=dee1af22eeaf] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-18 21:17:44 --> [REQ_ID=dee1af22eeaf] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-18 21:17:44 --> [CSRF] token name=csrf_test_name hash=d00c73df1c15c81b1b9fad4448c4066b
DEBUG - 2026-03-18 21:17:44 --> [REQ_ID=11e7a031057a] [INIT] App\Controllers\Home::GET
INFO - 2026-03-18 21:17:44 --> [REQ_ID=11e7a031057a] [MEMORY][controller-start] 4194304
INFO - 2026-03-18 21:17:45 --> [REQ_ID=11e7a031057a] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-18 21:17:45 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-18 21:17:45 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-03-18 21:17:45 --> [REQ_ID=11e7a031057a] [VIEW_RENDER] themes/public/home
INFO - 2026-03-18 21:17:45 --> [REQ_ID=11e7a031057a] [MEMORY][commonData:start] 8388608
INFO - 2026-03-18 21:17:45 --> themesMemory usage: 8388608
DEBUG - 2026-03-18 21:17:45 --> [MetaService] slug= pageName=Home cacheHit= path=DB
DEBUG - 2026-03-18 21:17:45 --> [REQ_ID=dee1af22eeaf] [FILTER_AFTER]
DEBUG - 2026-03-18 21:17:45 --> [REQ_ID=dee1af22eeaf] [LIFECYCLE][END] status=200 duration_ms=839.42 memory_delta=4194304
INFO - 2026-03-18 21:17:45 --> [REQ_ID=11e7a031057a] [PERF] Execution time=0.837745
DEBUG - 2026-03-18 21:17:45 --> [REQ_ID=dee1af22eeaf] [REQUEST][END]
INFO - 2026-03-18 21:17:45 --> [REQ_ID=dee1af22eeaf] [PERF] Execution time=0.859649
DEBUG - 2026-03-18 21:21:22 --> [REQ_ID=f2be8414790b] [REQUEST][START] HEAD /
DEBUG - 2026-03-18 21:21:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-18 21:21:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-18 21:21:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-18 21:21:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-18 21:21:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-18 21:26:22 --> [REQ_ID=9c79a9e1a6cd] [REQUEST][START] HEAD /
DEBUG - 2026-03-18 21:26:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-18 21:26:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-18 21:26:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-18 21:26:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-18 21:26:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-18 21:31:22 --> [REQ_ID=2c83bb0aaec1] [REQUEST][START] HEAD /
DEBUG - 2026-03-18 21:31:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-18 21:31:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-18 21:31:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-18 21:31:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-18 21:31:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-18 21:32:59 --> [REQ_ID=2aad254501f8] [REQUEST][START] GET /index.php/Wallets/Purchase/Memberships/Basic
DEBUG - 2026-03-18 21:32:59 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-18 21:32:59 --> [REQ_ID=2aad254501f8] [REQUEST][END]
INFO - 2026-03-18 21:32:59 --> [REQ_ID=2aad254501f8] [PERF] Execution time=0.046772
DEBUG - 2026-03-18 21:36:22 --> [REQ_ID=190ca5644266] [REQUEST][START] HEAD /
DEBUG - 2026-03-18 21:36:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-18 21:36:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-18 21:36:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-18 21:36:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-18 21:36:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-18 21:39:06 --> [REQ_ID=1b7e082ad840] [REQUEST][START] GET /
DEBUG - 2026-03-18 21:39:06 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-18 21:39:06 --> [REQ_ID=1b7e082ad840] [FILTER_BEFORE] /
DEBUG - 2026-03-18 21:39:06 --> [REQ_ID=1b7e082ad840] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-18 21:39:06 --> [REQ_ID=1b7e082ad840] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-18 21:39:06 --> [CSRF] token name=csrf_test_name hash=bbe03e0da6762394cf01cb46eb4455f8
DEBUG - 2026-03-18 21:39:06 --> [REQ_ID=4c51a07f6d5b] [INIT] App\Controllers\Home::GET
INFO - 2026-03-18 21:39:06 --> [REQ_ID=4c51a07f6d5b] [MEMORY][controller-start] 6291456
INFO - 2026-03-18 21:39:06 --> [REQ_ID=4c51a07f6d5b] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-18 21:39:06 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-18 21:39:07 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-03-18 21:39:07 --> [REQ_ID=4c51a07f6d5b] [VIEW_RENDER] themes/public/home
INFO - 2026-03-18 21:39:07 --> [REQ_ID=4c51a07f6d5b] [MEMORY][commonData:start] 10485760
INFO - 2026-03-18 21:39:07 --> themesMemory usage: 10485760
DEBUG - 2026-03-18 21:39:07 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-18 21:39:07 --> [REQ_ID=1b7e082ad840] [FILTER_AFTER]
DEBUG - 2026-03-18 21:39:07 --> [REQ_ID=1b7e082ad840] [LIFECYCLE][END] status=200 duration_ms=997.74 memory_delta=4194304
INFO - 2026-03-18 21:39:07 --> [REQ_ID=4c51a07f6d5b] [PERF] Execution time=0.995836
DEBUG - 2026-03-18 21:39:07 --> [REQ_ID=1b7e082ad840] [REQUEST][END]
INFO - 2026-03-18 21:39:07 --> [REQ_ID=1b7e082ad840] [PERF] Execution time=1.040946
DEBUG - 2026-03-18 21:40:32 --> [REQ_ID=1875c6f72848] [REQUEST][START] GET /index.php/Memberships/Customize
DEBUG - 2026-03-18 21:40:32 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-18 21:40:32 --> [REQ_ID=1875c6f72848] [REQUEST][END]
INFO - 2026-03-18 21:40:32 --> [REQ_ID=1875c6f72848] [PERF] Execution time=0.009307
DEBUG - 2026-03-18 21:41:22 --> [REQ_ID=0ebcbf97420f] [REQUEST][START] HEAD /
DEBUG - 2026-03-18 21:41:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-18 21:41:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-18 21:41:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-18 21:41:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-18 21:41:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-18 21:44:38 --> [REQ_ID=9985fabecc0f] [REQUEST][START] GET /index.php/Management/Marketing/Video-Creator
DEBUG - 2026-03-18 21:44:38 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-18 21:44:38 --> [REQ_ID=9985fabecc0f] [REQUEST][END]
INFO - 2026-03-18 21:44:38 --> [REQ_ID=9985fabecc0f] [PERF] Execution time=0.050858
DEBUG - 2026-03-18 21:46:22 --> [REQ_ID=ac34de952330] [REQUEST][START] HEAD /
DEBUG - 2026-03-18 21:46:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-18 21:46:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-18 21:46:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-18 21:46:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-18 21:46:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-18 21:47:51 --> [REQ_ID=dc9b161079bd] [REQUEST][START] GET /index.php/Terms-Of-Service
DEBUG - 2026-03-18 21:47:51 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-18 21:47:51 --> [REQ_ID=dc9b161079bd] [REQUEST][END]
INFO - 2026-03-18 21:47:51 --> [REQ_ID=dc9b161079bd] [PERF] Execution time=0.038320
DEBUG - 2026-03-18 21:51:22 --> [REQ_ID=8ad8d5a4c219] [REQUEST][START] HEAD /
DEBUG - 2026-03-18 21:51:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-18 21:51:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-18 21:51:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-18 21:51:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-18 21:51:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-18 21:51:49 --> [REQ_ID=04e582a301e1] [REQUEST][START] GET /index.php/Management/Marketing/Campaigns
DEBUG - 2026-03-18 21:51:49 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-18 21:51:49 --> [REQ_ID=04e582a301e1] [REQUEST][END]
INFO - 2026-03-18 21:51:49 --> [REQ_ID=04e582a301e1] [PERF] Execution time=0.025349
DEBUG - 2026-03-18 21:56:22 --> [REQ_ID=10b442d39174] [REQUEST][START] HEAD /
DEBUG - 2026-03-18 21:56:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-18 21:56:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-18 21:56:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-18 21:56:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-18 21:56:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-18 22:00:02 --> [REQ_ID=ac0e62fec8d8] [REQUEST][START] GET /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-18 22:00:02 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-18 22:00:02 --> [REQ_ID=ac0e62fec8d8] [FILTER_BEFORE] /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-18 22:00:02 --> [REQ_ID=ac0e62fec8d8] [ROUTE] Controller=\App\Modules\Management\Controllers\ManagementAPIController Method=Run_CRON_Tasks
DEBUG - 2026-03-18 22:00:02 --> [REQ_ID=ac0e62fec8d8] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-18 22:00:02 --> [REQ_ID=ac0e62fec8d8] [REQUEST][END]
INFO - 2026-03-18 22:00:02 --> [REQ_ID=ac0e62fec8d8] [PERF] Execution time=0.038789
DEBUG - 2026-03-18 22:01:22 --> [REQ_ID=28681653a765] [REQUEST][START] HEAD /
DEBUG - 2026-03-18 22:01:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-18 22:01:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-18 22:01:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-18 22:01:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-18 22:01:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-18 22:06:22 --> [REQ_ID=c0f292d826c7] [REQUEST][START] HEAD /
DEBUG - 2026-03-18 22:06:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-18 22:06:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-18 22:06:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-18 22:06:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-18 22:06:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-18 22:11:22 --> [REQ_ID=7ce4d3c9fc79] [REQUEST][START] HEAD /
DEBUG - 2026-03-18 22:11:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-18 22:11:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-18 22:11:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-18 22:11:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-18 22:11:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-18 22:15:01 --> [REQ_ID=0361f7a7ca42] [REQUEST][START] GET /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-18 22:15:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-18 22:15:02 --> [REQ_ID=0361f7a7ca42] [FILTER_BEFORE] /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-18 22:15:02 --> [REQ_ID=0361f7a7ca42] [ROUTE] Controller=\App\Modules\APIs\Controllers\AlertsAPIController Method=fetchEmailAlerts
DEBUG - 2026-03-18 22:15:02 --> [REQ_ID=0361f7a7ca42] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-18 22:15:02 --> [REQ_ID=0361f7a7ca42] [REQUEST][END]
INFO - 2026-03-18 22:15:02 --> [REQ_ID=0361f7a7ca42] [PERF] Execution time=0.045703
DEBUG - 2026-03-18 22:16:22 --> [REQ_ID=fd075efcedd0] [REQUEST][START] HEAD /
DEBUG - 2026-03-18 22:16:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-18 22:16:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-18 22:16:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-18 22:16:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-18 22:16:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-18 22:16:42 --> [REQ_ID=391415e56fa1] [REQUEST][START] GET /
DEBUG - 2026-03-18 22:16:42 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-18 22:16:42 --> [REQ_ID=391415e56fa1] [FILTER_BEFORE] /
DEBUG - 2026-03-18 22:16:42 --> [REQ_ID=391415e56fa1] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-18 22:16:42 --> [REQ_ID=391415e56fa1] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-18 22:16:42 --> [CSRF] token name=csrf_test_name hash=af203109e250b0ef665d6436f10754b9
DEBUG - 2026-03-18 22:16:42 --> [REQ_ID=c4bc4a8d8801] [INIT] App\Controllers\Home::GET
INFO - 2026-03-18 22:16:42 --> [REQ_ID=c4bc4a8d8801] [MEMORY][controller-start] 4194304
INFO - 2026-03-18 22:16:42 --> [REQ_ID=c4bc4a8d8801] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-18 22:16:42 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-18 22:16:43 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-03-18 22:16:43 --> [REQ_ID=c4bc4a8d8801] [VIEW_RENDER] themes/public/home
INFO - 2026-03-18 22:16:43 --> [REQ_ID=c4bc4a8d8801] [MEMORY][commonData:start] 8388608
INFO - 2026-03-18 22:16:43 --> themesMemory usage: 8388608
DEBUG - 2026-03-18 22:16:43 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-18 22:16:43 --> [REQ_ID=391415e56fa1] [FILTER_AFTER]
DEBUG - 2026-03-18 22:16:43 --> [REQ_ID=391415e56fa1] [LIFECYCLE][END] status=200 duration_ms=801.13 memory_delta=4194304
INFO - 2026-03-18 22:16:43 --> [REQ_ID=c4bc4a8d8801] [PERF] Execution time=0.799712
DEBUG - 2026-03-18 22:16:43 --> [REQ_ID=391415e56fa1] [REQUEST][END]
INFO - 2026-03-18 22:16:43 --> [REQ_ID=391415e56fa1] [PERF] Execution time=0.811757
DEBUG - 2026-03-18 22:17:10 --> [REQ_ID=177475c17f6a] [REQUEST][START] GET /index.php/
DEBUG - 2026-03-18 22:17:10 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-18 22:17:10 --> [REQ_ID=177475c17f6a] [FILTER_BEFORE] /index.php/
DEBUG - 2026-03-18 22:17:10 --> [REQ_ID=177475c17f6a] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-18 22:17:10 --> [REQ_ID=177475c17f6a] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-18 22:17:10 --> [CSRF] token name=csrf_test_name hash=b9349477f301fbc293b377c41e4ce0e9
DEBUG - 2026-03-18 22:17:10 --> [REQ_ID=8f866ae584a4] [INIT] App\Controllers\Home::GET
INFO - 2026-03-18 22:17:10 --> [REQ_ID=8f866ae584a4] [MEMORY][controller-start] 6291456
INFO - 2026-03-18 22:17:10 --> [REQ_ID=8f866ae584a4] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-18 22:17:10 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-18 22:17:11 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
DEBUG - 2026-03-18 22:17:11 --> [REQ_ID=8f866ae584a4] [VIEW_RENDER] themes/public/home
INFO - 2026-03-18 22:17:11 --> [REQ_ID=8f866ae584a4] [MEMORY][commonData:start] 8388608
INFO - 2026-03-18 22:17:11 --> themesMemory usage: 8388608
DEBUG - 2026-03-18 22:17:11 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-18 22:17:11 --> [REQ_ID=177475c17f6a] [FILTER_AFTER]
DEBUG - 2026-03-18 22:17:11 --> [REQ_ID=177475c17f6a] [LIFECYCLE][END] status=200 duration_ms=1,018.47 memory_delta=2097152
INFO - 2026-03-18 22:17:11 --> [REQ_ID=8f866ae584a4] [PERF] Execution time=1.017925
DEBUG - 2026-03-18 22:17:11 --> [REQ_ID=177475c17f6a] [REQUEST][END]
INFO - 2026-03-18 22:17:11 --> [REQ_ID=177475c17f6a] [PERF] Execution time=1.028124
DEBUG - 2026-03-18 22:17:15 --> [REQ_ID=3bdc0c02cba3] [REQUEST][START] GET /index.php
DEBUG - 2026-03-18 22:17:15 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-18 22:17:15 --> [REQ_ID=3bdc0c02cba3] [FILTER_BEFORE] /index.php
DEBUG - 2026-03-18 22:17:15 --> [REQ_ID=3bdc0c02cba3] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-18 22:17:15 --> [REQ_ID=3bdc0c02cba3] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-18 22:17:15 --> [CSRF] token name=csrf_test_name hash=66f02d67697b0c774ef52dc5f8545fe4
DEBUG - 2026-03-18 22:17:15 --> [REQ_ID=c958c816be34] [INIT] App\Controllers\Home::GET
INFO - 2026-03-18 22:17:15 --> [REQ_ID=c958c816be34] [MEMORY][controller-start] 6291456
INFO - 2026-03-18 22:17:15 --> [REQ_ID=c958c816be34] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-18 22:17:15 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-18 22:17:15 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
DEBUG - 2026-03-18 22:17:15 --> [REQ_ID=c958c816be34] [VIEW_RENDER] themes/public/home
INFO - 2026-03-18 22:17:15 --> [REQ_ID=c958c816be34] [MEMORY][commonData:start] 8388608
INFO - 2026-03-18 22:17:15 --> themesMemory usage: 8388608
DEBUG - 2026-03-18 22:17:15 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-18 22:17:15 --> [REQ_ID=3bdc0c02cba3] [FILTER_AFTER]
DEBUG - 2026-03-18 22:17:15 --> [REQ_ID=3bdc0c02cba3] [LIFECYCLE][END] status=200 duration_ms=857.04 memory_delta=2097152
INFO - 2026-03-18 22:17:15 --> [REQ_ID=c958c816be34] [PERF] Execution time=0.856834
DEBUG - 2026-03-18 22:17:15 --> [REQ_ID=3bdc0c02cba3] [REQUEST][END]
INFO - 2026-03-18 22:17:15 --> [REQ_ID=3bdc0c02cba3] [PERF] Execution time=0.866561
DEBUG - 2026-03-18 22:17:19 --> [REQ_ID=3c9a5f881d95] [REQUEST][START] GET /index.php/How-It-Works
DEBUG - 2026-03-18 22:17:19 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-18 22:17:19 --> [REQ_ID=3c9a5f881d95] [FILTER_BEFORE] /index.php/How-It-Works
DEBUG - 2026-03-18 22:17:19 --> [REQ_ID=3c9a5f881d95] [ROUTE] Controller=\App\Modules\Blog\Controllers\HowItWorksController Method=index
DEBUG - 2026-03-18 22:17:19 --> [REQ_ID=3c9a5f881d95] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/How-It-Works
DEBUG - 2026-03-18 22:17:19 --> [CSRF] token name=csrf_test_name hash=4b6e41ae2e0d15c432d31450b99a1e9c
DEBUG - 2026-03-18 22:17:19 --> [REQ_ID=ecbbe15cd415] [INIT] App\Modules\Blog\Controllers\HowItWorksController::GET
INFO - 2026-03-18 22:17:19 --> [REQ_ID=ecbbe15cd415] [MEMORY][controller-start] 6291456
DEBUG - 2026-03-18 22:17:19 --> [REQ_ID=ecbbe15cd415] [METHOD_ENTRY] index
DEBUG - 2026-03-18 22:17:19 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-18 22:17:19 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-18 22:17:19 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-18 22:17:19 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-18 22:17:19 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-18 22:17:19 --> MyMICoin: guest context detected; skipping user-specific preload.
ERROR - 2026-03-18 22:17:19 --> HowItWorksController failure: overview
CRITICAL - 2026-03-18 22:17:19 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: GET, Route: How-It-Works]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-18 22:17:19 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-18 22:17:19 --> [404] URI=https://www.mymiwallet.com/index.php/How-It-Works
WARNING - 2026-03-18 22:17:19 --> 404 route miss: https://www.mymiwallet.com/index.php/How-It-Works | referrer: none
INFO - 2026-03-18 22:17:19 --> [REQ_ID=ecbbe15cd415] [PERF] Execution time=0.094932
DEBUG - 2026-03-18 22:17:23 --> [REQ_ID=f259cab0c1bb] [REQUEST][START] GET /index.php/How-It-Works
DEBUG - 2026-03-18 22:17:23 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-18 22:17:23 --> [REQ_ID=f259cab0c1bb] [FILTER_BEFORE] /index.php/How-It-Works
DEBUG - 2026-03-18 22:17:23 --> [REQ_ID=f259cab0c1bb] [ROUTE] Controller=\App\Modules\Blog\Controllers\HowItWorksController Method=index
DEBUG - 2026-03-18 22:17:23 --> [REQ_ID=f259cab0c1bb] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/How-It-Works
DEBUG - 2026-03-18 22:17:23 --> [CSRF] token name=csrf_test_name hash=2788ea0398d32892c400e7d4363fb915
DEBUG - 2026-03-18 22:17:23 --> [REQ_ID=e46ae9581000] [INIT] App\Modules\Blog\Controllers\HowItWorksController::GET
INFO - 2026-03-18 22:17:23 --> [REQ_ID=e46ae9581000] [MEMORY][controller-start] 6291456
DEBUG - 2026-03-18 22:17:23 --> [REQ_ID=e46ae9581000] [METHOD_ENTRY] index
DEBUG - 2026-03-18 22:17:23 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-18 22:17:23 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-18 22:17:23 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-18 22:17:23 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-18 22:17:23 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-18 22:17:23 --> MyMICoin: guest context detected; skipping user-specific preload.
ERROR - 2026-03-18 22:17:23 --> HowItWorksController failure: overview
CRITICAL - 2026-03-18 22:17:23 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: GET, Route: How-It-Works]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-18 22:17:23 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-18 22:17:23 --> [404] URI=https://www.mymiwallet.com/index.php/How-It-Works
WARNING - 2026-03-18 22:17:23 --> 404 route miss: https://www.mymiwallet.com/index.php/How-It-Works | referrer: none
INFO - 2026-03-18 22:17:23 --> [REQ_ID=e46ae9581000] [PERF] Execution time=0.125739
DEBUG - 2026-03-18 22:17:26 --> [REQ_ID=aad923e7fd08] [REQUEST][START] GET /index.php/How-It-Works
DEBUG - 2026-03-18 22:17:26 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-18 22:17:26 --> [REQ_ID=aad923e7fd08] [FILTER_BEFORE] /index.php/How-It-Works
DEBUG - 2026-03-18 22:17:26 --> [REQ_ID=aad923e7fd08] [ROUTE] Controller=\App\Modules\Blog\Controllers\HowItWorksController Method=index
DEBUG - 2026-03-18 22:17:26 --> [REQ_ID=aad923e7fd08] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/How-It-Works
DEBUG - 2026-03-18 22:17:26 --> [CSRF] token name=csrf_test_name hash=9b3055d16c5763829a378493d37ec460
DEBUG - 2026-03-18 22:17:26 --> [REQ_ID=7dc768338748] [INIT] App\Modules\Blog\Controllers\HowItWorksController::GET
INFO - 2026-03-18 22:17:26 --> [REQ_ID=7dc768338748] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-18 22:17:26 --> [REQ_ID=7dc768338748] [METHOD_ENTRY] index
DEBUG - 2026-03-18 22:17:26 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-18 22:17:26 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-18 22:17:26 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-18 22:17:26 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-18 22:17:26 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-18 22:17:26 --> MyMICoin: guest context detected; skipping user-specific preload.
ERROR - 2026-03-18 22:17:26 --> HowItWorksController failure: overview
CRITICAL - 2026-03-18 22:17:26 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: GET, Route: How-It-Works]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-18 22:17:26 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-18 22:17:26 --> [404] URI=https://www.mymiwallet.com/index.php/How-It-Works
WARNING - 2026-03-18 22:17:26 --> 404 route miss: https://www.mymiwallet.com/index.php/How-It-Works | referrer: none
INFO - 2026-03-18 22:17:26 --> [REQ_ID=7dc768338748] [PERF] Execution time=0.054769
DEBUG - 2026-03-18 22:17:30 --> [REQ_ID=62d8f7b8d61d] [REQUEST][START] GET /index.php/Blog
DEBUG - 2026-03-18 22:17:30 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-18 22:17:30 --> [REQ_ID=62d8f7b8d61d] [FILTER_BEFORE] /index.php/Blog
DEBUG - 2026-03-18 22:17:30 --> [REQ_ID=62d8f7b8d61d] [ROUTE] Controller=\App\Modules\Blog\Controllers\BlogController Method=index
DEBUG - 2026-03-18 22:17:30 --> [REQ_ID=62d8f7b8d61d] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Blog
DEBUG - 2026-03-18 22:17:30 --> [CSRF] token name=csrf_test_name hash=fa35bfee330dec2c03f4b95b08ff16f7
DEBUG - 2026-03-18 22:17:30 --> [REQ_ID=1000a84792a7] [INIT] App\Modules\Blog\Controllers\BlogController::GET
INFO - 2026-03-18 22:17:30 --> [REQ_ID=1000a84792a7] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-18 22:17:30 --> [REQ_ID=1000a84792a7] [METHOD_ENTRY] index
DEBUG - 2026-03-18 22:17:30 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-18 22:17:30 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-18 22:17:30 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-18 22:17:30 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-18 22:17:30 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-18 22:17:30 --> MyMICoin: guest context detected; skipping user-specific preload.
INFO - 2026-03-18 22:17:30 --> [REQ_ID=1000a84792a7] [MEMORY][commonData:start] 4194304
INFO - 2026-03-18 22:17:30 --> [REQ_ID=1000a84792a7] [PERF] Execution time=0.034062
DEBUG - 2026-03-18 22:17:33 --> [REQ_ID=f6b84b579eae] [REQUEST][START] GET /index.php/Blog
DEBUG - 2026-03-18 22:17:33 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-18 22:17:33 --> [REQ_ID=f6b84b579eae] [FILTER_BEFORE] /index.php/Blog
DEBUG - 2026-03-18 22:17:33 --> [REQ_ID=f6b84b579eae] [ROUTE] Controller=\App\Modules\Blog\Controllers\BlogController Method=index
DEBUG - 2026-03-18 22:17:33 --> [REQ_ID=f6b84b579eae] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Blog
DEBUG - 2026-03-18 22:17:33 --> [CSRF] token name=csrf_test_name hash=644ca7181d2698731fbdfb07227a744a
DEBUG - 2026-03-18 22:17:33 --> [REQ_ID=83f7effb7288] [INIT] App\Modules\Blog\Controllers\BlogController::GET
INFO - 2026-03-18 22:17:33 --> [REQ_ID=83f7effb7288] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-18 22:17:33 --> [REQ_ID=83f7effb7288] [METHOD_ENTRY] index
DEBUG - 2026-03-18 22:17:33 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-18 22:17:33 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-18 22:17:33 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-18 22:17:33 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-18 22:17:33 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-18 22:17:33 --> MyMICoin: guest context detected; skipping user-specific preload.
INFO - 2026-03-18 22:17:33 --> [REQ_ID=83f7effb7288] [MEMORY][commonData:start] 4194304
INFO - 2026-03-18 22:17:33 --> [REQ_ID=83f7effb7288] [PERF] Execution time=0.030002
DEBUG - 2026-03-18 22:17:36 --> [REQ_ID=4825d974b133] [REQUEST][START] GET /index.php/Blog
DEBUG - 2026-03-18 22:17:36 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-18 22:17:36 --> [REQ_ID=4825d974b133] [FILTER_BEFORE] /index.php/Blog
DEBUG - 2026-03-18 22:17:36 --> [REQ_ID=4825d974b133] [ROUTE] Controller=\App\Modules\Blog\Controllers\BlogController Method=index
DEBUG - 2026-03-18 22:17:36 --> [REQ_ID=4825d974b133] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Blog
DEBUG - 2026-03-18 22:17:36 --> [CSRF] token name=csrf_test_name hash=afd31da9eb93a368bf435dc312fd5b4c
DEBUG - 2026-03-18 22:17:36 --> [REQ_ID=79311e126d11] [INIT] App\Modules\Blog\Controllers\BlogController::GET
INFO - 2026-03-18 22:17:36 --> [REQ_ID=79311e126d11] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-18 22:17:36 --> [REQ_ID=79311e126d11] [METHOD_ENTRY] index
DEBUG - 2026-03-18 22:17:36 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-18 22:17:36 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-18 22:17:36 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-18 22:17:36 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-18 22:17:36 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-18 22:17:36 --> MyMICoin: guest context detected; skipping user-specific preload.
INFO - 2026-03-18 22:17:36 --> [REQ_ID=79311e126d11] [MEMORY][commonData:start] 4194304
INFO - 2026-03-18 22:17:36 --> [REQ_ID=79311e126d11] [PERF] Execution time=0.041634
DEBUG - 2026-03-18 22:17:39 --> [REQ_ID=d4d1e5b9a995] [REQUEST][START] GET /index.php/Knowledgebase
DEBUG - 2026-03-18 22:17:39 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-18 22:17:39 --> [REQ_ID=d4d1e5b9a995] [FILTER_BEFORE] /index.php/Knowledgebase
DEBUG - 2026-03-18 22:17:39 --> [REQ_ID=d4d1e5b9a995] [ROUTE] Controller=\App\Modules\User\Controllers\KnowledgebaseController Method=index
DEBUG - 2026-03-18 22:17:39 --> [REQ_ID=d4d1e5b9a995] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Knowledgebase
DEBUG - 2026-03-18 22:17:39 --> [CSRF] token name=csrf_test_name hash=7c2887da19586f534bd638bfc6da66e3
DEBUG - 2026-03-18 22:17:39 --> [REQ_ID=d4d1e5b9a995] [REQUEST][END]
INFO - 2026-03-18 22:17:39 --> [REQ_ID=d4d1e5b9a995] [PERF] Execution time=0.012390
DEBUG - 2026-03-18 22:17:40 --> [REQ_ID=e9244008e6b2] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-18 22:17:40 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-18 22:17:40 --> [REQ_ID=e9244008e6b2] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-18 22:17:40 --> [REQ_ID=e9244008e6b2] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-18 22:17:40 --> [REQ_ID=e9244008e6b2] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-18 22:17:40 --> [CSRF] token name=csrf_test_name hash=a687c5a8052a6b04d8a09dc2ed3c18fd
DEBUG - 2026-03-18 22:17:40 --> [REQ_ID=89f033fb27e3] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-18 22:17:40 --> [REQ_ID=89f033fb27e3] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-18 22:17:40 --> [REQ_ID=e9244008e6b2] [FILTER_AFTER]
DEBUG - 2026-03-18 22:17:40 --> [REQ_ID=e9244008e6b2] [LIFECYCLE][END] status=200 duration_ms=30.40 memory_delta=0
INFO - 2026-03-18 22:17:40 --> [REQ_ID=89f033fb27e3] [PERF] Execution time=0.029145
DEBUG - 2026-03-18 22:17:40 --> [REQ_ID=e9244008e6b2] [REQUEST][END]
INFO - 2026-03-18 22:17:40 --> [REQ_ID=e9244008e6b2] [PERF] Execution time=0.045387
DEBUG - 2026-03-18 22:17:44 --> [REQ_ID=5cc07a886a4d] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-18 22:17:44 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-18 22:17:44 --> [REQ_ID=5cc07a886a4d] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-18 22:17:44 --> [REQ_ID=5cc07a886a4d] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-18 22:17:44 --> [REQ_ID=5cc07a886a4d] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-18 22:17:44 --> [CSRF] token name=csrf_test_name hash=aa51d50a43e4fad00d4c62b6a090ba69
DEBUG - 2026-03-18 22:17:44 --> [REQ_ID=0066b71c25b1] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-18 22:17:44 --> [REQ_ID=0066b71c25b1] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-18 22:17:44 --> [REQ_ID=5cc07a886a4d] [FILTER_AFTER]
DEBUG - 2026-03-18 22:17:44 --> [REQ_ID=5cc07a886a4d] [LIFECYCLE][END] status=200 duration_ms=22.85 memory_delta=0
INFO - 2026-03-18 22:17:44 --> [REQ_ID=0066b71c25b1] [PERF] Execution time=0.022553
DEBUG - 2026-03-18 22:17:44 --> [REQ_ID=5cc07a886a4d] [REQUEST][END]
INFO - 2026-03-18 22:17:44 --> [REQ_ID=5cc07a886a4d] [PERF] Execution time=0.032653
DEBUG - 2026-03-18 22:17:48 --> [REQ_ID=bc9b8dd62694] [REQUEST][START] GET /index.php/Free/register
DEBUG - 2026-03-18 22:17:48 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-18 22:17:48 --> [REQ_ID=bc9b8dd62694] [FILTER_BEFORE] /index.php/Free/register
DEBUG - 2026-03-18 22:17:48 --> [REQ_ID=bc9b8dd62694] [ROUTE] Controller=\App\Controllers\AuthController Method=register
DEBUG - 2026-03-18 22:17:48 --> [REQ_ID=bc9b8dd62694] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Free/register
DEBUG - 2026-03-18 22:17:48 --> [CSRF] token name=csrf_test_name hash=61773c58135c6ed256ca103444597b88
DEBUG - 2026-03-18 22:17:48 --> [REQ_ID=87782ec2b17e] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-18 22:17:48 --> [REQ_ID=87782ec2b17e] [MEMORY][controller-start] 4194304
INFO - 2026-03-18 22:17:48 --> [REGISTRATION] Form loaded
INFO - 2026-03-18 22:17:48 --> [REQ_ID=87782ec2b17e] [PERF] Execution time=0.027956
DEBUG - 2026-03-18 22:17:51 --> [REQ_ID=e901dbde75bf] [REQUEST][START] GET /index.php/Free/register
DEBUG - 2026-03-18 22:17:51 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-18 22:17:51 --> [REQ_ID=e901dbde75bf] [FILTER_BEFORE] /index.php/Free/register
DEBUG - 2026-03-18 22:17:51 --> [REQ_ID=e901dbde75bf] [ROUTE] Controller=\App\Controllers\AuthController Method=register
DEBUG - 2026-03-18 22:17:51 --> [REQ_ID=e901dbde75bf] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Free/register
DEBUG - 2026-03-18 22:17:51 --> [CSRF] token name=csrf_test_name hash=9b44d88f13827a17fdebe35321eea9a3
DEBUG - 2026-03-18 22:17:51 --> [REQ_ID=362000e9207e] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-18 22:17:51 --> [REQ_ID=362000e9207e] [MEMORY][controller-start] 4194304
INFO - 2026-03-18 22:17:51 --> [REGISTRATION] Form loaded
INFO - 2026-03-18 22:17:51 --> [REQ_ID=362000e9207e] [PERF] Execution time=0.070028
DEBUG - 2026-03-18 22:17:55 --> [REQ_ID=f3cca5988501] [REQUEST][START] GET /index.php/Free/register
DEBUG - 2026-03-18 22:17:55 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-18 22:17:55 --> [REQ_ID=f3cca5988501] [FILTER_BEFORE] /index.php/Free/register
DEBUG - 2026-03-18 22:17:55 --> [REQ_ID=f3cca5988501] [ROUTE] Controller=\App\Controllers\AuthController Method=register
DEBUG - 2026-03-18 22:17:55 --> [REQ_ID=f3cca5988501] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Free/register
DEBUG - 2026-03-18 22:17:55 --> [CSRF] token name=csrf_test_name hash=08a20437d420b70c8c07bacdd14eface
DEBUG - 2026-03-18 22:17:55 --> [REQ_ID=a4ffbb6cba08] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-18 22:17:55 --> [REQ_ID=a4ffbb6cba08] [MEMORY][controller-start] 4194304
INFO - 2026-03-18 22:17:55 --> [REGISTRATION] Form loaded
INFO - 2026-03-18 22:17:55 --> [REQ_ID=a4ffbb6cba08] [PERF] Execution time=0.024599
DEBUG - 2026-03-18 22:18:27 --> [REQ_ID=ebb3c80ac04b] [REQUEST][START] GET /index.php/Legal/Terms-And-Conditions
DEBUG - 2026-03-18 22:18:27 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-18 22:18:27 --> [REQ_ID=ebb3c80ac04b] [FILTER_BEFORE] /index.php/Legal/Terms-And-Conditions
DEBUG - 2026-03-18 22:18:27 --> [REQ_ID=ebb3c80ac04b] [ROUTE] Controller=\App\Controllers\Home Method=terms
DEBUG - 2026-03-18 22:18:27 --> [REQ_ID=ebb3c80ac04b] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Legal/Terms-And-Conditions
DEBUG - 2026-03-18 22:18:27 --> [CSRF] token name=csrf_test_name hash=24adba811a540a4096ee94ae94d8d469
DEBUG - 2026-03-18 22:18:27 --> [REQ_ID=ebb3c80ac04b] [REQUEST][END]
INFO - 2026-03-18 22:18:27 --> [REQ_ID=ebb3c80ac04b] [PERF] Execution time=0.009962
DEBUG - 2026-03-18 22:18:28 --> [REQ_ID=3880345573c3] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-18 22:18:28 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-18 22:18:28 --> [REQ_ID=3880345573c3] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-18 22:18:28 --> [REQ_ID=3880345573c3] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-18 22:18:28 --> [REQ_ID=3880345573c3] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-18 22:18:28 --> [CSRF] token name=csrf_test_name hash=ed40100e44428889fe2020fdaae7ef37
DEBUG - 2026-03-18 22:18:28 --> [REQ_ID=7dfd96d6cb6f] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-18 22:18:28 --> [REQ_ID=7dfd96d6cb6f] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-18 22:18:28 --> [REQ_ID=3880345573c3] [FILTER_AFTER]
DEBUG - 2026-03-18 22:18:28 --> [REQ_ID=3880345573c3] [LIFECYCLE][END] status=200 duration_ms=39.41 memory_delta=0
INFO - 2026-03-18 22:18:28 --> [REQ_ID=7dfd96d6cb6f] [PERF] Execution time=0.023168
DEBUG - 2026-03-18 22:18:28 --> [REQ_ID=3880345573c3] [REQUEST][END]
INFO - 2026-03-18 22:18:28 --> [REQ_ID=3880345573c3] [PERF] Execution time=0.049803
DEBUG - 2026-03-18 22:18:36 --> [REQ_ID=70d2d2278986] [REQUEST][START] GET /index.php/Legal/Privacy-Policy
DEBUG - 2026-03-18 22:18:36 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-18 22:18:36 --> [REQ_ID=70d2d2278986] [FILTER_BEFORE] /index.php/Legal/Privacy-Policy
DEBUG - 2026-03-18 22:18:36 --> [REQ_ID=70d2d2278986] [ROUTE] Controller=\App\Controllers\Home Method=privacyPolicy
DEBUG - 2026-03-18 22:18:36 --> [REQ_ID=70d2d2278986] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Legal/Privacy-Policy
DEBUG - 2026-03-18 22:18:36 --> [CSRF] token name=csrf_test_name hash=9a80ce9b29f1049d1654faf44075e5fb
DEBUG - 2026-03-18 22:18:36 --> [REQ_ID=70d2d2278986] [REQUEST][END]
INFO - 2026-03-18 22:18:36 --> [REQ_ID=70d2d2278986] [PERF] Execution time=0.015358
DEBUG - 2026-03-18 22:18:37 --> [REQ_ID=e8f4ea7ab602] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-18 22:18:37 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-18 22:18:37 --> [REQ_ID=e8f4ea7ab602] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-18 22:18:37 --> [REQ_ID=e8f4ea7ab602] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-18 22:18:37 --> [REQ_ID=e8f4ea7ab602] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-18 22:18:37 --> [CSRF] token name=csrf_test_name hash=b5f23f7eb1a48a6d2e3b761aa8d53555
DEBUG - 2026-03-18 22:18:37 --> [REQ_ID=0b9d2321fd8a] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-18 22:18:37 --> [REQ_ID=0b9d2321fd8a] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-18 22:18:37 --> [REQ_ID=e8f4ea7ab602] [FILTER_AFTER]
DEBUG - 2026-03-18 22:18:37 --> [REQ_ID=e8f4ea7ab602] [LIFECYCLE][END] status=200 duration_ms=63.65 memory_delta=0
INFO - 2026-03-18 22:18:37 --> [REQ_ID=0b9d2321fd8a] [PERF] Execution time=0.062631
DEBUG - 2026-03-18 22:18:37 --> [REQ_ID=e8f4ea7ab602] [REQUEST][END]
INFO - 2026-03-18 22:18:37 --> [REQ_ID=e8f4ea7ab602] [PERF] Execution time=0.073411
DEBUG - 2026-03-18 22:18:41 --> [REQ_ID=08eeaf41301c] [REQUEST][START] GET /index.php/How-It-Works/Personal-Budgeting
DEBUG - 2026-03-18 22:18:41 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-18 22:18:41 --> [REQ_ID=08eeaf41301c] [FILTER_BEFORE] /index.php/How-It-Works/Personal-Budgeting
DEBUG - 2026-03-18 22:18:41 --> [REQ_ID=08eeaf41301c] [ROUTE] Controller=\App\Modules\Blog\Controllers\HowItWorksController Method=PersonalBudgeting
DEBUG - 2026-03-18 22:18:41 --> [REQ_ID=08eeaf41301c] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/How-It-Works/Personal-Budgeting
DEBUG - 2026-03-18 22:18:41 --> [CSRF] token name=csrf_test_name hash=a571e4ae8310da27ad92a4374f4f2966
DEBUG - 2026-03-18 22:18:41 --> [REQ_ID=217a60d73257] [INIT] App\Modules\Blog\Controllers\HowItWorksController::GET
INFO - 2026-03-18 22:18:41 --> [REQ_ID=217a60d73257] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-18 22:18:41 --> [REQ_ID=217a60d73257] [METHOD_ENTRY] PersonalBudgeting
DEBUG - 2026-03-18 22:18:41 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-18 22:18:41 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-18 22:18:41 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-18 22:18:41 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-18 22:18:41 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-18 22:18:41 --> MyMICoin: guest context detected; skipping user-specific preload.
INFO - 2026-03-18 22:18:41 --> [REQ_ID=217a60d73257] [MEMORY][commonData:start] 4194304
INFO - 2026-03-18 22:18:42 --> themesMemory usage: 8388608
DEBUG - 2026-03-18 22:18:42 --> [MetaService] slug=how-it-works/personal-budgeting pageName= cacheHit= path=DB
DEBUG - 2026-03-18 22:18:42 --> [REQ_ID=08eeaf41301c] [FILTER_AFTER]
DEBUG - 2026-03-18 22:18:42 --> [REQ_ID=08eeaf41301c] [LIFECYCLE][END] status=200 duration_ms=803.66 memory_delta=4194304
INFO - 2026-03-18 22:18:42 --> [REQ_ID=217a60d73257] [PERF] Execution time=0.803031
DEBUG - 2026-03-18 22:18:42 --> [REQ_ID=08eeaf41301c] [REQUEST][END]
INFO - 2026-03-18 22:18:42 --> [REQ_ID=08eeaf41301c] [PERF] Execution time=0.813677
DEBUG - 2026-03-18 22:18:45 --> [REQ_ID=ca35bc493e5e] [REQUEST][START] GET /index.php/How-It-Works/Investment-Portfolio-Management
DEBUG - 2026-03-18 22:18:45 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-18 22:18:45 --> [REQ_ID=ca35bc493e5e] [FILTER_BEFORE] /index.php/How-It-Works/Investment-Portfolio-Management
DEBUG - 2026-03-18 22:18:45 --> [REQ_ID=ca35bc493e5e] [ROUTE] Controller=\App\Modules\Blog\Controllers\HowItWorksController Method=InvestmentPortfolioManagement
DEBUG - 2026-03-18 22:18:45 --> [REQ_ID=ca35bc493e5e] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/How-It-Works/Investment-Portfolio-Management
DEBUG - 2026-03-18 22:18:45 --> [CSRF] token name=csrf_test_name hash=3970d40710ff47957a6de858d86b451a
DEBUG - 2026-03-18 22:18:45 --> [REQ_ID=636feef37f71] [INIT] App\Modules\Blog\Controllers\HowItWorksController::GET
INFO - 2026-03-18 22:18:45 --> [REQ_ID=636feef37f71] [MEMORY][controller-start] 6291456
DEBUG - 2026-03-18 22:18:45 --> [REQ_ID=636feef37f71] [METHOD_ENTRY] InvestmentPortfolioManagement
DEBUG - 2026-03-18 22:18:45 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-18 22:18:45 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-18 22:18:45 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-18 22:18:45 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-18 22:18:45 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-18 22:18:45 --> MyMICoin: guest context detected; skipping user-specific preload.
INFO - 2026-03-18 22:18:45 --> [REQ_ID=636feef37f71] [MEMORY][commonData:start] 6291456
INFO - 2026-03-18 22:18:46 --> themesMemory usage: 8388608
DEBUG - 2026-03-18 22:18:46 --> [MetaService] slug=how-it-works/investment-portfolio-management pageName= cacheHit= path=DB
DEBUG - 2026-03-18 22:18:46 --> [REQ_ID=ca35bc493e5e] [FILTER_AFTER]
DEBUG - 2026-03-18 22:18:46 --> [REQ_ID=ca35bc493e5e] [LIFECYCLE][END] status=200 duration_ms=710.49 memory_delta=2097152
INFO - 2026-03-18 22:18:46 --> [REQ_ID=636feef37f71] [PERF] Execution time=0.710168
DEBUG - 2026-03-18 22:18:46 --> [REQ_ID=ca35bc493e5e] [REQUEST][END]
INFO - 2026-03-18 22:18:46 --> [REQ_ID=ca35bc493e5e] [PERF] Execution time=0.720950
DEBUG - 2026-03-18 22:18:53 --> [REQ_ID=bff14cd4c67e] [REQUEST][START] GET /index.php/How-It-Works/Daily-Financial-News
DEBUG - 2026-03-18 22:18:53 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-18 22:18:53 --> [REQ_ID=bff14cd4c67e] [FILTER_BEFORE] /index.php/How-It-Works/Daily-Financial-News
DEBUG - 2026-03-18 22:18:53 --> [REQ_ID=bff14cd4c67e] [ROUTE] Controller=\App\Modules\Blog\Controllers\HowItWorksController Method=DailyFinancialNews
DEBUG - 2026-03-18 22:18:53 --> [REQ_ID=bff14cd4c67e] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/How-It-Works/Daily-Financial-News
DEBUG - 2026-03-18 22:18:53 --> [CSRF] token name=csrf_test_name hash=bd9d70d7d3154b076249531f015e32d2
DEBUG - 2026-03-18 22:18:53 --> [REQ_ID=06393791bef3] [INIT] App\Modules\Blog\Controllers\HowItWorksController::GET
INFO - 2026-03-18 22:18:53 --> [REQ_ID=06393791bef3] [MEMORY][controller-start] 6291456
DEBUG - 2026-03-18 22:18:53 --> [REQ_ID=06393791bef3] [METHOD_ENTRY] DailyFinancialNews
DEBUG - 2026-03-18 22:18:53 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-18 22:18:53 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-18 22:18:53 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-18 22:18:53 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-18 22:18:53 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-18 22:18:53 --> MyMICoin: guest context detected; skipping user-specific preload.
INFO - 2026-03-18 22:18:53 --> [REQ_ID=06393791bef3] [MEMORY][commonData:start] 6291456
INFO - 2026-03-18 22:18:53 --> themesMemory usage: 8388608
DEBUG - 2026-03-18 22:18:53 --> [MetaService] slug=how-it-works/daily-financial-news pageName= cacheHit= path=DB
DEBUG - 2026-03-18 22:18:53 --> [REQ_ID=bff14cd4c67e] [FILTER_AFTER]
DEBUG - 2026-03-18 22:18:53 --> [REQ_ID=bff14cd4c67e] [LIFECYCLE][END] status=200 duration_ms=859.05 memory_delta=2097152
INFO - 2026-03-18 22:18:53 --> [REQ_ID=06393791bef3] [PERF] Execution time=0.858624
DEBUG - 2026-03-18 22:18:53 --> [REQ_ID=bff14cd4c67e] [REQUEST][END]
INFO - 2026-03-18 22:18:53 --> [REQ_ID=bff14cd4c67e] [PERF] Execution time=0.869582
DEBUG - 2026-03-18 22:19:12 --> [REQ_ID=7d461f64eeca] [REQUEST][START] GET /index.php/
DEBUG - 2026-03-18 22:19:12 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-18 22:19:12 --> [REQ_ID=7d461f64eeca] [FILTER_BEFORE] /index.php/
DEBUG - 2026-03-18 22:19:12 --> [REQ_ID=7d461f64eeca] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-18 22:19:12 --> [REQ_ID=7d461f64eeca] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-18 22:19:12 --> [CSRF] token name=csrf_test_name hash=c850cba793bb17dbd7fdff66e9f469fb
DEBUG - 2026-03-18 22:19:12 --> [REQ_ID=ced6df99de80] [INIT] App\Controllers\Home::GET
INFO - 2026-03-18 22:19:12 --> [REQ_ID=ced6df99de80] [MEMORY][controller-start] 6291456
INFO - 2026-03-18 22:19:12 --> [REQ_ID=ced6df99de80] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-18 22:19:12 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-18 22:19:13 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
DEBUG - 2026-03-18 22:19:13 --> [REQ_ID=ced6df99de80] [VIEW_RENDER] themes/public/home
INFO - 2026-03-18 22:19:13 --> [REQ_ID=ced6df99de80] [MEMORY][commonData:start] 8388608
INFO - 2026-03-18 22:19:13 --> themesMemory usage: 8388608
DEBUG - 2026-03-18 22:19:13 --> [MetaService] slug= pageName=Home cacheHit= path=DB
DEBUG - 2026-03-18 22:19:13 --> [REQ_ID=7d461f64eeca] [FILTER_AFTER]
DEBUG - 2026-03-18 22:19:13 --> [REQ_ID=7d461f64eeca] [LIFECYCLE][END] status=200 duration_ms=900.06 memory_delta=2097152
INFO - 2026-03-18 22:19:13 --> [REQ_ID=ced6df99de80] [PERF] Execution time=0.899560
DEBUG - 2026-03-18 22:19:13 --> [REQ_ID=7d461f64eeca] [REQUEST][END]
INFO - 2026-03-18 22:19:13 --> [REQ_ID=7d461f64eeca] [PERF] Execution time=0.913802
DEBUG - 2026-03-18 22:19:17 --> [REQ_ID=ad4f134dc164] [REQUEST][START] GET /index.php
DEBUG - 2026-03-18 22:19:17 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-18 22:19:17 --> [REQ_ID=ad4f134dc164] [FILTER_BEFORE] /index.php
DEBUG - 2026-03-18 22:19:17 --> [REQ_ID=ad4f134dc164] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-18 22:19:17 --> [REQ_ID=ad4f134dc164] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-18 22:19:17 --> [CSRF] token name=csrf_test_name hash=137f16e6230fbec186a5c6664aca0e33
DEBUG - 2026-03-18 22:19:17 --> [REQ_ID=b6978b8d9a7b] [INIT] App\Controllers\Home::GET
INFO - 2026-03-18 22:19:17 --> [REQ_ID=b6978b8d9a7b] [MEMORY][controller-start] 6291456
INFO - 2026-03-18 22:19:17 --> [REQ_ID=b6978b8d9a7b] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-18 22:19:17 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-18 22:19:18 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
DEBUG - 2026-03-18 22:19:18 --> [REQ_ID=b6978b8d9a7b] [VIEW_RENDER] themes/public/home
INFO - 2026-03-18 22:19:18 --> [REQ_ID=b6978b8d9a7b] [MEMORY][commonData:start] 8388608
INFO - 2026-03-18 22:19:18 --> themesMemory usage: 8388608
DEBUG - 2026-03-18 22:19:18 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-18 22:19:18 --> [REQ_ID=ad4f134dc164] [FILTER_AFTER]
DEBUG - 2026-03-18 22:19:18 --> [REQ_ID=ad4f134dc164] [LIFECYCLE][END] status=200 duration_ms=848.80 memory_delta=2097152
INFO - 2026-03-18 22:19:18 --> [REQ_ID=b6978b8d9a7b] [PERF] Execution time=0.848457
DEBUG - 2026-03-18 22:19:18 --> [REQ_ID=ad4f134dc164] [REQUEST][END]
INFO - 2026-03-18 22:19:18 --> [REQ_ID=ad4f134dc164] [PERF] Execution time=0.858827
DEBUG - 2026-03-18 22:19:21 --> [REQ_ID=1989ae671630] [REQUEST][START] GET /index.php/How-It-Works
DEBUG - 2026-03-18 22:19:21 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-18 22:19:21 --> [REQ_ID=1989ae671630] [FILTER_BEFORE] /index.php/How-It-Works
DEBUG - 2026-03-18 22:19:21 --> [REQ_ID=1989ae671630] [ROUTE] Controller=\App\Modules\Blog\Controllers\HowItWorksController Method=index
DEBUG - 2026-03-18 22:19:21 --> [REQ_ID=1989ae671630] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/How-It-Works
DEBUG - 2026-03-18 22:19:21 --> [CSRF] token name=csrf_test_name hash=71611270d1ea0ac991a1fa195f9412b8
DEBUG - 2026-03-18 22:19:21 --> [REQ_ID=103016ec28db] [INIT] App\Modules\Blog\Controllers\HowItWorksController::GET
INFO - 2026-03-18 22:19:21 --> [REQ_ID=103016ec28db] [MEMORY][controller-start] 8388608
DEBUG - 2026-03-18 22:19:22 --> [REQ_ID=103016ec28db] [METHOD_ENTRY] index
DEBUG - 2026-03-18 22:19:22 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-18 22:19:22 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-18 22:19:22 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-18 22:19:22 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-18 22:19:22 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-18 22:19:22 --> MyMICoin: guest context detected; skipping user-specific preload.
ERROR - 2026-03-18 22:19:22 --> HowItWorksController failure: overview
CRITICAL - 2026-03-18 22:19:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: GET, Route: How-It-Works]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-18 22:19:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-18 22:19:22 --> [404] URI=https://www.mymiwallet.com/index.php/How-It-Works
WARNING - 2026-03-18 22:19:22 --> 404 route miss: https://www.mymiwallet.com/index.php/How-It-Works | referrer: none
ERROR - 2026-03-18 22:19:22 --> [ERROR_PAGE] event=error_404 status=404 message=Page not found.
INFO - 2026-03-18 22:19:22 --> [REQ_ID=103016ec28db] [PERF] Execution time=0.120826
DEBUG - 2026-03-18 22:19:25 --> [REQ_ID=5f1b1180ce5b] [REQUEST][START] GET /index.php/How-It-Works
DEBUG - 2026-03-18 22:19:25 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-18 22:19:25 --> [REQ_ID=5f1b1180ce5b] [FILTER_BEFORE] /index.php/How-It-Works
DEBUG - 2026-03-18 22:19:25 --> [REQ_ID=5f1b1180ce5b] [ROUTE] Controller=\App\Modules\Blog\Controllers\HowItWorksController Method=index
DEBUG - 2026-03-18 22:19:25 --> [REQ_ID=5f1b1180ce5b] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/How-It-Works
DEBUG - 2026-03-18 22:19:25 --> [CSRF] token name=csrf_test_name hash=e06675486a486cee93f07d6d0cbde5ed
DEBUG - 2026-03-18 22:19:25 --> [REQ_ID=d55412950647] [INIT] App\Modules\Blog\Controllers\HowItWorksController::GET
INFO - 2026-03-18 22:19:25 --> [REQ_ID=d55412950647] [MEMORY][controller-start] 6291456
DEBUG - 2026-03-18 22:19:25 --> [REQ_ID=d55412950647] [METHOD_ENTRY] index
DEBUG - 2026-03-18 22:19:25 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-18 22:19:25 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-18 22:19:25 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-18 22:19:25 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-18 22:19:25 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-18 22:19:25 --> MyMICoin: guest context detected; skipping user-specific preload.
ERROR - 2026-03-18 22:19:25 --> HowItWorksController failure: overview
CRITICAL - 2026-03-18 22:19:25 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: GET, Route: How-It-Works]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-18 22:19:25 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-18 22:19:25 --> [404] URI=https://www.mymiwallet.com/index.php/How-It-Works
WARNING - 2026-03-18 22:19:25 --> 404 route miss: https://www.mymiwallet.com/index.php/How-It-Works | referrer: none
ERROR - 2026-03-18 22:19:25 --> [ERROR_PAGE] event=error_404 status=404 message=Page not found.
INFO - 2026-03-18 22:19:25 --> [REQ_ID=d55412950647] [PERF] Execution time=0.061360
DEBUG - 2026-03-18 22:19:25 --> [REQ_ID=32edfcdd76ee] [REQUEST][START] GET /
DEBUG - 2026-03-18 22:19:25 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-18 22:19:25 --> [REQ_ID=32edfcdd76ee] [FILTER_BEFORE] /
DEBUG - 2026-03-18 22:19:25 --> [REQ_ID=32edfcdd76ee] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-18 22:19:25 --> [REQ_ID=32edfcdd76ee] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-18 22:19:25 --> [CSRF] token name=csrf_test_name hash=f096ad669c319bb9c6c399f949ed35c7
DEBUG - 2026-03-18 22:19:25 --> [REQ_ID=9190e82c9ad4] [INIT] App\Controllers\Home::GET
INFO - 2026-03-18 22:19:25 --> [REQ_ID=9190e82c9ad4] [MEMORY][controller-start] 4194304
INFO - 2026-03-18 22:19:25 --> [REQ_ID=9190e82c9ad4] [MEMORY][commonData:start] 4194304
DEBUG - 2026-03-18 22:19:25 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-18 22:19:26 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
DEBUG - 2026-03-18 22:19:26 --> [REQ_ID=9190e82c9ad4] [VIEW_RENDER] themes/public/home
INFO - 2026-03-18 22:19:26 --> [REQ_ID=9190e82c9ad4] [MEMORY][commonData:start] 8388608
INFO - 2026-03-18 22:19:26 --> themesMemory usage: 8388608
DEBUG - 2026-03-18 22:19:26 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-18 22:19:26 --> [REQ_ID=32edfcdd76ee] [FILTER_AFTER]
DEBUG - 2026-03-18 22:19:26 --> [REQ_ID=32edfcdd76ee] [LIFECYCLE][END] status=200 duration_ms=1,074.63 memory_delta=4194304
INFO - 2026-03-18 22:19:26 --> [REQ_ID=9190e82c9ad4] [PERF] Execution time=1.074412
DEBUG - 2026-03-18 22:19:26 --> [REQ_ID=32edfcdd76ee] [REQUEST][END]
INFO - 2026-03-18 22:19:26 --> [REQ_ID=32edfcdd76ee] [PERF] Execution time=1.083381
DEBUG - 2026-03-18 22:19:28 --> [REQ_ID=61d697eea28a] [REQUEST][START] GET /index.php/How-It-Works
DEBUG - 2026-03-18 22:19:28 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-18 22:19:28 --> [REQ_ID=61d697eea28a] [FILTER_BEFORE] /index.php/How-It-Works
DEBUG - 2026-03-18 22:19:28 --> [REQ_ID=61d697eea28a] [ROUTE] Controller=\App\Modules\Blog\Controllers\HowItWorksController Method=index
DEBUG - 2026-03-18 22:19:28 --> [REQ_ID=61d697eea28a] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/How-It-Works
DEBUG - 2026-03-18 22:19:28 --> [CSRF] token name=csrf_test_name hash=05d6788885e539b34ab9bf2c33a54b77
DEBUG - 2026-03-18 22:19:28 --> [REQ_ID=c353f75a6efa] [INIT] App\Modules\Blog\Controllers\HowItWorksController::GET
INFO - 2026-03-18 22:19:28 --> [REQ_ID=c353f75a6efa] [MEMORY][controller-start] 6291456
DEBUG - 2026-03-18 22:19:28 --> [REQ_ID=c353f75a6efa] [METHOD_ENTRY] index
DEBUG - 2026-03-18 22:19:28 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-18 22:19:28 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-18 22:19:28 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-18 22:19:28 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-18 22:19:28 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-18 22:19:28 --> MyMICoin: guest context detected; skipping user-specific preload.
ERROR - 2026-03-18 22:19:28 --> HowItWorksController failure: overview
CRITICAL - 2026-03-18 22:19:28 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: GET, Route: How-It-Works]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-18 22:19:28 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-18 22:19:28 --> [404] URI=https://www.mymiwallet.com/index.php/How-It-Works
WARNING - 2026-03-18 22:19:28 --> 404 route miss: https://www.mymiwallet.com/index.php/How-It-Works | referrer: none
ERROR - 2026-03-18 22:19:28 --> [ERROR_PAGE] event=error_404 status=404 message=Page not found.
INFO - 2026-03-18 22:19:28 --> [REQ_ID=c353f75a6efa] [PERF] Execution time=0.053439
DEBUG - 2026-03-18 22:19:31 --> [REQ_ID=41335aa008fd] [REQUEST][START] GET /index.php/Blog
DEBUG - 2026-03-18 22:19:31 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-18 22:19:31 --> [REQ_ID=41335aa008fd] [FILTER_BEFORE] /index.php/Blog
DEBUG - 2026-03-18 22:19:31 --> [REQ_ID=41335aa008fd] [ROUTE] Controller=\App\Modules\Blog\Controllers\BlogController Method=index
DEBUG - 2026-03-18 22:19:31 --> [REQ_ID=41335aa008fd] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Blog
DEBUG - 2026-03-18 22:19:31 --> [CSRF] token name=csrf_test_name hash=f1f8b25bf5d5622a5ce00520f0dff616
DEBUG - 2026-03-18 22:19:31 --> [REQ_ID=7341b6c29905] [INIT] App\Modules\Blog\Controllers\BlogController::GET
INFO - 2026-03-18 22:19:31 --> [REQ_ID=7341b6c29905] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-18 22:19:31 --> [REQ_ID=7341b6c29905] [METHOD_ENTRY] index
DEBUG - 2026-03-18 22:19:31 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-18 22:19:31 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-18 22:19:31 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-18 22:19:31 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-18 22:19:31 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-18 22:19:31 --> MyMICoin: guest context detected; skipping user-specific preload.
INFO - 2026-03-18 22:19:31 --> [REQ_ID=7341b6c29905] [MEMORY][commonData:start] 4194304
INFO - 2026-03-18 22:19:31 --> [REQ_ID=7341b6c29905] [PERF] Execution time=0.119208
DEBUG - 2026-03-18 22:19:35 --> [REQ_ID=37e49217a06f] [REQUEST][START] GET /index.php/Blog
DEBUG - 2026-03-18 22:19:35 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-18 22:19:35 --> [REQ_ID=37e49217a06f] [FILTER_BEFORE] /index.php/Blog
DEBUG - 2026-03-18 22:19:35 --> [REQ_ID=37e49217a06f] [ROUTE] Controller=\App\Modules\Blog\Controllers\BlogController Method=index
DEBUG - 2026-03-18 22:19:35 --> [REQ_ID=37e49217a06f] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Blog
DEBUG - 2026-03-18 22:19:35 --> [CSRF] token name=csrf_test_name hash=bd555914b2946270e8c0c1dce2b88b7d
DEBUG - 2026-03-18 22:19:35 --> [REQ_ID=cbe994d36344] [INIT] App\Modules\Blog\Controllers\BlogController::GET
INFO - 2026-03-18 22:19:35 --> [REQ_ID=cbe994d36344] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-18 22:19:35 --> [REQ_ID=cbe994d36344] [METHOD_ENTRY] index
DEBUG - 2026-03-18 22:19:35 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-18 22:19:35 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-18 22:19:35 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-18 22:19:35 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-18 22:19:35 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-18 22:19:35 --> MyMICoin: guest context detected; skipping user-specific preload.
INFO - 2026-03-18 22:19:35 --> [REQ_ID=cbe994d36344] [MEMORY][commonData:start] 4194304
INFO - 2026-03-18 22:19:35 --> [REQ_ID=cbe994d36344] [PERF] Execution time=0.042981
DEBUG - 2026-03-18 22:19:38 --> [REQ_ID=9def46dc19bf] [REQUEST][START] GET /index.php/Blog
DEBUG - 2026-03-18 22:19:38 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-18 22:19:38 --> [REQ_ID=9def46dc19bf] [FILTER_BEFORE] /index.php/Blog
DEBUG - 2026-03-18 22:19:38 --> [REQ_ID=9def46dc19bf] [ROUTE] Controller=\App\Modules\Blog\Controllers\BlogController Method=index
DEBUG - 2026-03-18 22:19:38 --> [REQ_ID=9def46dc19bf] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Blog
DEBUG - 2026-03-18 22:19:38 --> [CSRF] token name=csrf_test_name hash=e46dc16067625127b908c7f7b435329e
DEBUG - 2026-03-18 22:19:38 --> [REQ_ID=c8c6b13858b8] [INIT] App\Modules\Blog\Controllers\BlogController::GET
INFO - 2026-03-18 22:19:38 --> [REQ_ID=c8c6b13858b8] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-18 22:19:38 --> [REQ_ID=c8c6b13858b8] [METHOD_ENTRY] index
DEBUG - 2026-03-18 22:19:38 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-18 22:19:38 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-18 22:19:38 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-18 22:19:38 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-18 22:19:38 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-18 22:19:38 --> MyMICoin: guest context detected; skipping user-specific preload.
INFO - 2026-03-18 22:19:38 --> [REQ_ID=c8c6b13858b8] [MEMORY][commonData:start] 4194304
INFO - 2026-03-18 22:19:38 --> [REQ_ID=c8c6b13858b8] [PERF] Execution time=0.041576
DEBUG - 2026-03-18 22:19:41 --> [REQ_ID=99d2547d8fa0] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-18 22:19:41 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-18 22:19:41 --> [REQ_ID=99d2547d8fa0] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-18 22:19:41 --> [REQ_ID=99d2547d8fa0] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-18 22:19:41 --> [REQ_ID=99d2547d8fa0] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-18 22:19:41 --> [CSRF] token name=csrf_test_name hash=d97ba09fe0ae995a7be1a59361ad4eb0
DEBUG - 2026-03-18 22:19:41 --> [REQ_ID=3cdedc269cb6] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-18 22:19:41 --> [REQ_ID=3cdedc269cb6] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-18 22:19:41 --> [REQ_ID=99d2547d8fa0] [FILTER_AFTER]
DEBUG - 2026-03-18 22:19:41 --> [REQ_ID=99d2547d8fa0] [LIFECYCLE][END] status=200 duration_ms=34.22 memory_delta=0
INFO - 2026-03-18 22:19:41 --> [REQ_ID=3cdedc269cb6] [PERF] Execution time=0.033960
DEBUG - 2026-03-18 22:19:41 --> [REQ_ID=99d2547d8fa0] [REQUEST][END]
INFO - 2026-03-18 22:19:41 --> [REQ_ID=99d2547d8fa0] [PERF] Execution time=0.044131
DEBUG - 2026-03-18 22:19:50 --> [REQ_ID=cc882a6d3e4d] [REQUEST][START] GET /index.php/Free/register
DEBUG - 2026-03-18 22:19:50 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-18 22:19:50 --> [REQ_ID=cc882a6d3e4d] [FILTER_BEFORE] /index.php/Free/register
DEBUG - 2026-03-18 22:19:50 --> [REQ_ID=cc882a6d3e4d] [ROUTE] Controller=\App\Controllers\AuthController Method=register
DEBUG - 2026-03-18 22:19:50 --> [REQ_ID=cc882a6d3e4d] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Free/register
DEBUG - 2026-03-18 22:19:50 --> [CSRF] token name=csrf_test_name hash=6d5aa0a428d35552cd70bb9f136726a6
DEBUG - 2026-03-18 22:19:50 --> [REQ_ID=da5df1d70db0] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-18 22:19:50 --> [REQ_ID=da5df1d70db0] [MEMORY][controller-start] 4194304
INFO - 2026-03-18 22:19:50 --> [REGISTRATION] Form loaded
INFO - 2026-03-18 22:19:50 --> [REQ_ID=da5df1d70db0] [PERF] Execution time=0.035889
DEBUG - 2026-03-18 22:19:53 --> [REQ_ID=fd5136cef84c] [REQUEST][START] GET /index.php/Free/register
DEBUG - 2026-03-18 22:19:53 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-18 22:19:53 --> [REQ_ID=fd5136cef84c] [FILTER_BEFORE] /index.php/Free/register
DEBUG - 2026-03-18 22:19:53 --> [REQ_ID=fd5136cef84c] [ROUTE] Controller=\App\Controllers\AuthController Method=register
DEBUG - 2026-03-18 22:19:53 --> [REQ_ID=fd5136cef84c] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Free/register
DEBUG - 2026-03-18 22:19:53 --> [CSRF] token name=csrf_test_name hash=5951d0aa0860cbca2494586bb54ea088
DEBUG - 2026-03-18 22:19:53 --> [REQ_ID=54453b7c65e0] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-18 22:19:53 --> [REQ_ID=54453b7c65e0] [MEMORY][controller-start] 4194304
INFO - 2026-03-18 22:19:53 --> [REGISTRATION] Form loaded
INFO - 2026-03-18 22:19:53 --> [REQ_ID=54453b7c65e0] [PERF] Execution time=0.021757
DEBUG - 2026-03-18 22:19:57 --> [REQ_ID=149ef892085f] [REQUEST][START] GET /index.php/Free/register
DEBUG - 2026-03-18 22:19:57 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-18 22:19:57 --> [REQ_ID=149ef892085f] [FILTER_BEFORE] /index.php/Free/register
DEBUG - 2026-03-18 22:19:57 --> [REQ_ID=149ef892085f] [ROUTE] Controller=\App\Controllers\AuthController Method=register
DEBUG - 2026-03-18 22:19:57 --> [REQ_ID=149ef892085f] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Free/register
DEBUG - 2026-03-18 22:19:57 --> [CSRF] token name=csrf_test_name hash=897dee1a7709c581a8f7d92f2e8979c9
DEBUG - 2026-03-18 22:19:57 --> [REQ_ID=cfca8ff19134] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-18 22:19:57 --> [REQ_ID=cfca8ff19134] [MEMORY][controller-start] 4194304
INFO - 2026-03-18 22:19:57 --> [REGISTRATION] Form loaded
INFO - 2026-03-18 22:19:57 --> [REQ_ID=cfca8ff19134] [PERF] Execution time=0.035734
DEBUG - 2026-03-18 22:20:15 --> [REQ_ID=a321243d8fa4] [REQUEST][START] GET /index.php/How-It-Works/Personal-Budgeting
DEBUG - 2026-03-18 22:20:15 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-18 22:20:15 --> [REQ_ID=a321243d8fa4] [FILTER_BEFORE] /index.php/How-It-Works/Personal-Budgeting
DEBUG - 2026-03-18 22:20:15 --> [REQ_ID=a321243d8fa4] [ROUTE] Controller=\App\Modules\Blog\Controllers\HowItWorksController Method=PersonalBudgeting
DEBUG - 2026-03-18 22:20:15 --> [REQ_ID=a321243d8fa4] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/How-It-Works/Personal-Budgeting
DEBUG - 2026-03-18 22:20:15 --> [CSRF] token name=csrf_test_name hash=91c533cc22210a8120994a1da476e195
DEBUG - 2026-03-18 22:20:15 --> [REQ_ID=1fad259f4943] [INIT] App\Modules\Blog\Controllers\HowItWorksController::GET
INFO - 2026-03-18 22:20:15 --> [REQ_ID=1fad259f4943] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-18 22:20:15 --> [REQ_ID=1fad259f4943] [METHOD_ENTRY] PersonalBudgeting
DEBUG - 2026-03-18 22:20:15 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-18 22:20:15 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-18 22:20:15 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-18 22:20:15 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-18 22:20:15 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-18 22:20:15 --> MyMICoin: guest context detected; skipping user-specific preload.
INFO - 2026-03-18 22:20:15 --> [REQ_ID=1fad259f4943] [MEMORY][commonData:start] 4194304
INFO - 2026-03-18 22:20:16 --> themesMemory usage: 8388608
DEBUG - 2026-03-18 22:20:16 --> [MetaService] slug=how-it-works/personal-budgeting pageName= cacheHit=1 path=CACHE
DEBUG - 2026-03-18 22:20:16 --> [REQ_ID=a321243d8fa4] [FILTER_AFTER]
DEBUG - 2026-03-18 22:20:16 --> [REQ_ID=a321243d8fa4] [LIFECYCLE][END] status=200 duration_ms=973.44 memory_delta=4194304
INFO - 2026-03-18 22:20:16 --> [REQ_ID=1fad259f4943] [PERF] Execution time=0.973113
DEBUG - 2026-03-18 22:20:16 --> [REQ_ID=a321243d8fa4] [REQUEST][END]
INFO - 2026-03-18 22:20:16 --> [REQ_ID=a321243d8fa4] [PERF] Execution time=0.984012
DEBUG - 2026-03-18 22:20:22 --> [REQ_ID=3189ce3ffa9e] [REQUEST][START] GET /index.php/How-It-Works/Investment-Portfolio-Management
DEBUG - 2026-03-18 22:20:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-18 22:20:22 --> [REQ_ID=3189ce3ffa9e] [FILTER_BEFORE] /index.php/How-It-Works/Investment-Portfolio-Management
DEBUG - 2026-03-18 22:20:22 --> [REQ_ID=3189ce3ffa9e] [ROUTE] Controller=\App\Modules\Blog\Controllers\HowItWorksController Method=InvestmentPortfolioManagement
DEBUG - 2026-03-18 22:20:22 --> [REQ_ID=3189ce3ffa9e] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/How-It-Works/Investment-Portfolio-Management
DEBUG - 2026-03-18 22:20:22 --> [CSRF] token name=csrf_test_name hash=5fe3cf707408df0fdd779e5c4da6e88f
DEBUG - 2026-03-18 22:20:22 --> [REQ_ID=767337ab7db0] [INIT] App\Modules\Blog\Controllers\HowItWorksController::GET
INFO - 2026-03-18 22:20:22 --> [REQ_ID=767337ab7db0] [MEMORY][controller-start] 6291456
DEBUG - 2026-03-18 22:20:22 --> [REQ_ID=767337ab7db0] [METHOD_ENTRY] InvestmentPortfolioManagement
DEBUG - 2026-03-18 22:20:22 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-18 22:20:22 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-18 22:20:22 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-18 22:20:22 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-18 22:20:22 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-18 22:20:22 --> MyMICoin: guest context detected; skipping user-specific preload.
INFO - 2026-03-18 22:20:22 --> [REQ_ID=767337ab7db0] [MEMORY][commonData:start] 6291456
INFO - 2026-03-18 22:20:22 --> themesMemory usage: 8388608
DEBUG - 2026-03-18 22:20:22 --> [MetaService] slug=how-it-works/investment-portfolio-management pageName= cacheHit=1 path=CACHE
DEBUG - 2026-03-18 22:20:22 --> [REQ_ID=3189ce3ffa9e] [FILTER_AFTER]
DEBUG - 2026-03-18 22:20:22 --> [REQ_ID=3189ce3ffa9e] [LIFECYCLE][END] status=200 duration_ms=740.67 memory_delta=2097152
INFO - 2026-03-18 22:20:22 --> [REQ_ID=767337ab7db0] [PERF] Execution time=0.740586
DEBUG - 2026-03-18 22:20:22 --> [REQ_ID=3189ce3ffa9e] [REQUEST][END]
INFO - 2026-03-18 22:20:22 --> [REQ_ID=3189ce3ffa9e] [PERF] Execution time=0.750748
DEBUG - 2026-03-18 22:20:26 --> [REQ_ID=faea7013bc29] [REQUEST][START] GET /index.php/How-It-Works/Daily-Financial-News
DEBUG - 2026-03-18 22:20:26 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-18 22:20:26 --> [REQ_ID=faea7013bc29] [FILTER_BEFORE] /index.php/How-It-Works/Daily-Financial-News
DEBUG - 2026-03-18 22:20:26 --> [REQ_ID=faea7013bc29] [ROUTE] Controller=\App\Modules\Blog\Controllers\HowItWorksController Method=DailyFinancialNews
DEBUG - 2026-03-18 22:20:26 --> [REQ_ID=faea7013bc29] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/How-It-Works/Daily-Financial-News
DEBUG - 2026-03-18 22:20:26 --> [CSRF] token name=csrf_test_name hash=407d22841f198b028b20ada53d5a67c5
DEBUG - 2026-03-18 22:20:26 --> [REQ_ID=6997e0d46f66] [INIT] App\Modules\Blog\Controllers\HowItWorksController::GET
INFO - 2026-03-18 22:20:26 --> [REQ_ID=6997e0d46f66] [MEMORY][controller-start] 6291456
DEBUG - 2026-03-18 22:20:26 --> [REQ_ID=6997e0d46f66] [METHOD_ENTRY] DailyFinancialNews
DEBUG - 2026-03-18 22:20:26 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-18 22:20:26 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-18 22:20:26 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-18 22:20:26 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-18 22:20:26 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-18 22:20:26 --> MyMICoin: guest context detected; skipping user-specific preload.
INFO - 2026-03-18 22:20:26 --> [REQ_ID=6997e0d46f66] [MEMORY][commonData:start] 6291456
INFO - 2026-03-18 22:20:26 --> themesMemory usage: 8388608
DEBUG - 2026-03-18 22:20:26 --> [MetaService] slug=how-it-works/daily-financial-news pageName= cacheHit=1 path=CACHE
DEBUG - 2026-03-18 22:20:26 --> [REQ_ID=faea7013bc29] [FILTER_AFTER]
DEBUG - 2026-03-18 22:20:26 --> [REQ_ID=faea7013bc29] [LIFECYCLE][END] status=200 duration_ms=803.78 memory_delta=2097152
INFO - 2026-03-18 22:20:26 --> [REQ_ID=6997e0d46f66] [PERF] Execution time=0.803429
DEBUG - 2026-03-18 22:20:26 --> [REQ_ID=faea7013bc29] [REQUEST][END]
INFO - 2026-03-18 22:20:26 --> [REQ_ID=faea7013bc29] [PERF] Execution time=0.813316
DEBUG - 2026-03-18 22:21:22 --> [REQ_ID=6b4b95b9ad1b] [REQUEST][START] HEAD /
DEBUG - 2026-03-18 22:21:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-18 22:21:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-18 22:21:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-18 22:21:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-18 22:21:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-18 22:26:22 --> [REQ_ID=906d4add1f20] [REQUEST][START] HEAD /
DEBUG - 2026-03-18 22:26:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-18 22:26:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-18 22:26:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-18 22:26:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-18 22:26:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-18 22:31:22 --> [REQ_ID=f13c1a5d61f9] [REQUEST][START] HEAD /
DEBUG - 2026-03-18 22:31:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-18 22:31:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-18 22:31:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-18 22:31:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-18 22:31:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-18 22:34:18 --> [REQ_ID=321c1e26755b] [REQUEST][START] GET /index.php/Dashboard
DEBUG - 2026-03-18 22:34:18 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-18 22:34:18 --> [REQ_ID=321c1e26755b] [FILTER_BEFORE] /index.php/Dashboard
DEBUG - 2026-03-18 22:34:18 --> [REQ_ID=321c1e26755b] [ROUTE] Controller=\App\Modules\User\Controllers\DashboardController Method=index
DEBUG - 2026-03-18 22:34:18 --> [REQ_ID=321c1e26755b] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Dashboard
DEBUG - 2026-03-18 22:34:18 --> [CSRF] token name=csrf_test_name hash=6dafed7288828b4930d7a2dd60bb4f0b
DEBUG - 2026-03-18 22:34:18 --> [REQ_ID=82334012fb0f] [INIT] App\Modules\User\Controllers\DashboardController::GET
INFO - 2026-03-18 22:34:18 --> [REQ_ID=82334012fb0f] [MEMORY][controller-start] 6291456
DEBUG - 2026-03-18 22:34:18 --> [REQ_ID=82334012fb0f] [METHOD_ENTRY] index
DEBUG - 2026-03-18 22:34:18 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-18 22:34:18 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-18 22:34:18 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-18 22:34:18 --> MyMIMarketing: Pscrape library not installed; Google search scraping will use fallback.
DEBUG - 2026-03-18 22:34:18 --> [DASHBOARD] Enter
DEBUG - 2026-03-18 22:34:18 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-18 22:34:18 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-18 22:34:18 --> [SERVICE] App\Services\BudgetService ::getUserBudget
DEBUG - 2026-03-18 22:34:18 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":2,"deleted":0}
DEBUG - 2026-03-18 22:34:18 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-18 22:34:18 --> [MODEL_WHERE] App\Models\BudgetModel KEY="created_by"
DEBUG - 2026-03-18 22:34:18 --> [MODEL_WHERE] App\Models\BudgetModel KEY="account_type"
DEBUG - 2026-03-18 22:34:18 --> [MODEL_WHERE] App\Models\BudgetModel KEY="designated_date >="
DEBUG - 2026-03-18 22:34:18 --> [MODEL_WHERE] App\Models\BudgetModel KEY="designated_date <="
DEBUG - 2026-03-18 22:34:18 --> [MODEL_WHERE] App\Models\BudgetModel KEY="year"
DEBUG - 2026-03-18 22:34:18 --> [MODEL_WHERE] App\Models\BudgetModel KEY="month <="
DEBUG - 2026-03-18 22:34:18 --> [MODEL_WHERE] App\Models\BudgetModel KEY="day <="
DEBUG - 2026-03-18 22:34:18 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":2,"account_type":"Income","month":"03","year":"2026"}
DEBUG - 2026-03-18 22:34:18 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-03-18 22:34:18 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":2,"account_type":"Income","month":"02","year":"2026"}
DEBUG - 2026-03-18 22:34:18 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-03-18 22:34:18 --> [MODEL_WHERE] App\Models\BudgetModel KEY="created_by"
DEBUG - 2026-03-18 22:34:18 --> [MODEL_WHERE] App\Models\BudgetModel KEY="account_type"
DEBUG - 2026-03-18 22:34:18 --> [MODEL_WHERE] App\Models\BudgetModel KEY="designated_date >="
DEBUG - 2026-03-18 22:34:18 --> [MODEL_WHERE] App\Models\BudgetModel KEY="designated_date <="
DEBUG - 2026-03-18 22:34:18 --> [MODEL_WHERE] App\Models\BudgetModel KEY="year"
DEBUG - 2026-03-18 22:34:18 --> [MODEL_WHERE] App\Models\BudgetModel KEY="month <="
DEBUG - 2026-03-18 22:34:18 --> [MODEL_WHERE] App\Models\BudgetModel KEY="day <="
DEBUG - 2026-03-18 22:34:18 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":2,"account_type":"Expense","month":"03","year":"2026"}
DEBUG - 2026-03-18 22:34:18 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-03-18 22:34:18 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":2,"account_type":"Expense","month":"02","year":"2026"}
DEBUG - 2026-03-18 22:34:18 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-03-18 22:34:18 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"status":1,"created_by":2,"deleted":0}
DEBUG - 2026-03-18 22:34:18 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"status":1,"paid":0,"created_by":2,"deleted":0}
DEBUG - 2026-03-18 22:34:18 --> Skipping placeholder symbol for row 46402
DEBUG - 2026-03-18 22:34:18 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"status":1,"created_by":2,"deleted":0}
ERROR - 2026-03-18 22:34:18 --> DashboardController::index failed to load executive summary: Call to undefined method CodeIgniter\Cache\Handlers\FileHandler::set()
DEBUG - 2026-03-18 22:34:18 --> [CACHE_MISS] mymiwallet_development_squeeze_high-risk_global_global_1f86633dd
ERROR - 2026-03-18 22:34:18 --> Unknown column 'score_total' in 'where clause'
in SYSTEMPATH/Database/MySQLi/Connection.php on line 300.
 1 SYSTEMPATH/Database/MySQLi/Connection.php(300): mysqli->query('SELECT COUNT(*) AS `numrows`
FROM `bf_squeeze_scorecards`
WHERE `score_total` >= 80
AND `as_of_datetime` >= \'2026-03-17 22:34:18\'', 0)
 2 SYSTEMPATH/Database/BaseConnection.php(769): CodeIgniter\Database\MySQLi\Connection->execute('SELECT COUNT(*) AS `numrows`
FROM `bf_squeeze_scorecards`
WHERE `score_total` >= 80
AND `as_of_datetime` >= \'2026-03-17 22:34:18\'')
 3 SYSTEMPATH/Database/BaseConnection.php(686): CodeIgniter\Database\BaseConnection->simpleQuery('SELECT COUNT(*) AS `numrows`
FROM `bf_squeeze_scorecards`
WHERE `score_total` >= 80
AND `as_of_datetime` >= \'2026-03-17 22:34:18\'')
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
DEBUG - 2026-03-18 22:34:18 --> MyMIInvestments::getSqueezeHighRiskCount failed: Unknown column 'score_total' in 'where clause'
DEBUG - 2026-03-18 22:34:18 --> 📰 Daily dashboard news window 2026-03-18 00:00:00 -> 2026-03-18 23:59:59 returned 0 rows
DEBUG - 2026-03-18 22:34:18 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-18 22:34:18 --> [SETUP] Status computed
DEBUG - 2026-03-18 22:34:18 --> [REQ_ID=82334012fb0f] [VIEW_RENDER] User/Dashboard/index
INFO - 2026-03-18 22:34:18 --> [REQ_ID=82334012fb0f] [MEMORY][commonData:start] 8388608
DEBUG - 2026-03-18 22:34:18 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-18 22:34:18 --> [MODEL_WHERE] App\Models\BudgetModel KEY="created_by"
DEBUG - 2026-03-18 22:34:18 --> [MODEL_WHERE] App\Models\BudgetModel KEY="account_type"
DEBUG - 2026-03-18 22:34:18 --> [MODEL_WHERE] App\Models\BudgetModel KEY="designated_date >="
DEBUG - 2026-03-18 22:34:18 --> [MODEL_WHERE] App\Models\BudgetModel KEY="designated_date <="
DEBUG - 2026-03-18 22:34:18 --> [MODEL_WHERE] App\Models\BudgetModel KEY="year"
DEBUG - 2026-03-18 22:34:18 --> [MODEL_WHERE] App\Models\BudgetModel KEY="month <="
DEBUG - 2026-03-18 22:34:18 --> [MODEL_WHERE] App\Models\BudgetModel KEY="day <="
DEBUG - 2026-03-18 22:34:18 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":2,"account_type":"Income","month":"03","year":"2026"}
DEBUG - 2026-03-18 22:34:18 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-03-18 22:34:18 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":2,"account_type":"Income","month":"02","year":"2026"}
DEBUG - 2026-03-18 22:34:18 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-03-18 22:34:18 --> [MODEL_WHERE] App\Models\BudgetModel KEY="created_by"
DEBUG - 2026-03-18 22:34:18 --> [MODEL_WHERE] App\Models\BudgetModel KEY="account_type"
DEBUG - 2026-03-18 22:34:18 --> [MODEL_WHERE] App\Models\BudgetModel KEY="designated_date >="
DEBUG - 2026-03-18 22:34:18 --> [MODEL_WHERE] App\Models\BudgetModel KEY="designated_date <="
DEBUG - 2026-03-18 22:34:18 --> [MODEL_WHERE] App\Models\BudgetModel KEY="year"
DEBUG - 2026-03-18 22:34:18 --> [MODEL_WHERE] App\Models\BudgetModel KEY="month <="
DEBUG - 2026-03-18 22:34:18 --> [MODEL_WHERE] App\Models\BudgetModel KEY="day <="
DEBUG - 2026-03-18 22:34:18 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":2,"account_type":"Expense","month":"03","year":"2026"}
DEBUG - 2026-03-18 22:34:18 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-03-18 22:34:18 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":2,"account_type":"Expense","month":"02","year":"2026"}
DEBUG - 2026-03-18 22:34:18 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-03-18 22:34:18 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"status":1,"created_by":2,"deleted":0}
DEBUG - 2026-03-18 22:34:18 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"status":1,"paid":0,"created_by":2,"deleted":0}
DEBUG - 2026-03-18 22:34:18 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-18 22:34:18 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"status":1,"created_by":2,"deleted":0}
DEBUG - 2026-03-18 22:34:18 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"status":1,"paid":0,"created_by":2,"deleted":0}
DEBUG - 2026-03-18 22:34:18 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":2,"account_type":"Income","status":1,"month":"03","year":"2026"}
DEBUG - 2026-03-18 22:34:18 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-03-18 22:34:18 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":2,"account_type":"Expense","status":1,"month":"03","year":"2026"}
DEBUG - 2026-03-18 22:34:18 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-03-18 22:34:18 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":2,"account_type":"Investment","month":"03","year":"2026","status":1}
DEBUG - 2026-03-18 22:34:18 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-03-18 22:34:18 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":2,"account_type":"Income","status":1,"month":"02"}
DEBUG - 2026-03-18 22:34:18 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-03-18 22:34:18 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":2,"account_type":"Expense","status":1,"month":"02"}
DEBUG - 2026-03-18 22:34:18 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-03-18 22:34:18 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":2,"account_type":"Investment","month":"02","year":"2026","status":1}
DEBUG - 2026-03-18 22:34:18 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-03-18 22:34:18 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":2,"account_type":"Income","status":1,"month":"04"}
DEBUG - 2026-03-18 22:34:18 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-03-18 22:34:18 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":2,"account_type":"Expense","status":1,"month":"04"}
DEBUG - 2026-03-18 22:34:18 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-03-18 22:34:18 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":2,"account_type":"Investment","month":"04","year":"2026","status":1}
DEBUG - 2026-03-18 22:34:18 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-03-18 22:34:18 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":2,"account_type":"Income","status":1,"year":"2026"}
DEBUG - 2026-03-18 22:34:18 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-03-18 22:34:18 --> [MODEL_WHERE] App\Models\BudgetModel KEY="created_by"
DEBUG - 2026-03-18 22:34:18 --> [MODEL_WHERE] App\Models\BudgetModel KEY="account_type"
DEBUG - 2026-03-18 22:34:18 --> [MODEL_WHERE] App\Models\BudgetModel KEY="status"
DEBUG - 2026-03-18 22:34:18 --> [MODEL_WHERE] App\Models\BudgetModel KEY="year"
DEBUG - 2026-03-18 22:34:18 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-03-18 22:34:18 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":2,"account_type":"Investment","status":1}
DEBUG - 2026-03-18 22:34:18 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-03-18 22:34:18 --> [MODEL_WHERE] App\Models\BudgetModel KEY="created_by"
DEBUG - 2026-03-18 22:34:18 --> [MODEL_WHERE] App\Models\BudgetModel KEY="account_type"
DEBUG - 2026-03-18 22:34:18 --> [MODEL_WHERE] App\Models\BudgetModel KEY="status"
DEBUG - 2026-03-18 22:34:18 --> [MODEL_WHERE] App\Models\BudgetModel KEY="designated_date >="
DEBUG - 2026-03-18 22:34:18 --> [MODEL_WHERE] App\Models\BudgetModel KEY="designated_date <="
DEBUG - 2026-03-18 22:34:18 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-03-18 22:34:18 --> [MODEL_WHERE] App\Models\BudgetModel KEY="created_by"
DEBUG - 2026-03-18 22:34:18 --> [MODEL_WHERE] App\Models\BudgetModel KEY="account_type"
DEBUG - 2026-03-18 22:34:18 --> [MODEL_WHERE] App\Models\BudgetModel KEY="status"
DEBUG - 2026-03-18 22:34:18 --> [MODEL_WHERE] App\Models\BudgetModel KEY="designated_date >="
DEBUG - 2026-03-18 22:34:18 --> [MODEL_WHERE] App\Models\BudgetModel KEY="designated_date <="
DEBUG - 2026-03-18 22:34:18 --> [MODEL_FIRST] App\Models\BudgetModel
INFO - 2026-03-18 22:34:18 --> DashboardController L72 - $checkingSummary: 8784.01
DEBUG - 2026-03-18 22:34:18 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-18 22:34:18 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-18 22:34:18 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-18 22:34:19 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-18 22:34:19 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-18 22:34:19 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-18 22:34:19 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-18 22:34:19 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-18 22:34:19 --> [SERVICE] App\Services\BudgetService ::getUserBudget
DEBUG - 2026-03-18 22:34:19 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":2,"deleted":0}
DEBUG - 2026-03-18 22:34:19 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-18 22:34:19 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"status":1,"created_by":2,"deleted":0}
DEBUG - 2026-03-18 22:34:19 --> [MODEL_WHERE] App\Models\BudgetModel KEY="created_by"
DEBUG - 2026-03-18 22:34:19 --> [MODEL_WHERE] App\Models\BudgetModel KEY="account_type"
DEBUG - 2026-03-18 22:34:19 --> [MODEL_WHERE] App\Models\BudgetModel KEY="designated_date >="
DEBUG - 2026-03-18 22:34:19 --> [MODEL_WHERE] App\Models\BudgetModel KEY="designated_date <="
DEBUG - 2026-03-18 22:34:19 --> [MODEL_WHERE] App\Models\BudgetModel KEY="year"
DEBUG - 2026-03-18 22:34:19 --> [MODEL_WHERE] App\Models\BudgetModel KEY="month <="
DEBUG - 2026-03-18 22:34:19 --> [MODEL_WHERE] App\Models\BudgetModel KEY="day <="
DEBUG - 2026-03-18 22:34:19 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":2,"account_type":"Income","month":"03","year":"2026"}
DEBUG - 2026-03-18 22:34:19 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-03-18 22:34:19 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":2,"account_type":"Income","month":"02","year":"2026"}
DEBUG - 2026-03-18 22:34:19 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-03-18 22:34:19 --> [MODEL_WHERE] App\Models\BudgetModel KEY="created_by"
DEBUG - 2026-03-18 22:34:19 --> [MODEL_WHERE] App\Models\BudgetModel KEY="account_type"
DEBUG - 2026-03-18 22:34:19 --> [MODEL_WHERE] App\Models\BudgetModel KEY="designated_date >="
DEBUG - 2026-03-18 22:34:19 --> [MODEL_WHERE] App\Models\BudgetModel KEY="designated_date <="
DEBUG - 2026-03-18 22:34:19 --> [MODEL_WHERE] App\Models\BudgetModel KEY="year"
DEBUG - 2026-03-18 22:34:19 --> [MODEL_WHERE] App\Models\BudgetModel KEY="month <="
DEBUG - 2026-03-18 22:34:19 --> [MODEL_WHERE] App\Models\BudgetModel KEY="day <="
DEBUG - 2026-03-18 22:34:19 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":2,"account_type":"Expense","month":"03","year":"2026"}
DEBUG - 2026-03-18 22:34:19 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-03-18 22:34:19 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":2,"account_type":"Expense","month":"02","year":"2026"}
DEBUG - 2026-03-18 22:34:19 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-03-18 22:34:19 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"status":1,"created_by":2,"deleted":0}
DEBUG - 2026-03-18 22:34:19 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"status":1,"paid":0,"created_by":2,"deleted":0}
INFO - 2026-03-18 22:34:19 --> getSolanaData: invalid address param
INFO - 2026-03-18 22:34:19 --> themesMemory usage: 10485760
DEBUG - 2026-03-18 22:34:19 --> [REQ_ID=321c1e26755b] [FILTER_AFTER]
DEBUG - 2026-03-18 22:34:19 --> [REQ_ID=321c1e26755b] [LIFECYCLE][END] status=200 duration_ms=1,195.88 memory_delta=4194304
INFO - 2026-03-18 22:34:19 --> [REQ_ID=82334012fb0f] [PERF] Execution time=1.002026
DEBUG - 2026-03-18 22:34:19 --> [REQ_ID=321c1e26755b] [REQUEST][END]
INFO - 2026-03-18 22:34:19 --> [REQ_ID=321c1e26755b] [PERF] Execution time=1.239462
DEBUG - 2026-03-18 22:36:22 --> [REQ_ID=4a8f06158586] [REQUEST][START] HEAD /
DEBUG - 2026-03-18 22:36:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-18 22:36:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-18 22:36:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-18 22:36:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-18 22:36:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-18 22:39:30 --> [REQ_ID=1503bedd29b5] [REQUEST][START] GET /index.php/How-It-Works/Personal-Budgeting
DEBUG - 2026-03-18 22:39:30 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-18 22:39:30 --> [REQ_ID=1503bedd29b5] [REQUEST][END]
INFO - 2026-03-18 22:39:30 --> [REQ_ID=1503bedd29b5] [PERF] Execution time=0.041976
DEBUG - 2026-03-18 22:41:22 --> [REQ_ID=73f22b502073] [REQUEST][START] HEAD /
DEBUG - 2026-03-18 22:41:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-18 22:41:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-18 22:41:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-18 22:41:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-18 22:41:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-18 22:46:22 --> [REQ_ID=bae9ed7cf202] [REQUEST][START] HEAD /
DEBUG - 2026-03-18 22:46:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-18 22:46:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-18 22:46:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-18 22:46:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-18 22:46:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-18 22:51:22 --> [REQ_ID=2ba3c21e6ff6] [REQUEST][START] HEAD /
DEBUG - 2026-03-18 22:51:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-18 22:51:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-18 22:51:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-18 22:51:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-18 22:51:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-18 22:56:22 --> [REQ_ID=6cb6667739e4] [REQUEST][START] HEAD /
DEBUG - 2026-03-18 22:56:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-18 22:56:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-18 22:56:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-18 22:56:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-18 22:56:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-18 23:00:01 --> [REQ_ID=39e5f7876207] [REQUEST][START] GET /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-18 23:00:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-18 23:00:01 --> [REQ_ID=39e5f7876207] [FILTER_BEFORE] /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-18 23:00:01 --> [REQ_ID=39e5f7876207] [ROUTE] Controller=\App\Modules\Management\Controllers\ManagementAPIController Method=Run_CRON_Tasks
DEBUG - 2026-03-18 23:00:01 --> [REQ_ID=39e5f7876207] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-18 23:00:01 --> [REQ_ID=39e5f7876207] [REQUEST][END]
INFO - 2026-03-18 23:00:01 --> [REQ_ID=39e5f7876207] [PERF] Execution time=0.051658
DEBUG - 2026-03-18 23:01:22 --> [REQ_ID=96dec3aa872b] [REQUEST][START] HEAD /
DEBUG - 2026-03-18 23:01:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-18 23:01:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-18 23:01:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-18 23:01:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-18 23:01:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-18 23:06:22 --> [REQ_ID=4865da2be10a] [REQUEST][START] HEAD /
DEBUG - 2026-03-18 23:06:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-18 23:06:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-18 23:06:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-18 23:06:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-18 23:06:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-18 23:10:04 --> [REQ_ID=0d76e8f1c53d] [REQUEST][START] GET /index.php/Beta/register
DEBUG - 2026-03-18 23:10:04 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-18 23:10:04 --> [REQ_ID=0d76e8f1c53d] [REQUEST][END]
INFO - 2026-03-18 23:10:04 --> [REQ_ID=0d76e8f1c53d] [PERF] Execution time=0.041311
DEBUG - 2026-03-18 23:11:22 --> [REQ_ID=0cb29cf92ed7] [REQUEST][START] HEAD /
DEBUG - 2026-03-18 23:11:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-18 23:11:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-18 23:11:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-18 23:11:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-18 23:11:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-18 23:15:02 --> [REQ_ID=5c5b3818cc63] [REQUEST][START] GET /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-18 23:15:02 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-18 23:15:02 --> [REQ_ID=5c5b3818cc63] [FILTER_BEFORE] /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-18 23:15:02 --> [REQ_ID=5c5b3818cc63] [ROUTE] Controller=\App\Modules\APIs\Controllers\AlertsAPIController Method=fetchEmailAlerts
DEBUG - 2026-03-18 23:15:02 --> [REQ_ID=5c5b3818cc63] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-18 23:15:02 --> [REQ_ID=5c5b3818cc63] [REQUEST][END]
INFO - 2026-03-18 23:15:02 --> [REQ_ID=5c5b3818cc63] [PERF] Execution time=0.046831
DEBUG - 2026-03-18 23:16:22 --> [REQ_ID=4c9abb950d65] [REQUEST][START] HEAD /
DEBUG - 2026-03-18 23:16:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-18 23:16:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-18 23:16:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-18 23:16:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-18 23:16:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-18 23:17:46 --> [REQ_ID=9e3531c9e20b] [REQUEST][START] GET /index.php/Investments
DEBUG - 2026-03-18 23:17:46 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-18 23:17:46 --> [REQ_ID=9e3531c9e20b] [FILTER_BEFORE] /index.php/Investments
DEBUG - 2026-03-18 23:17:46 --> [REQ_ID=9e3531c9e20b] [ROUTE] Controller=\App\Modules\User\Controllers\InvestmentsController Method=index
DEBUG - 2026-03-18 23:17:46 --> [REQ_ID=9e3531c9e20b] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Investments
DEBUG - 2026-03-18 23:17:46 --> [CSRF] token name=csrf_test_name hash=684a04798ac340b35116e34a3e4d032c
DEBUG - 2026-03-18 23:17:46 --> [REQ_ID=9e3531c9e20b] [REQUEST][END]
INFO - 2026-03-18 23:17:46 --> [REQ_ID=9e3531c9e20b] [PERF] Execution time=0.055326
DEBUG - 2026-03-18 23:17:46 --> [REQ_ID=a1a118e66893] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-18 23:17:46 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-18 23:17:47 --> [REQ_ID=a1a118e66893] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-18 23:17:47 --> [REQ_ID=a1a118e66893] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-18 23:17:47 --> [REQ_ID=a1a118e66893] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-18 23:17:47 --> [CSRF] token name=csrf_test_name hash=c60b4d9ae7de93074f5d101bc029a01f
DEBUG - 2026-03-18 23:17:47 --> [REQ_ID=039bc1f47a16] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-18 23:17:47 --> [REQ_ID=039bc1f47a16] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-18 23:17:47 --> [REQ_ID=a1a118e66893] [FILTER_AFTER]
DEBUG - 2026-03-18 23:17:47 --> [REQ_ID=a1a118e66893] [LIFECYCLE][END] status=200 duration_ms=43.21 memory_delta=0
INFO - 2026-03-18 23:17:47 --> [REQ_ID=039bc1f47a16] [PERF] Execution time=0.043011
DEBUG - 2026-03-18 23:17:47 --> [REQ_ID=a1a118e66893] [REQUEST][END]
INFO - 2026-03-18 23:17:47 --> [REQ_ID=a1a118e66893] [PERF] Execution time=0.055058
DEBUG - 2026-03-18 23:21:22 --> [REQ_ID=5aa58a6816b0] [REQUEST][START] HEAD /
DEBUG - 2026-03-18 23:21:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-18 23:21:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-18 23:21:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-18 23:21:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-18 23:21:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-18 23:26:22 --> [REQ_ID=7c71e797b5ae] [REQUEST][START] HEAD /
DEBUG - 2026-03-18 23:26:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-18 23:26:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-18 23:26:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-18 23:26:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-18 23:26:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-18 23:29:06 --> [REQ_ID=fed43cb2da05] [REQUEST][START] GET /index.php/Wallets/Purchase/Memberships
DEBUG - 2026-03-18 23:29:06 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-18 23:29:06 --> [REQ_ID=fed43cb2da05] [REQUEST][END]
INFO - 2026-03-18 23:29:06 --> [REQ_ID=fed43cb2da05] [PERF] Execution time=0.044162
DEBUG - 2026-03-18 23:31:22 --> [REQ_ID=018ac96a53e9] [REQUEST][START] HEAD /
DEBUG - 2026-03-18 23:31:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-18 23:31:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-18 23:31:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-18 23:31:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-18 23:31:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-18 23:36:22 --> [REQ_ID=5fc7115470aa] [REQUEST][START] HEAD /
DEBUG - 2026-03-18 23:36:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-18 23:36:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-18 23:36:23 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-18 23:36:23 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-18 23:36:23 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-18 23:41:22 --> [REQ_ID=9bd9ad4d1b2c] [REQUEST][START] HEAD /
DEBUG - 2026-03-18 23:41:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-18 23:41:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-18 23:41:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-18 23:41:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-18 23:41:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-18 23:46:22 --> [REQ_ID=c69875c729f8] [REQUEST][START] HEAD /
DEBUG - 2026-03-18 23:46:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-18 23:46:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-18 23:46:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-18 23:46:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-18 23:46:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-18 23:48:54 --> [REQ_ID=3a366565a7a2] [REQUEST][START] GET /index.php/News/After-Hours-Movers/November-15th-2021
DEBUG - 2026-03-18 23:48:54 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-18 23:48:54 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: GET, Route: News/After-Hours-Movers/November-15th-2021]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-18 23:48:54 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-18 23:48:54 --> [404] URI=https://www.mymiwallet.com/index.php/News/After-Hours-Movers/November-15th-2021
WARNING - 2026-03-18 23:48:54 --> 404 route miss: https://www.mymiwallet.com/index.php/News/After-Hours-Movers/November-15th-2021 | referrer: none
ERROR - 2026-03-18 23:48:54 --> [ERROR_PAGE] event=error_404 status=404 message=Page not found.
DEBUG - 2026-03-18 23:51:22 --> [REQ_ID=d894e5127f99] [REQUEST][START] HEAD /
DEBUG - 2026-03-18 23:51:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-18 23:51:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-18 23:51:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-18 23:51:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-18 23:51:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-18 23:56:22 --> [REQ_ID=0d6ba41a5b33] [REQUEST][START] HEAD /
DEBUG - 2026-03-18 23:56:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-18 23:56:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-18 23:56:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-18 23:56:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-18 23:56:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
