<?php defined('SYSTEMPATH') || exit('No direct script access allowed'); ?>

DEBUG - 2026-03-30 00:00:01 --> [REQ_ID=cab5a8a1c0c8] [REQUEST][START] GET /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-30 00:00:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-30 00:00:02 --> [REQ_ID=cab5a8a1c0c8] [FILTER_BEFORE] /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-30 00:00:02 --> [REQ_ID=cab5a8a1c0c8] [ROUTE] Controller=\App\Modules\Management\Controllers\ManagementAPIController Method=Run_CRON_Tasks
DEBUG - 2026-03-30 00:00:02 --> [REQ_ID=cab5a8a1c0c8] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-30 00:00:02 --> [REQ_ID=cab5a8a1c0c8] [REQUEST][END]
INFO - 2026-03-30 00:00:02 --> [REQ_ID=cab5a8a1c0c8] [PERF] Execution time=0.046408
DEBUG - 2026-03-30 00:01:22 --> [REQ_ID=fd04e109cc36] [REQUEST][START] HEAD /
DEBUG - 2026-03-30 00:01:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-30 00:01:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-30 00:01:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-30 00:01:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-30 00:01:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-30 00:06:22 --> [REQ_ID=cc5c7d9fbb8b] [REQUEST][START] HEAD /
DEBUG - 2026-03-30 00:06:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-30 00:06:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-30 00:06:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-30 00:06:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-30 00:06:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-30 00:11:22 --> [REQ_ID=0806aadccee8] [REQUEST][START] HEAD /
DEBUG - 2026-03-30 00:11:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-30 00:11:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-30 00:11:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-30 00:11:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-30 00:11:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-30 00:15:01 --> [REQ_ID=cb06f785d6f2] [REQUEST][START] GET /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-30 00:15:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-30 00:15:01 --> [REQ_ID=cb06f785d6f2] [FILTER_BEFORE] /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-30 00:15:01 --> [REQ_ID=cb06f785d6f2] [ROUTE] Controller=\App\Modules\APIs\Controllers\AlertsAPIController Method=fetchEmailAlerts
DEBUG - 2026-03-30 00:15:01 --> [REQ_ID=cb06f785d6f2] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-30 00:15:01 --> [REQ_ID=cb06f785d6f2] [REQUEST][END]
INFO - 2026-03-30 00:15:01 --> [REQ_ID=cb06f785d6f2] [PERF] Execution time=0.046249
DEBUG - 2026-03-30 00:16:22 --> [REQ_ID=d439ba6bb580] [REQUEST][START] HEAD /
DEBUG - 2026-03-30 00:16:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-30 00:16:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-30 00:16:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-30 00:16:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-30 00:16:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-30 00:21:22 --> [REQ_ID=3a0ca4661769] [REQUEST][START] HEAD /
DEBUG - 2026-03-30 00:21:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-30 00:21:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-30 00:21:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-30 00:21:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-30 00:21:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-30 00:22:58 --> [REQ_ID=0217df19b98a] [REQUEST][START] GET /index.php/Projects
DEBUG - 2026-03-30 00:22:58 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-30 00:22:58 --> [REQ_ID=0217df19b98a] [REQUEST][END]
INFO - 2026-03-30 00:22:58 --> [REQ_ID=0217df19b98a] [PERF] Execution time=0.040635
DEBUG - 2026-03-30 00:23:56 --> [REQ_ID=53e84707bf9e] [REQUEST][START] GET /index.php/Budget
DEBUG - 2026-03-30 00:23:56 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-30 00:23:56 --> [REQ_ID=53e84707bf9e] [FILTER_BEFORE] /index.php/Budget
DEBUG - 2026-03-30 00:23:56 --> [REQ_ID=53e84707bf9e] [ROUTE] Controller=\App\Modules\User\Controllers\BudgetController Method=index
DEBUG - 2026-03-30 00:23:56 --> [REQ_ID=53e84707bf9e] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Budget
DEBUG - 2026-03-30 00:23:56 --> [CSRF] token name=csrf_test_name hash=1c8d02d28bcbcf1342303b7600286c4c
DEBUG - 2026-03-30 00:23:56 --> [REQ_ID=53e84707bf9e] [REQUEST][END]
INFO - 2026-03-30 00:23:56 --> [REQ_ID=53e84707bf9e] [PERF] Execution time=0.024656
DEBUG - 2026-03-30 00:23:56 --> [REQ_ID=9740ed9b151f] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-30 00:23:56 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-30 00:23:56 --> [REQ_ID=9740ed9b151f] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-30 00:23:56 --> [REQ_ID=9740ed9b151f] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-30 00:23:56 --> [REQ_ID=9740ed9b151f] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-30 00:23:56 --> [CSRF] token name=csrf_test_name hash=42af4bf6a01277141403d4b09a6324df
DEBUG - 2026-03-30 00:23:56 --> [REQ_ID=b589526a43b0] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-30 00:23:56 --> [REQ_ID=b589526a43b0] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-30 00:23:56 --> [REQ_ID=9740ed9b151f] [FILTER_AFTER]
DEBUG - 2026-03-30 00:23:56 --> [REQ_ID=9740ed9b151f] [LIFECYCLE][END] status=200 duration_ms=54.37 memory_delta=0
INFO - 2026-03-30 00:23:56 --> [REQ_ID=b589526a43b0] [PERF] Execution time=0.054144
DEBUG - 2026-03-30 00:23:56 --> [REQ_ID=9740ed9b151f] [REQUEST][END]
INFO - 2026-03-30 00:23:56 --> [REQ_ID=9740ed9b151f] [PERF] Execution time=0.067525
DEBUG - 2026-03-30 00:26:22 --> [REQ_ID=639f5581fe0d] [REQUEST][START] HEAD /
DEBUG - 2026-03-30 00:26:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-30 00:26:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-30 00:26:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-30 00:26:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-30 00:26:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-30 00:30:24 --> [REQ_ID=4db028a2e7dc] [REQUEST][START] GET /index.php/How-It-Works/earnings
DEBUG - 2026-03-30 00:30:24 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-30 00:30:24 --> [REQ_ID=4db028a2e7dc] [REQUEST][END]
INFO - 2026-03-30 00:30:24 --> [REQ_ID=4db028a2e7dc] [PERF] Execution time=0.042914
DEBUG - 2026-03-30 00:31:22 --> [REQ_ID=d8ae15c48df2] [REQUEST][START] HEAD /
DEBUG - 2026-03-30 00:31:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-30 00:31:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-30 00:31:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-30 00:31:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-30 00:31:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-30 00:35:43 --> [REQ_ID=36981972fefc] [REQUEST][START] GET /index.php/How-It-Works/Automated-Financial-Insights
DEBUG - 2026-03-30 00:35:43 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-30 00:35:44 --> [REQ_ID=36981972fefc] [FILTER_BEFORE] /index.php/How-It-Works/Automated-Financial-Insights
DEBUG - 2026-03-30 00:35:44 --> [REQ_ID=36981972fefc] [ROUTE] Controller=\App\Modules\Blog\Controllers\HowItWorksController Method=show
DEBUG - 2026-03-30 00:35:44 --> [REQ_ID=36981972fefc] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/How-It-Works/Automated-Financial-Insights
DEBUG - 2026-03-30 00:35:44 --> [CSRF] token name=csrf_test_name hash=50588b066720223e76dcf16de3bbb05c
DEBUG - 2026-03-30 00:35:44 --> [REQ_ID=a2abd30214fc] [INIT] App\Modules\Blog\Controllers\HowItWorksController::GET
INFO - 2026-03-30 00:35:44 --> [REQ_ID=a2abd30214fc] [MEMORY][controller-start] 6291456
DEBUG - 2026-03-30 00:35:44 --> [REQ_ID=a2abd30214fc] [METHOD_ENTRY] show
DEBUG - 2026-03-30 00:35:44 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-30 00:35:44 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-30 00:35:44 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-30 00:35:44 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-30 00:35:44 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-30 00:35:44 --> MyMICoin: guest context detected; skipping user-specific preload.
ERROR - 2026-03-30 00:35:44 --> HowItWorksController failure: automated-financial-insights
CRITICAL - 2026-03-30 00:35:44 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: GET, Route: How-It-Works/Automated-Financial-Insights]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-30 00:35:44 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-30 00:35:44 --> [404] URI=https://www.mymiwallet.com/index.php/How-It-Works/Automated-Financial-Insights
WARNING - 2026-03-30 00:35:44 --> 404 route miss: https://www.mymiwallet.com/index.php/How-It-Works/Automated-Financial-Insights | referrer: none
INFO - 2026-03-30 00:35:44 --> [REQ_ID=a2abd30214fc] [PERF] Execution time=0.264007
DEBUG - 2026-03-30 00:36:22 --> [REQ_ID=a52369c5de79] [REQUEST][START] HEAD /
DEBUG - 2026-03-30 00:36:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-30 00:36:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-30 00:36:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-30 00:36:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-30 00:36:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-30 00:41:22 --> [REQ_ID=bcf8a847e615] [REQUEST][START] HEAD /
DEBUG - 2026-03-30 00:41:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-30 00:41:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-30 00:41:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-30 00:41:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-30 00:41:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-30 00:46:22 --> [REQ_ID=8a6a2fa8bc6a] [REQUEST][START] HEAD /
DEBUG - 2026-03-30 00:46:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-30 00:46:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-30 00:46:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-30 00:46:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-30 00:46:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-30 00:51:22 --> [REQ_ID=ab8f1a740ec7] [REQUEST][START] HEAD /
DEBUG - 2026-03-30 00:51:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-30 00:51:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-30 00:51:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-30 00:51:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-30 00:51:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-30 00:56:22 --> [REQ_ID=d4392f6ab779] [REQUEST][START] HEAD /
DEBUG - 2026-03-30 00:56:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-30 00:56:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-30 00:56:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-30 00:56:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-30 00:56:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-30 01:00:02 --> [REQ_ID=c267126fda5a] [REQUEST][START] GET /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-30 01:00:02 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-30 01:00:02 --> [REQ_ID=c267126fda5a] [FILTER_BEFORE] /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-30 01:00:02 --> [REQ_ID=c267126fda5a] [ROUTE] Controller=\App\Modules\Management\Controllers\ManagementAPIController Method=Run_CRON_Tasks
DEBUG - 2026-03-30 01:00:02 --> [REQ_ID=c267126fda5a] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-30 01:00:02 --> [REQ_ID=c267126fda5a] [REQUEST][END]
INFO - 2026-03-30 01:00:02 --> [REQ_ID=c267126fda5a] [PERF] Execution time=0.035157
DEBUG - 2026-03-30 01:01:22 --> [REQ_ID=9484e6302dfa] [REQUEST][START] HEAD /
DEBUG - 2026-03-30 01:01:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-30 01:01:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-30 01:01:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-30 01:01:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-30 01:01:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-30 01:06:22 --> [REQ_ID=e07178ce689e] [REQUEST][START] HEAD /
DEBUG - 2026-03-30 01:06:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-30 01:06:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-30 01:06:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-30 01:06:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-30 01:06:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-30 01:11:22 --> [REQ_ID=43fd9af7bf93] [REQUEST][START] HEAD /
DEBUG - 2026-03-30 01:11:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-30 01:11:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-30 01:11:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-30 01:11:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-30 01:11:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-30 01:11:41 --> [REQ_ID=71123df337bd] [REQUEST][START] GET /
DEBUG - 2026-03-30 01:11:41 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-30 01:11:41 --> [REQ_ID=71123df337bd] [REQUEST][END]
INFO - 2026-03-30 01:11:41 --> [REQ_ID=71123df337bd] [PERF] Execution time=0.017568
DEBUG - 2026-03-30 01:14:56 --> [REQ_ID=3729f88dad1c] [REQUEST][START] GET /index.php/How-It-Works/MyMI-Exchange
DEBUG - 2026-03-30 01:14:56 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-30 01:14:56 --> [REQ_ID=3729f88dad1c] [FILTER_BEFORE] /index.php/How-It-Works/MyMI-Exchange
DEBUG - 2026-03-30 01:14:56 --> [REQ_ID=3729f88dad1c] [ROUTE] Controller=\App\Modules\Blog\Controllers\HowItWorksController Method=show
DEBUG - 2026-03-30 01:14:56 --> [REQ_ID=3729f88dad1c] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/How-It-Works/MyMI-Exchange
DEBUG - 2026-03-30 01:14:56 --> [CSRF] token name=csrf_test_name hash=7b6e517ff1cc2226acd97e7a84aacb78
DEBUG - 2026-03-30 01:14:56 --> [REQ_ID=df43b2d1ead8] [INIT] App\Modules\Blog\Controllers\HowItWorksController::GET
INFO - 2026-03-30 01:14:56 --> [REQ_ID=df43b2d1ead8] [MEMORY][controller-start] 6291456
DEBUG - 2026-03-30 01:14:57 --> [REQ_ID=df43b2d1ead8] [METHOD_ENTRY] show
DEBUG - 2026-03-30 01:14:57 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-30 01:14:57 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-30 01:14:57 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-30 01:14:57 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-30 01:14:57 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-30 01:14:57 --> MyMICoin: guest context detected; skipping user-specific preload.
INFO - 2026-03-30 01:14:57 --> [REQ_ID=df43b2d1ead8] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-30 01:14:57 --> [REQ_ID=3729f88dad1c] [FILTER_AFTER]
DEBUG - 2026-03-30 01:14:57 --> [REQ_ID=3729f88dad1c] [LIFECYCLE][END] status=200 duration_ms=787.53 memory_delta=4194304
INFO - 2026-03-30 01:14:57 --> [REQ_ID=df43b2d1ead8] [PERF] Execution time=0.785935
DEBUG - 2026-03-30 01:14:57 --> [REQ_ID=3729f88dad1c] [REQUEST][END]
INFO - 2026-03-30 01:14:57 --> [REQ_ID=3729f88dad1c] [PERF] Execution time=0.830340
DEBUG - 2026-03-30 01:15:01 --> [REQ_ID=24f7d3e08cf6] [REQUEST][START] GET /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-30 01:15:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-30 01:15:01 --> [REQ_ID=24f7d3e08cf6] [FILTER_BEFORE] /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-30 01:15:01 --> [REQ_ID=24f7d3e08cf6] [ROUTE] Controller=\App\Modules\APIs\Controllers\AlertsAPIController Method=fetchEmailAlerts
DEBUG - 2026-03-30 01:15:01 --> [REQ_ID=24f7d3e08cf6] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-30 01:15:01 --> [REQ_ID=24f7d3e08cf6] [REQUEST][END]
INFO - 2026-03-30 01:15:01 --> [REQ_ID=24f7d3e08cf6] [PERF] Execution time=0.015681
DEBUG - 2026-03-30 01:16:22 --> [REQ_ID=8436cdb61e8b] [REQUEST][START] HEAD /
DEBUG - 2026-03-30 01:16:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-30 01:16:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-30 01:16:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-30 01:16:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-30 01:16:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-30 01:21:02 --> [REQ_ID=94813705774b] [REQUEST][START] GET /index.php/Management/Exchange
DEBUG - 2026-03-30 01:21:02 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-30 01:21:02 --> [REQ_ID=94813705774b] [FILTER_BEFORE] /index.php/Management/Exchange
DEBUG - 2026-03-30 01:21:02 --> [REQ_ID=94813705774b] [ROUTE] Controller=\App\Modules\Management\Controllers\ExchangeAdminController Method=index
DEBUG - 2026-03-30 01:21:02 --> [REQ_ID=94813705774b] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Management/Exchange
DEBUG - 2026-03-30 01:21:02 --> [CSRF] token name=csrf_test_name hash=38dd60ea00ae9e0d06ef2d353dd63bbd
DEBUG - 2026-03-30 01:21:02 --> [REQ_ID=94813705774b] [REQUEST][END]
INFO - 2026-03-30 01:21:02 --> [REQ_ID=94813705774b] [PERF] Execution time=0.053498
DEBUG - 2026-03-30 01:21:03 --> [REQ_ID=4ae4dbedc0ec] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-30 01:21:03 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-30 01:21:03 --> [REQ_ID=4ae4dbedc0ec] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-30 01:21:03 --> [REQ_ID=4ae4dbedc0ec] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-30 01:21:03 --> [REQ_ID=4ae4dbedc0ec] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-30 01:21:03 --> [CSRF] token name=csrf_test_name hash=b35ac3a0fd24384e7a5bcf8bc165f230
DEBUG - 2026-03-30 01:21:03 --> [REQ_ID=9fdda26d4c94] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-30 01:21:03 --> [REQ_ID=9fdda26d4c94] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-30 01:21:03 --> [REQ_ID=4ae4dbedc0ec] [FILTER_AFTER]
DEBUG - 2026-03-30 01:21:03 --> [REQ_ID=4ae4dbedc0ec] [LIFECYCLE][END] status=200 duration_ms=180.91 memory_delta=0
INFO - 2026-03-30 01:21:03 --> [REQ_ID=9fdda26d4c94] [PERF] Execution time=0.180672
DEBUG - 2026-03-30 01:21:03 --> [REQ_ID=4ae4dbedc0ec] [REQUEST][END]
INFO - 2026-03-30 01:21:03 --> [REQ_ID=4ae4dbedc0ec] [PERF] Execution time=0.193308
DEBUG - 2026-03-30 01:21:22 --> [REQ_ID=262d65177e78] [REQUEST][START] HEAD /
DEBUG - 2026-03-30 01:21:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-30 01:21:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-30 01:21:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-30 01:21:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-30 01:21:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-30 01:26:22 --> [REQ_ID=bb39f9c39d38] [REQUEST][START] HEAD /
DEBUG - 2026-03-30 01:26:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-30 01:26:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-30 01:26:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-30 01:26:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-30 01:26:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-30 01:29:54 --> [REQ_ID=a7b0fbe940ff] [REQUEST][START] GET /index.php/How-It-Works/Daily-Financial-News
DEBUG - 2026-03-30 01:29:54 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-30 01:29:54 --> [REQ_ID=a7b0fbe940ff] [FILTER_BEFORE] /index.php/How-It-Works/Daily-Financial-News
DEBUG - 2026-03-30 01:29:54 --> [REQ_ID=a7b0fbe940ff] [ROUTE] Controller=\App\Modules\Blog\Controllers\HowItWorksController Method=DailyFinancialNews
DEBUG - 2026-03-30 01:29:54 --> [REQ_ID=a7b0fbe940ff] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/How-It-Works/Daily-Financial-News
DEBUG - 2026-03-30 01:29:54 --> [CSRF] token name=csrf_test_name hash=dad11423bac4813d18978a55691a5dc2
DEBUG - 2026-03-30 01:29:54 --> [REQ_ID=157e67572683] [INIT] App\Modules\Blog\Controllers\HowItWorksController::GET
INFO - 2026-03-30 01:29:54 --> [REQ_ID=157e67572683] [MEMORY][controller-start] 6291456
DEBUG - 2026-03-30 01:29:54 --> [REQ_ID=157e67572683] [METHOD_ENTRY] DailyFinancialNews
DEBUG - 2026-03-30 01:29:54 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-30 01:29:54 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-30 01:29:55 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-30 01:29:55 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-30 01:29:55 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-30 01:29:55 --> MyMICoin: guest context detected; skipping user-specific preload.
INFO - 2026-03-30 01:29:55 --> [REQ_ID=157e67572683] [MEMORY][commonData:start] 6291456
INFO - 2026-03-30 01:29:55 --> themesMemory usage: 10485760
DEBUG - 2026-03-30 01:29:55 --> [MetaService] slug=how-it-works/daily-financial-news pageName= cacheHit= path=DB
DEBUG - 2026-03-30 01:29:55 --> [REQ_ID=a7b0fbe940ff] [FILTER_AFTER]
DEBUG - 2026-03-30 01:29:55 --> [REQ_ID=a7b0fbe940ff] [LIFECYCLE][END] status=200 duration_ms=776.92 memory_delta=4194304
INFO - 2026-03-30 01:29:55 --> [REQ_ID=157e67572683] [PERF] Execution time=0.775148
DEBUG - 2026-03-30 01:29:55 --> [REQ_ID=a7b0fbe940ff] [REQUEST][END]
INFO - 2026-03-30 01:29:55 --> [REQ_ID=a7b0fbe940ff] [PERF] Execution time=0.819272
DEBUG - 2026-03-30 01:31:22 --> [REQ_ID=c172722ea3b4] [REQUEST][START] HEAD /
DEBUG - 2026-03-30 01:31:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-30 01:31:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-30 01:31:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-30 01:31:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-30 01:31:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-30 01:36:22 --> [REQ_ID=0abde15409af] [REQUEST][START] HEAD /
DEBUG - 2026-03-30 01:36:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-30 01:36:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-30 01:36:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-30 01:36:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-30 01:36:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-30 01:41:22 --> [REQ_ID=7ef7121f6c73] [REQUEST][START] HEAD /
DEBUG - 2026-03-30 01:41:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-30 01:41:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-30 01:41:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-30 01:41:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-30 01:41:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-30 01:44:11 --> [REQ_ID=5f48e640f824] [REQUEST][START] GET /
DEBUG - 2026-03-30 01:44:11 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-30 01:44:11 --> [REQ_ID=5f48e640f824] [REQUEST][END]
INFO - 2026-03-30 01:44:11 --> [REQ_ID=5f48e640f824] [PERF] Execution time=0.041114
DEBUG - 2026-03-30 01:45:09 --> [REQ_ID=e9badeda71d7] [REQUEST][START] GET /
DEBUG - 2026-03-30 01:45:09 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-30 01:45:09 --> [REQ_ID=e9badeda71d7] [REQUEST][END]
INFO - 2026-03-30 01:45:09 --> [REQ_ID=e9badeda71d7] [PERF] Execution time=0.009024
DEBUG - 2026-03-30 01:46:22 --> [REQ_ID=21068a0b9df6] [REQUEST][START] HEAD /
DEBUG - 2026-03-30 01:46:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-30 01:46:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-30 01:46:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-30 01:46:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-30 01:46:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-30 01:51:22 --> [REQ_ID=ea1999c1db05] [REQUEST][START] HEAD /
DEBUG - 2026-03-30 01:51:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-30 01:51:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-30 01:51:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-30 01:51:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-30 01:51:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-30 01:56:09 --> [REQ_ID=740364fbfced] [REQUEST][START] GET /index.php/My-Referrals
DEBUG - 2026-03-30 01:56:09 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-30 01:56:09 --> [REQ_ID=740364fbfced] [FILTER_BEFORE] /index.php/My-Referrals
DEBUG - 2026-03-30 01:56:09 --> [REQ_ID=740364fbfced] [ROUTE] Controller=\App\Modules\User\Controllers\ReferralController Method=index
DEBUG - 2026-03-30 01:56:09 --> [REQ_ID=740364fbfced] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/My-Referrals
DEBUG - 2026-03-30 01:56:09 --> [CSRF] token name=csrf_test_name hash=c4447acf7641d4bfa0b04a1808ce0e3d
DEBUG - 2026-03-30 01:56:09 --> [REQ_ID=740364fbfced] [REQUEST][END]
INFO - 2026-03-30 01:56:09 --> [REQ_ID=740364fbfced] [PERF] Execution time=0.057607
DEBUG - 2026-03-30 01:56:09 --> [REQ_ID=a78ad2035b79] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-30 01:56:09 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-30 01:56:09 --> [REQ_ID=a78ad2035b79] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-30 01:56:09 --> [REQ_ID=a78ad2035b79] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-30 01:56:09 --> [REQ_ID=a78ad2035b79] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-30 01:56:09 --> [CSRF] token name=csrf_test_name hash=079442667432df28e64bcac2214b251a
DEBUG - 2026-03-30 01:56:09 --> [REQ_ID=fdbea6aa62cd] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-30 01:56:09 --> [REQ_ID=fdbea6aa62cd] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-30 01:56:09 --> [REQ_ID=a78ad2035b79] [FILTER_AFTER]
DEBUG - 2026-03-30 01:56:09 --> [REQ_ID=a78ad2035b79] [LIFECYCLE][END] status=200 duration_ms=62.00 memory_delta=0
INFO - 2026-03-30 01:56:09 --> [REQ_ID=fdbea6aa62cd] [PERF] Execution time=0.061821
DEBUG - 2026-03-30 01:56:09 --> [REQ_ID=a78ad2035b79] [REQUEST][END]
INFO - 2026-03-30 01:56:09 --> [REQ_ID=a78ad2035b79] [PERF] Execution time=0.073282
DEBUG - 2026-03-30 01:56:22 --> [REQ_ID=e37843625dfd] [REQUEST][START] HEAD /
DEBUG - 2026-03-30 01:56:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-30 01:56:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-30 01:56:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-30 01:56:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-30 01:56:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-30 02:00:02 --> [REQ_ID=11a8d889eaf7] [REQUEST][START] GET /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-30 02:00:02 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-30 02:00:02 --> [REQ_ID=11a8d889eaf7] [FILTER_BEFORE] /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-30 02:00:02 --> [REQ_ID=11a8d889eaf7] [ROUTE] Controller=\App\Modules\Management\Controllers\ManagementAPIController Method=Run_CRON_Tasks
DEBUG - 2026-03-30 02:00:02 --> [REQ_ID=11a8d889eaf7] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-30 02:00:02 --> [REQ_ID=11a8d889eaf7] [REQUEST][END]
INFO - 2026-03-30 02:00:02 --> [REQ_ID=11a8d889eaf7] [PERF] Execution time=0.035765
DEBUG - 2026-03-30 02:01:22 --> [REQ_ID=53cc69c9a67e] [REQUEST][START] HEAD /
DEBUG - 2026-03-30 02:01:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-30 02:01:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-30 02:01:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-30 02:01:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-30 02:01:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-30 02:06:22 --> [REQ_ID=8bf3d38d3ccd] [REQUEST][START] HEAD /
DEBUG - 2026-03-30 02:06:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-30 02:06:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-30 02:06:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-30 02:06:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-30 02:06:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-30 02:11:22 --> [REQ_ID=1ccab1fc1396] [REQUEST][START] HEAD /
DEBUG - 2026-03-30 02:11:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-30 02:11:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-30 02:11:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-30 02:11:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-30 02:11:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-30 02:11:32 --> [REQ_ID=718fea2e1216] [REQUEST][START] GET /index.php/Management/Wallets
DEBUG - 2026-03-30 02:11:32 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-30 02:11:32 --> [REQ_ID=718fea2e1216] [FILTER_BEFORE] /index.php/Management/Wallets
DEBUG - 2026-03-30 02:11:32 --> [REQ_ID=718fea2e1216] [ROUTE] Controller=\App\Modules\Management\Controllers\WalletsController Method=index
DEBUG - 2026-03-30 02:11:32 --> [REQ_ID=718fea2e1216] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Management/Wallets
DEBUG - 2026-03-30 02:11:32 --> [CSRF] token name=csrf_test_name hash=71170f6508049d9cc1cc009ac5569f41
DEBUG - 2026-03-30 02:11:32 --> [REQ_ID=718fea2e1216] [REQUEST][END]
INFO - 2026-03-30 02:11:32 --> [REQ_ID=718fea2e1216] [PERF] Execution time=0.025817
DEBUG - 2026-03-30 02:11:32 --> [REQ_ID=592746fc8f45] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-30 02:11:32 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-30 02:11:32 --> [REQ_ID=592746fc8f45] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-30 02:11:32 --> [REQ_ID=592746fc8f45] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-30 02:11:32 --> [REQ_ID=592746fc8f45] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-30 02:11:32 --> [CSRF] token name=csrf_test_name hash=9afa1e7c65db06ae4142120f15aca264
DEBUG - 2026-03-30 02:11:32 --> [REQ_ID=0312a6d12e2a] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-30 02:11:32 --> [REQ_ID=0312a6d12e2a] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-30 02:11:32 --> [REQ_ID=592746fc8f45] [FILTER_AFTER]
DEBUG - 2026-03-30 02:11:32 --> [REQ_ID=592746fc8f45] [LIFECYCLE][END] status=200 duration_ms=121.69 memory_delta=0
INFO - 2026-03-30 02:11:32 --> [REQ_ID=0312a6d12e2a] [PERF] Execution time=0.121556
DEBUG - 2026-03-30 02:11:32 --> [REQ_ID=592746fc8f45] [REQUEST][END]
INFO - 2026-03-30 02:11:32 --> [REQ_ID=592746fc8f45] [PERF] Execution time=0.139313
DEBUG - 2026-03-30 02:15:01 --> [REQ_ID=8be04b75ca3a] [REQUEST][START] GET /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-30 02:15:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-30 02:15:01 --> [REQ_ID=8be04b75ca3a] [FILTER_BEFORE] /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-30 02:15:01 --> [REQ_ID=8be04b75ca3a] [ROUTE] Controller=\App\Modules\APIs\Controllers\AlertsAPIController Method=fetchEmailAlerts
DEBUG - 2026-03-30 02:15:01 --> [REQ_ID=8be04b75ca3a] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-30 02:15:01 --> [REQ_ID=8be04b75ca3a] [REQUEST][END]
INFO - 2026-03-30 02:15:01 --> [REQ_ID=8be04b75ca3a] [PERF] Execution time=0.045149
DEBUG - 2026-03-30 02:16:22 --> [REQ_ID=7fe4963b7842] [REQUEST][START] HEAD /
DEBUG - 2026-03-30 02:16:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-30 02:16:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-30 02:16:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-30 02:16:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-30 02:16:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-30 02:21:22 --> [REQ_ID=e432e924cece] [REQUEST][START] HEAD /
DEBUG - 2026-03-30 02:21:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-30 02:21:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-30 02:21:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-30 02:21:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-30 02:21:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-30 02:26:22 --> [REQ_ID=52a9cf483859] [REQUEST][START] HEAD /
DEBUG - 2026-03-30 02:26:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-30 02:26:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-30 02:26:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-30 02:26:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-30 02:26:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-30 02:31:22 --> [REQ_ID=d3319a657b92] [REQUEST][START] HEAD /
DEBUG - 2026-03-30 02:31:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-30 02:31:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-30 02:31:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-30 02:31:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-30 02:31:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-30 02:32:22 --> [REQ_ID=fd580cb39c57] [REQUEST][START] GET /
DEBUG - 2026-03-30 02:32:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-30 02:32:22 --> [REQ_ID=fd580cb39c57] [FILTER_BEFORE] /
DEBUG - 2026-03-30 02:32:22 --> [REQ_ID=fd580cb39c57] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-30 02:32:22 --> [REQ_ID=fd580cb39c57] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-30 02:32:22 --> [CSRF] token name=csrf_test_name hash=14049ed381baf72f7504e0ec770b85e1
DEBUG - 2026-03-30 02:32:22 --> [REQ_ID=b96f1fde9999] [INIT] App\Controllers\Home::GET
INFO - 2026-03-30 02:32:22 --> [REQ_ID=b96f1fde9999] [MEMORY][controller-start] 4194304
INFO - 2026-03-30 02:32:23 --> [REQ_ID=b96f1fde9999] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-30 02:32:23 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-30 02:32:23 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-03-30 02:32:23 --> [REQ_ID=b96f1fde9999] [VIEW_RENDER] themes/public/home
INFO - 2026-03-30 02:32:23 --> [REQ_ID=b96f1fde9999] [MEMORY][commonData:start] 8388608
INFO - 2026-03-30 02:32:23 --> themesMemory usage: 8388608
DEBUG - 2026-03-30 02:32:23 --> [MetaService] slug= pageName=Home cacheHit= path=DB
DEBUG - 2026-03-30 02:32:23 --> [REQ_ID=fd580cb39c57] [FILTER_AFTER]
DEBUG - 2026-03-30 02:32:23 --> [REQ_ID=fd580cb39c57] [LIFECYCLE][END] status=200 duration_ms=635.62 memory_delta=4194304
INFO - 2026-03-30 02:32:23 --> [REQ_ID=b96f1fde9999] [PERF] Execution time=0.633766
DEBUG - 2026-03-30 02:32:23 --> [REQ_ID=fd580cb39c57] [REQUEST][END]
INFO - 2026-03-30 02:32:23 --> [REQ_ID=fd580cb39c57] [PERF] Execution time=0.653797
DEBUG - 2026-03-30 02:36:22 --> [REQ_ID=de4f8bef50e6] [REQUEST][START] HEAD /
DEBUG - 2026-03-30 02:36:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-30 02:36:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-30 02:36:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-30 02:36:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-30 02:36:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-30 02:37:03 --> [REQ_ID=e995b4fbf16a] [REQUEST][START] GET /
DEBUG - 2026-03-30 02:37:03 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-30 02:37:03 --> [REQ_ID=e995b4fbf16a] [FILTER_BEFORE] /
DEBUG - 2026-03-30 02:37:03 --> [REQ_ID=e995b4fbf16a] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-30 02:37:03 --> [REQ_ID=e995b4fbf16a] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-30 02:37:03 --> [CSRF] token name=csrf_test_name hash=871aec15a8a173bf319a28240b5b4ac4
DEBUG - 2026-03-30 02:37:03 --> [REQ_ID=8c35113f1b98] [INIT] App\Controllers\Home::GET
INFO - 2026-03-30 02:37:03 --> [REQ_ID=8c35113f1b98] [MEMORY][controller-start] 4194304
INFO - 2026-03-30 02:37:03 --> [REQ_ID=8c35113f1b98] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-30 02:37:03 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-30 02:37:03 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
DEBUG - 2026-03-30 02:37:03 --> [REQ_ID=8c35113f1b98] [VIEW_RENDER] themes/public/home
INFO - 2026-03-30 02:37:03 --> [REQ_ID=8c35113f1b98] [MEMORY][commonData:start] 8388608
INFO - 2026-03-30 02:37:03 --> themesMemory usage: 8388608
DEBUG - 2026-03-30 02:37:03 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-30 02:37:03 --> [REQ_ID=e995b4fbf16a] [FILTER_AFTER]
DEBUG - 2026-03-30 02:37:03 --> [REQ_ID=e995b4fbf16a] [LIFECYCLE][END] status=200 duration_ms=576.06 memory_delta=4194304
INFO - 2026-03-30 02:37:03 --> [REQ_ID=8c35113f1b98] [PERF] Execution time=0.574240
DEBUG - 2026-03-30 02:37:03 --> [REQ_ID=e995b4fbf16a] [REQUEST][END]
INFO - 2026-03-30 02:37:03 --> [REQ_ID=e995b4fbf16a] [PERF] Execution time=0.595252
DEBUG - 2026-03-30 02:39:42 --> [REQ_ID=9ab9af9ec0a3] [REQUEST][START] GET /index.php/Management/Marketing/Video-Creator
DEBUG - 2026-03-30 02:39:42 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-30 02:39:42 --> [REQ_ID=9ab9af9ec0a3] [FILTER_BEFORE] /index.php/Management/Marketing/Video-Creator
DEBUG - 2026-03-30 02:39:42 --> [REQ_ID=9ab9af9ec0a3] [ROUTE] Controller=\App\Modules\Management\Controllers\MarketingAdminController Method=videoCreator
DEBUG - 2026-03-30 02:39:42 --> [REQ_ID=9ab9af9ec0a3] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Management/Marketing/Video-Creator
DEBUG - 2026-03-30 02:39:42 --> [CSRF] token name=csrf_test_name hash=6c5a9e62a7bb43fe9516a118e1522929
DEBUG - 2026-03-30 02:39:42 --> [REQ_ID=9ab9af9ec0a3] [REQUEST][END]
INFO - 2026-03-30 02:39:42 --> [REQ_ID=9ab9af9ec0a3] [PERF] Execution time=0.059186
DEBUG - 2026-03-30 02:39:42 --> [REQ_ID=1e0cd98f51e2] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-30 02:39:42 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-30 02:39:42 --> [REQ_ID=1e0cd98f51e2] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-30 02:39:42 --> [REQ_ID=1e0cd98f51e2] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-30 02:39:42 --> [REQ_ID=1e0cd98f51e2] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-30 02:39:42 --> [CSRF] token name=csrf_test_name hash=f08e6ac68ccb12198ea4a24d3f7c43fe
DEBUG - 2026-03-30 02:39:42 --> [REQ_ID=301014f32832] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-30 02:39:42 --> [REQ_ID=301014f32832] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-30 02:39:42 --> [REQ_ID=1e0cd98f51e2] [FILTER_AFTER]
DEBUG - 2026-03-30 02:39:42 --> [REQ_ID=1e0cd98f51e2] [LIFECYCLE][END] status=200 duration_ms=58.61 memory_delta=0
INFO - 2026-03-30 02:39:42 --> [REQ_ID=301014f32832] [PERF] Execution time=0.058390
DEBUG - 2026-03-30 02:39:42 --> [REQ_ID=1e0cd98f51e2] [REQUEST][END]
INFO - 2026-03-30 02:39:42 --> [REQ_ID=1e0cd98f51e2] [PERF] Execution time=0.070788
DEBUG - 2026-03-30 02:41:22 --> [REQ_ID=3a7f9706cc2e] [REQUEST][START] HEAD /
DEBUG - 2026-03-30 02:41:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-30 02:41:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-30 02:41:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-30 02:41:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-30 02:41:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-30 02:46:22 --> [REQ_ID=7ab1a32d47d0] [REQUEST][START] HEAD /
DEBUG - 2026-03-30 02:46:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-30 02:46:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-30 02:46:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-30 02:46:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-30 02:46:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-30 02:47:33 --> [REQ_ID=33cc34d65518] [REQUEST][START] GET /index.php/Management/Docs
DEBUG - 2026-03-30 02:47:33 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-30 02:47:33 --> [REQ_ID=33cc34d65518] [FILTER_BEFORE] /index.php/Management/Docs
DEBUG - 2026-03-30 02:47:33 --> [REQ_ID=33cc34d65518] [ROUTE] Controller=\App\Modules\Management\Controllers\DocsAdminController Method=index
DEBUG - 2026-03-30 02:47:33 --> [REQ_ID=33cc34d65518] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Management/Docs
DEBUG - 2026-03-30 02:47:33 --> [CSRF] token name=csrf_test_name hash=ab0174ebf86db932e60e176229a58443
DEBUG - 2026-03-30 02:47:33 --> [REQ_ID=33cc34d65518] [REQUEST][END]
INFO - 2026-03-30 02:47:33 --> [REQ_ID=33cc34d65518] [PERF] Execution time=0.056439
DEBUG - 2026-03-30 02:47:34 --> [REQ_ID=1aaaa74b4a46] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-30 02:47:34 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-30 02:47:34 --> [REQ_ID=1aaaa74b4a46] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-30 02:47:34 --> [REQ_ID=1aaaa74b4a46] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-30 02:47:34 --> [REQ_ID=1aaaa74b4a46] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-30 02:47:34 --> [CSRF] token name=csrf_test_name hash=17b39f2733ca6f10d78d3f91f5f84bec
DEBUG - 2026-03-30 02:47:34 --> [REQ_ID=4c2f54fea444] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-30 02:47:34 --> [REQ_ID=4c2f54fea444] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-30 02:47:34 --> [REQ_ID=1aaaa74b4a46] [FILTER_AFTER]
DEBUG - 2026-03-30 02:47:34 --> [REQ_ID=1aaaa74b4a46] [LIFECYCLE][END] status=200 duration_ms=45.10 memory_delta=0
INFO - 2026-03-30 02:47:34 --> [REQ_ID=4c2f54fea444] [PERF] Execution time=0.044936
DEBUG - 2026-03-30 02:47:34 --> [REQ_ID=1aaaa74b4a46] [REQUEST][END]
INFO - 2026-03-30 02:47:34 --> [REQ_ID=1aaaa74b4a46] [PERF] Execution time=0.056897
DEBUG - 2026-03-30 02:51:22 --> [REQ_ID=7f60a138b160] [REQUEST][START] HEAD /
DEBUG - 2026-03-30 02:51:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-30 02:51:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-30 02:51:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-30 02:51:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-30 02:51:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-30 02:56:22 --> [REQ_ID=2776694c4a8e] [REQUEST][START] HEAD /
DEBUG - 2026-03-30 02:56:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-30 02:56:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-30 02:56:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-30 02:56:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-30 02:56:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-30 03:00:02 --> [REQ_ID=f856d7e3ba48] [REQUEST][START] GET /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-30 03:00:02 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-30 03:00:02 --> [REQ_ID=f856d7e3ba48] [FILTER_BEFORE] /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-30 03:00:02 --> [REQ_ID=f856d7e3ba48] [ROUTE] Controller=\App\Modules\Management\Controllers\ManagementAPIController Method=Run_CRON_Tasks
DEBUG - 2026-03-30 03:00:02 --> [REQ_ID=f856d7e3ba48] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-30 03:00:02 --> [REQ_ID=f856d7e3ba48] [REQUEST][END]
INFO - 2026-03-30 03:00:02 --> [REQ_ID=f856d7e3ba48] [PERF] Execution time=0.036322
DEBUG - 2026-03-30 03:01:22 --> [REQ_ID=cde8df4d5b9a] [REQUEST][START] HEAD /
DEBUG - 2026-03-30 03:01:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-30 03:01:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-30 03:01:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-30 03:01:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-30 03:01:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-30 03:06:22 --> [REQ_ID=83c11176b3ad] [REQUEST][START] HEAD /
DEBUG - 2026-03-30 03:06:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-30 03:06:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-30 03:06:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-30 03:06:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-30 03:06:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-30 03:11:22 --> [REQ_ID=6631ec68c615] [REQUEST][START] HEAD /
DEBUG - 2026-03-30 03:11:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-30 03:11:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-30 03:11:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-30 03:11:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-30 03:11:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-30 03:14:33 --> [REQ_ID=ddf153334e68] [REQUEST][START] GET /
DEBUG - 2026-03-30 03:14:33 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-30 03:14:33 --> [REQ_ID=ddf153334e68] [FILTER_BEFORE] /
DEBUG - 2026-03-30 03:14:33 --> [REQ_ID=ddf153334e68] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-30 03:14:33 --> [REQ_ID=ddf153334e68] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-30 03:14:33 --> [CSRF] token name=csrf_test_name hash=fa6e144e49adacf5f9fcb664bf149ebf
DEBUG - 2026-03-30 03:14:33 --> [REQ_ID=4fc1ca3766dc] [INIT] App\Controllers\Home::GET
INFO - 2026-03-30 03:14:33 --> [REQ_ID=4fc1ca3766dc] [MEMORY][controller-start] 6291456
INFO - 2026-03-30 03:14:33 --> [REQ_ID=4fc1ca3766dc] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-30 03:14:33 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-30 03:14:34 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-03-30 03:14:34 --> [REQ_ID=4fc1ca3766dc] [VIEW_RENDER] themes/public/home
INFO - 2026-03-30 03:14:34 --> [REQ_ID=4fc1ca3766dc] [MEMORY][commonData:start] 10485760
INFO - 2026-03-30 03:14:34 --> themesMemory usage: 10485760
DEBUG - 2026-03-30 03:14:34 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-30 03:14:34 --> [REQ_ID=ddf153334e68] [FILTER_AFTER]
DEBUG - 2026-03-30 03:14:34 --> [REQ_ID=ddf153334e68] [LIFECYCLE][END] status=200 duration_ms=698.94 memory_delta=4194304
INFO - 2026-03-30 03:14:34 --> [REQ_ID=4fc1ca3766dc] [PERF] Execution time=0.697086
DEBUG - 2026-03-30 03:14:34 --> [REQ_ID=ddf153334e68] [REQUEST][END]
INFO - 2026-03-30 03:14:34 --> [REQ_ID=ddf153334e68] [PERF] Execution time=0.738059
DEBUG - 2026-03-30 03:14:43 --> [REQ_ID=0586bc084f12] [REQUEST][START] GET /
DEBUG - 2026-03-30 03:14:43 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-30 03:14:43 --> [REQ_ID=0586bc084f12] [FILTER_BEFORE] /
DEBUG - 2026-03-30 03:14:43 --> [REQ_ID=0586bc084f12] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-30 03:14:43 --> [REQ_ID=0586bc084f12] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-30 03:14:43 --> [CSRF] token name=csrf_test_name hash=fa6e144e49adacf5f9fcb664bf149ebf
DEBUG - 2026-03-30 03:14:43 --> [REQ_ID=44b27e4e9c0e] [INIT] App\Controllers\Home::GET
INFO - 2026-03-30 03:14:43 --> [REQ_ID=44b27e4e9c0e] [MEMORY][controller-start] 6291456
INFO - 2026-03-30 03:14:43 --> [REQ_ID=44b27e4e9c0e] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-30 03:14:43 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-30 03:14:44 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
DEBUG - 2026-03-30 03:14:44 --> [REQ_ID=44b27e4e9c0e] [VIEW_RENDER] themes/public/home
INFO - 2026-03-30 03:14:44 --> [REQ_ID=44b27e4e9c0e] [MEMORY][commonData:start] 8388608
INFO - 2026-03-30 03:14:44 --> themesMemory usage: 8388608
DEBUG - 2026-03-30 03:14:44 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-30 03:14:44 --> [REQ_ID=0586bc084f12] [FILTER_AFTER]
DEBUG - 2026-03-30 03:14:44 --> [REQ_ID=0586bc084f12] [LIFECYCLE][END] status=200 duration_ms=548.94 memory_delta=2097152
INFO - 2026-03-30 03:14:44 --> [REQ_ID=44b27e4e9c0e] [PERF] Execution time=0.548383
DEBUG - 2026-03-30 03:14:44 --> [REQ_ID=0586bc084f12] [REQUEST][END]
INFO - 2026-03-30 03:14:44 --> [REQ_ID=0586bc084f12] [PERF] Execution time=0.558774
DEBUG - 2026-03-30 03:14:52 --> [REQ_ID=1d1babe541bb] [REQUEST][START] GET /
DEBUG - 2026-03-30 03:14:52 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-30 03:14:52 --> [REQ_ID=1d1babe541bb] [FILTER_BEFORE] /
DEBUG - 2026-03-30 03:14:52 --> [REQ_ID=1d1babe541bb] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-30 03:14:52 --> [REQ_ID=1d1babe541bb] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-30 03:14:52 --> [CSRF] token name=csrf_test_name hash=fa6e144e49adacf5f9fcb664bf149ebf
DEBUG - 2026-03-30 03:14:52 --> [REQ_ID=3ca9470cb3fb] [INIT] App\Controllers\Home::GET
INFO - 2026-03-30 03:14:52 --> [REQ_ID=3ca9470cb3fb] [MEMORY][controller-start] 4194304
INFO - 2026-03-30 03:14:52 --> [REQ_ID=3ca9470cb3fb] [MEMORY][commonData:start] 4194304
DEBUG - 2026-03-30 03:14:52 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-30 03:14:52 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
DEBUG - 2026-03-30 03:14:52 --> [REQ_ID=3ca9470cb3fb] [VIEW_RENDER] themes/public/home
INFO - 2026-03-30 03:14:52 --> [REQ_ID=3ca9470cb3fb] [MEMORY][commonData:start] 8388608
INFO - 2026-03-30 03:14:52 --> themesMemory usage: 8388608
DEBUG - 2026-03-30 03:14:52 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-30 03:14:52 --> [REQ_ID=1d1babe541bb] [FILTER_AFTER]
DEBUG - 2026-03-30 03:14:52 --> [REQ_ID=1d1babe541bb] [LIFECYCLE][END] status=200 duration_ms=765.20 memory_delta=4194304
INFO - 2026-03-30 03:14:52 --> [REQ_ID=3ca9470cb3fb] [PERF] Execution time=0.764818
DEBUG - 2026-03-30 03:14:52 --> [REQ_ID=1d1babe541bb] [REQUEST][END]
INFO - 2026-03-30 03:14:52 --> [REQ_ID=1d1babe541bb] [PERF] Execution time=0.777813
DEBUG - 2026-03-30 03:15:01 --> [REQ_ID=e04127e1a9d1] [REQUEST][START] GET /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-30 03:15:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-30 03:15:01 --> [REQ_ID=e04127e1a9d1] [FILTER_BEFORE] /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-30 03:15:01 --> [REQ_ID=e04127e1a9d1] [ROUTE] Controller=\App\Modules\APIs\Controllers\AlertsAPIController Method=fetchEmailAlerts
DEBUG - 2026-03-30 03:15:01 --> [REQ_ID=e04127e1a9d1] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-30 03:15:01 --> [REQ_ID=e04127e1a9d1] [REQUEST][END]
INFO - 2026-03-30 03:15:01 --> [REQ_ID=e04127e1a9d1] [PERF] Execution time=0.021218
DEBUG - 2026-03-30 03:16:01 --> [REQ_ID=ca059ca94642] [REQUEST][START] GET /
DEBUG - 2026-03-30 03:16:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-30 03:16:01 --> [REQ_ID=ca059ca94642] [FILTER_BEFORE] /
DEBUG - 2026-03-30 03:16:01 --> [REQ_ID=ca059ca94642] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-30 03:16:01 --> [REQ_ID=ca059ca94642] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-30 03:16:01 --> [CSRF] token name=csrf_test_name hash=38322951a47431fba4f85b688803940b
DEBUG - 2026-03-30 03:16:01 --> [REQ_ID=3ea085c929c9] [INIT] App\Controllers\Home::GET
INFO - 2026-03-30 03:16:01 --> [REQ_ID=3ea085c929c9] [MEMORY][controller-start] 4194304
INFO - 2026-03-30 03:16:01 --> [REQ_ID=3ea085c929c9] [MEMORY][commonData:start] 4194304
DEBUG - 2026-03-30 03:16:01 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-30 03:16:01 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
DEBUG - 2026-03-30 03:16:01 --> [REQ_ID=3ea085c929c9] [VIEW_RENDER] themes/public/home
INFO - 2026-03-30 03:16:01 --> [REQ_ID=3ea085c929c9] [MEMORY][commonData:start] 8388608
INFO - 2026-03-30 03:16:01 --> themesMemory usage: 8388608
DEBUG - 2026-03-30 03:16:01 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-30 03:16:01 --> [REQ_ID=ca059ca94642] [FILTER_AFTER]
DEBUG - 2026-03-30 03:16:01 --> [REQ_ID=ca059ca94642] [LIFECYCLE][END] status=200 duration_ms=643.16 memory_delta=4194304
INFO - 2026-03-30 03:16:01 --> [REQ_ID=3ea085c929c9] [PERF] Execution time=0.642947
DEBUG - 2026-03-30 03:16:01 --> [REQ_ID=ca059ca94642] [REQUEST][END]
INFO - 2026-03-30 03:16:01 --> [REQ_ID=ca059ca94642] [PERF] Execution time=0.653824
DEBUG - 2026-03-30 03:16:02 --> [REQ_ID=836a364aa18a] [REQUEST][START] GET /index.php/How-It-Works/Investment-Dashboard
DEBUG - 2026-03-30 03:16:02 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-30 03:16:02 --> [REQ_ID=836a364aa18a] [FILTER_BEFORE] /index.php/How-It-Works/Investment-Dashboard
DEBUG - 2026-03-30 03:16:02 --> [REQ_ID=836a364aa18a] [ROUTE] Controller=\App\Modules\Blog\Controllers\HowItWorksController Method=show
DEBUG - 2026-03-30 03:16:02 --> [REQ_ID=836a364aa18a] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/How-It-Works/Investment-Dashboard
DEBUG - 2026-03-30 03:16:02 --> [CSRF] token name=csrf_test_name hash=38322951a47431fba4f85b688803940b
DEBUG - 2026-03-30 03:16:02 --> [REQ_ID=c6fccc4b3c31] [INIT] App\Modules\Blog\Controllers\HowItWorksController::GET
INFO - 2026-03-30 03:16:02 --> [REQ_ID=c6fccc4b3c31] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-30 03:16:02 --> [REQ_ID=c6fccc4b3c31] [METHOD_ENTRY] show
DEBUG - 2026-03-30 03:16:02 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-30 03:16:02 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-30 03:16:02 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-30 03:16:02 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-30 03:16:02 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-30 03:16:02 --> MyMICoin: guest context detected; skipping user-specific preload.
INFO - 2026-03-30 03:16:02 --> [REQ_ID=c6fccc4b3c31] [MEMORY][commonData:start] 4194304
DEBUG - 2026-03-30 03:16:03 --> [REQ_ID=836a364aa18a] [FILTER_AFTER]
DEBUG - 2026-03-30 03:16:03 --> [REQ_ID=836a364aa18a] [LIFECYCLE][END] status=200 duration_ms=580.00 memory_delta=4194304
INFO - 2026-03-30 03:16:03 --> [REQ_ID=c6fccc4b3c31] [PERF] Execution time=0.580025
DEBUG - 2026-03-30 03:16:03 --> [REQ_ID=836a364aa18a] [REQUEST][END]
INFO - 2026-03-30 03:16:03 --> [REQ_ID=836a364aa18a] [PERF] Execution time=0.592529
DEBUG - 2026-03-30 03:16:22 --> [REQ_ID=3bf2a766a24c] [REQUEST][START] HEAD /
DEBUG - 2026-03-30 03:16:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-30 03:16:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-30 03:16:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-30 03:16:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-30 03:16:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-30 03:21:22 --> [REQ_ID=6e100a51b77b] [REQUEST][START] HEAD /
DEBUG - 2026-03-30 03:21:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-30 03:21:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-30 03:21:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-30 03:21:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-30 03:21:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-30 03:22:14 --> [REQ_ID=772a72ed4f6f] [REQUEST][START] GET /
DEBUG - 2026-03-30 03:22:14 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-30 03:22:14 --> [REQ_ID=772a72ed4f6f] [FILTER_BEFORE] /
DEBUG - 2026-03-30 03:22:14 --> [REQ_ID=772a72ed4f6f] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-30 03:22:14 --> [REQ_ID=772a72ed4f6f] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-30 03:22:14 --> [CSRF] token name=csrf_test_name hash=030457d42af0f3191d77b537319218a2
DEBUG - 2026-03-30 03:22:14 --> [REQ_ID=41a0da801454] [INIT] App\Controllers\Home::GET
INFO - 2026-03-30 03:22:14 --> [REQ_ID=41a0da801454] [MEMORY][controller-start] 4194304
INFO - 2026-03-30 03:22:14 --> [REQ_ID=41a0da801454] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-30 03:22:14 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-30 03:22:14 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
DEBUG - 2026-03-30 03:22:14 --> [REQ_ID=41a0da801454] [VIEW_RENDER] themes/public/home
INFO - 2026-03-30 03:22:14 --> [REQ_ID=41a0da801454] [MEMORY][commonData:start] 8388608
INFO - 2026-03-30 03:22:14 --> themesMemory usage: 8388608
DEBUG - 2026-03-30 03:22:14 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-30 03:22:14 --> [REQ_ID=772a72ed4f6f] [FILTER_AFTER]
DEBUG - 2026-03-30 03:22:14 --> [REQ_ID=772a72ed4f6f] [LIFECYCLE][END] status=200 duration_ms=670.42 memory_delta=4194304
INFO - 2026-03-30 03:22:14 --> [REQ_ID=41a0da801454] [PERF] Execution time=0.667845
DEBUG - 2026-03-30 03:22:14 --> [REQ_ID=772a72ed4f6f] [REQUEST][END]
INFO - 2026-03-30 03:22:14 --> [REQ_ID=772a72ed4f6f] [PERF] Execution time=0.691876
DEBUG - 2026-03-30 03:26:22 --> [REQ_ID=b94bc016d8ad] [REQUEST][START] HEAD /
DEBUG - 2026-03-30 03:26:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-30 03:26:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-30 03:26:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-30 03:26:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-30 03:26:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-30 03:29:16 --> [REQ_ID=9f621a7e04e7] [REQUEST][START] GET /index.php/Investments/Reports
DEBUG - 2026-03-30 03:29:16 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
INFO - 2026-03-30 03:29:16 --> REDIRECTED ROUTE at https://www.mymiwallet.com/Investments/Trade-Tracker
DEBUG - 2026-03-30 03:29:16 --> [REQ_ID=9f621a7e04e7] [REQUEST][END]
INFO - 2026-03-30 03:29:16 --> [REQ_ID=9f621a7e04e7] [PERF] Execution time=0.037366
DEBUG - 2026-03-30 03:31:22 --> [REQ_ID=4b86e44bd7ad] [REQUEST][START] HEAD /
DEBUG - 2026-03-30 03:31:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-30 03:31:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-30 03:31:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-30 03:31:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-30 03:31:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-30 03:36:22 --> [REQ_ID=fe78fa399812] [REQUEST][START] HEAD /
DEBUG - 2026-03-30 03:36:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-30 03:36:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-30 03:36:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-30 03:36:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-30 03:36:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-30 03:41:11 --> [REQ_ID=047209d2c975] [REQUEST][START] GET /
DEBUG - 2026-03-30 03:41:11 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-30 03:41:11 --> [REQ_ID=047209d2c975] [FILTER_BEFORE] /
DEBUG - 2026-03-30 03:41:11 --> [REQ_ID=047209d2c975] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-30 03:41:11 --> [REQ_ID=047209d2c975] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-30 03:41:11 --> [CSRF] token name=csrf_test_name hash=be940c0dca436728fa39e726316a9d54
DEBUG - 2026-03-30 03:41:11 --> [REQ_ID=52c1b0063e42] [INIT] App\Controllers\Home::GET
INFO - 2026-03-30 03:41:11 --> [REQ_ID=52c1b0063e42] [MEMORY][controller-start] 6291456
INFO - 2026-03-30 03:41:11 --> [REQ_ID=52c1b0063e42] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-30 03:41:11 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-30 03:41:11 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-03-30 03:41:11 --> [REQ_ID=52c1b0063e42] [VIEW_RENDER] themes/public/home
INFO - 2026-03-30 03:41:11 --> [REQ_ID=52c1b0063e42] [MEMORY][commonData:start] 10485760
INFO - 2026-03-30 03:41:12 --> themesMemory usage: 10485760
DEBUG - 2026-03-30 03:41:12 --> [MetaService] slug= pageName=Home cacheHit= path=DB
DEBUG - 2026-03-30 03:41:12 --> [REQ_ID=047209d2c975] [FILTER_AFTER]
DEBUG - 2026-03-30 03:41:12 --> [REQ_ID=047209d2c975] [LIFECYCLE][END] status=200 duration_ms=617.48 memory_delta=4194304
INFO - 2026-03-30 03:41:12 --> [REQ_ID=52c1b0063e42] [PERF] Execution time=0.615791
DEBUG - 2026-03-30 03:41:12 --> [REQ_ID=047209d2c975] [REQUEST][END]
INFO - 2026-03-30 03:41:12 --> [REQ_ID=047209d2c975] [PERF] Execution time=0.656291
DEBUG - 2026-03-30 03:41:22 --> [REQ_ID=f7e736881484] [REQUEST][START] HEAD /
DEBUG - 2026-03-30 03:41:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-30 03:41:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-30 03:41:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-30 03:41:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-30 03:41:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-30 03:46:22 --> [REQ_ID=d610c8c67a87] [REQUEST][START] HEAD /
DEBUG - 2026-03-30 03:46:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-30 03:46:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-30 03:46:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-30 03:46:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-30 03:46:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-30 03:51:22 --> [REQ_ID=cd06a7d5bd23] [REQUEST][START] HEAD /
DEBUG - 2026-03-30 03:51:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-30 03:51:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-30 03:51:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-30 03:51:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-30 03:51:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-30 03:54:52 --> [REQ_ID=7b0c04021678] [REQUEST][START] GET /
DEBUG - 2026-03-30 03:54:52 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-30 03:54:52 --> [REQ_ID=7b0c04021678] [FILTER_BEFORE] /
DEBUG - 2026-03-30 03:54:52 --> [REQ_ID=7b0c04021678] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-30 03:54:52 --> [REQ_ID=7b0c04021678] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-30 03:54:52 --> [CSRF] token name=csrf_test_name hash=2867949f8c3a3d969ebd3787628d25d3
DEBUG - 2026-03-30 03:54:52 --> [REQ_ID=25546dc8ab5c] [INIT] App\Controllers\Home::GET
INFO - 2026-03-30 03:54:52 --> [REQ_ID=25546dc8ab5c] [MEMORY][controller-start] 6291456
INFO - 2026-03-30 03:54:52 --> [REQ_ID=25546dc8ab5c] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-30 03:54:52 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-30 03:54:53 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
DEBUG - 2026-03-30 03:54:53 --> [REQ_ID=25546dc8ab5c] [VIEW_RENDER] themes/public/home
INFO - 2026-03-30 03:54:53 --> [REQ_ID=25546dc8ab5c] [MEMORY][commonData:start] 10485760
INFO - 2026-03-30 03:54:53 --> themesMemory usage: 10485760
DEBUG - 2026-03-30 03:54:53 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-30 03:54:53 --> [REQ_ID=7b0c04021678] [FILTER_AFTER]
DEBUG - 2026-03-30 03:54:53 --> [REQ_ID=7b0c04021678] [LIFECYCLE][END] status=200 duration_ms=559.55 memory_delta=4194304
INFO - 2026-03-30 03:54:53 --> [REQ_ID=25546dc8ab5c] [PERF] Execution time=0.557592
DEBUG - 2026-03-30 03:54:53 --> [REQ_ID=7b0c04021678] [REQUEST][END]
INFO - 2026-03-30 03:54:53 --> [REQ_ID=7b0c04021678] [PERF] Execution time=0.598390
DEBUG - 2026-03-30 03:55:19 --> [REQ_ID=fc179ec3b57c] [REQUEST][START] GET /index.php/
DEBUG - 2026-03-30 03:55:19 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-30 03:55:19 --> [REQ_ID=fc179ec3b57c] [FILTER_BEFORE] /index.php/
DEBUG - 2026-03-30 03:55:19 --> [REQ_ID=fc179ec3b57c] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-30 03:55:19 --> [REQ_ID=fc179ec3b57c] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-30 03:55:19 --> [CSRF] token name=csrf_test_name hash=c64bf3b8d675daeeb4351053ec62a4c0
DEBUG - 2026-03-30 03:55:19 --> [REQ_ID=145be6c87d30] [INIT] App\Controllers\Home::GET
INFO - 2026-03-30 03:55:19 --> [REQ_ID=145be6c87d30] [MEMORY][controller-start] 6291456
INFO - 2026-03-30 03:55:19 --> [REQ_ID=145be6c87d30] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-30 03:55:19 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-30 03:55:20 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
DEBUG - 2026-03-30 03:55:20 --> [REQ_ID=145be6c87d30] [VIEW_RENDER] themes/public/home
INFO - 2026-03-30 03:55:20 --> [REQ_ID=145be6c87d30] [MEMORY][commonData:start] 8388608
INFO - 2026-03-30 03:55:20 --> themesMemory usage: 8388608
DEBUG - 2026-03-30 03:55:20 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-30 03:55:20 --> [REQ_ID=fc179ec3b57c] [FILTER_AFTER]
DEBUG - 2026-03-30 03:55:20 --> [REQ_ID=fc179ec3b57c] [LIFECYCLE][END] status=200 duration_ms=549.73 memory_delta=2097152
INFO - 2026-03-30 03:55:20 --> [REQ_ID=145be6c87d30] [PERF] Execution time=0.549403
DEBUG - 2026-03-30 03:55:20 --> [REQ_ID=fc179ec3b57c] [REQUEST][END]
INFO - 2026-03-30 03:55:20 --> [REQ_ID=fc179ec3b57c] [PERF] Execution time=0.559338
DEBUG - 2026-03-30 03:55:25 --> [REQ_ID=6938017a8d13] [REQUEST][START] GET /index.php
DEBUG - 2026-03-30 03:55:25 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-30 03:55:25 --> [REQ_ID=6938017a8d13] [FILTER_BEFORE] /index.php
DEBUG - 2026-03-30 03:55:25 --> [REQ_ID=6938017a8d13] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-30 03:55:25 --> [REQ_ID=6938017a8d13] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-30 03:55:25 --> [CSRF] token name=csrf_test_name hash=4cbd66dc113f205a3d29c53d7143283d
DEBUG - 2026-03-30 03:55:25 --> [REQ_ID=0c6c87697f17] [INIT] App\Controllers\Home::GET
INFO - 2026-03-30 03:55:25 --> [REQ_ID=0c6c87697f17] [MEMORY][controller-start] 6291456
INFO - 2026-03-30 03:55:25 --> [REQ_ID=0c6c87697f17] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-30 03:55:25 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-30 03:55:25 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
DEBUG - 2026-03-30 03:55:25 --> [REQ_ID=0c6c87697f17] [VIEW_RENDER] themes/public/home
INFO - 2026-03-30 03:55:25 --> [REQ_ID=0c6c87697f17] [MEMORY][commonData:start] 8388608
INFO - 2026-03-30 03:55:25 --> themesMemory usage: 8388608
DEBUG - 2026-03-30 03:55:25 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-30 03:55:25 --> [REQ_ID=6938017a8d13] [FILTER_AFTER]
DEBUG - 2026-03-30 03:55:25 --> [REQ_ID=6938017a8d13] [LIFECYCLE][END] status=200 duration_ms=542.15 memory_delta=2097152
INFO - 2026-03-30 03:55:25 --> [REQ_ID=0c6c87697f17] [PERF] Execution time=0.541778
DEBUG - 2026-03-30 03:55:25 --> [REQ_ID=6938017a8d13] [REQUEST][END]
INFO - 2026-03-30 03:55:25 --> [REQ_ID=6938017a8d13] [PERF] Execution time=0.552276
DEBUG - 2026-03-30 03:55:29 --> [REQ_ID=00a97f2aad50] [REQUEST][START] GET /index.php/How-It-Works
DEBUG - 2026-03-30 03:55:29 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-30 03:55:29 --> [REQ_ID=00a97f2aad50] [FILTER_BEFORE] /index.php/How-It-Works
DEBUG - 2026-03-30 03:55:29 --> [REQ_ID=00a97f2aad50] [ROUTE] Controller=\App\Modules\Blog\Controllers\HowItWorksController Method=index
DEBUG - 2026-03-30 03:55:29 --> [REQ_ID=00a97f2aad50] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/How-It-Works
DEBUG - 2026-03-30 03:55:29 --> [CSRF] token name=csrf_test_name hash=9561cae0364ce9abb42b721123336743
DEBUG - 2026-03-30 03:55:29 --> [REQ_ID=b77c95e16b50] [INIT] App\Modules\Blog\Controllers\HowItWorksController::GET
INFO - 2026-03-30 03:55:29 --> [REQ_ID=b77c95e16b50] [MEMORY][controller-start] 6291456
DEBUG - 2026-03-30 03:55:29 --> [REQ_ID=b77c95e16b50] [METHOD_ENTRY] index
DEBUG - 2026-03-30 03:55:29 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-30 03:55:29 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-30 03:55:29 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-30 03:55:29 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-30 03:55:29 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-30 03:55:29 --> MyMICoin: guest context detected; skipping user-specific preload.
ERROR - 2026-03-30 03:55:29 --> HowItWorksController failure: overview
CRITICAL - 2026-03-30 03:55:29 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: GET, Route: How-It-Works]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-30 03:55:29 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-30 03:55:29 --> [404] URI=https://www.mymiwallet.com/index.php/How-It-Works
WARNING - 2026-03-30 03:55:29 --> 404 route miss: https://www.mymiwallet.com/index.php/How-It-Works | referrer: none
INFO - 2026-03-30 03:55:29 --> [REQ_ID=b77c95e16b50] [PERF] Execution time=0.062534
DEBUG - 2026-03-30 03:55:33 --> [REQ_ID=990fde252922] [REQUEST][START] GET /index.php/How-It-Works
DEBUG - 2026-03-30 03:55:33 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-30 03:55:33 --> [REQ_ID=990fde252922] [FILTER_BEFORE] /index.php/How-It-Works
DEBUG - 2026-03-30 03:55:33 --> [REQ_ID=990fde252922] [ROUTE] Controller=\App\Modules\Blog\Controllers\HowItWorksController Method=index
DEBUG - 2026-03-30 03:55:33 --> [REQ_ID=990fde252922] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/How-It-Works
DEBUG - 2026-03-30 03:55:33 --> [CSRF] token name=csrf_test_name hash=63f864c49500b54f88c6722fe57cee22
DEBUG - 2026-03-30 03:55:33 --> [REQ_ID=444acb7b0bca] [INIT] App\Modules\Blog\Controllers\HowItWorksController::GET
INFO - 2026-03-30 03:55:33 --> [REQ_ID=444acb7b0bca] [MEMORY][controller-start] 6291456
DEBUG - 2026-03-30 03:55:33 --> [REQ_ID=444acb7b0bca] [METHOD_ENTRY] index
DEBUG - 2026-03-30 03:55:33 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-30 03:55:33 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-30 03:55:33 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-30 03:55:33 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-30 03:55:33 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-30 03:55:33 --> MyMICoin: guest context detected; skipping user-specific preload.
ERROR - 2026-03-30 03:55:33 --> HowItWorksController failure: overview
CRITICAL - 2026-03-30 03:55:33 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: GET, Route: How-It-Works]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-30 03:55:33 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-30 03:55:33 --> [404] URI=https://www.mymiwallet.com/index.php/How-It-Works
WARNING - 2026-03-30 03:55:33 --> 404 route miss: https://www.mymiwallet.com/index.php/How-It-Works | referrer: none
INFO - 2026-03-30 03:55:33 --> [REQ_ID=444acb7b0bca] [PERF] Execution time=0.027064
DEBUG - 2026-03-30 03:55:36 --> [REQ_ID=8dc49e48e6af] [REQUEST][START] GET /index.php/How-It-Works
DEBUG - 2026-03-30 03:55:36 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-30 03:55:36 --> [REQ_ID=8dc49e48e6af] [FILTER_BEFORE] /index.php/How-It-Works
DEBUG - 2026-03-30 03:55:36 --> [REQ_ID=8dc49e48e6af] [ROUTE] Controller=\App\Modules\Blog\Controllers\HowItWorksController Method=index
DEBUG - 2026-03-30 03:55:36 --> [REQ_ID=8dc49e48e6af] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/How-It-Works
DEBUG - 2026-03-30 03:55:36 --> [CSRF] token name=csrf_test_name hash=55bfbde7af34364694650ef0e0b10c3f
DEBUG - 2026-03-30 03:55:36 --> [REQ_ID=a591c38fff2c] [INIT] App\Modules\Blog\Controllers\HowItWorksController::GET
INFO - 2026-03-30 03:55:36 --> [REQ_ID=a591c38fff2c] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-30 03:55:36 --> [REQ_ID=a591c38fff2c] [METHOD_ENTRY] index
DEBUG - 2026-03-30 03:55:36 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-30 03:55:36 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-30 03:55:36 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-30 03:55:36 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-30 03:55:36 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-30 03:55:36 --> MyMICoin: guest context detected; skipping user-specific preload.
ERROR - 2026-03-30 03:55:36 --> HowItWorksController failure: overview
CRITICAL - 2026-03-30 03:55:36 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: GET, Route: How-It-Works]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-30 03:55:36 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-30 03:55:36 --> [404] URI=https://www.mymiwallet.com/index.php/How-It-Works
WARNING - 2026-03-30 03:55:36 --> 404 route miss: https://www.mymiwallet.com/index.php/How-It-Works | referrer: none
INFO - 2026-03-30 03:55:36 --> [REQ_ID=a591c38fff2c] [PERF] Execution time=0.025393
DEBUG - 2026-03-30 03:55:43 --> [REQ_ID=77b939756be7] [REQUEST][START] GET /index.php/Blog
DEBUG - 2026-03-30 03:55:43 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-30 03:55:43 --> [REQ_ID=77b939756be7] [FILTER_BEFORE] /index.php/Blog
DEBUG - 2026-03-30 03:55:43 --> [REQ_ID=77b939756be7] [ROUTE] Controller=\App\Modules\Blog\Controllers\BlogController Method=index
DEBUG - 2026-03-30 03:55:43 --> [REQ_ID=77b939756be7] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Blog
DEBUG - 2026-03-30 03:55:43 --> [CSRF] token name=csrf_test_name hash=01c55c78c560aa35299ec85bb9fda5b5
DEBUG - 2026-03-30 03:55:43 --> [REQ_ID=cd36fe52716a] [INIT] App\Modules\Blog\Controllers\BlogController::GET
INFO - 2026-03-30 03:55:43 --> [REQ_ID=cd36fe52716a] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-30 03:55:44 --> [REQ_ID=cd36fe52716a] [METHOD_ENTRY] index
DEBUG - 2026-03-30 03:55:44 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-30 03:55:44 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-30 03:55:44 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-30 03:55:44 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-30 03:55:44 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-30 03:55:44 --> MyMICoin: guest context detected; skipping user-specific preload.
INFO - 2026-03-30 03:55:44 --> [REQ_ID=cd36fe52716a] [MEMORY][commonData:start] 4194304
INFO - 2026-03-30 03:55:44 --> [REQ_ID=cd36fe52716a] [PERF] Execution time=0.280463
DEBUG - 2026-03-30 03:55:47 --> [REQ_ID=2124fa9fbca2] [REQUEST][START] GET /index.php/Blog
DEBUG - 2026-03-30 03:55:47 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-30 03:55:47 --> [REQ_ID=2124fa9fbca2] [FILTER_BEFORE] /index.php/Blog
DEBUG - 2026-03-30 03:55:47 --> [REQ_ID=2124fa9fbca2] [ROUTE] Controller=\App\Modules\Blog\Controllers\BlogController Method=index
DEBUG - 2026-03-30 03:55:47 --> [REQ_ID=2124fa9fbca2] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Blog
DEBUG - 2026-03-30 03:55:47 --> [CSRF] token name=csrf_test_name hash=5a80ce4628dcbb11ad521927a96c25c2
DEBUG - 2026-03-30 03:55:47 --> [REQ_ID=4ca6ce9a6736] [INIT] App\Modules\Blog\Controllers\BlogController::GET
INFO - 2026-03-30 03:55:47 --> [REQ_ID=4ca6ce9a6736] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-30 03:55:47 --> [REQ_ID=4ca6ce9a6736] [METHOD_ENTRY] index
DEBUG - 2026-03-30 03:55:47 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-30 03:55:47 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-30 03:55:47 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-30 03:55:47 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-30 03:55:47 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-30 03:55:47 --> MyMICoin: guest context detected; skipping user-specific preload.
INFO - 2026-03-30 03:55:47 --> [REQ_ID=4ca6ce9a6736] [MEMORY][commonData:start] 4194304
INFO - 2026-03-30 03:55:47 --> [REQ_ID=4ca6ce9a6736] [PERF] Execution time=0.015413
DEBUG - 2026-03-30 03:55:51 --> [REQ_ID=47308c36ba8b] [REQUEST][START] GET /index.php/Blog
DEBUG - 2026-03-30 03:55:51 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-30 03:55:51 --> [REQ_ID=47308c36ba8b] [FILTER_BEFORE] /index.php/Blog
DEBUG - 2026-03-30 03:55:51 --> [REQ_ID=47308c36ba8b] [ROUTE] Controller=\App\Modules\Blog\Controllers\BlogController Method=index
DEBUG - 2026-03-30 03:55:51 --> [REQ_ID=47308c36ba8b] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Blog
DEBUG - 2026-03-30 03:55:51 --> [CSRF] token name=csrf_test_name hash=465cc7c61956733a1e4eb6027db6efe3
DEBUG - 2026-03-30 03:55:51 --> [REQ_ID=d9e0262ee24a] [INIT] App\Modules\Blog\Controllers\BlogController::GET
INFO - 2026-03-30 03:55:51 --> [REQ_ID=d9e0262ee24a] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-30 03:55:51 --> [REQ_ID=d9e0262ee24a] [METHOD_ENTRY] index
DEBUG - 2026-03-30 03:55:51 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-30 03:55:51 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-30 03:55:51 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-30 03:55:51 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-30 03:55:51 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-30 03:55:51 --> MyMICoin: guest context detected; skipping user-specific preload.
INFO - 2026-03-30 03:55:51 --> [REQ_ID=d9e0262ee24a] [MEMORY][commonData:start] 4194304
INFO - 2026-03-30 03:55:51 --> [REQ_ID=d9e0262ee24a] [PERF] Execution time=0.014246
DEBUG - 2026-03-30 03:56:04 --> [REQ_ID=3c123670434e] [REQUEST][START] GET /index.php/Knowledgebase
DEBUG - 2026-03-30 03:56:04 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-30 03:56:04 --> ErrorException: Access level to App\Modules\User\Controllers\KnowledgebaseController::respondWithRendered() must be protected (as in class App\Controllers\BaseController) or weaker
[Method: GET, Route: Knowledgebase]
in APPPATH/Modules/User/Controllers/KnowledgebaseController.php on line 535.
 1 [internal function]: CodeIgniter\Debug\Exceptions->shutdownHandler()
CRITICAL - 2026-03-30 03:56:04 --> [EXCEPTION] Access level to App\Modules\User\Controllers\KnowledgebaseController::respondWithRendered() must be protected (as in class App\Controllers\BaseController) or weaker File=/home/mymiteam/mymiwallet/site/current/app/Modules/User/Controllers/KnowledgebaseController.php Line=535
DEBUG - 2026-03-30 03:56:07 --> [REQ_ID=e66b9ee34f8b] [REQUEST][START] GET /index.php/Knowledgebase
DEBUG - 2026-03-30 03:56:07 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-30 03:56:07 --> ErrorException: Access level to App\Modules\User\Controllers\KnowledgebaseController::respondWithRendered() must be protected (as in class App\Controllers\BaseController) or weaker
[Method: GET, Route: Knowledgebase]
in APPPATH/Modules/User/Controllers/KnowledgebaseController.php on line 535.
 1 [internal function]: CodeIgniter\Debug\Exceptions->shutdownHandler()
CRITICAL - 2026-03-30 03:56:07 --> [EXCEPTION] Access level to App\Modules\User\Controllers\KnowledgebaseController::respondWithRendered() must be protected (as in class App\Controllers\BaseController) or weaker File=/home/mymiteam/mymiwallet/site/current/app/Modules/User/Controllers/KnowledgebaseController.php Line=535
DEBUG - 2026-03-30 03:56:11 --> [REQ_ID=0059632314c2] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-30 03:56:11 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-30 03:56:11 --> [REQ_ID=0059632314c2] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-30 03:56:11 --> [REQ_ID=0059632314c2] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-30 03:56:11 --> [REQ_ID=0059632314c2] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-30 03:56:11 --> [CSRF] token name=csrf_test_name hash=906ca70aa23bc240dff0fc8a3f58a303
DEBUG - 2026-03-30 03:56:11 --> [REQ_ID=a98be6c9bd89] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-30 03:56:11 --> [REQ_ID=a98be6c9bd89] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-30 03:56:11 --> [REQ_ID=0059632314c2] [FILTER_AFTER]
DEBUG - 2026-03-30 03:56:11 --> [REQ_ID=0059632314c2] [LIFECYCLE][END] status=200 duration_ms=18.87 memory_delta=0
INFO - 2026-03-30 03:56:11 --> [REQ_ID=a98be6c9bd89] [PERF] Execution time=0.018376
DEBUG - 2026-03-30 03:56:11 --> [REQ_ID=0059632314c2] [REQUEST][END]
INFO - 2026-03-30 03:56:11 --> [REQ_ID=0059632314c2] [PERF] Execution time=0.031722
DEBUG - 2026-03-30 03:56:15 --> [REQ_ID=2bd96f73f1c3] [REQUEST][START] GET /index.php/Free/register
DEBUG - 2026-03-30 03:56:15 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-30 03:56:15 --> [REQ_ID=2bd96f73f1c3] [FILTER_BEFORE] /index.php/Free/register
DEBUG - 2026-03-30 03:56:15 --> [REQ_ID=2bd96f73f1c3] [ROUTE] Controller=\App\Controllers\AuthController Method=register
DEBUG - 2026-03-30 03:56:15 --> [REQ_ID=2bd96f73f1c3] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Free/register
DEBUG - 2026-03-30 03:56:15 --> [CSRF] token name=csrf_test_name hash=814f2efdccb045ae3952615c5ec1c61d
DEBUG - 2026-03-30 03:56:15 --> [REQ_ID=99c16d98431e] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-30 03:56:15 --> [REQ_ID=99c16d98431e] [MEMORY][controller-start] 4194304
INFO - 2026-03-30 03:56:15 --> [REGISTRATION] Form loaded
INFO - 2026-03-30 03:56:15 --> [REQ_ID=99c16d98431e] [PERF] Execution time=0.013809
DEBUG - 2026-03-30 03:56:19 --> [REQ_ID=ad31df115507] [REQUEST][START] GET /index.php/Free/register
DEBUG - 2026-03-30 03:56:19 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-30 03:56:19 --> [REQ_ID=ad31df115507] [FILTER_BEFORE] /index.php/Free/register
DEBUG - 2026-03-30 03:56:19 --> [REQ_ID=ad31df115507] [ROUTE] Controller=\App\Controllers\AuthController Method=register
DEBUG - 2026-03-30 03:56:19 --> [REQ_ID=ad31df115507] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Free/register
DEBUG - 2026-03-30 03:56:19 --> [CSRF] token name=csrf_test_name hash=7880c4a7e228d8361b5001d9a21ea262
DEBUG - 2026-03-30 03:56:19 --> [REQ_ID=bab5838eb20c] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-30 03:56:19 --> [REQ_ID=bab5838eb20c] [MEMORY][controller-start] 4194304
INFO - 2026-03-30 03:56:19 --> [REGISTRATION] Form loaded
INFO - 2026-03-30 03:56:19 --> [REQ_ID=bab5838eb20c] [PERF] Execution time=0.081650
DEBUG - 2026-03-30 03:56:22 --> [REQ_ID=793780e361e0] [REQUEST][START] GET /index.php/Free/register
DEBUG - 2026-03-30 03:56:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-30 03:56:22 --> [REQ_ID=793780e361e0] [FILTER_BEFORE] /index.php/Free/register
DEBUG - 2026-03-30 03:56:22 --> [REQ_ID=793780e361e0] [ROUTE] Controller=\App\Controllers\AuthController Method=register
DEBUG - 2026-03-30 03:56:22 --> [REQ_ID=793780e361e0] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Free/register
DEBUG - 2026-03-30 03:56:22 --> [CSRF] token name=csrf_test_name hash=6ea4e15b451f017132d62b932445276f
DEBUG - 2026-03-30 03:56:22 --> [REQ_ID=8588627521cc] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-30 03:56:22 --> [REQ_ID=8588627521cc] [MEMORY][controller-start] 4194304
INFO - 2026-03-30 03:56:22 --> [REGISTRATION] Form loaded
INFO - 2026-03-30 03:56:22 --> [REQ_ID=8588627521cc] [PERF] Execution time=0.014755
DEBUG - 2026-03-30 03:56:22 --> [REQ_ID=58df49488d99] [REQUEST][START] HEAD /
DEBUG - 2026-03-30 03:56:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-30 03:56:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-30 03:56:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-30 03:56:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-30 03:56:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-30 03:56:51 --> [REQ_ID=387c27b2bc90] [REQUEST][START] GET /index.php/Legal/Terms-And-Conditions
DEBUG - 2026-03-30 03:56:51 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-30 03:56:51 --> [REQ_ID=387c27b2bc90] [FILTER_BEFORE] /index.php/Legal/Terms-And-Conditions
DEBUG - 2026-03-30 03:56:51 --> [REQ_ID=387c27b2bc90] [ROUTE] Controller=\App\Controllers\Home Method=terms
DEBUG - 2026-03-30 03:56:51 --> [REQ_ID=387c27b2bc90] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Legal/Terms-And-Conditions
DEBUG - 2026-03-30 03:56:51 --> [CSRF] token name=csrf_test_name hash=27c28b56497edf30a3cdee7d26db0fc4
DEBUG - 2026-03-30 03:56:51 --> [REQ_ID=387c27b2bc90] [REQUEST][END]
INFO - 2026-03-30 03:56:51 --> [REQ_ID=387c27b2bc90] [PERF] Execution time=0.011267
DEBUG - 2026-03-30 03:56:52 --> [REQ_ID=13b28e79a67b] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-30 03:56:52 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-30 03:56:52 --> [REQ_ID=13b28e79a67b] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-30 03:56:52 --> [REQ_ID=13b28e79a67b] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-30 03:56:52 --> [REQ_ID=13b28e79a67b] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-30 03:56:52 --> [CSRF] token name=csrf_test_name hash=9f14e9b12451c8e5ef44c5687d327558
DEBUG - 2026-03-30 03:56:52 --> [REQ_ID=0639d0387c82] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-30 03:56:52 --> [REQ_ID=0639d0387c82] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-30 03:56:52 --> [REQ_ID=13b28e79a67b] [FILTER_AFTER]
DEBUG - 2026-03-30 03:56:52 --> [REQ_ID=13b28e79a67b] [LIFECYCLE][END] status=200 duration_ms=15.87 memory_delta=0
INFO - 2026-03-30 03:56:52 --> [REQ_ID=0639d0387c82] [PERF] Execution time=0.014377
DEBUG - 2026-03-30 03:56:52 --> [REQ_ID=13b28e79a67b] [REQUEST][END]
INFO - 2026-03-30 03:56:52 --> [REQ_ID=13b28e79a67b] [PERF] Execution time=0.024743
DEBUG - 2026-03-30 03:56:56 --> [REQ_ID=40fc0191f7aa] [REQUEST][START] GET /index.php/Legal/Privacy-Policy
DEBUG - 2026-03-30 03:56:56 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-30 03:56:56 --> [REQ_ID=40fc0191f7aa] [FILTER_BEFORE] /index.php/Legal/Privacy-Policy
DEBUG - 2026-03-30 03:56:56 --> [REQ_ID=40fc0191f7aa] [ROUTE] Controller=\App\Controllers\Home Method=privacyPolicy
DEBUG - 2026-03-30 03:56:56 --> [REQ_ID=40fc0191f7aa] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Legal/Privacy-Policy
DEBUG - 2026-03-30 03:56:56 --> [CSRF] token name=csrf_test_name hash=edcab65b6ce8be92326be5ae24fb30ee
DEBUG - 2026-03-30 03:56:56 --> [REQ_ID=40fc0191f7aa] [REQUEST][END]
INFO - 2026-03-30 03:56:56 --> [REQ_ID=40fc0191f7aa] [PERF] Execution time=0.009688
DEBUG - 2026-03-30 03:56:57 --> [REQ_ID=70195b44742c] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-30 03:56:57 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-30 03:56:57 --> [REQ_ID=70195b44742c] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-30 03:56:57 --> [REQ_ID=70195b44742c] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-30 03:56:57 --> [REQ_ID=70195b44742c] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-30 03:56:57 --> [CSRF] token name=csrf_test_name hash=b9f92f534337d8f8c704497975d7be62
DEBUG - 2026-03-30 03:56:57 --> [REQ_ID=73ec34649968] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-30 03:56:57 --> [REQ_ID=73ec34649968] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-30 03:56:57 --> [REQ_ID=70195b44742c] [FILTER_AFTER]
DEBUG - 2026-03-30 03:56:57 --> [REQ_ID=70195b44742c] [LIFECYCLE][END] status=200 duration_ms=34.12 memory_delta=0
INFO - 2026-03-30 03:56:57 --> [REQ_ID=73ec34649968] [PERF] Execution time=0.032736
DEBUG - 2026-03-30 03:56:57 --> [REQ_ID=70195b44742c] [REQUEST][END]
INFO - 2026-03-30 03:56:57 --> [REQ_ID=70195b44742c] [PERF] Execution time=0.043524
DEBUG - 2026-03-30 03:57:01 --> [REQ_ID=488c16d651f3] [REQUEST][START] GET /index.php/How-It-Works/Personal-Budgeting
DEBUG - 2026-03-30 03:57:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-30 03:57:01 --> [REQ_ID=488c16d651f3] [FILTER_BEFORE] /index.php/How-It-Works/Personal-Budgeting
DEBUG - 2026-03-30 03:57:01 --> [REQ_ID=488c16d651f3] [ROUTE] Controller=\App\Modules\Blog\Controllers\HowItWorksController Method=PersonalBudgeting
DEBUG - 2026-03-30 03:57:01 --> [REQ_ID=488c16d651f3] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/How-It-Works/Personal-Budgeting
DEBUG - 2026-03-30 03:57:01 --> [CSRF] token name=csrf_test_name hash=7e5f05079202a7cbf651bf89cbf2044d
DEBUG - 2026-03-30 03:57:01 --> [REQ_ID=4da00eab8e2d] [INIT] App\Modules\Blog\Controllers\HowItWorksController::GET
INFO - 2026-03-30 03:57:01 --> [REQ_ID=4da00eab8e2d] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-30 03:57:01 --> [REQ_ID=4da00eab8e2d] [METHOD_ENTRY] PersonalBudgeting
DEBUG - 2026-03-30 03:57:01 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-30 03:57:01 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-30 03:57:01 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-30 03:57:01 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-30 03:57:01 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-30 03:57:01 --> MyMICoin: guest context detected; skipping user-specific preload.
INFO - 2026-03-30 03:57:01 --> [REQ_ID=4da00eab8e2d] [MEMORY][commonData:start] 4194304
INFO - 2026-03-30 03:57:01 --> themesMemory usage: 8388608
DEBUG - 2026-03-30 03:57:01 --> [MetaService] slug=how-it-works/personal-budgeting pageName= cacheHit= path=DB
DEBUG - 2026-03-30 03:57:01 --> [REQ_ID=488c16d651f3] [FILTER_AFTER]
DEBUG - 2026-03-30 03:57:01 --> [REQ_ID=488c16d651f3] [LIFECYCLE][END] status=200 duration_ms=470.89 memory_delta=4194304
INFO - 2026-03-30 03:57:01 --> [REQ_ID=4da00eab8e2d] [PERF] Execution time=0.470576
DEBUG - 2026-03-30 03:57:01 --> [REQ_ID=488c16d651f3] [REQUEST][END]
INFO - 2026-03-30 03:57:01 --> [REQ_ID=488c16d651f3] [PERF] Execution time=0.482057
DEBUG - 2026-03-30 03:57:06 --> [REQ_ID=e8c9941db3d6] [REQUEST][START] GET /index.php/How-It-Works/Investment-Portfolio-Management
DEBUG - 2026-03-30 03:57:06 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-30 03:57:06 --> [REQ_ID=e8c9941db3d6] [FILTER_BEFORE] /index.php/How-It-Works/Investment-Portfolio-Management
DEBUG - 2026-03-30 03:57:06 --> [REQ_ID=e8c9941db3d6] [ROUTE] Controller=\App\Modules\Blog\Controllers\HowItWorksController Method=InvestmentPortfolioManagement
DEBUG - 2026-03-30 03:57:06 --> [REQ_ID=e8c9941db3d6] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/How-It-Works/Investment-Portfolio-Management
DEBUG - 2026-03-30 03:57:06 --> [CSRF] token name=csrf_test_name hash=1663a6632a546aa5295a3ddb694ba153
DEBUG - 2026-03-30 03:57:06 --> [REQ_ID=a0c2f38c6266] [INIT] App\Modules\Blog\Controllers\HowItWorksController::GET
INFO - 2026-03-30 03:57:06 --> [REQ_ID=a0c2f38c6266] [MEMORY][controller-start] 6291456
DEBUG - 2026-03-30 03:57:06 --> [REQ_ID=a0c2f38c6266] [METHOD_ENTRY] InvestmentPortfolioManagement
DEBUG - 2026-03-30 03:57:06 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-30 03:57:06 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-30 03:57:06 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-30 03:57:06 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-30 03:57:06 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-30 03:57:06 --> MyMICoin: guest context detected; skipping user-specific preload.
INFO - 2026-03-30 03:57:06 --> [REQ_ID=a0c2f38c6266] [MEMORY][commonData:start] 6291456
INFO - 2026-03-30 03:57:07 --> themesMemory usage: 8388608
DEBUG - 2026-03-30 03:57:07 --> [MetaService] slug=how-it-works/investment-portfolio-management pageName= cacheHit= path=DB
DEBUG - 2026-03-30 03:57:07 --> [REQ_ID=e8c9941db3d6] [FILTER_AFTER]
DEBUG - 2026-03-30 03:57:07 --> [REQ_ID=e8c9941db3d6] [LIFECYCLE][END] status=200 duration_ms=573.88 memory_delta=2097152
INFO - 2026-03-30 03:57:07 --> [REQ_ID=a0c2f38c6266] [PERF] Execution time=0.573442
DEBUG - 2026-03-30 03:57:07 --> [REQ_ID=e8c9941db3d6] [REQUEST][END]
INFO - 2026-03-30 03:57:07 --> [REQ_ID=e8c9941db3d6] [PERF] Execution time=0.583741
DEBUG - 2026-03-30 03:57:10 --> [REQ_ID=ff23c63af160] [REQUEST][START] GET /index.php/How-It-Works/Daily-Financial-News
DEBUG - 2026-03-30 03:57:10 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-30 03:57:10 --> [REQ_ID=ff23c63af160] [FILTER_BEFORE] /index.php/How-It-Works/Daily-Financial-News
DEBUG - 2026-03-30 03:57:10 --> [REQ_ID=ff23c63af160] [ROUTE] Controller=\App\Modules\Blog\Controllers\HowItWorksController Method=DailyFinancialNews
DEBUG - 2026-03-30 03:57:10 --> [REQ_ID=ff23c63af160] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/How-It-Works/Daily-Financial-News
DEBUG - 2026-03-30 03:57:10 --> [CSRF] token name=csrf_test_name hash=d25278ff19e468fea8587961ebc77f29
DEBUG - 2026-03-30 03:57:10 --> [REQ_ID=d9e6b3e6ed41] [INIT] App\Modules\Blog\Controllers\HowItWorksController::GET
INFO - 2026-03-30 03:57:10 --> [REQ_ID=d9e6b3e6ed41] [MEMORY][controller-start] 6291456
DEBUG - 2026-03-30 03:57:10 --> [REQ_ID=d9e6b3e6ed41] [METHOD_ENTRY] DailyFinancialNews
DEBUG - 2026-03-30 03:57:10 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-30 03:57:10 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-30 03:57:10 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-30 03:57:10 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-30 03:57:10 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-30 03:57:10 --> MyMICoin: guest context detected; skipping user-specific preload.
INFO - 2026-03-30 03:57:10 --> [REQ_ID=d9e6b3e6ed41] [MEMORY][commonData:start] 6291456
INFO - 2026-03-30 03:57:10 --> themesMemory usage: 8388608
DEBUG - 2026-03-30 03:57:10 --> [MetaService] slug=how-it-works/daily-financial-news pageName= cacheHit= path=DB
DEBUG - 2026-03-30 03:57:10 --> [REQ_ID=ff23c63af160] [FILTER_AFTER]
DEBUG - 2026-03-30 03:57:10 --> [REQ_ID=ff23c63af160] [LIFECYCLE][END] status=200 duration_ms=552.04 memory_delta=2097152
INFO - 2026-03-30 03:57:10 --> [REQ_ID=d9e6b3e6ed41] [PERF] Execution time=0.551620
DEBUG - 2026-03-30 03:57:10 --> [REQ_ID=ff23c63af160] [REQUEST][END]
INFO - 2026-03-30 03:57:10 --> [REQ_ID=ff23c63af160] [PERF] Execution time=0.562221
DEBUG - 2026-03-30 03:57:23 --> [REQ_ID=c1164f25b5ae] [REQUEST][START] GET /index.php/
DEBUG - 2026-03-30 03:57:23 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-30 03:57:23 --> [REQ_ID=c1164f25b5ae] [FILTER_BEFORE] /index.php/
DEBUG - 2026-03-30 03:57:23 --> [REQ_ID=c1164f25b5ae] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-30 03:57:23 --> [REQ_ID=c1164f25b5ae] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-30 03:57:23 --> [CSRF] token name=csrf_test_name hash=2d0dd4c5ede561391e8b7b5ee4832b50
DEBUG - 2026-03-30 03:57:23 --> [REQ_ID=a1c4b027bda0] [INIT] App\Controllers\Home::GET
INFO - 2026-03-30 03:57:23 --> [REQ_ID=a1c4b027bda0] [MEMORY][controller-start] 6291456
INFO - 2026-03-30 03:57:23 --> [REQ_ID=a1c4b027bda0] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-30 03:57:23 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-30 03:57:23 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-03-30 03:57:23 --> [REQ_ID=a1c4b027bda0] [VIEW_RENDER] themes/public/home
INFO - 2026-03-30 03:57:23 --> [REQ_ID=a1c4b027bda0] [MEMORY][commonData:start] 8388608
INFO - 2026-03-30 03:57:23 --> themesMemory usage: 8388608
DEBUG - 2026-03-30 03:57:23 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-30 03:57:23 --> [REQ_ID=c1164f25b5ae] [FILTER_AFTER]
DEBUG - 2026-03-30 03:57:23 --> [REQ_ID=c1164f25b5ae] [LIFECYCLE][END] status=200 duration_ms=467.59 memory_delta=2097152
INFO - 2026-03-30 03:57:23 --> [REQ_ID=a1c4b027bda0] [PERF] Execution time=0.467331
DEBUG - 2026-03-30 03:57:23 --> [REQ_ID=c1164f25b5ae] [REQUEST][END]
INFO - 2026-03-30 03:57:23 --> [REQ_ID=c1164f25b5ae] [PERF] Execution time=0.477536
DEBUG - 2026-03-30 03:57:30 --> [REQ_ID=13b5d29b5dbf] [REQUEST][START] GET /index.php
DEBUG - 2026-03-30 03:57:30 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-30 03:57:30 --> [REQ_ID=13b5d29b5dbf] [FILTER_BEFORE] /index.php
DEBUG - 2026-03-30 03:57:30 --> [REQ_ID=13b5d29b5dbf] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-30 03:57:30 --> [REQ_ID=13b5d29b5dbf] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-30 03:57:30 --> [CSRF] token name=csrf_test_name hash=6c11a6046d1c594f696adc97c923c420
DEBUG - 2026-03-30 03:57:30 --> [REQ_ID=046c021d0ebf] [INIT] App\Controllers\Home::GET
INFO - 2026-03-30 03:57:30 --> [REQ_ID=046c021d0ebf] [MEMORY][controller-start] 6291456
INFO - 2026-03-30 03:57:30 --> [REQ_ID=046c021d0ebf] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-30 03:57:30 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-30 03:57:31 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
DEBUG - 2026-03-30 03:57:31 --> [REQ_ID=046c021d0ebf] [VIEW_RENDER] themes/public/home
INFO - 2026-03-30 03:57:31 --> [REQ_ID=046c021d0ebf] [MEMORY][commonData:start] 8388608
INFO - 2026-03-30 03:57:31 --> themesMemory usage: 8388608
DEBUG - 2026-03-30 03:57:31 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-30 03:57:31 --> [REQ_ID=13b5d29b5dbf] [FILTER_AFTER]
DEBUG - 2026-03-30 03:57:31 --> [REQ_ID=13b5d29b5dbf] [LIFECYCLE][END] status=200 duration_ms=551.08 memory_delta=2097152
INFO - 2026-03-30 03:57:31 --> [REQ_ID=046c021d0ebf] [PERF] Execution time=0.550787
DEBUG - 2026-03-30 03:57:31 --> [REQ_ID=13b5d29b5dbf] [REQUEST][END]
INFO - 2026-03-30 03:57:31 --> [REQ_ID=13b5d29b5dbf] [PERF] Execution time=0.560761
DEBUG - 2026-03-30 03:57:35 --> [REQ_ID=053cca948edd] [REQUEST][START] GET /index.php/How-It-Works
DEBUG - 2026-03-30 03:57:35 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-30 03:57:35 --> [REQ_ID=053cca948edd] [FILTER_BEFORE] /index.php/How-It-Works
DEBUG - 2026-03-30 03:57:35 --> [REQ_ID=053cca948edd] [ROUTE] Controller=\App\Modules\Blog\Controllers\HowItWorksController Method=index
DEBUG - 2026-03-30 03:57:35 --> [REQ_ID=053cca948edd] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/How-It-Works
DEBUG - 2026-03-30 03:57:35 --> [CSRF] token name=csrf_test_name hash=b828511d6c4add200b2554d80f3a6df9
DEBUG - 2026-03-30 03:57:35 --> [REQ_ID=a13537fb7801] [INIT] App\Modules\Blog\Controllers\HowItWorksController::GET
INFO - 2026-03-30 03:57:35 --> [REQ_ID=a13537fb7801] [MEMORY][controller-start] 8388608
DEBUG - 2026-03-30 03:57:35 --> [REQ_ID=a13537fb7801] [METHOD_ENTRY] index
DEBUG - 2026-03-30 03:57:35 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-30 03:57:35 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-30 03:57:35 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-30 03:57:35 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-30 03:57:35 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-30 03:57:35 --> MyMICoin: guest context detected; skipping user-specific preload.
ERROR - 2026-03-30 03:57:35 --> HowItWorksController failure: overview
CRITICAL - 2026-03-30 03:57:35 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: GET, Route: How-It-Works]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-30 03:57:35 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-30 03:57:35 --> [404] URI=https://www.mymiwallet.com/index.php/How-It-Works
WARNING - 2026-03-30 03:57:35 --> 404 route miss: https://www.mymiwallet.com/index.php/How-It-Works | referrer: none
ERROR - 2026-03-30 03:57:35 --> [ERROR_PAGE] event=error_404 status=404 message=Page not found.
INFO - 2026-03-30 03:57:35 --> [REQ_ID=a13537fb7801] [PERF] Execution time=0.032777
DEBUG - 2026-03-30 03:57:39 --> [REQ_ID=cde18d3f4e25] [REQUEST][START] GET /index.php/How-It-Works
DEBUG - 2026-03-30 03:57:39 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-30 03:57:39 --> [REQ_ID=cde18d3f4e25] [FILTER_BEFORE] /index.php/How-It-Works
DEBUG - 2026-03-30 03:57:39 --> [REQ_ID=cde18d3f4e25] [ROUTE] Controller=\App\Modules\Blog\Controllers\HowItWorksController Method=index
DEBUG - 2026-03-30 03:57:39 --> [REQ_ID=cde18d3f4e25] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/How-It-Works
DEBUG - 2026-03-30 03:57:39 --> [CSRF] token name=csrf_test_name hash=ffc527b62e7d80414b112587ddba63ca
DEBUG - 2026-03-30 03:57:39 --> [REQ_ID=0806c821d797] [INIT] App\Modules\Blog\Controllers\HowItWorksController::GET
INFO - 2026-03-30 03:57:39 --> [REQ_ID=0806c821d797] [MEMORY][controller-start] 6291456
DEBUG - 2026-03-30 03:57:39 --> [REQ_ID=0806c821d797] [METHOD_ENTRY] index
DEBUG - 2026-03-30 03:57:39 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-30 03:57:39 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-30 03:57:39 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-30 03:57:39 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-30 03:57:39 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-30 03:57:39 --> MyMICoin: guest context detected; skipping user-specific preload.
ERROR - 2026-03-30 03:57:39 --> HowItWorksController failure: overview
CRITICAL - 2026-03-30 03:57:39 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: GET, Route: How-It-Works]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-30 03:57:39 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-30 03:57:39 --> [404] URI=https://www.mymiwallet.com/index.php/How-It-Works
WARNING - 2026-03-30 03:57:39 --> 404 route miss: https://www.mymiwallet.com/index.php/How-It-Works | referrer: none
ERROR - 2026-03-30 03:57:39 --> [ERROR_PAGE] event=error_404 status=404 message=Page not found.
INFO - 2026-03-30 03:57:39 --> [REQ_ID=0806c821d797] [PERF] Execution time=0.051930
DEBUG - 2026-03-30 03:57:44 --> [REQ_ID=bfc85570414e] [REQUEST][START] GET /index.php/How-It-Works
DEBUG - 2026-03-30 03:57:44 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-30 03:57:44 --> [REQ_ID=bfc85570414e] [FILTER_BEFORE] /index.php/How-It-Works
DEBUG - 2026-03-30 03:57:44 --> [REQ_ID=bfc85570414e] [ROUTE] Controller=\App\Modules\Blog\Controllers\HowItWorksController Method=index
DEBUG - 2026-03-30 03:57:44 --> [REQ_ID=bfc85570414e] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/How-It-Works
DEBUG - 2026-03-30 03:57:44 --> [CSRF] token name=csrf_test_name hash=000516f1d34523e33c65c56fb18f76ac
DEBUG - 2026-03-30 03:57:44 --> [REQ_ID=c44ff66b4f39] [INIT] App\Modules\Blog\Controllers\HowItWorksController::GET
INFO - 2026-03-30 03:57:44 --> [REQ_ID=c44ff66b4f39] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-30 03:57:44 --> [REQ_ID=c44ff66b4f39] [METHOD_ENTRY] index
DEBUG - 2026-03-30 03:57:44 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-30 03:57:44 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-30 03:57:44 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-30 03:57:44 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-30 03:57:44 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-30 03:57:44 --> MyMICoin: guest context detected; skipping user-specific preload.
ERROR - 2026-03-30 03:57:44 --> HowItWorksController failure: overview
CRITICAL - 2026-03-30 03:57:44 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: GET, Route: How-It-Works]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-30 03:57:44 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-30 03:57:44 --> [404] URI=https://www.mymiwallet.com/index.php/How-It-Works
WARNING - 2026-03-30 03:57:44 --> 404 route miss: https://www.mymiwallet.com/index.php/How-It-Works | referrer: none
ERROR - 2026-03-30 03:57:44 --> [ERROR_PAGE] event=error_404 status=404 message=Page not found.
INFO - 2026-03-30 03:57:44 --> [REQ_ID=c44ff66b4f39] [PERF] Execution time=0.025178
DEBUG - 2026-03-30 03:57:48 --> [REQ_ID=c2bf4bc6e906] [REQUEST][START] GET /index.php/Blog
DEBUG - 2026-03-30 03:57:48 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-30 03:57:48 --> [REQ_ID=c2bf4bc6e906] [FILTER_BEFORE] /index.php/Blog
DEBUG - 2026-03-30 03:57:48 --> [REQ_ID=c2bf4bc6e906] [ROUTE] Controller=\App\Modules\Blog\Controllers\BlogController Method=index
DEBUG - 2026-03-30 03:57:48 --> [REQ_ID=c2bf4bc6e906] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Blog
DEBUG - 2026-03-30 03:57:48 --> [CSRF] token name=csrf_test_name hash=d9ec024bb482de300b0567c30c896e42
DEBUG - 2026-03-30 03:57:48 --> [REQ_ID=7f3dd8aaff5e] [INIT] App\Modules\Blog\Controllers\BlogController::GET
INFO - 2026-03-30 03:57:48 --> [REQ_ID=7f3dd8aaff5e] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-30 03:57:48 --> [REQ_ID=7f3dd8aaff5e] [METHOD_ENTRY] index
DEBUG - 2026-03-30 03:57:48 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-30 03:57:48 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-30 03:57:48 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-30 03:57:48 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-30 03:57:48 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-30 03:57:48 --> MyMICoin: guest context detected; skipping user-specific preload.
INFO - 2026-03-30 03:57:48 --> [REQ_ID=7f3dd8aaff5e] [MEMORY][commonData:start] 4194304
INFO - 2026-03-30 03:57:48 --> [REQ_ID=7f3dd8aaff5e] [PERF] Execution time=0.101179
DEBUG - 2026-03-30 03:57:53 --> [REQ_ID=4e26fd8e83a6] [REQUEST][START] GET /index.php/Blog
DEBUG - 2026-03-30 03:57:53 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-30 03:57:53 --> [REQ_ID=4e26fd8e83a6] [FILTER_BEFORE] /index.php/Blog
DEBUG - 2026-03-30 03:57:53 --> [REQ_ID=4e26fd8e83a6] [ROUTE] Controller=\App\Modules\Blog\Controllers\BlogController Method=index
DEBUG - 2026-03-30 03:57:53 --> [REQ_ID=4e26fd8e83a6] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Blog
DEBUG - 2026-03-30 03:57:53 --> [CSRF] token name=csrf_test_name hash=8f4bc0a991ebe5efa6a287e5eee1dab9
DEBUG - 2026-03-30 03:57:53 --> [REQ_ID=d3e9168a00eb] [INIT] App\Modules\Blog\Controllers\BlogController::GET
INFO - 2026-03-30 03:57:53 --> [REQ_ID=d3e9168a00eb] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-30 03:57:53 --> [REQ_ID=d3e9168a00eb] [METHOD_ENTRY] index
DEBUG - 2026-03-30 03:57:53 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-30 03:57:53 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-30 03:57:53 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-30 03:57:53 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-30 03:57:53 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-30 03:57:53 --> MyMICoin: guest context detected; skipping user-specific preload.
INFO - 2026-03-30 03:57:53 --> [REQ_ID=d3e9168a00eb] [MEMORY][commonData:start] 4194304
INFO - 2026-03-30 03:57:53 --> [REQ_ID=d3e9168a00eb] [PERF] Execution time=0.027805
DEBUG - 2026-03-30 03:57:58 --> [REQ_ID=ff71a5d74afd] [REQUEST][START] GET /index.php/Blog
DEBUG - 2026-03-30 03:57:58 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-30 03:57:58 --> [REQ_ID=ff71a5d74afd] [FILTER_BEFORE] /index.php/Blog
DEBUG - 2026-03-30 03:57:58 --> [REQ_ID=ff71a5d74afd] [ROUTE] Controller=\App\Modules\Blog\Controllers\BlogController Method=index
DEBUG - 2026-03-30 03:57:58 --> [REQ_ID=ff71a5d74afd] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Blog
DEBUG - 2026-03-30 03:57:58 --> [CSRF] token name=csrf_test_name hash=78d46bc6a46d15ff9afcb951b56866b3
DEBUG - 2026-03-30 03:57:58 --> [REQ_ID=9fc06628b7ff] [INIT] App\Modules\Blog\Controllers\BlogController::GET
INFO - 2026-03-30 03:57:58 --> [REQ_ID=9fc06628b7ff] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-30 03:57:58 --> [REQ_ID=9fc06628b7ff] [METHOD_ENTRY] index
DEBUG - 2026-03-30 03:57:58 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-30 03:57:58 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-30 03:57:58 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-30 03:57:58 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-30 03:57:58 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-30 03:57:58 --> MyMICoin: guest context detected; skipping user-specific preload.
INFO - 2026-03-30 03:57:58 --> [REQ_ID=9fc06628b7ff] [MEMORY][commonData:start] 4194304
INFO - 2026-03-30 03:57:58 --> [REQ_ID=9fc06628b7ff] [PERF] Execution time=0.017799
DEBUG - 2026-03-30 03:58:04 --> [REQ_ID=2b9a9386c21a] [REQUEST][START] GET /index.php/Knowledgebase
DEBUG - 2026-03-30 03:58:04 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-30 03:58:04 --> ErrorException: Access level to App\Modules\User\Controllers\KnowledgebaseController::respondWithRendered() must be protected (as in class App\Controllers\BaseController) or weaker
[Method: GET, Route: Knowledgebase]
in APPPATH/Modules/User/Controllers/KnowledgebaseController.php on line 535.
 1 [internal function]: CodeIgniter\Debug\Exceptions->shutdownHandler()
CRITICAL - 2026-03-30 03:58:04 --> [EXCEPTION] Access level to App\Modules\User\Controllers\KnowledgebaseController::respondWithRendered() must be protected (as in class App\Controllers\BaseController) or weaker File=/home/mymiteam/mymiwallet/site/current/app/Modules/User/Controllers/KnowledgebaseController.php Line=535
ERROR - 2026-03-30 03:58:04 --> [ERROR_PAGE] event=error_500 status=500 message=Internal server error.
DEBUG - 2026-03-30 03:58:07 --> [REQ_ID=90631b8e2320] [REQUEST][START] GET /index.php/Knowledgebase
DEBUG - 2026-03-30 03:58:07 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-30 03:58:07 --> ErrorException: Access level to App\Modules\User\Controllers\KnowledgebaseController::respondWithRendered() must be protected (as in class App\Controllers\BaseController) or weaker
[Method: GET, Route: Knowledgebase]
in APPPATH/Modules/User/Controllers/KnowledgebaseController.php on line 535.
 1 [internal function]: CodeIgniter\Debug\Exceptions->shutdownHandler()
CRITICAL - 2026-03-30 03:58:07 --> [EXCEPTION] Access level to App\Modules\User\Controllers\KnowledgebaseController::respondWithRendered() must be protected (as in class App\Controllers\BaseController) or weaker File=/home/mymiteam/mymiwallet/site/current/app/Modules/User/Controllers/KnowledgebaseController.php Line=535
ERROR - 2026-03-30 03:58:07 --> [ERROR_PAGE] event=error_500 status=500 message=Internal server error.
DEBUG - 2026-03-30 03:58:11 --> [REQ_ID=2a575439873a] [REQUEST][START] GET /index.php/Knowledgebase
DEBUG - 2026-03-30 03:58:11 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-30 03:58:11 --> ErrorException: Access level to App\Modules\User\Controllers\KnowledgebaseController::respondWithRendered() must be protected (as in class App\Controllers\BaseController) or weaker
[Method: GET, Route: Knowledgebase]
in APPPATH/Modules/User/Controllers/KnowledgebaseController.php on line 535.
 1 [internal function]: CodeIgniter\Debug\Exceptions->shutdownHandler()
CRITICAL - 2026-03-30 03:58:11 --> [EXCEPTION] Access level to App\Modules\User\Controllers\KnowledgebaseController::respondWithRendered() must be protected (as in class App\Controllers\BaseController) or weaker File=/home/mymiteam/mymiwallet/site/current/app/Modules/User/Controllers/KnowledgebaseController.php Line=535
ERROR - 2026-03-30 03:58:11 --> [ERROR_PAGE] event=error_500 status=500 message=Internal server error.
DEBUG - 2026-03-30 03:58:14 --> [REQ_ID=ff0fe0224ade] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-30 03:58:14 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-30 03:58:14 --> [REQ_ID=ff0fe0224ade] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-30 03:58:14 --> [REQ_ID=ff0fe0224ade] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-30 03:58:14 --> [REQ_ID=ff0fe0224ade] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-30 03:58:14 --> [CSRF] token name=csrf_test_name hash=5d449ed2cc0e75ffbf1c99a1746b3532
DEBUG - 2026-03-30 03:58:14 --> [REQ_ID=82c4c1302fa2] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-30 03:58:14 --> [REQ_ID=82c4c1302fa2] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-30 03:58:14 --> [REQ_ID=ff0fe0224ade] [FILTER_AFTER]
DEBUG - 2026-03-30 03:58:14 --> [REQ_ID=ff0fe0224ade] [LIFECYCLE][END] status=200 duration_ms=23.01 memory_delta=0
INFO - 2026-03-30 03:58:14 --> [REQ_ID=82c4c1302fa2] [PERF] Execution time=0.022812
DEBUG - 2026-03-30 03:58:14 --> [REQ_ID=ff0fe0224ade] [REQUEST][END]
INFO - 2026-03-30 03:58:14 --> [REQ_ID=ff0fe0224ade] [PERF] Execution time=0.032967
DEBUG - 2026-03-30 03:58:19 --> [REQ_ID=d444a9ef8d7e] [REQUEST][START] GET /index.php/Free/register
DEBUG - 2026-03-30 03:58:19 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-30 03:58:19 --> [REQ_ID=d444a9ef8d7e] [FILTER_BEFORE] /index.php/Free/register
DEBUG - 2026-03-30 03:58:19 --> [REQ_ID=d444a9ef8d7e] [ROUTE] Controller=\App\Controllers\AuthController Method=register
DEBUG - 2026-03-30 03:58:19 --> [REQ_ID=d444a9ef8d7e] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Free/register
DEBUG - 2026-03-30 03:58:19 --> [CSRF] token name=csrf_test_name hash=841a845615cccde159e99793ed936af3
DEBUG - 2026-03-30 03:58:19 --> [REQ_ID=0c7857ce1996] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-30 03:58:19 --> [REQ_ID=0c7857ce1996] [MEMORY][controller-start] 4194304
INFO - 2026-03-30 03:58:19 --> [REGISTRATION] Form loaded
INFO - 2026-03-30 03:58:19 --> [REQ_ID=0c7857ce1996] [PERF] Execution time=0.023474
DEBUG - 2026-03-30 03:58:22 --> [REQ_ID=958c47b9e6dd] [REQUEST][START] GET /index.php/Free/register
DEBUG - 2026-03-30 03:58:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-30 03:58:22 --> [REQ_ID=958c47b9e6dd] [FILTER_BEFORE] /index.php/Free/register
DEBUG - 2026-03-30 03:58:22 --> [REQ_ID=958c47b9e6dd] [ROUTE] Controller=\App\Controllers\AuthController Method=register
DEBUG - 2026-03-30 03:58:22 --> [REQ_ID=958c47b9e6dd] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Free/register
DEBUG - 2026-03-30 03:58:22 --> [CSRF] token name=csrf_test_name hash=24d5c00f1015a15ddecb153b4b75fd7e
DEBUG - 2026-03-30 03:58:22 --> [REQ_ID=94cdc1d0afe3] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-30 03:58:22 --> [REQ_ID=94cdc1d0afe3] [MEMORY][controller-start] 4194304
INFO - 2026-03-30 03:58:22 --> [REGISTRATION] Form loaded
INFO - 2026-03-30 03:58:22 --> [REQ_ID=94cdc1d0afe3] [PERF] Execution time=0.015525
DEBUG - 2026-03-30 03:58:25 --> [REQ_ID=72d17dab09bb] [REQUEST][START] GET /index.php/Free/register
DEBUG - 2026-03-30 03:58:25 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-30 03:58:25 --> [REQ_ID=72d17dab09bb] [FILTER_BEFORE] /index.php/Free/register
DEBUG - 2026-03-30 03:58:25 --> [REQ_ID=72d17dab09bb] [ROUTE] Controller=\App\Controllers\AuthController Method=register
DEBUG - 2026-03-30 03:58:25 --> [REQ_ID=72d17dab09bb] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Free/register
DEBUG - 2026-03-30 03:58:25 --> [CSRF] token name=csrf_test_name hash=08daf9a02891e6c8b1c696e7b36791fd
DEBUG - 2026-03-30 03:58:25 --> [REQ_ID=9ad0702ee639] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-30 03:58:25 --> [REQ_ID=9ad0702ee639] [MEMORY][controller-start] 4194304
INFO - 2026-03-30 03:58:25 --> [REGISTRATION] Form loaded
INFO - 2026-03-30 03:58:25 --> [REQ_ID=9ad0702ee639] [PERF] Execution time=0.015174
DEBUG - 2026-03-30 03:58:47 --> [REQ_ID=487ef3d7464a] [REQUEST][START] GET /index.php/How-It-Works/Personal-Budgeting
DEBUG - 2026-03-30 03:58:47 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-30 03:58:47 --> [REQ_ID=487ef3d7464a] [FILTER_BEFORE] /index.php/How-It-Works/Personal-Budgeting
DEBUG - 2026-03-30 03:58:47 --> [REQ_ID=487ef3d7464a] [ROUTE] Controller=\App\Modules\Blog\Controllers\HowItWorksController Method=PersonalBudgeting
DEBUG - 2026-03-30 03:58:47 --> [REQ_ID=487ef3d7464a] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/How-It-Works/Personal-Budgeting
DEBUG - 2026-03-30 03:58:47 --> [CSRF] token name=csrf_test_name hash=b2912baf1c585824307cc2f91f4b7a8e
DEBUG - 2026-03-30 03:58:47 --> [REQ_ID=734fcc31c940] [INIT] App\Modules\Blog\Controllers\HowItWorksController::GET
INFO - 2026-03-30 03:58:47 --> [REQ_ID=734fcc31c940] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-30 03:58:47 --> [REQ_ID=734fcc31c940] [METHOD_ENTRY] PersonalBudgeting
DEBUG - 2026-03-30 03:58:47 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-30 03:58:47 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-30 03:58:47 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-30 03:58:47 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-30 03:58:47 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-30 03:58:47 --> MyMICoin: guest context detected; skipping user-specific preload.
INFO - 2026-03-30 03:58:47 --> [REQ_ID=734fcc31c940] [MEMORY][commonData:start] 4194304
INFO - 2026-03-30 03:58:47 --> themesMemory usage: 8388608
DEBUG - 2026-03-30 03:58:47 --> [MetaService] slug=how-it-works/personal-budgeting pageName= cacheHit=1 path=CACHE
DEBUG - 2026-03-30 03:58:47 --> [REQ_ID=487ef3d7464a] [FILTER_AFTER]
DEBUG - 2026-03-30 03:58:47 --> [REQ_ID=487ef3d7464a] [LIFECYCLE][END] status=200 duration_ms=521.57 memory_delta=4194304
INFO - 2026-03-30 03:58:47 --> [REQ_ID=734fcc31c940] [PERF] Execution time=0.521292
DEBUG - 2026-03-30 03:58:47 --> [REQ_ID=487ef3d7464a] [REQUEST][END]
INFO - 2026-03-30 03:58:47 --> [REQ_ID=487ef3d7464a] [PERF] Execution time=0.531281
DEBUG - 2026-03-30 03:58:56 --> [REQ_ID=ae263dc924cb] [REQUEST][START] GET /index.php/How-It-Works/Investment-Portfolio-Management
DEBUG - 2026-03-30 03:58:56 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-30 03:58:56 --> [REQ_ID=ae263dc924cb] [FILTER_BEFORE] /index.php/How-It-Works/Investment-Portfolio-Management
DEBUG - 2026-03-30 03:58:56 --> [REQ_ID=ae263dc924cb] [ROUTE] Controller=\App\Modules\Blog\Controllers\HowItWorksController Method=InvestmentPortfolioManagement
DEBUG - 2026-03-30 03:58:56 --> [REQ_ID=ae263dc924cb] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/How-It-Works/Investment-Portfolio-Management
DEBUG - 2026-03-30 03:58:56 --> [CSRF] token name=csrf_test_name hash=ab1cd82c0dd6d566d1d5c53aa9e55e82
DEBUG - 2026-03-30 03:58:56 --> [REQ_ID=feea004fb39e] [INIT] App\Modules\Blog\Controllers\HowItWorksController::GET
INFO - 2026-03-30 03:58:56 --> [REQ_ID=feea004fb39e] [MEMORY][controller-start] 6291456
DEBUG - 2026-03-30 03:58:56 --> [REQ_ID=feea004fb39e] [METHOD_ENTRY] InvestmentPortfolioManagement
DEBUG - 2026-03-30 03:58:56 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-30 03:58:56 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-30 03:58:56 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-30 03:58:56 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-30 03:58:56 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-30 03:58:56 --> MyMICoin: guest context detected; skipping user-specific preload.
INFO - 2026-03-30 03:58:56 --> [REQ_ID=feea004fb39e] [MEMORY][commonData:start] 6291456
INFO - 2026-03-30 03:58:57 --> themesMemory usage: 8388608
DEBUG - 2026-03-30 03:58:57 --> [MetaService] slug=how-it-works/investment-portfolio-management pageName= cacheHit=1 path=CACHE
DEBUG - 2026-03-30 03:58:57 --> [REQ_ID=ae263dc924cb] [FILTER_AFTER]
DEBUG - 2026-03-30 03:58:57 --> [REQ_ID=ae263dc924cb] [LIFECYCLE][END] status=200 duration_ms=545.69 memory_delta=2097152
INFO - 2026-03-30 03:58:57 --> [REQ_ID=feea004fb39e] [PERF] Execution time=0.545454
DEBUG - 2026-03-30 03:58:57 --> [REQ_ID=ae263dc924cb] [REQUEST][END]
INFO - 2026-03-30 03:58:57 --> [REQ_ID=ae263dc924cb] [PERF] Execution time=0.554905
DEBUG - 2026-03-30 03:59:01 --> [REQ_ID=f63c2ec5fcbe] [REQUEST][START] GET /index.php/How-It-Works/Daily-Financial-News
DEBUG - 2026-03-30 03:59:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-30 03:59:01 --> [REQ_ID=f63c2ec5fcbe] [FILTER_BEFORE] /index.php/How-It-Works/Daily-Financial-News
DEBUG - 2026-03-30 03:59:01 --> [REQ_ID=f63c2ec5fcbe] [ROUTE] Controller=\App\Modules\Blog\Controllers\HowItWorksController Method=DailyFinancialNews
DEBUG - 2026-03-30 03:59:01 --> [REQ_ID=f63c2ec5fcbe] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/How-It-Works/Daily-Financial-News
DEBUG - 2026-03-30 03:59:01 --> [CSRF] token name=csrf_test_name hash=0ab86f97b77c058652693b2e5d989a42
DEBUG - 2026-03-30 03:59:01 --> [REQ_ID=8da460d1dc2d] [INIT] App\Modules\Blog\Controllers\HowItWorksController::GET
INFO - 2026-03-30 03:59:01 --> [REQ_ID=8da460d1dc2d] [MEMORY][controller-start] 6291456
DEBUG - 2026-03-30 03:59:01 --> [REQ_ID=8da460d1dc2d] [METHOD_ENTRY] DailyFinancialNews
DEBUG - 2026-03-30 03:59:01 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-30 03:59:01 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-30 03:59:01 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-30 03:59:01 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-30 03:59:01 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-30 03:59:01 --> MyMICoin: guest context detected; skipping user-specific preload.
INFO - 2026-03-30 03:59:01 --> [REQ_ID=8da460d1dc2d] [MEMORY][commonData:start] 6291456
INFO - 2026-03-30 03:59:01 --> themesMemory usage: 8388608
DEBUG - 2026-03-30 03:59:01 --> [MetaService] slug=how-it-works/daily-financial-news pageName= cacheHit=1 path=CACHE
DEBUG - 2026-03-30 03:59:01 --> [REQ_ID=f63c2ec5fcbe] [FILTER_AFTER]
DEBUG - 2026-03-30 03:59:01 --> [REQ_ID=f63c2ec5fcbe] [LIFECYCLE][END] status=200 duration_ms=552.35 memory_delta=2097152
INFO - 2026-03-30 03:59:01 --> [REQ_ID=8da460d1dc2d] [PERF] Execution time=0.552137
DEBUG - 2026-03-30 03:59:01 --> [REQ_ID=f63c2ec5fcbe] [REQUEST][END]
INFO - 2026-03-30 03:59:01 --> [REQ_ID=f63c2ec5fcbe] [PERF] Execution time=0.562017
DEBUG - 2026-03-30 04:00:01 --> [REQ_ID=d358b9cc7b90] [REQUEST][START] GET /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-30 04:00:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-30 04:00:01 --> [REQ_ID=d358b9cc7b90] [FILTER_BEFORE] /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-30 04:00:01 --> [REQ_ID=d358b9cc7b90] [ROUTE] Controller=\App\Modules\Management\Controllers\ManagementAPIController Method=Run_CRON_Tasks
DEBUG - 2026-03-30 04:00:01 --> [REQ_ID=d358b9cc7b90] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-30 04:00:01 --> [REQ_ID=d358b9cc7b90] [REQUEST][END]
INFO - 2026-03-30 04:00:01 --> [REQ_ID=d358b9cc7b90] [PERF] Execution time=0.013760
DEBUG - 2026-03-30 04:01:22 --> [REQ_ID=f5b969f09d23] [REQUEST][START] HEAD /
DEBUG - 2026-03-30 04:01:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-30 04:01:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-30 04:01:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-30 04:01:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-30 04:01:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-30 04:05:32 --> [REQ_ID=79bc2027040d] [REQUEST][START] GET /
DEBUG - 2026-03-30 04:05:32 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-30 04:05:32 --> [REQ_ID=79bc2027040d] [FILTER_BEFORE] /
DEBUG - 2026-03-30 04:05:32 --> [REQ_ID=79bc2027040d] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-30 04:05:32 --> [REQ_ID=79bc2027040d] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-30 04:05:32 --> [CSRF] token name=csrf_test_name hash=b01d3c6bb2bf88aea5b8fc8739b41484
DEBUG - 2026-03-30 04:05:32 --> [REQ_ID=e7c13e63ecb8] [INIT] App\Controllers\Home::GET
INFO - 2026-03-30 04:05:32 --> [REQ_ID=e7c13e63ecb8] [MEMORY][controller-start] 6291456
INFO - 2026-03-30 04:05:32 --> [REQ_ID=e7c13e63ecb8] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-30 04:05:32 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-30 04:05:32 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
DEBUG - 2026-03-30 04:05:32 --> [REQ_ID=e7c13e63ecb8] [VIEW_RENDER] themes/public/home
INFO - 2026-03-30 04:05:32 --> [REQ_ID=e7c13e63ecb8] [MEMORY][commonData:start] 10485760
INFO - 2026-03-30 04:05:32 --> themesMemory usage: 10485760
DEBUG - 2026-03-30 04:05:32 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-30 04:05:32 --> [REQ_ID=79bc2027040d] [FILTER_AFTER]
DEBUG - 2026-03-30 04:05:32 --> [REQ_ID=79bc2027040d] [LIFECYCLE][END] status=200 duration_ms=546.01 memory_delta=4194304
INFO - 2026-03-30 04:05:32 --> [REQ_ID=e7c13e63ecb8] [PERF] Execution time=0.543143
DEBUG - 2026-03-30 04:05:32 --> [REQ_ID=79bc2027040d] [REQUEST][END]
INFO - 2026-03-30 04:05:32 --> [REQ_ID=79bc2027040d] [PERF] Execution time=0.604086
DEBUG - 2026-03-30 04:06:22 --> [REQ_ID=8d7beaf719d3] [REQUEST][START] HEAD /
DEBUG - 2026-03-30 04:06:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-30 04:06:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-30 04:06:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-30 04:06:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-30 04:06:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-30 04:09:52 --> [REQ_ID=a2beddd5b4ac] [REQUEST][START] GET /
DEBUG - 2026-03-30 04:09:52 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-30 04:09:52 --> [REQ_ID=a2beddd5b4ac] [FILTER_BEFORE] /
DEBUG - 2026-03-30 04:09:52 --> [REQ_ID=a2beddd5b4ac] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-30 04:09:52 --> [REQ_ID=a2beddd5b4ac] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-30 04:09:52 --> [CSRF] token name=csrf_test_name hash=5cf414c2c4010465984c69c8e89be7b0
DEBUG - 2026-03-30 04:09:52 --> [REQ_ID=5deb670231d2] [INIT] App\Controllers\Home::GET
INFO - 2026-03-30 04:09:52 --> [REQ_ID=5deb670231d2] [MEMORY][controller-start] 6291456
INFO - 2026-03-30 04:09:52 --> [REQ_ID=5deb670231d2] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-30 04:09:52 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-30 04:09:52 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
DEBUG - 2026-03-30 04:09:52 --> [REQ_ID=5deb670231d2] [VIEW_RENDER] themes/public/home
INFO - 2026-03-30 04:09:52 --> [REQ_ID=5deb670231d2] [MEMORY][commonData:start] 10485760
INFO - 2026-03-30 04:09:52 --> themesMemory usage: 10485760
DEBUG - 2026-03-30 04:09:52 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-30 04:09:52 --> [REQ_ID=a2beddd5b4ac] [FILTER_AFTER]
DEBUG - 2026-03-30 04:09:52 --> [REQ_ID=a2beddd5b4ac] [LIFECYCLE][END] status=200 duration_ms=714.16 memory_delta=4194304
INFO - 2026-03-30 04:09:52 --> [REQ_ID=5deb670231d2] [PERF] Execution time=0.712073
DEBUG - 2026-03-30 04:09:52 --> [REQ_ID=a2beddd5b4ac] [REQUEST][END]
INFO - 2026-03-30 04:09:52 --> [REQ_ID=a2beddd5b4ac] [PERF] Execution time=0.752446
DEBUG - 2026-03-30 04:11:22 --> [REQ_ID=a5f0e58e646a] [REQUEST][START] HEAD /
DEBUG - 2026-03-30 04:11:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-30 04:11:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-30 04:11:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-30 04:11:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-30 04:11:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-30 04:15:01 --> [REQ_ID=079691c40491] [REQUEST][START] GET /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-30 04:15:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-30 04:15:01 --> [REQ_ID=079691c40491] [FILTER_BEFORE] /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-30 04:15:01 --> [REQ_ID=079691c40491] [ROUTE] Controller=\App\Modules\APIs\Controllers\AlertsAPIController Method=fetchEmailAlerts
DEBUG - 2026-03-30 04:15:01 --> [REQ_ID=079691c40491] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-30 04:15:01 --> [REQ_ID=079691c40491] [REQUEST][END]
INFO - 2026-03-30 04:15:01 --> [REQ_ID=079691c40491] [PERF] Execution time=0.046875
DEBUG - 2026-03-30 04:16:22 --> [REQ_ID=6ff2cb4b985f] [REQUEST][START] HEAD /
DEBUG - 2026-03-30 04:16:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-30 04:16:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-30 04:16:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-30 04:16:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-30 04:16:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-30 04:17:10 --> [REQ_ID=306822d6bc29] [REQUEST][START] GET /index.php/Knowledgebase
DEBUG - 2026-03-30 04:17:10 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-30 04:17:10 --> ErrorException: Access level to App\Modules\User\Controllers\KnowledgebaseController::respondWithRendered() must be protected (as in class App\Controllers\BaseController) or weaker
[Method: GET, Route: Knowledgebase]
in APPPATH/Modules/User/Controllers/KnowledgebaseController.php on line 535.
 1 [internal function]: CodeIgniter\Debug\Exceptions->shutdownHandler()
CRITICAL - 2026-03-30 04:17:10 --> [EXCEPTION] Access level to App\Modules\User\Controllers\KnowledgebaseController::respondWithRendered() must be protected (as in class App\Controllers\BaseController) or weaker File=/home/mymiteam/mymiwallet/site/current/app/Modules/User/Controllers/KnowledgebaseController.php Line=535
ERROR - 2026-03-30 04:17:10 --> [ERROR_PAGE] event=error_500 status=500 message=Internal server error.
DEBUG - 2026-03-30 04:19:58 --> [REQ_ID=7a3f5705afa1] [REQUEST][START] GET /index.php/Management/Alerts
DEBUG - 2026-03-30 04:19:58 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-30 04:19:58 --> [REQ_ID=7a3f5705afa1] [FILTER_BEFORE] /index.php/Management/Alerts
DEBUG - 2026-03-30 04:19:58 --> [REQ_ID=7a3f5705afa1] [ROUTE] Controller=\App\Modules\Management\Controllers\AlertsAdminController Method=index
DEBUG - 2026-03-30 04:19:58 --> [REQ_ID=7a3f5705afa1] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Management/Alerts
DEBUG - 2026-03-30 04:19:58 --> [CSRF] token name=csrf_test_name hash=97cf0b02fe487b8a243f8893e90c467f
DEBUG - 2026-03-30 04:19:58 --> [REQ_ID=7a3f5705afa1] [REQUEST][END]
INFO - 2026-03-30 04:19:58 --> [REQ_ID=7a3f5705afa1] [PERF] Execution time=0.055250
DEBUG - 2026-03-30 04:19:59 --> [REQ_ID=e1436613c9dc] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-30 04:19:59 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-30 04:19:59 --> [REQ_ID=e1436613c9dc] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-30 04:19:59 --> [REQ_ID=e1436613c9dc] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-30 04:19:59 --> [REQ_ID=e1436613c9dc] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-30 04:19:59 --> [CSRF] token name=csrf_test_name hash=f51418ea5b68343d8bbd33906e1b6ecd
DEBUG - 2026-03-30 04:19:59 --> [REQ_ID=f69ed3221ffb] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-30 04:19:59 --> [REQ_ID=f69ed3221ffb] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-30 04:19:59 --> [REQ_ID=e1436613c9dc] [FILTER_AFTER]
DEBUG - 2026-03-30 04:19:59 --> [REQ_ID=e1436613c9dc] [LIFECYCLE][END] status=200 duration_ms=185.74 memory_delta=0
INFO - 2026-03-30 04:19:59 --> [REQ_ID=f69ed3221ffb] [PERF] Execution time=0.185574
DEBUG - 2026-03-30 04:19:59 --> [REQ_ID=e1436613c9dc] [REQUEST][END]
INFO - 2026-03-30 04:19:59 --> [REQ_ID=e1436613c9dc] [PERF] Execution time=0.197502
DEBUG - 2026-03-30 04:21:22 --> [REQ_ID=8e6a0241a048] [REQUEST][START] HEAD /
DEBUG - 2026-03-30 04:21:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-30 04:21:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-30 04:21:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-30 04:21:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-30 04:21:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-30 04:21:41 --> [REQ_ID=cd00d3543367] [REQUEST][START] GET /
DEBUG - 2026-03-30 04:21:41 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-30 04:21:41 --> [REQ_ID=cd00d3543367] [FILTER_BEFORE] /
DEBUG - 2026-03-30 04:21:41 --> [REQ_ID=cd00d3543367] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-30 04:21:41 --> [REQ_ID=cd00d3543367] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-30 04:21:41 --> [CSRF] token name=csrf_test_name hash=55e2aba5a5f2531e57192a868cfffff5
DEBUG - 2026-03-30 04:21:41 --> [REQ_ID=5ddcc6d9d382] [INIT] App\Controllers\Home::GET
INFO - 2026-03-30 04:21:41 --> [REQ_ID=5ddcc6d9d382] [MEMORY][controller-start] 4194304
INFO - 2026-03-30 04:21:41 --> [REQ_ID=5ddcc6d9d382] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-30 04:21:41 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-30 04:21:42 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-03-30 04:21:42 --> [REQ_ID=5ddcc6d9d382] [VIEW_RENDER] themes/public/home
INFO - 2026-03-30 04:21:42 --> [REQ_ID=5ddcc6d9d382] [MEMORY][commonData:start] 8388608
INFO - 2026-03-30 04:21:42 --> themesMemory usage: 8388608
DEBUG - 2026-03-30 04:21:42 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-30 04:21:42 --> [REQ_ID=cd00d3543367] [FILTER_AFTER]
DEBUG - 2026-03-30 04:21:42 --> [REQ_ID=cd00d3543367] [LIFECYCLE][END] status=200 duration_ms=667.16 memory_delta=4194304
INFO - 2026-03-30 04:21:42 --> [REQ_ID=5ddcc6d9d382] [PERF] Execution time=0.665315
DEBUG - 2026-03-30 04:21:42 --> [REQ_ID=cd00d3543367] [REQUEST][END]
INFO - 2026-03-30 04:21:42 --> [REQ_ID=cd00d3543367] [PERF] Execution time=0.686503
DEBUG - 2026-03-30 04:21:53 --> [REQ_ID=c2bf360f5567] [REQUEST][START] GET /
DEBUG - 2026-03-30 04:21:53 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-30 04:21:53 --> [REQ_ID=c2bf360f5567] [FILTER_BEFORE] /
DEBUG - 2026-03-30 04:21:53 --> [REQ_ID=c2bf360f5567] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-30 04:21:53 --> [REQ_ID=c2bf360f5567] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-30 04:21:53 --> [CSRF] token name=csrf_test_name hash=3d710943c9a753929e2145d71b2cbea9
DEBUG - 2026-03-30 04:21:53 --> [REQ_ID=ccd6d584306c] [INIT] App\Controllers\Home::GET
INFO - 2026-03-30 04:21:53 --> [REQ_ID=ccd6d584306c] [MEMORY][controller-start] 6291456
INFO - 2026-03-30 04:21:53 --> [REQ_ID=ccd6d584306c] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-30 04:21:53 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-30 04:21:54 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
DEBUG - 2026-03-30 04:21:54 --> [REQ_ID=ccd6d584306c] [VIEW_RENDER] themes/public/home
INFO - 2026-03-30 04:21:54 --> [REQ_ID=ccd6d584306c] [MEMORY][commonData:start] 8388608
INFO - 2026-03-30 04:21:54 --> themesMemory usage: 8388608
DEBUG - 2026-03-30 04:21:54 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-30 04:21:54 --> [REQ_ID=c2bf360f5567] [FILTER_AFTER]
DEBUG - 2026-03-30 04:21:54 --> [REQ_ID=c2bf360f5567] [LIFECYCLE][END] status=200 duration_ms=495.45 memory_delta=2097152
INFO - 2026-03-30 04:21:54 --> [REQ_ID=ccd6d584306c] [PERF] Execution time=0.495208
DEBUG - 2026-03-30 04:21:54 --> [REQ_ID=c2bf360f5567] [REQUEST][END]
INFO - 2026-03-30 04:21:54 --> [REQ_ID=c2bf360f5567] [PERF] Execution time=0.505129
DEBUG - 2026-03-30 04:21:56 --> [REQ_ID=2eb18d5c5a53] [REQUEST][START] POST /index.php/register
DEBUG - 2026-03-30 04:21:56 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-30 04:21:56 --> [REQ_ID=2eb18d5c5a53] [FILTER_BEFORE] /index.php/register
DEBUG - 2026-03-30 04:21:56 --> [REQ_ID=2eb18d5c5a53] [ROUTE] Controller=\App\Controllers\AuthController Method=attemptRegister
DEBUG - 2026-03-30 04:21:56 --> [REQ_ID=2eb18d5c5a53] [LIFECYCLE][START] POST https://www.mymiwallet.com/index.php/register
DEBUG - 2026-03-30 04:21:56 --> [CSRF] token name=csrf_test_name hash=b5d10b12b8edad6e72a3e12637ebbb9e
DEBUG - 2026-03-30 04:21:56 --> [REQ_ID=2eb18d5c5a53] [REQUEST][END]
INFO - 2026-03-30 04:21:56 --> [REQ_ID=2eb18d5c5a53] [PERF] Execution time=0.012865
DEBUG - 2026-03-30 04:21:56 --> [REQ_ID=101b7525094f] [REQUEST][START] GET /index.php/register
DEBUG - 2026-03-30 04:21:56 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-30 04:21:56 --> [REQ_ID=101b7525094f] [FILTER_BEFORE] /index.php/register
DEBUG - 2026-03-30 04:21:56 --> [REQ_ID=101b7525094f] [ROUTE] Controller=\App\Controllers\AuthController Method=register
DEBUG - 2026-03-30 04:21:56 --> [REQ_ID=101b7525094f] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/register
DEBUG - 2026-03-30 04:21:56 --> [CSRF] token name=csrf_test_name hash=84f7aac96bb909e8bebe30d2dcb1412c
DEBUG - 2026-03-30 04:21:56 --> [REQ_ID=27c22e4a52d0] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-30 04:21:56 --> [REQ_ID=27c22e4a52d0] [MEMORY][controller-start] 4194304
INFO - 2026-03-30 04:21:56 --> [REGISTRATION] Form loaded
INFO - 2026-03-30 04:21:56 --> [REQ_ID=27c22e4a52d0] [PERF] Execution time=0.016201
DEBUG - 2026-03-30 04:21:57 --> [REQ_ID=bef01e744ced] [REQUEST][START] GET /index.php
DEBUG - 2026-03-30 04:21:57 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-30 04:21:57 --> [REQ_ID=bef01e744ced] [FILTER_BEFORE] /index.php
DEBUG - 2026-03-30 04:21:57 --> [REQ_ID=bef01e744ced] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-30 04:21:57 --> [REQ_ID=bef01e744ced] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-30 04:21:57 --> [CSRF] token name=csrf_test_name hash=a71e0f42c80087217f3b67a5977da1f2
DEBUG - 2026-03-30 04:21:57 --> [REQ_ID=7f092ab20b4b] [INIT] App\Controllers\Home::GET
INFO - 2026-03-30 04:21:57 --> [REQ_ID=7f092ab20b4b] [MEMORY][controller-start] 4194304
INFO - 2026-03-30 04:21:57 --> [REQ_ID=7f092ab20b4b] [MEMORY][commonData:start] 4194304
DEBUG - 2026-03-30 04:21:57 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-30 04:21:58 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
DEBUG - 2026-03-30 04:21:58 --> [REQ_ID=7f092ab20b4b] [VIEW_RENDER] themes/public/home
INFO - 2026-03-30 04:21:58 --> [REQ_ID=7f092ab20b4b] [MEMORY][commonData:start] 8388608
INFO - 2026-03-30 04:21:58 --> themesMemory usage: 8388608
DEBUG - 2026-03-30 04:21:58 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-30 04:21:58 --> [REQ_ID=bef01e744ced] [FILTER_AFTER]
DEBUG - 2026-03-30 04:21:58 --> [REQ_ID=bef01e744ced] [LIFECYCLE][END] status=200 duration_ms=575.89 memory_delta=4194304
INFO - 2026-03-30 04:21:58 --> [REQ_ID=7f092ab20b4b] [PERF] Execution time=0.575790
DEBUG - 2026-03-30 04:21:58 --> [REQ_ID=bef01e744ced] [REQUEST][END]
INFO - 2026-03-30 04:21:58 --> [REQ_ID=bef01e744ced] [PERF] Execution time=0.584379
DEBUG - 2026-03-30 04:21:59 --> [REQ_ID=45e87eb66de6] [REQUEST][START] POST /index.php/register
DEBUG - 2026-03-30 04:21:59 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-30 04:21:59 --> [REQ_ID=45e87eb66de6] [FILTER_BEFORE] /index.php/register
DEBUG - 2026-03-30 04:21:59 --> [REQ_ID=45e87eb66de6] [ROUTE] Controller=\App\Controllers\AuthController Method=attemptRegister
DEBUG - 2026-03-30 04:21:59 --> [REQ_ID=45e87eb66de6] [LIFECYCLE][START] POST https://www.mymiwallet.com/index.php/register
DEBUG - 2026-03-30 04:21:59 --> [CSRF] token name=csrf_test_name hash=0255f569a39ba80e0aab41c9c96a01d4
DEBUG - 2026-03-30 04:21:59 --> [REQ_ID=45e87eb66de6] [REQUEST][END]
INFO - 2026-03-30 04:21:59 --> [REQ_ID=45e87eb66de6] [PERF] Execution time=0.009700
DEBUG - 2026-03-30 04:22:00 --> [REQ_ID=1bee4fd1786d] [REQUEST][START] GET /index.php/register
DEBUG - 2026-03-30 04:22:00 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-30 04:22:00 --> [REQ_ID=1bee4fd1786d] [FILTER_BEFORE] /index.php/register
DEBUG - 2026-03-30 04:22:00 --> [REQ_ID=1bee4fd1786d] [ROUTE] Controller=\App\Controllers\AuthController Method=register
DEBUG - 2026-03-30 04:22:00 --> [REQ_ID=1bee4fd1786d] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/register
DEBUG - 2026-03-30 04:22:00 --> [CSRF] token name=csrf_test_name hash=e66e5ee98f1682334692a0a2d407e1d6
DEBUG - 2026-03-30 04:22:00 --> [REQ_ID=f5b24b234df7] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-30 04:22:00 --> [REQ_ID=f5b24b234df7] [MEMORY][controller-start] 4194304
INFO - 2026-03-30 04:22:00 --> [REGISTRATION] Form loaded
INFO - 2026-03-30 04:22:00 --> [REQ_ID=f5b24b234df7] [PERF] Execution time=0.014676
DEBUG - 2026-03-30 04:22:01 --> [REQ_ID=8cc23684aaca] [REQUEST][START] GET /index.php/Blog
DEBUG - 2026-03-30 04:22:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-30 04:22:01 --> [REQ_ID=8cc23684aaca] [FILTER_BEFORE] /index.php/Blog
DEBUG - 2026-03-30 04:22:01 --> [REQ_ID=8cc23684aaca] [ROUTE] Controller=\App\Modules\Blog\Controllers\BlogController Method=index
DEBUG - 2026-03-30 04:22:01 --> [REQ_ID=8cc23684aaca] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Blog
DEBUG - 2026-03-30 04:22:01 --> [CSRF] token name=csrf_test_name hash=d98d530882b7376134515d7a4369463d
DEBUG - 2026-03-30 04:22:01 --> [REQ_ID=057295d7399d] [INIT] App\Modules\Blog\Controllers\BlogController::GET
INFO - 2026-03-30 04:22:01 --> [REQ_ID=057295d7399d] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-30 04:22:01 --> [REQ_ID=057295d7399d] [METHOD_ENTRY] index
DEBUG - 2026-03-30 04:22:01 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-30 04:22:01 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-30 04:22:01 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-30 04:22:01 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-30 04:22:01 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-30 04:22:01 --> MyMICoin: guest context detected; skipping user-specific preload.
INFO - 2026-03-30 04:22:01 --> [REQ_ID=057295d7399d] [MEMORY][commonData:start] 4194304
INFO - 2026-03-30 04:22:01 --> [REQ_ID=057295d7399d] [PERF] Execution time=0.056968
DEBUG - 2026-03-30 04:22:02 --> [REQ_ID=6415b0a187a3] [REQUEST][START] GET /index.php/Dashboard
DEBUG - 2026-03-30 04:22:02 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-30 04:22:02 --> [REQ_ID=6415b0a187a3] [FILTER_BEFORE] /index.php/Dashboard
DEBUG - 2026-03-30 04:22:02 --> [REQ_ID=6415b0a187a3] [ROUTE] Controller=\App\Modules\User\Controllers\DashboardController Method=index
DEBUG - 2026-03-30 04:22:02 --> [REQ_ID=6415b0a187a3] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Dashboard
DEBUG - 2026-03-30 04:22:02 --> [CSRF] token name=csrf_test_name hash=16129b49c80965872a8fe1b2d0881e6e
DEBUG - 2026-03-30 04:22:02 --> [REQ_ID=6415b0a187a3] [REQUEST][END]
INFO - 2026-03-30 04:22:02 --> [REQ_ID=6415b0a187a3] [PERF] Execution time=0.013842
DEBUG - 2026-03-30 04:22:02 --> [REQ_ID=be6320819e27] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-30 04:22:02 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-30 04:22:02 --> [REQ_ID=be6320819e27] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-30 04:22:02 --> [REQ_ID=be6320819e27] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-30 04:22:02 --> [REQ_ID=be6320819e27] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-30 04:22:02 --> [CSRF] token name=csrf_test_name hash=63c1e4bd503e2aa9546aa136505c8cf0
DEBUG - 2026-03-30 04:22:02 --> [REQ_ID=1b838a1a7758] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-30 04:22:02 --> [REQ_ID=1b838a1a7758] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-30 04:22:02 --> [REQ_ID=be6320819e27] [FILTER_AFTER]
DEBUG - 2026-03-30 04:22:02 --> [REQ_ID=be6320819e27] [LIFECYCLE][END] status=200 duration_ms=20.96 memory_delta=0
INFO - 2026-03-30 04:22:02 --> [REQ_ID=1b838a1a7758] [PERF] Execution time=0.020771
DEBUG - 2026-03-30 04:22:02 --> [REQ_ID=be6320819e27] [REQUEST][END]
INFO - 2026-03-30 04:22:02 --> [REQ_ID=be6320819e27] [PERF] Execution time=0.030654
DEBUG - 2026-03-30 04:22:07 --> [REQ_ID=6f7f54f64ead] [REQUEST][START] GET /index.php/Free/register
DEBUG - 2026-03-30 04:22:07 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-30 04:22:07 --> [REQ_ID=6f7f54f64ead] [FILTER_BEFORE] /index.php/Free/register
DEBUG - 2026-03-30 04:22:07 --> [REQ_ID=6f7f54f64ead] [ROUTE] Controller=\App\Controllers\AuthController Method=register
DEBUG - 2026-03-30 04:22:07 --> [REQ_ID=6f7f54f64ead] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Free/register
DEBUG - 2026-03-30 04:22:07 --> [CSRF] token name=csrf_test_name hash=b02118c9c9b0dacbc58eff5a0547c063
DEBUG - 2026-03-30 04:22:07 --> [REQ_ID=2300d85048cb] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-30 04:22:07 --> [REQ_ID=2300d85048cb] [MEMORY][controller-start] 4194304
INFO - 2026-03-30 04:22:07 --> [REGISTRATION] Form loaded
INFO - 2026-03-30 04:22:07 --> [REQ_ID=2300d85048cb] [PERF] Execution time=0.025103
DEBUG - 2026-03-30 04:22:08 --> [REQ_ID=b70dcc72c1c6] [REQUEST][START] GET /index.php/How-It-Works
DEBUG - 2026-03-30 04:22:08 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-30 04:22:08 --> [REQ_ID=b70dcc72c1c6] [FILTER_BEFORE] /index.php/How-It-Works
DEBUG - 2026-03-30 04:22:08 --> [REQ_ID=b70dcc72c1c6] [ROUTE] Controller=\App\Modules\Blog\Controllers\HowItWorksController Method=index
DEBUG - 2026-03-30 04:22:08 --> [REQ_ID=b70dcc72c1c6] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/How-It-Works
DEBUG - 2026-03-30 04:22:08 --> [CSRF] token name=csrf_test_name hash=f0eef35956835099046dc868e0e8d5f2
DEBUG - 2026-03-30 04:22:08 --> [REQ_ID=bd651b4a08c7] [INIT] App\Modules\Blog\Controllers\HowItWorksController::GET
INFO - 2026-03-30 04:22:08 --> [REQ_ID=bd651b4a08c7] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-30 04:22:08 --> [REQ_ID=bd651b4a08c7] [METHOD_ENTRY] index
DEBUG - 2026-03-30 04:22:08 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-30 04:22:08 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-30 04:22:08 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-30 04:22:08 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-30 04:22:08 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-30 04:22:08 --> MyMICoin: guest context detected; skipping user-specific preload.
ERROR - 2026-03-30 04:22:08 --> HowItWorksController failure: overview
CRITICAL - 2026-03-30 04:22:08 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: GET, Route: How-It-Works]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-30 04:22:08 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-30 04:22:08 --> [404] URI=https://www.mymiwallet.com/index.php/How-It-Works
WARNING - 2026-03-30 04:22:08 --> 404 route miss: https://www.mymiwallet.com/index.php/How-It-Works | referrer: https://www.mymiwallet.com/index.php/How-It-Works
INFO - 2026-03-30 04:22:08 --> [REQ_ID=bd651b4a08c7] [PERF] Execution time=0.244770
DEBUG - 2026-03-30 04:22:09 --> [REQ_ID=c5f0fda0ab7c] [REQUEST][START] GET /index.php/How-It-Works/Automated-Financial-Insights
DEBUG - 2026-03-30 04:22:09 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-30 04:22:09 --> [REQ_ID=c5f0fda0ab7c] [FILTER_BEFORE] /index.php/How-It-Works/Automated-Financial-Insights
DEBUG - 2026-03-30 04:22:09 --> [REQ_ID=c5f0fda0ab7c] [ROUTE] Controller=\App\Modules\Blog\Controllers\HowItWorksController Method=show
DEBUG - 2026-03-30 04:22:09 --> [REQ_ID=c5f0fda0ab7c] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/How-It-Works/Automated-Financial-Insights
DEBUG - 2026-03-30 04:22:09 --> [CSRF] token name=csrf_test_name hash=0144862aa5aec3f358cf831edcba438c
DEBUG - 2026-03-30 04:22:09 --> [REQ_ID=0abf23798435] [INIT] App\Modules\Blog\Controllers\HowItWorksController::GET
INFO - 2026-03-30 04:22:09 --> [REQ_ID=0abf23798435] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-30 04:22:09 --> [REQ_ID=0abf23798435] [METHOD_ENTRY] show
DEBUG - 2026-03-30 04:22:09 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-30 04:22:09 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-30 04:22:09 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-30 04:22:09 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-30 04:22:09 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-30 04:22:09 --> MyMICoin: guest context detected; skipping user-specific preload.
ERROR - 2026-03-30 04:22:09 --> HowItWorksController failure: automated-financial-insights
CRITICAL - 2026-03-30 04:22:09 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: GET, Route: How-It-Works/Automated-Financial-Insights]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-30 04:22:09 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-30 04:22:09 --> [404] URI=https://www.mymiwallet.com/index.php/How-It-Works/Automated-Financial-Insights
WARNING - 2026-03-30 04:22:09 --> 404 route miss: https://www.mymiwallet.com/index.php/How-It-Works/Automated-Financial-Insights | referrer: https://www.mymiwallet.com/index.php/How-It-Works/Automated-Financial-Insights
INFO - 2026-03-30 04:22:09 --> [REQ_ID=0abf23798435] [PERF] Execution time=0.025106
DEBUG - 2026-03-30 04:22:10 --> [REQ_ID=1d156846c555] [REQUEST][START] GET /index.php/How-It-Works/Daily-Financial-News
DEBUG - 2026-03-30 04:22:10 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-30 04:22:10 --> [REQ_ID=1d156846c555] [FILTER_BEFORE] /index.php/How-It-Works/Daily-Financial-News
DEBUG - 2026-03-30 04:22:10 --> [REQ_ID=1d156846c555] [ROUTE] Controller=\App\Modules\Blog\Controllers\HowItWorksController Method=DailyFinancialNews
DEBUG - 2026-03-30 04:22:10 --> [REQ_ID=1d156846c555] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/How-It-Works/Daily-Financial-News
DEBUG - 2026-03-30 04:22:10 --> [CSRF] token name=csrf_test_name hash=586507922301506a1ceebcb2911e031a
DEBUG - 2026-03-30 04:22:10 --> [REQ_ID=aa1c89303086] [INIT] App\Modules\Blog\Controllers\HowItWorksController::GET
INFO - 2026-03-30 04:22:10 --> [REQ_ID=aa1c89303086] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-30 04:22:10 --> [REQ_ID=aa1c89303086] [METHOD_ENTRY] DailyFinancialNews
DEBUG - 2026-03-30 04:22:10 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-30 04:22:10 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-30 04:22:10 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-30 04:22:10 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-30 04:22:10 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-30 04:22:10 --> MyMICoin: guest context detected; skipping user-specific preload.
INFO - 2026-03-30 04:22:10 --> [REQ_ID=aa1c89303086] [MEMORY][commonData:start] 4194304
INFO - 2026-03-30 04:22:10 --> themesMemory usage: 8388608
DEBUG - 2026-03-30 04:22:10 --> [MetaService] slug=how-it-works/daily-financial-news pageName= cacheHit=1 path=CACHE
DEBUG - 2026-03-30 04:22:10 --> [REQ_ID=1d156846c555] [FILTER_AFTER]
DEBUG - 2026-03-30 04:22:10 --> [REQ_ID=1d156846c555] [LIFECYCLE][END] status=200 duration_ms=516.30 memory_delta=4194304
INFO - 2026-03-30 04:22:10 --> [REQ_ID=aa1c89303086] [PERF] Execution time=0.516044
DEBUG - 2026-03-30 04:22:10 --> [REQ_ID=1d156846c555] [REQUEST][END]
INFO - 2026-03-30 04:22:10 --> [REQ_ID=1d156846c555] [PERF] Execution time=0.525777
DEBUG - 2026-03-30 04:22:12 --> [REQ_ID=2ea6af13f367] [REQUEST][START] POST /index.php/register
DEBUG - 2026-03-30 04:22:12 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-30 04:22:12 --> [REQ_ID=2ea6af13f367] [FILTER_BEFORE] /index.php/register
DEBUG - 2026-03-30 04:22:12 --> [REQ_ID=2ea6af13f367] [ROUTE] Controller=\App\Controllers\AuthController Method=attemptRegister
DEBUG - 2026-03-30 04:22:12 --> [REQ_ID=2ea6af13f367] [LIFECYCLE][START] POST https://www.mymiwallet.com/index.php/register
DEBUG - 2026-03-30 04:22:12 --> [CSRF] token name=csrf_test_name hash=fde8edef0037ad398b9f1e7d27fcedae
DEBUG - 2026-03-30 04:22:12 --> [REQ_ID=2ea6af13f367] [REQUEST][END]
INFO - 2026-03-30 04:22:12 --> [REQ_ID=2ea6af13f367] [PERF] Execution time=0.010015
DEBUG - 2026-03-30 04:22:12 --> [REQ_ID=2976bf28b33b] [REQUEST][START] GET /index.php/register
DEBUG - 2026-03-30 04:22:12 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-30 04:22:12 --> [REQ_ID=2976bf28b33b] [FILTER_BEFORE] /index.php/register
DEBUG - 2026-03-30 04:22:12 --> [REQ_ID=2976bf28b33b] [ROUTE] Controller=\App\Controllers\AuthController Method=register
DEBUG - 2026-03-30 04:22:12 --> [REQ_ID=2976bf28b33b] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/register
DEBUG - 2026-03-30 04:22:12 --> [CSRF] token name=csrf_test_name hash=1c5e5f6d6240fdaa22fc85221e2c3e76
DEBUG - 2026-03-30 04:22:12 --> [REQ_ID=a3eae1be1968] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-30 04:22:12 --> [REQ_ID=a3eae1be1968] [MEMORY][controller-start] 4194304
INFO - 2026-03-30 04:22:12 --> [REGISTRATION] Form loaded
INFO - 2026-03-30 04:22:12 --> [REQ_ID=a3eae1be1968] [PERF] Execution time=0.012490
DEBUG - 2026-03-30 04:22:14 --> [REQ_ID=b22221c88372] [REQUEST][START] GET /index.php/How-It-Works/Investment-Dashboard
DEBUG - 2026-03-30 04:22:14 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-30 04:22:14 --> [REQ_ID=b22221c88372] [FILTER_BEFORE] /index.php/How-It-Works/Investment-Dashboard
DEBUG - 2026-03-30 04:22:14 --> [REQ_ID=b22221c88372] [ROUTE] Controller=\App\Modules\Blog\Controllers\HowItWorksController Method=show
DEBUG - 2026-03-30 04:22:14 --> [REQ_ID=b22221c88372] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/How-It-Works/Investment-Dashboard
DEBUG - 2026-03-30 04:22:14 --> [CSRF] token name=csrf_test_name hash=29b85c0f026d9b87ee8f8027adc19603
DEBUG - 2026-03-30 04:22:14 --> [REQ_ID=f622399c036a] [INIT] App\Modules\Blog\Controllers\HowItWorksController::GET
INFO - 2026-03-30 04:22:14 --> [REQ_ID=f622399c036a] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-30 04:22:14 --> [REQ_ID=f622399c036a] [METHOD_ENTRY] show
DEBUG - 2026-03-30 04:22:14 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-30 04:22:14 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-30 04:22:14 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-30 04:22:14 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-30 04:22:14 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-30 04:22:14 --> MyMICoin: guest context detected; skipping user-specific preload.
INFO - 2026-03-30 04:22:14 --> [REQ_ID=f622399c036a] [MEMORY][commonData:start] 4194304
DEBUG - 2026-03-30 04:22:14 --> [REQ_ID=b22221c88372] [FILTER_AFTER]
DEBUG - 2026-03-30 04:22:14 --> [REQ_ID=b22221c88372] [LIFECYCLE][END] status=200 duration_ms=504.50 memory_delta=4194304
INFO - 2026-03-30 04:22:14 --> [REQ_ID=f622399c036a] [PERF] Execution time=0.504449
DEBUG - 2026-03-30 04:22:14 --> [REQ_ID=b22221c88372] [REQUEST][END]
INFO - 2026-03-30 04:22:14 --> [REQ_ID=b22221c88372] [PERF] Execution time=0.515642
DEBUG - 2026-03-30 04:22:15 --> [REQ_ID=e62603ba09c0] [REQUEST][START] POST /index.php/register
DEBUG - 2026-03-30 04:22:15 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-30 04:22:15 --> [REQ_ID=e62603ba09c0] [FILTER_BEFORE] /index.php/register
DEBUG - 2026-03-30 04:22:15 --> [REQ_ID=e62603ba09c0] [ROUTE] Controller=\App\Controllers\AuthController Method=attemptRegister
DEBUG - 2026-03-30 04:22:15 --> [REQ_ID=e62603ba09c0] [LIFECYCLE][START] POST https://www.mymiwallet.com/index.php/register
DEBUG - 2026-03-30 04:22:15 --> [CSRF] token name=csrf_test_name hash=f46c4096df3e3092eba4a892cbaf1353
DEBUG - 2026-03-30 04:22:15 --> [REQ_ID=e62603ba09c0] [REQUEST][END]
INFO - 2026-03-30 04:22:15 --> [REQ_ID=e62603ba09c0] [PERF] Execution time=0.010665
DEBUG - 2026-03-30 04:22:16 --> [REQ_ID=ded49578531d] [REQUEST][START] GET /index.php/register
DEBUG - 2026-03-30 04:22:16 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-30 04:22:16 --> [REQ_ID=ded49578531d] [FILTER_BEFORE] /index.php/register
DEBUG - 2026-03-30 04:22:16 --> [REQ_ID=ded49578531d] [ROUTE] Controller=\App\Controllers\AuthController Method=register
DEBUG - 2026-03-30 04:22:16 --> [REQ_ID=ded49578531d] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/register
DEBUG - 2026-03-30 04:22:16 --> [CSRF] token name=csrf_test_name hash=8edd22a4d2f37c7153db639bfa949196
DEBUG - 2026-03-30 04:22:16 --> [REQ_ID=7986dbb192d7] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-30 04:22:16 --> [REQ_ID=7986dbb192d7] [MEMORY][controller-start] 4194304
INFO - 2026-03-30 04:22:16 --> [REGISTRATION] Form loaded
INFO - 2026-03-30 04:22:16 --> [REQ_ID=7986dbb192d7] [PERF] Execution time=0.019237
DEBUG - 2026-03-30 04:22:17 --> [REQ_ID=ecb0527830ee] [REQUEST][START] GET /index.php/How-It-Works/Investment-Portfolio-Management
DEBUG - 2026-03-30 04:22:17 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-30 04:22:17 --> [REQ_ID=ecb0527830ee] [FILTER_BEFORE] /index.php/How-It-Works/Investment-Portfolio-Management
DEBUG - 2026-03-30 04:22:17 --> [REQ_ID=ecb0527830ee] [ROUTE] Controller=\App\Modules\Blog\Controllers\HowItWorksController Method=InvestmentPortfolioManagement
DEBUG - 2026-03-30 04:22:17 --> [REQ_ID=ecb0527830ee] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/How-It-Works/Investment-Portfolio-Management
DEBUG - 2026-03-30 04:22:17 --> [CSRF] token name=csrf_test_name hash=0788321cfee6b232f82f3a5ee58f0d16
DEBUG - 2026-03-30 04:22:17 --> [REQ_ID=a5040e1ff306] [INIT] App\Modules\Blog\Controllers\HowItWorksController::GET
INFO - 2026-03-30 04:22:17 --> [REQ_ID=a5040e1ff306] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-30 04:22:17 --> [REQ_ID=a5040e1ff306] [METHOD_ENTRY] InvestmentPortfolioManagement
DEBUG - 2026-03-30 04:22:17 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-30 04:22:17 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-30 04:22:17 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-30 04:22:17 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-30 04:22:17 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-30 04:22:17 --> MyMICoin: guest context detected; skipping user-specific preload.
INFO - 2026-03-30 04:22:17 --> [REQ_ID=a5040e1ff306] [MEMORY][commonData:start] 4194304
INFO - 2026-03-30 04:22:17 --> themesMemory usage: 8388608
DEBUG - 2026-03-30 04:22:17 --> [MetaService] slug=how-it-works/investment-portfolio-management pageName= cacheHit=1 path=CACHE
DEBUG - 2026-03-30 04:22:17 --> [REQ_ID=ecb0527830ee] [FILTER_AFTER]
DEBUG - 2026-03-30 04:22:17 --> [REQ_ID=ecb0527830ee] [LIFECYCLE][END] status=200 duration_ms=521.78 memory_delta=4194304
INFO - 2026-03-30 04:22:17 --> [REQ_ID=a5040e1ff306] [PERF] Execution time=0.521534
DEBUG - 2026-03-30 04:22:17 --> [REQ_ID=ecb0527830ee] [REQUEST][END]
INFO - 2026-03-30 04:22:17 --> [REQ_ID=ecb0527830ee] [PERF] Execution time=0.532069
DEBUG - 2026-03-30 04:22:19 --> [REQ_ID=2ddc5be7b342] [REQUEST][START] POST /index.php/register
DEBUG - 2026-03-30 04:22:19 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-30 04:22:19 --> [REQ_ID=2ddc5be7b342] [FILTER_BEFORE] /index.php/register
DEBUG - 2026-03-30 04:22:19 --> [REQ_ID=2ddc5be7b342] [ROUTE] Controller=\App\Controllers\AuthController Method=attemptRegister
DEBUG - 2026-03-30 04:22:19 --> [REQ_ID=2ddc5be7b342] [LIFECYCLE][START] POST https://www.mymiwallet.com/index.php/register
DEBUG - 2026-03-30 04:22:19 --> [CSRF] token name=csrf_test_name hash=a2cbcda0e7d999f18e0097beffb9a22a
DEBUG - 2026-03-30 04:22:19 --> [REQ_ID=2ddc5be7b342] [REQUEST][END]
INFO - 2026-03-30 04:22:19 --> [REQ_ID=2ddc5be7b342] [PERF] Execution time=0.009596
DEBUG - 2026-03-30 04:22:19 --> [REQ_ID=6cbf8427350e] [REQUEST][START] GET /index.php/register
DEBUG - 2026-03-30 04:22:19 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-30 04:22:19 --> [REQ_ID=6cbf8427350e] [FILTER_BEFORE] /index.php/register
DEBUG - 2026-03-30 04:22:19 --> [REQ_ID=6cbf8427350e] [ROUTE] Controller=\App\Controllers\AuthController Method=register
DEBUG - 2026-03-30 04:22:19 --> [REQ_ID=6cbf8427350e] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/register
DEBUG - 2026-03-30 04:22:19 --> [CSRF] token name=csrf_test_name hash=b032f9f85811198791b47d3e0f53a644
DEBUG - 2026-03-30 04:22:19 --> [REQ_ID=7c8e1e09ae0c] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-30 04:22:19 --> [REQ_ID=7c8e1e09ae0c] [MEMORY][controller-start] 4194304
INFO - 2026-03-30 04:22:19 --> [REGISTRATION] Form loaded
INFO - 2026-03-30 04:22:19 --> [REQ_ID=7c8e1e09ae0c] [PERF] Execution time=0.013879
DEBUG - 2026-03-30 04:22:21 --> [REQ_ID=a762aa8fdf3e] [REQUEST][START] GET /index.php/How-It-Works/Investor-Profile
DEBUG - 2026-03-30 04:22:21 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-30 04:22:21 --> [REQ_ID=a762aa8fdf3e] [FILTER_BEFORE] /index.php/How-It-Works/Investor-Profile
DEBUG - 2026-03-30 04:22:21 --> [REQ_ID=a762aa8fdf3e] [ROUTE] Controller=\App\Modules\Blog\Controllers\HowItWorksController Method=show
DEBUG - 2026-03-30 04:22:21 --> [REQ_ID=a762aa8fdf3e] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/How-It-Works/Investor-Profile
DEBUG - 2026-03-30 04:22:21 --> [CSRF] token name=csrf_test_name hash=c9fb78329dbe447f1c102cbdd752452e
DEBUG - 2026-03-30 04:22:21 --> [REQ_ID=211eb48b3e69] [INIT] App\Modules\Blog\Controllers\HowItWorksController::GET
INFO - 2026-03-30 04:22:21 --> [REQ_ID=211eb48b3e69] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-30 04:22:21 --> [REQ_ID=211eb48b3e69] [METHOD_ENTRY] show
DEBUG - 2026-03-30 04:22:21 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-30 04:22:21 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-30 04:22:21 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-30 04:22:21 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-30 04:22:21 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-30 04:22:21 --> MyMICoin: guest context detected; skipping user-specific preload.
ERROR - 2026-03-30 04:22:21 --> HowItWorksController failure: investor-profile
CRITICAL - 2026-03-30 04:22:21 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: GET, Route: How-It-Works/Investor-Profile]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-30 04:22:21 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-30 04:22:21 --> [404] URI=https://www.mymiwallet.com/index.php/How-It-Works/Investor-Profile
WARNING - 2026-03-30 04:22:21 --> 404 route miss: https://www.mymiwallet.com/index.php/How-It-Works/Investor-Profile | referrer: https://www.mymiwallet.com/index.php/How-It-Works/Investor-Profile
INFO - 2026-03-30 04:22:21 --> [REQ_ID=211eb48b3e69] [PERF] Execution time=0.023976
DEBUG - 2026-03-30 04:22:22 --> [REQ_ID=a1c2d6e21d4d] [REQUEST][START] GET /index.php/How-It-Works/MyMI-Exchange
DEBUG - 2026-03-30 04:22:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-30 04:22:22 --> [REQ_ID=a1c2d6e21d4d] [FILTER_BEFORE] /index.php/How-It-Works/MyMI-Exchange
DEBUG - 2026-03-30 04:22:22 --> [REQ_ID=a1c2d6e21d4d] [ROUTE] Controller=\App\Modules\Blog\Controllers\HowItWorksController Method=show
DEBUG - 2026-03-30 04:22:22 --> [REQ_ID=a1c2d6e21d4d] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/How-It-Works/MyMI-Exchange
DEBUG - 2026-03-30 04:22:22 --> [CSRF] token name=csrf_test_name hash=d3b559f3f37be42a3dd7564cddeb0766
DEBUG - 2026-03-30 04:22:22 --> [REQ_ID=2b44fa353444] [INIT] App\Modules\Blog\Controllers\HowItWorksController::GET
INFO - 2026-03-30 04:22:22 --> [REQ_ID=2b44fa353444] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-30 04:22:22 --> [REQ_ID=2b44fa353444] [METHOD_ENTRY] show
DEBUG - 2026-03-30 04:22:22 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-30 04:22:22 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-30 04:22:22 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-30 04:22:22 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-30 04:22:22 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-30 04:22:22 --> MyMICoin: guest context detected; skipping user-specific preload.
INFO - 2026-03-30 04:22:22 --> [REQ_ID=2b44fa353444] [MEMORY][commonData:start] 4194304
DEBUG - 2026-03-30 04:22:23 --> [REQ_ID=a1c2d6e21d4d] [FILTER_AFTER]
DEBUG - 2026-03-30 04:22:23 --> [REQ_ID=a1c2d6e21d4d] [LIFECYCLE][END] status=200 duration_ms=470.14 memory_delta=4194304
INFO - 2026-03-30 04:22:23 --> [REQ_ID=2b44fa353444] [PERF] Execution time=0.470111
DEBUG - 2026-03-30 04:22:23 --> [REQ_ID=a1c2d6e21d4d] [REQUEST][END]
INFO - 2026-03-30 04:22:23 --> [REQ_ID=a1c2d6e21d4d] [PERF] Execution time=0.481434
DEBUG - 2026-03-30 04:22:24 --> [REQ_ID=0718d478fda1] [REQUEST][START] GET /index.php/How-It-Works/MyMI-Gold
DEBUG - 2026-03-30 04:22:24 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-30 04:22:24 --> [REQ_ID=0718d478fda1] [FILTER_BEFORE] /index.php/How-It-Works/MyMI-Gold
DEBUG - 2026-03-30 04:22:24 --> [REQ_ID=0718d478fda1] [ROUTE] Controller=\App\Modules\Blog\Controllers\HowItWorksController Method=MyMIGold
DEBUG - 2026-03-30 04:22:24 --> [REQ_ID=0718d478fda1] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/How-It-Works/MyMI-Gold
DEBUG - 2026-03-30 04:22:24 --> [CSRF] token name=csrf_test_name hash=0ff6b7d0e2cc45c44d1af0bff0463e17
DEBUG - 2026-03-30 04:22:24 --> [REQ_ID=f94c2b7d00cf] [INIT] App\Modules\Blog\Controllers\HowItWorksController::GET
INFO - 2026-03-30 04:22:24 --> [REQ_ID=f94c2b7d00cf] [MEMORY][controller-start] 6291456
DEBUG - 2026-03-30 04:22:24 --> [REQ_ID=f94c2b7d00cf] [METHOD_ENTRY] MyMIGold
DEBUG - 2026-03-30 04:22:24 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-30 04:22:24 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-30 04:22:24 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-30 04:22:24 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-30 04:22:24 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-30 04:22:24 --> MyMICoin: guest context detected; skipping user-specific preload.
INFO - 2026-03-30 04:22:24 --> [REQ_ID=f94c2b7d00cf] [MEMORY][commonData:start] 6291456
INFO - 2026-03-30 04:22:25 --> themesMemory usage: 8388608
DEBUG - 2026-03-30 04:22:25 --> [MetaService] slug=how-it-works/mymi-gold pageName= cacheHit= path=DB
DEBUG - 2026-03-30 04:22:25 --> [REQ_ID=0718d478fda1] [FILTER_AFTER]
DEBUG - 2026-03-30 04:22:25 --> [REQ_ID=0718d478fda1] [LIFECYCLE][END] status=200 duration_ms=543.98 memory_delta=2097152
INFO - 2026-03-30 04:22:25 --> [REQ_ID=f94c2b7d00cf] [PERF] Execution time=0.543817
DEBUG - 2026-03-30 04:22:25 --> [REQ_ID=0718d478fda1] [REQUEST][END]
INFO - 2026-03-30 04:22:25 --> [REQ_ID=0718d478fda1] [PERF] Execution time=0.554208
DEBUG - 2026-03-30 04:22:26 --> [REQ_ID=98485a4fbdcc] [REQUEST][START] GET /index.php/How-It-Works/Personal-Budgeting
DEBUG - 2026-03-30 04:22:26 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-30 04:22:26 --> [REQ_ID=98485a4fbdcc] [FILTER_BEFORE] /index.php/How-It-Works/Personal-Budgeting
DEBUG - 2026-03-30 04:22:26 --> [REQ_ID=98485a4fbdcc] [ROUTE] Controller=\App\Modules\Blog\Controllers\HowItWorksController Method=PersonalBudgeting
DEBUG - 2026-03-30 04:22:26 --> [REQ_ID=98485a4fbdcc] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/How-It-Works/Personal-Budgeting
DEBUG - 2026-03-30 04:22:26 --> [CSRF] token name=csrf_test_name hash=8266124f410c082c6b42119d086febdc
DEBUG - 2026-03-30 04:22:26 --> [REQ_ID=7e23b1d8248d] [INIT] App\Modules\Blog\Controllers\HowItWorksController::GET
INFO - 2026-03-30 04:22:26 --> [REQ_ID=7e23b1d8248d] [MEMORY][controller-start] 6291456
DEBUG - 2026-03-30 04:22:26 --> [REQ_ID=7e23b1d8248d] [METHOD_ENTRY] PersonalBudgeting
DEBUG - 2026-03-30 04:22:26 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-30 04:22:26 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-30 04:22:26 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-30 04:22:26 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-30 04:22:26 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-30 04:22:26 --> MyMICoin: guest context detected; skipping user-specific preload.
INFO - 2026-03-30 04:22:26 --> [REQ_ID=7e23b1d8248d] [MEMORY][commonData:start] 6291456
INFO - 2026-03-30 04:22:27 --> themesMemory usage: 8388608
DEBUG - 2026-03-30 04:22:27 --> [MetaService] slug=how-it-works/personal-budgeting pageName= cacheHit=1 path=CACHE
DEBUG - 2026-03-30 04:22:27 --> [REQ_ID=98485a4fbdcc] [FILTER_AFTER]
DEBUG - 2026-03-30 04:22:27 --> [REQ_ID=98485a4fbdcc] [LIFECYCLE][END] status=200 duration_ms=548.23 memory_delta=2097152
INFO - 2026-03-30 04:22:27 --> [REQ_ID=7e23b1d8248d] [PERF] Execution time=0.548044
DEBUG - 2026-03-30 04:22:27 --> [REQ_ID=98485a4fbdcc] [REQUEST][END]
INFO - 2026-03-30 04:22:27 --> [REQ_ID=98485a4fbdcc] [PERF] Execution time=0.557536
DEBUG - 2026-03-30 04:22:28 --> [REQ_ID=db63f96fe267] [REQUEST][START] POST /index.php/register
DEBUG - 2026-03-30 04:22:28 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-30 04:22:28 --> [REQ_ID=db63f96fe267] [FILTER_BEFORE] /index.php/register
DEBUG - 2026-03-30 04:22:28 --> [REQ_ID=db63f96fe267] [ROUTE] Controller=\App\Controllers\AuthController Method=attemptRegister
DEBUG - 2026-03-30 04:22:28 --> [REQ_ID=db63f96fe267] [LIFECYCLE][START] POST https://www.mymiwallet.com/index.php/register
DEBUG - 2026-03-30 04:22:28 --> [CSRF] token name=csrf_test_name hash=2e1a65b013b0fe851e221528568ef2b7
DEBUG - 2026-03-30 04:22:28 --> [REQ_ID=db63f96fe267] [REQUEST][END]
INFO - 2026-03-30 04:22:28 --> [REQ_ID=db63f96fe267] [PERF] Execution time=0.011887
DEBUG - 2026-03-30 04:22:28 --> [REQ_ID=f62363f0970d] [REQUEST][START] GET /index.php/register
DEBUG - 2026-03-30 04:22:28 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-30 04:22:28 --> [REQ_ID=f62363f0970d] [FILTER_BEFORE] /index.php/register
DEBUG - 2026-03-30 04:22:28 --> [REQ_ID=f62363f0970d] [ROUTE] Controller=\App\Controllers\AuthController Method=register
DEBUG - 2026-03-30 04:22:28 --> [REQ_ID=f62363f0970d] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/register
DEBUG - 2026-03-30 04:22:28 --> [CSRF] token name=csrf_test_name hash=6e561f898d5df0d7f76f16aeac31b22f
DEBUG - 2026-03-30 04:22:28 --> [REQ_ID=d3eed326bd6f] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-30 04:22:28 --> [REQ_ID=d3eed326bd6f] [MEMORY][controller-start] 4194304
INFO - 2026-03-30 04:22:28 --> [REGISTRATION] Form loaded
INFO - 2026-03-30 04:22:28 --> [REQ_ID=d3eed326bd6f] [PERF] Execution time=0.014901
DEBUG - 2026-03-30 04:22:29 --> [REQ_ID=16758d101b68] [REQUEST][START] GET /index.php/How-It-Works/Registering-An-Account
DEBUG - 2026-03-30 04:22:29 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-30 04:22:29 --> [REQ_ID=16758d101b68] [FILTER_BEFORE] /index.php/How-It-Works/Registering-An-Account
DEBUG - 2026-03-30 04:22:29 --> [REQ_ID=16758d101b68] [ROUTE] Controller=\App\Modules\Blog\Controllers\HowItWorksController Method=show
DEBUG - 2026-03-30 04:22:29 --> [REQ_ID=16758d101b68] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/How-It-Works/Registering-An-Account
DEBUG - 2026-03-30 04:22:29 --> [CSRF] token name=csrf_test_name hash=596a2b255925d60e87e5e57010f45a4c
DEBUG - 2026-03-30 04:22:29 --> [REQ_ID=0a8cef7fb2de] [INIT] App\Modules\Blog\Controllers\HowItWorksController::GET
INFO - 2026-03-30 04:22:29 --> [REQ_ID=0a8cef7fb2de] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-30 04:22:29 --> [REQ_ID=0a8cef7fb2de] [METHOD_ENTRY] show
DEBUG - 2026-03-30 04:22:29 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-30 04:22:29 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-30 04:22:29 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-30 04:22:29 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-30 04:22:29 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-30 04:22:29 --> MyMICoin: guest context detected; skipping user-specific preload.
INFO - 2026-03-30 04:22:29 --> [REQ_ID=0a8cef7fb2de] [MEMORY][commonData:start] 4194304
DEBUG - 2026-03-30 04:22:30 --> [REQ_ID=16758d101b68] [FILTER_AFTER]
DEBUG - 2026-03-30 04:22:30 --> [REQ_ID=16758d101b68] [LIFECYCLE][END] status=200 duration_ms=660.71 memory_delta=4194304
INFO - 2026-03-30 04:22:30 --> [REQ_ID=0a8cef7fb2de] [PERF] Execution time=0.660722
DEBUG - 2026-03-30 04:22:30 --> [REQ_ID=16758d101b68] [REQUEST][END]
INFO - 2026-03-30 04:22:30 --> [REQ_ID=16758d101b68] [PERF] Execution time=0.670584
DEBUG - 2026-03-30 04:22:30 --> [REQ_ID=8728d7d67c23] [REQUEST][START] GET /index.php/How-It-Works/Setting-Financial-Goals
DEBUG - 2026-03-30 04:22:30 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-30 04:22:30 --> [REQ_ID=8728d7d67c23] [FILTER_BEFORE] /index.php/How-It-Works/Setting-Financial-Goals
DEBUG - 2026-03-30 04:22:30 --> [REQ_ID=8728d7d67c23] [ROUTE] Controller=\App\Modules\Blog\Controllers\HowItWorksController Method=SettingFinancialGoals
DEBUG - 2026-03-30 04:22:30 --> [REQ_ID=8728d7d67c23] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/How-It-Works/Setting-Financial-Goals
DEBUG - 2026-03-30 04:22:30 --> [CSRF] token name=csrf_test_name hash=3652402fcb321cb727c728d214266659
DEBUG - 2026-03-30 04:22:30 --> [REQ_ID=23a6e86e9918] [INIT] App\Modules\Blog\Controllers\HowItWorksController::GET
INFO - 2026-03-30 04:22:30 --> [REQ_ID=23a6e86e9918] [MEMORY][controller-start] 6291456
DEBUG - 2026-03-30 04:22:30 --> [REQ_ID=23a6e86e9918] [METHOD_ENTRY] SettingFinancialGoals
DEBUG - 2026-03-30 04:22:30 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-30 04:22:30 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-30 04:22:30 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-30 04:22:30 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-30 04:22:30 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-30 04:22:30 --> MyMICoin: guest context detected; skipping user-specific preload.
INFO - 2026-03-30 04:22:30 --> [REQ_ID=23a6e86e9918] [MEMORY][commonData:start] 6291456
INFO - 2026-03-30 04:22:31 --> themesMemory usage: 8388608
DEBUG - 2026-03-30 04:22:31 --> [MetaService] slug=how-it-works/setting-financial-goals pageName= cacheHit= path=DB
DEBUG - 2026-03-30 04:22:31 --> [REQ_ID=8728d7d67c23] [FILTER_AFTER]
DEBUG - 2026-03-30 04:22:31 --> [REQ_ID=8728d7d67c23] [LIFECYCLE][END] status=200 duration_ms=601.63 memory_delta=2097152
INFO - 2026-03-30 04:22:31 --> [REQ_ID=23a6e86e9918] [PERF] Execution time=0.601403
DEBUG - 2026-03-30 04:22:31 --> [REQ_ID=8728d7d67c23] [REQUEST][END]
INFO - 2026-03-30 04:22:31 --> [REQ_ID=8728d7d67c23] [PERF] Execution time=0.613078
DEBUG - 2026-03-30 04:22:32 --> [REQ_ID=7157db4b483b] [REQUEST][START] GET /index.php/Knowledgebase
DEBUG - 2026-03-30 04:22:32 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-30 04:22:32 --> ErrorException: Access level to App\Modules\User\Controllers\KnowledgebaseController::respondWithRendered() must be protected (as in class App\Controllers\BaseController) or weaker
[Method: GET, Route: Knowledgebase]
in APPPATH/Modules/User/Controllers/KnowledgebaseController.php on line 535.
 1 [internal function]: CodeIgniter\Debug\Exceptions->shutdownHandler()
CRITICAL - 2026-03-30 04:22:32 --> [EXCEPTION] Access level to App\Modules\User\Controllers\KnowledgebaseController::respondWithRendered() must be protected (as in class App\Controllers\BaseController) or weaker File=/home/mymiteam/mymiwallet/site/current/app/Modules/User/Controllers/KnowledgebaseController.php Line=535
DEBUG - 2026-03-30 04:22:33 --> [REQ_ID=455f78a9ac14] [REQUEST][START] GET /index.php/Legal/Privacy-Policy
DEBUG - 2026-03-30 04:22:33 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-30 04:22:33 --> [REQ_ID=455f78a9ac14] [FILTER_BEFORE] /index.php/Legal/Privacy-Policy
DEBUG - 2026-03-30 04:22:33 --> [REQ_ID=455f78a9ac14] [ROUTE] Controller=\App\Controllers\Home Method=privacyPolicy
DEBUG - 2026-03-30 04:22:33 --> [REQ_ID=455f78a9ac14] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Legal/Privacy-Policy
DEBUG - 2026-03-30 04:22:33 --> [CSRF] token name=csrf_test_name hash=6db7cc0e63908df87b9a9fb53ebda384
DEBUG - 2026-03-30 04:22:33 --> [REQ_ID=455f78a9ac14] [REQUEST][END]
INFO - 2026-03-30 04:22:33 --> [REQ_ID=455f78a9ac14] [PERF] Execution time=0.009755
DEBUG - 2026-03-30 04:22:33 --> [REQ_ID=68f3b0106592] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-30 04:22:33 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-30 04:22:33 --> [REQ_ID=68f3b0106592] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-30 04:22:33 --> [REQ_ID=68f3b0106592] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-30 04:22:33 --> [REQ_ID=68f3b0106592] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-30 04:22:33 --> [CSRF] token name=csrf_test_name hash=be86c02dd28ffc0af3aebc9018275f85
DEBUG - 2026-03-30 04:22:33 --> [REQ_ID=1ee2c362949c] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-30 04:22:33 --> [REQ_ID=1ee2c362949c] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-30 04:22:33 --> [REQ_ID=68f3b0106592] [FILTER_AFTER]
DEBUG - 2026-03-30 04:22:33 --> [REQ_ID=68f3b0106592] [LIFECYCLE][END] status=200 duration_ms=19.33 memory_delta=0
INFO - 2026-03-30 04:22:33 --> [REQ_ID=1ee2c362949c] [PERF] Execution time=0.019250
DEBUG - 2026-03-30 04:22:33 --> [REQ_ID=68f3b0106592] [REQUEST][END]
INFO - 2026-03-30 04:22:33 --> [REQ_ID=68f3b0106592] [PERF] Execution time=0.028468
DEBUG - 2026-03-30 04:22:34 --> [REQ_ID=297e4a1d7df5] [REQUEST][START] GET /index.php/Legal/Terms-And-Conditions
DEBUG - 2026-03-30 04:22:34 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-30 04:22:34 --> [REQ_ID=297e4a1d7df5] [FILTER_BEFORE] /index.php/Legal/Terms-And-Conditions
DEBUG - 2026-03-30 04:22:34 --> [REQ_ID=297e4a1d7df5] [ROUTE] Controller=\App\Controllers\Home Method=terms
DEBUG - 2026-03-30 04:22:34 --> [REQ_ID=297e4a1d7df5] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Legal/Terms-And-Conditions
DEBUG - 2026-03-30 04:22:34 --> [CSRF] token name=csrf_test_name hash=76504639c287ce2e1fd2edf5ecca9f84
DEBUG - 2026-03-30 04:22:34 --> [REQ_ID=297e4a1d7df5] [REQUEST][END]
INFO - 2026-03-30 04:22:34 --> [REQ_ID=297e4a1d7df5] [PERF] Execution time=0.010225
DEBUG - 2026-03-30 04:22:35 --> [REQ_ID=3e3f169ef457] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-30 04:22:35 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-30 04:22:35 --> [REQ_ID=3e3f169ef457] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-30 04:22:35 --> [REQ_ID=3e3f169ef457] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-30 04:22:35 --> [REQ_ID=3e3f169ef457] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-30 04:22:35 --> [CSRF] token name=csrf_test_name hash=8d21f183627bdf3b7751199c3ae6f402
DEBUG - 2026-03-30 04:22:35 --> [REQ_ID=fa6e460f1af6] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-30 04:22:35 --> [REQ_ID=fa6e460f1af6] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-30 04:22:35 --> [REQ_ID=3e3f169ef457] [FILTER_AFTER]
DEBUG - 2026-03-30 04:22:35 --> [REQ_ID=3e3f169ef457] [LIFECYCLE][END] status=200 duration_ms=16.25 memory_delta=0
INFO - 2026-03-30 04:22:35 --> [REQ_ID=fa6e460f1af6] [PERF] Execution time=0.016065
DEBUG - 2026-03-30 04:22:35 --> [REQ_ID=3e3f169ef457] [REQUEST][END]
INFO - 2026-03-30 04:22:35 --> [REQ_ID=3e3f169ef457] [PERF] Execution time=0.025146
DEBUG - 2026-03-30 04:22:36 --> [REQ_ID=e75fd7c94e33] [REQUEST][START] GET /index.php/Privacy-Policy
DEBUG - 2026-03-30 04:22:36 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-30 04:22:36 --> [REQ_ID=e75fd7c94e33] [FILTER_BEFORE] /index.php/Privacy-Policy
DEBUG - 2026-03-30 04:22:36 --> [REQ_ID=e75fd7c94e33] [ROUTE] Controller=\App\Controllers\Home Method=privacyPolicy
DEBUG - 2026-03-30 04:22:36 --> [REQ_ID=e75fd7c94e33] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Privacy-Policy
DEBUG - 2026-03-30 04:22:36 --> [CSRF] token name=csrf_test_name hash=112e4a8bc248b196046c5ffab98c439b
DEBUG - 2026-03-30 04:22:36 --> [REQ_ID=2d4b79869bfb] [INIT] App\Controllers\Home::GET
INFO - 2026-03-30 04:22:36 --> [REQ_ID=2d4b79869bfb] [MEMORY][controller-start] 4194304
INFO - 2026-03-30 04:22:36 --> [REQ_ID=2d4b79869bfb] [MEMORY][commonData:start] 4194304
DEBUG - 2026-03-30 04:22:36 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-30 04:22:36 --> [MetaService] slug=privacy-policy pageName= cacheHit= path=DB
DEBUG - 2026-03-30 04:22:36 --> [REQ_ID=2d4b79869bfb] [VIEW_RENDER] themes/public/privacyPolicy
INFO - 2026-03-30 04:22:36 --> [REQ_ID=2d4b79869bfb] [MEMORY][commonData:start] 8388608
INFO - 2026-03-30 04:22:36 --> themesMemory usage: 8388608
DEBUG - 2026-03-30 04:22:36 --> [MetaService] slug=privacy-policy pageName=Privacy Policy cacheHit= path=DB
DEBUG - 2026-03-30 04:22:36 --> [REQ_ID=e75fd7c94e33] [FILTER_AFTER]
DEBUG - 2026-03-30 04:22:36 --> [REQ_ID=e75fd7c94e33] [LIFECYCLE][END] status=200 duration_ms=516.62 memory_delta=4194304
INFO - 2026-03-30 04:22:36 --> [REQ_ID=2d4b79869bfb] [PERF] Execution time=0.516447
DEBUG - 2026-03-30 04:22:36 --> [REQ_ID=e75fd7c94e33] [REQUEST][END]
INFO - 2026-03-30 04:22:36 --> [REQ_ID=e75fd7c94e33] [PERF] Execution time=0.526127
DEBUG - 2026-03-30 04:22:38 --> [REQ_ID=ebd041064874] [REQUEST][START] GET /index.php/Support
DEBUG - 2026-03-30 04:22:38 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-30 04:22:38 --> [REQ_ID=ebd041064874] [FILTER_BEFORE] /index.php/Support
DEBUG - 2026-03-30 04:22:38 --> [REQ_ID=ebd041064874] [ROUTE] Controller=\App\Modules\Support\Controllers\SupportController Method=index
DEBUG - 2026-03-30 04:22:38 --> [REQ_ID=ebd041064874] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Support
DEBUG - 2026-03-30 04:22:38 --> [CSRF] token name=csrf_test_name hash=a4654c8057eff7da5bb3175223e4462f
DEBUG - 2026-03-30 04:22:38 --> [REQ_ID=95d3240379ed] [INIT] App\Modules\Support\Controllers\SupportController::GET
INFO - 2026-03-30 04:22:38 --> [REQ_ID=95d3240379ed] [MEMORY][controller-start] 6291456
DEBUG - 2026-03-30 04:22:38 --> [REQ_ID=95d3240379ed] [METHOD_ENTRY] index
DEBUG - 2026-03-30 04:22:38 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-30 04:22:38 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-30 04:22:38 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-30 04:22:38 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-30 04:22:38 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-30 04:22:38 --> MyMICoin: guest context detected; skipping user-specific preload.
INFO - 2026-03-30 04:22:38 --> [REQ_ID=95d3240379ed] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-30 04:22:38 --> [REQ_ID=95d3240379ed] [VIEW_RENDER] SupportModule\Views\Support\index
INFO - 2026-03-30 04:22:38 --> [REQ_ID=95d3240379ed] [MEMORY][commonData:start] 6291456
INFO - 2026-03-30 04:22:38 --> themesMemory usage: 6291456
DEBUG - 2026-03-30 04:22:38 --> [REQ_ID=ebd041064874] [FILTER_AFTER]
DEBUG - 2026-03-30 04:22:38 --> [REQ_ID=ebd041064874] [LIFECYCLE][END] status=200 duration_ms=30.96 memory_delta=0
INFO - 2026-03-30 04:22:38 --> [REQ_ID=95d3240379ed] [PERF] Execution time=0.030815
DEBUG - 2026-03-30 04:22:38 --> [REQ_ID=ebd041064874] [REQUEST][END]
INFO - 2026-03-30 04:22:38 --> [REQ_ID=ebd041064874] [PERF] Execution time=0.041052
DEBUG - 2026-03-30 04:22:39 --> [REQ_ID=74baed9f543c] [REQUEST][START] GET /index.php/Terms-Of-Service
DEBUG - 2026-03-30 04:22:39 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-30 04:22:39 --> [REQ_ID=74baed9f543c] [FILTER_BEFORE] /index.php/Terms-Of-Service
DEBUG - 2026-03-30 04:22:39 --> [REQ_ID=74baed9f543c] [ROUTE] Controller=\App\Controllers\Home Method=termsOfService
DEBUG - 2026-03-30 04:22:39 --> [REQ_ID=74baed9f543c] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Terms-Of-Service
DEBUG - 2026-03-30 04:22:39 --> [CSRF] token name=csrf_test_name hash=98a1d11e103964c633784528759e3545
DEBUG - 2026-03-30 04:22:39 --> [REQ_ID=5eb69e8c639f] [INIT] App\Controllers\Home::GET
INFO - 2026-03-30 04:22:39 --> [REQ_ID=5eb69e8c639f] [MEMORY][controller-start] 4194304
INFO - 2026-03-30 04:22:39 --> [REQ_ID=5eb69e8c639f] [MEMORY][commonData:start] 4194304
DEBUG - 2026-03-30 04:22:39 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-30 04:22:39 --> [MetaService] slug=terms-of-service pageName= cacheHit= path=DB
DEBUG - 2026-03-30 04:22:39 --> [REQ_ID=5eb69e8c639f] [VIEW_RENDER] themes/public/termsOfService
INFO - 2026-03-30 04:22:39 --> [REQ_ID=5eb69e8c639f] [MEMORY][commonData:start] 8388608
INFO - 2026-03-30 04:22:39 --> themesMemory usage: 8388608
DEBUG - 2026-03-30 04:22:39 --> [MetaService] slug=terms-of-service pageName=Terms of Service cacheHit= path=DB
DEBUG - 2026-03-30 04:22:39 --> [REQ_ID=74baed9f543c] [FILTER_AFTER]
DEBUG - 2026-03-30 04:22:39 --> [REQ_ID=74baed9f543c] [LIFECYCLE][END] status=200 duration_ms=617.77 memory_delta=4194304
INFO - 2026-03-30 04:22:39 --> [REQ_ID=5eb69e8c639f] [PERF] Execution time=0.617692
DEBUG - 2026-03-30 04:22:39 --> [REQ_ID=74baed9f543c] [REQUEST][END]
INFO - 2026-03-30 04:22:39 --> [REQ_ID=74baed9f543c] [PERF] Execution time=0.629183
DEBUG - 2026-03-30 04:22:41 --> [REQ_ID=e9316b4067bb] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-30 04:22:41 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-30 04:22:41 --> [REQ_ID=e9316b4067bb] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-30 04:22:41 --> [REQ_ID=e9316b4067bb] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-30 04:22:41 --> [REQ_ID=e9316b4067bb] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-30 04:22:41 --> [CSRF] token name=csrf_test_name hash=e2725c092c8ab9b30458a92ab605c7c1
DEBUG - 2026-03-30 04:22:41 --> [REQ_ID=409d5e69d53c] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-30 04:22:41 --> [REQ_ID=409d5e69d53c] [MEMORY][controller-start] 6291456
DEBUG - 2026-03-30 04:22:41 --> [REQ_ID=e9316b4067bb] [FILTER_AFTER]
DEBUG - 2026-03-30 04:22:41 --> [REQ_ID=e9316b4067bb] [LIFECYCLE][END] status=200 duration_ms=20.49 memory_delta=0
INFO - 2026-03-30 04:22:41 --> [REQ_ID=409d5e69d53c] [PERF] Execution time=0.020443
DEBUG - 2026-03-30 04:22:41 --> [REQ_ID=e9316b4067bb] [REQUEST][END]
INFO - 2026-03-30 04:22:41 --> [REQ_ID=e9316b4067bb] [PERF] Execution time=0.029909
DEBUG - 2026-03-30 04:26:22 --> [REQ_ID=d1339dd4e099] [REQUEST][START] GET /index.php/Preview/Alert/IMNN
DEBUG - 2026-03-30 04:26:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-30 04:26:22 --> [REQ_ID=d1339dd4e099] [FILTER_BEFORE] /index.php/Preview/Alert/IMNN
DEBUG - 2026-03-30 04:26:22 --> [REQ_ID=d1339dd4e099] [ROUTE] Controller=\App\Modules\User\Controllers\AlertsController Method=preview
DEBUG - 2026-03-30 04:26:22 --> [REQ_ID=d1339dd4e099] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Preview/Alert/IMNN
DEBUG - 2026-03-30 04:26:22 --> [CSRF] token name=csrf_test_name hash=876de94b035b6a4482543f3332a02892
DEBUG - 2026-03-30 04:26:22 --> [REQ_ID=bf6d18ac5797] [INIT] App\Modules\User\Controllers\AlertsController::GET
INFO - 2026-03-30 04:26:22 --> [REQ_ID=bf6d18ac5797] [MEMORY][controller-start] 6291456
DEBUG - 2026-03-30 04:26:22 --> [REQ_ID=bf6d18ac5797] [METHOD_ENTRY] preview
DEBUG - 2026-03-30 04:26:22 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-30 04:26:22 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-30 04:26:22 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-30 04:26:22 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-30 04:26:22 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-30 04:26:22 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-30 04:26:22 --> MyMIInvestments: no session user detected; skipping personalized hydration.
DEBUG - 2026-03-30 04:26:22 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-30 04:26:22 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-30 04:26:22 --> MyMIMarketing: Pscrape library not installed; Google search scraping will use fallback.
DEBUG - 2026-03-30 04:26:22 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-30 04:26:22 --> MyMIAlerts: no authenticated user context detected.
DEBUG - 2026-03-30 04:26:22 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-30 04:26:22 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-30 04:26:22 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-30 04:26:22 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-30 04:26:22 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-30 04:26:22 --> [SERVICE] App\Services\BudgetService ::setUserId
INFO - 2026-03-30 04:26:22 --> [REQ_ID=bf6d18ac5797] [MEMORY][commonData:start] 8388608
DEBUG - 2026-03-30 04:26:22 --> MyMIInvestments: no session user detected; skipping personalized hydration.
DEBUG - 2026-03-30 04:26:22 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-30 04:26:22 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-30 04:26:22 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-30 04:26:22 --> MyMIAlerts: no authenticated user context detected.
INFO - 2026-03-30 04:26:22 --> Premium entitlement guest: user_id= route=/index.php/Preview/Alert/IMNN feature= tier=free status=free allowed=yes reason=Guest access allowed for this feature.
INFO - 2026-03-30 04:26:22 --> AlertsModel L404 - Alert updated successfully for ID 9368: Array
(
    [price] => 2.72
    [current_price] => 2.72
    [last_updated] => 2026-03-30 04:26:22
    [last_updated_time] => 2026-03-30 04:26:22
)

INFO - 2026-03-30 04:26:22 --> 🔄 Trying AlphaVantage for IMNN...
INFO - 2026-03-30 04:26:22 --> ✅ Alert snapshot inserted for IMNN with trade_id 9368
DEBUG - 2026-03-30 04:26:22 --> [REQ_ID=bf6d18ac5797] [VIEW_RENDER] themes/public/previewAlert
INFO - 2026-03-30 04:26:22 --> [REQ_ID=bf6d18ac5797] [MEMORY][commonData:start] 8388608
INFO - 2026-03-30 04:26:22 --> themesMemory usage: 8388608
DEBUG - 2026-03-30 04:26:22 --> [REQ_ID=d1339dd4e099] [FILTER_AFTER]
DEBUG - 2026-03-30 04:26:22 --> [REQ_ID=d1339dd4e099] [LIFECYCLE][END] status=200 duration_ms=546.94 memory_delta=2097152
INFO - 2026-03-30 04:26:22 --> [REQ_ID=bf6d18ac5797] [PERF] Execution time=0.544854
DEBUG - 2026-03-30 04:26:22 --> [REQ_ID=d1339dd4e099] [REQUEST][END]
INFO - 2026-03-30 04:26:22 --> [REQ_ID=d1339dd4e099] [PERF] Execution time=0.587213
DEBUG - 2026-03-30 04:26:23 --> [REQ_ID=169db47e3da3] [REQUEST][START] HEAD /
DEBUG - 2026-03-30 04:26:23 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-30 04:26:23 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-30 04:26:23 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-30 04:26:23 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-30 04:26:23 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-30 04:31:22 --> [REQ_ID=b7c905cc84a1] [REQUEST][START] HEAD /
DEBUG - 2026-03-30 04:31:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-30 04:31:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-30 04:31:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-30 04:31:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-30 04:31:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-30 04:32:21 --> [REQ_ID=52225744e0b7] [REQUEST][START] GET /
DEBUG - 2026-03-30 04:32:21 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-30 04:32:21 --> [REQ_ID=52225744e0b7] [FILTER_BEFORE] /
DEBUG - 2026-03-30 04:32:21 --> [REQ_ID=52225744e0b7] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-30 04:32:21 --> [REQ_ID=52225744e0b7] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-30 04:32:21 --> [CSRF] token name=csrf_test_name hash=23afb521275deb95e78800d68f9293fb
DEBUG - 2026-03-30 04:32:21 --> [REQ_ID=77c227e9b96b] [INIT] App\Controllers\Home::GET
INFO - 2026-03-30 04:32:21 --> [REQ_ID=77c227e9b96b] [MEMORY][controller-start] 4194304
INFO - 2026-03-30 04:32:21 --> [REQ_ID=77c227e9b96b] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-30 04:32:21 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-30 04:32:21 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
DEBUG - 2026-03-30 04:32:21 --> [REQ_ID=77c227e9b96b] [VIEW_RENDER] themes/public/home
INFO - 2026-03-30 04:32:21 --> [REQ_ID=77c227e9b96b] [MEMORY][commonData:start] 8388608
INFO - 2026-03-30 04:32:21 --> themesMemory usage: 8388608
DEBUG - 2026-03-30 04:32:21 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-30 04:32:21 --> [REQ_ID=52225744e0b7] [FILTER_AFTER]
DEBUG - 2026-03-30 04:32:21 --> [REQ_ID=52225744e0b7] [LIFECYCLE][END] status=200 duration_ms=549.19 memory_delta=4194304
INFO - 2026-03-30 04:32:21 --> [REQ_ID=77c227e9b96b] [PERF] Execution time=0.547277
DEBUG - 2026-03-30 04:32:21 --> [REQ_ID=52225744e0b7] [REQUEST][END]
INFO - 2026-03-30 04:32:21 --> [REQ_ID=52225744e0b7] [PERF] Execution time=0.567944
DEBUG - 2026-03-30 04:32:35 --> [REQ_ID=fef22c8c2d39] [REQUEST][START] GET /
DEBUG - 2026-03-30 04:32:35 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-30 04:32:35 --> [REQ_ID=fef22c8c2d39] [FILTER_BEFORE] /
DEBUG - 2026-03-30 04:32:35 --> [REQ_ID=fef22c8c2d39] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-30 04:32:35 --> [REQ_ID=fef22c8c2d39] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-30 04:32:35 --> [CSRF] token name=csrf_test_name hash=f1218e109310901c4664696cbd0de6ce
DEBUG - 2026-03-30 04:32:35 --> [REQ_ID=62c3a134eee5] [INIT] App\Controllers\Home::GET
INFO - 2026-03-30 04:32:35 --> [REQ_ID=62c3a134eee5] [MEMORY][controller-start] 6291456
INFO - 2026-03-30 04:32:35 --> [REQ_ID=62c3a134eee5] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-30 04:32:35 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-30 04:32:36 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
DEBUG - 2026-03-30 04:32:36 --> [REQ_ID=62c3a134eee5] [VIEW_RENDER] themes/public/home
INFO - 2026-03-30 04:32:36 --> [REQ_ID=62c3a134eee5] [MEMORY][commonData:start] 8388608
INFO - 2026-03-30 04:32:36 --> themesMemory usage: 8388608
DEBUG - 2026-03-30 04:32:36 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-30 04:32:36 --> [REQ_ID=fef22c8c2d39] [FILTER_AFTER]
DEBUG - 2026-03-30 04:32:36 --> [REQ_ID=fef22c8c2d39] [LIFECYCLE][END] status=200 duration_ms=545.26 memory_delta=2097152
INFO - 2026-03-30 04:32:36 --> [REQ_ID=62c3a134eee5] [PERF] Execution time=0.545077
DEBUG - 2026-03-30 04:32:36 --> [REQ_ID=fef22c8c2d39] [REQUEST][END]
INFO - 2026-03-30 04:32:36 --> [REQ_ID=fef22c8c2d39] [PERF] Execution time=0.554388
DEBUG - 2026-03-30 04:36:22 --> [REQ_ID=c77b1979903c] [REQUEST][START] HEAD /
DEBUG - 2026-03-30 04:36:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-30 04:36:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-30 04:36:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-30 04:36:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-30 04:36:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-30 04:38:10 --> [REQ_ID=302c8b174fb7] [REQUEST][START] GET /index.php/Account/Connected-Accounts
DEBUG - 2026-03-30 04:38:10 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-30 04:38:10 --> [REQ_ID=302c8b174fb7] [FILTER_BEFORE] /index.php/Account/Connected-Accounts
DEBUG - 2026-03-30 04:38:10 --> [REQ_ID=302c8b174fb7] [ROUTE] Controller=\App\Modules\User\Controllers\DashboardController Method=connectedAccounts
DEBUG - 2026-03-30 04:38:10 --> [REQ_ID=302c8b174fb7] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Account/Connected-Accounts
DEBUG - 2026-03-30 04:38:10 --> [CSRF] token name=csrf_test_name hash=00e2164589c180d34a8d85a7eec53be2
DEBUG - 2026-03-30 04:38:10 --> [REQ_ID=302c8b174fb7] [REQUEST][END]
INFO - 2026-03-30 04:38:10 --> [REQ_ID=302c8b174fb7] [PERF] Execution time=0.030929
DEBUG - 2026-03-30 04:38:10 --> [REQ_ID=64e43b085402] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-30 04:38:10 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-30 04:38:10 --> [REQ_ID=64e43b085402] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-30 04:38:10 --> [REQ_ID=64e43b085402] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-30 04:38:10 --> [REQ_ID=64e43b085402] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-30 04:38:10 --> [CSRF] token name=csrf_test_name hash=3260045da93089d6332691e73f7ef7df
DEBUG - 2026-03-30 04:38:10 --> [REQ_ID=2b34840fedf1] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-30 04:38:10 --> [REQ_ID=2b34840fedf1] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-30 04:38:10 --> [REQ_ID=64e43b085402] [FILTER_AFTER]
DEBUG - 2026-03-30 04:38:10 --> [REQ_ID=64e43b085402] [LIFECYCLE][END] status=200 duration_ms=187.13 memory_delta=0
INFO - 2026-03-30 04:38:10 --> [REQ_ID=2b34840fedf1] [PERF] Execution time=0.187214
DEBUG - 2026-03-30 04:38:10 --> [REQ_ID=64e43b085402] [REQUEST][END]
INFO - 2026-03-30 04:38:10 --> [REQ_ID=64e43b085402] [PERF] Execution time=0.199335
DEBUG - 2026-03-30 04:41:22 --> [REQ_ID=82d64eb8e494] [REQUEST][START] HEAD /
DEBUG - 2026-03-30 04:41:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-30 04:41:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-30 04:41:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-30 04:41:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-30 04:41:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-30 04:41:34 --> [REQ_ID=e6d284250299] [REQUEST][START] GET /index.php
DEBUG - 2026-03-30 04:41:34 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-30 04:41:34 --> [REQ_ID=e6d284250299] [FILTER_BEFORE] /index.php
DEBUG - 2026-03-30 04:41:34 --> [REQ_ID=e6d284250299] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-30 04:41:34 --> [REQ_ID=e6d284250299] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-30 04:41:34 --> [CSRF] token name=csrf_test_name hash=72311fc94186689a1b0b9545736032ab
DEBUG - 2026-03-30 04:41:34 --> [REQ_ID=95b2d8607ab9] [INIT] App\Controllers\Home::GET
INFO - 2026-03-30 04:41:34 --> [REQ_ID=95b2d8607ab9] [MEMORY][controller-start] 4194304
INFO - 2026-03-30 04:41:34 --> [REQ_ID=95b2d8607ab9] [MEMORY][commonData:start] 4194304
DEBUG - 2026-03-30 04:41:34 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-30 04:41:34 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-03-30 04:41:34 --> [REQ_ID=95b2d8607ab9] [VIEW_RENDER] themes/public/home
INFO - 2026-03-30 04:41:34 --> [REQ_ID=95b2d8607ab9] [MEMORY][commonData:start] 8388608
INFO - 2026-03-30 04:41:34 --> themesMemory usage: 8388608
DEBUG - 2026-03-30 04:41:34 --> [MetaService] slug= pageName=Home cacheHit= path=DB
DEBUG - 2026-03-30 04:41:34 --> [REQ_ID=e6d284250299] [FILTER_AFTER]
DEBUG - 2026-03-30 04:41:34 --> [REQ_ID=e6d284250299] [LIFECYCLE][END] status=200 duration_ms=755.17 memory_delta=4194304
INFO - 2026-03-30 04:41:34 --> [REQ_ID=95b2d8607ab9] [PERF] Execution time=0.752845
DEBUG - 2026-03-30 04:41:34 --> [REQ_ID=e6d284250299] [REQUEST][END]
INFO - 2026-03-30 04:41:34 --> [REQ_ID=e6d284250299] [PERF] Execution time=0.774495
DEBUG - 2026-03-30 04:43:21 --> [REQ_ID=f2ca0ac3842f] [REQUEST][START] GET /index.php/Projects
DEBUG - 2026-03-30 04:43:21 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-30 04:43:21 --> [REQ_ID=f2ca0ac3842f] [REQUEST][END]
INFO - 2026-03-30 04:43:21 --> [REQ_ID=f2ca0ac3842f] [PERF] Execution time=0.040271
DEBUG - 2026-03-30 04:46:22 --> [REQ_ID=f2996806c313] [REQUEST][START] HEAD /
DEBUG - 2026-03-30 04:46:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-30 04:46:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-30 04:46:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-30 04:46:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-30 04:46:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-30 04:51:22 --> [REQ_ID=3aa68ca744b6] [REQUEST][START] HEAD /
DEBUG - 2026-03-30 04:51:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-30 04:51:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-30 04:51:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-30 04:51:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-30 04:51:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-30 04:56:22 --> [REQ_ID=b37616d008af] [REQUEST][START] HEAD /
DEBUG - 2026-03-30 04:56:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-30 04:56:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-30 04:56:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-30 04:56:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-30 04:56:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-30 05:00:01 --> [REQ_ID=778313e10c30] [REQUEST][START] GET /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-30 05:00:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-30 05:00:01 --> [REQ_ID=778313e10c30] [FILTER_BEFORE] /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-30 05:00:01 --> [REQ_ID=778313e10c30] [ROUTE] Controller=\App\Modules\Management\Controllers\ManagementAPIController Method=Run_CRON_Tasks
DEBUG - 2026-03-30 05:00:01 --> [REQ_ID=778313e10c30] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-30 05:00:01 --> [REQ_ID=778313e10c30] [REQUEST][END]
INFO - 2026-03-30 05:00:01 --> [REQ_ID=778313e10c30] [PERF] Execution time=0.039696
DEBUG - 2026-03-30 05:01:22 --> [REQ_ID=67e1fa0d84ff] [REQUEST][START] HEAD /
DEBUG - 2026-03-30 05:01:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-30 05:01:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-30 05:01:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-30 05:01:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-30 05:01:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-30 05:02:40 --> [REQ_ID=de5f24365158] [REQUEST][START] GET /index.php/forgot
DEBUG - 2026-03-30 05:02:40 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-30 05:02:40 --> [REQ_ID=de5f24365158] [REQUEST][END]
INFO - 2026-03-30 05:02:40 --> [REQ_ID=de5f24365158] [PERF] Execution time=0.017659
DEBUG - 2026-03-30 05:03:51 --> [REQ_ID=49c3927d2056] [REQUEST][START] GET /index.php/Preview/Alert/GRAB
DEBUG - 2026-03-30 05:03:51 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-30 05:03:51 --> [REQ_ID=49c3927d2056] [FILTER_BEFORE] /index.php/Preview/Alert/GRAB
DEBUG - 2026-03-30 05:03:51 --> [REQ_ID=49c3927d2056] [ROUTE] Controller=\App\Modules\User\Controllers\AlertsController Method=preview
DEBUG - 2026-03-30 05:03:51 --> [REQ_ID=49c3927d2056] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Preview/Alert/GRAB
DEBUG - 2026-03-30 05:03:51 --> [CSRF] token name=csrf_test_name hash=b9acb90db28521a1843798dcd427d98a
DEBUG - 2026-03-30 05:03:51 --> [REQ_ID=6883a9f19c35] [INIT] App\Modules\User\Controllers\AlertsController::GET
INFO - 2026-03-30 05:03:51 --> [REQ_ID=6883a9f19c35] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-30 05:03:51 --> [REQ_ID=6883a9f19c35] [METHOD_ENTRY] preview
DEBUG - 2026-03-30 05:03:51 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-30 05:03:51 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-30 05:03:51 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-30 05:03:51 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-30 05:03:51 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-30 05:03:51 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-30 05:03:51 --> MyMIInvestments: no session user detected; skipping personalized hydration.
DEBUG - 2026-03-30 05:03:51 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-30 05:03:51 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-30 05:03:51 --> MyMIMarketing: Pscrape library not installed; Google search scraping will use fallback.
DEBUG - 2026-03-30 05:03:51 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-30 05:03:51 --> MyMIAlerts: no authenticated user context detected.
DEBUG - 2026-03-30 05:03:51 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-30 05:03:51 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-30 05:03:51 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-30 05:03:51 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-30 05:03:51 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-30 05:03:51 --> [SERVICE] App\Services\BudgetService ::setUserId
INFO - 2026-03-30 05:03:51 --> [REQ_ID=6883a9f19c35] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-30 05:03:51 --> MyMIInvestments: no session user detected; skipping personalized hydration.
DEBUG - 2026-03-30 05:03:51 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-30 05:03:51 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-30 05:03:51 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-30 05:03:51 --> MyMIAlerts: no authenticated user context detected.
INFO - 2026-03-30 05:03:51 --> Premium entitlement guest: user_id= route=/index.php/Preview/Alert/GRAB feature= tier=free status=free allowed=yes reason=Guest access allowed for this feature.
INFO - 2026-03-30 05:03:51 --> AlertsModel L404 - Alert updated successfully for ID 7405: Array
(
    [price] => 3.57
    [current_price] => 3.57
    [last_updated] => 2026-03-30 05:03:51
    [last_updated_time] => 2026-03-30 05:03:51
)

INFO - 2026-03-30 05:03:51 --> 🔄 Trying AlphaVantage for GRAB...
INFO - 2026-03-30 05:03:51 --> ✅ Alert snapshot inserted for GRAB with trade_id 7405
DEBUG - 2026-03-30 05:03:51 --> [REQ_ID=6883a9f19c35] [VIEW_RENDER] themes/public/previewAlert
INFO - 2026-03-30 05:03:51 --> [REQ_ID=6883a9f19c35] [MEMORY][commonData:start] 6291456
INFO - 2026-03-30 05:03:51 --> themesMemory usage: 6291456
DEBUG - 2026-03-30 05:03:51 --> [REQ_ID=49c3927d2056] [FILTER_AFTER]
DEBUG - 2026-03-30 05:03:51 --> [REQ_ID=49c3927d2056] [LIFECYCLE][END] status=200 duration_ms=412.48 memory_delta=2097152
INFO - 2026-03-30 05:03:51 --> [REQ_ID=6883a9f19c35] [PERF] Execution time=0.410548
DEBUG - 2026-03-30 05:03:51 --> [REQ_ID=49c3927d2056] [REQUEST][END]
INFO - 2026-03-30 05:03:51 --> [REQ_ID=49c3927d2056] [PERF] Execution time=0.427119
DEBUG - 2026-03-30 05:06:22 --> [REQ_ID=4c262f0d573e] [REQUEST][START] HEAD /
DEBUG - 2026-03-30 05:06:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-30 05:06:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-30 05:06:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-30 05:06:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-30 05:06:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-30 05:09:53 --> [REQ_ID=1eaa1175faf9] [REQUEST][START] GET /index.php/How-It-Works/marketing
DEBUG - 2026-03-30 05:09:53 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-30 05:09:53 --> [REQ_ID=1eaa1175faf9] [REQUEST][END]
INFO - 2026-03-30 05:09:53 --> [REQ_ID=1eaa1175faf9] [PERF] Execution time=0.043717
DEBUG - 2026-03-30 05:11:22 --> [REQ_ID=c959f333a48b] [REQUEST][START] HEAD /
DEBUG - 2026-03-30 05:11:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-30 05:11:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-30 05:11:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-30 05:11:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-30 05:11:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-30 05:15:02 --> [REQ_ID=980715cd3954] [REQUEST][START] GET /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-30 05:15:02 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-30 05:15:02 --> [REQ_ID=980715cd3954] [FILTER_BEFORE] /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-30 05:15:02 --> [REQ_ID=980715cd3954] [ROUTE] Controller=\App\Modules\APIs\Controllers\AlertsAPIController Method=fetchEmailAlerts
DEBUG - 2026-03-30 05:15:02 --> [REQ_ID=980715cd3954] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-30 05:15:02 --> [REQ_ID=980715cd3954] [REQUEST][END]
INFO - 2026-03-30 05:15:02 --> [REQ_ID=980715cd3954] [PERF] Execution time=0.045379
DEBUG - 2026-03-30 05:16:22 --> [REQ_ID=d0e8109fff1b] [REQUEST][START] HEAD /
DEBUG - 2026-03-30 05:16:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-30 05:16:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-30 05:16:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-30 05:16:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-30 05:16:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-30 05:16:29 --> [REQ_ID=8210ad1ccb16] [REQUEST][START] GET /index.php/Budget/Financial-Forecaster
DEBUG - 2026-03-30 05:16:29 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-30 05:16:29 --> [REQ_ID=8210ad1ccb16] [REQUEST][END]
INFO - 2026-03-30 05:16:29 --> [REQ_ID=8210ad1ccb16] [PERF] Execution time=0.015772
DEBUG - 2026-03-30 05:16:36 --> [REQ_ID=712c2f8ba701] [REQUEST][START] GET /index.php/How-It-Works/Investment-Portfolio-Management
DEBUG - 2026-03-30 05:16:36 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-30 05:16:36 --> [REQ_ID=712c2f8ba701] [FILTER_BEFORE] /index.php/How-It-Works/Investment-Portfolio-Management
DEBUG - 2026-03-30 05:16:36 --> [REQ_ID=712c2f8ba701] [ROUTE] Controller=\App\Modules\Blog\Controllers\HowItWorksController Method=InvestmentPortfolioManagement
DEBUG - 2026-03-30 05:16:36 --> [REQ_ID=712c2f8ba701] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/How-It-Works/Investment-Portfolio-Management
DEBUG - 2026-03-30 05:16:36 --> [CSRF] token name=csrf_test_name hash=9aa376c75d4fd696d447552e17b75dcb
DEBUG - 2026-03-30 05:16:36 --> [REQ_ID=2acd4a13be1c] [INIT] App\Modules\Blog\Controllers\HowItWorksController::GET
INFO - 2026-03-30 05:16:36 --> [REQ_ID=2acd4a13be1c] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-30 05:16:36 --> [REQ_ID=2acd4a13be1c] [METHOD_ENTRY] InvestmentPortfolioManagement
DEBUG - 2026-03-30 05:16:36 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-30 05:16:36 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-30 05:16:36 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-30 05:16:36 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-30 05:16:36 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-30 05:16:36 --> MyMICoin: guest context detected; skipping user-specific preload.
INFO - 2026-03-30 05:16:36 --> [REQ_ID=2acd4a13be1c] [MEMORY][commonData:start] 6291456
INFO - 2026-03-30 05:16:37 --> themesMemory usage: 8388608
DEBUG - 2026-03-30 05:16:37 --> [MetaService] slug=how-it-works/investment-portfolio-management pageName= cacheHit= path=DB
DEBUG - 2026-03-30 05:16:37 --> [REQ_ID=712c2f8ba701] [FILTER_AFTER]
DEBUG - 2026-03-30 05:16:37 --> [REQ_ID=712c2f8ba701] [LIFECYCLE][END] status=200 duration_ms=761.35 memory_delta=4194304
INFO - 2026-03-30 05:16:37 --> [REQ_ID=2acd4a13be1c] [PERF] Execution time=0.759941
DEBUG - 2026-03-30 05:16:37 --> [REQ_ID=712c2f8ba701] [REQUEST][END]
INFO - 2026-03-30 05:16:37 --> [REQ_ID=712c2f8ba701] [PERF] Execution time=0.771888
DEBUG - 2026-03-30 05:17:27 --> [REQ_ID=287b14c802cb] [REQUEST][START] GET /index.php/How-It-Works/Purchase-MyMI-Gold
DEBUG - 2026-03-30 05:17:27 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-30 05:17:27 --> [REQ_ID=287b14c802cb] [FILTER_BEFORE] /index.php/How-It-Works/Purchase-MyMI-Gold
DEBUG - 2026-03-30 05:17:27 --> [REQ_ID=287b14c802cb] [ROUTE] Controller=\App\Modules\Blog\Controllers\HowItWorksController Method=PurchaseMyMIGold
DEBUG - 2026-03-30 05:17:27 --> [REQ_ID=287b14c802cb] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/How-It-Works/Purchase-MyMI-Gold
DEBUG - 2026-03-30 05:17:27 --> [CSRF] token name=csrf_test_name hash=af2384efc0b51b4c57e3d0701fc15f3e
DEBUG - 2026-03-30 05:17:27 --> [REQ_ID=0816016a7a91] [INIT] App\Modules\Blog\Controllers\HowItWorksController::GET
INFO - 2026-03-30 05:17:27 --> [REQ_ID=0816016a7a91] [MEMORY][controller-start] 6291456
DEBUG - 2026-03-30 05:17:27 --> [REQ_ID=0816016a7a91] [METHOD_ENTRY] PurchaseMyMIGold
DEBUG - 2026-03-30 05:17:27 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-30 05:17:27 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-30 05:17:27 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-30 05:17:27 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-30 05:17:27 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-30 05:17:27 --> MyMICoin: guest context detected; skipping user-specific preload.
INFO - 2026-03-30 05:17:27 --> [REQ_ID=0816016a7a91] [MEMORY][commonData:start] 6291456
INFO - 2026-03-30 05:17:27 --> themesMemory usage: 8388608
DEBUG - 2026-03-30 05:17:27 --> [MetaService] slug=how-it-works/purchase-mymi-gold pageName= cacheHit= path=DB
DEBUG - 2026-03-30 05:17:27 --> [REQ_ID=287b14c802cb] [FILTER_AFTER]
DEBUG - 2026-03-30 05:17:27 --> [REQ_ID=287b14c802cb] [LIFECYCLE][END] status=200 duration_ms=508.25 memory_delta=2097152
INFO - 2026-03-30 05:17:27 --> [REQ_ID=0816016a7a91] [PERF] Execution time=0.507921
DEBUG - 2026-03-30 05:17:27 --> [REQ_ID=287b14c802cb] [REQUEST][END]
INFO - 2026-03-30 05:17:27 --> [REQ_ID=287b14c802cb] [PERF] Execution time=0.518729
DEBUG - 2026-03-30 05:19:59 --> [REQ_ID=015ca6afcb96] [REQUEST][START] GET /
DEBUG - 2026-03-30 05:19:59 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-30 05:19:59 --> [REQ_ID=015ca6afcb96] [FILTER_BEFORE] /
DEBUG - 2026-03-30 05:19:59 --> [REQ_ID=015ca6afcb96] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-30 05:19:59 --> [REQ_ID=015ca6afcb96] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-30 05:19:59 --> [CSRF] token name=csrf_test_name hash=9c1e9ff93f1a0d2d3269a9b419f5378e
DEBUG - 2026-03-30 05:19:59 --> [REQ_ID=337387a71d4f] [INIT] App\Controllers\Home::GET
INFO - 2026-03-30 05:19:59 --> [REQ_ID=337387a71d4f] [MEMORY][controller-start] 6291456
INFO - 2026-03-30 05:19:59 --> [REQ_ID=337387a71d4f] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-30 05:19:59 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-30 05:20:00 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-03-30 05:20:00 --> [REQ_ID=337387a71d4f] [VIEW_RENDER] themes/public/home
INFO - 2026-03-30 05:20:00 --> [REQ_ID=337387a71d4f] [MEMORY][commonData:start] 10485760
INFO - 2026-03-30 05:20:00 --> themesMemory usage: 10485760
DEBUG - 2026-03-30 05:20:00 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-30 05:20:00 --> [REQ_ID=015ca6afcb96] [FILTER_AFTER]
DEBUG - 2026-03-30 05:20:00 --> [REQ_ID=015ca6afcb96] [LIFECYCLE][END] status=200 duration_ms=621.63 memory_delta=4194304
INFO - 2026-03-30 05:20:00 --> [REQ_ID=337387a71d4f] [PERF] Execution time=0.619685
DEBUG - 2026-03-30 05:20:00 --> [REQ_ID=015ca6afcb96] [REQUEST][END]
INFO - 2026-03-30 05:20:00 --> [REQ_ID=015ca6afcb96] [PERF] Execution time=0.661502
DEBUG - 2026-03-30 05:21:22 --> [REQ_ID=0f970214e200] [REQUEST][START] HEAD /
DEBUG - 2026-03-30 05:21:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-30 05:21:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-30 05:21:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-30 05:21:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-30 05:21:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-30 05:23:11 --> [REQ_ID=4b1ed590767b] [REQUEST][START] GET /index.php/Blog/Personal-Budgeting/The-Importance-of-Personal-Financial-Budgeting
DEBUG - 2026-03-30 05:23:11 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-30 05:23:11 --> [REQ_ID=4b1ed590767b] [REQUEST][END]
INFO - 2026-03-30 05:23:11 --> [REQ_ID=4b1ed590767b] [PERF] Execution time=0.041772
DEBUG - 2026-03-30 05:25:58 --> [REQ_ID=188a4266a168] [REQUEST][START] GET /index.php/
DEBUG - 2026-03-30 05:25:58 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-30 05:25:58 --> [REQ_ID=188a4266a168] [FILTER_BEFORE] /index.php/
DEBUG - 2026-03-30 05:25:58 --> [REQ_ID=188a4266a168] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-30 05:25:58 --> [REQ_ID=188a4266a168] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-30 05:25:58 --> [CSRF] token name=csrf_test_name hash=2fb91cf909650a66acccb2afdfa39b25
DEBUG - 2026-03-30 05:25:58 --> [REQ_ID=b46440b144a6] [INIT] App\Controllers\Home::GET
INFO - 2026-03-30 05:25:58 --> [REQ_ID=b46440b144a6] [MEMORY][controller-start] 6291456
INFO - 2026-03-30 05:25:58 --> [REQ_ID=b46440b144a6] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-30 05:25:58 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-30 05:25:59 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
DEBUG - 2026-03-30 05:25:59 --> [REQ_ID=b46440b144a6] [VIEW_RENDER] themes/public/home
INFO - 2026-03-30 05:25:59 --> [REQ_ID=b46440b144a6] [MEMORY][commonData:start] 10485760
INFO - 2026-03-30 05:25:59 --> themesMemory usage: 10485760
DEBUG - 2026-03-30 05:25:59 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-30 05:25:59 --> [REQ_ID=188a4266a168] [FILTER_AFTER]
DEBUG - 2026-03-30 05:25:59 --> [REQ_ID=188a4266a168] [LIFECYCLE][END] status=200 duration_ms=543.27 memory_delta=4194304
INFO - 2026-03-30 05:25:59 --> [REQ_ID=b46440b144a6] [PERF] Execution time=0.541406
DEBUG - 2026-03-30 05:25:59 --> [REQ_ID=188a4266a168] [REQUEST][END]
INFO - 2026-03-30 05:25:59 --> [REQ_ID=188a4266a168] [PERF] Execution time=0.580579
DEBUG - 2026-03-30 05:26:22 --> [REQ_ID=1642399c73c3] [REQUEST][START] HEAD /
DEBUG - 2026-03-30 05:26:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-30 05:26:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-30 05:26:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-30 05:26:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-30 05:26:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-30 05:30:32 --> [REQ_ID=9c4e2f79b2b8] [REQUEST][START] GET /index.php/Account/Activity
DEBUG - 2026-03-30 05:30:32 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-30 05:30:32 --> [REQ_ID=9c4e2f79b2b8] [REQUEST][END]
INFO - 2026-03-30 05:30:32 --> [REQ_ID=9c4e2f79b2b8] [PERF] Execution time=0.043650
DEBUG - 2026-03-30 05:31:22 --> [REQ_ID=f1ddeb0427cb] [REQUEST][START] HEAD /
DEBUG - 2026-03-30 05:31:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-30 05:31:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-30 05:31:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-30 05:31:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-30 05:31:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-30 05:36:22 --> [REQ_ID=0b6b185abc91] [REQUEST][START] HEAD /
DEBUG - 2026-03-30 05:36:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-30 05:36:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-30 05:36:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-30 05:36:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-30 05:36:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-30 05:41:22 --> [REQ_ID=628a3e4621ed] [REQUEST][START] HEAD /
DEBUG - 2026-03-30 05:41:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-30 05:41:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-30 05:41:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-30 05:41:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-30 05:41:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-30 05:41:50 --> [REQ_ID=fdd55bd8e51e] [REQUEST][START] GET /index.php/Premium-Features/Advanced-Trade-Tracker
DEBUG - 2026-03-30 05:41:50 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
INFO - 2026-03-30 05:41:50 --> REDIRECTED ROUTE at https://www.mymiwallet.com/Investments/Trade-Tracker
DEBUG - 2026-03-30 05:41:50 --> [REQ_ID=fdd55bd8e51e] [REQUEST][END]
INFO - 2026-03-30 05:41:50 --> [REQ_ID=fdd55bd8e51e] [PERF] Execution time=0.016297
DEBUG - 2026-03-30 05:46:22 --> [REQ_ID=68e8f04cfbb3] [REQUEST][START] HEAD /
DEBUG - 2026-03-30 05:46:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-30 05:46:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-30 05:46:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-30 05:46:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-30 05:46:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-30 05:51:22 --> [REQ_ID=aae0199a63e7] [REQUEST][START] HEAD /
DEBUG - 2026-03-30 05:51:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-30 05:51:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-30 05:51:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-30 05:51:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-30 05:51:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-30 05:53:33 --> [REQ_ID=edac7614f330] [REQUEST][START] GET /index.php/Management/Exchange
DEBUG - 2026-03-30 05:53:33 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-30 05:53:34 --> [REQ_ID=edac7614f330] [REQUEST][END]
INFO - 2026-03-30 05:53:34 --> [REQ_ID=edac7614f330] [PERF] Execution time=0.040987
DEBUG - 2026-03-30 05:56:22 --> [REQ_ID=ad05decc03c2] [REQUEST][START] HEAD /
DEBUG - 2026-03-30 05:56:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-30 05:56:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-30 05:56:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-30 05:56:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-30 05:56:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-30 06:00:01 --> [REQ_ID=698944c04a53] [REQUEST][START] GET /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-30 06:00:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-30 06:00:01 --> [REQ_ID=698944c04a53] [FILTER_BEFORE] /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-30 06:00:01 --> [REQ_ID=698944c04a53] [ROUTE] Controller=\App\Modules\Management\Controllers\ManagementAPIController Method=Run_CRON_Tasks
DEBUG - 2026-03-30 06:00:01 --> [REQ_ID=698944c04a53] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-30 06:00:01 --> [REQ_ID=698944c04a53] [REQUEST][END]
INFO - 2026-03-30 06:00:01 --> [REQ_ID=698944c04a53] [PERF] Execution time=0.046281
DEBUG - 2026-03-30 06:00:36 --> [REQ_ID=142d55250b6c] [REQUEST][START] GET /index.php/How-It-Works/Setting-Financial-Goals
DEBUG - 2026-03-30 06:00:36 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-30 06:00:36 --> [REQ_ID=142d55250b6c] [REQUEST][END]
INFO - 2026-03-30 06:00:36 --> [REQ_ID=142d55250b6c] [PERF] Execution time=0.016550
DEBUG - 2026-03-30 06:01:22 --> [REQ_ID=6728c0488d98] [REQUEST][START] HEAD /
DEBUG - 2026-03-30 06:01:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-30 06:01:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-30 06:01:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-30 06:01:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-30 06:01:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-30 06:06:16 --> [REQ_ID=d9d014f3ec6c] [REQUEST][START] GET /index.php/Trade-Tracker
DEBUG - 2026-03-30 06:06:16 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-30 06:06:16 --> [REQ_ID=d9d014f3ec6c] [FILTER_BEFORE] /index.php/Trade-Tracker
DEBUG - 2026-03-30 06:06:16 --> [REQ_ID=d9d014f3ec6c] [ROUTE] Controller=\App\Modules\User\Controllers\InvestmentsController Method=tradeTracker
DEBUG - 2026-03-30 06:06:16 --> [REQ_ID=d9d014f3ec6c] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Trade-Tracker
DEBUG - 2026-03-30 06:06:16 --> [CSRF] token name=csrf_test_name hash=f565891ee1efd759e0d0808c1e84192d
DEBUG - 2026-03-30 06:06:16 --> [REQ_ID=d9d014f3ec6c] [REQUEST][END]
INFO - 2026-03-30 06:06:16 --> [REQ_ID=d9d014f3ec6c] [PERF] Execution time=0.054854
DEBUG - 2026-03-30 06:06:16 --> [REQ_ID=087fc837e4f9] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-30 06:06:16 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-30 06:06:16 --> [REQ_ID=087fc837e4f9] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-30 06:06:16 --> [REQ_ID=087fc837e4f9] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-30 06:06:16 --> [REQ_ID=087fc837e4f9] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-30 06:06:16 --> [CSRF] token name=csrf_test_name hash=501400697cda33d5e2f92f048997a1a1
DEBUG - 2026-03-30 06:06:16 --> [REQ_ID=a24a5a33bd4f] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-30 06:06:16 --> [REQ_ID=a24a5a33bd4f] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-30 06:06:16 --> [REQ_ID=087fc837e4f9] [FILTER_AFTER]
DEBUG - 2026-03-30 06:06:16 --> [REQ_ID=087fc837e4f9] [LIFECYCLE][END] status=200 duration_ms=115.29 memory_delta=0
INFO - 2026-03-30 06:06:16 --> [REQ_ID=a24a5a33bd4f] [PERF] Execution time=0.115018
DEBUG - 2026-03-30 06:06:16 --> [REQ_ID=087fc837e4f9] [REQUEST][END]
INFO - 2026-03-30 06:06:16 --> [REQ_ID=087fc837e4f9] [PERF] Execution time=0.127056
DEBUG - 2026-03-30 06:06:22 --> [REQ_ID=fcc179abe2d3] [REQUEST][START] HEAD /
DEBUG - 2026-03-30 06:06:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-30 06:06:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-30 06:06:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-30 06:06:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-30 06:06:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-30 06:11:22 --> [REQ_ID=261a3e2e0e5a] [REQUEST][START] HEAD /
DEBUG - 2026-03-30 06:11:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-30 06:11:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-30 06:11:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-30 06:11:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-30 06:11:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-30 06:15:01 --> [REQ_ID=22f5626ef49a] [REQUEST][START] GET /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-30 06:15:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-30 06:15:01 --> [REQ_ID=22f5626ef49a] [FILTER_BEFORE] /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-30 06:15:01 --> [REQ_ID=22f5626ef49a] [ROUTE] Controller=\App\Modules\APIs\Controllers\AlertsAPIController Method=fetchEmailAlerts
DEBUG - 2026-03-30 06:15:01 --> [REQ_ID=22f5626ef49a] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-30 06:15:01 --> [REQ_ID=22f5626ef49a] [REQUEST][END]
INFO - 2026-03-30 06:15:01 --> [REQ_ID=22f5626ef49a] [PERF] Execution time=0.046465
DEBUG - 2026-03-30 06:16:22 --> [REQ_ID=91045e61e731] [REQUEST][START] HEAD /
DEBUG - 2026-03-30 06:16:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-30 06:16:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-30 06:16:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-30 06:16:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-30 06:16:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-30 06:17:51 --> [REQ_ID=8afa556324b3] [REQUEST][START] GET /
DEBUG - 2026-03-30 06:17:51 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-30 06:17:51 --> [REQ_ID=8afa556324b3] [FILTER_BEFORE] /
DEBUG - 2026-03-30 06:17:51 --> [REQ_ID=8afa556324b3] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-30 06:17:51 --> [REQ_ID=8afa556324b3] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-30 06:17:51 --> [CSRF] token name=csrf_test_name hash=96ae6305a968aa52b66988b9a218cd12
DEBUG - 2026-03-30 06:17:51 --> [REQ_ID=5c08184e63ea] [INIT] App\Controllers\Home::GET
INFO - 2026-03-30 06:17:51 --> [REQ_ID=5c08184e63ea] [MEMORY][controller-start] 6291456
INFO - 2026-03-30 06:17:51 --> [REQ_ID=5c08184e63ea] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-30 06:17:51 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-30 06:17:52 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-03-30 06:17:52 --> [REQ_ID=5c08184e63ea] [VIEW_RENDER] themes/public/home
INFO - 2026-03-30 06:17:52 --> [REQ_ID=5c08184e63ea] [MEMORY][commonData:start] 10485760
INFO - 2026-03-30 06:17:52 --> themesMemory usage: 10485760
DEBUG - 2026-03-30 06:17:52 --> [MetaService] slug= pageName=Home cacheHit= path=DB
DEBUG - 2026-03-30 06:17:52 --> [REQ_ID=8afa556324b3] [FILTER_AFTER]
DEBUG - 2026-03-30 06:17:52 --> [REQ_ID=8afa556324b3] [LIFECYCLE][END] status=200 duration_ms=708.38 memory_delta=4194304
INFO - 2026-03-30 06:17:52 --> [REQ_ID=5c08184e63ea] [PERF] Execution time=0.706503
DEBUG - 2026-03-30 06:17:52 --> [REQ_ID=8afa556324b3] [REQUEST][END]
INFO - 2026-03-30 06:17:52 --> [REQ_ID=8afa556324b3] [PERF] Execution time=0.747075
DEBUG - 2026-03-30 06:21:22 --> [REQ_ID=115859dc7e1d] [REQUEST][START] HEAD /
DEBUG - 2026-03-30 06:21:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-30 06:21:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-30 06:21:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-30 06:21:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-30 06:21:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-30 06:26:22 --> [REQ_ID=bca9d88a7f99] [REQUEST][START] HEAD /
DEBUG - 2026-03-30 06:26:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-30 06:26:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-30 06:26:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-30 06:26:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-30 06:26:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-30 06:31:22 --> [REQ_ID=0ed1f2de3348] [REQUEST][START] HEAD /
DEBUG - 2026-03-30 06:31:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-30 06:31:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-30 06:31:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-30 06:31:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-30 06:31:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-30 06:35:17 --> [REQ_ID=a0cde5fc4fd1] [REQUEST][START] GET /index.php/Features/Brokerage-Integration
DEBUG - 2026-03-30 06:35:17 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-30 06:35:17 --> [REQ_ID=a0cde5fc4fd1] [FILTER_BEFORE] /index.php/Features/Brokerage-Integration
DEBUG - 2026-03-30 06:35:17 --> [REQ_ID=a0cde5fc4fd1] [ROUTE] Controller=\App\Modules\Advertise\Controllers\FeaturesController Method=BrokerageIntegrations
DEBUG - 2026-03-30 06:35:17 --> [REQ_ID=a0cde5fc4fd1] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Features/Brokerage-Integration
DEBUG - 2026-03-30 06:35:17 --> [CSRF] token name=csrf_test_name hash=4859afa3440e1c0a0eb399e5883085a5
DEBUG - 2026-03-30 06:35:17 --> [REQ_ID=a0cde5fc4fd1] [REQUEST][END]
INFO - 2026-03-30 06:35:17 --> [REQ_ID=a0cde5fc4fd1] [PERF] Execution time=0.057139
DEBUG - 2026-03-30 06:35:17 --> [REQ_ID=960a41c0ed7f] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-30 06:35:17 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-30 06:35:17 --> [REQ_ID=960a41c0ed7f] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-30 06:35:17 --> [REQ_ID=960a41c0ed7f] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-30 06:35:17 --> [REQ_ID=960a41c0ed7f] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-30 06:35:17 --> [CSRF] token name=csrf_test_name hash=760c1daea74bd41f9011cc6452949c8c
DEBUG - 2026-03-30 06:35:17 --> [REQ_ID=6946adb535c1] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-30 06:35:17 --> [REQ_ID=6946adb535c1] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-30 06:35:18 --> [REQ_ID=960a41c0ed7f] [FILTER_AFTER]
DEBUG - 2026-03-30 06:35:18 --> [REQ_ID=960a41c0ed7f] [LIFECYCLE][END] status=200 duration_ms=285.42 memory_delta=0
INFO - 2026-03-30 06:35:18 --> [REQ_ID=6946adb535c1] [PERF] Execution time=0.285378
DEBUG - 2026-03-30 06:35:18 --> [REQ_ID=960a41c0ed7f] [REQUEST][END]
INFO - 2026-03-30 06:35:18 --> [REQ_ID=960a41c0ed7f] [PERF] Execution time=0.297290
DEBUG - 2026-03-30 06:36:22 --> [REQ_ID=dd4401a340e7] [REQUEST][START] HEAD /
DEBUG - 2026-03-30 06:36:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-30 06:36:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-30 06:36:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-30 06:36:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-30 06:36:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-30 06:37:15 --> [REQ_ID=0bc73237918e] [REQUEST][START] GET /index.php/Investments/Watchlist
DEBUG - 2026-03-30 06:37:15 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-30 06:37:15 --> [REQ_ID=0bc73237918e] [FILTER_BEFORE] /index.php/Investments/Watchlist
DEBUG - 2026-03-30 06:37:15 --> [REQ_ID=0bc73237918e] [ROUTE] Controller=\App\Modules\User\Controllers\InvestmentsController Method=watchlist
DEBUG - 2026-03-30 06:37:15 --> [REQ_ID=0bc73237918e] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Investments/Watchlist
DEBUG - 2026-03-30 06:37:15 --> [CSRF] token name=csrf_test_name hash=9532615119b4155df9b61c649e9ccd5c
DEBUG - 2026-03-30 06:37:15 --> [REQ_ID=0bc73237918e] [REQUEST][END]
INFO - 2026-03-30 06:37:15 --> [REQ_ID=0bc73237918e] [PERF] Execution time=0.032419
DEBUG - 2026-03-30 06:37:18 --> [REQ_ID=4b2f952ca3bb] [REQUEST][START] GET /index.php/Investments/Watchlist
DEBUG - 2026-03-30 06:37:18 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-30 06:37:18 --> [REQ_ID=4b2f952ca3bb] [FILTER_BEFORE] /index.php/Investments/Watchlist
DEBUG - 2026-03-30 06:37:18 --> [REQ_ID=4b2f952ca3bb] [ROUTE] Controller=\App\Modules\User\Controllers\InvestmentsController Method=watchlist
DEBUG - 2026-03-30 06:37:18 --> [REQ_ID=4b2f952ca3bb] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Investments/Watchlist
DEBUG - 2026-03-30 06:37:18 --> [CSRF] token name=csrf_test_name hash=c7f38aff9bde010acef21a813ad89a19
DEBUG - 2026-03-30 06:37:18 --> [REQ_ID=4b2f952ca3bb] [REQUEST][END]
INFO - 2026-03-30 06:37:18 --> [REQ_ID=4b2f952ca3bb] [PERF] Execution time=0.010084
DEBUG - 2026-03-30 06:37:19 --> [REQ_ID=8938d22cc5b5] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-30 06:37:19 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-30 06:37:19 --> [REQ_ID=8938d22cc5b5] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-30 06:37:19 --> [REQ_ID=8938d22cc5b5] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-30 06:37:19 --> [REQ_ID=8938d22cc5b5] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-30 06:37:19 --> [CSRF] token name=csrf_test_name hash=67fa8d638f91ff45bdddced9e38091bf
DEBUG - 2026-03-30 06:37:19 --> [REQ_ID=de5d13794474] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-30 06:37:19 --> [REQ_ID=de5d13794474] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-30 06:37:19 --> [REQ_ID=8938d22cc5b5] [FILTER_AFTER]
DEBUG - 2026-03-30 06:37:19 --> [REQ_ID=8938d22cc5b5] [LIFECYCLE][END] status=200 duration_ms=214.71 memory_delta=0
INFO - 2026-03-30 06:37:19 --> [REQ_ID=de5d13794474] [PERF] Execution time=0.214499
DEBUG - 2026-03-30 06:37:19 --> [REQ_ID=8938d22cc5b5] [REQUEST][END]
INFO - 2026-03-30 06:37:19 --> [REQ_ID=8938d22cc5b5] [PERF] Execution time=0.226201
DEBUG - 2026-03-30 06:41:22 --> [REQ_ID=3c8f6ce22189] [REQUEST][START] HEAD /
DEBUG - 2026-03-30 06:41:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-30 06:41:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-30 06:41:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-30 06:41:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-30 06:41:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-30 06:46:22 --> [REQ_ID=e8efbeb6ea11] [REQUEST][START] HEAD /
DEBUG - 2026-03-30 06:46:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-30 06:46:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-30 06:46:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-30 06:46:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-30 06:46:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-30 06:51:22 --> [REQ_ID=a1725f690fe8] [REQUEST][START] HEAD /
DEBUG - 2026-03-30 06:51:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-30 06:51:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-30 06:51:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-30 06:51:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-30 06:51:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-30 06:54:53 --> [REQ_ID=2505245831c1] [REQUEST][START] GET /
DEBUG - 2026-03-30 06:54:53 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-30 06:54:53 --> [REQ_ID=2505245831c1] [FILTER_BEFORE] /
DEBUG - 2026-03-30 06:54:53 --> [REQ_ID=2505245831c1] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-30 06:54:53 --> [REQ_ID=2505245831c1] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-30 06:54:53 --> [CSRF] token name=csrf_test_name hash=0c540643e61bf165cabb99dd04d8342c
DEBUG - 2026-03-30 06:54:53 --> [REQ_ID=4c1a6494a5a1] [INIT] App\Controllers\Home::GET
INFO - 2026-03-30 06:54:53 --> [REQ_ID=4c1a6494a5a1] [MEMORY][controller-start] 6291456
INFO - 2026-03-30 06:54:53 --> [REQ_ID=4c1a6494a5a1] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-30 06:54:53 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-30 06:54:53 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-03-30 06:54:53 --> [REQ_ID=4c1a6494a5a1] [VIEW_RENDER] themes/public/home
INFO - 2026-03-30 06:54:53 --> [REQ_ID=4c1a6494a5a1] [MEMORY][commonData:start] 10485760
INFO - 2026-03-30 06:54:53 --> themesMemory usage: 10485760
DEBUG - 2026-03-30 06:54:53 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-30 06:54:53 --> [REQ_ID=2505245831c1] [FILTER_AFTER]
DEBUG - 2026-03-30 06:54:53 --> [REQ_ID=2505245831c1] [LIFECYCLE][END] status=200 duration_ms=633.93 memory_delta=4194304
INFO - 2026-03-30 06:54:53 --> [REQ_ID=4c1a6494a5a1] [PERF] Execution time=0.631881
DEBUG - 2026-03-30 06:54:53 --> [REQ_ID=2505245831c1] [REQUEST][END]
INFO - 2026-03-30 06:54:53 --> [REQ_ID=2505245831c1] [PERF] Execution time=0.672243
DEBUG - 2026-03-30 06:56:22 --> [REQ_ID=045cb6fdc8d6] [REQUEST][START] HEAD /
DEBUG - 2026-03-30 06:56:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-30 06:56:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-30 06:56:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-30 06:56:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-30 06:56:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
INFO - 2026-03-30 07:00:01 --> [spark:ops:work] Started
INFO - 2026-03-30 07:00:01 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-03-30 07:00:01 --> [SPARK_MEMORY] 18874368
INFO - 2026-03-30 07:00:01 --> [spark:ops:work] Intent
DEBUG - 2026-03-30 07:00:01 --> [REQ_ID=8ca7deb15ec8] [REQUEST][START] GET /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-30 07:00:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
INFO - 2026-03-30 07:00:01 --> [SPARK_START] App\Commands\AIOps\Run
INFO - 2026-03-30 07:00:01 --> [SPARK_MEMORY] 18874368
INFO - 2026-03-30 07:00:01 --> [spark:aiops:run] Intent
DEBUG - 2026-03-30 07:00:01 --> [REQ_ID=8ca7deb15ec8] [FILTER_BEFORE] /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-30 07:00:01 --> [REQ_ID=8ca7deb15ec8] [ROUTE] Controller=\App\Modules\Management\Controllers\ManagementAPIController Method=Run_CRON_Tasks
DEBUG - 2026-03-30 07:00:01 --> [REQ_ID=8ca7deb15ec8] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Management/Run-CRON-Tasks
INFO - 2026-03-30 07:00:01 --> [spark:ops:work] Completed
INFO - 2026-03-30 07:00:01 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.139544
INFO - 2026-03-30 07:00:01 --> [SPARK_MEMORY] 20971520
DEBUG - 2026-03-30 07:00:01 --> [REQ_ID=8ca7deb15ec8] [REQUEST][END]
INFO - 2026-03-30 07:00:01 --> [REQ_ID=8ca7deb15ec8] [PERF] Execution time=0.077214
INFO - 2026-03-30 07:00:03 --> [AIOPS][SPARK][GOVERNANCE][spark:logs:summarize] Started
INFO - 2026-03-30 07:00:03 --> [SPARK_START] App\Commands\Logs\Summarize
INFO - 2026-03-30 07:00:03 --> [SPARK_MEMORY] 18874368
INFO - 2026-03-30 07:00:03 --> [spark:logs:summarize] Intent
INFO - 2026-03-30 07:00:03 --> [AIOPS][SPARK][GOVERNANCE][spark:logs:summarize] Completed
INFO - 2026-03-30 07:00:03 --> [SPARK_COMPLETE] App\Commands\Logs\Summarize duration=0.008925
INFO - 2026-03-30 07:00:03 --> [SPARK_MEMORY] 18874368
INFO - 2026-03-30 07:00:03 --> [spark:app:healthcheck] Started
INFO - 2026-03-30 07:00:03 --> [SPARK_START] App\Commands\App\Healthcheck
INFO - 2026-03-30 07:00:03 --> [SPARK_MEMORY] 18874368
INFO - 2026-03-30 07:00:03 --> [spark:app:healthcheck] Intent
DEBUG - 2026-03-30 07:00:03 --> LOG_HEALTHCHECK debug marker=3c9ecfb4e3b0
INFO - 2026-03-30 07:00:03 --> LOG_HEALTHCHECK info marker=3c9ecfb4e3b0
NOTICE - 2026-03-30 07:00:03 --> LOG_HEALTHCHECK probe marker=3c9ecfb4e3b0
INFO - 2026-03-30 07:00:03 --> [spark:app:healthcheck] Completed
INFO - 2026-03-30 07:00:03 --> [SPARK_COMPLETE] App\Commands\App\Healthcheck duration=0.039360
INFO - 2026-03-30 07:00:03 --> [SPARK_MEMORY] 18874368
INFO - 2026-03-30 07:00:03 --> [SPARK_COMPLETE] App\Commands\AIOps\Run duration=1.787779
INFO - 2026-03-30 07:00:03 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-03-30 07:01:22 --> [REQ_ID=b544bae03872] [REQUEST][START] HEAD /
DEBUG - 2026-03-30 07:01:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-30 07:01:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-30 07:01:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-30 07:01:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-30 07:01:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-30 07:06:22 --> [REQ_ID=f02888cd3330] [REQUEST][START] HEAD /
DEBUG - 2026-03-30 07:06:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-30 07:06:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-30 07:06:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-30 07:06:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-30 07:06:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-30 07:11:22 --> [REQ_ID=4f138f7d73f6] [REQUEST][START] HEAD /
DEBUG - 2026-03-30 07:11:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-30 07:11:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-30 07:11:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-30 07:11:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-30 07:11:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-30 07:15:01 --> [REQ_ID=2f85c026e9cb] [REQUEST][START] GET /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-30 07:15:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-30 07:15:01 --> [REQ_ID=2f85c026e9cb] [FILTER_BEFORE] /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-30 07:15:01 --> [REQ_ID=2f85c026e9cb] [ROUTE] Controller=\App\Modules\APIs\Controllers\AlertsAPIController Method=fetchEmailAlerts
DEBUG - 2026-03-30 07:15:01 --> [REQ_ID=2f85c026e9cb] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-30 07:15:01 --> [REQ_ID=2f85c026e9cb] [REQUEST][END]
INFO - 2026-03-30 07:15:01 --> [REQ_ID=2f85c026e9cb] [PERF] Execution time=0.048198
DEBUG - 2026-03-30 07:16:23 --> [REQ_ID=8f5060b6f063] [REQUEST][START] HEAD /
DEBUG - 2026-03-30 07:16:23 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-30 07:16:23 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-30 07:16:23 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-30 07:16:23 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-30 07:16:23 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-30 07:21:22 --> [REQ_ID=6794bd635cde] [REQUEST][START] HEAD /
DEBUG - 2026-03-30 07:21:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-30 07:21:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-30 07:21:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-30 07:21:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-30 07:21:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-30 07:26:22 --> [REQ_ID=ffa6dd652b2a] [REQUEST][START] HEAD /
DEBUG - 2026-03-30 07:26:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-30 07:26:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-30 07:26:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-30 07:26:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-30 07:26:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-30 07:31:22 --> [REQ_ID=f7c1e4b22a88] [REQUEST][START] HEAD /
DEBUG - 2026-03-30 07:31:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-30 07:31:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-30 07:31:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-30 07:31:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-30 07:31:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-30 07:36:27 --> [REQ_ID=2f6edeb087bd] [REQUEST][START] HEAD /
DEBUG - 2026-03-30 07:36:27 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-30 07:36:27 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-30 07:36:27 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-30 07:36:27 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-30 07:36:27 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-30 07:41:22 --> [REQ_ID=b9804ea18ade] [REQUEST][START] HEAD /
DEBUG - 2026-03-30 07:41:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-30 07:41:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-30 07:41:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-30 07:41:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-30 07:41:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-30 07:46:22 --> [REQ_ID=57ca516a858c] [REQUEST][START] HEAD /
DEBUG - 2026-03-30 07:46:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-30 07:46:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-30 07:46:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-30 07:46:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-30 07:46:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-30 07:46:25 --> [REQ_ID=d6ca0d67419a] [REQUEST][START] GET /index.php/Features/Advanced-Investment-Portfoio-Manager
DEBUG - 2026-03-30 07:46:25 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
INFO - 2026-03-30 07:46:25 --> REDIRECTED ROUTE at https://www.mymiwallet.com/Features/Advanced-Investment-Portfolio-Manager
DEBUG - 2026-03-30 07:46:25 --> [REQ_ID=d6ca0d67419a] [REQUEST][END]
INFO - 2026-03-30 07:46:25 --> [REQ_ID=d6ca0d67419a] [PERF] Execution time=0.016626
DEBUG - 2026-03-30 07:50:11 --> [REQ_ID=4b629e0bb6f5] [REQUEST][START] GET /index.php/Management/Services
DEBUG - 2026-03-30 07:50:11 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-30 07:50:11 --> [REQ_ID=4b629e0bb6f5] [FILTER_BEFORE] /index.php/Management/Services
DEBUG - 2026-03-30 07:50:11 --> [REQ_ID=4b629e0bb6f5] [ROUTE] Controller=\App\Modules\Management\Controllers\ServicesController Method=index
DEBUG - 2026-03-30 07:50:11 --> [REQ_ID=4b629e0bb6f5] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Management/Services
DEBUG - 2026-03-30 07:50:11 --> [CSRF] token name=csrf_test_name hash=fb9b8ae7563da04dfc77a850cbb875dc
DEBUG - 2026-03-30 07:50:11 --> [REQ_ID=4b629e0bb6f5] [REQUEST][END]
INFO - 2026-03-30 07:50:11 --> [REQ_ID=4b629e0bb6f5] [PERF] Execution time=0.049181
DEBUG - 2026-03-30 07:50:11 --> [REQ_ID=84624727770d] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-30 07:50:11 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-30 07:50:11 --> [REQ_ID=84624727770d] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-30 07:50:11 --> [REQ_ID=84624727770d] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-30 07:50:11 --> [REQ_ID=84624727770d] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-30 07:50:11 --> [CSRF] token name=csrf_test_name hash=da92b9ece88e51ebbd5223a2fc7fe60f
DEBUG - 2026-03-30 07:50:11 --> [REQ_ID=27ff32b2e15b] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-30 07:50:11 --> [REQ_ID=27ff32b2e15b] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-30 07:50:11 --> [REQ_ID=84624727770d] [FILTER_AFTER]
DEBUG - 2026-03-30 07:50:11 --> [REQ_ID=84624727770d] [LIFECYCLE][END] status=200 duration_ms=105.46 memory_delta=0
INFO - 2026-03-30 07:50:11 --> [REQ_ID=27ff32b2e15b] [PERF] Execution time=0.105304
DEBUG - 2026-03-30 07:50:11 --> [REQ_ID=84624727770d] [REQUEST][END]
INFO - 2026-03-30 07:50:11 --> [REQ_ID=84624727770d] [PERF] Execution time=0.123417
DEBUG - 2026-03-30 07:51:22 --> [REQ_ID=fc078ec2a298] [REQUEST][START] HEAD /
DEBUG - 2026-03-30 07:51:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-30 07:51:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-30 07:51:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-30 07:51:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-30 07:51:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-30 07:56:22 --> [REQ_ID=dce5148ecd02] [REQUEST][START] HEAD /
DEBUG - 2026-03-30 07:56:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-30 07:56:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-30 07:56:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-30 07:56:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-30 07:56:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-30 08:00:01 --> [REQ_ID=e614774f1e20] [REQUEST][START] GET /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-30 08:00:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-30 08:00:01 --> [REQ_ID=e614774f1e20] [FILTER_BEFORE] /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-30 08:00:01 --> [REQ_ID=e614774f1e20] [ROUTE] Controller=\App\Modules\Management\Controllers\ManagementAPIController Method=Run_CRON_Tasks
DEBUG - 2026-03-30 08:00:01 --> [REQ_ID=e614774f1e20] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-30 08:00:01 --> [REQ_ID=e614774f1e20] [REQUEST][END]
INFO - 2026-03-30 08:00:01 --> [REQ_ID=e614774f1e20] [PERF] Execution time=0.047723
DEBUG - 2026-03-30 08:01:22 --> [REQ_ID=805d1b68fa04] [REQUEST][START] HEAD /
DEBUG - 2026-03-30 08:01:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-30 08:01:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-30 08:01:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-30 08:01:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-30 08:01:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-30 08:06:22 --> [REQ_ID=b66ebac61b24] [REQUEST][START] HEAD /
DEBUG - 2026-03-30 08:06:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-30 08:06:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-30 08:06:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-30 08:06:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-30 08:06:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-30 08:11:22 --> [REQ_ID=4c832975b894] [REQUEST][START] HEAD /
DEBUG - 2026-03-30 08:11:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-30 08:11:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-30 08:11:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-30 08:11:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-30 08:11:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-30 08:12:59 --> [REQ_ID=a50a2a41f714] [REQUEST][START] GET /index.php/Budget/Financial-Analysis
DEBUG - 2026-03-30 08:12:59 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-30 08:12:59 --> [REQ_ID=a50a2a41f714] [REQUEST][END]
INFO - 2026-03-30 08:12:59 --> [REQ_ID=a50a2a41f714] [PERF] Execution time=0.052439
DEBUG - 2026-03-30 08:15:01 --> [REQ_ID=eb91a31a5d0f] [REQUEST][START] GET /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-30 08:15:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-30 08:15:01 --> [REQ_ID=eb91a31a5d0f] [FILTER_BEFORE] /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-30 08:15:01 --> [REQ_ID=eb91a31a5d0f] [ROUTE] Controller=\App\Modules\APIs\Controllers\AlertsAPIController Method=fetchEmailAlerts
DEBUG - 2026-03-30 08:15:01 --> [REQ_ID=eb91a31a5d0f] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-30 08:15:01 --> [REQ_ID=eb91a31a5d0f] [REQUEST][END]
INFO - 2026-03-30 08:15:01 --> [REQ_ID=eb91a31a5d0f] [PERF] Execution time=0.045519
DEBUG - 2026-03-30 08:16:22 --> [REQ_ID=8aa5e746bf52] [REQUEST][START] HEAD /
DEBUG - 2026-03-30 08:16:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-30 08:16:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-30 08:16:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-30 08:16:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-30 08:16:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-30 08:21:22 --> [REQ_ID=c1cbe351d015] [REQUEST][START] HEAD /
DEBUG - 2026-03-30 08:21:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-30 08:21:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-30 08:21:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-30 08:21:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-30 08:21:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-30 08:23:16 --> [REQ_ID=c2a6a61d07b8] [REQUEST][START] GET /index.php/How-It-Works/Daily-Financial-News
DEBUG - 2026-03-30 08:23:16 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-30 08:23:16 --> [REQ_ID=c2a6a61d07b8] [REQUEST][END]
INFO - 2026-03-30 08:23:16 --> [REQ_ID=c2a6a61d07b8] [PERF] Execution time=0.041139
DEBUG - 2026-03-30 08:26:22 --> [REQ_ID=7b69d4ed40a3] [REQUEST][START] HEAD /
DEBUG - 2026-03-30 08:26:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-30 08:26:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-30 08:26:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-30 08:26:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-30 08:26:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-30 08:31:22 --> [REQ_ID=43ddff104a98] [REQUEST][START] HEAD /
DEBUG - 2026-03-30 08:31:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-30 08:31:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-30 08:31:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-30 08:31:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-30 08:31:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-30 08:36:22 --> [REQ_ID=154acb80c6e8] [REQUEST][START] HEAD /
DEBUG - 2026-03-30 08:36:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-30 08:36:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-30 08:36:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-30 08:36:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-30 08:36:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-30 08:39:27 --> [REQ_ID=b7026c7cba75] [REQUEST][START] GET /index.php/Budget/Financial-Institute
DEBUG - 2026-03-30 08:39:27 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
INFO - 2026-03-30 08:39:27 --> REDIRECTED ROUTE at https://www.mymiwallet.com/Budget/Account-Manager
DEBUG - 2026-03-30 08:39:27 --> [REQ_ID=b7026c7cba75] [REQUEST][END]
INFO - 2026-03-30 08:39:27 --> [REQ_ID=b7026c7cba75] [PERF] Execution time=0.038794
DEBUG - 2026-03-30 08:41:22 --> [REQ_ID=ca59088d73c1] [REQUEST][START] HEAD /
DEBUG - 2026-03-30 08:41:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-30 08:41:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-30 08:41:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-30 08:41:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-30 08:41:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-30 08:46:22 --> [REQ_ID=33347f9b4a70] [REQUEST][START] HEAD /
DEBUG - 2026-03-30 08:46:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-30 08:46:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-30 08:46:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-30 08:46:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-30 08:46:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-30 08:51:22 --> [REQ_ID=6ae455886cc3] [REQUEST][START] HEAD /
DEBUG - 2026-03-30 08:51:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-30 08:51:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-30 08:51:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-30 08:51:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-30 08:51:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-30 08:56:22 --> [REQ_ID=08614ad89db3] [REQUEST][START] HEAD /
DEBUG - 2026-03-30 08:56:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-30 08:56:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-30 08:56:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-30 08:56:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-30 08:56:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-30 09:00:02 --> [REQ_ID=e04e9d9af6f9] [REQUEST][START] GET /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-30 09:00:02 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-30 09:00:02 --> [REQ_ID=e04e9d9af6f9] [FILTER_BEFORE] /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-30 09:00:02 --> [REQ_ID=e04e9d9af6f9] [ROUTE] Controller=\App\Modules\Management\Controllers\ManagementAPIController Method=Run_CRON_Tasks
DEBUG - 2026-03-30 09:00:02 --> [REQ_ID=e04e9d9af6f9] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-30 09:00:02 --> [REQ_ID=e04e9d9af6f9] [REQUEST][END]
INFO - 2026-03-30 09:00:02 --> [REQ_ID=e04e9d9af6f9] [PERF] Execution time=0.047991
DEBUG - 2026-03-30 09:01:22 --> [REQ_ID=df5c9ae72283] [REQUEST][START] HEAD /
DEBUG - 2026-03-30 09:01:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-30 09:01:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-30 09:01:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-30 09:01:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-30 09:01:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-30 09:06:22 --> [REQ_ID=64ed01f8b1e1] [REQUEST][START] HEAD /
DEBUG - 2026-03-30 09:06:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-30 09:06:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-30 09:06:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-30 09:06:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-30 09:06:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-30 09:11:22 --> [REQ_ID=f6c41b7ae080] [REQUEST][START] HEAD /
DEBUG - 2026-03-30 09:11:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-30 09:11:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-30 09:11:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-30 09:11:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-30 09:11:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-30 09:15:01 --> [REQ_ID=b3b3b2b4b804] [REQUEST][START] GET /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-30 09:15:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-30 09:15:01 --> [REQ_ID=b3b3b2b4b804] [FILTER_BEFORE] /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-30 09:15:01 --> [REQ_ID=b3b3b2b4b804] [ROUTE] Controller=\App\Modules\APIs\Controllers\AlertsAPIController Method=fetchEmailAlerts
DEBUG - 2026-03-30 09:15:01 --> [REQ_ID=b3b3b2b4b804] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-30 09:15:01 --> [REQ_ID=b3b3b2b4b804] [REQUEST][END]
INFO - 2026-03-30 09:15:01 --> [REQ_ID=b3b3b2b4b804] [PERF] Execution time=0.047646
DEBUG - 2026-03-30 09:16:22 --> [REQ_ID=bc7887837f16] [REQUEST][START] HEAD /
DEBUG - 2026-03-30 09:16:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-30 09:16:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-30 09:16:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-30 09:16:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-30 09:16:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-30 09:21:22 --> [REQ_ID=3a1b5c6cefc4] [REQUEST][START] HEAD /
DEBUG - 2026-03-30 09:21:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-30 09:21:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-30 09:21:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-30 09:21:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-30 09:21:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-30 09:23:52 --> [REQ_ID=d262e7362860] [REQUEST][START] GET /index.php/Management/Marketing/Campaigns
DEBUG - 2026-03-30 09:23:52 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-30 09:23:52 --> [REQ_ID=d262e7362860] [FILTER_BEFORE] /index.php/Management/Marketing/Campaigns
DEBUG - 2026-03-30 09:23:52 --> [REQ_ID=d262e7362860] [ROUTE] Controller=\App\Modules\Management\Controllers\MarketingAdminController Method=campaigns
DEBUG - 2026-03-30 09:23:52 --> [REQ_ID=d262e7362860] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Management/Marketing/Campaigns
DEBUG - 2026-03-30 09:23:52 --> [CSRF] token name=csrf_test_name hash=74836e230439357941dea7e316425d41
DEBUG - 2026-03-30 09:23:52 --> [REQ_ID=d262e7362860] [REQUEST][END]
INFO - 2026-03-30 09:23:52 --> [REQ_ID=d262e7362860] [PERF] Execution time=0.057589
DEBUG - 2026-03-30 09:23:52 --> [REQ_ID=7c862c1140d0] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-30 09:23:52 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-30 09:23:52 --> [REQ_ID=7c862c1140d0] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-30 09:23:52 --> [REQ_ID=7c862c1140d0] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-30 09:23:52 --> [REQ_ID=7c862c1140d0] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-30 09:23:52 --> [CSRF] token name=csrf_test_name hash=c1fe2eeff173a993cccab50557d5fa97
DEBUG - 2026-03-30 09:23:52 --> [REQ_ID=3319f056ad5c] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-30 09:23:52 --> [REQ_ID=3319f056ad5c] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-30 09:23:52 --> [REQ_ID=7c862c1140d0] [FILTER_AFTER]
DEBUG - 2026-03-30 09:23:52 --> [REQ_ID=7c862c1140d0] [LIFECYCLE][END] status=200 duration_ms=105.19 memory_delta=0
INFO - 2026-03-30 09:23:52 --> [REQ_ID=3319f056ad5c] [PERF] Execution time=0.104973
DEBUG - 2026-03-30 09:23:52 --> [REQ_ID=7c862c1140d0] [REQUEST][END]
INFO - 2026-03-30 09:23:52 --> [REQ_ID=7c862c1140d0] [PERF] Execution time=0.116922
DEBUG - 2026-03-30 09:26:22 --> [REQ_ID=66e714175d55] [REQUEST][START] HEAD /
DEBUG - 2026-03-30 09:26:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-30 09:26:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-30 09:26:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-30 09:26:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-30 09:26:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-30 09:27:16 --> [REQ_ID=6b49f8690a6b] [REQUEST][START] GET /index.php/Preview/Alert/NASDAQ-GUTS
DEBUG - 2026-03-30 09:27:16 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-30 09:27:16 --> [REQ_ID=6b49f8690a6b] [FILTER_BEFORE] /index.php/Preview/Alert/NASDAQ-GUTS
DEBUG - 2026-03-30 09:27:16 --> [REQ_ID=6b49f8690a6b] [ROUTE] Controller=\App\Modules\User\Controllers\AlertsController Method=preview
DEBUG - 2026-03-30 09:27:16 --> [REQ_ID=6b49f8690a6b] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Preview/Alert/NASDAQ-GUTS
DEBUG - 2026-03-30 09:27:16 --> [CSRF] token name=csrf_test_name hash=57cc69cf4e09b1499941d6311cda3cc6
DEBUG - 2026-03-30 09:27:16 --> [REQ_ID=4918042ae444] [INIT] App\Modules\User\Controllers\AlertsController::GET
INFO - 2026-03-30 09:27:16 --> [REQ_ID=4918042ae444] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-30 09:27:16 --> [REQ_ID=4918042ae444] [METHOD_ENTRY] preview
DEBUG - 2026-03-30 09:27:16 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-30 09:27:16 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-30 09:27:16 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-30 09:27:16 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-30 09:27:16 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-30 09:27:16 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-30 09:27:16 --> MyMIInvestments: no session user detected; skipping personalized hydration.
DEBUG - 2026-03-30 09:27:16 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-30 09:27:16 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-30 09:27:16 --> MyMIMarketing: Pscrape library not installed; Google search scraping will use fallback.
DEBUG - 2026-03-30 09:27:16 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-30 09:27:16 --> MyMIAlerts: no authenticated user context detected.
DEBUG - 2026-03-30 09:27:16 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-30 09:27:16 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-30 09:27:16 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-30 09:27:16 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-30 09:27:16 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-30 09:27:16 --> [SERVICE] App\Services\BudgetService ::setUserId
INFO - 2026-03-30 09:27:16 --> [REQ_ID=4918042ae444] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-30 09:27:16 --> MyMIInvestments: no session user detected; skipping personalized hydration.
DEBUG - 2026-03-30 09:27:16 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-30 09:27:16 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-30 09:27:16 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-30 09:27:16 --> MyMIAlerts: no authenticated user context detected.
INFO - 2026-03-30 09:27:16 --> Premium entitlement guest: user_id= route=/index.php/Preview/Alert/NASDAQ-GUTS feature= tier=free status=free allowed=yes reason=Guest access allowed for this feature.
DEBUG - 2026-03-30 09:27:16 --> TwelveData batch response error: **symbol** or **figi** parameter is missing or invalid. Please provide a valid symbol according to API documentation: https://twelvedata.com/docs#reference-data
DEBUG - 2026-03-30 09:27:17 --> Marketstack fallback failed: 22 : The requested URL returned error: 403
DEBUG - 2026-03-30 09:27:17 --> [REQ_ID=4918042ae444] [VIEW_RENDER] themes/public/previewAlert
INFO - 2026-03-30 09:27:17 --> [REQ_ID=4918042ae444] [MEMORY][commonData:start] 6291456
INFO - 2026-03-30 09:27:17 --> themesMemory usage: 6291456
DEBUG - 2026-03-30 09:27:17 --> [REQ_ID=6b49f8690a6b] [FILTER_AFTER]
DEBUG - 2026-03-30 09:27:17 --> [REQ_ID=6b49f8690a6b] [LIFECYCLE][END] status=200 duration_ms=708.79 memory_delta=2097152
INFO - 2026-03-30 09:27:17 --> [REQ_ID=4918042ae444] [PERF] Execution time=0.706919
DEBUG - 2026-03-30 09:27:17 --> [REQ_ID=6b49f8690a6b] [REQUEST][END]
INFO - 2026-03-30 09:27:17 --> [REQ_ID=6b49f8690a6b] [PERF] Execution time=0.728578
DEBUG - 2026-03-30 09:31:22 --> [REQ_ID=5fa8dd7c1fc4] [REQUEST][START] HEAD /
DEBUG - 2026-03-30 09:31:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-30 09:31:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-30 09:31:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-30 09:31:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-30 09:31:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-30 09:36:22 --> [REQ_ID=db96a821fac9] [REQUEST][START] HEAD /
DEBUG - 2026-03-30 09:36:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-30 09:36:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-30 09:36:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-30 09:36:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-30 09:36:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-30 09:41:22 --> [REQ_ID=d51ab6087b59] [REQUEST][START] HEAD /
DEBUG - 2026-03-30 09:41:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-30 09:41:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-30 09:41:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-30 09:41:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-30 09:41:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-30 09:46:22 --> [REQ_ID=bad9a75fe95f] [REQUEST][START] HEAD /
DEBUG - 2026-03-30 09:46:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-30 09:46:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-30 09:46:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-30 09:46:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-30 09:46:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-30 09:51:22 --> [REQ_ID=af29351c4075] [REQUEST][START] HEAD /
DEBUG - 2026-03-30 09:51:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-30 09:51:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-30 09:51:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-30 09:51:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-30 09:51:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-30 09:56:22 --> [REQ_ID=f1776cbadf5a] [REQUEST][START] HEAD /
DEBUG - 2026-03-30 09:56:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-30 09:56:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-30 09:56:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-30 09:56:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-30 09:56:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-30 10:00:02 --> [REQ_ID=45f0daffad2d] [REQUEST][START] GET /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-30 10:00:02 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-30 10:00:02 --> [REQ_ID=45f0daffad2d] [FILTER_BEFORE] /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-30 10:00:02 --> [REQ_ID=45f0daffad2d] [ROUTE] Controller=\App\Modules\Management\Controllers\ManagementAPIController Method=Run_CRON_Tasks
DEBUG - 2026-03-30 10:00:02 --> [REQ_ID=45f0daffad2d] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-30 10:00:02 --> [REQ_ID=45f0daffad2d] [REQUEST][END]
INFO - 2026-03-30 10:00:02 --> [REQ_ID=45f0daffad2d] [PERF] Execution time=0.035811
DEBUG - 2026-03-30 10:01:22 --> [REQ_ID=38dc99323f8d] [REQUEST][START] HEAD /
DEBUG - 2026-03-30 10:01:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-30 10:01:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-30 10:01:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-30 10:01:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-30 10:01:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-30 10:05:39 --> [REQ_ID=0515f7a4f2a4] [REQUEST][START] GET /index.php/Management/Budgeting
DEBUG - 2026-03-30 10:05:39 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-30 10:05:39 --> [REQ_ID=0515f7a4f2a4] [FILTER_BEFORE] /index.php/Management/Budgeting
DEBUG - 2026-03-30 10:05:39 --> [REQ_ID=0515f7a4f2a4] [ROUTE] Controller=\App\Modules\Management\Controllers\BudgetingAdminController Method=index
DEBUG - 2026-03-30 10:05:39 --> [REQ_ID=0515f7a4f2a4] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Management/Budgeting
DEBUG - 2026-03-30 10:05:39 --> [CSRF] token name=csrf_test_name hash=cd95dd27d2d4449130ba5e68659c8ad7
DEBUG - 2026-03-30 10:05:39 --> [REQ_ID=0515f7a4f2a4] [REQUEST][END]
INFO - 2026-03-30 10:05:39 --> [REQ_ID=0515f7a4f2a4] [PERF] Execution time=0.051451
DEBUG - 2026-03-30 10:05:40 --> [REQ_ID=a80b43b5bb95] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-30 10:05:40 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-30 10:05:40 --> [REQ_ID=a80b43b5bb95] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-30 10:05:40 --> [REQ_ID=a80b43b5bb95] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-30 10:05:40 --> [REQ_ID=a80b43b5bb95] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-30 10:05:40 --> [CSRF] token name=csrf_test_name hash=cd44be16da1dfe12a6171189d2d87856
DEBUG - 2026-03-30 10:05:40 --> [REQ_ID=a0aaa79d93cc] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-30 10:05:40 --> [REQ_ID=a0aaa79d93cc] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-30 10:05:40 --> [REQ_ID=a80b43b5bb95] [FILTER_AFTER]
DEBUG - 2026-03-30 10:05:40 --> [REQ_ID=a80b43b5bb95] [LIFECYCLE][END] status=200 duration_ms=207.99 memory_delta=0
INFO - 2026-03-30 10:05:40 --> [REQ_ID=a0aaa79d93cc] [PERF] Execution time=0.207815
DEBUG - 2026-03-30 10:05:40 --> [REQ_ID=a80b43b5bb95] [REQUEST][END]
INFO - 2026-03-30 10:05:40 --> [REQ_ID=a80b43b5bb95] [PERF] Execution time=0.219652
DEBUG - 2026-03-30 10:06:22 --> [REQ_ID=b8b547001dc2] [REQUEST][START] HEAD /
DEBUG - 2026-03-30 10:06:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-30 10:06:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-30 10:06:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-30 10:06:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-30 10:06:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-30 10:11:22 --> [REQ_ID=06ff675aae5a] [REQUEST][START] HEAD /
DEBUG - 2026-03-30 10:11:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-30 10:11:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-30 10:11:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-30 10:11:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-30 10:11:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-30 10:15:02 --> [REQ_ID=7542cfa5af93] [REQUEST][START] GET /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-30 10:15:02 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-30 10:15:02 --> [REQ_ID=7542cfa5af93] [FILTER_BEFORE] /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-30 10:15:02 --> [REQ_ID=7542cfa5af93] [ROUTE] Controller=\App\Modules\APIs\Controllers\AlertsAPIController Method=fetchEmailAlerts
DEBUG - 2026-03-30 10:15:02 --> [REQ_ID=7542cfa5af93] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-30 10:15:02 --> [REQ_ID=7542cfa5af93] [REQUEST][END]
INFO - 2026-03-30 10:15:02 --> [REQ_ID=7542cfa5af93] [PERF] Execution time=0.053614
DEBUG - 2026-03-30 10:16:12 --> [REQ_ID=84bcad7119d9] [REQUEST][START] GET /
DEBUG - 2026-03-30 10:16:12 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-30 10:16:12 --> [REQ_ID=84bcad7119d9] [FILTER_BEFORE] /
DEBUG - 2026-03-30 10:16:12 --> [REQ_ID=84bcad7119d9] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-30 10:16:12 --> [REQ_ID=84bcad7119d9] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-30 10:16:12 --> [CSRF] token name=csrf_test_name hash=0cdb818d550053e5ed1d8acd296c3f95
DEBUG - 2026-03-30 10:16:12 --> [REQ_ID=25ff9dc3b77d] [INIT] App\Controllers\Home::GET
INFO - 2026-03-30 10:16:12 --> [REQ_ID=25ff9dc3b77d] [MEMORY][controller-start] 4194304
INFO - 2026-03-30 10:16:12 --> [REQ_ID=25ff9dc3b77d] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-30 10:16:12 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-30 10:16:13 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-03-30 10:16:13 --> [REQ_ID=25ff9dc3b77d] [VIEW_RENDER] themes/public/home
INFO - 2026-03-30 10:16:13 --> [REQ_ID=25ff9dc3b77d] [MEMORY][commonData:start] 8388608
INFO - 2026-03-30 10:16:13 --> themesMemory usage: 8388608
DEBUG - 2026-03-30 10:16:13 --> [MetaService] slug= pageName=Home cacheHit= path=DB
DEBUG - 2026-03-30 10:16:13 --> [REQ_ID=84bcad7119d9] [FILTER_AFTER]
DEBUG - 2026-03-30 10:16:13 --> [REQ_ID=84bcad7119d9] [LIFECYCLE][END] status=200 duration_ms=665.53 memory_delta=4194304
INFO - 2026-03-30 10:16:13 --> [REQ_ID=25ff9dc3b77d] [PERF] Execution time=0.664162
DEBUG - 2026-03-30 10:16:13 --> [REQ_ID=84bcad7119d9] [REQUEST][END]
INFO - 2026-03-30 10:16:13 --> [REQ_ID=84bcad7119d9] [PERF] Execution time=0.676122
DEBUG - 2026-03-30 10:16:22 --> [REQ_ID=5ff955305cf0] [REQUEST][START] HEAD /
DEBUG - 2026-03-30 10:16:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-30 10:16:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-30 10:16:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-30 10:16:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-30 10:16:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-30 10:21:22 --> [REQ_ID=37dae02d157e] [REQUEST][START] HEAD /
DEBUG - 2026-03-30 10:21:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-30 10:21:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-30 10:21:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-30 10:21:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-30 10:21:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-30 10:23:39 --> [REQ_ID=27f51f8c186d] [REQUEST][START] GET /index.php/Premium-Features/Wallets
DEBUG - 2026-03-30 10:23:39 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
INFO - 2026-03-30 10:23:39 --> REDIRECTED ROUTE at https://www.mymiwallet.com/Wallets/Manager
DEBUG - 2026-03-30 10:23:39 --> [REQ_ID=27f51f8c186d] [REQUEST][END]
INFO - 2026-03-30 10:23:39 --> [REQ_ID=27f51f8c186d] [PERF] Execution time=0.037184
DEBUG - 2026-03-30 10:26:15 --> [REQ_ID=5d37d6e075fe] [REQUEST][START] GET /
DEBUG - 2026-03-30 10:26:15 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-30 10:26:15 --> [REQ_ID=5d37d6e075fe] [FILTER_BEFORE] /
DEBUG - 2026-03-30 10:26:15 --> [REQ_ID=5d37d6e075fe] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-30 10:26:15 --> [REQ_ID=5d37d6e075fe] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-30 10:26:15 --> [CSRF] token name=csrf_test_name hash=b0725239aebd31d1f8e21866bdc0c96f
DEBUG - 2026-03-30 10:26:15 --> [REQ_ID=85b769a07815] [INIT] App\Controllers\Home::GET
INFO - 2026-03-30 10:26:15 --> [REQ_ID=85b769a07815] [MEMORY][controller-start] 6291456
INFO - 2026-03-30 10:26:15 --> [REQ_ID=85b769a07815] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-30 10:26:15 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-30 10:26:16 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
DEBUG - 2026-03-30 10:26:16 --> [REQ_ID=85b769a07815] [VIEW_RENDER] themes/public/home
INFO - 2026-03-30 10:26:16 --> [REQ_ID=85b769a07815] [MEMORY][commonData:start] 10485760
INFO - 2026-03-30 10:26:16 --> themesMemory usage: 10485760
DEBUG - 2026-03-30 10:26:16 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-30 10:26:16 --> [REQ_ID=5d37d6e075fe] [FILTER_AFTER]
DEBUG - 2026-03-30 10:26:16 --> [REQ_ID=5d37d6e075fe] [LIFECYCLE][END] status=200 duration_ms=647.62 memory_delta=4194304
INFO - 2026-03-30 10:26:16 --> [REQ_ID=85b769a07815] [PERF] Execution time=0.645731
DEBUG - 2026-03-30 10:26:16 --> [REQ_ID=5d37d6e075fe] [REQUEST][END]
INFO - 2026-03-30 10:26:16 --> [REQ_ID=5d37d6e075fe] [PERF] Execution time=0.690228
DEBUG - 2026-03-30 10:26:22 --> [REQ_ID=b3170653af95] [REQUEST][START] HEAD /
DEBUG - 2026-03-30 10:26:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-30 10:26:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-30 10:26:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-30 10:26:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-30 10:26:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-30 10:26:29 --> [REQ_ID=0c2c1036e5fa] [REQUEST][START] GET /
DEBUG - 2026-03-30 10:26:29 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-30 10:26:29 --> [REQ_ID=0c2c1036e5fa] [FILTER_BEFORE] /
DEBUG - 2026-03-30 10:26:29 --> [REQ_ID=0c2c1036e5fa] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-30 10:26:29 --> [REQ_ID=0c2c1036e5fa] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-30 10:26:29 --> [CSRF] token name=csrf_test_name hash=0ca94ceea7a7f8bbdc21ad4fe14a657b
DEBUG - 2026-03-30 10:26:29 --> [REQ_ID=08558ce0e477] [INIT] App\Controllers\Home::GET
INFO - 2026-03-30 10:26:29 --> [REQ_ID=08558ce0e477] [MEMORY][controller-start] 4194304
INFO - 2026-03-30 10:26:29 --> [REQ_ID=08558ce0e477] [MEMORY][commonData:start] 4194304
DEBUG - 2026-03-30 10:26:29 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-30 10:26:30 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
DEBUG - 2026-03-30 10:26:30 --> [REQ_ID=08558ce0e477] [VIEW_RENDER] themes/public/home
INFO - 2026-03-30 10:26:30 --> [REQ_ID=08558ce0e477] [MEMORY][commonData:start] 8388608
INFO - 2026-03-30 10:26:30 --> themesMemory usage: 8388608
DEBUG - 2026-03-30 10:26:30 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-30 10:26:30 --> [REQ_ID=0c2c1036e5fa] [FILTER_AFTER]
DEBUG - 2026-03-30 10:26:30 --> [REQ_ID=0c2c1036e5fa] [LIFECYCLE][END] status=200 duration_ms=536.16 memory_delta=4194304
INFO - 2026-03-30 10:26:30 --> [REQ_ID=08558ce0e477] [PERF] Execution time=0.535933
DEBUG - 2026-03-30 10:26:30 --> [REQ_ID=0c2c1036e5fa] [REQUEST][END]
INFO - 2026-03-30 10:26:30 --> [REQ_ID=0c2c1036e5fa] [PERF] Execution time=0.545153
DEBUG - 2026-03-30 10:31:22 --> [REQ_ID=a5a203efc384] [REQUEST][START] HEAD /
DEBUG - 2026-03-30 10:31:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-30 10:31:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-30 10:31:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-30 10:31:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-30 10:31:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-30 10:36:22 --> [REQ_ID=856109ca62bf] [REQUEST][START] HEAD /
DEBUG - 2026-03-30 10:36:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-30 10:36:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-30 10:36:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-30 10:36:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-30 10:36:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-30 10:41:22 --> [REQ_ID=13dfa7d9ba97] [REQUEST][START] HEAD /
DEBUG - 2026-03-30 10:41:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-30 10:41:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-30 10:41:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-30 10:41:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-30 10:41:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-30 10:42:59 --> [REQ_ID=3bfea3d366d5] [REQUEST][START] GET /index.php/Wallets/Purchase/Memberships/Premium
DEBUG - 2026-03-30 10:42:59 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-30 10:42:59 --> [REQ_ID=3bfea3d366d5] [REQUEST][END]
INFO - 2026-03-30 10:42:59 --> [REQ_ID=3bfea3d366d5] [PERF] Execution time=0.043562
DEBUG - 2026-03-30 10:45:08 --> [REQ_ID=edb0a8d61acb] [REQUEST][START] GET /index.php/Management/Budgets
DEBUG - 2026-03-30 10:45:08 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-30 10:45:08 --> [REQ_ID=edb0a8d61acb] [FILTER_BEFORE] /index.php/Management/Budgets
DEBUG - 2026-03-30 10:45:08 --> [REQ_ID=edb0a8d61acb] [ROUTE] Controller=\App\Modules\Management\Controllers\BudgetsAdminController Method=index
DEBUG - 2026-03-30 10:45:08 --> [REQ_ID=edb0a8d61acb] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Management/Budgets
DEBUG - 2026-03-30 10:45:08 --> [CSRF] token name=csrf_test_name hash=0cc843ef6cbba3c88bf68205a4f60826
DEBUG - 2026-03-30 10:45:08 --> [REQ_ID=edb0a8d61acb] [REQUEST][END]
INFO - 2026-03-30 10:45:08 --> [REQ_ID=edb0a8d61acb] [PERF] Execution time=0.053335
DEBUG - 2026-03-30 10:45:09 --> [REQ_ID=dca1ff1eb933] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-30 10:45:09 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-30 10:45:09 --> [REQ_ID=dca1ff1eb933] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-30 10:45:09 --> [REQ_ID=dca1ff1eb933] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-30 10:45:09 --> [REQ_ID=dca1ff1eb933] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-30 10:45:09 --> [CSRF] token name=csrf_test_name hash=454d3600f6515759bedc51618fd460aa
DEBUG - 2026-03-30 10:45:09 --> [REQ_ID=17c0724b2651] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-30 10:45:09 --> [REQ_ID=17c0724b2651] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-30 10:45:09 --> [REQ_ID=dca1ff1eb933] [FILTER_AFTER]
DEBUG - 2026-03-30 10:45:09 --> [REQ_ID=dca1ff1eb933] [LIFECYCLE][END] status=200 duration_ms=236.36 memory_delta=0
INFO - 2026-03-30 10:45:09 --> [REQ_ID=17c0724b2651] [PERF] Execution time=0.236201
DEBUG - 2026-03-30 10:45:09 --> [REQ_ID=dca1ff1eb933] [REQUEST][END]
INFO - 2026-03-30 10:45:09 --> [REQ_ID=dca1ff1eb933] [PERF] Execution time=0.248218
DEBUG - 2026-03-30 10:46:22 --> [REQ_ID=4e6d4ac86138] [REQUEST][START] HEAD /
DEBUG - 2026-03-30 10:46:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-30 10:46:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-30 10:46:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-30 10:46:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-30 10:46:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-30 10:51:22 --> [REQ_ID=cb7f8c5a0721] [REQUEST][START] HEAD /
DEBUG - 2026-03-30 10:51:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-30 10:51:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-30 10:51:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-30 10:51:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-30 10:51:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-30 10:56:22 --> [REQ_ID=c5cd4c9335e6] [REQUEST][START] HEAD /
DEBUG - 2026-03-30 10:56:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-30 10:56:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-30 10:56:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-30 10:56:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-30 10:56:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-30 10:59:17 --> [REQ_ID=1dffd5bff304] [REQUEST][START] GET /index.php/Exchange
DEBUG - 2026-03-30 10:59:17 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-30 10:59:17 --> [REQ_ID=1dffd5bff304] [FILTER_BEFORE] /index.php/Exchange
DEBUG - 2026-03-30 10:59:17 --> [REQ_ID=1dffd5bff304] [ROUTE] Controller=\App\Modules\Exchange\Controllers\ExchangeController Method=index
DEBUG - 2026-03-30 10:59:17 --> [REQ_ID=1dffd5bff304] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Exchange
DEBUG - 2026-03-30 10:59:17 --> [CSRF] token name=csrf_test_name hash=52e09d09b4c1713348eda5b0dc698d1f
DEBUG - 2026-03-30 10:59:17 --> [REQ_ID=1dffd5bff304] [REQUEST][END]
INFO - 2026-03-30 10:59:17 --> [REQ_ID=1dffd5bff304] [PERF] Execution time=0.053633
DEBUG - 2026-03-30 10:59:17 --> [REQ_ID=fdbaa8c975d2] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-30 10:59:17 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-30 10:59:17 --> [REQ_ID=fdbaa8c975d2] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-30 10:59:17 --> [REQ_ID=fdbaa8c975d2] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-30 10:59:17 --> [REQ_ID=fdbaa8c975d2] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-30 10:59:17 --> [CSRF] token name=csrf_test_name hash=9cff7812922f23cf2bc5f089dc99eb2f
DEBUG - 2026-03-30 10:59:17 --> [REQ_ID=9df80384d02c] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-30 10:59:17 --> [REQ_ID=9df80384d02c] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-30 10:59:17 --> [REQ_ID=fdbaa8c975d2] [FILTER_AFTER]
DEBUG - 2026-03-30 10:59:17 --> [REQ_ID=fdbaa8c975d2] [LIFECYCLE][END] status=200 duration_ms=159.93 memory_delta=0
INFO - 2026-03-30 10:59:17 --> [REQ_ID=9df80384d02c] [PERF] Execution time=0.159784
DEBUG - 2026-03-30 10:59:17 --> [REQ_ID=fdbaa8c975d2] [REQUEST][END]
INFO - 2026-03-30 10:59:17 --> [REQ_ID=fdbaa8c975d2] [PERF] Execution time=0.172327
DEBUG - 2026-03-30 11:00:01 --> [REQ_ID=3db82ba473db] [REQUEST][START] GET /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-30 11:00:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-30 11:00:01 --> [REQ_ID=3db82ba473db] [FILTER_BEFORE] /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-30 11:00:01 --> [REQ_ID=3db82ba473db] [ROUTE] Controller=\App\Modules\Management\Controllers\ManagementAPIController Method=Run_CRON_Tasks
DEBUG - 2026-03-30 11:00:01 --> [REQ_ID=3db82ba473db] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-30 11:00:01 --> [REQ_ID=3db82ba473db] [REQUEST][END]
INFO - 2026-03-30 11:00:01 --> [REQ_ID=3db82ba473db] [PERF] Execution time=0.026628
DEBUG - 2026-03-30 11:01:22 --> [REQ_ID=8656757a2d48] [REQUEST][START] HEAD /
DEBUG - 2026-03-30 11:01:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-30 11:01:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-30 11:01:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-30 11:01:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-30 11:01:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-30 11:02:26 --> [REQ_ID=1eb21ebeaba6] [REQUEST][START] GET /index.php/Investments
DEBUG - 2026-03-30 11:02:26 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-30 11:02:26 --> [REQ_ID=1eb21ebeaba6] [FILTER_BEFORE] /index.php/Investments
DEBUG - 2026-03-30 11:02:26 --> [REQ_ID=1eb21ebeaba6] [ROUTE] Controller=\App\Modules\User\Controllers\InvestmentsController Method=index
DEBUG - 2026-03-30 11:02:26 --> [REQ_ID=1eb21ebeaba6] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Investments
DEBUG - 2026-03-30 11:02:26 --> [CSRF] token name=csrf_test_name hash=7d45ef4b27e27e08ae7eac2cc7cb96fe
DEBUG - 2026-03-30 11:02:26 --> [REQ_ID=1eb21ebeaba6] [REQUEST][END]
INFO - 2026-03-30 11:02:26 --> [REQ_ID=1eb21ebeaba6] [PERF] Execution time=0.056626
DEBUG - 2026-03-30 11:02:26 --> [REQ_ID=18001b33c8dc] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-30 11:02:26 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-30 11:02:26 --> [REQ_ID=18001b33c8dc] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-30 11:02:26 --> [REQ_ID=18001b33c8dc] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-30 11:02:26 --> [REQ_ID=18001b33c8dc] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-30 11:02:26 --> [CSRF] token name=csrf_test_name hash=b2800499f05a42da7b79ff0405d3e659
DEBUG - 2026-03-30 11:02:26 --> [REQ_ID=852c06792182] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-30 11:02:26 --> [REQ_ID=852c06792182] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-30 11:02:26 --> [REQ_ID=18001b33c8dc] [FILTER_AFTER]
DEBUG - 2026-03-30 11:02:26 --> [REQ_ID=18001b33c8dc] [LIFECYCLE][END] status=200 duration_ms=97.52 memory_delta=0
INFO - 2026-03-30 11:02:26 --> [REQ_ID=852c06792182] [PERF] Execution time=0.097359
DEBUG - 2026-03-30 11:02:26 --> [REQ_ID=18001b33c8dc] [REQUEST][END]
INFO - 2026-03-30 11:02:26 --> [REQ_ID=18001b33c8dc] [PERF] Execution time=0.110332
DEBUG - 2026-03-30 11:02:38 --> [REQ_ID=0f766954e924] [REQUEST][START] GET /
DEBUG - 2026-03-30 11:02:38 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-30 11:02:38 --> [REQ_ID=0f766954e924] [FILTER_BEFORE] /
DEBUG - 2026-03-30 11:02:38 --> [REQ_ID=0f766954e924] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-30 11:02:38 --> [REQ_ID=0f766954e924] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-30 11:02:38 --> [CSRF] token name=csrf_test_name hash=fb026ba344c6f35c0d6a276bb16e9d7a
DEBUG - 2026-03-30 11:02:38 --> [REQ_ID=1e7fba1b9783] [INIT] App\Controllers\Home::GET
INFO - 2026-03-30 11:02:38 --> [REQ_ID=1e7fba1b9783] [MEMORY][controller-start] 4194304
INFO - 2026-03-30 11:02:38 --> [REQ_ID=1e7fba1b9783] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-30 11:02:38 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-30 11:02:39 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-03-30 11:02:39 --> [REQ_ID=1e7fba1b9783] [VIEW_RENDER] themes/public/home
INFO - 2026-03-30 11:02:39 --> [REQ_ID=1e7fba1b9783] [MEMORY][commonData:start] 8388608
INFO - 2026-03-30 11:02:39 --> themesMemory usage: 8388608
DEBUG - 2026-03-30 11:02:39 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-30 11:02:39 --> [REQ_ID=0f766954e924] [FILTER_AFTER]
DEBUG - 2026-03-30 11:02:39 --> [REQ_ID=0f766954e924] [LIFECYCLE][END] status=200 duration_ms=786.81 memory_delta=4194304
INFO - 2026-03-30 11:02:39 --> [REQ_ID=1e7fba1b9783] [PERF] Execution time=0.786601
DEBUG - 2026-03-30 11:02:39 --> [REQ_ID=0f766954e924] [REQUEST][END]
INFO - 2026-03-30 11:02:39 --> [REQ_ID=0f766954e924] [PERF] Execution time=0.797054
DEBUG - 2026-03-30 11:05:09 --> [REQ_ID=61e4708743e6] [REQUEST][START] GET /index.php
DEBUG - 2026-03-30 11:05:09 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-30 11:05:09 --> [REQ_ID=61e4708743e6] [FILTER_BEFORE] /index.php
DEBUG - 2026-03-30 11:05:09 --> [REQ_ID=61e4708743e6] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-30 11:05:09 --> [REQ_ID=61e4708743e6] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-30 11:05:09 --> [CSRF] token name=csrf_test_name hash=ca11e7649abe72c4d59348ded0c19629
DEBUG - 2026-03-30 11:05:09 --> [REQ_ID=20591f800fe7] [INIT] App\Controllers\Home::GET
INFO - 2026-03-30 11:05:09 --> [REQ_ID=20591f800fe7] [MEMORY][controller-start] 6291456
INFO - 2026-03-30 11:05:09 --> [REQ_ID=20591f800fe7] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-30 11:05:09 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-30 11:05:10 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
DEBUG - 2026-03-30 11:05:10 --> [REQ_ID=20591f800fe7] [VIEW_RENDER] themes/public/home
INFO - 2026-03-30 11:05:10 --> [REQ_ID=20591f800fe7] [MEMORY][commonData:start] 10485760
INFO - 2026-03-30 11:05:10 --> themesMemory usage: 10485760
DEBUG - 2026-03-30 11:05:10 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-30 11:05:10 --> [REQ_ID=61e4708743e6] [FILTER_AFTER]
DEBUG - 2026-03-30 11:05:10 --> [REQ_ID=61e4708743e6] [LIFECYCLE][END] status=200 duration_ms=576.36 memory_delta=4194304
INFO - 2026-03-30 11:05:10 --> [REQ_ID=20591f800fe7] [PERF] Execution time=0.574319
DEBUG - 2026-03-30 11:05:10 --> [REQ_ID=61e4708743e6] [REQUEST][END]
INFO - 2026-03-30 11:05:10 --> [REQ_ID=61e4708743e6] [PERF] Execution time=0.615387
DEBUG - 2026-03-30 11:06:22 --> [REQ_ID=7ab1e346ce19] [REQUEST][START] HEAD /
DEBUG - 2026-03-30 11:06:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-30 11:06:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-30 11:06:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-30 11:06:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-30 11:06:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-30 11:11:22 --> [REQ_ID=4c4cb0bd4fca] [REQUEST][START] HEAD /
DEBUG - 2026-03-30 11:11:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-30 11:11:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-30 11:11:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-30 11:11:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-30 11:11:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-30 11:13:46 --> [REQ_ID=bfdde7ffff5b] [REQUEST][START] GET /index.php/Budget/Financial-Forecaster
DEBUG - 2026-03-30 11:13:46 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-30 11:13:46 --> [REQ_ID=bfdde7ffff5b] [FILTER_BEFORE] /index.php/Budget/Financial-Forecaster
DEBUG - 2026-03-30 11:13:46 --> [REQ_ID=bfdde7ffff5b] [ROUTE] Controller=\App\Modules\User\Controllers\BudgetController Method=financialForecaster
DEBUG - 2026-03-30 11:13:46 --> [REQ_ID=bfdde7ffff5b] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Budget/Financial-Forecaster
DEBUG - 2026-03-30 11:13:46 --> [CSRF] token name=csrf_test_name hash=2f8af3da1b4ae7ecf75472c86d0fa04e
DEBUG - 2026-03-30 11:13:46 --> [REQ_ID=bfdde7ffff5b] [REQUEST][END]
INFO - 2026-03-30 11:13:46 --> [REQ_ID=bfdde7ffff5b] [PERF] Execution time=0.057023
DEBUG - 2026-03-30 11:13:47 --> [REQ_ID=f892b2e84768] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-30 11:13:47 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-30 11:13:47 --> [REQ_ID=f892b2e84768] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-30 11:13:47 --> [REQ_ID=f892b2e84768] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-30 11:13:47 --> [REQ_ID=f892b2e84768] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-30 11:13:47 --> [CSRF] token name=csrf_test_name hash=c8373eec50d829f725768f9e04b093c9
DEBUG - 2026-03-30 11:13:47 --> [REQ_ID=6e52c7beee98] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-30 11:13:47 --> [REQ_ID=6e52c7beee98] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-30 11:13:47 --> [REQ_ID=f892b2e84768] [FILTER_AFTER]
DEBUG - 2026-03-30 11:13:47 --> [REQ_ID=f892b2e84768] [LIFECYCLE][END] status=200 duration_ms=35.59 memory_delta=0
INFO - 2026-03-30 11:13:47 --> [REQ_ID=6e52c7beee98] [PERF] Execution time=0.035407
DEBUG - 2026-03-30 11:13:47 --> [REQ_ID=f892b2e84768] [REQUEST][END]
INFO - 2026-03-30 11:13:47 --> [REQ_ID=f892b2e84768] [PERF] Execution time=0.046905
DEBUG - 2026-03-30 11:15:02 --> [REQ_ID=492564a0af79] [REQUEST][START] GET /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-30 11:15:02 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-30 11:15:02 --> [REQ_ID=492564a0af79] [FILTER_BEFORE] /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-30 11:15:02 --> [REQ_ID=492564a0af79] [ROUTE] Controller=\App\Modules\APIs\Controllers\AlertsAPIController Method=fetchEmailAlerts
DEBUG - 2026-03-30 11:15:02 --> [REQ_ID=492564a0af79] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-30 11:15:02 --> [REQ_ID=492564a0af79] [REQUEST][END]
INFO - 2026-03-30 11:15:02 --> [REQ_ID=492564a0af79] [PERF] Execution time=0.046132
DEBUG - 2026-03-30 11:16:22 --> [REQ_ID=dce34be2058c] [REQUEST][START] HEAD /
DEBUG - 2026-03-30 11:16:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-30 11:16:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-30 11:16:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-30 11:16:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-30 11:16:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-30 11:20:20 --> [REQ_ID=17d18d58020c] [REQUEST][START] GET /
DEBUG - 2026-03-30 11:20:20 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-30 11:20:20 --> [REQ_ID=17d18d58020c] [FILTER_BEFORE] /
DEBUG - 2026-03-30 11:20:20 --> [REQ_ID=17d18d58020c] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-30 11:20:20 --> [REQ_ID=17d18d58020c] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-30 11:20:20 --> [CSRF] token name=csrf_test_name hash=e9ac5f2a5f3cc8fb7071efa1c347659b
DEBUG - 2026-03-30 11:20:20 --> [REQ_ID=3c6e1f978fdc] [INIT] App\Controllers\Home::GET
INFO - 2026-03-30 11:20:20 --> [REQ_ID=3c6e1f978fdc] [MEMORY][controller-start] 6291456
INFO - 2026-03-30 11:20:21 --> [REQ_ID=3c6e1f978fdc] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-30 11:20:21 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-30 11:20:21 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-03-30 11:20:21 --> [REQ_ID=3c6e1f978fdc] [VIEW_RENDER] themes/public/home
INFO - 2026-03-30 11:20:21 --> [REQ_ID=3c6e1f978fdc] [MEMORY][commonData:start] 10485760
INFO - 2026-03-30 11:20:21 --> themesMemory usage: 10485760
DEBUG - 2026-03-30 11:20:21 --> [MetaService] slug= pageName=Home cacheHit= path=DB
DEBUG - 2026-03-30 11:20:21 --> [REQ_ID=17d18d58020c] [FILTER_AFTER]
DEBUG - 2026-03-30 11:20:21 --> [REQ_ID=17d18d58020c] [LIFECYCLE][END] status=200 duration_ms=848.92 memory_delta=4194304
INFO - 2026-03-30 11:20:21 --> [REQ_ID=3c6e1f978fdc] [PERF] Execution time=0.846925
DEBUG - 2026-03-30 11:20:21 --> [REQ_ID=17d18d58020c] [REQUEST][END]
INFO - 2026-03-30 11:20:21 --> [REQ_ID=17d18d58020c] [PERF] Execution time=0.887076
DEBUG - 2026-03-30 11:21:22 --> [REQ_ID=a0843647d62b] [REQUEST][START] HEAD /
DEBUG - 2026-03-30 11:21:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-30 11:21:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-30 11:21:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-30 11:21:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-30 11:21:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-30 11:21:42 --> [REQ_ID=87c393ce6148] [REQUEST][START] GET /index.php/Management/Users
DEBUG - 2026-03-30 11:21:42 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-30 11:21:42 --> [REQ_ID=87c393ce6148] [FILTER_BEFORE] /index.php/Management/Users
DEBUG - 2026-03-30 11:21:42 --> [REQ_ID=87c393ce6148] [ROUTE] Controller=\App\Modules\Management\Controllers\UsersController Method=index
DEBUG - 2026-03-30 11:21:42 --> [REQ_ID=87c393ce6148] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Management/Users
DEBUG - 2026-03-30 11:21:42 --> [CSRF] token name=csrf_test_name hash=cafc1af1b0de9e39b59d2a7b673e0560
DEBUG - 2026-03-30 11:21:42 --> [REQ_ID=87c393ce6148] [REQUEST][END]
INFO - 2026-03-30 11:21:42 --> [REQ_ID=87c393ce6148] [PERF] Execution time=0.013486
DEBUG - 2026-03-30 11:21:43 --> [REQ_ID=74e16169b52d] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-30 11:21:43 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-30 11:21:43 --> [REQ_ID=74e16169b52d] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-30 11:21:43 --> [REQ_ID=74e16169b52d] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-30 11:21:43 --> [REQ_ID=74e16169b52d] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-30 11:21:43 --> [CSRF] token name=csrf_test_name hash=8e195866d97ed97612f13ecc84623bbc
DEBUG - 2026-03-30 11:21:43 --> [REQ_ID=3bb5638f7645] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-30 11:21:43 --> [REQ_ID=3bb5638f7645] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-30 11:21:43 --> [REQ_ID=74e16169b52d] [FILTER_AFTER]
DEBUG - 2026-03-30 11:21:43 --> [REQ_ID=74e16169b52d] [LIFECYCLE][END] status=200 duration_ms=21.41 memory_delta=0
INFO - 2026-03-30 11:21:43 --> [REQ_ID=3bb5638f7645] [PERF] Execution time=0.021253
DEBUG - 2026-03-30 11:21:43 --> [REQ_ID=74e16169b52d] [REQUEST][END]
INFO - 2026-03-30 11:21:43 --> [REQ_ID=74e16169b52d] [PERF] Execution time=0.034200
DEBUG - 2026-03-30 11:21:57 --> [REQ_ID=b8e22f174b51] [REQUEST][START] POST /index.php/register
DEBUG - 2026-03-30 11:21:57 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-30 11:21:57 --> [REQ_ID=b8e22f174b51] [FILTER_BEFORE] /index.php/register
DEBUG - 2026-03-30 11:21:57 --> [REQ_ID=b8e22f174b51] [ROUTE] Controller=\App\Controllers\AuthController Method=attemptRegister
DEBUG - 2026-03-30 11:21:57 --> [REQ_ID=b8e22f174b51] [LIFECYCLE][START] POST https://www.mymiwallet.com/index.php/register
DEBUG - 2026-03-30 11:21:57 --> [CSRF] token name=csrf_test_name hash=e9ac5f2a5f3cc8fb7071efa1c347659b
DEBUG - 2026-03-30 11:21:57 --> [REQ_ID=b8e22f174b51] [REQUEST][END]
INFO - 2026-03-30 11:21:57 --> [REQ_ID=b8e22f174b51] [PERF] Execution time=0.009634
DEBUG - 2026-03-30 11:21:57 --> [REQ_ID=08e63e7e5ad8] [REQUEST][START] GET /index.php/
DEBUG - 2026-03-30 11:21:57 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-30 11:21:57 --> [REQ_ID=08e63e7e5ad8] [FILTER_BEFORE] /index.php/
DEBUG - 2026-03-30 11:21:57 --> [REQ_ID=08e63e7e5ad8] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-30 11:21:57 --> [REQ_ID=08e63e7e5ad8] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-30 11:21:57 --> [CSRF] token name=csrf_test_name hash=e9ac5f2a5f3cc8fb7071efa1c347659b
DEBUG - 2026-03-30 11:21:57 --> [REQ_ID=2695ed74f59e] [INIT] App\Controllers\Home::GET
INFO - 2026-03-30 11:21:57 --> [REQ_ID=2695ed74f59e] [MEMORY][controller-start] 4194304
INFO - 2026-03-30 11:21:57 --> [REQ_ID=2695ed74f59e] [MEMORY][commonData:start] 4194304
DEBUG - 2026-03-30 11:21:57 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-30 11:21:58 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
DEBUG - 2026-03-30 11:21:58 --> [REQ_ID=2695ed74f59e] [VIEW_RENDER] themes/public/home
INFO - 2026-03-30 11:21:58 --> [REQ_ID=2695ed74f59e] [MEMORY][commonData:start] 8388608
INFO - 2026-03-30 11:21:58 --> themesMemory usage: 8388608
DEBUG - 2026-03-30 11:21:58 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-30 11:21:58 --> [REQ_ID=08e63e7e5ad8] [FILTER_AFTER]
DEBUG - 2026-03-30 11:21:58 --> [REQ_ID=08e63e7e5ad8] [LIFECYCLE][END] status=200 duration_ms=558.74 memory_delta=4194304
INFO - 2026-03-30 11:21:58 --> [REQ_ID=2695ed74f59e] [PERF] Execution time=0.558606
DEBUG - 2026-03-30 11:21:58 --> [REQ_ID=08e63e7e5ad8] [REQUEST][END]
INFO - 2026-03-30 11:21:58 --> [REQ_ID=08e63e7e5ad8] [PERF] Execution time=0.567373
DEBUG - 2026-03-30 11:21:58 --> [REQ_ID=435bd64ba9c8] [REQUEST][START] GET /index.php?debugbar
DEBUG - 2026-03-30 11:21:58 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-30 11:21:58 --> [REQ_ID=435bd64ba9c8] [FILTER_BEFORE] /index.php?debugbar
DEBUG - 2026-03-30 11:21:58 --> [REQ_ID=435bd64ba9c8] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-30 11:21:58 --> [REQ_ID=435bd64ba9c8] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php?debugbar=
DEBUG - 2026-03-30 11:21:58 --> [CSRF] token name=csrf_test_name hash=e9ac5f2a5f3cc8fb7071efa1c347659b
DEBUG - 2026-03-30 11:21:58 --> [REQ_ID=7907a07ec32e] [INIT] App\Controllers\Home::GET
INFO - 2026-03-30 11:21:58 --> [REQ_ID=7907a07ec32e] [MEMORY][controller-start] 6291456
INFO - 2026-03-30 11:21:58 --> [REQ_ID=7907a07ec32e] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-30 11:21:58 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-30 11:21:58 --> [REQ_ID=e8ea8bdf4699] [REQUEST][START] GET /index.php?debugbar
DEBUG - 2026-03-30 11:21:58 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
DEBUG - 2026-03-30 11:21:58 --> [REQ_ID=7907a07ec32e] [VIEW_RENDER] themes/public/home
INFO - 2026-03-30 11:21:58 --> [REQ_ID=7907a07ec32e] [MEMORY][commonData:start] 8388608
INFO - 2026-03-30 11:21:58 --> themesMemory usage: 8388608
DEBUG - 2026-03-30 11:21:58 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-30 11:21:58 --> [REQ_ID=435bd64ba9c8] [FILTER_AFTER]
DEBUG - 2026-03-30 11:21:58 --> [REQ_ID=435bd64ba9c8] [LIFECYCLE][END] status=200 duration_ms=487.31 memory_delta=2097152
INFO - 2026-03-30 11:21:58 --> [REQ_ID=7907a07ec32e] [PERF] Execution time=0.487025
DEBUG - 2026-03-30 11:21:58 --> [REQ_ID=435bd64ba9c8] [REQUEST][END]
INFO - 2026-03-30 11:21:58 --> [REQ_ID=435bd64ba9c8] [PERF] Execution time=0.501839
DEBUG - 2026-03-30 11:21:58 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-30 11:21:58 --> [REQ_ID=e8ea8bdf4699] [FILTER_BEFORE] /index.php?debugbar
DEBUG - 2026-03-30 11:21:58 --> [REQ_ID=e8ea8bdf4699] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-30 11:21:58 --> [REQ_ID=e8ea8bdf4699] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php?debugbar=
DEBUG - 2026-03-30 11:21:58 --> [CSRF] token name=csrf_test_name hash=e9ac5f2a5f3cc8fb7071efa1c347659b
DEBUG - 2026-03-30 11:21:58 --> [REQ_ID=4c76316f8b28] [INIT] App\Controllers\Home::GET
INFO - 2026-03-30 11:21:58 --> [REQ_ID=4c76316f8b28] [MEMORY][controller-start] 6291456
INFO - 2026-03-30 11:21:59 --> [REQ_ID=4c76316f8b28] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-30 11:21:59 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-30 11:21:59 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
DEBUG - 2026-03-30 11:21:59 --> [REQ_ID=4c76316f8b28] [VIEW_RENDER] themes/public/home
INFO - 2026-03-30 11:21:59 --> [REQ_ID=4c76316f8b28] [MEMORY][commonData:start] 10485760
INFO - 2026-03-30 11:21:59 --> themesMemory usage: 10485760
DEBUG - 2026-03-30 11:21:59 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-30 11:21:59 --> [REQ_ID=e8ea8bdf4699] [FILTER_AFTER]
DEBUG - 2026-03-30 11:21:59 --> [REQ_ID=e8ea8bdf4699] [LIFECYCLE][END] status=200 duration_ms=609.45 memory_delta=4194304
INFO - 2026-03-30 11:21:59 --> [REQ_ID=4c76316f8b28] [PERF] Execution time=0.607542
DEBUG - 2026-03-30 11:21:59 --> [REQ_ID=e8ea8bdf4699] [REQUEST][END]
INFO - 2026-03-30 11:21:59 --> [REQ_ID=e8ea8bdf4699] [PERF] Execution time=0.670723
DEBUG - 2026-03-30 11:23:36 --> [REQ_ID=9325ae612fb0] [REQUEST][START] GET /
DEBUG - 2026-03-30 11:23:36 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-30 11:23:36 --> [REQ_ID=9325ae612fb0] [FILTER_BEFORE] /
DEBUG - 2026-03-30 11:23:36 --> [REQ_ID=9325ae612fb0] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-30 11:23:36 --> [REQ_ID=9325ae612fb0] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-30 11:23:36 --> [CSRF] token name=csrf_test_name hash=70a823e71e6a5ef7f084393396374d0d
DEBUG - 2026-03-30 11:23:36 --> [REQ_ID=977857ce0698] [INIT] App\Controllers\Home::GET
INFO - 2026-03-30 11:23:36 --> [REQ_ID=977857ce0698] [MEMORY][controller-start] 6291456
INFO - 2026-03-30 11:23:36 --> [REQ_ID=977857ce0698] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-30 11:23:36 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-30 11:23:37 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
DEBUG - 2026-03-30 11:23:37 --> [REQ_ID=977857ce0698] [VIEW_RENDER] themes/public/home
INFO - 2026-03-30 11:23:37 --> [REQ_ID=977857ce0698] [MEMORY][commonData:start] 10485760
INFO - 2026-03-30 11:23:37 --> themesMemory usage: 10485760
DEBUG - 2026-03-30 11:23:37 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-30 11:23:37 --> [REQ_ID=9325ae612fb0] [FILTER_AFTER]
DEBUG - 2026-03-30 11:23:37 --> [REQ_ID=9325ae612fb0] [LIFECYCLE][END] status=200 duration_ms=652.00 memory_delta=4194304
INFO - 2026-03-30 11:23:37 --> [REQ_ID=977857ce0698] [PERF] Execution time=0.649877
DEBUG - 2026-03-30 11:23:37 --> [REQ_ID=9325ae612fb0] [REQUEST][END]
INFO - 2026-03-30 11:23:37 --> [REQ_ID=9325ae612fb0] [PERF] Execution time=0.692501
DEBUG - 2026-03-30 11:25:57 --> [REQ_ID=3526c5404443] [REQUEST][START] GET /index.php/
DEBUG - 2026-03-30 11:25:57 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-30 11:25:57 --> [REQ_ID=3526c5404443] [FILTER_BEFORE] /index.php/
DEBUG - 2026-03-30 11:25:57 --> [REQ_ID=3526c5404443] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-30 11:25:57 --> [REQ_ID=3526c5404443] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-30 11:25:57 --> [CSRF] token name=csrf_test_name hash=e9ac5f2a5f3cc8fb7071efa1c347659b
DEBUG - 2026-03-30 11:25:57 --> [REQ_ID=37a2b71d2059] [INIT] App\Controllers\Home::GET
INFO - 2026-03-30 11:25:57 --> [REQ_ID=37a2b71d2059] [MEMORY][controller-start] 6291456
INFO - 2026-03-30 11:25:57 --> [REQ_ID=37a2b71d2059] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-30 11:25:57 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-30 11:25:57 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
DEBUG - 2026-03-30 11:25:57 --> [REQ_ID=37a2b71d2059] [VIEW_RENDER] themes/public/home
INFO - 2026-03-30 11:25:57 --> [REQ_ID=37a2b71d2059] [MEMORY][commonData:start] 10485760
INFO - 2026-03-30 11:25:57 --> themesMemory usage: 10485760
DEBUG - 2026-03-30 11:25:57 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-30 11:25:57 --> [REQ_ID=3526c5404443] [FILTER_AFTER]
DEBUG - 2026-03-30 11:25:57 --> [REQ_ID=3526c5404443] [LIFECYCLE][END] status=200 duration_ms=562.93 memory_delta=4194304
INFO - 2026-03-30 11:25:57 --> [REQ_ID=37a2b71d2059] [PERF] Execution time=0.560980
DEBUG - 2026-03-30 11:25:57 --> [REQ_ID=3526c5404443] [REQUEST][END]
INFO - 2026-03-30 11:25:57 --> [REQ_ID=3526c5404443] [PERF] Execution time=0.602068
DEBUG - 2026-03-30 11:26:22 --> [REQ_ID=b74074cdbc12] [REQUEST][START] HEAD /
DEBUG - 2026-03-30 11:26:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-30 11:26:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-30 11:26:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-30 11:26:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-30 11:26:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
INFO - 2026-03-30 11:26:29 --> [SPARK_START] App\Commands\Logs\SummarizeAll
INFO - 2026-03-30 11:26:29 --> [SPARK_MEMORY] 18874368
INFO - 2026-03-30 11:26:29 --> [spark:logs:summarize-all] Intent
INFO - 2026-03-30 11:26:29 --> [SPARK_COMPLETE] App\Commands\Logs\SummarizeAll duration=0.310338
INFO - 2026-03-30 11:26:29 --> [SPARK_MEMORY] 27262976
DEBUG - 2026-03-30 11:31:22 --> [REQ_ID=1ade2bcc65d4] [REQUEST][START] HEAD /
DEBUG - 2026-03-30 11:31:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-30 11:31:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-30 11:31:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-30 11:31:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-30 11:31:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-30 11:32:49 --> [REQ_ID=50e0d6ad4907] [REQUEST][START] GET /index.php/Premium-Features/Advanced-Charting
DEBUG - 2026-03-30 11:32:49 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
INFO - 2026-03-30 11:32:49 --> REDIRECTED ROUTE at https://www.mymiwallet.com/Features/Brokerage-Integrations
DEBUG - 2026-03-30 11:32:49 --> [REQ_ID=50e0d6ad4907] [REQUEST][END]
INFO - 2026-03-30 11:32:49 --> [REQ_ID=50e0d6ad4907] [PERF] Execution time=0.037555
DEBUG - 2026-03-30 11:35:14 --> [REQ_ID=aa0ad4356901] [REQUEST][START] HEAD /
DEBUG - 2026-03-30 11:35:14 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-30 11:35:14 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-30 11:35:14 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-30 11:35:14 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-30 11:35:14 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: none
ERROR - 2026-03-30 11:35:14 --> [ERROR_PAGE] event=error_404 status=404 message=Page not found.
DEBUG - 2026-03-30 11:36:22 --> [REQ_ID=0a877b89fe24] [REQUEST][START] HEAD /
DEBUG - 2026-03-30 11:36:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-30 11:36:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-30 11:36:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-30 11:36:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-30 11:36:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-30 11:41:22 --> [REQ_ID=cbd753e92adc] [REQUEST][START] HEAD /
DEBUG - 2026-03-30 11:41:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-30 11:41:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-30 11:41:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-30 11:41:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-30 11:41:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-30 11:46:22 --> [REQ_ID=befaf3ee9f5f] [REQUEST][START] HEAD /
DEBUG - 2026-03-30 11:46:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-30 11:46:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-30 11:46:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-30 11:46:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-30 11:46:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-30 11:51:22 --> [REQ_ID=3337d17a2da8] [REQUEST][START] HEAD /
DEBUG - 2026-03-30 11:51:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-30 11:51:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-30 11:51:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-30 11:51:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-30 11:51:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-30 11:55:14 --> [REQ_ID=abe9c848e4f4] [REQUEST][START] GET /index.php/Blog/Personal-Budgeting/The-Importance-of-Personal-Financial-Budgeting
DEBUG - 2026-03-30 11:55:14 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-30 11:55:14 --> [REQ_ID=abe9c848e4f4] [REQUEST][END]
INFO - 2026-03-30 11:55:14 --> [REQ_ID=abe9c848e4f4] [PERF] Execution time=0.039976
DEBUG - 2026-03-30 11:56:22 --> [REQ_ID=646790c8490a] [REQUEST][START] HEAD /
DEBUG - 2026-03-30 11:56:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-30 11:56:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-30 11:56:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-30 11:56:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-30 11:56:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-30 12:00:01 --> [REQ_ID=a81cc23e07e7] [REQUEST][START] GET /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-30 12:00:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-30 12:00:01 --> [REQ_ID=a81cc23e07e7] [FILTER_BEFORE] /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-30 12:00:01 --> [REQ_ID=a81cc23e07e7] [ROUTE] Controller=\App\Modules\Management\Controllers\ManagementAPIController Method=Run_CRON_Tasks
DEBUG - 2026-03-30 12:00:01 --> [REQ_ID=a81cc23e07e7] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-30 12:00:01 --> [REQ_ID=a81cc23e07e7] [REQUEST][END]
INFO - 2026-03-30 12:00:01 --> [REQ_ID=a81cc23e07e7] [PERF] Execution time=0.049089
DEBUG - 2026-03-30 12:01:22 --> [REQ_ID=d011afeb24cd] [REQUEST][START] HEAD /
DEBUG - 2026-03-30 12:01:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-30 12:01:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-30 12:01:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-30 12:01:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-30 12:01:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-30 12:02:33 --> [REQ_ID=2ea54c70a917] [REQUEST][START] GET /
DEBUG - 2026-03-30 12:02:33 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-30 12:02:33 --> [REQ_ID=2ea54c70a917] [FILTER_BEFORE] /
DEBUG - 2026-03-30 12:02:33 --> [REQ_ID=2ea54c70a917] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-30 12:02:33 --> [REQ_ID=2ea54c70a917] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-30 12:02:33 --> [CSRF] token name=csrf_test_name hash=d33688621cad7c8095a418e864f94238
DEBUG - 2026-03-30 12:02:33 --> [REQ_ID=3311d8446cdc] [INIT] App\Controllers\Home::GET
INFO - 2026-03-30 12:02:33 --> [REQ_ID=3311d8446cdc] [MEMORY][controller-start] 4194304
INFO - 2026-03-30 12:02:33 --> [REQ_ID=3311d8446cdc] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-30 12:02:33 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-30 12:02:34 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-03-30 12:02:34 --> [REQ_ID=3311d8446cdc] [VIEW_RENDER] themes/public/home
INFO - 2026-03-30 12:02:34 --> [REQ_ID=3311d8446cdc] [MEMORY][commonData:start] 8388608
INFO - 2026-03-30 12:02:34 --> themesMemory usage: 8388608
DEBUG - 2026-03-30 12:02:34 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-30 12:02:34 --> [REQ_ID=2ea54c70a917] [FILTER_AFTER]
DEBUG - 2026-03-30 12:02:34 --> [REQ_ID=2ea54c70a917] [LIFECYCLE][END] status=200 duration_ms=596.42 memory_delta=4194304
INFO - 2026-03-30 12:02:34 --> [REQ_ID=3311d8446cdc] [PERF] Execution time=0.594506
DEBUG - 2026-03-30 12:02:34 --> [REQ_ID=2ea54c70a917] [REQUEST][END]
INFO - 2026-03-30 12:02:34 --> [REQ_ID=2ea54c70a917] [PERF] Execution time=0.615868
DEBUG - 2026-03-30 12:03:25 --> [REQ_ID=07a80c04fdff] [REQUEST][START] GET /
DEBUG - 2026-03-30 12:03:25 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-30 12:03:25 --> [REQ_ID=07a80c04fdff] [FILTER_BEFORE] /
DEBUG - 2026-03-30 12:03:25 --> [REQ_ID=07a80c04fdff] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-30 12:03:25 --> [REQ_ID=07a80c04fdff] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-30 12:03:25 --> [CSRF] token name=csrf_test_name hash=3d948b74f672a9f984d3461095de4598
DEBUG - 2026-03-30 12:03:25 --> [REQ_ID=3bbdab1fa332] [INIT] App\Controllers\Home::GET
INFO - 2026-03-30 12:03:25 --> [REQ_ID=3bbdab1fa332] [MEMORY][controller-start] 4194304
INFO - 2026-03-30 12:03:26 --> [REQ_ID=3bbdab1fa332] [MEMORY][commonData:start] 4194304
DEBUG - 2026-03-30 12:03:26 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-30 12:03:26 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
DEBUG - 2026-03-30 12:03:26 --> [REQ_ID=3bbdab1fa332] [VIEW_RENDER] themes/public/home
INFO - 2026-03-30 12:03:26 --> [REQ_ID=3bbdab1fa332] [MEMORY][commonData:start] 8388608
INFO - 2026-03-30 12:03:26 --> themesMemory usage: 8388608
DEBUG - 2026-03-30 12:03:26 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-30 12:03:26 --> [REQ_ID=07a80c04fdff] [FILTER_AFTER]
DEBUG - 2026-03-30 12:03:26 --> [REQ_ID=07a80c04fdff] [LIFECYCLE][END] status=200 duration_ms=1,016.06 memory_delta=4194304
INFO - 2026-03-30 12:03:26 --> [REQ_ID=3bbdab1fa332] [PERF] Execution time=1.015709
DEBUG - 2026-03-30 12:03:26 --> [REQ_ID=07a80c04fdff] [REQUEST][END]
INFO - 2026-03-30 12:03:26 --> [REQ_ID=07a80c04fdff] [PERF] Execution time=1.026181
DEBUG - 2026-03-30 12:05:59 --> [REQ_ID=fdb815776055] [REQUEST][START] GET /index.php/Management/Marketing/Promote/Solana
DEBUG - 2026-03-30 12:05:59 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-30 12:05:59 --> [REQ_ID=fdb815776055] [FILTER_BEFORE] /index.php/Management/Marketing/Promote/Solana
DEBUG - 2026-03-30 12:05:59 --> [REQ_ID=fdb815776055] [ROUTE] Controller=\App\Modules\Management\Controllers\MarketingAdminController Method=promote
DEBUG - 2026-03-30 12:05:59 --> [REQ_ID=fdb815776055] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Management/Marketing/Promote/Solana
DEBUG - 2026-03-30 12:05:59 --> [CSRF] token name=csrf_test_name hash=a4a8eff75921d69f8ec007632dc2f0ff
DEBUG - 2026-03-30 12:05:59 --> [REQ_ID=fdb815776055] [REQUEST][END]
INFO - 2026-03-30 12:05:59 --> [REQ_ID=fdb815776055] [PERF] Execution time=0.062073
DEBUG - 2026-03-30 12:05:59 --> [REQ_ID=708a8d041dd5] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-30 12:05:59 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-30 12:05:59 --> [REQ_ID=708a8d041dd5] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-30 12:05:59 --> [REQ_ID=708a8d041dd5] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-30 12:05:59 --> [REQ_ID=708a8d041dd5] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-30 12:05:59 --> [CSRF] token name=csrf_test_name hash=c45c0ad5ee587ee10602c1582f4a0279
DEBUG - 2026-03-30 12:05:59 --> [REQ_ID=a1d22322a522] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-30 12:05:59 --> [REQ_ID=a1d22322a522] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-30 12:05:59 --> [REQ_ID=708a8d041dd5] [FILTER_AFTER]
DEBUG - 2026-03-30 12:05:59 --> [REQ_ID=708a8d041dd5] [LIFECYCLE][END] status=200 duration_ms=63.22 memory_delta=0
INFO - 2026-03-30 12:05:59 --> [REQ_ID=a1d22322a522] [PERF] Execution time=0.062986
DEBUG - 2026-03-30 12:05:59 --> [REQ_ID=708a8d041dd5] [REQUEST][END]
INFO - 2026-03-30 12:05:59 --> [REQ_ID=708a8d041dd5] [PERF] Execution time=0.075272
DEBUG - 2026-03-30 12:06:22 --> [REQ_ID=446431e3617e] [REQUEST][START] HEAD /
DEBUG - 2026-03-30 12:06:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-30 12:06:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-30 12:06:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-30 12:06:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-30 12:06:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-30 12:06:28 --> [REQ_ID=d026666f563b] [REQUEST][START] GET /
DEBUG - 2026-03-30 12:06:28 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-30 12:06:28 --> [REQ_ID=d026666f563b] [FILTER_BEFORE] /
DEBUG - 2026-03-30 12:06:28 --> [REQ_ID=d026666f563b] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-30 12:06:28 --> [REQ_ID=d026666f563b] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-30 12:06:28 --> [CSRF] token name=csrf_test_name hash=e46a8d28c0d2be592aaddff50564a459
DEBUG - 2026-03-30 12:06:28 --> [REQ_ID=8457b89da9b7] [INIT] App\Controllers\Home::GET
INFO - 2026-03-30 12:06:28 --> [REQ_ID=8457b89da9b7] [MEMORY][controller-start] 4194304
INFO - 2026-03-30 12:06:28 --> [REQ_ID=8457b89da9b7] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-30 12:06:28 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-30 12:06:28 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
DEBUG - 2026-03-30 12:06:28 --> [REQ_ID=8457b89da9b7] [VIEW_RENDER] themes/public/home
INFO - 2026-03-30 12:06:28 --> [REQ_ID=8457b89da9b7] [MEMORY][commonData:start] 8388608
INFO - 2026-03-30 12:06:28 --> themesMemory usage: 8388608
DEBUG - 2026-03-30 12:06:28 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-30 12:06:28 --> [REQ_ID=d026666f563b] [FILTER_AFTER]
DEBUG - 2026-03-30 12:06:28 --> [REQ_ID=d026666f563b] [LIFECYCLE][END] status=200 duration_ms=738.68 memory_delta=4194304
INFO - 2026-03-30 12:06:28 --> [REQ_ID=8457b89da9b7] [PERF] Execution time=0.738435
DEBUG - 2026-03-30 12:06:28 --> [REQ_ID=d026666f563b] [REQUEST][END]
INFO - 2026-03-30 12:06:28 --> [REQ_ID=d026666f563b] [PERF] Execution time=0.748668
DEBUG - 2026-03-30 12:07:38 --> [REQ_ID=57023b676af1] [REQUEST][START] GET /index.php/How-It-Works/Investment-Dashboard
DEBUG - 2026-03-30 12:07:38 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-30 12:07:38 --> [REQ_ID=57023b676af1] [FILTER_BEFORE] /index.php/How-It-Works/Investment-Dashboard
DEBUG - 2026-03-30 12:07:38 --> [REQ_ID=57023b676af1] [ROUTE] Controller=\App\Modules\Blog\Controllers\HowItWorksController Method=show
DEBUG - 2026-03-30 12:07:38 --> [REQ_ID=57023b676af1] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/How-It-Works/Investment-Dashboard
DEBUG - 2026-03-30 12:07:38 --> [CSRF] token name=csrf_test_name hash=db5f99d641478b8f0715efe246178853
DEBUG - 2026-03-30 12:07:38 --> [REQ_ID=c5603dcfe915] [INIT] App\Modules\Blog\Controllers\HowItWorksController::GET
INFO - 2026-03-30 12:07:38 --> [REQ_ID=c5603dcfe915] [MEMORY][controller-start] 6291456
DEBUG - 2026-03-30 12:07:38 --> [REQ_ID=c5603dcfe915] [METHOD_ENTRY] show
DEBUG - 2026-03-30 12:07:38 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-30 12:07:38 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-30 12:07:38 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-30 12:07:38 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-30 12:07:38 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-30 12:07:38 --> MyMICoin: guest context detected; skipping user-specific preload.
INFO - 2026-03-30 12:07:38 --> [REQ_ID=c5603dcfe915] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-30 12:07:39 --> [REQ_ID=57023b676af1] [FILTER_AFTER]
DEBUG - 2026-03-30 12:07:39 --> [REQ_ID=57023b676af1] [LIFECYCLE][END] status=200 duration_ms=652.63 memory_delta=4194304
INFO - 2026-03-30 12:07:39 --> [REQ_ID=c5603dcfe915] [PERF] Execution time=0.650700
DEBUG - 2026-03-30 12:07:39 --> [REQ_ID=57023b676af1] [REQUEST][END]
INFO - 2026-03-30 12:07:39 --> [REQ_ID=57023b676af1] [PERF] Execution time=0.695015
DEBUG - 2026-03-30 12:11:22 --> [REQ_ID=54829173eec3] [REQUEST][START] HEAD /
DEBUG - 2026-03-30 12:11:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-30 12:11:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-30 12:11:23 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-30 12:11:23 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-30 12:11:23 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-30 12:15:01 --> [REQ_ID=c2c9f9104301] [REQUEST][START] GET /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-30 12:15:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-30 12:15:01 --> [REQ_ID=c2c9f9104301] [FILTER_BEFORE] /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-30 12:15:01 --> [REQ_ID=c2c9f9104301] [ROUTE] Controller=\App\Modules\APIs\Controllers\AlertsAPIController Method=fetchEmailAlerts
DEBUG - 2026-03-30 12:15:01 --> [REQ_ID=c2c9f9104301] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-30 12:15:01 --> [REQ_ID=c2c9f9104301] [REQUEST][END]
INFO - 2026-03-30 12:15:01 --> [REQ_ID=c2c9f9104301] [PERF] Execution time=0.046572
DEBUG - 2026-03-30 12:16:22 --> [REQ_ID=2eebf242a160] [REQUEST][START] HEAD /
DEBUG - 2026-03-30 12:16:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-30 12:16:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-30 12:16:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-30 12:16:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-30 12:16:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-30 12:16:38 --> [REQ_ID=86c6828a8587] [REQUEST][START] GET /index.php/Management/API
DEBUG - 2026-03-30 12:16:38 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-30 12:16:38 --> [REQ_ID=86c6828a8587] [FILTER_BEFORE] /index.php/Management/API
DEBUG - 2026-03-30 12:16:38 --> [REQ_ID=86c6828a8587] [ROUTE] Controller=\App\Modules\Management\Controllers\APIAdminController Method=index
DEBUG - 2026-03-30 12:16:38 --> [REQ_ID=86c6828a8587] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Management/API
DEBUG - 2026-03-30 12:16:38 --> [CSRF] token name=csrf_test_name hash=a888b7658b68915208d03a48674df8bd
DEBUG - 2026-03-30 12:16:38 --> [REQ_ID=86c6828a8587] [REQUEST][END]
INFO - 2026-03-30 12:16:38 --> [REQ_ID=86c6828a8587] [PERF] Execution time=0.030848
DEBUG - 2026-03-30 12:16:39 --> [REQ_ID=95be79d75a14] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-30 12:16:39 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-30 12:16:39 --> [REQ_ID=95be79d75a14] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-30 12:16:39 --> [REQ_ID=95be79d75a14] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-30 12:16:39 --> [REQ_ID=95be79d75a14] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-30 12:16:39 --> [CSRF] token name=csrf_test_name hash=953bb8be14c2b8aa5de0f2ce8324210d
DEBUG - 2026-03-30 12:16:39 --> [REQ_ID=fc2f8b68a7e0] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-30 12:16:39 --> [REQ_ID=fc2f8b68a7e0] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-30 12:16:39 --> [REQ_ID=95be79d75a14] [FILTER_AFTER]
DEBUG - 2026-03-30 12:16:39 --> [REQ_ID=95be79d75a14] [LIFECYCLE][END] status=200 duration_ms=203.57 memory_delta=0
INFO - 2026-03-30 12:16:39 --> [REQ_ID=fc2f8b68a7e0] [PERF] Execution time=0.203316
DEBUG - 2026-03-30 12:16:39 --> [REQ_ID=95be79d75a14] [REQUEST][END]
INFO - 2026-03-30 12:16:39 --> [REQ_ID=95be79d75a14] [PERF] Execution time=0.215490
DEBUG - 2026-03-30 12:21:09 --> [REQ_ID=e16ff24dca04] [REQUEST][START] GET /index.php/Wallets/Purchase/Memberships/Basic
DEBUG - 2026-03-30 12:21:09 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-30 12:21:09 --> [REQ_ID=e16ff24dca04] [REQUEST][END]
INFO - 2026-03-30 12:21:09 --> [REQ_ID=e16ff24dca04] [PERF] Execution time=0.046571
DEBUG - 2026-03-30 12:21:22 --> [REQ_ID=6e81ea721117] [REQUEST][START] HEAD /
DEBUG - 2026-03-30 12:21:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-30 12:21:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-30 12:21:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-30 12:21:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-30 12:21:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-30 12:23:35 --> [REQ_ID=1b1dbc2f3acd] [REQUEST][START] GET /
DEBUG - 2026-03-30 12:23:35 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-30 12:23:35 --> [REQ_ID=1b1dbc2f3acd] [FILTER_BEFORE] /
DEBUG - 2026-03-30 12:23:35 --> [REQ_ID=1b1dbc2f3acd] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-30 12:23:35 --> [REQ_ID=1b1dbc2f3acd] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-30 12:23:35 --> [CSRF] token name=csrf_test_name hash=128caa29fbf70e5d5f02086191d30532
DEBUG - 2026-03-30 12:23:35 --> [REQ_ID=692048992bfe] [INIT] App\Controllers\Home::GET
INFO - 2026-03-30 12:23:35 --> [REQ_ID=692048992bfe] [MEMORY][controller-start] 6291456
INFO - 2026-03-30 12:23:35 --> [REQ_ID=692048992bfe] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-30 12:23:35 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-30 12:23:36 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-03-30 12:23:36 --> [REQ_ID=692048992bfe] [VIEW_RENDER] themes/public/home
INFO - 2026-03-30 12:23:36 --> [REQ_ID=692048992bfe] [MEMORY][commonData:start] 10485760
INFO - 2026-03-30 12:23:36 --> themesMemory usage: 10485760
DEBUG - 2026-03-30 12:23:36 --> [MetaService] slug= pageName=Home cacheHit= path=DB
DEBUG - 2026-03-30 12:23:36 --> [REQ_ID=1b1dbc2f3acd] [FILTER_AFTER]
DEBUG - 2026-03-30 12:23:36 --> [REQ_ID=1b1dbc2f3acd] [LIFECYCLE][END] status=200 duration_ms=605.09 memory_delta=4194304
INFO - 2026-03-30 12:23:36 --> [REQ_ID=692048992bfe] [PERF] Execution time=0.603316
DEBUG - 2026-03-30 12:23:36 --> [REQ_ID=1b1dbc2f3acd] [REQUEST][END]
INFO - 2026-03-30 12:23:36 --> [REQ_ID=1b1dbc2f3acd] [PERF] Execution time=0.653650
DEBUG - 2026-03-30 12:26:22 --> [REQ_ID=8d8721e793ed] [REQUEST][START] HEAD /
DEBUG - 2026-03-30 12:26:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-30 12:26:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-30 12:26:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-30 12:26:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-30 12:26:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
INFO - 2026-03-30 12:26:49 --> [AIOPS][SPARK][GOVERNANCE][spark:logs:summarize] Started
INFO - 2026-03-30 12:26:49 --> [SPARK_START] App\Commands\Logs\Summarize
INFO - 2026-03-30 12:26:49 --> [SPARK_MEMORY] 18874368
INFO - 2026-03-30 12:26:49 --> [spark:logs:summarize] Intent
INFO - 2026-03-30 12:26:49 --> [AIOPS][SPARK][GOVERNANCE][spark:logs:summarize] Completed
INFO - 2026-03-30 12:26:49 --> [SPARK_COMPLETE] App\Commands\Logs\Summarize duration=0.021982
INFO - 2026-03-30 12:26:49 --> [SPARK_MEMORY] 20971520
DEBUG - 2026-03-30 12:28:32 --> [REQ_ID=975abe724f37] [REQUEST][START] GET /index.php/
DEBUG - 2026-03-30 12:28:32 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-30 12:28:32 --> [REQ_ID=975abe724f37] [FILTER_BEFORE] /index.php/
DEBUG - 2026-03-30 12:28:32 --> [REQ_ID=975abe724f37] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-30 12:28:32 --> [REQ_ID=975abe724f37] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-30 12:28:32 --> [CSRF] token name=csrf_test_name hash=e9ac5f2a5f3cc8fb7071efa1c347659b
DEBUG - 2026-03-30 12:28:32 --> [REQ_ID=999cd805080c] [INIT] App\Controllers\Home::GET
INFO - 2026-03-30 12:28:32 --> [REQ_ID=999cd805080c] [MEMORY][controller-start] 4194304
INFO - 2026-03-30 12:28:32 --> [REQ_ID=999cd805080c] [MEMORY][commonData:start] 4194304
DEBUG - 2026-03-30 12:28:32 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-30 12:28:32 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
DEBUG - 2026-03-30 12:28:32 --> [REQ_ID=999cd805080c] [VIEW_RENDER] themes/public/home
INFO - 2026-03-30 12:28:32 --> [REQ_ID=999cd805080c] [MEMORY][commonData:start] 8388608
INFO - 2026-03-30 12:28:32 --> themesMemory usage: 8388608
DEBUG - 2026-03-30 12:28:32 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-30 12:28:32 --> [REQ_ID=975abe724f37] [FILTER_AFTER]
DEBUG - 2026-03-30 12:28:32 --> [REQ_ID=975abe724f37] [LIFECYCLE][END] status=200 duration_ms=597.11 memory_delta=4194304
INFO - 2026-03-30 12:28:32 --> [REQ_ID=999cd805080c] [PERF] Execution time=0.595234
DEBUG - 2026-03-30 12:28:32 --> [REQ_ID=975abe724f37] [REQUEST][END]
INFO - 2026-03-30 12:28:32 --> [REQ_ID=975abe724f37] [PERF] Execution time=0.616432
DEBUG - 2026-03-30 12:28:44 --> [REQ_ID=83d4aee19c78] [REQUEST][START] POST /index.php/register
DEBUG - 2026-03-30 12:28:44 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-30 12:28:44 --> [REQ_ID=83d4aee19c78] [FILTER_BEFORE] /index.php/register
DEBUG - 2026-03-30 12:28:44 --> [REQ_ID=83d4aee19c78] [ROUTE] Controller=\App\Controllers\AuthController Method=attemptRegister
DEBUG - 2026-03-30 12:28:44 --> [REQ_ID=83d4aee19c78] [LIFECYCLE][START] POST https://www.mymiwallet.com/index.php/register
DEBUG - 2026-03-30 12:28:44 --> [CSRF] token name=csrf_test_name hash=e9ac5f2a5f3cc8fb7071efa1c347659b
INFO - 2026-03-30 12:28:44 --> CSRF token verified.
DEBUG - 2026-03-30 12:28:44 --> [REQ_ID=56cb026f8adf] [INIT] App\Controllers\AuthController::POST
INFO - 2026-03-30 12:28:44 --> [REQ_ID=56cb026f8adf] [MEMORY][controller-start] 4194304
INFO - 2026-03-30 12:28:44 --> [REGISTRATION] Submission received
INFO - 2026-03-30 12:28:44 --> MailService queued email
INFO - 2026-03-30 12:28:44 --> [REGISTRATION] Validation passed (basic fields)
INFO - 2026-03-30 12:28:44 --> [REGISTRATION] Validation passed (password fields)
INFO - 2026-03-30 12:28:45 --> Registration created user_id=11761, email=tburks2392@gmail.com, username=tburks239223, active=, requiresActivation=1, loginIdentifier=username
INFO - 2026-03-30 12:28:45 --> [REGISTRATION] User record created
INFO - 2026-03-30 12:28:45 --> OnboardingProgressService: created onboarding record for user_id=11761
INFO - 2026-03-30 12:28:46 --> Registration succeeded for tburks2392@gmail.com (event 6a309d6c1cd3e220)
INFO - 2026-03-30 12:28:46 --> [REGISTRATION] Activation email queued
INFO - 2026-03-30 12:28:46 --> Registration redirecting to success guide for user_id=11761
DEBUG - 2026-03-30 12:28:46 --> [REQ_ID=83d4aee19c78] [FILTER_AFTER]
DEBUG - 2026-03-30 12:28:46 --> [REQ_ID=83d4aee19c78] [LIFECYCLE][END] status=303 duration_ms=1,542.43 memory_delta=0
INFO - 2026-03-30 12:28:46 --> [REQ_ID=56cb026f8adf] [PERF] Execution time=1.542075
DEBUG - 2026-03-30 12:28:46 --> [REQ_ID=83d4aee19c78] [REQUEST][END]
INFO - 2026-03-30 12:28:46 --> [REQ_ID=83d4aee19c78] [PERF] Execution time=1.556090
DEBUG - 2026-03-30 12:28:46 --> [REQ_ID=a1086c165494] [REQUEST][START] GET /index.php/register/success
DEBUG - 2026-03-30 12:28:46 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-30 12:28:46 --> [REQ_ID=a1086c165494] [FILTER_BEFORE] /index.php/register/success
DEBUG - 2026-03-30 12:28:46 --> [REQ_ID=a1086c165494] [ROUTE] Controller=\App\Controllers\AuthController Method=registerSuccess
DEBUG - 2026-03-30 12:28:46 --> [REQ_ID=a1086c165494] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/register/success
DEBUG - 2026-03-30 12:28:46 --> [CSRF] token name=csrf_test_name hash=e9ac5f2a5f3cc8fb7071efa1c347659b
DEBUG - 2026-03-30 12:28:46 --> [REQ_ID=18d629b32a99] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-30 12:28:46 --> [REQ_ID=18d629b32a99] [MEMORY][controller-start] 4194304
INFO - 2026-03-30 12:28:46 --> AuthController::registerSuccess view rendered.
INFO - 2026-03-30 12:28:46 --> [REQ_ID=18d629b32a99] [PERF] Execution time=0.014161
INFO - 2026-03-30 12:29:11 --> [AIOPS][SPARK][GOVERNANCE][spark:logs:summarize] Started
INFO - 2026-03-30 12:29:11 --> [SPARK_START] App\Commands\Logs\Summarize
INFO - 2026-03-30 12:29:11 --> [SPARK_MEMORY] 18874368
INFO - 2026-03-30 12:29:11 --> [spark:logs:summarize] Intent
INFO - 2026-03-30 12:29:11 --> [AIOPS][SPARK][GOVERNANCE][spark:logs:summarize] Completed
INFO - 2026-03-30 12:29:11 --> [SPARK_COMPLETE] App\Commands\Logs\Summarize duration=0.017238
INFO - 2026-03-30 12:29:11 --> [SPARK_MEMORY] 20971520
DEBUG - 2026-03-30 12:31:22 --> [REQ_ID=821f44423132] [REQUEST][START] HEAD /
DEBUG - 2026-03-30 12:31:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-30 12:31:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-30 12:31:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-30 12:31:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-30 12:31:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-30 12:32:43 --> [REQ_ID=61383b8cc7a8] [REQUEST][START] GET /index.php/Management/Marketing/Ideas
DEBUG - 2026-03-30 12:32:43 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-30 12:32:44 --> [REQ_ID=61383b8cc7a8] [FILTER_BEFORE] /index.php/Management/Marketing/Ideas
DEBUG - 2026-03-30 12:32:44 --> [REQ_ID=61383b8cc7a8] [ROUTE] Controller=\App\Modules\Management\Controllers\MarketingAdminController Method=ideas
DEBUG - 2026-03-30 12:32:44 --> [REQ_ID=61383b8cc7a8] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Management/Marketing/Ideas
DEBUG - 2026-03-30 12:32:44 --> [CSRF] token name=csrf_test_name hash=d49b9a00076c09ddff0ee8de37310e1a
DEBUG - 2026-03-30 12:32:44 --> [REQ_ID=61383b8cc7a8] [REQUEST][END]
INFO - 2026-03-30 12:32:44 --> [REQ_ID=61383b8cc7a8] [PERF] Execution time=0.058551
DEBUG - 2026-03-30 12:32:44 --> [REQ_ID=97ffee06d7a4] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-30 12:32:44 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-30 12:32:44 --> [REQ_ID=97ffee06d7a4] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-30 12:32:44 --> [REQ_ID=97ffee06d7a4] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-30 12:32:44 --> [REQ_ID=97ffee06d7a4] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-30 12:32:44 --> [CSRF] token name=csrf_test_name hash=81afc7aae80a226a3824347818700544
DEBUG - 2026-03-30 12:32:44 --> [REQ_ID=6773a2e1a47b] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-30 12:32:44 --> [REQ_ID=6773a2e1a47b] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-30 12:32:44 --> [REQ_ID=97ffee06d7a4] [FILTER_AFTER]
DEBUG - 2026-03-30 12:32:44 --> [REQ_ID=97ffee06d7a4] [LIFECYCLE][END] status=200 duration_ms=173.44 memory_delta=0
INFO - 2026-03-30 12:32:44 --> [REQ_ID=6773a2e1a47b] [PERF] Execution time=0.173209
DEBUG - 2026-03-30 12:32:44 --> [REQ_ID=97ffee06d7a4] [REQUEST][END]
INFO - 2026-03-30 12:32:44 --> [REQ_ID=97ffee06d7a4] [PERF] Execution time=0.185546
DEBUG - 2026-03-30 12:36:22 --> [REQ_ID=f0c7b6e07f63] [REQUEST][START] HEAD /
DEBUG - 2026-03-30 12:36:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-30 12:36:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-30 12:36:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-30 12:36:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-30 12:36:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
INFO - 2026-03-30 12:37:07 --> Knowledge graph built successfully: APPPATH/Commands/Master/KnowledgeGraphBuild.php
INFO - 2026-03-30 12:37:23 --> Docs inventory generated: 1465 files
INFO - 2026-03-30 12:37:23 --> Docs audit completed. Missing controllers: 14
INFO - 2026-03-30 12:37:24 --> Knowledge graph built successfully: APPPATH/Commands/Master/KnowledgeGraphBuild.php
DEBUG - 2026-03-30 12:39:03 --> [REQ_ID=6455ce19cc42] [REQUEST][START] GET /index.php/register/success
DEBUG - 2026-03-30 12:39:03 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-30 12:39:03 --> [REQ_ID=6455ce19cc42] [FILTER_BEFORE] /index.php/register/success
DEBUG - 2026-03-30 12:39:03 --> [REQ_ID=6455ce19cc42] [ROUTE] Controller=\App\Controllers\AuthController Method=registerSuccess
DEBUG - 2026-03-30 12:39:03 --> [REQ_ID=6455ce19cc42] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/register/success
DEBUG - 2026-03-30 12:39:03 --> [CSRF] token name=csrf_test_name hash=e9ac5f2a5f3cc8fb7071efa1c347659b
DEBUG - 2026-03-30 12:39:03 --> [REQ_ID=459b6db7e047] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-30 12:39:03 --> [REQ_ID=459b6db7e047] [MEMORY][controller-start] 6291456
INFO - 2026-03-30 12:39:03 --> AuthController::registerSuccess view rendered.
INFO - 2026-03-30 12:39:04 --> [REQ_ID=459b6db7e047] [PERF] Execution time=0.130268
DEBUG - 2026-03-30 12:41:22 --> [REQ_ID=413295ca49ff] [REQUEST][START] HEAD /
DEBUG - 2026-03-30 12:41:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
ERROR - 2026-03-30 12:41:22 --> [404_ROUTE]
DEBUG - 2026-03-30 12:46:22 --> [REQ_ID=8ab6c2ae257e] [REQUEST][START] HEAD /
DEBUG - 2026-03-30 12:46:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
ERROR - 2026-03-30 12:46:22 --> [404_ROUTE]
DEBUG - 2026-03-30 12:50:05 --> [REQ_ID=fe980842bcfb] [REQUEST][START] GET /
DEBUG - 2026-03-30 12:50:05 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-30 12:50:05 --> [REQ_ID=fe980842bcfb] [FILTER_BEFORE] /
DEBUG - 2026-03-30 12:50:05 --> [REQ_ID=fe980842bcfb] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-30 12:50:05 --> [REQ_ID=fe980842bcfb] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-30 12:50:05 --> [CSRF] token name=csrf_test_name hash=d004835fd48f930e79c691a7d480f553
DEBUG - 2026-03-30 12:50:05 --> [REQ_ID=e9bd9a469fd6] [INIT] App\Controllers\Home::GET
INFO - 2026-03-30 12:50:05 --> [REQ_ID=e9bd9a469fd6] [MEMORY][controller-start] 6291456
INFO - 2026-03-30 12:50:05 --> [REQ_ID=e9bd9a469fd6] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-30 12:50:05 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-30 12:50:06 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-03-30 12:50:06 --> [REQ_ID=e9bd9a469fd6] [VIEW_RENDER] themes/public/home
INFO - 2026-03-30 12:50:06 --> [REQ_ID=e9bd9a469fd6] [MEMORY][commonData:start] 10485760
INFO - 2026-03-30 12:50:06 --> themesMemory usage: 10485760
DEBUG - 2026-03-30 12:50:06 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-30 12:50:06 --> [REQ_ID=fe980842bcfb] [FILTER_AFTER]
DEBUG - 2026-03-30 12:50:06 --> [REQ_ID=fe980842bcfb] [LIFECYCLE][END] status=200 duration_ms=775.92 memory_delta=4194304
INFO - 2026-03-30 12:50:06 --> [REQ_ID=e9bd9a469fd6] [PERF] Execution time=0.773802
DEBUG - 2026-03-30 12:50:06 --> [REQ_ID=fe980842bcfb] [REQUEST][END]
INFO - 2026-03-30 12:50:06 --> [REQ_ID=fe980842bcfb] [PERF] Execution time=0.817330
DEBUG - 2026-03-30 12:50:16 --> [REQ_ID=85d9b17d57e0] [REQUEST][START] GET /
DEBUG - 2026-03-30 12:50:16 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-30 12:50:16 --> [REQ_ID=85d9b17d57e0] [FILTER_BEFORE] /
DEBUG - 2026-03-30 12:50:16 --> [REQ_ID=85d9b17d57e0] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-30 12:50:16 --> [REQ_ID=85d9b17d57e0] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-30 12:50:16 --> [CSRF] token name=csrf_test_name hash=b930d79bb32df21a09820d54087dbee6
DEBUG - 2026-03-30 12:50:16 --> [REQ_ID=a8d00ef1be2f] [INIT] App\Controllers\Home::GET
INFO - 2026-03-30 12:50:16 --> [REQ_ID=a8d00ef1be2f] [MEMORY][controller-start] 6291456
INFO - 2026-03-30 12:50:16 --> [REQ_ID=a8d00ef1be2f] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-30 12:50:16 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-30 12:50:16 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
DEBUG - 2026-03-30 12:50:16 --> [REQ_ID=a8d00ef1be2f] [VIEW_RENDER] themes/public/home
INFO - 2026-03-30 12:50:16 --> [REQ_ID=a8d00ef1be2f] [MEMORY][commonData:start] 8388608
INFO - 2026-03-30 12:50:16 --> themesMemory usage: 8388608
DEBUG - 2026-03-30 12:50:16 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-30 12:50:16 --> [REQ_ID=85d9b17d57e0] [FILTER_AFTER]
DEBUG - 2026-03-30 12:50:16 --> [REQ_ID=85d9b17d57e0] [LIFECYCLE][END] status=200 duration_ms=528.99 memory_delta=2097152
INFO - 2026-03-30 12:50:16 --> [REQ_ID=a8d00ef1be2f] [PERF] Execution time=0.528645
DEBUG - 2026-03-30 12:50:16 --> [REQ_ID=85d9b17d57e0] [REQUEST][END]
INFO - 2026-03-30 12:50:16 --> [REQ_ID=85d9b17d57e0] [PERF] Execution time=0.539497
DEBUG - 2026-03-30 12:50:25 --> [REQ_ID=41257a3b6eb1] [REQUEST][START] GET /
DEBUG - 2026-03-30 12:50:25 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-30 12:50:25 --> [REQ_ID=41257a3b6eb1] [FILTER_BEFORE] /
DEBUG - 2026-03-30 12:50:25 --> [REQ_ID=41257a3b6eb1] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-30 12:50:25 --> [REQ_ID=41257a3b6eb1] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-30 12:50:25 --> [CSRF] token name=csrf_test_name hash=dd7d2e45fa902ac614ea8bdbe89f61d3
DEBUG - 2026-03-30 12:50:25 --> [REQ_ID=a78279201c62] [INIT] App\Controllers\Home::GET
INFO - 2026-03-30 12:50:25 --> [REQ_ID=a78279201c62] [MEMORY][controller-start] 6291456
INFO - 2026-03-30 12:50:25 --> [REQ_ID=a78279201c62] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-30 12:50:25 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-30 12:50:25 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
DEBUG - 2026-03-30 12:50:25 --> [REQ_ID=a78279201c62] [VIEW_RENDER] themes/public/home
INFO - 2026-03-30 12:50:25 --> [REQ_ID=a78279201c62] [MEMORY][commonData:start] 8388608
INFO - 2026-03-30 12:50:25 --> themesMemory usage: 8388608
DEBUG - 2026-03-30 12:50:25 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-30 12:50:25 --> [REQ_ID=41257a3b6eb1] [FILTER_AFTER]
DEBUG - 2026-03-30 12:50:25 --> [REQ_ID=41257a3b6eb1] [LIFECYCLE][END] status=200 duration_ms=558.64 memory_delta=2097152
INFO - 2026-03-30 12:50:25 --> [REQ_ID=a78279201c62] [PERF] Execution time=0.558312
DEBUG - 2026-03-30 12:50:25 --> [REQ_ID=41257a3b6eb1] [REQUEST][END]
INFO - 2026-03-30 12:50:25 --> [REQ_ID=41257a3b6eb1] [PERF] Execution time=0.568019
DEBUG - 2026-03-30 12:50:34 --> [REQ_ID=b15415d8833e] [REQUEST][START] GET /index.php/Customer-Support
DEBUG - 2026-03-30 12:50:34 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-30 12:50:34 --> [REQ_ID=b15415d8833e] [FILTER_BEFORE] /index.php/Customer-Support
DEBUG - 2026-03-30 12:50:34 --> [REQ_ID=b15415d8833e] [ROUTE] Controller=\App\Controllers\App\Modules\Support\Controllers\SupportController Method=index
DEBUG - 2026-03-30 12:50:34 --> [REQ_ID=b15415d8833e] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Customer-Support
DEBUG - 2026-03-30 12:50:34 --> [CSRF] token name=csrf_test_name hash=133e7b82520a170daf29f22ba5b96ee9
DEBUG - 2026-03-30 12:50:34 --> [REQ_ID=b15415d8833e] [REQUEST][END]
INFO - 2026-03-30 12:50:34 --> [REQ_ID=b15415d8833e] [PERF] Execution time=0.011796
DEBUG - 2026-03-30 12:50:35 --> [REQ_ID=f3c1760aefc4] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-30 12:50:35 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-30 12:50:35 --> [REQ_ID=f3c1760aefc4] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-30 12:50:35 --> [REQ_ID=f3c1760aefc4] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-30 12:50:35 --> [REQ_ID=f3c1760aefc4] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-30 12:50:35 --> [CSRF] token name=csrf_test_name hash=27726d3bdc2c8ab196961d0f84f7fc91
DEBUG - 2026-03-30 12:50:35 --> [REQ_ID=4cc841b44cd0] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-30 12:50:35 --> [REQ_ID=4cc841b44cd0] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-30 12:50:35 --> [REQ_ID=f3c1760aefc4] [FILTER_AFTER]
DEBUG - 2026-03-30 12:50:35 --> [REQ_ID=f3c1760aefc4] [LIFECYCLE][END] status=200 duration_ms=121.56 memory_delta=0
INFO - 2026-03-30 12:50:35 --> [REQ_ID=4cc841b44cd0] [PERF] Execution time=0.121255
DEBUG - 2026-03-30 12:50:35 --> [REQ_ID=f3c1760aefc4] [REQUEST][END]
INFO - 2026-03-30 12:50:35 --> [REQ_ID=f3c1760aefc4] [PERF] Execution time=0.133720
DEBUG - 2026-03-30 12:51:22 --> [REQ_ID=080516daf9c3] [REQUEST][START] HEAD /
DEBUG - 2026-03-30 12:51:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
ERROR - 2026-03-30 12:51:22 --> [404_ROUTE]
DEBUG - 2026-03-30 12:56:18 --> [REQ_ID=5227e3618e72] [REQUEST][START] GET /
DEBUG - 2026-03-30 12:56:18 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-30 12:56:18 --> [REQ_ID=5227e3618e72] [FILTER_BEFORE] /
DEBUG - 2026-03-30 12:56:18 --> [REQ_ID=5227e3618e72] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-30 12:56:18 --> [REQ_ID=5227e3618e72] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-30 12:56:18 --> [CSRF] token name=csrf_test_name hash=a2fd3d89412e4998ef856647d1c846ed
DEBUG - 2026-03-30 12:56:18 --> [REQ_ID=d4117f3c40ce] [INIT] App\Controllers\Home::GET
INFO - 2026-03-30 12:56:18 --> [REQ_ID=d4117f3c40ce] [MEMORY][controller-start] 6291456
INFO - 2026-03-30 12:56:18 --> [REQ_ID=d4117f3c40ce] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-30 12:56:18 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-30 12:56:19 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
DEBUG - 2026-03-30 12:56:19 --> [REQ_ID=d4117f3c40ce] [VIEW_RENDER] themes/public/home
INFO - 2026-03-30 12:56:19 --> [REQ_ID=d4117f3c40ce] [MEMORY][commonData:start] 10485760
INFO - 2026-03-30 12:56:19 --> themesMemory usage: 10485760
DEBUG - 2026-03-30 12:56:19 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-30 12:56:19 --> [REQ_ID=5227e3618e72] [FILTER_AFTER]
DEBUG - 2026-03-30 12:56:19 --> [REQ_ID=5227e3618e72] [LIFECYCLE][END] status=200 duration_ms=795.21 memory_delta=4194304
INFO - 2026-03-30 12:56:19 --> [REQ_ID=d4117f3c40ce] [PERF] Execution time=0.793015
DEBUG - 2026-03-30 12:56:19 --> [REQ_ID=5227e3618e72] [REQUEST][END]
INFO - 2026-03-30 12:56:19 --> [REQ_ID=5227e3618e72] [PERF] Execution time=0.833901
DEBUG - 2026-03-30 12:56:22 --> [REQ_ID=6ca73da3491a] [REQUEST][START] HEAD /
DEBUG - 2026-03-30 12:56:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
ERROR - 2026-03-30 12:56:22 --> [404_ROUTE]
DEBUG - 2026-03-30 12:57:04 --> [REQ_ID=07affcaaadd6] [REQUEST][START] GET /index.php/How-To-Guides
DEBUG - 2026-03-30 12:57:04 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
INFO - 2026-03-30 12:57:04 --> REDIRECTED ROUTE at https://www.mymiwallet.com/Knowledgebase/Tutorials
DEBUG - 2026-03-30 12:57:04 --> [REQ_ID=07affcaaadd6] [REQUEST][END]
INFO - 2026-03-30 12:57:04 --> [REQ_ID=07affcaaadd6] [PERF] Execution time=0.012730
DEBUG - 2026-03-30 13:00:01 --> [REQ_ID=346b6890bf41] [REQUEST][START] GET /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-30 13:00:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-30 13:00:01 --> [REQ_ID=346b6890bf41] [FILTER_BEFORE] /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-30 13:00:01 --> [REQ_ID=346b6890bf41] [ROUTE] Controller=\App\Modules\Management\Controllers\ManagementAPIController Method=Run_CRON_Tasks
DEBUG - 2026-03-30 13:00:01 --> [REQ_ID=346b6890bf41] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-30 13:00:01 --> [REQ_ID=346b6890bf41] [REQUEST][END]
INFO - 2026-03-30 13:00:01 --> [REQ_ID=346b6890bf41] [PERF] Execution time=0.048004
DEBUG - 2026-03-30 13:01:22 --> [REQ_ID=7f1a322614a6] [REQUEST][START] HEAD /
DEBUG - 2026-03-30 13:01:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
ERROR - 2026-03-30 13:01:22 --> [404_ROUTE]
DEBUG - 2026-03-30 13:04:25 --> [REQ_ID=76331bf4-6430-4c4e-9ca7-5144b19fe79f] [REQUEST][START] GET /
DEBUG - 2026-03-30 13:04:25 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-30 13:04:25 --> [REQ_ID=76331bf4-6430-4c4e-9ca7-5144b19fe79f] [REQUEST][END]
INFO - 2026-03-30 13:04:25 --> [REQ_ID=76331bf4-6430-4c4e-9ca7-5144b19fe79f] [PERF] Execution time=0.035144
DEBUG - 2026-03-30 13:05:01 --> [REQ_ID=a79eb0c4a7bb] [REQUEST][START] GET /
DEBUG - 2026-03-30 13:05:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-30 13:05:01 --> [REQ_ID=a79eb0c4a7bb] [FILTER_BEFORE] /
DEBUG - 2026-03-30 13:05:01 --> [REQ_ID=a79eb0c4a7bb] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-30 13:05:01 --> [REQ_ID=a79eb0c4a7bb] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-30 13:05:01 --> [CSRF] token name=csrf_test_name hash=28d99428fd86e16f5a824ba04b8565ba
DEBUG - 2026-03-30 13:05:01 --> [REQ_ID=85ba83f18919] [INIT] App\Controllers\Home::GET
INFO - 2026-03-30 13:05:01 --> [REQ_ID=85ba83f18919] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-30 13:05:01 --> [TRACE]
INFO - 2026-03-30 13:05:01 --> [REQ_ID=85ba83f18919] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-30 13:05:01 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-30 13:05:01 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
DEBUG - 2026-03-30 13:05:01 --> [REQ_ID=85ba83f18919] [VIEW_RENDER] themes/public/home
INFO - 2026-03-30 13:05:01 --> [REQ_ID=85ba83f18919] [MEMORY][commonData:start] 8388608
INFO - 2026-03-30 13:05:01 --> themesMemory usage: 8388608
DEBUG - 2026-03-30 13:05:01 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-30 13:05:01 --> [REQ_ID=a79eb0c4a7bb] [FILTER_AFTER]
DEBUG - 2026-03-30 13:05:01 --> [REQ_ID=a79eb0c4a7bb] [LIFECYCLE][END] status=200 duration_ms=789.71 memory_delta=4194304
INFO - 2026-03-30 13:05:01 --> [REQ_ID=85ba83f18919] [PERF] Execution time=0.792930
DEBUG - 2026-03-30 13:05:01 --> [REQ_ID=a79eb0c4a7bb] [REQUEST][END]
INFO - 2026-03-30 13:05:01 --> [REQ_ID=a79eb0c4a7bb] [PERF] Execution time=0.805044
DEBUG - 2026-03-30 13:05:26 --> [REQ_ID=79857c609b27] [REQUEST][START] GET /index.php
DEBUG - 2026-03-30 13:05:26 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-30 13:05:26 --> [REQ_ID=79857c609b27] [FILTER_BEFORE] /index.php
DEBUG - 2026-03-30 13:05:26 --> [REQ_ID=79857c609b27] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-30 13:05:26 --> [REQ_ID=79857c609b27] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-30 13:05:26 --> [CSRF] token name=csrf_test_name hash=28d99428fd86e16f5a824ba04b8565ba
DEBUG - 2026-03-30 13:05:26 --> [REQ_ID=ebe10fe02fb3] [INIT] App\Controllers\Home::GET
INFO - 2026-03-30 13:05:26 --> [REQ_ID=ebe10fe02fb3] [MEMORY][controller-start] 6291456
DEBUG - 2026-03-30 13:05:26 --> [TRACE]
INFO - 2026-03-30 13:05:26 --> [REQ_ID=ebe10fe02fb3] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-30 13:05:26 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-30 13:05:27 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-03-30 13:05:27 --> [REQ_ID=ebe10fe02fb3] [VIEW_RENDER] themes/public/home
INFO - 2026-03-30 13:05:27 --> [REQ_ID=ebe10fe02fb3] [MEMORY][commonData:start] 8388608
INFO - 2026-03-30 13:05:27 --> themesMemory usage: 8388608
DEBUG - 2026-03-30 13:05:27 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-30 13:05:27 --> [REQ_ID=79857c609b27] [FILTER_AFTER]
DEBUG - 2026-03-30 13:05:27 --> [REQ_ID=79857c609b27] [LIFECYCLE][END] status=200 duration_ms=519.03 memory_delta=2097152
INFO - 2026-03-30 13:05:27 --> [REQ_ID=ebe10fe02fb3] [PERF] Execution time=0.519280
DEBUG - 2026-03-30 13:05:27 --> [REQ_ID=79857c609b27] [REQUEST][END]
INFO - 2026-03-30 13:05:27 --> [REQ_ID=79857c609b27] [PERF] Execution time=0.528752
DEBUG - 2026-03-30 13:05:28 --> [REQ_ID=4eb87209c3c8] [REQUEST][START] GET /
DEBUG - 2026-03-30 13:05:28 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-30 13:05:28 --> [REQ_ID=4eb87209c3c8] [FILTER_BEFORE] /
DEBUG - 2026-03-30 13:05:28 --> [REQ_ID=4eb87209c3c8] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-30 13:05:28 --> [REQ_ID=4eb87209c3c8] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-30 13:05:28 --> [CSRF] token name=csrf_test_name hash=28d99428fd86e16f5a824ba04b8565ba
DEBUG - 2026-03-30 13:05:28 --> [REQ_ID=853d12c8a1bf] [INIT] App\Controllers\Home::GET
INFO - 2026-03-30 13:05:28 --> [REQ_ID=853d12c8a1bf] [MEMORY][controller-start] 6291456
DEBUG - 2026-03-30 13:05:28 --> [TRACE]
INFO - 2026-03-30 13:05:28 --> [REQ_ID=853d12c8a1bf] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-30 13:05:28 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-30 13:05:29 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
DEBUG - 2026-03-30 13:05:29 --> [REQ_ID=853d12c8a1bf] [VIEW_RENDER] themes/public/home
INFO - 2026-03-30 13:05:29 --> [REQ_ID=853d12c8a1bf] [MEMORY][commonData:start] 8388608
INFO - 2026-03-30 13:05:29 --> themesMemory usage: 8388608
DEBUG - 2026-03-30 13:05:29 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-30 13:05:29 --> [REQ_ID=4eb87209c3c8] [FILTER_AFTER]
DEBUG - 2026-03-30 13:05:29 --> [REQ_ID=4eb87209c3c8] [LIFECYCLE][END] status=200 duration_ms=896.43 memory_delta=2097152
INFO - 2026-03-30 13:05:29 --> [REQ_ID=853d12c8a1bf] [PERF] Execution time=0.896436
DEBUG - 2026-03-30 13:05:29 --> [REQ_ID=4eb87209c3c8] [REQUEST][END]
INFO - 2026-03-30 13:05:29 --> [REQ_ID=4eb87209c3c8] [PERF] Execution time=0.906742
DEBUG - 2026-03-30 13:05:29 --> [REQ_ID=edc7ce4b6e7a] [REQUEST][START] GET /index.php/Blog
DEBUG - 2026-03-30 13:05:29 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-30 13:05:29 --> [REQ_ID=edc7ce4b6e7a] [FILTER_BEFORE] /index.php/Blog
DEBUG - 2026-03-30 13:05:29 --> [REQ_ID=edc7ce4b6e7a] [ROUTE] Controller=\App\Modules\Blog\Controllers\BlogController Method=index
DEBUG - 2026-03-30 13:05:29 --> [REQ_ID=edc7ce4b6e7a] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Blog
DEBUG - 2026-03-30 13:05:29 --> [CSRF] token name=csrf_test_name hash=28d99428fd86e16f5a824ba04b8565ba
DEBUG - 2026-03-30 13:05:29 --> [REQ_ID=bd056e3b1951] [INIT] App\Modules\Blog\Controllers\BlogController::GET
INFO - 2026-03-30 13:05:29 --> [REQ_ID=bd056e3b1951] [MEMORY][controller-start] 6291456
DEBUG - 2026-03-30 13:05:29 --> [TRACE]
DEBUG - 2026-03-30 13:05:29 --> [REQ_ID=bd056e3b1951] [METHOD_ENTRY] index
DEBUG - 2026-03-30 13:05:29 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-30 13:05:29 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-30 13:05:29 --> MyMICoin initialized ONCE
DEBUG - 2026-03-30 13:05:29 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-30 13:05:29 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-30 13:05:29 --> MyMIWallets skipped (no user context)
INFO - 2026-03-30 13:05:29 --> [REQ_ID=bd056e3b1951] [MEMORY][commonData:start] 6291456
INFO - 2026-03-30 13:05:29 --> [REQ_ID=bd056e3b1951] [PERF] Execution time=0.061690
DEBUG - 2026-03-30 13:05:30 --> [REQ_ID=957ab991b9a0] [REQUEST][START] GET /
DEBUG - 2026-03-30 13:05:30 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-30 13:05:30 --> [REQ_ID=957ab991b9a0] [FILTER_BEFORE] /
DEBUG - 2026-03-30 13:05:30 --> [REQ_ID=957ab991b9a0] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-30 13:05:30 --> [REQ_ID=957ab991b9a0] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-30 13:05:30 --> [CSRF] token name=csrf_test_name hash=28d99428fd86e16f5a824ba04b8565ba
DEBUG - 2026-03-30 13:05:30 --> [REQ_ID=9319588aa58d] [INIT] App\Controllers\Home::GET
INFO - 2026-03-30 13:05:30 --> [REQ_ID=9319588aa58d] [MEMORY][controller-start] 6291456
DEBUG - 2026-03-30 13:05:30 --> [TRACE]
INFO - 2026-03-30 13:05:30 --> [REQ_ID=9319588aa58d] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-30 13:05:30 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-30 13:05:30 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
DEBUG - 2026-03-30 13:05:30 --> [REQ_ID=9319588aa58d] [VIEW_RENDER] themes/public/home
INFO - 2026-03-30 13:05:30 --> [REQ_ID=9319588aa58d] [MEMORY][commonData:start] 8388608
INFO - 2026-03-30 13:05:30 --> themesMemory usage: 8388608
DEBUG - 2026-03-30 13:05:30 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-30 13:05:30 --> [REQ_ID=957ab991b9a0] [FILTER_AFTER]
DEBUG - 2026-03-30 13:05:30 --> [REQ_ID=957ab991b9a0] [LIFECYCLE][END] status=200 duration_ms=573.97 memory_delta=2097152
INFO - 2026-03-30 13:05:30 --> [REQ_ID=9319588aa58d] [PERF] Execution time=0.574180
DEBUG - 2026-03-30 13:05:30 --> [REQ_ID=957ab991b9a0] [REQUEST][END]
INFO - 2026-03-30 13:05:30 --> [REQ_ID=957ab991b9a0] [PERF] Execution time=0.582936
DEBUG - 2026-03-30 13:05:31 --> [REQ_ID=17eb24c657c3] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-30 13:05:31 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-30 13:05:31 --> [REQ_ID=17eb24c657c3] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-30 13:05:31 --> [REQ_ID=17eb24c657c3] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-30 13:05:31 --> [REQ_ID=17eb24c657c3] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-30 13:05:31 --> [CSRF] token name=csrf_test_name hash=28d99428fd86e16f5a824ba04b8565ba
DEBUG - 2026-03-30 13:05:31 --> [REQ_ID=00818320b6ac] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-30 13:05:31 --> [REQ_ID=00818320b6ac] [MEMORY][controller-start] 6291456
DEBUG - 2026-03-30 13:05:31 --> [TRACE]
DEBUG - 2026-03-30 13:05:31 --> [REQ_ID=17eb24c657c3] [FILTER_AFTER]
DEBUG - 2026-03-30 13:05:31 --> [REQ_ID=17eb24c657c3] [LIFECYCLE][END] status=200 duration_ms=23.53 memory_delta=0
INFO - 2026-03-30 13:05:31 --> [REQ_ID=00818320b6ac] [PERF] Execution time=0.022966
DEBUG - 2026-03-30 13:05:31 --> [REQ_ID=17eb24c657c3] [REQUEST][END]
INFO - 2026-03-30 13:05:31 --> [REQ_ID=17eb24c657c3] [PERF] Execution time=0.039332
DEBUG - 2026-03-30 13:05:35 --> [REQ_ID=eda18409cb23] [REQUEST][START] GET /
DEBUG - 2026-03-30 13:05:35 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-30 13:05:35 --> [REQ_ID=eda18409cb23] [FILTER_BEFORE] /
DEBUG - 2026-03-30 13:05:35 --> [REQ_ID=eda18409cb23] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-30 13:05:35 --> [REQ_ID=eda18409cb23] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-30 13:05:35 --> [CSRF] token name=csrf_test_name hash=28d99428fd86e16f5a824ba04b8565ba
DEBUG - 2026-03-30 13:05:35 --> [REQ_ID=8fce8455d2b4] [INIT] App\Controllers\Home::GET
INFO - 2026-03-30 13:05:35 --> [REQ_ID=8fce8455d2b4] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-30 13:05:35 --> [TRACE]
INFO - 2026-03-30 13:05:35 --> [REQ_ID=8fce8455d2b4] [MEMORY][commonData:start] 4194304
DEBUG - 2026-03-30 13:05:35 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-30 13:05:35 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
DEBUG - 2026-03-30 13:05:35 --> [REQ_ID=8fce8455d2b4] [VIEW_RENDER] themes/public/home
INFO - 2026-03-30 13:05:35 --> [REQ_ID=8fce8455d2b4] [MEMORY][commonData:start] 8388608
INFO - 2026-03-30 13:05:35 --> themesMemory usage: 8388608
DEBUG - 2026-03-30 13:05:35 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-30 13:05:35 --> [REQ_ID=eda18409cb23] [FILTER_AFTER]
DEBUG - 2026-03-30 13:05:35 --> [REQ_ID=eda18409cb23] [LIFECYCLE][END] status=200 duration_ms=502.74 memory_delta=4194304
INFO - 2026-03-30 13:05:35 --> [REQ_ID=8fce8455d2b4] [PERF] Execution time=0.502848
DEBUG - 2026-03-30 13:05:35 --> [REQ_ID=eda18409cb23] [REQUEST][END]
INFO - 2026-03-30 13:05:35 --> [REQ_ID=eda18409cb23] [PERF] Execution time=0.512049
DEBUG - 2026-03-30 13:05:39 --> [REQ_ID=891be904d46f] [REQUEST][START] GET /index.php/register
DEBUG - 2026-03-30 13:05:39 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-30 13:05:39 --> [REQ_ID=891be904d46f] [FILTER_BEFORE] /index.php/register
DEBUG - 2026-03-30 13:05:39 --> [REQ_ID=891be904d46f] [ROUTE] Controller=\App\Controllers\AuthController Method=register
DEBUG - 2026-03-30 13:05:39 --> [REQ_ID=891be904d46f] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/register
DEBUG - 2026-03-30 13:05:39 --> [CSRF] token name=csrf_test_name hash=28d99428fd86e16f5a824ba04b8565ba
DEBUG - 2026-03-30 13:05:39 --> [REQ_ID=dffc8e9b4f82] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-30 13:05:39 --> [REQ_ID=dffc8e9b4f82] [MEMORY][controller-start] 6291456
DEBUG - 2026-03-30 13:05:39 --> [TRACE]
INFO - 2026-03-30 13:05:39 --> [REGISTRATION] Form loaded
INFO - 2026-03-30 13:05:39 --> [REQ_ID=dffc8e9b4f82] [PERF] Execution time=0.018890
DEBUG - 2026-03-30 13:05:39 --> [REQ_ID=9b64aaa49a80] [REQUEST][START] GET /index.php/Legal/Terms-And-Conditions
DEBUG - 2026-03-30 13:05:39 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-30 13:05:39 --> [REQ_ID=9b64aaa49a80] [FILTER_BEFORE] /index.php/Legal/Terms-And-Conditions
DEBUG - 2026-03-30 13:05:39 --> [REQ_ID=9b64aaa49a80] [ROUTE] Controller=\App\Controllers\Home Method=terms
DEBUG - 2026-03-30 13:05:39 --> [REQ_ID=9b64aaa49a80] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Legal/Terms-And-Conditions
DEBUG - 2026-03-30 13:05:39 --> [CSRF] token name=csrf_test_name hash=28d99428fd86e16f5a824ba04b8565ba
DEBUG - 2026-03-30 13:05:39 --> [REQ_ID=9b64aaa49a80] [REQUEST][END]
INFO - 2026-03-30 13:05:39 --> [REQ_ID=9b64aaa49a80] [PERF] Execution time=0.086019
DEBUG - 2026-03-30 13:05:40 --> [REQ_ID=237a89c4fbc5] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-30 13:05:40 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-30 13:05:40 --> [REQ_ID=237a89c4fbc5] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-30 13:05:40 --> [REQ_ID=237a89c4fbc5] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-30 13:05:40 --> [REQ_ID=237a89c4fbc5] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-30 13:05:40 --> [CSRF] token name=csrf_test_name hash=28d99428fd86e16f5a824ba04b8565ba
DEBUG - 2026-03-30 13:05:40 --> [REQ_ID=3d1298bece2b] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-30 13:05:40 --> [REQ_ID=3d1298bece2b] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-30 13:05:40 --> [TRACE]
DEBUG - 2026-03-30 13:05:40 --> [REQ_ID=237a89c4fbc5] [FILTER_AFTER]
DEBUG - 2026-03-30 13:05:40 --> [REQ_ID=237a89c4fbc5] [LIFECYCLE][END] status=200 duration_ms=24.86 memory_delta=0
INFO - 2026-03-30 13:05:40 --> [REQ_ID=3d1298bece2b] [PERF] Execution time=0.025363
DEBUG - 2026-03-30 13:05:40 --> [REQ_ID=237a89c4fbc5] [REQUEST][END]
INFO - 2026-03-30 13:05:40 --> [REQ_ID=237a89c4fbc5] [PERF] Execution time=0.038599
DEBUG - 2026-03-30 13:05:40 --> [REQ_ID=520b9d61ba36] [REQUEST][START] GET /index.php/Support
DEBUG - 2026-03-30 13:05:40 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-30 13:05:40 --> [REQ_ID=520b9d61ba36] [FILTER_BEFORE] /index.php/Support
DEBUG - 2026-03-30 13:05:40 --> [REQ_ID=520b9d61ba36] [ROUTE] Controller=\App\Modules\Support\Controllers\SupportController Method=index
DEBUG - 2026-03-30 13:05:40 --> [REQ_ID=520b9d61ba36] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Support
DEBUG - 2026-03-30 13:05:40 --> [CSRF] token name=csrf_test_name hash=28d99428fd86e16f5a824ba04b8565ba
DEBUG - 2026-03-30 13:05:40 --> [REQ_ID=55c90eb2ba25] [INIT] App\Modules\Support\Controllers\SupportController::GET
INFO - 2026-03-30 13:05:40 --> [REQ_ID=55c90eb2ba25] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-30 13:05:40 --> [TRACE]
DEBUG - 2026-03-30 13:05:40 --> [REQ_ID=55c90eb2ba25] [METHOD_ENTRY] index
DEBUG - 2026-03-30 13:05:40 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-30 13:05:40 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-30 13:05:40 --> MyMICoin initialized ONCE
DEBUG - 2026-03-30 13:05:40 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-30 13:05:40 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-30 13:05:40 --> MyMIWallets skipped (no user context)
INFO - 2026-03-30 13:05:40 --> [REQ_ID=55c90eb2ba25] [MEMORY][commonData:start] 4194304
DEBUG - 2026-03-30 13:05:40 --> [REQ_ID=55c90eb2ba25] [VIEW_RENDER] SupportModule\Views\Support\index
INFO - 2026-03-30 13:05:40 --> [REQ_ID=55c90eb2ba25] [MEMORY][commonData:start] 4194304
INFO - 2026-03-30 13:05:40 --> themesMemory usage: 4194304
DEBUG - 2026-03-30 13:05:40 --> [REQ_ID=520b9d61ba36] [FILTER_AFTER]
DEBUG - 2026-03-30 13:05:40 --> [REQ_ID=520b9d61ba36] [LIFECYCLE][END] status=200 duration_ms=33.18 memory_delta=0
INFO - 2026-03-30 13:05:40 --> [REQ_ID=55c90eb2ba25] [PERF] Execution time=0.033230
DEBUG - 2026-03-30 13:05:40 --> [REQ_ID=520b9d61ba36] [REQUEST][END]
INFO - 2026-03-30 13:05:40 --> [REQ_ID=520b9d61ba36] [PERF] Execution time=0.043233
DEBUG - 2026-03-30 13:05:44 --> [REQ_ID=cdc1ed49ea98] [REQUEST][START] GET /index.php/Account/Activity
DEBUG - 2026-03-30 13:05:44 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-30 13:05:44 --> [REQ_ID=cdc1ed49ea98] [FILTER_BEFORE] /index.php/Account/Activity
DEBUG - 2026-03-30 13:05:44 --> [REQ_ID=cdc1ed49ea98] [ROUTE] Controller=\App\Modules\User\Controllers\DashboardController Method=activity
DEBUG - 2026-03-30 13:05:44 --> [REQ_ID=cdc1ed49ea98] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Account/Activity
DEBUG - 2026-03-30 13:05:44 --> [CSRF] token name=csrf_test_name hash=28d99428fd86e16f5a824ba04b8565ba
DEBUG - 2026-03-30 13:05:44 --> [REQ_ID=cdc1ed49ea98] [REQUEST][END]
INFO - 2026-03-30 13:05:44 --> [REQ_ID=cdc1ed49ea98] [PERF] Execution time=0.013779
DEBUG - 2026-03-30 13:05:46 --> [REQ_ID=b72f46401a3f] [REQUEST][START] GET /index.php/register/success
DEBUG - 2026-03-30 13:05:46 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-30 13:05:46 --> [REQ_ID=b72f46401a3f] [FILTER_BEFORE] /index.php/register/success
DEBUG - 2026-03-30 13:05:46 --> [REQ_ID=b72f46401a3f] [ROUTE] Controller=\App\Controllers\AuthController Method=registerSuccess
DEBUG - 2026-03-30 13:05:46 --> [REQ_ID=b72f46401a3f] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/register/success
DEBUG - 2026-03-30 13:05:46 --> [CSRF] token name=csrf_test_name hash=e9ac5f2a5f3cc8fb7071efa1c347659b
DEBUG - 2026-03-30 13:05:46 --> [REQ_ID=5f6c0c9fbeb7] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-30 13:05:46 --> [REQ_ID=5f6c0c9fbeb7] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-30 13:05:46 --> [TRACE]
INFO - 2026-03-30 13:05:46 --> AuthController::registerSuccess view rendered.
CRITICAL - 2026-03-30 13:05:46 --> [VIEW ERROR]
INFO - 2026-03-30 13:05:46 --> [REQ_ID=5f6c0c9fbeb7] [PERF] Execution time=0.021549
DEBUG - 2026-03-30 13:06:09 --> [REQ_ID=2bc5c5f4989b] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-30 13:06:09 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-30 13:06:09 --> [REQ_ID=2bc5c5f4989b] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-30 13:06:09 --> [REQ_ID=2bc5c5f4989b] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-30 13:06:09 --> [REQ_ID=2bc5c5f4989b] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-30 13:06:09 --> [CSRF] token name=csrf_test_name hash=28d99428fd86e16f5a824ba04b8565ba
DEBUG - 2026-03-30 13:06:09 --> [REQ_ID=d1b29abeff59] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-30 13:06:09 --> [REQ_ID=d1b29abeff59] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-30 13:06:09 --> [TRACE]
DEBUG - 2026-03-30 13:06:09 --> [REQ_ID=2bc5c5f4989b] [FILTER_AFTER]
DEBUG - 2026-03-30 13:06:09 --> [REQ_ID=2bc5c5f4989b] [LIFECYCLE][END] status=200 duration_ms=52.14 memory_delta=0
INFO - 2026-03-30 13:06:09 --> [REQ_ID=d1b29abeff59] [PERF] Execution time=0.052764
DEBUG - 2026-03-30 13:06:09 --> [REQ_ID=2bc5c5f4989b] [REQUEST][END]
INFO - 2026-03-30 13:06:09 --> [REQ_ID=2bc5c5f4989b] [PERF] Execution time=0.063123
DEBUG - 2026-03-30 13:06:09 --> [REQ_ID=94da9287d79a] [REQUEST][START] GET /index.php/Customer-Support
DEBUG - 2026-03-30 13:06:09 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-30 13:06:09 --> [REQ_ID=94da9287d79a] [FILTER_BEFORE] /index.php/Customer-Support
DEBUG - 2026-03-30 13:06:09 --> [REQ_ID=94da9287d79a] [ROUTE] Controller=\App\Controllers\App\Modules\Support\Controllers\SupportController Method=index
DEBUG - 2026-03-30 13:06:09 --> [REQ_ID=94da9287d79a] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Customer-Support
DEBUG - 2026-03-30 13:06:09 --> [CSRF] token name=csrf_test_name hash=28d99428fd86e16f5a824ba04b8565ba
DEBUG - 2026-03-30 13:06:09 --> [REQ_ID=94da9287d79a] [REQUEST][END]
INFO - 2026-03-30 13:06:09 --> [REQ_ID=94da9287d79a] [PERF] Execution time=0.010575
DEBUG - 2026-03-30 13:06:10 --> [REQ_ID=c8ce6acb4092] [REQUEST][START] GET /index.php/register/success
DEBUG - 2026-03-30 13:06:10 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-30 13:06:10 --> [REQ_ID=c8ce6acb4092] [FILTER_BEFORE] /index.php/register/success
DEBUG - 2026-03-30 13:06:10 --> [REQ_ID=c8ce6acb4092] [ROUTE] Controller=\App\Controllers\AuthController Method=registerSuccess
DEBUG - 2026-03-30 13:06:10 --> [REQ_ID=c8ce6acb4092] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/register/success
DEBUG - 2026-03-30 13:06:10 --> [CSRF] token name=csrf_test_name hash=e9ac5f2a5f3cc8fb7071efa1c347659b
DEBUG - 2026-03-30 13:06:10 --> [REQ_ID=8bfecff24bee] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-30 13:06:10 --> [REQ_ID=8bfecff24bee] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-30 13:06:10 --> [TRACE]
INFO - 2026-03-30 13:06:10 --> AuthController::registerSuccess view rendered.
CRITICAL - 2026-03-30 13:06:10 --> [VIEW ERROR]
INFO - 2026-03-30 13:06:10 --> [REQ_ID=8bfecff24bee] [PERF] Execution time=0.016153
DEBUG - 2026-03-30 13:06:22 --> [REQ_ID=aae20c4c34c5] [REQUEST][START] HEAD /
DEBUG - 2026-03-30 13:06:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
ERROR - 2026-03-30 13:06:22 --> [404_ROUTE]
DEBUG - 2026-03-30 13:06:34 --> [REQ_ID=24e9479da794] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-30 13:06:34 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-30 13:06:34 --> [REQ_ID=24e9479da794] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-30 13:06:34 --> [REQ_ID=24e9479da794] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-30 13:06:34 --> [REQ_ID=24e9479da794] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-30 13:06:34 --> [CSRF] token name=csrf_test_name hash=28d99428fd86e16f5a824ba04b8565ba
DEBUG - 2026-03-30 13:06:34 --> [REQ_ID=625f600edaab] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-30 13:06:34 --> [REQ_ID=625f600edaab] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-30 13:06:34 --> [TRACE]
DEBUG - 2026-03-30 13:06:34 --> [REQ_ID=24e9479da794] [FILTER_AFTER]
DEBUG - 2026-03-30 13:06:34 --> [REQ_ID=24e9479da794] [LIFECYCLE][END] status=200 duration_ms=16.66 memory_delta=0
INFO - 2026-03-30 13:06:34 --> [REQ_ID=625f600edaab] [PERF] Execution time=0.017106
DEBUG - 2026-03-30 13:06:34 --> [REQ_ID=24e9479da794] [REQUEST][END]
INFO - 2026-03-30 13:06:34 --> [REQ_ID=24e9479da794] [PERF] Execution time=0.026550
DEBUG - 2026-03-30 13:11:22 --> [REQ_ID=53b344334329] [REQUEST][START] HEAD /
DEBUG - 2026-03-30 13:11:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
ERROR - 2026-03-30 13:11:22 --> [404_ROUTE]
DEBUG - 2026-03-30 13:15:01 --> [REQ_ID=5e749bb4524a] [REQUEST][START] GET /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-30 13:15:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-30 13:15:01 --> [REQ_ID=5e749bb4524a] [FILTER_BEFORE] /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-30 13:15:01 --> [REQ_ID=5e749bb4524a] [ROUTE] Controller=\App\Modules\APIs\Controllers\AlertsAPIController Method=fetchEmailAlerts
DEBUG - 2026-03-30 13:15:01 --> [REQ_ID=5e749bb4524a] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-30 13:15:01 --> [REQ_ID=5e749bb4524a] [REQUEST][END]
INFO - 2026-03-30 13:15:01 --> [REQ_ID=5e749bb4524a] [PERF] Execution time=0.041830
DEBUG - 2026-03-30 13:16:22 --> [REQ_ID=7166d45b8f9c] [REQUEST][START] HEAD /
DEBUG - 2026-03-30 13:16:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
ERROR - 2026-03-30 13:16:22 --> [404_ROUTE]
DEBUG - 2026-03-30 13:21:17 --> [REQ_ID=19c083e0a7ea] [REQUEST][START] GET /index.php/register/success
DEBUG - 2026-03-30 13:21:17 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-30 13:21:17 --> [REQ_ID=19c083e0a7ea] [FILTER_BEFORE] /index.php/register/success
DEBUG - 2026-03-30 13:21:17 --> [REQ_ID=19c083e0a7ea] [ROUTE] Controller=\App\Controllers\AuthController Method=registerSuccess
DEBUG - 2026-03-30 13:21:17 --> [REQ_ID=19c083e0a7ea] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/register/success
DEBUG - 2026-03-30 13:21:17 --> [CSRF] token name=csrf_test_name hash=b76bdb9876431cc098fbc25d598783e2
DEBUG - 2026-03-30 13:21:17 --> [REQ_ID=06b8210b2e3a] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-30 13:21:17 --> [REQ_ID=06b8210b2e3a] [MEMORY][controller-start] 6291456
DEBUG - 2026-03-30 13:21:17 --> [TRACE]
INFO - 2026-03-30 13:21:17 --> AuthController::registerSuccess view rendered.
CRITICAL - 2026-03-30 13:21:17 --> [VIEW ERROR]
INFO - 2026-03-30 13:21:17 --> [REQ_ID=06b8210b2e3a] [PERF] Execution time=0.225186
DEBUG - 2026-03-30 13:21:22 --> [REQ_ID=88802c407d8d] [REQUEST][START] HEAD /
DEBUG - 2026-03-30 13:21:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
ERROR - 2026-03-30 13:21:22 --> [404_ROUTE]
DEBUG - 2026-03-30 13:21:23 --> [REQ_ID=6ed1e484ea3d] [REQUEST][START] GET /index.php/register/success
DEBUG - 2026-03-30 13:21:23 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-30 13:21:23 --> [REQ_ID=6ed1e484ea3d] [FILTER_BEFORE] /index.php/register/success
DEBUG - 2026-03-30 13:21:23 --> [REQ_ID=6ed1e484ea3d] [ROUTE] Controller=\App\Controllers\AuthController Method=registerSuccess
DEBUG - 2026-03-30 13:21:23 --> [REQ_ID=6ed1e484ea3d] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/register/success
DEBUG - 2026-03-30 13:21:23 --> [CSRF] token name=csrf_test_name hash=555dbbf2f8aab7b5f5e019e31aee40bc
DEBUG - 2026-03-30 13:21:23 --> [REQ_ID=2ed08fa882ec] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-30 13:21:23 --> [REQ_ID=2ed08fa882ec] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-30 13:21:23 --> [TRACE]
INFO - 2026-03-30 13:21:23 --> AuthController::registerSuccess view rendered.
CRITICAL - 2026-03-30 13:21:23 --> [VIEW ERROR]
INFO - 2026-03-30 13:21:23 --> [REQ_ID=2ed08fa882ec] [PERF] Execution time=0.014714
DEBUG - 2026-03-30 13:21:26 --> [REQ_ID=bf645b1c009b] [REQUEST][START] GET /index.php/register/success
DEBUG - 2026-03-30 13:21:26 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-30 13:21:26 --> [REQ_ID=bf645b1c009b] [FILTER_BEFORE] /index.php/register/success
DEBUG - 2026-03-30 13:21:26 --> [REQ_ID=bf645b1c009b] [ROUTE] Controller=\App\Controllers\AuthController Method=registerSuccess
DEBUG - 2026-03-30 13:21:26 --> [REQ_ID=bf645b1c009b] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/register/success
DEBUG - 2026-03-30 13:21:26 --> [CSRF] token name=csrf_test_name hash=bd1d8ba71b13f2579d2ef032072e82fa
DEBUG - 2026-03-30 13:21:26 --> [REQ_ID=bf5769988287] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-30 13:21:26 --> [REQ_ID=bf5769988287] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-30 13:21:26 --> [TRACE]
INFO - 2026-03-30 13:21:26 --> AuthController::registerSuccess view rendered.
CRITICAL - 2026-03-30 13:21:26 --> [VIEW ERROR]
INFO - 2026-03-30 13:21:26 --> [REQ_ID=bf5769988287] [PERF] Execution time=0.014529
DEBUG - 2026-03-30 13:24:08 --> [REQ_ID=e7d5a2f1ec48] [REQUEST][START] GET /
DEBUG - 2026-03-30 13:24:08 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-30 13:24:08 --> [REQ_ID=e7d5a2f1ec48] [REQUEST][END]
INFO - 2026-03-30 13:24:08 --> [REQ_ID=e7d5a2f1ec48] [PERF] Execution time=0.033719
DEBUG - 2026-03-30 13:26:22 --> [REQ_ID=08f75610b5e1] [REQUEST][START] HEAD /
DEBUG - 2026-03-30 13:26:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
ERROR - 2026-03-30 13:26:22 --> [404_ROUTE]
DEBUG - 2026-03-30 13:26:51 --> [REQ_ID=fabefbe63ae9] [REQUEST][START] GET /index.php/register/success
DEBUG - 2026-03-30 13:26:51 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-30 13:26:51 --> [REQ_ID=fabefbe63ae9] [FILTER_BEFORE] /index.php/register/success
DEBUG - 2026-03-30 13:26:51 --> [REQ_ID=fabefbe63ae9] [ROUTE] Controller=\App\Controllers\AuthController Method=registerSuccess
DEBUG - 2026-03-30 13:26:51 --> [REQ_ID=fabefbe63ae9] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/register/success
DEBUG - 2026-03-30 13:26:51 --> [CSRF] token name=csrf_test_name hash=8e7871933e078db306738e6b3d67ac80
DEBUG - 2026-03-30 13:26:51 --> [REQ_ID=c21ce22ddbf4] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-30 13:26:51 --> [REQ_ID=c21ce22ddbf4] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-30 13:26:51 --> [TRACE]
INFO - 2026-03-30 13:26:51 --> AuthController::registerSuccess view rendered.
CRITICAL - 2026-03-30 13:26:51 --> [VIEW ERROR]
INFO - 2026-03-30 13:26:51 --> [REQ_ID=c21ce22ddbf4] [PERF] Execution time=0.055408
DEBUG - 2026-03-30 13:31:22 --> [REQ_ID=63e8399991cb] [REQUEST][START] HEAD /
DEBUG - 2026-03-30 13:31:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
ERROR - 2026-03-30 13:31:22 --> [404_ROUTE]
DEBUG - 2026-03-30 13:36:22 --> [REQ_ID=163d18dd579f] [REQUEST][START] HEAD /
DEBUG - 2026-03-30 13:36:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
ERROR - 2026-03-30 13:36:22 --> [404_ROUTE]
DEBUG - 2026-03-30 13:40:43 --> [REQ_ID=15679e28be52] [REQUEST][START] GET /
DEBUG - 2026-03-30 13:40:43 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-30 13:40:44 --> [REQ_ID=15679e28be52] [FILTER_BEFORE] /
DEBUG - 2026-03-30 13:40:44 --> [REQ_ID=15679e28be52] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-30 13:40:44 --> [REQ_ID=15679e28be52] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-30 13:40:44 --> [CSRF] token name=csrf_test_name hash=b495fae082c2e2dda9848150d36f492d
DEBUG - 2026-03-30 13:40:44 --> [REQ_ID=d6c8c5df5b75] [INIT] App\Controllers\Home::GET
INFO - 2026-03-30 13:40:44 --> [REQ_ID=d6c8c5df5b75] [MEMORY][controller-start] 6291456
DEBUG - 2026-03-30 13:40:44 --> [TRACE]
INFO - 2026-03-30 13:40:44 --> [REQ_ID=d6c8c5df5b75] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-30 13:40:44 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-30 13:40:44 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-03-30 13:40:44 --> [REQ_ID=d6c8c5df5b75] [VIEW_RENDER] themes/public/home
INFO - 2026-03-30 13:40:44 --> [REQ_ID=d6c8c5df5b75] [MEMORY][commonData:start] 10485760
INFO - 2026-03-30 13:40:44 --> themesMemory usage: 10485760
DEBUG - 2026-03-30 13:40:44 --> [MetaService] slug= pageName=Home cacheHit= path=DB
DEBUG - 2026-03-30 13:40:44 --> [REQ_ID=15679e28be52] [FILTER_AFTER]
DEBUG - 2026-03-30 13:40:44 --> [REQ_ID=15679e28be52] [LIFECYCLE][END] status=200 duration_ms=657.90 memory_delta=4194304
INFO - 2026-03-30 13:40:44 --> [REQ_ID=d6c8c5df5b75] [PERF] Execution time=0.659844
DEBUG - 2026-03-30 13:40:44 --> [REQ_ID=15679e28be52] [REQUEST][END]
INFO - 2026-03-30 13:40:44 --> [REQ_ID=15679e28be52] [PERF] Execution time=0.697013
DEBUG - 2026-03-30 13:40:47 --> [REQ_ID=c9ebac83fb1a] [REQUEST][START] GET /
DEBUG - 2026-03-30 13:40:47 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-30 13:40:47 --> [REQ_ID=c9ebac83fb1a] [FILTER_BEFORE] /
DEBUG - 2026-03-30 13:40:47 --> [REQ_ID=c9ebac83fb1a] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-30 13:40:47 --> [REQ_ID=c9ebac83fb1a] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-30 13:40:47 --> [CSRF] token name=csrf_test_name hash=82a6bc6db6651af22b9534596d119d43
DEBUG - 2026-03-30 13:40:47 --> [REQ_ID=6765920cbe2a] [INIT] App\Controllers\Home::GET
INFO - 2026-03-30 13:40:47 --> [REQ_ID=6765920cbe2a] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-30 13:40:47 --> [TRACE]
INFO - 2026-03-30 13:40:47 --> [REQ_ID=6765920cbe2a] [MEMORY][commonData:start] 4194304
DEBUG - 2026-03-30 13:40:47 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-30 13:40:47 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
DEBUG - 2026-03-30 13:40:47 --> [REQ_ID=6765920cbe2a] [VIEW_RENDER] themes/public/home
INFO - 2026-03-30 13:40:47 --> [REQ_ID=6765920cbe2a] [MEMORY][commonData:start] 8388608
INFO - 2026-03-30 13:40:47 --> themesMemory usage: 8388608
DEBUG - 2026-03-30 13:40:47 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-30 13:40:47 --> [REQ_ID=c9ebac83fb1a] [FILTER_AFTER]
DEBUG - 2026-03-30 13:40:47 --> [REQ_ID=c9ebac83fb1a] [LIFECYCLE][END] status=200 duration_ms=554.83 memory_delta=4194304
INFO - 2026-03-30 13:40:47 --> [REQ_ID=6765920cbe2a] [PERF] Execution time=0.554903
DEBUG - 2026-03-30 13:40:47 --> [REQ_ID=c9ebac83fb1a] [REQUEST][END]
INFO - 2026-03-30 13:40:47 --> [REQ_ID=c9ebac83fb1a] [PERF] Execution time=0.565317
DEBUG - 2026-03-30 13:40:48 --> [REQ_ID=fd6b068be861] [REQUEST][START] GET /index.php/Legal/Terms-And-Conditions
DEBUG - 2026-03-30 13:40:48 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-30 13:40:48 --> [REQ_ID=fd6b068be861] [FILTER_BEFORE] /index.php/Legal/Terms-And-Conditions
DEBUG - 2026-03-30 13:40:48 --> [REQ_ID=fd6b068be861] [ROUTE] Controller=\App\Controllers\Home Method=terms
DEBUG - 2026-03-30 13:40:48 --> [REQ_ID=fd6b068be861] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Legal/Terms-And-Conditions
DEBUG - 2026-03-30 13:40:48 --> [CSRF] token name=csrf_test_name hash=a95826d64a94311b341174bd0d6a1f2b
DEBUG - 2026-03-30 13:40:48 --> [REQ_ID=fd6b068be861] [REQUEST][END]
INFO - 2026-03-30 13:40:48 --> [REQ_ID=fd6b068be861] [PERF] Execution time=0.009685
DEBUG - 2026-03-30 13:40:48 --> [REQ_ID=df72d2a6d2b0] [REQUEST][START] GET /index.php/How-It-Works/Automated-Financial-Insights
DEBUG - 2026-03-30 13:40:48 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-30 13:40:48 --> [REQ_ID=df72d2a6d2b0] [FILTER_BEFORE] /index.php/How-It-Works/Automated-Financial-Insights
DEBUG - 2026-03-30 13:40:48 --> [REQ_ID=df72d2a6d2b0] [ROUTE] Controller=\App\Modules\Blog\Controllers\HowItWorksController Method=show
DEBUG - 2026-03-30 13:40:48 --> [REQ_ID=df72d2a6d2b0] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/How-It-Works/Automated-Financial-Insights
DEBUG - 2026-03-30 13:40:48 --> [CSRF] token name=csrf_test_name hash=09a7e3f4ebc4fa11e1e94ef361959339
DEBUG - 2026-03-30 13:40:48 --> [REQ_ID=3396989467b9] [INIT] App\Modules\Blog\Controllers\HowItWorksController::GET
INFO - 2026-03-30 13:40:48 --> [REQ_ID=3396989467b9] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-30 13:40:48 --> [TRACE]
DEBUG - 2026-03-30 13:40:48 --> [REQ_ID=3396989467b9] [METHOD_ENTRY] show
DEBUG - 2026-03-30 13:40:48 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-30 13:40:48 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-30 13:40:48 --> MyMICoin initialized ONCE
DEBUG - 2026-03-30 13:40:48 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-30 13:40:48 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-30 13:40:48 --> MyMIWallets skipped (no user context)
ERROR - 2026-03-30 13:40:48 --> HowItWorksController failure: Cannot access protected property CodeIgniter\HTTP\IncomingRequest::$uri
INFO - 2026-03-30 13:40:48 --> [REQ_ID=3396989467b9] [PERF] Execution time=0.054493
DEBUG - 2026-03-30 13:40:48 --> [REQ_ID=78cd929d72a3] [REQUEST][START] GET /index.php/How-It-Works/Investment-Dashboard
DEBUG - 2026-03-30 13:40:48 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-30 13:40:48 --> [REQ_ID=78cd929d72a3] [FILTER_BEFORE] /index.php/How-It-Works/Investment-Dashboard
DEBUG - 2026-03-30 13:40:48 --> [REQ_ID=78cd929d72a3] [ROUTE] Controller=\App\Modules\Blog\Controllers\HowItWorksController Method=show
DEBUG - 2026-03-30 13:40:48 --> [REQ_ID=78cd929d72a3] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/How-It-Works/Investment-Dashboard
DEBUG - 2026-03-30 13:40:48 --> [CSRF] token name=csrf_test_name hash=4ae065aa079362a344c0db616d688fe3
DEBUG - 2026-03-30 13:40:48 --> [REQ_ID=77fc39ec007b] [INIT] App\Modules\Blog\Controllers\HowItWorksController::GET
INFO - 2026-03-30 13:40:48 --> [REQ_ID=77fc39ec007b] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-30 13:40:48 --> [TRACE]
DEBUG - 2026-03-30 13:40:48 --> [REQ_ID=77fc39ec007b] [METHOD_ENTRY] show
DEBUG - 2026-03-30 13:40:48 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-30 13:40:48 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-30 13:40:48 --> MyMICoin initialized ONCE
DEBUG - 2026-03-30 13:40:48 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-30 13:40:48 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-30 13:40:48 --> MyMIWallets skipped (no user context)
ERROR - 2026-03-30 13:40:48 --> HowItWorksController failure: Cannot access protected property CodeIgniter\HTTP\IncomingRequest::$uri
INFO - 2026-03-30 13:40:48 --> [REQ_ID=77fc39ec007b] [PERF] Execution time=0.018303
DEBUG - 2026-03-30 13:40:48 --> [REQ_ID=db06f8c3f082] [REQUEST][START] GET /index.php/Support
DEBUG - 2026-03-30 13:40:48 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-30 13:40:48 --> [REQ_ID=db06f8c3f082] [FILTER_BEFORE] /index.php/Support
DEBUG - 2026-03-30 13:40:48 --> [REQ_ID=db06f8c3f082] [ROUTE] Controller=\App\Modules\Support\Controllers\SupportController Method=index
DEBUG - 2026-03-30 13:40:48 --> [REQ_ID=db06f8c3f082] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Support
DEBUG - 2026-03-30 13:40:48 --> [CSRF] token name=csrf_test_name hash=9821a63a81660f2044165689bab215ba
DEBUG - 2026-03-30 13:40:48 --> [REQ_ID=ac33b71b1156] [INIT] App\Modules\Support\Controllers\SupportController::GET
INFO - 2026-03-30 13:40:48 --> [REQ_ID=ac33b71b1156] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-30 13:40:48 --> [TRACE]
DEBUG - 2026-03-30 13:40:48 --> [REQ_ID=ac33b71b1156] [METHOD_ENTRY] index
DEBUG - 2026-03-30 13:40:48 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-30 13:40:48 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-30 13:40:48 --> MyMICoin initialized ONCE
DEBUG - 2026-03-30 13:40:48 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-30 13:40:48 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-30 13:40:48 --> MyMIWallets skipped (no user context)
INFO - 2026-03-30 13:40:48 --> [REQ_ID=ac33b71b1156] [MEMORY][commonData:start] 4194304
DEBUG - 2026-03-30 13:40:48 --> [REQ_ID=ac33b71b1156] [VIEW_RENDER] SupportModule\Views\Support\index
INFO - 2026-03-30 13:40:48 --> [REQ_ID=ac33b71b1156] [MEMORY][commonData:start] 4194304
INFO - 2026-03-30 13:40:48 --> themesMemory usage: 4194304
DEBUG - 2026-03-30 13:40:48 --> [REQ_ID=db06f8c3f082] [FILTER_AFTER]
DEBUG - 2026-03-30 13:40:48 --> [REQ_ID=db06f8c3f082] [LIFECYCLE][END] status=200 duration_ms=35.74 memory_delta=0
INFO - 2026-03-30 13:40:48 --> [REQ_ID=ac33b71b1156] [PERF] Execution time=0.036070
DEBUG - 2026-03-30 13:40:48 --> [REQ_ID=db06f8c3f082] [REQUEST][END]
INFO - 2026-03-30 13:40:48 --> [REQ_ID=db06f8c3f082] [PERF] Execution time=0.048131
DEBUG - 2026-03-30 13:40:49 --> [REQ_ID=88e1a1638c7b] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-30 13:40:49 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-30 13:40:49 --> [REQ_ID=88e1a1638c7b] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-30 13:40:49 --> [REQ_ID=88e1a1638c7b] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-30 13:40:49 --> [REQ_ID=88e1a1638c7b] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-30 13:40:49 --> [CSRF] token name=csrf_test_name hash=35165cd72c23846848a8e6636e30310f
DEBUG - 2026-03-30 13:40:49 --> [REQ_ID=4b85c186fedd] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-30 13:40:49 --> [REQ_ID=4b85c186fedd] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-30 13:40:49 --> [TRACE]
DEBUG - 2026-03-30 13:40:49 --> [REQ_ID=88e1a1638c7b] [FILTER_AFTER]
DEBUG - 2026-03-30 13:40:49 --> [REQ_ID=88e1a1638c7b] [LIFECYCLE][END] status=200 duration_ms=24.89 memory_delta=0
INFO - 2026-03-30 13:40:49 --> [REQ_ID=4b85c186fedd] [PERF] Execution time=0.024777
DEBUG - 2026-03-30 13:40:49 --> [REQ_ID=88e1a1638c7b] [REQUEST][END]
INFO - 2026-03-30 13:40:49 --> [REQ_ID=88e1a1638c7b] [PERF] Execution time=0.036585
DEBUG - 2026-03-30 13:40:49 --> [REQ_ID=fd36d1411ac7] [REQUEST][START] GET /index.php/Legal/Privacy-Policy
DEBUG - 2026-03-30 13:40:49 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-30 13:40:49 --> [REQ_ID=fd36d1411ac7] [FILTER_BEFORE] /index.php/Legal/Privacy-Policy
DEBUG - 2026-03-30 13:40:49 --> [REQ_ID=fd36d1411ac7] [ROUTE] Controller=\App\Controllers\Home Method=privacyPolicy
DEBUG - 2026-03-30 13:40:49 --> [REQ_ID=fd36d1411ac7] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Legal/Privacy-Policy
DEBUG - 2026-03-30 13:40:49 --> [CSRF] token name=csrf_test_name hash=101563ba5dbbc8613fbe4e4caba81e8c
DEBUG - 2026-03-30 13:40:49 --> [REQ_ID=fd36d1411ac7] [REQUEST][END]
INFO - 2026-03-30 13:40:49 --> [REQ_ID=fd36d1411ac7] [PERF] Execution time=0.009099
DEBUG - 2026-03-30 13:40:49 --> [REQ_ID=1b9a27a8bf1a] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-30 13:40:49 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-30 13:40:49 --> [REQ_ID=1b9a27a8bf1a] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-30 13:40:49 --> [REQ_ID=1b9a27a8bf1a] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-30 13:40:49 --> [REQ_ID=1b9a27a8bf1a] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-30 13:40:49 --> [CSRF] token name=csrf_test_name hash=8fdce8b4c4a205d5f484c08c19f34697
DEBUG - 2026-03-30 13:40:49 --> [REQ_ID=1bcc432d2686] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-30 13:40:49 --> [REQ_ID=1bcc432d2686] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-30 13:40:49 --> [TRACE]
DEBUG - 2026-03-30 13:40:49 --> [REQ_ID=1b9a27a8bf1a] [FILTER_AFTER]
DEBUG - 2026-03-30 13:40:49 --> [REQ_ID=1b9a27a8bf1a] [LIFECYCLE][END] status=200 duration_ms=24.03 memory_delta=0
INFO - 2026-03-30 13:40:49 --> [REQ_ID=1bcc432d2686] [PERF] Execution time=0.024194
DEBUG - 2026-03-30 13:40:49 --> [REQ_ID=1b9a27a8bf1a] [REQUEST][END]
INFO - 2026-03-30 13:40:49 --> [REQ_ID=1b9a27a8bf1a] [PERF] Execution time=0.032767
DEBUG - 2026-03-30 13:40:49 --> [REQ_ID=feaaab61bec6] [REQUEST][START] GET /index.php/How-It-Works/Investment-Portfolio-Management
DEBUG - 2026-03-30 13:40:49 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-30 13:40:49 --> [REQ_ID=feaaab61bec6] [FILTER_BEFORE] /index.php/How-It-Works/Investment-Portfolio-Management
DEBUG - 2026-03-30 13:40:49 --> [REQ_ID=feaaab61bec6] [ROUTE] Controller=\App\Modules\Blog\Controllers\HowItWorksController Method=InvestmentPortfolioManagement
DEBUG - 2026-03-30 13:40:49 --> [REQ_ID=feaaab61bec6] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/How-It-Works/Investment-Portfolio-Management
DEBUG - 2026-03-30 13:40:49 --> [CSRF] token name=csrf_test_name hash=c81afa41dd0ca068d3622dddb463b92d
DEBUG - 2026-03-30 13:40:49 --> [REQ_ID=d242a1cf8ab4] [INIT] App\Modules\Blog\Controllers\HowItWorksController::GET
INFO - 2026-03-30 13:40:49 --> [REQ_ID=d242a1cf8ab4] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-30 13:40:49 --> [TRACE]
DEBUG - 2026-03-30 13:40:49 --> [REQ_ID=d242a1cf8ab4] [METHOD_ENTRY] InvestmentPortfolioManagement
DEBUG - 2026-03-30 13:40:49 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-30 13:40:49 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-30 13:40:49 --> MyMICoin initialized ONCE
DEBUG - 2026-03-30 13:40:49 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-30 13:40:49 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-30 13:40:49 --> MyMIWallets skipped (no user context)
INFO - 2026-03-30 13:40:49 --> [REQ_ID=d242a1cf8ab4] [MEMORY][commonData:start] 4194304
INFO - 2026-03-30 13:40:50 --> themesMemory usage: 8388608
DEBUG - 2026-03-30 13:40:50 --> [MetaService] slug=how-it-works/investment-portfolio-management pageName= cacheHit= path=DB
DEBUG - 2026-03-30 13:40:50 --> [REQ_ID=feaaab61bec6] [FILTER_AFTER]
DEBUG - 2026-03-30 13:40:50 --> [REQ_ID=feaaab61bec6] [LIFECYCLE][END] status=200 duration_ms=564.18 memory_delta=4194304
INFO - 2026-03-30 13:40:50 --> [REQ_ID=d242a1cf8ab4] [PERF] Execution time=0.563818
DEBUG - 2026-03-30 13:40:50 --> [REQ_ID=feaaab61bec6] [REQUEST][END]
INFO - 2026-03-30 13:40:50 --> [REQ_ID=feaaab61bec6] [PERF] Execution time=0.574498
DEBUG - 2026-03-30 13:40:50 --> [REQ_ID=25195746d6d6] [REQUEST][START] GET /index.php/Knowledgebase
DEBUG - 2026-03-30 13:40:50 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-30 13:40:50 --> [REQ_ID=25195746d6d6] [FILTER_BEFORE] /index.php/Knowledgebase
DEBUG - 2026-03-30 13:40:50 --> [REQ_ID=25195746d6d6] [ROUTE] Controller=\App\Modules\User\Controllers\KnowledgebaseController Method=index
DEBUG - 2026-03-30 13:40:50 --> [REQ_ID=25195746d6d6] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Knowledgebase
DEBUG - 2026-03-30 13:40:50 --> [CSRF] token name=csrf_test_name hash=6e841cedc754898a7fe8655eb8833ac1
DEBUG - 2026-03-30 13:40:50 --> [REQ_ID=25195746d6d6] [REQUEST][END]
INFO - 2026-03-30 13:40:50 --> [REQ_ID=25195746d6d6] [PERF] Execution time=0.012430
DEBUG - 2026-03-30 13:40:50 --> [REQ_ID=c1d328459063] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-30 13:40:50 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-30 13:40:50 --> [REQ_ID=c1d328459063] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-30 13:40:50 --> [REQ_ID=c1d328459063] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-30 13:40:50 --> [REQ_ID=c1d328459063] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-30 13:40:50 --> [CSRF] token name=csrf_test_name hash=1fe145d4268bc49af6d83721dee4afbd
DEBUG - 2026-03-30 13:40:50 --> [REQ_ID=5c5eea3ed3b1] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-30 13:40:50 --> [REQ_ID=5c5eea3ed3b1] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-30 13:40:50 --> [TRACE]
DEBUG - 2026-03-30 13:40:50 --> [REQ_ID=c1d328459063] [FILTER_AFTER]
DEBUG - 2026-03-30 13:40:50 --> [REQ_ID=c1d328459063] [LIFECYCLE][END] status=200 duration_ms=20.32 memory_delta=0
INFO - 2026-03-30 13:40:50 --> [REQ_ID=5c5eea3ed3b1] [PERF] Execution time=0.020620
DEBUG - 2026-03-30 13:40:50 --> [REQ_ID=c1d328459063] [REQUEST][END]
INFO - 2026-03-30 13:40:50 --> [REQ_ID=c1d328459063] [PERF] Execution time=0.029608
DEBUG - 2026-03-30 13:40:50 --> [REQ_ID=455a116b6fc2] [REQUEST][START] GET /index.php/Free/register
DEBUG - 2026-03-30 13:40:50 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-30 13:40:50 --> [REQ_ID=455a116b6fc2] [FILTER_BEFORE] /index.php/Free/register
DEBUG - 2026-03-30 13:40:50 --> [REQ_ID=455a116b6fc2] [ROUTE] Controller=\App\Controllers\AuthController Method=register
DEBUG - 2026-03-30 13:40:50 --> [REQ_ID=455a116b6fc2] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Free/register
DEBUG - 2026-03-30 13:40:50 --> [CSRF] token name=csrf_test_name hash=575c5c0ac2a38e233464d0b657eba07c
DEBUG - 2026-03-30 13:40:50 --> [REQ_ID=a45baf95208a] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-30 13:40:50 --> [REQ_ID=a45baf95208a] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-30 13:40:50 --> [TRACE]
INFO - 2026-03-30 13:40:50 --> [REGISTRATION] Form loaded
INFO - 2026-03-30 13:40:50 --> [REQ_ID=a45baf95208a] [PERF] Execution time=0.017846
DEBUG - 2026-03-30 13:40:50 --> [REQ_ID=449cbd7a9722] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-30 13:40:50 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-30 13:40:50 --> [REQ_ID=449cbd7a9722] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-30 13:40:50 --> [REQ_ID=449cbd7a9722] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-30 13:40:50 --> [REQ_ID=449cbd7a9722] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-30 13:40:50 --> [CSRF] token name=csrf_test_name hash=ae1060ab1b2d1f61bdfc8619fcb02d69
DEBUG - 2026-03-30 13:40:50 --> [REQ_ID=e764f588b6f6] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-30 13:40:50 --> [REQ_ID=e764f588b6f6] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-30 13:40:50 --> [TRACE]
DEBUG - 2026-03-30 13:40:50 --> [REQ_ID=449cbd7a9722] [FILTER_AFTER]
DEBUG - 2026-03-30 13:40:50 --> [REQ_ID=449cbd7a9722] [LIFECYCLE][END] status=200 duration_ms=16.33 memory_delta=0
INFO - 2026-03-30 13:40:50 --> [REQ_ID=e764f588b6f6] [PERF] Execution time=0.016676
DEBUG - 2026-03-30 13:40:50 --> [REQ_ID=449cbd7a9722] [REQUEST][END]
INFO - 2026-03-30 13:40:50 --> [REQ_ID=449cbd7a9722] [PERF] Execution time=0.025387
DEBUG - 2026-03-30 13:40:50 --> [REQ_ID=74bfac852e46] [REQUEST][START] GET /index.php/How-It-Works/Investor-Profile
DEBUG - 2026-03-30 13:40:50 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-30 13:40:50 --> [REQ_ID=74bfac852e46] [FILTER_BEFORE] /index.php/How-It-Works/Investor-Profile
DEBUG - 2026-03-30 13:40:50 --> [REQ_ID=74bfac852e46] [ROUTE] Controller=\App\Modules\Blog\Controllers\HowItWorksController Method=show
DEBUG - 2026-03-30 13:40:50 --> [REQ_ID=74bfac852e46] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/How-It-Works/Investor-Profile
DEBUG - 2026-03-30 13:40:50 --> [CSRF] token name=csrf_test_name hash=eee37daee1d7f25d967db85952ca5615
DEBUG - 2026-03-30 13:40:50 --> [REQ_ID=4f3122c3c9db] [INIT] App\Modules\Blog\Controllers\HowItWorksController::GET
INFO - 2026-03-30 13:40:50 --> [REQ_ID=4f3122c3c9db] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-30 13:40:50 --> [TRACE]
DEBUG - 2026-03-30 13:40:50 --> [REQ_ID=4f3122c3c9db] [METHOD_ENTRY] show
DEBUG - 2026-03-30 13:40:50 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-30 13:40:50 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-30 13:40:50 --> MyMICoin initialized ONCE
DEBUG - 2026-03-30 13:40:50 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-30 13:40:50 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-30 13:40:50 --> MyMIWallets skipped (no user context)
ERROR - 2026-03-30 13:40:50 --> HowItWorksController failure: Cannot access protected property CodeIgniter\HTTP\IncomingRequest::$uri
INFO - 2026-03-30 13:40:50 --> [REQ_ID=4f3122c3c9db] [PERF] Execution time=0.018354
DEBUG - 2026-03-30 13:40:50 --> [REQ_ID=f209a4aabf94] [REQUEST][START] GET /index.php/Terms-Of-Service
DEBUG - 2026-03-30 13:40:50 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-30 13:40:50 --> [REQ_ID=f209a4aabf94] [FILTER_BEFORE] /index.php/Terms-Of-Service
DEBUG - 2026-03-30 13:40:50 --> [REQ_ID=f209a4aabf94] [ROUTE] Controller=\App\Controllers\Home Method=termsOfService
DEBUG - 2026-03-30 13:40:50 --> [REQ_ID=f209a4aabf94] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Terms-Of-Service
DEBUG - 2026-03-30 13:40:50 --> [CSRF] token name=csrf_test_name hash=ea95ec2e7cb14905334f6a0f09c8d415
DEBUG - 2026-03-30 13:40:50 --> [REQ_ID=224b193e64ae] [INIT] App\Controllers\Home::GET
INFO - 2026-03-30 13:40:50 --> [REQ_ID=224b193e64ae] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-30 13:40:50 --> [TRACE]
INFO - 2026-03-30 13:40:50 --> [REQ_ID=224b193e64ae] [MEMORY][commonData:start] 4194304
DEBUG - 2026-03-30 13:40:50 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-30 13:40:51 --> [MetaService] slug=terms-of-service pageName= cacheHit= path=DB
DEBUG - 2026-03-30 13:40:51 --> [REQ_ID=224b193e64ae] [VIEW_RENDER] themes/public/termsOfService
INFO - 2026-03-30 13:40:51 --> [REQ_ID=224b193e64ae] [MEMORY][commonData:start] 8388608
INFO - 2026-03-30 13:40:51 --> themesMemory usage: 8388608
DEBUG - 2026-03-30 13:40:51 --> [MetaService] slug=terms-of-service pageName=Terms of Service cacheHit= path=DB
DEBUG - 2026-03-30 13:40:51 --> [REQ_ID=f209a4aabf94] [FILTER_AFTER]
DEBUG - 2026-03-30 13:40:51 --> [REQ_ID=f209a4aabf94] [LIFECYCLE][END] status=200 duration_ms=617.37 memory_delta=4194304
INFO - 2026-03-30 13:40:51 --> [REQ_ID=224b193e64ae] [PERF] Execution time=0.617668
DEBUG - 2026-03-30 13:40:51 --> [REQ_ID=f209a4aabf94] [REQUEST][END]
INFO - 2026-03-30 13:40:51 --> [REQ_ID=f209a4aabf94] [PERF] Execution time=0.626558
DEBUG - 2026-03-30 13:40:51 --> [REQ_ID=dda73ca39236] [REQUEST][START] GET /index.php/How-It-Works/MyMI-Exchange
DEBUG - 2026-03-30 13:40:51 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-30 13:40:52 --> [REQ_ID=dda73ca39236] [FILTER_BEFORE] /index.php/How-It-Works/MyMI-Exchange
DEBUG - 2026-03-30 13:40:52 --> [REQ_ID=dda73ca39236] [ROUTE] Controller=\App\Modules\Blog\Controllers\HowItWorksController Method=show
DEBUG - 2026-03-30 13:40:52 --> [REQ_ID=dda73ca39236] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/How-It-Works/MyMI-Exchange
DEBUG - 2026-03-30 13:40:52 --> [CSRF] token name=csrf_test_name hash=785f10506b63fe57cdbce2e04b4e6d26
DEBUG - 2026-03-30 13:40:52 --> [REQ_ID=beb96e666661] [INIT] App\Modules\Blog\Controllers\HowItWorksController::GET
INFO - 2026-03-30 13:40:52 --> [REQ_ID=beb96e666661] [MEMORY][controller-start] 6291456
DEBUG - 2026-03-30 13:40:52 --> [TRACE]
DEBUG - 2026-03-30 13:40:52 --> [REQ_ID=beb96e666661] [METHOD_ENTRY] show
DEBUG - 2026-03-30 13:40:52 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-30 13:40:52 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-30 13:40:52 --> MyMICoin initialized ONCE
DEBUG - 2026-03-30 13:40:52 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-30 13:40:52 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-30 13:40:52 --> MyMIWallets skipped (no user context)
ERROR - 2026-03-30 13:40:52 --> HowItWorksController failure: Cannot access protected property CodeIgniter\HTTP\IncomingRequest::$uri
INFO - 2026-03-30 13:40:52 --> [REQ_ID=beb96e666661] [PERF] Execution time=0.019673
DEBUG - 2026-03-30 13:40:52 --> [REQ_ID=b4bd1968c799] [REQUEST][START] GET /index.php
DEBUG - 2026-03-30 13:40:52 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-30 13:40:52 --> [REQ_ID=b4bd1968c799] [FILTER_BEFORE] /index.php
DEBUG - 2026-03-30 13:40:52 --> [REQ_ID=b4bd1968c799] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-30 13:40:52 --> [REQ_ID=b4bd1968c799] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-30 13:40:52 --> [CSRF] token name=csrf_test_name hash=88e36b6d7676195b966beb4822109989
DEBUG - 2026-03-30 13:40:52 --> [REQ_ID=d22019dfe00e] [INIT] App\Controllers\Home::GET
INFO - 2026-03-30 13:40:52 --> [REQ_ID=d22019dfe00e] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-30 13:40:52 --> [TRACE]
INFO - 2026-03-30 13:40:52 --> [REQ_ID=d22019dfe00e] [MEMORY][commonData:start] 4194304
DEBUG - 2026-03-30 13:40:52 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-30 13:40:53 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
DEBUG - 2026-03-30 13:40:53 --> [REQ_ID=d22019dfe00e] [VIEW_RENDER] themes/public/home
INFO - 2026-03-30 13:40:53 --> [REQ_ID=d22019dfe00e] [MEMORY][commonData:start] 8388608
INFO - 2026-03-30 13:40:53 --> themesMemory usage: 8388608
DEBUG - 2026-03-30 13:40:53 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-30 13:40:53 --> [REQ_ID=b4bd1968c799] [FILTER_AFTER]
DEBUG - 2026-03-30 13:40:53 --> [REQ_ID=b4bd1968c799] [LIFECYCLE][END] status=200 duration_ms=523.15 memory_delta=4194304
INFO - 2026-03-30 13:40:53 --> [REQ_ID=d22019dfe00e] [PERF] Execution time=0.523164
DEBUG - 2026-03-30 13:40:53 --> [REQ_ID=b4bd1968c799] [REQUEST][END]
INFO - 2026-03-30 13:40:53 --> [REQ_ID=b4bd1968c799] [PERF] Execution time=0.532476
DEBUG - 2026-03-30 13:40:53 --> [REQ_ID=8aaf0ea8415e] [REQUEST][START] GET /index.php/How-It-Works
DEBUG - 2026-03-30 13:40:53 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-30 13:40:53 --> [REQ_ID=8aaf0ea8415e] [FILTER_BEFORE] /index.php/How-It-Works
DEBUG - 2026-03-30 13:40:53 --> [REQ_ID=8aaf0ea8415e] [ROUTE] Controller=\App\Modules\Blog\Controllers\HowItWorksController Method=index
DEBUG - 2026-03-30 13:40:53 --> [REQ_ID=8aaf0ea8415e] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/How-It-Works
DEBUG - 2026-03-30 13:40:53 --> [CSRF] token name=csrf_test_name hash=c1144462e486b6a393d9df50ebdd4a0a
DEBUG - 2026-03-30 13:40:53 --> [REQ_ID=4fac2d4157de] [INIT] App\Modules\Blog\Controllers\HowItWorksController::GET
INFO - 2026-03-30 13:40:53 --> [REQ_ID=4fac2d4157de] [MEMORY][controller-start] 6291456
DEBUG - 2026-03-30 13:40:53 --> [TRACE]
DEBUG - 2026-03-30 13:40:53 --> [REQ_ID=4fac2d4157de] [METHOD_ENTRY] index
DEBUG - 2026-03-30 13:40:53 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-30 13:40:53 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-30 13:40:53 --> MyMICoin initialized ONCE
DEBUG - 2026-03-30 13:40:53 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-30 13:40:53 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-30 13:40:53 --> MyMIWallets skipped (no user context)
ERROR - 2026-03-30 13:40:53 --> HowItWorksController failure: Cannot access protected property CodeIgniter\HTTP\IncomingRequest::$uri
INFO - 2026-03-30 13:40:53 --> [REQ_ID=4fac2d4157de] [PERF] Execution time=0.017798
DEBUG - 2026-03-30 13:40:53 --> [REQ_ID=1f9221155118] [REQUEST][START] GET /index.php/Dashboard
DEBUG - 2026-03-30 13:40:53 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-30 13:40:54 --> [REQ_ID=1f9221155118] [FILTER_BEFORE] /index.php/Dashboard
DEBUG - 2026-03-30 13:40:54 --> [REQ_ID=1f9221155118] [ROUTE] Controller=\App\Modules\User\Controllers\DashboardController Method=index
DEBUG - 2026-03-30 13:40:54 --> [REQ_ID=1f9221155118] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Dashboard
DEBUG - 2026-03-30 13:40:54 --> [CSRF] token name=csrf_test_name hash=9ef5cffb5ec5a3fea2d32b2ac0f5f49d
DEBUG - 2026-03-30 13:40:54 --> [REQ_ID=1f9221155118] [REQUEST][END]
INFO - 2026-03-30 13:40:54 --> [REQ_ID=1f9221155118] [PERF] Execution time=0.014530
DEBUG - 2026-03-30 13:40:54 --> [REQ_ID=dad431b02996] [REQUEST][START] GET /index.php/Privacy-Policy
DEBUG - 2026-03-30 13:40:54 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-30 13:40:54 --> [REQ_ID=dad431b02996] [FILTER_BEFORE] /index.php/Privacy-Policy
DEBUG - 2026-03-30 13:40:54 --> [REQ_ID=dad431b02996] [ROUTE] Controller=\App\Controllers\Home Method=privacyPolicy
DEBUG - 2026-03-30 13:40:54 --> [REQ_ID=dad431b02996] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Privacy-Policy
DEBUG - 2026-03-30 13:40:54 --> [CSRF] token name=csrf_test_name hash=8583fd50c005237fe54daab65b024c15
DEBUG - 2026-03-30 13:40:54 --> [REQ_ID=8880fef73a9e] [INIT] App\Controllers\Home::GET
INFO - 2026-03-30 13:40:54 --> [REQ_ID=8880fef73a9e] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-30 13:40:54 --> [TRACE]
INFO - 2026-03-30 13:40:54 --> [REQ_ID=8880fef73a9e] [MEMORY][commonData:start] 4194304
DEBUG - 2026-03-30 13:40:54 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-30 13:40:54 --> [MetaService] slug=privacy-policy pageName= cacheHit= path=DB
DEBUG - 2026-03-30 13:40:54 --> [REQ_ID=8880fef73a9e] [VIEW_RENDER] themes/public/privacyPolicy
INFO - 2026-03-30 13:40:54 --> [REQ_ID=8880fef73a9e] [MEMORY][commonData:start] 8388608
INFO - 2026-03-30 13:40:54 --> themesMemory usage: 8388608
DEBUG - 2026-03-30 13:40:54 --> [MetaService] slug=privacy-policy pageName=Privacy Policy cacheHit= path=DB
DEBUG - 2026-03-30 13:40:54 --> [REQ_ID=dad431b02996] [FILTER_AFTER]
DEBUG - 2026-03-30 13:40:54 --> [REQ_ID=dad431b02996] [LIFECYCLE][END] status=200 duration_ms=552.49 memory_delta=4194304
INFO - 2026-03-30 13:40:54 --> [REQ_ID=8880fef73a9e] [PERF] Execution time=0.552656
DEBUG - 2026-03-30 13:40:54 --> [REQ_ID=dad431b02996] [REQUEST][END]
INFO - 2026-03-30 13:40:54 --> [REQ_ID=dad431b02996] [PERF] Execution time=0.561922
DEBUG - 2026-03-30 13:40:54 --> [REQ_ID=acfe8d51b81e] [REQUEST][START] GET /index.php/
DEBUG - 2026-03-30 13:40:54 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-30 13:40:54 --> [REQ_ID=acfe8d51b81e] [FILTER_BEFORE] /index.php/
DEBUG - 2026-03-30 13:40:54 --> [REQ_ID=acfe8d51b81e] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-30 13:40:54 --> [REQ_ID=acfe8d51b81e] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-30 13:40:54 --> [CSRF] token name=csrf_test_name hash=c6a7ca8a7474d2b51efc46b9d9daa9dc
DEBUG - 2026-03-30 13:40:54 --> [REQ_ID=fe9e6f1c8912] [INIT] App\Controllers\Home::GET
INFO - 2026-03-30 13:40:54 --> [REQ_ID=fe9e6f1c8912] [MEMORY][controller-start] 6291456
DEBUG - 2026-03-30 13:40:54 --> [TRACE]
INFO - 2026-03-30 13:40:54 --> [REQ_ID=fe9e6f1c8912] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-30 13:40:54 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-30 13:40:55 --> [REQ_ID=8cd04979d50a] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-30 13:40:55 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-30 13:40:55 --> [REQ_ID=8cd04979d50a] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-30 13:40:55 --> [REQ_ID=8cd04979d50a] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-30 13:40:55 --> [REQ_ID=8cd04979d50a] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-30 13:40:55 --> [CSRF] token name=csrf_test_name hash=2c20db0ab64651cf5fa010c0e5f36d6a
DEBUG - 2026-03-30 13:40:55 --> [REQ_ID=9cdbf5725b0d] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-30 13:40:55 --> [REQ_ID=9cdbf5725b0d] [MEMORY][controller-start] 6291456
DEBUG - 2026-03-30 13:40:55 --> [TRACE]
DEBUG - 2026-03-30 13:40:55 --> [REQ_ID=8cd04979d50a] [FILTER_AFTER]
DEBUG - 2026-03-30 13:40:55 --> [REQ_ID=8cd04979d50a] [LIFECYCLE][END] status=200 duration_ms=46.43 memory_delta=0
INFO - 2026-03-30 13:40:55 --> [REQ_ID=9cdbf5725b0d] [PERF] Execution time=0.047845
DEBUG - 2026-03-30 13:40:55 --> [REQ_ID=8cd04979d50a] [REQUEST][END]
INFO - 2026-03-30 13:40:55 --> [REQ_ID=8cd04979d50a] [PERF] Execution time=0.086544
DEBUG - 2026-03-30 13:40:55 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
DEBUG - 2026-03-30 13:40:55 --> [REQ_ID=fe9e6f1c8912] [VIEW_RENDER] themes/public/home
INFO - 2026-03-30 13:40:55 --> [REQ_ID=fe9e6f1c8912] [MEMORY][commonData:start] 8388608
INFO - 2026-03-30 13:40:55 --> themesMemory usage: 8388608
DEBUG - 2026-03-30 13:40:55 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-30 13:40:55 --> [REQ_ID=acfe8d51b81e] [FILTER_AFTER]
DEBUG - 2026-03-30 13:40:55 --> [REQ_ID=acfe8d51b81e] [LIFECYCLE][END] status=200 duration_ms=561.17 memory_delta=2097152
INFO - 2026-03-30 13:40:55 --> [REQ_ID=fe9e6f1c8912] [PERF] Execution time=0.561263
DEBUG - 2026-03-30 13:40:55 --> [REQ_ID=acfe8d51b81e] [REQUEST][END]
INFO - 2026-03-30 13:40:55 --> [REQ_ID=acfe8d51b81e] [PERF] Execution time=0.570387
DEBUG - 2026-03-30 13:40:55 --> [REQ_ID=806030e948d1] [REQUEST][START] GET /index.php/How-It-Works/Daily-Financial-News
DEBUG - 2026-03-30 13:40:55 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-30 13:40:55 --> [REQ_ID=806030e948d1] [FILTER_BEFORE] /index.php/How-It-Works/Daily-Financial-News
DEBUG - 2026-03-30 13:40:55 --> [REQ_ID=806030e948d1] [ROUTE] Controller=\App\Modules\Blog\Controllers\HowItWorksController Method=DailyFinancialNews
DEBUG - 2026-03-30 13:40:55 --> [REQ_ID=806030e948d1] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/How-It-Works/Daily-Financial-News
DEBUG - 2026-03-30 13:40:55 --> [CSRF] token name=csrf_test_name hash=ed338e37c4b6d6392a35cac409359b5b
DEBUG - 2026-03-30 13:40:55 --> [REQ_ID=f0cfb5220131] [INIT] App\Modules\Blog\Controllers\HowItWorksController::GET
INFO - 2026-03-30 13:40:55 --> [REQ_ID=f0cfb5220131] [MEMORY][controller-start] 6291456
DEBUG - 2026-03-30 13:40:55 --> [TRACE]
DEBUG - 2026-03-30 13:40:55 --> [REQ_ID=f0cfb5220131] [METHOD_ENTRY] DailyFinancialNews
DEBUG - 2026-03-30 13:40:55 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-30 13:40:55 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-30 13:40:55 --> MyMICoin initialized ONCE
DEBUG - 2026-03-30 13:40:55 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-30 13:40:55 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-30 13:40:55 --> MyMIWallets skipped (no user context)
INFO - 2026-03-30 13:40:55 --> [REQ_ID=f0cfb5220131] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-30 13:40:55 --> [REQ_ID=dc2e16b3e6f5] [REQUEST][START] GET /index.php/How-It-Works/MyMI-Gold
DEBUG - 2026-03-30 13:40:55 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-30 13:40:55 --> [REQ_ID=dc2e16b3e6f5] [FILTER_BEFORE] /index.php/How-It-Works/MyMI-Gold
DEBUG - 2026-03-30 13:40:55 --> [REQ_ID=dc2e16b3e6f5] [ROUTE] Controller=\App\Modules\Blog\Controllers\HowItWorksController Method=MyMIGold
DEBUG - 2026-03-30 13:40:55 --> [REQ_ID=dc2e16b3e6f5] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/How-It-Works/MyMI-Gold
DEBUG - 2026-03-30 13:40:55 --> [CSRF] token name=csrf_test_name hash=bb06a593ff83406b9b1d39cbf995462a
DEBUG - 2026-03-30 13:40:55 --> [REQ_ID=dae74c7a85b7] [INIT] App\Modules\Blog\Controllers\HowItWorksController::GET
INFO - 2026-03-30 13:40:55 --> [REQ_ID=dae74c7a85b7] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-30 13:40:55 --> [TRACE]
DEBUG - 2026-03-30 13:40:55 --> [REQ_ID=dae74c7a85b7] [METHOD_ENTRY] MyMIGold
DEBUG - 2026-03-30 13:40:55 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-30 13:40:55 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-30 13:40:55 --> MyMICoin initialized ONCE
DEBUG - 2026-03-30 13:40:55 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-30 13:40:55 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-30 13:40:55 --> MyMIWallets skipped (no user context)
INFO - 2026-03-30 13:40:55 --> [REQ_ID=dae74c7a85b7] [MEMORY][commonData:start] 6291456
INFO - 2026-03-30 13:40:55 --> themesMemory usage: 8388608
DEBUG - 2026-03-30 13:40:55 --> [MetaService] slug=how-it-works/daily-financial-news pageName= cacheHit= path=DB
DEBUG - 2026-03-30 13:40:55 --> [REQ_ID=806030e948d1] [FILTER_AFTER]
DEBUG - 2026-03-30 13:40:55 --> [REQ_ID=806030e948d1] [LIFECYCLE][END] status=200 duration_ms=569.86 memory_delta=2097152
INFO - 2026-03-30 13:40:55 --> [REQ_ID=f0cfb5220131] [PERF] Execution time=0.570033
DEBUG - 2026-03-30 13:40:55 --> [REQ_ID=806030e948d1] [REQUEST][END]
INFO - 2026-03-30 13:40:55 --> [REQ_ID=806030e948d1] [PERF] Execution time=0.580757
DEBUG - 2026-03-30 13:40:56 --> [REQ_ID=efa0f4c72b72] [REQUEST][START] GET /index.php/How-It-Works/Personal-Budgeting
DEBUG - 2026-03-30 13:40:56 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-30 13:40:56 --> [REQ_ID=efa0f4c72b72] [FILTER_BEFORE] /index.php/How-It-Works/Personal-Budgeting
DEBUG - 2026-03-30 13:40:56 --> [REQ_ID=efa0f4c72b72] [ROUTE] Controller=\App\Modules\Blog\Controllers\HowItWorksController Method=PersonalBudgeting
DEBUG - 2026-03-30 13:40:56 --> [REQ_ID=efa0f4c72b72] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/How-It-Works/Personal-Budgeting
DEBUG - 2026-03-30 13:40:56 --> [CSRF] token name=csrf_test_name hash=6072e879a5e4817b65e2cdc8f8fd6608
DEBUG - 2026-03-30 13:40:56 --> [REQ_ID=00f3dd1c4ce0] [INIT] App\Modules\Blog\Controllers\HowItWorksController::GET
INFO - 2026-03-30 13:40:56 --> [REQ_ID=00f3dd1c4ce0] [MEMORY][controller-start] 6291456
DEBUG - 2026-03-30 13:40:56 --> [TRACE]
DEBUG - 2026-03-30 13:40:56 --> [REQ_ID=00f3dd1c4ce0] [METHOD_ENTRY] PersonalBudgeting
DEBUG - 2026-03-30 13:40:56 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-30 13:40:56 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-30 13:40:56 --> MyMICoin initialized ONCE
DEBUG - 2026-03-30 13:40:56 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-30 13:40:56 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-30 13:40:56 --> MyMIWallets skipped (no user context)
INFO - 2026-03-30 13:40:56 --> [REQ_ID=00f3dd1c4ce0] [MEMORY][commonData:start] 6291456
INFO - 2026-03-30 13:40:56 --> themesMemory usage: 8388608
DEBUG - 2026-03-30 13:40:56 --> [MetaService] slug=how-it-works/mymi-gold pageName= cacheHit= path=DB
DEBUG - 2026-03-30 13:40:56 --> [REQ_ID=dc2e16b3e6f5] [FILTER_AFTER]
DEBUG - 2026-03-30 13:40:56 --> [REQ_ID=dc2e16b3e6f5] [LIFECYCLE][END] status=200 duration_ms=630.97 memory_delta=4194304
INFO - 2026-03-30 13:40:56 --> [REQ_ID=dae74c7a85b7] [PERF] Execution time=0.630729
DEBUG - 2026-03-30 13:40:56 --> [REQ_ID=dc2e16b3e6f5] [REQUEST][END]
INFO - 2026-03-30 13:40:56 --> [REQ_ID=dc2e16b3e6f5] [PERF] Execution time=0.651406
DEBUG - 2026-03-30 13:40:56 --> [REQ_ID=8ed6453a3df4] [REQUEST][START] GET /index.php/How-It-Works/Registering-An-Account
DEBUG - 2026-03-30 13:40:56 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-30 13:40:56 --> [REQ_ID=8ed6453a3df4] [FILTER_BEFORE] /index.php/How-It-Works/Registering-An-Account
DEBUG - 2026-03-30 13:40:56 --> [REQ_ID=8ed6453a3df4] [ROUTE] Controller=\App\Modules\Blog\Controllers\HowItWorksController Method=show
DEBUG - 2026-03-30 13:40:56 --> [REQ_ID=8ed6453a3df4] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/How-It-Works/Registering-An-Account
DEBUG - 2026-03-30 13:40:56 --> [CSRF] token name=csrf_test_name hash=d4f6754de1875e52bf59ae568f2e6561
DEBUG - 2026-03-30 13:40:56 --> [REQ_ID=d7626e06aabb] [INIT] App\Modules\Blog\Controllers\HowItWorksController::GET
INFO - 2026-03-30 13:40:56 --> [REQ_ID=d7626e06aabb] [MEMORY][controller-start] 6291456
DEBUG - 2026-03-30 13:40:56 --> [TRACE]
DEBUG - 2026-03-30 13:40:56 --> [REQ_ID=d7626e06aabb] [METHOD_ENTRY] show
DEBUG - 2026-03-30 13:40:56 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-30 13:40:56 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-30 13:40:56 --> MyMICoin initialized ONCE
DEBUG - 2026-03-30 13:40:56 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-30 13:40:56 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-30 13:40:56 --> MyMIWallets skipped (no user context)
ERROR - 2026-03-30 13:40:56 --> HowItWorksController failure: Cannot access protected property CodeIgniter\HTTP\IncomingRequest::$uri
INFO - 2026-03-30 13:40:56 --> [REQ_ID=d7626e06aabb] [PERF] Execution time=0.021074
DEBUG - 2026-03-30 13:40:56 --> [REQ_ID=1d891290fdc4] [REQUEST][START] GET /index.php/How-It-Works/Setting-Financial-Goals
DEBUG - 2026-03-30 13:40:56 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
INFO - 2026-03-30 13:40:56 --> themesMemory usage: 8388608
DEBUG - 2026-03-30 13:40:56 --> [REQ_ID=1d891290fdc4] [FILTER_BEFORE] /index.php/How-It-Works/Setting-Financial-Goals
DEBUG - 2026-03-30 13:40:56 --> [REQ_ID=1d891290fdc4] [ROUTE] Controller=\App\Modules\Blog\Controllers\HowItWorksController Method=SettingFinancialGoals
DEBUG - 2026-03-30 13:40:56 --> [REQ_ID=1d891290fdc4] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/How-It-Works/Setting-Financial-Goals
DEBUG - 2026-03-30 13:40:56 --> [CSRF] token name=csrf_test_name hash=f7220e53ced5dc47547a6ecfd9aaf725
DEBUG - 2026-03-30 13:40:56 --> [REQ_ID=caccab7f3eed] [INIT] App\Modules\Blog\Controllers\HowItWorksController::GET
INFO - 2026-03-30 13:40:56 --> [REQ_ID=caccab7f3eed] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-30 13:40:56 --> [TRACE]
DEBUG - 2026-03-30 13:40:56 --> [MetaService] slug=how-it-works/personal-budgeting pageName= cacheHit= path=DB
DEBUG - 2026-03-30 13:40:56 --> [REQ_ID=efa0f4c72b72] [FILTER_AFTER]
DEBUG - 2026-03-30 13:40:56 --> [REQ_ID=efa0f4c72b72] [LIFECYCLE][END] status=200 duration_ms=549.91 memory_delta=2097152
INFO - 2026-03-30 13:40:56 --> [REQ_ID=00f3dd1c4ce0] [PERF] Execution time=0.549677
DEBUG - 2026-03-30 13:40:56 --> [REQ_ID=efa0f4c72b72] [REQUEST][END]
INFO - 2026-03-30 13:40:56 --> [REQ_ID=efa0f4c72b72] [PERF] Execution time=0.562656
DEBUG - 2026-03-30 13:40:56 --> [REQ_ID=caccab7f3eed] [METHOD_ENTRY] SettingFinancialGoals
DEBUG - 2026-03-30 13:40:56 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-30 13:40:56 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-30 13:40:56 --> MyMICoin initialized ONCE
DEBUG - 2026-03-30 13:40:56 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-30 13:40:56 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-30 13:40:56 --> MyMIWallets skipped (no user context)
INFO - 2026-03-30 13:40:56 --> [REQ_ID=caccab7f3eed] [MEMORY][commonData:start] 4194304
DEBUG - 2026-03-30 13:40:56 --> [REQ_ID=ead8e0bb97cf] [REQUEST][START] GET /index.php/Exchange/Solana
DEBUG - 2026-03-30 13:40:56 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-30 13:40:56 --> [REQ_ID=ead8e0bb97cf] [FILTER_BEFORE] /index.php/Exchange/Solana
DEBUG - 2026-03-30 13:40:56 --> [REQ_ID=ead8e0bb97cf] [ROUTE] Controller=\App\Modules\Exchange\Controllers\SolanaController Method=index
DEBUG - 2026-03-30 13:40:56 --> [REQ_ID=ead8e0bb97cf] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Exchange/Solana
DEBUG - 2026-03-30 13:40:56 --> [CSRF] token name=csrf_test_name hash=3e5401308129f21aa5084f8073ae1b52
DEBUG - 2026-03-30 13:40:56 --> [REQ_ID=ead8e0bb97cf] [REQUEST][END]
INFO - 2026-03-30 13:40:56 --> [REQ_ID=ead8e0bb97cf] [PERF] Execution time=0.012380
DEBUG - 2026-03-30 13:40:57 --> [REQ_ID=e48c2cf117fc] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-30 13:40:57 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-30 13:40:57 --> [REQ_ID=e48c2cf117fc] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-30 13:40:57 --> [REQ_ID=e48c2cf117fc] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-30 13:40:57 --> [REQ_ID=e48c2cf117fc] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-30 13:40:57 --> [CSRF] token name=csrf_test_name hash=2baa3982c3c3b3381b4a2ad66a512644
DEBUG - 2026-03-30 13:40:57 --> [REQ_ID=a34b67d46538] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-30 13:40:57 --> [REQ_ID=a34b67d46538] [MEMORY][controller-start] 6291456
DEBUG - 2026-03-30 13:40:57 --> [TRACE]
DEBUG - 2026-03-30 13:40:57 --> [REQ_ID=e48c2cf117fc] [FILTER_AFTER]
DEBUG - 2026-03-30 13:40:57 --> [REQ_ID=e48c2cf117fc] [LIFECYCLE][END] status=200 duration_ms=17.46 memory_delta=0
INFO - 2026-03-30 13:40:57 --> [REQ_ID=a34b67d46538] [PERF] Execution time=0.017988
DEBUG - 2026-03-30 13:40:57 --> [REQ_ID=e48c2cf117fc] [REQUEST][END]
INFO - 2026-03-30 13:40:57 --> [REQ_ID=e48c2cf117fc] [PERF] Execution time=0.028470
INFO - 2026-03-30 13:40:57 --> themesMemory usage: 8388608
DEBUG - 2026-03-30 13:40:57 --> [MetaService] slug=how-it-works/setting-financial-goals pageName= cacheHit= path=DB
DEBUG - 2026-03-30 13:40:57 --> [REQ_ID=1d891290fdc4] [FILTER_AFTER]
DEBUG - 2026-03-30 13:40:57 --> [REQ_ID=1d891290fdc4] [LIFECYCLE][END] status=200 duration_ms=539.46 memory_delta=4194304
INFO - 2026-03-30 13:40:57 --> [REQ_ID=caccab7f3eed] [PERF] Execution time=0.539644
DEBUG - 2026-03-30 13:40:57 --> [REQ_ID=1d891290fdc4] [REQUEST][END]
INFO - 2026-03-30 13:40:57 --> [REQ_ID=1d891290fdc4] [PERF] Execution time=0.550523
DEBUG - 2026-03-30 13:40:58 --> [REQ_ID=21a2e155247f] [REQUEST][START] GET /index.php/My-Referrals
DEBUG - 2026-03-30 13:40:58 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-30 13:40:58 --> [REQ_ID=21a2e155247f] [FILTER_BEFORE] /index.php/My-Referrals
DEBUG - 2026-03-30 13:40:58 --> [REQ_ID=21a2e155247f] [ROUTE] Controller=\App\Modules\User\Controllers\ReferralController Method=index
DEBUG - 2026-03-30 13:40:58 --> [REQ_ID=21a2e155247f] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/My-Referrals
DEBUG - 2026-03-30 13:40:58 --> [CSRF] token name=csrf_test_name hash=204d9139e4e6de977fce5d7583bdeeae
DEBUG - 2026-03-30 13:40:58 --> [REQ_ID=21a2e155247f] [REQUEST][END]
INFO - 2026-03-30 13:40:58 --> [REQ_ID=21a2e155247f] [PERF] Execution time=0.014228
DEBUG - 2026-03-30 13:40:59 --> [REQ_ID=0e40deb54d49] [REQUEST][START] GET /index.php/Management/Assets
DEBUG - 2026-03-30 13:40:59 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-30 13:40:59 --> [REQ_ID=8334bf2caa37] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-30 13:40:59 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-30 13:40:59 --> [REQ_ID=0e40deb54d49] [FILTER_BEFORE] /index.php/Management/Assets
DEBUG - 2026-03-30 13:40:59 --> [REQ_ID=0e40deb54d49] [ROUTE] Controller=\App\Modules\Management\Controllers\AssetsAdminController Method=index
DEBUG - 2026-03-30 13:40:59 --> [REQ_ID=0e40deb54d49] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Management/Assets
DEBUG - 2026-03-30 13:40:59 --> [CSRF] token name=csrf_test_name hash=c3a9b0d8ceb548ebacd938de7c15ae4c
DEBUG - 2026-03-30 13:40:59 --> [REQ_ID=0e40deb54d49] [REQUEST][END]
INFO - 2026-03-30 13:40:59 --> [REQ_ID=0e40deb54d49] [PERF] Execution time=0.016633
DEBUG - 2026-03-30 13:40:59 --> [REQ_ID=8334bf2caa37] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-30 13:40:59 --> [REQ_ID=8334bf2caa37] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-30 13:40:59 --> [REQ_ID=8334bf2caa37] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-30 13:40:59 --> [CSRF] token name=csrf_test_name hash=f4e2401cd42fcb66a4dfa96eb5014146
DEBUG - 2026-03-30 13:40:59 --> [REQ_ID=859c25c541a4] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-30 13:40:59 --> [REQ_ID=859c25c541a4] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-30 13:40:59 --> [TRACE]
DEBUG - 2026-03-30 13:40:59 --> [REQ_ID=8334bf2caa37] [FILTER_AFTER]
DEBUG - 2026-03-30 13:40:59 --> [REQ_ID=8334bf2caa37] [LIFECYCLE][END] status=200 duration_ms=17.72 memory_delta=0
INFO - 2026-03-30 13:40:59 --> [REQ_ID=859c25c541a4] [PERF] Execution time=0.017496
DEBUG - 2026-03-30 13:40:59 --> [REQ_ID=8334bf2caa37] [REQUEST][END]
INFO - 2026-03-30 13:40:59 --> [REQ_ID=8334bf2caa37] [PERF] Execution time=0.033036
DEBUG - 2026-03-30 13:40:59 --> [REQ_ID=d93b1dd367de] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-30 13:40:59 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-30 13:40:59 --> [REQ_ID=d93b1dd367de] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-30 13:40:59 --> [REQ_ID=d93b1dd367de] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-30 13:40:59 --> [REQ_ID=d93b1dd367de] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-30 13:40:59 --> [CSRF] token name=csrf_test_name hash=2e4c27e932e097159c41132e4c524367
DEBUG - 2026-03-30 13:40:59 --> [REQ_ID=08c68cd2f330] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-30 13:40:59 --> [REQ_ID=08c68cd2f330] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-30 13:40:59 --> [TRACE]
DEBUG - 2026-03-30 13:40:59 --> [REQ_ID=d93b1dd367de] [FILTER_AFTER]
DEBUG - 2026-03-30 13:40:59 --> [REQ_ID=d93b1dd367de] [LIFECYCLE][END] status=200 duration_ms=16.22 memory_delta=0
INFO - 2026-03-30 13:40:59 --> [REQ_ID=08c68cd2f330] [PERF] Execution time=0.016779
DEBUG - 2026-03-30 13:40:59 --> [REQ_ID=d93b1dd367de] [REQUEST][END]
INFO - 2026-03-30 13:40:59 --> [REQ_ID=d93b1dd367de] [PERF] Execution time=0.025381
DEBUG - 2026-03-30 13:40:59 --> [REQ_ID=1d4f33c435db] [REQUEST][START] GET /index.php/Purchase/MyMIGold
DEBUG - 2026-03-30 13:40:59 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-30 13:40:59 --> [REQ_ID=1d4f33c435db] [FILTER_BEFORE] /index.php/Purchase/MyMIGold
DEBUG - 2026-03-30 13:40:59 --> [REQ_ID=1d4f33c435db] [ROUTE] Controller=closure_route Method=index
DEBUG - 2026-03-30 13:40:59 --> [REQ_ID=1d4f33c435db] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Purchase/MyMIGold
DEBUG - 2026-03-30 13:40:59 --> [CSRF] token name=csrf_test_name hash=670d55b93c56796f8e848953e2435253
DEBUG - 2026-03-30 13:40:59 --> [REQ_ID=1d4f33c435db] [REQUEST][END]
INFO - 2026-03-30 13:40:59 --> [REQ_ID=1d4f33c435db] [PERF] Execution time=0.009395
DEBUG - 2026-03-30 13:40:59 --> [REQ_ID=075c5f021856] [REQUEST][START] GET /index.php/Investments
DEBUG - 2026-03-30 13:40:59 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-30 13:40:59 --> [REQ_ID=c1b60ca0fc3f] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-30 13:40:59 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-30 13:40:59 --> [REQ_ID=075c5f021856] [FILTER_BEFORE] /index.php/Investments
DEBUG - 2026-03-30 13:40:59 --> [REQ_ID=075c5f021856] [ROUTE] Controller=\App\Modules\User\Controllers\InvestmentsController Method=index
DEBUG - 2026-03-30 13:40:59 --> [REQ_ID=075c5f021856] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Investments
DEBUG - 2026-03-30 13:40:59 --> [CSRF] token name=csrf_test_name hash=044c752ff014f3099f79ec6c4603f427
DEBUG - 2026-03-30 13:40:59 --> [REQ_ID=075c5f021856] [REQUEST][END]
INFO - 2026-03-30 13:40:59 --> [REQ_ID=075c5f021856] [PERF] Execution time=0.015488
DEBUG - 2026-03-30 13:40:59 --> [REQ_ID=c1b60ca0fc3f] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-30 13:40:59 --> [REQ_ID=c1b60ca0fc3f] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-30 13:40:59 --> [REQ_ID=c1b60ca0fc3f] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-30 13:40:59 --> [CSRF] token name=csrf_test_name hash=1a18ab1b2df7986cfa14d09ef95eb1d0
DEBUG - 2026-03-30 13:40:59 --> [REQ_ID=9c3ddad99a8e] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-30 13:40:59 --> [REQ_ID=9c3ddad99a8e] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-30 13:40:59 --> [TRACE]
DEBUG - 2026-03-30 13:40:59 --> [REQ_ID=c1b60ca0fc3f] [FILTER_AFTER]
DEBUG - 2026-03-30 13:40:59 --> [REQ_ID=c1b60ca0fc3f] [LIFECYCLE][END] status=200 duration_ms=19.12 memory_delta=0
INFO - 2026-03-30 13:40:59 --> [REQ_ID=9c3ddad99a8e] [PERF] Execution time=0.019080
DEBUG - 2026-03-30 13:40:59 --> [REQ_ID=c1b60ca0fc3f] [REQUEST][END]
INFO - 2026-03-30 13:40:59 --> [REQ_ID=c1b60ca0fc3f] [PERF] Execution time=0.031353
DEBUG - 2026-03-30 13:40:59 --> [REQ_ID=28a46dfa6343] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-30 13:40:59 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-30 13:40:59 --> [REQ_ID=28a46dfa6343] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-30 13:40:59 --> [REQ_ID=28a46dfa6343] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-30 13:40:59 --> [REQ_ID=28a46dfa6343] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-30 13:40:59 --> [CSRF] token name=csrf_test_name hash=042a8e22b74c5766717b4883861c4346
DEBUG - 2026-03-30 13:40:59 --> [REQ_ID=d8f89e5e7002] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-30 13:40:59 --> [REQ_ID=d8f89e5e7002] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-30 13:40:59 --> [TRACE]
DEBUG - 2026-03-30 13:40:59 --> [REQ_ID=28a46dfa6343] [FILTER_AFTER]
DEBUG - 2026-03-30 13:40:59 --> [REQ_ID=28a46dfa6343] [LIFECYCLE][END] status=200 duration_ms=17.82 memory_delta=0
INFO - 2026-03-30 13:40:59 --> [REQ_ID=d8f89e5e7002] [PERF] Execution time=0.018008
DEBUG - 2026-03-30 13:40:59 --> [REQ_ID=28a46dfa6343] [REQUEST][END]
INFO - 2026-03-30 13:40:59 --> [REQ_ID=28a46dfa6343] [PERF] Execution time=0.026971
DEBUG - 2026-03-30 13:40:59 --> [REQ_ID=8ac34e6853a0] [REQUEST][START] GET /index.php/Alerts
DEBUG - 2026-03-30 13:40:59 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-30 13:40:59 --> [REQ_ID=8ac34e6853a0] [FILTER_BEFORE] /index.php/Alerts
DEBUG - 2026-03-30 13:40:59 --> [REQ_ID=8ac34e6853a0] [ROUTE] Controller=\App\Modules\User\Controllers\AlertsController Method=index
DEBUG - 2026-03-30 13:40:59 --> [REQ_ID=8ac34e6853a0] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Alerts
DEBUG - 2026-03-30 13:40:59 --> [CSRF] token name=csrf_test_name hash=6178b451c7eddbeaa66553febdb2494f
DEBUG - 2026-03-30 13:40:59 --> [REQ_ID=8ac34e6853a0] [REQUEST][END]
INFO - 2026-03-30 13:40:59 --> [REQ_ID=8ac34e6853a0] [PERF] Execution time=0.011063
DEBUG - 2026-03-30 13:40:59 --> [REQ_ID=bdfe190af41e] [REQUEST][START] GET /index.php/Wallets
DEBUG - 2026-03-30 13:40:59 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-30 13:40:59 --> [REQ_ID=bdfe190af41e] [FILTER_BEFORE] /index.php/Wallets
DEBUG - 2026-03-30 13:40:59 --> [REQ_ID=bdfe190af41e] [ROUTE] Controller=\App\Modules\User\Controllers\WalletsController Method=index
DEBUG - 2026-03-30 13:40:59 --> [REQ_ID=bdfe190af41e] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Wallets
DEBUG - 2026-03-30 13:40:59 --> [CSRF] token name=csrf_test_name hash=3d90ad4eb019c1310d1c0b801c2f8659
DEBUG - 2026-03-30 13:40:59 --> [REQ_ID=bdfe190af41e] [REQUEST][END]
INFO - 2026-03-30 13:40:59 --> [REQ_ID=bdfe190af41e] [PERF] Execution time=0.013889
DEBUG - 2026-03-30 13:40:59 --> [REQ_ID=33d19ef77cdf] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-30 13:40:59 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-30 13:40:59 --> [REQ_ID=33d19ef77cdf] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-30 13:40:59 --> [REQ_ID=33d19ef77cdf] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-30 13:40:59 --> [REQ_ID=33d19ef77cdf] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-30 13:40:59 --> [CSRF] token name=csrf_test_name hash=81dde9dc7171e7f31c705b1997b2f384
DEBUG - 2026-03-30 13:40:59 --> [REQ_ID=87e11f5bc90f] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-30 13:40:59 --> [REQ_ID=87e11f5bc90f] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-30 13:40:59 --> [TRACE]
DEBUG - 2026-03-30 13:40:59 --> [REQ_ID=33d19ef77cdf] [FILTER_AFTER]
DEBUG - 2026-03-30 13:40:59 --> [REQ_ID=33d19ef77cdf] [LIFECYCLE][END] status=200 duration_ms=18.30 memory_delta=0
INFO - 2026-03-30 13:40:59 --> [REQ_ID=87e11f5bc90f] [PERF] Execution time=0.018332
DEBUG - 2026-03-30 13:40:59 --> [REQ_ID=33d19ef77cdf] [REQUEST][END]
INFO - 2026-03-30 13:40:59 --> [REQ_ID=33d19ef77cdf] [PERF] Execution time=0.026897
DEBUG - 2026-03-30 13:40:59 --> [REQ_ID=0c46121b888a] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-30 13:40:59 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-30 13:40:59 --> [REQ_ID=0c46121b888a] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-30 13:40:59 --> [REQ_ID=0c46121b888a] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-30 13:40:59 --> [REQ_ID=0c46121b888a] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-30 13:40:59 --> [CSRF] token name=csrf_test_name hash=ccc438f1ceb519de7108737a33031c0b
DEBUG - 2026-03-30 13:40:59 --> [REQ_ID=7e0b74571213] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-30 13:40:59 --> [REQ_ID=7e0b74571213] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-30 13:40:59 --> [TRACE]
DEBUG - 2026-03-30 13:40:59 --> [REQ_ID=0c46121b888a] [FILTER_AFTER]
DEBUG - 2026-03-30 13:40:59 --> [REQ_ID=0c46121b888a] [LIFECYCLE][END] status=200 duration_ms=17.52 memory_delta=0
INFO - 2026-03-30 13:40:59 --> [REQ_ID=7e0b74571213] [PERF] Execution time=0.017612
DEBUG - 2026-03-30 13:40:59 --> [REQ_ID=0c46121b888a] [REQUEST][END]
INFO - 2026-03-30 13:40:59 --> [REQ_ID=0c46121b888a] [PERF] Execution time=0.029601
DEBUG - 2026-03-30 13:40:59 --> [REQ_ID=93734cd4f2f3] [REQUEST][START] GET /index.php/Wallets/Purchase/Memberships
DEBUG - 2026-03-30 13:40:59 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-30 13:40:59 --> [REQ_ID=93734cd4f2f3] [FILTER_BEFORE] /index.php/Wallets/Purchase/Memberships
DEBUG - 2026-03-30 13:40:59 --> [REQ_ID=93734cd4f2f3] [ROUTE] Controller=\App\Modules\User\Controllers\WalletsController Method=purchase
DEBUG - 2026-03-30 13:40:59 --> [REQ_ID=93734cd4f2f3] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Wallets/Purchase/Memberships
DEBUG - 2026-03-30 13:40:59 --> [CSRF] token name=csrf_test_name hash=116dc0a150c596134fc1c2c5092f9fe3
DEBUG - 2026-03-30 13:40:59 --> [REQ_ID=93734cd4f2f3] [REQUEST][END]
INFO - 2026-03-30 13:40:59 --> [REQ_ID=93734cd4f2f3] [PERF] Execution time=0.013181
DEBUG - 2026-03-30 13:40:59 --> [REQ_ID=29bfd0ed80e0] [REQUEST][START] GET /index.php/Account/Billing
DEBUG - 2026-03-30 13:40:59 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-30 13:40:59 --> [REQ_ID=29bfd0ed80e0] [FILTER_BEFORE] /index.php/Account/Billing
DEBUG - 2026-03-30 13:40:59 --> [REQ_ID=29bfd0ed80e0] [ROUTE] Controller=\App\Modules\User\Controllers\DashboardController Method=billing
DEBUG - 2026-03-30 13:40:59 --> [REQ_ID=29bfd0ed80e0] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Account/Billing
DEBUG - 2026-03-30 13:40:59 --> [CSRF] token name=csrf_test_name hash=353a1f41969d95e4ebe35b7dbc3dd3f8
DEBUG - 2026-03-30 13:40:59 --> [REQ_ID=29bfd0ed80e0] [REQUEST][END]
INFO - 2026-03-30 13:40:59 --> [REQ_ID=29bfd0ed80e0] [PERF] Execution time=0.009839
DEBUG - 2026-03-30 13:40:59 --> [REQ_ID=44202d9a337c] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-30 13:40:59 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-30 13:40:59 --> [REQ_ID=44202d9a337c] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-30 13:40:59 --> [REQ_ID=44202d9a337c] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-30 13:40:59 --> [REQ_ID=44202d9a337c] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-30 13:40:59 --> [CSRF] token name=csrf_test_name hash=c5ac280e8f74a3d8fddc85886a6519db
DEBUG - 2026-03-30 13:40:59 --> [REQ_ID=3c3066674acf] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-30 13:40:59 --> [REQ_ID=3c3066674acf] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-30 13:40:59 --> [TRACE]
DEBUG - 2026-03-30 13:40:59 --> [REQ_ID=086a494d46b2] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-30 13:40:59 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-30 13:40:59 --> [REQ_ID=44202d9a337c] [FILTER_AFTER]
DEBUG - 2026-03-30 13:40:59 --> [REQ_ID=44202d9a337c] [LIFECYCLE][END] status=200 duration_ms=15.40 memory_delta=0
INFO - 2026-03-30 13:40:59 --> [REQ_ID=3c3066674acf] [PERF] Execution time=0.015551
DEBUG - 2026-03-30 13:40:59 --> [REQ_ID=44202d9a337c] [REQUEST][END]
INFO - 2026-03-30 13:40:59 --> [REQ_ID=44202d9a337c] [PERF] Execution time=0.024075
DEBUG - 2026-03-30 13:40:59 --> [REQ_ID=086a494d46b2] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-30 13:40:59 --> [REQ_ID=086a494d46b2] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-30 13:40:59 --> [REQ_ID=086a494d46b2] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-30 13:40:59 --> [CSRF] token name=csrf_test_name hash=17414a7f47fc9f1ae321fc0dbb187db2
DEBUG - 2026-03-30 13:40:59 --> [REQ_ID=6d1a4ded2e0b] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-30 13:40:59 --> [REQ_ID=6d1a4ded2e0b] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-30 13:40:59 --> [TRACE]
DEBUG - 2026-03-30 13:41:00 --> [REQ_ID=086a494d46b2] [FILTER_AFTER]
DEBUG - 2026-03-30 13:41:00 --> [REQ_ID=086a494d46b2] [LIFECYCLE][END] status=200 duration_ms=14.45 memory_delta=0
INFO - 2026-03-30 13:41:00 --> [REQ_ID=6d1a4ded2e0b] [PERF] Execution time=0.014498
DEBUG - 2026-03-30 13:41:00 --> [REQ_ID=086a494d46b2] [REQUEST][END]
INFO - 2026-03-30 13:41:00 --> [REQ_ID=086a494d46b2] [PERF] Execution time=0.024718
DEBUG - 2026-03-30 13:41:00 --> [REQ_ID=b526f0c2f580] [REQUEST][START] GET /index.php/Account/Security
DEBUG - 2026-03-30 13:41:00 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-30 13:41:00 --> [REQ_ID=b526f0c2f580] [FILTER_BEFORE] /index.php/Account/Security
DEBUG - 2026-03-30 13:41:00 --> [REQ_ID=b526f0c2f580] [ROUTE] Controller=\App\Modules\User\Controllers\DashboardController Method=Security
DEBUG - 2026-03-30 13:41:00 --> [REQ_ID=b526f0c2f580] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Account/Security
DEBUG - 2026-03-30 13:41:00 --> [CSRF] token name=csrf_test_name hash=df7e580d8a93523ec8cbbe84a4a7b372
DEBUG - 2026-03-30 13:41:00 --> [REQ_ID=b526f0c2f580] [REQUEST][END]
INFO - 2026-03-30 13:41:00 --> [REQ_ID=b526f0c2f580] [PERF] Execution time=0.013017
DEBUG - 2026-03-30 13:41:00 --> [REQ_ID=d966e9728a21] [REQUEST][START] GET /index.php/Management/Budgeting
DEBUG - 2026-03-30 13:41:00 --> [REQ_ID=d6dbf7632930] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-30 13:41:00 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-30 13:41:00 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-30 13:41:00 --> [REQ_ID=d966e9728a21] [FILTER_BEFORE] /index.php/Management/Budgeting
DEBUG - 2026-03-30 13:41:00 --> [REQ_ID=d966e9728a21] [ROUTE] Controller=\App\Modules\Management\Controllers\BudgetingAdminController Method=index
DEBUG - 2026-03-30 13:41:00 --> [REQ_ID=d966e9728a21] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Management/Budgeting
DEBUG - 2026-03-30 13:41:00 --> [CSRF] token name=csrf_test_name hash=b6178131a0a00a479a2b0f1b52ce58b1
DEBUG - 2026-03-30 13:41:00 --> [REQ_ID=d966e9728a21] [REQUEST][END]
INFO - 2026-03-30 13:41:00 --> [REQ_ID=d966e9728a21] [PERF] Execution time=0.017256
DEBUG - 2026-03-30 13:41:00 --> [REQ_ID=d6dbf7632930] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-30 13:41:00 --> [REQ_ID=d6dbf7632930] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-30 13:41:00 --> [REQ_ID=d6dbf7632930] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-30 13:41:00 --> [CSRF] token name=csrf_test_name hash=6215a433c44d76995af6d9dbf06b93dd
DEBUG - 2026-03-30 13:41:00 --> [REQ_ID=9dc0142af3e0] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-30 13:41:00 --> [REQ_ID=9dc0142af3e0] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-30 13:41:00 --> [TRACE]
DEBUG - 2026-03-30 13:41:00 --> [REQ_ID=d6dbf7632930] [FILTER_AFTER]
DEBUG - 2026-03-30 13:41:00 --> [REQ_ID=d6dbf7632930] [LIFECYCLE][END] status=200 duration_ms=14.36 memory_delta=0
INFO - 2026-03-30 13:41:00 --> [REQ_ID=9dc0142af3e0] [PERF] Execution time=0.014728
DEBUG - 2026-03-30 13:41:00 --> [REQ_ID=d6dbf7632930] [REQUEST][END]
INFO - 2026-03-30 13:41:00 --> [REQ_ID=d6dbf7632930] [PERF] Execution time=0.035522
DEBUG - 2026-03-30 13:41:00 --> [REQ_ID=dbb169c807f8] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-30 13:41:00 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-30 13:41:00 --> [REQ_ID=dbb169c807f8] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-30 13:41:00 --> [REQ_ID=dbb169c807f8] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-30 13:41:00 --> [REQ_ID=dbb169c807f8] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-30 13:41:00 --> [CSRF] token name=csrf_test_name hash=f082f1406cae0c3b023e641b8096f106
DEBUG - 2026-03-30 13:41:00 --> [REQ_ID=bd61ae8e37da] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-30 13:41:00 --> [REQ_ID=bd61ae8e37da] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-30 13:41:00 --> [TRACE]
DEBUG - 2026-03-30 13:41:00 --> [REQ_ID=dbb169c807f8] [FILTER_AFTER]
DEBUG - 2026-03-30 13:41:00 --> [REQ_ID=dbb169c807f8] [LIFECYCLE][END] status=200 duration_ms=14.19 memory_delta=0
INFO - 2026-03-30 13:41:00 --> [REQ_ID=bd61ae8e37da] [PERF] Execution time=0.014447
DEBUG - 2026-03-30 13:41:00 --> [REQ_ID=dbb169c807f8] [REQUEST][END]
INFO - 2026-03-30 13:41:00 --> [REQ_ID=dbb169c807f8] [PERF] Execution time=0.023374
DEBUG - 2026-03-30 13:41:00 --> [REQ_ID=0722d67a1784] [REQUEST][START] GET /index.php/MyMI-Gold/Goals/Daily
DEBUG - 2026-03-30 13:41:00 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-30 13:41:00 --> [REQ_ID=0722d67a1784] [FILTER_BEFORE] /index.php/MyMI-Gold/Goals/Daily
DEBUG - 2026-03-30 13:41:00 --> [REQ_ID=0722d67a1784] [ROUTE] Controller=\App\Modules\User\Controllers\DashboardController Method=goals
DEBUG - 2026-03-30 13:41:00 --> [REQ_ID=0722d67a1784] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/MyMI-Gold/Goals/Daily
DEBUG - 2026-03-30 13:41:00 --> [CSRF] token name=csrf_test_name hash=0a3dd703c6b323c995d52872dc570e39
DEBUG - 2026-03-30 13:41:00 --> [REQ_ID=0722d67a1784] [REQUEST][END]
INFO - 2026-03-30 13:41:00 --> [REQ_ID=0722d67a1784] [PERF] Execution time=0.009441
DEBUG - 2026-03-30 13:41:00 --> [REQ_ID=446331563ea5] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-30 13:41:00 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-30 13:41:00 --> [REQ_ID=e790cce25f74] [REQUEST][START] GET /index.php/Management/Alerts
DEBUG - 2026-03-30 13:41:00 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-30 13:41:00 --> [REQ_ID=446331563ea5] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-30 13:41:00 --> [REQ_ID=446331563ea5] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-30 13:41:00 --> [REQ_ID=446331563ea5] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-30 13:41:00 --> [CSRF] token name=csrf_test_name hash=0b6a00c807785369121bfb92b3cb18de
DEBUG - 2026-03-30 13:41:00 --> [REQ_ID=7a43d2842ea5] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-30 13:41:00 --> [REQ_ID=7a43d2842ea5] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-30 13:41:00 --> [TRACE]
DEBUG - 2026-03-30 13:41:00 --> [REQ_ID=e790cce25f74] [FILTER_BEFORE] /index.php/Management/Alerts
DEBUG - 2026-03-30 13:41:00 --> [REQ_ID=e790cce25f74] [ROUTE] Controller=\App\Modules\Management\Controllers\AlertsAdminController Method=index
DEBUG - 2026-03-30 13:41:00 --> [REQ_ID=e790cce25f74] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Management/Alerts
DEBUG - 2026-03-30 13:41:00 --> [CSRF] token name=csrf_test_name hash=eb74c615a0de79ff4eca412ec7e88bc1
DEBUG - 2026-03-30 13:41:00 --> [REQ_ID=e790cce25f74] [REQUEST][END]
INFO - 2026-03-30 13:41:00 --> [REQ_ID=e790cce25f74] [PERF] Execution time=0.015279
DEBUG - 2026-03-30 13:41:00 --> [REQ_ID=446331563ea5] [FILTER_AFTER]
DEBUG - 2026-03-30 13:41:00 --> [REQ_ID=446331563ea5] [LIFECYCLE][END] status=200 duration_ms=15.43 memory_delta=0
INFO - 2026-03-30 13:41:00 --> [REQ_ID=7a43d2842ea5] [PERF] Execution time=0.015443
DEBUG - 2026-03-30 13:41:00 --> [REQ_ID=446331563ea5] [REQUEST][END]
INFO - 2026-03-30 13:41:00 --> [REQ_ID=446331563ea5] [PERF] Execution time=0.026880
DEBUG - 2026-03-30 13:41:00 --> [REQ_ID=9ea563aebadb] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-30 13:41:00 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-30 13:41:00 --> [REQ_ID=9ea563aebadb] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-30 13:41:00 --> [REQ_ID=9ea563aebadb] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-30 13:41:00 --> [REQ_ID=9ea563aebadb] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-30 13:41:00 --> [CSRF] token name=csrf_test_name hash=4f5e88e6668652867945b2a687359979
DEBUG - 2026-03-30 13:41:00 --> [REQ_ID=dfcf51193e5a] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-30 13:41:00 --> [REQ_ID=dfcf51193e5a] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-30 13:41:00 --> [TRACE]
DEBUG - 2026-03-30 13:41:00 --> [REQ_ID=9ea563aebadb] [FILTER_AFTER]
DEBUG - 2026-03-30 13:41:00 --> [REQ_ID=9ea563aebadb] [LIFECYCLE][END] status=200 duration_ms=16.63 memory_delta=0
INFO - 2026-03-30 13:41:00 --> [REQ_ID=dfcf51193e5a] [PERF] Execution time=0.016769
DEBUG - 2026-03-30 13:41:00 --> [REQ_ID=9ea563aebadb] [REQUEST][END]
INFO - 2026-03-30 13:41:00 --> [REQ_ID=9ea563aebadb] [PERF] Execution time=0.025984
DEBUG - 2026-03-30 13:41:00 --> [REQ_ID=c55c7975688b] [REQUEST][START] GET /index.php/Account
DEBUG - 2026-03-30 13:41:00 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-30 13:41:00 --> [REQ_ID=c55c7975688b] [FILTER_BEFORE] /index.php/Account
DEBUG - 2026-03-30 13:41:00 --> [REQ_ID=c55c7975688b] [ROUTE] Controller=\App\Modules\User\Controllers\DashboardController Method=account
DEBUG - 2026-03-30 13:41:00 --> [REQ_ID=c55c7975688b] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Account
DEBUG - 2026-03-30 13:41:00 --> [CSRF] token name=csrf_test_name hash=dad618c693afe27f3f3b0651028d8e8c
DEBUG - 2026-03-30 13:41:00 --> [REQ_ID=c55c7975688b] [REQUEST][END]
INFO - 2026-03-30 13:41:00 --> [REQ_ID=c55c7975688b] [PERF] Execution time=0.009197
DEBUG - 2026-03-30 13:41:00 --> [REQ_ID=6638d4d98cc5] [REQUEST][START] GET /index.php/Exchange
DEBUG - 2026-03-30 13:41:00 --> [REQ_ID=cef84f4bc2b1] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-30 13:41:00 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-30 13:41:00 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-30 13:41:00 --> [REQ_ID=cef84f4bc2b1] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-30 13:41:00 --> [REQ_ID=cef84f4bc2b1] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-30 13:41:00 --> [REQ_ID=cef84f4bc2b1] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-30 13:41:00 --> [CSRF] token name=csrf_test_name hash=2e012eaa3c66fb9a02710a1d44683ec2
DEBUG - 2026-03-30 13:41:00 --> [REQ_ID=37c4c3318b37] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-30 13:41:00 --> [REQ_ID=37c4c3318b37] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-30 13:41:00 --> [TRACE]
DEBUG - 2026-03-30 13:41:00 --> [REQ_ID=6638d4d98cc5] [FILTER_BEFORE] /index.php/Exchange
DEBUG - 2026-03-30 13:41:00 --> [REQ_ID=6638d4d98cc5] [ROUTE] Controller=\App\Modules\Exchange\Controllers\ExchangeController Method=index
DEBUG - 2026-03-30 13:41:00 --> [REQ_ID=6638d4d98cc5] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Exchange
DEBUG - 2026-03-30 13:41:00 --> [CSRF] token name=csrf_test_name hash=b2defddee5335f9cc2c751bc3907b62f
DEBUG - 2026-03-30 13:41:00 --> [REQ_ID=6638d4d98cc5] [REQUEST][END]
INFO - 2026-03-30 13:41:00 --> [REQ_ID=6638d4d98cc5] [PERF] Execution time=0.019075
DEBUG - 2026-03-30 13:41:00 --> [REQ_ID=cef84f4bc2b1] [FILTER_AFTER]
DEBUG - 2026-03-30 13:41:00 --> [REQ_ID=cef84f4bc2b1] [LIFECYCLE][END] status=200 duration_ms=16.93 memory_delta=0
INFO - 2026-03-30 13:41:00 --> [REQ_ID=37c4c3318b37] [PERF] Execution time=0.016733
DEBUG - 2026-03-30 13:41:00 --> [REQ_ID=cef84f4bc2b1] [REQUEST][END]
INFO - 2026-03-30 13:41:00 --> [REQ_ID=cef84f4bc2b1] [PERF] Execution time=0.033613
DEBUG - 2026-03-30 13:41:00 --> [REQ_ID=dd03a852a7ca] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-30 13:41:00 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-30 13:41:00 --> [REQ_ID=dd03a852a7ca] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-30 13:41:00 --> [REQ_ID=dd03a852a7ca] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-30 13:41:00 --> [REQ_ID=dd03a852a7ca] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-30 13:41:00 --> [CSRF] token name=csrf_test_name hash=1a38c6f8e91d1ff088a91d1161525b37
DEBUG - 2026-03-30 13:41:00 --> [REQ_ID=d658ad444637] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-30 13:41:00 --> [REQ_ID=d658ad444637] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-30 13:41:00 --> [TRACE]
DEBUG - 2026-03-30 13:41:00 --> [REQ_ID=dd03a852a7ca] [FILTER_AFTER]
DEBUG - 2026-03-30 13:41:00 --> [REQ_ID=dd03a852a7ca] [LIFECYCLE][END] status=200 duration_ms=16.09 memory_delta=0
INFO - 2026-03-30 13:41:00 --> [REQ_ID=d658ad444637] [PERF] Execution time=0.016455
DEBUG - 2026-03-30 13:41:00 --> [REQ_ID=dd03a852a7ca] [REQUEST][END]
INFO - 2026-03-30 13:41:00 --> [REQ_ID=dd03a852a7ca] [PERF] Execution time=0.025069
DEBUG - 2026-03-30 13:41:01 --> [REQ_ID=3dd5df17ab77] [REQUEST][START] GET /index.php/register
DEBUG - 2026-03-30 13:41:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-30 13:41:01 --> [REQ_ID=3dd5df17ab77] [FILTER_BEFORE] /index.php/register
DEBUG - 2026-03-30 13:41:01 --> [REQ_ID=3dd5df17ab77] [ROUTE] Controller=\App\Controllers\AuthController Method=register
DEBUG - 2026-03-30 13:41:01 --> [REQ_ID=3dd5df17ab77] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/register
DEBUG - 2026-03-30 13:41:01 --> [CSRF] token name=csrf_test_name hash=917596eb0a96bb1c360e9e26ba591591
DEBUG - 2026-03-30 13:41:01 --> [REQ_ID=1aec6a3e91fc] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-30 13:41:01 --> [REQ_ID=1aec6a3e91fc] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-30 13:41:01 --> [TRACE]
INFO - 2026-03-30 13:41:01 --> [REGISTRATION] Form loaded
INFO - 2026-03-30 13:41:01 --> [REQ_ID=1aec6a3e91fc] [PERF] Execution time=0.014705
DEBUG - 2026-03-30 13:41:01 --> [REQ_ID=ead573b7dbda] [REQUEST][START] GET /index.php/Account/Social-Media
DEBUG - 2026-03-30 13:41:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-30 13:41:01 --> [REQ_ID=ead573b7dbda] [FILTER_BEFORE] /index.php/Account/Social-Media
DEBUG - 2026-03-30 13:41:01 --> [REQ_ID=ead573b7dbda] [ROUTE] Controller=\App\Modules\User\Controllers\DashboardController Method=SocialMedia
DEBUG - 2026-03-30 13:41:01 --> [REQ_ID=ead573b7dbda] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Account/Social-Media
DEBUG - 2026-03-30 13:41:01 --> [CSRF] token name=csrf_test_name hash=2670d9830a29b7d1f9b78d2239b525e6
DEBUG - 2026-03-30 13:41:01 --> [REQ_ID=ead573b7dbda] [REQUEST][END]
INFO - 2026-03-30 13:41:01 --> [REQ_ID=ead573b7dbda] [PERF] Execution time=0.009312
DEBUG - 2026-03-30 13:41:01 --> [REQ_ID=a7da875598b7] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-30 13:41:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-30 13:41:01 --> [REQ_ID=a7da875598b7] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-30 13:41:01 --> [REQ_ID=a7da875598b7] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-30 13:41:01 --> [REQ_ID=a7da875598b7] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-30 13:41:01 --> [CSRF] token name=csrf_test_name hash=9ed5039eda0af12ec5d9d2bc87394c85
DEBUG - 2026-03-30 13:41:01 --> [REQ_ID=569b8178f2b5] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-30 13:41:01 --> [REQ_ID=569b8178f2b5] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-30 13:41:01 --> [TRACE]
DEBUG - 2026-03-30 13:41:01 --> [REQ_ID=a7da875598b7] [FILTER_AFTER]
DEBUG - 2026-03-30 13:41:01 --> [REQ_ID=a7da875598b7] [LIFECYCLE][END] status=200 duration_ms=17.74 memory_delta=0
INFO - 2026-03-30 13:41:01 --> [REQ_ID=569b8178f2b5] [PERF] Execution time=0.017899
DEBUG - 2026-03-30 13:41:01 --> [REQ_ID=a7da875598b7] [REQUEST][END]
INFO - 2026-03-30 13:41:01 --> [REQ_ID=a7da875598b7] [PERF] Execution time=0.027001
DEBUG - 2026-03-30 13:41:01 --> [REQ_ID=96ee78cc35c7] [REQUEST][START] GET /index.php/Account/Notifications
DEBUG - 2026-03-30 13:41:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-30 13:41:01 --> [REQ_ID=96ee78cc35c7] [FILTER_BEFORE] /index.php/Account/Notifications
DEBUG - 2026-03-30 13:41:01 --> [REQ_ID=96ee78cc35c7] [ROUTE] Controller=\App\Modules\User\Controllers\DashboardController Method=notifications
DEBUG - 2026-03-30 13:41:01 --> [REQ_ID=96ee78cc35c7] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Account/Notifications
DEBUG - 2026-03-30 13:41:01 --> [CSRF] token name=csrf_test_name hash=941f607c28f1988e945af138d37c599b
DEBUG - 2026-03-30 13:41:01 --> [REQ_ID=96ee78cc35c7] [REQUEST][END]
INFO - 2026-03-30 13:41:01 --> [REQ_ID=96ee78cc35c7] [PERF] Execution time=0.017686
DEBUG - 2026-03-30 13:41:01 --> [REQ_ID=a8856bf37f81] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-30 13:41:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-30 13:41:01 --> [REQ_ID=a8856bf37f81] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-30 13:41:01 --> [REQ_ID=a8856bf37f81] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-30 13:41:01 --> [REQ_ID=a8856bf37f81] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-30 13:41:01 --> [CSRF] token name=csrf_test_name hash=0ec6b49d62bba1429e5f76b0405863d1
DEBUG - 2026-03-30 13:41:01 --> [REQ_ID=98b90bd4dc1e] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-30 13:41:01 --> [REQ_ID=98b90bd4dc1e] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-30 13:41:01 --> [TRACE]
DEBUG - 2026-03-30 13:41:01 --> [REQ_ID=a8856bf37f81] [FILTER_AFTER]
DEBUG - 2026-03-30 13:41:01 --> [REQ_ID=a8856bf37f81] [LIFECYCLE][END] status=200 duration_ms=16.74 memory_delta=0
INFO - 2026-03-30 13:41:01 --> [REQ_ID=98b90bd4dc1e] [PERF] Execution time=0.017065
DEBUG - 2026-03-30 13:41:01 --> [REQ_ID=a8856bf37f81] [REQUEST][END]
INFO - 2026-03-30 13:41:01 --> [REQ_ID=a8856bf37f81] [PERF] Execution time=0.026018
DEBUG - 2026-03-30 13:41:01 --> [REQ_ID=f111f718a4c4] [REQUEST][START] GET /index.php/Management/Budgets
DEBUG - 2026-03-30 13:41:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-30 13:41:01 --> [REQ_ID=f111f718a4c4] [FILTER_BEFORE] /index.php/Management/Budgets
DEBUG - 2026-03-30 13:41:01 --> [REQ_ID=f111f718a4c4] [ROUTE] Controller=\App\Modules\Management\Controllers\BudgetsAdminController Method=index
DEBUG - 2026-03-30 13:41:01 --> [REQ_ID=f111f718a4c4] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Management/Budgets
DEBUG - 2026-03-30 13:41:01 --> [CSRF] token name=csrf_test_name hash=64e72ca98b3143302319ae2e420f20a9
DEBUG - 2026-03-30 13:41:01 --> [REQ_ID=f111f718a4c4] [REQUEST][END]
INFO - 2026-03-30 13:41:01 --> [REQ_ID=f111f718a4c4] [PERF] Execution time=0.010097
DEBUG - 2026-03-30 13:41:01 --> [REQ_ID=36d69fded29a] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-30 13:41:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-30 13:41:01 --> [REQ_ID=36d69fded29a] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-30 13:41:01 --> [REQ_ID=36d69fded29a] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-30 13:41:01 --> [REQ_ID=36d69fded29a] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-30 13:41:01 --> [CSRF] token name=csrf_test_name hash=28b0ee1123ca3e9c8cc4d0229fe68fb9
DEBUG - 2026-03-30 13:41:01 --> [REQ_ID=2284e8b4bd0a] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-30 13:41:01 --> [REQ_ID=2284e8b4bd0a] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-30 13:41:01 --> [TRACE]
DEBUG - 2026-03-30 13:41:01 --> [REQ_ID=36d69fded29a] [FILTER_AFTER]
DEBUG - 2026-03-30 13:41:01 --> [REQ_ID=36d69fded29a] [LIFECYCLE][END] status=200 duration_ms=28.84 memory_delta=0
INFO - 2026-03-30 13:41:01 --> [REQ_ID=2284e8b4bd0a] [PERF] Execution time=0.028804
DEBUG - 2026-03-30 13:41:01 --> [REQ_ID=36d69fded29a] [REQUEST][END]
INFO - 2026-03-30 13:41:01 --> [REQ_ID=36d69fded29a] [PERF] Execution time=0.040802
DEBUG - 2026-03-30 13:41:01 --> [REQ_ID=561698c80c5d] [REQUEST][START] GET /index.php/logout
DEBUG - 2026-03-30 13:41:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-30 13:41:01 --> [REQ_ID=561698c80c5d] [FILTER_BEFORE] /index.php/logout
DEBUG - 2026-03-30 13:41:01 --> [REQ_ID=561698c80c5d] [ROUTE] Controller=\App\Controllers\AuthController Method=logout
DEBUG - 2026-03-30 13:41:01 --> [REQ_ID=561698c80c5d] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/logout
DEBUG - 2026-03-30 13:41:01 --> [CSRF] token name=csrf_test_name hash=98f0f5d31a608be2b18d6dafc51ae6e2
DEBUG - 2026-03-30 13:41:01 --> [REQ_ID=561698c80c5d] [REQUEST][END]
INFO - 2026-03-30 13:41:01 --> [REQ_ID=561698c80c5d] [PERF] Execution time=0.010919
DEBUG - 2026-03-30 13:41:01 --> [REQ_ID=0b3898b5c31d] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-30 13:41:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-30 13:41:01 --> [REQ_ID=0b3898b5c31d] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-30 13:41:01 --> [REQ_ID=0b3898b5c31d] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-30 13:41:01 --> [REQ_ID=0b3898b5c31d] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-30 13:41:01 --> [CSRF] token name=csrf_test_name hash=03e3ac01dc6bf4588ff31ad58dd9f88d
DEBUG - 2026-03-30 13:41:01 --> [REQ_ID=95f5a13da25a] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-30 13:41:01 --> [REQ_ID=95f5a13da25a] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-30 13:41:01 --> [TRACE]
DEBUG - 2026-03-30 13:41:01 --> [REQ_ID=0b3898b5c31d] [FILTER_AFTER]
DEBUG - 2026-03-30 13:41:01 --> [REQ_ID=0b3898b5c31d] [LIFECYCLE][END] status=200 duration_ms=14.51 memory_delta=0
INFO - 2026-03-30 13:41:01 --> [REQ_ID=95f5a13da25a] [PERF] Execution time=0.014579
DEBUG - 2026-03-30 13:41:01 --> [REQ_ID=0b3898b5c31d] [REQUEST][END]
INFO - 2026-03-30 13:41:01 --> [REQ_ID=0b3898b5c31d] [PERF] Execution time=0.023003
DEBUG - 2026-03-30 13:41:01 --> [REQ_ID=2f76be20258f] [REQUEST][START] GET /index.php/Projects
DEBUG - 2026-03-30 13:41:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-30 13:41:01 --> [REQ_ID=2f76be20258f] [FILTER_BEFORE] /index.php/Projects
DEBUG - 2026-03-30 13:41:01 --> [REQ_ID=2f76be20258f] [ROUTE] Controller=\App\Modules\User\Controllers\ProjectsController Method=index
DEBUG - 2026-03-30 13:41:01 --> [REQ_ID=2f76be20258f] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Projects
DEBUG - 2026-03-30 13:41:01 --> [CSRF] token name=csrf_test_name hash=3ffde3c084d4e09196dafd9fa59a17b2
DEBUG - 2026-03-30 13:41:01 --> [REQ_ID=2f76be20258f] [REQUEST][END]
INFO - 2026-03-30 13:41:01 --> [REQ_ID=2f76be20258f] [PERF] Execution time=0.010449
DEBUG - 2026-03-30 13:41:01 --> [REQ_ID=9bcc1dbf9a7c] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-30 13:41:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-30 13:41:01 --> [REQ_ID=9bcc1dbf9a7c] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-30 13:41:01 --> [REQ_ID=9bcc1dbf9a7c] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-30 13:41:01 --> [REQ_ID=9bcc1dbf9a7c] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-30 13:41:01 --> [CSRF] token name=csrf_test_name hash=4b67b99f1ac67fddd855a6d36aaa2d32
DEBUG - 2026-03-30 13:41:01 --> [REQ_ID=86737d1540aa] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-30 13:41:01 --> [REQ_ID=86737d1540aa] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-30 13:41:01 --> [TRACE]
DEBUG - 2026-03-30 13:41:01 --> [REQ_ID=9bcc1dbf9a7c] [FILTER_AFTER]
DEBUG - 2026-03-30 13:41:01 --> [REQ_ID=9bcc1dbf9a7c] [LIFECYCLE][END] status=200 duration_ms=16.24 memory_delta=0
INFO - 2026-03-30 13:41:01 --> [REQ_ID=86737d1540aa] [PERF] Execution time=0.016583
DEBUG - 2026-03-30 13:41:01 --> [REQ_ID=9bcc1dbf9a7c] [REQUEST][END]
INFO - 2026-03-30 13:41:01 --> [REQ_ID=9bcc1dbf9a7c] [PERF] Execution time=0.025550
DEBUG - 2026-03-30 13:41:01 --> [REQ_ID=1fdfe5639115] [REQUEST][START] GET /index.php/Account/Connected-Accounts
DEBUG - 2026-03-30 13:41:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-30 13:41:01 --> [REQ_ID=1fdfe5639115] [FILTER_BEFORE] /index.php/Account/Connected-Accounts
DEBUG - 2026-03-30 13:41:01 --> [REQ_ID=1fdfe5639115] [ROUTE] Controller=\App\Modules\User\Controllers\DashboardController Method=connectedAccounts
DEBUG - 2026-03-30 13:41:01 --> [REQ_ID=1fdfe5639115] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Account/Connected-Accounts
DEBUG - 2026-03-30 13:41:01 --> [CSRF] token name=csrf_test_name hash=9f1446a8c0a9540de8e8082b98ca9cbf
DEBUG - 2026-03-30 13:41:01 --> [REQ_ID=1fdfe5639115] [REQUEST][END]
INFO - 2026-03-30 13:41:01 --> [REQ_ID=1fdfe5639115] [PERF] Execution time=0.013138
DEBUG - 2026-03-30 13:41:01 --> [REQ_ID=fdc0e826cbb6] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-30 13:41:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-30 13:41:01 --> [REQ_ID=fdc0e826cbb6] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-30 13:41:01 --> [REQ_ID=fdc0e826cbb6] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-30 13:41:01 --> [REQ_ID=fdc0e826cbb6] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-30 13:41:01 --> [CSRF] token name=csrf_test_name hash=f398fbbb782966ca55af06cc198cfc9b
DEBUG - 2026-03-30 13:41:01 --> [REQ_ID=986f4a0cb390] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-30 13:41:01 --> [REQ_ID=986f4a0cb390] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-30 13:41:01 --> [TRACE]
DEBUG - 2026-03-30 13:41:01 --> [REQ_ID=fdc0e826cbb6] [FILTER_AFTER]
DEBUG - 2026-03-30 13:41:01 --> [REQ_ID=fdc0e826cbb6] [LIFECYCLE][END] status=200 duration_ms=26.15 memory_delta=0
INFO - 2026-03-30 13:41:01 --> [REQ_ID=986f4a0cb390] [PERF] Execution time=0.026649
DEBUG - 2026-03-30 13:41:01 --> [REQ_ID=fdc0e826cbb6] [REQUEST][END]
INFO - 2026-03-30 13:41:01 --> [REQ_ID=fdc0e826cbb6] [PERF] Execution time=0.036111
DEBUG - 2026-03-30 13:41:01 --> [REQ_ID=9a0640292bc3] [REQUEST][START] GET /index.php/Management/Exchange
DEBUG - 2026-03-30 13:41:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-30 13:41:01 --> [REQ_ID=9a0640292bc3] [FILTER_BEFORE] /index.php/Management/Exchange
DEBUG - 2026-03-30 13:41:01 --> [REQ_ID=9a0640292bc3] [ROUTE] Controller=\App\Modules\Management\Controllers\ExchangeAdminController Method=index
DEBUG - 2026-03-30 13:41:01 --> [REQ_ID=9a0640292bc3] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Management/Exchange
DEBUG - 2026-03-30 13:41:01 --> [CSRF] token name=csrf_test_name hash=35e1c71754f21b30828401767a2fdac9
DEBUG - 2026-03-30 13:41:01 --> [REQ_ID=9a0640292bc3] [REQUEST][END]
INFO - 2026-03-30 13:41:01 --> [REQ_ID=9a0640292bc3] [PERF] Execution time=0.010385
DEBUG - 2026-03-30 13:41:02 --> [REQ_ID=7233e87de3e2] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-30 13:41:02 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-30 13:41:02 --> [REQ_ID=7233e87de3e2] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-30 13:41:02 --> [REQ_ID=7233e87de3e2] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-30 13:41:02 --> [REQ_ID=7233e87de3e2] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-30 13:41:02 --> [CSRF] token name=csrf_test_name hash=124303e3722c9d1ae4d90b2d25c4d7ff
DEBUG - 2026-03-30 13:41:02 --> [REQ_ID=4da2bceeaefb] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-30 13:41:02 --> [REQ_ID=4da2bceeaefb] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-30 13:41:02 --> [TRACE]
DEBUG - 2026-03-30 13:41:02 --> [REQ_ID=7233e87de3e2] [FILTER_AFTER]
DEBUG - 2026-03-30 13:41:02 --> [REQ_ID=7233e87de3e2] [LIFECYCLE][END] status=200 duration_ms=18.51 memory_delta=0
INFO - 2026-03-30 13:41:02 --> [REQ_ID=4da2bceeaefb] [PERF] Execution time=0.018960
DEBUG - 2026-03-30 13:41:02 --> [REQ_ID=7233e87de3e2] [REQUEST][END]
INFO - 2026-03-30 13:41:02 --> [REQ_ID=7233e87de3e2] [PERF] Execution time=0.028110
DEBUG - 2026-03-30 13:41:02 --> [REQ_ID=d82078bffbc6] [REQUEST][START] GET /index.php/Management/API
DEBUG - 2026-03-30 13:41:02 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-30 13:41:02 --> [REQ_ID=d82078bffbc6] [FILTER_BEFORE] /index.php/Management/API
DEBUG - 2026-03-30 13:41:02 --> [REQ_ID=d82078bffbc6] [ROUTE] Controller=\App\Modules\Management\Controllers\APIAdminController Method=index
DEBUG - 2026-03-30 13:41:02 --> [REQ_ID=d82078bffbc6] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Management/API
DEBUG - 2026-03-30 13:41:02 --> [CSRF] token name=csrf_test_name hash=f6a6a0637ea5fa3deb33f0d192ab0c95
DEBUG - 2026-03-30 13:41:02 --> [REQ_ID=d82078bffbc6] [REQUEST][END]
INFO - 2026-03-30 13:41:02 --> [REQ_ID=d82078bffbc6] [PERF] Execution time=0.011832
DEBUG - 2026-03-30 13:41:02 --> [REQ_ID=33595925a79b] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-30 13:41:02 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-30 13:41:02 --> [REQ_ID=33595925a79b] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-30 13:41:02 --> [REQ_ID=33595925a79b] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-30 13:41:02 --> [REQ_ID=33595925a79b] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-30 13:41:02 --> [CSRF] token name=csrf_test_name hash=c97c4d18fa0f95acc77e3032b71ce247
DEBUG - 2026-03-30 13:41:02 --> [REQ_ID=af3ae431d575] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-30 13:41:02 --> [REQ_ID=af3ae431d575] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-30 13:41:02 --> [TRACE]
DEBUG - 2026-03-30 13:41:02 --> [REQ_ID=33595925a79b] [FILTER_AFTER]
DEBUG - 2026-03-30 13:41:02 --> [REQ_ID=33595925a79b] [LIFECYCLE][END] status=200 duration_ms=15.85 memory_delta=0
INFO - 2026-03-30 13:41:02 --> [REQ_ID=af3ae431d575] [PERF] Execution time=0.015937
DEBUG - 2026-03-30 13:41:02 --> [REQ_ID=33595925a79b] [REQUEST][END]
INFO - 2026-03-30 13:41:02 --> [REQ_ID=33595925a79b] [PERF] Execution time=0.024627
DEBUG - 2026-03-30 13:41:02 --> [REQ_ID=32924de179f5] [REQUEST][START] GET /index.php/Management/Admin
DEBUG - 2026-03-30 13:41:02 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-30 13:41:02 --> [REQ_ID=32924de179f5] [FILTER_BEFORE] /index.php/Management/Admin
DEBUG - 2026-03-30 13:41:02 --> [REQ_ID=32924de179f5] [ROUTE] Controller=\App\Modules\Management\Controllers\ManagementAdminController Method=index
DEBUG - 2026-03-30 13:41:02 --> [REQ_ID=32924de179f5] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Management/Admin
DEBUG - 2026-03-30 13:41:02 --> [CSRF] token name=csrf_test_name hash=dbdb389761fdb3c58b51d7c66b177385
DEBUG - 2026-03-30 13:41:02 --> [REQ_ID=32924de179f5] [REQUEST][END]
INFO - 2026-03-30 13:41:02 --> [REQ_ID=32924de179f5] [PERF] Execution time=0.010354
DEBUG - 2026-03-30 13:41:02 --> [REQ_ID=bd43ecbd32f4] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-30 13:41:02 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-30 13:41:02 --> [REQ_ID=bd43ecbd32f4] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-30 13:41:02 --> [REQ_ID=bd43ecbd32f4] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-30 13:41:02 --> [REQ_ID=bd43ecbd32f4] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-30 13:41:02 --> [CSRF] token name=csrf_test_name hash=d9f2687ee2c29c284671a4410df10d84
DEBUG - 2026-03-30 13:41:02 --> [REQ_ID=c1463968ae8e] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-30 13:41:02 --> [REQ_ID=c1463968ae8e] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-30 13:41:02 --> [TRACE]
DEBUG - 2026-03-30 13:41:02 --> [REQ_ID=bd43ecbd32f4] [FILTER_AFTER]
DEBUG - 2026-03-30 13:41:02 --> [REQ_ID=bd43ecbd32f4] [LIFECYCLE][END] status=200 duration_ms=19.14 memory_delta=0
INFO - 2026-03-30 13:41:02 --> [REQ_ID=c1463968ae8e] [PERF] Execution time=0.019475
DEBUG - 2026-03-30 13:41:02 --> [REQ_ID=bd43ecbd32f4] [REQUEST][END]
INFO - 2026-03-30 13:41:02 --> [REQ_ID=bd43ecbd32f4] [PERF] Execution time=0.031284
DEBUG - 2026-03-30 13:41:02 --> [REQ_ID=d91c0ef04287] [REQUEST][START] GET /index.php/Marketplace
DEBUG - 2026-03-30 13:41:02 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-30 13:41:02 --> [REQ_ID=d91c0ef04287] [FILTER_BEFORE] /index.php/Marketplace
DEBUG - 2026-03-30 13:41:02 --> [REQ_ID=d91c0ef04287] [ROUTE] Controller=\App\Modules\ScriptStudio\Controllers\ScriptStudioController Method=marketplace
DEBUG - 2026-03-30 13:41:02 --> [REQ_ID=d91c0ef04287] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Marketplace
DEBUG - 2026-03-30 13:41:02 --> [CSRF] token name=csrf_test_name hash=8e5acf72ef904ac32d9cd1c7a46f4c10
DEBUG - 2026-03-30 13:41:02 --> [REQ_ID=d91c0ef04287] [REQUEST][END]
INFO - 2026-03-30 13:41:02 --> [REQ_ID=d91c0ef04287] [PERF] Execution time=0.010149
DEBUG - 2026-03-30 13:41:02 --> [REQ_ID=52d765ba9322] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-30 13:41:02 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-30 13:41:02 --> [REQ_ID=52d765ba9322] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-30 13:41:02 --> [REQ_ID=52d765ba9322] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-30 13:41:02 --> [REQ_ID=52d765ba9322] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-30 13:41:02 --> [CSRF] token name=csrf_test_name hash=d4796382b79c4b6f2628e4ba10ffd0be
DEBUG - 2026-03-30 13:41:02 --> [REQ_ID=5365e186d20f] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-30 13:41:02 --> [REQ_ID=5365e186d20f] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-30 13:41:02 --> [TRACE]
DEBUG - 2026-03-30 13:41:02 --> [REQ_ID=52d765ba9322] [FILTER_AFTER]
DEBUG - 2026-03-30 13:41:02 --> [REQ_ID=52d765ba9322] [LIFECYCLE][END] status=200 duration_ms=16.26 memory_delta=0
INFO - 2026-03-30 13:41:02 --> [REQ_ID=5365e186d20f] [PERF] Execution time=0.016306
DEBUG - 2026-03-30 13:41:02 --> [REQ_ID=52d765ba9322] [REQUEST][END]
INFO - 2026-03-30 13:41:02 --> [REQ_ID=52d765ba9322] [PERF] Execution time=0.025481
DEBUG - 2026-03-30 13:41:02 --> [REQ_ID=bc6edf242df2] [REQUEST][START] GET /index.php/Assets
DEBUG - 2026-03-30 13:41:02 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-30 13:41:02 --> [REQ_ID=bc6edf242df2] [FILTER_BEFORE] /index.php/Assets
DEBUG - 2026-03-30 13:41:02 --> [REQ_ID=bc6edf242df2] [ROUTE] Controller=\App\Modules\Management\Controllers\AssetsController Method=index
DEBUG - 2026-03-30 13:41:02 --> [REQ_ID=bc6edf242df2] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Assets
DEBUG - 2026-03-30 13:41:02 --> [CSRF] token name=csrf_test_name hash=7bed4b3c6b5240ab54ce68f3a252bfb8
DEBUG - 2026-03-30 13:41:02 --> [REQ_ID=bc6edf242df2] [REQUEST][END]
INFO - 2026-03-30 13:41:02 --> [REQ_ID=bc6edf242df2] [PERF] Execution time=0.009551
DEBUG - 2026-03-30 13:41:02 --> [REQ_ID=ae35533fa12a] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-30 13:41:02 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-30 13:41:02 --> [REQ_ID=ae35533fa12a] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-30 13:41:02 --> [REQ_ID=ae35533fa12a] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-30 13:41:02 --> [REQ_ID=ae35533fa12a] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-30 13:41:02 --> [CSRF] token name=csrf_test_name hash=dec49974d50fc6666e143b774e614df4
DEBUG - 2026-03-30 13:41:02 --> [REQ_ID=98eb012d56aa] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-30 13:41:02 --> [REQ_ID=98eb012d56aa] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-30 13:41:02 --> [TRACE]
DEBUG - 2026-03-30 13:41:02 --> [REQ_ID=ae35533fa12a] [FILTER_AFTER]
DEBUG - 2026-03-30 13:41:02 --> [REQ_ID=ae35533fa12a] [LIFECYCLE][END] status=200 duration_ms=14.44 memory_delta=0
INFO - 2026-03-30 13:41:02 --> [REQ_ID=98eb012d56aa] [PERF] Execution time=0.014454
DEBUG - 2026-03-30 13:41:02 --> [REQ_ID=ae35533fa12a] [REQUEST][END]
INFO - 2026-03-30 13:41:02 --> [REQ_ID=ae35533fa12a] [PERF] Execution time=0.023443
DEBUG - 2026-03-30 13:41:02 --> [REQ_ID=060d6535b090] [REQUEST][START] GET /index.php/Budget
DEBUG - 2026-03-30 13:41:02 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-30 13:41:02 --> [REQ_ID=060d6535b090] [FILTER_BEFORE] /index.php/Budget
DEBUG - 2026-03-30 13:41:02 --> [REQ_ID=060d6535b090] [ROUTE] Controller=\App\Modules\User\Controllers\BudgetController Method=index
DEBUG - 2026-03-30 13:41:02 --> [REQ_ID=060d6535b090] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Budget
DEBUG - 2026-03-30 13:41:02 --> [CSRF] token name=csrf_test_name hash=52701700f495c0d8d5e5bdfdcf7454af
DEBUG - 2026-03-30 13:41:02 --> [REQ_ID=060d6535b090] [REQUEST][END]
INFO - 2026-03-30 13:41:02 --> [REQ_ID=060d6535b090] [PERF] Execution time=0.013979
DEBUG - 2026-03-30 13:41:02 --> [REQ_ID=9b0848db76c5] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-30 13:41:02 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-30 13:41:02 --> [REQ_ID=9b0848db76c5] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-30 13:41:02 --> [REQ_ID=9b0848db76c5] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-30 13:41:02 --> [REQ_ID=9b0848db76c5] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-30 13:41:02 --> [CSRF] token name=csrf_test_name hash=e2cea20bd54c1c95af720b6475b17555
DEBUG - 2026-03-30 13:41:02 --> [REQ_ID=2e0b1d236a7e] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-30 13:41:02 --> [REQ_ID=2e0b1d236a7e] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-30 13:41:02 --> [TRACE]
DEBUG - 2026-03-30 13:41:02 --> [REQ_ID=9b0848db76c5] [FILTER_AFTER]
DEBUG - 2026-03-30 13:41:02 --> [REQ_ID=9b0848db76c5] [LIFECYCLE][END] status=200 duration_ms=22.12 memory_delta=0
INFO - 2026-03-30 13:41:02 --> [REQ_ID=2e0b1d236a7e] [PERF] Execution time=0.022181
DEBUG - 2026-03-30 13:41:02 --> [REQ_ID=9b0848db76c5] [REQUEST][END]
INFO - 2026-03-30 13:41:02 --> [REQ_ID=9b0848db76c5] [PERF] Execution time=0.030597
DEBUG - 2026-03-30 13:41:03 --> [REQ_ID=0f96b820a267] [REQUEST][START] GET /
DEBUG - 2026-03-30 13:41:03 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-30 13:41:03 --> [REQ_ID=0f96b820a267] [FILTER_BEFORE] /
DEBUG - 2026-03-30 13:41:03 --> [REQ_ID=0f96b820a267] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-30 13:41:03 --> [REQ_ID=0f96b820a267] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-30 13:41:03 --> [CSRF] token name=csrf_test_name hash=47e897cc1552d2488e5d3cbb1456cc1a
DEBUG - 2026-03-30 13:41:03 --> [REQ_ID=609c32f9345c] [INIT] App\Controllers\Home::GET
INFO - 2026-03-30 13:41:03 --> [REQ_ID=609c32f9345c] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-30 13:41:03 --> [TRACE]
INFO - 2026-03-30 13:41:03 --> [REQ_ID=609c32f9345c] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-30 13:41:03 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-30 13:41:03 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
DEBUG - 2026-03-30 13:41:03 --> [REQ_ID=609c32f9345c] [VIEW_RENDER] themes/public/home
INFO - 2026-03-30 13:41:03 --> [REQ_ID=609c32f9345c] [MEMORY][commonData:start] 8388608
INFO - 2026-03-30 13:41:03 --> themesMemory usage: 8388608
DEBUG - 2026-03-30 13:41:03 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-30 13:41:03 --> [REQ_ID=0f96b820a267] [FILTER_AFTER]
DEBUG - 2026-03-30 13:41:03 --> [REQ_ID=0f96b820a267] [LIFECYCLE][END] status=200 duration_ms=525.16 memory_delta=4194304
INFO - 2026-03-30 13:41:03 --> [REQ_ID=609c32f9345c] [PERF] Execution time=0.525153
DEBUG - 2026-03-30 13:41:03 --> [REQ_ID=0f96b820a267] [REQUEST][END]
INFO - 2026-03-30 13:41:03 --> [REQ_ID=0f96b820a267] [PERF] Execution time=0.534985
DEBUG - 2026-03-30 13:41:03 --> [REQ_ID=cc5f106d35d2] [REQUEST][START] GET /
DEBUG - 2026-03-30 13:41:03 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-30 13:41:03 --> [REQ_ID=cc5f106d35d2] [FILTER_BEFORE] /
DEBUG - 2026-03-30 13:41:03 --> [REQ_ID=cc5f106d35d2] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-30 13:41:03 --> [REQ_ID=cc5f106d35d2] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-30 13:41:03 --> [CSRF] token name=csrf_test_name hash=b45af47100c64921ece4cee5d8cdb0ff
DEBUG - 2026-03-30 13:41:03 --> [REQ_ID=dfe905eefe0f] [INIT] App\Controllers\Home::GET
INFO - 2026-03-30 13:41:03 --> [REQ_ID=dfe905eefe0f] [MEMORY][controller-start] 6291456
DEBUG - 2026-03-30 13:41:03 --> [TRACE]
INFO - 2026-03-30 13:41:03 --> [REQ_ID=dfe905eefe0f] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-30 13:41:03 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-30 13:41:04 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
DEBUG - 2026-03-30 13:41:04 --> [REQ_ID=dfe905eefe0f] [VIEW_RENDER] themes/public/home
INFO - 2026-03-30 13:41:04 --> [REQ_ID=dfe905eefe0f] [MEMORY][commonData:start] 8388608
INFO - 2026-03-30 13:41:04 --> themesMemory usage: 8388608
DEBUG - 2026-03-30 13:41:04 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-30 13:41:04 --> [REQ_ID=cc5f106d35d2] [FILTER_AFTER]
DEBUG - 2026-03-30 13:41:04 --> [REQ_ID=cc5f106d35d2] [LIFECYCLE][END] status=200 duration_ms=518.01 memory_delta=2097152
INFO - 2026-03-30 13:41:04 --> [REQ_ID=dfe905eefe0f] [PERF] Execution time=0.518009
DEBUG - 2026-03-30 13:41:04 --> [REQ_ID=cc5f106d35d2] [REQUEST][END]
INFO - 2026-03-30 13:41:04 --> [REQ_ID=cc5f106d35d2] [PERF] Execution time=0.526767
DEBUG - 2026-03-30 13:41:05 --> [REQ_ID=70cb78e5169f] [REQUEST][START] GET /
DEBUG - 2026-03-30 13:41:05 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-30 13:41:05 --> [REQ_ID=70cb78e5169f] [FILTER_BEFORE] /
DEBUG - 2026-03-30 13:41:05 --> [REQ_ID=70cb78e5169f] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-30 13:41:05 --> [REQ_ID=70cb78e5169f] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-30 13:41:05 --> [CSRF] token name=csrf_test_name hash=bf741253064a4fc34a45c9ba103b32e3
DEBUG - 2026-03-30 13:41:05 --> [REQ_ID=bb2ea981b136] [INIT] App\Controllers\Home::GET
INFO - 2026-03-30 13:41:05 --> [REQ_ID=bb2ea981b136] [MEMORY][controller-start] 6291456
DEBUG - 2026-03-30 13:41:05 --> [TRACE]
INFO - 2026-03-30 13:41:05 --> [REQ_ID=bb2ea981b136] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-30 13:41:05 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-30 13:41:06 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
DEBUG - 2026-03-30 13:41:06 --> [REQ_ID=bb2ea981b136] [VIEW_RENDER] themes/public/home
INFO - 2026-03-30 13:41:06 --> [REQ_ID=bb2ea981b136] [MEMORY][commonData:start] 8388608
INFO - 2026-03-30 13:41:06 --> themesMemory usage: 8388608
DEBUG - 2026-03-30 13:41:06 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-30 13:41:06 --> [REQ_ID=70cb78e5169f] [FILTER_AFTER]
DEBUG - 2026-03-30 13:41:06 --> [REQ_ID=70cb78e5169f] [LIFECYCLE][END] status=200 duration_ms=551.14 memory_delta=2097152
INFO - 2026-03-30 13:41:06 --> [REQ_ID=bb2ea981b136] [PERF] Execution time=0.551215
DEBUG - 2026-03-30 13:41:06 --> [REQ_ID=70cb78e5169f] [REQUEST][END]
INFO - 2026-03-30 13:41:06 --> [REQ_ID=70cb78e5169f] [PERF] Execution time=0.560490
DEBUG - 2026-03-30 13:41:22 --> [REQ_ID=4fa364fbb507] [REQUEST][START] HEAD /
DEBUG - 2026-03-30 13:41:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
ERROR - 2026-03-30 13:41:22 --> [404_ROUTE]
DEBUG - 2026-03-30 13:42:45 --> [REQ_ID=2c841bd6b22e] [REQUEST][START] GET /
DEBUG - 2026-03-30 13:42:45 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-30 13:42:45 --> [REQ_ID=2c841bd6b22e] [REQUEST][END]
INFO - 2026-03-30 13:42:45 --> [REQ_ID=2c841bd6b22e] [PERF] Execution time=0.008656
DEBUG - 2026-03-30 13:46:22 --> [REQ_ID=bb374c778370] [REQUEST][START] HEAD /
DEBUG - 2026-03-30 13:46:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
ERROR - 2026-03-30 13:46:22 --> [404_ROUTE]
DEBUG - 2026-03-30 13:48:58 --> [REQ_ID=36503ae6c930] [REQUEST][START] GET /
DEBUG - 2026-03-30 13:48:58 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-30 13:48:58 --> [REQ_ID=36503ae6c930] [REQUEST][END]
INFO - 2026-03-30 13:48:58 --> [REQ_ID=36503ae6c930] [PERF] Execution time=0.034214
DEBUG - 2026-03-30 13:48:58 --> [REQ_ID=e55d7ea9b947] [REQUEST][START] GET /
DEBUG - 2026-03-30 13:48:58 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-30 13:48:58 --> [REQ_ID=e55d7ea9b947] [FILTER_BEFORE] /
DEBUG - 2026-03-30 13:48:58 --> [REQ_ID=e55d7ea9b947] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-30 13:48:58 --> [REQ_ID=e55d7ea9b947] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-30 13:48:58 --> [CSRF] token name=csrf_test_name hash=2f31d8afe3aea1c1c690cfe46ed8ef33
DEBUG - 2026-03-30 13:48:58 --> [REQ_ID=04cda7c9f790] [INIT] App\Controllers\Home::GET
INFO - 2026-03-30 13:48:58 --> [REQ_ID=04cda7c9f790] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-30 13:48:58 --> [TRACE]
INFO - 2026-03-30 13:48:58 --> [REQ_ID=04cda7c9f790] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-30 13:48:58 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-30 13:48:58 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
DEBUG - 2026-03-30 13:48:58 --> [REQ_ID=04cda7c9f790] [VIEW_RENDER] themes/public/home
INFO - 2026-03-30 13:48:58 --> [REQ_ID=04cda7c9f790] [MEMORY][commonData:start] 8388608
INFO - 2026-03-30 13:48:58 --> themesMemory usage: 8388608
DEBUG - 2026-03-30 13:48:58 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-30 13:48:58 --> [REQ_ID=e55d7ea9b947] [FILTER_AFTER]
DEBUG - 2026-03-30 13:48:58 --> [REQ_ID=e55d7ea9b947] [LIFECYCLE][END] status=200 duration_ms=572.52 memory_delta=4194304
INFO - 2026-03-30 13:48:58 --> [REQ_ID=04cda7c9f790] [PERF] Execution time=0.575260
DEBUG - 2026-03-30 13:48:58 --> [REQ_ID=e55d7ea9b947] [REQUEST][END]
INFO - 2026-03-30 13:48:58 --> [REQ_ID=e55d7ea9b947] [PERF] Execution time=0.587427
DEBUG - 2026-03-30 13:51:22 --> [REQ_ID=fbf8f3a2362f] [REQUEST][START] HEAD /
DEBUG - 2026-03-30 13:51:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
ERROR - 2026-03-30 13:51:22 --> [404_ROUTE]
DEBUG - 2026-03-30 13:56:22 --> [REQ_ID=fbec087df301] [REQUEST][START] HEAD /
DEBUG - 2026-03-30 13:56:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
ERROR - 2026-03-30 13:56:22 --> [404_ROUTE]
DEBUG - 2026-03-30 14:00:02 --> [REQ_ID=92c0063c2896] [REQUEST][START] GET /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-30 14:00:02 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-30 14:00:02 --> [REQ_ID=92c0063c2896] [FILTER_BEFORE] /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-30 14:00:02 --> [REQ_ID=92c0063c2896] [ROUTE] Controller=\App\Modules\Management\Controllers\ManagementAPIController Method=Run_CRON_Tasks
DEBUG - 2026-03-30 14:00:02 --> [REQ_ID=92c0063c2896] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-30 14:00:02 --> [REQ_ID=92c0063c2896] [REQUEST][END]
INFO - 2026-03-30 14:00:02 --> [REQ_ID=92c0063c2896] [PERF] Execution time=0.042272
DEBUG - 2026-03-30 14:01:22 --> [REQ_ID=414d4ffc9154] [REQUEST][START] HEAD /
DEBUG - 2026-03-30 14:01:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
ERROR - 2026-03-30 14:01:22 --> [404_ROUTE]
DEBUG - 2026-03-30 14:04:33 --> [REQ_ID=410d14a4c42a] [REQUEST][START] GET /index.php/How-It-Works/MyMI-Gold
DEBUG - 2026-03-30 14:04:33 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-30 14:04:33 --> [REQ_ID=410d14a4c42a] [FILTER_BEFORE] /index.php/How-It-Works/MyMI-Gold
DEBUG - 2026-03-30 14:04:33 --> [REQ_ID=410d14a4c42a] [ROUTE] Controller=\App\Modules\Blog\Controllers\HowItWorksController Method=MyMIGold
DEBUG - 2026-03-30 14:04:33 --> [REQ_ID=410d14a4c42a] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/How-It-Works/MyMI-Gold
DEBUG - 2026-03-30 14:04:33 --> [CSRF] token name=csrf_test_name hash=b239017b4cc78d25ade56fe727fec98e
DEBUG - 2026-03-30 14:04:33 --> [REQ_ID=7e99e55ee786] [INIT] App\Modules\Blog\Controllers\HowItWorksController::GET
INFO - 2026-03-30 14:04:33 --> [REQ_ID=7e99e55ee786] [MEMORY][controller-start] 6291456
DEBUG - 2026-03-30 14:04:33 --> [TRACE]
DEBUG - 2026-03-30 14:04:33 --> [REQ_ID=7e99e55ee786] [METHOD_ENTRY] MyMIGold
DEBUG - 2026-03-30 14:04:33 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-30 14:04:33 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-30 14:04:33 --> MyMICoin initialized ONCE
DEBUG - 2026-03-30 14:04:33 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-30 14:04:33 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-30 14:04:33 --> MyMIWallets skipped (no user context)
INFO - 2026-03-30 14:04:33 --> [REQ_ID=7e99e55ee786] [MEMORY][commonData:start] 6291456
INFO - 2026-03-30 14:04:33 --> themesMemory usage: 10485760
DEBUG - 2026-03-30 14:04:33 --> [MetaService] slug=how-it-works/mymi-gold pageName= cacheHit=1 path=CACHE
DEBUG - 2026-03-30 14:04:33 --> [REQ_ID=410d14a4c42a] [FILTER_AFTER]
DEBUG - 2026-03-30 14:04:33 --> [REQ_ID=410d14a4c42a] [LIFECYCLE][END] status=200 duration_ms=840.39 memory_delta=4194304
INFO - 2026-03-30 14:04:33 --> [REQ_ID=7e99e55ee786] [PERF] Execution time=0.842124
DEBUG - 2026-03-30 14:04:33 --> [REQ_ID=410d14a4c42a] [REQUEST][END]
INFO - 2026-03-30 14:04:33 --> [REQ_ID=410d14a4c42a] [PERF] Execution time=0.884401
DEBUG - 2026-03-30 14:06:22 --> [REQ_ID=0e753133c887] [REQUEST][START] HEAD /
DEBUG - 2026-03-30 14:06:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
ERROR - 2026-03-30 14:06:22 --> [404_ROUTE]
DEBUG - 2026-03-30 14:06:34 --> [REQ_ID=1daee89dbce2] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-30 14:06:34 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-30 14:06:34 --> [REQ_ID=1daee89dbce2] [REQUEST][END]
INFO - 2026-03-30 14:06:34 --> [REQ_ID=1daee89dbce2] [PERF] Execution time=0.019667
DEBUG - 2026-03-30 14:07:18 --> [REQ_ID=da245f8762dd] [REQUEST][START] GET /index.php/How-It-Works/Determining-Your-Financial-Goals
DEBUG - 2026-03-30 14:07:18 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-30 14:07:18 --> [REQ_ID=da245f8762dd] [REQUEST][END]
INFO - 2026-03-30 14:07:18 --> [REQ_ID=da245f8762dd] [PERF] Execution time=0.012653
DEBUG - 2026-03-30 14:11:09 --> [REQ_ID=d38193a96fcb] [REQUEST][START] GET /index.php/How-It-Works/Setting-Financial-Goals
DEBUG - 2026-03-30 14:11:09 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-30 14:11:09 --> [REQ_ID=d38193a96fcb] [FILTER_BEFORE] /index.php/How-It-Works/Setting-Financial-Goals
DEBUG - 2026-03-30 14:11:09 --> [REQ_ID=d38193a96fcb] [ROUTE] Controller=\App\Modules\Blog\Controllers\HowItWorksController Method=SettingFinancialGoals
DEBUG - 2026-03-30 14:11:09 --> [REQ_ID=d38193a96fcb] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/How-It-Works/Setting-Financial-Goals
DEBUG - 2026-03-30 14:11:09 --> [CSRF] token name=csrf_test_name hash=5e7bceb47b1fd45f2bf7fd77e015f8b8
DEBUG - 2026-03-30 14:11:09 --> [REQ_ID=acdef5ee267f] [INIT] App\Modules\Blog\Controllers\HowItWorksController::GET
INFO - 2026-03-30 14:11:09 --> [REQ_ID=acdef5ee267f] [MEMORY][controller-start] 6291456
DEBUG - 2026-03-30 14:11:09 --> [TRACE]
DEBUG - 2026-03-30 14:11:09 --> [REQ_ID=acdef5ee267f] [METHOD_ENTRY] SettingFinancialGoals
DEBUG - 2026-03-30 14:11:09 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-30 14:11:09 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-30 14:11:09 --> MyMICoin initialized ONCE
DEBUG - 2026-03-30 14:11:09 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-30 14:11:09 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-30 14:11:09 --> MyMIWallets skipped (no user context)
INFO - 2026-03-30 14:11:09 --> [REQ_ID=acdef5ee267f] [MEMORY][commonData:start] 6291456
INFO - 2026-03-30 14:11:10 --> themesMemory usage: 10485760
DEBUG - 2026-03-30 14:11:10 --> [MetaService] slug=how-it-works/setting-financial-goals pageName= cacheHit=1 path=CACHE
DEBUG - 2026-03-30 14:11:10 --> [REQ_ID=d38193a96fcb] [FILTER_AFTER]
DEBUG - 2026-03-30 14:11:10 --> [REQ_ID=d38193a96fcb] [LIFECYCLE][END] status=200 duration_ms=681.00 memory_delta=4194304
INFO - 2026-03-30 14:11:10 --> [REQ_ID=acdef5ee267f] [PERF] Execution time=0.682940
DEBUG - 2026-03-30 14:11:10 --> [REQ_ID=d38193a96fcb] [REQUEST][END]
INFO - 2026-03-30 14:11:10 --> [REQ_ID=d38193a96fcb] [PERF] Execution time=0.725471
DEBUG - 2026-03-30 14:11:22 --> [REQ_ID=dd5c0df29601] [REQUEST][START] HEAD /
DEBUG - 2026-03-30 14:11:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
ERROR - 2026-03-30 14:11:22 --> [404_ROUTE]
DEBUG - 2026-03-30 14:15:02 --> [REQ_ID=e5badf764432] [REQUEST][START] GET /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-30 14:15:02 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-30 14:15:02 --> [REQ_ID=e5badf764432] [FILTER_BEFORE] /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-30 14:15:02 --> [REQ_ID=e5badf764432] [ROUTE] Controller=\App\Modules\APIs\Controllers\AlertsAPIController Method=fetchEmailAlerts
DEBUG - 2026-03-30 14:15:02 --> [REQ_ID=e5badf764432] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-30 14:15:02 --> [REQ_ID=e5badf764432] [REQUEST][END]
INFO - 2026-03-30 14:15:02 --> [REQ_ID=e5badf764432] [PERF] Execution time=0.041224
DEBUG - 2026-03-30 14:16:22 --> [REQ_ID=c4db0e4dbf8a] [REQUEST][START] HEAD /
DEBUG - 2026-03-30 14:16:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
ERROR - 2026-03-30 14:16:22 --> [404_ROUTE]
DEBUG - 2026-03-30 14:21:19 --> [REQ_ID=99d41afb1fe5] [REQUEST][START] GET /
DEBUG - 2026-03-30 14:21:19 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-30 14:21:19 --> [REQ_ID=99d41afb1fe5] [FILTER_BEFORE] /
DEBUG - 2026-03-30 14:21:19 --> [REQ_ID=99d41afb1fe5] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-30 14:21:19 --> [REQ_ID=99d41afb1fe5] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-30 14:21:19 --> [CSRF] token name=csrf_test_name hash=81d791e6faac1e55c67c0f165aa9f6d4
DEBUG - 2026-03-30 14:21:19 --> [REQ_ID=ef5d32519031] [INIT] App\Controllers\Home::GET
INFO - 2026-03-30 14:21:19 --> [REQ_ID=ef5d32519031] [MEMORY][controller-start] 6291456
DEBUG - 2026-03-30 14:21:19 --> [TRACE]
INFO - 2026-03-30 14:21:20 --> [REQ_ID=ef5d32519031] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-30 14:21:20 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-30 14:21:20 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-03-30 14:21:20 --> [REQ_ID=ef5d32519031] [VIEW_RENDER] themes/public/home
INFO - 2026-03-30 14:21:20 --> [REQ_ID=ef5d32519031] [MEMORY][commonData:start] 10485760
INFO - 2026-03-30 14:21:20 --> themesMemory usage: 10485760
DEBUG - 2026-03-30 14:21:20 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-30 14:21:20 --> [REQ_ID=99d41afb1fe5] [FILTER_AFTER]
DEBUG - 2026-03-30 14:21:20 --> [REQ_ID=99d41afb1fe5] [LIFECYCLE][END] status=200 duration_ms=661.52 memory_delta=4194304
INFO - 2026-03-30 14:21:20 --> [REQ_ID=ef5d32519031] [PERF] Execution time=0.663955
DEBUG - 2026-03-30 14:21:20 --> [REQ_ID=99d41afb1fe5] [REQUEST][END]
INFO - 2026-03-30 14:21:20 --> [REQ_ID=99d41afb1fe5] [PERF] Execution time=0.701163
DEBUG - 2026-03-30 14:21:20 --> [REQ_ID=25c4602bb366] [REQUEST][START] GET /
DEBUG - 2026-03-30 14:21:20 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-30 14:21:20 --> [REQ_ID=25c4602bb366] [FILTER_BEFORE] /
DEBUG - 2026-03-30 14:21:20 --> [REQ_ID=25c4602bb366] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-30 14:21:20 --> [REQ_ID=25c4602bb366] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-30 14:21:20 --> [CSRF] token name=csrf_test_name hash=81d791e6faac1e55c67c0f165aa9f6d4
DEBUG - 2026-03-30 14:21:20 --> [REQ_ID=72e493c609f3] [INIT] App\Controllers\Home::GET
INFO - 2026-03-30 14:21:20 --> [REQ_ID=72e493c609f3] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-30 14:21:20 --> [TRACE]
INFO - 2026-03-30 14:21:20 --> [REQ_ID=72e493c609f3] [MEMORY][commonData:start] 4194304
DEBUG - 2026-03-30 14:21:20 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-30 14:21:21 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
DEBUG - 2026-03-30 14:21:21 --> [REQ_ID=72e493c609f3] [VIEW_RENDER] themes/public/home
INFO - 2026-03-30 14:21:21 --> [REQ_ID=72e493c609f3] [MEMORY][commonData:start] 8388608
INFO - 2026-03-30 14:21:21 --> themesMemory usage: 8388608
DEBUG - 2026-03-30 14:21:21 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-30 14:21:21 --> [REQ_ID=25c4602bb366] [FILTER_AFTER]
DEBUG - 2026-03-30 14:21:21 --> [REQ_ID=25c4602bb366] [LIFECYCLE][END] status=200 duration_ms=520.78 memory_delta=4194304
INFO - 2026-03-30 14:21:21 --> [REQ_ID=72e493c609f3] [PERF] Execution time=0.520848
DEBUG - 2026-03-30 14:21:21 --> [REQ_ID=25c4602bb366] [REQUEST][END]
INFO - 2026-03-30 14:21:21 --> [REQ_ID=25c4602bb366] [PERF] Execution time=0.529778
DEBUG - 2026-03-30 14:21:22 --> [REQ_ID=7a348c28a00f] [REQUEST][START] HEAD /
DEBUG - 2026-03-30 14:21:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
ERROR - 2026-03-30 14:21:22 --> [404_ROUTE]
DEBUG - 2026-03-30 14:24:18 --> [REQ_ID=6f42d85d3af3] [REQUEST][START] GET /index.php/Premium_Features/Brokerage-Integrations
DEBUG - 2026-03-30 14:24:18 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
INFO - 2026-03-30 14:24:18 --> REDIRECTED ROUTE at https://www.mymiwallet.com/Features/Brokerage-Integrations
DEBUG - 2026-03-30 14:24:18 --> [REQ_ID=6f42d85d3af3] [REQUEST][END]
INFO - 2026-03-30 14:24:18 --> [REQ_ID=6f42d85d3af3] [PERF] Execution time=0.037330
DEBUG - 2026-03-30 14:26:22 --> [REQ_ID=3f7521795622] [REQUEST][START] HEAD /
DEBUG - 2026-03-30 14:26:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
ERROR - 2026-03-30 14:26:22 --> [404_ROUTE]
DEBUG - 2026-03-30 14:26:32 --> [REQ_ID=d38a8e282a22] [REQUEST][START] GET /index.php/Premium-Features/Due-Diligence-Database
DEBUG - 2026-03-30 14:26:32 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
INFO - 2026-03-30 14:26:32 --> REDIRECTED ROUTE at https://www.mymiwallet.com/Features/Brokerage-Integrations
DEBUG - 2026-03-30 14:26:32 --> [REQ_ID=d38a8e282a22] [REQUEST][END]
INFO - 2026-03-30 14:26:32 --> [REQ_ID=d38a8e282a22] [PERF] Execution time=0.016482
DEBUG - 2026-03-30 14:31:22 --> [REQ_ID=5493bed92f39] [REQUEST][START] HEAD /
DEBUG - 2026-03-30 14:31:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
ERROR - 2026-03-30 14:31:22 --> [404_ROUTE]
DEBUG - 2026-03-30 14:36:22 --> [REQ_ID=de861d3e7e57] [REQUEST][START] HEAD /
DEBUG - 2026-03-30 14:36:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
ERROR - 2026-03-30 14:36:22 --> [404_ROUTE]
DEBUG - 2026-03-30 14:41:22 --> [REQ_ID=6c4cc9836ee9] [REQUEST][START] HEAD /
DEBUG - 2026-03-30 14:41:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
ERROR - 2026-03-30 14:41:22 --> [404_ROUTE]
DEBUG - 2026-03-30 14:44:04 --> [REQ_ID=87f43bab91e2] [REQUEST][START] GET /index.php/How-It-Works/earnings
DEBUG - 2026-03-30 14:44:04 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-30 14:44:04 --> [REQ_ID=87f43bab91e2] [REQUEST][END]
INFO - 2026-03-30 14:44:04 --> [REQ_ID=87f43bab91e2] [PERF] Execution time=0.036830
DEBUG - 2026-03-30 14:46:22 --> [REQ_ID=fc3b3eaf4728] [REQUEST][START] HEAD /
DEBUG - 2026-03-30 14:46:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
ERROR - 2026-03-30 14:46:22 --> [404_ROUTE]
DEBUG - 2026-03-30 14:51:22 --> [REQ_ID=2eaf3d91a5f7] [REQUEST][START] HEAD /
DEBUG - 2026-03-30 14:51:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
ERROR - 2026-03-30 14:51:22 --> [404_ROUTE]
DEBUG - 2026-03-30 14:51:36 --> [REQ_ID=a7e7ad9e6eb0] [REQUEST][START] GET /index.php/Terms-Of-Service
DEBUG - 2026-03-30 14:51:36 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-30 14:51:36 --> [REQ_ID=a7e7ad9e6eb0] [FILTER_BEFORE] /index.php/Terms-Of-Service
DEBUG - 2026-03-30 14:51:36 --> [REQ_ID=a7e7ad9e6eb0] [ROUTE] Controller=\App\Controllers\Home Method=termsOfService
DEBUG - 2026-03-30 14:51:36 --> [REQ_ID=a7e7ad9e6eb0] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Terms-Of-Service
DEBUG - 2026-03-30 14:51:36 --> [CSRF] token name=csrf_test_name hash=896cf22904a93b8e4ce630eabd4d5eda
DEBUG - 2026-03-30 14:51:36 --> [REQ_ID=f9666c6d0f71] [INIT] App\Controllers\Home::GET
INFO - 2026-03-30 14:51:36 --> [REQ_ID=f9666c6d0f71] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-30 14:51:36 --> [TRACE]
INFO - 2026-03-30 14:51:36 --> [REQ_ID=f9666c6d0f71] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-30 14:51:36 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-30 14:51:37 --> [MetaService] slug=terms-of-service pageName= cacheHit= path=DB
DEBUG - 2026-03-30 14:51:37 --> [REQ_ID=f9666c6d0f71] [VIEW_RENDER] themes/public/termsOfService
INFO - 2026-03-30 14:51:37 --> [REQ_ID=f9666c6d0f71] [MEMORY][commonData:start] 8388608
INFO - 2026-03-30 14:51:37 --> themesMemory usage: 8388608
DEBUG - 2026-03-30 14:51:37 --> [MetaService] slug=terms-of-service pageName=Terms of Service cacheHit= path=DB
DEBUG - 2026-03-30 14:51:37 --> [REQ_ID=a7e7ad9e6eb0] [FILTER_AFTER]
DEBUG - 2026-03-30 14:51:37 --> [REQ_ID=a7e7ad9e6eb0] [LIFECYCLE][END] status=200 duration_ms=649.75 memory_delta=4194304
INFO - 2026-03-30 14:51:37 --> [REQ_ID=f9666c6d0f71] [PERF] Execution time=0.652887
DEBUG - 2026-03-30 14:51:37 --> [REQ_ID=a7e7ad9e6eb0] [REQUEST][END]
INFO - 2026-03-30 14:51:37 --> [REQ_ID=a7e7ad9e6eb0] [PERF] Execution time=0.669232
DEBUG - 2026-03-30 14:52:17 --> [REQ_ID=d10421f3ba2f] [REQUEST][START] GET /index.php/Budget/Financial-Advisors
DEBUG - 2026-03-30 14:52:17 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
INFO - 2026-03-30 14:52:17 --> REDIRECTED ROUTE at https://www.mymiwallet.com/Advisor
DEBUG - 2026-03-30 14:52:17 --> [REQ_ID=d10421f3ba2f] [REQUEST][END]
INFO - 2026-03-30 14:52:17 --> [REQ_ID=d10421f3ba2f] [PERF] Execution time=0.012632
DEBUG - 2026-03-30 14:56:22 --> [REQ_ID=8513bd592a52] [REQUEST][START] HEAD /
DEBUG - 2026-03-30 14:56:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
ERROR - 2026-03-30 14:56:22 --> [404_ROUTE]
DEBUG - 2026-03-30 15:00:01 --> [REQ_ID=3b032239b5b5] [REQUEST][START] GET /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-30 15:00:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-30 15:00:01 --> [REQ_ID=3b032239b5b5] [FILTER_BEFORE] /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-30 15:00:01 --> [REQ_ID=3b032239b5b5] [ROUTE] Controller=\App\Modules\Management\Controllers\ManagementAPIController Method=Run_CRON_Tasks
DEBUG - 2026-03-30 15:00:01 --> [REQ_ID=3b032239b5b5] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-30 15:00:01 --> [REQ_ID=3b032239b5b5] [REQUEST][END]
INFO - 2026-03-30 15:00:01 --> [REQ_ID=3b032239b5b5] [PERF] Execution time=0.044376
DEBUG - 2026-03-30 15:01:14 --> [REQ_ID=c744050cdf43] [REQUEST][START] GET /index.php/Account/Connected-Accounts
DEBUG - 2026-03-30 15:01:14 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-30 15:01:14 --> [REQ_ID=c744050cdf43] [FILTER_BEFORE] /index.php/Account/Connected-Accounts
DEBUG - 2026-03-30 15:01:14 --> [REQ_ID=c744050cdf43] [ROUTE] Controller=\App\Modules\User\Controllers\DashboardController Method=connectedAccounts
DEBUG - 2026-03-30 15:01:14 --> [REQ_ID=c744050cdf43] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Account/Connected-Accounts
DEBUG - 2026-03-30 15:01:14 --> [CSRF] token name=csrf_test_name hash=964a1d65ef8943c21f06dfdc94f19f0f
DEBUG - 2026-03-30 15:01:14 --> [REQ_ID=c744050cdf43] [REQUEST][END]
INFO - 2026-03-30 15:01:14 --> [REQ_ID=c744050cdf43] [PERF] Execution time=0.028995
DEBUG - 2026-03-30 15:01:15 --> [REQ_ID=293e9a005f3a] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-30 15:01:15 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-30 15:01:15 --> [REQ_ID=293e9a005f3a] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-30 15:01:15 --> [REQ_ID=293e9a005f3a] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-30 15:01:15 --> [REQ_ID=293e9a005f3a] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-30 15:01:15 --> [CSRF] token name=csrf_test_name hash=c297dd7cab32b34bcf8f9b36308ef8a4
DEBUG - 2026-03-30 15:01:15 --> [REQ_ID=5ead77518957] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-30 15:01:15 --> [REQ_ID=5ead77518957] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-30 15:01:15 --> [TRACE]
DEBUG - 2026-03-30 15:01:15 --> [REQ_ID=293e9a005f3a] [FILTER_AFTER]
DEBUG - 2026-03-30 15:01:15 --> [REQ_ID=293e9a005f3a] [LIFECYCLE][END] status=200 duration_ms=129.87 memory_delta=0
INFO - 2026-03-30 15:01:15 --> [REQ_ID=5ead77518957] [PERF] Execution time=0.133483
DEBUG - 2026-03-30 15:01:15 --> [REQ_ID=293e9a005f3a] [REQUEST][END]
INFO - 2026-03-30 15:01:15 --> [REQ_ID=293e9a005f3a] [PERF] Execution time=0.145158
DEBUG - 2026-03-30 15:01:22 --> [REQ_ID=3863355aaef0] [REQUEST][START] HEAD /
DEBUG - 2026-03-30 15:01:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
ERROR - 2026-03-30 15:01:22 --> [404_ROUTE]
DEBUG - 2026-03-30 15:04:28 --> [REQ_ID=8d9b38979e8a] [REQUEST][START] GET /index.php/register/success
DEBUG - 2026-03-30 15:04:28 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-30 15:04:28 --> [REQ_ID=8d9b38979e8a] [FILTER_BEFORE] /index.php/register/success
DEBUG - 2026-03-30 15:04:28 --> [REQ_ID=8d9b38979e8a] [ROUTE] Controller=\App\Controllers\AuthController Method=registerSuccess
DEBUG - 2026-03-30 15:04:28 --> [REQ_ID=8d9b38979e8a] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/register/success
DEBUG - 2026-03-30 15:04:28 --> [CSRF] token name=csrf_test_name hash=32192c5f438f50db60e0a8bf28a9beb0
DEBUG - 2026-03-30 15:04:28 --> [REQ_ID=a78f07fd4109] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-30 15:04:28 --> [REQ_ID=a78f07fd4109] [MEMORY][controller-start] 6291456
DEBUG - 2026-03-30 15:04:28 --> [TRACE]
INFO - 2026-03-30 15:04:28 --> AuthController::registerSuccess view rendered.
CRITICAL - 2026-03-30 15:04:28 --> [VIEW ERROR]
INFO - 2026-03-30 15:04:28 --> [REQ_ID=a78f07fd4109] [PERF] Execution time=0.135421
DEBUG - 2026-03-30 15:05:47 --> [REQ_ID=365443ad5c24] [REQUEST][START] GET /index.php/How-To-Guides
DEBUG - 2026-03-30 15:05:47 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
INFO - 2026-03-30 15:05:47 --> REDIRECTED ROUTE at https://www.mymiwallet.com/Knowledgebase/Tutorials
DEBUG - 2026-03-30 15:05:47 --> [REQ_ID=365443ad5c24] [REQUEST][END]
INFO - 2026-03-30 15:05:47 --> [REQ_ID=365443ad5c24] [PERF] Execution time=0.018960
DEBUG - 2026-03-30 15:06:11 --> [REQ_ID=aec803335a95] [REQUEST][START] GET /index.php/Knowledgebase/Getting-Started
DEBUG - 2026-03-30 15:06:11 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-30 15:06:11 --> [REQ_ID=aec803335a95] [REQUEST][END]
INFO - 2026-03-30 15:06:11 --> [REQ_ID=aec803335a95] [PERF] Execution time=0.013182
DEBUG - 2026-03-30 15:06:22 --> [REQ_ID=942e7ecd2700] [REQUEST][START] HEAD /
DEBUG - 2026-03-30 15:06:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
ERROR - 2026-03-30 15:06:22 --> [404_ROUTE]
DEBUG - 2026-03-30 15:08:18 --> [REQ_ID=2bcecf2e2ea6] [REQUEST][START] GET /index.php/Investments/News
DEBUG - 2026-03-30 15:08:18 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-30 15:08:18 --> [REQ_ID=2bcecf2e2ea6] [FILTER_BEFORE] /index.php/Investments/News
DEBUG - 2026-03-30 15:08:18 --> [REQ_ID=2bcecf2e2ea6] [ROUTE] Controller=closure_route Method=index
DEBUG - 2026-03-30 15:08:18 --> [REQ_ID=2bcecf2e2ea6] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Investments/News
DEBUG - 2026-03-30 15:08:18 --> [CSRF] token name=csrf_test_name hash=8c5dfa0e6af3d1112ab9b09a5f660706
DEBUG - 2026-03-30 15:08:18 --> [REQ_ID=2bcecf2e2ea6] [REQUEST][END]
INFO - 2026-03-30 15:08:18 --> [REQ_ID=2bcecf2e2ea6] [PERF] Execution time=0.042270
DEBUG - 2026-03-30 15:08:18 --> [REQ_ID=a5f4aae17efb] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-30 15:08:18 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-30 15:08:18 --> [REQ_ID=a5f4aae17efb] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-30 15:08:18 --> [REQ_ID=a5f4aae17efb] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-30 15:08:18 --> [REQ_ID=a5f4aae17efb] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-30 15:08:18 --> [CSRF] token name=csrf_test_name hash=1d10f46ea42f8bf58a35b65e155fea3a
DEBUG - 2026-03-30 15:08:18 --> [REQ_ID=1681032877c7] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-30 15:08:18 --> [REQ_ID=1681032877c7] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-30 15:08:18 --> [TRACE]
DEBUG - 2026-03-30 15:08:18 --> [REQ_ID=a5f4aae17efb] [FILTER_AFTER]
DEBUG - 2026-03-30 15:08:18 --> [REQ_ID=a5f4aae17efb] [LIFECYCLE][END] status=200 duration_ms=123.41 memory_delta=0
INFO - 2026-03-30 15:08:18 --> [REQ_ID=1681032877c7] [PERF] Execution time=0.126927
DEBUG - 2026-03-30 15:08:18 --> [REQ_ID=a5f4aae17efb] [REQUEST][END]
INFO - 2026-03-30 15:08:18 --> [REQ_ID=a5f4aae17efb] [PERF] Execution time=0.142956
DEBUG - 2026-03-30 15:11:22 --> [REQ_ID=2030967ac1ff] [REQUEST][START] HEAD /
DEBUG - 2026-03-30 15:11:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
ERROR - 2026-03-30 15:11:22 --> [404_ROUTE]
DEBUG - 2026-03-30 15:15:01 --> [REQ_ID=cee11e254ff3] [REQUEST][START] GET /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-30 15:15:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-30 15:15:01 --> [REQ_ID=cee11e254ff3] [FILTER_BEFORE] /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-30 15:15:01 --> [REQ_ID=cee11e254ff3] [ROUTE] Controller=\App\Modules\APIs\Controllers\AlertsAPIController Method=fetchEmailAlerts
DEBUG - 2026-03-30 15:15:01 --> [REQ_ID=cee11e254ff3] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-30 15:15:01 --> [REQ_ID=cee11e254ff3] [REQUEST][END]
INFO - 2026-03-30 15:15:01 --> [REQ_ID=cee11e254ff3] [PERF] Execution time=0.045113
DEBUG - 2026-03-30 15:16:22 --> [REQ_ID=73228155cc9c] [REQUEST][START] HEAD /
DEBUG - 2026-03-30 15:16:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
ERROR - 2026-03-30 15:16:22 --> [404_ROUTE]
DEBUG - 2026-03-30 15:21:16 --> [REQ_ID=aee5b2461d0f] [REQUEST][START] GET /index.php/Legal/Terms-And-Conditions
DEBUG - 2026-03-30 15:21:16 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-30 15:21:16 --> [REQ_ID=aee5b2461d0f] [FILTER_BEFORE] /index.php/Legal/Terms-And-Conditions
DEBUG - 2026-03-30 15:21:16 --> [REQ_ID=aee5b2461d0f] [ROUTE] Controller=\App\Controllers\Home Method=terms
DEBUG - 2026-03-30 15:21:16 --> [REQ_ID=aee5b2461d0f] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Legal/Terms-And-Conditions
DEBUG - 2026-03-30 15:21:16 --> [CSRF] token name=csrf_test_name hash=dae4f3ffdbfbce6eeb0846dd2e99ecee
DEBUG - 2026-03-30 15:21:16 --> [REQ_ID=aee5b2461d0f] [REQUEST][END]
INFO - 2026-03-30 15:21:16 --> [REQ_ID=aee5b2461d0f] [PERF] Execution time=0.047222
DEBUG - 2026-03-30 15:21:16 --> [REQ_ID=3a39b032f38e] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-30 15:21:16 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-30 15:21:17 --> [REQ_ID=3a39b032f38e] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-30 15:21:17 --> [REQ_ID=3a39b032f38e] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-30 15:21:17 --> [REQ_ID=3a39b032f38e] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-30 15:21:17 --> [CSRF] token name=csrf_test_name hash=a90016aaec59b398088d91a18f981d4a
DEBUG - 2026-03-30 15:21:17 --> [REQ_ID=16105919a86b] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-30 15:21:17 --> [REQ_ID=16105919a86b] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-30 15:21:17 --> [TRACE]
DEBUG - 2026-03-30 15:21:17 --> [REQ_ID=3a39b032f38e] [FILTER_AFTER]
DEBUG - 2026-03-30 15:21:17 --> [REQ_ID=3a39b032f38e] [LIFECYCLE][END] status=200 duration_ms=452.27 memory_delta=0
INFO - 2026-03-30 15:21:17 --> [REQ_ID=16105919a86b] [PERF] Execution time=0.455780
DEBUG - 2026-03-30 15:21:17 --> [REQ_ID=3a39b032f38e] [REQUEST][END]
INFO - 2026-03-30 15:21:17 --> [REQ_ID=3a39b032f38e] [PERF] Execution time=0.469263
DEBUG - 2026-03-30 15:21:22 --> [REQ_ID=3d61c1681553] [REQUEST][START] HEAD /
DEBUG - 2026-03-30 15:21:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
ERROR - 2026-03-30 15:21:22 --> [404_ROUTE]
DEBUG - 2026-03-30 15:22:33 --> [REQ_ID=1a0d3adac6ea] [REQUEST][START] GET /index.php/Assets
DEBUG - 2026-03-30 15:22:33 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-30 15:22:33 --> [REQ_ID=1a0d3adac6ea] [FILTER_BEFORE] /index.php/Assets
DEBUG - 2026-03-30 15:22:33 --> [REQ_ID=1a0d3adac6ea] [ROUTE] Controller=\App\Modules\Management\Controllers\AssetsController Method=index
DEBUG - 2026-03-30 15:22:33 --> [REQ_ID=1a0d3adac6ea] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Assets
DEBUG - 2026-03-30 15:22:33 --> [CSRF] token name=csrf_test_name hash=6c191ec9cab46ad10d4c80451524e061
DEBUG - 2026-03-30 15:22:33 --> [REQ_ID=1a0d3adac6ea] [REQUEST][END]
INFO - 2026-03-30 15:22:33 --> [REQ_ID=1a0d3adac6ea] [PERF] Execution time=0.016199
DEBUG - 2026-03-30 15:22:34 --> [REQ_ID=0f13f47b264f] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-30 15:22:34 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-30 15:22:34 --> [REQ_ID=0f13f47b264f] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-30 15:22:34 --> [REQ_ID=0f13f47b264f] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-30 15:22:34 --> [REQ_ID=0f13f47b264f] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-30 15:22:34 --> [CSRF] token name=csrf_test_name hash=ac373afdbbf0f749c1607423aa2d9f84
DEBUG - 2026-03-30 15:22:34 --> [REQ_ID=459d84e059e5] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-30 15:22:34 --> [REQ_ID=459d84e059e5] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-30 15:22:34 --> [TRACE]
DEBUG - 2026-03-30 15:22:34 --> [REQ_ID=0f13f47b264f] [FILTER_AFTER]
DEBUG - 2026-03-30 15:22:34 --> [REQ_ID=0f13f47b264f] [LIFECYCLE][END] status=200 duration_ms=146.07 memory_delta=0
INFO - 2026-03-30 15:22:34 --> [REQ_ID=459d84e059e5] [PERF] Execution time=0.149716
DEBUG - 2026-03-30 15:22:34 --> [REQ_ID=0f13f47b264f] [REQUEST][END]
INFO - 2026-03-30 15:22:34 --> [REQ_ID=0f13f47b264f] [PERF] Execution time=0.331350
DEBUG - 2026-03-30 15:22:42 --> [REQ_ID=e4b1985eb828] [REQUEST][START] GET /index.php/register/success
DEBUG - 2026-03-30 15:22:42 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-30 15:22:42 --> [REQ_ID=e4b1985eb828] [FILTER_BEFORE] /index.php/register/success
DEBUG - 2026-03-30 15:22:42 --> [REQ_ID=e4b1985eb828] [ROUTE] Controller=\App\Controllers\AuthController Method=registerSuccess
DEBUG - 2026-03-30 15:22:42 --> [REQ_ID=e4b1985eb828] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/register/success
DEBUG - 2026-03-30 15:22:42 --> [CSRF] token name=csrf_test_name hash=5f403b42a40f5b86c76a6f006246eacd
DEBUG - 2026-03-30 15:22:42 --> [REQ_ID=da05ee5abe7c] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-30 15:22:42 --> [REQ_ID=da05ee5abe7c] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-30 15:22:42 --> [TRACE]
CRITICAL - 2026-03-30 15:22:42 --> [REGISTER_SUCCESS_TRACE] step=1 entered
CRITICAL - 2026-03-30 15:22:42 --> [REGISTER_SUCCESS_TRACE] step=2 data prepared
CRITICAL - 2026-03-30 15:22:42 --> [REGISTER_SUCCESS_TRACE] step=3 raw view rendered length=361
DEBUG - 2026-03-30 15:22:43 --> [REQ_ID=e4b1985eb828] [FILTER_AFTER]
DEBUG - 2026-03-30 15:22:43 --> [REQ_ID=e4b1985eb828] [LIFECYCLE][END] status=200 duration_ms=90.72 memory_delta=0
INFO - 2026-03-30 15:22:43 --> [REQ_ID=da05ee5abe7c] [PERF] Execution time=0.091139
DEBUG - 2026-03-30 15:22:43 --> [REQ_ID=e4b1985eb828] [REQUEST][END]
INFO - 2026-03-30 15:22:43 --> [REQ_ID=e4b1985eb828] [PERF] Execution time=0.101106
DEBUG - 2026-03-30 15:26:22 --> [REQ_ID=9362654e0146] [REQUEST][START] HEAD /
DEBUG - 2026-03-30 15:26:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
ERROR - 2026-03-30 15:26:22 --> [404_ROUTE]
DEBUG - 2026-03-30 15:31:22 --> [REQ_ID=c4ae303dbab8] [REQUEST][START] HEAD /
DEBUG - 2026-03-30 15:31:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
ERROR - 2026-03-30 15:31:22 --> [404_ROUTE]
DEBUG - 2026-03-30 15:33:32 --> [REQ_ID=916617c4f2e6] [REQUEST][START] GET /index.php/register/success
DEBUG - 2026-03-30 15:33:32 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-30 15:33:32 --> [REQ_ID=916617c4f2e6] [FILTER_BEFORE] /index.php/register/success
DEBUG - 2026-03-30 15:33:32 --> [REQ_ID=916617c4f2e6] [ROUTE] Controller=\App\Controllers\AuthController Method=registerSuccess
DEBUG - 2026-03-30 15:33:32 --> [REQ_ID=916617c4f2e6] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/register/success
DEBUG - 2026-03-30 15:33:32 --> [CSRF] token name=csrf_test_name hash=5f403b42a40f5b86c76a6f006246eacd
DEBUG - 2026-03-30 15:33:32 --> [REQ_ID=ce260bed5e91] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-30 15:33:32 --> [REQ_ID=ce260bed5e91] [MEMORY][controller-start] 6291456
DEBUG - 2026-03-30 15:33:32 --> [TRACE]
CRITICAL - 2026-03-30 15:33:32 --> [REGISTER_SUCCESS_TRACE] step=1 entered
CRITICAL - 2026-03-30 15:33:32 --> [REGISTER_SUCCESS_TRACE] step=2 data prepared
CRITICAL - 2026-03-30 15:33:32 --> [REGISTER_SUCCESS_TRACE] step=3 raw view rendered length=15518
DEBUG - 2026-03-30 15:33:32 --> [REQ_ID=916617c4f2e6] [FILTER_AFTER]
DEBUG - 2026-03-30 15:33:32 --> [REQ_ID=916617c4f2e6] [LIFECYCLE][END] status=200 duration_ms=85.18 memory_delta=0
INFO - 2026-03-30 15:33:32 --> [REQ_ID=ce260bed5e91] [PERF] Execution time=0.087688
DEBUG - 2026-03-30 15:33:32 --> [REQ_ID=916617c4f2e6] [REQUEST][END]
INFO - 2026-03-30 15:33:32 --> [REQ_ID=916617c4f2e6] [PERF] Execution time=0.127305
DEBUG - 2026-03-30 15:33:40 --> [REQ_ID=790030707e30] [REQUEST][START] GET /index.php/register/success
DEBUG - 2026-03-30 15:33:40 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-30 15:33:40 --> [REQ_ID=790030707e30] [FILTER_BEFORE] /index.php/register/success
DEBUG - 2026-03-30 15:33:40 --> [REQ_ID=790030707e30] [ROUTE] Controller=\App\Controllers\AuthController Method=registerSuccess
DEBUG - 2026-03-30 15:33:40 --> [REQ_ID=790030707e30] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/register/success
DEBUG - 2026-03-30 15:33:40 --> [CSRF] token name=csrf_test_name hash=5f403b42a40f5b86c76a6f006246eacd
DEBUG - 2026-03-30 15:33:40 --> [REQ_ID=c22f4ea806c5] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-30 15:33:40 --> [REQ_ID=c22f4ea806c5] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-30 15:33:40 --> [TRACE]
CRITICAL - 2026-03-30 15:33:40 --> [REGISTER_SUCCESS_TRACE] step=1 entered
CRITICAL - 2026-03-30 15:33:40 --> [REGISTER_SUCCESS_TRACE] step=2 data prepared
CRITICAL - 2026-03-30 15:33:40 --> [REGISTER_SUCCESS_TRACE] step=3 raw view rendered length=15518
DEBUG - 2026-03-30 15:33:40 --> [REQ_ID=790030707e30] [FILTER_AFTER]
DEBUG - 2026-03-30 15:33:40 --> [REQ_ID=790030707e30] [LIFECYCLE][END] status=200 duration_ms=21.48 memory_delta=0
INFO - 2026-03-30 15:33:40 --> [REQ_ID=c22f4ea806c5] [PERF] Execution time=0.021428
DEBUG - 2026-03-30 15:33:40 --> [REQ_ID=790030707e30] [REQUEST][END]
INFO - 2026-03-30 15:33:40 --> [REQ_ID=790030707e30] [PERF] Execution time=0.031138
DEBUG - 2026-03-30 15:33:50 --> [REQ_ID=f1f3d6d86823] [REQUEST][START] GET /index.php/register/success
DEBUG - 2026-03-30 15:33:50 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-30 15:33:50 --> [REQ_ID=f1f3d6d86823] [FILTER_BEFORE] /index.php/register/success
DEBUG - 2026-03-30 15:33:50 --> [REQ_ID=f1f3d6d86823] [ROUTE] Controller=\App\Controllers\AuthController Method=registerSuccess
DEBUG - 2026-03-30 15:33:50 --> [REQ_ID=f1f3d6d86823] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/register/success
DEBUG - 2026-03-30 15:33:50 --> [CSRF] token name=csrf_test_name hash=5f403b42a40f5b86c76a6f006246eacd
DEBUG - 2026-03-30 15:33:50 --> [REQ_ID=52fe0936ef44] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-30 15:33:50 --> [REQ_ID=52fe0936ef44] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-30 15:33:50 --> [TRACE]
CRITICAL - 2026-03-30 15:33:50 --> [REGISTER_SUCCESS_TRACE] step=1 entered
CRITICAL - 2026-03-30 15:33:50 --> [REGISTER_SUCCESS_TRACE] step=2 data prepared
CRITICAL - 2026-03-30 15:33:50 --> [REGISTER_SUCCESS_TRACE] step=3 raw view rendered length=15518
DEBUG - 2026-03-30 15:33:50 --> [REQ_ID=f1f3d6d86823] [FILTER_AFTER]
DEBUG - 2026-03-30 15:33:50 --> [REQ_ID=f1f3d6d86823] [LIFECYCLE][END] status=200 duration_ms=21.13 memory_delta=0
INFO - 2026-03-30 15:33:50 --> [REQ_ID=52fe0936ef44] [PERF] Execution time=0.021476
DEBUG - 2026-03-30 15:33:50 --> [REQ_ID=f1f3d6d86823] [REQUEST][END]
INFO - 2026-03-30 15:33:50 --> [REQ_ID=f1f3d6d86823] [PERF] Execution time=0.031371
DEBUG - 2026-03-30 15:35:22 --> [REQ_ID=a246d74dc141] [REQUEST][START] GET /
DEBUG - 2026-03-30 15:35:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-30 15:35:22 --> [REQ_ID=a246d74dc141] [REQUEST][END]
INFO - 2026-03-30 15:35:22 --> [REQ_ID=a246d74dc141] [PERF] Execution time=0.033571
ERROR - 2026-03-30 15:35:22 --> Table 'mymiwallet.bf_route_error_heatmap' doesn't exist
in SYSTEMPATH/Database/MySQLi/Connection.php on line 300.
 1 SYSTEMPATH/Database/MySQLi/Connection.php(300): mysqli->query('SELECT *
FROM `bf_route_error_heatmap`
WHERE `route` = \'/index.php/\'
AND `error_type` = \'http_403\'
AND `status_code` = 403
 LIMIT 1', 0)
 2 SYSTEMPATH/Database/BaseConnection.php(769): CodeIgniter\Database\MySQLi\Connection->execute('SELECT *
FROM `bf_route_error_heatmap`
WHERE `route` = \'/index.php/\'
AND `error_type` = \'http_403\'
AND `status_code` = 403
 LIMIT 1')
 3 SYSTEMPATH/Database/BaseConnection.php(686): CodeIgniter\Database\BaseConnection->simpleQuery('SELECT *
FROM `bf_route_error_heatmap`
WHERE `route` = \'/index.php/\'
AND `error_type` = \'http_403\'
AND `status_code` = 403
 LIMIT 1')
 4 SYSTEMPATH/Database/BaseBuilder.php(1649): CodeIgniter\Database\BaseConnection->query('SELECT *
FROM `bf_route_error_heatmap`
WHERE `route` = :route:
AND `error_type` = :error_type:
AND `status_code` = :status_code:
 LIMIT 1', [...], false)
 5 SYSTEMPATH/Model.php(296): CodeIgniter\Database\BaseBuilder->get()
 6 SYSTEMPATH/BaseModel.php(713): CodeIgniter\Model->doFirst()
 7 APPPATH/Services/AIOps/RouteErrorHeatmapService.php(28): CodeIgniter\BaseModel->first()
 8 APPPATH/Config/Events.php(65): App\Services\AIOps\RouteErrorHeatmapService->record('/index.php/', 'http_403', 403)
 9 SYSTEMPATH/Events/Events.php(152): CodeIgniter\Events\Events::Config\{closure}()
10 SYSTEMPATH/CodeIgniter.php(357): CodeIgniter\Events\Events::trigger('post_system')
11 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
12 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
13 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
DEBUG - 2026-03-30 15:35:22 --> Route heatmap post_system hook skipped: Table 'mymiwallet.bf_route_error_heatmap' doesn't exist
DEBUG - 2026-03-30 15:36:22 --> [REQ_ID=68b0970e52c0] [REQUEST][START] HEAD /
DEBUG - 2026-03-30 15:36:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
ERROR - 2026-03-30 15:36:22 --> [404_ROUTE]
DEBUG - 2026-03-30 15:36:43 --> [REQ_ID=cca1718196f3] [REQUEST][START] GET /index.php/register/success
DEBUG - 2026-03-30 15:36:43 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-30 15:36:43 --> [REQ_ID=cca1718196f3] [FILTER_BEFORE] /index.php/register/success
DEBUG - 2026-03-30 15:36:43 --> [REQ_ID=cca1718196f3] [ROUTE] Controller=\App\Controllers\AuthController Method=registerSuccess
DEBUG - 2026-03-30 15:36:43 --> [REQ_ID=cca1718196f3] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/register/success
DEBUG - 2026-03-30 15:36:43 --> [CSRF] token name=csrf_test_name hash=5f403b42a40f5b86c76a6f006246eacd
DEBUG - 2026-03-30 15:36:43 --> [REQ_ID=79edc286c9e0] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-30 15:36:43 --> [REQ_ID=79edc286c9e0] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-30 15:36:43 --> [TRACE]
CRITICAL - 2026-03-30 15:36:43 --> [REGISTER_SUCCESS_TRACE] step=1 entered
CRITICAL - 2026-03-30 15:36:43 --> [REGISTER_SUCCESS_TRACE] step=2 data prepared
CRITICAL - 2026-03-30 15:36:43 --> [REGISTER_SUCCESS_TRACE] step=3 raw view rendered length=18630
DEBUG - 2026-03-30 15:36:43 --> [REQ_ID=cca1718196f3] [FILTER_AFTER]
DEBUG - 2026-03-30 15:36:43 --> [REQ_ID=cca1718196f3] [LIFECYCLE][END] status=200 duration_ms=209.32 memory_delta=0
INFO - 2026-03-30 15:36:43 --> [REQ_ID=79edc286c9e0] [PERF] Execution time=0.210795
DEBUG - 2026-03-30 15:36:43 --> [REQ_ID=cca1718196f3] [REQUEST][END]
INFO - 2026-03-30 15:36:43 --> [REQ_ID=cca1718196f3] [PERF] Execution time=0.226669
DEBUG - 2026-03-30 15:36:48 --> [REQ_ID=bf0042e88f0d] [REQUEST][START] GET /index.php/register/success
DEBUG - 2026-03-30 15:36:48 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-30 15:36:48 --> [REQ_ID=bf0042e88f0d] [FILTER_BEFORE] /index.php/register/success
DEBUG - 2026-03-30 15:36:48 --> [REQ_ID=bf0042e88f0d] [ROUTE] Controller=\App\Controllers\AuthController Method=registerSuccess
DEBUG - 2026-03-30 15:36:48 --> [REQ_ID=bf0042e88f0d] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/register/success
DEBUG - 2026-03-30 15:36:48 --> [CSRF] token name=csrf_test_name hash=5f403b42a40f5b86c76a6f006246eacd
DEBUG - 2026-03-30 15:36:48 --> [REQ_ID=996b09905b4f] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-30 15:36:48 --> [REQ_ID=996b09905b4f] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-30 15:36:48 --> [TRACE]
CRITICAL - 2026-03-30 15:36:48 --> [REGISTER_SUCCESS_TRACE] step=1 entered
CRITICAL - 2026-03-30 15:36:48 --> [REGISTER_SUCCESS_TRACE] step=2 data prepared
CRITICAL - 2026-03-30 15:36:48 --> [REGISTER_SUCCESS_TRACE] step=3 raw view rendered length=18630
DEBUG - 2026-03-30 15:36:48 --> [REQ_ID=bf0042e88f0d] [FILTER_AFTER]
DEBUG - 2026-03-30 15:36:48 --> [REQ_ID=bf0042e88f0d] [LIFECYCLE][END] status=200 duration_ms=26.56 memory_delta=0
INFO - 2026-03-30 15:36:48 --> [REQ_ID=996b09905b4f] [PERF] Execution time=0.026587
DEBUG - 2026-03-30 15:36:48 --> [REQ_ID=bf0042e88f0d] [REQUEST][END]
INFO - 2026-03-30 15:36:48 --> [REQ_ID=bf0042e88f0d] [PERF] Execution time=0.035709
DEBUG - 2026-03-30 15:41:22 --> [REQ_ID=1f2f5cd23e83] [REQUEST][START] HEAD /
DEBUG - 2026-03-30 15:41:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
ERROR - 2026-03-30 15:41:22 --> [404_ROUTE]
DEBUG - 2026-03-30 15:46:22 --> [REQ_ID=8e2ae5daac02] [REQUEST][START] HEAD /
DEBUG - 2026-03-30 15:46:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
ERROR - 2026-03-30 15:46:22 --> [404_ROUTE]
DEBUG - 2026-03-30 15:49:48 --> [REQ_ID=78046de6f4f5] [REQUEST][START] GET /
DEBUG - 2026-03-30 15:49:48 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-30 15:49:48 --> [REQ_ID=78046de6f4f5] [FILTER_BEFORE] /
DEBUG - 2026-03-30 15:49:48 --> [REQ_ID=78046de6f4f5] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-30 15:49:48 --> [REQ_ID=78046de6f4f5] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-30 15:49:48 --> [CSRF] token name=csrf_test_name hash=6e6441e68e333a1d1c3850548b5da2e6
DEBUG - 2026-03-30 15:49:48 --> [REQ_ID=397e250c5f18] [INIT] App\Controllers\Home::GET
INFO - 2026-03-30 15:49:48 --> [REQ_ID=397e250c5f18] [MEMORY][controller-start] 6291456
DEBUG - 2026-03-30 15:49:48 --> [TRACE]
INFO - 2026-03-30 15:49:48 --> [REQ_ID=397e250c5f18] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-30 15:49:48 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-30 15:49:49 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-03-30 15:49:49 --> [REQ_ID=397e250c5f18] [VIEW_RENDER] themes/public/home
INFO - 2026-03-30 15:49:49 --> [REQ_ID=397e250c5f18] [MEMORY][commonData:start] 10485760
INFO - 2026-03-30 15:49:49 --> themesMemory usage: 10485760
DEBUG - 2026-03-30 15:49:49 --> [MetaService] slug= pageName=Home cacheHit= path=DB
DEBUG - 2026-03-30 15:49:49 --> [REQ_ID=78046de6f4f5] [FILTER_AFTER]
DEBUG - 2026-03-30 15:49:49 --> [REQ_ID=78046de6f4f5] [LIFECYCLE][END] status=200 duration_ms=642.36 memory_delta=4194304
INFO - 2026-03-30 15:49:49 --> [REQ_ID=397e250c5f18] [PERF] Execution time=0.644178
DEBUG - 2026-03-30 15:49:49 --> [REQ_ID=78046de6f4f5] [REQUEST][END]
INFO - 2026-03-30 15:49:49 --> [REQ_ID=78046de6f4f5] [PERF] Execution time=0.682285
DEBUG - 2026-03-30 15:51:22 --> [REQ_ID=2f3c1288f415] [REQUEST][START] HEAD /
DEBUG - 2026-03-30 15:51:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
ERROR - 2026-03-30 15:51:22 --> [404_ROUTE]
DEBUG - 2026-03-30 15:56:22 --> [REQ_ID=28a1cb78bf09] [REQUEST][START] HEAD /
DEBUG - 2026-03-30 15:56:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
ERROR - 2026-03-30 15:56:22 --> [404_ROUTE]
DEBUG - 2026-03-30 16:00:02 --> [REQ_ID=68788d0e5a2a] [REQUEST][START] GET /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-30 16:00:02 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-30 16:00:02 --> [REQ_ID=68788d0e5a2a] [FILTER_BEFORE] /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-30 16:00:02 --> [REQ_ID=68788d0e5a2a] [ROUTE] Controller=\App\Modules\Management\Controllers\ManagementAPIController Method=Run_CRON_Tasks
DEBUG - 2026-03-30 16:00:02 --> [REQ_ID=68788d0e5a2a] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-30 16:00:02 --> [REQ_ID=68788d0e5a2a] [REQUEST][END]
INFO - 2026-03-30 16:00:02 --> [REQ_ID=68788d0e5a2a] [PERF] Execution time=0.031966
ERROR - 2026-03-30 16:00:02 --> Table 'mymiwallet.bf_route_error_heatmap' doesn't exist
in SYSTEMPATH/Database/MySQLi/Connection.php on line 300.
 1 SYSTEMPATH/Database/MySQLi/Connection.php(300): mysqli->query('SELECT *
FROM `bf_route_error_heatmap`
WHERE `route` = \'/index.php/API/Management/Run-CRON-Tasks\'
AND `error_type` = \'http_403\'
AND `status_code` = 403
 LIMIT 1', 0)
 2 SYSTEMPATH/Database/BaseConnection.php(769): CodeIgniter\Database\MySQLi\Connection->execute('SELECT *
FROM `bf_route_error_heatmap`
WHERE `route` = \'/index.php/API/Management/Run-CRON-Tasks\'
AND `error_type` = \'http_403\'
AND `status_code` = 403
 LIMIT 1')
 3 SYSTEMPATH/Database/BaseConnection.php(686): CodeIgniter\Database\BaseConnection->simpleQuery('SELECT *
FROM `bf_route_error_heatmap`
WHERE `route` = \'/index.php/API/Management/Run-CRON-Tasks\'
AND `error_type` = \'http_403\'
AND `status_code` = 403
 LIMIT 1')
 4 SYSTEMPATH/Database/BaseBuilder.php(1649): CodeIgniter\Database\BaseConnection->query('SELECT *
FROM `bf_route_error_heatmap`
WHERE `route` = :route:
AND `error_type` = :error_type:
AND `status_code` = :status_code:
 LIMIT 1', [...], false)
 5 SYSTEMPATH/Model.php(296): CodeIgniter\Database\BaseBuilder->get()
 6 SYSTEMPATH/BaseModel.php(713): CodeIgniter\Model->doFirst()
 7 APPPATH/Services/AIOps/RouteErrorHeatmapService.php(28): CodeIgniter\BaseModel->first()
 8 APPPATH/Config/Events.php(65): App\Services\AIOps\RouteErrorHeatmapService->record('/index.php/API/Management/Run-CRON-Tasks', 'http_403', 403)
 9 SYSTEMPATH/Events/Events.php(152): CodeIgniter\Events\Events::Config\{closure}()
10 SYSTEMPATH/CodeIgniter.php(357): CodeIgniter\Events\Events::trigger('post_system')
11 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
12 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
13 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
DEBUG - 2026-03-30 16:00:02 --> Route heatmap post_system hook skipped: Table 'mymiwallet.bf_route_error_heatmap' doesn't exist
DEBUG - 2026-03-30 16:01:22 --> [REQ_ID=a7e6e2d11ef4] [REQUEST][START] HEAD /
DEBUG - 2026-03-30 16:01:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
ERROR - 2026-03-30 16:01:22 --> [404_ROUTE]
DEBUG - 2026-03-30 16:06:22 --> [REQ_ID=fb2596dab29a] [REQUEST][START] HEAD /
DEBUG - 2026-03-30 16:06:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
ERROR - 2026-03-30 16:06:22 --> [404_ROUTE]
DEBUG - 2026-03-30 16:11:22 --> [REQ_ID=9e000c727137] [REQUEST][START] HEAD /
DEBUG - 2026-03-30 16:11:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
ERROR - 2026-03-30 16:11:22 --> [404_ROUTE]
DEBUG - 2026-03-30 16:14:45 --> [REQ_ID=fe1e22d409cb] [REQUEST][START] GET /index.php/Management/Marketing/Post-Creator
DEBUG - 2026-03-30 16:14:45 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-30 16:14:45 --> [REQ_ID=fe1e22d409cb] [FILTER_BEFORE] /index.php/Management/Marketing/Post-Creator
DEBUG - 2026-03-30 16:14:45 --> [REQ_ID=fe1e22d409cb] [ROUTE] Controller=\App\Modules\Management\Controllers\MarketingAdminController Method=postCreator
DEBUG - 2026-03-30 16:14:45 --> [REQ_ID=fe1e22d409cb] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Management/Marketing/Post-Creator
DEBUG - 2026-03-30 16:14:45 --> [CSRF] token name=csrf_test_name hash=eeb4b5016a986ecac84b68efbb87ba55
DEBUG - 2026-03-30 16:14:45 --> [REQ_ID=fe1e22d409cb] [REQUEST][END]
INFO - 2026-03-30 16:14:45 --> [REQ_ID=fe1e22d409cb] [PERF] Execution time=0.057209
DEBUG - 2026-03-30 16:14:46 --> [REQ_ID=318ffc655ee6] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-30 16:14:46 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-30 16:14:46 --> [REQ_ID=318ffc655ee6] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-30 16:14:46 --> [REQ_ID=318ffc655ee6] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-30 16:14:46 --> [REQ_ID=318ffc655ee6] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-30 16:14:46 --> [CSRF] token name=csrf_test_name hash=0511334660ac44f40e092ed9ff78e026
DEBUG - 2026-03-30 16:14:46 --> [REQ_ID=7d847119db25] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-30 16:14:46 --> [REQ_ID=7d847119db25] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-30 16:14:46 --> [TRACE]
DEBUG - 2026-03-30 16:14:46 --> [REQ_ID=318ffc655ee6] [FILTER_AFTER]
DEBUG - 2026-03-30 16:14:46 --> [REQ_ID=318ffc655ee6] [LIFECYCLE][END] status=200 duration_ms=38.01 memory_delta=0
INFO - 2026-03-30 16:14:46 --> [REQ_ID=7d847119db25] [PERF] Execution time=0.041586
DEBUG - 2026-03-30 16:14:46 --> [REQ_ID=318ffc655ee6] [REQUEST][END]
INFO - 2026-03-30 16:14:46 --> [REQ_ID=318ffc655ee6] [PERF] Execution time=0.054054
DEBUG - 2026-03-30 16:15:01 --> [REQ_ID=4514d7b21837] [REQUEST][START] GET /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-30 16:15:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-30 16:15:01 --> [REQ_ID=4514d7b21837] [FILTER_BEFORE] /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-30 16:15:01 --> [REQ_ID=4514d7b21837] [ROUTE] Controller=\App\Modules\APIs\Controllers\AlertsAPIController Method=fetchEmailAlerts
DEBUG - 2026-03-30 16:15:01 --> [REQ_ID=4514d7b21837] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-30 16:15:01 --> [REQ_ID=4514d7b21837] [REQUEST][END]
INFO - 2026-03-30 16:15:01 --> [REQ_ID=4514d7b21837] [PERF] Execution time=0.016128
ERROR - 2026-03-30 16:15:01 --> Table 'mymiwallet.bf_route_error_heatmap' doesn't exist
in SYSTEMPATH/Database/MySQLi/Connection.php on line 300.
 1 SYSTEMPATH/Database/MySQLi/Connection.php(300): mysqli->query('SELECT *
FROM `bf_route_error_heatmap`
WHERE `route` = \'/index.php/API/Alerts/fetchEmailAlerts\'
AND `error_type` = \'http_403\'
AND `status_code` = 403
 LIMIT 1', 0)
 2 SYSTEMPATH/Database/BaseConnection.php(769): CodeIgniter\Database\MySQLi\Connection->execute('SELECT *
FROM `bf_route_error_heatmap`
WHERE `route` = \'/index.php/API/Alerts/fetchEmailAlerts\'
AND `error_type` = \'http_403\'
AND `status_code` = 403
 LIMIT 1')
 3 SYSTEMPATH/Database/BaseConnection.php(686): CodeIgniter\Database\BaseConnection->simpleQuery('SELECT *
FROM `bf_route_error_heatmap`
WHERE `route` = \'/index.php/API/Alerts/fetchEmailAlerts\'
AND `error_type` = \'http_403\'
AND `status_code` = 403
 LIMIT 1')
 4 SYSTEMPATH/Database/BaseBuilder.php(1649): CodeIgniter\Database\BaseConnection->query('SELECT *
FROM `bf_route_error_heatmap`
WHERE `route` = :route:
AND `error_type` = :error_type:
AND `status_code` = :status_code:
 LIMIT 1', [...], false)
 5 SYSTEMPATH/Model.php(296): CodeIgniter\Database\BaseBuilder->get()
 6 SYSTEMPATH/BaseModel.php(713): CodeIgniter\Model->doFirst()
 7 APPPATH/Services/AIOps/RouteErrorHeatmapService.php(28): CodeIgniter\BaseModel->first()
 8 APPPATH/Config/Events.php(65): App\Services\AIOps\RouteErrorHeatmapService->record('/index.php/API/Alerts/fetchEmailAlerts', 'http_403', 403)
 9 SYSTEMPATH/Events/Events.php(152): CodeIgniter\Events\Events::Config\{closure}()
10 SYSTEMPATH/CodeIgniter.php(357): CodeIgniter\Events\Events::trigger('post_system')
11 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
12 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
13 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
DEBUG - 2026-03-30 16:15:01 --> Route heatmap post_system hook skipped: Table 'mymiwallet.bf_route_error_heatmap' doesn't exist
DEBUG - 2026-03-30 16:15:10 --> [REQ_ID=c453038b0ce8] [REQUEST][START] GET /
DEBUG - 2026-03-30 16:15:10 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-30 16:15:10 --> [REQ_ID=c453038b0ce8] [FILTER_BEFORE] /
DEBUG - 2026-03-30 16:15:10 --> [REQ_ID=c453038b0ce8] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-30 16:15:10 --> [REQ_ID=c453038b0ce8] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-30 16:15:10 --> [CSRF] token name=csrf_test_name hash=cdeccbc986e247d8e289feca26084c3f
DEBUG - 2026-03-30 16:15:10 --> [REQ_ID=5c91a54f1496] [INIT] App\Controllers\Home::GET
INFO - 2026-03-30 16:15:10 --> [REQ_ID=5c91a54f1496] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-30 16:15:10 --> [TRACE]
INFO - 2026-03-30 16:15:10 --> [REQ_ID=5c91a54f1496] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-30 16:15:10 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-30 16:15:11 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-03-30 16:15:11 --> [REQ_ID=5c91a54f1496] [VIEW_RENDER] themes/public/home
INFO - 2026-03-30 16:15:11 --> [REQ_ID=5c91a54f1496] [MEMORY][commonData:start] 8388608
INFO - 2026-03-30 16:15:11 --> themesMemory usage: 8388608
DEBUG - 2026-03-30 16:15:11 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-30 16:15:11 --> [REQ_ID=c453038b0ce8] [FILTER_AFTER]
DEBUG - 2026-03-30 16:15:11 --> [REQ_ID=c453038b0ce8] [LIFECYCLE][END] status=200 duration_ms=710.66 memory_delta=4194304
INFO - 2026-03-30 16:15:11 --> [REQ_ID=5c91a54f1496] [PERF] Execution time=0.710844
DEBUG - 2026-03-30 16:15:11 --> [REQ_ID=c453038b0ce8] [REQUEST][END]
INFO - 2026-03-30 16:15:11 --> [REQ_ID=c453038b0ce8] [PERF] Execution time=0.720945
DEBUG - 2026-03-30 16:15:24 --> [REQ_ID=7c6596afe956] [REQUEST][START] GET /
DEBUG - 2026-03-30 16:15:24 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-30 16:15:24 --> [REQ_ID=7c6596afe956] [FILTER_BEFORE] /
DEBUG - 2026-03-30 16:15:24 --> [REQ_ID=7c6596afe956] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-30 16:15:24 --> [REQ_ID=7c6596afe956] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-30 16:15:24 --> [CSRF] token name=csrf_test_name hash=f4df8ff1916bdcd017d048be3e8f322c
DEBUG - 2026-03-30 16:15:24 --> [REQ_ID=3b41f9c874d0] [INIT] App\Controllers\Home::GET
INFO - 2026-03-30 16:15:24 --> [REQ_ID=3b41f9c874d0] [MEMORY][controller-start] 6291456
DEBUG - 2026-03-30 16:15:24 --> [TRACE]
INFO - 2026-03-30 16:15:24 --> [REQ_ID=3b41f9c874d0] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-30 16:15:24 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-30 16:15:25 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
DEBUG - 2026-03-30 16:15:25 --> [REQ_ID=3b41f9c874d0] [VIEW_RENDER] themes/public/home
INFO - 2026-03-30 16:15:25 --> [REQ_ID=3b41f9c874d0] [MEMORY][commonData:start] 8388608
INFO - 2026-03-30 16:15:25 --> themesMemory usage: 8388608
DEBUG - 2026-03-30 16:15:25 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-30 16:15:25 --> [REQ_ID=7c6596afe956] [FILTER_AFTER]
DEBUG - 2026-03-30 16:15:25 --> [REQ_ID=7c6596afe956] [LIFECYCLE][END] status=200 duration_ms=743.02 memory_delta=2097152
INFO - 2026-03-30 16:15:25 --> [REQ_ID=3b41f9c874d0] [PERF] Execution time=0.743065
DEBUG - 2026-03-30 16:15:25 --> [REQ_ID=7c6596afe956] [REQUEST][END]
INFO - 2026-03-30 16:15:25 --> [REQ_ID=7c6596afe956] [PERF] Execution time=0.753157
DEBUG - 2026-03-30 16:16:22 --> [REQ_ID=8a6494f914b2] [REQUEST][START] HEAD /
DEBUG - 2026-03-30 16:16:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
ERROR - 2026-03-30 16:16:22 --> [404_ROUTE]
DEBUG - 2026-03-30 16:21:22 --> [REQ_ID=05b8656e6097] [REQUEST][START] HEAD /
DEBUG - 2026-03-30 16:21:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
ERROR - 2026-03-30 16:21:22 --> [404_ROUTE]
DEBUG - 2026-03-30 16:26:22 --> [REQ_ID=c5ed162a1378] [REQUEST][START] HEAD /
DEBUG - 2026-03-30 16:26:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
ERROR - 2026-03-30 16:26:22 --> [404_ROUTE]
DEBUG - 2026-03-30 16:26:32 --> [REQ_ID=c776e43f3fab] [REQUEST][START] GET /index.php/Management/Budgeting
DEBUG - 2026-03-30 16:26:32 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-30 16:26:32 --> [REQ_ID=c776e43f3fab] [FILTER_BEFORE] /index.php/Management/Budgeting
DEBUG - 2026-03-30 16:26:32 --> [REQ_ID=c776e43f3fab] [ROUTE] Controller=\App\Modules\Management\Controllers\BudgetingAdminController Method=index
DEBUG - 2026-03-30 16:26:32 --> [REQ_ID=c776e43f3fab] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Management/Budgeting
DEBUG - 2026-03-30 16:26:32 --> [CSRF] token name=csrf_test_name hash=f139ed507f4e591d559e5ed624a5622e
DEBUG - 2026-03-30 16:26:32 --> [REQ_ID=c776e43f3fab] [REQUEST][END]
INFO - 2026-03-30 16:26:32 --> [REQ_ID=c776e43f3fab] [PERF] Execution time=0.030148
DEBUG - 2026-03-30 16:26:32 --> [REQ_ID=6fbd751b27d4] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-30 16:26:32 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-30 16:26:32 --> [REQ_ID=6fbd751b27d4] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-30 16:26:32 --> [REQ_ID=6fbd751b27d4] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-30 16:26:32 --> [REQ_ID=6fbd751b27d4] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-30 16:26:32 --> [CSRF] token name=csrf_test_name hash=bed1c4a09f6b5964a4a7e611b607918b
DEBUG - 2026-03-30 16:26:32 --> [REQ_ID=b9227b7cd4c4] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-30 16:26:32 --> [REQ_ID=b9227b7cd4c4] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-30 16:26:32 --> [TRACE]
DEBUG - 2026-03-30 16:26:32 --> [REQ_ID=6fbd751b27d4] [FILTER_AFTER]
DEBUG - 2026-03-30 16:26:32 --> [REQ_ID=6fbd751b27d4] [LIFECYCLE][END] status=200 duration_ms=264.32 memory_delta=0
INFO - 2026-03-30 16:26:32 --> [REQ_ID=b9227b7cd4c4] [PERF] Execution time=0.268086
DEBUG - 2026-03-30 16:26:32 --> [REQ_ID=6fbd751b27d4] [REQUEST][END]
INFO - 2026-03-30 16:26:32 --> [REQ_ID=6fbd751b27d4] [PERF] Execution time=0.280098
DEBUG - 2026-03-30 16:26:51 --> [REQ_ID=e82d50311733] [REQUEST][START] GET /index.php/Knowledgebase/Getting-Started
DEBUG - 2026-03-30 16:26:51 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-30 16:26:51 --> [REQ_ID=e82d50311733] [REQUEST][END]
INFO - 2026-03-30 16:26:51 --> [REQ_ID=e82d50311733] [PERF] Execution time=0.011066
ERROR - 2026-03-30 16:26:51 --> Table 'mymiwallet.bf_route_error_heatmap' doesn't exist
in SYSTEMPATH/Database/MySQLi/Connection.php on line 300.
 1 SYSTEMPATH/Database/MySQLi/Connection.php(300): mysqli->query('SELECT *
FROM `bf_route_error_heatmap`
WHERE `route` = \'/index.php/Knowledgebase/Getting-Started\'
AND `error_type` = \'http_403\'
AND `status_code` = 403
 LIMIT 1', 0)
 2 SYSTEMPATH/Database/BaseConnection.php(769): CodeIgniter\Database\MySQLi\Connection->execute('SELECT *
FROM `bf_route_error_heatmap`
WHERE `route` = \'/index.php/Knowledgebase/Getting-Started\'
AND `error_type` = \'http_403\'
AND `status_code` = 403
 LIMIT 1')
 3 SYSTEMPATH/Database/BaseConnection.php(686): CodeIgniter\Database\BaseConnection->simpleQuery('SELECT *
FROM `bf_route_error_heatmap`
WHERE `route` = \'/index.php/Knowledgebase/Getting-Started\'
AND `error_type` = \'http_403\'
AND `status_code` = 403
 LIMIT 1')
 4 SYSTEMPATH/Database/BaseBuilder.php(1649): CodeIgniter\Database\BaseConnection->query('SELECT *
FROM `bf_route_error_heatmap`
WHERE `route` = :route:
AND `error_type` = :error_type:
AND `status_code` = :status_code:
 LIMIT 1', [...], false)
 5 SYSTEMPATH/Model.php(296): CodeIgniter\Database\BaseBuilder->get()
 6 SYSTEMPATH/BaseModel.php(713): CodeIgniter\Model->doFirst()
 7 APPPATH/Services/AIOps/RouteErrorHeatmapService.php(28): CodeIgniter\BaseModel->first()
 8 APPPATH/Config/Events.php(65): App\Services\AIOps\RouteErrorHeatmapService->record('/index.php/Knowledgebase/Getting-Started', 'http_403', 403)
 9 SYSTEMPATH/Events/Events.php(152): CodeIgniter\Events\Events::Config\{closure}()
10 SYSTEMPATH/CodeIgniter.php(357): CodeIgniter\Events\Events::trigger('post_system')
11 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
12 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
13 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
DEBUG - 2026-03-30 16:26:51 --> Route heatmap post_system hook skipped: Table 'mymiwallet.bf_route_error_heatmap' doesn't exist
DEBUG - 2026-03-30 16:31:22 --> [REQ_ID=8af4cb9cec47] [REQUEST][START] HEAD /
DEBUG - 2026-03-30 16:31:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
ERROR - 2026-03-30 16:31:22 --> [404_ROUTE]
DEBUG - 2026-03-30 16:36:22 --> [REQ_ID=18151a9cb07f] [REQUEST][START] HEAD /
DEBUG - 2026-03-30 16:36:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
ERROR - 2026-03-30 16:36:22 --> [404_ROUTE]
DEBUG - 2026-03-30 16:41:22 --> [REQ_ID=d41c4cb4ad1a] [REQUEST][START] HEAD /
DEBUG - 2026-03-30 16:41:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
ERROR - 2026-03-30 16:41:22 --> [404_ROUTE]
DEBUG - 2026-03-30 16:44:40 --> [REQ_ID=3d98d93eac19] [REQUEST][START] GET /index.php/Account/Social-Media
DEBUG - 2026-03-30 16:44:40 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-30 16:44:40 --> [REQ_ID=3d98d93eac19] [REQUEST][END]
INFO - 2026-03-30 16:44:40 --> [REQ_ID=3d98d93eac19] [PERF] Execution time=0.037827
ERROR - 2026-03-30 16:44:40 --> Table 'mymiwallet.bf_route_error_heatmap' doesn't exist
in SYSTEMPATH/Database/MySQLi/Connection.php on line 300.
 1 SYSTEMPATH/Database/MySQLi/Connection.php(300): mysqli->query('SELECT *
FROM `bf_route_error_heatmap`
WHERE `route` = \'/index.php/Account/Social-Media\'
AND `error_type` = \'http_403\'
AND `status_code` = 403
 LIMIT 1', 0)
 2 SYSTEMPATH/Database/BaseConnection.php(769): CodeIgniter\Database\MySQLi\Connection->execute('SELECT *
FROM `bf_route_error_heatmap`
WHERE `route` = \'/index.php/Account/Social-Media\'
AND `error_type` = \'http_403\'
AND `status_code` = 403
 LIMIT 1')
 3 SYSTEMPATH/Database/BaseConnection.php(686): CodeIgniter\Database\BaseConnection->simpleQuery('SELECT *
FROM `bf_route_error_heatmap`
WHERE `route` = \'/index.php/Account/Social-Media\'
AND `error_type` = \'http_403\'
AND `status_code` = 403
 LIMIT 1')
 4 SYSTEMPATH/Database/BaseBuilder.php(1649): CodeIgniter\Database\BaseConnection->query('SELECT *
FROM `bf_route_error_heatmap`
WHERE `route` = :route:
AND `error_type` = :error_type:
AND `status_code` = :status_code:
 LIMIT 1', [...], false)
 5 SYSTEMPATH/Model.php(296): CodeIgniter\Database\BaseBuilder->get()
 6 SYSTEMPATH/BaseModel.php(713): CodeIgniter\Model->doFirst()
 7 APPPATH/Services/AIOps/RouteErrorHeatmapService.php(28): CodeIgniter\BaseModel->first()
 8 APPPATH/Config/Events.php(65): App\Services\AIOps\RouteErrorHeatmapService->record('/index.php/Account/Social-Media', 'http_403', 403)
 9 SYSTEMPATH/Events/Events.php(152): CodeIgniter\Events\Events::Config\{closure}()
10 SYSTEMPATH/CodeIgniter.php(357): CodeIgniter\Events\Events::trigger('post_system')
11 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
12 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
13 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
DEBUG - 2026-03-30 16:44:40 --> Route heatmap post_system hook skipped: Table 'mymiwallet.bf_route_error_heatmap' doesn't exist
DEBUG - 2026-03-30 16:46:22 --> [REQ_ID=83c0bea4d981] [REQUEST][START] HEAD /
DEBUG - 2026-03-30 16:46:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
ERROR - 2026-03-30 16:46:22 --> [404_ROUTE]
DEBUG - 2026-03-30 16:49:22 --> [REQ_ID=bcc31187518f] [REQUEST][START] GET /index.php/Preview/Alert/IMNN
DEBUG - 2026-03-30 16:49:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-30 16:49:22 --> [REQ_ID=bcc31187518f] [FILTER_BEFORE] /index.php/Preview/Alert/IMNN
DEBUG - 2026-03-30 16:49:22 --> [REQ_ID=bcc31187518f] [ROUTE] Controller=\App\Modules\User\Controllers\AlertsController Method=preview
DEBUG - 2026-03-30 16:49:22 --> [REQ_ID=bcc31187518f] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Preview/Alert/IMNN
DEBUG - 2026-03-30 16:49:22 --> [CSRF] token name=csrf_test_name hash=bd3a1d06d17bac7317753c31b0bd4466
DEBUG - 2026-03-30 16:49:22 --> [REQ_ID=5efa0d4d60b5] [INIT] App\Modules\User\Controllers\AlertsController::GET
INFO - 2026-03-30 16:49:22 --> [REQ_ID=5efa0d4d60b5] [MEMORY][controller-start] 6291456
DEBUG - 2026-03-30 16:49:22 --> [TRACE]
DEBUG - 2026-03-30 16:49:22 --> [REQ_ID=5efa0d4d60b5] [METHOD_ENTRY] preview
DEBUG - 2026-03-30 16:49:22 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-30 16:49:22 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-30 16:49:22 --> MyMICoin initialized ONCE
DEBUG - 2026-03-30 16:49:22 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-30 16:49:22 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-30 16:49:22 --> MyMIWallets skipped (no user context)
DEBUG - 2026-03-30 16:49:23 --> MyMIInvestments: no session user detected; skipping personalized hydration.
DEBUG - 2026-03-30 16:49:23 --> MyMIMarketing: Pscrape library not installed; Google search scraping will use fallback.
DEBUG - 2026-03-30 16:49:23 --> MyMIAlerts: no authenticated user context detected.
DEBUG - 2026-03-30 16:49:23 --> [SERVICE] App\Services\BudgetService ::setUserId
WARNING - 2026-03-30 16:49:23 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-30 16:49:23 --> MyMIWallets skipped (no user context)
DEBUG - 2026-03-30 16:49:23 --> [SERVICE] App\Services\BudgetService ::setUserId
INFO - 2026-03-30 16:49:23 --> [REQ_ID=5efa0d4d60b5] [MEMORY][commonData:start] 8388608
DEBUG - 2026-03-30 16:49:23 --> MyMIInvestments: no session user detected; skipping personalized hydration.
DEBUG - 2026-03-30 16:49:23 --> MyMIAlerts: no authenticated user context detected.
INFO - 2026-03-30 16:49:23 --> Premium entitlement guest: user_id= route=/index.php/Preview/Alert/IMNN feature= tier=free status=free allowed=yes reason=Guest access allowed for this feature.
INFO - 2026-03-30 16:49:23 --> AlertsModel L404 - Alert updated successfully for ID 9368: Array
(
    [price] => 2.72
    [current_price] => 2.72
    [last_updated] => 2026-03-30 16:49:23
    [last_updated_time] => 2026-03-30 16:49:23
)

INFO - 2026-03-30 16:49:23 --> 🔄 Trying AlphaVantage for IMNN...
INFO - 2026-03-30 16:49:23 --> ✅ Alert snapshot inserted for IMNN with trade_id 9368
DEBUG - 2026-03-30 16:49:23 --> [REQ_ID=5efa0d4d60b5] [VIEW_RENDER] themes/public/previewAlert
INFO - 2026-03-30 16:49:23 --> [REQ_ID=5efa0d4d60b5] [MEMORY][commonData:start] 8388608
INFO - 2026-03-30 16:49:23 --> themesMemory usage: 8388608
DEBUG - 2026-03-30 16:49:23 --> [REQ_ID=bcc31187518f] [FILTER_AFTER]
DEBUG - 2026-03-30 16:49:23 --> [REQ_ID=bcc31187518f] [LIFECYCLE][END] status=200 duration_ms=675.95 memory_delta=2097152
INFO - 2026-03-30 16:49:23 --> [REQ_ID=5efa0d4d60b5] [PERF] Execution time=0.677735
DEBUG - 2026-03-30 16:49:23 --> [REQ_ID=bcc31187518f] [REQUEST][END]
INFO - 2026-03-30 16:49:23 --> [REQ_ID=bcc31187518f] [PERF] Execution time=0.715929
DEBUG - 2026-03-30 16:50:37 --> [REQ_ID=16fc4034fa0e] [REQUEST][START] GET /index.php/Legal/Terms-And-Conditions
DEBUG - 2026-03-30 16:50:37 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-30 16:50:37 --> [REQ_ID=16fc4034fa0e] [FILTER_BEFORE] /index.php/Legal/Terms-And-Conditions
DEBUG - 2026-03-30 16:50:37 --> [REQ_ID=16fc4034fa0e] [ROUTE] Controller=\App\Controllers\Home Method=terms
DEBUG - 2026-03-30 16:50:37 --> [REQ_ID=16fc4034fa0e] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Legal/Terms-And-Conditions
DEBUG - 2026-03-30 16:50:37 --> [CSRF] token name=csrf_test_name hash=903245310c7a17e56634358df8fc693d
DEBUG - 2026-03-30 16:50:37 --> [REQ_ID=16fc4034fa0e] [REQUEST][END]
INFO - 2026-03-30 16:50:37 --> [REQ_ID=16fc4034fa0e] [PERF] Execution time=0.012604
DEBUG - 2026-03-30 16:50:38 --> [REQ_ID=d0a8bfa37922] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-30 16:50:38 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-30 16:50:38 --> [REQ_ID=d0a8bfa37922] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-30 16:50:38 --> [REQ_ID=d0a8bfa37922] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-30 16:50:38 --> [REQ_ID=d0a8bfa37922] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-30 16:50:38 --> [CSRF] token name=csrf_test_name hash=f37828c38b98a84adf5d68a7231fc47a
DEBUG - 2026-03-30 16:50:38 --> [REQ_ID=65539c585db8] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-30 16:50:38 --> [REQ_ID=65539c585db8] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-30 16:50:38 --> [TRACE]
DEBUG - 2026-03-30 16:50:38 --> [REQ_ID=d0a8bfa37922] [FILTER_AFTER]
DEBUG - 2026-03-30 16:50:38 --> [REQ_ID=d0a8bfa37922] [LIFECYCLE][END] status=200 duration_ms=287.73 memory_delta=0
INFO - 2026-03-30 16:50:38 --> [REQ_ID=65539c585db8] [PERF] Execution time=0.287918
DEBUG - 2026-03-30 16:50:38 --> [REQ_ID=d0a8bfa37922] [REQUEST][END]
INFO - 2026-03-30 16:50:38 --> [REQ_ID=d0a8bfa37922] [PERF] Execution time=0.300195
DEBUG - 2026-03-30 16:51:22 --> [REQ_ID=84b59deb254e] [REQUEST][START] HEAD /
DEBUG - 2026-03-30 16:51:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
ERROR - 2026-03-30 16:51:22 --> [404_ROUTE]
DEBUG - 2026-03-30 16:56:22 --> [REQ_ID=d8a8f701cbe4] [REQUEST][START] HEAD /
DEBUG - 2026-03-30 16:56:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
ERROR - 2026-03-30 16:56:22 --> [404_ROUTE]
DEBUG - 2026-03-30 16:57:50 --> [REQ_ID=831a37187941] [REQUEST][START] GET /index.php/Blog/Personal-Budgeting/The-Importance-of-Personal-Financial-Budgeting
DEBUG - 2026-03-30 16:57:50 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-30 16:57:50 --> [REQ_ID=831a37187941] [FILTER_BEFORE] /index.php/Blog/Personal-Budgeting/The-Importance-of-Personal-Financial-Budgeting
DEBUG - 2026-03-30 16:57:50 --> [REQ_ID=831a37187941] [ROUTE] Controller=\App\Modules\Blog\Controllers\PersonalBudgetingController Method=TheImportanceOfPersonalFinancialBudgeting
DEBUG - 2026-03-30 16:57:50 --> [REQ_ID=831a37187941] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Blog/Personal-Budgeting/The-Importance-of-Personal-Financial-Budgeting
DEBUG - 2026-03-30 16:57:50 --> [CSRF] token name=csrf_test_name hash=63ad686fcc5d543195bc4dedf94bb5fd
DEBUG - 2026-03-30 16:57:50 --> [REQ_ID=2ec80ba624f8] [INIT] App\Modules\Blog\Controllers\PersonalBudgetingController::GET
INFO - 2026-03-30 16:57:50 --> [REQ_ID=2ec80ba624f8] [MEMORY][controller-start] 6291456
DEBUG - 2026-03-30 16:57:50 --> [TRACE]
DEBUG - 2026-03-30 16:57:50 --> [REQ_ID=2ec80ba624f8] [METHOD_ENTRY] TheImportanceOfPersonalFinancialBudgeting
DEBUG - 2026-03-30 16:57:50 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-30 16:57:50 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-30 16:57:50 --> MyMICoin initialized ONCE
DEBUG - 2026-03-30 16:57:50 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-30 16:57:51 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-30 16:57:51 --> MyMIWallets skipped (no user context)
INFO - 2026-03-30 16:57:51 --> [REQ_ID=2ec80ba624f8] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-30 16:57:51 --> [REQ_ID=2ec80ba624f8] [VIEW_RENDER] App\Modules\Blog\Views\PersonalBudgeting\Importance_Of_Personal_Financial_Budgeting
INFO - 2026-03-30 16:57:51 --> [REQ_ID=2ec80ba624f8] [MEMORY][commonData:start] 10485760
INFO - 2026-03-30 16:57:52 --> themesMemory usage: 14680064
DEBUG - 2026-03-30 16:57:52 --> [REQ_ID=831a37187941] [FILTER_AFTER]
DEBUG - 2026-03-30 16:57:52 --> [REQ_ID=831a37187941] [LIFECYCLE][END] status=200 duration_ms=1,260.47 memory_delta=8388608
INFO - 2026-03-30 16:57:52 --> [REQ_ID=2ec80ba624f8] [PERF] Execution time=1.261740
DEBUG - 2026-03-30 16:57:52 --> [REQ_ID=831a37187941] [REQUEST][END]
INFO - 2026-03-30 16:57:52 --> [REQ_ID=831a37187941] [PERF] Execution time=1.302559
DEBUG - 2026-03-30 17:00:02 --> [REQ_ID=768c6ecd79c5] [REQUEST][START] GET /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-30 17:00:02 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-30 17:00:02 --> [REQ_ID=768c6ecd79c5] [FILTER_BEFORE] /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-30 17:00:02 --> [REQ_ID=768c6ecd79c5] [ROUTE] Controller=\App\Modules\Management\Controllers\ManagementAPIController Method=Run_CRON_Tasks
DEBUG - 2026-03-30 17:00:02 --> [REQ_ID=768c6ecd79c5] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-30 17:00:02 --> [REQ_ID=768c6ecd79c5] [REQUEST][END]
INFO - 2026-03-30 17:00:02 --> [REQ_ID=768c6ecd79c5] [PERF] Execution time=0.043800
ERROR - 2026-03-30 17:00:02 --> Table 'mymiwallet.bf_route_error_heatmap' doesn't exist
in SYSTEMPATH/Database/MySQLi/Connection.php on line 300.
 1 SYSTEMPATH/Database/MySQLi/Connection.php(300): mysqli->query('SELECT *
FROM `bf_route_error_heatmap`
WHERE `route` = \'/index.php/API/Management/Run-CRON-Tasks\'
AND `error_type` = \'http_403\'
AND `status_code` = 403
 LIMIT 1', 0)
 2 SYSTEMPATH/Database/BaseConnection.php(769): CodeIgniter\Database\MySQLi\Connection->execute('SELECT *
FROM `bf_route_error_heatmap`
WHERE `route` = \'/index.php/API/Management/Run-CRON-Tasks\'
AND `error_type` = \'http_403\'
AND `status_code` = 403
 LIMIT 1')
 3 SYSTEMPATH/Database/BaseConnection.php(686): CodeIgniter\Database\BaseConnection->simpleQuery('SELECT *
FROM `bf_route_error_heatmap`
WHERE `route` = \'/index.php/API/Management/Run-CRON-Tasks\'
AND `error_type` = \'http_403\'
AND `status_code` = 403
 LIMIT 1')
 4 SYSTEMPATH/Database/BaseBuilder.php(1649): CodeIgniter\Database\BaseConnection->query('SELECT *
FROM `bf_route_error_heatmap`
WHERE `route` = :route:
AND `error_type` = :error_type:
AND `status_code` = :status_code:
 LIMIT 1', [...], false)
 5 SYSTEMPATH/Model.php(296): CodeIgniter\Database\BaseBuilder->get()
 6 SYSTEMPATH/BaseModel.php(713): CodeIgniter\Model->doFirst()
 7 APPPATH/Services/AIOps/RouteErrorHeatmapService.php(28): CodeIgniter\BaseModel->first()
 8 APPPATH/Config/Events.php(65): App\Services\AIOps\RouteErrorHeatmapService->record('/index.php/API/Management/Run-CRON-Tasks', 'http_403', 403)
 9 SYSTEMPATH/Events/Events.php(152): CodeIgniter\Events\Events::Config\{closure}()
10 SYSTEMPATH/CodeIgniter.php(357): CodeIgniter\Events\Events::trigger('post_system')
11 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
12 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
13 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
DEBUG - 2026-03-30 17:00:02 --> Route heatmap post_system hook skipped: Table 'mymiwallet.bf_route_error_heatmap' doesn't exist
DEBUG - 2026-03-30 17:01:22 --> [REQ_ID=c25de4fa5bcc] [REQUEST][START] HEAD /
DEBUG - 2026-03-30 17:01:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
ERROR - 2026-03-30 17:01:22 --> [404_ROUTE]
DEBUG - 2026-03-30 17:04:21 --> [REQ_ID=feee03572e79] [REQUEST][START] GET /
DEBUG - 2026-03-30 17:04:21 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-30 17:04:21 --> [REQ_ID=feee03572e79] [FILTER_BEFORE] /
DEBUG - 2026-03-30 17:04:21 --> [REQ_ID=feee03572e79] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-30 17:04:21 --> [REQ_ID=feee03572e79] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-30 17:04:21 --> [CSRF] token name=csrf_test_name hash=43e606a965cb8d6c2f1ec8c6eec4ee94
DEBUG - 2026-03-30 17:04:21 --> [REQ_ID=19c9eac2df48] [INIT] App\Controllers\Home::GET
INFO - 2026-03-30 17:04:21 --> [REQ_ID=19c9eac2df48] [MEMORY][controller-start] 6291456
DEBUG - 2026-03-30 17:04:21 --> [TRACE]
INFO - 2026-03-30 17:04:21 --> [REQ_ID=19c9eac2df48] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-30 17:04:21 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-30 17:04:21 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-03-30 17:04:21 --> [REQ_ID=19c9eac2df48] [VIEW_RENDER] themes/public/home
INFO - 2026-03-30 17:04:21 --> [REQ_ID=19c9eac2df48] [MEMORY][commonData:start] 10485760
INFO - 2026-03-30 17:04:21 --> themesMemory usage: 10485760
DEBUG - 2026-03-30 17:04:21 --> [MetaService] slug= pageName=Home cacheHit= path=DB
DEBUG - 2026-03-30 17:04:21 --> [REQ_ID=feee03572e79] [FILTER_AFTER]
DEBUG - 2026-03-30 17:04:21 --> [REQ_ID=feee03572e79] [LIFECYCLE][END] status=200 duration_ms=631.66 memory_delta=4194304
INFO - 2026-03-30 17:04:21 --> [REQ_ID=19c9eac2df48] [PERF] Execution time=0.633555
DEBUG - 2026-03-30 17:04:21 --> [REQ_ID=feee03572e79] [REQUEST][END]
INFO - 2026-03-30 17:04:21 --> [REQ_ID=feee03572e79] [PERF] Execution time=0.670124
DEBUG - 2026-03-30 17:04:30 --> [REQ_ID=5178aeac29b3] [REQUEST][START] GET /
DEBUG - 2026-03-30 17:04:30 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-30 17:04:30 --> [REQ_ID=5178aeac29b3] [FILTER_BEFORE] /
DEBUG - 2026-03-30 17:04:30 --> [REQ_ID=5178aeac29b3] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-30 17:04:30 --> [REQ_ID=5178aeac29b3] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-30 17:04:30 --> [CSRF] token name=csrf_test_name hash=43e606a965cb8d6c2f1ec8c6eec4ee94
DEBUG - 2026-03-30 17:04:30 --> [REQ_ID=c199e4b63a26] [INIT] App\Controllers\Home::GET
INFO - 2026-03-30 17:04:30 --> [REQ_ID=c199e4b63a26] [MEMORY][controller-start] 6291456
DEBUG - 2026-03-30 17:04:30 --> [TRACE]
INFO - 2026-03-30 17:04:30 --> [REQ_ID=c199e4b63a26] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-30 17:04:30 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-30 17:04:30 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
DEBUG - 2026-03-30 17:04:30 --> [REQ_ID=c199e4b63a26] [VIEW_RENDER] themes/public/home
INFO - 2026-03-30 17:04:30 --> [REQ_ID=c199e4b63a26] [MEMORY][commonData:start] 8388608
INFO - 2026-03-30 17:04:30 --> themesMemory usage: 8388608
DEBUG - 2026-03-30 17:04:30 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-30 17:04:30 --> [REQ_ID=5178aeac29b3] [FILTER_AFTER]
DEBUG - 2026-03-30 17:04:30 --> [REQ_ID=5178aeac29b3] [LIFECYCLE][END] status=200 duration_ms=541.81 memory_delta=2097152
INFO - 2026-03-30 17:04:30 --> [REQ_ID=c199e4b63a26] [PERF] Execution time=0.541453
DEBUG - 2026-03-30 17:04:30 --> [REQ_ID=5178aeac29b3] [REQUEST][END]
INFO - 2026-03-30 17:04:30 --> [REQ_ID=5178aeac29b3] [PERF] Execution time=0.555292
DEBUG - 2026-03-30 17:04:46 --> [REQ_ID=eefb77b95133] [REQUEST][START] GET /
DEBUG - 2026-03-30 17:04:46 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-30 17:04:46 --> [REQ_ID=eefb77b95133] [FILTER_BEFORE] /
DEBUG - 2026-03-30 17:04:46 --> [REQ_ID=eefb77b95133] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-30 17:04:46 --> [REQ_ID=eefb77b95133] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-30 17:04:46 --> [CSRF] token name=csrf_test_name hash=43e606a965cb8d6c2f1ec8c6eec4ee94
DEBUG - 2026-03-30 17:04:46 --> [REQ_ID=1e78c380964a] [INIT] App\Controllers\Home::GET
INFO - 2026-03-30 17:04:46 --> [REQ_ID=1e78c380964a] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-30 17:04:46 --> [TRACE]
INFO - 2026-03-30 17:04:46 --> [REQ_ID=1e78c380964a] [MEMORY][commonData:start] 4194304
DEBUG - 2026-03-30 17:04:46 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-30 17:04:46 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
DEBUG - 2026-03-30 17:04:46 --> [REQ_ID=1e78c380964a] [VIEW_RENDER] themes/public/home
INFO - 2026-03-30 17:04:46 --> [REQ_ID=1e78c380964a] [MEMORY][commonData:start] 8388608
INFO - 2026-03-30 17:04:46 --> themesMemory usage: 8388608
DEBUG - 2026-03-30 17:04:46 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-30 17:04:46 --> [REQ_ID=eefb77b95133] [FILTER_AFTER]
DEBUG - 2026-03-30 17:04:46 --> [REQ_ID=eefb77b95133] [LIFECYCLE][END] status=200 duration_ms=516.55 memory_delta=4194304
INFO - 2026-03-30 17:04:46 --> [REQ_ID=1e78c380964a] [PERF] Execution time=0.517082
DEBUG - 2026-03-30 17:04:46 --> [REQ_ID=eefb77b95133] [REQUEST][END]
INFO - 2026-03-30 17:04:46 --> [REQ_ID=eefb77b95133] [PERF] Execution time=0.526287
DEBUG - 2026-03-30 17:06:22 --> [REQ_ID=8d0e1596ca8f] [REQUEST][START] HEAD /
DEBUG - 2026-03-30 17:06:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
ERROR - 2026-03-30 17:06:22 --> [404_ROUTE]
DEBUG - 2026-03-30 17:07:40 --> [REQ_ID=680d8f66e273] [REQUEST][START] GET /index.php/Management/API
DEBUG - 2026-03-30 17:07:40 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-30 17:07:40 --> [REQ_ID=680d8f66e273] [FILTER_BEFORE] /index.php/Management/API
DEBUG - 2026-03-30 17:07:40 --> [REQ_ID=680d8f66e273] [ROUTE] Controller=\App\Modules\Management\Controllers\APIAdminController Method=index
DEBUG - 2026-03-30 17:07:40 --> [REQ_ID=680d8f66e273] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Management/API
DEBUG - 2026-03-30 17:07:40 --> [CSRF] token name=csrf_test_name hash=466d50d7967c39f04090cc139ccaa91c
DEBUG - 2026-03-30 17:07:40 --> [REQ_ID=680d8f66e273] [REQUEST][END]
INFO - 2026-03-30 17:07:40 --> [REQ_ID=680d8f66e273] [PERF] Execution time=0.050720
DEBUG - 2026-03-30 17:07:41 --> [REQ_ID=e244fac444fe] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-30 17:07:41 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-30 17:07:41 --> [REQ_ID=e244fac444fe] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-30 17:07:41 --> [REQ_ID=e244fac444fe] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-30 17:07:41 --> [REQ_ID=e244fac444fe] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-30 17:07:41 --> [CSRF] token name=csrf_test_name hash=7705f7f7c55d910dcf2428a083abe94c
DEBUG - 2026-03-30 17:07:41 --> [REQ_ID=efa9bebd1333] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-30 17:07:41 --> [REQ_ID=efa9bebd1333] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-30 17:07:41 --> [TRACE]
DEBUG - 2026-03-30 17:07:41 --> [REQ_ID=e244fac444fe] [FILTER_AFTER]
DEBUG - 2026-03-30 17:07:41 --> [REQ_ID=e244fac444fe] [LIFECYCLE][END] status=200 duration_ms=118.43 memory_delta=0
INFO - 2026-03-30 17:07:41 --> [REQ_ID=efa9bebd1333] [PERF] Execution time=0.122164
DEBUG - 2026-03-30 17:07:41 --> [REQ_ID=e244fac444fe] [REQUEST][END]
INFO - 2026-03-30 17:07:41 --> [REQ_ID=e244fac444fe] [PERF] Execution time=0.136066
DEBUG - 2026-03-30 17:11:22 --> [REQ_ID=086786a85932] [REQUEST][START] HEAD /
DEBUG - 2026-03-30 17:11:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
ERROR - 2026-03-30 17:11:22 --> [404_ROUTE]
DEBUG - 2026-03-30 17:15:02 --> [REQ_ID=a023936936d5] [REQUEST][START] GET /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-30 17:15:02 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-30 17:15:02 --> [REQ_ID=a023936936d5] [FILTER_BEFORE] /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-30 17:15:02 --> [REQ_ID=a023936936d5] [ROUTE] Controller=\App\Modules\APIs\Controllers\AlertsAPIController Method=fetchEmailAlerts
DEBUG - 2026-03-30 17:15:02 --> [REQ_ID=a023936936d5] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-30 17:15:02 --> [REQ_ID=a023936936d5] [REQUEST][END]
INFO - 2026-03-30 17:15:02 --> [REQ_ID=a023936936d5] [PERF] Execution time=0.042237
ERROR - 2026-03-30 17:15:02 --> Table 'mymiwallet.bf_route_error_heatmap' doesn't exist
in SYSTEMPATH/Database/MySQLi/Connection.php on line 300.
 1 SYSTEMPATH/Database/MySQLi/Connection.php(300): mysqli->query('SELECT *
FROM `bf_route_error_heatmap`
WHERE `route` = \'/index.php/API/Alerts/fetchEmailAlerts\'
AND `error_type` = \'http_403\'
AND `status_code` = 403
 LIMIT 1', 0)
 2 SYSTEMPATH/Database/BaseConnection.php(769): CodeIgniter\Database\MySQLi\Connection->execute('SELECT *
FROM `bf_route_error_heatmap`
WHERE `route` = \'/index.php/API/Alerts/fetchEmailAlerts\'
AND `error_type` = \'http_403\'
AND `status_code` = 403
 LIMIT 1')
 3 SYSTEMPATH/Database/BaseConnection.php(686): CodeIgniter\Database\BaseConnection->simpleQuery('SELECT *
FROM `bf_route_error_heatmap`
WHERE `route` = \'/index.php/API/Alerts/fetchEmailAlerts\'
AND `error_type` = \'http_403\'
AND `status_code` = 403
 LIMIT 1')
 4 SYSTEMPATH/Database/BaseBuilder.php(1649): CodeIgniter\Database\BaseConnection->query('SELECT *
FROM `bf_route_error_heatmap`
WHERE `route` = :route:
AND `error_type` = :error_type:
AND `status_code` = :status_code:
 LIMIT 1', [...], false)
 5 SYSTEMPATH/Model.php(296): CodeIgniter\Database\BaseBuilder->get()
 6 SYSTEMPATH/BaseModel.php(713): CodeIgniter\Model->doFirst()
 7 APPPATH/Services/AIOps/RouteErrorHeatmapService.php(28): CodeIgniter\BaseModel->first()
 8 APPPATH/Config/Events.php(65): App\Services\AIOps\RouteErrorHeatmapService->record('/index.php/API/Alerts/fetchEmailAlerts', 'http_403', 403)
 9 SYSTEMPATH/Events/Events.php(152): CodeIgniter\Events\Events::Config\{closure}()
10 SYSTEMPATH/CodeIgniter.php(357): CodeIgniter\Events\Events::trigger('post_system')
11 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
12 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
13 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
DEBUG - 2026-03-30 17:15:02 --> Route heatmap post_system hook skipped: Table 'mymiwallet.bf_route_error_heatmap' doesn't exist
DEBUG - 2026-03-30 17:16:22 --> [REQ_ID=c60bf88a7b3f] [REQUEST][START] HEAD /
DEBUG - 2026-03-30 17:16:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
ERROR - 2026-03-30 17:16:22 --> [404_ROUTE]
DEBUG - 2026-03-30 17:21:22 --> [REQ_ID=d70c3133dfb5] [REQUEST][START] HEAD /
DEBUG - 2026-03-30 17:21:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
ERROR - 2026-03-30 17:21:22 --> [404_ROUTE]
DEBUG - 2026-03-30 17:26:22 --> [REQ_ID=dd30b2fe61c4] [REQUEST][START] HEAD /
DEBUG - 2026-03-30 17:26:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
ERROR - 2026-03-30 17:26:22 --> [404_ROUTE]
DEBUG - 2026-03-30 17:31:22 --> [REQ_ID=be0f17da0207] [REQUEST][START] HEAD /
DEBUG - 2026-03-30 17:31:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
ERROR - 2026-03-30 17:31:22 --> [404_ROUTE]
DEBUG - 2026-03-30 17:36:22 --> [REQ_ID=3e9e61150662] [REQUEST][START] HEAD /
DEBUG - 2026-03-30 17:36:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
ERROR - 2026-03-30 17:36:22 --> [404_ROUTE]
DEBUG - 2026-03-30 17:41:12 --> [REQ_ID=6f940a21b33f] [REQUEST][START] GET /index.php/Premium-Features/Advanced-Charting
DEBUG - 2026-03-30 17:41:12 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
INFO - 2026-03-30 17:41:12 --> REDIRECTED ROUTE at https://www.mymiwallet.com/Features/Brokerage-Integrations
DEBUG - 2026-03-30 17:41:12 --> [REQ_ID=6f940a21b33f] [REQUEST][END]
INFO - 2026-03-30 17:41:12 --> [REQ_ID=6f940a21b33f] [PERF] Execution time=0.037023
DEBUG - 2026-03-30 17:41:22 --> [REQ_ID=ce88925b0ca3] [REQUEST][START] HEAD /
DEBUG - 2026-03-30 17:41:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
ERROR - 2026-03-30 17:41:22 --> [404_ROUTE]
DEBUG - 2026-03-30 17:45:07 --> [REQ_ID=bd36ffdbbae2] [REQUEST][START] GET /
DEBUG - 2026-03-30 17:45:07 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-30 17:45:07 --> [REQ_ID=bd36ffdbbae2] [FILTER_BEFORE] /
DEBUG - 2026-03-30 17:45:07 --> [REQ_ID=bd36ffdbbae2] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-30 17:45:07 --> [REQ_ID=bd36ffdbbae2] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-30 17:45:07 --> [CSRF] token name=csrf_test_name hash=8a81ca3983ef630fcdb86ab8b3fc6477
DEBUG - 2026-03-30 17:45:07 --> [REQ_ID=ec30e4856986] [INIT] App\Controllers\Home::GET
INFO - 2026-03-30 17:45:07 --> [REQ_ID=ec30e4856986] [MEMORY][controller-start] 6291456
DEBUG - 2026-03-30 17:45:07 --> [TRACE]
INFO - 2026-03-30 17:45:07 --> [REQ_ID=ec30e4856986] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-30 17:45:07 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-30 17:45:08 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-03-30 17:45:08 --> [REQ_ID=ec30e4856986] [VIEW_RENDER] themes/public/home
INFO - 2026-03-30 17:45:08 --> [REQ_ID=ec30e4856986] [MEMORY][commonData:start] 10485760
INFO - 2026-03-30 17:45:08 --> themesMemory usage: 10485760
DEBUG - 2026-03-30 17:45:08 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-30 17:45:08 --> [REQ_ID=bd36ffdbbae2] [FILTER_AFTER]
DEBUG - 2026-03-30 17:45:08 --> [REQ_ID=bd36ffdbbae2] [LIFECYCLE][END] status=200 duration_ms=689.02 memory_delta=4194304
INFO - 2026-03-30 17:45:08 --> [REQ_ID=ec30e4856986] [PERF] Execution time=0.691763
DEBUG - 2026-03-30 17:45:08 --> [REQ_ID=bd36ffdbbae2] [REQUEST][END]
INFO - 2026-03-30 17:45:08 --> [REQ_ID=bd36ffdbbae2] [PERF] Execution time=0.728348
DEBUG - 2026-03-30 17:46:15 --> [REQ_ID=3177a12481df] [REQUEST][START] GET /index.php/How-It-Works/Investment-Dashboard
DEBUG - 2026-03-30 17:46:15 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-30 17:46:15 --> [REQ_ID=3177a12481df] [FILTER_BEFORE] /index.php/How-It-Works/Investment-Dashboard
DEBUG - 2026-03-30 17:46:15 --> [REQ_ID=3177a12481df] [ROUTE] Controller=\App\Modules\Blog\Controllers\HowItWorksController Method=show
DEBUG - 2026-03-30 17:46:15 --> [REQ_ID=3177a12481df] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/How-It-Works/Investment-Dashboard
DEBUG - 2026-03-30 17:46:15 --> [CSRF] token name=csrf_test_name hash=1a70bedfaeb6b5e54e68f2671de0f839
DEBUG - 2026-03-30 17:46:15 --> [REQ_ID=f22807c539da] [INIT] App\Modules\Blog\Controllers\HowItWorksController::GET
INFO - 2026-03-30 17:46:15 --> [REQ_ID=f22807c539da] [MEMORY][controller-start] 6291456
DEBUG - 2026-03-30 17:46:15 --> [TRACE]
DEBUG - 2026-03-30 17:46:15 --> [REQ_ID=f22807c539da] [METHOD_ENTRY] show
DEBUG - 2026-03-30 17:46:15 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-30 17:46:15 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-30 17:46:15 --> MyMICoin initialized ONCE
DEBUG - 2026-03-30 17:46:15 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-30 17:46:15 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-30 17:46:15 --> MyMIWallets skipped (no user context)
ERROR - 2026-03-30 17:46:15 --> HowItWorksController failure: Cannot access protected property CodeIgniter\HTTP\IncomingRequest::$uri
INFO - 2026-03-30 17:46:15 --> [REQ_ID=f22807c539da] [PERF] Execution time=0.166491
DEBUG - 2026-03-30 17:46:22 --> [REQ_ID=d4c0f573dd34] [REQUEST][START] HEAD /
DEBUG - 2026-03-30 17:46:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
ERROR - 2026-03-30 17:46:22 --> [404_ROUTE]
DEBUG - 2026-03-30 17:51:22 --> [REQ_ID=d4d3e21cca04] [REQUEST][START] HEAD /
DEBUG - 2026-03-30 17:51:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
ERROR - 2026-03-30 17:51:22 --> [404_ROUTE]
DEBUG - 2026-03-30 17:56:22 --> [REQ_ID=5e9c38aab7bc] [REQUEST][START] HEAD /
DEBUG - 2026-03-30 17:56:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
ERROR - 2026-03-30 17:56:22 --> [404_ROUTE]
DEBUG - 2026-03-30 17:59:24 --> [REQ_ID=40e9bf30ece0] [REQUEST][START] GET /index.php/Features/Advanced-Investment-Portfoio-Manager
DEBUG - 2026-03-30 17:59:24 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
INFO - 2026-03-30 17:59:24 --> REDIRECTED ROUTE at https://www.mymiwallet.com/Features/Advanced-Investment-Portfolio-Manager
DEBUG - 2026-03-30 17:59:24 --> [REQ_ID=40e9bf30ece0] [REQUEST][END]
INFO - 2026-03-30 17:59:24 --> [REQ_ID=40e9bf30ece0] [PERF] Execution time=0.036528
DEBUG - 2026-03-30 18:00:01 --> [REQ_ID=48df5e0dd3ee] [REQUEST][START] GET /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-30 18:00:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-30 18:00:01 --> [REQ_ID=48df5e0dd3ee] [FILTER_BEFORE] /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-30 18:00:01 --> [REQ_ID=48df5e0dd3ee] [ROUTE] Controller=\App\Modules\Management\Controllers\ManagementAPIController Method=Run_CRON_Tasks
DEBUG - 2026-03-30 18:00:01 --> [REQ_ID=48df5e0dd3ee] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-30 18:00:01 --> [REQ_ID=48df5e0dd3ee] [REQUEST][END]
INFO - 2026-03-30 18:00:01 --> [REQ_ID=48df5e0dd3ee] [PERF] Execution time=0.035424
ERROR - 2026-03-30 18:00:01 --> Table 'mymiwallet.bf_route_error_heatmap' doesn't exist
in SYSTEMPATH/Database/MySQLi/Connection.php on line 300.
 1 SYSTEMPATH/Database/MySQLi/Connection.php(300): mysqli->query('SELECT *
FROM `bf_route_error_heatmap`
WHERE `route` = \'/index.php/API/Management/Run-CRON-Tasks\'
AND `error_type` = \'http_403\'
AND `status_code` = 403
 LIMIT 1', 0)
 2 SYSTEMPATH/Database/BaseConnection.php(769): CodeIgniter\Database\MySQLi\Connection->execute('SELECT *
FROM `bf_route_error_heatmap`
WHERE `route` = \'/index.php/API/Management/Run-CRON-Tasks\'
AND `error_type` = \'http_403\'
AND `status_code` = 403
 LIMIT 1')
 3 SYSTEMPATH/Database/BaseConnection.php(686): CodeIgniter\Database\BaseConnection->simpleQuery('SELECT *
FROM `bf_route_error_heatmap`
WHERE `route` = \'/index.php/API/Management/Run-CRON-Tasks\'
AND `error_type` = \'http_403\'
AND `status_code` = 403
 LIMIT 1')
 4 SYSTEMPATH/Database/BaseBuilder.php(1649): CodeIgniter\Database\BaseConnection->query('SELECT *
FROM `bf_route_error_heatmap`
WHERE `route` = :route:
AND `error_type` = :error_type:
AND `status_code` = :status_code:
 LIMIT 1', [...], false)
 5 SYSTEMPATH/Model.php(296): CodeIgniter\Database\BaseBuilder->get()
 6 SYSTEMPATH/BaseModel.php(713): CodeIgniter\Model->doFirst()
 7 APPPATH/Services/AIOps/RouteErrorHeatmapService.php(28): CodeIgniter\BaseModel->first()
 8 APPPATH/Config/Events.php(65): App\Services\AIOps\RouteErrorHeatmapService->record('/index.php/API/Management/Run-CRON-Tasks', 'http_403', 403)
 9 SYSTEMPATH/Events/Events.php(152): CodeIgniter\Events\Events::Config\{closure}()
10 SYSTEMPATH/CodeIgniter.php(357): CodeIgniter\Events\Events::trigger('post_system')
11 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
12 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
13 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
DEBUG - 2026-03-30 18:00:01 --> Route heatmap post_system hook skipped: Table 'mymiwallet.bf_route_error_heatmap' doesn't exist
DEBUG - 2026-03-30 18:01:22 --> [REQ_ID=689c99d737f6] [REQUEST][START] HEAD /
DEBUG - 2026-03-30 18:01:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
ERROR - 2026-03-30 18:01:22 --> [404_ROUTE]
DEBUG - 2026-03-30 18:01:50 --> [REQ_ID=8c9de7e892b7] [REQUEST][START] GET /index.php/Support/Account
DEBUG - 2026-03-30 18:01:50 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-30 18:01:50 --> [REQ_ID=8c9de7e892b7] [FILTER_BEFORE] /index.php/Support/Account
DEBUG - 2026-03-30 18:01:50 --> [REQ_ID=8c9de7e892b7] [ROUTE] Controller=\App\Modules\Support\Controllers\AccountSupportController Method=index
DEBUG - 2026-03-30 18:01:50 --> [REQ_ID=8c9de7e892b7] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Support/Account
DEBUG - 2026-03-30 18:01:50 --> [CSRF] token name=csrf_test_name hash=9572745f586f5c9795998ffe2096cee6
DEBUG - 2026-03-30 18:01:50 --> [REQ_ID=7ce4b0f93249] [INIT] App\Modules\Support\Controllers\AccountSupportController::GET
INFO - 2026-03-30 18:01:50 --> [REQ_ID=7ce4b0f93249] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-30 18:01:50 --> [TRACE]
DEBUG - 2026-03-30 18:01:50 --> [REQ_ID=7ce4b0f93249] [METHOD_ENTRY] index
DEBUG - 2026-03-30 18:01:50 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-30 18:01:50 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-30 18:01:50 --> MyMICoin initialized ONCE
DEBUG - 2026-03-30 18:01:50 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-30 18:01:50 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-30 18:01:50 --> MyMIWallets skipped (no user context)
INFO - 2026-03-30 18:01:50 --> [REQ_ID=7ce4b0f93249] [MEMORY][commonData:start] 4194304
DEBUG - 2026-03-30 18:01:50 --> [REQ_ID=7ce4b0f93249] [VIEW_RENDER] SupportModule/Support/account_help
INFO - 2026-03-30 18:01:50 --> [REQ_ID=7ce4b0f93249] [MEMORY][commonData:start] 4194304
INFO - 2026-03-30 18:01:50 --> themesMemory usage: 4194304
DEBUG - 2026-03-30 18:01:50 --> [REQ_ID=8c9de7e892b7] [FILTER_AFTER]
DEBUG - 2026-03-30 18:01:50 --> [REQ_ID=8c9de7e892b7] [LIFECYCLE][END] status=200 duration_ms=177.30 memory_delta=0
INFO - 2026-03-30 18:01:50 --> [REQ_ID=7ce4b0f93249] [PERF] Execution time=0.176423
DEBUG - 2026-03-30 18:01:50 --> [REQ_ID=8c9de7e892b7] [REQUEST][END]
INFO - 2026-03-30 18:01:50 --> [REQ_ID=8c9de7e892b7] [PERF] Execution time=0.192507
DEBUG - 2026-03-30 18:06:22 --> [REQ_ID=77f892cb1331] [REQUEST][START] HEAD /
DEBUG - 2026-03-30 18:06:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
ERROR - 2026-03-30 18:06:22 --> [404_ROUTE]
DEBUG - 2026-03-30 18:11:22 --> [REQ_ID=b68b632569d8] [REQUEST][START] HEAD /
DEBUG - 2026-03-30 18:11:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
ERROR - 2026-03-30 18:11:22 --> [404_ROUTE]
DEBUG - 2026-03-30 18:15:01 --> [REQ_ID=f5ddca00486c] [REQUEST][START] GET /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-30 18:15:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-30 18:15:01 --> [REQ_ID=f5ddca00486c] [FILTER_BEFORE] /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-30 18:15:01 --> [REQ_ID=f5ddca00486c] [ROUTE] Controller=\App\Modules\APIs\Controllers\AlertsAPIController Method=fetchEmailAlerts
DEBUG - 2026-03-30 18:15:01 --> [REQ_ID=f5ddca00486c] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-30 18:15:01 --> [REQ_ID=f5ddca00486c] [REQUEST][END]
INFO - 2026-03-30 18:15:01 --> [REQ_ID=f5ddca00486c] [PERF] Execution time=0.042926
ERROR - 2026-03-30 18:15:01 --> Table 'mymiwallet.bf_route_error_heatmap' doesn't exist
in SYSTEMPATH/Database/MySQLi/Connection.php on line 300.
 1 SYSTEMPATH/Database/MySQLi/Connection.php(300): mysqli->query('SELECT *
FROM `bf_route_error_heatmap`
WHERE `route` = \'/index.php/API/Alerts/fetchEmailAlerts\'
AND `error_type` = \'http_403\'
AND `status_code` = 403
 LIMIT 1', 0)
 2 SYSTEMPATH/Database/BaseConnection.php(769): CodeIgniter\Database\MySQLi\Connection->execute('SELECT *
FROM `bf_route_error_heatmap`
WHERE `route` = \'/index.php/API/Alerts/fetchEmailAlerts\'
AND `error_type` = \'http_403\'
AND `status_code` = 403
 LIMIT 1')
 3 SYSTEMPATH/Database/BaseConnection.php(686): CodeIgniter\Database\BaseConnection->simpleQuery('SELECT *
FROM `bf_route_error_heatmap`
WHERE `route` = \'/index.php/API/Alerts/fetchEmailAlerts\'
AND `error_type` = \'http_403\'
AND `status_code` = 403
 LIMIT 1')
 4 SYSTEMPATH/Database/BaseBuilder.php(1649): CodeIgniter\Database\BaseConnection->query('SELECT *
FROM `bf_route_error_heatmap`
WHERE `route` = :route:
AND `error_type` = :error_type:
AND `status_code` = :status_code:
 LIMIT 1', [...], false)
 5 SYSTEMPATH/Model.php(296): CodeIgniter\Database\BaseBuilder->get()
 6 SYSTEMPATH/BaseModel.php(713): CodeIgniter\Model->doFirst()
 7 APPPATH/Services/AIOps/RouteErrorHeatmapService.php(28): CodeIgniter\BaseModel->first()
 8 APPPATH/Config/Events.php(65): App\Services\AIOps\RouteErrorHeatmapService->record('/index.php/API/Alerts/fetchEmailAlerts', 'http_403', 403)
 9 SYSTEMPATH/Events/Events.php(152): CodeIgniter\Events\Events::Config\{closure}()
10 SYSTEMPATH/CodeIgniter.php(357): CodeIgniter\Events\Events::trigger('post_system')
11 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
12 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
13 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
DEBUG - 2026-03-30 18:15:01 --> Route heatmap post_system hook skipped: Table 'mymiwallet.bf_route_error_heatmap' doesn't exist
DEBUG - 2026-03-30 18:16:22 --> [REQ_ID=21e0ea72a19e] [REQUEST][START] HEAD /
DEBUG - 2026-03-30 18:16:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
ERROR - 2026-03-30 18:16:22 --> [404_ROUTE]
DEBUG - 2026-03-30 18:21:22 --> [REQ_ID=0f8523fa3191] [REQUEST][START] HEAD /
DEBUG - 2026-03-30 18:21:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
ERROR - 2026-03-30 18:21:22 --> [404_ROUTE]
DEBUG - 2026-03-30 18:24:31 --> [REQ_ID=0db360f8f5c2] [REQUEST][START] GET /
DEBUG - 2026-03-30 18:24:31 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-30 18:24:31 --> [REQ_ID=0db360f8f5c2] [FILTER_BEFORE] /
DEBUG - 2026-03-30 18:24:31 --> [REQ_ID=0db360f8f5c2] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-30 18:24:31 --> [REQ_ID=0db360f8f5c2] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-30 18:24:31 --> [CSRF] token name=csrf_test_name hash=7f1ed6a01a70a31fa4a7a0d0a5729576
DEBUG - 2026-03-30 18:24:31 --> [REQ_ID=1be85e203994] [INIT] App\Controllers\Home::GET
INFO - 2026-03-30 18:24:31 --> [REQ_ID=1be85e203994] [MEMORY][controller-start] 6291456
DEBUG - 2026-03-30 18:24:31 --> [TRACE]
INFO - 2026-03-30 18:24:31 --> [REQ_ID=1be85e203994] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-30 18:24:31 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-30 18:24:31 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-03-30 18:24:31 --> [REQ_ID=1be85e203994] [VIEW_RENDER] themes/public/home
INFO - 2026-03-30 18:24:31 --> [REQ_ID=1be85e203994] [MEMORY][commonData:start] 10485760
INFO - 2026-03-30 18:24:31 --> themesMemory usage: 10485760
DEBUG - 2026-03-30 18:24:31 --> [MetaService] slug= pageName=Home cacheHit= path=DB
DEBUG - 2026-03-30 18:24:31 --> [REQ_ID=0db360f8f5c2] [FILTER_AFTER]
DEBUG - 2026-03-30 18:24:31 --> [REQ_ID=0db360f8f5c2] [LIFECYCLE][END] status=200 duration_ms=655.32 memory_delta=4194304
INFO - 2026-03-30 18:24:31 --> [REQ_ID=1be85e203994] [PERF] Execution time=0.657350
DEBUG - 2026-03-30 18:24:31 --> [REQ_ID=0db360f8f5c2] [REQUEST][END]
INFO - 2026-03-30 18:24:31 --> [REQ_ID=0db360f8f5c2] [PERF] Execution time=0.693354
DEBUG - 2026-03-30 18:26:22 --> [REQ_ID=5660624ace76] [REQUEST][START] HEAD /
DEBUG - 2026-03-30 18:26:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
ERROR - 2026-03-30 18:26:22 --> [404_ROUTE]
DEBUG - 2026-03-30 18:30:40 --> [REQ_ID=92aef2052fe2] [REQUEST][START] GET /
DEBUG - 2026-03-30 18:30:40 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-30 18:30:40 --> [REQ_ID=92aef2052fe2] [FILTER_BEFORE] /
DEBUG - 2026-03-30 18:30:40 --> [REQ_ID=92aef2052fe2] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-30 18:30:40 --> [REQ_ID=92aef2052fe2] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-30 18:30:40 --> [CSRF] token name=csrf_test_name hash=d30f0f63b3fdd29200d6ef1288f38eef
DEBUG - 2026-03-30 18:30:40 --> [REQ_ID=89516106efee] [INIT] App\Controllers\Home::GET
INFO - 2026-03-30 18:30:40 --> [REQ_ID=89516106efee] [MEMORY][controller-start] 6291456
DEBUG - 2026-03-30 18:30:40 --> [TRACE]
INFO - 2026-03-30 18:30:40 --> [REQ_ID=89516106efee] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-30 18:30:40 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-30 18:30:41 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
DEBUG - 2026-03-30 18:30:41 --> [REQ_ID=89516106efee] [VIEW_RENDER] themes/public/home
INFO - 2026-03-30 18:30:41 --> [REQ_ID=89516106efee] [MEMORY][commonData:start] 10485760
INFO - 2026-03-30 18:30:41 --> themesMemory usage: 10485760
DEBUG - 2026-03-30 18:30:41 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-30 18:30:41 --> [REQ_ID=92aef2052fe2] [FILTER_AFTER]
DEBUG - 2026-03-30 18:30:41 --> [REQ_ID=92aef2052fe2] [LIFECYCLE][END] status=200 duration_ms=643.50 memory_delta=4194304
INFO - 2026-03-30 18:30:41 --> [REQ_ID=89516106efee] [PERF] Execution time=0.645512
DEBUG - 2026-03-30 18:30:41 --> [REQ_ID=92aef2052fe2] [REQUEST][END]
INFO - 2026-03-30 18:30:41 --> [REQ_ID=92aef2052fe2] [PERF] Execution time=0.682468
DEBUG - 2026-03-30 18:31:22 --> [REQ_ID=59683227170d] [REQUEST][START] HEAD /
DEBUG - 2026-03-30 18:31:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
ERROR - 2026-03-30 18:31:22 --> [404_ROUTE]
DEBUG - 2026-03-30 18:33:29 --> [REQ_ID=d9dbc48c05df] [REQUEST][START] GET /index.php/How-It-Works/Investor-Profile
DEBUG - 2026-03-30 18:33:29 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-30 18:33:29 --> [REQ_ID=d9dbc48c05df] [FILTER_BEFORE] /index.php/How-It-Works/Investor-Profile
DEBUG - 2026-03-30 18:33:29 --> [REQ_ID=d9dbc48c05df] [ROUTE] Controller=\App\Modules\Blog\Controllers\HowItWorksController Method=show
DEBUG - 2026-03-30 18:33:29 --> [REQ_ID=d9dbc48c05df] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/How-It-Works/Investor-Profile
DEBUG - 2026-03-30 18:33:29 --> [CSRF] token name=csrf_test_name hash=de651398d7adbc0a2b28ab04476609b5
DEBUG - 2026-03-30 18:33:29 --> [REQ_ID=0853482c0305] [INIT] App\Modules\Blog\Controllers\HowItWorksController::GET
INFO - 2026-03-30 18:33:29 --> [REQ_ID=0853482c0305] [MEMORY][controller-start] 6291456
DEBUG - 2026-03-30 18:33:29 --> [TRACE]
DEBUG - 2026-03-30 18:33:29 --> [REQ_ID=0853482c0305] [METHOD_ENTRY] show
DEBUG - 2026-03-30 18:33:29 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-30 18:33:29 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-30 18:33:29 --> MyMICoin initialized ONCE
DEBUG - 2026-03-30 18:33:29 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-30 18:33:29 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-30 18:33:29 --> MyMIWallets skipped (no user context)
ERROR - 2026-03-30 18:33:29 --> HowItWorksController failure: Cannot access protected property CodeIgniter\HTTP\IncomingRequest::$uri
INFO - 2026-03-30 18:33:29 --> [REQ_ID=0853482c0305] [PERF] Execution time=0.112505
DEBUG - 2026-03-30 18:36:22 --> [REQ_ID=ce57be40a7ae] [REQUEST][START] HEAD /
DEBUG - 2026-03-30 18:36:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
ERROR - 2026-03-30 18:36:22 --> [404_ROUTE]
DEBUG - 2026-03-30 18:41:22 --> [REQ_ID=d8830ec55ee0] [REQUEST][START] HEAD /
DEBUG - 2026-03-30 18:41:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
ERROR - 2026-03-30 18:41:22 --> [404_ROUTE]
DEBUG - 2026-03-30 18:46:22 --> [REQ_ID=b2a66516a6b8] [REQUEST][START] HEAD /
DEBUG - 2026-03-30 18:46:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
ERROR - 2026-03-30 18:46:22 --> [404_ROUTE]
DEBUG - 2026-03-30 18:51:22 --> [REQ_ID=46f40633a632] [REQUEST][START] HEAD /
DEBUG - 2026-03-30 18:51:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
ERROR - 2026-03-30 18:51:22 --> [404_ROUTE]
DEBUG - 2026-03-30 18:56:22 --> [REQ_ID=286ceac772d4] [REQUEST][START] HEAD /
DEBUG - 2026-03-30 18:56:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
ERROR - 2026-03-30 18:56:22 --> [404_ROUTE]
DEBUG - 2026-03-30 18:57:11 --> [REQ_ID=cfd51fc94501] [REQUEST][START] GET /index.php/Account/Social-Media
DEBUG - 2026-03-30 18:57:11 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-30 18:57:11 --> [REQ_ID=cfd51fc94501] [FILTER_BEFORE] /index.php/Account/Social-Media
DEBUG - 2026-03-30 18:57:11 --> [REQ_ID=cfd51fc94501] [ROUTE] Controller=\App\Modules\User\Controllers\DashboardController Method=SocialMedia
DEBUG - 2026-03-30 18:57:11 --> [REQ_ID=cfd51fc94501] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Account/Social-Media
DEBUG - 2026-03-30 18:57:11 --> [CSRF] token name=csrf_test_name hash=d29a6a755e47e6600938ed8b4a06195b
DEBUG - 2026-03-30 18:57:11 --> [REQ_ID=cfd51fc94501] [REQUEST][END]
INFO - 2026-03-30 18:57:11 --> [REQ_ID=cfd51fc94501] [PERF] Execution time=0.026005
DEBUG - 2026-03-30 18:57:11 --> [REQ_ID=87b8b873cad7] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-30 18:57:11 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-30 18:57:11 --> [REQ_ID=87b8b873cad7] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-30 18:57:11 --> [REQ_ID=87b8b873cad7] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-30 18:57:11 --> [REQ_ID=87b8b873cad7] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-30 18:57:11 --> [CSRF] token name=csrf_test_name hash=07ae96275fe0b5518f98f37e3a9190a5
DEBUG - 2026-03-30 18:57:11 --> [REQ_ID=ee296857bcae] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-30 18:57:11 --> [REQ_ID=ee296857bcae] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-30 18:57:11 --> [TRACE]
DEBUG - 2026-03-30 18:57:11 --> [REQ_ID=87b8b873cad7] [FILTER_AFTER]
DEBUG - 2026-03-30 18:57:11 --> [REQ_ID=87b8b873cad7] [LIFECYCLE][END] status=200 duration_ms=29.85 memory_delta=0
INFO - 2026-03-30 18:57:11 --> [REQ_ID=ee296857bcae] [PERF] Execution time=0.033377
DEBUG - 2026-03-30 18:57:11 --> [REQ_ID=87b8b873cad7] [REQUEST][END]
INFO - 2026-03-30 18:57:11 --> [REQ_ID=87b8b873cad7] [PERF] Execution time=0.045082
DEBUG - 2026-03-30 19:00:02 --> [REQ_ID=13c065b51c5e] [REQUEST][START] GET /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-30 19:00:02 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-30 19:00:02 --> [REQ_ID=13c065b51c5e] [FILTER_BEFORE] /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-30 19:00:02 --> [REQ_ID=13c065b51c5e] [ROUTE] Controller=\App\Modules\Management\Controllers\ManagementAPIController Method=Run_CRON_Tasks
DEBUG - 2026-03-30 19:00:02 --> [REQ_ID=13c065b51c5e] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-30 19:00:02 --> [REQ_ID=13c065b51c5e] [REQUEST][END]
INFO - 2026-03-30 19:00:02 --> [REQ_ID=13c065b51c5e] [PERF] Execution time=0.045840
ERROR - 2026-03-30 19:00:02 --> Table 'mymiwallet.bf_route_error_heatmap' doesn't exist
in SYSTEMPATH/Database/MySQLi/Connection.php on line 300.
 1 SYSTEMPATH/Database/MySQLi/Connection.php(300): mysqli->query('SELECT *
FROM `bf_route_error_heatmap`
WHERE `route` = \'/index.php/API/Management/Run-CRON-Tasks\'
AND `error_type` = \'http_403\'
AND `status_code` = 403
 LIMIT 1', 0)
 2 SYSTEMPATH/Database/BaseConnection.php(769): CodeIgniter\Database\MySQLi\Connection->execute('SELECT *
FROM `bf_route_error_heatmap`
WHERE `route` = \'/index.php/API/Management/Run-CRON-Tasks\'
AND `error_type` = \'http_403\'
AND `status_code` = 403
 LIMIT 1')
 3 SYSTEMPATH/Database/BaseConnection.php(686): CodeIgniter\Database\BaseConnection->simpleQuery('SELECT *
FROM `bf_route_error_heatmap`
WHERE `route` = \'/index.php/API/Management/Run-CRON-Tasks\'
AND `error_type` = \'http_403\'
AND `status_code` = 403
 LIMIT 1')
 4 SYSTEMPATH/Database/BaseBuilder.php(1649): CodeIgniter\Database\BaseConnection->query('SELECT *
FROM `bf_route_error_heatmap`
WHERE `route` = :route:
AND `error_type` = :error_type:
AND `status_code` = :status_code:
 LIMIT 1', [...], false)
 5 SYSTEMPATH/Model.php(296): CodeIgniter\Database\BaseBuilder->get()
 6 SYSTEMPATH/BaseModel.php(713): CodeIgniter\Model->doFirst()
 7 APPPATH/Services/AIOps/RouteErrorHeatmapService.php(28): CodeIgniter\BaseModel->first()
 8 APPPATH/Config/Events.php(65): App\Services\AIOps\RouteErrorHeatmapService->record('/index.php/API/Management/Run-CRON-Tasks', 'http_403', 403)
 9 SYSTEMPATH/Events/Events.php(152): CodeIgniter\Events\Events::Config\{closure}()
10 SYSTEMPATH/CodeIgniter.php(357): CodeIgniter\Events\Events::trigger('post_system')
11 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
12 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
13 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
DEBUG - 2026-03-30 19:00:02 --> Route heatmap post_system hook skipped: Table 'mymiwallet.bf_route_error_heatmap' doesn't exist
DEBUG - 2026-03-30 19:01:22 --> [REQ_ID=cf176083dd31] [REQUEST][START] HEAD /
DEBUG - 2026-03-30 19:01:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
ERROR - 2026-03-30 19:01:22 --> [404_ROUTE]
DEBUG - 2026-03-30 19:03:30 --> [REQ_ID=1f7973b1d394] [REQUEST][START] GET /
DEBUG - 2026-03-30 19:03:30 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-30 19:03:30 --> [REQ_ID=1f7973b1d394] [REQUEST][END]
INFO - 2026-03-30 19:03:30 --> [REQ_ID=1f7973b1d394] [PERF] Execution time=0.049736
ERROR - 2026-03-30 19:03:31 --> Table 'mymiwallet.bf_route_error_heatmap' doesn't exist
in SYSTEMPATH/Database/MySQLi/Connection.php on line 300.
 1 SYSTEMPATH/Database/MySQLi/Connection.php(300): mysqli->query('SELECT *
FROM `bf_route_error_heatmap`
WHERE `route` = \'/index.php/\'
AND `error_type` = \'http_403\'
AND `status_code` = 403
 LIMIT 1', 0)
 2 SYSTEMPATH/Database/BaseConnection.php(769): CodeIgniter\Database\MySQLi\Connection->execute('SELECT *
FROM `bf_route_error_heatmap`
WHERE `route` = \'/index.php/\'
AND `error_type` = \'http_403\'
AND `status_code` = 403
 LIMIT 1')
 3 SYSTEMPATH/Database/BaseConnection.php(686): CodeIgniter\Database\BaseConnection->simpleQuery('SELECT *
FROM `bf_route_error_heatmap`
WHERE `route` = \'/index.php/\'
AND `error_type` = \'http_403\'
AND `status_code` = 403
 LIMIT 1')
 4 SYSTEMPATH/Database/BaseBuilder.php(1649): CodeIgniter\Database\BaseConnection->query('SELECT *
FROM `bf_route_error_heatmap`
WHERE `route` = :route:
AND `error_type` = :error_type:
AND `status_code` = :status_code:
 LIMIT 1', [...], false)
 5 SYSTEMPATH/Model.php(296): CodeIgniter\Database\BaseBuilder->get()
 6 SYSTEMPATH/BaseModel.php(713): CodeIgniter\Model->doFirst()
 7 APPPATH/Services/AIOps/RouteErrorHeatmapService.php(28): CodeIgniter\BaseModel->first()
 8 APPPATH/Config/Events.php(65): App\Services\AIOps\RouteErrorHeatmapService->record('/index.php/', 'http_403', 403)
 9 SYSTEMPATH/Events/Events.php(152): CodeIgniter\Events\Events::Config\{closure}()
10 SYSTEMPATH/CodeIgniter.php(357): CodeIgniter\Events\Events::trigger('post_system')
11 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
12 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
13 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
DEBUG - 2026-03-30 19:03:31 --> Route heatmap post_system hook skipped: Table 'mymiwallet.bf_route_error_heatmap' doesn't exist
DEBUG - 2026-03-30 19:06:22 --> [REQ_ID=cdbc7dd99b94] [REQUEST][START] HEAD /
DEBUG - 2026-03-30 19:06:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
ERROR - 2026-03-30 19:06:22 --> [404_ROUTE]
DEBUG - 2026-03-30 19:07:09 --> [REQ_ID=61513e580ea6] [REQUEST][START] GET /index.php/Budget/Financial-Institute
DEBUG - 2026-03-30 19:07:09 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
INFO - 2026-03-30 19:07:09 --> REDIRECTED ROUTE at https://www.mymiwallet.com/Budget/Account-Manager
DEBUG - 2026-03-30 19:07:09 --> [REQ_ID=61513e580ea6] [REQUEST][END]
INFO - 2026-03-30 19:07:09 --> [REQ_ID=61513e580ea6] [PERF] Execution time=0.016442
DEBUG - 2026-03-30 19:07:12 --> [REQ_ID=29c07c5479f9] [REQUEST][START] GET /
DEBUG - 2026-03-30 19:07:12 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-30 19:07:12 --> [REQ_ID=29c07c5479f9] [FILTER_BEFORE] /
DEBUG - 2026-03-30 19:07:12 --> [REQ_ID=29c07c5479f9] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-30 19:07:12 --> [REQ_ID=29c07c5479f9] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-30 19:07:12 --> [CSRF] token name=csrf_test_name hash=45b49f566cee050f48e0fcb80f442ca5
DEBUG - 2026-03-30 19:07:12 --> [REQ_ID=f82d4a144bb5] [INIT] App\Controllers\Home::GET
INFO - 2026-03-30 19:07:12 --> [REQ_ID=f82d4a144bb5] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-30 19:07:12 --> [TRACE]
INFO - 2026-03-30 19:07:12 --> [REQ_ID=f82d4a144bb5] [MEMORY][commonData:start] 4194304
DEBUG - 2026-03-30 19:07:12 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-30 19:07:13 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-03-30 19:07:13 --> [REQ_ID=f82d4a144bb5] [VIEW_RENDER] themes/public/home
INFO - 2026-03-30 19:07:13 --> [REQ_ID=f82d4a144bb5] [MEMORY][commonData:start] 8388608
INFO - 2026-03-30 19:07:13 --> themesMemory usage: 8388608
DEBUG - 2026-03-30 19:07:13 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-30 19:07:13 --> [REQ_ID=29c07c5479f9] [FILTER_AFTER]
DEBUG - 2026-03-30 19:07:13 --> [REQ_ID=29c07c5479f9] [LIFECYCLE][END] status=200 duration_ms=646.27 memory_delta=4194304
INFO - 2026-03-30 19:07:13 --> [REQ_ID=f82d4a144bb5] [PERF] Execution time=0.644625
DEBUG - 2026-03-30 19:07:13 --> [REQ_ID=29c07c5479f9] [REQUEST][END]
INFO - 2026-03-30 19:07:13 --> [REQ_ID=29c07c5479f9] [PERF] Execution time=0.661584
DEBUG - 2026-03-30 19:11:22 --> [REQ_ID=42a383a7a64b] [REQUEST][START] HEAD /
DEBUG - 2026-03-30 19:11:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
ERROR - 2026-03-30 19:11:22 --> [404_ROUTE]
DEBUG - 2026-03-30 19:15:01 --> [REQ_ID=d7e443c79798] [REQUEST][START] GET /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-30 19:15:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-30 19:15:01 --> [REQ_ID=d7e443c79798] [FILTER_BEFORE] /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-30 19:15:01 --> [REQ_ID=d7e443c79798] [ROUTE] Controller=\App\Modules\APIs\Controllers\AlertsAPIController Method=fetchEmailAlerts
DEBUG - 2026-03-30 19:15:01 --> [REQ_ID=d7e443c79798] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-30 19:15:01 --> [REQ_ID=d7e443c79798] [REQUEST][END]
INFO - 2026-03-30 19:15:01 --> [REQ_ID=d7e443c79798] [PERF] Execution time=0.042075
ERROR - 2026-03-30 19:15:01 --> Table 'mymiwallet.bf_route_error_heatmap' doesn't exist
in SYSTEMPATH/Database/MySQLi/Connection.php on line 300.
 1 SYSTEMPATH/Database/MySQLi/Connection.php(300): mysqli->query('SELECT *
FROM `bf_route_error_heatmap`
WHERE `route` = \'/index.php/API/Alerts/fetchEmailAlerts\'
AND `error_type` = \'http_403\'
AND `status_code` = 403
 LIMIT 1', 0)
 2 SYSTEMPATH/Database/BaseConnection.php(769): CodeIgniter\Database\MySQLi\Connection->execute('SELECT *
FROM `bf_route_error_heatmap`
WHERE `route` = \'/index.php/API/Alerts/fetchEmailAlerts\'
AND `error_type` = \'http_403\'
AND `status_code` = 403
 LIMIT 1')
 3 SYSTEMPATH/Database/BaseConnection.php(686): CodeIgniter\Database\BaseConnection->simpleQuery('SELECT *
FROM `bf_route_error_heatmap`
WHERE `route` = \'/index.php/API/Alerts/fetchEmailAlerts\'
AND `error_type` = \'http_403\'
AND `status_code` = 403
 LIMIT 1')
 4 SYSTEMPATH/Database/BaseBuilder.php(1649): CodeIgniter\Database\BaseConnection->query('SELECT *
FROM `bf_route_error_heatmap`
WHERE `route` = :route:
AND `error_type` = :error_type:
AND `status_code` = :status_code:
 LIMIT 1', [...], false)
 5 SYSTEMPATH/Model.php(296): CodeIgniter\Database\BaseBuilder->get()
 6 SYSTEMPATH/BaseModel.php(713): CodeIgniter\Model->doFirst()
 7 APPPATH/Services/AIOps/RouteErrorHeatmapService.php(28): CodeIgniter\BaseModel->first()
 8 APPPATH/Config/Events.php(65): App\Services\AIOps\RouteErrorHeatmapService->record('/index.php/API/Alerts/fetchEmailAlerts', 'http_403', 403)
 9 SYSTEMPATH/Events/Events.php(152): CodeIgniter\Events\Events::Config\{closure}()
10 SYSTEMPATH/CodeIgniter.php(357): CodeIgniter\Events\Events::trigger('post_system')
11 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
12 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
13 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
DEBUG - 2026-03-30 19:15:01 --> Route heatmap post_system hook skipped: Table 'mymiwallet.bf_route_error_heatmap' doesn't exist
DEBUG - 2026-03-30 19:16:22 --> [REQ_ID=0b378173ed71] [REQUEST][START] HEAD /
DEBUG - 2026-03-30 19:16:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
ERROR - 2026-03-30 19:16:22 --> [404_ROUTE]
DEBUG - 2026-03-30 19:21:22 --> [REQ_ID=5c502552b98e] [REQUEST][START] HEAD /
DEBUG - 2026-03-30 19:21:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
ERROR - 2026-03-30 19:21:22 --> [404_ROUTE]
DEBUG - 2026-03-30 19:26:22 --> [REQ_ID=2713fb67aec2] [REQUEST][START] HEAD /
DEBUG - 2026-03-30 19:26:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
ERROR - 2026-03-30 19:26:22 --> [404_ROUTE]
DEBUG - 2026-03-30 19:31:22 --> [REQ_ID=a0ab5500e3f1] [REQUEST][START] HEAD /
DEBUG - 2026-03-30 19:31:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
ERROR - 2026-03-30 19:31:22 --> [404_ROUTE]
DEBUG - 2026-03-30 19:34:59 --> [REQ_ID=d2c704bdbae7] [REQUEST][START] GET /index.php/How-It-Works/Automated-Financial-Insights
DEBUG - 2026-03-30 19:34:59 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-30 19:34:59 --> [REQ_ID=d2c704bdbae7] [FILTER_BEFORE] /index.php/How-It-Works/Automated-Financial-Insights
DEBUG - 2026-03-30 19:34:59 --> [REQ_ID=d2c704bdbae7] [ROUTE] Controller=\App\Modules\Blog\Controllers\HowItWorksController Method=show
DEBUG - 2026-03-30 19:34:59 --> [REQ_ID=d2c704bdbae7] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/How-It-Works/Automated-Financial-Insights
DEBUG - 2026-03-30 19:34:59 --> [CSRF] token name=csrf_test_name hash=2ca026a7847f300d87c9760f4725733e
DEBUG - 2026-03-30 19:34:59 --> [REQ_ID=7f4acbcb1abd] [INIT] App\Modules\Blog\Controllers\HowItWorksController::GET
INFO - 2026-03-30 19:34:59 --> [REQ_ID=7f4acbcb1abd] [MEMORY][controller-start] 6291456
DEBUG - 2026-03-30 19:34:59 --> [TRACE]
DEBUG - 2026-03-30 19:35:00 --> [REQ_ID=7f4acbcb1abd] [METHOD_ENTRY] show
DEBUG - 2026-03-30 19:35:00 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-30 19:35:00 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-30 19:35:00 --> MyMICoin initialized ONCE
DEBUG - 2026-03-30 19:35:00 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-30 19:35:00 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-30 19:35:00 --> MyMIWallets skipped (no user context)
ERROR - 2026-03-30 19:35:00 --> HowItWorksController failure: Cannot access protected property CodeIgniter\HTTP\IncomingRequest::$uri
INFO - 2026-03-30 19:35:00 --> [REQ_ID=7f4acbcb1abd] [PERF] Execution time=0.239651
DEBUG - 2026-03-30 19:36:22 --> [REQ_ID=3277db1a7a1e] [REQUEST][START] HEAD /
DEBUG - 2026-03-30 19:36:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
ERROR - 2026-03-30 19:36:22 --> [404_ROUTE]
DEBUG - 2026-03-30 19:36:38 --> [REQ_ID=05bcb2ffac74] [REQUEST][START] GET /index.php/Premium-Features/Due-Diligence-Database
DEBUG - 2026-03-30 19:36:38 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
INFO - 2026-03-30 19:36:38 --> REDIRECTED ROUTE at https://www.mymiwallet.com/Features/Brokerage-Integrations
DEBUG - 2026-03-30 19:36:38 --> [REQ_ID=05bcb2ffac74] [REQUEST][END]
INFO - 2026-03-30 19:36:38 --> [REQ_ID=05bcb2ffac74] [PERF] Execution time=0.018632
DEBUG - 2026-03-30 19:38:15 --> [REQ_ID=0762a5b14a56] [REQUEST][START] GET /index.php/Budget
DEBUG - 2026-03-30 19:38:15 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-30 19:38:15 --> [REQ_ID=0762a5b14a56] [FILTER_BEFORE] /index.php/Budget
DEBUG - 2026-03-30 19:38:15 --> [REQ_ID=0762a5b14a56] [ROUTE] Controller=\App\Modules\User\Controllers\BudgetController Method=index
DEBUG - 2026-03-30 19:38:15 --> [REQ_ID=0762a5b14a56] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Budget
DEBUG - 2026-03-30 19:38:15 --> [CSRF] token name=csrf_test_name hash=f2cfdc2b71501f0f1490567f8c4e7db2
DEBUG - 2026-03-30 19:38:15 --> [REQ_ID=0762a5b14a56] [REQUEST][END]
INFO - 2026-03-30 19:38:15 --> [REQ_ID=0762a5b14a56] [PERF] Execution time=0.056400
DEBUG - 2026-03-30 19:38:15 --> [REQ_ID=41aa9f029856] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-30 19:38:15 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-30 19:38:15 --> [REQ_ID=41aa9f029856] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-30 19:38:15 --> [REQ_ID=41aa9f029856] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-30 19:38:15 --> [REQ_ID=41aa9f029856] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-30 19:38:15 --> [CSRF] token name=csrf_test_name hash=50bf8dadf9281895ad972688d2bfe07b
DEBUG - 2026-03-30 19:38:15 --> [REQ_ID=409fd444de44] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-30 19:38:15 --> [REQ_ID=409fd444de44] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-30 19:38:15 --> [TRACE]
DEBUG - 2026-03-30 19:38:15 --> [REQ_ID=41aa9f029856] [FILTER_AFTER]
DEBUG - 2026-03-30 19:38:15 --> [REQ_ID=41aa9f029856] [LIFECYCLE][END] status=200 duration_ms=67.96 memory_delta=0
INFO - 2026-03-30 19:38:15 --> [REQ_ID=409fd444de44] [PERF] Execution time=0.071838
DEBUG - 2026-03-30 19:38:15 --> [REQ_ID=41aa9f029856] [REQUEST][END]
INFO - 2026-03-30 19:38:15 --> [REQ_ID=41aa9f029856] [PERF] Execution time=0.086131
DEBUG - 2026-03-30 19:41:14 --> [REQ_ID=8dc2abb24a1a] [REQUEST][START] HEAD /
DEBUG - 2026-03-30 19:41:14 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
ERROR - 2026-03-30 19:41:14 --> [404_ROUTE]
DEBUG - 2026-03-30 19:41:15 --> [REQ_ID=71574ea36ad7] [REQUEST][START] HEAD /
DEBUG - 2026-03-30 19:41:15 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
ERROR - 2026-03-30 19:41:15 --> [404_ROUTE]
DEBUG - 2026-03-30 19:41:15 --> [REQ_ID=907769e7d5c0] [REQUEST][START] HEAD /
DEBUG - 2026-03-30 19:41:15 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
ERROR - 2026-03-30 19:41:15 --> [404_ROUTE]
DEBUG - 2026-03-30 19:41:22 --> [REQ_ID=b931e2f2d7d1] [REQUEST][START] HEAD /
DEBUG - 2026-03-30 19:41:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
ERROR - 2026-03-30 19:41:22 --> [404_ROUTE]
DEBUG - 2026-03-30 19:44:12 --> [REQ_ID=6fa2ca1b24dc] [REQUEST][START] GET /index.php/How-It-Works/MyMI-Exchange
DEBUG - 2026-03-30 19:44:12 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-30 19:44:12 --> [REQ_ID=6fa2ca1b24dc] [FILTER_BEFORE] /index.php/How-It-Works/MyMI-Exchange
DEBUG - 2026-03-30 19:44:12 --> [REQ_ID=6fa2ca1b24dc] [ROUTE] Controller=\App\Modules\Blog\Controllers\HowItWorksController Method=show
DEBUG - 2026-03-30 19:44:12 --> [REQ_ID=6fa2ca1b24dc] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/How-It-Works/MyMI-Exchange
DEBUG - 2026-03-30 19:44:12 --> [CSRF] token name=csrf_test_name hash=e1c078a3b2975727dd4d52f58ab689b6
DEBUG - 2026-03-30 19:44:12 --> [REQ_ID=874899de0500] [INIT] App\Modules\Blog\Controllers\HowItWorksController::GET
INFO - 2026-03-30 19:44:12 --> [REQ_ID=874899de0500] [MEMORY][controller-start] 6291456
DEBUG - 2026-03-30 19:44:12 --> [TRACE]
DEBUG - 2026-03-30 19:44:12 --> [REQ_ID=874899de0500] [METHOD_ENTRY] show
DEBUG - 2026-03-30 19:44:12 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-30 19:44:12 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-30 19:44:12 --> MyMICoin initialized ONCE
DEBUG - 2026-03-30 19:44:12 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-30 19:44:12 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-30 19:44:12 --> MyMIWallets skipped (no user context)
ERROR - 2026-03-30 19:44:12 --> HowItWorksController failure: Cannot access protected property CodeIgniter\HTTP\IncomingRequest::$uri
INFO - 2026-03-30 19:44:12 --> [REQ_ID=874899de0500] [PERF] Execution time=0.332931
DEBUG - 2026-03-30 19:46:22 --> [REQ_ID=5424792013e9] [REQUEST][START] HEAD /
DEBUG - 2026-03-30 19:46:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
ERROR - 2026-03-30 19:46:22 --> [404_ROUTE]
DEBUG - 2026-03-30 19:51:22 --> [REQ_ID=c82b7cdbe02e] [REQUEST][START] HEAD /
DEBUG - 2026-03-30 19:51:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
ERROR - 2026-03-30 19:51:22 --> [404_ROUTE]
DEBUG - 2026-03-30 19:56:22 --> [REQ_ID=3276359d1226] [REQUEST][START] HEAD /
DEBUG - 2026-03-30 19:56:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
ERROR - 2026-03-30 19:56:22 --> [404_ROUTE]
DEBUG - 2026-03-30 20:00:01 --> [REQ_ID=3b3fc22abbb4] [REQUEST][START] GET /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-30 20:00:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-30 20:00:01 --> [REQ_ID=3b3fc22abbb4] [FILTER_BEFORE] /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-30 20:00:01 --> [REQ_ID=3b3fc22abbb4] [ROUTE] Controller=\App\Modules\Management\Controllers\ManagementAPIController Method=Run_CRON_Tasks
DEBUG - 2026-03-30 20:00:01 --> [REQ_ID=3b3fc22abbb4] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-30 20:00:01 --> [REQ_ID=3b3fc22abbb4] [REQUEST][END]
INFO - 2026-03-30 20:00:01 --> [REQ_ID=3b3fc22abbb4] [PERF] Execution time=0.044313
ERROR - 2026-03-30 20:00:01 --> Table 'mymiwallet.bf_route_error_heatmap' doesn't exist
in SYSTEMPATH/Database/MySQLi/Connection.php on line 300.
 1 SYSTEMPATH/Database/MySQLi/Connection.php(300): mysqli->query('SELECT *
FROM `bf_route_error_heatmap`
WHERE `route` = \'/index.php/API/Management/Run-CRON-Tasks\'
AND `error_type` = \'http_403\'
AND `status_code` = 403
 LIMIT 1', 0)
 2 SYSTEMPATH/Database/BaseConnection.php(769): CodeIgniter\Database\MySQLi\Connection->execute('SELECT *
FROM `bf_route_error_heatmap`
WHERE `route` = \'/index.php/API/Management/Run-CRON-Tasks\'
AND `error_type` = \'http_403\'
AND `status_code` = 403
 LIMIT 1')
 3 SYSTEMPATH/Database/BaseConnection.php(686): CodeIgniter\Database\BaseConnection->simpleQuery('SELECT *
FROM `bf_route_error_heatmap`
WHERE `route` = \'/index.php/API/Management/Run-CRON-Tasks\'
AND `error_type` = \'http_403\'
AND `status_code` = 403
 LIMIT 1')
 4 SYSTEMPATH/Database/BaseBuilder.php(1649): CodeIgniter\Database\BaseConnection->query('SELECT *
FROM `bf_route_error_heatmap`
WHERE `route` = :route:
AND `error_type` = :error_type:
AND `status_code` = :status_code:
 LIMIT 1', [...], false)
 5 SYSTEMPATH/Model.php(296): CodeIgniter\Database\BaseBuilder->get()
 6 SYSTEMPATH/BaseModel.php(713): CodeIgniter\Model->doFirst()
 7 APPPATH/Services/AIOps/RouteErrorHeatmapService.php(28): CodeIgniter\BaseModel->first()
 8 APPPATH/Config/Events.php(65): App\Services\AIOps\RouteErrorHeatmapService->record('/index.php/API/Management/Run-CRON-Tasks', 'http_403', 403)
 9 SYSTEMPATH/Events/Events.php(152): CodeIgniter\Events\Events::Config\{closure}()
10 SYSTEMPATH/CodeIgniter.php(357): CodeIgniter\Events\Events::trigger('post_system')
11 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
12 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
13 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
DEBUG - 2026-03-30 20:00:01 --> Route heatmap post_system hook skipped: Table 'mymiwallet.bf_route_error_heatmap' doesn't exist
DEBUG - 2026-03-30 20:01:22 --> [REQ_ID=fc0667100065] [REQUEST][START] HEAD /
DEBUG - 2026-03-30 20:01:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
ERROR - 2026-03-30 20:01:22 --> [404_ROUTE]
DEBUG - 2026-03-30 20:03:29 --> [REQ_ID=7011d5c786d4] [REQUEST][START] GET /index.php/Account
DEBUG - 2026-03-30 20:03:29 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-30 20:03:29 --> [REQ_ID=7011d5c786d4] [FILTER_BEFORE] /index.php/Account
DEBUG - 2026-03-30 20:03:29 --> [REQ_ID=7011d5c786d4] [ROUTE] Controller=\App\Modules\User\Controllers\DashboardController Method=account
DEBUG - 2026-03-30 20:03:29 --> [REQ_ID=7011d5c786d4] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Account
DEBUG - 2026-03-30 20:03:29 --> [CSRF] token name=csrf_test_name hash=29baf8f015ef37dc5c4f6374bceb7ad9
DEBUG - 2026-03-30 20:03:29 --> [REQ_ID=7011d5c786d4] [REQUEST][END]
INFO - 2026-03-30 20:03:29 --> [REQ_ID=7011d5c786d4] [PERF] Execution time=0.054173
DEBUG - 2026-03-30 20:03:30 --> [REQ_ID=6e407c467f47] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-30 20:03:30 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-30 20:03:30 --> [REQ_ID=6e407c467f47] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-30 20:03:30 --> [REQ_ID=6e407c467f47] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-30 20:03:30 --> [REQ_ID=6e407c467f47] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-30 20:03:30 --> [CSRF] token name=csrf_test_name hash=8c17cf69b4f182a37d4ff1bfcca0c5aa
DEBUG - 2026-03-30 20:03:30 --> [REQ_ID=0612ee956b78] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-30 20:03:30 --> [REQ_ID=0612ee956b78] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-30 20:03:30 --> [TRACE]
DEBUG - 2026-03-30 20:03:30 --> [REQ_ID=6e407c467f47] [FILTER_AFTER]
DEBUG - 2026-03-30 20:03:30 --> [REQ_ID=6e407c467f47] [LIFECYCLE][END] status=200 duration_ms=264.93 memory_delta=0
INFO - 2026-03-30 20:03:30 --> [REQ_ID=0612ee956b78] [PERF] Execution time=0.268582
DEBUG - 2026-03-30 20:03:30 --> [REQ_ID=6e407c467f47] [REQUEST][END]
INFO - 2026-03-30 20:03:30 --> [REQ_ID=6e407c467f47] [PERF] Execution time=0.280390
DEBUG - 2026-03-30 20:06:22 --> [REQ_ID=3dd0d9214ef3] [REQUEST][START] HEAD /
DEBUG - 2026-03-30 20:06:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
ERROR - 2026-03-30 20:06:22 --> [404_ROUTE]
DEBUG - 2026-03-30 20:09:42 --> [REQ_ID=0f9857d7e145] [REQUEST][START] GET /index.php/Knowledgebase
DEBUG - 2026-03-30 20:09:42 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-30 20:09:42 --> [REQ_ID=0f9857d7e145] [FILTER_BEFORE] /index.php/Knowledgebase
DEBUG - 2026-03-30 20:09:42 --> [REQ_ID=0f9857d7e145] [ROUTE] Controller=\App\Modules\User\Controllers\KnowledgebaseController Method=index
DEBUG - 2026-03-30 20:09:42 --> [REQ_ID=0f9857d7e145] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Knowledgebase
DEBUG - 2026-03-30 20:09:42 --> [CSRF] token name=csrf_test_name hash=f0a7e1d9df5bd225ed5c70e99b6a0852
DEBUG - 2026-03-30 20:09:42 --> [REQ_ID=0f9857d7e145] [REQUEST][END]
INFO - 2026-03-30 20:09:42 --> [REQ_ID=0f9857d7e145] [PERF] Execution time=0.050489
DEBUG - 2026-03-30 20:09:42 --> [REQ_ID=819d97b9b97b] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-30 20:09:42 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-30 20:09:42 --> [REQ_ID=819d97b9b97b] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-30 20:09:42 --> [REQ_ID=819d97b9b97b] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-30 20:09:42 --> [REQ_ID=819d97b9b97b] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-30 20:09:42 --> [CSRF] token name=csrf_test_name hash=c4a06fd9e546a512cf931362d513b53d
DEBUG - 2026-03-30 20:09:42 --> [REQ_ID=2755b4a17344] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-30 20:09:42 --> [REQ_ID=2755b4a17344] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-30 20:09:42 --> [TRACE]
DEBUG - 2026-03-30 20:09:42 --> [REQ_ID=819d97b9b97b] [FILTER_AFTER]
DEBUG - 2026-03-30 20:09:42 --> [REQ_ID=819d97b9b97b] [LIFECYCLE][END] status=200 duration_ms=36.75 memory_delta=0
INFO - 2026-03-30 20:09:42 --> [REQ_ID=2755b4a17344] [PERF] Execution time=0.040993
DEBUG - 2026-03-30 20:09:42 --> [REQ_ID=819d97b9b97b] [REQUEST][END]
INFO - 2026-03-30 20:09:42 --> [REQ_ID=819d97b9b97b] [PERF] Execution time=0.053052
DEBUG - 2026-03-30 20:11:22 --> [REQ_ID=a0acbf8910b1] [REQUEST][START] HEAD /
DEBUG - 2026-03-30 20:11:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
ERROR - 2026-03-30 20:11:22 --> [404_ROUTE]
DEBUG - 2026-03-30 20:15:01 --> [REQ_ID=7aaf85d6177a] [REQUEST][START] GET /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-30 20:15:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-30 20:15:01 --> [REQ_ID=7aaf85d6177a] [FILTER_BEFORE] /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-30 20:15:01 --> [REQ_ID=7aaf85d6177a] [ROUTE] Controller=\App\Modules\APIs\Controllers\AlertsAPIController Method=fetchEmailAlerts
DEBUG - 2026-03-30 20:15:01 --> [REQ_ID=7aaf85d6177a] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-30 20:15:01 --> [REQ_ID=7aaf85d6177a] [REQUEST][END]
INFO - 2026-03-30 20:15:01 --> [REQ_ID=7aaf85d6177a] [PERF] Execution time=0.041653
ERROR - 2026-03-30 20:15:01 --> Table 'mymiwallet.bf_route_error_heatmap' doesn't exist
in SYSTEMPATH/Database/MySQLi/Connection.php on line 300.
 1 SYSTEMPATH/Database/MySQLi/Connection.php(300): mysqli->query('SELECT *
FROM `bf_route_error_heatmap`
WHERE `route` = \'/index.php/API/Alerts/fetchEmailAlerts\'
AND `error_type` = \'http_403\'
AND `status_code` = 403
 LIMIT 1', 0)
 2 SYSTEMPATH/Database/BaseConnection.php(769): CodeIgniter\Database\MySQLi\Connection->execute('SELECT *
FROM `bf_route_error_heatmap`
WHERE `route` = \'/index.php/API/Alerts/fetchEmailAlerts\'
AND `error_type` = \'http_403\'
AND `status_code` = 403
 LIMIT 1')
 3 SYSTEMPATH/Database/BaseConnection.php(686): CodeIgniter\Database\BaseConnection->simpleQuery('SELECT *
FROM `bf_route_error_heatmap`
WHERE `route` = \'/index.php/API/Alerts/fetchEmailAlerts\'
AND `error_type` = \'http_403\'
AND `status_code` = 403
 LIMIT 1')
 4 SYSTEMPATH/Database/BaseBuilder.php(1649): CodeIgniter\Database\BaseConnection->query('SELECT *
FROM `bf_route_error_heatmap`
WHERE `route` = :route:
AND `error_type` = :error_type:
AND `status_code` = :status_code:
 LIMIT 1', [...], false)
 5 SYSTEMPATH/Model.php(296): CodeIgniter\Database\BaseBuilder->get()
 6 SYSTEMPATH/BaseModel.php(713): CodeIgniter\Model->doFirst()
 7 APPPATH/Services/AIOps/RouteErrorHeatmapService.php(28): CodeIgniter\BaseModel->first()
 8 APPPATH/Config/Events.php(65): App\Services\AIOps\RouteErrorHeatmapService->record('/index.php/API/Alerts/fetchEmailAlerts', 'http_403', 403)
 9 SYSTEMPATH/Events/Events.php(152): CodeIgniter\Events\Events::Config\{closure}()
10 SYSTEMPATH/CodeIgniter.php(357): CodeIgniter\Events\Events::trigger('post_system')
11 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
12 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
13 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
DEBUG - 2026-03-30 20:15:01 --> Route heatmap post_system hook skipped: Table 'mymiwallet.bf_route_error_heatmap' doesn't exist
DEBUG - 2026-03-30 20:16:22 --> [REQ_ID=f0dcacf1d60e] [REQUEST][START] HEAD /
DEBUG - 2026-03-30 20:16:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
ERROR - 2026-03-30 20:16:22 --> [404_ROUTE]
DEBUG - 2026-03-30 20:21:22 --> [REQ_ID=e91e310cd618] [REQUEST][START] HEAD /
DEBUG - 2026-03-30 20:21:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
ERROR - 2026-03-30 20:21:22 --> [404_ROUTE]
DEBUG - 2026-03-30 20:23:45 --> [REQ_ID=b0279604fbf2] [REQUEST][START] GET /index.php/How-It-Works/MyMI-Gold
DEBUG - 2026-03-30 20:23:45 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-30 20:23:45 --> [REQ_ID=b0279604fbf2] [FILTER_BEFORE] /index.php/How-It-Works/MyMI-Gold
DEBUG - 2026-03-30 20:23:45 --> [REQ_ID=b0279604fbf2] [ROUTE] Controller=\App\Modules\Blog\Controllers\HowItWorksController Method=MyMIGold
DEBUG - 2026-03-30 20:23:45 --> [REQ_ID=b0279604fbf2] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/How-It-Works/MyMI-Gold
DEBUG - 2026-03-30 20:23:45 --> [CSRF] token name=csrf_test_name hash=85c131d22602d7d483f039d5a83bd4ef
DEBUG - 2026-03-30 20:23:45 --> [REQ_ID=dc10b6044563] [INIT] App\Modules\Blog\Controllers\HowItWorksController::GET
INFO - 2026-03-30 20:23:45 --> [REQ_ID=dc10b6044563] [MEMORY][controller-start] 6291456
DEBUG - 2026-03-30 20:23:45 --> [TRACE]
DEBUG - 2026-03-30 20:23:45 --> [REQ_ID=dc10b6044563] [METHOD_ENTRY] MyMIGold
DEBUG - 2026-03-30 20:23:45 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-30 20:23:45 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-30 20:23:45 --> MyMICoin initialized ONCE
DEBUG - 2026-03-30 20:23:45 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-30 20:23:45 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-30 20:23:45 --> MyMIWallets skipped (no user context)
INFO - 2026-03-30 20:23:45 --> [REQ_ID=dc10b6044563] [MEMORY][commonData:start] 6291456
INFO - 2026-03-30 20:23:45 --> themesMemory usage: 10485760
DEBUG - 2026-03-30 20:23:45 --> [MetaService] slug=how-it-works/mymi-gold pageName= cacheHit= path=DB
DEBUG - 2026-03-30 20:23:45 --> [REQ_ID=b0279604fbf2] [FILTER_AFTER]
DEBUG - 2026-03-30 20:23:45 --> [REQ_ID=b0279604fbf2] [LIFECYCLE][END] status=200 duration_ms=694.47 memory_delta=4194304
INFO - 2026-03-30 20:23:45 --> [REQ_ID=dc10b6044563] [PERF] Execution time=0.696076
DEBUG - 2026-03-30 20:23:45 --> [REQ_ID=b0279604fbf2] [REQUEST][END]
INFO - 2026-03-30 20:23:45 --> [REQ_ID=b0279604fbf2] [PERF] Execution time=0.740005
DEBUG - 2026-03-30 20:26:22 --> [REQ_ID=07ced9bb8fff] [REQUEST][START] HEAD /
DEBUG - 2026-03-30 20:26:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
ERROR - 2026-03-30 20:26:22 --> [404_ROUTE]
DEBUG - 2026-03-30 20:30:47 --> [REQ_ID=598f614c3efc] [REQUEST][START] GET /index.php/Purchase/MyMIGold
DEBUG - 2026-03-30 20:30:47 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-30 20:30:47 --> [REQ_ID=598f614c3efc] [FILTER_BEFORE] /index.php/Purchase/MyMIGold
DEBUG - 2026-03-30 20:30:47 --> [REQ_ID=598f614c3efc] [ROUTE] Controller=closure_route Method=index
DEBUG - 2026-03-30 20:30:47 --> [REQ_ID=598f614c3efc] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Purchase/MyMIGold
DEBUG - 2026-03-30 20:30:47 --> [CSRF] token name=csrf_test_name hash=26c54a87628d53c9629301bdc0026713
DEBUG - 2026-03-30 20:30:47 --> [REQ_ID=598f614c3efc] [REQUEST][END]
INFO - 2026-03-30 20:30:47 --> [REQ_ID=598f614c3efc] [PERF] Execution time=0.044256
DEBUG - 2026-03-30 20:30:48 --> [REQ_ID=95fb467a651b] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-30 20:30:48 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-30 20:30:48 --> [REQ_ID=95fb467a651b] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-30 20:30:48 --> [REQ_ID=95fb467a651b] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-30 20:30:48 --> [REQ_ID=95fb467a651b] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-30 20:30:48 --> [CSRF] token name=csrf_test_name hash=788f18ed1f083eb2010cbe7ec5190c54
DEBUG - 2026-03-30 20:30:48 --> [REQ_ID=83687b820938] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-30 20:30:48 --> [REQ_ID=83687b820938] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-30 20:30:48 --> [TRACE]
DEBUG - 2026-03-30 20:30:48 --> [REQ_ID=95fb467a651b] [FILTER_AFTER]
DEBUG - 2026-03-30 20:30:48 --> [REQ_ID=95fb467a651b] [LIFECYCLE][END] status=200 duration_ms=164.50 memory_delta=0
INFO - 2026-03-30 20:30:48 --> [REQ_ID=83687b820938] [PERF] Execution time=0.167859
DEBUG - 2026-03-30 20:30:48 --> [REQ_ID=95fb467a651b] [REQUEST][END]
INFO - 2026-03-30 20:30:48 --> [REQ_ID=95fb467a651b] [PERF] Execution time=0.183142
DEBUG - 2026-03-30 20:31:22 --> [REQ_ID=c7d2908ed9e2] [REQUEST][START] HEAD /
DEBUG - 2026-03-30 20:31:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
ERROR - 2026-03-30 20:31:22 --> [404_ROUTE]
DEBUG - 2026-03-30 20:32:09 --> [REQ_ID=2899f7341ebe] [REQUEST][START] HEAD /
DEBUG - 2026-03-30 20:32:09 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
ERROR - 2026-03-30 20:32:09 --> [404_ROUTE]
DEBUG - 2026-03-30 20:36:22 --> [REQ_ID=b050f4780bd9] [REQUEST][START] HEAD /
DEBUG - 2026-03-30 20:36:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
ERROR - 2026-03-30 20:36:22 --> [404_ROUTE]
DEBUG - 2026-03-30 20:36:31 --> [REQ_ID=0cf1b29ff45d] [REQUEST][START] GET /index.php/How-It-Works/Investment-Portfolio-Management
DEBUG - 2026-03-30 20:36:31 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-30 20:36:31 --> [REQ_ID=0cf1b29ff45d] [FILTER_BEFORE] /index.php/How-It-Works/Investment-Portfolio-Management
DEBUG - 2026-03-30 20:36:31 --> [REQ_ID=0cf1b29ff45d] [ROUTE] Controller=\App\Modules\Blog\Controllers\HowItWorksController Method=InvestmentPortfolioManagement
DEBUG - 2026-03-30 20:36:31 --> [REQ_ID=0cf1b29ff45d] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/How-It-Works/Investment-Portfolio-Management
DEBUG - 2026-03-30 20:36:31 --> [CSRF] token name=csrf_test_name hash=9fa2624c1b7babc475bb01058f3cc215
DEBUG - 2026-03-30 20:36:31 --> [REQ_ID=9eed532034b6] [INIT] App\Modules\Blog\Controllers\HowItWorksController::GET
INFO - 2026-03-30 20:36:31 --> [REQ_ID=9eed532034b6] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-30 20:36:31 --> [TRACE]
DEBUG - 2026-03-30 20:36:31 --> [REQ_ID=9eed532034b6] [METHOD_ENTRY] InvestmentPortfolioManagement
DEBUG - 2026-03-30 20:36:31 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-30 20:36:31 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-30 20:36:31 --> MyMICoin initialized ONCE
DEBUG - 2026-03-30 20:36:31 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-30 20:36:31 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-30 20:36:31 --> MyMIWallets skipped (no user context)
INFO - 2026-03-30 20:36:31 --> [REQ_ID=9eed532034b6] [MEMORY][commonData:start] 6291456
INFO - 2026-03-30 20:36:31 --> themesMemory usage: 8388608
DEBUG - 2026-03-30 20:36:31 --> [MetaService] slug=how-it-works/investment-portfolio-management pageName= cacheHit= path=DB
DEBUG - 2026-03-30 20:36:31 --> [REQ_ID=0cf1b29ff45d] [FILTER_AFTER]
DEBUG - 2026-03-30 20:36:31 --> [REQ_ID=0cf1b29ff45d] [LIFECYCLE][END] status=200 duration_ms=791.45 memory_delta=4194304
INFO - 2026-03-30 20:36:31 --> [REQ_ID=9eed532034b6] [PERF] Execution time=0.793067
DEBUG - 2026-03-30 20:36:31 --> [REQ_ID=0cf1b29ff45d] [REQUEST][END]
INFO - 2026-03-30 20:36:31 --> [REQ_ID=0cf1b29ff45d] [PERF] Execution time=0.812965
DEBUG - 2026-03-30 20:39:10 --> [REQ_ID=34ce7de7be4e] [REQUEST][START] GET /index.php/Preview/Alert/GRAB
DEBUG - 2026-03-30 20:39:10 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-30 20:39:10 --> [REQ_ID=34ce7de7be4e] [FILTER_BEFORE] /index.php/Preview/Alert/GRAB
DEBUG - 2026-03-30 20:39:10 --> [REQ_ID=34ce7de7be4e] [ROUTE] Controller=\App\Modules\User\Controllers\AlertsController Method=preview
DEBUG - 2026-03-30 20:39:10 --> [REQ_ID=34ce7de7be4e] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Preview/Alert/GRAB
DEBUG - 2026-03-30 20:39:10 --> [CSRF] token name=csrf_test_name hash=c80326988f456b0f8942b5f8772aff17
DEBUG - 2026-03-30 20:39:10 --> [REQ_ID=7f0b11be479b] [INIT] App\Modules\User\Controllers\AlertsController::GET
INFO - 2026-03-30 20:39:10 --> [REQ_ID=7f0b11be479b] [MEMORY][controller-start] 6291456
DEBUG - 2026-03-30 20:39:10 --> [TRACE]
DEBUG - 2026-03-30 20:39:10 --> [REQ_ID=7f0b11be479b] [METHOD_ENTRY] preview
DEBUG - 2026-03-30 20:39:10 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-30 20:39:10 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-30 20:39:10 --> MyMICoin initialized ONCE
DEBUG - 2026-03-30 20:39:10 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-30 20:39:10 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-30 20:39:10 --> MyMIWallets skipped (no user context)
DEBUG - 2026-03-30 20:39:10 --> MyMIInvestments: no session user detected; skipping personalized hydration.
DEBUG - 2026-03-30 20:39:10 --> MyMIMarketing: Pscrape library not installed; Google search scraping will use fallback.
DEBUG - 2026-03-30 20:39:10 --> MyMIAlerts: no authenticated user context detected.
DEBUG - 2026-03-30 20:39:10 --> [SERVICE] App\Services\BudgetService ::setUserId
WARNING - 2026-03-30 20:39:10 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-30 20:39:10 --> MyMIWallets skipped (no user context)
DEBUG - 2026-03-30 20:39:10 --> [SERVICE] App\Services\BudgetService ::setUserId
INFO - 2026-03-30 20:39:10 --> [REQ_ID=7f0b11be479b] [MEMORY][commonData:start] 8388608
DEBUG - 2026-03-30 20:39:10 --> MyMIInvestments: no session user detected; skipping personalized hydration.
DEBUG - 2026-03-30 20:39:10 --> MyMIAlerts: no authenticated user context detected.
INFO - 2026-03-30 20:39:10 --> Premium entitlement guest: user_id= route=/index.php/Preview/Alert/GRAB feature= tier=free status=free allowed=yes reason=Guest access allowed for this feature.
INFO - 2026-03-30 20:39:11 --> AlertsModel L404 - Alert updated successfully for ID 7405: Array
(
    [price] => 3.53
    [current_price] => 3.53
    [last_updated] => 2026-03-30 20:39:11
    [last_updated_time] => 2026-03-30 20:39:11
)

INFO - 2026-03-30 20:39:11 --> 🔄 Trying AlphaVantage for GRAB...
INFO - 2026-03-30 20:39:11 --> ✅ Alert snapshot inserted for GRAB with trade_id 7405
DEBUG - 2026-03-30 20:39:11 --> [REQ_ID=7f0b11be479b] [VIEW_RENDER] themes/public/previewAlert
INFO - 2026-03-30 20:39:11 --> [REQ_ID=7f0b11be479b] [MEMORY][commonData:start] 8388608
INFO - 2026-03-30 20:39:11 --> themesMemory usage: 8388608
DEBUG - 2026-03-30 20:39:11 --> [REQ_ID=34ce7de7be4e] [FILTER_AFTER]
DEBUG - 2026-03-30 20:39:11 --> [REQ_ID=34ce7de7be4e] [LIFECYCLE][END] status=200 duration_ms=567.58 memory_delta=2097152
INFO - 2026-03-30 20:39:11 --> [REQ_ID=7f0b11be479b] [PERF] Execution time=0.569363
DEBUG - 2026-03-30 20:39:11 --> [REQ_ID=34ce7de7be4e] [REQUEST][END]
INFO - 2026-03-30 20:39:11 --> [REQ_ID=34ce7de7be4e] [PERF] Execution time=0.610941
DEBUG - 2026-03-30 20:41:22 --> [REQ_ID=f0263ca41c3e] [REQUEST][START] HEAD /
DEBUG - 2026-03-30 20:41:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
ERROR - 2026-03-30 20:41:22 --> [404_ROUTE]
DEBUG - 2026-03-30 20:45:52 --> [REQ_ID=2c8296301f86] [REQUEST][START] GET /index.php/Management/Budgets
DEBUG - 2026-03-30 20:45:52 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-30 20:45:52 --> [REQ_ID=2c8296301f86] [FILTER_BEFORE] /index.php/Management/Budgets
DEBUG - 2026-03-30 20:45:52 --> [REQ_ID=2c8296301f86] [ROUTE] Controller=\App\Modules\Management\Controllers\BudgetsAdminController Method=index
DEBUG - 2026-03-30 20:45:52 --> [REQ_ID=2c8296301f86] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Management/Budgets
DEBUG - 2026-03-30 20:45:52 --> [CSRF] token name=csrf_test_name hash=af7461143e45fdb791a3c3ae38907f53
DEBUG - 2026-03-30 20:45:52 --> [REQ_ID=2c8296301f86] [REQUEST][END]
INFO - 2026-03-30 20:45:52 --> [REQ_ID=2c8296301f86] [PERF] Execution time=0.048850
DEBUG - 2026-03-30 20:45:52 --> [REQ_ID=3b2f37d6c618] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-30 20:45:52 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-30 20:45:52 --> [REQ_ID=3b2f37d6c618] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-30 20:45:52 --> [REQ_ID=3b2f37d6c618] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-30 20:45:52 --> [REQ_ID=3b2f37d6c618] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-30 20:45:52 --> [CSRF] token name=csrf_test_name hash=82c91dba211ac88bb37e67e82210ac05
DEBUG - 2026-03-30 20:45:52 --> [REQ_ID=3a2a2e28e1ff] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-30 20:45:52 --> [REQ_ID=3a2a2e28e1ff] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-30 20:45:52 --> [TRACE]
DEBUG - 2026-03-30 20:45:52 --> [REQ_ID=3b2f37d6c618] [FILTER_AFTER]
DEBUG - 2026-03-30 20:45:52 --> [REQ_ID=3b2f37d6c618] [LIFECYCLE][END] status=200 duration_ms=268.82 memory_delta=0
INFO - 2026-03-30 20:45:52 --> [REQ_ID=3a2a2e28e1ff] [PERF] Execution time=0.272474
DEBUG - 2026-03-30 20:45:52 --> [REQ_ID=3b2f37d6c618] [REQUEST][END]
INFO - 2026-03-30 20:45:52 --> [REQ_ID=3b2f37d6c618] [PERF] Execution time=0.284840
DEBUG - 2026-03-30 20:46:22 --> [REQ_ID=110369851815] [REQUEST][START] HEAD /
DEBUG - 2026-03-30 20:46:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
ERROR - 2026-03-30 20:46:22 --> [404_ROUTE]
DEBUG - 2026-03-30 20:51:22 --> [REQ_ID=4e2bf14df0f7] [REQUEST][START] HEAD /
DEBUG - 2026-03-30 20:51:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
ERROR - 2026-03-30 20:51:22 --> [404_ROUTE]
DEBUG - 2026-03-30 20:56:22 --> [REQ_ID=54061f0783fa] [REQUEST][START] HEAD /
DEBUG - 2026-03-30 20:56:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
ERROR - 2026-03-30 20:56:22 --> [404_ROUTE]
DEBUG - 2026-03-30 20:56:25 --> [REQ_ID=8b3ddbff388b] [REQUEST][START] GET /index.php/Management/Docs
DEBUG - 2026-03-30 20:56:25 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-30 20:56:25 --> [REQ_ID=8b3ddbff388b] [FILTER_BEFORE] /index.php/Management/Docs
DEBUG - 2026-03-30 20:56:25 --> [REQ_ID=8b3ddbff388b] [ROUTE] Controller=\App\Modules\Management\Controllers\DocsAdminController Method=index
DEBUG - 2026-03-30 20:56:25 --> [REQ_ID=8b3ddbff388b] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Management/Docs
DEBUG - 2026-03-30 20:56:25 --> [CSRF] token name=csrf_test_name hash=a0475309b5f3c791f9815ee2af0fb97d
DEBUG - 2026-03-30 20:56:25 --> [REQ_ID=8b3ddbff388b] [REQUEST][END]
INFO - 2026-03-30 20:56:25 --> [REQ_ID=8b3ddbff388b] [PERF] Execution time=0.025714
DEBUG - 2026-03-30 20:56:25 --> [REQ_ID=b673c36e6133] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-30 20:56:25 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-30 20:56:25 --> [REQ_ID=b673c36e6133] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-30 20:56:25 --> [REQ_ID=b673c36e6133] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-30 20:56:25 --> [REQ_ID=b673c36e6133] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-30 20:56:25 --> [CSRF] token name=csrf_test_name hash=a7d8629dfbef3b004a86d1c93ee79ffa
DEBUG - 2026-03-30 20:56:25 --> [REQ_ID=d980f9b0d3e5] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-30 20:56:25 --> [REQ_ID=d980f9b0d3e5] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-30 20:56:25 --> [TRACE]
DEBUG - 2026-03-30 20:56:25 --> [REQ_ID=b673c36e6133] [FILTER_AFTER]
DEBUG - 2026-03-30 20:56:25 --> [REQ_ID=b673c36e6133] [LIFECYCLE][END] status=200 duration_ms=33.20 memory_delta=0
INFO - 2026-03-30 20:56:25 --> [REQ_ID=d980f9b0d3e5] [PERF] Execution time=0.037035
DEBUG - 2026-03-30 20:56:25 --> [REQ_ID=b673c36e6133] [REQUEST][END]
INFO - 2026-03-30 20:56:25 --> [REQ_ID=b673c36e6133] [PERF] Execution time=0.049069
DEBUG - 2026-03-30 21:00:01 --> [REQ_ID=96322365ffd8] [REQUEST][START] GET /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-30 21:00:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-30 21:00:02 --> [REQ_ID=96322365ffd8] [FILTER_BEFORE] /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-30 21:00:02 --> [REQ_ID=96322365ffd8] [ROUTE] Controller=\App\Modules\Management\Controllers\ManagementAPIController Method=Run_CRON_Tasks
DEBUG - 2026-03-30 21:00:02 --> [REQ_ID=96322365ffd8] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-30 21:00:02 --> [REQ_ID=96322365ffd8] [REQUEST][END]
INFO - 2026-03-30 21:00:02 --> [REQ_ID=96322365ffd8] [PERF] Execution time=0.046118
ERROR - 2026-03-30 21:00:02 --> Table 'mymiwallet.bf_route_error_heatmap' doesn't exist
in SYSTEMPATH/Database/MySQLi/Connection.php on line 300.
 1 SYSTEMPATH/Database/MySQLi/Connection.php(300): mysqli->query('SELECT *
FROM `bf_route_error_heatmap`
WHERE `route` = \'/index.php/API/Management/Run-CRON-Tasks\'
AND `error_type` = \'http_403\'
AND `status_code` = 403
 LIMIT 1', 0)
 2 SYSTEMPATH/Database/BaseConnection.php(769): CodeIgniter\Database\MySQLi\Connection->execute('SELECT *
FROM `bf_route_error_heatmap`
WHERE `route` = \'/index.php/API/Management/Run-CRON-Tasks\'
AND `error_type` = \'http_403\'
AND `status_code` = 403
 LIMIT 1')
 3 SYSTEMPATH/Database/BaseConnection.php(686): CodeIgniter\Database\BaseConnection->simpleQuery('SELECT *
FROM `bf_route_error_heatmap`
WHERE `route` = \'/index.php/API/Management/Run-CRON-Tasks\'
AND `error_type` = \'http_403\'
AND `status_code` = 403
 LIMIT 1')
 4 SYSTEMPATH/Database/BaseBuilder.php(1649): CodeIgniter\Database\BaseConnection->query('SELECT *
FROM `bf_route_error_heatmap`
WHERE `route` = :route:
AND `error_type` = :error_type:
AND `status_code` = :status_code:
 LIMIT 1', [...], false)
 5 SYSTEMPATH/Model.php(296): CodeIgniter\Database\BaseBuilder->get()
 6 SYSTEMPATH/BaseModel.php(713): CodeIgniter\Model->doFirst()
 7 APPPATH/Services/AIOps/RouteErrorHeatmapService.php(28): CodeIgniter\BaseModel->first()
 8 APPPATH/Config/Events.php(65): App\Services\AIOps\RouteErrorHeatmapService->record('/index.php/API/Management/Run-CRON-Tasks', 'http_403', 403)
 9 SYSTEMPATH/Events/Events.php(152): CodeIgniter\Events\Events::Config\{closure}()
10 SYSTEMPATH/CodeIgniter.php(357): CodeIgniter\Events\Events::trigger('post_system')
11 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
12 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
13 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
DEBUG - 2026-03-30 21:00:02 --> Route heatmap post_system hook skipped: Table 'mymiwallet.bf_route_error_heatmap' doesn't exist
DEBUG - 2026-03-30 21:01:22 --> [REQ_ID=00efa3cf6fa4] [REQUEST][START] HEAD /
DEBUG - 2026-03-30 21:01:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
ERROR - 2026-03-30 21:01:22 --> [404_ROUTE]
DEBUG - 2026-03-30 21:06:22 --> [REQ_ID=123debf0444f] [REQUEST][START] HEAD /
DEBUG - 2026-03-30 21:06:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
ERROR - 2026-03-30 21:06:22 --> [404_ROUTE]
DEBUG - 2026-03-30 21:11:22 --> [REQ_ID=a6013bb54d8a] [REQUEST][START] HEAD /
DEBUG - 2026-03-30 21:11:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
ERROR - 2026-03-30 21:11:22 --> [404_ROUTE]
DEBUG - 2026-03-30 21:12:14 --> [REQ_ID=8627d343a1af] [REQUEST][START] GET /index.php/Management/Marketing/Video-Creator
DEBUG - 2026-03-30 21:12:14 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-30 21:12:14 --> [REQ_ID=8627d343a1af] [REQUEST][END]
INFO - 2026-03-30 21:12:14 --> [REQ_ID=8627d343a1af] [PERF] Execution time=0.023003
ERROR - 2026-03-30 21:12:14 --> Table 'mymiwallet.bf_route_error_heatmap' doesn't exist
in SYSTEMPATH/Database/MySQLi/Connection.php on line 300.
 1 SYSTEMPATH/Database/MySQLi/Connection.php(300): mysqli->query('SELECT *
FROM `bf_route_error_heatmap`
WHERE `route` = \'/index.php/Management/Marketing/Video-Creator\'
AND `error_type` = \'http_403\'
AND `status_code` = 403
 LIMIT 1', 0)
 2 SYSTEMPATH/Database/BaseConnection.php(769): CodeIgniter\Database\MySQLi\Connection->execute('SELECT *
FROM `bf_route_error_heatmap`
WHERE `route` = \'/index.php/Management/Marketing/Video-Creator\'
AND `error_type` = \'http_403\'
AND `status_code` = 403
 LIMIT 1')
 3 SYSTEMPATH/Database/BaseConnection.php(686): CodeIgniter\Database\BaseConnection->simpleQuery('SELECT *
FROM `bf_route_error_heatmap`
WHERE `route` = \'/index.php/Management/Marketing/Video-Creator\'
AND `error_type` = \'http_403\'
AND `status_code` = 403
 LIMIT 1')
 4 SYSTEMPATH/Database/BaseBuilder.php(1649): CodeIgniter\Database\BaseConnection->query('SELECT *
FROM `bf_route_error_heatmap`
WHERE `route` = :route:
AND `error_type` = :error_type:
AND `status_code` = :status_code:
 LIMIT 1', [...], false)
 5 SYSTEMPATH/Model.php(296): CodeIgniter\Database\BaseBuilder->get()
 6 SYSTEMPATH/BaseModel.php(713): CodeIgniter\Model->doFirst()
 7 APPPATH/Services/AIOps/RouteErrorHeatmapService.php(28): CodeIgniter\BaseModel->first()
 8 APPPATH/Config/Events.php(65): App\Services\AIOps\RouteErrorHeatmapService->record('/index.php/Management/Marketing/Video-Creator', 'http_403', 403)
 9 SYSTEMPATH/Events/Events.php(152): CodeIgniter\Events\Events::Config\{closure}()
10 SYSTEMPATH/CodeIgniter.php(357): CodeIgniter\Events\Events::trigger('post_system')
11 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
12 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
13 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
DEBUG - 2026-03-30 21:12:14 --> Route heatmap post_system hook skipped: Table 'mymiwallet.bf_route_error_heatmap' doesn't exist
DEBUG - 2026-03-30 21:15:01 --> [REQ_ID=424288d6242f] [REQUEST][START] GET /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-30 21:15:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-30 21:15:01 --> [REQ_ID=424288d6242f] [FILTER_BEFORE] /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-30 21:15:01 --> [REQ_ID=424288d6242f] [ROUTE] Controller=\App\Modules\APIs\Controllers\AlertsAPIController Method=fetchEmailAlerts
DEBUG - 2026-03-30 21:15:01 --> [REQ_ID=424288d6242f] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-30 21:15:01 --> [REQ_ID=424288d6242f] [REQUEST][END]
INFO - 2026-03-30 21:15:01 --> [REQ_ID=424288d6242f] [PERF] Execution time=0.042183
ERROR - 2026-03-30 21:15:01 --> Table 'mymiwallet.bf_route_error_heatmap' doesn't exist
in SYSTEMPATH/Database/MySQLi/Connection.php on line 300.
 1 SYSTEMPATH/Database/MySQLi/Connection.php(300): mysqli->query('SELECT *
FROM `bf_route_error_heatmap`
WHERE `route` = \'/index.php/API/Alerts/fetchEmailAlerts\'
AND `error_type` = \'http_403\'
AND `status_code` = 403
 LIMIT 1', 0)
 2 SYSTEMPATH/Database/BaseConnection.php(769): CodeIgniter\Database\MySQLi\Connection->execute('SELECT *
FROM `bf_route_error_heatmap`
WHERE `route` = \'/index.php/API/Alerts/fetchEmailAlerts\'
AND `error_type` = \'http_403\'
AND `status_code` = 403
 LIMIT 1')
 3 SYSTEMPATH/Database/BaseConnection.php(686): CodeIgniter\Database\BaseConnection->simpleQuery('SELECT *
FROM `bf_route_error_heatmap`
WHERE `route` = \'/index.php/API/Alerts/fetchEmailAlerts\'
AND `error_type` = \'http_403\'
AND `status_code` = 403
 LIMIT 1')
 4 SYSTEMPATH/Database/BaseBuilder.php(1649): CodeIgniter\Database\BaseConnection->query('SELECT *
FROM `bf_route_error_heatmap`
WHERE `route` = :route:
AND `error_type` = :error_type:
AND `status_code` = :status_code:
 LIMIT 1', [...], false)
 5 SYSTEMPATH/Model.php(296): CodeIgniter\Database\BaseBuilder->get()
 6 SYSTEMPATH/BaseModel.php(713): CodeIgniter\Model->doFirst()
 7 APPPATH/Services/AIOps/RouteErrorHeatmapService.php(28): CodeIgniter\BaseModel->first()
 8 APPPATH/Config/Events.php(65): App\Services\AIOps\RouteErrorHeatmapService->record('/index.php/API/Alerts/fetchEmailAlerts', 'http_403', 403)
 9 SYSTEMPATH/Events/Events.php(152): CodeIgniter\Events\Events::Config\{closure}()
10 SYSTEMPATH/CodeIgniter.php(357): CodeIgniter\Events\Events::trigger('post_system')
11 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
12 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
13 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
DEBUG - 2026-03-30 21:15:01 --> Route heatmap post_system hook skipped: Table 'mymiwallet.bf_route_error_heatmap' doesn't exist
DEBUG - 2026-03-30 21:15:09 --> [REQ_ID=a22438bdac5a] [REQUEST][START] GET /
DEBUG - 2026-03-30 21:15:09 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-30 21:15:09 --> [REQ_ID=a22438bdac5a] [FILTER_BEFORE] /
DEBUG - 2026-03-30 21:15:09 --> [REQ_ID=a22438bdac5a] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-30 21:15:09 --> [REQ_ID=a22438bdac5a] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-30 21:15:09 --> [CSRF] token name=csrf_test_name hash=f5dab50aa385cd5c406086d1e450dbcf
DEBUG - 2026-03-30 21:15:09 --> [REQ_ID=238c7bf52b24] [INIT] App\Controllers\Home::GET
INFO - 2026-03-30 21:15:09 --> [REQ_ID=238c7bf52b24] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-30 21:15:09 --> [TRACE]
INFO - 2026-03-30 21:15:09 --> [REQ_ID=238c7bf52b24] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-30 21:15:09 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-30 21:15:09 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-03-30 21:15:09 --> [REQ_ID=238c7bf52b24] [VIEW_RENDER] themes/public/home
INFO - 2026-03-30 21:15:09 --> [REQ_ID=238c7bf52b24] [MEMORY][commonData:start] 8388608
INFO - 2026-03-30 21:15:09 --> themesMemory usage: 8388608
DEBUG - 2026-03-30 21:15:09 --> [MetaService] slug= pageName=Home cacheHit= path=DB
DEBUG - 2026-03-30 21:15:09 --> [REQ_ID=a22438bdac5a] [FILTER_AFTER]
DEBUG - 2026-03-30 21:15:09 --> [REQ_ID=a22438bdac5a] [LIFECYCLE][END] status=200 duration_ms=857.54 memory_delta=4194304
INFO - 2026-03-30 21:15:10 --> [REQ_ID=238c7bf52b24] [PERF] Execution time=0.860063
DEBUG - 2026-03-30 21:15:10 --> [REQ_ID=a22438bdac5a] [REQUEST][END]
INFO - 2026-03-30 21:15:10 --> [REQ_ID=a22438bdac5a] [PERF] Execution time=0.872315
DEBUG - 2026-03-30 21:16:13 --> [REQ_ID=cae8fe6257c6] [REQUEST][START] GET /index.php/Customer-Support
DEBUG - 2026-03-30 21:16:13 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-30 21:16:13 --> [REQ_ID=cae8fe6257c6] [FILTER_BEFORE] /index.php/Customer-Support
DEBUG - 2026-03-30 21:16:13 --> [REQ_ID=cae8fe6257c6] [ROUTE] Controller=\App\Controllers\App\Modules\Support\Controllers\SupportController Method=index
DEBUG - 2026-03-30 21:16:13 --> [REQ_ID=cae8fe6257c6] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Customer-Support
DEBUG - 2026-03-30 21:16:13 --> [CSRF] token name=csrf_test_name hash=822c082d92cf49f61a326445973073bf
DEBUG - 2026-03-30 21:16:13 --> [REQ_ID=cae8fe6257c6] [REQUEST][END]
INFO - 2026-03-30 21:16:13 --> [REQ_ID=cae8fe6257c6] [PERF] Execution time=0.043031
DEBUG - 2026-03-30 21:16:13 --> [REQ_ID=fd3773634c18] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-30 21:16:13 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-30 21:16:13 --> [REQ_ID=fd3773634c18] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-30 21:16:13 --> [REQ_ID=fd3773634c18] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-30 21:16:13 --> [REQ_ID=fd3773634c18] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-30 21:16:13 --> [CSRF] token name=csrf_test_name hash=0135570334981389ec0f1cbd8551fb9a
DEBUG - 2026-03-30 21:16:13 --> [REQ_ID=80e449ed2647] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-30 21:16:13 --> [REQ_ID=80e449ed2647] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-30 21:16:13 --> [TRACE]
DEBUG - 2026-03-30 21:16:13 --> [REQ_ID=fd3773634c18] [FILTER_AFTER]
DEBUG - 2026-03-30 21:16:13 --> [REQ_ID=fd3773634c18] [LIFECYCLE][END] status=200 duration_ms=188.66 memory_delta=0
INFO - 2026-03-30 21:16:13 --> [REQ_ID=80e449ed2647] [PERF] Execution time=0.192401
DEBUG - 2026-03-30 21:16:13 --> [REQ_ID=fd3773634c18] [REQUEST][END]
INFO - 2026-03-30 21:16:13 --> [REQ_ID=fd3773634c18] [PERF] Execution time=0.208004
DEBUG - 2026-03-30 21:16:22 --> [REQ_ID=abd6cf3f0867] [REQUEST][START] HEAD /
DEBUG - 2026-03-30 21:16:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
ERROR - 2026-03-30 21:16:22 --> [404_ROUTE]
DEBUG - 2026-03-30 21:17:41 --> [REQ_ID=7a86f547543b] [REQUEST][START] GET /index.php/register/success
DEBUG - 2026-03-30 21:17:41 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-30 21:17:41 --> [REQ_ID=7a86f547543b] [FILTER_BEFORE] /index.php/register/success
DEBUG - 2026-03-30 21:17:41 --> [REQ_ID=7a86f547543b] [ROUTE] Controller=\App\Controllers\AuthController Method=registerSuccess
DEBUG - 2026-03-30 21:17:41 --> [REQ_ID=7a86f547543b] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/register/success
DEBUG - 2026-03-30 21:17:41 --> [CSRF] token name=csrf_test_name hash=0f7ee53637f6dd0603269a4099d5a3fd
DEBUG - 2026-03-30 21:17:41 --> [REQ_ID=6ea75846893e] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-30 21:17:41 --> [REQ_ID=6ea75846893e] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-30 21:17:41 --> [TRACE]
DEBUG - 2026-03-30 21:17:41 --> [REGISTER_SUCCESS] entered
DEBUG - 2026-03-30 21:17:41 --> [REGISTER_SUCCESS] data prepared
DEBUG - 2026-03-30 21:17:41 --> [REQ_ID=7a86f547543b] [FILTER_AFTER]
DEBUG - 2026-03-30 21:17:41 --> [REQ_ID=7a86f547543b] [LIFECYCLE][END] status=200 duration_ms=223.37 memory_delta=0
INFO - 2026-03-30 21:17:41 --> [REQ_ID=6ea75846893e] [PERF] Execution time=0.223428
DEBUG - 2026-03-30 21:17:41 --> [REQ_ID=7a86f547543b] [REQUEST][END]
INFO - 2026-03-30 21:17:41 --> [REQ_ID=7a86f547543b] [PERF] Execution time=0.232892
DEBUG - 2026-03-30 21:21:22 --> [REQ_ID=c498bf1affa4] [REQUEST][START] HEAD /
DEBUG - 2026-03-30 21:21:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
ERROR - 2026-03-30 21:21:22 --> [404_ROUTE]
DEBUG - 2026-03-30 21:21:25 --> [REQ_ID=dfe2adeb4c4f] [REQUEST][START] GET /index.php/register/success
DEBUG - 2026-03-30 21:21:25 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-30 21:21:25 --> [REQ_ID=dfe2adeb4c4f] [FILTER_BEFORE] /index.php/register/success
DEBUG - 2026-03-30 21:21:25 --> [REQ_ID=dfe2adeb4c4f] [ROUTE] Controller=\App\Controllers\AuthController Method=registerSuccess
DEBUG - 2026-03-30 21:21:25 --> [REQ_ID=dfe2adeb4c4f] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/register/success
DEBUG - 2026-03-30 21:21:25 --> [CSRF] token name=csrf_test_name hash=0f7ee53637f6dd0603269a4099d5a3fd
DEBUG - 2026-03-30 21:21:25 --> [REQ_ID=bfd80a4fd482] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-30 21:21:25 --> [REQ_ID=bfd80a4fd482] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-30 21:21:25 --> [TRACE]
DEBUG - 2026-03-30 21:21:25 --> [REGISTER_SUCCESS] entered
DEBUG - 2026-03-30 21:21:25 --> [REGISTER_SUCCESS] data prepared
DEBUG - 2026-03-30 21:21:25 --> [REQ_ID=dfe2adeb4c4f] [FILTER_AFTER]
DEBUG - 2026-03-30 21:21:25 --> [REQ_ID=dfe2adeb4c4f] [LIFECYCLE][END] status=200 duration_ms=31.78 memory_delta=0
INFO - 2026-03-30 21:21:25 --> [REQ_ID=bfd80a4fd482] [PERF] Execution time=0.033468
DEBUG - 2026-03-30 21:21:25 --> [REQ_ID=dfe2adeb4c4f] [REQUEST][END]
INFO - 2026-03-30 21:21:25 --> [REQ_ID=dfe2adeb4c4f] [PERF] Execution time=0.052511
DEBUG - 2026-03-30 21:25:33 --> [REQ_ID=d12dd9d87c39] [REQUEST][START] GET /index.php/activate-account?token=b6c7cdc603b17b77c919f176b2253411
DEBUG - 2026-03-30 21:25:33 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-30 21:25:33 --> [REQ_ID=d12dd9d87c39] [FILTER_BEFORE] /index.php/activate-account?token=b6c7cdc603b17b77c919f176b2253411
DEBUG - 2026-03-30 21:25:33 --> [REQ_ID=d12dd9d87c39] [ROUTE] Controller=\App\Controllers\AuthController Method=activateAccount
DEBUG - 2026-03-30 21:25:33 --> [REQ_ID=d12dd9d87c39] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/activate-account?token=b6c7cdc603b17b77c919f176b2253411
DEBUG - 2026-03-30 21:25:33 --> [CSRF] token name=csrf_test_name hash=0f7ee53637f6dd0603269a4099d5a3fd
DEBUG - 2026-03-30 21:25:33 --> [REQ_ID=9eb881ab8cab] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-30 21:25:33 --> [REQ_ID=9eb881ab8cab] [MEMORY][controller-start] 6291456
DEBUG - 2026-03-30 21:25:33 --> [TRACE]
INFO - 2026-03-30 21:25:33 --> [ACTIVATION] Activation link hit
DEBUG - 2026-03-30 21:25:33 --> [ACTIVATION] Token validated for user
INFO - 2026-03-30 21:25:33 --> [ACTIVATION] Account activated
INFO - 2026-03-30 21:25:33 --> [ACTIVATION] Redirect issued
DEBUG - 2026-03-30 21:25:33 --> [REQ_ID=d12dd9d87c39] [FILTER_AFTER]
DEBUG - 2026-03-30 21:25:33 --> [REQ_ID=d12dd9d87c39] [LIFECYCLE][END] status=302 duration_ms=185.59 memory_delta=0
INFO - 2026-03-30 21:25:33 --> [REQ_ID=9eb881ab8cab] [PERF] Execution time=0.189641
DEBUG - 2026-03-30 21:25:33 --> [REQ_ID=d12dd9d87c39] [REQUEST][END]
INFO - 2026-03-30 21:25:33 --> [REQ_ID=d12dd9d87c39] [PERF] Execution time=0.229399
DEBUG - 2026-03-30 21:25:33 --> [REQ_ID=1232712d90a2] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-30 21:25:33 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-30 21:25:33 --> [REQ_ID=1232712d90a2] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-30 21:25:33 --> [REQ_ID=1232712d90a2] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-30 21:25:33 --> [REQ_ID=1232712d90a2] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-30 21:25:33 --> [CSRF] token name=csrf_test_name hash=0f7ee53637f6dd0603269a4099d5a3fd
DEBUG - 2026-03-30 21:25:33 --> [REQ_ID=6c3ddc39fe01] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-30 21:25:33 --> [REQ_ID=6c3ddc39fe01] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-30 21:25:33 --> [TRACE]
DEBUG - 2026-03-30 21:25:33 --> [REQ_ID=1232712d90a2] [FILTER_AFTER]
DEBUG - 2026-03-30 21:25:33 --> [REQ_ID=1232712d90a2] [LIFECYCLE][END] status=200 duration_ms=20.29 memory_delta=0
INFO - 2026-03-30 21:25:33 --> [REQ_ID=6c3ddc39fe01] [PERF] Execution time=0.020343
DEBUG - 2026-03-30 21:25:33 --> [REQ_ID=1232712d90a2] [REQUEST][END]
INFO - 2026-03-30 21:25:33 --> [REQ_ID=1232712d90a2] [PERF] Execution time=0.028740
DEBUG - 2026-03-30 21:25:40 --> [REQ_ID=0ff451a85a97] [REQUEST][START] GET /index.php/activate-account?token=b6c7cdc603b17b77c919f176b2253411
DEBUG - 2026-03-30 21:25:40 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-30 21:25:40 --> [REQ_ID=0ff451a85a97] [FILTER_BEFORE] /index.php/activate-account?token=b6c7cdc603b17b77c919f176b2253411
DEBUG - 2026-03-30 21:25:40 --> [REQ_ID=0ff451a85a97] [ROUTE] Controller=\App\Controllers\AuthController Method=activateAccount
DEBUG - 2026-03-30 21:25:40 --> [REQ_ID=0ff451a85a97] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/activate-account?token=b6c7cdc603b17b77c919f176b2253411
DEBUG - 2026-03-30 21:25:40 --> [CSRF] token name=csrf_test_name hash=9bd03f4691703579b9897c21c0ffb91a
DEBUG - 2026-03-30 21:25:40 --> [REQ_ID=ec11aba315db] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-30 21:25:40 --> [REQ_ID=ec11aba315db] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-30 21:25:40 --> [TRACE]
INFO - 2026-03-30 21:25:40 --> [ACTIVATION] Activation link hit
ERROR - 2026-03-30 21:25:40 --> [ACTIVATION] Activation failed: user not found
DEBUG - 2026-03-30 21:25:40 --> [REQ_ID=0ff451a85a97] [FILTER_AFTER]
DEBUG - 2026-03-30 21:25:40 --> [REQ_ID=0ff451a85a97] [LIFECYCLE][END] status=302 duration_ms=176.75 memory_delta=0
INFO - 2026-03-30 21:25:40 --> [REQ_ID=ec11aba315db] [PERF] Execution time=0.177563
DEBUG - 2026-03-30 21:25:40 --> [REQ_ID=0ff451a85a97] [REQUEST][END]
INFO - 2026-03-30 21:25:40 --> [REQ_ID=0ff451a85a97] [PERF] Execution time=0.188718
DEBUG - 2026-03-30 21:25:40 --> [REQ_ID=38758f726c5e] [REQUEST][START] GET /index.php/Support/Account
DEBUG - 2026-03-30 21:25:40 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-30 21:25:40 --> [REQ_ID=38758f726c5e] [FILTER_BEFORE] /index.php/Support/Account
DEBUG - 2026-03-30 21:25:40 --> [REQ_ID=38758f726c5e] [ROUTE] Controller=\App\Modules\Support\Controllers\AccountSupportController Method=index
DEBUG - 2026-03-30 21:25:40 --> [REQ_ID=38758f726c5e] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Support/Account
DEBUG - 2026-03-30 21:25:40 --> [CSRF] token name=csrf_test_name hash=102394678739f5cd90c1cf3e44c88e7c
DEBUG - 2026-03-30 21:25:40 --> [REQ_ID=622fbbda22c3] [INIT] App\Modules\Support\Controllers\AccountSupportController::GET
INFO - 2026-03-30 21:25:40 --> [REQ_ID=622fbbda22c3] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-30 21:25:40 --> [TRACE]
DEBUG - 2026-03-30 21:25:40 --> [REQ_ID=622fbbda22c3] [METHOD_ENTRY] index
DEBUG - 2026-03-30 21:25:40 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-30 21:25:40 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-30 21:25:40 --> MyMICoin initialized ONCE
DEBUG - 2026-03-30 21:25:40 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-30 21:25:40 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-30 21:25:40 --> MyMIWallets skipped (no user context)
INFO - 2026-03-30 21:25:40 --> [REQ_ID=622fbbda22c3] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-30 21:25:40 --> [REQ_ID=622fbbda22c3] [VIEW_RENDER] SupportModule/Support/account_help
INFO - 2026-03-30 21:25:40 --> [REQ_ID=622fbbda22c3] [MEMORY][commonData:start] 6291456
INFO - 2026-03-30 21:25:40 --> themesMemory usage: 6291456
DEBUG - 2026-03-30 21:25:40 --> [REQ_ID=38758f726c5e] [FILTER_AFTER]
DEBUG - 2026-03-30 21:25:40 --> [REQ_ID=38758f726c5e] [LIFECYCLE][END] status=200 duration_ms=73.30 memory_delta=2097152
INFO - 2026-03-30 21:25:40 --> [REQ_ID=622fbbda22c3] [PERF] Execution time=0.073361
DEBUG - 2026-03-30 21:25:40 --> [REQ_ID=38758f726c5e] [REQUEST][END]
INFO - 2026-03-30 21:25:40 --> [REQ_ID=38758f726c5e] [PERF] Execution time=0.086045
DEBUG - 2026-03-30 21:25:41 --> [REQ_ID=d0fad5fc7bec] [REQUEST][START] POST /index.php/login
DEBUG - 2026-03-30 21:25:41 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-30 21:25:41 --> [REQ_ID=d0fad5fc7bec] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-30 21:25:41 --> [REQ_ID=d0fad5fc7bec] [ROUTE] Controller=\App\Controllers\AuthController Method=attemptLogin
DEBUG - 2026-03-30 21:25:41 --> [REQ_ID=d0fad5fc7bec] [LIFECYCLE][START] POST https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-30 21:25:41 --> [CSRF] token name=csrf_test_name hash=0f7ee53637f6dd0603269a4099d5a3fd
DEBUG - 2026-03-30 21:25:41 --> [REQ_ID=d0fad5fc7bec] [REQUEST][END]
INFO - 2026-03-30 21:25:41 --> [REQ_ID=d0fad5fc7bec] [PERF] Execution time=0.009636
DEBUG - 2026-03-30 21:25:41 --> [REQ_ID=287eeaa9a74b] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-30 21:25:41 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-30 21:25:41 --> [REQ_ID=287eeaa9a74b] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-30 21:25:41 --> [REQ_ID=287eeaa9a74b] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-30 21:25:41 --> [REQ_ID=287eeaa9a74b] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-30 21:25:41 --> [CSRF] token name=csrf_test_name hash=0f7ee53637f6dd0603269a4099d5a3fd
DEBUG - 2026-03-30 21:25:41 --> [REQ_ID=e3b569488ff6] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-30 21:25:41 --> [REQ_ID=e3b569488ff6] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-30 21:25:41 --> [TRACE]
DEBUG - 2026-03-30 21:25:41 --> [REQ_ID=287eeaa9a74b] [FILTER_AFTER]
DEBUG - 2026-03-30 21:25:41 --> [REQ_ID=287eeaa9a74b] [LIFECYCLE][END] status=200 duration_ms=18.34 memory_delta=0
INFO - 2026-03-30 21:25:41 --> [REQ_ID=e3b569488ff6] [PERF] Execution time=0.018613
DEBUG - 2026-03-30 21:25:41 --> [REQ_ID=287eeaa9a74b] [REQUEST][END]
INFO - 2026-03-30 21:25:41 --> [REQ_ID=287eeaa9a74b] [PERF] Execution time=0.027532
DEBUG - 2026-03-30 21:25:46 --> [REQ_ID=73d9f6d4a711] [REQUEST][START] POST /index.php/login
DEBUG - 2026-03-30 21:25:46 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-30 21:25:46 --> [REQ_ID=73d9f6d4a711] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-30 21:25:46 --> [REQ_ID=73d9f6d4a711] [ROUTE] Controller=\App\Controllers\AuthController Method=attemptLogin
DEBUG - 2026-03-30 21:25:46 --> [REQ_ID=73d9f6d4a711] [LIFECYCLE][START] POST https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-30 21:25:46 --> [CSRF] token name=csrf_test_name hash=0f7ee53637f6dd0603269a4099d5a3fd
INFO - 2026-03-30 21:25:46 --> CSRF token verified.
DEBUG - 2026-03-30 21:25:46 --> [REQ_ID=92d45bb6b88b] [INIT] App\Controllers\AuthController::POST
INFO - 2026-03-30 21:25:46 --> [REQ_ID=92d45bb6b88b] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-30 21:25:46 --> [TRACE]
INFO - 2026-03-30 21:25:46 --> AuthController L93: Auth:attemptLogin started.
INFO - 2026-03-30 21:25:46 --> AuthController L104: Auth:attemptLogin rules: {"login":"required","password":"required"}
INFO - 2026-03-30 21:25:46 --> AuthController L132: Auth:attemptLogin Login Variables: login: required, remember: false, ip: 76.234.126.68, ua: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36
DEBUG - 2026-03-30 21:25:46 --> Auth attemptLogin() called with login identifier: tburks239223, remember: false
DEBUG - 2026-03-30 21:25:46 --> Auth attemptLogin() called. redirect_url in session: https://www.mymiwallet.com/index.php/register/success
DEBUG - 2026-03-30 21:25:46 --> Auth credentials normalised for attempt using key "username"
DEBUG - 2026-03-30 21:25:46 --> Auth attempt succeeded for identifier tburks239223. logged_in(): yes, user_id(): 11761
DEBUG - 2026-03-30 21:25:46 --> Auth attempt succeeded. logged_in(): yes, user_id(): 11761
DEBUG - 2026-03-30 21:25:46 --> Auth attemptLogin() - session user_id set to: 11761
ERROR - 2026-03-30 21:25:46 --> Duplicate entry 'tburks2392@gmail.com-76.234.126.68' for key 'bf_user_ip_history.bf_user_ip_unique_email'
in SYSTEMPATH/Database/MySQLi/Connection.php on line 300.
 1 SYSTEMPATH/Database/MySQLi/Connection.php(300): mysqli->query('INSERT INTO `bf_user_ip_history` (`user_id`, `email`, `ip_address`, `user_agent`, `first_seen_at`, `last_seen_at`, `created_at`, `updated_at`) VALUES (11761, \'tburks2392@gmail.com\', \'76.234.126.68\', \'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36\', \'2026-03-30 21:25:46\', \'2026-03-30 21:25:46\', \'2026-03-30 21:25:46\', \'2026-03-30 21:25:46\')', 0)
 2 SYSTEMPATH/Database/BaseConnection.php(769): CodeIgniter\Database\MySQLi\Connection->execute('INSERT INTO `bf_user_ip_history` (`user_id`, `email`, `ip_address`, `user_agent`, `first_seen_at`, `last_seen_at`, `created_at`, `updated_at`) VALUES (11761, \'tburks2392@gmail.com\', \'76.234.126.68\', \'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36\', \'2026-03-30 21:25:46\', \'2026-03-30 21:25:46\', \'2026-03-30 21:25:46\', \'2026-03-30 21:25:46\')')
 3 SYSTEMPATH/Database/BaseConnection.php(686): CodeIgniter\Database\BaseConnection->simpleQuery('INSERT INTO `bf_user_ip_history` (`user_id`, `email`, `ip_address`, `user_agent`, `first_seen_at`, `last_seen_at`, `created_at`, `updated_at`) VALUES (11761, \'tburks2392@gmail.com\', \'76.234.126.68\', \'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36\', \'2026-03-30 21:25:46\', \'2026-03-30 21:25:46\', \'2026-03-30 21:25:46\', \'2026-03-30 21:25:46\')')
 4 SYSTEMPATH/Database/BaseBuilder.php(2345): CodeIgniter\Database\BaseConnection->query('INSERT INTO `bf_user_ip_history` (`user_id`, `email`, `ip_address`, `user_agent`, `first_seen_at`, `last_seen_at`, `created_at`, `updated_at`) VALUES (:user_id:, :email:, :ip_address:, :user_agent:, :first_seen_at:, :last_seen_at:, :created_at:, :updated_at:)', [...], false)
 5 SYSTEMPATH/Model.php(356): CodeIgniter\Database\BaseBuilder->insert()
 6 SYSTEMPATH/BaseModel.php(898): CodeIgniter\Model->doInsert([...])
 7 SYSTEMPATH/Model.php(665): CodeIgniter\BaseModel->insert([...], true)
 8 APPPATH/Models/UserIpHistoryModel.php(41): CodeIgniter\Model->insert([...])
 9 APPPATH/Controllers/AuthController.php(287): App\Models\UserIpHistoryModel->record(11761, 'tburks2392@gmail.com', '76.234.126.68', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36')
10 SYSTEMPATH/CodeIgniter.php(951): App\Controllers\AuthController->attemptLogin()
11 SYSTEMPATH/CodeIgniter.php(497): CodeIgniter\CodeIgniter->runController(Object(App\Controllers\AuthController))
12 SYSTEMPATH/CodeIgniter.php(340): CodeIgniter\CodeIgniter->handleRequest(null, Object(Config\Cache), false)
13 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
14 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
15 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
ERROR - 2026-03-30 21:25:46 --> UserIpHistoryModel::record failed: Duplicate entry 'tburks2392@gmail.com-76.234.126.68' for key 'bf_user_ip_history.bf_user_ip_unique_email'
INFO - 2026-03-30 21:25:46 --> [AUTH] Login success
INFO - 2026-03-30 21:25:46 --> OnboardingProgressService: first verified login recorded for user_id=11761
INFO - 2026-03-30 21:25:46 --> OnboardingProgressService: walkthrough started for user_id=11761
INFO - 2026-03-30 21:25:46 --> Auth attemptLogin() onboarding walkthrough queued for user_id=11761
DEBUG - 2026-03-30 21:25:46 --> Auth redirect destination: https://www.mymiwallet.com/index.php/register/success
DEBUG - 2026-03-30 21:25:46 --> [REQ_ID=73d9f6d4a711] [FILTER_AFTER]
DEBUG - 2026-03-30 21:25:46 --> [REQ_ID=73d9f6d4a711] [LIFECYCLE][END] status=303 duration_ms=162.48 memory_delta=0
INFO - 2026-03-30 21:25:46 --> [REQ_ID=92d45bb6b88b] [PERF] Execution time=0.162993
DEBUG - 2026-03-30 21:25:46 --> [REQ_ID=73d9f6d4a711] [REQUEST][END]
INFO - 2026-03-30 21:25:46 --> [REQ_ID=73d9f6d4a711] [PERF] Execution time=0.172676
DEBUG - 2026-03-30 21:25:46 --> [REQ_ID=7b062cb4c491] [REQUEST][START] GET /index.php/register/success
DEBUG - 2026-03-30 21:25:46 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-30 21:25:46 --> [REQ_ID=7b062cb4c491] [FILTER_BEFORE] /index.php/register/success
DEBUG - 2026-03-30 21:25:46 --> [REQ_ID=7b062cb4c491] [ROUTE] Controller=\App\Controllers\AuthController Method=registerSuccess
DEBUG - 2026-03-30 21:25:46 --> [REQ_ID=7b062cb4c491] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/register/success
DEBUG - 2026-03-30 21:25:46 --> [CSRF] token name=csrf_test_name hash=0f7ee53637f6dd0603269a4099d5a3fd
DEBUG - 2026-03-30 21:25:46 --> [REQ_ID=69fa46df2b53] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-30 21:25:46 --> [REQ_ID=69fa46df2b53] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-30 21:25:46 --> [TRACE]
DEBUG - 2026-03-30 21:25:46 --> [REGISTER_SUCCESS] entered
ERROR - 2026-03-30 21:25:46 --> Unknown column 'auth_groups_users.group_id' in 'on clause'
in SYSTEMPATH/Database/MySQLi/Connection.php on line 300.
 1 SYSTEMPATH/Database/MySQLi/Connection.php(300): mysqli->query('SELECT `auth_groups_users`.*, `auth_groups`.`name`, `auth_groups`.`description`
FROM `auth_groups`
LEFT JOIN `auth_groups_users` ON `auth_groups_users`.`group_id` = `auth_groups`.`id`
WHERE `user_id` = 11761', 0)
 2 SYSTEMPATH/Database/BaseConnection.php(769): CodeIgniter\Database\MySQLi\Connection->execute('SELECT `auth_groups_users`.*, `auth_groups`.`name`, `auth_groups`.`description`
FROM `auth_groups`
LEFT JOIN `auth_groups_users` ON `auth_groups_users`.`group_id` = `auth_groups`.`id`
WHERE `user_id` = 11761')
 3 SYSTEMPATH/Database/BaseConnection.php(686): CodeIgniter\Database\BaseConnection->simpleQuery('SELECT `auth_groups_users`.*, `auth_groups`.`name`, `auth_groups`.`description`
FROM `auth_groups`
LEFT JOIN `auth_groups_users` ON `auth_groups_users`.`group_id` = `auth_groups`.`id`
WHERE `user_id` = 11761')
 4 SYSTEMPATH/Database/BaseBuilder.php(1649): CodeIgniter\Database\BaseConnection->query('SELECT `auth_groups_users`.*, `auth_groups`.`name`, `auth_groups`.`description`
FROM `auth_groups`
LEFT JOIN `auth_groups_users` ON `auth_groups_users`.`group_id` = `auth_groups`.`id`
WHERE `user_id` = :user_id:', [...], false)
 5 VENDORPATH/myth/auth/src/Models/GroupModel.php(102): CodeIgniter\Database\BaseBuilder->get()
 6 VENDORPATH/myth/auth/src/Entities/User.php(270): Myth\Auth\Models\GroupModel->getGroupsForUser(11761)
 7 APPPATH/Controllers/AuthController.php(1034): Myth\Auth\Entities\User->getRoles()
 8 APPPATH/Controllers/AuthController.php(838): App\Controllers\AuthController->resolveUserRole()
 9 SYSTEMPATH/CodeIgniter.php(951): App\Controllers\AuthController->registerSuccess()
10 SYSTEMPATH/CodeIgniter.php(497): CodeIgniter\CodeIgniter->runController(Object(App\Controllers\AuthController))
11 SYSTEMPATH/CodeIgniter.php(340): CodeIgniter\CodeIgniter->handleRequest(null, Object(Config\Cache), false)
12 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
13 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
14 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
DEBUG - 2026-03-30 21:25:46 --> [ROLE_RESOLVE_FAIL] Unknown column 'auth_groups_users.group_id' in 'on clause'
DEBUG - 2026-03-30 21:25:46 --> [REGISTER_SUCCESS] data prepared
DEBUG - 2026-03-30 21:25:46 --> [REQ_ID=7b062cb4c491] [FILTER_AFTER]
DEBUG - 2026-03-30 21:25:46 --> [REQ_ID=7b062cb4c491] [LIFECYCLE][END] status=200 duration_ms=18.84 memory_delta=0
INFO - 2026-03-30 21:25:46 --> [REQ_ID=69fa46df2b53] [PERF] Execution time=0.018979
DEBUG - 2026-03-30 21:25:46 --> [REQ_ID=7b062cb4c491] [REQUEST][END]
INFO - 2026-03-30 21:25:46 --> [REQ_ID=7b062cb4c491] [PERF] Execution time=0.027482
DEBUG - 2026-03-30 21:25:47 --> [REQ_ID=a62e1b83bc0c] [REQUEST][START] GET /index.php/Budget
DEBUG - 2026-03-30 21:25:47 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-30 21:25:47 --> [REQ_ID=a62e1b83bc0c] [FILTER_BEFORE] /index.php/Budget
DEBUG - 2026-03-30 21:25:47 --> [REQ_ID=a62e1b83bc0c] [ROUTE] Controller=\App\Modules\User\Controllers\BudgetController Method=index
DEBUG - 2026-03-30 21:25:47 --> [REQ_ID=a62e1b83bc0c] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Budget
DEBUG - 2026-03-30 21:25:47 --> [CSRF] token name=csrf_test_name hash=102394678739f5cd90c1cf3e44c88e7c
DEBUG - 2026-03-30 21:25:47 --> [REQ_ID=a62e1b83bc0c] [REQUEST][END]
INFO - 2026-03-30 21:25:47 --> [REQ_ID=a62e1b83bc0c] [PERF] Execution time=0.015795
DEBUG - 2026-03-30 21:25:47 --> [REQ_ID=5ceb7870adee] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-30 21:25:47 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-30 21:25:47 --> [REQ_ID=5ceb7870adee] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-30 21:25:47 --> [REQ_ID=5ceb7870adee] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-30 21:25:47 --> [REQ_ID=5ceb7870adee] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-30 21:25:47 --> [CSRF] token name=csrf_test_name hash=102394678739f5cd90c1cf3e44c88e7c
DEBUG - 2026-03-30 21:25:47 --> [REQ_ID=623743e34fdd] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-30 21:25:47 --> [REQ_ID=623743e34fdd] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-30 21:25:47 --> [TRACE]
DEBUG - 2026-03-30 21:25:47 --> [REQ_ID=5ceb7870adee] [FILTER_AFTER]
DEBUG - 2026-03-30 21:25:47 --> [REQ_ID=5ceb7870adee] [LIFECYCLE][END] status=200 duration_ms=13.73 memory_delta=0
INFO - 2026-03-30 21:25:47 --> [REQ_ID=623743e34fdd] [PERF] Execution time=0.013703
DEBUG - 2026-03-30 21:25:47 --> [REQ_ID=5ceb7870adee] [REQUEST][END]
INFO - 2026-03-30 21:25:47 --> [REQ_ID=5ceb7870adee] [PERF] Execution time=0.025122
DEBUG - 2026-03-30 21:25:50 --> [REQ_ID=252533b409ba] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-30 21:25:50 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-30 21:25:50 --> [REQ_ID=252533b409ba] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-30 21:25:50 --> [REQ_ID=252533b409ba] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-30 21:25:50 --> [REQ_ID=252533b409ba] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-30 21:25:50 --> [CSRF] token name=csrf_test_name hash=0f7ee53637f6dd0603269a4099d5a3fd
DEBUG - 2026-03-30 21:25:50 --> [REQ_ID=2dc772b0f962] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-30 21:25:50 --> [REQ_ID=2dc772b0f962] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-30 21:25:50 --> [TRACE]
DEBUG - 2026-03-30 21:25:50 --> Auth redirect destination: https://www.mymiwallet.com/index.php/Dashboard
DEBUG - 2026-03-30 21:25:50 --> [REQ_ID=252533b409ba] [FILTER_AFTER]
DEBUG - 2026-03-30 21:25:50 --> [REQ_ID=252533b409ba] [LIFECYCLE][END] status=302 duration_ms=13.49 memory_delta=0
INFO - 2026-03-30 21:25:50 --> [REQ_ID=2dc772b0f962] [PERF] Execution time=0.013726
DEBUG - 2026-03-30 21:25:50 --> [REQ_ID=252533b409ba] [REQUEST][END]
INFO - 2026-03-30 21:25:50 --> [REQ_ID=252533b409ba] [PERF] Execution time=0.023866
DEBUG - 2026-03-30 21:25:52 --> [REQ_ID=96f94a5a2274] [REQUEST][START] POST /index.php/login
DEBUG - 2026-03-30 21:25:52 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-30 21:25:52 --> [REQ_ID=96f94a5a2274] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-30 21:25:52 --> [REQ_ID=96f94a5a2274] [ROUTE] Controller=\App\Controllers\AuthController Method=attemptLogin
DEBUG - 2026-03-30 21:25:52 --> [REQ_ID=96f94a5a2274] [LIFECYCLE][START] POST https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-30 21:25:52 --> [CSRF] token name=csrf_test_name hash=0f7ee53637f6dd0603269a4099d5a3fd
INFO - 2026-03-30 21:25:52 --> CSRF token verified.
DEBUG - 2026-03-30 21:25:52 --> [REQ_ID=8ea148a271ea] [INIT] App\Controllers\AuthController::POST
INFO - 2026-03-30 21:25:52 --> [REQ_ID=8ea148a271ea] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-30 21:25:52 --> [TRACE]
INFO - 2026-03-30 21:25:52 --> AuthController L93: Auth:attemptLogin started.
INFO - 2026-03-30 21:25:52 --> AuthController L104: Auth:attemptLogin rules: {"login":"required","password":"required"}
INFO - 2026-03-30 21:25:52 --> AuthController L132: Auth:attemptLogin Login Variables: login: required, remember: false, ip: 76.234.126.68, ua: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36
DEBUG - 2026-03-30 21:25:52 --> Auth attemptLogin() called with login identifier: tburks239223, remember: false
DEBUG - 2026-03-30 21:25:52 --> Auth attemptLogin() called. redirect_url in session: https://www.mymiwallet.com/index.php/register/success
DEBUG - 2026-03-30 21:25:52 --> Auth credentials normalised for attempt using key "username"
DEBUG - 2026-03-30 21:25:52 --> Auth attempt succeeded for identifier tburks239223. logged_in(): yes, user_id(): 11761
DEBUG - 2026-03-30 21:25:52 --> Auth attempt succeeded. logged_in(): yes, user_id(): 11761
DEBUG - 2026-03-30 21:25:52 --> Auth attemptLogin() - session user_id set to: 11761
ERROR - 2026-03-30 21:25:52 --> Duplicate entry 'tburks2392@gmail.com-76.234.126.68' for key 'bf_user_ip_history.bf_user_ip_unique_email'
in SYSTEMPATH/Database/MySQLi/Connection.php on line 300.
 1 SYSTEMPATH/Database/MySQLi/Connection.php(300): mysqli->query('INSERT INTO `bf_user_ip_history` (`user_id`, `email`, `ip_address`, `user_agent`, `first_seen_at`, `last_seen_at`, `created_at`, `updated_at`) VALUES (11761, \'tburks2392@gmail.com\', \'76.234.126.68\', \'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36\', \'2026-03-30 21:25:52\', \'2026-03-30 21:25:52\', \'2026-03-30 21:25:52\', \'2026-03-30 21:25:52\')', 0)
 2 SYSTEMPATH/Database/BaseConnection.php(769): CodeIgniter\Database\MySQLi\Connection->execute('INSERT INTO `bf_user_ip_history` (`user_id`, `email`, `ip_address`, `user_agent`, `first_seen_at`, `last_seen_at`, `created_at`, `updated_at`) VALUES (11761, \'tburks2392@gmail.com\', \'76.234.126.68\', \'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36\', \'2026-03-30 21:25:52\', \'2026-03-30 21:25:52\', \'2026-03-30 21:25:52\', \'2026-03-30 21:25:52\')')
 3 SYSTEMPATH/Database/BaseConnection.php(686): CodeIgniter\Database\BaseConnection->simpleQuery('INSERT INTO `bf_user_ip_history` (`user_id`, `email`, `ip_address`, `user_agent`, `first_seen_at`, `last_seen_at`, `created_at`, `updated_at`) VALUES (11761, \'tburks2392@gmail.com\', \'76.234.126.68\', \'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36\', \'2026-03-30 21:25:52\', \'2026-03-30 21:25:52\', \'2026-03-30 21:25:52\', \'2026-03-30 21:25:52\')')
 4 SYSTEMPATH/Database/BaseBuilder.php(2345): CodeIgniter\Database\BaseConnection->query('INSERT INTO `bf_user_ip_history` (`user_id`, `email`, `ip_address`, `user_agent`, `first_seen_at`, `last_seen_at`, `created_at`, `updated_at`) VALUES (:user_id:, :email:, :ip_address:, :user_agent:, :first_seen_at:, :last_seen_at:, :created_at:, :updated_at:)', [...], false)
 5 SYSTEMPATH/Model.php(356): CodeIgniter\Database\BaseBuilder->insert()
 6 SYSTEMPATH/BaseModel.php(898): CodeIgniter\Model->doInsert([...])
 7 SYSTEMPATH/Model.php(665): CodeIgniter\BaseModel->insert([...], true)
 8 APPPATH/Models/UserIpHistoryModel.php(41): CodeIgniter\Model->insert([...])
 9 APPPATH/Controllers/AuthController.php(287): App\Models\UserIpHistoryModel->record(11761, 'tburks2392@gmail.com', '76.234.126.68', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36')
10 SYSTEMPATH/CodeIgniter.php(951): App\Controllers\AuthController->attemptLogin()
11 SYSTEMPATH/CodeIgniter.php(497): CodeIgniter\CodeIgniter->runController(Object(App\Controllers\AuthController))
12 SYSTEMPATH/CodeIgniter.php(340): CodeIgniter\CodeIgniter->handleRequest(null, Object(Config\Cache), false)
13 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
14 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
15 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
ERROR - 2026-03-30 21:25:52 --> UserIpHistoryModel::record failed: Duplicate entry 'tburks2392@gmail.com-76.234.126.68' for key 'bf_user_ip_history.bf_user_ip_unique_email'
INFO - 2026-03-30 21:25:52 --> [AUTH] Login success
DEBUG - 2026-03-30 21:25:52 --> Auth redirect destination: https://www.mymiwallet.com/index.php/register/success
DEBUG - 2026-03-30 21:25:52 --> [REQ_ID=96f94a5a2274] [FILTER_AFTER]
DEBUG - 2026-03-30 21:25:52 --> [REQ_ID=96f94a5a2274] [LIFECYCLE][END] status=303 duration_ms=94.05 memory_delta=0
INFO - 2026-03-30 21:25:52 --> [REQ_ID=8ea148a271ea] [PERF] Execution time=0.094353
DEBUG - 2026-03-30 21:25:52 --> [REQ_ID=96f94a5a2274] [REQUEST][END]
INFO - 2026-03-30 21:25:52 --> [REQ_ID=96f94a5a2274] [PERF] Execution time=0.103081
DEBUG - 2026-03-30 21:25:52 --> [REQ_ID=c15fffb84916] [REQUEST][START] GET /index.php/register/success
DEBUG - 2026-03-30 21:25:52 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-30 21:25:52 --> [REQ_ID=c15fffb84916] [FILTER_BEFORE] /index.php/register/success
DEBUG - 2026-03-30 21:25:52 --> [REQ_ID=c15fffb84916] [ROUTE] Controller=\App\Controllers\AuthController Method=registerSuccess
DEBUG - 2026-03-30 21:25:52 --> [REQ_ID=c15fffb84916] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/register/success
DEBUG - 2026-03-30 21:25:52 --> [CSRF] token name=csrf_test_name hash=0f7ee53637f6dd0603269a4099d5a3fd
DEBUG - 2026-03-30 21:25:52 --> [REQ_ID=6cafa75b2b75] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-30 21:25:52 --> [REQ_ID=6cafa75b2b75] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-30 21:25:52 --> [TRACE]
DEBUG - 2026-03-30 21:25:52 --> [REGISTER_SUCCESS] entered
ERROR - 2026-03-30 21:25:52 --> Unknown column 'auth_groups_users.group_id' in 'on clause'
in SYSTEMPATH/Database/MySQLi/Connection.php on line 300.
 1 SYSTEMPATH/Database/MySQLi/Connection.php(300): mysqli->query('SELECT `auth_groups_users`.*, `auth_groups`.`name`, `auth_groups`.`description`
FROM `auth_groups`
LEFT JOIN `auth_groups_users` ON `auth_groups_users`.`group_id` = `auth_groups`.`id`
WHERE `user_id` = 11761', 0)
 2 SYSTEMPATH/Database/BaseConnection.php(769): CodeIgniter\Database\MySQLi\Connection->execute('SELECT `auth_groups_users`.*, `auth_groups`.`name`, `auth_groups`.`description`
FROM `auth_groups`
LEFT JOIN `auth_groups_users` ON `auth_groups_users`.`group_id` = `auth_groups`.`id`
WHERE `user_id` = 11761')
 3 SYSTEMPATH/Database/BaseConnection.php(686): CodeIgniter\Database\BaseConnection->simpleQuery('SELECT `auth_groups_users`.*, `auth_groups`.`name`, `auth_groups`.`description`
FROM `auth_groups`
LEFT JOIN `auth_groups_users` ON `auth_groups_users`.`group_id` = `auth_groups`.`id`
WHERE `user_id` = 11761')
 4 SYSTEMPATH/Database/BaseBuilder.php(1649): CodeIgniter\Database\BaseConnection->query('SELECT `auth_groups_users`.*, `auth_groups`.`name`, `auth_groups`.`description`
FROM `auth_groups`
LEFT JOIN `auth_groups_users` ON `auth_groups_users`.`group_id` = `auth_groups`.`id`
WHERE `user_id` = :user_id:', [...], false)
 5 VENDORPATH/myth/auth/src/Models/GroupModel.php(102): CodeIgniter\Database\BaseBuilder->get()
 6 VENDORPATH/myth/auth/src/Entities/User.php(270): Myth\Auth\Models\GroupModel->getGroupsForUser(11761)
 7 APPPATH/Controllers/AuthController.php(1034): Myth\Auth\Entities\User->getRoles()
 8 APPPATH/Controllers/AuthController.php(838): App\Controllers\AuthController->resolveUserRole()
 9 SYSTEMPATH/CodeIgniter.php(951): App\Controllers\AuthController->registerSuccess()
10 SYSTEMPATH/CodeIgniter.php(497): CodeIgniter\CodeIgniter->runController(Object(App\Controllers\AuthController))
11 SYSTEMPATH/CodeIgniter.php(340): CodeIgniter\CodeIgniter->handleRequest(null, Object(Config\Cache), false)
12 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
13 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
14 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
DEBUG - 2026-03-30 21:25:52 --> [ROLE_RESOLVE_FAIL] Unknown column 'auth_groups_users.group_id' in 'on clause'
DEBUG - 2026-03-30 21:25:52 --> [REGISTER_SUCCESS] data prepared
DEBUG - 2026-03-30 21:25:52 --> [REQ_ID=c15fffb84916] [FILTER_AFTER]
DEBUG - 2026-03-30 21:25:52 --> [REQ_ID=c15fffb84916] [LIFECYCLE][END] status=200 duration_ms=19.51 memory_delta=0
INFO - 2026-03-30 21:25:52 --> [REQ_ID=6cafa75b2b75] [PERF] Execution time=0.019516
DEBUG - 2026-03-30 21:25:52 --> [REQ_ID=c15fffb84916] [REQUEST][END]
INFO - 2026-03-30 21:25:52 --> [REQ_ID=c15fffb84916] [PERF] Execution time=0.027937
DEBUG - 2026-03-30 21:25:56 --> [REQ_ID=de4d9fd20b26] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-30 21:25:56 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-30 21:25:56 --> [REQ_ID=de4d9fd20b26] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-30 21:25:56 --> [REQ_ID=de4d9fd20b26] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-30 21:25:56 --> [REQ_ID=de4d9fd20b26] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-30 21:25:56 --> [CSRF] token name=csrf_test_name hash=0f7ee53637f6dd0603269a4099d5a3fd
DEBUG - 2026-03-30 21:25:56 --> [REQ_ID=eb6e77c22ad1] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-30 21:25:56 --> [REQ_ID=eb6e77c22ad1] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-30 21:25:56 --> [TRACE]
DEBUG - 2026-03-30 21:25:56 --> Auth redirect destination: https://www.mymiwallet.com/index.php/Dashboard
DEBUG - 2026-03-30 21:25:56 --> [REQ_ID=de4d9fd20b26] [FILTER_AFTER]
DEBUG - 2026-03-30 21:25:56 --> [REQ_ID=de4d9fd20b26] [LIFECYCLE][END] status=302 duration_ms=14.64 memory_delta=0
INFO - 2026-03-30 21:25:56 --> [REQ_ID=eb6e77c22ad1] [PERF] Execution time=0.015129
DEBUG - 2026-03-30 21:25:56 --> [REQ_ID=de4d9fd20b26] [REQUEST][END]
INFO - 2026-03-30 21:25:56 --> [REQ_ID=de4d9fd20b26] [PERF] Execution time=0.024772
DEBUG - 2026-03-30 21:25:58 --> [REQ_ID=aaa6f4cd8e3e] [REQUEST][START] POST /index.php/login
DEBUG - 2026-03-30 21:25:58 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-30 21:25:58 --> [REQ_ID=aaa6f4cd8e3e] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-30 21:25:58 --> [REQ_ID=aaa6f4cd8e3e] [ROUTE] Controller=\App\Controllers\AuthController Method=attemptLogin
DEBUG - 2026-03-30 21:25:58 --> [REQ_ID=aaa6f4cd8e3e] [LIFECYCLE][START] POST https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-30 21:25:58 --> [CSRF] token name=csrf_test_name hash=0f7ee53637f6dd0603269a4099d5a3fd
INFO - 2026-03-30 21:25:58 --> CSRF token verified.
DEBUG - 2026-03-30 21:25:58 --> [REQ_ID=4a80d1aa3535] [INIT] App\Controllers\AuthController::POST
INFO - 2026-03-30 21:25:58 --> [REQ_ID=4a80d1aa3535] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-30 21:25:58 --> [TRACE]
INFO - 2026-03-30 21:25:58 --> AuthController L93: Auth:attemptLogin started.
INFO - 2026-03-30 21:25:58 --> AuthController L104: Auth:attemptLogin rules: {"login":"required","password":"required"}
INFO - 2026-03-30 21:25:58 --> AuthController L132: Auth:attemptLogin Login Variables: login: required, remember: false, ip: 76.234.126.68, ua: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36
DEBUG - 2026-03-30 21:25:58 --> Auth attemptLogin() called with login identifier: tburks239223, remember: false
DEBUG - 2026-03-30 21:25:58 --> Auth attemptLogin() called. redirect_url in session: https://www.mymiwallet.com/index.php/register/success
DEBUG - 2026-03-30 21:25:58 --> Auth credentials normalised for attempt using key "username"
DEBUG - 2026-03-30 21:25:58 --> Auth attempt succeeded for identifier tburks239223. logged_in(): yes, user_id(): 11761
DEBUG - 2026-03-30 21:25:58 --> Auth attempt succeeded. logged_in(): yes, user_id(): 11761
DEBUG - 2026-03-30 21:25:58 --> Auth attemptLogin() - session user_id set to: 11761
ERROR - 2026-03-30 21:25:58 --> Duplicate entry 'tburks2392@gmail.com-76.234.126.68' for key 'bf_user_ip_history.bf_user_ip_unique_email'
in SYSTEMPATH/Database/MySQLi/Connection.php on line 300.
 1 SYSTEMPATH/Database/MySQLi/Connection.php(300): mysqli->query('INSERT INTO `bf_user_ip_history` (`user_id`, `email`, `ip_address`, `user_agent`, `first_seen_at`, `last_seen_at`, `created_at`, `updated_at`) VALUES (11761, \'tburks2392@gmail.com\', \'76.234.126.68\', \'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36\', \'2026-03-30 21:25:58\', \'2026-03-30 21:25:58\', \'2026-03-30 21:25:58\', \'2026-03-30 21:25:58\')', 0)
 2 SYSTEMPATH/Database/BaseConnection.php(769): CodeIgniter\Database\MySQLi\Connection->execute('INSERT INTO `bf_user_ip_history` (`user_id`, `email`, `ip_address`, `user_agent`, `first_seen_at`, `last_seen_at`, `created_at`, `updated_at`) VALUES (11761, \'tburks2392@gmail.com\', \'76.234.126.68\', \'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36\', \'2026-03-30 21:25:58\', \'2026-03-30 21:25:58\', \'2026-03-30 21:25:58\', \'2026-03-30 21:25:58\')')
 3 SYSTEMPATH/Database/BaseConnection.php(686): CodeIgniter\Database\BaseConnection->simpleQuery('INSERT INTO `bf_user_ip_history` (`user_id`, `email`, `ip_address`, `user_agent`, `first_seen_at`, `last_seen_at`, `created_at`, `updated_at`) VALUES (11761, \'tburks2392@gmail.com\', \'76.234.126.68\', \'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36\', \'2026-03-30 21:25:58\', \'2026-03-30 21:25:58\', \'2026-03-30 21:25:58\', \'2026-03-30 21:25:58\')')
 4 SYSTEMPATH/Database/BaseBuilder.php(2345): CodeIgniter\Database\BaseConnection->query('INSERT INTO `bf_user_ip_history` (`user_id`, `email`, `ip_address`, `user_agent`, `first_seen_at`, `last_seen_at`, `created_at`, `updated_at`) VALUES (:user_id:, :email:, :ip_address:, :user_agent:, :first_seen_at:, :last_seen_at:, :created_at:, :updated_at:)', [...], false)
 5 SYSTEMPATH/Model.php(356): CodeIgniter\Database\BaseBuilder->insert()
 6 SYSTEMPATH/BaseModel.php(898): CodeIgniter\Model->doInsert([...])
 7 SYSTEMPATH/Model.php(665): CodeIgniter\BaseModel->insert([...], true)
 8 APPPATH/Models/UserIpHistoryModel.php(41): CodeIgniter\Model->insert([...])
 9 APPPATH/Controllers/AuthController.php(287): App\Models\UserIpHistoryModel->record(11761, 'tburks2392@gmail.com', '76.234.126.68', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36')
10 SYSTEMPATH/CodeIgniter.php(951): App\Controllers\AuthController->attemptLogin()
11 SYSTEMPATH/CodeIgniter.php(497): CodeIgniter\CodeIgniter->runController(Object(App\Controllers\AuthController))
12 SYSTEMPATH/CodeIgniter.php(340): CodeIgniter\CodeIgniter->handleRequest(null, Object(Config\Cache), false)
13 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
14 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
15 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
ERROR - 2026-03-30 21:25:58 --> UserIpHistoryModel::record failed: Duplicate entry 'tburks2392@gmail.com-76.234.126.68' for key 'bf_user_ip_history.bf_user_ip_unique_email'
INFO - 2026-03-30 21:25:58 --> [AUTH] Login success
DEBUG - 2026-03-30 21:25:58 --> Auth redirect destination: https://www.mymiwallet.com/index.php/register/success
DEBUG - 2026-03-30 21:25:58 --> [REQ_ID=aaa6f4cd8e3e] [FILTER_AFTER]
DEBUG - 2026-03-30 21:25:58 --> [REQ_ID=aaa6f4cd8e3e] [LIFECYCLE][END] status=303 duration_ms=93.78 memory_delta=0
INFO - 2026-03-30 21:25:58 --> [REQ_ID=4a80d1aa3535] [PERF] Execution time=0.093931
DEBUG - 2026-03-30 21:25:58 --> [REQ_ID=aaa6f4cd8e3e] [REQUEST][END]
INFO - 2026-03-30 21:25:58 --> [REQ_ID=aaa6f4cd8e3e] [PERF] Execution time=0.102546
DEBUG - 2026-03-30 21:25:58 --> [REQ_ID=a8c76390c81a] [REQUEST][START] GET /index.php/register/success
DEBUG - 2026-03-30 21:25:58 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-30 21:25:58 --> [REQ_ID=a8c76390c81a] [FILTER_BEFORE] /index.php/register/success
DEBUG - 2026-03-30 21:25:58 --> [REQ_ID=a8c76390c81a] [ROUTE] Controller=\App\Controllers\AuthController Method=registerSuccess
DEBUG - 2026-03-30 21:25:58 --> [REQ_ID=a8c76390c81a] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/register/success
DEBUG - 2026-03-30 21:25:58 --> [CSRF] token name=csrf_test_name hash=0f7ee53637f6dd0603269a4099d5a3fd
DEBUG - 2026-03-30 21:25:58 --> [REQ_ID=eb5f0c1d2536] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-30 21:25:58 --> [REQ_ID=eb5f0c1d2536] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-30 21:25:58 --> [TRACE]
DEBUG - 2026-03-30 21:25:58 --> [REGISTER_SUCCESS] entered
ERROR - 2026-03-30 21:25:58 --> Unknown column 'auth_groups_users.group_id' in 'on clause'
in SYSTEMPATH/Database/MySQLi/Connection.php on line 300.
 1 SYSTEMPATH/Database/MySQLi/Connection.php(300): mysqli->query('SELECT `auth_groups_users`.*, `auth_groups`.`name`, `auth_groups`.`description`
FROM `auth_groups`
LEFT JOIN `auth_groups_users` ON `auth_groups_users`.`group_id` = `auth_groups`.`id`
WHERE `user_id` = 11761', 0)
 2 SYSTEMPATH/Database/BaseConnection.php(769): CodeIgniter\Database\MySQLi\Connection->execute('SELECT `auth_groups_users`.*, `auth_groups`.`name`, `auth_groups`.`description`
FROM `auth_groups`
LEFT JOIN `auth_groups_users` ON `auth_groups_users`.`group_id` = `auth_groups`.`id`
WHERE `user_id` = 11761')
 3 SYSTEMPATH/Database/BaseConnection.php(686): CodeIgniter\Database\BaseConnection->simpleQuery('SELECT `auth_groups_users`.*, `auth_groups`.`name`, `auth_groups`.`description`
FROM `auth_groups`
LEFT JOIN `auth_groups_users` ON `auth_groups_users`.`group_id` = `auth_groups`.`id`
WHERE `user_id` = 11761')
 4 SYSTEMPATH/Database/BaseBuilder.php(1649): CodeIgniter\Database\BaseConnection->query('SELECT `auth_groups_users`.*, `auth_groups`.`name`, `auth_groups`.`description`
FROM `auth_groups`
LEFT JOIN `auth_groups_users` ON `auth_groups_users`.`group_id` = `auth_groups`.`id`
WHERE `user_id` = :user_id:', [...], false)
 5 VENDORPATH/myth/auth/src/Models/GroupModel.php(102): CodeIgniter\Database\BaseBuilder->get()
 6 VENDORPATH/myth/auth/src/Entities/User.php(270): Myth\Auth\Models\GroupModel->getGroupsForUser(11761)
 7 APPPATH/Controllers/AuthController.php(1034): Myth\Auth\Entities\User->getRoles()
 8 APPPATH/Controllers/AuthController.php(838): App\Controllers\AuthController->resolveUserRole()
 9 SYSTEMPATH/CodeIgniter.php(951): App\Controllers\AuthController->registerSuccess()
10 SYSTEMPATH/CodeIgniter.php(497): CodeIgniter\CodeIgniter->runController(Object(App\Controllers\AuthController))
11 SYSTEMPATH/CodeIgniter.php(340): CodeIgniter\CodeIgniter->handleRequest(null, Object(Config\Cache), false)
12 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
13 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
14 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
DEBUG - 2026-03-30 21:25:58 --> [ROLE_RESOLVE_FAIL] Unknown column 'auth_groups_users.group_id' in 'on clause'
DEBUG - 2026-03-30 21:25:58 --> [REGISTER_SUCCESS] data prepared
DEBUG - 2026-03-30 21:25:58 --> [REQ_ID=a8c76390c81a] [FILTER_AFTER]
DEBUG - 2026-03-30 21:25:58 --> [REQ_ID=a8c76390c81a] [LIFECYCLE][END] status=200 duration_ms=20.38 memory_delta=0
INFO - 2026-03-30 21:25:58 --> [REQ_ID=eb5f0c1d2536] [PERF] Execution time=0.020604
DEBUG - 2026-03-30 21:25:58 --> [REQ_ID=a8c76390c81a] [REQUEST][END]
INFO - 2026-03-30 21:25:58 --> [REQ_ID=a8c76390c81a] [PERF] Execution time=0.031732
DEBUG - 2026-03-30 21:26:22 --> [REQ_ID=f2a533e1acfc] [REQUEST][START] HEAD /
DEBUG - 2026-03-30 21:26:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
ERROR - 2026-03-30 21:26:22 --> [404_ROUTE]
DEBUG - 2026-03-30 21:31:22 --> [REQ_ID=2b16ddce8869] [REQUEST][START] HEAD /
DEBUG - 2026-03-30 21:31:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
ERROR - 2026-03-30 21:31:22 --> [404_ROUTE]
DEBUG - 2026-03-30 21:36:22 --> [REQ_ID=526f0307b18c] [REQUEST][START] HEAD /
DEBUG - 2026-03-30 21:36:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
ERROR - 2026-03-30 21:36:22 --> [404_ROUTE]
DEBUG - 2026-03-30 21:41:22 --> [REQ_ID=365c4b5f3b6f] [REQUEST][START] HEAD /
DEBUG - 2026-03-30 21:41:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
ERROR - 2026-03-30 21:41:22 --> [404_ROUTE]
DEBUG - 2026-03-30 21:46:08 --> [REQ_ID=5e36b5b0bf34] [REQUEST][START] GET /
DEBUG - 2026-03-30 21:46:08 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-30 21:46:08 --> [REQ_ID=5e36b5b0bf34] [FILTER_BEFORE] /
DEBUG - 2026-03-30 21:46:08 --> [REQ_ID=5e36b5b0bf34] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-30 21:46:08 --> [REQ_ID=5e36b5b0bf34] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-30 21:46:08 --> [CSRF] token name=csrf_test_name hash=1173fe3bedcb23436fd5259110549ba8
DEBUG - 2026-03-30 21:46:08 --> [REQ_ID=3878540e33bb] [INIT] App\Controllers\Home::GET
INFO - 2026-03-30 21:46:08 --> [REQ_ID=3878540e33bb] [MEMORY][controller-start] 6291456
DEBUG - 2026-03-30 21:46:08 --> [TRACE]
INFO - 2026-03-30 21:46:08 --> [REQ_ID=3878540e33bb] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-30 21:46:08 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-30 21:46:09 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-03-30 21:46:09 --> [REQ_ID=3878540e33bb] [VIEW_RENDER] themes/public/home
INFO - 2026-03-30 21:46:09 --> [REQ_ID=3878540e33bb] [MEMORY][commonData:start] 10485760
INFO - 2026-03-30 21:46:09 --> themesMemory usage: 10485760
DEBUG - 2026-03-30 21:46:09 --> [MetaService] slug= pageName=Home cacheHit= path=DB
DEBUG - 2026-03-30 21:46:09 --> [REQ_ID=5e36b5b0bf34] [FILTER_AFTER]
DEBUG - 2026-03-30 21:46:09 --> [REQ_ID=5e36b5b0bf34] [LIFECYCLE][END] status=200 duration_ms=661.62 memory_delta=4194304
INFO - 2026-03-30 21:46:09 --> [REQ_ID=3878540e33bb] [PERF] Execution time=0.664883
DEBUG - 2026-03-30 21:46:09 --> [REQ_ID=5e36b5b0bf34] [REQUEST][END]
INFO - 2026-03-30 21:46:09 --> [REQ_ID=5e36b5b0bf34] [PERF] Execution time=0.700711
DEBUG - 2026-03-30 21:46:10 --> [REQ_ID=4e2caca5947f] [REQUEST][START] GET /
DEBUG - 2026-03-30 21:46:10 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-30 21:46:10 --> [REQ_ID=4e2caca5947f] [FILTER_BEFORE] /
DEBUG - 2026-03-30 21:46:10 --> [REQ_ID=4e2caca5947f] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-30 21:46:10 --> [REQ_ID=4e2caca5947f] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-30 21:46:10 --> [CSRF] token name=csrf_test_name hash=1173fe3bedcb23436fd5259110549ba8
DEBUG - 2026-03-30 21:46:10 --> [REQ_ID=4701772ed1f9] [INIT] App\Controllers\Home::GET
INFO - 2026-03-30 21:46:10 --> [REQ_ID=4701772ed1f9] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-30 21:46:10 --> [TRACE]
INFO - 2026-03-30 21:46:10 --> [REQ_ID=4701772ed1f9] [MEMORY][commonData:start] 4194304
DEBUG - 2026-03-30 21:46:10 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-30 21:46:10 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
DEBUG - 2026-03-30 21:46:10 --> [REQ_ID=4701772ed1f9] [VIEW_RENDER] themes/public/home
INFO - 2026-03-30 21:46:10 --> [REQ_ID=4701772ed1f9] [MEMORY][commonData:start] 8388608
INFO - 2026-03-30 21:46:10 --> themesMemory usage: 8388608
DEBUG - 2026-03-30 21:46:10 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-30 21:46:10 --> [REQ_ID=4e2caca5947f] [FILTER_AFTER]
DEBUG - 2026-03-30 21:46:10 --> [REQ_ID=4e2caca5947f] [LIFECYCLE][END] status=200 duration_ms=500.03 memory_delta=4194304
INFO - 2026-03-30 21:46:10 --> [REQ_ID=4701772ed1f9] [PERF] Execution time=0.500076
DEBUG - 2026-03-30 21:46:10 --> [REQ_ID=4e2caca5947f] [REQUEST][END]
INFO - 2026-03-30 21:46:10 --> [REQ_ID=4e2caca5947f] [PERF] Execution time=0.509688
DEBUG - 2026-03-30 21:46:22 --> [REQ_ID=a074aff01418] [REQUEST][START] HEAD /
DEBUG - 2026-03-30 21:46:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
ERROR - 2026-03-30 21:46:22 --> [404_ROUTE]
DEBUG - 2026-03-30 21:48:57 --> [REQ_ID=85504e84bb9c] [REQUEST][START] GET /index.php/Management/Alerts
DEBUG - 2026-03-30 21:48:57 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-30 21:48:57 --> [REQ_ID=85504e84bb9c] [FILTER_BEFORE] /index.php/Management/Alerts
DEBUG - 2026-03-30 21:48:57 --> [REQ_ID=85504e84bb9c] [ROUTE] Controller=\App\Modules\Management\Controllers\AlertsAdminController Method=index
DEBUG - 2026-03-30 21:48:57 --> [REQ_ID=85504e84bb9c] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Management/Alerts
DEBUG - 2026-03-30 21:48:57 --> [CSRF] token name=csrf_test_name hash=20560be52b5064851c1b0ec6ae400a92
DEBUG - 2026-03-30 21:48:57 --> [REQ_ID=85504e84bb9c] [REQUEST][END]
INFO - 2026-03-30 21:48:57 --> [REQ_ID=85504e84bb9c] [PERF] Execution time=0.053143
DEBUG - 2026-03-30 21:48:57 --> [REQ_ID=18c8df689b37] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-30 21:48:57 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-30 21:48:57 --> [REQ_ID=18c8df689b37] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-30 21:48:57 --> [REQ_ID=18c8df689b37] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-30 21:48:57 --> [REQ_ID=18c8df689b37] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-30 21:48:57 --> [CSRF] token name=csrf_test_name hash=67c74e210d7a1f78ad0b6cdd650df260
DEBUG - 2026-03-30 21:48:57 --> [REQ_ID=b3bef7372249] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-30 21:48:57 --> [REQ_ID=b3bef7372249] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-30 21:48:57 --> [TRACE]
DEBUG - 2026-03-30 21:48:57 --> [REQ_ID=18c8df689b37] [FILTER_AFTER]
DEBUG - 2026-03-30 21:48:57 --> [REQ_ID=18c8df689b37] [LIFECYCLE][END] status=200 duration_ms=37.00 memory_delta=0
INFO - 2026-03-30 21:48:57 --> [REQ_ID=b3bef7372249] [PERF] Execution time=0.040508
DEBUG - 2026-03-30 21:48:57 --> [REQ_ID=18c8df689b37] [REQUEST][END]
INFO - 2026-03-30 21:48:57 --> [REQ_ID=18c8df689b37] [PERF] Execution time=0.054345
DEBUG - 2026-03-30 21:51:22 --> [REQ_ID=399679ae6b19] [REQUEST][START] HEAD /
DEBUG - 2026-03-30 21:51:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
ERROR - 2026-03-30 21:51:22 --> [404_ROUTE]
DEBUG - 2026-03-30 21:56:22 --> [REQ_ID=f566145d9db4] [REQUEST][START] HEAD /
DEBUG - 2026-03-30 21:56:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
ERROR - 2026-03-30 21:56:22 --> [404_ROUTE]
DEBUG - 2026-03-30 22:00:02 --> [REQ_ID=eaa6d4f8db95] [REQUEST][START] GET /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-30 22:00:02 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-30 22:00:02 --> [REQ_ID=eaa6d4f8db95] [FILTER_BEFORE] /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-30 22:00:02 --> [REQ_ID=eaa6d4f8db95] [ROUTE] Controller=\App\Modules\Management\Controllers\ManagementAPIController Method=Run_CRON_Tasks
DEBUG - 2026-03-30 22:00:02 --> [REQ_ID=eaa6d4f8db95] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-30 22:00:02 --> [REQ_ID=eaa6d4f8db95] [REQUEST][END]
INFO - 2026-03-30 22:00:02 --> [REQ_ID=eaa6d4f8db95] [PERF] Execution time=0.045223
ERROR - 2026-03-30 22:00:02 --> Table 'mymiwallet.bf_route_error_heatmap' doesn't exist
in SYSTEMPATH/Database/MySQLi/Connection.php on line 300.
 1 SYSTEMPATH/Database/MySQLi/Connection.php(300): mysqli->query('SELECT *
FROM `bf_route_error_heatmap`
WHERE `route` = \'/index.php/API/Management/Run-CRON-Tasks\'
AND `error_type` = \'http_403\'
AND `status_code` = 403
 LIMIT 1', 0)
 2 SYSTEMPATH/Database/BaseConnection.php(769): CodeIgniter\Database\MySQLi\Connection->execute('SELECT *
FROM `bf_route_error_heatmap`
WHERE `route` = \'/index.php/API/Management/Run-CRON-Tasks\'
AND `error_type` = \'http_403\'
AND `status_code` = 403
 LIMIT 1')
 3 SYSTEMPATH/Database/BaseConnection.php(686): CodeIgniter\Database\BaseConnection->simpleQuery('SELECT *
FROM `bf_route_error_heatmap`
WHERE `route` = \'/index.php/API/Management/Run-CRON-Tasks\'
AND `error_type` = \'http_403\'
AND `status_code` = 403
 LIMIT 1')
 4 SYSTEMPATH/Database/BaseBuilder.php(1649): CodeIgniter\Database\BaseConnection->query('SELECT *
FROM `bf_route_error_heatmap`
WHERE `route` = :route:
AND `error_type` = :error_type:
AND `status_code` = :status_code:
 LIMIT 1', [...], false)
 5 SYSTEMPATH/Model.php(296): CodeIgniter\Database\BaseBuilder->get()
 6 SYSTEMPATH/BaseModel.php(713): CodeIgniter\Model->doFirst()
 7 APPPATH/Services/AIOps/RouteErrorHeatmapService.php(28): CodeIgniter\BaseModel->first()
 8 APPPATH/Config/Events.php(65): App\Services\AIOps\RouteErrorHeatmapService->record('/index.php/API/Management/Run-CRON-Tasks', 'http_403', 403)
 9 SYSTEMPATH/Events/Events.php(152): CodeIgniter\Events\Events::Config\{closure}()
10 SYSTEMPATH/CodeIgniter.php(357): CodeIgniter\Events\Events::trigger('post_system')
11 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
12 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
13 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
DEBUG - 2026-03-30 22:00:02 --> Route heatmap post_system hook skipped: Table 'mymiwallet.bf_route_error_heatmap' doesn't exist
DEBUG - 2026-03-30 22:00:43 --> [REQ_ID=34574b83e708] [REQUEST][START] GET /
DEBUG - 2026-03-30 22:00:43 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-30 22:00:43 --> [REQ_ID=34574b83e708] [FILTER_BEFORE] /
DEBUG - 2026-03-30 22:00:43 --> [REQ_ID=34574b83e708] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-30 22:00:43 --> [REQ_ID=34574b83e708] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-30 22:00:43 --> [CSRF] token name=csrf_test_name hash=449e743cf28679e09cfa0a7047aac6f4
DEBUG - 2026-03-30 22:00:43 --> [REQ_ID=a1dcf7affcf7] [INIT] App\Controllers\Home::GET
INFO - 2026-03-30 22:00:43 --> [REQ_ID=a1dcf7affcf7] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-30 22:00:43 --> [TRACE]
INFO - 2026-03-30 22:00:43 --> [REQ_ID=a1dcf7affcf7] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-30 22:00:43 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-30 22:00:44 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
DEBUG - 2026-03-30 22:00:44 --> [REQ_ID=a1dcf7affcf7] [VIEW_RENDER] themes/public/home
INFO - 2026-03-30 22:00:44 --> [REQ_ID=a1dcf7affcf7] [MEMORY][commonData:start] 8388608
INFO - 2026-03-30 22:00:44 --> themesMemory usage: 8388608
DEBUG - 2026-03-30 22:00:44 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-30 22:00:44 --> [REQ_ID=34574b83e708] [FILTER_AFTER]
DEBUG - 2026-03-30 22:00:44 --> [REQ_ID=34574b83e708] [LIFECYCLE][END] status=200 duration_ms=696.83 memory_delta=4194304
INFO - 2026-03-30 22:00:44 --> [REQ_ID=a1dcf7affcf7] [PERF] Execution time=0.699478
DEBUG - 2026-03-30 22:00:44 --> [REQ_ID=34574b83e708] [REQUEST][END]
INFO - 2026-03-30 22:00:44 --> [REQ_ID=34574b83e708] [PERF] Execution time=0.714763
DEBUG - 2026-03-30 22:01:22 --> [REQ_ID=49e85fca8e32] [REQUEST][START] HEAD /
DEBUG - 2026-03-30 22:01:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
ERROR - 2026-03-30 22:01:22 --> [404_ROUTE]
DEBUG - 2026-03-30 22:06:22 --> [REQ_ID=bda9b98c0cc3] [REQUEST][START] HEAD /
DEBUG - 2026-03-30 22:06:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
ERROR - 2026-03-30 22:06:22 --> [404_ROUTE]
DEBUG - 2026-03-30 22:07:35 --> [REQ_ID=fcc626794abb] [REQUEST][START] GET /index.php/Investments/Reports
DEBUG - 2026-03-30 22:07:35 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
INFO - 2026-03-30 22:07:35 --> REDIRECTED ROUTE at https://www.mymiwallet.com/Investments/Trade-Tracker
DEBUG - 2026-03-30 22:07:35 --> [REQ_ID=fcc626794abb] [REQUEST][END]
INFO - 2026-03-30 22:07:35 --> [REQ_ID=fcc626794abb] [PERF] Execution time=0.016981
DEBUG - 2026-03-30 22:11:22 --> [REQ_ID=0f062210d0f4] [REQUEST][START] HEAD /
DEBUG - 2026-03-30 22:11:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
ERROR - 2026-03-30 22:11:22 --> [404_ROUTE]
DEBUG - 2026-03-30 22:15:02 --> [REQ_ID=569e2358a489] [REQUEST][START] GET /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-30 22:15:02 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-30 22:15:02 --> [REQ_ID=569e2358a489] [FILTER_BEFORE] /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-30 22:15:02 --> [REQ_ID=569e2358a489] [ROUTE] Controller=\App\Modules\APIs\Controllers\AlertsAPIController Method=fetchEmailAlerts
DEBUG - 2026-03-30 22:15:02 --> [REQ_ID=569e2358a489] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-30 22:15:02 --> [REQ_ID=569e2358a489] [REQUEST][END]
INFO - 2026-03-30 22:15:02 --> [REQ_ID=569e2358a489] [PERF] Execution time=0.046505
ERROR - 2026-03-30 22:15:02 --> Table 'mymiwallet.bf_route_error_heatmap' doesn't exist
in SYSTEMPATH/Database/MySQLi/Connection.php on line 300.
 1 SYSTEMPATH/Database/MySQLi/Connection.php(300): mysqli->query('SELECT *
FROM `bf_route_error_heatmap`
WHERE `route` = \'/index.php/API/Alerts/fetchEmailAlerts\'
AND `error_type` = \'http_403\'
AND `status_code` = 403
 LIMIT 1', 0)
 2 SYSTEMPATH/Database/BaseConnection.php(769): CodeIgniter\Database\MySQLi\Connection->execute('SELECT *
FROM `bf_route_error_heatmap`
WHERE `route` = \'/index.php/API/Alerts/fetchEmailAlerts\'
AND `error_type` = \'http_403\'
AND `status_code` = 403
 LIMIT 1')
 3 SYSTEMPATH/Database/BaseConnection.php(686): CodeIgniter\Database\BaseConnection->simpleQuery('SELECT *
FROM `bf_route_error_heatmap`
WHERE `route` = \'/index.php/API/Alerts/fetchEmailAlerts\'
AND `error_type` = \'http_403\'
AND `status_code` = 403
 LIMIT 1')
 4 SYSTEMPATH/Database/BaseBuilder.php(1649): CodeIgniter\Database\BaseConnection->query('SELECT *
FROM `bf_route_error_heatmap`
WHERE `route` = :route:
AND `error_type` = :error_type:
AND `status_code` = :status_code:
 LIMIT 1', [...], false)
 5 SYSTEMPATH/Model.php(296): CodeIgniter\Database\BaseBuilder->get()
 6 SYSTEMPATH/BaseModel.php(713): CodeIgniter\Model->doFirst()
 7 APPPATH/Services/AIOps/RouteErrorHeatmapService.php(28): CodeIgniter\BaseModel->first()
 8 APPPATH/Config/Events.php(65): App\Services\AIOps\RouteErrorHeatmapService->record('/index.php/API/Alerts/fetchEmailAlerts', 'http_403', 403)
 9 SYSTEMPATH/Events/Events.php(152): CodeIgniter\Events\Events::Config\{closure}()
10 SYSTEMPATH/CodeIgniter.php(357): CodeIgniter\Events\Events::trigger('post_system')
11 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
12 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
13 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
DEBUG - 2026-03-30 22:15:02 --> Route heatmap post_system hook skipped: Table 'mymiwallet.bf_route_error_heatmap' doesn't exist
DEBUG - 2026-03-30 22:16:22 --> [REQ_ID=a19872e4e128] [REQUEST][START] HEAD /
DEBUG - 2026-03-30 22:16:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
ERROR - 2026-03-30 22:16:22 --> [404_ROUTE]
DEBUG - 2026-03-30 22:21:22 --> [REQ_ID=e7ef35cee63b] [REQUEST][START] HEAD /
DEBUG - 2026-03-30 22:21:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
ERROR - 2026-03-30 22:21:22 --> [404_ROUTE]
DEBUG - 2026-03-30 22:21:55 --> [REQ_ID=3c7ea6e758dc] [REQUEST][START] GET /index.php/Dashboard
DEBUG - 2026-03-30 22:21:55 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-30 22:21:55 --> [REQ_ID=3c7ea6e758dc] [FILTER_BEFORE] /index.php/Dashboard
DEBUG - 2026-03-30 22:21:55 --> [REQ_ID=3c7ea6e758dc] [ROUTE] Controller=\App\Modules\User\Controllers\DashboardController Method=index
DEBUG - 2026-03-30 22:21:55 --> [REQ_ID=3c7ea6e758dc] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Dashboard
DEBUG - 2026-03-30 22:21:55 --> [CSRF] token name=csrf_test_name hash=0f7ee53637f6dd0603269a4099d5a3fd
DEBUG - 2026-03-30 22:21:55 --> [REQ_ID=a6bdb77c6668] [INIT] App\Modules\User\Controllers\DashboardController::GET
INFO - 2026-03-30 22:21:55 --> [REQ_ID=a6bdb77c6668] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-30 22:21:55 --> [TRACE]
DEBUG - 2026-03-30 22:21:55 --> [REQ_ID=a6bdb77c6668] [METHOD_ENTRY] index
DEBUG - 2026-03-30 22:21:55 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-30 22:21:55 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-30 22:21:55 --> MyMICoin initialized ONCE
DEBUG - 2026-03-30 22:21:55 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-30 22:21:55 --> MyMIMarketing: Pscrape library not installed; Google search scraping will use fallback.
DEBUG - 2026-03-30 22:21:55 --> [DASHBOARD] Enter
DEBUG - 2026-03-30 22:21:55 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-30 22:21:55 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-30 22:21:55 --> [SERVICE] App\Services\BudgetService ::getUserBudget
DEBUG - 2026-03-30 22:21:55 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":11761,"deleted":0}
DEBUG - 2026-03-30 22:21:55 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-30 22:21:55 --> [MODEL_WHERE] App\Models\BudgetModel KEY="created_by"
DEBUG - 2026-03-30 22:21:55 --> [MODEL_WHERE] App\Models\BudgetModel KEY="account_type"
DEBUG - 2026-03-30 22:21:55 --> [MODEL_WHERE] App\Models\BudgetModel KEY="designated_date >="
DEBUG - 2026-03-30 22:21:55 --> [MODEL_WHERE] App\Models\BudgetModel KEY="designated_date <="
DEBUG - 2026-03-30 22:21:55 --> [MODEL_WHERE] App\Models\BudgetModel KEY="year"
DEBUG - 2026-03-30 22:21:55 --> [MODEL_WHERE] App\Models\BudgetModel KEY="month <="
DEBUG - 2026-03-30 22:21:55 --> [MODEL_WHERE] App\Models\BudgetModel KEY="day <="
DEBUG - 2026-03-30 22:21:55 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":11761,"account_type":"Income","month":"03","year":"2026"}
DEBUG - 2026-03-30 22:21:55 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-03-30 22:21:55 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":11761,"account_type":"Income","month":"03","year":"2026"}
DEBUG - 2026-03-30 22:21:55 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-03-30 22:21:55 --> [MODEL_WHERE] App\Models\BudgetModel KEY="created_by"
DEBUG - 2026-03-30 22:21:55 --> [MODEL_WHERE] App\Models\BudgetModel KEY="account_type"
DEBUG - 2026-03-30 22:21:55 --> [MODEL_WHERE] App\Models\BudgetModel KEY="designated_date >="
DEBUG - 2026-03-30 22:21:55 --> [MODEL_WHERE] App\Models\BudgetModel KEY="designated_date <="
DEBUG - 2026-03-30 22:21:55 --> [MODEL_WHERE] App\Models\BudgetModel KEY="year"
DEBUG - 2026-03-30 22:21:55 --> [MODEL_WHERE] App\Models\BudgetModel KEY="month <="
DEBUG - 2026-03-30 22:21:55 --> [MODEL_WHERE] App\Models\BudgetModel KEY="day <="
DEBUG - 2026-03-30 22:21:55 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":11761,"account_type":"Expense","month":"03","year":"2026"}
DEBUG - 2026-03-30 22:21:55 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-03-30 22:21:55 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":11761,"account_type":"Expense","month":"03","year":"2026"}
DEBUG - 2026-03-30 22:21:55 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-03-30 22:21:55 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"status":1,"created_by":11761,"deleted":0}
DEBUG - 2026-03-30 22:21:55 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"status":1,"paid":0,"created_by":11761,"deleted":0}
DEBUG - 2026-03-30 22:21:55 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"status":1,"created_by":11761,"deleted":0}
ERROR - 2026-03-30 22:21:56 --> DashboardController::index failed to load executive summary: Call to undefined method CodeIgniter\Cache\Handlers\FileHandler::set()
DEBUG - 2026-03-30 22:21:56 --> [CACHE_MISS] mymiwallet_development_squeeze_high-risk_global_global_1f86633dd
ERROR - 2026-03-30 22:21:56 --> Unknown column 'score_total' in 'where clause'
in SYSTEMPATH/Database/MySQLi/Connection.php on line 300.
 1 SYSTEMPATH/Database/MySQLi/Connection.php(300): mysqli->query('SELECT COUNT(*) AS `numrows`
FROM `bf_squeeze_scorecards`
WHERE `score_total` >= 80
AND `as_of_datetime` >= \'2026-03-29 22:21:56\'', 0)
 2 SYSTEMPATH/Database/BaseConnection.php(769): CodeIgniter\Database\MySQLi\Connection->execute('SELECT COUNT(*) AS `numrows`
FROM `bf_squeeze_scorecards`
WHERE `score_total` >= 80
AND `as_of_datetime` >= \'2026-03-29 22:21:56\'')
 3 SYSTEMPATH/Database/BaseConnection.php(686): CodeIgniter\Database\BaseConnection->simpleQuery('SELECT COUNT(*) AS `numrows`
FROM `bf_squeeze_scorecards`
WHERE `score_total` >= 80
AND `as_of_datetime` >= \'2026-03-29 22:21:56\'')
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
DEBUG - 2026-03-30 22:21:56 --> MyMIInvestments::getSqueezeHighRiskCount failed: Unknown column 'score_total' in 'where clause'
DEBUG - 2026-03-30 22:21:56 --> 📰 Daily dashboard news window 2026-03-30 00:00:00 -> 2026-03-30 23:59:59 returned 0 rows
DEBUG - 2026-03-30 22:21:56 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-30 22:21:56 --> [SETUP] Status computed
DEBUG - 2026-03-30 22:21:56 --> [REQ_ID=a6bdb77c6668] [VIEW_RENDER] User/Dashboard/index
INFO - 2026-03-30 22:21:56 --> [REQ_ID=a6bdb77c6668] [MEMORY][commonData:start] 8388608
DEBUG - 2026-03-30 22:21:56 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-30 22:21:56 --> [MODEL_WHERE] App\Models\BudgetModel KEY="created_by"
DEBUG - 2026-03-30 22:21:56 --> [MODEL_WHERE] App\Models\BudgetModel KEY="account_type"
DEBUG - 2026-03-30 22:21:56 --> [MODEL_WHERE] App\Models\BudgetModel KEY="designated_date >="
DEBUG - 2026-03-30 22:21:56 --> [MODEL_WHERE] App\Models\BudgetModel KEY="designated_date <="
DEBUG - 2026-03-30 22:21:56 --> [MODEL_WHERE] App\Models\BudgetModel KEY="year"
DEBUG - 2026-03-30 22:21:56 --> [MODEL_WHERE] App\Models\BudgetModel KEY="month <="
DEBUG - 2026-03-30 22:21:56 --> [MODEL_WHERE] App\Models\BudgetModel KEY="day <="
DEBUG - 2026-03-30 22:21:56 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":11761,"account_type":"Income","month":"03","year":"2026"}
DEBUG - 2026-03-30 22:21:56 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-03-30 22:21:56 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":11761,"account_type":"Income","month":"03","year":"2026"}
DEBUG - 2026-03-30 22:21:56 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-03-30 22:21:56 --> [MODEL_WHERE] App\Models\BudgetModel KEY="created_by"
DEBUG - 2026-03-30 22:21:56 --> [MODEL_WHERE] App\Models\BudgetModel KEY="account_type"
DEBUG - 2026-03-30 22:21:56 --> [MODEL_WHERE] App\Models\BudgetModel KEY="designated_date >="
DEBUG - 2026-03-30 22:21:56 --> [MODEL_WHERE] App\Models\BudgetModel KEY="designated_date <="
DEBUG - 2026-03-30 22:21:56 --> [MODEL_WHERE] App\Models\BudgetModel KEY="year"
DEBUG - 2026-03-30 22:21:56 --> [MODEL_WHERE] App\Models\BudgetModel KEY="month <="
DEBUG - 2026-03-30 22:21:56 --> [MODEL_WHERE] App\Models\BudgetModel KEY="day <="
DEBUG - 2026-03-30 22:21:56 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":11761,"account_type":"Expense","month":"03","year":"2026"}
DEBUG - 2026-03-30 22:21:56 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-03-30 22:21:56 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":11761,"account_type":"Expense","month":"03","year":"2026"}
DEBUG - 2026-03-30 22:21:56 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-03-30 22:21:56 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"status":1,"created_by":11761,"deleted":0}
DEBUG - 2026-03-30 22:21:56 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"status":1,"paid":0,"created_by":11761,"deleted":0}
DEBUG - 2026-03-30 22:21:56 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-30 22:21:56 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"status":1,"created_by":11761,"deleted":0}
DEBUG - 2026-03-30 22:21:56 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"status":1,"paid":0,"created_by":11761,"deleted":0}
DEBUG - 2026-03-30 22:21:56 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":11761,"account_type":"Income","status":1,"month":"03","year":"2026"}
DEBUG - 2026-03-30 22:21:56 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-03-30 22:21:56 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":11761,"account_type":"Expense","status":1,"month":"03","year":"2026"}
DEBUG - 2026-03-30 22:21:56 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-03-30 22:21:56 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":11761,"account_type":"Investment","month":"03","year":"2026","status":1}
DEBUG - 2026-03-30 22:21:56 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-03-30 22:21:56 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":11761,"account_type":"Income","status":1,"month":"03"}
DEBUG - 2026-03-30 22:21:56 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-03-30 22:21:56 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":11761,"account_type":"Expense","status":1,"month":"03"}
DEBUG - 2026-03-30 22:21:56 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-03-30 22:21:56 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":11761,"account_type":"Investment","month":"03","year":"2026","status":1}
DEBUG - 2026-03-30 22:21:56 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-03-30 22:21:56 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":11761,"account_type":"Income","status":1,"month":"04"}
DEBUG - 2026-03-30 22:21:56 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-03-30 22:21:56 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":11761,"account_type":"Expense","status":1,"month":"04"}
DEBUG - 2026-03-30 22:21:56 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-03-30 22:21:56 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":11761,"account_type":"Investment","month":"04","year":"2026","status":1}
DEBUG - 2026-03-30 22:21:56 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-03-30 22:21:56 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":11761,"account_type":"Income","status":1,"year":"2026"}
DEBUG - 2026-03-30 22:21:56 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-03-30 22:21:56 --> [MODEL_WHERE] App\Models\BudgetModel KEY="created_by"
DEBUG - 2026-03-30 22:21:56 --> [MODEL_WHERE] App\Models\BudgetModel KEY="account_type"
DEBUG - 2026-03-30 22:21:56 --> [MODEL_WHERE] App\Models\BudgetModel KEY="status"
DEBUG - 2026-03-30 22:21:56 --> [MODEL_WHERE] App\Models\BudgetModel KEY="year"
DEBUG - 2026-03-30 22:21:56 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-03-30 22:21:56 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":11761,"account_type":"Investment","status":1}
DEBUG - 2026-03-30 22:21:56 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-03-30 22:21:56 --> [MODEL_WHERE] App\Models\BudgetModel KEY="created_by"
DEBUG - 2026-03-30 22:21:56 --> [MODEL_WHERE] App\Models\BudgetModel KEY="account_type"
DEBUG - 2026-03-30 22:21:56 --> [MODEL_WHERE] App\Models\BudgetModel KEY="status"
DEBUG - 2026-03-30 22:21:56 --> [MODEL_WHERE] App\Models\BudgetModel KEY="designated_date >="
DEBUG - 2026-03-30 22:21:56 --> [MODEL_WHERE] App\Models\BudgetModel KEY="designated_date <="
DEBUG - 2026-03-30 22:21:56 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-03-30 22:21:56 --> [MODEL_WHERE] App\Models\BudgetModel KEY="created_by"
DEBUG - 2026-03-30 22:21:56 --> [MODEL_WHERE] App\Models\BudgetModel KEY="account_type"
DEBUG - 2026-03-30 22:21:56 --> [MODEL_WHERE] App\Models\BudgetModel KEY="status"
DEBUG - 2026-03-30 22:21:56 --> [MODEL_WHERE] App\Models\BudgetModel KEY="designated_date >="
DEBUG - 2026-03-30 22:21:56 --> [MODEL_WHERE] App\Models\BudgetModel KEY="designated_date <="
DEBUG - 2026-03-30 22:21:56 --> [MODEL_FIRST] App\Models\BudgetModel
INFO - 2026-03-30 22:21:56 --> DashboardController L72 - $checkingSummary: 0
DEBUG - 2026-03-30 22:21:56 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-30 22:21:56 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-30 22:21:56 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-30 22:21:56 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-30 22:21:56 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-30 22:21:56 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-30 22:21:56 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-30 22:21:56 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-30 22:21:56 --> [SERVICE] App\Services\BudgetService ::getUserBudget
DEBUG - 2026-03-30 22:21:56 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":11761,"deleted":0}
DEBUG - 2026-03-30 22:21:56 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-30 22:21:56 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"status":1,"created_by":11761,"deleted":0}
DEBUG - 2026-03-30 22:21:56 --> [MODEL_WHERE] App\Models\BudgetModel KEY="created_by"
DEBUG - 2026-03-30 22:21:56 --> [MODEL_WHERE] App\Models\BudgetModel KEY="account_type"
DEBUG - 2026-03-30 22:21:56 --> [MODEL_WHERE] App\Models\BudgetModel KEY="designated_date >="
DEBUG - 2026-03-30 22:21:56 --> [MODEL_WHERE] App\Models\BudgetModel KEY="designated_date <="
DEBUG - 2026-03-30 22:21:56 --> [MODEL_WHERE] App\Models\BudgetModel KEY="year"
DEBUG - 2026-03-30 22:21:56 --> [MODEL_WHERE] App\Models\BudgetModel KEY="month <="
DEBUG - 2026-03-30 22:21:56 --> [MODEL_WHERE] App\Models\BudgetModel KEY="day <="
DEBUG - 2026-03-30 22:21:56 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":11761,"account_type":"Income","month":"03","year":"2026"}
DEBUG - 2026-03-30 22:21:56 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-03-30 22:21:56 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":11761,"account_type":"Income","month":"03","year":"2026"}
DEBUG - 2026-03-30 22:21:56 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-03-30 22:21:56 --> [MODEL_WHERE] App\Models\BudgetModel KEY="created_by"
DEBUG - 2026-03-30 22:21:56 --> [MODEL_WHERE] App\Models\BudgetModel KEY="account_type"
DEBUG - 2026-03-30 22:21:56 --> [MODEL_WHERE] App\Models\BudgetModel KEY="designated_date >="
DEBUG - 2026-03-30 22:21:56 --> [MODEL_WHERE] App\Models\BudgetModel KEY="designated_date <="
DEBUG - 2026-03-30 22:21:56 --> [MODEL_WHERE] App\Models\BudgetModel KEY="year"
DEBUG - 2026-03-30 22:21:56 --> [MODEL_WHERE] App\Models\BudgetModel KEY="month <="
DEBUG - 2026-03-30 22:21:56 --> [MODEL_WHERE] App\Models\BudgetModel KEY="day <="
DEBUG - 2026-03-30 22:21:56 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":11761,"account_type":"Expense","month":"03","year":"2026"}
DEBUG - 2026-03-30 22:21:56 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-03-30 22:21:56 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":11761,"account_type":"Expense","month":"03","year":"2026"}
DEBUG - 2026-03-30 22:21:56 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-03-30 22:21:56 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"status":1,"created_by":11761,"deleted":0}
DEBUG - 2026-03-30 22:21:56 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"status":1,"paid":0,"created_by":11761,"deleted":0}
INFO - 2026-03-30 22:21:56 --> DashboardController: onboarding walkthrough modal triggered for user_id=11761
INFO - 2026-03-30 22:21:56 --> getSolanaData: invalid address param
INFO - 2026-03-30 22:21:56 --> themesMemory usage: 8388608
DEBUG - 2026-03-30 22:21:56 --> [REQ_ID=3c7ea6e758dc] [FILTER_AFTER]
DEBUG - 2026-03-30 22:21:56 --> [REQ_ID=3c7ea6e758dc] [LIFECYCLE][END] status=200 duration_ms=1,334.99 memory_delta=4194304
INFO - 2026-03-30 22:21:56 --> [REQ_ID=a6bdb77c6668] [PERF] Execution time=1.211353
DEBUG - 2026-03-30 22:21:56 --> [REQ_ID=3c7ea6e758dc] [REQUEST][END]
INFO - 2026-03-30 22:21:56 --> [REQ_ID=3c7ea6e758dc] [PERF] Execution time=1.359628
DEBUG - 2026-03-30 22:21:57 --> [REQ_ID=c26abb5932c2] [REQUEST][START] GET /index.php/API/Investments/getConfidenceHeatmap?timeframe=5m&window=60
DEBUG - 2026-03-30 22:21:57 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-30 22:21:57 --> [REQ_ID=c26abb5932c2] [FILTER_BEFORE] /index.php/API/Investments/getConfidenceHeatmap?timeframe=5m&window=60
DEBUG - 2026-03-30 22:21:57 --> [REQ_ID=c26abb5932c2] [ROUTE] Controller=\App\Modules\APIs\Controllers\InvestmentsAPIController Method=getConfidenceHeatmap
DEBUG - 2026-03-30 22:21:57 --> [REQ_ID=c26abb5932c2] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Investments/getConfidenceHeatmap?timeframe=5m&window=60
DEBUG - 2026-03-30 22:21:57 --> [REQ_ID=862b7e13fbe0] [INIT] App\Modules\APIs\Controllers\InvestmentsAPIController::GET
INFO - 2026-03-30 22:21:57 --> [REQ_ID=862b7e13fbe0] [MEMORY][controller-start] 6291456
DEBUG - 2026-03-30 22:21:57 --> [TRACE]
DEBUG - 2026-03-30 22:21:57 --> MyMICoin initialized ONCE
DEBUG - 2026-03-30 22:21:57 --> MyMIMarketing: Pscrape library not installed; Google search scraping will use fallback.
DEBUG - 2026-03-30 22:21:57 --> MyMIUser L52 - initialized (first log).
INFO - 2026-03-30 22:21:57 --> Premium entitlement resolved: user_id=11761 route=/index.php/API/Investments/getConfidenceHeatmap feature=investments.analytics tier=free status=free allowed=no reason=Feature requires tier1 or higher. Current tier: free (free).
WARNING - 2026-03-30 22:21:57 --> Premium access denied: feature=investments.analytics route=/index.php/API/Investments/getConfidenceHeatmap user_id=11761 tier=free status=free
DEBUG - 2026-03-30 22:21:57 --> [REQ_ID=c26abb5932c2] [FILTER_AFTER]
DEBUG - 2026-03-30 22:21:57 --> [REQ_ID=c26abb5932c2] [LIFECYCLE][END] status=302 duration_ms=33.52 memory_delta=0
INFO - 2026-03-30 22:21:57 --> [REQ_ID=862b7e13fbe0] [PERF] Execution time=0.033566
DEBUG - 2026-03-30 22:21:57 --> [REQ_ID=c26abb5932c2] [REQUEST][END]
INFO - 2026-03-30 22:21:57 --> [REQ_ID=c26abb5932c2] [PERF] Execution time=0.056175
DEBUG - 2026-03-30 22:21:57 --> [REQ_ID=608901c87061] [REQUEST][START] GET /index.php/API/Investments/getForecastAccuracySummary?window=7d
DEBUG - 2026-03-30 22:21:57 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-30 22:21:57 --> [REQ_ID=608901c87061] [FILTER_BEFORE] /index.php/API/Investments/getForecastAccuracySummary?window=7d
DEBUG - 2026-03-30 22:21:57 --> [REQ_ID=608901c87061] [ROUTE] Controller=\App\Modules\APIs\Controllers\InvestmentsAPIController Method=getForecastAccuracySummary
DEBUG - 2026-03-30 22:21:57 --> [REQ_ID=608901c87061] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Investments/getForecastAccuracySummary?window=7d
DEBUG - 2026-03-30 22:21:57 --> [REQ_ID=30c65b79f77b] [INIT] App\Modules\APIs\Controllers\InvestmentsAPIController::GET
INFO - 2026-03-30 22:21:57 --> [REQ_ID=30c65b79f77b] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-30 22:21:57 --> [TRACE]
DEBUG - 2026-03-30 22:21:57 --> MyMICoin initialized ONCE
DEBUG - 2026-03-30 22:21:57 --> MyMIMarketing: Pscrape library not installed; Google search scraping will use fallback.
DEBUG - 2026-03-30 22:21:57 --> MyMIUser L52 - initialized (first log).
INFO - 2026-03-30 22:21:57 --> Premium entitlement resolved: user_id=11761 route=/index.php/API/Investments/getForecastAccuracySummary feature=investments.analytics tier=free status=free allowed=no reason=Feature requires tier1 or higher. Current tier: free (free).
WARNING - 2026-03-30 22:21:57 --> Premium access denied: feature=investments.analytics route=/index.php/API/Investments/getForecastAccuracySummary user_id=11761 tier=free status=free
DEBUG - 2026-03-30 22:21:57 --> [REQ_ID=608901c87061] [FILTER_AFTER]
DEBUG - 2026-03-30 22:21:57 --> [REQ_ID=608901c87061] [LIFECYCLE][END] status=302 duration_ms=23.19 memory_delta=0
INFO - 2026-03-30 22:21:57 --> [REQ_ID=30c65b79f77b] [PERF] Execution time=0.023217
DEBUG - 2026-03-30 22:21:57 --> [REQ_ID=608901c87061] [REQUEST][END]
INFO - 2026-03-30 22:21:57 --> [REQ_ID=608901c87061] [PERF] Execution time=0.033062
DEBUG - 2026-03-30 22:21:57 --> [REQ_ID=5f55b8a9bc36] [REQUEST][START] GET /index.php/Memberships
DEBUG - 2026-03-30 22:21:57 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-30 22:21:57 --> [REQ_ID=5f55b8a9bc36] [FILTER_BEFORE] /index.php/Memberships
DEBUG - 2026-03-30 22:21:57 --> [REQ_ID=5f55b8a9bc36] [ROUTE] Controller=\App\Controllers\Home Method=memberships
DEBUG - 2026-03-30 22:21:57 --> [REQ_ID=5f55b8a9bc36] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Memberships
DEBUG - 2026-03-30 22:21:57 --> [CSRF] token name=csrf_test_name hash=0f7ee53637f6dd0603269a4099d5a3fd
DEBUG - 2026-03-30 22:21:57 --> [REQ_ID=f1ab3a6d47c3] [INIT] App\Controllers\Home::GET
INFO - 2026-03-30 22:21:57 --> [REQ_ID=f1ab3a6d47c3] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-30 22:21:57 --> [TRACE]
INFO - 2026-03-30 22:21:57 --> [REQ_ID=f1ab3a6d47c3] [MEMORY][commonData:start] 4194304
DEBUG - 2026-03-30 22:21:57 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-30 22:21:58 --> [REQ_ID=1f1383151af7] [REQUEST][START] GET /index.php/API/Investments/getForecastHighlights
DEBUG - 2026-03-30 22:21:58 --> [MetaService] slug=memberships pageName= cacheHit= path=DB
DEBUG - 2026-03-30 22:21:58 --> [REQ_ID=f1ab3a6d47c3] [VIEW_RENDER] themes/public/memberships
INFO - 2026-03-30 22:21:58 --> [REQ_ID=f1ab3a6d47c3] [MEMORY][commonData:start] 8388608
INFO - 2026-03-30 22:21:58 --> themesMemory usage: 8388608
DEBUG - 2026-03-30 22:21:58 --> [MetaService] slug=memberships pageName=Memberships cacheHit= path=DB
DEBUG - 2026-03-30 22:21:58 --> [REQ_ID=5f55b8a9bc36] [FILTER_AFTER]
DEBUG - 2026-03-30 22:21:58 --> [REQ_ID=5f55b8a9bc36] [LIFECYCLE][END] status=200 duration_ms=525.58 memory_delta=4194304
INFO - 2026-03-30 22:21:58 --> [REQ_ID=f1ab3a6d47c3] [PERF] Execution time=0.525960
DEBUG - 2026-03-30 22:21:58 --> [REQ_ID=5f55b8a9bc36] [REQUEST][END]
INFO - 2026-03-30 22:21:58 --> [REQ_ID=5f55b8a9bc36] [PERF] Execution time=0.535560
DEBUG - 2026-03-30 22:21:58 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-30 22:21:58 --> [REQ_ID=1f1383151af7] [FILTER_BEFORE] /index.php/API/Investments/getForecastHighlights
DEBUG - 2026-03-30 22:21:58 --> [REQ_ID=1f1383151af7] [ROUTE] Controller=\App\Modules\APIs\Controllers\InvestmentsAPIController Method=getForecastHighlights
DEBUG - 2026-03-30 22:21:58 --> [REQ_ID=1f1383151af7] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Investments/getForecastHighlights
DEBUG - 2026-03-30 22:21:58 --> [REQ_ID=c082369a2d0e] [INIT] App\Modules\APIs\Controllers\InvestmentsAPIController::GET
INFO - 2026-03-30 22:21:58 --> [REQ_ID=c082369a2d0e] [MEMORY][controller-start] 6291456
DEBUG - 2026-03-30 22:21:58 --> [REQ_ID=ad6ff627270d] [REQUEST][START] GET /index.php/API/Investments/getConfidenceHeatmap?timeframe=all&window=6h
DEBUG - 2026-03-30 22:21:58 --> [REQ_ID=8045af28db12] [REQUEST][START] GET /index.php/Memberships
DEBUG - 2026-03-30 22:21:58 --> [TRACE]
DEBUG - 2026-03-30 22:21:58 --> MyMICoin initialized ONCE
DEBUG - 2026-03-30 22:21:58 --> MyMIMarketing: Pscrape library not installed; Google search scraping will use fallback.
DEBUG - 2026-03-30 22:21:58 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-30 22:21:58 --> [REQ_ID=1f1383151af7] [FILTER_AFTER]
DEBUG - 2026-03-30 22:21:58 --> [REQ_ID=1f1383151af7] [LIFECYCLE][END] status=200 duration_ms=446.45 memory_delta=2097152
INFO - 2026-03-30 22:21:58 --> [REQ_ID=c082369a2d0e] [PERF] Execution time=0.449649
DEBUG - 2026-03-30 22:21:58 --> [REQ_ID=1f1383151af7] [REQUEST][END]
INFO - 2026-03-30 22:21:58 --> [REQ_ID=1f1383151af7] [PERF] Execution time=0.516141
DEBUG - 2026-03-30 22:21:58 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-30 22:21:58 --> [REQ_ID=ad6ff627270d] [FILTER_BEFORE] /index.php/API/Investments/getConfidenceHeatmap?timeframe=all&window=6h
DEBUG - 2026-03-30 22:21:58 --> [REQ_ID=ad6ff627270d] [ROUTE] Controller=\App\Modules\APIs\Controllers\InvestmentsAPIController Method=getConfidenceHeatmap
DEBUG - 2026-03-30 22:21:58 --> [REQ_ID=ad6ff627270d] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Investments/getConfidenceHeatmap?timeframe=all&window=6h
DEBUG - 2026-03-30 22:21:58 --> [REQ_ID=d64fc9a5d471] [INIT] App\Modules\APIs\Controllers\InvestmentsAPIController::GET
INFO - 2026-03-30 22:21:58 --> [REQ_ID=d64fc9a5d471] [MEMORY][controller-start] 6291456
DEBUG - 2026-03-30 22:21:58 --> [TRACE]
DEBUG - 2026-03-30 22:21:58 --> [REQ_ID=f1c1071d660e] [REQUEST][START] GET /index.php/API/Investments/getForecastHighlights
DEBUG - 2026-03-30 22:21:58 --> MyMICoin initialized ONCE
DEBUG - 2026-03-30 22:21:59 --> MyMIMarketing: Pscrape library not installed; Google search scraping will use fallback.
DEBUG - 2026-03-30 22:21:59 --> MyMIUser L52 - initialized (first log).
INFO - 2026-03-30 22:21:59 --> Premium entitlement resolved: user_id=11761 route=/index.php/API/Investments/getConfidenceHeatmap feature=investments.analytics tier=free status=free allowed=no reason=Feature requires tier1 or higher. Current tier: free (free).
WARNING - 2026-03-30 22:21:59 --> Premium access denied: feature=investments.analytics route=/index.php/API/Investments/getConfidenceHeatmap user_id=11761 tier=free status=free
DEBUG - 2026-03-30 22:21:59 --> [REQ_ID=ad6ff627270d] [FILTER_AFTER]
DEBUG - 2026-03-30 22:21:59 --> [REQ_ID=ad6ff627270d] [LIFECYCLE][END] status=302 duration_ms=140.28 memory_delta=2097152
INFO - 2026-03-30 22:21:59 --> [REQ_ID=d64fc9a5d471] [PERF] Execution time=0.144928
DEBUG - 2026-03-30 22:21:59 --> [REQ_ID=ad6ff627270d] [REQUEST][END]
INFO - 2026-03-30 22:21:59 --> [REQ_ID=ad6ff627270d] [PERF] Execution time=0.596803
DEBUG - 2026-03-30 22:21:59 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-30 22:21:59 --> [REQ_ID=8045af28db12] [FILTER_BEFORE] /index.php/Memberships
DEBUG - 2026-03-30 22:21:59 --> [REQ_ID=8045af28db12] [ROUTE] Controller=\App\Controllers\Home Method=memberships
DEBUG - 2026-03-30 22:21:59 --> [REQ_ID=8045af28db12] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Memberships
DEBUG - 2026-03-30 22:21:59 --> [CSRF] token name=csrf_test_name hash=0f7ee53637f6dd0603269a4099d5a3fd
DEBUG - 2026-03-30 22:21:59 --> [REQ_ID=a07762c7fcc9] [INIT] App\Controllers\Home::GET
INFO - 2026-03-30 22:21:59 --> [REQ_ID=a07762c7fcc9] [MEMORY][controller-start] 6291456
DEBUG - 2026-03-30 22:21:59 --> [TRACE]
INFO - 2026-03-30 22:21:59 --> [REQ_ID=a07762c7fcc9] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-30 22:21:59 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-30 22:21:59 --> [REQ_ID=3c78f6b444bc] [REQUEST][START] GET /index.php/ops/health
DEBUG - 2026-03-30 22:21:59 --> [MetaService] slug=memberships pageName= cacheHit=1 path=CACHE
DEBUG - 2026-03-30 22:21:59 --> [REQ_ID=a07762c7fcc9] [VIEW_RENDER] themes/public/memberships
INFO - 2026-03-30 22:21:59 --> [REQ_ID=a07762c7fcc9] [MEMORY][commonData:start] 8388608
INFO - 2026-03-30 22:21:59 --> themesMemory usage: 8388608
DEBUG - 2026-03-30 22:21:59 --> [MetaService] slug=memberships pageName=Memberships cacheHit=1 path=CACHE
DEBUG - 2026-03-30 22:21:59 --> [REQ_ID=8045af28db12] [FILTER_AFTER]
DEBUG - 2026-03-30 22:21:59 --> [REQ_ID=8045af28db12] [LIFECYCLE][END] status=200 duration_ms=508.28 memory_delta=2097152
INFO - 2026-03-30 22:21:59 --> [REQ_ID=a07762c7fcc9] [PERF] Execution time=0.508192
DEBUG - 2026-03-30 22:21:59 --> [REQ_ID=8045af28db12] [REQUEST][END]
INFO - 2026-03-30 22:21:59 --> [REQ_ID=8045af28db12] [PERF] Execution time=1.106696
DEBUG - 2026-03-30 22:21:59 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-30 22:21:59 --> [REQ_ID=f1c1071d660e] [FILTER_BEFORE] /index.php/API/Investments/getForecastHighlights
DEBUG - 2026-03-30 22:21:59 --> [REQ_ID=f1c1071d660e] [ROUTE] Controller=\App\Modules\APIs\Controllers\InvestmentsAPIController Method=getForecastHighlights
DEBUG - 2026-03-30 22:21:59 --> [REQ_ID=f1c1071d660e] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Investments/getForecastHighlights
DEBUG - 2026-03-30 22:21:59 --> [REQ_ID=ca76f81daf1c] [INIT] App\Modules\APIs\Controllers\InvestmentsAPIController::GET
INFO - 2026-03-30 22:21:59 --> [REQ_ID=ca76f81daf1c] [MEMORY][controller-start] 6291456
DEBUG - 2026-03-30 22:21:59 --> [TRACE]
DEBUG - 2026-03-30 22:21:59 --> MyMICoin initialized ONCE
DEBUG - 2026-03-30 22:21:59 --> MyMIMarketing: Pscrape library not installed; Google search scraping will use fallback.
DEBUG - 2026-03-30 22:21:59 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-30 22:21:59 --> [REQ_ID=f1c1071d660e] [FILTER_AFTER]
DEBUG - 2026-03-30 22:21:59 --> [REQ_ID=f1c1071d660e] [LIFECYCLE][END] status=200 duration_ms=14.69 memory_delta=0
INFO - 2026-03-30 22:21:59 --> [REQ_ID=ca76f81daf1c] [PERF] Execution time=0.014647
DEBUG - 2026-03-30 22:21:59 --> [REQ_ID=f1c1071d660e] [REQUEST][END]
INFO - 2026-03-30 22:21:59 --> [REQ_ID=f1c1071d660e] [PERF] Execution time=0.656400
DEBUG - 2026-03-30 22:21:59 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-30 22:21:59 --> [REQ_ID=3c78f6b444bc] [FILTER_BEFORE] /index.php/ops/health
DEBUG - 2026-03-30 22:21:59 --> [REQ_ID=3c78f6b444bc] [ROUTE] Controller=\App\Controllers\OpsHealthController Method=index
DEBUG - 2026-03-30 22:21:59 --> [REQ_ID=3c78f6b444bc] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/ops/health
DEBUG - 2026-03-30 22:21:59 --> [CSRF] token name=csrf_test_name hash=0f7ee53637f6dd0603269a4099d5a3fd
DEBUG - 2026-03-30 22:21:59 --> [REQ_ID=76d2884494f8] [INIT] App\Controllers\OpsHealthController::GET
INFO - 2026-03-30 22:21:59 --> [REQ_ID=76d2884494f8] [MEMORY][controller-start] 6291456
DEBUG - 2026-03-30 22:21:59 --> [TRACE]
DEBUG - 2026-03-30 22:21:59 --> [REQ_ID=76d2884494f8] [METHOD_ENTRY] index
DEBUG - 2026-03-30 22:21:59 --> [REQ_ID=73894d856453] [REQUEST][START] GET /index.php/Memberships
DEBUG - 2026-03-30 22:21:59 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-30 22:21:59 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-30 22:21:59 --> MyMICoin initialized ONCE
DEBUG - 2026-03-30 22:21:59 --> [REQ_ID=3c78f6b444bc] [FILTER_AFTER]
DEBUG - 2026-03-30 22:21:59 --> [REQ_ID=3c78f6b444bc] [LIFECYCLE][END] status=404 duration_ms=90.66 memory_delta=0
INFO - 2026-03-30 22:21:59 --> [REQ_ID=76d2884494f8] [PERF] Execution time=0.068115
DEBUG - 2026-03-30 22:21:59 --> [REQ_ID=3c78f6b444bc] [REQUEST][END]
INFO - 2026-03-30 22:21:59 --> [REQ_ID=3c78f6b444bc] [PERF] Execution time=0.618089
ERROR - 2026-03-30 22:21:59 --> Table 'mymiwallet.bf_route_error_heatmap' doesn't exist
in SYSTEMPATH/Database/MySQLi/Connection.php on line 300.
 1 SYSTEMPATH/Database/MySQLi/Connection.php(300): mysqli->query('SELECT *
FROM `bf_route_error_heatmap`
WHERE `route` = \'/index.php/ops/health\'
AND `error_type` = \'missing_route\'
AND `status_code` = 404
 LIMIT 1', 0)
 2 SYSTEMPATH/Database/BaseConnection.php(769): CodeIgniter\Database\MySQLi\Connection->execute('SELECT *
FROM `bf_route_error_heatmap`
WHERE `route` = \'/index.php/ops/health\'
AND `error_type` = \'missing_route\'
AND `status_code` = 404
 LIMIT 1')
 3 SYSTEMPATH/Database/BaseConnection.php(686): CodeIgniter\Database\BaseConnection->simpleQuery('SELECT *
FROM `bf_route_error_heatmap`
WHERE `route` = \'/index.php/ops/health\'
AND `error_type` = \'missing_route\'
AND `status_code` = 404
 LIMIT 1')
 4 SYSTEMPATH/Database/BaseBuilder.php(1649): CodeIgniter\Database\BaseConnection->query('SELECT *
FROM `bf_route_error_heatmap`
WHERE `route` = :route:
AND `error_type` = :error_type:
AND `status_code` = :status_code:
 LIMIT 1', [...], false)
 5 SYSTEMPATH/Model.php(296): CodeIgniter\Database\BaseBuilder->get()
 6 SYSTEMPATH/BaseModel.php(713): CodeIgniter\Model->doFirst()
 7 APPPATH/Services/AIOps/RouteErrorHeatmapService.php(28): CodeIgniter\BaseModel->first()
 8 APPPATH/Config/Events.php(65): App\Services\AIOps\RouteErrorHeatmapService->record('/index.php/ops/health', 'missing_route', 404)
 9 SYSTEMPATH/Events/Events.php(152): CodeIgniter\Events\Events::Config\{closure}()
10 SYSTEMPATH/CodeIgniter.php(357): CodeIgniter\Events\Events::trigger('post_system')
11 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
12 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
13 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
DEBUG - 2026-03-30 22:21:59 --> Route heatmap post_system hook skipped: Table 'mymiwallet.bf_route_error_heatmap' doesn't exist
DEBUG - 2026-03-30 22:21:59 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-30 22:21:59 --> [REQ_ID=73894d856453] [FILTER_BEFORE] /index.php/Memberships
DEBUG - 2026-03-30 22:21:59 --> [REQ_ID=73894d856453] [ROUTE] Controller=\App\Controllers\Home Method=memberships
DEBUG - 2026-03-30 22:21:59 --> [REQ_ID=73894d856453] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Memberships
DEBUG - 2026-03-30 22:21:59 --> [CSRF] token name=csrf_test_name hash=0f7ee53637f6dd0603269a4099d5a3fd
DEBUG - 2026-03-30 22:21:59 --> [REQ_ID=3a634b542337] [INIT] App\Controllers\Home::GET
INFO - 2026-03-30 22:21:59 --> [REQ_ID=3a634b542337] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-30 22:21:59 --> [TRACE]
INFO - 2026-03-30 22:21:59 --> [REQ_ID=3a634b542337] [MEMORY][commonData:start] 4194304
DEBUG - 2026-03-30 22:21:59 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-30 22:22:00 --> [MetaService] slug=memberships pageName= cacheHit=1 path=CACHE
DEBUG - 2026-03-30 22:22:00 --> [REQ_ID=3a634b542337] [VIEW_RENDER] themes/public/memberships
INFO - 2026-03-30 22:22:00 --> [REQ_ID=3a634b542337] [MEMORY][commonData:start] 8388608
INFO - 2026-03-30 22:22:00 --> themesMemory usage: 8388608
DEBUG - 2026-03-30 22:22:00 --> [MetaService] slug=memberships pageName=Memberships cacheHit=1 path=CACHE
DEBUG - 2026-03-30 22:22:00 --> [REQ_ID=73894d856453] [FILTER_AFTER]
DEBUG - 2026-03-30 22:22:00 --> [REQ_ID=73894d856453] [LIFECYCLE][END] status=200 duration_ms=540.94 memory_delta=4194304
INFO - 2026-03-30 22:22:00 --> [REQ_ID=3a634b542337] [PERF] Execution time=0.539663
DEBUG - 2026-03-30 22:22:00 --> [REQ_ID=73894d856453] [REQUEST][END]
INFO - 2026-03-30 22:22:00 --> [REQ_ID=73894d856453] [PERF] Execution time=0.607313
DEBUG - 2026-03-30 22:22:17 --> [REQ_ID=0ab74ae52b06] [REQUEST][START] GET /index.php/Dashboard
DEBUG - 2026-03-30 22:22:17 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-30 22:22:17 --> [REQ_ID=0ab74ae52b06] [FILTER_BEFORE] /index.php/Dashboard
DEBUG - 2026-03-30 22:22:17 --> [REQ_ID=0ab74ae52b06] [ROUTE] Controller=\App\Modules\User\Controllers\DashboardController Method=index
DEBUG - 2026-03-30 22:22:17 --> [REQ_ID=0ab74ae52b06] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Dashboard
DEBUG - 2026-03-30 22:22:17 --> [CSRF] token name=csrf_test_name hash=0f7ee53637f6dd0603269a4099d5a3fd
DEBUG - 2026-03-30 22:22:17 --> [REQ_ID=0e24d89aa2d7] [INIT] App\Modules\User\Controllers\DashboardController::GET
INFO - 2026-03-30 22:22:17 --> [REQ_ID=0e24d89aa2d7] [MEMORY][controller-start] 6291456
DEBUG - 2026-03-30 22:22:17 --> [TRACE]
DEBUG - 2026-03-30 22:22:17 --> [REQ_ID=0e24d89aa2d7] [METHOD_ENTRY] index
DEBUG - 2026-03-30 22:22:17 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-30 22:22:17 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-30 22:22:17 --> MyMICoin initialized ONCE
DEBUG - 2026-03-30 22:22:17 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-30 22:22:17 --> MyMIMarketing: Pscrape library not installed; Google search scraping will use fallback.
DEBUG - 2026-03-30 22:22:17 --> [DASHBOARD] Enter
ERROR - 2026-03-30 22:22:17 --> DashboardController::index failed to load executive summary: Call to undefined method CodeIgniter\Cache\Handlers\FileHandler::set()
DEBUG - 2026-03-30 22:22:17 --> [CACHE_MISS] mymiwallet_development_squeeze_high-risk_global_global_1f86633dd
ERROR - 2026-03-30 22:22:17 --> Unknown column 'score_total' in 'where clause'
in SYSTEMPATH/Database/MySQLi/Connection.php on line 300.
 1 SYSTEMPATH/Database/MySQLi/Connection.php(300): mysqli->query('SELECT COUNT(*) AS `numrows`
FROM `bf_squeeze_scorecards`
WHERE `score_total` >= 80
AND `as_of_datetime` >= \'2026-03-29 22:22:17\'', 0)
 2 SYSTEMPATH/Database/BaseConnection.php(769): CodeIgniter\Database\MySQLi\Connection->execute('SELECT COUNT(*) AS `numrows`
FROM `bf_squeeze_scorecards`
WHERE `score_total` >= 80
AND `as_of_datetime` >= \'2026-03-29 22:22:17\'')
 3 SYSTEMPATH/Database/BaseConnection.php(686): CodeIgniter\Database\BaseConnection->simpleQuery('SELECT COUNT(*) AS `numrows`
FROM `bf_squeeze_scorecards`
WHERE `score_total` >= 80
AND `as_of_datetime` >= \'2026-03-29 22:22:17\'')
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
DEBUG - 2026-03-30 22:22:17 --> MyMIInvestments::getSqueezeHighRiskCount failed: Unknown column 'score_total' in 'where clause'
DEBUG - 2026-03-30 22:22:17 --> 📰 Daily dashboard news window 2026-03-30 00:00:00 -> 2026-03-30 23:59:59 returned 0 rows
DEBUG - 2026-03-30 22:22:17 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-30 22:22:17 --> [SETUP] Status computed
DEBUG - 2026-03-30 22:22:17 --> [REQ_ID=0e24d89aa2d7] [VIEW_RENDER] User/Dashboard/index
INFO - 2026-03-30 22:22:17 --> [REQ_ID=0e24d89aa2d7] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-30 22:22:17 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-30 22:22:17 --> [MODEL_WHERE] App\Models\BudgetModel KEY="created_by"
DEBUG - 2026-03-30 22:22:17 --> [MODEL_WHERE] App\Models\BudgetModel KEY="account_type"
DEBUG - 2026-03-30 22:22:17 --> [MODEL_WHERE] App\Models\BudgetModel KEY="designated_date >="
DEBUG - 2026-03-30 22:22:17 --> [MODEL_WHERE] App\Models\BudgetModel KEY="designated_date <="
DEBUG - 2026-03-30 22:22:17 --> [MODEL_WHERE] App\Models\BudgetModel KEY="year"
DEBUG - 2026-03-30 22:22:17 --> [MODEL_WHERE] App\Models\BudgetModel KEY="month <="
DEBUG - 2026-03-30 22:22:17 --> [MODEL_WHERE] App\Models\BudgetModel KEY="day <="
DEBUG - 2026-03-30 22:22:17 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":11761,"account_type":"Income","month":"03","year":"2026"}
DEBUG - 2026-03-30 22:22:17 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-03-30 22:22:17 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":11761,"account_type":"Income","month":"03","year":"2026"}
DEBUG - 2026-03-30 22:22:17 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-03-30 22:22:17 --> [MODEL_WHERE] App\Models\BudgetModel KEY="created_by"
DEBUG - 2026-03-30 22:22:17 --> [MODEL_WHERE] App\Models\BudgetModel KEY="account_type"
DEBUG - 2026-03-30 22:22:17 --> [MODEL_WHERE] App\Models\BudgetModel KEY="designated_date >="
DEBUG - 2026-03-30 22:22:17 --> [MODEL_WHERE] App\Models\BudgetModel KEY="designated_date <="
DEBUG - 2026-03-30 22:22:17 --> [MODEL_WHERE] App\Models\BudgetModel KEY="year"
DEBUG - 2026-03-30 22:22:17 --> [MODEL_WHERE] App\Models\BudgetModel KEY="month <="
DEBUG - 2026-03-30 22:22:17 --> [MODEL_WHERE] App\Models\BudgetModel KEY="day <="
DEBUG - 2026-03-30 22:22:17 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":11761,"account_type":"Expense","month":"03","year":"2026"}
DEBUG - 2026-03-30 22:22:17 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-03-30 22:22:17 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":11761,"account_type":"Expense","month":"03","year":"2026"}
DEBUG - 2026-03-30 22:22:17 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-03-30 22:22:17 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"status":1,"created_by":11761,"deleted":0}
DEBUG - 2026-03-30 22:22:17 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"status":1,"paid":0,"created_by":11761,"deleted":0}
DEBUG - 2026-03-30 22:22:17 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-30 22:22:17 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"status":1,"created_by":11761,"deleted":0}
DEBUG - 2026-03-30 22:22:17 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"status":1,"paid":0,"created_by":11761,"deleted":0}
DEBUG - 2026-03-30 22:22:17 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":11761,"account_type":"Income","status":1,"month":"03","year":"2026"}
DEBUG - 2026-03-30 22:22:17 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-03-30 22:22:17 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":11761,"account_type":"Expense","status":1,"month":"03","year":"2026"}
DEBUG - 2026-03-30 22:22:17 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-03-30 22:22:17 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":11761,"account_type":"Investment","month":"03","year":"2026","status":1}
DEBUG - 2026-03-30 22:22:17 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-03-30 22:22:17 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":11761,"account_type":"Income","status":1,"month":"03"}
DEBUG - 2026-03-30 22:22:17 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-03-30 22:22:17 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":11761,"account_type":"Expense","status":1,"month":"03"}
DEBUG - 2026-03-30 22:22:17 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-03-30 22:22:17 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":11761,"account_type":"Investment","month":"03","year":"2026","status":1}
DEBUG - 2026-03-30 22:22:17 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-03-30 22:22:17 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":11761,"account_type":"Income","status":1,"month":"04"}
DEBUG - 2026-03-30 22:22:17 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-03-30 22:22:17 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":11761,"account_type":"Expense","status":1,"month":"04"}
DEBUG - 2026-03-30 22:22:17 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-03-30 22:22:17 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":11761,"account_type":"Investment","month":"04","year":"2026","status":1}
DEBUG - 2026-03-30 22:22:17 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-03-30 22:22:17 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":11761,"account_type":"Income","status":1,"year":"2026"}
DEBUG - 2026-03-30 22:22:17 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-03-30 22:22:17 --> [MODEL_WHERE] App\Models\BudgetModel KEY="created_by"
DEBUG - 2026-03-30 22:22:17 --> [MODEL_WHERE] App\Models\BudgetModel KEY="account_type"
DEBUG - 2026-03-30 22:22:17 --> [MODEL_WHERE] App\Models\BudgetModel KEY="status"
DEBUG - 2026-03-30 22:22:17 --> [MODEL_WHERE] App\Models\BudgetModel KEY="year"
DEBUG - 2026-03-30 22:22:17 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-03-30 22:22:17 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":11761,"account_type":"Investment","status":1}
DEBUG - 2026-03-30 22:22:17 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-03-30 22:22:17 --> [MODEL_WHERE] App\Models\BudgetModel KEY="created_by"
DEBUG - 2026-03-30 22:22:17 --> [MODEL_WHERE] App\Models\BudgetModel KEY="account_type"
DEBUG - 2026-03-30 22:22:17 --> [MODEL_WHERE] App\Models\BudgetModel KEY="status"
DEBUG - 2026-03-30 22:22:17 --> [MODEL_WHERE] App\Models\BudgetModel KEY="designated_date >="
DEBUG - 2026-03-30 22:22:17 --> [MODEL_WHERE] App\Models\BudgetModel KEY="designated_date <="
DEBUG - 2026-03-30 22:22:17 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-03-30 22:22:17 --> [MODEL_WHERE] App\Models\BudgetModel KEY="created_by"
DEBUG - 2026-03-30 22:22:17 --> [MODEL_WHERE] App\Models\BudgetModel KEY="account_type"
DEBUG - 2026-03-30 22:22:17 --> [MODEL_WHERE] App\Models\BudgetModel KEY="status"
DEBUG - 2026-03-30 22:22:17 --> [MODEL_WHERE] App\Models\BudgetModel KEY="designated_date >="
DEBUG - 2026-03-30 22:22:17 --> [MODEL_WHERE] App\Models\BudgetModel KEY="designated_date <="
DEBUG - 2026-03-30 22:22:17 --> [MODEL_FIRST] App\Models\BudgetModel
INFO - 2026-03-30 22:22:17 --> DashboardController L72 - $checkingSummary: 0
DEBUG - 2026-03-30 22:22:17 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-30 22:22:17 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-30 22:22:17 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-30 22:22:17 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-30 22:22:17 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-30 22:22:17 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-30 22:22:17 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-30 22:22:17 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-30 22:22:17 --> [SERVICE] App\Services\BudgetService ::getUserBudget
DEBUG - 2026-03-30 22:22:17 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":11761,"deleted":0}
DEBUG - 2026-03-30 22:22:17 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-30 22:22:17 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"status":1,"created_by":11761,"deleted":0}
DEBUG - 2026-03-30 22:22:17 --> [MODEL_WHERE] App\Models\BudgetModel KEY="created_by"
DEBUG - 2026-03-30 22:22:17 --> [MODEL_WHERE] App\Models\BudgetModel KEY="account_type"
DEBUG - 2026-03-30 22:22:17 --> [MODEL_WHERE] App\Models\BudgetModel KEY="designated_date >="
DEBUG - 2026-03-30 22:22:17 --> [MODEL_WHERE] App\Models\BudgetModel KEY="designated_date <="
DEBUG - 2026-03-30 22:22:17 --> [MODEL_WHERE] App\Models\BudgetModel KEY="year"
DEBUG - 2026-03-30 22:22:17 --> [MODEL_WHERE] App\Models\BudgetModel KEY="month <="
DEBUG - 2026-03-30 22:22:17 --> [MODEL_WHERE] App\Models\BudgetModel KEY="day <="
DEBUG - 2026-03-30 22:22:17 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":11761,"account_type":"Income","month":"03","year":"2026"}
DEBUG - 2026-03-30 22:22:17 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-03-30 22:22:17 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":11761,"account_type":"Income","month":"03","year":"2026"}
DEBUG - 2026-03-30 22:22:17 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-03-30 22:22:17 --> [MODEL_WHERE] App\Models\BudgetModel KEY="created_by"
DEBUG - 2026-03-30 22:22:17 --> [MODEL_WHERE] App\Models\BudgetModel KEY="account_type"
DEBUG - 2026-03-30 22:22:17 --> [MODEL_WHERE] App\Models\BudgetModel KEY="designated_date >="
DEBUG - 2026-03-30 22:22:17 --> [MODEL_WHERE] App\Models\BudgetModel KEY="designated_date <="
DEBUG - 2026-03-30 22:22:17 --> [MODEL_WHERE] App\Models\BudgetModel KEY="year"
DEBUG - 2026-03-30 22:22:17 --> [MODEL_WHERE] App\Models\BudgetModel KEY="month <="
DEBUG - 2026-03-30 22:22:17 --> [MODEL_WHERE] App\Models\BudgetModel KEY="day <="
DEBUG - 2026-03-30 22:22:17 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":11761,"account_type":"Expense","month":"03","year":"2026"}
DEBUG - 2026-03-30 22:22:17 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-03-30 22:22:17 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":11761,"account_type":"Expense","month":"03","year":"2026"}
DEBUG - 2026-03-30 22:22:17 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-03-30 22:22:17 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"status":1,"created_by":11761,"deleted":0}
DEBUG - 2026-03-30 22:22:17 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"status":1,"paid":0,"created_by":11761,"deleted":0}
INFO - 2026-03-30 22:22:17 --> getSolanaData: invalid address param
INFO - 2026-03-30 22:22:17 --> themesMemory usage: 6291456
DEBUG - 2026-03-30 22:22:17 --> [REQ_ID=0ab74ae52b06] [FILTER_AFTER]
DEBUG - 2026-03-30 22:22:17 --> [REQ_ID=0ab74ae52b06] [LIFECYCLE][END] status=200 duration_ms=405.94 memory_delta=0
INFO - 2026-03-30 22:22:17 --> [REQ_ID=0e24d89aa2d7] [PERF] Execution time=0.375256
DEBUG - 2026-03-30 22:22:17 --> [REQ_ID=0ab74ae52b06] [REQUEST][END]
INFO - 2026-03-30 22:22:17 --> [REQ_ID=0ab74ae52b06] [PERF] Execution time=0.422144
DEBUG - 2026-03-30 22:22:22 --> [REQ_ID=bf14755c5b72] [REQUEST][START] GET /index.php/Budget
DEBUG - 2026-03-30 22:22:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-30 22:22:22 --> [REQ_ID=bf14755c5b72] [FILTER_BEFORE] /index.php/Budget
DEBUG - 2026-03-30 22:22:22 --> [REQ_ID=bf14755c5b72] [ROUTE] Controller=\App\Modules\User\Controllers\BudgetController Method=index
DEBUG - 2026-03-30 22:22:22 --> [REQ_ID=bf14755c5b72] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Budget
DEBUG - 2026-03-30 22:22:22 --> [CSRF] token name=csrf_test_name hash=0f7ee53637f6dd0603269a4099d5a3fd
DEBUG - 2026-03-30 22:22:22 --> [BudgetController::METHOD_ENTRY] initController
DEBUG - 2026-03-30 22:22:22 --> [REQ_ID=b7a9dcd82015] [INIT] App\Modules\User\Controllers\BudgetController::GET
INFO - 2026-03-30 22:22:22 --> [REQ_ID=b7a9dcd82015] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-30 22:22:22 --> [TRACE]
DEBUG - 2026-03-30 22:22:22 --> [REQ_ID=b7a9dcd82015] [METHOD_ENTRY] index
DEBUG - 2026-03-30 22:22:22 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-30 22:22:22 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-30 22:22:22 --> MyMICoin initialized ONCE
DEBUG - 2026-03-30 22:22:22 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-30 22:22:22 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-30 22:22:22 --> BudgetController L53 Initialized with cuID: 11761
DEBUG - 2026-03-30 22:22:22 --> BudgetController::constructor - sanitizedCacheKey exists? YES
DEBUG - 2026-03-30 22:22:22 --> [BudgetController::METHOD_ENTRY] index
DEBUG - 2026-03-30 22:22:22 --> Dashboard::index() reached in BudgetController. User ID: 11761
INFO - 2026-03-30 22:22:22 --> [REQ_ID=b7a9dcd82015] [MEMORY][commonData:start] 4194304
DEBUG - 2026-03-30 22:22:22 --> BudgetController::commonData snapshot: {"cuID":11761,"cuEmail":"tburks2392@gmail.com","totalAccountBalance":0,"nonce":{"script":"nonce=\"ea17face8a6a225c3d2b019e1e4c2f17\"","style":"nonce=\"ea17face8a6a225c3d2b019e1e4c2f17\""}}
ERROR - 2026-03-30 22:22:22 --> BudgetController::index failed to build executive summary: Call to undefined method CodeIgniter\Cache\Handlers\FileHandler::set()
DEBUG - 2026-03-30 22:22:23 --> [SETUP] Status computed
DEBUG - 2026-03-30 22:22:23 --> [REQ_ID=b7a9dcd82015] [VIEW_RENDER] App\Modules\User\Views\Budget\index
INFO - 2026-03-30 22:22:23 --> [REQ_ID=b7a9dcd82015] [MEMORY][commonData:start] 4194304
DEBUG - 2026-03-30 22:22:23 --> BudgetController::commonData snapshot: {"cuID":11761,"cuEmail":"tburks2392@gmail.com","totalAccountBalance":0,"nonce":{"script":"nonce=\"ea17face8a6a225c3d2b019e1e4c2f17\"","style":"nonce=\"ea17face8a6a225c3d2b019e1e4c2f17\""}}
INFO - 2026-03-30 22:22:23 --> themesMemory usage: 4194304
DEBUG - 2026-03-30 22:22:23 --> [REQ_ID=bf14755c5b72] [FILTER_AFTER]
DEBUG - 2026-03-30 22:22:23 --> [REQ_ID=bf14755c5b72] [LIFECYCLE][END] status=200 duration_ms=53.51 memory_delta=0
INFO - 2026-03-30 22:22:23 --> [REQ_ID=b7a9dcd82015] [PERF] Execution time=0.047901
DEBUG - 2026-03-30 22:22:23 --> [REQ_ID=bf14755c5b72] [REQUEST][END]
INFO - 2026-03-30 22:22:23 --> [REQ_ID=bf14755c5b72] [PERF] Execution time=0.074332
DEBUG - 2026-03-30 22:22:28 --> [REQ_ID=695f07c2738d] [REQUEST][START] GET /index.php/API/Budget/getUserAvailableBalances
DEBUG - 2026-03-30 22:22:28 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-30 22:22:28 --> [REQ_ID=8e360bba03f5] [REQUEST][START] GET /index.php/API/Budget/getUserRepaymentSummary
DEBUG - 2026-03-30 22:22:28 --> [REQ_ID=430f59725d79] [REQUEST][START] GET /index.php/API/Budget/getUserBudgetRecords
DEBUG - 2026-03-30 22:22:28 --> [REQ_ID=a6ab6506cda0] [REQUEST][START] GET /index.php/API/Budget/getUserCreditBalances
DEBUG - 2026-03-30 22:22:28 --> [REQ_ID=695f07c2738d] [FILTER_BEFORE] /index.php/API/Budget/getUserAvailableBalances
DEBUG - 2026-03-30 22:22:28 --> [REQ_ID=695f07c2738d] [ROUTE] Controller=\App\Modules\APIs\Controllers\BudgetAPIController Method=getUserAvailableBalances
DEBUG - 2026-03-30 22:22:28 --> [REQ_ID=695f07c2738d] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Budget/getUserAvailableBalances
DEBUG - 2026-03-30 22:22:28 --> [REQ_ID=133619bc9e3f] [INIT] App\Modules\APIs\Controllers\BudgetAPIController::GET
INFO - 2026-03-30 22:22:28 --> [REQ_ID=133619bc9e3f] [MEMORY][controller-start] 6291456
DEBUG - 2026-03-30 22:22:28 --> [TRACE]
INFO - 2026-03-30 22:22:28 --> [REQ_ID=133619bc9e3f] [PERF] Execution time=0.013007
ERROR - 2026-03-30 22:22:28 --> [404_ROUTE]
DEBUG - 2026-03-30 22:22:28 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-30 22:22:28 --> [REQ_ID=8e360bba03f5] [FILTER_BEFORE] /index.php/API/Budget/getUserRepaymentSummary
DEBUG - 2026-03-30 22:22:28 --> [REQ_ID=8e360bba03f5] [ROUTE] Controller=\App\Modules\APIs\Controllers\BudgetAPIController Method=getUserRepaymentSummary
DEBUG - 2026-03-30 22:22:28 --> [REQ_ID=8e360bba03f5] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Budget/getUserRepaymentSummary
DEBUG - 2026-03-30 22:22:28 --> [REQ_ID=350119a8818c] [INIT] App\Modules\APIs\Controllers\BudgetAPIController::GET
INFO - 2026-03-30 22:22:28 --> [REQ_ID=350119a8818c] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-30 22:22:28 --> [TRACE]
INFO - 2026-03-30 22:22:28 --> [REQ_ID=350119a8818c] [PERF] Execution time=0.014171
ERROR - 2026-03-30 22:22:28 --> [404_ROUTE]
DEBUG - 2026-03-30 22:22:28 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-30 22:22:28 --> [REQ_ID=430f59725d79] [FILTER_BEFORE] /index.php/API/Budget/getUserBudgetRecords
DEBUG - 2026-03-30 22:22:28 --> [REQ_ID=430f59725d79] [ROUTE] Controller=\App\Modules\APIs\Controllers\BudgetAPIController Method=getUserBudgetRecords
DEBUG - 2026-03-30 22:22:28 --> [REQ_ID=430f59725d79] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Budget/getUserBudgetRecords
DEBUG - 2026-03-30 22:22:28 --> [REQ_ID=e71c10b31a12] [INIT] App\Modules\APIs\Controllers\BudgetAPIController::GET
INFO - 2026-03-30 22:22:28 --> [REQ_ID=e71c10b31a12] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-30 22:22:28 --> [TRACE]
INFO - 2026-03-30 22:22:28 --> [REQ_ID=e71c10b31a12] [PERF] Execution time=0.015068
ERROR - 2026-03-30 22:22:28 --> [404_ROUTE]
DEBUG - 2026-03-30 22:22:28 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-30 22:22:28 --> [REQ_ID=a6ab6506cda0] [FILTER_BEFORE] /index.php/API/Budget/getUserCreditBalances
DEBUG - 2026-03-30 22:22:28 --> [REQ_ID=a6ab6506cda0] [ROUTE] Controller=\App\Modules\APIs\Controllers\BudgetAPIController Method=getUserCreditBalances
DEBUG - 2026-03-30 22:22:28 --> [REQ_ID=a6ab6506cda0] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Budget/getUserCreditBalances
DEBUG - 2026-03-30 22:22:28 --> [REQ_ID=8ab794ca064b] [INIT] App\Modules\APIs\Controllers\BudgetAPIController::GET
INFO - 2026-03-30 22:22:28 --> [REQ_ID=8ab794ca064b] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-30 22:22:28 --> [TRACE]
INFO - 2026-03-30 22:22:28 --> [REQ_ID=8ab794ca064b] [PERF] Execution time=0.014310
ERROR - 2026-03-30 22:22:28 --> [404_ROUTE]
DEBUG - 2026-03-30 22:22:43 --> [REQ_ID=471263fa1147] [REQUEST][START] GET /index.php/Budget/Add/Expense
DEBUG - 2026-03-30 22:22:43 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-30 22:22:43 --> [REQ_ID=471263fa1147] [FILTER_BEFORE] /index.php/Budget/Add/Expense
DEBUG - 2026-03-30 22:22:43 --> [REQ_ID=471263fa1147] [ROUTE] Controller=\App\Modules\User\Controllers\BudgetController Method=add
DEBUG - 2026-03-30 22:22:43 --> [REQ_ID=471263fa1147] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Budget/Add/Expense
DEBUG - 2026-03-30 22:22:43 --> [CSRF] token name=csrf_test_name hash=0f7ee53637f6dd0603269a4099d5a3fd
DEBUG - 2026-03-30 22:22:43 --> [BudgetController::METHOD_ENTRY] initController
DEBUG - 2026-03-30 22:22:43 --> [REQ_ID=8b9043ff432d] [INIT] App\Modules\User\Controllers\BudgetController::GET
INFO - 2026-03-30 22:22:43 --> [REQ_ID=8b9043ff432d] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-30 22:22:43 --> [TRACE]
DEBUG - 2026-03-30 22:22:43 --> [REQ_ID=8b9043ff432d] [METHOD_ENTRY] add
DEBUG - 2026-03-30 22:22:43 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-30 22:22:43 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-30 22:22:43 --> MyMICoin initialized ONCE
DEBUG - 2026-03-30 22:22:43 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-30 22:22:43 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-30 22:22:43 --> BudgetController L53 Initialized with cuID: 11761
DEBUG - 2026-03-30 22:22:43 --> BudgetController::constructor - sanitizedCacheKey exists? YES
DEBUG - 2026-03-30 22:22:43 --> [BudgetController::METHOD_ENTRY] add
INFO - 2026-03-30 22:22:43 --> [REQ_ID=8b9043ff432d] [MEMORY][commonData:start] 4194304
DEBUG - 2026-03-30 22:22:43 --> BudgetController::commonData snapshot: {"cuID":11761,"cuEmail":"tburks2392@gmail.com","totalAccountBalance":0,"nonce":{"script":"nonce=\"f1994dc05fc8053e4f4158d769c0df08\"","style":"nonce=\"f1994dc05fc8053e4f4158d769c0df08\""}}
DEBUG - 2026-03-30 22:22:43 --> [REQ_ID=8b9043ff432d] [VIEW_RENDER] App\Modules\User\Views\Budget\Add
INFO - 2026-03-30 22:22:43 --> [REQ_ID=8b9043ff432d] [MEMORY][commonData:start] 4194304
DEBUG - 2026-03-30 22:22:43 --> BudgetController::commonData snapshot: {"cuID":11761,"cuEmail":"tburks2392@gmail.com","totalAccountBalance":0,"nonce":{"script":"nonce=\"f1994dc05fc8053e4f4158d769c0df08\"","style":"nonce=\"f1994dc05fc8053e4f4158d769c0df08\""}}
DEBUG - 2026-03-30 22:22:43 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-30 22:22:43 --> [SERVICE] App\Services\BudgetService ::setUserId
INFO - 2026-03-30 22:22:43 --> $uri: https://www.mymiwallet.com/index.php/Budget/Add/Expense
INFO - 2026-03-30 22:22:43 --> $formMode: Add
INFO - 2026-03-30 22:22:43 --> themesMemory usage: 4194304
DEBUG - 2026-03-30 22:22:43 --> [REQ_ID=471263fa1147] [FILTER_AFTER]
DEBUG - 2026-03-30 22:22:43 --> [REQ_ID=471263fa1147] [LIFECYCLE][END] status=200 duration_ms=115.28 memory_delta=0
INFO - 2026-03-30 22:22:43 --> [REQ_ID=8b9043ff432d] [PERF] Execution time=0.035099
DEBUG - 2026-03-30 22:22:43 --> [REQ_ID=471263fa1147] [REQUEST][END]
INFO - 2026-03-30 22:22:43 --> [REQ_ID=471263fa1147] [PERF] Execution time=0.130963
DEBUG - 2026-03-30 22:22:43 --> [REQ_ID=0807c5e7c244] [REQUEST][START] GET /index.php?debugbar
DEBUG - 2026-03-30 22:22:43 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-30 22:22:43 --> [REQ_ID=0807c5e7c244] [FILTER_BEFORE] /index.php?debugbar
DEBUG - 2026-03-30 22:22:43 --> [REQ_ID=0807c5e7c244] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-30 22:22:43 --> [REQ_ID=0807c5e7c244] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php?debugbar=
DEBUG - 2026-03-30 22:22:43 --> [CSRF] token name=csrf_test_name hash=0f7ee53637f6dd0603269a4099d5a3fd
DEBUG - 2026-03-30 22:22:43 --> [REQ_ID=7ef272aed5cd] [INIT] App\Controllers\Home::GET
INFO - 2026-03-30 22:22:43 --> [REQ_ID=7ef272aed5cd] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-30 22:22:43 --> [TRACE]
INFO - 2026-03-30 22:22:43 --> [REQ_ID=7ef272aed5cd] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-30 22:22:43 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-30 22:22:43 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-03-30 22:22:43 --> [REQ_ID=7ef272aed5cd] [VIEW_RENDER] themes/public/home
INFO - 2026-03-30 22:22:43 --> [REQ_ID=7ef272aed5cd] [MEMORY][commonData:start] 8388608
INFO - 2026-03-30 22:22:43 --> themesMemory usage: 8388608
DEBUG - 2026-03-30 22:22:43 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-30 22:22:43 --> [REQ_ID=0807c5e7c244] [FILTER_AFTER]
DEBUG - 2026-03-30 22:22:43 --> [REQ_ID=0807c5e7c244] [LIFECYCLE][END] status=200 duration_ms=542.59 memory_delta=4194304
INFO - 2026-03-30 22:22:43 --> [REQ_ID=7ef272aed5cd] [PERF] Execution time=0.542854
DEBUG - 2026-03-30 22:22:43 --> [REQ_ID=0807c5e7c244] [REQUEST][END]
INFO - 2026-03-30 22:22:43 --> [REQ_ID=0807c5e7c244] [PERF] Execution time=0.552863
DEBUG - 2026-03-30 22:22:48 --> [REQ_ID=d35a3d754f6f] [REQUEST][START] GET /index.php?debugbar
DEBUG - 2026-03-30 22:22:48 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-30 22:22:48 --> [REQ_ID=d35a3d754f6f] [FILTER_BEFORE] /index.php?debugbar
DEBUG - 2026-03-30 22:22:48 --> [REQ_ID=d35a3d754f6f] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-30 22:22:48 --> [REQ_ID=d35a3d754f6f] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php?debugbar=
DEBUG - 2026-03-30 22:22:48 --> [CSRF] token name=csrf_test_name hash=0f7ee53637f6dd0603269a4099d5a3fd
DEBUG - 2026-03-30 22:22:48 --> [REQ_ID=4a46e996737f] [INIT] App\Controllers\Home::GET
INFO - 2026-03-30 22:22:48 --> [REQ_ID=4a46e996737f] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-30 22:22:48 --> [TRACE]
INFO - 2026-03-30 22:22:48 --> [REQ_ID=4a46e996737f] [MEMORY][commonData:start] 4194304
DEBUG - 2026-03-30 22:22:48 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-30 22:22:48 --> [REQ_ID=45282d4c8c8b] [REQUEST][START] GET /index.php?debugbar
DEBUG - 2026-03-30 22:22:48 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
DEBUG - 2026-03-30 22:22:48 --> [REQ_ID=4a46e996737f] [VIEW_RENDER] themes/public/home
INFO - 2026-03-30 22:22:48 --> [REQ_ID=4a46e996737f] [MEMORY][commonData:start] 8388608
INFO - 2026-03-30 22:22:48 --> themesMemory usage: 8388608
DEBUG - 2026-03-30 22:22:48 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-30 22:22:48 --> [REQ_ID=d35a3d754f6f] [FILTER_AFTER]
DEBUG - 2026-03-30 22:22:48 --> [REQ_ID=d35a3d754f6f] [LIFECYCLE][END] status=200 duration_ms=515.94 memory_delta=4194304
INFO - 2026-03-30 22:22:48 --> [REQ_ID=4a46e996737f] [PERF] Execution time=0.516118
DEBUG - 2026-03-30 22:22:48 --> [REQ_ID=d35a3d754f6f] [REQUEST][END]
INFO - 2026-03-30 22:22:48 --> [REQ_ID=d35a3d754f6f] [PERF] Execution time=0.529363
DEBUG - 2026-03-30 22:22:48 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-30 22:22:48 --> [REQ_ID=45282d4c8c8b] [FILTER_BEFORE] /index.php?debugbar
DEBUG - 2026-03-30 22:22:48 --> [REQ_ID=45282d4c8c8b] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-30 22:22:48 --> [REQ_ID=45282d4c8c8b] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php?debugbar=
DEBUG - 2026-03-30 22:22:48 --> [CSRF] token name=csrf_test_name hash=0f7ee53637f6dd0603269a4099d5a3fd
DEBUG - 2026-03-30 22:22:48 --> [REQ_ID=c28f0c83742f] [INIT] App\Controllers\Home::GET
INFO - 2026-03-30 22:22:48 --> [REQ_ID=c28f0c83742f] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-30 22:22:48 --> [TRACE]
INFO - 2026-03-30 22:22:48 --> [REQ_ID=c28f0c83742f] [MEMORY][commonData:start] 4194304
DEBUG - 2026-03-30 22:22:48 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-30 22:22:48 --> [REQ_ID=7e2486e8f711] [REQUEST][START] GET /index.php?debugbar
DEBUG - 2026-03-30 22:22:49 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
DEBUG - 2026-03-30 22:22:49 --> [REQ_ID=c28f0c83742f] [VIEW_RENDER] themes/public/home
INFO - 2026-03-30 22:22:49 --> [REQ_ID=c28f0c83742f] [MEMORY][commonData:start] 8388608
INFO - 2026-03-30 22:22:49 --> themesMemory usage: 8388608
DEBUG - 2026-03-30 22:22:49 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-30 22:22:49 --> [REQ_ID=45282d4c8c8b] [FILTER_AFTER]
DEBUG - 2026-03-30 22:22:49 --> [REQ_ID=45282d4c8c8b] [LIFECYCLE][END] status=200 duration_ms=604.78 memory_delta=4194304
INFO - 2026-03-30 22:22:49 --> [REQ_ID=c28f0c83742f] [PERF] Execution time=0.604965
DEBUG - 2026-03-30 22:22:49 --> [REQ_ID=45282d4c8c8b] [REQUEST][END]
INFO - 2026-03-30 22:22:49 --> [REQ_ID=45282d4c8c8b] [PERF] Execution time=0.752454
DEBUG - 2026-03-30 22:22:49 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-30 22:22:49 --> [REQ_ID=7e2486e8f711] [FILTER_BEFORE] /index.php?debugbar
DEBUG - 2026-03-30 22:22:49 --> [REQ_ID=7e2486e8f711] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-30 22:22:49 --> [REQ_ID=7e2486e8f711] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php?debugbar=
DEBUG - 2026-03-30 22:22:49 --> [CSRF] token name=csrf_test_name hash=0f7ee53637f6dd0603269a4099d5a3fd
DEBUG - 2026-03-30 22:22:49 --> [REQ_ID=260fa7507f00] [INIT] App\Controllers\Home::GET
INFO - 2026-03-30 22:22:49 --> [REQ_ID=260fa7507f00] [MEMORY][controller-start] 6291456
DEBUG - 2026-03-30 22:22:49 --> [TRACE]
INFO - 2026-03-30 22:22:49 --> [REQ_ID=260fa7507f00] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-30 22:22:49 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-30 22:22:49 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
DEBUG - 2026-03-30 22:22:49 --> [REQ_ID=260fa7507f00] [VIEW_RENDER] themes/public/home
INFO - 2026-03-30 22:22:49 --> [REQ_ID=260fa7507f00] [MEMORY][commonData:start] 8388608
INFO - 2026-03-30 22:22:49 --> themesMemory usage: 8388608
DEBUG - 2026-03-30 22:22:49 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-30 22:22:49 --> [REQ_ID=7e2486e8f711] [FILTER_AFTER]
DEBUG - 2026-03-30 22:22:49 --> [REQ_ID=7e2486e8f711] [LIFECYCLE][END] status=200 duration_ms=554.79 memory_delta=2097152
INFO - 2026-03-30 22:22:49 --> [REQ_ID=260fa7507f00] [PERF] Execution time=0.554968
DEBUG - 2026-03-30 22:22:49 --> [REQ_ID=7e2486e8f711] [REQUEST][END]
INFO - 2026-03-30 22:22:49 --> [REQ_ID=7e2486e8f711] [PERF] Execution time=1.117860
DEBUG - 2026-03-30 22:23:48 --> [REQ_ID=61a9d0fe07a2] [REQUEST][START] GET /index.php/Terms-Of-Service
DEBUG - 2026-03-30 22:23:48 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-30 22:23:48 --> [REQ_ID=61a9d0fe07a2] [REQUEST][END]
INFO - 2026-03-30 22:23:48 --> [REQ_ID=61a9d0fe07a2] [PERF] Execution time=0.011821
ERROR - 2026-03-30 22:23:48 --> Table 'mymiwallet.bf_route_error_heatmap' doesn't exist
in SYSTEMPATH/Database/MySQLi/Connection.php on line 300.
 1 SYSTEMPATH/Database/MySQLi/Connection.php(300): mysqli->query('SELECT *
FROM `bf_route_error_heatmap`
WHERE `route` = \'/index.php/Terms-Of-Service\'
AND `error_type` = \'http_403\'
AND `status_code` = 403
 LIMIT 1', 0)
 2 SYSTEMPATH/Database/BaseConnection.php(769): CodeIgniter\Database\MySQLi\Connection->execute('SELECT *
FROM `bf_route_error_heatmap`
WHERE `route` = \'/index.php/Terms-Of-Service\'
AND `error_type` = \'http_403\'
AND `status_code` = 403
 LIMIT 1')
 3 SYSTEMPATH/Database/BaseConnection.php(686): CodeIgniter\Database\BaseConnection->simpleQuery('SELECT *
FROM `bf_route_error_heatmap`
WHERE `route` = \'/index.php/Terms-Of-Service\'
AND `error_type` = \'http_403\'
AND `status_code` = 403
 LIMIT 1')
 4 SYSTEMPATH/Database/BaseBuilder.php(1649): CodeIgniter\Database\BaseConnection->query('SELECT *
FROM `bf_route_error_heatmap`
WHERE `route` = :route:
AND `error_type` = :error_type:
AND `status_code` = :status_code:
 LIMIT 1', [...], false)
 5 SYSTEMPATH/Model.php(296): CodeIgniter\Database\BaseBuilder->get()
 6 SYSTEMPATH/BaseModel.php(713): CodeIgniter\Model->doFirst()
 7 APPPATH/Services/AIOps/RouteErrorHeatmapService.php(28): CodeIgniter\BaseModel->first()
 8 APPPATH/Config/Events.php(65): App\Services\AIOps\RouteErrorHeatmapService->record('/index.php/Terms-Of-Service', 'http_403', 403)
 9 SYSTEMPATH/Events/Events.php(152): CodeIgniter\Events\Events::Config\{closure}()
10 SYSTEMPATH/CodeIgniter.php(357): CodeIgniter\Events\Events::trigger('post_system')
11 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
12 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
13 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
DEBUG - 2026-03-30 22:23:48 --> Route heatmap post_system hook skipped: Table 'mymiwallet.bf_route_error_heatmap' doesn't exist
DEBUG - 2026-03-30 22:26:22 --> [REQ_ID=222d1c3c5b85] [REQUEST][START] HEAD /
DEBUG - 2026-03-30 22:26:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
ERROR - 2026-03-30 22:26:22 --> [404_ROUTE]
DEBUG - 2026-03-30 22:27:44 --> [REQ_ID=8bbea83c3845] [REQUEST][START] GET /index.php/How-It-Works/Investor-Profile
DEBUG - 2026-03-30 22:27:44 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-30 22:27:44 --> [REQ_ID=8bbea83c3845] [FILTER_BEFORE] /index.php/How-It-Works/Investor-Profile
DEBUG - 2026-03-30 22:27:44 --> [REQ_ID=8bbea83c3845] [ROUTE] Controller=\App\Modules\Blog\Controllers\HowItWorksController Method=show
DEBUG - 2026-03-30 22:27:44 --> [REQ_ID=8bbea83c3845] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/How-It-Works/Investor-Profile
DEBUG - 2026-03-30 22:27:44 --> [CSRF] token name=csrf_test_name hash=78bf507ac818ae2a25be4c8ae4f378a7
DEBUG - 2026-03-30 22:27:44 --> [REQ_ID=df464c60190e] [INIT] App\Modules\Blog\Controllers\HowItWorksController::GET
INFO - 2026-03-30 22:27:44 --> [REQ_ID=df464c60190e] [MEMORY][controller-start] 6291456
DEBUG - 2026-03-30 22:27:44 --> [TRACE]
DEBUG - 2026-03-30 22:27:44 --> [REQ_ID=df464c60190e] [METHOD_ENTRY] show
DEBUG - 2026-03-30 22:27:44 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-30 22:27:44 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-30 22:27:44 --> MyMICoin initialized ONCE
DEBUG - 2026-03-30 22:27:44 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-30 22:27:44 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-30 22:27:44 --> MyMIWallets skipped (no user context)
ERROR - 2026-03-30 22:27:44 --> HowItWorksController failure: Cannot access protected property CodeIgniter\HTTP\IncomingRequest::$uri
INFO - 2026-03-30 22:27:44 --> [REQ_ID=df464c60190e] [PERF] Execution time=0.085350
DEBUG - 2026-03-30 22:28:14 --> [REQ_ID=d9366a44911e] [REQUEST][START] GET /index.php?debugbar
DEBUG - 2026-03-30 22:28:14 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-30 22:28:14 --> [REQ_ID=d9366a44911e] [FILTER_BEFORE] /index.php?debugbar
DEBUG - 2026-03-30 22:28:14 --> [REQ_ID=d9366a44911e] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-30 22:28:14 --> [REQ_ID=d9366a44911e] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php?debugbar=
DEBUG - 2026-03-30 22:28:14 --> [CSRF] token name=csrf_test_name hash=0f7ee53637f6dd0603269a4099d5a3fd
DEBUG - 2026-03-30 22:28:14 --> [REQ_ID=847ff7889027] [INIT] App\Controllers\Home::GET
INFO - 2026-03-30 22:28:14 --> [REQ_ID=847ff7889027] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-30 22:28:14 --> [TRACE]
INFO - 2026-03-30 22:28:14 --> [REQ_ID=847ff7889027] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-30 22:28:14 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-30 22:28:15 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
DEBUG - 2026-03-30 22:28:15 --> [REQ_ID=847ff7889027] [VIEW_RENDER] themes/public/home
INFO - 2026-03-30 22:28:15 --> [REQ_ID=847ff7889027] [MEMORY][commonData:start] 8388608
INFO - 2026-03-30 22:28:15 --> themesMemory usage: 8388608
DEBUG - 2026-03-30 22:28:15 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-30 22:28:15 --> [REQ_ID=d9366a44911e] [FILTER_AFTER]
DEBUG - 2026-03-30 22:28:15 --> [REQ_ID=d9366a44911e] [LIFECYCLE][END] status=200 duration_ms=747.68 memory_delta=4194304
INFO - 2026-03-30 22:28:15 --> [REQ_ID=847ff7889027] [PERF] Execution time=0.751431
DEBUG - 2026-03-30 22:28:15 --> [REQ_ID=d9366a44911e] [REQUEST][END]
INFO - 2026-03-30 22:28:15 --> [REQ_ID=d9366a44911e] [PERF] Execution time=0.763733
DEBUG - 2026-03-30 22:31:22 --> [REQ_ID=b4f5aeb64899] [REQUEST][START] HEAD /
DEBUG - 2026-03-30 22:31:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
ERROR - 2026-03-30 22:31:22 --> [404_ROUTE]
DEBUG - 2026-03-30 22:33:18 --> [REQ_ID=4eb85c2f74dd] [REQUEST][START] GET /index.php
DEBUG - 2026-03-30 22:33:18 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-30 22:33:18 --> [REQ_ID=4eb85c2f74dd] [REQUEST][END]
INFO - 2026-03-30 22:33:18 --> [REQ_ID=4eb85c2f74dd] [PERF] Execution time=0.035094
ERROR - 2026-03-30 22:33:18 --> Table 'mymiwallet.bf_route_error_heatmap' doesn't exist
in SYSTEMPATH/Database/MySQLi/Connection.php on line 300.
 1 SYSTEMPATH/Database/MySQLi/Connection.php(300): mysqli->query('SELECT *
FROM `bf_route_error_heatmap`
WHERE `route` = \'/index.php/\'
AND `error_type` = \'http_403\'
AND `status_code` = 403
 LIMIT 1', 0)
 2 SYSTEMPATH/Database/BaseConnection.php(769): CodeIgniter\Database\MySQLi\Connection->execute('SELECT *
FROM `bf_route_error_heatmap`
WHERE `route` = \'/index.php/\'
AND `error_type` = \'http_403\'
AND `status_code` = 403
 LIMIT 1')
 3 SYSTEMPATH/Database/BaseConnection.php(686): CodeIgniter\Database\BaseConnection->simpleQuery('SELECT *
FROM `bf_route_error_heatmap`
WHERE `route` = \'/index.php/\'
AND `error_type` = \'http_403\'
AND `status_code` = 403
 LIMIT 1')
 4 SYSTEMPATH/Database/BaseBuilder.php(1649): CodeIgniter\Database\BaseConnection->query('SELECT *
FROM `bf_route_error_heatmap`
WHERE `route` = :route:
AND `error_type` = :error_type:
AND `status_code` = :status_code:
 LIMIT 1', [...], false)
 5 SYSTEMPATH/Model.php(296): CodeIgniter\Database\BaseBuilder->get()
 6 SYSTEMPATH/BaseModel.php(713): CodeIgniter\Model->doFirst()
 7 APPPATH/Services/AIOps/RouteErrorHeatmapService.php(28): CodeIgniter\BaseModel->first()
 8 APPPATH/Config/Events.php(65): App\Services\AIOps\RouteErrorHeatmapService->record('/index.php/', 'http_403', 403)
 9 SYSTEMPATH/Events/Events.php(152): CodeIgniter\Events\Events::Config\{closure}()
10 SYSTEMPATH/CodeIgniter.php(357): CodeIgniter\Events\Events::trigger('post_system')
11 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
12 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
13 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
DEBUG - 2026-03-30 22:33:18 --> Route heatmap post_system hook skipped: Table 'mymiwallet.bf_route_error_heatmap' doesn't exist
DEBUG - 2026-03-30 22:33:18 --> [REQ_ID=c65f501de39b] [REQUEST][START] GET /index.php
DEBUG - 2026-03-30 22:33:18 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-30 22:33:18 --> [REQ_ID=c65f501de39b] [REQUEST][END]
INFO - 2026-03-30 22:33:18 --> [REQ_ID=c65f501de39b] [PERF] Execution time=0.008159
ERROR - 2026-03-30 22:33:18 --> Table 'mymiwallet.bf_route_error_heatmap' doesn't exist
in SYSTEMPATH/Database/MySQLi/Connection.php on line 300.
 1 SYSTEMPATH/Database/MySQLi/Connection.php(300): mysqli->query('SELECT *
FROM `bf_route_error_heatmap`
WHERE `route` = \'/index.php/\'
AND `error_type` = \'http_403\'
AND `status_code` = 403
 LIMIT 1', 0)
 2 SYSTEMPATH/Database/BaseConnection.php(769): CodeIgniter\Database\MySQLi\Connection->execute('SELECT *
FROM `bf_route_error_heatmap`
WHERE `route` = \'/index.php/\'
AND `error_type` = \'http_403\'
AND `status_code` = 403
 LIMIT 1')
 3 SYSTEMPATH/Database/BaseConnection.php(686): CodeIgniter\Database\BaseConnection->simpleQuery('SELECT *
FROM `bf_route_error_heatmap`
WHERE `route` = \'/index.php/\'
AND `error_type` = \'http_403\'
AND `status_code` = 403
 LIMIT 1')
 4 SYSTEMPATH/Database/BaseBuilder.php(1649): CodeIgniter\Database\BaseConnection->query('SELECT *
FROM `bf_route_error_heatmap`
WHERE `route` = :route:
AND `error_type` = :error_type:
AND `status_code` = :status_code:
 LIMIT 1', [...], false)
 5 SYSTEMPATH/Model.php(296): CodeIgniter\Database\BaseBuilder->get()
 6 SYSTEMPATH/BaseModel.php(713): CodeIgniter\Model->doFirst()
 7 APPPATH/Services/AIOps/RouteErrorHeatmapService.php(28): CodeIgniter\BaseModel->first()
 8 APPPATH/Config/Events.php(65): App\Services\AIOps\RouteErrorHeatmapService->record('/index.php/', 'http_403', 403)
 9 SYSTEMPATH/Events/Events.php(152): CodeIgniter\Events\Events::Config\{closure}()
10 SYSTEMPATH/CodeIgniter.php(357): CodeIgniter\Events\Events::trigger('post_system')
11 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
12 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
13 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
DEBUG - 2026-03-30 22:33:18 --> Route heatmap post_system hook skipped: Table 'mymiwallet.bf_route_error_heatmap' doesn't exist
DEBUG - 2026-03-30 22:36:22 --> [REQ_ID=47292a3d5ea5] [REQUEST][START] HEAD /
DEBUG - 2026-03-30 22:36:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
ERROR - 2026-03-30 22:36:22 --> [404_ROUTE]
DEBUG - 2026-03-30 22:39:34 --> [REQ_ID=bd45bf3415ea] [REQUEST][START] GET /
DEBUG - 2026-03-30 22:39:34 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-30 22:39:34 --> [REQ_ID=bd45bf3415ea] [FILTER_BEFORE] /
DEBUG - 2026-03-30 22:39:34 --> [REQ_ID=bd45bf3415ea] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-30 22:39:34 --> [REQ_ID=bd45bf3415ea] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-30 22:39:34 --> [CSRF] token name=csrf_test_name hash=1927b47f2a268ff8083e373065df311f
DEBUG - 2026-03-30 22:39:34 --> [REQ_ID=8daa547e308a] [INIT] App\Controllers\Home::GET
INFO - 2026-03-30 22:39:34 --> [REQ_ID=8daa547e308a] [MEMORY][controller-start] 6291456
DEBUG - 2026-03-30 22:39:34 --> [TRACE]
INFO - 2026-03-30 22:39:34 --> [REQ_ID=8daa547e308a] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-30 22:39:34 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-30 22:39:34 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-03-30 22:39:34 --> [REQ_ID=8daa547e308a] [VIEW_RENDER] themes/public/home
INFO - 2026-03-30 22:39:34 --> [REQ_ID=8daa547e308a] [MEMORY][commonData:start] 10485760
INFO - 2026-03-30 22:39:34 --> themesMemory usage: 10485760
DEBUG - 2026-03-30 22:39:34 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-30 22:39:34 --> [REQ_ID=bd45bf3415ea] [FILTER_AFTER]
DEBUG - 2026-03-30 22:39:34 --> [REQ_ID=bd45bf3415ea] [LIFECYCLE][END] status=200 duration_ms=692.87 memory_delta=4194304
INFO - 2026-03-30 22:39:34 --> [REQ_ID=8daa547e308a] [PERF] Execution time=0.695166
DEBUG - 2026-03-30 22:39:34 --> [REQ_ID=bd45bf3415ea] [REQUEST][END]
INFO - 2026-03-30 22:39:34 --> [REQ_ID=bd45bf3415ea] [PERF] Execution time=0.731904
DEBUG - 2026-03-30 22:41:22 --> [REQ_ID=f55d0cde0d4f] [REQUEST][START] HEAD /
DEBUG - 2026-03-30 22:41:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
ERROR - 2026-03-30 22:41:22 --> [404_ROUTE]
DEBUG - 2026-03-30 22:46:22 --> [REQ_ID=54382aac6d72] [REQUEST][START] HEAD /
DEBUG - 2026-03-30 22:46:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
ERROR - 2026-03-30 22:46:22 --> [404_ROUTE]
DEBUG - 2026-03-30 22:51:22 --> [REQ_ID=2fb7a5cfc62b] [REQUEST][START] HEAD /
DEBUG - 2026-03-30 22:51:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
ERROR - 2026-03-30 22:51:22 --> [404_ROUTE]
DEBUG - 2026-03-30 22:56:22 --> [REQ_ID=cb851493d038] [REQUEST][START] HEAD /
DEBUG - 2026-03-30 22:56:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
ERROR - 2026-03-30 22:56:22 --> [404_ROUTE]
DEBUG - 2026-03-30 23:00:01 --> [REQ_ID=158aa4249663] [REQUEST][START] GET /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-30 23:00:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-30 23:00:01 --> [REQ_ID=158aa4249663] [FILTER_BEFORE] /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-30 23:00:01 --> [REQ_ID=158aa4249663] [ROUTE] Controller=\App\Modules\Management\Controllers\ManagementAPIController Method=Run_CRON_Tasks
DEBUG - 2026-03-30 23:00:01 --> [REQ_ID=158aa4249663] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-30 23:00:01 --> [REQ_ID=158aa4249663] [REQUEST][END]
INFO - 2026-03-30 23:00:01 --> [REQ_ID=158aa4249663] [PERF] Execution time=0.041314
ERROR - 2026-03-30 23:00:01 --> Table 'mymiwallet.bf_route_error_heatmap' doesn't exist
in SYSTEMPATH/Database/MySQLi/Connection.php on line 300.
 1 SYSTEMPATH/Database/MySQLi/Connection.php(300): mysqli->query('SELECT *
FROM `bf_route_error_heatmap`
WHERE `route` = \'/index.php/API/Management/Run-CRON-Tasks\'
AND `error_type` = \'http_403\'
AND `status_code` = 403
 LIMIT 1', 0)
 2 SYSTEMPATH/Database/BaseConnection.php(769): CodeIgniter\Database\MySQLi\Connection->execute('SELECT *
FROM `bf_route_error_heatmap`
WHERE `route` = \'/index.php/API/Management/Run-CRON-Tasks\'
AND `error_type` = \'http_403\'
AND `status_code` = 403
 LIMIT 1')
 3 SYSTEMPATH/Database/BaseConnection.php(686): CodeIgniter\Database\BaseConnection->simpleQuery('SELECT *
FROM `bf_route_error_heatmap`
WHERE `route` = \'/index.php/API/Management/Run-CRON-Tasks\'
AND `error_type` = \'http_403\'
AND `status_code` = 403
 LIMIT 1')
 4 SYSTEMPATH/Database/BaseBuilder.php(1649): CodeIgniter\Database\BaseConnection->query('SELECT *
FROM `bf_route_error_heatmap`
WHERE `route` = :route:
AND `error_type` = :error_type:
AND `status_code` = :status_code:
 LIMIT 1', [...], false)
 5 SYSTEMPATH/Model.php(296): CodeIgniter\Database\BaseBuilder->get()
 6 SYSTEMPATH/BaseModel.php(713): CodeIgniter\Model->doFirst()
 7 APPPATH/Services/AIOps/RouteErrorHeatmapService.php(28): CodeIgniter\BaseModel->first()
 8 APPPATH/Config/Events.php(65): App\Services\AIOps\RouteErrorHeatmapService->record('/index.php/API/Management/Run-CRON-Tasks', 'http_403', 403)
 9 SYSTEMPATH/Events/Events.php(152): CodeIgniter\Events\Events::Config\{closure}()
10 SYSTEMPATH/CodeIgniter.php(357): CodeIgniter\Events\Events::trigger('post_system')
11 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
12 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
13 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
DEBUG - 2026-03-30 23:00:01 --> Route heatmap post_system hook skipped: Table 'mymiwallet.bf_route_error_heatmap' doesn't exist
DEBUG - 2026-03-30 23:01:21 --> [REQ_ID=78c86aa33272] [REQUEST][START] GET /index.php/Features/Brokerage-Integration
DEBUG - 2026-03-30 23:01:21 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-30 23:01:21 --> [REQ_ID=78c86aa33272] [FILTER_BEFORE] /index.php/Features/Brokerage-Integration
DEBUG - 2026-03-30 23:01:21 --> [REQ_ID=78c86aa33272] [ROUTE] Controller=\App\Modules\Advertise\Controllers\FeaturesController Method=BrokerageIntegrations
DEBUG - 2026-03-30 23:01:21 --> [REQ_ID=78c86aa33272] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Features/Brokerage-Integration
DEBUG - 2026-03-30 23:01:21 --> [CSRF] token name=csrf_test_name hash=56eebe0319eb59fa63d2f517846c6052
DEBUG - 2026-03-30 23:01:21 --> [REQ_ID=78c86aa33272] [REQUEST][END]
INFO - 2026-03-30 23:01:21 --> [REQ_ID=78c86aa33272] [PERF] Execution time=0.049460
DEBUG - 2026-03-30 23:01:22 --> [REQ_ID=75c63ac048d3] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-30 23:01:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-30 23:01:22 --> [REQ_ID=75c63ac048d3] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-30 23:01:22 --> [REQ_ID=75c63ac048d3] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-30 23:01:22 --> [REQ_ID=75c63ac048d3] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-30 23:01:22 --> [CSRF] token name=csrf_test_name hash=57b4fb03ae39dae0515e7e3d52658aca
DEBUG - 2026-03-30 23:01:22 --> [REQ_ID=f10ab95c6ef4] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-30 23:01:22 --> [REQ_ID=f10ab95c6ef4] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-30 23:01:22 --> [TRACE]
DEBUG - 2026-03-30 23:01:22 --> [REQ_ID=75c63ac048d3] [FILTER_AFTER]
DEBUG - 2026-03-30 23:01:22 --> [REQ_ID=75c63ac048d3] [LIFECYCLE][END] status=200 duration_ms=219.56 memory_delta=0
INFO - 2026-03-30 23:01:22 --> [REQ_ID=f10ab95c6ef4] [PERF] Execution time=0.223107
DEBUG - 2026-03-30 23:01:22 --> [REQ_ID=75c63ac048d3] [REQUEST][END]
INFO - 2026-03-30 23:01:22 --> [REQ_ID=75c63ac048d3] [PERF] Execution time=0.237029
DEBUG - 2026-03-30 23:01:22 --> [REQ_ID=78f251a3fd84] [REQUEST][START] HEAD /
DEBUG - 2026-03-30 23:01:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
ERROR - 2026-03-30 23:01:22 --> [404_ROUTE]
DEBUG - 2026-03-30 23:03:22 --> [REQ_ID=0556fa907042] [REQUEST][START] GET /index.php/Assets
DEBUG - 2026-03-30 23:03:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-30 23:03:22 --> [REQ_ID=0556fa907042] [FILTER_BEFORE] /index.php/Assets
DEBUG - 2026-03-30 23:03:22 --> [REQ_ID=0556fa907042] [ROUTE] Controller=\App\Modules\Management\Controllers\AssetsController Method=index
DEBUG - 2026-03-30 23:03:22 --> [REQ_ID=0556fa907042] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Assets
DEBUG - 2026-03-30 23:03:22 --> [CSRF] token name=csrf_test_name hash=f4b20dfc5a3e6ff760a128d41ffbd154
DEBUG - 2026-03-30 23:03:22 --> [REQ_ID=0556fa907042] [REQUEST][END]
INFO - 2026-03-30 23:03:22 --> [REQ_ID=0556fa907042] [PERF] Execution time=0.046620
DEBUG - 2026-03-30 23:03:22 --> [REQ_ID=148cf1c06e88] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-30 23:03:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-30 23:03:22 --> [REQ_ID=148cf1c06e88] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-30 23:03:22 --> [REQ_ID=148cf1c06e88] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-30 23:03:22 --> [REQ_ID=148cf1c06e88] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-30 23:03:22 --> [CSRF] token name=csrf_test_name hash=12a4ecabaafb7928a39d719592e06042
DEBUG - 2026-03-30 23:03:22 --> [REQ_ID=64aef6d07fba] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-30 23:03:22 --> [REQ_ID=64aef6d07fba] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-30 23:03:22 --> [TRACE]
DEBUG - 2026-03-30 23:03:23 --> [REQ_ID=148cf1c06e88] [FILTER_AFTER]
DEBUG - 2026-03-30 23:03:23 --> [REQ_ID=148cf1c06e88] [LIFECYCLE][END] status=200 duration_ms=113.12 memory_delta=0
INFO - 2026-03-30 23:03:23 --> [REQ_ID=64aef6d07fba] [PERF] Execution time=0.116821
DEBUG - 2026-03-30 23:03:23 --> [REQ_ID=148cf1c06e88] [REQUEST][END]
INFO - 2026-03-30 23:03:23 --> [REQ_ID=148cf1c06e88] [PERF] Execution time=0.131899
DEBUG - 2026-03-30 23:04:35 --> [REQ_ID=7df478487b46] [REQUEST][START] GET /
DEBUG - 2026-03-30 23:04:35 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-30 23:04:35 --> [REQ_ID=7df478487b46] [FILTER_BEFORE] /
DEBUG - 2026-03-30 23:04:35 --> [REQ_ID=7df478487b46] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-30 23:04:35 --> [REQ_ID=7df478487b46] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-30 23:04:35 --> [CSRF] token name=csrf_test_name hash=c5bc09458a00faa9ce43e291c9ccd581
DEBUG - 2026-03-30 23:04:35 --> [REQ_ID=8eca8d766445] [INIT] App\Controllers\Home::GET
INFO - 2026-03-30 23:04:35 --> [REQ_ID=8eca8d766445] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-30 23:04:35 --> [TRACE]
INFO - 2026-03-30 23:04:36 --> [REQ_ID=8eca8d766445] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-30 23:04:36 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-30 23:04:36 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-03-30 23:04:36 --> [REQ_ID=8eca8d766445] [VIEW_RENDER] themes/public/home
INFO - 2026-03-30 23:04:36 --> [REQ_ID=8eca8d766445] [MEMORY][commonData:start] 8388608
INFO - 2026-03-30 23:04:36 --> themesMemory usage: 8388608
DEBUG - 2026-03-30 23:04:36 --> [MetaService] slug= pageName=Home cacheHit= path=DB
DEBUG - 2026-03-30 23:04:36 --> [REQ_ID=7df478487b46] [FILTER_AFTER]
DEBUG - 2026-03-30 23:04:36 --> [REQ_ID=7df478487b46] [LIFECYCLE][END] status=200 duration_ms=742.66 memory_delta=4194304
INFO - 2026-03-30 23:04:36 --> [REQ_ID=8eca8d766445] [PERF] Execution time=0.743012
DEBUG - 2026-03-30 23:04:36 --> [REQ_ID=7df478487b46] [REQUEST][END]
INFO - 2026-03-30 23:04:36 --> [REQ_ID=7df478487b46] [PERF] Execution time=0.753966
DEBUG - 2026-03-30 23:06:22 --> [REQ_ID=39002be3953b] [REQUEST][START] HEAD /
DEBUG - 2026-03-30 23:06:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
ERROR - 2026-03-30 23:06:22 --> [404_ROUTE]
DEBUG - 2026-03-30 23:09:41 --> [REQ_ID=2b4b63d368ff] [REQUEST][START] GET /index.php/How-It-Works/Purchase-MyMI-Gold
DEBUG - 2026-03-30 23:09:41 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-30 23:09:41 --> [REQ_ID=2b4b63d368ff] [FILTER_BEFORE] /index.php/How-It-Works/Purchase-MyMI-Gold
DEBUG - 2026-03-30 23:09:41 --> [REQ_ID=2b4b63d368ff] [ROUTE] Controller=\App\Modules\Blog\Controllers\HowItWorksController Method=PurchaseMyMIGold
DEBUG - 2026-03-30 23:09:41 --> [REQ_ID=2b4b63d368ff] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/How-It-Works/Purchase-MyMI-Gold
DEBUG - 2026-03-30 23:09:41 --> [CSRF] token name=csrf_test_name hash=ee0f1ba8733bdcf453850369854c3d33
DEBUG - 2026-03-30 23:09:41 --> [REQ_ID=fe4fa4aa70b2] [INIT] App\Modules\Blog\Controllers\HowItWorksController::GET
INFO - 2026-03-30 23:09:41 --> [REQ_ID=fe4fa4aa70b2] [MEMORY][controller-start] 6291456
DEBUG - 2026-03-30 23:09:41 --> [TRACE]
DEBUG - 2026-03-30 23:09:41 --> [REQ_ID=fe4fa4aa70b2] [METHOD_ENTRY] PurchaseMyMIGold
DEBUG - 2026-03-30 23:09:41 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-30 23:09:41 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-30 23:09:41 --> MyMICoin initialized ONCE
DEBUG - 2026-03-30 23:09:41 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-30 23:09:41 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-30 23:09:41 --> MyMIWallets skipped (no user context)
INFO - 2026-03-30 23:09:41 --> [REQ_ID=fe4fa4aa70b2] [MEMORY][commonData:start] 6291456
INFO - 2026-03-30 23:09:41 --> themesMemory usage: 10485760
DEBUG - 2026-03-30 23:09:41 --> [MetaService] slug=how-it-works/purchase-mymi-gold pageName= cacheHit= path=DB
DEBUG - 2026-03-30 23:09:41 --> [REQ_ID=2b4b63d368ff] [FILTER_AFTER]
DEBUG - 2026-03-30 23:09:41 --> [REQ_ID=2b4b63d368ff] [LIFECYCLE][END] status=200 duration_ms=711.01 memory_delta=4194304
INFO - 2026-03-30 23:09:41 --> [REQ_ID=fe4fa4aa70b2] [PERF] Execution time=0.713031
DEBUG - 2026-03-30 23:09:41 --> [REQ_ID=2b4b63d368ff] [REQUEST][END]
INFO - 2026-03-30 23:09:41 --> [REQ_ID=2b4b63d368ff] [PERF] Execution time=0.752639
DEBUG - 2026-03-30 23:11:22 --> [REQ_ID=42251b3a8d6e] [REQUEST][START] HEAD /
DEBUG - 2026-03-30 23:11:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
ERROR - 2026-03-30 23:11:22 --> [404_ROUTE]
DEBUG - 2026-03-30 23:15:01 --> [REQ_ID=c54e339a8df2] [REQUEST][START] GET /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-30 23:15:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-30 23:15:01 --> [REQ_ID=c54e339a8df2] [FILTER_BEFORE] /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-30 23:15:01 --> [REQ_ID=c54e339a8df2] [ROUTE] Controller=\App\Modules\APIs\Controllers\AlertsAPIController Method=fetchEmailAlerts
DEBUG - 2026-03-30 23:15:01 --> [REQ_ID=c54e339a8df2] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-30 23:15:01 --> [REQ_ID=c54e339a8df2] [REQUEST][END]
INFO - 2026-03-30 23:15:01 --> [REQ_ID=c54e339a8df2] [PERF] Execution time=0.044534
ERROR - 2026-03-30 23:15:01 --> Table 'mymiwallet.bf_route_error_heatmap' doesn't exist
in SYSTEMPATH/Database/MySQLi/Connection.php on line 300.
 1 SYSTEMPATH/Database/MySQLi/Connection.php(300): mysqli->query('SELECT *
FROM `bf_route_error_heatmap`
WHERE `route` = \'/index.php/API/Alerts/fetchEmailAlerts\'
AND `error_type` = \'http_403\'
AND `status_code` = 403
 LIMIT 1', 0)
 2 SYSTEMPATH/Database/BaseConnection.php(769): CodeIgniter\Database\MySQLi\Connection->execute('SELECT *
FROM `bf_route_error_heatmap`
WHERE `route` = \'/index.php/API/Alerts/fetchEmailAlerts\'
AND `error_type` = \'http_403\'
AND `status_code` = 403
 LIMIT 1')
 3 SYSTEMPATH/Database/BaseConnection.php(686): CodeIgniter\Database\BaseConnection->simpleQuery('SELECT *
FROM `bf_route_error_heatmap`
WHERE `route` = \'/index.php/API/Alerts/fetchEmailAlerts\'
AND `error_type` = \'http_403\'
AND `status_code` = 403
 LIMIT 1')
 4 SYSTEMPATH/Database/BaseBuilder.php(1649): CodeIgniter\Database\BaseConnection->query('SELECT *
FROM `bf_route_error_heatmap`
WHERE `route` = :route:
AND `error_type` = :error_type:
AND `status_code` = :status_code:
 LIMIT 1', [...], false)
 5 SYSTEMPATH/Model.php(296): CodeIgniter\Database\BaseBuilder->get()
 6 SYSTEMPATH/BaseModel.php(713): CodeIgniter\Model->doFirst()
 7 APPPATH/Services/AIOps/RouteErrorHeatmapService.php(28): CodeIgniter\BaseModel->first()
 8 APPPATH/Config/Events.php(65): App\Services\AIOps\RouteErrorHeatmapService->record('/index.php/API/Alerts/fetchEmailAlerts', 'http_403', 403)
 9 SYSTEMPATH/Events/Events.php(152): CodeIgniter\Events\Events::Config\{closure}()
10 SYSTEMPATH/CodeIgniter.php(357): CodeIgniter\Events\Events::trigger('post_system')
11 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
12 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
13 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
DEBUG - 2026-03-30 23:15:01 --> Route heatmap post_system hook skipped: Table 'mymiwallet.bf_route_error_heatmap' doesn't exist
DEBUG - 2026-03-30 23:16:22 --> [REQ_ID=9f2c41fa97bf] [REQUEST][START] HEAD /
DEBUG - 2026-03-30 23:16:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
ERROR - 2026-03-30 23:16:22 --> [404_ROUTE]
DEBUG - 2026-03-30 23:21:22 --> [REQ_ID=1e757cd57967] [REQUEST][START] HEAD /
DEBUG - 2026-03-30 23:21:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
ERROR - 2026-03-30 23:21:22 --> [404_ROUTE]
DEBUG - 2026-03-30 23:26:22 --> [REQ_ID=c28cf2b15b29] [REQUEST][START] HEAD /
DEBUG - 2026-03-30 23:26:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
ERROR - 2026-03-30 23:26:22 --> [404_ROUTE]
DEBUG - 2026-03-30 23:31:20 --> [REQ_ID=d5c6d7d630bc] [REQUEST][START] GET /index.php/Budget/Financial-Forecaster
DEBUG - 2026-03-30 23:31:20 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-30 23:31:20 --> [REQ_ID=d5c6d7d630bc] [FILTER_BEFORE] /index.php/Budget/Financial-Forecaster
DEBUG - 2026-03-30 23:31:20 --> [REQ_ID=d5c6d7d630bc] [ROUTE] Controller=\App\Modules\User\Controllers\BudgetController Method=financialForecaster
DEBUG - 2026-03-30 23:31:20 --> [REQ_ID=d5c6d7d630bc] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Budget/Financial-Forecaster
DEBUG - 2026-03-30 23:31:20 --> [CSRF] token name=csrf_test_name hash=607f1f611063116992220f6902c21db6
DEBUG - 2026-03-30 23:31:20 --> [REQ_ID=d5c6d7d630bc] [REQUEST][END]
INFO - 2026-03-30 23:31:20 --> [REQ_ID=d5c6d7d630bc] [PERF] Execution time=0.054676
DEBUG - 2026-03-30 23:31:20 --> [REQ_ID=a0cfe574c1d4] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-30 23:31:20 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-30 23:31:20 --> [REQ_ID=a0cfe574c1d4] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-30 23:31:20 --> [REQ_ID=a0cfe574c1d4] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-30 23:31:20 --> [REQ_ID=a0cfe574c1d4] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-30 23:31:20 --> [CSRF] token name=csrf_test_name hash=b2e97ea906ca29958f0c9207176b0253
DEBUG - 2026-03-30 23:31:20 --> [REQ_ID=7f1874649ea1] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-30 23:31:20 --> [REQ_ID=7f1874649ea1] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-30 23:31:20 --> [TRACE]
DEBUG - 2026-03-30 23:31:20 --> [REQ_ID=a0cfe574c1d4] [FILTER_AFTER]
DEBUG - 2026-03-30 23:31:20 --> [REQ_ID=a0cfe574c1d4] [LIFECYCLE][END] status=200 duration_ms=166.22 memory_delta=0
INFO - 2026-03-30 23:31:20 --> [REQ_ID=7f1874649ea1] [PERF] Execution time=0.170681
DEBUG - 2026-03-30 23:31:20 --> [REQ_ID=a0cfe574c1d4] [REQUEST][END]
INFO - 2026-03-30 23:31:20 --> [REQ_ID=a0cfe574c1d4] [PERF] Execution time=0.190150
DEBUG - 2026-03-30 23:31:22 --> [REQ_ID=b280a910d5cb] [REQUEST][START] HEAD /
DEBUG - 2026-03-30 23:31:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
ERROR - 2026-03-30 23:31:22 --> [404_ROUTE]
DEBUG - 2026-03-30 23:34:44 --> [REQ_ID=a04e86c2dff4] [REQUEST][START] GET /index.php/Management/Exchange
DEBUG - 2026-03-30 23:34:44 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-30 23:34:44 --> [REQ_ID=a04e86c2dff4] [FILTER_BEFORE] /index.php/Management/Exchange
DEBUG - 2026-03-30 23:34:44 --> [REQ_ID=a04e86c2dff4] [ROUTE] Controller=\App\Modules\Management\Controllers\ExchangeAdminController Method=index
DEBUG - 2026-03-30 23:34:44 --> [REQ_ID=a04e86c2dff4] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Management/Exchange
DEBUG - 2026-03-30 23:34:44 --> [CSRF] token name=csrf_test_name hash=0b77460d895fd020e0dd04cc247fbfab
DEBUG - 2026-03-30 23:34:44 --> [REQ_ID=a04e86c2dff4] [REQUEST][END]
INFO - 2026-03-30 23:34:44 --> [REQ_ID=a04e86c2dff4] [PERF] Execution time=0.048734
DEBUG - 2026-03-30 23:34:44 --> [REQ_ID=3f4ad7b16954] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-30 23:34:44 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-30 23:34:44 --> [REQ_ID=3f4ad7b16954] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-30 23:34:44 --> [REQ_ID=3f4ad7b16954] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-30 23:34:44 --> [REQ_ID=3f4ad7b16954] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-30 23:34:44 --> [CSRF] token name=csrf_test_name hash=df90828f8b3117b57edd8cc848aef19b
DEBUG - 2026-03-30 23:34:44 --> [REQ_ID=d22a2d3602be] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-30 23:34:44 --> [REQ_ID=d22a2d3602be] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-30 23:34:44 --> [TRACE]
DEBUG - 2026-03-30 23:34:44 --> [REQ_ID=3f4ad7b16954] [FILTER_AFTER]
DEBUG - 2026-03-30 23:34:44 --> [REQ_ID=3f4ad7b16954] [LIFECYCLE][END] status=200 duration_ms=184.80 memory_delta=0
INFO - 2026-03-30 23:34:44 --> [REQ_ID=d22a2d3602be] [PERF] Execution time=0.189007
DEBUG - 2026-03-30 23:34:44 --> [REQ_ID=3f4ad7b16954] [REQUEST][END]
INFO - 2026-03-30 23:34:44 --> [REQ_ID=3f4ad7b16954] [PERF] Execution time=0.201844
DEBUG - 2026-03-30 23:36:22 --> [REQ_ID=5b310df15ec1] [REQUEST][START] HEAD /
DEBUG - 2026-03-30 23:36:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
ERROR - 2026-03-30 23:36:22 --> [404_ROUTE]
DEBUG - 2026-03-30 23:36:22 --> [REQ_ID=5b310df15ec1] [REQUEST][END]
INFO - 2026-03-30 23:36:22 --> [REQ_ID=5b310df15ec1] [PERF] Execution time=0.079155
ERROR - 2026-03-30 23:36:22 --> Table 'mymiwallet.bf_route_error_heatmap' doesn't exist
in SYSTEMPATH/Database/MySQLi/Connection.php on line 300.
 1 SYSTEMPATH/Database/MySQLi/Connection.php(300): mysqli->query('SELECT *
FROM `bf_route_error_heatmap`
WHERE `route` = \'/index.php/\'
AND `error_type` = \'missing_route\'
AND `status_code` = 404
 LIMIT 1', 0)
 2 SYSTEMPATH/Database/BaseConnection.php(769): CodeIgniter\Database\MySQLi\Connection->execute('SELECT *
FROM `bf_route_error_heatmap`
WHERE `route` = \'/index.php/\'
AND `error_type` = \'missing_route\'
AND `status_code` = 404
 LIMIT 1')
 3 SYSTEMPATH/Database/BaseConnection.php(686): CodeIgniter\Database\BaseConnection->simpleQuery('SELECT *
FROM `bf_route_error_heatmap`
WHERE `route` = \'/index.php/\'
AND `error_type` = \'missing_route\'
AND `status_code` = 404
 LIMIT 1')
 4 SYSTEMPATH/Database/BaseBuilder.php(1649): CodeIgniter\Database\BaseConnection->query('SELECT *
FROM `bf_route_error_heatmap`
WHERE `route` = :route:
AND `error_type` = :error_type:
AND `status_code` = :status_code:
 LIMIT 1', [...], false)
 5 SYSTEMPATH/Model.php(296): CodeIgniter\Database\BaseBuilder->get()
 6 SYSTEMPATH/BaseModel.php(713): CodeIgniter\Model->doFirst()
 7 APPPATH/Services/AIOps/RouteErrorHeatmapService.php(28): CodeIgniter\BaseModel->first()
 8 APPPATH/Config/Events.php(66): App\Services\AIOps\RouteErrorHeatmapService->record('/index.php/', 'missing_route', 404)
 9 SYSTEMPATH/Events/Events.php(152): CodeIgniter\Events\Events::Config\{closure}()
10 SYSTEMPATH/CodeIgniter.php(357): CodeIgniter\Events\Events::trigger('post_system')
11 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
12 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
13 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
DEBUG - 2026-03-30 23:36:22 --> Route heatmap post_system hook skipped: Table 'mymiwallet.bf_route_error_heatmap' doesn't exist
DEBUG - 2026-03-30 23:41:23 --> [REQ_ID=7ba35c754c07] [REQUEST][START] HEAD /
DEBUG - 2026-03-30 23:41:23 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
ERROR - 2026-03-30 23:41:23 --> [404_ROUTE]
DEBUG - 2026-03-30 23:41:23 --> [REQ_ID=7ba35c754c07] [REQUEST][END]
INFO - 2026-03-30 23:41:23 --> [REQ_ID=7ba35c754c07] [PERF] Execution time=0.095456
ERROR - 2026-03-30 23:41:23 --> Table 'mymiwallet.bf_route_error_heatmap' doesn't exist
in SYSTEMPATH/Database/MySQLi/Connection.php on line 300.
 1 SYSTEMPATH/Database/MySQLi/Connection.php(300): mysqli->query('SELECT *
FROM `bf_route_error_heatmap`
WHERE `route` = \'/index.php/\'
AND `error_type` = \'missing_route\'
AND `status_code` = 404
 LIMIT 1', 0)
 2 SYSTEMPATH/Database/BaseConnection.php(769): CodeIgniter\Database\MySQLi\Connection->execute('SELECT *
FROM `bf_route_error_heatmap`
WHERE `route` = \'/index.php/\'
AND `error_type` = \'missing_route\'
AND `status_code` = 404
 LIMIT 1')
 3 SYSTEMPATH/Database/BaseConnection.php(686): CodeIgniter\Database\BaseConnection->simpleQuery('SELECT *
FROM `bf_route_error_heatmap`
WHERE `route` = \'/index.php/\'
AND `error_type` = \'missing_route\'
AND `status_code` = 404
 LIMIT 1')
 4 SYSTEMPATH/Database/BaseBuilder.php(1649): CodeIgniter\Database\BaseConnection->query('SELECT *
FROM `bf_route_error_heatmap`
WHERE `route` = :route:
AND `error_type` = :error_type:
AND `status_code` = :status_code:
 LIMIT 1', [...], false)
 5 SYSTEMPATH/Model.php(296): CodeIgniter\Database\BaseBuilder->get()
 6 SYSTEMPATH/BaseModel.php(713): CodeIgniter\Model->doFirst()
 7 APPPATH/Services/AIOps/RouteErrorHeatmapService.php(28): CodeIgniter\BaseModel->first()
 8 APPPATH/Config/Events.php(66): App\Services\AIOps\RouteErrorHeatmapService->record('/index.php/', 'missing_route', 404)
 9 SYSTEMPATH/Events/Events.php(152): CodeIgniter\Events\Events::Config\{closure}()
10 SYSTEMPATH/CodeIgniter.php(357): CodeIgniter\Events\Events::trigger('post_system')
11 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
12 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
13 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
DEBUG - 2026-03-30 23:41:23 --> Route heatmap post_system hook skipped: Table 'mymiwallet.bf_route_error_heatmap' doesn't exist
DEBUG - 2026-03-30 23:46:22 --> [REQ_ID=baed99c65d70] [REQUEST][START] HEAD /
DEBUG - 2026-03-30 23:46:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
ERROR - 2026-03-30 23:46:22 --> [404_ROUTE]
DEBUG - 2026-03-30 23:46:22 --> [REQ_ID=baed99c65d70] [REQUEST][END]
INFO - 2026-03-30 23:46:22 --> [REQ_ID=baed99c65d70] [PERF] Execution time=0.133335
ERROR - 2026-03-30 23:46:22 --> Table 'mymiwallet.bf_route_error_heatmap' doesn't exist
in SYSTEMPATH/Database/MySQLi/Connection.php on line 300.
 1 SYSTEMPATH/Database/MySQLi/Connection.php(300): mysqli->query('SELECT *
FROM `bf_route_error_heatmap`
WHERE `route` = \'/index.php/\'
AND `error_type` = \'missing_route\'
AND `status_code` = 404
 LIMIT 1', 0)
 2 SYSTEMPATH/Database/BaseConnection.php(769): CodeIgniter\Database\MySQLi\Connection->execute('SELECT *
FROM `bf_route_error_heatmap`
WHERE `route` = \'/index.php/\'
AND `error_type` = \'missing_route\'
AND `status_code` = 404
 LIMIT 1')
 3 SYSTEMPATH/Database/BaseConnection.php(686): CodeIgniter\Database\BaseConnection->simpleQuery('SELECT *
FROM `bf_route_error_heatmap`
WHERE `route` = \'/index.php/\'
AND `error_type` = \'missing_route\'
AND `status_code` = 404
 LIMIT 1')
 4 SYSTEMPATH/Database/BaseBuilder.php(1649): CodeIgniter\Database\BaseConnection->query('SELECT *
FROM `bf_route_error_heatmap`
WHERE `route` = :route:
AND `error_type` = :error_type:
AND `status_code` = :status_code:
 LIMIT 1', [...], false)
 5 SYSTEMPATH/Model.php(296): CodeIgniter\Database\BaseBuilder->get()
 6 SYSTEMPATH/BaseModel.php(713): CodeIgniter\Model->doFirst()
 7 APPPATH/Services/AIOps/RouteErrorHeatmapService.php(28): CodeIgniter\BaseModel->first()
 8 APPPATH/Config/Events.php(66): App\Services\AIOps\RouteErrorHeatmapService->record('/index.php/', 'missing_route', 404)
 9 SYSTEMPATH/Events/Events.php(152): CodeIgniter\Events\Events::Config\{closure}()
10 SYSTEMPATH/CodeIgniter.php(357): CodeIgniter\Events\Events::trigger('post_system')
11 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
12 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
13 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
DEBUG - 2026-03-30 23:46:22 --> Route heatmap post_system hook skipped: Table 'mymiwallet.bf_route_error_heatmap' doesn't exist
DEBUG - 2026-03-30 23:50:33 --> [REQ_ID=58a479dabaad] [REQUEST][START] GET /index.php/MyMI-Gold/Goals/Daily
DEBUG - 2026-03-30 23:50:33 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-30 23:50:33 --> [REQ_ID=58a479dabaad] [FILTER_BEFORE] /index.php/MyMI-Gold/Goals/Daily
DEBUG - 2026-03-30 23:50:33 --> [REQ_ID=58a479dabaad] [ROUTE] Controller=\App\Modules\User\Controllers\DashboardController Method=goals
DEBUG - 2026-03-30 23:50:33 --> [REQ_ID=58a479dabaad] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/MyMI-Gold/Goals/Daily
DEBUG - 2026-03-30 23:50:33 --> [CSRF] token name=csrf_test_name hash=1ff61719f3bf1bd2c65a84e678771407
DEBUG - 2026-03-30 23:50:33 --> [REQ_ID=58a479dabaad] [REQUEST][END]
INFO - 2026-03-30 23:50:33 --> [REQ_ID=58a479dabaad] [PERF] Execution time=0.051513
DEBUG - 2026-03-30 23:50:34 --> [REQ_ID=2b432cb6c27e] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-30 23:50:34 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-30 23:50:34 --> [REQ_ID=2b432cb6c27e] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-30 23:50:34 --> [REQ_ID=2b432cb6c27e] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-30 23:50:34 --> [REQ_ID=2b432cb6c27e] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-30 23:50:34 --> [CSRF] token name=csrf_test_name hash=dda62f19d1be815a3cbcdb17b245ee0a
DEBUG - 2026-03-30 23:50:34 --> [REQ_ID=6b8459b5ba2d] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-30 23:50:34 --> [REQ_ID=6b8459b5ba2d] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-30 23:50:34 --> [TRACE]
DEBUG - 2026-03-30 23:50:34 --> [REQ_ID=2b432cb6c27e] [FILTER_AFTER]
DEBUG - 2026-03-30 23:50:34 --> [REQ_ID=2b432cb6c27e] [LIFECYCLE][END] status=200 duration_ms=308.99 memory_delta=0
INFO - 2026-03-30 23:50:34 --> [REQ_ID=6b8459b5ba2d] [PERF] Execution time=0.312543
DEBUG - 2026-03-30 23:50:34 --> [REQ_ID=2b432cb6c27e] [REQUEST][END]
INFO - 2026-03-30 23:50:34 --> [REQ_ID=2b432cb6c27e] [PERF] Execution time=0.326446
DEBUG - 2026-03-30 23:51:22 --> [REQ_ID=b0194117c17d] [REQUEST][START] HEAD /
DEBUG - 2026-03-30 23:51:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
ERROR - 2026-03-30 23:51:22 --> [404_ROUTE]
DEBUG - 2026-03-30 23:51:22 --> [REQ_ID=b0194117c17d] [REQUEST][END]
INFO - 2026-03-30 23:51:22 --> [REQ_ID=b0194117c17d] [PERF] Execution time=0.201512
ERROR - 2026-03-30 23:51:22 --> Table 'mymiwallet.bf_route_error_heatmap' doesn't exist
in SYSTEMPATH/Database/MySQLi/Connection.php on line 300.
 1 SYSTEMPATH/Database/MySQLi/Connection.php(300): mysqli->query('SELECT *
FROM `bf_route_error_heatmap`
WHERE `route` = \'/index.php/\'
AND `error_type` = \'missing_route\'
AND `status_code` = 404
 LIMIT 1', 0)
 2 SYSTEMPATH/Database/BaseConnection.php(769): CodeIgniter\Database\MySQLi\Connection->execute('SELECT *
FROM `bf_route_error_heatmap`
WHERE `route` = \'/index.php/\'
AND `error_type` = \'missing_route\'
AND `status_code` = 404
 LIMIT 1')
 3 SYSTEMPATH/Database/BaseConnection.php(686): CodeIgniter\Database\BaseConnection->simpleQuery('SELECT *
FROM `bf_route_error_heatmap`
WHERE `route` = \'/index.php/\'
AND `error_type` = \'missing_route\'
AND `status_code` = 404
 LIMIT 1')
 4 SYSTEMPATH/Database/BaseBuilder.php(1649): CodeIgniter\Database\BaseConnection->query('SELECT *
FROM `bf_route_error_heatmap`
WHERE `route` = :route:
AND `error_type` = :error_type:
AND `status_code` = :status_code:
 LIMIT 1', [...], false)
 5 SYSTEMPATH/Model.php(296): CodeIgniter\Database\BaseBuilder->get()
 6 SYSTEMPATH/BaseModel.php(713): CodeIgniter\Model->doFirst()
 7 APPPATH/Services/AIOps/RouteErrorHeatmapService.php(28): CodeIgniter\BaseModel->first()
 8 APPPATH/Config/Events.php(66): App\Services\AIOps\RouteErrorHeatmapService->record('/index.php/', 'missing_route', 404)
 9 SYSTEMPATH/Events/Events.php(152): CodeIgniter\Events\Events::Config\{closure}()
10 SYSTEMPATH/CodeIgniter.php(357): CodeIgniter\Events\Events::trigger('post_system')
11 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
12 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
13 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
DEBUG - 2026-03-30 23:51:22 --> Route heatmap post_system hook skipped: Table 'mymiwallet.bf_route_error_heatmap' doesn't exist
DEBUG - 2026-03-30 23:54:29 --> [REQ_ID=b0f2cb308c8d] [REQUEST][START] GET /
DEBUG - 2026-03-30 23:54:29 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-30 23:54:29 --> [REQ_ID=b0f2cb308c8d] [FILTER_BEFORE] /
DEBUG - 2026-03-30 23:54:29 --> [REQ_ID=b0f2cb308c8d] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-30 23:54:29 --> [REQ_ID=b0f2cb308c8d] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-30 23:54:29 --> [CSRF] token name=csrf_test_name hash=4700c2579457990f4f491f51d3a44e29
DEBUG - 2026-03-30 23:54:29 --> [REQ_ID=d8464640e233] [INIT] App\Controllers\Home::GET
INFO - 2026-03-30 23:54:29 --> [REQ_ID=d8464640e233] [MEMORY][controller-start] 6291456
DEBUG - 2026-03-30 23:54:29 --> [TRACE]
INFO - 2026-03-30 23:54:29 --> [REQ_ID=d8464640e233] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-30 23:54:29 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-30 23:54:30 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-03-30 23:54:30 --> [REQ_ID=d8464640e233] [VIEW_RENDER] themes/public/home
INFO - 2026-03-30 23:54:30 --> [REQ_ID=d8464640e233] [MEMORY][commonData:start] 10485760
INFO - 2026-03-30 23:54:30 --> themesMemory usage: 10485760
DEBUG - 2026-03-30 23:54:30 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-30 23:54:30 --> [REQ_ID=b0f2cb308c8d] [FILTER_AFTER]
DEBUG - 2026-03-30 23:54:30 --> [REQ_ID=b0f2cb308c8d] [LIFECYCLE][END] status=200 duration_ms=722.17 memory_delta=4194304
INFO - 2026-03-30 23:54:30 --> [REQ_ID=d8464640e233] [PERF] Execution time=0.723920
DEBUG - 2026-03-30 23:54:30 --> [REQ_ID=b0f2cb308c8d] [REQUEST][END]
INFO - 2026-03-30 23:54:30 --> [REQ_ID=b0f2cb308c8d] [PERF] Execution time=0.762682
DEBUG - 2026-03-30 23:56:22 --> [REQ_ID=ab61b22e82b2] [REQUEST][START] HEAD /
DEBUG - 2026-03-30 23:56:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
ERROR - 2026-03-30 23:56:22 --> [404_ROUTE]
DEBUG - 2026-03-30 23:56:22 --> [REQ_ID=ab61b22e82b2] [REQUEST][END]
INFO - 2026-03-30 23:56:22 --> [REQ_ID=ab61b22e82b2] [PERF] Execution time=0.201835
ERROR - 2026-03-30 23:56:22 --> Table 'mymiwallet.bf_route_error_heatmap' doesn't exist
in SYSTEMPATH/Database/MySQLi/Connection.php on line 300.
 1 SYSTEMPATH/Database/MySQLi/Connection.php(300): mysqli->query('SELECT *
FROM `bf_route_error_heatmap`
WHERE `route` = \'/index.php/\'
AND `error_type` = \'missing_route\'
AND `status_code` = 404
 LIMIT 1', 0)
 2 SYSTEMPATH/Database/BaseConnection.php(769): CodeIgniter\Database\MySQLi\Connection->execute('SELECT *
FROM `bf_route_error_heatmap`
WHERE `route` = \'/index.php/\'
AND `error_type` = \'missing_route\'
AND `status_code` = 404
 LIMIT 1')
 3 SYSTEMPATH/Database/BaseConnection.php(686): CodeIgniter\Database\BaseConnection->simpleQuery('SELECT *
FROM `bf_route_error_heatmap`
WHERE `route` = \'/index.php/\'
AND `error_type` = \'missing_route\'
AND `status_code` = 404
 LIMIT 1')
 4 SYSTEMPATH/Database/BaseBuilder.php(1649): CodeIgniter\Database\BaseConnection->query('SELECT *
FROM `bf_route_error_heatmap`
WHERE `route` = :route:
AND `error_type` = :error_type:
AND `status_code` = :status_code:
 LIMIT 1', [...], false)
 5 SYSTEMPATH/Model.php(296): CodeIgniter\Database\BaseBuilder->get()
 6 SYSTEMPATH/BaseModel.php(713): CodeIgniter\Model->doFirst()
 7 APPPATH/Services/AIOps/RouteErrorHeatmapService.php(28): CodeIgniter\BaseModel->first()
 8 APPPATH/Config/Events.php(66): App\Services\AIOps\RouteErrorHeatmapService->record('/index.php/', 'missing_route', 404)
 9 SYSTEMPATH/Events/Events.php(152): CodeIgniter\Events\Events::Config\{closure}()
10 SYSTEMPATH/CodeIgniter.php(357): CodeIgniter\Events\Events::trigger('post_system')
11 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
12 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
13 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
DEBUG - 2026-03-30 23:56:22 --> Route heatmap post_system hook skipped: Table 'mymiwallet.bf_route_error_heatmap' doesn't exist
