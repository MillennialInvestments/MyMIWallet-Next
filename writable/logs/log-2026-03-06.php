INFO - 2026-03-06 00:00:02 --> [SPARK_START] App\Commands\AIOps\Run
<?php defined('SYSTEMPATH') || exit('No direct script access allowed'); ?>

INFO - 2026-03-06 00:00:02 --> [spark:ops:work] Started
INFO - 2026-03-06 00:00:02 --> [SPARK_MEMORY] 16777216
INFO - 2026-03-06 00:00:02 --> [spark:aiops:run] Intent
INFO - 2026-03-06 00:00:02 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-03-06 00:00:02 --> [SPARK_MEMORY] 16777216
INFO - 2026-03-06 00:00:02 --> [spark:ops:work] Intent
INFO - 2026-03-06 00:00:02 --> [spark:ops:work] Completed
INFO - 2026-03-06 00:00:02 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.063824
INFO - 2026-03-06 00:00:02 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-03-06 00:00:02 --> [REQ_ID=fd6367b2c05c] [REQUEST][START] GET /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-06 00:00:02 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-06 00:00:02 --> [REQ_ID=fd6367b2c05c] [FILTER_BEFORE] /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-06 00:00:02 --> [REQ_ID=fd6367b2c05c] [ROUTE] Controller=\App\Modules\Management\Controllers\ManagementAPIController Method=Run_CRON_Tasks
DEBUG - 2026-03-06 00:00:02 --> [REQ_ID=fd6367b2c05c] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-06 00:00:02 --> [REQ_ID=fd6367b2c05c] [REQUEST][END]
INFO - 2026-03-06 00:00:02 --> [REQ_ID=fd6367b2c05c] [PERF] Execution time=0.096797
INFO - 2026-03-06 00:00:03 --> [AIOPS][SPARK][GOVERNANCE][spark:logs:summarize] Started
INFO - 2026-03-06 00:00:03 --> [SPARK_START] App\Commands\Logs\Summarize
INFO - 2026-03-06 00:00:03 --> [SPARK_MEMORY] 16777216
INFO - 2026-03-06 00:00:03 --> [spark:logs:summarize] Intent
INFO - 2026-03-06 00:00:03 --> [AIOPS][SPARK][GOVERNANCE][spark:logs:summarize] Completed
INFO - 2026-03-06 00:00:03 --> [SPARK_COMPLETE] App\Commands\Logs\Summarize duration=0.001662
INFO - 2026-03-06 00:00:03 --> [SPARK_MEMORY] 16777216
INFO - 2026-03-06 00:00:04 --> [spark:app:healthcheck] Started
INFO - 2026-03-06 00:00:04 --> [SPARK_START] App\Commands\App\Healthcheck
INFO - 2026-03-06 00:00:04 --> [SPARK_MEMORY] 16777216
INFO - 2026-03-06 00:00:04 --> [spark:app:healthcheck] Intent
DEBUG - 2026-03-06 00:00:04 --> LOG_HEALTHCHECK debug marker=8e19ba5aab6b
INFO - 2026-03-06 00:00:04 --> LOG_HEALTHCHECK info marker=8e19ba5aab6b
NOTICE - 2026-03-06 00:00:04 --> LOG_HEALTHCHECK probe marker=8e19ba5aab6b
INFO - 2026-03-06 00:00:04 --> [spark:app:healthcheck] Completed
INFO - 2026-03-06 00:00:04 --> [SPARK_COMPLETE] App\Commands\App\Healthcheck duration=0.022510
INFO - 2026-03-06 00:00:04 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-03-06 00:00:05 --> OllamaPatchRunner:L142 - validateGeneratedPatch Content: 
WARNING - 2026-03-06 00:00:05 --> OllamaPatchRunner:L49 - Original Diff: 
DEBUG - 2026-03-06 00:00:05 --> OllamaPatchRunner:L51 - Retried Diff: 
DEBUG - 2026-03-06 00:00:05 --> OllamaPatchRunner:L142 - validateGeneratedPatch Content: 
DEBUG - 2026-03-06 00:00:05 --> OllamaPatchRunner:L53 - Validating Generated Patch Failed
INFO - 2026-03-06 00:00:05 --> [SPARK_COMPLETE] App\Commands\AIOps\Run duration=3.450319
INFO - 2026-03-06 00:00:05 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-03-06 00:01:20 --> [REQ_ID=f6ecfabafebc] [REQUEST][START] HEAD /
DEBUG - 2026-03-06 00:01:20 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-06 00:01:20 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-06 00:01:20 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-06 00:01:20 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-06 00:01:20 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-06 00:06:19 --> [REQ_ID=ec9d06e05825] [REQUEST][START] HEAD /
DEBUG - 2026-03-06 00:06:20 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-06 00:06:20 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-06 00:06:20 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-06 00:06:20 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-06 00:06:20 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-06 00:11:19 --> [REQ_ID=70b71136e76b] [REQUEST][START] HEAD /
DEBUG - 2026-03-06 00:11:19 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-06 00:11:20 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-06 00:11:20 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-06 00:11:20 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-06 00:11:20 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
INFO - 2026-03-06 00:15:01 --> [spark:ops:work] Started
INFO - 2026-03-06 00:15:01 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-03-06 00:15:01 --> [SPARK_MEMORY] 16777216
INFO - 2026-03-06 00:15:01 --> [spark:ops:work] Intent
INFO - 2026-03-06 00:15:01 --> [spark:ops:work] Completed
INFO - 2026-03-06 00:15:01 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.132990
INFO - 2026-03-06 00:15:01 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-03-06 00:15:01 --> [REQ_ID=87d510161049] [REQUEST][START] GET /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-06 00:15:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-06 00:15:01 --> [REQ_ID=87d510161049] [FILTER_BEFORE] /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-06 00:15:01 --> [REQ_ID=87d510161049] [ROUTE] Controller=\App\Modules\APIs\Controllers\AlertsAPIController Method=fetchEmailAlerts
DEBUG - 2026-03-06 00:15:01 --> [REQ_ID=87d510161049] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-06 00:15:01 --> [REQ_ID=87d510161049] [REQUEST][END]
INFO - 2026-03-06 00:15:01 --> [REQ_ID=87d510161049] [PERF] Execution time=0.045037
DEBUG - 2026-03-06 00:16:19 --> [REQ_ID=3f9ffd002e8c] [REQUEST][START] HEAD /
DEBUG - 2026-03-06 00:16:19 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-06 00:16:19 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-06 00:16:19 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-06 00:16:19 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-06 00:16:19 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-06 00:21:19 --> [REQ_ID=6bf94304fd0f] [REQUEST][START] HEAD /
DEBUG - 2026-03-06 00:21:19 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-06 00:21:20 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-06 00:21:20 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-06 00:21:20 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-06 00:21:20 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-06 00:26:19 --> [REQ_ID=10f39df851b8] [REQUEST][START] HEAD /
DEBUG - 2026-03-06 00:26:19 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-06 00:26:19 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-06 00:26:20 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-06 00:26:20 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-06 00:26:20 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
INFO - 2026-03-06 00:30:01 --> [spark:ops:work] Started
INFO - 2026-03-06 00:30:01 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-03-06 00:30:01 --> [SPARK_MEMORY] 16777216
INFO - 2026-03-06 00:30:01 --> [spark:ops:work] Intent
INFO - 2026-03-06 00:30:02 --> [spark:ops:work] Completed
INFO - 2026-03-06 00:30:02 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.158548
INFO - 2026-03-06 00:30:02 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-03-06 00:31:19 --> [REQ_ID=ca76b6b38e16] [REQUEST][START] HEAD /
DEBUG - 2026-03-06 00:31:19 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-06 00:31:20 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-06 00:31:20 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-06 00:31:20 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-06 00:31:20 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-06 00:36:19 --> [REQ_ID=2ff2298f26de] [REQUEST][START] HEAD /
DEBUG - 2026-03-06 00:36:19 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-06 00:36:20 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-06 00:36:20 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-06 00:36:20 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-06 00:36:20 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-06 00:41:19 --> [REQ_ID=a962f9fee151] [REQUEST][START] HEAD /
DEBUG - 2026-03-06 00:41:19 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-06 00:41:20 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-06 00:41:20 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-06 00:41:20 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-06 00:41:20 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
INFO - 2026-03-06 00:45:01 --> [spark:ops:work] Started
INFO - 2026-03-06 00:45:01 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-03-06 00:45:01 --> [SPARK_MEMORY] 16777216
INFO - 2026-03-06 00:45:01 --> [spark:ops:work] Intent
INFO - 2026-03-06 00:45:01 --> [spark:ops:work] Completed
INFO - 2026-03-06 00:45:01 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.143917
INFO - 2026-03-06 00:45:01 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-03-06 00:46:19 --> [REQ_ID=fd8f8049d6ac] [REQUEST][START] HEAD /
DEBUG - 2026-03-06 00:46:19 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-06 00:46:20 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-06 00:46:20 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-06 00:46:20 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-06 00:46:20 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-06 00:51:19 --> [REQ_ID=58be9463bf23] [REQUEST][START] HEAD /
DEBUG - 2026-03-06 00:51:19 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-06 00:51:19 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-06 00:51:20 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-06 00:51:20 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-06 00:51:20 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-06 00:56:19 --> [REQ_ID=147ee9942b28] [REQUEST][START] HEAD /
DEBUG - 2026-03-06 00:56:19 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-06 00:56:19 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-06 00:56:20 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-06 00:56:20 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-06 00:56:20 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
INFO - 2026-03-06 01:00:01 --> [spark:ops:work] Started
INFO - 2026-03-06 01:00:01 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-03-06 01:00:01 --> [SPARK_MEMORY] 16777216
INFO - 2026-03-06 01:00:01 --> [spark:ops:work] Intent
DEBUG - 2026-03-06 01:00:01 --> [REQ_ID=bfe9f5c7f5e4] [REQUEST][START] GET /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-06 01:00:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-06 01:00:01 --> [REQ_ID=bfe9f5c7f5e4] [FILTER_BEFORE] /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-06 01:00:01 --> [REQ_ID=bfe9f5c7f5e4] [ROUTE] Controller=\App\Modules\Management\Controllers\ManagementAPIController Method=Run_CRON_Tasks
DEBUG - 2026-03-06 01:00:01 --> [REQ_ID=bfe9f5c7f5e4] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-06 01:00:01 --> [REQ_ID=bfe9f5c7f5e4] [REQUEST][END]
INFO - 2026-03-06 01:00:01 --> [REQ_ID=bfe9f5c7f5e4] [PERF] Execution time=0.050156
INFO - 2026-03-06 01:00:01 --> [spark:ops:work] Completed
INFO - 2026-03-06 01:00:01 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.126804
INFO - 2026-03-06 01:00:01 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-03-06 01:01:19 --> [REQ_ID=2029e127574d] [REQUEST][START] HEAD /
DEBUG - 2026-03-06 01:01:19 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-06 01:01:19 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-06 01:01:19 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-06 01:01:19 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-06 01:01:19 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-06 01:06:19 --> [REQ_ID=936788767a71] [REQUEST][START] HEAD /
DEBUG - 2026-03-06 01:06:19 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-06 01:06:19 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-06 01:06:20 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-06 01:06:20 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-06 01:06:20 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-06 01:10:31 --> [REQ_ID=5439a07507de] [REQUEST][START] GET /index.php/Management/Marketing/Content/Listing
DEBUG - 2026-03-06 01:10:31 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-06 01:10:31 --> [REQ_ID=5439a07507de] [FILTER_BEFORE] /index.php/Management/Marketing/Content/Listing
DEBUG - 2026-03-06 01:10:31 --> [REQ_ID=5439a07507de] [ROUTE] Controller=\App\Modules\Management\Controllers\MarketingAdminController Method=contentListing
DEBUG - 2026-03-06 01:10:31 --> [REQ_ID=5439a07507de] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Management/Marketing/Content/Listing
DEBUG - 2026-03-06 01:10:31 --> [CSRF] token name=csrf_test_name hash=3795a863a13caea1174a88c0bde7963d
DEBUG - 2026-03-06 01:10:31 --> [REQ_ID=5439a07507de] [REQUEST][END]
INFO - 2026-03-06 01:10:31 --> [REQ_ID=5439a07507de] [PERF] Execution time=0.056042
DEBUG - 2026-03-06 01:10:34 --> [REQ_ID=a9603bc9e132] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-06 01:10:34 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-06 01:10:34 --> [REQ_ID=a9603bc9e132] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-06 01:10:34 --> [REQ_ID=a9603bc9e132] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-06 01:10:34 --> [REQ_ID=a9603bc9e132] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-06 01:10:34 --> [CSRF] token name=csrf_test_name hash=d4bc311091f5672081397b1fcee30735
DEBUG - 2026-03-06 01:10:34 --> [REQ_ID=9d89be6912b9] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-06 01:10:34 --> [REQ_ID=9d89be6912b9] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-06 01:10:34 --> [REQ_ID=a9603bc9e132] [FILTER_AFTER]
DEBUG - 2026-03-06 01:10:34 --> [REQ_ID=a9603bc9e132] [LIFECYCLE][END] status=200 duration_ms=138.18 memory_delta=0
INFO - 2026-03-06 01:10:34 --> [REQ_ID=9d89be6912b9] [PERF] Execution time=0.137940
DEBUG - 2026-03-06 01:10:34 --> [REQ_ID=a9603bc9e132] [REQUEST][END]
INFO - 2026-03-06 01:10:34 --> [REQ_ID=a9603bc9e132] [PERF] Execution time=0.150794
DEBUG - 2026-03-06 01:11:19 --> [REQ_ID=e28cfefe6079] [REQUEST][START] HEAD /
DEBUG - 2026-03-06 01:11:19 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-06 01:11:19 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-06 01:11:20 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-06 01:11:20 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-06 01:11:20 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
INFO - 2026-03-06 01:15:01 --> [spark:ops:work] Started
INFO - 2026-03-06 01:15:01 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-03-06 01:15:01 --> [SPARK_MEMORY] 16777216
INFO - 2026-03-06 01:15:01 --> [spark:ops:work] Intent
INFO - 2026-03-06 01:15:01 --> [spark:ops:work] Completed
INFO - 2026-03-06 01:15:01 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.020472
INFO - 2026-03-06 01:15:01 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-03-06 01:15:01 --> [REQ_ID=50eabefa4053] [REQUEST][START] GET /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-06 01:15:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-06 01:15:01 --> [REQ_ID=50eabefa4053] [FILTER_BEFORE] /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-06 01:15:01 --> [REQ_ID=50eabefa4053] [ROUTE] Controller=\App\Modules\APIs\Controllers\AlertsAPIController Method=fetchEmailAlerts
DEBUG - 2026-03-06 01:15:01 --> [REQ_ID=50eabefa4053] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-06 01:15:01 --> [REQ_ID=50eabefa4053] [REQUEST][END]
INFO - 2026-03-06 01:15:01 --> [REQ_ID=50eabefa4053] [PERF] Execution time=0.059036
DEBUG - 2026-03-06 01:16:19 --> [REQ_ID=ea0e824f1285] [REQUEST][START] HEAD /
DEBUG - 2026-03-06 01:16:19 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-06 01:16:19 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-06 01:16:20 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-06 01:16:20 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-06 01:16:20 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-06 01:21:19 --> [REQ_ID=317ae425ab94] [REQUEST][START] HEAD /
DEBUG - 2026-03-06 01:21:19 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-06 01:21:19 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-06 01:21:20 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-06 01:21:20 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-06 01:21:20 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-06 01:26:19 --> [REQ_ID=63001fa451f3] [REQUEST][START] HEAD /
DEBUG - 2026-03-06 01:26:19 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-06 01:26:19 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-06 01:26:20 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-06 01:26:20 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-06 01:26:20 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
INFO - 2026-03-06 01:30:02 --> [spark:ops:work] Started
INFO - 2026-03-06 01:30:02 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-03-06 01:30:02 --> [SPARK_MEMORY] 16777216
INFO - 2026-03-06 01:30:02 --> [spark:ops:work] Intent
INFO - 2026-03-06 01:30:02 --> [spark:ops:work] Completed
INFO - 2026-03-06 01:30:02 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.406999
INFO - 2026-03-06 01:30:02 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-03-06 01:31:19 --> [REQ_ID=d46e0df2da97] [REQUEST][START] HEAD /
DEBUG - 2026-03-06 01:31:19 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-06 01:31:19 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-06 01:31:20 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-06 01:31:20 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-06 01:31:20 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-06 01:36:19 --> [REQ_ID=8bf55d482da3] [REQUEST][START] HEAD /
DEBUG - 2026-03-06 01:36:19 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-06 01:36:19 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-06 01:36:19 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-06 01:36:19 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-06 01:36:19 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-06 01:41:19 --> [REQ_ID=7c20295385db] [REQUEST][START] HEAD /
DEBUG - 2026-03-06 01:41:19 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-06 01:41:19 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-06 01:41:20 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-06 01:41:20 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-06 01:41:20 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
INFO - 2026-03-06 01:45:01 --> [spark:ops:work] Started
INFO - 2026-03-06 01:45:01 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-03-06 01:45:01 --> [SPARK_MEMORY] 16777216
INFO - 2026-03-06 01:45:01 --> [spark:ops:work] Intent
INFO - 2026-03-06 01:45:01 --> [spark:ops:work] Completed
INFO - 2026-03-06 01:45:01 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.024390
INFO - 2026-03-06 01:45:01 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-03-06 01:46:19 --> [REQ_ID=55247eb5d853] [REQUEST][START] HEAD /
DEBUG - 2026-03-06 01:46:19 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-06 01:46:19 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-06 01:46:20 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-06 01:46:20 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-06 01:46:20 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-06 01:51:19 --> [REQ_ID=f1464b491356] [REQUEST][START] HEAD /
DEBUG - 2026-03-06 01:51:19 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-06 01:51:19 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-06 01:51:20 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-06 01:51:20 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-06 01:51:20 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-06 01:56:19 --> [REQ_ID=2668a6704200] [REQUEST][START] HEAD /
DEBUG - 2026-03-06 01:56:19 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-06 01:56:19 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-06 01:56:19 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-06 01:56:19 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-06 01:56:19 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
INFO - 2026-03-06 02:00:02 --> [SPARK_START] App\Commands\AIOps\Run
INFO - 2026-03-06 02:00:02 --> [SPARK_MEMORY] 16777216
INFO - 2026-03-06 02:00:02 --> [spark:aiops:run] Intent
INFO - 2026-03-06 02:00:02 --> [spark:ops:work] Started
INFO - 2026-03-06 02:00:02 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-03-06 02:00:02 --> [SPARK_MEMORY] 16777216
INFO - 2026-03-06 02:00:02 --> [spark:ops:work] Intent
DEBUG - 2026-03-06 02:00:02 --> [REQ_ID=a90e48dbea1a] [REQUEST][START] GET /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-06 02:00:02 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
INFO - 2026-03-06 02:00:02 --> [spark:ops:work] Completed
INFO - 2026-03-06 02:00:02 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.067461
INFO - 2026-03-06 02:00:02 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-03-06 02:00:02 --> [REQ_ID=a90e48dbea1a] [FILTER_BEFORE] /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-06 02:00:02 --> [REQ_ID=a90e48dbea1a] [ROUTE] Controller=\App\Modules\Management\Controllers\ManagementAPIController Method=Run_CRON_Tasks
DEBUG - 2026-03-06 02:00:02 --> [REQ_ID=a90e48dbea1a] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-06 02:00:02 --> [REQ_ID=a90e48dbea1a] [REQUEST][END]
INFO - 2026-03-06 02:00:02 --> [REQ_ID=a90e48dbea1a] [PERF] Execution time=0.050270
INFO - 2026-03-06 02:00:03 --> [AIOPS][SPARK][GOVERNANCE][spark:logs:summarize] Started
INFO - 2026-03-06 02:00:03 --> [SPARK_START] App\Commands\Logs\Summarize
INFO - 2026-03-06 02:00:03 --> [SPARK_MEMORY] 16777216
INFO - 2026-03-06 02:00:03 --> [spark:logs:summarize] Intent
INFO - 2026-03-06 02:00:03 --> [AIOPS][SPARK][GOVERNANCE][spark:logs:summarize] Completed
INFO - 2026-03-06 02:00:03 --> [SPARK_COMPLETE] App\Commands\Logs\Summarize duration=0.003169
INFO - 2026-03-06 02:00:03 --> [SPARK_MEMORY] 16777216
INFO - 2026-03-06 02:00:03 --> [spark:app:healthcheck] Started
INFO - 2026-03-06 02:00:03 --> [SPARK_START] App\Commands\App\Healthcheck
INFO - 2026-03-06 02:00:03 --> [SPARK_MEMORY] 16777216
INFO - 2026-03-06 02:00:03 --> [spark:app:healthcheck] Intent
DEBUG - 2026-03-06 02:00:03 --> LOG_HEALTHCHECK debug marker=009fdb56ed86
INFO - 2026-03-06 02:00:03 --> LOG_HEALTHCHECK info marker=009fdb56ed86
NOTICE - 2026-03-06 02:00:03 --> LOG_HEALTHCHECK probe marker=009fdb56ed86
INFO - 2026-03-06 02:00:03 --> [spark:app:healthcheck] Completed
INFO - 2026-03-06 02:00:03 --> [SPARK_COMPLETE] App\Commands\App\Healthcheck duration=0.025120
INFO - 2026-03-06 02:00:03 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-03-06 02:00:05 --> OllamaPatchRunner:L142 - validateGeneratedPatch Content: 
WARNING - 2026-03-06 02:00:05 --> OllamaPatchRunner:L49 - Original Diff: 
DEBUG - 2026-03-06 02:00:05 --> OllamaPatchRunner:L51 - Retried Diff: 
DEBUG - 2026-03-06 02:00:05 --> OllamaPatchRunner:L142 - validateGeneratedPatch Content: 
DEBUG - 2026-03-06 02:00:05 --> OllamaPatchRunner:L53 - Validating Generated Patch Failed
INFO - 2026-03-06 02:00:05 --> [SPARK_COMPLETE] App\Commands\AIOps\Run duration=3.359172
INFO - 2026-03-06 02:00:05 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-03-06 02:01:19 --> [REQ_ID=4a35657b3bb4] [REQUEST][START] HEAD /
DEBUG - 2026-03-06 02:01:19 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-06 02:01:19 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-06 02:01:19 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-06 02:01:19 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-06 02:01:19 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-06 02:03:32 --> [REQ_ID=fa6f9412e26b] [REQUEST][START] GET /
DEBUG - 2026-03-06 02:03:32 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-06 02:03:32 --> [REQ_ID=fa6f9412e26b] [FILTER_BEFORE] /
DEBUG - 2026-03-06 02:03:32 --> [REQ_ID=fa6f9412e26b] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-06 02:03:32 --> [REQ_ID=fa6f9412e26b] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-06 02:03:32 --> [CSRF] token name=csrf_test_name hash=9822596ea53c8f6b10040681d09f8a20
DEBUG - 2026-03-06 02:03:32 --> [REQ_ID=a51c6d2957e4] [INIT] App\Controllers\Home::GET
INFO - 2026-03-06 02:03:32 --> [REQ_ID=a51c6d2957e4] [MEMORY][controller-start] 4194304
INFO - 2026-03-06 02:03:32 --> [REQ_ID=a51c6d2957e4] [MEMORY][commonData:start] 4194304
DEBUG - 2026-03-06 02:03:32 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-06 02:03:33 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-03-06 02:03:33 --> [REQ_ID=a51c6d2957e4] [VIEW_RENDER] themes/public/home
INFO - 2026-03-06 02:03:33 --> [REQ_ID=a51c6d2957e4] [MEMORY][commonData:start] 8388608
INFO - 2026-03-06 02:03:33 --> themesMemory usage: 8388608
DEBUG - 2026-03-06 02:03:33 --> [MetaService] slug= pageName=Home cacheHit= path=DB
DEBUG - 2026-03-06 02:03:33 --> [REQ_ID=fa6f9412e26b] [FILTER_AFTER]
DEBUG - 2026-03-06 02:03:33 --> [REQ_ID=fa6f9412e26b] [LIFECYCLE][END] status=200 duration_ms=658.22 memory_delta=4194304
INFO - 2026-03-06 02:03:33 --> [REQ_ID=a51c6d2957e4] [PERF] Execution time=0.657026
DEBUG - 2026-03-06 02:03:33 --> [REQ_ID=fa6f9412e26b] [REQUEST][END]
INFO - 2026-03-06 02:03:33 --> [REQ_ID=fa6f9412e26b] [PERF] Execution time=0.673878
DEBUG - 2026-03-06 02:06:19 --> [REQ_ID=f9b9936db913] [REQUEST][START] HEAD /
DEBUG - 2026-03-06 02:06:19 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-06 02:06:19 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-06 02:06:20 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-06 02:06:20 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-06 02:06:20 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-06 02:11:19 --> [REQ_ID=4c5c3e6a3a87] [REQUEST][START] HEAD /
DEBUG - 2026-03-06 02:11:19 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-06 02:11:19 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-06 02:11:20 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-06 02:11:20 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-06 02:11:20 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
INFO - 2026-03-06 02:15:01 --> [spark:ops:work] Started
INFO - 2026-03-06 02:15:01 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-03-06 02:15:01 --> [SPARK_MEMORY] 16777216
INFO - 2026-03-06 02:15:01 --> [spark:ops:work] Intent
DEBUG - 2026-03-06 02:15:01 --> [REQ_ID=75ca21ee31ef] [REQUEST][START] GET /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-06 02:15:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-06 02:15:01 --> [REQ_ID=75ca21ee31ef] [FILTER_BEFORE] /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-06 02:15:01 --> [REQ_ID=75ca21ee31ef] [ROUTE] Controller=\App\Modules\APIs\Controllers\AlertsAPIController Method=fetchEmailAlerts
DEBUG - 2026-03-06 02:15:01 --> [REQ_ID=75ca21ee31ef] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-06 02:15:01 --> [REQ_ID=75ca21ee31ef] [REQUEST][END]
INFO - 2026-03-06 02:15:01 --> [REQ_ID=75ca21ee31ef] [PERF] Execution time=0.043741
INFO - 2026-03-06 02:15:01 --> [spark:ops:work] Completed
INFO - 2026-03-06 02:15:01 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.232018
INFO - 2026-03-06 02:15:01 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-03-06 02:16:19 --> [REQ_ID=ece8896fe542] [REQUEST][START] HEAD /
DEBUG - 2026-03-06 02:16:19 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-06 02:16:19 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-06 02:16:19 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-06 02:16:19 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-06 02:16:19 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-06 02:21:19 --> [REQ_ID=58afc7d76f76] [REQUEST][START] HEAD /
DEBUG - 2026-03-06 02:21:19 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-06 02:21:19 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-06 02:21:20 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-06 02:21:20 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-06 02:21:20 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-06 02:21:49 --> [REQ_ID=703f1e32d5a4] [REQUEST][START] GET /index.php/Management/Budgeting
DEBUG - 2026-03-06 02:21:49 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-06 02:21:49 --> [REQ_ID=703f1e32d5a4] [FILTER_BEFORE] /index.php/Management/Budgeting
DEBUG - 2026-03-06 02:21:49 --> [REQ_ID=703f1e32d5a4] [ROUTE] Controller=\App\Modules\Management\Controllers\BudgetingAdminController Method=index
DEBUG - 2026-03-06 02:21:49 --> [REQ_ID=703f1e32d5a4] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Management/Budgeting
DEBUG - 2026-03-06 02:21:49 --> [CSRF] token name=csrf_test_name hash=1dbf4eeeb8233f9e31bf15d152ebc12b
DEBUG - 2026-03-06 02:21:49 --> [REQ_ID=703f1e32d5a4] [REQUEST][END]
INFO - 2026-03-06 02:21:49 --> [REQ_ID=703f1e32d5a4] [PERF] Execution time=0.028422
DEBUG - 2026-03-06 02:21:52 --> [REQ_ID=18521278b4e7] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-06 02:21:52 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-06 02:21:52 --> [REQ_ID=18521278b4e7] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-06 02:21:52 --> [REQ_ID=18521278b4e7] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-06 02:21:52 --> [REQ_ID=18521278b4e7] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-06 02:21:52 --> [CSRF] token name=csrf_test_name hash=4e64b23d392d6d7774b8e50385f7f828
DEBUG - 2026-03-06 02:21:52 --> [REQ_ID=044fa6551fb1] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-06 02:21:52 --> [REQ_ID=044fa6551fb1] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-06 02:21:53 --> [REQ_ID=18521278b4e7] [FILTER_AFTER]
DEBUG - 2026-03-06 02:21:53 --> [REQ_ID=18521278b4e7] [LIFECYCLE][END] status=200 duration_ms=53.60 memory_delta=0
INFO - 2026-03-06 02:21:53 --> [REQ_ID=044fa6551fb1] [PERF] Execution time=0.053234
DEBUG - 2026-03-06 02:21:53 --> [REQ_ID=18521278b4e7] [REQUEST][END]
INFO - 2026-03-06 02:21:53 --> [REQ_ID=18521278b4e7] [PERF] Execution time=0.066815
DEBUG - 2026-03-06 02:26:19 --> [REQ_ID=701a86f91379] [REQUEST][START] HEAD /
DEBUG - 2026-03-06 02:26:19 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-06 02:26:19 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-06 02:26:20 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-06 02:26:20 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-06 02:26:20 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
INFO - 2026-03-06 02:30:01 --> [spark:ops:work] Started
INFO - 2026-03-06 02:30:01 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-03-06 02:30:01 --> [SPARK_MEMORY] 16777216
INFO - 2026-03-06 02:30:01 --> [spark:ops:work] Intent
INFO - 2026-03-06 02:30:01 --> [spark:ops:work] Completed
INFO - 2026-03-06 02:30:01 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.097967
INFO - 2026-03-06 02:30:01 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-03-06 02:31:19 --> [REQ_ID=1a38de02e1e2] [REQUEST][START] HEAD /
DEBUG - 2026-03-06 02:31:19 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-06 02:31:19 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-06 02:31:20 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-06 02:31:20 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-06 02:31:20 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-06 02:34:17 --> [REQ_ID=209ac9ac9a7a] [REQUEST][START] GET /
DEBUG - 2026-03-06 02:34:17 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-06 02:34:17 --> [REQ_ID=209ac9ac9a7a] [FILTER_BEFORE] /
DEBUG - 2026-03-06 02:34:17 --> [REQ_ID=209ac9ac9a7a] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-06 02:34:17 --> [REQ_ID=209ac9ac9a7a] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-06 02:34:17 --> [CSRF] token name=csrf_test_name hash=dd826f2f4818e4d515f773a172b22193
DEBUG - 2026-03-06 02:34:17 --> [REQ_ID=ffae6c1df0d1] [INIT] App\Controllers\Home::GET
INFO - 2026-03-06 02:34:17 --> [REQ_ID=ffae6c1df0d1] [MEMORY][controller-start] 6291456
INFO - 2026-03-06 02:34:17 --> [REQ_ID=ffae6c1df0d1] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-06 02:34:17 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-06 02:34:17 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-03-06 02:34:17 --> [REQ_ID=ffae6c1df0d1] [VIEW_RENDER] themes/public/home
INFO - 2026-03-06 02:34:17 --> [REQ_ID=ffae6c1df0d1] [MEMORY][commonData:start] 10485760
INFO - 2026-03-06 02:34:17 --> themesMemory usage: 10485760
DEBUG - 2026-03-06 02:34:17 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-06 02:34:17 --> [REQ_ID=209ac9ac9a7a] [FILTER_AFTER]
DEBUG - 2026-03-06 02:34:17 --> [REQ_ID=209ac9ac9a7a] [LIFECYCLE][END] status=200 duration_ms=724.81 memory_delta=4194304
INFO - 2026-03-06 02:34:17 --> [REQ_ID=ffae6c1df0d1] [PERF] Execution time=0.722755
DEBUG - 2026-03-06 02:34:17 --> [REQ_ID=209ac9ac9a7a] [REQUEST][END]
INFO - 2026-03-06 02:34:17 --> [REQ_ID=209ac9ac9a7a] [PERF] Execution time=0.769868
DEBUG - 2026-03-06 02:36:19 --> [REQ_ID=a6ee544f82b8] [REQUEST][START] HEAD /
DEBUG - 2026-03-06 02:36:19 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-06 02:36:19 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-06 02:36:20 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-06 02:36:20 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-06 02:36:20 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-06 02:41:19 --> [REQ_ID=6df249134abe] [REQUEST][START] HEAD /
DEBUG - 2026-03-06 02:41:19 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-06 02:41:19 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-06 02:41:19 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-06 02:41:19 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-06 02:41:19 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
INFO - 2026-03-06 02:45:01 --> [spark:ops:work] Started
INFO - 2026-03-06 02:45:01 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-03-06 02:45:01 --> [SPARK_MEMORY] 16777216
INFO - 2026-03-06 02:45:01 --> [spark:ops:work] Intent
INFO - 2026-03-06 02:45:01 --> [spark:ops:work] Completed
INFO - 2026-03-06 02:45:01 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.051357
INFO - 2026-03-06 02:45:01 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-03-06 02:46:19 --> [REQ_ID=e9ab7e24fb8a] [REQUEST][START] HEAD /
DEBUG - 2026-03-06 02:46:19 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-06 02:46:19 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-06 02:46:20 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-06 02:46:20 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-06 02:46:20 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-06 02:51:19 --> [REQ_ID=f64f978de3a9] [REQUEST][START] HEAD /
DEBUG - 2026-03-06 02:51:19 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-06 02:51:19 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-06 02:51:20 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-06 02:51:20 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-06 02:51:20 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-06 02:56:19 --> [REQ_ID=8b249c8e598d] [REQUEST][START] HEAD /
DEBUG - 2026-03-06 02:56:19 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-06 02:56:19 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-06 02:56:20 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-06 02:56:20 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-06 02:56:20 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
INFO - 2026-03-06 03:00:01 --> [spark:ops:work] Started
INFO - 2026-03-06 03:00:01 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-03-06 03:00:01 --> [SPARK_MEMORY] 16777216
INFO - 2026-03-06 03:00:01 --> [spark:ops:work] Intent
DEBUG - 2026-03-06 03:00:01 --> [REQ_ID=9f46a3d32a09] [REQUEST][START] GET /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-06 03:00:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-06 03:00:01 --> [REQ_ID=9f46a3d32a09] [FILTER_BEFORE] /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-06 03:00:01 --> [REQ_ID=9f46a3d32a09] [ROUTE] Controller=\App\Modules\Management\Controllers\ManagementAPIController Method=Run_CRON_Tasks
DEBUG - 2026-03-06 03:00:01 --> [REQ_ID=9f46a3d32a09] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-06 03:00:01 --> [REQ_ID=9f46a3d32a09] [REQUEST][END]
INFO - 2026-03-06 03:00:01 --> [REQ_ID=9f46a3d32a09] [PERF] Execution time=0.055931
INFO - 2026-03-06 03:00:01 --> [spark:ops:work] Completed
INFO - 2026-03-06 03:00:01 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.109350
INFO - 2026-03-06 03:00:01 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-03-06 03:01:19 --> [REQ_ID=6de90e623c1e] [REQUEST][START] HEAD /
DEBUG - 2026-03-06 03:01:19 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-06 03:01:19 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-06 03:01:20 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-06 03:01:20 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-06 03:01:20 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-06 03:06:19 --> [REQ_ID=958ad7809b44] [REQUEST][START] HEAD /
DEBUG - 2026-03-06 03:06:19 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-06 03:06:19 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-06 03:06:19 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-06 03:06:19 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-06 03:06:19 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-06 03:09:17 --> [REQ_ID=39d3ad214eb7] [REQUEST][START] GET /
DEBUG - 2026-03-06 03:09:17 --> [REQ_ID=378e0e62da1d] [REQUEST][START] GET /
DEBUG - 2026-03-06 03:09:17 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-06 03:09:17 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-06 03:09:17 --> [REQ_ID=39d3ad214eb7] [FILTER_BEFORE] /
DEBUG - 2026-03-06 03:09:17 --> [REQ_ID=39d3ad214eb7] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-06 03:09:17 --> [REQ_ID=39d3ad214eb7] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-06 03:09:17 --> [REQ_ID=378e0e62da1d] [FILTER_BEFORE] /
DEBUG - 2026-03-06 03:09:17 --> [REQ_ID=378e0e62da1d] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-06 03:09:17 --> [REQ_ID=378e0e62da1d] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-06 03:09:17 --> [CSRF] token name=csrf_test_name hash=a4803599748c3aecff9c0d317ce0a3f2
DEBUG - 2026-03-06 03:09:17 --> [CSRF] token name=csrf_test_name hash=1a390f11fd674b28c5f01aee6c616d63
DEBUG - 2026-03-06 03:09:17 --> [REQ_ID=16196f37f60c] [INIT] App\Controllers\Home::GET
INFO - 2026-03-06 03:09:17 --> [REQ_ID=16196f37f60c] [MEMORY][controller-start] 6291456
DEBUG - 2026-03-06 03:09:17 --> [REQ_ID=c57082f26fdc] [INIT] App\Controllers\Home::GET
INFO - 2026-03-06 03:09:17 --> [REQ_ID=c57082f26fdc] [MEMORY][controller-start] 6291456
INFO - 2026-03-06 03:09:17 --> [REQ_ID=c57082f26fdc] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-06 03:09:17 --> MyMIUser L52 - initialized (first log).
INFO - 2026-03-06 03:09:17 --> [REQ_ID=16196f37f60c] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-06 03:09:17 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-06 03:09:18 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-03-06 03:09:18 --> [REQ_ID=c57082f26fdc] [VIEW_RENDER] themes/public/home
INFO - 2026-03-06 03:09:18 --> [REQ_ID=c57082f26fdc] [MEMORY][commonData:start] 10485760
DEBUG - 2026-03-06 03:09:18 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
DEBUG - 2026-03-06 03:09:18 --> [REQ_ID=16196f37f60c] [VIEW_RENDER] themes/public/home
INFO - 2026-03-06 03:09:18 --> [REQ_ID=16196f37f60c] [MEMORY][commonData:start] 10485760
INFO - 2026-03-06 03:09:18 --> themesMemory usage: 10485760
INFO - 2026-03-06 03:09:18 --> themesMemory usage: 10485760
DEBUG - 2026-03-06 03:09:18 --> [MetaService] slug= pageName=Home cacheHit= path=DB
DEBUG - 2026-03-06 03:09:18 --> [MetaService] slug= pageName=Home cacheHit= path=DB
DEBUG - 2026-03-06 03:09:18 --> [REQ_ID=39d3ad214eb7] [FILTER_AFTER]
DEBUG - 2026-03-06 03:09:18 --> [REQ_ID=39d3ad214eb7] [LIFECYCLE][END] status=200 duration_ms=659.11 memory_delta=4194304
INFO - 2026-03-06 03:09:18 --> [REQ_ID=c57082f26fdc] [PERF] Execution time=0.655586
DEBUG - 2026-03-06 03:09:18 --> [REQ_ID=378e0e62da1d] [FILTER_AFTER]
DEBUG - 2026-03-06 03:09:18 --> [REQ_ID=378e0e62da1d] [LIFECYCLE][END] status=200 duration_ms=660.14 memory_delta=4194304
INFO - 2026-03-06 03:09:18 --> [REQ_ID=16196f37f60c] [PERF] Execution time=0.657201
DEBUG - 2026-03-06 03:09:18 --> [REQ_ID=39d3ad214eb7] [REQUEST][END]
INFO - 2026-03-06 03:09:18 --> [REQ_ID=39d3ad214eb7] [PERF] Execution time=0.715597
DEBUG - 2026-03-06 03:09:18 --> [REQ_ID=378e0e62da1d] [REQUEST][END]
INFO - 2026-03-06 03:09:18 --> [REQ_ID=378e0e62da1d] [PERF] Execution time=0.715258
DEBUG - 2026-03-06 03:09:24 --> [REQ_ID=0920e221b860] [REQUEST][START] POST /
DEBUG - 2026-03-06 03:09:24 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-06 03:09:24 --> [REQ_ID=906662ebdf38] [REQUEST][START] POST /
DEBUG - 2026-03-06 03:09:24 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-06 03:09:24 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: POST, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-06 03:09:24 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: POST, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-06 03:09:24 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-06 03:09:24 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-06 03:09:24 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: none
CRITICAL - 2026-03-06 03:09:24 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-06 03:09:24 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-06 03:09:24 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: none
DEBUG - 2026-03-06 03:11:19 --> [REQ_ID=b5b86221999a] [REQUEST][START] HEAD /
DEBUG - 2026-03-06 03:11:19 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-06 03:11:19 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-06 03:11:20 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-06 03:11:20 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-06 03:11:20 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
INFO - 2026-03-06 03:15:01 --> [spark:ops:work] Started
INFO - 2026-03-06 03:15:01 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-03-06 03:15:01 --> [SPARK_MEMORY] 16777216
INFO - 2026-03-06 03:15:01 --> [spark:ops:work] Intent
DEBUG - 2026-03-06 03:15:01 --> [REQ_ID=7ea1260c2f36] [REQUEST][START] GET /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-06 03:15:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
INFO - 2026-03-06 03:15:01 --> [spark:ops:work] Completed
INFO - 2026-03-06 03:15:01 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.175287
INFO - 2026-03-06 03:15:01 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-03-06 03:15:01 --> [REQ_ID=7ea1260c2f36] [FILTER_BEFORE] /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-06 03:15:01 --> [REQ_ID=7ea1260c2f36] [ROUTE] Controller=\App\Modules\APIs\Controllers\AlertsAPIController Method=fetchEmailAlerts
DEBUG - 2026-03-06 03:15:01 --> [REQ_ID=7ea1260c2f36] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-06 03:15:01 --> [REQ_ID=7ea1260c2f36] [REQUEST][END]
INFO - 2026-03-06 03:15:01 --> [REQ_ID=7ea1260c2f36] [PERF] Execution time=0.066409
DEBUG - 2026-03-06 03:15:16 --> [REQ_ID=03079f1c325c] [REQUEST][START] GET /
DEBUG - 2026-03-06 03:15:16 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-06 03:15:16 --> [REQ_ID=03079f1c325c] [FILTER_BEFORE] /
DEBUG - 2026-03-06 03:15:16 --> [REQ_ID=03079f1c325c] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-06 03:15:16 --> [REQ_ID=03079f1c325c] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-06 03:15:16 --> [CSRF] token name=csrf_test_name hash=eb423eb2188f18ee2841153586ddefb0
DEBUG - 2026-03-06 03:15:16 --> [REQ_ID=842de83c72d5] [INIT] App\Controllers\Home::GET
INFO - 2026-03-06 03:15:16 --> [REQ_ID=842de83c72d5] [MEMORY][controller-start] 4194304
INFO - 2026-03-06 03:15:16 --> [REQ_ID=842de83c72d5] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-06 03:15:16 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-06 03:15:16 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
DEBUG - 2026-03-06 03:15:16 --> [REQ_ID=842de83c72d5] [VIEW_RENDER] themes/public/home
INFO - 2026-03-06 03:15:16 --> [REQ_ID=842de83c72d5] [MEMORY][commonData:start] 8388608
INFO - 2026-03-06 03:15:16 --> themesMemory usage: 8388608
DEBUG - 2026-03-06 03:15:16 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-06 03:15:16 --> [REQ_ID=03079f1c325c] [FILTER_AFTER]
DEBUG - 2026-03-06 03:15:16 --> [REQ_ID=03079f1c325c] [LIFECYCLE][END] status=200 duration_ms=628.92 memory_delta=4194304
INFO - 2026-03-06 03:15:16 --> [REQ_ID=842de83c72d5] [PERF] Execution time=0.627363
DEBUG - 2026-03-06 03:15:16 --> [REQ_ID=03079f1c325c] [REQUEST][END]
INFO - 2026-03-06 03:15:16 --> [REQ_ID=03079f1c325c] [PERF] Execution time=0.642355
DEBUG - 2026-03-06 03:16:19 --> [REQ_ID=ad4ee5473694] [REQUEST][START] HEAD /
DEBUG - 2026-03-06 03:16:19 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-06 03:16:19 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-06 03:16:19 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-06 03:16:19 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-06 03:16:19 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-06 03:21:19 --> [REQ_ID=54bfd28b9dc5] [REQUEST][START] HEAD /
DEBUG - 2026-03-06 03:21:19 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-06 03:21:19 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-06 03:21:20 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-06 03:21:20 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-06 03:21:20 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-06 03:22:18 --> [REQ_ID=8ac9945ea069] [REQUEST][START] GET /index.php/Preview/Alert/IMNN
DEBUG - 2026-03-06 03:22:18 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-06 03:22:18 --> [REQ_ID=8ac9945ea069] [FILTER_BEFORE] /index.php/Preview/Alert/IMNN
DEBUG - 2026-03-06 03:22:18 --> [REQ_ID=8ac9945ea069] [ROUTE] Controller=\App\Modules\User\Controllers\AlertsController Method=preview
DEBUG - 2026-03-06 03:22:18 --> [REQ_ID=8ac9945ea069] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Preview/Alert/IMNN
DEBUG - 2026-03-06 03:22:18 --> [CSRF] token name=csrf_test_name hash=7d063604bac7b51ee232dee7888e5555
DEBUG - 2026-03-06 03:22:18 --> [REQ_ID=6bed4b30236f] [INIT] App\Modules\User\Controllers\AlertsController::GET
INFO - 2026-03-06 03:22:18 --> [REQ_ID=6bed4b30236f] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-06 03:22:18 --> [REQ_ID=6bed4b30236f] [METHOD_ENTRY] preview
DEBUG - 2026-03-06 03:22:18 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-06 03:22:18 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-06 03:22:18 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-06 03:22:18 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-06 03:22:18 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-06 03:22:18 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-06 03:22:18 --> MyMIInvestments: no session user detected; skipping personalized hydration.
DEBUG - 2026-03-06 03:22:18 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-06 03:22:18 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-06 03:22:18 --> MyMIMarketing: Pscrape library not installed; Google search scraping will use fallback.
DEBUG - 2026-03-06 03:22:18 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-06 03:22:18 --> MyMIAlerts: no authenticated user context detected.
DEBUG - 2026-03-06 03:22:18 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-06 03:22:18 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-06 03:22:18 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-06 03:22:18 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-06 03:22:18 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-06 03:22:18 --> [SERVICE] App\Services\BudgetService ::setUserId
INFO - 2026-03-06 03:22:18 --> [REQ_ID=6bed4b30236f] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-06 03:22:18 --> MyMIInvestments: no session user detected; skipping personalized hydration.
DEBUG - 2026-03-06 03:22:18 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-06 03:22:18 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-06 03:22:18 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-06 03:22:18 --> MyMIAlerts: no authenticated user context detected.
DEBUG - 2026-03-06 03:22:18 --> [REQ_ID=6bed4b30236f] [VIEW_RENDER] themes/public/previewAlert
INFO - 2026-03-06 03:22:18 --> [REQ_ID=6bed4b30236f] [MEMORY][commonData:start] 6291456
INFO - 2026-03-06 03:22:18 --> themesMemory usage: 6291456
DEBUG - 2026-03-06 03:22:18 --> [REQ_ID=8ac9945ea069] [FILTER_AFTER]
DEBUG - 2026-03-06 03:22:18 --> [REQ_ID=8ac9945ea069] [LIFECYCLE][END] status=200 duration_ms=168.41 memory_delta=2097152
INFO - 2026-03-06 03:22:18 --> [REQ_ID=6bed4b30236f] [PERF] Execution time=0.166312
DEBUG - 2026-03-06 03:22:18 --> [REQ_ID=8ac9945ea069] [REQUEST][END]
INFO - 2026-03-06 03:22:18 --> [REQ_ID=8ac9945ea069] [PERF] Execution time=0.188781
DEBUG - 2026-03-06 03:22:19 --> [REQ_ID=fb7074207e29] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-06 03:22:19 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-06 03:22:19 --> [REQ_ID=fb7074207e29] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-06 03:22:19 --> [REQ_ID=fb7074207e29] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-06 03:22:19 --> [REQ_ID=fb7074207e29] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-06 03:22:19 --> [CSRF] token name=csrf_test_name hash=9c890cffe98819010be3eafbd4044f4d
DEBUG - 2026-03-06 03:22:19 --> [REQ_ID=dacd8681f9d5] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-06 03:22:19 --> [REQ_ID=dacd8681f9d5] [MEMORY][controller-start] 6291456
DEBUG - 2026-03-06 03:22:19 --> [REQ_ID=fb7074207e29] [FILTER_AFTER]
DEBUG - 2026-03-06 03:22:19 --> [REQ_ID=fb7074207e29] [LIFECYCLE][END] status=200 duration_ms=23.13 memory_delta=0
INFO - 2026-03-06 03:22:19 --> [REQ_ID=dacd8681f9d5] [PERF] Execution time=0.022820
DEBUG - 2026-03-06 03:22:19 --> [REQ_ID=fb7074207e29] [REQUEST][END]
INFO - 2026-03-06 03:22:19 --> [REQ_ID=fb7074207e29] [PERF] Execution time=0.035094
DEBUG - 2026-03-06 03:22:19 --> [REQ_ID=25ff180a72a8] [REQUEST][START] GET /index.php/Preview/Alert/IMNN
DEBUG - 2026-03-06 03:22:19 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-06 03:22:19 --> [REQ_ID=25ff180a72a8] [FILTER_BEFORE] /index.php/Preview/Alert/IMNN
DEBUG - 2026-03-06 03:22:19 --> [REQ_ID=25ff180a72a8] [ROUTE] Controller=\App\Modules\User\Controllers\AlertsController Method=preview
DEBUG - 2026-03-06 03:22:19 --> [REQ_ID=25ff180a72a8] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Preview/Alert/IMNN
DEBUG - 2026-03-06 03:22:19 --> [CSRF] token name=csrf_test_name hash=dc41c09d20e428a2748d259d9a74bd7c
DEBUG - 2026-03-06 03:22:19 --> [REQ_ID=4abe6ccf810c] [INIT] App\Modules\User\Controllers\AlertsController::GET
INFO - 2026-03-06 03:22:19 --> [REQ_ID=4abe6ccf810c] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-06 03:22:19 --> [REQ_ID=4abe6ccf810c] [METHOD_ENTRY] preview
DEBUG - 2026-03-06 03:22:19 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-06 03:22:19 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-06 03:22:19 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-06 03:22:19 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-06 03:22:19 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-06 03:22:19 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-06 03:22:19 --> MyMIInvestments: no session user detected; skipping personalized hydration.
DEBUG - 2026-03-06 03:22:19 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-06 03:22:19 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-06 03:22:19 --> MyMIMarketing: Pscrape library not installed; Google search scraping will use fallback.
DEBUG - 2026-03-06 03:22:19 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-06 03:22:19 --> MyMIAlerts: no authenticated user context detected.
DEBUG - 2026-03-06 03:22:19 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-06 03:22:19 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-06 03:22:19 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-06 03:22:19 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-06 03:22:19 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-06 03:22:19 --> [SERVICE] App\Services\BudgetService ::setUserId
INFO - 2026-03-06 03:22:19 --> [REQ_ID=4abe6ccf810c] [MEMORY][commonData:start] 4194304
DEBUG - 2026-03-06 03:22:19 --> MyMIInvestments: no session user detected; skipping personalized hydration.
DEBUG - 2026-03-06 03:22:19 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-06 03:22:19 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-06 03:22:19 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-06 03:22:19 --> MyMIAlerts: no authenticated user context detected.
DEBUG - 2026-03-06 03:22:19 --> [REQ_ID=4abe6ccf810c] [VIEW_RENDER] themes/public/previewAlert
INFO - 2026-03-06 03:22:19 --> [REQ_ID=4abe6ccf810c] [MEMORY][commonData:start] 4194304
INFO - 2026-03-06 03:22:19 --> themesMemory usage: 4194304
DEBUG - 2026-03-06 03:22:19 --> [REQ_ID=25ff180a72a8] [FILTER_AFTER]
DEBUG - 2026-03-06 03:22:19 --> [REQ_ID=25ff180a72a8] [LIFECYCLE][END] status=200 duration_ms=30.65 memory_delta=0
INFO - 2026-03-06 03:22:19 --> [REQ_ID=4abe6ccf810c] [PERF] Execution time=0.030419
DEBUG - 2026-03-06 03:22:19 --> [REQ_ID=25ff180a72a8] [REQUEST][END]
INFO - 2026-03-06 03:22:19 --> [REQ_ID=25ff180a72a8] [PERF] Execution time=0.039205
DEBUG - 2026-03-06 03:22:19 --> [REQ_ID=621b88425c2f] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-06 03:22:19 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-06 03:22:19 --> [REQ_ID=621b88425c2f] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-06 03:22:19 --> [REQ_ID=621b88425c2f] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-06 03:22:19 --> [REQ_ID=621b88425c2f] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-06 03:22:19 --> [CSRF] token name=csrf_test_name hash=5497f3a236b290f7c693c3ace52274a4
DEBUG - 2026-03-06 03:22:19 --> [REQ_ID=6102e5381d47] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-06 03:22:19 --> [REQ_ID=6102e5381d47] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-06 03:22:19 --> [REQ_ID=621b88425c2f] [FILTER_AFTER]
DEBUG - 2026-03-06 03:22:19 --> [REQ_ID=621b88425c2f] [LIFECYCLE][END] status=200 duration_ms=18.47 memory_delta=0
INFO - 2026-03-06 03:22:19 --> [REQ_ID=6102e5381d47] [PERF] Execution time=0.018353
DEBUG - 2026-03-06 03:22:19 --> [REQ_ID=621b88425c2f] [REQUEST][END]
INFO - 2026-03-06 03:22:19 --> [REQ_ID=621b88425c2f] [PERF] Execution time=0.027216
DEBUG - 2026-03-06 03:26:19 --> [REQ_ID=f59bd7f24105] [REQUEST][START] HEAD /
DEBUG - 2026-03-06 03:26:19 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-06 03:26:19 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-06 03:26:19 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-06 03:26:19 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-06 03:26:19 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
INFO - 2026-03-06 03:30:02 --> [spark:ops:work] Started
INFO - 2026-03-06 03:30:02 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-03-06 03:30:02 --> [SPARK_MEMORY] 16777216
INFO - 2026-03-06 03:30:02 --> [spark:ops:work] Intent
INFO - 2026-03-06 03:30:02 --> [spark:ops:work] Completed
INFO - 2026-03-06 03:30:02 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.093891
INFO - 2026-03-06 03:30:02 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-03-06 03:31:19 --> [REQ_ID=4f2f4499ab78] [REQUEST][START] HEAD /
DEBUG - 2026-03-06 03:31:19 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-06 03:31:19 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-06 03:31:19 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-06 03:31:19 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-06 03:31:19 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-06 03:36:19 --> [REQ_ID=1e04f0144cef] [REQUEST][START] HEAD /
DEBUG - 2026-03-06 03:36:19 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-06 03:36:19 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-06 03:36:19 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-06 03:36:19 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-06 03:36:19 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-06 03:41:19 --> [REQ_ID=128041679b97] [REQUEST][START] HEAD /
DEBUG - 2026-03-06 03:41:19 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-06 03:41:19 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-06 03:41:20 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-06 03:41:20 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-06 03:41:20 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
INFO - 2026-03-06 03:45:01 --> [spark:ops:work] Started
INFO - 2026-03-06 03:45:01 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-03-06 03:45:01 --> [SPARK_MEMORY] 16777216
INFO - 2026-03-06 03:45:01 --> [spark:ops:work] Intent
INFO - 2026-03-06 03:45:01 --> [spark:ops:work] Completed
INFO - 2026-03-06 03:45:01 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.096274
INFO - 2026-03-06 03:45:01 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-03-06 03:46:19 --> [REQ_ID=38bf7f75599e] [REQUEST][START] HEAD /
DEBUG - 2026-03-06 03:46:19 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-06 03:46:19 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-06 03:46:19 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-06 03:46:19 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-06 03:46:19 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-06 03:48:01 --> [REQ_ID=69c14415144f] [REQUEST][START] GET /
DEBUG - 2026-03-06 03:48:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-06 03:48:01 --> [REQ_ID=69c14415144f] [FILTER_BEFORE] /
DEBUG - 2026-03-06 03:48:01 --> [REQ_ID=69c14415144f] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-06 03:48:01 --> [REQ_ID=69c14415144f] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-06 03:48:01 --> [CSRF] token name=csrf_test_name hash=6d1c916b6a02ea664d35624acd6eac30
DEBUG - 2026-03-06 03:48:01 --> [REQ_ID=e47c601b8931] [INIT] App\Controllers\Home::GET
INFO - 2026-03-06 03:48:01 --> [REQ_ID=e47c601b8931] [MEMORY][controller-start] 6291456
INFO - 2026-03-06 03:48:01 --> [REQ_ID=e47c601b8931] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-06 03:48:01 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-06 03:48:02 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-03-06 03:48:02 --> [REQ_ID=e47c601b8931] [VIEW_RENDER] themes/public/home
INFO - 2026-03-06 03:48:02 --> [REQ_ID=e47c601b8931] [MEMORY][commonData:start] 10485760
INFO - 2026-03-06 03:48:02 --> themesMemory usage: 10485760
DEBUG - 2026-03-06 03:48:02 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-06 03:48:02 --> [REQ_ID=69c14415144f] [FILTER_AFTER]
DEBUG - 2026-03-06 03:48:02 --> [REQ_ID=69c14415144f] [LIFECYCLE][END] status=200 duration_ms=845.76 memory_delta=4194304
INFO - 2026-03-06 03:48:02 --> [REQ_ID=e47c601b8931] [PERF] Execution time=0.843726
DEBUG - 2026-03-06 03:48:02 --> [REQ_ID=69c14415144f] [REQUEST][END]
INFO - 2026-03-06 03:48:02 --> [REQ_ID=69c14415144f] [PERF] Execution time=0.884676
DEBUG - 2026-03-06 03:51:19 --> [REQ_ID=cd3643e76a2f] [REQUEST][START] HEAD /
DEBUG - 2026-03-06 03:51:19 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-06 03:51:19 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-06 03:51:19 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-06 03:51:19 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-06 03:51:19 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-06 03:55:10 --> [REQ_ID=ea51510b81ca] [REQUEST][START] GET /index.php/Management/Marketing/Video-Creator
DEBUG - 2026-03-06 03:55:10 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-06 03:55:10 --> [REQ_ID=ea51510b81ca] [FILTER_BEFORE] /index.php/Management/Marketing/Video-Creator
DEBUG - 2026-03-06 03:55:10 --> [REQ_ID=ea51510b81ca] [ROUTE] Controller=\App\Modules\Management\Controllers\MarketingAdminController Method=videoCreator
DEBUG - 2026-03-06 03:55:10 --> [REQ_ID=ea51510b81ca] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Management/Marketing/Video-Creator
DEBUG - 2026-03-06 03:55:10 --> [CSRF] token name=csrf_test_name hash=05c3074441f248ccdb42018cc1f52f8f
DEBUG - 2026-03-06 03:55:10 --> [REQ_ID=ea51510b81ca] [REQUEST][END]
INFO - 2026-03-06 03:55:10 --> [REQ_ID=ea51510b81ca] [PERF] Execution time=0.057723
DEBUG - 2026-03-06 03:55:16 --> [REQ_ID=c9399ee16256] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-06 03:55:16 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-06 03:55:16 --> [REQ_ID=c9399ee16256] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-06 03:55:16 --> [REQ_ID=c9399ee16256] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-06 03:55:16 --> [REQ_ID=c9399ee16256] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-06 03:55:16 --> [CSRF] token name=csrf_test_name hash=4e66ab4b67cefedab445d0f40fb11998
DEBUG - 2026-03-06 03:55:16 --> [REQ_ID=9752abcce5cc] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-06 03:55:16 --> [REQ_ID=9752abcce5cc] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-06 03:55:16 --> [REQ_ID=c9399ee16256] [FILTER_AFTER]
DEBUG - 2026-03-06 03:55:16 --> [REQ_ID=c9399ee16256] [LIFECYCLE][END] status=200 duration_ms=125.72 memory_delta=0
INFO - 2026-03-06 03:55:16 --> [REQ_ID=9752abcce5cc] [PERF] Execution time=0.125383
DEBUG - 2026-03-06 03:55:16 --> [REQ_ID=c9399ee16256] [REQUEST][END]
INFO - 2026-03-06 03:55:16 --> [REQ_ID=c9399ee16256] [PERF] Execution time=0.138262
DEBUG - 2026-03-06 03:56:19 --> [REQ_ID=aa66c723a46b] [REQUEST][START] HEAD /
DEBUG - 2026-03-06 03:56:19 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-06 03:56:19 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-06 03:56:19 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-06 03:56:19 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-06 03:56:19 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
INFO - 2026-03-06 04:00:02 --> [spark:ops:work] Started
INFO - 2026-03-06 04:00:02 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-03-06 04:00:02 --> [SPARK_MEMORY] 16777216
INFO - 2026-03-06 04:00:02 --> [spark:ops:work] Intent
INFO - 2026-03-06 04:00:02 --> [SPARK_START] App\Commands\AIOps\Run
INFO - 2026-03-06 04:00:02 --> [SPARK_MEMORY] 16777216
INFO - 2026-03-06 04:00:02 --> [spark:aiops:run] Intent
DEBUG - 2026-03-06 04:00:02 --> [REQ_ID=d4fa88918ab4] [REQUEST][START] GET /index.php/API/Management/Run-CRON-Tasks
INFO - 2026-03-06 04:00:02 --> [spark:ops:work] Completed
INFO - 2026-03-06 04:00:02 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.063868
INFO - 2026-03-06 04:00:02 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-03-06 04:00:02 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-06 04:00:02 --> [REQ_ID=d4fa88918ab4] [FILTER_BEFORE] /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-06 04:00:02 --> [REQ_ID=d4fa88918ab4] [ROUTE] Controller=\App\Modules\Management\Controllers\ManagementAPIController Method=Run_CRON_Tasks
DEBUG - 2026-03-06 04:00:02 --> [REQ_ID=d4fa88918ab4] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-06 04:00:02 --> [REQ_ID=d4fa88918ab4] [REQUEST][END]
INFO - 2026-03-06 04:00:02 --> [REQ_ID=d4fa88918ab4] [PERF] Execution time=0.083708
INFO - 2026-03-06 04:00:03 --> [AIOPS][SPARK][GOVERNANCE][spark:logs:summarize] Started
INFO - 2026-03-06 04:00:03 --> [SPARK_START] App\Commands\Logs\Summarize
INFO - 2026-03-06 04:00:03 --> [SPARK_MEMORY] 16777216
INFO - 2026-03-06 04:00:03 --> [spark:logs:summarize] Intent
INFO - 2026-03-06 04:00:03 --> [AIOPS][SPARK][GOVERNANCE][spark:logs:summarize] Completed
INFO - 2026-03-06 04:00:03 --> [SPARK_COMPLETE] App\Commands\Logs\Summarize duration=0.005440
INFO - 2026-03-06 04:00:03 --> [SPARK_MEMORY] 18874368
INFO - 2026-03-06 04:00:03 --> [spark:app:healthcheck] Started
INFO - 2026-03-06 04:00:03 --> [SPARK_START] App\Commands\App\Healthcheck
INFO - 2026-03-06 04:00:03 --> [SPARK_MEMORY] 16777216
INFO - 2026-03-06 04:00:03 --> [spark:app:healthcheck] Intent
DEBUG - 2026-03-06 04:00:03 --> LOG_HEALTHCHECK debug marker=9d8d7ad3cf7d
INFO - 2026-03-06 04:00:03 --> LOG_HEALTHCHECK info marker=9d8d7ad3cf7d
NOTICE - 2026-03-06 04:00:03 --> LOG_HEALTHCHECK probe marker=9d8d7ad3cf7d
INFO - 2026-03-06 04:00:03 --> [spark:app:healthcheck] Completed
INFO - 2026-03-06 04:00:03 --> [SPARK_COMPLETE] App\Commands\App\Healthcheck duration=0.026015
INFO - 2026-03-06 04:00:03 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-03-06 04:00:04 --> OllamaPatchRunner:L142 - validateGeneratedPatch Content: 
WARNING - 2026-03-06 04:00:04 --> OllamaPatchRunner:L49 - Original Diff: 
DEBUG - 2026-03-06 04:00:05 --> OllamaPatchRunner:L51 - Retried Diff: 
DEBUG - 2026-03-06 04:00:05 --> OllamaPatchRunner:L142 - validateGeneratedPatch Content: 
DEBUG - 2026-03-06 04:00:05 --> OllamaPatchRunner:L53 - Validating Generated Patch Failed
INFO - 2026-03-06 04:00:05 --> [SPARK_COMPLETE] App\Commands\AIOps\Run duration=3.369059
INFO - 2026-03-06 04:00:05 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-03-06 04:01:19 --> [REQ_ID=b1ee9206f38a] [REQUEST][START] HEAD /
DEBUG - 2026-03-06 04:01:19 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-06 04:01:19 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-06 04:01:19 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-06 04:01:19 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-06 04:01:19 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-06 04:06:19 --> [REQ_ID=e9bc13acde63] [REQUEST][START] HEAD /
DEBUG - 2026-03-06 04:06:19 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-06 04:06:19 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-06 04:06:19 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-06 04:06:19 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-06 04:06:19 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-06 04:07:32 --> [REQ_ID=122ec411850a] [REQUEST][START] GET /index.php/Wallets
DEBUG - 2026-03-06 04:07:32 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-06 04:07:33 --> [REQ_ID=122ec411850a] [FILTER_BEFORE] /index.php/Wallets
DEBUG - 2026-03-06 04:07:33 --> [REQ_ID=122ec411850a] [ROUTE] Controller=\App\Modules\User\Controllers\WalletsController Method=index
DEBUG - 2026-03-06 04:07:33 --> [REQ_ID=122ec411850a] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Wallets
DEBUG - 2026-03-06 04:07:33 --> [CSRF] token name=csrf_test_name hash=7964b0e3fa18058180f08f7861b400e4
DEBUG - 2026-03-06 04:07:33 --> [REQ_ID=122ec411850a] [REQUEST][END]
INFO - 2026-03-06 04:07:33 --> [REQ_ID=122ec411850a] [PERF] Execution time=0.032696
DEBUG - 2026-03-06 04:07:44 --> [REQ_ID=4feea9a00e37] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-06 04:07:44 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-06 04:07:44 --> [REQ_ID=4feea9a00e37] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-06 04:07:44 --> [REQ_ID=4feea9a00e37] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-06 04:07:44 --> [REQ_ID=4feea9a00e37] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-06 04:07:44 --> [CSRF] token name=csrf_test_name hash=cd8c4b7e935758a777894ce844232dba
DEBUG - 2026-03-06 04:07:44 --> [REQ_ID=85b269021a40] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-06 04:07:44 --> [REQ_ID=85b269021a40] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-06 04:07:45 --> [REQ_ID=4feea9a00e37] [FILTER_AFTER]
DEBUG - 2026-03-06 04:07:45 --> [REQ_ID=4feea9a00e37] [LIFECYCLE][END] status=200 duration_ms=492.70 memory_delta=0
INFO - 2026-03-06 04:07:45 --> [REQ_ID=85b269021a40] [PERF] Execution time=0.492012
DEBUG - 2026-03-06 04:07:45 --> [REQ_ID=4feea9a00e37] [REQUEST][END]
INFO - 2026-03-06 04:07:45 --> [REQ_ID=4feea9a00e37] [PERF] Execution time=0.504720
DEBUG - 2026-03-06 04:08:52 --> [REQ_ID=4b7528451848] [REQUEST][START] GET /index.php/Management/Exchange
DEBUG - 2026-03-06 04:08:52 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-06 04:08:52 --> [REQ_ID=4b7528451848] [FILTER_BEFORE] /index.php/Management/Exchange
DEBUG - 2026-03-06 04:08:52 --> [REQ_ID=4b7528451848] [ROUTE] Controller=\App\Modules\Management\Controllers\ExchangeAdminController Method=index
DEBUG - 2026-03-06 04:08:52 --> [REQ_ID=4b7528451848] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Management/Exchange
DEBUG - 2026-03-06 04:08:52 --> [CSRF] token name=csrf_test_name hash=2e7416065e0a62b0ed58d2bff84dd993
DEBUG - 2026-03-06 04:08:52 --> [REQ_ID=4b7528451848] [REQUEST][END]
INFO - 2026-03-06 04:08:52 --> [REQ_ID=4b7528451848] [PERF] Execution time=0.012057
DEBUG - 2026-03-06 04:08:59 --> [REQ_ID=53ecca5294f7] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-06 04:08:59 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-06 04:08:59 --> [REQ_ID=53ecca5294f7] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-06 04:08:59 --> [REQ_ID=53ecca5294f7] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-06 04:08:59 --> [REQ_ID=53ecca5294f7] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-06 04:08:59 --> [CSRF] token name=csrf_test_name hash=ac1d698eb483857bb44b5d0bf37d025e
DEBUG - 2026-03-06 04:08:59 --> [REQ_ID=7f16ca0e645d] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-06 04:08:59 --> [REQ_ID=7f16ca0e645d] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-06 04:08:59 --> [REQ_ID=53ecca5294f7] [FILTER_AFTER]
DEBUG - 2026-03-06 04:08:59 --> [REQ_ID=53ecca5294f7] [LIFECYCLE][END] status=200 duration_ms=208.68 memory_delta=0
INFO - 2026-03-06 04:08:59 --> [REQ_ID=7f16ca0e645d] [PERF] Execution time=0.208077
DEBUG - 2026-03-06 04:08:59 --> [REQ_ID=53ecca5294f7] [REQUEST][END]
INFO - 2026-03-06 04:08:59 --> [REQ_ID=53ecca5294f7] [PERF] Execution time=0.218646
DEBUG - 2026-03-06 04:10:27 --> [REQ_ID=48b1aaf7666f] [REQUEST][START] GET /index.php/resend-activation
DEBUG - 2026-03-06 04:10:27 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-06 04:10:27 --> [REQ_ID=48b1aaf7666f] [FILTER_BEFORE] /index.php/resend-activation
DEBUG - 2026-03-06 04:10:27 --> [REQ_ID=48b1aaf7666f] [ROUTE] Controller=\App\Controllers\AuthController Method=resendActivation
DEBUG - 2026-03-06 04:10:27 --> [REQ_ID=48b1aaf7666f] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/resend-activation
DEBUG - 2026-03-06 04:10:27 --> [CSRF] token name=csrf_test_name hash=53bca1adb9581f4998eeef16717bcfde
DEBUG - 2026-03-06 04:10:27 --> [REQ_ID=cefcba55db32] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-06 04:10:27 --> [REQ_ID=cefcba55db32] [MEMORY][controller-start] 6291456
DEBUG - 2026-03-06 04:10:28 --> [REQ_ID=48b1aaf7666f] [FILTER_AFTER]
DEBUG - 2026-03-06 04:10:28 --> [REQ_ID=48b1aaf7666f] [LIFECYCLE][END] status=200 duration_ms=61.68 memory_delta=0
INFO - 2026-03-06 04:10:28 --> [REQ_ID=cefcba55db32] [PERF] Execution time=0.059262
DEBUG - 2026-03-06 04:10:28 --> [REQ_ID=48b1aaf7666f] [REQUEST][END]
INFO - 2026-03-06 04:10:28 --> [REQ_ID=48b1aaf7666f] [PERF] Execution time=0.101627
DEBUG - 2026-03-06 04:11:19 --> [REQ_ID=3c70e9dd904e] [REQUEST][START] HEAD /
DEBUG - 2026-03-06 04:11:19 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-06 04:11:19 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-06 04:11:19 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-06 04:11:19 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-06 04:11:19 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
INFO - 2026-03-06 04:15:02 --> [spark:ops:work] Started
INFO - 2026-03-06 04:15:02 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-03-06 04:15:02 --> [SPARK_MEMORY] 16777216
INFO - 2026-03-06 04:15:02 --> [spark:ops:work] Intent
DEBUG - 2026-03-06 04:15:02 --> [REQ_ID=c773a3ad540c] [REQUEST][START] GET /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-06 04:15:02 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-06 04:15:02 --> [REQ_ID=c773a3ad540c] [FILTER_BEFORE] /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-06 04:15:02 --> [REQ_ID=c773a3ad540c] [ROUTE] Controller=\App\Modules\APIs\Controllers\AlertsAPIController Method=fetchEmailAlerts
DEBUG - 2026-03-06 04:15:02 --> [REQ_ID=c773a3ad540c] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-06 04:15:02 --> [REQ_ID=c773a3ad540c] [REQUEST][END]
INFO - 2026-03-06 04:15:02 --> [REQ_ID=c773a3ad540c] [PERF] Execution time=0.063329
INFO - 2026-03-06 04:15:02 --> [spark:ops:work] Completed
INFO - 2026-03-06 04:15:02 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.339258
INFO - 2026-03-06 04:15:02 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-03-06 04:16:19 --> [REQ_ID=5444cd6730bb] [REQUEST][START] HEAD /
DEBUG - 2026-03-06 04:16:19 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-06 04:16:19 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-06 04:16:19 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-06 04:16:19 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-06 04:16:19 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-06 04:21:19 --> [REQ_ID=310e39ce022e] [REQUEST][START] HEAD /
DEBUG - 2026-03-06 04:21:19 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-06 04:21:19 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-06 04:21:19 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-06 04:21:19 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-06 04:21:19 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-06 04:26:19 --> [REQ_ID=7b27259e85e1] [REQUEST][START] HEAD /
DEBUG - 2026-03-06 04:26:19 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-06 04:26:19 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-06 04:26:19 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-06 04:26:19 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-06 04:26:19 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-06 04:29:42 --> [REQ_ID=26afe50845d8] [REQUEST][START] GET /
DEBUG - 2026-03-06 04:29:42 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-06 04:29:42 --> [REQ_ID=26afe50845d8] [FILTER_BEFORE] /
DEBUG - 2026-03-06 04:29:42 --> [REQ_ID=26afe50845d8] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-06 04:29:42 --> [REQ_ID=26afe50845d8] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-06 04:29:42 --> [CSRF] token name=csrf_test_name hash=1ef3ad5dfa2b0046566e3fe37685af2a
DEBUG - 2026-03-06 04:29:42 --> [REQ_ID=2c75fc28e91f] [INIT] App\Controllers\Home::GET
INFO - 2026-03-06 04:29:42 --> [REQ_ID=2c75fc28e91f] [MEMORY][controller-start] 6291456
INFO - 2026-03-06 04:29:42 --> [REQ_ID=2c75fc28e91f] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-06 04:29:42 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-06 04:29:42 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-03-06 04:29:42 --> [REQ_ID=2c75fc28e91f] [VIEW_RENDER] themes/public/home
INFO - 2026-03-06 04:29:42 --> [REQ_ID=2c75fc28e91f] [MEMORY][commonData:start] 10485760
INFO - 2026-03-06 04:29:42 --> themesMemory usage: 10485760
DEBUG - 2026-03-06 04:29:42 --> [MetaService] slug= pageName=Home cacheHit= path=DB
DEBUG - 2026-03-06 04:29:42 --> [REQ_ID=26afe50845d8] [FILTER_AFTER]
DEBUG - 2026-03-06 04:29:42 --> [REQ_ID=26afe50845d8] [LIFECYCLE][END] status=200 duration_ms=644.07 memory_delta=4194304
INFO - 2026-03-06 04:29:42 --> [REQ_ID=2c75fc28e91f] [PERF] Execution time=0.641929
DEBUG - 2026-03-06 04:29:42 --> [REQ_ID=26afe50845d8] [REQUEST][END]
INFO - 2026-03-06 04:29:42 --> [REQ_ID=26afe50845d8] [PERF] Execution time=0.682590
INFO - 2026-03-06 04:30:01 --> [spark:ops:work] Started
INFO - 2026-03-06 04:30:01 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-03-06 04:30:01 --> [SPARK_MEMORY] 16777216
INFO - 2026-03-06 04:30:01 --> [spark:ops:work] Intent
INFO - 2026-03-06 04:30:01 --> [spark:ops:work] Completed
INFO - 2026-03-06 04:30:01 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.096488
INFO - 2026-03-06 04:30:01 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-03-06 04:31:19 --> [REQ_ID=5fce90c58af7] [REQUEST][START] HEAD /
DEBUG - 2026-03-06 04:31:19 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-06 04:31:19 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-06 04:31:19 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-06 04:31:19 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-06 04:31:19 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-06 04:32:35 --> [REQ_ID=70d47febbddb] [REQUEST][START] HEAD /
DEBUG - 2026-03-06 04:32:35 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-06 04:32:35 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-06 04:32:35 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-06 04:32:35 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-06 04:32:35 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://mymiwallet.com/
DEBUG - 2026-03-06 04:36:19 --> [REQ_ID=c9a003d0664b] [REQUEST][START] HEAD /
DEBUG - 2026-03-06 04:36:19 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-06 04:36:19 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-06 04:36:19 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-06 04:36:19 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-06 04:36:19 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-06 04:41:19 --> [REQ_ID=21a3e9f3690e] [REQUEST][START] HEAD /
DEBUG - 2026-03-06 04:41:19 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-06 04:41:19 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-06 04:41:19 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-06 04:41:19 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-06 04:41:19 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
INFO - 2026-03-06 04:45:02 --> [spark:ops:work] Started
INFO - 2026-03-06 04:45:02 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-03-06 04:45:02 --> [SPARK_MEMORY] 16777216
INFO - 2026-03-06 04:45:02 --> [spark:ops:work] Intent
INFO - 2026-03-06 04:45:02 --> [spark:ops:work] Completed
INFO - 2026-03-06 04:45:02 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.047565
INFO - 2026-03-06 04:45:02 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-03-06 04:46:19 --> [REQ_ID=13656c09e946] [REQUEST][START] HEAD /
DEBUG - 2026-03-06 04:46:19 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-06 04:46:19 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-06 04:46:19 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-06 04:46:19 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-06 04:46:19 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-06 04:51:19 --> [REQ_ID=ec56ed822c4c] [REQUEST][START] HEAD /
DEBUG - 2026-03-06 04:51:19 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-06 04:51:19 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-06 04:51:19 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-06 04:51:19 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-06 04:51:19 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-06 04:56:19 --> [REQ_ID=58f54eb84c65] [REQUEST][START] HEAD /
DEBUG - 2026-03-06 04:56:19 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-06 04:56:19 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-06 04:56:19 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-06 04:56:19 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-06 04:56:19 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
INFO - 2026-03-06 05:00:01 --> [spark:ops:work] Started
INFO - 2026-03-06 05:00:01 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-03-06 05:00:01 --> [SPARK_MEMORY] 16777216
INFO - 2026-03-06 05:00:01 --> [spark:ops:work] Intent
DEBUG - 2026-03-06 05:00:01 --> [REQ_ID=2a4b5cea69c3] [REQUEST][START] GET /index.php/API/Management/Run-CRON-Tasks
INFO - 2026-03-06 05:00:01 --> [spark:ops:work] Completed
INFO - 2026-03-06 05:00:01 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.064638
INFO - 2026-03-06 05:00:01 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-03-06 05:00:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-06 05:00:01 --> [REQ_ID=2a4b5cea69c3] [FILTER_BEFORE] /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-06 05:00:01 --> [REQ_ID=2a4b5cea69c3] [ROUTE] Controller=\App\Modules\Management\Controllers\ManagementAPIController Method=Run_CRON_Tasks
DEBUG - 2026-03-06 05:00:01 --> [REQ_ID=2a4b5cea69c3] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-06 05:00:01 --> [REQ_ID=2a4b5cea69c3] [REQUEST][END]
INFO - 2026-03-06 05:00:01 --> [REQ_ID=2a4b5cea69c3] [PERF] Execution time=0.055980
DEBUG - 2026-03-06 05:01:19 --> [REQ_ID=2b343e313007] [REQUEST][START] HEAD /
DEBUG - 2026-03-06 05:01:19 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-06 05:01:19 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-06 05:01:19 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-06 05:01:20 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-06 05:01:20 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-06 05:06:19 --> [REQ_ID=3063a54d5317] [REQUEST][START] HEAD /
DEBUG - 2026-03-06 05:06:19 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-06 05:06:19 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-06 05:06:19 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-06 05:06:19 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-06 05:06:19 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-06 05:11:19 --> [REQ_ID=923dcfe3a2f1] [REQUEST][START] HEAD /
DEBUG - 2026-03-06 05:11:19 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-06 05:11:19 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-06 05:11:20 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-06 05:11:20 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-06 05:11:20 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
INFO - 2026-03-06 05:15:01 --> [spark:ops:work] Started
INFO - 2026-03-06 05:15:01 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-03-06 05:15:01 --> [SPARK_MEMORY] 16777216
INFO - 2026-03-06 05:15:01 --> [spark:ops:work] Intent
DEBUG - 2026-03-06 05:15:01 --> [REQ_ID=5208fdaa83e3] [REQUEST][START] GET /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-06 05:15:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-06 05:15:01 --> [REQ_ID=5208fdaa83e3] [FILTER_BEFORE] /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-06 05:15:01 --> [REQ_ID=5208fdaa83e3] [ROUTE] Controller=\App\Modules\APIs\Controllers\AlertsAPIController Method=fetchEmailAlerts
DEBUG - 2026-03-06 05:15:01 --> [REQ_ID=5208fdaa83e3] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-06 05:15:01 --> [REQ_ID=5208fdaa83e3] [REQUEST][END]
INFO - 2026-03-06 05:15:01 --> [REQ_ID=5208fdaa83e3] [PERF] Execution time=0.058297
INFO - 2026-03-06 05:15:01 --> [spark:ops:work] Completed
INFO - 2026-03-06 05:15:01 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.224994
INFO - 2026-03-06 05:15:01 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-03-06 05:16:19 --> [REQ_ID=6f751a54fdcf] [REQUEST][START] HEAD /
DEBUG - 2026-03-06 05:16:19 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-06 05:16:19 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-06 05:16:19 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-06 05:16:19 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-06 05:16:19 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-06 05:19:14 --> [REQ_ID=7dade0aec9ae] [REQUEST][START] GET /index.php/How-It-Works/Purchase-MyMI-Gold
DEBUG - 2026-03-06 05:19:14 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-06 05:19:14 --> [REQ_ID=7dade0aec9ae] [FILTER_BEFORE] /index.php/How-It-Works/Purchase-MyMI-Gold
DEBUG - 2026-03-06 05:19:14 --> [REQ_ID=7dade0aec9ae] [ROUTE] Controller=\App\Modules\Blog\Controllers\HowItWorksController Method=show
DEBUG - 2026-03-06 05:19:14 --> [REQ_ID=7dade0aec9ae] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/How-It-Works/Purchase-MyMI-Gold
DEBUG - 2026-03-06 05:19:14 --> [CSRF] token name=csrf_test_name hash=f029fdb32067aadd76cef367d8dbe635
DEBUG - 2026-03-06 05:19:14 --> [REQ_ID=79599640165c] [INIT] App\Modules\Blog\Controllers\HowItWorksController::GET
INFO - 2026-03-06 05:19:14 --> [REQ_ID=79599640165c] [MEMORY][controller-start] 6291456
DEBUG - 2026-03-06 05:19:14 --> [REQ_ID=79599640165c] [METHOD_ENTRY] show
DEBUG - 2026-03-06 05:19:14 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-06 05:19:14 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-06 05:19:14 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-06 05:19:14 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-06 05:19:14 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-06 05:19:14 --> MyMICoin: guest context detected; skipping user-specific preload.
ERROR - 2026-03-06 05:19:14 --> [ERROR_PAGE] event=error_404 status=404 message=Page not found.
DEBUG - 2026-03-06 05:19:14 --> [REQ_ID=7dade0aec9ae] [FILTER_AFTER]
DEBUG - 2026-03-06 05:19:14 --> [REQ_ID=7dade0aec9ae] [LIFECYCLE][END] status=404 duration_ms=160.92 memory_delta=0
INFO - 2026-03-06 05:19:14 --> [REQ_ID=79599640165c] [PERF] Execution time=0.158989
DEBUG - 2026-03-06 05:19:14 --> [REQ_ID=7dade0aec9ae] [REQUEST][END]
INFO - 2026-03-06 05:19:14 --> [REQ_ID=7dade0aec9ae] [PERF] Execution time=0.204450
DEBUG - 2026-03-06 05:21:19 --> [REQ_ID=16dc44ce2950] [REQUEST][START] HEAD /
DEBUG - 2026-03-06 05:21:19 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-06 05:21:19 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-06 05:21:19 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-06 05:21:19 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-06 05:21:19 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-06 05:26:19 --> [REQ_ID=a494e72caa01] [REQUEST][START] HEAD /
DEBUG - 2026-03-06 05:26:19 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-06 05:26:19 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-06 05:26:19 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-06 05:26:19 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-06 05:26:20 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
INFO - 2026-03-06 05:30:01 --> [spark:ops:work] Started
INFO - 2026-03-06 05:30:01 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-03-06 05:30:01 --> [SPARK_MEMORY] 16777216
INFO - 2026-03-06 05:30:01 --> [spark:ops:work] Intent
INFO - 2026-03-06 05:30:01 --> [spark:ops:work] Completed
INFO - 2026-03-06 05:30:01 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.043976
INFO - 2026-03-06 05:30:01 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-03-06 05:31:19 --> [REQ_ID=cf79857f2ce6] [REQUEST][START] HEAD /
DEBUG - 2026-03-06 05:31:19 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-06 05:31:19 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-06 05:31:19 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-06 05:31:19 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-06 05:31:19 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-06 05:36:19 --> [REQ_ID=4840a14e6911] [REQUEST][START] HEAD /
DEBUG - 2026-03-06 05:36:19 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-06 05:36:19 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-06 05:36:20 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-06 05:36:20 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-06 05:36:20 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-06 05:41:19 --> [REQ_ID=d3644bd92e2c] [REQUEST][START] HEAD /
DEBUG - 2026-03-06 05:41:19 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-06 05:41:19 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-06 05:41:19 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-06 05:41:19 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-06 05:41:19 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
INFO - 2026-03-06 05:45:02 --> [spark:ops:work] Started
INFO - 2026-03-06 05:45:02 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-03-06 05:45:02 --> [SPARK_MEMORY] 16777216
INFO - 2026-03-06 05:45:02 --> [spark:ops:work] Intent
INFO - 2026-03-06 05:45:02 --> [spark:ops:work] Completed
INFO - 2026-03-06 05:45:02 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.187742
INFO - 2026-03-06 05:45:02 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-03-06 05:46:19 --> [REQ_ID=f62e0e45352b] [REQUEST][START] HEAD /
DEBUG - 2026-03-06 05:46:19 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-06 05:46:19 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-06 05:46:20 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-06 05:46:20 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-06 05:46:20 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-06 05:51:19 --> [REQ_ID=1bcadff77f73] [REQUEST][START] HEAD /
DEBUG - 2026-03-06 05:51:19 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-06 05:51:19 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-06 05:51:19 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-06 05:51:19 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-06 05:51:19 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-06 05:52:32 --> [REQ_ID=fb891ca4f9be] [REQUEST][START] GET /
DEBUG - 2026-03-06 05:52:32 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-06 05:52:32 --> [REQ_ID=fb891ca4f9be] [FILTER_BEFORE] /
DEBUG - 2026-03-06 05:52:32 --> [REQ_ID=fb891ca4f9be] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-06 05:52:32 --> [REQ_ID=fb891ca4f9be] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-06 05:52:32 --> [CSRF] token name=csrf_test_name hash=7688148742a802530578409b31ce433e
DEBUG - 2026-03-06 05:52:32 --> [REQ_ID=ac8f7a4747af] [INIT] App\Controllers\Home::GET
INFO - 2026-03-06 05:52:32 --> [REQ_ID=ac8f7a4747af] [MEMORY][controller-start] 6291456
INFO - 2026-03-06 05:52:32 --> [REQ_ID=ac8f7a4747af] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-06 05:52:32 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-06 05:52:32 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-03-06 05:52:32 --> [REQ_ID=ac8f7a4747af] [VIEW_RENDER] themes/public/home
INFO - 2026-03-06 05:52:32 --> [REQ_ID=ac8f7a4747af] [MEMORY][commonData:start] 10485760
INFO - 2026-03-06 05:52:32 --> themesMemory usage: 10485760
DEBUG - 2026-03-06 05:52:32 --> [MetaService] slug= pageName=Home cacheHit= path=DB
DEBUG - 2026-03-06 05:52:32 --> [REQ_ID=fb891ca4f9be] [FILTER_AFTER]
DEBUG - 2026-03-06 05:52:32 --> [REQ_ID=fb891ca4f9be] [LIFECYCLE][END] status=200 duration_ms=591.15 memory_delta=4194304
INFO - 2026-03-06 05:52:32 --> [REQ_ID=ac8f7a4747af] [PERF] Execution time=0.589166
DEBUG - 2026-03-06 05:52:32 --> [REQ_ID=fb891ca4f9be] [REQUEST][END]
INFO - 2026-03-06 05:52:32 --> [REQ_ID=fb891ca4f9be] [PERF] Execution time=0.629142
DEBUG - 2026-03-06 05:56:19 --> [REQ_ID=220be506faf0] [REQUEST][START] HEAD /
DEBUG - 2026-03-06 05:56:19 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-06 05:56:19 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-06 05:56:20 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-06 05:56:20 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-06 05:56:20 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
INFO - 2026-03-06 06:00:01 --> [spark:ops:work] Started
INFO - 2026-03-06 06:00:01 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-03-06 06:00:01 --> [SPARK_MEMORY] 16777216
INFO - 2026-03-06 06:00:01 --> [spark:ops:work] Intent
INFO - 2026-03-06 06:00:01 --> [SPARK_START] App\Commands\AIOps\Run
INFO - 2026-03-06 06:00:01 --> [SPARK_MEMORY] 16777216
INFO - 2026-03-06 06:00:01 --> [spark:aiops:run] Intent
DEBUG - 2026-03-06 06:00:01 --> [REQ_ID=edd4353b0f80] [REQUEST][START] GET /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-06 06:00:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-06 06:00:01 --> [REQ_ID=edd4353b0f80] [FILTER_BEFORE] /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-06 06:00:01 --> [REQ_ID=edd4353b0f80] [ROUTE] Controller=\App\Modules\Management\Controllers\ManagementAPIController Method=Run_CRON_Tasks
DEBUG - 2026-03-06 06:00:01 --> [REQ_ID=edd4353b0f80] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-06 06:00:01 --> [REQ_ID=edd4353b0f80] [REQUEST][END]
INFO - 2026-03-06 06:00:01 --> [REQ_ID=edd4353b0f80] [PERF] Execution time=0.091404
INFO - 2026-03-06 06:00:02 --> [spark:ops:work] Completed
INFO - 2026-03-06 06:00:02 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.250697
INFO - 2026-03-06 06:00:02 --> [SPARK_MEMORY] 18874368
INFO - 2026-03-06 06:00:03 --> [AIOPS][SPARK][GOVERNANCE][spark:logs:summarize] Started
INFO - 2026-03-06 06:00:03 --> [SPARK_START] App\Commands\Logs\Summarize
INFO - 2026-03-06 06:00:03 --> [SPARK_MEMORY] 16777216
INFO - 2026-03-06 06:00:03 --> [spark:logs:summarize] Intent
INFO - 2026-03-06 06:00:03 --> [AIOPS][SPARK][GOVERNANCE][spark:logs:summarize] Completed
INFO - 2026-03-06 06:00:03 --> [SPARK_COMPLETE] App\Commands\Logs\Summarize duration=0.006746
INFO - 2026-03-06 06:00:03 --> [SPARK_MEMORY] 18874368
INFO - 2026-03-06 06:00:03 --> [spark:app:healthcheck] Started
INFO - 2026-03-06 06:00:03 --> [SPARK_START] App\Commands\App\Healthcheck
INFO - 2026-03-06 06:00:03 --> [SPARK_MEMORY] 16777216
INFO - 2026-03-06 06:00:03 --> [spark:app:healthcheck] Intent
DEBUG - 2026-03-06 06:00:03 --> LOG_HEALTHCHECK debug marker=832685fa0486
INFO - 2026-03-06 06:00:03 --> LOG_HEALTHCHECK info marker=832685fa0486
NOTICE - 2026-03-06 06:00:03 --> LOG_HEALTHCHECK probe marker=832685fa0486
INFO - 2026-03-06 06:00:03 --> [spark:app:healthcheck] Completed
INFO - 2026-03-06 06:00:03 --> [SPARK_COMPLETE] App\Commands\App\Healthcheck duration=0.029202
INFO - 2026-03-06 06:00:03 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-03-06 06:00:04 --> OllamaPatchRunner:L142 - validateGeneratedPatch Content: 
WARNING - 2026-03-06 06:00:04 --> OllamaPatchRunner:L49 - Original Diff: 
DEBUG - 2026-03-06 06:00:05 --> OllamaPatchRunner:L51 - Retried Diff: 
DEBUG - 2026-03-06 06:00:05 --> OllamaPatchRunner:L142 - validateGeneratedPatch Content: 
DEBUG - 2026-03-06 06:00:05 --> OllamaPatchRunner:L53 - Validating Generated Patch Failed
INFO - 2026-03-06 06:00:05 --> [SPARK_COMPLETE] App\Commands\AIOps\Run duration=3.366449
INFO - 2026-03-06 06:00:05 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-03-06 06:01:19 --> [REQ_ID=d30a63353787] [REQUEST][START] HEAD /
DEBUG - 2026-03-06 06:01:19 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-06 06:01:19 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-06 06:01:20 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-06 06:01:20 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-06 06:01:20 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-06 06:02:01 --> [REQ_ID=c9070bfaa97a] [REQUEST][START] GET /index.php/Knowledgebase/Assets
DEBUG - 2026-03-06 06:02:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-06 06:02:01 --> [REQ_ID=c9070bfaa97a] [FILTER_BEFORE] /index.php/Knowledgebase/Assets
DEBUG - 2026-03-06 06:02:01 --> [REQ_ID=c9070bfaa97a] [ROUTE] Controller=\App\Modules\User\Controllers\KnowledgebaseController Method=assets
DEBUG - 2026-03-06 06:02:01 --> [REQ_ID=c9070bfaa97a] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Knowledgebase/Assets
DEBUG - 2026-03-06 06:02:01 --> [CSRF] token name=csrf_test_name hash=5f2f8f382ad368986954d9fdadfd8312
DEBUG - 2026-03-06 06:02:01 --> [REQ_ID=c9070bfaa97a] [REQUEST][END]
INFO - 2026-03-06 06:02:01 --> [REQ_ID=c9070bfaa97a] [PERF] Execution time=0.031813
DEBUG - 2026-03-06 06:02:03 --> [REQ_ID=478e3521af3f] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-06 06:02:03 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-06 06:02:03 --> [REQ_ID=478e3521af3f] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-06 06:02:03 --> [REQ_ID=478e3521af3f] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-06 06:02:03 --> [REQ_ID=478e3521af3f] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-06 06:02:03 --> [CSRF] token name=csrf_test_name hash=ef6edec04a9008af235c764ef64bead0
DEBUG - 2026-03-06 06:02:03 --> [REQ_ID=d618991eb5bd] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-06 06:02:03 --> [REQ_ID=d618991eb5bd] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-06 06:02:03 --> [REQ_ID=478e3521af3f] [FILTER_AFTER]
DEBUG - 2026-03-06 06:02:03 --> [REQ_ID=478e3521af3f] [LIFECYCLE][END] status=200 duration_ms=156.46 memory_delta=0
INFO - 2026-03-06 06:02:03 --> [REQ_ID=d618991eb5bd] [PERF] Execution time=0.155274
DEBUG - 2026-03-06 06:02:03 --> [REQ_ID=478e3521af3f] [REQUEST][END]
INFO - 2026-03-06 06:02:03 --> [REQ_ID=478e3521af3f] [PERF] Execution time=0.168855
DEBUG - 2026-03-06 06:06:19 --> [REQ_ID=e3c24f518e03] [REQUEST][START] HEAD /
DEBUG - 2026-03-06 06:06:19 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-06 06:06:19 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-06 06:06:20 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-06 06:06:20 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-06 06:06:20 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-06 06:11:05 --> [REQ_ID=fab6fe6e5a08] [REQUEST][START] GET /
DEBUG - 2026-03-06 06:11:05 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-06 06:11:05 --> [REQ_ID=fab6fe6e5a08] [FILTER_BEFORE] /
DEBUG - 2026-03-06 06:11:05 --> [REQ_ID=fab6fe6e5a08] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-06 06:11:05 --> [REQ_ID=fab6fe6e5a08] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-06 06:11:05 --> [CSRF] token name=csrf_test_name hash=1a41f8eea355b5e3b5d4efb524945768
DEBUG - 2026-03-06 06:11:05 --> [REQ_ID=679fd3c37a97] [INIT] App\Controllers\Home::GET
INFO - 2026-03-06 06:11:05 --> [REQ_ID=679fd3c37a97] [MEMORY][controller-start] 6291456
INFO - 2026-03-06 06:11:05 --> [REQ_ID=679fd3c37a97] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-06 06:11:05 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-06 06:11:06 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-03-06 06:11:06 --> [REQ_ID=679fd3c37a97] [VIEW_RENDER] themes/public/home
INFO - 2026-03-06 06:11:06 --> [REQ_ID=679fd3c37a97] [MEMORY][commonData:start] 10485760
INFO - 2026-03-06 06:11:06 --> themesMemory usage: 10485760
DEBUG - 2026-03-06 06:11:06 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-06 06:11:06 --> [REQ_ID=fab6fe6e5a08] [FILTER_AFTER]
DEBUG - 2026-03-06 06:11:06 --> [REQ_ID=fab6fe6e5a08] [LIFECYCLE][END] status=200 duration_ms=676.66 memory_delta=4194304
INFO - 2026-03-06 06:11:06 --> [REQ_ID=679fd3c37a97] [PERF] Execution time=0.674558
DEBUG - 2026-03-06 06:11:06 --> [REQ_ID=fab6fe6e5a08] [REQUEST][END]
INFO - 2026-03-06 06:11:06 --> [REQ_ID=fab6fe6e5a08] [PERF] Execution time=0.715907
DEBUG - 2026-03-06 06:11:19 --> [REQ_ID=8c16703a133a] [REQUEST][START] HEAD /
DEBUG - 2026-03-06 06:11:19 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-06 06:11:19 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-06 06:11:19 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-06 06:11:19 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-06 06:11:19 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
INFO - 2026-03-06 06:15:02 --> [spark:ops:work] Started
INFO - 2026-03-06 06:15:02 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-03-06 06:15:02 --> [SPARK_MEMORY] 16777216
INFO - 2026-03-06 06:15:02 --> [spark:ops:work] Intent
DEBUG - 2026-03-06 06:15:02 --> [REQ_ID=b9fe71e7b2dd] [REQUEST][START] GET /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-06 06:15:02 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-06 06:15:02 --> [REQ_ID=b9fe71e7b2dd] [FILTER_BEFORE] /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-06 06:15:02 --> [REQ_ID=b9fe71e7b2dd] [ROUTE] Controller=\App\Modules\APIs\Controllers\AlertsAPIController Method=fetchEmailAlerts
DEBUG - 2026-03-06 06:15:02 --> [REQ_ID=b9fe71e7b2dd] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Alerts/fetchEmailAlerts
INFO - 2026-03-06 06:15:02 --> [spark:ops:work] Completed
INFO - 2026-03-06 06:15:02 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.106412
INFO - 2026-03-06 06:15:02 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-03-06 06:15:02 --> [REQ_ID=b9fe71e7b2dd] [REQUEST][END]
INFO - 2026-03-06 06:15:02 --> [REQ_ID=b9fe71e7b2dd] [PERF] Execution time=0.053526
DEBUG - 2026-03-06 06:16:19 --> [REQ_ID=134e695d6909] [REQUEST][START] HEAD /
DEBUG - 2026-03-06 06:16:19 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-06 06:16:19 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-06 06:16:19 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-06 06:16:19 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-06 06:16:19 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-06 06:21:19 --> [REQ_ID=59820b157cc7] [REQUEST][START] HEAD /
DEBUG - 2026-03-06 06:21:19 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-06 06:21:19 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-06 06:21:19 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-06 06:21:19 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-06 06:21:19 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-06 06:23:02 --> [REQ_ID=68103c153d3a] [REQUEST][START] GET /index.php/Profile
DEBUG - 2026-03-06 06:23:02 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-06 06:23:02 --> [REQ_ID=68103c153d3a] [FILTER_BEFORE] /index.php/Profile
DEBUG - 2026-03-06 06:23:02 --> [REQ_ID=68103c153d3a] [ROUTE] Controller=\App\Controllers\App\Modules\User\Controllers\DashboardController Method=profile
DEBUG - 2026-03-06 06:23:02 --> [REQ_ID=68103c153d3a] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Profile
DEBUG - 2026-03-06 06:23:02 --> [CSRF] token name=csrf_test_name hash=a765c3f5a4ecb5d72b6fd795facd92b4
DEBUG - 2026-03-06 06:23:02 --> [REQ_ID=68103c153d3a] [REQUEST][END]
INFO - 2026-03-06 06:23:02 --> [REQ_ID=68103c153d3a] [PERF] Execution time=0.046361
DEBUG - 2026-03-06 06:23:11 --> [REQ_ID=1404ef97e9af] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-06 06:23:11 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-06 06:23:11 --> [REQ_ID=1404ef97e9af] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-06 06:23:11 --> [REQ_ID=1404ef97e9af] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-06 06:23:11 --> [REQ_ID=1404ef97e9af] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-06 06:23:11 --> [CSRF] token name=csrf_test_name hash=19955d741b2389edb7d9961ffc765d78
DEBUG - 2026-03-06 06:23:11 --> [REQ_ID=f91ab62e22b8] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-06 06:23:11 --> [REQ_ID=f91ab62e22b8] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-06 06:23:11 --> [REQ_ID=1404ef97e9af] [FILTER_AFTER]
DEBUG - 2026-03-06 06:23:11 --> [REQ_ID=1404ef97e9af] [LIFECYCLE][END] status=200 duration_ms=35.57 memory_delta=0
INFO - 2026-03-06 06:23:11 --> [REQ_ID=f91ab62e22b8] [PERF] Execution time=0.035201
DEBUG - 2026-03-06 06:23:11 --> [REQ_ID=1404ef97e9af] [REQUEST][END]
INFO - 2026-03-06 06:23:11 --> [REQ_ID=1404ef97e9af] [PERF] Execution time=0.050887
DEBUG - 2026-03-06 06:26:19 --> [REQ_ID=59fa52962929] [REQUEST][START] HEAD /
DEBUG - 2026-03-06 06:26:19 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-06 06:26:19 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-06 06:26:19 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-06 06:26:19 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-06 06:26:19 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
INFO - 2026-03-06 06:30:01 --> [spark:ops:work] Started
INFO - 2026-03-06 06:30:01 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-03-06 06:30:01 --> [SPARK_MEMORY] 16777216
INFO - 2026-03-06 06:30:01 --> [spark:ops:work] Intent
INFO - 2026-03-06 06:30:01 --> [spark:ops:work] Completed
INFO - 2026-03-06 06:30:01 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.042583
INFO - 2026-03-06 06:30:01 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-03-06 06:30:22 --> [REQ_ID=48db1ad0b988] [REQUEST][START] GET /
DEBUG - 2026-03-06 06:30:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-06 06:30:22 --> [REQ_ID=48db1ad0b988] [FILTER_BEFORE] /
DEBUG - 2026-03-06 06:30:22 --> [REQ_ID=48db1ad0b988] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-06 06:30:22 --> [REQ_ID=48db1ad0b988] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-06 06:30:22 --> [CSRF] token name=csrf_test_name hash=c8896e0fe970c349d186cc9c96483720
DEBUG - 2026-03-06 06:30:22 --> [REQ_ID=31e3dfd700a0] [INIT] App\Controllers\Home::GET
INFO - 2026-03-06 06:30:22 --> [REQ_ID=31e3dfd700a0] [MEMORY][controller-start] 6291456
INFO - 2026-03-06 06:30:22 --> [REQ_ID=31e3dfd700a0] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-06 06:30:22 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-06 06:30:22 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-03-06 06:30:22 --> [REQ_ID=31e3dfd700a0] [VIEW_RENDER] themes/public/home
INFO - 2026-03-06 06:30:22 --> [REQ_ID=31e3dfd700a0] [MEMORY][commonData:start] 10485760
INFO - 2026-03-06 06:30:22 --> themesMemory usage: 10485760
DEBUG - 2026-03-06 06:30:22 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-06 06:30:22 --> [REQ_ID=48db1ad0b988] [FILTER_AFTER]
DEBUG - 2026-03-06 06:30:22 --> [REQ_ID=48db1ad0b988] [LIFECYCLE][END] status=200 duration_ms=570.97 memory_delta=4194304
INFO - 2026-03-06 06:30:22 --> [REQ_ID=31e3dfd700a0] [PERF] Execution time=0.568588
DEBUG - 2026-03-06 06:30:22 --> [REQ_ID=48db1ad0b988] [REQUEST][END]
INFO - 2026-03-06 06:30:22 --> [REQ_ID=48db1ad0b988] [PERF] Execution time=0.610131
DEBUG - 2026-03-06 06:31:19 --> [REQ_ID=b0555f07c83e] [REQUEST][START] HEAD /
DEBUG - 2026-03-06 06:31:19 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-06 06:31:19 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-06 06:31:19 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-06 06:31:19 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-06 06:31:19 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-06 06:36:19 --> [REQ_ID=2d415a11d410] [REQUEST][START] HEAD /
DEBUG - 2026-03-06 06:36:19 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-06 06:36:19 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-06 06:36:19 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-06 06:36:19 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-06 06:36:19 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-06 06:41:19 --> [REQ_ID=50fdcc57b0cf] [REQUEST][START] HEAD /
DEBUG - 2026-03-06 06:41:19 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-06 06:41:19 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-06 06:41:19 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-06 06:41:19 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-06 06:41:19 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
INFO - 2026-03-06 06:45:01 --> [spark:ops:work] Started
INFO - 2026-03-06 06:45:01 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-03-06 06:45:01 --> [SPARK_MEMORY] 16777216
INFO - 2026-03-06 06:45:01 --> [spark:ops:work] Intent
INFO - 2026-03-06 06:45:01 --> [spark:ops:work] Completed
INFO - 2026-03-06 06:45:01 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.217558
INFO - 2026-03-06 06:45:01 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-03-06 06:46:19 --> [REQ_ID=4d66c83edc91] [REQUEST][START] HEAD /
DEBUG - 2026-03-06 06:46:19 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-06 06:46:19 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-06 06:46:19 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-06 06:46:19 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-06 06:46:19 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-06 06:51:19 --> [REQ_ID=e1e41c302372] [REQUEST][START] HEAD /
DEBUG - 2026-03-06 06:51:19 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-06 06:51:19 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-06 06:51:19 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-06 06:51:19 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-06 06:51:19 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-06 06:55:07 --> [REQ_ID=b20cbb8fe8cd] [REQUEST][START] GET /
DEBUG - 2026-03-06 06:55:07 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-06 06:55:07 --> [REQ_ID=b20cbb8fe8cd] [FILTER_BEFORE] /
DEBUG - 2026-03-06 06:55:07 --> [REQ_ID=b20cbb8fe8cd] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-06 06:55:07 --> [REQ_ID=b20cbb8fe8cd] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-06 06:55:07 --> [CSRF] token name=csrf_test_name hash=039b316a5d4e75d0395fa142c5445a98
DEBUG - 2026-03-06 06:55:07 --> [REQ_ID=26e80a041958] [INIT] App\Controllers\Home::GET
INFO - 2026-03-06 06:55:07 --> [REQ_ID=26e80a041958] [MEMORY][controller-start] 6291456
INFO - 2026-03-06 06:55:08 --> [REQ_ID=26e80a041958] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-06 06:55:08 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-06 06:55:08 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-03-06 06:55:08 --> [REQ_ID=26e80a041958] [VIEW_RENDER] themes/public/home
INFO - 2026-03-06 06:55:08 --> [REQ_ID=26e80a041958] [MEMORY][commonData:start] 10485760
INFO - 2026-03-06 06:55:08 --> themesMemory usage: 10485760
DEBUG - 2026-03-06 06:55:08 --> [MetaService] slug= pageName=Home cacheHit= path=DB
DEBUG - 2026-03-06 06:55:08 --> [REQ_ID=b20cbb8fe8cd] [FILTER_AFTER]
DEBUG - 2026-03-06 06:55:08 --> [REQ_ID=b20cbb8fe8cd] [LIFECYCLE][END] status=200 duration_ms=646.55 memory_delta=4194304
INFO - 2026-03-06 06:55:08 --> [REQ_ID=26e80a041958] [PERF] Execution time=0.644274
DEBUG - 2026-03-06 06:55:08 --> [REQ_ID=b20cbb8fe8cd] [REQUEST][END]
INFO - 2026-03-06 06:55:08 --> [REQ_ID=b20cbb8fe8cd] [PERF] Execution time=0.684422
DEBUG - 2026-03-06 06:56:19 --> [REQ_ID=37f60f34dfe4] [REQUEST][START] HEAD /
DEBUG - 2026-03-06 06:56:19 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-06 06:56:19 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-06 06:56:19 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-06 06:56:19 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-06 06:56:19 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
INFO - 2026-03-06 07:00:02 --> [spark:ops:work] Started
INFO - 2026-03-06 07:00:02 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-03-06 07:00:02 --> [SPARK_MEMORY] 16777216
INFO - 2026-03-06 07:00:02 --> [spark:ops:work] Intent
DEBUG - 2026-03-06 07:00:02 --> [REQ_ID=f2154788abfc] [REQUEST][START] GET /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-06 07:00:02 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
INFO - 2026-03-06 07:00:02 --> [spark:ops:work] Completed
INFO - 2026-03-06 07:00:02 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.099758
INFO - 2026-03-06 07:00:02 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-03-06 07:00:02 --> [REQ_ID=f2154788abfc] [FILTER_BEFORE] /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-06 07:00:02 --> [REQ_ID=f2154788abfc] [ROUTE] Controller=\App\Modules\Management\Controllers\ManagementAPIController Method=Run_CRON_Tasks
DEBUG - 2026-03-06 07:00:02 --> [REQ_ID=f2154788abfc] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-06 07:00:02 --> [REQ_ID=f2154788abfc] [REQUEST][END]
INFO - 2026-03-06 07:00:02 --> [REQ_ID=f2154788abfc] [PERF] Execution time=0.060952
DEBUG - 2026-03-06 07:01:19 --> [REQ_ID=b50d8f57a786] [REQUEST][START] HEAD /
DEBUG - 2026-03-06 07:01:19 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-06 07:01:19 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-06 07:01:19 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-06 07:01:19 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-06 07:01:19 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-06 07:06:19 --> [REQ_ID=c33c7e3f970b] [REQUEST][START] HEAD /
DEBUG - 2026-03-06 07:06:19 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-06 07:06:19 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-06 07:06:19 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-06 07:06:19 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-06 07:06:19 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-06 07:11:19 --> [REQ_ID=8bca8302565b] [REQUEST][START] HEAD /
DEBUG - 2026-03-06 07:11:19 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-06 07:11:19 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-06 07:11:19 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-06 07:11:19 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-06 07:11:19 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
INFO - 2026-03-06 07:15:02 --> [spark:ops:work] Started
INFO - 2026-03-06 07:15:02 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-03-06 07:15:02 --> [SPARK_MEMORY] 16777216
INFO - 2026-03-06 07:15:02 --> [spark:ops:work] Intent
DEBUG - 2026-03-06 07:15:02 --> [REQ_ID=6955b68bb5a1] [REQUEST][START] GET /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-06 07:15:02 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
INFO - 2026-03-06 07:15:02 --> [spark:ops:work] Completed
INFO - 2026-03-06 07:15:02 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.100239
INFO - 2026-03-06 07:15:02 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-03-06 07:15:02 --> [REQ_ID=6955b68bb5a1] [FILTER_BEFORE] /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-06 07:15:02 --> [REQ_ID=6955b68bb5a1] [ROUTE] Controller=\App\Modules\APIs\Controllers\AlertsAPIController Method=fetchEmailAlerts
DEBUG - 2026-03-06 07:15:02 --> [REQ_ID=6955b68bb5a1] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-06 07:15:02 --> [REQ_ID=6955b68bb5a1] [REQUEST][END]
INFO - 2026-03-06 07:15:02 --> [REQ_ID=6955b68bb5a1] [PERF] Execution time=0.052188
DEBUG - 2026-03-06 07:16:19 --> [REQ_ID=db833b1b446d] [REQUEST][START] HEAD /
DEBUG - 2026-03-06 07:16:19 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-06 07:16:19 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-06 07:16:19 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-06 07:16:19 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-06 07:16:19 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-06 07:21:19 --> [REQ_ID=81a70c3e982b] [REQUEST][START] HEAD /
DEBUG - 2026-03-06 07:21:19 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-06 07:21:19 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-06 07:21:19 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-06 07:21:19 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-06 07:21:19 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-06 07:26:19 --> [REQ_ID=3cc4e6df0ce1] [REQUEST][START] HEAD /
DEBUG - 2026-03-06 07:26:19 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-06 07:26:19 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-06 07:26:19 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-06 07:26:19 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-06 07:26:19 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-06 07:28:17 --> [REQ_ID=443d589e9686] [REQUEST][START] GET /index.php/Account/Social-Media
DEBUG - 2026-03-06 07:28:17 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-06 07:28:17 --> [REQ_ID=443d589e9686] [FILTER_BEFORE] /index.php/Account/Social-Media
DEBUG - 2026-03-06 07:28:17 --> [REQ_ID=443d589e9686] [ROUTE] Controller=\App\Modules\User\Controllers\DashboardController Method=SocialMedia
DEBUG - 2026-03-06 07:28:17 --> [REQ_ID=443d589e9686] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Account/Social-Media
DEBUG - 2026-03-06 07:28:17 --> [CSRF] token name=csrf_test_name hash=8055a667e4b2611e12fe4df1c01b87bd
DEBUG - 2026-03-06 07:28:17 --> [REQ_ID=443d589e9686] [REQUEST][END]
INFO - 2026-03-06 07:28:17 --> [REQ_ID=443d589e9686] [PERF] Execution time=0.055482
DEBUG - 2026-03-06 07:28:23 --> [REQ_ID=a610e6a542b7] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-06 07:28:23 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-06 07:28:23 --> [REQ_ID=a610e6a542b7] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-06 07:28:23 --> [REQ_ID=a610e6a542b7] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-06 07:28:23 --> [REQ_ID=a610e6a542b7] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-06 07:28:23 --> [CSRF] token name=csrf_test_name hash=0935c9af45f317200da488e6cc128915
DEBUG - 2026-03-06 07:28:23 --> [REQ_ID=3d33a277bd93] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-06 07:28:23 --> [REQ_ID=3d33a277bd93] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-06 07:28:23 --> [REQ_ID=a610e6a542b7] [FILTER_AFTER]
DEBUG - 2026-03-06 07:28:23 --> [REQ_ID=a610e6a542b7] [LIFECYCLE][END] status=200 duration_ms=377.38 memory_delta=0
INFO - 2026-03-06 07:28:23 --> [REQ_ID=3d33a277bd93] [PERF] Execution time=0.377121
DEBUG - 2026-03-06 07:28:23 --> [REQ_ID=a610e6a542b7] [REQUEST][END]
INFO - 2026-03-06 07:28:23 --> [REQ_ID=a610e6a542b7] [PERF] Execution time=0.389549
INFO - 2026-03-06 07:30:01 --> [spark:ops:work] Started
INFO - 2026-03-06 07:30:01 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-03-06 07:30:01 --> [SPARK_MEMORY] 16777216
INFO - 2026-03-06 07:30:01 --> [spark:ops:work] Intent
INFO - 2026-03-06 07:30:01 --> [spark:ops:work] Completed
INFO - 2026-03-06 07:30:01 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.123728
INFO - 2026-03-06 07:30:01 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-03-06 07:31:19 --> [REQ_ID=95d1721078d4] [REQUEST][START] HEAD /
DEBUG - 2026-03-06 07:31:19 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-06 07:31:19 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-06 07:31:19 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-06 07:31:19 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-06 07:31:19 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-06 07:36:19 --> [REQ_ID=48190ab3463f] [REQUEST][START] HEAD /
DEBUG - 2026-03-06 07:36:19 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-06 07:36:19 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-06 07:36:19 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-06 07:36:19 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-06 07:36:19 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-06 07:41:19 --> [REQ_ID=ebd1bc7ba352] [REQUEST][START] HEAD /
DEBUG - 2026-03-06 07:41:19 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-06 07:41:19 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-06 07:41:19 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-06 07:41:19 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-06 07:41:19 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-06 07:43:30 --> [REQ_ID=924ced5f09b8] [REQUEST][START] GET /index.php/Support
DEBUG - 2026-03-06 07:43:30 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-06 07:43:30 --> [REQ_ID=924ced5f09b8] [FILTER_BEFORE] /index.php/Support
DEBUG - 2026-03-06 07:43:30 --> [REQ_ID=924ced5f09b8] [ROUTE] Controller=\App\Modules\Support\Controllers\SupportController Method=index
DEBUG - 2026-03-06 07:43:30 --> [REQ_ID=924ced5f09b8] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Support
DEBUG - 2026-03-06 07:43:30 --> [CSRF] token name=csrf_test_name hash=6580b660eff7b988c5a550978df501b4
DEBUG - 2026-03-06 07:43:30 --> [REQ_ID=9c3e8cb0c7de] [INIT] App\Modules\Support\Controllers\SupportController::GET
INFO - 2026-03-06 07:43:30 --> [REQ_ID=9c3e8cb0c7de] [MEMORY][controller-start] 6291456
DEBUG - 2026-03-06 07:43:30 --> [REQ_ID=9c3e8cb0c7de] [METHOD_ENTRY] index
DEBUG - 2026-03-06 07:43:30 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-06 07:43:30 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-06 07:43:30 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-06 07:43:30 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-06 07:43:30 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-06 07:43:30 --> MyMICoin: guest context detected; skipping user-specific preload.
INFO - 2026-03-06 07:43:30 --> [REQ_ID=9c3e8cb0c7de] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-06 07:43:30 --> [REQ_ID=9c3e8cb0c7de] [VIEW_RENDER] SupportModule\Views\Support\index
INFO - 2026-03-06 07:43:30 --> [REQ_ID=9c3e8cb0c7de] [MEMORY][commonData:start] 6291456
INFO - 2026-03-06 07:43:30 --> themesMemory usage: 6291456
DEBUG - 2026-03-06 07:43:30 --> [REQ_ID=924ced5f09b8] [FILTER_AFTER]
DEBUG - 2026-03-06 07:43:30 --> [REQ_ID=924ced5f09b8] [LIFECYCLE][END] status=200 duration_ms=246.57 memory_delta=0
INFO - 2026-03-06 07:43:30 --> [REQ_ID=9c3e8cb0c7de] [PERF] Execution time=0.243848
DEBUG - 2026-03-06 07:43:30 --> [REQ_ID=924ced5f09b8] [REQUEST][END]
INFO - 2026-03-06 07:43:30 --> [REQ_ID=924ced5f09b8] [PERF] Execution time=0.287661
INFO - 2026-03-06 07:45:01 --> [spark:ops:work] Started
INFO - 2026-03-06 07:45:01 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-03-06 07:45:01 --> [SPARK_MEMORY] 16777216
INFO - 2026-03-06 07:45:01 --> [spark:ops:work] Intent
INFO - 2026-03-06 07:45:02 --> [spark:ops:work] Completed
INFO - 2026-03-06 07:45:02 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.262532
INFO - 2026-03-06 07:45:02 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-03-06 07:46:19 --> [REQ_ID=dea92ae76fd3] [REQUEST][START] HEAD /
DEBUG - 2026-03-06 07:46:19 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-06 07:46:19 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-06 07:46:20 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-06 07:46:20 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-06 07:46:20 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-06 07:51:19 --> [REQ_ID=7af0198d8493] [REQUEST][START] HEAD /
DEBUG - 2026-03-06 07:51:19 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-06 07:51:19 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-06 07:51:19 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-06 07:51:19 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-06 07:51:19 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-06 07:56:19 --> [REQ_ID=4be3c8d9b627] [REQUEST][START] HEAD /
DEBUG - 2026-03-06 07:56:19 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-06 07:56:19 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-06 07:56:19 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-06 07:56:19 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-06 07:56:19 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
INFO - 2026-03-06 08:00:01 --> [spark:ops:work] Started
INFO - 2026-03-06 08:00:01 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-03-06 08:00:01 --> [SPARK_MEMORY] 16777216
INFO - 2026-03-06 08:00:01 --> [spark:ops:work] Intent
INFO - 2026-03-06 08:00:01 --> [SPARK_START] App\Commands\AIOps\Run
INFO - 2026-03-06 08:00:01 --> [SPARK_MEMORY] 16777216
INFO - 2026-03-06 08:00:01 --> [spark:aiops:run] Intent
DEBUG - 2026-03-06 08:00:01 --> [REQ_ID=799393078c66] [REQUEST][START] GET /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-06 08:00:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
INFO - 2026-03-06 08:00:01 --> [spark:ops:work] Completed
INFO - 2026-03-06 08:00:01 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.172542
INFO - 2026-03-06 08:00:01 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-03-06 08:00:01 --> [REQ_ID=799393078c66] [FILTER_BEFORE] /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-06 08:00:01 --> [REQ_ID=799393078c66] [ROUTE] Controller=\App\Modules\Management\Controllers\ManagementAPIController Method=Run_CRON_Tasks
DEBUG - 2026-03-06 08:00:01 --> [REQ_ID=799393078c66] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-06 08:00:01 --> [REQ_ID=799393078c66] [REQUEST][END]
INFO - 2026-03-06 08:00:01 --> [REQ_ID=799393078c66] [PERF] Execution time=0.111758
INFO - 2026-03-06 08:00:02 --> [AIOPS][SPARK][GOVERNANCE][spark:logs:summarize] Started
INFO - 2026-03-06 08:00:02 --> [SPARK_START] App\Commands\Logs\Summarize
INFO - 2026-03-06 08:00:02 --> [SPARK_MEMORY] 16777216
INFO - 2026-03-06 08:00:02 --> [spark:logs:summarize] Intent
INFO - 2026-03-06 08:00:02 --> [AIOPS][SPARK][GOVERNANCE][spark:logs:summarize] Completed
INFO - 2026-03-06 08:00:02 --> [SPARK_COMPLETE] App\Commands\Logs\Summarize duration=0.008379
INFO - 2026-03-06 08:00:02 --> [SPARK_MEMORY] 18874368
INFO - 2026-03-06 08:00:03 --> [spark:app:healthcheck] Started
INFO - 2026-03-06 08:00:03 --> [SPARK_START] App\Commands\App\Healthcheck
INFO - 2026-03-06 08:00:03 --> [SPARK_MEMORY] 16777216
INFO - 2026-03-06 08:00:03 --> [spark:app:healthcheck] Intent
DEBUG - 2026-03-06 08:00:03 --> LOG_HEALTHCHECK debug marker=0464e8fd875c
INFO - 2026-03-06 08:00:03 --> LOG_HEALTHCHECK info marker=0464e8fd875c
NOTICE - 2026-03-06 08:00:03 --> LOG_HEALTHCHECK probe marker=0464e8fd875c
INFO - 2026-03-06 08:00:03 --> [spark:app:healthcheck] Completed
INFO - 2026-03-06 08:00:03 --> [SPARK_COMPLETE] App\Commands\App\Healthcheck duration=0.030682
INFO - 2026-03-06 08:00:03 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-03-06 08:00:04 --> OllamaPatchRunner:L142 - validateGeneratedPatch Content: 
WARNING - 2026-03-06 08:00:04 --> OllamaPatchRunner:L49 - Original Diff: 
DEBUG - 2026-03-06 08:00:05 --> OllamaPatchRunner:L51 - Retried Diff: 
DEBUG - 2026-03-06 08:00:05 --> OllamaPatchRunner:L142 - validateGeneratedPatch Content: 
DEBUG - 2026-03-06 08:00:05 --> OllamaPatchRunner:L53 - Validating Generated Patch Failed
INFO - 2026-03-06 08:00:05 --> [SPARK_COMPLETE] App\Commands\AIOps\Run duration=3.482100
INFO - 2026-03-06 08:00:05 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-03-06 08:01:19 --> [REQ_ID=5d0abd4eca33] [REQUEST][START] HEAD /
DEBUG - 2026-03-06 08:01:19 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-06 08:01:19 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-06 08:01:19 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-06 08:01:19 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-06 08:01:19 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-06 08:05:42 --> [REQ_ID=6811f66527c3] [REQUEST][START] GET /
DEBUG - 2026-03-06 08:05:42 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-06 08:05:42 --> [REQ_ID=6811f66527c3] [FILTER_BEFORE] /
DEBUG - 2026-03-06 08:05:42 --> [REQ_ID=6811f66527c3] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-06 08:05:42 --> [REQ_ID=6811f66527c3] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-06 08:05:42 --> [CSRF] token name=csrf_test_name hash=85acd1704d611d376d129e0256047bc9
DEBUG - 2026-03-06 08:05:42 --> [REQ_ID=018eee797934] [INIT] App\Controllers\Home::GET
INFO - 2026-03-06 08:05:42 --> [REQ_ID=018eee797934] [MEMORY][controller-start] 6291456
INFO - 2026-03-06 08:05:43 --> [REQ_ID=018eee797934] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-06 08:05:43 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-06 08:05:43 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-03-06 08:05:43 --> [REQ_ID=018eee797934] [VIEW_RENDER] themes/public/home
INFO - 2026-03-06 08:05:43 --> [REQ_ID=018eee797934] [MEMORY][commonData:start] 10485760
INFO - 2026-03-06 08:05:43 --> themesMemory usage: 10485760
DEBUG - 2026-03-06 08:05:43 --> [MetaService] slug= pageName=Home cacheHit= path=DB
DEBUG - 2026-03-06 08:05:43 --> [REQ_ID=6811f66527c3] [FILTER_AFTER]
DEBUG - 2026-03-06 08:05:43 --> [REQ_ID=6811f66527c3] [LIFECYCLE][END] status=200 duration_ms=729.97 memory_delta=4194304
INFO - 2026-03-06 08:05:43 --> [REQ_ID=018eee797934] [PERF] Execution time=0.727787
DEBUG - 2026-03-06 08:05:43 --> [REQ_ID=6811f66527c3] [REQUEST][END]
INFO - 2026-03-06 08:05:43 --> [REQ_ID=6811f66527c3] [PERF] Execution time=0.778864
DEBUG - 2026-03-06 08:06:19 --> [REQ_ID=299426fb09d6] [REQUEST][START] HEAD /
DEBUG - 2026-03-06 08:06:19 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-06 08:06:19 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-06 08:06:19 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-06 08:06:19 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-06 08:06:19 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-06 08:11:19 --> [REQ_ID=0f9a07423682] [REQUEST][START] HEAD /
DEBUG - 2026-03-06 08:11:19 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-06 08:11:19 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-06 08:11:19 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-06 08:11:19 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-06 08:11:19 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
INFO - 2026-03-06 08:15:01 --> [spark:ops:work] Started
INFO - 2026-03-06 08:15:01 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-03-06 08:15:01 --> [SPARK_MEMORY] 16777216
INFO - 2026-03-06 08:15:01 --> [spark:ops:work] Intent
DEBUG - 2026-03-06 08:15:01 --> [REQ_ID=47645f07f5c0] [REQUEST][START] GET /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-06 08:15:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-06 08:15:02 --> [REQ_ID=47645f07f5c0] [FILTER_BEFORE] /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-06 08:15:02 --> [REQ_ID=47645f07f5c0] [ROUTE] Controller=\App\Modules\APIs\Controllers\AlertsAPIController Method=fetchEmailAlerts
DEBUG - 2026-03-06 08:15:02 --> [REQ_ID=47645f07f5c0] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-06 08:15:02 --> [REQ_ID=47645f07f5c0] [REQUEST][END]
INFO - 2026-03-06 08:15:02 --> [REQ_ID=47645f07f5c0] [PERF] Execution time=0.068264
INFO - 2026-03-06 08:15:02 --> [spark:ops:work] Completed
INFO - 2026-03-06 08:15:02 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.199596
INFO - 2026-03-06 08:15:02 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-03-06 08:16:19 --> [REQ_ID=5ee6a13965a2] [REQUEST][START] HEAD /
DEBUG - 2026-03-06 08:16:19 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-06 08:16:19 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-06 08:16:19 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-06 08:16:19 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-06 08:16:19 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-06 08:17:29 --> [REQ_ID=aafa808c3802] [REQUEST][START] GET /
DEBUG - 2026-03-06 08:17:29 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-06 08:17:29 --> [REQ_ID=aafa808c3802] [FILTER_BEFORE] /
DEBUG - 2026-03-06 08:17:29 --> [REQ_ID=aafa808c3802] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-06 08:17:29 --> [REQ_ID=aafa808c3802] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-06 08:17:29 --> [CSRF] token name=csrf_test_name hash=e9a014317bf6c41b00f02ff125e14bdc
DEBUG - 2026-03-06 08:17:29 --> [REQ_ID=af6f20cdbcf1] [INIT] App\Controllers\Home::GET
INFO - 2026-03-06 08:17:29 --> [REQ_ID=af6f20cdbcf1] [MEMORY][controller-start] 4194304
INFO - 2026-03-06 08:17:29 --> [REQ_ID=af6f20cdbcf1] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-06 08:17:29 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-06 08:17:29 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
DEBUG - 2026-03-06 08:17:29 --> [REQ_ID=af6f20cdbcf1] [VIEW_RENDER] themes/public/home
INFO - 2026-03-06 08:17:29 --> [REQ_ID=af6f20cdbcf1] [MEMORY][commonData:start] 8388608
INFO - 2026-03-06 08:17:29 --> themesMemory usage: 8388608
DEBUG - 2026-03-06 08:17:29 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-06 08:17:29 --> [REQ_ID=aafa808c3802] [FILTER_AFTER]
DEBUG - 2026-03-06 08:17:29 --> [REQ_ID=aafa808c3802] [LIFECYCLE][END] status=200 duration_ms=741.51 memory_delta=4194304
INFO - 2026-03-06 08:17:29 --> [REQ_ID=af6f20cdbcf1] [PERF] Execution time=0.740115
DEBUG - 2026-03-06 08:17:29 --> [REQ_ID=aafa808c3802] [REQUEST][END]
INFO - 2026-03-06 08:17:29 --> [REQ_ID=aafa808c3802] [PERF] Execution time=0.754813
DEBUG - 2026-03-06 08:21:19 --> [REQ_ID=655cc1f74e9a] [REQUEST][START] HEAD /
DEBUG - 2026-03-06 08:21:19 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-06 08:21:19 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-06 08:21:19 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-06 08:21:19 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-06 08:21:19 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-06 08:24:09 --> [REQ_ID=0796f19f2d67] [REQUEST][START] GET /index.php/Exchange/Solana
DEBUG - 2026-03-06 08:24:09 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-06 08:24:09 --> [REQ_ID=0796f19f2d67] [FILTER_BEFORE] /index.php/Exchange/Solana
DEBUG - 2026-03-06 08:24:09 --> [REQ_ID=0796f19f2d67] [ROUTE] Controller=\App\Modules\Exchange\Controllers\SolanaController Method=index
DEBUG - 2026-03-06 08:24:09 --> [REQ_ID=0796f19f2d67] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Exchange/Solana
DEBUG - 2026-03-06 08:24:09 --> [CSRF] token name=csrf_test_name hash=fe32fc31ebf76a421461d3698d9009b6
DEBUG - 2026-03-06 08:24:09 --> [REQ_ID=0796f19f2d67] [REQUEST][END]
INFO - 2026-03-06 08:24:09 --> [REQ_ID=0796f19f2d67] [PERF] Execution time=0.053756
DEBUG - 2026-03-06 08:24:11 --> [REQ_ID=3b67358fbed0] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-06 08:24:11 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-06 08:24:11 --> [REQ_ID=3b67358fbed0] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-06 08:24:11 --> [REQ_ID=3b67358fbed0] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-06 08:24:11 --> [REQ_ID=3b67358fbed0] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-06 08:24:11 --> [CSRF] token name=csrf_test_name hash=6cbb4936f3add87a71f86ea80db17272
DEBUG - 2026-03-06 08:24:11 --> [REQ_ID=2b7726a9e09c] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-06 08:24:11 --> [REQ_ID=2b7726a9e09c] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-06 08:24:11 --> [REQ_ID=3b67358fbed0] [FILTER_AFTER]
DEBUG - 2026-03-06 08:24:11 --> [REQ_ID=3b67358fbed0] [LIFECYCLE][END] status=200 duration_ms=50.58 memory_delta=0
INFO - 2026-03-06 08:24:11 --> [REQ_ID=2b7726a9e09c] [PERF] Execution time=0.050117
DEBUG - 2026-03-06 08:24:11 --> [REQ_ID=3b67358fbed0] [REQUEST][END]
INFO - 2026-03-06 08:24:11 --> [REQ_ID=3b67358fbed0] [PERF] Execution time=0.062374
DEBUG - 2026-03-06 08:26:19 --> [REQ_ID=6fae266658f9] [REQUEST][START] HEAD /
DEBUG - 2026-03-06 08:26:19 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-06 08:26:19 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-06 08:26:19 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-06 08:26:19 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-06 08:26:19 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
INFO - 2026-03-06 08:30:01 --> [spark:ops:work] Started
INFO - 2026-03-06 08:30:01 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-03-06 08:30:01 --> [SPARK_MEMORY] 16777216
INFO - 2026-03-06 08:30:01 --> [spark:ops:work] Intent
INFO - 2026-03-06 08:30:01 --> [spark:ops:work] Completed
INFO - 2026-03-06 08:30:01 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.043052
INFO - 2026-03-06 08:30:01 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-03-06 08:31:19 --> [REQ_ID=7c3c0d8dc29a] [REQUEST][START] HEAD /
DEBUG - 2026-03-06 08:31:19 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-06 08:31:19 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-06 08:31:19 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-06 08:31:19 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-06 08:31:19 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-06 08:36:19 --> [REQ_ID=c59676e38507] [REQUEST][START] HEAD /
DEBUG - 2026-03-06 08:36:19 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-06 08:36:19 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-06 08:36:19 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-06 08:36:19 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-06 08:36:19 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-06 08:41:19 --> [REQ_ID=c55b5234f9f7] [REQUEST][START] HEAD /
DEBUG - 2026-03-06 08:41:19 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-06 08:41:19 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-06 08:41:19 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-06 08:41:19 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-06 08:41:19 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
INFO - 2026-03-06 08:45:01 --> [spark:ops:work] Started
INFO - 2026-03-06 08:45:01 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-03-06 08:45:01 --> [SPARK_MEMORY] 16777216
INFO - 2026-03-06 08:45:01 --> [spark:ops:work] Intent
INFO - 2026-03-06 08:45:01 --> [spark:ops:work] Completed
INFO - 2026-03-06 08:45:01 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.169254
INFO - 2026-03-06 08:45:01 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-03-06 08:46:19 --> [REQ_ID=39875ee40ae3] [REQUEST][START] HEAD /
DEBUG - 2026-03-06 08:46:19 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-06 08:46:19 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-06 08:46:19 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-06 08:46:19 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-06 08:46:19 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-06 08:51:19 --> [REQ_ID=023383d7095a] [REQUEST][START] HEAD /
DEBUG - 2026-03-06 08:51:19 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-06 08:51:19 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-06 08:51:19 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-06 08:51:19 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-06 08:51:19 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-06 08:56:19 --> [REQ_ID=251adf4f292b] [REQUEST][START] HEAD /
DEBUG - 2026-03-06 08:56:19 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-06 08:56:19 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-06 08:56:19 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-06 08:56:19 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-06 08:56:19 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
INFO - 2026-03-06 09:00:02 --> [spark:ops:work] Started
INFO - 2026-03-06 09:00:02 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-03-06 09:00:02 --> [SPARK_MEMORY] 16777216
INFO - 2026-03-06 09:00:02 --> [spark:ops:work] Intent
DEBUG - 2026-03-06 09:00:02 --> [REQ_ID=6e79e60cf89c] [REQUEST][START] GET /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-06 09:00:02 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-06 09:00:02 --> [REQ_ID=6e79e60cf89c] [FILTER_BEFORE] /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-06 09:00:02 --> [REQ_ID=6e79e60cf89c] [ROUTE] Controller=\App\Modules\Management\Controllers\ManagementAPIController Method=Run_CRON_Tasks
DEBUG - 2026-03-06 09:00:02 --> [REQ_ID=6e79e60cf89c] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-06 09:00:02 --> [REQ_ID=6e79e60cf89c] [REQUEST][END]
INFO - 2026-03-06 09:00:02 --> [REQ_ID=6e79e60cf89c] [PERF] Execution time=0.049659
INFO - 2026-03-06 09:00:02 --> [spark:ops:work] Completed
INFO - 2026-03-06 09:00:02 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.226424
INFO - 2026-03-06 09:00:02 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-03-06 09:01:19 --> [REQ_ID=344ba9a6529a] [REQUEST][START] HEAD /
DEBUG - 2026-03-06 09:01:19 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-06 09:01:19 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-06 09:01:20 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-06 09:01:20 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-06 09:01:20 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-06 09:06:19 --> [REQ_ID=98b720f7cf89] [REQUEST][START] HEAD /
DEBUG - 2026-03-06 09:06:19 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-06 09:06:19 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-06 09:06:19 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-06 09:06:19 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-06 09:06:19 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-06 09:11:19 --> [REQ_ID=f31117df4612] [REQUEST][START] HEAD /
DEBUG - 2026-03-06 09:11:19 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-06 09:11:19 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-06 09:11:19 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-06 09:11:19 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-06 09:11:19 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
INFO - 2026-03-06 09:15:02 --> [spark:ops:work] Started
INFO - 2026-03-06 09:15:02 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-03-06 09:15:02 --> [SPARK_MEMORY] 16777216
INFO - 2026-03-06 09:15:02 --> [spark:ops:work] Intent
INFO - 2026-03-06 09:15:02 --> [spark:ops:work] Completed
INFO - 2026-03-06 09:15:02 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.033031
INFO - 2026-03-06 09:15:02 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-03-06 09:15:02 --> [REQ_ID=e40a82e419c0] [REQUEST][START] GET /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-06 09:15:02 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-06 09:15:02 --> [REQ_ID=e40a82e419c0] [FILTER_BEFORE] /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-06 09:15:02 --> [REQ_ID=e40a82e419c0] [ROUTE] Controller=\App\Modules\APIs\Controllers\AlertsAPIController Method=fetchEmailAlerts
DEBUG - 2026-03-06 09:15:02 --> [REQ_ID=e40a82e419c0] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-06 09:15:02 --> [REQ_ID=e40a82e419c0] [REQUEST][END]
INFO - 2026-03-06 09:15:02 --> [REQ_ID=e40a82e419c0] [PERF] Execution time=0.062603
DEBUG - 2026-03-06 09:16:19 --> [REQ_ID=8a185c80328d] [REQUEST][START] HEAD /
DEBUG - 2026-03-06 09:16:19 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-06 09:16:19 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-06 09:16:19 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-06 09:16:19 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-06 09:16:19 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-06 09:18:45 --> [REQ_ID=ad42d3e14484] [REQUEST][START] GET /index.php/Management/Marketing
DEBUG - 2026-03-06 09:18:45 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-06 09:18:45 --> [REQ_ID=ad42d3e14484] [FILTER_BEFORE] /index.php/Management/Marketing
DEBUG - 2026-03-06 09:18:45 --> [REQ_ID=ad42d3e14484] [ROUTE] Controller=\App\Modules\Management\Controllers\MarketingAdminController Method=index
DEBUG - 2026-03-06 09:18:45 --> [REQ_ID=ad42d3e14484] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Management/Marketing
DEBUG - 2026-03-06 09:18:45 --> [CSRF] token name=csrf_test_name hash=8f129346116c39a40a39d1a4bc310c6d
DEBUG - 2026-03-06 09:18:45 --> [REQ_ID=ad42d3e14484] [REQUEST][END]
INFO - 2026-03-06 09:18:45 --> [REQ_ID=ad42d3e14484] [PERF] Execution time=0.057203
DEBUG - 2026-03-06 09:18:49 --> [REQ_ID=4b0156d350a4] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-06 09:18:49 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-06 09:18:49 --> [REQ_ID=4b0156d350a4] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-06 09:18:49 --> [REQ_ID=4b0156d350a4] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-06 09:18:49 --> [REQ_ID=4b0156d350a4] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-06 09:18:49 --> [CSRF] token name=csrf_test_name hash=76b76eacda3aaafeadb6f81e33f8a43a
DEBUG - 2026-03-06 09:18:49 --> [REQ_ID=8d5de66f7d64] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-06 09:18:49 --> [REQ_ID=8d5de66f7d64] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-06 09:18:49 --> [REQ_ID=4b0156d350a4] [FILTER_AFTER]
DEBUG - 2026-03-06 09:18:49 --> [REQ_ID=4b0156d350a4] [LIFECYCLE][END] status=200 duration_ms=115.69 memory_delta=0
INFO - 2026-03-06 09:18:49 --> [REQ_ID=8d5de66f7d64] [PERF] Execution time=0.115469
DEBUG - 2026-03-06 09:18:49 --> [REQ_ID=4b0156d350a4] [REQUEST][END]
INFO - 2026-03-06 09:18:49 --> [REQ_ID=4b0156d350a4] [PERF] Execution time=0.128022
DEBUG - 2026-03-06 09:21:19 --> [REQ_ID=d1417e2c160f] [REQUEST][START] HEAD /
DEBUG - 2026-03-06 09:21:19 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-06 09:21:19 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-06 09:21:19 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-06 09:21:19 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-06 09:21:19 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-06 09:26:19 --> [REQ_ID=f07bbb112f99] [REQUEST][START] HEAD /
DEBUG - 2026-03-06 09:26:19 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-06 09:26:19 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-06 09:26:19 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-06 09:26:19 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-06 09:26:19 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
INFO - 2026-03-06 09:30:01 --> [spark:ops:work] Started
INFO - 2026-03-06 09:30:01 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-03-06 09:30:01 --> [SPARK_MEMORY] 16777216
INFO - 2026-03-06 09:30:01 --> [spark:ops:work] Intent
INFO - 2026-03-06 09:30:01 --> [spark:ops:work] Completed
INFO - 2026-03-06 09:30:01 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.220990
INFO - 2026-03-06 09:30:01 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-03-06 09:31:19 --> [REQ_ID=284074d511b0] [REQUEST][START] HEAD /
DEBUG - 2026-03-06 09:31:19 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-06 09:31:19 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-06 09:31:19 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-06 09:31:19 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-06 09:31:19 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-06 09:36:19 --> [REQ_ID=6108fae9dfdc] [REQUEST][START] HEAD /
DEBUG - 2026-03-06 09:36:19 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-06 09:36:19 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-06 09:36:19 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-06 09:36:19 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-06 09:36:19 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-06 09:41:19 --> [REQ_ID=fc52cea88be5] [REQUEST][START] HEAD /
DEBUG - 2026-03-06 09:41:19 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-06 09:41:19 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-06 09:41:19 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-06 09:41:19 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-06 09:41:19 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
INFO - 2026-03-06 09:45:02 --> [spark:ops:work] Started
INFO - 2026-03-06 09:45:02 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-03-06 09:45:02 --> [SPARK_MEMORY] 16777216
INFO - 2026-03-06 09:45:02 --> [spark:ops:work] Intent
INFO - 2026-03-06 09:45:02 --> [spark:ops:work] Completed
INFO - 2026-03-06 09:45:02 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.275409
INFO - 2026-03-06 09:45:02 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-03-06 09:46:19 --> [REQ_ID=a9b29c878b3d] [REQUEST][START] HEAD /
DEBUG - 2026-03-06 09:46:19 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-06 09:46:19 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-06 09:46:19 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-06 09:46:19 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-06 09:46:19 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-06 09:51:19 --> [REQ_ID=90a3c9bf5ac7] [REQUEST][START] HEAD /
DEBUG - 2026-03-06 09:51:19 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-06 09:51:19 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-06 09:51:19 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-06 09:51:19 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-06 09:51:19 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-06 09:51:41 --> [REQ_ID=02f3fe98786d] [REQUEST][START] GET /index.php/How-It-Works/earnings
DEBUG - 2026-03-06 09:51:41 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-06 09:51:41 --> [REQ_ID=02f3fe98786d] [FILTER_BEFORE] /index.php/How-It-Works/earnings
DEBUG - 2026-03-06 09:51:41 --> [REQ_ID=02f3fe98786d] [ROUTE] Controller=\App\Modules\Blog\Controllers\HowItWorksController Method=show
DEBUG - 2026-03-06 09:51:41 --> [REQ_ID=02f3fe98786d] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/How-It-Works/earnings
DEBUG - 2026-03-06 09:51:41 --> [CSRF] token name=csrf_test_name hash=e599122f67853be3b4c988c2547cd081
DEBUG - 2026-03-06 09:51:41 --> [REQ_ID=f802b25eeb0e] [INIT] App\Modules\Blog\Controllers\HowItWorksController::GET
INFO - 2026-03-06 09:51:41 --> [REQ_ID=f802b25eeb0e] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-06 09:51:41 --> [REQ_ID=f802b25eeb0e] [METHOD_ENTRY] show
DEBUG - 2026-03-06 09:51:41 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-06 09:51:41 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-06 09:51:41 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-06 09:51:41 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-06 09:51:41 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-06 09:51:41 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-06 09:51:41 --> [REQ_ID=f802b25eeb0e] [VIEW_RENDER] App\Modules\Blog\Views\HowItWorks\index
INFO - 2026-03-06 09:51:41 --> [REQ_ID=f802b25eeb0e] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-06 09:51:41 --> [MetaService] slug=how-it-works/earnings pageName= cacheHit= path=DB
INFO - 2026-03-06 09:51:41 --> themesMemory usage: 8388608
DEBUG - 2026-03-06 09:51:41 --> [MetaService] slug=how-it-works/earnings pageName= cacheHit=1 path=CACHE
DEBUG - 2026-03-06 09:51:41 --> [REQ_ID=02f3fe98786d] [FILTER_AFTER]
DEBUG - 2026-03-06 09:51:41 --> [REQ_ID=02f3fe98786d] [LIFECYCLE][END] status=200 duration_ms=625.95 memory_delta=4194304
INFO - 2026-03-06 09:51:41 --> [REQ_ID=f802b25eeb0e] [PERF] Execution time=0.623293
DEBUG - 2026-03-06 09:51:41 --> [REQ_ID=02f3fe98786d] [REQUEST][END]
INFO - 2026-03-06 09:51:41 --> [REQ_ID=02f3fe98786d] [PERF] Execution time=0.647462
DEBUG - 2026-03-06 09:52:21 --> [REQ_ID=1392b849e2f7] [REQUEST][START] GET /
DEBUG - 2026-03-06 09:52:21 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-06 09:52:21 --> [REQ_ID=1392b849e2f7] [FILTER_BEFORE] /
DEBUG - 2026-03-06 09:52:21 --> [REQ_ID=1392b849e2f7] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-06 09:52:21 --> [REQ_ID=1392b849e2f7] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-06 09:52:21 --> [CSRF] token name=csrf_test_name hash=144a51d372a9176449c663ff71fb446c
DEBUG - 2026-03-06 09:52:21 --> [REQ_ID=a2ab9c333b87] [INIT] App\Controllers\Home::GET
INFO - 2026-03-06 09:52:21 --> [REQ_ID=a2ab9c333b87] [MEMORY][controller-start] 6291456
INFO - 2026-03-06 09:52:21 --> [REQ_ID=a2ab9c333b87] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-06 09:52:21 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-06 09:52:22 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-03-06 09:52:22 --> [REQ_ID=a2ab9c333b87] [VIEW_RENDER] themes/public/home
INFO - 2026-03-06 09:52:22 --> [REQ_ID=a2ab9c333b87] [MEMORY][commonData:start] 8388608
INFO - 2026-03-06 09:52:22 --> themesMemory usage: 8388608
DEBUG - 2026-03-06 09:52:22 --> [MetaService] slug= pageName=Home cacheHit= path=DB
DEBUG - 2026-03-06 09:52:22 --> [REQ_ID=1392b849e2f7] [FILTER_AFTER]
DEBUG - 2026-03-06 09:52:22 --> [REQ_ID=1392b849e2f7] [LIFECYCLE][END] status=200 duration_ms=527.81 memory_delta=2097152
INFO - 2026-03-06 09:52:22 --> [REQ_ID=a2ab9c333b87] [PERF] Execution time=0.527518
DEBUG - 2026-03-06 09:52:22 --> [REQ_ID=1392b849e2f7] [REQUEST][END]
INFO - 2026-03-06 09:52:22 --> [REQ_ID=1392b849e2f7] [PERF] Execution time=0.538975
DEBUG - 2026-03-06 09:56:19 --> [REQ_ID=72e46f4178a4] [REQUEST][START] HEAD /
DEBUG - 2026-03-06 09:56:19 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-06 09:56:19 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-06 09:56:19 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-06 09:56:19 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-06 09:56:19 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
INFO - 2026-03-06 10:00:01 --> [spark:ops:work] Started
INFO - 2026-03-06 10:00:01 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-03-06 10:00:01 --> [SPARK_MEMORY] 16777216
INFO - 2026-03-06 10:00:01 --> [spark:ops:work] Intent
INFO - 2026-03-06 10:00:01 --> [SPARK_START] App\Commands\AIOps\Run
INFO - 2026-03-06 10:00:01 --> [SPARK_MEMORY] 16777216
INFO - 2026-03-06 10:00:01 --> [spark:aiops:run] Intent
DEBUG - 2026-03-06 10:00:01 --> [REQ_ID=b745701b123b] [REQUEST][START] GET /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-06 10:00:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-06 10:00:01 --> [REQ_ID=b745701b123b] [FILTER_BEFORE] /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-06 10:00:01 --> [REQ_ID=b745701b123b] [ROUTE] Controller=\App\Modules\Management\Controllers\ManagementAPIController Method=Run_CRON_Tasks
DEBUG - 2026-03-06 10:00:01 --> [REQ_ID=b745701b123b] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-06 10:00:01 --> [REQ_ID=b745701b123b] [REQUEST][END]
INFO - 2026-03-06 10:00:01 --> [REQ_ID=b745701b123b] [PERF] Execution time=0.065634
INFO - 2026-03-06 10:00:01 --> [spark:ops:work] Completed
INFO - 2026-03-06 10:00:01 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.160313
INFO - 2026-03-06 10:00:01 --> [SPARK_MEMORY] 18874368
INFO - 2026-03-06 10:00:02 --> [AIOPS][SPARK][GOVERNANCE][spark:logs:summarize] Started
INFO - 2026-03-06 10:00:02 --> [SPARK_START] App\Commands\Logs\Summarize
INFO - 2026-03-06 10:00:02 --> [SPARK_MEMORY] 16777216
INFO - 2026-03-06 10:00:02 --> [spark:logs:summarize] Intent
INFO - 2026-03-06 10:00:03 --> [AIOPS][SPARK][GOVERNANCE][spark:logs:summarize] Completed
INFO - 2026-03-06 10:00:03 --> [SPARK_COMPLETE] App\Commands\Logs\Summarize duration=0.009715
INFO - 2026-03-06 10:00:03 --> [SPARK_MEMORY] 18874368
INFO - 2026-03-06 10:00:03 --> [spark:app:healthcheck] Started
INFO - 2026-03-06 10:00:03 --> [SPARK_START] App\Commands\App\Healthcheck
INFO - 2026-03-06 10:00:03 --> [SPARK_MEMORY] 16777216
INFO - 2026-03-06 10:00:03 --> [spark:app:healthcheck] Intent
DEBUG - 2026-03-06 10:00:03 --> LOG_HEALTHCHECK debug marker=4386b141036a
INFO - 2026-03-06 10:00:03 --> LOG_HEALTHCHECK info marker=4386b141036a
NOTICE - 2026-03-06 10:00:03 --> LOG_HEALTHCHECK probe marker=4386b141036a
INFO - 2026-03-06 10:00:03 --> [spark:app:healthcheck] Completed
INFO - 2026-03-06 10:00:03 --> [SPARK_COMPLETE] App\Commands\App\Healthcheck duration=0.023847
INFO - 2026-03-06 10:00:03 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-03-06 10:00:04 --> OllamaPatchRunner:L142 - validateGeneratedPatch Content: 
WARNING - 2026-03-06 10:00:04 --> OllamaPatchRunner:L49 - Original Diff: 
DEBUG - 2026-03-06 10:00:05 --> OllamaPatchRunner:L51 - Retried Diff: 
DEBUG - 2026-03-06 10:00:05 --> OllamaPatchRunner:L142 - validateGeneratedPatch Content: 
DEBUG - 2026-03-06 10:00:05 --> OllamaPatchRunner:L53 - Validating Generated Patch Failed
INFO - 2026-03-06 10:00:05 --> [SPARK_COMPLETE] App\Commands\AIOps\Run duration=3.409484
INFO - 2026-03-06 10:00:05 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-03-06 10:01:19 --> [REQ_ID=1284901bedc2] [REQUEST][START] HEAD /
DEBUG - 2026-03-06 10:01:19 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-06 10:01:19 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-06 10:01:19 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-06 10:01:19 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-06 10:01:19 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-06 10:06:19 --> [REQ_ID=d680ace054b3] [REQUEST][START] HEAD /
DEBUG - 2026-03-06 10:06:19 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-06 10:06:19 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-06 10:06:19 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-06 10:06:19 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-06 10:06:19 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-06 10:11:19 --> [REQ_ID=1f1545810353] [REQUEST][START] HEAD /
DEBUG - 2026-03-06 10:11:19 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-06 10:11:19 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-06 10:11:20 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-06 10:11:20 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-06 10:11:20 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
INFO - 2026-03-06 10:15:01 --> [spark:ops:work] Started
INFO - 2026-03-06 10:15:01 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-03-06 10:15:01 --> [SPARK_MEMORY] 16777216
INFO - 2026-03-06 10:15:01 --> [spark:ops:work] Intent
INFO - 2026-03-06 10:15:02 --> [spark:ops:work] Completed
INFO - 2026-03-06 10:15:02 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.051790
INFO - 2026-03-06 10:15:02 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-03-06 10:15:02 --> [REQ_ID=b8bf0e8822c8] [REQUEST][START] GET /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-06 10:15:02 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-06 10:15:02 --> [REQ_ID=b8bf0e8822c8] [FILTER_BEFORE] /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-06 10:15:02 --> [REQ_ID=b8bf0e8822c8] [ROUTE] Controller=\App\Modules\APIs\Controllers\AlertsAPIController Method=fetchEmailAlerts
DEBUG - 2026-03-06 10:15:02 --> [REQ_ID=b8bf0e8822c8] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-06 10:15:02 --> [REQ_ID=b8bf0e8822c8] [REQUEST][END]
INFO - 2026-03-06 10:15:02 --> [REQ_ID=b8bf0e8822c8] [PERF] Execution time=0.055951
DEBUG - 2026-03-06 10:16:19 --> [REQ_ID=b48e398bbc5f] [REQUEST][START] HEAD /
DEBUG - 2026-03-06 10:16:19 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-06 10:16:19 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-06 10:16:19 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-06 10:16:19 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-06 10:16:19 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-06 10:19:04 --> [REQ_ID=64f00e50e0b4] [REQUEST][START] GET /index.php
DEBUG - 2026-03-06 10:19:04 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-06 10:19:04 --> [REQ_ID=64f00e50e0b4] [FILTER_BEFORE] /index.php
DEBUG - 2026-03-06 10:19:04 --> [REQ_ID=64f00e50e0b4] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-06 10:19:04 --> [REQ_ID=64f00e50e0b4] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-06 10:19:04 --> [CSRF] token name=csrf_test_name hash=7558402fca3d865f1b4ef8689e94d0fe
DEBUG - 2026-03-06 10:19:04 --> [REQ_ID=a69d8602bda6] [INIT] App\Controllers\Home::GET
INFO - 2026-03-06 10:19:04 --> [REQ_ID=a69d8602bda6] [MEMORY][controller-start] 6291456
INFO - 2026-03-06 10:19:04 --> [REQ_ID=a69d8602bda6] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-06 10:19:04 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-06 10:19:05 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-03-06 10:19:05 --> [REQ_ID=a69d8602bda6] [VIEW_RENDER] themes/public/home
INFO - 2026-03-06 10:19:05 --> [REQ_ID=a69d8602bda6] [MEMORY][commonData:start] 10485760
INFO - 2026-03-06 10:19:05 --> themesMemory usage: 10485760
DEBUG - 2026-03-06 10:19:05 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-06 10:19:05 --> [REQ_ID=64f00e50e0b4] [FILTER_AFTER]
DEBUG - 2026-03-06 10:19:05 --> [REQ_ID=64f00e50e0b4] [LIFECYCLE][END] status=200 duration_ms=741.49 memory_delta=4194304
INFO - 2026-03-06 10:19:05 --> [REQ_ID=a69d8602bda6] [PERF] Execution time=0.739106
DEBUG - 2026-03-06 10:19:05 --> [REQ_ID=64f00e50e0b4] [REQUEST][END]
INFO - 2026-03-06 10:19:05 --> [REQ_ID=64f00e50e0b4] [PERF] Execution time=0.781838
DEBUG - 2026-03-06 10:21:19 --> [REQ_ID=bc75d7be8992] [REQUEST][START] HEAD /
DEBUG - 2026-03-06 10:21:19 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-06 10:21:19 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-06 10:21:19 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-06 10:21:19 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-06 10:21:19 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-06 10:23:28 --> [REQ_ID=b8d0fb0b1dca] [REQUEST][START] GET /index.php/Projects
DEBUG - 2026-03-06 10:23:28 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-06 10:23:28 --> [REQ_ID=b8d0fb0b1dca] [FILTER_BEFORE] /index.php/Projects
DEBUG - 2026-03-06 10:23:28 --> [REQ_ID=b8d0fb0b1dca] [ROUTE] Controller=\App\Modules\User\Controllers\ProjectsController Method=index
DEBUG - 2026-03-06 10:23:28 --> [REQ_ID=b8d0fb0b1dca] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Projects
DEBUG - 2026-03-06 10:23:28 --> [CSRF] token name=csrf_test_name hash=ff42beb39fd6fd52fff6a798620675d6
DEBUG - 2026-03-06 10:23:28 --> [REQ_ID=b8d0fb0b1dca] [REQUEST][END]
INFO - 2026-03-06 10:23:28 --> [REQ_ID=b8d0fb0b1dca] [PERF] Execution time=0.051886
DEBUG - 2026-03-06 10:23:30 --> [REQ_ID=0b55c50555d0] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-06 10:23:30 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-06 10:23:30 --> [REQ_ID=0b55c50555d0] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-06 10:23:30 --> [REQ_ID=0b55c50555d0] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-06 10:23:30 --> [REQ_ID=0b55c50555d0] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-06 10:23:30 --> [CSRF] token name=csrf_test_name hash=deb81613ae6fbace3dcfc3ac5fef773e
DEBUG - 2026-03-06 10:23:30 --> [REQ_ID=62c97b3b2398] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-06 10:23:30 --> [REQ_ID=62c97b3b2398] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-06 10:23:30 --> [REQ_ID=0b55c50555d0] [FILTER_AFTER]
DEBUG - 2026-03-06 10:23:30 --> [REQ_ID=0b55c50555d0] [LIFECYCLE][END] status=200 duration_ms=120.30 memory_delta=0
INFO - 2026-03-06 10:23:30 --> [REQ_ID=62c97b3b2398] [PERF] Execution time=0.120219
DEBUG - 2026-03-06 10:23:30 --> [REQ_ID=0b55c50555d0] [REQUEST][END]
INFO - 2026-03-06 10:23:30 --> [REQ_ID=0b55c50555d0] [PERF] Execution time=0.135475
DEBUG - 2026-03-06 10:26:19 --> [REQ_ID=726e32e870dc] [REQUEST][START] HEAD /
DEBUG - 2026-03-06 10:26:19 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-06 10:26:19 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-06 10:26:19 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-06 10:26:19 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-06 10:26:19 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-06 10:26:59 --> [REQ_ID=c4a7e23dac31] [REQUEST][START] GET /
DEBUG - 2026-03-06 10:26:59 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-06 10:26:59 --> [REQ_ID=c4a7e23dac31] [FILTER_BEFORE] /
DEBUG - 2026-03-06 10:26:59 --> [REQ_ID=c4a7e23dac31] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-06 10:26:59 --> [REQ_ID=c4a7e23dac31] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-06 10:26:59 --> [CSRF] token name=csrf_test_name hash=ebda5eadfcffdaba85bdf16ea7a7a75e
DEBUG - 2026-03-06 10:26:59 --> [REQ_ID=ada3a0d3467f] [INIT] App\Controllers\Home::GET
INFO - 2026-03-06 10:26:59 --> [REQ_ID=ada3a0d3467f] [MEMORY][controller-start] 4194304
INFO - 2026-03-06 10:26:59 --> [REQ_ID=ada3a0d3467f] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-06 10:26:59 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-06 10:27:00 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
DEBUG - 2026-03-06 10:27:00 --> [REQ_ID=ada3a0d3467f] [VIEW_RENDER] themes/public/home
INFO - 2026-03-06 10:27:00 --> [REQ_ID=ada3a0d3467f] [MEMORY][commonData:start] 8388608
INFO - 2026-03-06 10:27:00 --> themesMemory usage: 8388608
DEBUG - 2026-03-06 10:27:00 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-06 10:27:00 --> [REQ_ID=c4a7e23dac31] [FILTER_AFTER]
DEBUG - 2026-03-06 10:27:00 --> [REQ_ID=c4a7e23dac31] [LIFECYCLE][END] status=200 duration_ms=670.29 memory_delta=4194304
INFO - 2026-03-06 10:27:00 --> [REQ_ID=ada3a0d3467f] [PERF] Execution time=0.668189
DEBUG - 2026-03-06 10:27:00 --> [REQ_ID=c4a7e23dac31] [REQUEST][END]
INFO - 2026-03-06 10:27:00 --> [REQ_ID=c4a7e23dac31] [PERF] Execution time=0.690924
INFO - 2026-03-06 10:30:01 --> [spark:ops:work] Started
INFO - 2026-03-06 10:30:01 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-03-06 10:30:01 --> [SPARK_MEMORY] 16777216
INFO - 2026-03-06 10:30:01 --> [spark:ops:work] Intent
INFO - 2026-03-06 10:30:01 --> [spark:ops:work] Completed
INFO - 2026-03-06 10:30:01 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.042836
INFO - 2026-03-06 10:30:01 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-03-06 10:31:19 --> [REQ_ID=030c1e898ca9] [REQUEST][START] HEAD /
DEBUG - 2026-03-06 10:31:19 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-06 10:31:19 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-06 10:31:19 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-06 10:31:19 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-06 10:31:19 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-06 10:35:18 --> [REQ_ID=e5e4a4de1f6a] [REQUEST][START] GET /
DEBUG - 2026-03-06 10:35:18 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-06 10:35:18 --> [REQ_ID=e5e4a4de1f6a] [FILTER_BEFORE] /
DEBUG - 2026-03-06 10:35:18 --> [REQ_ID=e5e4a4de1f6a] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-06 10:35:18 --> [REQ_ID=e5e4a4de1f6a] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-06 10:35:18 --> [CSRF] token name=csrf_test_name hash=8e899981495953b4bc68e903189998a4
DEBUG - 2026-03-06 10:35:18 --> [REQ_ID=2a36dbbf429c] [INIT] App\Controllers\Home::GET
INFO - 2026-03-06 10:35:18 --> [REQ_ID=2a36dbbf429c] [MEMORY][controller-start] 6291456
INFO - 2026-03-06 10:35:18 --> [REQ_ID=2a36dbbf429c] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-06 10:35:18 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-06 10:35:19 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-03-06 10:35:19 --> [REQ_ID=2a36dbbf429c] [VIEW_RENDER] themes/public/home
INFO - 2026-03-06 10:35:19 --> [REQ_ID=2a36dbbf429c] [MEMORY][commonData:start] 10485760
INFO - 2026-03-06 10:35:19 --> themesMemory usage: 10485760
DEBUG - 2026-03-06 10:35:19 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-06 10:35:19 --> [REQ_ID=e5e4a4de1f6a] [FILTER_AFTER]
DEBUG - 2026-03-06 10:35:19 --> [REQ_ID=e5e4a4de1f6a] [LIFECYCLE][END] status=200 duration_ms=925.42 memory_delta=4194304
INFO - 2026-03-06 10:35:19 --> [REQ_ID=2a36dbbf429c] [PERF] Execution time=0.923467
DEBUG - 2026-03-06 10:35:19 --> [REQ_ID=e5e4a4de1f6a] [REQUEST][END]
INFO - 2026-03-06 10:35:19 --> [REQ_ID=e5e4a4de1f6a] [PERF] Execution time=0.963170
DEBUG - 2026-03-06 10:36:19 --> [REQ_ID=100069bc8b69] [REQUEST][START] HEAD /
DEBUG - 2026-03-06 10:36:19 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-06 10:36:19 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-06 10:36:19 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-06 10:36:19 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-06 10:36:19 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-06 10:41:19 --> [REQ_ID=10dcf8d3b84a] [REQUEST][START] HEAD /
DEBUG - 2026-03-06 10:41:19 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-06 10:41:19 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-06 10:41:19 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-06 10:41:19 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-06 10:41:19 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-06 10:42:31 --> [REQ_ID=3b5586094193] [REQUEST][START] GET /index.php/How-It-Works
DEBUG - 2026-03-06 10:42:31 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-06 10:42:31 --> [REQ_ID=3b5586094193] [FILTER_BEFORE] /index.php/How-It-Works
DEBUG - 2026-03-06 10:42:31 --> [REQ_ID=3b5586094193] [ROUTE] Controller=\App\Modules\Blog\Controllers\HowItWorksController Method=index
DEBUG - 2026-03-06 10:42:31 --> [REQ_ID=3b5586094193] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/How-It-Works
DEBUG - 2026-03-06 10:42:31 --> [CSRF] token name=csrf_test_name hash=17a958693e206d13afe682769072725c
DEBUG - 2026-03-06 10:42:31 --> [REQ_ID=52146e26e6c3] [INIT] App\Modules\Blog\Controllers\HowItWorksController::GET
INFO - 2026-03-06 10:42:31 --> [REQ_ID=52146e26e6c3] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-06 10:42:31 --> [REQ_ID=52146e26e6c3] [METHOD_ENTRY] index
DEBUG - 2026-03-06 10:42:31 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-06 10:42:31 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-06 10:42:31 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-06 10:42:31 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-06 10:42:31 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-06 10:42:31 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-06 10:42:31 --> [REQ_ID=52146e26e6c3] [VIEW_RENDER] App\Modules\Blog\Views\HowItWorks\index
INFO - 2026-03-06 10:42:31 --> [REQ_ID=52146e26e6c3] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-06 10:42:32 --> [MetaService] slug=how-it-works pageName= cacheHit= path=DB
INFO - 2026-03-06 10:42:32 --> themesMemory usage: 8388608
DEBUG - 2026-03-06 10:42:32 --> [MetaService] slug=how-it-works pageName= cacheHit=1 path=CACHE
DEBUG - 2026-03-06 10:42:32 --> [REQ_ID=3b5586094193] [FILTER_AFTER]
DEBUG - 2026-03-06 10:42:32 --> [REQ_ID=3b5586094193] [LIFECYCLE][END] status=200 duration_ms=818.11 memory_delta=4194304
INFO - 2026-03-06 10:42:32 --> [REQ_ID=52146e26e6c3] [PERF] Execution time=0.815579
DEBUG - 2026-03-06 10:42:32 --> [REQ_ID=3b5586094193] [REQUEST][END]
INFO - 2026-03-06 10:42:32 --> [REQ_ID=3b5586094193] [PERF] Execution time=0.839678
INFO - 2026-03-06 10:45:01 --> [spark:ops:work] Started
INFO - 2026-03-06 10:45:01 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-03-06 10:45:01 --> [SPARK_MEMORY] 16777216
INFO - 2026-03-06 10:45:01 --> [spark:ops:work] Intent
INFO - 2026-03-06 10:45:01 --> [spark:ops:work] Completed
INFO - 2026-03-06 10:45:01 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.116316
INFO - 2026-03-06 10:45:01 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-03-06 10:46:19 --> [REQ_ID=853d175180bd] [REQUEST][START] HEAD /
DEBUG - 2026-03-06 10:46:19 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-06 10:46:19 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-06 10:46:19 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-06 10:46:19 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-06 10:46:19 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-06 10:49:36 --> [REQ_ID=d0a655576a2d] [REQUEST][START] GET /
DEBUG - 2026-03-06 10:49:36 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-06 10:49:36 --> [REQ_ID=d0a655576a2d] [FILTER_BEFORE] /
DEBUG - 2026-03-06 10:49:36 --> [REQ_ID=d0a655576a2d] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-06 10:49:36 --> [REQ_ID=d0a655576a2d] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-06 10:49:36 --> [CSRF] token name=csrf_test_name hash=0d1f33fbd11196aacd1184ecc4b8883b
DEBUG - 2026-03-06 10:49:36 --> [REQ_ID=25a9e1e1164b] [INIT] App\Controllers\Home::GET
INFO - 2026-03-06 10:49:36 --> [REQ_ID=25a9e1e1164b] [MEMORY][controller-start] 6291456
INFO - 2026-03-06 10:49:36 --> [REQ_ID=25a9e1e1164b] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-06 10:49:36 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-06 10:49:37 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
DEBUG - 2026-03-06 10:49:37 --> [REQ_ID=25a9e1e1164b] [VIEW_RENDER] themes/public/home
INFO - 2026-03-06 10:49:37 --> [REQ_ID=25a9e1e1164b] [MEMORY][commonData:start] 10485760
INFO - 2026-03-06 10:49:37 --> themesMemory usage: 10485760
DEBUG - 2026-03-06 10:49:37 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-06 10:49:37 --> [REQ_ID=d0a655576a2d] [FILTER_AFTER]
DEBUG - 2026-03-06 10:49:37 --> [REQ_ID=d0a655576a2d] [LIFECYCLE][END] status=200 duration_ms=689.29 memory_delta=4194304
INFO - 2026-03-06 10:49:37 --> [REQ_ID=25a9e1e1164b] [PERF] Execution time=0.687233
DEBUG - 2026-03-06 10:49:37 --> [REQ_ID=d0a655576a2d] [REQUEST][END]
INFO - 2026-03-06 10:49:37 --> [REQ_ID=d0a655576a2d] [PERF] Execution time=0.727965
DEBUG - 2026-03-06 10:51:19 --> [REQ_ID=0b728f8e518e] [REQUEST][START] HEAD /
DEBUG - 2026-03-06 10:51:19 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-06 10:51:19 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-06 10:51:19 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-06 10:51:19 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-06 10:51:19 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-06 10:56:19 --> [REQ_ID=61257b6d7db8] [REQUEST][START] HEAD /
DEBUG - 2026-03-06 10:56:19 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-06 10:56:19 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-06 10:56:19 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-06 10:56:19 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-06 10:56:19 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
INFO - 2026-03-06 11:00:02 --> [spark:ops:work] Started
INFO - 2026-03-06 11:00:02 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-03-06 11:00:02 --> [SPARK_MEMORY] 16777216
INFO - 2026-03-06 11:00:02 --> [spark:ops:work] Intent
DEBUG - 2026-03-06 11:00:02 --> [REQ_ID=1d1b42c58154] [REQUEST][START] GET /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-06 11:00:02 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-06 11:00:02 --> [REQ_ID=1d1b42c58154] [FILTER_BEFORE] /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-06 11:00:02 --> [REQ_ID=1d1b42c58154] [ROUTE] Controller=\App\Modules\Management\Controllers\ManagementAPIController Method=Run_CRON_Tasks
DEBUG - 2026-03-06 11:00:02 --> [REQ_ID=1d1b42c58154] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-06 11:00:02 --> [REQ_ID=1d1b42c58154] [REQUEST][END]
INFO - 2026-03-06 11:00:02 --> [REQ_ID=1d1b42c58154] [PERF] Execution time=0.038237
INFO - 2026-03-06 11:00:02 --> [spark:ops:work] Completed
INFO - 2026-03-06 11:00:02 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.192721
INFO - 2026-03-06 11:00:02 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-03-06 11:01:19 --> [REQ_ID=84b96c04c80f] [REQUEST][START] HEAD /
DEBUG - 2026-03-06 11:01:19 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-06 11:01:19 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-06 11:01:19 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-06 11:01:19 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-06 11:01:19 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-06 11:06:19 --> [REQ_ID=e2a93c0f6bb2] [REQUEST][START] HEAD /
DEBUG - 2026-03-06 11:06:19 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-06 11:06:19 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-06 11:06:19 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-06 11:06:19 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-06 11:06:19 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-06 11:11:19 --> [REQ_ID=6cf9e1bd2712] [REQUEST][START] HEAD /
DEBUG - 2026-03-06 11:11:19 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-06 11:11:19 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-06 11:11:19 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-06 11:11:19 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-06 11:11:19 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-06 11:12:44 --> [REQ_ID=c7c35420e5dd] [REQUEST][START] GET /
DEBUG - 2026-03-06 11:12:44 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-06 11:12:44 --> [REQ_ID=c7c35420e5dd] [FILTER_BEFORE] /
DEBUG - 2026-03-06 11:12:44 --> [REQ_ID=c7c35420e5dd] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-06 11:12:44 --> [REQ_ID=c7c35420e5dd] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-06 11:12:44 --> [CSRF] token name=csrf_test_name hash=44e93b4593c1fac2c52ffa99b97c640e
DEBUG - 2026-03-06 11:12:44 --> [REQ_ID=ba0d4af7aadd] [INIT] App\Controllers\Home::GET
INFO - 2026-03-06 11:12:44 --> [REQ_ID=ba0d4af7aadd] [MEMORY][controller-start] 4194304
INFO - 2026-03-06 11:12:44 --> [REQ_ID=ba0d4af7aadd] [MEMORY][commonData:start] 4194304
DEBUG - 2026-03-06 11:12:44 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-06 11:12:44 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-03-06 11:12:44 --> [REQ_ID=ba0d4af7aadd] [VIEW_RENDER] themes/public/home
INFO - 2026-03-06 11:12:44 --> [REQ_ID=ba0d4af7aadd] [MEMORY][commonData:start] 8388608
INFO - 2026-03-06 11:12:44 --> themesMemory usage: 8388608
DEBUG - 2026-03-06 11:12:44 --> [MetaService] slug= pageName=Home cacheHit= path=DB
DEBUG - 2026-03-06 11:12:44 --> [REQ_ID=c7c35420e5dd] [FILTER_AFTER]
DEBUG - 2026-03-06 11:12:44 --> [REQ_ID=c7c35420e5dd] [LIFECYCLE][END] status=200 duration_ms=663.44 memory_delta=4194304
INFO - 2026-03-06 11:12:44 --> [REQ_ID=ba0d4af7aadd] [PERF] Execution time=0.661288
DEBUG - 2026-03-06 11:12:44 --> [REQ_ID=c7c35420e5dd] [REQUEST][END]
INFO - 2026-03-06 11:12:44 --> [REQ_ID=c7c35420e5dd] [PERF] Execution time=0.683826
DEBUG - 2026-03-06 11:12:45 --> [REQ_ID=63e0b83cbf5d] [REQUEST][START] GET /index.php/How-It-Works/Investment-Dashboard
DEBUG - 2026-03-06 11:12:45 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-06 11:12:45 --> [REQ_ID=63e0b83cbf5d] [FILTER_BEFORE] /index.php/How-It-Works/Investment-Dashboard
DEBUG - 2026-03-06 11:12:45 --> [REQ_ID=63e0b83cbf5d] [ROUTE] Controller=\App\Modules\Blog\Controllers\HowItWorksController Method=show
DEBUG - 2026-03-06 11:12:45 --> [REQ_ID=63e0b83cbf5d] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/How-It-Works/Investment-Dashboard
DEBUG - 2026-03-06 11:12:45 --> [CSRF] token name=csrf_test_name hash=44e93b4593c1fac2c52ffa99b97c640e
DEBUG - 2026-03-06 11:12:45 --> [REQ_ID=d0d0e7a7d46d] [INIT] App\Modules\Blog\Controllers\HowItWorksController::GET
INFO - 2026-03-06 11:12:45 --> [REQ_ID=d0d0e7a7d46d] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-06 11:12:45 --> [REQ_ID=d0d0e7a7d46d] [METHOD_ENTRY] show
DEBUG - 2026-03-06 11:12:45 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-06 11:12:45 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-06 11:12:45 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-06 11:12:45 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-06 11:12:45 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-06 11:12:45 --> MyMICoin: guest context detected; skipping user-specific preload.
INFO - 2026-03-06 11:12:45 --> [REQ_ID=d0d0e7a7d46d] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-06 11:12:46 --> [REQ_ID=d0d0e7a7d46d] [VIEW_RENDER] App\Modules\Blog\Views\HowItWorks\Investment_Portfolio_Management
INFO - 2026-03-06 11:12:46 --> [REQ_ID=d0d0e7a7d46d] [MEMORY][commonData:start] 8388608
INFO - 2026-03-06 11:12:46 --> themesMemory usage: 12582912
DEBUG - 2026-03-06 11:12:46 --> [REQ_ID=63e0b83cbf5d] [FILTER_AFTER]
DEBUG - 2026-03-06 11:12:46 --> [REQ_ID=63e0b83cbf5d] [LIFECYCLE][END] status=200 duration_ms=1,271.80 memory_delta=8388608
INFO - 2026-03-06 11:12:46 --> [REQ_ID=d0d0e7a7d46d] [PERF] Execution time=1.271605
DEBUG - 2026-03-06 11:12:46 --> [REQ_ID=63e0b83cbf5d] [REQUEST][END]
INFO - 2026-03-06 11:12:46 --> [REQ_ID=63e0b83cbf5d] [PERF] Execution time=1.285281
DEBUG - 2026-03-06 11:12:47 --> [REQ_ID=419680db6adb] [REQUEST][START] POST /index.php/register
DEBUG - 2026-03-06 11:12:47 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-06 11:12:47 --> [REQ_ID=419680db6adb] [FILTER_BEFORE] /index.php/register
DEBUG - 2026-03-06 11:12:47 --> [REQ_ID=419680db6adb] [ROUTE] Controller=\App\Controllers\AuthController Method=attemptRegister
DEBUG - 2026-03-06 11:12:47 --> [REQ_ID=419680db6adb] [LIFECYCLE][START] POST https://www.mymiwallet.com/index.php/register
DEBUG - 2026-03-06 11:12:47 --> [CSRF] token name=csrf_test_name hash=44e93b4593c1fac2c52ffa99b97c640e
INFO - 2026-03-06 11:12:47 --> CSRF token verified.
DEBUG - 2026-03-06 11:12:47 --> [REQ_ID=ddd8b287ab52] [INIT] App\Controllers\AuthController::POST
INFO - 2026-03-06 11:12:47 --> [REQ_ID=ddd8b287ab52] [MEMORY][controller-start] 8388608
INFO - 2026-03-06 11:12:47 --> [REGISTRATION] Submission received
INFO - 2026-03-06 11:12:47 --> MailService queued email
ERROR - 2026-03-06 11:12:47 --> Registration failed: {"username":"The username field is not in the correct format."}
INFO - 2026-03-06 11:12:47 --> MailService queued email
WARNING - 2026-03-06 11:12:47 --> [REGISTRATION] Validation failed (basic fields)
DEBUG - 2026-03-06 11:12:47 --> [REQ_ID=419680db6adb] [FILTER_AFTER]
DEBUG - 2026-03-06 11:12:47 --> [REQ_ID=419680db6adb] [LIFECYCLE][END] status=302 duration_ms=85.19 memory_delta=0
INFO - 2026-03-06 11:12:47 --> [REQ_ID=ddd8b287ab52] [PERF] Execution time=0.084724
DEBUG - 2026-03-06 11:12:47 --> [REQ_ID=419680db6adb] [REQUEST][END]
INFO - 2026-03-06 11:12:47 --> [REQ_ID=419680db6adb] [PERF] Execution time=0.097998
DEBUG - 2026-03-06 11:12:48 --> [REQ_ID=04e80e3e22e7] [REQUEST][START] GET /index.php/How-It-Works/Investment-Dashboard
DEBUG - 2026-03-06 11:12:48 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-06 11:12:48 --> [REQ_ID=04e80e3e22e7] [FILTER_BEFORE] /index.php/How-It-Works/Investment-Dashboard
DEBUG - 2026-03-06 11:12:48 --> [REQ_ID=04e80e3e22e7] [ROUTE] Controller=\App\Modules\Blog\Controllers\HowItWorksController Method=show
DEBUG - 2026-03-06 11:12:48 --> [REQ_ID=04e80e3e22e7] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/How-It-Works/Investment-Dashboard
DEBUG - 2026-03-06 11:12:48 --> [CSRF] token name=csrf_test_name hash=44e93b4593c1fac2c52ffa99b97c640e
DEBUG - 2026-03-06 11:12:48 --> [REQ_ID=683faeb16fba] [INIT] App\Modules\Blog\Controllers\HowItWorksController::GET
INFO - 2026-03-06 11:12:48 --> [REQ_ID=683faeb16fba] [MEMORY][controller-start] 6291456
DEBUG - 2026-03-06 11:12:48 --> [REQ_ID=683faeb16fba] [METHOD_ENTRY] show
DEBUG - 2026-03-06 11:12:48 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-06 11:12:48 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-06 11:12:48 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-06 11:12:48 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-06 11:12:48 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-06 11:12:48 --> MyMICoin: guest context detected; skipping user-specific preload.
INFO - 2026-03-06 11:12:48 --> [REQ_ID=683faeb16fba] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-06 11:12:49 --> [REQ_ID=683faeb16fba] [VIEW_RENDER] App\Modules\Blog\Views\HowItWorks\Investment_Portfolio_Management
INFO - 2026-03-06 11:12:49 --> [REQ_ID=683faeb16fba] [MEMORY][commonData:start] 8388608
INFO - 2026-03-06 11:12:49 --> themesMemory usage: 10485760
DEBUG - 2026-03-06 11:12:49 --> [REQ_ID=04e80e3e22e7] [FILTER_AFTER]
DEBUG - 2026-03-06 11:12:49 --> [REQ_ID=04e80e3e22e7] [LIFECYCLE][END] status=200 duration_ms=1,162.73 memory_delta=6291456
INFO - 2026-03-06 11:12:49 --> [REQ_ID=683faeb16fba] [PERF] Execution time=1.162555
DEBUG - 2026-03-06 11:12:49 --> [REQ_ID=04e80e3e22e7] [REQUEST][END]
INFO - 2026-03-06 11:12:49 --> [REQ_ID=04e80e3e22e7] [PERF] Execution time=1.171827
DEBUG - 2026-03-06 11:12:50 --> [REQ_ID=9ab553c57488] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-06 11:12:50 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-06 11:12:50 --> [REQ_ID=9ab553c57488] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-06 11:12:50 --> [REQ_ID=9ab553c57488] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-06 11:12:50 --> [REQ_ID=9ab553c57488] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-06 11:12:50 --> [CSRF] token name=csrf_test_name hash=44e93b4593c1fac2c52ffa99b97c640e
DEBUG - 2026-03-06 11:12:50 --> [REQ_ID=025bba5d8c62] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-06 11:12:50 --> [REQ_ID=025bba5d8c62] [MEMORY][controller-start] 8388608
DEBUG - 2026-03-06 11:12:50 --> [REQ_ID=9ab553c57488] [FILTER_AFTER]
DEBUG - 2026-03-06 11:12:50 --> [REQ_ID=9ab553c57488] [LIFECYCLE][END] status=200 duration_ms=18.46 memory_delta=0
INFO - 2026-03-06 11:12:50 --> [REQ_ID=025bba5d8c62] [PERF] Execution time=0.018329
DEBUG - 2026-03-06 11:12:50 --> [REQ_ID=9ab553c57488] [REQUEST][END]
INFO - 2026-03-06 11:12:50 --> [REQ_ID=9ab553c57488] [PERF] Execution time=0.028745
DEBUG - 2026-03-06 11:12:51 --> [REQ_ID=be1b57bfa4aa] [REQUEST][START] POST /index.php/login
DEBUG - 2026-03-06 11:12:51 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-06 11:12:51 --> [REQ_ID=be1b57bfa4aa] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-06 11:12:51 --> [REQ_ID=be1b57bfa4aa] [ROUTE] Controller=\App\Controllers\AuthController Method=attemptLogin
DEBUG - 2026-03-06 11:12:51 --> [REQ_ID=be1b57bfa4aa] [LIFECYCLE][START] POST https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-06 11:12:51 --> [CSRF] token name=csrf_test_name hash=44e93b4593c1fac2c52ffa99b97c640e
INFO - 2026-03-06 11:12:51 --> CSRF token verified.
DEBUG - 2026-03-06 11:12:51 --> [REQ_ID=993e11a009c2] [INIT] App\Controllers\AuthController::POST
INFO - 2026-03-06 11:12:51 --> [REQ_ID=993e11a009c2] [MEMORY][controller-start] 6291456
INFO - 2026-03-06 11:12:51 --> AuthController L93: Auth:attemptLogin started.
INFO - 2026-03-06 11:12:51 --> AuthController L104: Auth:attemptLogin rules: {"login":"required","password":"required"}
INFO - 2026-03-06 11:12:51 --> AuthController L132: Auth:attemptLogin Login Variables: login: required, remember: false, ip: 146.19.125.48, ua: Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.0.0 Safari/537.36
DEBUG - 2026-03-06 11:12:51 --> Auth attemptLogin() called with login identifier: schreiner-roeber.de, remember: false
DEBUG - 2026-03-06 11:12:51 --> Auth attemptLogin() called. redirect_url in session: https://www.mymiwallet.com/index.php/How-It-Works/Investment-Dashboard
DEBUG - 2026-03-06 11:12:51 --> Auth credentials normalised for attempt using key "username"
WARNING - 2026-03-06 11:12:51 --> [AUTH_FAILURE] 
DEBUG - 2026-03-06 11:12:51 --> Auth attempt failed for identifier schreiner-roeber.de. Error: Unable to log you in. Please check your credentials.
WARNING - 2026-03-06 11:12:51 --> [AUTH] Login failure
WARNING - 2026-03-06 11:12:51 --> [AUTH] Login failed
DEBUG - 2026-03-06 11:12:51 --> [REQ_ID=be1b57bfa4aa] [FILTER_AFTER]
DEBUG - 2026-03-06 11:12:51 --> [REQ_ID=be1b57bfa4aa] [LIFECYCLE][END] status=302 duration_ms=47.14 memory_delta=0
INFO - 2026-03-06 11:12:51 --> [REQ_ID=993e11a009c2] [PERF] Execution time=0.047033
DEBUG - 2026-03-06 11:12:51 --> [REQ_ID=be1b57bfa4aa] [REQUEST][END]
INFO - 2026-03-06 11:12:51 --> [REQ_ID=be1b57bfa4aa] [PERF] Execution time=0.056068
DEBUG - 2026-03-06 11:12:51 --> [REQ_ID=f0d4d7c0a717] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-06 11:12:51 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-06 11:12:51 --> [REQ_ID=f0d4d7c0a717] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-06 11:12:51 --> [REQ_ID=f0d4d7c0a717] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-06 11:12:51 --> [REQ_ID=f0d4d7c0a717] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-06 11:12:51 --> [CSRF] token name=csrf_test_name hash=44e93b4593c1fac2c52ffa99b97c640e
DEBUG - 2026-03-06 11:12:51 --> [REQ_ID=495603c474b6] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-06 11:12:51 --> [REQ_ID=495603c474b6] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-06 11:12:51 --> [REQ_ID=f0d4d7c0a717] [FILTER_AFTER]
DEBUG - 2026-03-06 11:12:51 --> [REQ_ID=f0d4d7c0a717] [LIFECYCLE][END] status=200 duration_ms=16.29 memory_delta=0
INFO - 2026-03-06 11:12:51 --> [REQ_ID=495603c474b6] [PERF] Execution time=0.016246
DEBUG - 2026-03-06 11:12:51 --> [REQ_ID=f0d4d7c0a717] [REQUEST][END]
INFO - 2026-03-06 11:12:51 --> [REQ_ID=f0d4d7c0a717] [PERF] Execution time=0.025463
INFO - 2026-03-06 11:15:02 --> [spark:ops:work] Started
INFO - 2026-03-06 11:15:02 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-03-06 11:15:02 --> [SPARK_MEMORY] 16777216
INFO - 2026-03-06 11:15:02 --> [spark:ops:work] Intent
INFO - 2026-03-06 11:15:02 --> [spark:ops:work] Completed
INFO - 2026-03-06 11:15:02 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.092929
INFO - 2026-03-06 11:15:02 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-03-06 11:15:02 --> [REQ_ID=8f027dde65c4] [REQUEST][START] GET /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-06 11:15:02 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-06 11:15:02 --> [REQ_ID=8f027dde65c4] [FILTER_BEFORE] /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-06 11:15:02 --> [REQ_ID=8f027dde65c4] [ROUTE] Controller=\App\Modules\APIs\Controllers\AlertsAPIController Method=fetchEmailAlerts
DEBUG - 2026-03-06 11:15:02 --> [REQ_ID=8f027dde65c4] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-06 11:15:02 --> [REQ_ID=8f027dde65c4] [REQUEST][END]
INFO - 2026-03-06 11:15:02 --> [REQ_ID=8f027dde65c4] [PERF] Execution time=0.068103
DEBUG - 2026-03-06 11:15:11 --> [REQ_ID=0a5cfce1b0e7] [REQUEST][START] GET /
DEBUG - 2026-03-06 11:15:11 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-06 11:15:11 --> [REQ_ID=0a5cfce1b0e7] [FILTER_BEFORE] /
DEBUG - 2026-03-06 11:15:11 --> [REQ_ID=0a5cfce1b0e7] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-06 11:15:11 --> [REQ_ID=0a5cfce1b0e7] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-06 11:15:11 --> [CSRF] token name=csrf_test_name hash=0d309f095b17a0e17c3c9d42dfed0c18
DEBUG - 2026-03-06 11:15:11 --> [REQ_ID=22ba22912c3e] [INIT] App\Controllers\Home::GET
INFO - 2026-03-06 11:15:11 --> [REQ_ID=22ba22912c3e] [MEMORY][controller-start] 4194304
INFO - 2026-03-06 11:15:11 --> [REQ_ID=22ba22912c3e] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-06 11:15:11 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-06 11:15:12 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
DEBUG - 2026-03-06 11:15:12 --> [REQ_ID=22ba22912c3e] [VIEW_RENDER] themes/public/home
INFO - 2026-03-06 11:15:12 --> [REQ_ID=22ba22912c3e] [MEMORY][commonData:start] 8388608
INFO - 2026-03-06 11:15:12 --> themesMemory usage: 8388608
DEBUG - 2026-03-06 11:15:12 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-06 11:15:12 --> [REQ_ID=0a5cfce1b0e7] [FILTER_AFTER]
DEBUG - 2026-03-06 11:15:12 --> [REQ_ID=0a5cfce1b0e7] [LIFECYCLE][END] status=200 duration_ms=820.39 memory_delta=4194304
INFO - 2026-03-06 11:15:12 --> [REQ_ID=22ba22912c3e] [PERF] Execution time=0.818685
DEBUG - 2026-03-06 11:15:12 --> [REQ_ID=0a5cfce1b0e7] [REQUEST][END]
INFO - 2026-03-06 11:15:12 --> [REQ_ID=0a5cfce1b0e7] [PERF] Execution time=0.834416
DEBUG - 2026-03-06 11:16:19 --> [REQ_ID=0ae192479fd3] [REQUEST][START] HEAD /
DEBUG - 2026-03-06 11:16:19 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-06 11:16:19 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-06 11:16:19 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-06 11:16:19 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-06 11:16:19 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-06 11:21:19 --> [REQ_ID=9b2bfb4af363] [REQUEST][START] HEAD /
DEBUG - 2026-03-06 11:21:19 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-06 11:21:19 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-06 11:21:19 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-06 11:21:19 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-06 11:21:19 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-06 11:26:19 --> [REQ_ID=0995c0993edf] [REQUEST][START] HEAD /
DEBUG - 2026-03-06 11:26:19 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-06 11:26:19 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-06 11:26:19 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-06 11:26:19 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-06 11:26:19 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
INFO - 2026-03-06 11:30:01 --> [spark:ops:work] Started
INFO - 2026-03-06 11:30:01 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-03-06 11:30:01 --> [SPARK_MEMORY] 16777216
INFO - 2026-03-06 11:30:01 --> [spark:ops:work] Intent
INFO - 2026-03-06 11:30:01 --> [spark:ops:work] Completed
INFO - 2026-03-06 11:30:01 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.214459
INFO - 2026-03-06 11:30:01 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-03-06 11:31:19 --> [REQ_ID=36954fcb21aa] [REQUEST][START] HEAD /
DEBUG - 2026-03-06 11:31:19 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-06 11:31:19 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-06 11:31:19 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-06 11:31:19 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-06 11:31:19 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-06 11:36:19 --> [REQ_ID=035f4971b48b] [REQUEST][START] HEAD /
DEBUG - 2026-03-06 11:36:19 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-06 11:36:19 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-06 11:36:19 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-06 11:36:19 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-06 11:36:19 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-06 11:39:15 --> [REQ_ID=168675e9fb1b] [REQUEST][START] GET /
DEBUG - 2026-03-06 11:39:15 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-06 11:39:15 --> [REQ_ID=168675e9fb1b] [FILTER_BEFORE] /
DEBUG - 2026-03-06 11:39:15 --> [REQ_ID=168675e9fb1b] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-06 11:39:15 --> [REQ_ID=168675e9fb1b] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-06 11:39:15 --> [CSRF] token name=csrf_test_name hash=842595b7dea4c692c7ea0c0db4cb937e
DEBUG - 2026-03-06 11:39:15 --> [REQ_ID=3b124b11ee19] [INIT] App\Controllers\Home::GET
INFO - 2026-03-06 11:39:15 --> [REQ_ID=3b124b11ee19] [MEMORY][controller-start] 6291456
INFO - 2026-03-06 11:39:15 --> [REQ_ID=3b124b11ee19] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-06 11:39:15 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-06 11:39:16 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-03-06 11:39:16 --> [REQ_ID=3b124b11ee19] [VIEW_RENDER] themes/public/home
INFO - 2026-03-06 11:39:16 --> [REQ_ID=3b124b11ee19] [MEMORY][commonData:start] 10485760
INFO - 2026-03-06 11:39:16 --> themesMemory usage: 10485760
DEBUG - 2026-03-06 11:39:16 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-06 11:39:16 --> [REQ_ID=168675e9fb1b] [FILTER_AFTER]
DEBUG - 2026-03-06 11:39:16 --> [REQ_ID=168675e9fb1b] [LIFECYCLE][END] status=200 duration_ms=597.75 memory_delta=4194304
INFO - 2026-03-06 11:39:16 --> [REQ_ID=3b124b11ee19] [PERF] Execution time=0.595794
DEBUG - 2026-03-06 11:39:16 --> [REQ_ID=168675e9fb1b] [REQUEST][END]
INFO - 2026-03-06 11:39:16 --> [REQ_ID=168675e9fb1b] [PERF] Execution time=0.636358
DEBUG - 2026-03-06 11:41:19 --> [REQ_ID=e22bb6cf6261] [REQUEST][START] HEAD /
DEBUG - 2026-03-06 11:41:19 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-06 11:41:19 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-06 11:41:19 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-06 11:41:19 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-06 11:41:19 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
INFO - 2026-03-06 11:45:01 --> [spark:ops:work] Started
INFO - 2026-03-06 11:45:02 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-03-06 11:45:02 --> [SPARK_MEMORY] 16777216
INFO - 2026-03-06 11:45:02 --> [spark:ops:work] Intent
INFO - 2026-03-06 11:45:02 --> [spark:ops:work] Completed
INFO - 2026-03-06 11:45:02 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.107480
INFO - 2026-03-06 11:45:02 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-03-06 11:46:19 --> [REQ_ID=145a3b153573] [REQUEST][START] HEAD /
DEBUG - 2026-03-06 11:46:19 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-06 11:46:19 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-06 11:46:19 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-06 11:46:19 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-06 11:46:19 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-06 11:51:19 --> [REQ_ID=5915dd5b9d87] [REQUEST][START] HEAD /
DEBUG - 2026-03-06 11:51:19 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-06 11:51:19 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-06 11:51:19 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-06 11:51:19 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-06 11:51:19 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-06 11:56:19 --> [REQ_ID=9fa352736de7] [REQUEST][START] HEAD /
DEBUG - 2026-03-06 11:56:19 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-06 11:56:19 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-06 11:56:19 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-06 11:56:19 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-06 11:56:19 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
INFO - 2026-03-06 12:00:01 --> [SPARK_START] App\Commands\AIOps\Run
INFO - 2026-03-06 12:00:01 --> [SPARK_MEMORY] 16777216
INFO - 2026-03-06 12:00:01 --> [spark:aiops:run] Intent
INFO - 2026-03-06 12:00:01 --> [spark:ops:work] Started
INFO - 2026-03-06 12:00:01 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-03-06 12:00:01 --> [SPARK_MEMORY] 16777216
INFO - 2026-03-06 12:00:01 --> [spark:ops:work] Intent
DEBUG - 2026-03-06 12:00:01 --> [REQ_ID=85b13394c763] [REQUEST][START] GET /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-06 12:00:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-06 12:00:01 --> [REQ_ID=85b13394c763] [FILTER_BEFORE] /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-06 12:00:01 --> [REQ_ID=85b13394c763] [ROUTE] Controller=\App\Modules\Management\Controllers\ManagementAPIController Method=Run_CRON_Tasks
DEBUG - 2026-03-06 12:00:01 --> [REQ_ID=85b13394c763] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-06 12:00:01 --> [REQ_ID=85b13394c763] [REQUEST][END]
INFO - 2026-03-06 12:00:01 --> [REQ_ID=85b13394c763] [PERF] Execution time=0.066063
INFO - 2026-03-06 12:00:01 --> [spark:ops:work] Completed
INFO - 2026-03-06 12:00:01 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.290171
INFO - 2026-03-06 12:00:01 --> [SPARK_MEMORY] 18874368
INFO - 2026-03-06 12:00:02 --> [AIOPS][SPARK][GOVERNANCE][spark:logs:summarize] Started
INFO - 2026-03-06 12:00:02 --> [SPARK_START] App\Commands\Logs\Summarize
INFO - 2026-03-06 12:00:02 --> [SPARK_MEMORY] 16777216
INFO - 2026-03-06 12:00:02 --> [spark:logs:summarize] Intent
INFO - 2026-03-06 12:00:02 --> [AIOPS][SPARK][GOVERNANCE][spark:logs:summarize] Completed
INFO - 2026-03-06 12:00:02 --> [SPARK_COMPLETE] App\Commands\Logs\Summarize duration=0.011385
INFO - 2026-03-06 12:00:02 --> [SPARK_MEMORY] 18874368
INFO - 2026-03-06 12:00:03 --> [spark:app:healthcheck] Started
INFO - 2026-03-06 12:00:03 --> [SPARK_START] App\Commands\App\Healthcheck
INFO - 2026-03-06 12:00:03 --> [SPARK_MEMORY] 16777216
INFO - 2026-03-06 12:00:03 --> [spark:app:healthcheck] Intent
DEBUG - 2026-03-06 12:00:03 --> LOG_HEALTHCHECK debug marker=079cceeff3fc
INFO - 2026-03-06 12:00:03 --> LOG_HEALTHCHECK info marker=079cceeff3fc
NOTICE - 2026-03-06 12:00:03 --> LOG_HEALTHCHECK probe marker=079cceeff3fc
INFO - 2026-03-06 12:00:03 --> [spark:app:healthcheck] Completed
INFO - 2026-03-06 12:00:03 --> [SPARK_COMPLETE] App\Commands\App\Healthcheck duration=0.024210
INFO - 2026-03-06 12:00:03 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-03-06 12:00:04 --> OllamaPatchRunner:L142 - validateGeneratedPatch Content: 
WARNING - 2026-03-06 12:00:04 --> OllamaPatchRunner:L49 - Original Diff: 
DEBUG - 2026-03-06 12:00:05 --> OllamaPatchRunner:L51 - Retried Diff: 
DEBUG - 2026-03-06 12:00:05 --> OllamaPatchRunner:L142 - validateGeneratedPatch Content: 
DEBUG - 2026-03-06 12:00:05 --> OllamaPatchRunner:L53 - Validating Generated Patch Failed
INFO - 2026-03-06 12:00:05 --> [SPARK_COMPLETE] App\Commands\AIOps\Run duration=3.433234
INFO - 2026-03-06 12:00:05 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-03-06 12:01:19 --> [REQ_ID=a8dc3fb4acc1] [REQUEST][START] HEAD /
DEBUG - 2026-03-06 12:01:19 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-06 12:01:19 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-06 12:01:19 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-06 12:01:19 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-06 12:01:19 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-06 12:06:19 --> [REQ_ID=ddf03a13e9b0] [REQUEST][START] HEAD /
DEBUG - 2026-03-06 12:06:19 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-06 12:06:19 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-06 12:06:19 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-06 12:06:19 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-06 12:06:19 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-06 12:11:19 --> [REQ_ID=61990e10ecfc] [REQUEST][START] HEAD /
DEBUG - 2026-03-06 12:11:19 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-06 12:11:19 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-06 12:11:19 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-06 12:11:19 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-06 12:11:19 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-06 12:11:45 --> [REQ_ID=708c5fbced66] [REQUEST][START] GET /
DEBUG - 2026-03-06 12:11:45 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-06 12:11:45 --> [REQ_ID=708c5fbced66] [FILTER_BEFORE] /
DEBUG - 2026-03-06 12:11:45 --> [REQ_ID=708c5fbced66] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-06 12:11:45 --> [REQ_ID=708c5fbced66] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-06 12:11:45 --> [CSRF] token name=csrf_test_name hash=ff10269d093be88f1f58a53ef794c6e7
DEBUG - 2026-03-06 12:11:45 --> [REQ_ID=7e380969f6d3] [INIT] App\Controllers\Home::GET
INFO - 2026-03-06 12:11:45 --> [REQ_ID=7e380969f6d3] [MEMORY][controller-start] 4194304
INFO - 2026-03-06 12:11:46 --> [REQ_ID=7e380969f6d3] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-06 12:11:46 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-06 12:11:46 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-03-06 12:11:46 --> [REQ_ID=7e380969f6d3] [VIEW_RENDER] themes/public/home
INFO - 2026-03-06 12:11:46 --> [REQ_ID=7e380969f6d3] [MEMORY][commonData:start] 8388608
INFO - 2026-03-06 12:11:46 --> themesMemory usage: 8388608
DEBUG - 2026-03-06 12:11:46 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-06 12:11:46 --> [REQ_ID=708c5fbced66] [FILTER_AFTER]
DEBUG - 2026-03-06 12:11:46 --> [REQ_ID=708c5fbced66] [LIFECYCLE][END] status=200 duration_ms=739.34 memory_delta=4194304
INFO - 2026-03-06 12:11:46 --> [REQ_ID=7e380969f6d3] [PERF] Execution time=0.737349
DEBUG - 2026-03-06 12:11:46 --> [REQ_ID=708c5fbced66] [REQUEST][END]
INFO - 2026-03-06 12:11:46 --> [REQ_ID=708c5fbced66] [PERF] Execution time=0.758186
INFO - 2026-03-06 12:15:01 --> [spark:ops:work] Started
INFO - 2026-03-06 12:15:01 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-03-06 12:15:01 --> [SPARK_MEMORY] 16777216
INFO - 2026-03-06 12:15:01 --> [spark:ops:work] Intent
INFO - 2026-03-06 12:15:01 --> [spark:ops:work] Completed
INFO - 2026-03-06 12:15:01 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.027164
INFO - 2026-03-06 12:15:01 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-03-06 12:15:01 --> [REQ_ID=149b2e0e75a1] [REQUEST][START] GET /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-06 12:15:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-06 12:15:01 --> [REQ_ID=149b2e0e75a1] [FILTER_BEFORE] /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-06 12:15:01 --> [REQ_ID=149b2e0e75a1] [ROUTE] Controller=\App\Modules\APIs\Controllers\AlertsAPIController Method=fetchEmailAlerts
DEBUG - 2026-03-06 12:15:01 --> [REQ_ID=149b2e0e75a1] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-06 12:15:01 --> [REQ_ID=149b2e0e75a1] [REQUEST][END]
INFO - 2026-03-06 12:15:01 --> [REQ_ID=149b2e0e75a1] [PERF] Execution time=0.043660
DEBUG - 2026-03-06 12:16:19 --> [REQ_ID=32731bc85398] [REQUEST][START] HEAD /
DEBUG - 2026-03-06 12:16:19 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-06 12:16:19 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-06 12:16:19 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-06 12:16:19 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-06 12:16:19 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-06 12:17:43 --> [REQ_ID=2e9e0bdee3c0] [REQUEST][START] GET /index.php/Wallets/Purchase/Memberships/Starter
DEBUG - 2026-03-06 12:17:43 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-06 12:17:43 --> [REQ_ID=2e9e0bdee3c0] [FILTER_BEFORE] /index.php/Wallets/Purchase/Memberships/Starter
DEBUG - 2026-03-06 12:17:43 --> [REQ_ID=2e9e0bdee3c0] [ROUTE] Controller=\App\Modules\User\Controllers\WalletsController Method=purchase
DEBUG - 2026-03-06 12:17:43 --> [REQ_ID=2e9e0bdee3c0] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Wallets/Purchase/Memberships/Starter
DEBUG - 2026-03-06 12:17:43 --> [CSRF] token name=csrf_test_name hash=f99ceb5e53c034f2f41ab09a8bd98347
DEBUG - 2026-03-06 12:17:43 --> [REQ_ID=2e9e0bdee3c0] [REQUEST][END]
INFO - 2026-03-06 12:17:43 --> [REQ_ID=2e9e0bdee3c0] [PERF] Execution time=0.032936
DEBUG - 2026-03-06 12:19:30 --> [REQ_ID=ca5ed4121302] [REQUEST][START] GET /index.php/My-Referrals
DEBUG - 2026-03-06 12:19:30 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-06 12:19:30 --> [REQ_ID=ca5ed4121302] [FILTER_BEFORE] /index.php/My-Referrals
DEBUG - 2026-03-06 12:19:30 --> [REQ_ID=ca5ed4121302] [ROUTE] Controller=\App\Modules\User\Controllers\ReferralController Method=index
DEBUG - 2026-03-06 12:19:30 --> [REQ_ID=ca5ed4121302] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/My-Referrals
DEBUG - 2026-03-06 12:19:30 --> [CSRF] token name=csrf_test_name hash=d9b5b5493aaf10da157ef24c907bbac5
DEBUG - 2026-03-06 12:19:30 --> [REQ_ID=ca5ed4121302] [REQUEST][END]
INFO - 2026-03-06 12:19:30 --> [REQ_ID=ca5ed4121302] [PERF] Execution time=0.062554
DEBUG - 2026-03-06 12:21:19 --> [REQ_ID=752b59aa72de] [REQUEST][START] HEAD /
DEBUG - 2026-03-06 12:21:19 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-06 12:21:19 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-06 12:21:19 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-06 12:21:19 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-06 12:21:19 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-06 12:26:19 --> [REQ_ID=9db8649b12a0] [REQUEST][START] HEAD /
DEBUG - 2026-03-06 12:26:19 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-06 12:26:19 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-06 12:26:19 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-06 12:26:19 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-06 12:26:19 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
INFO - 2026-03-06 12:30:01 --> [spark:ops:work] Started
INFO - 2026-03-06 12:30:01 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-03-06 12:30:01 --> [SPARK_MEMORY] 16777216
INFO - 2026-03-06 12:30:01 --> [spark:ops:work] Intent
INFO - 2026-03-06 12:30:01 --> [spark:ops:work] Completed
INFO - 2026-03-06 12:30:01 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.113627
INFO - 2026-03-06 12:30:01 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-03-06 12:31:19 --> [REQ_ID=41c2fbc3341e] [REQUEST][START] HEAD /
DEBUG - 2026-03-06 12:31:19 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-06 12:31:19 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-06 12:31:19 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-06 12:31:19 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-06 12:31:19 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-06 12:36:19 --> [REQ_ID=d3bab8ddec11] [REQUEST][START] HEAD /
DEBUG - 2026-03-06 12:36:19 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-06 12:36:19 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-06 12:36:19 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-06 12:36:19 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-06 12:36:19 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-06 12:41:19 --> [REQ_ID=9f1f35511e3a] [REQUEST][START] HEAD /
DEBUG - 2026-03-06 12:41:19 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-06 12:41:19 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-06 12:41:19 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-06 12:41:19 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-06 12:41:19 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
INFO - 2026-03-06 12:45:01 --> [spark:ops:work] Started
INFO - 2026-03-06 12:45:01 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-03-06 12:45:01 --> [SPARK_MEMORY] 16777216
INFO - 2026-03-06 12:45:01 --> [spark:ops:work] Intent
INFO - 2026-03-06 12:45:01 --> [spark:ops:work] Completed
INFO - 2026-03-06 12:45:01 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.094226
INFO - 2026-03-06 12:45:01 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-03-06 12:46:19 --> [REQ_ID=c11e8b690d89] [REQUEST][START] HEAD /
DEBUG - 2026-03-06 12:46:19 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-06 12:46:19 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-06 12:46:19 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-06 12:46:19 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-06 12:46:19 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-06 12:49:04 --> [REQ_ID=cdb2a22205e3] [REQUEST][START] GET /index.php
DEBUG - 2026-03-06 12:49:04 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-06 12:49:04 --> [REQ_ID=cdb2a22205e3] [FILTER_BEFORE] /index.php
DEBUG - 2026-03-06 12:49:04 --> [REQ_ID=cdb2a22205e3] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-06 12:49:04 --> [REQ_ID=cdb2a22205e3] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-06 12:49:04 --> [CSRF] token name=csrf_test_name hash=f79a9a735352713cc34a5a4c492411f7
DEBUG - 2026-03-06 12:49:04 --> [REQ_ID=1e23ab7d8012] [INIT] App\Controllers\Home::GET
INFO - 2026-03-06 12:49:04 --> [REQ_ID=1e23ab7d8012] [MEMORY][controller-start] 6291456
INFO - 2026-03-06 12:49:04 --> [REQ_ID=1e23ab7d8012] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-06 12:49:04 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-06 12:49:05 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-03-06 12:49:05 --> [REQ_ID=1e23ab7d8012] [VIEW_RENDER] themes/public/home
INFO - 2026-03-06 12:49:05 --> [REQ_ID=1e23ab7d8012] [MEMORY][commonData:start] 10485760
INFO - 2026-03-06 12:49:05 --> themesMemory usage: 10485760
DEBUG - 2026-03-06 12:49:05 --> [MetaService] slug= pageName=Home cacheHit= path=DB
DEBUG - 2026-03-06 12:49:05 --> [REQ_ID=cdb2a22205e3] [FILTER_AFTER]
DEBUG - 2026-03-06 12:49:05 --> [REQ_ID=cdb2a22205e3] [LIFECYCLE][END] status=200 duration_ms=695.92 memory_delta=4194304
INFO - 2026-03-06 12:49:05 --> [REQ_ID=1e23ab7d8012] [PERF] Execution time=0.693618
DEBUG - 2026-03-06 12:49:05 --> [REQ_ID=cdb2a22205e3] [REQUEST][END]
INFO - 2026-03-06 12:49:05 --> [REQ_ID=cdb2a22205e3] [PERF] Execution time=0.733948
DEBUG - 2026-03-06 12:51:19 --> [REQ_ID=94ad9d105796] [REQUEST][START] HEAD /
DEBUG - 2026-03-06 12:51:19 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-06 12:51:19 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-06 12:51:19 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-06 12:51:19 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-06 12:51:19 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-06 12:56:19 --> [REQ_ID=9250d40d8cd2] [REQUEST][START] HEAD /
DEBUG - 2026-03-06 12:56:19 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-06 12:56:19 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-06 12:56:19 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-06 12:56:19 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-06 12:56:19 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-06 12:57:55 --> [REQ_ID=773a8a421ffb] [REQUEST][START] GET /
DEBUG - 2026-03-06 12:57:55 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-06 12:57:55 --> [REQ_ID=773a8a421ffb] [FILTER_BEFORE] /
DEBUG - 2026-03-06 12:57:55 --> [REQ_ID=773a8a421ffb] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-06 12:57:55 --> [REQ_ID=773a8a421ffb] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-06 12:57:55 --> [CSRF] token name=csrf_test_name hash=21ceece7f6b91146a58c8a758f1bbaab
DEBUG - 2026-03-06 12:57:55 --> [REQ_ID=f314dff8c2af] [INIT] App\Controllers\Home::GET
INFO - 2026-03-06 12:57:55 --> [REQ_ID=f314dff8c2af] [MEMORY][controller-start] 6291456
INFO - 2026-03-06 12:57:55 --> [REQ_ID=f314dff8c2af] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-06 12:57:55 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-06 12:57:55 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
DEBUG - 2026-03-06 12:57:55 --> [REQ_ID=f314dff8c2af] [VIEW_RENDER] themes/public/home
INFO - 2026-03-06 12:57:55 --> [REQ_ID=f314dff8c2af] [MEMORY][commonData:start] 10485760
INFO - 2026-03-06 12:57:55 --> themesMemory usage: 10485760
DEBUG - 2026-03-06 12:57:55 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-06 12:57:55 --> [REQ_ID=773a8a421ffb] [FILTER_AFTER]
DEBUG - 2026-03-06 12:57:55 --> [REQ_ID=773a8a421ffb] [LIFECYCLE][END] status=200 duration_ms=559.62 memory_delta=4194304
INFO - 2026-03-06 12:57:55 --> [REQ_ID=f314dff8c2af] [PERF] Execution time=0.557648
DEBUG - 2026-03-06 12:57:55 --> [REQ_ID=773a8a421ffb] [REQUEST][END]
INFO - 2026-03-06 12:57:55 --> [REQ_ID=773a8a421ffb] [PERF] Execution time=0.598382
INFO - 2026-03-06 13:00:01 --> [spark:ops:work] Started
INFO - 2026-03-06 13:00:01 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-03-06 13:00:01 --> [SPARK_MEMORY] 16777216
INFO - 2026-03-06 13:00:01 --> [spark:ops:work] Intent
DEBUG - 2026-03-06 13:00:01 --> [REQ_ID=ecfb609de8e6] [REQUEST][START] GET /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-06 13:00:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-06 13:00:01 --> [REQ_ID=ecfb609de8e6] [FILTER_BEFORE] /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-06 13:00:01 --> [REQ_ID=ecfb609de8e6] [ROUTE] Controller=\App\Modules\Management\Controllers\ManagementAPIController Method=Run_CRON_Tasks
DEBUG - 2026-03-06 13:00:01 --> [REQ_ID=ecfb609de8e6] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-06 13:00:01 --> [REQ_ID=ecfb609de8e6] [REQUEST][END]
INFO - 2026-03-06 13:00:01 --> [REQ_ID=ecfb609de8e6] [PERF] Execution time=0.047640
INFO - 2026-03-06 13:00:01 --> [spark:ops:work] Completed
INFO - 2026-03-06 13:00:01 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.258274
INFO - 2026-03-06 13:00:01 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-03-06 13:01:19 --> [REQ_ID=47ad2fb1d736] [REQUEST][START] HEAD /
DEBUG - 2026-03-06 13:01:19 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-06 13:01:19 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-06 13:01:19 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-06 13:01:19 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-06 13:01:19 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-06 13:03:45 --> [REQ_ID=038f28b98baf] [REQUEST][START] HEAD /
DEBUG - 2026-03-06 13:03:45 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-06 13:03:45 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-06 13:03:45 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-06 13:03:45 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-06 13:03:45 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: https://www.google.com/
DEBUG - 2026-03-06 13:03:45 --> [REQ_ID=a8a0ac0c77a7] [REQUEST][START] HEAD /
DEBUG - 2026-03-06 13:03:45 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-06 13:03:45 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-06 13:03:45 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-06 13:03:45 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-06 13:03:45 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: https://www.google.com/
DEBUG - 2026-03-06 13:03:46 --> [REQ_ID=1480641ff717] [REQUEST][START] HEAD /
DEBUG - 2026-03-06 13:03:46 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-06 13:03:46 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-06 13:03:46 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-06 13:03:46 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-06 13:03:46 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: https://www.google.com/
DEBUG - 2026-03-06 13:06:19 --> [REQ_ID=025d69ab3af0] [REQUEST][START] HEAD /
DEBUG - 2026-03-06 13:06:19 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-06 13:06:19 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-06 13:06:19 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-06 13:06:19 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-06 13:06:19 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-06 13:11:19 --> [REQ_ID=9c5c5263ff2e] [REQUEST][START] HEAD /
DEBUG - 2026-03-06 13:11:19 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-06 13:11:19 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-06 13:11:19 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-06 13:11:19 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-06 13:11:19 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
INFO - 2026-03-06 13:15:01 --> [spark:ops:work] Started
INFO - 2026-03-06 13:15:01 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-03-06 13:15:01 --> [SPARK_MEMORY] 16777216
INFO - 2026-03-06 13:15:01 --> [spark:ops:work] Intent
INFO - 2026-03-06 13:15:01 --> [spark:ops:work] Completed
INFO - 2026-03-06 13:15:01 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.055908
INFO - 2026-03-06 13:15:01 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-03-06 13:15:01 --> [REQ_ID=93d45324dfd2] [REQUEST][START] GET /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-06 13:15:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-06 13:15:01 --> [REQ_ID=93d45324dfd2] [FILTER_BEFORE] /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-06 13:15:01 --> [REQ_ID=93d45324dfd2] [ROUTE] Controller=\App\Modules\APIs\Controllers\AlertsAPIController Method=fetchEmailAlerts
DEBUG - 2026-03-06 13:15:01 --> [REQ_ID=93d45324dfd2] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-06 13:15:01 --> [REQ_ID=93d45324dfd2] [REQUEST][END]
INFO - 2026-03-06 13:15:01 --> [REQ_ID=93d45324dfd2] [PERF] Execution time=0.042846
DEBUG - 2026-03-06 13:16:19 --> [REQ_ID=3839e2e1dc5b] [REQUEST][START] HEAD /
DEBUG - 2026-03-06 13:16:19 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-06 13:16:19 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-06 13:16:19 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-06 13:16:19 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-06 13:16:19 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-06 13:21:12 --> [REQ_ID=d3ad66b70f10] [REQUEST][START] GET /
DEBUG - 2026-03-06 13:21:12 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-06 13:21:12 --> [REQ_ID=d3ad66b70f10] [FILTER_BEFORE] /
DEBUG - 2026-03-06 13:21:12 --> [REQ_ID=d3ad66b70f10] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-06 13:21:12 --> [REQ_ID=d3ad66b70f10] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-06 13:21:12 --> [CSRF] token name=csrf_test_name hash=08c5783f96201f61abb434b5f06e7f06
DEBUG - 2026-03-06 13:21:12 --> [REQ_ID=7b093df75d2c] [INIT] App\Controllers\Home::GET
INFO - 2026-03-06 13:21:12 --> [REQ_ID=7b093df75d2c] [MEMORY][controller-start] 6291456
INFO - 2026-03-06 13:21:12 --> [REQ_ID=7b093df75d2c] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-06 13:21:12 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-06 13:21:13 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-03-06 13:21:13 --> [REQ_ID=7b093df75d2c] [VIEW_RENDER] themes/public/home
INFO - 2026-03-06 13:21:13 --> [REQ_ID=7b093df75d2c] [MEMORY][commonData:start] 10485760
INFO - 2026-03-06 13:21:13 --> themesMemory usage: 10485760
DEBUG - 2026-03-06 13:21:13 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-06 13:21:13 --> [REQ_ID=d3ad66b70f10] [FILTER_AFTER]
DEBUG - 2026-03-06 13:21:13 --> [REQ_ID=d3ad66b70f10] [LIFECYCLE][END] status=200 duration_ms=571.07 memory_delta=4194304
INFO - 2026-03-06 13:21:13 --> [REQ_ID=7b093df75d2c] [PERF] Execution time=0.568941
DEBUG - 2026-03-06 13:21:13 --> [REQ_ID=d3ad66b70f10] [REQUEST][END]
INFO - 2026-03-06 13:21:13 --> [REQ_ID=d3ad66b70f10] [PERF] Execution time=0.608762
DEBUG - 2026-03-06 13:21:19 --> [REQ_ID=e1ca1f5cb519] [REQUEST][START] HEAD /
DEBUG - 2026-03-06 13:21:19 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-06 13:21:19 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-06 13:21:19 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-06 13:21:19 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-06 13:21:19 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-06 13:26:19 --> [REQ_ID=2793dc98f321] [REQUEST][START] HEAD /
DEBUG - 2026-03-06 13:26:19 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-06 13:26:19 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-06 13:26:19 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-06 13:26:19 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-06 13:26:19 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
INFO - 2026-03-06 13:30:02 --> [spark:ops:work] Started
INFO - 2026-03-06 13:30:02 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-03-06 13:30:02 --> [SPARK_MEMORY] 16777216
INFO - 2026-03-06 13:30:02 --> [spark:ops:work] Intent
INFO - 2026-03-06 13:30:02 --> [spark:ops:work] Completed
INFO - 2026-03-06 13:30:02 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.182947
INFO - 2026-03-06 13:30:02 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-03-06 13:31:19 --> [REQ_ID=0f2f5160c0fb] [REQUEST][START] HEAD /
DEBUG - 2026-03-06 13:31:19 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-06 13:31:19 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-06 13:31:19 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-06 13:31:19 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-06 13:31:19 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-06 13:36:19 --> [REQ_ID=5ee4ab1ac8b3] [REQUEST][START] HEAD /
DEBUG - 2026-03-06 13:36:19 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-06 13:36:19 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-06 13:36:19 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-06 13:36:19 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-06 13:36:19 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
INFO - 2026-03-06 13:39:18 --> [SPARK_START] App\Commands\Spark\Reset
INFO - 2026-03-06 13:39:18 --> [SPARK_MEMORY] 16777216
INFO - 2026-03-06 13:39:18 --> [spark:spark-reset] Intent
INFO - 2026-03-06 13:39:18 --> [SPARK_COMPLETE] App\Commands\Spark\Reset duration=0.001815
INFO - 2026-03-06 13:39:18 --> [SPARK_MEMORY] 16777216
CRITICAL - 2026-03-06 13:39:45 --> ErrorException: Cannot declare class App\Modules\Ops\Controllers\OpsManagementController, because the name is already in use
[Method: CLI, Route: routes:repair]
in APPPATH/Modules/Ops/Controllers/OpsManagementController.php on line 14.
 1 [internal function]: CodeIgniter\Debug\Exceptions->shutdownHandler()
CRITICAL - 2026-03-06 13:39:45 --> [EXCEPTION] Cannot declare class App\Modules\Ops\Controllers\OpsManagementController, because the name is already in use File=/home/mymiteam/mymiwallet/site/current/app/Modules/Ops/Controllers/OpsManagementController.php Line=14
CRITICAL - 2026-03-06 13:40:22 --> ErrorException: Cannot declare class App\Modules\Ops\Controllers\OpsManagementController, because the name is already in use
[Method: CLI, Route: routes:repair]
in APPPATH/Modules/Ops/Controllers/OpsManagementController.php on line 14.
 1 [internal function]: CodeIgniter\Debug\Exceptions->shutdownHandler()
CRITICAL - 2026-03-06 13:40:22 --> [EXCEPTION] Cannot declare class App\Modules\Ops\Controllers\OpsManagementController, because the name is already in use File=/home/mymiteam/mymiwallet/site/current/app/Modules/Ops/Controllers/OpsManagementController.php Line=14
DEBUG - 2026-03-06 13:41:19 --> [REQ_ID=60e125120e83] [REQUEST][START] HEAD /
DEBUG - 2026-03-06 13:41:19 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-06 13:41:19 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-06 13:41:19 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-06 13:41:19 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-06 13:41:19 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-06 13:42:02 --> [REQ_ID=1cc4dc643043] [REQUEST][START] GET /
DEBUG - 2026-03-06 13:42:02 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-06 13:42:02 --> [REQ_ID=1cc4dc643043] [FILTER_BEFORE] /
DEBUG - 2026-03-06 13:42:02 --> [REQ_ID=1cc4dc643043] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-06 13:42:02 --> [REQ_ID=1cc4dc643043] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-06 13:42:02 --> [CSRF] token name=csrf_test_name hash=15505648d29eb123353d4766e85811f3
DEBUG - 2026-03-06 13:42:02 --> [REQ_ID=0ae67c533fa0] [INIT] App\Controllers\Home::GET
INFO - 2026-03-06 13:42:02 --> [REQ_ID=0ae67c533fa0] [MEMORY][controller-start] 4194304
INFO - 2026-03-06 13:42:02 --> [REQ_ID=0ae67c533fa0] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-06 13:42:02 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-06 13:42:03 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-03-06 13:42:03 --> [REQ_ID=0ae67c533fa0] [VIEW_RENDER] themes/public/home
INFO - 2026-03-06 13:42:03 --> [REQ_ID=0ae67c533fa0] [MEMORY][commonData:start] 8388608
INFO - 2026-03-06 13:42:03 --> themesMemory usage: 8388608
DEBUG - 2026-03-06 13:42:03 --> [MetaService] slug= pageName=Home cacheHit= path=DB
DEBUG - 2026-03-06 13:42:03 --> [REQ_ID=1cc4dc643043] [FILTER_AFTER]
DEBUG - 2026-03-06 13:42:03 --> [REQ_ID=1cc4dc643043] [LIFECYCLE][END] status=200 duration_ms=826.35 memory_delta=4194304
INFO - 2026-03-06 13:42:03 --> [REQ_ID=0ae67c533fa0] [PERF] Execution time=0.824452
DEBUG - 2026-03-06 13:42:03 --> [REQ_ID=1cc4dc643043] [REQUEST][END]
INFO - 2026-03-06 13:42:03 --> [REQ_ID=1cc4dc643043] [PERF] Execution time=0.845877
CRITICAL - 2026-03-06 13:42:20 --> ErrorException: Cannot declare class App\Modules\Ops\Controllers\OpsManagementController, because the name is already in use
[Method: CLI, Route: routes:repair]
in APPPATH/Modules/Ops/Controllers/OpsManagementController.php on line 14.
 1 [internal function]: CodeIgniter\Debug\Exceptions->shutdownHandler()
CRITICAL - 2026-03-06 13:42:20 --> [EXCEPTION] Cannot declare class App\Modules\Ops\Controllers\OpsManagementController, because the name is already in use File=/home/mymiteam/mymiwallet/site/current/app/Modules/Ops/Controllers/OpsManagementController.php Line=14
CRITICAL - 2026-03-06 13:42:28 --> ErrorException: Cannot declare class App\Modules\Ops\Controllers\OpsManagementController, because the name is already in use
[Method: CLI, Route: routes:repair]
in APPPATH/Modules/Ops/Controllers/OpsManagementController.php on line 14.
 1 [internal function]: CodeIgniter\Debug\Exceptions->shutdownHandler()
CRITICAL - 2026-03-06 13:42:28 --> [EXCEPTION] Cannot declare class App\Modules\Ops\Controllers\OpsManagementController, because the name is already in use File=/home/mymiteam/mymiwallet/site/current/app/Modules/Ops/Controllers/OpsManagementController.php Line=14
DEBUG - 2026-03-06 13:42:45 --> [REQ_ID=fd8e69948e9a] [REQUEST][START] GET /index.php
DEBUG - 2026-03-06 13:42:45 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-06 13:42:45 --> [REQ_ID=fd8e69948e9a] [FILTER_BEFORE] /index.php
DEBUG - 2026-03-06 13:42:45 --> [REQ_ID=fd8e69948e9a] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-06 13:42:45 --> [REQ_ID=fd8e69948e9a] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-06 13:42:45 --> [CSRF] token name=csrf_test_name hash=3fbad12e5aeb60e573e152e3887dc30c
DEBUG - 2026-03-06 13:42:45 --> [REQ_ID=cf5e1fc865b1] [INIT] App\Controllers\Home::GET
INFO - 2026-03-06 13:42:45 --> [REQ_ID=cf5e1fc865b1] [MEMORY][controller-start] 6291456
INFO - 2026-03-06 13:42:45 --> [REQ_ID=cf5e1fc865b1] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-06 13:42:45 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-06 13:42:46 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
DEBUG - 2026-03-06 13:42:46 --> [REQ_ID=cf5e1fc865b1] [VIEW_RENDER] themes/public/home
INFO - 2026-03-06 13:42:46 --> [REQ_ID=cf5e1fc865b1] [MEMORY][commonData:start] 8388608
INFO - 2026-03-06 13:42:46 --> themesMemory usage: 8388608
DEBUG - 2026-03-06 13:42:46 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-06 13:42:46 --> [REQ_ID=fd8e69948e9a] [FILTER_AFTER]
DEBUG - 2026-03-06 13:42:46 --> [REQ_ID=fd8e69948e9a] [LIFECYCLE][END] status=200 duration_ms=676.09 memory_delta=2097152
INFO - 2026-03-06 13:42:46 --> [REQ_ID=cf5e1fc865b1] [PERF] Execution time=0.675603
DEBUG - 2026-03-06 13:42:46 --> [REQ_ID=fd8e69948e9a] [REQUEST][END]
INFO - 2026-03-06 13:42:46 --> [REQ_ID=fd8e69948e9a] [PERF] Execution time=0.686317
DEBUG - 2026-03-06 13:42:51 --> [REQ_ID=437b492157a3] [REQUEST][START] GET /index.php
DEBUG - 2026-03-06 13:42:51 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-06 13:42:51 --> [REQ_ID=437b492157a3] [FILTER_BEFORE] /index.php
DEBUG - 2026-03-06 13:42:51 --> [REQ_ID=437b492157a3] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-06 13:42:51 --> [REQ_ID=437b492157a3] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-06 13:42:51 --> [CSRF] token name=csrf_test_name hash=0416a5689d0aa1a04e9843fcd793fd14
DEBUG - 2026-03-06 13:42:51 --> [REQ_ID=affb19072200] [INIT] App\Controllers\Home::GET
INFO - 2026-03-06 13:42:51 --> [REQ_ID=affb19072200] [MEMORY][controller-start] 6291456
INFO - 2026-03-06 13:42:51 --> [REQ_ID=affb19072200] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-06 13:42:51 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-06 13:42:51 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
DEBUG - 2026-03-06 13:42:51 --> [REQ_ID=affb19072200] [VIEW_RENDER] themes/public/home
INFO - 2026-03-06 13:42:51 --> [REQ_ID=affb19072200] [MEMORY][commonData:start] 8388608
INFO - 2026-03-06 13:42:51 --> themesMemory usage: 8388608
DEBUG - 2026-03-06 13:42:51 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-06 13:42:51 --> [REQ_ID=437b492157a3] [FILTER_AFTER]
DEBUG - 2026-03-06 13:42:51 --> [REQ_ID=437b492157a3] [LIFECYCLE][END] status=200 duration_ms=493.46 memory_delta=2097152
INFO - 2026-03-06 13:42:51 --> [REQ_ID=affb19072200] [PERF] Execution time=0.492288
DEBUG - 2026-03-06 13:42:51 --> [REQ_ID=437b492157a3] [REQUEST][END]
INFO - 2026-03-06 13:42:51 --> [REQ_ID=437b492157a3] [PERF] Execution time=0.506853
DEBUG - 2026-03-06 13:43:06 --> [REQ_ID=e232112c26df] [REQUEST][START] GET /index.php/How-It-Works
DEBUG - 2026-03-06 13:43:06 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-06 13:43:06 --> [REQ_ID=e232112c26df] [FILTER_BEFORE] /index.php/How-It-Works
DEBUG - 2026-03-06 13:43:06 --> [REQ_ID=e232112c26df] [ROUTE] Controller=\App\Modules\Blog\Controllers\HowItWorksController Method=index
DEBUG - 2026-03-06 13:43:06 --> [REQ_ID=e232112c26df] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/How-It-Works
DEBUG - 2026-03-06 13:43:06 --> [CSRF] token name=csrf_test_name hash=be05d4190252a51f77312febe87e875d
DEBUG - 2026-03-06 13:43:06 --> [REQ_ID=7deb6a4579d2] [INIT] App\Modules\Blog\Controllers\HowItWorksController::GET
INFO - 2026-03-06 13:43:06 --> [REQ_ID=7deb6a4579d2] [MEMORY][controller-start] 6291456
DEBUG - 2026-03-06 13:43:06 --> [REQ_ID=7deb6a4579d2] [METHOD_ENTRY] index
DEBUG - 2026-03-06 13:43:06 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-06 13:43:06 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-06 13:43:06 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-06 13:43:06 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-06 13:43:06 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-06 13:43:06 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-06 13:43:06 --> [REQ_ID=7deb6a4579d2] [VIEW_RENDER] App\Modules\Blog\Views\HowItWorks\index
INFO - 2026-03-06 13:43:06 --> [REQ_ID=7deb6a4579d2] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-06 13:43:06 --> [MetaService] slug=how-it-works pageName= cacheHit= path=DB
INFO - 2026-03-06 13:43:06 --> themesMemory usage: 8388608
DEBUG - 2026-03-06 13:43:06 --> [MetaService] slug=how-it-works pageName= cacheHit=1 path=CACHE
DEBUG - 2026-03-06 13:43:06 --> [REQ_ID=e232112c26df] [FILTER_AFTER]
DEBUG - 2026-03-06 13:43:06 --> [REQ_ID=e232112c26df] [LIFECYCLE][END] status=200 duration_ms=565.63 memory_delta=2097152
INFO - 2026-03-06 13:43:06 --> [REQ_ID=7deb6a4579d2] [PERF] Execution time=0.565044
DEBUG - 2026-03-06 13:43:06 --> [REQ_ID=e232112c26df] [REQUEST][END]
INFO - 2026-03-06 13:43:06 --> [REQ_ID=e232112c26df] [PERF] Execution time=0.579819
DEBUG - 2026-03-06 13:43:10 --> [REQ_ID=c25bd0f95ea3] [REQUEST][START] GET /index.php/Blog
DEBUG - 2026-03-06 13:43:10 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-06 13:43:10 --> [REQ_ID=c25bd0f95ea3] [FILTER_BEFORE] /index.php/Blog
DEBUG - 2026-03-06 13:43:10 --> [REQ_ID=c25bd0f95ea3] [ROUTE] Controller=\App\Modules\Blog\Controllers\BlogController Method=index
DEBUG - 2026-03-06 13:43:10 --> [REQ_ID=c25bd0f95ea3] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Blog
DEBUG - 2026-03-06 13:43:10 --> [CSRF] token name=csrf_test_name hash=658f5da0447af68f3a02632beea1c469
DEBUG - 2026-03-06 13:43:10 --> [REQ_ID=da1628d96641] [INIT] App\Modules\Blog\Controllers\BlogController::GET
INFO - 2026-03-06 13:43:10 --> [REQ_ID=da1628d96641] [MEMORY][controller-start] 6291456
DEBUG - 2026-03-06 13:43:10 --> [REQ_ID=da1628d96641] [METHOD_ENTRY] index
DEBUG - 2026-03-06 13:43:10 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-06 13:43:10 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-06 13:43:10 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-06 13:43:10 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-06 13:43:10 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-06 13:43:10 --> MyMICoin: guest context detected; skipping user-specific preload.
INFO - 2026-03-06 13:43:10 --> [REQ_ID=da1628d96641] [MEMORY][commonData:start] 6291456
INFO - 2026-03-06 13:43:10 --> [REQ_ID=da1628d96641] [PERF] Execution time=0.023158
DEBUG - 2026-03-06 13:43:14 --> [REQ_ID=c31c1855c253] [REQUEST][START] GET /index.php/Blog
DEBUG - 2026-03-06 13:43:14 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-06 13:43:14 --> [REQ_ID=c31c1855c253] [FILTER_BEFORE] /index.php/Blog
DEBUG - 2026-03-06 13:43:14 --> [REQ_ID=c31c1855c253] [ROUTE] Controller=\App\Modules\Blog\Controllers\BlogController Method=index
DEBUG - 2026-03-06 13:43:14 --> [REQ_ID=c31c1855c253] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Blog
DEBUG - 2026-03-06 13:43:14 --> [CSRF] token name=csrf_test_name hash=03c1bccd809afbd0358e411c9fbdb286
DEBUG - 2026-03-06 13:43:14 --> [REQ_ID=9e00ffc5a953] [INIT] App\Modules\Blog\Controllers\BlogController::GET
INFO - 2026-03-06 13:43:14 --> [REQ_ID=9e00ffc5a953] [MEMORY][controller-start] 6291456
DEBUG - 2026-03-06 13:43:14 --> [REQ_ID=9e00ffc5a953] [METHOD_ENTRY] index
DEBUG - 2026-03-06 13:43:14 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-06 13:43:14 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-06 13:43:14 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-06 13:43:14 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-06 13:43:14 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-06 13:43:14 --> MyMICoin: guest context detected; skipping user-specific preload.
INFO - 2026-03-06 13:43:14 --> [REQ_ID=9e00ffc5a953] [MEMORY][commonData:start] 6291456
INFO - 2026-03-06 13:43:14 --> [REQ_ID=9e00ffc5a953] [PERF] Execution time=0.015022
DEBUG - 2026-03-06 13:43:24 --> [REQ_ID=6cd1510d463c] [REQUEST][START] GET /index.php/Blog
DEBUG - 2026-03-06 13:43:24 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-06 13:43:24 --> [REQ_ID=6cd1510d463c] [FILTER_BEFORE] /index.php/Blog
DEBUG - 2026-03-06 13:43:24 --> [REQ_ID=6cd1510d463c] [ROUTE] Controller=\App\Modules\Blog\Controllers\BlogController Method=index
DEBUG - 2026-03-06 13:43:24 --> [REQ_ID=6cd1510d463c] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Blog
DEBUG - 2026-03-06 13:43:24 --> [CSRF] token name=csrf_test_name hash=77c6a8f10bf18d79e4916e74c132350c
DEBUG - 2026-03-06 13:43:24 --> [REQ_ID=7ed93f31ba8f] [INIT] App\Modules\Blog\Controllers\BlogController::GET
INFO - 2026-03-06 13:43:24 --> [REQ_ID=7ed93f31ba8f] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-06 13:43:24 --> [REQ_ID=7ed93f31ba8f] [METHOD_ENTRY] index
DEBUG - 2026-03-06 13:43:24 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-06 13:43:24 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-06 13:43:24 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-06 13:43:24 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-06 13:43:24 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-06 13:43:24 --> MyMICoin: guest context detected; skipping user-specific preload.
INFO - 2026-03-06 13:43:24 --> [REQ_ID=7ed93f31ba8f] [MEMORY][commonData:start] 4194304
INFO - 2026-03-06 13:43:24 --> [REQ_ID=7ed93f31ba8f] [PERF] Execution time=0.041360
DEBUG - 2026-03-06 13:43:29 --> [REQ_ID=219aa095ada3] [REQUEST][START] GET /index.php/Knowledgebase
DEBUG - 2026-03-06 13:43:29 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-06 13:43:29 --> [REQ_ID=219aa095ada3] [FILTER_BEFORE] /index.php/Knowledgebase
DEBUG - 2026-03-06 13:43:29 --> [REQ_ID=219aa095ada3] [ROUTE] Controller=\App\Modules\User\Controllers\KnowledgebaseController Method=index
DEBUG - 2026-03-06 13:43:29 --> [REQ_ID=219aa095ada3] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Knowledgebase
DEBUG - 2026-03-06 13:43:29 --> [CSRF] token name=csrf_test_name hash=a81342597189f77cf63808462675a5e1
DEBUG - 2026-03-06 13:43:29 --> [REQ_ID=219aa095ada3] [REQUEST][END]
INFO - 2026-03-06 13:43:29 --> [REQ_ID=219aa095ada3] [PERF] Execution time=0.012103
DEBUG - 2026-03-06 13:43:30 --> [REQ_ID=12abc639b596] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-06 13:43:30 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-06 13:43:30 --> [REQ_ID=12abc639b596] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-06 13:43:30 --> [REQ_ID=12abc639b596] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-06 13:43:30 --> [REQ_ID=12abc639b596] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-06 13:43:30 --> [CSRF] token name=csrf_test_name hash=b772479b0a6214d85d4ebf0f3615eeea
DEBUG - 2026-03-06 13:43:30 --> [REQ_ID=2d9207d56215] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-06 13:43:30 --> [REQ_ID=2d9207d56215] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-06 13:43:30 --> [REQ_ID=12abc639b596] [FILTER_AFTER]
DEBUG - 2026-03-06 13:43:30 --> [REQ_ID=12abc639b596] [LIFECYCLE][END] status=200 duration_ms=28.47 memory_delta=0
INFO - 2026-03-06 13:43:30 --> [REQ_ID=2d9207d56215] [PERF] Execution time=0.027782
DEBUG - 2026-03-06 13:43:30 --> [REQ_ID=12abc639b596] [REQUEST][END]
INFO - 2026-03-06 13:43:30 --> [REQ_ID=12abc639b596] [PERF] Execution time=0.039771
DEBUG - 2026-03-06 13:43:34 --> [REQ_ID=0ff2c0a8aeac] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-06 13:43:34 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-06 13:43:34 --> [REQ_ID=0ff2c0a8aeac] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-06 13:43:34 --> [REQ_ID=0ff2c0a8aeac] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-06 13:43:34 --> [REQ_ID=0ff2c0a8aeac] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-06 13:43:34 --> [CSRF] token name=csrf_test_name hash=a4ffbf5fde5cff3363790496d40ae9c6
DEBUG - 2026-03-06 13:43:34 --> [REQ_ID=b537a972bd55] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-06 13:43:34 --> [REQ_ID=b537a972bd55] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-06 13:43:34 --> [REQ_ID=0ff2c0a8aeac] [FILTER_AFTER]
DEBUG - 2026-03-06 13:43:34 --> [REQ_ID=0ff2c0a8aeac] [LIFECYCLE][END] status=200 duration_ms=15.86 memory_delta=0
INFO - 2026-03-06 13:43:34 --> [REQ_ID=b537a972bd55] [PERF] Execution time=0.015424
DEBUG - 2026-03-06 13:43:34 --> [REQ_ID=0ff2c0a8aeac] [REQUEST][END]
INFO - 2026-03-06 13:43:34 --> [REQ_ID=0ff2c0a8aeac] [PERF] Execution time=0.026443
DEBUG - 2026-03-06 13:43:38 --> [REQ_ID=f4afa7ce6e1c] [REQUEST][START] GET /index.php/Free/register
DEBUG - 2026-03-06 13:43:38 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-06 13:43:38 --> [REQ_ID=f4afa7ce6e1c] [FILTER_BEFORE] /index.php/Free/register
DEBUG - 2026-03-06 13:43:38 --> [REQ_ID=f4afa7ce6e1c] [ROUTE] Controller=\App\Controllers\AuthController Method=register
DEBUG - 2026-03-06 13:43:38 --> [REQ_ID=f4afa7ce6e1c] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Free/register
DEBUG - 2026-03-06 13:43:38 --> [CSRF] token name=csrf_test_name hash=e80e66a524194b8b7aa0b000219bc9ea
DEBUG - 2026-03-06 13:43:38 --> [REQ_ID=f4afa7ce6e1c] [REQUEST][END]
INFO - 2026-03-06 13:43:38 --> [REQ_ID=f4afa7ce6e1c] [PERF] Execution time=0.010038
DEBUG - 2026-03-06 13:43:39 --> [REQ_ID=06d03463b55d] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-06 13:43:39 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-06 13:43:39 --> [REQ_ID=06d03463b55d] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-06 13:43:39 --> [REQ_ID=06d03463b55d] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-06 13:43:39 --> [REQ_ID=06d03463b55d] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-06 13:43:39 --> [CSRF] token name=csrf_test_name hash=45da215ff334388917cb3112c04e5fd1
DEBUG - 2026-03-06 13:43:39 --> [REQ_ID=0e8b928c1d2c] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-06 13:43:39 --> [REQ_ID=0e8b928c1d2c] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-06 13:43:39 --> [REQ_ID=06d03463b55d] [FILTER_AFTER]
DEBUG - 2026-03-06 13:43:39 --> [REQ_ID=06d03463b55d] [LIFECYCLE][END] status=200 duration_ms=83.67 memory_delta=0
INFO - 2026-03-06 13:43:39 --> [REQ_ID=0e8b928c1d2c] [PERF] Execution time=0.061977
DEBUG - 2026-03-06 13:43:39 --> [REQ_ID=06d03463b55d] [REQUEST][END]
INFO - 2026-03-06 13:43:39 --> [REQ_ID=06d03463b55d] [PERF] Execution time=0.186410
DEBUG - 2026-03-06 13:44:34 --> [REQ_ID=8fd453b59020] [REQUEST][START] GET /index.php/Legal/Terms-And-Conditions
DEBUG - 2026-03-06 13:44:34 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-06 13:44:34 --> [REQ_ID=8fd453b59020] [FILTER_BEFORE] /index.php/Legal/Terms-And-Conditions
DEBUG - 2026-03-06 13:44:34 --> [REQ_ID=8fd453b59020] [ROUTE] Controller=\App\Controllers\Home Method=terms
DEBUG - 2026-03-06 13:44:34 --> [REQ_ID=8fd453b59020] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Legal/Terms-And-Conditions
DEBUG - 2026-03-06 13:44:34 --> [CSRF] token name=csrf_test_name hash=76ea27a11c6b284b49b8e1ef2c290da8
DEBUG - 2026-03-06 13:44:34 --> [REQ_ID=8fd453b59020] [REQUEST][END]
INFO - 2026-03-06 13:44:34 --> [REQ_ID=8fd453b59020] [PERF] Execution time=0.010551
DEBUG - 2026-03-06 13:44:35 --> [REQ_ID=52969cc31eda] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-06 13:44:35 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-06 13:44:35 --> [REQ_ID=52969cc31eda] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-06 13:44:35 --> [REQ_ID=52969cc31eda] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-06 13:44:35 --> [REQ_ID=52969cc31eda] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-06 13:44:35 --> [CSRF] token name=csrf_test_name hash=c55d45c7f6d2f62c708c50af48a35370
DEBUG - 2026-03-06 13:44:35 --> [REQ_ID=46e1b9c87f5e] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-06 13:44:35 --> [REQ_ID=46e1b9c87f5e] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-06 13:44:35 --> [REQ_ID=52969cc31eda] [FILTER_AFTER]
DEBUG - 2026-03-06 13:44:35 --> [REQ_ID=52969cc31eda] [LIFECYCLE][END] status=200 duration_ms=102.53 memory_delta=0
INFO - 2026-03-06 13:44:35 --> [REQ_ID=46e1b9c87f5e] [PERF] Execution time=0.098445
DEBUG - 2026-03-06 13:44:35 --> [REQ_ID=52969cc31eda] [REQUEST][END]
INFO - 2026-03-06 13:44:35 --> [REQ_ID=52969cc31eda] [PERF] Execution time=0.142575
DEBUG - 2026-03-06 13:44:40 --> [REQ_ID=32872ed2912e] [REQUEST][START] GET /index.php/Legal/Privacy-Policy
DEBUG - 2026-03-06 13:44:40 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-06 13:44:40 --> [REQ_ID=32872ed2912e] [FILTER_BEFORE] /index.php/Legal/Privacy-Policy
DEBUG - 2026-03-06 13:44:40 --> [REQ_ID=32872ed2912e] [ROUTE] Controller=\App\Controllers\Home Method=privacyPolicy
DEBUG - 2026-03-06 13:44:40 --> [REQ_ID=32872ed2912e] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Legal/Privacy-Policy
DEBUG - 2026-03-06 13:44:40 --> [CSRF] token name=csrf_test_name hash=841d69b1d97ddc776ec76d227767a933
DEBUG - 2026-03-06 13:44:40 --> [REQ_ID=32872ed2912e] [REQUEST][END]
INFO - 2026-03-06 13:44:40 --> [REQ_ID=32872ed2912e] [PERF] Execution time=0.011541
DEBUG - 2026-03-06 13:44:41 --> [REQ_ID=abeeb51038a4] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-06 13:44:41 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-06 13:44:41 --> [REQ_ID=abeeb51038a4] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-06 13:44:41 --> [REQ_ID=abeeb51038a4] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-06 13:44:41 --> [REQ_ID=abeeb51038a4] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-06 13:44:41 --> [CSRF] token name=csrf_test_name hash=0ffc11502b01e2dc66b729fb9fb5ef79
DEBUG - 2026-03-06 13:44:41 --> [REQ_ID=657fd2200dc3] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-06 13:44:41 --> [REQ_ID=657fd2200dc3] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-06 13:44:41 --> [REQ_ID=abeeb51038a4] [FILTER_AFTER]
DEBUG - 2026-03-06 13:44:41 --> [REQ_ID=abeeb51038a4] [LIFECYCLE][END] status=200 duration_ms=114.45 memory_delta=0
INFO - 2026-03-06 13:44:41 --> [REQ_ID=657fd2200dc3] [PERF] Execution time=0.027145
DEBUG - 2026-03-06 13:44:41 --> [REQ_ID=abeeb51038a4] [REQUEST][END]
INFO - 2026-03-06 13:44:41 --> [REQ_ID=abeeb51038a4] [PERF] Execution time=0.125952
DEBUG - 2026-03-06 13:44:48 --> [REQ_ID=d145da3807b4] [REQUEST][START] GET /index.php/How-It-Works/Personal-Budgeting
DEBUG - 2026-03-06 13:44:48 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-06 13:44:48 --> [REQ_ID=d145da3807b4] [FILTER_BEFORE] /index.php/How-It-Works/Personal-Budgeting
DEBUG - 2026-03-06 13:44:48 --> [REQ_ID=d145da3807b4] [ROUTE] Controller=\App\Modules\Blog\Controllers\HowItWorksController Method=show
DEBUG - 2026-03-06 13:44:48 --> [REQ_ID=d145da3807b4] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/How-It-Works/Personal-Budgeting
DEBUG - 2026-03-06 13:44:48 --> [CSRF] token name=csrf_test_name hash=061a3da6c9b8a916b946cc1fb1ddd97a
DEBUG - 2026-03-06 13:44:48 --> [REQ_ID=62bb99b3f333] [INIT] App\Modules\Blog\Controllers\HowItWorksController::GET
INFO - 2026-03-06 13:44:48 --> [REQ_ID=62bb99b3f333] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-06 13:44:48 --> [REQ_ID=62bb99b3f333] [METHOD_ENTRY] show
DEBUG - 2026-03-06 13:44:48 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-06 13:44:48 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-06 13:44:48 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-06 13:44:48 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-06 13:44:48 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-06 13:44:48 --> MyMICoin: guest context detected; skipping user-specific preload.
INFO - 2026-03-06 13:44:48 --> [REQ_ID=62bb99b3f333] [MEMORY][commonData:start] 4194304
DEBUG - 2026-03-06 13:44:49 --> [REQ_ID=62bb99b3f333] [VIEW_RENDER] App\Modules\Blog\Views\HowItWorks\Personal_Budgeting
INFO - 2026-03-06 13:44:49 --> [REQ_ID=62bb99b3f333] [MEMORY][commonData:start] 8388608
INFO - 2026-03-06 13:44:49 --> themesMemory usage: 10485760
DEBUG - 2026-03-06 13:44:49 --> [REQ_ID=d145da3807b4] [FILTER_AFTER]
DEBUG - 2026-03-06 13:44:49 --> [REQ_ID=d145da3807b4] [LIFECYCLE][END] status=200 duration_ms=1,176.23 memory_delta=6291456
INFO - 2026-03-06 13:44:49 --> [REQ_ID=62bb99b3f333] [PERF] Execution time=1.175734
DEBUG - 2026-03-06 13:44:49 --> [REQ_ID=d145da3807b4] [REQUEST][END]
INFO - 2026-03-06 13:44:49 --> [REQ_ID=d145da3807b4] [PERF] Execution time=1.186651
INFO - 2026-03-06 13:45:02 --> [spark:ops:work] Started
INFO - 2026-03-06 13:45:02 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-03-06 13:45:02 --> [SPARK_MEMORY] 16777216
INFO - 2026-03-06 13:45:02 --> [spark:ops:work] Intent
INFO - 2026-03-06 13:45:02 --> [spark:ops:work] Completed
INFO - 2026-03-06 13:45:02 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.022071
INFO - 2026-03-06 13:45:02 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-03-06 13:45:14 --> [REQ_ID=2c2701728f98] [REQUEST][START] GET /index.php/How-It-Works/Investment-Portfolio-Management
DEBUG - 2026-03-06 13:45:14 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-06 13:45:14 --> [REQ_ID=2c2701728f98] [FILTER_BEFORE] /index.php/How-It-Works/Investment-Portfolio-Management
DEBUG - 2026-03-06 13:45:14 --> [REQ_ID=2c2701728f98] [ROUTE] Controller=\App\Modules\Blog\Controllers\HowItWorksController Method=show
DEBUG - 2026-03-06 13:45:14 --> [REQ_ID=2c2701728f98] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/How-It-Works/Investment-Portfolio-Management
DEBUG - 2026-03-06 13:45:14 --> [CSRF] token name=csrf_test_name hash=b978ea5f21092c3c4c77b8846dcc31b3
DEBUG - 2026-03-06 13:45:14 --> [REQ_ID=152a84d49fd8] [INIT] App\Modules\Blog\Controllers\HowItWorksController::GET
INFO - 2026-03-06 13:45:14 --> [REQ_ID=152a84d49fd8] [MEMORY][controller-start] 8388608
DEBUG - 2026-03-06 13:45:14 --> [REQ_ID=152a84d49fd8] [METHOD_ENTRY] show
DEBUG - 2026-03-06 13:45:14 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-06 13:45:14 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-06 13:45:14 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-06 13:45:14 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-06 13:45:14 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-06 13:45:14 --> MyMICoin: guest context detected; skipping user-specific preload.
ERROR - 2026-03-06 13:45:14 --> [ERROR_PAGE] event=error_404 status=404 message=Page not found.
DEBUG - 2026-03-06 13:45:14 --> [REQ_ID=2c2701728f98] [FILTER_AFTER]
DEBUG - 2026-03-06 13:45:14 --> [REQ_ID=2c2701728f98] [LIFECYCLE][END] status=404 duration_ms=84.73 memory_delta=0
INFO - 2026-03-06 13:45:14 --> [REQ_ID=152a84d49fd8] [PERF] Execution time=0.084258
DEBUG - 2026-03-06 13:45:14 --> [REQ_ID=2c2701728f98] [REQUEST][END]
INFO - 2026-03-06 13:45:14 --> [REQ_ID=2c2701728f98] [PERF] Execution time=0.095318
DEBUG - 2026-03-06 13:45:23 --> [REQ_ID=a853e6199809] [REQUEST][START] GET /index.php/How-It-Works/Investment-Portfolio-Management
DEBUG - 2026-03-06 13:45:23 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-06 13:45:23 --> [REQ_ID=a853e6199809] [FILTER_BEFORE] /index.php/How-It-Works/Investment-Portfolio-Management
DEBUG - 2026-03-06 13:45:23 --> [REQ_ID=a853e6199809] [ROUTE] Controller=\App\Modules\Blog\Controllers\HowItWorksController Method=show
DEBUG - 2026-03-06 13:45:23 --> [REQ_ID=a853e6199809] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/How-It-Works/Investment-Portfolio-Management
DEBUG - 2026-03-06 13:45:23 --> [CSRF] token name=csrf_test_name hash=91c2b2b949bd57b9c0f935dcf22379b6
DEBUG - 2026-03-06 13:45:23 --> [REQ_ID=1e79e3640ce1] [INIT] App\Modules\Blog\Controllers\HowItWorksController::GET
INFO - 2026-03-06 13:45:23 --> [REQ_ID=1e79e3640ce1] [MEMORY][controller-start] 6291456
DEBUG - 2026-03-06 13:45:23 --> [REQ_ID=1e79e3640ce1] [METHOD_ENTRY] show
DEBUG - 2026-03-06 13:45:23 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-06 13:45:23 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-06 13:45:23 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-06 13:45:23 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-06 13:45:23 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-06 13:45:23 --> MyMICoin: guest context detected; skipping user-specific preload.
ERROR - 2026-03-06 13:45:23 --> [ERROR_PAGE] event=error_404 status=404 message=Page not found.
DEBUG - 2026-03-06 13:45:23 --> [REQ_ID=a853e6199809] [FILTER_AFTER]
DEBUG - 2026-03-06 13:45:23 --> [REQ_ID=a853e6199809] [LIFECYCLE][END] status=404 duration_ms=35.92 memory_delta=0
INFO - 2026-03-06 13:45:23 --> [REQ_ID=1e79e3640ce1] [PERF] Execution time=0.035479
DEBUG - 2026-03-06 13:45:23 --> [REQ_ID=a853e6199809] [REQUEST][END]
INFO - 2026-03-06 13:45:23 --> [REQ_ID=a853e6199809] [PERF] Execution time=0.046466
DEBUG - 2026-03-06 13:45:26 --> [REQ_ID=97c05764c870] [REQUEST][START] GET /index.php/How-It-Works/Investment-Portfolio-Management
DEBUG - 2026-03-06 13:45:26 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-06 13:45:26 --> [REQ_ID=97c05764c870] [FILTER_BEFORE] /index.php/How-It-Works/Investment-Portfolio-Management
DEBUG - 2026-03-06 13:45:26 --> [REQ_ID=97c05764c870] [ROUTE] Controller=\App\Modules\Blog\Controllers\HowItWorksController Method=show
DEBUG - 2026-03-06 13:45:26 --> [REQ_ID=97c05764c870] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/How-It-Works/Investment-Portfolio-Management
DEBUG - 2026-03-06 13:45:26 --> [CSRF] token name=csrf_test_name hash=5f1b632c9b916542f0f9018e3be939ee
DEBUG - 2026-03-06 13:45:26 --> [REQ_ID=efab2fe039e9] [INIT] App\Modules\Blog\Controllers\HowItWorksController::GET
INFO - 2026-03-06 13:45:26 --> [REQ_ID=efab2fe039e9] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-06 13:45:26 --> [REQ_ID=efab2fe039e9] [METHOD_ENTRY] show
DEBUG - 2026-03-06 13:45:26 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-06 13:45:26 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-06 13:45:26 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-06 13:45:26 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-06 13:45:26 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-06 13:45:26 --> MyMICoin: guest context detected; skipping user-specific preload.
ERROR - 2026-03-06 13:45:26 --> [ERROR_PAGE] event=error_404 status=404 message=Page not found.
DEBUG - 2026-03-06 13:45:26 --> [REQ_ID=97c05764c870] [FILTER_AFTER]
DEBUG - 2026-03-06 13:45:26 --> [REQ_ID=97c05764c870] [LIFECYCLE][END] status=404 duration_ms=20.77 memory_delta=0
INFO - 2026-03-06 13:45:26 --> [REQ_ID=efab2fe039e9] [PERF] Execution time=0.020102
DEBUG - 2026-03-06 13:45:26 --> [REQ_ID=97c05764c870] [REQUEST][END]
INFO - 2026-03-06 13:45:26 --> [REQ_ID=97c05764c870] [PERF] Execution time=0.030614
DEBUG - 2026-03-06 13:45:30 --> [REQ_ID=268e4980e437] [REQUEST][START] GET /index.php/How-It-Works/Daily-Financial-News
DEBUG - 2026-03-06 13:45:30 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-06 13:45:30 --> [REQ_ID=268e4980e437] [FILTER_BEFORE] /index.php/How-It-Works/Daily-Financial-News
DEBUG - 2026-03-06 13:45:30 --> [REQ_ID=268e4980e437] [ROUTE] Controller=\App\Modules\Blog\Controllers\HowItWorksController Method=show
DEBUG - 2026-03-06 13:45:30 --> [REQ_ID=268e4980e437] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/How-It-Works/Daily-Financial-News
DEBUG - 2026-03-06 13:45:30 --> [CSRF] token name=csrf_test_name hash=e88dac1ac6ca180583a71c0c5c25bd12
DEBUG - 2026-03-06 13:45:30 --> [REQ_ID=1bdfb75f9f3d] [INIT] App\Modules\Blog\Controllers\HowItWorksController::GET
INFO - 2026-03-06 13:45:30 --> [REQ_ID=1bdfb75f9f3d] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-06 13:45:30 --> [REQ_ID=1bdfb75f9f3d] [METHOD_ENTRY] show
DEBUG - 2026-03-06 13:45:30 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-06 13:45:30 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-06 13:45:30 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-06 13:45:30 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-06 13:45:30 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-06 13:45:30 --> MyMICoin: guest context detected; skipping user-specific preload.
ERROR - 2026-03-06 13:45:30 --> [ERROR_PAGE] event=error_404 status=404 message=Page not found.
DEBUG - 2026-03-06 13:45:30 --> [REQ_ID=268e4980e437] [FILTER_AFTER]
DEBUG - 2026-03-06 13:45:30 --> [REQ_ID=268e4980e437] [LIFECYCLE][END] status=404 duration_ms=34.93 memory_delta=0
INFO - 2026-03-06 13:45:30 --> [REQ_ID=1bdfb75f9f3d] [PERF] Execution time=0.034463
DEBUG - 2026-03-06 13:45:30 --> [REQ_ID=268e4980e437] [REQUEST][END]
INFO - 2026-03-06 13:45:30 --> [REQ_ID=268e4980e437] [PERF] Execution time=0.045363
DEBUG - 2026-03-06 13:45:38 --> [REQ_ID=8515878d3dae] [REQUEST][START] GET /index.php/How-It-Works/Daily-Financial-News
DEBUG - 2026-03-06 13:45:38 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-06 13:45:38 --> [REQ_ID=8515878d3dae] [FILTER_BEFORE] /index.php/How-It-Works/Daily-Financial-News
DEBUG - 2026-03-06 13:45:38 --> [REQ_ID=8515878d3dae] [ROUTE] Controller=\App\Modules\Blog\Controllers\HowItWorksController Method=show
DEBUG - 2026-03-06 13:45:38 --> [REQ_ID=8515878d3dae] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/How-It-Works/Daily-Financial-News
DEBUG - 2026-03-06 13:45:38 --> [CSRF] token name=csrf_test_name hash=197e8ea4bc8b1a8df6d0179a22b3fdad
DEBUG - 2026-03-06 13:45:38 --> [REQ_ID=d258e94fcbc0] [INIT] App\Modules\Blog\Controllers\HowItWorksController::GET
INFO - 2026-03-06 13:45:38 --> [REQ_ID=d258e94fcbc0] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-06 13:45:38 --> [REQ_ID=d258e94fcbc0] [METHOD_ENTRY] show
DEBUG - 2026-03-06 13:45:38 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-06 13:45:38 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-06 13:45:38 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-06 13:45:38 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-06 13:45:38 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-06 13:45:38 --> MyMICoin: guest context detected; skipping user-specific preload.
ERROR - 2026-03-06 13:45:38 --> [ERROR_PAGE] event=error_404 status=404 message=Page not found.
DEBUG - 2026-03-06 13:45:39 --> [REQ_ID=8515878d3dae] [FILTER_AFTER]
DEBUG - 2026-03-06 13:45:39 --> [REQ_ID=8515878d3dae] [LIFECYCLE][END] status=404 duration_ms=26.29 memory_delta=0
INFO - 2026-03-06 13:45:39 --> [REQ_ID=d258e94fcbc0] [PERF] Execution time=0.025939
DEBUG - 2026-03-06 13:45:39 --> [REQ_ID=8515878d3dae] [REQUEST][END]
INFO - 2026-03-06 13:45:39 --> [REQ_ID=8515878d3dae] [PERF] Execution time=0.036000
DEBUG - 2026-03-06 13:45:43 --> [REQ_ID=e5c1e442312b] [REQUEST][START] GET /index.php/How-It-Works/Daily-Financial-News
DEBUG - 2026-03-06 13:45:43 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-06 13:45:43 --> [REQ_ID=e5c1e442312b] [FILTER_BEFORE] /index.php/How-It-Works/Daily-Financial-News
DEBUG - 2026-03-06 13:45:43 --> [REQ_ID=e5c1e442312b] [ROUTE] Controller=\App\Modules\Blog\Controllers\HowItWorksController Method=show
DEBUG - 2026-03-06 13:45:43 --> [REQ_ID=e5c1e442312b] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/How-It-Works/Daily-Financial-News
DEBUG - 2026-03-06 13:45:43 --> [CSRF] token name=csrf_test_name hash=519add6babce45ca6a25424fa14ba855
DEBUG - 2026-03-06 13:45:43 --> [REQ_ID=ba283d6b28e8] [INIT] App\Modules\Blog\Controllers\HowItWorksController::GET
INFO - 2026-03-06 13:45:43 --> [REQ_ID=ba283d6b28e8] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-06 13:45:43 --> [REQ_ID=ba283d6b28e8] [METHOD_ENTRY] show
DEBUG - 2026-03-06 13:45:43 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-06 13:45:43 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-06 13:45:43 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-06 13:45:43 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-06 13:45:43 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-06 13:45:43 --> MyMICoin: guest context detected; skipping user-specific preload.
ERROR - 2026-03-06 13:45:43 --> [ERROR_PAGE] event=error_404 status=404 message=Page not found.
DEBUG - 2026-03-06 13:45:43 --> [REQ_ID=e5c1e442312b] [FILTER_AFTER]
DEBUG - 2026-03-06 13:45:43 --> [REQ_ID=e5c1e442312b] [LIFECYCLE][END] status=404 duration_ms=16.86 memory_delta=0
INFO - 2026-03-06 13:45:43 --> [REQ_ID=ba283d6b28e8] [PERF] Execution time=0.016257
DEBUG - 2026-03-06 13:45:43 --> [REQ_ID=e5c1e442312b] [REQUEST][END]
INFO - 2026-03-06 13:45:43 --> [REQ_ID=e5c1e442312b] [PERF] Execution time=0.026214
DEBUG - 2026-03-06 13:46:04 --> [REQ_ID=73f9cc3fad91] [REQUEST][START] GET /index.php
DEBUG - 2026-03-06 13:46:04 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-06 13:46:04 --> [REQ_ID=73f9cc3fad91] [FILTER_BEFORE] /index.php
DEBUG - 2026-03-06 13:46:04 --> [REQ_ID=73f9cc3fad91] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-06 13:46:04 --> [REQ_ID=73f9cc3fad91] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-06 13:46:04 --> [CSRF] token name=csrf_test_name hash=bef409afa8d336ee088f27dbd35436dd
DEBUG - 2026-03-06 13:46:04 --> [REQ_ID=6f217ed561c5] [INIT] App\Controllers\Home::GET
INFO - 2026-03-06 13:46:04 --> [REQ_ID=6f217ed561c5] [MEMORY][controller-start] 4194304
INFO - 2026-03-06 13:46:04 --> [REQ_ID=6f217ed561c5] [MEMORY][commonData:start] 4194304
DEBUG - 2026-03-06 13:46:04 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-06 13:46:05 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
DEBUG - 2026-03-06 13:46:05 --> [REQ_ID=6f217ed561c5] [VIEW_RENDER] themes/public/home
INFO - 2026-03-06 13:46:05 --> [REQ_ID=6f217ed561c5] [MEMORY][commonData:start] 8388608
INFO - 2026-03-06 13:46:05 --> themesMemory usage: 8388608
DEBUG - 2026-03-06 13:46:05 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-06 13:46:05 --> [REQ_ID=73f9cc3fad91] [FILTER_AFTER]
DEBUG - 2026-03-06 13:46:05 --> [REQ_ID=73f9cc3fad91] [LIFECYCLE][END] status=200 duration_ms=732.08 memory_delta=4194304
INFO - 2026-03-06 13:46:05 --> [REQ_ID=6f217ed561c5] [PERF] Execution time=0.731764
DEBUG - 2026-03-06 13:46:05 --> [REQ_ID=73f9cc3fad91] [REQUEST][END]
INFO - 2026-03-06 13:46:05 --> [REQ_ID=73f9cc3fad91] [PERF] Execution time=0.741228
DEBUG - 2026-03-06 13:46:10 --> [REQ_ID=2e6c81b03d99] [REQUEST][START] GET /index.php
DEBUG - 2026-03-06 13:46:10 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-06 13:46:10 --> [REQ_ID=2e6c81b03d99] [FILTER_BEFORE] /index.php
DEBUG - 2026-03-06 13:46:10 --> [REQ_ID=2e6c81b03d99] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-06 13:46:10 --> [REQ_ID=2e6c81b03d99] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-06 13:46:10 --> [CSRF] token name=csrf_test_name hash=5bed046ab5c92c4e09e04d480825fcc1
DEBUG - 2026-03-06 13:46:10 --> [REQ_ID=8c2c58ca1857] [INIT] App\Controllers\Home::GET
INFO - 2026-03-06 13:46:10 --> [REQ_ID=8c2c58ca1857] [MEMORY][controller-start] 6291456
INFO - 2026-03-06 13:46:10 --> [REQ_ID=8c2c58ca1857] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-06 13:46:10 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-06 13:46:10 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
DEBUG - 2026-03-06 13:46:10 --> [REQ_ID=8c2c58ca1857] [VIEW_RENDER] themes/public/home
INFO - 2026-03-06 13:46:10 --> [REQ_ID=8c2c58ca1857] [MEMORY][commonData:start] 8388608
INFO - 2026-03-06 13:46:10 --> themesMemory usage: 8388608
DEBUG - 2026-03-06 13:46:10 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-06 13:46:10 --> [REQ_ID=2e6c81b03d99] [FILTER_AFTER]
DEBUG - 2026-03-06 13:46:10 --> [REQ_ID=2e6c81b03d99] [LIFECYCLE][END] status=200 duration_ms=560.96 memory_delta=2097152
INFO - 2026-03-06 13:46:10 --> [REQ_ID=8c2c58ca1857] [PERF] Execution time=0.560409
DEBUG - 2026-03-06 13:46:10 --> [REQ_ID=2e6c81b03d99] [REQUEST][END]
INFO - 2026-03-06 13:46:10 --> [REQ_ID=2e6c81b03d99] [PERF] Execution time=0.571700
DEBUG - 2026-03-06 13:46:19 --> [REQ_ID=274a3922d062] [REQUEST][START] HEAD /
DEBUG - 2026-03-06 13:46:19 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-06 13:46:19 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-06 13:46:19 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-06 13:46:19 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-06 13:46:19 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-06 13:46:47 --> [REQ_ID=f37d582c3e72] [REQUEST][START] GET /index.php/Blog
DEBUG - 2026-03-06 13:46:47 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-06 13:46:47 --> [REQ_ID=f37d582c3e72] [FILTER_BEFORE] /index.php/Blog
DEBUG - 2026-03-06 13:46:47 --> [REQ_ID=f37d582c3e72] [ROUTE] Controller=\App\Modules\Blog\Controllers\BlogController Method=index
DEBUG - 2026-03-06 13:46:47 --> [REQ_ID=f37d582c3e72] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Blog
DEBUG - 2026-03-06 13:46:47 --> [CSRF] token name=csrf_test_name hash=2132ab88046107d1ee740e5242ec749b
DEBUG - 2026-03-06 13:46:47 --> [REQ_ID=746b440929c5] [INIT] App\Modules\Blog\Controllers\BlogController::GET
INFO - 2026-03-06 13:46:47 --> [REQ_ID=746b440929c5] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-06 13:46:47 --> [REQ_ID=746b440929c5] [METHOD_ENTRY] index
DEBUG - 2026-03-06 13:46:47 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-06 13:46:47 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-06 13:46:47 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-06 13:46:47 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-06 13:46:47 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-06 13:46:47 --> MyMICoin: guest context detected; skipping user-specific preload.
INFO - 2026-03-06 13:46:47 --> [REQ_ID=746b440929c5] [MEMORY][commonData:start] 4194304
INFO - 2026-03-06 13:46:47 --> [REQ_ID=746b440929c5] [PERF] Execution time=0.162932
DEBUG - 2026-03-06 13:46:51 --> [REQ_ID=634a5cc2af4e] [REQUEST][START] GET /index.php/Blog
DEBUG - 2026-03-06 13:46:51 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-06 13:46:51 --> [REQ_ID=634a5cc2af4e] [FILTER_BEFORE] /index.php/Blog
DEBUG - 2026-03-06 13:46:51 --> [REQ_ID=634a5cc2af4e] [ROUTE] Controller=\App\Modules\Blog\Controllers\BlogController Method=index
DEBUG - 2026-03-06 13:46:51 --> [REQ_ID=634a5cc2af4e] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Blog
DEBUG - 2026-03-06 13:46:51 --> [CSRF] token name=csrf_test_name hash=d405b337fe23fe1cec2be2260f10dace
DEBUG - 2026-03-06 13:46:51 --> [REQ_ID=6c0fd85f1d15] [INIT] App\Modules\Blog\Controllers\BlogController::GET
INFO - 2026-03-06 13:46:51 --> [REQ_ID=6c0fd85f1d15] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-06 13:46:51 --> [REQ_ID=6c0fd85f1d15] [METHOD_ENTRY] index
DEBUG - 2026-03-06 13:46:51 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-06 13:46:51 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-06 13:46:51 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-06 13:46:51 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-06 13:46:51 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-06 13:46:51 --> MyMICoin: guest context detected; skipping user-specific preload.
INFO - 2026-03-06 13:46:51 --> [REQ_ID=6c0fd85f1d15] [MEMORY][commonData:start] 4194304
INFO - 2026-03-06 13:46:51 --> [REQ_ID=6c0fd85f1d15] [PERF] Execution time=0.017643
DEBUG - 2026-03-06 13:46:54 --> [REQ_ID=a5d54475bfd5] [REQUEST][START] GET /index.php/Blog
DEBUG - 2026-03-06 13:46:54 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-06 13:46:54 --> [REQ_ID=a5d54475bfd5] [FILTER_BEFORE] /index.php/Blog
DEBUG - 2026-03-06 13:46:54 --> [REQ_ID=a5d54475bfd5] [ROUTE] Controller=\App\Modules\Blog\Controllers\BlogController Method=index
DEBUG - 2026-03-06 13:46:54 --> [REQ_ID=a5d54475bfd5] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Blog
DEBUG - 2026-03-06 13:46:54 --> [CSRF] token name=csrf_test_name hash=85afcd73f801ca0420e9e7fd137a39e9
DEBUG - 2026-03-06 13:46:54 --> [REQ_ID=efa0a1013d22] [INIT] App\Modules\Blog\Controllers\BlogController::GET
INFO - 2026-03-06 13:46:54 --> [REQ_ID=efa0a1013d22] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-06 13:46:54 --> [REQ_ID=efa0a1013d22] [METHOD_ENTRY] index
DEBUG - 2026-03-06 13:46:54 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-06 13:46:54 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-06 13:46:54 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-06 13:46:54 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-06 13:46:54 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-06 13:46:54 --> MyMICoin: guest context detected; skipping user-specific preload.
INFO - 2026-03-06 13:46:54 --> [REQ_ID=efa0a1013d22] [MEMORY][commonData:start] 4194304
INFO - 2026-03-06 13:46:54 --> [REQ_ID=efa0a1013d22] [PERF] Execution time=0.016829
DEBUG - 2026-03-06 13:47:04 --> [REQ_ID=b0543824ab84] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-06 13:47:04 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-06 13:47:04 --> [REQ_ID=b0543824ab84] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-06 13:47:04 --> [REQ_ID=b0543824ab84] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-06 13:47:04 --> [REQ_ID=b0543824ab84] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-06 13:47:04 --> [CSRF] token name=csrf_test_name hash=530e517542780fe74fb9c4d92410f031
DEBUG - 2026-03-06 13:47:04 --> [REQ_ID=cbaa34b5480b] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-06 13:47:04 --> [REQ_ID=cbaa34b5480b] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-06 13:47:04 --> [REQ_ID=b0543824ab84] [FILTER_AFTER]
DEBUG - 2026-03-06 13:47:04 --> [REQ_ID=b0543824ab84] [LIFECYCLE][END] status=200 duration_ms=143.38 memory_delta=0
INFO - 2026-03-06 13:47:04 --> [REQ_ID=cbaa34b5480b] [PERF] Execution time=0.143199
DEBUG - 2026-03-06 13:47:04 --> [REQ_ID=b0543824ab84] [REQUEST][END]
INFO - 2026-03-06 13:47:04 --> [REQ_ID=b0543824ab84] [PERF] Execution time=0.152778
DEBUG - 2026-03-06 13:47:22 --> [REQ_ID=cf4a3397ba95] [REQUEST][START] GET /index.php/How-It-Works/Personal-Budgeting
DEBUG - 2026-03-06 13:47:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-06 13:47:22 --> [REQ_ID=cf4a3397ba95] [FILTER_BEFORE] /index.php/How-It-Works/Personal-Budgeting
DEBUG - 2026-03-06 13:47:22 --> [REQ_ID=cf4a3397ba95] [ROUTE] Controller=\App\Modules\Blog\Controllers\HowItWorksController Method=show
DEBUG - 2026-03-06 13:47:22 --> [REQ_ID=cf4a3397ba95] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/How-It-Works/Personal-Budgeting
DEBUG - 2026-03-06 13:47:22 --> [CSRF] token name=csrf_test_name hash=93fd6c6e6f5384973e25fa2b22fb2c15
DEBUG - 2026-03-06 13:47:22 --> [REQ_ID=cfbc5e7e3b19] [INIT] App\Modules\Blog\Controllers\HowItWorksController::GET
INFO - 2026-03-06 13:47:22 --> [REQ_ID=cfbc5e7e3b19] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-06 13:47:22 --> [REQ_ID=cfbc5e7e3b19] [METHOD_ENTRY] show
DEBUG - 2026-03-06 13:47:22 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-06 13:47:22 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-06 13:47:22 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-06 13:47:22 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-06 13:47:22 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-06 13:47:22 --> MyMICoin: guest context detected; skipping user-specific preload.
INFO - 2026-03-06 13:47:22 --> [REQ_ID=cfbc5e7e3b19] [MEMORY][commonData:start] 4194304
DEBUG - 2026-03-06 13:47:23 --> [REQ_ID=cfbc5e7e3b19] [VIEW_RENDER] App\Modules\Blog\Views\HowItWorks\Personal_Budgeting
INFO - 2026-03-06 13:47:23 --> [REQ_ID=cfbc5e7e3b19] [MEMORY][commonData:start] 8388608
INFO - 2026-03-06 13:47:23 --> themesMemory usage: 10485760
DEBUG - 2026-03-06 13:47:23 --> [REQ_ID=cf4a3397ba95] [FILTER_AFTER]
DEBUG - 2026-03-06 13:47:23 --> [REQ_ID=cf4a3397ba95] [LIFECYCLE][END] status=200 duration_ms=1,048.98 memory_delta=8388608
INFO - 2026-03-06 13:47:23 --> [REQ_ID=cfbc5e7e3b19] [PERF] Execution time=1.048693
DEBUG - 2026-03-06 13:47:23 --> [REQ_ID=cf4a3397ba95] [REQUEST][END]
INFO - 2026-03-06 13:47:23 --> [REQ_ID=cf4a3397ba95] [PERF] Execution time=1.058846
DEBUG - 2026-03-06 13:47:27 --> [REQ_ID=87e4ba811933] [REQUEST][START] GET /index.php/How-It-Works/Investment-Portfolio-Management
DEBUG - 2026-03-06 13:47:27 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-06 13:47:27 --> [REQ_ID=87e4ba811933] [FILTER_BEFORE] /index.php/How-It-Works/Investment-Portfolio-Management
DEBUG - 2026-03-06 13:47:27 --> [REQ_ID=87e4ba811933] [ROUTE] Controller=\App\Modules\Blog\Controllers\HowItWorksController Method=show
DEBUG - 2026-03-06 13:47:27 --> [REQ_ID=87e4ba811933] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/How-It-Works/Investment-Portfolio-Management
DEBUG - 2026-03-06 13:47:27 --> [CSRF] token name=csrf_test_name hash=b32c97bc08ccbefd57b69ae7799c0af1
DEBUG - 2026-03-06 13:47:27 --> [REQ_ID=d729914597ad] [INIT] App\Modules\Blog\Controllers\HowItWorksController::GET
INFO - 2026-03-06 13:47:27 --> [REQ_ID=d729914597ad] [MEMORY][controller-start] 8388608
DEBUG - 2026-03-06 13:47:27 --> [REQ_ID=d729914597ad] [METHOD_ENTRY] show
DEBUG - 2026-03-06 13:47:27 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-06 13:47:27 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-06 13:47:27 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-06 13:47:27 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-06 13:47:27 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-06 13:47:27 --> MyMICoin: guest context detected; skipping user-specific preload.
ERROR - 2026-03-06 13:47:27 --> [ERROR_PAGE] event=error_404 status=404 message=Page not found.
DEBUG - 2026-03-06 13:47:27 --> [REQ_ID=87e4ba811933] [FILTER_AFTER]
DEBUG - 2026-03-06 13:47:27 --> [REQ_ID=87e4ba811933] [LIFECYCLE][END] status=404 duration_ms=19.67 memory_delta=0
INFO - 2026-03-06 13:47:27 --> [REQ_ID=d729914597ad] [PERF] Execution time=0.019467
DEBUG - 2026-03-06 13:47:27 --> [REQ_ID=87e4ba811933] [REQUEST][END]
INFO - 2026-03-06 13:47:27 --> [REQ_ID=87e4ba811933] [PERF] Execution time=0.029348
DEBUG - 2026-03-06 13:47:35 --> [REQ_ID=870feb6ccbf1] [REQUEST][START] GET /index.php/How-It-Works/Investment-Portfolio-Management
DEBUG - 2026-03-06 13:47:35 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-06 13:47:35 --> [REQ_ID=870feb6ccbf1] [FILTER_BEFORE] /index.php/How-It-Works/Investment-Portfolio-Management
DEBUG - 2026-03-06 13:47:35 --> [REQ_ID=870feb6ccbf1] [ROUTE] Controller=\App\Modules\Blog\Controllers\HowItWorksController Method=show
DEBUG - 2026-03-06 13:47:35 --> [REQ_ID=870feb6ccbf1] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/How-It-Works/Investment-Portfolio-Management
DEBUG - 2026-03-06 13:47:35 --> [CSRF] token name=csrf_test_name hash=1b2d751bcd7a8a8ecef97ecc3a610828
DEBUG - 2026-03-06 13:47:35 --> [REQ_ID=1d864195a217] [INIT] App\Modules\Blog\Controllers\HowItWorksController::GET
INFO - 2026-03-06 13:47:35 --> [REQ_ID=1d864195a217] [MEMORY][controller-start] 6291456
DEBUG - 2026-03-06 13:47:35 --> [REQ_ID=1d864195a217] [METHOD_ENTRY] show
DEBUG - 2026-03-06 13:47:35 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-06 13:47:35 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-06 13:47:35 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-06 13:47:35 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-06 13:47:35 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-06 13:47:35 --> MyMICoin: guest context detected; skipping user-specific preload.
ERROR - 2026-03-06 13:47:35 --> [ERROR_PAGE] event=error_404 status=404 message=Page not found.
DEBUG - 2026-03-06 13:47:35 --> [REQ_ID=870feb6ccbf1] [FILTER_AFTER]
DEBUG - 2026-03-06 13:47:35 --> [REQ_ID=870feb6ccbf1] [LIFECYCLE][END] status=404 duration_ms=42.96 memory_delta=0
INFO - 2026-03-06 13:47:35 --> [REQ_ID=1d864195a217] [PERF] Execution time=0.041564
DEBUG - 2026-03-06 13:47:35 --> [REQ_ID=870feb6ccbf1] [REQUEST][END]
INFO - 2026-03-06 13:47:35 --> [REQ_ID=870feb6ccbf1] [PERF] Execution time=0.064571
DEBUG - 2026-03-06 13:48:06 --> [REQ_ID=b0d95d2ccca9] [REQUEST][START] GET /index.php/How-It-Works/Daily-Financial-News
DEBUG - 2026-03-06 13:48:06 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-06 13:48:06 --> [REQ_ID=b0d95d2ccca9] [FILTER_BEFORE] /index.php/How-It-Works/Daily-Financial-News
DEBUG - 2026-03-06 13:48:06 --> [REQ_ID=b0d95d2ccca9] [ROUTE] Controller=\App\Modules\Blog\Controllers\HowItWorksController Method=show
DEBUG - 2026-03-06 13:48:06 --> [REQ_ID=b0d95d2ccca9] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/How-It-Works/Daily-Financial-News
DEBUG - 2026-03-06 13:48:06 --> [CSRF] token name=csrf_test_name hash=83deb2ce223ad99984fe9aff7d231d7e
DEBUG - 2026-03-06 13:48:06 --> [REQ_ID=d3b5558a5f25] [INIT] App\Modules\Blog\Controllers\HowItWorksController::GET
INFO - 2026-03-06 13:48:06 --> [REQ_ID=d3b5558a5f25] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-06 13:48:06 --> [REQ_ID=d3b5558a5f25] [METHOD_ENTRY] show
DEBUG - 2026-03-06 13:48:06 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-06 13:48:06 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-06 13:48:06 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-06 13:48:06 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-06 13:48:06 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-06 13:48:06 --> MyMICoin: guest context detected; skipping user-specific preload.
ERROR - 2026-03-06 13:48:06 --> [ERROR_PAGE] event=error_404 status=404 message=Page not found.
DEBUG - 2026-03-06 13:48:06 --> [REQ_ID=b0d95d2ccca9] [FILTER_AFTER]
DEBUG - 2026-03-06 13:48:06 --> [REQ_ID=b0d95d2ccca9] [LIFECYCLE][END] status=404 duration_ms=177.49 memory_delta=0
INFO - 2026-03-06 13:48:06 --> [REQ_ID=d3b5558a5f25] [PERF] Execution time=0.177246
DEBUG - 2026-03-06 13:48:06 --> [REQ_ID=b0d95d2ccca9] [REQUEST][END]
INFO - 2026-03-06 13:48:06 --> [REQ_ID=b0d95d2ccca9] [PERF] Execution time=0.188500
DEBUG - 2026-03-06 13:48:10 --> [REQ_ID=d396416a1929] [REQUEST][START] GET /index.php/How-It-Works/Daily-Financial-News
DEBUG - 2026-03-06 13:48:10 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-06 13:48:10 --> [REQ_ID=d396416a1929] [FILTER_BEFORE] /index.php/How-It-Works/Daily-Financial-News
DEBUG - 2026-03-06 13:48:10 --> [REQ_ID=d396416a1929] [ROUTE] Controller=\App\Modules\Blog\Controllers\HowItWorksController Method=show
DEBUG - 2026-03-06 13:48:10 --> [REQ_ID=d396416a1929] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/How-It-Works/Daily-Financial-News
DEBUG - 2026-03-06 13:48:10 --> [CSRF] token name=csrf_test_name hash=613426befb160d3bbaaad6f9bc029da6
DEBUG - 2026-03-06 13:48:10 --> [REQ_ID=b20438088892] [INIT] App\Modules\Blog\Controllers\HowItWorksController::GET
INFO - 2026-03-06 13:48:10 --> [REQ_ID=b20438088892] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-06 13:48:10 --> [REQ_ID=b20438088892] [METHOD_ENTRY] show
DEBUG - 2026-03-06 13:48:10 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-06 13:48:10 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-06 13:48:10 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-06 13:48:10 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-06 13:48:10 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-06 13:48:10 --> MyMICoin: guest context detected; skipping user-specific preload.
ERROR - 2026-03-06 13:48:10 --> [ERROR_PAGE] event=error_404 status=404 message=Page not found.
DEBUG - 2026-03-06 13:48:10 --> [REQ_ID=d396416a1929] [FILTER_AFTER]
DEBUG - 2026-03-06 13:48:10 --> [REQ_ID=d396416a1929] [LIFECYCLE][END] status=404 duration_ms=18.58 memory_delta=0
INFO - 2026-03-06 13:48:10 --> [REQ_ID=b20438088892] [PERF] Execution time=0.018211
DEBUG - 2026-03-06 13:48:10 --> [REQ_ID=d396416a1929] [REQUEST][END]
INFO - 2026-03-06 13:48:10 --> [REQ_ID=d396416a1929] [PERF] Execution time=0.028814
CRITICAL - 2026-03-06 13:48:48 --> ErrorException: Cannot declare class App\Modules\Ops\Controllers\OpsManagementController, because the name is already in use
[Method: CLI, Route: routes:repair]
in APPPATH/Modules/Ops/Controllers/OpsManagementController.php on line 14.
 1 [internal function]: CodeIgniter\Debug\Exceptions->shutdownHandler()
CRITICAL - 2026-03-06 13:48:48 --> [EXCEPTION] Cannot declare class App\Modules\Ops\Controllers\OpsManagementController, because the name is already in use File=/home/mymiteam/mymiwallet/site/current/app/Modules/Ops/Controllers/OpsManagementController.php Line=14
DEBUG - 2026-03-06 13:51:19 --> [REQ_ID=4336d762d9f3] [REQUEST][START] HEAD /
DEBUG - 2026-03-06 13:51:19 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-06 13:51:19 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-06 13:51:19 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-06 13:51:19 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-06 13:51:19 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-06 13:56:19 --> [REQ_ID=75d641d66d54] [REQUEST][START] HEAD /
DEBUG - 2026-03-06 13:56:19 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-06 13:56:19 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-06 13:56:19 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-06 13:56:19 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-06 13:56:19 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
INFO - 2026-03-06 14:00:01 --> [spark:ops:work] Started
INFO - 2026-03-06 14:00:01 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-03-06 14:00:01 --> [SPARK_MEMORY] 16777216
INFO - 2026-03-06 14:00:01 --> [spark:ops:work] Intent
DEBUG - 2026-03-06 14:00:01 --> [REQ_ID=0e186af224ba] [REQUEST][START] GET /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-06 14:00:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
INFO - 2026-03-06 14:00:01 --> [spark:ops:work] Completed
INFO - 2026-03-06 14:00:01 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.065294
INFO - 2026-03-06 14:00:01 --> [SPARK_MEMORY] 18874368
INFO - 2026-03-06 14:00:01 --> [SPARK_START] App\Commands\AIOps\Run
INFO - 2026-03-06 14:00:01 --> [SPARK_MEMORY] 16777216
INFO - 2026-03-06 14:00:01 --> [spark:aiops:run] Intent
DEBUG - 2026-03-06 14:00:01 --> [REQ_ID=0e186af224ba] [FILTER_BEFORE] /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-06 14:00:01 --> [REQ_ID=0e186af224ba] [ROUTE] Controller=\App\Modules\Management\Controllers\ManagementAPIController Method=Run_CRON_Tasks
DEBUG - 2026-03-06 14:00:01 --> [REQ_ID=0e186af224ba] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-06 14:00:01 --> [REQ_ID=0e186af224ba] [REQUEST][END]
INFO - 2026-03-06 14:00:01 --> [REQ_ID=0e186af224ba] [PERF] Execution time=0.095040
INFO - 2026-03-06 14:00:02 --> [AIOPS][SPARK][GOVERNANCE][spark:logs:summarize] Started
INFO - 2026-03-06 14:00:02 --> [SPARK_START] App\Commands\Logs\Summarize
INFO - 2026-03-06 14:00:02 --> [SPARK_MEMORY] 16777216
INFO - 2026-03-06 14:00:02 --> [spark:logs:summarize] Intent
INFO - 2026-03-06 14:00:02 --> [AIOPS][SPARK][GOVERNANCE][spark:logs:summarize] Completed
INFO - 2026-03-06 14:00:02 --> [SPARK_COMPLETE] App\Commands\Logs\Summarize duration=0.018242
INFO - 2026-03-06 14:00:02 --> [SPARK_MEMORY] 18874368
INFO - 2026-03-06 14:00:03 --> [spark:app:healthcheck] Started
INFO - 2026-03-06 14:00:03 --> [SPARK_START] App\Commands\App\Healthcheck
INFO - 2026-03-06 14:00:03 --> [SPARK_MEMORY] 16777216
INFO - 2026-03-06 14:00:03 --> [spark:app:healthcheck] Intent
DEBUG - 2026-03-06 14:00:03 --> LOG_HEALTHCHECK debug marker=698df69df836
INFO - 2026-03-06 14:00:03 --> LOG_HEALTHCHECK info marker=698df69df836
NOTICE - 2026-03-06 14:00:03 --> LOG_HEALTHCHECK probe marker=698df69df836
INFO - 2026-03-06 14:00:03 --> [spark:app:healthcheck] Completed
INFO - 2026-03-06 14:00:03 --> [SPARK_COMPLETE] App\Commands\App\Healthcheck duration=0.039875
INFO - 2026-03-06 14:00:03 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-03-06 14:00:04 --> OllamaPatchRunner:L142 - validateGeneratedPatch Content: 
WARNING - 2026-03-06 14:00:04 --> OllamaPatchRunner:L49 - Original Diff: 
DEBUG - 2026-03-06 14:00:05 --> OllamaPatchRunner:L51 - Retried Diff: 
DEBUG - 2026-03-06 14:00:05 --> OllamaPatchRunner:L142 - validateGeneratedPatch Content: 
DEBUG - 2026-03-06 14:00:05 --> OllamaPatchRunner:L53 - Validating Generated Patch Failed
INFO - 2026-03-06 14:00:05 --> [SPARK_COMPLETE] App\Commands\AIOps\Run duration=3.612697
INFO - 2026-03-06 14:00:05 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-03-06 14:01:19 --> [REQ_ID=ba39ff86d055] [REQUEST][START] HEAD /
DEBUG - 2026-03-06 14:01:19 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-06 14:01:19 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-06 14:01:19 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-06 14:01:19 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-06 14:01:19 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-06 14:06:19 --> [REQ_ID=618085ccd2cd] [REQUEST][START] HEAD /
DEBUG - 2026-03-06 14:06:19 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-06 14:06:19 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-06 14:06:19 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-06 14:06:19 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-06 14:06:19 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-06 14:08:15 --> [REQ_ID=c252b7fc1c04] [REQUEST][START] GET /
DEBUG - 2026-03-06 14:08:15 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-06 14:08:15 --> [REQ_ID=c252b7fc1c04] [FILTER_BEFORE] /
DEBUG - 2026-03-06 14:08:15 --> [REQ_ID=c252b7fc1c04] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-06 14:08:15 --> [REQ_ID=c252b7fc1c04] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-06 14:08:15 --> [CSRF] token name=csrf_test_name hash=ff31e15dc1c1a4b522856c6003f99c0d
DEBUG - 2026-03-06 14:08:15 --> [REQ_ID=ebe69b3f4728] [INIT] App\Controllers\Home::GET
INFO - 2026-03-06 14:08:15 --> [REQ_ID=ebe69b3f4728] [MEMORY][controller-start] 6291456
INFO - 2026-03-06 14:08:15 --> [REQ_ID=ebe69b3f4728] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-06 14:08:15 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-06 14:08:16 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-03-06 14:08:16 --> [REQ_ID=ebe69b3f4728] [VIEW_RENDER] themes/public/home
INFO - 2026-03-06 14:08:16 --> [REQ_ID=ebe69b3f4728] [MEMORY][commonData:start] 10485760
INFO - 2026-03-06 14:08:16 --> themesMemory usage: 10485760
DEBUG - 2026-03-06 14:08:16 --> [MetaService] slug= pageName=Home cacheHit= path=DB
DEBUG - 2026-03-06 14:08:16 --> [REQ_ID=c252b7fc1c04] [FILTER_AFTER]
DEBUG - 2026-03-06 14:08:16 --> [REQ_ID=c252b7fc1c04] [LIFECYCLE][END] status=200 duration_ms=738.37 memory_delta=4194304
INFO - 2026-03-06 14:08:16 --> [REQ_ID=ebe69b3f4728] [PERF] Execution time=0.736308
DEBUG - 2026-03-06 14:08:16 --> [REQ_ID=c252b7fc1c04] [REQUEST][END]
INFO - 2026-03-06 14:08:16 --> [REQ_ID=c252b7fc1c04] [PERF] Execution time=0.776811
DEBUG - 2026-03-06 14:11:19 --> [REQ_ID=b136fe783dc3] [REQUEST][START] HEAD /
DEBUG - 2026-03-06 14:11:19 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-06 14:11:19 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-06 14:11:19 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-06 14:11:19 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-06 14:11:19 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
INFO - 2026-03-06 14:15:02 --> [spark:ops:work] Started
INFO - 2026-03-06 14:15:02 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-03-06 14:15:02 --> [SPARK_MEMORY] 16777216
INFO - 2026-03-06 14:15:02 --> [spark:ops:work] Intent
DEBUG - 2026-03-06 14:15:02 --> [REQ_ID=2c49f1f44678] [REQUEST][START] GET /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-06 14:15:02 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-06 14:15:02 --> [REQ_ID=2c49f1f44678] [FILTER_BEFORE] /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-06 14:15:02 --> [REQ_ID=2c49f1f44678] [ROUTE] Controller=\App\Modules\APIs\Controllers\AlertsAPIController Method=fetchEmailAlerts
DEBUG - 2026-03-06 14:15:02 --> [REQ_ID=2c49f1f44678] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-06 14:15:02 --> [REQ_ID=2c49f1f44678] [REQUEST][END]
INFO - 2026-03-06 14:15:02 --> [REQ_ID=2c49f1f44678] [PERF] Execution time=0.057131
INFO - 2026-03-06 14:15:02 --> [spark:ops:work] Completed
INFO - 2026-03-06 14:15:02 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.192028
INFO - 2026-03-06 14:15:02 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-03-06 14:16:19 --> [REQ_ID=a536f7a3309b] [REQUEST][START] HEAD /
DEBUG - 2026-03-06 14:16:19 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-06 14:16:19 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-06 14:16:19 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-06 14:16:19 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-06 14:16:19 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-06 14:21:19 --> [REQ_ID=590f6ae7d51f] [REQUEST][START] HEAD /
DEBUG - 2026-03-06 14:21:19 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-06 14:21:19 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-06 14:21:19 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-06 14:21:19 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-06 14:21:19 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-06 14:26:19 --> [REQ_ID=fbc65149d719] [REQUEST][START] HEAD /
DEBUG - 2026-03-06 14:26:19 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-06 14:26:19 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-06 14:26:19 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-06 14:26:19 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-06 14:26:19 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
INFO - 2026-03-06 14:30:01 --> [spark:ops:work] Started
INFO - 2026-03-06 14:30:01 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-03-06 14:30:01 --> [SPARK_MEMORY] 16777216
INFO - 2026-03-06 14:30:01 --> [spark:ops:work] Intent
INFO - 2026-03-06 14:30:01 --> [spark:ops:work] Completed
INFO - 2026-03-06 14:30:01 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.048760
INFO - 2026-03-06 14:30:01 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-03-06 14:31:19 --> [REQ_ID=05286f13462f] [REQUEST][START] HEAD /
DEBUG - 2026-03-06 14:31:19 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-06 14:31:19 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-06 14:31:19 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-06 14:31:19 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-06 14:31:19 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-06 14:36:19 --> [REQ_ID=6cea655c00fa] [REQUEST][START] HEAD /
DEBUG - 2026-03-06 14:36:19 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-06 14:36:19 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-06 14:36:19 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-06 14:36:19 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-06 14:36:19 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-06 14:41:19 --> [REQ_ID=0d6f4994c5ac] [REQUEST][START] HEAD /
DEBUG - 2026-03-06 14:41:19 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-06 14:41:19 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-06 14:41:19 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-06 14:41:19 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-06 14:41:19 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
INFO - 2026-03-06 14:45:01 --> [spark:ops:work] Started
INFO - 2026-03-06 14:45:01 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-03-06 14:45:01 --> [SPARK_MEMORY] 16777216
INFO - 2026-03-06 14:45:01 --> [spark:ops:work] Intent
INFO - 2026-03-06 14:45:01 --> [spark:ops:work] Completed
INFO - 2026-03-06 14:45:01 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.023296
INFO - 2026-03-06 14:45:01 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-03-06 14:46:19 --> [REQ_ID=72dd592e02d8] [REQUEST][START] HEAD /
DEBUG - 2026-03-06 14:46:19 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-06 14:46:19 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-06 14:46:19 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-06 14:46:19 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-06 14:46:19 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-06 14:51:19 --> [REQ_ID=a92086a539ac] [REQUEST][START] HEAD /
DEBUG - 2026-03-06 14:51:19 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-06 14:51:19 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-06 14:51:19 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-06 14:51:19 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-06 14:51:19 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-06 14:56:19 --> [REQ_ID=fceda22027cd] [REQUEST][START] HEAD /
DEBUG - 2026-03-06 14:56:19 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-06 14:56:19 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-06 14:56:19 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-06 14:56:19 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-06 14:56:19 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
INFO - 2026-03-06 15:00:02 --> [spark:ops:work] Started
INFO - 2026-03-06 15:00:02 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-03-06 15:00:02 --> [SPARK_MEMORY] 16777216
INFO - 2026-03-06 15:00:02 --> [spark:ops:work] Intent
DEBUG - 2026-03-06 15:00:02 --> [REQ_ID=405b2e944970] [REQUEST][START] GET /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-06 15:00:02 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-06 15:00:02 --> [REQ_ID=405b2e944970] [FILTER_BEFORE] /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-06 15:00:02 --> [REQ_ID=405b2e944970] [ROUTE] Controller=\App\Modules\Management\Controllers\ManagementAPIController Method=Run_CRON_Tasks
DEBUG - 2026-03-06 15:00:02 --> [REQ_ID=405b2e944970] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-06 15:00:02 --> [REQ_ID=405b2e944970] [REQUEST][END]
INFO - 2026-03-06 15:00:02 --> [REQ_ID=405b2e944970] [PERF] Execution time=0.046242
INFO - 2026-03-06 15:00:02 --> [spark:ops:work] Completed
INFO - 2026-03-06 15:00:02 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.148353
INFO - 2026-03-06 15:00:02 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-03-06 15:01:19 --> [REQ_ID=32e1ebd18a27] [REQUEST][START] HEAD /
DEBUG - 2026-03-06 15:01:19 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-06 15:01:19 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-06 15:01:19 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-06 15:01:19 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-06 15:01:19 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-06 15:06:19 --> [REQ_ID=224933a34cdb] [REQUEST][START] HEAD /
DEBUG - 2026-03-06 15:06:19 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-06 15:06:19 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-06 15:06:19 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-06 15:06:19 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-06 15:06:19 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-06 15:11:19 --> [REQ_ID=e0a98b75a22b] [REQUEST][START] HEAD /
DEBUG - 2026-03-06 15:11:19 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-06 15:11:19 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-06 15:11:19 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-06 15:11:19 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-06 15:11:19 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
INFO - 2026-03-06 15:15:01 --> [spark:ops:work] Started
INFO - 2026-03-06 15:15:01 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-03-06 15:15:01 --> [SPARK_MEMORY] 16777216
INFO - 2026-03-06 15:15:01 --> [spark:ops:work] Intent
DEBUG - 2026-03-06 15:15:01 --> [REQ_ID=20344b16e34b] [REQUEST][START] GET /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-06 15:15:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-06 15:15:01 --> [REQ_ID=20344b16e34b] [FILTER_BEFORE] /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-06 15:15:01 --> [REQ_ID=20344b16e34b] [ROUTE] Controller=\App\Modules\APIs\Controllers\AlertsAPIController Method=fetchEmailAlerts
DEBUG - 2026-03-06 15:15:01 --> [REQ_ID=20344b16e34b] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-06 15:15:01 --> [REQ_ID=20344b16e34b] [REQUEST][END]
INFO - 2026-03-06 15:15:01 --> [REQ_ID=20344b16e34b] [PERF] Execution time=0.049108
INFO - 2026-03-06 15:15:01 --> [spark:ops:work] Completed
INFO - 2026-03-06 15:15:01 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.234878
INFO - 2026-03-06 15:15:01 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-03-06 15:16:12 --> [REQ_ID=5f663d8a2f8c] [REQUEST][START] GET /
DEBUG - 2026-03-06 15:16:12 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-06 15:16:12 --> [REQ_ID=5f663d8a2f8c] [FILTER_BEFORE] /
DEBUG - 2026-03-06 15:16:12 --> [REQ_ID=5f663d8a2f8c] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-06 15:16:12 --> [REQ_ID=5f663d8a2f8c] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-06 15:16:12 --> [CSRF] token name=csrf_test_name hash=ab6ac3d6fef88bb5f6ec1a08569d8f42
DEBUG - 2026-03-06 15:16:12 --> [REQ_ID=550b3fdf4f09] [INIT] App\Controllers\Home::GET
INFO - 2026-03-06 15:16:12 --> [REQ_ID=550b3fdf4f09] [MEMORY][controller-start] 6291456
INFO - 2026-03-06 15:16:12 --> [REQ_ID=550b3fdf4f09] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-06 15:16:12 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-06 15:16:12 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-03-06 15:16:12 --> [REQ_ID=550b3fdf4f09] [VIEW_RENDER] themes/public/home
INFO - 2026-03-06 15:16:12 --> [REQ_ID=550b3fdf4f09] [MEMORY][commonData:start] 10485760
INFO - 2026-03-06 15:16:12 --> themesMemory usage: 10485760
DEBUG - 2026-03-06 15:16:12 --> [MetaService] slug= pageName=Home cacheHit= path=DB
DEBUG - 2026-03-06 15:16:12 --> [REQ_ID=5f663d8a2f8c] [FILTER_AFTER]
DEBUG - 2026-03-06 15:16:12 --> [REQ_ID=5f663d8a2f8c] [LIFECYCLE][END] status=200 duration_ms=878.44 memory_delta=4194304
INFO - 2026-03-06 15:16:12 --> [REQ_ID=550b3fdf4f09] [PERF] Execution time=0.876484
DEBUG - 2026-03-06 15:16:12 --> [REQ_ID=5f663d8a2f8c] [REQUEST][END]
INFO - 2026-03-06 15:16:12 --> [REQ_ID=5f663d8a2f8c] [PERF] Execution time=0.917446
DEBUG - 2026-03-06 15:16:19 --> [REQ_ID=14b106819966] [REQUEST][START] HEAD /
DEBUG - 2026-03-06 15:16:19 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-06 15:16:19 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-06 15:16:19 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-06 15:16:19 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-06 15:16:19 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-06 15:21:19 --> [REQ_ID=9623efc0c487] [REQUEST][START] HEAD /
DEBUG - 2026-03-06 15:21:19 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-06 15:21:19 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-06 15:21:19 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-06 15:21:19 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-06 15:21:19 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-06 15:24:03 --> [REQ_ID=467c1fd68a66] [REQUEST][START] GET /
DEBUG - 2026-03-06 15:24:03 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-06 15:24:03 --> [REQ_ID=467c1fd68a66] [FILTER_BEFORE] /
DEBUG - 2026-03-06 15:24:03 --> [REQ_ID=467c1fd68a66] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-06 15:24:03 --> [REQ_ID=467c1fd68a66] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-06 15:24:03 --> [CSRF] token name=csrf_test_name hash=f8c19714818622bf5328207e1aa90275
DEBUG - 2026-03-06 15:24:03 --> [REQ_ID=d0b2cb50861d] [INIT] App\Controllers\Home::GET
INFO - 2026-03-06 15:24:03 --> [REQ_ID=d0b2cb50861d] [MEMORY][controller-start] 6291456
INFO - 2026-03-06 15:24:03 --> [REQ_ID=d0b2cb50861d] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-06 15:24:03 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-06 15:24:03 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
DEBUG - 2026-03-06 15:24:03 --> [REQ_ID=d0b2cb50861d] [VIEW_RENDER] themes/public/home
INFO - 2026-03-06 15:24:03 --> [REQ_ID=d0b2cb50861d] [MEMORY][commonData:start] 10485760
INFO - 2026-03-06 15:24:03 --> themesMemory usage: 10485760
DEBUG - 2026-03-06 15:24:03 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-06 15:24:03 --> [REQ_ID=467c1fd68a66] [FILTER_AFTER]
DEBUG - 2026-03-06 15:24:03 --> [REQ_ID=467c1fd68a66] [LIFECYCLE][END] status=200 duration_ms=525.89 memory_delta=4194304
INFO - 2026-03-06 15:24:03 --> [REQ_ID=d0b2cb50861d] [PERF] Execution time=0.523899
DEBUG - 2026-03-06 15:24:03 --> [REQ_ID=467c1fd68a66] [REQUEST][END]
INFO - 2026-03-06 15:24:03 --> [REQ_ID=467c1fd68a66] [PERF] Execution time=0.563902
DEBUG - 2026-03-06 15:26:19 --> [REQ_ID=a312f038b2bb] [REQUEST][START] HEAD /
DEBUG - 2026-03-06 15:26:19 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-06 15:26:19 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-06 15:26:19 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-06 15:26:19 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-06 15:26:19 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
INFO - 2026-03-06 15:30:01 --> [spark:ops:work] Started
INFO - 2026-03-06 15:30:01 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-03-06 15:30:01 --> [SPARK_MEMORY] 16777216
INFO - 2026-03-06 15:30:01 --> [spark:ops:work] Intent
INFO - 2026-03-06 15:30:02 --> [spark:ops:work] Completed
INFO - 2026-03-06 15:30:02 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.233577
INFO - 2026-03-06 15:30:02 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-03-06 15:31:19 --> [REQ_ID=22fed22353dd] [REQUEST][START] HEAD /
DEBUG - 2026-03-06 15:31:19 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-06 15:31:19 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-06 15:31:19 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-06 15:31:19 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-06 15:31:19 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-06 15:36:19 --> [REQ_ID=79d168f8acca] [REQUEST][START] HEAD /
DEBUG - 2026-03-06 15:36:19 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-06 15:36:19 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-06 15:36:19 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-06 15:36:19 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-06 15:36:19 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-06 15:41:19 --> [REQ_ID=b68ef2910090] [REQUEST][START] HEAD /
DEBUG - 2026-03-06 15:41:19 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-06 15:41:19 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-06 15:41:19 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-06 15:41:19 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-06 15:41:19 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
INFO - 2026-03-06 15:45:02 --> [spark:ops:work] Started
INFO - 2026-03-06 15:45:02 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-03-06 15:45:02 --> [SPARK_MEMORY] 16777216
INFO - 2026-03-06 15:45:02 --> [spark:ops:work] Intent
INFO - 2026-03-06 15:45:02 --> [spark:ops:work] Completed
INFO - 2026-03-06 15:45:02 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.166624
INFO - 2026-03-06 15:45:02 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-03-06 15:46:19 --> [REQ_ID=c295ff425f3e] [REQUEST][START] HEAD /
DEBUG - 2026-03-06 15:46:19 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-06 15:46:19 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-06 15:46:19 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-06 15:46:19 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-06 15:46:19 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-06 15:51:19 --> [REQ_ID=d8ecbc6103d4] [REQUEST][START] HEAD /
DEBUG - 2026-03-06 15:51:19 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-06 15:51:19 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-06 15:51:19 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-06 15:51:19 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-06 15:51:19 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-06 15:56:19 --> [REQ_ID=834bddab6e42] [REQUEST][START] HEAD /
DEBUG - 2026-03-06 15:56:19 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-06 15:56:19 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-06 15:56:19 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-06 15:56:19 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-06 15:56:19 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
INFO - 2026-03-06 16:00:01 --> [spark:ops:work] Started
INFO - 2026-03-06 16:00:01 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-03-06 16:00:01 --> [SPARK_MEMORY] 16777216
INFO - 2026-03-06 16:00:01 --> [spark:ops:work] Intent
DEBUG - 2026-03-06 16:00:01 --> [REQ_ID=bc8628eb42ce] [REQUEST][START] GET /index.php/API/Management/Run-CRON-Tasks
INFO - 2026-03-06 16:00:01 --> [SPARK_START] App\Commands\AIOps\Run
INFO - 2026-03-06 16:00:01 --> [SPARK_MEMORY] 16777216
INFO - 2026-03-06 16:00:01 --> [spark:aiops:run] Intent
DEBUG - 2026-03-06 16:00:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-06 16:00:01 --> [REQ_ID=bc8628eb42ce] [FILTER_BEFORE] /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-06 16:00:01 --> [REQ_ID=bc8628eb42ce] [ROUTE] Controller=\App\Modules\Management\Controllers\ManagementAPIController Method=Run_CRON_Tasks
DEBUG - 2026-03-06 16:00:01 --> [REQ_ID=bc8628eb42ce] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-06 16:00:01 --> [REQ_ID=bc8628eb42ce] [REQUEST][END]
INFO - 2026-03-06 16:00:01 --> [REQ_ID=bc8628eb42ce] [PERF] Execution time=0.066224
INFO - 2026-03-06 16:00:01 --> [spark:ops:work] Completed
INFO - 2026-03-06 16:00:01 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.159749
INFO - 2026-03-06 16:00:01 --> [SPARK_MEMORY] 18874368
INFO - 2026-03-06 16:00:02 --> [AIOPS][SPARK][GOVERNANCE][spark:logs:summarize] Started
INFO - 2026-03-06 16:00:02 --> [SPARK_START] App\Commands\Logs\Summarize
INFO - 2026-03-06 16:00:02 --> [SPARK_MEMORY] 16777216
INFO - 2026-03-06 16:00:02 --> [spark:logs:summarize] Intent
INFO - 2026-03-06 16:00:02 --> [AIOPS][SPARK][GOVERNANCE][spark:logs:summarize] Completed
INFO - 2026-03-06 16:00:02 --> [SPARK_COMPLETE] App\Commands\Logs\Summarize duration=0.016162
INFO - 2026-03-06 16:00:02 --> [SPARK_MEMORY] 18874368
INFO - 2026-03-06 16:00:03 --> [spark:app:healthcheck] Started
INFO - 2026-03-06 16:00:03 --> [SPARK_START] App\Commands\App\Healthcheck
INFO - 2026-03-06 16:00:03 --> [SPARK_MEMORY] 16777216
INFO - 2026-03-06 16:00:03 --> [spark:app:healthcheck] Intent
DEBUG - 2026-03-06 16:00:03 --> LOG_HEALTHCHECK debug marker=af3ce1866610
INFO - 2026-03-06 16:00:03 --> LOG_HEALTHCHECK info marker=af3ce1866610
NOTICE - 2026-03-06 16:00:03 --> LOG_HEALTHCHECK probe marker=af3ce1866610
INFO - 2026-03-06 16:00:03 --> [spark:app:healthcheck] Completed
INFO - 2026-03-06 16:00:03 --> [SPARK_COMPLETE] App\Commands\App\Healthcheck duration=0.043151
INFO - 2026-03-06 16:00:03 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-03-06 16:00:04 --> OllamaPatchRunner:L142 - validateGeneratedPatch Content: 
WARNING - 2026-03-06 16:00:04 --> OllamaPatchRunner:L49 - Original Diff: 
DEBUG - 2026-03-06 16:00:05 --> OllamaPatchRunner:L51 - Retried Diff: 
DEBUG - 2026-03-06 16:00:05 --> OllamaPatchRunner:L142 - validateGeneratedPatch Content: 
DEBUG - 2026-03-06 16:00:05 --> OllamaPatchRunner:L53 - Validating Generated Patch Failed
INFO - 2026-03-06 16:00:05 --> [SPARK_COMPLETE] App\Commands\AIOps\Run duration=3.717941
INFO - 2026-03-06 16:00:05 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-03-06 16:01:19 --> [REQ_ID=00fa84a2853f] [REQUEST][START] HEAD /
DEBUG - 2026-03-06 16:01:19 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-06 16:01:19 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-06 16:01:19 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-06 16:01:19 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-06 16:01:19 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-06 16:03:11 --> [REQ_ID=2a90f699b8f5] [REQUEST][START] GET /index.php/Subscribe/Daily-Financial-News
DEBUG - 2026-03-06 16:03:11 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-06 16:03:11 --> [REQ_ID=2a90f699b8f5] [FILTER_BEFORE] /index.php/Subscribe/Daily-Financial-News
DEBUG - 2026-03-06 16:03:11 --> [REQ_ID=2a90f699b8f5] [ROUTE] Controller=closure_route Method=index
DEBUG - 2026-03-06 16:03:11 --> [REQ_ID=2a90f699b8f5] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Subscribe/Daily-Financial-News
DEBUG - 2026-03-06 16:03:11 --> [CSRF] token name=csrf_test_name hash=d46d1e9a56d6f8db126ba4cf043be83b
DEBUG - 2026-03-06 16:03:11 --> [REQ_ID=2a90f699b8f5] [REQUEST][END]
INFO - 2026-03-06 16:03:11 --> [REQ_ID=2a90f699b8f5] [PERF] Execution time=0.048756
DEBUG - 2026-03-06 16:03:19 --> [REQ_ID=fc406fc4d276] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-06 16:03:19 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-06 16:03:19 --> [REQ_ID=fc406fc4d276] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-06 16:03:19 --> [REQ_ID=fc406fc4d276] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-06 16:03:19 --> [REQ_ID=fc406fc4d276] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-06 16:03:19 --> [CSRF] token name=csrf_test_name hash=1a4f9814fcb4f3d982c94bfd4dc55360
DEBUG - 2026-03-06 16:03:19 --> [REQ_ID=9eaa806b04c5] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-06 16:03:19 --> [REQ_ID=9eaa806b04c5] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-06 16:03:19 --> [REQ_ID=fc406fc4d276] [FILTER_AFTER]
DEBUG - 2026-03-06 16:03:19 --> [REQ_ID=fc406fc4d276] [LIFECYCLE][END] status=200 duration_ms=39.80 memory_delta=0
INFO - 2026-03-06 16:03:19 --> [REQ_ID=9eaa806b04c5] [PERF] Execution time=0.039089
DEBUG - 2026-03-06 16:03:19 --> [REQ_ID=fc406fc4d276] [REQUEST][END]
INFO - 2026-03-06 16:03:19 --> [REQ_ID=fc406fc4d276] [PERF] Execution time=0.054843
DEBUG - 2026-03-06 16:06:19 --> [REQ_ID=c07c25448e70] [REQUEST][START] HEAD /
DEBUG - 2026-03-06 16:06:19 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-06 16:06:19 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-06 16:06:19 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-06 16:06:19 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-06 16:06:19 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-06 16:11:19 --> [REQ_ID=c53cb154f78f] [REQUEST][START] HEAD /
DEBUG - 2026-03-06 16:11:19 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-06 16:11:19 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-06 16:11:19 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-06 16:11:19 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-06 16:11:19 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
INFO - 2026-03-06 16:15:02 --> [spark:ops:work] Started
INFO - 2026-03-06 16:15:02 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-03-06 16:15:02 --> [SPARK_MEMORY] 16777216
INFO - 2026-03-06 16:15:02 --> [spark:ops:work] Intent
DEBUG - 2026-03-06 16:15:02 --> [REQ_ID=c8597d1b573a] [REQUEST][START] GET /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-06 16:15:02 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
INFO - 2026-03-06 16:15:02 --> [spark:ops:work] Completed
INFO - 2026-03-06 16:15:02 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.124630
INFO - 2026-03-06 16:15:02 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-03-06 16:15:02 --> [REQ_ID=c8597d1b573a] [FILTER_BEFORE] /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-06 16:15:02 --> [REQ_ID=c8597d1b573a] [ROUTE] Controller=\App\Modules\APIs\Controllers\AlertsAPIController Method=fetchEmailAlerts
DEBUG - 2026-03-06 16:15:02 --> [REQ_ID=c8597d1b573a] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-06 16:15:02 --> [REQ_ID=c8597d1b573a] [REQUEST][END]
INFO - 2026-03-06 16:15:02 --> [REQ_ID=c8597d1b573a] [PERF] Execution time=0.068875
DEBUG - 2026-03-06 16:16:14 --> [REQ_ID=e5c8301a9adb] [REQUEST][START] GET /
DEBUG - 2026-03-06 16:16:14 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-06 16:16:14 --> [REQ_ID=e5c8301a9adb] [FILTER_BEFORE] /
DEBUG - 2026-03-06 16:16:14 --> [REQ_ID=e5c8301a9adb] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-06 16:16:14 --> [REQ_ID=e5c8301a9adb] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-06 16:16:14 --> [CSRF] token name=csrf_test_name hash=25e5619bb4514fb7e6eb5e19ab32054f
DEBUG - 2026-03-06 16:16:14 --> [REQ_ID=0920c94612ef] [INIT] App\Controllers\Home::GET
INFO - 2026-03-06 16:16:14 --> [REQ_ID=0920c94612ef] [MEMORY][controller-start] 4194304
INFO - 2026-03-06 16:16:14 --> [REQ_ID=0920c94612ef] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-06 16:16:14 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-06 16:16:15 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-03-06 16:16:15 --> [REQ_ID=0920c94612ef] [VIEW_RENDER] themes/public/home
INFO - 2026-03-06 16:16:15 --> [REQ_ID=0920c94612ef] [MEMORY][commonData:start] 8388608
INFO - 2026-03-06 16:16:15 --> themesMemory usage: 8388608
DEBUG - 2026-03-06 16:16:15 --> [MetaService] slug= pageName=Home cacheHit= path=DB
DEBUG - 2026-03-06 16:16:15 --> [REQ_ID=e5c8301a9adb] [FILTER_AFTER]
DEBUG - 2026-03-06 16:16:15 --> [REQ_ID=e5c8301a9adb] [LIFECYCLE][END] status=200 duration_ms=810.28 memory_delta=4194304
INFO - 2026-03-06 16:16:15 --> [REQ_ID=0920c94612ef] [PERF] Execution time=0.809007
DEBUG - 2026-03-06 16:16:15 --> [REQ_ID=e5c8301a9adb] [REQUEST][END]
INFO - 2026-03-06 16:16:15 --> [REQ_ID=e5c8301a9adb] [PERF] Execution time=0.824615
DEBUG - 2026-03-06 16:16:19 --> [REQ_ID=907c12f5252d] [REQUEST][START] HEAD /
DEBUG - 2026-03-06 16:16:19 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-06 16:16:19 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-06 16:16:19 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-06 16:16:19 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-06 16:16:19 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-06 16:17:06 --> [REQ_ID=ed8397a364fe] [REQUEST][START] GET /index.php/How-It-Works/Automated-Financial-Insights
DEBUG - 2026-03-06 16:17:06 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-06 16:17:06 --> [REQ_ID=ed8397a364fe] [FILTER_BEFORE] /index.php/How-It-Works/Automated-Financial-Insights
DEBUG - 2026-03-06 16:17:06 --> [REQ_ID=ed8397a364fe] [ROUTE] Controller=\App\Modules\Blog\Controllers\HowItWorksController Method=show
DEBUG - 2026-03-06 16:17:06 --> [REQ_ID=ed8397a364fe] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/How-It-Works/Automated-Financial-Insights
DEBUG - 2026-03-06 16:17:06 --> [CSRF] token name=csrf_test_name hash=486082ec54f9e63e336c48f45306c821
DEBUG - 2026-03-06 16:17:06 --> [REQ_ID=3980933220d2] [INIT] App\Modules\Blog\Controllers\HowItWorksController::GET
INFO - 2026-03-06 16:17:06 --> [REQ_ID=3980933220d2] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-06 16:17:06 --> [REQ_ID=3980933220d2] [METHOD_ENTRY] show
DEBUG - 2026-03-06 16:17:06 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-06 16:17:06 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-06 16:17:06 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-06 16:17:06 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-06 16:17:06 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-06 16:17:06 --> MyMICoin: guest context detected; skipping user-specific preload.
ERROR - 2026-03-06 16:17:06 --> [ERROR_PAGE] event=error_404 status=404 message=Page not found.
DEBUG - 2026-03-06 16:17:06 --> [REQ_ID=ed8397a364fe] [FILTER_AFTER]
DEBUG - 2026-03-06 16:17:06 --> [REQ_ID=ed8397a364fe] [LIFECYCLE][END] status=404 duration_ms=158.14 memory_delta=2097152
INFO - 2026-03-06 16:17:06 --> [REQ_ID=3980933220d2] [PERF] Execution time=0.158108
DEBUG - 2026-03-06 16:17:06 --> [REQ_ID=ed8397a364fe] [REQUEST][END]
INFO - 2026-03-06 16:17:06 --> [REQ_ID=ed8397a364fe] [PERF] Execution time=0.171761
DEBUG - 2026-03-06 16:19:35 --> [REQ_ID=3c8dc84b8145] [REQUEST][START] GET /
DEBUG - 2026-03-06 16:19:35 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-06 16:19:35 --> [REQ_ID=3c8dc84b8145] [FILTER_BEFORE] /
DEBUG - 2026-03-06 16:19:35 --> [REQ_ID=3c8dc84b8145] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-06 16:19:35 --> [REQ_ID=3c8dc84b8145] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-06 16:19:35 --> [CSRF] token name=csrf_test_name hash=b50c71466c3331ababb1e512a0c476a5
DEBUG - 2026-03-06 16:19:35 --> [REQ_ID=ced4e6c46db4] [INIT] App\Controllers\Home::GET
INFO - 2026-03-06 16:19:35 --> [REQ_ID=ced4e6c46db4] [MEMORY][controller-start] 6291456
INFO - 2026-03-06 16:19:35 --> [REQ_ID=ced4e6c46db4] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-06 16:19:35 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-06 16:19:35 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
DEBUG - 2026-03-06 16:19:35 --> [REQ_ID=ced4e6c46db4] [VIEW_RENDER] themes/public/home
INFO - 2026-03-06 16:19:35 --> [REQ_ID=ced4e6c46db4] [MEMORY][commonData:start] 10485760
INFO - 2026-03-06 16:19:35 --> themesMemory usage: 10485760
DEBUG - 2026-03-06 16:19:35 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-06 16:19:35 --> [REQ_ID=3c8dc84b8145] [FILTER_AFTER]
DEBUG - 2026-03-06 16:19:35 --> [REQ_ID=3c8dc84b8145] [LIFECYCLE][END] status=200 duration_ms=740.75 memory_delta=4194304
INFO - 2026-03-06 16:19:35 --> [REQ_ID=ced4e6c46db4] [PERF] Execution time=0.738832
DEBUG - 2026-03-06 16:19:35 --> [REQ_ID=3c8dc84b8145] [REQUEST][END]
INFO - 2026-03-06 16:19:35 --> [REQ_ID=3c8dc84b8145] [PERF] Execution time=0.780050
DEBUG - 2026-03-06 16:21:19 --> [REQ_ID=02a63537215a] [REQUEST][START] HEAD /
DEBUG - 2026-03-06 16:21:19 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-06 16:21:19 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-06 16:21:19 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-06 16:21:19 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-06 16:21:19 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-06 16:26:19 --> [REQ_ID=7b4677b92ac7] [REQUEST][START] HEAD /
DEBUG - 2026-03-06 16:26:19 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-06 16:26:19 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-06 16:26:19 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-06 16:26:19 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-06 16:26:19 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
INFO - 2026-03-06 16:30:01 --> [spark:ops:work] Started
INFO - 2026-03-06 16:30:01 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-03-06 16:30:01 --> [SPARK_MEMORY] 16777216
INFO - 2026-03-06 16:30:01 --> [spark:ops:work] Intent
INFO - 2026-03-06 16:30:01 --> [spark:ops:work] Completed
INFO - 2026-03-06 16:30:01 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.051704
INFO - 2026-03-06 16:30:01 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-03-06 16:31:19 --> [REQ_ID=91441a5c88f0] [REQUEST][START] HEAD /
DEBUG - 2026-03-06 16:31:19 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-06 16:31:19 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-06 16:31:19 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-06 16:31:19 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-06 16:31:19 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-06 16:36:19 --> [REQ_ID=82c6f407611f] [REQUEST][START] HEAD /
DEBUG - 2026-03-06 16:36:19 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-06 16:36:19 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-06 16:36:19 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-06 16:36:19 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-06 16:36:19 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-06 16:39:21 --> [REQ_ID=d15c2c95-ae96-439a-ac13-def4a5e2972d] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-06 16:39:21 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-06 16:39:21 --> [REQ_ID=d15c2c95-ae96-439a-ac13-def4a5e2972d] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-06 16:39:21 --> [REQ_ID=d15c2c95-ae96-439a-ac13-def4a5e2972d] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-06 16:39:21 --> [REQ_ID=d15c2c95-ae96-439a-ac13-def4a5e2972d] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-06 16:39:21 --> [CSRF] token name=csrf_test_name hash=9bead4dc17bc76732877a99538a42778
DEBUG - 2026-03-06 16:39:21 --> [REQ_ID=d0c701db9d3e] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-06 16:39:21 --> [REQ_ID=d0c701db9d3e] [MEMORY][controller-start] 6291456
DEBUG - 2026-03-06 16:39:22 --> [REQ_ID=d15c2c95-ae96-439a-ac13-def4a5e2972d] [FILTER_AFTER]
DEBUG - 2026-03-06 16:39:22 --> [REQ_ID=d15c2c95-ae96-439a-ac13-def4a5e2972d] [LIFECYCLE][END] status=200 duration_ms=204.22 memory_delta=0
INFO - 2026-03-06 16:39:22 --> [REQ_ID=d0c701db9d3e] [PERF] Execution time=0.202014
DEBUG - 2026-03-06 16:39:22 --> [REQ_ID=d15c2c95-ae96-439a-ac13-def4a5e2972d] [REQUEST][END]
INFO - 2026-03-06 16:39:22 --> [REQ_ID=d15c2c95-ae96-439a-ac13-def4a5e2972d] [PERF] Execution time=0.245013
DEBUG - 2026-03-06 16:40:34 --> [REQ_ID=df889c7f-aaa9-4c69-ad22-fe00524bf6fd] [REQUEST][START] GET /
DEBUG - 2026-03-06 16:40:34 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-06 16:40:34 --> [REQ_ID=df889c7f-aaa9-4c69-ad22-fe00524bf6fd] [FILTER_BEFORE] /
DEBUG - 2026-03-06 16:40:34 --> [REQ_ID=df889c7f-aaa9-4c69-ad22-fe00524bf6fd] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-06 16:40:34 --> [REQ_ID=df889c7f-aaa9-4c69-ad22-fe00524bf6fd] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-06 16:40:34 --> [CSRF] token name=csrf_test_name hash=b277a4f2b4f0d95bb76db41bf36b86aa
DEBUG - 2026-03-06 16:40:34 --> [REQ_ID=53346447ed03] [INIT] App\Controllers\Home::GET
INFO - 2026-03-06 16:40:34 --> [REQ_ID=53346447ed03] [MEMORY][controller-start] 4194304
INFO - 2026-03-06 16:40:34 --> [REQ_ID=53346447ed03] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-06 16:40:34 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-06 16:40:34 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-03-06 16:40:34 --> [REQ_ID=53346447ed03] [VIEW_RENDER] themes/public/home
INFO - 2026-03-06 16:40:34 --> [REQ_ID=53346447ed03] [MEMORY][commonData:start] 8388608
INFO - 2026-03-06 16:40:34 --> themesMemory usage: 8388608
DEBUG - 2026-03-06 16:40:34 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-06 16:40:34 --> [REQ_ID=df889c7f-aaa9-4c69-ad22-fe00524bf6fd] [FILTER_AFTER]
DEBUG - 2026-03-06 16:40:34 --> [REQ_ID=df889c7f-aaa9-4c69-ad22-fe00524bf6fd] [LIFECYCLE][END] status=200 duration_ms=820.48 memory_delta=4194304
INFO - 2026-03-06 16:40:34 --> [REQ_ID=53346447ed03] [PERF] Execution time=0.819986
DEBUG - 2026-03-06 16:40:34 --> [REQ_ID=df889c7f-aaa9-4c69-ad22-fe00524bf6fd] [REQUEST][END]
INFO - 2026-03-06 16:40:34 --> [REQ_ID=df889c7f-aaa9-4c69-ad22-fe00524bf6fd] [PERF] Execution time=0.831025
DEBUG - 2026-03-06 16:41:19 --> [REQ_ID=4ced4c39a609] [REQUEST][START] HEAD /
DEBUG - 2026-03-06 16:41:19 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-06 16:41:19 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-06 16:41:19 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-06 16:41:19 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-06 16:41:19 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-06 16:42:06 --> [REQ_ID=e08b01168cda] [REQUEST][START] GET /index.php/Management/Docs
DEBUG - 2026-03-06 16:42:06 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-06 16:42:06 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: GET, Route: Management/Docs]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-06 16:42:06 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-06 16:42:06 --> [404] URI=https://www.mymiwallet.com/index.php/Management/Docs
WARNING - 2026-03-06 16:42:06 --> 404 route miss: https://www.mymiwallet.com/index.php/Management/Docs | referrer: none
INFO - 2026-03-06 16:45:01 --> [spark:ops:work] Started
INFO - 2026-03-06 16:45:01 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-03-06 16:45:01 --> [SPARK_MEMORY] 16777216
INFO - 2026-03-06 16:45:01 --> [spark:ops:work] Intent
INFO - 2026-03-06 16:45:02 --> [spark:ops:work] Completed
INFO - 2026-03-06 16:45:02 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.158042
INFO - 2026-03-06 16:45:02 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-03-06 16:46:19 --> [REQ_ID=c7e5bfe52e8c] [REQUEST][START] HEAD /
DEBUG - 2026-03-06 16:46:19 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-06 16:46:19 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-06 16:46:19 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-06 16:46:19 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-06 16:46:19 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-06 16:51:19 --> [REQ_ID=d00b09ee5012] [REQUEST][START] HEAD /
DEBUG - 2026-03-06 16:51:19 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-06 16:51:19 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-06 16:51:19 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-06 16:51:19 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-06 16:51:19 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-06 16:51:37 --> [REQ_ID=f3a4b90e9c41] [REQUEST][START] GET /index.php/activate
DEBUG - 2026-03-06 16:51:37 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-06 16:51:37 --> [REQ_ID=f3a4b90e9c41] [FILTER_BEFORE] /index.php/activate
DEBUG - 2026-03-06 16:51:37 --> [REQ_ID=f3a4b90e9c41] [ROUTE] Controller=\App\Controllers\AuthController Method=activateAccount
DEBUG - 2026-03-06 16:51:37 --> [REQ_ID=f3a4b90e9c41] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/activate
DEBUG - 2026-03-06 16:51:37 --> [CSRF] token name=csrf_test_name hash=d1637fbd46bf216c584ef61e657d23f4
DEBUG - 2026-03-06 16:51:37 --> [REQ_ID=cd83a1afbdea] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-06 16:51:37 --> [REQ_ID=cd83a1afbdea] [MEMORY][controller-start] 4194304
INFO - 2026-03-06 16:51:37 --> [ACTIVATION] Activation link hit
WARNING - 2026-03-06 16:51:37 --> [ACTIVATION] Activation failed: missing token
DEBUG - 2026-03-06 16:51:37 --> [REQ_ID=f3a4b90e9c41] [FILTER_AFTER]
DEBUG - 2026-03-06 16:51:37 --> [REQ_ID=f3a4b90e9c41] [LIFECYCLE][END] status=302 duration_ms=65.54 memory_delta=0
INFO - 2026-03-06 16:51:37 --> [REQ_ID=cd83a1afbdea] [PERF] Execution time=0.063036
DEBUG - 2026-03-06 16:51:37 --> [REQ_ID=f3a4b90e9c41] [REQUEST][END]
INFO - 2026-03-06 16:51:37 --> [REQ_ID=f3a4b90e9c41] [PERF] Execution time=0.087904
DEBUG - 2026-03-06 16:51:38 --> [REQ_ID=aa98e1aa902e] [REQUEST][START] GET /index.php/Support/Account
DEBUG - 2026-03-06 16:51:38 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-06 16:51:38 --> [REQ_ID=aa98e1aa902e] [FILTER_BEFORE] /index.php/Support/Account
DEBUG - 2026-03-06 16:51:38 --> [REQ_ID=aa98e1aa902e] [ROUTE] Controller=\App\Modules\Support\Controllers\AccountSupportController Method=index
DEBUG - 2026-03-06 16:51:38 --> [REQ_ID=aa98e1aa902e] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Support/Account
DEBUG - 2026-03-06 16:51:38 --> [CSRF] token name=csrf_test_name hash=fd31e373b6d41901ba6cda2a259a949e
DEBUG - 2026-03-06 16:51:38 --> [REQ_ID=5d76a44331aa] [INIT] App\Modules\Support\Controllers\AccountSupportController::GET
INFO - 2026-03-06 16:51:38 --> [REQ_ID=5d76a44331aa] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-06 16:51:38 --> [REQ_ID=5d76a44331aa] [METHOD_ENTRY] index
DEBUG - 2026-03-06 16:51:38 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-06 16:51:38 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-06 16:51:38 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-06 16:51:38 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-06 16:51:38 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-06 16:51:38 --> MyMICoin: guest context detected; skipping user-specific preload.
INFO - 2026-03-06 16:51:38 --> [REQ_ID=5d76a44331aa] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-06 16:51:38 --> [REQ_ID=5d76a44331aa] [VIEW_RENDER] SupportModule/Support/account_help
INFO - 2026-03-06 16:51:38 --> [REQ_ID=5d76a44331aa] [MEMORY][commonData:start] 6291456
INFO - 2026-03-06 16:51:39 --> themesMemory usage: 6291456
DEBUG - 2026-03-06 16:51:39 --> [REQ_ID=aa98e1aa902e] [FILTER_AFTER]
DEBUG - 2026-03-06 16:51:39 --> [REQ_ID=aa98e1aa902e] [LIFECYCLE][END] status=200 duration_ms=77.98 memory_delta=2097152
INFO - 2026-03-06 16:51:39 --> [REQ_ID=5d76a44331aa] [PERF] Execution time=0.076237
DEBUG - 2026-03-06 16:51:39 --> [REQ_ID=aa98e1aa902e] [REQUEST][END]
INFO - 2026-03-06 16:51:39 --> [REQ_ID=aa98e1aa902e] [PERF] Execution time=0.090884
DEBUG - 2026-03-06 16:56:19 --> [REQ_ID=c838d3d27357] [REQUEST][START] HEAD /
DEBUG - 2026-03-06 16:56:19 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-06 16:56:19 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-06 16:56:19 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-06 16:56:19 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-06 16:56:19 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-06 16:56:53 --> [REQ_ID=d319a9f6c2f2] [REQUEST][START] GET /
DEBUG - 2026-03-06 16:56:53 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-06 16:56:53 --> [REQ_ID=d319a9f6c2f2] [FILTER_BEFORE] /
DEBUG - 2026-03-06 16:56:53 --> [REQ_ID=d319a9f6c2f2] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-06 16:56:53 --> [REQ_ID=d319a9f6c2f2] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-06 16:56:53 --> [CSRF] token name=csrf_test_name hash=8dbb511e547000af59ecb7fdd96a8dca
DEBUG - 2026-03-06 16:56:53 --> [REQ_ID=217352026fb7] [INIT] App\Controllers\Home::GET
INFO - 2026-03-06 16:56:53 --> [REQ_ID=217352026fb7] [MEMORY][controller-start] 4194304
INFO - 2026-03-06 16:56:53 --> [REQ_ID=217352026fb7] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-06 16:56:53 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-06 16:56:54 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-03-06 16:56:54 --> [REQ_ID=217352026fb7] [VIEW_RENDER] themes/public/home
INFO - 2026-03-06 16:56:54 --> [REQ_ID=217352026fb7] [MEMORY][commonData:start] 8388608
INFO - 2026-03-06 16:56:54 --> themesMemory usage: 8388608
DEBUG - 2026-03-06 16:56:54 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-06 16:56:54 --> [REQ_ID=d319a9f6c2f2] [FILTER_AFTER]
DEBUG - 2026-03-06 16:56:54 --> [REQ_ID=d319a9f6c2f2] [LIFECYCLE][END] status=200 duration_ms=784.35 memory_delta=4194304
INFO - 2026-03-06 16:56:54 --> [REQ_ID=217352026fb7] [PERF] Execution time=0.782011
DEBUG - 2026-03-06 16:56:54 --> [REQ_ID=d319a9f6c2f2] [REQUEST][END]
INFO - 2026-03-06 16:56:54 --> [REQ_ID=d319a9f6c2f2] [PERF] Execution time=0.804728
INFO - 2026-03-06 17:00:01 --> [spark:ops:work] Started
INFO - 2026-03-06 17:00:01 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-03-06 17:00:01 --> [SPARK_MEMORY] 16777216
INFO - 2026-03-06 17:00:01 --> [spark:ops:work] Intent
DEBUG - 2026-03-06 17:00:01 --> [REQ_ID=d650ba48708c] [REQUEST][START] GET /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-06 17:00:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-06 17:00:01 --> [REQ_ID=d650ba48708c] [FILTER_BEFORE] /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-06 17:00:01 --> [REQ_ID=d650ba48708c] [ROUTE] Controller=\App\Modules\Management\Controllers\ManagementAPIController Method=Run_CRON_Tasks
DEBUG - 2026-03-06 17:00:01 --> [REQ_ID=d650ba48708c] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-06 17:00:01 --> [REQ_ID=d650ba48708c] [REQUEST][END]
INFO - 2026-03-06 17:00:01 --> [REQ_ID=d650ba48708c] [PERF] Execution time=0.048880
INFO - 2026-03-06 17:00:01 --> [spark:ops:work] Completed
INFO - 2026-03-06 17:00:01 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.125522
INFO - 2026-03-06 17:00:01 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-03-06 17:01:19 --> [REQ_ID=27bce8c281d6] [REQUEST][START] HEAD /
DEBUG - 2026-03-06 17:01:19 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-06 17:01:19 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-06 17:01:19 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-06 17:01:19 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-06 17:01:19 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-06 17:06:19 --> [REQ_ID=3c800862854d] [REQUEST][START] HEAD /
DEBUG - 2026-03-06 17:06:19 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-06 17:06:19 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-06 17:06:19 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-06 17:06:19 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-06 17:06:19 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-06 17:10:19 --> [REQ_ID=9ef57efa95a1] [REQUEST][START] GET /
DEBUG - 2026-03-06 17:10:19 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-06 17:10:19 --> [REQ_ID=9ef57efa95a1] [FILTER_BEFORE] /
DEBUG - 2026-03-06 17:10:19 --> [REQ_ID=9ef57efa95a1] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-06 17:10:19 --> [REQ_ID=9ef57efa95a1] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-06 17:10:20 --> [CSRF] token name=csrf_test_name hash=2330186e0c6c00a3db85754a11b32992
DEBUG - 2026-03-06 17:10:20 --> [REQ_ID=c772afaffbc9] [INIT] App\Controllers\Home::GET
INFO - 2026-03-06 17:10:20 --> [REQ_ID=c772afaffbc9] [MEMORY][controller-start] 6291456
INFO - 2026-03-06 17:10:20 --> [REQ_ID=c772afaffbc9] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-06 17:10:20 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-06 17:10:20 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
DEBUG - 2026-03-06 17:10:20 --> [REQ_ID=c772afaffbc9] [VIEW_RENDER] themes/public/home
INFO - 2026-03-06 17:10:20 --> [REQ_ID=c772afaffbc9] [MEMORY][commonData:start] 10485760
INFO - 2026-03-06 17:10:20 --> themesMemory usage: 10485760
DEBUG - 2026-03-06 17:10:20 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-06 17:10:20 --> [REQ_ID=9ef57efa95a1] [FILTER_AFTER]
DEBUG - 2026-03-06 17:10:20 --> [REQ_ID=9ef57efa95a1] [LIFECYCLE][END] status=200 duration_ms=778.32 memory_delta=4194304
INFO - 2026-03-06 17:10:20 --> [REQ_ID=c772afaffbc9] [PERF] Execution time=0.776001
DEBUG - 2026-03-06 17:10:20 --> [REQ_ID=9ef57efa95a1] [REQUEST][END]
INFO - 2026-03-06 17:10:20 --> [REQ_ID=9ef57efa95a1] [PERF] Execution time=0.816830
DEBUG - 2026-03-06 17:11:19 --> [REQ_ID=82c353272294] [REQUEST][START] HEAD /
DEBUG - 2026-03-06 17:11:19 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-06 17:11:19 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-06 17:11:19 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-06 17:11:19 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-06 17:11:19 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
INFO - 2026-03-06 17:15:01 --> [spark:ops:work] Started
INFO - 2026-03-06 17:15:01 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-03-06 17:15:01 --> [SPARK_MEMORY] 16777216
INFO - 2026-03-06 17:15:01 --> [spark:ops:work] Intent
DEBUG - 2026-03-06 17:15:01 --> [REQ_ID=198a6ca67e74] [REQUEST][START] GET /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-06 17:15:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-06 17:15:01 --> [REQ_ID=198a6ca67e74] [FILTER_BEFORE] /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-06 17:15:01 --> [REQ_ID=198a6ca67e74] [ROUTE] Controller=\App\Modules\APIs\Controllers\AlertsAPIController Method=fetchEmailAlerts
DEBUG - 2026-03-06 17:15:01 --> [REQ_ID=198a6ca67e74] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-06 17:15:01 --> [REQ_ID=198a6ca67e74] [REQUEST][END]
INFO - 2026-03-06 17:15:01 --> [REQ_ID=198a6ca67e74] [PERF] Execution time=0.054493
INFO - 2026-03-06 17:15:01 --> [spark:ops:work] Completed
INFO - 2026-03-06 17:15:01 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.230588
INFO - 2026-03-06 17:15:01 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-03-06 17:16:19 --> [REQ_ID=876ca79eb090] [REQUEST][START] HEAD /
DEBUG - 2026-03-06 17:16:19 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-06 17:16:19 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-06 17:16:19 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-06 17:16:19 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-06 17:16:19 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-06 17:21:19 --> [REQ_ID=dfbeda1870d3] [REQUEST][START] HEAD /
DEBUG - 2026-03-06 17:21:19 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-06 17:21:19 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-06 17:21:19 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-06 17:21:19 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-06 17:21:19 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-06 17:26:19 --> [REQ_ID=bec465af1294] [REQUEST][START] HEAD /
DEBUG - 2026-03-06 17:26:19 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-06 17:26:19 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-06 17:26:19 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-06 17:26:19 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-06 17:26:19 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
INFO - 2026-03-06 17:30:01 --> [spark:ops:work] Started
INFO - 2026-03-06 17:30:01 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-03-06 17:30:01 --> [SPARK_MEMORY] 16777216
INFO - 2026-03-06 17:30:01 --> [spark:ops:work] Intent
INFO - 2026-03-06 17:30:01 --> [spark:ops:work] Completed
INFO - 2026-03-06 17:30:01 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.058286
INFO - 2026-03-06 17:30:01 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-03-06 17:31:19 --> [REQ_ID=a5f42e6ba9fb] [REQUEST][START] HEAD /
DEBUG - 2026-03-06 17:31:19 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-06 17:31:19 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-06 17:31:19 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-06 17:31:19 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-06 17:31:19 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-06 17:36:19 --> [REQ_ID=0075348081e1] [REQUEST][START] HEAD /
DEBUG - 2026-03-06 17:36:19 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-06 17:36:19 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-06 17:36:19 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-06 17:36:19 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-06 17:36:19 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-06 17:36:42 --> [REQ_ID=fdd4d5c21514] [REQUEST][START] GET /index.php/Management/Projects
DEBUG - 2026-03-06 17:36:42 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-06 17:36:42 --> [REQ_ID=fdd4d5c21514] [FILTER_BEFORE] /index.php/Management/Projects
DEBUG - 2026-03-06 17:36:42 --> [REQ_ID=fdd4d5c21514] [ROUTE] Controller=\App\Modules\Management\Controllers\ProjectsController Method=index
DEBUG - 2026-03-06 17:36:42 --> [REQ_ID=fdd4d5c21514] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Management/Projects
DEBUG - 2026-03-06 17:36:42 --> [CSRF] token name=csrf_test_name hash=7da411aae4221a16e8cc6db63f92766f
DEBUG - 2026-03-06 17:36:42 --> [REQ_ID=fdd4d5c21514] [REQUEST][END]
INFO - 2026-03-06 17:36:42 --> [REQ_ID=fdd4d5c21514] [PERF] Execution time=0.024527
DEBUG - 2026-03-06 17:36:43 --> [REQ_ID=d222928342ab] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-06 17:36:43 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-06 17:36:43 --> [REQ_ID=d222928342ab] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-06 17:36:43 --> [REQ_ID=d222928342ab] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-06 17:36:43 --> [REQ_ID=d222928342ab] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-06 17:36:43 --> [CSRF] token name=csrf_test_name hash=99e5df5dee88313a83dc091fd9d68985
DEBUG - 2026-03-06 17:36:43 --> [REQ_ID=ffefdf7f87f9] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-06 17:36:43 --> [REQ_ID=ffefdf7f87f9] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-06 17:36:43 --> [REQ_ID=d222928342ab] [FILTER_AFTER]
DEBUG - 2026-03-06 17:36:43 --> [REQ_ID=d222928342ab] [LIFECYCLE][END] status=200 duration_ms=103.07 memory_delta=0
INFO - 2026-03-06 17:36:43 --> [REQ_ID=ffefdf7f87f9] [PERF] Execution time=0.103036
DEBUG - 2026-03-06 17:36:43 --> [REQ_ID=d222928342ab] [REQUEST][END]
INFO - 2026-03-06 17:36:43 --> [REQ_ID=d222928342ab] [PERF] Execution time=0.117994
DEBUG - 2026-03-06 17:37:23 --> [REQ_ID=19382913157e] [REQUEST][START] GET /
DEBUG - 2026-03-06 17:37:23 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-06 17:37:23 --> [REQ_ID=19382913157e] [FILTER_BEFORE] /
DEBUG - 2026-03-06 17:37:23 --> [REQ_ID=19382913157e] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-06 17:37:23 --> [REQ_ID=19382913157e] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-06 17:37:23 --> [CSRF] token name=csrf_test_name hash=e7f9dccadb4cd802c593148af7eed763
DEBUG - 2026-03-06 17:37:23 --> [REQ_ID=d898e33a1de1] [INIT] App\Controllers\Home::GET
INFO - 2026-03-06 17:37:23 --> [REQ_ID=d898e33a1de1] [MEMORY][controller-start] 4194304
INFO - 2026-03-06 17:37:23 --> [REQ_ID=d898e33a1de1] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-06 17:37:23 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-06 17:37:24 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-03-06 17:37:24 --> [REQ_ID=d898e33a1de1] [VIEW_RENDER] themes/public/home
INFO - 2026-03-06 17:37:24 --> [REQ_ID=d898e33a1de1] [MEMORY][commonData:start] 8388608
INFO - 2026-03-06 17:37:24 --> themesMemory usage: 8388608
DEBUG - 2026-03-06 17:37:24 --> [MetaService] slug= pageName=Home cacheHit= path=DB
DEBUG - 2026-03-06 17:37:24 --> [REQ_ID=19382913157e] [FILTER_AFTER]
DEBUG - 2026-03-06 17:37:24 --> [REQ_ID=19382913157e] [LIFECYCLE][END] status=200 duration_ms=730.77 memory_delta=4194304
INFO - 2026-03-06 17:37:24 --> [REQ_ID=d898e33a1de1] [PERF] Execution time=0.730451
DEBUG - 2026-03-06 17:37:24 --> [REQ_ID=19382913157e] [REQUEST][END]
INFO - 2026-03-06 17:37:24 --> [REQ_ID=19382913157e] [PERF] Execution time=0.741277
DEBUG - 2026-03-06 17:38:25 --> [REQ_ID=07ff034d8d35] [REQUEST][START] GET /index.php/How-It-Works/Investor-Profile
DEBUG - 2026-03-06 17:38:25 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-06 17:38:25 --> [REQ_ID=07ff034d8d35] [FILTER_BEFORE] /index.php/How-It-Works/Investor-Profile
DEBUG - 2026-03-06 17:38:25 --> [REQ_ID=07ff034d8d35] [ROUTE] Controller=\App\Modules\Blog\Controllers\HowItWorksController Method=show
DEBUG - 2026-03-06 17:38:25 --> [REQ_ID=07ff034d8d35] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/How-It-Works/Investor-Profile
DEBUG - 2026-03-06 17:38:25 --> [CSRF] token name=csrf_test_name hash=483b1055b9346fe59d15bcb24dfd2354
DEBUG - 2026-03-06 17:38:25 --> [REQ_ID=a04e8a346071] [INIT] App\Modules\Blog\Controllers\HowItWorksController::GET
INFO - 2026-03-06 17:38:25 --> [REQ_ID=a04e8a346071] [MEMORY][controller-start] 6291456
DEBUG - 2026-03-06 17:38:25 --> [REQ_ID=a04e8a346071] [METHOD_ENTRY] show
DEBUG - 2026-03-06 17:38:25 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-06 17:38:25 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-06 17:38:25 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-06 17:38:25 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-06 17:38:25 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-06 17:38:25 --> MyMICoin: guest context detected; skipping user-specific preload.
ERROR - 2026-03-06 17:38:25 --> [ERROR_PAGE] event=error_404 status=404 message=Page not found.
DEBUG - 2026-03-06 17:38:25 --> [REQ_ID=07ff034d8d35] [FILTER_AFTER]
DEBUG - 2026-03-06 17:38:25 --> [REQ_ID=07ff034d8d35] [LIFECYCLE][END] status=404 duration_ms=129.25 memory_delta=0
INFO - 2026-03-06 17:38:25 --> [REQ_ID=a04e8a346071] [PERF] Execution time=0.129005
DEBUG - 2026-03-06 17:38:25 --> [REQ_ID=07ff034d8d35] [REQUEST][END]
INFO - 2026-03-06 17:38:25 --> [REQ_ID=07ff034d8d35] [PERF] Execution time=0.141846
DEBUG - 2026-03-06 17:41:19 --> [REQ_ID=16dd4469bb3b] [REQUEST][START] HEAD /
DEBUG - 2026-03-06 17:41:19 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-06 17:41:19 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-06 17:41:19 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-06 17:41:19 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-06 17:41:19 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
INFO - 2026-03-06 17:45:02 --> [spark:ops:work] Started
INFO - 2026-03-06 17:45:02 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-03-06 17:45:02 --> [SPARK_MEMORY] 16777216
INFO - 2026-03-06 17:45:02 --> [spark:ops:work] Intent
INFO - 2026-03-06 17:45:02 --> [spark:ops:work] Completed
INFO - 2026-03-06 17:45:02 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.298780
INFO - 2026-03-06 17:45:02 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-03-06 17:46:19 --> [REQ_ID=ae22a4f332c4] [REQUEST][START] HEAD /
DEBUG - 2026-03-06 17:46:19 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-06 17:46:19 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-06 17:46:19 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-06 17:46:19 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-06 17:46:19 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-06 17:51:19 --> [REQ_ID=5a91190fe81a] [REQUEST][START] HEAD /
DEBUG - 2026-03-06 17:51:19 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-06 17:51:19 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-06 17:51:19 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-06 17:51:19 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-06 17:51:19 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-06 17:54:44 --> [REQ_ID=c33c965d77bd] [REQUEST][START] GET /index.php/Management/Marketing/Campaigns
DEBUG - 2026-03-06 17:54:44 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-06 17:54:44 --> [REQ_ID=c33c965d77bd] [FILTER_BEFORE] /index.php/Management/Marketing/Campaigns
DEBUG - 2026-03-06 17:54:44 --> [REQ_ID=c33c965d77bd] [ROUTE] Controller=\App\Modules\Management\Controllers\MarketingAdminController Method=campaigns
DEBUG - 2026-03-06 17:54:44 --> [REQ_ID=c33c965d77bd] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Management/Marketing/Campaigns
DEBUG - 2026-03-06 17:54:44 --> [CSRF] token name=csrf_test_name hash=5081c48d11c252dda5618f3c6f914998
DEBUG - 2026-03-06 17:54:44 --> [REQ_ID=c33c965d77bd] [REQUEST][END]
INFO - 2026-03-06 17:54:44 --> [REQ_ID=c33c965d77bd] [PERF] Execution time=0.057817
DEBUG - 2026-03-06 17:54:45 --> [REQ_ID=feb69a2bc80a] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-06 17:54:45 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-06 17:54:45 --> [REQ_ID=feb69a2bc80a] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-06 17:54:45 --> [REQ_ID=feb69a2bc80a] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-06 17:54:45 --> [REQ_ID=feb69a2bc80a] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-06 17:54:45 --> [CSRF] token name=csrf_test_name hash=c1def418358e756659001b85f0f710a7
DEBUG - 2026-03-06 17:54:45 --> [REQ_ID=ecbed2c680e5] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-06 17:54:45 --> [REQ_ID=ecbed2c680e5] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-06 17:54:45 --> [REQ_ID=feb69a2bc80a] [FILTER_AFTER]
DEBUG - 2026-03-06 17:54:45 --> [REQ_ID=feb69a2bc80a] [LIFECYCLE][END] status=200 duration_ms=110.38 memory_delta=0
INFO - 2026-03-06 17:54:45 --> [REQ_ID=ecbed2c680e5] [PERF] Execution time=0.110200
DEBUG - 2026-03-06 17:54:45 --> [REQ_ID=feb69a2bc80a] [REQUEST][END]
INFO - 2026-03-06 17:54:45 --> [REQ_ID=feb69a2bc80a] [PERF] Execution time=0.122026
DEBUG - 2026-03-06 17:56:19 --> [REQ_ID=83a97b9c4c2d] [REQUEST][START] HEAD /
DEBUG - 2026-03-06 17:56:19 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-06 17:56:19 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-06 17:56:19 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-06 17:56:19 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-06 17:56:19 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-06 17:57:29 --> [REQ_ID=f675d62be3ca] [REQUEST][START] GET /
DEBUG - 2026-03-06 17:57:29 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-06 17:57:29 --> [REQ_ID=f675d62be3ca] [FILTER_BEFORE] /
DEBUG - 2026-03-06 17:57:29 --> [REQ_ID=f675d62be3ca] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-06 17:57:29 --> [REQ_ID=f675d62be3ca] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-06 17:57:29 --> [CSRF] token name=csrf_test_name hash=d27ea96ee3ad860fecc9a5c5933fa48c
DEBUG - 2026-03-06 17:57:29 --> [REQ_ID=4b72248a6241] [INIT] App\Controllers\Home::GET
INFO - 2026-03-06 17:57:29 --> [REQ_ID=4b72248a6241] [MEMORY][controller-start] 4194304
INFO - 2026-03-06 17:57:29 --> [REQ_ID=4b72248a6241] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-06 17:57:29 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-06 17:57:30 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-03-06 17:57:30 --> [REQ_ID=4b72248a6241] [VIEW_RENDER] themes/public/home
INFO - 2026-03-06 17:57:30 --> [REQ_ID=4b72248a6241] [MEMORY][commonData:start] 8388608
INFO - 2026-03-06 17:57:30 --> themesMemory usage: 8388608
DEBUG - 2026-03-06 17:57:30 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-06 17:57:30 --> [REQ_ID=f675d62be3ca] [FILTER_AFTER]
DEBUG - 2026-03-06 17:57:30 --> [REQ_ID=f675d62be3ca] [LIFECYCLE][END] status=200 duration_ms=687.36 memory_delta=4194304
INFO - 2026-03-06 17:57:30 --> [REQ_ID=4b72248a6241] [PERF] Execution time=0.685347
DEBUG - 2026-03-06 17:57:30 --> [REQ_ID=f675d62be3ca] [REQUEST][END]
INFO - 2026-03-06 17:57:30 --> [REQ_ID=f675d62be3ca] [PERF] Execution time=0.705733
DEBUG - 2026-03-06 17:57:30 --> [REQ_ID=ecd71b340d3f] [REQUEST][START] POST /
DEBUG - 2026-03-06 17:57:30 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-06 17:57:30 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: POST, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-06 17:57:30 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-06 17:57:30 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-06 17:57:30 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: none
DEBUG - 2026-03-06 17:57:30 --> [REQ_ID=962e24c3751d] [REQUEST][START] POST /
DEBUG - 2026-03-06 17:57:30 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-06 17:57:30 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: POST, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-06 17:57:30 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-06 17:57:30 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-06 17:57:30 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: none
DEBUG - 2026-03-06 17:57:31 --> [REQ_ID=0e06db269008] [REQUEST][START] POST /
DEBUG - 2026-03-06 17:57:31 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-06 17:57:31 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: POST, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-06 17:57:31 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-06 17:57:31 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-06 17:57:31 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: none
DEBUG - 2026-03-06 17:57:53 --> [REQ_ID=820b3bcb4380] [REQUEST][START] HEAD /
DEBUG - 2026-03-06 17:57:53 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-06 17:57:53 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-06 17:57:53 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-06 17:57:53 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-06 17:57:53 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://mymiwallet.com/
INFO - 2026-03-06 18:00:01 --> [SPARK_START] App\Commands\AIOps\Run
INFO - 2026-03-06 18:00:01 --> [SPARK_MEMORY] 16777216
INFO - 2026-03-06 18:00:01 --> [spark:aiops:run] Intent
INFO - 2026-03-06 18:00:01 --> [spark:ops:work] Started
INFO - 2026-03-06 18:00:01 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-03-06 18:00:01 --> [SPARK_MEMORY] 16777216
INFO - 2026-03-06 18:00:01 --> [spark:ops:work] Intent
DEBUG - 2026-03-06 18:00:01 --> [REQ_ID=2b4e90d3c211] [REQUEST][START] GET /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-06 18:00:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
INFO - 2026-03-06 18:00:01 --> [spark:ops:work] Completed
INFO - 2026-03-06 18:00:01 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.116567
INFO - 2026-03-06 18:00:01 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-03-06 18:00:02 --> [REQ_ID=2b4e90d3c211] [FILTER_BEFORE] /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-06 18:00:02 --> [REQ_ID=2b4e90d3c211] [ROUTE] Controller=\App\Modules\Management\Controllers\ManagementAPIController Method=Run_CRON_Tasks
DEBUG - 2026-03-06 18:00:02 --> [REQ_ID=2b4e90d3c211] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-06 18:00:02 --> [REQ_ID=2b4e90d3c211] [REQUEST][END]
INFO - 2026-03-06 18:00:02 --> [REQ_ID=2b4e90d3c211] [PERF] Execution time=0.075411
INFO - 2026-03-06 18:00:03 --> [AIOPS][SPARK][GOVERNANCE][spark:logs:summarize] Started
INFO - 2026-03-06 18:00:03 --> [SPARK_START] App\Commands\Logs\Summarize
INFO - 2026-03-06 18:00:03 --> [SPARK_MEMORY] 16777216
INFO - 2026-03-06 18:00:03 --> [spark:logs:summarize] Intent
INFO - 2026-03-06 18:00:03 --> [AIOPS][SPARK][GOVERNANCE][spark:logs:summarize] Completed
INFO - 2026-03-06 18:00:03 --> [SPARK_COMPLETE] App\Commands\Logs\Summarize duration=0.018290
INFO - 2026-03-06 18:00:03 --> [SPARK_MEMORY] 18874368
INFO - 2026-03-06 18:00:03 --> [spark:app:healthcheck] Started
INFO - 2026-03-06 18:00:03 --> [SPARK_START] App\Commands\App\Healthcheck
INFO - 2026-03-06 18:00:03 --> [SPARK_MEMORY] 16777216
INFO - 2026-03-06 18:00:03 --> [spark:app:healthcheck] Intent
DEBUG - 2026-03-06 18:00:03 --> LOG_HEALTHCHECK debug marker=9a6c3c00a79e
INFO - 2026-03-06 18:00:03 --> LOG_HEALTHCHECK info marker=9a6c3c00a79e
NOTICE - 2026-03-06 18:00:03 --> LOG_HEALTHCHECK probe marker=9a6c3c00a79e
INFO - 2026-03-06 18:00:03 --> [spark:app:healthcheck] Completed
INFO - 2026-03-06 18:00:03 --> [SPARK_COMPLETE] App\Commands\App\Healthcheck duration=0.028823
INFO - 2026-03-06 18:00:03 --> [SPARK_MEMORY] 20971520
DEBUG - 2026-03-06 18:00:04 --> OllamaPatchRunner:L142 - validateGeneratedPatch Content: 
WARNING - 2026-03-06 18:00:04 --> OllamaPatchRunner:L49 - Original Diff: 
DEBUG - 2026-03-06 18:00:05 --> OllamaPatchRunner:L51 - Retried Diff: 
DEBUG - 2026-03-06 18:00:05 --> OllamaPatchRunner:L142 - validateGeneratedPatch Content: 
DEBUG - 2026-03-06 18:00:05 --> OllamaPatchRunner:L53 - Validating Generated Patch Failed
INFO - 2026-03-06 18:00:05 --> [SPARK_COMPLETE] App\Commands\AIOps\Run duration=3.643984
INFO - 2026-03-06 18:00:05 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-03-06 18:01:19 --> [REQ_ID=4f74dc8a3b81] [REQUEST][START] HEAD /
DEBUG - 2026-03-06 18:01:19 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-06 18:01:19 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-06 18:01:19 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-06 18:01:19 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-06 18:01:19 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-06 18:05:13 --> [REQ_ID=4ab7e3e367ba] [REQUEST][START] GET /
DEBUG - 2026-03-06 18:05:13 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-06 18:05:13 --> [REQ_ID=4ab7e3e367ba] [FILTER_BEFORE] /
DEBUG - 2026-03-06 18:05:13 --> [REQ_ID=4ab7e3e367ba] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-06 18:05:13 --> [REQ_ID=4ab7e3e367ba] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-06 18:05:13 --> [CSRF] token name=csrf_test_name hash=4270a028fb459a56aba94f9bdb63c8ec
DEBUG - 2026-03-06 18:05:13 --> [REQ_ID=21159d235819] [INIT] App\Controllers\Home::GET
INFO - 2026-03-06 18:05:13 --> [REQ_ID=21159d235819] [MEMORY][controller-start] 6291456
INFO - 2026-03-06 18:05:13 --> [REQ_ID=21159d235819] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-06 18:05:13 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-06 18:05:14 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
DEBUG - 2026-03-06 18:05:14 --> [REQ_ID=21159d235819] [VIEW_RENDER] themes/public/home
INFO - 2026-03-06 18:05:14 --> [REQ_ID=21159d235819] [MEMORY][commonData:start] 10485760
INFO - 2026-03-06 18:05:14 --> themesMemory usage: 10485760
DEBUG - 2026-03-06 18:05:14 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-06 18:05:14 --> [REQ_ID=4ab7e3e367ba] [FILTER_AFTER]
DEBUG - 2026-03-06 18:05:14 --> [REQ_ID=4ab7e3e367ba] [LIFECYCLE][END] status=200 duration_ms=965.50 memory_delta=4194304
INFO - 2026-03-06 18:05:14 --> [REQ_ID=21159d235819] [PERF] Execution time=0.963529
DEBUG - 2026-03-06 18:05:14 --> [REQ_ID=4ab7e3e367ba] [REQUEST][END]
INFO - 2026-03-06 18:05:14 --> [REQ_ID=4ab7e3e367ba] [PERF] Execution time=1.004945
DEBUG - 2026-03-06 18:06:19 --> [REQ_ID=592112bbcc40] [REQUEST][START] HEAD /
DEBUG - 2026-03-06 18:06:19 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-06 18:06:19 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-06 18:06:19 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-06 18:06:19 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-06 18:06:19 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-06 18:08:17 --> [REQ_ID=43e1e9f3ab0f] [REQUEST][START] GET /index.php/Investments/Watchlist
DEBUG - 2026-03-06 18:08:17 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-06 18:08:17 --> [REQ_ID=43e1e9f3ab0f] [FILTER_BEFORE] /index.php/Investments/Watchlist
DEBUG - 2026-03-06 18:08:17 --> [REQ_ID=43e1e9f3ab0f] [ROUTE] Controller=\App\Modules\User\Controllers\InvestmentsController Method=watchlist
DEBUG - 2026-03-06 18:08:17 --> [REQ_ID=43e1e9f3ab0f] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Investments/Watchlist
DEBUG - 2026-03-06 18:08:17 --> [CSRF] token name=csrf_test_name hash=7d41b3eb95b974642205154a466d23cc
DEBUG - 2026-03-06 18:08:17 --> [REQ_ID=43e1e9f3ab0f] [REQUEST][END]
INFO - 2026-03-06 18:08:17 --> [REQ_ID=43e1e9f3ab0f] [PERF] Execution time=0.056164
DEBUG - 2026-03-06 18:08:18 --> [REQ_ID=a58dcea042e3] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-06 18:08:18 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-06 18:08:18 --> [REQ_ID=a58dcea042e3] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-06 18:08:18 --> [REQ_ID=a58dcea042e3] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-06 18:08:18 --> [REQ_ID=a58dcea042e3] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-06 18:08:18 --> [CSRF] token name=csrf_test_name hash=7a680fe4443cc858fb5d161491939c77
DEBUG - 2026-03-06 18:08:18 --> [REQ_ID=9a814bbe7cb7] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-06 18:08:18 --> [REQ_ID=9a814bbe7cb7] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-06 18:08:18 --> [REQ_ID=a58dcea042e3] [FILTER_AFTER]
DEBUG - 2026-03-06 18:08:18 --> [REQ_ID=a58dcea042e3] [LIFECYCLE][END] status=200 duration_ms=171.68 memory_delta=0
INFO - 2026-03-06 18:08:18 --> [REQ_ID=9a814bbe7cb7] [PERF] Execution time=0.171432
DEBUG - 2026-03-06 18:08:18 --> [REQ_ID=a58dcea042e3] [REQUEST][END]
INFO - 2026-03-06 18:08:18 --> [REQ_ID=a58dcea042e3] [PERF] Execution time=0.183896
DEBUG - 2026-03-06 18:10:04 --> [REQ_ID=7ff9358613f0] [REQUEST][START] GET /
DEBUG - 2026-03-06 18:10:04 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-06 18:10:04 --> [REQ_ID=7ff9358613f0] [FILTER_BEFORE] /
DEBUG - 2026-03-06 18:10:04 --> [REQ_ID=7ff9358613f0] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-06 18:10:04 --> [REQ_ID=7ff9358613f0] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-06 18:10:04 --> [CSRF] token name=csrf_test_name hash=1385e5ad594dbb747a527ce4ab89e2ca
DEBUG - 2026-03-06 18:10:04 --> [REQ_ID=65aa0bb71c4f] [INIT] App\Controllers\Home::GET
INFO - 2026-03-06 18:10:04 --> [REQ_ID=65aa0bb71c4f] [MEMORY][controller-start] 6291456
INFO - 2026-03-06 18:10:04 --> [REQ_ID=65aa0bb71c4f] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-06 18:10:04 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-06 18:10:05 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
DEBUG - 2026-03-06 18:10:05 --> [REQ_ID=65aa0bb71c4f] [VIEW_RENDER] themes/public/home
INFO - 2026-03-06 18:10:05 --> [REQ_ID=65aa0bb71c4f] [MEMORY][commonData:start] 10485760
INFO - 2026-03-06 18:10:05 --> themesMemory usage: 10485760
DEBUG - 2026-03-06 18:10:05 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-06 18:10:05 --> [REQ_ID=7ff9358613f0] [FILTER_AFTER]
DEBUG - 2026-03-06 18:10:05 --> [REQ_ID=7ff9358613f0] [LIFECYCLE][END] status=200 duration_ms=538.23 memory_delta=4194304
INFO - 2026-03-06 18:10:05 --> [REQ_ID=65aa0bb71c4f] [PERF] Execution time=0.536096
DEBUG - 2026-03-06 18:10:05 --> [REQ_ID=7ff9358613f0] [REQUEST][END]
INFO - 2026-03-06 18:10:05 --> [REQ_ID=7ff9358613f0] [PERF] Execution time=0.576709
DEBUG - 2026-03-06 18:11:19 --> [REQ_ID=539bb6d15bee] [REQUEST][START] HEAD /
DEBUG - 2026-03-06 18:11:19 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-06 18:11:19 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-06 18:11:19 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-06 18:11:19 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-06 18:11:19 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
INFO - 2026-03-06 18:15:01 --> [spark:ops:work] Started
INFO - 2026-03-06 18:15:01 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-03-06 18:15:01 --> [SPARK_MEMORY] 16777216
INFO - 2026-03-06 18:15:01 --> [spark:ops:work] Intent
DEBUG - 2026-03-06 18:15:01 --> [REQ_ID=30d3bee13aaf] [REQUEST][START] GET /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-06 18:15:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-06 18:15:01 --> [REQ_ID=30d3bee13aaf] [FILTER_BEFORE] /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-06 18:15:01 --> [REQ_ID=30d3bee13aaf] [ROUTE] Controller=\App\Modules\APIs\Controllers\AlertsAPIController Method=fetchEmailAlerts
DEBUG - 2026-03-06 18:15:01 --> [REQ_ID=30d3bee13aaf] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-06 18:15:01 --> [REQ_ID=30d3bee13aaf] [REQUEST][END]
INFO - 2026-03-06 18:15:01 --> [REQ_ID=30d3bee13aaf] [PERF] Execution time=0.065343
INFO - 2026-03-06 18:15:01 --> [spark:ops:work] Completed
INFO - 2026-03-06 18:15:01 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.233364
INFO - 2026-03-06 18:15:01 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-03-06 18:16:19 --> [REQ_ID=3e883a9a4b9a] [REQUEST][START] GET /index.php/Privacy-Policy
DEBUG - 2026-03-06 18:16:19 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-06 18:16:19 --> [REQ_ID=3e883a9a4b9a] [FILTER_BEFORE] /index.php/Privacy-Policy
DEBUG - 2026-03-06 18:16:19 --> [REQ_ID=3e883a9a4b9a] [ROUTE] Controller=\App\Controllers\Home Method=privacyPolicy
DEBUG - 2026-03-06 18:16:19 --> [REQ_ID=3e883a9a4b9a] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Privacy-Policy
DEBUG - 2026-03-06 18:16:19 --> [CSRF] token name=csrf_test_name hash=da7f38b29e15534999063387a8857afa
DEBUG - 2026-03-06 18:16:19 --> [REQ_ID=909dede60d0d] [INIT] App\Controllers\Home::GET
INFO - 2026-03-06 18:16:19 --> [REQ_ID=909dede60d0d] [MEMORY][controller-start] 6291456
INFO - 2026-03-06 18:16:19 --> [REQ_ID=909dede60d0d] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-06 18:16:19 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-06 18:16:19 --> [MetaService] slug=privacy-policy pageName= cacheHit= path=DB
DEBUG - 2026-03-06 18:16:19 --> [REQ_ID=909dede60d0d] [VIEW_RENDER] themes/public/privacyPolicy
INFO - 2026-03-06 18:16:19 --> [REQ_ID=909dede60d0d] [MEMORY][commonData:start] 10485760
INFO - 2026-03-06 18:16:19 --> themesMemory usage: 10485760
DEBUG - 2026-03-06 18:16:19 --> [MetaService] slug=privacy-policy pageName=Privacy Policy cacheHit= path=DB
DEBUG - 2026-03-06 18:16:19 --> [REQ_ID=3e883a9a4b9a] [FILTER_AFTER]
DEBUG - 2026-03-06 18:16:19 --> [REQ_ID=3e883a9a4b9a] [LIFECYCLE][END] status=200 duration_ms=603.38 memory_delta=4194304
INFO - 2026-03-06 18:16:19 --> [REQ_ID=909dede60d0d] [PERF] Execution time=0.601386
DEBUG - 2026-03-06 18:16:19 --> [REQ_ID=3e883a9a4b9a] [REQUEST][END]
INFO - 2026-03-06 18:16:19 --> [REQ_ID=3e883a9a4b9a] [PERF] Execution time=0.642515
DEBUG - 2026-03-06 18:16:20 --> [REQ_ID=f894bbed82bf] [REQUEST][START] HEAD /
DEBUG - 2026-03-06 18:16:20 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-06 18:16:20 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-06 18:16:20 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-06 18:16:20 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-06 18:16:20 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-06 18:21:19 --> [REQ_ID=7a6835e0c069] [REQUEST][START] HEAD /
DEBUG - 2026-03-06 18:21:19 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-06 18:21:19 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-06 18:21:19 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-06 18:21:19 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-06 18:21:19 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-06 18:26:19 --> [REQ_ID=3a3993df3f64] [REQUEST][START] HEAD /
DEBUG - 2026-03-06 18:26:19 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-06 18:26:19 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-06 18:26:19 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-06 18:26:19 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-06 18:26:19 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
INFO - 2026-03-06 18:30:01 --> [spark:ops:work] Started
INFO - 2026-03-06 18:30:01 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-03-06 18:30:01 --> [SPARK_MEMORY] 16777216
INFO - 2026-03-06 18:30:01 --> [spark:ops:work] Intent
INFO - 2026-03-06 18:30:01 --> [spark:ops:work] Completed
INFO - 2026-03-06 18:30:01 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.046912
INFO - 2026-03-06 18:30:01 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-03-06 18:30:54 --> [REQ_ID=9a8c5d8f6cb6] [REQUEST][START] GET /index.php/Management/Wallets
DEBUG - 2026-03-06 18:30:54 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-06 18:30:54 --> [REQ_ID=9a8c5d8f6cb6] [FILTER_BEFORE] /index.php/Management/Wallets
DEBUG - 2026-03-06 18:30:54 --> [REQ_ID=9a8c5d8f6cb6] [ROUTE] Controller=\App\Modules\Management\Controllers\WalletsController Method=index
DEBUG - 2026-03-06 18:30:54 --> [REQ_ID=9a8c5d8f6cb6] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Management/Wallets
DEBUG - 2026-03-06 18:30:54 --> [CSRF] token name=csrf_test_name hash=9de1c3e07cd4913bdea18bf32dd45b19
DEBUG - 2026-03-06 18:30:54 --> [REQ_ID=9a8c5d8f6cb6] [REQUEST][END]
INFO - 2026-03-06 18:30:54 --> [REQ_ID=9a8c5d8f6cb6] [PERF] Execution time=0.048108
DEBUG - 2026-03-06 18:30:55 --> [REQ_ID=b6e7cb4c90a2] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-06 18:30:55 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-06 18:30:55 --> [REQ_ID=b6e7cb4c90a2] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-06 18:30:55 --> [REQ_ID=b6e7cb4c90a2] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-06 18:30:55 --> [REQ_ID=b6e7cb4c90a2] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-06 18:30:55 --> [CSRF] token name=csrf_test_name hash=428b7bcbf338534166c6a0d71e348f36
DEBUG - 2026-03-06 18:30:55 --> [REQ_ID=4f9985af8617] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-06 18:30:55 --> [REQ_ID=4f9985af8617] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-06 18:30:55 --> [REQ_ID=b6e7cb4c90a2] [FILTER_AFTER]
DEBUG - 2026-03-06 18:30:55 --> [REQ_ID=b6e7cb4c90a2] [LIFECYCLE][END] status=200 duration_ms=110.33 memory_delta=0
INFO - 2026-03-06 18:30:55 --> [REQ_ID=4f9985af8617] [PERF] Execution time=0.110074
DEBUG - 2026-03-06 18:30:55 --> [REQ_ID=b6e7cb4c90a2] [REQUEST][END]
INFO - 2026-03-06 18:30:55 --> [REQ_ID=b6e7cb4c90a2] [PERF] Execution time=0.125399
DEBUG - 2026-03-06 18:31:19 --> [REQ_ID=5f6cc2792733] [REQUEST][START] HEAD /
DEBUG - 2026-03-06 18:31:19 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-06 18:31:19 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-06 18:31:19 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-06 18:31:19 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-06 18:31:19 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-06 18:31:38 --> [REQ_ID=295deb37f2fa] [REQUEST][START] GET /index.php/Purchase/MyMIGold
DEBUG - 2026-03-06 18:31:38 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-06 18:31:38 --> [REQ_ID=295deb37f2fa] [FILTER_BEFORE] /index.php/Purchase/MyMIGold
DEBUG - 2026-03-06 18:31:38 --> [REQ_ID=295deb37f2fa] [ROUTE] Controller=closure_route Method=index
DEBUG - 2026-03-06 18:31:38 --> [REQ_ID=295deb37f2fa] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Purchase/MyMIGold
DEBUG - 2026-03-06 18:31:38 --> [CSRF] token name=csrf_test_name hash=49021cba2b5aa3427f46601c8a7baeae
DEBUG - 2026-03-06 18:31:38 --> [REQ_ID=295deb37f2fa] [REQUEST][END]
INFO - 2026-03-06 18:31:38 --> [REQ_ID=295deb37f2fa] [PERF] Execution time=0.010619
DEBUG - 2026-03-06 18:31:39 --> [REQ_ID=f99effbf3d59] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-06 18:31:39 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-06 18:31:39 --> [REQ_ID=f99effbf3d59] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-06 18:31:39 --> [REQ_ID=f99effbf3d59] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-06 18:31:39 --> [REQ_ID=f99effbf3d59] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-06 18:31:39 --> [CSRF] token name=csrf_test_name hash=e38904706624604ed14d52666f60e0da
DEBUG - 2026-03-06 18:31:39 --> [REQ_ID=3e8d18c8286f] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-06 18:31:39 --> [REQ_ID=3e8d18c8286f] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-06 18:31:39 --> [REQ_ID=f99effbf3d59] [FILTER_AFTER]
DEBUG - 2026-03-06 18:31:39 --> [REQ_ID=f99effbf3d59] [LIFECYCLE][END] status=200 duration_ms=37.87 memory_delta=0
INFO - 2026-03-06 18:31:39 --> [REQ_ID=3e8d18c8286f] [PERF] Execution time=0.037675
DEBUG - 2026-03-06 18:31:39 --> [REQ_ID=f99effbf3d59] [REQUEST][END]
INFO - 2026-03-06 18:31:39 --> [REQ_ID=f99effbf3d59] [PERF] Execution time=0.046654
DEBUG - 2026-03-06 18:36:19 --> [REQ_ID=0f65d4a24f42] [REQUEST][START] HEAD /
DEBUG - 2026-03-06 18:36:19 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-06 18:36:19 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-06 18:36:19 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-06 18:36:19 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-06 18:36:19 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-06 18:41:19 --> [REQ_ID=cc1c8b59a8b8] [REQUEST][START] HEAD /
DEBUG - 2026-03-06 18:41:19 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-06 18:41:19 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-06 18:41:19 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-06 18:41:19 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-06 18:41:19 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
INFO - 2026-03-06 18:45:02 --> [spark:ops:work] Started
INFO - 2026-03-06 18:45:02 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-03-06 18:45:02 --> [SPARK_MEMORY] 16777216
INFO - 2026-03-06 18:45:02 --> [spark:ops:work] Intent
INFO - 2026-03-06 18:45:02 --> [spark:ops:work] Completed
INFO - 2026-03-06 18:45:02 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.048755
INFO - 2026-03-06 18:45:02 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-03-06 18:46:19 --> [REQ_ID=fcbc8e8a8583] [REQUEST][START] HEAD /
DEBUG - 2026-03-06 18:46:19 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-06 18:46:19 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-06 18:46:19 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-06 18:46:19 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-06 18:46:19 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-06 18:49:58 --> [REQ_ID=2b94703e0100] [REQUEST][START] GET /
DEBUG - 2026-03-06 18:49:58 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-06 18:49:59 --> [REQ_ID=2b94703e0100] [FILTER_BEFORE] /
DEBUG - 2026-03-06 18:49:59 --> [REQ_ID=2b94703e0100] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-06 18:49:59 --> [REQ_ID=2b94703e0100] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-06 18:49:59 --> [CSRF] token name=csrf_test_name hash=0dd6dfad77fad4abbd92b495606959df
DEBUG - 2026-03-06 18:49:59 --> [REQ_ID=091bdeec94bf] [INIT] App\Controllers\Home::GET
INFO - 2026-03-06 18:49:59 --> [REQ_ID=091bdeec94bf] [MEMORY][controller-start] 6291456
INFO - 2026-03-06 18:49:59 --> [REQ_ID=091bdeec94bf] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-06 18:49:59 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-06 18:49:59 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-03-06 18:49:59 --> [REQ_ID=091bdeec94bf] [VIEW_RENDER] themes/public/home
INFO - 2026-03-06 18:49:59 --> [REQ_ID=091bdeec94bf] [MEMORY][commonData:start] 10485760
INFO - 2026-03-06 18:49:59 --> themesMemory usage: 10485760
DEBUG - 2026-03-06 18:49:59 --> [MetaService] slug= pageName=Home cacheHit= path=DB
DEBUG - 2026-03-06 18:49:59 --> [REQ_ID=2b94703e0100] [FILTER_AFTER]
DEBUG - 2026-03-06 18:49:59 --> [REQ_ID=2b94703e0100] [LIFECYCLE][END] status=200 duration_ms=794.62 memory_delta=4194304
INFO - 2026-03-06 18:49:59 --> [REQ_ID=091bdeec94bf] [PERF] Execution time=0.792520
DEBUG - 2026-03-06 18:49:59 --> [REQ_ID=2b94703e0100] [REQUEST][END]
INFO - 2026-03-06 18:49:59 --> [REQ_ID=2b94703e0100] [PERF] Execution time=0.834783
DEBUG - 2026-03-06 18:50:33 --> [REQ_ID=bb6d391e84ae] [REQUEST][START] GET /index.php
DEBUG - 2026-03-06 18:50:33 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-06 18:50:33 --> [REQ_ID=bb6d391e84ae] [FILTER_BEFORE] /index.php
DEBUG - 2026-03-06 18:50:33 --> [REQ_ID=bb6d391e84ae] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-06 18:50:33 --> [REQ_ID=bb6d391e84ae] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-06 18:50:33 --> [CSRF] token name=csrf_test_name hash=9914d4d3c554f49a4402c68d2f6e059a
DEBUG - 2026-03-06 18:50:33 --> [REQ_ID=2b44a6e6acfa] [INIT] App\Controllers\Home::GET
INFO - 2026-03-06 18:50:33 --> [REQ_ID=2b44a6e6acfa] [MEMORY][controller-start] 6291456
INFO - 2026-03-06 18:50:33 --> [REQ_ID=2b44a6e6acfa] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-06 18:50:33 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-06 18:50:33 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
DEBUG - 2026-03-06 18:50:33 --> [REQ_ID=2b44a6e6acfa] [VIEW_RENDER] themes/public/home
INFO - 2026-03-06 18:50:33 --> [REQ_ID=2b44a6e6acfa] [MEMORY][commonData:start] 8388608
INFO - 2026-03-06 18:50:33 --> themesMemory usage: 8388608
DEBUG - 2026-03-06 18:50:33 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-06 18:50:33 --> [REQ_ID=bb6d391e84ae] [FILTER_AFTER]
DEBUG - 2026-03-06 18:50:33 --> [REQ_ID=bb6d391e84ae] [LIFECYCLE][END] status=200 duration_ms=608.87 memory_delta=2097152
INFO - 2026-03-06 18:50:33 --> [REQ_ID=2b44a6e6acfa] [PERF] Execution time=0.608514
DEBUG - 2026-03-06 18:50:33 --> [REQ_ID=bb6d391e84ae] [REQUEST][END]
INFO - 2026-03-06 18:50:33 --> [REQ_ID=bb6d391e84ae] [PERF] Execution time=0.618801
DEBUG - 2026-03-06 18:50:43 --> [REQ_ID=1bf1c9464160] [REQUEST][START] GET /index.php
DEBUG - 2026-03-06 18:50:43 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-06 18:50:43 --> [REQ_ID=1bf1c9464160] [FILTER_BEFORE] /index.php
DEBUG - 2026-03-06 18:50:43 --> [REQ_ID=1bf1c9464160] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-06 18:50:43 --> [REQ_ID=1bf1c9464160] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-06 18:50:43 --> [CSRF] token name=csrf_test_name hash=57ea1e428d9f33ba434a6c1189f2006c
DEBUG - 2026-03-06 18:50:43 --> [REQ_ID=64d03144306f] [INIT] App\Controllers\Home::GET
INFO - 2026-03-06 18:50:43 --> [REQ_ID=64d03144306f] [MEMORY][controller-start] 6291456
INFO - 2026-03-06 18:50:44 --> [REQ_ID=64d03144306f] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-06 18:50:44 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-06 18:50:44 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
DEBUG - 2026-03-06 18:50:44 --> [REQ_ID=64d03144306f] [VIEW_RENDER] themes/public/home
INFO - 2026-03-06 18:50:44 --> [REQ_ID=64d03144306f] [MEMORY][commonData:start] 8388608
INFO - 2026-03-06 18:50:44 --> themesMemory usage: 8388608
DEBUG - 2026-03-06 18:50:44 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-06 18:50:44 --> [REQ_ID=1bf1c9464160] [FILTER_AFTER]
DEBUG - 2026-03-06 18:50:44 --> [REQ_ID=1bf1c9464160] [LIFECYCLE][END] status=200 duration_ms=671.94 memory_delta=2097152
INFO - 2026-03-06 18:50:44 --> [REQ_ID=64d03144306f] [PERF] Execution time=0.671661
DEBUG - 2026-03-06 18:50:44 --> [REQ_ID=1bf1c9464160] [REQUEST][END]
INFO - 2026-03-06 18:50:44 --> [REQ_ID=1bf1c9464160] [PERF] Execution time=0.681036
DEBUG - 2026-03-06 18:50:54 --> [REQ_ID=80cbd681208f] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-06 18:50:54 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-06 18:50:54 --> [REQ_ID=80cbd681208f] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-06 18:50:54 --> [REQ_ID=80cbd681208f] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-06 18:50:54 --> [REQ_ID=80cbd681208f] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-06 18:50:54 --> [CSRF] token name=csrf_test_name hash=9e12c6358906ae1dd71ece5ac56470f5
DEBUG - 2026-03-06 18:50:54 --> [REQ_ID=89e0700cbf95] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-06 18:50:54 --> [REQ_ID=89e0700cbf95] [MEMORY][controller-start] 6291456
DEBUG - 2026-03-06 18:50:54 --> [REQ_ID=80cbd681208f] [FILTER_AFTER]
DEBUG - 2026-03-06 18:50:54 --> [REQ_ID=80cbd681208f] [LIFECYCLE][END] status=200 duration_ms=33.87 memory_delta=0
INFO - 2026-03-06 18:50:54 --> [REQ_ID=89e0700cbf95] [PERF] Execution time=0.033339
DEBUG - 2026-03-06 18:50:54 --> [REQ_ID=80cbd681208f] [REQUEST][END]
INFO - 2026-03-06 18:50:54 --> [REQ_ID=80cbd681208f] [PERF] Execution time=0.046627
DEBUG - 2026-03-06 18:50:55 --> [REQ_ID=4cf10026f9ec] [REQUEST][START] GET /index.php/How-It-Works
DEBUG - 2026-03-06 18:50:55 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-06 18:50:55 --> [REQ_ID=4cf10026f9ec] [FILTER_BEFORE] /index.php/How-It-Works
DEBUG - 2026-03-06 18:50:55 --> [REQ_ID=4cf10026f9ec] [ROUTE] Controller=\App\Modules\Blog\Controllers\HowItWorksController Method=index
DEBUG - 2026-03-06 18:50:55 --> [REQ_ID=4cf10026f9ec] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/How-It-Works
DEBUG - 2026-03-06 18:50:55 --> [CSRF] token name=csrf_test_name hash=d54fa03abc520e7ce9648668bae8d74f
DEBUG - 2026-03-06 18:50:55 --> [REQ_ID=960c405e75f3] [INIT] App\Modules\Blog\Controllers\HowItWorksController::GET
INFO - 2026-03-06 18:50:55 --> [REQ_ID=960c405e75f3] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-06 18:50:55 --> [REQ_ID=960c405e75f3] [METHOD_ENTRY] index
DEBUG - 2026-03-06 18:50:55 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-06 18:50:55 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-06 18:50:55 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-06 18:50:55 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-06 18:50:55 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-06 18:50:55 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-06 18:50:55 --> [REQ_ID=960c405e75f3] [VIEW_RENDER] App\Modules\Blog\Views\HowItWorks\index
INFO - 2026-03-06 18:50:55 --> [REQ_ID=960c405e75f3] [MEMORY][commonData:start] 4194304
DEBUG - 2026-03-06 18:50:55 --> [MetaService] slug=how-it-works pageName= cacheHit= path=DB
INFO - 2026-03-06 18:50:55 --> themesMemory usage: 8388608
DEBUG - 2026-03-06 18:50:55 --> [MetaService] slug=how-it-works pageName= cacheHit=1 path=CACHE
DEBUG - 2026-03-06 18:50:55 --> [REQ_ID=4cf10026f9ec] [FILTER_AFTER]
DEBUG - 2026-03-06 18:50:55 --> [REQ_ID=4cf10026f9ec] [LIFECYCLE][END] status=200 duration_ms=548.75 memory_delta=4194304
INFO - 2026-03-06 18:50:55 --> [REQ_ID=960c405e75f3] [PERF] Execution time=0.548497
DEBUG - 2026-03-06 18:50:55 --> [REQ_ID=4cf10026f9ec] [REQUEST][END]
INFO - 2026-03-06 18:50:55 --> [REQ_ID=4cf10026f9ec] [PERF] Execution time=0.561407
DEBUG - 2026-03-06 18:51:00 --> [REQ_ID=08039ee8d668] [REQUEST][START] GET /index.php
DEBUG - 2026-03-06 18:51:00 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-06 18:51:00 --> [REQ_ID=08039ee8d668] [FILTER_BEFORE] /index.php
DEBUG - 2026-03-06 18:51:00 --> [REQ_ID=08039ee8d668] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-06 18:51:00 --> [REQ_ID=08039ee8d668] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-06 18:51:00 --> [CSRF] token name=csrf_test_name hash=ad0d71dd2702b8d14f04e9e6569c9f93
DEBUG - 2026-03-06 18:51:00 --> [REQ_ID=dac10f4d261d] [INIT] App\Controllers\Home::GET
INFO - 2026-03-06 18:51:00 --> [REQ_ID=dac10f4d261d] [MEMORY][controller-start] 6291456
INFO - 2026-03-06 18:51:00 --> [REQ_ID=dac10f4d261d] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-06 18:51:00 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-06 18:51:00 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
DEBUG - 2026-03-06 18:51:00 --> [REQ_ID=dac10f4d261d] [VIEW_RENDER] themes/public/home
INFO - 2026-03-06 18:51:00 --> [REQ_ID=dac10f4d261d] [MEMORY][commonData:start] 8388608
INFO - 2026-03-06 18:51:00 --> themesMemory usage: 8388608
DEBUG - 2026-03-06 18:51:00 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-06 18:51:00 --> [REQ_ID=08039ee8d668] [FILTER_AFTER]
DEBUG - 2026-03-06 18:51:00 --> [REQ_ID=08039ee8d668] [LIFECYCLE][END] status=200 duration_ms=526.54 memory_delta=2097152
INFO - 2026-03-06 18:51:00 --> [REQ_ID=dac10f4d261d] [PERF] Execution time=0.526192
DEBUG - 2026-03-06 18:51:00 --> [REQ_ID=08039ee8d668] [REQUEST][END]
INFO - 2026-03-06 18:51:00 --> [REQ_ID=08039ee8d668] [PERF] Execution time=0.536399
DEBUG - 2026-03-06 18:51:01 --> [REQ_ID=6cc2f38a7155] [REQUEST][START] GET /index.php/How-It-Works
DEBUG - 2026-03-06 18:51:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-06 18:51:01 --> [REQ_ID=6cc2f38a7155] [FILTER_BEFORE] /index.php/How-It-Works
DEBUG - 2026-03-06 18:51:01 --> [REQ_ID=6cc2f38a7155] [ROUTE] Controller=\App\Modules\Blog\Controllers\HowItWorksController Method=index
DEBUG - 2026-03-06 18:51:01 --> [REQ_ID=6cc2f38a7155] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/How-It-Works
DEBUG - 2026-03-06 18:51:01 --> [CSRF] token name=csrf_test_name hash=cfd62f9f7e3a180c8f202f887556573d
DEBUG - 2026-03-06 18:51:01 --> [REQ_ID=95b9a38be1a5] [INIT] App\Modules\Blog\Controllers\HowItWorksController::GET
INFO - 2026-03-06 18:51:01 --> [REQ_ID=95b9a38be1a5] [MEMORY][controller-start] 6291456
DEBUG - 2026-03-06 18:51:01 --> [REQ_ID=95b9a38be1a5] [METHOD_ENTRY] index
DEBUG - 2026-03-06 18:51:01 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-06 18:51:01 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-06 18:51:01 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-06 18:51:01 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-06 18:51:01 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-06 18:51:01 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-06 18:51:01 --> [REQ_ID=95b9a38be1a5] [VIEW_RENDER] App\Modules\Blog\Views\HowItWorks\index
INFO - 2026-03-06 18:51:01 --> [REQ_ID=95b9a38be1a5] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-06 18:51:02 --> [MetaService] slug=how-it-works pageName= cacheHit=1 path=CACHE
INFO - 2026-03-06 18:51:02 --> themesMemory usage: 8388608
DEBUG - 2026-03-06 18:51:02 --> [MetaService] slug=how-it-works pageName= cacheHit=1 path=CACHE
DEBUG - 2026-03-06 18:51:02 --> [REQ_ID=6cc2f38a7155] [FILTER_AFTER]
DEBUG - 2026-03-06 18:51:02 --> [REQ_ID=6cc2f38a7155] [LIFECYCLE][END] status=200 duration_ms=577.39 memory_delta=2097152
INFO - 2026-03-06 18:51:02 --> [REQ_ID=95b9a38be1a5] [PERF] Execution time=0.577308
DEBUG - 2026-03-06 18:51:02 --> [REQ_ID=6cc2f38a7155] [REQUEST][END]
INFO - 2026-03-06 18:51:02 --> [REQ_ID=6cc2f38a7155] [PERF] Execution time=0.586850
DEBUG - 2026-03-06 18:51:09 --> [REQ_ID=ff794ba7286b] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-06 18:51:09 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-06 18:51:09 --> [REQ_ID=ff794ba7286b] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-06 18:51:09 --> [REQ_ID=ff794ba7286b] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-06 18:51:09 --> [REQ_ID=ff794ba7286b] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-06 18:51:09 --> [CSRF] token name=csrf_test_name hash=bbd7be2ee7ef7f4f0be47e879fdc667f
DEBUG - 2026-03-06 18:51:09 --> [REQ_ID=c71a2de928b0] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-06 18:51:09 --> [REQ_ID=c71a2de928b0] [MEMORY][controller-start] 6291456
DEBUG - 2026-03-06 18:51:09 --> [REQ_ID=ff794ba7286b] [FILTER_AFTER]
DEBUG - 2026-03-06 18:51:09 --> [REQ_ID=ff794ba7286b] [LIFECYCLE][END] status=200 duration_ms=98.15 memory_delta=0
INFO - 2026-03-06 18:51:09 --> [REQ_ID=c71a2de928b0] [PERF] Execution time=0.098074
DEBUG - 2026-03-06 18:51:09 --> [REQ_ID=ff794ba7286b] [REQUEST][END]
INFO - 2026-03-06 18:51:09 --> [REQ_ID=ff794ba7286b] [PERF] Execution time=0.108212
DEBUG - 2026-03-06 18:51:17 --> [REQ_ID=e41f0d531bb0] [REQUEST][START] GET /index.php
DEBUG - 2026-03-06 18:51:18 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-06 18:51:18 --> [REQ_ID=e41f0d531bb0] [FILTER_BEFORE] /index.php
DEBUG - 2026-03-06 18:51:18 --> [REQ_ID=e41f0d531bb0] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-06 18:51:18 --> [REQ_ID=e41f0d531bb0] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-06 18:51:18 --> [CSRF] token name=csrf_test_name hash=2b002f9d22af9f39ba17dade70e3f448
DEBUG - 2026-03-06 18:51:18 --> [REQ_ID=49b71d2c8026] [INIT] App\Controllers\Home::GET
INFO - 2026-03-06 18:51:18 --> [REQ_ID=49b71d2c8026] [MEMORY][controller-start] 6291456
INFO - 2026-03-06 18:51:18 --> [REQ_ID=49b71d2c8026] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-06 18:51:18 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-06 18:51:18 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
DEBUG - 2026-03-06 18:51:18 --> [REQ_ID=49b71d2c8026] [VIEW_RENDER] themes/public/home
INFO - 2026-03-06 18:51:18 --> [REQ_ID=49b71d2c8026] [MEMORY][commonData:start] 8388608
INFO - 2026-03-06 18:51:18 --> themesMemory usage: 8388608
DEBUG - 2026-03-06 18:51:18 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-06 18:51:18 --> [REQ_ID=e41f0d531bb0] [FILTER_AFTER]
DEBUG - 2026-03-06 18:51:18 --> [REQ_ID=e41f0d531bb0] [LIFECYCLE][END] status=200 duration_ms=759.73 memory_delta=2097152
INFO - 2026-03-06 18:51:18 --> [REQ_ID=49b71d2c8026] [PERF] Execution time=0.759363
DEBUG - 2026-03-06 18:51:18 --> [REQ_ID=e41f0d531bb0] [REQUEST][END]
INFO - 2026-03-06 18:51:18 --> [REQ_ID=e41f0d531bb0] [PERF] Execution time=0.908895
DEBUG - 2026-03-06 18:51:18 --> [REQ_ID=78bd2be4f1a2] [REQUEST][START] GET /index.php/Knowledgebase
DEBUG - 2026-03-06 18:51:18 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-06 18:51:18 --> [REQ_ID=78bd2be4f1a2] [FILTER_BEFORE] /index.php/Knowledgebase
DEBUG - 2026-03-06 18:51:18 --> [REQ_ID=78bd2be4f1a2] [ROUTE] Controller=\App\Modules\User\Controllers\KnowledgebaseController Method=index
DEBUG - 2026-03-06 18:51:18 --> [REQ_ID=78bd2be4f1a2] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Knowledgebase
DEBUG - 2026-03-06 18:51:18 --> [CSRF] token name=csrf_test_name hash=32b2618c029db5499a6ae10647039c93
DEBUG - 2026-03-06 18:51:18 --> [REQ_ID=78bd2be4f1a2] [REQUEST][END]
INFO - 2026-03-06 18:51:18 --> [REQ_ID=78bd2be4f1a2] [PERF] Execution time=0.011997
DEBUG - 2026-03-06 18:51:19 --> [REQ_ID=c9e1f2556ce4] [REQUEST][START] HEAD /
DEBUG - 2026-03-06 18:51:19 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-06 18:51:19 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-06 18:51:19 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-06 18:51:19 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-06 18:51:19 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-06 18:51:25 --> [REQ_ID=10242dce97a1] [REQUEST][START] GET /index.php/Privacy-Policy
DEBUG - 2026-03-06 18:51:25 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-06 18:51:25 --> [REQ_ID=10242dce97a1] [FILTER_BEFORE] /index.php/Privacy-Policy
DEBUG - 2026-03-06 18:51:25 --> [REQ_ID=10242dce97a1] [ROUTE] Controller=\App\Controllers\Home Method=privacyPolicy
DEBUG - 2026-03-06 18:51:25 --> [REQ_ID=10242dce97a1] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Privacy-Policy
DEBUG - 2026-03-06 18:51:25 --> [CSRF] token name=csrf_test_name hash=fc58743be2da4142b8e7385f1ba77454
DEBUG - 2026-03-06 18:51:25 --> [REQ_ID=028c2fc72989] [INIT] App\Controllers\Home::GET
INFO - 2026-03-06 18:51:25 --> [REQ_ID=028c2fc72989] [MEMORY][controller-start] 4194304
INFO - 2026-03-06 18:51:25 --> [REQ_ID=028c2fc72989] [MEMORY][commonData:start] 4194304
DEBUG - 2026-03-06 18:51:25 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-06 18:51:25 --> [MetaService] slug=privacy-policy pageName= cacheHit=1 path=CACHE
DEBUG - 2026-03-06 18:51:25 --> [REQ_ID=028c2fc72989] [VIEW_RENDER] themes/public/privacyPolicy
INFO - 2026-03-06 18:51:25 --> [REQ_ID=028c2fc72989] [MEMORY][commonData:start] 8388608
INFO - 2026-03-06 18:51:25 --> themesMemory usage: 8388608
DEBUG - 2026-03-06 18:51:25 --> [MetaService] slug=privacy-policy pageName=Privacy Policy cacheHit=1 path=CACHE
DEBUG - 2026-03-06 18:51:25 --> [REQ_ID=10242dce97a1] [FILTER_AFTER]
DEBUG - 2026-03-06 18:51:25 --> [REQ_ID=10242dce97a1] [LIFECYCLE][END] status=200 duration_ms=557.64 memory_delta=4194304
INFO - 2026-03-06 18:51:25 --> [REQ_ID=028c2fc72989] [PERF] Execution time=0.557318
DEBUG - 2026-03-06 18:51:25 --> [REQ_ID=10242dce97a1] [REQUEST][END]
INFO - 2026-03-06 18:51:25 --> [REQ_ID=10242dce97a1] [PERF] Execution time=0.566779
DEBUG - 2026-03-06 18:51:26 --> [REQ_ID=72575232d56d] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-06 18:51:26 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-06 18:51:26 --> [REQ_ID=72575232d56d] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-06 18:51:26 --> [REQ_ID=72575232d56d] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-06 18:51:26 --> [REQ_ID=72575232d56d] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-06 18:51:26 --> [CSRF] token name=csrf_test_name hash=3f2a7508e969e2269e093e3fe9d4e831
DEBUG - 2026-03-06 18:51:26 --> [REQ_ID=929b57e91cee] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-06 18:51:26 --> [REQ_ID=929b57e91cee] [MEMORY][controller-start] 6291456
DEBUG - 2026-03-06 18:51:26 --> [REQ_ID=72575232d56d] [FILTER_AFTER]
DEBUG - 2026-03-06 18:51:26 --> [REQ_ID=72575232d56d] [LIFECYCLE][END] status=200 duration_ms=16.90 memory_delta=0
INFO - 2026-03-06 18:51:26 --> [REQ_ID=929b57e91cee] [PERF] Execution time=0.016711
DEBUG - 2026-03-06 18:51:26 --> [REQ_ID=72575232d56d] [REQUEST][END]
INFO - 2026-03-06 18:51:26 --> [REQ_ID=72575232d56d] [PERF] Execution time=0.029854
DEBUG - 2026-03-06 18:51:26 --> [REQ_ID=244a6dc01391] [REQUEST][START] GET /index.php/Terms-Of-Service
DEBUG - 2026-03-06 18:51:26 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-06 18:51:26 --> [REQ_ID=244a6dc01391] [FILTER_BEFORE] /index.php/Terms-Of-Service
DEBUG - 2026-03-06 18:51:26 --> [REQ_ID=244a6dc01391] [ROUTE] Controller=\App\Controllers\Home Method=termsOfService
DEBUG - 2026-03-06 18:51:26 --> [REQ_ID=244a6dc01391] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Terms-Of-Service
DEBUG - 2026-03-06 18:51:26 --> [CSRF] token name=csrf_test_name hash=6072ce614529c60b1d3abd500e1ef947
DEBUG - 2026-03-06 18:51:26 --> [REQ_ID=294ac04da413] [INIT] App\Controllers\Home::GET
INFO - 2026-03-06 18:51:26 --> [REQ_ID=294ac04da413] [MEMORY][controller-start] 6291456
INFO - 2026-03-06 18:51:26 --> [REQ_ID=294ac04da413] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-06 18:51:26 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-06 18:51:27 --> [MetaService] slug=terms-of-service pageName= cacheHit= path=DB
DEBUG - 2026-03-06 18:51:27 --> [REQ_ID=294ac04da413] [VIEW_RENDER] themes/public/termsOfService
INFO - 2026-03-06 18:51:27 --> [REQ_ID=294ac04da413] [MEMORY][commonData:start] 10485760
INFO - 2026-03-06 18:51:27 --> themesMemory usage: 10485760
DEBUG - 2026-03-06 18:51:27 --> [MetaService] slug=terms-of-service pageName=Terms of Service cacheHit= path=DB
DEBUG - 2026-03-06 18:51:27 --> [REQ_ID=244a6dc01391] [FILTER_AFTER]
DEBUG - 2026-03-06 18:51:27 --> [REQ_ID=244a6dc01391] [LIFECYCLE][END] status=200 duration_ms=599.42 memory_delta=4194304
INFO - 2026-03-06 18:51:27 --> [REQ_ID=294ac04da413] [PERF] Execution time=0.597862
DEBUG - 2026-03-06 18:51:27 --> [REQ_ID=244a6dc01391] [REQUEST][END]
INFO - 2026-03-06 18:51:27 --> [REQ_ID=244a6dc01391] [PERF] Execution time=0.639436
DEBUG - 2026-03-06 18:51:36 --> [REQ_ID=66f5c392fe9c] [REQUEST][START] GET /index.php/Support
DEBUG - 2026-03-06 18:51:36 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-06 18:51:36 --> [REQ_ID=60e8d27c4b81] [REQUEST][START] GET /
DEBUG - 2026-03-06 18:51:36 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-06 18:51:36 --> [REQ_ID=66f5c392fe9c] [FILTER_BEFORE] /index.php/Support
DEBUG - 2026-03-06 18:51:36 --> [REQ_ID=66f5c392fe9c] [ROUTE] Controller=\App\Modules\Support\Controllers\SupportController Method=index
DEBUG - 2026-03-06 18:51:36 --> [REQ_ID=66f5c392fe9c] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Support
DEBUG - 2026-03-06 18:51:36 --> [CSRF] token name=csrf_test_name hash=95cbfc0f176812100d138a0bebb0997c
DEBUG - 2026-03-06 18:51:36 --> [REQ_ID=fd84618e4ab1] [INIT] App\Modules\Support\Controllers\SupportController::GET
INFO - 2026-03-06 18:51:36 --> [REQ_ID=fd84618e4ab1] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-06 18:51:36 --> [REQ_ID=60e8d27c4b81] [FILTER_BEFORE] /
DEBUG - 2026-03-06 18:51:36 --> [REQ_ID=60e8d27c4b81] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-06 18:51:36 --> [REQ_ID=60e8d27c4b81] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-06 18:51:36 --> [CSRF] token name=csrf_test_name hash=8b87cc1243b95a7736da86932b0deeb7
DEBUG - 2026-03-06 18:51:36 --> [REQ_ID=ff0b9c63e2b2] [INIT] App\Controllers\Home::GET
INFO - 2026-03-06 18:51:36 --> [REQ_ID=ff0b9c63e2b2] [MEMORY][controller-start] 6291456
INFO - 2026-03-06 18:51:36 --> [REQ_ID=ff0b9c63e2b2] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-06 18:51:36 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-06 18:51:36 --> [REQ_ID=fd84618e4ab1] [METHOD_ENTRY] index
DEBUG - 2026-03-06 18:51:36 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-06 18:51:36 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-06 18:51:36 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-06 18:51:36 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-06 18:51:36 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-06 18:51:36 --> MyMICoin: guest context detected; skipping user-specific preload.
INFO - 2026-03-06 18:51:36 --> [REQ_ID=fd84618e4ab1] [MEMORY][commonData:start] 4194304
DEBUG - 2026-03-06 18:51:36 --> [REQ_ID=fd84618e4ab1] [VIEW_RENDER] SupportModule\Views\Support\index
INFO - 2026-03-06 18:51:36 --> [REQ_ID=fd84618e4ab1] [MEMORY][commonData:start] 4194304
INFO - 2026-03-06 18:51:36 --> themesMemory usage: 4194304
DEBUG - 2026-03-06 18:51:36 --> [REQ_ID=66f5c392fe9c] [FILTER_AFTER]
DEBUG - 2026-03-06 18:51:36 --> [REQ_ID=66f5c392fe9c] [LIFECYCLE][END] status=200 duration_ms=111.84 memory_delta=0
INFO - 2026-03-06 18:51:36 --> [REQ_ID=fd84618e4ab1] [PERF] Execution time=0.110606
DEBUG - 2026-03-06 18:51:36 --> [REQ_ID=66f5c392fe9c] [REQUEST][END]
INFO - 2026-03-06 18:51:36 --> [REQ_ID=66f5c392fe9c] [PERF] Execution time=0.128727
DEBUG - 2026-03-06 18:51:36 --> [REQ_ID=4ab1567c9f59] [REQUEST][START] GET /index.php/Legal/Terms-And-Conditions
DEBUG - 2026-03-06 18:51:36 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-06 18:51:36 --> [REQ_ID=4ab1567c9f59] [FILTER_BEFORE] /index.php/Legal/Terms-And-Conditions
DEBUG - 2026-03-06 18:51:36 --> [REQ_ID=4ab1567c9f59] [ROUTE] Controller=\App\Controllers\Home Method=terms
DEBUG - 2026-03-06 18:51:36 --> [REQ_ID=4ab1567c9f59] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Legal/Terms-And-Conditions
DEBUG - 2026-03-06 18:51:36 --> [CSRF] token name=csrf_test_name hash=7782a5ddebe542860ef0bf2d185a43b3
DEBUG - 2026-03-06 18:51:36 --> [REQ_ID=4ab1567c9f59] [REQUEST][END]
INFO - 2026-03-06 18:51:36 --> [REQ_ID=4ab1567c9f59] [PERF] Execution time=0.009371
DEBUG - 2026-03-06 18:51:37 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
DEBUG - 2026-03-06 18:51:37 --> [REQ_ID=ff0b9c63e2b2] [VIEW_RENDER] themes/public/home
INFO - 2026-03-06 18:51:37 --> [REQ_ID=ff0b9c63e2b2] [MEMORY][commonData:start] 8388608
INFO - 2026-03-06 18:51:37 --> themesMemory usage: 8388608
DEBUG - 2026-03-06 18:51:37 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-06 18:51:37 --> [REQ_ID=60e8d27c4b81] [FILTER_AFTER]
DEBUG - 2026-03-06 18:51:37 --> [REQ_ID=60e8d27c4b81] [LIFECYCLE][END] status=200 duration_ms=520.63 memory_delta=2097152
INFO - 2026-03-06 18:51:37 --> [REQ_ID=ff0b9c63e2b2] [PERF] Execution time=0.520178
DEBUG - 2026-03-06 18:51:37 --> [REQ_ID=60e8d27c4b81] [REQUEST][END]
INFO - 2026-03-06 18:51:37 --> [REQ_ID=60e8d27c4b81] [PERF] Execution time=0.538051
DEBUG - 2026-03-06 18:51:37 --> [REQ_ID=70c374090677] [REQUEST][START] GET /index.php/Free/register
DEBUG - 2026-03-06 18:51:37 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-06 18:51:37 --> [REQ_ID=70c374090677] [FILTER_BEFORE] /index.php/Free/register
DEBUG - 2026-03-06 18:51:37 --> [REQ_ID=70c374090677] [ROUTE] Controller=\App\Controllers\AuthController Method=register
DEBUG - 2026-03-06 18:51:37 --> [REQ_ID=70c374090677] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Free/register
DEBUG - 2026-03-06 18:51:37 --> [CSRF] token name=csrf_test_name hash=b3487a319e1c5847da6d2db35032d6d1
DEBUG - 2026-03-06 18:51:37 --> [REQ_ID=70c374090677] [REQUEST][END]
INFO - 2026-03-06 18:51:37 --> [REQ_ID=70c374090677] [PERF] Execution time=0.013751
DEBUG - 2026-03-06 18:51:46 --> [REQ_ID=1094e459ccc0] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-06 18:51:46 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-06 18:51:46 --> [REQ_ID=135613e3c1ce] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-06 18:51:46 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-06 18:51:46 --> [REQ_ID=1094e459ccc0] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-06 18:51:46 --> [REQ_ID=1094e459ccc0] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-06 18:51:46 --> [REQ_ID=1094e459ccc0] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-06 18:51:46 --> [CSRF] token name=csrf_test_name hash=ebad8b42b0908b7bf57d498708233e41
DEBUG - 2026-03-06 18:51:46 --> [REQ_ID=9313aa1ba6b2] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-06 18:51:46 --> [REQ_ID=9313aa1ba6b2] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-06 18:51:46 --> [REQ_ID=135613e3c1ce] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-06 18:51:46 --> [REQ_ID=135613e3c1ce] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-06 18:51:46 --> [REQ_ID=135613e3c1ce] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-06 18:51:46 --> [CSRF] token name=csrf_test_name hash=17eb044277f6d7c77b7a10b58557e745
DEBUG - 2026-03-06 18:51:46 --> [REQ_ID=6934a386231d] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-06 18:51:46 --> [REQ_ID=6934a386231d] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-06 18:51:46 --> [REQ_ID=135613e3c1ce] [FILTER_AFTER]
DEBUG - 2026-03-06 18:51:46 --> [REQ_ID=135613e3c1ce] [LIFECYCLE][END] status=200 duration_ms=27.33 memory_delta=0
INFO - 2026-03-06 18:51:46 --> [REQ_ID=6934a386231d] [PERF] Execution time=0.026667
DEBUG - 2026-03-06 18:51:46 --> [REQ_ID=135613e3c1ce] [REQUEST][END]
INFO - 2026-03-06 18:51:46 --> [REQ_ID=135613e3c1ce] [PERF] Execution time=0.040208
DEBUG - 2026-03-06 18:51:46 --> [REQ_ID=1094e459ccc0] [FILTER_AFTER]
DEBUG - 2026-03-06 18:51:46 --> [REQ_ID=1094e459ccc0] [LIFECYCLE][END] status=200 duration_ms=39.69 memory_delta=0
INFO - 2026-03-06 18:51:46 --> [REQ_ID=9313aa1ba6b2] [PERF] Execution time=0.039510
DEBUG - 2026-03-06 18:51:46 --> [REQ_ID=1094e459ccc0] [REQUEST][END]
INFO - 2026-03-06 18:51:46 --> [REQ_ID=1094e459ccc0] [PERF] Execution time=0.052407
DEBUG - 2026-03-06 18:51:46 --> [REQ_ID=1ed2d28f98cc] [REQUEST][START] GET /index.php/How-It-Works/Daily-Financial-News
DEBUG - 2026-03-06 18:51:46 --> [REQ_ID=da2f675e4c0b] [REQUEST][START] GET /index.php/How-It-Works/Investment-Portfolio-Management
DEBUG - 2026-03-06 18:51:46 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-06 18:51:46 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-06 18:51:46 --> [REQ_ID=da2f675e4c0b] [FILTER_BEFORE] /index.php/How-It-Works/Investment-Portfolio-Management
DEBUG - 2026-03-06 18:51:46 --> [REQ_ID=da2f675e4c0b] [ROUTE] Controller=\App\Modules\Blog\Controllers\HowItWorksController Method=show
DEBUG - 2026-03-06 18:51:46 --> [REQ_ID=da2f675e4c0b] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/How-It-Works/Investment-Portfolio-Management
DEBUG - 2026-03-06 18:51:46 --> [CSRF] token name=csrf_test_name hash=1bb13ff5ac13a31ca8674501dbf0d05e
DEBUG - 2026-03-06 18:51:46 --> [REQ_ID=2e347277b411] [INIT] App\Modules\Blog\Controllers\HowItWorksController::GET
INFO - 2026-03-06 18:51:46 --> [REQ_ID=2e347277b411] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-06 18:51:46 --> [REQ_ID=1ed2d28f98cc] [FILTER_BEFORE] /index.php/How-It-Works/Daily-Financial-News
DEBUG - 2026-03-06 18:51:46 --> [REQ_ID=1ed2d28f98cc] [ROUTE] Controller=\App\Modules\Blog\Controllers\HowItWorksController Method=show
DEBUG - 2026-03-06 18:51:46 --> [REQ_ID=1ed2d28f98cc] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/How-It-Works/Daily-Financial-News
DEBUG - 2026-03-06 18:51:46 --> [CSRF] token name=csrf_test_name hash=152eeea7953f2f232ff2fc158b00c3b6
DEBUG - 2026-03-06 18:51:46 --> [REQ_ID=788b1c75ac92] [INIT] App\Modules\Blog\Controllers\HowItWorksController::GET
INFO - 2026-03-06 18:51:46 --> [REQ_ID=788b1c75ac92] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-06 18:51:46 --> [REQ_ID=2e347277b411] [METHOD_ENTRY] show
DEBUG - 2026-03-06 18:51:46 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-06 18:51:46 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-06 18:51:46 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-06 18:51:46 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-06 18:51:46 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-06 18:51:46 --> [REQ_ID=788b1c75ac92] [METHOD_ENTRY] show
DEBUG - 2026-03-06 18:51:46 --> MyMICoin: guest context detected; skipping user-specific preload.
ERROR - 2026-03-06 18:51:46 --> [ERROR_PAGE] event=error_404 status=404 message=Page not found.
DEBUG - 2026-03-06 18:51:46 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-06 18:51:46 --> [REQ_ID=da2f675e4c0b] [FILTER_AFTER]
DEBUG - 2026-03-06 18:51:46 --> [REQ_ID=da2f675e4c0b] [LIFECYCLE][END] status=404 duration_ms=28.17 memory_delta=0
INFO - 2026-03-06 18:51:46 --> [REQ_ID=2e347277b411] [PERF] Execution time=0.027251
DEBUG - 2026-03-06 18:51:46 --> [REQ_ID=da2f675e4c0b] [REQUEST][END]
INFO - 2026-03-06 18:51:46 --> [REQ_ID=da2f675e4c0b] [PERF] Execution time=0.044740
DEBUG - 2026-03-06 18:51:46 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-06 18:51:46 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-06 18:51:46 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-06 18:51:46 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-06 18:51:46 --> MyMICoin: guest context detected; skipping user-specific preload.
ERROR - 2026-03-06 18:51:46 --> [ERROR_PAGE] event=error_404 status=404 message=Page not found.
DEBUG - 2026-03-06 18:51:46 --> [REQ_ID=1ed2d28f98cc] [FILTER_AFTER]
DEBUG - 2026-03-06 18:51:46 --> [REQ_ID=1ed2d28f98cc] [LIFECYCLE][END] status=404 duration_ms=53.22 memory_delta=0
INFO - 2026-03-06 18:51:46 --> [REQ_ID=788b1c75ac92] [PERF] Execution time=0.053151
DEBUG - 2026-03-06 18:51:46 --> [REQ_ID=1ed2d28f98cc] [REQUEST][END]
INFO - 2026-03-06 18:51:46 --> [REQ_ID=1ed2d28f98cc] [PERF] Execution time=0.074683
DEBUG - 2026-03-06 18:51:47 --> [REQ_ID=362e2a14b190] [REQUEST][START] GET /index.php/How-It-Works/Investor-Profile
DEBUG - 2026-03-06 18:51:47 --> [REQ_ID=8b8518b568c3] [REQUEST][START] GET /index.php/How-It-Works/Investment-Dashboard
DEBUG - 2026-03-06 18:51:47 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-06 18:51:47 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-06 18:51:47 --> [REQ_ID=8b8518b568c3] [FILTER_BEFORE] /index.php/How-It-Works/Investment-Dashboard
DEBUG - 2026-03-06 18:51:47 --> [REQ_ID=8b8518b568c3] [ROUTE] Controller=\App\Modules\Blog\Controllers\HowItWorksController Method=show
DEBUG - 2026-03-06 18:51:47 --> [REQ_ID=8b8518b568c3] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/How-It-Works/Investment-Dashboard
DEBUG - 2026-03-06 18:51:47 --> [REQ_ID=362e2a14b190] [FILTER_BEFORE] /index.php/How-It-Works/Investor-Profile
DEBUG - 2026-03-06 18:51:47 --> [REQ_ID=362e2a14b190] [ROUTE] Controller=\App\Modules\Blog\Controllers\HowItWorksController Method=show
DEBUG - 2026-03-06 18:51:47 --> [REQ_ID=362e2a14b190] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/How-It-Works/Investor-Profile
DEBUG - 2026-03-06 18:51:47 --> [CSRF] token name=csrf_test_name hash=442c485060b0ab5afa28161cf37b4113
DEBUG - 2026-03-06 18:51:47 --> [REQ_ID=e11054b2148a] [INIT] App\Modules\Blog\Controllers\HowItWorksController::GET
DEBUG - 2026-03-06 18:51:47 --> [CSRF] token name=csrf_test_name hash=5b3a2caff331bc572b0f4f61a25cfd86
INFO - 2026-03-06 18:51:47 --> [REQ_ID=e11054b2148a] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-06 18:51:47 --> [REQ_ID=9a0983d0b310] [INIT] App\Modules\Blog\Controllers\HowItWorksController::GET
INFO - 2026-03-06 18:51:47 --> [REQ_ID=9a0983d0b310] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-06 18:51:47 --> [REQ_ID=e11054b2148a] [METHOD_ENTRY] show
DEBUG - 2026-03-06 18:51:47 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-06 18:51:47 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-06 18:51:47 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-06 18:51:47 --> [REQ_ID=9a0983d0b310] [METHOD_ENTRY] show
DEBUG - 2026-03-06 18:51:47 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-06 18:51:47 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-06 18:51:47 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-06 18:51:47 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-06 18:51:47 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-06 18:51:47 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-06 18:51:47 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-06 18:51:47 --> MyMICoin: guest context detected; skipping user-specific preload.
INFO - 2026-03-06 18:51:47 --> [REQ_ID=e11054b2148a] [MEMORY][commonData:start] 4194304
DEBUG - 2026-03-06 18:51:47 --> MyMICoin: guest context detected; skipping user-specific preload.
ERROR - 2026-03-06 18:51:47 --> [ERROR_PAGE] event=error_404 status=404 message=Page not found.
DEBUG - 2026-03-06 18:51:47 --> [REQ_ID=362e2a14b190] [FILTER_AFTER]
DEBUG - 2026-03-06 18:51:47 --> [REQ_ID=362e2a14b190] [LIFECYCLE][END] status=404 duration_ms=32.34 memory_delta=0
INFO - 2026-03-06 18:51:47 --> [REQ_ID=9a0983d0b310] [PERF] Execution time=0.031782
DEBUG - 2026-03-06 18:51:47 --> [REQ_ID=362e2a14b190] [REQUEST][END]
INFO - 2026-03-06 18:51:47 --> [REQ_ID=362e2a14b190] [PERF] Execution time=0.049013
DEBUG - 2026-03-06 18:51:47 --> [REQ_ID=6d4c2d3bb92c] [REQUEST][START] GET /index.php/How-It-Works/Personal-Budgeting
DEBUG - 2026-03-06 18:51:47 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-06 18:51:47 --> [REQ_ID=6d4c2d3bb92c] [FILTER_BEFORE] /index.php/How-It-Works/Personal-Budgeting
DEBUG - 2026-03-06 18:51:47 --> [REQ_ID=6d4c2d3bb92c] [ROUTE] Controller=\App\Modules\Blog\Controllers\HowItWorksController Method=show
DEBUG - 2026-03-06 18:51:47 --> [REQ_ID=6d4c2d3bb92c] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/How-It-Works/Personal-Budgeting
DEBUG - 2026-03-06 18:51:47 --> [CSRF] token name=csrf_test_name hash=7d54c2d5b12be5bb2264e181d1f8eae2
DEBUG - 2026-03-06 18:51:47 --> [REQ_ID=112760eca56a] [INIT] App\Modules\Blog\Controllers\HowItWorksController::GET
INFO - 2026-03-06 18:51:47 --> [REQ_ID=112760eca56a] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-06 18:51:47 --> [REQ_ID=112760eca56a] [METHOD_ENTRY] show
DEBUG - 2026-03-06 18:51:47 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-06 18:51:47 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-06 18:51:47 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-06 18:51:47 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-06 18:51:47 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-06 18:51:47 --> MyMICoin: guest context detected; skipping user-specific preload.
INFO - 2026-03-06 18:51:47 --> [REQ_ID=112760eca56a] [MEMORY][commonData:start] 4194304
DEBUG - 2026-03-06 18:51:47 --> [REQ_ID=431aec8d0f74] [REQUEST][START] GET /index.php/Legal/Privacy-Policy
DEBUG - 2026-03-06 18:51:47 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-06 18:51:47 --> [REQ_ID=431aec8d0f74] [FILTER_BEFORE] /index.php/Legal/Privacy-Policy
DEBUG - 2026-03-06 18:51:47 --> [REQ_ID=431aec8d0f74] [ROUTE] Controller=\App\Controllers\Home Method=privacyPolicy
DEBUG - 2026-03-06 18:51:47 --> [REQ_ID=431aec8d0f74] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Legal/Privacy-Policy
DEBUG - 2026-03-06 18:51:47 --> [CSRF] token name=csrf_test_name hash=583087af843b8b740b1ff8832ecbe0a4
DEBUG - 2026-03-06 18:51:48 --> [REQ_ID=431aec8d0f74] [REQUEST][END]
INFO - 2026-03-06 18:51:48 --> [REQ_ID=431aec8d0f74] [PERF] Execution time=0.054982
DEBUG - 2026-03-06 18:51:48 --> [REQ_ID=e11054b2148a] [VIEW_RENDER] App\Modules\Blog\Views\HowItWorks\Investment_Portfolio_Management
INFO - 2026-03-06 18:51:48 --> [REQ_ID=e11054b2148a] [MEMORY][commonData:start] 8388608
DEBUG - 2026-03-06 18:51:48 --> [REQ_ID=112760eca56a] [VIEW_RENDER] App\Modules\Blog\Views\HowItWorks\Personal_Budgeting
INFO - 2026-03-06 18:51:48 --> [REQ_ID=112760eca56a] [MEMORY][commonData:start] 8388608
INFO - 2026-03-06 18:51:48 --> themesMemory usage: 10485760
DEBUG - 2026-03-06 18:51:48 --> [REQ_ID=8b8518b568c3] [FILTER_AFTER]
DEBUG - 2026-03-06 18:51:48 --> [REQ_ID=8b8518b568c3] [LIFECYCLE][END] status=200 duration_ms=1,027.51 memory_delta=8388608
INFO - 2026-03-06 18:51:48 --> [REQ_ID=e11054b2148a] [PERF] Execution time=1.026852
DEBUG - 2026-03-06 18:51:48 --> [REQ_ID=8b8518b568c3] [REQUEST][END]
INFO - 2026-03-06 18:51:48 --> [REQ_ID=8b8518b568c3] [PERF] Execution time=1.044132
INFO - 2026-03-06 18:51:48 --> themesMemory usage: 10485760
DEBUG - 2026-03-06 18:51:48 --> [REQ_ID=6d4c2d3bb92c] [FILTER_AFTER]
DEBUG - 2026-03-06 18:51:48 --> [REQ_ID=6d4c2d3bb92c] [LIFECYCLE][END] status=200 duration_ms=1,038.90 memory_delta=6291456
INFO - 2026-03-06 18:51:48 --> [REQ_ID=112760eca56a] [PERF] Execution time=1.037956
DEBUG - 2026-03-06 18:51:48 --> [REQ_ID=6d4c2d3bb92c] [REQUEST][END]
INFO - 2026-03-06 18:51:48 --> [REQ_ID=6d4c2d3bb92c] [PERF] Execution time=1.050004
DEBUG - 2026-03-06 18:52:00 --> [REQ_ID=5fd732898da2] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-06 18:52:00 --> [REQ_ID=22a66f4c56c7] [REQUEST][START] GET /index.php/Free/register
DEBUG - 2026-03-06 18:52:00 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-06 18:52:00 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-06 18:52:00 --> [REQ_ID=ae99024c1878] [REQUEST][START] GET /index.php/Dashboard
DEBUG - 2026-03-06 18:52:00 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-06 18:52:00 --> [REQ_ID=22a66f4c56c7] [FILTER_BEFORE] /index.php/Free/register
DEBUG - 2026-03-06 18:52:00 --> [REQ_ID=22a66f4c56c7] [ROUTE] Controller=\App\Controllers\AuthController Method=register
DEBUG - 2026-03-06 18:52:00 --> [REQ_ID=22a66f4c56c7] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Free/register
DEBUG - 2026-03-06 18:52:00 --> [CSRF] token name=csrf_test_name hash=0e0a7d72212c7799cb44ea708aca0c8c
DEBUG - 2026-03-06 18:52:00 --> [REQ_ID=22a66f4c56c7] [REQUEST][END]
INFO - 2026-03-06 18:52:00 --> [REQ_ID=22a66f4c56c7] [PERF] Execution time=0.022453
DEBUG - 2026-03-06 18:52:00 --> [REQ_ID=5fd732898da2] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-06 18:52:00 --> [REQ_ID=5fd732898da2] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-06 18:52:00 --> [REQ_ID=5fd732898da2] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-06 18:52:00 --> [CSRF] token name=csrf_test_name hash=850c93f7e8298d20747ad0e2e01c4908
DEBUG - 2026-03-06 18:52:00 --> [REQ_ID=ddef1355e1a9] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-06 18:52:00 --> [REQ_ID=ddef1355e1a9] [MEMORY][controller-start] 8388608
DEBUG - 2026-03-06 18:52:00 --> [REQ_ID=ae99024c1878] [FILTER_BEFORE] /index.php/Dashboard
DEBUG - 2026-03-06 18:52:00 --> [REQ_ID=ae99024c1878] [ROUTE] Controller=\App\Modules\User\Controllers\DashboardController Method=index
DEBUG - 2026-03-06 18:52:00 --> [REQ_ID=ae99024c1878] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Dashboard
DEBUG - 2026-03-06 18:52:00 --> [CSRF] token name=csrf_test_name hash=fae09940f08af15485f4fd4a0ec1c47a
DEBUG - 2026-03-06 18:52:00 --> [REQ_ID=ae99024c1878] [REQUEST][END]
INFO - 2026-03-06 18:52:00 --> [REQ_ID=ae99024c1878] [PERF] Execution time=0.031136
DEBUG - 2026-03-06 18:52:00 --> [REQ_ID=8c67e45f1f3d] [REQUEST][START] GET /index.php/How-It-Works/Registering-An-Account
DEBUG - 2026-03-06 18:52:00 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-06 18:52:00 --> [REQ_ID=5fd732898da2] [FILTER_AFTER]
DEBUG - 2026-03-06 18:52:00 --> [REQ_ID=5fd732898da2] [LIFECYCLE][END] status=200 duration_ms=25.06 memory_delta=0
INFO - 2026-03-06 18:52:00 --> [REQ_ID=ddef1355e1a9] [PERF] Execution time=0.024486
DEBUG - 2026-03-06 18:52:00 --> [REQ_ID=c703070ca964] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-06 18:52:00 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-06 18:52:00 --> [REQ_ID=8c67e45f1f3d] [FILTER_BEFORE] /index.php/How-It-Works/Registering-An-Account
DEBUG - 2026-03-06 18:52:00 --> [REQ_ID=8c67e45f1f3d] [ROUTE] Controller=\App\Modules\Blog\Controllers\HowItWorksController Method=show
DEBUG - 2026-03-06 18:52:00 --> [REQ_ID=8c67e45f1f3d] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/How-It-Works/Registering-An-Account
DEBUG - 2026-03-06 18:52:00 --> [CSRF] token name=csrf_test_name hash=48f7198c96da59b8211f13d4976de57d
DEBUG - 2026-03-06 18:52:00 --> [REQ_ID=c96070464d99] [INIT] App\Modules\Blog\Controllers\HowItWorksController::GET
INFO - 2026-03-06 18:52:00 --> [REQ_ID=c96070464d99] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-06 18:52:00 --> [REQ_ID=5fd732898da2] [REQUEST][END]
INFO - 2026-03-06 18:52:00 --> [REQ_ID=5fd732898da2] [PERF] Execution time=0.055817
DEBUG - 2026-03-06 18:52:00 --> [REQ_ID=c703070ca964] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-06 18:52:00 --> [REQ_ID=c703070ca964] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-06 18:52:00 --> [REQ_ID=c703070ca964] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-06 18:52:00 --> [CSRF] token name=csrf_test_name hash=ada496792c8c1061820acde9630d749b
DEBUG - 2026-03-06 18:52:00 --> [REQ_ID=277e23f7e8bd] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-06 18:52:00 --> [REQ_ID=277e23f7e8bd] [MEMORY][controller-start] 6291456
DEBUG - 2026-03-06 18:52:00 --> [REQ_ID=4604c7bffbf1] [REQUEST][START] GET /index.php/How-It-Works/Personal-Budgeting
DEBUG - 2026-03-06 18:52:00 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-06 18:52:00 --> [REQ_ID=c96070464d99] [METHOD_ENTRY] show
DEBUG - 2026-03-06 18:52:00 --> [REQ_ID=c703070ca964] [FILTER_AFTER]
DEBUG - 2026-03-06 18:52:00 --> [REQ_ID=c703070ca964] [LIFECYCLE][END] status=200 duration_ms=17.74 memory_delta=0
INFO - 2026-03-06 18:52:00 --> [REQ_ID=277e23f7e8bd] [PERF] Execution time=0.017380
DEBUG - 2026-03-06 18:52:00 --> [REQ_ID=c703070ca964] [REQUEST][END]
INFO - 2026-03-06 18:52:00 --> [REQ_ID=c703070ca964] [PERF] Execution time=0.033440
DEBUG - 2026-03-06 18:52:00 --> [REQ_ID=4604c7bffbf1] [FILTER_BEFORE] /index.php/How-It-Works/Personal-Budgeting
DEBUG - 2026-03-06 18:52:00 --> [REQ_ID=4604c7bffbf1] [ROUTE] Controller=\App\Modules\Blog\Controllers\HowItWorksController Method=show
DEBUG - 2026-03-06 18:52:00 --> [REQ_ID=4604c7bffbf1] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/How-It-Works/Personal-Budgeting
DEBUG - 2026-03-06 18:52:00 --> [CSRF] token name=csrf_test_name hash=8b5ec3afecc47fa4a2b70ebe0ef6ad11
DEBUG - 2026-03-06 18:52:00 --> [REQ_ID=442e5acbf69c] [INIT] App\Modules\Blog\Controllers\HowItWorksController::GET
INFO - 2026-03-06 18:52:00 --> [REQ_ID=442e5acbf69c] [MEMORY][controller-start] 6291456
DEBUG - 2026-03-06 18:52:00 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-06 18:52:00 --> [REQ_ID=442e5acbf69c] [METHOD_ENTRY] show
DEBUG - 2026-03-06 18:52:00 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-06 18:52:00 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-06 18:52:00 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-06 18:52:00 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-06 18:52:00 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-06 18:52:00 --> MyMICoin: guest context detected; skipping user-specific preload.
INFO - 2026-03-06 18:52:00 --> [REQ_ID=442e5acbf69c] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-06 18:52:00 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-06 18:52:00 --> [REQ_ID=bf8b384ae0be] [REQUEST][START] GET /index.php/How-It-Works/Investment-Dashboard
DEBUG - 2026-03-06 18:52:00 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-06 18:52:00 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-06 18:52:00 --> [REQ_ID=bf8b384ae0be] [FILTER_BEFORE] /index.php/How-It-Works/Investment-Dashboard
DEBUG - 2026-03-06 18:52:00 --> [REQ_ID=bf8b384ae0be] [ROUTE] Controller=\App\Modules\Blog\Controllers\HowItWorksController Method=show
DEBUG - 2026-03-06 18:52:00 --> [REQ_ID=bf8b384ae0be] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/How-It-Works/Investment-Dashboard
DEBUG - 2026-03-06 18:52:00 --> [CSRF] token name=csrf_test_name hash=27538ba2fe1c2c343438fcd5f8f41762
DEBUG - 2026-03-06 18:52:00 --> [REQ_ID=832b5a25eef9] [INIT] App\Modules\Blog\Controllers\HowItWorksController::GET
INFO - 2026-03-06 18:52:00 --> [REQ_ID=832b5a25eef9] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-06 18:52:00 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-06 18:52:00 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-06 18:52:00 --> MyMICoin: guest context detected; skipping user-specific preload.
INFO - 2026-03-06 18:52:00 --> [REQ_ID=c96070464d99] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-06 18:52:00 --> [REQ_ID=832b5a25eef9] [METHOD_ENTRY] show
DEBUG - 2026-03-06 18:52:00 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-06 18:52:00 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-06 18:52:00 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-06 18:52:00 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-06 18:52:00 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-06 18:52:00 --> MyMICoin: guest context detected; skipping user-specific preload.
INFO - 2026-03-06 18:52:00 --> [REQ_ID=832b5a25eef9] [MEMORY][commonData:start] 4194304
DEBUG - 2026-03-06 18:52:01 --> [REQ_ID=442e5acbf69c] [VIEW_RENDER] App\Modules\Blog\Views\HowItWorks\Personal_Budgeting
INFO - 2026-03-06 18:52:01 --> [REQ_ID=442e5acbf69c] [MEMORY][commonData:start] 8388608
DEBUG - 2026-03-06 18:52:01 --> [REQ_ID=832b5a25eef9] [VIEW_RENDER] App\Modules\Blog\Views\HowItWorks\Investment_Portfolio_Management
INFO - 2026-03-06 18:52:01 --> [REQ_ID=832b5a25eef9] [MEMORY][commonData:start] 8388608
DEBUG - 2026-03-06 18:52:01 --> [REQ_ID=c96070464d99] [VIEW_RENDER] App\Modules\Blog\Views\HowItWorks\Registering_An_Account
INFO - 2026-03-06 18:52:01 --> [REQ_ID=c96070464d99] [MEMORY][commonData:start] 8388608
DEBUG - 2026-03-06 18:52:01 --> [REQ_ID=77d287c15844] [REQUEST][START] GET /index.php/How-It-Works/Automated-Financial-Insights
DEBUG - 2026-03-06 18:52:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
INFO - 2026-03-06 18:52:01 --> themesMemory usage: 10485760
DEBUG - 2026-03-06 18:52:01 --> [REQ_ID=4604c7bffbf1] [FILTER_AFTER]
DEBUG - 2026-03-06 18:52:01 --> [REQ_ID=4604c7bffbf1] [LIFECYCLE][END] status=200 duration_ms=1,045.33 memory_delta=4194304
INFO - 2026-03-06 18:52:01 --> [REQ_ID=442e5acbf69c] [PERF] Execution time=1.045852
DEBUG - 2026-03-06 18:52:01 --> [REQ_ID=77d287c15844] [FILTER_BEFORE] /index.php/How-It-Works/Automated-Financial-Insights
DEBUG - 2026-03-06 18:52:01 --> [REQ_ID=77d287c15844] [ROUTE] Controller=\App\Modules\Blog\Controllers\HowItWorksController Method=show
DEBUG - 2026-03-06 18:52:01 --> [REQ_ID=77d287c15844] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/How-It-Works/Automated-Financial-Insights
DEBUG - 2026-03-06 18:52:01 --> [REQ_ID=4604c7bffbf1] [REQUEST][END]
INFO - 2026-03-06 18:52:01 --> [REQ_ID=4604c7bffbf1] [PERF] Execution time=1.071945
DEBUG - 2026-03-06 18:52:01 --> [CSRF] token name=csrf_test_name hash=f7773efde048b268fd2fa8c9f2c599bd
DEBUG - 2026-03-06 18:52:01 --> [REQ_ID=ff5e29e4a11b] [INIT] App\Modules\Blog\Controllers\HowItWorksController::GET
INFO - 2026-03-06 18:52:01 --> [REQ_ID=ff5e29e4a11b] [MEMORY][controller-start] 6291456
INFO - 2026-03-06 18:52:01 --> themesMemory usage: 12582912
DEBUG - 2026-03-06 18:52:01 --> [REQ_ID=ff5e29e4a11b] [METHOD_ENTRY] show
DEBUG - 2026-03-06 18:52:01 --> [REQ_ID=8c67e45f1f3d] [FILTER_AFTER]
DEBUG - 2026-03-06 18:52:01 --> [REQ_ID=8c67e45f1f3d] [LIFECYCLE][END] status=200 duration_ms=1,151.03 memory_delta=8388608
INFO - 2026-03-06 18:52:01 --> [REQ_ID=c96070464d99] [PERF] Execution time=1.150958
DEBUG - 2026-03-06 18:52:01 --> [REQ_ID=8c67e45f1f3d] [REQUEST][END]
INFO - 2026-03-06 18:52:01 --> [REQ_ID=8c67e45f1f3d] [PERF] Execution time=1.169122
INFO - 2026-03-06 18:52:01 --> themesMemory usage: 10485760
DEBUG - 2026-03-06 18:52:01 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-06 18:52:01 --> [REQ_ID=bf8b384ae0be] [FILTER_AFTER]
DEBUG - 2026-03-06 18:52:01 --> [REQ_ID=bf8b384ae0be] [LIFECYCLE][END] status=200 duration_ms=1,094.34 memory_delta=6291456
INFO - 2026-03-06 18:52:01 --> [REQ_ID=832b5a25eef9] [PERF] Execution time=1.093723
DEBUG - 2026-03-06 18:52:01 --> [REQ_ID=bf8b384ae0be] [REQUEST][END]
INFO - 2026-03-06 18:52:01 --> [REQ_ID=bf8b384ae0be] [PERF] Execution time=1.109691
DEBUG - 2026-03-06 18:52:01 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-06 18:52:01 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-06 18:52:01 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-06 18:52:01 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-06 18:52:01 --> MyMICoin: guest context detected; skipping user-specific preload.
ERROR - 2026-03-06 18:52:01 --> [ERROR_PAGE] event=error_404 status=404 message=Page not found.
DEBUG - 2026-03-06 18:52:01 --> [REQ_ID=77d287c15844] [FILTER_AFTER]
DEBUG - 2026-03-06 18:52:01 --> [REQ_ID=77d287c15844] [LIFECYCLE][END] status=404 duration_ms=123.11 memory_delta=0
INFO - 2026-03-06 18:52:01 --> [REQ_ID=ff5e29e4a11b] [PERF] Execution time=0.120020
DEBUG - 2026-03-06 18:52:01 --> [REQ_ID=77d287c15844] [REQUEST][END]
INFO - 2026-03-06 18:52:01 --> [REQ_ID=77d287c15844] [PERF] Execution time=0.173065
DEBUG - 2026-03-06 18:52:02 --> [REQ_ID=4d6447f761a1] [REQUEST][START] GET /index.php/How-It-Works/Setting-Financial-Goals
DEBUG - 2026-03-06 18:52:02 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-06 18:52:02 --> [REQ_ID=4d6447f761a1] [FILTER_BEFORE] /index.php/How-It-Works/Setting-Financial-Goals
DEBUG - 2026-03-06 18:52:02 --> [REQ_ID=4d6447f761a1] [ROUTE] Controller=\App\Modules\Blog\Controllers\HowItWorksController Method=show
DEBUG - 2026-03-06 18:52:02 --> [REQ_ID=4d6447f761a1] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/How-It-Works/Setting-Financial-Goals
DEBUG - 2026-03-06 18:52:02 --> [CSRF] token name=csrf_test_name hash=d8dba62d7c2cdfbdedc0457f032ad9c5
DEBUG - 2026-03-06 18:52:02 --> [REQ_ID=d79ddbbc84e0] [INIT] App\Modules\Blog\Controllers\HowItWorksController::GET
INFO - 2026-03-06 18:52:02 --> [REQ_ID=d79ddbbc84e0] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-06 18:52:02 --> [REQ_ID=d79ddbbc84e0] [METHOD_ENTRY] show
DEBUG - 2026-03-06 18:52:02 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-06 18:52:02 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-06 18:52:02 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-06 18:52:02 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-06 18:52:02 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-06 18:52:02 --> MyMICoin: guest context detected; skipping user-specific preload.
INFO - 2026-03-06 18:52:02 --> [REQ_ID=d79ddbbc84e0] [MEMORY][commonData:start] 4194304
DEBUG - 2026-03-06 18:52:03 --> [REQ_ID=d79ddbbc84e0] [VIEW_RENDER] App\Modules\Blog\Views\HowItWorks\Determining_Your_Financial_Goals
INFO - 2026-03-06 18:52:03 --> [REQ_ID=d79ddbbc84e0] [MEMORY][commonData:start] 8388608
INFO - 2026-03-06 18:52:03 --> themesMemory usage: 10485760
DEBUG - 2026-03-06 18:52:03 --> [REQ_ID=4d6447f761a1] [FILTER_AFTER]
DEBUG - 2026-03-06 18:52:03 --> [REQ_ID=4d6447f761a1] [LIFECYCLE][END] status=200 duration_ms=1,053.31 memory_delta=8388608
INFO - 2026-03-06 18:52:03 --> [REQ_ID=d79ddbbc84e0] [PERF] Execution time=1.053053
DEBUG - 2026-03-06 18:52:03 --> [REQ_ID=4d6447f761a1] [REQUEST][END]
INFO - 2026-03-06 18:52:03 --> [REQ_ID=4d6447f761a1] [PERF] Execution time=1.062570
DEBUG - 2026-03-06 18:52:13 --> [REQ_ID=fc47c0e8b052] [REQUEST][START] GET /index.php/Terms-Of-Service
DEBUG - 2026-03-06 18:52:13 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-06 18:52:13 --> [REQ_ID=ace9fddf24b0] [REQUEST][START] GET /index.php/How-It-Works/MyMI-Gold
DEBUG - 2026-03-06 18:52:13 --> [REQ_ID=a06499cceace] [REQUEST][START] GET /index.php/Privacy-Policy
DEBUG - 2026-03-06 18:52:13 --> [REQ_ID=75a8577d479a] [REQUEST][START] GET /index.php/Knowledgebase
DEBUG - 2026-03-06 18:52:13 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-06 18:52:13 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-06 18:52:13 --> [REQ_ID=fc47c0e8b052] [FILTER_BEFORE] /index.php/Terms-Of-Service
DEBUG - 2026-03-06 18:52:13 --> [REQ_ID=fc47c0e8b052] [ROUTE] Controller=\App\Controllers\Home Method=termsOfService
DEBUG - 2026-03-06 18:52:13 --> [REQ_ID=fc47c0e8b052] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Terms-Of-Service
DEBUG - 2026-03-06 18:52:13 --> [CSRF] token name=csrf_test_name hash=b713f9c5879f433114c58c78905312a1
DEBUG - 2026-03-06 18:52:13 --> [REQ_ID=dd3ede302580] [INIT] App\Controllers\Home::GET
INFO - 2026-03-06 18:52:13 --> [REQ_ID=dd3ede302580] [MEMORY][controller-start] 8388608
DEBUG - 2026-03-06 18:52:13 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-06 18:52:13 --> [REQ_ID=a06499cceace] [FILTER_BEFORE] /index.php/Privacy-Policy
DEBUG - 2026-03-06 18:52:13 --> [REQ_ID=a06499cceace] [ROUTE] Controller=\App\Controllers\Home Method=privacyPolicy
DEBUG - 2026-03-06 18:52:13 --> [REQ_ID=a06499cceace] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Privacy-Policy
DEBUG - 2026-03-06 18:52:13 --> [CSRF] token name=csrf_test_name hash=bc411e24b0c41368c5a2f2b8917e00d3
DEBUG - 2026-03-06 18:52:13 --> [REQ_ID=41015ebf8fd6] [INIT] App\Controllers\Home::GET
INFO - 2026-03-06 18:52:13 --> [REQ_ID=41015ebf8fd6] [MEMORY][controller-start] 8388608
DEBUG - 2026-03-06 18:52:13 --> [REQ_ID=ace9fddf24b0] [FILTER_BEFORE] /index.php/How-It-Works/MyMI-Gold
DEBUG - 2026-03-06 18:52:13 --> [REQ_ID=ace9fddf24b0] [ROUTE] Controller=\App\Modules\Blog\Controllers\HowItWorksController Method=show
DEBUG - 2026-03-06 18:52:13 --> [REQ_ID=ace9fddf24b0] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/How-It-Works/MyMI-Gold
DEBUG - 2026-03-06 18:52:13 --> [CSRF] token name=csrf_test_name hash=aa9164463d5e456af62299e9d3e75b6b
DEBUG - 2026-03-06 18:52:13 --> [REQ_ID=550050c0e0a4] [INIT] App\Modules\Blog\Controllers\HowItWorksController::GET
INFO - 2026-03-06 18:52:13 --> [REQ_ID=550050c0e0a4] [MEMORY][controller-start] 8388608
DEBUG - 2026-03-06 18:52:13 --> [REQ_ID=75a8577d479a] [FILTER_BEFORE] /index.php/Knowledgebase
DEBUG - 2026-03-06 18:52:13 --> [REQ_ID=75a8577d479a] [ROUTE] Controller=\App\Modules\User\Controllers\KnowledgebaseController Method=index
DEBUG - 2026-03-06 18:52:13 --> [REQ_ID=75a8577d479a] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Knowledgebase
DEBUG - 2026-03-06 18:52:13 --> [CSRF] token name=csrf_test_name hash=231e45b3714e5ad47a2f2a14bffe6a5a
DEBUG - 2026-03-06 18:52:13 --> [REQ_ID=75a8577d479a] [REQUEST][END]
INFO - 2026-03-06 18:52:13 --> [REQ_ID=75a8577d479a] [PERF] Execution time=0.029638
DEBUG - 2026-03-06 18:52:13 --> [REQ_ID=580973ee4f21] [REQUEST][START] GET /index.php
DEBUG - 2026-03-06 18:52:13 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-06 18:52:13 --> [REQ_ID=550050c0e0a4] [METHOD_ENTRY] show
DEBUG - 2026-03-06 18:52:13 --> [REQ_ID=580973ee4f21] [FILTER_BEFORE] /index.php
DEBUG - 2026-03-06 18:52:13 --> [REQ_ID=580973ee4f21] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-06 18:52:13 --> [REQ_ID=580973ee4f21] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-06 18:52:13 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-06 18:52:13 --> [CSRF] token name=csrf_test_name hash=e1af0d85eb67c9b5ee60bf7053b41ad3
DEBUG - 2026-03-06 18:52:13 --> [REQ_ID=f214f388d2a3] [INIT] App\Controllers\Home::GET
INFO - 2026-03-06 18:52:13 --> [REQ_ID=f214f388d2a3] [MEMORY][controller-start] 6291456
DEBUG - 2026-03-06 18:52:13 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-06 18:52:13 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-06 18:52:13 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-06 18:52:13 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-06 18:52:13 --> MyMICoin: guest context detected; skipping user-specific preload.
INFO - 2026-03-06 18:52:13 --> [REQ_ID=550050c0e0a4] [MEMORY][commonData:start] 8388608
INFO - 2026-03-06 18:52:13 --> [REQ_ID=f214f388d2a3] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-06 18:52:13 --> MyMIUser L52 - initialized (first log).
INFO - 2026-03-06 18:52:13 --> [REQ_ID=dd3ede302580] [MEMORY][commonData:start] 8388608
DEBUG - 2026-03-06 18:52:13 --> MyMIUser L52 - initialized (first log).
INFO - 2026-03-06 18:52:13 --> [REQ_ID=41015ebf8fd6] [MEMORY][commonData:start] 8388608
DEBUG - 2026-03-06 18:52:13 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-06 18:52:14 --> [REQ_ID=550050c0e0a4] [VIEW_RENDER] App\Modules\Blog\Views\HowItWorks\MyMI_Gold
INFO - 2026-03-06 18:52:14 --> [REQ_ID=550050c0e0a4] [MEMORY][commonData:start] 8388608
DEBUG - 2026-03-06 18:52:14 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
DEBUG - 2026-03-06 18:52:14 --> [REQ_ID=f214f388d2a3] [VIEW_RENDER] themes/public/home
INFO - 2026-03-06 18:52:14 --> [REQ_ID=f214f388d2a3] [MEMORY][commonData:start] 8388608
INFO - 2026-03-06 18:52:14 --> themesMemory usage: 8388608
DEBUG - 2026-03-06 18:52:14 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-06 18:52:14 --> [REQ_ID=580973ee4f21] [FILTER_AFTER]
DEBUG - 2026-03-06 18:52:14 --> [REQ_ID=580973ee4f21] [LIFECYCLE][END] status=200 duration_ms=509.78 memory_delta=2097152
INFO - 2026-03-06 18:52:14 --> [REQ_ID=f214f388d2a3] [PERF] Execution time=0.509498
DEBUG - 2026-03-06 18:52:14 --> [REQ_ID=580973ee4f21] [REQUEST][END]
INFO - 2026-03-06 18:52:14 --> [REQ_ID=580973ee4f21] [PERF] Execution time=0.519253
DEBUG - 2026-03-06 18:52:14 --> [MetaService] slug=privacy-policy pageName= cacheHit=1 path=CACHE
DEBUG - 2026-03-06 18:52:14 --> [REQ_ID=41015ebf8fd6] [VIEW_RENDER] themes/public/privacyPolicy
INFO - 2026-03-06 18:52:14 --> [REQ_ID=41015ebf8fd6] [MEMORY][commonData:start] 8388608
INFO - 2026-03-06 18:52:14 --> themesMemory usage: 8388608
DEBUG - 2026-03-06 18:52:14 --> [MetaService] slug=privacy-policy pageName=Privacy Policy cacheHit=1 path=CACHE
DEBUG - 2026-03-06 18:52:14 --> [REQ_ID=a06499cceace] [FILTER_AFTER]
DEBUG - 2026-03-06 18:52:14 --> [REQ_ID=a06499cceace] [LIFECYCLE][END] status=200 duration_ms=560.29 memory_delta=0
INFO - 2026-03-06 18:52:14 --> [REQ_ID=41015ebf8fd6] [PERF] Execution time=0.559715
DEBUG - 2026-03-06 18:52:14 --> [REQ_ID=a06499cceace] [REQUEST][END]
INFO - 2026-03-06 18:52:14 --> [REQ_ID=a06499cceace] [PERF] Execution time=0.582783
DEBUG - 2026-03-06 18:52:14 --> [MetaService] slug=terms-of-service pageName= cacheHit=1 path=CACHE
DEBUG - 2026-03-06 18:52:14 --> [REQ_ID=dd3ede302580] [VIEW_RENDER] themes/public/termsOfService
INFO - 2026-03-06 18:52:14 --> [REQ_ID=dd3ede302580] [MEMORY][commonData:start] 8388608
INFO - 2026-03-06 18:52:14 --> themesMemory usage: 8388608
DEBUG - 2026-03-06 18:52:14 --> [MetaService] slug=terms-of-service pageName=Terms of Service cacheHit=1 path=CACHE
DEBUG - 2026-03-06 18:52:14 --> [REQ_ID=fc47c0e8b052] [FILTER_AFTER]
DEBUG - 2026-03-06 18:52:14 --> [REQ_ID=fc47c0e8b052] [LIFECYCLE][END] status=200 duration_ms=597.38 memory_delta=0
INFO - 2026-03-06 18:52:14 --> [REQ_ID=dd3ede302580] [PERF] Execution time=0.596726
DEBUG - 2026-03-06 18:52:14 --> [REQ_ID=fc47c0e8b052] [REQUEST][END]
INFO - 2026-03-06 18:52:14 --> [REQ_ID=fc47c0e8b052] [PERF] Execution time=0.613920
DEBUG - 2026-03-06 18:52:14 --> [REQ_ID=502a2fb4535b] [REQUEST][START] GET /index.php/How-It-Works/MyMI-Exchange
DEBUG - 2026-03-06 18:52:14 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-06 18:52:14 --> [REQ_ID=502a2fb4535b] [FILTER_BEFORE] /index.php/How-It-Works/MyMI-Exchange
DEBUG - 2026-03-06 18:52:14 --> [REQ_ID=502a2fb4535b] [ROUTE] Controller=\App\Modules\Blog\Controllers\HowItWorksController Method=show
DEBUG - 2026-03-06 18:52:14 --> [REQ_ID=502a2fb4535b] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/How-It-Works/MyMI-Exchange
DEBUG - 2026-03-06 18:52:14 --> [CSRF] token name=csrf_test_name hash=6d61f7f12c89ba796cafa189a8f51efa
DEBUG - 2026-03-06 18:52:14 --> [REQ_ID=845282de7769] [INIT] App\Modules\Blog\Controllers\HowItWorksController::GET
INFO - 2026-03-06 18:52:14 --> [REQ_ID=845282de7769] [MEMORY][controller-start] 8388608
DEBUG - 2026-03-06 18:52:14 --> [REQ_ID=845282de7769] [METHOD_ENTRY] show
DEBUG - 2026-03-06 18:52:14 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-06 18:52:14 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-06 18:52:14 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-06 18:52:14 --> [REQ_ID=479eaea597ed] [REQUEST][START] GET /index.php/Support
DEBUG - 2026-03-06 18:52:14 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-06 18:52:14 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-06 18:52:14 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-06 18:52:14 --> MyMICoin: guest context detected; skipping user-specific preload.
INFO - 2026-03-06 18:52:14 --> [REQ_ID=845282de7769] [MEMORY][commonData:start] 8388608
DEBUG - 2026-03-06 18:52:14 --> [REQ_ID=479eaea597ed] [FILTER_BEFORE] /index.php/Support
DEBUG - 2026-03-06 18:52:14 --> [REQ_ID=479eaea597ed] [ROUTE] Controller=\App\Modules\Support\Controllers\SupportController Method=index
DEBUG - 2026-03-06 18:52:14 --> [REQ_ID=479eaea597ed] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Support
DEBUG - 2026-03-06 18:52:14 --> [CSRF] token name=csrf_test_name hash=61f8dc0a21daa46d29a8a691211caef8
DEBUG - 2026-03-06 18:52:14 --> [REQ_ID=1d9ecf407405] [INIT] App\Modules\Support\Controllers\SupportController::GET
INFO - 2026-03-06 18:52:14 --> [REQ_ID=1d9ecf407405] [MEMORY][controller-start] 8388608
DEBUG - 2026-03-06 18:52:14 --> [REQ_ID=1d9ecf407405] [METHOD_ENTRY] index
DEBUG - 2026-03-06 18:52:14 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-06 18:52:14 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-06 18:52:14 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-06 18:52:14 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-06 18:52:14 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-06 18:52:14 --> MyMICoin: guest context detected; skipping user-specific preload.
INFO - 2026-03-06 18:52:14 --> [REQ_ID=1d9ecf407405] [MEMORY][commonData:start] 8388608
DEBUG - 2026-03-06 18:52:14 --> [REQ_ID=1d9ecf407405] [VIEW_RENDER] SupportModule\Views\Support\index
INFO - 2026-03-06 18:52:14 --> [REQ_ID=1d9ecf407405] [MEMORY][commonData:start] 8388608
INFO - 2026-03-06 18:52:14 --> themesMemory usage: 10485760
INFO - 2026-03-06 18:52:14 --> themesMemory usage: 8388608
DEBUG - 2026-03-06 18:52:14 --> [REQ_ID=ace9fddf24b0] [FILTER_AFTER]
DEBUG - 2026-03-06 18:52:14 --> [REQ_ID=ace9fddf24b0] [LIFECYCLE][END] status=200 duration_ms=1,014.92 memory_delta=4194304
INFO - 2026-03-06 18:52:14 --> [REQ_ID=550050c0e0a4] [PERF] Execution time=1.014344
DEBUG - 2026-03-06 18:52:14 --> [REQ_ID=ace9fddf24b0] [REQUEST][END]
INFO - 2026-03-06 18:52:14 --> [REQ_ID=ace9fddf24b0] [PERF] Execution time=1.052618
DEBUG - 2026-03-06 18:52:14 --> [REQ_ID=479eaea597ed] [FILTER_AFTER]
DEBUG - 2026-03-06 18:52:14 --> [REQ_ID=479eaea597ed] [LIFECYCLE][END] status=200 duration_ms=27.83 memory_delta=0
INFO - 2026-03-06 18:52:14 --> [REQ_ID=1d9ecf407405] [PERF] Execution time=0.027989
DEBUG - 2026-03-06 18:52:14 --> [REQ_ID=479eaea597ed] [REQUEST][END]
INFO - 2026-03-06 18:52:14 --> [REQ_ID=479eaea597ed] [PERF] Execution time=0.038286
DEBUG - 2026-03-06 18:52:15 --> [REQ_ID=845282de7769] [VIEW_RENDER] App\Modules\Blog\Views\HowItWorks\Manage_Finances
INFO - 2026-03-06 18:52:15 --> [REQ_ID=845282de7769] [MEMORY][commonData:start] 8388608
INFO - 2026-03-06 18:52:15 --> themesMemory usage: 10485760
DEBUG - 2026-03-06 18:52:15 --> [REQ_ID=502a2fb4535b] [FILTER_AFTER]
DEBUG - 2026-03-06 18:52:15 --> [REQ_ID=502a2fb4535b] [LIFECYCLE][END] status=200 duration_ms=988.06 memory_delta=4194304
INFO - 2026-03-06 18:52:15 --> [REQ_ID=845282de7769] [PERF] Execution time=0.987842
DEBUG - 2026-03-06 18:52:15 --> [REQ_ID=502a2fb4535b] [REQUEST][END]
INFO - 2026-03-06 18:52:15 --> [REQ_ID=502a2fb4535b] [PERF] Execution time=0.999155
DEBUG - 2026-03-06 18:52:24 --> [REQ_ID=966ce703b81d] [REQUEST][START] GET /index.php/How-It-Works/Investment-Portfolio-Management
DEBUG - 2026-03-06 18:52:24 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-06 18:52:24 --> [REQ_ID=05c647e67b9f] [REQUEST][START] GET /index.php/Legal/Privacy-Policy
DEBUG - 2026-03-06 18:52:24 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-06 18:52:24 --> [REQ_ID=84073a03bd4a] [REQUEST][START] GET /index.php/How-It-Works/Investor-Profile
DEBUG - 2026-03-06 18:52:24 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-06 18:52:24 --> [REQ_ID=05c647e67b9f] [FILTER_BEFORE] /index.php/Legal/Privacy-Policy
DEBUG - 2026-03-06 18:52:24 --> [REQ_ID=05c647e67b9f] [ROUTE] Controller=\App\Controllers\Home Method=privacyPolicy
DEBUG - 2026-03-06 18:52:24 --> [REQ_ID=05c647e67b9f] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Legal/Privacy-Policy
DEBUG - 2026-03-06 18:52:24 --> [CSRF] token name=csrf_test_name hash=f728c1f7fc4e44c85616311fbfdfeebc
DEBUG - 2026-03-06 18:52:24 --> [REQ_ID=527bc913e700] [REQUEST][START] GET /index.php/Legal/Terms-And-Conditions
DEBUG - 2026-03-06 18:52:24 --> [REQ_ID=05c647e67b9f] [REQUEST][END]
INFO - 2026-03-06 18:52:24 --> [REQ_ID=05c647e67b9f] [PERF] Execution time=0.020919
DEBUG - 2026-03-06 18:52:24 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-06 18:52:24 --> [REQ_ID=527bc913e700] [FILTER_BEFORE] /index.php/Legal/Terms-And-Conditions
DEBUG - 2026-03-06 18:52:24 --> [REQ_ID=527bc913e700] [ROUTE] Controller=\App\Controllers\Home Method=terms
DEBUG - 2026-03-06 18:52:24 --> [REQ_ID=527bc913e700] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Legal/Terms-And-Conditions
DEBUG - 2026-03-06 18:52:24 --> [REQ_ID=966ce703b81d] [FILTER_BEFORE] /index.php/How-It-Works/Investment-Portfolio-Management
DEBUG - 2026-03-06 18:52:24 --> [REQ_ID=966ce703b81d] [ROUTE] Controller=\App\Modules\Blog\Controllers\HowItWorksController Method=show
DEBUG - 2026-03-06 18:52:24 --> [CSRF] token name=csrf_test_name hash=1c98851b490666c78492240cdda98788
DEBUG - 2026-03-06 18:52:24 --> [REQ_ID=966ce703b81d] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/How-It-Works/Investment-Portfolio-Management
DEBUG - 2026-03-06 18:52:24 --> [CSRF] token name=csrf_test_name hash=d14472fdf09df71b3585ed06f1232582
DEBUG - 2026-03-06 18:52:24 --> [REQ_ID=e99381a4c1ca] [INIT] App\Modules\Blog\Controllers\HowItWorksController::GET
INFO - 2026-03-06 18:52:24 --> [REQ_ID=e99381a4c1ca] [MEMORY][controller-start] 10485760
DEBUG - 2026-03-06 18:52:24 --> [REQ_ID=527bc913e700] [REQUEST][END]
INFO - 2026-03-06 18:52:24 --> [REQ_ID=527bc913e700] [PERF] Execution time=0.020734
DEBUG - 2026-03-06 18:52:24 --> [REQ_ID=84073a03bd4a] [FILTER_BEFORE] /index.php/How-It-Works/Investor-Profile
DEBUG - 2026-03-06 18:52:24 --> [REQ_ID=84073a03bd4a] [ROUTE] Controller=\App\Modules\Blog\Controllers\HowItWorksController Method=show
DEBUG - 2026-03-06 18:52:24 --> [REQ_ID=84073a03bd4a] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/How-It-Works/Investor-Profile
DEBUG - 2026-03-06 18:52:24 --> [CSRF] token name=csrf_test_name hash=fe5aebd68a8414927674615ce2b36d6f
DEBUG - 2026-03-06 18:52:24 --> [REQ_ID=7a1d1f89dcf0] [INIT] App\Modules\Blog\Controllers\HowItWorksController::GET
INFO - 2026-03-06 18:52:24 --> [REQ_ID=7a1d1f89dcf0] [MEMORY][controller-start] 6291456
DEBUG - 2026-03-06 18:52:24 --> [REQ_ID=9e17795d4da0] [REQUEST][START] GET /index.php/How-It-Works/Registering-An-Account
DEBUG - 2026-03-06 18:52:24 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-06 18:52:24 --> [REQ_ID=e99381a4c1ca] [METHOD_ENTRY] show
DEBUG - 2026-03-06 18:52:24 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-06 18:52:24 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-06 18:52:24 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-06 18:52:24 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-06 18:52:24 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-06 18:52:24 --> [REQ_ID=ceade327da86] [REQUEST][START] GET /index.php/How-It-Works/Setting-Financial-Goals
DEBUG - 2026-03-06 18:52:24 --> [REQ_ID=7a1d1f89dcf0] [METHOD_ENTRY] show
DEBUG - 2026-03-06 18:52:24 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-06 18:52:24 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-06 18:52:24 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-06 18:52:24 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-06 18:52:24 --> [REQ_ID=9e17795d4da0] [FILTER_BEFORE] /index.php/How-It-Works/Registering-An-Account
DEBUG - 2026-03-06 18:52:24 --> [REQ_ID=9e17795d4da0] [ROUTE] Controller=\App\Modules\Blog\Controllers\HowItWorksController Method=show
DEBUG - 2026-03-06 18:52:24 --> [REQ_ID=9e17795d4da0] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/How-It-Works/Registering-An-Account
DEBUG - 2026-03-06 18:52:24 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-06 18:52:24 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-06 18:52:24 --> MyMICoin: guest context detected; skipping user-specific preload.
ERROR - 2026-03-06 18:52:24 --> [ERROR_PAGE] event=error_404 status=404 message=Page not found.
DEBUG - 2026-03-06 18:52:24 --> [CSRF] token name=csrf_test_name hash=14bd0b62389e43ca9d296192901d9add
DEBUG - 2026-03-06 18:52:24 --> [REQ_ID=7a86464be745] [INIT] App\Modules\Blog\Controllers\HowItWorksController::GET
INFO - 2026-03-06 18:52:24 --> [REQ_ID=7a86464be745] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-06 18:52:24 --> [REQ_ID=966ce703b81d] [FILTER_AFTER]
DEBUG - 2026-03-06 18:52:24 --> [REQ_ID=966ce703b81d] [LIFECYCLE][END] status=404 duration_ms=28.61 memory_delta=0
INFO - 2026-03-06 18:52:24 --> [REQ_ID=e99381a4c1ca] [PERF] Execution time=0.027208
DEBUG - 2026-03-06 18:52:24 --> [REQ_ID=966ce703b81d] [REQUEST][END]
INFO - 2026-03-06 18:52:24 --> [REQ_ID=966ce703b81d] [PERF] Execution time=0.074952
DEBUG - 2026-03-06 18:52:24 --> MyMICoin: guest context detected; skipping user-specific preload.
ERROR - 2026-03-06 18:52:24 --> [ERROR_PAGE] event=error_404 status=404 message=Page not found.
DEBUG - 2026-03-06 18:52:24 --> [REQ_ID=84073a03bd4a] [FILTER_AFTER]
DEBUG - 2026-03-06 18:52:24 --> [REQ_ID=84073a03bd4a] [LIFECYCLE][END] status=404 duration_ms=28.59 memory_delta=0
INFO - 2026-03-06 18:52:24 --> [REQ_ID=7a1d1f89dcf0] [PERF] Execution time=0.027685
DEBUG - 2026-03-06 18:52:24 --> [REQ_ID=ceade327da86] [FILTER_BEFORE] /index.php/How-It-Works/Setting-Financial-Goals
DEBUG - 2026-03-06 18:52:24 --> [REQ_ID=ceade327da86] [ROUTE] Controller=\App\Modules\Blog\Controllers\HowItWorksController Method=show
DEBUG - 2026-03-06 18:52:24 --> [REQ_ID=ceade327da86] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/How-It-Works/Setting-Financial-Goals
DEBUG - 2026-03-06 18:52:24 --> [REQ_ID=84073a03bd4a] [REQUEST][END]
INFO - 2026-03-06 18:52:24 --> [REQ_ID=84073a03bd4a] [PERF] Execution time=0.065742
DEBUG - 2026-03-06 18:52:24 --> [CSRF] token name=csrf_test_name hash=e8281770e7dace2182b2c2c88241838b
DEBUG - 2026-03-06 18:52:24 --> [REQ_ID=2c2c526a6427] [INIT] App\Modules\Blog\Controllers\HowItWorksController::GET
INFO - 2026-03-06 18:52:24 --> [REQ_ID=2c2c526a6427] [MEMORY][controller-start] 6291456
DEBUG - 2026-03-06 18:52:24 --> [REQ_ID=7a86464be745] [METHOD_ENTRY] show
DEBUG - 2026-03-06 18:52:24 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-06 18:52:24 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-06 18:52:24 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-06 18:52:24 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-06 18:52:24 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-06 18:52:24 --> [REQ_ID=54aeb51556e9] [REQUEST][START] GET /index.php/How-It-Works/MyMI-Gold
DEBUG - 2026-03-06 18:52:24 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-06 18:52:24 --> MyMICoin: guest context detected; skipping user-specific preload.
INFO - 2026-03-06 18:52:24 --> [REQ_ID=7a86464be745] [MEMORY][commonData:start] 4194304
DEBUG - 2026-03-06 18:52:24 --> [REQ_ID=2c2c526a6427] [METHOD_ENTRY] show
DEBUG - 2026-03-06 18:52:24 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-06 18:52:24 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-06 18:52:24 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-06 18:52:24 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-06 18:52:24 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-06 18:52:24 --> [REQ_ID=54aeb51556e9] [FILTER_BEFORE] /index.php/How-It-Works/MyMI-Gold
DEBUG - 2026-03-06 18:52:24 --> [REQ_ID=54aeb51556e9] [ROUTE] Controller=\App\Modules\Blog\Controllers\HowItWorksController Method=show
DEBUG - 2026-03-06 18:52:24 --> [REQ_ID=54aeb51556e9] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/How-It-Works/MyMI-Gold
DEBUG - 2026-03-06 18:52:24 --> [CSRF] token name=csrf_test_name hash=d4b153dc4bc5766031022de9727865ff
DEBUG - 2026-03-06 18:52:24 --> [REQ_ID=20124572911a] [INIT] App\Modules\Blog\Controllers\HowItWorksController::GET
INFO - 2026-03-06 18:52:24 --> [REQ_ID=20124572911a] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-06 18:52:24 --> MyMICoin: guest context detected; skipping user-specific preload.
INFO - 2026-03-06 18:52:24 --> [REQ_ID=2c2c526a6427] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-06 18:52:24 --> [REQ_ID=20124572911a] [METHOD_ENTRY] show
DEBUG - 2026-03-06 18:52:24 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-06 18:52:24 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-06 18:52:24 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-06 18:52:24 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-06 18:52:24 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-06 18:52:24 --> MyMICoin: guest context detected; skipping user-specific preload.
INFO - 2026-03-06 18:52:24 --> [REQ_ID=20124572911a] [MEMORY][commonData:start] 4194304
DEBUG - 2026-03-06 18:52:24 --> [REQ_ID=7a86464be745] [VIEW_RENDER] App\Modules\Blog\Views\HowItWorks\Registering_An_Account
INFO - 2026-03-06 18:52:24 --> [REQ_ID=7a86464be745] [MEMORY][commonData:start] 8388608
DEBUG - 2026-03-06 18:52:24 --> [REQ_ID=2c2c526a6427] [VIEW_RENDER] App\Modules\Blog\Views\HowItWorks\Determining_Your_Financial_Goals
INFO - 2026-03-06 18:52:24 --> [REQ_ID=2c2c526a6427] [MEMORY][commonData:start] 8388608
DEBUG - 2026-03-06 18:52:25 --> [REQ_ID=20124572911a] [VIEW_RENDER] App\Modules\Blog\Views\HowItWorks\MyMI_Gold
INFO - 2026-03-06 18:52:25 --> [REQ_ID=20124572911a] [MEMORY][commonData:start] 8388608
DEBUG - 2026-03-06 18:52:25 --> [REQ_ID=7b188182c098] [REQUEST][START] GET /index.php/How-It-Works/Daily-Financial-News
DEBUG - 2026-03-06 18:52:25 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-06 18:52:25 --> [REQ_ID=7b188182c098] [FILTER_BEFORE] /index.php/How-It-Works/Daily-Financial-News
DEBUG - 2026-03-06 18:52:25 --> [REQ_ID=7b188182c098] [ROUTE] Controller=\App\Modules\Blog\Controllers\HowItWorksController Method=show
DEBUG - 2026-03-06 18:52:25 --> [REQ_ID=7b188182c098] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/How-It-Works/Daily-Financial-News
DEBUG - 2026-03-06 18:52:25 --> [CSRF] token name=csrf_test_name hash=fe4f774be0c4aaf214febf860c0841e1
DEBUG - 2026-03-06 18:52:25 --> [REQ_ID=7c1f53c5f5d8] [INIT] App\Modules\Blog\Controllers\HowItWorksController::GET
INFO - 2026-03-06 18:52:25 --> [REQ_ID=7c1f53c5f5d8] [MEMORY][controller-start] 6291456
INFO - 2026-03-06 18:52:25 --> themesMemory usage: 10485760
DEBUG - 2026-03-06 18:52:25 --> [REQ_ID=7c1f53c5f5d8] [METHOD_ENTRY] show
DEBUG - 2026-03-06 18:52:25 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-06 18:52:25 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-06 18:52:25 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-06 18:52:25 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-06 18:52:25 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-06 18:52:25 --> [REQ_ID=9e17795d4da0] [FILTER_AFTER]
DEBUG - 2026-03-06 18:52:25 --> [REQ_ID=9e17795d4da0] [LIFECYCLE][END] status=200 duration_ms=981.47 memory_delta=8388608
INFO - 2026-03-06 18:52:25 --> [REQ_ID=7a86464be745] [PERF] Execution time=0.979514
DEBUG - 2026-03-06 18:52:25 --> [REQ_ID=9e17795d4da0] [REQUEST][END]
INFO - 2026-03-06 18:52:25 --> [REQ_ID=9e17795d4da0] [PERF] Execution time=0.998104
DEBUG - 2026-03-06 18:52:25 --> MyMICoin: guest context detected; skipping user-specific preload.
ERROR - 2026-03-06 18:52:25 --> [ERROR_PAGE] event=error_404 status=404 message=Page not found.
DEBUG - 2026-03-06 18:52:25 --> [REQ_ID=7b188182c098] [FILTER_AFTER]
DEBUG - 2026-03-06 18:52:25 --> [REQ_ID=7b188182c098] [LIFECYCLE][END] status=404 duration_ms=25.09 memory_delta=0
INFO - 2026-03-06 18:52:25 --> [REQ_ID=7c1f53c5f5d8] [PERF] Execution time=0.024419
DEBUG - 2026-03-06 18:52:25 --> [REQ_ID=7b188182c098] [REQUEST][END]
INFO - 2026-03-06 18:52:25 --> [REQ_ID=7b188182c098] [PERF] Execution time=0.043205
INFO - 2026-03-06 18:52:25 --> themesMemory usage: 10485760
DEBUG - 2026-03-06 18:52:25 --> [REQ_ID=ceade327da86] [FILTER_AFTER]
DEBUG - 2026-03-06 18:52:25 --> [REQ_ID=ceade327da86] [LIFECYCLE][END] status=200 duration_ms=1,041.72 memory_delta=6291456
INFO - 2026-03-06 18:52:25 --> [REQ_ID=2c2c526a6427] [PERF] Execution time=1.040884
DEBUG - 2026-03-06 18:52:25 --> [REQ_ID=ceade327da86] [REQUEST][END]
INFO - 2026-03-06 18:52:25 --> [REQ_ID=ceade327da86] [PERF] Execution time=1.063077
DEBUG - 2026-03-06 18:52:25 --> [REQ_ID=81a0669a9a75] [REQUEST][START] GET /index.php/How-It-Works/Automated-Financial-Insights
DEBUG - 2026-03-06 18:52:25 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-06 18:52:25 --> [REQ_ID=c64b88129817] [REQUEST][START] GET /index.php/Dashboard
DEBUG - 2026-03-06 18:52:25 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-06 18:52:25 --> [REQ_ID=81a0669a9a75] [FILTER_BEFORE] /index.php/How-It-Works/Automated-Financial-Insights
DEBUG - 2026-03-06 18:52:25 --> [REQ_ID=81a0669a9a75] [ROUTE] Controller=\App\Modules\Blog\Controllers\HowItWorksController Method=show
DEBUG - 2026-03-06 18:52:25 --> [REQ_ID=81a0669a9a75] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/How-It-Works/Automated-Financial-Insights
DEBUG - 2026-03-06 18:52:25 --> [CSRF] token name=csrf_test_name hash=a588100239ab8288844281e72a3ebd76
DEBUG - 2026-03-06 18:52:25 --> [REQ_ID=baf10ab7f641] [INIT] App\Modules\Blog\Controllers\HowItWorksController::GET
INFO - 2026-03-06 18:52:25 --> [REQ_ID=baf10ab7f641] [MEMORY][controller-start] 6291456
DEBUG - 2026-03-06 18:52:25 --> [REQ_ID=c64b88129817] [FILTER_BEFORE] /index.php/Dashboard
DEBUG - 2026-03-06 18:52:25 --> [REQ_ID=c64b88129817] [ROUTE] Controller=\App\Modules\User\Controllers\DashboardController Method=index
DEBUG - 2026-03-06 18:52:25 --> [REQ_ID=c64b88129817] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Dashboard
DEBUG - 2026-03-06 18:52:25 --> [CSRF] token name=csrf_test_name hash=944dff6e9fa29edd77ef5da757db879a
DEBUG - 2026-03-06 18:52:25 --> [REQ_ID=c64b88129817] [REQUEST][END]
INFO - 2026-03-06 18:52:25 --> [REQ_ID=c64b88129817] [PERF] Execution time=0.075294
DEBUG - 2026-03-06 18:52:25 --> [REQ_ID=baf10ab7f641] [METHOD_ENTRY] show
DEBUG - 2026-03-06 18:52:25 --> MyMIUser L52 - initialized (first log).
INFO - 2026-03-06 18:52:25 --> themesMemory usage: 10485760
DEBUG - 2026-03-06 18:52:25 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-06 18:52:25 --> [REQ_ID=54aeb51556e9] [FILTER_AFTER]
DEBUG - 2026-03-06 18:52:25 --> [REQ_ID=54aeb51556e9] [LIFECYCLE][END] status=200 duration_ms=1,208.97 memory_delta=8388608
INFO - 2026-03-06 18:52:25 --> [REQ_ID=20124572911a] [PERF] Execution time=1.210126
DEBUG - 2026-03-06 18:52:25 --> [REQ_ID=54aeb51556e9] [REQUEST][END]
INFO - 2026-03-06 18:52:25 --> [REQ_ID=54aeb51556e9] [PERF] Execution time=1.221180
DEBUG - 2026-03-06 18:52:25 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-06 18:52:25 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-06 18:52:25 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-06 18:52:25 --> MyMICoin: guest context detected; skipping user-specific preload.
ERROR - 2026-03-06 18:52:25 --> [ERROR_PAGE] event=error_404 status=404 message=Page not found.
DEBUG - 2026-03-06 18:52:25 --> [REQ_ID=81a0669a9a75] [FILTER_AFTER]
DEBUG - 2026-03-06 18:52:25 --> [REQ_ID=81a0669a9a75] [LIFECYCLE][END] status=404 duration_ms=113.07 memory_delta=0
INFO - 2026-03-06 18:52:25 --> [REQ_ID=baf10ab7f641] [PERF] Execution time=0.109464
DEBUG - 2026-03-06 18:52:25 --> [REQ_ID=81a0669a9a75] [REQUEST][END]
INFO - 2026-03-06 18:52:25 --> [REQ_ID=81a0669a9a75] [PERF] Execution time=0.170360
DEBUG - 2026-03-06 18:52:26 --> [REQ_ID=392805be3b63] [REQUEST][START] GET /index.php/How-It-Works/MyMI-Exchange
DEBUG - 2026-03-06 18:52:26 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-06 18:52:26 --> [REQ_ID=392805be3b63] [FILTER_BEFORE] /index.php/How-It-Works/MyMI-Exchange
DEBUG - 2026-03-06 18:52:26 --> [REQ_ID=392805be3b63] [ROUTE] Controller=\App\Modules\Blog\Controllers\HowItWorksController Method=show
DEBUG - 2026-03-06 18:52:26 --> [REQ_ID=392805be3b63] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/How-It-Works/MyMI-Exchange
DEBUG - 2026-03-06 18:52:26 --> [CSRF] token name=csrf_test_name hash=7afbc19b0e8f2e91f250f746b318c87b
DEBUG - 2026-03-06 18:52:26 --> [REQ_ID=86d68db0eea0] [INIT] App\Modules\Blog\Controllers\HowItWorksController::GET
INFO - 2026-03-06 18:52:26 --> [REQ_ID=86d68db0eea0] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-06 18:52:26 --> [REQ_ID=86d68db0eea0] [METHOD_ENTRY] show
DEBUG - 2026-03-06 18:52:26 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-06 18:52:26 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-06 18:52:26 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-06 18:52:26 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-06 18:52:26 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-06 18:52:26 --> MyMICoin: guest context detected; skipping user-specific preload.
INFO - 2026-03-06 18:52:26 --> [REQ_ID=86d68db0eea0] [MEMORY][commonData:start] 4194304
DEBUG - 2026-03-06 18:52:27 --> [REQ_ID=86d68db0eea0] [VIEW_RENDER] App\Modules\Blog\Views\HowItWorks\Manage_Finances
INFO - 2026-03-06 18:52:27 --> [REQ_ID=86d68db0eea0] [MEMORY][commonData:start] 8388608
INFO - 2026-03-06 18:52:27 --> themesMemory usage: 12582912
DEBUG - 2026-03-06 18:52:27 --> [REQ_ID=392805be3b63] [FILTER_AFTER]
DEBUG - 2026-03-06 18:52:27 --> [REQ_ID=392805be3b63] [LIFECYCLE][END] status=200 duration_ms=1,001.51 memory_delta=8388608
INFO - 2026-03-06 18:52:27 --> [REQ_ID=86d68db0eea0] [PERF] Execution time=1.001296
DEBUG - 2026-03-06 18:52:27 --> [REQ_ID=392805be3b63] [REQUEST][END]
INFO - 2026-03-06 18:52:27 --> [REQ_ID=392805be3b63] [PERF] Execution time=1.010767
DEBUG - 2026-03-06 18:56:19 --> [REQ_ID=1e3fbd6273f8] [REQUEST][START] HEAD /
DEBUG - 2026-03-06 18:56:19 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-06 18:56:19 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-06 18:56:19 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-06 18:56:19 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-06 18:56:19 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
INFO - 2026-03-06 19:00:01 --> [spark:ops:work] Started
INFO - 2026-03-06 19:00:01 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-03-06 19:00:01 --> [SPARK_MEMORY] 16777216
INFO - 2026-03-06 19:00:01 --> [spark:ops:work] Intent
DEBUG - 2026-03-06 19:00:01 --> [REQ_ID=8f0347016afc] [REQUEST][START] GET /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-06 19:00:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-06 19:00:01 --> [REQ_ID=8f0347016afc] [FILTER_BEFORE] /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-06 19:00:01 --> [REQ_ID=8f0347016afc] [ROUTE] Controller=\App\Modules\Management\Controllers\ManagementAPIController Method=Run_CRON_Tasks
DEBUG - 2026-03-06 19:00:01 --> [REQ_ID=8f0347016afc] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-06 19:00:01 --> [REQ_ID=8f0347016afc] [REQUEST][END]
INFO - 2026-03-06 19:00:01 --> [REQ_ID=8f0347016afc] [PERF] Execution time=0.048051
INFO - 2026-03-06 19:00:01 --> [spark:ops:work] Completed
INFO - 2026-03-06 19:00:01 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.106302
INFO - 2026-03-06 19:00:01 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-03-06 19:01:19 --> [REQ_ID=85cee8e033bb] [REQUEST][START] HEAD /
DEBUG - 2026-03-06 19:01:19 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-06 19:01:19 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-06 19:01:19 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-06 19:01:19 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-06 19:01:19 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-06 19:06:19 --> [REQ_ID=90842c069a65] [REQUEST][START] HEAD /
DEBUG - 2026-03-06 19:06:19 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-06 19:06:19 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-06 19:06:19 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-06 19:06:19 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-06 19:06:19 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-06 19:07:37 --> [REQ_ID=e24a5e8986f4] [REQUEST][START] GET /
DEBUG - 2026-03-06 19:07:37 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-06 19:07:37 --> [REQ_ID=e24a5e8986f4] [FILTER_BEFORE] /
DEBUG - 2026-03-06 19:07:37 --> [REQ_ID=e24a5e8986f4] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-06 19:07:37 --> [REQ_ID=e24a5e8986f4] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-06 19:07:37 --> [CSRF] token name=csrf_test_name hash=d2146989f6f49a36e90bbec53a010e86
DEBUG - 2026-03-06 19:07:37 --> [REQ_ID=e3e78b9376b5] [INIT] App\Controllers\Home::GET
INFO - 2026-03-06 19:07:37 --> [REQ_ID=e3e78b9376b5] [MEMORY][controller-start] 6291456
INFO - 2026-03-06 19:07:38 --> [REQ_ID=e3e78b9376b5] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-06 19:07:38 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-06 19:07:38 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-03-06 19:07:38 --> [REQ_ID=e3e78b9376b5] [VIEW_RENDER] themes/public/home
INFO - 2026-03-06 19:07:38 --> [REQ_ID=e3e78b9376b5] [MEMORY][commonData:start] 10485760
INFO - 2026-03-06 19:07:38 --> themesMemory usage: 10485760
DEBUG - 2026-03-06 19:07:38 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-06 19:07:38 --> [REQ_ID=e24a5e8986f4] [FILTER_AFTER]
DEBUG - 2026-03-06 19:07:38 --> [REQ_ID=e24a5e8986f4] [LIFECYCLE][END] status=200 duration_ms=741.56 memory_delta=4194304
INFO - 2026-03-06 19:07:38 --> [REQ_ID=e3e78b9376b5] [PERF] Execution time=0.739596
DEBUG - 2026-03-06 19:07:38 --> [REQ_ID=e24a5e8986f4] [REQUEST][END]
INFO - 2026-03-06 19:07:38 --> [REQ_ID=e24a5e8986f4] [PERF] Execution time=0.779942
DEBUG - 2026-03-06 19:11:19 --> [REQ_ID=60d3f63e3504] [REQUEST][START] HEAD /
DEBUG - 2026-03-06 19:11:19 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-06 19:11:19 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-06 19:11:19 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-06 19:11:19 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-06 19:11:19 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-06 19:14:11 --> [REQ_ID=fbf0fa09e819] [REQUEST][START] GET /
DEBUG - 2026-03-06 19:14:11 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-06 19:14:11 --> [REQ_ID=fbf0fa09e819] [FILTER_BEFORE] /
DEBUG - 2026-03-06 19:14:11 --> [REQ_ID=fbf0fa09e819] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-06 19:14:11 --> [REQ_ID=fbf0fa09e819] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-06 19:14:11 --> [CSRF] token name=csrf_test_name hash=cabb71ba39b6989bf2fe04ad1caf1fb3
DEBUG - 2026-03-06 19:14:11 --> [REQ_ID=4369bf3c4112] [INIT] App\Controllers\Home::GET
INFO - 2026-03-06 19:14:11 --> [REQ_ID=4369bf3c4112] [MEMORY][controller-start] 6291456
INFO - 2026-03-06 19:14:12 --> [REQ_ID=4369bf3c4112] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-06 19:14:12 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-06 19:14:12 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
DEBUG - 2026-03-06 19:14:12 --> [REQ_ID=4369bf3c4112] [VIEW_RENDER] themes/public/home
INFO - 2026-03-06 19:14:12 --> [REQ_ID=4369bf3c4112] [MEMORY][commonData:start] 10485760
INFO - 2026-03-06 19:14:12 --> themesMemory usage: 10485760
DEBUG - 2026-03-06 19:14:12 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-06 19:14:12 --> [REQ_ID=fbf0fa09e819] [FILTER_AFTER]
DEBUG - 2026-03-06 19:14:12 --> [REQ_ID=fbf0fa09e819] [LIFECYCLE][END] status=200 duration_ms=647.70 memory_delta=4194304
INFO - 2026-03-06 19:14:12 --> [REQ_ID=4369bf3c4112] [PERF] Execution time=0.645655
DEBUG - 2026-03-06 19:14:12 --> [REQ_ID=fbf0fa09e819] [REQUEST][END]
INFO - 2026-03-06 19:14:12 --> [REQ_ID=fbf0fa09e819] [PERF] Execution time=0.686494
INFO - 2026-03-06 19:15:01 --> [spark:ops:work] Started
INFO - 2026-03-06 19:15:01 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-03-06 19:15:01 --> [SPARK_MEMORY] 16777216
INFO - 2026-03-06 19:15:01 --> [spark:ops:work] Intent
INFO - 2026-03-06 19:15:01 --> [spark:ops:work] Completed
INFO - 2026-03-06 19:15:01 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.016755
INFO - 2026-03-06 19:15:01 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-03-06 19:15:01 --> [REQ_ID=94307c663cf4] [REQUEST][START] GET /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-06 19:15:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-06 19:15:01 --> [REQ_ID=94307c663cf4] [FILTER_BEFORE] /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-06 19:15:01 --> [REQ_ID=94307c663cf4] [ROUTE] Controller=\App\Modules\APIs\Controllers\AlertsAPIController Method=fetchEmailAlerts
DEBUG - 2026-03-06 19:15:01 --> [REQ_ID=94307c663cf4] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-06 19:15:01 --> [REQ_ID=94307c663cf4] [REQUEST][END]
INFO - 2026-03-06 19:15:01 --> [REQ_ID=94307c663cf4] [PERF] Execution time=0.021417
DEBUG - 2026-03-06 19:16:19 --> [REQ_ID=5fa5b95a6765] [REQUEST][START] HEAD /
DEBUG - 2026-03-06 19:16:19 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-06 19:16:19 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-06 19:16:19 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-06 19:16:19 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-06 19:16:19 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-06 19:21:19 --> [REQ_ID=1a9c1e9a3b97] [REQUEST][START] HEAD /
DEBUG - 2026-03-06 19:21:19 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-06 19:21:19 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-06 19:21:19 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-06 19:21:19 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-06 19:21:19 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-06 19:21:47 --> [REQ_ID=40326a1f3fc6] [REQUEST][START] GET /
DEBUG - 2026-03-06 19:21:47 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-06 19:21:47 --> [REQ_ID=40326a1f3fc6] [FILTER_BEFORE] /
DEBUG - 2026-03-06 19:21:47 --> [REQ_ID=40326a1f3fc6] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-06 19:21:47 --> [REQ_ID=40326a1f3fc6] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-06 19:21:47 --> [CSRF] token name=csrf_test_name hash=b179f9c92dc55ee7da6ac2deac87e343
DEBUG - 2026-03-06 19:21:47 --> [REQ_ID=1d0484f195bb] [INIT] App\Controllers\Home::GET
INFO - 2026-03-06 19:21:47 --> [REQ_ID=1d0484f195bb] [MEMORY][controller-start] 4194304
INFO - 2026-03-06 19:21:47 --> [REQ_ID=1d0484f195bb] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-06 19:21:47 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-06 19:21:48 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
DEBUG - 2026-03-06 19:21:48 --> [REQ_ID=1d0484f195bb] [VIEW_RENDER] themes/public/home
INFO - 2026-03-06 19:21:48 --> [REQ_ID=1d0484f195bb] [MEMORY][commonData:start] 8388608
INFO - 2026-03-06 19:21:48 --> themesMemory usage: 8388608
DEBUG - 2026-03-06 19:21:48 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-06 19:21:48 --> [REQ_ID=40326a1f3fc6] [FILTER_AFTER]
DEBUG - 2026-03-06 19:21:48 --> [REQ_ID=40326a1f3fc6] [LIFECYCLE][END] status=200 duration_ms=668.13 memory_delta=4194304
INFO - 2026-03-06 19:21:48 --> [REQ_ID=1d0484f195bb] [PERF] Execution time=0.665734
DEBUG - 2026-03-06 19:21:48 --> [REQ_ID=40326a1f3fc6] [REQUEST][END]
INFO - 2026-03-06 19:21:48 --> [REQ_ID=40326a1f3fc6] [PERF] Execution time=0.686821
DEBUG - 2026-03-06 19:26:19 --> [REQ_ID=571536ae3550] [REQUEST][START] HEAD /
DEBUG - 2026-03-06 19:26:19 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-06 19:26:19 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-06 19:26:19 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-06 19:26:19 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-06 19:26:19 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
INFO - 2026-03-06 19:30:01 --> [spark:ops:work] Started
INFO - 2026-03-06 19:30:01 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-03-06 19:30:01 --> [SPARK_MEMORY] 16777216
INFO - 2026-03-06 19:30:01 --> [spark:ops:work] Intent
INFO - 2026-03-06 19:30:01 --> [spark:ops:work] Completed
INFO - 2026-03-06 19:30:01 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.059212
INFO - 2026-03-06 19:30:01 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-03-06 19:31:19 --> [REQ_ID=ce08ef382e62] [REQUEST][START] HEAD /
DEBUG - 2026-03-06 19:31:19 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-06 19:31:19 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-06 19:31:19 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-06 19:31:19 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-06 19:31:19 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-06 19:36:19 --> [REQ_ID=5d1138ff28c9] [REQUEST][START] HEAD /
DEBUG - 2026-03-06 19:36:19 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-06 19:36:19 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-06 19:36:19 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-06 19:36:19 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-06 19:36:19 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-06 19:41:00 --> [REQ_ID=25bd9afc608f] [REQUEST][START] GET /
DEBUG - 2026-03-06 19:41:00 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-06 19:41:01 --> [REQ_ID=25bd9afc608f] [FILTER_BEFORE] /
DEBUG - 2026-03-06 19:41:01 --> [REQ_ID=25bd9afc608f] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-06 19:41:01 --> [REQ_ID=25bd9afc608f] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-06 19:41:01 --> [CSRF] token name=csrf_test_name hash=bf2762b3c943d8ec9e96d3cabd8cdd2b
DEBUG - 2026-03-06 19:41:01 --> [REQ_ID=81c50d2bc120] [INIT] App\Controllers\Home::GET
INFO - 2026-03-06 19:41:01 --> [REQ_ID=81c50d2bc120] [MEMORY][controller-start] 6291456
INFO - 2026-03-06 19:41:01 --> [REQ_ID=81c50d2bc120] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-06 19:41:01 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-06 19:41:01 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-03-06 19:41:01 --> [REQ_ID=81c50d2bc120] [VIEW_RENDER] themes/public/home
INFO - 2026-03-06 19:41:01 --> [REQ_ID=81c50d2bc120] [MEMORY][commonData:start] 10485760
INFO - 2026-03-06 19:41:01 --> themesMemory usage: 10485760
DEBUG - 2026-03-06 19:41:01 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-06 19:41:01 --> [REQ_ID=25bd9afc608f] [FILTER_AFTER]
DEBUG - 2026-03-06 19:41:01 --> [REQ_ID=25bd9afc608f] [LIFECYCLE][END] status=200 duration_ms=582.98 memory_delta=4194304
INFO - 2026-03-06 19:41:01 --> [REQ_ID=81c50d2bc120] [PERF] Execution time=0.580987
DEBUG - 2026-03-06 19:41:01 --> [REQ_ID=25bd9afc608f] [REQUEST][END]
INFO - 2026-03-06 19:41:01 --> [REQ_ID=25bd9afc608f] [PERF] Execution time=0.621416
DEBUG - 2026-03-06 19:41:19 --> [REQ_ID=75c12b537295] [REQUEST][START] HEAD /
DEBUG - 2026-03-06 19:41:19 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-06 19:41:19 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-06 19:41:19 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-06 19:41:19 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-06 19:41:19 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
INFO - 2026-03-06 19:45:02 --> [spark:ops:work] Started
INFO - 2026-03-06 19:45:02 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-03-06 19:45:02 --> [SPARK_MEMORY] 16777216
INFO - 2026-03-06 19:45:02 --> [spark:ops:work] Intent
INFO - 2026-03-06 19:45:02 --> [spark:ops:work] Completed
INFO - 2026-03-06 19:45:02 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.147616
INFO - 2026-03-06 19:45:02 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-03-06 19:46:19 --> [REQ_ID=43fc9ee49113] [REQUEST][START] HEAD /
DEBUG - 2026-03-06 19:46:19 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-06 19:46:19 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-06 19:46:19 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-06 19:46:19 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-06 19:46:19 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-06 19:47:05 --> [REQ_ID=4a5272c4aa23] [REQUEST][START] GET /index.php
DEBUG - 2026-03-06 19:47:05 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-06 19:47:05 --> [REQ_ID=4a5272c4aa23] [FILTER_BEFORE] /index.php
DEBUG - 2026-03-06 19:47:05 --> [REQ_ID=4a5272c4aa23] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-06 19:47:05 --> [REQ_ID=4a5272c4aa23] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-06 19:47:05 --> [CSRF] token name=csrf_test_name hash=cf690b54f2fc783ee67661acd4a48829
DEBUG - 2026-03-06 19:47:05 --> [REQ_ID=2c2649d9939a] [INIT] App\Controllers\Home::GET
INFO - 2026-03-06 19:47:05 --> [REQ_ID=2c2649d9939a] [MEMORY][controller-start] 4194304
INFO - 2026-03-06 19:47:05 --> [REQ_ID=2c2649d9939a] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-06 19:47:05 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-06 19:47:05 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
DEBUG - 2026-03-06 19:47:05 --> [REQ_ID=2c2649d9939a] [VIEW_RENDER] themes/public/home
INFO - 2026-03-06 19:47:05 --> [REQ_ID=2c2649d9939a] [MEMORY][commonData:start] 8388608
INFO - 2026-03-06 19:47:05 --> themesMemory usage: 8388608
DEBUG - 2026-03-06 19:47:05 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-06 19:47:05 --> [REQ_ID=4a5272c4aa23] [FILTER_AFTER]
DEBUG - 2026-03-06 19:47:05 --> [REQ_ID=4a5272c4aa23] [LIFECYCLE][END] status=200 duration_ms=668.44 memory_delta=4194304
INFO - 2026-03-06 19:47:05 --> [REQ_ID=2c2649d9939a] [PERF] Execution time=0.666293
DEBUG - 2026-03-06 19:47:05 --> [REQ_ID=4a5272c4aa23] [REQUEST][END]
INFO - 2026-03-06 19:47:05 --> [REQ_ID=4a5272c4aa23] [PERF] Execution time=0.686916
DEBUG - 2026-03-06 19:51:19 --> [REQ_ID=e42ac49ed74a] [REQUEST][START] HEAD /
DEBUG - 2026-03-06 19:51:19 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-06 19:51:19 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-06 19:51:19 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-06 19:51:19 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-06 19:51:19 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-06 19:56:19 --> [REQ_ID=b97f1107c1d6] [REQUEST][START] HEAD /
DEBUG - 2026-03-06 19:56:19 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-06 19:56:19 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-06 19:56:19 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-06 19:56:19 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-06 19:56:19 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
INFO - 2026-03-06 20:00:01 --> [spark:ops:work] Started
INFO - 2026-03-06 20:00:01 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-03-06 20:00:01 --> [SPARK_MEMORY] 16777216
INFO - 2026-03-06 20:00:01 --> [spark:ops:work] Intent
INFO - 2026-03-06 20:00:01 --> [SPARK_START] App\Commands\AIOps\Run
INFO - 2026-03-06 20:00:01 --> [SPARK_MEMORY] 16777216
INFO - 2026-03-06 20:00:01 --> [spark:aiops:run] Intent
INFO - 2026-03-06 20:00:01 --> [spark:ops:work] Completed
INFO - 2026-03-06 20:00:01 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.059933
INFO - 2026-03-06 20:00:01 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-03-06 20:00:01 --> [REQ_ID=884a07cfa2dc] [REQUEST][START] GET /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-06 20:00:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-06 20:00:01 --> [REQ_ID=884a07cfa2dc] [FILTER_BEFORE] /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-06 20:00:01 --> [REQ_ID=884a07cfa2dc] [ROUTE] Controller=\App\Modules\Management\Controllers\ManagementAPIController Method=Run_CRON_Tasks
DEBUG - 2026-03-06 20:00:01 --> [REQ_ID=884a07cfa2dc] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-06 20:00:01 --> [REQ_ID=884a07cfa2dc] [REQUEST][END]
INFO - 2026-03-06 20:00:01 --> [REQ_ID=884a07cfa2dc] [PERF] Execution time=0.059922
INFO - 2026-03-06 20:00:03 --> [AIOPS][SPARK][GOVERNANCE][spark:logs:summarize] Started
INFO - 2026-03-06 20:00:03 --> [SPARK_START] App\Commands\Logs\Summarize
INFO - 2026-03-06 20:00:03 --> [SPARK_MEMORY] 16777216
INFO - 2026-03-06 20:00:03 --> [spark:logs:summarize] Intent
INFO - 2026-03-06 20:00:03 --> [AIOPS][SPARK][GOVERNANCE][spark:logs:summarize] Completed
INFO - 2026-03-06 20:00:03 --> [SPARK_COMPLETE] App\Commands\Logs\Summarize duration=0.024561
INFO - 2026-03-06 20:00:03 --> [SPARK_MEMORY] 20971520
INFO - 2026-03-06 20:00:03 --> [spark:app:healthcheck] Started
INFO - 2026-03-06 20:00:03 --> [SPARK_START] App\Commands\App\Healthcheck
INFO - 2026-03-06 20:00:03 --> [SPARK_MEMORY] 16777216
INFO - 2026-03-06 20:00:03 --> [spark:app:healthcheck] Intent
DEBUG - 2026-03-06 20:00:03 --> LOG_HEALTHCHECK debug marker=f2fa1a6502ea
INFO - 2026-03-06 20:00:03 --> LOG_HEALTHCHECK info marker=f2fa1a6502ea
NOTICE - 2026-03-06 20:00:03 --> LOG_HEALTHCHECK probe marker=f2fa1a6502ea
INFO - 2026-03-06 20:00:03 --> [spark:app:healthcheck] Completed
INFO - 2026-03-06 20:00:03 --> [SPARK_COMPLETE] App\Commands\App\Healthcheck duration=0.041444
INFO - 2026-03-06 20:00:03 --> [SPARK_MEMORY] 20971520
DEBUG - 2026-03-06 20:00:04 --> OllamaPatchRunner:L142 - validateGeneratedPatch Content: 
WARNING - 2026-03-06 20:00:04 --> OllamaPatchRunner:L49 - Original Diff: 
DEBUG - 2026-03-06 20:00:05 --> OllamaPatchRunner:L51 - Retried Diff: 
DEBUG - 2026-03-06 20:00:05 --> OllamaPatchRunner:L142 - validateGeneratedPatch Content: 
DEBUG - 2026-03-06 20:00:05 --> OllamaPatchRunner:L53 - Validating Generated Patch Failed
INFO - 2026-03-06 20:00:05 --> [SPARK_COMPLETE] App\Commands\AIOps\Run duration=3.786716
INFO - 2026-03-06 20:00:05 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-03-06 20:01:19 --> [REQ_ID=af5ce13cba25] [REQUEST][START] HEAD /
DEBUG - 2026-03-06 20:01:19 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-06 20:01:19 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-06 20:01:19 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-06 20:01:19 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-06 20:01:19 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-06 20:02:45 --> [REQ_ID=eebd86429938] [REQUEST][START] GET /index.php/Management/Budgets
DEBUG - 2026-03-06 20:02:45 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-06 20:02:45 --> [REQ_ID=eebd86429938] [FILTER_BEFORE] /index.php/Management/Budgets
DEBUG - 2026-03-06 20:02:45 --> [REQ_ID=eebd86429938] [ROUTE] Controller=\App\Modules\Management\Controllers\BudgetsAdminController Method=index
DEBUG - 2026-03-06 20:02:45 --> [REQ_ID=eebd86429938] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Management/Budgets
DEBUG - 2026-03-06 20:02:45 --> [CSRF] token name=csrf_test_name hash=85b8a7a730651e32efaf48fc0dd925ca
DEBUG - 2026-03-06 20:02:45 --> [REQ_ID=eebd86429938] [REQUEST][END]
INFO - 2026-03-06 20:02:45 --> [REQ_ID=eebd86429938] [PERF] Execution time=0.023892
DEBUG - 2026-03-06 20:02:45 --> [REQ_ID=e82902ebe6aa] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-06 20:02:45 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-06 20:02:45 --> [REQ_ID=e82902ebe6aa] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-06 20:02:45 --> [REQ_ID=e82902ebe6aa] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-06 20:02:45 --> [REQ_ID=e82902ebe6aa] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-06 20:02:45 --> [CSRF] token name=csrf_test_name hash=37dd40f4d93e96e2d94455b621fdc96d
DEBUG - 2026-03-06 20:02:45 --> [REQ_ID=98455702ff0c] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-06 20:02:45 --> [REQ_ID=98455702ff0c] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-06 20:02:45 --> [REQ_ID=e82902ebe6aa] [FILTER_AFTER]
DEBUG - 2026-03-06 20:02:45 --> [REQ_ID=e82902ebe6aa] [LIFECYCLE][END] status=200 duration_ms=119.69 memory_delta=0
INFO - 2026-03-06 20:02:45 --> [REQ_ID=98455702ff0c] [PERF] Execution time=0.119705
DEBUG - 2026-03-06 20:02:45 --> [REQ_ID=e82902ebe6aa] [REQUEST][END]
INFO - 2026-03-06 20:02:45 --> [REQ_ID=e82902ebe6aa] [PERF] Execution time=0.131919
DEBUG - 2026-03-06 20:06:19 --> [REQ_ID=129cffbcf823] [REQUEST][START] HEAD /
DEBUG - 2026-03-06 20:06:19 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-06 20:06:19 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-06 20:06:19 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-06 20:06:19 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-06 20:06:19 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-06 20:07:55 --> [REQ_ID=f6472ac0cd03] [REQUEST][START] GET /
DEBUG - 2026-03-06 20:07:55 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-06 20:07:55 --> [REQ_ID=f6472ac0cd03] [FILTER_BEFORE] /
DEBUG - 2026-03-06 20:07:55 --> [REQ_ID=f6472ac0cd03] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-06 20:07:55 --> [REQ_ID=f6472ac0cd03] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-06 20:07:55 --> [CSRF] token name=csrf_test_name hash=75641acd66825c6f5b9137c7b237f48a
DEBUG - 2026-03-06 20:07:55 --> [REQ_ID=60b0229a998c] [INIT] App\Controllers\Home::GET
INFO - 2026-03-06 20:07:55 --> [REQ_ID=60b0229a998c] [MEMORY][controller-start] 6291456
INFO - 2026-03-06 20:07:55 --> [REQ_ID=60b0229a998c] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-06 20:07:55 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-06 20:07:56 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-03-06 20:07:56 --> [REQ_ID=60b0229a998c] [VIEW_RENDER] themes/public/home
INFO - 2026-03-06 20:07:56 --> [REQ_ID=60b0229a998c] [MEMORY][commonData:start] 10485760
INFO - 2026-03-06 20:07:56 --> themesMemory usage: 10485760
DEBUG - 2026-03-06 20:07:56 --> [MetaService] slug= pageName=Home cacheHit= path=DB
DEBUG - 2026-03-06 20:07:56 --> [REQ_ID=f6472ac0cd03] [FILTER_AFTER]
DEBUG - 2026-03-06 20:07:56 --> [REQ_ID=f6472ac0cd03] [LIFECYCLE][END] status=200 duration_ms=586.27 memory_delta=4194304
INFO - 2026-03-06 20:07:56 --> [REQ_ID=60b0229a998c] [PERF] Execution time=0.583999
DEBUG - 2026-03-06 20:07:56 --> [REQ_ID=f6472ac0cd03] [REQUEST][END]
INFO - 2026-03-06 20:07:56 --> [REQ_ID=f6472ac0cd03] [PERF] Execution time=0.624436
DEBUG - 2026-03-06 20:07:57 --> [REQ_ID=1159c6fc2e09] [REQUEST][START] GET /
DEBUG - 2026-03-06 20:07:57 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-06 20:07:57 --> [REQ_ID=1159c6fc2e09] [FILTER_BEFORE] /
DEBUG - 2026-03-06 20:07:57 --> [REQ_ID=1159c6fc2e09] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-06 20:07:57 --> [REQ_ID=1159c6fc2e09] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-06 20:07:57 --> [CSRF] token name=csrf_test_name hash=673a82f5e360a29c0eb05e23a337de9a
DEBUG - 2026-03-06 20:07:57 --> [REQ_ID=a22e47cea295] [INIT] App\Controllers\Home::GET
INFO - 2026-03-06 20:07:57 --> [REQ_ID=a22e47cea295] [MEMORY][controller-start] 6291456
INFO - 2026-03-06 20:07:57 --> [REQ_ID=a22e47cea295] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-06 20:07:57 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-06 20:07:57 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
DEBUG - 2026-03-06 20:07:57 --> [REQ_ID=a22e47cea295] [VIEW_RENDER] themes/public/home
INFO - 2026-03-06 20:07:57 --> [REQ_ID=a22e47cea295] [MEMORY][commonData:start] 8388608
INFO - 2026-03-06 20:07:57 --> themesMemory usage: 8388608
DEBUG - 2026-03-06 20:07:57 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-06 20:07:57 --> [REQ_ID=1159c6fc2e09] [FILTER_AFTER]
DEBUG - 2026-03-06 20:07:57 --> [REQ_ID=1159c6fc2e09] [LIFECYCLE][END] status=200 duration_ms=505.37 memory_delta=2097152
INFO - 2026-03-06 20:07:57 --> [REQ_ID=a22e47cea295] [PERF] Execution time=0.501281
DEBUG - 2026-03-06 20:07:57 --> [REQ_ID=1159c6fc2e09] [REQUEST][END]
INFO - 2026-03-06 20:07:57 --> [REQ_ID=1159c6fc2e09] [PERF] Execution time=0.514525
DEBUG - 2026-03-06 20:08:11 --> [REQ_ID=17ef389abc9b] [REQUEST][START] GET /index.php/Budget/Financial-Analysis
DEBUG - 2026-03-06 20:08:11 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-06 20:08:11 --> [REQ_ID=17ef389abc9b] [FILTER_BEFORE] /index.php/Budget/Financial-Analysis
DEBUG - 2026-03-06 20:08:11 --> [REQ_ID=17ef389abc9b] [ROUTE] Controller=\App\Modules\User\Controllers\BudgetController Method=financialAnalysis
DEBUG - 2026-03-06 20:08:11 --> [REQ_ID=17ef389abc9b] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Budget/Financial-Analysis
DEBUG - 2026-03-06 20:08:11 --> [CSRF] token name=csrf_test_name hash=4c7d25a7772c6fb0719e900dba034515
DEBUG - 2026-03-06 20:08:11 --> [REQ_ID=17ef389abc9b] [REQUEST][END]
INFO - 2026-03-06 20:08:11 --> [REQ_ID=17ef389abc9b] [PERF] Execution time=0.017783
DEBUG - 2026-03-06 20:08:12 --> [REQ_ID=a4d9390b12c0] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-06 20:08:12 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-06 20:08:12 --> [REQ_ID=a4d9390b12c0] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-06 20:08:12 --> [REQ_ID=a4d9390b12c0] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-06 20:08:12 --> [REQ_ID=a4d9390b12c0] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-06 20:08:12 --> [CSRF] token name=csrf_test_name hash=b668649922be2d697824fba05cd8de0e
DEBUG - 2026-03-06 20:08:12 --> [REQ_ID=c5d79599863d] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-06 20:08:12 --> [REQ_ID=c5d79599863d] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-06 20:08:12 --> [REQ_ID=a4d9390b12c0] [FILTER_AFTER]
DEBUG - 2026-03-06 20:08:12 --> [REQ_ID=a4d9390b12c0] [LIFECYCLE][END] status=200 duration_ms=34.04 memory_delta=0
INFO - 2026-03-06 20:08:12 --> [REQ_ID=c5d79599863d] [PERF] Execution time=0.033808
DEBUG - 2026-03-06 20:08:12 --> [REQ_ID=a4d9390b12c0] [REQUEST][END]
INFO - 2026-03-06 20:08:12 --> [REQ_ID=a4d9390b12c0] [PERF] Execution time=0.046117
DEBUG - 2026-03-06 20:10:13 --> [REQ_ID=3245e3fd74c3] [REQUEST][START] GET /index.php/Memberships/Customize
DEBUG - 2026-03-06 20:10:13 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-06 20:10:13 --> [REQ_ID=3245e3fd74c3] [FILTER_BEFORE] /index.php/Memberships/Customize
DEBUG - 2026-03-06 20:10:13 --> [REQ_ID=3245e3fd74c3] [ROUTE] Controller=\App\Controllers\Home Method=memberships
DEBUG - 2026-03-06 20:10:13 --> [REQ_ID=3245e3fd74c3] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Memberships/Customize
DEBUG - 2026-03-06 20:10:13 --> [CSRF] token name=csrf_test_name hash=9d1d6b686496f0fe812d2c977f05682c
DEBUG - 2026-03-06 20:10:13 --> [REQ_ID=3bf4400717eb] [INIT] App\Controllers\Home::GET
INFO - 2026-03-06 20:10:13 --> [REQ_ID=3bf4400717eb] [MEMORY][controller-start] 6291456
INFO - 2026-03-06 20:10:14 --> [REQ_ID=3bf4400717eb] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-06 20:10:14 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-06 20:10:14 --> [MetaService] slug=memberships/customize pageName= cacheHit= path=DB
DEBUG - 2026-03-06 20:10:14 --> [REQ_ID=3bf4400717eb] [VIEW_RENDER] themes/public/memberships
INFO - 2026-03-06 20:10:14 --> [REQ_ID=3bf4400717eb] [MEMORY][commonData:start] 10485760
INFO - 2026-03-06 20:10:14 --> themesMemory usage: 10485760
DEBUG - 2026-03-06 20:10:14 --> [MetaService] slug=memberships/customize pageName=Memberships cacheHit= path=DB
DEBUG - 2026-03-06 20:10:14 --> [REQ_ID=3245e3fd74c3] [FILTER_AFTER]
DEBUG - 2026-03-06 20:10:14 --> [REQ_ID=3245e3fd74c3] [LIFECYCLE][END] status=200 duration_ms=578.98 memory_delta=4194304
INFO - 2026-03-06 20:10:14 --> [REQ_ID=3bf4400717eb] [PERF] Execution time=0.576690
DEBUG - 2026-03-06 20:10:14 --> [REQ_ID=3245e3fd74c3] [REQUEST][END]
INFO - 2026-03-06 20:10:14 --> [REQ_ID=3245e3fd74c3] [PERF] Execution time=0.617862
DEBUG - 2026-03-06 20:11:19 --> [REQ_ID=7e81239e4f5c] [REQUEST][START] HEAD /
DEBUG - 2026-03-06 20:11:19 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-06 20:11:19 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-06 20:11:19 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-06 20:11:19 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-06 20:11:19 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
INFO - 2026-03-06 20:15:02 --> [spark:ops:work] Started
INFO - 2026-03-06 20:15:02 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-03-06 20:15:02 --> [SPARK_MEMORY] 16777216
INFO - 2026-03-06 20:15:02 --> [spark:ops:work] Intent
INFO - 2026-03-06 20:15:02 --> [spark:ops:work] Completed
INFO - 2026-03-06 20:15:02 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.030955
INFO - 2026-03-06 20:15:02 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-03-06 20:15:02 --> [REQ_ID=b585ccc238f2] [REQUEST][START] GET /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-06 20:15:02 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-06 20:15:02 --> [REQ_ID=b585ccc238f2] [FILTER_BEFORE] /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-06 20:15:02 --> [REQ_ID=b585ccc238f2] [ROUTE] Controller=\App\Modules\APIs\Controllers\AlertsAPIController Method=fetchEmailAlerts
DEBUG - 2026-03-06 20:15:02 --> [REQ_ID=b585ccc238f2] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-06 20:15:02 --> [REQ_ID=b585ccc238f2] [REQUEST][END]
INFO - 2026-03-06 20:15:02 --> [REQ_ID=b585ccc238f2] [PERF] Execution time=0.047587
DEBUG - 2026-03-06 20:16:19 --> [REQ_ID=3a24b07aa583] [REQUEST][START] HEAD /
DEBUG - 2026-03-06 20:16:19 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-06 20:16:19 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-06 20:16:19 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-06 20:16:19 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-06 20:16:19 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-06 20:21:14 --> [REQ_ID=8a8052aa5238] [REQUEST][START] GET /index.php/Account/Security
DEBUG - 2026-03-06 20:21:14 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-06 20:21:14 --> [REQ_ID=8a8052aa5238] [FILTER_BEFORE] /index.php/Account/Security
DEBUG - 2026-03-06 20:21:14 --> [REQ_ID=8a8052aa5238] [ROUTE] Controller=\App\Modules\User\Controllers\DashboardController Method=Security
DEBUG - 2026-03-06 20:21:14 --> [REQ_ID=8a8052aa5238] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Account/Security
DEBUG - 2026-03-06 20:21:14 --> [CSRF] token name=csrf_test_name hash=770d55f44668ab2c8613fc4be91e7a62
DEBUG - 2026-03-06 20:21:14 --> [REQ_ID=8a8052aa5238] [REQUEST][END]
INFO - 2026-03-06 20:21:14 --> [REQ_ID=8a8052aa5238] [PERF] Execution time=0.057257
DEBUG - 2026-03-06 20:21:15 --> [REQ_ID=598846868ff2] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-06 20:21:15 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-06 20:21:15 --> [REQ_ID=598846868ff2] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-06 20:21:15 --> [REQ_ID=598846868ff2] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-06 20:21:15 --> [REQ_ID=598846868ff2] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-06 20:21:15 --> [CSRF] token name=csrf_test_name hash=cac2d3ec4e6d17eba79c814057dd2d2a
DEBUG - 2026-03-06 20:21:15 --> [REQ_ID=c0f060ccb273] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-06 20:21:15 --> [REQ_ID=c0f060ccb273] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-06 20:21:15 --> [REQ_ID=598846868ff2] [FILTER_AFTER]
DEBUG - 2026-03-06 20:21:15 --> [REQ_ID=598846868ff2] [LIFECYCLE][END] status=200 duration_ms=160.90 memory_delta=0
INFO - 2026-03-06 20:21:15 --> [REQ_ID=c0f060ccb273] [PERF] Execution time=0.159899
DEBUG - 2026-03-06 20:21:15 --> [REQ_ID=598846868ff2] [REQUEST][END]
INFO - 2026-03-06 20:21:15 --> [REQ_ID=598846868ff2] [PERF] Execution time=0.173288
DEBUG - 2026-03-06 20:21:19 --> [REQ_ID=c04069746155] [REQUEST][START] HEAD /
DEBUG - 2026-03-06 20:21:19 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-06 20:21:19 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-06 20:21:19 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-06 20:21:19 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-06 20:21:19 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-06 20:21:38 --> [REQ_ID=9e31f77bfceb] [REQUEST][START] GET /index.php/Budget/Financial-Analysis
DEBUG - 2026-03-06 20:21:38 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-06 20:21:38 --> [REQ_ID=9e31f77bfceb] [FILTER_BEFORE] /index.php/Budget/Financial-Analysis
DEBUG - 2026-03-06 20:21:38 --> [REQ_ID=9e31f77bfceb] [ROUTE] Controller=\App\Modules\User\Controllers\BudgetController Method=financialAnalysis
DEBUG - 2026-03-06 20:21:38 --> [REQ_ID=9e31f77bfceb] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Budget/Financial-Analysis
DEBUG - 2026-03-06 20:21:38 --> [CSRF] token name=csrf_test_name hash=30a10231ec2133fc217854b5c1a2a5a2
DEBUG - 2026-03-06 20:21:38 --> [REQ_ID=9e31f77bfceb] [REQUEST][END]
INFO - 2026-03-06 20:21:38 --> [REQ_ID=9e31f77bfceb] [PERF] Execution time=0.019511
DEBUG - 2026-03-06 20:21:38 --> [REQ_ID=1829cb3716a0] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-06 20:21:38 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-06 20:21:38 --> [REQ_ID=1829cb3716a0] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-06 20:21:38 --> [REQ_ID=1829cb3716a0] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-06 20:21:38 --> [REQ_ID=1829cb3716a0] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-06 20:21:38 --> [CSRF] token name=csrf_test_name hash=019873739d3ce0a98582f6dd028bd224
DEBUG - 2026-03-06 20:21:38 --> [REQ_ID=eacf20e7c428] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-06 20:21:38 --> [REQ_ID=eacf20e7c428] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-06 20:21:38 --> [REQ_ID=1829cb3716a0] [FILTER_AFTER]
DEBUG - 2026-03-06 20:21:38 --> [REQ_ID=1829cb3716a0] [LIFECYCLE][END] status=200 duration_ms=143.59 memory_delta=0
INFO - 2026-03-06 20:21:38 --> [REQ_ID=eacf20e7c428] [PERF] Execution time=0.142208
DEBUG - 2026-03-06 20:21:38 --> [REQ_ID=1829cb3716a0] [REQUEST][END]
INFO - 2026-03-06 20:21:38 --> [REQ_ID=1829cb3716a0] [PERF] Execution time=0.153286
DEBUG - 2026-03-06 20:22:03 --> [REQ_ID=8806d34251d4] [REQUEST][START] GET /index.php/Account/Connected-Accounts
DEBUG - 2026-03-06 20:22:03 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-06 20:22:03 --> [REQ_ID=8806d34251d4] [FILTER_BEFORE] /index.php/Account/Connected-Accounts
DEBUG - 2026-03-06 20:22:03 --> [REQ_ID=8806d34251d4] [ROUTE] Controller=\App\Modules\User\Controllers\DashboardController Method=connectedAccounts
DEBUG - 2026-03-06 20:22:03 --> [REQ_ID=8806d34251d4] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Account/Connected-Accounts
DEBUG - 2026-03-06 20:22:03 --> [CSRF] token name=csrf_test_name hash=f9509a1643d9957894dc6f41224ff963
DEBUG - 2026-03-06 20:22:03 --> [REQ_ID=8806d34251d4] [REQUEST][END]
INFO - 2026-03-06 20:22:03 --> [REQ_ID=8806d34251d4] [PERF] Execution time=0.011362
DEBUG - 2026-03-06 20:22:04 --> [REQ_ID=632e56e7ed44] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-06 20:22:04 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-06 20:22:04 --> [REQ_ID=632e56e7ed44] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-06 20:22:04 --> [REQ_ID=632e56e7ed44] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-06 20:22:04 --> [REQ_ID=632e56e7ed44] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-06 20:22:04 --> [CSRF] token name=csrf_test_name hash=8fafc1b41b2d09aa38db0e16e9a94bb1
DEBUG - 2026-03-06 20:22:04 --> [REQ_ID=7137588ba660] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-06 20:22:04 --> [REQ_ID=7137588ba660] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-06 20:22:04 --> [REQ_ID=632e56e7ed44] [FILTER_AFTER]
DEBUG - 2026-03-06 20:22:04 --> [REQ_ID=632e56e7ed44] [LIFECYCLE][END] status=200 duration_ms=95.32 memory_delta=0
INFO - 2026-03-06 20:22:04 --> [REQ_ID=7137588ba660] [PERF] Execution time=0.093972
DEBUG - 2026-03-06 20:22:04 --> [REQ_ID=632e56e7ed44] [REQUEST][END]
INFO - 2026-03-06 20:22:04 --> [REQ_ID=632e56e7ed44] [PERF] Execution time=0.105678
CRITICAL - 2026-03-06 20:22:41 --> ErrorException: Cannot declare class App\Modules\Ops\Controllers\OpsManagementController, because the name is already in use
[Method: CLI, Route: routes:repair]
in APPPATH/Modules/Ops/Controllers/OpsManagementController.php on line 14.
 1 [internal function]: CodeIgniter\Debug\Exceptions->shutdownHandler()
CRITICAL - 2026-03-06 20:22:41 --> [EXCEPTION] Cannot declare class App\Modules\Ops\Controllers\OpsManagementController, because the name is already in use File=/home/mymiteam/mymiwallet/site/current/app/Modules/Ops/Controllers/OpsManagementController.php Line=14
DEBUG - 2026-03-06 20:26:19 --> [REQ_ID=1b5cf0e4ef09] [REQUEST][START] HEAD /
DEBUG - 2026-03-06 20:26:19 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-06 20:26:19 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-06 20:26:19 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-06 20:26:19 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-06 20:26:19 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
INFO - 2026-03-06 20:30:01 --> [spark:ops:work] Started
INFO - 2026-03-06 20:30:01 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-03-06 20:30:01 --> [SPARK_MEMORY] 16777216
INFO - 2026-03-06 20:30:01 --> [spark:ops:work] Intent
INFO - 2026-03-06 20:30:01 --> [spark:ops:work] Completed
INFO - 2026-03-06 20:30:01 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.214482
INFO - 2026-03-06 20:30:01 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-03-06 20:31:19 --> [REQ_ID=b27e4d93fde7] [REQUEST][START] HEAD /
DEBUG - 2026-03-06 20:31:19 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-06 20:31:19 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-06 20:31:19 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-06 20:31:19 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-06 20:31:19 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-06 20:36:19 --> [REQ_ID=f01242bece09] [REQUEST][START] HEAD /
DEBUG - 2026-03-06 20:36:19 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-06 20:36:19 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-06 20:36:19 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-06 20:36:19 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-06 20:36:19 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-06 20:41:19 --> [REQ_ID=cea3ebf2471f] [REQUEST][START] HEAD /
DEBUG - 2026-03-06 20:41:19 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-06 20:41:19 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-06 20:41:19 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-06 20:41:19 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-06 20:41:19 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
INFO - 2026-03-06 20:45:02 --> [spark:ops:work] Started
INFO - 2026-03-06 20:45:02 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-03-06 20:45:02 --> [SPARK_MEMORY] 16777216
INFO - 2026-03-06 20:45:02 --> [spark:ops:work] Intent
INFO - 2026-03-06 20:45:02 --> [spark:ops:work] Completed
INFO - 2026-03-06 20:45:02 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.214894
INFO - 2026-03-06 20:45:02 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-03-06 20:46:19 --> [REQ_ID=2fafc3f7589b] [REQUEST][START] HEAD /
DEBUG - 2026-03-06 20:46:19 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-06 20:46:19 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-06 20:46:19 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-06 20:46:19 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-06 20:46:19 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-06 20:51:19 --> [REQ_ID=b2d0c34ef5ee] [REQUEST][START] HEAD /
DEBUG - 2026-03-06 20:51:19 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-06 20:51:19 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-06 20:51:19 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-06 20:51:19 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-06 20:51:19 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-06 20:53:57 --> [REQ_ID=a1307e1f5d0c] [REQUEST][START] GET /index.php/Account/Billing
DEBUG - 2026-03-06 20:53:57 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-06 20:53:57 --> [REQ_ID=a1307e1f5d0c] [FILTER_BEFORE] /index.php/Account/Billing
DEBUG - 2026-03-06 20:53:57 --> [REQ_ID=a1307e1f5d0c] [ROUTE] Controller=\App\Modules\User\Controllers\DashboardController Method=billing
DEBUG - 2026-03-06 20:53:57 --> [REQ_ID=a1307e1f5d0c] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Account/Billing
DEBUG - 2026-03-06 20:53:57 --> [CSRF] token name=csrf_test_name hash=e0a4e032b610a88ebbb82c3d3ecdce0d
DEBUG - 2026-03-06 20:53:57 --> [REQ_ID=a1307e1f5d0c] [REQUEST][END]
INFO - 2026-03-06 20:53:57 --> [REQ_ID=a1307e1f5d0c] [PERF] Execution time=0.056076
DEBUG - 2026-03-06 20:53:57 --> [REQ_ID=d100111ab1f2] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-06 20:53:57 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-06 20:53:57 --> [REQ_ID=d100111ab1f2] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-06 20:53:57 --> [REQ_ID=d100111ab1f2] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-06 20:53:57 --> [REQ_ID=d100111ab1f2] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-06 20:53:57 --> [CSRF] token name=csrf_test_name hash=efdc828f7fbeed7df5af464689df38f3
DEBUG - 2026-03-06 20:53:57 --> [REQ_ID=97a44d9bce73] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-06 20:53:57 --> [REQ_ID=97a44d9bce73] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-06 20:53:58 --> [REQ_ID=d100111ab1f2] [FILTER_AFTER]
DEBUG - 2026-03-06 20:53:58 --> [REQ_ID=d100111ab1f2] [LIFECYCLE][END] status=200 duration_ms=328.03 memory_delta=0
INFO - 2026-03-06 20:53:58 --> [REQ_ID=97a44d9bce73] [PERF] Execution time=0.327838
DEBUG - 2026-03-06 20:53:58 --> [REQ_ID=d100111ab1f2] [REQUEST][END]
INFO - 2026-03-06 20:53:58 --> [REQ_ID=d100111ab1f2] [PERF] Execution time=0.342086
DEBUG - 2026-03-06 20:56:19 --> [REQ_ID=7ac1d628d860] [REQUEST][START] HEAD /
DEBUG - 2026-03-06 20:56:19 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-06 20:56:19 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-06 20:56:19 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-06 20:56:19 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-06 20:56:19 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-06 21:00:01 --> [REQ_ID=2cfe7f7b5416] [REQUEST][START] GET /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-06 21:00:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
INFO - 2026-03-06 21:00:01 --> [spark:ops:work] Started
INFO - 2026-03-06 21:00:01 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-03-06 21:00:01 --> [SPARK_MEMORY] 16777216
INFO - 2026-03-06 21:00:01 --> [spark:ops:work] Intent
DEBUG - 2026-03-06 21:00:01 --> [REQ_ID=2cfe7f7b5416] [FILTER_BEFORE] /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-06 21:00:01 --> [REQ_ID=2cfe7f7b5416] [ROUTE] Controller=\App\Modules\Management\Controllers\ManagementAPIController Method=Run_CRON_Tasks
DEBUG - 2026-03-06 21:00:01 --> [REQ_ID=2cfe7f7b5416] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-06 21:00:01 --> [REQ_ID=2cfe7f7b5416] [REQUEST][END]
INFO - 2026-03-06 21:00:01 --> [REQ_ID=2cfe7f7b5416] [PERF] Execution time=0.064924
INFO - 2026-03-06 21:00:01 --> [spark:ops:work] Completed
INFO - 2026-03-06 21:00:01 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.055540
INFO - 2026-03-06 21:00:01 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-03-06 21:01:19 --> [REQ_ID=a29a5d27b31c] [REQUEST][START] HEAD /
DEBUG - 2026-03-06 21:01:19 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-06 21:01:19 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-06 21:01:19 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-06 21:01:19 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-06 21:01:19 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-06 21:04:05 --> [REQ_ID=5fd0dc176f1c] [REQUEST][START] GET /
DEBUG - 2026-03-06 21:04:05 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-06 21:04:05 --> [REQ_ID=5fd0dc176f1c] [FILTER_BEFORE] /
DEBUG - 2026-03-06 21:04:05 --> [REQ_ID=5fd0dc176f1c] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-06 21:04:05 --> [REQ_ID=5fd0dc176f1c] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-06 21:04:05 --> [CSRF] token name=csrf_test_name hash=f6dae5d679f421176f462b3fb3ad03e3
DEBUG - 2026-03-06 21:04:05 --> [REQ_ID=ac717448a4ea] [INIT] App\Controllers\Home::GET
INFO - 2026-03-06 21:04:05 --> [REQ_ID=ac717448a4ea] [MEMORY][controller-start] 6291456
INFO - 2026-03-06 21:04:05 --> [REQ_ID=ac717448a4ea] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-06 21:04:05 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-06 21:04:05 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-03-06 21:04:05 --> [REQ_ID=ac717448a4ea] [VIEW_RENDER] themes/public/home
INFO - 2026-03-06 21:04:05 --> [REQ_ID=ac717448a4ea] [MEMORY][commonData:start] 10485760
INFO - 2026-03-06 21:04:05 --> themesMemory usage: 10485760
DEBUG - 2026-03-06 21:04:05 --> [MetaService] slug= pageName=Home cacheHit= path=DB
DEBUG - 2026-03-06 21:04:05 --> [REQ_ID=5fd0dc176f1c] [FILTER_AFTER]
DEBUG - 2026-03-06 21:04:05 --> [REQ_ID=5fd0dc176f1c] [LIFECYCLE][END] status=200 duration_ms=671.23 memory_delta=4194304
INFO - 2026-03-06 21:04:05 --> [REQ_ID=ac717448a4ea] [PERF] Execution time=0.669270
DEBUG - 2026-03-06 21:04:05 --> [REQ_ID=5fd0dc176f1c] [REQUEST][END]
INFO - 2026-03-06 21:04:05 --> [REQ_ID=5fd0dc176f1c] [PERF] Execution time=0.709398
DEBUG - 2026-03-06 21:04:58 --> [REQ_ID=e1bd50fd956a] [REQUEST][START] GET /index.php/How-It-Works/investments
DEBUG - 2026-03-06 21:04:58 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-06 21:04:58 --> [REQ_ID=e1bd50fd956a] [FILTER_BEFORE] /index.php/How-It-Works/investments
DEBUG - 2026-03-06 21:04:58 --> [REQ_ID=e1bd50fd956a] [ROUTE] Controller=\App\Modules\Blog\Controllers\HowItWorksController Method=show
DEBUG - 2026-03-06 21:04:58 --> [REQ_ID=e1bd50fd956a] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/How-It-Works/investments
DEBUG - 2026-03-06 21:04:58 --> [CSRF] token name=csrf_test_name hash=4d773a4bcfc7c537eb61c7bc710a1a6b
DEBUG - 2026-03-06 21:04:58 --> [REQ_ID=9ee36f0485f1] [INIT] App\Modules\Blog\Controllers\HowItWorksController::GET
INFO - 2026-03-06 21:04:58 --> [REQ_ID=9ee36f0485f1] [MEMORY][controller-start] 6291456
DEBUG - 2026-03-06 21:04:58 --> [REQ_ID=9ee36f0485f1] [METHOD_ENTRY] show
DEBUG - 2026-03-06 21:04:58 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-06 21:04:58 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-06 21:04:58 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-06 21:04:58 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-06 21:04:58 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-06 21:04:58 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-06 21:04:58 --> [REQ_ID=9ee36f0485f1] [VIEW_RENDER] App\Modules\Blog\Views\HowItWorks\index
INFO - 2026-03-06 21:04:58 --> [REQ_ID=9ee36f0485f1] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-06 21:04:59 --> [MetaService] slug=how-it-works/investments pageName= cacheHit= path=DB
INFO - 2026-03-06 21:04:59 --> themesMemory usage: 8388608
DEBUG - 2026-03-06 21:04:59 --> [MetaService] slug=how-it-works/investments pageName= cacheHit=1 path=CACHE
DEBUG - 2026-03-06 21:04:59 --> [REQ_ID=e1bd50fd956a] [FILTER_AFTER]
DEBUG - 2026-03-06 21:04:59 --> [REQ_ID=e1bd50fd956a] [LIFECYCLE][END] status=200 duration_ms=799.38 memory_delta=2097152
INFO - 2026-03-06 21:04:59 --> [REQ_ID=9ee36f0485f1] [PERF] Execution time=0.798627
DEBUG - 2026-03-06 21:04:59 --> [REQ_ID=e1bd50fd956a] [REQUEST][END]
INFO - 2026-03-06 21:04:59 --> [REQ_ID=e1bd50fd956a] [PERF] Execution time=0.814168
DEBUG - 2026-03-06 21:06:19 --> [REQ_ID=973ef1009bb8] [REQUEST][START] HEAD /
DEBUG - 2026-03-06 21:06:19 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-06 21:06:19 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-06 21:06:19 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-06 21:06:19 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-06 21:06:19 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-06 21:08:00 --> [REQ_ID=6bd60f5d7614] [REQUEST][START] GET /index.php/Management/Marketing/Content/Listing
DEBUG - 2026-03-06 21:08:00 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-06 21:08:00 --> [REQ_ID=6bd60f5d7614] [FILTER_BEFORE] /index.php/Management/Marketing/Content/Listing
DEBUG - 2026-03-06 21:08:00 --> [REQ_ID=6bd60f5d7614] [ROUTE] Controller=\App\Modules\Management\Controllers\MarketingAdminController Method=contentListing
DEBUG - 2026-03-06 21:08:00 --> [REQ_ID=6bd60f5d7614] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Management/Marketing/Content/Listing
DEBUG - 2026-03-06 21:08:00 --> [CSRF] token name=csrf_test_name hash=b51633d7a698f393d97170896577d923
DEBUG - 2026-03-06 21:08:00 --> [REQ_ID=6bd60f5d7614] [REQUEST][END]
INFO - 2026-03-06 21:08:00 --> [REQ_ID=6bd60f5d7614] [PERF] Execution time=0.057107
DEBUG - 2026-03-06 21:08:01 --> [REQ_ID=ae73764e72d4] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-06 21:08:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-06 21:08:01 --> [REQ_ID=ae73764e72d4] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-06 21:08:01 --> [REQ_ID=ae73764e72d4] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-06 21:08:01 --> [REQ_ID=ae73764e72d4] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-06 21:08:01 --> [CSRF] token name=csrf_test_name hash=28d20ef8fc392e09e92c54dab9d92f5c
DEBUG - 2026-03-06 21:08:01 --> [REQ_ID=bd3d27d41474] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-06 21:08:01 --> [REQ_ID=bd3d27d41474] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-06 21:08:01 --> [REQ_ID=ae73764e72d4] [FILTER_AFTER]
DEBUG - 2026-03-06 21:08:01 --> [REQ_ID=ae73764e72d4] [LIFECYCLE][END] status=200 duration_ms=59.23 memory_delta=0
INFO - 2026-03-06 21:08:01 --> [REQ_ID=bd3d27d41474] [PERF] Execution time=0.059111
DEBUG - 2026-03-06 21:08:01 --> [REQ_ID=ae73764e72d4] [REQUEST][END]
INFO - 2026-03-06 21:08:01 --> [REQ_ID=ae73764e72d4] [PERF] Execution time=0.071365
DEBUG - 2026-03-06 21:11:19 --> [REQ_ID=0bea6aed6704] [REQUEST][START] HEAD /
DEBUG - 2026-03-06 21:11:19 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-06 21:11:19 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-06 21:11:19 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-06 21:11:19 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-06 21:11:19 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-06 21:12:02 --> [REQ_ID=a83984874a2b] [REQUEST][START] GET /index.php/Management/Alerts
DEBUG - 2026-03-06 21:12:02 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-06 21:12:02 --> [REQ_ID=a83984874a2b] [FILTER_BEFORE] /index.php/Management/Alerts
DEBUG - 2026-03-06 21:12:02 --> [REQ_ID=a83984874a2b] [ROUTE] Controller=\App\Modules\Management\Controllers\AlertsAdminController Method=index
DEBUG - 2026-03-06 21:12:02 --> [REQ_ID=a83984874a2b] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Management/Alerts
DEBUG - 2026-03-06 21:12:02 --> [CSRF] token name=csrf_test_name hash=b651ea644c987df956e519a7932daf79
DEBUG - 2026-03-06 21:12:02 --> [REQ_ID=a83984874a2b] [REQUEST][END]
INFO - 2026-03-06 21:12:02 --> [REQ_ID=a83984874a2b] [PERF] Execution time=0.034533
DEBUG - 2026-03-06 21:12:02 --> [REQ_ID=1b32c9642aa8] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-06 21:12:02 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-06 21:12:02 --> [REQ_ID=1b32c9642aa8] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-06 21:12:02 --> [REQ_ID=1b32c9642aa8] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-06 21:12:02 --> [REQ_ID=1b32c9642aa8] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-06 21:12:02 --> [CSRF] token name=csrf_test_name hash=aba0a7e4e3dbd4897e0bbd931395d28a
DEBUG - 2026-03-06 21:12:02 --> [REQ_ID=5cf89332da38] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-06 21:12:02 --> [REQ_ID=5cf89332da38] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-06 21:12:02 --> [REQ_ID=1b32c9642aa8] [FILTER_AFTER]
DEBUG - 2026-03-06 21:12:02 --> [REQ_ID=1b32c9642aa8] [LIFECYCLE][END] status=200 duration_ms=23.87 memory_delta=0
INFO - 2026-03-06 21:12:02 --> [REQ_ID=5cf89332da38] [PERF] Execution time=0.023653
DEBUG - 2026-03-06 21:12:02 --> [REQ_ID=1b32c9642aa8] [REQUEST][END]
INFO - 2026-03-06 21:12:02 --> [REQ_ID=1b32c9642aa8] [PERF] Execution time=0.035708
INFO - 2026-03-06 21:15:01 --> [spark:ops:work] Started
INFO - 2026-03-06 21:15:01 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-03-06 21:15:01 --> [SPARK_MEMORY] 16777216
INFO - 2026-03-06 21:15:01 --> [spark:ops:work] Intent
INFO - 2026-03-06 21:15:01 --> [spark:ops:work] Completed
INFO - 2026-03-06 21:15:01 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.070762
INFO - 2026-03-06 21:15:01 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-03-06 21:15:01 --> [REQ_ID=e455c7223b83] [REQUEST][START] GET /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-06 21:15:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-06 21:15:01 --> [REQ_ID=e455c7223b83] [FILTER_BEFORE] /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-06 21:15:01 --> [REQ_ID=e455c7223b83] [ROUTE] Controller=\App\Modules\APIs\Controllers\AlertsAPIController Method=fetchEmailAlerts
DEBUG - 2026-03-06 21:15:01 --> [REQ_ID=e455c7223b83] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-06 21:15:01 --> [REQ_ID=e455c7223b83] [REQUEST][END]
INFO - 2026-03-06 21:15:01 --> [REQ_ID=e455c7223b83] [PERF] Execution time=0.044415
DEBUG - 2026-03-06 21:16:19 --> [REQ_ID=5825e7046f8d] [REQUEST][START] HEAD /
DEBUG - 2026-03-06 21:16:19 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-06 21:16:19 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-06 21:16:19 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-06 21:16:19 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-06 21:16:19 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-06 21:17:51 --> [REQ_ID=759c964dc5de] [REQUEST][START] GET /
DEBUG - 2026-03-06 21:17:51 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-06 21:17:51 --> [REQ_ID=759c964dc5de] [FILTER_BEFORE] /
DEBUG - 2026-03-06 21:17:51 --> [REQ_ID=759c964dc5de] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-06 21:17:51 --> [REQ_ID=759c964dc5de] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-06 21:17:51 --> [CSRF] token name=csrf_test_name hash=0ce785179f6175f1d4db6131b6adaddb
DEBUG - 2026-03-06 21:17:51 --> [REQ_ID=873fdb3192fa] [INIT] App\Controllers\Home::GET
INFO - 2026-03-06 21:17:51 --> [REQ_ID=873fdb3192fa] [MEMORY][controller-start] 4194304
INFO - 2026-03-06 21:17:51 --> [REQ_ID=873fdb3192fa] [MEMORY][commonData:start] 4194304
DEBUG - 2026-03-06 21:17:51 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-06 21:17:51 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
DEBUG - 2026-03-06 21:17:51 --> [REQ_ID=873fdb3192fa] [VIEW_RENDER] themes/public/home
INFO - 2026-03-06 21:17:51 --> [REQ_ID=873fdb3192fa] [MEMORY][commonData:start] 8388608
INFO - 2026-03-06 21:17:51 --> themesMemory usage: 8388608
DEBUG - 2026-03-06 21:17:51 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-06 21:17:51 --> [REQ_ID=759c964dc5de] [FILTER_AFTER]
DEBUG - 2026-03-06 21:17:51 --> [REQ_ID=759c964dc5de] [LIFECYCLE][END] status=200 duration_ms=684.00 memory_delta=4194304
INFO - 2026-03-06 21:17:51 --> [REQ_ID=873fdb3192fa] [PERF] Execution time=0.682383
DEBUG - 2026-03-06 21:17:51 --> [REQ_ID=759c964dc5de] [REQUEST][END]
INFO - 2026-03-06 21:17:51 --> [REQ_ID=759c964dc5de] [PERF] Execution time=0.698266
DEBUG - 2026-03-06 21:17:55 --> [REQ_ID=24f32c3e-ad80-4d11-962c-f3ad817b8d6c] [REQUEST][START] GET /
DEBUG - 2026-03-06 21:17:55 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-06 21:17:55 --> [REQ_ID=24f32c3e-ad80-4d11-962c-f3ad817b8d6c] [FILTER_BEFORE] /
DEBUG - 2026-03-06 21:17:55 --> [REQ_ID=24f32c3e-ad80-4d11-962c-f3ad817b8d6c] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-06 21:17:55 --> [REQ_ID=24f32c3e-ad80-4d11-962c-f3ad817b8d6c] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-06 21:17:55 --> [CSRF] token name=csrf_test_name hash=7287e4f79b018852b1df327caf928b7d
DEBUG - 2026-03-06 21:17:55 --> [REQ_ID=b9e53b824de8] [INIT] App\Controllers\Home::GET
INFO - 2026-03-06 21:17:55 --> [REQ_ID=b9e53b824de8] [MEMORY][controller-start] 4194304
INFO - 2026-03-06 21:17:55 --> [REQ_ID=b9e53b824de8] [MEMORY][commonData:start] 4194304
DEBUG - 2026-03-06 21:17:55 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-06 21:17:55 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
DEBUG - 2026-03-06 21:17:55 --> [REQ_ID=b9e53b824de8] [VIEW_RENDER] themes/public/home
INFO - 2026-03-06 21:17:55 --> [REQ_ID=b9e53b824de8] [MEMORY][commonData:start] 8388608
INFO - 2026-03-06 21:17:55 --> themesMemory usage: 8388608
DEBUG - 2026-03-06 21:17:55 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-06 21:17:55 --> [REQ_ID=24f32c3e-ad80-4d11-962c-f3ad817b8d6c] [FILTER_AFTER]
DEBUG - 2026-03-06 21:17:55 --> [REQ_ID=24f32c3e-ad80-4d11-962c-f3ad817b8d6c] [LIFECYCLE][END] status=200 duration_ms=556.13 memory_delta=4194304
INFO - 2026-03-06 21:17:55 --> [REQ_ID=b9e53b824de8] [PERF] Execution time=0.555666
DEBUG - 2026-03-06 21:17:55 --> [REQ_ID=24f32c3e-ad80-4d11-962c-f3ad817b8d6c] [REQUEST][END]
INFO - 2026-03-06 21:17:55 --> [REQ_ID=24f32c3e-ad80-4d11-962c-f3ad817b8d6c] [PERF] Execution time=0.565548
DEBUG - 2026-03-06 21:20:34 --> [REQ_ID=fe0889372b44] [REQUEST][START] GET /index.php/Management/Partners
DEBUG - 2026-03-06 21:20:34 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-06 21:20:34 --> [REQ_ID=fe0889372b44] [FILTER_BEFORE] /index.php/Management/Partners
DEBUG - 2026-03-06 21:20:34 --> [REQ_ID=fe0889372b44] [ROUTE] Controller=\App\Modules\Management\Controllers\PartnersController Method=index
DEBUG - 2026-03-06 21:20:34 --> [REQ_ID=fe0889372b44] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Management/Partners
DEBUG - 2026-03-06 21:20:34 --> [CSRF] token name=csrf_test_name hash=cc6a2e0e95e8eb48304330637099cfa4
DEBUG - 2026-03-06 21:20:34 --> [REQ_ID=fe0889372b44] [REQUEST][END]
INFO - 2026-03-06 21:20:34 --> [REQ_ID=fe0889372b44] [PERF] Execution time=0.049604
DEBUG - 2026-03-06 21:20:41 --> [REQ_ID=cd55a2b55020] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-06 21:20:41 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-06 21:20:41 --> [REQ_ID=cd55a2b55020] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-06 21:20:41 --> [REQ_ID=cd55a2b55020] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-06 21:20:41 --> [REQ_ID=cd55a2b55020] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-06 21:20:41 --> [CSRF] token name=csrf_test_name hash=e1bb8cb67f1fd4a39af63a9bccf5ee49
DEBUG - 2026-03-06 21:20:41 --> [REQ_ID=47a337ef8ca5] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-06 21:20:41 --> [REQ_ID=47a337ef8ca5] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-06 21:20:41 --> [REQ_ID=cd55a2b55020] [FILTER_AFTER]
DEBUG - 2026-03-06 21:20:41 --> [REQ_ID=cd55a2b55020] [LIFECYCLE][END] status=200 duration_ms=57.76 memory_delta=0
INFO - 2026-03-06 21:20:41 --> [REQ_ID=47a337ef8ca5] [PERF] Execution time=0.056022
DEBUG - 2026-03-06 21:20:41 --> [REQ_ID=cd55a2b55020] [REQUEST][END]
INFO - 2026-03-06 21:20:41 --> [REQ_ID=cd55a2b55020] [PERF] Execution time=0.073460
DEBUG - 2026-03-06 21:21:19 --> [REQ_ID=6d0a41791d64] [REQUEST][START] HEAD /
DEBUG - 2026-03-06 21:21:19 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-06 21:21:19 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-06 21:21:19 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-06 21:21:19 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-06 21:21:19 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-06 21:26:19 --> [REQ_ID=dd1da8af3422] [REQUEST][START] HEAD /
DEBUG - 2026-03-06 21:26:19 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-06 21:26:19 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-06 21:26:19 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-06 21:26:19 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-06 21:26:19 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-06 21:26:55 --> [REQ_ID=4ab1a00ec557] [REQUEST][START] GET /index.php/Management/Services
DEBUG - 2026-03-06 21:26:55 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-06 21:26:55 --> [REQ_ID=4ab1a00ec557] [FILTER_BEFORE] /index.php/Management/Services
DEBUG - 2026-03-06 21:26:55 --> [REQ_ID=4ab1a00ec557] [ROUTE] Controller=\App\Modules\Management\Controllers\ServicesController Method=index
DEBUG - 2026-03-06 21:26:55 --> [REQ_ID=4ab1a00ec557] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Management/Services
DEBUG - 2026-03-06 21:26:55 --> [CSRF] token name=csrf_test_name hash=0f61ce9adf773084fbdee71df5671534
DEBUG - 2026-03-06 21:26:55 --> [REQ_ID=4ab1a00ec557] [REQUEST][END]
INFO - 2026-03-06 21:26:55 --> [REQ_ID=4ab1a00ec557] [PERF] Execution time=0.027396
DEBUG - 2026-03-06 21:26:55 --> [REQ_ID=e9d1c54d72e7] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-06 21:26:55 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-06 21:26:55 --> [REQ_ID=e9d1c54d72e7] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-06 21:26:55 --> [REQ_ID=e9d1c54d72e7] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-06 21:26:55 --> [REQ_ID=e9d1c54d72e7] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-06 21:26:55 --> [CSRF] token name=csrf_test_name hash=9e1b5280e420c9d5f5e94c100a8d283a
DEBUG - 2026-03-06 21:26:55 --> [REQ_ID=459af30b8bf7] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-06 21:26:55 --> [REQ_ID=459af30b8bf7] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-06 21:26:55 --> [REQ_ID=e9d1c54d72e7] [FILTER_AFTER]
DEBUG - 2026-03-06 21:26:55 --> [REQ_ID=e9d1c54d72e7] [LIFECYCLE][END] status=200 duration_ms=101.46 memory_delta=0
INFO - 2026-03-06 21:26:55 --> [REQ_ID=459af30b8bf7] [PERF] Execution time=0.101211
DEBUG - 2026-03-06 21:26:55 --> [REQ_ID=e9d1c54d72e7] [REQUEST][END]
INFO - 2026-03-06 21:26:55 --> [REQ_ID=e9d1c54d72e7] [PERF] Execution time=0.119646
INFO - 2026-03-06 21:30:01 --> [spark:ops:work] Started
INFO - 2026-03-06 21:30:01 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-03-06 21:30:01 --> [SPARK_MEMORY] 16777216
INFO - 2026-03-06 21:30:01 --> [spark:ops:work] Intent
INFO - 2026-03-06 21:30:02 --> [spark:ops:work] Completed
INFO - 2026-03-06 21:30:02 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.118953
INFO - 2026-03-06 21:30:02 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-03-06 21:31:19 --> [REQ_ID=d42af76e873d] [REQUEST][START] HEAD /
DEBUG - 2026-03-06 21:31:19 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-06 21:31:19 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-06 21:31:19 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-06 21:31:19 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-06 21:31:19 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-06 21:36:19 --> [REQ_ID=2127c96776fa] [REQUEST][START] HEAD /
DEBUG - 2026-03-06 21:36:19 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-06 21:36:19 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-06 21:36:19 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-06 21:36:19 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-06 21:36:19 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-06 21:39:12 --> [REQ_ID=4358b3f000a7] [REQUEST][START] GET /
DEBUG - 2026-03-06 21:39:12 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-06 21:39:12 --> [REQ_ID=4358b3f000a7] [FILTER_BEFORE] /
DEBUG - 2026-03-06 21:39:12 --> [REQ_ID=4358b3f000a7] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-06 21:39:12 --> [REQ_ID=4358b3f000a7] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-06 21:39:12 --> [CSRF] token name=csrf_test_name hash=efd9ad0b3f927e81c21edff367174503
DEBUG - 2026-03-06 21:39:12 --> [REQ_ID=cc22d076cac8] [INIT] App\Controllers\Home::GET
INFO - 2026-03-06 21:39:12 --> [REQ_ID=cc22d076cac8] [MEMORY][controller-start] 6291456
INFO - 2026-03-06 21:39:13 --> [REQ_ID=cc22d076cac8] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-06 21:39:13 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-06 21:39:13 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-03-06 21:39:13 --> [REQ_ID=cc22d076cac8] [VIEW_RENDER] themes/public/home
INFO - 2026-03-06 21:39:13 --> [REQ_ID=cc22d076cac8] [MEMORY][commonData:start] 10485760
INFO - 2026-03-06 21:39:13 --> themesMemory usage: 10485760
DEBUG - 2026-03-06 21:39:13 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-06 21:39:13 --> [REQ_ID=4358b3f000a7] [FILTER_AFTER]
DEBUG - 2026-03-06 21:39:13 --> [REQ_ID=4358b3f000a7] [LIFECYCLE][END] status=200 duration_ms=609.96 memory_delta=4194304
INFO - 2026-03-06 21:39:13 --> [REQ_ID=cc22d076cac8] [PERF] Execution time=0.607661
DEBUG - 2026-03-06 21:39:13 --> [REQ_ID=4358b3f000a7] [REQUEST][END]
INFO - 2026-03-06 21:39:13 --> [REQ_ID=4358b3f000a7] [PERF] Execution time=0.648330
DEBUG - 2026-03-06 21:41:19 --> [REQ_ID=c7fc0a93e26c] [REQUEST][START] HEAD /
DEBUG - 2026-03-06 21:41:19 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-06 21:41:19 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-06 21:41:19 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-06 21:41:19 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-06 21:41:19 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
INFO - 2026-03-06 21:45:01 --> [spark:ops:work] Started
INFO - 2026-03-06 21:45:01 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-03-06 21:45:01 --> [SPARK_MEMORY] 16777216
INFO - 2026-03-06 21:45:01 --> [spark:ops:work] Intent
INFO - 2026-03-06 21:45:01 --> [spark:ops:work] Completed
INFO - 2026-03-06 21:45:01 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.181346
INFO - 2026-03-06 21:45:01 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-03-06 21:46:19 --> [REQ_ID=80eb9c9acc6e] [REQUEST][START] HEAD /
DEBUG - 2026-03-06 21:46:19 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-06 21:46:19 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-06 21:46:19 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-06 21:46:19 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-06 21:46:19 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-06 21:51:19 --> [REQ_ID=859278728b44] [REQUEST][START] HEAD /
DEBUG - 2026-03-06 21:51:19 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-06 21:51:19 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-06 21:51:19 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-06 21:51:19 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-06 21:51:19 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-06 21:52:27 --> [REQ_ID=1866092c67bb] [REQUEST][START] GET /index.php/Alerts
DEBUG - 2026-03-06 21:52:27 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-06 21:52:27 --> [REQ_ID=1866092c67bb] [FILTER_BEFORE] /index.php/Alerts
DEBUG - 2026-03-06 21:52:27 --> [REQ_ID=1866092c67bb] [ROUTE] Controller=\App\Modules\User\Controllers\AlertsController Method=index
DEBUG - 2026-03-06 21:52:27 --> [REQ_ID=1866092c67bb] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Alerts
DEBUG - 2026-03-06 21:52:27 --> [CSRF] token name=csrf_test_name hash=cdaf91d2596bbd826f8b08a26fd1d45d
DEBUG - 2026-03-06 21:52:27 --> [REQ_ID=1866092c67bb] [REQUEST][END]
INFO - 2026-03-06 21:52:27 --> [REQ_ID=1866092c67bb] [PERF] Execution time=0.031553
DEBUG - 2026-03-06 21:52:27 --> [REQ_ID=4e268aa35bf1] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-06 21:52:27 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-06 21:52:27 --> [REQ_ID=4e268aa35bf1] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-06 21:52:27 --> [REQ_ID=4e268aa35bf1] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-06 21:52:27 --> [REQ_ID=4e268aa35bf1] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-06 21:52:27 --> [CSRF] token name=csrf_test_name hash=d8ba6ae4375ab676b8fcbe714c2cf5c7
DEBUG - 2026-03-06 21:52:27 --> [REQ_ID=9da1232cd614] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-06 21:52:27 --> [REQ_ID=9da1232cd614] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-06 21:52:27 --> [REQ_ID=4e268aa35bf1] [FILTER_AFTER]
DEBUG - 2026-03-06 21:52:27 --> [REQ_ID=4e268aa35bf1] [LIFECYCLE][END] status=200 duration_ms=112.39 memory_delta=0
INFO - 2026-03-06 21:52:27 --> [REQ_ID=9da1232cd614] [PERF] Execution time=0.112255
DEBUG - 2026-03-06 21:52:27 --> [REQ_ID=4e268aa35bf1] [REQUEST][END]
INFO - 2026-03-06 21:52:27 --> [REQ_ID=4e268aa35bf1] [PERF] Execution time=0.125505
DEBUG - 2026-03-06 21:56:19 --> [REQ_ID=d69b1e9dfcd6] [REQUEST][START] HEAD /
DEBUG - 2026-03-06 21:56:19 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-06 21:56:19 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-06 21:56:19 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-06 21:56:19 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-06 21:56:19 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
INFO - 2026-03-06 22:00:01 --> [spark:ops:work] Started
INFO - 2026-03-06 22:00:01 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-03-06 22:00:01 --> [SPARK_MEMORY] 16777216
INFO - 2026-03-06 22:00:01 --> [spark:ops:work] Intent
INFO - 2026-03-06 22:00:01 --> [SPARK_START] App\Commands\AIOps\Run
INFO - 2026-03-06 22:00:01 --> [SPARK_MEMORY] 16777216
INFO - 2026-03-06 22:00:01 --> [spark:aiops:run] Intent
DEBUG - 2026-03-06 22:00:01 --> [REQ_ID=2c6190af90b9] [REQUEST][START] GET /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-06 22:00:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-06 22:00:02 --> [REQ_ID=2c6190af90b9] [FILTER_BEFORE] /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-06 22:00:02 --> [REQ_ID=2c6190af90b9] [ROUTE] Controller=\App\Modules\Management\Controllers\ManagementAPIController Method=Run_CRON_Tasks
DEBUG - 2026-03-06 22:00:02 --> [REQ_ID=2c6190af90b9] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-06 22:00:02 --> [REQ_ID=2c6190af90b9] [REQUEST][END]
INFO - 2026-03-06 22:00:02 --> [REQ_ID=2c6190af90b9] [PERF] Execution time=0.050142
INFO - 2026-03-06 22:00:02 --> [spark:ops:work] Completed
INFO - 2026-03-06 22:00:02 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.205537
INFO - 2026-03-06 22:00:02 --> [SPARK_MEMORY] 18874368
INFO - 2026-03-06 22:00:03 --> [AIOPS][SPARK][GOVERNANCE][spark:logs:summarize] Started
INFO - 2026-03-06 22:00:03 --> [SPARK_START] App\Commands\Logs\Summarize
INFO - 2026-03-06 22:00:03 --> [SPARK_MEMORY] 16777216
INFO - 2026-03-06 22:00:03 --> [spark:logs:summarize] Intent
INFO - 2026-03-06 22:00:03 --> [AIOPS][SPARK][GOVERNANCE][spark:logs:summarize] Completed
INFO - 2026-03-06 22:00:03 --> [SPARK_COMPLETE] App\Commands\Logs\Summarize duration=0.027814
INFO - 2026-03-06 22:00:03 --> [SPARK_MEMORY] 20971520
INFO - 2026-03-06 22:00:03 --> [spark:app:healthcheck] Started
INFO - 2026-03-06 22:00:03 --> [SPARK_START] App\Commands\App\Healthcheck
INFO - 2026-03-06 22:00:03 --> [SPARK_MEMORY] 16777216
INFO - 2026-03-06 22:00:03 --> [spark:app:healthcheck] Intent
DEBUG - 2026-03-06 22:00:03 --> LOG_HEALTHCHECK debug marker=27693d2789f0
INFO - 2026-03-06 22:00:03 --> LOG_HEALTHCHECK info marker=27693d2789f0
NOTICE - 2026-03-06 22:00:03 --> LOG_HEALTHCHECK probe marker=27693d2789f0
INFO - 2026-03-06 22:00:03 --> [spark:app:healthcheck] Completed
INFO - 2026-03-06 22:00:03 --> [SPARK_COMPLETE] App\Commands\App\Healthcheck duration=0.084093
INFO - 2026-03-06 22:00:03 --> [SPARK_MEMORY] 20971520
DEBUG - 2026-03-06 22:00:05 --> OllamaPatchRunner:L142 - validateGeneratedPatch Content: 
WARNING - 2026-03-06 22:00:05 --> OllamaPatchRunner:L49 - Original Diff: 
DEBUG - 2026-03-06 22:00:05 --> OllamaPatchRunner:L51 - Retried Diff: 
DEBUG - 2026-03-06 22:00:05 --> OllamaPatchRunner:L142 - validateGeneratedPatch Content: 
DEBUG - 2026-03-06 22:00:05 --> OllamaPatchRunner:L53 - Validating Generated Patch Failed
INFO - 2026-03-06 22:00:05 --> [SPARK_COMPLETE] App\Commands\AIOps\Run duration=3.738192
INFO - 2026-03-06 22:00:05 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-03-06 22:01:19 --> [REQ_ID=05ec05361333] [REQUEST][START] HEAD /
DEBUG - 2026-03-06 22:01:19 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-06 22:01:19 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-06 22:01:19 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-06 22:01:19 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-06 22:01:19 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-06 22:06:19 --> [REQ_ID=4220456f72e4] [REQUEST][START] HEAD /
DEBUG - 2026-03-06 22:06:19 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-06 22:06:19 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-06 22:06:19 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-06 22:06:19 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-06 22:06:19 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-06 22:08:21 --> [REQ_ID=6e2dc6971ba2] [REQUEST][START] GET /index.php/Management/Admin
DEBUG - 2026-03-06 22:08:21 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-06 22:08:21 --> [REQ_ID=6e2dc6971ba2] [FILTER_BEFORE] /index.php/Management/Admin
DEBUG - 2026-03-06 22:08:21 --> [REQ_ID=6e2dc6971ba2] [ROUTE] Controller=\App\Modules\Management\Controllers\AdminController Method=index
DEBUG - 2026-03-06 22:08:21 --> [REQ_ID=6e2dc6971ba2] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Management/Admin
DEBUG - 2026-03-06 22:08:21 --> [CSRF] token name=csrf_test_name hash=0fd4adf32368d235a675270f1c72065a
DEBUG - 2026-03-06 22:08:21 --> [REQ_ID=6e2dc6971ba2] [REQUEST][END]
INFO - 2026-03-06 22:08:21 --> [REQ_ID=6e2dc6971ba2] [PERF] Execution time=0.051188
DEBUG - 2026-03-06 22:08:21 --> [REQ_ID=eb8f1c84533b] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-06 22:08:21 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-06 22:08:21 --> [REQ_ID=eb8f1c84533b] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-06 22:08:21 --> [REQ_ID=eb8f1c84533b] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-06 22:08:21 --> [REQ_ID=eb8f1c84533b] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-06 22:08:21 --> [CSRF] token name=csrf_test_name hash=01cb43f86463bf5e291c7778024a9331
DEBUG - 2026-03-06 22:08:21 --> [REQ_ID=3670ec67f792] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-06 22:08:21 --> [REQ_ID=3670ec67f792] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-06 22:08:21 --> [REQ_ID=eb8f1c84533b] [FILTER_AFTER]
DEBUG - 2026-03-06 22:08:21 --> [REQ_ID=eb8f1c84533b] [LIFECYCLE][END] status=200 duration_ms=155.55 memory_delta=0
INFO - 2026-03-06 22:08:21 --> [REQ_ID=3670ec67f792] [PERF] Execution time=0.155309
DEBUG - 2026-03-06 22:08:21 --> [REQ_ID=eb8f1c84533b] [REQUEST][END]
INFO - 2026-03-06 22:08:21 --> [REQ_ID=eb8f1c84533b] [PERF] Execution time=0.167061
DEBUG - 2026-03-06 22:11:19 --> [REQ_ID=5418a58029fd] [REQUEST][START] HEAD /
DEBUG - 2026-03-06 22:11:19 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-06 22:11:19 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-06 22:11:19 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-06 22:11:19 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-06 22:11:19 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
INFO - 2026-03-06 22:15:01 --> [spark:ops:work] Started
INFO - 2026-03-06 22:15:01 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-03-06 22:15:01 --> [SPARK_MEMORY] 16777216
INFO - 2026-03-06 22:15:01 --> [spark:ops:work] Intent
DEBUG - 2026-03-06 22:15:01 --> [REQ_ID=4782b6bed5d7] [REQUEST][START] GET /index.php/API/Alerts/fetchEmailAlerts
INFO - 2026-03-06 22:15:01 --> [spark:ops:work] Completed
INFO - 2026-03-06 22:15:01 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.029077
INFO - 2026-03-06 22:15:01 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-03-06 22:15:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-06 22:15:01 --> [REQ_ID=4782b6bed5d7] [FILTER_BEFORE] /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-06 22:15:01 --> [REQ_ID=4782b6bed5d7] [ROUTE] Controller=\App\Modules\APIs\Controllers\AlertsAPIController Method=fetchEmailAlerts
DEBUG - 2026-03-06 22:15:01 --> [REQ_ID=4782b6bed5d7] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-06 22:15:01 --> [REQ_ID=4782b6bed5d7] [REQUEST][END]
INFO - 2026-03-06 22:15:01 --> [REQ_ID=4782b6bed5d7] [PERF] Execution time=0.068961
DEBUG - 2026-03-06 22:16:19 --> [REQ_ID=de28357ea180] [REQUEST][START] HEAD /
DEBUG - 2026-03-06 22:16:19 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-06 22:16:19 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-06 22:16:19 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-06 22:16:19 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-06 22:16:19 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-06 22:21:19 --> [REQ_ID=d7d97c26cf9b] [REQUEST][START] HEAD /
DEBUG - 2026-03-06 22:21:19 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-06 22:21:19 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-06 22:21:19 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-06 22:21:19 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-06 22:21:19 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-06 22:23:43 --> [REQ_ID=286564231fad] [REQUEST][START] GET /
DEBUG - 2026-03-06 22:23:43 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-06 22:23:43 --> [REQ_ID=286564231fad] [FILTER_BEFORE] /
DEBUG - 2026-03-06 22:23:43 --> [REQ_ID=286564231fad] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-06 22:23:43 --> [REQ_ID=286564231fad] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-06 22:23:43 --> [CSRF] token name=csrf_test_name hash=11cdc252b19abca43b45729dc2edc17f
DEBUG - 2026-03-06 22:23:43 --> [REQ_ID=b981d5fd82a4] [INIT] App\Controllers\Home::GET
INFO - 2026-03-06 22:23:43 --> [REQ_ID=b981d5fd82a4] [MEMORY][controller-start] 6291456
INFO - 2026-03-06 22:23:44 --> [REQ_ID=b981d5fd82a4] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-06 22:23:44 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-06 22:23:44 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-03-06 22:23:44 --> [REQ_ID=b981d5fd82a4] [VIEW_RENDER] themes/public/home
INFO - 2026-03-06 22:23:44 --> [REQ_ID=b981d5fd82a4] [MEMORY][commonData:start] 10485760
INFO - 2026-03-06 22:23:44 --> themesMemory usage: 10485760
DEBUG - 2026-03-06 22:23:44 --> [MetaService] slug= pageName=Home cacheHit= path=DB
DEBUG - 2026-03-06 22:23:44 --> [REQ_ID=286564231fad] [FILTER_AFTER]
DEBUG - 2026-03-06 22:23:44 --> [REQ_ID=286564231fad] [LIFECYCLE][END] status=200 duration_ms=817.52 memory_delta=4194304
INFO - 2026-03-06 22:23:44 --> [REQ_ID=b981d5fd82a4] [PERF] Execution time=0.814928
DEBUG - 2026-03-06 22:23:44 --> [REQ_ID=286564231fad] [REQUEST][END]
INFO - 2026-03-06 22:23:44 --> [REQ_ID=286564231fad] [PERF] Execution time=0.866323
DEBUG - 2026-03-06 22:26:19 --> [REQ_ID=455e6a868b5e] [REQUEST][START] HEAD /
DEBUG - 2026-03-06 22:26:19 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-06 22:26:19 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-06 22:26:19 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-06 22:26:19 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-06 22:26:19 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
INFO - 2026-03-06 22:30:01 --> [spark:ops:work] Started
INFO - 2026-03-06 22:30:01 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-03-06 22:30:01 --> [SPARK_MEMORY] 16777216
INFO - 2026-03-06 22:30:01 --> [spark:ops:work] Intent
INFO - 2026-03-06 22:30:01 --> [spark:ops:work] Completed
INFO - 2026-03-06 22:30:01 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.135205
INFO - 2026-03-06 22:30:01 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-03-06 22:31:19 --> [REQ_ID=26c1aff16185] [REQUEST][START] HEAD /
DEBUG - 2026-03-06 22:31:19 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-06 22:31:19 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-06 22:31:19 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-06 22:31:19 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-06 22:31:19 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-06 22:31:30 --> [REQ_ID=723d47aa8548] [REQUEST][START] GET /
DEBUG - 2026-03-06 22:31:30 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-06 22:31:30 --> [REQ_ID=723d47aa8548] [FILTER_BEFORE] /
DEBUG - 2026-03-06 22:31:30 --> [REQ_ID=723d47aa8548] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-06 22:31:30 --> [REQ_ID=723d47aa8548] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-06 22:31:30 --> [CSRF] token name=csrf_test_name hash=de7de09661268b8efeb175d75fd42740
DEBUG - 2026-03-06 22:31:30 --> [REQ_ID=d5ee111fdca1] [INIT] App\Controllers\Home::GET
INFO - 2026-03-06 22:31:30 --> [REQ_ID=d5ee111fdca1] [MEMORY][controller-start] 4194304
INFO - 2026-03-06 22:31:30 --> [REQ_ID=d5ee111fdca1] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-06 22:31:30 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-06 22:31:31 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
DEBUG - 2026-03-06 22:31:31 --> [REQ_ID=d5ee111fdca1] [VIEW_RENDER] themes/public/home
INFO - 2026-03-06 22:31:31 --> [REQ_ID=d5ee111fdca1] [MEMORY][commonData:start] 8388608
INFO - 2026-03-06 22:31:31 --> themesMemory usage: 8388608
DEBUG - 2026-03-06 22:31:31 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-06 22:31:31 --> [REQ_ID=723d47aa8548] [FILTER_AFTER]
DEBUG - 2026-03-06 22:31:31 --> [REQ_ID=723d47aa8548] [LIFECYCLE][END] status=200 duration_ms=628.84 memory_delta=4194304
INFO - 2026-03-06 22:31:31 --> [REQ_ID=d5ee111fdca1] [PERF] Execution time=0.626773
DEBUG - 2026-03-06 22:31:31 --> [REQ_ID=723d47aa8548] [REQUEST][END]
INFO - 2026-03-06 22:31:31 --> [REQ_ID=723d47aa8548] [PERF] Execution time=0.649507
DEBUG - 2026-03-06 22:31:31 --> [REQ_ID=f1ad6f2e0cce] [REQUEST][START] POST /
DEBUG - 2026-03-06 22:31:31 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-06 22:31:31 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: POST, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-06 22:31:31 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-06 22:31:31 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-06 22:31:31 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: none
DEBUG - 2026-03-06 22:31:31 --> [REQ_ID=045658b17deb] [REQUEST][START] POST /
DEBUG - 2026-03-06 22:31:31 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-06 22:31:31 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: POST, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-06 22:31:31 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-06 22:31:31 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-06 22:31:31 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: none
DEBUG - 2026-03-06 22:31:32 --> [REQ_ID=f661c2e0e29f] [REQUEST][START] POST /
DEBUG - 2026-03-06 22:31:32 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-06 22:31:32 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: POST, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-06 22:31:32 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-06 22:31:32 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-06 22:31:32 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: none
DEBUG - 2026-03-06 22:36:19 --> [REQ_ID=c0db14fa4521] [REQUEST][START] HEAD /
DEBUG - 2026-03-06 22:36:19 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-06 22:36:19 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-06 22:36:19 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-06 22:36:19 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-06 22:36:19 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-06 22:36:42 --> [REQ_ID=5cad8d2a9779] [REQUEST][START] GET /index.php/Account/Connected-Accounts
DEBUG - 2026-03-06 22:36:42 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-06 22:36:42 --> [REQ_ID=5cad8d2a9779] [FILTER_BEFORE] /index.php/Account/Connected-Accounts
DEBUG - 2026-03-06 22:36:42 --> [REQ_ID=5cad8d2a9779] [ROUTE] Controller=\App\Modules\User\Controllers\DashboardController Method=connectedAccounts
DEBUG - 2026-03-06 22:36:42 --> [REQ_ID=5cad8d2a9779] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Account/Connected-Accounts
DEBUG - 2026-03-06 22:36:42 --> [CSRF] token name=csrf_test_name hash=9c8b35a034bf69e70b336369c62277b2
DEBUG - 2026-03-06 22:36:42 --> [REQ_ID=5cad8d2a9779] [REQUEST][END]
INFO - 2026-03-06 22:36:42 --> [REQ_ID=5cad8d2a9779] [PERF] Execution time=0.029705
DEBUG - 2026-03-06 22:36:43 --> [REQ_ID=cb5b7b761852] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-06 22:36:43 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-06 22:36:43 --> [REQ_ID=cb5b7b761852] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-06 22:36:43 --> [REQ_ID=cb5b7b761852] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-06 22:36:43 --> [REQ_ID=cb5b7b761852] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-06 22:36:43 --> [CSRF] token name=csrf_test_name hash=849f80b60dcc0e554c9f0253ae8202fb
DEBUG - 2026-03-06 22:36:43 --> [REQ_ID=3d1836d0be4d] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-06 22:36:43 --> [REQ_ID=3d1836d0be4d] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-06 22:36:43 --> [REQ_ID=cb5b7b761852] [FILTER_AFTER]
DEBUG - 2026-03-06 22:36:43 --> [REQ_ID=cb5b7b761852] [LIFECYCLE][END] status=200 duration_ms=152.92 memory_delta=0
INFO - 2026-03-06 22:36:43 --> [REQ_ID=3d1836d0be4d] [PERF] Execution time=0.152717
DEBUG - 2026-03-06 22:36:43 --> [REQ_ID=cb5b7b761852] [REQUEST][END]
INFO - 2026-03-06 22:36:43 --> [REQ_ID=cb5b7b761852] [PERF] Execution time=0.164424
DEBUG - 2026-03-06 22:37:23 --> [REQ_ID=f61417a6af03] [REQUEST][START] GET /index.php/Management/Marketing/Content/Generator
DEBUG - 2026-03-06 22:37:23 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-06 22:37:23 --> [REQ_ID=f61417a6af03] [FILTER_BEFORE] /index.php/Management/Marketing/Content/Generator
DEBUG - 2026-03-06 22:37:23 --> [REQ_ID=f61417a6af03] [ROUTE] Controller=\App\Modules\Management\Controllers\MarketingAdminController Method=contentGenerator
DEBUG - 2026-03-06 22:37:23 --> [REQ_ID=f61417a6af03] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Management/Marketing/Content/Generator
DEBUG - 2026-03-06 22:37:23 --> [CSRF] token name=csrf_test_name hash=01998066e73da934569c673e1c3ab87d
DEBUG - 2026-03-06 22:37:23 --> [REQ_ID=f61417a6af03] [REQUEST][END]
INFO - 2026-03-06 22:37:23 --> [REQ_ID=f61417a6af03] [PERF] Execution time=0.017919
DEBUG - 2026-03-06 22:37:23 --> [REQ_ID=8d007761a9b3] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-06 22:37:23 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-06 22:37:23 --> [REQ_ID=8d007761a9b3] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-06 22:37:23 --> [REQ_ID=8d007761a9b3] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-06 22:37:23 --> [REQ_ID=8d007761a9b3] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-06 22:37:23 --> [CSRF] token name=csrf_test_name hash=a117ecd4f3788884b401b562b5c12b32
DEBUG - 2026-03-06 22:37:23 --> [REQ_ID=327f1eab8b4f] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-06 22:37:23 --> [REQ_ID=327f1eab8b4f] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-06 22:37:23 --> [REQ_ID=8d007761a9b3] [FILTER_AFTER]
DEBUG - 2026-03-06 22:37:23 --> [REQ_ID=8d007761a9b3] [LIFECYCLE][END] status=200 duration_ms=41.38 memory_delta=0
INFO - 2026-03-06 22:37:23 --> [REQ_ID=327f1eab8b4f] [PERF] Execution time=0.041281
DEBUG - 2026-03-06 22:37:23 --> [REQ_ID=8d007761a9b3] [REQUEST][END]
INFO - 2026-03-06 22:37:23 --> [REQ_ID=8d007761a9b3] [PERF] Execution time=0.050876
DEBUG - 2026-03-06 22:39:39 --> [REQ_ID=5771af6a7abd] [REQUEST][START] GET /
DEBUG - 2026-03-06 22:39:39 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-06 22:39:39 --> [REQ_ID=5771af6a7abd] [FILTER_BEFORE] /
DEBUG - 2026-03-06 22:39:39 --> [REQ_ID=5771af6a7abd] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-06 22:39:39 --> [REQ_ID=5771af6a7abd] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-06 22:39:39 --> [CSRF] token name=csrf_test_name hash=4e3d2aec11217bce7ace5830419abe3b
DEBUG - 2026-03-06 22:39:39 --> [REQ_ID=4c34421d80f2] [INIT] App\Controllers\Home::GET
INFO - 2026-03-06 22:39:39 --> [REQ_ID=4c34421d80f2] [MEMORY][controller-start] 6291456
INFO - 2026-03-06 22:39:39 --> [REQ_ID=4c34421d80f2] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-06 22:39:39 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-06 22:39:39 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-03-06 22:39:39 --> [REQ_ID=4c34421d80f2] [VIEW_RENDER] themes/public/home
INFO - 2026-03-06 22:39:39 --> [REQ_ID=4c34421d80f2] [MEMORY][commonData:start] 10485760
INFO - 2026-03-06 22:39:39 --> themesMemory usage: 10485760
DEBUG - 2026-03-06 22:39:39 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-06 22:39:39 --> [REQ_ID=5771af6a7abd] [FILTER_AFTER]
DEBUG - 2026-03-06 22:39:39 --> [REQ_ID=5771af6a7abd] [LIFECYCLE][END] status=200 duration_ms=660.21 memory_delta=4194304
INFO - 2026-03-06 22:39:39 --> [REQ_ID=4c34421d80f2] [PERF] Execution time=0.657760
DEBUG - 2026-03-06 22:39:39 --> [REQ_ID=5771af6a7abd] [REQUEST][END]
INFO - 2026-03-06 22:39:39 --> [REQ_ID=5771af6a7abd] [PERF] Execution time=0.703852
DEBUG - 2026-03-06 22:41:19 --> [REQ_ID=14210556fc1b] [REQUEST][START] HEAD /
DEBUG - 2026-03-06 22:41:19 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-06 22:41:19 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-06 22:41:19 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-06 22:41:19 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-06 22:41:19 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-06 22:43:44 --> [REQ_ID=0427e86cf76e] [REQUEST][START] GET /
DEBUG - 2026-03-06 22:43:44 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-06 22:43:44 --> [REQ_ID=0427e86cf76e] [FILTER_BEFORE] /
DEBUG - 2026-03-06 22:43:44 --> [REQ_ID=0427e86cf76e] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-06 22:43:44 --> [REQ_ID=0427e86cf76e] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-06 22:43:44 --> [CSRF] token name=csrf_test_name hash=0738898c860250c0e440ac2a17459f59
DEBUG - 2026-03-06 22:43:44 --> [REQ_ID=b9b61c43c3d8] [INIT] App\Controllers\Home::GET
INFO - 2026-03-06 22:43:44 --> [REQ_ID=b9b61c43c3d8] [MEMORY][controller-start] 6291456
INFO - 2026-03-06 22:43:44 --> [REQ_ID=b9b61c43c3d8] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-06 22:43:44 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-06 22:43:45 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
DEBUG - 2026-03-06 22:43:45 --> [REQ_ID=b9b61c43c3d8] [VIEW_RENDER] themes/public/home
INFO - 2026-03-06 22:43:45 --> [REQ_ID=b9b61c43c3d8] [MEMORY][commonData:start] 10485760
INFO - 2026-03-06 22:43:45 --> themesMemory usage: 10485760
DEBUG - 2026-03-06 22:43:45 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-06 22:43:45 --> [REQ_ID=0427e86cf76e] [FILTER_AFTER]
DEBUG - 2026-03-06 22:43:45 --> [REQ_ID=0427e86cf76e] [LIFECYCLE][END] status=200 duration_ms=732.89 memory_delta=4194304
INFO - 2026-03-06 22:43:45 --> [REQ_ID=b9b61c43c3d8] [PERF] Execution time=0.730438
DEBUG - 2026-03-06 22:43:45 --> [REQ_ID=0427e86cf76e] [REQUEST][END]
INFO - 2026-03-06 22:43:45 --> [REQ_ID=0427e86cf76e] [PERF] Execution time=0.774173
INFO - 2026-03-06 22:45:01 --> [spark:ops:work] Started
INFO - 2026-03-06 22:45:01 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-03-06 22:45:01 --> [SPARK_MEMORY] 16777216
INFO - 2026-03-06 22:45:01 --> [spark:ops:work] Intent
INFO - 2026-03-06 22:45:01 --> [spark:ops:work] Completed
INFO - 2026-03-06 22:45:01 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.018602
INFO - 2026-03-06 22:45:01 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-03-06 22:46:19 --> [REQ_ID=902fd60a887f] [REQUEST][START] HEAD /
DEBUG - 2026-03-06 22:46:19 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-06 22:46:19 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-06 22:46:19 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-06 22:46:19 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-06 22:46:19 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-06 22:51:19 --> [REQ_ID=10cdae6a5afc] [REQUEST][START] HEAD /
DEBUG - 2026-03-06 22:51:19 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-06 22:51:19 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-06 22:51:19 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-06 22:51:19 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-06 22:51:19 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-06 22:52:01 --> [REQ_ID=55cacb8f9137] [REQUEST][START] GET /index.php/Account
DEBUG - 2026-03-06 22:52:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-06 22:52:01 --> [REQ_ID=55cacb8f9137] [FILTER_BEFORE] /index.php/Account
DEBUG - 2026-03-06 22:52:01 --> [REQ_ID=55cacb8f9137] [ROUTE] Controller=\App\Modules\User\Controllers\DashboardController Method=account
DEBUG - 2026-03-06 22:52:01 --> [REQ_ID=55cacb8f9137] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Account
DEBUG - 2026-03-06 22:52:01 --> [CSRF] token name=csrf_test_name hash=97e27d530f14df4b7930539e4b66b2aa
DEBUG - 2026-03-06 22:52:01 --> [REQ_ID=55cacb8f9137] [REQUEST][END]
INFO - 2026-03-06 22:52:01 --> [REQ_ID=55cacb8f9137] [PERF] Execution time=0.035876
DEBUG - 2026-03-06 22:52:01 --> [REQ_ID=697710c3bbc8] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-06 22:52:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-06 22:52:01 --> [REQ_ID=697710c3bbc8] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-06 22:52:01 --> [REQ_ID=697710c3bbc8] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-06 22:52:01 --> [REQ_ID=697710c3bbc8] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-06 22:52:01 --> [CSRF] token name=csrf_test_name hash=95c97c3d02528f031abcd5bfbe089f0a
DEBUG - 2026-03-06 22:52:01 --> [REQ_ID=492954f718c9] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-06 22:52:01 --> [REQ_ID=492954f718c9] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-06 22:52:01 --> [REQ_ID=697710c3bbc8] [FILTER_AFTER]
DEBUG - 2026-03-06 22:52:01 --> [REQ_ID=697710c3bbc8] [LIFECYCLE][END] status=200 duration_ms=98.53 memory_delta=0
INFO - 2026-03-06 22:52:01 --> [REQ_ID=492954f718c9] [PERF] Execution time=0.098488
DEBUG - 2026-03-06 22:52:01 --> [REQ_ID=697710c3bbc8] [REQUEST][END]
INFO - 2026-03-06 22:52:01 --> [REQ_ID=697710c3bbc8] [PERF] Execution time=0.110714
DEBUG - 2026-03-06 22:56:19 --> [REQ_ID=bd47ecfccf46] [REQUEST][START] HEAD /
DEBUG - 2026-03-06 22:56:19 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-06 22:56:19 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-06 22:56:19 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-06 22:56:19 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-06 22:56:19 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
INFO - 2026-03-06 23:00:01 --> [spark:ops:work] Started
INFO - 2026-03-06 23:00:01 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-03-06 23:00:01 --> [SPARK_MEMORY] 16777216
INFO - 2026-03-06 23:00:01 --> [spark:ops:work] Intent
DEBUG - 2026-03-06 23:00:01 --> [REQ_ID=2fd00796d26f] [REQUEST][START] GET /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-06 23:00:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-06 23:00:01 --> [REQ_ID=2fd00796d26f] [FILTER_BEFORE] /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-06 23:00:01 --> [REQ_ID=2fd00796d26f] [ROUTE] Controller=\App\Modules\Management\Controllers\ManagementAPIController Method=Run_CRON_Tasks
DEBUG - 2026-03-06 23:00:01 --> [REQ_ID=2fd00796d26f] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Management/Run-CRON-Tasks
INFO - 2026-03-06 23:00:01 --> [spark:ops:work] Completed
INFO - 2026-03-06 23:00:01 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.158096
INFO - 2026-03-06 23:00:01 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-03-06 23:00:01 --> [REQ_ID=2fd00796d26f] [REQUEST][END]
INFO - 2026-03-06 23:00:01 --> [REQ_ID=2fd00796d26f] [PERF] Execution time=0.083439
DEBUG - 2026-03-06 23:01:19 --> [REQ_ID=a13595498416] [REQUEST][START] HEAD /
DEBUG - 2026-03-06 23:01:19 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-06 23:01:19 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-06 23:01:19 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-06 23:01:19 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-06 23:01:19 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-06 23:05:07 --> [REQ_ID=e9a5688b1e7c] [REQUEST][START] GET /
DEBUG - 2026-03-06 23:05:07 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-06 23:05:08 --> [REQ_ID=e9a5688b1e7c] [FILTER_BEFORE] /
DEBUG - 2026-03-06 23:05:08 --> [REQ_ID=e9a5688b1e7c] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-06 23:05:08 --> [REQ_ID=e9a5688b1e7c] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-06 23:05:08 --> [CSRF] token name=csrf_test_name hash=ecc38661082bf26c8603ee15de4efde8
DEBUG - 2026-03-06 23:05:08 --> [REQ_ID=11e5e529d853] [INIT] App\Controllers\Home::GET
INFO - 2026-03-06 23:05:08 --> [REQ_ID=11e5e529d853] [MEMORY][controller-start] 6291456
INFO - 2026-03-06 23:05:08 --> [REQ_ID=11e5e529d853] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-06 23:05:08 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-06 23:05:08 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-03-06 23:05:08 --> [REQ_ID=11e5e529d853] [VIEW_RENDER] themes/public/home
INFO - 2026-03-06 23:05:08 --> [REQ_ID=11e5e529d853] [MEMORY][commonData:start] 10485760
INFO - 2026-03-06 23:05:08 --> themesMemory usage: 10485760
DEBUG - 2026-03-06 23:05:08 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-06 23:05:08 --> [REQ_ID=e9a5688b1e7c] [FILTER_AFTER]
DEBUG - 2026-03-06 23:05:08 --> [REQ_ID=e9a5688b1e7c] [LIFECYCLE][END] status=200 duration_ms=672.92 memory_delta=4194304
INFO - 2026-03-06 23:05:08 --> [REQ_ID=11e5e529d853] [PERF] Execution time=0.671080
DEBUG - 2026-03-06 23:05:08 --> [REQ_ID=e9a5688b1e7c] [REQUEST][END]
INFO - 2026-03-06 23:05:08 --> [REQ_ID=e9a5688b1e7c] [PERF] Execution time=0.714769
DEBUG - 2026-03-06 23:05:18 --> [REQ_ID=faadfffee80b] [REQUEST][START] GET /
DEBUG - 2026-03-06 23:05:18 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-06 23:05:18 --> [REQ_ID=faadfffee80b] [FILTER_BEFORE] /
DEBUG - 2026-03-06 23:05:18 --> [REQ_ID=faadfffee80b] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-06 23:05:18 --> [REQ_ID=faadfffee80b] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-06 23:05:18 --> [CSRF] token name=csrf_test_name hash=ecc38661082bf26c8603ee15de4efde8
DEBUG - 2026-03-06 23:05:18 --> [REQ_ID=b0c96ab4d3d3] [INIT] App\Controllers\Home::GET
INFO - 2026-03-06 23:05:18 --> [REQ_ID=b0c96ab4d3d3] [MEMORY][controller-start] 6291456
INFO - 2026-03-06 23:05:18 --> [REQ_ID=b0c96ab4d3d3] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-06 23:05:18 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-06 23:05:19 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
DEBUG - 2026-03-06 23:05:19 --> [REQ_ID=b0c96ab4d3d3] [VIEW_RENDER] themes/public/home
INFO - 2026-03-06 23:05:19 --> [REQ_ID=b0c96ab4d3d3] [MEMORY][commonData:start] 8388608
INFO - 2026-03-06 23:05:19 --> themesMemory usage: 8388608
DEBUG - 2026-03-06 23:05:19 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-06 23:05:19 --> [REQ_ID=faadfffee80b] [FILTER_AFTER]
DEBUG - 2026-03-06 23:05:19 --> [REQ_ID=faadfffee80b] [LIFECYCLE][END] status=200 duration_ms=523.23 memory_delta=2097152
INFO - 2026-03-06 23:05:19 --> [REQ_ID=b0c96ab4d3d3] [PERF] Execution time=0.522902
DEBUG - 2026-03-06 23:05:19 --> [REQ_ID=faadfffee80b] [REQUEST][END]
INFO - 2026-03-06 23:05:19 --> [REQ_ID=faadfffee80b] [PERF] Execution time=0.532552
DEBUG - 2026-03-06 23:06:19 --> [REQ_ID=caaeab5cfca5] [REQUEST][START] HEAD /
DEBUG - 2026-03-06 23:06:19 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-06 23:06:19 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-06 23:06:19 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-06 23:06:19 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-06 23:06:19 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-06 23:11:19 --> [REQ_ID=f2807b830a3c] [REQUEST][START] HEAD /
DEBUG - 2026-03-06 23:11:19 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-06 23:11:19 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-06 23:11:19 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-06 23:11:19 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-06 23:11:19 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
INFO - 2026-03-06 23:15:01 --> [spark:ops:work] Started
INFO - 2026-03-06 23:15:01 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-03-06 23:15:01 --> [SPARK_MEMORY] 16777216
INFO - 2026-03-06 23:15:01 --> [spark:ops:work] Intent
DEBUG - 2026-03-06 23:15:01 --> [REQ_ID=1daec4f22b7f] [REQUEST][START] GET /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-06 23:15:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-06 23:15:01 --> [REQ_ID=1daec4f22b7f] [FILTER_BEFORE] /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-06 23:15:01 --> [REQ_ID=1daec4f22b7f] [ROUTE] Controller=\App\Modules\APIs\Controllers\AlertsAPIController Method=fetchEmailAlerts
DEBUG - 2026-03-06 23:15:01 --> [REQ_ID=1daec4f22b7f] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-06 23:15:01 --> [REQ_ID=1daec4f22b7f] [REQUEST][END]
INFO - 2026-03-06 23:15:01 --> [REQ_ID=1daec4f22b7f] [PERF] Execution time=0.063393
INFO - 2026-03-06 23:15:01 --> [spark:ops:work] Completed
INFO - 2026-03-06 23:15:01 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.204642
INFO - 2026-03-06 23:15:01 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-03-06 23:16:19 --> [REQ_ID=013e1ddf079a] [REQUEST][START] HEAD /
DEBUG - 2026-03-06 23:16:19 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-06 23:16:19 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-06 23:16:19 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-06 23:16:19 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-06 23:16:19 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-06 23:17:20 --> [REQ_ID=a6e015d6567c] [REQUEST][START] GET /index.php/Premium-Features/Advanced-Trade-Tracker
DEBUG - 2026-03-06 23:17:20 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-06 23:17:20 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: GET, Route: Premium-Features/Advanced-Trade-Tracker]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-06 23:17:20 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-06 23:17:20 --> [404] URI=https://www.mymiwallet.com/index.php/Premium-Features/Advanced-Trade-Tracker
WARNING - 2026-03-06 23:17:20 --> 404 route miss: https://www.mymiwallet.com/index.php/Premium-Features/Advanced-Trade-Tracker | referrer: none
DEBUG - 2026-03-06 23:21:19 --> [REQ_ID=dfafa02eedc9] [REQUEST][START] HEAD /
DEBUG - 2026-03-06 23:21:19 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-06 23:21:19 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-06 23:21:19 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-06 23:21:19 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-06 23:21:19 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-06 23:23:17 --> [REQ_ID=fd4ba464ccf4] [REQUEST][START] GET /index.php/MyMI-Gold/Goals/Daily
DEBUG - 2026-03-06 23:23:17 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-06 23:23:17 --> [REQ_ID=fd4ba464ccf4] [FILTER_BEFORE] /index.php/MyMI-Gold/Goals/Daily
DEBUG - 2026-03-06 23:23:17 --> [REQ_ID=fd4ba464ccf4] [ROUTE] Controller=\App\Modules\User\Controllers\DashboardController Method=goals
DEBUG - 2026-03-06 23:23:17 --> [REQ_ID=fd4ba464ccf4] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/MyMI-Gold/Goals/Daily
DEBUG - 2026-03-06 23:23:17 --> [CSRF] token name=csrf_test_name hash=d8759adf5d7f3583a430a60b018b43a0
DEBUG - 2026-03-06 23:23:17 --> [REQ_ID=fd4ba464ccf4] [REQUEST][END]
INFO - 2026-03-06 23:23:17 --> [REQ_ID=fd4ba464ccf4] [PERF] Execution time=0.072071
DEBUG - 2026-03-06 23:23:17 --> [REQ_ID=9bbd173904db] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-06 23:23:17 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-06 23:23:17 --> [REQ_ID=9bbd173904db] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-06 23:23:17 --> [REQ_ID=9bbd173904db] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-06 23:23:17 --> [REQ_ID=9bbd173904db] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-06 23:23:17 --> [CSRF] token name=csrf_test_name hash=ba3dc883b582f97676da040ec52ed5a2
DEBUG - 2026-03-06 23:23:17 --> [REQ_ID=6cdf5ff217d4] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-06 23:23:17 --> [REQ_ID=6cdf5ff217d4] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-06 23:23:17 --> [REQ_ID=9bbd173904db] [FILTER_AFTER]
DEBUG - 2026-03-06 23:23:17 --> [REQ_ID=9bbd173904db] [LIFECYCLE][END] status=200 duration_ms=250.99 memory_delta=0
INFO - 2026-03-06 23:23:17 --> [REQ_ID=6cdf5ff217d4] [PERF] Execution time=0.250881
DEBUG - 2026-03-06 23:23:17 --> [REQ_ID=9bbd173904db] [REQUEST][END]
INFO - 2026-03-06 23:23:17 --> [REQ_ID=9bbd173904db] [PERF] Execution time=0.262851
DEBUG - 2026-03-06 23:26:19 --> [REQ_ID=c21b0626be8f] [REQUEST][START] HEAD /
DEBUG - 2026-03-06 23:26:19 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-06 23:26:19 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-06 23:26:19 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-06 23:26:19 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-06 23:26:19 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-06 23:27:16 --> [REQ_ID=a2b787019c51] [REQUEST][START] GET /
DEBUG - 2026-03-06 23:27:16 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-06 23:27:16 --> [REQ_ID=a2b787019c51] [FILTER_BEFORE] /
DEBUG - 2026-03-06 23:27:16 --> [REQ_ID=a2b787019c51] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-06 23:27:16 --> [REQ_ID=a2b787019c51] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-06 23:27:16 --> [CSRF] token name=csrf_test_name hash=789643288e81ead66e1e2278b5e4f9fe
DEBUG - 2026-03-06 23:27:16 --> [REQ_ID=ab581ed559fe] [INIT] App\Controllers\Home::GET
INFO - 2026-03-06 23:27:16 --> [REQ_ID=ab581ed559fe] [MEMORY][controller-start] 4194304
INFO - 2026-03-06 23:27:16 --> [REQ_ID=ab581ed559fe] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-06 23:27:16 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-06 23:27:17 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-03-06 23:27:17 --> [REQ_ID=ab581ed559fe] [VIEW_RENDER] themes/public/home
INFO - 2026-03-06 23:27:17 --> [REQ_ID=ab581ed559fe] [MEMORY][commonData:start] 8388608
INFO - 2026-03-06 23:27:17 --> themesMemory usage: 8388608
DEBUG - 2026-03-06 23:27:17 --> [MetaService] slug= pageName=Home cacheHit= path=DB
DEBUG - 2026-03-06 23:27:17 --> [REQ_ID=a2b787019c51] [FILTER_AFTER]
DEBUG - 2026-03-06 23:27:17 --> [REQ_ID=a2b787019c51] [LIFECYCLE][END] status=200 duration_ms=943.91 memory_delta=4194304
INFO - 2026-03-06 23:27:17 --> [REQ_ID=ab581ed559fe] [PERF] Execution time=0.941576
DEBUG - 2026-03-06 23:27:17 --> [REQ_ID=a2b787019c51] [REQUEST][END]
INFO - 2026-03-06 23:27:17 --> [REQ_ID=a2b787019c51] [PERF] Execution time=0.967001
INFO - 2026-03-06 23:30:02 --> [spark:ops:work] Started
INFO - 2026-03-06 23:30:02 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-03-06 23:30:02 --> [SPARK_MEMORY] 16777216
INFO - 2026-03-06 23:30:02 --> [spark:ops:work] Intent
INFO - 2026-03-06 23:30:02 --> [spark:ops:work] Completed
INFO - 2026-03-06 23:30:02 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.142805
INFO - 2026-03-06 23:30:02 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-03-06 23:31:19 --> [REQ_ID=2b4849b0c7bd] [REQUEST][START] HEAD /
DEBUG - 2026-03-06 23:31:19 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-06 23:31:19 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-06 23:31:19 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-06 23:31:19 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-06 23:31:19 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-06 23:36:19 --> [REQ_ID=42dd7696ef88] [REQUEST][START] HEAD /
DEBUG - 2026-03-06 23:36:19 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-06 23:36:19 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-06 23:36:19 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-06 23:36:19 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-06 23:36:19 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-06 23:41:19 --> [REQ_ID=b78076c1857b] [REQUEST][START] HEAD /
DEBUG - 2026-03-06 23:41:19 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-06 23:41:19 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-06 23:41:19 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-06 23:41:19 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-06 23:41:19 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
INFO - 2026-03-06 23:45:01 --> [spark:ops:work] Started
INFO - 2026-03-06 23:45:01 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-03-06 23:45:01 --> [SPARK_MEMORY] 16777216
INFO - 2026-03-06 23:45:01 --> [spark:ops:work] Intent
INFO - 2026-03-06 23:45:01 --> [spark:ops:work] Completed
INFO - 2026-03-06 23:45:01 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.045475
INFO - 2026-03-06 23:45:01 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-03-06 23:46:19 --> [REQ_ID=80392449b70c] [REQUEST][START] HEAD /
DEBUG - 2026-03-06 23:46:19 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-06 23:46:19 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-06 23:46:19 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-06 23:46:19 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-06 23:46:19 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-06 23:50:19 --> [REQ_ID=33c2739b8929] [REQUEST][START] GET /index.php/Privacy-Policy
DEBUG - 2026-03-06 23:50:19 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-06 23:50:19 --> [REQ_ID=33c2739b8929] [FILTER_BEFORE] /index.php/Privacy-Policy
DEBUG - 2026-03-06 23:50:19 --> [REQ_ID=33c2739b8929] [ROUTE] Controller=\App\Controllers\Home Method=privacyPolicy
DEBUG - 2026-03-06 23:50:19 --> [REQ_ID=33c2739b8929] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Privacy-Policy
DEBUG - 2026-03-06 23:50:19 --> [CSRF] token name=csrf_test_name hash=eedfe9765965c5133edca14885fa61b4
DEBUG - 2026-03-06 23:50:19 --> [REQ_ID=0db9a7440661] [INIT] App\Controllers\Home::GET
INFO - 2026-03-06 23:50:19 --> [REQ_ID=0db9a7440661] [MEMORY][controller-start] 6291456
INFO - 2026-03-06 23:50:19 --> [REQ_ID=0db9a7440661] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-06 23:50:19 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-06 23:50:20 --> [MetaService] slug=privacy-policy pageName= cacheHit= path=DB
DEBUG - 2026-03-06 23:50:20 --> [REQ_ID=0db9a7440661] [VIEW_RENDER] themes/public/privacyPolicy
INFO - 2026-03-06 23:50:20 --> [REQ_ID=0db9a7440661] [MEMORY][commonData:start] 10485760
INFO - 2026-03-06 23:50:20 --> themesMemory usage: 10485760
DEBUG - 2026-03-06 23:50:20 --> [MetaService] slug=privacy-policy pageName=Privacy Policy cacheHit= path=DB
DEBUG - 2026-03-06 23:50:20 --> [REQ_ID=33c2739b8929] [FILTER_AFTER]
DEBUG - 2026-03-06 23:50:20 --> [REQ_ID=33c2739b8929] [LIFECYCLE][END] status=200 duration_ms=964.87 memory_delta=4194304
INFO - 2026-03-06 23:50:20 --> [REQ_ID=0db9a7440661] [PERF] Execution time=0.962431
DEBUG - 2026-03-06 23:50:20 --> [REQ_ID=33c2739b8929] [REQUEST][END]
INFO - 2026-03-06 23:50:20 --> [REQ_ID=33c2739b8929] [PERF] Execution time=1.003995
DEBUG - 2026-03-06 23:51:19 --> [REQ_ID=f32bee91d832] [REQUEST][START] HEAD /
DEBUG - 2026-03-06 23:51:19 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-06 23:51:19 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-06 23:51:19 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-06 23:51:19 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-06 23:51:19 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-06 23:56:19 --> [REQ_ID=d25f65c14a26] [REQUEST][START] HEAD /
DEBUG - 2026-03-06 23:56:19 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-06 23:56:19 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-06 23:56:19 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-06 23:56:19 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-06 23:56:19 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-06 23:57:57 --> [REQ_ID=c268e5540195] [REQUEST][START] GET /index.php/Knowledgebase
DEBUG - 2026-03-06 23:57:57 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-06 23:57:57 --> [REQ_ID=c268e5540195] [FILTER_BEFORE] /index.php/Knowledgebase
DEBUG - 2026-03-06 23:57:57 --> [REQ_ID=c268e5540195] [ROUTE] Controller=\App\Modules\User\Controllers\KnowledgebaseController Method=index
DEBUG - 2026-03-06 23:57:57 --> [REQ_ID=c268e5540195] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Knowledgebase
DEBUG - 2026-03-06 23:57:57 --> [CSRF] token name=csrf_test_name hash=b82517c40d8f7b956fbdb7e191d79ded
DEBUG - 2026-03-06 23:57:57 --> [REQ_ID=c268e5540195] [REQUEST][END]
INFO - 2026-03-06 23:57:57 --> [REQ_ID=c268e5540195] [PERF] Execution time=0.054704
DEBUG - 2026-03-06 23:57:57 --> [REQ_ID=5ea62d4a71be] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-06 23:57:57 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-06 23:57:57 --> [REQ_ID=5ea62d4a71be] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-06 23:57:57 --> [REQ_ID=5ea62d4a71be] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-06 23:57:57 --> [REQ_ID=5ea62d4a71be] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-06 23:57:57 --> [CSRF] token name=csrf_test_name hash=7bed16cfd120f1d42715451cc9d4de07
DEBUG - 2026-03-06 23:57:57 --> [REQ_ID=56daf68f04c5] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-06 23:57:57 --> [REQ_ID=56daf68f04c5] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-06 23:57:57 --> [REQ_ID=5ea62d4a71be] [FILTER_AFTER]
DEBUG - 2026-03-06 23:57:57 --> [REQ_ID=5ea62d4a71be] [LIFECYCLE][END] status=200 duration_ms=137.20 memory_delta=0
INFO - 2026-03-06 23:57:57 --> [REQ_ID=56daf68f04c5] [PERF] Execution time=0.137128
DEBUG - 2026-03-06 23:57:57 --> [REQ_ID=5ea62d4a71be] [REQUEST][END]
INFO - 2026-03-06 23:57:57 --> [REQ_ID=5ea62d4a71be] [PERF] Execution time=0.149066
