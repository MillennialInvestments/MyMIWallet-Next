<?php defined('SYSTEMPATH') || exit('No direct script access allowed'); ?>

INFO - 2026-03-08 00:00:01 --> [spark:ops:work] Started
INFO - 2026-03-08 00:00:01 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-03-08 00:00:01 --> [SPARK_MEMORY] 16777216
INFO - 2026-03-08 00:00:01 --> [spark:ops:work] Intent
INFO - 2026-03-08 00:00:01 --> [SPARK_START] App\Commands\AIOps\Run
INFO - 2026-03-08 00:00:01 --> [SPARK_MEMORY] 16777216
INFO - 2026-03-08 00:00:01 --> [spark:aiops:run] Intent
DEBUG - 2026-03-08 00:00:02 --> [REQ_ID=d20775567f71] [REQUEST][START] GET /index.php/API/Management/Run-CRON-Tasks
INFO - 2026-03-08 00:00:02 --> [spark:ops:work] Completed
INFO - 2026-03-08 00:00:02 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.110415
INFO - 2026-03-08 00:00:02 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-03-08 00:00:02 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-08 00:00:02 --> [REQ_ID=d20775567f71] [FILTER_BEFORE] /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-08 00:00:02 --> [REQ_ID=d20775567f71] [ROUTE] Controller=\App\Modules\Management\Controllers\ManagementAPIController Method=Run_CRON_Tasks
DEBUG - 2026-03-08 00:00:02 --> [REQ_ID=d20775567f71] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-08 00:00:02 --> [REQ_ID=d20775567f71] [REQUEST][END]
INFO - 2026-03-08 00:00:02 --> [REQ_ID=d20775567f71] [PERF] Execution time=0.050249
INFO - 2026-03-08 00:00:03 --> [AIOPS][SPARK][GOVERNANCE][spark:logs:summarize] Started
INFO - 2026-03-08 00:00:03 --> [SPARK_START] App\Commands\Logs\Summarize
INFO - 2026-03-08 00:00:03 --> [SPARK_MEMORY] 16777216
INFO - 2026-03-08 00:00:03 --> [spark:logs:summarize] Intent
INFO - 2026-03-08 00:00:03 --> [AIOPS][SPARK][GOVERNANCE][spark:logs:summarize] Completed
INFO - 2026-03-08 00:00:03 --> [SPARK_COMPLETE] App\Commands\Logs\Summarize duration=0.002221
INFO - 2026-03-08 00:00:03 --> [SPARK_MEMORY] 16777216
INFO - 2026-03-08 00:00:03 --> [spark:app:healthcheck] Started
INFO - 2026-03-08 00:00:03 --> [SPARK_START] App\Commands\App\Healthcheck
INFO - 2026-03-08 00:00:03 --> [SPARK_MEMORY] 16777216
INFO - 2026-03-08 00:00:03 --> [spark:app:healthcheck] Intent
DEBUG - 2026-03-08 00:00:03 --> LOG_HEALTHCHECK debug marker=ebd3f403b3a5
INFO - 2026-03-08 00:00:03 --> LOG_HEALTHCHECK info marker=ebd3f403b3a5
NOTICE - 2026-03-08 00:00:03 --> LOG_HEALTHCHECK probe marker=ebd3f403b3a5
INFO - 2026-03-08 00:00:03 --> [spark:app:healthcheck] Completed
INFO - 2026-03-08 00:00:03 --> [SPARK_COMPLETE] App\Commands\App\Healthcheck duration=0.037744
INFO - 2026-03-08 00:00:03 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-03-08 00:00:05 --> OllamaPatchRunner:L142 - validateGeneratedPatch Content: 
WARNING - 2026-03-08 00:00:05 --> OllamaPatchRunner:L49 - Original Diff: 
DEBUG - 2026-03-08 00:00:05 --> OllamaPatchRunner:L51 - Retried Diff: 
DEBUG - 2026-03-08 00:00:05 --> OllamaPatchRunner:L142 - validateGeneratedPatch Content: 
DEBUG - 2026-03-08 00:00:05 --> OllamaPatchRunner:L53 - Validating Generated Patch Failed
INFO - 2026-03-08 00:00:05 --> [SPARK_COMPLETE] App\Commands\AIOps\Run duration=3.860272
INFO - 2026-03-08 00:00:05 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-03-08 00:00:56 --> [REQ_ID=2b33a50c273c] [REQUEST][START] GET /
DEBUG - 2026-03-08 00:00:56 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-08 00:00:56 --> [REQ_ID=2b33a50c273c] [FILTER_BEFORE] /
DEBUG - 2026-03-08 00:00:56 --> [REQ_ID=2b33a50c273c] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-08 00:00:56 --> [REQ_ID=2b33a50c273c] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-08 00:00:56 --> [CSRF] token name=csrf_test_name hash=a017de7497ce68ee7756d14146610b68
DEBUG - 2026-03-08 00:00:56 --> [REQ_ID=b2a9debeed3d] [INIT] App\Controllers\Home::GET
INFO - 2026-03-08 00:00:56 --> [REQ_ID=b2a9debeed3d] [MEMORY][controller-start] 4194304
INFO - 2026-03-08 00:00:56 --> [REQ_ID=b2a9debeed3d] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-08 00:00:56 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-08 00:00:57 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
DEBUG - 2026-03-08 00:00:57 --> [REQ_ID=b2a9debeed3d] [VIEW_RENDER] themes/public/home
INFO - 2026-03-08 00:00:57 --> [REQ_ID=b2a9debeed3d] [MEMORY][commonData:start] 8388608
INFO - 2026-03-08 00:00:57 --> themesMemory usage: 8388608
DEBUG - 2026-03-08 00:00:57 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-08 00:00:57 --> [REQ_ID=2b33a50c273c] [FILTER_AFTER]
DEBUG - 2026-03-08 00:00:57 --> [REQ_ID=2b33a50c273c] [LIFECYCLE][END] status=200 duration_ms=790.18 memory_delta=4194304
INFO - 2026-03-08 00:00:57 --> [REQ_ID=b2a9debeed3d] [PERF] Execution time=0.788654
DEBUG - 2026-03-08 00:00:57 --> [REQ_ID=2b33a50c273c] [REQUEST][END]
INFO - 2026-03-08 00:00:57 --> [REQ_ID=2b33a50c273c] [PERF] Execution time=0.803779
DEBUG - 2026-03-08 00:01:18 --> [REQ_ID=081400556389] [REQUEST][START] HEAD /
DEBUG - 2026-03-08 00:01:18 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-08 00:01:18 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-08 00:01:18 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-08 00:01:18 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-08 00:01:18 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-08 00:06:18 --> [REQ_ID=73159ccf4861] [REQUEST][START] HEAD /
DEBUG - 2026-03-08 00:06:18 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-08 00:06:18 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-08 00:06:18 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-08 00:06:18 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-08 00:06:18 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-08 00:07:53 --> [REQ_ID=6bdebc080b71] [REQUEST][START] GET /
DEBUG - 2026-03-08 00:07:53 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-08 00:07:53 --> [REQ_ID=6bdebc080b71] [FILTER_BEFORE] /
DEBUG - 2026-03-08 00:07:53 --> [REQ_ID=6bdebc080b71] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-08 00:07:53 --> [REQ_ID=6bdebc080b71] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-08 00:07:53 --> [CSRF] token name=csrf_test_name hash=a5899eeb5d3299cef8e41ba98f44139b
DEBUG - 2026-03-08 00:07:53 --> [REQ_ID=623ed687b3ae] [INIT] App\Controllers\Home::GET
INFO - 2026-03-08 00:07:53 --> [REQ_ID=623ed687b3ae] [MEMORY][controller-start] 6291456
INFO - 2026-03-08 00:07:53 --> [REQ_ID=623ed687b3ae] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-08 00:07:53 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-08 00:07:54 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
DEBUG - 2026-03-08 00:07:54 --> [REQ_ID=623ed687b3ae] [VIEW_RENDER] themes/public/home
INFO - 2026-03-08 00:07:54 --> [REQ_ID=623ed687b3ae] [MEMORY][commonData:start] 10485760
INFO - 2026-03-08 00:07:54 --> themesMemory usage: 10485760
DEBUG - 2026-03-08 00:07:54 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-08 00:07:54 --> [REQ_ID=6bdebc080b71] [FILTER_AFTER]
DEBUG - 2026-03-08 00:07:54 --> [REQ_ID=6bdebc080b71] [LIFECYCLE][END] status=200 duration_ms=736.91 memory_delta=4194304
INFO - 2026-03-08 00:07:54 --> [REQ_ID=623ed687b3ae] [PERF] Execution time=0.734918
DEBUG - 2026-03-08 00:07:54 --> [REQ_ID=6bdebc080b71] [REQUEST][END]
INFO - 2026-03-08 00:07:54 --> [REQ_ID=6bdebc080b71] [PERF] Execution time=0.775796
DEBUG - 2026-03-08 00:10:18 --> [REQ_ID=f94e51b5373f] [REQUEST][START] GET /
DEBUG - 2026-03-08 00:10:18 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-08 00:10:18 --> [REQ_ID=f94e51b5373f] [FILTER_BEFORE] /
DEBUG - 2026-03-08 00:10:18 --> [REQ_ID=f94e51b5373f] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-08 00:10:18 --> [REQ_ID=f94e51b5373f] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-08 00:10:18 --> [CSRF] token name=csrf_test_name hash=fed9ee68b091417db97c0fd3d48dd841
DEBUG - 2026-03-08 00:10:18 --> [REQ_ID=0745dad5a4f2] [INIT] App\Controllers\Home::GET
INFO - 2026-03-08 00:10:18 --> [REQ_ID=0745dad5a4f2] [MEMORY][controller-start] 6291456
INFO - 2026-03-08 00:10:18 --> [REQ_ID=0745dad5a4f2] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-08 00:10:18 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-08 00:10:19 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
DEBUG - 2026-03-08 00:10:19 --> [REQ_ID=0745dad5a4f2] [VIEW_RENDER] themes/public/home
INFO - 2026-03-08 00:10:19 --> [REQ_ID=0745dad5a4f2] [MEMORY][commonData:start] 10485760
INFO - 2026-03-08 00:10:19 --> themesMemory usage: 10485760
DEBUG - 2026-03-08 00:10:19 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-08 00:10:19 --> [REQ_ID=f94e51b5373f] [FILTER_AFTER]
DEBUG - 2026-03-08 00:10:19 --> [REQ_ID=f94e51b5373f] [LIFECYCLE][END] status=200 duration_ms=559.76 memory_delta=4194304
INFO - 2026-03-08 00:10:19 --> [REQ_ID=0745dad5a4f2] [PERF] Execution time=0.557693
DEBUG - 2026-03-08 00:10:19 --> [REQ_ID=f94e51b5373f] [REQUEST][END]
INFO - 2026-03-08 00:10:19 --> [REQ_ID=f94e51b5373f] [PERF] Execution time=0.598422
DEBUG - 2026-03-08 00:11:18 --> [REQ_ID=ab6454f363cf] [REQUEST][START] HEAD /
DEBUG - 2026-03-08 00:11:18 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-08 00:11:18 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-08 00:11:18 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-08 00:11:18 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-08 00:11:18 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
INFO - 2026-03-08 00:15:01 --> [spark:ops:work] Started
INFO - 2026-03-08 00:15:01 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-03-08 00:15:01 --> [SPARK_MEMORY] 16777216
INFO - 2026-03-08 00:15:01 --> [spark:ops:work] Intent
INFO - 2026-03-08 00:15:01 --> [spark:ops:work] Completed
INFO - 2026-03-08 00:15:01 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.103525
INFO - 2026-03-08 00:15:01 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-03-08 00:15:01 --> [REQ_ID=9b6ebaf89b25] [REQUEST][START] GET /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-08 00:15:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-08 00:15:01 --> [REQ_ID=9b6ebaf89b25] [FILTER_BEFORE] /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-08 00:15:01 --> [REQ_ID=9b6ebaf89b25] [ROUTE] Controller=\App\Modules\APIs\Controllers\AlertsAPIController Method=fetchEmailAlerts
DEBUG - 2026-03-08 00:15:01 --> [REQ_ID=9b6ebaf89b25] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-08 00:15:01 --> [REQ_ID=9b6ebaf89b25] [REQUEST][END]
INFO - 2026-03-08 00:15:01 --> [REQ_ID=9b6ebaf89b25] [PERF] Execution time=0.044707
DEBUG - 2026-03-08 00:16:18 --> [REQ_ID=c49d95df28e9] [REQUEST][START] HEAD /
DEBUG - 2026-03-08 00:16:18 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-08 00:16:18 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-08 00:16:18 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-08 00:16:18 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-08 00:16:18 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-08 00:21:18 --> [REQ_ID=73fa9fcdf4b8] [REQUEST][START] HEAD /
DEBUG - 2026-03-08 00:21:18 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-08 00:21:18 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-08 00:21:18 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-08 00:21:18 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-08 00:21:18 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-08 00:23:19 --> [REQ_ID=e4f89d3e1512] [REQUEST][START] GET /index.php/How-It-Works/Investment-Portfolio-Management
DEBUG - 2026-03-08 00:23:19 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-08 00:23:19 --> [REQ_ID=e4f89d3e1512] [FILTER_BEFORE] /index.php/How-It-Works/Investment-Portfolio-Management
DEBUG - 2026-03-08 00:23:19 --> [REQ_ID=e4f89d3e1512] [ROUTE] Controller=\App\Modules\Blog\Controllers\HowItWorksController Method=show
DEBUG - 2026-03-08 00:23:19 --> [REQ_ID=e4f89d3e1512] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/How-It-Works/Investment-Portfolio-Management
DEBUG - 2026-03-08 00:23:19 --> [CSRF] token name=csrf_test_name hash=4acedf2cb10c10da1db2290357b20750
DEBUG - 2026-03-08 00:23:19 --> [REQ_ID=5f0ace7cc0ff] [INIT] App\Modules\Blog\Controllers\HowItWorksController::GET
INFO - 2026-03-08 00:23:19 --> [REQ_ID=5f0ace7cc0ff] [MEMORY][controller-start] 6291456
DEBUG - 2026-03-08 00:23:19 --> [REQ_ID=5f0ace7cc0ff] [METHOD_ENTRY] show
DEBUG - 2026-03-08 00:23:19 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-08 00:23:19 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-08 00:23:19 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-08 00:23:19 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-08 00:23:19 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-08 00:23:19 --> MyMICoin: guest context detected; skipping user-specific preload.
ERROR - 2026-03-08 00:23:19 --> [ERROR_PAGE] event=error_404 status=404 message=Page not found.
DEBUG - 2026-03-08 00:23:19 --> [REQ_ID=e4f89d3e1512] [FILTER_AFTER]
DEBUG - 2026-03-08 00:23:19 --> [REQ_ID=e4f89d3e1512] [LIFECYCLE][END] status=404 duration_ms=96.39 memory_delta=0
INFO - 2026-03-08 00:23:19 --> [REQ_ID=5f0ace7cc0ff] [PERF] Execution time=0.093820
DEBUG - 2026-03-08 00:23:19 --> [REQ_ID=e4f89d3e1512] [REQUEST][END]
INFO - 2026-03-08 00:23:19 --> [REQ_ID=e4f89d3e1512] [PERF] Execution time=0.149904
DEBUG - 2026-03-08 00:26:18 --> [REQ_ID=e273a541a7e0] [REQUEST][START] HEAD /
DEBUG - 2026-03-08 00:26:18 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-08 00:26:18 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-08 00:26:18 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-08 00:26:18 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-08 00:26:18 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
INFO - 2026-03-08 00:30:02 --> [spark:ops:work] Started
INFO - 2026-03-08 00:30:02 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-03-08 00:30:02 --> [SPARK_MEMORY] 16777216
INFO - 2026-03-08 00:30:02 --> [spark:ops:work] Intent
INFO - 2026-03-08 00:30:02 --> [spark:ops:work] Completed
INFO - 2026-03-08 00:30:02 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.092785
INFO - 2026-03-08 00:30:02 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-03-08 00:31:18 --> [REQ_ID=533de55e9445] [REQUEST][START] HEAD /
DEBUG - 2026-03-08 00:31:18 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-08 00:31:18 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-08 00:31:18 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-08 00:31:18 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-08 00:31:18 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-08 00:36:18 --> [REQ_ID=b5aa0043992e] [REQUEST][START] HEAD /
DEBUG - 2026-03-08 00:36:18 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-08 00:36:18 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-08 00:36:18 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-08 00:36:18 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-08 00:36:18 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-08 00:41:18 --> [REQ_ID=6191a276aa79] [REQUEST][START] HEAD /
DEBUG - 2026-03-08 00:41:18 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-08 00:41:18 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-08 00:41:18 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-08 00:41:18 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-08 00:41:18 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
CRITICAL - 2026-03-08 00:41:21 --> ParseError: syntax error, unexpected identifier "CLI", expecting "function" or "const"
[Method: CLI, Route: cache:clear]
in APPPATH/Commands/Ops/CommandsMissingFromConsole.php on line 48.
 1 VENDORPATH/composer/ClassLoader.php(427): Composer\Autoload\{closure}('/home/mymiteam/mymiwallet/site/current/vendor/composer/../../app/Commands/Ops/CommandsMissingFromConsole.php')
 2 [internal function]: Composer\Autoload\ClassLoader->loadClass('App\\Commands\\Ops\\CommandsMissingFromConsole')
 3 SYSTEMPATH/CLI/Commands.php(119): class_exists('App\\Commands\\Ops\\CommandsMissingFromConsole')
 4 SYSTEMPATH/CLI/Commands.php(51): CodeIgniter\CLI\Commands->discoverCommands()
 5 SYSTEMPATH/Config/Services.php(178): CodeIgniter\CLI\Commands->__construct()
 6 SYSTEMPATH/Config/BaseService.php(264): CodeIgniter\Config\Services::commands(false)
 7 SYSTEMPATH/Config/Services.php(175): CodeIgniter\Config\BaseService::getSharedInstance('commands')
 8 SYSTEMPATH/Config/BaseService.php(334): CodeIgniter\Config\Services::commands()
 9 SYSTEMPATH/Config/BaseService.php(203): CodeIgniter\Config\BaseService::__callStatic('commands', [])
