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
