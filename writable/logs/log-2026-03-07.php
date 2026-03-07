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
