<?php defined('SYSTEMPATH') || exit('No direct script access allowed'); ?>

INFO - 2026-03-01 00:00:02 --> [spark:ops:work] Started
INFO - 2026-03-01 00:00:02 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-03-01 00:00:02 --> [SPARK_MEMORY] 16777216
INFO - 2026-03-01 00:00:02 --> [spark:ops:work] Intent
INFO - 2026-03-01 00:00:02 --> [spark:ops:work] Completed
INFO - 2026-03-01 00:00:02 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.028412
INFO - 2026-03-01 00:00:02 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-03-01 00:00:02 --> [REQ_ID=ed7c0ed7c1bc] [REQUEST][START] GET /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-01 00:00:02 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
INFO - 2026-03-01 00:00:02 --> [SPARK_START] App\Commands\AIOps\Run
INFO - 2026-03-01 00:00:02 --> [SPARK_MEMORY] 16777216
INFO - 2026-03-01 00:00:02 --> [spark:aiops:run] Intent
DEBUG - 2026-03-01 00:00:02 --> [REQ_ID=ed7c0ed7c1bc] [FILTER_BEFORE] /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-01 00:00:02 --> [REQ_ID=ed7c0ed7c1bc] [ROUTE] Controller=\App\Modules\Management\Controllers\ManagementAPIController Method=Run_CRON_Tasks
DEBUG - 2026-03-01 00:00:02 --> [REQ_ID=ed7c0ed7c1bc] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-01 00:00:02 --> [REQ_ID=ed7c0ed7c1bc] [REQUEST][END]
INFO - 2026-03-01 00:00:02 --> [REQ_ID=ed7c0ed7c1bc] [PERF] Execution time=0.119146
INFO - 2026-03-01 00:00:04 --> [AIOPS][SPARK][GOVERNANCE][spark:logs:summarize] Started
INFO - 2026-03-01 00:00:04 --> [SPARK_START] App\Commands\Logs\Summarize
INFO - 2026-03-01 00:00:04 --> [SPARK_MEMORY] 16777216
INFO - 2026-03-01 00:00:04 --> [spark:logs:summarize] Intent
INFO - 2026-03-01 00:00:04 --> [AIOPS][SPARK][GOVERNANCE][spark:logs:summarize] Completed
INFO - 2026-03-01 00:00:04 --> [SPARK_COMPLETE] App\Commands\Logs\Summarize duration=0.002048
INFO - 2026-03-01 00:00:04 --> [SPARK_MEMORY] 16777216
INFO - 2026-03-01 00:00:04 --> [spark:app:healthcheck] Started
INFO - 2026-03-01 00:00:04 --> [SPARK_START] App\Commands\App\Healthcheck
INFO - 2026-03-01 00:00:04 --> [SPARK_MEMORY] 16777216
INFO - 2026-03-01 00:00:04 --> [spark:app:healthcheck] Intent
DEBUG - 2026-03-01 00:00:04 --> LOG_HEALTHCHECK debug marker=e67c58f1cf27
INFO - 2026-03-01 00:00:04 --> LOG_HEALTHCHECK info marker=e67c58f1cf27
NOTICE - 2026-03-01 00:00:04 --> LOG_HEALTHCHECK probe marker=e67c58f1cf27
INFO - 2026-03-01 00:00:04 --> [spark:app:healthcheck] Completed
INFO - 2026-03-01 00:00:04 --> [SPARK_COMPLETE] App\Commands\App\Healthcheck duration=0.054746
INFO - 2026-03-01 00:00:04 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-03-01 00:00:05 --> OllamaPatchRunner:L142 - validateGeneratedPatch Content: 
WARNING - 2026-03-01 00:00:05 --> OllamaPatchRunner:L49 - Original Diff: 
DEBUG - 2026-03-01 00:00:06 --> OllamaPatchRunner:L51 - Retried Diff: 
DEBUG - 2026-03-01 00:00:06 --> OllamaPatchRunner:L142 - validateGeneratedPatch Content: 
DEBUG - 2026-03-01 00:00:06 --> OllamaPatchRunner:L53 - Validating Generated Patch Failed
INFO - 2026-03-01 00:00:06 --> [SPARK_COMPLETE] App\Commands\AIOps\Run duration=4.100862
INFO - 2026-03-01 00:00:06 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-03-01 00:04:16 --> [REQ_ID=4116e3b33b9e] [REQUEST][START] GET /index.php/How-It-Works/Investment-Dashboard
DEBUG - 2026-03-01 00:04:16 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-01 00:04:16 --> [REQ_ID=4116e3b33b9e] [FILTER_BEFORE] /index.php/How-It-Works/Investment-Dashboard
DEBUG - 2026-03-01 00:04:16 --> [REQ_ID=4116e3b33b9e] [ROUTE] Controller=\App\Modules\Blog\Controllers\HowItWorksController Method=show
DEBUG - 2026-03-01 00:04:16 --> [REQ_ID=4116e3b33b9e] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/How-It-Works/Investment-Dashboard
DEBUG - 2026-03-01 00:04:16 --> [CSRF] token name=csrf_test_name hash=50aa9ff30b18a77cdc8f2f26528b0497
DEBUG - 2026-03-01 00:04:16 --> [REQ_ID=f494273039e8] [INIT] App\Modules\Blog\Controllers\HowItWorksController::GET
INFO - 2026-03-01 00:04:16 --> [REQ_ID=f494273039e8] [MEMORY][controller-start] 6291456
DEBUG - 2026-03-01 00:04:16 --> [REQ_ID=f494273039e8] [METHOD_ENTRY] show
DEBUG - 2026-03-01 00:04:16 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-01 00:04:16 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-01 00:04:16 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-01 00:04:16 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-01 00:04:16 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-01 00:04:16 --> MyMICoin: guest context detected; skipping user-specific preload.
INFO - 2026-03-01 00:04:16 --> [REQ_ID=f494273039e8] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-01 00:04:16 --> [REQ_ID=f494273039e8] [VIEW_RENDER] App\Modules\Blog\Views\HowItWorks\Investment_Portfolio_Management
INFO - 2026-03-01 00:04:16 --> [REQ_ID=f494273039e8] [MEMORY][commonData:start] 10485760
INFO - 2026-03-01 00:04:17 --> themesMemory usage: 14680064
DEBUG - 2026-03-01 00:04:17 --> [REQ_ID=4116e3b33b9e] [FILTER_AFTER]
DEBUG - 2026-03-01 00:04:17 --> [REQ_ID=4116e3b33b9e] [LIFECYCLE][END] status=200 duration_ms=1,216.79 memory_delta=8388608
INFO - 2026-03-01 00:04:17 --> [REQ_ID=f494273039e8] [PERF] Execution time=1.214835
DEBUG - 2026-03-01 00:04:17 --> [REQ_ID=4116e3b33b9e] [REQUEST][END]
INFO - 2026-03-01 00:04:17 --> [REQ_ID=4116e3b33b9e] [PERF] Execution time=1.259664
DEBUG - 2026-03-01 00:10:21 --> [REQ_ID=c01521467db4] [REQUEST][START] GET /index.php/Management/Docs
DEBUG - 2026-03-01 00:10:21 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-01 00:10:21 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: GET, Route: Management/Docs]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-01 00:10:21 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-01 00:10:21 --> [404] URI=https://www.mymiwallet.com/index.php/Management/Docs
WARNING - 2026-03-01 00:10:21 --> 404 route miss: https://www.mymiwallet.com/index.php/Management/Docs | referrer: https://www.mymiwallet.com/index.php/How-It-Works/MyMI-Gold
ERROR - 2026-03-01 00:10:21 --> [ERROR_PAGE] event=error_404 status=404 message=Page not found.
DEBUG - 2026-03-01 00:12:34 --> [REQ_ID=a08fa5a497f1] [REQUEST][START] GET /
DEBUG - 2026-03-01 00:12:34 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-01 00:12:34 --> [REQ_ID=a08fa5a497f1] [FILTER_BEFORE] /
DEBUG - 2026-03-01 00:12:34 --> [REQ_ID=a08fa5a497f1] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-01 00:12:34 --> [REQ_ID=a08fa5a497f1] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-01 00:12:34 --> [CSRF] token name=csrf_test_name hash=1be6b398cc4411e4fadc63c5f2254048
DEBUG - 2026-03-01 00:12:34 --> [REQ_ID=7242032c0018] [INIT] App\Controllers\Home::GET
INFO - 2026-03-01 00:12:34 --> [REQ_ID=7242032c0018] [MEMORY][controller-start] 6291456
INFO - 2026-03-01 00:12:34 --> [REQ_ID=7242032c0018] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-01 00:12:34 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-01 00:12:34 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-03-01 00:12:34 --> [REQ_ID=7242032c0018] [VIEW_RENDER] themes/public/home
INFO - 2026-03-01 00:12:34 --> [REQ_ID=7242032c0018] [MEMORY][commonData:start] 10485760
INFO - 2026-03-01 00:12:34 --> themesMemory usage: 10485760
DEBUG - 2026-03-01 00:12:34 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-01 00:12:34 --> [REQ_ID=a08fa5a497f1] [FILTER_AFTER]
DEBUG - 2026-03-01 00:12:34 --> [REQ_ID=a08fa5a497f1] [LIFECYCLE][END] status=200 duration_ms=579.71 memory_delta=4194304
INFO - 2026-03-01 00:12:34 --> [REQ_ID=7242032c0018] [PERF] Execution time=0.577796
DEBUG - 2026-03-01 00:12:34 --> [REQ_ID=a08fa5a497f1] [REQUEST][END]
INFO - 2026-03-01 00:12:34 --> [REQ_ID=a08fa5a497f1] [PERF] Execution time=0.619143
INFO - 2026-03-01 00:15:01 --> [spark:ops:work] Started
INFO - 2026-03-01 00:15:01 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-03-01 00:15:01 --> [SPARK_MEMORY] 16777216
INFO - 2026-03-01 00:15:01 --> [spark:ops:work] Intent
INFO - 2026-03-01 00:15:01 --> [spark:ops:work] Completed
INFO - 2026-03-01 00:15:01 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.077108
INFO - 2026-03-01 00:15:01 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-03-01 00:15:01 --> [REQ_ID=5ace25d35499] [REQUEST][START] GET /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-01 00:15:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-01 00:15:01 --> [REQ_ID=5ace25d35499] [FILTER_BEFORE] /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-01 00:15:01 --> [REQ_ID=5ace25d35499] [ROUTE] Controller=\App\Modules\APIs\Controllers\AlertsAPIController Method=fetchEmailAlerts
DEBUG - 2026-03-01 00:15:01 --> [REQ_ID=5ace25d35499] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-01 00:15:01 --> [REQ_ID=5ace25d35499] [REQUEST][END]
INFO - 2026-03-01 00:15:01 --> [REQ_ID=5ace25d35499] [PERF] Execution time=0.057724
DEBUG - 2026-03-01 00:15:27 --> [REQ_ID=a6d64c607b60] [REQUEST][START] GET /index.php/How-It-Works/Automated-Financial-Insights
DEBUG - 2026-03-01 00:15:27 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-01 00:15:27 --> [REQ_ID=a6d64c607b60] [FILTER_BEFORE] /index.php/How-It-Works/Automated-Financial-Insights
DEBUG - 2026-03-01 00:15:27 --> [REQ_ID=a6d64c607b60] [ROUTE] Controller=\App\Modules\Blog\Controllers\HowItWorksController Method=show
DEBUG - 2026-03-01 00:15:27 --> [REQ_ID=a6d64c607b60] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/How-It-Works/Automated-Financial-Insights
DEBUG - 2026-03-01 00:15:27 --> [CSRF] token name=csrf_test_name hash=7cbea57823da69eb5b45e4093e6d8cd9
DEBUG - 2026-03-01 00:15:27 --> [REQ_ID=5864747e4a26] [INIT] App\Modules\Blog\Controllers\HowItWorksController::GET
INFO - 2026-03-01 00:15:27 --> [REQ_ID=5864747e4a26] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-01 00:15:27 --> [REQ_ID=5864747e4a26] [METHOD_ENTRY] show
DEBUG - 2026-03-01 00:15:27 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-01 00:15:27 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-01 00:15:27 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-01 00:15:28 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-01 00:15:28 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-01 00:15:28 --> MyMICoin: guest context detected; skipping user-specific preload.
ERROR - 2026-03-01 00:15:28 --> [ERROR_PAGE] event=error_404 status=404 message=Page not found.
DEBUG - 2026-03-01 00:15:28 --> [REQ_ID=a6d64c607b60] [FILTER_AFTER]
DEBUG - 2026-03-01 00:15:28 --> [REQ_ID=a6d64c607b60] [LIFECYCLE][END] status=404 duration_ms=113.64 memory_delta=2097152
INFO - 2026-03-01 00:15:28 --> [REQ_ID=5864747e4a26] [PERF] Execution time=0.112470
DEBUG - 2026-03-01 00:15:28 --> [REQ_ID=a6d64c607b60] [REQUEST][END]
INFO - 2026-03-01 00:15:28 --> [REQ_ID=a6d64c607b60] [PERF] Execution time=0.131312
DEBUG - 2026-03-01 00:25:48 --> [REQ_ID=38bb196fd22b] [REQUEST][START] GET /index.php/How-It-Works/Registering-An-Account
DEBUG - 2026-03-01 00:25:48 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-01 00:25:48 --> [REQ_ID=38bb196fd22b] [FILTER_BEFORE] /index.php/How-It-Works/Registering-An-Account
DEBUG - 2026-03-01 00:25:48 --> [REQ_ID=38bb196fd22b] [ROUTE] Controller=\App\Modules\Blog\Controllers\HowItWorksController Method=show
DEBUG - 2026-03-01 00:25:48 --> [REQ_ID=38bb196fd22b] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/How-It-Works/Registering-An-Account
DEBUG - 2026-03-01 00:25:48 --> [CSRF] token name=csrf_test_name hash=1c9c9a67a5e563e1343654423cc063e5
DEBUG - 2026-03-01 00:25:48 --> [REQ_ID=10bb8d54d479] [INIT] App\Modules\Blog\Controllers\HowItWorksController::GET
INFO - 2026-03-01 00:25:48 --> [REQ_ID=10bb8d54d479] [MEMORY][controller-start] 6291456
DEBUG - 2026-03-01 00:25:48 --> [REQ_ID=10bb8d54d479] [METHOD_ENTRY] show
DEBUG - 2026-03-01 00:25:48 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-01 00:25:48 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-01 00:25:48 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-01 00:25:48 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-01 00:25:48 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-01 00:25:48 --> MyMICoin: guest context detected; skipping user-specific preload.
INFO - 2026-03-01 00:25:48 --> [REQ_ID=10bb8d54d479] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-01 00:25:48 --> [REQ_ID=10bb8d54d479] [VIEW_RENDER] App\Modules\Blog\Views\HowItWorks\Registering_An_Account
INFO - 2026-03-01 00:25:48 --> [REQ_ID=10bb8d54d479] [MEMORY][commonData:start] 10485760
INFO - 2026-03-01 00:25:49 --> themesMemory usage: 14680064
DEBUG - 2026-03-01 00:25:49 --> [REQ_ID=38bb196fd22b] [FILTER_AFTER]
DEBUG - 2026-03-01 00:25:49 --> [REQ_ID=38bb196fd22b] [LIFECYCLE][END] status=200 duration_ms=1,063.35 memory_delta=8388608
INFO - 2026-03-01 00:25:49 --> [REQ_ID=10bb8d54d479] [PERF] Execution time=1.060638
DEBUG - 2026-03-01 00:25:49 --> [REQ_ID=38bb196fd22b] [REQUEST][END]
INFO - 2026-03-01 00:25:49 --> [REQ_ID=38bb196fd22b] [PERF] Execution time=1.106120
INFO - 2026-03-01 00:30:02 --> [spark:ops:work] Started
INFO - 2026-03-01 00:30:02 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-03-01 00:30:02 --> [SPARK_MEMORY] 16777216
INFO - 2026-03-01 00:30:02 --> [spark:ops:work] Intent
INFO - 2026-03-01 00:30:02 --> [spark:ops:work] Completed
INFO - 2026-03-01 00:30:02 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.144451
INFO - 2026-03-01 00:30:02 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-03-01 00:34:58 --> [REQ_ID=b8e3ab630c6f] [REQUEST][START] GET /index.php/MyMI-Gold/Goals/Daily
DEBUG - 2026-03-01 00:34:58 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-01 00:34:58 --> [REQ_ID=b8e3ab630c6f] [FILTER_BEFORE] /index.php/MyMI-Gold/Goals/Daily
DEBUG - 2026-03-01 00:34:58 --> [REQ_ID=b8e3ab630c6f] [ROUTE] Controller=\App\Modules\User\Controllers\DashboardController Method=goals
DEBUG - 2026-03-01 00:34:58 --> [REQ_ID=b8e3ab630c6f] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/MyMI-Gold/Goals/Daily
DEBUG - 2026-03-01 00:34:58 --> [CSRF] token name=csrf_test_name hash=ef4fa3aa0f7718be69b5923176fc736c
DEBUG - 2026-03-01 00:34:58 --> [REQ_ID=b8e3ab630c6f] [REQUEST][END]
INFO - 2026-03-01 00:34:58 --> [REQ_ID=b8e3ab630c6f] [PERF] Execution time=0.054866
DEBUG - 2026-03-01 00:35:01 --> [REQ_ID=f98ee6c3fef4] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-01 00:35:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-01 00:35:01 --> [REQ_ID=f98ee6c3fef4] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-01 00:35:01 --> [REQ_ID=f98ee6c3fef4] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-01 00:35:01 --> [REQ_ID=f98ee6c3fef4] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-01 00:35:01 --> [CSRF] token name=csrf_test_name hash=ba14321e009ef1dd4a2ec7e1563ed1fd
DEBUG - 2026-03-01 00:35:01 --> [REQ_ID=04a7e817c5ca] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-01 00:35:01 --> [REQ_ID=04a7e817c5ca] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-01 00:35:01 --> [REQ_ID=f98ee6c3fef4] [FILTER_AFTER]
DEBUG - 2026-03-01 00:35:01 --> [REQ_ID=f98ee6c3fef4] [LIFECYCLE][END] status=200 duration_ms=175.05 memory_delta=0
INFO - 2026-03-01 00:35:01 --> [REQ_ID=04a7e817c5ca] [PERF] Execution time=0.174901
DEBUG - 2026-03-01 00:35:01 --> [REQ_ID=f98ee6c3fef4] [REQUEST][END]
INFO - 2026-03-01 00:35:01 --> [REQ_ID=f98ee6c3fef4] [PERF] Execution time=0.187600
DEBUG - 2026-03-01 00:44:27 --> [REQ_ID=ca090c2e5c6b] [REQUEST][START] GET /index.php/Account
DEBUG - 2026-03-01 00:44:27 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-01 00:44:27 --> [REQ_ID=ca090c2e5c6b] [FILTER_BEFORE] /index.php/Account
DEBUG - 2026-03-01 00:44:27 --> [REQ_ID=ca090c2e5c6b] [ROUTE] Controller=\App\Modules\User\Controllers\DashboardController Method=account
DEBUG - 2026-03-01 00:44:27 --> [REQ_ID=ca090c2e5c6b] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Account
DEBUG - 2026-03-01 00:44:27 --> [CSRF] token name=csrf_test_name hash=354d8f7e581dac89141047d83ad5b520
DEBUG - 2026-03-01 00:44:27 --> [REQ_ID=ca090c2e5c6b] [REQUEST][END]
INFO - 2026-03-01 00:44:27 --> [REQ_ID=ca090c2e5c6b] [PERF] Execution time=0.054137
DEBUG - 2026-03-01 00:44:29 --> [REQ_ID=4b0422eec875] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-01 00:44:29 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-01 00:44:29 --> [REQ_ID=4b0422eec875] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-01 00:44:29 --> [REQ_ID=4b0422eec875] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-01 00:44:29 --> [REQ_ID=4b0422eec875] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-01 00:44:29 --> [CSRF] token name=csrf_test_name hash=b9555992b1676c230110e721a0732d8c
DEBUG - 2026-03-01 00:44:29 --> [REQ_ID=3a734d30adb6] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-01 00:44:29 --> [REQ_ID=3a734d30adb6] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-01 00:44:29 --> [REQ_ID=4b0422eec875] [FILTER_AFTER]
DEBUG - 2026-03-01 00:44:29 --> [REQ_ID=4b0422eec875] [LIFECYCLE][END] status=200 duration_ms=58.79 memory_delta=0
INFO - 2026-03-01 00:44:29 --> [REQ_ID=3a734d30adb6] [PERF] Execution time=0.058629
DEBUG - 2026-03-01 00:44:29 --> [REQ_ID=4b0422eec875] [REQUEST][END]
INFO - 2026-03-01 00:44:29 --> [REQ_ID=4b0422eec875] [PERF] Execution time=0.070597
INFO - 2026-03-01 00:45:02 --> [spark:ops:work] Started
INFO - 2026-03-01 00:45:02 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-03-01 00:45:02 --> [SPARK_MEMORY] 16777216
INFO - 2026-03-01 00:45:02 --> [spark:ops:work] Intent
INFO - 2026-03-01 00:45:02 --> [spark:ops:work] Completed
INFO - 2026-03-01 00:45:02 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.052797
INFO - 2026-03-01 00:45:02 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-03-01 00:47:55 --> [REQ_ID=c74415f9782b] [REQUEST][START] GET /
DEBUG - 2026-03-01 00:47:55 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-01 00:47:55 --> [REQ_ID=c74415f9782b] [FILTER_BEFORE] /
DEBUG - 2026-03-01 00:47:55 --> [REQ_ID=c74415f9782b] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-01 00:47:55 --> [REQ_ID=c74415f9782b] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-01 00:47:55 --> [CSRF] token name=csrf_test_name hash=634796f85d0721ff3b8b024a41bbe05a
DEBUG - 2026-03-01 00:47:55 --> [REQ_ID=8a734c7c0671] [INIT] App\Controllers\Home::GET
INFO - 2026-03-01 00:47:55 --> [REQ_ID=8a734c7c0671] [MEMORY][controller-start] 6291456
INFO - 2026-03-01 00:47:55 --> [REQ_ID=8a734c7c0671] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-01 00:47:55 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-01 00:47:56 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-03-01 00:47:56 --> [REQ_ID=8a734c7c0671] [VIEW_RENDER] themes/public/home
INFO - 2026-03-01 00:47:56 --> [REQ_ID=8a734c7c0671] [MEMORY][commonData:start] 10485760
INFO - 2026-03-01 00:47:56 --> themesMemory usage: 10485760
DEBUG - 2026-03-01 00:47:56 --> [MetaService] slug= pageName=Home cacheHit= path=DB
DEBUG - 2026-03-01 00:47:56 --> [REQ_ID=c74415f9782b] [FILTER_AFTER]
DEBUG - 2026-03-01 00:47:56 --> [REQ_ID=c74415f9782b] [LIFECYCLE][END] status=200 duration_ms=608.11 memory_delta=4194304
INFO - 2026-03-01 00:47:56 --> [REQ_ID=8a734c7c0671] [PERF] Execution time=0.605565
DEBUG - 2026-03-01 00:47:56 --> [REQ_ID=c74415f9782b] [REQUEST][END]
INFO - 2026-03-01 00:47:56 --> [REQ_ID=c74415f9782b] [PERF] Execution time=0.647037
DEBUG - 2026-03-01 00:53:54 --> [REQ_ID=420c6ebf5b8b] [REQUEST][START] GET /index.php/Management/Marketing/Ideas
DEBUG - 2026-03-01 00:53:54 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-01 00:53:54 --> [REQ_ID=420c6ebf5b8b] [FILTER_BEFORE] /index.php/Management/Marketing/Ideas
DEBUG - 2026-03-01 00:53:54 --> [REQ_ID=420c6ebf5b8b] [ROUTE] Controller=\App\Modules\Management\Controllers\MarketingAdminController Method=ideas
DEBUG - 2026-03-01 00:53:54 --> [REQ_ID=420c6ebf5b8b] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Management/Marketing/Ideas
DEBUG - 2026-03-01 00:53:54 --> [CSRF] token name=csrf_test_name hash=84310bf169f4136f2acd07602b3dc3c9
DEBUG - 2026-03-01 00:53:54 --> [REQ_ID=420c6ebf5b8b] [REQUEST][END]
INFO - 2026-03-01 00:53:54 --> [REQ_ID=420c6ebf5b8b] [PERF] Execution time=0.060056
DEBUG - 2026-03-01 00:54:01 --> [REQ_ID=7780a8e29f54] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-01 00:54:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-01 00:54:01 --> [REQ_ID=7780a8e29f54] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-01 00:54:01 --> [REQ_ID=7780a8e29f54] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-01 00:54:01 --> [REQ_ID=7780a8e29f54] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-01 00:54:01 --> [CSRF] token name=csrf_test_name hash=8471969147b891a865494ed7a04eac90
DEBUG - 2026-03-01 00:54:01 --> [REQ_ID=40ddf8224133] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-01 00:54:01 --> [REQ_ID=40ddf8224133] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-01 00:54:01 --> [REQ_ID=7780a8e29f54] [FILTER_AFTER]
DEBUG - 2026-03-01 00:54:01 --> [REQ_ID=7780a8e29f54] [LIFECYCLE][END] status=200 duration_ms=277.41 memory_delta=0
INFO - 2026-03-01 00:54:01 --> [REQ_ID=40ddf8224133] [PERF] Execution time=0.277053
DEBUG - 2026-03-01 00:54:01 --> [REQ_ID=7780a8e29f54] [REQUEST][END]
INFO - 2026-03-01 00:54:01 --> [REQ_ID=7780a8e29f54] [PERF] Execution time=0.291143
INFO - 2026-03-01 01:00:01 --> [spark:ops:work] Started
INFO - 2026-03-01 01:00:01 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-03-01 01:00:01 --> [SPARK_MEMORY] 16777216
INFO - 2026-03-01 01:00:01 --> [spark:ops:work] Intent
INFO - 2026-03-01 01:00:01 --> [spark:ops:work] Completed
INFO - 2026-03-01 01:00:01 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.031892
INFO - 2026-03-01 01:00:01 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-03-01 01:00:01 --> [REQ_ID=8a54fb8c4401] [REQUEST][START] GET /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-01 01:00:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-01 01:00:01 --> [REQ_ID=8a54fb8c4401] [FILTER_BEFORE] /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-01 01:00:01 --> [REQ_ID=8a54fb8c4401] [ROUTE] Controller=\App\Modules\Management\Controllers\ManagementAPIController Method=Run_CRON_Tasks
DEBUG - 2026-03-01 01:00:01 --> [REQ_ID=8a54fb8c4401] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-01 01:00:01 --> [REQ_ID=8a54fb8c4401] [REQUEST][END]
INFO - 2026-03-01 01:00:01 --> [REQ_ID=8a54fb8c4401] [PERF] Execution time=0.039044
DEBUG - 2026-03-01 01:01:36 --> [REQ_ID=b4d5140ed2bd] [REQUEST][START] GET /
DEBUG - 2026-03-01 01:01:36 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-01 01:01:36 --> [REQ_ID=b4d5140ed2bd] [FILTER_BEFORE] /
DEBUG - 2026-03-01 01:01:36 --> [REQ_ID=b4d5140ed2bd] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-01 01:01:36 --> [REQ_ID=b4d5140ed2bd] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-01 01:01:36 --> [CSRF] token name=csrf_test_name hash=ac6b6768072e4586c77b4f0553741738
DEBUG - 2026-03-01 01:01:36 --> [REQ_ID=4c6ee8ca2134] [INIT] App\Controllers\Home::GET
INFO - 2026-03-01 01:01:36 --> [REQ_ID=4c6ee8ca2134] [MEMORY][controller-start] 6291456
INFO - 2026-03-01 01:01:36 --> [REQ_ID=4c6ee8ca2134] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-01 01:01:36 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-01 01:01:37 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
DEBUG - 2026-03-01 01:01:37 --> [REQ_ID=4c6ee8ca2134] [VIEW_RENDER] themes/public/home
INFO - 2026-03-01 01:01:37 --> [REQ_ID=4c6ee8ca2134] [MEMORY][commonData:start] 10485760
INFO - 2026-03-01 01:01:37 --> themesMemory usage: 10485760
DEBUG - 2026-03-01 01:01:37 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-01 01:01:37 --> [REQ_ID=b4d5140ed2bd] [FILTER_AFTER]
DEBUG - 2026-03-01 01:01:37 --> [REQ_ID=b4d5140ed2bd] [LIFECYCLE][END] status=200 duration_ms=597.18 memory_delta=4194304
INFO - 2026-03-01 01:01:37 --> [REQ_ID=4c6ee8ca2134] [PERF] Execution time=0.595256
DEBUG - 2026-03-01 01:01:37 --> [REQ_ID=b4d5140ed2bd] [REQUEST][END]
INFO - 2026-03-01 01:01:37 --> [REQ_ID=b4d5140ed2bd] [PERF] Execution time=0.635363
DEBUG - 2026-03-01 01:04:28 --> [REQ_ID=a4081858d3da] [REQUEST][START] GET /index.php/Dashboard
DEBUG - 2026-03-01 01:04:28 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-01 01:04:28 --> [REQ_ID=a4081858d3da] [FILTER_BEFORE] /index.php/Dashboard
DEBUG - 2026-03-01 01:04:28 --> [REQ_ID=a4081858d3da] [ROUTE] Controller=\App\Modules\User\Controllers\DashboardController Method=index
DEBUG - 2026-03-01 01:04:28 --> [REQ_ID=a4081858d3da] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Dashboard
DEBUG - 2026-03-01 01:04:28 --> [CSRF] token name=csrf_test_name hash=1baa79e57cf5060a3260b9112290c386
DEBUG - 2026-03-01 01:04:28 --> [REQ_ID=a4081858d3da] [REQUEST][END]
INFO - 2026-03-01 01:04:28 --> [REQ_ID=a4081858d3da] [PERF] Execution time=0.069388
DEBUG - 2026-03-01 01:06:40 --> [REQ_ID=0f26249be259] [REQUEST][START] GET /index.php/Management/Marketing/Content/Generator
DEBUG - 2026-03-01 01:06:40 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-01 01:06:40 --> [REQ_ID=0f26249be259] [FILTER_BEFORE] /index.php/Management/Marketing/Content/Generator
DEBUG - 2026-03-01 01:06:40 --> [REQ_ID=0f26249be259] [ROUTE] Controller=\App\Modules\Management\Controllers\MarketingAdminController Method=contentGenerator
DEBUG - 2026-03-01 01:06:40 --> [REQ_ID=0f26249be259] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Management/Marketing/Content/Generator
DEBUG - 2026-03-01 01:06:40 --> [CSRF] token name=csrf_test_name hash=3b669bddb8fbd0a6054986d65e1ccd84
DEBUG - 2026-03-01 01:06:40 --> [REQ_ID=0f26249be259] [REQUEST][END]
INFO - 2026-03-01 01:06:40 --> [REQ_ID=0f26249be259] [PERF] Execution time=0.057164
DEBUG - 2026-03-01 01:06:43 --> [REQ_ID=b654a4c7557a] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-01 01:06:43 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-01 01:06:43 --> [REQ_ID=b654a4c7557a] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-01 01:06:43 --> [REQ_ID=b654a4c7557a] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-01 01:06:43 --> [REQ_ID=b654a4c7557a] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-01 01:06:43 --> [CSRF] token name=csrf_test_name hash=5c2acd0ab4b4ea972a98e864d8c4fb38
DEBUG - 2026-03-01 01:06:43 --> [REQ_ID=f0ccc8ae44a9] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-01 01:06:43 --> [REQ_ID=f0ccc8ae44a9] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-01 01:06:43 --> [REQ_ID=b654a4c7557a] [FILTER_AFTER]
DEBUG - 2026-03-01 01:06:43 --> [REQ_ID=b654a4c7557a] [LIFECYCLE][END] status=200 duration_ms=34.69 memory_delta=0
INFO - 2026-03-01 01:06:43 --> [REQ_ID=f0ccc8ae44a9] [PERF] Execution time=0.034369
DEBUG - 2026-03-01 01:06:43 --> [REQ_ID=b654a4c7557a] [REQUEST][END]
INFO - 2026-03-01 01:06:43 --> [REQ_ID=b654a4c7557a] [PERF] Execution time=0.046881
INFO - 2026-03-01 01:15:01 --> [spark:ops:work] Started
INFO - 2026-03-01 01:15:01 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-03-01 01:15:01 --> [SPARK_MEMORY] 16777216
INFO - 2026-03-01 01:15:01 --> [spark:ops:work] Intent
DEBUG - 2026-03-01 01:15:01 --> [REQ_ID=07c6427235b8] [REQUEST][START] GET /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-01 01:15:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
INFO - 2026-03-01 01:15:01 --> [spark:ops:work] Completed
INFO - 2026-03-01 01:15:01 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.092498
INFO - 2026-03-01 01:15:01 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-03-01 01:15:01 --> [REQ_ID=07c6427235b8] [FILTER_BEFORE] /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-01 01:15:01 --> [REQ_ID=07c6427235b8] [ROUTE] Controller=\App\Modules\APIs\Controllers\AlertsAPIController Method=fetchEmailAlerts
DEBUG - 2026-03-01 01:15:01 --> [REQ_ID=07c6427235b8] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-01 01:15:01 --> [REQ_ID=07c6427235b8] [REQUEST][END]
INFO - 2026-03-01 01:15:01 --> [REQ_ID=07c6427235b8] [PERF] Execution time=0.061879
DEBUG - 2026-03-01 01:20:19 --> [REQ_ID=d367fb616fd4] [REQUEST][START] GET /index.php/Partner/register
DEBUG - 2026-03-01 01:20:19 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-01 01:20:19 --> [REQ_ID=d367fb616fd4] [FILTER_BEFORE] /index.php/Partner/register
DEBUG - 2026-03-01 01:20:19 --> [REQ_ID=d367fb616fd4] [ROUTE] Controller=\App\Controllers\AuthController Method=register
DEBUG - 2026-03-01 01:20:19 --> [REQ_ID=d367fb616fd4] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Partner/register
DEBUG - 2026-03-01 01:20:19 --> [CSRF] token name=csrf_test_name hash=7072674b1bf74f59eaa8fd33bf878197
DEBUG - 2026-03-01 01:20:19 --> [REQ_ID=d367fb616fd4] [REQUEST][END]
INFO - 2026-03-01 01:20:19 --> [REQ_ID=d367fb616fd4] [PERF] Execution time=0.052629
DEBUG - 2026-03-01 01:20:21 --> [REQ_ID=4a2e53725467] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-01 01:20:21 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-01 01:20:21 --> [REQ_ID=4a2e53725467] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-01 01:20:21 --> [REQ_ID=4a2e53725467] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-01 01:20:21 --> [REQ_ID=4a2e53725467] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-01 01:20:21 --> [CSRF] token name=csrf_test_name hash=16d39c8465b43f0db6c9f32a658f2de1
DEBUG - 2026-03-01 01:20:21 --> [REQ_ID=cd84c181ea8a] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-01 01:20:21 --> [REQ_ID=cd84c181ea8a] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-01 01:20:21 --> [REQ_ID=4a2e53725467] [FILTER_AFTER]
DEBUG - 2026-03-01 01:20:21 --> [REQ_ID=4a2e53725467] [LIFECYCLE][END] status=200 duration_ms=59.80 memory_delta=0
INFO - 2026-03-01 01:20:21 --> [REQ_ID=cd84c181ea8a] [PERF] Execution time=0.058835
DEBUG - 2026-03-01 01:20:21 --> [REQ_ID=4a2e53725467] [REQUEST][END]
INFO - 2026-03-01 01:20:21 --> [REQ_ID=4a2e53725467] [PERF] Execution time=0.069852
DEBUG - 2026-03-01 01:21:12 --> [REQ_ID=3d24fc40526b] [REQUEST][START] GET /index.php/Knowledgebase
DEBUG - 2026-03-01 01:21:12 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-01 01:21:12 --> [REQ_ID=3d24fc40526b] [FILTER_BEFORE] /index.php/Knowledgebase
DEBUG - 2026-03-01 01:21:12 --> [REQ_ID=3d24fc40526b] [ROUTE] Controller=\App\Modules\User\Controllers\KnowledgebaseController Method=index
DEBUG - 2026-03-01 01:21:12 --> [REQ_ID=3d24fc40526b] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Knowledgebase
DEBUG - 2026-03-01 01:21:12 --> [CSRF] token name=csrf_test_name hash=2486880d2f9c992d237deed656680c9f
DEBUG - 2026-03-01 01:21:12 --> [REQ_ID=3d24fc40526b] [REQUEST][END]
INFO - 2026-03-01 01:21:12 --> [REQ_ID=3d24fc40526b] [PERF] Execution time=0.014269
DEBUG - 2026-03-01 01:21:12 --> [REQ_ID=081c4bc98593] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-01 01:21:12 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-01 01:21:12 --> [REQ_ID=081c4bc98593] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-01 01:21:12 --> [REQ_ID=081c4bc98593] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-01 01:21:12 --> [REQ_ID=081c4bc98593] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-01 01:21:12 --> [CSRF] token name=csrf_test_name hash=375a989f4acd1040ff91a1ce71f33a91
DEBUG - 2026-03-01 01:21:12 --> [REQ_ID=84fa995d52cc] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-01 01:21:12 --> [REQ_ID=84fa995d52cc] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-01 01:21:12 --> [REQ_ID=081c4bc98593] [FILTER_AFTER]
DEBUG - 2026-03-01 01:21:12 --> [REQ_ID=081c4bc98593] [LIFECYCLE][END] status=200 duration_ms=19.57 memory_delta=0
INFO - 2026-03-01 01:21:12 --> [REQ_ID=84fa995d52cc] [PERF] Execution time=0.019247
DEBUG - 2026-03-01 01:21:12 --> [REQ_ID=081c4bc98593] [REQUEST][END]
INFO - 2026-03-01 01:21:12 --> [REQ_ID=081c4bc98593] [PERF] Execution time=0.031656
DEBUG - 2026-03-01 01:23:01 --> [REQ_ID=3a4e10d01fd8] [REQUEST][START] GET /index.php/Dashboard
DEBUG - 2026-03-01 01:23:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-01 01:23:02 --> [REQ_ID=3a4e10d01fd8] [FILTER_BEFORE] /index.php/Dashboard
DEBUG - 2026-03-01 01:23:02 --> [REQ_ID=3a4e10d01fd8] [ROUTE] Controller=\App\Modules\User\Controllers\DashboardController Method=index
DEBUG - 2026-03-01 01:23:02 --> [REQ_ID=3a4e10d01fd8] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Dashboard
DEBUG - 2026-03-01 01:23:02 --> [CSRF] token name=csrf_test_name hash=6b0fc41842ea925dcfc2b9236f64d3d3
DEBUG - 2026-03-01 01:23:02 --> [REQ_ID=3a4e10d01fd8] [REQUEST][END]
INFO - 2026-03-01 01:23:02 --> [REQ_ID=3a4e10d01fd8] [PERF] Execution time=0.150300
DEBUG - 2026-03-01 01:25:09 --> [REQ_ID=4e52f2feaa2d] [REQUEST][START] GET /index.php/Purchase/MyMIGold
DEBUG - 2026-03-01 01:25:09 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-01 01:25:09 --> [REQ_ID=4e52f2feaa2d] [FILTER_BEFORE] /index.php/Purchase/MyMIGold
DEBUG - 2026-03-01 01:25:09 --> [REQ_ID=4e52f2feaa2d] [ROUTE] Controller=closure_route Method=index
DEBUG - 2026-03-01 01:25:09 --> [REQ_ID=4e52f2feaa2d] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Purchase/MyMIGold
DEBUG - 2026-03-01 01:25:09 --> [CSRF] token name=csrf_test_name hash=95a2ab9ed4132026b6bd1becaf439509
DEBUG - 2026-03-01 01:25:09 --> [REQ_ID=4e52f2feaa2d] [REQUEST][END]
INFO - 2026-03-01 01:25:09 --> [REQ_ID=4e52f2feaa2d] [PERF] Execution time=0.009974
DEBUG - 2026-03-01 01:25:09 --> [REQ_ID=6acec0cbf054] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-01 01:25:09 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-01 01:25:09 --> [REQ_ID=6acec0cbf054] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-01 01:25:09 --> [REQ_ID=6acec0cbf054] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-01 01:25:09 --> [REQ_ID=6acec0cbf054] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-01 01:25:09 --> [CSRF] token name=csrf_test_name hash=12354e5972144959f95d8dc5938d3fec
DEBUG - 2026-03-01 01:25:09 --> [REQ_ID=700d264413b3] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-01 01:25:09 --> [REQ_ID=700d264413b3] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-01 01:25:09 --> [REQ_ID=6acec0cbf054] [FILTER_AFTER]
DEBUG - 2026-03-01 01:25:09 --> [REQ_ID=6acec0cbf054] [LIFECYCLE][END] status=200 duration_ms=44.35 memory_delta=0
INFO - 2026-03-01 01:25:09 --> [REQ_ID=700d264413b3] [PERF] Execution time=0.044048
DEBUG - 2026-03-01 01:25:09 --> [REQ_ID=6acec0cbf054] [REQUEST][END]
INFO - 2026-03-01 01:25:09 --> [REQ_ID=6acec0cbf054] [PERF] Execution time=0.056342
DEBUG - 2026-03-01 01:25:47 --> [REQ_ID=6efbf80b4c64] [REQUEST][START] GET /index.php/Management/Users
DEBUG - 2026-03-01 01:25:47 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-01 01:25:47 --> [REQ_ID=6efbf80b4c64] [FILTER_BEFORE] /index.php/Management/Users
DEBUG - 2026-03-01 01:25:47 --> [REQ_ID=6efbf80b4c64] [ROUTE] Controller=\App\Modules\Management\Controllers\UsersController Method=index
DEBUG - 2026-03-01 01:25:47 --> [REQ_ID=6efbf80b4c64] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Management/Users
DEBUG - 2026-03-01 01:25:47 --> [CSRF] token name=csrf_test_name hash=852113fabc152001ef7c45db25a4d714
DEBUG - 2026-03-01 01:25:47 --> [REQ_ID=6efbf80b4c64] [REQUEST][END]
INFO - 2026-03-01 01:25:47 --> [REQ_ID=6efbf80b4c64] [PERF] Execution time=0.011225
DEBUG - 2026-03-01 01:25:48 --> [REQ_ID=ca5e6cd102d0] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-01 01:25:48 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-01 01:25:48 --> [REQ_ID=ca5e6cd102d0] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-01 01:25:48 --> [REQ_ID=ca5e6cd102d0] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-01 01:25:48 --> [REQ_ID=ca5e6cd102d0] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-01 01:25:48 --> [CSRF] token name=csrf_test_name hash=63380396ef131bc20f5015cce7efd767
DEBUG - 2026-03-01 01:25:48 --> [REQ_ID=e2252204b261] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-01 01:25:48 --> [REQ_ID=e2252204b261] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-01 01:25:48 --> [REQ_ID=ca5e6cd102d0] [FILTER_AFTER]
DEBUG - 2026-03-01 01:25:48 --> [REQ_ID=ca5e6cd102d0] [LIFECYCLE][END] status=200 duration_ms=37.20 memory_delta=0
INFO - 2026-03-01 01:25:48 --> [REQ_ID=e2252204b261] [PERF] Execution time=0.035612
DEBUG - 2026-03-01 01:25:48 --> [REQ_ID=ca5e6cd102d0] [REQUEST][END]
INFO - 2026-03-01 01:25:48 --> [REQ_ID=ca5e6cd102d0] [PERF] Execution time=0.046241
DEBUG - 2026-03-01 01:28:09 --> [REQ_ID=27e11579d965] [REQUEST][START] GET /
DEBUG - 2026-03-01 01:28:09 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-01 01:28:09 --> [REQ_ID=27e11579d965] [FILTER_BEFORE] /
DEBUG - 2026-03-01 01:28:09 --> [REQ_ID=27e11579d965] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-01 01:28:09 --> [REQ_ID=27e11579d965] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-01 01:28:09 --> [CSRF] token name=csrf_test_name hash=a7d04f18549ea19a80b91006248ab7df
DEBUG - 2026-03-01 01:28:09 --> [REQ_ID=c2ddf6b44043] [INIT] App\Controllers\Home::GET
INFO - 2026-03-01 01:28:09 --> [REQ_ID=c2ddf6b44043] [MEMORY][controller-start] 6291456
INFO - 2026-03-01 01:28:09 --> [REQ_ID=c2ddf6b44043] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-01 01:28:09 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-01 01:28:09 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-03-01 01:28:09 --> [REQ_ID=c2ddf6b44043] [VIEW_RENDER] themes/public/home
INFO - 2026-03-01 01:28:09 --> [REQ_ID=c2ddf6b44043] [MEMORY][commonData:start] 10485760
INFO - 2026-03-01 01:28:09 --> themesMemory usage: 10485760
DEBUG - 2026-03-01 01:28:09 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-01 01:28:09 --> [REQ_ID=27e11579d965] [FILTER_AFTER]
DEBUG - 2026-03-01 01:28:09 --> [REQ_ID=27e11579d965] [LIFECYCLE][END] status=200 duration_ms=578.85 memory_delta=4194304
INFO - 2026-03-01 01:28:09 --> [REQ_ID=c2ddf6b44043] [PERF] Execution time=0.576890
DEBUG - 2026-03-01 01:28:09 --> [REQ_ID=27e11579d965] [REQUEST][END]
INFO - 2026-03-01 01:28:09 --> [REQ_ID=27e11579d965] [PERF] Execution time=0.618290
INFO - 2026-03-01 01:30:01 --> [spark:ops:work] Started
INFO - 2026-03-01 01:30:01 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-03-01 01:30:01 --> [SPARK_MEMORY] 16777216
INFO - 2026-03-01 01:30:01 --> [spark:ops:work] Intent
INFO - 2026-03-01 01:30:02 --> [spark:ops:work] Completed
INFO - 2026-03-01 01:30:02 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.112945
INFO - 2026-03-01 01:30:02 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-03-01 01:34:11 --> [REQ_ID=13c93e714015] [REQUEST][START] GET /index.php/Terms-Of-Service
DEBUG - 2026-03-01 01:34:11 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-01 01:34:11 --> [REQ_ID=13c93e714015] [FILTER_BEFORE] /index.php/Terms-Of-Service
DEBUG - 2026-03-01 01:34:11 --> [REQ_ID=13c93e714015] [ROUTE] Controller=\App\Controllers\Home Method=termsOfService
DEBUG - 2026-03-01 01:34:11 --> [REQ_ID=13c93e714015] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Terms-Of-Service
DEBUG - 2026-03-01 01:34:11 --> [CSRF] token name=csrf_test_name hash=22194b206f576349dd4ca5a131b0f8fa
DEBUG - 2026-03-01 01:34:11 --> [REQ_ID=01aadd969c2b] [INIT] App\Controllers\Home::GET
INFO - 2026-03-01 01:34:11 --> [REQ_ID=01aadd969c2b] [MEMORY][controller-start] 6291456
INFO - 2026-03-01 01:34:11 --> [REQ_ID=01aadd969c2b] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-01 01:34:11 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-01 01:34:11 --> [MetaService] slug=terms-of-service pageName= cacheHit= path=DB
DEBUG - 2026-03-01 01:34:11 --> [REQ_ID=01aadd969c2b] [VIEW_RENDER] themes/public/termsOfService
INFO - 2026-03-01 01:34:11 --> [REQ_ID=01aadd969c2b] [MEMORY][commonData:start] 10485760
INFO - 2026-03-01 01:34:11 --> themesMemory usage: 10485760
DEBUG - 2026-03-01 01:34:11 --> [MetaService] slug=terms-of-service pageName=Terms of Service cacheHit= path=DB
DEBUG - 2026-03-01 01:34:11 --> [REQ_ID=13c93e714015] [FILTER_AFTER]
DEBUG - 2026-03-01 01:34:11 --> [REQ_ID=13c93e714015] [LIFECYCLE][END] status=200 duration_ms=638.03 memory_delta=4194304
INFO - 2026-03-01 01:34:11 --> [REQ_ID=01aadd969c2b] [PERF] Execution time=0.636077
DEBUG - 2026-03-01 01:34:11 --> [REQ_ID=13c93e714015] [REQUEST][END]
INFO - 2026-03-01 01:34:11 --> [REQ_ID=13c93e714015] [PERF] Execution time=0.676413
INFO - 2026-03-01 01:45:01 --> [spark:ops:work] Started
INFO - 2026-03-01 01:45:01 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-03-01 01:45:01 --> [SPARK_MEMORY] 16777216
INFO - 2026-03-01 01:45:01 --> [spark:ops:work] Intent
INFO - 2026-03-01 01:45:01 --> [spark:ops:work] Completed
INFO - 2026-03-01 01:45:01 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.052002
INFO - 2026-03-01 01:45:01 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-03-01 01:45:48 --> [REQ_ID=9aabab51876a] [REQUEST][START] GET /index.php/Wallets/Purchase/Memberships/Starter
DEBUG - 2026-03-01 01:45:48 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-01 01:45:48 --> [REQ_ID=9aabab51876a] [FILTER_BEFORE] /index.php/Wallets/Purchase/Memberships/Starter
DEBUG - 2026-03-01 01:45:48 --> [REQ_ID=9aabab51876a] [ROUTE] Controller=\App\Modules\User\Controllers\WalletsController Method=purchase
DEBUG - 2026-03-01 01:45:48 --> [REQ_ID=9aabab51876a] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Wallets/Purchase/Memberships/Starter
DEBUG - 2026-03-01 01:45:48 --> [CSRF] token name=csrf_test_name hash=0acc8b0d9979c4c7fa7c99b04d8ba921
DEBUG - 2026-03-01 01:45:48 --> [REQ_ID=9aabab51876a] [REQUEST][END]
INFO - 2026-03-01 01:45:48 --> [REQ_ID=9aabab51876a] [PERF] Execution time=0.056845
DEBUG - 2026-03-01 01:45:49 --> [REQ_ID=cdd8fc642f0a] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-01 01:45:49 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-01 01:45:49 --> [REQ_ID=cdd8fc642f0a] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-01 01:45:49 --> [REQ_ID=cdd8fc642f0a] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-01 01:45:49 --> [REQ_ID=cdd8fc642f0a] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-01 01:45:49 --> [CSRF] token name=csrf_test_name hash=46d82ac4a1d16c5e8a6a4f132e818e83
DEBUG - 2026-03-01 01:45:49 --> [REQ_ID=7c61dc5874e6] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-01 01:45:49 --> [REQ_ID=7c61dc5874e6] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-01 01:45:49 --> [REQ_ID=cdd8fc642f0a] [FILTER_AFTER]
DEBUG - 2026-03-01 01:45:49 --> [REQ_ID=cdd8fc642f0a] [LIFECYCLE][END] status=200 duration_ms=59.59 memory_delta=0
INFO - 2026-03-01 01:45:49 --> [REQ_ID=7c61dc5874e6] [PERF] Execution time=0.057914
DEBUG - 2026-03-01 01:45:49 --> [REQ_ID=cdd8fc642f0a] [REQUEST][END]
INFO - 2026-03-01 01:45:49 --> [REQ_ID=cdd8fc642f0a] [PERF] Execution time=0.071027
DEBUG - 2026-03-01 01:47:15 --> [REQ_ID=f92fe51437c8] [REQUEST][START] GET /index.php/Management/Marketing/Ideas
DEBUG - 2026-03-01 01:47:15 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-01 01:47:15 --> [REQ_ID=f92fe51437c8] [FILTER_BEFORE] /index.php/Management/Marketing/Ideas
DEBUG - 2026-03-01 01:47:15 --> [REQ_ID=f92fe51437c8] [ROUTE] Controller=\App\Modules\Management\Controllers\MarketingAdminController Method=ideas
DEBUG - 2026-03-01 01:47:15 --> [REQ_ID=f92fe51437c8] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Management/Marketing/Ideas
DEBUG - 2026-03-01 01:47:15 --> [CSRF] token name=csrf_test_name hash=7c041e6cf6cbb4728362517c865c138c
DEBUG - 2026-03-01 01:47:15 --> [REQ_ID=f92fe51437c8] [REQUEST][END]
INFO - 2026-03-01 01:47:15 --> [REQ_ID=f92fe51437c8] [PERF] Execution time=0.063225
DEBUG - 2026-03-01 01:47:16 --> [REQ_ID=c3299dd5700d] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-01 01:47:16 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-01 01:47:16 --> [REQ_ID=c3299dd5700d] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-01 01:47:16 --> [REQ_ID=c3299dd5700d] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-01 01:47:16 --> [REQ_ID=c3299dd5700d] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-01 01:47:16 --> [CSRF] token name=csrf_test_name hash=86c085e27716d9060f07e0ae18f547ff
DEBUG - 2026-03-01 01:47:16 --> [REQ_ID=866521d357c5] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-01 01:47:16 --> [REQ_ID=866521d357c5] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-01 01:47:16 --> [REQ_ID=c3299dd5700d] [FILTER_AFTER]
DEBUG - 2026-03-01 01:47:16 --> [REQ_ID=c3299dd5700d] [LIFECYCLE][END] status=200 duration_ms=49.53 memory_delta=0
INFO - 2026-03-01 01:47:16 --> [REQ_ID=866521d357c5] [PERF] Execution time=0.048367
DEBUG - 2026-03-01 01:47:16 --> [REQ_ID=c3299dd5700d] [REQUEST][END]
INFO - 2026-03-01 01:47:16 --> [REQ_ID=c3299dd5700d] [PERF] Execution time=0.061455
DEBUG - 2026-03-01 01:59:58 --> [REQ_ID=d0a7b6354bce] [REQUEST][START] GET /
DEBUG - 2026-03-01 01:59:58 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-01 01:59:59 --> [REQ_ID=d0a7b6354bce] [FILTER_BEFORE] /
DEBUG - 2026-03-01 01:59:59 --> [REQ_ID=d0a7b6354bce] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-01 01:59:59 --> [REQ_ID=d0a7b6354bce] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-01 01:59:59 --> [CSRF] token name=csrf_test_name hash=ae9a0262a1522c280da686d430d78f92
DEBUG - 2026-03-01 01:59:59 --> [REQ_ID=c59658462400] [INIT] App\Controllers\Home::GET
INFO - 2026-03-01 01:59:59 --> [REQ_ID=c59658462400] [MEMORY][controller-start] 6291456
INFO - 2026-03-01 01:59:59 --> [REQ_ID=c59658462400] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-01 01:59:59 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-01 01:59:59 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-03-01 01:59:59 --> [REQ_ID=c59658462400] [VIEW_RENDER] themes/public/home
INFO - 2026-03-01 01:59:59 --> [REQ_ID=c59658462400] [MEMORY][commonData:start] 10485760
INFO - 2026-03-01 01:59:59 --> themesMemory usage: 10485760
DEBUG - 2026-03-01 01:59:59 --> [MetaService] slug= pageName=Home cacheHit= path=DB
DEBUG - 2026-03-01 01:59:59 --> [REQ_ID=d0a7b6354bce] [FILTER_AFTER]
DEBUG - 2026-03-01 01:59:59 --> [REQ_ID=d0a7b6354bce] [LIFECYCLE][END] status=200 duration_ms=710.70 memory_delta=4194304
INFO - 2026-03-01 01:59:59 --> [REQ_ID=c59658462400] [PERF] Execution time=0.708858
DEBUG - 2026-03-01 01:59:59 --> [REQ_ID=d0a7b6354bce] [REQUEST][END]
INFO - 2026-03-01 01:59:59 --> [REQ_ID=d0a7b6354bce] [PERF] Execution time=0.754642
DEBUG - 2026-03-01 02:00:02 --> [REQ_ID=78a6b9e31d14] [REQUEST][START] GET /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-01 02:00:02 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-01 02:00:02 --> [REQ_ID=78a6b9e31d14] [FILTER_BEFORE] /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-01 02:00:02 --> [REQ_ID=78a6b9e31d14] [ROUTE] Controller=\App\Modules\Management\Controllers\ManagementAPIController Method=Run_CRON_Tasks
DEBUG - 2026-03-01 02:00:02 --> [REQ_ID=78a6b9e31d14] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-01 02:00:02 --> [REQ_ID=78a6b9e31d14] [REQUEST][END]
INFO - 2026-03-01 02:00:02 --> [REQ_ID=78a6b9e31d14] [PERF] Execution time=0.027487
INFO - 2026-03-01 02:00:02 --> [spark:ops:work] Started
INFO - 2026-03-01 02:00:02 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-03-01 02:00:02 --> [SPARK_MEMORY] 16777216
INFO - 2026-03-01 02:00:02 --> [spark:ops:work] Intent
INFO - 2026-03-01 02:00:02 --> [spark:ops:work] Completed
INFO - 2026-03-01 02:00:02 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.035375
INFO - 2026-03-01 02:00:02 --> [SPARK_MEMORY] 18874368
INFO - 2026-03-01 02:00:02 --> [SPARK_START] App\Commands\AIOps\Run
INFO - 2026-03-01 02:00:02 --> [SPARK_MEMORY] 16777216
INFO - 2026-03-01 02:00:02 --> [spark:aiops:run] Intent
INFO - 2026-03-01 02:00:04 --> [AIOPS][SPARK][GOVERNANCE][spark:logs:summarize] Started
INFO - 2026-03-01 02:00:04 --> [SPARK_START] App\Commands\Logs\Summarize
INFO - 2026-03-01 02:00:04 --> [SPARK_MEMORY] 16777216
INFO - 2026-03-01 02:00:04 --> [spark:logs:summarize] Intent
INFO - 2026-03-01 02:00:04 --> [AIOPS][SPARK][GOVERNANCE][spark:logs:summarize] Completed
INFO - 2026-03-01 02:00:04 --> [SPARK_COMPLETE] App\Commands\Logs\Summarize duration=0.004891
INFO - 2026-03-01 02:00:04 --> [SPARK_MEMORY] 16777216
INFO - 2026-03-01 02:00:04 --> [spark:app:healthcheck] Started
INFO - 2026-03-01 02:00:04 --> [SPARK_START] App\Commands\App\Healthcheck
INFO - 2026-03-01 02:00:04 --> [SPARK_MEMORY] 16777216
INFO - 2026-03-01 02:00:04 --> [spark:app:healthcheck] Intent
DEBUG - 2026-03-01 02:00:04 --> LOG_HEALTHCHECK debug marker=c16bb5892803
INFO - 2026-03-01 02:00:04 --> LOG_HEALTHCHECK info marker=c16bb5892803
NOTICE - 2026-03-01 02:00:04 --> LOG_HEALTHCHECK probe marker=c16bb5892803
INFO - 2026-03-01 02:00:04 --> [spark:app:healthcheck] Completed
INFO - 2026-03-01 02:00:04 --> [SPARK_COMPLETE] App\Commands\App\Healthcheck duration=0.025905
INFO - 2026-03-01 02:00:04 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-03-01 02:00:05 --> OllamaPatchRunner:L142 - validateGeneratedPatch Content: 
WARNING - 2026-03-01 02:00:05 --> OllamaPatchRunner:L49 - Original Diff: 
DEBUG - 2026-03-01 02:00:06 --> OllamaPatchRunner:L51 - Retried Diff: 
DEBUG - 2026-03-01 02:00:06 --> OllamaPatchRunner:L142 - validateGeneratedPatch Content: 
DEBUG - 2026-03-01 02:00:06 --> OllamaPatchRunner:L53 - Validating Generated Patch Failed
INFO - 2026-03-01 02:00:06 --> [SPARK_COMPLETE] App\Commands\AIOps\Run duration=3.682248
INFO - 2026-03-01 02:00:06 --> [SPARK_MEMORY] 18874368
INFO - 2026-03-01 02:15:02 --> [spark:ops:work] Started
INFO - 2026-03-01 02:15:02 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-03-01 02:15:02 --> [SPARK_MEMORY] 16777216
DEBUG - 2026-03-01 02:15:02 --> [REQ_ID=416255544b73] [REQUEST][START] GET /index.php/API/Alerts/fetchEmailAlerts
INFO - 2026-03-01 02:15:02 --> [spark:ops:work] Intent
DEBUG - 2026-03-01 02:15:02 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-01 02:15:02 --> [REQ_ID=416255544b73] [FILTER_BEFORE] /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-01 02:15:02 --> [REQ_ID=416255544b73] [ROUTE] Controller=\App\Modules\APIs\Controllers\AlertsAPIController Method=fetchEmailAlerts
DEBUG - 2026-03-01 02:15:02 --> [REQ_ID=416255544b73] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-01 02:15:02 --> [REQ_ID=416255544b73] [REQUEST][END]
INFO - 2026-03-01 02:15:02 --> [REQ_ID=416255544b73] [PERF] Execution time=0.087085
INFO - 2026-03-01 02:15:02 --> [spark:ops:work] Completed
INFO - 2026-03-01 02:15:02 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.131891
INFO - 2026-03-01 02:15:02 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-03-01 02:16:12 --> [REQ_ID=5095b832e789] [REQUEST][START] GET /index.php/register
DEBUG - 2026-03-01 02:16:12 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-01 02:16:12 --> [REQ_ID=5095b832e789] [FILTER_BEFORE] /index.php/register
DEBUG - 2026-03-01 02:16:12 --> [REQ_ID=5095b832e789] [ROUTE] Controller=\App\Controllers\AuthController Method=register
DEBUG - 2026-03-01 02:16:12 --> [REQ_ID=5095b832e789] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/register
DEBUG - 2026-03-01 02:16:12 --> [CSRF] token name=csrf_test_name hash=bd76760c0aa50b4e38432fd7f7668f2e
DEBUG - 2026-03-01 02:16:12 --> [REQ_ID=1b3e8c910d61] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-01 02:16:12 --> [REQ_ID=1b3e8c910d61] [MEMORY][controller-start] 6291456
INFO - 2026-03-01 02:16:12 --> [REGISTRATION] Form loaded
INFO - 2026-03-01 02:16:12 --> [REQ_ID=1b3e8c910d61] [PERF] Execution time=0.132646
DEBUG - 2026-03-01 02:17:43 --> [REQ_ID=ca2f1fd2d24a] [REQUEST][START] GET /
DEBUG - 2026-03-01 02:17:43 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-01 02:17:43 --> [REQ_ID=ca2f1fd2d24a] [FILTER_BEFORE] /
DEBUG - 2026-03-01 02:17:43 --> [REQ_ID=ca2f1fd2d24a] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-01 02:17:43 --> [REQ_ID=ca2f1fd2d24a] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-01 02:17:43 --> [CSRF] token name=csrf_test_name hash=5a5eb7513ac342635b2834eee451b525
DEBUG - 2026-03-01 02:17:43 --> [REQ_ID=4d7d80f1e12e] [INIT] App\Controllers\Home::GET
INFO - 2026-03-01 02:17:43 --> [REQ_ID=4d7d80f1e12e] [MEMORY][controller-start] 6291456
INFO - 2026-03-01 02:17:43 --> [REQ_ID=4d7d80f1e12e] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-01 02:17:43 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-01 02:17:44 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-03-01 02:17:44 --> [REQ_ID=4d7d80f1e12e] [VIEW_RENDER] themes/public/home
INFO - 2026-03-01 02:17:44 --> [REQ_ID=4d7d80f1e12e] [MEMORY][commonData:start] 10485760
INFO - 2026-03-01 02:17:44 --> themesMemory usage: 10485760
DEBUG - 2026-03-01 02:17:44 --> [MetaService] slug= pageName=Home cacheHit= path=DB
DEBUG - 2026-03-01 02:17:44 --> [REQ_ID=ca2f1fd2d24a] [FILTER_AFTER]
DEBUG - 2026-03-01 02:17:44 --> [REQ_ID=ca2f1fd2d24a] [LIFECYCLE][END] status=200 duration_ms=612.48 memory_delta=4194304
INFO - 2026-03-01 02:17:44 --> [REQ_ID=4d7d80f1e12e] [PERF] Execution time=0.610096
DEBUG - 2026-03-01 02:17:44 --> [REQ_ID=ca2f1fd2d24a] [REQUEST][END]
INFO - 2026-03-01 02:17:44 --> [REQ_ID=ca2f1fd2d24a] [PERF] Execution time=0.651544
INFO - 2026-03-01 02:30:01 --> [spark:ops:work] Started
INFO - 2026-03-01 02:30:01 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-03-01 02:30:02 --> [SPARK_MEMORY] 16777216
INFO - 2026-03-01 02:30:02 --> [spark:ops:work] Intent
INFO - 2026-03-01 02:30:02 --> [spark:ops:work] Completed
INFO - 2026-03-01 02:30:02 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.042741
INFO - 2026-03-01 02:30:02 --> [SPARK_MEMORY] 18874368
INFO - 2026-03-01 02:45:01 --> [spark:ops:work] Started
INFO - 2026-03-01 02:45:01 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-03-01 02:45:01 --> [SPARK_MEMORY] 16777216
INFO - 2026-03-01 02:45:01 --> [spark:ops:work] Intent
INFO - 2026-03-01 02:45:01 --> [spark:ops:work] Completed
INFO - 2026-03-01 02:45:01 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.042127
INFO - 2026-03-01 02:45:01 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-03-01 02:49:04 --> [REQ_ID=a45b0b64735b] [REQUEST][START] GET /index.php
DEBUG - 2026-03-01 02:49:04 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-01 02:49:04 --> [REQ_ID=a45b0b64735b] [FILTER_BEFORE] /index.php
DEBUG - 2026-03-01 02:49:04 --> [REQ_ID=a45b0b64735b] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-01 02:49:04 --> [REQ_ID=a45b0b64735b] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-01 02:49:04 --> [CSRF] token name=csrf_test_name hash=5d2add749dd58fada06d22fe62b84ac1
DEBUG - 2026-03-01 02:49:04 --> [REQ_ID=fd1089ae088d] [INIT] App\Controllers\Home::GET
INFO - 2026-03-01 02:49:04 --> [REQ_ID=fd1089ae088d] [MEMORY][controller-start] 6291456
INFO - 2026-03-01 02:49:04 --> [REQ_ID=fd1089ae088d] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-01 02:49:04 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-01 02:49:04 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-03-01 02:49:04 --> [REQ_ID=fd1089ae088d] [VIEW_RENDER] themes/public/home
INFO - 2026-03-01 02:49:04 --> [REQ_ID=fd1089ae088d] [MEMORY][commonData:start] 10485760
INFO - 2026-03-01 02:49:04 --> themesMemory usage: 10485760
DEBUG - 2026-03-01 02:49:04 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-01 02:49:04 --> [REQ_ID=a45b0b64735b] [FILTER_AFTER]
DEBUG - 2026-03-01 02:49:04 --> [REQ_ID=a45b0b64735b] [LIFECYCLE][END] status=200 duration_ms=632.52 memory_delta=4194304
INFO - 2026-03-01 02:49:04 --> [REQ_ID=fd1089ae088d] [PERF] Execution time=0.629977
DEBUG - 2026-03-01 02:49:04 --> [REQ_ID=a45b0b64735b] [REQUEST][END]
INFO - 2026-03-01 02:49:04 --> [REQ_ID=a45b0b64735b] [PERF] Execution time=0.672626
INFO - 2026-03-01 03:00:01 --> [spark:ops:work] Started
INFO - 2026-03-01 03:00:01 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-03-01 03:00:01 --> [SPARK_MEMORY] 16777216
INFO - 2026-03-01 03:00:01 --> [spark:ops:work] Intent
DEBUG - 2026-03-01 03:00:01 --> [REQ_ID=d9ad35fd9ce8] [REQUEST][START] GET /index.php/API/Management/Run-CRON-Tasks
INFO - 2026-03-01 03:00:01 --> [spark:ops:work] Completed
INFO - 2026-03-01 03:00:01 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.023808
INFO - 2026-03-01 03:00:01 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-03-01 03:00:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-01 03:00:02 --> [REQ_ID=d9ad35fd9ce8] [FILTER_BEFORE] /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-01 03:00:02 --> [REQ_ID=d9ad35fd9ce8] [ROUTE] Controller=\App\Modules\Management\Controllers\ManagementAPIController Method=Run_CRON_Tasks
DEBUG - 2026-03-01 03:00:02 --> [REQ_ID=d9ad35fd9ce8] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-01 03:00:02 --> [REQ_ID=d9ad35fd9ce8] [REQUEST][END]
INFO - 2026-03-01 03:00:02 --> [REQ_ID=d9ad35fd9ce8] [PERF] Execution time=0.050233
INFO - 2026-03-01 03:15:01 --> [spark:ops:work] Started
INFO - 2026-03-01 03:15:01 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-03-01 03:15:01 --> [SPARK_MEMORY] 16777216
INFO - 2026-03-01 03:15:01 --> [spark:ops:work] Intent
INFO - 2026-03-01 03:15:01 --> [spark:ops:work] Completed
INFO - 2026-03-01 03:15:01 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.037411
INFO - 2026-03-01 03:15:01 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-03-01 03:15:01 --> [REQ_ID=f231946c2e3f] [REQUEST][START] GET /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-01 03:15:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-01 03:15:02 --> [REQ_ID=f231946c2e3f] [FILTER_BEFORE] /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-01 03:15:02 --> [REQ_ID=f231946c2e3f] [ROUTE] Controller=\App\Modules\APIs\Controllers\AlertsAPIController Method=fetchEmailAlerts
DEBUG - 2026-03-01 03:15:02 --> [REQ_ID=f231946c2e3f] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-01 03:15:02 --> [REQ_ID=f231946c2e3f] [REQUEST][END]
INFO - 2026-03-01 03:15:02 --> [REQ_ID=f231946c2e3f] [PERF] Execution time=0.056418
DEBUG - 2026-03-01 03:18:15 --> [REQ_ID=d34947aaf29c] [REQUEST][START] GET /index.php/Features/Advanced-Investment-Portfoio-Manager
DEBUG - 2026-03-01 03:18:15 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-01 03:18:15 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: GET, Route: Features/Advanced-Investment-Portfoio-Manager]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-01 03:18:15 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-01 03:18:15 --> [404] URI=https://www.mymiwallet.com/index.php/Features/Advanced-Investment-Portfoio-Manager
WARNING - 2026-03-01 03:18:15 --> 404 route miss: https://www.mymiwallet.com/index.php/Features/Advanced-Investment-Portfoio-Manager | referrer: https://www.mymiwallet.com/index.php/How-It-Works/MyMI-Gold
ERROR - 2026-03-01 03:18:15 --> [ERROR_PAGE] event=error_404 status=404 message=Page not found.
INFO - 2026-03-01 03:30:01 --> [spark:ops:work] Started
INFO - 2026-03-01 03:30:01 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-03-01 03:30:01 --> [SPARK_MEMORY] 16777216
INFO - 2026-03-01 03:30:01 --> [spark:ops:work] Intent
INFO - 2026-03-01 03:30:01 --> [spark:ops:work] Completed
INFO - 2026-03-01 03:30:01 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.019489
INFO - 2026-03-01 03:30:01 --> [SPARK_MEMORY] 18874368
INFO - 2026-03-01 03:45:01 --> [spark:ops:work] Started
INFO - 2026-03-01 03:45:01 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-03-01 03:45:01 --> [SPARK_MEMORY] 16777216
INFO - 2026-03-01 03:45:01 --> [spark:ops:work] Intent
INFO - 2026-03-01 03:45:01 --> [spark:ops:work] Completed
INFO - 2026-03-01 03:45:01 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.066505
INFO - 2026-03-01 03:45:01 --> [SPARK_MEMORY] 18874368
INFO - 2026-03-01 04:00:02 --> [SPARK_START] App\Commands\AIOps\Run
INFO - 2026-03-01 04:00:02 --> [SPARK_MEMORY] 16777216
INFO - 2026-03-01 04:00:02 --> [spark:aiops:run] Intent
DEBUG - 2026-03-01 04:00:02 --> [REQ_ID=1ad6adf57b68] [REQUEST][START] GET /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-01 04:00:02 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
INFO - 2026-03-01 04:00:02 --> [spark:ops:work] Started
INFO - 2026-03-01 04:00:02 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-03-01 04:00:02 --> [SPARK_MEMORY] 16777216
INFO - 2026-03-01 04:00:02 --> [spark:ops:work] Intent
DEBUG - 2026-03-01 04:00:02 --> [REQ_ID=1ad6adf57b68] [FILTER_BEFORE] /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-01 04:00:02 --> [REQ_ID=1ad6adf57b68] [ROUTE] Controller=\App\Modules\Management\Controllers\ManagementAPIController Method=Run_CRON_Tasks
DEBUG - 2026-03-01 04:00:02 --> [REQ_ID=1ad6adf57b68] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Management/Run-CRON-Tasks
INFO - 2026-03-01 04:00:02 --> [spark:ops:work] Completed
INFO - 2026-03-01 04:00:02 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.030454
INFO - 2026-03-01 04:00:02 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-03-01 04:00:02 --> [REQ_ID=1ad6adf57b68] [REQUEST][END]
INFO - 2026-03-01 04:00:02 --> [REQ_ID=1ad6adf57b68] [PERF] Execution time=0.087393
INFO - 2026-03-01 04:00:03 --> [AIOPS][SPARK][GOVERNANCE][spark:logs:summarize] Started
INFO - 2026-03-01 04:00:03 --> [SPARK_START] App\Commands\Logs\Summarize
INFO - 2026-03-01 04:00:03 --> [SPARK_MEMORY] 16777216
INFO - 2026-03-01 04:00:03 --> [spark:logs:summarize] Intent
INFO - 2026-03-01 04:00:03 --> [AIOPS][SPARK][GOVERNANCE][spark:logs:summarize] Completed
INFO - 2026-03-01 04:00:03 --> [SPARK_COMPLETE] App\Commands\Logs\Summarize duration=0.005983
INFO - 2026-03-01 04:00:03 --> [SPARK_MEMORY] 16777216
INFO - 2026-03-01 04:00:04 --> [spark:app:healthcheck] Started
INFO - 2026-03-01 04:00:04 --> [SPARK_START] App\Commands\App\Healthcheck
INFO - 2026-03-01 04:00:04 --> [SPARK_MEMORY] 16777216
INFO - 2026-03-01 04:00:04 --> [spark:app:healthcheck] Intent
DEBUG - 2026-03-01 04:00:04 --> LOG_HEALTHCHECK debug marker=cfd12a97395f
INFO - 2026-03-01 04:00:04 --> LOG_HEALTHCHECK info marker=cfd12a97395f
NOTICE - 2026-03-01 04:00:04 --> LOG_HEALTHCHECK probe marker=cfd12a97395f
INFO - 2026-03-01 04:00:04 --> [spark:app:healthcheck] Completed
INFO - 2026-03-01 04:00:04 --> [SPARK_COMPLETE] App\Commands\App\Healthcheck duration=0.052456
INFO - 2026-03-01 04:00:04 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-03-01 04:00:05 --> OllamaPatchRunner:L142 - validateGeneratedPatch Content: 
WARNING - 2026-03-01 04:00:05 --> OllamaPatchRunner:L49 - Original Diff: 
DEBUG - 2026-03-01 04:00:05 --> OllamaPatchRunner:L51 - Retried Diff: 
DEBUG - 2026-03-01 04:00:05 --> OllamaPatchRunner:L142 - validateGeneratedPatch Content: 
DEBUG - 2026-03-01 04:00:05 --> OllamaPatchRunner:L53 - Validating Generated Patch Failed
INFO - 2026-03-01 04:00:05 --> [SPARK_COMPLETE] App\Commands\AIOps\Run duration=3.916595
INFO - 2026-03-01 04:00:05 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-03-01 04:04:04 --> [REQ_ID=b9d6c8317e77] [REQUEST][START] GET /index.php/How-It-Works/Investor-Profile
DEBUG - 2026-03-01 04:04:04 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-01 04:04:04 --> [REQ_ID=b9d6c8317e77] [FILTER_BEFORE] /index.php/How-It-Works/Investor-Profile
DEBUG - 2026-03-01 04:04:04 --> [REQ_ID=b9d6c8317e77] [ROUTE] Controller=\App\Modules\Blog\Controllers\HowItWorksController Method=show
DEBUG - 2026-03-01 04:04:04 --> [REQ_ID=b9d6c8317e77] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/How-It-Works/Investor-Profile
DEBUG - 2026-03-01 04:04:04 --> [CSRF] token name=csrf_test_name hash=f44a4ac37e75d81da0f1785d53ea81da
DEBUG - 2026-03-01 04:04:04 --> [REQ_ID=aa3c0872314f] [INIT] App\Modules\Blog\Controllers\HowItWorksController::GET
INFO - 2026-03-01 04:04:04 --> [REQ_ID=aa3c0872314f] [MEMORY][controller-start] 6291456
DEBUG - 2026-03-01 04:04:04 --> [REQ_ID=aa3c0872314f] [METHOD_ENTRY] show
DEBUG - 2026-03-01 04:04:04 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-01 04:04:04 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-01 04:04:04 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-01 04:04:04 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-01 04:04:04 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-01 04:04:04 --> MyMICoin: guest context detected; skipping user-specific preload.
ERROR - 2026-03-01 04:04:04 --> [ERROR_PAGE] event=error_404 status=404 message=Page not found.
DEBUG - 2026-03-01 04:04:04 --> [REQ_ID=b9d6c8317e77] [FILTER_AFTER]
DEBUG - 2026-03-01 04:04:04 --> [REQ_ID=b9d6c8317e77] [LIFECYCLE][END] status=404 duration_ms=176.98 memory_delta=0
INFO - 2026-03-01 04:04:04 --> [REQ_ID=aa3c0872314f] [PERF] Execution time=0.174199
DEBUG - 2026-03-01 04:04:04 --> [REQ_ID=b9d6c8317e77] [REQUEST][END]
INFO - 2026-03-01 04:04:04 --> [REQ_ID=b9d6c8317e77] [PERF] Execution time=0.220586
INFO - 2026-03-01 04:15:01 --> [spark:ops:work] Started
INFO - 2026-03-01 04:15:01 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-03-01 04:15:01 --> [SPARK_MEMORY] 16777216
INFO - 2026-03-01 04:15:01 --> [spark:ops:work] Intent
INFO - 2026-03-01 04:15:01 --> [spark:ops:work] Completed
INFO - 2026-03-01 04:15:01 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.090163
INFO - 2026-03-01 04:15:01 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-03-01 04:15:02 --> [REQ_ID=8ec05c3b53cc] [REQUEST][START] GET /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-01 04:15:02 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-01 04:15:02 --> [REQ_ID=8ec05c3b53cc] [FILTER_BEFORE] /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-01 04:15:02 --> [REQ_ID=8ec05c3b53cc] [ROUTE] Controller=\App\Modules\APIs\Controllers\AlertsAPIController Method=fetchEmailAlerts
DEBUG - 2026-03-01 04:15:02 --> [REQ_ID=8ec05c3b53cc] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-01 04:15:02 --> [REQ_ID=8ec05c3b53cc] [REQUEST][END]
INFO - 2026-03-01 04:15:02 --> [REQ_ID=8ec05c3b53cc] [PERF] Execution time=0.062127
DEBUG - 2026-03-01 04:16:40 --> [REQ_ID=0e8ee0460a47] [REQUEST][START] GET /
DEBUG - 2026-03-01 04:16:40 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-01 04:16:40 --> [REQ_ID=0e8ee0460a47] [FILTER_BEFORE] /
DEBUG - 2026-03-01 04:16:40 --> [REQ_ID=0e8ee0460a47] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-01 04:16:40 --> [REQ_ID=0e8ee0460a47] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-01 04:16:40 --> [CSRF] token name=csrf_test_name hash=4f99eeaf787ad1953183344633a4fac8
DEBUG - 2026-03-01 04:16:40 --> [REQ_ID=7f02cd32a740] [INIT] App\Controllers\Home::GET
INFO - 2026-03-01 04:16:40 --> [REQ_ID=7f02cd32a740] [MEMORY][controller-start] 6291456
INFO - 2026-03-01 04:16:40 --> [REQ_ID=7f02cd32a740] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-01 04:16:40 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-01 04:16:41 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-03-01 04:16:41 --> [REQ_ID=7f02cd32a740] [VIEW_RENDER] themes/public/home
INFO - 2026-03-01 04:16:41 --> [REQ_ID=7f02cd32a740] [MEMORY][commonData:start] 10485760
INFO - 2026-03-01 04:16:41 --> themesMemory usage: 10485760
DEBUG - 2026-03-01 04:16:41 --> [MetaService] slug= pageName=Home cacheHit= path=DB
DEBUG - 2026-03-01 04:16:41 --> [REQ_ID=0e8ee0460a47] [FILTER_AFTER]
DEBUG - 2026-03-01 04:16:41 --> [REQ_ID=0e8ee0460a47] [LIFECYCLE][END] status=200 duration_ms=716.61 memory_delta=4194304
INFO - 2026-03-01 04:16:41 --> [REQ_ID=7f02cd32a740] [PERF] Execution time=0.714468
DEBUG - 2026-03-01 04:16:41 --> [REQ_ID=0e8ee0460a47] [REQUEST][END]
INFO - 2026-03-01 04:16:41 --> [REQ_ID=0e8ee0460a47] [PERF] Execution time=0.755997
INFO - 2026-03-01 04:30:01 --> [spark:ops:work] Started
INFO - 2026-03-01 04:30:01 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-03-01 04:30:01 --> [SPARK_MEMORY] 16777216
INFO - 2026-03-01 04:30:01 --> [spark:ops:work] Intent
INFO - 2026-03-01 04:30:01 --> [spark:ops:work] Completed
INFO - 2026-03-01 04:30:01 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.031662
INFO - 2026-03-01 04:30:01 --> [SPARK_MEMORY] 18874368
INFO - 2026-03-01 04:45:01 --> [spark:ops:work] Started
INFO - 2026-03-01 04:45:01 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-03-01 04:45:01 --> [SPARK_MEMORY] 16777216
INFO - 2026-03-01 04:45:01 --> [spark:ops:work] Intent
INFO - 2026-03-01 04:45:01 --> [spark:ops:work] Completed
INFO - 2026-03-01 04:45:01 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.036273
INFO - 2026-03-01 04:45:01 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-03-01 05:00:01 --> [REQ_ID=8545c4eb7b62] [REQUEST][START] GET /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-01 05:00:02 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-01 05:00:02 --> [REQ_ID=8545c4eb7b62] [FILTER_BEFORE] /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-01 05:00:02 --> [REQ_ID=8545c4eb7b62] [ROUTE] Controller=\App\Modules\Management\Controllers\ManagementAPIController Method=Run_CRON_Tasks
DEBUG - 2026-03-01 05:00:02 --> [REQ_ID=8545c4eb7b62] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-01 05:00:02 --> [REQ_ID=8545c4eb7b62] [REQUEST][END]
INFO - 2026-03-01 05:00:02 --> [REQ_ID=8545c4eb7b62] [PERF] Execution time=0.054693
INFO - 2026-03-01 05:00:02 --> [spark:ops:work] Started
INFO - 2026-03-01 05:00:02 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-03-01 05:00:02 --> [SPARK_MEMORY] 16777216
INFO - 2026-03-01 05:00:02 --> [spark:ops:work] Intent
INFO - 2026-03-01 05:00:02 --> [spark:ops:work] Completed
INFO - 2026-03-01 05:00:02 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.050154
INFO - 2026-03-01 05:00:02 --> [SPARK_MEMORY] 18874368
INFO - 2026-03-01 05:15:01 --> [spark:ops:work] Started
INFO - 2026-03-01 05:15:01 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-03-01 05:15:01 --> [SPARK_MEMORY] 16777216
INFO - 2026-03-01 05:15:01 --> [spark:ops:work] Intent
INFO - 2026-03-01 05:15:02 --> [spark:ops:work] Completed
INFO - 2026-03-01 05:15:02 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.100530
INFO - 2026-03-01 05:15:02 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-03-01 05:15:02 --> [REQ_ID=fa1a99742c47] [REQUEST][START] GET /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-01 05:15:02 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-01 05:15:02 --> [REQ_ID=fa1a99742c47] [FILTER_BEFORE] /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-01 05:15:02 --> [REQ_ID=fa1a99742c47] [ROUTE] Controller=\App\Modules\APIs\Controllers\AlertsAPIController Method=fetchEmailAlerts
DEBUG - 2026-03-01 05:15:02 --> [REQ_ID=fa1a99742c47] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-01 05:15:02 --> [REQ_ID=fa1a99742c47] [REQUEST][END]
INFO - 2026-03-01 05:15:02 --> [REQ_ID=fa1a99742c47] [PERF] Execution time=0.066164
INFO - 2026-03-01 05:30:01 --> [spark:ops:work] Started
INFO - 2026-03-01 05:30:01 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-03-01 05:30:01 --> [SPARK_MEMORY] 16777216
INFO - 2026-03-01 05:30:01 --> [spark:ops:work] Intent
INFO - 2026-03-01 05:30:01 --> [spark:ops:work] Completed
INFO - 2026-03-01 05:30:01 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.095897
INFO - 2026-03-01 05:30:01 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-03-01 05:40:07 --> [REQ_ID=16e59cfcc20d] [REQUEST][START] GET /
DEBUG - 2026-03-01 05:40:07 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-01 05:40:07 --> [REQ_ID=16e59cfcc20d] [FILTER_BEFORE] /
DEBUG - 2026-03-01 05:40:07 --> [REQ_ID=16e59cfcc20d] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-01 05:40:07 --> [REQ_ID=16e59cfcc20d] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-01 05:40:07 --> [CSRF] token name=csrf_test_name hash=2f04df04adef77b44d6cd7426985ceb4
DEBUG - 2026-03-01 05:40:07 --> [REQ_ID=d4e34d7ec25c] [INIT] App\Controllers\Home::GET
INFO - 2026-03-01 05:40:07 --> [REQ_ID=d4e34d7ec25c] [MEMORY][controller-start] 6291456
INFO - 2026-03-01 05:40:08 --> [REQ_ID=d4e34d7ec25c] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-01 05:40:08 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-01 05:40:08 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-03-01 05:40:08 --> [REQ_ID=d4e34d7ec25c] [VIEW_RENDER] themes/public/home
INFO - 2026-03-01 05:40:08 --> [REQ_ID=d4e34d7ec25c] [MEMORY][commonData:start] 10485760
INFO - 2026-03-01 05:40:08 --> themesMemory usage: 10485760
DEBUG - 2026-03-01 05:40:08 --> [MetaService] slug= pageName=Home cacheHit= path=DB
DEBUG - 2026-03-01 05:40:08 --> [REQ_ID=16e59cfcc20d] [FILTER_AFTER]
DEBUG - 2026-03-01 05:40:08 --> [REQ_ID=16e59cfcc20d] [LIFECYCLE][END] status=200 duration_ms=669.86 memory_delta=4194304
INFO - 2026-03-01 05:40:08 --> [REQ_ID=d4e34d7ec25c] [PERF] Execution time=0.667842
DEBUG - 2026-03-01 05:40:08 --> [REQ_ID=16e59cfcc20d] [REQUEST][END]
INFO - 2026-03-01 05:40:08 --> [REQ_ID=16e59cfcc20d] [PERF] Execution time=0.710971
INFO - 2026-03-01 05:45:01 --> [spark:ops:work] Started
INFO - 2026-03-01 05:45:01 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-03-01 05:45:01 --> [SPARK_MEMORY] 16777216
INFO - 2026-03-01 05:45:01 --> [spark:ops:work] Intent
INFO - 2026-03-01 05:45:01 --> [spark:ops:work] Completed
INFO - 2026-03-01 05:45:01 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.088453
INFO - 2026-03-01 05:45:01 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-03-01 05:54:41 --> [REQ_ID=374343eee269] [REQUEST][START] GET /index.php/How-It-Works/Setting-Financial-Goals
DEBUG - 2026-03-01 05:54:41 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-01 05:54:41 --> [REQ_ID=374343eee269] [FILTER_BEFORE] /index.php/How-It-Works/Setting-Financial-Goals
DEBUG - 2026-03-01 05:54:41 --> [REQ_ID=374343eee269] [ROUTE] Controller=\App\Modules\Blog\Controllers\HowItWorksController Method=show
DEBUG - 2026-03-01 05:54:41 --> [REQ_ID=374343eee269] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/How-It-Works/Setting-Financial-Goals
DEBUG - 2026-03-01 05:54:41 --> [CSRF] token name=csrf_test_name hash=589e61f3e15ea3fff32fdf25426c0207
DEBUG - 2026-03-01 05:54:41 --> [REQ_ID=6a33ade04506] [INIT] App\Modules\Blog\Controllers\HowItWorksController::GET
INFO - 2026-03-01 05:54:41 --> [REQ_ID=6a33ade04506] [MEMORY][controller-start] 6291456
DEBUG - 2026-03-01 05:54:41 --> [REQ_ID=6a33ade04506] [METHOD_ENTRY] show
DEBUG - 2026-03-01 05:54:41 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-01 05:54:41 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-01 05:54:41 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-01 05:54:41 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-01 05:54:41 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-01 05:54:41 --> MyMICoin: guest context detected; skipping user-specific preload.
INFO - 2026-03-01 05:54:41 --> [REQ_ID=6a33ade04506] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-01 05:54:41 --> [REQ_ID=6a33ade04506] [VIEW_RENDER] App\Modules\Blog\Views\HowItWorks\Determining_Your_Financial_Goals
INFO - 2026-03-01 05:54:41 --> [REQ_ID=6a33ade04506] [MEMORY][commonData:start] 10485760
INFO - 2026-03-01 05:54:42 --> themesMemory usage: 14680064
DEBUG - 2026-03-01 05:54:42 --> [REQ_ID=374343eee269] [FILTER_AFTER]
DEBUG - 2026-03-01 05:54:42 --> [REQ_ID=374343eee269] [LIFECYCLE][END] status=200 duration_ms=1,185.03 memory_delta=8388608
INFO - 2026-03-01 05:54:42 --> [REQ_ID=6a33ade04506] [PERF] Execution time=1.182613
DEBUG - 2026-03-01 05:54:42 --> [REQ_ID=374343eee269] [REQUEST][END]
INFO - 2026-03-01 05:54:42 --> [REQ_ID=374343eee269] [PERF] Execution time=1.226940
DEBUG - 2026-03-01 06:00:02 --> [REQ_ID=94eaef131367] [REQUEST][START] GET /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-01 06:00:02 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
INFO - 2026-03-01 06:00:02 --> [SPARK_START] App\Commands\AIOps\Run
INFO - 2026-03-01 06:00:02 --> [SPARK_MEMORY] 16777216
INFO - 2026-03-01 06:00:02 --> [spark:aiops:run] Intent
INFO - 2026-03-01 06:00:02 --> [spark:ops:work] Started
INFO - 2026-03-01 06:00:02 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-03-01 06:00:02 --> [SPARK_MEMORY] 16777216
INFO - 2026-03-01 06:00:02 --> [spark:ops:work] Intent
DEBUG - 2026-03-01 06:00:02 --> [REQ_ID=94eaef131367] [FILTER_BEFORE] /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-01 06:00:02 --> [REQ_ID=94eaef131367] [ROUTE] Controller=\App\Modules\Management\Controllers\ManagementAPIController Method=Run_CRON_Tasks
DEBUG - 2026-03-01 06:00:02 --> [REQ_ID=94eaef131367] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-01 06:00:02 --> [REQ_ID=94eaef131367] [REQUEST][END]
INFO - 2026-03-01 06:00:02 --> [REQ_ID=94eaef131367] [PERF] Execution time=0.106338
INFO - 2026-03-01 06:00:02 --> [spark:ops:work] Completed
INFO - 2026-03-01 06:00:02 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.102811
INFO - 2026-03-01 06:00:02 --> [SPARK_MEMORY] 18874368
INFO - 2026-03-01 06:00:04 --> [AIOPS][SPARK][GOVERNANCE][spark:logs:summarize] Started
INFO - 2026-03-01 06:00:04 --> [SPARK_START] App\Commands\Logs\Summarize
INFO - 2026-03-01 06:00:04 --> [SPARK_MEMORY] 16777216
INFO - 2026-03-01 06:00:04 --> [spark:logs:summarize] Intent
INFO - 2026-03-01 06:00:04 --> [AIOPS][SPARK][GOVERNANCE][spark:logs:summarize] Completed
INFO - 2026-03-01 06:00:04 --> [SPARK_COMPLETE] App\Commands\Logs\Summarize duration=0.009005
INFO - 2026-03-01 06:00:04 --> [SPARK_MEMORY] 16777216
INFO - 2026-03-01 06:00:04 --> [spark:app:healthcheck] Started
INFO - 2026-03-01 06:00:04 --> [SPARK_START] App\Commands\App\Healthcheck
INFO - 2026-03-01 06:00:04 --> [SPARK_MEMORY] 16777216
INFO - 2026-03-01 06:00:04 --> [spark:app:healthcheck] Intent
DEBUG - 2026-03-01 06:00:04 --> LOG_HEALTHCHECK debug marker=971c29773133
INFO - 2026-03-01 06:00:04 --> LOG_HEALTHCHECK info marker=971c29773133
NOTICE - 2026-03-01 06:00:04 --> LOG_HEALTHCHECK probe marker=971c29773133
INFO - 2026-03-01 06:00:04 --> [spark:app:healthcheck] Completed
INFO - 2026-03-01 06:00:04 --> [SPARK_COMPLETE] App\Commands\App\Healthcheck duration=0.021568
INFO - 2026-03-01 06:00:04 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-03-01 06:00:05 --> OllamaPatchRunner:L142 - validateGeneratedPatch Content: 
WARNING - 2026-03-01 06:00:05 --> OllamaPatchRunner:L49 - Original Diff: 
DEBUG - 2026-03-01 06:00:06 --> OllamaPatchRunner:L51 - Retried Diff: 
DEBUG - 2026-03-01 06:00:06 --> OllamaPatchRunner:L142 - validateGeneratedPatch Content: 
DEBUG - 2026-03-01 06:00:06 --> OllamaPatchRunner:L53 - Validating Generated Patch Failed
INFO - 2026-03-01 06:00:06 --> [SPARK_COMPLETE] App\Commands\AIOps\Run duration=3.752334
INFO - 2026-03-01 06:00:06 --> [SPARK_MEMORY] 18874368
INFO - 2026-03-01 06:15:01 --> [spark:ops:work] Started
INFO - 2026-03-01 06:15:01 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-03-01 06:15:01 --> [SPARK_MEMORY] 16777216
INFO - 2026-03-01 06:15:01 --> [spark:ops:work] Intent
INFO - 2026-03-01 06:15:02 --> [spark:ops:work] Completed
INFO - 2026-03-01 06:15:02 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.191035
INFO - 2026-03-01 06:15:02 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-03-01 06:15:02 --> [REQ_ID=519350644a9e] [REQUEST][START] GET /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-01 06:15:02 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-01 06:15:02 --> [REQ_ID=519350644a9e] [FILTER_BEFORE] /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-01 06:15:02 --> [REQ_ID=519350644a9e] [ROUTE] Controller=\App\Modules\APIs\Controllers\AlertsAPIController Method=fetchEmailAlerts
DEBUG - 2026-03-01 06:15:02 --> [REQ_ID=519350644a9e] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-01 06:15:02 --> [REQ_ID=519350644a9e] [REQUEST][END]
INFO - 2026-03-01 06:15:02 --> [REQ_ID=519350644a9e] [PERF] Execution time=0.051917
INFO - 2026-03-01 06:30:01 --> [spark:ops:work] Started
INFO - 2026-03-01 06:30:01 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-03-01 06:30:01 --> [SPARK_MEMORY] 16777216
INFO - 2026-03-01 06:30:01 --> [spark:ops:work] Intent
INFO - 2026-03-01 06:30:01 --> [spark:ops:work] Completed
INFO - 2026-03-01 06:30:01 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.086626
INFO - 2026-03-01 06:30:01 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-03-01 06:31:34 --> [REQ_ID=59ea458e7116] [REQUEST][START] GET /
DEBUG - 2026-03-01 06:31:34 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-01 06:31:34 --> [REQ_ID=59ea458e7116] [FILTER_BEFORE] /
DEBUG - 2026-03-01 06:31:34 --> [REQ_ID=59ea458e7116] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-01 06:31:34 --> [REQ_ID=59ea458e7116] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-01 06:31:34 --> [CSRF] token name=csrf_test_name hash=1270b6b72505341e407892348347a2d8
DEBUG - 2026-03-01 06:31:34 --> [REQ_ID=be396866f85b] [INIT] App\Controllers\Home::GET
INFO - 2026-03-01 06:31:34 --> [REQ_ID=be396866f85b] [MEMORY][controller-start] 6291456
INFO - 2026-03-01 06:31:34 --> [REQ_ID=be396866f85b] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-01 06:31:34 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-01 06:31:34 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-03-01 06:31:34 --> [REQ_ID=be396866f85b] [VIEW_RENDER] themes/public/home
INFO - 2026-03-01 06:31:34 --> [REQ_ID=be396866f85b] [MEMORY][commonData:start] 10485760
INFO - 2026-03-01 06:31:34 --> themesMemory usage: 10485760
DEBUG - 2026-03-01 06:31:34 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-01 06:31:34 --> [REQ_ID=59ea458e7116] [FILTER_AFTER]
DEBUG - 2026-03-01 06:31:34 --> [REQ_ID=59ea458e7116] [LIFECYCLE][END] status=200 duration_ms=711.23 memory_delta=4194304
INFO - 2026-03-01 06:31:34 --> [REQ_ID=be396866f85b] [PERF] Execution time=0.709175
DEBUG - 2026-03-01 06:31:34 --> [REQ_ID=59ea458e7116] [REQUEST][END]
INFO - 2026-03-01 06:31:34 --> [REQ_ID=59ea458e7116] [PERF] Execution time=0.749394
DEBUG - 2026-03-01 06:38:11 --> [REQ_ID=43c000017328] [REQUEST][START] GET /
DEBUG - 2026-03-01 06:38:11 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-01 06:38:11 --> [REQ_ID=43c000017328] [FILTER_BEFORE] /
DEBUG - 2026-03-01 06:38:11 --> [REQ_ID=43c000017328] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-01 06:38:11 --> [REQ_ID=43c000017328] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-01 06:38:11 --> [CSRF] token name=csrf_test_name hash=1d424ca800990a0ad0ea6ed8755d68f0
DEBUG - 2026-03-01 06:38:11 --> [REQ_ID=ec6f1d6af6ac] [INIT] App\Controllers\Home::GET
INFO - 2026-03-01 06:38:11 --> [REQ_ID=ec6f1d6af6ac] [MEMORY][controller-start] 6291456
INFO - 2026-03-01 06:38:11 --> [REQ_ID=ec6f1d6af6ac] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-01 06:38:11 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-01 06:38:12 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
DEBUG - 2026-03-01 06:38:12 --> [REQ_ID=ec6f1d6af6ac] [VIEW_RENDER] themes/public/home
INFO - 2026-03-01 06:38:12 --> [REQ_ID=ec6f1d6af6ac] [MEMORY][commonData:start] 10485760
INFO - 2026-03-01 06:38:12 --> themesMemory usage: 10485760
DEBUG - 2026-03-01 06:38:12 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-01 06:38:12 --> [REQ_ID=43c000017328] [FILTER_AFTER]
DEBUG - 2026-03-01 06:38:12 --> [REQ_ID=43c000017328] [LIFECYCLE][END] status=200 duration_ms=592.44 memory_delta=4194304
INFO - 2026-03-01 06:38:12 --> [REQ_ID=ec6f1d6af6ac] [PERF] Execution time=0.590828
DEBUG - 2026-03-01 06:38:12 --> [REQ_ID=43c000017328] [REQUEST][END]
INFO - 2026-03-01 06:38:12 --> [REQ_ID=43c000017328] [PERF] Execution time=0.636345
INFO - 2026-03-01 06:45:01 --> [spark:ops:work] Started
INFO - 2026-03-01 06:45:01 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-03-01 06:45:01 --> [SPARK_MEMORY] 16777216
INFO - 2026-03-01 06:45:01 --> [spark:ops:work] Intent
INFO - 2026-03-01 06:45:02 --> [spark:ops:work] Completed
INFO - 2026-03-01 06:45:02 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.300155
INFO - 2026-03-01 06:45:02 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-03-01 06:58:40 --> [REQ_ID=dd7fb805cec0] [REQUEST][START] GET /
DEBUG - 2026-03-01 06:58:40 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-01 06:58:40 --> [REQ_ID=dd7fb805cec0] [FILTER_BEFORE] /
DEBUG - 2026-03-01 06:58:40 --> [REQ_ID=dd7fb805cec0] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-01 06:58:40 --> [REQ_ID=dd7fb805cec0] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-01 06:58:40 --> [CSRF] token name=csrf_test_name hash=19ff9c5e6ded088cd9bbeca709ac8d42
DEBUG - 2026-03-01 06:58:40 --> [REQ_ID=d6edd4aaee2b] [INIT] App\Controllers\Home::GET
INFO - 2026-03-01 06:58:40 --> [REQ_ID=d6edd4aaee2b] [MEMORY][controller-start] 6291456
INFO - 2026-03-01 06:58:40 --> [REQ_ID=d6edd4aaee2b] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-01 06:58:40 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-01 06:58:41 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-03-01 06:58:41 --> [REQ_ID=d6edd4aaee2b] [VIEW_RENDER] themes/public/home
INFO - 2026-03-01 06:58:41 --> [REQ_ID=d6edd4aaee2b] [MEMORY][commonData:start] 10485760
INFO - 2026-03-01 06:58:41 --> themesMemory usage: 10485760
DEBUG - 2026-03-01 06:58:41 --> [MetaService] slug= pageName=Home cacheHit= path=DB
DEBUG - 2026-03-01 06:58:41 --> [REQ_ID=dd7fb805cec0] [FILTER_AFTER]
DEBUG - 2026-03-01 06:58:41 --> [REQ_ID=dd7fb805cec0] [LIFECYCLE][END] status=200 duration_ms=603.13 memory_delta=4194304
INFO - 2026-03-01 06:58:41 --> [REQ_ID=d6edd4aaee2b] [PERF] Execution time=0.601398
DEBUG - 2026-03-01 06:58:41 --> [REQ_ID=dd7fb805cec0] [REQUEST][END]
INFO - 2026-03-01 06:58:41 --> [REQ_ID=dd7fb805cec0] [PERF] Execution time=0.642473
INFO - 2026-03-01 07:00:01 --> [spark:ops:work] Started
INFO - 2026-03-01 07:00:01 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-03-01 07:00:01 --> [SPARK_MEMORY] 16777216
INFO - 2026-03-01 07:00:01 --> [spark:ops:work] Intent
INFO - 2026-03-01 07:00:01 --> [spark:ops:work] Completed
INFO - 2026-03-01 07:00:01 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.037815
INFO - 2026-03-01 07:00:01 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-03-01 07:00:01 --> [REQ_ID=c47f8525570d] [REQUEST][START] GET /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-01 07:00:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-01 07:00:01 --> [REQ_ID=c47f8525570d] [FILTER_BEFORE] /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-01 07:00:01 --> [REQ_ID=c47f8525570d] [ROUTE] Controller=\App\Modules\Management\Controllers\ManagementAPIController Method=Run_CRON_Tasks
DEBUG - 2026-03-01 07:00:01 --> [REQ_ID=c47f8525570d] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-01 07:00:01 --> [REQ_ID=c47f8525570d] [REQUEST][END]
INFO - 2026-03-01 07:00:01 --> [REQ_ID=c47f8525570d] [PERF] Execution time=0.045756
INFO - 2026-03-01 07:15:01 --> [spark:ops:work] Started
INFO - 2026-03-01 07:15:01 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-03-01 07:15:01 --> [SPARK_MEMORY] 16777216
INFO - 2026-03-01 07:15:01 --> [spark:ops:work] Intent
DEBUG - 2026-03-01 07:15:01 --> [REQ_ID=6c2cb0808632] [REQUEST][START] GET /index.php/API/Alerts/fetchEmailAlerts
INFO - 2026-03-01 07:15:01 --> [spark:ops:work] Completed
INFO - 2026-03-01 07:15:01 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.094212
INFO - 2026-03-01 07:15:01 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-03-01 07:15:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-01 07:15:01 --> [REQ_ID=6c2cb0808632] [FILTER_BEFORE] /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-01 07:15:01 --> [REQ_ID=6c2cb0808632] [ROUTE] Controller=\App\Modules\APIs\Controllers\AlertsAPIController Method=fetchEmailAlerts
DEBUG - 2026-03-01 07:15:01 --> [REQ_ID=6c2cb0808632] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-01 07:15:01 --> [REQ_ID=6c2cb0808632] [REQUEST][END]
INFO - 2026-03-01 07:15:01 --> [REQ_ID=6c2cb0808632] [PERF] Execution time=0.064038
INFO - 2026-03-01 07:30:02 --> [spark:ops:work] Started
INFO - 2026-03-01 07:30:02 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-03-01 07:30:02 --> [SPARK_MEMORY] 16777216
INFO - 2026-03-01 07:30:02 --> [spark:ops:work] Intent
INFO - 2026-03-01 07:30:02 --> [spark:ops:work] Completed
INFO - 2026-03-01 07:30:02 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.081921
INFO - 2026-03-01 07:30:02 --> [SPARK_MEMORY] 18874368
INFO - 2026-03-01 07:45:01 --> [spark:ops:work] Started
INFO - 2026-03-01 07:45:01 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-03-01 07:45:01 --> [SPARK_MEMORY] 16777216
INFO - 2026-03-01 07:45:01 --> [spark:ops:work] Intent
INFO - 2026-03-01 07:45:01 --> [spark:ops:work] Completed
INFO - 2026-03-01 07:45:01 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.042949
INFO - 2026-03-01 07:45:01 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-03-01 07:45:05 --> [REQ_ID=aa403711c364] [REQUEST][START] GET /index.php/Memberships/Customize
DEBUG - 2026-03-01 07:45:05 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-01 07:45:05 --> [REQ_ID=aa403711c364] [FILTER_BEFORE] /index.php/Memberships/Customize
DEBUG - 2026-03-01 07:45:05 --> [REQ_ID=aa403711c364] [ROUTE] Controller=\App\Controllers\Home Method=memberships
DEBUG - 2026-03-01 07:45:05 --> [REQ_ID=aa403711c364] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Memberships/Customize
DEBUG - 2026-03-01 07:45:05 --> [CSRF] token name=csrf_test_name hash=192dd788382ab2763aff58ef508f4b7d
DEBUG - 2026-03-01 07:45:05 --> [REQ_ID=af458b5cd0ad] [INIT] App\Controllers\Home::GET
INFO - 2026-03-01 07:45:05 --> [REQ_ID=af458b5cd0ad] [MEMORY][controller-start] 6291456
INFO - 2026-03-01 07:45:05 --> [REQ_ID=af458b5cd0ad] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-01 07:45:05 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-01 07:45:06 --> [MetaService] slug=memberships/customize pageName= cacheHit= path=DB
DEBUG - 2026-03-01 07:45:06 --> [REQ_ID=af458b5cd0ad] [VIEW_RENDER] themes/public/memberships
INFO - 2026-03-01 07:45:06 --> [REQ_ID=af458b5cd0ad] [MEMORY][commonData:start] 10485760
INFO - 2026-03-01 07:45:06 --> themesMemory usage: 10485760
DEBUG - 2026-03-01 07:45:06 --> [MetaService] slug=memberships/customize pageName=Memberships cacheHit= path=DB
DEBUG - 2026-03-01 07:45:06 --> [REQ_ID=aa403711c364] [FILTER_AFTER]
DEBUG - 2026-03-01 07:45:06 --> [REQ_ID=aa403711c364] [LIFECYCLE][END] status=200 duration_ms=601.08 memory_delta=4194304
INFO - 2026-03-01 07:45:06 --> [REQ_ID=af458b5cd0ad] [PERF] Execution time=0.598620
DEBUG - 2026-03-01 07:45:06 --> [REQ_ID=aa403711c364] [REQUEST][END]
INFO - 2026-03-01 07:45:06 --> [REQ_ID=aa403711c364] [PERF] Execution time=0.639623
DEBUG - 2026-03-01 07:46:25 --> [REQ_ID=3389a4dea1ce] [REQUEST][START] GET /index.php/How-To-Guides
DEBUG - 2026-03-01 07:46:25 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-01 07:46:25 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: GET, Route: How-To-Guides]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-01 07:46:25 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-01 07:46:25 --> [404] URI=https://www.mymiwallet.com/index.php/How-To-Guides
WARNING - 2026-03-01 07:46:25 --> 404 route miss: https://www.mymiwallet.com/index.php/How-To-Guides | referrer: https://www.mymiwallet.com/index.php/How-It-Works/MyMI-Gold
ERROR - 2026-03-01 07:46:25 --> [ERROR_PAGE] event=error_404 status=404 message=Page not found.
INFO - 2026-03-01 08:00:01 --> [SPARK_START] App\Commands\AIOps\Run
INFO - 2026-03-01 08:00:01 --> [SPARK_MEMORY] 16777216
INFO - 2026-03-01 08:00:01 --> [spark:aiops:run] Intent
DEBUG - 2026-03-01 08:00:01 --> [REQ_ID=67ce7411d41a] [REQUEST][START] GET /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-01 08:00:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
INFO - 2026-03-01 08:00:01 --> [spark:ops:work] Started
INFO - 2026-03-01 08:00:01 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-03-01 08:00:01 --> [SPARK_MEMORY] 16777216
INFO - 2026-03-01 08:00:01 --> [spark:ops:work] Intent
DEBUG - 2026-03-01 08:00:01 --> [REQ_ID=67ce7411d41a] [FILTER_BEFORE] /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-01 08:00:01 --> [REQ_ID=67ce7411d41a] [ROUTE] Controller=\App\Modules\Management\Controllers\ManagementAPIController Method=Run_CRON_Tasks
DEBUG - 2026-03-01 08:00:01 --> [REQ_ID=67ce7411d41a] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-01 08:00:01 --> [REQ_ID=67ce7411d41a] [REQUEST][END]
INFO - 2026-03-01 08:00:01 --> [REQ_ID=67ce7411d41a] [PERF] Execution time=0.107258
INFO - 2026-03-01 08:00:02 --> [spark:ops:work] Completed
INFO - 2026-03-01 08:00:02 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.206885
INFO - 2026-03-01 08:00:02 --> [SPARK_MEMORY] 18874368
INFO - 2026-03-01 08:00:03 --> [AIOPS][SPARK][GOVERNANCE][spark:logs:summarize] Started
INFO - 2026-03-01 08:00:03 --> [SPARK_START] App\Commands\Logs\Summarize
INFO - 2026-03-01 08:00:03 --> [SPARK_MEMORY] 16777216
INFO - 2026-03-01 08:00:03 --> [spark:logs:summarize] Intent
INFO - 2026-03-01 08:00:03 --> [AIOPS][SPARK][GOVERNANCE][spark:logs:summarize] Completed
INFO - 2026-03-01 08:00:03 --> [SPARK_COMPLETE] App\Commands\Logs\Summarize duration=0.009680
INFO - 2026-03-01 08:00:03 --> [SPARK_MEMORY] 16777216
INFO - 2026-03-01 08:00:04 --> [spark:app:healthcheck] Started
INFO - 2026-03-01 08:00:04 --> [SPARK_START] App\Commands\App\Healthcheck
INFO - 2026-03-01 08:00:04 --> [SPARK_MEMORY] 16777216
INFO - 2026-03-01 08:00:04 --> [spark:app:healthcheck] Intent
DEBUG - 2026-03-01 08:00:04 --> LOG_HEALTHCHECK debug marker=3ed770ba5342
INFO - 2026-03-01 08:00:04 --> LOG_HEALTHCHECK info marker=3ed770ba5342
NOTICE - 2026-03-01 08:00:04 --> LOG_HEALTHCHECK probe marker=3ed770ba5342
INFO - 2026-03-01 08:00:04 --> [spark:app:healthcheck] Completed
INFO - 2026-03-01 08:00:04 --> [SPARK_COMPLETE] App\Commands\App\Healthcheck duration=0.031696
INFO - 2026-03-01 08:00:04 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-03-01 08:00:05 --> OllamaPatchRunner:L142 - validateGeneratedPatch Content: 
WARNING - 2026-03-01 08:00:05 --> OllamaPatchRunner:L49 - Original Diff: 
DEBUG - 2026-03-01 08:00:05 --> OllamaPatchRunner:L51 - Retried Diff: 
DEBUG - 2026-03-01 08:00:05 --> OllamaPatchRunner:L142 - validateGeneratedPatch Content: 
DEBUG - 2026-03-01 08:00:05 --> OllamaPatchRunner:L53 - Validating Generated Patch Failed
INFO - 2026-03-01 08:00:05 --> [SPARK_COMPLETE] App\Commands\AIOps\Run duration=4.110495
INFO - 2026-03-01 08:00:05 --> [SPARK_MEMORY] 18874368
INFO - 2026-03-01 08:15:01 --> [spark:ops:work] Started
INFO - 2026-03-01 08:15:01 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-03-01 08:15:01 --> [SPARK_MEMORY] 16777216
INFO - 2026-03-01 08:15:01 --> [spark:ops:work] Intent
INFO - 2026-03-01 08:15:01 --> [spark:ops:work] Completed
INFO - 2026-03-01 08:15:01 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.040445
INFO - 2026-03-01 08:15:01 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-03-01 08:15:01 --> [REQ_ID=0d6206048518] [REQUEST][START] GET /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-01 08:15:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-01 08:15:01 --> [REQ_ID=0d6206048518] [FILTER_BEFORE] /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-01 08:15:01 --> [REQ_ID=0d6206048518] [ROUTE] Controller=\App\Modules\APIs\Controllers\AlertsAPIController Method=fetchEmailAlerts
DEBUG - 2026-03-01 08:15:01 --> [REQ_ID=0d6206048518] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-01 08:15:02 --> [REQ_ID=0d6206048518] [REQUEST][END]
INFO - 2026-03-01 08:15:02 --> [REQ_ID=0d6206048518] [PERF] Execution time=0.058870
DEBUG - 2026-03-01 08:19:38 --> [REQ_ID=c5acf4a7774b] [REQUEST][START] GET /index.php/activate
DEBUG - 2026-03-01 08:19:38 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-01 08:19:38 --> [REQ_ID=c5acf4a7774b] [FILTER_BEFORE] /index.php/activate
DEBUG - 2026-03-01 08:19:38 --> [REQ_ID=c5acf4a7774b] [ROUTE] Controller=\App\Controllers\AuthController Method=activateAccount
DEBUG - 2026-03-01 08:19:38 --> [REQ_ID=c5acf4a7774b] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/activate
DEBUG - 2026-03-01 08:19:38 --> [CSRF] token name=csrf_test_name hash=c290de4f8bbb16be75ce3ae555307516
DEBUG - 2026-03-01 08:19:38 --> [REQ_ID=bcddc19cf136] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-01 08:19:38 --> [REQ_ID=bcddc19cf136] [MEMORY][controller-start] 6291456
INFO - 2026-03-01 08:19:38 --> [ACTIVATION] Activation link hit
WARNING - 2026-03-01 08:19:39 --> [ACTIVATION] Activation failed: missing token
DEBUG - 2026-03-01 08:19:39 --> [REQ_ID=c5acf4a7774b] [FILTER_AFTER]
DEBUG - 2026-03-01 08:19:39 --> [REQ_ID=c5acf4a7774b] [LIFECYCLE][END] status=302 duration_ms=122.42 memory_delta=0
INFO - 2026-03-01 08:19:39 --> [REQ_ID=bcddc19cf136] [PERF] Execution time=0.119982
DEBUG - 2026-03-01 08:19:39 --> [REQ_ID=c5acf4a7774b] [REQUEST][END]
INFO - 2026-03-01 08:19:39 --> [REQ_ID=c5acf4a7774b] [PERF] Execution time=0.164634
DEBUG - 2026-03-01 08:19:39 --> [REQ_ID=411735488f9d] [REQUEST][START] GET /index.php/Support/Account
DEBUG - 2026-03-01 08:19:39 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-01 08:19:39 --> [REQ_ID=411735488f9d] [FILTER_BEFORE] /index.php/Support/Account
DEBUG - 2026-03-01 08:19:39 --> [REQ_ID=411735488f9d] [ROUTE] Controller=\App\Modules\Support\Controllers\AccountSupportController Method=index
DEBUG - 2026-03-01 08:19:39 --> [REQ_ID=411735488f9d] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Support/Account
DEBUG - 2026-03-01 08:19:39 --> [CSRF] token name=csrf_test_name hash=125682ae0462f62a1bb1392e03d6dfc8
DEBUG - 2026-03-01 08:19:39 --> [REQ_ID=10b77ef98094] [INIT] App\Modules\Support\Controllers\AccountSupportController::GET
INFO - 2026-03-01 08:19:39 --> [REQ_ID=10b77ef98094] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-01 08:19:39 --> [REQ_ID=10b77ef98094] [METHOD_ENTRY] index
DEBUG - 2026-03-01 08:19:39 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-01 08:19:39 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-01 08:19:39 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-01 08:19:39 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-01 08:19:39 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-01 08:19:39 --> MyMICoin: guest context detected; skipping user-specific preload.
INFO - 2026-03-01 08:19:39 --> [REQ_ID=10b77ef98094] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-01 08:19:39 --> [REQ_ID=10b77ef98094] [VIEW_RENDER] SupportModule/Support/account_help
INFO - 2026-03-01 08:19:39 --> [REQ_ID=10b77ef98094] [MEMORY][commonData:start] 6291456
INFO - 2026-03-01 08:19:39 --> themesMemory usage: 6291456
DEBUG - 2026-03-01 08:19:39 --> [REQ_ID=411735488f9d] [FILTER_AFTER]
DEBUG - 2026-03-01 08:19:39 --> [REQ_ID=411735488f9d] [LIFECYCLE][END] status=200 duration_ms=79.70 memory_delta=2097152
INFO - 2026-03-01 08:19:39 --> [REQ_ID=10b77ef98094] [PERF] Execution time=0.078143
DEBUG - 2026-03-01 08:19:39 --> [REQ_ID=411735488f9d] [REQUEST][END]
INFO - 2026-03-01 08:19:39 --> [REQ_ID=411735488f9d] [PERF] Execution time=0.091834
INFO - 2026-03-01 08:30:01 --> [spark:ops:work] Started
INFO - 2026-03-01 08:30:01 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-03-01 08:30:01 --> [SPARK_MEMORY] 16777216
INFO - 2026-03-01 08:30:01 --> [spark:ops:work] Intent
INFO - 2026-03-01 08:30:01 --> [spark:ops:work] Completed
INFO - 2026-03-01 08:30:01 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.031275
INFO - 2026-03-01 08:30:01 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-03-01 08:37:39 --> [REQ_ID=a6edbfae156a] [REQUEST][START] GET /
DEBUG - 2026-03-01 08:37:39 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-01 08:37:39 --> [REQ_ID=a6edbfae156a] [FILTER_BEFORE] /
DEBUG - 2026-03-01 08:37:39 --> [REQ_ID=a6edbfae156a] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-01 08:37:39 --> [REQ_ID=a6edbfae156a] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-01 08:37:39 --> [CSRF] token name=csrf_test_name hash=0a08e3bb5c215d94200fe40cd4d4bcf3
DEBUG - 2026-03-01 08:37:39 --> [REQ_ID=757b1bbb229e] [INIT] App\Controllers\Home::GET
INFO - 2026-03-01 08:37:39 --> [REQ_ID=757b1bbb229e] [MEMORY][controller-start] 6291456
INFO - 2026-03-01 08:37:39 --> [REQ_ID=757b1bbb229e] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-01 08:37:39 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-01 08:37:39 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-03-01 08:37:39 --> [REQ_ID=757b1bbb229e] [VIEW_RENDER] themes/public/home
INFO - 2026-03-01 08:37:39 --> [REQ_ID=757b1bbb229e] [MEMORY][commonData:start] 10485760
INFO - 2026-03-01 08:37:39 --> themesMemory usage: 10485760
DEBUG - 2026-03-01 08:37:39 --> [MetaService] slug= pageName=Home cacheHit= path=DB
DEBUG - 2026-03-01 08:37:39 --> [REQ_ID=a6edbfae156a] [FILTER_AFTER]
DEBUG - 2026-03-01 08:37:39 --> [REQ_ID=a6edbfae156a] [LIFECYCLE][END] status=200 duration_ms=605.65 memory_delta=4194304
INFO - 2026-03-01 08:37:39 --> [REQ_ID=757b1bbb229e] [PERF] Execution time=0.603832
DEBUG - 2026-03-01 08:37:39 --> [REQ_ID=a6edbfae156a] [REQUEST][END]
INFO - 2026-03-01 08:37:39 --> [REQ_ID=a6edbfae156a] [PERF] Execution time=0.644325
INFO - 2026-03-01 08:45:01 --> [spark:ops:work] Started
INFO - 2026-03-01 08:45:01 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-03-01 08:45:01 --> [SPARK_MEMORY] 16777216
INFO - 2026-03-01 08:45:01 --> [spark:ops:work] Intent
INFO - 2026-03-01 08:45:01 --> [spark:ops:work] Completed
INFO - 2026-03-01 08:45:01 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.035435
INFO - 2026-03-01 08:45:01 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-03-01 08:59:28 --> [REQ_ID=1bcb00776915] [REQUEST][START] GET /index.php/Premium-Features/Due-Diligence-Database
DEBUG - 2026-03-01 08:59:28 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-01 08:59:28 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: GET, Route: Premium-Features/Due-Diligence-Database]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-01 08:59:28 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-01 08:59:28 --> [404] URI=https://www.mymiwallet.com/index.php/Premium-Features/Due-Diligence-Database
WARNING - 2026-03-01 08:59:28 --> 404 route miss: https://www.mymiwallet.com/index.php/Premium-Features/Due-Diligence-Database | referrer: https://www.mymiwallet.com/index.php/How-It-Works/MyMI-Gold
ERROR - 2026-03-01 08:59:28 --> [ERROR_PAGE] event=error_404 status=404 message=Page not found.
DEBUG - 2026-03-01 09:00:01 --> [REQ_ID=a52de1f779ea] [REQUEST][START] GET /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-01 09:00:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-01 09:00:01 --> [REQ_ID=a52de1f779ea] [FILTER_BEFORE] /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-01 09:00:01 --> [REQ_ID=a52de1f779ea] [ROUTE] Controller=\App\Modules\Management\Controllers\ManagementAPIController Method=Run_CRON_Tasks
DEBUG - 2026-03-01 09:00:01 --> [REQ_ID=a52de1f779ea] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-01 09:00:01 --> [REQ_ID=a52de1f779ea] [REQUEST][END]
INFO - 2026-03-01 09:00:01 --> [REQ_ID=a52de1f779ea] [PERF] Execution time=0.044980
INFO - 2026-03-01 09:00:01 --> [spark:ops:work] Started
INFO - 2026-03-01 09:00:01 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-03-01 09:00:01 --> [SPARK_MEMORY] 16777216
INFO - 2026-03-01 09:00:01 --> [spark:ops:work] Intent
INFO - 2026-03-01 09:00:01 --> [spark:ops:work] Completed
INFO - 2026-03-01 09:00:01 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.041576
INFO - 2026-03-01 09:00:01 --> [SPARK_MEMORY] 18874368
INFO - 2026-03-01 09:15:01 --> [spark:ops:work] Started
INFO - 2026-03-01 09:15:01 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-03-01 09:15:01 --> [SPARK_MEMORY] 16777216
INFO - 2026-03-01 09:15:01 --> [spark:ops:work] Intent
INFO - 2026-03-01 09:15:02 --> [spark:ops:work] Completed
INFO - 2026-03-01 09:15:02 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.101743
INFO - 2026-03-01 09:15:02 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-03-01 09:15:02 --> [REQ_ID=bbb7d383c293] [REQUEST][START] GET /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-01 09:15:02 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-01 09:15:02 --> [REQ_ID=bbb7d383c293] [FILTER_BEFORE] /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-01 09:15:02 --> [REQ_ID=bbb7d383c293] [ROUTE] Controller=\App\Modules\APIs\Controllers\AlertsAPIController Method=fetchEmailAlerts
DEBUG - 2026-03-01 09:15:02 --> [REQ_ID=bbb7d383c293] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-01 09:15:02 --> [REQ_ID=bbb7d383c293] [REQUEST][END]
INFO - 2026-03-01 09:15:02 --> [REQ_ID=bbb7d383c293] [PERF] Execution time=0.071867
INFO - 2026-03-01 09:30:01 --> [spark:ops:work] Started
INFO - 2026-03-01 09:30:01 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-03-01 09:30:01 --> [SPARK_MEMORY] 16777216
INFO - 2026-03-01 09:30:01 --> [spark:ops:work] Intent
INFO - 2026-03-01 09:30:01 --> [spark:ops:work] Completed
INFO - 2026-03-01 09:30:01 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.094156
INFO - 2026-03-01 09:30:01 --> [SPARK_MEMORY] 18874368
INFO - 2026-03-01 09:45:01 --> [spark:ops:work] Started
INFO - 2026-03-01 09:45:01 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-03-01 09:45:01 --> [SPARK_MEMORY] 16777216
INFO - 2026-03-01 09:45:01 --> [spark:ops:work] Intent
INFO - 2026-03-01 09:45:01 --> [spark:ops:work] Completed
INFO - 2026-03-01 09:45:01 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.035170
INFO - 2026-03-01 09:45:01 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-03-01 10:00:02 --> [REQ_ID=13af9c980bb7] [REQUEST][START] GET /index.php/API/Management/Run-CRON-Tasks
INFO - 2026-03-01 10:00:02 --> [spark:ops:work] Started
INFO - 2026-03-01 10:00:02 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-03-01 10:00:02 --> [SPARK_MEMORY] 16777216
INFO - 2026-03-01 10:00:02 --> [spark:ops:work] Intent
DEBUG - 2026-03-01 10:00:02 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
INFO - 2026-03-01 10:00:02 --> [spark:ops:work] Completed
INFO - 2026-03-01 10:00:02 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.042001
INFO - 2026-03-01 10:00:02 --> [SPARK_MEMORY] 18874368
INFO - 2026-03-01 10:00:02 --> [SPARK_START] App\Commands\AIOps\Run
INFO - 2026-03-01 10:00:02 --> [SPARK_MEMORY] 16777216
INFO - 2026-03-01 10:00:02 --> [spark:aiops:run] Intent
DEBUG - 2026-03-01 10:00:02 --> [REQ_ID=13af9c980bb7] [FILTER_BEFORE] /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-01 10:00:02 --> [REQ_ID=13af9c980bb7] [ROUTE] Controller=\App\Modules\Management\Controllers\ManagementAPIController Method=Run_CRON_Tasks
DEBUG - 2026-03-01 10:00:02 --> [REQ_ID=13af9c980bb7] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-01 10:00:02 --> [REQ_ID=13af9c980bb7] [REQUEST][END]
INFO - 2026-03-01 10:00:02 --> [REQ_ID=13af9c980bb7] [PERF] Execution time=0.108481
INFO - 2026-03-01 10:00:03 --> [AIOPS][SPARK][GOVERNANCE][spark:logs:summarize] Started
INFO - 2026-03-01 10:00:03 --> [SPARK_START] App\Commands\Logs\Summarize
INFO - 2026-03-01 10:00:03 --> [SPARK_MEMORY] 16777216
INFO - 2026-03-01 10:00:03 --> [spark:logs:summarize] Intent
INFO - 2026-03-01 10:00:03 --> [AIOPS][SPARK][GOVERNANCE][spark:logs:summarize] Completed
INFO - 2026-03-01 10:00:03 --> [SPARK_COMPLETE] App\Commands\Logs\Summarize duration=0.010669
INFO - 2026-03-01 10:00:03 --> [SPARK_MEMORY] 18874368
INFO - 2026-03-01 10:00:04 --> [spark:app:healthcheck] Started
INFO - 2026-03-01 10:00:04 --> [SPARK_START] App\Commands\App\Healthcheck
INFO - 2026-03-01 10:00:04 --> [SPARK_MEMORY] 16777216
INFO - 2026-03-01 10:00:04 --> [spark:app:healthcheck] Intent
DEBUG - 2026-03-01 10:00:04 --> LOG_HEALTHCHECK debug marker=d76379c37a67
INFO - 2026-03-01 10:00:04 --> LOG_HEALTHCHECK info marker=d76379c37a67
NOTICE - 2026-03-01 10:00:04 --> LOG_HEALTHCHECK probe marker=d76379c37a67
INFO - 2026-03-01 10:00:04 --> [spark:app:healthcheck] Completed
INFO - 2026-03-01 10:00:04 --> [SPARK_COMPLETE] App\Commands\App\Healthcheck duration=0.030876
INFO - 2026-03-01 10:00:04 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-03-01 10:00:05 --> OllamaPatchRunner:L142 - validateGeneratedPatch Content: 
WARNING - 2026-03-01 10:00:05 --> OllamaPatchRunner:L49 - Original Diff: 
DEBUG - 2026-03-01 10:00:06 --> OllamaPatchRunner:L51 - Retried Diff: 
DEBUG - 2026-03-01 10:00:06 --> OllamaPatchRunner:L142 - validateGeneratedPatch Content: 
DEBUG - 2026-03-01 10:00:06 --> OllamaPatchRunner:L53 - Validating Generated Patch Failed
INFO - 2026-03-01 10:00:06 --> [SPARK_COMPLETE] App\Commands\AIOps\Run duration=4.291385
INFO - 2026-03-01 10:00:06 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-03-01 10:04:54 --> [REQ_ID=3012eca31576] [REQUEST][START] GET /
DEBUG - 2026-03-01 10:04:54 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-01 10:04:54 --> [REQ_ID=3012eca31576] [FILTER_BEFORE] /
DEBUG - 2026-03-01 10:04:54 --> [REQ_ID=3012eca31576] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-01 10:04:54 --> [REQ_ID=3012eca31576] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-01 10:04:54 --> [CSRF] token name=csrf_test_name hash=ed045ed995306062bb21aabf94f04ff1
DEBUG - 2026-03-01 10:04:54 --> [REQ_ID=1a58e1ba4b14] [INIT] App\Controllers\Home::GET
INFO - 2026-03-01 10:04:54 --> [REQ_ID=1a58e1ba4b14] [MEMORY][controller-start] 6291456
INFO - 2026-03-01 10:04:54 --> [REQ_ID=1a58e1ba4b14] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-01 10:04:54 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-01 10:04:54 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-03-01 10:04:54 --> [REQ_ID=1a58e1ba4b14] [VIEW_RENDER] themes/public/home
INFO - 2026-03-01 10:04:54 --> [REQ_ID=1a58e1ba4b14] [MEMORY][commonData:start] 10485760
INFO - 2026-03-01 10:04:54 --> themesMemory usage: 10485760
DEBUG - 2026-03-01 10:04:54 --> [MetaService] slug= pageName=Home cacheHit= path=DB
DEBUG - 2026-03-01 10:04:54 --> [REQ_ID=3012eca31576] [FILTER_AFTER]
DEBUG - 2026-03-01 10:04:54 --> [REQ_ID=3012eca31576] [LIFECYCLE][END] status=200 duration_ms=653.08 memory_delta=4194304
INFO - 2026-03-01 10:04:54 --> [REQ_ID=1a58e1ba4b14] [PERF] Execution time=0.650761
DEBUG - 2026-03-01 10:04:54 --> [REQ_ID=3012eca31576] [REQUEST][END]
INFO - 2026-03-01 10:04:54 --> [REQ_ID=3012eca31576] [PERF] Execution time=0.690803
INFO - 2026-03-01 10:15:01 --> [spark:ops:work] Started
INFO - 2026-03-01 10:15:01 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-03-01 10:15:01 --> [SPARK_MEMORY] 16777216
INFO - 2026-03-01 10:15:01 --> [spark:ops:work] Intent
INFO - 2026-03-01 10:15:01 --> [spark:ops:work] Completed
INFO - 2026-03-01 10:15:01 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.050468
INFO - 2026-03-01 10:15:01 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-03-01 10:15:01 --> [REQ_ID=18dd42089e4f] [REQUEST][START] GET /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-01 10:15:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-01 10:15:01 --> [REQ_ID=18dd42089e4f] [FILTER_BEFORE] /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-01 10:15:01 --> [REQ_ID=18dd42089e4f] [ROUTE] Controller=\App\Modules\APIs\Controllers\AlertsAPIController Method=fetchEmailAlerts
DEBUG - 2026-03-01 10:15:01 --> [REQ_ID=18dd42089e4f] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-01 10:15:01 --> [REQ_ID=18dd42089e4f] [REQUEST][END]
INFO - 2026-03-01 10:15:01 --> [REQ_ID=18dd42089e4f] [PERF] Execution time=0.043530
DEBUG - 2026-03-01 10:15:27 --> [REQ_ID=ec93428b87d4] [REQUEST][START] GET /
DEBUG - 2026-03-01 10:15:27 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-01 10:15:27 --> [REQ_ID=ec93428b87d4] [FILTER_BEFORE] /
DEBUG - 2026-03-01 10:15:27 --> [REQ_ID=ec93428b87d4] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-01 10:15:27 --> [REQ_ID=ec93428b87d4] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-01 10:15:27 --> [CSRF] token name=csrf_test_name hash=4075798340d9bf13245a13db79b8bf68
DEBUG - 2026-03-01 10:15:27 --> [REQ_ID=bc0feab50435] [INIT] App\Controllers\Home::GET
INFO - 2026-03-01 10:15:27 --> [REQ_ID=bc0feab50435] [MEMORY][controller-start] 4194304
INFO - 2026-03-01 10:15:28 --> [REQ_ID=bc0feab50435] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-01 10:15:28 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-01 10:15:28 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
DEBUG - 2026-03-01 10:15:28 --> [REQ_ID=bc0feab50435] [VIEW_RENDER] themes/public/home
INFO - 2026-03-01 10:15:28 --> [REQ_ID=bc0feab50435] [MEMORY][commonData:start] 8388608
INFO - 2026-03-01 10:15:28 --> themesMemory usage: 8388608
DEBUG - 2026-03-01 10:15:28 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-01 10:15:28 --> [REQ_ID=ec93428b87d4] [FILTER_AFTER]
DEBUG - 2026-03-01 10:15:28 --> [REQ_ID=ec93428b87d4] [LIFECYCLE][END] status=200 duration_ms=685.12 memory_delta=4194304
INFO - 2026-03-01 10:15:28 --> [REQ_ID=bc0feab50435] [PERF] Execution time=0.683711
DEBUG - 2026-03-01 10:15:28 --> [REQ_ID=ec93428b87d4] [REQUEST][END]
INFO - 2026-03-01 10:15:28 --> [REQ_ID=ec93428b87d4] [PERF] Execution time=0.699615
DEBUG - 2026-03-01 10:28:55 --> [REQ_ID=e7e44b10472d] [REQUEST][START] GET /
DEBUG - 2026-03-01 10:28:55 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-01 10:28:55 --> [REQ_ID=e7e44b10472d] [FILTER_BEFORE] /
DEBUG - 2026-03-01 10:28:55 --> [REQ_ID=e7e44b10472d] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-01 10:28:55 --> [REQ_ID=e7e44b10472d] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-01 10:28:55 --> [CSRF] token name=csrf_test_name hash=ea17d8b0d33c51b0196f6fe19d35797e
DEBUG - 2026-03-01 10:28:55 --> [REQ_ID=62cc4ab49b9c] [INIT] App\Controllers\Home::GET
INFO - 2026-03-01 10:28:55 --> [REQ_ID=62cc4ab49b9c] [MEMORY][controller-start] 6291456
INFO - 2026-03-01 10:28:55 --> [REQ_ID=62cc4ab49b9c] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-01 10:28:55 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-01 10:28:56 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-03-01 10:28:56 --> [REQ_ID=62cc4ab49b9c] [VIEW_RENDER] themes/public/home
INFO - 2026-03-01 10:28:56 --> [REQ_ID=62cc4ab49b9c] [MEMORY][commonData:start] 10485760
INFO - 2026-03-01 10:28:56 --> themesMemory usage: 10485760
DEBUG - 2026-03-01 10:28:56 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-01 10:28:56 --> [REQ_ID=e7e44b10472d] [FILTER_AFTER]
DEBUG - 2026-03-01 10:28:56 --> [REQ_ID=e7e44b10472d] [LIFECYCLE][END] status=200 duration_ms=631.78 memory_delta=4194304
INFO - 2026-03-01 10:28:56 --> [REQ_ID=62cc4ab49b9c] [PERF] Execution time=0.629744
DEBUG - 2026-03-01 10:28:56 --> [REQ_ID=e7e44b10472d] [REQUEST][END]
INFO - 2026-03-01 10:28:56 --> [REQ_ID=e7e44b10472d] [PERF] Execution time=0.673665
INFO - 2026-03-01 10:30:01 --> [spark:ops:work] Started
INFO - 2026-03-01 10:30:01 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-03-01 10:30:01 --> [SPARK_MEMORY] 16777216
INFO - 2026-03-01 10:30:01 --> [spark:ops:work] Intent
INFO - 2026-03-01 10:30:01 --> [spark:ops:work] Completed
INFO - 2026-03-01 10:30:01 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.031305
INFO - 2026-03-01 10:30:01 --> [SPARK_MEMORY] 18874368
INFO - 2026-03-01 10:45:02 --> [spark:ops:work] Started
INFO - 2026-03-01 10:45:02 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-03-01 10:45:02 --> [SPARK_MEMORY] 16777216
INFO - 2026-03-01 10:45:02 --> [spark:ops:work] Intent
INFO - 2026-03-01 10:45:02 --> [spark:ops:work] Completed
INFO - 2026-03-01 10:45:02 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.108869
INFO - 2026-03-01 10:45:02 --> [SPARK_MEMORY] 18874368
INFO - 2026-03-01 11:00:01 --> [spark:ops:work] Started
INFO - 2026-03-01 11:00:01 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-03-01 11:00:01 --> [SPARK_MEMORY] 16777216
INFO - 2026-03-01 11:00:01 --> [spark:ops:work] Intent
DEBUG - 2026-03-01 11:00:01 --> [REQ_ID=20b21056dff5] [REQUEST][START] GET /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-01 11:00:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-01 11:00:01 --> [REQ_ID=20b21056dff5] [FILTER_BEFORE] /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-01 11:00:01 --> [REQ_ID=20b21056dff5] [ROUTE] Controller=\App\Modules\Management\Controllers\ManagementAPIController Method=Run_CRON_Tasks
DEBUG - 2026-03-01 11:00:01 --> [REQ_ID=20b21056dff5] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-01 11:00:01 --> [REQ_ID=20b21056dff5] [REQUEST][END]
INFO - 2026-03-01 11:00:01 --> [REQ_ID=20b21056dff5] [PERF] Execution time=0.050429
INFO - 2026-03-01 11:00:01 --> [spark:ops:work] Completed
INFO - 2026-03-01 11:00:01 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.106316
INFO - 2026-03-01 11:00:01 --> [SPARK_MEMORY] 18874368
INFO - 2026-03-01 11:15:01 --> [spark:ops:work] Started
INFO - 2026-03-01 11:15:01 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-03-01 11:15:01 --> [SPARK_MEMORY] 16777216
INFO - 2026-03-01 11:15:01 --> [spark:ops:work] Intent
INFO - 2026-03-01 11:15:01 --> [spark:ops:work] Completed
INFO - 2026-03-01 11:15:01 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.039798
INFO - 2026-03-01 11:15:01 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-03-01 11:15:01 --> [REQ_ID=c5f3853413bb] [REQUEST][START] GET /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-01 11:15:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-01 11:15:01 --> [REQ_ID=c5f3853413bb] [FILTER_BEFORE] /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-01 11:15:01 --> [REQ_ID=c5f3853413bb] [ROUTE] Controller=\App\Modules\APIs\Controllers\AlertsAPIController Method=fetchEmailAlerts
DEBUG - 2026-03-01 11:15:01 --> [REQ_ID=c5f3853413bb] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-01 11:15:01 --> [REQ_ID=c5f3853413bb] [REQUEST][END]
INFO - 2026-03-01 11:15:01 --> [REQ_ID=c5f3853413bb] [PERF] Execution time=0.059553
INFO - 2026-03-01 11:30:02 --> [spark:ops:work] Started
INFO - 2026-03-01 11:30:02 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-03-01 11:30:02 --> [SPARK_MEMORY] 16777216
INFO - 2026-03-01 11:30:02 --> [spark:ops:work] Intent
INFO - 2026-03-01 11:30:02 --> [spark:ops:work] Completed
INFO - 2026-03-01 11:30:02 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.039670
INFO - 2026-03-01 11:30:02 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-03-01 11:42:08 --> [REQ_ID=85fe010d8e57] [REQUEST][START] GET /
DEBUG - 2026-03-01 11:42:08 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-01 11:42:08 --> [REQ_ID=85fe010d8e57] [FILTER_BEFORE] /
DEBUG - 2026-03-01 11:42:08 --> [REQ_ID=85fe010d8e57] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-01 11:42:08 --> [REQ_ID=85fe010d8e57] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-01 11:42:08 --> [CSRF] token name=csrf_test_name hash=14421dca40f807c3ee1e38dd5a5e9ced
DEBUG - 2026-03-01 11:42:08 --> [REQ_ID=03934a767e70] [INIT] App\Controllers\Home::GET
INFO - 2026-03-01 11:42:08 --> [REQ_ID=03934a767e70] [MEMORY][controller-start] 6291456
INFO - 2026-03-01 11:42:08 --> [REQ_ID=03934a767e70] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-01 11:42:08 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-01 11:42:09 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-03-01 11:42:09 --> [REQ_ID=03934a767e70] [VIEW_RENDER] themes/public/home
INFO - 2026-03-01 11:42:09 --> [REQ_ID=03934a767e70] [MEMORY][commonData:start] 10485760
INFO - 2026-03-01 11:42:09 --> themesMemory usage: 10485760
DEBUG - 2026-03-01 11:42:09 --> [MetaService] slug= pageName=Home cacheHit= path=DB
DEBUG - 2026-03-01 11:42:09 --> [REQ_ID=85fe010d8e57] [FILTER_AFTER]
DEBUG - 2026-03-01 11:42:09 --> [REQ_ID=85fe010d8e57] [LIFECYCLE][END] status=200 duration_ms=791.25 memory_delta=4194304
INFO - 2026-03-01 11:42:09 --> [REQ_ID=03934a767e70] [PERF] Execution time=0.789058
DEBUG - 2026-03-01 11:42:09 --> [REQ_ID=85fe010d8e57] [REQUEST][END]
INFO - 2026-03-01 11:42:09 --> [REQ_ID=85fe010d8e57] [PERF] Execution time=0.831651
INFO - 2026-03-01 11:45:01 --> [spark:ops:work] Started
INFO - 2026-03-01 11:45:01 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-03-01 11:45:01 --> [SPARK_MEMORY] 16777216
INFO - 2026-03-01 11:45:01 --> [spark:ops:work] Intent
INFO - 2026-03-01 11:45:01 --> [spark:ops:work] Completed
INFO - 2026-03-01 11:45:01 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.033021
INFO - 2026-03-01 11:45:01 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-03-01 11:50:38 --> [REQ_ID=89c4daac0d9f] [REQUEST][START] GET /
DEBUG - 2026-03-01 11:50:38 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-01 11:50:38 --> [REQ_ID=89c4daac0d9f] [FILTER_BEFORE] /
DEBUG - 2026-03-01 11:50:38 --> [REQ_ID=89c4daac0d9f] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-01 11:50:38 --> [REQ_ID=89c4daac0d9f] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-01 11:50:38 --> [CSRF] token name=csrf_test_name hash=6d7319a8002cdba3f100bfa03db0f8e8
DEBUG - 2026-03-01 11:50:38 --> [REQ_ID=9271dfe310c8] [INIT] App\Controllers\Home::GET
INFO - 2026-03-01 11:50:38 --> [REQ_ID=9271dfe310c8] [MEMORY][controller-start] 6291456
INFO - 2026-03-01 11:50:38 --> [REQ_ID=9271dfe310c8] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-01 11:50:38 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-01 11:50:38 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
DEBUG - 2026-03-01 11:50:38 --> [REQ_ID=9271dfe310c8] [VIEW_RENDER] themes/public/home
INFO - 2026-03-01 11:50:38 --> [REQ_ID=9271dfe310c8] [MEMORY][commonData:start] 10485760
INFO - 2026-03-01 11:50:38 --> themesMemory usage: 10485760
DEBUG - 2026-03-01 11:50:38 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-01 11:50:38 --> [REQ_ID=89c4daac0d9f] [FILTER_AFTER]
DEBUG - 2026-03-01 11:50:38 --> [REQ_ID=89c4daac0d9f] [LIFECYCLE][END] status=200 duration_ms=608.03 memory_delta=4194304
INFO - 2026-03-01 11:50:38 --> [REQ_ID=9271dfe310c8] [PERF] Execution time=0.605970
DEBUG - 2026-03-01 11:50:38 --> [REQ_ID=89c4daac0d9f] [REQUEST][END]
INFO - 2026-03-01 11:50:38 --> [REQ_ID=89c4daac0d9f] [PERF] Execution time=0.647482
DEBUG - 2026-03-01 11:50:39 --> [REQ_ID=728cde613249] [REQUEST][START] GET /
DEBUG - 2026-03-01 11:50:39 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-01 11:50:39 --> [REQ_ID=728cde613249] [FILTER_BEFORE] /
DEBUG - 2026-03-01 11:50:39 --> [REQ_ID=728cde613249] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-01 11:50:39 --> [REQ_ID=728cde613249] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-01 11:50:39 --> [CSRF] token name=csrf_test_name hash=3fee4a41bb4f136a0d397c40d46ba1e1
DEBUG - 2026-03-01 11:50:39 --> [REQ_ID=09853e496a86] [INIT] App\Controllers\Home::GET
INFO - 2026-03-01 11:50:39 --> [REQ_ID=09853e496a86] [MEMORY][controller-start] 6291456
INFO - 2026-03-01 11:50:39 --> [REQ_ID=09853e496a86] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-01 11:50:39 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-01 11:50:40 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
DEBUG - 2026-03-01 11:50:40 --> [REQ_ID=09853e496a86] [VIEW_RENDER] themes/public/home
INFO - 2026-03-01 11:50:40 --> [REQ_ID=09853e496a86] [MEMORY][commonData:start] 8388608
INFO - 2026-03-01 11:50:40 --> themesMemory usage: 8388608
DEBUG - 2026-03-01 11:50:40 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-01 11:50:40 --> [REQ_ID=728cde613249] [FILTER_AFTER]
DEBUG - 2026-03-01 11:50:40 --> [REQ_ID=728cde613249] [LIFECYCLE][END] status=200 duration_ms=529.79 memory_delta=2097152
INFO - 2026-03-01 11:50:40 --> [REQ_ID=09853e496a86] [PERF] Execution time=0.529592
DEBUG - 2026-03-01 11:50:40 --> [REQ_ID=728cde613249] [REQUEST][END]
INFO - 2026-03-01 11:50:40 --> [REQ_ID=728cde613249] [PERF] Execution time=0.538818
DEBUG - 2026-03-01 11:50:40 --> [REQ_ID=6238e354d354] [REQUEST][START] GET /
DEBUG - 2026-03-01 11:50:40 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-01 11:50:40 --> [REQ_ID=6238e354d354] [FILTER_BEFORE] /
DEBUG - 2026-03-01 11:50:40 --> [REQ_ID=6238e354d354] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-01 11:50:40 --> [REQ_ID=6238e354d354] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-01 11:50:40 --> [CSRF] token name=csrf_test_name hash=3efcc64c16769d18836b17ae4d066f63
DEBUG - 2026-03-01 11:50:40 --> [REQ_ID=241b3f70f10c] [INIT] App\Controllers\Home::GET
INFO - 2026-03-01 11:50:40 --> [REQ_ID=241b3f70f10c] [MEMORY][controller-start] 6291456
INFO - 2026-03-01 11:50:40 --> [REQ_ID=241b3f70f10c] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-01 11:50:40 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-01 11:50:40 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
DEBUG - 2026-03-01 11:50:40 --> [REQ_ID=241b3f70f10c] [VIEW_RENDER] themes/public/home
INFO - 2026-03-01 11:50:40 --> [REQ_ID=241b3f70f10c] [MEMORY][commonData:start] 8388608
INFO - 2026-03-01 11:50:40 --> themesMemory usage: 8388608
DEBUG - 2026-03-01 11:50:40 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-01 11:50:40 --> [REQ_ID=6238e354d354] [FILTER_AFTER]
DEBUG - 2026-03-01 11:50:40 --> [REQ_ID=6238e354d354] [LIFECYCLE][END] status=200 duration_ms=584.98 memory_delta=2097152
INFO - 2026-03-01 11:50:40 --> [REQ_ID=241b3f70f10c] [PERF] Execution time=0.584760
DEBUG - 2026-03-01 11:50:40 --> [REQ_ID=6238e354d354] [REQUEST][END]
INFO - 2026-03-01 11:50:40 --> [REQ_ID=6238e354d354] [PERF] Execution time=0.594667
DEBUG - 2026-03-01 11:50:42 --> [REQ_ID=4cafc93cef3c] [REQUEST][START] GET /?fbclid=IwZXh0bgNhZW0CMTEAc3J0YwZhcHBfaWQMMjU2MjgxMDQwNTU4AAEeryYfXgsnh5LSaqVFXvzVqSVd6dtXpmdL75D-X_Q8_uEPk-SPGksn3ubS9hs_aem_5RnEyUG14R_k1qG6QVcJuA
DEBUG - 2026-03-01 11:50:42 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-01 11:50:42 --> [REQ_ID=4cafc93cef3c] [FILTER_BEFORE] /?fbclid=IwZXh0bgNhZW0CMTEAc3J0YwZhcHBfaWQMMjU2MjgxMDQwNTU4AAEeryYfXgsnh5LSaqVFXvzVqSVd6dtXpmdL75D-X_Q8_uEPk-SPGksn3ubS9hs_aem_5RnEyUG14R_k1qG6QVcJuA
DEBUG - 2026-03-01 11:50:42 --> [REQ_ID=4cafc93cef3c] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-01 11:50:42 --> [REQ_ID=4cafc93cef3c] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php?fbclid=IwZXh0bgNhZW0CMTEAc3J0YwZhcHBfaWQMMjU2MjgxMDQwNTU4AAEeryYfXgsnh5LSaqVFXvzVqSVd6dtXpmdL75D-X_Q8_uEPk-SPGksn3ubS9hs_aem_5RnEyUG14R_k1qG6QVcJuA
DEBUG - 2026-03-01 11:50:42 --> [CSRF] token name=csrf_test_name hash=4e3844276fd844afec7e84cd3df778b3
DEBUG - 2026-03-01 11:50:42 --> [REQ_ID=6a39b71f86ec] [INIT] App\Controllers\Home::GET
INFO - 2026-03-01 11:50:42 --> [REQ_ID=6a39b71f86ec] [MEMORY][controller-start] 6291456
INFO - 2026-03-01 11:50:42 --> [REQ_ID=6a39b71f86ec] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-01 11:50:42 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-01 11:50:43 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
DEBUG - 2026-03-01 11:50:43 --> [REQ_ID=6a39b71f86ec] [VIEW_RENDER] themes/public/home
INFO - 2026-03-01 11:50:43 --> [REQ_ID=6a39b71f86ec] [MEMORY][commonData:start] 8388608
INFO - 2026-03-01 11:50:43 --> themesMemory usage: 8388608
DEBUG - 2026-03-01 11:50:43 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-01 11:50:43 --> [REQ_ID=4cafc93cef3c] [FILTER_AFTER]
DEBUG - 2026-03-01 11:50:43 --> [REQ_ID=4cafc93cef3c] [LIFECYCLE][END] status=200 duration_ms=561.80 memory_delta=2097152
INFO - 2026-03-01 11:50:43 --> [REQ_ID=6a39b71f86ec] [PERF] Execution time=0.561553
DEBUG - 2026-03-01 11:50:43 --> [REQ_ID=4cafc93cef3c] [REQUEST][END]
INFO - 2026-03-01 11:50:43 --> [REQ_ID=4cafc93cef3c] [PERF] Execution time=0.571098
DEBUG - 2026-03-01 11:51:06 --> [REQ_ID=178c13694a70] [REQUEST][START] GET /?fbclid=IwZXh0bgNhZW0CMTEAc3J0YwZhcHBfaWQMMjU2MjgxMDQwNTU4AAEeryYfXgsnh5LSaqVFXvzVqSVd6dtXpmdL75D-X_Q8_uEPk-SPGksn3ubS9hs_aem_5RnEyUG14R_k1qG6QVcJuA
DEBUG - 2026-03-01 11:51:06 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-01 11:51:06 --> [REQ_ID=178c13694a70] [FILTER_BEFORE] /?fbclid=IwZXh0bgNhZW0CMTEAc3J0YwZhcHBfaWQMMjU2MjgxMDQwNTU4AAEeryYfXgsnh5LSaqVFXvzVqSVd6dtXpmdL75D-X_Q8_uEPk-SPGksn3ubS9hs_aem_5RnEyUG14R_k1qG6QVcJuA
DEBUG - 2026-03-01 11:51:06 --> [REQ_ID=178c13694a70] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-01 11:51:06 --> [REQ_ID=178c13694a70] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php?fbclid=IwZXh0bgNhZW0CMTEAc3J0YwZhcHBfaWQMMjU2MjgxMDQwNTU4AAEeryYfXgsnh5LSaqVFXvzVqSVd6dtXpmdL75D-X_Q8_uEPk-SPGksn3ubS9hs_aem_5RnEyUG14R_k1qG6QVcJuA
DEBUG - 2026-03-01 11:51:06 --> [CSRF] token name=csrf_test_name hash=4e3844276fd844afec7e84cd3df778b3
DEBUG - 2026-03-01 11:51:06 --> [REQ_ID=1514edf1439c] [INIT] App\Controllers\Home::GET
INFO - 2026-03-01 11:51:06 --> [REQ_ID=1514edf1439c] [MEMORY][controller-start] 6291456
INFO - 2026-03-01 11:51:06 --> [REQ_ID=1514edf1439c] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-01 11:51:06 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-01 11:51:06 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
DEBUG - 2026-03-01 11:51:06 --> [REQ_ID=1514edf1439c] [VIEW_RENDER] themes/public/home
INFO - 2026-03-01 11:51:06 --> [REQ_ID=1514edf1439c] [MEMORY][commonData:start] 8388608
INFO - 2026-03-01 11:51:06 --> themesMemory usage: 8388608
DEBUG - 2026-03-01 11:51:06 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-01 11:51:06 --> [REQ_ID=178c13694a70] [FILTER_AFTER]
DEBUG - 2026-03-01 11:51:06 --> [REQ_ID=178c13694a70] [LIFECYCLE][END] status=200 duration_ms=510.39 memory_delta=2097152
INFO - 2026-03-01 11:51:06 --> [REQ_ID=1514edf1439c] [PERF] Execution time=0.510136
DEBUG - 2026-03-01 11:51:06 --> [REQ_ID=178c13694a70] [REQUEST][END]
INFO - 2026-03-01 11:51:06 --> [REQ_ID=178c13694a70] [PERF] Execution time=0.519408
DEBUG - 2026-03-01 12:00:01 --> [REQ_ID=a6c00aeba310] [REQUEST][START] GET /index.php/API/Management/Run-CRON-Tasks
INFO - 2026-03-01 12:00:01 --> [spark:ops:work] Started
INFO - 2026-03-01 12:00:01 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-03-01 12:00:01 --> [SPARK_MEMORY] 16777216
INFO - 2026-03-01 12:00:01 --> [spark:ops:work] Intent
DEBUG - 2026-03-01 12:00:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
INFO - 2026-03-01 12:00:01 --> [SPARK_START] App\Commands\AIOps\Run
INFO - 2026-03-01 12:00:01 --> [SPARK_MEMORY] 16777216
INFO - 2026-03-01 12:00:01 --> [spark:aiops:run] Intent
DEBUG - 2026-03-01 12:00:01 --> [REQ_ID=a6c00aeba310] [FILTER_BEFORE] /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-01 12:00:01 --> [REQ_ID=a6c00aeba310] [ROUTE] Controller=\App\Modules\Management\Controllers\ManagementAPIController Method=Run_CRON_Tasks
DEBUG - 2026-03-01 12:00:01 --> [REQ_ID=a6c00aeba310] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-01 12:00:02 --> [REQ_ID=a6c00aeba310] [REQUEST][END]
INFO - 2026-03-01 12:00:02 --> [REQ_ID=a6c00aeba310] [PERF] Execution time=0.110037
INFO - 2026-03-01 12:00:02 --> [spark:ops:work] Completed
INFO - 2026-03-01 12:00:02 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.193504
INFO - 2026-03-01 12:00:02 --> [SPARK_MEMORY] 18874368
INFO - 2026-03-01 12:00:03 --> [AIOPS][SPARK][GOVERNANCE][spark:logs:summarize] Started
INFO - 2026-03-01 12:00:03 --> [SPARK_START] App\Commands\Logs\Summarize
INFO - 2026-03-01 12:00:03 --> [SPARK_MEMORY] 16777216
INFO - 2026-03-01 12:00:03 --> [spark:logs:summarize] Intent
INFO - 2026-03-01 12:00:03 --> [AIOPS][SPARK][GOVERNANCE][spark:logs:summarize] Completed
INFO - 2026-03-01 12:00:03 --> [SPARK_COMPLETE] App\Commands\Logs\Summarize duration=0.012520
INFO - 2026-03-01 12:00:03 --> [SPARK_MEMORY] 18874368
INFO - 2026-03-01 12:00:04 --> [spark:app:healthcheck] Started
INFO - 2026-03-01 12:00:04 --> [SPARK_START] App\Commands\App\Healthcheck
INFO - 2026-03-01 12:00:04 --> [SPARK_MEMORY] 16777216
INFO - 2026-03-01 12:00:04 --> [spark:app:healthcheck] Intent
DEBUG - 2026-03-01 12:00:04 --> LOG_HEALTHCHECK debug marker=3e114e505f52
INFO - 2026-03-01 12:00:04 --> LOG_HEALTHCHECK info marker=3e114e505f52
NOTICE - 2026-03-01 12:00:04 --> LOG_HEALTHCHECK probe marker=3e114e505f52
INFO - 2026-03-01 12:00:04 --> [spark:app:healthcheck] Completed
INFO - 2026-03-01 12:00:04 --> [SPARK_COMPLETE] App\Commands\App\Healthcheck duration=0.029593
INFO - 2026-03-01 12:00:04 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-03-01 12:00:05 --> OllamaPatchRunner:L142 - validateGeneratedPatch Content: 
WARNING - 2026-03-01 12:00:05 --> OllamaPatchRunner:L49 - Original Diff: 
DEBUG - 2026-03-01 12:00:05 --> OllamaPatchRunner:L51 - Retried Diff: 
DEBUG - 2026-03-01 12:00:05 --> OllamaPatchRunner:L142 - validateGeneratedPatch Content: 
DEBUG - 2026-03-01 12:00:05 --> OllamaPatchRunner:L53 - Validating Generated Patch Failed
INFO - 2026-03-01 12:00:05 --> [SPARK_COMPLETE] App\Commands\AIOps\Run duration=3.873226
INFO - 2026-03-01 12:00:05 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-03-01 12:02:23 --> [REQ_ID=feffff79b73c] [REQUEST][START] GET /
DEBUG - 2026-03-01 12:02:23 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-01 12:02:23 --> [REQ_ID=feffff79b73c] [FILTER_BEFORE] /
DEBUG - 2026-03-01 12:02:23 --> [REQ_ID=feffff79b73c] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-01 12:02:23 --> [REQ_ID=feffff79b73c] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-01 12:02:23 --> [CSRF] token name=csrf_test_name hash=92b75b4f35f997fd5ef5ecb53b458d14
DEBUG - 2026-03-01 12:02:23 --> [REQ_ID=05136abc9a40] [INIT] App\Controllers\Home::GET
INFO - 2026-03-01 12:02:23 --> [REQ_ID=05136abc9a40] [MEMORY][controller-start] 6291456
INFO - 2026-03-01 12:02:23 --> [REQ_ID=05136abc9a40] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-01 12:02:23 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-01 12:02:23 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-03-01 12:02:23 --> [REQ_ID=05136abc9a40] [VIEW_RENDER] themes/public/home
INFO - 2026-03-01 12:02:23 --> [REQ_ID=05136abc9a40] [MEMORY][commonData:start] 10485760
INFO - 2026-03-01 12:02:23 --> themesMemory usage: 10485760
DEBUG - 2026-03-01 12:02:23 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-01 12:02:23 --> [REQ_ID=feffff79b73c] [FILTER_AFTER]
DEBUG - 2026-03-01 12:02:23 --> [REQ_ID=feffff79b73c] [LIFECYCLE][END] status=200 duration_ms=608.58 memory_delta=4194304
INFO - 2026-03-01 12:02:23 --> [REQ_ID=05136abc9a40] [PERF] Execution time=0.606628
DEBUG - 2026-03-01 12:02:23 --> [REQ_ID=feffff79b73c] [REQUEST][END]
INFO - 2026-03-01 12:02:23 --> [REQ_ID=feffff79b73c] [PERF] Execution time=0.653303
DEBUG - 2026-03-01 12:02:34 --> [REQ_ID=b89e9e0a7546] [REQUEST][START] GET /
DEBUG - 2026-03-01 12:02:34 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-01 12:02:34 --> [REQ_ID=b89e9e0a7546] [FILTER_BEFORE] /
DEBUG - 2026-03-01 12:02:34 --> [REQ_ID=b89e9e0a7546] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-01 12:02:34 --> [REQ_ID=b89e9e0a7546] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-01 12:02:34 --> [CSRF] token name=csrf_test_name hash=4fd2e9b57c59cbc980af7bc3a6fa409f
DEBUG - 2026-03-01 12:02:34 --> [REQ_ID=c1b329ca76d7] [INIT] App\Controllers\Home::GET
INFO - 2026-03-01 12:02:34 --> [REQ_ID=c1b329ca76d7] [MEMORY][controller-start] 6291456
INFO - 2026-03-01 12:02:34 --> [REQ_ID=c1b329ca76d7] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-01 12:02:34 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-01 12:02:34 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
DEBUG - 2026-03-01 12:02:34 --> [REQ_ID=c1b329ca76d7] [VIEW_RENDER] themes/public/home
INFO - 2026-03-01 12:02:34 --> [REQ_ID=c1b329ca76d7] [MEMORY][commonData:start] 8388608
INFO - 2026-03-01 12:02:34 --> themesMemory usage: 8388608
DEBUG - 2026-03-01 12:02:34 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-01 12:02:34 --> [REQ_ID=b89e9e0a7546] [FILTER_AFTER]
DEBUG - 2026-03-01 12:02:34 --> [REQ_ID=b89e9e0a7546] [LIFECYCLE][END] status=200 duration_ms=539.93 memory_delta=2097152
INFO - 2026-03-01 12:02:34 --> [REQ_ID=c1b329ca76d7] [PERF] Execution time=0.539559
DEBUG - 2026-03-01 12:02:34 --> [REQ_ID=b89e9e0a7546] [REQUEST][END]
INFO - 2026-03-01 12:02:34 --> [REQ_ID=b89e9e0a7546] [PERF] Execution time=0.549280
DEBUG - 2026-03-01 12:02:36 --> [REQ_ID=9faa91e51523] [REQUEST][START] POST /index.php/register
DEBUG - 2026-03-01 12:02:36 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-01 12:02:36 --> [REQ_ID=9faa91e51523] [FILTER_BEFORE] /index.php/register
DEBUG - 2026-03-01 12:02:36 --> [REQ_ID=9faa91e51523] [ROUTE] Controller=\App\Controllers\AuthController Method=attemptRegister
DEBUG - 2026-03-01 12:02:36 --> [REQ_ID=9faa91e51523] [LIFECYCLE][START] POST https://www.mymiwallet.com/index.php/register
DEBUG - 2026-03-01 12:02:36 --> [CSRF] token name=csrf_test_name hash=07e5d56b48c5d9b04ae8869b05f6327b
DEBUG - 2026-03-01 12:02:36 --> [REQ_ID=9faa91e51523] [REQUEST][END]
INFO - 2026-03-01 12:02:36 --> [REQ_ID=9faa91e51523] [PERF] Execution time=0.013843
DEBUG - 2026-03-01 12:02:37 --> [REQ_ID=3acfcd1cd837] [REQUEST][START] GET /index.php/register
DEBUG - 2026-03-01 12:02:37 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-01 12:02:37 --> [REQ_ID=3acfcd1cd837] [FILTER_BEFORE] /index.php/register
DEBUG - 2026-03-01 12:02:37 --> [REQ_ID=3acfcd1cd837] [ROUTE] Controller=\App\Controllers\AuthController Method=register
DEBUG - 2026-03-01 12:02:37 --> [REQ_ID=3acfcd1cd837] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/register
DEBUG - 2026-03-01 12:02:37 --> [CSRF] token name=csrf_test_name hash=d09e4a6ee43574ceb142acdf8d6a85ab
DEBUG - 2026-03-01 12:02:37 --> [REQ_ID=513df746ad21] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-01 12:02:37 --> [REQ_ID=513df746ad21] [MEMORY][controller-start] 4194304
INFO - 2026-03-01 12:02:37 --> [REGISTRATION] Form loaded
INFO - 2026-03-01 12:02:37 --> [REQ_ID=513df746ad21] [PERF] Execution time=0.024141
DEBUG - 2026-03-01 12:02:38 --> [REQ_ID=5679bb377904] [REQUEST][START] GET /index.php
DEBUG - 2026-03-01 12:02:38 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-01 12:02:38 --> [REQ_ID=5679bb377904] [FILTER_BEFORE] /index.php
DEBUG - 2026-03-01 12:02:38 --> [REQ_ID=5679bb377904] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-01 12:02:38 --> [REQ_ID=5679bb377904] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-01 12:02:38 --> [CSRF] token name=csrf_test_name hash=35484a22c5009ec9054fe979a6011a07
DEBUG - 2026-03-01 12:02:38 --> [REQ_ID=ae4a4a6a3d9c] [INIT] App\Controllers\Home::GET
INFO - 2026-03-01 12:02:38 --> [REQ_ID=ae4a4a6a3d9c] [MEMORY][controller-start] 4194304
INFO - 2026-03-01 12:02:38 --> [REQ_ID=ae4a4a6a3d9c] [MEMORY][commonData:start] 4194304
DEBUG - 2026-03-01 12:02:38 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-01 12:02:38 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
DEBUG - 2026-03-01 12:02:38 --> [REQ_ID=ae4a4a6a3d9c] [VIEW_RENDER] themes/public/home
INFO - 2026-03-01 12:02:38 --> [REQ_ID=ae4a4a6a3d9c] [MEMORY][commonData:start] 8388608
INFO - 2026-03-01 12:02:38 --> themesMemory usage: 8388608
DEBUG - 2026-03-01 12:02:38 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-01 12:02:38 --> [REQ_ID=5679bb377904] [FILTER_AFTER]
DEBUG - 2026-03-01 12:02:38 --> [REQ_ID=5679bb377904] [LIFECYCLE][END] status=200 duration_ms=517.33 memory_delta=4194304
INFO - 2026-03-01 12:02:38 --> [REQ_ID=ae4a4a6a3d9c] [PERF] Execution time=0.517035
DEBUG - 2026-03-01 12:02:38 --> [REQ_ID=5679bb377904] [REQUEST][END]
INFO - 2026-03-01 12:02:38 --> [REQ_ID=5679bb377904] [PERF] Execution time=0.527749
DEBUG - 2026-03-01 12:02:39 --> [REQ_ID=fc9413875a1f] [REQUEST][START] POST /index.php/register
DEBUG - 2026-03-01 12:02:39 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-01 12:02:39 --> [REQ_ID=fc9413875a1f] [FILTER_BEFORE] /index.php/register
DEBUG - 2026-03-01 12:02:39 --> [REQ_ID=fc9413875a1f] [ROUTE] Controller=\App\Controllers\AuthController Method=attemptRegister
DEBUG - 2026-03-01 12:02:39 --> [REQ_ID=fc9413875a1f] [LIFECYCLE][START] POST https://www.mymiwallet.com/index.php/register
DEBUG - 2026-03-01 12:02:39 --> [CSRF] token name=csrf_test_name hash=ab788b4156d3c584cd419e0ac4918e8e
DEBUG - 2026-03-01 12:02:39 --> [REQ_ID=fc9413875a1f] [REQUEST][END]
INFO - 2026-03-01 12:02:39 --> [REQ_ID=fc9413875a1f] [PERF] Execution time=0.008723
DEBUG - 2026-03-01 12:02:40 --> [REQ_ID=ab428c153beb] [REQUEST][START] GET /index.php/register
DEBUG - 2026-03-01 12:02:40 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-01 12:02:40 --> [REQ_ID=ab428c153beb] [FILTER_BEFORE] /index.php/register
DEBUG - 2026-03-01 12:02:40 --> [REQ_ID=ab428c153beb] [ROUTE] Controller=\App\Controllers\AuthController Method=register
DEBUG - 2026-03-01 12:02:40 --> [REQ_ID=ab428c153beb] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/register
DEBUG - 2026-03-01 12:02:40 --> [CSRF] token name=csrf_test_name hash=99deef1a26746b755083c97250ff7200
DEBUG - 2026-03-01 12:02:40 --> [REQ_ID=0dd7edd95b96] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-01 12:02:40 --> [REQ_ID=0dd7edd95b96] [MEMORY][controller-start] 4194304
INFO - 2026-03-01 12:02:40 --> [REGISTRATION] Form loaded
INFO - 2026-03-01 12:02:40 --> [REQ_ID=0dd7edd95b96] [PERF] Execution time=0.015044
DEBUG - 2026-03-01 12:02:41 --> [REQ_ID=81e1ef40c516] [REQUEST][START] GET /index.php/Blog
DEBUG - 2026-03-01 12:02:41 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-01 12:02:41 --> [REQ_ID=81e1ef40c516] [FILTER_BEFORE] /index.php/Blog
DEBUG - 2026-03-01 12:02:41 --> [REQ_ID=81e1ef40c516] [ROUTE] Controller=\App\Modules\Blog\Controllers\BlogController Method=index
DEBUG - 2026-03-01 12:02:41 --> [REQ_ID=81e1ef40c516] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Blog
DEBUG - 2026-03-01 12:02:41 --> [CSRF] token name=csrf_test_name hash=69a018a42d10ea2003336a7b88481289
DEBUG - 2026-03-01 12:02:41 --> [REQ_ID=364af51daf6c] [INIT] App\Modules\Blog\Controllers\BlogController::GET
INFO - 2026-03-01 12:02:41 --> [REQ_ID=364af51daf6c] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-01 12:02:41 --> [REQ_ID=364af51daf6c] [METHOD_ENTRY] index
DEBUG - 2026-03-01 12:02:41 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-01 12:02:41 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-01 12:02:41 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-01 12:02:41 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-01 12:02:41 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-01 12:02:41 --> MyMICoin: guest context detected; skipping user-specific preload.
INFO - 2026-03-01 12:02:41 --> [REQ_ID=364af51daf6c] [MEMORY][commonData:start] 4194304
INFO - 2026-03-01 12:02:41 --> [REQ_ID=364af51daf6c] [PERF] Execution time=0.053278
DEBUG - 2026-03-01 12:02:42 --> [REQ_ID=d901a8ff2fdb] [REQUEST][START] GET /index.php/Dashboard
DEBUG - 2026-03-01 12:02:42 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-01 12:02:42 --> [REQ_ID=d901a8ff2fdb] [FILTER_BEFORE] /index.php/Dashboard
DEBUG - 2026-03-01 12:02:42 --> [REQ_ID=d901a8ff2fdb] [ROUTE] Controller=\App\Modules\User\Controllers\DashboardController Method=index
DEBUG - 2026-03-01 12:02:42 --> [REQ_ID=d901a8ff2fdb] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Dashboard
DEBUG - 2026-03-01 12:02:42 --> [CSRF] token name=csrf_test_name hash=60f3305b3222346b731ea33e90197fbc
DEBUG - 2026-03-01 12:02:42 --> [REQ_ID=d901a8ff2fdb] [REQUEST][END]
INFO - 2026-03-01 12:02:42 --> [REQ_ID=d901a8ff2fdb] [PERF] Execution time=0.013269
DEBUG - 2026-03-01 12:02:42 --> [REQ_ID=43c97f90003d] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-01 12:02:42 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-01 12:02:42 --> [REQ_ID=43c97f90003d] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-01 12:02:42 --> [REQ_ID=43c97f90003d] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-01 12:02:42 --> [REQ_ID=43c97f90003d] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-01 12:02:42 --> [CSRF] token name=csrf_test_name hash=2b5baee1118eaa0acd80c2945eeefdb1
DEBUG - 2026-03-01 12:02:42 --> [REQ_ID=1514af95c68b] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-01 12:02:42 --> [REQ_ID=1514af95c68b] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-01 12:02:42 --> [REQ_ID=43c97f90003d] [FILTER_AFTER]
DEBUG - 2026-03-01 12:02:42 --> [REQ_ID=43c97f90003d] [LIFECYCLE][END] status=200 duration_ms=27.27 memory_delta=0
INFO - 2026-03-01 12:02:42 --> [REQ_ID=1514af95c68b] [PERF] Execution time=0.027060
DEBUG - 2026-03-01 12:02:42 --> [REQ_ID=43c97f90003d] [REQUEST][END]
INFO - 2026-03-01 12:02:42 --> [REQ_ID=43c97f90003d] [PERF] Execution time=0.035634
DEBUG - 2026-03-01 12:02:43 --> [REQ_ID=e7db0da6a528] [REQUEST][START] GET /index.php/Free/register
DEBUG - 2026-03-01 12:02:43 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-01 12:02:43 --> [REQ_ID=e7db0da6a528] [FILTER_BEFORE] /index.php/Free/register
DEBUG - 2026-03-01 12:02:43 --> [REQ_ID=e7db0da6a528] [ROUTE] Controller=\App\Controllers\AuthController Method=register
DEBUG - 2026-03-01 12:02:43 --> [REQ_ID=e7db0da6a528] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Free/register
DEBUG - 2026-03-01 12:02:43 --> [CSRF] token name=csrf_test_name hash=d7a1891ed48fd5f42eadb5baa6a93dc1
DEBUG - 2026-03-01 12:02:43 --> [REQ_ID=e7db0da6a528] [REQUEST][END]
INFO - 2026-03-01 12:02:43 --> [REQ_ID=e7db0da6a528] [PERF] Execution time=0.010481
DEBUG - 2026-03-01 12:02:43 --> [REQ_ID=86d5fca90960] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-01 12:02:43 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-01 12:02:43 --> [REQ_ID=86d5fca90960] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-01 12:02:43 --> [REQ_ID=86d5fca90960] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-01 12:02:43 --> [REQ_ID=86d5fca90960] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-01 12:02:43 --> [CSRF] token name=csrf_test_name hash=bb15bd16fe0c88477a800a1ae3f97aa8
DEBUG - 2026-03-01 12:02:43 --> [REQ_ID=0699cf75595e] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-01 12:02:43 --> [REQ_ID=0699cf75595e] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-01 12:02:43 --> [REQ_ID=86d5fca90960] [FILTER_AFTER]
DEBUG - 2026-03-01 12:02:43 --> [REQ_ID=86d5fca90960] [LIFECYCLE][END] status=200 duration_ms=21.60 memory_delta=0
INFO - 2026-03-01 12:02:43 --> [REQ_ID=0699cf75595e] [PERF] Execution time=0.021538
DEBUG - 2026-03-01 12:02:43 --> [REQ_ID=86d5fca90960] [REQUEST][END]
INFO - 2026-03-01 12:02:43 --> [REQ_ID=86d5fca90960] [PERF] Execution time=0.031656
DEBUG - 2026-03-01 12:02:44 --> [REQ_ID=36667ebddf73] [REQUEST][START] GET /index.php/How-It-Works
DEBUG - 2026-03-01 12:02:44 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-01 12:02:44 --> [REQ_ID=36667ebddf73] [FILTER_BEFORE] /index.php/How-It-Works
DEBUG - 2026-03-01 12:02:44 --> [REQ_ID=36667ebddf73] [ROUTE] Controller=\App\Modules\Blog\Controllers\HowItWorksController Method=index
DEBUG - 2026-03-01 12:02:44 --> [REQ_ID=36667ebddf73] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/How-It-Works
DEBUG - 2026-03-01 12:02:44 --> [CSRF] token name=csrf_test_name hash=bc03ecdb2a16f874e48a6bb6945f15f0
DEBUG - 2026-03-01 12:02:44 --> [REQ_ID=a5119f36ea5c] [INIT] App\Modules\Blog\Controllers\HowItWorksController::GET
INFO - 2026-03-01 12:02:44 --> [REQ_ID=a5119f36ea5c] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-01 12:02:44 --> [REQ_ID=a5119f36ea5c] [METHOD_ENTRY] index
DEBUG - 2026-03-01 12:02:44 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-01 12:02:44 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-01 12:02:44 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-01 12:02:44 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-01 12:02:44 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-01 12:02:44 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-01 12:02:44 --> [REQ_ID=a5119f36ea5c] [VIEW_RENDER] App\Modules\Blog\Views\HowItWorks\index
INFO - 2026-03-01 12:02:44 --> [REQ_ID=a5119f36ea5c] [MEMORY][commonData:start] 4194304
DEBUG - 2026-03-01 12:02:45 --> [MetaService] slug=how-it-works pageName= cacheHit= path=DB
INFO - 2026-03-01 12:02:45 --> themesMemory usage: 8388608
DEBUG - 2026-03-01 12:02:45 --> [MetaService] slug=how-it-works pageName= cacheHit=1 path=CACHE
DEBUG - 2026-03-01 12:02:45 --> [REQ_ID=36667ebddf73] [FILTER_AFTER]
DEBUG - 2026-03-01 12:02:45 --> [REQ_ID=36667ebddf73] [LIFECYCLE][END] status=200 duration_ms=598.58 memory_delta=4194304
INFO - 2026-03-01 12:02:45 --> [REQ_ID=a5119f36ea5c] [PERF] Execution time=0.598233
DEBUG - 2026-03-01 12:02:45 --> [REQ_ID=36667ebddf73] [REQUEST][END]
INFO - 2026-03-01 12:02:45 --> [REQ_ID=36667ebddf73] [PERF] Execution time=0.610116
DEBUG - 2026-03-01 12:02:46 --> [REQ_ID=fc2cdff345a1] [REQUEST][START] GET /index.php/How-It-Works/Automated-Financial-Insights
DEBUG - 2026-03-01 12:02:46 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-01 12:02:46 --> [REQ_ID=fc2cdff345a1] [FILTER_BEFORE] /index.php/How-It-Works/Automated-Financial-Insights
DEBUG - 2026-03-01 12:02:46 --> [REQ_ID=fc2cdff345a1] [ROUTE] Controller=\App\Modules\Blog\Controllers\HowItWorksController Method=show
DEBUG - 2026-03-01 12:02:46 --> [REQ_ID=fc2cdff345a1] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/How-It-Works/Automated-Financial-Insights
DEBUG - 2026-03-01 12:02:46 --> [CSRF] token name=csrf_test_name hash=758d5939197bcff6940544e45ad06bdf
DEBUG - 2026-03-01 12:02:46 --> [REQ_ID=75e266c08f77] [INIT] App\Modules\Blog\Controllers\HowItWorksController::GET
INFO - 2026-03-01 12:02:46 --> [REQ_ID=75e266c08f77] [MEMORY][controller-start] 6291456
DEBUG - 2026-03-01 12:02:46 --> [REQ_ID=75e266c08f77] [METHOD_ENTRY] show
DEBUG - 2026-03-01 12:02:46 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-01 12:02:46 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-01 12:02:46 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-01 12:02:46 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-01 12:02:46 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-01 12:02:46 --> MyMICoin: guest context detected; skipping user-specific preload.
ERROR - 2026-03-01 12:02:46 --> [ERROR_PAGE] event=error_404 status=404 message=Page not found.
DEBUG - 2026-03-01 12:02:46 --> [REQ_ID=fc2cdff345a1] [FILTER_AFTER]
DEBUG - 2026-03-01 12:02:46 --> [REQ_ID=fc2cdff345a1] [LIFECYCLE][END] status=404 duration_ms=24.87 memory_delta=0
INFO - 2026-03-01 12:02:46 --> [REQ_ID=75e266c08f77] [PERF] Execution time=0.024625
DEBUG - 2026-03-01 12:02:46 --> [REQ_ID=fc2cdff345a1] [REQUEST][END]
INFO - 2026-03-01 12:02:46 --> [REQ_ID=fc2cdff345a1] [PERF] Execution time=0.035416
DEBUG - 2026-03-01 12:02:46 --> [REQ_ID=50500b854633] [REQUEST][START] GET /index.php/How-It-Works/Daily-Financial-News
DEBUG - 2026-03-01 12:02:46 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-01 12:02:47 --> [REQ_ID=50500b854633] [FILTER_BEFORE] /index.php/How-It-Works/Daily-Financial-News
DEBUG - 2026-03-01 12:02:47 --> [REQ_ID=50500b854633] [ROUTE] Controller=\App\Modules\Blog\Controllers\HowItWorksController Method=show
DEBUG - 2026-03-01 12:02:47 --> [REQ_ID=50500b854633] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/How-It-Works/Daily-Financial-News
DEBUG - 2026-03-01 12:02:47 --> [CSRF] token name=csrf_test_name hash=2a27ebf3b4bfe23996d8b8a967d67e8e
DEBUG - 2026-03-01 12:02:47 --> [REQ_ID=265649ebedf7] [INIT] App\Modules\Blog\Controllers\HowItWorksController::GET
INFO - 2026-03-01 12:02:47 --> [REQ_ID=265649ebedf7] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-01 12:02:47 --> [REQ_ID=265649ebedf7] [METHOD_ENTRY] show
DEBUG - 2026-03-01 12:02:47 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-01 12:02:47 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-01 12:02:47 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-01 12:02:47 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-01 12:02:47 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-01 12:02:47 --> MyMICoin: guest context detected; skipping user-specific preload.
ERROR - 2026-03-01 12:02:47 --> [ERROR_PAGE] event=error_404 status=404 message=Page not found.
DEBUG - 2026-03-01 12:02:47 --> [REQ_ID=50500b854633] [FILTER_AFTER]
DEBUG - 2026-03-01 12:02:47 --> [REQ_ID=50500b854633] [LIFECYCLE][END] status=404 duration_ms=19.66 memory_delta=0
INFO - 2026-03-01 12:02:47 --> [REQ_ID=265649ebedf7] [PERF] Execution time=0.019409
DEBUG - 2026-03-01 12:02:47 --> [REQ_ID=50500b854633] [REQUEST][END]
INFO - 2026-03-01 12:02:47 --> [REQ_ID=50500b854633] [PERF] Execution time=0.029205
DEBUG - 2026-03-01 12:02:47 --> [REQ_ID=736a3f22a94a] [REQUEST][START] GET /index.php/How-It-Works/Investment-Dashboard
DEBUG - 2026-03-01 12:02:47 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-01 12:02:47 --> [REQ_ID=736a3f22a94a] [FILTER_BEFORE] /index.php/How-It-Works/Investment-Dashboard
DEBUG - 2026-03-01 12:02:47 --> [REQ_ID=736a3f22a94a] [ROUTE] Controller=\App\Modules\Blog\Controllers\HowItWorksController Method=show
DEBUG - 2026-03-01 12:02:47 --> [REQ_ID=736a3f22a94a] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/How-It-Works/Investment-Dashboard
DEBUG - 2026-03-01 12:02:47 --> [CSRF] token name=csrf_test_name hash=0b96882f0abe896700454d493d3a040b
DEBUG - 2026-03-01 12:02:47 --> [REQ_ID=e5553b16d0f8] [INIT] App\Modules\Blog\Controllers\HowItWorksController::GET
INFO - 2026-03-01 12:02:47 --> [REQ_ID=e5553b16d0f8] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-01 12:02:47 --> [REQ_ID=e5553b16d0f8] [METHOD_ENTRY] show
DEBUG - 2026-03-01 12:02:47 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-01 12:02:47 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-01 12:02:47 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-01 12:02:47 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-01 12:02:47 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-01 12:02:47 --> MyMICoin: guest context detected; skipping user-specific preload.
INFO - 2026-03-01 12:02:47 --> [REQ_ID=e5553b16d0f8] [MEMORY][commonData:start] 4194304
DEBUG - 2026-03-01 12:02:48 --> [REQ_ID=e5553b16d0f8] [VIEW_RENDER] App\Modules\Blog\Views\HowItWorks\Investment_Portfolio_Management
INFO - 2026-03-01 12:02:48 --> [REQ_ID=e5553b16d0f8] [MEMORY][commonData:start] 8388608
INFO - 2026-03-01 12:02:48 --> themesMemory usage: 10485760
DEBUG - 2026-03-01 12:02:48 --> [REQ_ID=736a3f22a94a] [FILTER_AFTER]
DEBUG - 2026-03-01 12:02:48 --> [REQ_ID=736a3f22a94a] [LIFECYCLE][END] status=200 duration_ms=1,105.97 memory_delta=6291456
INFO - 2026-03-01 12:02:48 --> [REQ_ID=e5553b16d0f8] [PERF] Execution time=1.105715
DEBUG - 2026-03-01 12:02:48 --> [REQ_ID=736a3f22a94a] [REQUEST][END]
INFO - 2026-03-01 12:02:48 --> [REQ_ID=736a3f22a94a] [PERF] Execution time=1.115201
DEBUG - 2026-03-01 12:02:49 --> [REQ_ID=dbc24106dcae] [REQUEST][START] POST /index.php/register
DEBUG - 2026-03-01 12:02:49 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-01 12:02:49 --> [REQ_ID=dbc24106dcae] [FILTER_BEFORE] /index.php/register
DEBUG - 2026-03-01 12:02:49 --> [REQ_ID=dbc24106dcae] [ROUTE] Controller=\App\Controllers\AuthController Method=attemptRegister
DEBUG - 2026-03-01 12:02:49 --> [REQ_ID=dbc24106dcae] [LIFECYCLE][START] POST https://www.mymiwallet.com/index.php/register
DEBUG - 2026-03-01 12:02:49 --> [CSRF] token name=csrf_test_name hash=e68cb92879fca63162d870183b3584db
DEBUG - 2026-03-01 12:02:49 --> [REQ_ID=dbc24106dcae] [REQUEST][END]
INFO - 2026-03-01 12:02:49 --> [REQ_ID=dbc24106dcae] [PERF] Execution time=0.010081
DEBUG - 2026-03-01 12:02:49 --> [REQ_ID=b4cb3ba870d7] [REQUEST][START] GET /index.php/register
DEBUG - 2026-03-01 12:02:49 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-01 12:02:49 --> [REQ_ID=b4cb3ba870d7] [FILTER_BEFORE] /index.php/register
DEBUG - 2026-03-01 12:02:49 --> [REQ_ID=b4cb3ba870d7] [ROUTE] Controller=\App\Controllers\AuthController Method=register
DEBUG - 2026-03-01 12:02:49 --> [REQ_ID=b4cb3ba870d7] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/register
DEBUG - 2026-03-01 12:02:49 --> [CSRF] token name=csrf_test_name hash=fec32efac052026ba85c414b32ef4f9a
DEBUG - 2026-03-01 12:02:49 --> [REQ_ID=4bf39f401de0] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-01 12:02:49 --> [REQ_ID=4bf39f401de0] [MEMORY][controller-start] 6291456
INFO - 2026-03-01 12:02:49 --> [REGISTRATION] Form loaded
INFO - 2026-03-01 12:02:49 --> [REQ_ID=4bf39f401de0] [PERF] Execution time=0.015104
DEBUG - 2026-03-01 12:02:50 --> [REQ_ID=d1546edf138f] [REQUEST][START] GET /index.php/How-It-Works/Investment-Portfolio-Management
DEBUG - 2026-03-01 12:02:50 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-01 12:02:50 --> [REQ_ID=d1546edf138f] [FILTER_BEFORE] /index.php/How-It-Works/Investment-Portfolio-Management
DEBUG - 2026-03-01 12:02:50 --> [REQ_ID=d1546edf138f] [ROUTE] Controller=\App\Modules\Blog\Controllers\HowItWorksController Method=show
DEBUG - 2026-03-01 12:02:50 --> [REQ_ID=d1546edf138f] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/How-It-Works/Investment-Portfolio-Management
DEBUG - 2026-03-01 12:02:50 --> [CSRF] token name=csrf_test_name hash=c7fd2934776be50a9defcfa009cfbb9a
DEBUG - 2026-03-01 12:02:50 --> [REQ_ID=5902f5cbc536] [INIT] App\Modules\Blog\Controllers\HowItWorksController::GET
INFO - 2026-03-01 12:02:50 --> [REQ_ID=5902f5cbc536] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-01 12:02:50 --> [REQ_ID=5902f5cbc536] [METHOD_ENTRY] show
DEBUG - 2026-03-01 12:02:50 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-01 12:02:50 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-01 12:02:50 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-01 12:02:50 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-01 12:02:50 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-01 12:02:50 --> MyMICoin: guest context detected; skipping user-specific preload.
ERROR - 2026-03-01 12:02:50 --> [ERROR_PAGE] event=error_404 status=404 message=Page not found.
DEBUG - 2026-03-01 12:02:50 --> [REQ_ID=d1546edf138f] [FILTER_AFTER]
DEBUG - 2026-03-01 12:02:50 --> [REQ_ID=d1546edf138f] [LIFECYCLE][END] status=404 duration_ms=19.15 memory_delta=0
INFO - 2026-03-01 12:02:50 --> [REQ_ID=5902f5cbc536] [PERF] Execution time=0.018958
DEBUG - 2026-03-01 12:02:50 --> [REQ_ID=d1546edf138f] [REQUEST][END]
INFO - 2026-03-01 12:02:50 --> [REQ_ID=d1546edf138f] [PERF] Execution time=0.028241
DEBUG - 2026-03-01 12:02:51 --> [REQ_ID=cad1f9cf7d0c] [REQUEST][START] GET /index.php/How-It-Works/Investor-Profile
DEBUG - 2026-03-01 12:02:51 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-01 12:02:51 --> [REQ_ID=cad1f9cf7d0c] [FILTER_BEFORE] /index.php/How-It-Works/Investor-Profile
DEBUG - 2026-03-01 12:02:51 --> [REQ_ID=cad1f9cf7d0c] [ROUTE] Controller=\App\Modules\Blog\Controllers\HowItWorksController Method=show
DEBUG - 2026-03-01 12:02:51 --> [REQ_ID=cad1f9cf7d0c] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/How-It-Works/Investor-Profile
DEBUG - 2026-03-01 12:02:51 --> [CSRF] token name=csrf_test_name hash=320fa47aed943d618c0a73e277f781ac
DEBUG - 2026-03-01 12:02:51 --> [REQ_ID=ef643ebf9e9e] [INIT] App\Modules\Blog\Controllers\HowItWorksController::GET
INFO - 2026-03-01 12:02:51 --> [REQ_ID=ef643ebf9e9e] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-01 12:02:51 --> [REQ_ID=ef643ebf9e9e] [METHOD_ENTRY] show
DEBUG - 2026-03-01 12:02:51 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-01 12:02:51 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-01 12:02:51 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-01 12:02:51 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-01 12:02:51 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-01 12:02:51 --> MyMICoin: guest context detected; skipping user-specific preload.
ERROR - 2026-03-01 12:02:51 --> [ERROR_PAGE] event=error_404 status=404 message=Page not found.
DEBUG - 2026-03-01 12:02:51 --> [REQ_ID=cad1f9cf7d0c] [FILTER_AFTER]
DEBUG - 2026-03-01 12:02:51 --> [REQ_ID=cad1f9cf7d0c] [LIFECYCLE][END] status=404 duration_ms=24.13 memory_delta=0
INFO - 2026-03-01 12:02:51 --> [REQ_ID=ef643ebf9e9e] [PERF] Execution time=0.023875
DEBUG - 2026-03-01 12:02:51 --> [REQ_ID=cad1f9cf7d0c] [REQUEST][END]
INFO - 2026-03-01 12:02:51 --> [REQ_ID=cad1f9cf7d0c] [PERF] Execution time=0.032846
DEBUG - 2026-03-01 12:02:52 --> [REQ_ID=0586bc6e11b7] [REQUEST][START] GET /index.php/How-It-Works/MyMI-Exchange
DEBUG - 2026-03-01 12:02:52 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-01 12:02:52 --> [REQ_ID=0586bc6e11b7] [FILTER_BEFORE] /index.php/How-It-Works/MyMI-Exchange
DEBUG - 2026-03-01 12:02:52 --> [REQ_ID=0586bc6e11b7] [ROUTE] Controller=\App\Modules\Blog\Controllers\HowItWorksController Method=show
DEBUG - 2026-03-01 12:02:52 --> [REQ_ID=0586bc6e11b7] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/How-It-Works/MyMI-Exchange
DEBUG - 2026-03-01 12:02:52 --> [CSRF] token name=csrf_test_name hash=a0cd2454d4d8cd2c91812981966b5075
DEBUG - 2026-03-01 12:02:52 --> [REQ_ID=db127980eb7a] [INIT] App\Modules\Blog\Controllers\HowItWorksController::GET
INFO - 2026-03-01 12:02:52 --> [REQ_ID=db127980eb7a] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-01 12:02:52 --> [REQ_ID=db127980eb7a] [METHOD_ENTRY] show
DEBUG - 2026-03-01 12:02:52 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-01 12:02:52 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-01 12:02:52 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-01 12:02:52 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-01 12:02:52 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-01 12:02:52 --> MyMICoin: guest context detected; skipping user-specific preload.
INFO - 2026-03-01 12:02:52 --> [REQ_ID=db127980eb7a] [MEMORY][commonData:start] 4194304
DEBUG - 2026-03-01 12:02:52 --> [REQ_ID=db127980eb7a] [VIEW_RENDER] App\Modules\Blog\Views\HowItWorks\Manage_Finances
INFO - 2026-03-01 12:02:52 --> [REQ_ID=db127980eb7a] [MEMORY][commonData:start] 8388608
INFO - 2026-03-01 12:02:53 --> themesMemory usage: 10485760
DEBUG - 2026-03-01 12:02:53 --> [REQ_ID=0586bc6e11b7] [FILTER_AFTER]
DEBUG - 2026-03-01 12:02:53 --> [REQ_ID=0586bc6e11b7] [LIFECYCLE][END] status=200 duration_ms=1,071.18 memory_delta=8388608
INFO - 2026-03-01 12:02:53 --> [REQ_ID=db127980eb7a] [PERF] Execution time=1.070872
DEBUG - 2026-03-01 12:02:53 --> [REQ_ID=0586bc6e11b7] [REQUEST][END]
INFO - 2026-03-01 12:02:53 --> [REQ_ID=0586bc6e11b7] [PERF] Execution time=1.084348
DEBUG - 2026-03-01 12:02:54 --> [REQ_ID=f76fb06e0a0d] [REQUEST][START] GET /index.php/How-It-Works/MyMI-Gold
DEBUG - 2026-03-01 12:02:54 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-01 12:02:54 --> [REQ_ID=f76fb06e0a0d] [FILTER_BEFORE] /index.php/How-It-Works/MyMI-Gold
DEBUG - 2026-03-01 12:02:54 --> [REQ_ID=f76fb06e0a0d] [ROUTE] Controller=\App\Modules\Blog\Controllers\HowItWorksController Method=show
DEBUG - 2026-03-01 12:02:54 --> [REQ_ID=f76fb06e0a0d] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/How-It-Works/MyMI-Gold
DEBUG - 2026-03-01 12:02:54 --> [CSRF] token name=csrf_test_name hash=21baa2c8d6a3bc97b5aab48c4dcb21bf
DEBUG - 2026-03-01 12:02:54 --> [REQ_ID=a2d2a88af859] [INIT] App\Modules\Blog\Controllers\HowItWorksController::GET
INFO - 2026-03-01 12:02:54 --> [REQ_ID=a2d2a88af859] [MEMORY][controller-start] 8388608
DEBUG - 2026-03-01 12:02:54 --> [REQ_ID=a2d2a88af859] [METHOD_ENTRY] show
DEBUG - 2026-03-01 12:02:54 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-01 12:02:54 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-01 12:02:54 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-01 12:02:54 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-01 12:02:54 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-01 12:02:54 --> MyMICoin: guest context detected; skipping user-specific preload.
INFO - 2026-03-01 12:02:54 --> [REQ_ID=a2d2a88af859] [MEMORY][commonData:start] 8388608
DEBUG - 2026-03-01 12:02:55 --> [REQ_ID=a2d2a88af859] [VIEW_RENDER] App\Modules\Blog\Views\HowItWorks\MyMI_Gold
INFO - 2026-03-01 12:02:55 --> [REQ_ID=a2d2a88af859] [MEMORY][commonData:start] 8388608
INFO - 2026-03-01 12:02:55 --> themesMemory usage: 12582912
DEBUG - 2026-03-01 12:02:55 --> [REQ_ID=f76fb06e0a0d] [FILTER_AFTER]
DEBUG - 2026-03-01 12:02:55 --> [REQ_ID=f76fb06e0a0d] [LIFECYCLE][END] status=200 duration_ms=1,037.90 memory_delta=4194304
INFO - 2026-03-01 12:02:55 --> [REQ_ID=a2d2a88af859] [PERF] Execution time=1.037725
DEBUG - 2026-03-01 12:02:55 --> [REQ_ID=f76fb06e0a0d] [REQUEST][END]
INFO - 2026-03-01 12:02:55 --> [REQ_ID=f76fb06e0a0d] [PERF] Execution time=1.048057
DEBUG - 2026-03-01 12:02:57 --> [REQ_ID=5fd039cfe3ec] [REQUEST][START] GET /index.php/How-It-Works/Personal-Budgeting
DEBUG - 2026-03-01 12:02:57 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-01 12:02:57 --> [REQ_ID=5fd039cfe3ec] [FILTER_BEFORE] /index.php/How-It-Works/Personal-Budgeting
DEBUG - 2026-03-01 12:02:57 --> [REQ_ID=5fd039cfe3ec] [ROUTE] Controller=\App\Modules\Blog\Controllers\HowItWorksController Method=show
DEBUG - 2026-03-01 12:02:57 --> [REQ_ID=5fd039cfe3ec] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/How-It-Works/Personal-Budgeting
DEBUG - 2026-03-01 12:02:57 --> [CSRF] token name=csrf_test_name hash=669c8c44409c3ec872d4087d5cfbb3f3
DEBUG - 2026-03-01 12:02:57 --> [REQ_ID=7694e9977d1d] [INIT] App\Modules\Blog\Controllers\HowItWorksController::GET
INFO - 2026-03-01 12:02:57 --> [REQ_ID=7694e9977d1d] [MEMORY][controller-start] 10485760
DEBUG - 2026-03-01 12:02:57 --> [REQ_ID=7694e9977d1d] [METHOD_ENTRY] show
DEBUG - 2026-03-01 12:02:57 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-01 12:02:57 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-01 12:02:57 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-01 12:02:57 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-01 12:02:57 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-01 12:02:57 --> MyMICoin: guest context detected; skipping user-specific preload.
INFO - 2026-03-01 12:02:57 --> [REQ_ID=7694e9977d1d] [MEMORY][commonData:start] 10485760
DEBUG - 2026-03-01 12:02:58 --> [REQ_ID=7694e9977d1d] [VIEW_RENDER] App\Modules\Blog\Views\HowItWorks\Personal_Budgeting
INFO - 2026-03-01 12:02:58 --> [REQ_ID=7694e9977d1d] [MEMORY][commonData:start] 10485760
INFO - 2026-03-01 12:02:58 --> themesMemory usage: 10485760
DEBUG - 2026-03-01 12:02:58 --> [REQ_ID=5fd039cfe3ec] [FILTER_AFTER]
DEBUG - 2026-03-01 12:02:58 --> [REQ_ID=5fd039cfe3ec] [LIFECYCLE][END] status=200 duration_ms=959.47 memory_delta=2097152
INFO - 2026-03-01 12:02:58 --> [REQ_ID=7694e9977d1d] [PERF] Execution time=0.959111
DEBUG - 2026-03-01 12:02:58 --> [REQ_ID=5fd039cfe3ec] [REQUEST][END]
INFO - 2026-03-01 12:02:58 --> [REQ_ID=5fd039cfe3ec] [PERF] Execution time=0.969896
DEBUG - 2026-03-01 12:02:59 --> [REQ_ID=5963b027e14a] [REQUEST][START] POST /index.php/register
DEBUG - 2026-03-01 12:02:59 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-01 12:02:59 --> [REQ_ID=5963b027e14a] [FILTER_BEFORE] /index.php/register
DEBUG - 2026-03-01 12:02:59 --> [REQ_ID=5963b027e14a] [ROUTE] Controller=\App\Controllers\AuthController Method=attemptRegister
DEBUG - 2026-03-01 12:02:59 --> [REQ_ID=5963b027e14a] [LIFECYCLE][START] POST https://www.mymiwallet.com/index.php/register
DEBUG - 2026-03-01 12:02:59 --> [CSRF] token name=csrf_test_name hash=e5fcd0775311abf7bd8e6f180f2896b8
DEBUG - 2026-03-01 12:02:59 --> [REQ_ID=5963b027e14a] [REQUEST][END]
INFO - 2026-03-01 12:02:59 --> [REQ_ID=5963b027e14a] [PERF] Execution time=0.009091
DEBUG - 2026-03-01 12:03:00 --> [REQ_ID=531ec8543e59] [REQUEST][START] GET /index.php/register
DEBUG - 2026-03-01 12:03:00 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-01 12:03:00 --> [REQ_ID=531ec8543e59] [FILTER_BEFORE] /index.php/register
DEBUG - 2026-03-01 12:03:00 --> [REQ_ID=531ec8543e59] [ROUTE] Controller=\App\Controllers\AuthController Method=register
DEBUG - 2026-03-01 12:03:00 --> [REQ_ID=531ec8543e59] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/register
DEBUG - 2026-03-01 12:03:00 --> [CSRF] token name=csrf_test_name hash=4f7ad571fcfd301a97c8f3cbc83da507
DEBUG - 2026-03-01 12:03:00 --> [REQ_ID=66feb8b5ad3a] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-01 12:03:00 --> [REQ_ID=66feb8b5ad3a] [MEMORY][controller-start] 6291456
INFO - 2026-03-01 12:03:00 --> [REGISTRATION] Form loaded
INFO - 2026-03-01 12:03:00 --> [REQ_ID=66feb8b5ad3a] [PERF] Execution time=0.021598
DEBUG - 2026-03-01 12:03:01 --> [REQ_ID=8794e1716bb5] [REQUEST][START] GET /index.php/How-It-Works/Registering-An-Account
DEBUG - 2026-03-01 12:03:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-01 12:03:01 --> [REQ_ID=8794e1716bb5] [FILTER_BEFORE] /index.php/How-It-Works/Registering-An-Account
DEBUG - 2026-03-01 12:03:01 --> [REQ_ID=8794e1716bb5] [ROUTE] Controller=\App\Modules\Blog\Controllers\HowItWorksController Method=show
DEBUG - 2026-03-01 12:03:01 --> [REQ_ID=8794e1716bb5] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/How-It-Works/Registering-An-Account
DEBUG - 2026-03-01 12:03:01 --> [CSRF] token name=csrf_test_name hash=118cdbc700f7ba6e3ced2490cf591a3f
DEBUG - 2026-03-01 12:03:01 --> [REQ_ID=64b99eac374e] [INIT] App\Modules\Blog\Controllers\HowItWorksController::GET
INFO - 2026-03-01 12:03:01 --> [REQ_ID=64b99eac374e] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-01 12:03:01 --> [REQ_ID=64b99eac374e] [METHOD_ENTRY] show
DEBUG - 2026-03-01 12:03:01 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-01 12:03:01 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-01 12:03:01 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-01 12:03:01 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-01 12:03:01 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-01 12:03:01 --> MyMICoin: guest context detected; skipping user-specific preload.
INFO - 2026-03-01 12:03:01 --> [REQ_ID=64b99eac374e] [MEMORY][commonData:start] 4194304
DEBUG - 2026-03-01 12:03:02 --> [REQ_ID=64b99eac374e] [VIEW_RENDER] App\Modules\Blog\Views\HowItWorks\Registering_An_Account
INFO - 2026-03-01 12:03:02 --> [REQ_ID=64b99eac374e] [MEMORY][commonData:start] 8388608
INFO - 2026-03-01 12:03:03 --> themesMemory usage: 10485760
DEBUG - 2026-03-01 12:03:03 --> [REQ_ID=8794e1716bb5] [FILTER_AFTER]
DEBUG - 2026-03-01 12:03:03 --> [REQ_ID=8794e1716bb5] [LIFECYCLE][END] status=200 duration_ms=1,087.01 memory_delta=6291456
INFO - 2026-03-01 12:03:03 --> [REQ_ID=64b99eac374e] [PERF] Execution time=1.086818
DEBUG - 2026-03-01 12:03:03 --> [REQ_ID=8794e1716bb5] [REQUEST][END]
INFO - 2026-03-01 12:03:03 --> [REQ_ID=8794e1716bb5] [PERF] Execution time=1.096691
DEBUG - 2026-03-01 12:03:05 --> [REQ_ID=3ce09f3e9a3e] [REQUEST][START] GET /index.php/How-It-Works/Setting-Financial-Goals
DEBUG - 2026-03-01 12:03:05 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-01 12:03:05 --> [REQ_ID=3ce09f3e9a3e] [FILTER_BEFORE] /index.php/How-It-Works/Setting-Financial-Goals
DEBUG - 2026-03-01 12:03:05 --> [REQ_ID=3ce09f3e9a3e] [ROUTE] Controller=\App\Modules\Blog\Controllers\HowItWorksController Method=show
DEBUG - 2026-03-01 12:03:05 --> [REQ_ID=3ce09f3e9a3e] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/How-It-Works/Setting-Financial-Goals
DEBUG - 2026-03-01 12:03:05 --> [CSRF] token name=csrf_test_name hash=5702da56e9f8952b29c65370fe6cb75f
DEBUG - 2026-03-01 12:03:05 --> [REQ_ID=8f37dd3fc73b] [INIT] App\Modules\Blog\Controllers\HowItWorksController::GET
INFO - 2026-03-01 12:03:05 --> [REQ_ID=8f37dd3fc73b] [MEMORY][controller-start] 8388608
DEBUG - 2026-03-01 12:03:05 --> [REQ_ID=8f37dd3fc73b] [METHOD_ENTRY] show
DEBUG - 2026-03-01 12:03:05 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-01 12:03:05 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-01 12:03:05 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-01 12:03:05 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-01 12:03:05 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-01 12:03:05 --> MyMICoin: guest context detected; skipping user-specific preload.
INFO - 2026-03-01 12:03:05 --> [REQ_ID=8f37dd3fc73b] [MEMORY][commonData:start] 8388608
DEBUG - 2026-03-01 12:03:05 --> [REQ_ID=8f37dd3fc73b] [VIEW_RENDER] App\Modules\Blog\Views\HowItWorks\Determining_Your_Financial_Goals
INFO - 2026-03-01 12:03:05 --> [REQ_ID=8f37dd3fc73b] [MEMORY][commonData:start] 8388608
INFO - 2026-03-01 12:03:06 --> themesMemory usage: 10485760
DEBUG - 2026-03-01 12:03:06 --> [REQ_ID=3ce09f3e9a3e] [FILTER_AFTER]
DEBUG - 2026-03-01 12:03:06 --> [REQ_ID=3ce09f3e9a3e] [LIFECYCLE][END] status=200 duration_ms=1,032.99 memory_delta=2097152
INFO - 2026-03-01 12:03:06 --> [REQ_ID=8f37dd3fc73b] [PERF] Execution time=1.032702
DEBUG - 2026-03-01 12:03:06 --> [REQ_ID=3ce09f3e9a3e] [REQUEST][END]
INFO - 2026-03-01 12:03:06 --> [REQ_ID=3ce09f3e9a3e] [PERF] Execution time=1.043549
DEBUG - 2026-03-01 12:03:08 --> [REQ_ID=5ab567d779c8] [REQUEST][START] POST /index.php/register
DEBUG - 2026-03-01 12:03:08 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-01 12:03:08 --> [REQ_ID=5ab567d779c8] [FILTER_BEFORE] /index.php/register
DEBUG - 2026-03-01 12:03:08 --> [REQ_ID=5ab567d779c8] [ROUTE] Controller=\App\Controllers\AuthController Method=attemptRegister
DEBUG - 2026-03-01 12:03:08 --> [REQ_ID=5ab567d779c8] [LIFECYCLE][START] POST https://www.mymiwallet.com/index.php/register
DEBUG - 2026-03-01 12:03:08 --> [CSRF] token name=csrf_test_name hash=8b0e6836cb2a2db54941bca90bb04c6e
DEBUG - 2026-03-01 12:03:08 --> [REQ_ID=5ab567d779c8] [REQUEST][END]
INFO - 2026-03-01 12:03:08 --> [REQ_ID=5ab567d779c8] [PERF] Execution time=0.009747
DEBUG - 2026-03-01 12:03:09 --> [REQ_ID=420d2cd943fa] [REQUEST][START] GET /index.php/register
DEBUG - 2026-03-01 12:03:09 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-01 12:03:09 --> [REQ_ID=420d2cd943fa] [FILTER_BEFORE] /index.php/register
DEBUG - 2026-03-01 12:03:09 --> [REQ_ID=420d2cd943fa] [ROUTE] Controller=\App\Controllers\AuthController Method=register
DEBUG - 2026-03-01 12:03:09 --> [REQ_ID=420d2cd943fa] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/register
DEBUG - 2026-03-01 12:03:09 --> [CSRF] token name=csrf_test_name hash=baa7ac097ac1c6554ba575172af18b71
DEBUG - 2026-03-01 12:03:09 --> [REQ_ID=9139d1173741] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-01 12:03:09 --> [REQ_ID=9139d1173741] [MEMORY][controller-start] 6291456
INFO - 2026-03-01 12:03:09 --> [REGISTRATION] Form loaded
INFO - 2026-03-01 12:03:09 --> [REQ_ID=9139d1173741] [PERF] Execution time=0.029696
DEBUG - 2026-03-01 12:03:10 --> [REQ_ID=b224e7b7b6d8] [REQUEST][START] GET /index.php/Knowledgebase
DEBUG - 2026-03-01 12:03:10 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-01 12:03:10 --> [REQ_ID=b224e7b7b6d8] [FILTER_BEFORE] /index.php/Knowledgebase
DEBUG - 2026-03-01 12:03:10 --> [REQ_ID=b224e7b7b6d8] [ROUTE] Controller=\App\Modules\User\Controllers\KnowledgebaseController Method=index
DEBUG - 2026-03-01 12:03:10 --> [REQ_ID=b224e7b7b6d8] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Knowledgebase
DEBUG - 2026-03-01 12:03:10 --> [CSRF] token name=csrf_test_name hash=52e0e9cde5e884959425c6032ad0788e
DEBUG - 2026-03-01 12:03:10 --> [REQ_ID=b224e7b7b6d8] [REQUEST][END]
INFO - 2026-03-01 12:03:10 --> [REQ_ID=b224e7b7b6d8] [PERF] Execution time=0.010999
DEBUG - 2026-03-01 12:03:11 --> [REQ_ID=abd7c585c1e9] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-01 12:03:11 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-01 12:03:11 --> [REQ_ID=abd7c585c1e9] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-01 12:03:11 --> [REQ_ID=abd7c585c1e9] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-01 12:03:11 --> [REQ_ID=abd7c585c1e9] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-01 12:03:11 --> [CSRF] token name=csrf_test_name hash=a65485094b3650e9595cc900bc865e48
DEBUG - 2026-03-01 12:03:11 --> [REQ_ID=5ad8b2278605] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-01 12:03:11 --> [REQ_ID=5ad8b2278605] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-01 12:03:11 --> [REQ_ID=abd7c585c1e9] [FILTER_AFTER]
DEBUG - 2026-03-01 12:03:11 --> [REQ_ID=abd7c585c1e9] [LIFECYCLE][END] status=200 duration_ms=19.16 memory_delta=0
INFO - 2026-03-01 12:03:11 --> [REQ_ID=5ad8b2278605] [PERF] Execution time=0.018927
DEBUG - 2026-03-01 12:03:11 --> [REQ_ID=abd7c585c1e9] [REQUEST][END]
INFO - 2026-03-01 12:03:11 --> [REQ_ID=abd7c585c1e9] [PERF] Execution time=0.029235
DEBUG - 2026-03-01 12:03:12 --> [REQ_ID=019bdb4017f3] [REQUEST][START] GET /index.php/Legal/Privacy-Policy
DEBUG - 2026-03-01 12:03:12 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-01 12:03:12 --> [REQ_ID=019bdb4017f3] [FILTER_BEFORE] /index.php/Legal/Privacy-Policy
DEBUG - 2026-03-01 12:03:12 --> [REQ_ID=019bdb4017f3] [ROUTE] Controller=\App\Controllers\Home Method=privacyPolicy
DEBUG - 2026-03-01 12:03:12 --> [REQ_ID=019bdb4017f3] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Legal/Privacy-Policy
DEBUG - 2026-03-01 12:03:12 --> [CSRF] token name=csrf_test_name hash=834f81258a3643253579a873f82c985c
DEBUG - 2026-03-01 12:03:12 --> [REQ_ID=019bdb4017f3] [REQUEST][END]
INFO - 2026-03-01 12:03:12 --> [REQ_ID=019bdb4017f3] [PERF] Execution time=0.014750
DEBUG - 2026-03-01 12:03:12 --> [REQ_ID=f2d54f9232b6] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-01 12:03:12 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-01 12:03:12 --> [REQ_ID=f2d54f9232b6] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-01 12:03:12 --> [REQ_ID=f2d54f9232b6] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-01 12:03:12 --> [REQ_ID=f2d54f9232b6] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-01 12:03:12 --> [CSRF] token name=csrf_test_name hash=5a58c1a33ee3eae07fd1dd4e2a50c2fe
DEBUG - 2026-03-01 12:03:12 --> [REQ_ID=4752254f43cd] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-01 12:03:12 --> [REQ_ID=4752254f43cd] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-01 12:03:12 --> [REQ_ID=f2d54f9232b6] [FILTER_AFTER]
DEBUG - 2026-03-01 12:03:12 --> [REQ_ID=f2d54f9232b6] [LIFECYCLE][END] status=200 duration_ms=28.03 memory_delta=0
INFO - 2026-03-01 12:03:12 --> [REQ_ID=4752254f43cd] [PERF] Execution time=0.027869
DEBUG - 2026-03-01 12:03:12 --> [REQ_ID=f2d54f9232b6] [REQUEST][END]
INFO - 2026-03-01 12:03:12 --> [REQ_ID=f2d54f9232b6] [PERF] Execution time=0.039813
DEBUG - 2026-03-01 12:03:13 --> [REQ_ID=9bbc4f3aaa25] [REQUEST][START] GET /index.php/Legal/Terms-And-Conditions
DEBUG - 2026-03-01 12:03:13 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-01 12:03:13 --> [REQ_ID=9bbc4f3aaa25] [FILTER_BEFORE] /index.php/Legal/Terms-And-Conditions
DEBUG - 2026-03-01 12:03:13 --> [REQ_ID=9bbc4f3aaa25] [ROUTE] Controller=\App\Controllers\Home Method=terms
DEBUG - 2026-03-01 12:03:13 --> [REQ_ID=9bbc4f3aaa25] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Legal/Terms-And-Conditions
DEBUG - 2026-03-01 12:03:13 --> [CSRF] token name=csrf_test_name hash=09039a8fa2caf4da20b5bc66030ddd76
DEBUG - 2026-03-01 12:03:13 --> [REQ_ID=9bbc4f3aaa25] [REQUEST][END]
INFO - 2026-03-01 12:03:13 --> [REQ_ID=9bbc4f3aaa25] [PERF] Execution time=0.009658
DEBUG - 2026-03-01 12:03:14 --> [REQ_ID=53f4db0622b4] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-01 12:03:14 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-01 12:03:14 --> [REQ_ID=53f4db0622b4] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-01 12:03:14 --> [REQ_ID=53f4db0622b4] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-01 12:03:14 --> [REQ_ID=53f4db0622b4] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-01 12:03:14 --> [CSRF] token name=csrf_test_name hash=186429b15fde28b81bbece71cb62ede0
DEBUG - 2026-03-01 12:03:14 --> [REQ_ID=719bc0e41e02] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-01 12:03:14 --> [REQ_ID=719bc0e41e02] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-01 12:03:14 --> [REQ_ID=53f4db0622b4] [FILTER_AFTER]
DEBUG - 2026-03-01 12:03:14 --> [REQ_ID=53f4db0622b4] [LIFECYCLE][END] status=200 duration_ms=16.34 memory_delta=0
INFO - 2026-03-01 12:03:14 --> [REQ_ID=719bc0e41e02] [PERF] Execution time=0.016211
DEBUG - 2026-03-01 12:03:14 --> [REQ_ID=53f4db0622b4] [REQUEST][END]
INFO - 2026-03-01 12:03:14 --> [REQ_ID=53f4db0622b4] [PERF] Execution time=0.025773
DEBUG - 2026-03-01 12:03:15 --> [REQ_ID=a3f22f3cc330] [REQUEST][START] GET /index.php/Privacy-Policy
DEBUG - 2026-03-01 12:03:15 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-01 12:03:15 --> [REQ_ID=a3f22f3cc330] [FILTER_BEFORE] /index.php/Privacy-Policy
DEBUG - 2026-03-01 12:03:15 --> [REQ_ID=a3f22f3cc330] [ROUTE] Controller=\App\Controllers\Home Method=privacyPolicy
DEBUG - 2026-03-01 12:03:15 --> [REQ_ID=a3f22f3cc330] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Privacy-Policy
DEBUG - 2026-03-01 12:03:15 --> [CSRF] token name=csrf_test_name hash=15123b57573eef9940258e989918a5cb
DEBUG - 2026-03-01 12:03:15 --> [REQ_ID=df90488da78a] [INIT] App\Controllers\Home::GET
INFO - 2026-03-01 12:03:15 --> [REQ_ID=df90488da78a] [MEMORY][controller-start] 4194304
INFO - 2026-03-01 12:03:15 --> [REQ_ID=df90488da78a] [MEMORY][commonData:start] 4194304
DEBUG - 2026-03-01 12:03:15 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-01 12:03:15 --> [MetaService] slug=privacy-policy pageName= cacheHit= path=DB
DEBUG - 2026-03-01 12:03:15 --> [REQ_ID=df90488da78a] [VIEW_RENDER] themes/public/privacyPolicy
INFO - 2026-03-01 12:03:15 --> [REQ_ID=df90488da78a] [MEMORY][commonData:start] 8388608
INFO - 2026-03-01 12:03:15 --> themesMemory usage: 8388608
DEBUG - 2026-03-01 12:03:15 --> [MetaService] slug=privacy-policy pageName=Privacy Policy cacheHit= path=DB
DEBUG - 2026-03-01 12:03:15 --> [REQ_ID=a3f22f3cc330] [FILTER_AFTER]
DEBUG - 2026-03-01 12:03:15 --> [REQ_ID=a3f22f3cc330] [LIFECYCLE][END] status=200 duration_ms=543.63 memory_delta=4194304
INFO - 2026-03-01 12:03:15 --> [REQ_ID=df90488da78a] [PERF] Execution time=0.543342
DEBUG - 2026-03-01 12:03:15 --> [REQ_ID=a3f22f3cc330] [REQUEST][END]
INFO - 2026-03-01 12:03:15 --> [REQ_ID=a3f22f3cc330] [PERF] Execution time=0.554807
DEBUG - 2026-03-01 12:03:17 --> [REQ_ID=d3f6641f22fe] [REQUEST][START] GET /index.php/Support
DEBUG - 2026-03-01 12:03:17 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-01 12:03:17 --> [REQ_ID=d3f6641f22fe] [FILTER_BEFORE] /index.php/Support
DEBUG - 2026-03-01 12:03:17 --> [REQ_ID=d3f6641f22fe] [ROUTE] Controller=\App\Modules\Support\Controllers\SupportController Method=index
DEBUG - 2026-03-01 12:03:17 --> [REQ_ID=d3f6641f22fe] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Support
DEBUG - 2026-03-01 12:03:17 --> [CSRF] token name=csrf_test_name hash=3d7494f948d364948bfb6753ccf80961
DEBUG - 2026-03-01 12:03:17 --> [REQ_ID=b8c0a7a2316a] [INIT] App\Modules\Support\Controllers\SupportController::GET
INFO - 2026-03-01 12:03:17 --> [REQ_ID=b8c0a7a2316a] [MEMORY][controller-start] 6291456
DEBUG - 2026-03-01 12:03:17 --> [REQ_ID=b8c0a7a2316a] [METHOD_ENTRY] index
DEBUG - 2026-03-01 12:03:17 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-01 12:03:17 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-01 12:03:17 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-01 12:03:17 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-01 12:03:17 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-01 12:03:17 --> MyMICoin: guest context detected; skipping user-specific preload.
INFO - 2026-03-01 12:03:17 --> [REQ_ID=b8c0a7a2316a] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-01 12:03:17 --> [REQ_ID=b8c0a7a2316a] [VIEW_RENDER] SupportModule\Views\Support\index
INFO - 2026-03-01 12:03:17 --> [REQ_ID=b8c0a7a2316a] [MEMORY][commonData:start] 6291456
INFO - 2026-03-01 12:03:17 --> themesMemory usage: 6291456
DEBUG - 2026-03-01 12:03:17 --> [REQ_ID=d3f6641f22fe] [FILTER_AFTER]
DEBUG - 2026-03-01 12:03:17 --> [REQ_ID=d3f6641f22fe] [LIFECYCLE][END] status=200 duration_ms=31.69 memory_delta=0
INFO - 2026-03-01 12:03:17 --> [REQ_ID=b8c0a7a2316a] [PERF] Execution time=0.031504
DEBUG - 2026-03-01 12:03:17 --> [REQ_ID=d3f6641f22fe] [REQUEST][END]
INFO - 2026-03-01 12:03:17 --> [REQ_ID=d3f6641f22fe] [PERF] Execution time=0.042352
DEBUG - 2026-03-01 12:03:18 --> [REQ_ID=963424d475d0] [REQUEST][START] GET /index.php/Terms-Of-Service
DEBUG - 2026-03-01 12:03:18 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-01 12:03:18 --> [REQ_ID=963424d475d0] [FILTER_BEFORE] /index.php/Terms-Of-Service
DEBUG - 2026-03-01 12:03:18 --> [REQ_ID=963424d475d0] [ROUTE] Controller=\App\Controllers\Home Method=termsOfService
DEBUG - 2026-03-01 12:03:18 --> [REQ_ID=963424d475d0] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Terms-Of-Service
DEBUG - 2026-03-01 12:03:18 --> [CSRF] token name=csrf_test_name hash=7f51d6398b0dc3c72d98b7b357a0db44
DEBUG - 2026-03-01 12:03:18 --> [REQ_ID=073a372c7f77] [INIT] App\Controllers\Home::GET
INFO - 2026-03-01 12:03:18 --> [REQ_ID=073a372c7f77] [MEMORY][controller-start] 4194304
INFO - 2026-03-01 12:03:18 --> [REQ_ID=073a372c7f77] [MEMORY][commonData:start] 4194304
DEBUG - 2026-03-01 12:03:18 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-01 12:03:19 --> [MetaService] slug=terms-of-service pageName= cacheHit= path=DB
DEBUG - 2026-03-01 12:03:19 --> [REQ_ID=073a372c7f77] [VIEW_RENDER] themes/public/termsOfService
INFO - 2026-03-01 12:03:19 --> [REQ_ID=073a372c7f77] [MEMORY][commonData:start] 8388608
INFO - 2026-03-01 12:03:19 --> themesMemory usage: 8388608
DEBUG - 2026-03-01 12:03:19 --> [MetaService] slug=terms-of-service pageName=Terms of Service cacheHit= path=DB
DEBUG - 2026-03-01 12:03:19 --> [REQ_ID=963424d475d0] [FILTER_AFTER]
DEBUG - 2026-03-01 12:03:19 --> [REQ_ID=963424d475d0] [LIFECYCLE][END] status=200 duration_ms=531.98 memory_delta=4194304
INFO - 2026-03-01 12:03:19 --> [REQ_ID=073a372c7f77] [PERF] Execution time=0.531720
DEBUG - 2026-03-01 12:03:19 --> [REQ_ID=963424d475d0] [REQUEST][END]
INFO - 2026-03-01 12:03:19 --> [REQ_ID=963424d475d0] [PERF] Execution time=0.540605
DEBUG - 2026-03-01 12:03:20 --> [REQ_ID=321e3d45a624] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-01 12:03:20 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-01 12:03:20 --> [REQ_ID=321e3d45a624] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-01 12:03:20 --> [REQ_ID=321e3d45a624] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-01 12:03:20 --> [REQ_ID=321e3d45a624] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-01 12:03:20 --> [CSRF] token name=csrf_test_name hash=4ee786bc2d7930a8ff25c5f1f0d1a3e0
DEBUG - 2026-03-01 12:03:20 --> [REQ_ID=6f3f04b666e8] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-01 12:03:20 --> [REQ_ID=6f3f04b666e8] [MEMORY][controller-start] 6291456
DEBUG - 2026-03-01 12:03:20 --> [REQ_ID=321e3d45a624] [FILTER_AFTER]
DEBUG - 2026-03-01 12:03:20 --> [REQ_ID=321e3d45a624] [LIFECYCLE][END] status=200 duration_ms=14.49 memory_delta=0
INFO - 2026-03-01 12:03:20 --> [REQ_ID=6f3f04b666e8] [PERF] Execution time=0.014131
DEBUG - 2026-03-01 12:03:20 --> [REQ_ID=321e3d45a624] [REQUEST][END]
INFO - 2026-03-01 12:03:20 --> [REQ_ID=321e3d45a624] [PERF] Execution time=0.024566
INFO - 2026-03-01 12:15:01 --> [spark:ops:work] Started
INFO - 2026-03-01 12:15:01 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-03-01 12:15:01 --> [SPARK_MEMORY] 16777216
INFO - 2026-03-01 12:15:01 --> [spark:ops:work] Intent
DEBUG - 2026-03-01 12:15:01 --> [REQ_ID=93720656aad8] [REQUEST][START] GET /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-01 12:15:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
INFO - 2026-03-01 12:15:01 --> [spark:ops:work] Completed
INFO - 2026-03-01 12:15:01 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.141252
INFO - 2026-03-01 12:15:01 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-03-01 12:15:01 --> [REQ_ID=93720656aad8] [FILTER_BEFORE] /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-01 12:15:01 --> [REQ_ID=93720656aad8] [ROUTE] Controller=\App\Modules\APIs\Controllers\AlertsAPIController Method=fetchEmailAlerts
DEBUG - 2026-03-01 12:15:01 --> [REQ_ID=93720656aad8] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-01 12:15:01 --> [REQ_ID=93720656aad8] [REQUEST][END]
INFO - 2026-03-01 12:15:01 --> [REQ_ID=93720656aad8] [PERF] Execution time=0.056019
DEBUG - 2026-03-01 12:26:41 --> [REQ_ID=4cd016df92e8] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-01 12:26:41 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-01 12:26:41 --> [REQ_ID=4cd016df92e8] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-01 12:26:41 --> [REQ_ID=4cd016df92e8] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-01 12:26:41 --> [REQ_ID=4cd016df92e8] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-01 12:26:41 --> [CSRF] token name=csrf_test_name hash=209c868cad3728f74fc6de24e4958c8c
DEBUG - 2026-03-01 12:26:41 --> [REQ_ID=f48eb1d132f4] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-01 12:26:41 --> [REQ_ID=f48eb1d132f4] [MEMORY][controller-start] 6291456
DEBUG - 2026-03-01 12:26:41 --> [REQ_ID=4cd016df92e8] [FILTER_AFTER]
DEBUG - 2026-03-01 12:26:41 --> [REQ_ID=4cd016df92e8] [LIFECYCLE][END] status=200 duration_ms=49.71 memory_delta=0
INFO - 2026-03-01 12:26:41 --> [REQ_ID=f48eb1d132f4] [PERF] Execution time=0.046940
DEBUG - 2026-03-01 12:26:41 --> [REQ_ID=4cd016df92e8] [REQUEST][END]
INFO - 2026-03-01 12:26:41 --> [REQ_ID=4cd016df92e8] [PERF] Execution time=0.100245
INFO - 2026-03-01 12:30:01 --> [spark:ops:work] Started
INFO - 2026-03-01 12:30:01 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-03-01 12:30:01 --> [SPARK_MEMORY] 16777216
INFO - 2026-03-01 12:30:01 --> [spark:ops:work] Intent
INFO - 2026-03-01 12:30:01 --> [spark:ops:work] Completed
INFO - 2026-03-01 12:30:01 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.087066
INFO - 2026-03-01 12:30:01 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-03-01 12:33:51 --> [REQ_ID=d9b30f504158] [REQUEST][START] GET /
DEBUG - 2026-03-01 12:33:51 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-01 12:33:51 --> [REQ_ID=d9b30f504158] [FILTER_BEFORE] /
DEBUG - 2026-03-01 12:33:51 --> [REQ_ID=d9b30f504158] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-01 12:33:51 --> [REQ_ID=d9b30f504158] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-01 12:33:51 --> [CSRF] token name=csrf_test_name hash=2f6d28c0b1d22c17dcbe3ce438e22a9c
DEBUG - 2026-03-01 12:33:51 --> [REQ_ID=9890bd511a06] [INIT] App\Controllers\Home::GET
INFO - 2026-03-01 12:33:51 --> [REQ_ID=9890bd511a06] [MEMORY][controller-start] 6291456
INFO - 2026-03-01 12:33:52 --> [REQ_ID=9890bd511a06] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-01 12:33:52 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-01 12:33:52 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-03-01 12:33:52 --> [REQ_ID=9890bd511a06] [VIEW_RENDER] themes/public/home
INFO - 2026-03-01 12:33:52 --> [REQ_ID=9890bd511a06] [MEMORY][commonData:start] 10485760
INFO - 2026-03-01 12:33:52 --> themesMemory usage: 10485760
DEBUG - 2026-03-01 12:33:52 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-01 12:33:52 --> [REQ_ID=d9b30f504158] [FILTER_AFTER]
DEBUG - 2026-03-01 12:33:52 --> [REQ_ID=d9b30f504158] [LIFECYCLE][END] status=200 duration_ms=619.23 memory_delta=4194304
INFO - 2026-03-01 12:33:52 --> [REQ_ID=9890bd511a06] [PERF] Execution time=0.617120
DEBUG - 2026-03-01 12:33:52 --> [REQ_ID=d9b30f504158] [REQUEST][END]
INFO - 2026-03-01 12:33:52 --> [REQ_ID=d9b30f504158] [PERF] Execution time=0.660109
INFO - 2026-03-01 12:45:01 --> [spark:ops:work] Started
INFO - 2026-03-01 12:45:01 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-03-01 12:45:01 --> [SPARK_MEMORY] 16777216
INFO - 2026-03-01 12:45:01 --> [spark:ops:work] Intent
INFO - 2026-03-01 12:45:01 --> [spark:ops:work] Completed
INFO - 2026-03-01 12:45:01 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.043543
INFO - 2026-03-01 12:45:01 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-03-01 12:55:21 --> [REQ_ID=975b28ee9466] [REQUEST][START] GET /
DEBUG - 2026-03-01 12:55:21 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-01 12:55:21 --> [REQ_ID=975b28ee9466] [FILTER_BEFORE] /
DEBUG - 2026-03-01 12:55:21 --> [REQ_ID=975b28ee9466] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-01 12:55:21 --> [REQ_ID=975b28ee9466] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-01 12:55:21 --> [CSRF] token name=csrf_test_name hash=671682d84b1056f538f8acdefc758bea
DEBUG - 2026-03-01 12:55:21 --> [REQ_ID=7c75056b5e33] [INIT] App\Controllers\Home::GET
INFO - 2026-03-01 12:55:21 --> [REQ_ID=7c75056b5e33] [MEMORY][controller-start] 6291456
INFO - 2026-03-01 12:55:21 --> [REQ_ID=7c75056b5e33] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-01 12:55:21 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-01 12:55:21 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-03-01 12:55:21 --> [REQ_ID=7c75056b5e33] [VIEW_RENDER] themes/public/home
INFO - 2026-03-01 12:55:21 --> [REQ_ID=7c75056b5e33] [MEMORY][commonData:start] 10485760
INFO - 2026-03-01 12:55:21 --> themesMemory usage: 10485760
DEBUG - 2026-03-01 12:55:21 --> [MetaService] slug= pageName=Home cacheHit= path=DB
DEBUG - 2026-03-01 12:55:21 --> [REQ_ID=975b28ee9466] [FILTER_AFTER]
DEBUG - 2026-03-01 12:55:21 --> [REQ_ID=975b28ee9466] [LIFECYCLE][END] status=200 duration_ms=601.34 memory_delta=4194304
INFO - 2026-03-01 12:55:21 --> [REQ_ID=7c75056b5e33] [PERF] Execution time=0.599493
DEBUG - 2026-03-01 12:55:21 --> [REQ_ID=975b28ee9466] [REQUEST][END]
INFO - 2026-03-01 12:55:21 --> [REQ_ID=975b28ee9466] [PERF] Execution time=0.639765
DEBUG - 2026-03-01 13:00:01 --> [REQ_ID=16020cbb6d4d] [REQUEST][START] GET /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-01 13:00:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
INFO - 2026-03-01 13:00:01 --> [spark:ops:work] Started
INFO - 2026-03-01 13:00:02 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-03-01 13:00:02 --> [SPARK_MEMORY] 16777216
INFO - 2026-03-01 13:00:02 --> [spark:ops:work] Intent
DEBUG - 2026-03-01 13:00:02 --> [REQ_ID=16020cbb6d4d] [FILTER_BEFORE] /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-01 13:00:02 --> [REQ_ID=16020cbb6d4d] [ROUTE] Controller=\App\Modules\Management\Controllers\ManagementAPIController Method=Run_CRON_Tasks
DEBUG - 2026-03-01 13:00:02 --> [REQ_ID=16020cbb6d4d] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-01 13:00:02 --> [REQ_ID=16020cbb6d4d] [REQUEST][END]
INFO - 2026-03-01 13:00:02 --> [REQ_ID=16020cbb6d4d] [PERF] Execution time=0.067996
INFO - 2026-03-01 13:00:02 --> [spark:ops:work] Completed
INFO - 2026-03-01 13:00:02 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.041018
INFO - 2026-03-01 13:00:02 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-03-01 13:03:09 --> [REQ_ID=9d52e9d4e0bb] [REQUEST][START] GET /index.php
DEBUG - 2026-03-01 13:03:09 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-01 13:03:09 --> [REQ_ID=9d52e9d4e0bb] [FILTER_BEFORE] /index.php
DEBUG - 2026-03-01 13:03:09 --> [REQ_ID=9d52e9d4e0bb] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-01 13:03:09 --> [REQ_ID=9d52e9d4e0bb] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-01 13:03:09 --> [CSRF] token name=csrf_test_name hash=7ecffc5e7e9d46559dd56aee532765de
DEBUG - 2026-03-01 13:03:09 --> [REQ_ID=93074a0a21b9] [INIT] App\Controllers\Home::GET
INFO - 2026-03-01 13:03:09 --> [REQ_ID=93074a0a21b9] [MEMORY][controller-start] 6291456
INFO - 2026-03-01 13:03:09 --> [REQ_ID=93074a0a21b9] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-01 13:03:09 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-01 13:03:10 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
DEBUG - 2026-03-01 13:03:10 --> [REQ_ID=93074a0a21b9] [VIEW_RENDER] themes/public/home
INFO - 2026-03-01 13:03:10 --> [REQ_ID=93074a0a21b9] [MEMORY][commonData:start] 10485760
INFO - 2026-03-01 13:03:10 --> themesMemory usage: 10485760
DEBUG - 2026-03-01 13:03:10 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-01 13:03:10 --> [REQ_ID=9d52e9d4e0bb] [FILTER_AFTER]
DEBUG - 2026-03-01 13:03:10 --> [REQ_ID=9d52e9d4e0bb] [LIFECYCLE][END] status=200 duration_ms=654.18 memory_delta=4194304
INFO - 2026-03-01 13:03:10 --> [REQ_ID=93074a0a21b9] [PERF] Execution time=0.651846
DEBUG - 2026-03-01 13:03:10 --> [REQ_ID=9d52e9d4e0bb] [REQUEST][END]
INFO - 2026-03-01 13:03:10 --> [REQ_ID=9d52e9d4e0bb] [PERF] Execution time=0.692228
INFO - 2026-03-01 13:15:01 --> [spark:ops:work] Started
INFO - 2026-03-01 13:15:01 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-03-01 13:15:01 --> [SPARK_MEMORY] 16777216
INFO - 2026-03-01 13:15:01 --> [spark:ops:work] Intent
INFO - 2026-03-01 13:15:01 --> [spark:ops:work] Completed
INFO - 2026-03-01 13:15:01 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.046107
INFO - 2026-03-01 13:15:01 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-03-01 13:15:02 --> [REQ_ID=ad473713f42e] [REQUEST][START] GET /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-01 13:15:02 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-01 13:15:02 --> [REQ_ID=ad473713f42e] [FILTER_BEFORE] /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-01 13:15:02 --> [REQ_ID=ad473713f42e] [ROUTE] Controller=\App\Modules\APIs\Controllers\AlertsAPIController Method=fetchEmailAlerts
DEBUG - 2026-03-01 13:15:02 --> [REQ_ID=ad473713f42e] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-01 13:15:02 --> [REQ_ID=ad473713f42e] [REQUEST][END]
INFO - 2026-03-01 13:15:02 --> [REQ_ID=ad473713f42e] [PERF] Execution time=0.059866
DEBUG - 2026-03-01 13:18:52 --> [REQ_ID=5c0d35137ab0] [REQUEST][START] GET /index.php/Premium-Features/Wallets
DEBUG - 2026-03-01 13:18:52 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-01 13:18:52 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: GET, Route: Premium-Features/Wallets]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-01 13:18:53 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-01 13:18:53 --> [404] URI=https://www.mymiwallet.com/index.php/Premium-Features/Wallets
WARNING - 2026-03-01 13:18:53 --> 404 route miss: https://www.mymiwallet.com/index.php/Premium-Features/Wallets | referrer: https://www.mymiwallet.com/index.php/How-It-Works/MyMI-Gold
ERROR - 2026-03-01 13:18:53 --> [ERROR_PAGE] event=error_404 status=404 message=Page not found.
DEBUG - 2026-03-01 13:20:15 --> [REQ_ID=331f8029f9fd] [REQUEST][START] GET /index.php/How-It-Works/Personal-Budgeting
DEBUG - 2026-03-01 13:20:15 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-01 13:20:15 --> [REQ_ID=331f8029f9fd] [FILTER_BEFORE] /index.php/How-It-Works/Personal-Budgeting
DEBUG - 2026-03-01 13:20:15 --> [REQ_ID=331f8029f9fd] [ROUTE] Controller=\App\Modules\Blog\Controllers\HowItWorksController Method=show
DEBUG - 2026-03-01 13:20:15 --> [REQ_ID=331f8029f9fd] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/How-It-Works/Personal-Budgeting
DEBUG - 2026-03-01 13:20:15 --> [CSRF] token name=csrf_test_name hash=4c7804ea161ee2687546f44c67993e46
DEBUG - 2026-03-01 13:20:15 --> [REQ_ID=3823755e0d59] [INIT] App\Modules\Blog\Controllers\HowItWorksController::GET
INFO - 2026-03-01 13:20:15 --> [REQ_ID=3823755e0d59] [MEMORY][controller-start] 6291456
DEBUG - 2026-03-01 13:20:15 --> [REQ_ID=3823755e0d59] [METHOD_ENTRY] show
DEBUG - 2026-03-01 13:20:15 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-01 13:20:15 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-01 13:20:15 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-01 13:20:15 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-01 13:20:15 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-01 13:20:15 --> MyMICoin: guest context detected; skipping user-specific preload.
INFO - 2026-03-01 13:20:15 --> [REQ_ID=3823755e0d59] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-01 13:20:16 --> [REQ_ID=3823755e0d59] [VIEW_RENDER] App\Modules\Blog\Views\HowItWorks\Personal_Budgeting
INFO - 2026-03-01 13:20:16 --> [REQ_ID=3823755e0d59] [MEMORY][commonData:start] 10485760
INFO - 2026-03-01 13:20:16 --> themesMemory usage: 14680064
DEBUG - 2026-03-01 13:20:16 --> [REQ_ID=331f8029f9fd] [FILTER_AFTER]
DEBUG - 2026-03-01 13:20:16 --> [REQ_ID=331f8029f9fd] [LIFECYCLE][END] status=200 duration_ms=1,343.96 memory_delta=8388608
INFO - 2026-03-01 13:20:16 --> [REQ_ID=3823755e0d59] [PERF] Execution time=1.339064
DEBUG - 2026-03-01 13:20:16 --> [REQ_ID=331f8029f9fd] [REQUEST][END]
INFO - 2026-03-01 13:20:16 --> [REQ_ID=331f8029f9fd] [PERF] Execution time=1.400915
DEBUG - 2026-03-01 13:29:34 --> [REQ_ID=590af2e08039] [REQUEST][START] GET /index.php/Exchange/Solana/Import/Wallet
DEBUG - 2026-03-01 13:29:34 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-01 13:29:34 --> [REQ_ID=590af2e08039] [FILTER_BEFORE] /index.php/Exchange/Solana/Import/Wallet
DEBUG - 2026-03-01 13:29:34 --> [REQ_ID=590af2e08039] [ROUTE] Controller=\App\Modules\Exchange\Controllers\SolanaController Method=importWallet
DEBUG - 2026-03-01 13:29:34 --> [REQ_ID=590af2e08039] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Exchange/Solana/Import/Wallet
DEBUG - 2026-03-01 13:29:34 --> [CSRF] token name=csrf_test_name hash=ab8f4fe9b96d9609b9c10d83425a78a8
DEBUG - 2026-03-01 13:29:34 --> [REQ_ID=590af2e08039] [REQUEST][END]
INFO - 2026-03-01 13:29:34 --> [REQ_ID=590af2e08039] [PERF] Execution time=0.064843
DEBUG - 2026-03-01 13:29:35 --> [REQ_ID=d7f905ee39d6] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-01 13:29:35 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-01 13:29:35 --> [REQ_ID=d7f905ee39d6] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-01 13:29:35 --> [REQ_ID=d7f905ee39d6] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-01 13:29:35 --> [REQ_ID=d7f905ee39d6] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-01 13:29:35 --> [CSRF] token name=csrf_test_name hash=9b22cedcffe9741855124503b9e00c59
DEBUG - 2026-03-01 13:29:35 --> [REQ_ID=75acec138a98] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-01 13:29:35 --> [REQ_ID=75acec138a98] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-01 13:29:35 --> [REQ_ID=d7f905ee39d6] [FILTER_AFTER]
DEBUG - 2026-03-01 13:29:35 --> [REQ_ID=d7f905ee39d6] [LIFECYCLE][END] status=200 duration_ms=60.40 memory_delta=0
INFO - 2026-03-01 13:29:35 --> [REQ_ID=75acec138a98] [PERF] Execution time=0.058744
DEBUG - 2026-03-01 13:29:35 --> [REQ_ID=d7f905ee39d6] [REQUEST][END]
INFO - 2026-03-01 13:29:35 --> [REQ_ID=d7f905ee39d6] [PERF] Execution time=0.073532
INFO - 2026-03-01 13:30:01 --> [spark:ops:work] Started
INFO - 2026-03-01 13:30:01 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-03-01 13:30:01 --> [SPARK_MEMORY] 16777216
INFO - 2026-03-01 13:30:01 --> [spark:ops:work] Intent
INFO - 2026-03-01 13:30:01 --> [spark:ops:work] Completed
INFO - 2026-03-01 13:30:01 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.020677
INFO - 2026-03-01 13:30:01 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-03-01 13:40:42 --> [REQ_ID=205c2fdb9f5d] [REQUEST][START] GET /
DEBUG - 2026-03-01 13:40:42 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-01 13:40:42 --> [REQ_ID=205c2fdb9f5d] [FILTER_BEFORE] /
DEBUG - 2026-03-01 13:40:42 --> [REQ_ID=205c2fdb9f5d] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-01 13:40:42 --> [REQ_ID=205c2fdb9f5d] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-01 13:40:42 --> [CSRF] token name=csrf_test_name hash=ea6350ae696a9e7dac60cf61f062d5fc
DEBUG - 2026-03-01 13:40:42 --> [REQ_ID=c487921e0e70] [INIT] App\Controllers\Home::GET
INFO - 2026-03-01 13:40:42 --> [REQ_ID=c487921e0e70] [MEMORY][controller-start] 6291456
INFO - 2026-03-01 13:40:42 --> [REQ_ID=c487921e0e70] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-01 13:40:42 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-01 13:40:42 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-03-01 13:40:42 --> [REQ_ID=c487921e0e70] [VIEW_RENDER] themes/public/home
INFO - 2026-03-01 13:40:42 --> [REQ_ID=c487921e0e70] [MEMORY][commonData:start] 10485760
INFO - 2026-03-01 13:40:42 --> themesMemory usage: 10485760
DEBUG - 2026-03-01 13:40:42 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-01 13:40:42 --> [REQ_ID=205c2fdb9f5d] [FILTER_AFTER]
DEBUG - 2026-03-01 13:40:42 --> [REQ_ID=205c2fdb9f5d] [LIFECYCLE][END] status=200 duration_ms=679.28 memory_delta=4194304
INFO - 2026-03-01 13:40:42 --> [REQ_ID=c487921e0e70] [PERF] Execution time=0.677230
DEBUG - 2026-03-01 13:40:42 --> [REQ_ID=205c2fdb9f5d] [REQUEST][END]
INFO - 2026-03-01 13:40:42 --> [REQ_ID=205c2fdb9f5d] [PERF] Execution time=0.716943
DEBUG - 2026-03-01 13:40:43 --> [REQ_ID=e5d62f7216c6] [REQUEST][START] GET /
DEBUG - 2026-03-01 13:40:43 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-01 13:40:43 --> [REQ_ID=e5d62f7216c6] [FILTER_BEFORE] /
DEBUG - 2026-03-01 13:40:43 --> [REQ_ID=e5d62f7216c6] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-01 13:40:43 --> [REQ_ID=e5d62f7216c6] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-01 13:40:43 --> [CSRF] token name=csrf_test_name hash=6387f78046854546ed26c847e502e6f5
DEBUG - 2026-03-01 13:40:43 --> [REQ_ID=1c0968a09b06] [INIT] App\Controllers\Home::GET
INFO - 2026-03-01 13:40:43 --> [REQ_ID=1c0968a09b06] [MEMORY][controller-start] 4194304
INFO - 2026-03-01 13:40:43 --> [REQ_ID=1c0968a09b06] [MEMORY][commonData:start] 4194304
DEBUG - 2026-03-01 13:40:43 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-01 13:40:43 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
DEBUG - 2026-03-01 13:40:43 --> [REQ_ID=1c0968a09b06] [VIEW_RENDER] themes/public/home
INFO - 2026-03-01 13:40:43 --> [REQ_ID=1c0968a09b06] [MEMORY][commonData:start] 8388608
INFO - 2026-03-01 13:40:43 --> themesMemory usage: 8388608
DEBUG - 2026-03-01 13:40:43 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-01 13:40:44 --> [REQ_ID=e5d62f7216c6] [FILTER_AFTER]
DEBUG - 2026-03-01 13:40:44 --> [REQ_ID=e5d62f7216c6] [LIFECYCLE][END] status=200 duration_ms=556.44 memory_delta=4194304
INFO - 2026-03-01 13:40:44 --> [REQ_ID=1c0968a09b06] [PERF] Execution time=0.556184
DEBUG - 2026-03-01 13:40:44 --> [REQ_ID=e5d62f7216c6] [REQUEST][END]
INFO - 2026-03-01 13:40:44 --> [REQ_ID=e5d62f7216c6] [PERF] Execution time=0.565163
DEBUG - 2026-03-01 13:40:44 --> [REQ_ID=adf6b2d19e8e] [REQUEST][START] GET /index.php/Legal/Terms-And-Conditions
DEBUG - 2026-03-01 13:40:44 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-01 13:40:44 --> [REQ_ID=adf6b2d19e8e] [FILTER_BEFORE] /index.php/Legal/Terms-And-Conditions
DEBUG - 2026-03-01 13:40:44 --> [REQ_ID=adf6b2d19e8e] [ROUTE] Controller=\App\Controllers\Home Method=terms
DEBUG - 2026-03-01 13:40:44 --> [REQ_ID=adf6b2d19e8e] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Legal/Terms-And-Conditions
DEBUG - 2026-03-01 13:40:44 --> [CSRF] token name=csrf_test_name hash=af7f88e3bf5f2b2d63d1d753b0485614
DEBUG - 2026-03-01 13:40:44 --> [REQ_ID=adf6b2d19e8e] [REQUEST][END]
INFO - 2026-03-01 13:40:44 --> [REQ_ID=adf6b2d19e8e] [PERF] Execution time=0.009653
DEBUG - 2026-03-01 13:40:44 --> [REQ_ID=39d754832239] [REQUEST][START] GET /index.php/How-It-Works/Automated-Financial-Insights
DEBUG - 2026-03-01 13:40:44 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-01 13:40:44 --> [REQ_ID=39d754832239] [FILTER_BEFORE] /index.php/How-It-Works/Automated-Financial-Insights
DEBUG - 2026-03-01 13:40:44 --> [REQ_ID=39d754832239] [ROUTE] Controller=\App\Modules\Blog\Controllers\HowItWorksController Method=show
DEBUG - 2026-03-01 13:40:44 --> [REQ_ID=39d754832239] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/How-It-Works/Automated-Financial-Insights
DEBUG - 2026-03-01 13:40:44 --> [CSRF] token name=csrf_test_name hash=e400732f257b01eb88c855d597c4e3ed
DEBUG - 2026-03-01 13:40:44 --> [REQ_ID=5579b21db479] [INIT] App\Modules\Blog\Controllers\HowItWorksController::GET
INFO - 2026-03-01 13:40:44 --> [REQ_ID=5579b21db479] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-01 13:40:44 --> [REQ_ID=5579b21db479] [METHOD_ENTRY] show
DEBUG - 2026-03-01 13:40:44 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-01 13:40:44 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-01 13:40:44 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-01 13:40:44 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-01 13:40:44 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-01 13:40:44 --> MyMICoin: guest context detected; skipping user-specific preload.
ERROR - 2026-03-01 13:40:44 --> [ERROR_PAGE] event=error_404 status=404 message=Page not found.
DEBUG - 2026-03-01 13:40:44 --> [REQ_ID=39d754832239] [FILTER_AFTER]
DEBUG - 2026-03-01 13:40:44 --> [REQ_ID=39d754832239] [LIFECYCLE][END] status=404 duration_ms=61.27 memory_delta=2097152
INFO - 2026-03-01 13:40:44 --> [REQ_ID=5579b21db479] [PERF] Execution time=0.060693
DEBUG - 2026-03-01 13:40:44 --> [REQ_ID=39d754832239] [REQUEST][END]
INFO - 2026-03-01 13:40:44 --> [REQ_ID=39d754832239] [PERF] Execution time=0.080704
DEBUG - 2026-03-01 13:40:44 --> [REQ_ID=6927406d7894] [REQUEST][START] GET /index.php/How-It-Works/Investment-Dashboard
DEBUG - 2026-03-01 13:40:44 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-01 13:40:44 --> [REQ_ID=6927406d7894] [FILTER_BEFORE] /index.php/How-It-Works/Investment-Dashboard
DEBUG - 2026-03-01 13:40:44 --> [REQ_ID=6927406d7894] [ROUTE] Controller=\App\Modules\Blog\Controllers\HowItWorksController Method=show
DEBUG - 2026-03-01 13:40:44 --> [REQ_ID=6927406d7894] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/How-It-Works/Investment-Dashboard
DEBUG - 2026-03-01 13:40:44 --> [CSRF] token name=csrf_test_name hash=c8ed35e4014b2d222bd7e8022e800357
DEBUG - 2026-03-01 13:40:44 --> [REQ_ID=e488c6358394] [INIT] App\Modules\Blog\Controllers\HowItWorksController::GET
INFO - 2026-03-01 13:40:44 --> [REQ_ID=e488c6358394] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-01 13:40:44 --> [REQ_ID=e488c6358394] [METHOD_ENTRY] show
DEBUG - 2026-03-01 13:40:44 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-01 13:40:44 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-01 13:40:44 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-01 13:40:44 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-01 13:40:44 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-01 13:40:44 --> MyMICoin: guest context detected; skipping user-specific preload.
INFO - 2026-03-01 13:40:44 --> [REQ_ID=e488c6358394] [MEMORY][commonData:start] 4194304
DEBUG - 2026-03-01 13:40:45 --> [REQ_ID=e488c6358394] [VIEW_RENDER] App\Modules\Blog\Views\HowItWorks\Investment_Portfolio_Management
INFO - 2026-03-01 13:40:45 --> [REQ_ID=e488c6358394] [MEMORY][commonData:start] 8388608
DEBUG - 2026-03-01 13:40:45 --> [REQ_ID=1c2333cba841] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-01 13:40:45 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-01 13:40:45 --> [REQ_ID=1c2333cba841] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-01 13:40:45 --> [REQ_ID=1c2333cba841] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-01 13:40:45 --> [REQ_ID=1c2333cba841] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-01 13:40:45 --> [CSRF] token name=csrf_test_name hash=c193ee866bff84343b4453e9f8cfa89b
DEBUG - 2026-03-01 13:40:45 --> [REQ_ID=822aff37ff70] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-01 13:40:45 --> [REQ_ID=822aff37ff70] [MEMORY][controller-start] 6291456
DEBUG - 2026-03-01 13:40:45 --> [REQ_ID=1c2333cba841] [FILTER_AFTER]
DEBUG - 2026-03-01 13:40:45 --> [REQ_ID=1c2333cba841] [LIFECYCLE][END] status=200 duration_ms=43.45 memory_delta=0
INFO - 2026-03-01 13:40:45 --> [REQ_ID=822aff37ff70] [PERF] Execution time=0.041135
DEBUG - 2026-03-01 13:40:45 --> [REQ_ID=1c2333cba841] [REQUEST][END]
INFO - 2026-03-01 13:40:45 --> [REQ_ID=1c2333cba841] [PERF] Execution time=0.082529
INFO - 2026-03-01 13:40:45 --> themesMemory usage: 10485760
DEBUG - 2026-03-01 13:40:45 --> [REQ_ID=6927406d7894] [FILTER_AFTER]
DEBUG - 2026-03-01 13:40:45 --> [REQ_ID=6927406d7894] [LIFECYCLE][END] status=200 duration_ms=962.28 memory_delta=6291456
INFO - 2026-03-01 13:40:45 --> [REQ_ID=e488c6358394] [PERF] Execution time=0.962061
DEBUG - 2026-03-01 13:40:45 --> [REQ_ID=6927406d7894] [REQUEST][END]
INFO - 2026-03-01 13:40:45 --> [REQ_ID=6927406d7894] [PERF] Execution time=0.972917
DEBUG - 2026-03-01 13:40:49 --> [REQ_ID=d70b46da85d1] [REQUEST][START] GET /index.php/Exchange/Solana
DEBUG - 2026-03-01 13:40:49 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-01 13:40:49 --> [REQ_ID=d70b46da85d1] [FILTER_BEFORE] /index.php/Exchange/Solana
DEBUG - 2026-03-01 13:40:49 --> [REQ_ID=d70b46da85d1] [ROUTE] Controller=\App\Modules\Exchange\Controllers\SolanaController Method=index
DEBUG - 2026-03-01 13:40:49 --> [REQ_ID=d70b46da85d1] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Exchange/Solana
DEBUG - 2026-03-01 13:40:49 --> [CSRF] token name=csrf_test_name hash=4fc76c83bcff6a4c0f16da20230aae43
DEBUG - 2026-03-01 13:40:49 --> [REQ_ID=d70b46da85d1] [REQUEST][END]
INFO - 2026-03-01 13:40:49 --> [REQ_ID=d70b46da85d1] [PERF] Execution time=0.018847
DEBUG - 2026-03-01 13:40:49 --> [REQ_ID=45da789ce13e] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-01 13:40:49 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-01 13:40:49 --> [REQ_ID=45da789ce13e] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-01 13:40:49 --> [REQ_ID=45da789ce13e] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-01 13:40:49 --> [REQ_ID=45da789ce13e] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-01 13:40:49 --> [CSRF] token name=csrf_test_name hash=feef6dd771c5528c26b258ba55fda3c7
DEBUG - 2026-03-01 13:40:49 --> [REQ_ID=7cb7964e8116] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-01 13:40:49 --> [REQ_ID=7cb7964e8116] [MEMORY][controller-start] 6291456
DEBUG - 2026-03-01 13:40:49 --> [REQ_ID=45da789ce13e] [FILTER_AFTER]
DEBUG - 2026-03-01 13:40:49 --> [REQ_ID=45da789ce13e] [LIFECYCLE][END] status=200 duration_ms=23.77 memory_delta=0
INFO - 2026-03-01 13:40:49 --> [REQ_ID=7cb7964e8116] [PERF] Execution time=0.022537
DEBUG - 2026-03-01 13:40:49 --> [REQ_ID=45da789ce13e] [REQUEST][END]
INFO - 2026-03-01 13:40:49 --> [REQ_ID=45da789ce13e] [PERF] Execution time=0.041267
DEBUG - 2026-03-01 13:40:49 --> [REQ_ID=3b091a438c62] [REQUEST][START] GET /index.php/My-Referrals
DEBUG - 2026-03-01 13:40:49 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-01 13:40:49 --> [REQ_ID=3b091a438c62] [FILTER_BEFORE] /index.php/My-Referrals
DEBUG - 2026-03-01 13:40:49 --> [REQ_ID=3b091a438c62] [ROUTE] Controller=\App\Modules\User\Controllers\ReferralController Method=index
DEBUG - 2026-03-01 13:40:49 --> [REQ_ID=3b091a438c62] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/My-Referrals
DEBUG - 2026-03-01 13:40:49 --> [CSRF] token name=csrf_test_name hash=9338d47edbb98711b9bc5838a6fb1a86
DEBUG - 2026-03-01 13:40:49 --> [REQ_ID=3b091a438c62] [REQUEST][END]
INFO - 2026-03-01 13:40:49 --> [REQ_ID=3b091a438c62] [PERF] Execution time=0.022173
DEBUG - 2026-03-01 13:40:49 --> [REQ_ID=0fc2d2153dc2] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-01 13:40:49 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-01 13:40:49 --> [REQ_ID=0fc2d2153dc2] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-01 13:40:49 --> [REQ_ID=0fc2d2153dc2] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-01 13:40:49 --> [REQ_ID=0fc2d2153dc2] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-01 13:40:49 --> [CSRF] token name=csrf_test_name hash=59c13b375391f87c5b8512566039a59f
DEBUG - 2026-03-01 13:40:49 --> [REQ_ID=22f60920c71a] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-01 13:40:49 --> [REQ_ID=22f60920c71a] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-01 13:40:49 --> [REQ_ID=0fc2d2153dc2] [FILTER_AFTER]
DEBUG - 2026-03-01 13:40:49 --> [REQ_ID=0fc2d2153dc2] [LIFECYCLE][END] status=200 duration_ms=14.75 memory_delta=0
INFO - 2026-03-01 13:40:49 --> [REQ_ID=22f60920c71a] [PERF] Execution time=0.014225
DEBUG - 2026-03-01 13:40:49 --> [REQ_ID=0fc2d2153dc2] [REQUEST][END]
INFO - 2026-03-01 13:40:49 --> [REQ_ID=0fc2d2153dc2] [PERF] Execution time=0.027225
DEBUG - 2026-03-01 13:40:49 --> [REQ_ID=a775e6396b9a] [REQUEST][START] GET /index.php/Management/Marketing/Post-Creator
DEBUG - 2026-03-01 13:40:49 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-01 13:40:49 --> [REQ_ID=a775e6396b9a] [FILTER_BEFORE] /index.php/Management/Marketing/Post-Creator
DEBUG - 2026-03-01 13:40:49 --> [REQ_ID=a775e6396b9a] [ROUTE] Controller=\App\Modules\Management\Controllers\MarketingAdminController Method=postCreator
DEBUG - 2026-03-01 13:40:49 --> [REQ_ID=a775e6396b9a] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Management/Marketing/Post-Creator
DEBUG - 2026-03-01 13:40:49 --> [CSRF] token name=csrf_test_name hash=4b5a7c64c031431d836bf49d2b9a296d
DEBUG - 2026-03-01 13:40:49 --> [REQ_ID=a775e6396b9a] [REQUEST][END]
INFO - 2026-03-01 13:40:49 --> [REQ_ID=a775e6396b9a] [PERF] Execution time=0.023882
DEBUG - 2026-03-01 13:40:49 --> [REQ_ID=905dd5c757cf] [REQUEST][START] GET /index.php/Management/Marketing/Blog-Creator
DEBUG - 2026-03-01 13:40:49 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-01 13:40:49 --> [REQ_ID=905dd5c757cf] [FILTER_BEFORE] /index.php/Management/Marketing/Blog-Creator
DEBUG - 2026-03-01 13:40:49 --> [REQ_ID=905dd5c757cf] [ROUTE] Controller=\App\Modules\Management\Controllers\MarketingAdminController Method=blogCreator
DEBUG - 2026-03-01 13:40:49 --> [REQ_ID=905dd5c757cf] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Management/Marketing/Blog-Creator
DEBUG - 2026-03-01 13:40:49 --> [CSRF] token name=csrf_test_name hash=f03f71abae09f1e0ad9e281925f63461
DEBUG - 2026-03-01 13:40:49 --> [REQ_ID=905dd5c757cf] [REQUEST][END]
INFO - 2026-03-01 13:40:49 --> [REQ_ID=905dd5c757cf] [PERF] Execution time=0.022854
DEBUG - 2026-03-01 13:40:49 --> [REQ_ID=a807a07a5c5a] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-01 13:40:49 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-01 13:40:49 --> [REQ_ID=a807a07a5c5a] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-01 13:40:49 --> [REQ_ID=a807a07a5c5a] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-01 13:40:49 --> [REQ_ID=a807a07a5c5a] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-01 13:40:49 --> [CSRF] token name=csrf_test_name hash=ef7e4643a6317c60a05d0c722d75d949
DEBUG - 2026-03-01 13:40:49 --> [REQ_ID=89c9eb7eb4dd] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-01 13:40:49 --> [REQ_ID=89c9eb7eb4dd] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-01 13:40:49 --> [REQ_ID=8b272c046113] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-01 13:40:49 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-01 13:40:49 --> [REQ_ID=a807a07a5c5a] [FILTER_AFTER]
DEBUG - 2026-03-01 13:40:49 --> [REQ_ID=a807a07a5c5a] [LIFECYCLE][END] status=200 duration_ms=19.07 memory_delta=0
INFO - 2026-03-01 13:40:49 --> [REQ_ID=89c9eb7eb4dd] [PERF] Execution time=0.018416
DEBUG - 2026-03-01 13:40:49 --> [REQ_ID=a807a07a5c5a] [REQUEST][END]
INFO - 2026-03-01 13:40:49 --> [REQ_ID=a807a07a5c5a] [PERF] Execution time=0.030676
DEBUG - 2026-03-01 13:40:49 --> [REQ_ID=8b272c046113] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-01 13:40:49 --> [REQ_ID=8b272c046113] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-01 13:40:49 --> [REQ_ID=8b272c046113] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-01 13:40:49 --> [CSRF] token name=csrf_test_name hash=bbb6fadeeaf790bc0d695c26e05b5abe
DEBUG - 2026-03-01 13:40:49 --> [REQ_ID=d3ccffae7b48] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-01 13:40:49 --> [REQ_ID=d3ccffae7b48] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-01 13:40:49 --> [REQ_ID=8b272c046113] [FILTER_AFTER]
DEBUG - 2026-03-01 13:40:49 --> [REQ_ID=8b272c046113] [LIFECYCLE][END] status=200 duration_ms=19.79 memory_delta=0
INFO - 2026-03-01 13:40:49 --> [REQ_ID=d3ccffae7b48] [PERF] Execution time=0.018842
DEBUG - 2026-03-01 13:40:49 --> [REQ_ID=8b272c046113] [REQUEST][END]
INFO - 2026-03-01 13:40:49 --> [REQ_ID=8b272c046113] [PERF] Execution time=0.032072
DEBUG - 2026-03-01 13:40:49 --> [REQ_ID=cd9a5c2b91d4] [REQUEST][START] GET /index.php/Management/Assets
DEBUG - 2026-03-01 13:40:49 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-01 13:40:49 --> [REQ_ID=cd9a5c2b91d4] [FILTER_BEFORE] /index.php/Management/Assets
DEBUG - 2026-03-01 13:40:49 --> [REQ_ID=cd9a5c2b91d4] [ROUTE] Controller=\App\Modules\Management\Controllers\AssetsAdminController Method=index
DEBUG - 2026-03-01 13:40:49 --> [REQ_ID=cd9a5c2b91d4] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Management/Assets
DEBUG - 2026-03-01 13:40:49 --> [CSRF] token name=csrf_test_name hash=b3b6fef9b71bef3cab21bc595be0401b
DEBUG - 2026-03-01 13:40:49 --> [REQ_ID=cd9a5c2b91d4] [REQUEST][END]
INFO - 2026-03-01 13:40:49 --> [REQ_ID=cd9a5c2b91d4] [PERF] Execution time=0.010372
DEBUG - 2026-03-01 13:40:49 --> [REQ_ID=85fece0523e6] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-01 13:40:49 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-01 13:40:49 --> [REQ_ID=85fece0523e6] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-01 13:40:49 --> [REQ_ID=85fece0523e6] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-01 13:40:49 --> [REQ_ID=85fece0523e6] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-01 13:40:49 --> [CSRF] token name=csrf_test_name hash=c632b72938e41a72061cca800479f262
DEBUG - 2026-03-01 13:40:49 --> [REQ_ID=837ae7573d11] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-01 13:40:49 --> [REQ_ID=837ae7573d11] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-01 13:40:49 --> [REQ_ID=85fece0523e6] [FILTER_AFTER]
DEBUG - 2026-03-01 13:40:49 --> [REQ_ID=85fece0523e6] [LIFECYCLE][END] status=200 duration_ms=13.64 memory_delta=0
INFO - 2026-03-01 13:40:49 --> [REQ_ID=837ae7573d11] [PERF] Execution time=0.013480
DEBUG - 2026-03-01 13:40:49 --> [REQ_ID=85fece0523e6] [REQUEST][END]
INFO - 2026-03-01 13:40:49 --> [REQ_ID=85fece0523e6] [PERF] Execution time=0.022068
DEBUG - 2026-03-01 13:40:49 --> [REQ_ID=83011a93b644] [REQUEST][START] GET /index.php/Legal/Terms-And-Conditions
DEBUG - 2026-03-01 13:40:49 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-01 13:40:49 --> [REQ_ID=83011a93b644] [FILTER_BEFORE] /index.php/Legal/Terms-And-Conditions
DEBUG - 2026-03-01 13:40:49 --> [REQ_ID=83011a93b644] [ROUTE] Controller=\App\Controllers\Home Method=terms
DEBUG - 2026-03-01 13:40:49 --> [REQ_ID=83011a93b644] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Legal/Terms-And-Conditions
DEBUG - 2026-03-01 13:40:49 --> [CSRF] token name=csrf_test_name hash=bf253d1450679a058f8c47d034664169
DEBUG - 2026-03-01 13:40:49 --> [REQ_ID=83011a93b644] [REQUEST][END]
INFO - 2026-03-01 13:40:49 --> [REQ_ID=83011a93b644] [PERF] Execution time=0.010366
DEBUG - 2026-03-01 13:40:50 --> [REQ_ID=29d9407e0097] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-01 13:40:50 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-01 13:40:50 --> [REQ_ID=29d9407e0097] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-01 13:40:50 --> [REQ_ID=29d9407e0097] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-01 13:40:50 --> [REQ_ID=29d9407e0097] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-01 13:40:50 --> [CSRF] token name=csrf_test_name hash=4c07dcbc9869a7ed1a5a33f5369b0c62
DEBUG - 2026-03-01 13:40:50 --> [REQ_ID=bbfce96dc274] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-01 13:40:50 --> [REQ_ID=bbfce96dc274] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-01 13:40:50 --> [REQ_ID=29d9407e0097] [FILTER_AFTER]
DEBUG - 2026-03-01 13:40:50 --> [REQ_ID=29d9407e0097] [LIFECYCLE][END] status=200 duration_ms=18.39 memory_delta=0
INFO - 2026-03-01 13:40:50 --> [REQ_ID=bbfce96dc274] [PERF] Execution time=0.018230
DEBUG - 2026-03-01 13:40:50 --> [REQ_ID=29d9407e0097] [REQUEST][END]
INFO - 2026-03-01 13:40:50 --> [REQ_ID=29d9407e0097] [PERF] Execution time=0.027130
DEBUG - 2026-03-01 13:40:50 --> [REQ_ID=91466af9f0f2] [REQUEST][START] GET /index.php/Investments
DEBUG - 2026-03-01 13:40:50 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-01 13:40:50 --> [REQ_ID=91466af9f0f2] [FILTER_BEFORE] /index.php/Investments
DEBUG - 2026-03-01 13:40:50 --> [REQ_ID=91466af9f0f2] [ROUTE] Controller=\App\Modules\User\Controllers\InvestmentsController Method=index
DEBUG - 2026-03-01 13:40:50 --> [REQ_ID=91466af9f0f2] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Investments
DEBUG - 2026-03-01 13:40:50 --> [CSRF] token name=csrf_test_name hash=69c8bd12522bde113304e7834a3df5b3
DEBUG - 2026-03-01 13:40:50 --> [REQ_ID=91466af9f0f2] [REQUEST][END]
INFO - 2026-03-01 13:40:50 --> [REQ_ID=91466af9f0f2] [PERF] Execution time=0.012175
DEBUG - 2026-03-01 13:40:50 --> [REQ_ID=9cb5d0749f9f] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-01 13:40:50 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-01 13:40:50 --> [REQ_ID=9cb5d0749f9f] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-01 13:40:50 --> [REQ_ID=9cb5d0749f9f] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-01 13:40:50 --> [REQ_ID=9cb5d0749f9f] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-01 13:40:50 --> [CSRF] token name=csrf_test_name hash=d878a9e93a48377bd210abcdcd6fafcb
DEBUG - 2026-03-01 13:40:50 --> [REQ_ID=b525df2d7538] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-01 13:40:50 --> [REQ_ID=b525df2d7538] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-01 13:40:50 --> [REQ_ID=9cb5d0749f9f] [FILTER_AFTER]
DEBUG - 2026-03-01 13:40:50 --> [REQ_ID=9cb5d0749f9f] [LIFECYCLE][END] status=200 duration_ms=15.15 memory_delta=0
INFO - 2026-03-01 13:40:50 --> [REQ_ID=b525df2d7538] [PERF] Execution time=0.015005
DEBUG - 2026-03-01 13:40:50 --> [REQ_ID=9cb5d0749f9f] [REQUEST][END]
INFO - 2026-03-01 13:40:50 --> [REQ_ID=9cb5d0749f9f] [PERF] Execution time=0.024295
DEBUG - 2026-03-01 13:40:50 --> [REQ_ID=96debfc587f3] [REQUEST][START] GET /index.php/Alerts
DEBUG - 2026-03-01 13:40:50 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-01 13:40:50 --> [REQ_ID=96debfc587f3] [FILTER_BEFORE] /index.php/Alerts
DEBUG - 2026-03-01 13:40:50 --> [REQ_ID=96debfc587f3] [ROUTE] Controller=\App\Modules\User\Controllers\AlertsController Method=index
DEBUG - 2026-03-01 13:40:50 --> [REQ_ID=96debfc587f3] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Alerts
DEBUG - 2026-03-01 13:40:50 --> [CSRF] token name=csrf_test_name hash=69cdd6ba15023a619318a25a95e8812d
DEBUG - 2026-03-01 13:40:50 --> [REQ_ID=96debfc587f3] [REQUEST][END]
INFO - 2026-03-01 13:40:50 --> [REQ_ID=96debfc587f3] [PERF] Execution time=0.010412
DEBUG - 2026-03-01 13:40:50 --> [REQ_ID=92ea2ffc7deb] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-01 13:40:50 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-01 13:40:50 --> [REQ_ID=92ea2ffc7deb] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-01 13:40:50 --> [REQ_ID=92ea2ffc7deb] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-01 13:40:50 --> [REQ_ID=92ea2ffc7deb] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-01 13:40:50 --> [CSRF] token name=csrf_test_name hash=a46e7f5c0f99191387fd98ae9847a69e
DEBUG - 2026-03-01 13:40:50 --> [REQ_ID=8644fe021461] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-01 13:40:50 --> [REQ_ID=8644fe021461] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-01 13:40:50 --> [REQ_ID=92ea2ffc7deb] [FILTER_AFTER]
DEBUG - 2026-03-01 13:40:50 --> [REQ_ID=92ea2ffc7deb] [LIFECYCLE][END] status=200 duration_ms=14.04 memory_delta=0
INFO - 2026-03-01 13:40:50 --> [REQ_ID=8644fe021461] [PERF] Execution time=0.014020
DEBUG - 2026-03-01 13:40:50 --> [REQ_ID=92ea2ffc7deb] [REQUEST][END]
INFO - 2026-03-01 13:40:50 --> [REQ_ID=92ea2ffc7deb] [PERF] Execution time=0.024008
DEBUG - 2026-03-01 13:40:50 --> [REQ_ID=21e54ef08fae] [REQUEST][START] GET /index.php/Wallets
DEBUG - 2026-03-01 13:40:50 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-01 13:40:50 --> [REQ_ID=21e54ef08fae] [FILTER_BEFORE] /index.php/Wallets
DEBUG - 2026-03-01 13:40:50 --> [REQ_ID=21e54ef08fae] [ROUTE] Controller=\App\Modules\User\Controllers\WalletsController Method=index
DEBUG - 2026-03-01 13:40:50 --> [REQ_ID=21e54ef08fae] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Wallets
DEBUG - 2026-03-01 13:40:50 --> [CSRF] token name=csrf_test_name hash=5dae88979b428f4f9bd3a35cf1324749
DEBUG - 2026-03-01 13:40:50 --> [REQ_ID=21e54ef08fae] [REQUEST][END]
INFO - 2026-03-01 13:40:50 --> [REQ_ID=21e54ef08fae] [PERF] Execution time=0.014480
DEBUG - 2026-03-01 13:40:50 --> [REQ_ID=7a9387952715] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-01 13:40:50 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-01 13:40:50 --> [REQ_ID=7a9387952715] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-01 13:40:50 --> [REQ_ID=7a9387952715] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-01 13:40:50 --> [REQ_ID=7a9387952715] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-01 13:40:50 --> [CSRF] token name=csrf_test_name hash=a60f2e8d19c81a77f047bcb9e4193bfd
DEBUG - 2026-03-01 13:40:50 --> [REQ_ID=afc9854e525a] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-01 13:40:50 --> [REQ_ID=afc9854e525a] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-01 13:40:50 --> [REQ_ID=39b97a639b52] [REQUEST][START] GET /index.php/How-It-Works/Investment-Dashboard
DEBUG - 2026-03-01 13:40:50 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-01 13:40:50 --> [REQ_ID=39b97a639b52] [FILTER_BEFORE] /index.php/How-It-Works/Investment-Dashboard
DEBUG - 2026-03-01 13:40:50 --> [REQ_ID=39b97a639b52] [ROUTE] Controller=\App\Modules\Blog\Controllers\HowItWorksController Method=show
DEBUG - 2026-03-01 13:40:50 --> [REQ_ID=39b97a639b52] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/How-It-Works/Investment-Dashboard
DEBUG - 2026-03-01 13:40:50 --> [CSRF] token name=csrf_test_name hash=218d0804849186414a075e08dc65219e
DEBUG - 2026-03-01 13:40:50 --> [REQ_ID=935e914272eb] [INIT] App\Modules\Blog\Controllers\HowItWorksController::GET
INFO - 2026-03-01 13:40:50 --> [REQ_ID=935e914272eb] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-01 13:40:50 --> [REQ_ID=7a9387952715] [FILTER_AFTER]
DEBUG - 2026-03-01 13:40:50 --> [REQ_ID=7a9387952715] [LIFECYCLE][END] status=200 duration_ms=19.06 memory_delta=0
INFO - 2026-03-01 13:40:50 --> [REQ_ID=afc9854e525a] [PERF] Execution time=0.018877
DEBUG - 2026-03-01 13:40:50 --> [REQ_ID=7a9387952715] [REQUEST][END]
INFO - 2026-03-01 13:40:50 --> [REQ_ID=7a9387952715] [PERF] Execution time=0.029616
DEBUG - 2026-03-01 13:40:50 --> [REQ_ID=935e914272eb] [METHOD_ENTRY] show
DEBUG - 2026-03-01 13:40:50 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-01 13:40:50 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-01 13:40:50 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-01 13:40:50 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-01 13:40:50 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-01 13:40:50 --> MyMICoin: guest context detected; skipping user-specific preload.
INFO - 2026-03-01 13:40:50 --> [REQ_ID=935e914272eb] [MEMORY][commonData:start] 4194304
DEBUG - 2026-03-01 13:40:50 --> [REQ_ID=a90fa732824a] [REQUEST][START] GET /index.php/Management/Docs
DEBUG - 2026-03-01 13:40:50 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-01 13:40:50 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: GET, Route: Management/Docs]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-01 13:40:50 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-01 13:40:50 --> [404] URI=https://www.mymiwallet.com/index.php/Management/Docs
WARNING - 2026-03-01 13:40:50 --> 404 route miss: https://www.mymiwallet.com/index.php/Management/Docs | referrer: none
ERROR - 2026-03-01 13:40:50 --> [ERROR_PAGE] event=error_404 status=404 message=Page not found.
DEBUG - 2026-03-01 13:40:50 --> [REQ_ID=7dae7c26565d] [REQUEST][START] GET /index.php/Support
DEBUG - 2026-03-01 13:40:50 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-01 13:40:50 --> [REQ_ID=7dae7c26565d] [FILTER_BEFORE] /index.php/Support
DEBUG - 2026-03-01 13:40:50 --> [REQ_ID=7dae7c26565d] [ROUTE] Controller=\App\Modules\Support\Controllers\SupportController Method=index
DEBUG - 2026-03-01 13:40:50 --> [REQ_ID=7dae7c26565d] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Support
DEBUG - 2026-03-01 13:40:50 --> [CSRF] token name=csrf_test_name hash=a5a7f956057c9f5b1b6593fcdca21d5e
DEBUG - 2026-03-01 13:40:50 --> [REQ_ID=f7334a74b823] [INIT] App\Modules\Support\Controllers\SupportController::GET
INFO - 2026-03-01 13:40:50 --> [REQ_ID=f7334a74b823] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-01 13:40:50 --> [REQ_ID=f7334a74b823] [METHOD_ENTRY] index
DEBUG - 2026-03-01 13:40:51 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-01 13:40:51 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-01 13:40:51 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-01 13:40:51 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-01 13:40:51 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-01 13:40:51 --> MyMICoin: guest context detected; skipping user-specific preload.
INFO - 2026-03-01 13:40:51 --> [REQ_ID=f7334a74b823] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-01 13:40:51 --> [REQ_ID=f7334a74b823] [VIEW_RENDER] SupportModule\Views\Support\index
INFO - 2026-03-01 13:40:51 --> [REQ_ID=f7334a74b823] [MEMORY][commonData:start] 6291456
INFO - 2026-03-01 13:40:51 --> themesMemory usage: 6291456
DEBUG - 2026-03-01 13:40:51 --> [REQ_ID=7dae7c26565d] [FILTER_AFTER]
DEBUG - 2026-03-01 13:40:51 --> [REQ_ID=7dae7c26565d] [LIFECYCLE][END] status=200 duration_ms=81.61 memory_delta=2097152
INFO - 2026-03-01 13:40:51 --> [REQ_ID=f7334a74b823] [PERF] Execution time=0.081357
DEBUG - 2026-03-01 13:40:51 --> [REQ_ID=7dae7c26565d] [REQUEST][END]
INFO - 2026-03-01 13:40:51 --> [REQ_ID=7dae7c26565d] [PERF] Execution time=0.091056
DEBUG - 2026-03-01 13:40:51 --> [REQ_ID=935e914272eb] [VIEW_RENDER] App\Modules\Blog\Views\HowItWorks\Investment_Portfolio_Management
INFO - 2026-03-01 13:40:51 --> [REQ_ID=935e914272eb] [MEMORY][commonData:start] 8388608
DEBUG - 2026-03-01 13:40:51 --> [REQ_ID=3c88c6cce7bc] [REQUEST][START] GET /index.php/Wallets/Purchase/Memberships
DEBUG - 2026-03-01 13:40:51 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-01 13:40:51 --> [REQ_ID=3c88c6cce7bc] [FILTER_BEFORE] /index.php/Wallets/Purchase/Memberships
DEBUG - 2026-03-01 13:40:51 --> [REQ_ID=3c88c6cce7bc] [ROUTE] Controller=\App\Modules\User\Controllers\WalletsController Method=purchase
DEBUG - 2026-03-01 13:40:51 --> [REQ_ID=3c88c6cce7bc] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Wallets/Purchase/Memberships
DEBUG - 2026-03-01 13:40:51 --> [CSRF] token name=csrf_test_name hash=2065b5fbfe0782795eb42e42303a654c
DEBUG - 2026-03-01 13:40:51 --> [REQ_ID=3c88c6cce7bc] [REQUEST][END]
INFO - 2026-03-01 13:40:51 --> [REQ_ID=3c88c6cce7bc] [PERF] Execution time=0.009358
DEBUG - 2026-03-01 13:40:51 --> [REQ_ID=f9b23657dcb9] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-01 13:40:51 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-01 13:40:51 --> [REQ_ID=f9b23657dcb9] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-01 13:40:51 --> [REQ_ID=f9b23657dcb9] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-01 13:40:51 --> [REQ_ID=f9b23657dcb9] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-01 13:40:51 --> [CSRF] token name=csrf_test_name hash=ff69423af3612b3907082dc415e5dc81
DEBUG - 2026-03-01 13:40:51 --> [REQ_ID=ce0699a1f7fe] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-01 13:40:51 --> [REQ_ID=ce0699a1f7fe] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-01 13:40:51 --> [REQ_ID=f9b23657dcb9] [FILTER_AFTER]
DEBUG - 2026-03-01 13:40:51 --> [REQ_ID=f9b23657dcb9] [LIFECYCLE][END] status=200 duration_ms=18.26 memory_delta=0
INFO - 2026-03-01 13:40:51 --> [REQ_ID=ce0699a1f7fe] [PERF] Execution time=0.018187
DEBUG - 2026-03-01 13:40:51 --> [REQ_ID=f9b23657dcb9] [REQUEST][END]
INFO - 2026-03-01 13:40:51 --> [REQ_ID=f9b23657dcb9] [PERF] Execution time=0.027023
INFO - 2026-03-01 13:40:51 --> themesMemory usage: 10485760
DEBUG - 2026-03-01 13:40:51 --> [REQ_ID=39b97a639b52] [FILTER_AFTER]
DEBUG - 2026-03-01 13:40:51 --> [REQ_ID=39b97a639b52] [LIFECYCLE][END] status=200 duration_ms=1,056.28 memory_delta=6291456
INFO - 2026-03-01 13:40:51 --> [REQ_ID=935e914272eb] [PERF] Execution time=1.055985
DEBUG - 2026-03-01 13:40:51 --> [REQ_ID=39b97a639b52] [REQUEST][END]
INFO - 2026-03-01 13:40:51 --> [REQ_ID=39b97a639b52] [PERF] Execution time=1.065595
DEBUG - 2026-03-01 13:40:51 --> [REQ_ID=4c7af58a4d9f] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-01 13:40:51 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-01 13:40:51 --> [REQ_ID=4c7af58a4d9f] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-01 13:40:51 --> [REQ_ID=4c7af58a4d9f] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-01 13:40:51 --> [REQ_ID=4c7af58a4d9f] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-01 13:40:51 --> [CSRF] token name=csrf_test_name hash=c33fd89602e9f927307e089b76c26202
DEBUG - 2026-03-01 13:40:51 --> [REQ_ID=edbbae309242] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-01 13:40:51 --> [REQ_ID=edbbae309242] [MEMORY][controller-start] 8388608
DEBUG - 2026-03-01 13:40:51 --> [REQ_ID=4c7af58a4d9f] [FILTER_AFTER]
DEBUG - 2026-03-01 13:40:51 --> [REQ_ID=4c7af58a4d9f] [LIFECYCLE][END] status=200 duration_ms=24.42 memory_delta=0
INFO - 2026-03-01 13:40:51 --> [REQ_ID=edbbae309242] [PERF] Execution time=0.024479
DEBUG - 2026-03-01 13:40:51 --> [REQ_ID=4c7af58a4d9f] [REQUEST][END]
INFO - 2026-03-01 13:40:51 --> [REQ_ID=4c7af58a4d9f] [PERF] Execution time=0.033571
DEBUG - 2026-03-01 13:40:51 --> [REQ_ID=4b51d05d367c] [REQUEST][START] GET /index.php/Account/Billing
DEBUG - 2026-03-01 13:40:51 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-01 13:40:51 --> [REQ_ID=4b51d05d367c] [FILTER_BEFORE] /index.php/Account/Billing
DEBUG - 2026-03-01 13:40:51 --> [REQ_ID=4b51d05d367c] [ROUTE] Controller=\App\Modules\User\Controllers\DashboardController Method=billing
DEBUG - 2026-03-01 13:40:51 --> [REQ_ID=4b51d05d367c] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Account/Billing
DEBUG - 2026-03-01 13:40:51 --> [CSRF] token name=csrf_test_name hash=32ec1e30be3648ec019be127de70725c
DEBUG - 2026-03-01 13:40:51 --> [REQ_ID=4b51d05d367c] [REQUEST][END]
INFO - 2026-03-01 13:40:51 --> [REQ_ID=4b51d05d367c] [PERF] Execution time=0.015590
DEBUG - 2026-03-01 13:40:51 --> [REQ_ID=a38bfa79e8c1] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-01 13:40:51 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-01 13:40:51 --> [REQ_ID=a38bfa79e8c1] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-01 13:40:51 --> [REQ_ID=a38bfa79e8c1] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-01 13:40:51 --> [REQ_ID=a38bfa79e8c1] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-01 13:40:51 --> [CSRF] token name=csrf_test_name hash=a8f0338371fbe548e98c8ec63b9d3fbe
DEBUG - 2026-03-01 13:40:51 --> [REQ_ID=3a3da0b5927d] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-01 13:40:51 --> [REQ_ID=3a3da0b5927d] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-01 13:40:51 --> [REQ_ID=8fc0536262aa] [REQUEST][START] GET /index.php/Knowledgebase
DEBUG - 2026-03-01 13:40:51 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-01 13:40:51 --> [REQ_ID=a38bfa79e8c1] [FILTER_AFTER]
DEBUG - 2026-03-01 13:40:51 --> [REQ_ID=a38bfa79e8c1] [LIFECYCLE][END] status=200 duration_ms=15.91 memory_delta=0
INFO - 2026-03-01 13:40:51 --> [REQ_ID=3a3da0b5927d] [PERF] Execution time=0.015711
DEBUG - 2026-03-01 13:40:51 --> [REQ_ID=a38bfa79e8c1] [REQUEST][END]
INFO - 2026-03-01 13:40:51 --> [REQ_ID=a38bfa79e8c1] [PERF] Execution time=0.024195
DEBUG - 2026-03-01 13:40:51 --> [REQ_ID=8fc0536262aa] [FILTER_BEFORE] /index.php/Knowledgebase
DEBUG - 2026-03-01 13:40:51 --> [REQ_ID=8fc0536262aa] [ROUTE] Controller=\App\Modules\User\Controllers\KnowledgebaseController Method=index
DEBUG - 2026-03-01 13:40:51 --> [REQ_ID=8fc0536262aa] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Knowledgebase
DEBUG - 2026-03-01 13:40:51 --> [CSRF] token name=csrf_test_name hash=d77f7482e32803e27d7efafdb515efe0
DEBUG - 2026-03-01 13:40:51 --> [REQ_ID=8fc0536262aa] [REQUEST][END]
INFO - 2026-03-01 13:40:51 --> [REQ_ID=8fc0536262aa] [PERF] Execution time=0.012909
DEBUG - 2026-03-01 13:40:52 --> [REQ_ID=b5b9ad7b61ca] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-01 13:40:52 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-01 13:40:52 --> [REQ_ID=b5b9ad7b61ca] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-01 13:40:52 --> [REQ_ID=b5b9ad7b61ca] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-01 13:40:52 --> [REQ_ID=b5b9ad7b61ca] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-01 13:40:52 --> [CSRF] token name=csrf_test_name hash=382b038590a024d2bde47547db23df82
DEBUG - 2026-03-01 13:40:52 --> [REQ_ID=28705f1dd2c6] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-01 13:40:52 --> [REQ_ID=28705f1dd2c6] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-01 13:40:52 --> [REQ_ID=b5b9ad7b61ca] [FILTER_AFTER]
DEBUG - 2026-03-01 13:40:52 --> [REQ_ID=b5b9ad7b61ca] [LIFECYCLE][END] status=200 duration_ms=19.39 memory_delta=0
INFO - 2026-03-01 13:40:52 --> [REQ_ID=28705f1dd2c6] [PERF] Execution time=0.019351
DEBUG - 2026-03-01 13:40:52 --> [REQ_ID=b5b9ad7b61ca] [REQUEST][END]
INFO - 2026-03-01 13:40:52 --> [REQ_ID=b5b9ad7b61ca] [PERF] Execution time=0.029113
DEBUG - 2026-03-01 13:40:52 --> [REQ_ID=9316dfd388d8] [REQUEST][START] GET /index.php/Account/Security
DEBUG - 2026-03-01 13:40:52 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-01 13:40:52 --> [REQ_ID=9316dfd388d8] [FILTER_BEFORE] /index.php/Account/Security
DEBUG - 2026-03-01 13:40:52 --> [REQ_ID=9316dfd388d8] [ROUTE] Controller=\App\Modules\User\Controllers\DashboardController Method=Security
DEBUG - 2026-03-01 13:40:52 --> [REQ_ID=9316dfd388d8] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Account/Security
DEBUG - 2026-03-01 13:40:52 --> [CSRF] token name=csrf_test_name hash=bc758fb1f6ecb508c12ac15e0eee8266
DEBUG - 2026-03-01 13:40:52 --> [REQ_ID=9316dfd388d8] [REQUEST][END]
INFO - 2026-03-01 13:40:52 --> [REQ_ID=9316dfd388d8] [PERF] Execution time=0.013209
DEBUG - 2026-03-01 13:40:52 --> [REQ_ID=7de60f14ef36] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-01 13:40:52 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-01 13:40:52 --> [REQ_ID=7de60f14ef36] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-01 13:40:52 --> [REQ_ID=7de60f14ef36] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-01 13:40:52 --> [REQ_ID=7de60f14ef36] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-01 13:40:52 --> [CSRF] token name=csrf_test_name hash=e26093b99ce690373a3d21dc5487a3e3
DEBUG - 2026-03-01 13:40:52 --> [REQ_ID=45220fa8cee4] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-01 13:40:52 --> [REQ_ID=45220fa8cee4] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-01 13:40:52 --> [REQ_ID=7de60f14ef36] [FILTER_AFTER]
DEBUG - 2026-03-01 13:40:52 --> [REQ_ID=7de60f14ef36] [LIFECYCLE][END] status=200 duration_ms=14.81 memory_delta=0
INFO - 2026-03-01 13:40:52 --> [REQ_ID=45220fa8cee4] [PERF] Execution time=0.014651
DEBUG - 2026-03-01 13:40:52 --> [REQ_ID=7de60f14ef36] [REQUEST][END]
INFO - 2026-03-01 13:40:52 --> [REQ_ID=7de60f14ef36] [PERF] Execution time=0.023154
DEBUG - 2026-03-01 13:40:52 --> [REQ_ID=3ff735e7e53a] [REQUEST][START] GET /index.php/Management/Budgeting
DEBUG - 2026-03-01 13:40:52 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-01 13:40:52 --> [REQ_ID=3ff735e7e53a] [FILTER_BEFORE] /index.php/Management/Budgeting
DEBUG - 2026-03-01 13:40:52 --> [REQ_ID=3ff735e7e53a] [ROUTE] Controller=\App\Modules\Management\Controllers\BudgetingAdminController Method=index
DEBUG - 2026-03-01 13:40:52 --> [REQ_ID=3ff735e7e53a] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Management/Budgeting
DEBUG - 2026-03-01 13:40:52 --> [CSRF] token name=csrf_test_name hash=7fc8ea27d0254cc420fcd57fa27e4a85
DEBUG - 2026-03-01 13:40:52 --> [REQ_ID=3ff735e7e53a] [REQUEST][END]
INFO - 2026-03-01 13:40:52 --> [REQ_ID=3ff735e7e53a] [PERF] Execution time=0.010450
DEBUG - 2026-03-01 13:40:52 --> [REQ_ID=b99a5601d3be] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-01 13:40:52 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-01 13:40:52 --> [REQ_ID=b99a5601d3be] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-01 13:40:52 --> [REQ_ID=b99a5601d3be] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-01 13:40:52 --> [REQ_ID=b99a5601d3be] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-01 13:40:52 --> [CSRF] token name=csrf_test_name hash=75ecf940fa6fe0f62caf8811736f7b30
DEBUG - 2026-03-01 13:40:52 --> [REQ_ID=c3c7799171d9] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-01 13:40:52 --> [REQ_ID=c3c7799171d9] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-01 13:40:52 --> [REQ_ID=b99a5601d3be] [FILTER_AFTER]
DEBUG - 2026-03-01 13:40:52 --> [REQ_ID=b99a5601d3be] [LIFECYCLE][END] status=200 duration_ms=15.13 memory_delta=0
INFO - 2026-03-01 13:40:52 --> [REQ_ID=c3c7799171d9] [PERF] Execution time=0.014984
DEBUG - 2026-03-01 13:40:52 --> [REQ_ID=b99a5601d3be] [REQUEST][END]
INFO - 2026-03-01 13:40:52 --> [REQ_ID=b99a5601d3be] [PERF] Execution time=0.024965
DEBUG - 2026-03-01 13:40:52 --> [REQ_ID=9ff62e1ccb42] [REQUEST][START] GET /index.php/Terms-Of-Service
DEBUG - 2026-03-01 13:40:52 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-01 13:40:52 --> [REQ_ID=9ff62e1ccb42] [FILTER_BEFORE] /index.php/Terms-Of-Service
DEBUG - 2026-03-01 13:40:52 --> [REQ_ID=9ff62e1ccb42] [ROUTE] Controller=\App\Controllers\Home Method=termsOfService
DEBUG - 2026-03-01 13:40:52 --> [REQ_ID=9ff62e1ccb42] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Terms-Of-Service
DEBUG - 2026-03-01 13:40:52 --> [CSRF] token name=csrf_test_name hash=7d8e7ba04ee759118200a54fb9058455
DEBUG - 2026-03-01 13:40:52 --> [REQ_ID=f9db64ae5ab7] [INIT] App\Controllers\Home::GET
INFO - 2026-03-01 13:40:52 --> [REQ_ID=f9db64ae5ab7] [MEMORY][controller-start] 4194304
INFO - 2026-03-01 13:40:52 --> [REQ_ID=f9db64ae5ab7] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-01 13:40:52 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-01 13:40:52 --> [REQ_ID=24750909b8d9] [REQUEST][START] GET /index.php/MyMI-Gold/Goals/Daily
DEBUG - 2026-03-01 13:40:52 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-01 13:40:52 --> [REQ_ID=24750909b8d9] [FILTER_BEFORE] /index.php/MyMI-Gold/Goals/Daily
DEBUG - 2026-03-01 13:40:52 --> [REQ_ID=24750909b8d9] [ROUTE] Controller=\App\Modules\User\Controllers\DashboardController Method=goals
DEBUG - 2026-03-01 13:40:52 --> [REQ_ID=24750909b8d9] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/MyMI-Gold/Goals/Daily
DEBUG - 2026-03-01 13:40:52 --> [CSRF] token name=csrf_test_name hash=08557058a5963d5a861dbbc2217f7c54
DEBUG - 2026-03-01 13:40:52 --> [REQ_ID=24750909b8d9] [REQUEST][END]
INFO - 2026-03-01 13:40:52 --> [REQ_ID=24750909b8d9] [PERF] Execution time=0.010158
DEBUG - 2026-03-01 13:40:52 --> [REQ_ID=6a832ff3704d] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-01 13:40:52 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-01 13:40:52 --> [REQ_ID=6a832ff3704d] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-01 13:40:52 --> [REQ_ID=6a832ff3704d] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-01 13:40:52 --> [REQ_ID=6a832ff3704d] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-01 13:40:52 --> [CSRF] token name=csrf_test_name hash=9059b1078f439cdbcbc5873fff7fd898
DEBUG - 2026-03-01 13:40:52 --> [REQ_ID=6f0109e920a0] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-01 13:40:52 --> [REQ_ID=6f0109e920a0] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-01 13:40:52 --> [REQ_ID=6a832ff3704d] [FILTER_AFTER]
DEBUG - 2026-03-01 13:40:52 --> [REQ_ID=6a832ff3704d] [LIFECYCLE][END] status=200 duration_ms=17.99 memory_delta=0
INFO - 2026-03-01 13:40:52 --> [REQ_ID=6f0109e920a0] [PERF] Execution time=0.017951
DEBUG - 2026-03-01 13:40:52 --> [REQ_ID=6a832ff3704d] [REQUEST][END]
INFO - 2026-03-01 13:40:52 --> [REQ_ID=6a832ff3704d] [PERF] Execution time=0.028377
DEBUG - 2026-03-01 13:40:52 --> [REQ_ID=a2660b8f0f7d] [REQUEST][START] GET /index.php/Support/Account
DEBUG - 2026-03-01 13:40:52 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-01 13:40:52 --> [REQ_ID=a2660b8f0f7d] [FILTER_BEFORE] /index.php/Support/Account
DEBUG - 2026-03-01 13:40:52 --> [REQ_ID=a2660b8f0f7d] [ROUTE] Controller=\App\Modules\Support\Controllers\AccountSupportController Method=index
DEBUG - 2026-03-01 13:40:52 --> [REQ_ID=a2660b8f0f7d] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Support/Account
DEBUG - 2026-03-01 13:40:52 --> [CSRF] token name=csrf_test_name hash=7f19bcf74f7e6e898d145ead709c5f6f
DEBUG - 2026-03-01 13:40:52 --> [REQ_ID=5d474e3e2e02] [INIT] App\Modules\Support\Controllers\AccountSupportController::GET
INFO - 2026-03-01 13:40:52 --> [REQ_ID=5d474e3e2e02] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-01 13:40:52 --> [REQ_ID=5d474e3e2e02] [METHOD_ENTRY] index
DEBUG - 2026-03-01 13:40:52 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-01 13:40:52 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-01 13:40:52 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-01 13:40:52 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-01 13:40:52 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-01 13:40:52 --> MyMICoin: guest context detected; skipping user-specific preload.
INFO - 2026-03-01 13:40:52 --> [REQ_ID=5d474e3e2e02] [MEMORY][commonData:start] 4194304
DEBUG - 2026-03-01 13:40:52 --> [REQ_ID=5d474e3e2e02] [VIEW_RENDER] SupportModule/Support/account_help
INFO - 2026-03-01 13:40:52 --> [REQ_ID=5d474e3e2e02] [MEMORY][commonData:start] 4194304
INFO - 2026-03-01 13:40:52 --> themesMemory usage: 4194304
DEBUG - 2026-03-01 13:40:52 --> [REQ_ID=a2660b8f0f7d] [FILTER_AFTER]
DEBUG - 2026-03-01 13:40:52 --> [REQ_ID=a2660b8f0f7d] [LIFECYCLE][END] status=200 duration_ms=25.16 memory_delta=0
INFO - 2026-03-01 13:40:52 --> [REQ_ID=5d474e3e2e02] [PERF] Execution time=0.024902
DEBUG - 2026-03-01 13:40:52 --> [REQ_ID=a2660b8f0f7d] [REQUEST][END]
INFO - 2026-03-01 13:40:52 --> [REQ_ID=a2660b8f0f7d] [PERF] Execution time=0.034761
DEBUG - 2026-03-01 13:40:52 --> [MetaService] slug=terms-of-service pageName= cacheHit= path=DB
DEBUG - 2026-03-01 13:40:52 --> [REQ_ID=f9db64ae5ab7] [VIEW_RENDER] themes/public/termsOfService
INFO - 2026-03-01 13:40:52 --> [REQ_ID=f9db64ae5ab7] [MEMORY][commonData:start] 8388608
INFO - 2026-03-01 13:40:52 --> themesMemory usage: 8388608
DEBUG - 2026-03-01 13:40:52 --> [MetaService] slug=terms-of-service pageName=Terms of Service cacheHit= path=DB
DEBUG - 2026-03-01 13:40:52 --> [REQ_ID=9ff62e1ccb42] [FILTER_AFTER]
DEBUG - 2026-03-01 13:40:52 --> [REQ_ID=9ff62e1ccb42] [LIFECYCLE][END] status=200 duration_ms=542.31 memory_delta=4194304
INFO - 2026-03-01 13:40:52 --> [REQ_ID=f9db64ae5ab7] [PERF] Execution time=0.542108
DEBUG - 2026-03-01 13:40:52 --> [REQ_ID=9ff62e1ccb42] [REQUEST][END]
INFO - 2026-03-01 13:40:52 --> [REQ_ID=9ff62e1ccb42] [PERF] Execution time=0.550787
DEBUG - 2026-03-01 13:40:53 --> [REQ_ID=a6529b443c5b] [REQUEST][START] GET /index.php/Management/Alerts
DEBUG - 2026-03-01 13:40:53 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-01 13:40:53 --> [REQ_ID=a6529b443c5b] [FILTER_BEFORE] /index.php/Management/Alerts
DEBUG - 2026-03-01 13:40:53 --> [REQ_ID=a6529b443c5b] [ROUTE] Controller=\App\Modules\Management\Controllers\AlertsAdminController Method=index
DEBUG - 2026-03-01 13:40:53 --> [REQ_ID=a6529b443c5b] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Management/Alerts
DEBUG - 2026-03-01 13:40:53 --> [CSRF] token name=csrf_test_name hash=18b60161a9c2d44343957770daeaa540
DEBUG - 2026-03-01 13:40:53 --> [REQ_ID=a6529b443c5b] [REQUEST][END]
INFO - 2026-03-01 13:40:53 --> [REQ_ID=a6529b443c5b] [PERF] Execution time=0.012679
DEBUG - 2026-03-01 13:40:53 --> [REQ_ID=e993d08caf39] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-01 13:40:53 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-01 13:40:53 --> [REQ_ID=aad1f2819d8a] [REQUEST][START] GET /index.php/Account
DEBUG - 2026-03-01 13:40:53 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-01 13:40:53 --> [REQ_ID=e993d08caf39] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-01 13:40:53 --> [REQ_ID=e993d08caf39] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-01 13:40:53 --> [REQ_ID=e993d08caf39] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-01 13:40:53 --> [CSRF] token name=csrf_test_name hash=e0eeb0661358514bdcbf9008a6811859
DEBUG - 2026-03-01 13:40:53 --> [REQ_ID=4dd94d0a6a08] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-01 13:40:53 --> [REQ_ID=4dd94d0a6a08] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-01 13:40:53 --> [REQ_ID=aad1f2819d8a] [FILTER_BEFORE] /index.php/Account
DEBUG - 2026-03-01 13:40:53 --> [REQ_ID=aad1f2819d8a] [ROUTE] Controller=\App\Modules\User\Controllers\DashboardController Method=account
DEBUG - 2026-03-01 13:40:53 --> [REQ_ID=aad1f2819d8a] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Account
DEBUG - 2026-03-01 13:40:53 --> [CSRF] token name=csrf_test_name hash=f1e7c080ed8a319665bc3b060d6f1df6
DEBUG - 2026-03-01 13:40:53 --> [REQ_ID=aad1f2819d8a] [REQUEST][END]
INFO - 2026-03-01 13:40:53 --> [REQ_ID=aad1f2819d8a] [PERF] Execution time=0.012076
DEBUG - 2026-03-01 13:40:53 --> [REQ_ID=e993d08caf39] [FILTER_AFTER]
DEBUG - 2026-03-01 13:40:53 --> [REQ_ID=e993d08caf39] [LIFECYCLE][END] status=200 duration_ms=17.79 memory_delta=0
INFO - 2026-03-01 13:40:53 --> [REQ_ID=4dd94d0a6a08] [PERF] Execution time=0.017534
DEBUG - 2026-03-01 13:40:53 --> [REQ_ID=e993d08caf39] [REQUEST][END]
INFO - 2026-03-01 13:40:53 --> [REQ_ID=e993d08caf39] [PERF] Execution time=0.029080
DEBUG - 2026-03-01 13:40:53 --> [REQ_ID=617ab7c844f3] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-01 13:40:53 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-01 13:40:53 --> [REQ_ID=617ab7c844f3] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-01 13:40:53 --> [REQ_ID=617ab7c844f3] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-01 13:40:53 --> [REQ_ID=617ab7c844f3] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-01 13:40:53 --> [CSRF] token name=csrf_test_name hash=944137a5d7bfeae32471a95e2dd1d273
DEBUG - 2026-03-01 13:40:53 --> [REQ_ID=51d1727d1b5e] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-01 13:40:53 --> [REQ_ID=51d1727d1b5e] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-01 13:40:53 --> [REQ_ID=617ab7c844f3] [FILTER_AFTER]
DEBUG - 2026-03-01 13:40:53 --> [REQ_ID=617ab7c844f3] [LIFECYCLE][END] status=200 duration_ms=14.05 memory_delta=0
INFO - 2026-03-01 13:40:53 --> [REQ_ID=51d1727d1b5e] [PERF] Execution time=0.013831
DEBUG - 2026-03-01 13:40:53 --> [REQ_ID=617ab7c844f3] [REQUEST][END]
INFO - 2026-03-01 13:40:53 --> [REQ_ID=617ab7c844f3] [PERF] Execution time=0.022637
DEBUG - 2026-03-01 13:40:53 --> [REQ_ID=5289b0ee17dc] [REQUEST][START] GET /index.php/Exchange
DEBUG - 2026-03-01 13:40:53 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-01 13:40:53 --> [REQ_ID=f7a016a6da26] [REQUEST][START] GET /index.php/Management/Marketing/Promote/Solana
DEBUG - 2026-03-01 13:40:53 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-01 13:40:53 --> [REQ_ID=5289b0ee17dc] [FILTER_BEFORE] /index.php/Exchange
DEBUG - 2026-03-01 13:40:53 --> [REQ_ID=5289b0ee17dc] [ROUTE] Controller=\App\Modules\Exchange\Controllers\ExchangeController Method=index
DEBUG - 2026-03-01 13:40:53 --> [REQ_ID=5289b0ee17dc] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Exchange
DEBUG - 2026-03-01 13:40:53 --> [CSRF] token name=csrf_test_name hash=cfbdaf96c642583c55ee33e921248b8f
DEBUG - 2026-03-01 13:40:53 --> [REQ_ID=5289b0ee17dc] [REQUEST][END]
INFO - 2026-03-01 13:40:53 --> [REQ_ID=5289b0ee17dc] [PERF] Execution time=0.014660
DEBUG - 2026-03-01 13:40:53 --> [REQ_ID=f7a016a6da26] [FILTER_BEFORE] /index.php/Management/Marketing/Promote/Solana
DEBUG - 2026-03-01 13:40:53 --> [REQ_ID=f7a016a6da26] [ROUTE] Controller=\App\Modules\Management\Controllers\MarketingAdminController Method=promote
DEBUG - 2026-03-01 13:40:53 --> [REQ_ID=f7a016a6da26] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Management/Marketing/Promote/Solana
DEBUG - 2026-03-01 13:40:53 --> [CSRF] token name=csrf_test_name hash=1d3e6bec61990b50b99d996803471997
DEBUG - 2026-03-01 13:40:53 --> [REQ_ID=f7a016a6da26] [REQUEST][END]
INFO - 2026-03-01 13:40:53 --> [REQ_ID=f7a016a6da26] [PERF] Execution time=0.012495
DEBUG - 2026-03-01 13:40:53 --> [REQ_ID=26d9463316a8] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-01 13:40:53 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-01 13:40:53 --> [REQ_ID=dbd7198884cf] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-01 13:40:53 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-01 13:40:53 --> [REQ_ID=26d9463316a8] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-01 13:40:53 --> [REQ_ID=26d9463316a8] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-01 13:40:53 --> [REQ_ID=26d9463316a8] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-01 13:40:53 --> [CSRF] token name=csrf_test_name hash=9e8c418d74b47dea923994b29ac3954e
DEBUG - 2026-03-01 13:40:53 --> [REQ_ID=e0b709ca9b2d] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-01 13:40:53 --> [REQ_ID=e0b709ca9b2d] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-01 13:40:53 --> [REQ_ID=dbd7198884cf] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-01 13:40:53 --> [REQ_ID=dbd7198884cf] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-01 13:40:53 --> [REQ_ID=dbd7198884cf] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-01 13:40:53 --> [CSRF] token name=csrf_test_name hash=7f162630224fb6141bce70eb4d9a18d4
DEBUG - 2026-03-01 13:40:53 --> [REQ_ID=ce310a6d7535] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-01 13:40:53 --> [REQ_ID=ce310a6d7535] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-01 13:40:53 --> [REQ_ID=26d9463316a8] [FILTER_AFTER]
DEBUG - 2026-03-01 13:40:53 --> [REQ_ID=26d9463316a8] [LIFECYCLE][END] status=200 duration_ms=13.56 memory_delta=0
INFO - 2026-03-01 13:40:53 --> [REQ_ID=e0b709ca9b2d] [PERF] Execution time=0.013232
DEBUG - 2026-03-01 13:40:53 --> [REQ_ID=26d9463316a8] [REQUEST][END]
INFO - 2026-03-01 13:40:53 --> [REQ_ID=26d9463316a8] [PERF] Execution time=0.025866
DEBUG - 2026-03-01 13:40:53 --> [REQ_ID=dbd7198884cf] [FILTER_AFTER]
DEBUG - 2026-03-01 13:40:53 --> [REQ_ID=dbd7198884cf] [LIFECYCLE][END] status=200 duration_ms=15.49 memory_delta=0
INFO - 2026-03-01 13:40:53 --> [REQ_ID=ce310a6d7535] [PERF] Execution time=0.015239
DEBUG - 2026-03-01 13:40:53 --> [REQ_ID=dbd7198884cf] [REQUEST][END]
INFO - 2026-03-01 13:40:53 --> [REQ_ID=dbd7198884cf] [PERF] Execution time=0.027722
DEBUG - 2026-03-01 13:40:53 --> [REQ_ID=11431ad8f681] [REQUEST][START] GET /index.php
DEBUG - 2026-03-01 13:40:53 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-01 13:40:53 --> [REQ_ID=11431ad8f681] [FILTER_BEFORE] /index.php
DEBUG - 2026-03-01 13:40:53 --> [REQ_ID=11431ad8f681] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-01 13:40:53 --> [REQ_ID=11431ad8f681] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-01 13:40:53 --> [CSRF] token name=csrf_test_name hash=654cef68e742acc8c6f6bbc705e7a98a
DEBUG - 2026-03-01 13:40:53 --> [REQ_ID=3ea5459b9057] [INIT] App\Controllers\Home::GET
INFO - 2026-03-01 13:40:53 --> [REQ_ID=3ea5459b9057] [MEMORY][controller-start] 4194304
INFO - 2026-03-01 13:40:53 --> [REQ_ID=3ea5459b9057] [MEMORY][commonData:start] 4194304
DEBUG - 2026-03-01 13:40:53 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-01 13:40:53 --> [REQ_ID=5540ec9dfb35] [REQUEST][START] GET /index.php/Management/Marketing/Schedule
DEBUG - 2026-03-01 13:40:53 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-01 13:40:53 --> [REQ_ID=5540ec9dfb35] [FILTER_BEFORE] /index.php/Management/Marketing/Schedule
DEBUG - 2026-03-01 13:40:53 --> [REQ_ID=5540ec9dfb35] [ROUTE] Controller=\App\Modules\Management\Controllers\MarketingAdminController Method=schedule
DEBUG - 2026-03-01 13:40:53 --> [REQ_ID=5540ec9dfb35] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Management/Marketing/Schedule
DEBUG - 2026-03-01 13:40:53 --> [CSRF] token name=csrf_test_name hash=95907ef97883ec82fca7808de0a51bca
DEBUG - 2026-03-01 13:40:53 --> [REQ_ID=5540ec9dfb35] [REQUEST][END]
INFO - 2026-03-01 13:40:53 --> [REQ_ID=5540ec9dfb35] [PERF] Execution time=0.010040
DEBUG - 2026-03-01 13:40:53 --> [REQ_ID=52b13c508a47] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-01 13:40:53 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-01 13:40:53 --> [REQ_ID=52b13c508a47] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-01 13:40:53 --> [REQ_ID=52b13c508a47] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-01 13:40:53 --> [REQ_ID=52b13c508a47] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-01 13:40:53 --> [CSRF] token name=csrf_test_name hash=9b8776fffdc608a52683c0195fdd03fd
DEBUG - 2026-03-01 13:40:53 --> [REQ_ID=3c47d541a979] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-01 13:40:53 --> [REQ_ID=3c47d541a979] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-01 13:40:53 --> [REQ_ID=52b13c508a47] [FILTER_AFTER]
DEBUG - 2026-03-01 13:40:53 --> [REQ_ID=52b13c508a47] [LIFECYCLE][END] status=200 duration_ms=28.51 memory_delta=0
INFO - 2026-03-01 13:40:53 --> [REQ_ID=3c47d541a979] [PERF] Execution time=0.028381
DEBUG - 2026-03-01 13:40:53 --> [REQ_ID=52b13c508a47] [REQUEST][END]
INFO - 2026-03-01 13:40:53 --> [REQ_ID=52b13c508a47] [PERF] Execution time=0.039661
DEBUG - 2026-03-01 13:40:54 --> [REQ_ID=274494d2b83b] [REQUEST][START] GET /index.php/How-It-Works
DEBUG - 2026-03-01 13:40:54 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-01 13:40:54 --> [REQ_ID=274494d2b83b] [FILTER_BEFORE] /index.php/How-It-Works
DEBUG - 2026-03-01 13:40:54 --> [REQ_ID=274494d2b83b] [ROUTE] Controller=\App\Modules\Blog\Controllers\HowItWorksController Method=index
DEBUG - 2026-03-01 13:40:54 --> [REQ_ID=274494d2b83b] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/How-It-Works
DEBUG - 2026-03-01 13:40:54 --> [CSRF] token name=csrf_test_name hash=889de29abb9f8896bac611f2cf5728c5
DEBUG - 2026-03-01 13:40:54 --> [REQ_ID=53ea8dbb51cd] [INIT] App\Modules\Blog\Controllers\HowItWorksController::GET
INFO - 2026-03-01 13:40:54 --> [REQ_ID=53ea8dbb51cd] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-01 13:40:54 --> [REQ_ID=53ea8dbb51cd] [METHOD_ENTRY] index
DEBUG - 2026-03-01 13:40:54 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-01 13:40:54 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-01 13:40:54 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-01 13:40:54 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-01 13:40:54 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-01 13:40:54 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-01 13:40:54 --> [REQ_ID=53ea8dbb51cd] [VIEW_RENDER] App\Modules\Blog\Views\HowItWorks\index
INFO - 2026-03-01 13:40:54 --> [REQ_ID=53ea8dbb51cd] [MEMORY][commonData:start] 4194304
DEBUG - 2026-03-01 13:40:54 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
DEBUG - 2026-03-01 13:40:54 --> [REQ_ID=3ea5459b9057] [VIEW_RENDER] themes/public/home
INFO - 2026-03-01 13:40:54 --> [REQ_ID=3ea5459b9057] [MEMORY][commonData:start] 8388608
INFO - 2026-03-01 13:40:54 --> themesMemory usage: 8388608
DEBUG - 2026-03-01 13:40:54 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-01 13:40:54 --> [REQ_ID=11431ad8f681] [FILTER_AFTER]
DEBUG - 2026-03-01 13:40:54 --> [REQ_ID=11431ad8f681] [LIFECYCLE][END] status=200 duration_ms=544.91 memory_delta=4194304
INFO - 2026-03-01 13:40:54 --> [REQ_ID=3ea5459b9057] [PERF] Execution time=0.544601
DEBUG - 2026-03-01 13:40:54 --> [REQ_ID=11431ad8f681] [REQUEST][END]
INFO - 2026-03-01 13:40:54 --> [REQ_ID=11431ad8f681] [PERF] Execution time=0.553671
DEBUG - 2026-03-01 13:40:54 --> [REQ_ID=bb2d9efec470] [REQUEST][START] GET /index.php/Privacy-Policy
DEBUG - 2026-03-01 13:40:54 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-01 13:40:54 --> [REQ_ID=bb2d9efec470] [FILTER_BEFORE] /index.php/Privacy-Policy
DEBUG - 2026-03-01 13:40:54 --> [REQ_ID=bb2d9efec470] [ROUTE] Controller=\App\Controllers\Home Method=privacyPolicy
DEBUG - 2026-03-01 13:40:54 --> [REQ_ID=bb2d9efec470] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Privacy-Policy
DEBUG - 2026-03-01 13:40:54 --> [CSRF] token name=csrf_test_name hash=779fbaa83811ec5f9b37de6ad3d614f8
DEBUG - 2026-03-01 13:40:54 --> [REQ_ID=066500a2a46a] [INIT] App\Controllers\Home::GET
INFO - 2026-03-01 13:40:54 --> [REQ_ID=066500a2a46a] [MEMORY][controller-start] 6291456
INFO - 2026-03-01 13:40:54 --> [REQ_ID=066500a2a46a] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-01 13:40:54 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-01 13:40:54 --> [MetaService] slug=how-it-works pageName= cacheHit= path=DB
INFO - 2026-03-01 13:40:54 --> themesMemory usage: 8388608
DEBUG - 2026-03-01 13:40:54 --> [MetaService] slug=how-it-works pageName= cacheHit=1 path=CACHE
DEBUG - 2026-03-01 13:40:54 --> [REQ_ID=274494d2b83b] [FILTER_AFTER]
DEBUG - 2026-03-01 13:40:54 --> [REQ_ID=274494d2b83b] [LIFECYCLE][END] status=200 duration_ms=576.34 memory_delta=4194304
INFO - 2026-03-01 13:40:54 --> [REQ_ID=53ea8dbb51cd] [PERF] Execution time=0.576225
DEBUG - 2026-03-01 13:40:54 --> [REQ_ID=274494d2b83b] [REQUEST][END]
INFO - 2026-03-01 13:40:54 --> [REQ_ID=274494d2b83b] [PERF] Execution time=0.585853
DEBUG - 2026-03-01 13:40:54 --> [REQ_ID=84c1c979ab5a] [REQUEST][START] GET /index.php
DEBUG - 2026-03-01 13:40:54 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-01 13:40:54 --> [REQ_ID=84c1c979ab5a] [FILTER_BEFORE] /index.php
DEBUG - 2026-03-01 13:40:54 --> [REQ_ID=84c1c979ab5a] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-01 13:40:54 --> [REQ_ID=84c1c979ab5a] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-01 13:40:54 --> [CSRF] token name=csrf_test_name hash=e2cb7277540ad660a92658285253297f
DEBUG - 2026-03-01 13:40:54 --> [REQ_ID=1314577306ea] [INIT] App\Controllers\Home::GET
INFO - 2026-03-01 13:40:54 --> [REQ_ID=1314577306ea] [MEMORY][controller-start] 6291456
INFO - 2026-03-01 13:40:54 --> [REQ_ID=1314577306ea] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-01 13:40:54 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-01 13:40:55 --> [MetaService] slug=privacy-policy pageName= cacheHit= path=DB
DEBUG - 2026-03-01 13:40:55 --> [REQ_ID=066500a2a46a] [VIEW_RENDER] themes/public/privacyPolicy
INFO - 2026-03-01 13:40:55 --> [REQ_ID=066500a2a46a] [MEMORY][commonData:start] 8388608
INFO - 2026-03-01 13:40:55 --> themesMemory usage: 8388608
DEBUG - 2026-03-01 13:40:55 --> [MetaService] slug=privacy-policy pageName=Privacy Policy cacheHit= path=DB
DEBUG - 2026-03-01 13:40:55 --> [REQ_ID=bb2d9efec470] [FILTER_AFTER]
DEBUG - 2026-03-01 13:40:55 --> [REQ_ID=bb2d9efec470] [LIFECYCLE][END] status=200 duration_ms=530.98 memory_delta=2097152
INFO - 2026-03-01 13:40:55 --> [REQ_ID=066500a2a46a] [PERF] Execution time=0.530847
DEBUG - 2026-03-01 13:40:55 --> [REQ_ID=bb2d9efec470] [REQUEST][END]
INFO - 2026-03-01 13:40:55 --> [REQ_ID=bb2d9efec470] [PERF] Execution time=0.541829
DEBUG - 2026-03-01 13:40:55 --> [REQ_ID=2258ee44f6bd] [REQUEST][START] GET /index.php/register
DEBUG - 2026-03-01 13:40:55 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-01 13:40:55 --> [REQ_ID=2258ee44f6bd] [FILTER_BEFORE] /index.php/register
DEBUG - 2026-03-01 13:40:55 --> [REQ_ID=2258ee44f6bd] [ROUTE] Controller=\App\Controllers\AuthController Method=register
DEBUG - 2026-03-01 13:40:55 --> [REQ_ID=2258ee44f6bd] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/register
DEBUG - 2026-03-01 13:40:55 --> [CSRF] token name=csrf_test_name hash=2fbb1b3d876f7ffed0515a90c6d09660
DEBUG - 2026-03-01 13:40:55 --> [REQ_ID=b4113bd83864] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-01 13:40:55 --> [REQ_ID=b4113bd83864] [MEMORY][controller-start] 6291456
INFO - 2026-03-01 13:40:55 --> [REGISTRATION] Form loaded
INFO - 2026-03-01 13:40:55 --> [REQ_ID=b4113bd83864] [PERF] Execution time=0.016231
DEBUG - 2026-03-01 13:40:55 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
DEBUG - 2026-03-01 13:40:55 --> [REQ_ID=1314577306ea] [VIEW_RENDER] themes/public/home
INFO - 2026-03-01 13:40:55 --> [REQ_ID=1314577306ea] [MEMORY][commonData:start] 8388608
INFO - 2026-03-01 13:40:55 --> themesMemory usage: 8388608
DEBUG - 2026-03-01 13:40:55 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-01 13:40:55 --> [REQ_ID=84c1c979ab5a] [FILTER_AFTER]
DEBUG - 2026-03-01 13:40:55 --> [REQ_ID=84c1c979ab5a] [LIFECYCLE][END] status=200 duration_ms=521.17 memory_delta=2097152
INFO - 2026-03-01 13:40:55 --> [REQ_ID=1314577306ea] [PERF] Execution time=0.520938
DEBUG - 2026-03-01 13:40:55 --> [REQ_ID=84c1c979ab5a] [REQUEST][END]
INFO - 2026-03-01 13:40:55 --> [REQ_ID=84c1c979ab5a] [PERF] Execution time=0.530180
DEBUG - 2026-03-01 13:40:55 --> [REQ_ID=5b8a28eb874f] [REQUEST][START] GET /index.php/Account/Social-Media
DEBUG - 2026-03-01 13:40:55 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-01 13:40:55 --> [REQ_ID=5b8a28eb874f] [FILTER_BEFORE] /index.php/Account/Social-Media
DEBUG - 2026-03-01 13:40:55 --> [REQ_ID=5b8a28eb874f] [ROUTE] Controller=\App\Modules\User\Controllers\DashboardController Method=SocialMedia
DEBUG - 2026-03-01 13:40:55 --> [REQ_ID=5b8a28eb874f] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Account/Social-Media
DEBUG - 2026-03-01 13:40:55 --> [CSRF] token name=csrf_test_name hash=7d161b75076300b31347a12c80bd8cb3
DEBUG - 2026-03-01 13:40:55 --> [REQ_ID=5b8a28eb874f] [REQUEST][END]
INFO - 2026-03-01 13:40:55 --> [REQ_ID=5b8a28eb874f] [PERF] Execution time=0.012449
DEBUG - 2026-03-01 13:40:55 --> [REQ_ID=53139e0d1782] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-01 13:40:55 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-01 13:40:55 --> [REQ_ID=53139e0d1782] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-01 13:40:55 --> [REQ_ID=53139e0d1782] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-01 13:40:55 --> [REQ_ID=53139e0d1782] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-01 13:40:55 --> [CSRF] token name=csrf_test_name hash=8a6d7c7393350ccce8450a58761f8768
DEBUG - 2026-03-01 13:40:55 --> [REQ_ID=3b8ccddb0aed] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-01 13:40:55 --> [REQ_ID=3b8ccddb0aed] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-01 13:40:55 --> [REQ_ID=53139e0d1782] [FILTER_AFTER]
DEBUG - 2026-03-01 13:40:55 --> [REQ_ID=53139e0d1782] [LIFECYCLE][END] status=200 duration_ms=17.06 memory_delta=0
INFO - 2026-03-01 13:40:55 --> [REQ_ID=3b8ccddb0aed] [PERF] Execution time=0.016728
DEBUG - 2026-03-01 13:40:55 --> [REQ_ID=53139e0d1782] [REQUEST][END]
INFO - 2026-03-01 13:40:55 --> [REQ_ID=53139e0d1782] [PERF] Execution time=0.025668
DEBUG - 2026-03-01 13:40:55 --> [REQ_ID=3915397d2d51] [REQUEST][START] GET /index.php/Management/Marketing/Content/Listing
DEBUG - 2026-03-01 13:40:55 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-01 13:40:55 --> [REQ_ID=3915397d2d51] [FILTER_BEFORE] /index.php/Management/Marketing/Content/Listing
DEBUG - 2026-03-01 13:40:55 --> [REQ_ID=3915397d2d51] [ROUTE] Controller=\App\Modules\Management\Controllers\MarketingAdminController Method=contentListing
DEBUG - 2026-03-01 13:40:55 --> [REQ_ID=3915397d2d51] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Management/Marketing/Content/Listing
DEBUG - 2026-03-01 13:40:55 --> [CSRF] token name=csrf_test_name hash=d734223683f374eb2e2b97f4909f20c2
DEBUG - 2026-03-01 13:40:55 --> [REQ_ID=3915397d2d51] [REQUEST][END]
INFO - 2026-03-01 13:40:55 --> [REQ_ID=3915397d2d51] [PERF] Execution time=0.010228
DEBUG - 2026-03-01 13:40:55 --> [REQ_ID=88c9f47ad5cf] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-01 13:40:55 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-01 13:40:55 --> [REQ_ID=88c9f47ad5cf] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-01 13:40:55 --> [REQ_ID=88c9f47ad5cf] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-01 13:40:55 --> [REQ_ID=88c9f47ad5cf] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-01 13:40:55 --> [CSRF] token name=csrf_test_name hash=a5a98664ba6ef5b816573cfc35a768bd
DEBUG - 2026-03-01 13:40:55 --> [REQ_ID=5618ee6b3b0a] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-01 13:40:55 --> [REQ_ID=5618ee6b3b0a] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-01 13:40:55 --> [REQ_ID=88c9f47ad5cf] [FILTER_AFTER]
DEBUG - 2026-03-01 13:40:55 --> [REQ_ID=88c9f47ad5cf] [LIFECYCLE][END] status=200 duration_ms=19.22 memory_delta=0
INFO - 2026-03-01 13:40:55 --> [REQ_ID=5618ee6b3b0a] [PERF] Execution time=0.019033
DEBUG - 2026-03-01 13:40:55 --> [REQ_ID=88c9f47ad5cf] [REQUEST][END]
INFO - 2026-03-01 13:40:55 --> [REQ_ID=88c9f47ad5cf] [PERF] Execution time=0.028500
DEBUG - 2026-03-01 13:40:55 --> [REQ_ID=3012f97bda2c] [REQUEST][START] GET /index.php/Account/Notifications
DEBUG - 2026-03-01 13:40:55 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-01 13:40:55 --> [REQ_ID=3012f97bda2c] [FILTER_BEFORE] /index.php/Account/Notifications
DEBUG - 2026-03-01 13:40:55 --> [REQ_ID=3012f97bda2c] [ROUTE] Controller=\App\Modules\User\Controllers\DashboardController Method=notifications
DEBUG - 2026-03-01 13:40:55 --> [REQ_ID=3012f97bda2c] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Account/Notifications
DEBUG - 2026-03-01 13:40:55 --> [CSRF] token name=csrf_test_name hash=e22a51e2e284ae1215a9bf6d3612f66d
DEBUG - 2026-03-01 13:40:55 --> [REQ_ID=3012f97bda2c] [REQUEST][END]
INFO - 2026-03-01 13:40:55 --> [REQ_ID=3012f97bda2c] [PERF] Execution time=0.009905
DEBUG - 2026-03-01 13:40:55 --> [REQ_ID=871407510880] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-01 13:40:55 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-01 13:40:55 --> [REQ_ID=871407510880] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-01 13:40:55 --> [REQ_ID=871407510880] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-01 13:40:55 --> [REQ_ID=871407510880] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-01 13:40:55 --> [CSRF] token name=csrf_test_name hash=8309b90357b62d69bf4d7dbc80ca491b
DEBUG - 2026-03-01 13:40:55 --> [REQ_ID=9355f9e05d87] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-01 13:40:55 --> [REQ_ID=9355f9e05d87] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-01 13:40:55 --> [REQ_ID=871407510880] [FILTER_AFTER]
DEBUG - 2026-03-01 13:40:55 --> [REQ_ID=871407510880] [LIFECYCLE][END] status=200 duration_ms=15.41 memory_delta=0
INFO - 2026-03-01 13:40:55 --> [REQ_ID=9355f9e05d87] [PERF] Execution time=0.015319
DEBUG - 2026-03-01 13:40:55 --> [REQ_ID=871407510880] [REQUEST][END]
INFO - 2026-03-01 13:40:55 --> [REQ_ID=871407510880] [PERF] Execution time=0.024794
DEBUG - 2026-03-01 13:40:56 --> [REQ_ID=7eaff8d4d178] [REQUEST][START] GET /index.php/Management/Budgets
DEBUG - 2026-03-01 13:40:56 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-01 13:40:56 --> [REQ_ID=7eaff8d4d178] [FILTER_BEFORE] /index.php/Management/Budgets
DEBUG - 2026-03-01 13:40:56 --> [REQ_ID=7eaff8d4d178] [ROUTE] Controller=\App\Modules\Management\Controllers\BudgetsAdminController Method=index
DEBUG - 2026-03-01 13:40:56 --> [REQ_ID=7eaff8d4d178] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Management/Budgets
DEBUG - 2026-03-01 13:40:56 --> [CSRF] token name=csrf_test_name hash=781a6a1254bed96baeb3215b576c129f
DEBUG - 2026-03-01 13:40:56 --> [REQ_ID=7eaff8d4d178] [REQUEST][END]
INFO - 2026-03-01 13:40:56 --> [REQ_ID=7eaff8d4d178] [PERF] Execution time=0.010462
DEBUG - 2026-03-01 13:40:56 --> [REQ_ID=d22f43309804] [REQUEST][START] GET /index.php/logout
DEBUG - 2026-03-01 13:40:56 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-01 13:40:56 --> [REQ_ID=d22f43309804] [FILTER_BEFORE] /index.php/logout
DEBUG - 2026-03-01 13:40:56 --> [REQ_ID=d22f43309804] [ROUTE] Controller=\App\Controllers\AuthController Method=logout
DEBUG - 2026-03-01 13:40:56 --> [REQ_ID=d22f43309804] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/logout
DEBUG - 2026-03-01 13:40:56 --> [CSRF] token name=csrf_test_name hash=453bed5850c6582c72f813b1c6a03f15
DEBUG - 2026-03-01 13:40:56 --> [REQ_ID=d22f43309804] [REQUEST][END]
INFO - 2026-03-01 13:40:56 --> [REQ_ID=d22f43309804] [PERF] Execution time=0.010527
DEBUG - 2026-03-01 13:40:56 --> [REQ_ID=6e1406144334] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-01 13:40:56 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-01 13:40:56 --> [REQ_ID=6e1406144334] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-01 13:40:56 --> [REQ_ID=6e1406144334] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-01 13:40:56 --> [REQ_ID=6e1406144334] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-01 13:40:56 --> [CSRF] token name=csrf_test_name hash=98417bae5c040e51b0076cf8c7a6bc27
DEBUG - 2026-03-01 13:40:56 --> [REQ_ID=f1fbee88b7e7] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-01 13:40:56 --> [REQ_ID=f1fbee88b7e7] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-01 13:40:56 --> [REQ_ID=6e1406144334] [FILTER_AFTER]
DEBUG - 2026-03-01 13:40:56 --> [REQ_ID=6e1406144334] [LIFECYCLE][END] status=200 duration_ms=15.77 memory_delta=0
INFO - 2026-03-01 13:40:56 --> [REQ_ID=f1fbee88b7e7] [PERF] Execution time=0.015600
DEBUG - 2026-03-01 13:40:56 --> [REQ_ID=6e1406144334] [REQUEST][END]
INFO - 2026-03-01 13:40:56 --> [REQ_ID=6e1406144334] [PERF] Execution time=0.025378
DEBUG - 2026-03-01 13:40:56 --> [REQ_ID=b592df7f1638] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-01 13:40:56 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-01 13:40:56 --> [REQ_ID=b592df7f1638] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-01 13:40:56 --> [REQ_ID=b592df7f1638] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-01 13:40:56 --> [REQ_ID=b592df7f1638] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-01 13:40:56 --> [CSRF] token name=csrf_test_name hash=6ae22fb36288bc3eef7fffb17bb1de3a
DEBUG - 2026-03-01 13:40:56 --> [REQ_ID=8ee1f54a19ce] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-01 13:40:56 --> [REQ_ID=8ee1f54a19ce] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-01 13:40:56 --> [REQ_ID=b592df7f1638] [FILTER_AFTER]
DEBUG - 2026-03-01 13:40:56 --> [REQ_ID=b592df7f1638] [LIFECYCLE][END] status=200 duration_ms=15.07 memory_delta=0
INFO - 2026-03-01 13:40:56 --> [REQ_ID=8ee1f54a19ce] [PERF] Execution time=0.014891
DEBUG - 2026-03-01 13:40:56 --> [REQ_ID=b592df7f1638] [REQUEST][END]
INFO - 2026-03-01 13:40:56 --> [REQ_ID=b592df7f1638] [PERF] Execution time=0.023730
DEBUG - 2026-03-01 13:40:56 --> [REQ_ID=c270dd6e2299] [REQUEST][START] GET /index.php/Projects
DEBUG - 2026-03-01 13:40:56 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-01 13:40:56 --> [REQ_ID=c270dd6e2299] [FILTER_BEFORE] /index.php/Projects
DEBUG - 2026-03-01 13:40:56 --> [REQ_ID=02c98b0ec7a2] [REQUEST][START] GET /index.php/Management/Marketing/Content/Generator
DEBUG - 2026-03-01 13:40:56 --> [REQ_ID=c270dd6e2299] [ROUTE] Controller=\App\Modules\User\Controllers\ProjectsController Method=index
DEBUG - 2026-03-01 13:40:56 --> [REQ_ID=c270dd6e2299] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Projects
DEBUG - 2026-03-01 13:40:56 --> [CSRF] token name=csrf_test_name hash=2cb776b720651c5c9eba127126f8b32e
DEBUG - 2026-03-01 13:40:56 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-01 13:40:56 --> [REQ_ID=c270dd6e2299] [REQUEST][END]
INFO - 2026-03-01 13:40:56 --> [REQ_ID=c270dd6e2299] [PERF] Execution time=0.012734
DEBUG - 2026-03-01 13:40:56 --> [REQ_ID=02c98b0ec7a2] [FILTER_BEFORE] /index.php/Management/Marketing/Content/Generator
DEBUG - 2026-03-01 13:40:56 --> [REQ_ID=02c98b0ec7a2] [ROUTE] Controller=\App\Modules\Management\Controllers\MarketingAdminController Method=contentGenerator
DEBUG - 2026-03-01 13:40:56 --> [REQ_ID=02c98b0ec7a2] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Management/Marketing/Content/Generator
DEBUG - 2026-03-01 13:40:56 --> [CSRF] token name=csrf_test_name hash=cc62900e536963000dc63452949be1ce
DEBUG - 2026-03-01 13:40:56 --> [REQ_ID=02c98b0ec7a2] [REQUEST][END]
INFO - 2026-03-01 13:40:56 --> [REQ_ID=02c98b0ec7a2] [PERF] Execution time=0.010806
DEBUG - 2026-03-01 13:40:56 --> [REQ_ID=480811f05984] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-01 13:40:56 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-01 13:40:56 --> [REQ_ID=148dd81f240b] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-01 13:40:56 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-01 13:40:56 --> [REQ_ID=480811f05984] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-01 13:40:56 --> [REQ_ID=480811f05984] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-01 13:40:56 --> [REQ_ID=480811f05984] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-01 13:40:56 --> [CSRF] token name=csrf_test_name hash=9d348fd515c1588a719d0c5ec2cbd9ae
DEBUG - 2026-03-01 13:40:56 --> [REQ_ID=314ef558602a] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-01 13:40:56 --> [REQ_ID=314ef558602a] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-01 13:40:56 --> [REQ_ID=148dd81f240b] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-01 13:40:56 --> [REQ_ID=148dd81f240b] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-01 13:40:56 --> [REQ_ID=148dd81f240b] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-01 13:40:56 --> [CSRF] token name=csrf_test_name hash=fad7350e4579a013191158c10192a0ec
DEBUG - 2026-03-01 13:40:56 --> [REQ_ID=71db03f5862c] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-01 13:40:56 --> [REQ_ID=71db03f5862c] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-01 13:40:56 --> [REQ_ID=148dd81f240b] [FILTER_AFTER]
DEBUG - 2026-03-01 13:40:56 --> [REQ_ID=148dd81f240b] [LIFECYCLE][END] status=200 duration_ms=13.02 memory_delta=0
INFO - 2026-03-01 13:40:56 --> [REQ_ID=71db03f5862c] [PERF] Execution time=0.012730
DEBUG - 2026-03-01 13:40:56 --> [REQ_ID=148dd81f240b] [REQUEST][END]
INFO - 2026-03-01 13:40:56 --> [REQ_ID=148dd81f240b] [PERF] Execution time=0.024493
DEBUG - 2026-03-01 13:40:56 --> [REQ_ID=480811f05984] [FILTER_AFTER]
DEBUG - 2026-03-01 13:40:56 --> [REQ_ID=480811f05984] [LIFECYCLE][END] status=200 duration_ms=19.58 memory_delta=0
INFO - 2026-03-01 13:40:56 --> [REQ_ID=314ef558602a] [PERF] Execution time=0.018488
DEBUG - 2026-03-01 13:40:56 --> [REQ_ID=480811f05984] [REQUEST][END]
INFO - 2026-03-01 13:40:56 --> [REQ_ID=480811f05984] [PERF] Execution time=0.033186
DEBUG - 2026-03-01 13:40:56 --> [REQ_ID=311c102dc6e3] [REQUEST][START] GET /index.php/Management/Marketing/Ideas
DEBUG - 2026-03-01 13:40:56 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-01 13:40:56 --> [REQ_ID=311c102dc6e3] [FILTER_BEFORE] /index.php/Management/Marketing/Ideas
DEBUG - 2026-03-01 13:40:56 --> [REQ_ID=311c102dc6e3] [ROUTE] Controller=\App\Modules\Management\Controllers\MarketingAdminController Method=ideas
DEBUG - 2026-03-01 13:40:56 --> [REQ_ID=311c102dc6e3] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Management/Marketing/Ideas
DEBUG - 2026-03-01 13:40:56 --> [CSRF] token name=csrf_test_name hash=10bc7937ec4b664de69f365e3db8b675
DEBUG - 2026-03-01 13:40:56 --> [REQ_ID=311c102dc6e3] [REQUEST][END]
INFO - 2026-03-01 13:40:56 --> [REQ_ID=311c102dc6e3] [PERF] Execution time=0.011242
DEBUG - 2026-03-01 13:40:56 --> [REQ_ID=7688d8bf48c2] [REQUEST][START] GET /index.php/activate
DEBUG - 2026-03-01 13:40:56 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-01 13:40:56 --> [REQ_ID=2bdeee638337] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-01 13:40:56 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-01 13:40:56 --> [REQ_ID=7688d8bf48c2] [FILTER_BEFORE] /index.php/activate
DEBUG - 2026-03-01 13:40:56 --> [REQ_ID=7688d8bf48c2] [ROUTE] Controller=\App\Controllers\AuthController Method=activateAccount
DEBUG - 2026-03-01 13:40:56 --> [REQ_ID=7688d8bf48c2] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/activate
DEBUG - 2026-03-01 13:40:56 --> [CSRF] token name=csrf_test_name hash=77cc10c50b85742211c6bd2fe353184f
DEBUG - 2026-03-01 13:40:56 --> [REQ_ID=db6cf95526db] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-01 13:40:56 --> [REQ_ID=db6cf95526db] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-01 13:40:56 --> [REQ_ID=2bdeee638337] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-01 13:40:56 --> [REQ_ID=2bdeee638337] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-01 13:40:56 --> [REQ_ID=2bdeee638337] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-01 13:40:56 --> [CSRF] token name=csrf_test_name hash=43b75a6d7bd86f7c5b63e2cf22de5196
DEBUG - 2026-03-01 13:40:56 --> [REQ_ID=e6e994ef8398] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-01 13:40:56 --> [REQ_ID=e6e994ef8398] [MEMORY][controller-start] 4194304
INFO - 2026-03-01 13:40:56 --> [ACTIVATION] Activation link hit
DEBUG - 2026-03-01 13:40:56 --> [REQ_ID=2bdeee638337] [FILTER_AFTER]
DEBUG - 2026-03-01 13:40:56 --> [REQ_ID=2bdeee638337] [LIFECYCLE][END] status=200 duration_ms=15.61 memory_delta=0
INFO - 2026-03-01 13:40:56 --> [REQ_ID=e6e994ef8398] [PERF] Execution time=0.015382
DEBUG - 2026-03-01 13:40:56 --> [REQ_ID=2bdeee638337] [REQUEST][END]
INFO - 2026-03-01 13:40:56 --> [REQ_ID=2bdeee638337] [PERF] Execution time=0.029090
WARNING - 2026-03-01 13:40:56 --> [ACTIVATION] Activation failed: missing token
DEBUG - 2026-03-01 13:40:56 --> [REQ_ID=7688d8bf48c2] [FILTER_AFTER]
DEBUG - 2026-03-01 13:40:56 --> [REQ_ID=7688d8bf48c2] [LIFECYCLE][END] status=302 duration_ms=36.80 memory_delta=0
INFO - 2026-03-01 13:40:56 --> [REQ_ID=db6cf95526db] [PERF] Execution time=0.036143
DEBUG - 2026-03-01 13:40:56 --> [REQ_ID=7688d8bf48c2] [REQUEST][END]
INFO - 2026-03-01 13:40:56 --> [REQ_ID=7688d8bf48c2] [PERF] Execution time=0.051144
DEBUG - 2026-03-01 13:40:56 --> [REQ_ID=84f883de7068] [REQUEST][START] GET /index.php/Support/Account
DEBUG - 2026-03-01 13:40:56 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-01 13:40:56 --> [REQ_ID=84f883de7068] [FILTER_BEFORE] /index.php/Support/Account
DEBUG - 2026-03-01 13:40:56 --> [REQ_ID=84f883de7068] [ROUTE] Controller=\App\Modules\Support\Controllers\AccountSupportController Method=index
DEBUG - 2026-03-01 13:40:56 --> [REQ_ID=84f883de7068] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Support/Account
DEBUG - 2026-03-01 13:40:56 --> [CSRF] token name=csrf_test_name hash=f0ca9eab3124f6352bed7339feff5c6b
DEBUG - 2026-03-01 13:40:56 --> [REQ_ID=6f6e02b2ea39] [INIT] App\Modules\Support\Controllers\AccountSupportController::GET
INFO - 2026-03-01 13:40:56 --> [REQ_ID=6f6e02b2ea39] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-01 13:40:56 --> [REQ_ID=6f6e02b2ea39] [METHOD_ENTRY] index
DEBUG - 2026-03-01 13:40:56 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-01 13:40:56 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-01 13:40:56 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-01 13:40:56 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-01 13:40:56 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-01 13:40:56 --> MyMICoin: guest context detected; skipping user-specific preload.
INFO - 2026-03-01 13:40:56 --> [REQ_ID=6f6e02b2ea39] [MEMORY][commonData:start] 4194304
DEBUG - 2026-03-01 13:40:56 --> [REQ_ID=6f6e02b2ea39] [VIEW_RENDER] SupportModule/Support/account_help
INFO - 2026-03-01 13:40:56 --> [REQ_ID=6f6e02b2ea39] [MEMORY][commonData:start] 4194304
INFO - 2026-03-01 13:40:56 --> themesMemory usage: 4194304
DEBUG - 2026-03-01 13:40:56 --> [REQ_ID=84f883de7068] [FILTER_AFTER]
DEBUG - 2026-03-01 13:40:56 --> [REQ_ID=84f883de7068] [LIFECYCLE][END] status=200 duration_ms=29.92 memory_delta=0
INFO - 2026-03-01 13:40:56 --> [REQ_ID=6f6e02b2ea39] [PERF] Execution time=0.029743
DEBUG - 2026-03-01 13:40:56 --> [REQ_ID=84f883de7068] [REQUEST][END]
INFO - 2026-03-01 13:40:56 --> [REQ_ID=84f883de7068] [PERF] Execution time=0.039815
DEBUG - 2026-03-01 13:40:56 --> [REQ_ID=d4915046be43] [REQUEST][START] GET /index.php/forgot
DEBUG - 2026-03-01 13:40:56 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-01 13:40:56 --> [REQ_ID=d4915046be43] [FILTER_BEFORE] /index.php/forgot
DEBUG - 2026-03-01 13:40:56 --> [REQ_ID=d4915046be43] [ROUTE] Controller=\Myth\Auth\Controllers\AuthController Method=forgotPassword
DEBUG - 2026-03-01 13:40:56 --> [REQ_ID=d4915046be43] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/forgot
DEBUG - 2026-03-01 13:40:56 --> [CSRF] token name=csrf_test_name hash=5896ffa093ce35f7ff92a1499ecc0613
DEBUG - 2026-03-01 13:40:56 --> [REQ_ID=d4915046be43] [FILTER_AFTER]
DEBUG - 2026-03-01 13:40:56 --> [REQ_ID=d4915046be43] [LIFECYCLE][END] status=200 duration_ms=2.84 memory_delta=0
DEBUG - 2026-03-01 13:40:56 --> [REQ_ID=d4915046be43] [REQUEST][END]
INFO - 2026-03-01 13:40:56 --> [REQ_ID=d4915046be43] [PERF] Execution time=0.012553
DEBUG - 2026-03-01 13:40:57 --> [REQ_ID=b7f6fde75010] [REQUEST][START] GET /index.php/Account/Connected-Accounts
DEBUG - 2026-03-01 13:40:57 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-01 13:40:57 --> [REQ_ID=b7f6fde75010] [FILTER_BEFORE] /index.php/Account/Connected-Accounts
DEBUG - 2026-03-01 13:40:57 --> [REQ_ID=b7f6fde75010] [ROUTE] Controller=\App\Modules\User\Controllers\DashboardController Method=connectedAccounts
DEBUG - 2026-03-01 13:40:57 --> [REQ_ID=b7f6fde75010] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Account/Connected-Accounts
DEBUG - 2026-03-01 13:40:57 --> [CSRF] token name=csrf_test_name hash=adc043ff5213667f2df1621c9971777f
DEBUG - 2026-03-01 13:40:57 --> [REQ_ID=b7f6fde75010] [REQUEST][END]
INFO - 2026-03-01 13:40:57 --> [REQ_ID=b7f6fde75010] [PERF] Execution time=0.009965
DEBUG - 2026-03-01 13:40:57 --> [REQ_ID=6a0419d14f64] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-01 13:40:57 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-01 13:40:57 --> [REQ_ID=6a0419d14f64] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-01 13:40:57 --> [REQ_ID=6a0419d14f64] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-01 13:40:57 --> [REQ_ID=6a0419d14f64] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-01 13:40:57 --> [CSRF] token name=csrf_test_name hash=3355288052a27e078414fb68b61f7083
DEBUG - 2026-03-01 13:40:57 --> [REQ_ID=83231cc0bbac] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-01 13:40:57 --> [REQ_ID=83231cc0bbac] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-01 13:40:57 --> [REQ_ID=6a0419d14f64] [FILTER_AFTER]
DEBUG - 2026-03-01 13:40:57 --> [REQ_ID=6a0419d14f64] [LIFECYCLE][END] status=200 duration_ms=18.90 memory_delta=0
INFO - 2026-03-01 13:40:57 --> [REQ_ID=83231cc0bbac] [PERF] Execution time=0.018664
DEBUG - 2026-03-01 13:40:57 --> [REQ_ID=6a0419d14f64] [REQUEST][END]
INFO - 2026-03-01 13:40:57 --> [REQ_ID=6a0419d14f64] [PERF] Execution time=0.028396
DEBUG - 2026-03-01 13:40:57 --> [REQ_ID=e32585d7d0dd] [REQUEST][START] GET /index.php/Management/Exchange
DEBUG - 2026-03-01 13:40:57 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-01 13:40:57 --> [REQ_ID=e32585d7d0dd] [FILTER_BEFORE] /index.php/Management/Exchange
DEBUG - 2026-03-01 13:40:57 --> [REQ_ID=e32585d7d0dd] [ROUTE] Controller=\App\Modules\Management\Controllers\ExchangeAdminController Method=index
DEBUG - 2026-03-01 13:40:57 --> [REQ_ID=e32585d7d0dd] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Management/Exchange
DEBUG - 2026-03-01 13:40:57 --> [CSRF] token name=csrf_test_name hash=725b1f6e928ed12208dfb2084d4ea203
DEBUG - 2026-03-01 13:40:57 --> [REQ_ID=e32585d7d0dd] [REQUEST][END]
INFO - 2026-03-01 13:40:57 --> [REQ_ID=e32585d7d0dd] [PERF] Execution time=0.011238
DEBUG - 2026-03-01 13:40:57 --> [REQ_ID=cebbfc567be6] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-01 13:40:57 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-01 13:40:57 --> [REQ_ID=cebbfc567be6] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-01 13:40:57 --> [REQ_ID=cebbfc567be6] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-01 13:40:57 --> [REQ_ID=cebbfc567be6] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-01 13:40:57 --> [CSRF] token name=csrf_test_name hash=5497a22f593993fde11cb255635decd0
DEBUG - 2026-03-01 13:40:57 --> [REQ_ID=7c3e9a0883cf] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-01 13:40:57 --> [REQ_ID=7c3e9a0883cf] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-01 13:40:57 --> [REQ_ID=cebbfc567be6] [FILTER_AFTER]
DEBUG - 2026-03-01 13:40:57 --> [REQ_ID=cebbfc567be6] [LIFECYCLE][END] status=200 duration_ms=18.29 memory_delta=0
INFO - 2026-03-01 13:40:57 --> [REQ_ID=7c3e9a0883cf] [PERF] Execution time=0.018171
DEBUG - 2026-03-01 13:40:57 --> [REQ_ID=cebbfc567be6] [REQUEST][END]
INFO - 2026-03-01 13:40:57 --> [REQ_ID=cebbfc567be6] [PERF] Execution time=0.027149
DEBUG - 2026-03-01 13:40:57 --> [REQ_ID=61bac6567d3e] [REQUEST][START] GET /index.php/Management/API
DEBUG - 2026-03-01 13:40:57 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-01 13:40:57 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: GET, Route: Management/API]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-01 13:40:57 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-01 13:40:57 --> [404] URI=https://www.mymiwallet.com/index.php/Management/API
WARNING - 2026-03-01 13:40:57 --> 404 route miss: https://www.mymiwallet.com/index.php/Management/API | referrer: none
ERROR - 2026-03-01 13:40:57 --> [ERROR_PAGE] event=error_404 status=404 message=Page not found.
DEBUG - 2026-03-01 13:40:57 --> [REQ_ID=0358c75b734a] [REQUEST][START] GET /index.php/Management/Admin
DEBUG - 2026-03-01 13:40:57 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-01 13:40:57 --> [REQ_ID=0358c75b734a] [FILTER_BEFORE] /index.php/Management/Admin
DEBUG - 2026-03-01 13:40:57 --> [REQ_ID=0358c75b734a] [ROUTE] Controller=\App\Modules\Management\Controllers\AdminController Method=index
DEBUG - 2026-03-01 13:40:57 --> [REQ_ID=0358c75b734a] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Management/Admin
DEBUG - 2026-03-01 13:40:57 --> [CSRF] token name=csrf_test_name hash=0a37e8216d7c4c457fa597463dc00448
DEBUG - 2026-03-01 13:40:57 --> [REQ_ID=0358c75b734a] [REQUEST][END]
INFO - 2026-03-01 13:40:57 --> [REQ_ID=0358c75b734a] [PERF] Execution time=0.010977
DEBUG - 2026-03-01 13:40:57 --> [REQ_ID=395374cb7d73] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-01 13:40:57 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-01 13:40:57 --> [REQ_ID=395374cb7d73] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-01 13:40:57 --> [REQ_ID=395374cb7d73] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-01 13:40:57 --> [REQ_ID=395374cb7d73] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-01 13:40:57 --> [CSRF] token name=csrf_test_name hash=fef3eb7ec79eacd33853c63d8adfaa19
DEBUG - 2026-03-01 13:40:57 --> [REQ_ID=4414bb3e1d37] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-01 13:40:57 --> [REQ_ID=4414bb3e1d37] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-01 13:40:57 --> [REQ_ID=395374cb7d73] [FILTER_AFTER]
DEBUG - 2026-03-01 13:40:57 --> [REQ_ID=395374cb7d73] [LIFECYCLE][END] status=200 duration_ms=15.49 memory_delta=0
INFO - 2026-03-01 13:40:57 --> [REQ_ID=4414bb3e1d37] [PERF] Execution time=0.015348
DEBUG - 2026-03-01 13:40:57 --> [REQ_ID=395374cb7d73] [REQUEST][END]
INFO - 2026-03-01 13:40:57 --> [REQ_ID=395374cb7d73] [PERF] Execution time=0.023954
DEBUG - 2026-03-01 13:40:57 --> [REQ_ID=4d92ddb71e99] [REQUEST][START] GET /index.php/Marketplace
DEBUG - 2026-03-01 13:40:57 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-01 13:40:57 --> [REQ_ID=4d92ddb71e99] [FILTER_BEFORE] /index.php/Marketplace
DEBUG - 2026-03-01 13:40:57 --> [REQ_ID=4d92ddb71e99] [ROUTE] Controller=\App\Modules\ScriptStudio\Controllers\ScriptStudioController Method=marketplace
DEBUG - 2026-03-01 13:40:57 --> [REQ_ID=4d92ddb71e99] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Marketplace
DEBUG - 2026-03-01 13:40:57 --> [CSRF] token name=csrf_test_name hash=acf8e6558060feb18b55717c76e5c16d
DEBUG - 2026-03-01 13:40:57 --> [REQ_ID=4d92ddb71e99] [REQUEST][END]
INFO - 2026-03-01 13:40:57 --> [REQ_ID=4d92ddb71e99] [PERF] Execution time=0.010635
DEBUG - 2026-03-01 13:40:57 --> [REQ_ID=6c2b0e086368] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-01 13:40:57 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-01 13:40:57 --> [REQ_ID=6c2b0e086368] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-01 13:40:57 --> [REQ_ID=6c2b0e086368] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-01 13:40:57 --> [REQ_ID=6c2b0e086368] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-01 13:40:57 --> [CSRF] token name=csrf_test_name hash=15fdfba1503c100d8d20059c1a522b05
DEBUG - 2026-03-01 13:40:57 --> [REQ_ID=30b909999385] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-01 13:40:57 --> [REQ_ID=30b909999385] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-01 13:40:57 --> [REQ_ID=6c2b0e086368] [FILTER_AFTER]
DEBUG - 2026-03-01 13:40:57 --> [REQ_ID=6c2b0e086368] [LIFECYCLE][END] status=200 duration_ms=15.67 memory_delta=0
INFO - 2026-03-01 13:40:57 --> [REQ_ID=30b909999385] [PERF] Execution time=0.015490
DEBUG - 2026-03-01 13:40:57 --> [REQ_ID=6c2b0e086368] [REQUEST][END]
INFO - 2026-03-01 13:40:57 --> [REQ_ID=6c2b0e086368] [PERF] Execution time=0.027102
DEBUG - 2026-03-01 13:40:57 --> [REQ_ID=65fc6f7e3141] [REQUEST][START] GET /index.php/Assets
DEBUG - 2026-03-01 13:40:57 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-01 13:40:57 --> [REQ_ID=65fc6f7e3141] [FILTER_BEFORE] /index.php/Assets
DEBUG - 2026-03-01 13:40:57 --> [REQ_ID=65fc6f7e3141] [ROUTE] Controller=\App\Modules\Management\Controllers\AssetsController Method=index
DEBUG - 2026-03-01 13:40:57 --> [REQ_ID=65fc6f7e3141] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Assets
DEBUG - 2026-03-01 13:40:57 --> [CSRF] token name=csrf_test_name hash=48c81111675b55fd947acdafff925d68
DEBUG - 2026-03-01 13:40:57 --> [REQ_ID=65fc6f7e3141] [REQUEST][END]
INFO - 2026-03-01 13:40:57 --> [REQ_ID=65fc6f7e3141] [PERF] Execution time=0.009613
DEBUG - 2026-03-01 13:40:57 --> [REQ_ID=5e88c6fb3da9] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-01 13:40:57 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-01 13:40:57 --> [REQ_ID=5e88c6fb3da9] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-01 13:40:57 --> [REQ_ID=5e88c6fb3da9] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-01 13:40:57 --> [REQ_ID=5e88c6fb3da9] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-01 13:40:57 --> [CSRF] token name=csrf_test_name hash=9aaeb0a504f2158b303c046fcc032c3b
DEBUG - 2026-03-01 13:40:57 --> [REQ_ID=d81ed2e22443] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-01 13:40:57 --> [REQ_ID=d81ed2e22443] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-01 13:40:57 --> [REQ_ID=5e88c6fb3da9] [FILTER_AFTER]
DEBUG - 2026-03-01 13:40:57 --> [REQ_ID=5e88c6fb3da9] [LIFECYCLE][END] status=200 duration_ms=27.66 memory_delta=0
INFO - 2026-03-01 13:40:57 --> [REQ_ID=d81ed2e22443] [PERF] Execution time=0.027577
DEBUG - 2026-03-01 13:40:57 --> [REQ_ID=5e88c6fb3da9] [REQUEST][END]
INFO - 2026-03-01 13:40:57 --> [REQ_ID=5e88c6fb3da9] [PERF] Execution time=0.037759
DEBUG - 2026-03-01 13:40:57 --> [REQ_ID=4288365f91cf] [REQUEST][START] GET /index.php/Management/Marketing/Campaigns
DEBUG - 2026-03-01 13:40:57 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-01 13:40:57 --> [REQ_ID=4288365f91cf] [FILTER_BEFORE] /index.php/Management/Marketing/Campaigns
DEBUG - 2026-03-01 13:40:57 --> [REQ_ID=4288365f91cf] [ROUTE] Controller=\App\Modules\Management\Controllers\MarketingAdminController Method=campaigns
DEBUG - 2026-03-01 13:40:57 --> [REQ_ID=4288365f91cf] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Management/Marketing/Campaigns
DEBUG - 2026-03-01 13:40:57 --> [CSRF] token name=csrf_test_name hash=943eeabaecf4587f5f91e3604336528c
DEBUG - 2026-03-01 13:40:57 --> [REQ_ID=4288365f91cf] [REQUEST][END]
INFO - 2026-03-01 13:40:57 --> [REQ_ID=4288365f91cf] [PERF] Execution time=0.010410
DEBUG - 2026-03-01 13:40:57 --> [REQ_ID=5bd9fc77101c] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-01 13:40:57 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-01 13:40:57 --> [REQ_ID=5bd9fc77101c] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-01 13:40:57 --> [REQ_ID=5bd9fc77101c] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-01 13:40:57 --> [REQ_ID=5bd9fc77101c] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-01 13:40:57 --> [CSRF] token name=csrf_test_name hash=87326dfc52588538c42e3490f03abeb9
DEBUG - 2026-03-01 13:40:57 --> [REQ_ID=bb095772fe21] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-01 13:40:57 --> [REQ_ID=bb095772fe21] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-01 13:40:57 --> [REQ_ID=5bd9fc77101c] [FILTER_AFTER]
DEBUG - 2026-03-01 13:40:57 --> [REQ_ID=5bd9fc77101c] [LIFECYCLE][END] status=200 duration_ms=17.03 memory_delta=0
INFO - 2026-03-01 13:40:57 --> [REQ_ID=bb095772fe21] [PERF] Execution time=0.016622
DEBUG - 2026-03-01 13:40:57 --> [REQ_ID=5bd9fc77101c] [REQUEST][END]
INFO - 2026-03-01 13:40:57 --> [REQ_ID=5bd9fc77101c] [PERF] Execution time=0.031094
DEBUG - 2026-03-01 13:40:58 --> [REQ_ID=d5095de33db4] [REQUEST][START] GET /index.php/Budget
DEBUG - 2026-03-01 13:40:58 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-01 13:40:58 --> [REQ_ID=d5095de33db4] [FILTER_BEFORE] /index.php/Budget
DEBUG - 2026-03-01 13:40:58 --> [REQ_ID=d5095de33db4] [ROUTE] Controller=\App\Modules\User\Controllers\BudgetController Method=index
DEBUG - 2026-03-01 13:40:58 --> [REQ_ID=d5095de33db4] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Budget
DEBUG - 2026-03-01 13:40:58 --> [CSRF] token name=csrf_test_name hash=586d06c6d8235adcf3de9a9dd6069400
DEBUG - 2026-03-01 13:40:58 --> [REQ_ID=d5095de33db4] [REQUEST][END]
INFO - 2026-03-01 13:40:58 --> [REQ_ID=d5095de33db4] [PERF] Execution time=0.014104
DEBUG - 2026-03-01 13:40:58 --> [REQ_ID=9c39a22ba025] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-01 13:40:58 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-01 13:40:58 --> [REQ_ID=9c39a22ba025] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-01 13:40:58 --> [REQ_ID=9c39a22ba025] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-01 13:40:58 --> [REQ_ID=9c39a22ba025] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-01 13:40:58 --> [CSRF] token name=csrf_test_name hash=9f4cc6b43881e0bc09eec78a8d66d27f
DEBUG - 2026-03-01 13:40:58 --> [REQ_ID=9fac142203e3] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-01 13:40:58 --> [REQ_ID=9fac142203e3] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-01 13:40:58 --> [REQ_ID=9c39a22ba025] [FILTER_AFTER]
DEBUG - 2026-03-01 13:40:58 --> [REQ_ID=9c39a22ba025] [LIFECYCLE][END] status=200 duration_ms=12.99 memory_delta=0
INFO - 2026-03-01 13:40:58 --> [REQ_ID=9fac142203e3] [PERF] Execution time=0.012752
DEBUG - 2026-03-01 13:40:58 --> [REQ_ID=9c39a22ba025] [REQUEST][END]
INFO - 2026-03-01 13:40:58 --> [REQ_ID=9c39a22ba025] [PERF] Execution time=0.021421
DEBUG - 2026-03-01 13:40:58 --> [REQ_ID=a87bc4d67df9] [REQUEST][START] GET /index.php/Management/Marketing
DEBUG - 2026-03-01 13:40:58 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-01 13:40:58 --> [REQ_ID=a87bc4d67df9] [FILTER_BEFORE] /index.php/Management/Marketing
DEBUG - 2026-03-01 13:40:58 --> [REQ_ID=a87bc4d67df9] [ROUTE] Controller=\App\Modules\Management\Controllers\MarketingAdminController Method=index
DEBUG - 2026-03-01 13:40:58 --> [REQ_ID=a87bc4d67df9] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Management/Marketing
DEBUG - 2026-03-01 13:40:58 --> [CSRF] token name=csrf_test_name hash=c584541961a7d52c000e7677bc75179b
DEBUG - 2026-03-01 13:40:58 --> [REQ_ID=a87bc4d67df9] [REQUEST][END]
INFO - 2026-03-01 13:40:58 --> [REQ_ID=a87bc4d67df9] [PERF] Execution time=0.009531
DEBUG - 2026-03-01 13:40:58 --> [REQ_ID=673beb3da3d5] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-01 13:40:58 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-01 13:40:58 --> [REQ_ID=673beb3da3d5] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-01 13:40:58 --> [REQ_ID=673beb3da3d5] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-01 13:40:58 --> [REQ_ID=673beb3da3d5] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-01 13:40:58 --> [CSRF] token name=csrf_test_name hash=8f9e9b8870b3210bb42fe233f07d1ab0
DEBUG - 2026-03-01 13:40:58 --> [REQ_ID=b06aceafa827] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-01 13:40:58 --> [REQ_ID=b06aceafa827] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-01 13:40:58 --> [REQ_ID=673beb3da3d5] [FILTER_AFTER]
DEBUG - 2026-03-01 13:40:58 --> [REQ_ID=673beb3da3d5] [LIFECYCLE][END] status=200 duration_ms=14.88 memory_delta=0
INFO - 2026-03-01 13:40:58 --> [REQ_ID=b06aceafa827] [PERF] Execution time=0.014757
DEBUG - 2026-03-01 13:40:58 --> [REQ_ID=673beb3da3d5] [REQUEST][END]
INFO - 2026-03-01 13:40:58 --> [REQ_ID=673beb3da3d5] [PERF] Execution time=0.023309
DEBUG - 2026-03-01 13:40:58 --> [REQ_ID=40bae2df8fdd] [REQUEST][START] GET /
DEBUG - 2026-03-01 13:40:58 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-01 13:40:58 --> [REQ_ID=40bae2df8fdd] [FILTER_BEFORE] /
DEBUG - 2026-03-01 13:40:58 --> [REQ_ID=40bae2df8fdd] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-01 13:40:58 --> [REQ_ID=40bae2df8fdd] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-01 13:40:58 --> [CSRF] token name=csrf_test_name hash=4ac3b48d82239b58ff1ecad394daed8e
DEBUG - 2026-03-01 13:40:58 --> [REQ_ID=b33314059398] [INIT] App\Controllers\Home::GET
INFO - 2026-03-01 13:40:58 --> [REQ_ID=b33314059398] [MEMORY][controller-start] 4194304
INFO - 2026-03-01 13:40:58 --> [REQ_ID=b33314059398] [MEMORY][commonData:start] 4194304
DEBUG - 2026-03-01 13:40:58 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-01 13:40:59 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
DEBUG - 2026-03-01 13:40:59 --> [REQ_ID=b33314059398] [VIEW_RENDER] themes/public/home
INFO - 2026-03-01 13:40:59 --> [REQ_ID=b33314059398] [MEMORY][commonData:start] 8388608
INFO - 2026-03-01 13:40:59 --> themesMemory usage: 8388608
DEBUG - 2026-03-01 13:40:59 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-01 13:40:59 --> [REQ_ID=40bae2df8fdd] [FILTER_AFTER]
DEBUG - 2026-03-01 13:40:59 --> [REQ_ID=40bae2df8fdd] [LIFECYCLE][END] status=200 duration_ms=500.69 memory_delta=4194304
INFO - 2026-03-01 13:40:59 --> [REQ_ID=b33314059398] [PERF] Execution time=0.500367
DEBUG - 2026-03-01 13:40:59 --> [REQ_ID=40bae2df8fdd] [REQUEST][END]
INFO - 2026-03-01 13:40:59 --> [REQ_ID=40bae2df8fdd] [PERF] Execution time=0.509722
DEBUG - 2026-03-01 13:40:59 --> [REQ_ID=37ac65db773f] [REQUEST][START] GET /
DEBUG - 2026-03-01 13:40:59 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-01 13:40:59 --> [REQ_ID=37ac65db773f] [FILTER_BEFORE] /
DEBUG - 2026-03-01 13:40:59 --> [REQ_ID=37ac65db773f] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-01 13:40:59 --> [REQ_ID=37ac65db773f] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-01 13:40:59 --> [CSRF] token name=csrf_test_name hash=c6ca6c48f269c9ab86cb52b6ffa95516
DEBUG - 2026-03-01 13:40:59 --> [REQ_ID=1504a62f9c74] [INIT] App\Controllers\Home::GET
INFO - 2026-03-01 13:40:59 --> [REQ_ID=1504a62f9c74] [MEMORY][controller-start] 6291456
INFO - 2026-03-01 13:40:59 --> [REQ_ID=1504a62f9c74] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-01 13:40:59 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-01 13:40:59 --> [REQ_ID=022580f2a203] [REQUEST][START] GET /
DEBUG - 2026-03-01 13:40:59 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-01 13:40:59 --> [REQ_ID=022580f2a203] [FILTER_BEFORE] /
DEBUG - 2026-03-01 13:40:59 --> [REQ_ID=022580f2a203] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-01 13:40:59 --> [REQ_ID=022580f2a203] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-01 13:40:59 --> [CSRF] token name=csrf_test_name hash=17d3ee3fa29c4cb19fefc00ed9c25cd8
DEBUG - 2026-03-01 13:40:59 --> [REQ_ID=0e046ae4ed47] [INIT] App\Controllers\Home::GET
INFO - 2026-03-01 13:40:59 --> [REQ_ID=0e046ae4ed47] [MEMORY][controller-start] 4194304
INFO - 2026-03-01 13:40:59 --> [REQ_ID=0e046ae4ed47] [MEMORY][commonData:start] 4194304
DEBUG - 2026-03-01 13:40:59 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-01 13:40:59 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
DEBUG - 2026-03-01 13:40:59 --> [REQ_ID=1504a62f9c74] [VIEW_RENDER] themes/public/home
INFO - 2026-03-01 13:40:59 --> [REQ_ID=1504a62f9c74] [MEMORY][commonData:start] 8388608
INFO - 2026-03-01 13:40:59 --> themesMemory usage: 8388608
DEBUG - 2026-03-01 13:40:59 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-01 13:40:59 --> [REQ_ID=37ac65db773f] [FILTER_AFTER]
DEBUG - 2026-03-01 13:40:59 --> [REQ_ID=37ac65db773f] [LIFECYCLE][END] status=200 duration_ms=496.89 memory_delta=2097152
INFO - 2026-03-01 13:40:59 --> [REQ_ID=1504a62f9c74] [PERF] Execution time=0.496670
DEBUG - 2026-03-01 13:40:59 --> [REQ_ID=37ac65db773f] [REQUEST][END]
INFO - 2026-03-01 13:40:59 --> [REQ_ID=37ac65db773f] [PERF] Execution time=0.505790
DEBUG - 2026-03-01 13:40:59 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
DEBUG - 2026-03-01 13:40:59 --> [REQ_ID=0e046ae4ed47] [VIEW_RENDER] themes/public/home
INFO - 2026-03-01 13:40:59 --> [REQ_ID=0e046ae4ed47] [MEMORY][commonData:start] 8388608
INFO - 2026-03-01 13:40:59 --> themesMemory usage: 8388608
DEBUG - 2026-03-01 13:40:59 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-01 13:40:59 --> [REQ_ID=022580f2a203] [FILTER_AFTER]
DEBUG - 2026-03-01 13:40:59 --> [REQ_ID=022580f2a203] [LIFECYCLE][END] status=200 duration_ms=522.13 memory_delta=4194304
INFO - 2026-03-01 13:40:59 --> [REQ_ID=0e046ae4ed47] [PERF] Execution time=0.521805
DEBUG - 2026-03-01 13:40:59 --> [REQ_ID=022580f2a203] [REQUEST][END]
INFO - 2026-03-01 13:40:59 --> [REQ_ID=022580f2a203] [PERF] Execution time=0.531697
INFO - 2026-03-01 13:45:01 --> [spark:ops:work] Started
INFO - 2026-03-01 13:45:01 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-03-01 13:45:01 --> [SPARK_MEMORY] 16777216
INFO - 2026-03-01 13:45:01 --> [spark:ops:work] Intent
INFO - 2026-03-01 13:45:01 --> [spark:ops:work] Completed
INFO - 2026-03-01 13:45:01 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.036120
INFO - 2026-03-01 13:45:01 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-03-01 13:58:28 --> [REQ_ID=a3195f7a3066] [REQUEST][START] GET /index.php/Support
DEBUG - 2026-03-01 13:58:28 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-01 13:58:28 --> [REQ_ID=a3195f7a3066] [FILTER_BEFORE] /index.php/Support
DEBUG - 2026-03-01 13:58:28 --> [REQ_ID=a3195f7a3066] [ROUTE] Controller=\App\Modules\Support\Controllers\SupportController Method=index
DEBUG - 2026-03-01 13:58:28 --> [REQ_ID=a3195f7a3066] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Support
DEBUG - 2026-03-01 13:58:28 --> [CSRF] token name=csrf_test_name hash=d757c5134c1b11e81d3fcfe31547e009
DEBUG - 2026-03-01 13:58:28 --> [REQ_ID=a6f7ff112a59] [INIT] App\Modules\Support\Controllers\SupportController::GET
INFO - 2026-03-01 13:58:28 --> [REQ_ID=a6f7ff112a59] [MEMORY][controller-start] 6291456
DEBUG - 2026-03-01 13:58:28 --> [REQ_ID=a6f7ff112a59] [METHOD_ENTRY] index
DEBUG - 2026-03-01 13:58:28 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-01 13:58:28 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-01 13:58:28 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-01 13:58:28 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-01 13:58:28 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-01 13:58:28 --> MyMICoin: guest context detected; skipping user-specific preload.
INFO - 2026-03-01 13:58:28 --> [REQ_ID=a6f7ff112a59] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-01 13:58:28 --> [REQ_ID=a6f7ff112a59] [VIEW_RENDER] SupportModule\Views\Support\index
INFO - 2026-03-01 13:58:28 --> [REQ_ID=a6f7ff112a59] [MEMORY][commonData:start] 6291456
INFO - 2026-03-01 13:58:28 --> themesMemory usage: 6291456
DEBUG - 2026-03-01 13:58:28 --> [REQ_ID=a3195f7a3066] [FILTER_AFTER]
DEBUG - 2026-03-01 13:58:28 --> [REQ_ID=a3195f7a3066] [LIFECYCLE][END] status=200 duration_ms=101.92 memory_delta=0
INFO - 2026-03-01 13:58:28 --> [REQ_ID=a6f7ff112a59] [PERF] Execution time=0.099608
DEBUG - 2026-03-01 13:58:28 --> [REQ_ID=a3195f7a3066] [REQUEST][END]
INFO - 2026-03-01 13:58:28 --> [REQ_ID=a3195f7a3066] [PERF] Execution time=0.142620
DEBUG - 2026-03-01 13:59:40 --> [REQ_ID=a4f9eef0f5c8] [REQUEST][START] GET /
DEBUG - 2026-03-01 13:59:40 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-01 13:59:40 --> [REQ_ID=a4f9eef0f5c8] [FILTER_BEFORE] /
DEBUG - 2026-03-01 13:59:40 --> [REQ_ID=a4f9eef0f5c8] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-01 13:59:40 --> [REQ_ID=a4f9eef0f5c8] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-01 13:59:40 --> [CSRF] token name=csrf_test_name hash=56db25fd550c0cc6e7e47e8ad495aa7e
DEBUG - 2026-03-01 13:59:40 --> [REQ_ID=958e99dad989] [INIT] App\Controllers\Home::GET
INFO - 2026-03-01 13:59:40 --> [REQ_ID=958e99dad989] [MEMORY][controller-start] 4194304
INFO - 2026-03-01 13:59:40 --> [REQ_ID=958e99dad989] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-01 13:59:40 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-01 13:59:41 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-03-01 13:59:41 --> [REQ_ID=958e99dad989] [VIEW_RENDER] themes/public/home
INFO - 2026-03-01 13:59:41 --> [REQ_ID=958e99dad989] [MEMORY][commonData:start] 8388608
INFO - 2026-03-01 13:59:41 --> themesMemory usage: 8388608
DEBUG - 2026-03-01 13:59:41 --> [MetaService] slug= pageName=Home cacheHit= path=DB
DEBUG - 2026-03-01 13:59:41 --> [REQ_ID=a4f9eef0f5c8] [FILTER_AFTER]
DEBUG - 2026-03-01 13:59:41 --> [REQ_ID=a4f9eef0f5c8] [LIFECYCLE][END] status=200 duration_ms=619.30 memory_delta=4194304
INFO - 2026-03-01 13:59:41 --> [REQ_ID=958e99dad989] [PERF] Execution time=0.618945
DEBUG - 2026-03-01 13:59:41 --> [REQ_ID=a4f9eef0f5c8] [REQUEST][END]
INFO - 2026-03-01 13:59:41 --> [REQ_ID=a4f9eef0f5c8] [PERF] Execution time=0.630636
DEBUG - 2026-03-01 14:00:01 --> [REQ_ID=2ea5cf5ffde8] [REQUEST][START] GET /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-01 14:00:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-01 14:00:01 --> [REQ_ID=2ea5cf5ffde8] [FILTER_BEFORE] /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-01 14:00:01 --> [REQ_ID=2ea5cf5ffde8] [ROUTE] Controller=\App\Modules\Management\Controllers\ManagementAPIController Method=Run_CRON_Tasks
DEBUG - 2026-03-01 14:00:01 --> [REQ_ID=2ea5cf5ffde8] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-01 14:00:01 --> [REQ_ID=2ea5cf5ffde8] [REQUEST][END]
INFO - 2026-03-01 14:00:01 --> [REQ_ID=2ea5cf5ffde8] [PERF] Execution time=0.049144
INFO - 2026-03-01 14:00:01 --> [SPARK_START] App\Commands\AIOps\Run
INFO - 2026-03-01 14:00:01 --> [SPARK_MEMORY] 16777216
INFO - 2026-03-01 14:00:01 --> [spark:aiops:run] Intent
INFO - 2026-03-01 14:00:01 --> [spark:ops:work] Started
INFO - 2026-03-01 14:00:01 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-03-01 14:00:01 --> [SPARK_MEMORY] 16777216
INFO - 2026-03-01 14:00:01 --> [spark:ops:work] Intent
INFO - 2026-03-01 14:00:01 --> [spark:ops:work] Completed
INFO - 2026-03-01 14:00:01 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.096396
INFO - 2026-03-01 14:00:01 --> [SPARK_MEMORY] 18874368
INFO - 2026-03-01 14:00:03 --> [AIOPS][SPARK][GOVERNANCE][spark:logs:summarize] Started
INFO - 2026-03-01 14:00:03 --> [SPARK_START] App\Commands\Logs\Summarize
INFO - 2026-03-01 14:00:03 --> [SPARK_MEMORY] 16777216
INFO - 2026-03-01 14:00:03 --> [spark:logs:summarize] Intent
INFO - 2026-03-01 14:00:03 --> [AIOPS][SPARK][GOVERNANCE][spark:logs:summarize] Completed
INFO - 2026-03-01 14:00:03 --> [SPARK_COMPLETE] App\Commands\Logs\Summarize duration=0.028279
INFO - 2026-03-01 14:00:03 --> [SPARK_MEMORY] 18874368
INFO - 2026-03-01 14:00:03 --> [spark:app:healthcheck] Started
INFO - 2026-03-01 14:00:03 --> [SPARK_START] App\Commands\App\Healthcheck
INFO - 2026-03-01 14:00:03 --> [SPARK_MEMORY] 16777216
INFO - 2026-03-01 14:00:03 --> [spark:app:healthcheck] Intent
DEBUG - 2026-03-01 14:00:03 --> LOG_HEALTHCHECK debug marker=dfd69b713730
INFO - 2026-03-01 14:00:03 --> LOG_HEALTHCHECK info marker=dfd69b713730
NOTICE - 2026-03-01 14:00:03 --> LOG_HEALTHCHECK probe marker=dfd69b713730
INFO - 2026-03-01 14:00:03 --> [spark:app:healthcheck] Completed
INFO - 2026-03-01 14:00:03 --> [SPARK_COMPLETE] App\Commands\App\Healthcheck duration=0.028301
INFO - 2026-03-01 14:00:03 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-03-01 14:00:05 --> OllamaPatchRunner:L142 - validateGeneratedPatch Content: 
WARNING - 2026-03-01 14:00:05 --> OllamaPatchRunner:L49 - Original Diff: 
DEBUG - 2026-03-01 14:00:05 --> OllamaPatchRunner:L51 - Retried Diff: 
DEBUG - 2026-03-01 14:00:05 --> OllamaPatchRunner:L142 - validateGeneratedPatch Content: 
DEBUG - 2026-03-01 14:00:05 --> OllamaPatchRunner:L53 - Validating Generated Patch Failed
INFO - 2026-03-01 14:00:05 --> [SPARK_COMPLETE] App\Commands\AIOps\Run duration=3.826017
INFO - 2026-03-01 14:00:05 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-03-01 14:06:24 --> [REQ_ID=e8450593b9d8] [REQUEST][START] GET /index.php/Wallets/Purchase/Memberships/Premium
DEBUG - 2026-03-01 14:06:24 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-01 14:06:24 --> [REQ_ID=e8450593b9d8] [FILTER_BEFORE] /index.php/Wallets/Purchase/Memberships/Premium
DEBUG - 2026-03-01 14:06:24 --> [REQ_ID=e8450593b9d8] [ROUTE] Controller=\App\Modules\User\Controllers\WalletsController Method=purchase
DEBUG - 2026-03-01 14:06:24 --> [REQ_ID=e8450593b9d8] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Wallets/Purchase/Memberships/Premium
DEBUG - 2026-03-01 14:06:24 --> [CSRF] token name=csrf_test_name hash=af7b60987dfacdd6ed10168aeaa20e83
DEBUG - 2026-03-01 14:06:24 --> [REQ_ID=e8450593b9d8] [REQUEST][END]
INFO - 2026-03-01 14:06:24 --> [REQ_ID=e8450593b9d8] [PERF] Execution time=0.057121
DEBUG - 2026-03-01 14:06:26 --> [REQ_ID=07cec3f9a5f9] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-01 14:06:26 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-01 14:06:26 --> [REQ_ID=07cec3f9a5f9] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-01 14:06:26 --> [REQ_ID=07cec3f9a5f9] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-01 14:06:26 --> [REQ_ID=07cec3f9a5f9] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-01 14:06:26 --> [CSRF] token name=csrf_test_name hash=12c7d7254915734463819a0d69563c2d
DEBUG - 2026-03-01 14:06:26 --> [REQ_ID=999d0b4abb98] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-01 14:06:26 --> [REQ_ID=999d0b4abb98] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-01 14:06:26 --> [REQ_ID=07cec3f9a5f9] [FILTER_AFTER]
DEBUG - 2026-03-01 14:06:26 --> [REQ_ID=07cec3f9a5f9] [LIFECYCLE][END] status=200 duration_ms=52.60 memory_delta=0
INFO - 2026-03-01 14:06:26 --> [REQ_ID=999d0b4abb98] [PERF] Execution time=0.051451
DEBUG - 2026-03-01 14:06:26 --> [REQ_ID=07cec3f9a5f9] [REQUEST][END]
INFO - 2026-03-01 14:06:26 --> [REQ_ID=07cec3f9a5f9] [PERF] Execution time=0.063963
INFO - 2026-03-01 14:15:01 --> [spark:ops:work] Started
INFO - 2026-03-01 14:15:01 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-03-01 14:15:01 --> [SPARK_MEMORY] 16777216
INFO - 2026-03-01 14:15:01 --> [spark:ops:work] Intent
DEBUG - 2026-03-01 14:15:01 --> [REQ_ID=1b73b2a1b31b] [REQUEST][START] GET /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-01 14:15:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-01 14:15:01 --> [REQ_ID=1b73b2a1b31b] [FILTER_BEFORE] /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-01 14:15:01 --> [REQ_ID=1b73b2a1b31b] [ROUTE] Controller=\App\Modules\APIs\Controllers\AlertsAPIController Method=fetchEmailAlerts
DEBUG - 2026-03-01 14:15:01 --> [REQ_ID=1b73b2a1b31b] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Alerts/fetchEmailAlerts
INFO - 2026-03-01 14:15:01 --> [spark:ops:work] Completed
INFO - 2026-03-01 14:15:01 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.087511
INFO - 2026-03-01 14:15:01 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-03-01 14:15:01 --> [REQ_ID=1b73b2a1b31b] [REQUEST][END]
INFO - 2026-03-01 14:15:01 --> [REQ_ID=1b73b2a1b31b] [PERF] Execution time=0.082411
DEBUG - 2026-03-01 14:17:19 --> [REQ_ID=da6b434c4121] [REQUEST][START] GET /
DEBUG - 2026-03-01 14:17:19 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-01 14:17:19 --> [REQ_ID=da6b434c4121] [FILTER_BEFORE] /
DEBUG - 2026-03-01 14:17:19 --> [REQ_ID=da6b434c4121] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-01 14:17:19 --> [REQ_ID=da6b434c4121] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-01 14:17:19 --> [CSRF] token name=csrf_test_name hash=69fda89c09aca1e3f3f807970d80b0a0
DEBUG - 2026-03-01 14:17:19 --> [REQ_ID=d1175bbdbfa0] [INIT] App\Controllers\Home::GET
INFO - 2026-03-01 14:17:19 --> [REQ_ID=d1175bbdbfa0] [MEMORY][controller-start] 6291456
INFO - 2026-03-01 14:17:19 --> [REQ_ID=d1175bbdbfa0] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-01 14:17:19 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-01 14:17:19 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-03-01 14:17:19 --> [REQ_ID=d1175bbdbfa0] [VIEW_RENDER] themes/public/home
INFO - 2026-03-01 14:17:19 --> [REQ_ID=d1175bbdbfa0] [MEMORY][commonData:start] 10485760
INFO - 2026-03-01 14:17:19 --> themesMemory usage: 10485760
DEBUG - 2026-03-01 14:17:19 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-01 14:17:19 --> [REQ_ID=da6b434c4121] [FILTER_AFTER]
DEBUG - 2026-03-01 14:17:19 --> [REQ_ID=da6b434c4121] [LIFECYCLE][END] status=200 duration_ms=669.18 memory_delta=4194304
INFO - 2026-03-01 14:17:19 --> [REQ_ID=d1175bbdbfa0] [PERF] Execution time=0.667139
DEBUG - 2026-03-01 14:17:19 --> [REQ_ID=da6b434c4121] [REQUEST][END]
INFO - 2026-03-01 14:17:19 --> [REQ_ID=da6b434c4121] [PERF] Execution time=0.713119
DEBUG - 2026-03-01 14:17:39 --> [REQ_ID=70281cadd8cb] [REQUEST][START] GET /index.php/Customer-Support
DEBUG - 2026-03-01 14:17:39 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-01 14:17:39 --> [REQ_ID=70281cadd8cb] [FILTER_BEFORE] /index.php/Customer-Support
DEBUG - 2026-03-01 14:17:39 --> [REQ_ID=70281cadd8cb] [ROUTE] Controller=\App\Controllers\App\Modules\Support\Controllers\SupportController Method=index
DEBUG - 2026-03-01 14:17:39 --> [REQ_ID=70281cadd8cb] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Customer-Support
DEBUG - 2026-03-01 14:17:39 --> [CSRF] token name=csrf_test_name hash=af365776811ee697bc53fd31318a7c2b
DEBUG - 2026-03-01 14:17:39 --> [REQ_ID=70281cadd8cb] [REQUEST][END]
INFO - 2026-03-01 14:17:39 --> [REQ_ID=70281cadd8cb] [PERF] Execution time=0.010966
DEBUG - 2026-03-01 14:17:40 --> [REQ_ID=b2488743c8ee] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-01 14:17:40 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-01 14:17:40 --> [REQ_ID=b2488743c8ee] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-01 14:17:40 --> [REQ_ID=b2488743c8ee] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-01 14:17:40 --> [REQ_ID=b2488743c8ee] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-01 14:17:40 --> [CSRF] token name=csrf_test_name hash=6ddcb8c4bf8e893f043429b1f63d892c
DEBUG - 2026-03-01 14:17:40 --> [REQ_ID=9a124e7fa6a1] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-01 14:17:40 --> [REQ_ID=9a124e7fa6a1] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-01 14:17:40 --> [REQ_ID=b2488743c8ee] [FILTER_AFTER]
DEBUG - 2026-03-01 14:17:40 --> [REQ_ID=b2488743c8ee] [LIFECYCLE][END] status=200 duration_ms=41.24 memory_delta=0
INFO - 2026-03-01 14:17:40 --> [REQ_ID=9a124e7fa6a1] [PERF] Execution time=0.040866
DEBUG - 2026-03-01 14:17:40 --> [REQ_ID=b2488743c8ee] [REQUEST][END]
INFO - 2026-03-01 14:17:40 --> [REQ_ID=b2488743c8ee] [PERF] Execution time=0.053729
DEBUG - 2026-03-01 14:20:03 --> [REQ_ID=6cb8fc37b7ef] [REQUEST][START] GET /
DEBUG - 2026-03-01 14:20:03 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-01 14:20:03 --> [REQ_ID=6cb8fc37b7ef] [FILTER_BEFORE] /
DEBUG - 2026-03-01 14:20:03 --> [REQ_ID=6cb8fc37b7ef] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-01 14:20:03 --> [REQ_ID=6cb8fc37b7ef] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-01 14:20:03 --> [CSRF] token name=csrf_test_name hash=d132de1e79397819dc2c763b3b9ee37d
DEBUG - 2026-03-01 14:20:03 --> [REQ_ID=690c7a3b06e6] [INIT] App\Controllers\Home::GET
INFO - 2026-03-01 14:20:03 --> [REQ_ID=690c7a3b06e6] [MEMORY][controller-start] 6291456
INFO - 2026-03-01 14:20:03 --> [REQ_ID=690c7a3b06e6] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-01 14:20:03 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-01 14:20:04 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
DEBUG - 2026-03-01 14:20:04 --> [REQ_ID=690c7a3b06e6] [VIEW_RENDER] themes/public/home
INFO - 2026-03-01 14:20:04 --> [REQ_ID=690c7a3b06e6] [MEMORY][commonData:start] 10485760
INFO - 2026-03-01 14:20:04 --> themesMemory usage: 10485760
DEBUG - 2026-03-01 14:20:04 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-01 14:20:04 --> [REQ_ID=6cb8fc37b7ef] [FILTER_AFTER]
DEBUG - 2026-03-01 14:20:04 --> [REQ_ID=6cb8fc37b7ef] [LIFECYCLE][END] status=200 duration_ms=671.26 memory_delta=4194304
INFO - 2026-03-01 14:20:04 --> [REQ_ID=690c7a3b06e6] [PERF] Execution time=0.668865
DEBUG - 2026-03-01 14:20:04 --> [REQ_ID=6cb8fc37b7ef] [REQUEST][END]
INFO - 2026-03-01 14:20:04 --> [REQ_ID=6cb8fc37b7ef] [PERF] Execution time=0.709201
DEBUG - 2026-03-01 14:20:14 --> [REQ_ID=89bd4884a4c3] [REQUEST][START] GET /
DEBUG - 2026-03-01 14:20:14 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-01 14:20:14 --> [REQ_ID=89bd4884a4c3] [FILTER_BEFORE] /
DEBUG - 2026-03-01 14:20:14 --> [REQ_ID=89bd4884a4c3] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-01 14:20:14 --> [REQ_ID=89bd4884a4c3] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-01 14:20:14 --> [CSRF] token name=csrf_test_name hash=06599d2d035a765eb67f7917076a7d00
DEBUG - 2026-03-01 14:20:14 --> [REQ_ID=655a981dd156] [INIT] App\Controllers\Home::GET
INFO - 2026-03-01 14:20:14 --> [REQ_ID=655a981dd156] [MEMORY][controller-start] 4194304
INFO - 2026-03-01 14:20:14 --> [REQ_ID=655a981dd156] [MEMORY][commonData:start] 4194304
DEBUG - 2026-03-01 14:20:14 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-01 14:20:15 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
DEBUG - 2026-03-01 14:20:15 --> [REQ_ID=655a981dd156] [VIEW_RENDER] themes/public/home
INFO - 2026-03-01 14:20:15 --> [REQ_ID=655a981dd156] [MEMORY][commonData:start] 8388608
INFO - 2026-03-01 14:20:15 --> themesMemory usage: 8388608
DEBUG - 2026-03-01 14:20:15 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-01 14:20:15 --> [REQ_ID=89bd4884a4c3] [FILTER_AFTER]
DEBUG - 2026-03-01 14:20:15 --> [REQ_ID=89bd4884a4c3] [LIFECYCLE][END] status=200 duration_ms=516.64 memory_delta=4194304
INFO - 2026-03-01 14:20:15 --> [REQ_ID=655a981dd156] [PERF] Execution time=0.515127
DEBUG - 2026-03-01 14:20:15 --> [REQ_ID=89bd4884a4c3] [REQUEST][END]
INFO - 2026-03-01 14:20:15 --> [REQ_ID=89bd4884a4c3] [PERF] Execution time=0.526121
DEBUG - 2026-03-01 14:20:24 --> [REQ_ID=a6184a8e21d1] [REQUEST][START] GET /
DEBUG - 2026-03-01 14:20:24 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-01 14:20:24 --> [REQ_ID=a6184a8e21d1] [FILTER_BEFORE] /
DEBUG - 2026-03-01 14:20:24 --> [REQ_ID=a6184a8e21d1] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-01 14:20:24 --> [REQ_ID=a6184a8e21d1] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-01 14:20:24 --> [CSRF] token name=csrf_test_name hash=0082650561c5755773e39943cb7a0191
DEBUG - 2026-03-01 14:20:24 --> [REQ_ID=693f95f16788] [INIT] App\Controllers\Home::GET
INFO - 2026-03-01 14:20:24 --> [REQ_ID=693f95f16788] [MEMORY][controller-start] 4194304
INFO - 2026-03-01 14:20:24 --> [REQ_ID=693f95f16788] [MEMORY][commonData:start] 4194304
DEBUG - 2026-03-01 14:20:24 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-01 14:20:25 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
DEBUG - 2026-03-01 14:20:25 --> [REQ_ID=693f95f16788] [VIEW_RENDER] themes/public/home
INFO - 2026-03-01 14:20:25 --> [REQ_ID=693f95f16788] [MEMORY][commonData:start] 8388608
INFO - 2026-03-01 14:20:25 --> themesMemory usage: 8388608
DEBUG - 2026-03-01 14:20:25 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-01 14:20:25 --> [REQ_ID=a6184a8e21d1] [FILTER_AFTER]
DEBUG - 2026-03-01 14:20:25 --> [REQ_ID=a6184a8e21d1] [LIFECYCLE][END] status=200 duration_ms=512.68 memory_delta=4194304
INFO - 2026-03-01 14:20:25 --> [REQ_ID=693f95f16788] [PERF] Execution time=0.512052
DEBUG - 2026-03-01 14:20:25 --> [REQ_ID=a6184a8e21d1] [REQUEST][END]
INFO - 2026-03-01 14:20:25 --> [REQ_ID=a6184a8e21d1] [PERF] Execution time=0.522270
DEBUG - 2026-03-01 14:20:49 --> [REQ_ID=8ed16e2f1f15] [REQUEST][START] GET /?p=info
DEBUG - 2026-03-01 14:20:49 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-01 14:20:49 --> [REQ_ID=8ed16e2f1f15] [FILTER_BEFORE] /?p=info
DEBUG - 2026-03-01 14:20:49 --> [REQ_ID=8ed16e2f1f15] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-01 14:20:49 --> [REQ_ID=8ed16e2f1f15] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php?p=info
DEBUG - 2026-03-01 14:20:49 --> [CSRF] token name=csrf_test_name hash=25a7f1c84a8a56bcdddbec14ed6d5ba7
DEBUG - 2026-03-01 14:20:49 --> [REQ_ID=1e56db62fcf4] [INIT] App\Controllers\Home::GET
INFO - 2026-03-01 14:20:49 --> [REQ_ID=1e56db62fcf4] [MEMORY][controller-start] 4194304
INFO - 2026-03-01 14:20:49 --> [REQ_ID=1e56db62fcf4] [MEMORY][commonData:start] 4194304
DEBUG - 2026-03-01 14:20:49 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-01 14:20:49 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
DEBUG - 2026-03-01 14:20:49 --> [REQ_ID=1e56db62fcf4] [VIEW_RENDER] themes/public/home
INFO - 2026-03-01 14:20:49 --> [REQ_ID=1e56db62fcf4] [MEMORY][commonData:start] 8388608
INFO - 2026-03-01 14:20:49 --> themesMemory usage: 8388608
DEBUG - 2026-03-01 14:20:49 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-01 14:20:49 --> [REQ_ID=8ed16e2f1f15] [FILTER_AFTER]
DEBUG - 2026-03-01 14:20:49 --> [REQ_ID=8ed16e2f1f15] [LIFECYCLE][END] status=200 duration_ms=527.93 memory_delta=4194304
INFO - 2026-03-01 14:20:49 --> [REQ_ID=1e56db62fcf4] [PERF] Execution time=0.527240
DEBUG - 2026-03-01 14:20:49 --> [REQ_ID=8ed16e2f1f15] [REQUEST][END]
INFO - 2026-03-01 14:20:49 --> [REQ_ID=8ed16e2f1f15] [PERF] Execution time=0.537563
DEBUG - 2026-03-01 14:20:50 --> [REQ_ID=92a26251a671] [REQUEST][START] GET /?p=php
DEBUG - 2026-03-01 14:20:50 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-01 14:20:50 --> [REQ_ID=92a26251a671] [FILTER_BEFORE] /?p=php
DEBUG - 2026-03-01 14:20:50 --> [REQ_ID=92a26251a671] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-01 14:20:50 --> [REQ_ID=92a26251a671] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php?p=php
DEBUG - 2026-03-01 14:20:50 --> [CSRF] token name=csrf_test_name hash=879c74704d24642a89d48c75258ec209
DEBUG - 2026-03-01 14:20:50 --> [REQ_ID=c507a2addbaf] [INIT] App\Controllers\Home::GET
INFO - 2026-03-01 14:20:50 --> [REQ_ID=c507a2addbaf] [MEMORY][controller-start] 4194304
INFO - 2026-03-01 14:20:50 --> [REQ_ID=c507a2addbaf] [MEMORY][commonData:start] 4194304
DEBUG - 2026-03-01 14:20:50 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-01 14:20:50 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
DEBUG - 2026-03-01 14:20:50 --> [REQ_ID=c507a2addbaf] [VIEW_RENDER] themes/public/home
INFO - 2026-03-01 14:20:50 --> [REQ_ID=c507a2addbaf] [MEMORY][commonData:start] 8388608
INFO - 2026-03-01 14:20:50 --> themesMemory usage: 8388608
DEBUG - 2026-03-01 14:20:50 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-01 14:20:50 --> [REQ_ID=92a26251a671] [FILTER_AFTER]
DEBUG - 2026-03-01 14:20:50 --> [REQ_ID=92a26251a671] [LIFECYCLE][END] status=200 duration_ms=545.00 memory_delta=4194304
INFO - 2026-03-01 14:20:50 --> [REQ_ID=c507a2addbaf] [PERF] Execution time=0.544401
DEBUG - 2026-03-01 14:20:50 --> [REQ_ID=92a26251a671] [REQUEST][END]
INFO - 2026-03-01 14:20:50 --> [REQ_ID=92a26251a671] [PERF] Execution time=0.553512
DEBUG - 2026-03-01 14:20:51 --> [REQ_ID=720e5ee648e8] [REQUEST][START] GET /?phpinfo
DEBUG - 2026-03-01 14:20:51 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-01 14:20:51 --> [REQ_ID=720e5ee648e8] [FILTER_BEFORE] /?phpinfo
DEBUG - 2026-03-01 14:20:51 --> [REQ_ID=720e5ee648e8] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-01 14:20:51 --> [REQ_ID=720e5ee648e8] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php?phpinfo=
DEBUG - 2026-03-01 14:20:51 --> [CSRF] token name=csrf_test_name hash=be5c535a5d3a34ad96d59a010f2bf175
DEBUG - 2026-03-01 14:20:51 --> [REQ_ID=b82fb249ebfd] [INIT] App\Controllers\Home::GET
INFO - 2026-03-01 14:20:51 --> [REQ_ID=b82fb249ebfd] [MEMORY][controller-start] 4194304
INFO - 2026-03-01 14:20:51 --> [REQ_ID=b82fb249ebfd] [MEMORY][commonData:start] 4194304
DEBUG - 2026-03-01 14:20:51 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-01 14:20:51 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
DEBUG - 2026-03-01 14:20:51 --> [REQ_ID=b82fb249ebfd] [VIEW_RENDER] themes/public/home
INFO - 2026-03-01 14:20:51 --> [REQ_ID=b82fb249ebfd] [MEMORY][commonData:start] 8388608
INFO - 2026-03-01 14:20:51 --> themesMemory usage: 8388608
DEBUG - 2026-03-01 14:20:51 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-01 14:20:51 --> [REQ_ID=720e5ee648e8] [FILTER_AFTER]
DEBUG - 2026-03-01 14:20:51 --> [REQ_ID=720e5ee648e8] [LIFECYCLE][END] status=200 duration_ms=566.43 memory_delta=4194304
INFO - 2026-03-01 14:20:51 --> [REQ_ID=b82fb249ebfd] [PERF] Execution time=0.565730
DEBUG - 2026-03-01 14:20:51 --> [REQ_ID=720e5ee648e8] [REQUEST][END]
INFO - 2026-03-01 14:20:51 --> [REQ_ID=720e5ee648e8] [PERF] Execution time=0.750908
DEBUG - 2026-03-01 14:20:52 --> [REQ_ID=311f9d562679] [REQUEST][START] GET /?phpinfo.php
DEBUG - 2026-03-01 14:20:52 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-01 14:20:52 --> [REQ_ID=311f9d562679] [FILTER_BEFORE] /?phpinfo.php
DEBUG - 2026-03-01 14:20:52 --> [REQ_ID=311f9d562679] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-01 14:20:52 --> [REQ_ID=311f9d562679] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php?phpinfo_php=
DEBUG - 2026-03-01 14:20:52 --> [CSRF] token name=csrf_test_name hash=69c3f4fd07b4781de44524c1e37552b2
DEBUG - 2026-03-01 14:20:52 --> [REQ_ID=cb0e09775db6] [INIT] App\Controllers\Home::GET
INFO - 2026-03-01 14:20:52 --> [REQ_ID=cb0e09775db6] [MEMORY][controller-start] 4194304
INFO - 2026-03-01 14:20:52 --> [REQ_ID=cb0e09775db6] [MEMORY][commonData:start] 4194304
DEBUG - 2026-03-01 14:20:52 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-01 14:20:52 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
DEBUG - 2026-03-01 14:20:52 --> [REQ_ID=cb0e09775db6] [VIEW_RENDER] themes/public/home
INFO - 2026-03-01 14:20:52 --> [REQ_ID=cb0e09775db6] [MEMORY][commonData:start] 8388608
INFO - 2026-03-01 14:20:52 --> themesMemory usage: 8388608
DEBUG - 2026-03-01 14:20:52 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-01 14:20:52 --> [REQ_ID=311f9d562679] [FILTER_AFTER]
DEBUG - 2026-03-01 14:20:52 --> [REQ_ID=311f9d562679] [LIFECYCLE][END] status=200 duration_ms=501.11 memory_delta=4194304
INFO - 2026-03-01 14:20:52 --> [REQ_ID=cb0e09775db6] [PERF] Execution time=0.500491
DEBUG - 2026-03-01 14:20:52 --> [REQ_ID=311f9d562679] [REQUEST][END]
INFO - 2026-03-01 14:20:52 --> [REQ_ID=311f9d562679] [PERF] Execution time=0.510777
DEBUG - 2026-03-01 14:20:53 --> [REQ_ID=572b5ea8dda5] [REQUEST][START] GET /?phpinfo=1
DEBUG - 2026-03-01 14:20:53 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-01 14:20:53 --> [REQ_ID=572b5ea8dda5] [FILTER_BEFORE] /?phpinfo=1
DEBUG - 2026-03-01 14:20:53 --> [REQ_ID=572b5ea8dda5] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-01 14:20:53 --> [REQ_ID=572b5ea8dda5] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php?phpinfo=1
DEBUG - 2026-03-01 14:20:53 --> [CSRF] token name=csrf_test_name hash=5756ae12b061d3573dc7d29bec6dccb8
DEBUG - 2026-03-01 14:20:53 --> [REQ_ID=56ff6a5daadf] [INIT] App\Controllers\Home::GET
INFO - 2026-03-01 14:20:53 --> [REQ_ID=56ff6a5daadf] [MEMORY][controller-start] 4194304
INFO - 2026-03-01 14:20:53 --> [REQ_ID=56ff6a5daadf] [MEMORY][commonData:start] 4194304
DEBUG - 2026-03-01 14:20:53 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-01 14:20:53 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
DEBUG - 2026-03-01 14:20:53 --> [REQ_ID=56ff6a5daadf] [VIEW_RENDER] themes/public/home
INFO - 2026-03-01 14:20:53 --> [REQ_ID=56ff6a5daadf] [MEMORY][commonData:start] 8388608
INFO - 2026-03-01 14:20:53 --> themesMemory usage: 8388608
DEBUG - 2026-03-01 14:20:53 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-01 14:20:53 --> [REQ_ID=572b5ea8dda5] [FILTER_AFTER]
DEBUG - 2026-03-01 14:20:53 --> [REQ_ID=572b5ea8dda5] [LIFECYCLE][END] status=200 duration_ms=490.63 memory_delta=4194304
INFO - 2026-03-01 14:20:53 --> [REQ_ID=56ff6a5daadf] [PERF] Execution time=0.490030
DEBUG - 2026-03-01 14:20:53 --> [REQ_ID=572b5ea8dda5] [REQUEST][END]
INFO - 2026-03-01 14:20:53 --> [REQ_ID=572b5ea8dda5] [PERF] Execution time=0.499499
DEBUG - 2026-03-01 14:20:54 --> [REQ_ID=d6db47aab848] [REQUEST][START] GET /?q=info
DEBUG - 2026-03-01 14:20:54 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-01 14:20:54 --> [REQ_ID=d6db47aab848] [FILTER_BEFORE] /?q=info
DEBUG - 2026-03-01 14:20:54 --> [REQ_ID=d6db47aab848] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-01 14:20:54 --> [REQ_ID=d6db47aab848] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php?q=info
DEBUG - 2026-03-01 14:20:54 --> [CSRF] token name=csrf_test_name hash=4f7f0db81c45d92d80b371c3528249d8
DEBUG - 2026-03-01 14:20:54 --> [REQ_ID=ab56c9598f2e] [INIT] App\Controllers\Home::GET
INFO - 2026-03-01 14:20:54 --> [REQ_ID=ab56c9598f2e] [MEMORY][controller-start] 4194304
INFO - 2026-03-01 14:20:54 --> [REQ_ID=ab56c9598f2e] [MEMORY][commonData:start] 4194304
DEBUG - 2026-03-01 14:20:54 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-01 14:20:54 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
DEBUG - 2026-03-01 14:20:54 --> [REQ_ID=ab56c9598f2e] [VIEW_RENDER] themes/public/home
INFO - 2026-03-01 14:20:54 --> [REQ_ID=ab56c9598f2e] [MEMORY][commonData:start] 8388608
INFO - 2026-03-01 14:20:54 --> themesMemory usage: 8388608
DEBUG - 2026-03-01 14:20:54 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-01 14:20:54 --> [REQ_ID=d6db47aab848] [FILTER_AFTER]
DEBUG - 2026-03-01 14:20:54 --> [REQ_ID=d6db47aab848] [LIFECYCLE][END] status=200 duration_ms=460.80 memory_delta=4194304
INFO - 2026-03-01 14:20:54 --> [REQ_ID=ab56c9598f2e] [PERF] Execution time=0.460137
DEBUG - 2026-03-01 14:20:54 --> [REQ_ID=d6db47aab848] [REQUEST][END]
INFO - 2026-03-01 14:20:54 --> [REQ_ID=d6db47aab848] [PERF] Execution time=0.470405
DEBUG - 2026-03-01 14:21:13 --> [REQ_ID=b292c88cf4fd] [REQUEST][START] GET /
DEBUG - 2026-03-01 14:21:13 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-01 14:21:13 --> [REQ_ID=b292c88cf4fd] [FILTER_BEFORE] /
DEBUG - 2026-03-01 14:21:13 --> [REQ_ID=b292c88cf4fd] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-01 14:21:13 --> [REQ_ID=b292c88cf4fd] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-01 14:21:13 --> [CSRF] token name=csrf_test_name hash=6f789b38704eee5052e31102250e000f
DEBUG - 2026-03-01 14:21:13 --> [REQ_ID=2fe43b1aa247] [INIT] App\Controllers\Home::GET
INFO - 2026-03-01 14:21:13 --> [REQ_ID=2fe43b1aa247] [MEMORY][controller-start] 6291456
INFO - 2026-03-01 14:21:13 --> [REQ_ID=2fe43b1aa247] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-01 14:21:13 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-01 14:21:14 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
DEBUG - 2026-03-01 14:21:14 --> [REQ_ID=2fe43b1aa247] [VIEW_RENDER] themes/public/home
INFO - 2026-03-01 14:21:14 --> [REQ_ID=2fe43b1aa247] [MEMORY][commonData:start] 10485760
INFO - 2026-03-01 14:21:14 --> themesMemory usage: 10485760
DEBUG - 2026-03-01 14:21:14 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-01 14:21:14 --> [REQ_ID=b292c88cf4fd] [FILTER_AFTER]
DEBUG - 2026-03-01 14:21:14 --> [REQ_ID=b292c88cf4fd] [LIFECYCLE][END] status=200 duration_ms=552.13 memory_delta=4194304
INFO - 2026-03-01 14:21:14 --> [REQ_ID=2fe43b1aa247] [PERF] Execution time=0.549617
DEBUG - 2026-03-01 14:21:14 --> [REQ_ID=b292c88cf4fd] [REQUEST][END]
INFO - 2026-03-01 14:21:14 --> [REQ_ID=b292c88cf4fd] [PERF] Execution time=0.591469
DEBUG - 2026-03-01 14:21:38 --> [REQ_ID=1a2b83c33448] [REQUEST][START] GET /index.php
DEBUG - 2026-03-01 14:21:38 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-01 14:21:39 --> [REQ_ID=1a2b83c33448] [FILTER_BEFORE] /index.php
DEBUG - 2026-03-01 14:21:39 --> [REQ_ID=1a2b83c33448] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-01 14:21:39 --> [REQ_ID=1a2b83c33448] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-01 14:21:39 --> [CSRF] token name=csrf_test_name hash=1cacc5b212f65497cc1f1a16caf4b928
DEBUG - 2026-03-01 14:21:39 --> [REQ_ID=caf79cc96ce1] [INIT] App\Controllers\Home::GET
INFO - 2026-03-01 14:21:39 --> [REQ_ID=caf79cc96ce1] [MEMORY][controller-start] 6291456
INFO - 2026-03-01 14:21:39 --> [REQ_ID=caf79cc96ce1] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-01 14:21:39 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-01 14:21:39 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
DEBUG - 2026-03-01 14:21:39 --> [REQ_ID=caf79cc96ce1] [VIEW_RENDER] themes/public/home
INFO - 2026-03-01 14:21:39 --> [REQ_ID=caf79cc96ce1] [MEMORY][commonData:start] 10485760
INFO - 2026-03-01 14:21:39 --> themesMemory usage: 10485760
DEBUG - 2026-03-01 14:21:39 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-01 14:21:39 --> [REQ_ID=1a2b83c33448] [FILTER_AFTER]
DEBUG - 2026-03-01 14:21:39 --> [REQ_ID=1a2b83c33448] [LIFECYCLE][END] status=200 duration_ms=586.38 memory_delta=4194304
INFO - 2026-03-01 14:21:39 --> [REQ_ID=caf79cc96ce1] [PERF] Execution time=0.583830
DEBUG - 2026-03-01 14:21:39 --> [REQ_ID=1a2b83c33448] [REQUEST][END]
INFO - 2026-03-01 14:21:39 --> [REQ_ID=1a2b83c33448] [PERF] Execution time=0.625472
DEBUG - 2026-03-01 14:21:49 --> [REQ_ID=433665525e49] [REQUEST][START] GET /?p=info
DEBUG - 2026-03-01 14:21:49 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-01 14:21:49 --> [REQ_ID=433665525e49] [FILTER_BEFORE] /?p=info
DEBUG - 2026-03-01 14:21:49 --> [REQ_ID=433665525e49] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-01 14:21:49 --> [REQ_ID=433665525e49] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php?p=info
DEBUG - 2026-03-01 14:21:49 --> [CSRF] token name=csrf_test_name hash=9a02ff66108a6444c10b5295fb03bbf1
DEBUG - 2026-03-01 14:21:49 --> [REQ_ID=b032765b3351] [INIT] App\Controllers\Home::GET
INFO - 2026-03-01 14:21:49 --> [REQ_ID=b032765b3351] [MEMORY][controller-start] 4194304
INFO - 2026-03-01 14:21:49 --> [REQ_ID=b032765b3351] [MEMORY][commonData:start] 4194304
DEBUG - 2026-03-01 14:21:49 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-01 14:21:50 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
DEBUG - 2026-03-01 14:21:50 --> [REQ_ID=b032765b3351] [VIEW_RENDER] themes/public/home
INFO - 2026-03-01 14:21:50 --> [REQ_ID=b032765b3351] [MEMORY][commonData:start] 8388608
INFO - 2026-03-01 14:21:50 --> themesMemory usage: 8388608
DEBUG - 2026-03-01 14:21:50 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-01 14:21:50 --> [REQ_ID=433665525e49] [FILTER_AFTER]
DEBUG - 2026-03-01 14:21:50 --> [REQ_ID=433665525e49] [LIFECYCLE][END] status=200 duration_ms=523.09 memory_delta=4194304
INFO - 2026-03-01 14:21:50 --> [REQ_ID=b032765b3351] [PERF] Execution time=0.522445
DEBUG - 2026-03-01 14:21:50 --> [REQ_ID=433665525e49] [REQUEST][END]
INFO - 2026-03-01 14:21:50 --> [REQ_ID=433665525e49] [PERF] Execution time=0.533103
DEBUG - 2026-03-01 14:21:50 --> [REQ_ID=e4dd1793a50e] [REQUEST][START] GET /?p=php
DEBUG - 2026-03-01 14:21:50 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-01 14:21:50 --> [REQ_ID=e4dd1793a50e] [FILTER_BEFORE] /?p=php
DEBUG - 2026-03-01 14:21:50 --> [REQ_ID=e4dd1793a50e] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-01 14:21:50 --> [REQ_ID=e4dd1793a50e] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php?p=php
DEBUG - 2026-03-01 14:21:50 --> [CSRF] token name=csrf_test_name hash=a97e3f208cc27b71501c6642e1500fb8
DEBUG - 2026-03-01 14:21:50 --> [REQ_ID=fd0d2ac61910] [INIT] App\Controllers\Home::GET
INFO - 2026-03-01 14:21:50 --> [REQ_ID=fd0d2ac61910] [MEMORY][controller-start] 4194304
INFO - 2026-03-01 14:21:50 --> [REQ_ID=fd0d2ac61910] [MEMORY][commonData:start] 4194304
DEBUG - 2026-03-01 14:21:50 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-01 14:21:50 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
DEBUG - 2026-03-01 14:21:50 --> [REQ_ID=fd0d2ac61910] [VIEW_RENDER] themes/public/home
INFO - 2026-03-01 14:21:50 --> [REQ_ID=fd0d2ac61910] [MEMORY][commonData:start] 8388608
INFO - 2026-03-01 14:21:50 --> themesMemory usage: 8388608
DEBUG - 2026-03-01 14:21:50 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-01 14:21:50 --> [REQ_ID=e4dd1793a50e] [FILTER_AFTER]
DEBUG - 2026-03-01 14:21:50 --> [REQ_ID=e4dd1793a50e] [LIFECYCLE][END] status=200 duration_ms=501.79 memory_delta=4194304
INFO - 2026-03-01 14:21:50 --> [REQ_ID=fd0d2ac61910] [PERF] Execution time=0.501181
DEBUG - 2026-03-01 14:21:50 --> [REQ_ID=e4dd1793a50e] [REQUEST][END]
INFO - 2026-03-01 14:21:50 --> [REQ_ID=e4dd1793a50e] [PERF] Execution time=0.510519
DEBUG - 2026-03-01 14:21:51 --> [REQ_ID=66c7cf336f8b] [REQUEST][START] GET /?phpinfo
DEBUG - 2026-03-01 14:21:51 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-01 14:21:51 --> [REQ_ID=66c7cf336f8b] [FILTER_BEFORE] /?phpinfo
DEBUG - 2026-03-01 14:21:51 --> [REQ_ID=66c7cf336f8b] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-01 14:21:51 --> [REQ_ID=66c7cf336f8b] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php?phpinfo=
DEBUG - 2026-03-01 14:21:51 --> [CSRF] token name=csrf_test_name hash=003ad28a3e2142d158ead96e709c0bfb
DEBUG - 2026-03-01 14:21:51 --> [REQ_ID=1390db4c3dfc] [INIT] App\Controllers\Home::GET
INFO - 2026-03-01 14:21:51 --> [REQ_ID=1390db4c3dfc] [MEMORY][controller-start] 4194304
INFO - 2026-03-01 14:21:51 --> [REQ_ID=1390db4c3dfc] [MEMORY][commonData:start] 4194304
DEBUG - 2026-03-01 14:21:51 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-01 14:21:51 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
DEBUG - 2026-03-01 14:21:51 --> [REQ_ID=1390db4c3dfc] [VIEW_RENDER] themes/public/home
INFO - 2026-03-01 14:21:51 --> [REQ_ID=1390db4c3dfc] [MEMORY][commonData:start] 8388608
INFO - 2026-03-01 14:21:51 --> themesMemory usage: 8388608
DEBUG - 2026-03-01 14:21:51 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-01 14:21:51 --> [REQ_ID=66c7cf336f8b] [FILTER_AFTER]
DEBUG - 2026-03-01 14:21:51 --> [REQ_ID=66c7cf336f8b] [LIFECYCLE][END] status=200 duration_ms=534.40 memory_delta=4194304
INFO - 2026-03-01 14:21:51 --> [REQ_ID=1390db4c3dfc] [PERF] Execution time=0.533870
DEBUG - 2026-03-01 14:21:51 --> [REQ_ID=66c7cf336f8b] [REQUEST][END]
INFO - 2026-03-01 14:21:51 --> [REQ_ID=66c7cf336f8b] [PERF] Execution time=0.543245
DEBUG - 2026-03-01 14:21:52 --> [REQ_ID=c2e461e4e208] [REQUEST][START] GET /?phpinfo.php
DEBUG - 2026-03-01 14:21:52 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-01 14:21:52 --> [REQ_ID=c2e461e4e208] [FILTER_BEFORE] /?phpinfo.php
DEBUG - 2026-03-01 14:21:52 --> [REQ_ID=c2e461e4e208] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-01 14:21:52 --> [REQ_ID=c2e461e4e208] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php?phpinfo_php=
DEBUG - 2026-03-01 14:21:52 --> [CSRF] token name=csrf_test_name hash=b383f1493e214c986816b0aa5236b646
DEBUG - 2026-03-01 14:21:52 --> [REQ_ID=b521fbb2fea5] [INIT] App\Controllers\Home::GET
INFO - 2026-03-01 14:21:52 --> [REQ_ID=b521fbb2fea5] [MEMORY][controller-start] 4194304
INFO - 2026-03-01 14:21:52 --> [REQ_ID=b521fbb2fea5] [MEMORY][commonData:start] 4194304
DEBUG - 2026-03-01 14:21:52 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-01 14:21:52 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
DEBUG - 2026-03-01 14:21:52 --> [REQ_ID=b521fbb2fea5] [VIEW_RENDER] themes/public/home
INFO - 2026-03-01 14:21:52 --> [REQ_ID=b521fbb2fea5] [MEMORY][commonData:start] 8388608
INFO - 2026-03-01 14:21:52 --> themesMemory usage: 8388608
DEBUG - 2026-03-01 14:21:52 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-01 14:21:52 --> [REQ_ID=c2e461e4e208] [FILTER_AFTER]
DEBUG - 2026-03-01 14:21:52 --> [REQ_ID=c2e461e4e208] [LIFECYCLE][END] status=200 duration_ms=570.42 memory_delta=4194304
INFO - 2026-03-01 14:21:52 --> [REQ_ID=b521fbb2fea5] [PERF] Execution time=0.569816
DEBUG - 2026-03-01 14:21:52 --> [REQ_ID=c2e461e4e208] [REQUEST][END]
INFO - 2026-03-01 14:21:52 --> [REQ_ID=c2e461e4e208] [PERF] Execution time=0.580123
DEBUG - 2026-03-01 14:21:53 --> [REQ_ID=f837e5621c92] [REQUEST][START] GET /?phpinfo=1
DEBUG - 2026-03-01 14:21:53 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-01 14:21:53 --> [REQ_ID=f837e5621c92] [FILTER_BEFORE] /?phpinfo=1
DEBUG - 2026-03-01 14:21:53 --> [REQ_ID=f837e5621c92] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-01 14:21:53 --> [REQ_ID=f837e5621c92] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php?phpinfo=1
DEBUG - 2026-03-01 14:21:53 --> [CSRF] token name=csrf_test_name hash=013c8881231090d8c4113b48210265e9
DEBUG - 2026-03-01 14:21:53 --> [REQ_ID=cad43a6827e3] [INIT] App\Controllers\Home::GET
INFO - 2026-03-01 14:21:53 --> [REQ_ID=cad43a6827e3] [MEMORY][controller-start] 4194304
INFO - 2026-03-01 14:21:53 --> [REQ_ID=cad43a6827e3] [MEMORY][commonData:start] 4194304
DEBUG - 2026-03-01 14:21:53 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-01 14:21:53 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
DEBUG - 2026-03-01 14:21:53 --> [REQ_ID=cad43a6827e3] [VIEW_RENDER] themes/public/home
INFO - 2026-03-01 14:21:53 --> [REQ_ID=cad43a6827e3] [MEMORY][commonData:start] 8388608
INFO - 2026-03-01 14:21:53 --> themesMemory usage: 8388608
DEBUG - 2026-03-01 14:21:53 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-01 14:21:53 --> [REQ_ID=f837e5621c92] [FILTER_AFTER]
DEBUG - 2026-03-01 14:21:53 --> [REQ_ID=f837e5621c92] [LIFECYCLE][END] status=200 duration_ms=500.76 memory_delta=4194304
INFO - 2026-03-01 14:21:53 --> [REQ_ID=cad43a6827e3] [PERF] Execution time=0.500116
DEBUG - 2026-03-01 14:21:53 --> [REQ_ID=f837e5621c92] [REQUEST][END]
INFO - 2026-03-01 14:21:53 --> [REQ_ID=f837e5621c92] [PERF] Execution time=0.509414
DEBUG - 2026-03-01 14:21:53 --> [REQ_ID=a11148090a40] [REQUEST][START] GET /?q=info
DEBUG - 2026-03-01 14:21:53 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-01 14:21:53 --> [REQ_ID=a11148090a40] [FILTER_BEFORE] /?q=info
DEBUG - 2026-03-01 14:21:53 --> [REQ_ID=a11148090a40] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-01 14:21:53 --> [REQ_ID=a11148090a40] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php?q=info
DEBUG - 2026-03-01 14:21:53 --> [CSRF] token name=csrf_test_name hash=8814cef3b94116fe56b8638fd8c0f2f6
DEBUG - 2026-03-01 14:21:53 --> [REQ_ID=94659005293c] [INIT] App\Controllers\Home::GET
INFO - 2026-03-01 14:21:53 --> [REQ_ID=94659005293c] [MEMORY][controller-start] 4194304
INFO - 2026-03-01 14:21:54 --> [REQ_ID=94659005293c] [MEMORY][commonData:start] 4194304
DEBUG - 2026-03-01 14:21:54 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-01 14:21:54 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
DEBUG - 2026-03-01 14:21:54 --> [REQ_ID=94659005293c] [VIEW_RENDER] themes/public/home
INFO - 2026-03-01 14:21:54 --> [REQ_ID=94659005293c] [MEMORY][commonData:start] 8388608
INFO - 2026-03-01 14:21:54 --> themesMemory usage: 8388608
DEBUG - 2026-03-01 14:21:54 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-01 14:21:54 --> [REQ_ID=a11148090a40] [FILTER_AFTER]
DEBUG - 2026-03-01 14:21:54 --> [REQ_ID=a11148090a40] [LIFECYCLE][END] status=200 duration_ms=478.21 memory_delta=4194304
INFO - 2026-03-01 14:21:54 --> [REQ_ID=94659005293c] [PERF] Execution time=0.477607
DEBUG - 2026-03-01 14:21:54 --> [REQ_ID=a11148090a40] [REQUEST][END]
INFO - 2026-03-01 14:21:54 --> [REQ_ID=a11148090a40] [PERF] Execution time=0.486848
DEBUG - 2026-03-01 14:22:42 --> [REQ_ID=41ad3dafa122] [REQUEST][START] GET /index.php
DEBUG - 2026-03-01 14:22:42 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-01 14:22:42 --> [REQ_ID=41ad3dafa122] [FILTER_BEFORE] /index.php
DEBUG - 2026-03-01 14:22:42 --> [REQ_ID=41ad3dafa122] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-01 14:22:42 --> [REQ_ID=41ad3dafa122] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-01 14:22:42 --> [CSRF] token name=csrf_test_name hash=494620f6f629fe532087e311c0ce11f7
DEBUG - 2026-03-01 14:22:42 --> [REQ_ID=baf59a419eca] [INIT] App\Controllers\Home::GET
INFO - 2026-03-01 14:22:42 --> [REQ_ID=baf59a419eca] [MEMORY][controller-start] 6291456
INFO - 2026-03-01 14:22:42 --> [REQ_ID=baf59a419eca] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-01 14:22:42 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-01 14:22:43 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
DEBUG - 2026-03-01 14:22:43 --> [REQ_ID=baf59a419eca] [VIEW_RENDER] themes/public/home
INFO - 2026-03-01 14:22:43 --> [REQ_ID=baf59a419eca] [MEMORY][commonData:start] 10485760
INFO - 2026-03-01 14:22:43 --> themesMemory usage: 10485760
DEBUG - 2026-03-01 14:22:43 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-01 14:22:43 --> [REQ_ID=41ad3dafa122] [FILTER_AFTER]
DEBUG - 2026-03-01 14:22:43 --> [REQ_ID=41ad3dafa122] [LIFECYCLE][END] status=200 duration_ms=585.83 memory_delta=4194304
INFO - 2026-03-01 14:22:43 --> [REQ_ID=baf59a419eca] [PERF] Execution time=0.582295
DEBUG - 2026-03-01 14:22:43 --> [REQ_ID=41ad3dafa122] [REQUEST][END]
INFO - 2026-03-01 14:22:43 --> [REQ_ID=41ad3dafa122] [PERF] Execution time=0.630171
DEBUG - 2026-03-01 14:22:59 --> [REQ_ID=41f7aeb676d8] [REQUEST][START] GET /?p=info
DEBUG - 2026-03-01 14:22:59 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-01 14:22:59 --> [REQ_ID=41f7aeb676d8] [FILTER_BEFORE] /?p=info
DEBUG - 2026-03-01 14:22:59 --> [REQ_ID=41f7aeb676d8] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-01 14:22:59 --> [REQ_ID=41f7aeb676d8] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php?p=info
DEBUG - 2026-03-01 14:22:59 --> [CSRF] token name=csrf_test_name hash=8bd92d105cd657924d1c1581f2d9d967
DEBUG - 2026-03-01 14:22:59 --> [REQ_ID=e47122319ebb] [INIT] App\Controllers\Home::GET
INFO - 2026-03-01 14:22:59 --> [REQ_ID=e47122319ebb] [MEMORY][controller-start] 6291456
INFO - 2026-03-01 14:22:59 --> [REQ_ID=e47122319ebb] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-01 14:22:59 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-01 14:22:59 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
DEBUG - 2026-03-01 14:22:59 --> [REQ_ID=e47122319ebb] [VIEW_RENDER] themes/public/home
INFO - 2026-03-01 14:22:59 --> [REQ_ID=e47122319ebb] [MEMORY][commonData:start] 10485760
INFO - 2026-03-01 14:22:59 --> themesMemory usage: 10485760
DEBUG - 2026-03-01 14:22:59 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-01 14:22:59 --> [REQ_ID=41f7aeb676d8] [FILTER_AFTER]
DEBUG - 2026-03-01 14:22:59 --> [REQ_ID=41f7aeb676d8] [LIFECYCLE][END] status=200 duration_ms=567.52 memory_delta=4194304
INFO - 2026-03-01 14:22:59 --> [REQ_ID=e47122319ebb] [PERF] Execution time=0.564513
DEBUG - 2026-03-01 14:22:59 --> [REQ_ID=41f7aeb676d8] [REQUEST][END]
INFO - 2026-03-01 14:22:59 --> [REQ_ID=41f7aeb676d8] [PERF] Execution time=0.606385
DEBUG - 2026-03-01 14:23:00 --> [REQ_ID=a5833c46fe0e] [REQUEST][START] GET /?p=php
DEBUG - 2026-03-01 14:23:00 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-01 14:23:00 --> [REQ_ID=a5833c46fe0e] [FILTER_BEFORE] /?p=php
DEBUG - 2026-03-01 14:23:00 --> [REQ_ID=a5833c46fe0e] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-01 14:23:00 --> [REQ_ID=a5833c46fe0e] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php?p=php
DEBUG - 2026-03-01 14:23:00 --> [CSRF] token name=csrf_test_name hash=b993c0af2b0d3a2f6b6b8e3209395b8f
DEBUG - 2026-03-01 14:23:00 --> [REQ_ID=861351e51b03] [INIT] App\Controllers\Home::GET
INFO - 2026-03-01 14:23:00 --> [REQ_ID=861351e51b03] [MEMORY][controller-start] 4194304
INFO - 2026-03-01 14:23:00 --> [REQ_ID=861351e51b03] [MEMORY][commonData:start] 4194304
DEBUG - 2026-03-01 14:23:00 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-01 14:23:01 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
DEBUG - 2026-03-01 14:23:01 --> [REQ_ID=861351e51b03] [VIEW_RENDER] themes/public/home
INFO - 2026-03-01 14:23:01 --> [REQ_ID=861351e51b03] [MEMORY][commonData:start] 8388608
INFO - 2026-03-01 14:23:01 --> themesMemory usage: 8388608
DEBUG - 2026-03-01 14:23:01 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-01 14:23:01 --> [REQ_ID=a5833c46fe0e] [FILTER_AFTER]
DEBUG - 2026-03-01 14:23:01 --> [REQ_ID=a5833c46fe0e] [LIFECYCLE][END] status=200 duration_ms=495.23 memory_delta=4194304
INFO - 2026-03-01 14:23:01 --> [REQ_ID=861351e51b03] [PERF] Execution time=0.494626
DEBUG - 2026-03-01 14:23:01 --> [REQ_ID=a5833c46fe0e] [REQUEST][END]
INFO - 2026-03-01 14:23:01 --> [REQ_ID=a5833c46fe0e] [PERF] Execution time=0.505022
DEBUG - 2026-03-01 14:23:01 --> [REQ_ID=7eda7e9a2c89] [REQUEST][START] GET /?phpinfo
DEBUG - 2026-03-01 14:23:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-01 14:23:01 --> [REQ_ID=7eda7e9a2c89] [FILTER_BEFORE] /?phpinfo
DEBUG - 2026-03-01 14:23:01 --> [REQ_ID=7eda7e9a2c89] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-01 14:23:01 --> [REQ_ID=7eda7e9a2c89] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php?phpinfo=
DEBUG - 2026-03-01 14:23:01 --> [CSRF] token name=csrf_test_name hash=a27c990c5f86e2becdbbe681b8917232
DEBUG - 2026-03-01 14:23:01 --> [REQ_ID=fae0419ba14e] [INIT] App\Controllers\Home::GET
INFO - 2026-03-01 14:23:01 --> [REQ_ID=fae0419ba14e] [MEMORY][controller-start] 4194304
INFO - 2026-03-01 14:23:01 --> [REQ_ID=fae0419ba14e] [MEMORY][commonData:start] 4194304
DEBUG - 2026-03-01 14:23:01 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-01 14:23:02 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
DEBUG - 2026-03-01 14:23:02 --> [REQ_ID=fae0419ba14e] [VIEW_RENDER] themes/public/home
INFO - 2026-03-01 14:23:02 --> [REQ_ID=fae0419ba14e] [MEMORY][commonData:start] 8388608
INFO - 2026-03-01 14:23:02 --> themesMemory usage: 8388608
DEBUG - 2026-03-01 14:23:02 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-01 14:23:02 --> [REQ_ID=7eda7e9a2c89] [FILTER_AFTER]
DEBUG - 2026-03-01 14:23:02 --> [REQ_ID=7eda7e9a2c89] [LIFECYCLE][END] status=200 duration_ms=511.57 memory_delta=4194304
INFO - 2026-03-01 14:23:02 --> [REQ_ID=fae0419ba14e] [PERF] Execution time=0.511003
DEBUG - 2026-03-01 14:23:02 --> [REQ_ID=7eda7e9a2c89] [REQUEST][END]
INFO - 2026-03-01 14:23:02 --> [REQ_ID=7eda7e9a2c89] [PERF] Execution time=0.520126
DEBUG - 2026-03-01 14:23:02 --> [REQ_ID=4ca48fecef53] [REQUEST][START] GET /?phpinfo.php
DEBUG - 2026-03-01 14:23:02 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-01 14:23:03 --> [REQ_ID=4ca48fecef53] [FILTER_BEFORE] /?phpinfo.php
DEBUG - 2026-03-01 14:23:03 --> [REQ_ID=4ca48fecef53] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-01 14:23:03 --> [REQ_ID=4ca48fecef53] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php?phpinfo_php=
DEBUG - 2026-03-01 14:23:03 --> [CSRF] token name=csrf_test_name hash=f3e2cf57ede9c64011be57cd99880056
DEBUG - 2026-03-01 14:23:03 --> [REQ_ID=8f4a36130953] [INIT] App\Controllers\Home::GET
INFO - 2026-03-01 14:23:03 --> [REQ_ID=8f4a36130953] [MEMORY][controller-start] 6291456
INFO - 2026-03-01 14:23:03 --> [REQ_ID=8f4a36130953] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-01 14:23:03 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-01 14:23:03 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
DEBUG - 2026-03-01 14:23:03 --> [REQ_ID=8f4a36130953] [VIEW_RENDER] themes/public/home
INFO - 2026-03-01 14:23:03 --> [REQ_ID=8f4a36130953] [MEMORY][commonData:start] 10485760
INFO - 2026-03-01 14:23:03 --> themesMemory usage: 10485760
DEBUG - 2026-03-01 14:23:03 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-01 14:23:03 --> [REQ_ID=4ca48fecef53] [FILTER_AFTER]
DEBUG - 2026-03-01 14:23:03 --> [REQ_ID=4ca48fecef53] [LIFECYCLE][END] status=200 duration_ms=611.29 memory_delta=4194304
INFO - 2026-03-01 14:23:03 --> [REQ_ID=8f4a36130953] [PERF] Execution time=0.608836
DEBUG - 2026-03-01 14:23:03 --> [REQ_ID=4ca48fecef53] [REQUEST][END]
INFO - 2026-03-01 14:23:03 --> [REQ_ID=4ca48fecef53] [PERF] Execution time=0.652153
DEBUG - 2026-03-01 14:23:04 --> [REQ_ID=7730cda0c913] [REQUEST][START] GET /?phpinfo=1
DEBUG - 2026-03-01 14:23:04 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-01 14:23:04 --> [REQ_ID=7730cda0c913] [FILTER_BEFORE] /?phpinfo=1
DEBUG - 2026-03-01 14:23:04 --> [REQ_ID=7730cda0c913] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-01 14:23:04 --> [REQ_ID=7730cda0c913] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php?phpinfo=1
DEBUG - 2026-03-01 14:23:04 --> [CSRF] token name=csrf_test_name hash=c16f097d6603259db6a7db72fb516d87
DEBUG - 2026-03-01 14:23:04 --> [REQ_ID=52fd4efe6be5] [INIT] App\Controllers\Home::GET
INFO - 2026-03-01 14:23:04 --> [REQ_ID=52fd4efe6be5] [MEMORY][controller-start] 4194304
INFO - 2026-03-01 14:23:04 --> [REQ_ID=52fd4efe6be5] [MEMORY][commonData:start] 4194304
DEBUG - 2026-03-01 14:23:04 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-01 14:23:04 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
DEBUG - 2026-03-01 14:23:04 --> [REQ_ID=52fd4efe6be5] [VIEW_RENDER] themes/public/home
INFO - 2026-03-01 14:23:04 --> [REQ_ID=52fd4efe6be5] [MEMORY][commonData:start] 8388608
INFO - 2026-03-01 14:23:04 --> themesMemory usage: 8388608
DEBUG - 2026-03-01 14:23:04 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-01 14:23:04 --> [REQ_ID=7730cda0c913] [FILTER_AFTER]
DEBUG - 2026-03-01 14:23:04 --> [REQ_ID=7730cda0c913] [LIFECYCLE][END] status=200 duration_ms=592.32 memory_delta=4194304
INFO - 2026-03-01 14:23:04 --> [REQ_ID=52fd4efe6be5] [PERF] Execution time=0.591664
DEBUG - 2026-03-01 14:23:04 --> [REQ_ID=7730cda0c913] [REQUEST][END]
INFO - 2026-03-01 14:23:04 --> [REQ_ID=7730cda0c913] [PERF] Execution time=0.604517
DEBUG - 2026-03-01 14:23:05 --> [REQ_ID=7677bc85dde7] [REQUEST][START] GET /?q=info
DEBUG - 2026-03-01 14:23:05 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-01 14:23:05 --> [REQ_ID=7677bc85dde7] [FILTER_BEFORE] /?q=info
DEBUG - 2026-03-01 14:23:05 --> [REQ_ID=7677bc85dde7] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-01 14:23:05 --> [REQ_ID=7677bc85dde7] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php?q=info
DEBUG - 2026-03-01 14:23:05 --> [CSRF] token name=csrf_test_name hash=0890117f854d2a8c25a9fd22779d0a88
DEBUG - 2026-03-01 14:23:05 --> [REQ_ID=e68ace723cd0] [INIT] App\Controllers\Home::GET
INFO - 2026-03-01 14:23:05 --> [REQ_ID=e68ace723cd0] [MEMORY][controller-start] 4194304
INFO - 2026-03-01 14:23:05 --> [REQ_ID=e68ace723cd0] [MEMORY][commonData:start] 4194304
DEBUG - 2026-03-01 14:23:05 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-01 14:23:06 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
DEBUG - 2026-03-01 14:23:06 --> [REQ_ID=e68ace723cd0] [VIEW_RENDER] themes/public/home
INFO - 2026-03-01 14:23:06 --> [REQ_ID=e68ace723cd0] [MEMORY][commonData:start] 8388608
INFO - 2026-03-01 14:23:06 --> themesMemory usage: 8388608
DEBUG - 2026-03-01 14:23:06 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-01 14:23:06 --> [REQ_ID=7677bc85dde7] [FILTER_AFTER]
DEBUG - 2026-03-01 14:23:06 --> [REQ_ID=7677bc85dde7] [LIFECYCLE][END] status=200 duration_ms=558.45 memory_delta=4194304
INFO - 2026-03-01 14:23:06 --> [REQ_ID=e68ace723cd0] [PERF] Execution time=0.557881
DEBUG - 2026-03-01 14:23:06 --> [REQ_ID=7677bc85dde7] [REQUEST][END]
INFO - 2026-03-01 14:23:06 --> [REQ_ID=7677bc85dde7] [PERF] Execution time=0.568907
DEBUG - 2026-03-01 14:23:15 --> [REQ_ID=aad6c69fd10b] [REQUEST][START] GET /?p=info
DEBUG - 2026-03-01 14:23:15 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-01 14:23:15 --> [REQ_ID=aad6c69fd10b] [FILTER_BEFORE] /?p=info
DEBUG - 2026-03-01 14:23:15 --> [REQ_ID=aad6c69fd10b] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-01 14:23:15 --> [REQ_ID=aad6c69fd10b] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php?p=info
DEBUG - 2026-03-01 14:23:15 --> [CSRF] token name=csrf_test_name hash=1723ed0764a2b312ef168dda9b554bb7
DEBUG - 2026-03-01 14:23:15 --> [REQ_ID=cb474fbd299c] [INIT] App\Controllers\Home::GET
INFO - 2026-03-01 14:23:15 --> [REQ_ID=cb474fbd299c] [MEMORY][controller-start] 4194304
INFO - 2026-03-01 14:23:15 --> [REQ_ID=cb474fbd299c] [MEMORY][commonData:start] 4194304
DEBUG - 2026-03-01 14:23:15 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-01 14:23:15 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
DEBUG - 2026-03-01 14:23:15 --> [REQ_ID=cb474fbd299c] [VIEW_RENDER] themes/public/home
INFO - 2026-03-01 14:23:15 --> [REQ_ID=cb474fbd299c] [MEMORY][commonData:start] 8388608
INFO - 2026-03-01 14:23:15 --> themesMemory usage: 8388608
DEBUG - 2026-03-01 14:23:15 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-01 14:23:15 --> [REQ_ID=aad6c69fd10b] [FILTER_AFTER]
DEBUG - 2026-03-01 14:23:15 --> [REQ_ID=aad6c69fd10b] [LIFECYCLE][END] status=200 duration_ms=497.05 memory_delta=4194304
INFO - 2026-03-01 14:23:15 --> [REQ_ID=cb474fbd299c] [PERF] Execution time=0.496500
DEBUG - 2026-03-01 14:23:15 --> [REQ_ID=aad6c69fd10b] [REQUEST][END]
INFO - 2026-03-01 14:23:15 --> [REQ_ID=aad6c69fd10b] [PERF] Execution time=0.506341
DEBUG - 2026-03-01 14:23:16 --> [REQ_ID=dc349564aa2f] [REQUEST][START] GET /?p=php
DEBUG - 2026-03-01 14:23:16 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-01 14:23:16 --> [REQ_ID=dc349564aa2f] [FILTER_BEFORE] /?p=php
DEBUG - 2026-03-01 14:23:16 --> [REQ_ID=dc349564aa2f] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-01 14:23:16 --> [REQ_ID=dc349564aa2f] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php?p=php
DEBUG - 2026-03-01 14:23:16 --> [CSRF] token name=csrf_test_name hash=4cdb097f32eea6812f8a6dd6523337b4
DEBUG - 2026-03-01 14:23:16 --> [REQ_ID=d39af31bf40d] [INIT] App\Controllers\Home::GET
INFO - 2026-03-01 14:23:16 --> [REQ_ID=d39af31bf40d] [MEMORY][controller-start] 4194304
INFO - 2026-03-01 14:23:16 --> [REQ_ID=d39af31bf40d] [MEMORY][commonData:start] 4194304
DEBUG - 2026-03-01 14:23:16 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-01 14:23:16 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
DEBUG - 2026-03-01 14:23:16 --> [REQ_ID=d39af31bf40d] [VIEW_RENDER] themes/public/home
INFO - 2026-03-01 14:23:16 --> [REQ_ID=d39af31bf40d] [MEMORY][commonData:start] 8388608
INFO - 2026-03-01 14:23:16 --> themesMemory usage: 8388608
DEBUG - 2026-03-01 14:23:16 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-01 14:23:16 --> [REQ_ID=dc349564aa2f] [FILTER_AFTER]
DEBUG - 2026-03-01 14:23:16 --> [REQ_ID=dc349564aa2f] [LIFECYCLE][END] status=200 duration_ms=485.89 memory_delta=4194304
INFO - 2026-03-01 14:23:16 --> [REQ_ID=d39af31bf40d] [PERF] Execution time=0.485168
DEBUG - 2026-03-01 14:23:16 --> [REQ_ID=dc349564aa2f] [REQUEST][END]
INFO - 2026-03-01 14:23:16 --> [REQ_ID=dc349564aa2f] [PERF] Execution time=0.501224
DEBUG - 2026-03-01 14:23:17 --> [REQ_ID=fa673076733a] [REQUEST][START] GET /?phpinfo
DEBUG - 2026-03-01 14:23:17 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-01 14:23:17 --> [REQ_ID=fa673076733a] [FILTER_BEFORE] /?phpinfo
DEBUG - 2026-03-01 14:23:17 --> [REQ_ID=fa673076733a] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-01 14:23:17 --> [REQ_ID=fa673076733a] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php?phpinfo=
DEBUG - 2026-03-01 14:23:17 --> [CSRF] token name=csrf_test_name hash=be83deda7abdaea5cce1acb2ef5683c4
DEBUG - 2026-03-01 14:23:17 --> [REQ_ID=064526990639] [INIT] App\Controllers\Home::GET
INFO - 2026-03-01 14:23:17 --> [REQ_ID=064526990639] [MEMORY][controller-start] 4194304
INFO - 2026-03-01 14:23:17 --> [REQ_ID=064526990639] [MEMORY][commonData:start] 4194304
DEBUG - 2026-03-01 14:23:17 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-01 14:23:17 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
DEBUG - 2026-03-01 14:23:17 --> [REQ_ID=064526990639] [VIEW_RENDER] themes/public/home
INFO - 2026-03-01 14:23:17 --> [REQ_ID=064526990639] [MEMORY][commonData:start] 8388608
INFO - 2026-03-01 14:23:17 --> themesMemory usage: 8388608
DEBUG - 2026-03-01 14:23:17 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-01 14:23:17 --> [REQ_ID=fa673076733a] [FILTER_AFTER]
DEBUG - 2026-03-01 14:23:17 --> [REQ_ID=fa673076733a] [LIFECYCLE][END] status=200 duration_ms=487.18 memory_delta=4194304
INFO - 2026-03-01 14:23:17 --> [REQ_ID=064526990639] [PERF] Execution time=0.486757
DEBUG - 2026-03-01 14:23:17 --> [REQ_ID=fa673076733a] [REQUEST][END]
INFO - 2026-03-01 14:23:17 --> [REQ_ID=fa673076733a] [PERF] Execution time=0.496929
DEBUG - 2026-03-01 14:23:18 --> [REQ_ID=8607918fa196] [REQUEST][START] GET /?phpinfo.php
DEBUG - 2026-03-01 14:23:18 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-01 14:23:18 --> [REQ_ID=8607918fa196] [FILTER_BEFORE] /?phpinfo.php
DEBUG - 2026-03-01 14:23:18 --> [REQ_ID=8607918fa196] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-01 14:23:18 --> [REQ_ID=8607918fa196] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php?phpinfo_php=
DEBUG - 2026-03-01 14:23:18 --> [CSRF] token name=csrf_test_name hash=e65df8acfb27889a2d36862cf229a253
DEBUG - 2026-03-01 14:23:18 --> [REQ_ID=6fd97cc3e0c8] [INIT] App\Controllers\Home::GET
INFO - 2026-03-01 14:23:18 --> [REQ_ID=6fd97cc3e0c8] [MEMORY][controller-start] 4194304
INFO - 2026-03-01 14:23:18 --> [REQ_ID=6fd97cc3e0c8] [MEMORY][commonData:start] 4194304
DEBUG - 2026-03-01 14:23:18 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-01 14:23:19 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
DEBUG - 2026-03-01 14:23:19 --> [REQ_ID=6fd97cc3e0c8] [VIEW_RENDER] themes/public/home
INFO - 2026-03-01 14:23:19 --> [REQ_ID=6fd97cc3e0c8] [MEMORY][commonData:start] 8388608
INFO - 2026-03-01 14:23:19 --> themesMemory usage: 8388608
DEBUG - 2026-03-01 14:23:19 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-01 14:23:19 --> [REQ_ID=8607918fa196] [FILTER_AFTER]
DEBUG - 2026-03-01 14:23:19 --> [REQ_ID=8607918fa196] [LIFECYCLE][END] status=200 duration_ms=529.05 memory_delta=4194304
INFO - 2026-03-01 14:23:19 --> [REQ_ID=6fd97cc3e0c8] [PERF] Execution time=0.528371
DEBUG - 2026-03-01 14:23:19 --> [REQ_ID=8607918fa196] [REQUEST][END]
INFO - 2026-03-01 14:23:19 --> [REQ_ID=8607918fa196] [PERF] Execution time=0.539519
DEBUG - 2026-03-01 14:23:19 --> [REQ_ID=12edfec3137d] [REQUEST][START] GET /?phpinfo=1
DEBUG - 2026-03-01 14:23:19 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-01 14:23:19 --> [REQ_ID=12edfec3137d] [FILTER_BEFORE] /?phpinfo=1
DEBUG - 2026-03-01 14:23:19 --> [REQ_ID=12edfec3137d] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-01 14:23:19 --> [REQ_ID=12edfec3137d] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php?phpinfo=1
DEBUG - 2026-03-01 14:23:19 --> [CSRF] token name=csrf_test_name hash=db8bd30f22359ea48a8634b14214bde9
DEBUG - 2026-03-01 14:23:19 --> [REQ_ID=4c3e154c41a6] [INIT] App\Controllers\Home::GET
INFO - 2026-03-01 14:23:19 --> [REQ_ID=4c3e154c41a6] [MEMORY][controller-start] 4194304
INFO - 2026-03-01 14:23:19 --> [REQ_ID=4c3e154c41a6] [MEMORY][commonData:start] 4194304
DEBUG - 2026-03-01 14:23:19 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-01 14:23:20 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
DEBUG - 2026-03-01 14:23:20 --> [REQ_ID=4c3e154c41a6] [VIEW_RENDER] themes/public/home
INFO - 2026-03-01 14:23:20 --> [REQ_ID=4c3e154c41a6] [MEMORY][commonData:start] 8388608
INFO - 2026-03-01 14:23:20 --> themesMemory usage: 8388608
DEBUG - 2026-03-01 14:23:20 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-01 14:23:20 --> [REQ_ID=12edfec3137d] [FILTER_AFTER]
DEBUG - 2026-03-01 14:23:20 --> [REQ_ID=12edfec3137d] [LIFECYCLE][END] status=200 duration_ms=533.11 memory_delta=4194304
INFO - 2026-03-01 14:23:20 --> [REQ_ID=4c3e154c41a6] [PERF] Execution time=0.532312
DEBUG - 2026-03-01 14:23:20 --> [REQ_ID=12edfec3137d] [REQUEST][END]
INFO - 2026-03-01 14:23:20 --> [REQ_ID=12edfec3137d] [PERF] Execution time=0.543326
DEBUG - 2026-03-01 14:23:20 --> [REQ_ID=8ec9bc009afa] [REQUEST][START] POST /
DEBUG - 2026-03-01 14:23:20 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-01 14:23:20 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: POST, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-01 14:23:20 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-01 14:23:20 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-01 14:23:20 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: none
DEBUG - 2026-03-01 14:23:20 --> [REQ_ID=9d4229fd16db] [REQUEST][START] GET /?q=info
DEBUG - 2026-03-01 14:23:20 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-01 14:23:20 --> [REQ_ID=9d4229fd16db] [FILTER_BEFORE] /?q=info
DEBUG - 2026-03-01 14:23:20 --> [REQ_ID=9d4229fd16db] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-01 14:23:20 --> [REQ_ID=9d4229fd16db] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php?q=info
DEBUG - 2026-03-01 14:23:20 --> [CSRF] token name=csrf_test_name hash=fc69e7625e2359147b44fa83af87cc9f
DEBUG - 2026-03-01 14:23:20 --> [REQ_ID=7095efadce0e] [INIT] App\Controllers\Home::GET
INFO - 2026-03-01 14:23:20 --> [REQ_ID=7095efadce0e] [MEMORY][controller-start] 4194304
INFO - 2026-03-01 14:23:20 --> [REQ_ID=7095efadce0e] [MEMORY][commonData:start] 4194304
DEBUG - 2026-03-01 14:23:20 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-01 14:23:21 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
DEBUG - 2026-03-01 14:23:21 --> [REQ_ID=7095efadce0e] [VIEW_RENDER] themes/public/home
INFO - 2026-03-01 14:23:21 --> [REQ_ID=7095efadce0e] [MEMORY][commonData:start] 8388608
INFO - 2026-03-01 14:23:21 --> themesMemory usage: 8388608
DEBUG - 2026-03-01 14:23:21 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-01 14:23:21 --> [REQ_ID=9d4229fd16db] [FILTER_AFTER]
DEBUG - 2026-03-01 14:23:21 --> [REQ_ID=9d4229fd16db] [LIFECYCLE][END] status=200 duration_ms=509.08 memory_delta=4194304
INFO - 2026-03-01 14:23:21 --> [REQ_ID=7095efadce0e] [PERF] Execution time=0.508410
DEBUG - 2026-03-01 14:23:21 --> [REQ_ID=9d4229fd16db] [REQUEST][END]
INFO - 2026-03-01 14:23:21 --> [REQ_ID=9d4229fd16db] [PERF] Execution time=0.518536
DEBUG - 2026-03-01 14:24:19 --> [REQ_ID=76783416eac8] [REQUEST][START] POST /
DEBUG - 2026-03-01 14:24:19 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-01 14:24:19 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: POST, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-01 14:24:19 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-01 14:24:19 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-01 14:24:19 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: none
DEBUG - 2026-03-01 14:26:33 --> [REQ_ID=5579b50e852d] [REQUEST][START] GET /index.php
DEBUG - 2026-03-01 14:26:33 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-01 14:26:33 --> [REQ_ID=5579b50e852d] [FILTER_BEFORE] /index.php
DEBUG - 2026-03-01 14:26:33 --> [REQ_ID=5579b50e852d] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-01 14:26:33 --> [REQ_ID=5579b50e852d] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-01 14:26:33 --> [CSRF] token name=csrf_test_name hash=105325a7796015eefb5faa5e69d4af76
DEBUG - 2026-03-01 14:26:33 --> [REQ_ID=39c88f571647] [INIT] App\Controllers\Home::GET
INFO - 2026-03-01 14:26:33 --> [REQ_ID=39c88f571647] [MEMORY][controller-start] 6291456
INFO - 2026-03-01 14:26:33 --> [REQ_ID=39c88f571647] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-01 14:26:33 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-01 14:26:33 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
DEBUG - 2026-03-01 14:26:33 --> [REQ_ID=39c88f571647] [VIEW_RENDER] themes/public/home
INFO - 2026-03-01 14:26:33 --> [REQ_ID=39c88f571647] [MEMORY][commonData:start] 10485760
INFO - 2026-03-01 14:26:33 --> themesMemory usage: 10485760
DEBUG - 2026-03-01 14:26:33 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-01 14:26:33 --> [REQ_ID=5579b50e852d] [FILTER_AFTER]
DEBUG - 2026-03-01 14:26:33 --> [REQ_ID=5579b50e852d] [LIFECYCLE][END] status=200 duration_ms=618.67 memory_delta=4194304
INFO - 2026-03-01 14:26:33 --> [REQ_ID=39c88f571647] [PERF] Execution time=0.616268
DEBUG - 2026-03-01 14:26:33 --> [REQ_ID=5579b50e852d] [REQUEST][END]
INFO - 2026-03-01 14:26:33 --> [REQ_ID=5579b50e852d] [PERF] Execution time=0.658376
INFO - 2026-03-01 14:30:01 --> [spark:ops:work] Started
INFO - 2026-03-01 14:30:01 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-03-01 14:30:01 --> [SPARK_MEMORY] 16777216
INFO - 2026-03-01 14:30:01 --> [spark:ops:work] Intent
INFO - 2026-03-01 14:30:01 --> [spark:ops:work] Completed
INFO - 2026-03-01 14:30:01 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.033473
INFO - 2026-03-01 14:30:01 --> [SPARK_MEMORY] 18874368
CRITICAL - 2026-03-01 14:35:17 --> Error: Class "App\Modules\APIs\Controllers\MditBaseController" not found
[Method: CLI, Route: routes]
in APPPATH/Modules/APIs/Controllers/MditInvestorAPIController.php on line 12.
 1 VENDORPATH/composer/ClassLoader.php(576): include()
 2 VENDORPATH/composer/ClassLoader.php(427): Composer\Autoload\{closure}('/home/mymiteam/mymiwallet/site/current/vendor/composer/../../app/Modules/APIs/Controllers/MditInvestorAPIController.php')
 3 [internal function]: Composer\Autoload\ClassLoader->loadClass('App\\Modules\\APIs\\Controllers\\MditInvestorAPIController')
 4 SYSTEMPATH/Router/Router.php(792): class_exists('\\App\\Modules\\APIs\\Controllers\\MditInvestorAPIController')
 5 SYSTEMPATH/Router/Router.php(230): CodeIgniter\Router\Router->processRouteAttributes()
 6 SYSTEMPATH/Commands/Utilities/Routes/FilterFinder.php(41): CodeIgniter\Router\Router->handle('API/Mdit/kyc/status')
 7 SYSTEMPATH/Commands/Utilities/Routes/FilterFinder.php(57): CodeIgniter\Commands\Utilities\Routes\FilterFinder->getRouteFilters('API/Mdit/kyc/status')
 8 SYSTEMPATH/Commands/Utilities/Routes/FilterCollector.php(78): CodeIgniter\Commands\Utilities\Routes\FilterFinder->find('API/Mdit/kyc/status')
 9 SYSTEMPATH/Commands/Utilities/Routes.php(110): CodeIgniter\Commands\Utilities\Routes\FilterCollector->get('GET', 'API/Mdit/kyc/status')
10 SYSTEMPATH/CLI/Commands.php(74): CodeIgniter\Commands\Utilities\Routes->run([])
11 SYSTEMPATH/CLI/Console.php(47): CodeIgniter\CLI\Commands->run('routes', [])
12 SYSTEMPATH/Boot.php(442): CodeIgniter\CLI\Console->run()
13 SYSTEMPATH/Boot.php(166): CodeIgniter\Boot::runCommand(Object(CodeIgniter\CLI\Console))
14 ROOTPATH/spark(99): CodeIgniter\Boot::bootSpark(Object(Config\Paths))
CRITICAL - 2026-03-01 14:35:17 --> [EXCEPTION] Class "App\Modules\APIs\Controllers\MditBaseController" not found File=/home/mymiteam/mymiwallet/site/current/app/Modules/APIs/Controllers/MditInvestorAPIController.php Line=12
DEBUG - 2026-03-01 14:38:08 --> [REQ_ID=ddea30fd980e] [REQUEST][START] GET /
DEBUG - 2026-03-01 14:38:08 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-01 14:38:08 --> [REQ_ID=ddea30fd980e] [FILTER_BEFORE] /
DEBUG - 2026-03-01 14:38:08 --> [REQ_ID=ddea30fd980e] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-01 14:38:08 --> [REQ_ID=ddea30fd980e] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-01 14:38:08 --> [CSRF] token name=csrf_test_name hash=792acce081081fb32858393008fd7df9
DEBUG - 2026-03-01 14:38:08 --> [REQ_ID=ea8fa01c3258] [INIT] App\Controllers\Home::GET
INFO - 2026-03-01 14:38:08 --> [REQ_ID=ea8fa01c3258] [MEMORY][controller-start] 6291456
INFO - 2026-03-01 14:38:08 --> [REQ_ID=ea8fa01c3258] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-01 14:38:08 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-01 14:38:09 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-03-01 14:38:09 --> [REQ_ID=ea8fa01c3258] [VIEW_RENDER] themes/public/home
INFO - 2026-03-01 14:38:09 --> [REQ_ID=ea8fa01c3258] [MEMORY][commonData:start] 10485760
INFO - 2026-03-01 14:38:09 --> themesMemory usage: 10485760
DEBUG - 2026-03-01 14:38:09 --> [MetaService] slug= pageName=Home cacheHit= path=DB
DEBUG - 2026-03-01 14:38:09 --> [REQ_ID=ddea30fd980e] [FILTER_AFTER]
DEBUG - 2026-03-01 14:38:09 --> [REQ_ID=ddea30fd980e] [LIFECYCLE][END] status=200 duration_ms=631.22 memory_delta=4194304
INFO - 2026-03-01 14:38:09 --> [REQ_ID=ea8fa01c3258] [PERF] Execution time=0.628860
DEBUG - 2026-03-01 14:38:09 --> [REQ_ID=ddea30fd980e] [REQUEST][END]
INFO - 2026-03-01 14:38:09 --> [REQ_ID=ddea30fd980e] [PERF] Execution time=0.672506
DEBUG - 2026-03-01 14:38:09 --> [REQ_ID=7b4ba6ac3e72] [REQUEST][START] GET /
DEBUG - 2026-03-01 14:38:09 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-01 14:38:09 --> [REQ_ID=7b4ba6ac3e72] [FILTER_BEFORE] /
DEBUG - 2026-03-01 14:38:09 --> [REQ_ID=7b4ba6ac3e72] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-01 14:38:09 --> [REQ_ID=7b4ba6ac3e72] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-01 14:38:09 --> [CSRF] token name=csrf_test_name hash=42282576afa79709ac68072463e10e24
DEBUG - 2026-03-01 14:38:09 --> [REQ_ID=4b034b0178f6] [INIT] App\Controllers\Home::GET
INFO - 2026-03-01 14:38:09 --> [REQ_ID=4b034b0178f6] [MEMORY][controller-start] 6291456
INFO - 2026-03-01 14:38:09 --> [REQ_ID=4b034b0178f6] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-01 14:38:09 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-01 14:38:09 --> [REQ_ID=228808596ecd] [REQUEST][START] GET /
DEBUG - 2026-03-01 14:38:09 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-01 14:38:09 --> [REQ_ID=228808596ecd] [FILTER_BEFORE] /
DEBUG - 2026-03-01 14:38:09 --> [REQ_ID=228808596ecd] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-01 14:38:09 --> [REQ_ID=228808596ecd] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-01 14:38:09 --> [CSRF] token name=csrf_test_name hash=b4b4d63e3dd2d1195fee85a32010e437
DEBUG - 2026-03-01 14:38:09 --> [REQ_ID=93b0f6c0b152] [INIT] App\Controllers\Home::GET
INFO - 2026-03-01 14:38:09 --> [REQ_ID=93b0f6c0b152] [MEMORY][controller-start] 6291456
INFO - 2026-03-01 14:38:09 --> [REQ_ID=93b0f6c0b152] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-01 14:38:09 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-01 14:38:09 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
DEBUG - 2026-03-01 14:38:09 --> [REQ_ID=4b034b0178f6] [VIEW_RENDER] themes/public/home
INFO - 2026-03-01 14:38:09 --> [REQ_ID=4b034b0178f6] [MEMORY][commonData:start] 8388608
INFO - 2026-03-01 14:38:09 --> themesMemory usage: 8388608
DEBUG - 2026-03-01 14:38:09 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-01 14:38:09 --> [REQ_ID=7b4ba6ac3e72] [FILTER_AFTER]
DEBUG - 2026-03-01 14:38:09 --> [REQ_ID=7b4ba6ac3e72] [LIFECYCLE][END] status=200 duration_ms=525.10 memory_delta=2097152
INFO - 2026-03-01 14:38:09 --> [REQ_ID=4b034b0178f6] [PERF] Execution time=0.519766
DEBUG - 2026-03-01 14:38:09 --> [REQ_ID=7b4ba6ac3e72] [REQUEST][END]
INFO - 2026-03-01 14:38:09 --> [REQ_ID=7b4ba6ac3e72] [PERF] Execution time=0.534011
DEBUG - 2026-03-01 14:38:10 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
DEBUG - 2026-03-01 14:38:10 --> [REQ_ID=93b0f6c0b152] [VIEW_RENDER] themes/public/home
INFO - 2026-03-01 14:38:10 --> [REQ_ID=93b0f6c0b152] [MEMORY][commonData:start] 10485760
INFO - 2026-03-01 14:38:10 --> themesMemory usage: 10485760
DEBUG - 2026-03-01 14:38:10 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-01 14:38:10 --> [REQ_ID=228808596ecd] [FILTER_AFTER]
DEBUG - 2026-03-01 14:38:10 --> [REQ_ID=228808596ecd] [LIFECYCLE][END] status=200 duration_ms=565.38 memory_delta=4194304
INFO - 2026-03-01 14:38:10 --> [REQ_ID=93b0f6c0b152] [PERF] Execution time=0.562717
DEBUG - 2026-03-01 14:38:10 --> [REQ_ID=228808596ecd] [REQUEST][END]
INFO - 2026-03-01 14:38:10 --> [REQ_ID=228808596ecd] [PERF] Execution time=0.612234
DEBUG - 2026-03-01 14:38:10 --> [REQ_ID=a03603650093] [REQUEST][START] GET /
DEBUG - 2026-03-01 14:38:10 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-01 14:38:10 --> [REQ_ID=a03603650093] [FILTER_BEFORE] /
DEBUG - 2026-03-01 14:38:10 --> [REQ_ID=a03603650093] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-01 14:38:10 --> [REQ_ID=a03603650093] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-01 14:38:10 --> [CSRF] token name=csrf_test_name hash=cdf71bf5798bcac35a7b61400176922d
DEBUG - 2026-03-01 14:38:10 --> [REQ_ID=d60e1960539f] [INIT] App\Controllers\Home::GET
INFO - 2026-03-01 14:38:10 --> [REQ_ID=d60e1960539f] [MEMORY][controller-start] 6291456
INFO - 2026-03-01 14:38:10 --> [REQ_ID=d60e1960539f] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-01 14:38:10 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-01 14:38:11 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
DEBUG - 2026-03-01 14:38:11 --> [REQ_ID=d60e1960539f] [VIEW_RENDER] themes/public/home
INFO - 2026-03-01 14:38:11 --> [REQ_ID=d60e1960539f] [MEMORY][commonData:start] 8388608
INFO - 2026-03-01 14:38:11 --> themesMemory usage: 8388608
DEBUG - 2026-03-01 14:38:11 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-01 14:38:11 --> [REQ_ID=a03603650093] [FILTER_AFTER]
DEBUG - 2026-03-01 14:38:11 --> [REQ_ID=a03603650093] [LIFECYCLE][END] status=200 duration_ms=518.00 memory_delta=2097152
INFO - 2026-03-01 14:38:11 --> [REQ_ID=d60e1960539f] [PERF] Execution time=0.517685
DEBUG - 2026-03-01 14:38:11 --> [REQ_ID=a03603650093] [REQUEST][END]
INFO - 2026-03-01 14:38:11 --> [REQ_ID=a03603650093] [PERF] Execution time=0.526522
CRITICAL - 2026-03-01 14:38:29 --> Error: Class "App\Modules\APIs\Controllers\MditBaseController" not found
[Method: CLI, Route: routes]
in APPPATH/Modules/APIs/Controllers/MditInvestorAPIController.php on line 13.
 1 VENDORPATH/composer/ClassLoader.php(576): include()
 2 VENDORPATH/composer/ClassLoader.php(427): Composer\Autoload\{closure}('/home/mymiteam/mymiwallet/site/current/vendor/composer/../../app/Modules/APIs/Controllers/MditInvestorAPIController.php')
 3 [internal function]: Composer\Autoload\ClassLoader->loadClass('App\\Modules\\APIs\\Controllers\\MditInvestorAPIController')
 4 SYSTEMPATH/Router/Router.php(792): class_exists('\\App\\Modules\\APIs\\Controllers\\MditInvestorAPIController')
 5 SYSTEMPATH/Router/Router.php(230): CodeIgniter\Router\Router->processRouteAttributes()
 6 SYSTEMPATH/Commands/Utilities/Routes/FilterFinder.php(41): CodeIgniter\Router\Router->handle('API/Mdit/kyc/status')
 7 SYSTEMPATH/Commands/Utilities/Routes/FilterFinder.php(57): CodeIgniter\Commands\Utilities\Routes\FilterFinder->getRouteFilters('API/Mdit/kyc/status')
 8 SYSTEMPATH/Commands/Utilities/Routes/FilterCollector.php(78): CodeIgniter\Commands\Utilities\Routes\FilterFinder->find('API/Mdit/kyc/status')
 9 SYSTEMPATH/Commands/Utilities/Routes.php(110): CodeIgniter\Commands\Utilities\Routes\FilterCollector->get('GET', 'API/Mdit/kyc/status')
10 SYSTEMPATH/CLI/Commands.php(74): CodeIgniter\Commands\Utilities\Routes->run([])
11 SYSTEMPATH/CLI/Console.php(47): CodeIgniter\CLI\Commands->run('routes', [])
12 SYSTEMPATH/Boot.php(442): CodeIgniter\CLI\Console->run()
13 SYSTEMPATH/Boot.php(166): CodeIgniter\Boot::runCommand(Object(CodeIgniter\CLI\Console))
14 ROOTPATH/spark(99): CodeIgniter\Boot::bootSpark(Object(Config\Paths))
CRITICAL - 2026-03-01 14:38:29 --> [EXCEPTION] Class "App\Modules\APIs\Controllers\MditBaseController" not found File=/home/mymiteam/mymiwallet/site/current/app/Modules/APIs/Controllers/MditInvestorAPIController.php Line=13
INFO - 2026-03-01 14:45:02 --> [spark:ops:work] Started
INFO - 2026-03-01 14:45:02 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-03-01 14:45:02 --> [SPARK_MEMORY] 16777216
INFO - 2026-03-01 14:45:02 --> [spark:ops:work] Intent
INFO - 2026-03-01 14:45:02 --> [spark:ops:work] Completed
INFO - 2026-03-01 14:45:02 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.040650
INFO - 2026-03-01 14:45:02 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-03-01 14:47:21 --> [REQ_ID=69b6d6bf36e2] [REQUEST][START] HEAD /
DEBUG - 2026-03-01 14:47:21 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-01 14:47:21 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-01 14:47:21 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-01 14:47:21 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-01 14:47:21 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: none
DEBUG - 2026-03-01 14:47:22 --> [REQ_ID=ec6bf77d67f5] [REQUEST][START] HEAD /
DEBUG - 2026-03-01 14:47:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-01 14:47:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-01 14:47:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-01 14:47:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-01 14:47:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: none
DEBUG - 2026-03-01 14:47:22 --> [REQ_ID=88aed8547d89] [REQUEST][START] HEAD /
DEBUG - 2026-03-01 14:47:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-01 14:47:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-01 14:47:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-01 14:47:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-01 14:47:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: none
DEBUG - 2026-03-01 14:55:16 --> [REQ_ID=4bf6a8d993e0] [REQUEST][START] GET /
DEBUG - 2026-03-01 14:55:16 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-01 14:55:16 --> [REQ_ID=4bf6a8d993e0] [FILTER_BEFORE] /
DEBUG - 2026-03-01 14:55:16 --> [REQ_ID=4bf6a8d993e0] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-01 14:55:16 --> [REQ_ID=4bf6a8d993e0] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-01 14:55:16 --> [CSRF] token name=csrf_test_name hash=219b2c64b629619afa942d2c9027868a
DEBUG - 2026-03-01 14:55:16 --> [REQ_ID=3ea6c857011e] [INIT] App\Controllers\Home::GET
INFO - 2026-03-01 14:55:16 --> [REQ_ID=3ea6c857011e] [MEMORY][controller-start] 6291456
INFO - 2026-03-01 14:55:16 --> [REQ_ID=3ea6c857011e] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-01 14:55:16 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-01 14:55:17 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-03-01 14:55:17 --> [REQ_ID=3ea6c857011e] [VIEW_RENDER] themes/public/home
INFO - 2026-03-01 14:55:17 --> [REQ_ID=3ea6c857011e] [MEMORY][commonData:start] 10485760
INFO - 2026-03-01 14:55:17 --> themesMemory usage: 10485760
DEBUG - 2026-03-01 14:55:17 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-01 14:55:17 --> [REQ_ID=4bf6a8d993e0] [FILTER_AFTER]
DEBUG - 2026-03-01 14:55:17 --> [REQ_ID=4bf6a8d993e0] [LIFECYCLE][END] status=200 duration_ms=680.62 memory_delta=4194304
INFO - 2026-03-01 14:55:17 --> [REQ_ID=3ea6c857011e] [PERF] Execution time=0.678573
DEBUG - 2026-03-01 14:55:17 --> [REQ_ID=4bf6a8d993e0] [REQUEST][END]
INFO - 2026-03-01 14:55:17 --> [REQ_ID=4bf6a8d993e0] [PERF] Execution time=0.719789
INFO - 2026-03-01 15:00:01 --> [spark:ops:work] Started
INFO - 2026-03-01 15:00:01 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-03-01 15:00:01 --> [SPARK_MEMORY] 16777216
INFO - 2026-03-01 15:00:01 --> [spark:ops:work] Intent
INFO - 2026-03-01 15:00:01 --> [spark:ops:work] Completed
INFO - 2026-03-01 15:00:01 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.040768
INFO - 2026-03-01 15:00:01 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-03-01 15:00:01 --> [REQ_ID=0a8a4c2110e3] [REQUEST][START] GET /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-01 15:00:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-01 15:00:01 --> [REQ_ID=0a8a4c2110e3] [FILTER_BEFORE] /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-01 15:00:01 --> [REQ_ID=0a8a4c2110e3] [ROUTE] Controller=\App\Modules\Management\Controllers\ManagementAPIController Method=Run_CRON_Tasks
DEBUG - 2026-03-01 15:00:01 --> [REQ_ID=0a8a4c2110e3] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-01 15:00:01 --> [REQ_ID=0a8a4c2110e3] [REQUEST][END]
INFO - 2026-03-01 15:00:01 --> [REQ_ID=0a8a4c2110e3] [PERF] Execution time=0.038887
DEBUG - 2026-03-01 15:01:06 --> [REQ_ID=96a994c2adeb] [REQUEST][START] GET /
DEBUG - 2026-03-01 15:01:06 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-01 15:01:06 --> [REQ_ID=96a994c2adeb] [FILTER_BEFORE] /
DEBUG - 2026-03-01 15:01:06 --> [REQ_ID=96a994c2adeb] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-01 15:01:06 --> [REQ_ID=96a994c2adeb] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-01 15:01:06 --> [CSRF] token name=csrf_test_name hash=792735efb1f7ee6d91f8808fb4fa6a29
DEBUG - 2026-03-01 15:01:06 --> [REQ_ID=83f01c14746e] [INIT] App\Controllers\Home::GET
INFO - 2026-03-01 15:01:06 --> [REQ_ID=83f01c14746e] [MEMORY][controller-start] 4194304
INFO - 2026-03-01 15:01:07 --> [REQ_ID=83f01c14746e] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-01 15:01:07 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-01 15:01:07 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
DEBUG - 2026-03-01 15:01:07 --> [REQ_ID=83f01c14746e] [VIEW_RENDER] themes/public/home
INFO - 2026-03-01 15:01:07 --> [REQ_ID=83f01c14746e] [MEMORY][commonData:start] 8388608
INFO - 2026-03-01 15:01:07 --> themesMemory usage: 8388608
DEBUG - 2026-03-01 15:01:07 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-01 15:01:07 --> [REQ_ID=96a994c2adeb] [FILTER_AFTER]
DEBUG - 2026-03-01 15:01:07 --> [REQ_ID=96a994c2adeb] [LIFECYCLE][END] status=200 duration_ms=777.43 memory_delta=4194304
INFO - 2026-03-01 15:01:07 --> [REQ_ID=83f01c14746e] [PERF] Execution time=0.775963
DEBUG - 2026-03-01 15:01:07 --> [REQ_ID=96a994c2adeb] [REQUEST][END]
INFO - 2026-03-01 15:01:07 --> [REQ_ID=96a994c2adeb] [PERF] Execution time=0.791284
INFO - 2026-03-01 15:15:01 --> [spark:ops:work] Started
INFO - 2026-03-01 15:15:01 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-03-01 15:15:01 --> [SPARK_MEMORY] 16777216
INFO - 2026-03-01 15:15:01 --> [spark:ops:work] Intent
INFO - 2026-03-01 15:15:01 --> [spark:ops:work] Completed
INFO - 2026-03-01 15:15:01 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.037652
INFO - 2026-03-01 15:15:01 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-03-01 15:15:01 --> [REQ_ID=5144e0fdebd6] [REQUEST][START] GET /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-01 15:15:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-01 15:15:01 --> [REQ_ID=5144e0fdebd6] [FILTER_BEFORE] /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-01 15:15:01 --> [REQ_ID=5144e0fdebd6] [ROUTE] Controller=\App\Modules\APIs\Controllers\AlertsAPIController Method=fetchEmailAlerts
DEBUG - 2026-03-01 15:15:01 --> [REQ_ID=5144e0fdebd6] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-01 15:15:01 --> [REQ_ID=5144e0fdebd6] [REQUEST][END]
INFO - 2026-03-01 15:15:01 --> [REQ_ID=5144e0fdebd6] [PERF] Execution time=0.060274
INFO - 2026-03-01 15:30:02 --> [spark:ops:work] Started
INFO - 2026-03-01 15:30:02 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-03-01 15:30:02 --> [SPARK_MEMORY] 16777216
INFO - 2026-03-01 15:30:02 --> [spark:ops:work] Intent
INFO - 2026-03-01 15:30:02 --> [spark:ops:work] Completed
INFO - 2026-03-01 15:30:02 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.030591
INFO - 2026-03-01 15:30:02 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-03-01 15:36:52 --> [REQ_ID=056f2b9baec7] [REQUEST][START] GET /index.php/Features/Brokerage-Integration
DEBUG - 2026-03-01 15:36:52 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-01 15:36:52 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: GET, Route: Features/Brokerage-Integration]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-01 15:36:52 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-01 15:36:52 --> [404] URI=https://www.mymiwallet.com/index.php/Features/Brokerage-Integration
WARNING - 2026-03-01 15:36:52 --> 404 route miss: https://www.mymiwallet.com/index.php/Features/Brokerage-Integration | referrer: https://www.mymiwallet.com/index.php/How-It-Works/MyMI-Gold
ERROR - 2026-03-01 15:36:52 --> [ERROR_PAGE] event=error_404 status=404 message=Page not found.
DEBUG - 2026-03-01 15:41:16 --> [REQ_ID=1654dc9a4b2f] [REQUEST][START] GET /index.php/Management/Alerts/share-template?symbol=GRAB
DEBUG - 2026-03-01 15:41:16 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-01 15:41:16 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: GET, Route: Management/Alerts/share-template]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-01 15:41:16 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-01 15:41:16 --> [404] URI=https://www.mymiwallet.com/index.php/Management/Alerts/share-template?symbol=GRAB
WARNING - 2026-03-01 15:41:16 --> 404 route miss: https://www.mymiwallet.com/index.php/Management/Alerts/share-template?symbol=GRAB | referrer: none
INFO - 2026-03-01 15:45:01 --> [spark:ops:work] Started
INFO - 2026-03-01 15:45:01 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-03-01 15:45:01 --> [SPARK_MEMORY] 16777216
INFO - 2026-03-01 15:45:01 --> [spark:ops:work] Intent
INFO - 2026-03-01 15:45:01 --> [spark:ops:work] Completed
INFO - 2026-03-01 15:45:01 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.034897
INFO - 2026-03-01 15:45:01 --> [SPARK_MEMORY] 18874368
INFO - 2026-03-01 16:00:02 --> [spark:ops:work] Started
INFO - 2026-03-01 16:00:02 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-03-01 16:00:02 --> [SPARK_MEMORY] 16777216
INFO - 2026-03-01 16:00:02 --> [spark:ops:work] Intent
DEBUG - 2026-03-01 16:00:02 --> [REQ_ID=ed43f598cc86] [REQUEST][START] GET /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-01 16:00:02 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
INFO - 2026-03-01 16:00:02 --> [spark:ops:work] Completed
INFO - 2026-03-01 16:00:02 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.050084
INFO - 2026-03-01 16:00:02 --> [SPARK_MEMORY] 18874368
INFO - 2026-03-01 16:00:02 --> [SPARK_START] App\Commands\AIOps\Run
INFO - 2026-03-01 16:00:02 --> [SPARK_MEMORY] 16777216
INFO - 2026-03-01 16:00:02 --> [spark:aiops:run] Intent
DEBUG - 2026-03-01 16:00:02 --> [REQ_ID=ed43f598cc86] [FILTER_BEFORE] /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-01 16:00:02 --> [REQ_ID=ed43f598cc86] [ROUTE] Controller=\App\Modules\Management\Controllers\ManagementAPIController Method=Run_CRON_Tasks
DEBUG - 2026-03-01 16:00:02 --> [REQ_ID=ed43f598cc86] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-01 16:00:02 --> [REQ_ID=ed43f598cc86] [REQUEST][END]
INFO - 2026-03-01 16:00:02 --> [REQ_ID=ed43f598cc86] [PERF] Execution time=0.078141
INFO - 2026-03-01 16:00:03 --> [AIOPS][SPARK][GOVERNANCE][spark:logs:summarize] Started
INFO - 2026-03-01 16:00:03 --> [SPARK_START] App\Commands\Logs\Summarize
INFO - 2026-03-01 16:00:03 --> [SPARK_MEMORY] 16777216
INFO - 2026-03-01 16:00:03 --> [spark:logs:summarize] Intent
INFO - 2026-03-01 16:00:03 --> [AIOPS][SPARK][GOVERNANCE][spark:logs:summarize] Completed
INFO - 2026-03-01 16:00:03 --> [SPARK_COMPLETE] App\Commands\Logs\Summarize duration=0.029028
INFO - 2026-03-01 16:00:03 --> [SPARK_MEMORY] 18874368
INFO - 2026-03-01 16:00:04 --> [spark:app:healthcheck] Started
INFO - 2026-03-01 16:00:04 --> [SPARK_START] App\Commands\App\Healthcheck
INFO - 2026-03-01 16:00:04 --> [SPARK_MEMORY] 16777216
INFO - 2026-03-01 16:00:04 --> [spark:app:healthcheck] Intent
DEBUG - 2026-03-01 16:00:04 --> LOG_HEALTHCHECK debug marker=e995ec7d9070
INFO - 2026-03-01 16:00:04 --> LOG_HEALTHCHECK info marker=e995ec7d9070
NOTICE - 2026-03-01 16:00:04 --> LOG_HEALTHCHECK probe marker=e995ec7d9070
INFO - 2026-03-01 16:00:04 --> [spark:app:healthcheck] Completed
INFO - 2026-03-01 16:00:04 --> [SPARK_COMPLETE] App\Commands\App\Healthcheck duration=0.028228
INFO - 2026-03-01 16:00:04 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-03-01 16:00:05 --> OllamaPatchRunner:L142 - validateGeneratedPatch Content: 
WARNING - 2026-03-01 16:00:05 --> OllamaPatchRunner:L49 - Original Diff: 
DEBUG - 2026-03-01 16:00:06 --> OllamaPatchRunner:L51 - Retried Diff: 
DEBUG - 2026-03-01 16:00:06 --> OllamaPatchRunner:L142 - validateGeneratedPatch Content: 
DEBUG - 2026-03-01 16:00:06 --> OllamaPatchRunner:L53 - Validating Generated Patch Failed
INFO - 2026-03-01 16:00:06 --> [SPARK_COMPLETE] App\Commands\AIOps\Run duration=3.890263
INFO - 2026-03-01 16:00:06 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-03-01 16:00:31 --> [REQ_ID=48d8e455acac] [REQUEST][START] GET /index.php/How-It-Works/Purchase-MyMI-Gold
DEBUG - 2026-03-01 16:00:31 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-01 16:00:31 --> [REQ_ID=48d8e455acac] [FILTER_BEFORE] /index.php/How-It-Works/Purchase-MyMI-Gold
DEBUG - 2026-03-01 16:00:31 --> [REQ_ID=48d8e455acac] [ROUTE] Controller=\App\Modules\Blog\Controllers\HowItWorksController Method=show
DEBUG - 2026-03-01 16:00:31 --> [REQ_ID=48d8e455acac] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/How-It-Works/Purchase-MyMI-Gold
DEBUG - 2026-03-01 16:00:31 --> [CSRF] token name=csrf_test_name hash=160169d39df7d4c214c6f0b05e9e11db
DEBUG - 2026-03-01 16:00:31 --> [REQ_ID=765902196b7d] [INIT] App\Modules\Blog\Controllers\HowItWorksController::GET
INFO - 2026-03-01 16:00:31 --> [REQ_ID=765902196b7d] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-01 16:00:31 --> [REQ_ID=765902196b7d] [METHOD_ENTRY] show
DEBUG - 2026-03-01 16:00:31 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-01 16:00:31 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-01 16:00:31 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-01 16:00:31 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-01 16:00:31 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-01 16:00:31 --> MyMICoin: guest context detected; skipping user-specific preload.
ERROR - 2026-03-01 16:00:31 --> [ERROR_PAGE] event=error_404 status=404 message=Page not found.
DEBUG - 2026-03-01 16:00:31 --> [REQ_ID=48d8e455acac] [FILTER_AFTER]
DEBUG - 2026-03-01 16:00:31 --> [REQ_ID=48d8e455acac] [LIFECYCLE][END] status=404 duration_ms=103.40 memory_delta=2097152
INFO - 2026-03-01 16:00:31 --> [REQ_ID=765902196b7d] [PERF] Execution time=0.101452
DEBUG - 2026-03-01 16:00:31 --> [REQ_ID=48d8e455acac] [REQUEST][END]
INFO - 2026-03-01 16:00:31 --> [REQ_ID=48d8e455acac] [PERF] Execution time=0.119571
DEBUG - 2026-03-01 16:03:39 --> [REQ_ID=b251bb316abb] [REQUEST][START] GET /
DEBUG - 2026-03-01 16:03:39 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-01 16:03:39 --> [REQ_ID=b251bb316abb] [FILTER_BEFORE] /
DEBUG - 2026-03-01 16:03:39 --> [REQ_ID=b251bb316abb] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-01 16:03:39 --> [REQ_ID=b251bb316abb] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-01 16:03:39 --> [CSRF] token name=csrf_test_name hash=e0d0f0177f40b45200f0d8343c2e84eb
DEBUG - 2026-03-01 16:03:39 --> [REQ_ID=e9cdbc6b7942] [INIT] App\Controllers\Home::GET
INFO - 2026-03-01 16:03:39 --> [REQ_ID=e9cdbc6b7942] [MEMORY][controller-start] 6291456
INFO - 2026-03-01 16:03:40 --> [REQ_ID=e9cdbc6b7942] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-01 16:03:40 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-01 16:03:40 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-03-01 16:03:40 --> [REQ_ID=e9cdbc6b7942] [VIEW_RENDER] themes/public/home
INFO - 2026-03-01 16:03:40 --> [REQ_ID=e9cdbc6b7942] [MEMORY][commonData:start] 10485760
INFO - 2026-03-01 16:03:40 --> themesMemory usage: 10485760
DEBUG - 2026-03-01 16:03:40 --> [MetaService] slug= pageName=Home cacheHit= path=DB
DEBUG - 2026-03-01 16:03:40 --> [REQ_ID=b251bb316abb] [FILTER_AFTER]
DEBUG - 2026-03-01 16:03:40 --> [REQ_ID=b251bb316abb] [LIFECYCLE][END] status=200 duration_ms=627.10 memory_delta=4194304
INFO - 2026-03-01 16:03:40 --> [REQ_ID=e9cdbc6b7942] [PERF] Execution time=0.625077
DEBUG - 2026-03-01 16:03:40 --> [REQ_ID=b251bb316abb] [REQUEST][END]
INFO - 2026-03-01 16:03:40 --> [REQ_ID=b251bb316abb] [PERF] Execution time=0.665541
DEBUG - 2026-03-01 16:06:40 --> [REQ_ID=4f6cb2b41885] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-01 16:06:40 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-01 16:06:40 --> [REQ_ID=4f6cb2b41885] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-01 16:06:40 --> [REQ_ID=4f6cb2b41885] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-01 16:06:40 --> [REQ_ID=4f6cb2b41885] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-01 16:06:40 --> [CSRF] token name=csrf_test_name hash=d7f065f16a4baf10f047baad5f8e84e9
DEBUG - 2026-03-01 16:06:40 --> [REQ_ID=7b85f07833f6] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-01 16:06:40 --> [REQ_ID=7b85f07833f6] [MEMORY][controller-start] 6291456
DEBUG - 2026-03-01 16:06:40 --> [REQ_ID=4f6cb2b41885] [FILTER_AFTER]
DEBUG - 2026-03-01 16:06:40 --> [REQ_ID=4f6cb2b41885] [LIFECYCLE][END] status=200 duration_ms=66.79 memory_delta=0
INFO - 2026-03-01 16:06:40 --> [REQ_ID=7b85f07833f6] [PERF] Execution time=0.064317
DEBUG - 2026-03-01 16:06:40 --> [REQ_ID=4f6cb2b41885] [REQUEST][END]
INFO - 2026-03-01 16:06:40 --> [REQ_ID=4f6cb2b41885] [PERF] Execution time=0.107891
INFO - 2026-03-01 16:15:01 --> [spark:ops:work] Started
INFO - 2026-03-01 16:15:01 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-03-01 16:15:01 --> [SPARK_MEMORY] 16777216
INFO - 2026-03-01 16:15:01 --> [spark:ops:work] Intent
INFO - 2026-03-01 16:15:02 --> [spark:ops:work] Completed
INFO - 2026-03-01 16:15:02 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.158741
INFO - 2026-03-01 16:15:02 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-03-01 16:15:02 --> [REQ_ID=311f23d12c65] [REQUEST][START] GET /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-01 16:15:02 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-01 16:15:02 --> [REQ_ID=311f23d12c65] [FILTER_BEFORE] /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-01 16:15:02 --> [REQ_ID=311f23d12c65] [ROUTE] Controller=\App\Modules\APIs\Controllers\AlertsAPIController Method=fetchEmailAlerts
DEBUG - 2026-03-01 16:15:02 --> [REQ_ID=311f23d12c65] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-01 16:15:02 --> [REQ_ID=311f23d12c65] [REQUEST][END]
INFO - 2026-03-01 16:15:02 --> [REQ_ID=311f23d12c65] [PERF] Execution time=0.065688
DEBUG - 2026-03-01 16:15:47 --> [REQ_ID=76cddaff471d] [REQUEST][START] GET /
DEBUG - 2026-03-01 16:15:47 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-01 16:15:47 --> [REQ_ID=76cddaff471d] [FILTER_BEFORE] /
DEBUG - 2026-03-01 16:15:47 --> [REQ_ID=76cddaff471d] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-01 16:15:47 --> [REQ_ID=76cddaff471d] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-01 16:15:47 --> [CSRF] token name=csrf_test_name hash=86c6d883480efb648f7ccae65c70a5d3
DEBUG - 2026-03-01 16:15:47 --> [REQ_ID=79d92676a088] [INIT] App\Controllers\Home::GET
INFO - 2026-03-01 16:15:47 --> [REQ_ID=79d92676a088] [MEMORY][controller-start] 4194304
INFO - 2026-03-01 16:15:47 --> [REQ_ID=79d92676a088] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-01 16:15:47 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-01 16:15:47 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
DEBUG - 2026-03-01 16:15:47 --> [REQ_ID=79d92676a088] [VIEW_RENDER] themes/public/home
INFO - 2026-03-01 16:15:47 --> [REQ_ID=79d92676a088] [MEMORY][commonData:start] 8388608
INFO - 2026-03-01 16:15:47 --> themesMemory usage: 8388608
DEBUG - 2026-03-01 16:15:47 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-01 16:15:47 --> [REQ_ID=76cddaff471d] [FILTER_AFTER]
DEBUG - 2026-03-01 16:15:47 --> [REQ_ID=76cddaff471d] [LIFECYCLE][END] status=200 duration_ms=606.48 memory_delta=4194304
INFO - 2026-03-01 16:15:47 --> [REQ_ID=79d92676a088] [PERF] Execution time=0.604951
DEBUG - 2026-03-01 16:15:47 --> [REQ_ID=76cddaff471d] [REQUEST][END]
INFO - 2026-03-01 16:15:47 --> [REQ_ID=76cddaff471d] [PERF] Execution time=0.621272
INFO - 2026-03-01 16:30:01 --> [spark:ops:work] Started
INFO - 2026-03-01 16:30:01 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-03-01 16:30:01 --> [SPARK_MEMORY] 16777216
INFO - 2026-03-01 16:30:01 --> [spark:ops:work] Intent
INFO - 2026-03-01 16:30:01 --> [spark:ops:work] Completed
INFO - 2026-03-01 16:30:01 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.106949
INFO - 2026-03-01 16:30:01 --> [SPARK_MEMORY] 18874368
INFO - 2026-03-01 16:45:01 --> [spark:ops:work] Started
INFO - 2026-03-01 16:45:01 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-03-01 16:45:01 --> [SPARK_MEMORY] 16777216
INFO - 2026-03-01 16:45:01 --> [spark:ops:work] Intent
INFO - 2026-03-01 16:45:01 --> [spark:ops:work] Completed
INFO - 2026-03-01 16:45:01 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.036991
INFO - 2026-03-01 16:45:01 --> [SPARK_MEMORY] 18874368
INFO - 2026-03-01 17:00:02 --> [spark:ops:work] Started
INFO - 2026-03-01 17:00:02 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-03-01 17:00:02 --> [SPARK_MEMORY] 16777216
INFO - 2026-03-01 17:00:02 --> [spark:ops:work] Intent
INFO - 2026-03-01 17:00:02 --> [spark:ops:work] Completed
INFO - 2026-03-01 17:00:02 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.035019
INFO - 2026-03-01 17:00:02 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-03-01 17:00:02 --> [REQ_ID=1065e67f31e1] [REQUEST][START] GET /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-01 17:00:02 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-01 17:00:02 --> [REQ_ID=1065e67f31e1] [FILTER_BEFORE] /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-01 17:00:02 --> [REQ_ID=1065e67f31e1] [ROUTE] Controller=\App\Modules\Management\Controllers\ManagementAPIController Method=Run_CRON_Tasks
DEBUG - 2026-03-01 17:00:02 --> [REQ_ID=1065e67f31e1] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-01 17:00:02 --> [REQ_ID=1065e67f31e1] [REQUEST][END]
INFO - 2026-03-01 17:00:02 --> [REQ_ID=1065e67f31e1] [PERF] Execution time=0.049090
CRITICAL - 2026-03-01 17:03:06 --> Error: Class "App\Modules\APIs\Controllers\MditBaseController" not found
[Method: CLI, Route: routes]
in APPPATH/Modules/APIs/Controllers/MditInvestorAPIController.php on line 13.
 1 VENDORPATH/composer/ClassLoader.php(576): include()
 2 VENDORPATH/composer/ClassLoader.php(427): Composer\Autoload\{closure}('/home/mymiteam/mymiwallet/site/current/vendor/composer/../../app/Modules/APIs/Controllers/MditInvestorAPIController.php')
 3 [internal function]: Composer\Autoload\ClassLoader->loadClass('App\\Modules\\APIs\\Controllers\\MditInvestorAPIController')
 4 SYSTEMPATH/Router/Router.php(792): class_exists('\\App\\Modules\\APIs\\Controllers\\MditInvestorAPIController')
 5 SYSTEMPATH/Router/Router.php(230): CodeIgniter\Router\Router->processRouteAttributes()
 6 SYSTEMPATH/Commands/Utilities/Routes/FilterFinder.php(41): CodeIgniter\Router\Router->handle('API/Mdit/kyc/status')
 7 SYSTEMPATH/Commands/Utilities/Routes/FilterFinder.php(57): CodeIgniter\Commands\Utilities\Routes\FilterFinder->getRouteFilters('API/Mdit/kyc/status')
 8 SYSTEMPATH/Commands/Utilities/Routes/FilterCollector.php(78): CodeIgniter\Commands\Utilities\Routes\FilterFinder->find('API/Mdit/kyc/status')
 9 SYSTEMPATH/Commands/Utilities/Routes.php(110): CodeIgniter\Commands\Utilities\Routes\FilterCollector->get('GET', 'API/Mdit/kyc/status')
10 SYSTEMPATH/CLI/Commands.php(74): CodeIgniter\Commands\Utilities\Routes->run([])
11 SYSTEMPATH/CLI/Console.php(47): CodeIgniter\CLI\Commands->run('routes', [])
12 SYSTEMPATH/Boot.php(442): CodeIgniter\CLI\Console->run()
13 SYSTEMPATH/Boot.php(166): CodeIgniter\Boot::runCommand(Object(CodeIgniter\CLI\Console))
14 ROOTPATH/spark(99): CodeIgniter\Boot::bootSpark(Object(Config\Paths))
CRITICAL - 2026-03-01 17:03:06 --> [EXCEPTION] Class "App\Modules\APIs\Controllers\MditBaseController" not found File=/home/mymiteam/mymiwallet/site/current/app/Modules/APIs/Controllers/MditInvestorAPIController.php Line=13
CRITICAL - 2026-03-01 17:03:52 --> Error: Class "App\Modules\APIs\Controllers\MditBaseController" not found
[Method: CLI, Route: routes]
in APPPATH/Modules/APIs/Controllers/MditAdminAPIController.php on line 13.
 1 VENDORPATH/composer/ClassLoader.php(576): include()
 2 VENDORPATH/composer/ClassLoader.php(427): Composer\Autoload\{closure}('/home/mymiteam/mymiwallet/site/current/vendor/composer/../../app/Modules/APIs/Controllers/MditAdminAPIController.php')
 3 [internal function]: Composer\Autoload\ClassLoader->loadClass('App\\Modules\\APIs\\Controllers\\MditAdminAPIController')
 4 SYSTEMPATH/Router/Router.php(792): class_exists('\\App\\Modules\\APIs\\Controllers\\MditAdminAPIController')
 5 SYSTEMPATH/Router/Router.php(230): CodeIgniter\Router\Router->processRouteAttributes()
 6 SYSTEMPATH/Commands/Utilities/Routes/FilterFinder.php(41): CodeIgniter\Router\Router->handle('API/Mdit/admin/redemptions/pending')
 7 SYSTEMPATH/Commands/Utilities/Routes/FilterFinder.php(57): CodeIgniter\Commands\Utilities\Routes\FilterFinder->getRouteFilters('API/Mdit/admin/redemptions/pending')
 8 SYSTEMPATH/Commands/Utilities/Routes/FilterCollector.php(78): CodeIgniter\Commands\Utilities\Routes\FilterFinder->find('API/Mdit/admin/redemptions/pending')
 9 SYSTEMPATH/Commands/Utilities/Routes.php(110): CodeIgniter\Commands\Utilities\Routes\FilterCollector->get('GET', 'API/Mdit/admin/redemptions/pending')
10 SYSTEMPATH/CLI/Commands.php(74): CodeIgniter\Commands\Utilities\Routes->run([])
11 SYSTEMPATH/CLI/Console.php(47): CodeIgniter\CLI\Commands->run('routes', [])
12 SYSTEMPATH/Boot.php(442): CodeIgniter\CLI\Console->run()
13 SYSTEMPATH/Boot.php(166): CodeIgniter\Boot::runCommand(Object(CodeIgniter\CLI\Console))
14 ROOTPATH/spark(99): CodeIgniter\Boot::bootSpark(Object(Config\Paths))
CRITICAL - 2026-03-01 17:03:52 --> [EXCEPTION] Class "App\Modules\APIs\Controllers\MditBaseController" not found File=/home/mymiteam/mymiwallet/site/current/app/Modules/APIs/Controllers/MditAdminAPIController.php Line=13
CRITICAL - 2026-03-01 17:05:04 --> CodeIgniter\Router\Exceptions\RouterException: The namespace delimiter is a backslash (\), not a slash (/). Route handler: "\App\Modules\APIs\Controllers\EmailAPIController:cloneCampaign/$1"
[Method: CLI, Route: routes]
in SYSTEMPATH/Router/Router.php on line 523.
 1 SYSTEMPATH/Router/Router.php(523): CodeIgniter\Router\Exceptions\RouterException::forInvalidControllerName('\\App\\Modules\\APIs\\Controllers\\EmailAPIController:cloneCampaign/$1')
 2 SYSTEMPATH/Router/Router.php(225): CodeIgniter\Router\Router->checkRoutes('API/Email/cloneCampaign/123')
 3 SYSTEMPATH/Commands/Utilities/Routes/FilterFinder.php(41): CodeIgniter\Router\Router->handle('API/Email/cloneCampaign/123')
 4 SYSTEMPATH/Commands/Utilities/Routes/FilterFinder.php(57): CodeIgniter\Commands\Utilities\Routes\FilterFinder->getRouteFilters('API/Email/cloneCampaign/123')
 5 SYSTEMPATH/Commands/Utilities/Routes/FilterCollector.php(78): CodeIgniter\Commands\Utilities\Routes\FilterFinder->find('API/Email/cloneCampaign/123')
 6 SYSTEMPATH/Commands/Utilities/Routes.php(110): CodeIgniter\Commands\Utilities\Routes\FilterCollector->get('GET', 'API/Email/cloneCampaign/123')
 7 SYSTEMPATH/CLI/Commands.php(74): CodeIgniter\Commands\Utilities\Routes->run([])
 8 SYSTEMPATH/CLI/Console.php(47): CodeIgniter\CLI\Commands->run('routes', [])
 9 SYSTEMPATH/Boot.php(442): CodeIgniter\CLI\Console->run()
10 SYSTEMPATH/Boot.php(166): CodeIgniter\Boot::runCommand(Object(CodeIgniter\CLI\Console))
11 ROOTPATH/spark(99): CodeIgniter\Boot::bootSpark(Object(Config\Paths))
CRITICAL - 2026-03-01 17:05:04 --> [EXCEPTION] The namespace delimiter is a backslash (\), not a slash (/). Route handler: "\App\Modules\APIs\Controllers\EmailAPIController:cloneCampaign/$1" File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/Router/Router.php Line=523
DEBUG - 2026-03-01 17:05:18 --> [REQ_ID=0cbbf1b9b5fd] [REQUEST][START] GET /
DEBUG - 2026-03-01 17:05:18 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-01 17:05:18 --> [REQ_ID=0cbbf1b9b5fd] [FILTER_BEFORE] /
DEBUG - 2026-03-01 17:05:18 --> [REQ_ID=0cbbf1b9b5fd] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-01 17:05:18 --> [REQ_ID=0cbbf1b9b5fd] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-01 17:05:18 --> [CSRF] token name=csrf_test_name hash=bd7a97072738c96182475b1dd499c311
DEBUG - 2026-03-01 17:05:18 --> [REQ_ID=556e92b04474] [INIT] App\Controllers\Home::GET
INFO - 2026-03-01 17:05:18 --> [REQ_ID=556e92b04474] [MEMORY][controller-start] 6291456
INFO - 2026-03-01 17:05:19 --> [REQ_ID=556e92b04474] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-01 17:05:19 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-01 17:05:19 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-03-01 17:05:19 --> [REQ_ID=556e92b04474] [VIEW_RENDER] themes/public/home
INFO - 2026-03-01 17:05:19 --> [REQ_ID=556e92b04474] [MEMORY][commonData:start] 10485760
INFO - 2026-03-01 17:05:19 --> themesMemory usage: 10485760
DEBUG - 2026-03-01 17:05:19 --> [MetaService] slug= pageName=Home cacheHit= path=DB
DEBUG - 2026-03-01 17:05:19 --> [REQ_ID=0cbbf1b9b5fd] [FILTER_AFTER]
DEBUG - 2026-03-01 17:05:19 --> [REQ_ID=0cbbf1b9b5fd] [LIFECYCLE][END] status=200 duration_ms=596.89 memory_delta=4194304
INFO - 2026-03-01 17:05:19 --> [REQ_ID=556e92b04474] [PERF] Execution time=0.594393
DEBUG - 2026-03-01 17:05:19 --> [REQ_ID=0cbbf1b9b5fd] [REQUEST][END]
INFO - 2026-03-01 17:05:19 --> [REQ_ID=0cbbf1b9b5fd] [PERF] Execution time=0.635486
CRITICAL - 2026-03-01 17:08:58 --> CodeIgniter\Router\Exceptions\RouterException: The namespace delimiter is a backslash (\), not a slash (/). Route handler: "\App\Modules\APIs\Controllers\EmailAPIController:cloneCampaign/$1"
[Method: CLI, Route: routes]
in SYSTEMPATH/Router/Router.php on line 523.
 1 SYSTEMPATH/Router/Router.php(523): CodeIgniter\Router\Exceptions\RouterException::forInvalidControllerName('\\App\\Modules\\APIs\\Controllers\\EmailAPIController:cloneCampaign/$1')
 2 SYSTEMPATH/Router/Router.php(225): CodeIgniter\Router\Router->checkRoutes('API/Email/cloneCampaign/123')
 3 SYSTEMPATH/Commands/Utilities/Routes/FilterFinder.php(41): CodeIgniter\Router\Router->handle('API/Email/cloneCampaign/123')
 4 SYSTEMPATH/Commands/Utilities/Routes/FilterFinder.php(57): CodeIgniter\Commands\Utilities\Routes\FilterFinder->getRouteFilters('API/Email/cloneCampaign/123')
 5 SYSTEMPATH/Commands/Utilities/Routes/FilterCollector.php(78): CodeIgniter\Commands\Utilities\Routes\FilterFinder->find('API/Email/cloneCampaign/123')
 6 SYSTEMPATH/Commands/Utilities/Routes.php(110): CodeIgniter\Commands\Utilities\Routes\FilterCollector->get('GET', 'API/Email/cloneCampaign/123')
 7 SYSTEMPATH/CLI/Commands.php(74): CodeIgniter\Commands\Utilities\Routes->run([])
 8 SYSTEMPATH/CLI/Console.php(47): CodeIgniter\CLI\Commands->run('routes', [])
 9 SYSTEMPATH/Boot.php(442): CodeIgniter\CLI\Console->run()
10 SYSTEMPATH/Boot.php(166): CodeIgniter\Boot::runCommand(Object(CodeIgniter\CLI\Console))
11 ROOTPATH/spark(99): CodeIgniter\Boot::bootSpark(Object(Config\Paths))
CRITICAL - 2026-03-01 17:08:58 --> [EXCEPTION] The namespace delimiter is a backslash (\), not a slash (/). Route handler: "\App\Modules\APIs\Controllers\EmailAPIController:cloneCampaign/$1" File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/Router/Router.php Line=523
CRITICAL - 2026-03-01 17:09:11 --> ErrorException: Type of App\Modules\Management\Controllers\DevelopmentAdminController::$helpers must not be defined (as in class App\Controllers\BaseController)
[Method: CLI, Route: routes]
in APPPATH/Modules/Management/Controllers/DevelopmentAdminController.php on line 8.
 1 [internal function]: CodeIgniter\Debug\Exceptions->shutdownHandler()
CRITICAL - 2026-03-01 17:09:11 --> [EXCEPTION] Type of App\Modules\Management\Controllers\DevelopmentAdminController::$helpers must not be defined (as in class App\Controllers\BaseController) File=/home/mymiteam/mymiwallet/site/current/app/Modules/Management/Controllers/DevelopmentAdminController.php Line=8
CRITICAL - 2026-03-01 17:09:46 --> ErrorException: Type of App\Modules\Management\Controllers\DiscordAdminController::$walletService must be ?App\Services\WalletService (as in class App\Controllers\UserController)
[Method: CLI, Route: routes]
in APPPATH/Modules/Management/Controllers/DiscordAdminController.php on line 20.
 1 [internal function]: CodeIgniter\Debug\Exceptions->shutdownHandler()
CRITICAL - 2026-03-01 17:09:46 --> [EXCEPTION] Type of App\Modules\Management\Controllers\DiscordAdminController::$walletService must be ?App\Services\WalletService (as in class App\Controllers\UserController) File=/home/mymiteam/mymiwallet/site/current/app/Modules/Management/Controllers/DiscordAdminController.php Line=20
CRITICAL - 2026-03-01 17:10:07 --> ErrorException: Type of App\Modules\Management\Controllers\DiscordAdminController::$walletService must be ?App\Services\WalletService (as in class App\Controllers\UserController)
[Method: CLI, Route: routes]
in APPPATH/Modules/Management/Controllers/DiscordAdminController.php on line 20.
 1 [internal function]: CodeIgniter\Debug\Exceptions->shutdownHandler()
CRITICAL - 2026-03-01 17:10:07 --> [EXCEPTION] Type of App\Modules\Management\Controllers\DiscordAdminController::$walletService must be ?App\Services\WalletService (as in class App\Controllers\UserController) File=/home/mymiteam/mymiwallet/site/current/app/Modules/Management/Controllers/DiscordAdminController.php Line=20
CRITICAL - 2026-03-01 17:11:40 --> ErrorException: Type of App\Modules\Management\Controllers\FinanceAdminController::$helpers must not be defined (as in class App\Controllers\BaseController)
[Method: CLI, Route: routes]
in APPPATH/Modules/Management/Controllers/FinanceAdminController.php on line 8.
 1 [internal function]: CodeIgniter\Debug\Exceptions->shutdownHandler()
CRITICAL - 2026-03-01 17:11:40 --> [EXCEPTION] Type of App\Modules\Management\Controllers\FinanceAdminController::$helpers must not be defined (as in class App\Controllers\BaseController) File=/home/mymiteam/mymiwallet/site/current/app/Modules/Management/Controllers/FinanceAdminController.php Line=8
CRITICAL - 2026-03-01 17:12:41 --> ErrorException: Type of App\Modules\Management\Controllers\FinanceAdminController::$helpers must not be defined (as in class App\Controllers\BaseController)
[Method: CLI, Route: routes]
in APPPATH/Modules/Management/Controllers/FinanceAdminController.php on line 8.
 1 [internal function]: CodeIgniter\Debug\Exceptions->shutdownHandler()
CRITICAL - 2026-03-01 17:12:41 --> [EXCEPTION] Type of App\Modules\Management\Controllers\FinanceAdminController::$helpers must not be defined (as in class App\Controllers\BaseController) File=/home/mymiteam/mymiwallet/site/current/app/Modules/Management/Controllers/FinanceAdminController.php Line=8
CRITICAL - 2026-03-01 17:12:51 --> ErrorException: Type of App\Modules\Management\Controllers\HRAdminController::$helpers must not be defined (as in class App\Controllers\BaseController)
[Method: CLI, Route: routes]
in APPPATH/Modules/Management/Controllers/HRAdminController.php on line 8.
 1 [internal function]: CodeIgniter\Debug\Exceptions->shutdownHandler()
CRITICAL - 2026-03-01 17:12:51 --> [EXCEPTION] Type of App\Modules\Management\Controllers\HRAdminController::$helpers must not be defined (as in class App\Controllers\BaseController) File=/home/mymiteam/mymiwallet/site/current/app/Modules/Management/Controllers/HRAdminController.php Line=8
CRITICAL - 2026-03-01 17:13:38 --> ErrorException: Type of App\Modules\Management\Controllers\InvestmentsAdminController::$helpers must not be defined (as in class App\Controllers\BaseController)
[Method: CLI, Route: routes]
in APPPATH/Modules/Management/Controllers/InvestmentsAdminController.php on line 8.
 1 [internal function]: CodeIgniter\Debug\Exceptions->shutdownHandler()
CRITICAL - 2026-03-01 17:13:38 --> [EXCEPTION] Type of App\Modules\Management\Controllers\InvestmentsAdminController::$helpers must not be defined (as in class App\Controllers\BaseController) File=/home/mymiteam/mymiwallet/site/current/app/Modules/Management/Controllers/InvestmentsAdminController.php Line=8
INFO - 2026-03-01 17:15:02 --> [spark:ops:work] Started
INFO - 2026-03-01 17:15:02 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-03-01 17:15:02 --> [SPARK_MEMORY] 16777216
INFO - 2026-03-01 17:15:02 --> [spark:ops:work] Intent
DEBUG - 2026-03-01 17:15:02 --> [REQ_ID=cbe986eb95c5] [REQUEST][START] GET /index.php/API/Alerts/fetchEmailAlerts
INFO - 2026-03-01 17:15:02 --> [spark:ops:work] Completed
INFO - 2026-03-01 17:15:02 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.100575
INFO - 2026-03-01 17:15:02 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-03-01 17:15:02 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-01 17:15:02 --> [REQ_ID=cbe986eb95c5] [FILTER_BEFORE] /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-01 17:15:02 --> [REQ_ID=cbe986eb95c5] [ROUTE] Controller=\App\Modules\APIs\Controllers\AlertsAPIController Method=fetchEmailAlerts
DEBUG - 2026-03-01 17:15:02 --> [REQ_ID=cbe986eb95c5] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-01 17:15:02 --> [REQ_ID=cbe986eb95c5] [REQUEST][END]
INFO - 2026-03-01 17:15:02 --> [REQ_ID=cbe986eb95c5] [PERF] Execution time=0.077817
DEBUG - 2026-03-01 17:17:08 --> [REQ_ID=c6af650f6f6e] [REQUEST][START] GET /index.php/Getting-Started
DEBUG - 2026-03-01 17:17:08 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-01 17:17:08 --> [REQ_ID=c6af650f6f6e] [FILTER_BEFORE] /index.php/Getting-Started
DEBUG - 2026-03-01 17:17:08 --> [REQ_ID=c6af650f6f6e] [ROUTE] Controller=\App\Controllers\Home Method=gettingStarted
DEBUG - 2026-03-01 17:17:08 --> [REQ_ID=c6af650f6f6e] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Getting-Started
DEBUG - 2026-03-01 17:17:08 --> [CSRF] token name=csrf_test_name hash=9e14618499c3d07e50fbdc4dd7f73f0b
DEBUG - 2026-03-01 17:17:08 --> [REQ_ID=3aaf4a2e7178] [INIT] App\Controllers\Home::GET
INFO - 2026-03-01 17:17:08 --> [REQ_ID=3aaf4a2e7178] [MEMORY][controller-start] 6291456
INFO - 2026-03-01 17:17:08 --> [REQ_ID=3aaf4a2e7178] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-01 17:17:08 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-01 17:17:08 --> [MetaService] slug=getting-started pageName= cacheHit= path=DB
DEBUG - 2026-03-01 17:17:08 --> [REQ_ID=3aaf4a2e7178] [VIEW_RENDER] themes/public/gettingStarted
INFO - 2026-03-01 17:17:08 --> [REQ_ID=3aaf4a2e7178] [MEMORY][commonData:start] 10485760
INFO - 2026-03-01 17:17:08 --> themesMemory usage: 10485760
DEBUG - 2026-03-01 17:17:08 --> [MetaService] slug=getting-started pageName=Getting Started cacheHit= path=DB
DEBUG - 2026-03-01 17:17:08 --> [REQ_ID=c6af650f6f6e] [FILTER_AFTER]
DEBUG - 2026-03-01 17:17:08 --> [REQ_ID=c6af650f6f6e] [LIFECYCLE][END] status=200 duration_ms=679.40 memory_delta=4194304
INFO - 2026-03-01 17:17:08 --> [REQ_ID=3aaf4a2e7178] [PERF] Execution time=0.677066
DEBUG - 2026-03-01 17:17:08 --> [REQ_ID=c6af650f6f6e] [REQUEST][END]
INFO - 2026-03-01 17:17:08 --> [REQ_ID=c6af650f6f6e] [PERF] Execution time=0.757748
INFO - 2026-03-01 17:30:01 --> [spark:ops:work] Started
INFO - 2026-03-01 17:30:01 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-03-01 17:30:01 --> [SPARK_MEMORY] 16777216
INFO - 2026-03-01 17:30:01 --> [spark:ops:work] Intent
INFO - 2026-03-01 17:30:01 --> [spark:ops:work] Completed
INFO - 2026-03-01 17:30:01 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.023363
INFO - 2026-03-01 17:30:01 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-03-01 17:30:28 --> [REQ_ID=7d3047e8e9e6] [REQUEST][START] GET /index.php/How-It-Works/Registering-An-Account
DEBUG - 2026-03-01 17:30:28 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-01 17:30:28 --> [REQ_ID=7d3047e8e9e6] [FILTER_BEFORE] /index.php/How-It-Works/Registering-An-Account
DEBUG - 2026-03-01 17:30:28 --> [REQ_ID=7d3047e8e9e6] [ROUTE] Controller=\App\Modules\Blog\Controllers\HowItWorksController Method=show
DEBUG - 2026-03-01 17:30:28 --> [REQ_ID=7d3047e8e9e6] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/How-It-Works/Registering-An-Account
DEBUG - 2026-03-01 17:30:28 --> [CSRF] token name=csrf_test_name hash=e7468c501ae2bac903670a851d103bfb
DEBUG - 2026-03-01 17:30:28 --> [REQ_ID=28ef5e0e4af1] [INIT] App\Modules\Blog\Controllers\HowItWorksController::GET
INFO - 2026-03-01 17:30:28 --> [REQ_ID=28ef5e0e4af1] [MEMORY][controller-start] 6291456
DEBUG - 2026-03-01 17:30:28 --> [REQ_ID=28ef5e0e4af1] [METHOD_ENTRY] show
DEBUG - 2026-03-01 17:30:28 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-01 17:30:28 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-01 17:30:28 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-01 17:30:28 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-01 17:30:28 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-01 17:30:28 --> MyMICoin: guest context detected; skipping user-specific preload.
INFO - 2026-03-01 17:30:28 --> [REQ_ID=28ef5e0e4af1] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-01 17:30:29 --> [REQ_ID=28ef5e0e4af1] [VIEW_RENDER] App\Modules\Blog\Views\HowItWorks\Registering_An_Account
INFO - 2026-03-01 17:30:29 --> [REQ_ID=28ef5e0e4af1] [MEMORY][commonData:start] 10485760
INFO - 2026-03-01 17:30:29 --> themesMemory usage: 14680064
DEBUG - 2026-03-01 17:30:29 --> [REQ_ID=7d3047e8e9e6] [FILTER_AFTER]
DEBUG - 2026-03-01 17:30:29 --> [REQ_ID=7d3047e8e9e6] [LIFECYCLE][END] status=200 duration_ms=1,278.75 memory_delta=8388608
INFO - 2026-03-01 17:30:29 --> [REQ_ID=28ef5e0e4af1] [PERF] Execution time=1.276272
DEBUG - 2026-03-01 17:30:29 --> [REQ_ID=7d3047e8e9e6] [REQUEST][END]
INFO - 2026-03-01 17:30:29 --> [REQ_ID=7d3047e8e9e6] [PERF] Execution time=1.320511
INFO - 2026-03-01 17:45:01 --> [spark:ops:work] Started
INFO - 2026-03-01 17:45:01 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-03-01 17:45:01 --> [SPARK_MEMORY] 16777216
INFO - 2026-03-01 17:45:01 --> [spark:ops:work] Intent
INFO - 2026-03-01 17:45:01 --> [spark:ops:work] Completed
INFO - 2026-03-01 17:45:01 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.041515
INFO - 2026-03-01 17:45:01 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-03-01 17:54:33 --> [REQ_ID=061d11f19049] [REQUEST][START] GET /
DEBUG - 2026-03-01 17:54:33 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-01 17:54:33 --> [REQ_ID=061d11f19049] [FILTER_BEFORE] /
DEBUG - 2026-03-01 17:54:33 --> [REQ_ID=061d11f19049] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-01 17:54:33 --> [REQ_ID=061d11f19049] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-01 17:54:33 --> [CSRF] token name=csrf_test_name hash=49c31cc22000267f5124e685dac61a77
DEBUG - 2026-03-01 17:54:33 --> [REQ_ID=e6a9ec4d1a25] [INIT] App\Controllers\Home::GET
INFO - 2026-03-01 17:54:33 --> [REQ_ID=e6a9ec4d1a25] [MEMORY][controller-start] 6291456
INFO - 2026-03-01 17:54:34 --> [REQ_ID=e6a9ec4d1a25] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-01 17:54:34 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-01 17:54:34 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-03-01 17:54:34 --> [REQ_ID=e6a9ec4d1a25] [VIEW_RENDER] themes/public/home
INFO - 2026-03-01 17:54:34 --> [REQ_ID=e6a9ec4d1a25] [MEMORY][commonData:start] 10485760
INFO - 2026-03-01 17:54:34 --> themesMemory usage: 10485760
DEBUG - 2026-03-01 17:54:34 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-01 17:54:34 --> [REQ_ID=061d11f19049] [FILTER_AFTER]
DEBUG - 2026-03-01 17:54:34 --> [REQ_ID=061d11f19049] [LIFECYCLE][END] status=200 duration_ms=628.87 memory_delta=4194304
INFO - 2026-03-01 17:54:34 --> [REQ_ID=e6a9ec4d1a25] [PERF] Execution time=0.625447
DEBUG - 2026-03-01 17:54:34 --> [REQ_ID=061d11f19049] [REQUEST][END]
INFO - 2026-03-01 17:54:34 --> [REQ_ID=061d11f19049] [PERF] Execution time=0.690710
DEBUG - 2026-03-01 17:54:34 --> [REQ_ID=b229f0a05caf] [REQUEST][START] GET /index.php/How-It-Works/Investment-Dashboard
DEBUG - 2026-03-01 17:54:34 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-01 17:54:34 --> [REQ_ID=b229f0a05caf] [FILTER_BEFORE] /index.php/How-It-Works/Investment-Dashboard
DEBUG - 2026-03-01 17:54:34 --> [REQ_ID=b229f0a05caf] [ROUTE] Controller=\App\Modules\Blog\Controllers\HowItWorksController Method=show
DEBUG - 2026-03-01 17:54:34 --> [REQ_ID=b229f0a05caf] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/How-It-Works/Investment-Dashboard
DEBUG - 2026-03-01 17:54:34 --> [CSRF] token name=csrf_test_name hash=49c31cc22000267f5124e685dac61a77
DEBUG - 2026-03-01 17:54:34 --> [REQ_ID=84661c4a1ad5] [INIT] App\Modules\Blog\Controllers\HowItWorksController::GET
INFO - 2026-03-01 17:54:34 --> [REQ_ID=84661c4a1ad5] [MEMORY][controller-start] 6291456
DEBUG - 2026-03-01 17:54:34 --> [REQ_ID=84661c4a1ad5] [METHOD_ENTRY] show
DEBUG - 2026-03-01 17:54:34 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-01 17:54:34 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-01 17:54:34 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-01 17:54:34 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-01 17:54:34 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-01 17:54:34 --> MyMICoin: guest context detected; skipping user-specific preload.
INFO - 2026-03-01 17:54:34 --> [REQ_ID=84661c4a1ad5] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-01 17:54:35 --> [REQ_ID=84661c4a1ad5] [VIEW_RENDER] App\Modules\Blog\Views\HowItWorks\Investment_Portfolio_Management
INFO - 2026-03-01 17:54:35 --> [REQ_ID=84661c4a1ad5] [MEMORY][commonData:start] 8388608
INFO - 2026-03-01 17:54:35 --> themesMemory usage: 12582912
DEBUG - 2026-03-01 17:54:35 --> [REQ_ID=b229f0a05caf] [FILTER_AFTER]
DEBUG - 2026-03-01 17:54:35 --> [REQ_ID=b229f0a05caf] [LIFECYCLE][END] status=200 duration_ms=1,008.75 memory_delta=6291456
INFO - 2026-03-01 17:54:35 --> [REQ_ID=84661c4a1ad5] [PERF] Execution time=1.007987
DEBUG - 2026-03-01 17:54:35 --> [REQ_ID=b229f0a05caf] [REQUEST][END]
INFO - 2026-03-01 17:54:35 --> [REQ_ID=b229f0a05caf] [PERF] Execution time=1.025061
DEBUG - 2026-03-01 17:54:36 --> [REQ_ID=8794908c8f5b] [REQUEST][START] POST /index.php/register
DEBUG - 2026-03-01 17:54:36 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-01 17:54:36 --> [REQ_ID=8794908c8f5b] [FILTER_BEFORE] /index.php/register
DEBUG - 2026-03-01 17:54:36 --> [REQ_ID=8794908c8f5b] [ROUTE] Controller=\App\Controllers\AuthController Method=attemptRegister
DEBUG - 2026-03-01 17:54:36 --> [REQ_ID=8794908c8f5b] [LIFECYCLE][START] POST https://www.mymiwallet.com/index.php/register
DEBUG - 2026-03-01 17:54:36 --> [CSRF] token name=csrf_test_name hash=49c31cc22000267f5124e685dac61a77
INFO - 2026-03-01 17:54:36 --> CSRF token verified.
DEBUG - 2026-03-01 17:54:36 --> [REQ_ID=f605bf676699] [INIT] App\Controllers\AuthController::POST
INFO - 2026-03-01 17:54:36 --> [REQ_ID=f605bf676699] [MEMORY][controller-start] 8388608
INFO - 2026-03-01 17:54:36 --> [REGISTRATION] Submission received
INFO - 2026-03-01 17:54:36 --> MailService queued email
ERROR - 2026-03-01 17:54:36 --> Registration failed: {"username":"The username field is not in the correct format.","email":"The email field must contain a unique value."}
INFO - 2026-03-01 17:54:36 --> MailService queued email
WARNING - 2026-03-01 17:54:36 --> [REGISTRATION] Validation failed (basic fields)
DEBUG - 2026-03-01 17:54:36 --> [REQ_ID=8794908c8f5b] [FILTER_AFTER]
DEBUG - 2026-03-01 17:54:36 --> [REQ_ID=8794908c8f5b] [LIFECYCLE][END] status=302 duration_ms=126.73 memory_delta=0
INFO - 2026-03-01 17:54:36 --> [REQ_ID=f605bf676699] [PERF] Execution time=0.125466
DEBUG - 2026-03-01 17:54:36 --> [REQ_ID=8794908c8f5b] [REQUEST][END]
INFO - 2026-03-01 17:54:36 --> [REQ_ID=8794908c8f5b] [PERF] Execution time=0.142236
DEBUG - 2026-03-01 17:54:36 --> [REQ_ID=cb2b7901d28a] [REQUEST][START] GET /index.php/How-It-Works/Investment-Dashboard
DEBUG - 2026-03-01 17:54:36 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-01 17:54:36 --> [REQ_ID=cb2b7901d28a] [FILTER_BEFORE] /index.php/How-It-Works/Investment-Dashboard
DEBUG - 2026-03-01 17:54:36 --> [REQ_ID=cb2b7901d28a] [ROUTE] Controller=\App\Modules\Blog\Controllers\HowItWorksController Method=show
DEBUG - 2026-03-01 17:54:36 --> [REQ_ID=cb2b7901d28a] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/How-It-Works/Investment-Dashboard
DEBUG - 2026-03-01 17:54:36 --> [CSRF] token name=csrf_test_name hash=49c31cc22000267f5124e685dac61a77
DEBUG - 2026-03-01 17:54:36 --> [REQ_ID=38f275057c43] [INIT] App\Modules\Blog\Controllers\HowItWorksController::GET
INFO - 2026-03-01 17:54:36 --> [REQ_ID=38f275057c43] [MEMORY][controller-start] 6291456
DEBUG - 2026-03-01 17:54:36 --> [REQ_ID=38f275057c43] [METHOD_ENTRY] show
DEBUG - 2026-03-01 17:54:36 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-01 17:54:36 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-01 17:54:36 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-01 17:54:36 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-01 17:54:36 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-01 17:54:36 --> MyMICoin: guest context detected; skipping user-specific preload.
INFO - 2026-03-01 17:54:36 --> [REQ_ID=38f275057c43] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-01 17:54:37 --> [REQ_ID=38f275057c43] [VIEW_RENDER] App\Modules\Blog\Views\HowItWorks\Investment_Portfolio_Management
INFO - 2026-03-01 17:54:37 --> [REQ_ID=38f275057c43] [MEMORY][commonData:start] 8388608
INFO - 2026-03-01 17:54:37 --> themesMemory usage: 12582912
DEBUG - 2026-03-01 17:54:37 --> [REQ_ID=cb2b7901d28a] [FILTER_AFTER]
DEBUG - 2026-03-01 17:54:37 --> [REQ_ID=cb2b7901d28a] [LIFECYCLE][END] status=200 duration_ms=1,051.55 memory_delta=6291456
INFO - 2026-03-01 17:54:37 --> [REQ_ID=38f275057c43] [PERF] Execution time=1.051344
DEBUG - 2026-03-01 17:54:37 --> [REQ_ID=cb2b7901d28a] [REQUEST][END]
INFO - 2026-03-01 17:54:37 --> [REQ_ID=cb2b7901d28a] [PERF] Execution time=1.060818
DEBUG - 2026-03-01 17:54:38 --> [REQ_ID=96e78d9efc48] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-01 17:54:38 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-01 17:54:38 --> [REQ_ID=96e78d9efc48] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-01 17:54:38 --> [REQ_ID=96e78d9efc48] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-01 17:54:38 --> [REQ_ID=96e78d9efc48] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-01 17:54:38 --> [CSRF] token name=csrf_test_name hash=49c31cc22000267f5124e685dac61a77
DEBUG - 2026-03-01 17:54:38 --> [REQ_ID=80910796a434] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-01 17:54:38 --> [REQ_ID=80910796a434] [MEMORY][controller-start] 8388608
DEBUG - 2026-03-01 17:54:38 --> [REQ_ID=96e78d9efc48] [FILTER_AFTER]
DEBUG - 2026-03-01 17:54:38 --> [REQ_ID=96e78d9efc48] [LIFECYCLE][END] status=200 duration_ms=17.49 memory_delta=0
INFO - 2026-03-01 17:54:38 --> [REQ_ID=80910796a434] [PERF] Execution time=0.017238
DEBUG - 2026-03-01 17:54:38 --> [REQ_ID=96e78d9efc48] [REQUEST][END]
INFO - 2026-03-01 17:54:38 --> [REQ_ID=96e78d9efc48] [PERF] Execution time=0.026302
DEBUG - 2026-03-01 17:54:38 --> [REQ_ID=f7ca97b97a75] [REQUEST][START] POST /index.php/login
DEBUG - 2026-03-01 17:54:38 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-01 17:54:38 --> [REQ_ID=f7ca97b97a75] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-01 17:54:38 --> [REQ_ID=f7ca97b97a75] [ROUTE] Controller=\App\Controllers\AuthController Method=attemptLogin
DEBUG - 2026-03-01 17:54:38 --> [REQ_ID=f7ca97b97a75] [LIFECYCLE][START] POST https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-01 17:54:38 --> [CSRF] token name=csrf_test_name hash=49c31cc22000267f5124e685dac61a77
INFO - 2026-03-01 17:54:38 --> CSRF token verified.
DEBUG - 2026-03-01 17:54:38 --> [REQ_ID=0eac2f053fa0] [INIT] App\Controllers\AuthController::POST
INFO - 2026-03-01 17:54:38 --> [REQ_ID=0eac2f053fa0] [MEMORY][controller-start] 6291456
INFO - 2026-03-01 17:54:38 --> AuthController L93: Auth:attemptLogin started.
INFO - 2026-03-01 17:54:38 --> AuthController L104: Auth:attemptLogin rules: {"login":"required","password":"required"}
INFO - 2026-03-01 17:54:38 --> AuthController L132: Auth:attemptLogin Login Variables: login: required, remember: false, ip: 77.93.154.236, ua: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.0.0 Safari/537.36 Herring/95.1.8810.11
DEBUG - 2026-03-01 17:54:38 --> Auth attemptLogin() called with login identifier: #gsduerisrnz, remember: false
DEBUG - 2026-03-01 17:54:38 --> Auth attemptLogin() called. redirect_url in session: https://www.mymiwallet.com/index.php/How-It-Works/Investment-Dashboard
DEBUG - 2026-03-01 17:54:38 --> Auth credentials normalised for attempt using key "username"
WARNING - 2026-03-01 17:54:38 --> [AUTH_FAILURE] 
DEBUG - 2026-03-01 17:54:38 --> Auth attempt failed for identifier #gsduerisrnz. Error: Unable to log you in. Please check your credentials.
WARNING - 2026-03-01 17:54:38 --> [AUTH] Login failure
WARNING - 2026-03-01 17:54:38 --> [AUTH] Login failed
DEBUG - 2026-03-01 17:54:38 --> [REQ_ID=f7ca97b97a75] [FILTER_AFTER]
DEBUG - 2026-03-01 17:54:38 --> [REQ_ID=f7ca97b97a75] [LIFECYCLE][END] status=302 duration_ms=33.90 memory_delta=0
INFO - 2026-03-01 17:54:38 --> [REQ_ID=0eac2f053fa0] [PERF] Execution time=0.033464
DEBUG - 2026-03-01 17:54:38 --> [REQ_ID=f7ca97b97a75] [REQUEST][END]
INFO - 2026-03-01 17:54:38 --> [REQ_ID=f7ca97b97a75] [PERF] Execution time=0.045000
DEBUG - 2026-03-01 17:54:38 --> [REQ_ID=a118bf38df71] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-01 17:54:38 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-01 17:54:38 --> [REQ_ID=a118bf38df71] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-01 17:54:38 --> [REQ_ID=a118bf38df71] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-01 17:54:38 --> [REQ_ID=a118bf38df71] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-01 17:54:38 --> [CSRF] token name=csrf_test_name hash=49c31cc22000267f5124e685dac61a77
DEBUG - 2026-03-01 17:54:38 --> [REQ_ID=94b63701d12e] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-01 17:54:38 --> [REQ_ID=94b63701d12e] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-01 17:54:38 --> [REQ_ID=a118bf38df71] [FILTER_AFTER]
DEBUG - 2026-03-01 17:54:38 --> [REQ_ID=a118bf38df71] [LIFECYCLE][END] status=200 duration_ms=15.21 memory_delta=0
INFO - 2026-03-01 17:54:38 --> [REQ_ID=94b63701d12e] [PERF] Execution time=0.015123
DEBUG - 2026-03-01 17:54:38 --> [REQ_ID=a118bf38df71] [REQUEST][END]
INFO - 2026-03-01 17:54:38 --> [REQ_ID=a118bf38df71] [PERF] Execution time=0.024066
DEBUG - 2026-03-01 17:58:04 --> [REQ_ID=80671fbd-6ea4-4ffd-a233-6a1e5de4fb11] [REQUEST][START] GET /
DEBUG - 2026-03-01 17:58:04 --> [REQ_ID=b513b478-560c-4c70-a69b-3982650fa142] [REQUEST][START] GET /
DEBUG - 2026-03-01 17:58:04 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-01 17:58:04 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-01 17:58:04 --> [REQ_ID=80671fbd-6ea4-4ffd-a233-6a1e5de4fb11] [FILTER_BEFORE] /
DEBUG - 2026-03-01 17:58:04 --> [REQ_ID=80671fbd-6ea4-4ffd-a233-6a1e5de4fb11] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-01 17:58:04 --> [REQ_ID=80671fbd-6ea4-4ffd-a233-6a1e5de4fb11] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-01 17:58:04 --> [REQ_ID=b513b478-560c-4c70-a69b-3982650fa142] [FILTER_BEFORE] /
DEBUG - 2026-03-01 17:58:04 --> [REQ_ID=b513b478-560c-4c70-a69b-3982650fa142] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-01 17:58:04 --> [REQ_ID=b513b478-560c-4c70-a69b-3982650fa142] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-01 17:58:04 --> [CSRF] token name=csrf_test_name hash=94b8b995c6ac32d139785554a47625bc
DEBUG - 2026-03-01 17:58:04 --> [REQ_ID=f5bb04753efc] [INIT] App\Controllers\Home::GET
INFO - 2026-03-01 17:58:04 --> [REQ_ID=f5bb04753efc] [MEMORY][controller-start] 6291456
DEBUG - 2026-03-01 17:58:04 --> [CSRF] token name=csrf_test_name hash=9b2b8f155cf5fccfd469ec2bf67ac181
DEBUG - 2026-03-01 17:58:04 --> [REQ_ID=394c191b47eb] [INIT] App\Controllers\Home::GET
INFO - 2026-03-01 17:58:04 --> [REQ_ID=394c191b47eb] [MEMORY][controller-start] 6291456
INFO - 2026-03-01 17:58:04 --> [REQ_ID=f5bb04753efc] [MEMORY][commonData:start] 6291456
INFO - 2026-03-01 17:58:04 --> [REQ_ID=394c191b47eb] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-01 17:58:04 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-01 17:58:04 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-01 17:58:05 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
DEBUG - 2026-03-01 17:58:05 --> [REQ_ID=f5bb04753efc] [VIEW_RENDER] themes/public/home
INFO - 2026-03-01 17:58:05 --> [REQ_ID=f5bb04753efc] [MEMORY][commonData:start] 10485760
INFO - 2026-03-01 17:58:05 --> themesMemory usage: 10485760
DEBUG - 2026-03-01 17:58:05 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-01 17:58:05 --> [REQ_ID=80671fbd-6ea4-4ffd-a233-6a1e5de4fb11] [FILTER_AFTER]
DEBUG - 2026-03-01 17:58:05 --> [REQ_ID=80671fbd-6ea4-4ffd-a233-6a1e5de4fb11] [LIFECYCLE][END] status=200 duration_ms=613.17 memory_delta=4194304
INFO - 2026-03-01 17:58:05 --> [REQ_ID=f5bb04753efc] [PERF] Execution time=0.608309
DEBUG - 2026-03-01 17:58:05 --> [REQ_ID=80671fbd-6ea4-4ffd-a233-6a1e5de4fb11] [REQUEST][END]
INFO - 2026-03-01 17:58:05 --> [REQ_ID=80671fbd-6ea4-4ffd-a233-6a1e5de4fb11] [PERF] Execution time=0.666785
DEBUG - 2026-03-01 17:58:05 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
DEBUG - 2026-03-01 17:58:05 --> [REQ_ID=394c191b47eb] [VIEW_RENDER] themes/public/home
INFO - 2026-03-01 17:58:05 --> [REQ_ID=394c191b47eb] [MEMORY][commonData:start] 10485760
INFO - 2026-03-01 17:58:05 --> themesMemory usage: 10485760
DEBUG - 2026-03-01 17:58:05 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-01 17:58:05 --> [REQ_ID=b513b478-560c-4c70-a69b-3982650fa142] [FILTER_AFTER]
DEBUG - 2026-03-01 17:58:05 --> [REQ_ID=b513b478-560c-4c70-a69b-3982650fa142] [LIFECYCLE][END] status=200 duration_ms=644.81 memory_delta=4194304
INFO - 2026-03-01 17:58:05 --> [REQ_ID=394c191b47eb] [PERF] Execution time=0.640291
DEBUG - 2026-03-01 17:58:05 --> [REQ_ID=b513b478-560c-4c70-a69b-3982650fa142] [REQUEST][END]
INFO - 2026-03-01 17:58:05 --> [REQ_ID=b513b478-560c-4c70-a69b-3982650fa142] [PERF] Execution time=0.696896
DEBUG - 2026-03-01 18:00:02 --> [REQ_ID=9f015f5228f1] [REQUEST][START] GET /index.php/API/Management/Run-CRON-Tasks
INFO - 2026-03-01 18:00:02 --> [SPARK_START] App\Commands\AIOps\Run
INFO - 2026-03-01 18:00:02 --> [SPARK_MEMORY] 16777216
DEBUG - 2026-03-01 18:00:02 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
INFO - 2026-03-01 18:00:02 --> [spark:ops:work] Started
INFO - 2026-03-01 18:00:02 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-03-01 18:00:02 --> [spark:aiops:run] Intent
INFO - 2026-03-01 18:00:02 --> [SPARK_MEMORY] 16777216
INFO - 2026-03-01 18:00:02 --> [spark:ops:work] Intent
INFO - 2026-03-01 18:00:02 --> [spark:ops:work] Completed
INFO - 2026-03-01 18:00:02 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.027596
INFO - 2026-03-01 18:00:02 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-03-01 18:00:02 --> [REQ_ID=9f015f5228f1] [FILTER_BEFORE] /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-01 18:00:02 --> [REQ_ID=9f015f5228f1] [ROUTE] Controller=\App\Modules\Management\Controllers\ManagementAPIController Method=Run_CRON_Tasks
DEBUG - 2026-03-01 18:00:02 --> [REQ_ID=9f015f5228f1] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-01 18:00:02 --> [REQ_ID=9f015f5228f1] [REQUEST][END]
INFO - 2026-03-01 18:00:02 --> [REQ_ID=9f015f5228f1] [PERF] Execution time=0.125150
INFO - 2026-03-01 18:00:03 --> [AIOPS][SPARK][GOVERNANCE][spark:logs:summarize] Started
INFO - 2026-03-01 18:00:03 --> [SPARK_START] App\Commands\Logs\Summarize
INFO - 2026-03-01 18:00:03 --> [SPARK_MEMORY] 16777216
INFO - 2026-03-01 18:00:03 --> [spark:logs:summarize] Intent
INFO - 2026-03-01 18:00:03 --> [AIOPS][SPARK][GOVERNANCE][spark:logs:summarize] Completed
INFO - 2026-03-01 18:00:03 --> [SPARK_COMPLETE] App\Commands\Logs\Summarize duration=0.031748
INFO - 2026-03-01 18:00:03 --> [SPARK_MEMORY] 18874368
INFO - 2026-03-01 18:00:04 --> [spark:app:healthcheck] Started
INFO - 2026-03-01 18:00:04 --> [SPARK_START] App\Commands\App\Healthcheck
INFO - 2026-03-01 18:00:04 --> [SPARK_MEMORY] 16777216
INFO - 2026-03-01 18:00:04 --> [spark:app:healthcheck] Intent
DEBUG - 2026-03-01 18:00:04 --> LOG_HEALTHCHECK debug marker=74f84661c5a5
INFO - 2026-03-01 18:00:04 --> LOG_HEALTHCHECK info marker=74f84661c5a5
NOTICE - 2026-03-01 18:00:04 --> LOG_HEALTHCHECK probe marker=74f84661c5a5
INFO - 2026-03-01 18:00:04 --> [spark:app:healthcheck] Completed
INFO - 2026-03-01 18:00:04 --> [SPARK_COMPLETE] App\Commands\App\Healthcheck duration=0.153938
INFO - 2026-03-01 18:00:04 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-03-01 18:00:06 --> OllamaPatchRunner:L142 - validateGeneratedPatch Content: 
WARNING - 2026-03-01 18:00:06 --> OllamaPatchRunner:L49 - Original Diff: 
DEBUG - 2026-03-01 18:00:06 --> OllamaPatchRunner:L51 - Retried Diff: 
DEBUG - 2026-03-01 18:00:06 --> OllamaPatchRunner:L142 - validateGeneratedPatch Content: 
DEBUG - 2026-03-01 18:00:06 --> OllamaPatchRunner:L53 - Validating Generated Patch Failed
INFO - 2026-03-01 18:00:06 --> [SPARK_COMPLETE] App\Commands\AIOps\Run duration=4.519210
INFO - 2026-03-01 18:00:06 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-03-01 18:06:22 --> [REQ_ID=ad940835dde9] [REQUEST][START] HEAD /
DEBUG - 2026-03-01 18:06:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-01 18:06:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-01 18:06:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-01 18:06:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-01 18:06:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-01 18:11:22 --> [REQ_ID=ce0277160619] [REQUEST][START] HEAD /
DEBUG - 2026-03-01 18:11:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-01 18:11:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-01 18:11:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-01 18:11:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-01 18:11:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
INFO - 2026-03-01 18:15:01 --> [spark:ops:work] Started
INFO - 2026-03-01 18:15:01 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-03-01 18:15:01 --> [SPARK_MEMORY] 16777216
INFO - 2026-03-01 18:15:01 --> [spark:ops:work] Intent
INFO - 2026-03-01 18:15:01 --> [spark:ops:work] Completed
INFO - 2026-03-01 18:15:01 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.053510
INFO - 2026-03-01 18:15:01 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-03-01 18:15:01 --> [REQ_ID=dd3daeb011ab] [REQUEST][START] GET /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-01 18:15:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-01 18:15:01 --> [REQ_ID=dd3daeb011ab] [FILTER_BEFORE] /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-01 18:15:01 --> [REQ_ID=dd3daeb011ab] [ROUTE] Controller=\App\Modules\APIs\Controllers\AlertsAPIController Method=fetchEmailAlerts
DEBUG - 2026-03-01 18:15:01 --> [REQ_ID=dd3daeb011ab] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-01 18:15:01 --> [REQ_ID=dd3daeb011ab] [REQUEST][END]
INFO - 2026-03-01 18:15:01 --> [REQ_ID=dd3daeb011ab] [PERF] Execution time=0.049784
DEBUG - 2026-03-01 18:16:22 --> [REQ_ID=4dee7c5d11b7] [REQUEST][START] HEAD /
DEBUG - 2026-03-01 18:16:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-01 18:16:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-01 18:16:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-01 18:16:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-01 18:16:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-01 18:18:54 --> [REQ_ID=f15bcdb8559a] [REQUEST][START] GET /
DEBUG - 2026-03-01 18:18:54 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-01 18:18:54 --> [REQ_ID=f15bcdb8559a] [FILTER_BEFORE] /
DEBUG - 2026-03-01 18:18:54 --> [REQ_ID=f15bcdb8559a] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-01 18:18:54 --> [REQ_ID=f15bcdb8559a] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-01 18:18:54 --> [CSRF] token name=csrf_test_name hash=0471c65d8d28ce4e338d1ad85ddae3ab
DEBUG - 2026-03-01 18:18:54 --> [REQ_ID=e155ee41a1d6] [INIT] App\Controllers\Home::GET
INFO - 2026-03-01 18:18:54 --> [REQ_ID=e155ee41a1d6] [MEMORY][controller-start] 6291456
INFO - 2026-03-01 18:18:54 --> [REQ_ID=e155ee41a1d6] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-01 18:18:54 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-01 18:18:55 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-03-01 18:18:55 --> [REQ_ID=e155ee41a1d6] [VIEW_RENDER] themes/public/home
INFO - 2026-03-01 18:18:55 --> [REQ_ID=e155ee41a1d6] [MEMORY][commonData:start] 10485760
INFO - 2026-03-01 18:18:55 --> themesMemory usage: 10485760
DEBUG - 2026-03-01 18:18:55 --> [MetaService] slug= pageName=Home cacheHit= path=DB
DEBUG - 2026-03-01 18:18:55 --> [REQ_ID=f15bcdb8559a] [FILTER_AFTER]
DEBUG - 2026-03-01 18:18:55 --> [REQ_ID=f15bcdb8559a] [LIFECYCLE][END] status=200 duration_ms=626.23 memory_delta=4194304
INFO - 2026-03-01 18:18:55 --> [REQ_ID=e155ee41a1d6] [PERF] Execution time=0.624110
DEBUG - 2026-03-01 18:18:55 --> [REQ_ID=f15bcdb8559a] [REQUEST][END]
INFO - 2026-03-01 18:18:55 --> [REQ_ID=f15bcdb8559a] [PERF] Execution time=0.673849
DEBUG - 2026-03-01 18:21:22 --> [REQ_ID=d22d78d1e2b0] [REQUEST][START] HEAD /
DEBUG - 2026-03-01 18:21:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-01 18:21:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-01 18:21:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-01 18:21:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-01 18:21:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-01 18:26:22 --> [REQ_ID=cb0d95c6b1b0] [REQUEST][START] HEAD /
DEBUG - 2026-03-01 18:26:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-01 18:26:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-01 18:26:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-01 18:26:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-01 18:26:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
INFO - 2026-03-01 18:30:02 --> [spark:ops:work] Started
INFO - 2026-03-01 18:30:02 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-03-01 18:30:02 --> [SPARK_MEMORY] 16777216
INFO - 2026-03-01 18:30:02 --> [spark:ops:work] Intent
INFO - 2026-03-01 18:30:02 --> [spark:ops:work] Completed
INFO - 2026-03-01 18:30:02 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.108874
INFO - 2026-03-01 18:30:02 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-03-01 18:31:22 --> [REQ_ID=860d38f3df46] [REQUEST][START] HEAD /
DEBUG - 2026-03-01 18:31:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-01 18:31:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-01 18:31:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-01 18:31:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-01 18:31:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-01 18:36:22 --> [REQ_ID=06501fd06620] [REQUEST][START] HEAD /
DEBUG - 2026-03-01 18:36:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-01 18:36:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-01 18:36:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-01 18:36:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-01 18:36:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-01 18:41:22 --> [REQ_ID=0509548d0994] [REQUEST][START] HEAD /
DEBUG - 2026-03-01 18:41:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-01 18:41:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-01 18:41:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-01 18:41:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-01 18:41:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-01 18:43:20 --> [REQ_ID=0da106c9d85a] [REQUEST][START] GET /
DEBUG - 2026-03-01 18:43:20 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-01 18:43:20 --> [REQ_ID=0da106c9d85a] [FILTER_BEFORE] /
DEBUG - 2026-03-01 18:43:20 --> [REQ_ID=0da106c9d85a] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-01 18:43:20 --> [REQ_ID=0da106c9d85a] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-01 18:43:20 --> [CSRF] token name=csrf_test_name hash=9e1ba5ff413d7c43afd29b3db9bdac9f
DEBUG - 2026-03-01 18:43:20 --> [REQ_ID=6d2d115039a9] [INIT] App\Controllers\Home::GET
INFO - 2026-03-01 18:43:20 --> [REQ_ID=6d2d115039a9] [MEMORY][controller-start] 6291456
INFO - 2026-03-01 18:43:21 --> [REQ_ID=6d2d115039a9] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-01 18:43:21 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-01 18:43:21 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-03-01 18:43:21 --> [REQ_ID=6d2d115039a9] [VIEW_RENDER] themes/public/home
INFO - 2026-03-01 18:43:21 --> [REQ_ID=6d2d115039a9] [MEMORY][commonData:start] 10485760
INFO - 2026-03-01 18:43:21 --> themesMemory usage: 10485760
DEBUG - 2026-03-01 18:43:21 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-01 18:43:21 --> [REQ_ID=0da106c9d85a] [FILTER_AFTER]
DEBUG - 2026-03-01 18:43:21 --> [REQ_ID=0da106c9d85a] [LIFECYCLE][END] status=200 duration_ms=620.20 memory_delta=4194304
INFO - 2026-03-01 18:43:21 --> [REQ_ID=6d2d115039a9] [PERF] Execution time=0.617901
DEBUG - 2026-03-01 18:43:21 --> [REQ_ID=0da106c9d85a] [REQUEST][END]
INFO - 2026-03-01 18:43:21 --> [REQ_ID=0da106c9d85a] [PERF] Execution time=0.658888
INFO - 2026-03-01 18:45:01 --> [spark:ops:work] Started
INFO - 2026-03-01 18:45:01 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-03-01 18:45:01 --> [SPARK_MEMORY] 16777216
INFO - 2026-03-01 18:45:01 --> [spark:ops:work] Intent
INFO - 2026-03-01 18:45:01 --> [spark:ops:work] Completed
INFO - 2026-03-01 18:45:01 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.188457
INFO - 2026-03-01 18:45:01 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-03-01 18:46:22 --> [REQ_ID=5ce912f4ca2f] [REQUEST][START] HEAD /
DEBUG - 2026-03-01 18:46:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-01 18:46:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-01 18:46:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-01 18:46:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-01 18:46:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-01 18:51:22 --> [REQ_ID=2ccac6675008] [REQUEST][START] HEAD /
DEBUG - 2026-03-01 18:51:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-01 18:51:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-01 18:51:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-01 18:51:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-01 18:51:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-01 18:52:06 --> [REQ_ID=040571ee778a] [REQUEST][START] GET /index.php/Legal/Privacy-Policy
DEBUG - 2026-03-01 18:52:06 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-01 18:52:06 --> [REQ_ID=040571ee778a] [FILTER_BEFORE] /index.php/Legal/Privacy-Policy
DEBUG - 2026-03-01 18:52:06 --> [REQ_ID=040571ee778a] [ROUTE] Controller=\App\Controllers\Home Method=privacyPolicy
DEBUG - 2026-03-01 18:52:06 --> [REQ_ID=040571ee778a] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Legal/Privacy-Policy
DEBUG - 2026-03-01 18:52:06 --> [CSRF] token name=csrf_test_name hash=8388d032b97a5d081ab1e23447faf81b
DEBUG - 2026-03-01 18:52:06 --> [REQ_ID=040571ee778a] [REQUEST][END]
INFO - 2026-03-01 18:52:06 --> [REQ_ID=040571ee778a] [PERF] Execution time=0.027300
DEBUG - 2026-03-01 18:52:21 --> [REQ_ID=beda08129acf] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-01 18:52:21 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-01 18:52:21 --> [REQ_ID=beda08129acf] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-01 18:52:21 --> [REQ_ID=beda08129acf] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-01 18:52:21 --> [REQ_ID=beda08129acf] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-01 18:52:21 --> [CSRF] token name=csrf_test_name hash=5e1910741f1e81db731e7ee9daa1cb00
DEBUG - 2026-03-01 18:52:21 --> [REQ_ID=2c919d21edcd] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-01 18:52:21 --> [REQ_ID=2c919d21edcd] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-01 18:52:21 --> [REQ_ID=beda08129acf] [FILTER_AFTER]
DEBUG - 2026-03-01 18:52:21 --> [REQ_ID=beda08129acf] [LIFECYCLE][END] status=200 duration_ms=34.55 memory_delta=0
INFO - 2026-03-01 18:52:21 --> [REQ_ID=2c919d21edcd] [PERF] Execution time=0.033865
DEBUG - 2026-03-01 18:52:21 --> [REQ_ID=beda08129acf] [REQUEST][END]
INFO - 2026-03-01 18:52:21 --> [REQ_ID=beda08129acf] [PERF] Execution time=0.047792
DEBUG - 2026-03-01 18:56:22 --> [REQ_ID=78a68e8f2b8d] [REQUEST][START] HEAD /
DEBUG - 2026-03-01 18:56:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-01 18:56:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-01 18:56:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-01 18:56:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-01 18:56:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
INFO - 2026-03-01 19:00:01 --> [spark:ops:work] Started
INFO - 2026-03-01 19:00:01 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-03-01 19:00:01 --> [SPARK_MEMORY] 16777216
INFO - 2026-03-01 19:00:01 --> [spark:ops:work] Intent
DEBUG - 2026-03-01 19:00:01 --> [REQ_ID=5226ef23a7c4] [REQUEST][START] GET /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-01 19:00:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-01 19:00:02 --> [REQ_ID=5226ef23a7c4] [FILTER_BEFORE] /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-01 19:00:02 --> [REQ_ID=5226ef23a7c4] [ROUTE] Controller=\App\Modules\Management\Controllers\ManagementAPIController Method=Run_CRON_Tasks
DEBUG - 2026-03-01 19:00:02 --> [REQ_ID=5226ef23a7c4] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-01 19:00:02 --> [REQ_ID=5226ef23a7c4] [REQUEST][END]
INFO - 2026-03-01 19:00:02 --> [REQ_ID=5226ef23a7c4] [PERF] Execution time=0.051376
INFO - 2026-03-01 19:00:02 --> [spark:ops:work] Completed
INFO - 2026-03-01 19:00:02 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.166038
INFO - 2026-03-01 19:00:02 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-03-01 19:01:22 --> [REQ_ID=3534fd0cda5d] [REQUEST][START] HEAD /
DEBUG - 2026-03-01 19:01:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-01 19:01:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-01 19:01:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-01 19:01:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-01 19:01:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-01 19:02:57 --> [REQ_ID=54612287470b] [REQUEST][START] GET /index.php/How-It-Works
DEBUG - 2026-03-01 19:02:57 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-01 19:02:57 --> [REQ_ID=54612287470b] [FILTER_BEFORE] /index.php/How-It-Works
DEBUG - 2026-03-01 19:02:57 --> [REQ_ID=54612287470b] [ROUTE] Controller=\App\Modules\Blog\Controllers\HowItWorksController Method=index
DEBUG - 2026-03-01 19:02:57 --> [REQ_ID=54612287470b] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/How-It-Works
DEBUG - 2026-03-01 19:02:57 --> [CSRF] token name=csrf_test_name hash=8e02be80a28577ab84f724d8e4bcf26e
DEBUG - 2026-03-01 19:02:57 --> [REQ_ID=e2692344ea39] [INIT] App\Modules\Blog\Controllers\HowItWorksController::GET
INFO - 2026-03-01 19:02:57 --> [REQ_ID=e2692344ea39] [MEMORY][controller-start] 6291456
DEBUG - 2026-03-01 19:02:58 --> [REQ_ID=e2692344ea39] [METHOD_ENTRY] index
DEBUG - 2026-03-01 19:02:58 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-01 19:02:58 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-01 19:02:58 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-01 19:02:58 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-01 19:02:58 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-01 19:02:58 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-01 19:02:58 --> [REQ_ID=e2692344ea39] [VIEW_RENDER] App\Modules\Blog\Views\HowItWorks\index
INFO - 2026-03-01 19:02:58 --> [REQ_ID=e2692344ea39] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-01 19:02:58 --> [MetaService] slug=how-it-works pageName= cacheHit= path=DB
INFO - 2026-03-01 19:02:58 --> themesMemory usage: 10485760
DEBUG - 2026-03-01 19:02:58 --> [MetaService] slug=how-it-works pageName= cacheHit=1 path=CACHE
DEBUG - 2026-03-01 19:02:58 --> [REQ_ID=54612287470b] [FILTER_AFTER]
DEBUG - 2026-03-01 19:02:58 --> [REQ_ID=54612287470b] [LIFECYCLE][END] status=200 duration_ms=1,007.48 memory_delta=4194304
INFO - 2026-03-01 19:02:58 --> [REQ_ID=e2692344ea39] [PERF] Execution time=1.005443
DEBUG - 2026-03-01 19:02:58 --> [REQ_ID=54612287470b] [REQUEST][END]
INFO - 2026-03-01 19:02:58 --> [REQ_ID=54612287470b] [PERF] Execution time=1.049707
DEBUG - 2026-03-01 19:06:22 --> [REQ_ID=2300d897ff53] [REQUEST][START] HEAD /
DEBUG - 2026-03-01 19:06:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-01 19:06:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-01 19:06:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-01 19:06:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-01 19:06:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-01 19:11:22 --> [REQ_ID=86e77a0c210a] [REQUEST][START] HEAD /
DEBUG - 2026-03-01 19:11:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-01 19:11:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-01 19:11:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-01 19:11:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-01 19:11:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-01 19:13:09 --> [REQ_ID=7c7b45f70802] [REQUEST][START] GET /index.php/Knowledgebase
DEBUG - 2026-03-01 19:13:09 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-01 19:13:09 --> [REQ_ID=7c7b45f70802] [FILTER_BEFORE] /index.php/Knowledgebase
DEBUG - 2026-03-01 19:13:09 --> [REQ_ID=7c7b45f70802] [ROUTE] Controller=\App\Modules\User\Controllers\KnowledgebaseController Method=index
DEBUG - 2026-03-01 19:13:09 --> [REQ_ID=7c7b45f70802] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Knowledgebase
DEBUG - 2026-03-01 19:13:09 --> [CSRF] token name=csrf_test_name hash=de458e228808592201af1e8ef6ecd859
DEBUG - 2026-03-01 19:13:09 --> [REQ_ID=7c7b45f70802] [REQUEST][END]
INFO - 2026-03-01 19:13:09 --> [REQ_ID=7c7b45f70802] [PERF] Execution time=0.030017
DEBUG - 2026-03-01 19:13:14 --> [REQ_ID=d2e23ea8ac12] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-01 19:13:14 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-01 19:13:14 --> [REQ_ID=d2e23ea8ac12] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-01 19:13:14 --> [REQ_ID=d2e23ea8ac12] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-01 19:13:14 --> [REQ_ID=d2e23ea8ac12] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-01 19:13:14 --> [CSRF] token name=csrf_test_name hash=565895ae29cff94aa72a643949d6797d
DEBUG - 2026-03-01 19:13:14 --> [REQ_ID=9809664e7385] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-01 19:13:14 --> [REQ_ID=9809664e7385] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-01 19:13:14 --> [REQ_ID=d2e23ea8ac12] [FILTER_AFTER]
DEBUG - 2026-03-01 19:13:14 --> [REQ_ID=d2e23ea8ac12] [LIFECYCLE][END] status=200 duration_ms=48.75 memory_delta=0
INFO - 2026-03-01 19:13:14 --> [REQ_ID=9809664e7385] [PERF] Execution time=0.048710
DEBUG - 2026-03-01 19:13:14 --> [REQ_ID=d2e23ea8ac12] [REQUEST][END]
INFO - 2026-03-01 19:13:14 --> [REQ_ID=d2e23ea8ac12] [PERF] Execution time=0.061545
INFO - 2026-03-01 19:15:01 --> [spark:ops:work] Started
INFO - 2026-03-01 19:15:01 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-03-01 19:15:01 --> [SPARK_MEMORY] 16777216
INFO - 2026-03-01 19:15:01 --> [spark:ops:work] Intent
DEBUG - 2026-03-01 19:15:01 --> [REQ_ID=058d24c97f6d] [REQUEST][START] GET /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-01 19:15:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
INFO - 2026-03-01 19:15:02 --> [spark:ops:work] Completed
INFO - 2026-03-01 19:15:02 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.129553
INFO - 2026-03-01 19:15:02 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-03-01 19:15:02 --> [REQ_ID=058d24c97f6d] [FILTER_BEFORE] /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-01 19:15:02 --> [REQ_ID=058d24c97f6d] [ROUTE] Controller=\App\Modules\APIs\Controllers\AlertsAPIController Method=fetchEmailAlerts
DEBUG - 2026-03-01 19:15:02 --> [REQ_ID=058d24c97f6d] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-01 19:15:02 --> [REQ_ID=058d24c97f6d] [REQUEST][END]
INFO - 2026-03-01 19:15:02 --> [REQ_ID=058d24c97f6d] [PERF] Execution time=0.056288
DEBUG - 2026-03-01 19:16:22 --> [REQ_ID=a84e0fa29eb8] [REQUEST][START] HEAD /
DEBUG - 2026-03-01 19:16:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-01 19:16:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-01 19:16:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-01 19:16:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-01 19:16:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-01 19:21:22 --> [REQ_ID=a434c19c6178] [REQUEST][START] HEAD /
DEBUG - 2026-03-01 19:21:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-01 19:21:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-01 19:21:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-01 19:21:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-01 19:21:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-01 19:23:15 --> [REQ_ID=c25de41569ed] [REQUEST][START] GET /index.php/How-It-Works/Personal-Budgeting
DEBUG - 2026-03-01 19:23:16 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-01 19:23:16 --> [REQ_ID=c25de41569ed] [FILTER_BEFORE] /index.php/How-It-Works/Personal-Budgeting
DEBUG - 2026-03-01 19:23:16 --> [REQ_ID=c25de41569ed] [ROUTE] Controller=\App\Modules\Blog\Controllers\HowItWorksController Method=show
DEBUG - 2026-03-01 19:23:16 --> [REQ_ID=c25de41569ed] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/How-It-Works/Personal-Budgeting
DEBUG - 2026-03-01 19:23:16 --> [CSRF] token name=csrf_test_name hash=ae6b4597816cd83fc8f3e10e0087eb48
DEBUG - 2026-03-01 19:23:16 --> [REQ_ID=47aa7e747bdb] [INIT] App\Modules\Blog\Controllers\HowItWorksController::GET
INFO - 2026-03-01 19:23:16 --> [REQ_ID=47aa7e747bdb] [MEMORY][controller-start] 6291456
DEBUG - 2026-03-01 19:23:16 --> [REQ_ID=47aa7e747bdb] [METHOD_ENTRY] show
DEBUG - 2026-03-01 19:23:16 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-01 19:23:16 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-01 19:23:16 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-01 19:23:16 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-01 19:23:16 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-01 19:23:16 --> MyMICoin: guest context detected; skipping user-specific preload.
INFO - 2026-03-01 19:23:16 --> [REQ_ID=47aa7e747bdb] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-01 19:23:16 --> [REQ_ID=47aa7e747bdb] [VIEW_RENDER] App\Modules\Blog\Views\HowItWorks\Personal_Budgeting
INFO - 2026-03-01 19:23:16 --> [REQ_ID=47aa7e747bdb] [MEMORY][commonData:start] 10485760
INFO - 2026-03-01 19:23:17 --> themesMemory usage: 14680064
DEBUG - 2026-03-01 19:23:17 --> [REQ_ID=c25de41569ed] [FILTER_AFTER]
DEBUG - 2026-03-01 19:23:17 --> [REQ_ID=c25de41569ed] [LIFECYCLE][END] status=200 duration_ms=1,210.16 memory_delta=8388608
INFO - 2026-03-01 19:23:17 --> [REQ_ID=47aa7e747bdb] [PERF] Execution time=1.208128
DEBUG - 2026-03-01 19:23:17 --> [REQ_ID=c25de41569ed] [REQUEST][END]
INFO - 2026-03-01 19:23:17 --> [REQ_ID=c25de41569ed] [PERF] Execution time=1.252119
DEBUG - 2026-03-01 19:26:22 --> [REQ_ID=c8734948e77d] [REQUEST][START] HEAD /
DEBUG - 2026-03-01 19:26:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-01 19:26:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-01 19:26:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-01 19:26:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-01 19:26:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
INFO - 2026-03-01 19:30:01 --> [spark:ops:work] Started
INFO - 2026-03-01 19:30:01 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-03-01 19:30:01 --> [SPARK_MEMORY] 16777216
INFO - 2026-03-01 19:30:01 --> [spark:ops:work] Intent
INFO - 2026-03-01 19:30:01 --> [spark:ops:work] Completed
INFO - 2026-03-01 19:30:01 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.114407
INFO - 2026-03-01 19:30:01 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-03-01 19:31:22 --> [REQ_ID=466be18c8a64] [REQUEST][START] HEAD /
DEBUG - 2026-03-01 19:31:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-01 19:31:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-01 19:31:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-01 19:31:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-01 19:31:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
INFO - 2026-03-01 19:32:23 --> [SPARK_START] App\Commands\Routes\Audit
INFO - 2026-03-01 19:32:23 --> [SPARK_MEMORY] 16777216
INFO - 2026-03-01 19:32:23 --> [SPARK_COMPLETE] App\Commands\Routes\Audit duration=0.001552
INFO - 2026-03-01 19:32:23 --> [SPARK_MEMORY] 16777216
DEBUG - 2026-03-01 19:35:17 --> [REQ_ID=fc82deabe703] [REQUEST][START] GET /index.php/Memberships
DEBUG - 2026-03-01 19:35:17 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-01 19:35:17 --> [REQ_ID=fc82deabe703] [FILTER_BEFORE] /index.php/Memberships
DEBUG - 2026-03-01 19:35:17 --> [REQ_ID=fc82deabe703] [ROUTE] Controller=\App\Controllers\Home Method=memberships
DEBUG - 2026-03-01 19:35:17 --> [REQ_ID=fc82deabe703] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Memberships
DEBUG - 2026-03-01 19:35:17 --> [CSRF] token name=csrf_test_name hash=5c26f368cedc06b1f39422dbea1f970c
DEBUG - 2026-03-01 19:35:17 --> [REQ_ID=b8331696a2ed] [INIT] App\Controllers\Home::GET
INFO - 2026-03-01 19:35:17 --> [REQ_ID=b8331696a2ed] [MEMORY][controller-start] 6291456
INFO - 2026-03-01 19:35:17 --> [REQ_ID=b8331696a2ed] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-01 19:35:17 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-01 19:35:18 --> [MetaService] slug=memberships pageName= cacheHit= path=DB
DEBUG - 2026-03-01 19:35:18 --> [REQ_ID=b8331696a2ed] [VIEW_RENDER] themes/public/memberships
INFO - 2026-03-01 19:35:18 --> [REQ_ID=b8331696a2ed] [MEMORY][commonData:start] 10485760
INFO - 2026-03-01 19:35:18 --> themesMemory usage: 10485760
DEBUG - 2026-03-01 19:35:18 --> [MetaService] slug=memberships pageName=Memberships cacheHit= path=DB
DEBUG - 2026-03-01 19:35:18 --> [REQ_ID=fc82deabe703] [FILTER_AFTER]
DEBUG - 2026-03-01 19:35:18 --> [REQ_ID=fc82deabe703] [LIFECYCLE][END] status=200 duration_ms=620.25 memory_delta=4194304
INFO - 2026-03-01 19:35:18 --> [REQ_ID=b8331696a2ed] [PERF] Execution time=0.617794
DEBUG - 2026-03-01 19:35:18 --> [REQ_ID=fc82deabe703] [REQUEST][END]
INFO - 2026-03-01 19:35:18 --> [REQ_ID=fc82deabe703] [PERF] Execution time=0.669893
DEBUG - 2026-03-01 19:36:22 --> [REQ_ID=b17b6e225bd4] [REQUEST][START] HEAD /
DEBUG - 2026-03-01 19:36:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-01 19:36:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-01 19:36:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-01 19:36:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-01 19:36:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-01 19:40:12 --> [REQ_ID=735b67f22a2b] [REQUEST][START] GET /index.php/Dashboard
DEBUG - 2026-03-01 19:40:12 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-01 19:40:12 --> [REQ_ID=735b67f22a2b] [FILTER_BEFORE] /index.php/Dashboard
DEBUG - 2026-03-01 19:40:12 --> [REQ_ID=735b67f22a2b] [ROUTE] Controller=\App\Modules\User\Controllers\DashboardController Method=index
DEBUG - 2026-03-01 19:40:12 --> [REQ_ID=735b67f22a2b] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Dashboard
DEBUG - 2026-03-01 19:40:12 --> [CSRF] token name=csrf_test_name hash=d2c3eb56d0870ea7d03b4a990d6aad79
DEBUG - 2026-03-01 19:40:12 --> [REQ_ID=735b67f22a2b] [REQUEST][END]
INFO - 2026-03-01 19:40:12 --> [REQ_ID=735b67f22a2b] [PERF] Execution time=0.079214
DEBUG - 2026-03-01 19:40:17 --> [REQ_ID=e2643a0e9242] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-01 19:40:17 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-01 19:40:17 --> [REQ_ID=e2643a0e9242] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-01 19:40:17 --> [REQ_ID=e2643a0e9242] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-01 19:40:17 --> [REQ_ID=e2643a0e9242] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-01 19:40:17 --> [CSRF] token name=csrf_test_name hash=3294171dcd5ffbd8aad52c88d85360fb
DEBUG - 2026-03-01 19:40:17 --> [REQ_ID=206b333e84d5] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-01 19:40:17 --> [REQ_ID=206b333e84d5] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-01 19:40:17 --> [REQ_ID=e2643a0e9242] [FILTER_AFTER]
DEBUG - 2026-03-01 19:40:17 --> [REQ_ID=e2643a0e9242] [LIFECYCLE][END] status=200 duration_ms=55.88 memory_delta=0
INFO - 2026-03-01 19:40:17 --> [REQ_ID=206b333e84d5] [PERF] Execution time=0.055280
DEBUG - 2026-03-01 19:40:17 --> [REQ_ID=e2643a0e9242] [REQUEST][END]
INFO - 2026-03-01 19:40:17 --> [REQ_ID=e2643a0e9242] [PERF] Execution time=0.072711
DEBUG - 2026-03-01 19:41:22 --> [REQ_ID=b4eb6c4dac32] [REQUEST][START] HEAD /
DEBUG - 2026-03-01 19:41:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-01 19:41:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-01 19:41:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-01 19:41:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-01 19:41:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-01 19:43:45 --> [REQ_ID=425013cd6304] [REQUEST][START] GET /
DEBUG - 2026-03-01 19:43:45 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-01 19:43:45 --> [REQ_ID=425013cd6304] [FILTER_BEFORE] /
DEBUG - 2026-03-01 19:43:45 --> [REQ_ID=425013cd6304] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-01 19:43:45 --> [REQ_ID=425013cd6304] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-01 19:43:45 --> [CSRF] token name=csrf_test_name hash=a1a11a4d3eee056c9b008477b4881ec7
DEBUG - 2026-03-01 19:43:45 --> [REQ_ID=c5d0b585bc13] [INIT] App\Controllers\Home::GET
INFO - 2026-03-01 19:43:45 --> [REQ_ID=c5d0b585bc13] [MEMORY][controller-start] 6291456
INFO - 2026-03-01 19:43:45 --> [REQ_ID=c5d0b585bc13] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-01 19:43:45 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-01 19:43:46 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-03-01 19:43:46 --> [REQ_ID=c5d0b585bc13] [VIEW_RENDER] themes/public/home
INFO - 2026-03-01 19:43:46 --> [REQ_ID=c5d0b585bc13] [MEMORY][commonData:start] 10485760
INFO - 2026-03-01 19:43:46 --> themesMemory usage: 10485760
DEBUG - 2026-03-01 19:43:46 --> [MetaService] slug= pageName=Home cacheHit= path=DB
DEBUG - 2026-03-01 19:43:46 --> [REQ_ID=425013cd6304] [FILTER_AFTER]
DEBUG - 2026-03-01 19:43:46 --> [REQ_ID=425013cd6304] [LIFECYCLE][END] status=200 duration_ms=784.55 memory_delta=4194304
INFO - 2026-03-01 19:43:46 --> [REQ_ID=c5d0b585bc13] [PERF] Execution time=0.782560
DEBUG - 2026-03-01 19:43:46 --> [REQ_ID=425013cd6304] [REQUEST][END]
INFO - 2026-03-01 19:43:46 --> [REQ_ID=425013cd6304] [PERF] Execution time=0.824853
INFO - 2026-03-01 19:45:01 --> [spark:ops:work] Started
INFO - 2026-03-01 19:45:01 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-03-01 19:45:01 --> [SPARK_MEMORY] 16777216
INFO - 2026-03-01 19:45:01 --> [spark:ops:work] Intent
INFO - 2026-03-01 19:45:01 --> [spark:ops:work] Completed
INFO - 2026-03-01 19:45:01 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.118406
INFO - 2026-03-01 19:45:01 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-03-01 19:45:15 --> [REQ_ID=9f91fc9a1c42] [REQUEST][START] GET /index.php/Management/Services
DEBUG - 2026-03-01 19:45:15 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-01 19:45:15 --> [REQ_ID=9f91fc9a1c42] [FILTER_BEFORE] /index.php/Management/Services
DEBUG - 2026-03-01 19:45:15 --> [REQ_ID=9f91fc9a1c42] [ROUTE] Controller=\App\Modules\Management\Controllers\ServicesController Method=index
DEBUG - 2026-03-01 19:45:15 --> [REQ_ID=9f91fc9a1c42] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Management/Services
DEBUG - 2026-03-01 19:45:15 --> [CSRF] token name=csrf_test_name hash=8e4df81650d6f3eeacc80533d8188cb4
DEBUG - 2026-03-01 19:45:15 --> [REQ_ID=9f91fc9a1c42] [REQUEST][END]
INFO - 2026-03-01 19:45:15 --> [REQ_ID=9f91fc9a1c42] [PERF] Execution time=0.050706
DEBUG - 2026-03-01 19:45:15 --> [REQ_ID=5f8f014b33ae] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-01 19:45:15 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-01 19:45:15 --> [REQ_ID=5f8f014b33ae] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-01 19:45:15 --> [REQ_ID=5f8f014b33ae] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-01 19:45:15 --> [REQ_ID=5f8f014b33ae] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-01 19:45:15 --> [CSRF] token name=csrf_test_name hash=41d073220edf7d2004e66e9187fae822
DEBUG - 2026-03-01 19:45:15 --> [REQ_ID=8e07136988d5] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-01 19:45:15 --> [REQ_ID=8e07136988d5] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-01 19:45:15 --> [REQ_ID=5f8f014b33ae] [FILTER_AFTER]
DEBUG - 2026-03-01 19:45:15 --> [REQ_ID=5f8f014b33ae] [LIFECYCLE][END] status=200 duration_ms=64.17 memory_delta=0
INFO - 2026-03-01 19:45:15 --> [REQ_ID=8e07136988d5] [PERF] Execution time=0.034527
DEBUG - 2026-03-01 19:45:15 --> [REQ_ID=5f8f014b33ae] [REQUEST][END]
INFO - 2026-03-01 19:45:15 --> [REQ_ID=5f8f014b33ae] [PERF] Execution time=0.078866
DEBUG - 2026-03-01 19:46:22 --> [REQ_ID=0bf7e1472b03] [REQUEST][START] HEAD /
DEBUG - 2026-03-01 19:46:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-01 19:46:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-01 19:46:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-01 19:46:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-01 19:46:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-01 19:50:54 --> [REQ_ID=a2310a961b1e] [REQUEST][START] GET /index.php/Dashboard
DEBUG - 2026-03-01 19:50:54 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-01 19:50:54 --> [REQ_ID=a2310a961b1e] [FILTER_BEFORE] /index.php/Dashboard
DEBUG - 2026-03-01 19:50:54 --> [REQ_ID=a2310a961b1e] [ROUTE] Controller=\App\Modules\User\Controllers\DashboardController Method=index
DEBUG - 2026-03-01 19:50:54 --> [REQ_ID=a2310a961b1e] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Dashboard
DEBUG - 2026-03-01 19:50:54 --> [CSRF] token name=csrf_test_name hash=acfbf0e951b3b647d7747c82a9f56a7e
DEBUG - 2026-03-01 19:50:54 --> [REQ_ID=a2310a961b1e] [REQUEST][END]
INFO - 2026-03-01 19:50:54 --> [REQ_ID=a2310a961b1e] [PERF] Execution time=0.055565
DEBUG - 2026-03-01 19:51:22 --> [REQ_ID=ea3e076de2fd] [REQUEST][START] HEAD /
DEBUG - 2026-03-01 19:51:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-01 19:51:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-01 19:51:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-01 19:51:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-01 19:51:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-01 19:51:40 --> [REQ_ID=ab1b12aecdc0] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-01 19:51:40 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-01 19:51:41 --> [REQ_ID=ab1b12aecdc0] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-01 19:51:41 --> [REQ_ID=ab1b12aecdc0] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-01 19:51:41 --> [REQ_ID=ab1b12aecdc0] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-01 19:51:41 --> [CSRF] token name=csrf_test_name hash=4c62275b46c37ae57f96a90705b1f028
DEBUG - 2026-03-01 19:51:41 --> [REQ_ID=cbac9605c6e3] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-01 19:51:41 --> [REQ_ID=cbac9605c6e3] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-01 19:51:41 --> [REQ_ID=ab1b12aecdc0] [FILTER_AFTER]
DEBUG - 2026-03-01 19:51:41 --> [REQ_ID=ab1b12aecdc0] [LIFECYCLE][END] status=200 duration_ms=46.79 memory_delta=0
INFO - 2026-03-01 19:51:41 --> [REQ_ID=cbac9605c6e3] [PERF] Execution time=0.046110
DEBUG - 2026-03-01 19:51:41 --> [REQ_ID=ab1b12aecdc0] [REQUEST][END]
INFO - 2026-03-01 19:51:41 --> [REQ_ID=ab1b12aecdc0] [PERF] Execution time=0.058962
DEBUG - 2026-03-01 19:52:41 --> [REQ_ID=f8ac9f59130d] [REQUEST][START] GET /index.php/Support
DEBUG - 2026-03-01 19:52:41 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-01 19:52:41 --> [REQ_ID=f8ac9f59130d] [FILTER_BEFORE] /index.php/Support
DEBUG - 2026-03-01 19:52:41 --> [REQ_ID=f8ac9f59130d] [ROUTE] Controller=\App\Modules\Support\Controllers\SupportController Method=index
DEBUG - 2026-03-01 19:52:41 --> [REQ_ID=f8ac9f59130d] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Support
DEBUG - 2026-03-01 19:52:41 --> [CSRF] token name=csrf_test_name hash=e5439adec6328398b28aebbced54a6b0
DEBUG - 2026-03-01 19:52:41 --> [REQ_ID=a5bc2c45a42d] [INIT] App\Modules\Support\Controllers\SupportController::GET
INFO - 2026-03-01 19:52:41 --> [REQ_ID=a5bc2c45a42d] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-01 19:52:41 --> [REQ_ID=a5bc2c45a42d] [METHOD_ENTRY] index
DEBUG - 2026-03-01 19:52:41 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-01 19:52:41 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-01 19:52:41 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-01 19:52:41 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-01 19:52:41 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-01 19:52:41 --> MyMICoin: guest context detected; skipping user-specific preload.
INFO - 2026-03-01 19:52:41 --> [REQ_ID=a5bc2c45a42d] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-01 19:52:41 --> [REQ_ID=a5bc2c45a42d] [VIEW_RENDER] SupportModule\Views\Support\index
INFO - 2026-03-01 19:52:41 --> [REQ_ID=a5bc2c45a42d] [MEMORY][commonData:start] 6291456
INFO - 2026-03-01 19:52:41 --> themesMemory usage: 6291456
DEBUG - 2026-03-01 19:52:41 --> [REQ_ID=f8ac9f59130d] [FILTER_AFTER]
DEBUG - 2026-03-01 19:52:41 --> [REQ_ID=f8ac9f59130d] [LIFECYCLE][END] status=200 duration_ms=149.00 memory_delta=2097152
INFO - 2026-03-01 19:52:41 --> [REQ_ID=a5bc2c45a42d] [PERF] Execution time=0.148673
DEBUG - 2026-03-01 19:52:41 --> [REQ_ID=f8ac9f59130d] [REQUEST][END]
INFO - 2026-03-01 19:52:41 --> [REQ_ID=f8ac9f59130d] [PERF] Execution time=0.161379
DEBUG - 2026-03-01 19:56:22 --> [REQ_ID=0e0591161661] [REQUEST][START] HEAD /
DEBUG - 2026-03-01 19:56:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-01 19:56:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-01 19:56:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-01 19:56:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-01 19:56:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-01 20:00:01 --> [REQ_ID=af5982f51639] [REQUEST][START] GET /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-01 20:00:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-01 20:00:01 --> [REQ_ID=af5982f51639] [FILTER_BEFORE] /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-01 20:00:01 --> [REQ_ID=af5982f51639] [ROUTE] Controller=\App\Modules\Management\Controllers\ManagementAPIController Method=Run_CRON_Tasks
DEBUG - 2026-03-01 20:00:01 --> [REQ_ID=af5982f51639] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-01 20:00:01 --> [REQ_ID=af5982f51639] [REQUEST][END]
INFO - 2026-03-01 20:00:01 --> [REQ_ID=af5982f51639] [PERF] Execution time=0.054991
INFO - 2026-03-01 20:00:01 --> [SPARK_START] App\Commands\AIOps\Run
INFO - 2026-03-01 20:00:01 --> [SPARK_MEMORY] 16777216
INFO - 2026-03-01 20:00:01 --> [spark:aiops:run] Intent
INFO - 2026-03-01 20:00:01 --> [spark:ops:work] Started
INFO - 2026-03-01 20:00:01 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-03-01 20:00:01 --> [SPARK_MEMORY] 16777216
INFO - 2026-03-01 20:00:01 --> [spark:ops:work] Intent
INFO - 2026-03-01 20:00:01 --> [spark:ops:work] Completed
INFO - 2026-03-01 20:00:01 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.206108
INFO - 2026-03-01 20:00:01 --> [SPARK_MEMORY] 18874368
INFO - 2026-03-01 20:00:03 --> [AIOPS][SPARK][GOVERNANCE][spark:logs:summarize] Started
INFO - 2026-03-01 20:00:03 --> [SPARK_START] App\Commands\Logs\Summarize
INFO - 2026-03-01 20:00:03 --> [SPARK_MEMORY] 16777216
INFO - 2026-03-01 20:00:03 --> [spark:logs:summarize] Intent
INFO - 2026-03-01 20:00:03 --> [AIOPS][SPARK][GOVERNANCE][spark:logs:summarize] Completed
INFO - 2026-03-01 20:00:03 --> [SPARK_COMPLETE] App\Commands\Logs\Summarize duration=0.026802
INFO - 2026-03-01 20:00:03 --> [SPARK_MEMORY] 20971520
INFO - 2026-03-01 20:00:03 --> [spark:app:healthcheck] Started
INFO - 2026-03-01 20:00:03 --> [SPARK_START] App\Commands\App\Healthcheck
INFO - 2026-03-01 20:00:03 --> [SPARK_MEMORY] 16777216
INFO - 2026-03-01 20:00:03 --> [spark:app:healthcheck] Intent
DEBUG - 2026-03-01 20:00:03 --> LOG_HEALTHCHECK debug marker=941690ee8670
INFO - 2026-03-01 20:00:03 --> LOG_HEALTHCHECK info marker=941690ee8670
NOTICE - 2026-03-01 20:00:03 --> LOG_HEALTHCHECK probe marker=941690ee8670
INFO - 2026-03-01 20:00:03 --> [spark:app:healthcheck] Completed
INFO - 2026-03-01 20:00:03 --> [SPARK_COMPLETE] App\Commands\App\Healthcheck duration=0.029483
INFO - 2026-03-01 20:00:03 --> [SPARK_MEMORY] 20971520
DEBUG - 2026-03-01 20:00:04 --> OllamaPatchRunner:L142 - validateGeneratedPatch Content: 
WARNING - 2026-03-01 20:00:04 --> OllamaPatchRunner:L49 - Original Diff: 
DEBUG - 2026-03-01 20:00:05 --> OllamaPatchRunner:L51 - Retried Diff: 
DEBUG - 2026-03-01 20:00:05 --> OllamaPatchRunner:L142 - validateGeneratedPatch Content: 
DEBUG - 2026-03-01 20:00:05 --> OllamaPatchRunner:L53 - Validating Generated Patch Failed
INFO - 2026-03-01 20:00:05 --> [SPARK_COMPLETE] App\Commands\AIOps\Run duration=3.734423
INFO - 2026-03-01 20:00:05 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-03-01 20:01:22 --> [REQ_ID=91ca073e56bd] [REQUEST][START] HEAD /
DEBUG - 2026-03-01 20:01:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-01 20:01:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-01 20:01:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-01 20:01:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-01 20:01:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-01 20:02:40 --> [REQ_ID=ffe9901fd69b] [REQUEST][START] GET /index.php
DEBUG - 2026-03-01 20:02:40 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-01 20:02:40 --> [REQ_ID=ffe9901fd69b] [FILTER_BEFORE] /index.php
DEBUG - 2026-03-01 20:02:40 --> [REQ_ID=ffe9901fd69b] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-01 20:02:40 --> [REQ_ID=ffe9901fd69b] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-01 20:02:40 --> [CSRF] token name=csrf_test_name hash=dd554dc992f3e1915a2bf9c790e5e701
DEBUG - 2026-03-01 20:02:40 --> [REQ_ID=955ad796b30c] [INIT] App\Controllers\Home::GET
INFO - 2026-03-01 20:02:40 --> [REQ_ID=955ad796b30c] [MEMORY][controller-start] 4194304
INFO - 2026-03-01 20:02:40 --> [REQ_ID=955ad796b30c] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-01 20:02:40 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-01 20:02:41 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-03-01 20:02:41 --> [REQ_ID=955ad796b30c] [VIEW_RENDER] themes/public/home
INFO - 2026-03-01 20:02:41 --> [REQ_ID=955ad796b30c] [MEMORY][commonData:start] 8388608
INFO - 2026-03-01 20:02:41 --> themesMemory usage: 8388608
DEBUG - 2026-03-01 20:02:41 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-01 20:02:41 --> [REQ_ID=ffe9901fd69b] [FILTER_AFTER]
DEBUG - 2026-03-01 20:02:41 --> [REQ_ID=ffe9901fd69b] [LIFECYCLE][END] status=200 duration_ms=548.51 memory_delta=4194304
INFO - 2026-03-01 20:02:41 --> [REQ_ID=955ad796b30c] [PERF] Execution time=0.546340
DEBUG - 2026-03-01 20:02:41 --> [REQ_ID=ffe9901fd69b] [REQUEST][END]
INFO - 2026-03-01 20:02:41 --> [REQ_ID=ffe9901fd69b] [PERF] Execution time=0.567194
DEBUG - 2026-03-01 20:06:22 --> [REQ_ID=6558b2eac4fb] [REQUEST][START] HEAD /
DEBUG - 2026-03-01 20:06:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-01 20:06:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-01 20:06:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-01 20:06:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-01 20:06:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-01 20:09:20 --> [REQ_ID=f565862b8c02] [REQUEST][START] GET /index.php/Budget/Financial-Advisors
DEBUG - 2026-03-01 20:09:20 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-01 20:09:20 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: GET, Route: Budget/Financial-Advisors]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-01 20:09:20 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-01 20:09:20 --> [404] URI=https://www.mymiwallet.com/index.php/Budget/Financial-Advisors
WARNING - 2026-03-01 20:09:20 --> 404 route miss: https://www.mymiwallet.com/index.php/Budget/Financial-Advisors | referrer: none
DEBUG - 2026-03-01 20:11:22 --> [REQ_ID=75d5bd64f70b] [REQUEST][START] HEAD /
DEBUG - 2026-03-01 20:11:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-01 20:11:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-01 20:11:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-01 20:11:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-01 20:11:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-01 20:14:20 --> [REQ_ID=b35b97efabd0] [REQUEST][START] GET /index.php/forgot
DEBUG - 2026-03-01 20:14:20 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-01 20:14:20 --> [REQ_ID=b35b97efabd0] [FILTER_BEFORE] /index.php/forgot
DEBUG - 2026-03-01 20:14:20 --> [REQ_ID=b35b97efabd0] [ROUTE] Controller=\Myth\Auth\Controllers\AuthController Method=forgotPassword
DEBUG - 2026-03-01 20:14:20 --> [REQ_ID=b35b97efabd0] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/forgot
DEBUG - 2026-03-01 20:14:20 --> [CSRF] token name=csrf_test_name hash=793b3a55229f2755e3bc8f443221c764
DEBUG - 2026-03-01 20:14:20 --> [REQ_ID=b35b97efabd0] [FILTER_AFTER]
DEBUG - 2026-03-01 20:14:20 --> [REQ_ID=b35b97efabd0] [LIFECYCLE][END] status=200 duration_ms=18.37 memory_delta=0
DEBUG - 2026-03-01 20:14:20 --> [REQ_ID=b35b97efabd0] [REQUEST][END]
INFO - 2026-03-01 20:14:20 --> [REQ_ID=b35b97efabd0] [PERF] Execution time=0.082257
DEBUG - 2026-03-01 20:15:02 --> [REQ_ID=790c91197cf2] [REQUEST][START] GET /index.php/API/Alerts/fetchEmailAlerts
INFO - 2026-03-01 20:15:02 --> [spark:ops:work] Started
INFO - 2026-03-01 20:15:02 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-03-01 20:15:02 --> [SPARK_MEMORY] 16777216
INFO - 2026-03-01 20:15:02 --> [spark:ops:work] Intent
INFO - 2026-03-01 20:15:02 --> [spark:ops:work] Completed
INFO - 2026-03-01 20:15:02 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.043022
INFO - 2026-03-01 20:15:02 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-03-01 20:15:02 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-01 20:15:02 --> [REQ_ID=790c91197cf2] [FILTER_BEFORE] /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-01 20:15:02 --> [REQ_ID=790c91197cf2] [ROUTE] Controller=\App\Modules\APIs\Controllers\AlertsAPIController Method=fetchEmailAlerts
DEBUG - 2026-03-01 20:15:02 --> [REQ_ID=790c91197cf2] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-01 20:15:02 --> [REQ_ID=790c91197cf2] [REQUEST][END]
INFO - 2026-03-01 20:15:02 --> [REQ_ID=790c91197cf2] [PERF] Execution time=0.287772
DEBUG - 2026-03-01 20:16:22 --> [REQ_ID=07bce15db995] [REQUEST][START] HEAD /
DEBUG - 2026-03-01 20:16:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-01 20:16:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-01 20:16:23 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-01 20:16:23 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-01 20:16:23 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-01 20:21:22 --> [REQ_ID=3344c7aabce9] [REQUEST][START] HEAD /
DEBUG - 2026-03-01 20:21:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-01 20:21:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-01 20:21:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-01 20:21:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-01 20:21:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-01 20:22:53 --> [REQ_ID=fe3956384f3b] [REQUEST][START] GET /index.php/Wallets/Purchase/Memberships
DEBUG - 2026-03-01 20:22:53 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-01 20:22:53 --> [REQ_ID=fe3956384f3b] [FILTER_BEFORE] /index.php/Wallets/Purchase/Memberships
DEBUG - 2026-03-01 20:22:53 --> [REQ_ID=fe3956384f3b] [ROUTE] Controller=\App\Modules\User\Controllers\WalletsController Method=purchase
DEBUG - 2026-03-01 20:22:53 --> [REQ_ID=fe3956384f3b] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Wallets/Purchase/Memberships
DEBUG - 2026-03-01 20:22:53 --> [CSRF] token name=csrf_test_name hash=f2be59359db4e184036951ab13c94939
DEBUG - 2026-03-01 20:22:53 --> [REQ_ID=fe3956384f3b] [REQUEST][END]
INFO - 2026-03-01 20:22:53 --> [REQ_ID=fe3956384f3b] [PERF] Execution time=0.056731
DEBUG - 2026-03-01 20:22:57 --> [REQ_ID=ae73c02d5b59] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-01 20:22:57 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-01 20:22:57 --> [REQ_ID=ae73c02d5b59] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-01 20:22:57 --> [REQ_ID=ae73c02d5b59] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-01 20:22:57 --> [REQ_ID=ae73c02d5b59] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-01 20:22:57 --> [CSRF] token name=csrf_test_name hash=0eb965d01be759bd1dc99315ea6a73b7
DEBUG - 2026-03-01 20:22:57 --> [REQ_ID=6b48e22a5d43] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-01 20:22:57 --> [REQ_ID=6b48e22a5d43] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-01 20:22:57 --> [REQ_ID=ae73c02d5b59] [FILTER_AFTER]
DEBUG - 2026-03-01 20:22:57 --> [REQ_ID=ae73c02d5b59] [LIFECYCLE][END] status=200 duration_ms=40.49 memory_delta=0
INFO - 2026-03-01 20:22:57 --> [REQ_ID=6b48e22a5d43] [PERF] Execution time=0.040545
DEBUG - 2026-03-01 20:22:57 --> [REQ_ID=ae73c02d5b59] [REQUEST][END]
INFO - 2026-03-01 20:22:57 --> [REQ_ID=ae73c02d5b59] [PERF] Execution time=0.054337
DEBUG - 2026-03-01 20:26:23 --> [REQ_ID=056570c6e248] [REQUEST][START] HEAD /
DEBUG - 2026-03-01 20:26:23 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-01 20:26:23 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-01 20:26:23 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-01 20:26:23 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-01 20:26:23 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-01 20:29:21 --> [REQ_ID=3ae866c99cbb] [REQUEST][START] GET /
DEBUG - 2026-03-01 20:29:21 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-01 20:29:21 --> [REQ_ID=3ae866c99cbb] [FILTER_BEFORE] /
DEBUG - 2026-03-01 20:29:21 --> [REQ_ID=3ae866c99cbb] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-01 20:29:21 --> [REQ_ID=3ae866c99cbb] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-01 20:29:21 --> [CSRF] token name=csrf_test_name hash=ee71726d59c42ddab2ab8786279653b5
DEBUG - 2026-03-01 20:29:21 --> [REQ_ID=d41cc9e531b1] [INIT] App\Controllers\Home::GET
INFO - 2026-03-01 20:29:21 --> [REQ_ID=d41cc9e531b1] [MEMORY][controller-start] 6291456
INFO - 2026-03-01 20:29:21 --> [REQ_ID=d41cc9e531b1] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-01 20:29:21 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-01 20:29:21 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-03-01 20:29:21 --> [REQ_ID=d41cc9e531b1] [VIEW_RENDER] themes/public/home
INFO - 2026-03-01 20:29:21 --> [REQ_ID=d41cc9e531b1] [MEMORY][commonData:start] 10485760
INFO - 2026-03-01 20:29:21 --> themesMemory usage: 10485760
DEBUG - 2026-03-01 20:29:21 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-01 20:29:21 --> [REQ_ID=3ae866c99cbb] [FILTER_AFTER]
DEBUG - 2026-03-01 20:29:21 --> [REQ_ID=3ae866c99cbb] [LIFECYCLE][END] status=200 duration_ms=598.20 memory_delta=4194304
INFO - 2026-03-01 20:29:21 --> [REQ_ID=d41cc9e531b1] [PERF] Execution time=0.596103
DEBUG - 2026-03-01 20:29:21 --> [REQ_ID=3ae866c99cbb] [REQUEST][END]
INFO - 2026-03-01 20:29:21 --> [REQ_ID=3ae866c99cbb] [PERF] Execution time=0.637697
INFO - 2026-03-01 20:30:01 --> [spark:ops:work] Started
INFO - 2026-03-01 20:30:01 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-03-01 20:30:01 --> [SPARK_MEMORY] 16777216
INFO - 2026-03-01 20:30:01 --> [spark:ops:work] Intent
INFO - 2026-03-01 20:30:01 --> [spark:ops:work] Completed
INFO - 2026-03-01 20:30:01 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.018312
INFO - 2026-03-01 20:30:01 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-03-01 20:31:22 --> [REQ_ID=b558af2f0184] [REQUEST][START] HEAD /
DEBUG - 2026-03-01 20:31:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-01 20:31:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-01 20:31:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-01 20:31:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-01 20:31:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-01 20:32:45 --> [REQ_ID=cda7ac572606] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-01 20:32:45 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-01 20:32:45 --> [REQ_ID=cda7ac572606] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-01 20:32:45 --> [REQ_ID=cda7ac572606] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-01 20:32:45 --> [REQ_ID=cda7ac572606] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-01 20:32:45 --> [CSRF] token name=csrf_test_name hash=043f30973a5ea380668d33a2576f74e6
DEBUG - 2026-03-01 20:32:45 --> [REQ_ID=6e9863ab7d1f] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-01 20:32:45 --> [REQ_ID=6e9863ab7d1f] [MEMORY][controller-start] 6291456
DEBUG - 2026-03-01 20:32:45 --> [REQ_ID=cda7ac572606] [FILTER_AFTER]
DEBUG - 2026-03-01 20:32:45 --> [REQ_ID=cda7ac572606] [LIFECYCLE][END] status=200 duration_ms=66.05 memory_delta=0
INFO - 2026-03-01 20:32:45 --> [REQ_ID=6e9863ab7d1f] [PERF] Execution time=0.063648
DEBUG - 2026-03-01 20:32:45 --> [REQ_ID=cda7ac572606] [REQUEST][END]
INFO - 2026-03-01 20:32:45 --> [REQ_ID=cda7ac572606] [PERF] Execution time=0.110856
DEBUG - 2026-03-01 20:36:22 --> [REQ_ID=bd8743035385] [REQUEST][START] HEAD /
DEBUG - 2026-03-01 20:36:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-01 20:36:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-01 20:36:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-01 20:36:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-01 20:36:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-01 20:41:22 --> [REQ_ID=7d3f0ff832e9] [REQUEST][START] HEAD /
DEBUG - 2026-03-01 20:41:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-01 20:41:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-01 20:41:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-01 20:41:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-01 20:41:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-01 20:42:25 --> [REQ_ID=512f1e71ce2e] [REQUEST][START] GET /index.php/Management/Marketing/Post-Creator
DEBUG - 2026-03-01 20:42:25 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-01 20:42:25 --> [REQ_ID=512f1e71ce2e] [FILTER_BEFORE] /index.php/Management/Marketing/Post-Creator
DEBUG - 2026-03-01 20:42:25 --> [REQ_ID=512f1e71ce2e] [ROUTE] Controller=\App\Modules\Management\Controllers\MarketingAdminController Method=postCreator
DEBUG - 2026-03-01 20:42:25 --> [REQ_ID=512f1e71ce2e] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Management/Marketing/Post-Creator
DEBUG - 2026-03-01 20:42:25 --> [CSRF] token name=csrf_test_name hash=90de3fd2ce1510a4b328555d80c9e2da
DEBUG - 2026-03-01 20:42:25 --> [REQ_ID=512f1e71ce2e] [REQUEST][END]
INFO - 2026-03-01 20:42:25 --> [REQ_ID=512f1e71ce2e] [PERF] Execution time=0.034706
DEBUG - 2026-03-01 20:42:29 --> [REQ_ID=29c981719603] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-01 20:42:29 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-01 20:42:29 --> [REQ_ID=29c981719603] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-01 20:42:29 --> [REQ_ID=29c981719603] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-01 20:42:29 --> [REQ_ID=29c981719603] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-01 20:42:29 --> [CSRF] token name=csrf_test_name hash=2cc562670e4d752d96f0eeff1b719a66
DEBUG - 2026-03-01 20:42:29 --> [REQ_ID=3696a85b0d25] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-01 20:42:29 --> [REQ_ID=3696a85b0d25] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-01 20:42:29 --> [REQ_ID=29c981719603] [FILTER_AFTER]
DEBUG - 2026-03-01 20:42:29 --> [REQ_ID=29c981719603] [LIFECYCLE][END] status=200 duration_ms=30.69 memory_delta=0
INFO - 2026-03-01 20:42:29 --> [REQ_ID=3696a85b0d25] [PERF] Execution time=0.030434
DEBUG - 2026-03-01 20:42:29 --> [REQ_ID=29c981719603] [REQUEST][END]
INFO - 2026-03-01 20:42:29 --> [REQ_ID=29c981719603] [PERF] Execution time=0.215412
DEBUG - 2026-03-01 20:43:29 --> [REQ_ID=61f8bb0d3da4] [REQUEST][START] GET /index.php/Management/Marketing/Content/Listing
DEBUG - 2026-03-01 20:43:29 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-01 20:43:29 --> [REQ_ID=61f8bb0d3da4] [FILTER_BEFORE] /index.php/Management/Marketing/Content/Listing
DEBUG - 2026-03-01 20:43:29 --> [REQ_ID=61f8bb0d3da4] [ROUTE] Controller=\App\Modules\Management\Controllers\MarketingAdminController Method=contentListing
DEBUG - 2026-03-01 20:43:29 --> [REQ_ID=61f8bb0d3da4] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Management/Marketing/Content/Listing
DEBUG - 2026-03-01 20:43:29 --> [CSRF] token name=csrf_test_name hash=155425c1fd621d502729babea4a0761b
DEBUG - 2026-03-01 20:43:29 --> [REQ_ID=61f8bb0d3da4] [REQUEST][END]
INFO - 2026-03-01 20:43:29 --> [REQ_ID=61f8bb0d3da4] [PERF] Execution time=0.011686
DEBUG - 2026-03-01 20:43:31 --> [REQ_ID=716460995d32] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-01 20:43:31 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-01 20:43:31 --> [REQ_ID=716460995d32] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-01 20:43:31 --> [REQ_ID=716460995d32] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-01 20:43:31 --> [REQ_ID=716460995d32] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-01 20:43:31 --> [CSRF] token name=csrf_test_name hash=c43dfce24c0d4381a30d01e81646f785
DEBUG - 2026-03-01 20:43:31 --> [REQ_ID=dca56d400d20] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-01 20:43:31 --> [REQ_ID=dca56d400d20] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-01 20:43:31 --> [REQ_ID=716460995d32] [FILTER_AFTER]
DEBUG - 2026-03-01 20:43:31 --> [REQ_ID=716460995d32] [LIFECYCLE][END] status=200 duration_ms=18.57 memory_delta=0
INFO - 2026-03-01 20:43:31 --> [REQ_ID=dca56d400d20] [PERF] Execution time=0.018088
DEBUG - 2026-03-01 20:43:31 --> [REQ_ID=716460995d32] [REQUEST][END]
INFO - 2026-03-01 20:43:31 --> [REQ_ID=716460995d32] [PERF] Execution time=0.028396
DEBUG - 2026-03-01 20:44:51 --> [REQ_ID=6c659f07e2fc] [REQUEST][START] GET /index.php
DEBUG - 2026-03-01 20:44:51 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-01 20:44:51 --> [REQ_ID=6c659f07e2fc] [FILTER_BEFORE] /index.php
DEBUG - 2026-03-01 20:44:51 --> [REQ_ID=6c659f07e2fc] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-01 20:44:51 --> [REQ_ID=6c659f07e2fc] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-01 20:44:51 --> [CSRF] token name=csrf_test_name hash=7157ca1fcb3f9e17ca1ff80c8262eea9
DEBUG - 2026-03-01 20:44:51 --> [REQ_ID=c1441f967f41] [INIT] App\Controllers\Home::GET
INFO - 2026-03-01 20:44:51 --> [REQ_ID=c1441f967f41] [MEMORY][controller-start] 6291456
INFO - 2026-03-01 20:44:51 --> [REQ_ID=c1441f967f41] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-01 20:44:51 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-01 20:44:52 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-03-01 20:44:52 --> [REQ_ID=c1441f967f41] [VIEW_RENDER] themes/public/home
INFO - 2026-03-01 20:44:52 --> [REQ_ID=c1441f967f41] [MEMORY][commonData:start] 10485760
INFO - 2026-03-01 20:44:52 --> themesMemory usage: 10485760
DEBUG - 2026-03-01 20:44:52 --> [MetaService] slug= pageName=Home cacheHit= path=DB
DEBUG - 2026-03-01 20:44:52 --> [REQ_ID=6c659f07e2fc] [FILTER_AFTER]
DEBUG - 2026-03-01 20:44:52 --> [REQ_ID=6c659f07e2fc] [LIFECYCLE][END] status=200 duration_ms=604.23 memory_delta=4194304
INFO - 2026-03-01 20:44:52 --> [REQ_ID=c1441f967f41] [PERF] Execution time=0.600249
DEBUG - 2026-03-01 20:44:52 --> [REQ_ID=6c659f07e2fc] [REQUEST][END]
INFO - 2026-03-01 20:44:52 --> [REQ_ID=6c659f07e2fc] [PERF] Execution time=0.656141
INFO - 2026-03-01 20:45:02 --> [spark:ops:work] Started
INFO - 2026-03-01 20:45:02 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-03-01 20:45:02 --> [SPARK_MEMORY] 16777216
INFO - 2026-03-01 20:45:02 --> [spark:ops:work] Intent
INFO - 2026-03-01 20:45:02 --> [spark:ops:work] Completed
INFO - 2026-03-01 20:45:02 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.053470
INFO - 2026-03-01 20:45:02 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-03-01 20:46:22 --> [REQ_ID=10704ef4d6ee] [REQUEST][START] HEAD /
DEBUG - 2026-03-01 20:46:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-01 20:46:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-01 20:46:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-01 20:46:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-01 20:46:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-01 20:51:20 --> [REQ_ID=0020de0611db] [REQUEST][START] GET /
DEBUG - 2026-03-01 20:51:20 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-01 20:51:20 --> [REQ_ID=0020de0611db] [FILTER_BEFORE] /
DEBUG - 2026-03-01 20:51:20 --> [REQ_ID=0020de0611db] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-01 20:51:20 --> [REQ_ID=0020de0611db] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-01 20:51:20 --> [CSRF] token name=csrf_test_name hash=dc4914a13dbc7242bfd1e4ff511a0b0b
DEBUG - 2026-03-01 20:51:20 --> [REQ_ID=7151e0858d6b] [INIT] App\Controllers\Home::GET
INFO - 2026-03-01 20:51:20 --> [REQ_ID=7151e0858d6b] [MEMORY][controller-start] 6291456
INFO - 2026-03-01 20:51:20 --> [REQ_ID=7151e0858d6b] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-01 20:51:20 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-01 20:51:20 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
DEBUG - 2026-03-01 20:51:20 --> [REQ_ID=7151e0858d6b] [VIEW_RENDER] themes/public/home
INFO - 2026-03-01 20:51:20 --> [REQ_ID=7151e0858d6b] [MEMORY][commonData:start] 10485760
INFO - 2026-03-01 20:51:20 --> themesMemory usage: 10485760
DEBUG - 2026-03-01 20:51:20 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-01 20:51:20 --> [REQ_ID=0020de0611db] [FILTER_AFTER]
DEBUG - 2026-03-01 20:51:20 --> [REQ_ID=0020de0611db] [LIFECYCLE][END] status=200 duration_ms=499.46 memory_delta=4194304
INFO - 2026-03-01 20:51:20 --> [REQ_ID=7151e0858d6b] [PERF] Execution time=0.497499
DEBUG - 2026-03-01 20:51:20 --> [REQ_ID=0020de0611db] [REQUEST][END]
INFO - 2026-03-01 20:51:20 --> [REQ_ID=0020de0611db] [PERF] Execution time=0.540334
DEBUG - 2026-03-01 20:51:21 --> [REQ_ID=81079c9bc32e] [REQUEST][START] GET /
DEBUG - 2026-03-01 20:51:21 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-01 20:51:21 --> [REQ_ID=81079c9bc32e] [FILTER_BEFORE] /
DEBUG - 2026-03-01 20:51:21 --> [REQ_ID=81079c9bc32e] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-01 20:51:21 --> [REQ_ID=81079c9bc32e] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-01 20:51:21 --> [CSRF] token name=csrf_test_name hash=dc4914a13dbc7242bfd1e4ff511a0b0b
DEBUG - 2026-03-01 20:51:21 --> [REQ_ID=a13f07866df1] [INIT] App\Controllers\Home::GET
INFO - 2026-03-01 20:51:21 --> [REQ_ID=a13f07866df1] [MEMORY][controller-start] 6291456
INFO - 2026-03-01 20:51:21 --> [REQ_ID=a13f07866df1] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-01 20:51:21 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-01 20:51:21 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
DEBUG - 2026-03-01 20:51:21 --> [REQ_ID=a13f07866df1] [VIEW_RENDER] themes/public/home
INFO - 2026-03-01 20:51:21 --> [REQ_ID=a13f07866df1] [MEMORY][commonData:start] 8388608
INFO - 2026-03-01 20:51:21 --> themesMemory usage: 8388608
DEBUG - 2026-03-01 20:51:21 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-01 20:51:21 --> [REQ_ID=81079c9bc32e] [FILTER_AFTER]
DEBUG - 2026-03-01 20:51:21 --> [REQ_ID=81079c9bc32e] [LIFECYCLE][END] status=200 duration_ms=503.70 memory_delta=2097152
INFO - 2026-03-01 20:51:21 --> [REQ_ID=a13f07866df1] [PERF] Execution time=0.503103
DEBUG - 2026-03-01 20:51:21 --> [REQ_ID=81079c9bc32e] [REQUEST][END]
INFO - 2026-03-01 20:51:21 --> [REQ_ID=81079c9bc32e] [PERF] Execution time=0.513314
DEBUG - 2026-03-01 20:51:22 --> [REQ_ID=cfffd86dea5c] [REQUEST][START] HEAD /
DEBUG - 2026-03-01 20:51:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-01 20:51:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-01 20:51:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-01 20:51:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-01 20:51:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-01 20:52:51 --> [REQ_ID=cce3d28ae04c] [REQUEST][START] GET /index.php/Management/Services
DEBUG - 2026-03-01 20:52:51 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-01 20:52:51 --> [REQ_ID=cce3d28ae04c] [FILTER_BEFORE] /index.php/Management/Services
DEBUG - 2026-03-01 20:52:51 --> [REQ_ID=cce3d28ae04c] [ROUTE] Controller=\App\Modules\Management\Controllers\ServicesController Method=index
DEBUG - 2026-03-01 20:52:51 --> [REQ_ID=cce3d28ae04c] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Management/Services
DEBUG - 2026-03-01 20:52:51 --> [CSRF] token name=csrf_test_name hash=88deecbd5f5efdfdd2afad73806039d3
DEBUG - 2026-03-01 20:52:51 --> [REQ_ID=cce3d28ae04c] [REQUEST][END]
INFO - 2026-03-01 20:52:51 --> [REQ_ID=cce3d28ae04c] [PERF] Execution time=0.050543
DEBUG - 2026-03-01 20:52:53 --> [REQ_ID=6359a10c963f] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-01 20:52:53 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-01 20:52:53 --> [REQ_ID=6359a10c963f] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-01 20:52:53 --> [REQ_ID=6359a10c963f] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-01 20:52:53 --> [REQ_ID=6359a10c963f] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-01 20:52:53 --> [CSRF] token name=csrf_test_name hash=9148fa6758e2bd716857766aa99dc42f
DEBUG - 2026-03-01 20:52:53 --> [REQ_ID=e5fc67da9966] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-01 20:52:53 --> [REQ_ID=e5fc67da9966] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-01 20:52:54 --> [REQ_ID=6359a10c963f] [FILTER_AFTER]
DEBUG - 2026-03-01 20:52:54 --> [REQ_ID=6359a10c963f] [LIFECYCLE][END] status=200 duration_ms=206.64 memory_delta=0
INFO - 2026-03-01 20:52:54 --> [REQ_ID=e5fc67da9966] [PERF] Execution time=0.206568
DEBUG - 2026-03-01 20:52:54 --> [REQ_ID=6359a10c963f] [REQUEST][END]
INFO - 2026-03-01 20:52:54 --> [REQ_ID=6359a10c963f] [PERF] Execution time=0.222906
DEBUG - 2026-03-01 20:56:22 --> [REQ_ID=c2adab81660f] [REQUEST][START] HEAD /
DEBUG - 2026-03-01 20:56:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-01 20:56:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-01 20:56:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-01 20:56:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-01 20:56:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
INFO - 2026-03-01 21:00:01 --> [spark:ops:work] Started
INFO - 2026-03-01 21:00:01 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-03-01 21:00:01 --> [SPARK_MEMORY] 16777216
INFO - 2026-03-01 21:00:01 --> [spark:ops:work] Intent
DEBUG - 2026-03-01 21:00:01 --> [REQ_ID=39e4e131d71d] [REQUEST][START] GET /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-01 21:00:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-01 21:00:01 --> [REQ_ID=39e4e131d71d] [FILTER_BEFORE] /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-01 21:00:01 --> [REQ_ID=39e4e131d71d] [ROUTE] Controller=\App\Modules\Management\Controllers\ManagementAPIController Method=Run_CRON_Tasks
DEBUG - 2026-03-01 21:00:01 --> [REQ_ID=39e4e131d71d] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-01 21:00:01 --> [REQ_ID=39e4e131d71d] [REQUEST][END]
INFO - 2026-03-01 21:00:01 --> [REQ_ID=39e4e131d71d] [PERF] Execution time=0.050612
INFO - 2026-03-01 21:00:01 --> [spark:ops:work] Completed
INFO - 2026-03-01 21:00:01 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.182201
INFO - 2026-03-01 21:00:01 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-03-01 21:00:42 --> [REQ_ID=5124bb8082ac] [REQUEST][START] GET /index.php/Management/Assets
DEBUG - 2026-03-01 21:00:42 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-01 21:00:42 --> [REQ_ID=5124bb8082ac] [FILTER_BEFORE] /index.php/Management/Assets
DEBUG - 2026-03-01 21:00:42 --> [REQ_ID=5124bb8082ac] [ROUTE] Controller=\App\Modules\Management\Controllers\AssetsAdminController Method=index
DEBUG - 2026-03-01 21:00:42 --> [REQ_ID=5124bb8082ac] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Management/Assets
DEBUG - 2026-03-01 21:00:42 --> [CSRF] token name=csrf_test_name hash=4ef0bddb6fcbbc211c1cd09b716459f8
DEBUG - 2026-03-01 21:00:42 --> [REQ_ID=5124bb8082ac] [REQUEST][END]
INFO - 2026-03-01 21:00:42 --> [REQ_ID=5124bb8082ac] [PERF] Execution time=0.026908
DEBUG - 2026-03-01 21:00:44 --> [REQ_ID=9311bd8d217d] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-01 21:00:44 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-01 21:00:44 --> [REQ_ID=9311bd8d217d] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-01 21:00:44 --> [REQ_ID=9311bd8d217d] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-01 21:00:44 --> [REQ_ID=9311bd8d217d] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-01 21:00:44 --> [CSRF] token name=csrf_test_name hash=fb46ab36b8d50756de6a8838c040b167
DEBUG - 2026-03-01 21:00:44 --> [REQ_ID=ba803ba49a41] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-01 21:00:44 --> [REQ_ID=ba803ba49a41] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-01 21:00:44 --> [REQ_ID=9311bd8d217d] [FILTER_AFTER]
DEBUG - 2026-03-01 21:00:44 --> [REQ_ID=9311bd8d217d] [LIFECYCLE][END] status=200 duration_ms=271.46 memory_delta=0
INFO - 2026-03-01 21:00:44 --> [REQ_ID=ba803ba49a41] [PERF] Execution time=0.270102
DEBUG - 2026-03-01 21:00:44 --> [REQ_ID=9311bd8d217d] [REQUEST][END]
INFO - 2026-03-01 21:00:44 --> [REQ_ID=9311bd8d217d] [PERF] Execution time=0.283499
DEBUG - 2026-03-01 21:01:22 --> [REQ_ID=666d17678eef] [REQUEST][START] HEAD /
DEBUG - 2026-03-01 21:01:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-01 21:01:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-01 21:01:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-01 21:01:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-01 21:01:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-01 21:02:07 --> [REQ_ID=0e856e6f9b2b] [REQUEST][START] GET /index.php/Blog/Personal-Budgeting/The-Importance-of-Personal-Financial-Budgeting
DEBUG - 2026-03-01 21:02:07 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-01 21:02:07 --> [REQ_ID=0e856e6f9b2b] [FILTER_BEFORE] /index.php/Blog/Personal-Budgeting/The-Importance-of-Personal-Financial-Budgeting
DEBUG - 2026-03-01 21:02:07 --> [REQ_ID=0e856e6f9b2b] [ROUTE] Controller=\App\Modules\Blog\Controllers\PersonalBudgetingController Method=TheImportanceOfPersonalFinancialBudgeting
DEBUG - 2026-03-01 21:02:07 --> [REQ_ID=0e856e6f9b2b] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Blog/Personal-Budgeting/The-Importance-of-Personal-Financial-Budgeting
DEBUG - 2026-03-01 21:02:07 --> [CSRF] token name=csrf_test_name hash=923dc99bdbb720e4de35a3182bc728f0
DEBUG - 2026-03-01 21:02:07 --> [REQ_ID=42e809850383] [INIT] App\Modules\Blog\Controllers\PersonalBudgetingController::GET
INFO - 2026-03-01 21:02:07 --> [REQ_ID=42e809850383] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-01 21:02:07 --> [REQ_ID=42e809850383] [METHOD_ENTRY] TheImportanceOfPersonalFinancialBudgeting
DEBUG - 2026-03-01 21:02:07 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-01 21:02:07 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-01 21:02:07 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-01 21:02:07 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-01 21:02:07 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-01 21:02:07 --> MyMICoin: guest context detected; skipping user-specific preload.
INFO - 2026-03-01 21:02:07 --> [REQ_ID=42e809850383] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-01 21:02:07 --> [REQ_ID=42e809850383] [VIEW_RENDER] App\Modules\Blog\Views\PersonalBudgeting\Importance_Of_Personal_Financial_Budgeting
INFO - 2026-03-01 21:02:07 --> [REQ_ID=42e809850383] [MEMORY][commonData:start] 8388608
INFO - 2026-03-01 21:02:08 --> themesMemory usage: 12582912
DEBUG - 2026-03-01 21:02:08 --> [REQ_ID=0e856e6f9b2b] [FILTER_AFTER]
DEBUG - 2026-03-01 21:02:08 --> [REQ_ID=0e856e6f9b2b] [LIFECYCLE][END] status=200 duration_ms=1,162.26 memory_delta=8388608
INFO - 2026-03-01 21:02:08 --> [REQ_ID=42e809850383] [PERF] Execution time=1.161589
DEBUG - 2026-03-01 21:02:08 --> [REQ_ID=0e856e6f9b2b] [REQUEST][END]
INFO - 2026-03-01 21:02:08 --> [REQ_ID=0e856e6f9b2b] [PERF] Execution time=1.172644
DEBUG - 2026-03-01 21:06:22 --> [REQ_ID=a165b22e8865] [REQUEST][START] HEAD /
DEBUG - 2026-03-01 21:06:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-01 21:06:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-01 21:06:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-01 21:06:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-01 21:06:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-01 21:11:22 --> [REQ_ID=d985e1160caa] [REQUEST][START] HEAD /
DEBUG - 2026-03-01 21:11:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-01 21:11:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-01 21:11:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-01 21:11:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-01 21:11:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
INFO - 2026-03-01 21:15:01 --> [spark:ops:work] Started
INFO - 2026-03-01 21:15:01 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-03-01 21:15:01 --> [SPARK_MEMORY] 16777216
INFO - 2026-03-01 21:15:01 --> [spark:ops:work] Intent
INFO - 2026-03-01 21:15:01 --> [spark:ops:work] Completed
INFO - 2026-03-01 21:15:01 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.030158
INFO - 2026-03-01 21:15:01 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-03-01 21:15:01 --> [REQ_ID=81d09601d0b4] [REQUEST][START] GET /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-01 21:15:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-01 21:15:01 --> [REQ_ID=81d09601d0b4] [FILTER_BEFORE] /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-01 21:15:01 --> [REQ_ID=81d09601d0b4] [ROUTE] Controller=\App\Modules\APIs\Controllers\AlertsAPIController Method=fetchEmailAlerts
DEBUG - 2026-03-01 21:15:01 --> [REQ_ID=81d09601d0b4] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-01 21:15:01 --> [REQ_ID=81d09601d0b4] [REQUEST][END]
INFO - 2026-03-01 21:15:01 --> [REQ_ID=81d09601d0b4] [PERF] Execution time=0.063658
DEBUG - 2026-03-01 21:16:22 --> [REQ_ID=60506fe1007e] [REQUEST][START] HEAD /
DEBUG - 2026-03-01 21:16:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-01 21:16:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-01 21:16:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-01 21:16:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-01 21:16:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-01 21:21:22 --> [REQ_ID=601ef4fbe174] [REQUEST][START] HEAD /
DEBUG - 2026-03-01 21:21:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-01 21:21:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-01 21:21:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-01 21:21:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-01 21:21:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-01 21:26:22 --> [REQ_ID=cbdd7d2f576e] [REQUEST][START] HEAD /
DEBUG - 2026-03-01 21:26:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-01 21:26:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-01 21:26:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-01 21:26:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-01 21:26:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-01 21:26:55 --> [REQ_ID=13a94b9aef1c] [REQUEST][START] GET /index.php/Wallets/Purchase/Memberships
DEBUG - 2026-03-01 21:26:55 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-01 21:26:55 --> [REQ_ID=13a94b9aef1c] [FILTER_BEFORE] /index.php/Wallets/Purchase/Memberships
DEBUG - 2026-03-01 21:26:55 --> [REQ_ID=13a94b9aef1c] [ROUTE] Controller=\App\Modules\User\Controllers\WalletsController Method=purchase
DEBUG - 2026-03-01 21:26:55 --> [REQ_ID=13a94b9aef1c] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Wallets/Purchase/Memberships
DEBUG - 2026-03-01 21:26:55 --> [CSRF] token name=csrf_test_name hash=0f70e73b02dc384f41b9b7e67f679eaf
DEBUG - 2026-03-01 21:26:55 --> [REQ_ID=13a94b9aef1c] [REQUEST][END]
INFO - 2026-03-01 21:26:55 --> [REQ_ID=13a94b9aef1c] [PERF] Execution time=0.034079
DEBUG - 2026-03-01 21:26:55 --> [REQ_ID=0d39b24ee5fc] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-01 21:26:55 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-01 21:26:55 --> [REQ_ID=0d39b24ee5fc] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-01 21:26:55 --> [REQ_ID=0d39b24ee5fc] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-01 21:26:55 --> [REQ_ID=0d39b24ee5fc] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-01 21:26:55 --> [CSRF] token name=csrf_test_name hash=64b3f24632a6f576a4cdded60a9b1948
DEBUG - 2026-03-01 21:26:55 --> [REQ_ID=360e03a74456] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-01 21:26:55 --> [REQ_ID=360e03a74456] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-01 21:26:56 --> [REQ_ID=0d39b24ee5fc] [FILTER_AFTER]
DEBUG - 2026-03-01 21:26:56 --> [REQ_ID=0d39b24ee5fc] [LIFECYCLE][END] status=200 duration_ms=93.63 memory_delta=0
INFO - 2026-03-01 21:26:56 --> [REQ_ID=360e03a74456] [PERF] Execution time=0.092542
DEBUG - 2026-03-01 21:26:56 --> [REQ_ID=0d39b24ee5fc] [REQUEST][END]
INFO - 2026-03-01 21:26:56 --> [REQ_ID=0d39b24ee5fc] [PERF] Execution time=0.105949
DEBUG - 2026-03-01 21:28:21 --> [REQ_ID=c0cff9c83544] [REQUEST][START] GET /index.php/Management/Services
DEBUG - 2026-03-01 21:28:21 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-01 21:28:21 --> [REQ_ID=c0cff9c83544] [FILTER_BEFORE] /index.php/Management/Services
DEBUG - 2026-03-01 21:28:21 --> [REQ_ID=c0cff9c83544] [ROUTE] Controller=\App\Modules\Management\Controllers\ServicesController Method=index
DEBUG - 2026-03-01 21:28:21 --> [REQ_ID=c0cff9c83544] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Management/Services
DEBUG - 2026-03-01 21:28:21 --> [CSRF] token name=csrf_test_name hash=7731f048bb68d7fdb114e57d6977ea66
DEBUG - 2026-03-01 21:28:21 --> [REQ_ID=c0cff9c83544] [REQUEST][END]
INFO - 2026-03-01 21:28:21 --> [REQ_ID=c0cff9c83544] [PERF] Execution time=0.048507
DEBUG - 2026-03-01 21:28:23 --> [REQ_ID=3ac6760d90d0] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-01 21:28:23 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-01 21:28:23 --> [REQ_ID=3ac6760d90d0] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-01 21:28:23 --> [REQ_ID=3ac6760d90d0] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-01 21:28:23 --> [REQ_ID=3ac6760d90d0] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-01 21:28:23 --> [CSRF] token name=csrf_test_name hash=a4334e2aa5e536b18ced219146a4fb89
DEBUG - 2026-03-01 21:28:23 --> [REQ_ID=1f1ba64adda6] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-01 21:28:23 --> [REQ_ID=1f1ba64adda6] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-01 21:28:23 --> [REQ_ID=3ac6760d90d0] [FILTER_AFTER]
DEBUG - 2026-03-01 21:28:23 --> [REQ_ID=3ac6760d90d0] [LIFECYCLE][END] status=200 duration_ms=370.34 memory_delta=0
INFO - 2026-03-01 21:28:23 --> [REQ_ID=1f1ba64adda6] [PERF] Execution time=0.369143
DEBUG - 2026-03-01 21:28:23 --> [REQ_ID=3ac6760d90d0] [REQUEST][END]
INFO - 2026-03-01 21:28:23 --> [REQ_ID=3ac6760d90d0] [PERF] Execution time=0.385148
INFO - 2026-03-01 21:30:01 --> [spark:ops:work] Started
INFO - 2026-03-01 21:30:01 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-03-01 21:30:01 --> [SPARK_MEMORY] 16777216
INFO - 2026-03-01 21:30:01 --> [spark:ops:work] Intent
INFO - 2026-03-01 21:30:01 --> [spark:ops:work] Completed
INFO - 2026-03-01 21:30:01 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.055830
INFO - 2026-03-01 21:30:01 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-03-01 21:30:03 --> [REQ_ID=fbeb3ceaf137] [REQUEST][START] GET /index.php/Sector/Technology
DEBUG - 2026-03-01 21:30:03 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-01 21:30:03 --> [REQ_ID=fbeb3ceaf137] [FILTER_BEFORE] /index.php/Sector/Technology
DEBUG - 2026-03-01 21:30:03 --> [REQ_ID=fbeb3ceaf137] [ROUTE] Controller=\App\Controllers\Home Method=sector
DEBUG - 2026-03-01 21:30:03 --> [REQ_ID=fbeb3ceaf137] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Sector/Technology
DEBUG - 2026-03-01 21:30:03 --> [CSRF] token name=csrf_test_name hash=e93ca0e1e0f4b8123d65fff67c26a87c
DEBUG - 2026-03-01 21:30:03 --> [REQ_ID=fbeb3ceaf137] [REQUEST][END]
INFO - 2026-03-01 21:30:03 --> [REQ_ID=fbeb3ceaf137] [PERF] Execution time=0.013119
DEBUG - 2026-03-01 21:30:04 --> [REQ_ID=120961b9441d] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-01 21:30:04 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-01 21:30:04 --> [REQ_ID=120961b9441d] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-01 21:30:04 --> [REQ_ID=120961b9441d] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-01 21:30:04 --> [REQ_ID=120961b9441d] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-01 21:30:04 --> [CSRF] token name=csrf_test_name hash=319c53d7bac58cb83e9121c3754ba7b4
DEBUG - 2026-03-01 21:30:04 --> [REQ_ID=6eb2244be635] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-01 21:30:04 --> [REQ_ID=6eb2244be635] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-01 21:30:04 --> [REQ_ID=120961b9441d] [FILTER_AFTER]
DEBUG - 2026-03-01 21:30:04 --> [REQ_ID=120961b9441d] [LIFECYCLE][END] status=200 duration_ms=18.65 memory_delta=0
INFO - 2026-03-01 21:30:04 --> [REQ_ID=6eb2244be635] [PERF] Execution time=0.018404
DEBUG - 2026-03-01 21:30:04 --> [REQ_ID=120961b9441d] [REQUEST][END]
INFO - 2026-03-01 21:30:04 --> [REQ_ID=120961b9441d] [PERF] Execution time=0.027254
DEBUG - 2026-03-01 21:30:48 --> [REQ_ID=f0b02a9029b9] [REQUEST][START] GET /index.php
DEBUG - 2026-03-01 21:30:48 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-01 21:30:48 --> [REQ_ID=f0b02a9029b9] [FILTER_BEFORE] /index.php
DEBUG - 2026-03-01 21:30:48 --> [REQ_ID=f0b02a9029b9] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-01 21:30:48 --> [REQ_ID=f0b02a9029b9] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-01 21:30:48 --> [CSRF] token name=csrf_test_name hash=28262d9ddfee8553f318249b2fa0c160
DEBUG - 2026-03-01 21:30:48 --> [REQ_ID=4a05a13649ea] [INIT] App\Controllers\Home::GET
INFO - 2026-03-01 21:30:48 --> [REQ_ID=4a05a13649ea] [MEMORY][controller-start] 4194304
INFO - 2026-03-01 21:30:48 --> [REQ_ID=4a05a13649ea] [MEMORY][commonData:start] 4194304
DEBUG - 2026-03-01 21:30:48 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-01 21:30:48 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-03-01 21:30:48 --> [REQ_ID=4a05a13649ea] [VIEW_RENDER] themes/public/home
INFO - 2026-03-01 21:30:48 --> [REQ_ID=4a05a13649ea] [MEMORY][commonData:start] 8388608
INFO - 2026-03-01 21:30:48 --> themesMemory usage: 8388608
DEBUG - 2026-03-01 21:30:48 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-01 21:30:48 --> [REQ_ID=f0b02a9029b9] [FILTER_AFTER]
DEBUG - 2026-03-01 21:30:48 --> [REQ_ID=f0b02a9029b9] [LIFECYCLE][END] status=200 duration_ms=772.47 memory_delta=4194304
INFO - 2026-03-01 21:30:48 --> [REQ_ID=4a05a13649ea] [PERF] Execution time=0.772195
DEBUG - 2026-03-01 21:30:48 --> [REQ_ID=f0b02a9029b9] [REQUEST][END]
INFO - 2026-03-01 21:30:48 --> [REQ_ID=f0b02a9029b9] [PERF] Execution time=0.782529
DEBUG - 2026-03-01 21:31:22 --> [REQ_ID=2cc6bd3f74b9] [REQUEST][START] HEAD /
DEBUG - 2026-03-01 21:31:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-01 21:31:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-01 21:31:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-01 21:31:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-01 21:31:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-01 21:36:22 --> [REQ_ID=ff325ca94cfe] [REQUEST][START] HEAD /
DEBUG - 2026-03-01 21:36:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-01 21:36:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-01 21:36:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-01 21:36:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-01 21:36:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-01 21:38:56 --> [REQ_ID=cf028fdf0d45] [REQUEST][START] GET /
DEBUG - 2026-03-01 21:38:56 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-01 21:38:56 --> [REQ_ID=cf028fdf0d45] [FILTER_BEFORE] /
DEBUG - 2026-03-01 21:38:56 --> [REQ_ID=cf028fdf0d45] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-01 21:38:56 --> [REQ_ID=cf028fdf0d45] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-01 21:38:56 --> [CSRF] token name=csrf_test_name hash=f4eb838843f36c8d312d735586d2b4e6
DEBUG - 2026-03-01 21:38:56 --> [REQ_ID=71a126aa23ab] [INIT] App\Controllers\Home::GET
INFO - 2026-03-01 21:38:56 --> [REQ_ID=71a126aa23ab] [MEMORY][controller-start] 6291456
INFO - 2026-03-01 21:38:57 --> [REQ_ID=71a126aa23ab] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-01 21:38:57 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-01 21:38:57 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
DEBUG - 2026-03-01 21:38:57 --> [REQ_ID=71a126aa23ab] [VIEW_RENDER] themes/public/home
INFO - 2026-03-01 21:38:57 --> [REQ_ID=71a126aa23ab] [MEMORY][commonData:start] 10485760
INFO - 2026-03-01 21:38:57 --> themesMemory usage: 10485760
DEBUG - 2026-03-01 21:38:57 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-01 21:38:57 --> [REQ_ID=cf028fdf0d45] [FILTER_AFTER]
DEBUG - 2026-03-01 21:38:57 --> [REQ_ID=cf028fdf0d45] [LIFECYCLE][END] status=200 duration_ms=676.18 memory_delta=4194304
INFO - 2026-03-01 21:38:57 --> [REQ_ID=71a126aa23ab] [PERF] Execution time=0.673086
DEBUG - 2026-03-01 21:38:57 --> [REQ_ID=cf028fdf0d45] [REQUEST][END]
INFO - 2026-03-01 21:38:57 --> [REQ_ID=cf028fdf0d45] [PERF] Execution time=0.717731
DEBUG - 2026-03-01 21:41:22 --> [REQ_ID=a868b046d2d2] [REQUEST][START] HEAD /
DEBUG - 2026-03-01 21:41:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-01 21:41:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-01 21:41:23 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-01 21:41:23 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-01 21:41:23 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
INFO - 2026-03-01 21:45:02 --> [spark:ops:work] Started
INFO - 2026-03-01 21:45:02 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-03-01 21:45:02 --> [SPARK_MEMORY] 16777216
INFO - 2026-03-01 21:45:02 --> [spark:ops:work] Intent
INFO - 2026-03-01 21:45:02 --> [spark:ops:work] Completed
INFO - 2026-03-01 21:45:02 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.047354
INFO - 2026-03-01 21:45:02 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-03-01 21:46:22 --> [REQ_ID=d5c96002eace] [REQUEST][START] HEAD /
DEBUG - 2026-03-01 21:46:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-01 21:46:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-01 21:46:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-01 21:46:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-01 21:46:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-01 21:51:22 --> [REQ_ID=1eceda4fc330] [REQUEST][START] HEAD /
DEBUG - 2026-03-01 21:51:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-01 21:51:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-01 21:51:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-01 21:51:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-01 21:51:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-01 21:52:11 --> [REQ_ID=df5dae4e0433] [REQUEST][START] GET /index.php/Wallets/Purchase/Memberships/Basic
DEBUG - 2026-03-01 21:52:11 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-01 21:52:11 --> [REQ_ID=df5dae4e0433] [FILTER_BEFORE] /index.php/Wallets/Purchase/Memberships/Basic
DEBUG - 2026-03-01 21:52:11 --> [REQ_ID=df5dae4e0433] [ROUTE] Controller=\App\Modules\User\Controllers\WalletsController Method=purchase
DEBUG - 2026-03-01 21:52:11 --> [REQ_ID=df5dae4e0433] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Wallets/Purchase/Memberships/Basic
DEBUG - 2026-03-01 21:52:11 --> [CSRF] token name=csrf_test_name hash=8127c6f2f1281f5de224e1709cd3e559
DEBUG - 2026-03-01 21:52:11 --> [REQ_ID=df5dae4e0433] [REQUEST][END]
INFO - 2026-03-01 21:52:11 --> [REQ_ID=df5dae4e0433] [PERF] Execution time=0.034545
DEBUG - 2026-03-01 21:52:12 --> [REQ_ID=93f010159368] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-01 21:52:12 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-01 21:52:12 --> [REQ_ID=93f010159368] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-01 21:52:12 --> [REQ_ID=93f010159368] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-01 21:52:12 --> [REQ_ID=93f010159368] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-01 21:52:12 --> [CSRF] token name=csrf_test_name hash=01d9d209e53fa4a7a6655a142ba9bef0
DEBUG - 2026-03-01 21:52:12 --> [REQ_ID=33255792a613] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-01 21:52:12 --> [REQ_ID=33255792a613] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-01 21:52:12 --> [REQ_ID=93f010159368] [FILTER_AFTER]
DEBUG - 2026-03-01 21:52:12 --> [REQ_ID=93f010159368] [LIFECYCLE][END] status=200 duration_ms=200.45 memory_delta=0
INFO - 2026-03-01 21:52:12 --> [REQ_ID=33255792a613] [PERF] Execution time=0.199361
DEBUG - 2026-03-01 21:52:12 --> [REQ_ID=93f010159368] [REQUEST][END]
INFO - 2026-03-01 21:52:12 --> [REQ_ID=93f010159368] [PERF] Execution time=0.212375
