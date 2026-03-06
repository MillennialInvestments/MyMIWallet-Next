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
