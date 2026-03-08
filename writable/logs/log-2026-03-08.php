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
INFO - 2026-03-08 00:59:19 --> [SPARK_START] App\Commands\Ops\CommandsAudit
INFO - 2026-03-08 00:59:19 --> [SPARK_MEMORY] 16777216
INFO - 2026-03-08 00:59:19 --> [spark:ops:commands:audit] Intent
INFO - 2026-03-08 00:59:19 --> [SPARK_COMPLETE] App\Commands\Ops\CommandsAudit duration=0.001467
INFO - 2026-03-08 00:59:19 --> [SPARK_MEMORY] 16777216
CRITICAL - 2026-03-08 00:59:19 --> Error: Call to undefined method App\Commands\Ops\CommandsAudit::isCiRuntime()
[Method: CLI, Route: ops:commands:audit]
in APPPATH/Commands/Ops/CommandsAudit.php on line 22.
 1 SYSTEMPATH/CLI/Commands.php(74): App\Commands\Ops\CommandsAudit->run([])
 2 SYSTEMPATH/CLI/Console.php(47): CodeIgniter\CLI\Commands->run('ops:commands:audit', [])
 3 SYSTEMPATH/Boot.php(442): CodeIgniter\CLI\Console->run()
 4 SYSTEMPATH/Boot.php(166): CodeIgniter\Boot::runCommand(Object(CodeIgniter\CLI\Console))
 5 ROOTPATH/spark(99): CodeIgniter\Boot::bootSpark(Object(Config\Paths))
CRITICAL - 2026-03-08 00:59:19 --> [EXCEPTION] Call to undefined method App\Commands\Ops\CommandsAudit::isCiRuntime() File=/home/mymiteam/mymiwallet/site/current/app/Commands/Ops/CommandsAudit.php Line=22
INFO - 2026-03-08 01:00:02 --> [spark:ops:work] Started
INFO - 2026-03-08 01:00:02 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-03-08 01:00:02 --> [SPARK_MEMORY] 16777216
INFO - 2026-03-08 01:00:02 --> [spark:ops:work] Intent
INFO - 2026-03-08 01:00:02 --> [spark:ops:work] Completed
INFO - 2026-03-08 01:00:02 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.054396
INFO - 2026-03-08 01:00:02 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-03-08 01:00:02 --> [REQ_ID=9fb56589d32d] [REQUEST][START] GET /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-08 01:00:02 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-08 01:00:02 --> [REQ_ID=9fb56589d32d] [FILTER_BEFORE] /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-08 01:00:02 --> [REQ_ID=9fb56589d32d] [ROUTE] Controller=\App\Modules\Management\Controllers\ManagementAPIController Method=Run_CRON_Tasks
DEBUG - 2026-03-08 01:00:02 --> [REQ_ID=9fb56589d32d] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-08 01:00:02 --> [REQ_ID=9fb56589d32d] [REQUEST][END]
INFO - 2026-03-08 01:00:02 --> [REQ_ID=9fb56589d32d] [PERF] Execution time=0.048265
DEBUG - 2026-03-08 01:01:18 --> [REQ_ID=2fb367f4aad9] [REQUEST][START] HEAD /
DEBUG - 2026-03-08 01:01:18 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-08 01:01:18 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-08 01:01:18 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-08 01:01:18 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-08 01:01:18 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-08 01:06:18 --> [REQ_ID=6610d5093ce3] [REQUEST][START] HEAD /
DEBUG - 2026-03-08 01:06:18 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-08 01:06:18 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-08 01:06:18 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-08 01:06:18 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-08 01:06:18 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-08 01:11:18 --> [REQ_ID=2ac55a463a48] [REQUEST][START] HEAD /
DEBUG - 2026-03-08 01:11:18 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-08 01:11:18 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-08 01:11:18 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-08 01:11:18 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-08 01:11:18 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
INFO - 2026-03-08 01:15:02 --> [spark:ops:work] Started
INFO - 2026-03-08 01:15:02 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-03-08 01:15:02 --> [SPARK_MEMORY] 16777216
INFO - 2026-03-08 01:15:02 --> [spark:ops:work] Intent
DEBUG - 2026-03-08 01:15:02 --> [REQ_ID=ccace302d30f] [REQUEST][START] GET /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-08 01:15:02 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
INFO - 2026-03-08 01:15:02 --> [spark:ops:work] Completed
INFO - 2026-03-08 01:15:02 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.216105
INFO - 2026-03-08 01:15:02 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-03-08 01:15:02 --> [REQ_ID=ccace302d30f] [FILTER_BEFORE] /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-08 01:15:02 --> [REQ_ID=ccace302d30f] [ROUTE] Controller=\App\Modules\APIs\Controllers\AlertsAPIController Method=fetchEmailAlerts
DEBUG - 2026-03-08 01:15:02 --> [REQ_ID=ccace302d30f] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-08 01:15:02 --> [REQ_ID=ccace302d30f] [REQUEST][END]
INFO - 2026-03-08 01:15:02 --> [REQ_ID=ccace302d30f] [PERF] Execution time=0.052497
DEBUG - 2026-03-08 01:16:18 --> [REQ_ID=ddb7d2dbe7a7] [REQUEST][START] HEAD /
DEBUG - 2026-03-08 01:16:18 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-08 01:16:18 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-08 01:16:18 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-08 01:16:18 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-08 01:16:18 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-08 01:21:18 --> [REQ_ID=46cb6de9480a] [REQUEST][START] HEAD /
DEBUG - 2026-03-08 01:21:18 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-08 01:21:18 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-08 01:21:18 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-08 01:21:18 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-08 01:21:18 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-08 01:26:18 --> [REQ_ID=47117707fa58] [REQUEST][START] HEAD /
DEBUG - 2026-03-08 01:26:18 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-08 01:26:18 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-08 01:26:18 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-08 01:26:18 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-08 01:26:18 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
INFO - 2026-03-08 01:30:01 --> [spark:ops:work] Started
INFO - 2026-03-08 01:30:01 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-03-08 01:30:01 --> [SPARK_MEMORY] 16777216
INFO - 2026-03-08 01:30:01 --> [spark:ops:work] Intent
INFO - 2026-03-08 01:30:01 --> [spark:ops:work] Completed
INFO - 2026-03-08 01:30:01 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.153594
INFO - 2026-03-08 01:30:01 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-03-08 01:31:18 --> [REQ_ID=bbb1d6c890e0] [REQUEST][START] HEAD /
DEBUG - 2026-03-08 01:31:18 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-08 01:31:18 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-08 01:31:18 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-08 01:31:18 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-08 01:31:18 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
INFO - 2026-03-08 01:34:38 --> [SPARK_START] App\Commands\Ops\Commands\Audit
INFO - 2026-03-08 01:34:38 --> [SPARK_MEMORY] 18874368
INFO - 2026-03-08 01:34:38 --> [spark:ops:commands:audit] Intent
INFO - 2026-03-08 01:34:38 --> [SPARK_COMPLETE] App\Commands\Ops\Commands\Audit duration=0.003097
INFO - 2026-03-08 01:34:38 --> [SPARK_MEMORY] 18874368
CRITICAL - 2026-03-08 01:34:38 --> Error: Call to undefined method App\Commands\Ops\Commands\Audit::isCiRuntime()
[Method: CLI, Route: ops:commands:audit]
in APPPATH/Commands/Ops/Commands/Audit.php on line 22.
 1 SYSTEMPATH/CLI/Commands.php(74): App\Commands\Ops\Commands\Audit->run([])
 2 SYSTEMPATH/CLI/Console.php(47): CodeIgniter\CLI\Commands->run('ops:commands:audit', [])
 3 SYSTEMPATH/Boot.php(442): CodeIgniter\CLI\Console->run()
 4 SYSTEMPATH/Boot.php(166): CodeIgniter\Boot::runCommand(Object(CodeIgniter\CLI\Console))
 5 ROOTPATH/spark(99): CodeIgniter\Boot::bootSpark(Object(Config\Paths))
