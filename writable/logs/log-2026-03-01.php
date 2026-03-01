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