10 SYSTEMPATH/Common.php(1078): CodeIgniter\Config\BaseService::get('commands')
11 SYSTEMPATH/CLI/Console.php(47): service('commands')
12 SYSTEMPATH/Boot.php(442): CodeIgniter\CLI\Console->run()
13 SYSTEMPATH/Boot.php(166): CodeIgniter\Boot::runCommand(Object(CodeIgniter\CLI\Console))
14 ROOTPATH/spark(99): CodeIgniter\Boot::bootSpark(Object(Config\Paths))
CRITICAL - 2026-03-08 00:41:22 --> [EXCEPTION] syntax error, unexpected identifier "CLI", expecting "function" or "const" File=/home/mymiteam/mymiwallet/site/current/app/Commands/Ops/CommandsMissingFromConsole.php Line=48
INFO - 2026-03-08 00:45:01 --> [spark:ops:work] Started
INFO - 2026-03-08 00:45:01 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-03-08 00:45:01 --> [SPARK_MEMORY] 18874368
INFO - 2026-03-08 00:45:01 --> [spark:ops:work] Intent
INFO - 2026-03-08 00:45:01 --> [spark:ops:work] Completed
INFO - 2026-03-08 00:45:01 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.275758
INFO - 2026-03-08 00:45:01 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-03-08 00:46:18 --> [REQ_ID=6f4186048fe5] [REQUEST][START] HEAD /
DEBUG - 2026-03-08 00:46:18 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-08 00:46:18 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-08 00:46:18 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-08 00:46:18 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-08 00:46:18 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-08 00:51:18 --> [REQ_ID=2f78319aa09f] [REQUEST][START] HEAD /
DEBUG - 2026-03-08 00:51:18 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-08 00:51:18 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-08 00:51:18 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-08 00:51:18 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-08 00:51:18 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-08 00:54:58 --> [REQ_ID=37d041e65517] [REQUEST][START] GET /
DEBUG - 2026-03-08 00:54:58 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-08 00:54:58 --> [REQ_ID=37d041e65517] [FILTER_BEFORE] /
DEBUG - 2026-03-08 00:54:58 --> [REQ_ID=37d041e65517] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-08 00:54:58 --> [REQ_ID=37d041e65517] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-08 00:54:58 --> [CSRF] token name=csrf_test_name hash=5fd6f46cbc377abf2ff35886a6e67c30
DEBUG - 2026-03-08 00:54:58 --> [REQ_ID=59789b53514c] [INIT] App\Controllers\Home::GET
INFO - 2026-03-08 00:54:58 --> [REQ_ID=59789b53514c] [MEMORY][controller-start] 6291456
INFO - 2026-03-08 00:54:58 --> [REQ_ID=59789b53514c] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-08 00:54:58 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-08 00:54:59 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-03-08 00:54:59 --> [REQ_ID=59789b53514c] [VIEW_RENDER] themes/public/home
INFO - 2026-03-08 00:54:59 --> [REQ_ID=59789b53514c] [MEMORY][commonData:start] 10485760
INFO - 2026-03-08 00:54:59 --> themesMemory usage: 10485760
DEBUG - 2026-03-08 00:54:59 --> [MetaService] slug= pageName=Home cacheHit= path=DB
DEBUG - 2026-03-08 00:54:59 --> [REQ_ID=37d041e65517] [FILTER_AFTER]
DEBUG - 2026-03-08 00:54:59 --> [REQ_ID=37d041e65517] [LIFECYCLE][END] status=200 duration_ms=1,000.70 memory_delta=4194304
INFO - 2026-03-08 00:54:59 --> [REQ_ID=59789b53514c] [PERF] Execution time=0.999166
DEBUG - 2026-03-08 00:54:59 --> [REQ_ID=37d041e65517] [REQUEST][END]
INFO - 2026-03-08 00:54:59 --> [REQ_ID=37d041e65517] [PERF] Execution time=1.043080
DEBUG - 2026-03-08 00:56:18 --> [REQ_ID=5af4d393499a] [REQUEST][START] HEAD /
DEBUG - 2026-03-08 00:56:18 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-08 00:56:18 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-08 00:56:18 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-08 00:56:18 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-08 00:56:18 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