CRITICAL - 2026-03-08 01:34:38 --> [EXCEPTION] Call to undefined method App\Commands\Ops\Commands\Audit::isCiRuntime() File=/home/mymiteam/mymiwallet/site/current/app/Commands/Ops/Commands/Audit.php Line=22
DEBUG - 2026-03-08 01:35:05 --> [REQ_ID=f4f0081d0a92] [REQUEST][START] GET /index.php/Customer-Support
DEBUG - 2026-03-08 01:35:05 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-08 01:35:05 --> [REQ_ID=f4f0081d0a92] [FILTER_BEFORE] /index.php/Customer-Support
DEBUG - 2026-03-08 01:35:05 --> [REQ_ID=f4f0081d0a92] [ROUTE] Controller=\App\Controllers\App\Modules\Support\Controllers\SupportController Method=index
DEBUG - 2026-03-08 01:35:05 --> [REQ_ID=f4f0081d0a92] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Customer-Support
DEBUG - 2026-03-08 01:35:05 --> [CSRF] token name=csrf_test_name hash=363faedfb05752e64072482b6f51dad4
DEBUG - 2026-03-08 01:35:05 --> [REQ_ID=f4f0081d0a92] [REQUEST][END]
INFO - 2026-03-08 01:35:05 --> [REQ_ID=f4f0081d0a92] [PERF] Execution time=0.049008
DEBUG - 2026-03-08 01:35:06 --> [REQ_ID=0f4822c5b951] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-08 01:35:06 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-08 01:35:06 --> [REQ_ID=0f4822c5b951] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-08 01:35:06 --> [REQ_ID=0f4822c5b951] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-08 01:35:06 --> [REQ_ID=0f4822c5b951] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-08 01:35:06 --> [CSRF] token name=csrf_test_name hash=3aa5a1132be8b906d0c497a468a6bc64
DEBUG - 2026-03-08 01:35:06 --> [REQ_ID=6d88b77409de] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-08 01:35:06 --> [REQ_ID=6d88b77409de] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-08 01:35:06 --> [REQ_ID=0f4822c5b951] [FILTER_AFTER]
DEBUG - 2026-03-08 01:35:06 --> [REQ_ID=0f4822c5b951] [LIFECYCLE][END] status=200 duration_ms=64.85 memory_delta=0
INFO - 2026-03-08 01:35:06 --> [REQ_ID=6d88b77409de] [PERF] Execution time=0.064537
DEBUG - 2026-03-08 01:35:06 --> [REQ_ID=0f4822c5b951] [REQUEST][END]
INFO - 2026-03-08 01:35:06 --> [REQ_ID=0f4822c5b951] [PERF] Execution time=0.081022
DEBUG - 2026-03-08 01:36:18 --> [REQ_ID=f2498d0fbe7a] [REQUEST][START] HEAD /
DEBUG - 2026-03-08 01:36:18 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-08 01:36:18 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-08 01:36:18 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-08 01:36:18 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-08 01:36:18 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
INFO - 2026-03-08 01:36:38 --> [SPARK_START] App\Commands\Ops\Commands\Audit
INFO - 2026-03-08 01:36:38 --> [SPARK_MEMORY] 18874368
INFO - 2026-03-08 01:36:38 --> [spark:ops:commands:audit] Intent
INFO - 2026-03-08 01:36:38 --> [SPARK_COMPLETE] App\Commands\Ops\Commands\Audit duration=0.001496
INFO - 2026-03-08 01:36:38 --> [SPARK_MEMORY] 18874368
CRITICAL - 2026-03-08 01:36:38 --> Error: Call to undefined method App\Commands\Ops\Commands\Audit::isCiRuntime()
[Method: CLI, Route: ops:commands:audit]
in APPPATH/Commands/Ops/Commands/Audit.php on line 22.
 1 SYSTEMPATH/CLI/Commands.php(74): App\Commands\Ops\Commands\Audit->run([])
 2 SYSTEMPATH/CLI/Console.php(47): CodeIgniter\CLI\Commands->run('ops:commands:audit', [])
 3 SYSTEMPATH/Boot.php(442): CodeIgniter\CLI\Console->run()
 4 SYSTEMPATH/Boot.php(166): CodeIgniter\Boot::runCommand(Object(CodeIgniter\CLI\Console))
 5 ROOTPATH/spark(99): CodeIgniter\Boot::bootSpark(Object(Config\Paths))
CRITICAL - 2026-03-08 01:36:38 --> [EXCEPTION] Call to undefined method App\Commands\Ops\Commands\Audit::isCiRuntime() File=/home/mymiteam/mymiwallet/site/current/app/Commands/Ops/Commands/Audit.php Line=22
INFO - 2026-03-08 01:37:41 --> [SPARK_START] App\Commands\Ops\Commands\Audit
INFO - 2026-03-08 01:37:41 --> [SPARK_MEMORY] 18874368
INFO - 2026-03-08 01:37:41 --> [spark:ops:commands:audit] Intent
INFO - 2026-03-08 01:37:41 --> [SPARK_COMPLETE] App\Commands\Ops\Commands\Audit duration=0.001545
INFO - 2026-03-08 01:37:41 --> [SPARK_MEMORY] 18874368
CRITICAL - 2026-03-08 01:37:41 --> Error: Call to undefined method App\Commands\Ops\Commands\Audit::isCiRuntime()
[Method: CLI, Route: ops:commands:audit]
in APPPATH/Commands/Ops/Commands/Audit.php on line 22.
 1 SYSTEMPATH/CLI/Commands.php(74): App\Commands\Ops\Commands\Audit->run([])
 2 SYSTEMPATH/CLI/Console.php(47): CodeIgniter\CLI\Commands->run('ops:commands:audit', [])
 3 SYSTEMPATH/Boot.php(442): CodeIgniter\CLI\Console->run()
 4 SYSTEMPATH/Boot.php(166): CodeIgniter\Boot::runCommand(Object(CodeIgniter\CLI\Console))
 5 ROOTPATH/spark(99): CodeIgniter\Boot::bootSpark(Object(Config\Paths))
