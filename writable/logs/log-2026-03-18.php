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
