<?php defined('SYSTEMPATH') || exit('No direct script access allowed'); ?>

INFO - 2026-03-07 00:00:01 --> [SPARK_START] App\Commands\AIOps\Run
INFO - 2026-03-07 00:00:01 --> [SPARK_MEMORY] 16777216
INFO - 2026-03-07 00:00:01 --> [spark:aiops:run] Intent
INFO - 2026-03-07 00:00:02 --> [spark:ops:work] Started
INFO - 2026-03-07 00:00:02 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-03-07 00:00:02 --> [SPARK_MEMORY] 16777216
INFO - 2026-03-07 00:00:02 --> [spark:ops:work] Intent
DEBUG - 2026-03-07 00:00:02 --> [REQ_ID=f40282903e47] [REQUEST][START] GET /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-07 00:00:02 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-07 00:00:02 --> [REQ_ID=f40282903e47] [FILTER_BEFORE] /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-07 00:00:02 --> [REQ_ID=f40282903e47] [ROUTE] Controller=\App\Modules\Management\Controllers\ManagementAPIController Method=Run_CRON_Tasks
DEBUG - 2026-03-07 00:00:02 --> [REQ_ID=f40282903e47] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-07 00:00:02 --> [REQ_ID=f40282903e47] [REQUEST][END]
INFO - 2026-03-07 00:00:02 --> [REQ_ID=f40282903e47] [PERF] Execution time=0.094012
INFO - 2026-03-07 00:00:02 --> [spark:ops:work] Completed
INFO - 2026-03-07 00:00:02 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.301487
INFO - 2026-03-07 00:00:02 --> [SPARK_MEMORY] 18874368
INFO - 2026-03-07 00:00:03 --> [AIOPS][SPARK][GOVERNANCE][spark:logs:summarize] Started
INFO - 2026-03-07 00:00:03 --> [SPARK_START] App\Commands\Logs\Summarize
INFO - 2026-03-07 00:00:03 --> [SPARK_MEMORY] 16777216
INFO - 2026-03-07 00:00:03 --> [spark:logs:summarize] Intent
INFO - 2026-03-07 00:00:03 --> [AIOPS][SPARK][GOVERNANCE][spark:logs:summarize] Completed
INFO - 2026-03-07 00:00:03 --> [SPARK_COMPLETE] App\Commands\Logs\Summarize duration=0.002126
INFO - 2026-03-07 00:00:03 --> [SPARK_MEMORY] 16777216
INFO - 2026-03-07 00:00:03 --> [spark:app:healthcheck] Started
INFO - 2026-03-07 00:00:03 --> [SPARK_START] App\Commands\App\Healthcheck
INFO - 2026-03-07 00:00:03 --> [SPARK_MEMORY] 16777216
INFO - 2026-03-07 00:00:03 --> [spark:app:healthcheck] Intent
DEBUG - 2026-03-07 00:00:03 --> LOG_HEALTHCHECK debug marker=44f7d6b47676
INFO - 2026-03-07 00:00:03 --> LOG_HEALTHCHECK info marker=44f7d6b47676
NOTICE - 2026-03-07 00:00:03 --> LOG_HEALTHCHECK probe marker=44f7d6b47676
INFO - 2026-03-07 00:00:03 --> [spark:app:healthcheck] Completed
INFO - 2026-03-07 00:00:03 --> [SPARK_COMPLETE] App\Commands\App\Healthcheck duration=0.026098
INFO - 2026-03-07 00:00:03 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-03-07 00:00:04 --> OllamaPatchRunner:L142 - validateGeneratedPatch Content: 
WARNING - 2026-03-07 00:00:04 --> OllamaPatchRunner:L49 - Original Diff: 
DEBUG - 2026-03-07 00:00:05 --> OllamaPatchRunner:L51 - Retried Diff: 
DEBUG - 2026-03-07 00:00:05 --> OllamaPatchRunner:L142 - validateGeneratedPatch Content: 
DEBUG - 2026-03-07 00:00:05 --> OllamaPatchRunner:L53 - Validating Generated Patch Failed
INFO - 2026-03-07 00:00:05 --> [SPARK_COMPLETE] App\Commands\AIOps\Run duration=3.451041
INFO - 2026-03-07 00:00:05 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-03-07 00:01:19 --> [REQ_ID=5a1bf18c45f0] [REQUEST][START] HEAD /
DEBUG - 2026-03-07 00:01:19 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-07 00:01:19 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-07 00:01:19 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-07 00:01:19 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-07 00:01:19 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-07 00:06:19 --> [REQ_ID=665e1483be36] [REQUEST][START] HEAD /
DEBUG - 2026-03-07 00:06:19 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-07 00:06:19 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-07 00:06:19 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-07 00:06:19 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-07 00:06:19 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-07 00:07:51 --> [REQ_ID=e78d17682b0f] [REQUEST][START] GET /
DEBUG - 2026-03-07 00:07:51 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-07 00:07:51 --> [REQ_ID=e78d17682b0f] [FILTER_BEFORE] /
DEBUG - 2026-03-07 00:07:51 --> [REQ_ID=e78d17682b0f] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-07 00:07:51 --> [REQ_ID=e78d17682b0f] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-07 00:07:51 --> [CSRF] token name=csrf_test_name hash=422c3acde637cd50b0c4ac304dce4241
DEBUG - 2026-03-07 00:07:51 --> [REQ_ID=7137576256aa] [INIT] App\Controllers\Home::GET
INFO - 2026-03-07 00:07:51 --> [REQ_ID=7137576256aa] [MEMORY][controller-start] 6291456
INFO - 2026-03-07 00:07:51 --> [REQ_ID=7137576256aa] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-07 00:07:51 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-07 00:07:51 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-03-07 00:07:51 --> [REQ_ID=7137576256aa] [VIEW_RENDER] themes/public/home
INFO - 2026-03-07 00:07:51 --> [REQ_ID=7137576256aa] [MEMORY][commonData:start] 10485760
INFO - 2026-03-07 00:07:51 --> themesMemory usage: 10485760
DEBUG - 2026-03-07 00:07:51 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-07 00:07:51 --> [REQ_ID=e78d17682b0f] [FILTER_AFTER]
DEBUG - 2026-03-07 00:07:51 --> [REQ_ID=e78d17682b0f] [LIFECYCLE][END] status=200 duration_ms=665.37 memory_delta=4194304
INFO - 2026-03-07 00:07:51 --> [REQ_ID=7137576256aa] [PERF] Execution time=0.663530
DEBUG - 2026-03-07 00:07:51 --> [REQ_ID=e78d17682b0f] [REQUEST][END]
INFO - 2026-03-07 00:07:51 --> [REQ_ID=e78d17682b0f] [PERF] Execution time=0.706624
DEBUG - 2026-03-07 00:11:19 --> [REQ_ID=bb454bb4c5c0] [REQUEST][START] HEAD /
DEBUG - 2026-03-07 00:11:19 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-07 00:11:19 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-07 00:11:19 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-07 00:11:19 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-07 00:11:19 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
INFO - 2026-03-07 00:15:02 --> [spark:ops:work] Started
INFO - 2026-03-07 00:15:02 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-03-07 00:15:02 --> [SPARK_MEMORY] 16777216
INFO - 2026-03-07 00:15:02 --> [spark:ops:work] Intent
DEBUG - 2026-03-07 00:15:02 --> [REQ_ID=dd1175dcac27] [REQUEST][START] GET /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-07 00:15:02 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-07 00:15:02 --> [REQ_ID=dd1175dcac27] [FILTER_BEFORE] /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-07 00:15:02 --> [REQ_ID=dd1175dcac27] [ROUTE] Controller=\App\Modules\APIs\Controllers\AlertsAPIController Method=fetchEmailAlerts
DEBUG - 2026-03-07 00:15:02 --> [REQ_ID=dd1175dcac27] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-07 00:15:02 --> [REQ_ID=dd1175dcac27] [REQUEST][END]
INFO - 2026-03-07 00:15:02 --> [REQ_ID=dd1175dcac27] [PERF] Execution time=0.044809
INFO - 2026-03-07 00:15:02 --> [spark:ops:work] Completed
INFO - 2026-03-07 00:15:02 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.254908
INFO - 2026-03-07 00:15:02 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-03-07 00:16:19 --> [REQ_ID=1134843ad782] [REQUEST][START] HEAD /
DEBUG - 2026-03-07 00:16:19 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-07 00:16:19 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-07 00:16:19 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-07 00:16:19 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-07 00:16:19 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-07 00:17:17 --> [REQ_ID=2dbc41c9efc7] [REQUEST][START] GET /index.php/Management/Budgeting
DEBUG - 2026-03-07 00:17:17 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-07 00:17:17 --> [REQ_ID=2dbc41c9efc7] [FILTER_BEFORE] /index.php/Management/Budgeting
DEBUG - 2026-03-07 00:17:17 --> [REQ_ID=2dbc41c9efc7] [ROUTE] Controller=\App\Modules\Management\Controllers\BudgetingAdminController Method=index
DEBUG - 2026-03-07 00:17:17 --> [REQ_ID=2dbc41c9efc7] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Management/Budgeting
DEBUG - 2026-03-07 00:17:17 --> [CSRF] token name=csrf_test_name hash=2acc8519a94eac6d9465f1c175913483
DEBUG - 2026-03-07 00:17:17 --> [REQ_ID=2dbc41c9efc7] [REQUEST][END]
INFO - 2026-03-07 00:17:17 --> [REQ_ID=2dbc41c9efc7] [PERF] Execution time=0.023685
DEBUG - 2026-03-07 00:17:17 --> [REQ_ID=8764b59c885a] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-07 00:17:17 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-07 00:17:17 --> [REQ_ID=8764b59c885a] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-07 00:17:17 --> [REQ_ID=8764b59c885a] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-07 00:17:17 --> [REQ_ID=8764b59c885a] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-07 00:17:17 --> [CSRF] token name=csrf_test_name hash=7a20148569a7a5269b6bf79027697a13
DEBUG - 2026-03-07 00:17:17 --> [REQ_ID=349b94ec3592] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-07 00:17:17 --> [REQ_ID=349b94ec3592] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-07 00:17:17 --> [REQ_ID=8764b59c885a] [FILTER_AFTER]
DEBUG - 2026-03-07 00:17:17 --> [REQ_ID=8764b59c885a] [LIFECYCLE][END] status=200 duration_ms=28.79 memory_delta=0
INFO - 2026-03-07 00:17:17 --> [REQ_ID=349b94ec3592] [PERF] Execution time=0.028475
DEBUG - 2026-03-07 00:17:17 --> [REQ_ID=8764b59c885a] [REQUEST][END]
INFO - 2026-03-07 00:17:17 --> [REQ_ID=8764b59c885a] [PERF] Execution time=0.041468
DEBUG - 2026-03-07 00:21:19 --> [REQ_ID=c8c537973a63] [REQUEST][START] HEAD /
DEBUG - 2026-03-07 00:21:19 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-07 00:21:19 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-07 00:21:19 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-07 00:21:19 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-07 00:21:19 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-07 00:22:39 --> [REQ_ID=7021ec33be7b] [REQUEST][START] GET /index.php/Profile
DEBUG - 2026-03-07 00:22:39 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-07 00:22:39 --> [REQ_ID=7021ec33be7b] [FILTER_BEFORE] /index.php/Profile
DEBUG - 2026-03-07 00:22:39 --> [REQ_ID=7021ec33be7b] [ROUTE] Controller=\App\Controllers\App\Modules\User\Controllers\DashboardController Method=profile
DEBUG - 2026-03-07 00:22:39 --> [REQ_ID=7021ec33be7b] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Profile
DEBUG - 2026-03-07 00:22:39 --> [CSRF] token name=csrf_test_name hash=fa25f5ab247ea9da12254c1987f6e0cd
DEBUG - 2026-03-07 00:22:39 --> [REQ_ID=7021ec33be7b] [REQUEST][END]
INFO - 2026-03-07 00:22:39 --> [REQ_ID=7021ec33be7b] [PERF] Execution time=0.047512
DEBUG - 2026-03-07 00:22:39 --> [REQ_ID=049ba512250b] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-07 00:22:39 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-07 00:22:39 --> [REQ_ID=049ba512250b] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-07 00:22:39 --> [REQ_ID=049ba512250b] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-07 00:22:39 --> [REQ_ID=049ba512250b] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-07 00:22:39 --> [CSRF] token name=csrf_test_name hash=ce3bc2477fad3bcbe429ade7121bb92f
DEBUG - 2026-03-07 00:22:39 --> [REQ_ID=468121504fa6] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-07 00:22:39 --> [REQ_ID=468121504fa6] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-07 00:22:39 --> [REQ_ID=049ba512250b] [FILTER_AFTER]
DEBUG - 2026-03-07 00:22:39 --> [REQ_ID=049ba512250b] [LIFECYCLE][END] status=200 duration_ms=170.67 memory_delta=0
INFO - 2026-03-07 00:22:39 --> [REQ_ID=468121504fa6] [PERF] Execution time=0.170367
DEBUG - 2026-03-07 00:22:39 --> [REQ_ID=049ba512250b] [REQUEST][END]
INFO - 2026-03-07 00:22:39 --> [REQ_ID=049ba512250b] [PERF] Execution time=0.185666
DEBUG - 2026-03-07 00:26:19 --> [REQ_ID=379d3dd820c7] [REQUEST][START] HEAD /
DEBUG - 2026-03-07 00:26:19 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-07 00:26:19 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-07 00:26:19 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-07 00:26:19 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-07 00:26:19 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
INFO - 2026-03-07 00:30:01 --> [spark:ops:work] Started
INFO - 2026-03-07 00:30:01 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-03-07 00:30:01 --> [SPARK_MEMORY] 16777216
INFO - 2026-03-07 00:30:01 --> [spark:ops:work] Intent
INFO - 2026-03-07 00:30:01 --> [spark:ops:work] Completed
INFO - 2026-03-07 00:30:01 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.094197
INFO - 2026-03-07 00:30:01 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-03-07 00:31:19 --> [REQ_ID=eb06bccadf00] [REQUEST][START] HEAD /
DEBUG - 2026-03-07 00:31:19 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-07 00:31:19 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-07 00:31:19 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-07 00:31:19 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-07 00:31:19 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-07 00:36:19 --> [REQ_ID=e5b79db5c134] [REQUEST][START] HEAD /
DEBUG - 2026-03-07 00:36:19 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-07 00:36:19 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-07 00:36:19 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-07 00:36:19 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-07 00:36:19 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-07 00:37:44 --> [REQ_ID=cca58b471fe8] [REQUEST][START] GET /
DEBUG - 2026-03-07 00:37:44 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-07 00:37:44 --> [REQ_ID=cca58b471fe8] [FILTER_BEFORE] /
DEBUG - 2026-03-07 00:37:44 --> [REQ_ID=cca58b471fe8] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-07 00:37:44 --> [REQ_ID=cca58b471fe8] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-07 00:37:44 --> [CSRF] token name=csrf_test_name hash=375ca851e34a91460f1acea57fa0b0f4
DEBUG - 2026-03-07 00:37:44 --> [REQ_ID=cfd6dbce40e7] [INIT] App\Controllers\Home::GET
INFO - 2026-03-07 00:37:44 --> [REQ_ID=cfd6dbce40e7] [MEMORY][controller-start] 6291456
INFO - 2026-03-07 00:37:44 --> [REQ_ID=cfd6dbce40e7] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-07 00:37:44 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-07 00:37:44 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-03-07 00:37:44 --> [REQ_ID=cfd6dbce40e7] [VIEW_RENDER] themes/public/home
INFO - 2026-03-07 00:37:44 --> [REQ_ID=cfd6dbce40e7] [MEMORY][commonData:start] 10485760
INFO - 2026-03-07 00:37:44 --> themesMemory usage: 10485760
DEBUG - 2026-03-07 00:37:44 --> [MetaService] slug= pageName=Home cacheHit= path=DB
DEBUG - 2026-03-07 00:37:44 --> [REQ_ID=cca58b471fe8] [FILTER_AFTER]
DEBUG - 2026-03-07 00:37:44 --> [REQ_ID=cca58b471fe8] [LIFECYCLE][END] status=200 duration_ms=615.95 memory_delta=4194304
INFO - 2026-03-07 00:37:44 --> [REQ_ID=cfd6dbce40e7] [PERF] Execution time=0.613397
DEBUG - 2026-03-07 00:37:44 --> [REQ_ID=cca58b471fe8] [REQUEST][END]
INFO - 2026-03-07 00:37:44 --> [REQ_ID=cca58b471fe8] [PERF] Execution time=0.654344
DEBUG - 2026-03-07 00:41:19 --> [REQ_ID=58ff3c5fced2] [REQUEST][START] HEAD /
DEBUG - 2026-03-07 00:41:19 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-07 00:41:19 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-07 00:41:19 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-07 00:41:19 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-07 00:41:19 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-07 00:43:15 --> [REQ_ID=b0f3318ed6f0] [REQUEST][START] GET /index.php/Trade-Tracker
DEBUG - 2026-03-07 00:43:15 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-07 00:43:15 --> [REQ_ID=b0f3318ed6f0] [FILTER_BEFORE] /index.php/Trade-Tracker
DEBUG - 2026-03-07 00:43:15 --> [REQ_ID=b0f3318ed6f0] [ROUTE] Controller=\App\Modules\User\Controllers\InvestmentsController Method=tradeTracker
DEBUG - 2026-03-07 00:43:15 --> [REQ_ID=b0f3318ed6f0] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Trade-Tracker
DEBUG - 2026-03-07 00:43:15 --> [CSRF] token name=csrf_test_name hash=74733a2ef725b8300e8e2c967b7e9541
DEBUG - 2026-03-07 00:43:15 --> [REQ_ID=b0f3318ed6f0] [REQUEST][END]
INFO - 2026-03-07 00:43:15 --> [REQ_ID=b0f3318ed6f0] [PERF] Execution time=0.054061
DEBUG - 2026-03-07 00:43:15 --> [REQ_ID=3733d503a235] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-07 00:43:15 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-07 00:43:15 --> [REQ_ID=3733d503a235] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-07 00:43:15 --> [REQ_ID=3733d503a235] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-07 00:43:15 --> [REQ_ID=3733d503a235] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-07 00:43:15 --> [CSRF] token name=csrf_test_name hash=902007cde120743fdfa3c32e26598433
DEBUG - 2026-03-07 00:43:15 --> [REQ_ID=b28d8399efde] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-07 00:43:15 --> [REQ_ID=b28d8399efde] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-07 00:43:16 --> [REQ_ID=3733d503a235] [FILTER_AFTER]
DEBUG - 2026-03-07 00:43:16 --> [REQ_ID=3733d503a235] [LIFECYCLE][END] status=200 duration_ms=213.71 memory_delta=0
INFO - 2026-03-07 00:43:16 --> [REQ_ID=b28d8399efde] [PERF] Execution time=0.212641
DEBUG - 2026-03-07 00:43:16 --> [REQ_ID=3733d503a235] [REQUEST][END]
INFO - 2026-03-07 00:43:16 --> [REQ_ID=3733d503a235] [PERF] Execution time=0.225186
INFO - 2026-03-07 00:45:01 --> [spark:ops:work] Started
INFO - 2026-03-07 00:45:01 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-03-07 00:45:01 --> [SPARK_MEMORY] 16777216
INFO - 2026-03-07 00:45:01 --> [spark:ops:work] Intent
INFO - 2026-03-07 00:45:01 --> [spark:ops:work] Completed
INFO - 2026-03-07 00:45:01 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.020123
INFO - 2026-03-07 00:45:01 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-03-07 00:46:19 --> [REQ_ID=8604c92044b1] [REQUEST][START] HEAD /
DEBUG - 2026-03-07 00:46:19 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-07 00:46:19 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-07 00:46:19 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-07 00:46:19 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-07 00:46:19 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-07 00:51:19 --> [REQ_ID=0ddcdba3be01] [REQUEST][START] HEAD /
DEBUG - 2026-03-07 00:51:19 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-07 00:51:19 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-07 00:51:19 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-07 00:51:19 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-07 00:51:19 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-07 00:52:35 --> [REQ_ID=9a88de5db280] [REQUEST][START] GET /index.php/Management/Exchange
DEBUG - 2026-03-07 00:52:35 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-07 00:52:35 --> [REQ_ID=9a88de5db280] [FILTER_BEFORE] /index.php/Management/Exchange
DEBUG - 2026-03-07 00:52:35 --> [REQ_ID=9a88de5db280] [ROUTE] Controller=\App\Modules\Management\Controllers\ExchangeAdminController Method=index
DEBUG - 2026-03-07 00:52:35 --> [REQ_ID=9a88de5db280] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Management/Exchange
DEBUG - 2026-03-07 00:52:35 --> [CSRF] token name=csrf_test_name hash=db13d110460968a4c4a06ec5e9c3cb9a
DEBUG - 2026-03-07 00:52:35 --> [REQ_ID=9a88de5db280] [REQUEST][END]
INFO - 2026-03-07 00:52:35 --> [REQ_ID=9a88de5db280] [PERF] Execution time=0.056078
DEBUG - 2026-03-07 00:52:35 --> [REQ_ID=726a34b90916] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-07 00:52:35 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-07 00:52:35 --> [REQ_ID=726a34b90916] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-07 00:52:35 --> [REQ_ID=726a34b90916] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-07 00:52:35 --> [REQ_ID=726a34b90916] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-07 00:52:35 --> [CSRF] token name=csrf_test_name hash=661bda40df50dde44cd7c4323c737ed9
DEBUG - 2026-03-07 00:52:35 --> [REQ_ID=a4df439ca56a] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-07 00:52:35 --> [REQ_ID=a4df439ca56a] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-07 00:52:35 --> [REQ_ID=726a34b90916] [FILTER_AFTER]
DEBUG - 2026-03-07 00:52:35 --> [REQ_ID=726a34b90916] [LIFECYCLE][END] status=200 duration_ms=61.61 memory_delta=0
INFO - 2026-03-07 00:52:35 --> [REQ_ID=a4df439ca56a] [PERF] Execution time=0.061377
DEBUG - 2026-03-07 00:52:35 --> [REQ_ID=726a34b90916] [REQUEST][END]
INFO - 2026-03-07 00:52:35 --> [REQ_ID=726a34b90916] [PERF] Execution time=0.073987
DEBUG - 2026-03-07 00:54:33 --> [REQ_ID=57bb23de133f] [REQUEST][START] GET /index.php/Preview/Alert/IMNN
DEBUG - 2026-03-07 00:54:33 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-07 00:54:33 --> [REQ_ID=57bb23de133f] [FILTER_BEFORE] /index.php/Preview/Alert/IMNN
DEBUG - 2026-03-07 00:54:33 --> [REQ_ID=57bb23de133f] [ROUTE] Controller=\App\Modules\User\Controllers\AlertsController Method=preview
DEBUG - 2026-03-07 00:54:33 --> [REQ_ID=57bb23de133f] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Preview/Alert/IMNN
DEBUG - 2026-03-07 00:54:33 --> [CSRF] token name=csrf_test_name hash=bd13e1172e4c2406396cd54862e02204
DEBUG - 2026-03-07 00:54:33 --> [REQ_ID=e1a0e9b013f3] [INIT] App\Modules\User\Controllers\AlertsController::GET
INFO - 2026-03-07 00:54:33 --> [REQ_ID=e1a0e9b013f3] [MEMORY][controller-start] 6291456
DEBUG - 2026-03-07 00:54:33 --> [REQ_ID=e1a0e9b013f3] [METHOD_ENTRY] preview
DEBUG - 2026-03-07 00:54:33 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-07 00:54:33 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-07 00:54:33 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-07 00:54:33 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-07 00:54:33 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-07 00:54:33 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-07 00:54:33 --> MyMIInvestments: no session user detected; skipping personalized hydration.
DEBUG - 2026-03-07 00:54:33 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-07 00:54:33 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-07 00:54:33 --> MyMIMarketing: Pscrape library not installed; Google search scraping will use fallback.
DEBUG - 2026-03-07 00:54:33 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-07 00:54:33 --> MyMIAlerts: no authenticated user context detected.
DEBUG - 2026-03-07 00:54:33 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-07 00:54:33 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-07 00:54:33 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-07 00:54:33 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-07 00:54:33 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-07 00:54:33 --> [SERVICE] App\Services\BudgetService ::setUserId
INFO - 2026-03-07 00:54:33 --> [REQ_ID=e1a0e9b013f3] [MEMORY][commonData:start] 8388608
DEBUG - 2026-03-07 00:54:33 --> MyMIInvestments: no session user detected; skipping personalized hydration.
DEBUG - 2026-03-07 00:54:33 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-07 00:54:33 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-07 00:54:33 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-07 00:54:33 --> MyMIAlerts: no authenticated user context detected.
DEBUG - 2026-03-07 00:54:34 --> [REQ_ID=e1a0e9b013f3] [VIEW_RENDER] themes/public/previewAlert
INFO - 2026-03-07 00:54:34 --> [REQ_ID=e1a0e9b013f3] [MEMORY][commonData:start] 8388608
INFO - 2026-03-07 00:54:34 --> themesMemory usage: 8388608
DEBUG - 2026-03-07 00:54:34 --> [REQ_ID=57bb23de133f] [FILTER_AFTER]
DEBUG - 2026-03-07 00:54:34 --> [REQ_ID=57bb23de133f] [LIFECYCLE][END] status=200 duration_ms=178.64 memory_delta=2097152
INFO - 2026-03-07 00:54:34 --> [REQ_ID=e1a0e9b013f3] [PERF] Execution time=0.176471
DEBUG - 2026-03-07 00:54:34 --> [REQ_ID=57bb23de133f] [REQUEST][END]
INFO - 2026-03-07 00:54:34 --> [REQ_ID=57bb23de133f] [PERF] Execution time=0.219684
DEBUG - 2026-03-07 00:56:19 --> [REQ_ID=71c2beae06e5] [REQUEST][START] HEAD /
DEBUG - 2026-03-07 00:56:19 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-07 00:56:19 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-07 00:56:19 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-07 00:56:19 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-07 00:56:19 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-07 00:56:57 --> [REQ_ID=e512473395f2] [REQUEST][START] GET /index.php/Customer-Support
DEBUG - 2026-03-07 00:56:57 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-07 00:56:57 --> [REQ_ID=e512473395f2] [FILTER_BEFORE] /index.php/Customer-Support
DEBUG - 2026-03-07 00:56:57 --> [REQ_ID=e512473395f2] [ROUTE] Controller=\App\Controllers\App\Modules\Support\Controllers\SupportController Method=index
DEBUG - 2026-03-07 00:56:57 --> [REQ_ID=e512473395f2] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Customer-Support
DEBUG - 2026-03-07 00:56:57 --> [CSRF] token name=csrf_test_name hash=7a48915b45740a88aa40ee56c46f86d7
DEBUG - 2026-03-07 00:56:57 --> [REQ_ID=e512473395f2] [REQUEST][END]
INFO - 2026-03-07 00:56:57 --> [REQ_ID=e512473395f2] [PERF] Execution time=0.024156
DEBUG - 2026-03-07 00:56:57 --> [REQ_ID=2858e1161e4c] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-07 00:56:57 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-07 00:56:57 --> [REQ_ID=2858e1161e4c] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-07 00:56:57 --> [REQ_ID=2858e1161e4c] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-07 00:56:57 --> [REQ_ID=2858e1161e4c] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-07 00:56:57 --> [CSRF] token name=csrf_test_name hash=ebdb7958ffcee2454be5c2c211386060
DEBUG - 2026-03-07 00:56:57 --> [REQ_ID=9651131ffef7] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-07 00:56:57 --> [REQ_ID=9651131ffef7] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-07 00:56:57 --> [REQ_ID=2858e1161e4c] [FILTER_AFTER]
DEBUG - 2026-03-07 00:56:57 --> [REQ_ID=2858e1161e4c] [LIFECYCLE][END] status=200 duration_ms=117.09 memory_delta=0
INFO - 2026-03-07 00:56:57 --> [REQ_ID=9651131ffef7] [PERF] Execution time=0.116847
DEBUG - 2026-03-07 00:56:57 --> [REQ_ID=2858e1161e4c] [REQUEST][END]
INFO - 2026-03-07 00:56:57 --> [REQ_ID=2858e1161e4c] [PERF] Execution time=0.132260
INFO - 2026-03-07 01:00:02 --> [spark:ops:work] Started
INFO - 2026-03-07 01:00:02 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-03-07 01:00:02 --> [SPARK_MEMORY] 16777216
INFO - 2026-03-07 01:00:02 --> [spark:ops:work] Intent
DEBUG - 2026-03-07 01:00:02 --> [REQ_ID=95821adf46e1] [REQUEST][START] GET /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-07 01:00:02 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-07 01:00:02 --> [REQ_ID=95821adf46e1] [FILTER_BEFORE] /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-07 01:00:02 --> [REQ_ID=95821adf46e1] [ROUTE] Controller=\App\Modules\Management\Controllers\ManagementAPIController Method=Run_CRON_Tasks
DEBUG - 2026-03-07 01:00:02 --> [REQ_ID=95821adf46e1] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-07 01:00:02 --> [REQ_ID=95821adf46e1] [REQUEST][END]
INFO - 2026-03-07 01:00:02 --> [REQ_ID=95821adf46e1] [PERF] Execution time=0.049905
INFO - 2026-03-07 01:00:02 --> [spark:ops:work] Completed
INFO - 2026-03-07 01:00:02 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.179414
INFO - 2026-03-07 01:00:02 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-03-07 01:01:19 --> [REQ_ID=27b434912f37] [REQUEST][START] HEAD /
DEBUG - 2026-03-07 01:01:19 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-07 01:01:19 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-07 01:01:19 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-07 01:01:19 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-07 01:01:19 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-07 01:06:19 --> [REQ_ID=4e57881a7f62] [REQUEST][START] HEAD /
DEBUG - 2026-03-07 01:06:19 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-07 01:06:19 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-07 01:06:19 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-07 01:06:19 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-07 01:06:19 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-07 01:10:58 --> [REQ_ID=8626445b7c2b] [REQUEST][START] GET /
DEBUG - 2026-03-07 01:10:58 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-07 01:10:58 --> [REQ_ID=8626445b7c2b] [FILTER_BEFORE] /
DEBUG - 2026-03-07 01:10:58 --> [REQ_ID=8626445b7c2b] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-07 01:10:58 --> [REQ_ID=8626445b7c2b] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-07 01:10:58 --> [CSRF] token name=csrf_test_name hash=3a1ea0490b80678284ae9b070d3dbd88
DEBUG - 2026-03-07 01:10:58 --> [REQ_ID=105e6f45a1ca] [INIT] App\Controllers\Home::GET
INFO - 2026-03-07 01:10:58 --> [REQ_ID=105e6f45a1ca] [MEMORY][controller-start] 6291456
INFO - 2026-03-07 01:10:58 --> [REQ_ID=105e6f45a1ca] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-07 01:10:58 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-07 01:10:59 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-03-07 01:10:59 --> [REQ_ID=105e6f45a1ca] [VIEW_RENDER] themes/public/home
INFO - 2026-03-07 01:10:59 --> [REQ_ID=105e6f45a1ca] [MEMORY][commonData:start] 10485760
INFO - 2026-03-07 01:10:59 --> themesMemory usage: 10485760
DEBUG - 2026-03-07 01:10:59 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-07 01:10:59 --> [REQ_ID=8626445b7c2b] [FILTER_AFTER]
DEBUG - 2026-03-07 01:10:59 --> [REQ_ID=8626445b7c2b] [LIFECYCLE][END] status=200 duration_ms=767.38 memory_delta=4194304
INFO - 2026-03-07 01:10:59 --> [REQ_ID=105e6f45a1ca] [PERF] Execution time=0.764791
DEBUG - 2026-03-07 01:10:59 --> [REQ_ID=8626445b7c2b] [REQUEST][END]
INFO - 2026-03-07 01:10:59 --> [REQ_ID=8626445b7c2b] [PERF] Execution time=0.805885
DEBUG - 2026-03-07 01:11:19 --> [REQ_ID=9105025f1cf6] [REQUEST][START] HEAD /
DEBUG - 2026-03-07 01:11:19 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-07 01:11:19 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-07 01:11:19 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-07 01:11:19 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-07 01:11:19 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
INFO - 2026-03-07 01:15:01 --> [spark:ops:work] Started
INFO - 2026-03-07 01:15:01 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-03-07 01:15:01 --> [SPARK_MEMORY] 16777216
INFO - 2026-03-07 01:15:01 --> [spark:ops:work] Intent
DEBUG - 2026-03-07 01:15:02 --> [REQ_ID=c0d8f94450b9] [REQUEST][START] GET /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-07 01:15:02 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-07 01:15:02 --> [REQ_ID=c0d8f94450b9] [FILTER_BEFORE] /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-07 01:15:02 --> [REQ_ID=c0d8f94450b9] [ROUTE] Controller=\App\Modules\APIs\Controllers\AlertsAPIController Method=fetchEmailAlerts
DEBUG - 2026-03-07 01:15:02 --> [REQ_ID=c0d8f94450b9] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-07 01:15:02 --> [REQ_ID=c0d8f94450b9] [REQUEST][END]
INFO - 2026-03-07 01:15:02 --> [REQ_ID=c0d8f94450b9] [PERF] Execution time=0.062138
INFO - 2026-03-07 01:15:02 --> [spark:ops:work] Completed
INFO - 2026-03-07 01:15:02 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.204916
INFO - 2026-03-07 01:15:02 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-03-07 01:16:19 --> [REQ_ID=7f13466cc771] [REQUEST][START] HEAD /
DEBUG - 2026-03-07 01:16:19 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-07 01:16:19 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-07 01:16:19 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-07 01:16:19 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-07 01:16:19 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-07 01:21:19 --> [REQ_ID=79f3cf04d2d8] [REQUEST][START] HEAD /
DEBUG - 2026-03-07 01:21:19 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-07 01:21:19 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-07 01:21:19 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-07 01:21:19 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-07 01:21:19 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-07 01:26:19 --> [REQ_ID=6a37c17d81f0] [REQUEST][START] HEAD /
DEBUG - 2026-03-07 01:26:19 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-07 01:26:19 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-07 01:26:19 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-07 01:26:19 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-07 01:26:19 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-07 01:27:27 --> [REQ_ID=baa1da10c9d8] [REQUEST][START] GET /
DEBUG - 2026-03-07 01:27:27 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-07 01:27:27 --> [REQ_ID=baa1da10c9d8] [FILTER_BEFORE] /
DEBUG - 2026-03-07 01:27:27 --> [REQ_ID=baa1da10c9d8] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-07 01:27:27 --> [REQ_ID=baa1da10c9d8] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-07 01:27:27 --> [CSRF] token name=csrf_test_name hash=b2c2afbc791cd9164c4f02f2cf36063c
DEBUG - 2026-03-07 01:27:27 --> [REQ_ID=f1ed2af2e81b] [INIT] App\Controllers\Home::GET
INFO - 2026-03-07 01:27:27 --> [REQ_ID=f1ed2af2e81b] [MEMORY][controller-start] 6291456
INFO - 2026-03-07 01:27:27 --> [REQ_ID=f1ed2af2e81b] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-07 01:27:27 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-07 01:27:27 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-03-07 01:27:27 --> [REQ_ID=f1ed2af2e81b] [VIEW_RENDER] themes/public/home
INFO - 2026-03-07 01:27:27 --> [REQ_ID=f1ed2af2e81b] [MEMORY][commonData:start] 10485760
INFO - 2026-03-07 01:27:27 --> themesMemory usage: 10485760
DEBUG - 2026-03-07 01:27:27 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-07 01:27:27 --> [REQ_ID=baa1da10c9d8] [FILTER_AFTER]
DEBUG - 2026-03-07 01:27:27 --> [REQ_ID=baa1da10c9d8] [LIFECYCLE][END] status=200 duration_ms=605.92 memory_delta=4194304
INFO - 2026-03-07 01:27:27 --> [REQ_ID=f1ed2af2e81b] [PERF] Execution time=0.604072
DEBUG - 2026-03-07 01:27:27 --> [REQ_ID=baa1da10c9d8] [REQUEST][END]
INFO - 2026-03-07 01:27:27 --> [REQ_ID=baa1da10c9d8] [PERF] Execution time=0.644683
INFO - 2026-03-07 01:30:01 --> [spark:ops:work] Started
INFO - 2026-03-07 01:30:01 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-03-07 01:30:01 --> [SPARK_MEMORY] 16777216
INFO - 2026-03-07 01:30:01 --> [spark:ops:work] Intent
INFO - 2026-03-07 01:30:01 --> [spark:ops:work] Completed
INFO - 2026-03-07 01:30:01 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.020846
INFO - 2026-03-07 01:30:01 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-03-07 01:31:19 --> [REQ_ID=56f93dcc4ffe] [REQUEST][START] HEAD /
DEBUG - 2026-03-07 01:31:19 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-07 01:31:19 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-07 01:31:19 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-07 01:31:19 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-07 01:31:19 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-07 01:36:19 --> [REQ_ID=ccdf6594a1d3] [REQUEST][START] HEAD /
DEBUG - 2026-03-07 01:36:19 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-07 01:36:19 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-07 01:36:19 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-07 01:36:19 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-07 01:36:19 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-07 01:41:19 --> [REQ_ID=f9192afb88d3] [REQUEST][START] HEAD /
DEBUG - 2026-03-07 01:41:19 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-07 01:41:19 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-07 01:41:19 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-07 01:41:19 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-07 01:41:19 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
INFO - 2026-03-07 01:45:01 --> [spark:ops:work] Started
INFO - 2026-03-07 01:45:01 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-03-07 01:45:01 --> [SPARK_MEMORY] 16777216
INFO - 2026-03-07 01:45:01 --> [spark:ops:work] Intent
INFO - 2026-03-07 01:45:01 --> [spark:ops:work] Completed
INFO - 2026-03-07 01:45:01 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.096925
INFO - 2026-03-07 01:45:01 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-03-07 01:45:05 --> [REQ_ID=b2d17b54da35] [REQUEST][START] GET /index.php/Assets
DEBUG - 2026-03-07 01:45:05 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-07 01:45:05 --> [REQ_ID=b2d17b54da35] [FILTER_BEFORE] /index.php/Assets
DEBUG - 2026-03-07 01:45:05 --> [REQ_ID=b2d17b54da35] [ROUTE] Controller=\App\Modules\Management\Controllers\AssetsController Method=index
DEBUG - 2026-03-07 01:45:05 --> [REQ_ID=b2d17b54da35] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Assets
DEBUG - 2026-03-07 01:45:05 --> [CSRF] token name=csrf_test_name hash=9e808249ce68e1f9805a8bd0a7895bbd
DEBUG - 2026-03-07 01:45:05 --> [REQ_ID=b2d17b54da35] [REQUEST][END]
INFO - 2026-03-07 01:45:05 --> [REQ_ID=b2d17b54da35] [PERF] Execution time=0.049033
DEBUG - 2026-03-07 01:45:05 --> [REQ_ID=c3cdceb8f4f0] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-07 01:45:05 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-07 01:45:05 --> [REQ_ID=c3cdceb8f4f0] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-07 01:45:05 --> [REQ_ID=c3cdceb8f4f0] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-07 01:45:05 --> [REQ_ID=c3cdceb8f4f0] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-07 01:45:05 --> [CSRF] token name=csrf_test_name hash=4697be48a61e67c5c72f1af258f4395c
DEBUG - 2026-03-07 01:45:05 --> [REQ_ID=aee1b08a554f] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-07 01:45:05 --> [REQ_ID=aee1b08a554f] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-07 01:45:05 --> [REQ_ID=c3cdceb8f4f0] [FILTER_AFTER]
DEBUG - 2026-03-07 01:45:05 --> [REQ_ID=c3cdceb8f4f0] [LIFECYCLE][END] status=200 duration_ms=40.47 memory_delta=0
INFO - 2026-03-07 01:45:05 --> [REQ_ID=aee1b08a554f] [PERF] Execution time=0.040276
DEBUG - 2026-03-07 01:45:05 --> [REQ_ID=c3cdceb8f4f0] [REQUEST][END]
INFO - 2026-03-07 01:45:05 --> [REQ_ID=c3cdceb8f4f0] [PERF] Execution time=0.055971
DEBUG - 2026-03-07 01:46:18 --> [REQ_ID=4a67eed2eb40] [REQUEST][START] HEAD /
DEBUG - 2026-03-07 01:46:18 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-07 01:46:18 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-07 01:46:19 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-07 01:46:19 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-07 01:46:19 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-07 01:51:19 --> [REQ_ID=86d2c0f1019f] [REQUEST][START] HEAD /
DEBUG - 2026-03-07 01:51:19 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-07 01:51:19 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-07 01:51:19 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-07 01:51:19 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-07 01:51:19 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-07 01:56:19 --> [REQ_ID=8b4c7a23f86c] [REQUEST][START] HEAD /
DEBUG - 2026-03-07 01:56:19 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-07 01:56:19 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-07 01:56:19 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-07 01:56:19 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-07 01:56:19 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
INFO - 2026-03-07 02:00:02 --> [spark:ops:work] Started
INFO - 2026-03-07 02:00:02 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-03-07 02:00:02 --> [SPARK_MEMORY] 16777216
INFO - 2026-03-07 02:00:02 --> [spark:ops:work] Intent
INFO - 2026-03-07 02:00:02 --> [SPARK_START] App\Commands\AIOps\Run
INFO - 2026-03-07 02:00:02 --> [SPARK_MEMORY] 16777216
INFO - 2026-03-07 02:00:02 --> [spark:aiops:run] Intent
DEBUG - 2026-03-07 02:00:02 --> [REQ_ID=e93ae5763538] [REQUEST][START] GET /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-07 02:00:02 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
INFO - 2026-03-07 02:00:02 --> [spark:ops:work] Completed
INFO - 2026-03-07 02:00:02 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.117223
INFO - 2026-03-07 02:00:02 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-03-07 02:00:02 --> [REQ_ID=e93ae5763538] [FILTER_BEFORE] /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-07 02:00:02 --> [REQ_ID=e93ae5763538] [ROUTE] Controller=\App\Modules\Management\Controllers\ManagementAPIController Method=Run_CRON_Tasks
DEBUG - 2026-03-07 02:00:02 --> [REQ_ID=e93ae5763538] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-07 02:00:02 --> [REQ_ID=e93ae5763538] [REQUEST][END]
INFO - 2026-03-07 02:00:02 --> [REQ_ID=e93ae5763538] [PERF] Execution time=0.113254
INFO - 2026-03-07 02:00:03 --> [AIOPS][SPARK][GOVERNANCE][spark:logs:summarize] Started
INFO - 2026-03-07 02:00:03 --> [SPARK_START] App\Commands\Logs\Summarize
INFO - 2026-03-07 02:00:03 --> [SPARK_MEMORY] 16777216
INFO - 2026-03-07 02:00:03 --> [spark:logs:summarize] Intent
INFO - 2026-03-07 02:00:03 --> [AIOPS][SPARK][GOVERNANCE][spark:logs:summarize] Completed
INFO - 2026-03-07 02:00:03 --> [SPARK_COMPLETE] App\Commands\Logs\Summarize duration=0.004504
INFO - 2026-03-07 02:00:03 --> [SPARK_MEMORY] 18874368
INFO - 2026-03-07 02:00:03 --> [spark:app:healthcheck] Started
INFO - 2026-03-07 02:00:03 --> [SPARK_START] App\Commands\App\Healthcheck
INFO - 2026-03-07 02:00:03 --> [SPARK_MEMORY] 16777216
INFO - 2026-03-07 02:00:03 --> [spark:app:healthcheck] Intent
DEBUG - 2026-03-07 02:00:03 --> LOG_HEALTHCHECK debug marker=ae0f16c651f2
INFO - 2026-03-07 02:00:03 --> LOG_HEALTHCHECK info marker=ae0f16c651f2
NOTICE - 2026-03-07 02:00:03 --> LOG_HEALTHCHECK probe marker=ae0f16c651f2
INFO - 2026-03-07 02:00:03 --> [spark:app:healthcheck] Completed
INFO - 2026-03-07 02:00:03 --> [SPARK_COMPLETE] App\Commands\App\Healthcheck duration=0.026224
INFO - 2026-03-07 02:00:03 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-03-07 02:00:05 --> OllamaPatchRunner:L142 - validateGeneratedPatch Content: 
WARNING - 2026-03-07 02:00:05 --> OllamaPatchRunner:L49 - Original Diff: 
DEBUG - 2026-03-07 02:00:05 --> OllamaPatchRunner:L51 - Retried Diff: 
DEBUG - 2026-03-07 02:00:05 --> OllamaPatchRunner:L142 - validateGeneratedPatch Content: 
DEBUG - 2026-03-07 02:00:05 --> OllamaPatchRunner:L53 - Validating Generated Patch Failed
INFO - 2026-03-07 02:00:05 --> [SPARK_COMPLETE] App\Commands\AIOps\Run duration=3.407265
INFO - 2026-03-07 02:00:05 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-03-07 02:01:19 --> [REQ_ID=42af90c3a153] [REQUEST][START] HEAD /
DEBUG - 2026-03-07 02:01:19 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-07 02:01:19 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-07 02:01:19 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-07 02:01:19 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-07 02:01:19 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-07 02:04:45 --> [REQ_ID=6361ca0326c1] [REQUEST][START] GET /
DEBUG - 2026-03-07 02:04:45 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-07 02:04:45 --> [REQ_ID=6361ca0326c1] [FILTER_BEFORE] /
DEBUG - 2026-03-07 02:04:45 --> [REQ_ID=6361ca0326c1] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-07 02:04:45 --> [REQ_ID=6361ca0326c1] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-07 02:04:45 --> [CSRF] token name=csrf_test_name hash=a64624951e44e4d120646f2765e46ad4
DEBUG - 2026-03-07 02:04:45 --> [REQ_ID=f7bf6feb8442] [INIT] App\Controllers\Home::GET
INFO - 2026-03-07 02:04:45 --> [REQ_ID=f7bf6feb8442] [MEMORY][controller-start] 6291456
INFO - 2026-03-07 02:04:45 --> [REQ_ID=f7bf6feb8442] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-07 02:04:45 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-07 02:04:46 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-03-07 02:04:46 --> [REQ_ID=f7bf6feb8442] [VIEW_RENDER] themes/public/home
INFO - 2026-03-07 02:04:46 --> [REQ_ID=f7bf6feb8442] [MEMORY][commonData:start] 10485760
INFO - 2026-03-07 02:04:46 --> themesMemory usage: 10485760
DEBUG - 2026-03-07 02:04:46 --> [MetaService] slug= pageName=Home cacheHit= path=DB
DEBUG - 2026-03-07 02:04:46 --> [REQ_ID=6361ca0326c1] [FILTER_AFTER]
DEBUG - 2026-03-07 02:04:46 --> [REQ_ID=6361ca0326c1] [LIFECYCLE][END] status=200 duration_ms=779.87 memory_delta=4194304
INFO - 2026-03-07 02:04:46 --> [REQ_ID=f7bf6feb8442] [PERF] Execution time=0.777494
DEBUG - 2026-03-07 02:04:46 --> [REQ_ID=6361ca0326c1] [REQUEST][END]
INFO - 2026-03-07 02:04:46 --> [REQ_ID=6361ca0326c1] [PERF] Execution time=0.819790
DEBUG - 2026-03-07 02:06:19 --> [REQ_ID=1df82f7ad34f] [REQUEST][START] HEAD /
DEBUG - 2026-03-07 02:06:19 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-07 02:06:19 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-07 02:06:19 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-07 02:06:19 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-07 02:06:19 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-07 02:09:13 --> [REQ_ID=6b9842e52e3e] [REQUEST][START] GET /index.php/Wallets
DEBUG - 2026-03-07 02:09:13 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-07 02:09:13 --> [REQ_ID=6b9842e52e3e] [FILTER_BEFORE] /index.php/Wallets
DEBUG - 2026-03-07 02:09:13 --> [REQ_ID=6b9842e52e3e] [ROUTE] Controller=\App\Modules\User\Controllers\WalletsController Method=index
DEBUG - 2026-03-07 02:09:13 --> [REQ_ID=6b9842e52e3e] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Wallets
DEBUG - 2026-03-07 02:09:13 --> [CSRF] token name=csrf_test_name hash=1e2124472bb6ec64806d791bdea19e19
DEBUG - 2026-03-07 02:09:13 --> [REQ_ID=6b9842e52e3e] [REQUEST][END]
INFO - 2026-03-07 02:09:13 --> [REQ_ID=6b9842e52e3e] [PERF] Execution time=0.058447
DEBUG - 2026-03-07 02:09:14 --> [REQ_ID=e195469c92a5] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-07 02:09:14 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-07 02:09:14 --> [REQ_ID=e195469c92a5] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-07 02:09:14 --> [REQ_ID=e195469c92a5] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-07 02:09:14 --> [REQ_ID=e195469c92a5] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-07 02:09:14 --> [CSRF] token name=csrf_test_name hash=c63bf0aa803c53023122944865731bfe
DEBUG - 2026-03-07 02:09:14 --> [REQ_ID=b81c8984231e] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-07 02:09:14 --> [REQ_ID=b81c8984231e] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-07 02:09:14 --> [REQ_ID=e195469c92a5] [FILTER_AFTER]
DEBUG - 2026-03-07 02:09:14 --> [REQ_ID=e195469c92a5] [LIFECYCLE][END] status=200 duration_ms=33.32 memory_delta=0
INFO - 2026-03-07 02:09:14 --> [REQ_ID=b81c8984231e] [PERF] Execution time=0.033193
DEBUG - 2026-03-07 02:09:14 --> [REQ_ID=e195469c92a5] [REQUEST][END]
INFO - 2026-03-07 02:09:14 --> [REQ_ID=e195469c92a5] [PERF] Execution time=0.046123
DEBUG - 2026-03-07 02:10:27 --> [REQ_ID=f8cbdebaab39] [REQUEST][START] GET /index.php/Marketplace
DEBUG - 2026-03-07 02:10:27 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-07 02:10:27 --> [REQ_ID=f8cbdebaab39] [FILTER_BEFORE] /index.php/Marketplace
DEBUG - 2026-03-07 02:10:27 --> [REQ_ID=f8cbdebaab39] [ROUTE] Controller=\App\Modules\ScriptStudio\Controllers\ScriptStudioController Method=marketplace
DEBUG - 2026-03-07 02:10:27 --> [REQ_ID=f8cbdebaab39] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Marketplace
DEBUG - 2026-03-07 02:10:27 --> [CSRF] token name=csrf_test_name hash=92680db7bab868b9561d6181eee323fe
DEBUG - 2026-03-07 02:10:27 --> [REQ_ID=f8cbdebaab39] [REQUEST][END]
INFO - 2026-03-07 02:10:27 --> [REQ_ID=f8cbdebaab39] [PERF] Execution time=0.011602
DEBUG - 2026-03-07 02:10:28 --> [REQ_ID=799609ea881b] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-07 02:10:28 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-07 02:10:28 --> [REQ_ID=799609ea881b] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-07 02:10:28 --> [REQ_ID=799609ea881b] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-07 02:10:28 --> [REQ_ID=799609ea881b] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-07 02:10:28 --> [CSRF] token name=csrf_test_name hash=b5b613ef0f9c744fbf131dd5f3863e33
DEBUG - 2026-03-07 02:10:28 --> [REQ_ID=913528edd631] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-07 02:10:28 --> [REQ_ID=913528edd631] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-07 02:10:28 --> [REQ_ID=799609ea881b] [FILTER_AFTER]
DEBUG - 2026-03-07 02:10:28 --> [REQ_ID=799609ea881b] [LIFECYCLE][END] status=200 duration_ms=83.15 memory_delta=0
INFO - 2026-03-07 02:10:28 --> [REQ_ID=913528edd631] [PERF] Execution time=0.083174
DEBUG - 2026-03-07 02:10:28 --> [REQ_ID=799609ea881b] [REQUEST][END]
INFO - 2026-03-07 02:10:28 --> [REQ_ID=799609ea881b] [PERF] Execution time=0.091776
DEBUG - 2026-03-07 02:11:18 --> [REQ_ID=c8cb5741376f] [REQUEST][START] HEAD /
DEBUG - 2026-03-07 02:11:18 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-07 02:11:18 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-07 02:11:19 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-07 02:11:19 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-07 02:11:19 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
INFO - 2026-03-07 02:15:01 --> [spark:ops:work] Started
INFO - 2026-03-07 02:15:01 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-03-07 02:15:01 --> [SPARK_MEMORY] 16777216
INFO - 2026-03-07 02:15:01 --> [spark:ops:work] Intent
DEBUG - 2026-03-07 02:15:01 --> [REQ_ID=5614f0e0e65d] [REQUEST][START] GET /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-07 02:15:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
INFO - 2026-03-07 02:15:01 --> [spark:ops:work] Completed
INFO - 2026-03-07 02:15:01 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.108588
INFO - 2026-03-07 02:15:01 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-03-07 02:15:01 --> [REQ_ID=5614f0e0e65d] [FILTER_BEFORE] /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-07 02:15:01 --> [REQ_ID=5614f0e0e65d] [ROUTE] Controller=\App\Modules\APIs\Controllers\AlertsAPIController Method=fetchEmailAlerts
DEBUG - 2026-03-07 02:15:01 --> [REQ_ID=5614f0e0e65d] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-07 02:15:01 --> [REQ_ID=5614f0e0e65d] [REQUEST][END]
INFO - 2026-03-07 02:15:01 --> [REQ_ID=5614f0e0e65d] [PERF] Execution time=0.061011
DEBUG - 2026-03-07 02:16:19 --> [REQ_ID=2f0e1682f516] [REQUEST][START] HEAD /
DEBUG - 2026-03-07 02:16:19 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-07 02:16:19 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-07 02:16:19 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-07 02:16:19 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-07 02:16:19 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-07 02:21:19 --> [REQ_ID=71946a18a0a3] [REQUEST][START] HEAD /
DEBUG - 2026-03-07 02:21:19 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-07 02:21:19 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-07 02:21:19 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-07 02:21:19 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-07 02:21:19 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-07 02:26:19 --> [REQ_ID=6b33b3808aa6] [REQUEST][START] HEAD /
DEBUG - 2026-03-07 02:26:19 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-07 02:26:19 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-07 02:26:19 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-07 02:26:19 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-07 02:26:19 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
INFO - 2026-03-07 02:30:01 --> [spark:ops:work] Started
INFO - 2026-03-07 02:30:01 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-03-07 02:30:01 --> [SPARK_MEMORY] 16777216
INFO - 2026-03-07 02:30:01 --> [spark:ops:work] Intent
INFO - 2026-03-07 02:30:01 --> [spark:ops:work] Completed
INFO - 2026-03-07 02:30:01 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.094283
INFO - 2026-03-07 02:30:01 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-03-07 02:31:19 --> [REQ_ID=5e5624ec1e51] [REQUEST][START] HEAD /
DEBUG - 2026-03-07 02:31:19 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-07 02:31:19 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-07 02:31:19 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-07 02:31:19 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-07 02:31:19 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-07 02:36:19 --> [REQ_ID=ea24f682b2d2] [REQUEST][START] HEAD /
DEBUG - 2026-03-07 02:36:19 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-07 02:36:19 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-07 02:36:19 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-07 02:36:19 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-07 02:36:19 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-07 02:39:04 --> [REQ_ID=d009cd558dd4] [REQUEST][START] GET /
DEBUG - 2026-03-07 02:39:04 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-07 02:39:04 --> [REQ_ID=d009cd558dd4] [FILTER_BEFORE] /
DEBUG - 2026-03-07 02:39:04 --> [REQ_ID=d009cd558dd4] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-07 02:39:04 --> [REQ_ID=d009cd558dd4] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-07 02:39:04 --> [CSRF] token name=csrf_test_name hash=c87014959719a6c72d153917319a7516
DEBUG - 2026-03-07 02:39:04 --> [REQ_ID=c953a51fd8c8] [INIT] App\Controllers\Home::GET
INFO - 2026-03-07 02:39:04 --> [REQ_ID=c953a51fd8c8] [MEMORY][controller-start] 6291456
INFO - 2026-03-07 02:39:04 --> [REQ_ID=c953a51fd8c8] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-07 02:39:04 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-07 02:39:05 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-03-07 02:39:05 --> [REQ_ID=c953a51fd8c8] [VIEW_RENDER] themes/public/home
INFO - 2026-03-07 02:39:05 --> [REQ_ID=c953a51fd8c8] [MEMORY][commonData:start] 10485760
INFO - 2026-03-07 02:39:05 --> themesMemory usage: 10485760
DEBUG - 2026-03-07 02:39:05 --> [MetaService] slug= pageName=Home cacheHit= path=DB
DEBUG - 2026-03-07 02:39:05 --> [REQ_ID=d009cd558dd4] [FILTER_AFTER]
DEBUG - 2026-03-07 02:39:05 --> [REQ_ID=d009cd558dd4] [LIFECYCLE][END] status=200 duration_ms=638.81 memory_delta=4194304
INFO - 2026-03-07 02:39:05 --> [REQ_ID=c953a51fd8c8] [PERF] Execution time=0.636447
DEBUG - 2026-03-07 02:39:05 --> [REQ_ID=d009cd558dd4] [REQUEST][END]
INFO - 2026-03-07 02:39:05 --> [REQ_ID=d009cd558dd4] [PERF] Execution time=0.678794
DEBUG - 2026-03-07 02:39:05 --> [REQ_ID=119485927334] [REQUEST][START] GET /
DEBUG - 2026-03-07 02:39:05 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-07 02:39:05 --> [REQ_ID=119485927334] [FILTER_BEFORE] /
DEBUG - 2026-03-07 02:39:05 --> [REQ_ID=119485927334] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-07 02:39:05 --> [REQ_ID=119485927334] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-07 02:39:05 --> [CSRF] token name=csrf_test_name hash=b27a6c5464358d201e92cf5944841731
DEBUG - 2026-03-07 02:39:05 --> [REQ_ID=bfeacc00868a] [INIT] App\Controllers\Home::GET
INFO - 2026-03-07 02:39:05 --> [REQ_ID=bfeacc00868a] [MEMORY][controller-start] 6291456
INFO - 2026-03-07 02:39:05 --> [REQ_ID=bfeacc00868a] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-07 02:39:05 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-07 02:39:06 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
DEBUG - 2026-03-07 02:39:06 --> [REQ_ID=bfeacc00868a] [VIEW_RENDER] themes/public/home
INFO - 2026-03-07 02:39:06 --> [REQ_ID=bfeacc00868a] [MEMORY][commonData:start] 8388608
INFO - 2026-03-07 02:39:06 --> themesMemory usage: 8388608
DEBUG - 2026-03-07 02:39:06 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-07 02:39:06 --> [REQ_ID=119485927334] [FILTER_AFTER]
DEBUG - 2026-03-07 02:39:06 --> [REQ_ID=119485927334] [LIFECYCLE][END] status=200 duration_ms=459.70 memory_delta=2097152
INFO - 2026-03-07 02:39:06 --> [REQ_ID=bfeacc00868a] [PERF] Execution time=0.459259
DEBUG - 2026-03-07 02:39:06 --> [REQ_ID=119485927334] [REQUEST][END]
INFO - 2026-03-07 02:39:06 --> [REQ_ID=119485927334] [PERF] Execution time=0.468546
DEBUG - 2026-03-07 02:39:06 --> [REQ_ID=662e4afcb74b] [REQUEST][START] GET /
DEBUG - 2026-03-07 02:39:06 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-07 02:39:06 --> [REQ_ID=662e4afcb74b] [FILTER_BEFORE] /
DEBUG - 2026-03-07 02:39:06 --> [REQ_ID=662e4afcb74b] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-07 02:39:06 --> [REQ_ID=662e4afcb74b] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-07 02:39:06 --> [CSRF] token name=csrf_test_name hash=7d9bc2ac0a6dd3d5cb5c35b074f02d29
DEBUG - 2026-03-07 02:39:06 --> [REQ_ID=108cbf0b8044] [INIT] App\Controllers\Home::GET
INFO - 2026-03-07 02:39:06 --> [REQ_ID=108cbf0b8044] [MEMORY][controller-start] 6291456
INFO - 2026-03-07 02:39:06 --> [REQ_ID=108cbf0b8044] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-07 02:39:06 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-07 02:39:06 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
DEBUG - 2026-03-07 02:39:06 --> [REQ_ID=108cbf0b8044] [VIEW_RENDER] themes/public/home
INFO - 2026-03-07 02:39:06 --> [REQ_ID=108cbf0b8044] [MEMORY][commonData:start] 8388608
INFO - 2026-03-07 02:39:06 --> themesMemory usage: 8388608
DEBUG - 2026-03-07 02:39:06 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-07 02:39:06 --> [REQ_ID=662e4afcb74b] [FILTER_AFTER]
DEBUG - 2026-03-07 02:39:06 --> [REQ_ID=662e4afcb74b] [LIFECYCLE][END] status=200 duration_ms=478.90 memory_delta=2097152
INFO - 2026-03-07 02:39:06 --> [REQ_ID=108cbf0b8044] [PERF] Execution time=0.478440
DEBUG - 2026-03-07 02:39:06 --> [REQ_ID=662e4afcb74b] [REQUEST][END]
INFO - 2026-03-07 02:39:06 --> [REQ_ID=662e4afcb74b] [PERF] Execution time=0.489343
DEBUG - 2026-03-07 02:41:19 --> [REQ_ID=58fd64ded44f] [REQUEST][START] HEAD /
DEBUG - 2026-03-07 02:41:19 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-07 02:41:19 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-07 02:41:19 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-07 02:41:19 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-07 02:41:19 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
INFO - 2026-03-07 02:45:01 --> [spark:ops:work] Started
INFO - 2026-03-07 02:45:01 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-03-07 02:45:01 --> [SPARK_MEMORY] 16777216
INFO - 2026-03-07 02:45:01 --> [spark:ops:work] Intent
INFO - 2026-03-07 02:45:01 --> [spark:ops:work] Completed
INFO - 2026-03-07 02:45:01 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.019831
INFO - 2026-03-07 02:45:01 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-03-07 02:46:19 --> [REQ_ID=e5e38b819004] [REQUEST][START] HEAD /
DEBUG - 2026-03-07 02:46:19 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-07 02:46:19 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-07 02:46:19 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-07 02:46:19 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-07 02:46:19 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-07 02:51:19 --> [REQ_ID=046a9ee20e3d] [REQUEST][START] HEAD /
DEBUG - 2026-03-07 02:51:19 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-07 02:51:19 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-07 02:51:19 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-07 02:51:19 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-07 02:51:19 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-07 02:56:19 --> [REQ_ID=917f46f4b42e] [REQUEST][START] HEAD /
DEBUG - 2026-03-07 02:56:19 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-07 02:56:19 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-07 02:56:19 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-07 02:56:19 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-07 02:56:19 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
INFO - 2026-03-07 03:00:01 --> [spark:ops:work] Started
INFO - 2026-03-07 03:00:01 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-03-07 03:00:01 --> [SPARK_MEMORY] 16777216
INFO - 2026-03-07 03:00:01 --> [spark:ops:work] Intent
INFO - 2026-03-07 03:00:01 --> [spark:ops:work] Completed
INFO - 2026-03-07 03:00:01 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.050706
INFO - 2026-03-07 03:00:01 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-03-07 03:00:01 --> [REQ_ID=7a27f16e76ff] [REQUEST][START] GET /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-07 03:00:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-07 03:00:01 --> [REQ_ID=7a27f16e76ff] [FILTER_BEFORE] /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-07 03:00:01 --> [REQ_ID=7a27f16e76ff] [ROUTE] Controller=\App\Modules\Management\Controllers\ManagementAPIController Method=Run_CRON_Tasks
DEBUG - 2026-03-07 03:00:01 --> [REQ_ID=7a27f16e76ff] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-07 03:00:01 --> [REQ_ID=7a27f16e76ff] [REQUEST][END]
INFO - 2026-03-07 03:00:01 --> [REQ_ID=7a27f16e76ff] [PERF] Execution time=0.035390
DEBUG - 2026-03-07 03:01:18 --> [REQ_ID=eb759ef3998d] [REQUEST][START] HEAD /
DEBUG - 2026-03-07 03:01:18 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-07 03:01:18 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-07 03:01:19 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-07 03:01:19 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-07 03:01:19 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-07 03:06:19 --> [REQ_ID=d9ef7291ca69] [REQUEST][START] HEAD /
DEBUG - 2026-03-07 03:06:19 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-07 03:06:19 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-07 03:06:19 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-07 03:06:19 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-07 03:06:19 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-07 03:09:32 --> [REQ_ID=40681d6c1022] [REQUEST][START] GET /index.php/Projects
DEBUG - 2026-03-07 03:09:32 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-07 03:09:32 --> [REQ_ID=40681d6c1022] [FILTER_BEFORE] /index.php/Projects
DEBUG - 2026-03-07 03:09:32 --> [REQ_ID=40681d6c1022] [ROUTE] Controller=\App\Modules\User\Controllers\ProjectsController Method=index
DEBUG - 2026-03-07 03:09:32 --> [REQ_ID=40681d6c1022] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Projects
DEBUG - 2026-03-07 03:09:32 --> [CSRF] token name=csrf_test_name hash=8c5123987baba050cc9b63dfb41b5ffa
DEBUG - 2026-03-07 03:09:32 --> [REQ_ID=40681d6c1022] [REQUEST][END]
INFO - 2026-03-07 03:09:32 --> [REQ_ID=40681d6c1022] [PERF] Execution time=0.052774
DEBUG - 2026-03-07 03:09:33 --> [REQ_ID=276e2b89b374] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-07 03:09:33 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-07 03:09:33 --> [REQ_ID=276e2b89b374] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-07 03:09:33 --> [REQ_ID=276e2b89b374] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-07 03:09:33 --> [REQ_ID=276e2b89b374] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-07 03:09:33 --> [CSRF] token name=csrf_test_name hash=82a1b2e9371cc2725f7b9de3b80a68a4
DEBUG - 2026-03-07 03:09:33 --> [REQ_ID=01a4f2791c83] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-07 03:09:33 --> [REQ_ID=01a4f2791c83] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-07 03:09:33 --> [REQ_ID=276e2b89b374] [FILTER_AFTER]
DEBUG - 2026-03-07 03:09:33 --> [REQ_ID=276e2b89b374] [LIFECYCLE][END] status=200 duration_ms=104.90 memory_delta=0
INFO - 2026-03-07 03:09:33 --> [REQ_ID=01a4f2791c83] [PERF] Execution time=0.104665
DEBUG - 2026-03-07 03:09:33 --> [REQ_ID=276e2b89b374] [REQUEST][END]
INFO - 2026-03-07 03:09:33 --> [REQ_ID=276e2b89b374] [PERF] Execution time=0.117943
DEBUG - 2026-03-07 03:11:19 --> [REQ_ID=0f0035aca168] [REQUEST][START] HEAD /
DEBUG - 2026-03-07 03:11:19 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-07 03:11:19 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-07 03:11:19 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-07 03:11:19 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-07 03:11:19 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
INFO - 2026-03-07 03:15:01 --> [spark:ops:work] Started
INFO - 2026-03-07 03:15:01 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-03-07 03:15:01 --> [SPARK_MEMORY] 16777216
INFO - 2026-03-07 03:15:01 --> [spark:ops:work] Intent
INFO - 2026-03-07 03:15:01 --> [spark:ops:work] Completed
INFO - 2026-03-07 03:15:01 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.033808
INFO - 2026-03-07 03:15:01 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-03-07 03:15:01 --> [REQ_ID=bc7348ac47c7] [REQUEST][START] GET /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-07 03:15:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-07 03:15:01 --> [REQ_ID=bc7348ac47c7] [FILTER_BEFORE] /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-07 03:15:01 --> [REQ_ID=bc7348ac47c7] [ROUTE] Controller=\App\Modules\APIs\Controllers\AlertsAPIController Method=fetchEmailAlerts
DEBUG - 2026-03-07 03:15:01 --> [REQ_ID=bc7348ac47c7] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-07 03:15:01 --> [REQ_ID=bc7348ac47c7] [REQUEST][END]
INFO - 2026-03-07 03:15:01 --> [REQ_ID=bc7348ac47c7] [PERF] Execution time=0.062628
DEBUG - 2026-03-07 03:16:19 --> [REQ_ID=b81d1c05f565] [REQUEST][START] HEAD /
DEBUG - 2026-03-07 03:16:19 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-07 03:16:19 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-07 03:16:19 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-07 03:16:19 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-07 03:16:19 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-07 03:21:18 --> [REQ_ID=0d84b5609f04] [REQUEST][START] HEAD /
DEBUG - 2026-03-07 03:21:18 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-07 03:21:19 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-07 03:21:19 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-07 03:21:19 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-07 03:21:19 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-07 03:26:19 --> [REQ_ID=1a0e6a2178ae] [REQUEST][START] HEAD /
DEBUG - 2026-03-07 03:26:19 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-07 03:26:19 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-07 03:26:19 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-07 03:26:19 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-07 03:26:19 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
INFO - 2026-03-07 03:30:01 --> [spark:ops:work] Started
INFO - 2026-03-07 03:30:01 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-03-07 03:30:01 --> [SPARK_MEMORY] 16777216
INFO - 2026-03-07 03:30:01 --> [spark:ops:work] Intent
INFO - 2026-03-07 03:30:01 --> [spark:ops:work] Completed
INFO - 2026-03-07 03:30:01 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.092840
INFO - 2026-03-07 03:30:01 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-03-07 03:31:19 --> [REQ_ID=b881cf9df130] [REQUEST][START] HEAD /
DEBUG - 2026-03-07 03:31:19 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-07 03:31:19 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-07 03:31:19 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-07 03:31:19 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-07 03:31:19 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-07 03:36:11 --> [REQ_ID=2cc528193e71] [REQUEST][START] GET /
DEBUG - 2026-03-07 03:36:11 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-07 03:36:11 --> [REQ_ID=2cc528193e71] [FILTER_BEFORE] /
DEBUG - 2026-03-07 03:36:11 --> [REQ_ID=2cc528193e71] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-07 03:36:11 --> [REQ_ID=2cc528193e71] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-07 03:36:11 --> [CSRF] token name=csrf_test_name hash=a29faae77ff482239c1c9463b8d74a0f
DEBUG - 2026-03-07 03:36:11 --> [REQ_ID=bd9b22e2deb1] [INIT] App\Controllers\Home::GET
INFO - 2026-03-07 03:36:11 --> [REQ_ID=bd9b22e2deb1] [MEMORY][controller-start] 6291456
INFO - 2026-03-07 03:36:11 --> [REQ_ID=bd9b22e2deb1] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-07 03:36:11 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-07 03:36:12 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-03-07 03:36:12 --> [REQ_ID=bd9b22e2deb1] [VIEW_RENDER] themes/public/home
INFO - 2026-03-07 03:36:12 --> [REQ_ID=bd9b22e2deb1] [MEMORY][commonData:start] 10485760
INFO - 2026-03-07 03:36:12 --> themesMemory usage: 10485760
DEBUG - 2026-03-07 03:36:12 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-07 03:36:12 --> [REQ_ID=2cc528193e71] [FILTER_AFTER]
DEBUG - 2026-03-07 03:36:12 --> [REQ_ID=2cc528193e71] [LIFECYCLE][END] status=200 duration_ms=643.68 memory_delta=4194304
INFO - 2026-03-07 03:36:12 --> [REQ_ID=bd9b22e2deb1] [PERF] Execution time=0.641644
DEBUG - 2026-03-07 03:36:12 --> [REQ_ID=2cc528193e71] [REQUEST][END]
INFO - 2026-03-07 03:36:12 --> [REQ_ID=2cc528193e71] [PERF] Execution time=0.682328
DEBUG - 2026-03-07 03:36:18 --> [REQ_ID=3a893d2bd69e] [REQUEST][START] HEAD /
DEBUG - 2026-03-07 03:36:18 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-07 03:36:18 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-07 03:36:19 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-07 03:36:19 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-07 03:36:19 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-07 03:36:45 --> [REQ_ID=4848aed9f15a] [REQUEST][START] GET /index.php/Premium-Features/Advanced-Charting
DEBUG - 2026-03-07 03:36:45 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-07 03:36:45 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: GET, Route: Premium-Features/Advanced-Charting]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-07 03:36:45 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-07 03:36:45 --> [404] URI=https://www.mymiwallet.com/index.php/Premium-Features/Advanced-Charting
WARNING - 2026-03-07 03:36:45 --> 404 route miss: https://www.mymiwallet.com/index.php/Premium-Features/Advanced-Charting | referrer: none
DEBUG - 2026-03-07 03:37:54 --> [REQ_ID=3326d201324f] [REQUEST][START] GET /index.php/Premium_Features/Brokerage-Integrations
DEBUG - 2026-03-07 03:37:54 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-07 03:37:54 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: GET, Route: Premium_Features/Brokerage-Integrations]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-07 03:37:54 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-07 03:37:54 --> [404] URI=https://www.mymiwallet.com/index.php/Premium_Features/Brokerage-Integrations
WARNING - 2026-03-07 03:37:54 --> 404 route miss: https://www.mymiwallet.com/index.php/Premium_Features/Brokerage-Integrations | referrer: none
DEBUG - 2026-03-07 03:41:19 --> [REQ_ID=34446db66ca4] [REQUEST][START] HEAD /
DEBUG - 2026-03-07 03:41:19 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-07 03:41:19 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-07 03:41:19 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-07 03:41:19 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-07 03:41:19 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
INFO - 2026-03-07 03:45:01 --> [spark:ops:work] Started
INFO - 2026-03-07 03:45:01 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-03-07 03:45:01 --> [SPARK_MEMORY] 16777216
INFO - 2026-03-07 03:45:01 --> [spark:ops:work] Intent
INFO - 2026-03-07 03:45:01 --> [spark:ops:work] Completed
INFO - 2026-03-07 03:45:01 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.089699
INFO - 2026-03-07 03:45:01 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-03-07 03:45:09 --> [REQ_ID=b5f383a8e21c] [REQUEST][START] GET /index.php/Management/Marketing/Video-Creator
DEBUG - 2026-03-07 03:45:09 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-07 03:45:09 --> [REQ_ID=b5f383a8e21c] [FILTER_BEFORE] /index.php/Management/Marketing/Video-Creator
DEBUG - 2026-03-07 03:45:09 --> [REQ_ID=b5f383a8e21c] [ROUTE] Controller=\App\Modules\Management\Controllers\MarketingAdminController Method=videoCreator
DEBUG - 2026-03-07 03:45:09 --> [REQ_ID=b5f383a8e21c] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Management/Marketing/Video-Creator
DEBUG - 2026-03-07 03:45:09 --> [CSRF] token name=csrf_test_name hash=65b72f8be48c62a076e003686f3fee9f
DEBUG - 2026-03-07 03:45:09 --> [REQ_ID=b5f383a8e21c] [REQUEST][END]
INFO - 2026-03-07 03:45:09 --> [REQ_ID=b5f383a8e21c] [PERF] Execution time=0.066531
DEBUG - 2026-03-07 03:45:09 --> [REQ_ID=57bf20aae399] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-07 03:45:09 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-07 03:45:09 --> [REQ_ID=57bf20aae399] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-07 03:45:09 --> [REQ_ID=57bf20aae399] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-07 03:45:09 --> [REQ_ID=57bf20aae399] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-07 03:45:09 --> [CSRF] token name=csrf_test_name hash=42c77608b3adfb8ad3c28b1576acbe8e
DEBUG - 2026-03-07 03:45:09 --> [REQ_ID=bd3b1d24cbc2] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-07 03:45:09 --> [REQ_ID=bd3b1d24cbc2] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-07 03:45:09 --> [REQ_ID=57bf20aae399] [FILTER_AFTER]
DEBUG - 2026-03-07 03:45:09 --> [REQ_ID=57bf20aae399] [LIFECYCLE][END] status=200 duration_ms=46.52 memory_delta=0
INFO - 2026-03-07 03:45:09 --> [REQ_ID=bd3b1d24cbc2] [PERF] Execution time=0.046258
DEBUG - 2026-03-07 03:45:09 --> [REQ_ID=57bf20aae399] [REQUEST][END]
INFO - 2026-03-07 03:45:09 --> [REQ_ID=57bf20aae399] [PERF] Execution time=0.058117
DEBUG - 2026-03-07 03:46:18 --> [REQ_ID=2828e9a247ec] [REQUEST][START] HEAD /
DEBUG - 2026-03-07 03:46:18 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-07 03:46:18 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-07 03:46:19 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-07 03:46:19 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-07 03:46:19 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-07 03:51:19 --> [REQ_ID=3e936f4d4fac] [REQUEST][START] HEAD /
DEBUG - 2026-03-07 03:51:19 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-07 03:51:19 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-07 03:51:19 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-07 03:51:19 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-07 03:51:19 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-07 03:53:45 --> [REQ_ID=b27bf8522723] [REQUEST][START] GET /
DEBUG - 2026-03-07 03:53:45 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-07 03:53:45 --> [REQ_ID=b27bf8522723] [FILTER_BEFORE] /
DEBUG - 2026-03-07 03:53:45 --> [REQ_ID=b27bf8522723] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-07 03:53:45 --> [REQ_ID=b27bf8522723] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-07 03:53:45 --> [CSRF] token name=csrf_test_name hash=b71fbe0af7d100087a87b8964d2c5683
DEBUG - 2026-03-07 03:53:45 --> [REQ_ID=d60f3f06cafb] [INIT] App\Controllers\Home::GET
INFO - 2026-03-07 03:53:45 --> [REQ_ID=d60f3f06cafb] [MEMORY][controller-start] 6291456
INFO - 2026-03-07 03:53:46 --> [REQ_ID=d60f3f06cafb] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-07 03:53:46 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-07 03:53:46 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-03-07 03:53:46 --> [REQ_ID=d60f3f06cafb] [VIEW_RENDER] themes/public/home
INFO - 2026-03-07 03:53:46 --> [REQ_ID=d60f3f06cafb] [MEMORY][commonData:start] 10485760
INFO - 2026-03-07 03:53:46 --> themesMemory usage: 10485760
DEBUG - 2026-03-07 03:53:46 --> [MetaService] slug= pageName=Home cacheHit= path=DB
DEBUG - 2026-03-07 03:53:46 --> [REQ_ID=b27bf8522723] [FILTER_AFTER]
DEBUG - 2026-03-07 03:53:46 --> [REQ_ID=b27bf8522723] [LIFECYCLE][END] status=200 duration_ms=755.71 memory_delta=4194304
INFO - 2026-03-07 03:53:46 --> [REQ_ID=d60f3f06cafb] [PERF] Execution time=0.752689
DEBUG - 2026-03-07 03:53:46 --> [REQ_ID=b27bf8522723] [REQUEST][END]
INFO - 2026-03-07 03:53:46 --> [REQ_ID=b27bf8522723] [PERF] Execution time=0.795699
DEBUG - 2026-03-07 03:56:19 --> [REQ_ID=06d03cedcad7] [REQUEST][START] HEAD /
DEBUG - 2026-03-07 03:56:19 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-07 03:56:19 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-07 03:56:19 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-07 03:56:19 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-07 03:56:19 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
INFO - 2026-03-07 04:00:02 --> [SPARK_START] App\Commands\AIOps\Run
INFO - 2026-03-07 04:00:02 --> [SPARK_MEMORY] 16777216
INFO - 2026-03-07 04:00:02 --> [spark:ops:work] Started
INFO - 2026-03-07 04:00:02 --> [spark:aiops:run] Intent
INFO - 2026-03-07 04:00:02 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-03-07 04:00:02 --> [SPARK_MEMORY] 16777216
INFO - 2026-03-07 04:00:02 --> [spark:ops:work] Intent
INFO - 2026-03-07 04:00:02 --> [spark:ops:work] Completed
INFO - 2026-03-07 04:00:02 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.067969
INFO - 2026-03-07 04:00:02 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-03-07 04:00:02 --> [REQ_ID=70d6f3a43bb2] [REQUEST][START] GET /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-07 04:00:02 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-07 04:00:02 --> [REQ_ID=70d6f3a43bb2] [FILTER_BEFORE] /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-07 04:00:02 --> [REQ_ID=70d6f3a43bb2] [ROUTE] Controller=\App\Modules\Management\Controllers\ManagementAPIController Method=Run_CRON_Tasks
DEBUG - 2026-03-07 04:00:02 --> [REQ_ID=70d6f3a43bb2] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-07 04:00:02 --> [REQ_ID=70d6f3a43bb2] [REQUEST][END]
INFO - 2026-03-07 04:00:02 --> [REQ_ID=70d6f3a43bb2] [PERF] Execution time=0.093515
INFO - 2026-03-07 04:00:03 --> [AIOPS][SPARK][GOVERNANCE][spark:logs:summarize] Started
INFO - 2026-03-07 04:00:03 --> [SPARK_START] App\Commands\Logs\Summarize
INFO - 2026-03-07 04:00:03 --> [SPARK_MEMORY] 16777216
INFO - 2026-03-07 04:00:03 --> [spark:logs:summarize] Intent
INFO - 2026-03-07 04:00:03 --> [AIOPS][SPARK][GOVERNANCE][spark:logs:summarize] Completed
INFO - 2026-03-07 04:00:03 --> [SPARK_COMPLETE] App\Commands\Logs\Summarize duration=0.006578
INFO - 2026-03-07 04:00:03 --> [SPARK_MEMORY] 18874368
INFO - 2026-03-07 04:00:03 --> [spark:app:healthcheck] Started
INFO - 2026-03-07 04:00:03 --> [SPARK_START] App\Commands\App\Healthcheck
INFO - 2026-03-07 04:00:03 --> [SPARK_MEMORY] 16777216
INFO - 2026-03-07 04:00:03 --> [spark:app:healthcheck] Intent
DEBUG - 2026-03-07 04:00:03 --> LOG_HEALTHCHECK debug marker=eca29a371181
INFO - 2026-03-07 04:00:03 --> LOG_HEALTHCHECK info marker=eca29a371181
NOTICE - 2026-03-07 04:00:03 --> LOG_HEALTHCHECK probe marker=eca29a371181
INFO - 2026-03-07 04:00:03 --> [spark:app:healthcheck] Completed
INFO - 2026-03-07 04:00:03 --> [SPARK_COMPLETE] App\Commands\App\Healthcheck duration=0.025325
INFO - 2026-03-07 04:00:03 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-03-07 04:00:04 --> OllamaPatchRunner:L142 - validateGeneratedPatch Content: 
WARNING - 2026-03-07 04:00:04 --> OllamaPatchRunner:L49 - Original Diff: 
DEBUG - 2026-03-07 04:00:05 --> OllamaPatchRunner:L51 - Retried Diff: 
DEBUG - 2026-03-07 04:00:05 --> OllamaPatchRunner:L142 - validateGeneratedPatch Content: 
DEBUG - 2026-03-07 04:00:05 --> OllamaPatchRunner:L53 - Validating Generated Patch Failed
INFO - 2026-03-07 04:00:05 --> [SPARK_COMPLETE] App\Commands\AIOps\Run duration=3.429368
INFO - 2026-03-07 04:00:05 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-03-07 04:00:32 --> [REQ_ID=c11c687a39c7] [REQUEST][START] GET /
DEBUG - 2026-03-07 04:00:32 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-07 04:00:32 --> [REQ_ID=c11c687a39c7] [FILTER_BEFORE] /
DEBUG - 2026-03-07 04:00:32 --> [REQ_ID=c11c687a39c7] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-07 04:00:32 --> [REQ_ID=c11c687a39c7] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-07 04:00:32 --> [CSRF] token name=csrf_test_name hash=cec4d6083da56136e4f3231a70f03e47
DEBUG - 2026-03-07 04:00:32 --> [REQ_ID=8f7b7cdc649a] [INIT] App\Controllers\Home::GET
INFO - 2026-03-07 04:00:32 --> [REQ_ID=8f7b7cdc649a] [MEMORY][controller-start] 4194304
INFO - 2026-03-07 04:00:33 --> [REQ_ID=8f7b7cdc649a] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-07 04:00:33 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-07 04:00:33 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
DEBUG - 2026-03-07 04:00:33 --> [REQ_ID=8f7b7cdc649a] [VIEW_RENDER] themes/public/home
INFO - 2026-03-07 04:00:33 --> [REQ_ID=8f7b7cdc649a] [MEMORY][commonData:start] 8388608
INFO - 2026-03-07 04:00:33 --> themesMemory usage: 8388608
DEBUG - 2026-03-07 04:00:33 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-07 04:00:33 --> [REQ_ID=c11c687a39c7] [FILTER_AFTER]
DEBUG - 2026-03-07 04:00:33 --> [REQ_ID=c11c687a39c7] [LIFECYCLE][END] status=200 duration_ms=684.14 memory_delta=4194304
INFO - 2026-03-07 04:00:33 --> [REQ_ID=8f7b7cdc649a] [PERF] Execution time=0.682709
DEBUG - 2026-03-07 04:00:33 --> [REQ_ID=c11c687a39c7] [REQUEST][END]
INFO - 2026-03-07 04:00:33 --> [REQ_ID=c11c687a39c7] [PERF] Execution time=0.698409
DEBUG - 2026-03-07 04:01:18 --> [REQ_ID=8dff89359fdc] [REQUEST][START] HEAD /
DEBUG - 2026-03-07 04:01:18 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-07 04:01:18 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-07 04:01:19 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-07 04:01:19 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-07 04:01:19 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-07 04:06:19 --> [REQ_ID=fee99f82bb18] [REQUEST][START] HEAD /
DEBUG - 2026-03-07 04:06:19 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-07 04:06:19 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-07 04:06:19 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-07 04:06:19 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-07 04:06:19 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-07 04:11:19 --> [REQ_ID=d7414f53bd4e] [REQUEST][START] HEAD /
DEBUG - 2026-03-07 04:11:19 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-07 04:11:19 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-07 04:11:19 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-07 04:11:19 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-07 04:11:19 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
INFO - 2026-03-07 04:15:01 --> [spark:ops:work] Started
INFO - 2026-03-07 04:15:01 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-03-07 04:15:01 --> [SPARK_MEMORY] 16777216
INFO - 2026-03-07 04:15:01 --> [spark:ops:work] Intent
INFO - 2026-03-07 04:15:01 --> [spark:ops:work] Completed
INFO - 2026-03-07 04:15:01 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.029831
INFO - 2026-03-07 04:15:01 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-03-07 04:15:01 --> [REQ_ID=2c07fb339f31] [REQUEST][START] GET /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-07 04:15:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-07 04:15:01 --> [REQ_ID=2c07fb339f31] [FILTER_BEFORE] /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-07 04:15:01 --> [REQ_ID=2c07fb339f31] [ROUTE] Controller=\App\Modules\APIs\Controllers\AlertsAPIController Method=fetchEmailAlerts
DEBUG - 2026-03-07 04:15:01 --> [REQ_ID=2c07fb339f31] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-07 04:15:01 --> [REQ_ID=2c07fb339f31] [REQUEST][END]
INFO - 2026-03-07 04:15:01 --> [REQ_ID=2c07fb339f31] [PERF] Execution time=0.057981
DEBUG - 2026-03-07 04:16:18 --> [REQ_ID=0209a68e563d] [REQUEST][START] HEAD /
DEBUG - 2026-03-07 04:16:18 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-07 04:16:18 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-07 04:16:19 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-07 04:16:19 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-07 04:16:19 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-07 04:16:58 --> [REQ_ID=298d7d2da10d] [REQUEST][START] GET /index.php/Investments/News
DEBUG - 2026-03-07 04:16:58 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-07 04:16:58 --> [REQ_ID=298d7d2da10d] [FILTER_BEFORE] /index.php/Investments/News
DEBUG - 2026-03-07 04:16:58 --> [REQ_ID=298d7d2da10d] [ROUTE] Controller=closure_route Method=index
DEBUG - 2026-03-07 04:16:58 --> [REQ_ID=298d7d2da10d] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Investments/News
DEBUG - 2026-03-07 04:16:58 --> [CSRF] token name=csrf_test_name hash=8ae4548af2051d8d9d59dcdd834c61be
DEBUG - 2026-03-07 04:16:58 --> [REQ_ID=298d7d2da10d] [REQUEST][END]
INFO - 2026-03-07 04:16:58 --> [REQ_ID=298d7d2da10d] [PERF] Execution time=0.018872
DEBUG - 2026-03-07 04:16:58 --> [REQ_ID=930a3aac653c] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-07 04:16:58 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-07 04:16:59 --> [REQ_ID=930a3aac653c] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-07 04:16:59 --> [REQ_ID=930a3aac653c] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-07 04:16:59 --> [REQ_ID=930a3aac653c] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-07 04:16:59 --> [CSRF] token name=csrf_test_name hash=8ea9f9d3935115049aebfe3158968c50
DEBUG - 2026-03-07 04:16:59 --> [REQ_ID=1dfef8858081] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-07 04:16:59 --> [REQ_ID=1dfef8858081] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-07 04:16:59 --> [REQ_ID=930a3aac653c] [FILTER_AFTER]
DEBUG - 2026-03-07 04:16:59 --> [REQ_ID=930a3aac653c] [LIFECYCLE][END] status=200 duration_ms=664.03 memory_delta=0
INFO - 2026-03-07 04:16:59 --> [REQ_ID=1dfef8858081] [PERF] Execution time=0.663817
DEBUG - 2026-03-07 04:16:59 --> [REQ_ID=930a3aac653c] [REQUEST][END]
INFO - 2026-03-07 04:16:59 --> [REQ_ID=930a3aac653c] [PERF] Execution time=0.678824
DEBUG - 2026-03-07 04:17:02 --> [REQ_ID=1b74ac1189c1] [REQUEST][START] GET /index.php/How-It-Works/Daily-Financial-News
DEBUG - 2026-03-07 04:17:02 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-07 04:17:02 --> [REQ_ID=1b74ac1189c1] [FILTER_BEFORE] /index.php/How-It-Works/Daily-Financial-News
DEBUG - 2026-03-07 04:17:02 --> [REQ_ID=1b74ac1189c1] [ROUTE] Controller=\App\Modules\Blog\Controllers\HowItWorksController Method=show
DEBUG - 2026-03-07 04:17:02 --> [REQ_ID=1b74ac1189c1] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/How-It-Works/Daily-Financial-News
DEBUG - 2026-03-07 04:17:02 --> [CSRF] token name=csrf_test_name hash=b1a3338b02abf9f59f50b401db251730
DEBUG - 2026-03-07 04:17:02 --> [REQ_ID=5fd82069f5dc] [INIT] App\Modules\Blog\Controllers\HowItWorksController::GET
INFO - 2026-03-07 04:17:02 --> [REQ_ID=5fd82069f5dc] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-07 04:17:02 --> [REQ_ID=5fd82069f5dc] [METHOD_ENTRY] show
DEBUG - 2026-03-07 04:17:02 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-07 04:17:02 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-07 04:17:02 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-07 04:17:02 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-07 04:17:02 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-07 04:17:02 --> MyMICoin: guest context detected; skipping user-specific preload.
ERROR - 2026-03-07 04:17:02 --> [ERROR_PAGE] event=error_404 status=404 message=Page not found.
DEBUG - 2026-03-07 04:17:02 --> [REQ_ID=1b74ac1189c1] [FILTER_AFTER]
DEBUG - 2026-03-07 04:17:02 --> [REQ_ID=1b74ac1189c1] [LIFECYCLE][END] status=404 duration_ms=67.29 memory_delta=2097152
INFO - 2026-03-07 04:17:02 --> [REQ_ID=5fd82069f5dc] [PERF] Execution time=0.066508
DEBUG - 2026-03-07 04:17:02 --> [REQ_ID=1b74ac1189c1] [REQUEST][END]
INFO - 2026-03-07 04:17:02 --> [REQ_ID=1b74ac1189c1] [PERF] Execution time=0.081928
DEBUG - 2026-03-07 04:17:04 --> [REQ_ID=807505ab46e3] [REQUEST][START] GET /index.php/How-It-Works/Investment-Portfolio-Management
DEBUG - 2026-03-07 04:17:04 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-07 04:17:04 --> [REQ_ID=807505ab46e3] [FILTER_BEFORE] /index.php/How-It-Works/Investment-Portfolio-Management
DEBUG - 2026-03-07 04:17:04 --> [REQ_ID=807505ab46e3] [ROUTE] Controller=\App\Modules\Blog\Controllers\HowItWorksController Method=show
DEBUG - 2026-03-07 04:17:04 --> [REQ_ID=807505ab46e3] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/How-It-Works/Investment-Portfolio-Management
DEBUG - 2026-03-07 04:17:04 --> [CSRF] token name=csrf_test_name hash=dfeb0f92f44ac5bf91f2e52edb3b4ac4
DEBUG - 2026-03-07 04:17:04 --> [REQ_ID=c9b6ddb5e593] [INIT] App\Modules\Blog\Controllers\HowItWorksController::GET
INFO - 2026-03-07 04:17:04 --> [REQ_ID=c9b6ddb5e593] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-07 04:17:04 --> [REQ_ID=c9b6ddb5e593] [METHOD_ENTRY] show
DEBUG - 2026-03-07 04:17:04 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-07 04:17:04 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-07 04:17:04 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-07 04:17:04 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-07 04:17:04 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-07 04:17:04 --> MyMICoin: guest context detected; skipping user-specific preload.
ERROR - 2026-03-07 04:17:04 --> [ERROR_PAGE] event=error_404 status=404 message=Page not found.
DEBUG - 2026-03-07 04:17:04 --> [REQ_ID=807505ab46e3] [FILTER_AFTER]
DEBUG - 2026-03-07 04:17:04 --> [REQ_ID=807505ab46e3] [LIFECYCLE][END] status=404 duration_ms=26.38 memory_delta=0
INFO - 2026-03-07 04:17:04 --> [REQ_ID=c9b6ddb5e593] [PERF] Execution time=0.025773
DEBUG - 2026-03-07 04:17:04 --> [REQ_ID=807505ab46e3] [REQUEST][END]
INFO - 2026-03-07 04:17:04 --> [REQ_ID=807505ab46e3] [PERF] Execution time=0.036647
DEBUG - 2026-03-07 04:17:05 --> [REQ_ID=fb023625e064] [REQUEST][START] GET /index.php/How-It-Works/Personal-Budgeting
DEBUG - 2026-03-07 04:17:05 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-07 04:17:05 --> [REQ_ID=fb023625e064] [FILTER_BEFORE] /index.php/How-It-Works/Personal-Budgeting
DEBUG - 2026-03-07 04:17:05 --> [REQ_ID=fb023625e064] [ROUTE] Controller=\App\Modules\Blog\Controllers\HowItWorksController Method=show
DEBUG - 2026-03-07 04:17:05 --> [REQ_ID=fb023625e064] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/How-It-Works/Personal-Budgeting
DEBUG - 2026-03-07 04:17:05 --> [CSRF] token name=csrf_test_name hash=304b5ee92ae989dd1856297755762e14
DEBUG - 2026-03-07 04:17:05 --> [REQ_ID=256304a976da] [INIT] App\Modules\Blog\Controllers\HowItWorksController::GET
INFO - 2026-03-07 04:17:05 --> [REQ_ID=256304a976da] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-07 04:17:05 --> [REQ_ID=256304a976da] [METHOD_ENTRY] show
DEBUG - 2026-03-07 04:17:05 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-07 04:17:05 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-07 04:17:05 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-07 04:17:05 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-07 04:17:05 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-07 04:17:05 --> MyMICoin: guest context detected; skipping user-specific preload.
INFO - 2026-03-07 04:17:05 --> [REQ_ID=256304a976da] [MEMORY][commonData:start] 4194304
DEBUG - 2026-03-07 04:17:06 --> [REQ_ID=256304a976da] [VIEW_RENDER] App\Modules\Blog\Views\HowItWorks\Personal_Budgeting
INFO - 2026-03-07 04:17:06 --> [REQ_ID=256304a976da] [MEMORY][commonData:start] 8388608
INFO - 2026-03-07 04:17:06 --> themesMemory usage: 12582912
DEBUG - 2026-03-07 04:17:06 --> [REQ_ID=fb023625e064] [FILTER_AFTER]
DEBUG - 2026-03-07 04:17:06 --> [REQ_ID=fb023625e064] [LIFECYCLE][END] status=200 duration_ms=1,001.67 memory_delta=8388608
INFO - 2026-03-07 04:17:06 --> [REQ_ID=256304a976da] [PERF] Execution time=0.998836
DEBUG - 2026-03-07 04:17:06 --> [REQ_ID=fb023625e064] [REQUEST][END]
INFO - 2026-03-07 04:17:06 --> [REQ_ID=fb023625e064] [PERF] Execution time=1.016489
DEBUG - 2026-03-07 04:17:08 --> [REQ_ID=f00148a8060d] [REQUEST][START] GET /index.php/How-It-Works/Registering-An-Account
DEBUG - 2026-03-07 04:17:08 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-07 04:17:08 --> [REQ_ID=f00148a8060d] [FILTER_BEFORE] /index.php/How-It-Works/Registering-An-Account
DEBUG - 2026-03-07 04:17:08 --> [REQ_ID=f00148a8060d] [ROUTE] Controller=\App\Modules\Blog\Controllers\HowItWorksController Method=show
DEBUG - 2026-03-07 04:17:08 --> [REQ_ID=f00148a8060d] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/How-It-Works/Registering-An-Account
DEBUG - 2026-03-07 04:17:08 --> [CSRF] token name=csrf_test_name hash=a507d1f2f96f1a94f14da3236679b892
DEBUG - 2026-03-07 04:17:08 --> [REQ_ID=0da44c5d6662] [INIT] App\Modules\Blog\Controllers\HowItWorksController::GET
INFO - 2026-03-07 04:17:08 --> [REQ_ID=0da44c5d6662] [MEMORY][controller-start] 8388608
DEBUG - 2026-03-07 04:17:08 --> [REQ_ID=0da44c5d6662] [METHOD_ENTRY] show
DEBUG - 2026-03-07 04:17:08 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-07 04:17:08 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-07 04:17:08 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-07 04:17:08 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-07 04:17:08 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-07 04:17:08 --> MyMICoin: guest context detected; skipping user-specific preload.
INFO - 2026-03-07 04:17:08 --> [REQ_ID=0da44c5d6662] [MEMORY][commonData:start] 8388608
DEBUG - 2026-03-07 04:17:08 --> [REQ_ID=0da44c5d6662] [VIEW_RENDER] App\Modules\Blog\Views\HowItWorks\Registering_An_Account
INFO - 2026-03-07 04:17:08 --> [REQ_ID=0da44c5d6662] [MEMORY][commonData:start] 8388608
INFO - 2026-03-07 04:17:09 --> themesMemory usage: 10485760
DEBUG - 2026-03-07 04:17:09 --> [REQ_ID=f00148a8060d] [FILTER_AFTER]
DEBUG - 2026-03-07 04:17:09 --> [REQ_ID=f00148a8060d] [LIFECYCLE][END] status=200 duration_ms=1,007.29 memory_delta=2097152
INFO - 2026-03-07 04:17:09 --> [REQ_ID=0da44c5d6662] [PERF] Execution time=1.006735
DEBUG - 2026-03-07 04:17:09 --> [REQ_ID=f00148a8060d] [REQUEST][END]
INFO - 2026-03-07 04:17:09 --> [REQ_ID=f00148a8060d] [PERF] Execution time=1.017917
DEBUG - 2026-03-07 04:20:57 --> [REQ_ID=4cb86a9c5e09] [REQUEST][START] GET /
DEBUG - 2026-03-07 04:20:57 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-07 04:20:57 --> [REQ_ID=4cb86a9c5e09] [FILTER_BEFORE] /
DEBUG - 2026-03-07 04:20:57 --> [REQ_ID=4cb86a9c5e09] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-07 04:20:57 --> [REQ_ID=4cb86a9c5e09] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-07 04:20:57 --> [CSRF] token name=csrf_test_name hash=3856fa657ce45b7fbe3def938fba0ba6
DEBUG - 2026-03-07 04:20:57 --> [REQ_ID=8903851d53f7] [INIT] App\Controllers\Home::GET
INFO - 2026-03-07 04:20:57 --> [REQ_ID=8903851d53f7] [MEMORY][controller-start] 6291456
INFO - 2026-03-07 04:20:57 --> [REQ_ID=8903851d53f7] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-07 04:20:57 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-07 04:20:57 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-03-07 04:20:57 --> [REQ_ID=8903851d53f7] [VIEW_RENDER] themes/public/home
INFO - 2026-03-07 04:20:57 --> [REQ_ID=8903851d53f7] [MEMORY][commonData:start] 10485760
INFO - 2026-03-07 04:20:57 --> themesMemory usage: 10485760
DEBUG - 2026-03-07 04:20:57 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-07 04:20:57 --> [REQ_ID=4cb86a9c5e09] [FILTER_AFTER]
DEBUG - 2026-03-07 04:20:57 --> [REQ_ID=4cb86a9c5e09] [LIFECYCLE][END] status=200 duration_ms=670.08 memory_delta=4194304
INFO - 2026-03-07 04:20:57 --> [REQ_ID=8903851d53f7] [PERF] Execution time=0.668039
DEBUG - 2026-03-07 04:20:57 --> [REQ_ID=4cb86a9c5e09] [REQUEST][END]
INFO - 2026-03-07 04:20:57 --> [REQ_ID=4cb86a9c5e09] [PERF] Execution time=0.709024
DEBUG - 2026-03-07 04:21:18 --> [REQ_ID=d41d7c01ba5d] [REQUEST][START] HEAD /
DEBUG - 2026-03-07 04:21:18 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-07 04:21:18 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-07 04:21:19 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-07 04:21:19 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-07 04:21:19 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-07 04:26:19 --> [REQ_ID=6b5a71ba5788] [REQUEST][START] HEAD /
DEBUG - 2026-03-07 04:26:19 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-07 04:26:19 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-07 04:26:19 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-07 04:26:19 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-07 04:26:19 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
INFO - 2026-03-07 04:30:01 --> [spark:ops:work] Started
INFO - 2026-03-07 04:30:01 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-03-07 04:30:01 --> [SPARK_MEMORY] 16777216
INFO - 2026-03-07 04:30:01 --> [spark:ops:work] Intent
INFO - 2026-03-07 04:30:01 --> [spark:ops:work] Completed
INFO - 2026-03-07 04:30:01 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.096806
INFO - 2026-03-07 04:30:01 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-03-07 04:31:19 --> [REQ_ID=bd5f308e19e0] [REQUEST][START] HEAD /
DEBUG - 2026-03-07 04:31:19 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-07 04:31:19 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-07 04:31:19 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-07 04:31:19 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-07 04:31:19 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-07 04:36:18 --> [REQ_ID=0bdde52d1d65] [REQUEST][START] HEAD /
DEBUG - 2026-03-07 04:36:18 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-07 04:36:19 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-07 04:36:19 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-07 04:36:19 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-07 04:36:19 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-07 04:39:40 --> [REQ_ID=a1a524593d5f] [REQUEST][START] GET /index.php/Wallets/Purchase/Memberships/Customize
DEBUG - 2026-03-07 04:39:40 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-07 04:39:40 --> [REQ_ID=a1a524593d5f] [FILTER_BEFORE] /index.php/Wallets/Purchase/Memberships/Customize
DEBUG - 2026-03-07 04:39:40 --> [REQ_ID=a1a524593d5f] [ROUTE] Controller=\App\Modules\User\Controllers\WalletsController Method=customizeMembership
DEBUG - 2026-03-07 04:39:40 --> [REQ_ID=a1a524593d5f] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Wallets/Purchase/Memberships/Customize
DEBUG - 2026-03-07 04:39:40 --> [CSRF] token name=csrf_test_name hash=4fae54e6a1ebe023f97a79d578dae63e
DEBUG - 2026-03-07 04:39:40 --> [REQ_ID=a1a524593d5f] [REQUEST][END]
INFO - 2026-03-07 04:39:40 --> [REQ_ID=a1a524593d5f] [PERF] Execution time=0.058222
DEBUG - 2026-03-07 04:39:41 --> [REQ_ID=5eb9f7028f07] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-07 04:39:41 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-07 04:39:41 --> [REQ_ID=5eb9f7028f07] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-07 04:39:41 --> [REQ_ID=5eb9f7028f07] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-07 04:39:41 --> [REQ_ID=5eb9f7028f07] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-07 04:39:41 --> [CSRF] token name=csrf_test_name hash=9137fc7bc6313045c5fc36704bd82c26
DEBUG - 2026-03-07 04:39:41 --> [REQ_ID=31bd8072c7bc] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-07 04:39:41 --> [REQ_ID=31bd8072c7bc] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-07 04:39:41 --> [REQ_ID=5eb9f7028f07] [FILTER_AFTER]
DEBUG - 2026-03-07 04:39:41 --> [REQ_ID=5eb9f7028f07] [LIFECYCLE][END] status=200 duration_ms=52.78 memory_delta=0
INFO - 2026-03-07 04:39:41 --> [REQ_ID=31bd8072c7bc] [PERF] Execution time=0.052145
DEBUG - 2026-03-07 04:39:41 --> [REQ_ID=5eb9f7028f07] [REQUEST][END]
INFO - 2026-03-07 04:39:41 --> [REQ_ID=5eb9f7028f07] [PERF] Execution time=0.065745
DEBUG - 2026-03-07 04:41:18 --> [REQ_ID=744a2c71dce1] [REQUEST][START] HEAD /
DEBUG - 2026-03-07 04:41:18 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-07 04:41:18 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-07 04:41:19 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-07 04:41:19 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-07 04:41:19 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-07 04:44:23 --> [REQ_ID=f2ecf226de43] [REQUEST][START] GET /index.php/How-It-Works/Daily-Financial-News
DEBUG - 2026-03-07 04:44:23 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-07 04:44:23 --> [REQ_ID=f2ecf226de43] [FILTER_BEFORE] /index.php/How-It-Works/Daily-Financial-News
DEBUG - 2026-03-07 04:44:23 --> [REQ_ID=f2ecf226de43] [ROUTE] Controller=\App\Modules\Blog\Controllers\HowItWorksController Method=show
DEBUG - 2026-03-07 04:44:23 --> [REQ_ID=f2ecf226de43] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/How-It-Works/Daily-Financial-News
DEBUG - 2026-03-07 04:44:23 --> [CSRF] token name=csrf_test_name hash=d19733e50c5cc117916cf0905d91ea0e
DEBUG - 2026-03-07 04:44:23 --> [REQ_ID=e353ba927723] [INIT] App\Modules\Blog\Controllers\HowItWorksController::GET
INFO - 2026-03-07 04:44:23 --> [REQ_ID=e353ba927723] [MEMORY][controller-start] 6291456
DEBUG - 2026-03-07 04:44:23 --> [REQ_ID=e353ba927723] [METHOD_ENTRY] show
DEBUG - 2026-03-07 04:44:23 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-07 04:44:23 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-07 04:44:23 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-07 04:44:23 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-07 04:44:23 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-07 04:44:23 --> MyMICoin: guest context detected; skipping user-specific preload.
ERROR - 2026-03-07 04:44:23 --> [ERROR_PAGE] event=error_404 status=404 message=Page not found.
DEBUG - 2026-03-07 04:44:23 --> [REQ_ID=f2ecf226de43] [FILTER_AFTER]
DEBUG - 2026-03-07 04:44:23 --> [REQ_ID=f2ecf226de43] [LIFECYCLE][END] status=404 duration_ms=169.47 memory_delta=0
INFO - 2026-03-07 04:44:23 --> [REQ_ID=e353ba927723] [PERF] Execution time=0.167333
DEBUG - 2026-03-07 04:44:23 --> [REQ_ID=f2ecf226de43] [REQUEST][END]
INFO - 2026-03-07 04:44:23 --> [REQ_ID=f2ecf226de43] [PERF] Execution time=0.212516
INFO - 2026-03-07 04:45:01 --> [spark:ops:work] Started
INFO - 2026-03-07 04:45:01 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-03-07 04:45:01 --> [SPARK_MEMORY] 16777216
INFO - 2026-03-07 04:45:01 --> [spark:ops:work] Intent
INFO - 2026-03-07 04:45:01 --> [spark:ops:work] Completed
INFO - 2026-03-07 04:45:01 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.044157
INFO - 2026-03-07 04:45:01 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-03-07 04:46:18 --> [REQ_ID=f84c08978d68] [REQUEST][START] HEAD /
DEBUG - 2026-03-07 04:46:19 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-07 04:46:19 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-07 04:46:19 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-07 04:46:19 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-07 04:46:19 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-07 04:51:18 --> [REQ_ID=f757bdf024aa] [REQUEST][START] HEAD /
DEBUG - 2026-03-07 04:51:18 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-07 04:51:19 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-07 04:51:19 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-07 04:51:19 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-07 04:51:19 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-07 04:56:18 --> [REQ_ID=4203c0e146d3] [REQUEST][START] HEAD /
DEBUG - 2026-03-07 04:56:18 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-07 04:56:19 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-07 04:56:19 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-07 04:56:19 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-07 04:56:19 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
INFO - 2026-03-07 05:00:02 --> [spark:ops:work] Started
INFO - 2026-03-07 05:00:02 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-03-07 05:00:02 --> [SPARK_MEMORY] 16777216
INFO - 2026-03-07 05:00:02 --> [spark:ops:work] Intent
DEBUG - 2026-03-07 05:00:02 --> [REQ_ID=a3ac74728ef6] [REQUEST][START] GET /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-07 05:00:02 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-07 05:00:02 --> [REQ_ID=a3ac74728ef6] [FILTER_BEFORE] /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-07 05:00:02 --> [REQ_ID=a3ac74728ef6] [ROUTE] Controller=\App\Modules\Management\Controllers\ManagementAPIController Method=Run_CRON_Tasks
DEBUG - 2026-03-07 05:00:02 --> [REQ_ID=a3ac74728ef6] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-07 05:00:02 --> [REQ_ID=a3ac74728ef6] [REQUEST][END]
INFO - 2026-03-07 05:00:02 --> [REQ_ID=a3ac74728ef6] [PERF] Execution time=0.047503
INFO - 2026-03-07 05:00:02 --> [spark:ops:work] Completed
INFO - 2026-03-07 05:00:02 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.140229
INFO - 2026-03-07 05:00:02 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-03-07 05:01:07 --> [REQ_ID=280f6036ab16] [REQUEST][START] GET /index.php/Account/Social-Media
DEBUG - 2026-03-07 05:01:07 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-07 05:01:07 --> [REQ_ID=280f6036ab16] [FILTER_BEFORE] /index.php/Account/Social-Media
DEBUG - 2026-03-07 05:01:07 --> [REQ_ID=280f6036ab16] [ROUTE] Controller=\App\Modules\User\Controllers\DashboardController Method=SocialMedia
DEBUG - 2026-03-07 05:01:07 --> [REQ_ID=280f6036ab16] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Account/Social-Media
DEBUG - 2026-03-07 05:01:07 --> [CSRF] token name=csrf_test_name hash=667c421a93115cd4af23f1b7a4ef250d
DEBUG - 2026-03-07 05:01:07 --> [REQ_ID=280f6036ab16] [REQUEST][END]
INFO - 2026-03-07 05:01:07 --> [REQ_ID=280f6036ab16] [PERF] Execution time=0.028583
DEBUG - 2026-03-07 05:01:08 --> [REQ_ID=4241fb2da6c6] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-07 05:01:08 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-07 05:01:08 --> [REQ_ID=4241fb2da6c6] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-07 05:01:08 --> [REQ_ID=4241fb2da6c6] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-07 05:01:08 --> [REQ_ID=4241fb2da6c6] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-07 05:01:08 --> [CSRF] token name=csrf_test_name hash=ac1f695b4defb611363431d7a14e7204
DEBUG - 2026-03-07 05:01:08 --> [REQ_ID=76e64d0d0bff] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-07 05:01:08 --> [REQ_ID=76e64d0d0bff] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-07 05:01:08 --> [REQ_ID=4241fb2da6c6] [FILTER_AFTER]
DEBUG - 2026-03-07 05:01:08 --> [REQ_ID=4241fb2da6c6] [LIFECYCLE][END] status=200 duration_ms=120.54 memory_delta=0
INFO - 2026-03-07 05:01:08 --> [REQ_ID=76e64d0d0bff] [PERF] Execution time=0.120271
DEBUG - 2026-03-07 05:01:08 --> [REQ_ID=4241fb2da6c6] [REQUEST][END]
INFO - 2026-03-07 05:01:08 --> [REQ_ID=4241fb2da6c6] [PERF] Execution time=0.131934
DEBUG - 2026-03-07 05:01:18 --> [REQ_ID=2457c32171e9] [REQUEST][START] HEAD /
DEBUG - 2026-03-07 05:01:18 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-07 05:01:18 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-07 05:01:18 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-07 05:01:18 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-07 05:01:18 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-07 05:06:18 --> [REQ_ID=a5edd4428d64] [REQUEST][START] HEAD /
DEBUG - 2026-03-07 05:06:18 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-07 05:06:19 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-07 05:06:19 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-07 05:06:19 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-07 05:06:19 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-07 05:11:18 --> [REQ_ID=49a31a6c37b9] [REQUEST][START] HEAD /
DEBUG - 2026-03-07 05:11:18 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-07 05:11:19 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-07 05:11:19 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-07 05:11:19 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-07 05:11:19 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
INFO - 2026-03-07 05:15:02 --> [spark:ops:work] Started
INFO - 2026-03-07 05:15:02 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-03-07 05:15:02 --> [SPARK_MEMORY] 16777216
INFO - 2026-03-07 05:15:02 --> [spark:ops:work] Intent
DEBUG - 2026-03-07 05:15:02 --> [REQ_ID=e91ee66cf3b8] [REQUEST][START] GET /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-07 05:15:02 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-07 05:15:02 --> [REQ_ID=e91ee66cf3b8] [FILTER_BEFORE] /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-07 05:15:02 --> [REQ_ID=e91ee66cf3b8] [ROUTE] Controller=\App\Modules\APIs\Controllers\AlertsAPIController Method=fetchEmailAlerts
DEBUG - 2026-03-07 05:15:02 --> [REQ_ID=e91ee66cf3b8] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-07 05:15:02 --> [REQ_ID=e91ee66cf3b8] [REQUEST][END]
INFO - 2026-03-07 05:15:02 --> [REQ_ID=e91ee66cf3b8] [PERF] Execution time=0.058830
INFO - 2026-03-07 05:15:02 --> [spark:ops:work] Completed
INFO - 2026-03-07 05:15:02 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.145551
INFO - 2026-03-07 05:15:02 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-03-07 05:16:18 --> [REQ_ID=34bec667c56f] [REQUEST][START] HEAD /
DEBUG - 2026-03-07 05:16:18 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-07 05:16:18 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-07 05:16:19 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-07 05:16:19 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-07 05:16:19 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-07 05:21:18 --> [REQ_ID=e8c995af1ecb] [REQUEST][START] HEAD /
DEBUG - 2026-03-07 05:21:18 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-07 05:21:19 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-07 05:21:19 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-07 05:21:19 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-07 05:21:19 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-07 05:26:18 --> [REQ_ID=1db6db0ef3da] [REQUEST][START] HEAD /
DEBUG - 2026-03-07 05:26:18 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-07 05:26:19 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-07 05:26:19 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-07 05:26:19 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-07 05:26:19 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
INFO - 2026-03-07 05:30:01 --> [spark:ops:work] Started
INFO - 2026-03-07 05:30:01 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-03-07 05:30:01 --> [SPARK_MEMORY] 16777216
INFO - 2026-03-07 05:30:01 --> [spark:ops:work] Intent
INFO - 2026-03-07 05:30:01 --> [spark:ops:work] Completed
INFO - 2026-03-07 05:30:01 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.176150
INFO - 2026-03-07 05:30:01 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-03-07 05:31:18 --> [REQ_ID=235f26bd0f68] [REQUEST][START] HEAD /
DEBUG - 2026-03-07 05:31:18 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-07 05:31:18 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-07 05:31:19 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-07 05:31:19 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-07 05:31:19 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-07 05:36:18 --> [REQ_ID=aa8f874412eb] [REQUEST][START] HEAD /
DEBUG - 2026-03-07 05:36:18 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-07 05:36:19 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-07 05:36:19 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-07 05:36:19 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-07 05:36:19 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-07 05:41:18 --> [REQ_ID=8b064e17cb59] [REQUEST][START] HEAD /
DEBUG - 2026-03-07 05:41:18 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-07 05:41:18 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-07 05:41:19 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-07 05:41:19 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-07 05:41:19 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-07 05:43:09 --> [REQ_ID=7dfa6df7f3c8] [REQUEST][START] GET /index.php/Management/Partners
DEBUG - 2026-03-07 05:43:09 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-07 05:43:10 --> [REQ_ID=7dfa6df7f3c8] [FILTER_BEFORE] /index.php/Management/Partners
DEBUG - 2026-03-07 05:43:10 --> [REQ_ID=7dfa6df7f3c8] [ROUTE] Controller=\App\Modules\Management\Controllers\PartnersController Method=index
DEBUG - 2026-03-07 05:43:10 --> [REQ_ID=7dfa6df7f3c8] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Management/Partners
DEBUG - 2026-03-07 05:43:10 --> [CSRF] token name=csrf_test_name hash=871d1787025cf7946e0f5c75e9373334
DEBUG - 2026-03-07 05:43:10 --> [REQ_ID=7dfa6df7f3c8] [REQUEST][END]
INFO - 2026-03-07 05:43:10 --> [REQ_ID=7dfa6df7f3c8] [PERF] Execution time=0.047620
DEBUG - 2026-03-07 05:43:10 --> [REQ_ID=186f9efa7770] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-07 05:43:10 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-07 05:43:10 --> [REQ_ID=186f9efa7770] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-07 05:43:10 --> [REQ_ID=186f9efa7770] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-07 05:43:10 --> [REQ_ID=186f9efa7770] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-07 05:43:10 --> [CSRF] token name=csrf_test_name hash=fef67d145faba58a56c5b1b99a639a02
DEBUG - 2026-03-07 05:43:10 --> [REQ_ID=462c01147f97] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-07 05:43:10 --> [REQ_ID=462c01147f97] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-07 05:43:10 --> [REQ_ID=186f9efa7770] [FILTER_AFTER]
DEBUG - 2026-03-07 05:43:10 --> [REQ_ID=186f9efa7770] [LIFECYCLE][END] status=200 duration_ms=33.99 memory_delta=0
INFO - 2026-03-07 05:43:10 --> [REQ_ID=462c01147f97] [PERF] Execution time=0.033598
DEBUG - 2026-03-07 05:43:10 --> [REQ_ID=186f9efa7770] [REQUEST][END]
INFO - 2026-03-07 05:43:10 --> [REQ_ID=186f9efa7770] [PERF] Execution time=0.055401
INFO - 2026-03-07 05:45:02 --> [spark:ops:work] Started
INFO - 2026-03-07 05:45:02 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-03-07 05:45:02 --> [SPARK_MEMORY] 16777216
INFO - 2026-03-07 05:45:02 --> [spark:ops:work] Intent
INFO - 2026-03-07 05:45:02 --> [spark:ops:work] Completed
INFO - 2026-03-07 05:45:02 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.021586
INFO - 2026-03-07 05:45:02 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-03-07 05:46:18 --> [REQ_ID=38203d76028b] [REQUEST][START] HEAD /
DEBUG - 2026-03-07 05:46:18 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-07 05:46:19 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-07 05:46:19 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-07 05:46:19 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-07 05:46:19 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-07 05:48:25 --> [REQ_ID=39d54dc2770d] [REQUEST][START] GET /index.php/How-To-Guides
DEBUG - 2026-03-07 05:48:25 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-07 05:48:25 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: GET, Route: How-To-Guides]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-07 05:48:25 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-07 05:48:25 --> [404] URI=https://www.mymiwallet.com/index.php/How-To-Guides
WARNING - 2026-03-07 05:48:25 --> 404 route miss: https://www.mymiwallet.com/index.php/How-To-Guides | referrer: none
DEBUG - 2026-03-07 05:51:18 --> [REQ_ID=eb7e8ca32fee] [REQUEST][START] HEAD /
DEBUG - 2026-03-07 05:51:18 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-07 05:51:18 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-07 05:51:19 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-07 05:51:19 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-07 05:51:19 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-07 05:56:18 --> [REQ_ID=bb259edf29a3] [REQUEST][START] HEAD /
DEBUG - 2026-03-07 05:56:18 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-07 05:56:18 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-07 05:56:19 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-07 05:56:19 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-07 05:56:19 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
INFO - 2026-03-07 06:00:01 --> [spark:ops:work] Started
INFO - 2026-03-07 06:00:01 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-03-07 06:00:01 --> [SPARK_MEMORY] 16777216
INFO - 2026-03-07 06:00:01 --> [spark:ops:work] Intent
INFO - 2026-03-07 06:00:01 --> [spark:ops:work] Completed
INFO - 2026-03-07 06:00:01 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.054898
INFO - 2026-03-07 06:00:01 --> [SPARK_MEMORY] 18874368
INFO - 2026-03-07 06:00:01 --> [SPARK_START] App\Commands\AIOps\Run
INFO - 2026-03-07 06:00:01 --> [SPARK_MEMORY] 16777216
INFO - 2026-03-07 06:00:01 --> [spark:aiops:run] Intent
DEBUG - 2026-03-07 06:00:01 --> [REQ_ID=7bbab8e1f02c] [REQUEST][START] GET /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-07 06:00:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-07 06:00:01 --> [REQ_ID=7bbab8e1f02c] [FILTER_BEFORE] /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-07 06:00:01 --> [REQ_ID=7bbab8e1f02c] [ROUTE] Controller=\App\Modules\Management\Controllers\ManagementAPIController Method=Run_CRON_Tasks
DEBUG - 2026-03-07 06:00:01 --> [REQ_ID=7bbab8e1f02c] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-07 06:00:01 --> [REQ_ID=7bbab8e1f02c] [REQUEST][END]
INFO - 2026-03-07 06:00:01 --> [REQ_ID=7bbab8e1f02c] [PERF] Execution time=0.062187
INFO - 2026-03-07 06:00:03 --> [AIOPS][SPARK][GOVERNANCE][spark:logs:summarize] Started
INFO - 2026-03-07 06:00:03 --> [SPARK_START] App\Commands\Logs\Summarize
INFO - 2026-03-07 06:00:03 --> [SPARK_MEMORY] 16777216
INFO - 2026-03-07 06:00:03 --> [spark:logs:summarize] Intent
INFO - 2026-03-07 06:00:03 --> [AIOPS][SPARK][GOVERNANCE][spark:logs:summarize] Completed
INFO - 2026-03-07 06:00:03 --> [SPARK_COMPLETE] App\Commands\Logs\Summarize duration=0.008071
INFO - 2026-03-07 06:00:03 --> [SPARK_MEMORY] 18874368
INFO - 2026-03-07 06:00:03 --> [spark:app:healthcheck] Started
INFO - 2026-03-07 06:00:03 --> [SPARK_START] App\Commands\App\Healthcheck
INFO - 2026-03-07 06:00:03 --> [SPARK_MEMORY] 16777216
INFO - 2026-03-07 06:00:03 --> [spark:app:healthcheck] Intent
DEBUG - 2026-03-07 06:00:03 --> LOG_HEALTHCHECK debug marker=ebb56c820169
INFO - 2026-03-07 06:00:03 --> LOG_HEALTHCHECK info marker=ebb56c820169
NOTICE - 2026-03-07 06:00:03 --> LOG_HEALTHCHECK probe marker=ebb56c820169
INFO - 2026-03-07 06:00:03 --> [spark:app:healthcheck] Completed
INFO - 2026-03-07 06:00:03 --> [SPARK_COMPLETE] App\Commands\App\Healthcheck duration=0.026678
INFO - 2026-03-07 06:00:03 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-03-07 06:00:04 --> OllamaPatchRunner:L142 - validateGeneratedPatch Content: 
WARNING - 2026-03-07 06:00:04 --> OllamaPatchRunner:L49 - Original Diff: 
DEBUG - 2026-03-07 06:00:05 --> OllamaPatchRunner:L51 - Retried Diff: 
DEBUG - 2026-03-07 06:00:05 --> OllamaPatchRunner:L142 - validateGeneratedPatch Content: 
DEBUG - 2026-03-07 06:00:05 --> OllamaPatchRunner:L53 - Validating Generated Patch Failed
INFO - 2026-03-07 06:00:05 --> [SPARK_COMPLETE] App\Commands\AIOps\Run duration=3.713149
INFO - 2026-03-07 06:00:05 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-03-07 06:01:18 --> [REQ_ID=1f240b79a06a] [REQUEST][START] HEAD /
DEBUG - 2026-03-07 06:01:18 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-07 06:01:18 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-07 06:01:18 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-07 06:01:18 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-07 06:01:18 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-07 06:04:02 --> [REQ_ID=6127190ee048] [REQUEST][START] GET /index.php/Management/Marketing/Post-Creator
DEBUG - 2026-03-07 06:04:02 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-07 06:04:02 --> [REQ_ID=6127190ee048] [FILTER_BEFORE] /index.php/Management/Marketing/Post-Creator
DEBUG - 2026-03-07 06:04:02 --> [REQ_ID=6127190ee048] [ROUTE] Controller=\App\Modules\Management\Controllers\MarketingAdminController Method=postCreator
DEBUG - 2026-03-07 06:04:02 --> [REQ_ID=6127190ee048] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Management/Marketing/Post-Creator
DEBUG - 2026-03-07 06:04:02 --> [CSRF] token name=csrf_test_name hash=4131d8261333f446f3d387dca2632683
DEBUG - 2026-03-07 06:04:02 --> [REQ_ID=6127190ee048] [REQUEST][END]
INFO - 2026-03-07 06:04:02 --> [REQ_ID=6127190ee048] [PERF] Execution time=0.058067
DEBUG - 2026-03-07 06:04:03 --> [REQ_ID=73d76695890d] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-07 06:04:03 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-07 06:04:03 --> [REQ_ID=73d76695890d] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-07 06:04:03 --> [REQ_ID=73d76695890d] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-07 06:04:03 --> [REQ_ID=73d76695890d] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-07 06:04:03 --> [CSRF] token name=csrf_test_name hash=49b957a70cbc51042f18f929e46019ea
DEBUG - 2026-03-07 06:04:03 --> [REQ_ID=600cc31ebc25] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-07 06:04:03 --> [REQ_ID=600cc31ebc25] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-07 06:04:03 --> [REQ_ID=73d76695890d] [FILTER_AFTER]
DEBUG - 2026-03-07 06:04:03 --> [REQ_ID=73d76695890d] [LIFECYCLE][END] status=200 duration_ms=107.55 memory_delta=0
INFO - 2026-03-07 06:04:03 --> [REQ_ID=600cc31ebc25] [PERF] Execution time=0.107313
DEBUG - 2026-03-07 06:04:03 --> [REQ_ID=73d76695890d] [REQUEST][END]
INFO - 2026-03-07 06:04:03 --> [REQ_ID=73d76695890d] [PERF] Execution time=0.119100
DEBUG - 2026-03-07 06:06:18 --> [REQ_ID=919e07a7b038] [REQUEST][START] HEAD /
DEBUG - 2026-03-07 06:06:18 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-07 06:06:18 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-07 06:06:19 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-07 06:06:19 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-07 06:06:19 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-07 06:10:26 --> [REQ_ID=3545fb5f0ce0] [REQUEST][START] GET /
DEBUG - 2026-03-07 06:10:26 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-07 06:10:26 --> [REQ_ID=3545fb5f0ce0] [FILTER_BEFORE] /
DEBUG - 2026-03-07 06:10:26 --> [REQ_ID=3545fb5f0ce0] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-07 06:10:26 --> [REQ_ID=3545fb5f0ce0] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-07 06:10:26 --> [CSRF] token name=csrf_test_name hash=09d7273902a84e93e50560492205821f
DEBUG - 2026-03-07 06:10:26 --> [REQ_ID=4f17b2a76c79] [INIT] App\Controllers\Home::GET
INFO - 2026-03-07 06:10:26 --> [REQ_ID=4f17b2a76c79] [MEMORY][controller-start] 6291456
INFO - 2026-03-07 06:10:27 --> [REQ_ID=4f17b2a76c79] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-07 06:10:27 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-07 06:10:27 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-03-07 06:10:27 --> [REQ_ID=4f17b2a76c79] [VIEW_RENDER] themes/public/home
INFO - 2026-03-07 06:10:27 --> [REQ_ID=4f17b2a76c79] [MEMORY][commonData:start] 10485760
INFO - 2026-03-07 06:10:27 --> themesMemory usage: 10485760
DEBUG - 2026-03-07 06:10:27 --> [MetaService] slug= pageName=Home cacheHit= path=DB
DEBUG - 2026-03-07 06:10:27 --> [REQ_ID=3545fb5f0ce0] [FILTER_AFTER]
DEBUG - 2026-03-07 06:10:27 --> [REQ_ID=3545fb5f0ce0] [LIFECYCLE][END] status=200 duration_ms=858.93 memory_delta=4194304
INFO - 2026-03-07 06:10:27 --> [REQ_ID=4f17b2a76c79] [PERF] Execution time=0.857327
DEBUG - 2026-03-07 06:10:27 --> [REQ_ID=3545fb5f0ce0] [REQUEST][END]
INFO - 2026-03-07 06:10:27 --> [REQ_ID=3545fb5f0ce0] [PERF] Execution time=0.899640
DEBUG - 2026-03-07 06:11:18 --> [REQ_ID=a09d09280562] [REQUEST][START] HEAD /
DEBUG - 2026-03-07 06:11:18 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-07 06:11:18 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-07 06:11:18 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-07 06:11:18 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-07 06:11:18 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-07 06:11:49 --> [REQ_ID=ede74d643fd2] [REQUEST][START] GET /
DEBUG - 2026-03-07 06:11:49 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-07 06:11:49 --> [REQ_ID=ede74d643fd2] [FILTER_BEFORE] /
DEBUG - 2026-03-07 06:11:49 --> [REQ_ID=ede74d643fd2] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-07 06:11:49 --> [REQ_ID=ede74d643fd2] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-07 06:11:49 --> [CSRF] token name=csrf_test_name hash=09efb6c31419a5a9bce42d354cc51571
DEBUG - 2026-03-07 06:11:49 --> [REQ_ID=a3de5da76d4e] [INIT] App\Controllers\Home::GET
INFO - 2026-03-07 06:11:49 --> [REQ_ID=a3de5da76d4e] [MEMORY][controller-start] 4194304
INFO - 2026-03-07 06:11:49 --> [REQ_ID=a3de5da76d4e] [MEMORY][commonData:start] 4194304
DEBUG - 2026-03-07 06:11:49 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-07 06:11:49 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
DEBUG - 2026-03-07 06:11:49 --> [REQ_ID=a3de5da76d4e] [VIEW_RENDER] themes/public/home
INFO - 2026-03-07 06:11:49 --> [REQ_ID=a3de5da76d4e] [MEMORY][commonData:start] 8388608
INFO - 2026-03-07 06:11:49 --> themesMemory usage: 8388608
DEBUG - 2026-03-07 06:11:49 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-07 06:11:49 --> [REQ_ID=ede74d643fd2] [FILTER_AFTER]
DEBUG - 2026-03-07 06:11:49 --> [REQ_ID=ede74d643fd2] [LIFECYCLE][END] status=200 duration_ms=536.18 memory_delta=4194304
INFO - 2026-03-07 06:11:49 --> [REQ_ID=a3de5da76d4e] [PERF] Execution time=0.535841
DEBUG - 2026-03-07 06:11:49 --> [REQ_ID=ede74d643fd2] [REQUEST][END]
INFO - 2026-03-07 06:11:49 --> [REQ_ID=ede74d643fd2] [PERF] Execution time=0.545925
INFO - 2026-03-07 06:15:02 --> [spark:ops:work] Started
INFO - 2026-03-07 06:15:02 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-03-07 06:15:02 --> [SPARK_MEMORY] 16777216
INFO - 2026-03-07 06:15:02 --> [spark:ops:work] Intent
INFO - 2026-03-07 06:15:02 --> [spark:ops:work] Completed
INFO - 2026-03-07 06:15:02 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.041404
INFO - 2026-03-07 06:15:02 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-03-07 06:15:02 --> [REQ_ID=7288ec75abff] [REQUEST][START] GET /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-07 06:15:02 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-07 06:15:02 --> [REQ_ID=7288ec75abff] [FILTER_BEFORE] /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-07 06:15:02 --> [REQ_ID=7288ec75abff] [ROUTE] Controller=\App\Modules\APIs\Controllers\AlertsAPIController Method=fetchEmailAlerts
DEBUG - 2026-03-07 06:15:02 --> [REQ_ID=7288ec75abff] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-07 06:15:02 --> [REQ_ID=7288ec75abff] [REQUEST][END]
INFO - 2026-03-07 06:15:02 --> [REQ_ID=7288ec75abff] [PERF] Execution time=0.062788
DEBUG - 2026-03-07 06:16:18 --> [REQ_ID=362a6e1e0666] [REQUEST][START] HEAD /
DEBUG - 2026-03-07 06:16:18 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-07 06:16:18 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-07 06:16:19 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-07 06:16:19 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-07 06:16:19 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-07 06:17:31 --> [REQ_ID=2b0220bff3b5] [REQUEST][START] GET /index.php/How-It-Works/Investment-Portfolio-Management
DEBUG - 2026-03-07 06:17:31 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-07 06:17:31 --> [REQ_ID=2b0220bff3b5] [FILTER_BEFORE] /index.php/How-It-Works/Investment-Portfolio-Management
DEBUG - 2026-03-07 06:17:31 --> [REQ_ID=2b0220bff3b5] [ROUTE] Controller=\App\Modules\Blog\Controllers\HowItWorksController Method=show
DEBUG - 2026-03-07 06:17:31 --> [REQ_ID=2b0220bff3b5] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/How-It-Works/Investment-Portfolio-Management
DEBUG - 2026-03-07 06:17:31 --> [CSRF] token name=csrf_test_name hash=98658ced2f4b6bc454cc92dd06203280
DEBUG - 2026-03-07 06:17:31 --> [REQ_ID=2cad0dd35164] [INIT] App\Modules\Blog\Controllers\HowItWorksController::GET
INFO - 2026-03-07 06:17:31 --> [REQ_ID=2cad0dd35164] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-07 06:17:32 --> [REQ_ID=2cad0dd35164] [METHOD_ENTRY] show
DEBUG - 2026-03-07 06:17:32 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-07 06:17:32 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-07 06:17:32 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-07 06:17:32 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-07 06:17:32 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-07 06:17:32 --> MyMICoin: guest context detected; skipping user-specific preload.
ERROR - 2026-03-07 06:17:32 --> [ERROR_PAGE] event=error_404 status=404 message=Page not found.
DEBUG - 2026-03-07 06:17:32 --> [REQ_ID=2b0220bff3b5] [FILTER_AFTER]
DEBUG - 2026-03-07 06:17:32 --> [REQ_ID=2b0220bff3b5] [LIFECYCLE][END] status=404 duration_ms=173.45 memory_delta=0
INFO - 2026-03-07 06:17:32 --> [REQ_ID=2cad0dd35164] [PERF] Execution time=0.171016
DEBUG - 2026-03-07 06:17:32 --> [REQ_ID=2b0220bff3b5] [REQUEST][END]
INFO - 2026-03-07 06:17:32 --> [REQ_ID=2b0220bff3b5] [PERF] Execution time=0.199435
DEBUG - 2026-03-07 06:21:18 --> [REQ_ID=15846336ddbc] [REQUEST][START] HEAD /
DEBUG - 2026-03-07 06:21:18 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-07 06:21:18 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-07 06:21:18 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-07 06:21:18 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-07 06:21:18 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-07 06:26:18 --> [REQ_ID=bcdb79e5bb6b] [REQUEST][START] HEAD /
DEBUG - 2026-03-07 06:26:18 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-07 06:26:18 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-07 06:26:19 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-07 06:26:19 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-07 06:26:19 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-07 06:29:19 --> [REQ_ID=5cc50a66b180] [REQUEST][START] GET /index.php/How-It-Works/Investment-Dashboard
DEBUG - 2026-03-07 06:29:19 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-07 06:29:19 --> [REQ_ID=5cc50a66b180] [FILTER_BEFORE] /index.php/How-It-Works/Investment-Dashboard
DEBUG - 2026-03-07 06:29:19 --> [REQ_ID=5cc50a66b180] [ROUTE] Controller=\App\Modules\Blog\Controllers\HowItWorksController Method=show
DEBUG - 2026-03-07 06:29:19 --> [REQ_ID=5cc50a66b180] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/How-It-Works/Investment-Dashboard
DEBUG - 2026-03-07 06:29:19 --> [CSRF] token name=csrf_test_name hash=572c46f9b0d1883707661d67dae926bc
DEBUG - 2026-03-07 06:29:19 --> [REQ_ID=07e11e503815] [INIT] App\Modules\Blog\Controllers\HowItWorksController::GET
INFO - 2026-03-07 06:29:19 --> [REQ_ID=07e11e503815] [MEMORY][controller-start] 6291456
DEBUG - 2026-03-07 06:29:19 --> [REQ_ID=07e11e503815] [METHOD_ENTRY] show
DEBUG - 2026-03-07 06:29:19 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-07 06:29:19 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-07 06:29:19 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-07 06:29:19 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-07 06:29:19 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-07 06:29:19 --> MyMICoin: guest context detected; skipping user-specific preload.
INFO - 2026-03-07 06:29:19 --> [REQ_ID=07e11e503815] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-07 06:29:19 --> [REQ_ID=07e11e503815] [VIEW_RENDER] App\Modules\Blog\Views\HowItWorks\Investment_Portfolio_Management
INFO - 2026-03-07 06:29:19 --> [REQ_ID=07e11e503815] [MEMORY][commonData:start] 10485760
INFO - 2026-03-07 06:29:20 --> themesMemory usage: 14680064
DEBUG - 2026-03-07 06:29:20 --> [REQ_ID=5cc50a66b180] [FILTER_AFTER]
DEBUG - 2026-03-07 06:29:20 --> [REQ_ID=5cc50a66b180] [LIFECYCLE][END] status=200 duration_ms=1,105.40 memory_delta=8388608
INFO - 2026-03-07 06:29:20 --> [REQ_ID=07e11e503815] [PERF] Execution time=1.103563
DEBUG - 2026-03-07 06:29:20 --> [REQ_ID=5cc50a66b180] [REQUEST][END]
INFO - 2026-03-07 06:29:20 --> [REQ_ID=5cc50a66b180] [PERF] Execution time=1.151692
INFO - 2026-03-07 06:30:01 --> [spark:ops:work] Started
INFO - 2026-03-07 06:30:01 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-03-07 06:30:01 --> [SPARK_MEMORY] 16777216
INFO - 2026-03-07 06:30:01 --> [spark:ops:work] Intent
INFO - 2026-03-07 06:30:01 --> [spark:ops:work] Completed
INFO - 2026-03-07 06:30:01 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.141548
INFO - 2026-03-07 06:30:01 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-03-07 06:31:18 --> [REQ_ID=1530c187eb7d] [REQUEST][START] HEAD /
DEBUG - 2026-03-07 06:31:18 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-07 06:31:18 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-07 06:31:18 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-07 06:31:18 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-07 06:31:19 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-07 06:33:41 --> [REQ_ID=d617f558d3f8] [REQUEST][START] GET /index.php/Features/Brokerage-Integration
DEBUG - 2026-03-07 06:33:41 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-07 06:33:41 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: GET, Route: Features/Brokerage-Integration]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-07 06:33:41 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-07 06:33:41 --> [404] URI=https://www.mymiwallet.com/index.php/Features/Brokerage-Integration
WARNING - 2026-03-07 06:33:41 --> 404 route miss: https://www.mymiwallet.com/index.php/Features/Brokerage-Integration | referrer: none
DEBUG - 2026-03-07 06:36:18 --> [REQ_ID=fb2af134e696] [REQUEST][START] HEAD /
DEBUG - 2026-03-07 06:36:18 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-07 06:36:18 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-07 06:36:19 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-07 06:36:19 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-07 06:36:19 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-07 06:40:44 --> [REQ_ID=7ed328ef3b76] [REQUEST][START] GET /index.php/Management/Assets
DEBUG - 2026-03-07 06:40:44 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-07 06:40:45 --> [REQ_ID=7ed328ef3b76] [FILTER_BEFORE] /index.php/Management/Assets
DEBUG - 2026-03-07 06:40:45 --> [REQ_ID=7ed328ef3b76] [ROUTE] Controller=\App\Modules\Management\Controllers\AssetsAdminController Method=index
DEBUG - 2026-03-07 06:40:45 --> [REQ_ID=7ed328ef3b76] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Management/Assets
DEBUG - 2026-03-07 06:40:45 --> [CSRF] token name=csrf_test_name hash=20ba57398e35f80c1347d7156ba2e921
DEBUG - 2026-03-07 06:40:45 --> [REQ_ID=7ed328ef3b76] [REQUEST][END]
INFO - 2026-03-07 06:40:45 --> [REQ_ID=7ed328ef3b76] [PERF] Execution time=0.052642
DEBUG - 2026-03-07 06:40:45 --> [REQ_ID=fcc4e9c2b451] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-07 06:40:45 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-07 06:40:45 --> [REQ_ID=fcc4e9c2b451] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-07 06:40:45 --> [REQ_ID=fcc4e9c2b451] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-07 06:40:45 --> [REQ_ID=fcc4e9c2b451] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-07 06:40:45 --> [CSRF] token name=csrf_test_name hash=efe7206c0068cc73f73adda691e5d6b7
DEBUG - 2026-03-07 06:40:45 --> [REQ_ID=e546e0d66c89] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-07 06:40:45 --> [REQ_ID=e546e0d66c89] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-07 06:40:45 --> [REQ_ID=fcc4e9c2b451] [FILTER_AFTER]
DEBUG - 2026-03-07 06:40:45 --> [REQ_ID=fcc4e9c2b451] [LIFECYCLE][END] status=200 duration_ms=58.79 memory_delta=0
INFO - 2026-03-07 06:40:45 --> [REQ_ID=e546e0d66c89] [PERF] Execution time=0.057943
DEBUG - 2026-03-07 06:40:45 --> [REQ_ID=fcc4e9c2b451] [REQUEST][END]
INFO - 2026-03-07 06:40:45 --> [REQ_ID=fcc4e9c2b451] [PERF] Execution time=0.072103
DEBUG - 2026-03-07 06:41:18 --> [REQ_ID=e3dc0cc3dee7] [REQUEST][START] HEAD /
DEBUG - 2026-03-07 06:41:18 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-07 06:41:18 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-07 06:41:18 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-07 06:41:18 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-07 06:41:18 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-07 06:43:58 --> [REQ_ID=aa2f9139e2ec] [REQUEST][START] GET /index.php/Investments
DEBUG - 2026-03-07 06:43:58 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-07 06:43:58 --> [REQ_ID=aa2f9139e2ec] [FILTER_BEFORE] /index.php/Investments
DEBUG - 2026-03-07 06:43:58 --> [REQ_ID=aa2f9139e2ec] [ROUTE] Controller=\App\Modules\User\Controllers\InvestmentsController Method=index
DEBUG - 2026-03-07 06:43:58 --> [REQ_ID=aa2f9139e2ec] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Investments
DEBUG - 2026-03-07 06:43:58 --> [CSRF] token name=csrf_test_name hash=894d38324f5b333a8140344a85c235c7
DEBUG - 2026-03-07 06:43:58 --> [REQ_ID=aa2f9139e2ec] [REQUEST][END]
INFO - 2026-03-07 06:43:58 --> [REQ_ID=aa2f9139e2ec] [PERF] Execution time=0.056726
DEBUG - 2026-03-07 06:43:58 --> [REQ_ID=ec7148ea8602] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-07 06:43:58 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-07 06:43:58 --> [REQ_ID=ec7148ea8602] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-07 06:43:58 --> [REQ_ID=ec7148ea8602] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-07 06:43:58 --> [REQ_ID=ec7148ea8602] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-07 06:43:58 --> [CSRF] token name=csrf_test_name hash=b6dbc871b3ed21cc82968cf933c29956
DEBUG - 2026-03-07 06:43:58 --> [REQ_ID=eace946632c7] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-07 06:43:58 --> [REQ_ID=eace946632c7] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-07 06:43:58 --> [REQ_ID=ec7148ea8602] [FILTER_AFTER]
DEBUG - 2026-03-07 06:43:58 --> [REQ_ID=ec7148ea8602] [LIFECYCLE][END] status=200 duration_ms=156.62 memory_delta=0
INFO - 2026-03-07 06:43:58 --> [REQ_ID=eace946632c7] [PERF] Execution time=0.156330
DEBUG - 2026-03-07 06:43:58 --> [REQ_ID=ec7148ea8602] [REQUEST][END]
INFO - 2026-03-07 06:43:58 --> [REQ_ID=ec7148ea8602] [PERF] Execution time=0.169345
INFO - 2026-03-07 06:45:01 --> [spark:ops:work] Started
INFO - 2026-03-07 06:45:01 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-03-07 06:45:01 --> [SPARK_MEMORY] 16777216
INFO - 2026-03-07 06:45:01 --> [spark:ops:work] Intent
INFO - 2026-03-07 06:45:02 --> [spark:ops:work] Completed
INFO - 2026-03-07 06:45:02 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.154480
INFO - 2026-03-07 06:45:02 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-03-07 06:46:18 --> [REQ_ID=41c98ac3fc64] [REQUEST][START] HEAD /
DEBUG - 2026-03-07 06:46:18 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-07 06:46:18 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-07 06:46:18 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-07 06:46:19 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-07 06:46:19 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-07 06:48:56 --> [REQ_ID=223d803ea067] [REQUEST][START] GET /index.php/How-It-Works/marketing
DEBUG - 2026-03-07 06:48:56 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-07 06:48:56 --> [REQ_ID=223d803ea067] [FILTER_BEFORE] /index.php/How-It-Works/marketing
DEBUG - 2026-03-07 06:48:56 --> [REQ_ID=223d803ea067] [ROUTE] Controller=\App\Modules\Blog\Controllers\HowItWorksController Method=show
DEBUG - 2026-03-07 06:48:56 --> [REQ_ID=223d803ea067] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/How-It-Works/marketing
DEBUG - 2026-03-07 06:48:56 --> [CSRF] token name=csrf_test_name hash=56c8817f81cd202f9bad9b93c9b7825d
DEBUG - 2026-03-07 06:48:56 --> [REQ_ID=34d578dffca8] [INIT] App\Modules\Blog\Controllers\HowItWorksController::GET
INFO - 2026-03-07 06:48:56 --> [REQ_ID=34d578dffca8] [MEMORY][controller-start] 6291456
DEBUG - 2026-03-07 06:48:57 --> [REQ_ID=34d578dffca8] [METHOD_ENTRY] show
DEBUG - 2026-03-07 06:48:57 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-07 06:48:57 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-07 06:48:57 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-07 06:48:57 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-07 06:48:57 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-07 06:48:57 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-07 06:48:57 --> [REQ_ID=34d578dffca8] [VIEW_RENDER] App\Modules\Blog\Views\HowItWorks\index
INFO - 2026-03-07 06:48:57 --> [REQ_ID=34d578dffca8] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-07 06:48:57 --> [MetaService] slug=how-it-works/marketing pageName= cacheHit= path=DB
INFO - 2026-03-07 06:48:57 --> themesMemory usage: 10485760
DEBUG - 2026-03-07 06:48:57 --> [MetaService] slug=how-it-works/marketing pageName= cacheHit=1 path=CACHE
DEBUG - 2026-03-07 06:48:57 --> [REQ_ID=223d803ea067] [FILTER_AFTER]
DEBUG - 2026-03-07 06:48:57 --> [REQ_ID=223d803ea067] [LIFECYCLE][END] status=200 duration_ms=1,030.79 memory_delta=4194304
INFO - 2026-03-07 06:48:57 --> [REQ_ID=34d578dffca8] [PERF] Execution time=1.028463
DEBUG - 2026-03-07 06:48:57 --> [REQ_ID=223d803ea067] [REQUEST][END]
INFO - 2026-03-07 06:48:57 --> [REQ_ID=223d803ea067] [PERF] Execution time=1.072331
DEBUG - 2026-03-07 06:49:01 --> [REQ_ID=387f9eae4c5c] [REQUEST][START] GET /index.php/How-It-Works/account-settings
DEBUG - 2026-03-07 06:49:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-07 06:49:01 --> [REQ_ID=387f9eae4c5c] [FILTER_BEFORE] /index.php/How-It-Works/account-settings
DEBUG - 2026-03-07 06:49:01 --> [REQ_ID=387f9eae4c5c] [ROUTE] Controller=\App\Modules\Blog\Controllers\HowItWorksController Method=show
DEBUG - 2026-03-07 06:49:01 --> [REQ_ID=387f9eae4c5c] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/How-It-Works/account-settings
DEBUG - 2026-03-07 06:49:01 --> [CSRF] token name=csrf_test_name hash=c0ab7e6411628136793aca4e92891b5e
DEBUG - 2026-03-07 06:49:01 --> [REQ_ID=d27763982eab] [INIT] App\Modules\Blog\Controllers\HowItWorksController::GET
INFO - 2026-03-07 06:49:01 --> [REQ_ID=d27763982eab] [MEMORY][controller-start] 6291456
DEBUG - 2026-03-07 06:49:01 --> [REQ_ID=d27763982eab] [METHOD_ENTRY] show
DEBUG - 2026-03-07 06:49:01 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-07 06:49:01 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-07 06:49:01 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-07 06:49:01 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-07 06:49:01 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-07 06:49:01 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-07 06:49:01 --> [REQ_ID=d27763982eab] [VIEW_RENDER] App\Modules\Blog\Views\HowItWorks\index
INFO - 2026-03-07 06:49:01 --> [REQ_ID=d27763982eab] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-07 06:49:02 --> [MetaService] slug=how-it-works/account-settings pageName= cacheHit= path=DB
INFO - 2026-03-07 06:49:02 --> themesMemory usage: 8388608
DEBUG - 2026-03-07 06:49:02 --> [MetaService] slug=how-it-works/account-settings pageName= cacheHit=1 path=CACHE
DEBUG - 2026-03-07 06:49:02 --> [REQ_ID=387f9eae4c5c] [FILTER_AFTER]
DEBUG - 2026-03-07 06:49:02 --> [REQ_ID=387f9eae4c5c] [LIFECYCLE][END] status=200 duration_ms=516.89 memory_delta=2097152
INFO - 2026-03-07 06:49:02 --> [REQ_ID=d27763982eab] [PERF] Execution time=0.516239
DEBUG - 2026-03-07 06:49:02 --> [REQ_ID=387f9eae4c5c] [REQUEST][END]
INFO - 2026-03-07 06:49:02 --> [REQ_ID=387f9eae4c5c] [PERF] Execution time=0.527255
DEBUG - 2026-03-07 06:51:18 --> [REQ_ID=f75c42d981bb] [REQUEST][START] HEAD /
DEBUG - 2026-03-07 06:51:18 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-07 06:51:18 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-07 06:51:18 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-07 06:51:18 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-07 06:51:18 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-07 06:56:18 --> [REQ_ID=ce58e9e7287a] [REQUEST][START] HEAD /
DEBUG - 2026-03-07 06:56:18 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-07 06:56:18 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-07 06:56:19 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-07 06:56:19 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-07 06:56:19 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
INFO - 2026-03-07 07:00:01 --> [spark:ops:work] Started
INFO - 2026-03-07 07:00:01 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-03-07 07:00:01 --> [SPARK_MEMORY] 16777216
INFO - 2026-03-07 07:00:01 --> [spark:ops:work] Intent
DEBUG - 2026-03-07 07:00:01 --> [REQ_ID=75e3eb3ee1ab] [REQUEST][START] GET /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-07 07:00:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-07 07:00:01 --> [REQ_ID=75e3eb3ee1ab] [FILTER_BEFORE] /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-07 07:00:01 --> [REQ_ID=75e3eb3ee1ab] [ROUTE] Controller=\App\Modules\Management\Controllers\ManagementAPIController Method=Run_CRON_Tasks
DEBUG - 2026-03-07 07:00:01 --> [REQ_ID=75e3eb3ee1ab] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-07 07:00:01 --> [REQ_ID=75e3eb3ee1ab] [REQUEST][END]
INFO - 2026-03-07 07:00:01 --> [REQ_ID=75e3eb3ee1ab] [PERF] Execution time=0.049833
INFO - 2026-03-07 07:00:01 --> [spark:ops:work] Completed
INFO - 2026-03-07 07:00:01 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.161821
INFO - 2026-03-07 07:00:01 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-03-07 07:01:18 --> [REQ_ID=a9f9488740ef] [REQUEST][START] HEAD /
DEBUG - 2026-03-07 07:01:18 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-07 07:01:18 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-07 07:01:19 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-07 07:01:19 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-07 07:01:19 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-07 07:04:10 --> [REQ_ID=232c30cadb30] [REQUEST][START] GET /index.php/Account/Activity
DEBUG - 2026-03-07 07:04:10 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-07 07:04:10 --> [REQ_ID=232c30cadb30] [FILTER_BEFORE] /index.php/Account/Activity
DEBUG - 2026-03-07 07:04:10 --> [REQ_ID=232c30cadb30] [ROUTE] Controller=\App\Modules\User\Controllers\DashboardController Method=activity
DEBUG - 2026-03-07 07:04:10 --> [REQ_ID=232c30cadb30] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Account/Activity
DEBUG - 2026-03-07 07:04:10 --> [CSRF] token name=csrf_test_name hash=a1e623d4ee1fb6423e6353fdb51b78a2
DEBUG - 2026-03-07 07:04:10 --> [REQ_ID=232c30cadb30] [REQUEST][END]
INFO - 2026-03-07 07:04:10 --> [REQ_ID=232c30cadb30] [PERF] Execution time=0.055037
DEBUG - 2026-03-07 07:04:10 --> [REQ_ID=f55aa8f66814] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-07 07:04:10 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-07 07:04:10 --> [REQ_ID=f55aa8f66814] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-07 07:04:10 --> [REQ_ID=f55aa8f66814] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-07 07:04:10 --> [REQ_ID=f55aa8f66814] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-07 07:04:10 --> [CSRF] token name=csrf_test_name hash=e99554f3ba88e4e7ff9b2feea16b1fe5
DEBUG - 2026-03-07 07:04:10 --> [REQ_ID=5378f9f0209e] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-07 07:04:10 --> [REQ_ID=5378f9f0209e] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-07 07:04:10 --> [REQ_ID=f55aa8f66814] [FILTER_AFTER]
DEBUG - 2026-03-07 07:04:10 --> [REQ_ID=f55aa8f66814] [LIFECYCLE][END] status=200 duration_ms=161.73 memory_delta=0
INFO - 2026-03-07 07:04:10 --> [REQ_ID=5378f9f0209e] [PERF] Execution time=0.161511
DEBUG - 2026-03-07 07:04:10 --> [REQ_ID=f55aa8f66814] [REQUEST][END]
INFO - 2026-03-07 07:04:10 --> [REQ_ID=f55aa8f66814] [PERF] Execution time=0.173068
DEBUG - 2026-03-07 07:06:18 --> [REQ_ID=4aafeb0749e3] [REQUEST][START] HEAD /
DEBUG - 2026-03-07 07:06:18 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-07 07:06:18 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-07 07:06:19 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-07 07:06:19 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-07 07:06:19 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-07 07:08:21 --> [REQ_ID=eaa94a26abaa] [REQUEST][START] GET /
DEBUG - 2026-03-07 07:08:21 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-07 07:08:21 --> [REQ_ID=eaa94a26abaa] [FILTER_BEFORE] /
DEBUG - 2026-03-07 07:08:21 --> [REQ_ID=eaa94a26abaa] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-07 07:08:21 --> [REQ_ID=eaa94a26abaa] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-07 07:08:21 --> [CSRF] token name=csrf_test_name hash=3c87ef56eb31c0d752efde29ae458503
DEBUG - 2026-03-07 07:08:21 --> [REQ_ID=490585ec06dc] [INIT] App\Controllers\Home::GET
INFO - 2026-03-07 07:08:21 --> [REQ_ID=490585ec06dc] [MEMORY][controller-start] 6291456
INFO - 2026-03-07 07:08:21 --> [REQ_ID=490585ec06dc] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-07 07:08:21 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-07 07:08:22 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-03-07 07:08:22 --> [REQ_ID=490585ec06dc] [VIEW_RENDER] themes/public/home
INFO - 2026-03-07 07:08:22 --> [REQ_ID=490585ec06dc] [MEMORY][commonData:start] 10485760
INFO - 2026-03-07 07:08:22 --> themesMemory usage: 10485760
DEBUG - 2026-03-07 07:08:22 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-07 07:08:22 --> [REQ_ID=eaa94a26abaa] [FILTER_AFTER]
DEBUG - 2026-03-07 07:08:22 --> [REQ_ID=eaa94a26abaa] [LIFECYCLE][END] status=200 duration_ms=938.65 memory_delta=4194304
INFO - 2026-03-07 07:08:22 --> [REQ_ID=490585ec06dc] [PERF] Execution time=0.936308
DEBUG - 2026-03-07 07:08:22 --> [REQ_ID=eaa94a26abaa] [REQUEST][END]
INFO - 2026-03-07 07:08:22 --> [REQ_ID=eaa94a26abaa] [PERF] Execution time=0.976908
DEBUG - 2026-03-07 07:11:18 --> [REQ_ID=40b4c05bcf6f] [REQUEST][START] HEAD /
DEBUG - 2026-03-07 07:11:18 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-07 07:11:18 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-07 07:11:19 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-07 07:11:19 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-07 07:11:19 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
INFO - 2026-03-07 07:15:01 --> [spark:ops:work] Started
INFO - 2026-03-07 07:15:01 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-03-07 07:15:01 --> [SPARK_MEMORY] 16777216
INFO - 2026-03-07 07:15:01 --> [spark:ops:work] Intent
INFO - 2026-03-07 07:15:01 --> [spark:ops:work] Completed
INFO - 2026-03-07 07:15:01 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.118181
INFO - 2026-03-07 07:15:01 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-03-07 07:15:01 --> [REQ_ID=34c2cdbbebea] [REQUEST][START] GET /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-07 07:15:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-07 07:15:01 --> [REQ_ID=34c2cdbbebea] [FILTER_BEFORE] /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-07 07:15:01 --> [REQ_ID=34c2cdbbebea] [ROUTE] Controller=\App\Modules\APIs\Controllers\AlertsAPIController Method=fetchEmailAlerts
DEBUG - 2026-03-07 07:15:01 --> [REQ_ID=34c2cdbbebea] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-07 07:15:01 --> [REQ_ID=34c2cdbbebea] [REQUEST][END]
INFO - 2026-03-07 07:15:01 --> [REQ_ID=34c2cdbbebea] [PERF] Execution time=0.055574
DEBUG - 2026-03-07 07:16:18 --> [REQ_ID=b1ac6274608f] [REQUEST][START] HEAD /
DEBUG - 2026-03-07 07:16:18 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-07 07:16:18 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-07 07:16:18 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-07 07:16:18 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-07 07:16:18 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-07 07:21:18 --> [REQ_ID=2142a79df687] [REQUEST][START] HEAD /
DEBUG - 2026-03-07 07:21:18 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-07 07:21:18 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-07 07:21:19 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-07 07:21:19 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-07 07:21:19 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-07 07:26:18 --> [REQ_ID=df3682580416] [REQUEST][START] HEAD /
DEBUG - 2026-03-07 07:26:18 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-07 07:26:18 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-07 07:26:18 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-07 07:26:18 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-07 07:26:18 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
INFO - 2026-03-07 07:30:01 --> [spark:ops:work] Started
INFO - 2026-03-07 07:30:01 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-03-07 07:30:01 --> [SPARK_MEMORY] 16777216
INFO - 2026-03-07 07:30:01 --> [spark:ops:work] Intent
INFO - 2026-03-07 07:30:01 --> [spark:ops:work] Completed
INFO - 2026-03-07 07:30:01 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.108638
INFO - 2026-03-07 07:30:01 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-03-07 07:31:18 --> [REQ_ID=c8c956dda127] [REQUEST][START] HEAD /
DEBUG - 2026-03-07 07:31:18 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-07 07:31:18 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-07 07:31:18 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-07 07:31:18 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-07 07:31:19 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-07 07:34:34 --> [REQ_ID=f47fe833d936] [REQUEST][START] GET /index.php/Exchange
DEBUG - 2026-03-07 07:34:34 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-07 07:34:34 --> [REQ_ID=f47fe833d936] [FILTER_BEFORE] /index.php/Exchange
DEBUG - 2026-03-07 07:34:34 --> [REQ_ID=f47fe833d936] [ROUTE] Controller=\App\Modules\Exchange\Controllers\ExchangeController Method=index
DEBUG - 2026-03-07 07:34:34 --> [REQ_ID=f47fe833d936] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Exchange
DEBUG - 2026-03-07 07:34:34 --> [CSRF] token name=csrf_test_name hash=38e28c9d922ede554d8f807d1263cd12
DEBUG - 2026-03-07 07:34:34 --> [REQ_ID=f47fe833d936] [REQUEST][END]
INFO - 2026-03-07 07:34:34 --> [REQ_ID=f47fe833d936] [PERF] Execution time=0.054048
DEBUG - 2026-03-07 07:34:34 --> [REQ_ID=8bbe65e439f7] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-07 07:34:34 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-07 07:34:34 --> [REQ_ID=8bbe65e439f7] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-07 07:34:34 --> [REQ_ID=8bbe65e439f7] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-07 07:34:34 --> [REQ_ID=8bbe65e439f7] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-07 07:34:34 --> [CSRF] token name=csrf_test_name hash=5a1289dfadbf6fee4161ef7561a46c92
DEBUG - 2026-03-07 07:34:34 --> [REQ_ID=b6ac1cc06cf1] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-07 07:34:34 --> [REQ_ID=b6ac1cc06cf1] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-07 07:34:34 --> [REQ_ID=8bbe65e439f7] [FILTER_AFTER]
DEBUG - 2026-03-07 07:34:34 --> [REQ_ID=8bbe65e439f7] [LIFECYCLE][END] status=200 duration_ms=195.58 memory_delta=0
INFO - 2026-03-07 07:34:34 --> [REQ_ID=b6ac1cc06cf1] [PERF] Execution time=0.195371
DEBUG - 2026-03-07 07:34:34 --> [REQ_ID=8bbe65e439f7] [REQUEST][END]
INFO - 2026-03-07 07:34:34 --> [REQ_ID=8bbe65e439f7] [PERF] Execution time=0.207036
DEBUG - 2026-03-07 07:36:18 --> [REQ_ID=327ab6ba9d39] [REQUEST][START] GET /index.php/How-It-Works/MyMI-Gold
DEBUG - 2026-03-07 07:36:18 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-07 07:36:18 --> [REQ_ID=327ab6ba9d39] [FILTER_BEFORE] /index.php/How-It-Works/MyMI-Gold
DEBUG - 2026-03-07 07:36:18 --> [REQ_ID=327ab6ba9d39] [ROUTE] Controller=\App\Modules\Blog\Controllers\HowItWorksController Method=show
DEBUG - 2026-03-07 07:36:18 --> [REQ_ID=327ab6ba9d39] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/How-It-Works/MyMI-Gold
DEBUG - 2026-03-07 07:36:18 --> [CSRF] token name=csrf_test_name hash=6396d5573211949b8c2ae84a40ff6f11
DEBUG - 2026-03-07 07:36:18 --> [REQ_ID=ec1f57cdb891] [INIT] App\Modules\Blog\Controllers\HowItWorksController::GET
INFO - 2026-03-07 07:36:18 --> [REQ_ID=ec1f57cdb891] [MEMORY][controller-start] 6291456
DEBUG - 2026-03-07 07:36:18 --> [REQ_ID=ec1f57cdb891] [METHOD_ENTRY] show
DEBUG - 2026-03-07 07:36:18 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-07 07:36:18 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-07 07:36:18 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-07 07:36:18 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-07 07:36:18 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-07 07:36:18 --> MyMICoin: guest context detected; skipping user-specific preload.
INFO - 2026-03-07 07:36:18 --> [REQ_ID=ec1f57cdb891] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-07 07:36:19 --> [REQ_ID=ec1f57cdb891] [VIEW_RENDER] App\Modules\Blog\Views\HowItWorks\MyMI_Gold
INFO - 2026-03-07 07:36:19 --> [REQ_ID=ec1f57cdb891] [MEMORY][commonData:start] 10485760
INFO - 2026-03-07 07:36:19 --> themesMemory usage: 14680064
DEBUG - 2026-03-07 07:36:19 --> [REQ_ID=327ab6ba9d39] [FILTER_AFTER]
DEBUG - 2026-03-07 07:36:19 --> [REQ_ID=327ab6ba9d39] [LIFECYCLE][END] status=200 duration_ms=1,210.19 memory_delta=8388608
INFO - 2026-03-07 07:36:19 --> [REQ_ID=ec1f57cdb891] [PERF] Execution time=1.208144
DEBUG - 2026-03-07 07:36:19 --> [REQ_ID=327ab6ba9d39] [REQUEST][END]
INFO - 2026-03-07 07:36:19 --> [REQ_ID=327ab6ba9d39] [PERF] Execution time=1.252780
DEBUG - 2026-03-07 07:36:19 --> [REQ_ID=ab309da36739] [REQUEST][START] HEAD /
DEBUG - 2026-03-07 07:36:19 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-07 07:36:19 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-07 07:36:19 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-07 07:36:19 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-07 07:36:19 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-07 07:38:16 --> [REQ_ID=9f487e8aafd6] [REQUEST][START] GET /index.php/Support/Account
DEBUG - 2026-03-07 07:38:16 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-07 07:38:16 --> [REQ_ID=9f487e8aafd6] [FILTER_BEFORE] /index.php/Support/Account
DEBUG - 2026-03-07 07:38:16 --> [REQ_ID=9f487e8aafd6] [ROUTE] Controller=\App\Modules\Support\Controllers\AccountSupportController Method=index
DEBUG - 2026-03-07 07:38:16 --> [REQ_ID=9f487e8aafd6] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Support/Account
DEBUG - 2026-03-07 07:38:16 --> [CSRF] token name=csrf_test_name hash=b497313c91c0a1a74717887f14e3c7dc
DEBUG - 2026-03-07 07:38:16 --> [REQ_ID=1d8a08899ac3] [INIT] App\Modules\Support\Controllers\AccountSupportController::GET
INFO - 2026-03-07 07:38:16 --> [REQ_ID=1d8a08899ac3] [MEMORY][controller-start] 6291456
DEBUG - 2026-03-07 07:38:16 --> [REQ_ID=1d8a08899ac3] [METHOD_ENTRY] index
DEBUG - 2026-03-07 07:38:16 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-07 07:38:16 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-07 07:38:17 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-07 07:38:17 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-07 07:38:17 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-07 07:38:17 --> MyMICoin: guest context detected; skipping user-specific preload.
INFO - 2026-03-07 07:38:17 --> [REQ_ID=1d8a08899ac3] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-07 07:38:17 --> [REQ_ID=1d8a08899ac3] [VIEW_RENDER] SupportModule/Support/account_help
INFO - 2026-03-07 07:38:17 --> [REQ_ID=1d8a08899ac3] [MEMORY][commonData:start] 6291456
INFO - 2026-03-07 07:38:17 --> themesMemory usage: 6291456
DEBUG - 2026-03-07 07:38:17 --> [REQ_ID=9f487e8aafd6] [FILTER_AFTER]
DEBUG - 2026-03-07 07:38:17 --> [REQ_ID=9f487e8aafd6] [LIFECYCLE][END] status=200 duration_ms=101.99 memory_delta=0
INFO - 2026-03-07 07:38:17 --> [REQ_ID=1d8a08899ac3] [PERF] Execution time=0.099926
DEBUG - 2026-03-07 07:38:17 --> [REQ_ID=9f487e8aafd6] [REQUEST][END]
INFO - 2026-03-07 07:38:17 --> [REQ_ID=9f487e8aafd6] [PERF] Execution time=0.143074
DEBUG - 2026-03-07 07:39:58 --> [REQ_ID=25004a3d4db9] [REQUEST][START] GET /
DEBUG - 2026-03-07 07:39:58 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-07 07:39:58 --> [REQ_ID=25004a3d4db9] [FILTER_BEFORE] /
DEBUG - 2026-03-07 07:39:58 --> [REQ_ID=25004a3d4db9] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-07 07:39:58 --> [REQ_ID=25004a3d4db9] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-07 07:39:58 --> [CSRF] token name=csrf_test_name hash=9bbb13cb561df970bbc6e052b1160303
DEBUG - 2026-03-07 07:39:58 --> [REQ_ID=a176d27df0ba] [INIT] App\Controllers\Home::GET
INFO - 2026-03-07 07:39:58 --> [REQ_ID=a176d27df0ba] [MEMORY][controller-start] 6291456
INFO - 2026-03-07 07:39:58 --> [REQ_ID=a176d27df0ba] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-07 07:39:58 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-07 07:39:58 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-03-07 07:39:58 --> [REQ_ID=a176d27df0ba] [VIEW_RENDER] themes/public/home
INFO - 2026-03-07 07:39:58 --> [REQ_ID=a176d27df0ba] [MEMORY][commonData:start] 10485760
INFO - 2026-03-07 07:39:58 --> themesMemory usage: 10485760
DEBUG - 2026-03-07 07:39:58 --> [MetaService] slug= pageName=Home cacheHit= path=DB
DEBUG - 2026-03-07 07:39:58 --> [REQ_ID=25004a3d4db9] [FILTER_AFTER]
DEBUG - 2026-03-07 07:39:58 --> [REQ_ID=25004a3d4db9] [LIFECYCLE][END] status=200 duration_ms=624.91 memory_delta=4194304
INFO - 2026-03-07 07:39:58 --> [REQ_ID=a176d27df0ba] [PERF] Execution time=0.623063
DEBUG - 2026-03-07 07:39:58 --> [REQ_ID=25004a3d4db9] [REQUEST][END]
INFO - 2026-03-07 07:39:58 --> [REQ_ID=25004a3d4db9] [PERF] Execution time=0.664164
DEBUG - 2026-03-07 07:41:18 --> [REQ_ID=0b41e3696480] [REQUEST][START] HEAD /
DEBUG - 2026-03-07 07:41:18 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-07 07:41:18 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-07 07:41:19 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-07 07:41:19 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-07 07:41:19 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-07 07:42:35 --> [REQ_ID=2261aa2cef1d] [REQUEST][START] GET /
DEBUG - 2026-03-07 07:42:35 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-07 07:42:35 --> [REQ_ID=2261aa2cef1d] [FILTER_BEFORE] /
DEBUG - 2026-03-07 07:42:35 --> [REQ_ID=2261aa2cef1d] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-07 07:42:35 --> [REQ_ID=2261aa2cef1d] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-07 07:42:35 --> [CSRF] token name=csrf_test_name hash=e8b333926aeab9bac7de753b70dfb300
DEBUG - 2026-03-07 07:42:35 --> [REQ_ID=ac6b8603d587] [INIT] App\Controllers\Home::GET
INFO - 2026-03-07 07:42:35 --> [REQ_ID=ac6b8603d587] [MEMORY][controller-start] 4194304
INFO - 2026-03-07 07:42:35 --> [REQ_ID=ac6b8603d587] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-07 07:42:35 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-07 07:42:36 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
DEBUG - 2026-03-07 07:42:36 --> [REQ_ID=ac6b8603d587] [VIEW_RENDER] themes/public/home
INFO - 2026-03-07 07:42:36 --> [REQ_ID=ac6b8603d587] [MEMORY][commonData:start] 8388608
INFO - 2026-03-07 07:42:36 --> themesMemory usage: 8388608
DEBUG - 2026-03-07 07:42:36 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-07 07:42:36 --> [REQ_ID=2261aa2cef1d] [FILTER_AFTER]
DEBUG - 2026-03-07 07:42:36 --> [REQ_ID=2261aa2cef1d] [LIFECYCLE][END] status=200 duration_ms=640.97 memory_delta=4194304
INFO - 2026-03-07 07:42:36 --> [REQ_ID=ac6b8603d587] [PERF] Execution time=0.639035
DEBUG - 2026-03-07 07:42:36 --> [REQ_ID=2261aa2cef1d] [REQUEST][END]
INFO - 2026-03-07 07:42:36 --> [REQ_ID=2261aa2cef1d] [PERF] Execution time=0.659533
DEBUG - 2026-03-07 07:42:38 --> [REQ_ID=a66f7ba21b2b] [REQUEST][START] GET /
DEBUG - 2026-03-07 07:42:38 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-07 07:42:38 --> [REQ_ID=a66f7ba21b2b] [FILTER_BEFORE] /
DEBUG - 2026-03-07 07:42:38 --> [REQ_ID=a66f7ba21b2b] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-07 07:42:38 --> [REQ_ID=a66f7ba21b2b] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-07 07:42:38 --> [CSRF] token name=csrf_test_name hash=5ca10f440f6dfa73783c66913c65356c
DEBUG - 2026-03-07 07:42:38 --> [REQ_ID=6adbbe8d25c0] [INIT] App\Controllers\Home::GET
INFO - 2026-03-07 07:42:38 --> [REQ_ID=6adbbe8d25c0] [MEMORY][controller-start] 6291456
INFO - 2026-03-07 07:42:38 --> [REQ_ID=6adbbe8d25c0] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-07 07:42:38 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-07 07:42:39 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
DEBUG - 2026-03-07 07:42:39 --> [REQ_ID=6adbbe8d25c0] [VIEW_RENDER] themes/public/home
INFO - 2026-03-07 07:42:39 --> [REQ_ID=6adbbe8d25c0] [MEMORY][commonData:start] 8388608
INFO - 2026-03-07 07:42:39 --> themesMemory usage: 8388608
DEBUG - 2026-03-07 07:42:39 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-07 07:42:39 --> [REQ_ID=a66f7ba21b2b] [FILTER_AFTER]
DEBUG - 2026-03-07 07:42:39 --> [REQ_ID=a66f7ba21b2b] [LIFECYCLE][END] status=200 duration_ms=577.66 memory_delta=2097152
INFO - 2026-03-07 07:42:39 --> [REQ_ID=6adbbe8d25c0] [PERF] Execution time=0.577239
DEBUG - 2026-03-07 07:42:39 --> [REQ_ID=a66f7ba21b2b] [REQUEST][END]
INFO - 2026-03-07 07:42:39 --> [REQ_ID=a66f7ba21b2b] [PERF] Execution time=0.589818
DEBUG - 2026-03-07 07:42:46 --> [REQ_ID=7a90b45debca] [REQUEST][START] GET /
DEBUG - 2026-03-07 07:42:46 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-07 07:42:46 --> [REQ_ID=7a90b45debca] [FILTER_BEFORE] /
DEBUG - 2026-03-07 07:42:46 --> [REQ_ID=7a90b45debca] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-07 07:42:46 --> [REQ_ID=7a90b45debca] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-07 07:42:46 --> [CSRF] token name=csrf_test_name hash=027bead9c8be877ad468ac52c437d186
DEBUG - 2026-03-07 07:42:46 --> [REQ_ID=f373b22c0b3e] [INIT] App\Controllers\Home::GET
INFO - 2026-03-07 07:42:46 --> [REQ_ID=f373b22c0b3e] [MEMORY][controller-start] 6291456
INFO - 2026-03-07 07:42:46 --> [REQ_ID=f373b22c0b3e] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-07 07:42:46 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-07 07:42:46 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
DEBUG - 2026-03-07 07:42:46 --> [REQ_ID=f373b22c0b3e] [VIEW_RENDER] themes/public/home
INFO - 2026-03-07 07:42:46 --> [REQ_ID=f373b22c0b3e] [MEMORY][commonData:start] 8388608
INFO - 2026-03-07 07:42:46 --> themesMemory usage: 8388608
DEBUG - 2026-03-07 07:42:46 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-07 07:42:46 --> [REQ_ID=7a90b45debca] [FILTER_AFTER]
DEBUG - 2026-03-07 07:42:46 --> [REQ_ID=7a90b45debca] [LIFECYCLE][END] status=200 duration_ms=554.94 memory_delta=2097152
INFO - 2026-03-07 07:42:46 --> [REQ_ID=f373b22c0b3e] [PERF] Execution time=0.554662
DEBUG - 2026-03-07 07:42:46 --> [REQ_ID=7a90b45debca] [REQUEST][END]
INFO - 2026-03-07 07:42:46 --> [REQ_ID=7a90b45debca] [PERF] Execution time=0.564085
INFO - 2026-03-07 07:45:02 --> [spark:ops:work] Started
INFO - 2026-03-07 07:45:02 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-03-07 07:45:02 --> [SPARK_MEMORY] 16777216
INFO - 2026-03-07 07:45:02 --> [spark:ops:work] Intent
INFO - 2026-03-07 07:45:02 --> [spark:ops:work] Completed
INFO - 2026-03-07 07:45:02 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.180457
INFO - 2026-03-07 07:45:02 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-03-07 07:46:18 --> [REQ_ID=eeadf10c69f8] [REQUEST][START] HEAD /
DEBUG - 2026-03-07 07:46:18 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-07 07:46:18 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-07 07:46:18 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-07 07:46:18 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-07 07:46:18 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-07 07:51:18 --> [REQ_ID=b8135cdc2543] [REQUEST][START] HEAD /
DEBUG - 2026-03-07 07:51:18 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-07 07:51:18 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-07 07:51:19 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-07 07:51:19 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-07 07:51:19 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-07 07:52:47 --> [REQ_ID=ad569a4d1ebd] [REQUEST][START] GET /
DEBUG - 2026-03-07 07:52:47 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-07 07:52:47 --> [REQ_ID=ad569a4d1ebd] [FILTER_BEFORE] /
DEBUG - 2026-03-07 07:52:47 --> [REQ_ID=ad569a4d1ebd] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-07 07:52:47 --> [REQ_ID=ad569a4d1ebd] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-07 07:52:47 --> [CSRF] token name=csrf_test_name hash=7d4717e9a2833f68759e9bd1cb148981
DEBUG - 2026-03-07 07:52:47 --> [REQ_ID=60b193621d26] [INIT] App\Controllers\Home::GET
INFO - 2026-03-07 07:52:47 --> [REQ_ID=60b193621d26] [MEMORY][controller-start] 4194304
INFO - 2026-03-07 07:52:48 --> [REQ_ID=60b193621d26] [MEMORY][commonData:start] 4194304
DEBUG - 2026-03-07 07:52:48 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-07 07:52:48 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
DEBUG - 2026-03-07 07:52:48 --> [REQ_ID=60b193621d26] [VIEW_RENDER] themes/public/home
INFO - 2026-03-07 07:52:48 --> [REQ_ID=60b193621d26] [MEMORY][commonData:start] 8388608
INFO - 2026-03-07 07:52:48 --> themesMemory usage: 8388608
DEBUG - 2026-03-07 07:52:48 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-07 07:52:48 --> [REQ_ID=ad569a4d1ebd] [FILTER_AFTER]
DEBUG - 2026-03-07 07:52:48 --> [REQ_ID=ad569a4d1ebd] [LIFECYCLE][END] status=200 duration_ms=637.87 memory_delta=4194304
INFO - 2026-03-07 07:52:48 --> [REQ_ID=60b193621d26] [PERF] Execution time=0.635758
DEBUG - 2026-03-07 07:52:48 --> [REQ_ID=ad569a4d1ebd] [REQUEST][END]
INFO - 2026-03-07 07:52:48 --> [REQ_ID=ad569a4d1ebd] [PERF] Execution time=0.657044
DEBUG - 2026-03-07 07:56:09 --> [REQ_ID=b9f1adb84023] [REQUEST][START] GET /
DEBUG - 2026-03-07 07:56:09 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-07 07:56:09 --> [REQ_ID=b9f1adb84023] [FILTER_BEFORE] /
DEBUG - 2026-03-07 07:56:09 --> [REQ_ID=b9f1adb84023] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-07 07:56:09 --> [REQ_ID=b9f1adb84023] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-07 07:56:09 --> [CSRF] token name=csrf_test_name hash=e2da2671e5872ee470e48cbecd181ad8
DEBUG - 2026-03-07 07:56:09 --> [REQ_ID=ced7ebed1f0b] [INIT] App\Controllers\Home::GET
INFO - 2026-03-07 07:56:09 --> [REQ_ID=ced7ebed1f0b] [MEMORY][controller-start] 6291456
INFO - 2026-03-07 07:56:10 --> [REQ_ID=ced7ebed1f0b] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-07 07:56:10 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-07 07:56:10 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-03-07 07:56:10 --> [REQ_ID=ced7ebed1f0b] [VIEW_RENDER] themes/public/home
INFO - 2026-03-07 07:56:10 --> [REQ_ID=ced7ebed1f0b] [MEMORY][commonData:start] 10485760
INFO - 2026-03-07 07:56:10 --> themesMemory usage: 10485760
DEBUG - 2026-03-07 07:56:10 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-07 07:56:10 --> [REQ_ID=b9f1adb84023] [FILTER_AFTER]
DEBUG - 2026-03-07 07:56:10 --> [REQ_ID=b9f1adb84023] [LIFECYCLE][END] status=200 duration_ms=619.94 memory_delta=4194304
INFO - 2026-03-07 07:56:10 --> [REQ_ID=ced7ebed1f0b] [PERF] Execution time=0.617894
DEBUG - 2026-03-07 07:56:10 --> [REQ_ID=b9f1adb84023] [REQUEST][END]
INFO - 2026-03-07 07:56:10 --> [REQ_ID=b9f1adb84023] [PERF] Execution time=0.659204
DEBUG - 2026-03-07 07:56:15 --> [REQ_ID=9ec2aa870c38] [REQUEST][START] GET /index.php/register
DEBUG - 2026-03-07 07:56:15 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-07 07:56:15 --> [REQ_ID=9ec2aa870c38] [FILTER_BEFORE] /index.php/register
DEBUG - 2026-03-07 07:56:15 --> [REQ_ID=9ec2aa870c38] [ROUTE] Controller=\App\Controllers\AuthController Method=register
DEBUG - 2026-03-07 07:56:15 --> [REQ_ID=9ec2aa870c38] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/register
DEBUG - 2026-03-07 07:56:15 --> [CSRF] token name=csrf_test_name hash=28b7a87daf3630c97b9cc938d37c8df0
DEBUG - 2026-03-07 07:56:15 --> [REQ_ID=b8502425d0d6] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-07 07:56:15 --> [REQ_ID=b8502425d0d6] [MEMORY][controller-start] 6291456
INFO - 2026-03-07 07:56:15 --> [REGISTRATION] Form loaded
INFO - 2026-03-07 07:56:15 --> [REQ_ID=b8502425d0d6] [PERF] Execution time=0.019558
DEBUG - 2026-03-07 07:56:18 --> [REQ_ID=1bd310c55d3a] [REQUEST][START] HEAD /
DEBUG - 2026-03-07 07:56:18 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-07 07:56:18 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-07 07:56:18 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-07 07:56:18 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-07 07:56:18 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-07 07:57:35 --> [REQ_ID=eac4f2dcf354] [REQUEST][START] GET /
DEBUG - 2026-03-07 07:57:35 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-07 07:57:35 --> [REQ_ID=eac4f2dcf354] [FILTER_BEFORE] /
DEBUG - 2026-03-07 07:57:35 --> [REQ_ID=eac4f2dcf354] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-07 07:57:35 --> [REQ_ID=eac4f2dcf354] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-07 07:57:35 --> [CSRF] token name=csrf_test_name hash=f9164cd7e2dfd99c65bed72097b178e1
DEBUG - 2026-03-07 07:57:35 --> [REQ_ID=36bc10eba1f9] [INIT] App\Controllers\Home::GET
INFO - 2026-03-07 07:57:35 --> [REQ_ID=36bc10eba1f9] [MEMORY][controller-start] 6291456
INFO - 2026-03-07 07:57:35 --> [REQ_ID=36bc10eba1f9] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-07 07:57:35 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-07 07:57:35 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
DEBUG - 2026-03-07 07:57:35 --> [REQ_ID=36bc10eba1f9] [VIEW_RENDER] themes/public/home
INFO - 2026-03-07 07:57:35 --> [REQ_ID=36bc10eba1f9] [MEMORY][commonData:start] 10485760
INFO - 2026-03-07 07:57:35 --> themesMemory usage: 10485760
DEBUG - 2026-03-07 07:57:35 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-07 07:57:36 --> [REQ_ID=eac4f2dcf354] [FILTER_AFTER]
DEBUG - 2026-03-07 07:57:36 --> [REQ_ID=eac4f2dcf354] [LIFECYCLE][END] status=200 duration_ms=530.63 memory_delta=4194304
INFO - 2026-03-07 07:57:36 --> [REQ_ID=36bc10eba1f9] [PERF] Execution time=0.528618
DEBUG - 2026-03-07 07:57:36 --> [REQ_ID=eac4f2dcf354] [REQUEST][END]
INFO - 2026-03-07 07:57:36 --> [REQ_ID=eac4f2dcf354] [PERF] Execution time=0.569708
DEBUG - 2026-03-07 08:00:01 --> [REQ_ID=be3eb64e0b75] [REQUEST][START] GET /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-07 08:00:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
INFO - 2026-03-07 08:00:01 --> [SPARK_START] App\Commands\AIOps\Run
INFO - 2026-03-07 08:00:01 --> [SPARK_MEMORY] 16777216
INFO - 2026-03-07 08:00:01 --> [spark:aiops:run] Intent
DEBUG - 2026-03-07 08:00:01 --> [REQ_ID=be3eb64e0b75] [FILTER_BEFORE] /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-07 08:00:01 --> [REQ_ID=be3eb64e0b75] [ROUTE] Controller=\App\Modules\Management\Controllers\ManagementAPIController Method=Run_CRON_Tasks
DEBUG - 2026-03-07 08:00:01 --> [REQ_ID=be3eb64e0b75] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Management/Run-CRON-Tasks
INFO - 2026-03-07 08:00:01 --> [spark:ops:work] Started
INFO - 2026-03-07 08:00:01 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-03-07 08:00:01 --> [SPARK_MEMORY] 16777216
INFO - 2026-03-07 08:00:01 --> [spark:ops:work] Intent
DEBUG - 2026-03-07 08:00:01 --> [REQ_ID=be3eb64e0b75] [REQUEST][END]
INFO - 2026-03-07 08:00:01 --> [REQ_ID=be3eb64e0b75] [PERF] Execution time=0.099515
INFO - 2026-03-07 08:00:01 --> [spark:ops:work] Completed
INFO - 2026-03-07 08:00:01 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.044020
INFO - 2026-03-07 08:00:01 --> [SPARK_MEMORY] 18874368
INFO - 2026-03-07 08:00:03 --> [AIOPS][SPARK][GOVERNANCE][spark:logs:summarize] Started
INFO - 2026-03-07 08:00:03 --> [SPARK_START] App\Commands\Logs\Summarize
INFO - 2026-03-07 08:00:03 --> [SPARK_MEMORY] 16777216
INFO - 2026-03-07 08:00:03 --> [spark:logs:summarize] Intent
INFO - 2026-03-07 08:00:03 --> [AIOPS][SPARK][GOVERNANCE][spark:logs:summarize] Completed
INFO - 2026-03-07 08:00:03 --> [SPARK_COMPLETE] App\Commands\Logs\Summarize duration=0.010646
INFO - 2026-03-07 08:00:03 --> [SPARK_MEMORY] 18874368
INFO - 2026-03-07 08:00:03 --> [spark:app:healthcheck] Started
INFO - 2026-03-07 08:00:03 --> [SPARK_START] App\Commands\App\Healthcheck
INFO - 2026-03-07 08:00:03 --> [SPARK_MEMORY] 16777216
INFO - 2026-03-07 08:00:03 --> [spark:app:healthcheck] Intent
DEBUG - 2026-03-07 08:00:03 --> LOG_HEALTHCHECK debug marker=2b41e996850b
INFO - 2026-03-07 08:00:03 --> LOG_HEALTHCHECK info marker=2b41e996850b
NOTICE - 2026-03-07 08:00:03 --> LOG_HEALTHCHECK probe marker=2b41e996850b
INFO - 2026-03-07 08:00:03 --> [spark:app:healthcheck] Completed
INFO - 2026-03-07 08:00:03 --> [SPARK_COMPLETE] App\Commands\App\Healthcheck duration=0.081870
INFO - 2026-03-07 08:00:03 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-03-07 08:00:04 --> OllamaPatchRunner:L142 - validateGeneratedPatch Content: 
WARNING - 2026-03-07 08:00:04 --> OllamaPatchRunner:L49 - Original Diff: 
DEBUG - 2026-03-07 08:00:05 --> OllamaPatchRunner:L51 - Retried Diff: 
DEBUG - 2026-03-07 08:00:05 --> OllamaPatchRunner:L142 - validateGeneratedPatch Content: 
DEBUG - 2026-03-07 08:00:05 --> OllamaPatchRunner:L53 - Validating Generated Patch Failed
INFO - 2026-03-07 08:00:05 --> [SPARK_COMPLETE] App\Commands\AIOps\Run duration=3.745438
INFO - 2026-03-07 08:00:05 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-03-07 08:01:18 --> [REQ_ID=7b7a70a0535a] [REQUEST][START] HEAD /
DEBUG - 2026-03-07 08:01:18 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-07 08:01:18 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-07 08:01:18 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-07 08:01:18 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-07 08:01:18 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-07 08:06:18 --> [REQ_ID=08393dff0ff4] [REQUEST][START] HEAD /
DEBUG - 2026-03-07 08:06:18 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-07 08:06:18 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-07 08:06:19 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-07 08:06:19 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-07 08:06:19 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-07 08:11:18 --> [REQ_ID=bbc46e7f05a0] [REQUEST][START] HEAD /
DEBUG - 2026-03-07 08:11:18 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-07 08:11:18 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-07 08:11:18 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-07 08:11:18 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-07 08:11:18 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
INFO - 2026-03-07 08:15:01 --> [spark:ops:work] Started
INFO - 2026-03-07 08:15:01 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-03-07 08:15:01 --> [SPARK_MEMORY] 16777216
INFO - 2026-03-07 08:15:01 --> [spark:ops:work] Intent
DEBUG - 2026-03-07 08:15:01 --> [REQ_ID=f9974bdd983c] [REQUEST][START] GET /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-07 08:15:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-07 08:15:01 --> [REQ_ID=f9974bdd983c] [FILTER_BEFORE] /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-07 08:15:01 --> [REQ_ID=f9974bdd983c] [ROUTE] Controller=\App\Modules\APIs\Controllers\AlertsAPIController Method=fetchEmailAlerts
DEBUG - 2026-03-07 08:15:01 --> [REQ_ID=f9974bdd983c] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-07 08:15:01 --> [REQ_ID=f9974bdd983c] [REQUEST][END]
INFO - 2026-03-07 08:15:01 --> [REQ_ID=f9974bdd983c] [PERF] Execution time=0.059858
INFO - 2026-03-07 08:15:01 --> [spark:ops:work] Completed
INFO - 2026-03-07 08:15:01 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.152687
INFO - 2026-03-07 08:15:01 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-03-07 08:16:03 --> [REQ_ID=28c5d3acbd2b] [REQUEST][START] GET /index.php/How-It-Works
DEBUG - 2026-03-07 08:16:03 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-07 08:16:03 --> [REQ_ID=28c5d3acbd2b] [FILTER_BEFORE] /index.php/How-It-Works
DEBUG - 2026-03-07 08:16:03 --> [REQ_ID=28c5d3acbd2b] [ROUTE] Controller=\App\Modules\Blog\Controllers\HowItWorksController Method=index
DEBUG - 2026-03-07 08:16:03 --> [REQ_ID=28c5d3acbd2b] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/How-It-Works
DEBUG - 2026-03-07 08:16:03 --> [CSRF] token name=csrf_test_name hash=688458439fcb6bfe0b2d96d641770132
DEBUG - 2026-03-07 08:16:03 --> [REQ_ID=4934d03fd3db] [INIT] App\Modules\Blog\Controllers\HowItWorksController::GET
INFO - 2026-03-07 08:16:03 --> [REQ_ID=4934d03fd3db] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-07 08:16:03 --> [REQ_ID=4934d03fd3db] [METHOD_ENTRY] index
DEBUG - 2026-03-07 08:16:03 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-07 08:16:03 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-07 08:16:03 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-07 08:16:03 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-07 08:16:03 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-07 08:16:03 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-07 08:16:03 --> [REQ_ID=4934d03fd3db] [VIEW_RENDER] App\Modules\Blog\Views\HowItWorks\index
INFO - 2026-03-07 08:16:03 --> [REQ_ID=4934d03fd3db] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-07 08:16:03 --> [MetaService] slug=how-it-works pageName= cacheHit= path=DB
INFO - 2026-03-07 08:16:03 --> themesMemory usage: 8388608
DEBUG - 2026-03-07 08:16:03 --> [MetaService] slug=how-it-works pageName= cacheHit=1 path=CACHE
DEBUG - 2026-03-07 08:16:03 --> [REQ_ID=28c5d3acbd2b] [FILTER_AFTER]
DEBUG - 2026-03-07 08:16:03 --> [REQ_ID=28c5d3acbd2b] [LIFECYCLE][END] status=200 duration_ms=687.56 memory_delta=4194304
INFO - 2026-03-07 08:16:03 --> [REQ_ID=4934d03fd3db] [PERF] Execution time=0.686155
DEBUG - 2026-03-07 08:16:03 --> [REQ_ID=28c5d3acbd2b] [REQUEST][END]
INFO - 2026-03-07 08:16:03 --> [REQ_ID=28c5d3acbd2b] [PERF] Execution time=0.706033
DEBUG - 2026-03-07 08:16:18 --> [REQ_ID=bf030763d85c] [REQUEST][START] HEAD /
DEBUG - 2026-03-07 08:16:18 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-07 08:16:18 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-07 08:16:18 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-07 08:16:18 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-07 08:16:18 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-07 08:18:50 --> [REQ_ID=2bb12814-f4ec-4799-b267-2f47920925ac] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-07 08:18:50 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-07 08:18:50 --> [REQ_ID=2bb12814-f4ec-4799-b267-2f47920925ac] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-07 08:18:50 --> [REQ_ID=2bb12814-f4ec-4799-b267-2f47920925ac] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-07 08:18:50 --> [REQ_ID=2bb12814-f4ec-4799-b267-2f47920925ac] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-07 08:18:50 --> [CSRF] token name=csrf_test_name hash=9d7284c649935c8b5b00a90ceea696b1
DEBUG - 2026-03-07 08:18:50 --> [REQ_ID=6d1781ecf3c4] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-07 08:18:50 --> [REQ_ID=6d1781ecf3c4] [MEMORY][controller-start] 6291456
DEBUG - 2026-03-07 08:18:51 --> [REQ_ID=2bb12814-f4ec-4799-b267-2f47920925ac] [FILTER_AFTER]
DEBUG - 2026-03-07 08:18:51 --> [REQ_ID=2bb12814-f4ec-4799-b267-2f47920925ac] [LIFECYCLE][END] status=200 duration_ms=246.94 memory_delta=0
INFO - 2026-03-07 08:18:51 --> [REQ_ID=6d1781ecf3c4] [PERF] Execution time=0.244261
DEBUG - 2026-03-07 08:18:51 --> [REQ_ID=2bb12814-f4ec-4799-b267-2f47920925ac] [REQUEST][END]
INFO - 2026-03-07 08:18:51 --> [REQ_ID=2bb12814-f4ec-4799-b267-2f47920925ac] [PERF] Execution time=0.287188
DEBUG - 2026-03-07 08:21:18 --> [REQ_ID=171d751c9a46] [REQUEST][START] HEAD /
DEBUG - 2026-03-07 08:21:18 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-07 08:21:18 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-07 08:21:19 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-07 08:21:19 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-07 08:21:19 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-07 08:26:18 --> [REQ_ID=ded11e39be00] [REQUEST][START] HEAD /
DEBUG - 2026-03-07 08:26:18 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-07 08:26:18 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-07 08:26:19 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-07 08:26:19 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-07 08:26:19 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
INFO - 2026-03-07 08:30:01 --> [spark:ops:work] Started
INFO - 2026-03-07 08:30:01 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-03-07 08:30:01 --> [SPARK_MEMORY] 16777216
INFO - 2026-03-07 08:30:01 --> [spark:ops:work] Intent
INFO - 2026-03-07 08:30:01 --> [spark:ops:work] Completed
INFO - 2026-03-07 08:30:01 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.021952
INFO - 2026-03-07 08:30:01 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-03-07 08:31:10 --> [REQ_ID=24889db154c2] [REQUEST][START] GET /index.php/Management/Marketing/Promote/Solana
DEBUG - 2026-03-07 08:31:10 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-07 08:31:10 --> [REQ_ID=24889db154c2] [FILTER_BEFORE] /index.php/Management/Marketing/Promote/Solana
DEBUG - 2026-03-07 08:31:10 --> [REQ_ID=24889db154c2] [ROUTE] Controller=\App\Modules\Management\Controllers\MarketingAdminController Method=promote
DEBUG - 2026-03-07 08:31:10 --> [REQ_ID=24889db154c2] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Management/Marketing/Promote/Solana
DEBUG - 2026-03-07 08:31:10 --> [CSRF] token name=csrf_test_name hash=7b680c3557582dff2ff499eef0d64aab
DEBUG - 2026-03-07 08:31:10 --> [REQ_ID=24889db154c2] [REQUEST][END]
INFO - 2026-03-07 08:31:10 --> [REQ_ID=24889db154c2] [PERF] Execution time=0.060330
DEBUG - 2026-03-07 08:31:10 --> [REQ_ID=cad1d684df15] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-07 08:31:10 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-07 08:31:10 --> [REQ_ID=cad1d684df15] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-07 08:31:10 --> [REQ_ID=cad1d684df15] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-07 08:31:10 --> [REQ_ID=cad1d684df15] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-07 08:31:10 --> [CSRF] token name=csrf_test_name hash=3476433105e076a8722df3ccf9f273b0
DEBUG - 2026-03-07 08:31:10 --> [REQ_ID=a2b333043c84] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-07 08:31:10 --> [REQ_ID=a2b333043c84] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-07 08:31:10 --> [REQ_ID=cad1d684df15] [FILTER_AFTER]
DEBUG - 2026-03-07 08:31:10 --> [REQ_ID=cad1d684df15] [LIFECYCLE][END] status=200 duration_ms=52.30 memory_delta=0
INFO - 2026-03-07 08:31:10 --> [REQ_ID=a2b333043c84] [PERF] Execution time=0.052292
DEBUG - 2026-03-07 08:31:10 --> [REQ_ID=cad1d684df15] [REQUEST][END]
INFO - 2026-03-07 08:31:10 --> [REQ_ID=cad1d684df15] [PERF] Execution time=0.064161
DEBUG - 2026-03-07 08:31:18 --> [REQ_ID=8d501884de61] [REQUEST][START] HEAD /
DEBUG - 2026-03-07 08:31:18 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-07 08:31:18 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-07 08:31:18 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-07 08:31:18 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-07 08:31:18 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-07 08:36:18 --> [REQ_ID=78d60fa0e652] [REQUEST][START] HEAD /
DEBUG - 2026-03-07 08:36:18 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-07 08:36:18 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-07 08:36:18 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-07 08:36:18 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-07 08:36:18 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-07 08:41:18 --> [REQ_ID=94e442c2c4a8] [REQUEST][START] HEAD /
DEBUG - 2026-03-07 08:41:18 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-07 08:41:18 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-07 08:41:19 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-07 08:41:19 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-07 08:41:19 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-07 08:43:27 --> [REQ_ID=add5b21c76ed] [REQUEST][START] GET /
DEBUG - 2026-03-07 08:43:27 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-07 08:43:27 --> [REQ_ID=add5b21c76ed] [FILTER_BEFORE] /
DEBUG - 2026-03-07 08:43:27 --> [REQ_ID=add5b21c76ed] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-07 08:43:27 --> [REQ_ID=add5b21c76ed] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-07 08:43:27 --> [CSRF] token name=csrf_test_name hash=f06eb34bd650b1bbf3b6a083452f42a7
DEBUG - 2026-03-07 08:43:27 --> [REQ_ID=9d8e15ca1ae9] [INIT] App\Controllers\Home::GET
INFO - 2026-03-07 08:43:27 --> [REQ_ID=9d8e15ca1ae9] [MEMORY][controller-start] 6291456
INFO - 2026-03-07 08:43:27 --> [REQ_ID=9d8e15ca1ae9] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-07 08:43:27 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-07 08:43:28 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-03-07 08:43:28 --> [REQ_ID=9d8e15ca1ae9] [VIEW_RENDER] themes/public/home
INFO - 2026-03-07 08:43:28 --> [REQ_ID=9d8e15ca1ae9] [MEMORY][commonData:start] 10485760
INFO - 2026-03-07 08:43:28 --> themesMemory usage: 10485760
DEBUG - 2026-03-07 08:43:28 --> [MetaService] slug= pageName=Home cacheHit= path=DB
DEBUG - 2026-03-07 08:43:28 --> [REQ_ID=add5b21c76ed] [FILTER_AFTER]
DEBUG - 2026-03-07 08:43:28 --> [REQ_ID=add5b21c76ed] [LIFECYCLE][END] status=200 duration_ms=821.31 memory_delta=4194304
INFO - 2026-03-07 08:43:28 --> [REQ_ID=9d8e15ca1ae9] [PERF] Execution time=0.819337
DEBUG - 2026-03-07 08:43:28 --> [REQ_ID=add5b21c76ed] [REQUEST][END]
INFO - 2026-03-07 08:43:28 --> [REQ_ID=add5b21c76ed] [PERF] Execution time=0.861823
INFO - 2026-03-07 08:45:02 --> [spark:ops:work] Started
INFO - 2026-03-07 08:45:02 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-03-07 08:45:02 --> [SPARK_MEMORY] 16777216
INFO - 2026-03-07 08:45:02 --> [spark:ops:work] Intent
INFO - 2026-03-07 08:45:02 --> [spark:ops:work] Completed
INFO - 2026-03-07 08:45:02 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.203432
INFO - 2026-03-07 08:45:02 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-03-07 08:46:18 --> [REQ_ID=2a34a95b902c] [REQUEST][START] HEAD /
DEBUG - 2026-03-07 08:46:18 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-07 08:46:18 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-07 08:46:18 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-07 08:46:18 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-07 08:46:18 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-07 08:51:18 --> [REQ_ID=6d3e30dc748e] [REQUEST][START] HEAD /
DEBUG - 2026-03-07 08:51:18 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-07 08:51:18 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-07 08:51:18 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-07 08:51:18 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-07 08:51:18 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-07 08:56:18 --> [REQ_ID=56b96bb52cf7] [REQUEST][START] HEAD /
DEBUG - 2026-03-07 08:56:18 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-07 08:56:18 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-07 08:56:19 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-07 08:56:19 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-07 08:56:19 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
INFO - 2026-03-07 09:00:01 --> [spark:ops:work] Started
INFO - 2026-03-07 09:00:01 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-03-07 09:00:01 --> [SPARK_MEMORY] 16777216
INFO - 2026-03-07 09:00:01 --> [spark:ops:work] Intent
DEBUG - 2026-03-07 09:00:01 --> [REQ_ID=df525983bd18] [REQUEST][START] GET /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-07 09:00:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-07 09:00:01 --> [REQ_ID=df525983bd18] [FILTER_BEFORE] /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-07 09:00:01 --> [REQ_ID=df525983bd18] [ROUTE] Controller=\App\Modules\Management\Controllers\ManagementAPIController Method=Run_CRON_Tasks
DEBUG - 2026-03-07 09:00:01 --> [REQ_ID=df525983bd18] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-07 09:00:01 --> [REQ_ID=df525983bd18] [REQUEST][END]
INFO - 2026-03-07 09:00:01 --> [REQ_ID=df525983bd18] [PERF] Execution time=0.051843
INFO - 2026-03-07 09:00:01 --> [spark:ops:work] Completed
INFO - 2026-03-07 09:00:01 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.100963
INFO - 2026-03-07 09:00:01 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-03-07 09:01:18 --> [REQ_ID=00f8431d31db] [REQUEST][START] HEAD /
DEBUG - 2026-03-07 09:01:18 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-07 09:01:18 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-07 09:01:18 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-07 09:01:18 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-07 09:01:18 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-07 09:06:02 --> [REQ_ID=7f0ed21507ba] [REQUEST][START] GET /index.php/Free/register
DEBUG - 2026-03-07 09:06:02 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-07 09:06:02 --> [REQ_ID=7f0ed21507ba] [FILTER_BEFORE] /index.php/Free/register
DEBUG - 2026-03-07 09:06:02 --> [REQ_ID=7f0ed21507ba] [ROUTE] Controller=\App\Controllers\AuthController Method=register
DEBUG - 2026-03-07 09:06:02 --> [REQ_ID=7f0ed21507ba] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Free/register
DEBUG - 2026-03-07 09:06:02 --> [CSRF] token name=csrf_test_name hash=4a85bbbcbc00cdffab718379eb15a63f
DEBUG - 2026-03-07 09:06:02 --> [REQ_ID=7f0ed21507ba] [REQUEST][END]
INFO - 2026-03-07 09:06:02 --> [REQ_ID=7f0ed21507ba] [PERF] Execution time=0.053881
DEBUG - 2026-03-07 09:06:04 --> [REQ_ID=bc833d5a8030] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-07 09:06:04 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-07 09:06:04 --> [REQ_ID=bc833d5a8030] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-07 09:06:04 --> [REQ_ID=bc833d5a8030] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-07 09:06:04 --> [REQ_ID=bc833d5a8030] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-07 09:06:04 --> [CSRF] token name=csrf_test_name hash=2cfde640f0901d4eb634f39388d3ec4c
DEBUG - 2026-03-07 09:06:04 --> [REQ_ID=0252c9313ec3] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-07 09:06:04 --> [REQ_ID=0252c9313ec3] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-07 09:06:04 --> [REQ_ID=bc833d5a8030] [FILTER_AFTER]
DEBUG - 2026-03-07 09:06:04 --> [REQ_ID=bc833d5a8030] [LIFECYCLE][END] status=200 duration_ms=157.18 memory_delta=0
INFO - 2026-03-07 09:06:04 --> [REQ_ID=0252c9313ec3] [PERF] Execution time=0.156551
DEBUG - 2026-03-07 09:06:04 --> [REQ_ID=bc833d5a8030] [REQUEST][END]
INFO - 2026-03-07 09:06:04 --> [REQ_ID=bc833d5a8030] [PERF] Execution time=0.166851
DEBUG - 2026-03-07 09:06:18 --> [REQ_ID=7e34a95f6935] [REQUEST][START] HEAD /
DEBUG - 2026-03-07 09:06:18 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-07 09:06:18 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-07 09:06:18 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-07 09:06:18 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-07 09:06:18 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-07 09:09:41 --> [REQ_ID=bf65e4f0fc22] [REQUEST][START] GET /
DEBUG - 2026-03-07 09:09:41 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-07 09:09:41 --> [REQ_ID=bf65e4f0fc22] [FILTER_BEFORE] /
DEBUG - 2026-03-07 09:09:41 --> [REQ_ID=bf65e4f0fc22] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-07 09:09:41 --> [REQ_ID=bf65e4f0fc22] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-07 09:09:41 --> [CSRF] token name=csrf_test_name hash=5abfef4872bddc1b4eec8504a849dc24
DEBUG - 2026-03-07 09:09:41 --> [REQ_ID=ae9e610202a6] [INIT] App\Controllers\Home::GET
INFO - 2026-03-07 09:09:41 --> [REQ_ID=ae9e610202a6] [MEMORY][controller-start] 6291456
INFO - 2026-03-07 09:09:42 --> [REQ_ID=ae9e610202a6] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-07 09:09:42 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-07 09:09:42 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-03-07 09:09:42 --> [REQ_ID=ae9e610202a6] [VIEW_RENDER] themes/public/home
INFO - 2026-03-07 09:09:42 --> [REQ_ID=ae9e610202a6] [MEMORY][commonData:start] 10485760
INFO - 2026-03-07 09:09:42 --> themesMemory usage: 10485760
DEBUG - 2026-03-07 09:09:42 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-07 09:09:42 --> [REQ_ID=bf65e4f0fc22] [FILTER_AFTER]
DEBUG - 2026-03-07 09:09:42 --> [REQ_ID=bf65e4f0fc22] [LIFECYCLE][END] status=200 duration_ms=825.22 memory_delta=4194304
INFO - 2026-03-07 09:09:42 --> [REQ_ID=ae9e610202a6] [PERF] Execution time=0.823260
DEBUG - 2026-03-07 09:09:42 --> [REQ_ID=bf65e4f0fc22] [REQUEST][END]
INFO - 2026-03-07 09:09:42 --> [REQ_ID=bf65e4f0fc22] [PERF] Execution time=0.863201
DEBUG - 2026-03-07 09:11:18 --> [REQ_ID=5b5d86d3c25f] [REQUEST][START] HEAD /
DEBUG - 2026-03-07 09:11:18 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-07 09:11:18 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-07 09:11:18 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-07 09:11:18 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-07 09:11:18 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
INFO - 2026-03-07 09:15:01 --> [spark:ops:work] Started
INFO - 2026-03-07 09:15:01 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-03-07 09:15:01 --> [SPARK_MEMORY] 16777216
INFO - 2026-03-07 09:15:01 --> [spark:ops:work] Intent
INFO - 2026-03-07 09:15:01 --> [spark:ops:work] Completed
INFO - 2026-03-07 09:15:01 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.047261
INFO - 2026-03-07 09:15:01 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-03-07 09:15:01 --> [REQ_ID=2621eaeef0b8] [REQUEST][START] GET /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-07 09:15:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-07 09:15:01 --> [REQ_ID=2621eaeef0b8] [FILTER_BEFORE] /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-07 09:15:01 --> [REQ_ID=2621eaeef0b8] [ROUTE] Controller=\App\Modules\APIs\Controllers\AlertsAPIController Method=fetchEmailAlerts
DEBUG - 2026-03-07 09:15:01 --> [REQ_ID=2621eaeef0b8] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-07 09:15:01 --> [REQ_ID=2621eaeef0b8] [REQUEST][END]
INFO - 2026-03-07 09:15:01 --> [REQ_ID=2621eaeef0b8] [PERF] Execution time=0.061560
DEBUG - 2026-03-07 09:16:18 --> [REQ_ID=d3a4f5ba2ae8] [REQUEST][START] HEAD /
DEBUG - 2026-03-07 09:16:18 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-07 09:16:18 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-07 09:16:19 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-07 09:16:19 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-07 09:16:19 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-07 09:21:18 --> [REQ_ID=5fb9a8d79a18] [REQUEST][START] HEAD /
DEBUG - 2026-03-07 09:21:18 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-07 09:21:18 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-07 09:21:18 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-07 09:21:18 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-07 09:21:18 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-07 09:26:18 --> [REQ_ID=7691498c9270] [REQUEST][START] HEAD /
DEBUG - 2026-03-07 09:26:18 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-07 09:26:18 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-07 09:26:18 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-07 09:26:18 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-07 09:26:18 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
INFO - 2026-03-07 09:30:01 --> [spark:ops:work] Started
INFO - 2026-03-07 09:30:01 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-03-07 09:30:01 --> [SPARK_MEMORY] 16777216
INFO - 2026-03-07 09:30:01 --> [spark:ops:work] Intent
INFO - 2026-03-07 09:30:01 --> [spark:ops:work] Completed
INFO - 2026-03-07 09:30:01 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.020265
INFO - 2026-03-07 09:30:01 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-03-07 09:31:18 --> [REQ_ID=07e6716ccc37] [REQUEST][START] HEAD /
DEBUG - 2026-03-07 09:31:18 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-07 09:31:18 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-07 09:31:18 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-07 09:31:18 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-07 09:31:18 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-07 09:36:18 --> [REQ_ID=b1eccc48e30c] [REQUEST][START] HEAD /
DEBUG - 2026-03-07 09:36:18 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-07 09:36:18 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-07 09:36:19 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-07 09:36:19 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-07 09:36:19 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-07 09:40:30 --> [REQ_ID=7177954bd899] [REQUEST][START] GET /index.php/Support/Account
DEBUG - 2026-03-07 09:40:30 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-07 09:40:30 --> [REQ_ID=7177954bd899] [FILTER_BEFORE] /index.php/Support/Account
DEBUG - 2026-03-07 09:40:30 --> [REQ_ID=7177954bd899] [ROUTE] Controller=\App\Modules\Support\Controllers\AccountSupportController Method=index
DEBUG - 2026-03-07 09:40:30 --> [REQ_ID=7177954bd899] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Support/Account
DEBUG - 2026-03-07 09:40:30 --> [CSRF] token name=csrf_test_name hash=2986bb9bc44dc7cb510e2d4aa5883807
DEBUG - 2026-03-07 09:40:30 --> [REQ_ID=88121b9219ac] [INIT] App\Modules\Support\Controllers\AccountSupportController::GET
INFO - 2026-03-07 09:40:30 --> [REQ_ID=88121b9219ac] [MEMORY][controller-start] 6291456
DEBUG - 2026-03-07 09:40:30 --> [REQ_ID=88121b9219ac] [METHOD_ENTRY] index
DEBUG - 2026-03-07 09:40:30 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-07 09:40:30 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-07 09:40:30 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-07 09:40:30 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-07 09:40:30 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-07 09:40:30 --> MyMICoin: guest context detected; skipping user-specific preload.
INFO - 2026-03-07 09:40:30 --> [REQ_ID=88121b9219ac] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-07 09:40:30 --> [REQ_ID=88121b9219ac] [VIEW_RENDER] SupportModule/Support/account_help
INFO - 2026-03-07 09:40:30 --> [REQ_ID=88121b9219ac] [MEMORY][commonData:start] 6291456
INFO - 2026-03-07 09:40:30 --> themesMemory usage: 6291456
DEBUG - 2026-03-07 09:40:30 --> [REQ_ID=7177954bd899] [FILTER_AFTER]
DEBUG - 2026-03-07 09:40:30 --> [REQ_ID=7177954bd899] [LIFECYCLE][END] status=200 duration_ms=108.86 memory_delta=0
INFO - 2026-03-07 09:40:30 --> [REQ_ID=88121b9219ac] [PERF] Execution time=0.106364
DEBUG - 2026-03-07 09:40:30 --> [REQ_ID=7177954bd899] [REQUEST][END]
INFO - 2026-03-07 09:40:30 --> [REQ_ID=7177954bd899] [PERF] Execution time=0.149912
DEBUG - 2026-03-07 09:41:18 --> [REQ_ID=4d071804646c] [REQUEST][START] HEAD /
DEBUG - 2026-03-07 09:41:18 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-07 09:41:18 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-07 09:41:18 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-07 09:41:18 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-07 09:41:18 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
INFO - 2026-03-07 09:45:01 --> [spark:ops:work] Started
INFO - 2026-03-07 09:45:01 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-03-07 09:45:01 --> [SPARK_MEMORY] 16777216
INFO - 2026-03-07 09:45:01 --> [spark:ops:work] Intent
INFO - 2026-03-07 09:45:02 --> [spark:ops:work] Completed
INFO - 2026-03-07 09:45:02 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.196423
INFO - 2026-03-07 09:45:02 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-03-07 09:46:18 --> [REQ_ID=f0ac94b7f6ad] [REQUEST][START] HEAD /
DEBUG - 2026-03-07 09:46:18 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-07 09:46:18 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-07 09:46:18 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-07 09:46:18 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-07 09:46:18 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-07 09:51:18 --> [REQ_ID=ea6f2b569271] [REQUEST][START] HEAD /
DEBUG - 2026-03-07 09:51:18 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-07 09:51:18 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-07 09:51:18 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-07 09:51:18 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-07 09:51:18 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-07 09:56:18 --> [REQ_ID=4e377b92d203] [REQUEST][START] HEAD /
DEBUG - 2026-03-07 09:56:18 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-07 09:56:18 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-07 09:56:18 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-07 09:56:18 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-07 09:56:18 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
INFO - 2026-03-07 10:00:01 --> [SPARK_START] App\Commands\AIOps\Run
INFO - 2026-03-07 10:00:01 --> [SPARK_MEMORY] 16777216
INFO - 2026-03-07 10:00:01 --> [spark:aiops:run] Intent
INFO - 2026-03-07 10:00:01 --> [spark:ops:work] Started
INFO - 2026-03-07 10:00:01 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-03-07 10:00:01 --> [SPARK_MEMORY] 16777216
INFO - 2026-03-07 10:00:01 --> [spark:ops:work] Intent
DEBUG - 2026-03-07 10:00:01 --> [REQ_ID=bd9122f7d39d] [REQUEST][START] GET /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-07 10:00:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-07 10:00:01 --> [REQ_ID=bd9122f7d39d] [FILTER_BEFORE] /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-07 10:00:01 --> [REQ_ID=bd9122f7d39d] [ROUTE] Controller=\App\Modules\Management\Controllers\ManagementAPIController Method=Run_CRON_Tasks
DEBUG - 2026-03-07 10:00:01 --> [REQ_ID=bd9122f7d39d] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Management/Run-CRON-Tasks
INFO - 2026-03-07 10:00:01 --> [spark:ops:work] Completed
INFO - 2026-03-07 10:00:01 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.109748
INFO - 2026-03-07 10:00:01 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-03-07 10:00:01 --> [REQ_ID=bd9122f7d39d] [REQUEST][END]
INFO - 2026-03-07 10:00:01 --> [REQ_ID=bd9122f7d39d] [PERF] Execution time=0.074966
INFO - 2026-03-07 10:00:02 --> [AIOPS][SPARK][GOVERNANCE][spark:logs:summarize] Started
INFO - 2026-03-07 10:00:02 --> [SPARK_START] App\Commands\Logs\Summarize
INFO - 2026-03-07 10:00:02 --> [SPARK_MEMORY] 16777216
INFO - 2026-03-07 10:00:02 --> [spark:logs:summarize] Intent
INFO - 2026-03-07 10:00:02 --> [AIOPS][SPARK][GOVERNANCE][spark:logs:summarize] Completed
INFO - 2026-03-07 10:00:02 --> [SPARK_COMPLETE] App\Commands\Logs\Summarize duration=0.012053
INFO - 2026-03-07 10:00:02 --> [SPARK_MEMORY] 18874368
INFO - 2026-03-07 10:00:03 --> [spark:app:healthcheck] Started
INFO - 2026-03-07 10:00:03 --> [SPARK_START] App\Commands\App\Healthcheck
INFO - 2026-03-07 10:00:03 --> [SPARK_MEMORY] 16777216
INFO - 2026-03-07 10:00:03 --> [spark:app:healthcheck] Intent
DEBUG - 2026-03-07 10:00:03 --> LOG_HEALTHCHECK debug marker=f9d87935635b
INFO - 2026-03-07 10:00:03 --> LOG_HEALTHCHECK info marker=f9d87935635b
NOTICE - 2026-03-07 10:00:03 --> LOG_HEALTHCHECK probe marker=f9d87935635b
INFO - 2026-03-07 10:00:03 --> [spark:app:healthcheck] Completed
INFO - 2026-03-07 10:00:03 --> [SPARK_COMPLETE] App\Commands\App\Healthcheck duration=0.026757
INFO - 2026-03-07 10:00:03 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-03-07 10:00:04 --> OllamaPatchRunner:L142 - validateGeneratedPatch Content: 
WARNING - 2026-03-07 10:00:04 --> OllamaPatchRunner:L49 - Original Diff: 
DEBUG - 2026-03-07 10:00:05 --> OllamaPatchRunner:L51 - Retried Diff: 
DEBUG - 2026-03-07 10:00:05 --> OllamaPatchRunner:L142 - validateGeneratedPatch Content: 
DEBUG - 2026-03-07 10:00:05 --> OllamaPatchRunner:L53 - Validating Generated Patch Failed
INFO - 2026-03-07 10:00:05 --> [SPARK_COMPLETE] App\Commands\AIOps\Run duration=3.556850
INFO - 2026-03-07 10:00:05 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-03-07 10:01:18 --> [REQ_ID=8dbdaba92edf] [REQUEST][START] HEAD /
DEBUG - 2026-03-07 10:01:18 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-07 10:01:18 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-07 10:01:18 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-07 10:01:18 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-07 10:01:18 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-07 10:04:34 --> [REQ_ID=5e2227856b2a] [REQUEST][START] GET /index.php/How-It-Works/Setting-Financial-Goals
DEBUG - 2026-03-07 10:04:34 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-07 10:04:34 --> [REQ_ID=5e2227856b2a] [FILTER_BEFORE] /index.php/How-It-Works/Setting-Financial-Goals
DEBUG - 2026-03-07 10:04:34 --> [REQ_ID=5e2227856b2a] [ROUTE] Controller=\App\Modules\Blog\Controllers\HowItWorksController Method=show
DEBUG - 2026-03-07 10:04:34 --> [REQ_ID=5e2227856b2a] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/How-It-Works/Setting-Financial-Goals
DEBUG - 2026-03-07 10:04:34 --> [CSRF] token name=csrf_test_name hash=ec6304e343374de6bbf6824bec49ce5e
DEBUG - 2026-03-07 10:04:34 --> [REQ_ID=9bdb49beaeaa] [INIT] App\Modules\Blog\Controllers\HowItWorksController::GET
INFO - 2026-03-07 10:04:34 --> [REQ_ID=9bdb49beaeaa] [MEMORY][controller-start] 6291456
DEBUG - 2026-03-07 10:04:34 --> [REQ_ID=9bdb49beaeaa] [METHOD_ENTRY] show
DEBUG - 2026-03-07 10:04:34 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-07 10:04:34 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-07 10:04:34 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-07 10:04:34 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-07 10:04:34 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-07 10:04:34 --> MyMICoin: guest context detected; skipping user-specific preload.
INFO - 2026-03-07 10:04:34 --> [REQ_ID=9bdb49beaeaa] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-07 10:04:35 --> [REQ_ID=9bdb49beaeaa] [VIEW_RENDER] App\Modules\Blog\Views\HowItWorks\Determining_Your_Financial_Goals
INFO - 2026-03-07 10:04:35 --> [REQ_ID=9bdb49beaeaa] [MEMORY][commonData:start] 10485760
INFO - 2026-03-07 10:04:35 --> themesMemory usage: 14680064
DEBUG - 2026-03-07 10:04:35 --> [REQ_ID=5e2227856b2a] [FILTER_AFTER]
DEBUG - 2026-03-07 10:04:35 --> [REQ_ID=5e2227856b2a] [LIFECYCLE][END] status=200 duration_ms=1,226.96 memory_delta=8388608
INFO - 2026-03-07 10:04:35 --> [REQ_ID=9bdb49beaeaa] [PERF] Execution time=1.224974
DEBUG - 2026-03-07 10:04:35 --> [REQ_ID=5e2227856b2a] [REQUEST][END]
INFO - 2026-03-07 10:04:35 --> [REQ_ID=5e2227856b2a] [PERF] Execution time=1.268255
DEBUG - 2026-03-07 10:06:18 --> [REQ_ID=df6117daadf1] [REQUEST][START] HEAD /
DEBUG - 2026-03-07 10:06:18 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-07 10:06:18 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-07 10:06:18 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-07 10:06:18 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-07 10:06:18 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-07 10:06:27 --> [REQ_ID=4c80325245ab] [REQUEST][START] GET /index.php/Partner/register
DEBUG - 2026-03-07 10:06:27 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-07 10:06:27 --> [REQ_ID=4c80325245ab] [FILTER_BEFORE] /index.php/Partner/register
DEBUG - 2026-03-07 10:06:27 --> [REQ_ID=4c80325245ab] [ROUTE] Controller=\App\Controllers\AuthController Method=register
DEBUG - 2026-03-07 10:06:27 --> [REQ_ID=4c80325245ab] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Partner/register
DEBUG - 2026-03-07 10:06:27 --> [CSRF] token name=csrf_test_name hash=38ec42c247e7cbc09c664bb3b9636985
DEBUG - 2026-03-07 10:06:27 --> [REQ_ID=4c80325245ab] [REQUEST][END]
INFO - 2026-03-07 10:06:27 --> [REQ_ID=4c80325245ab] [PERF] Execution time=0.029857
DEBUG - 2026-03-07 10:06:30 --> [REQ_ID=4cfddb338187] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-07 10:06:30 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-07 10:06:30 --> [REQ_ID=4cfddb338187] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-07 10:06:30 --> [REQ_ID=4cfddb338187] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-07 10:06:30 --> [REQ_ID=4cfddb338187] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-07 10:06:30 --> [CSRF] token name=csrf_test_name hash=addd8e3d16bb9d433578f30ffc5fb140
DEBUG - 2026-03-07 10:06:30 --> [REQ_ID=08a0f7b2f227] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-07 10:06:30 --> [REQ_ID=08a0f7b2f227] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-07 10:06:30 --> [REQ_ID=4cfddb338187] [FILTER_AFTER]
DEBUG - 2026-03-07 10:06:30 --> [REQ_ID=4cfddb338187] [LIFECYCLE][END] status=200 duration_ms=44.02 memory_delta=0
INFO - 2026-03-07 10:06:30 --> [REQ_ID=08a0f7b2f227] [PERF] Execution time=0.037788
DEBUG - 2026-03-07 10:06:30 --> [REQ_ID=4cfddb338187] [REQUEST][END]
INFO - 2026-03-07 10:06:30 --> [REQ_ID=4cfddb338187] [PERF] Execution time=0.052947
DEBUG - 2026-03-07 10:07:27 --> [REQ_ID=2ced76b37167] [REQUEST][START] GET /index.php/Getting-Started
DEBUG - 2026-03-07 10:07:27 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-07 10:07:27 --> [REQ_ID=2ced76b37167] [FILTER_BEFORE] /index.php/Getting-Started
DEBUG - 2026-03-07 10:07:27 --> [REQ_ID=2ced76b37167] [ROUTE] Controller=\App\Controllers\Home Method=gettingStarted
DEBUG - 2026-03-07 10:07:27 --> [REQ_ID=2ced76b37167] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Getting-Started
DEBUG - 2026-03-07 10:07:27 --> [CSRF] token name=csrf_test_name hash=d05164563f826c0a10e034d675f09262
DEBUG - 2026-03-07 10:07:27 --> [REQ_ID=0fcf11531f8e] [INIT] App\Controllers\Home::GET
INFO - 2026-03-07 10:07:27 --> [REQ_ID=0fcf11531f8e] [MEMORY][controller-start] 4194304
INFO - 2026-03-07 10:07:27 --> [REQ_ID=0fcf11531f8e] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-07 10:07:27 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-07 10:07:28 --> [MetaService] slug=getting-started pageName= cacheHit= path=DB
DEBUG - 2026-03-07 10:07:28 --> [REQ_ID=0fcf11531f8e] [VIEW_RENDER] themes/public/gettingStarted
INFO - 2026-03-07 10:07:28 --> [REQ_ID=0fcf11531f8e] [MEMORY][commonData:start] 8388608
INFO - 2026-03-07 10:07:28 --> themesMemory usage: 8388608
DEBUG - 2026-03-07 10:07:28 --> [MetaService] slug=getting-started pageName=Getting Started cacheHit= path=DB
DEBUG - 2026-03-07 10:07:28 --> [REQ_ID=2ced76b37167] [FILTER_AFTER]
DEBUG - 2026-03-07 10:07:28 --> [REQ_ID=2ced76b37167] [LIFECYCLE][END] status=200 duration_ms=587.09 memory_delta=4194304
INFO - 2026-03-07 10:07:28 --> [REQ_ID=0fcf11531f8e] [PERF] Execution time=0.586274
DEBUG - 2026-03-07 10:07:28 --> [REQ_ID=2ced76b37167] [REQUEST][END]
INFO - 2026-03-07 10:07:28 --> [REQ_ID=2ced76b37167] [PERF] Execution time=0.598256
DEBUG - 2026-03-07 10:11:18 --> [REQ_ID=d568e9f142f9] [REQUEST][START] HEAD /
DEBUG - 2026-03-07 10:11:18 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-07 10:11:18 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-07 10:11:18 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-07 10:11:18 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-07 10:11:18 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-07 10:14:53 --> [REQ_ID=e6bfabed2524] [REQUEST][START] GET /
DEBUG - 2026-03-07 10:14:53 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-07 10:14:53 --> [REQ_ID=e6bfabed2524] [FILTER_BEFORE] /
DEBUG - 2026-03-07 10:14:53 --> [REQ_ID=e6bfabed2524] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-07 10:14:53 --> [REQ_ID=e6bfabed2524] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-07 10:14:53 --> [CSRF] token name=csrf_test_name hash=e31151c61d66a20e0bdfe2b82756ced6
DEBUG - 2026-03-07 10:14:53 --> [REQ_ID=e4a75d439191] [INIT] App\Controllers\Home::GET
INFO - 2026-03-07 10:14:53 --> [REQ_ID=e4a75d439191] [MEMORY][controller-start] 6291456
INFO - 2026-03-07 10:14:53 --> [REQ_ID=e4a75d439191] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-07 10:14:53 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-07 10:14:54 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-03-07 10:14:54 --> [REQ_ID=e4a75d439191] [VIEW_RENDER] themes/public/home
INFO - 2026-03-07 10:14:54 --> [REQ_ID=e4a75d439191] [MEMORY][commonData:start] 10485760
INFO - 2026-03-07 10:14:54 --> themesMemory usage: 10485760
DEBUG - 2026-03-07 10:14:54 --> [MetaService] slug= pageName=Home cacheHit= path=DB
DEBUG - 2026-03-07 10:14:54 --> [REQ_ID=e6bfabed2524] [FILTER_AFTER]
DEBUG - 2026-03-07 10:14:54 --> [REQ_ID=e6bfabed2524] [LIFECYCLE][END] status=200 duration_ms=761.56 memory_delta=4194304
INFO - 2026-03-07 10:14:54 --> [REQ_ID=e4a75d439191] [PERF] Execution time=0.759569
DEBUG - 2026-03-07 10:14:54 --> [REQ_ID=e6bfabed2524] [REQUEST][END]
INFO - 2026-03-07 10:14:54 --> [REQ_ID=e6bfabed2524] [PERF] Execution time=0.799411
DEBUG - 2026-03-07 10:15:01 --> [REQ_ID=1ffb8c92f6b0] [REQUEST][START] GET /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-07 10:15:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
INFO - 2026-03-07 10:15:01 --> [spark:ops:work] Started
INFO - 2026-03-07 10:15:01 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-03-07 10:15:01 --> [SPARK_MEMORY] 16777216
INFO - 2026-03-07 10:15:01 --> [spark:ops:work] Intent
DEBUG - 2026-03-07 10:15:01 --> [REQ_ID=1ffb8c92f6b0] [FILTER_BEFORE] /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-07 10:15:01 --> [REQ_ID=1ffb8c92f6b0] [ROUTE] Controller=\App\Modules\APIs\Controllers\AlertsAPIController Method=fetchEmailAlerts
DEBUG - 2026-03-07 10:15:01 --> [REQ_ID=1ffb8c92f6b0] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-07 10:15:01 --> [REQ_ID=1ffb8c92f6b0] [REQUEST][END]
INFO - 2026-03-07 10:15:01 --> [REQ_ID=1ffb8c92f6b0] [PERF] Execution time=0.053319
INFO - 2026-03-07 10:15:01 --> [spark:ops:work] Completed
INFO - 2026-03-07 10:15:01 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.081577
INFO - 2026-03-07 10:15:01 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-03-07 10:16:18 --> [REQ_ID=92c628685196] [REQUEST][START] HEAD /
DEBUG - 2026-03-07 10:16:18 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-07 10:16:18 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-07 10:16:18 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-07 10:16:18 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-07 10:16:18 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-07 10:18:26 --> [REQ_ID=00ff241a31a0] [REQUEST][START] GET /index.php/Premium-Features/Wallets
DEBUG - 2026-03-07 10:18:26 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-07 10:18:26 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: GET, Route: Premium-Features/Wallets]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-07 10:18:26 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-07 10:18:26 --> [404] URI=https://www.mymiwallet.com/index.php/Premium-Features/Wallets
WARNING - 2026-03-07 10:18:26 --> 404 route miss: https://www.mymiwallet.com/index.php/Premium-Features/Wallets | referrer: none
DEBUG - 2026-03-07 10:21:14 --> [REQ_ID=123c0b04e629] [REQUEST][START] GET /index.php/Management/Marketing/Ideas
DEBUG - 2026-03-07 10:21:14 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-07 10:21:14 --> [REQ_ID=123c0b04e629] [FILTER_BEFORE] /index.php/Management/Marketing/Ideas
DEBUG - 2026-03-07 10:21:14 --> [REQ_ID=123c0b04e629] [ROUTE] Controller=\App\Modules\Management\Controllers\MarketingAdminController Method=ideas
DEBUG - 2026-03-07 10:21:14 --> [REQ_ID=123c0b04e629] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Management/Marketing/Ideas
DEBUG - 2026-03-07 10:21:14 --> [CSRF] token name=csrf_test_name hash=8b5a9e98ece0aea9778e8c1ce8b4da6a
DEBUG - 2026-03-07 10:21:14 --> [REQ_ID=123c0b04e629] [REQUEST][END]
INFO - 2026-03-07 10:21:14 --> [REQ_ID=123c0b04e629] [PERF] Execution time=0.057635
DEBUG - 2026-03-07 10:21:14 --> [REQ_ID=c6d73576796f] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-07 10:21:14 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-07 10:21:14 --> [REQ_ID=c6d73576796f] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-07 10:21:14 --> [REQ_ID=c6d73576796f] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-07 10:21:14 --> [REQ_ID=c6d73576796f] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-07 10:21:14 --> [CSRF] token name=csrf_test_name hash=623d1c9caa332024c4c209ab7b43be45
DEBUG - 2026-03-07 10:21:14 --> [REQ_ID=74e02463de7b] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-07 10:21:14 --> [REQ_ID=74e02463de7b] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-07 10:21:14 --> [REQ_ID=c6d73576796f] [FILTER_AFTER]
DEBUG - 2026-03-07 10:21:14 --> [REQ_ID=c6d73576796f] [LIFECYCLE][END] status=200 duration_ms=108.55 memory_delta=0
INFO - 2026-03-07 10:21:14 --> [REQ_ID=74e02463de7b] [PERF] Execution time=0.108358
DEBUG - 2026-03-07 10:21:14 --> [REQ_ID=c6d73576796f] [REQUEST][END]
INFO - 2026-03-07 10:21:14 --> [REQ_ID=c6d73576796f] [PERF] Execution time=0.121648
DEBUG - 2026-03-07 10:21:18 --> [REQ_ID=d749f1261d00] [REQUEST][START] HEAD /
DEBUG - 2026-03-07 10:21:18 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-07 10:21:18 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-07 10:21:18 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-07 10:21:18 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-07 10:21:18 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-07 10:26:18 --> [REQ_ID=f12439583087] [REQUEST][START] HEAD /
DEBUG - 2026-03-07 10:26:18 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-07 10:26:18 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-07 10:26:18 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-07 10:26:18 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-07 10:26:18 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-07 10:28:02 --> [REQ_ID=2bedf86ba47c] [REQUEST][START] GET /index.php/Trade-Tracker
DEBUG - 2026-03-07 10:28:02 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-07 10:28:03 --> [REQ_ID=2bedf86ba47c] [FILTER_BEFORE] /index.php/Trade-Tracker
DEBUG - 2026-03-07 10:28:03 --> [REQ_ID=2bedf86ba47c] [ROUTE] Controller=\App\Modules\User\Controllers\InvestmentsController Method=tradeTracker
DEBUG - 2026-03-07 10:28:03 --> [REQ_ID=2bedf86ba47c] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Trade-Tracker
DEBUG - 2026-03-07 10:28:03 --> [CSRF] token name=csrf_test_name hash=bdcf1bb6e860fa3d211bad647a4d6464
DEBUG - 2026-03-07 10:28:03 --> [REQ_ID=2bedf86ba47c] [REQUEST][END]
INFO - 2026-03-07 10:28:03 --> [REQ_ID=2bedf86ba47c] [PERF] Execution time=0.053193
DEBUG - 2026-03-07 10:28:03 --> [REQ_ID=84747d25bc10] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-07 10:28:03 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-07 10:28:03 --> [REQ_ID=84747d25bc10] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-07 10:28:03 --> [REQ_ID=84747d25bc10] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-07 10:28:03 --> [REQ_ID=84747d25bc10] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-07 10:28:03 --> [CSRF] token name=csrf_test_name hash=c7820e938aae18f8504c1eebf90c9cb6
DEBUG - 2026-03-07 10:28:03 --> [REQ_ID=7e294762afe6] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-07 10:28:03 --> [REQ_ID=7e294762afe6] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-07 10:28:03 --> [REQ_ID=84747d25bc10] [FILTER_AFTER]
DEBUG - 2026-03-07 10:28:03 --> [REQ_ID=84747d25bc10] [LIFECYCLE][END] status=200 duration_ms=50.26 memory_delta=0
INFO - 2026-03-07 10:28:03 --> [REQ_ID=7e294762afe6] [PERF] Execution time=0.050048
DEBUG - 2026-03-07 10:28:03 --> [REQ_ID=84747d25bc10] [REQUEST][END]
INFO - 2026-03-07 10:28:03 --> [REQ_ID=84747d25bc10] [PERF] Execution time=0.061519
INFO - 2026-03-07 10:30:02 --> [spark:ops:work] Started
INFO - 2026-03-07 10:30:02 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-03-07 10:30:02 --> [SPARK_MEMORY] 16777216
INFO - 2026-03-07 10:30:02 --> [spark:ops:work] Intent
INFO - 2026-03-07 10:30:02 --> [spark:ops:work] Completed
INFO - 2026-03-07 10:30:02 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.041466
INFO - 2026-03-07 10:30:02 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-03-07 10:30:52 --> [REQ_ID=ed612db9d64b] [REQUEST][START] GET /
DEBUG - 2026-03-07 10:30:52 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-07 10:30:52 --> [REQ_ID=ed612db9d64b] [FILTER_BEFORE] /
DEBUG - 2026-03-07 10:30:52 --> [REQ_ID=ed612db9d64b] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-07 10:30:52 --> [REQ_ID=ed612db9d64b] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-07 10:30:52 --> [CSRF] token name=csrf_test_name hash=5ba3153300fb6a97de61cc405cfd4066
DEBUG - 2026-03-07 10:30:52 --> [REQ_ID=dd271ed177ad] [INIT] App\Controllers\Home::GET
INFO - 2026-03-07 10:30:52 --> [REQ_ID=dd271ed177ad] [MEMORY][controller-start] 6291456
INFO - 2026-03-07 10:30:52 --> [REQ_ID=dd271ed177ad] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-07 10:30:52 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-07 10:30:52 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-03-07 10:30:52 --> [REQ_ID=dd271ed177ad] [VIEW_RENDER] themes/public/home
INFO - 2026-03-07 10:30:52 --> [REQ_ID=dd271ed177ad] [MEMORY][commonData:start] 10485760
INFO - 2026-03-07 10:30:52 --> themesMemory usage: 10485760
DEBUG - 2026-03-07 10:30:52 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-07 10:30:52 --> [REQ_ID=ed612db9d64b] [FILTER_AFTER]
DEBUG - 2026-03-07 10:30:52 --> [REQ_ID=ed612db9d64b] [LIFECYCLE][END] status=200 duration_ms=666.19 memory_delta=4194304
INFO - 2026-03-07 10:30:52 --> [REQ_ID=dd271ed177ad] [PERF] Execution time=0.664256
DEBUG - 2026-03-07 10:30:52 --> [REQ_ID=ed612db9d64b] [REQUEST][END]
INFO - 2026-03-07 10:30:52 --> [REQ_ID=ed612db9d64b] [PERF] Execution time=0.704734
DEBUG - 2026-03-07 10:31:18 --> [REQ_ID=cf2e0675da2c] [REQUEST][START] HEAD /
DEBUG - 2026-03-07 10:31:18 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-07 10:31:18 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-07 10:31:18 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-07 10:31:18 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-07 10:31:18 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-07 10:36:18 --> [REQ_ID=a643f5d37501] [REQUEST][START] HEAD /
DEBUG - 2026-03-07 10:36:18 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-07 10:36:18 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-07 10:36:18 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-07 10:36:18 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-07 10:36:18 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-07 10:41:18 --> [REQ_ID=27fe49890cf3] [REQUEST][START] HEAD /
DEBUG - 2026-03-07 10:41:18 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-07 10:41:18 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-07 10:41:19 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-07 10:41:19 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-07 10:41:19 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
INFO - 2026-03-07 10:45:01 --> [spark:ops:work] Started
INFO - 2026-03-07 10:45:01 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-03-07 10:45:01 --> [SPARK_MEMORY] 16777216
INFO - 2026-03-07 10:45:01 --> [spark:ops:work] Intent
INFO - 2026-03-07 10:45:01 --> [spark:ops:work] Completed
INFO - 2026-03-07 10:45:01 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.042589
INFO - 2026-03-07 10:45:01 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-03-07 10:46:18 --> [REQ_ID=f0283b5647cc] [REQUEST][START] HEAD /
DEBUG - 2026-03-07 10:46:18 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-07 10:46:18 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-07 10:46:18 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-07 10:46:18 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-07 10:46:18 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-07 10:48:00 --> [REQ_ID=2fb41e429042] [REQUEST][START] GET /
DEBUG - 2026-03-07 10:48:00 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-07 10:48:00 --> [REQ_ID=2fb41e429042] [FILTER_BEFORE] /
DEBUG - 2026-03-07 10:48:00 --> [REQ_ID=2fb41e429042] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-07 10:48:00 --> [REQ_ID=2fb41e429042] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-07 10:48:00 --> [CSRF] token name=csrf_test_name hash=b5bec2ffc7bf873b0801c04ee94ef90d
DEBUG - 2026-03-07 10:48:00 --> [REQ_ID=ee822a5da450] [INIT] App\Controllers\Home::GET
INFO - 2026-03-07 10:48:00 --> [REQ_ID=ee822a5da450] [MEMORY][controller-start] 6291456
INFO - 2026-03-07 10:48:00 --> [REQ_ID=ee822a5da450] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-07 10:48:00 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-07 10:48:00 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-03-07 10:48:00 --> [REQ_ID=ee822a5da450] [VIEW_RENDER] themes/public/home
INFO - 2026-03-07 10:48:00 --> [REQ_ID=ee822a5da450] [MEMORY][commonData:start] 10485760
INFO - 2026-03-07 10:48:00 --> themesMemory usage: 10485760
DEBUG - 2026-03-07 10:48:00 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-07 10:48:00 --> [REQ_ID=2fb41e429042] [FILTER_AFTER]
DEBUG - 2026-03-07 10:48:00 --> [REQ_ID=2fb41e429042] [LIFECYCLE][END] status=200 duration_ms=683.99 memory_delta=4194304
INFO - 2026-03-07 10:48:00 --> [REQ_ID=ee822a5da450] [PERF] Execution time=0.681862
DEBUG - 2026-03-07 10:48:00 --> [REQ_ID=2fb41e429042] [REQUEST][END]
INFO - 2026-03-07 10:48:00 --> [REQ_ID=2fb41e429042] [PERF] Execution time=0.723318
DEBUG - 2026-03-07 10:48:01 --> [REQ_ID=5c21c08f172c] [REQUEST][START] GET /index.php/How-It-Works/Investment-Portfolio-Management
DEBUG - 2026-03-07 10:48:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-07 10:48:01 --> [REQ_ID=5c21c08f172c] [FILTER_BEFORE] /index.php/How-It-Works/Investment-Portfolio-Management
DEBUG - 2026-03-07 10:48:01 --> [REQ_ID=5c21c08f172c] [ROUTE] Controller=\App\Modules\Blog\Controllers\HowItWorksController Method=show
DEBUG - 2026-03-07 10:48:01 --> [REQ_ID=5c21c08f172c] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/How-It-Works/Investment-Portfolio-Management
DEBUG - 2026-03-07 10:48:01 --> [CSRF] token name=csrf_test_name hash=b2b052cd5cc5785c4b3dbf42fb540fa7
DEBUG - 2026-03-07 10:48:01 --> [REQ_ID=58aac4e302a6] [INIT] App\Modules\Blog\Controllers\HowItWorksController::GET
INFO - 2026-03-07 10:48:01 --> [REQ_ID=58aac4e302a6] [MEMORY][controller-start] 6291456
DEBUG - 2026-03-07 10:48:01 --> [REQ_ID=58aac4e302a6] [METHOD_ENTRY] show
DEBUG - 2026-03-07 10:48:01 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-07 10:48:01 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-07 10:48:01 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-07 10:48:01 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-07 10:48:01 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-07 10:48:01 --> MyMICoin: guest context detected; skipping user-specific preload.
ERROR - 2026-03-07 10:48:01 --> [ERROR_PAGE] event=error_404 status=404 message=Page not found.
DEBUG - 2026-03-07 10:48:01 --> [REQ_ID=5c21c08f172c] [FILTER_AFTER]
DEBUG - 2026-03-07 10:48:01 --> [REQ_ID=5c21c08f172c] [LIFECYCLE][END] status=404 duration_ms=56.09 memory_delta=0
INFO - 2026-03-07 10:48:01 --> [REQ_ID=58aac4e302a6] [PERF] Execution time=0.055941
DEBUG - 2026-03-07 10:48:01 --> [REQ_ID=5c21c08f172c] [REQUEST][END]
INFO - 2026-03-07 10:48:01 --> [REQ_ID=5c21c08f172c] [PERF] Execution time=0.070345
DEBUG - 2026-03-07 10:48:01 --> [REQ_ID=d329ef4805a1] [REQUEST][START] GET /index.php/How-It-Works/Automated-Financial-Insights
DEBUG - 2026-03-07 10:48:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-07 10:48:01 --> [REQ_ID=d329ef4805a1] [FILTER_BEFORE] /index.php/How-It-Works/Automated-Financial-Insights
DEBUG - 2026-03-07 10:48:01 --> [REQ_ID=d329ef4805a1] [ROUTE] Controller=\App\Modules\Blog\Controllers\HowItWorksController Method=show
DEBUG - 2026-03-07 10:48:01 --> [REQ_ID=d329ef4805a1] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/How-It-Works/Automated-Financial-Insights
DEBUG - 2026-03-07 10:48:01 --> [CSRF] token name=csrf_test_name hash=7cb4b9f13b6266610464916258c7ac2e
DEBUG - 2026-03-07 10:48:01 --> [REQ_ID=5e82006ef2f7] [INIT] App\Modules\Blog\Controllers\HowItWorksController::GET
INFO - 2026-03-07 10:48:01 --> [REQ_ID=5e82006ef2f7] [MEMORY][controller-start] 6291456
DEBUG - 2026-03-07 10:48:01 --> [REQ_ID=5e82006ef2f7] [METHOD_ENTRY] show
DEBUG - 2026-03-07 10:48:01 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-07 10:48:01 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-07 10:48:01 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-07 10:48:01 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-07 10:48:01 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-07 10:48:01 --> MyMICoin: guest context detected; skipping user-specific preload.
ERROR - 2026-03-07 10:48:01 --> [ERROR_PAGE] event=error_404 status=404 message=Page not found.
DEBUG - 2026-03-07 10:48:01 --> [REQ_ID=d329ef4805a1] [FILTER_AFTER]
DEBUG - 2026-03-07 10:48:01 --> [REQ_ID=d329ef4805a1] [LIFECYCLE][END] status=404 duration_ms=25.36 memory_delta=0
INFO - 2026-03-07 10:48:01 --> [REQ_ID=5e82006ef2f7] [PERF] Execution time=0.025114
DEBUG - 2026-03-07 10:48:01 --> [REQ_ID=d329ef4805a1] [REQUEST][END]
INFO - 2026-03-07 10:48:01 --> [REQ_ID=d329ef4805a1] [PERF] Execution time=0.034120
DEBUG - 2026-03-07 10:48:02 --> [REQ_ID=238f1569981f] [REQUEST][START] GET /index.php/How-It-Works/Setting-Financial-Goals
DEBUG - 2026-03-07 10:48:02 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-07 10:48:02 --> [REQ_ID=238f1569981f] [FILTER_BEFORE] /index.php/How-It-Works/Setting-Financial-Goals
DEBUG - 2026-03-07 10:48:02 --> [REQ_ID=238f1569981f] [ROUTE] Controller=\App\Modules\Blog\Controllers\HowItWorksController Method=show
DEBUG - 2026-03-07 10:48:02 --> [REQ_ID=238f1569981f] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/How-It-Works/Setting-Financial-Goals
DEBUG - 2026-03-07 10:48:02 --> [CSRF] token name=csrf_test_name hash=336da386a61c062b4f9daaf1ea4c1f02
DEBUG - 2026-03-07 10:48:02 --> [REQ_ID=9186226364ca] [INIT] App\Modules\Blog\Controllers\HowItWorksController::GET
INFO - 2026-03-07 10:48:02 --> [REQ_ID=9186226364ca] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-07 10:48:02 --> [REQ_ID=9186226364ca] [METHOD_ENTRY] show
DEBUG - 2026-03-07 10:48:02 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-07 10:48:02 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-07 10:48:02 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-07 10:48:02 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-07 10:48:02 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-07 10:48:02 --> MyMICoin: guest context detected; skipping user-specific preload.
INFO - 2026-03-07 10:48:02 --> [REQ_ID=9186226364ca] [MEMORY][commonData:start] 4194304
DEBUG - 2026-03-07 10:48:02 --> [REQ_ID=9186226364ca] [VIEW_RENDER] App\Modules\Blog\Views\HowItWorks\Determining_Your_Financial_Goals
INFO - 2026-03-07 10:48:02 --> [REQ_ID=9186226364ca] [MEMORY][commonData:start] 8388608
INFO - 2026-03-07 10:48:03 --> themesMemory usage: 10485760
DEBUG - 2026-03-07 10:48:03 --> [REQ_ID=238f1569981f] [FILTER_AFTER]
DEBUG - 2026-03-07 10:48:03 --> [REQ_ID=238f1569981f] [LIFECYCLE][END] status=200 duration_ms=1,052.60 memory_delta=8388608
INFO - 2026-03-07 10:48:03 --> [REQ_ID=9186226364ca] [PERF] Execution time=1.052401
DEBUG - 2026-03-07 10:48:03 --> [REQ_ID=238f1569981f] [REQUEST][END]
INFO - 2026-03-07 10:48:03 --> [REQ_ID=238f1569981f] [PERF] Execution time=1.062559
DEBUG - 2026-03-07 10:51:18 --> [REQ_ID=bfcd81429447] [REQUEST][START] HEAD /
DEBUG - 2026-03-07 10:51:18 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-07 10:51:18 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-07 10:51:18 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-07 10:51:18 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-07 10:51:18 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-07 10:56:18 --> [REQ_ID=9035a75147fb] [REQUEST][START] HEAD /
DEBUG - 2026-03-07 10:56:18 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-07 10:56:18 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-07 10:56:18 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-07 10:56:18 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-07 10:56:18 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-07 10:59:40 --> [REQ_ID=46b7c3e04607] [REQUEST][START] GET /index.php/My-Referrals
DEBUG - 2026-03-07 10:59:40 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-07 10:59:40 --> [REQ_ID=46b7c3e04607] [FILTER_BEFORE] /index.php/My-Referrals
DEBUG - 2026-03-07 10:59:40 --> [REQ_ID=46b7c3e04607] [ROUTE] Controller=\App\Modules\User\Controllers\ReferralController Method=index
DEBUG - 2026-03-07 10:59:40 --> [REQ_ID=46b7c3e04607] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/My-Referrals
DEBUG - 2026-03-07 10:59:40 --> [CSRF] token name=csrf_test_name hash=9a8939b81f070e536aef0f839adc849e
DEBUG - 2026-03-07 10:59:40 --> [REQ_ID=46b7c3e04607] [REQUEST][END]
INFO - 2026-03-07 10:59:40 --> [REQ_ID=46b7c3e04607] [PERF] Execution time=0.056190
DEBUG - 2026-03-07 10:59:40 --> [REQ_ID=5c69e440cebb] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-07 10:59:40 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-07 10:59:40 --> [REQ_ID=5c69e440cebb] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-07 10:59:40 --> [REQ_ID=5c69e440cebb] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-07 10:59:40 --> [REQ_ID=5c69e440cebb] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-07 10:59:40 --> [CSRF] token name=csrf_test_name hash=2b880eb5f2b7658d3bf1c757e9a22f86
DEBUG - 2026-03-07 10:59:40 --> [REQ_ID=fc94278ef590] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-07 10:59:40 --> [REQ_ID=fc94278ef590] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-07 10:59:40 --> [REQ_ID=5c69e440cebb] [FILTER_AFTER]
DEBUG - 2026-03-07 10:59:40 --> [REQ_ID=5c69e440cebb] [LIFECYCLE][END] status=200 duration_ms=62.11 memory_delta=0
INFO - 2026-03-07 10:59:40 --> [REQ_ID=fc94278ef590] [PERF] Execution time=0.061843
DEBUG - 2026-03-07 10:59:40 --> [REQ_ID=5c69e440cebb] [REQUEST][END]
INFO - 2026-03-07 10:59:40 --> [REQ_ID=5c69e440cebb] [PERF] Execution time=0.074436
DEBUG - 2026-03-07 11:00:01 --> [REQ_ID=0b52bb1c9745] [REQUEST][START] GET /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-07 11:00:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-07 11:00:01 --> [REQ_ID=0b52bb1c9745] [FILTER_BEFORE] /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-07 11:00:01 --> [REQ_ID=0b52bb1c9745] [ROUTE] Controller=\App\Modules\Management\Controllers\ManagementAPIController Method=Run_CRON_Tasks
DEBUG - 2026-03-07 11:00:01 --> [REQ_ID=0b52bb1c9745] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-07 11:00:01 --> [REQ_ID=0b52bb1c9745] [REQUEST][END]
INFO - 2026-03-07 11:00:01 --> [REQ_ID=0b52bb1c9745] [PERF] Execution time=0.033494
INFO - 2026-03-07 11:00:01 --> [spark:ops:work] Started
INFO - 2026-03-07 11:00:01 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-03-07 11:00:01 --> [SPARK_MEMORY] 16777216
INFO - 2026-03-07 11:00:01 --> [spark:ops:work] Intent
INFO - 2026-03-07 11:00:02 --> [spark:ops:work] Completed
INFO - 2026-03-07 11:00:02 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.172768
INFO - 2026-03-07 11:00:02 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-03-07 11:01:18 --> [REQ_ID=1642c5a3e937] [REQUEST][START] HEAD /
DEBUG - 2026-03-07 11:01:18 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-07 11:01:18 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-07 11:01:18 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-07 11:01:18 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-07 11:01:18 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
INFO - 2026-03-07 11:04:33 --> [SPARK_START] App\Commands\Spark\Reset
INFO - 2026-03-07 11:04:33 --> [SPARK_MEMORY] 16777216
INFO - 2026-03-07 11:04:33 --> [spark:spark-reset] Intent
INFO - 2026-03-07 11:04:33 --> [SPARK_COMPLETE] App\Commands\Spark\Reset duration=0.002180
INFO - 2026-03-07 11:04:33 --> [SPARK_MEMORY] 16777216
DEBUG - 2026-03-07 11:05:01 --> [REQ_ID=b3ac1b043ea6] [REQUEST][START] GET /index.php/How-It-Works/Purchase-MyMI-Gold
DEBUG - 2026-03-07 11:05:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-07 11:05:01 --> [REQ_ID=b3ac1b043ea6] [FILTER_BEFORE] /index.php/How-It-Works/Purchase-MyMI-Gold
DEBUG - 2026-03-07 11:05:01 --> [REQ_ID=b3ac1b043ea6] [ROUTE] Controller=\App\Modules\Blog\Controllers\HowItWorksController Method=show
DEBUG - 2026-03-07 11:05:01 --> [REQ_ID=b3ac1b043ea6] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/How-It-Works/Purchase-MyMI-Gold
DEBUG - 2026-03-07 11:05:01 --> [CSRF] token name=csrf_test_name hash=3d9a4d926ad171904cc2a12ae2518397
DEBUG - 2026-03-07 11:05:01 --> [REQ_ID=f087c0f20bb8] [INIT] App\Modules\Blog\Controllers\HowItWorksController::GET
INFO - 2026-03-07 11:05:01 --> [REQ_ID=f087c0f20bb8] [MEMORY][controller-start] 6291456
DEBUG - 2026-03-07 11:05:01 --> [REQ_ID=f087c0f20bb8] [METHOD_ENTRY] show
DEBUG - 2026-03-07 11:05:01 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-07 11:05:01 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-07 11:05:01 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-07 11:05:01 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-07 11:05:01 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-07 11:05:01 --> MyMICoin: guest context detected; skipping user-specific preload.
ERROR - 2026-03-07 11:05:01 --> [ERROR_PAGE] event=error_404 status=404 message=Page not found.
DEBUG - 2026-03-07 11:05:01 --> [REQ_ID=b3ac1b043ea6] [FILTER_AFTER]
DEBUG - 2026-03-07 11:05:01 --> [REQ_ID=b3ac1b043ea6] [LIFECYCLE][END] status=404 duration_ms=213.29 memory_delta=0
INFO - 2026-03-07 11:05:01 --> [REQ_ID=f087c0f20bb8] [PERF] Execution time=0.209427
DEBUG - 2026-03-07 11:05:01 --> [REQ_ID=b3ac1b043ea6] [REQUEST][END]
INFO - 2026-03-07 11:05:01 --> [REQ_ID=b3ac1b043ea6] [PERF] Execution time=0.306379
DEBUG - 2026-03-07 11:06:18 --> [REQ_ID=091b0517372a] [REQUEST][START] HEAD /
DEBUG - 2026-03-07 11:06:18 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-07 11:06:18 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-07 11:06:18 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-07 11:06:18 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-07 11:06:18 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-07 11:11:18 --> [REQ_ID=4399929148a0] [REQUEST][START] HEAD /
DEBUG - 2026-03-07 11:11:18 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-07 11:11:18 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-07 11:11:18 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-07 11:11:18 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-07 11:11:18 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
INFO - 2026-03-07 11:15:02 --> [spark:ops:work] Started
INFO - 2026-03-07 11:15:02 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-03-07 11:15:02 --> [SPARK_MEMORY] 16777216
INFO - 2026-03-07 11:15:02 --> [spark:ops:work] Intent
DEBUG - 2026-03-07 11:15:02 --> [REQ_ID=db39c162492b] [REQUEST][START] GET /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-07 11:15:02 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-07 11:15:02 --> [REQ_ID=db39c162492b] [FILTER_BEFORE] /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-07 11:15:02 --> [REQ_ID=db39c162492b] [ROUTE] Controller=\App\Modules\APIs\Controllers\AlertsAPIController Method=fetchEmailAlerts
DEBUG - 2026-03-07 11:15:02 --> [REQ_ID=db39c162492b] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-07 11:15:02 --> [REQ_ID=db39c162492b] [REQUEST][END]
INFO - 2026-03-07 11:15:02 --> [REQ_ID=db39c162492b] [PERF] Execution time=0.067174
INFO - 2026-03-07 11:15:02 --> [spark:ops:work] Completed
INFO - 2026-03-07 11:15:02 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.365867
INFO - 2026-03-07 11:15:02 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-03-07 11:16:18 --> [REQ_ID=fd77033d11ac] [REQUEST][START] HEAD /
DEBUG - 2026-03-07 11:16:18 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-07 11:16:18 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-07 11:16:18 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-07 11:16:18 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-07 11:16:18 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-07 11:21:18 --> [REQ_ID=36a353b9daf3] [REQUEST][START] HEAD /
DEBUG - 2026-03-07 11:21:18 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-07 11:21:18 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-07 11:21:18 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-07 11:21:18 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-07 11:21:18 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-07 11:26:18 --> [REQ_ID=62314dd46d39] [REQUEST][START] HEAD /
DEBUG - 2026-03-07 11:26:18 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-07 11:26:18 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-07 11:26:18 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-07 11:26:18 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-07 11:26:18 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
INFO - 2026-03-07 11:30:01 --> [spark:ops:work] Started
INFO - 2026-03-07 11:30:01 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-03-07 11:30:01 --> [SPARK_MEMORY] 16777216
INFO - 2026-03-07 11:30:01 --> [spark:ops:work] Intent
INFO - 2026-03-07 11:30:01 --> [spark:ops:work] Completed
INFO - 2026-03-07 11:30:01 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.020267
INFO - 2026-03-07 11:30:01 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-03-07 11:31:18 --> [REQ_ID=f4d5a693b701] [REQUEST][START] HEAD /
DEBUG - 2026-03-07 11:31:18 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-07 11:31:18 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-07 11:31:19 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-07 11:31:19 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-07 11:31:19 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-07 11:31:20 --> [REQ_ID=ce415fde37b2] [REQUEST][START] GET /index.php
DEBUG - 2026-03-07 11:31:20 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-07 11:31:20 --> [REQ_ID=ce415fde37b2] [FILTER_BEFORE] /index.php
DEBUG - 2026-03-07 11:31:20 --> [REQ_ID=ce415fde37b2] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-07 11:31:20 --> [REQ_ID=ce415fde37b2] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-07 11:31:20 --> [CSRF] token name=csrf_test_name hash=a4775b76b434d6bec3442b0c49ecb31d
DEBUG - 2026-03-07 11:31:20 --> [REQ_ID=86b4281555ca] [INIT] App\Controllers\Home::GET
INFO - 2026-03-07 11:31:20 --> [REQ_ID=86b4281555ca] [MEMORY][controller-start] 4194304
INFO - 2026-03-07 11:31:20 --> [REQ_ID=86b4281555ca] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-07 11:31:20 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-07 11:31:20 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-03-07 11:31:20 --> [REQ_ID=86b4281555ca] [VIEW_RENDER] themes/public/home
INFO - 2026-03-07 11:31:20 --> [REQ_ID=86b4281555ca] [MEMORY][commonData:start] 8388608
INFO - 2026-03-07 11:31:20 --> themesMemory usage: 8388608
DEBUG - 2026-03-07 11:31:20 --> [MetaService] slug= pageName=Home cacheHit= path=DB
DEBUG - 2026-03-07 11:31:20 --> [REQ_ID=ce415fde37b2] [FILTER_AFTER]
DEBUG - 2026-03-07 11:31:20 --> [REQ_ID=ce415fde37b2] [LIFECYCLE][END] status=200 duration_ms=581.30 memory_delta=4194304
INFO - 2026-03-07 11:31:20 --> [REQ_ID=86b4281555ca] [PERF] Execution time=0.578948
DEBUG - 2026-03-07 11:31:20 --> [REQ_ID=ce415fde37b2] [REQUEST][END]
INFO - 2026-03-07 11:31:20 --> [REQ_ID=ce415fde37b2] [PERF] Execution time=0.599467
DEBUG - 2026-03-07 11:36:18 --> [REQ_ID=0b0f9e6debcf] [REQUEST][START] HEAD /
DEBUG - 2026-03-07 11:36:18 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-07 11:36:18 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-07 11:36:18 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-07 11:36:18 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-07 11:36:18 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-07 11:39:35 --> [REQ_ID=b5b1e702074e] [REQUEST][START] GET /index.php/How-It-Works/MyMI-Exchange
DEBUG - 2026-03-07 11:39:35 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-07 11:39:35 --> [REQ_ID=b5b1e702074e] [FILTER_BEFORE] /index.php/How-It-Works/MyMI-Exchange
DEBUG - 2026-03-07 11:39:35 --> [REQ_ID=b5b1e702074e] [ROUTE] Controller=\App\Modules\Blog\Controllers\HowItWorksController Method=show
DEBUG - 2026-03-07 11:39:35 --> [REQ_ID=b5b1e702074e] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/How-It-Works/MyMI-Exchange
DEBUG - 2026-03-07 11:39:35 --> [CSRF] token name=csrf_test_name hash=9fbc9bfc5549bb5cc82bf10cdb02c405
DEBUG - 2026-03-07 11:39:35 --> [REQ_ID=622af2e7466c] [INIT] App\Modules\Blog\Controllers\HowItWorksController::GET
INFO - 2026-03-07 11:39:35 --> [REQ_ID=622af2e7466c] [MEMORY][controller-start] 6291456
DEBUG - 2026-03-07 11:39:35 --> [REQ_ID=622af2e7466c] [METHOD_ENTRY] show
DEBUG - 2026-03-07 11:39:35 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-07 11:39:35 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-07 11:39:35 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-07 11:39:35 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-07 11:39:35 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-07 11:39:35 --> MyMICoin: guest context detected; skipping user-specific preload.
INFO - 2026-03-07 11:39:35 --> [REQ_ID=622af2e7466c] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-07 11:39:35 --> [REQ_ID=622af2e7466c] [VIEW_RENDER] App\Modules\Blog\Views\HowItWorks\Manage_Finances
INFO - 2026-03-07 11:39:35 --> [REQ_ID=622af2e7466c] [MEMORY][commonData:start] 10485760
INFO - 2026-03-07 11:39:36 --> themesMemory usage: 14680064
DEBUG - 2026-03-07 11:39:36 --> [REQ_ID=b5b1e702074e] [FILTER_AFTER]
DEBUG - 2026-03-07 11:39:36 --> [REQ_ID=b5b1e702074e] [LIFECYCLE][END] status=200 duration_ms=1,070.16 memory_delta=8388608
INFO - 2026-03-07 11:39:36 --> [REQ_ID=622af2e7466c] [PERF] Execution time=1.068148
DEBUG - 2026-03-07 11:39:36 --> [REQ_ID=b5b1e702074e] [REQUEST][END]
INFO - 2026-03-07 11:39:36 --> [REQ_ID=b5b1e702074e] [PERF] Execution time=1.121296
DEBUG - 2026-03-07 11:41:18 --> [REQ_ID=ae2a6859b0c0] [REQUEST][START] HEAD /
DEBUG - 2026-03-07 11:41:18 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-07 11:41:18 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-07 11:41:18 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-07 11:41:18 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-07 11:41:18 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
INFO - 2026-03-07 11:45:01 --> [spark:ops:work] Started
INFO - 2026-03-07 11:45:01 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-03-07 11:45:01 --> [SPARK_MEMORY] 16777216
INFO - 2026-03-07 11:45:01 --> [spark:ops:work] Intent
INFO - 2026-03-07 11:45:01 --> [spark:ops:work] Completed
INFO - 2026-03-07 11:45:01 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.097687
INFO - 2026-03-07 11:45:01 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-03-07 11:46:18 --> [REQ_ID=06819697d0ee] [REQUEST][START] HEAD /
DEBUG - 2026-03-07 11:46:18 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-07 11:46:18 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-07 11:46:18 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-07 11:46:18 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-07 11:46:18 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-07 11:51:18 --> [REQ_ID=cb5922444edf] [REQUEST][START] HEAD /
DEBUG - 2026-03-07 11:51:18 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-07 11:51:18 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-07 11:51:18 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-07 11:51:18 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-07 11:51:18 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-07 11:56:18 --> [REQ_ID=9f3fcc8e5d21] [REQUEST][START] HEAD /
DEBUG - 2026-03-07 11:56:18 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-07 11:56:18 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-07 11:56:19 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-07 11:56:19 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-07 11:56:19 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-07 11:58:25 --> [REQ_ID=8d75629f53a6] [REQUEST][START] GET /index.php/Wallets/Purchase/Memberships/Basic
DEBUG - 2026-03-07 11:58:25 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-07 11:58:25 --> [REQ_ID=8d75629f53a6] [FILTER_BEFORE] /index.php/Wallets/Purchase/Memberships/Basic
DEBUG - 2026-03-07 11:58:25 --> [REQ_ID=8d75629f53a6] [ROUTE] Controller=\App\Modules\User\Controllers\WalletsController Method=purchase
DEBUG - 2026-03-07 11:58:25 --> [REQ_ID=8d75629f53a6] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Wallets/Purchase/Memberships/Basic
DEBUG - 2026-03-07 11:58:25 --> [CSRF] token name=csrf_test_name hash=13a75299a687fafe8dea0e4c436e1f88
DEBUG - 2026-03-07 11:58:25 --> [REQ_ID=8d75629f53a6] [REQUEST][END]
INFO - 2026-03-07 11:58:25 --> [REQ_ID=8d75629f53a6] [PERF] Execution time=0.057148
DEBUG - 2026-03-07 11:58:28 --> [REQ_ID=92a7318fd02d] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-07 11:58:28 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-07 11:58:28 --> [REQ_ID=92a7318fd02d] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-07 11:58:28 --> [REQ_ID=92a7318fd02d] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-07 11:58:28 --> [REQ_ID=92a7318fd02d] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-07 11:58:28 --> [CSRF] token name=csrf_test_name hash=7f70e3af56f48f10e89fd9cb6a5cba7c
DEBUG - 2026-03-07 11:58:28 --> [REQ_ID=a9b055430078] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-07 11:58:28 --> [REQ_ID=a9b055430078] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-07 11:58:28 --> [REQ_ID=92a7318fd02d] [FILTER_AFTER]
DEBUG - 2026-03-07 11:58:28 --> [REQ_ID=92a7318fd02d] [LIFECYCLE][END] status=200 duration_ms=106.80 memory_delta=0
INFO - 2026-03-07 11:58:28 --> [REQ_ID=a9b055430078] [PERF] Execution time=0.105623
DEBUG - 2026-03-07 11:58:28 --> [REQ_ID=92a7318fd02d] [REQUEST][END]
INFO - 2026-03-07 11:58:28 --> [REQ_ID=92a7318fd02d] [PERF] Execution time=0.118918
INFO - 2026-03-07 12:00:01 --> [SPARK_START] App\Commands\AIOps\Run
INFO - 2026-03-07 12:00:01 --> [SPARK_MEMORY] 16777216
INFO - 2026-03-07 12:00:01 --> [spark:aiops:run] Intent
INFO - 2026-03-07 12:00:01 --> [spark:ops:work] Started
INFO - 2026-03-07 12:00:01 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-03-07 12:00:01 --> [SPARK_MEMORY] 16777216
INFO - 2026-03-07 12:00:01 --> [spark:ops:work] Intent
DEBUG - 2026-03-07 12:00:01 --> [REQ_ID=d5447a57609b] [REQUEST][START] GET /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-07 12:00:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-07 12:00:01 --> [REQ_ID=d5447a57609b] [FILTER_BEFORE] /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-07 12:00:01 --> [REQ_ID=d5447a57609b] [ROUTE] Controller=\App\Modules\Management\Controllers\ManagementAPIController Method=Run_CRON_Tasks
DEBUG - 2026-03-07 12:00:01 --> [REQ_ID=d5447a57609b] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-07 12:00:01 --> [REQ_ID=d5447a57609b] [REQUEST][END]
INFO - 2026-03-07 12:00:01 --> [REQ_ID=d5447a57609b] [PERF] Execution time=0.059595
INFO - 2026-03-07 12:00:01 --> [spark:ops:work] Completed
INFO - 2026-03-07 12:00:01 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.154344
INFO - 2026-03-07 12:00:01 --> [SPARK_MEMORY] 18874368
INFO - 2026-03-07 12:00:02 --> [AIOPS][SPARK][GOVERNANCE][spark:logs:summarize] Started
INFO - 2026-03-07 12:00:02 --> [SPARK_START] App\Commands\Logs\Summarize
INFO - 2026-03-07 12:00:02 --> [SPARK_MEMORY] 16777216
INFO - 2026-03-07 12:00:02 --> [spark:logs:summarize] Intent
INFO - 2026-03-07 12:00:02 --> [AIOPS][SPARK][GOVERNANCE][spark:logs:summarize] Completed
INFO - 2026-03-07 12:00:02 --> [SPARK_COMPLETE] App\Commands\Logs\Summarize duration=0.014105
INFO - 2026-03-07 12:00:02 --> [SPARK_MEMORY] 18874368
INFO - 2026-03-07 12:00:03 --> [spark:app:healthcheck] Started
INFO - 2026-03-07 12:00:03 --> [SPARK_START] App\Commands\App\Healthcheck
INFO - 2026-03-07 12:00:03 --> [SPARK_MEMORY] 16777216
INFO - 2026-03-07 12:00:03 --> [spark:app:healthcheck] Intent
DEBUG - 2026-03-07 12:00:03 --> LOG_HEALTHCHECK debug marker=3f5540e0942c
INFO - 2026-03-07 12:00:03 --> LOG_HEALTHCHECK info marker=3f5540e0942c
NOTICE - 2026-03-07 12:00:03 --> LOG_HEALTHCHECK probe marker=3f5540e0942c
INFO - 2026-03-07 12:00:03 --> [spark:app:healthcheck] Completed
INFO - 2026-03-07 12:00:03 --> [SPARK_COMPLETE] App\Commands\App\Healthcheck duration=0.049326
INFO - 2026-03-07 12:00:03 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-03-07 12:00:04 --> OllamaPatchRunner:L142 - validateGeneratedPatch Content: 
WARNING - 2026-03-07 12:00:04 --> OllamaPatchRunner:L49 - Original Diff: 
DEBUG - 2026-03-07 12:00:05 --> OllamaPatchRunner:L51 - Retried Diff: 
DEBUG - 2026-03-07 12:00:05 --> OllamaPatchRunner:L142 - validateGeneratedPatch Content: 
DEBUG - 2026-03-07 12:00:05 --> OllamaPatchRunner:L53 - Validating Generated Patch Failed
INFO - 2026-03-07 12:00:05 --> [SPARK_COMPLETE] App\Commands\AIOps\Run duration=3.800705
INFO - 2026-03-07 12:00:05 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-03-07 12:01:18 --> [REQ_ID=12c88feb396d] [REQUEST][START] HEAD /
DEBUG - 2026-03-07 12:01:18 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-07 12:01:18 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-07 12:01:18 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-07 12:01:18 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-07 12:01:18 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-07 12:04:46 --> [REQ_ID=963e6718f53b] [REQUEST][START] GET /index.php/Budget/Financial-Institute
DEBUG - 2026-03-07 12:04:46 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-07 12:04:46 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: GET, Route: Budget/Financial-Institute]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-07 12:04:46 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-07 12:04:46 --> [404] URI=https://www.mymiwallet.com/index.php/Budget/Financial-Institute
WARNING - 2026-03-07 12:04:46 --> 404 route miss: https://www.mymiwallet.com/index.php/Budget/Financial-Institute | referrer: none
DEBUG - 2026-03-07 12:06:18 --> [REQ_ID=980d6250a199] [REQUEST][START] HEAD /
DEBUG - 2026-03-07 12:06:18 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-07 12:06:18 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-07 12:06:18 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-07 12:06:18 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-07 12:06:18 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-07 12:11:18 --> [REQ_ID=7d697fb297c3] [REQUEST][START] HEAD /
DEBUG - 2026-03-07 12:11:18 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-07 12:11:18 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-07 12:11:18 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-07 12:11:18 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-07 12:11:18 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
CRITICAL - 2026-03-07 12:13:07 --> ErrorException: Cannot declare class App\Modules\Ops\Controllers\OpsManagementController, because the name is already in use
[Method: CLI, Route: routes:repair]
in APPPATH/Modules/Ops/Controllers/OpsManagementController.php on line 15.
 1 [internal function]: CodeIgniter\Debug\Exceptions->shutdownHandler()
CRITICAL - 2026-03-07 12:13:08 --> [EXCEPTION] Cannot declare class App\Modules\Ops\Controllers\OpsManagementController, because the name is already in use File=/home/mymiteam/mymiwallet/site/current/app/Modules/Ops/Controllers/OpsManagementController.php Line=15
INFO - 2026-03-07 12:15:02 --> [spark:ops:work] Started
INFO - 2026-03-07 12:15:02 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-03-07 12:15:02 --> [SPARK_MEMORY] 16777216
INFO - 2026-03-07 12:15:02 --> [spark:ops:work] Intent
INFO - 2026-03-07 12:15:02 --> [spark:ops:work] Completed
INFO - 2026-03-07 12:15:02 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.040847
INFO - 2026-03-07 12:15:02 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-03-07 12:15:02 --> [REQ_ID=cee9a64b964f] [REQUEST][START] GET /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-07 12:15:02 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-07 12:15:02 --> [REQ_ID=cee9a64b964f] [FILTER_BEFORE] /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-07 12:15:02 --> [REQ_ID=cee9a64b964f] [ROUTE] Controller=\App\Modules\APIs\Controllers\AlertsAPIController Method=fetchEmailAlerts
DEBUG - 2026-03-07 12:15:02 --> [REQ_ID=cee9a64b964f] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-07 12:15:02 --> [REQ_ID=cee9a64b964f] [REQUEST][END]
INFO - 2026-03-07 12:15:02 --> [REQ_ID=cee9a64b964f] [PERF] Execution time=0.044172
DEBUG - 2026-03-07 12:16:18 --> [REQ_ID=11dd9f3cd5d2] [REQUEST][START] HEAD /
DEBUG - 2026-03-07 12:16:18 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-07 12:16:18 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-07 12:16:19 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-07 12:16:19 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-07 12:16:19 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
CRITICAL - 2026-03-07 12:16:57 --> ErrorException: Cannot declare class App\Controllers\OpsHealth, because the name is already in use
[Method: CLI, Route: routes:repair]
in APPPATH/Controllers/OpsHealth.php on line 11.
 1 [internal function]: CodeIgniter\Debug\Exceptions->shutdownHandler()
CRITICAL - 2026-03-07 12:16:57 --> [EXCEPTION] Cannot declare class App\Controllers\OpsHealth, because the name is already in use File=/home/mymiteam/mymiwallet/site/current/app/Controllers/OpsHealth.php Line=11
DEBUG - 2026-03-07 12:21:18 --> [REQ_ID=f0d8f70d5cf0] [REQUEST][START] HEAD /
DEBUG - 2026-03-07 12:21:18 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-07 12:21:18 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-07 12:21:18 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-07 12:21:18 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-07 12:21:18 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
CRITICAL - 2026-03-07 12:21:44 --> ErrorException: Cannot declare class App\Controllers\OpsHealthController, because the name is already in use
[Method: CLI, Route: routes:repair]
in APPPATH/Controllers/OpsHealthController.php on line 12.
 1 [internal function]: CodeIgniter\Debug\Exceptions->shutdownHandler()
CRITICAL - 2026-03-07 12:21:44 --> [EXCEPTION] Cannot declare class App\Controllers\OpsHealthController, because the name is already in use File=/home/mymiteam/mymiwallet/site/current/app/Controllers/OpsHealthController.php Line=12
DEBUG - 2026-03-07 12:25:22 --> [REQ_ID=7c38e5be9c0c] [REQUEST][START] GET /index.php/Support
DEBUG - 2026-03-07 12:25:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-07 12:25:22 --> [REQ_ID=7c38e5be9c0c] [FILTER_BEFORE] /index.php/Support
DEBUG - 2026-03-07 12:25:22 --> [REQ_ID=7c38e5be9c0c] [ROUTE] Controller=\App\Modules\Support\Controllers\SupportController Method=index
DEBUG - 2026-03-07 12:25:22 --> [REQ_ID=7c38e5be9c0c] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Support
DEBUG - 2026-03-07 12:25:22 --> [CSRF] token name=csrf_test_name hash=e6419d4c9b8dc177a7e8554e51496e5f
DEBUG - 2026-03-07 12:25:22 --> [REQ_ID=1519a6442167] [INIT] App\Modules\Support\Controllers\SupportController::GET
INFO - 2026-03-07 12:25:22 --> [REQ_ID=1519a6442167] [MEMORY][controller-start] 6291456
DEBUG - 2026-03-07 12:25:22 --> [REQ_ID=1519a6442167] [METHOD_ENTRY] index
DEBUG - 2026-03-07 12:25:23 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-07 12:25:23 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-07 12:25:23 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-07 12:25:23 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-07 12:25:23 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-07 12:25:23 --> MyMICoin: guest context detected; skipping user-specific preload.
INFO - 2026-03-07 12:25:23 --> [REQ_ID=1519a6442167] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-07 12:25:23 --> [REQ_ID=1519a6442167] [VIEW_RENDER] SupportModule\Views\Support\index
INFO - 2026-03-07 12:25:23 --> [REQ_ID=1519a6442167] [MEMORY][commonData:start] 6291456
INFO - 2026-03-07 12:25:23 --> themesMemory usage: 6291456
DEBUG - 2026-03-07 12:25:23 --> [REQ_ID=7c38e5be9c0c] [FILTER_AFTER]
DEBUG - 2026-03-07 12:25:23 --> [REQ_ID=7c38e5be9c0c] [LIFECYCLE][END] status=200 duration_ms=183.10 memory_delta=0
INFO - 2026-03-07 12:25:23 --> [REQ_ID=1519a6442167] [PERF] Execution time=0.181145
DEBUG - 2026-03-07 12:25:23 --> [REQ_ID=7c38e5be9c0c] [REQUEST][END]
INFO - 2026-03-07 12:25:23 --> [REQ_ID=7c38e5be9c0c] [PERF] Execution time=0.225856
DEBUG - 2026-03-07 12:26:18 --> [REQ_ID=0867943756c3] [REQUEST][START] HEAD /
DEBUG - 2026-03-07 12:26:18 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-07 12:26:18 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-07 12:26:18 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-07 12:26:18 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-07 12:26:18 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-07 12:27:01 --> [REQ_ID=a84bfbb6a19c] [REQUEST][START] GET /
DEBUG - 2026-03-07 12:27:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-07 12:27:01 --> [REQ_ID=a84bfbb6a19c] [FILTER_BEFORE] /
DEBUG - 2026-03-07 12:27:01 --> [REQ_ID=a84bfbb6a19c] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-07 12:27:01 --> [REQ_ID=a84bfbb6a19c] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-07 12:27:01 --> [CSRF] token name=csrf_test_name hash=2937e0e744251ba81f8f666c3336b4b4
DEBUG - 2026-03-07 12:27:01 --> [REQ_ID=f68f026107bf] [INIT] App\Controllers\Home::GET
INFO - 2026-03-07 12:27:01 --> [REQ_ID=f68f026107bf] [MEMORY][controller-start] 4194304
INFO - 2026-03-07 12:27:01 --> [REQ_ID=f68f026107bf] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-07 12:27:01 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-07 12:27:01 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-03-07 12:27:01 --> [REQ_ID=f68f026107bf] [VIEW_RENDER] themes/public/home
INFO - 2026-03-07 12:27:01 --> [REQ_ID=f68f026107bf] [MEMORY][commonData:start] 8388608
INFO - 2026-03-07 12:27:01 --> themesMemory usage: 8388608
DEBUG - 2026-03-07 12:27:01 --> [MetaService] slug= pageName=Home cacheHit= path=DB
DEBUG - 2026-03-07 12:27:02 --> [REQ_ID=a84bfbb6a19c] [FILTER_AFTER]
DEBUG - 2026-03-07 12:27:02 --> [REQ_ID=a84bfbb6a19c] [LIFECYCLE][END] status=200 duration_ms=556.13 memory_delta=4194304
INFO - 2026-03-07 12:27:02 --> [REQ_ID=f68f026107bf] [PERF] Execution time=0.555727
DEBUG - 2026-03-07 12:27:02 --> [REQ_ID=a84bfbb6a19c] [REQUEST][END]
INFO - 2026-03-07 12:27:02 --> [REQ_ID=a84bfbb6a19c] [PERF] Execution time=0.567261
DEBUG - 2026-03-07 12:27:40 --> [REQ_ID=072b5ba4c704] [REQUEST][START] GET /
DEBUG - 2026-03-07 12:27:40 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-07 12:27:40 --> [REQ_ID=072b5ba4c704] [FILTER_BEFORE] /
DEBUG - 2026-03-07 12:27:40 --> [REQ_ID=072b5ba4c704] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-07 12:27:40 --> [REQ_ID=072b5ba4c704] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-07 12:27:40 --> [CSRF] token name=csrf_test_name hash=6b3a4cb7c7ab6b70e5db4a0171dc9338
DEBUG - 2026-03-07 12:27:40 --> [REQ_ID=75f5ad5312cb] [INIT] App\Controllers\Home::GET
INFO - 2026-03-07 12:27:40 --> [REQ_ID=75f5ad5312cb] [MEMORY][controller-start] 6291456
INFO - 2026-03-07 12:27:40 --> [REQ_ID=75f5ad5312cb] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-07 12:27:40 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-07 12:27:40 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
DEBUG - 2026-03-07 12:27:40 --> [REQ_ID=75f5ad5312cb] [VIEW_RENDER] themes/public/home
INFO - 2026-03-07 12:27:40 --> [REQ_ID=75f5ad5312cb] [MEMORY][commonData:start] 8388608
INFO - 2026-03-07 12:27:40 --> themesMemory usage: 8388608
DEBUG - 2026-03-07 12:27:40 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-07 12:27:40 --> [REQ_ID=072b5ba4c704] [FILTER_AFTER]
DEBUG - 2026-03-07 12:27:40 --> [REQ_ID=072b5ba4c704] [LIFECYCLE][END] status=200 duration_ms=549.85 memory_delta=2097152
INFO - 2026-03-07 12:27:40 --> [REQ_ID=75f5ad5312cb] [PERF] Execution time=0.549532
DEBUG - 2026-03-07 12:27:40 --> [REQ_ID=072b5ba4c704] [REQUEST][END]
INFO - 2026-03-07 12:27:40 --> [REQ_ID=072b5ba4c704] [PERF] Execution time=0.560719
DEBUG - 2026-03-07 12:28:00 --> [REQ_ID=e1d7e2c79858] [REQUEST][START] GET /
DEBUG - 2026-03-07 12:28:00 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-07 12:28:00 --> [REQ_ID=e1d7e2c79858] [FILTER_BEFORE] /
DEBUG - 2026-03-07 12:28:00 --> [REQ_ID=e1d7e2c79858] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-07 12:28:00 --> [REQ_ID=e1d7e2c79858] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-07 12:28:00 --> [CSRF] token name=csrf_test_name hash=58795bdae824fca133964e269c452ae8
DEBUG - 2026-03-07 12:28:00 --> [REQ_ID=762327626737] [INIT] App\Controllers\Home::GET
INFO - 2026-03-07 12:28:00 --> [REQ_ID=762327626737] [MEMORY][controller-start] 6291456
INFO - 2026-03-07 12:28:00 --> [REQ_ID=762327626737] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-07 12:28:00 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-07 12:28:01 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
DEBUG - 2026-03-07 12:28:01 --> [REQ_ID=762327626737] [VIEW_RENDER] themes/public/home
INFO - 2026-03-07 12:28:01 --> [REQ_ID=762327626737] [MEMORY][commonData:start] 8388608
INFO - 2026-03-07 12:28:01 --> themesMemory usage: 8388608
DEBUG - 2026-03-07 12:28:01 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-07 12:28:01 --> [REQ_ID=e1d7e2c79858] [FILTER_AFTER]
DEBUG - 2026-03-07 12:28:01 --> [REQ_ID=e1d7e2c79858] [LIFECYCLE][END] status=200 duration_ms=610.20 memory_delta=2097152
INFO - 2026-03-07 12:28:01 --> [REQ_ID=762327626737] [PERF] Execution time=0.609470
DEBUG - 2026-03-07 12:28:01 --> [REQ_ID=e1d7e2c79858] [REQUEST][END]
INFO - 2026-03-07 12:28:01 --> [REQ_ID=e1d7e2c79858] [PERF] Execution time=0.620487
DEBUG - 2026-03-07 12:29:26 --> [REQ_ID=368d70541a28] [REQUEST][START] GET /
DEBUG - 2026-03-07 12:29:26 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-07 12:29:26 --> [REQ_ID=368d70541a28] [FILTER_BEFORE] /
DEBUG - 2026-03-07 12:29:26 --> [REQ_ID=368d70541a28] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-07 12:29:26 --> [REQ_ID=368d70541a28] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-07 12:29:26 --> [CSRF] token name=csrf_test_name hash=a50596fbdea87d2b88b9bee854934393
DEBUG - 2026-03-07 12:29:26 --> [REQ_ID=811a04be84c8] [INIT] App\Controllers\Home::GET
INFO - 2026-03-07 12:29:26 --> [REQ_ID=811a04be84c8] [MEMORY][controller-start] 6291456
INFO - 2026-03-07 12:29:26 --> [REQ_ID=811a04be84c8] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-07 12:29:26 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-07 12:29:26 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
DEBUG - 2026-03-07 12:29:26 --> [REQ_ID=811a04be84c8] [VIEW_RENDER] themes/public/home
INFO - 2026-03-07 12:29:26 --> [REQ_ID=811a04be84c8] [MEMORY][commonData:start] 10485760
INFO - 2026-03-07 12:29:26 --> themesMemory usage: 10485760
DEBUG - 2026-03-07 12:29:26 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-07 12:29:26 --> [REQ_ID=368d70541a28] [FILTER_AFTER]
DEBUG - 2026-03-07 12:29:26 --> [REQ_ID=368d70541a28] [LIFECYCLE][END] status=200 duration_ms=661.65 memory_delta=4194304
INFO - 2026-03-07 12:29:26 --> [REQ_ID=811a04be84c8] [PERF] Execution time=0.659497
DEBUG - 2026-03-07 12:29:26 --> [REQ_ID=368d70541a28] [REQUEST][END]
INFO - 2026-03-07 12:29:26 --> [REQ_ID=368d70541a28] [PERF] Execution time=0.700849
DEBUG - 2026-03-07 12:29:51 --> [REQ_ID=9a8076b713d3] [REQUEST][START] GET /
DEBUG - 2026-03-07 12:29:51 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-07 12:29:51 --> [REQ_ID=9a8076b713d3] [FILTER_BEFORE] /
DEBUG - 2026-03-07 12:29:51 --> [REQ_ID=9a8076b713d3] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-07 12:29:51 --> [REQ_ID=9a8076b713d3] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-07 12:29:51 --> [CSRF] token name=csrf_test_name hash=c31d74a81e410f3c6b509e5ea65e5165
DEBUG - 2026-03-07 12:29:51 --> [REQ_ID=3c2e8c66705a] [INIT] App\Controllers\Home::GET
INFO - 2026-03-07 12:29:51 --> [REQ_ID=3c2e8c66705a] [MEMORY][controller-start] 6291456
INFO - 2026-03-07 12:29:51 --> [REQ_ID=3c2e8c66705a] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-07 12:29:51 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-07 12:29:52 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
DEBUG - 2026-03-07 12:29:52 --> [REQ_ID=3c2e8c66705a] [VIEW_RENDER] themes/public/home
INFO - 2026-03-07 12:29:52 --> [REQ_ID=3c2e8c66705a] [MEMORY][commonData:start] 8388608
INFO - 2026-03-07 12:29:52 --> themesMemory usage: 8388608
DEBUG - 2026-03-07 12:29:52 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-07 12:29:52 --> [REQ_ID=9a8076b713d3] [FILTER_AFTER]
DEBUG - 2026-03-07 12:29:52 --> [REQ_ID=9a8076b713d3] [LIFECYCLE][END] status=200 duration_ms=550.53 memory_delta=2097152
INFO - 2026-03-07 12:29:52 --> [REQ_ID=3c2e8c66705a] [PERF] Execution time=0.550000
DEBUG - 2026-03-07 12:29:52 --> [REQ_ID=9a8076b713d3] [REQUEST][END]
INFO - 2026-03-07 12:29:52 --> [REQ_ID=9a8076b713d3] [PERF] Execution time=0.559856
INFO - 2026-03-07 12:30:01 --> [spark:ops:work] Started
INFO - 2026-03-07 12:30:01 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-03-07 12:30:01 --> [SPARK_MEMORY] 16777216
INFO - 2026-03-07 12:30:01 --> [spark:ops:work] Intent
INFO - 2026-03-07 12:30:01 --> [spark:ops:work] Completed
INFO - 2026-03-07 12:30:01 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.138939
INFO - 2026-03-07 12:30:01 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-03-07 12:30:17 --> [REQ_ID=48de99e99c5f] [REQUEST][START] GET /
DEBUG - 2026-03-07 12:30:17 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-07 12:30:17 --> [REQ_ID=48de99e99c5f] [FILTER_BEFORE] /
DEBUG - 2026-03-07 12:30:17 --> [REQ_ID=48de99e99c5f] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-07 12:30:17 --> [REQ_ID=48de99e99c5f] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-07 12:30:17 --> [CSRF] token name=csrf_test_name hash=9cbaab0c795a45b45638dff5978b96bb
DEBUG - 2026-03-07 12:30:17 --> [REQ_ID=f5ee26099481] [INIT] App\Controllers\Home::GET
INFO - 2026-03-07 12:30:17 --> [REQ_ID=f5ee26099481] [MEMORY][controller-start] 6291456
INFO - 2026-03-07 12:30:17 --> [REQ_ID=f5ee26099481] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-07 12:30:17 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-07 12:30:18 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
DEBUG - 2026-03-07 12:30:18 --> [REQ_ID=f5ee26099481] [VIEW_RENDER] themes/public/home
INFO - 2026-03-07 12:30:18 --> [REQ_ID=f5ee26099481] [MEMORY][commonData:start] 8388608
INFO - 2026-03-07 12:30:18 --> themesMemory usage: 8388608
DEBUG - 2026-03-07 12:30:18 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-07 12:30:18 --> [REQ_ID=48de99e99c5f] [FILTER_AFTER]
DEBUG - 2026-03-07 12:30:18 --> [REQ_ID=48de99e99c5f] [LIFECYCLE][END] status=200 duration_ms=520.73 memory_delta=2097152
INFO - 2026-03-07 12:30:18 --> [REQ_ID=f5ee26099481] [PERF] Execution time=0.520466
DEBUG - 2026-03-07 12:30:18 --> [REQ_ID=48de99e99c5f] [REQUEST][END]
INFO - 2026-03-07 12:30:18 --> [REQ_ID=48de99e99c5f] [PERF] Execution time=0.529825
DEBUG - 2026-03-07 12:31:18 --> [REQ_ID=986e90319206] [REQUEST][START] HEAD /
DEBUG - 2026-03-07 12:31:18 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-07 12:31:18 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-07 12:31:18 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-07 12:31:18 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-07 12:31:18 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-07 12:32:08 --> [REQ_ID=d9cdb9ff356c] [REQUEST][START] GET /
DEBUG - 2026-03-07 12:32:08 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-07 12:32:08 --> [REQ_ID=d9cdb9ff356c] [FILTER_BEFORE] /
DEBUG - 2026-03-07 12:32:08 --> [REQ_ID=d9cdb9ff356c] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-07 12:32:08 --> [REQ_ID=d9cdb9ff356c] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-07 12:32:08 --> [CSRF] token name=csrf_test_name hash=281776ce9c7f4a0f58dda2e62e5d87c1
DEBUG - 2026-03-07 12:32:08 --> [REQ_ID=ecc3e7e3929c] [INIT] App\Controllers\Home::GET
INFO - 2026-03-07 12:32:08 --> [REQ_ID=ecc3e7e3929c] [MEMORY][controller-start] 4194304
INFO - 2026-03-07 12:32:08 --> [REQ_ID=ecc3e7e3929c] [MEMORY][commonData:start] 4194304
DEBUG - 2026-03-07 12:32:08 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-07 12:32:09 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
DEBUG - 2026-03-07 12:32:09 --> [REQ_ID=ecc3e7e3929c] [VIEW_RENDER] themes/public/home
INFO - 2026-03-07 12:32:09 --> [REQ_ID=ecc3e7e3929c] [MEMORY][commonData:start] 8388608
INFO - 2026-03-07 12:32:09 --> themesMemory usage: 8388608
DEBUG - 2026-03-07 12:32:09 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-07 12:32:09 --> [REQ_ID=d9cdb9ff356c] [FILTER_AFTER]
DEBUG - 2026-03-07 12:32:09 --> [REQ_ID=d9cdb9ff356c] [LIFECYCLE][END] status=200 duration_ms=513.01 memory_delta=4194304
INFO - 2026-03-07 12:32:09 --> [REQ_ID=ecc3e7e3929c] [PERF] Execution time=0.512163
DEBUG - 2026-03-07 12:32:09 --> [REQ_ID=d9cdb9ff356c] [REQUEST][END]
INFO - 2026-03-07 12:32:09 --> [REQ_ID=d9cdb9ff356c] [PERF] Execution time=0.523585
DEBUG - 2026-03-07 12:32:09 --> [REQ_ID=8d5f4f27df5b] [REQUEST][START] GET /
DEBUG - 2026-03-07 12:32:09 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-07 12:32:09 --> [REQ_ID=8d5f4f27df5b] [FILTER_BEFORE] /
DEBUG - 2026-03-07 12:32:09 --> [REQ_ID=8d5f4f27df5b] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-07 12:32:09 --> [REQ_ID=8d5f4f27df5b] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-07 12:32:09 --> [CSRF] token name=csrf_test_name hash=b2d04ff8bdd54df74d64f2ae278f5f30
DEBUG - 2026-03-07 12:32:09 --> [REQ_ID=21c02d0cdae2] [INIT] App\Controllers\Home::GET
INFO - 2026-03-07 12:32:09 --> [REQ_ID=21c02d0cdae2] [MEMORY][controller-start] 6291456
INFO - 2026-03-07 12:32:09 --> [REQ_ID=21c02d0cdae2] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-07 12:32:09 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-07 12:32:10 --> [REQ_ID=81e650a6a1f7] [REQUEST][START] GET /
DEBUG - 2026-03-07 12:32:10 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-07 12:32:10 --> [REQ_ID=81e650a6a1f7] [FILTER_BEFORE] /
DEBUG - 2026-03-07 12:32:10 --> [REQ_ID=81e650a6a1f7] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-07 12:32:10 --> [REQ_ID=81e650a6a1f7] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-07 12:32:10 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
DEBUG - 2026-03-07 12:32:10 --> [REQ_ID=21c02d0cdae2] [VIEW_RENDER] themes/public/home
INFO - 2026-03-07 12:32:10 --> [REQ_ID=21c02d0cdae2] [MEMORY][commonData:start] 8388608
INFO - 2026-03-07 12:32:10 --> themesMemory usage: 8388608
DEBUG - 2026-03-07 12:32:10 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-07 12:32:10 --> [CSRF] token name=csrf_test_name hash=a1bbf4941ea469f334ee88ea206e65a4
DEBUG - 2026-03-07 12:32:10 --> [REQ_ID=b63e040173af] [INIT] App\Controllers\Home::GET
INFO - 2026-03-07 12:32:10 --> [REQ_ID=b63e040173af] [MEMORY][controller-start] 6291456
DEBUG - 2026-03-07 12:32:10 --> [REQ_ID=8d5f4f27df5b] [FILTER_AFTER]
DEBUG - 2026-03-07 12:32:10 --> [REQ_ID=8d5f4f27df5b] [LIFECYCLE][END] status=200 duration_ms=620.35 memory_delta=2097152
INFO - 2026-03-07 12:32:10 --> [REQ_ID=21c02d0cdae2] [PERF] Execution time=0.619226
DEBUG - 2026-03-07 12:32:10 --> [REQ_ID=8d5f4f27df5b] [REQUEST][END]
INFO - 2026-03-07 12:32:10 --> [REQ_ID=8d5f4f27df5b] [PERF] Execution time=0.629857
INFO - 2026-03-07 12:32:10 --> [REQ_ID=b63e040173af] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-07 12:32:10 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-07 12:32:11 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
DEBUG - 2026-03-07 12:32:11 --> [REQ_ID=b63e040173af] [VIEW_RENDER] themes/public/home
INFO - 2026-03-07 12:32:11 --> [REQ_ID=b63e040173af] [MEMORY][commonData:start] 10485760
INFO - 2026-03-07 12:32:11 --> themesMemory usage: 10485760
DEBUG - 2026-03-07 12:32:11 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-07 12:32:11 --> [REQ_ID=81e650a6a1f7] [FILTER_AFTER]
DEBUG - 2026-03-07 12:32:11 --> [REQ_ID=81e650a6a1f7] [LIFECYCLE][END] status=200 duration_ms=575.95 memory_delta=4194304
INFO - 2026-03-07 12:32:11 --> [REQ_ID=b63e040173af] [PERF] Execution time=0.571391
DEBUG - 2026-03-07 12:32:11 --> [REQ_ID=81e650a6a1f7] [REQUEST][END]
INFO - 2026-03-07 12:32:11 --> [REQ_ID=81e650a6a1f7] [PERF] Execution time=0.614527
DEBUG - 2026-03-07 12:33:42 --> [REQ_ID=693d6132f0a5] [REQUEST][START] GET /index.php/Budget/Financial-Forecaster
DEBUG - 2026-03-07 12:33:42 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-07 12:33:42 --> [REQ_ID=693d6132f0a5] [FILTER_BEFORE] /index.php/Budget/Financial-Forecaster
DEBUG - 2026-03-07 12:33:42 --> [REQ_ID=693d6132f0a5] [ROUTE] Controller=\App\Modules\User\Controllers\BudgetController Method=financialForecaster
DEBUG - 2026-03-07 12:33:42 --> [REQ_ID=693d6132f0a5] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Budget/Financial-Forecaster
DEBUG - 2026-03-07 12:33:42 --> [CSRF] token name=csrf_test_name hash=89daebe54c8c5a5321695a558b354d21
DEBUG - 2026-03-07 12:33:42 --> [REQ_ID=693d6132f0a5] [REQUEST][END]
INFO - 2026-03-07 12:33:42 --> [REQ_ID=693d6132f0a5] [PERF] Execution time=0.017908
DEBUG - 2026-03-07 12:33:43 --> [REQ_ID=251b984d2370] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-07 12:33:43 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-07 12:33:43 --> [REQ_ID=251b984d2370] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-07 12:33:43 --> [REQ_ID=251b984d2370] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-07 12:33:43 --> [REQ_ID=251b984d2370] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-07 12:33:43 --> [CSRF] token name=csrf_test_name hash=206a62e930000def3b7e49dbc2de83aa
DEBUG - 2026-03-07 12:33:43 --> [REQ_ID=85736370346c] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-07 12:33:43 --> [REQ_ID=85736370346c] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-07 12:33:43 --> [REQ_ID=251b984d2370] [FILTER_AFTER]
DEBUG - 2026-03-07 12:33:43 --> [REQ_ID=251b984d2370] [LIFECYCLE][END] status=200 duration_ms=334.46 memory_delta=0
INFO - 2026-03-07 12:33:43 --> [REQ_ID=85736370346c] [PERF] Execution time=0.334149
DEBUG - 2026-03-07 12:33:43 --> [REQ_ID=251b984d2370] [REQUEST][END]
INFO - 2026-03-07 12:33:43 --> [REQ_ID=251b984d2370] [PERF] Execution time=0.345726
DEBUG - 2026-03-07 12:33:50 --> [REQ_ID=b73e678ed30c] [REQUEST][START] GET /
DEBUG - 2026-03-07 12:33:50 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-07 12:33:50 --> [REQ_ID=b73e678ed30c] [FILTER_BEFORE] /
DEBUG - 2026-03-07 12:33:50 --> [REQ_ID=b73e678ed30c] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-07 12:33:50 --> [REQ_ID=b73e678ed30c] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-07 12:33:50 --> [CSRF] token name=csrf_test_name hash=9c523ead91ef400c660c6edad1adb3d1
DEBUG - 2026-03-07 12:33:50 --> [REQ_ID=e9952a003124] [INIT] App\Controllers\Home::GET
INFO - 2026-03-07 12:33:50 --> [REQ_ID=e9952a003124] [MEMORY][controller-start] 4194304
INFO - 2026-03-07 12:33:50 --> [REQ_ID=e9952a003124] [MEMORY][commonData:start] 4194304
DEBUG - 2026-03-07 12:33:50 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-07 12:33:50 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
DEBUG - 2026-03-07 12:33:50 --> [REQ_ID=e9952a003124] [VIEW_RENDER] themes/public/home
INFO - 2026-03-07 12:33:50 --> [REQ_ID=e9952a003124] [MEMORY][commonData:start] 8388608
INFO - 2026-03-07 12:33:50 --> themesMemory usage: 8388608
DEBUG - 2026-03-07 12:33:50 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-07 12:33:50 --> [REQ_ID=b73e678ed30c] [FILTER_AFTER]
DEBUG - 2026-03-07 12:33:50 --> [REQ_ID=b73e678ed30c] [LIFECYCLE][END] status=200 duration_ms=595.01 memory_delta=4194304
INFO - 2026-03-07 12:33:50 --> [REQ_ID=e9952a003124] [PERF] Execution time=0.594159
DEBUG - 2026-03-07 12:33:50 --> [REQ_ID=b73e678ed30c] [REQUEST][END]
INFO - 2026-03-07 12:33:50 --> [REQ_ID=b73e678ed30c] [PERF] Execution time=0.605945
DEBUG - 2026-03-07 12:34:21 --> [REQ_ID=cf1a2e84e96d] [REQUEST][START] GET /
DEBUG - 2026-03-07 12:34:21 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-07 12:34:21 --> [REQ_ID=cf1a2e84e96d] [FILTER_BEFORE] /
DEBUG - 2026-03-07 12:34:21 --> [REQ_ID=cf1a2e84e96d] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-07 12:34:21 --> [REQ_ID=cf1a2e84e96d] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-07 12:34:21 --> [CSRF] token name=csrf_test_name hash=b9ee6f59a5c24c6fbb00a99171f30f9e
DEBUG - 2026-03-07 12:34:21 --> [REQ_ID=a49deb4ebdf2] [INIT] App\Controllers\Home::GET
INFO - 2026-03-07 12:34:21 --> [REQ_ID=a49deb4ebdf2] [MEMORY][controller-start] 6291456
INFO - 2026-03-07 12:34:21 --> [REQ_ID=a49deb4ebdf2] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-07 12:34:21 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-07 12:34:22 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
DEBUG - 2026-03-07 12:34:22 --> [REQ_ID=a49deb4ebdf2] [VIEW_RENDER] themes/public/home
INFO - 2026-03-07 12:34:22 --> [REQ_ID=a49deb4ebdf2] [MEMORY][commonData:start] 8388608
INFO - 2026-03-07 12:34:22 --> themesMemory usage: 8388608
DEBUG - 2026-03-07 12:34:22 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-07 12:34:22 --> [REQ_ID=cf1a2e84e96d] [FILTER_AFTER]
DEBUG - 2026-03-07 12:34:22 --> [REQ_ID=cf1a2e84e96d] [LIFECYCLE][END] status=200 duration_ms=538.87 memory_delta=2097152
INFO - 2026-03-07 12:34:22 --> [REQ_ID=a49deb4ebdf2] [PERF] Execution time=0.538283
DEBUG - 2026-03-07 12:34:22 --> [REQ_ID=cf1a2e84e96d] [REQUEST][END]
INFO - 2026-03-07 12:34:22 --> [REQ_ID=cf1a2e84e96d] [PERF] Execution time=0.548725
DEBUG - 2026-03-07 12:34:22 --> [REQ_ID=09e42157c945] [REQUEST][START] GET /
DEBUG - 2026-03-07 12:34:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-07 12:34:22 --> [REQ_ID=09e42157c945] [FILTER_BEFORE] /
DEBUG - 2026-03-07 12:34:22 --> [REQ_ID=09e42157c945] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-07 12:34:22 --> [REQ_ID=09e42157c945] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-07 12:34:22 --> [CSRF] token name=csrf_test_name hash=6975433c850ad39b8e0a747cebac8f27
DEBUG - 2026-03-07 12:34:22 --> [REQ_ID=397b0cf09f82] [INIT] App\Controllers\Home::GET
INFO - 2026-03-07 12:34:22 --> [REQ_ID=397b0cf09f82] [MEMORY][controller-start] 6291456
INFO - 2026-03-07 12:34:22 --> [REQ_ID=397b0cf09f82] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-07 12:34:22 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-07 12:34:22 --> [REQ_ID=6d2b4650fab4] [REQUEST][START] GET /
DEBUG - 2026-03-07 12:34:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-07 12:34:22 --> [REQ_ID=6d2b4650fab4] [FILTER_BEFORE] /
DEBUG - 2026-03-07 12:34:22 --> [REQ_ID=6d2b4650fab4] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-07 12:34:22 --> [REQ_ID=6d2b4650fab4] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-07 12:34:22 --> [CSRF] token name=csrf_test_name hash=e658dc33594ba4d45f49b35ec5c5be0e
DEBUG - 2026-03-07 12:34:22 --> [REQ_ID=75f568488188] [INIT] App\Controllers\Home::GET
INFO - 2026-03-07 12:34:22 --> [REQ_ID=75f568488188] [MEMORY][controller-start] 6291456
INFO - 2026-03-07 12:34:23 --> [REQ_ID=75f568488188] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-07 12:34:23 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-07 12:34:23 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
DEBUG - 2026-03-07 12:34:23 --> [REQ_ID=397b0cf09f82] [VIEW_RENDER] themes/public/home
INFO - 2026-03-07 12:34:23 --> [REQ_ID=397b0cf09f82] [MEMORY][commonData:start] 8388608
INFO - 2026-03-07 12:34:23 --> themesMemory usage: 8388608
DEBUG - 2026-03-07 12:34:23 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-07 12:34:23 --> [REQ_ID=09e42157c945] [FILTER_AFTER]
DEBUG - 2026-03-07 12:34:23 --> [REQ_ID=09e42157c945] [LIFECYCLE][END] status=200 duration_ms=532.96 memory_delta=2097152
INFO - 2026-03-07 12:34:23 --> [REQ_ID=397b0cf09f82] [PERF] Execution time=0.532387
DEBUG - 2026-03-07 12:34:23 --> [REQ_ID=09e42157c945] [REQUEST][END]
INFO - 2026-03-07 12:34:23 --> [REQ_ID=09e42157c945] [PERF] Execution time=0.544265
DEBUG - 2026-03-07 12:34:23 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
DEBUG - 2026-03-07 12:34:23 --> [REQ_ID=75f568488188] [VIEW_RENDER] themes/public/home
INFO - 2026-03-07 12:34:23 --> [REQ_ID=75f568488188] [MEMORY][commonData:start] 10485760
INFO - 2026-03-07 12:34:23 --> themesMemory usage: 10485760
DEBUG - 2026-03-07 12:34:23 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-07 12:34:23 --> [REQ_ID=6d2b4650fab4] [FILTER_AFTER]
DEBUG - 2026-03-07 12:34:23 --> [REQ_ID=6d2b4650fab4] [LIFECYCLE][END] status=200 duration_ms=551.37 memory_delta=4194304
INFO - 2026-03-07 12:34:23 --> [REQ_ID=75f568488188] [PERF] Execution time=0.548826
DEBUG - 2026-03-07 12:34:23 --> [REQ_ID=6d2b4650fab4] [REQUEST][END]
INFO - 2026-03-07 12:34:23 --> [REQ_ID=6d2b4650fab4] [PERF] Execution time=0.592744
DEBUG - 2026-03-07 12:34:39 --> [REQ_ID=f9c765db3a95] [REQUEST][START] GET /
DEBUG - 2026-03-07 12:34:39 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-07 12:34:39 --> [REQ_ID=f9c765db3a95] [FILTER_BEFORE] /
DEBUG - 2026-03-07 12:34:39 --> [REQ_ID=f9c765db3a95] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-07 12:34:39 --> [REQ_ID=f9c765db3a95] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-07 12:34:39 --> [CSRF] token name=csrf_test_name hash=6bafa97c1afcb4b096d71a34c4207522
DEBUG - 2026-03-07 12:34:39 --> [REQ_ID=ee90df5f2cc8] [INIT] App\Controllers\Home::GET
INFO - 2026-03-07 12:34:39 --> [REQ_ID=ee90df5f2cc8] [MEMORY][controller-start] 6291456
INFO - 2026-03-07 12:34:40 --> [REQ_ID=ee90df5f2cc8] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-07 12:34:40 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-07 12:34:40 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
DEBUG - 2026-03-07 12:34:40 --> [REQ_ID=ee90df5f2cc8] [VIEW_RENDER] themes/public/home
INFO - 2026-03-07 12:34:40 --> [REQ_ID=ee90df5f2cc8] [MEMORY][commonData:start] 8388608
INFO - 2026-03-07 12:34:40 --> themesMemory usage: 8388608
DEBUG - 2026-03-07 12:34:40 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-07 12:34:40 --> [REQ_ID=f9c765db3a95] [FILTER_AFTER]
DEBUG - 2026-03-07 12:34:40 --> [REQ_ID=f9c765db3a95] [LIFECYCLE][END] status=200 duration_ms=706.16 memory_delta=2097152
INFO - 2026-03-07 12:34:40 --> [REQ_ID=ee90df5f2cc8] [PERF] Execution time=0.705476
DEBUG - 2026-03-07 12:34:40 --> [REQ_ID=f9c765db3a95] [REQUEST][END]
INFO - 2026-03-07 12:34:40 --> [REQ_ID=f9c765db3a95] [PERF] Execution time=0.715922
DEBUG - 2026-03-07 12:36:18 --> [REQ_ID=cb769d5d968b] [REQUEST][START] HEAD /
DEBUG - 2026-03-07 12:36:18 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-07 12:36:18 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-07 12:36:18 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-07 12:36:18 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-07 12:36:18 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-07 12:37:47 --> [REQ_ID=a9cd5c34ba6b] [REQUEST][START] GET /
DEBUG - 2026-03-07 12:37:47 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-07 12:37:47 --> [REQ_ID=a9cd5c34ba6b] [FILTER_BEFORE] /
DEBUG - 2026-03-07 12:37:47 --> [REQ_ID=a9cd5c34ba6b] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-07 12:37:47 --> [REQ_ID=a9cd5c34ba6b] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-07 12:37:47 --> [CSRF] token name=csrf_test_name hash=417bf34fe1d9390bc451ed25bcc0cc5b
DEBUG - 2026-03-07 12:37:47 --> [REQ_ID=260fdaaa94ae] [INIT] App\Controllers\Home::GET
INFO - 2026-03-07 12:37:47 --> [REQ_ID=260fdaaa94ae] [MEMORY][controller-start] 6291456
INFO - 2026-03-07 12:37:47 --> [REQ_ID=260fdaaa94ae] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-07 12:37:47 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-07 12:37:48 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
DEBUG - 2026-03-07 12:37:48 --> [REQ_ID=260fdaaa94ae] [VIEW_RENDER] themes/public/home
INFO - 2026-03-07 12:37:48 --> [REQ_ID=260fdaaa94ae] [MEMORY][commonData:start] 10485760
INFO - 2026-03-07 12:37:48 --> themesMemory usage: 10485760
DEBUG - 2026-03-07 12:37:48 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-07 12:37:48 --> [REQ_ID=a9cd5c34ba6b] [FILTER_AFTER]
DEBUG - 2026-03-07 12:37:48 --> [REQ_ID=a9cd5c34ba6b] [LIFECYCLE][END] status=200 duration_ms=574.64 memory_delta=4194304
INFO - 2026-03-07 12:37:48 --> [REQ_ID=260fdaaa94ae] [PERF] Execution time=0.572265
DEBUG - 2026-03-07 12:37:48 --> [REQ_ID=a9cd5c34ba6b] [REQUEST][END]
INFO - 2026-03-07 12:37:48 --> [REQ_ID=a9cd5c34ba6b] [PERF] Execution time=0.612476
DEBUG - 2026-03-07 12:37:52 --> [REQ_ID=4f44bf4dabd7] [REQUEST][START] GET /index.php/Legal/Terms-And-Conditions
DEBUG - 2026-03-07 12:37:52 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-07 12:37:52 --> [REQ_ID=4f44bf4dabd7] [FILTER_BEFORE] /index.php/Legal/Terms-And-Conditions
DEBUG - 2026-03-07 12:37:52 --> [REQ_ID=4f44bf4dabd7] [ROUTE] Controller=\App\Controllers\Home Method=terms
DEBUG - 2026-03-07 12:37:52 --> [REQ_ID=4f44bf4dabd7] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Legal/Terms-And-Conditions
DEBUG - 2026-03-07 12:37:52 --> [CSRF] token name=csrf_test_name hash=2742bbb36aa3eb2bafb25d6bccd4a03f
DEBUG - 2026-03-07 12:37:52 --> [REQ_ID=4f44bf4dabd7] [REQUEST][END]
INFO - 2026-03-07 12:37:52 --> [REQ_ID=4f44bf4dabd7] [PERF] Execution time=0.011319
DEBUG - 2026-03-07 12:37:52 --> [REQ_ID=8e6b5a88394f] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-07 12:37:52 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-07 12:37:52 --> [REQ_ID=8e6b5a88394f] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-07 12:37:52 --> [REQ_ID=8e6b5a88394f] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-07 12:37:52 --> [REQ_ID=8e6b5a88394f] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-07 12:37:52 --> [CSRF] token name=csrf_test_name hash=12eaf8e6eab90ba67b178a065b56957f
DEBUG - 2026-03-07 12:37:52 --> [REQ_ID=efacf6b7dd0f] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-07 12:37:52 --> [REQ_ID=efacf6b7dd0f] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-07 12:37:52 --> [REQ_ID=8e6b5a88394f] [FILTER_AFTER]
DEBUG - 2026-03-07 12:37:52 --> [REQ_ID=8e6b5a88394f] [LIFECYCLE][END] status=200 duration_ms=29.79 memory_delta=0
INFO - 2026-03-07 12:37:52 --> [REQ_ID=efacf6b7dd0f] [PERF] Execution time=0.029384
DEBUG - 2026-03-07 12:37:52 --> [REQ_ID=8e6b5a88394f] [REQUEST][END]
INFO - 2026-03-07 12:37:52 --> [REQ_ID=8e6b5a88394f] [PERF] Execution time=0.045073
DEBUG - 2026-03-07 12:37:55 --> [REQ_ID=20971a7265a7] [REQUEST][START] GET /index.php/Terms-Of-Service
DEBUG - 2026-03-07 12:37:55 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-07 12:37:55 --> [REQ_ID=20971a7265a7] [FILTER_BEFORE] /index.php/Terms-Of-Service
DEBUG - 2026-03-07 12:37:55 --> [REQ_ID=20971a7265a7] [ROUTE] Controller=\App\Controllers\Home Method=termsOfService
DEBUG - 2026-03-07 12:37:55 --> [REQ_ID=20971a7265a7] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Terms-Of-Service
DEBUG - 2026-03-07 12:37:55 --> [CSRF] token name=csrf_test_name hash=aeea437162f99f4a2488fff8263b4c1c
DEBUG - 2026-03-07 12:37:55 --> [REQ_ID=8bdd56a0c921] [INIT] App\Controllers\Home::GET
INFO - 2026-03-07 12:37:55 --> [REQ_ID=8bdd56a0c921] [MEMORY][controller-start] 4194304
INFO - 2026-03-07 12:37:55 --> [REQ_ID=8bdd56a0c921] [MEMORY][commonData:start] 4194304
DEBUG - 2026-03-07 12:37:55 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-07 12:37:56 --> [MetaService] slug=terms-of-service pageName= cacheHit= path=DB
DEBUG - 2026-03-07 12:37:56 --> [REQ_ID=8bdd56a0c921] [VIEW_RENDER] themes/public/termsOfService
INFO - 2026-03-07 12:37:56 --> [REQ_ID=8bdd56a0c921] [MEMORY][commonData:start] 8388608
INFO - 2026-03-07 12:37:56 --> themesMemory usage: 8388608
DEBUG - 2026-03-07 12:37:56 --> [MetaService] slug=terms-of-service pageName=Terms of Service cacheHit= path=DB
DEBUG - 2026-03-07 12:37:56 --> [REQ_ID=20971a7265a7] [FILTER_AFTER]
DEBUG - 2026-03-07 12:37:56 --> [REQ_ID=20971a7265a7] [LIFECYCLE][END] status=200 duration_ms=504.07 memory_delta=4194304
INFO - 2026-03-07 12:37:56 --> [REQ_ID=8bdd56a0c921] [PERF] Execution time=0.503897
DEBUG - 2026-03-07 12:37:56 --> [REQ_ID=20971a7265a7] [REQUEST][END]
INFO - 2026-03-07 12:37:56 --> [REQ_ID=20971a7265a7] [PERF] Execution time=0.513505
DEBUG - 2026-03-07 12:41:18 --> [REQ_ID=3fdbcfc67530] [REQUEST][START] HEAD /
DEBUG - 2026-03-07 12:41:18 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-07 12:41:18 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-07 12:41:18 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-07 12:41:18 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-07 12:41:18 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
INFO - 2026-03-07 12:45:01 --> [spark:ops:work] Started
INFO - 2026-03-07 12:45:01 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-03-07 12:45:01 --> [SPARK_MEMORY] 16777216
INFO - 2026-03-07 12:45:01 --> [spark:ops:work] Intent
INFO - 2026-03-07 12:45:01 --> [spark:ops:work] Completed
INFO - 2026-03-07 12:45:01 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.090328
INFO - 2026-03-07 12:45:01 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-03-07 12:46:18 --> [REQ_ID=0140fc2e7ad3] [REQUEST][START] HEAD /
DEBUG - 2026-03-07 12:46:18 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-07 12:46:18 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-07 12:46:18 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-07 12:46:18 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-07 12:46:18 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-07 12:47:04 --> [REQ_ID=72ea332cfccb] [REQUEST][START] GET /
DEBUG - 2026-03-07 12:47:04 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-07 12:47:04 --> [REQ_ID=72ea332cfccb] [FILTER_BEFORE] /
DEBUG - 2026-03-07 12:47:04 --> [REQ_ID=72ea332cfccb] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-07 12:47:04 --> [REQ_ID=72ea332cfccb] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-07 12:47:04 --> [CSRF] token name=csrf_test_name hash=92c8ff0ecd13bda5d2687750c5e2d66f
DEBUG - 2026-03-07 12:47:04 --> [REQ_ID=c5dea0e0b01c] [INIT] App\Controllers\Home::GET
INFO - 2026-03-07 12:47:04 --> [REQ_ID=c5dea0e0b01c] [MEMORY][controller-start] 4194304
INFO - 2026-03-07 12:47:04 --> [REQ_ID=c5dea0e0b01c] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-07 12:47:04 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-07 12:47:04 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-03-07 12:47:04 --> [REQ_ID=c5dea0e0b01c] [VIEW_RENDER] themes/public/home
INFO - 2026-03-07 12:47:04 --> [REQ_ID=c5dea0e0b01c] [MEMORY][commonData:start] 8388608
INFO - 2026-03-07 12:47:04 --> themesMemory usage: 8388608
DEBUG - 2026-03-07 12:47:04 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-07 12:47:04 --> [REQ_ID=72ea332cfccb] [FILTER_AFTER]
DEBUG - 2026-03-07 12:47:04 --> [REQ_ID=72ea332cfccb] [LIFECYCLE][END] status=200 duration_ms=669.78 memory_delta=4194304
INFO - 2026-03-07 12:47:04 --> [REQ_ID=c5dea0e0b01c] [PERF] Execution time=0.667739
DEBUG - 2026-03-07 12:47:04 --> [REQ_ID=72ea332cfccb] [REQUEST][END]
INFO - 2026-03-07 12:47:04 --> [REQ_ID=72ea332cfccb] [PERF] Execution time=0.688508
DEBUG - 2026-03-07 12:51:18 --> [REQ_ID=5e8c0d6f759d] [REQUEST][START] HEAD /
DEBUG - 2026-03-07 12:51:18 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-07 12:51:18 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-07 12:51:18 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-07 12:51:18 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-07 12:51:18 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-07 12:54:39 --> [REQ_ID=5647436ff97a] [REQUEST][START] GET /
DEBUG - 2026-03-07 12:54:39 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-07 12:54:39 --> [REQ_ID=5647436ff97a] [FILTER_BEFORE] /
DEBUG - 2026-03-07 12:54:39 --> [REQ_ID=5647436ff97a] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-07 12:54:39 --> [REQ_ID=5647436ff97a] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-07 12:54:39 --> [CSRF] token name=csrf_test_name hash=d5fae118f1a13ec9dba75ac4e46577e9
DEBUG - 2026-03-07 12:54:39 --> [REQ_ID=b12b28dd57ba] [INIT] App\Controllers\Home::GET
INFO - 2026-03-07 12:54:39 --> [REQ_ID=b12b28dd57ba] [MEMORY][controller-start] 6291456
INFO - 2026-03-07 12:54:39 --> [REQ_ID=b12b28dd57ba] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-07 12:54:39 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-07 12:54:39 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
DEBUG - 2026-03-07 12:54:39 --> [REQ_ID=b12b28dd57ba] [VIEW_RENDER] themes/public/home
INFO - 2026-03-07 12:54:39 --> [REQ_ID=b12b28dd57ba] [MEMORY][commonData:start] 10485760
INFO - 2026-03-07 12:54:39 --> themesMemory usage: 10485760
DEBUG - 2026-03-07 12:54:39 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-07 12:54:39 --> [REQ_ID=5647436ff97a] [FILTER_AFTER]
DEBUG - 2026-03-07 12:54:39 --> [REQ_ID=5647436ff97a] [LIFECYCLE][END] status=200 duration_ms=604.45 memory_delta=4194304
INFO - 2026-03-07 12:54:39 --> [REQ_ID=b12b28dd57ba] [PERF] Execution time=0.602384
DEBUG - 2026-03-07 12:54:39 --> [REQ_ID=5647436ff97a] [REQUEST][END]
INFO - 2026-03-07 12:54:39 --> [REQ_ID=5647436ff97a] [PERF] Execution time=0.644480
DEBUG - 2026-03-07 12:56:18 --> [REQ_ID=3f365f214fd0] [REQUEST][START] HEAD /
DEBUG - 2026-03-07 12:56:18 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-07 12:56:18 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-07 12:56:18 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-07 12:56:18 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-07 12:56:18 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-07 12:57:36 --> [REQ_ID=57195aa709d8] [REQUEST][START] GET /
DEBUG - 2026-03-07 12:57:36 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-07 12:57:36 --> [REQ_ID=57195aa709d8] [FILTER_BEFORE] /
DEBUG - 2026-03-07 12:57:36 --> [REQ_ID=57195aa709d8] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-07 12:57:36 --> [REQ_ID=57195aa709d8] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-07 12:57:36 --> [CSRF] token name=csrf_test_name hash=eca3d86efd58b307e613d46af01c5736
DEBUG - 2026-03-07 12:57:36 --> [REQ_ID=d8c80c290c62] [INIT] App\Controllers\Home::GET
INFO - 2026-03-07 12:57:36 --> [REQ_ID=d8c80c290c62] [MEMORY][controller-start] 6291456
INFO - 2026-03-07 12:57:37 --> [REQ_ID=d8c80c290c62] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-07 12:57:37 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-07 12:57:37 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
DEBUG - 2026-03-07 12:57:37 --> [REQ_ID=d8c80c290c62] [VIEW_RENDER] themes/public/home
INFO - 2026-03-07 12:57:37 --> [REQ_ID=d8c80c290c62] [MEMORY][commonData:start] 10485760
INFO - 2026-03-07 12:57:37 --> themesMemory usage: 10485760
DEBUG - 2026-03-07 12:57:37 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-07 12:57:37 --> [REQ_ID=57195aa709d8] [FILTER_AFTER]
DEBUG - 2026-03-07 12:57:37 --> [REQ_ID=57195aa709d8] [LIFECYCLE][END] status=200 duration_ms=648.02 memory_delta=4194304
INFO - 2026-03-07 12:57:37 --> [REQ_ID=d8c80c290c62] [PERF] Execution time=0.645957
DEBUG - 2026-03-07 12:57:37 --> [REQ_ID=57195aa709d8] [REQUEST][END]
INFO - 2026-03-07 12:57:37 --> [REQ_ID=57195aa709d8] [PERF] Execution time=0.686061
INFO - 2026-03-07 13:00:01 --> [spark:ops:work] Started
INFO - 2026-03-07 13:00:01 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-03-07 13:00:01 --> [SPARK_MEMORY] 16777216
INFO - 2026-03-07 13:00:01 --> [spark:ops:work] Intent
DEBUG - 2026-03-07 13:00:01 --> [REQ_ID=a42582db7080] [REQUEST][START] GET /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-07 13:00:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-07 13:00:01 --> [REQ_ID=a42582db7080] [FILTER_BEFORE] /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-07 13:00:01 --> [REQ_ID=a42582db7080] [ROUTE] Controller=\App\Modules\Management\Controllers\ManagementAPIController Method=Run_CRON_Tasks
DEBUG - 2026-03-07 13:00:01 --> [REQ_ID=a42582db7080] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-07 13:00:01 --> [REQ_ID=a42582db7080] [REQUEST][END]
INFO - 2026-03-07 13:00:01 --> [REQ_ID=a42582db7080] [PERF] Execution time=0.050786
INFO - 2026-03-07 13:00:01 --> [spark:ops:work] Completed
INFO - 2026-03-07 13:00:01 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.103740
INFO - 2026-03-07 13:00:01 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-03-07 13:01:18 --> [REQ_ID=5dc95701ce44] [REQUEST][START] HEAD /
DEBUG - 2026-03-07 13:01:18 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-07 13:01:18 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-07 13:01:18 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-07 13:01:18 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-07 13:01:18 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-07 13:06:18 --> [REQ_ID=63fb8a6f789d] [REQUEST][START] HEAD /
DEBUG - 2026-03-07 13:06:18 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-07 13:06:18 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-07 13:06:18 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-07 13:06:18 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-07 13:06:18 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-07 13:09:26 --> [REQ_ID=95b916278aff] [REQUEST][START] GET /index.php/Trade-Tracker
DEBUG - 2026-03-07 13:09:26 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-07 13:09:26 --> [REQ_ID=95b916278aff] [FILTER_BEFORE] /index.php/Trade-Tracker
DEBUG - 2026-03-07 13:09:26 --> [REQ_ID=95b916278aff] [ROUTE] Controller=\App\Modules\User\Controllers\InvestmentsController Method=tradeTracker
DEBUG - 2026-03-07 13:09:26 --> [REQ_ID=95b916278aff] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Trade-Tracker
DEBUG - 2026-03-07 13:09:26 --> [CSRF] token name=csrf_test_name hash=e354572d3a76c07752f8b997529adc62
DEBUG - 2026-03-07 13:09:26 --> [REQ_ID=95b916278aff] [REQUEST][END]
INFO - 2026-03-07 13:09:26 --> [REQ_ID=95b916278aff] [PERF] Execution time=0.053306
DEBUG - 2026-03-07 13:09:27 --> [REQ_ID=fd92566c59c4] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-07 13:09:27 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-07 13:09:27 --> [REQ_ID=fd92566c59c4] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-07 13:09:27 --> [REQ_ID=fd92566c59c4] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-07 13:09:27 --> [REQ_ID=fd92566c59c4] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-07 13:09:27 --> [CSRF] token name=csrf_test_name hash=c83391983ad67ccd8241a08352fba5fe
DEBUG - 2026-03-07 13:09:27 --> [REQ_ID=45c7257bddd9] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-07 13:09:27 --> [REQ_ID=45c7257bddd9] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-07 13:09:27 --> [REQ_ID=fd92566c59c4] [FILTER_AFTER]
DEBUG - 2026-03-07 13:09:27 --> [REQ_ID=fd92566c59c4] [LIFECYCLE][END] status=200 duration_ms=214.00 memory_delta=0
INFO - 2026-03-07 13:09:27 --> [REQ_ID=45c7257bddd9] [PERF] Execution time=0.212954
DEBUG - 2026-03-07 13:09:27 --> [REQ_ID=fd92566c59c4] [REQUEST][END]
INFO - 2026-03-07 13:09:27 --> [REQ_ID=fd92566c59c4] [PERF] Execution time=0.225977
DEBUG - 2026-03-07 13:10:40 --> [REQ_ID=cd91753468da] [REQUEST][START] GET /index.php/Budget
DEBUG - 2026-03-07 13:10:40 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-07 13:10:40 --> [REQ_ID=cd91753468da] [FILTER_BEFORE] /index.php/Budget
DEBUG - 2026-03-07 13:10:40 --> [REQ_ID=cd91753468da] [ROUTE] Controller=\App\Modules\User\Controllers\BudgetController Method=index
DEBUG - 2026-03-07 13:10:40 --> [REQ_ID=cd91753468da] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Budget
DEBUG - 2026-03-07 13:10:40 --> [CSRF] token name=csrf_test_name hash=8b308f5a695440d69749ace06f884735
DEBUG - 2026-03-07 13:10:40 --> [REQ_ID=cd91753468da] [REQUEST][END]
INFO - 2026-03-07 13:10:40 --> [REQ_ID=cd91753468da] [PERF] Execution time=0.015637
DEBUG - 2026-03-07 13:10:41 --> [REQ_ID=5c12d87a832f] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-07 13:10:41 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-07 13:10:41 --> [REQ_ID=5c12d87a832f] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-07 13:10:41 --> [REQ_ID=5c12d87a832f] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-07 13:10:41 --> [REQ_ID=5c12d87a832f] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-07 13:10:41 --> [CSRF] token name=csrf_test_name hash=fd1cc88b698fd12bab4d67aa39055b41
DEBUG - 2026-03-07 13:10:41 --> [REQ_ID=84029eaa7bed] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-07 13:10:41 --> [REQ_ID=84029eaa7bed] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-07 13:10:41 --> [REQ_ID=5c12d87a832f] [FILTER_AFTER]
DEBUG - 2026-03-07 13:10:41 --> [REQ_ID=5c12d87a832f] [LIFECYCLE][END] status=200 duration_ms=307.34 memory_delta=0
INFO - 2026-03-07 13:10:41 --> [REQ_ID=84029eaa7bed] [PERF] Execution time=0.307139
DEBUG - 2026-03-07 13:10:41 --> [REQ_ID=5c12d87a832f] [REQUEST][END]
INFO - 2026-03-07 13:10:41 --> [REQ_ID=5c12d87a832f] [PERF] Execution time=0.315755
DEBUG - 2026-03-07 13:11:18 --> [REQ_ID=516357dddcbf] [REQUEST][START] HEAD /
DEBUG - 2026-03-07 13:11:18 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-07 13:11:18 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-07 13:11:18 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-07 13:11:18 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-07 13:11:18 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
INFO - 2026-03-07 13:15:01 --> [spark:ops:work] Started
INFO - 2026-03-07 13:15:01 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-03-07 13:15:01 --> [SPARK_MEMORY] 16777216
INFO - 2026-03-07 13:15:01 --> [spark:ops:work] Intent
INFO - 2026-03-07 13:15:01 --> [spark:ops:work] Completed
INFO - 2026-03-07 13:15:01 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.098538
INFO - 2026-03-07 13:15:01 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-03-07 13:15:01 --> [REQ_ID=048c6c214cd6] [REQUEST][START] GET /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-07 13:15:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-07 13:15:01 --> [REQ_ID=048c6c214cd6] [FILTER_BEFORE] /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-07 13:15:01 --> [REQ_ID=048c6c214cd6] [ROUTE] Controller=\App\Modules\APIs\Controllers\AlertsAPIController Method=fetchEmailAlerts
DEBUG - 2026-03-07 13:15:01 --> [REQ_ID=048c6c214cd6] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-07 13:15:01 --> [REQ_ID=048c6c214cd6] [REQUEST][END]
INFO - 2026-03-07 13:15:01 --> [REQ_ID=048c6c214cd6] [PERF] Execution time=0.066641
DEBUG - 2026-03-07 13:16:18 --> [REQ_ID=6240a584e7b5] [REQUEST][START] HEAD /
DEBUG - 2026-03-07 13:16:18 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-07 13:16:18 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-07 13:16:18 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-07 13:16:18 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-07 13:16:18 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-07 13:21:18 --> [REQ_ID=a5e8dde7caaf] [REQUEST][START] HEAD /
DEBUG - 2026-03-07 13:21:18 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-07 13:21:18 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-07 13:21:18 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-07 13:21:18 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-07 13:21:18 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-07 13:22:51 --> [REQ_ID=954a4c4eb2c7] [REQUEST][START] GET /index.php
DEBUG - 2026-03-07 13:22:51 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-07 13:22:51 --> [REQ_ID=954a4c4eb2c7] [FILTER_BEFORE] /index.php
DEBUG - 2026-03-07 13:22:51 --> [REQ_ID=954a4c4eb2c7] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-07 13:22:51 --> [REQ_ID=954a4c4eb2c7] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-07 13:22:51 --> [CSRF] token name=csrf_test_name hash=61d894c95d9185098a7f6129739d9fd9
DEBUG - 2026-03-07 13:22:51 --> [REQ_ID=075b0a6f6ce7] [INIT] App\Controllers\Home::GET
INFO - 2026-03-07 13:22:51 --> [REQ_ID=075b0a6f6ce7] [MEMORY][controller-start] 6291456
INFO - 2026-03-07 13:22:51 --> [REQ_ID=075b0a6f6ce7] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-07 13:22:51 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-07 13:22:51 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-03-07 13:22:51 --> [REQ_ID=075b0a6f6ce7] [VIEW_RENDER] themes/public/home
INFO - 2026-03-07 13:22:51 --> [REQ_ID=075b0a6f6ce7] [MEMORY][commonData:start] 10485760
INFO - 2026-03-07 13:22:51 --> themesMemory usage: 10485760
DEBUG - 2026-03-07 13:22:51 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-07 13:22:51 --> [REQ_ID=954a4c4eb2c7] [FILTER_AFTER]
DEBUG - 2026-03-07 13:22:51 --> [REQ_ID=954a4c4eb2c7] [LIFECYCLE][END] status=200 duration_ms=630.67 memory_delta=4194304
INFO - 2026-03-07 13:22:51 --> [REQ_ID=075b0a6f6ce7] [PERF] Execution time=0.628333
DEBUG - 2026-03-07 13:22:51 --> [REQ_ID=954a4c4eb2c7] [REQUEST][END]
INFO - 2026-03-07 13:22:51 --> [REQ_ID=954a4c4eb2c7] [PERF] Execution time=0.672249
DEBUG - 2026-03-07 13:26:18 --> [REQ_ID=2d609735a80e] [REQUEST][START] HEAD /
DEBUG - 2026-03-07 13:26:18 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-07 13:26:18 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-07 13:26:18 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-07 13:26:18 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-07 13:26:18 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-07 13:27:58 --> [REQ_ID=27081d76852d] [REQUEST][START] GET /index.php/Preview/Alert/GRAB
DEBUG - 2026-03-07 13:27:58 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-07 13:27:58 --> [REQ_ID=27081d76852d] [FILTER_BEFORE] /index.php/Preview/Alert/GRAB
DEBUG - 2026-03-07 13:27:58 --> [REQ_ID=27081d76852d] [ROUTE] Controller=\App\Modules\User\Controllers\AlertsController Method=preview
DEBUG - 2026-03-07 13:27:58 --> [REQ_ID=27081d76852d] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Preview/Alert/GRAB
DEBUG - 2026-03-07 13:27:58 --> [CSRF] token name=csrf_test_name hash=44bdc55f64f24caeda2e959dc1794cc0
DEBUG - 2026-03-07 13:27:58 --> [REQ_ID=3fe353ecd5b8] [INIT] App\Modules\User\Controllers\AlertsController::GET
INFO - 2026-03-07 13:27:58 --> [REQ_ID=3fe353ecd5b8] [MEMORY][controller-start] 6291456
DEBUG - 2026-03-07 13:27:58 --> [REQ_ID=3fe353ecd5b8] [METHOD_ENTRY] preview
DEBUG - 2026-03-07 13:27:58 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-07 13:27:58 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-07 13:27:58 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-07 13:27:58 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-07 13:27:58 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-07 13:27:58 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-07 13:27:58 --> MyMIInvestments: no session user detected; skipping personalized hydration.
DEBUG - 2026-03-07 13:27:58 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-07 13:27:58 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-07 13:27:58 --> MyMIMarketing: Pscrape library not installed; Google search scraping will use fallback.
DEBUG - 2026-03-07 13:27:58 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-07 13:27:58 --> MyMIAlerts: no authenticated user context detected.
DEBUG - 2026-03-07 13:27:58 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-07 13:27:58 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-07 13:27:58 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-07 13:27:58 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-07 13:27:58 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-07 13:27:58 --> [SERVICE] App\Services\BudgetService ::setUserId
INFO - 2026-03-07 13:27:58 --> [REQ_ID=3fe353ecd5b8] [MEMORY][commonData:start] 8388608
DEBUG - 2026-03-07 13:27:58 --> MyMIInvestments: no session user detected; skipping personalized hydration.
DEBUG - 2026-03-07 13:27:58 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-07 13:27:58 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-07 13:27:58 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-07 13:27:58 --> MyMIAlerts: no authenticated user context detected.
INFO - 2026-03-07 13:27:59 --> AlertsModel L404 - Alert updated successfully for ID 7405: Array
(
    [price] => 3.98
    [current_price] => 3.98
    [last_updated] => 2026-03-07 13:27:59
    [last_updated_time] => 2026-03-07 13:27:59
)

INFO - 2026-03-07 13:27:59 --> 🔄 Trying AlphaVantage for GRAB...
INFO - 2026-03-07 13:27:59 --> ✅ Alert snapshot inserted for GRAB with trade_id 7405
DEBUG - 2026-03-07 13:27:59 --> [REQ_ID=3fe353ecd5b8] [VIEW_RENDER] themes/public/previewAlert
INFO - 2026-03-07 13:27:59 --> [REQ_ID=3fe353ecd5b8] [MEMORY][commonData:start] 8388608
INFO - 2026-03-07 13:27:59 --> themesMemory usage: 8388608
DEBUG - 2026-03-07 13:27:59 --> [REQ_ID=27081d76852d] [FILTER_AFTER]
DEBUG - 2026-03-07 13:27:59 --> [REQ_ID=27081d76852d] [LIFECYCLE][END] status=200 duration_ms=559.34 memory_delta=2097152
INFO - 2026-03-07 13:27:59 --> [REQ_ID=3fe353ecd5b8] [PERF] Execution time=0.557304
DEBUG - 2026-03-07 13:27:59 --> [REQ_ID=27081d76852d] [REQUEST][END]
INFO - 2026-03-07 13:27:59 --> [REQ_ID=27081d76852d] [PERF] Execution time=0.599799
INFO - 2026-03-07 13:30:01 --> [spark:ops:work] Started
INFO - 2026-03-07 13:30:01 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-03-07 13:30:01 --> [SPARK_MEMORY] 16777216
INFO - 2026-03-07 13:30:01 --> [spark:ops:work] Intent
INFO - 2026-03-07 13:30:01 --> [spark:ops:work] Completed
INFO - 2026-03-07 13:30:01 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.020298
INFO - 2026-03-07 13:30:01 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-03-07 13:31:18 --> [REQ_ID=5ad309b5e93a] [REQUEST][START] HEAD /
DEBUG - 2026-03-07 13:31:18 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-07 13:31:18 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-07 13:31:18 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-07 13:31:18 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-07 13:31:18 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-07 13:36:18 --> [REQ_ID=b0827c0acff8] [REQUEST][START] HEAD /
DEBUG - 2026-03-07 13:36:18 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-07 13:36:18 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-07 13:36:18 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-07 13:36:18 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-07 13:36:18 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-07 13:41:18 --> [REQ_ID=69205e7deed2] [REQUEST][START] HEAD /
DEBUG - 2026-03-07 13:41:18 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-07 13:41:18 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-07 13:41:18 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-07 13:41:18 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-07 13:41:18 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
INFO - 2026-03-07 13:45:01 --> [spark:ops:work] Started
INFO - 2026-03-07 13:45:01 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-03-07 13:45:01 --> [SPARK_MEMORY] 16777216
INFO - 2026-03-07 13:45:01 --> [spark:ops:work] Intent
INFO - 2026-03-07 13:45:02 --> [spark:ops:work] Completed
INFO - 2026-03-07 13:45:02 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.092084
INFO - 2026-03-07 13:45:02 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-03-07 13:46:18 --> [REQ_ID=55f6edfbc34e] [REQUEST][START] HEAD /
DEBUG - 2026-03-07 13:46:18 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-07 13:46:18 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-07 13:46:19 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-07 13:46:19 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-07 13:46:19 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-07 13:51:18 --> [REQ_ID=ec39d378844c] [REQUEST][START] HEAD /
DEBUG - 2026-03-07 13:51:18 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-07 13:51:18 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-07 13:51:18 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-07 13:51:18 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-07 13:51:18 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-07 13:56:18 --> [REQ_ID=ff59bfe3a932] [REQUEST][START] HEAD /
DEBUG - 2026-03-07 13:56:18 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-07 13:56:18 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-07 13:56:18 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-07 13:56:18 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-07 13:56:18 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
INFO - 2026-03-07 14:00:01 --> [SPARK_START] App\Commands\AIOps\Run
INFO - 2026-03-07 14:00:01 --> [SPARK_MEMORY] 16777216
INFO - 2026-03-07 14:00:01 --> [spark:aiops:run] Intent
DEBUG - 2026-03-07 14:00:01 --> [REQ_ID=2b47d0d63cbc] [REQUEST][START] GET /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-07 14:00:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
INFO - 2026-03-07 14:00:01 --> [spark:ops:work] Started
INFO - 2026-03-07 14:00:01 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-03-07 14:00:01 --> [SPARK_MEMORY] 16777216
INFO - 2026-03-07 14:00:01 --> [spark:ops:work] Intent
DEBUG - 2026-03-07 14:00:01 --> [REQ_ID=2b47d0d63cbc] [FILTER_BEFORE] /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-07 14:00:01 --> [REQ_ID=2b47d0d63cbc] [ROUTE] Controller=\App\Modules\Management\Controllers\ManagementAPIController Method=Run_CRON_Tasks
DEBUG - 2026-03-07 14:00:01 --> [REQ_ID=2b47d0d63cbc] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-07 14:00:01 --> [REQ_ID=2b47d0d63cbc] [REQUEST][END]
INFO - 2026-03-07 14:00:01 --> [REQ_ID=2b47d0d63cbc] [PERF] Execution time=0.090519
INFO - 2026-03-07 14:00:01 --> [spark:ops:work] Completed
INFO - 2026-03-07 14:00:01 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.112714
INFO - 2026-03-07 14:00:01 --> [SPARK_MEMORY] 18874368
INFO - 2026-03-07 14:00:02 --> [AIOPS][SPARK][GOVERNANCE][spark:logs:summarize] Started
INFO - 2026-03-07 14:00:02 --> [SPARK_START] App\Commands\Logs\Summarize
INFO - 2026-03-07 14:00:02 --> [SPARK_MEMORY] 16777216
INFO - 2026-03-07 14:00:02 --> [spark:logs:summarize] Intent
INFO - 2026-03-07 14:00:02 --> [AIOPS][SPARK][GOVERNANCE][spark:logs:summarize] Completed
INFO - 2026-03-07 14:00:02 --> [SPARK_COMPLETE] App\Commands\Logs\Summarize duration=0.018856
INFO - 2026-03-07 14:00:02 --> [SPARK_MEMORY] 18874368
INFO - 2026-03-07 14:00:03 --> [spark:app:healthcheck] Started
INFO - 2026-03-07 14:00:03 --> [SPARK_START] App\Commands\App\Healthcheck
INFO - 2026-03-07 14:00:03 --> [SPARK_MEMORY] 16777216
INFO - 2026-03-07 14:00:03 --> [spark:app:healthcheck] Intent
DEBUG - 2026-03-07 14:00:03 --> LOG_HEALTHCHECK debug marker=67e968c62275
INFO - 2026-03-07 14:00:03 --> LOG_HEALTHCHECK info marker=67e968c62275
NOTICE - 2026-03-07 14:00:03 --> LOG_HEALTHCHECK probe marker=67e968c62275
INFO - 2026-03-07 14:00:03 --> [spark:app:healthcheck] Completed
INFO - 2026-03-07 14:00:03 --> [SPARK_COMPLETE] App\Commands\App\Healthcheck duration=0.029933
INFO - 2026-03-07 14:00:03 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-03-07 14:00:04 --> OllamaPatchRunner:L142 - validateGeneratedPatch Content: 
WARNING - 2026-03-07 14:00:04 --> OllamaPatchRunner:L49 - Original Diff: 
DEBUG - 2026-03-07 14:00:05 --> OllamaPatchRunner:L51 - Retried Diff: 
DEBUG - 2026-03-07 14:00:05 --> OllamaPatchRunner:L142 - validateGeneratedPatch Content: 
DEBUG - 2026-03-07 14:00:05 --> OllamaPatchRunner:L53 - Validating Generated Patch Failed
INFO - 2026-03-07 14:00:05 --> [SPARK_COMPLETE] App\Commands\AIOps\Run duration=3.616745
INFO - 2026-03-07 14:00:05 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-03-07 14:01:18 --> [REQ_ID=fe648def2003] [REQUEST][START] HEAD /
DEBUG - 2026-03-07 14:01:18 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-07 14:01:18 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-07 14:01:18 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-07 14:01:18 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-07 14:01:18 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