CRITICAL - 2026-03-08 01:37:41 --> [EXCEPTION] Call to undefined method App\Commands\Ops\Commands\Audit::isCiRuntime() File=/home/mymiteam/mymiwallet/site/current/app/Commands/Ops/Commands/Audit.php Line=22
INFO - 2026-03-08 01:37:57 --> [SPARK_START] App\Commands\Ops\Commands\Audit
INFO - 2026-03-08 01:37:57 --> [SPARK_MEMORY] 18874368
INFO - 2026-03-08 01:37:57 --> [spark:ops:commands:audit] Intent
INFO - 2026-03-08 01:37:57 --> [SPARK_COMPLETE] App\Commands\Ops\Commands\Audit duration=0.018226
INFO - 2026-03-08 01:37:57 --> [SPARK_MEMORY] 18874368
INFO - 2026-03-08 01:40:34 --> [SPARK_START] App\Commands\Ops\Commands\Audit
INFO - 2026-03-08 01:40:34 --> [SPARK_MEMORY] 18874368
INFO - 2026-03-08 01:40:34 --> [spark:ops:commands:audit] Intent
INFO - 2026-03-08 01:40:34 --> [SPARK_COMPLETE] App\Commands\Ops\Commands\Audit duration=0.028507
INFO - 2026-03-08 01:40:34 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-03-08 01:41:18 --> [REQ_ID=e085a3d6b1ee] [REQUEST][START] HEAD /
DEBUG - 2026-03-08 01:41:18 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-08 01:41:18 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-08 01:41:18 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-08 01:41:18 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-08 01:41:18 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
INFO - 2026-03-08 01:45:02 --> [spark:ops:work] Started
INFO - 2026-03-08 01:45:02 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-03-08 01:45:02 --> [SPARK_MEMORY] 18874368
INFO - 2026-03-08 01:45:02 --> [spark:ops:work] Intent
INFO - 2026-03-08 01:45:02 --> [spark:ops:work] Completed
INFO - 2026-03-08 01:45:02 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.026046
INFO - 2026-03-08 01:45:02 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-03-08 01:46:18 --> [REQ_ID=93479ae49dab] [REQUEST][START] HEAD /
DEBUG - 2026-03-08 01:46:18 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-08 01:46:18 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-08 01:46:18 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-08 01:46:18 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-08 01:46:18 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-08 01:51:18 --> [REQ_ID=d2dde34c5fef] [REQUEST][START] HEAD /
DEBUG - 2026-03-08 01:51:18 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-08 01:51:18 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-08 01:51:18 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-08 01:51:18 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-08 01:51:18 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-08 01:56:18 --> [REQ_ID=93e774dc1ec1] [REQUEST][START] HEAD /
DEBUG - 2026-03-08 01:56:18 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-08 01:56:18 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-08 01:56:18 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-08 01:56:18 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-08 01:56:18 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
INFO - 2026-03-08 02:00:01 --> [SPARK_START] App\Commands\AIOps\Run
INFO - 2026-03-08 02:00:01 --> [SPARK_MEMORY] 18874368
INFO - 2026-03-08 02:00:01 --> [spark:aiops:run] Intent
INFO - 2026-03-08 02:00:01 --> [spark:ops:work] Started
INFO - 2026-03-08 02:00:01 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-03-08 02:00:01 --> [SPARK_MEMORY] 18874368
INFO - 2026-03-08 02:00:01 --> [spark:ops:work] Intent
DEBUG - 2026-03-08 02:00:01 --> [REQ_ID=c308b16bcf94] [REQUEST][START] GET /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-08 02:00:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
INFO - 2026-03-08 02:00:01 --> [spark:ops:work] Completed
INFO - 2026-03-08 02:00:01 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.104634
INFO - 2026-03-08 02:00:01 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-03-08 02:00:01 --> [REQ_ID=c308b16bcf94] [FILTER_BEFORE] /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-08 02:00:01 --> [REQ_ID=c308b16bcf94] [ROUTE] Controller=\App\Modules\Management\Controllers\ManagementAPIController Method=Run_CRON_Tasks
DEBUG - 2026-03-08 02:00:01 --> [REQ_ID=c308b16bcf94] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-08 02:00:01 --> [REQ_ID=c308b16bcf94] [REQUEST][END]
INFO - 2026-03-08 02:00:01 --> [REQ_ID=c308b16bcf94] [PERF] Execution time=0.104783
INFO - 2026-03-08 02:00:02 --> [AIOPS][SPARK][GOVERNANCE][spark:logs:summarize] Started
INFO - 2026-03-08 02:00:02 --> [SPARK_START] App\Commands\Logs\Summarize
INFO - 2026-03-08 02:00:02 --> [SPARK_MEMORY] 18874368
INFO - 2026-03-08 02:00:02 --> [spark:logs:summarize] Intent
INFO - 2026-03-08 02:00:02 --> [AIOPS][SPARK][GOVERNANCE][spark:logs:summarize] Completed
INFO - 2026-03-08 02:00:02 --> [SPARK_COMPLETE] App\Commands\Logs\Summarize duration=0.004207
INFO - 2026-03-08 02:00:02 --> [SPARK_MEMORY] 18874368
INFO - 2026-03-08 02:00:03 --> [spark:app:healthcheck] Started
INFO - 2026-03-08 02:00:03 --> [SPARK_START] App\Commands\App\Healthcheck
INFO - 2026-03-08 02:00:03 --> [SPARK_MEMORY] 18874368
INFO - 2026-03-08 02:00:03 --> [spark:app:healthcheck] Intent
DEBUG - 2026-03-08 02:00:03 --> LOG_HEALTHCHECK debug marker=c6a8682d1664
INFO - 2026-03-08 02:00:03 --> LOG_HEALTHCHECK info marker=c6a8682d1664
NOTICE - 2026-03-08 02:00:03 --> LOG_HEALTHCHECK probe marker=c6a8682d1664
INFO - 2026-03-08 02:00:03 --> [spark:app:healthcheck] Completed
INFO - 2026-03-08 02:00:03 --> [SPARK_COMPLETE] App\Commands\App\Healthcheck duration=0.027284
INFO - 2026-03-08 02:00:03 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-03-08 02:00:05 --> OllamaPatchRunner:L142 - validateGeneratedPatch Content: 
WARNING - 2026-03-08 02:00:05 --> OllamaPatchRunner:L49 - Original Diff: 
DEBUG - 2026-03-08 02:00:05 --> OllamaPatchRunner:L51 - Retried Diff: 
DEBUG - 2026-03-08 02:00:05 --> OllamaPatchRunner:L142 - validateGeneratedPatch Content: 
DEBUG - 2026-03-08 02:00:05 --> OllamaPatchRunner:L53 - Validating Generated Patch Failed
INFO - 2026-03-08 02:00:05 --> [SPARK_COMPLETE] App\Commands\AIOps\Run duration=4.145404
INFO - 2026-03-08 02:00:05 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-03-08 02:01:18 --> [REQ_ID=0f5647ad62f8] [REQUEST][START] HEAD /
DEBUG - 2026-03-08 02:01:18 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-08 02:01:18 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-08 02:01:18 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-08 02:01:18 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-08 02:01:18 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-08 02:06:18 --> [REQ_ID=f6bc59cc133c] [REQUEST][START] HEAD /
DEBUG - 2026-03-08 02:06:18 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-08 02:06:18 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-08 02:06:18 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-08 02:06:18 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-08 02:06:18 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-08 02:09:23 --> [REQ_ID=b0b42de843c1] [REQUEST][START] GET /
DEBUG - 2026-03-08 02:09:23 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-08 02:09:23 --> [REQ_ID=b0b42de843c1] [FILTER_BEFORE] /
DEBUG - 2026-03-08 02:09:23 --> [REQ_ID=b0b42de843c1] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-08 02:09:23 --> [REQ_ID=b0b42de843c1] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-08 02:09:23 --> [CSRF] token name=csrf_test_name hash=e7d6765bc27c0c9ca02f5661f22477fd
DEBUG - 2026-03-08 02:09:23 --> [REQ_ID=dfcf64623224] [INIT] App\Controllers\Home::GET
INFO - 2026-03-08 02:09:23 --> [REQ_ID=dfcf64623224] [MEMORY][controller-start] 6291456
INFO - 2026-03-08 02:09:23 --> [REQ_ID=dfcf64623224] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-08 02:09:23 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-08 02:09:23 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-03-08 02:09:23 --> [REQ_ID=dfcf64623224] [VIEW_RENDER] themes/public/home
INFO - 2026-03-08 02:09:23 --> [REQ_ID=dfcf64623224] [MEMORY][commonData:start] 10485760
INFO - 2026-03-08 02:09:23 --> themesMemory usage: 10485760
DEBUG - 2026-03-08 02:09:23 --> [MetaService] slug= pageName=Home cacheHit= path=DB
DEBUG - 2026-03-08 02:09:23 --> [REQ_ID=b0b42de843c1] [FILTER_AFTER]
DEBUG - 2026-03-08 02:09:23 --> [REQ_ID=b0b42de843c1] [LIFECYCLE][END] status=200 duration_ms=675.60 memory_delta=4194304
INFO - 2026-03-08 02:09:23 --> [REQ_ID=dfcf64623224] [PERF] Execution time=0.672386
DEBUG - 2026-03-08 02:09:23 --> [REQ_ID=b0b42de843c1] [REQUEST][END]
INFO - 2026-03-08 02:09:23 --> [REQ_ID=b0b42de843c1] [PERF] Execution time=0.714587
DEBUG - 2026-03-08 02:11:18 --> [REQ_ID=96a0e79c1ef2] [REQUEST][START] HEAD /
DEBUG - 2026-03-08 02:11:18 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-08 02:11:18 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-08 02:11:18 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-08 02:11:18 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-08 02:11:18 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
INFO - 2026-03-08 02:15:01 --> [spark:ops:work] Started
INFO - 2026-03-08 02:15:01 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-03-08 02:15:01 --> [SPARK_MEMORY] 18874368
INFO - 2026-03-08 02:15:01 --> [spark:ops:work] Intent
INFO - 2026-03-08 02:15:01 --> [spark:ops:work] Completed
INFO - 2026-03-08 02:15:01 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.049142
INFO - 2026-03-08 02:15:01 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-03-08 02:15:01 --> [REQ_ID=5360f09f19d5] [REQUEST][START] GET /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-08 02:15:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-08 02:15:01 --> [REQ_ID=5360f09f19d5] [FILTER_BEFORE] /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-08 02:15:01 --> [REQ_ID=5360f09f19d5] [ROUTE] Controller=\App\Modules\APIs\Controllers\AlertsAPIController Method=fetchEmailAlerts
DEBUG - 2026-03-08 02:15:01 --> [REQ_ID=5360f09f19d5] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-08 02:15:01 --> [REQ_ID=5360f09f19d5] [REQUEST][END]
INFO - 2026-03-08 02:15:01 --> [REQ_ID=5360f09f19d5] [PERF] Execution time=0.073539
DEBUG - 2026-03-08 02:16:18 --> [REQ_ID=9696ce88d06b] [REQUEST][START] HEAD /
DEBUG - 2026-03-08 02:16:18 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-08 02:16:18 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-08 02:16:18 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-08 02:16:18 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-08 02:16:18 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-08 02:20:28 --> [REQ_ID=bd3f7b209934] [REQUEST][START] GET /index.php/Management/Marketing/Video-Creator
DEBUG - 2026-03-08 02:20:28 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-08 02:20:28 --> [REQ_ID=bd3f7b209934] [FILTER_BEFORE] /index.php/Management/Marketing/Video-Creator
DEBUG - 2026-03-08 02:20:28 --> [REQ_ID=bd3f7b209934] [ROUTE] Controller=\App\Modules\Management\Controllers\MarketingAdminController Method=videoCreator
DEBUG - 2026-03-08 02:20:28 --> [REQ_ID=bd3f7b209934] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Management/Marketing/Video-Creator
DEBUG - 2026-03-08 02:20:28 --> [CSRF] token name=csrf_test_name hash=6b8b422be64bb4dbbf8d0703d632d328
DEBUG - 2026-03-08 02:20:28 --> [REQ_ID=bd3f7b209934] [REQUEST][END]
INFO - 2026-03-08 02:20:28 --> [REQ_ID=bd3f7b209934] [PERF] Execution time=0.058573
DEBUG - 2026-03-08 02:20:29 --> [REQ_ID=1ff163dd1287] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-08 02:20:29 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-08 02:20:29 --> [REQ_ID=1ff163dd1287] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-08 02:20:29 --> [REQ_ID=1ff163dd1287] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-08 02:20:29 --> [REQ_ID=1ff163dd1287] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-08 02:20:29 --> [CSRF] token name=csrf_test_name hash=6ecb027de2a4b5061daee0cad02b6a68
DEBUG - 2026-03-08 02:20:29 --> [REQ_ID=c73bd01f97cd] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-08 02:20:29 --> [REQ_ID=c73bd01f97cd] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-08 02:20:29 --> [REQ_ID=1ff163dd1287] [FILTER_AFTER]
DEBUG - 2026-03-08 02:20:29 --> [REQ_ID=1ff163dd1287] [LIFECYCLE][END] status=200 duration_ms=59.38 memory_delta=0
INFO - 2026-03-08 02:20:29 --> [REQ_ID=c73bd01f97cd] [PERF] Execution time=0.059107
DEBUG - 2026-03-08 02:20:29 --> [REQ_ID=1ff163dd1287] [REQUEST][END]
INFO - 2026-03-08 02:20:29 --> [REQ_ID=1ff163dd1287] [PERF] Execution time=0.071246
DEBUG - 2026-03-08 02:21:18 --> [REQ_ID=121fcac46881] [REQUEST][START] HEAD /
DEBUG - 2026-03-08 02:21:18 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-08 02:21:18 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-08 02:21:18 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-08 02:21:18 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-08 02:21:18 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-08 02:23:06 --> [REQ_ID=bf291c1fc822] [REQUEST][START] GET /index.php/How-It-Works
DEBUG - 2026-03-08 02:23:06 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-08 02:23:06 --> [REQ_ID=bf291c1fc822] [FILTER_BEFORE] /index.php/How-It-Works
DEBUG - 2026-03-08 02:23:06 --> [REQ_ID=bf291c1fc822] [ROUTE] Controller=\App\Modules\Blog\Controllers\HowItWorksController Method=index
DEBUG - 2026-03-08 02:23:06 --> [REQ_ID=bf291c1fc822] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/How-It-Works
DEBUG - 2026-03-08 02:23:06 --> [CSRF] token name=csrf_test_name hash=9e852ec3a09e7830fa59b0a2b96030b8
DEBUG - 2026-03-08 02:23:06 --> [REQ_ID=0220941c176f] [INIT] App\Modules\Blog\Controllers\HowItWorksController::GET
INFO - 2026-03-08 02:23:06 --> [REQ_ID=0220941c176f] [MEMORY][controller-start] 6291456
DEBUG - 2026-03-08 02:23:06 --> [REQ_ID=0220941c176f] [METHOD_ENTRY] index
DEBUG - 2026-03-08 02:23:06 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-08 02:23:06 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-08 02:23:06 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-08 02:23:06 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-08 02:23:06 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-08 02:23:06 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-08 02:23:06 --> [REQ_ID=0220941c176f] [VIEW_RENDER] App\Modules\Blog\Views\HowItWorks\index
INFO - 2026-03-08 02:23:06 --> [REQ_ID=0220941c176f] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-08 02:23:06 --> [MetaService] slug=how-it-works pageName= cacheHit= path=DB
INFO - 2026-03-08 02:23:06 --> themesMemory usage: 10485760
DEBUG - 2026-03-08 02:23:06 --> [MetaService] slug=how-it-works pageName= cacheHit=1 path=CACHE
DEBUG - 2026-03-08 02:23:06 --> [REQ_ID=bf291c1fc822] [FILTER_AFTER]
DEBUG - 2026-03-08 02:23:06 --> [REQ_ID=bf291c1fc822] [LIFECYCLE][END] status=200 duration_ms=859.34 memory_delta=4194304
INFO - 2026-03-08 02:23:06 --> [REQ_ID=0220941c176f] [PERF] Execution time=0.857112
DEBUG - 2026-03-08 02:23:06 --> [REQ_ID=bf291c1fc822] [REQUEST][END]
INFO - 2026-03-08 02:23:06 --> [REQ_ID=bf291c1fc822] [PERF] Execution time=0.900989
DEBUG - 2026-03-08 02:26:18 --> [REQ_ID=11a17e910e65] [REQUEST][START] HEAD /
DEBUG - 2026-03-08 02:26:18 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-08 02:26:18 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-08 02:26:18 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-08 02:26:18 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-08 02:26:18 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
INFO - 2026-03-08 02:30:01 --> [spark:ops:work] Started
INFO - 2026-03-08 02:30:01 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-03-08 02:30:01 --> [SPARK_MEMORY] 18874368
INFO - 2026-03-08 02:30:01 --> [spark:ops:work] Intent
INFO - 2026-03-08 02:30:01 --> [spark:ops:work] Completed
INFO - 2026-03-08 02:30:01 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.023916
INFO - 2026-03-08 02:30:01 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-03-08 02:30:46 --> [REQ_ID=d9fd977deab4] [REQUEST][START] GET /index.php/Support
DEBUG - 2026-03-08 02:30:46 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-08 02:30:46 --> [REQ_ID=d9fd977deab4] [FILTER_BEFORE] /index.php/Support
DEBUG - 2026-03-08 02:30:46 --> [REQ_ID=d9fd977deab4] [ROUTE] Controller=\App\Modules\Support\Controllers\SupportController Method=index
DEBUG - 2026-03-08 02:30:46 --> [REQ_ID=d9fd977deab4] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Support
DEBUG - 2026-03-08 02:30:46 --> [CSRF] token name=csrf_test_name hash=76ac4d3dc351908e74164db523ba28c9
DEBUG - 2026-03-08 02:30:46 --> [REQ_ID=db65fa5d4058] [INIT] App\Modules\Support\Controllers\SupportController::GET
INFO - 2026-03-08 02:30:46 --> [REQ_ID=db65fa5d4058] [MEMORY][controller-start] 6291456
DEBUG - 2026-03-08 02:30:46 --> [REQ_ID=db65fa5d4058] [METHOD_ENTRY] index
DEBUG - 2026-03-08 02:30:46 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-08 02:30:46 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-08 02:30:46 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-08 02:30:46 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-08 02:30:46 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-08 02:30:46 --> MyMICoin: guest context detected; skipping user-specific preload.
INFO - 2026-03-08 02:30:46 --> [REQ_ID=db65fa5d4058] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-08 02:30:46 --> [REQ_ID=db65fa5d4058] [VIEW_RENDER] SupportModule\Views\Support\index
INFO - 2026-03-08 02:30:46 --> [REQ_ID=db65fa5d4058] [MEMORY][commonData:start] 6291456
INFO - 2026-03-08 02:30:46 --> themesMemory usage: 6291456
DEBUG - 2026-03-08 02:30:46 --> [REQ_ID=d9fd977deab4] [FILTER_AFTER]
DEBUG - 2026-03-08 02:30:46 --> [REQ_ID=d9fd977deab4] [LIFECYCLE][END] status=200 duration_ms=128.78 memory_delta=0
INFO - 2026-03-08 02:30:46 --> [REQ_ID=db65fa5d4058] [PERF] Execution time=0.126716
DEBUG - 2026-03-08 02:30:46 --> [REQ_ID=d9fd977deab4] [REQUEST][END]
INFO - 2026-03-08 02:30:46 --> [REQ_ID=d9fd977deab4] [PERF] Execution time=0.171208
DEBUG - 2026-03-08 02:31:18 --> [REQ_ID=9458682891a6] [REQUEST][START] HEAD /
DEBUG - 2026-03-08 02:31:18 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-08 02:31:18 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-08 02:31:18 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-08 02:31:18 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-08 02:31:18 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-08 02:36:09 --> [REQ_ID=e5b46039-b583-45a8-a066-2d17c565e45c] [REQUEST][START] GET /
DEBUG - 2026-03-08 02:36:09 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-08 02:36:09 --> [REQ_ID=e5b46039-b583-45a8-a066-2d17c565e45c] [FILTER_BEFORE] /
DEBUG - 2026-03-08 02:36:09 --> [REQ_ID=e5b46039-b583-45a8-a066-2d17c565e45c] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-08 02:36:09 --> [REQ_ID=e5b46039-b583-45a8-a066-2d17c565e45c] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-08 02:36:09 --> [CSRF] token name=csrf_test_name hash=50c135b3ba57cd920889795b7aa475b4
DEBUG - 2026-03-08 02:36:09 --> [REQ_ID=af95b0adb60b] [INIT] App\Controllers\Home::GET
INFO - 2026-03-08 02:36:09 --> [REQ_ID=af95b0adb60b] [MEMORY][controller-start] 6291456
INFO - 2026-03-08 02:36:09 --> [REQ_ID=af95b0adb60b] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-08 02:36:09 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-08 02:36:10 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-03-08 02:36:10 --> [REQ_ID=af95b0adb60b] [VIEW_RENDER] themes/public/home
INFO - 2026-03-08 02:36:10 --> [REQ_ID=af95b0adb60b] [MEMORY][commonData:start] 10485760
INFO - 2026-03-08 02:36:10 --> themesMemory usage: 10485760
DEBUG - 2026-03-08 02:36:10 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-08 02:36:10 --> [REQ_ID=e5b46039-b583-45a8-a066-2d17c565e45c] [FILTER_AFTER]
DEBUG - 2026-03-08 02:36:10 --> [REQ_ID=e5b46039-b583-45a8-a066-2d17c565e45c] [LIFECYCLE][END] status=200 duration_ms=652.51 memory_delta=4194304
INFO - 2026-03-08 02:36:10 --> [REQ_ID=af95b0adb60b] [PERF] Execution time=0.649623
DEBUG - 2026-03-08 02:36:10 --> [REQ_ID=e5b46039-b583-45a8-a066-2d17c565e45c] [REQUEST][END]
INFO - 2026-03-08 02:36:10 --> [REQ_ID=e5b46039-b583-45a8-a066-2d17c565e45c] [PERF] Execution time=0.696210
DEBUG - 2026-03-08 02:36:18 --> [REQ_ID=fed42ce086cd] [REQUEST][START] HEAD /
DEBUG - 2026-03-08 02:36:18 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-08 02:36:18 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-08 02:36:18 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-08 02:36:18 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-08 02:36:18 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-08 02:37:30 --> [REQ_ID=2dc88a790755] [REQUEST][START] GET /
DEBUG - 2026-03-08 02:37:30 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-08 02:37:30 --> [REQ_ID=2dc88a790755] [FILTER_BEFORE] /
DEBUG - 2026-03-08 02:37:30 --> [REQ_ID=2dc88a790755] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-08 02:37:30 --> [REQ_ID=2dc88a790755] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-08 02:37:30 --> [CSRF] token name=csrf_test_name hash=9ee13485d61d73f358809ecce5dbf655
DEBUG - 2026-03-08 02:37:30 --> [REQ_ID=1dbe6fd66060] [INIT] App\Controllers\Home::GET
INFO - 2026-03-08 02:37:30 --> [REQ_ID=1dbe6fd66060] [MEMORY][controller-start] 4194304
INFO - 2026-03-08 02:37:30 --> [REQ_ID=1dbe6fd66060] [MEMORY][commonData:start] 4194304
DEBUG - 2026-03-08 02:37:30 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-08 02:37:30 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
DEBUG - 2026-03-08 02:37:30 --> [REQ_ID=1dbe6fd66060] [VIEW_RENDER] themes/public/home
INFO - 2026-03-08 02:37:30 --> [REQ_ID=1dbe6fd66060] [MEMORY][commonData:start] 8388608
INFO - 2026-03-08 02:37:30 --> themesMemory usage: 8388608
DEBUG - 2026-03-08 02:37:30 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-08 02:37:30 --> [REQ_ID=2dc88a790755] [FILTER_AFTER]
DEBUG - 2026-03-08 02:37:30 --> [REQ_ID=2dc88a790755] [LIFECYCLE][END] status=200 duration_ms=561.26 memory_delta=4194304
INFO - 2026-03-08 02:37:30 --> [REQ_ID=1dbe6fd66060] [PERF] Execution time=0.561012
DEBUG - 2026-03-08 02:37:30 --> [REQ_ID=2dc88a790755] [REQUEST][END]
INFO - 2026-03-08 02:37:30 --> [REQ_ID=2dc88a790755] [PERF] Execution time=0.570816
DEBUG - 2026-03-08 02:37:31 --> [REQ_ID=88b6edc6b8d6] [REQUEST][START] GET /index.php/Management/API
DEBUG - 2026-03-08 02:37:31 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-08 02:37:31 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: GET, Route: Management/API]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-08 02:37:31 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-08 02:37:31 --> [404] URI=https://www.mymiwallet.com/index.php/Management/API
WARNING - 2026-03-08 02:37:31 --> 404 route miss: https://www.mymiwallet.com/index.php/Management/API | referrer: none
DEBUG - 2026-03-08 02:41:18 --> [REQ_ID=0418ec826564] [REQUEST][START] HEAD /
DEBUG - 2026-03-08 02:41:18 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-08 02:41:18 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-08 02:41:18 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-08 02:41:18 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-08 02:41:18 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-08 02:44:25 --> [REQ_ID=a8739fffb6c4] [REQUEST][START] GET /index.php/Budget/Financial-Forecaster
DEBUG - 2026-03-08 02:44:25 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-08 02:44:25 --> [REQ_ID=a8739fffb6c4] [FILTER_BEFORE] /index.php/Budget/Financial-Forecaster
DEBUG - 2026-03-08 02:44:25 --> [REQ_ID=a8739fffb6c4] [ROUTE] Controller=\App\Modules\User\Controllers\BudgetController Method=financialForecaster
DEBUG - 2026-03-08 02:44:25 --> [REQ_ID=a8739fffb6c4] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Budget/Financial-Forecaster
DEBUG - 2026-03-08 02:44:25 --> [CSRF] token name=csrf_test_name hash=4a3b35b970eb64d8b3fc990122bc8068
DEBUG - 2026-03-08 02:44:25 --> [REQ_ID=a8739fffb6c4] [REQUEST][END]
INFO - 2026-03-08 02:44:25 --> [REQ_ID=a8739fffb6c4] [PERF] Execution time=0.059835
DEBUG - 2026-03-08 02:44:25 --> [REQ_ID=c74d069d255f] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-08 02:44:25 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-08 02:44:25 --> [REQ_ID=c74d069d255f] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-08 02:44:25 --> [REQ_ID=c74d069d255f] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-08 02:44:25 --> [REQ_ID=c74d069d255f] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-08 02:44:25 --> [CSRF] token name=csrf_test_name hash=2ba028a4c6ee814ef01546f5c7b00a49
DEBUG - 2026-03-08 02:44:25 --> [REQ_ID=2da423ee77fb] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-08 02:44:25 --> [REQ_ID=2da423ee77fb] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-08 02:44:25 --> [REQ_ID=c74d069d255f] [FILTER_AFTER]
DEBUG - 2026-03-08 02:44:25 --> [REQ_ID=c74d069d255f] [LIFECYCLE][END] status=200 duration_ms=78.65 memory_delta=0
INFO - 2026-03-08 02:44:25 --> [REQ_ID=2da423ee77fb] [PERF] Execution time=0.078385
DEBUG - 2026-03-08 02:44:25 --> [REQ_ID=c74d069d255f] [REQUEST][END]
INFO - 2026-03-08 02:44:25 --> [REQ_ID=c74d069d255f] [PERF] Execution time=0.090617
INFO - 2026-03-08 02:45:02 --> [spark:ops:work] Started
INFO - 2026-03-08 02:45:02 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-03-08 02:45:02 --> [SPARK_MEMORY] 18874368
INFO - 2026-03-08 02:45:02 --> [spark:ops:work] Intent
INFO - 2026-03-08 02:45:02 --> [spark:ops:work] Completed
INFO - 2026-03-08 02:45:02 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.096092
INFO - 2026-03-08 02:45:02 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-03-08 02:46:18 --> [REQ_ID=332e1aee5e54] [REQUEST][START] HEAD /
DEBUG - 2026-03-08 02:46:18 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-08 02:46:18 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-08 02:46:18 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-08 02:46:18 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-08 02:46:18 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-08 02:50:15 --> [REQ_ID=6dfaeeec69a9] [REQUEST][START] GET /index.php/How-It-Works/MyMI-Exchange
DEBUG - 2026-03-08 02:50:15 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-08 02:50:16 --> [REQ_ID=6dfaeeec69a9] [FILTER_BEFORE] /index.php/How-It-Works/MyMI-Exchange
DEBUG - 2026-03-08 02:50:16 --> [REQ_ID=6dfaeeec69a9] [ROUTE] Controller=\App\Modules\Blog\Controllers\HowItWorksController Method=show
DEBUG - 2026-03-08 02:50:16 --> [REQ_ID=6dfaeeec69a9] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/How-It-Works/MyMI-Exchange
DEBUG - 2026-03-08 02:50:16 --> [CSRF] token name=csrf_test_name hash=2fa7e88dd1b9a85a58ed07048bd9c4ec
DEBUG - 2026-03-08 02:50:16 --> [REQ_ID=a658af96c77f] [INIT] App\Modules\Blog\Controllers\HowItWorksController::GET
INFO - 2026-03-08 02:50:16 --> [REQ_ID=a658af96c77f] [MEMORY][controller-start] 6291456
DEBUG - 2026-03-08 02:50:16 --> [REQ_ID=a658af96c77f] [METHOD_ENTRY] show
DEBUG - 2026-03-08 02:50:16 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-08 02:50:16 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-08 02:50:16 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-08 02:50:16 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-08 02:50:16 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-08 02:50:16 --> MyMICoin: guest context detected; skipping user-specific preload.
INFO - 2026-03-08 02:50:16 --> [REQ_ID=a658af96c77f] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-08 02:50:16 --> [REQ_ID=a658af96c77f] [VIEW_RENDER] App\Modules\Blog\Views\HowItWorks\Manage_Finances
INFO - 2026-03-08 02:50:16 --> [REQ_ID=a658af96c77f] [MEMORY][commonData:start] 10485760
INFO - 2026-03-08 02:50:17 --> themesMemory usage: 14680064
DEBUG - 2026-03-08 02:50:17 --> [REQ_ID=6dfaeeec69a9] [FILTER_AFTER]
DEBUG - 2026-03-08 02:50:17 --> [REQ_ID=6dfaeeec69a9] [LIFECYCLE][END] status=200 duration_ms=1,066.64 memory_delta=8388608
INFO - 2026-03-08 02:50:17 --> [REQ_ID=a658af96c77f] [PERF] Execution time=1.064412
DEBUG - 2026-03-08 02:50:17 --> [REQ_ID=6dfaeeec69a9] [REQUEST][END]
INFO - 2026-03-08 02:50:17 --> [REQ_ID=6dfaeeec69a9] [PERF] Execution time=1.112662
DEBUG - 2026-03-08 02:51:18 --> [REQ_ID=e314be1017e2] [REQUEST][START] HEAD /
DEBUG - 2026-03-08 02:51:18 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-08 02:51:18 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-08 02:51:18 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-08 02:51:18 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-08 02:51:18 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-08 02:51:54 --> [REQ_ID=2d34d8507579] [REQUEST][START] GET /index.php/Investments/News
DEBUG - 2026-03-08 02:51:54 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-08 02:51:54 --> [REQ_ID=2d34d8507579] [FILTER_BEFORE] /index.php/Investments/News
DEBUG - 2026-03-08 02:51:54 --> [REQ_ID=2d34d8507579] [ROUTE] Controller=closure_route Method=index
DEBUG - 2026-03-08 02:51:54 --> [REQ_ID=2d34d8507579] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Investments/News
DEBUG - 2026-03-08 02:51:54 --> [CSRF] token name=csrf_test_name hash=fe8972c451e0a330714e9b89839efd28
DEBUG - 2026-03-08 02:51:54 --> [REQ_ID=2d34d8507579] [REQUEST][END]
INFO - 2026-03-08 02:51:54 --> [REQ_ID=2d34d8507579] [PERF] Execution time=0.011358
DEBUG - 2026-03-08 02:51:54 --> [REQ_ID=d5ad793f37ce] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-08 02:51:54 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-08 02:51:54 --> [REQ_ID=d5ad793f37ce] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-08 02:51:54 --> [REQ_ID=d5ad793f37ce] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-08 02:51:54 --> [REQ_ID=d5ad793f37ce] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-08 02:51:54 --> [CSRF] token name=csrf_test_name hash=5c0990b74dd807bce223d429797fe0a1
DEBUG - 2026-03-08 02:51:54 --> [REQ_ID=c3edd067f57a] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-08 02:51:54 --> [REQ_ID=c3edd067f57a] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-08 02:51:54 --> [REQ_ID=d5ad793f37ce] [FILTER_AFTER]
DEBUG - 2026-03-08 02:51:54 --> [REQ_ID=d5ad793f37ce] [LIFECYCLE][END] status=200 duration_ms=115.97 memory_delta=0
INFO - 2026-03-08 02:51:54 --> [REQ_ID=c3edd067f57a] [PERF] Execution time=0.115764
DEBUG - 2026-03-08 02:51:54 --> [REQ_ID=d5ad793f37ce] [REQUEST][END]
INFO - 2026-03-08 02:51:54 --> [REQ_ID=d5ad793f37ce] [PERF] Execution time=0.128950
DEBUG - 2026-03-08 02:56:18 --> [REQ_ID=3f193872197e] [REQUEST][START] HEAD /
DEBUG - 2026-03-08 02:56:18 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-08 02:56:18 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-08 02:56:18 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-08 02:56:18 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-08 02:56:18 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
INFO - 2026-03-08 03:00:01 --> [spark:ops:work] Started
INFO - 2026-03-08 03:00:01 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-03-08 03:00:01 --> [SPARK_MEMORY] 18874368
INFO - 2026-03-08 03:00:01 --> [spark:ops:work] Intent
DEBUG - 2026-03-08 03:00:01 --> [REQ_ID=4260d1616bc2] [REQUEST][START] GET /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-08 03:00:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-08 03:00:01 --> [REQ_ID=4260d1616bc2] [FILTER_BEFORE] /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-08 03:00:01 --> [REQ_ID=4260d1616bc2] [ROUTE] Controller=\App\Modules\Management\Controllers\ManagementAPIController Method=Run_CRON_Tasks
DEBUG - 2026-03-08 03:00:01 --> [REQ_ID=4260d1616bc2] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-08 03:00:01 --> [REQ_ID=4260d1616bc2] [REQUEST][END]
INFO - 2026-03-08 03:00:01 --> [REQ_ID=4260d1616bc2] [PERF] Execution time=0.053008
INFO - 2026-03-08 03:00:01 --> [spark:ops:work] Completed
INFO - 2026-03-08 03:00:01 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.234316
INFO - 2026-03-08 03:00:01 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-03-08 03:01:18 --> [REQ_ID=c9ad884ba853] [REQUEST][START] HEAD /
DEBUG - 2026-03-08 03:01:18 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-08 03:01:18 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-08 03:01:18 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-08 03:01:18 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-08 03:01:18 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-08 03:01:30 --> [REQ_ID=10742b3039bb] [REQUEST][START] GET /index.php/Alerts
DEBUG - 2026-03-08 03:01:30 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-08 03:01:30 --> [REQ_ID=10742b3039bb] [FILTER_BEFORE] /index.php/Alerts
DEBUG - 2026-03-08 03:01:30 --> [REQ_ID=10742b3039bb] [ROUTE] Controller=\App\Modules\User\Controllers\AlertsController Method=index
DEBUG - 2026-03-08 03:01:30 --> [REQ_ID=10742b3039bb] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Alerts
DEBUG - 2026-03-08 03:01:30 --> [CSRF] token name=csrf_test_name hash=d51385ecbd71a15827311311e00a98b5
DEBUG - 2026-03-08 03:01:30 --> [REQ_ID=10742b3039bb] [REQUEST][END]
INFO - 2026-03-08 03:01:30 --> [REQ_ID=10742b3039bb] [PERF] Execution time=0.030035
DEBUG - 2026-03-08 03:01:31 --> [REQ_ID=10ce89864998] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-08 03:01:31 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-08 03:01:31 --> [REQ_ID=10ce89864998] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-08 03:01:31 --> [REQ_ID=10ce89864998] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-08 03:01:31 --> [REQ_ID=10ce89864998] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-08 03:01:31 --> [CSRF] token name=csrf_test_name hash=799069dc5f91473fead326ecc5a50331
DEBUG - 2026-03-08 03:01:31 --> [REQ_ID=33c6edf1157e] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-08 03:01:31 --> [REQ_ID=33c6edf1157e] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-08 03:01:31 --> [REQ_ID=10ce89864998] [FILTER_AFTER]
DEBUG - 2026-03-08 03:01:31 --> [REQ_ID=10ce89864998] [LIFECYCLE][END] status=200 duration_ms=89.73 memory_delta=0
INFO - 2026-03-08 03:01:31 --> [REQ_ID=33c6edf1157e] [PERF] Execution time=0.089393
DEBUG - 2026-03-08 03:01:31 --> [REQ_ID=10ce89864998] [REQUEST][END]
INFO - 2026-03-08 03:01:31 --> [REQ_ID=10ce89864998] [PERF] Execution time=0.102989
DEBUG - 2026-03-08 03:02:13 --> [REQ_ID=0d7867b0f59b] [REQUEST][START] GET /index.php/Features/Brokerage-Integration
DEBUG - 2026-03-08 03:02:13 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-08 03:02:13 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: GET, Route: Features/Brokerage-Integration]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-08 03:02:13 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-08 03:02:13 --> [404] URI=https://www.mymiwallet.com/index.php/Features/Brokerage-Integration
WARNING - 2026-03-08 03:02:13 --> 404 route miss: https://www.mymiwallet.com/index.php/Features/Brokerage-Integration | referrer: none
DEBUG - 2026-03-08 03:06:18 --> [REQ_ID=a10395cd713f] [REQUEST][START] HEAD /
DEBUG - 2026-03-08 03:06:18 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-08 03:06:18 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-08 03:06:18 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-08 03:06:18 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-08 03:06:18 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-08 03:07:06 --> [REQ_ID=d5e68281d8b1] [REQUEST][START] GET /
DEBUG - 2026-03-08 03:07:06 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-08 03:07:06 --> [REQ_ID=d5e68281d8b1] [FILTER_BEFORE] /
DEBUG - 2026-03-08 03:07:06 --> [REQ_ID=d5e68281d8b1] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-08 03:07:06 --> [REQ_ID=d5e68281d8b1] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-08 03:07:06 --> [CSRF] token name=csrf_test_name hash=d7928a8be6625de876b3c25baa3754f2
DEBUG - 2026-03-08 03:07:06 --> [REQ_ID=8a4808ed396a] [INIT] App\Controllers\Home::GET
INFO - 2026-03-08 03:07:06 --> [REQ_ID=8a4808ed396a] [MEMORY][controller-start] 4194304
INFO - 2026-03-08 03:07:06 --> [REQ_ID=8a4808ed396a] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-08 03:07:06 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-08 03:07:07 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-03-08 03:07:07 --> [REQ_ID=8a4808ed396a] [VIEW_RENDER] themes/public/home
INFO - 2026-03-08 03:07:07 --> [REQ_ID=8a4808ed396a] [MEMORY][commonData:start] 8388608
INFO - 2026-03-08 03:07:07 --> themesMemory usage: 8388608
DEBUG - 2026-03-08 03:07:07 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-08 03:07:07 --> [REQ_ID=d5e68281d8b1] [FILTER_AFTER]
DEBUG - 2026-03-08 03:07:07 --> [REQ_ID=d5e68281d8b1] [LIFECYCLE][END] status=200 duration_ms=594.78 memory_delta=4194304
INFO - 2026-03-08 03:07:07 --> [REQ_ID=8a4808ed396a] [PERF] Execution time=0.592338
DEBUG - 2026-03-08 03:07:07 --> [REQ_ID=d5e68281d8b1] [REQUEST][END]
INFO - 2026-03-08 03:07:07 --> [REQ_ID=d5e68281d8b1] [PERF] Execution time=0.614559
DEBUG - 2026-03-08 03:11:18 --> [REQ_ID=12d4472ada97] [REQUEST][START] HEAD /
DEBUG - 2026-03-08 03:11:18 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-08 03:11:18 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-08 03:11:18 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-08 03:11:18 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-08 03:11:18 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
INFO - 2026-03-08 03:15:01 --> [spark:ops:work] Started
INFO - 2026-03-08 03:15:01 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-03-08 03:15:01 --> [SPARK_MEMORY] 18874368
INFO - 2026-03-08 03:15:01 --> [spark:ops:work] Intent
INFO - 2026-03-08 03:15:01 --> [spark:ops:work] Completed
INFO - 2026-03-08 03:15:01 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.049541
INFO - 2026-03-08 03:15:01 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-03-08 03:15:01 --> [REQ_ID=8eb2b171cbbf] [REQUEST][START] GET /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-08 03:15:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-08 03:15:01 --> [REQ_ID=8eb2b171cbbf] [FILTER_BEFORE] /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-08 03:15:01 --> [REQ_ID=8eb2b171cbbf] [ROUTE] Controller=\App\Modules\APIs\Controllers\AlertsAPIController Method=fetchEmailAlerts
DEBUG - 2026-03-08 03:15:01 --> [REQ_ID=8eb2b171cbbf] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-08 03:15:01 --> [REQ_ID=8eb2b171cbbf] [REQUEST][END]
INFO - 2026-03-08 03:15:01 --> [REQ_ID=8eb2b171cbbf] [PERF] Execution time=0.052002
DEBUG - 2026-03-08 03:16:18 --> [REQ_ID=621152eeea47] [REQUEST][START] HEAD /
DEBUG - 2026-03-08 03:16:18 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-08 03:16:18 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-08 03:16:18 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-08 03:16:18 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-08 03:16:18 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-08 03:21:18 --> [REQ_ID=658d4b37d6bd] [REQUEST][START] HEAD /
DEBUG - 2026-03-08 03:21:18 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-08 03:21:18 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-08 03:21:18 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-08 03:21:18 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-08 03:21:18 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-08 03:26:18 --> [REQ_ID=0e318da47788] [REQUEST][START] HEAD /
DEBUG - 2026-03-08 03:26:18 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-08 03:26:18 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-08 03:26:18 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-08 03:26:18 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-08 03:26:18 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
INFO - 2026-03-08 03:30:01 --> [spark:ops:work] Started
INFO - 2026-03-08 03:30:01 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-03-08 03:30:01 --> [SPARK_MEMORY] 18874368
INFO - 2026-03-08 03:30:01 --> [spark:ops:work] Intent
INFO - 2026-03-08 03:30:01 --> [spark:ops:work] Completed
INFO - 2026-03-08 03:30:01 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.049152
INFO - 2026-03-08 03:30:01 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-03-08 03:31:18 --> [REQ_ID=e0f2bf5bc76a] [REQUEST][START] HEAD /
DEBUG - 2026-03-08 03:31:18 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-08 03:31:18 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-08 03:31:18 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-08 03:31:18 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-08 03:31:18 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-08 03:36:18 --> [REQ_ID=71c4c979486a] [REQUEST][START] HEAD /
DEBUG - 2026-03-08 03:36:18 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-08 03:36:18 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-08 03:36:18 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-08 03:36:18 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-08 03:36:18 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-08 03:40:58 --> [REQ_ID=e7205881633b] [REQUEST][START] GET /index.php/Features/Advanced-Investment-Portfoio-Manager
DEBUG - 2026-03-08 03:40:58 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-08 03:40:58 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: GET, Route: Features/Advanced-Investment-Portfoio-Manager]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-08 03:40:59 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-08 03:40:59 --> [404] URI=https://www.mymiwallet.com/index.php/Features/Advanced-Investment-Portfoio-Manager
WARNING - 2026-03-08 03:40:59 --> 404 route miss: https://www.mymiwallet.com/index.php/Features/Advanced-Investment-Portfoio-Manager | referrer: none
DEBUG - 2026-03-08 03:41:18 --> [REQ_ID=b1ff8dec1f9d] [REQUEST][START] HEAD /
DEBUG - 2026-03-08 03:41:18 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-08 03:41:18 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-08 03:41:18 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-08 03:41:18 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-08 03:41:18 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
INFO - 2026-03-08 03:45:01 --> [spark:ops:work] Started
INFO - 2026-03-08 03:45:01 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-03-08 03:45:01 --> [SPARK_MEMORY] 18874368
INFO - 2026-03-08 03:45:01 --> [spark:ops:work] Intent
INFO - 2026-03-08 03:45:01 --> [spark:ops:work] Completed
INFO - 2026-03-08 03:45:01 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.042444
INFO - 2026-03-08 03:45:01 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-03-08 03:46:18 --> [REQ_ID=32abf08cd2bd] [REQUEST][START] HEAD /
DEBUG - 2026-03-08 03:46:18 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-08 03:46:18 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-08 03:46:18 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-08 03:46:18 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-08 03:46:18 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-08 03:51:18 --> [REQ_ID=1874f51defda] [REQUEST][START] HEAD /
DEBUG - 2026-03-08 03:51:18 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-08 03:51:18 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-08 03:51:18 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-08 03:51:18 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-08 03:51:18 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-08 03:51:28 --> [REQ_ID=c6f792b5f2a0] [REQUEST][START] GET /index.php
DEBUG - 2026-03-08 03:51:28 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-08 03:51:28 --> [REQ_ID=c6f792b5f2a0] [FILTER_BEFORE] /index.php
DEBUG - 2026-03-08 03:51:28 --> [REQ_ID=c6f792b5f2a0] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-08 03:51:28 --> [REQ_ID=c6f792b5f2a0] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-08 03:51:28 --> [CSRF] token name=csrf_test_name hash=6c03224a549baf4c8df90514068378ca
DEBUG - 2026-03-08 03:51:28 --> [REQ_ID=e513196c61b8] [INIT] App\Controllers\Home::GET
INFO - 2026-03-08 03:51:28 --> [REQ_ID=e513196c61b8] [MEMORY][controller-start] 4194304
INFO - 2026-03-08 03:51:28 --> [REQ_ID=e513196c61b8] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-08 03:51:28 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-08 03:51:28 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-03-08 03:51:28 --> [REQ_ID=e513196c61b8] [VIEW_RENDER] themes/public/home
INFO - 2026-03-08 03:51:28 --> [REQ_ID=e513196c61b8] [MEMORY][commonData:start] 8388608
INFO - 2026-03-08 03:51:28 --> themesMemory usage: 8388608
DEBUG - 2026-03-08 03:51:28 --> [MetaService] slug= pageName=Home cacheHit= path=DB
DEBUG - 2026-03-08 03:51:28 --> [REQ_ID=c6f792b5f2a0] [FILTER_AFTER]
DEBUG - 2026-03-08 03:51:28 --> [REQ_ID=c6f792b5f2a0] [LIFECYCLE][END] status=200 duration_ms=640.55 memory_delta=4194304
INFO - 2026-03-08 03:51:28 --> [REQ_ID=e513196c61b8] [PERF] Execution time=0.638509
DEBUG - 2026-03-08 03:51:28 --> [REQ_ID=c6f792b5f2a0] [REQUEST][END]
INFO - 2026-03-08 03:51:28 --> [REQ_ID=c6f792b5f2a0] [PERF] Execution time=0.659502
DEBUG - 2026-03-08 03:56:18 --> [REQ_ID=fbe777aa7080] [REQUEST][START] HEAD /
DEBUG - 2026-03-08 03:56:18 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-08 03:56:18 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-08 03:56:18 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-08 03:56:18 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-08 03:56:18 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-08 03:59:27 --> [REQ_ID=7c72bcd52f0c] [REQUEST][START] GET /
DEBUG - 2026-03-08 03:59:27 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-08 03:59:27 --> [REQ_ID=7c72bcd52f0c] [FILTER_BEFORE] /
DEBUG - 2026-03-08 03:59:27 --> [REQ_ID=7c72bcd52f0c] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-08 03:59:27 --> [REQ_ID=7c72bcd52f0c] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-08 03:59:27 --> [CSRF] token name=csrf_test_name hash=e64babc53bf2bc1a5a03b5cd3a7252cb
DEBUG - 2026-03-08 03:59:27 --> [REQ_ID=ef45c7e49d43] [INIT] App\Controllers\Home::GET
INFO - 2026-03-08 03:59:27 --> [REQ_ID=ef45c7e49d43] [MEMORY][controller-start] 6291456
INFO - 2026-03-08 03:59:27 --> [REQ_ID=ef45c7e49d43] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-08 03:59:27 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-08 03:59:28 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
DEBUG - 2026-03-08 03:59:28 --> [REQ_ID=ef45c7e49d43] [VIEW_RENDER] themes/public/home
INFO - 2026-03-08 03:59:28 --> [REQ_ID=ef45c7e49d43] [MEMORY][commonData:start] 10485760
INFO - 2026-03-08 03:59:28 --> themesMemory usage: 10485760
DEBUG - 2026-03-08 03:59:28 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-08 03:59:28 --> [REQ_ID=7c72bcd52f0c] [FILTER_AFTER]
DEBUG - 2026-03-08 03:59:28 --> [REQ_ID=7c72bcd52f0c] [LIFECYCLE][END] status=200 duration_ms=717.12 memory_delta=4194304
INFO - 2026-03-08 03:59:28 --> [REQ_ID=ef45c7e49d43] [PERF] Execution time=0.715108
DEBUG - 2026-03-08 03:59:28 --> [REQ_ID=7c72bcd52f0c] [REQUEST][END]
INFO - 2026-03-08 03:59:28 --> [REQ_ID=7c72bcd52f0c] [PERF] Execution time=0.755680
DEBUG - 2026-03-08 04:00:02 --> [REQ_ID=c45425f56bb8] [REQUEST][START] GET /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-08 04:00:02 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-08 04:00:02 --> [REQ_ID=c45425f56bb8] [FILTER_BEFORE] /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-08 04:00:02 --> [REQ_ID=c45425f56bb8] [ROUTE] Controller=\App\Modules\Management\Controllers\ManagementAPIController Method=Run_CRON_Tasks
DEBUG - 2026-03-08 04:00:02 --> [REQ_ID=c45425f56bb8] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-08 04:00:02 --> [REQ_ID=c45425f56bb8] [REQUEST][END]
INFO - 2026-03-08 04:00:02 --> [REQ_ID=c45425f56bb8] [PERF] Execution time=0.047886
INFO - 2026-03-08 04:00:02 --> [SPARK_START] App\Commands\AIOps\Run
INFO - 2026-03-08 04:00:02 --> [SPARK_MEMORY] 18874368
INFO - 2026-03-08 04:00:02 --> [spark:aiops:run] Intent
INFO - 2026-03-08 04:00:02 --> [spark:ops:work] Started
INFO - 2026-03-08 04:00:02 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-03-08 04:00:02 --> [SPARK_MEMORY] 18874368
INFO - 2026-03-08 04:00:02 --> [spark:ops:work] Intent
INFO - 2026-03-08 04:00:02 --> [spark:ops:work] Completed
INFO - 2026-03-08 04:00:02 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.103917
INFO - 2026-03-08 04:00:02 --> [SPARK_MEMORY] 18874368
INFO - 2026-03-08 04:00:03 --> [AIOPS][SPARK][GOVERNANCE][spark:logs:summarize] Started
INFO - 2026-03-08 04:00:03 --> [SPARK_START] App\Commands\Logs\Summarize
INFO - 2026-03-08 04:00:03 --> [SPARK_MEMORY] 18874368
INFO - 2026-03-08 04:00:03 --> [spark:logs:summarize] Intent
INFO - 2026-03-08 04:00:03 --> [AIOPS][SPARK][GOVERNANCE][spark:logs:summarize] Completed
INFO - 2026-03-08 04:00:03 --> [SPARK_COMPLETE] App\Commands\Logs\Summarize duration=0.006465
INFO - 2026-03-08 04:00:03 --> [SPARK_MEMORY] 18874368
INFO - 2026-03-08 04:00:03 --> [spark:app:healthcheck] Started
INFO - 2026-03-08 04:00:03 --> [SPARK_START] App\Commands\App\Healthcheck
INFO - 2026-03-08 04:00:03 --> [SPARK_MEMORY] 18874368
INFO - 2026-03-08 04:00:03 --> [spark:app:healthcheck] Intent
DEBUG - 2026-03-08 04:00:03 --> LOG_HEALTHCHECK debug marker=7fa4aac0c387
INFO - 2026-03-08 04:00:03 --> LOG_HEALTHCHECK info marker=7fa4aac0c387
NOTICE - 2026-03-08 04:00:03 --> LOG_HEALTHCHECK probe marker=7fa4aac0c387
INFO - 2026-03-08 04:00:04 --> [spark:app:healthcheck] Completed
INFO - 2026-03-08 04:00:04 --> [SPARK_COMPLETE] App\Commands\App\Healthcheck duration=0.032535
INFO - 2026-03-08 04:00:04 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-03-08 04:00:05 --> OllamaPatchRunner:L142 - validateGeneratedPatch Content: 
WARNING - 2026-03-08 04:00:05 --> OllamaPatchRunner:L49 - Original Diff: 
DEBUG - 2026-03-08 04:00:06 --> OllamaPatchRunner:L51 - Retried Diff: 
DEBUG - 2026-03-08 04:00:06 --> OllamaPatchRunner:L142 - validateGeneratedPatch Content: 
DEBUG - 2026-03-08 04:00:06 --> OllamaPatchRunner:L53 - Validating Generated Patch Failed
INFO - 2026-03-08 04:00:06 --> [SPARK_COMPLETE] App\Commands\AIOps\Run duration=4.186546
INFO - 2026-03-08 04:00:06 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-03-08 04:01:18 --> [REQ_ID=5229fe82bd77] [REQUEST][START] HEAD /
DEBUG - 2026-03-08 04:01:18 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-08 04:01:18 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-08 04:01:18 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-08 04:01:18 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-08 04:01:18 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
INFO - 2026-03-08 04:03:01 --> [SPARK_START] App\Commands\Ops\Commands\Audit
INFO - 2026-03-08 04:03:01 --> [SPARK_MEMORY] 18874368
INFO - 2026-03-08 04:03:01 --> [spark:ops:commands:audit] Intent
INFO - 2026-03-08 04:03:01 --> [SPARK_COMPLETE] App\Commands\Ops\Commands\Audit duration=0.021448
INFO - 2026-03-08 04:03:01 --> [SPARK_MEMORY] 18874368
